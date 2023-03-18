var RefreshHandler = (function() {
    var console = window["console"];

    function RefreshHandlerHash(e) {
        if (e == null)
            return 0;
        // http://werxltd.com/wp/2010/05/13/javascript-implementation-of-javas-string-hashcode-method/
        for (var r = 0, i = 0; i < e.length; i++) r = (r << 5) - r + e.charCodeAt(i), r &= r;
        return r;
    }

    return {
        /**
         * wenn man an die URL ?debug anhängt werden debug-Meldungen ausgegeben
         */
        _debug: /debug/.test(window.location.href),
        debug: function() {
            if (RefreshHandler._debug && console)
                console.info.apply(console, arguments);
        },
        _norefresh: /norefresh/.test(window.location.href),
        _delayedStop: /delayedStop/.test(window.location.href),
        emptyPolling: /emptyPolling/.test(window.location.href),
        pauseRequests: false,
        // konfigurierbares Refreshing-Interval
        refreshInterval: 2000,
        dontReplaceNext: false,
        // beim ersten Update wird ein "complete"-Request durchgeführt,
        // da es dann noch keine bestehenden Inhalte geben kann
        firstUpdate: true,
        compFilterEnabled: false,
        useCacheKey: false,
        // nur beim Laden ausgef�hrt
        notifyCompFilterEnabled: function(afterTimeout, afterDomLoad) {
            // keinen complete-Request am Anfang machen
            this.firstUpdate = false;

            this.compFilterEnabled = true;

            function runOnupdateAfterPageLoad() {
                jQuery("*[e\\:onupdate]").each(function() {
                    var node = jQuery(this);
                    RefreshHandler.runOnUpdate(node);
                });
                RefreshHandler._runOnComplete();
            }

            if (afterTimeout)
                window.setTimeout(runOnupdateAfterPageLoad, 0);
            if (afterDomLoad)
                jQuery(runOnupdateAfterPageLoad);

            jQuery("*[e\\:redirect]").each(function() {
                RefreshHandler.handleRedirect(jQuery(this).attr("e:redirect"));
                return false;
            });
        },

        // URLs für normale Update-Requests und "complete"-Requests
        urlUpdate: '/spring/update',
        urlComplete: '/spring/complete',

        /**
         * Liefert eine ID für den übergebenen Knoten.
         */
        giveId: function(node) {
            var id = node.attr("id");
            // ID aus e:url berechnen, wenn noch es noch keine gibt
            if (id == undefined || id == "") {
                id = RefreshHandler.giveIdForUrl(node.attr("e:url"));
                // neu berechnete ID am Node setzen
                if (id != undefined)
                    node.attr("id", id);
            }

            return id;
        },
        changeId: function(node, id) {
            var url = RefreshHandler.giveUrl(node);
            if (url[0] == "@") {
                url = url.replace(/^@[^/]+/, "@" + id);
            } else if (url[0] == "/") {
                url = "@" + id + url;
            } else {
                url = "@" + id + "/" + url;
            }
            RefreshHandler.setUrl(node, url);
            node.attr("id", "");
            RefreshHandler.giveId(node);
        },
        giveIdForUrl: function(url) {
            if (url == undefined)
                return undefined;
            if (url[0] == '!')
                url = url.substring(1);
            // f�ngt die URL mit "/@xyz/" an,
            var match = new RegExp("^\/?@@?([a-zA-Z0-9_\-]+)\/").exec(url);
            if (match != null) {
                // so wird "comp-xyz" als ID verwendet
                id = "comp-" + match[1];
            } else {
                // ansonsten werden alle Zeichen entfernt, die keine Buchstaben oder Ziffern sind 
                id = url.replace(/[^a-zA-Z0-9]+/g, "_");
            }
            return id;
        },
        /**
         * Liefert den e:hash-Wert vom übergebenen Node, oder "_" falls der Node kein Hash hat
         */
        giveHash: function(node) {
            return node.attr("e:hash") || "_";
        },
        giveHashForUrl: function(url) {
            var id = RefreshHandler.giveIdForUrl();
            return RefreshHandler.giveHash(jQuery("#" + id));
        },
        /**
         * Liefert den e:url-Wert vom übergebenen Node.
         */
        giveUrl: function(node) {
            return node.attr("e:url");
        },
        setUrl: function(node, url) {
            return node.attr("e:url", url);
        },
        /**
         * liefert die Update-URL für den übergebenen Node (hash=escaped_url).
         */
        giveUpdateUrl: function(node) {
            var key = RefreshHandler.giveHash(node);
            var value = RefreshHandler.giveUrl(node);
            return RefreshHandler.encodeUrl(key, value);
        },
        /**
         * liefert die Update-URL für den übergebenen key und value.
         */
        encodeUrl: function(key, value) {
            // der Value wird escaped, da der HttpServletRequest den Wert "unescapet" bevor er ihn zurückliefert
            value = escape(value);

            // in der URL können Plus-Zeichen (für Space) vorkommen, da der Java URLEncoder dies so macht
            // diese müssen durch "%20" ersetzt werden, damit das escape/unescape
            // (hier unten und dann am am Server) funktioniert 
            value = value.replace(/[\+ ]/g, "%20");

            // nochmal escapen, da der Wert er als URL-Param zum Server übertragen wird
            return key + "=" + escape(value);
        },
        /**
         * Liefert den e:interval-Wert vom übergebenen Node oder 0, falls kein Interval angegeben wurde.
         */
        giveInterval: function(node) {
            return node.attr("e:interval") * 1 || 0;
        },
        /**
         * Liefert den Timestamp, wann für den Node das nächste mal ein Update gemacht werden muss.
         */
        giveNext: function(node) {
            var next = node.attr("e:next");
            if (next != undefined) {
                return next;
            } else {
                return RefreshHandler.calcNext(node);
            }
        },
        /**
         * Berechnet den Timestamp, wann der Node das nächste mal geupdatet werden muss.
         */
        calcNext: function(node) {
            var interval = RefreshHandler.giveInterval(node);
            var next = RefreshHandler.time;
            if (interval < 0) {
                next = -1;
            } else if (interval > 0) {
                next += interval;
            }
            node.attr("e:next", next);
            return next;
        },
        time: undefined,
        pageId: "99",
        init: function(pageId) {
            if (!pageId) {
                pageId = "98";
            }
            RefreshHandler.pageId = pageId;
            RefreshHandler.debug("RefreshHandler init");
            if (RefreshHandler.time !== undefined)
                return;
            RefreshHandler._loading = false;
            RefreshHandler.time = new Date() * 1;
            RefreshHandler.start();
        },
        start: function() {
            RefreshHandler.emptyPolling = false;
            if (RefreshHandler._interval !== undefined)
                return;
            RefreshHandler.run();
            RefreshHandler._interval = window.setInterval(function() {
                RefreshHandler.run()
            }, RefreshHandler.refreshInterval || 2000);
        },
        stop: function(emptyPolling) {
            emptyPolling = typeof emptyPolling !== 'undefined' ? emptyPolling : false;
            RefreshHandler.debug('RefreshHandler.stop(' + emptyPolling + ')');
            RefreshHandler.emptyPolling = emptyPolling;
            if (!emptyPolling) {
                if (RefreshHandler._interval === undefined)
                    return;
                window.clearInterval(RefreshHandler._interval);
                RefreshHandler._interval = undefined;
            }
        },
        /**
         * wird regelmäßig per Timer aufgerufen
         */
        run: function() {
            RefreshHandler.debug("RefreshHandler run");
            // wenn bereits ein Server-Request aktiv ist erst einmal nichts machen
            if (RefreshHandler._loading)
                return;
            if (RefreshHandler.pauseRequests) {
                return;
            }
            RefreshHandler.requestNodeUpdates(this.firstUpdate, "", jQuery(".e_active"));
        },
        hash: RefreshHandlerHash,
        initialHash: RefreshHandlerHash(window.location.href),
        requestNodeUpdates: function(complete, updates, selector) {
            var time = this.time = new Date() * 1;
            var hash = RefreshHandler.useCacheKey ? RefreshHandler.initialHash : undefined;

            selector.each(function(ix, node) {
                node = jQuery(node);
                // Der "[e\\:url]"-Selektor funktioniert nicht, wenn ein Teil der Seite
                // per JSF ausgetauscht wurde, daher müssen wir alle Nodes durchgehen
                // und schauen, ob sie ein e:url-Attribute haben.
                if (!node.attr("e:url"))
                    return;
                // neuen nodes eine id geben
                var id = RefreshHandler.giveId(node);
                var next = RefreshHandler.giveNext(node);

                if (next >= 0 && next <= time) {
                    RefreshHandler.calcNext(node);
                    var update = RefreshHandler.giveUpdateUrl(node);
                    if (hash != undefined) {
                        if (node.hasClass("e_noCache")) {
                            hash = undefined;
                        } else {
                            hash += RefreshHandler.hash(update);
                        }
                    }
                    if (updates != "") {
                        updates += "&";
                    }
                    updates += update;
                }
            });

            if (updates != "") {
                var url = complete ? RefreshHandler.urlComplete : RefreshHandler.urlUpdate;
                if (hash != undefined) {
                    if (hash < 0) {
                        // 32bit signed in unsigned umwandeln
                        hash *= -1;
                        hash += 0x7fffffff;
                    }
                    url += "." + hash;
                }
                this.requestUpdates(url, updates);
            }
        },
        /**
         * führt einen complete-Request für die übergebene Url aus.
         * Die Orte, wo die Response-Inhalte eingefügt werden, müssen zuvor per "e:comp-ref"
         * in der bestehenden Seite definiert worden sein.
         */
        nav: function(url, params, callback) {
            // die URL darf kein "+"-Zeichen enthalten, da dies vom JBoss bei getParameterMap direkt durch ein Leerzeichen ersetzt wird
            url = url.replace(/\+/g, "%20");
            RefreshHandler.requestUpdates(RefreshHandler.urlComplete, RefreshHandler.encodeUrl("_", url), true, callback);
        },
        /**
         * setzt aus den einzelURLs eine gesamtURL zusammen und f�hrt
         * einen Update oder Complete Request aus.
         */
        completeOrUpdate: function(urlFlag, urls) {
            var url = "";
            for (var i = 0; i < urls.length; i++) {
                var arg = urls[i];
                // die URL darf kein "+"-Zeichen enthalten, da dies vom JBoss bei getParameterMap direkt durch ein Leerzeichen ersetzt wird
                arg = arg.replace(/\+/g, "%20");
                if (url != "")
                    url += "&";
                var hash = RefreshHandler.giveHashForUrl(arg);
                url += RefreshHandler.encodeUrl(hash, arg);
            }
            RefreshHandler.requestUpdates(urlFlag, url);
        },
        /**
         * f�hrt einen update-Request f�r die �bergebenen Urls aus.
         */
        update: function() {
            RefreshHandler.completeOrUpdate(RefreshHandler.urlUpdate, arguments);
        },
        /**
         * f�hrt einen complete-Request f�r die �bergebenen Urls aus.
         */
        complete: function() {
            RefreshHandler.completeOrUpdate(RefreshHandler.urlComplete, arguments);
        },
        requestNumber: 0,
        updateNodes: function(nodes) {
            var urls = [];
            nodes.each(function(i, x) {
                urls.unshift(RefreshHandler.giveUrl(jQuery(x)));
            });
            if (urls.length > 0) {
                RefreshHandler.update.apply(RefreshHandler, urls);
            }
        },
        /**
         * führt einen Server-Request aus
         * aber nur, wenn nicht aus welchem Grund auch immer zwei mal das gleiche innerhalb von 5ms angefragt wurde
         */
        requestUpdates: function(location, updates, navCall, doneCallback) {
            if (updates === this.lastUpdates && location === this.lastLocation && new Date().getTime() < this.lastUpdateTime + 5)
                return;
            this.lastLocation = location;
            this.lastUpdates = updates;
            this.lastUpdateTime = new Date().getTime();

            location += "/" + ( //
                window.location.host + //
                window.location.pathname + //
                window.location.hash + //
                RefreshHandler.pageId //
            ).replace(/[^a-zA-Z0-9]+/g, "_");

            this.firstUpdate = false;
            RefreshHandler.debug(location + ": " + updates);
            if (RefreshHandler._norefresh)
                return;
            if (RefreshHandler._delayedStop) {
                setTimeout(function() {
                    RefreshHandler._norefresh = true;
                }, 5000);
            }
            RefreshHandler._loading = true;
            if (RefreshHandler.onUpdatesRequested)
                RefreshHandler.onUpdatesRequested();

            var requestNumber = ++RefreshHandler.requestNumber;
            var ajax = jQuery.ajax({
                url: location,
                type: 'POST',
                data: RefreshHandler.emptyPolling ? '' : updates,
                dataType: 'html',
                //wg caching on Safari iOS
                //http://stackoverflow.com/questions/12506897/is-safari-on-ios-6-caching-ajax-results
                headers: {
                    "cache-control": "no-cache"
                },
                success: function(data) {
                    var rn = RefreshHandler.requestNumber;
                    if (rn != requestNumber && !navCall && data.indexOf('layerManagement') <= 0) {
                        RefreshHandler.debug("ignoring old response " + requestNumber + " current is " + rn);
                    } else {
                        RefreshHandler.handleResponse(data);
                    }
                    if (doneCallback) {
                        doneCallback();
                    }
                },
                error: function() {
                    RefreshHandler.handleResponse(null);
                }
            });
        },
        /**
         * wird aufgerufen um Update-Responses zu verarbeiten 
         */
        handleResponse: function(data) {
            // wir sind mit laden fertig, Timer wieder zulassen
            //auch wenn es ein Fehler ist (data == null) soll man _loading = false setzen
            //damit Requests weiterhin abgeschickt werden und die Clients nicht stehen bleiben
            RefreshHandler._loading = false;
            if (RefreshHandler.pauseRequests) {
                return;
            }
            // es ist ein Verbindungsfehler aufgetreten
            if (data == null) {
                RefreshHandler.debug("no reponse");
                return;
            }

            // data-String in DOM-Nodes umwandeln
            data = data.replace(/\s+/, " ").replace(/^ /, "").replace(/ $/, "");
            window.data = data;
            data = jQuery(data);

            var count = 0;

            // alle DOM-Nodes verarbeiten
            data.each(function(ix, domNode) {
                // only element nodes: skip comments, text etc
                if (domNode.nodeType == 1) {
                    if (RefreshHandler.handleResponseNode(jQuery(domNode)))
                        count++;
                }
                // iterate over the whole response
                return true;
            });

            // wenn etwas ausgetauscht wurde müssen u.U. neue Inhalte angefordert werden
            if (count > 0)
                RefreshHandler.run();
            RefreshHandler._runOnComplete();
            var exec = jQuery("script[e_execute=1]", data).text();
            if (exec !== "") {
                eval(exec);
            }
        },
        /**
         * wird für jeden DOM-Node im Response einmal aufgerufen
         */
        handleResponseNode: function(node) {
            // der DOM-Node darf keine ID haben 
            var id = node.attr("id");
            if (id != undefined && (id + "") != "") {
                RefreshHandler.debug("id in reponse: ", node);
                //jQuery("#" + id).replaceWith(node);
                return false;
            }
            // script-Nodes werden nicht unterstützt
            if (node.is("script")) {
                RefreshHandler.debug("script in reponse: " + node.text());
                return false;
            }

            // entweder muss e:url gesetzt sein, oder es muss sich um ein Container-Node handeln
            if (node.attr("e:url") === undefined) {
                // es gibt kein e:url, es könnte ein container-Objekt sein
                var container = node.attr("e:container");
                if (container) {
                    // den im Container enthaltenen Node suchen und prozessieren
                    // "e:container" gibt dabei den Tag-Namen des im Container enthaltenen Nodes an
                    RefreshHandler.handleResponseNode(jQuery(container + ":first", node));
                    return false;
                }
                var redirect = node.attr("e:redirect");
                if (redirect) {
                    RefreshHandler.handleRedirect(redirect);
                    return false;
                }
                RefreshHandler.debug("no e:url in reponse: ", node);
                return false;
            }

            var unknownNodes = false;
            // alle im node enthaltenen e:url in ids umwandeln
            jQuery(".e_active", node).each(function() {
                var node = jQuery(this);
                var url = RefreshHandler.giveUrl(node);
                if (url !== undefined && url.length != 0) {
                    var id = RefreshHandler.giveId(node);
                    var existing = jQuery("#" + id);
                    if (existing.length) {
                        var v1 = existing.attr("e:url");
                        var v2 = node.attr("e:url");
                        node.replaceWith(existing);
                        if (v1 != v2) {
                            // #12755, �ndert sich eine e:url in dem node, der mit @id versehen ist
                            // soll der inhalt wie gew�hnt prozessiert werden, die e:url aber auf den neuen Wert ge�ndert werden
                            RefreshHandler.setUrl(existing, node.attr("e:url"));
                            existing.attr("e:hash", "_");
                            // siehe #15822
                            if (!RefreshHandler.dontReplaceNext) {
                                existing.attr('e:next', '1');
                            }
                            //RefreshHandler.debug("replaced url " + v1 + " with " + v2, existing);
                            unknownNodes = true;
                        }
                    } else {
                        unknownNodes = true;
                    }
                }
            });

            // ID aus e:url berechnen
            id = RefreshHandler.giveId(node);

            // alten Node mit dieser ID suchen
            var old = jQuery("#" + id);
            if (old.length != 1) {
                // node nicht gefunden
                RefreshHandler.debug("failed to update " + id + ": ", node);
                return false;
            }

            // alten Node durch den neuen ersetzen
            var v1 = old.attr("e:url");
            var h1 = old.attr("e:hash");
            var v2 = node.attr("e:url");
            old.replaceWith(node);
            if (v1 != v2) {
                // #12755, �ndert sich eine e:url in dem node, der mit @id versehen ist
                unknownNodes = true;
            }
            RefreshHandler.debug("replaced node", old, node);
            RefreshHandler.runOnUpdate(node);
            return unknownNodes;
        },
        /**
         * 
         */
        handleRedirect: function(redirect) {
            RefreshHandler.debug("redirecting to " + redirect);
            if (redirect.substring(0, 4) == "http") {
                window.location.href = redirect;
                return;
            }
            redirect = (redirect + "").trim();
            if (redirect.indexOf("#") == -1 && window.location.hash) {
                redirect = redirect + window.location.hash;
            }

            if (redirect.charAt(0) != "/") {
                redirect = "/" + redirect;
            }

            //neu laden, falls # in URL vorhanden ist, weil das sonst vom Browser nicht 
            //gemacht wird
            if (redirect.indexOf("#") !== -1) {
                var hash = redirect.slice(redirect.lastIndexOf('#'));
                window.location.hash = hash;
                window.location.reload();
                return;
            }

            window.location.href = redirect;
        },
        /**
         * Ausf�hren von Code, nach dem ein Request vollst�ndig bearbeitet wurde.
         */
        _onComplete: [],
        onComplete: function(cb) {
            RefreshHandler._onComplete.push(cb);
        },
        /**
         * Ausf�hren von Code wid _onComplete. Die Callback-Funktionen werden aber nicht entfernt
         * */
        _onCompletePreserve: [],
        onCompletePreserve: function(cb) {
            RefreshHandler._onCompletePreserve.push(cb);
        },
        _runOnComplete: function() {
            var list = RefreshHandler._onComplete;
            while (list.length > 0) {
                var fn = list.shift();
                fn();
            }
            for (var i = 0; i < RefreshHandler._onCompletePreserve.length; i++) {
                RefreshHandler._onCompletePreserve[i]();
            }
        },
        runOnUpdate: function(node) {
            // handle e:onupdate code
            var onupdate = node.attr("e:onupdate");
            if (onupdate) {
                RefreshHandler.debug("onupdate: " + node);
                (function() {
                    eval(onupdate);
                }).apply(node, []);
            }
        },
        stopRefresh: function(node) {
            jQuery(node).attr('e:interval', -1).attr('e:next', '');
        },
        loadIfEmpty: function(url, callOnupdate) {
            var id = RefreshHandler.giveIdForUrl(url);
            var node = jQuery('#' + id);
            if (node.length) {
                if (node.hasClass('e_comp_ref')) {
                    RefreshHandler.nav(url);
                } else if (callOnupdate) {
                    RefreshHandler.runOnUpdate(node);
                }
            }
        },

        whenNotLoading: function(callback) {
            if (RefreshHandler._loading) {
                RefreshHandler.onComplete(callback);
            } else {
                callback();
            }
        }
    };
})();