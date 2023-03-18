window.showcalcbar= function() {
clearwindowbet();
$('#overlayContent').html('<div id="editorStakeInput"><div class="bartitle iconbar konto"><div class="text">Tutar:<div class="numpad-amount" style="display:inline">'+formatMoney(window.amount)+'</div></div></div><div class="barmiddle center"><button class="w25 active simple" onclick="editorStakeButtonPressedt(1);"><div class="text">1</div></button><button class="w25 active simple" onclick="editorStakeButtonPressedt(\'2\');"><div class="text">2</div></button><button class="w25 active simple" onclick="editorStakeButtonPressedt(\'3\');"><div class="text">3</div></button></div><div class="barmiddle center noborder"><button class="w25 active simple" onclick="editorStakeButtonPressedt(\'4\');"><div class="text">4</div></button><button class="w25 active simple" onclick="editorStakeButtonPressedt(\'5\');"><div class="text">5</div></button><button class="w25 active simple" onclick="editorStakeButtonPressedt(\'6\');"><div class="text">6</div></button></div><div class="barmiddle center noborder"><button class="w25 active simple" onclick="editorStakeButtonPressedt(\'7\');"><div class="text">7</div></button><button class="w25 active simple" onclick="editorStakeButtonPressedt(\'8\');"><div class="text">8</div></button><button class="w25 active simple" onclick="editorStakeButtonPressedt(\'9\');"><div class="text">9</div></button></div><div class="barbottom center noborder"><button class="w25 active simple" onclick="editorStakeButtonPressedt(\'.\');"><div class="text">.</div></button><button class="w25 active simple" onclick="editorStakeButtonPressedt(\'0\');"><div class="text">0</div></button><button class="w25 active simple" onclick="editorStakeButtonPressedt(\'K\');"><div class="text">C</div></button></div></div><div class="stakeButton bigbutton_wrapper overlay"><button class="bigbutton" onclick="settotalbetsamount();"><div class="text">Toplam bahis olarak yerleştir</div></button></div>');
$('#overlay').removeClass('hidden');
}


window.toggleQuickFilter = function() {
    if (!(window.event && 30 < window.event.offsetX)) $(".appcontent .filterbar").toggleClass("showQuickFilter"), window.ua = $(".appcontent .filterbar").hasClass("showQuickFilter"), window.ua && setTimeout(function() {
        document.activeElement.blur();
	$(".searchfield").focus();
    }, 50)
};




window.getlivematch = function() {
if(Live.bets)
{
Live.Render();
}else{
Live.Play();
}
};

     window.toggleTicketDetail = function(a,c) {
	$("#couponmain_"+a).toggleClass('hidden');
	Live.Render();
	var jsonverileri = JSON.parse(c);
	var canlianlikgonder = 0;
	for(var i = 0, l = jsonverileri.length; i < l; i++) {
	if(Live.bets[jsonverileri[i]]) {
	canlianlikgonder=1;
	}
	}
	if(canlianlikgonder==1)
	{
	gethowticket(a,jsonverileri);
	}
    };
     window.gethowticket = function(a,c) {
	$.ajax({
            url: "ajax/matchonline",
            dataType: "json",
            contentType: "application/x-www-form-urlencoded",
            data: {
                couponId: a
            },
            type: "POST",
            success: function(bc) {
	    $.each(bc, function(m, p) {
	    if(m!="kid"){
	    if(p.D==1)
	    {
	    $("#kid_"+bc.kid+"_scr_"+m).html("<i class='blinks'><img style='margin-top: -4px;' src='img/win.gif'></i>");
	    $(".appcontent #scr_"+m).html('<i class="blinks" style="color:#1cbd00;">'+p.S+'\'</i>');
	    $(".appcontent #time_"+m).html('<i>'+p.T+'\'</i>');
	    }else if(p.D==2){
	    $("#kid_"+bc.kid+"_scr_"+m).html("<i class='blinks'><img style='margin-top: -4px;' src='img/lost.gif'></i>");
	    $(".appcontent #scr_"+m).html('<i class="blinks" style="color:#f70202;">'+p.S+'</i>');
	    $(".appcontent #time_"+m).html('<i>'+p.T+'\'</i>');
	    }else if(p==0){
	    $("#kid_"+bc.kid+"_scr_"+m).html("<i class='blinks'><img style='margin-top: -2px;' src='img/cpnwaiting.png'></i>");
	    }
	    }
	    });
            }
        });
	var divacikmi=$("#couponmain_"+a).is(":visible");
	if(divacikmi)
	{
	setTimeout(function(){ gethowticket(a,c); }, 15000);
	}	
    };


     window.amount = 0;
     var     ticktoplambedel = '0.00';
     var     ticktotalbet = '0.00';
     var     ticktotalrate = '0.00';
     var     ticktotalwin = '0.00';
     var J = 0;
     var tickbetnum = 0;
     var tickrefreshtime = 15 * 1000;
     var ticksystem = 1;
     var activesystem = 0;
     var toplamkupon = 1;
     var ticktotalrates = 1;
     var ticktoplambedels = 1;
     var ticktotalwins = 1;
	var tickopen = true;
 var ticksecilisistem = new Array();
	var ticksend = false;
	var Liveorktr = 0;
var          tickeskioranlar = new Array();
var tickochecked = 0;

var tickinlive = false;
var tickoutlive = false;
var tickinvfl = false;
var tickoutvfl = false;
var tickinduello = false;
var tickoutduello = false;
     var tickwebtype		        = "mobil";
     var tickmaxbet			= 12;
     var tickminsum			= 10;
     var tickmaxsum			= 2000;
     var tickmaxrate		        = 400;
     var tickmaxwin			= 50000;
     var tickkombinasyon		= 1;
     var tickcbonus			= 0;
     var tickduello			= 2;
     var tickmno			= 1.05;
     var tickcdk			= 2;
     var tickoprint			= 1;
var ticklastticket = new Object();
function clearwindowbet()
{
J=0;
window.amount = 0;
}
window.eventfavoritog = function() {
var isVisible = $('.evetnliveaddedfav').is(':visible');
if(isVisible)
{
$( ".myEventsHeader" ).removeClass('open');
}else{
$( ".myEventsHeader" ).addClass('open');
}
$( ".evetnliveaddedfav" ).toggle();
}



window.getlivetabl = function(n) {
if(n=="2"){
$('.evetnliveadded').hide();
$('.evetnliveaddedtennis').hide();
$('.evetnliveaddedvoleybol').hide();
$('.evetnliveaddedbuzhokeyi').hide();
$('.evetnliveaddedbasket').show();
$('.evetnliveaddedmtennis').hide();
$('#iconsstar_1').removeClass('selected');
$('#iconsstar_2').addClass('selected');
$('#iconsstar_3').removeClass('selected');
$('#iconsstar_4').removeClass('selected');
$('#iconsstar_5').removeClass('selected');
$('#iconsstar_6').removeClass('selected');
} else if(n=="3"){
$('.evetnliveadded').hide();
$('.evetnliveaddedbasket').hide();
$('.evetnliveaddedvoleybol').hide();
$('.evetnliveaddedbuzhokeyi').hide();
$('.evetnliveaddedtennis').show();
$('.evetnliveaddedmtennis').hide();
$('#iconsstar_1').removeClass('selected');
$('#iconsstar_2').removeClass('selected');
$('#iconsstar_3').addClass('selected');
$('#iconsstar_4').removeClass('selected');
$('#iconsstar_5').removeClass('selected');
$('#iconsstar_6').removeClass('selected');
} else if(n=="4"){
$('.evetnliveadded').hide();
$('.evetnliveaddedtennis').hide();
$('.evetnliveaddedbasket').hide();
$('.evetnliveaddedbuzhokeyi').hide();
$('.evetnliveaddedvoleybol').show();
$('.evetnliveaddedmtennis').hide();
$('#iconsstar_1').removeClass('selected');
$('#iconsstar_2').removeClass('selected');
$('#iconsstar_3').removeClass('selected');
$('#iconsstar_4').addClass('selected');
$('#iconsstar_5').removeClass('selected');
$('#iconsstar_6').removeClass('selected');
} else if(n=="5"){
$('.evetnliveadded').hide();
$('.evetnliveaddedtennis').hide();
$('.evetnliveaddedbasket').hide();
$('.evetnliveaddedvoleybol').hide();
$('.evetnliveaddedbuzhokeyi').show();
$('.evetnliveaddedmtennis').hide();
$('#iconsstar_1').removeClass('selected');
$('#iconsstar_2').removeClass('selected');
$('#iconsstar_3').removeClass('selected');
$('#iconsstar_4').removeClass('selected');
$('#iconsstar_5').addClass('selected');
$('#iconsstar_6').removeClass('selected');
} else if(n=="6"){
$('.evetnliveadded').hide();
$('.evetnliveaddedtennis').hide();
$('.evetnliveaddedbasket').hide();
$('.evetnliveaddedvoleybol').hide();
$('.evetnliveaddedbuzhokeyi').hide();
$('.evetnliveaddedmtennis').show();
$('#iconsstar_1').removeClass('selected');
$('#iconsstar_2').removeClass('selected');
$('#iconsstar_3').removeClass('selected');
$('#iconsstar_4').removeClass('selected');
$('#iconsstar_5').removeClass('selected');
$('#iconsstar_6').addClass('selected');
} else {
$('.evetnliveaddedvoleybol').hide();
$('.evetnliveaddedbuzhokeyi').hide();
$('.evetnliveaddedtennis').hide();
$('.evetnliveaddedbasket').hide();
$('.evetnliveadded').show();
$('.evetnliveaddedmtennis').hide();
$('#iconsstar_1').addClass('selected');
$('#iconsstar_2').removeClass('selected');
$('#iconsstar_3').removeClass('selected');
$('#iconsstar_4').removeClass('selected');
$('#iconsstar_5').removeClass('selected');
$('#iconsstar_6').removeClass('selected');
}
}
window.tickSelectSystem = function(n) {
     if (ticksecilisistem[n]) {
         delete ticksecilisistem[n];
         activesystem--;
     } else if (activesystem >= 4) {
         alert('Sistem oyunu için en fazla 4 farklı kombinasyon seçebilirsiniz');
     } else {
         ticksecilisistem[n] = n;
         activesystem++;
     }
 }

window.opennewwidows = function(n) {
window.open(n, '_blank');
 }

function hesapla(x,y) {
if(x==y)
{
return 1;
}
var n =x;
var r =y;
var fakt = n;
for (var i = n - 1; i >= 1; i--)
{
fakt = fakt * i;
}
var fakt2 = r;
for (var i = r - 1; i >= 1; i--)
{
fakt2 = fakt2 * i;
}
var number;
number = n - r;
var fakt1 = number;
for (var i = number - 1; i >= 1; i--)
{
fakt1 = fakt1 * i;
}
fakt1 = fakt2 * fakt1;
var kombinasyon = fakt / fakt1;
return kombinasyon;
}
window.showloadings=function() {
$('.appcontent').html('<img src="/mb/img/ballloader.gif">');
}

window.showsystembar=function() {
var sistemhtml = "";
if (tickbetnum >= 4 && tickbetnum <= 10 && ticksystem == 1) {
for (i = 3; i <= tickbetnum; i++) {
     sistemhtml+='<div class="editorCombiLength barmiddle" onclick="tickSelectSystem(' +i + ');tickupdateall(1);showsystembar();">';
     sistemhtml+='<div class="icon">';
	if (ticksecilisistem[i]) {
     sistemhtml+='<div class="sports checkmark"></div>';
	}else{
     sistemhtml+='<div class="sports blank"></div>';
	}
     sistemhtml+='</div>';
     sistemhtml+='<div class="text w100">' + i + 'li kombine</div>';
     sistemhtml+='<div class="value">';
     sistemhtml+='<div class="count">'+hesapla(tickbetnum,i)+'</div>';
     sistemhtml+='</div>';
     sistemhtml+='</div>';
}
}
     sistemhtml+='<div class="stakeButton bigbutton_wrapper overlay"><button class="bigbutton" onclick="hideOverlay()"><div class="text">Tamam</div></button></div>';
     $('#overlayContent').html(sistemhtml);
     $('#overlay').removeClass('hidden');
}






window.editorStakeButtonPressedt=function(a){J=""+J;if(0<=a&&9>=a)/\.\d\d/.test(J)||(J+=a+"");else 
switch(a){
case ".":/\./.test(J)||(J+=".");
break;
case "K":
J=J.substring(0,J.length-(/\.$/.test(J)?2:1)),""==J&&(J="0")}K(1*J)
};

function settotalbetsamount()
{
ticktotalbet=String(window.amount);tickupdateall('1');hideOverlay();
}

function K(a){a+="";""==a&&(a="0");$(".numpad-amount").html(formatMoney(a));window.amount=a}
window.formatMoney=function(a){var currencyGrouping="TL",c=Math.floor(1*a)+"",a=Math.round(100*a)%100,a=Math.abs(a);for(1==(a+"").length&&(a="0"+a);;){var e=c,c=c.replace(/(\d+)(\d\d\d)/,"$1$2");if(c==e)break}return c+'.'+a};







function openmenus(e)
{
$('#menu_container_1').toggle();
var a = window.event;
  a.stopPropagation();
}


$(document).ready(function () {
$(document).on('click', '#overlayContent', stopstpres);
$(document).on('click', '#overlay', hideOverlay);   
$('body').click( function() {
$('#menu_container_1').hide();
});
});



function changeMarket(f)
{
$(".betfilterbar #tab_1,.betfilterbar #tab_2,.betfilterbar #tab_3,.betfilterbar #tab_4").removeClass('selected');
if(f==1) {
$("#tab_1").addClass('selected');
} else if(f==28) {
$("#tab_2").addClass('selected');
} else if(f==45) {
$("#tab_3").addClass('selected');
} else {
$("#tab_4").addClass('selected');
}
Live.showlines=f;
Live.Render();
}


function stopstpres(a)
{
a.stopPropagation();
}

(function() {
    var j = void 0,
        k = !0,
        l = null,
        n = !1;
$(document).ready(function() {
RefreshTicket();
});
    function t() {
        return function() {}
    }

    function u(a) {
        return function() {
            return a
        }
    } z;
window.redirectToDesktop = function() {
            location.href = "/"
        };
        window.resetInternational = t();
        var v = [];
        window.startLiveChat = function() {
   

        };
        var w, y, z;
        window.localStorage ? (w = function(a) {
            return window.localStorage.getItem(a)
        }, y = function(a, c) {
            try {
                return window.localStorage.setItem(a, c), k
            } catch (b) {
                return n
            }
        }, z = function(a) {
            return window.localStorage.removeItem(a)
        }) : (w = u(l), y = u(n), z = t());

    function E() {
      
    }

    function H(a, c, b, f, d) {
        var h = window.ga;
        if (h) h("send", "event", a, c, b, f);
        else if (!d) window.notTrackedEvents || (window.notTrackedEvents = []), window.notTrackedEvents.push({
            category: a,
            action: c,
            label: b,
            value: f
        })
    }

    function G(a, c) {
        if (-1 < a.indexOf("login/register")) {
            if (!window.registerStartTime) H("REGISTER_TRACKING", "REGISTER_STARTED"), window.registerStartTime = (new Date).getTime()
        } else if (-1 < a.indexOf("/qr") && !window.qrAlreadyTracked) H("QR_CODE", a), window.qrAlreadyTracked = k;
        var b = window.ga;
        if (b) b("send", "pageview", a);
        else if (!c) window.notTrackedPages || (window.notTrackedPages = []), window.notTrackedPages.push(a)
    }
    window.trackRegisterDuration = function() {
        window.registerStartTime && (window.registerDuration = (new Date).getTime() - window.registerStartTime)
    };
    window.trackRegisterSuccess = function() {
        if (window.registerStartTime) {
            window.registerDuration || (window.registerDuration = (new Date).getTime() - window.registerStartTime);
            H("REGISTER_TRACKING", "REGISTER_SUCCESS_DURATION", window.registerDuration / 1E3);
            if (window.Adjust) {
                var a = new AdjustEvent("adzij1");
                Adjust.Ld(a)
            }
            window.registerStartTime = j;
            window.registerDuration = j;
            app.Q = j
        }
    };
window.registerTrackCancel=function(a){F("REGISTER_TRACKING","REGISTER_CANCELED_DUE_TO_FIELD",a)};

    function F() {
        1 == app.global.loggedIn && app.global.login != l && (ga("set", "&uid", app.global.login), window.trackRegisterSuccess(), clearInterval(window.gaUserLoginChecker))
    }
    if (window.navigator.standalone === k) {
        var I = w("session");
        if (I) document.cookie = "JSESSIONID=" + I + ""
    };
    window.setAppLoadedStatus("mobile_js_start");
    window.A = 0;
    window.B = 0;
    window.C = 0;
    var J = l;
    window.isBusy = function() {
        return app.Da || 0 != app.z || 0 != $("#ajax:visible").length || app.q || app.Fa
    };
    window.waitForNotBusy = function(a) {
        isBusy() ? app.Ea.push(a) : setTimeout(a, 0)
    };
    window.eb = w("timeZone");
    window.sa = 0;
    window.scan = function(a) {
        var c = app.global;
        app.info("scan: " + a);
        if ("0" == a) {
            if (c.loggedIn) {
                window.sa++;
                var b = window.sa;
                showDialog("Sie werden in 5 Sekunden abgemeldet, wenn Ihre Karte nicht vor der Kamera liegt.");
                window.setTimeout(function() {
                    b == window.sa && (hideDialog(), go("logout"))
                }, 5E3)
            }
        } else {
            if ("string" == typeof a) {
                var f = a.indexOf(" ");
                if (-1 != f) {
                    var d = a.substring(0, f),
                        a = a.substring(f + 1);
                    window.sa++;
                    hideDialog();
                    d != c.login && (app.info("scan login: user '" + d + "' pass '" + a + "'"), c.loggedIn != l && go("logout"),
                        go("login", {
                            username: d,
                            password: a
                        }));
                    return
                }
            }
            app.error("invalid scan code: '" + a + "'")
        }
    };
    var K = n;
    window.stressTest = function() {
        K = k;
        window.alert = function(a) {
            app.info("alert: " + a)
        };
        window.confirm = function(a) {
            var c = 0 == Math.floor(2 * Math.random());
            app.info("confirm: " + a + " = " + c);
            return c
        };
        window.showDialog = function(a, c, b) {
            c == l && (c = {
                "0": "OK"
            });
            b != l && b(c[Math.floor(Math.random() * c.length)])
        };
        app.info("alert und confirm \u00fcberschrieben f\u00fcr stresstest: F5 dr\u00fccken nach dem test! stop() beendet den test");
        window.stop = function() {
            K = n
        };
        M()
    };
    window.goConfirmed = function(a) {
        showDialog(i18n("common.externalUrl"), {
            cancel: i18n("common.cancel"),
            "continue": i18n("common.continue")
        }, function(c) {
            if ("continue" == c) window.location.href = a
        }, "dialogGoConfirmed")
    };
    window.scrollToAnchor = function(a) {
        a = $(a);
        a.length ? $("html, body").animate({
            scrollTop: a.offset().top - 44
        }, 500) : window.scrollTo(0, document.body.scrollHeight)
    };

    function M() {
        var a = $(app.page.ba[app.page.w] + " [onclick]").add(".appheader [onclick]").add(".appfooter [onclick]"),
            a = $(a[Math.floor(Math.random() * a.length)]);
        !a.hasClass("hidden") && "go('logout')" != a.attr("onclick") && 1 > app.z && a.click();
        K == k && window.setTimeout(M, 100)
    }
    window.errorMsg = function(a) {
        if (a != l && "" != a) return htmlTagOpen("div", {
            "class": "inlineerror scrollTo2"
        }) + a + htmlTagClose("div")
    };
    window.errorMsgNewReg = function(a) {
        if (a != l && "" != a) return htmlTagOpen("div", {
            "class": "error"
        }) + a + htmlTagClose("div")
    };
    window.createCheckbox = function(a, c) {
        c.type = "checkbox";
        a && (c.checked = "true");
        return htmlTag("input", c)
    };
    window.createRadio = function(a, c) {
        c.type = "radio";
        a && (c.checked = "true");
        return htmlTag("input", c)
    };
    window.selectInput = function() {
        if ("undefined" != typeof event) {
            var a = $("input", $(event.target).closest("div[onclick]"));
            event.target != a[0] && ("checkbox" == a.attr("type") ? a.attr("checked", !a.attr("checked")) : a.focus())
        }
    };
    window.htmlTag = function(a, c) {
        var b = "<" + a,
            f;
        for (f in c) "checked" == f && "true" == c[f] ? b += " checked" : c[f] != j && (b += " " + f + '="' + c[f] + '"');
        return b + "/>"
    };
    window.htmlTagOpen = function(a, c) {
        var b = "<" + a,
            f;
        for (f in c) b += " " + f + '="' + c[f] + '"';
        return b + ">"
    };
    window.htmlTagClose = function(a) {
        return "</" + a + ">"
    };
    window.submitCancelWrapVisibility = function(a, c) {
        var b = $(".submitCancelWrap");
        0 < b.length && (b.hasClass("hidden") ? b.removeClass("hidden") : $(a).parent().is(b) && b.addClass("hidden"));
        c && app.Pa(app.h())
    };
    window.animateElement = function(a, c, b, f, d, h) {
        (function(a, b, c, f, d, h) {
            function s() {
                s != l && (b[0].removeEventListener("webkitAnimationEnd", s, n), b[0].removeEventListener("webkitTransitionEnd", s, n), b.remove(), s = l)
            }
            b[0].addEventListener("webkitAnimationEnd", s, n);
            b[0].addEventListener("webkitTransitionEnd", s, n);
            setTimeout(s, 500);
            setTimeout(function() {

		    if(h<1)
		    {
                    h && a.hide();
		}
                    var s = "translate3d(" + c + "px," + f + "px,0)";
                    "number" == typeof d && 0 <= d && 1 >= d && (s += " scale(" + d + ")");
                    b.css({
                        transform: s,
                        "-webkit-transform": s,
                        opacity: "0.5"
                    })
                },
                25)
        })(a, function(a, b) {
            "number" != typeof b && (b = 0.5);
            var a = $(a),
                c = a.clone();
            c.css({
                position: "absolute",
                "z-index": "999",
                margin: "0",
                width: a.width() + "px",
                height: a.height() + "px",
                top: a.offset().top + "px",
                left: a.offset().left + "px",
                transition: b + "s linear all",
                "-webkit-transition": b + "s linear all"
            });
            $("body").append(c);
            return c
        }(a, d), c, b, f, h)
    };
    window.animateOddButton = function(a) {
        var c = $(a).offset(),
            b = $((app.d ? "#twoColumnFooter" : "#oneColumnFooter") + " .editor"),
            f = b.offset().left - c.left,
            c = b.offset().top - c.top;
        animateElement(a, f, c, 0.5, 0.33, n)
    };
    window.animateBetCountIcon = function(u) {
        var a = $((app.d ? "#twoColumnFooter" : "#oneColumnFooter") + " #kuponadedi"),
            c = "1" == a.text();
	if(u>0)
	{
        animateElement(a, 0, 30, l, 0.2, u);
	}else{
        animateElement(a, 0, 30, l, 0.2, c);
	}
    };

 window.ComboList = function(superset, size) {
     var result = [];
     if (superset.length < size) {
         return result;
     }
     var done = false;
     var current_combo, distance_back, new_last_index;
     var indexes = [];
     var indexes_last = size - 1;
     var superset_last = superset.length - 1;
     for (var i = 0; i < size; ++i) {
         indexes[i] = i;
     }
     while (!done) {
         current_combo = [];
         for (i = 0; i < size; ++i) {
             current_combo.push(superset[indexes[i]]);
         }
         result.push(current_combo);
         if (indexes[indexes_last] == superset_last) {
             done = true;
             for (i = indexes_last - 1; i > -1; --i) {
                 distance_back = indexes_last - i;
                 new_last_index = indexes[indexes_last - distance_back] +
                     distance_back + 1;
                 if (new_last_index <= superset_last) {
                     indexes[indexes_last] = new_last_index;
                     done = false;
                     break;
                 }
             }
             if (!done) {
                 ++indexes[indexes_last - distance_back];
                 --distance_back;
                 for (; distance_back; --distance_back) {
                     indexes[indexes_last - distance_back] = indexes[
                         indexes_last - distance_back - 1] + 1;
                 }
             }
         } else {
             ++indexes[indexes_last]
         }
     }
     return result;
 }
 window.KomboOdds = function(sets) {
     var result = [];
     var len = sets.length;
     var product;
     var toplam = 0
     for (var i = 0; i < len; ++i) {
         product = 1;
         inner_len = sets[i].length;
         for (var j = 0; j < inner_len; ++j) {
             product *= sets[i][j];
         }
         toplam += product;
         result.push(product);
     }
     return toplam;
 }
 window.Kombowins = function(sets) {
     var combowin = 0;
     var result = [];
     var len = sets.length;
     var product;
     var toplam = 0
     for (var i = 0; i < len; ++i) {
         product = 1;
         inner_len = sets[i].length;
         for (var j = 0; j < inner_len; ++j) {
             product *= sets[i][j];
         }
         toplam += (ticktotalbet*product);
         result.push(product);
     }
     return toplam;
 }
 window.UpdateSystem = function() {
     var thisbetnums = 0;
     if (!activesystem) {
         UnsetSystem();
         return
     }
     if (activesystem) {
         toplamkupon = 0;
         ticktotalrates = 0;
         var cos;
         var odds = new Array();
         for (var vl in thisbets) {
             for (var vl2 in thisbets[vl]) {
                 odds.push(thisbets[vl][vl2]['oran']);
		thisbetnums++;
             }
         }
         for (var i in ticksecilisistem) {
             if (i > thisbetnums) {
                 delete ticksecilisistem[i];
                 activesystem--;
             }
             cos = ComboList(odds, i);
             ticktotalwins += parseFloat(Kombowins(cos));
             ticktotalrates += parseFloat(KomboOdds(cos));
             toplamkupon += cos.length;
         }
     }
 }
 window.UnsetSystem = function() {
     toplambedel = '0.00';
     toplamkupon = 1;
     activesystem = 0;
     ticksecilisistem = new Array();
 }


    window.SetCookie= function() {
       $.cookie("kupon", $.toJSON(thisbets), {expires: 7, path: "/"});
    };


    window.deletealbets= function() {
       thisbets = new Object();
       $.cookie("kupon", "{}", {expires: 7, path: "/"});
    };

    window.DeleteBet= function(id) {
       RemoveSelect(id);
       delete thisbets[id];
       SetCookie();
       tickupdateall('1');
    };

	window.ReadCookie = function() {
        if ($.cookie("kupon") != null) {
         thisbets = $.evalJSON($.cookie("kupon"));
         }
 	}
    window.getalconts= function(id) {
       ReadCookie();
       tickupdateall();
    };


window.tickSendData = function() {
     if (ticksend) {
         return;
     }
     if (!tickbetnum) {
         alert('Oyun kuponunuzda maç bulunmamaktadır');
         return;
     }

     if (tickbetnum > tickmaxbet) {
         alert('Kuponunuzda Maximum '+tickmaxbet+' Bahis yer alabilir.');
         return;
     }

     if (tickminsum > ticktotalbet) {
         alert('Minimum '+tickminsum+' TL Yatırmanız Gereklidir.');
         return;
     }
     if (tickmaxsum < ticktotalbet) {
         alert('Maximum '+tickmaxsum+' TL Yatırabilirsiniz.');
         return;
     }


     if (tickmaxrate < ticktotalrate) {
         alert('Bir Kuponda En Fazla '+tickmaxrate+' Oran Olabilir.');
         return;
     }

     if (tickmno > ticktotalrate) {
         alert('Bir Kuponda En Az '+tickmno+' Oran Olmalıdır.');
         return;
     }

     if (tickmaxwin < ticktotalwin) {
         alert('Bir Kuponda En Fazla '+tickmaxwin+' TL Kazanç Olabilir.');
         return;
     }


     if (tickinduello && tickoutduello) {
         alert('Normal Bahisler ve Düello Kombine Edilemez.');
         return;
     }

     if(tickinlive && tickoutlive && tickkombinasyon!=1)
     {
         alert('Normal Bahisler ve Canlı Bahisler Kombine Edilemez.');
         return;
     }
     if (!tickopen) {
         alert('Kupon askıya alındı.Bahisler aktif değil');
         return;
     }


     var mbs = MbsKontrol();
     var dahaekle = mbs - tickbetnum;
     if (tickbetnum < mbs) {
         alert('Minimum oyun sayısı yetersiz. En az ' + dahaekle +' oyun daha eklemelisiniz');
         return;
     }





     app.t();
     ticksend = true;
     var secimler = {};
     var sistemler = {};
     var dsistemler = {};
     var eventodds = [];
     var i = 0;
     for (var vl in thisbets) {
         for (var vl2 in thisbets[vl]) {
			if(thisbets[vl][vl2]['canli']!=0)
			{
			thisbets[vl][vl2]['devre']	  	= Live.GetPeriyod(Live.bets[vl].spid,Live.bets[vl].pid);
			thisbets[vl][vl2]['dksi']	  	= Live.FixMinute(Live.bets[vl].diff);
			thisbets[vl][vl2]['radarid'] 		= Live.bets[vl].radarid;
			thisbets[vl][vl2]['stp'] 		= (Live.bets[vl].startdate / 1000);
			thisbets[vl][vl2]['date'] 		= (Live.bets[vl].startdate / 1000);
			thisbets[vl][vl2]['homes']	  	= Live.bets[vl].sch;
			thisbets[vl][vl2]['aways']	  	= Live.bets[vl].sca;
			}else{
			thisbets[vl][vl2]['devre']	  	= "";
			thisbets[vl][vl2]['dksi']	  	= "";
			thisbets[vl][vl2]['radarid'] 		= "";
			thisbets[vl][vl2]['homes']	  	= "";
			thisbets[vl][vl2]['aways']	  	= "";
			}
	secimler[vl2] = {
                 bahiskodu: vl,
                 canli: thisbets[vl][vl2]['canli'],
                 orankodu: vl2,
                 oran: thisbets[vl][vl2]['oran'],
                 bahis: thisbets[vl][vl2]['bahis'],
                 oyunad: thisbets[vl][vl2]['oyunad'],
                 oyunkad: thisbets[vl][vl2]['oyunkad'],
                 tercih: thisbets[vl][vl2]['tercih'],
                 ktercih: thisbets[vl][vl2]['ktercih'],
                 oyunkodu: thisbets[vl][vl2]['oyunkodu'],
                 spid: thisbets[vl][vl2]['spid'],                 
		 stp: thisbets[vl][vl2]['date'],                 
		 hdc: thisbets[vl][vl2]['hdc'],
		 devre: thisbets[vl][vl2]['devre'],
		 dksi: thisbets[vl][vl2]['dksi'],
		 radarid: thisbets[vl][vl2]['radarid'],
		 homes: thisbets[vl][vl2]['homes'],
		 aways: thisbets[vl][vl2]['aways'],
		 idcol: thisbets[vl][vl2]['idcol']
             };



}
eventodds.push(vl);
         i++;
}


     for (var i in ticksecilisistem) {
         sistemler[i] = i;
         dsistemler[i] = ComboList(eventodds, i);

     }


     var description = $('#description').val().toUpperCase();
     var params = {
         orktr: Liveorktr,
         amount: ticktotalbet,
         cmd: 'confirm',
	description: description,
	 cbonus : 1,
	 thismobile : 2,
         ochecked: tickochecked,
	 tkupon : toplamkupon,
	 dsystemler: dsistemler,
         systemler: sistemler,
         secimler: secimler
     };
	$.ajax({
            url: "/confirm.php",
            dataType: "json",
            contentType: "application/x-www-form-urlencoded",
            data: params,
            type: "POST",
            success: function(json) {
	    if (json.success) {
	     setLastTicket();
	     tickClear();
	     deletealbets();
             tickYazdirTema(json.results.ticketid, json.results.amount,json.results.trate, json.results.win, json.results.bc, json.results.misli, json.results.system, json.results.bets);             ticksend = false;
	     $("#ajax, #ajax .window, #ajax .block").addClass("hidden");
	     absa=$(".appfooter .account .count");
	     absa.html(json.results.balance);
	     app.mc();
       	  } else {
             ticksend = false;
	     $('#khata').show();
	     $('#khatatext').html(json.messages);
	     app.mc();
	     $("#ajax, #ajax .window, #ajax .block").addClass("hidden");
            }
            }
        });

    



}







 window.tickYazdirTema = function(ticketid, amount, trate, win, bc, misli,system,bets) {

     var htmlmobil = '';
	htmlmobil+='<div>';
     htmlmobil+='<div class="">';
     htmlmobil+='<div class="space_2">&nbsp;</div>';
     htmlmobil+='<div class="msgtext msgtextbg scrollTo">';
     htmlmobil+='<div class="icons msg_info"></div>';
     htmlmobil+='<div class="hidden"></div>';
     htmlmobil+='<div class="hidden"></div>';
     htmlmobil+='<div class="text">Kuponunuz kabul edildi. Bol şanslar!</div>';
     htmlmobil+='</div>';
     htmlmobil+='<div class=""></div>';
     htmlmobil+='</div>';
     htmlmobil+='</div>';
     htmlmobil+='<div class="bartitle bartitlebutton">';
     htmlmobil+='<div class="icon hidden"></div>';
     htmlmobil+='<div class="text">Kupon '+ticketid+'</div>';
     htmlmobil+='</div>';
     htmlmobil+='<div>';
     htmlmobil+='<div class="barmiddle">';
     htmlmobil+='<div class="text">Durum</div>';
     htmlmobil+='<div class="value pr_7" style="float:right;">';
     htmlmobil+='<div class="cell" style="text-transform:capitalize">';
     htmlmobil+='<div class="ticketstatus DELIVERED"></div> açık</div>';
     htmlmobil+='</div>';
     htmlmobil+='</div>';
     htmlmobil+='<div class="barmiddle">';
     htmlmobil+='<div class="text">Tarih</div>';
     htmlmobil+='<div class="value pr_7">Bugün '+new Date().getHours().toFixed(2)+':'+new Date().getMinutes().toFixed(2)+'</div>';
     htmlmobil+='</div>';
     htmlmobil+='<div class="barmiddle ">';
     htmlmobil+='<div class="text">Bahis</div>';
     htmlmobil+='<div class="value pr_7">' +amount +'</div>';
     htmlmobil+='</div>';
     htmlmobil+='<div class="barmiddle ">';
     htmlmobil+='<div class="text">Maks. Kazanç</div>';
     htmlmobil+='<div class="value pr_7">' +win + '</div>';
     htmlmobil+='</div>';
     htmlmobil+='<div class="barmiddle ">';
     htmlmobil+='<div class="text">Maks. Oran</div>';
     htmlmobil+='<div class="value pr_7">' + trate + '</div>';
     htmlmobil+='</div>';
     htmlmobil+='<div class="barmiddle hidden">';
     htmlmobil+='<div class="text">Bonus çevrimini sağlayan tutar</div>';
     htmlmobil+='<div class="value pr_7"></div>';
     htmlmobil+='</div>';
     htmlmobil+='<div class="barmiddle" onclick="">';
     htmlmobil+='<div class="text">Sistem';
     htmlmobil+='</div>';
     htmlmobil+='<div class="value pr_7">' + system + '</div>';
     htmlmobil+='</div>';
     htmlmobil+='</div>';





for (tis in bets)
{
if(bets[tis].canli>0)
{
htmlmobil+='<div class="ticketitem even" onclick="go(\'sports/event/'+tis+'\');">';
htmlmobil+='<div class="label date">'+bets[tis].devre+'</div>';
}else{
htmlmobil+='<div class="ticketitem even" onclick="go(\'sports/event/getodds/'+bets[tis].spid+'/'+tis+'\');">';
htmlmobil+='<div class="label date">'+bets[tis].bttimes+'</div>';
}
     htmlmobil+='<div class="text">';
     htmlmobil+='<span>'+bets[tis].bahis+'</span><br>';
if(bets[tis].canli>0)
{
     htmlmobil+='<span class="normal">'+bets[tis].thomes+':'+bets[tis].taways+' Bahis anındaki skor</span>';
}
     htmlmobil+='</div></div>';
     htmlmobil+='<div class="ticketsubitem even pad">';
     htmlmobil+='<div class="label"></div>';
     htmlmobil+='<div class="text OPEN">'+bets[tis].oyunkad+'&nbsp;'+bets[tis].ktercih+'</div>';
     htmlmobil+='<div class="value OPEN">'+bets[tis].oran+'</div>';
     htmlmobil+='</div>';
     htmlmobil+='<div class="clear barfinish even"></div>';
     htmlmobil+='<div>';

}


     htmlmobil+='<div class="bigbutton_wrapper"><button class="bigbutton" onclick="javascript:tickLastTicket();"><div class="text">Kuponu tekrar kullan</div></button></div>';
     htmlmobil+='</div>';
     htmlmobil+='<div> </div>';
     htmlmobil+='<div style="text-align: center; width: 100%;" class="contentbottom hidden">';
     htmlmobil+='<div class="bar arrow" onclick=""> </div>';
     htmlmobil+='<div class="contentbottomtext" style="padding-bottom: 50px;"> </div>';
     htmlmobil+='</div>';
     htmlmobil+='<div class="spacer">&nbsp;</div>';





	$('#kuponuma').html(htmlmobil);
     $('.editorCount').text('0').hide();
 }


 window.tickLastTicket = function() {
 var x = 0;
     for (var vl in ticklastticket) {
         x++;
     }
     if (x) {
         tickClear();
         thisbets = $.extend(true, {}, ticklastticket);
	 SetCookie();
         tickupdateall(1);
     }
 }



 window.setLastTicket = function() {
     ticklastticket = $.extend(true, {}, thisbets);
 }


 window.RemoveSelectAll = function() {
 for (var vl in thisbets) {
         for (var vl2 in thisbets[vl]) {
             $("div[oddsid='" + vl2 + "']").removeClass('on');
             $("div[oddsid='" + vl2 + "']").removeClass('selected');
         }
         delete thisbets[vl];
     }
 }

 window.tickClear = function() {
     RemoveSelectAll();
     thisbets = new Object();
     tickbetnum = 0;
     ticktotalbet = '0.00';
     ticktoplambedels = '0.00';
     ticktoplambedel = '0.00';
     window.amount="0.00";
     UnsetSystem();
     SetCookie();
 }





    window.Oran_Kabul_Kontrol = function() {
     if ($('#ochecked').get(0).checked) {
         $.cookie("ochecked", 1, {expires: 1});
         tickochecked = 1;
     } else {
         $.cookie("ochecked", 0, {expires: 1});
         tickochecked = 0;
     }
 }



    window.tickAddLiveMain= function(bahiskodu, canlikodu, orankodu,tid,n) {
    if (this.send || !Live.bets[bahiskodu]) {
         return;
     }

    var idc = Live.FindIdcolmain(tid, Live.bets[bahiskodu].games[tid].oranlar[orankodu].tercih);

     if (idc == 0) {
         alert('Oyun tercihiniz şu an için aktif değildir ya da kapatılmıştır');
         return;
     }

    if(idc=="dynamic")
    {
    var dynamic = "1";
    var gidsi = tid;
    var terch = Live.GameTranslate(Live.bets[bahiskodu].games[tid].oranlar[orankodu].tercih);
    }else{
    var dynamic = "0";
    var terch = "0";
    var gidsi = "0";
    }
    toggleResult(orankodu,bahiskodu,tid,idc,canlikodu,1,Live.bets[bahiskodu].team,Live.bets[bahiskodu].startdate,Live.spids[Live.bets[bahiskodu].spid].spidid,0,Live.bets[bahiskodu].games[tid].oranlar[orankodu].oran,terch, n);
   }

    window.tickAddLive= function(bahiskodu, canlikodu, orankodu,n) {
  	if (this.send || !Live.bets[bahiskodu]) {
         return;
     }
     var idc = Live.FindIdcol(Live.Details.oyunlar[canlikodu].gid, Live.Details.oyunlar[canlikodu].oranlar[orankodu].tercih);
     if (idc == 0) {
         alert('Oyun tercihiniz şu an için aktif değildir ya da kapatılmıştır');
         return;
     }

    if(idc=="dynamic")
    {
    var dynamic = "1";
    var gidsi = Live.Details.oyunlar[canlikodu].gid;
    var terch = Live.GameTranslate(Live.Details.oyunlar[canlikodu].oranlar[orankodu].tercih);
    }else{
    var dynamic = "0";
    var terch = "0";
    var gidsi = "0";
    }
    toggleResult(orankodu,bahiskodu,Live.Details.oyunlar[canlikodu].gid,idc,canlikodu,1,Live.bets[bahiskodu].team,Live.bets[bahiskodu].startdate,Live.spids[Live.bets[bahiskodu].spid].spidid,0,Live.Details.oyunlar[canlikodu].oranlar[orankodu].oran,terch, n);
   }


    window.tickupdateall= function(id) {
       if(Object.keys(thisbets).length<1)
       {
       ReadCookie();
       }
SetCookie();
    	};
 	window.RemoveSelect = function(id) {
     	for (var vl in thisbets[id]) {
         $("div[oddsid='" + vl + "']").removeClass('selected');
     	}
 	}



window.RefreshTicket = function() {
         setInterval('tickUpdateOdds()', tickrefreshtime);
}



window.tickSetImage = function(bahiskodu, orankodu, oran) {
     if (typeof tickeskioranlar[orankodu] == 'undefined') {
         return '';
     }
     if (tickeskioranlar[orankodu] == '1.00') {
         thisbets[bahiskodu][orankodu]['oran'] = '1.00';
         tickopen = false;
         return 'paused';
     }
     if (tickeskioranlar[orankodu] == oran) {
         return '';
     }
     if (tickeskioranlar[orankodu] > oran) {
         thisbets[bahiskodu][orankodu]['oran'] = tickeskioranlar[orankodu];
         return "tendup";
     }
     if (tickeskioranlar[orankodu] < oran) {
         thisbets[bahiskodu][orankodu]['oran'] = tickeskioranlar[orankodu];
         return 'tendown';
     }
 }


window.tickUpdateOdds= function()
{
tickrquery = '';
     if (tickbetnum == 0) {
         tickeskioranlar = new Array();
         return;
     }
     if (ticksend) {
         return;
     }
     var l = 0;
     for (var vl in thisbets) {
        for (vl2 in thisbets[vl]) {
	if (thisbets[vl][vl2]['canli'] > 0) {
	tickrquery += vl + ',' + thisbets[vl][vl2]['canli'] + ',' +vl2 + '|';l++;
	}
	}
	}
     if (l == 0) {
         return;
     }
     tickrquery = tickrquery.substring(0, (tickrquery.length - 1));
     var params = {
         cmd: 'results',
	 tp : 'json',
         query: tickrquery
     };
	$.ajax({
            url: "/_server/lvbt/mapi.php",
            dataType: "json",
            data: params,
            type: "GET",
            success: function(xml) {
	    for(var j in xml)
	    {
                 var orankodu = parseInt(xml[j].RID);
                 var open = xml[j].Open;
                 var available = xml[j].Open;
                 var odds = parseFloat(xml[j].Odds).toFixed(2);
                 if (typeof open == 'undefined') open ='False';
                 if (!open) open ='False';
                 if (typeof available == 'undefined')available = 'False';
                 if (isNaN(odds)) odds = '1.00';
                 if (available == 'False') {tickeskioranlar[orankodu] ='1.00';
                 } else if (open == 'False') {tickeskioranlar[orankodu] ='1.00';
                 } else {

			console.log(thisbets[j]);

		     if(thisbets[j][xml[j].RID].spid==1)
		     {
                     tickeskioranlar[orankodu] = LiveOddsFixed(odds);
		     }else if(thisbets[j][xml[j].RID].spid==5)
		     {
                     tickeskioranlar[orankodu] = LiveOddsFixedcb(odds);
		     }else{
                     tickeskioranlar[orankodu] = LiveOddsFixedcbd(odds);
		     }

                 }

	    }
            }
        });
tickupdateall('1');
}




 window.LiveOddsFixed = function(rate) {
         if (Live.orktr == 0 || rate < 1.20) {
             return rate;
         }
         if (rate < 10) {
             fl = Math.floor(rate);
             degisim = parseFloat(fl * Live.orktr * 0.05).toFixed(2);
         } else if (rate >= 10 && rate <= 100) {
             fl = Math.floor(rate / 10);
             degisim = parseFloat(fl * Live.orktr * 1).toFixed(2);
         } else {
             fl = Math.floor(rate / 100);
             degisim = parseFloat(fl * Live.orktr * 5).toFixed(2);
         }
         rate = parseFloat(rate - degisim).toFixed(2);
         return rate;
     }

 window.LiveOddsFixedcb = function(rate) {
         if (Live.cborktr == 0 || rate < 1.20) {
             return rate;
         }
         if (rate < 10) {
             fl = Math.floor(rate);
             degisim = parseFloat(fl * Live.cborktr * 0.05).toFixed(2);
         } else if (rate >= 10 && rate <= 100) {
             fl = Math.floor(rate / 10);
             degisim = parseFloat(fl * Live.cborktr * 1).toFixed(2);
         } else {
             fl = Math.floor(rate / 100);
             degisim = parseFloat(fl * Live.cborktr * 5).toFixed(2);
         }
         rate = parseFloat(rate - degisim).toFixed(2);
         return rate;
     }

 window.LiveOddsFixedcbd = function(rate) {
         if (Live.cbdorktr == 0 || rate < 1.20) {
             return rate;
         }
         if (rate < 10) {
             fl = Math.floor(rate);
             degisim = parseFloat(fl * Live.cbdorktr * 0.05).toFixed(2);
         } else if (rate >= 10 && rate <= 100) {
             fl = Math.floor(rate / 10);
             degisim = parseFloat(fl * Live.cbdorktr * 1).toFixed(2);
         } else {
             fl = Math.floor(rate / 100);
             degisim = parseFloat(fl * Live.cbdorktr * 5).toFixed(2);
         }
         rate = parseFloat(rate - degisim).toFixed(2);
         return rate;
     }

 window.MbsKontrol = function() {
     var mbs = 1;
     for (var vl in thisbets) {
         for (var vl2 in thisbets[vl]) {
             if (thisbets[vl][vl2]['mbs'] > mbs) {
                 mbs = thisbets[vl][vl2]['mbs'];
             }
         }
     }
     return mbs;
 }


    window.toggleResult = function(a,eid,gid,c) {
	var oncesi ="0";
	if(thisbets[eid])
	{
	 if (thisbets[eid][a]) {
            oncesi = 1;
         }
	RemoveSelect(eid);
	DeleteBet(eid);
	}
	 if(oncesi!=1){
    	 thisbets[eid] = new Object();
         thisbets[eid][a] = new Object();
         thisbets[eid][a]['bahiskodu'] = eid;
         thisbets[eid][a]['oyunkodu'] = gid;
         thisbets[eid][a]['orankodu'] = a;
	 $("div[oddsid='" + a + "']").addClass('selected');
	 animateOddButton(c);
	 }
	 SetCookie();
	tickupdateall();
    };
    window.toggleTicketNotification = function(a) {
        go({
            toggleTicketNotification: a
        }, "none");
        app.Xa()
    };

    function N(a) {
        return a ? a.replace(/[&\/\\#,+()$~%'":*?<>{}]/g, "") : ""
    }
    window.search = function(a, c) {
        if (a = $.trim(a)) eBetFeatures && "1" == eBetFeatures.searchMobileSanitize && (a = N(a)), a = encodeURIComponent(a.replace(/[%\.\:\/ ]+/g, " ")), go("sports/search/" + (c == j ? "" : c + "/") + a)
    };
    window.hideSuggestions = function() {
        app.a("input.searchfield").val("");
        app.a("#searchDeleteIcon").addClass("hidden");
        app.a("#suggestions").addClass("hidden");
	toggleQuickFilter();
    };
    window.updateSearchLive = function() {
        var a = $("input.secoundsearch").val();
	 if (a.length < 3) {
             return;
         }
        eBetFeatures && "1" == eBetFeatures.searchMobileSanitize && (a = encodeURIComponent(N(a)));
	var vlc = 0;
	var gonder = {};
	var patt1 = new RegExp(a, "ig");
	for (var eid in Live.bets) {
	if (Live.bets[eid].status == 1 && (Live.bets[eid].hteam.match(patt1) || Live.bets[eid].ateam.match(patt1) || Live.bets[eid].country.match(patt1))) {
                 if (vlc < 3) {
		  gonder[vlc] = ["1","" + eid + "","" + Live.bets[eid].hteam + " - " + Live.bets[eid].ateam + "","1"];
                 }
                 vlc++;
             }
	}

		    if(vlc>0)
		    {
			setVisibilityStatusLive(vlc,gonder);
                    for (b = 0; b <= vlc; b++)
		    {
		    if(gonder[b])
		    {
		    setSuggestionRowLive(b, gonder[b]);
		    }
		    }
		    }


    };
    window.updateSearch = function() {
        var a = app.a("input.searchfield").val();
	 if (a.length < 3) {
             return;
         }
        eBetFeatures && "1" == eBetFeatures.searchMobileSanitize && (a = encodeURIComponent(N(a)));
	var vlc = 0;
	var gonder = {};
	var patt1 = new RegExp(a, "ig");
	for (var eid in Live.bets) {
	if (Live.bets[eid].status == 1 && (Live.bets[eid].hteam.match(patt1) || Live.bets[eid].ateam.match(patt1) || Live.bets[eid].country.match(patt1))) {
                 if (vlc < 3) {
		  gonder[vlc] = ["1","" + eid + "","" + Live.bets[eid].hteam + " - " + Live.bets[eid].ateam + "","1"];
                 }
                 vlc++;
             }
	}
        $.ajax({
            url: "ajax/searchSuggestions?searchText=" + a,
            success: function(a) {
                a = a[a.length - 1];
                if (10 == a.length) {
                    var b = 1 == a[7] || 1 == a[8];
                    setVisibilityStatus(app.a("#suggestions"), !b);
                    setVisibilityStatus(app.a("#searchDeleteIcon"), !b);
                    b = app.a("#suggestions .bartitle");
                    2 == b.length && (setVisibilityStatus($(b[0]), 0 == a[7]), setVisibilityStatus($(b[1]), 0 == a[8]));
		    if(gonder[0])
		    {
		    a[4]=gonder[0];
		    }
		    if(gonder[1])
		    {
		    a[5]=gonder[1];
		    }
		    if(gonder[2])
		    {
		    a[6]=gonder[2];
		    }
                    for (b = 1; b <= app.a("#suggestions .barbottom").length; b++) setSuggestionRow(b - 1, a[b])
                }
            }
        });
    };
    window.setVisibilityStatus = function(a, c) {
        c ? a.addClass("hidden") : a.removeClass("hidden")
    };

    window.setVisibilityStatusLive = function(a, c) {
        c ? $('.livesuggent').removeClass("hidden") : $('.livesuggent').addClass("hidden")
    };


    window.setSuggestionRowLive = function(a, c) {
	if(c)
	{
        var b = $($(".livesuggent .barbottom")[a]);
        b.find(".text").text(c[2]);
	b.attr("onclick", "go('sports/event/"+c[1]+"'); app.fromEventId = window.scrollY > 0 ? "+c[1]+" : null;")
	}
    };


    window.setSuggestionRow = function(a, c) {
        var b = $(app.a("#suggestions .barbottom")[a]); "" == c[1] ? b.addClass("hidden") : b.removeClass("hidden");
        b.find(".text").text(c[2]);
		if(c[0]=="0")
		{
		b.attr("onclick", "go('sports/event/getodds/"+c[3]+"/"+c[1]+"'); app.fromEventId = window.scrollY > 0 ? "+c[1]+" : null;")
		}else{
		b.attr("onclick", "go('sports/event/"+c[1]+"'); app.fromEventId = window.scrollY > 0 ? "+c[1]+" : null;")
		}
    };
    window.png = function(a, c) {
        var b = c.lastIndexOf("/");
        0 != b && (c = c.substring(b + 1));
        return htmlTag("div", {
            "class": a + " " + c
        })
    };
    window.redCards = function(a, c) {
        for (var b = "", f = 1; f <= c; f++) b += htmlTag("img", {
            "class": a && c == f ? "blink redCards" : "redCards",
            src: "img/scorebox/red-card.png",
            width: "20",
            height: "20"
        });
        return b
    };
    window.submitForm = function(a, c) {
        var b = window.event && app.la(window.event.target),
            f = "none",
            d = k;
        "string" == typeof c && (f = c);
        "boolean" == typeof c && (d = c);
        var h = {},
            b = app.h(b);
        0 <= b.indexOf("?") && (h = app.dc(b), b = b.substring(0, b.indexOf("?")));
        a.onsubmit = u(n);
        for (var g = 0; g < a.elements.length; g++) {
            var m = a.elements[g];
            if ("INPUT" == m.tagName && "radio" == m.type) {
                if (m.checked) h[m.name] = m.value
            } else if ("INPUT" == m.tagName && "checkbox" == m.type) h[m.name] = m.checked ? 1 : 0;
            else if ("_url" == m.name) b = m.value;
            else if ("" != m.name) h[m.name] =
                m.value
        }
        if (h.submitted != j && "false" == h.storeOnly) app.t(), h.submitted = "true";
        if ("function" == typeof c && !c(a, b, h)) return n;
        "payout/select" == b && "BANK" == h.type && (window.PAYOUT_BANK_PARAMS = h);
        "login/register" == b && "" != h["birthday.day"] && "" == h["birthday.month"] && (h["birthday.month"] = -1);
        d ? go(b, h, f, n) : $.ajax({
            url: "ajax/" + b,
            dataType: "json",
            contentType: "application/x-www-form-urlencoded",
            data: h,
            type: "POST",
            success: t()
        });
        app.s = l;
        return n
    };
    window.editorReact = function(a) {
        "REMOVE_NON_OPEN" == a ? go({
            reaction: a
        }, "skip") : (app.t(), go({
            reaction: a
        }, "skip", n))
    };
    window.toggleFavorite = function(a, c, b) {
        window.notification.xa();
        app.t();
        go({
            toggleId: a,
            toggleCategory: c,
            toggleType: b
        })
    };
    window.toggleFavorite2 = function(a, c) {
        $.ajax({
            url: "ajax/toggleFavorite",
            dataType: "json",
            contentType: "application/x-www-form-urlencoded",
            data: {
                eventId: c
            },
            type: "POST",
            success: function(a) {
                a.success ? (go(), document.querySelector(app.j() + " #e" + c + " .favorites img").src = "NO" == a.favorite ? "img/favorite0.png" : "img/favorite1.png") : console.log("Couldn't toggle favorite with id " + c)
            }
        });
        stopEventPropagation(a)
    };
    window.toggleBetMatrix = function(a, c) {
        var b = app.R.indexOf(c); - 1 < b ? app.R.splice(b, 1) : app.R.push(c);
        go();
        stopEventPropagation(a)
    };
    window.stopEventPropagation = function(a) {
        (a || window.event).stopPropagation()
    };

    function O(a, c) {
        go("ticket/list", {
            MODE: "buyback",
            buyBackValue: c,
            ticketId: a,
            skipDelay: window.skipDelayForCashOutTicketId === a,
            showAjax: k
        }, "skip", n);
        window.skipDelayForCashOutTicketId = a
    }
    window.buybackTicket = function(a, c, b) {
        showDialog(i18n("ticket.doYouWantToBuybackTicket", b), {
            yes: i18n("common.Yes"),
            no: i18n("common.No")
        }, function(b) {
            "yes" == b && O(a, c)
        }, "dialogBuyBack")
    };
    window.showBuyBackSkipDelayDialog = function(a, c, b) {
        window.setTimeout(function() {
            showDialog(a, {
                yes: i18n("common.Yes"),
                no: i18n("common.No")
            }, function(a) {
                "yes" == a && O(c, b)
            }, "dialogBuyBackSkipDelay")
        }, 700)
    };
    window.cashoutTicket = function(a) {
        var c = {};
        c.ticketId = a;
        $.ajax({
            url: "ajax/ticket/updatedBuyBack",
            dataType: "json",
            contentType: "application/x-www-form-urlencoded",
            data: c,
            type: "POST",
            success: function(b) {
                0 < b.value ? showDialog(i18n("ticket.doYouWantToCashoutTicket", b.valueWithCurrency), {
                    yes: i18n("common.Yes"),
                    no: i18n("common.No")
                }, function(c) {
                    "yes" == c && O(a, b.value)
                }, "dialogCashout") : showDialog(i18n("ticket.buyback.currentlyNotPossible"), l, l, "dialogBuyBackNotPossible")
            }
        })
    };
    window.animateCashoutFilling = function(a, c) {
        if (!(-0.0010 < c && 0.0010 > c)) {
            window.Ha = window.Ha || {};
            var b = window.Ha["" + a] || 0;
            if (!(0 > b)) {
                var f = document.querySelector(app.j("ticket/list") + " #cashoutButton" + a + " .filling");
                f.style.transitionDuration = "0s";
                f.style.width = 100 * b + "%";
                window.Ha["" + a] = c;
                setTimeout(function() {
                    f.style.transitionDuration = "2s";
                    f.style.width = 0 > c ? 0 : 100 * c + "%"
                }, 200)
            }
        }
    };
    window.animateCashoutButton = function(a) {
        var a = $(app.j("ticket/list") + " #cashoutButton" + a).parent(),
            c = a.offset(),
            b = $(".footer .account"),
            f = b.offset().left - c.left - a.width() / 4,
            c = b.offset().top - c.top;
        animateElement(a, f, c, 0.4, 0.4, k)
    };
    window.animateCashoutButtonDrain = function(a) {
        animateCashoutFilling(a, -1);
        setTimeout(function() {
            animateCashoutButton(a);
            app.H = k
        }, 2E3)
    };
    window.cancelTicket = function(a) {
        showDialog(i18n("ticketlistbean.CancelConfirm"), {
            yes: i18n("common.Yes"),
            no: i18n("common.No")
        }, function(c) {
            "yes" == c && go("ticket/list", {
                MODE: "cancel",
                ticketId: a
            })
        }, "dialogCancelTicket")
    };
    window.reuseTicket = function(a, c) {
        c ? go("editor", {
            reuseTicketId: a,
            reuseSharedTicket: k
        }) : go("editor", {
            reuseTicketId: a
        })
    };
    window.za = ["0"];


    window.livescorewrite = function(scr) {
    if(scr)
    {
    for (var bh in scr) {
    $('.appcontent #'+bh+'_cpscr').html(Live.GetPeriyod(scr[bh].spid, scr[bh].pid)+':'+scr[bh].sch+'-'+scr[bh].sca);
    }
    }
    };

    window.loginCheck = function() {
        var a = w("username"),
            c = w("password");
        a != l && c != l && window.setTimeout(function() {
            go("login", {
                username: a,
                password: c
            }, "skip")
        }, 0);
        return ""
    };
    window.showPassword = function() {
        "password" == document.querySelector("input[name=password]").type ? document.querySelector("input[name=password]").type = "text" : document.querySelector("input[name=password]").type = "password"
    };
    window.loginCallback = function(a, c, b) {
        1 != b.save ? (z("username"), z("password")) : (y("username", b.username), y("password", b.password));
        return k
    };
    window.changeAutologinPassword = function(a, c) {
        y("username", a);
        y("password", c)
    };
    window.selectDate = function(a, c, b, f, d, h) {
        d == j && (d = (new Date).getFullYear());
        h == j && (h = (new Date).getFullYear() - 3);
        c = "" + selectBox(a + ".day", c, 1, 31, j, n, "select selectdate");
        c = c + "." + selectBox(a + ".month", b, 1, 12, j, n, "select selectdate");
        return c = c + "." + selectBox(a + ".year", f, d, h, j, n, "select selectdate")
    };
    window.selectExpirationDate = function(a, c, b, f) {
        var d = (new Date).getFullYear(),
            h = d + 10,
            a = "" + selectBox(a, b, 1, 12, j, n, "select selectdate");
        return a = a + " / " + selectBox(c, f, d, h, j, n, "select selectdate")
    };
    window.selectDateNewReg = function(a, c, b, f, d, h) {
        d == j && (d = (new Date).getFullYear());
        h == j && (h = (new Date).getFullYear() - 3);
        c = '<div class="col-xs-4"><div class="wrap">' + selectBox(a + ".day", c, 1, 31, j, n, "select selectdate customSelect", k, n, "registerBirthdayDay");
        c = c + '</div></div><div class="col-xs-4"><div class="wrap">' + selectBox(a + ".month", b, 1, 12, j, n, "select selectdate customSelect", k, n, "registerBirthdayMonth");
        c = c + '</div></div><div class="col-xs-4"><div class="wrap">' + selectBox(a + ".year", f, d, h, j, n, "select selectdate customSelect",
            k, n, "registerBirthdayYear");
        return c + "</div></div>"
    };
    window.selectBox = function(a, c, b, f, d, h, g, m, r, q) {
        g == j && (g = "select");
        g = '<select name="' + a + '" class="' + g + '"';
        d != j && 0 < d.length && (g += ' onchange="' + d + '"', r || window.setTimeout(d, 0));
        q && (g += ' data-qa="' + q + '" id="' + q + '"');
        g += ">";
        h && (g += '<option value="">' + i18n("edituser.PleaseSelect") + "</option>");
        if ("number" == typeof b)
            if (f < b)
                for (d = b; d >= f; d--) g += '<option value="' + d + '"', c == d && (g += ' selected="selected"'), g += ">" + d + "</option>";
            else
                for (d = b; d <= f; d++) g += '<option value="' + d + '"', c == d && (g += ' selected="selected"'), g +=
                    ">" + d + "</option>";
        else if (b instanceof Array)
            for (d = 0; d < b.length; d++) {
                var p = b[d],
                    g = g + ('<option value="' + p + '"');
                c == p && (g += ' selected="selected"');
                g += ">" + p + "</option>"
            } else
                for (p in b) g += '<option value="' + p + '"', c == p && (g += ' selected="selected"'), g += ">" + b[p] + "</option>";
        g += "</select>";
        m && (g += "<script>$('select[name=\"" + a + "\"]').customSelect()<\/script>");
        return g
    };
    window.initOddEven = function() {
        window.qa = 0
    };
    window.addScriptTag = function(a, c) {
        var b = document.getElementById("trackingPixel" + c);
        b && document.head.removeChild(b);
        b = document.createElement("script");
        b.setAttribute("src", a);
        b.setAttribute("type", "text/javascript");
        b.setAttribute("id", "trackingPixel" + c);
        document.head.appendChild(b)
    };
    window.toggleOddEven = function() {
        window.qa++;
        return getOddEven()
    };
    window.getOddEven = function() {
        return 1 == window.qa % 2 ? "odd" : "even"
    };
    window.toggleFirst = function() {
        window.qa++
    };
    window.getFirst = function(a, c) {
        return 0 == window.qa ? a : c
    };
    window.img = function(a, c, b) {
        a = {
            src: "img/" + a,
            alt: ""
        };
        c && (a.width = c);
        b && (a.height = b);
        return htmlTag("img", a)
    };
    window.center_icon = function(a, c) {
        return '<div style="width:20px;margin-left:50%;"><div class="' + a + '" style="margin-left:-' + c + 'px;"></div></div>'
    };
    window.editorRowAction = function(a, c) {
	if(c.removeIndex==1)
	{
	delete copunbet[c.eid];
	SetCookie();
	}
        go(c, "slideup");
        a = a || window.event;
        a.stopPropagation()
    };
    window.deletePaymentData = function(a) {
        $("#dr_" + a).attr("value", k);
        $("#pr_" + a).attr("value", n)
    };
    window.submitPaymentForm = function(a, c) {
        var b = c != j ? "_" + c : "";
        "true" == $("#dr" + b).attr("value") ? showDialog(i18n("payment.DeleteConfirm", l), {
            yes: i18n("common.Yes"),
            no: i18n("common.No")
        }, function(c) {
            "no" == c ? ($("#dr" + b).attr("value", n), $("#pr" + b).attr("value", k), $("#del" + b).removeClass("selected")) : submitForm(a)
        }, "dialogPaymentDelete") : submitForm(a)
    };
    window.paymentSelectType = function(a, c, b, f, d) {
        paymentReSelectType(a, c, b, f, d, 1)
    };
    window.paymentReSelectType = function(a, c, b, f, d, h) {
        1 == h && ($("input[name ='paymentType']").attr("value", a), $("input[name ='paymentUrl']").attr("value", b), b = $(".paymentTypeConditions.payment" + a).html(), "" != b ? ($(".paymentConditions").html(b), $(".paymentConditionsFor").html(c), $(".paymentConditionsBlock").css("display", "")) : $(".paymentConditionsBlock").css("display", "none"), a = $(".paymentTypeButton.payment" + a), paymentToggleButton(a, ".paymentTypeButton"), 1 == d ? ($(".payinAmount").css("display", "none"), $(".payoutAmount").css("display",
            "none")) : ($(".payinAmount").css("display", "table"), $(".payoutAmount").css("display", "table")))
    };
    window.payinSelectAmount = function(a) {
        $("input[name ='paymentAmount']").attr("value", a);
        $(".showAmountDisplay").html(formatMoney(a));
        a = $(".payinAmountButton.payin" + a);
        paymentToggleButton(a, ".payinAmountButton");
        $(".paymentTypeMin")
    };
    window.buildPaysafePin = function() {
        for (var a = "", c, b = 1; 5 > b; b++) c = $("input[name ='paysafePin" + b + "']"), a += c.attr("value");
        $("input[name ='securityCode']").attr("value", a)
    };
    window.paysafePinField = function(a) {
        var c = $("input[name ='paysafePin" + a + "']").attr("value").length;
        4 == c && 4 > a && $("input[name ='paysafePin" + (a + 1) + "']").focus();
        0 == c && 1 < a && $("input[name ='paysafePin" + (a - 1) + "']").focus()
    };
    window.payinSelectRedeemBonus = function() {
        var a = $("input[name ='redeemBonus']");
        $("input[name ='payinRedeemBonus']").attr("value", "checked" == a.attr("checked") ? k : n)
    };
    window.payinSelectSaveData = function(a) {
        var c = $("#savePaymentData");
        $("#" + a).attr("value", "checked" == c.attr("checked") ? k : n)
    };
    window.paymentToggleButton = function(a, c) {
        $(c).removeClass("selected");
        $(a).addClass("selected")
    };
    window.paymentRequest = function() {
        var a = $("input[name ='paymentUrl']").attr("value"),
            c = $("input[name ='paymentType']").attr("value"),
            b = $("input[name ='paymentAmount']").attr("value");
      //  window.amount = b;
        go({
            type: c,
            action: "selectType",
            amountDisplay: b,
            url: a
        })
    };
    window.resendEmailConfirm = function() {
        $.ajax({
            url: "ajax/email/resendConfirm",
            contentType: "application/x-www-form-urlencoded",
            type: "POST"
        })
    };
    window.payinExternalGo = function(a, c, b, f) {
        if (a) {
            c = f ? $('<form method="post" action="' + c + '" accept-charset="UTF-8"></form>') : $('<form method="post" action="' + c + '"></form>');
            for (key in b) c.append('<input type="hidden" name="' + key + '" value="' + b[key] + '"></input>');
            $("body").append(c);
            c.submit()
        } else {
            var a = -1 === c.indexOf("?") ? "?" : "&",
                f = "",
                d = k;
            for (key in b) d ? d = n : f += "&", f += key + "=" + b[key];
            b = c + ("" !== f ? a + f : "");
            isAndroidNativeApp() ? window.open(b, "_self", "location=no, toolbar=no") : window.location.href = b
        }
    };
    window.payinBicSelectBox = function(a, c) {
        var b = '<select name="bic" class="select">',
            f;
        for (f in a) b += '<option value="' + f + '"', c == f && (b += ' selected="selected"'), b += ">" + a[f] + "</option>";
        return b + "</select>"
    };
    window.toggleIbanCalculatorAction = function() {
        app.a("#ibanCalculator").hasClass("hidden") ? (app.a("#ibanCalculator").removeClass("hidden"), app.a("#ibanCalculatorTitle").removeClass("arrow").addClass("arrowdown"), document.getElementById("payoutSubmit").setAttribute("type", "button")) : (app.a("#ibanCalculator").addClass("hidden"), app.a("#ibanCalculatorTitle").removeClass("arrowdown").addClass("arrow"), document.getElementById("payoutSubmit").setAttribute("type", "submit"))
    };
    window.ibanCountryChanged = function(a, c) {
        var b = $("select[name=ibanCountries]").val();
        "undefined" != typeof a && a != b && ($("input[name='ibanCountry']").attr("value", b), c && go({
            ibanCountry: b
        }))
    };
    window.ibanCountriesSelectBox = function(a, c, b) {
        var b = '<select name="ibanCountries" class="select" onchange="ibanCountryChanged(\'' + c + "'," + b + ');" >',
            f;
        for (f in a) b += '<option value="' + f + '"', c == f && (b += ' selected="selected"'), b += ">" + a[f] + "</option>";
        return b + "</select>"
    };
    window.ibanForm = function(a) {
        $("input[name='paymentRequest']").attr("value", "false");
        $("input[name='ibanCalculatorOpen']").attr("value", "true");
        "undefined" != typeof a && submitForm(a.form)
    };
    window.bicCandidateSelectBox = function(a, c) {
        var b = '<select name="selectedBic" class="select">',
            f;
        for (f in a) b += '<option value="' + f + '"', c == f && (b += ' selected="selected"'), b += ">" + a[f] + "</option>";
        return b + "</select>"
    };
    window.paymentFooter = function(a) {
        var c = "<ul>",
            b;
        for (b in a) c += "<li>", c += '<span class="' + a[b] + '"></span>', c += "</li>";
        return c + "</ul>"
    };
    window.payinBanks = function(a, c) {
        var b = "",
            f;
        for (f in a) var d = a[f],
            b = b + (payinBanksOpen(i18n("payment.payin.bank.BankAccount")) + (c ? payinBanksMiddle(i18n("payment.payin.bank.Currency"), d.currency, 'depositBTCurrency"') : "") + payinBanksMiddle(i18n("payment.payout.bank.AccountHolder"), d.depositor, 'depositBTAccountHolder"') + payinBanksMiddle(i18n("payment.payin.bank.Bank"), d.bank, "depositBTBank") + payinBanksMiddle("BIC/SWIFT", d.bic, "depositBTBic") + payinBanksMiddle(i18n("payment.payin.bank.IBAN"), d.iban, "depositBTIban") +
                payinBanksClose(i18n("payment.Subject"), d.subject, "depositBTPaymentSubject"));
        return b
    };
    window.payinBanksOpen = function(a) {
        return '<div class="bartitle"><div class="text">' + a + "</div></div>"
    };
    window.payinBanksMiddle = function(a, c, b) {
        return '<div class="barmiddle"><div class="text">' + a + '</div><div class="value pr_7" data-qa="' + b + '">' + c + "</div></div>"
    };
    window.payinBanksClose = function(a, c, b) {
        return '<div class="barbottom"><div class="text">' + a + '</div><div class="value pr_7" data-qa="' + b + '">' + c + "</div></div>"
    };
    window.addBitcoinValidationScript = u('<script type="text/javascript" src="js/wallet-address-validator.min.js">/**/<\/script>');
    window.validateBitcoinAddress = function() {
        var a = jQuery('form[name="payoutCubits"] input[name="no"]'),
            c = WAValidator.validate(a.val(), "bitcoin");
        c ? jQuery("#errorAddress").hide() : (jQuery("#errorAddress").show(), a.focus());
        return c
    };
    window.payoutCurrencies = function(a, c) {
        return selectBox("currency", a, JSON.parse(c))
    };
    window.payoutSupportedAmounts = function(a) {
        a = JSON.parse(a);
        return selectBox("accountNo", j, a, j, j, k)
    };
    var P = "";
    window.paykasaVoucherSelected = function(a) {
        a == j || "" == a ? (jQuery("#selectedPaykasa").val(""), jQuery("#paykasaVoucher").addClass("hidden"), jQuery("#no").val("")) : (jQuery("#selectedPaykasa").val(a), jQuery("#paykasaVoucher").removeClass("hidden"));
        a != P && (P = a, submitForm(document.getElementById("paykasaForm")))
    };
    window.payinSupportedAmounts = function(a, c) {
        var b = JSON.parse(a);
        jQuery("#paymentRequest").val("false");
        var f;
        f = '<select name="selectedPaykasa" class="select" onchange="paykasaVoucherSelected(this.value);">' + ('<option value="">' + i18n("edituser.PleaseSelect") + "</option>");
        for (var d in b) f += '<option value="' + d + '"', c == d && (f += ' selected="selected"'), f += ">" + b[d] + "</option>";
        if (c == j || "" == c) P = "";
        return f + "</select>"
    };
    window.formatMoney = function(a) {
        var c = app.global,
            b = Math.floor(1 * a) + "",
            a = Math.round(100 * a) % 100,
            a = Math.abs(a);
        for (1 == (a + "").length && (a = "0" + a);;) {
            var f = b,
                b = b.replace(/(\d+)(\d\d\d)/, "$1" + c.currencyGrouping + "$2");
            if (b == f) break
        }
        return c.currencyPrefix + b + c.currencyDecimal + a + " " + c.currencyPostfix
    };
    window.generateAccountTypeForProvider = function(a, c) {
        var b = JSON.parse(c);
        return selectBox(a, j, b, j, j, n)
    };
    window.generateElectronicBankSelection = function(a) {
        a = JSON.parse(a);
        return selectBox("bankName", j, a, j, j, n)
    };
    window.generateBrazilianStatesSelection = function(a, c) {
        var b = JSON.parse(a);
        return selectBox("customerState", c, b, j, j, n)
    };
    var Q = 0;
    window.initTopEventSlider = function() {
        for (var a = 0; a <= app.a().find(".swipe-wrap .data").index(); a++) $(app.a().find(".swipe-wrap .data").get(a)).attr("data-index", a);
        a = app.a().find("#slider");
        if (0 != a.length && !a.hasClass("init")) a.addClass("init"), window.changeSlide = function() {
            var a = app.a().find(".data[style*='translate(0px, 0px)']").index();
            app.a().find(".swipeNav div").removeClass("currentView");
            $(app.a().find(".swipeNav div").get(a)).addClass("currentView")
        }, a = "-1" != app.G("selectedSliderEvent"), Swipe(app.a().find("#slider"), {
            startSlide: a ? app.G("selectedSliderEvent") : "0",
            auto: a ? 0 : "5000",
            callback: changeSlide
        }), changeSlide()
    };
    window.initEditorStake = function() {
        app.O();
        R(0);
        Q = 0
    };

    function R(a) {
        a += "";
        "" == a && (a = "0");
        $(".numpad-amount").html(formatMoney(a));
      //  window.amount = a
    }
    window.showLiveOddsChangesLayer = function() {
        showDialog(i18n("ticket.editor.acceptOddsChangesConfirmation"), {
            yes: i18n("common.Yes"),
            no: i18n("common.No")
        }, function(a) {
            "yes" == a ? acceptLiveOddsChanges(k) : jQuery("#reducedQuotesCheckBox_layer").prop("checked", n)
        }, "dialogShowLiveOddsChanges")
    };
    window.acceptLiveOddsChanges = function(a) {
        go("editor", {
            accepted: a ? "accepted" : "not",
            showErrors: "false"
        })
    };
    window.editorStakeButtonPressed = function(a) {
        Q = "" + Q;
        if (0 <= a && 9 >= a) /\.\d\d/.test(Q) || (Q += a + "");
        else switch (a) {
            case ".":
                /\./.test(Q) || (Q += ".");
                break;
            case "K":
                Q = Q.substring(0, Q.length - (/\.$/.test(Q) ? 2 : 1)), "" == Q && (Q = "0")
        }
        R(1 * Q)
    };
	window.clearEditor = function() {
        showDialog(""+kupontemizligionayekran+"", {
            yes: ""+kupontemizligionayekran1+"",
            no: ""+kupontemizligionayekran2+""
        }, function(a) {
            "yes" == a && kupontemizle()
        }, "dialogClearEditor")
    };
    window.hideDialog = function() {
        $("#dialog").addClass("hidden")
    };
    window.changeSalutation = function(a) {
        var c = document.getElementById("salutation");
        if (a != c.value) c.value = a, $(c).parent().find(".salutationBtn").toggleClass("selected")
    };
    window.showAsOverlay = function(a, c) {
        if (c) $("#overlayContent").empty(), window.overlayElements = window.overlayElements || [], window.overlayElements.push(a), document.getElementById("overlay").onclick = hideOverlay, document.getElementById("overlayContent").onclick = function(a) {
            a.stopPropagation()
        }
    };
    window.hideOverlay = function() {
        $("#overlay").addClass("hidden");
        window.overlayElements = j;
        go(j, "skip")
    };
    window.showDialog = function(a, c, b, f) {
        function d(a, b, c) {
            a.click(function() {
                app.ma = n;
                if (!h) {
                    h = k;
                    b(c);
                    var a = $("#dialog");
                    a.attr("data-qa", l);
                    a.addClass("fadeout");
                    window.setTimeout(function() {
                        a.addClass("hidden");
                        a.removeClass("fadeout")
                    }, 650)
                }
            })
        }
        "string" == typeof c && (c = {
            dialogButton: c
        });
        var h = n;
        $("#dialog .msg").html(a);
        f && $("#dialog").attr("data-qa", f);
        a = $("#dialog .options");
        a.empty();
        c == l && (c = {
            ok: "OK"
        });
        b == l && (b = t());
        for (var g in c) {
            f = $("<button/>");
            f.attr("data-qa", g);
            f.addClass("w100 simple");
            f.click(function() {
                $(this).addClass("selected")
            });
            if (c[g].I) {
                var m = $("<img/>");
                m.attr("src", c[g].I);
                m.appendTo(f)
            }
            m = $("<div/>");
            c[g].text ? m.text(c[g].text) : m.text(c[g]);
            m.appendTo(f);
            m.addClass("text");
            f.appendTo(a);
            d(f, b, g)
        }
        $("#dialog").removeClass("hidden");
        $("#dialog .window").addClass("fadein").removeClass("hidden");
        app.ma = k
    };
    window.showFancyDialog = function(a, c, b, f, d) {
        showDialog("<div class='title'>" + a + "</div><div class='sub'>" + c + "</div>" + b, f, d)
    };
    window.setFooterBalanceVisible = function(a) {
        y("hideFooterBalance", a ? 0 : 1)
    };
    window.isFooterBalanceVisible = function() {
        return 1 != w("hideFooterBalance")
    };
    window.toggleFooterBalanceVisible = function() {
        var a = isFooterBalanceVisible();
        setFooterBalanceVisible(!a);
        app.Xa()
    };
    window.playSounds = function(a, c) {
        if ("native" == app.e) {
            var b = app.Wa[a],
                f = c == l ? 0 : c.length;
            b == j ? app.Wa[a] = f : b != f && (app.Wa[a]++, b = app.gd[c.substring(c.length - 1)], b != j && isSoundEnabled() == k && nativeCall("playSound", [b]))
        }
    };
    window.setSoundEnabled = function(a) {
        y("disableSound", a ? 0 : 1)
    };
    window.isSoundEnabled = function() {
        return 1 != w("disableSound")
    };
    window.toggleSoundEnabled = function() {
        var a = isSoundEnabled();
        setSoundEnabled(!a);
        app.Xa()
    };
    var S = 0,
        T = 0;
    window.Gd = function(a) {
        if (!(a.acceleration == l || a.acceleration == j)) {
            var a = Math.abs(a.gb.x) + Math.abs(a.gb.y) + Math.abs(a.gb.Pd),
                c = (new Date).getTime(),
                b = c - S;
            S = c;
            T *= 1E3 > b ? 1 - b / 1E3 : 0;
            T += a;
            400 < T && 0 == app.h().indexOf("sport") && (T = 0, go({
                shakeAndGo: 1
            }))
        }
    };
    window.contactCategoryChanged = function(a) {
        var c = $("select[name=category]").val(),
            b = $('input[name="mail"]').val();
        c != a && go({
            category: c,
            mail: b
        })
    };
    window.deactivationReasonChanged = function(a) {
        var c = $("select[name=reason]").val();
        c != a && go({
            reason: c
        })
    };
    window.countryChanged = function(a) {
        var c = $("select[name=country]").val(),
            b = $("input[name=street]").val(),
            f = $("input[name=addressAddon]").val(),
            d = $("input[name=city]").val(),
            h = $("input[name=zipCode]").val();
        c != a && go({
            country: c,
            street: b,
            addressAddon: f,
            city: d,
            zipCode: h,
            countryChange: "true"
        })
    };
    window.newCountryChanged = function(a) {
        var c = $("select[name=country]").val();
        c != l && c != a && go({
            country: c
        })
    };
    window.phonePrefixChanged = function(a) {
        var c = $("select[name=phonePrefix]").val();
        c != l && c != a && go({
            phonePrefix: c
        })
    };
    window.zipCodeChanged = function(a) {
        var c = $("input[name=zipCode]").val(),
            b = $("input[name=salutation]").val(),
            f = $("input[name=firstName]").val(),
            d = $("input[name=lastName]").val(),
            h = $("input[name=street]").val(),
            g = $("input[name=city]").val();
        c != l && c != a && go({
            salutation: b,
            firstName: f,
            lastName: d,
            street: h,
            city: g,
            zipCode: c
        })
    };
    window.italianBirthCountryChanged = function(a) {
        var c = $("select[name=birthCountry]").val(),
            b = $("input[name=city]").val();
        c != l && c != a && ("IT" != c && ($("select[name=birthRegion]").attr("enabled", n), $("select[name=birthCity]").attr("enabled", n)), go({
            city: b,
            birthCountry: c
        }))
    };
    window.regionChanged = function(a) {
        var c = $("select[name=region]").val(),
            b = $("input[name=firstName]").val(),
            f = $("input[name=lastName]").val(),
            d = $("input[name=street]").val(),
            h = $("input[name=zipCode]").val();
        c != l && c != a && go({
            firstName: b,
            lastName: f,
            street: d,
            zipCode: h,
            region: c
        })
    };
    window.birthRegionChanged = function(a) {
        var c = $("select[name=birthRegion]").val();
        c != l && c != a && go({
            birthRegion: c
        })
    };
    window.dataProcessingChanged = function(a, c) {
        var b = "checked" == $("input[name=dataProcessing]").attr("checked");
        b != a && (c == j && (c = "login/register"), go(c, {
            dataProcessing: b
        }))
    };
    window.documentTypeChanged = function(a) {
        var c = $("select[name=referenceHeader]").val();
        c != a && go({
            documentType: c,
            file: file
        })
    };
    window.documentUploadChanged = function() {
        var a = $("#uploadForm .textfield").val();
        $("#uploadForm .selectedFile").text(a.substring(a.lastIndexOf("\\") + 1))
    };
    window.documentUploadingProcess = function(a) {
        $(".submit.fileUploadBtn").removeAttr("onclick");
        $(".submit.fileUploadBtn").addClass("selected");
        $(".submit.fileUploadBtn").text(i18n("common.processing"));
        document.getElementById(a).submit()
    };
    window.registerLeave = function(a) {
        app.info("register leave, showing dialog ...");
        showDialog(i18n("register.CancelRegistration"), {
            yes: i18n("common.Yes"),
            no: i18n("common.No")
        }, function(c) {
            app.info("dialog choice=" + c);
            "yes" == c ? (app.info("canceling register ..."), $.ajax({
                url: "ajax/login/registerStepTwo",
                success: function() {
                    app.info("canceling register ... done");
                    app.info("go--\>" + a);
                    app.La = k;
                    go(a)
                },
                data: {
                    canceled: k
                },
                context: window,
                global: n,
                async: n
            })) : app.info("stay on register, do nothing ...")
        }, "dialogRegisterLeave")
    };
    window.paymentMethodChanged = function(a) {
        var c = $("select[name=type]").val();
        c != l && c != a && go("payin/firstDeposit", {
            type: c
        })
    };
    window.updateLostForm = function() {
        var a = $("select[name='type'] option:selected").attr("value"),
            c = "sms" == a ? i18n("lost.type.sms") : i18n("lost.type.email");
        $("label[for='emailOrPhoneNumber']").text(c);
        document.getElementsByName("emailOrPhoneNumber")[0].type = "sms" == a ? "tel" : "email"
    };
    window.footer = function(a, c) {
        if (c == j) {
            if ("sports" == a || "login" == a || "ticket" == a || "bonusconditions" == a || "account" == a || "editor" == a || "payin" == a || "payout" == a) return ""
        } else if ("account" == c) {
            if ("account" != a && "payin" != a && "payout" != a) return ""
        } else if (a != c) return "";
        return " selected"
    };
    window.D = {
        Bb: 0,
        Cb: 0,
        oc: function() {
            window.D.lc();
            window.D.ic()
        },
        lc: function() {
            var a = $(".appfooter .account .count");
            if (a.length) {
                var c = parseFloat(window.D.Bb) || 0,
                    b = parseFloat(a.html().replace(",", "."));
                window.D.Bb = b;
                var f = 0 === b % 1;
                f && (c = Math.round(c), b = Math.round(b));
                b !== c && a.prop("Counter", c).animate({
                    Counter: b
                }, {
                    duration: 2E3,
                    easing: "swing",
                    step: function(a) {
                        $(this).text(a.toFixed(f ? 0 : 2))
                    }
                })
            }
        },
        ic: function() {
            var a = $(".appfooter .buyback.count");
            if (a.length) {
                var c = parseInt(window.D.Cb) || 0,
                    b = parseInt(a.html());
                window.D.Cb = b;
                b > c && a.fadeOut(500).fadeIn(500).fadeOut(500).fadeIn(500)
            }
        }
    };
    window.ensureValidInput = function(a, c, b) {
        if (window.event) a = window.event.keyCode;
        else if (a) a = a.which;
        else return k;
        if (47 < a && 58 > a || b && (65 >= a && 90 <= a || 97 >= a && 122 <= a) || a == c) return k;
        for (c = [8, 10, 13, 0]; 0 < c.length;)
            if (a == c.pop()) return k;
        return n
    };
    window.switchEditable = function(a) {
        $("#personalDetails div." + a + ">div").toggleClass("hidden");
        $("#personalDetails .submitCancelWrap").removeClass("hidden")
    };
    window.addCrazyEgg = u('<script type="text/javascript">\tsetTimeout(function(){var a=document.createElement("script"); var b=document.getElementsByTagName("script")[0]; a.src=document.location.protocol+"//dnn506yrbagrg.cloudfront.net/pages/scripts/0019/0083.js?"+Math.floor(new Date().getTime()/3600000); a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);<\/script>');
    window.vsOnLoad = function(a) {
        app.global.vsToken && a.setUserToken(app.global.vsToken)
    };
    window.vsLoginRequired = function(a) {
        console.log("VS login required");
        app.global.vsToken ? (console.log("VS login required SET USER TOKEN: " + app.global.vsToken), a.setUserToken(app.global.vsToken)) : (console.log("VS login required GO LOGIN"), go("login", {
            from: "/virtualsports"
        }, "none"), app.d && (U(), go("home", {
            from: "/virtualsports"
        }, "none")))
    };
    window.showVirtualSportsWelcomeDialog = function(a, c, b) {
        1 != app.G("vsLayer") && (showDialog("<div id='virtualSportsWelcomeDialog'><div class='title'>" + a + "</div><div class='sub'>" + c + "</div>" + b + "</div>"), app.Wb("vsLayer", 1, 1051200))
    };
    window.initVirtualSports = function(a) {
        for (console.log("initVirtualSports"); document.getElementById("virtualSportsScript");) document.body.removeChild(document.getElementById("virtualSportsScript"));
        var c = document.createElement("script");
        c.id = "virtualSportsScript";
        var b = app.global.language;
        "rs" == b ? b = "srl" : "pt" == b && (b = "br");
        c.src = "https://vsw" + (a ? "staging" : "") + ".betradar.com/ls/mobile/?/rivalo/" + b + "/page/vsmobile";
        c.onload = function() {
            var a = {
                onLoad: vsOnLoad,
                loginRequired: vsLoginRequired,
                topHeaderHeight: 43,
                bottomFooterHeight: 0,
                betSelectionMode: "all",
                useBrowserHistoryAPI: n,
                displayMode: "fixed",
                persistSelections: k,
                showUnsupportedDeviceWarning: n
            };
            app.global.vsRefId != j && (a.referrer = app.global.vsRefId);
            window.vsmobile.init("#vsm_app_container", a)
        };
        document.body.appendChild(c);
        jQuery("body").addClass("virtualSports");
        jQuery(".page").addClass("hidden")
    };

    function U() {
        console.log("removeVirtualSportsStyles");
        jQuery("body").removeClass("virtualSports");
        app.d && app.a(j, app.page.g).removeClass("hidden")
    }
    window.desktop = function(a) {
        app.a("input").is(":checked") && y("desktop", a ? 1 : 0);
        a ? redirectToDesktop() : (a = w("noDesktopPage") || "home", z("noDesktopPage"), go(a));
        return n
    };

    function V(a, c) {
        for (var b = [], f = 0; f < a.length; f++) {
            var d = a[f],
                h = [];
            h[0] = d.title;
            h[1] = d.action;
            h[2] = d.image;
            h[3] = d.value;
            b[f] = h
        }
        nativeCall("changeTabs", [b, c])
    }

    function W() {
        jQuery(".blink").toggleClass("placeholder");
        window.setTimeout(W, 1E3)
    }
    W();
    window.toggleScoreBoxEventPoints = function() {
 $('#messagevent').toggle();
$('#lastcomments').show();
$('#hideallas').show();
document.getElementById('showhidemessage').setAttribute('class','showEventPointsArrowUp');
    };
    window.hideScoreBoxEventPoints = function() {
$('#messagevent').hide();
$('#lastcomments').hide();
$('#hideallas').hide();
document.getElementById('showhidemessage').setAttribute('class','showEventPointsArrowDown');
    };

    window.selectAccount = function() {
        var a = jQuery("select[name='account']").val();
        go({
            account: a
        })
    };
    window.isAndroidNativeApp = function() {
        return "android" == w("nativeApp") || "android" == window.nativeAppOs || app.b.client && "android" == app.b.client.substr(0, 7) ? (y("nativeApp", "android"), k) : n
    };
    window.isAndroidAndNoApp = function() {
        return app.nb && !isAndroidNativeApp()
    };
    window.isIosDevice = function() {
        return -1 < app.F || "native" == app.e
    };
    window.newAndroidAppVersionReady = function() {
        var a = app.b.client,
            c;
        for (c in v)
            if (v[c] == a) return k;
        return n
    };
    window.deleteUserMessage = function(a) {
        showDialog(i18n("user.message.removeDialog"), {
            yes: i18n("common.Yes"),
            no: i18n("common.No")
        }, function(c) {
            "yes" == c && (app.t(), go({
                removeId: a
            }))
        }, "dialogDeleteUserMessage")
    };
    window.hideTitan = function(a, c) {
        app.a().removeClass("hidden");
        $(a).addClass("hidden");
        go("home");
        c && go(c)
    };
    window.backButtonEnabled = function() {
        return app.b.livescore ? "sports/livescore" != app.nextPage : "home" != app.nextPage
    };
    window.scrollActions = function(a, c) {
        var b = c ? app.page.g : app.page.f,
            f = app.page.M[b];
        if (f) {
            var d = document.getElementById("endlessScroll_backToTop");
            0 == $(window).scrollTop() ? (d.classList.remove("fadeIn"), d.classList.add("fadeOut")) : (d.classList.remove("fadeOut"), d.classList.add("fadeIn"));
            b = app.j(b);
         
        }
    };
    window.backToTop = function() {
        $("html, body").animate({
            scrollTop: 0
        }, 500);
        var a = document.getElementById("endlessScroll_backToTop");
        a.classList.remove("fadeIn");
        a.classList.add("fadeOut")
    };
    var X;
    window.changeBonusView = function() {
        selId = $("select").find(":selected").val();
        selId != X && (X = selId, go("account/bonus", {
            selection: selId
        }))
    };
    window.trackOutboundLink = function(a) {
        ga("send", "event", "outbound", "click", a, {
            hitCallback: function() {
                document.location = a
            }
        })
    };
    window.updateMetaInformation = function(a, c) {
        app.b.livescore && (c = a = "");
        var b = $("meta[name='description']");
        document.title = a;
        b.length ? b.attr("content", c) : $("head").append('<meta name="description" content="' + c + '">')
    };
    window.updateCanonical = function(a) {
        if (!app.b.livescore) {
            var c = $("link[rel='canonical']");
            a ? c.length ? c.attr("href", a) : $("head").append('<link rel="canonical" href="' + a + '">') : c.remove()
        }
    };
    window.openCasinoDialog = function(a) {
        var c = "";
        "native" == app.e ? c = "native" : 1 == app.F && (c = "webapp");
        var b = createCasinoLink(a, c);
        showDialog(i18n("home.externalLink.popupText"), {
            no: i18n("common.No"),
            yes: i18n("common.Yes")
        }, function(a) {
            "yes" == a && b()
        }, "dialogOpenCasino")
    };
    window.createCasinoLink = function(a) {
        return function() {
            window.open("https://" + a, "_blank")
        }
    };
    window.deactivate2Fa = function() {
        showDialog(i18n("login.2fa.confirmDialog"), {
            deactivate: i18n("login.2fa.btnDeactive"),
            cancel: i18n("login.2fa.btnCancel")
        }, function(a) {
            "deactivate" == a && go("/account/loginApproval", {
                toggleActivationOf2FA: "true"
            })
        }, "dialogDeactivate2Fa")
    };
    window.dataURItoBlob = function(a) {
        for (var a = atob(a.split(",")[1]), c = [], b = 0; b < a.length; b++) c.push(a.charCodeAt(b));
        return new Blob([new Uint8Array(c)], {
            type: "image/png"
        })
    };
    window.showSharebetslipDialog = function(a, c, b, f, d) {
        $.ajax({
            type: "POST",
            url: "https://graph.facebook.com?id=" + c + "&scrape=true",
            Jd: function(a) {
                console.log("Force Facebook Rescrape success", a)
            },
            error: function(a) {
                console.log("Force Facebook Rescrape error", a)
            }
        });
        a = {
            twitter: {
                text: "Twitter",
                I: "../img/share/twitter.png"
            },
            facebook: {
                text: "Facebook",
                I: "../img/share/facebook.png"
            },
            pinterest: {
                text: "Pinterest",
                I: "../img/share/pinterest.png"
            },
            googleplus: {
                text: "Google+",
                I: "../img/share/google.png"
            }
        };
        (isAndroidNativeApp() ||
            isAndroidAndNoApp() || isIosDevice()) && (a.whatsapp = {
            text: "WhatsApp",
            I: "../img/share/whatsapp.png"
        });
        a.cancel = i18n("common.cancel");
        showDialog(i18n("shareBetslip.shareViaDialogMessage") + "...", a, function(a) {
            if ("cancel" != a) {
                var g = c,
                    m = "",
                    r = "",
                    q = "";
                eBetFeatures && "1" == eBetFeatures.sharedLinksWithAffiliateID && (q = "", "twitter" == a ? q = "287452" : "facebook" == a ? q = "287352" : "pinterest" == a ? q = "287552" : "googleplus" == a ? q = "287652" : "whatsapp" == a && (q = "239752"), q = "&utm_affiliateid=" + q + "&affiliateId=" + q);
                g += "?utm_medium=mobile&utm_campaign=betsharing_single" +
                    q;
                "twitter" == a ? (r = "Twitter Betshare", g += "&utm_source=twitter_" + app.global.language, q = b + f, m = "...", a = 112, q = q.length > a ? b.substring(0, a - m.length - f.length) + m + " " + g + " - " + f : b + " " + g + " - " + f, m = "https://twitter.com/intent/tweet?text=" + encodeURIComponent(q)) : "facebook" == a ? (r = "Facebook Betshare", g += "&utm_source=facebook_" + app.global.language, m = "https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(g)) : "pinterest" == a ? (r = "Pinterest Betshare", m = "...", a = 499, q = b + " " + f, q.length > a && (q = b.substring(0, a - m.length -
                    f.length) + m + " " + f), g += "&utm_source=pinterest_" + app.global.language, m = "https://www.pinterest.com/pin/create/button/?url=" + encodeURIComponent(g) + "&media=" + encodeURIComponent(d) + "&description=" + encodeURIComponent(q)) : "google+" == a ? (r = "Google+ Betshare", g += "&utm_source=googleplus_" + app.global.language, m = "https://plus.google.com/share?url=" + encodeURIComponent(g)) : "whatsapp" == a && (r = "WhatsApp Betshare", g += "&utm_source=whatsapp_" + app.global.language, m = "WhatsApp://send?text=" + encodeURIComponent(b + " " + g));
                g =
                    document.createElement("a");
                g.href = m;
                g.target = "_blank";
                g.click();
                H("Social Betsharing Button", "Share", r)
            }
        }, "dialogShareBetslip")
    };
    window.uploadBase64Image = function(a) {
        if (eBetFeatures && "1" != eBetFeatures.shareBetslipImage) go(app.d ? app.page.g : app.page.f, {
            shareBetslipDialog: k
        });
        else {
            app.t();
            for (var c = document.querySelectorAll(".header.betslipImage," + app.j("editor") + " .betslipImage, .footer.betslipImage"), b = "", f = 0; f < c.length; f++) b += c[f].outerHTML;
            var d = document.createElement("div");
            d.id = "betslipImageWrapper";
            c = document.createElement("div");
            c.innerHTML = b;
            b = c.getElementsByClassName("private");
            for (f = 0; f < b.length; f++) b[f].innerHTML =
                b[f].innerHTML.replace(/[0-9]/g, "X");
            d.appendChild(c);
            document.body.appendChild(d);
            f = c.offsetHeight;
            c.style.width = Math.min(f, 500) + "px";
            d.style.width = 1.91 * f + "px";
            window.html2canvas(d, {
                onrendered: function(b) {
                    document.body.removeChild(d);
                    b = b.toDataURL("image/png");
                    jQuery.ajax({
                        url: "ajax/uploadSharedBetslip",
                        dataType: "json",
                        contentType: "application/x-www-form-urlencoded",
                        data: {
                            ticketId: a,
                            sharedBetslipBase64: b
                        },
                        type: "POST",
                        success: function(a) {
                            a.success && (console.log("successfully uploaded betslip image"),
                                go(app.d ? app.page.g : app.page.f, {
                                    shareBetslipDialog: k
                                }))
                        },
                        error: function() {
                            console.log("error while uploading betslip image", e)
                        }
                    })
                }
            })
        }
    };
    window.printBetslip = function(a) {
        $.ajax({
            url: "ajax/native/print/" + a,
            dataType: "text",
            success: function(a) {
                a.startsWith("ERROR") ? console.log("Couldn't print") : (console.log("Got print betslip data:", a), window.cordova && window.cordova.exec(l, l, "PrintPlugin", "printString", [a]))
            }
        })
    };
    window.initServiceWorker = function() {
        app.supportsWebWorkerAndIsAndroidChrome && (window.addEventListener("beforeinstallprompt", function(a) {
            if ("0" == eBetFeatures.nativeAddToHomescreen || 0 == w("showHomescreenInstallBanner")) a.preventDefault();
            else {
                var c = (new Date).getTime();
                c < w("showHomescreenInstallBanner") ? a.preventDefault() : a.userChoice.then(function(a) {
                    "dismissed" == a.outcome ? (a = w("showHomescreenInstallBannerCount") || 0, y("showHomescreenInstallBannerCount", 1 * a + 1), y("showHomescreenInstallBanner", c + 6048E5 *
                        Math.pow(2, a))) : y("showHomescreenInstallBanner", 0)
                })
            }
        }), navigator.serviceWorker.register("/serviceWorkerV02.js").then(function() {
            console.log("successfully registered service worker");
            navigator.serviceWorker.addEventListener("message", function(a) {
                H("MOBILE_NOTIFICATION", a.data.action)
            })
        }))
    };
    window.notification = {};
    window.notification.Hb = n;
    window.notification.mb = n;
    window.notification.na = k;
    window.notification.showRegisterDialog = function() {
        app.supportsWebWorkerAndIsAndroidChrome && !window.notification.Hb && !window.notification.mb && !(1 == app.G("noNotifications") || "denied" == window.Notification.Nc) && navigator.serviceWorker.ready.then(function(a) {
            a.pushManager.getSubscription().then(function(a) {
                a || setTimeout(function() {
                    window.notification.mb = k;
                    showDialog(i18n("notifications.registerDevice"), {
                        yes: i18n("common.Yes"),
                        later: i18n("common.NotNow"),
                        no: i18n("common.No")
                    }, function(a) {
                        "yes" == a ? window.notification.xa() :
                            "no" == a && app.Wb("noNotifications", 1)
                    }, "dialogRegisterDevice")
                }, 1E3)
            })
        })
    };
    window.notification.register = function(a) {
        app.supportsWebWorkerAndIsAndroidChrome && "0" != eBetFeatures.mobileNotifications && ("showRegisterDialog" === a ? window.notification.showRegisterDialog() : "unsubscribe" === a ? window.notification.$b() : "subscribe" === a && window.notification.xa())
    };
    window.notification.xa = function() {
        app.supportsWebWorkerAndIsAndroidChrome && navigator.serviceWorker.ready.then(function(a) {
            console.log("serviceworker ready for subscription", a);
            (navigator.serviceWorker.controller || a.active).postMessage({
                login: app.global.login
            });
            a.pushManager.subscribe({
                userVisibleOnly: k
            }).then(function(a) {
                console.log("subscription was successful", a);
                window.notification.Hb = k;
                return window.notification.$c(a)
            })["catch"](function(a) {
                "denied" === Notification.Nc ? console.log("Permission for Notifications was denied") :
                    console.log("Unable to subscribe to push", a)
            })
        })
    };
    window.notification.$c = function(a) {
        a = window.notification.Rb(a);
        window.notification.S(a.substr(40), "ANDROID_CHROME")
    };
    window.notification.Rb = function(a) {
        if (0 !== a.endpoint.indexOf("https://android.googleapis.com/gcm/send")) return a.endpoint;
        var c = a.endpoint;
        a.subscriptionId && -1 === a.endpoint.indexOf(a.subscriptionId) && (c = a.endpoint + "/" + a.subscriptionId);
        return c
    };
    window.notification.$b = function() {
        app.supportsWebWorkerAndIsAndroidChrome && navigator.serviceWorker.ready.then(function(a) {
            console.log("serviceworker ready for unsubscription", a);
            a.pushManager.getSubscription().then(function(a) {
                $.ajax({
                    data: {
                        deviceToken: a ? window.notification.Rb(a).substr(40) : "",
                        pushNotificationChannel: "ANDROID_CHROME"
                    },
                    url: "ajax/native/unregisterDevice",
                    context: window,
                    global: n,
                    async: n,
                    success: function() {
                        jQuery("input[name=MOBILE_NOTIFICATIONS]").prop("checked", n);
                        console.log("successfully unsubscribed from chrome push notifications")
                    }
                });
                if (a) a.unsubscribe().then(function() {
                    console.log("successfully unsubscribed from chrome push notifications")
                })["catch"](function(a) {
                    console.log("Unsubscription error: ", a)
                })
            })["catch"](function(a) {
                console.error("Error thrown while unsubscribing from push messaging.", a)
            })
        })
    };
    window.notification.sb = function() {
        if ("true" == window.nativeApp) {
            if (window.sd && "1" == eBetFeatures.livescoreNotifications && window.Oc) "android" == window.nativeAppOs ? pushNotification.Qc(window.notification.Bc, window.notification.Mb, {
                    senderID: "59128740929",
                    ecb: "window['notification'].livescoreNotificationReceivedAndroid"
                }) : pushNotification.Qc(window.notification.Cc, window.notification.Mb, {
                    badge: "true",
                    sound: "true",
                    alert: "true",
                    ecb: "window['notification'].livescoreNotificationReceivedIOS"
                }), window.notification.na =
                n
        } else window.Notification && app.supportsWebWorkerAndIsAndroidChrome && ("granted" == window.Notification.permission ? window.notification.xa() : "denied" == window.Notification.permission && window.notification.$b()), window.notification.na = n
    };
    window.notification.S = function(a, c) {
        $.ajax({
            data: {
                deviceToken: a,
                pushNotificationChannel: c
            },
            url: "ajax/native/registerDevice",
            context: window,
            global: n,
            async: n,
            success: function(a) {
                a.success ? (jQuery("input[name=MOBILE_NOTIFICATIONS]").prop("checked", k), console.log("successfully subscribed to push notifications (" + c + ")")) : console.log("error while subscribing to push notifications (" + c + "): " + a.message)
            }
        })
    };
    window.notification.Cc = function(a) {
        window.notification.S(a, "IOS_LIVESCORE")
    };
    window.notification.Bc = function(a) {
        "OK" != a && console.log("Push Notification Registration Result: " + a)
    };
    window.notification.Mb = function(a) {
        console.log("Failed to register for Push Notifications: ", a)
    };
    window.notification.Ed = function(a) {
        console.log("PN event received", a);
        if (a.alert && "1" == a.pc) window.notification.Lb(a.alert, a.action);
        else if (a.action) window.location.hash = a.action
    };
    window.notification.Dd = function(a) {
        console.log("PN event received", a);
        switch (a.event) {
            case "registered":
                0 < a.Pc.length ? window.notification.S(a.Pc, "ANDROID_LIVESCORE") : console.log("Empty Push Notification RegId", a);
                break;
            case "message":
                if (a.pc) window.notification.Lb(a.Va.message, a.Va.action);
                else if (a.Va.action) window.location.hash = a.Va.action;
                break;
            case "error":
                console.log("PN Error: " + a.Fd);
                break;
            default:
                console.log("PN Unknown, an event was received and we do not know what it is")
        }
    };
    window.notification.Lb = function(a, c) {
        showDialog(a, {
            "0": i18n("common.View"),
            1: i18n("common.Cancel")
        }, function(a) {
            0 == a && go(c)
        })
    };
    window.requestVerificationCode = function() {
        go("/account/requestVerificationCode", {
            sendCode: "true",
            verificationCode: app.a(".jq-enterCode").val(),
            trustDevice: app.a(".trustDevice").is(":checked")
        })
    };
    window.ra = {};
    window.minimizeRsGroup = function(a, c) {
        jQuery(a).toggleClass("closed");
        window.ra[c] = !jQuery(a).hasClass("closed");
        jQuery(app.j() + " #" + c).slideToggle()
    };
    window.getTitle = function(a, c) {
        if (!app.d) return a;
        if (app.Vc == c) c ? app.ib = a : app.hb = a;
        return c ? app.ib : app.hb
    };
    window.deleteZopimUserData = function() {
        window.$zopim && window.$zopim.livechat && ($zopim.livechat.setName("Unknown User"), $zopim.livechat.setEmail(""))
    };
    window.showDepositAfterLoginDialog = function(a, c, b) {
        a = "<div id='depositAfterLoginDialog'><div class='title'>" + a + "</div><div class='sub'>" + c + "</div>" + b + "</div>";
        c = {
            deposit: i18n("depositAfterLogin.depositNow"),
            nothanks: i18n("depositAfterLogin.no")
        };
        showDialog(a, c, depositAfterLoginBtnClicked)
    };
    window.depositAfterLoginBtnClicked = function(a) {
        "deposit" == a ? go("/payin") : go("/home")
    };

    function Y() {
        var a = new Uint8Array(1);
        if (window.crypto && window.crypto.Oa) return window.crypto.Oa(a), a[0];
        return window.Ob && window.Ob.Oa ? (window.Ob.Oa(a), a[0]) : Math.floor(255 * Math.random())
    }

    function Z(a) {
        var c = Y() % a.length;
        return a[c]
    }
    window.generatePasswordAndFillFields = function() {
        var a, c, b = n;
        var pwdChars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
var pwdLen = 10;
a = Array(pwdLen).fill(pwdChars).map(function(x) { return x[Math.floor(Math.random() * x.length)] }).join('');

        c = app.j("login/register");
        b = "password";
        h = "passwordConfirm";
        0 == jQuery(c + " [name=" + b + "]").length && (b = "NewPassword", h = "PasswordRepetition");
        jQuery(c + " [name=" + b + "]")[0].type = "text";
        jQuery(c + " [name=" + b + "]").val(a);
        jQuery(c + " [name=" + h + "]").val(a);
        document.queryCommandSupported("copy") && (jQuery(c + " [name=" + b + "]").select(), document.execCommand("copy"))
    };
    window.hidePassword = function(a) {
        if ("text" == a[0].type && "" == a.val()) a[0].type = "password"
    };
    window.deleteOldTickets = function() {
        showDialog(i18n("ticketlist.deleteOnlyTickets", "30"), {
            yes: i18n("common.Yes"),
            no: i18n("common.No")
        }, function(a) {
            "yes" == a && go("ticket/list", {
                MODE: "deleteOldTickets"
            }, n)
        }, "dialogDeleteOldTickets")
    };
    touchstart = function(a) {
        window.bb = {
            time: a.timeStamp,
            x: a.changedTouches[0].screenX,
            y: a.changedTouches[0].screenY
        };
        window.Kd = a.changedTouches[0]
    };
    touchend = function(a) {
        if (!app.d) {
            var a = {
                    time: a.timeStamp,
                    x: a.changedTouches[0].screenX,
                    y: a.changedTouches[0].screenY
                },
                c = a.time - window.bb.time,
                b = a.x - window.bb.x;
            100 < Math.abs(b) && 500 > c && Math.abs(b) > 3 * Math.abs(a.y - window.bb.y) && app.ld(0 > b)
        }
    };
    window.addEventListener("touchstart", touchstart, n);
    window.addEventListener("touchend", touchend, n);
    window.setAppLoadedStatus("mobile_js_end");
    window.setAppLoadedStatus("nav_js_start");
    window.$ = window.jQuery;
    $(function() {
        var a = {};
        window.setAppLoadedStatus("nav_js_jQueryInit");
        var c = window.jQuery;
        jQuery.extend(a, {
            b: {},
            mode: "",
            Sa: "",
            Ua: n,
            qd: n,
            ia: 0,
            q: n,
            Ja: n,
            nextPage: "",
            Q: j,
            H: k,
            V: 0,
            U: n,
            wa: n,
            Zb: n,
            Fc: l,
            da: k,
            Ab: k,
            hasFocus: n,
            F: -1,
            bc: n,
            ka: n,
            ub: k,
            nb: n,
            vb: n,
            webkit: n,
            e: "fixed",
            K: n,
            va: n,
            Ma: n,
            La: n,
            s: l,
            Kb: l,
            yb: l,
            Ad: l,
            zd: k,
            Ca: {},
            hc: n,
            xd: 0,
            R: [],
            Hd: ["home/desktop"],
            yc: "de,en,it,fr,tr,rs,ru,pl,pt,es".split(","),
            d: n,
            pa: [],
            ma: n,
            Qa: j,
            Jb: 0,
            Fa: n,
            Da: k,
            Y: j,
            Ea: [],
            lb: n,
            X: 0,
            z: 0,
            jb: 0,
            kb: 0,
            fb: "start",
            Wa: {},
            gd: {
                p: "applause.mp3",
                r: "buh.mp3"
            },
            Gc: {
                MODE: 0,
                password: 0,
                submitted: 0,
                storeOnly: 0
            },
            page: {
                ba: ["#page1", "#page2"],
                jc: ["#page1a", "#page2a"],
                bjk: ["#page1a", "#page3a"],
                w: 0,
                W: 0,
                f: "home",
                g: "login",
                hb: "",
                ib: "",
                rc: l,
                M: {},
                scroll: {},
                data: {},
                update: {},
                version: {}
            },
            m: {
                Ka: n,
                ea: l,
                Ba: l
            },
            ya: {},
            ca: "none hidden in out top reverse slide fade dissolve flip slideup slidedown scroll swap cube pop slow",
            J: {
                pb: [/^ticket\/\d+$/, /^account\/lasttransactions$/, /^account\/markapproved$/],
                qb: /@{((?:[^{}]+|{[^{}]+})+)}/,
                zc: /[\r\n]+/g,
                hd: /\s{2,}/g
            },
            global: {},
            cb: {
                endlessScroll: function() {
                    document.getElementById("endlessScroll_backToTop").classList.remove("deactivated");
                    return ""
                },
                global: u(""),
                forcelogout: u(""),
                redirect: u(""),
                tableStart: function(a) {
                    return htmlTagOpen("table", {
                        "class": a
                    })
                },
                tableEnd: function() {
                    return htmlTagClose("table")
                },
                tableRowStart: function(a) {
                    return htmlTagOpen("tr", {
                        "class": a
                    })
                },
                tableRowEnd: function() {
                    return htmlTagClose("tr")
                },
                tableCell: function(a, c, d) {
                    c = {
                        "class": c
                    };
                    1 != d && (c.colspan = d);
                    return htmlTagOpen("td", c) + a + "</td>"
                },
                formOpen: function(a) {
                    return htmlTagOpen("form", {
                        onsubmit: "submitForm(this); return false;",
                        action: "#",
                        name: "form",
                        "class": "form",
                        id: a,
                        novalidate: "novalidate"
                    })
                },
                formOpenFileUpload: function(a, c) {
                    return htmlTagOpen("form", {
                        onsubmit: "submitForm(this); return false;",
                        action: c,
                        name: "uploadform",
                        "class": "form",
                        id: a,
                        enctype: "multipart/form-data",
                        method: "post"
                    })
                },
                formClose: function() {
                    return htmlTagClose("form")
                },
                divOpen: function(a, c, d) {
                    return htmlTagOpen("div", {
                        "class": c,
                        id: a,
                        onclick: d
                    })
                },
                divClose: function() {
                    return htmlTagClose("div")
                },
		
                rsGroupOpen: function(a, c, d) {
                    window.ra != j && window.ra[a] != j && (d = !window.ra[a]);
                    a = '"' + a + '"';
                    return "<div class='rsGroupHeader mdetails" +
                        (d ? " closed" : "") + "' onclick='minimizeRsGroup(this, " + a + ")'>" + c + "</div>" + ("<div id=" + a + " class='rsGroup'" + (d ? " style='display:none;'>" : ">"))
                },
                rsGroupClose: u("</div>")
            },
            pd: {
                fixed: "iPhone OS 5,iPhone OS 6,iPhone OS 7,iPhone OS 8,iPhone OS 9,Desire HD,HTC_DesireHD".split(",")
            },

            Nd: function() {
                c("#reload").html("<span style='border:2px solid " + (a.H ? "green" : "red") + "'>reload</span>")
            },
            Nb: function(b) {
                "native" == a.b.scroll && nativeCall("setLoaded");
                a.H = n;
                c("#loading").html('<table width="100%" height="100%"><tr><td style="text-align:center;padding-top:140px;color:#ffffff">' +
                    b + "</td></tr></table>");
                return n
            },
            wc: function() {
                window.setAppLoadedStatus("nav_js_app.init");
                c.each(location.search.substring(1).split(/&/g), function(b, c) {
                    var h = c.split(/=/);
                    a.b[decodeURIComponent(h[0])] = decodeURIComponent(h[1])
                });
                var b = a.Na();
                b && b.addEventListener("updateready", function() {
                    a.bc = k
                }, n);
                if (window.getTemplateMapping) a.ya = getTemplateMapping();
                else return a.Nb("");
                if ("https:" == location.href.substring(0, 5)) return location.href = "https:" + location.href.substring(5), n;
                b = a.b.nativever;
                if (b != j &&
                    1 > b) return a.Nb(i18n("mobile.native.toold"));
                a.webkit = a.k("WebKit");
                a.ub = a.k("Chrome");
                a.nb = a.k("Android");
                a.supportsWebWorkerAndIsAndroidChrome = "serviceWorker" in navigator && a.ub && isAndroidAndNoApp();
                a.e = -1 != window.location.href.indexOf("native") ? "native" : a.k(a.pd.fixed) ? "fixed" : 800 <= a.tc() ? "fixed" : "fixed";
                if (a.b.scroll) a.e = a.b.scroll;
                if ("true" == a.b.notimer) a.H = n;
                if ("native" == a.e) c(".appheader,.appfooter").hide(), c.ajax({
                    url: "ajax/native",
                    success: function(b) {
                        "register" == b ? y("deviceToken", a.b.deviceToken) :
                            z("deviceToken")
                    },
                    context: window,
                    global: n,
                    async: n
                });
                else if (a.k("iPhone") || a.k("iPod"))
                    if (window.navigator.standalone === k) {
                        y("installed", "true");
                        a.F = 1;
                        if (b = w("currentPage")) window.location.hash = b;
                        if ("entered" != window.name) a.hc = k, window.name = "entered";
                        b = document.createElement("style");
                        b.type = "text/css";
                        b.innerHTML = ".page { padding-top:14px; } .header { max-height:58px; padding-top:16px; }";
                        document.head.appendChild(b);
                        if (a.xc()) a.ka = k, a.N(), c(window).resize(a.N).focusin(a.focusin).focusout(a.focusout)
                    } else a.e =
                        "fixed", a.F = 0;
                else a.F = -1;
                c.ajaxSetup({
                    cache: n,
                    global: n,
                    context: a,
                    dataType: "json",
                    contentType: "application/json",
                    beforeSend: a.ec,
                    complete: a.fc,
                    error: a.gc
                });
                c("#page1")[0].addEventListener != j && (c("#page1")[0].addEventListener("webkitAnimationEnd", a.u, k), c("#page1")[0].addEventListener("webkitTransitionEnd", a.u, k), c("#page2")[0].addEventListener("webkitAnimationEnd", a.u, k), c("#page2")[0].addEventListener("webkitTransitionEnd", a.u, k), c("#page1a")[0].addEventListener("webkitAnimationEnd", a.u, k), c("#page1a")[0].addEventListener("webkitTransitionEnd",
                    a.u, k), c("#page2a")[0].addEventListener("webkitAnimationEnd", a.u, k), c("#page2a")[0].addEventListener("webkitTransitionEnd", a.u, k));
                a.b.iframe && c("body").addClass("iframe");
                "fixed" == a.e ? (b = c(".appheader,.appfooter"), b.css("left", "0px"), b.css("right", "0px"), b.css("z-index", "100"), b.css("position", "fixed"), c(".appheader").css("top", "0px"), c(".appfooter").css("bottom", "0px"), a.b.iframe || c(".scroll_wrapper").css("padding-top", "44px").css("padding-bottom", "44px"), c(".block, #ajax table, #dialog table").css("position",
                    "fixed")) : "native" == a.e ? (c(".block, #ajax table, #dialog table").css("position", "fixed"), c(".page").css("top", "0px"), c(".page").css("min-height", "100%")) : (c(".appheader").css("position", "static"), c(".appfooter").remove(), c(".page").css("top", "44px"));
                document.addEventListener("resume", function() {
                    location.reload()
                }, n);
                window.go = a.go;
                window.onhashchange = a.Ta;
                window.showAjax = a.t;
                window.hideAjax = a.ja;
                window.fadeoutAjax = a.zb;
                window.historyback = function() {
                    if (!a.ma && !a.K) a.mode = "", "login/registerStepTwo" ==
                        a.h() ? registerLeave("/home") : "payin/firstDeposit" == a.h() ? go("home") : "home" == a.nextPage ? go({}, "slide reverse") : (a.ab = k, history.go(-1))
                };
                window.addEventListener("orientationchange", a.Ia, n);
                window.addEventListener("resize", a.Ia, n);
                a.Ia();
                a.Lc();
                a.compile();
                return k
            },
            N: function() {
                a.ka && (a.hasFocus ? body.classList.add("iosAppModeInputFocused") : body.classList.remove("iosAppModeInputFocused"))
            },
            focusin: function() {
                a.hasFocus = k;
                a.N()
            },
            focusout: function() {
                a.hasFocus = n;
                setTimeout(function() {
                    a.N()
                }, 0)
            },
            Yc: function() {
                a.Yc =
                    t();
                a.N();
                c(".page").each(function(a, c) {
                    c.addEventListener("touchstart", function() {
                        if (0 >= c.scrollTop) c.scrollTop = 1;
                        if (c.scrollTop + c.offsetHeight >= c.scrollHeight) c.scrollTop = c.scrollHeight - c.offsetHeight - 1
                    }, n)
                });
                setInterval(function() {
                    window.scrollActions()
                }, 200)
            },
            k: function(a) {
                if ("string" == typeof a) return -1 != window.navigator.userAgent.search(a);
                for (var c = 0; c < a.length; c++)
                    if (-1 != window.navigator.userAgent.search(a[c])) return k;
                return n
            },
            ed: function() {
                if (!("t/" == a.h().substr(0, 2) || "android" == a.h().substr(0,
                        7)) && !a.b.livescore && "false" !== a.G("install"))
                    if (newAndroidAppVersionReady()) {
                        var b = i18n("mobile.install.android.update");
                        "-" != b && (b = b + "<br/><br/>" + img("android/download.png", 43, 46), showDialog(b, {
                            update: i18n("mobile.install.android.update.button")
                        }, function(a) {
                            "update" == a && go("android-update")
                        }, "dialogUpdate"))
                    } else if (isAndroidAndNoApp()) {
                    if (showAndroidMessage() && !(50 > screen.height - document.documentElement.clientHeight) && (b = i18n("mobile.install.android.popup"), "-" != b)) {
                        var b = b + "<br/><br/>" + img("android/download.png",
                                43, 46),
                            c = i18n("mobile.install.android.homescreen.popup");
                        "-" != c && navigator.userAgent.match("Chrome") ? showDialog(b, {
                            android: i18n("mobile.install.button"),
                            homescreen: i18n("mobile.install.android.addToHomescreen"),
                            hide: i18n("mobile.install.android.hide"),
                            cancel: i18n("common.Cancel")
                        }, function(b) {
                            "android" == b && go("android");
                            "homescreen" == b && a.Yb(c, "android");
                            "hide" == b && go("android?install=false")
                        }, "dialogAndroidApp") : showDialog(b, {
                            android: i18n("mobile.install.button"),
                            hide: i18n("mobile.install.android.hide"),
                            cancel: i18n("common.Cancel")
                        }, function(a) {
                            "android" == a && go("android");
                            "hide" == a && go("android?install=false")
                        }, "dialogAndroidApp")
                    }
                } else 0 == a.F && "native" != a.e && "false" != a.b.install && -1 != Object.prototype.toString.call(window.HTMLElement).indexOf("Constructor") && !navigator.userAgent.match("CriOS") && "ios" != window.nativAppOs && (b = i18n("mobile.install.popup"), a.Yb(b, "ios"))
            },
            Yb: function(a, f) {
                var d = "android" == f ? "#installAndroid" : "#install";
                "-" != a && (c(d + " .msg2").html(a), c(d).click(function() {
                        c(d).addClass("hidden")
                    }),
                    c(d).removeClass("hidden"))
            },
            fd: function() {
                showFancyDialog(i18n("livescore.register.message.title"), i18n("livescore.register.message.sub"), "", {
                    "0": i18n("livescore.register.join"),
                    1: i18n("livescore.register.dontShowAgain"),
                    2: i18n("common.Cancel")
                }, function(a) {
                    0 == a && go("login");
                    1 == a && y("lsRegDialog", "0")
                })
            },
            S: function() {
                if (!("native" != a.e || 1 == a.global.registeredDevice)) {
                    var b = w("deviceToken");
                    b != l && c.ajax({
                        data: {
                            deviceToken: b
                        },
                        url: "ajax/native/showDeviceRegisterDialog",
                        success: function(f) {
                            if ("1" == f &&
                                !a.Ja) a.Ja = k, showDialog(i18n("native.registerDevice"), {
                                yes: i18n("common.Yes"),
                                later: i18n("common.NotNow"),
                                no: i18n("common.No")
                            }, function(a) {
                                "yes" == a ? c.ajax({
                                    data: {
                                        deviceToken: b
                                    },
                                    url: "ajax/native/registerDevice",
                                    context: window,
                                    global: n,
                                    async: n
                                }) : "no" == a && c.ajax({
                                    url: "ajax/native/blockDialogForDevice",
                                    context: window,
                                    global: n,
                                    async: n
                                })
                            }, "dialogRegisterDevice")
                        },
                        context: window,
                        global: n,
                        async: n
                    })
                }
            },
            Xa: function() {
                a.Z(a.a(), a.page.f + a.o(), n, "none");
                a.T()
            },
            rb: function(b) {
                function c(a, f) {
                    b != a && window.setTimeout(function() {
                        go(a,
                            f)
                    }, 0)
                }
                var d = a.global.layerUrl;
                d && "/" == d.substring(0, 1) && (d = d.substring(1));
                if ("true" != a.b.demo && !a.vb && 1 == 1 * a.global.desktop && 0 == 1 * a.global.newDesktopDetection && (a.vb = k, 0 != w("desktop"))) {
                    b = app.page.f;
                    "home/desktop" != b && y("noDesktopPage", b);
                    c("home/desktop");
                    return
                }
                if (0 == a.global.approved && 0 != a.global.active || a.global.showLastTransactions != j && 1 == a.global.showLastTransactions)
                    if (1 == a.global.swiss) c("account/swiss");
                    else {
                        var d = n,
                            h;
                        for (h in a.J.pb)
                            if (a.J.pb[h].test(b)) {
                                d = k;
                                break
                            }
                        d || go("account/lasttransactions")
                    }
                else d &&
                    b != d ? c(a.global.layerUrl) : 1 == a.global.shExistingCustomer ? c("login/shExistingCustomer") : 1 == 1 * a.global.deliverTicketAfterLogin && a.global.loggedIn ? (a.global.deliverTicketAfterLogin = 0, c("editor", {
                        reaction: "DELIVER"
                    })) : 1 == 1 * a.global.deliverTicketAfterLogin && window.setTimeout(function() {
                        go("editor", {
                            reaction: "DELIVER"
                        })
                    }, 0)
            },
            uc: function() {
                return "number" == typeof window.innerWidth ? [window.innerWidth, window.innerHeight] : document.documentElement && (document.documentElement.clientWidth || document.documentElement.clientHeight) ? [document.documentElement.clientWidth, document.documentElement.clientHeight] : document.body && (document.body.clientWidth || document.body.clientHeight) ? [document.body.clientWidth, document.body.clientHeight] : [0, 0]
            },
            tc: function() {
                var b = a.uc();
                return b[0] < b[1] ? b[1] : b[0]
            },
            Bd: function() {
                return "native" == a.e || a.k("iPhone|iPod")
            },
            xc: function() {
                return a.k("iPhone OS") && !a.k("Safari")
            },
            Eb: function() {
                var a = location.hash.substr(1);
                "!" == a.substr(0, 1) && (a = a.substr(1));
                return a
            },
            h: function(b) {
                if (b) return a.page.g;
                b =
                    a.Eb();
                return a.ha() ? b.substr(3) : b
            },
            ha: function() {
                var b = a.Eb();
                if ("/" == b.substr(2, 1)) return b.substr(0, 2)
            },
            sc: function() {
                var b = a.global.language || a.ha() || app.G("language") || navigator.language || navigator.Od,
                    b = b.substr(0, 2);
                return -1 == a.yc.indexOf(b) ? "en" : b
            },
            ta: function(b) {
                if (!a.i(b) && !a.q) location.hash = "#!" + a.sc() + "/" + b
            },
            P: function(b) {
                return a.i(b) ? a.page.g : a.page.f
            },
            Za: function(b) {
                a.i(b) ? a.page.g = b : a.page.f = b
            },
            md: function(b, c) {
                var d = 0,
                    h = b[c.current],
                    g = [{}, {}, {}, {}, {}];
                g[0].title = i18n("footer.home");
                g[0].action = "home";
                g[0].image = "home";
                g[0].value = -1;
                "sports" == h && (d = 1);
                g[1].title = i18n("site.bets");
                g[1].action = "sports/all";
                g[1].image = "sports";
                g[1].value = -1;
                if (a.global.loggedIn) {
                    "ticket" == h && (d = 2);
                    g[2].title = i18n("site.myBets");
                    g[2].action = "ticket/list";
                    g[2].image = "ticket";
                    g[2].value = 0 < a.global.ticketCount ? a.global.ticketCount : -1;
                    if ("account" == h || "payin" == h || "payout" == h) d = 3;
                    g[3].title = i18n("site.account");
                    g[3].action = "account";
                    g[3].image = "EUR" == a.global.currency ? "euro" : "account";
                    g[3].value = isFooterBalanceVisible() ?
                        a.global.accountBalance : -1
                } else "login" == h && (d = 2), g[2].title = i18n("site.login"), g[2].action = "login", g[2].image = "login", g[2].value = -1, "information" == h && (d = 3), g[3].title = i18n("footer.info"), g[3].action = "information", g[3].image = "information", g[3].value = -1;
                "editor" == h && (d = 4);
                g[4].title = i18n("footer.betSlip");
                g[4].action = "editor";
                g[4].image = "editor";
                g[4].value = 0 < a.global.editorCount ? a.global.editorCount : -1;
                if ("native" == a.e && a.s == l) a.Qa = g, a.Jb = d, V(g, d)
            },
            Tc: function() {
                "native" == a.e && a.Qa && V(a.Qa, a.Jb)
            },
            ec: function() {
                if (this !=
                    window) a.z++, a.Da = k
            },
            fc: function(b, c) {
                if (this != window) {
                    var d = a.G("JSESSIONID");
                    w("session") != d && y("session", d) && a.xb(a.page.f);
                    a.z--;
                    a.Y && clearTimeout(a.Y);
                    a.Y = setTimeout(function() {
                        if (0 == a.z) {
                            a.Y = j;
                            a.Da = n;
                            var b = a.Ea;
                            a.Ea = [];
                            for (var c in b) b[c]()
                        }
                    }, 250);
                    "success" == c && a.X++;
                    a.bc && "v" == ("" + a.global.version).substr(0, 1) && "v" == ("" + window.version).substr(0, 1) && a.global.version != window.version && (d = a.Na(), d != j && d.status == d.UPDATEREADY && d.swapCache(), window.location.reload())
                }
            },
            gc: function(b, c, d) {
                if (!(this ==
                        window || a.q))
                    if (a.T(), a.ja(), a.ab) a.info("ajax error skipped!");
                    else if (0 != b.status)
                    if (0 == a.X) a.Sc();
                    else {
                        var h = "",
                            g = "";
                        d == j ? (h = b.status, g = b.statusText) : (h = c, g = d);
                        h = "ajax request failed: " + h + " " + g + "!";
                        a.error(h);
                        if (a.da) alert(h), a.da = n
                    }
            },
            t: function() {
                if (a.lb) a.K = k, c("#ajax .msg").html(i18n("site.pleaseWait")), c("#ajax").removeClass("hidden"), window.setTimeout(function() {
                    a.K && (c("#ajax .window").addClass("fadein").removeClass("hidden"), window.setTimeout(function() {
                            a.K && c("#ajax .block").addClass("fadein50").removeClass("hidden")
                        },
                        1E3))
                }, 750)
            },
            ja: function() {
                a.K = n;
                c("#ajax, #ajax .window, #ajax .block").addClass("hidden")
            },
            zb: function() {
                c("#ajax .image").addClass("check");
                c("#ajax .msg").html(i18n("ticket.betSlipAccepted"));
                window.setTimeout(function() {
                    a.K = n;
                    c("#ajax .window").fadeOut(1E3, function() {
                        c("#ajax .window").fadeIn(0);
                        c("#ajax, #ajax .window, #ajax .block").addClass("hidden");
                        c("#ajax .image").removeClass("check")
                    })
                }, 1E3)
            },
            Wc: function() {
                a.V++;
                a.wa = n;
                a.Zb = n;
                a.H ? a.Aa(a.V) : a.Ta();
                window.initServiceWorker()
            },
            setTimeout: function(b,
                c) {
                c == j && (c = a.page.f + a.o());
                var d = a.page.update[c];
                d == j && (d = 2E3);
                0 < d && window.setTimeout(b, d)
            },
            T: function() {
                a.V++;
                var b = a.V;
                a.H && a.setTimeout(function() {
                    a.wa = n;
                    a.Aa(b)
                })
            },
            Aa: function(b) {
                if (a.V == b && a.H) {
                    if (!(0 == a.X && 0 != a.z)) {
                        if (a.wa) {
                            a.Zb = k;
                            return
                        }
                        if (!(document.activeElement != j && "INPUT" == document.activeElement.nodeName)) {
                            a.navigate(a.h(), l, "skip", k);
                            a.setTimeout(function() {
                                a.Aa(b)
                            });
                            return
                        }
                    }
                    window.setTimeout(function() {
                        a.Aa(b)
                    }, 1E3)
                }
            },
            u: function() {
                if (!a.m.Ka) a.m.Ka = k, a.m.ea != l && a.m.Ba != l && a.ob(a.m.ea,
                    a.m.Ba)
            },
            ob: function(b, f) {
                b.removeClass(a.ca);
                b.addClass("hidden");
                f.removeClass(a.ca);
                f.addClass("top");
                c("body").removeClass("animating");
                a.Fa = n
            },
            animate: function(b, f, d, h) {
                if ("skip" != f) {
                    f == j && (f = "slide");
                    a.d && -1 < f.indexOf("slide") && 0 > f.indexOf("slideup") && 0 > f.indexOf("slidedown") && (f = -1 < f.indexOf("reverse") ? "slideup" : "slidedown");
                    var g = a.a(j, h);
                    a.i(h) ? (a.page.W++, a.page.W %= 2) : (a.page.w++, a.page.w %= 2);
                    var m = a.a(j, h);
                    a.m.Ka = n;
                    a.m.ea = g;
                    a.m.Ba = m;
                    b = a.o(h, b);
                    d && a.page.data[h + b] != j ? (a.Z(m, h + b, n, f), a.ja()) :
                        (a.t(), a.ua("content", "", h));
                    c("body").addClass("animating");
                    a.Fa = k;
                    g.removeClass(a.ca);
                    m.removeClass(a.ca);
                    m.show();
                    g.addClass(f + " out");
                    m.addClass(f + " top in");
                    ("none" == f || c.browser.mozilla) && a.ob(a.m.ea, a.m.Ba)
                }
            },
            Ia: function() {
                if ("retailAndroid" == a.b.nativAppOs) {
                    var b = w("showTwoColumnVersion");
                    if (!("0" == b || a.d == (630 < window.innerWidth || "1" == b))) a.d = 630 < window.innerWidth || "1" == b, a.d ? (jQuery("body").addClass("twocol"), a.pa = "android,account,bonusconditions,betting-glossary,ChampionsChallenge,contact,editor,firstPayin,help,imprint,information,limitsAndBlocks,login,News+Updates,payin,payment-methods,payout,personalDetails,preferences,responsibility,support,terms,ticket,userDocumentUpload,usermessage".split(","),
                        a.i(a.page.f) ? (go(a.page.f), go("home")) : go(a.page.g)) : (jQuery("body").removeClass("twocol"), a.pa = []), a.ac()
                }
            },
            la: function(a) {
                return 0 < c(a).parents(".pagea").length
            },
            i: function(b) {
                if (!b) return n;
                for (var c = 0; c < a.pa.length; c++)
                    if (-1 < b.indexOf(a.pa[c])) return k;
                return n
            },
            j: function(b) {
                return b && a.i(b) ? a.page.jc[a.page.W] : a.page.ba[a.page.w]
            },
            a: function(b, f) {
                return b == j ? c(a.j(f)) : c(b, a.j(f))
            },
            aa: function(a, c, d, h) {
                for (var g in c)
                    if (typeof d[c[g]] == a) return d[c[g]];
                return h
            },
            dc: function(a) {
                for (var c = {},
                        a = a.substring(a.indexOf("?") + 1).split("&"), d = 0; d < a.length; d++) {
                    var h = a[d].split("=");
                    c[decodeURIComponent(h[0])] = decodeURIComponent(h[1])
                }
                return c
            },
            go: function() {
                if (a.ma) a.Tc();
                else {
		    
                    var b = n;
                    if (window.event && a.d) var f = c(window.event.target),
                        b = b | a.la(f),
                        b = b | (0 < f.parents("#overlay").length && a.Ua);
                    var d = a.aa("object", [0, 1], arguments, {}),
                        h = a.aa("boolean", [0, 1, 2, 3], arguments, k) != n,
                        g = a.aa("string", [0], arguments, a.h(b)),
                        m = a.aa("string", [1, 2, 3], arguments, j),
                        b = a.h(b);
                    if (!(b == a.global.layerUrl && g.substr(0, a.global.layerUrl.length) !=
                            a.global.layerUrl || "account/swiss" == b && 1 == a.global.swiss && "account/markapproved" != g.substr(0, 20)))
                        if (a.Gb(), a.q) a.navigate(g, d, m, h);
                        else if (a.i(g) ? a.Sa = "" : a.mode = "", -1 < g.indexOf("login/register") && setTimeout(function() {
                            c("input,select").focus(function() {
                                a.Q = jQuery(this).attr("name")
                            })
                        }, 3E3), "login/registerStepTwo" == b && "login/registerStepTwo" != g && "login/register" != g && !a.La) window.registerLeave(g);
                    else {
                        a.La = n;
                        b = window.event;
                        if (b != j && "click" == b.type) {
                            var f = c(b.target),
                                r = f.closest("[onclick]");
                            if (0 !=
                                r.length && !r.hasClass("noselect")) {
                                r.hasClass("tbicon") ? r.addClass("selected") : (r.toggleClass("selected"), window.setTimeout(function() {
                                    r.removeClass("selected")
                                }, 200));
                                window.setTimeout(function() {
                                    a.Pa(g, d, m, h)
                                }, 100);
				var lastsegment = g.split('/');console.log(g);



                            }
                        }
                        a.Pa(g, d, m, h);
                        a.Xb()
                    }
                }
            },
            Pa: function(b, c, d, h) {
                a.da = k;
                a.ab = n;
                (b != a.P(b) || c && c.showAjax) && a.t();
                a.yb = a.s;
                a.s = l;
                a.navigate(b, c, d, h);
                a.h() != b && ("/" == b.substring(0, 1) && (b = b.substring(1)), a.ta(b))
            },
            Ta: function() {
                var b = a.h();
                if (window.PAYOUT_BANK_PARAMS && "payout" == b) b = window.PAYOUT_BANK_PARAMS,
                    window.PAYOUT_BANK_PARAMS.redirected = k, go("payout/select", {
                        type: b.type,
                        action: "selectType",
                        amountDisplay: b.amount,
                        url: "payout/bank"
                    });
                else if (a.global.language != a.ha() || a.page.f != b && (!a.d || a.page.g != b)) a.da = k, a.ab = n, a.Ib = k, a.mode = "", a.navigate(b, {}, "slide reverse", k)
            },
            Pb: function() {
                a.Ta();
                window.setTimeout(a.Pb, 333)
            },
            fa: function(b, c) {
                return (a.i(b) ? a.page.g : a.page.f) + a.o(b, c)
            },
            navigate: function(b, f, d, h) {
                a.wa = k;
                a.Fc = new Date;
                "/" == b.substring(0, 1) && (b = b.substring(1));
                if (a.Ab) {
                    a.Ab = n;
                    if (!navigator.cookieEnabled) return alert("Sie m\u00fcssen Cookies aktiviert haben!"),
                        n;
                    if (a.xb(b)) return
                }
                if (b == l || "" == b) b = "home";
                var g = a.fa(b);
                f == l && (f = {});
                if (!a.q) {
                    a.bd(b, f);
                    if (!a.i(b)) a.nextPage = b;
                    if (a.mc(b)) return
                }
                if (a.P(b) == l) a.Za(b);
                else if (!a.q) a.Jc(), a.page.rc = a.P(b), a.Za(b), g != a.fa(b, f) && a.animate(f, d, h, b);
                ("" == a.h() || a.i(b)) && a.ta(a.page.f);
                if (f.removeId) a.oa = a.oa || {}, a.oa[f.removeId] = k;
                a.Dc(a.a(j, b), b, f, h, a.q);
                b = c(a.page.ba[a.page.w]).find(".scroll_container");
                f = b.height() < c(window).height() && "fixed" == a.e;
                b.css("min-height", f ? c(window).height() - 50 : "");
                c(a.page.ba[a.page.w]).find(".contentbottomtext").css("padding-bottom",f ? "50px" : "")
		var lastsegment = a.page.f.split('/');
		if(a.page.f=="home")
		{
		Live.RenderHome();
		Live.Details.RemoveRadarPanel();
		}
				if(lastsegment[0]=="sports" && lastsegment[1]=="event" && lastsegment[2]>0)
				{

				}else{
				Live.Details.Stop();
				Live.Details.RemoveRadarPanel();
				}

	
            },
            mc: function(b) {
                return a.oa && b.match("usermessage/[0-9]") && a.oa[b.substr(12, b.length)] ? (history.go(-2), a.go("account", "slide reverse"), k) : n
            },
            od: function() {
                if ("1" == eBetFeatures.testAppTitle) document.title = "Rivalo test";
                else {
                    var b = i18n("share.ogTitle");
                    if (document.title == b || document.title == j || 0 >= document.title.length) document.title = a.b.livescore ? "" : i18n("share.ogTitle")
                }
            },
            Db: {
                home: ["home"],
                live: ["sports/live"],
                highlights: ["highlights"],
                favorites: ["favorites"],
                login: ["login"],
                tickets: ["ticket/list"],
                account: ["account", "bonusconditions"],
                information: ["information"],
                preferences: ["preferences"],
                editor: ["editor"]
            },
            ac: function() {
                for (footerItem in a.Db) {
                    var b = a.Db[footerItem];
                    for (i in b) {
                        var f = b[i];
                        if (-1 < a.page.f.indexOf(f) || a.d && -1 < a.page.g.indexOf(f)) {
                            c(".appfooter ." + footerItem).addClass("selected");
                            break
                        } else c(".appfooter ." + footerItem).removeClass("selected")
                    }
                }
            },
            Ac: function(b) {
                var f = c(this).attr("href");
                if ("#top" == f) a.Zc(a.la(b.target));
                else if ("#" == f.substring(0, 1)) a.Vb(c('a[name="' + f.substring(1) +
                    '"]'));
                else return k;
                return n
            },
            G: function(a, c) {
                if (!c) c = document.cookie;
                for (var d = c.split("; "), h = 0; h < d.length; h++) {
                    var g = d[h].split("=");
                    if (g[0] == a) return g[1]
                }
                return l
            },
            Wb: function(a, c, d, h) {
                a = a + "=" + c;
                d && ("number" === typeof d && (d = new Date((new Date).getTime() + 6E4 * d)), a += ";expires=" + d.toUTCString());
                h && (a += ";path=" + h);
                document.cookie = a
            },
            vd: function() {
                for (var a = document.cookie.split("; "), c = [], d = 0; d < a.length; d++) c[c.length] = a[d].split("=")[0];
                return c
            },
            ad: function(b, c) {
                b != c && (a.ta(a.h()), a.d && go(a.page.f))
            },
            nd: function() {
                var b = a.b.livescore ? "" : i18n("share.ogDescription"),
                    f = c("meta[name='description']"),
                    d = c("meta[property='og\\:description']");
                c("meta[property='og\\:title']").attr("content", a.b.livescore ? "" : i18n("share.ogTitle"));
                0 >= f.length ? c("head").append('<meta name="description" content="' + b + '">') : (f.attr("content") == d.attr("content") || f.attr("content") == j || 0 >= f.attr("content").length) && f.attr("content", b);
                d.attr("content", b)
            },
            dd: function(a) {
                if (window.eb != a) window.eb = a, y("timeZone", a)
            },
            tb: function(b) {
                a.yd = ["home"];
                resetInternational();
                a.Ja = n;
                z("username");
                z("password");
                var c = a.page,
                    d = c.data[b];
                c.data = {};
                c.data[b] = d;
                d = c.scroll[b];
                c.scroll = {};
                c.scroll[b] = d;
                d = c.update[b];
                c.update = {};
                c.update[b] = d;
                d = c.version[b];
                c.version = {};
                c.version[b] = d;
                deleteZopimUserData()
            },
            xb: function(a) {
                var f = w("username"),
                    d = w("password");
                if (f != l && d != l) {
                    var h = n;
                    c.ajax({
                        url: "ajax/loggedin",
                        success: function(a) {
                            0 == a && (h = k)
                        },
                        context: window,
                        global: n,
                        async: n
                    });
                    if (h != n) {
                        if (a == l || "" == a) a = "home";
                        go("login", {
                                username: f,
                                password: d,
                                from: a
                            },
                            "skip");
                        return k
                    }
                }
                return "" != a ? (go(a), k) : n
            },
            Sc: function() {
                z("page");
                z("currentPage");
                z("cookie");
                z("session");
                document.cookie = "JSESSIONID=0; expires=" + (new Date(0)).toGMTString() + "; path=/";
                location.href = ".#home"
            },
            kc: function() {
                var b = a.Na();
                if (b && window.version != a.global.version) try {
                    b.update()
                } catch (c) {}
            },
            cc: function() {
                0 != a.X ? a.Kc() : window.setTimeout(a.cc, 250)
            },
            Kc: function() {
                c("#page1,#page2,#page1a,#page2a").removeClass("placeholder");
                c("#loading").fadeOut(1800, function() {
                    c("#loading").remove()
                });
                a.lb = k;
                E();
                "simple" != a.e && c("head").append('<link type="text/css" rel="stylesheet" href="css/ani.css"/>'); - 1 == a.F && a.Pb();
                "native" == a.e && nativeCall("setLoaded");
                window.setAppLoadedStatus("appLoaded");
                "userDocumentUpload" != a.h() && ("0" == eBetFeatures.nativeAddToHomescreen || !app.supportsWebWorkerAndIsAndroidChrome) && app.ed();
                "1" == a.b.livescore && !a.global.loggedIn && "0" != w("lsRegDialog") && app.fd();
                "1" == eBetFeatures.mobileTheme && a.Ec();
                a.d && go(a.page.g)
            },
            Ic: function(b) {
                y("currentPage", b);
                var f = a.h(),
                    d = a.a(".scrollTo2:visible:first",
                        b);
                0 == d.length && (d = a.a(".scrollTo:visible:first", b));
                app.page.M[b] || document.getElementById("endlessScroll_backToTop").classList.add("deactivated");
                window.addMessageToLog("navigated to " + f);
                (a.va = 0 < d.length && -1 == f.indexOf("ticket/list")) ? a.Ub(d): !app.page.M[b] && !a.yb == b && !a.k("iPhone OS 6") && !a.k("iPhone OS 7") && !a.k("iPhone OS 8") && !a.k("iPhone OS 9") && a.scrollTo(0, app.i(b));
                a.a("a", b).click(a.Ac);
                a.jd();
                J = l;
                if (f != a.Kb) a.Kb = f;
                if ("1" == a.global.loggedIn) {
                    if (window.ga && !window.sessionIdTracked && (b =
                            a.global.encryptedSessionId)) window.sessionIdTracked = k, ga("set", "dimension7", b);
                    window.notification.na && window.notification.sb()
                }
                if (window.PAYOUT_BANK_PARAMS && window.PAYOUT_BANK_PARAMS.redirected) b = window.PAYOUT_BANK_PARAMS, c("select[name ='ibanCountries'] option").removeAttr("selected"), c("select[name ='ibanCountries'] option[value='" + b.ibanCountry + "']").attr("selected", k), c("input[name ='bankName']").attr("value", b.bankName), c("input[name ='bic']").attr("value", b.bic), c("input[name ='iban']").attr("value",
                    b.iban), window.PAYOUT_BANK_PARAMS = j
            },
            Qb: function(b, f) {
                0 < c(a.j() + " #slider").length && setTimeout(function() {
                    initTopEventSlider()
                }, a.d ? 100 : 0);
                if (!a.Id) {
                    "editor/delivered" == b ? a.zb() : a.ja();
                    var d = n;
                    if (a.s == l || a.s != f) d = k, a.s = f, a.Ic(b, f);
                    a.ac();
                    a.vc();
                    "virtualsports" != b && window.vsmobile && window.vsmobile.instance && (console.log("leaveVirtualSports"), U(), window.vsmobile && (console.log("vsmobile destroy"), window.vsmobile.instance.destroy()));
                    var h = a.i(b);
                    if (window.overlayElements) {
                        for (var g = 0; g < window.overlayElements.length; g++) c(window.overlayElements[g]).appendTo("#overlayContent");
                        c("#overlay").removeClass("hidden");
                        window.overlayElements = j;
                        a.Ua = h
                    } else a.Ua == h && c("#overlay").addClass("hidden");
                    if (a.Ma || !d && "" == a.o(b) && !a.va) a.Ma = n, d = a.page.scroll[b], d == j && (d = 0), (0 != window.pageXOffset || window.pageYOffset != d) && a.scrollTo(d, app.i(b));
                    d = J;
                    d != l && (h = a.a(d, b), 0 != h.length && toggleEditorRowAction(d, h.prev()[0]));
                    document.querySelector(".footer") && FastClick.attach(document.querySelector(".footer"));
                    a.Xb(); - 1 < a.o(b).indexOf("showFullTopList") && scrollToAnchor("#" + a.o(b));
                    "home" == b && (d =
                        document.querySelector(".topEventsBox")) && d.addEventListener("touchend", function(a) {
                        a.stopPropagation()
                    });
                    a.Ib && a.fromEventId && a.Xc();
                    a.Ib = n
                }
            },
            Xb: function() {
                a.b.livescore || (c("meta[property='og:title']").attr("content", a.global.ogTitle), c("meta[property='title']").attr("content", a.global.ogTitle), c("meta[property='og:url']").attr("content", document.URL), c("meta[property='og:description']").attr("content", a.global.ogDescription), c("meta[property='description']").attr("content", a.global.ogDescription),
                    c("meta[property='og:image']").attr("content", a.global.ogImgPath))
            },
            vc: function() {
                window.Ra && a.$a();
                "1" == window.eBetFeatures.zopimMobile && (window.$zopim && window.$zopim.livechat ? $zopim(function() {
                    $zopim.livechat.setOnConnected(function() {
                        $zopim.livechat.setOnChatStart(function() {
                            window.Ra = k;
                            a.$a()
                        });
                        $zopim.livechat.setOnChatEnd(function() {
                            window.Ra = n;
                            a.cd()
                        });
                        if ("contact" == a.nextPage || "payin/turkishBank" == a.nextPage) {
                            var b = $zopim.livechat.departments.getDepartment(app.global.language);
                            if (!b || b && "offline" ==
                                b.status) $zopim.livechat.setStatus("offline"), $zopim.livechat.hideAll(), a.wb()
                        }
                        $zopim.livechat.isChatting() && a.$a()
                    })
                }) : "contact" == a.nextPage && a.wb())
            },
            wb: function() {
                c(".livechat").addClass("hidden")
            },
            $a: function() {
                document.querySelector(".icon.logo img").src = "img/chat.png";
                document.querySelector(".icon.logo img").style.paddingTop = "5px";
                document.querySelector(".icon.logo").onclick = function() {
                    window.$zopim && window.$zopim.livechat && $zopim.livechat.window.show()
                }
            },
            cd: function() {
                document.querySelector(".icon.logo img").src =
                    "img/logo.png";
                document.querySelector(".icon.logo img").style.paddingTop = "";
                document.querySelector(".icon.logo").onclick = function() {
                    go("home")
                }
            },
            Jc: function() {
                a.kd();
                var b = a.a('input[name="storeOnly"]');
                0 != b.length && "false" == b.attr("value") && (b.attr("value", "true"), submitForm(b.closest("form")[0], n), a.O());
                if (a.Q != j && -1 < a.fb.indexOf("/login/register") && "terms" != a.nextPage && 0 > a.nextPage.indexOf("login/register")) "firstPayin" != a.page.f && "firstPayin" != a.page.g && registerTrackCancel(a.Q), a.Q = j;
                a.Tb()
            },
            Tb: function() {
                var b = a.h();
                if ("" == a.o(b)) a.page.scroll[b] = window.pageYOffset
            },
            kd: function() {
                a.ia++
            },
            jd: function() {
                a.ia++;
                a.Fb(1, 0, a.ia)
            },
            Fb: function(b, f, d) {
                if (!(a.ia != d || a.global.layerUrl || 1 == a.global.shExistingCustomer)) {
                    var h = 0;
                    if (0 < a.z) h = 250;
                    else {
                        var g = " .preload" + b + ":not(.hidden)",
                            g = c(".appfooter " + g + ", " + a.j() + " " + g);
                        if (0 == g.length) return;
                        f >= g.length ? (b++, f = 0) : (g = c(g[f]), a.q = k, g.click(), a.q = n, f++)
                    }
                    window.setTimeout(function() {
                        a.Fb(b, f, d)
                    }, h)
                }
            },
            Na: function() {
                var a = c("html").attr("manifest");
                return a ==
                    j || "" == a ? j : window.applicationCache
            },
            Lc: function() {
                a.cc()
            },
            Zc: function(b) {
                a.scrollTo(0, b)
            },
            Ub: function(b) {
                a.Vb(b, window.innerHeight / 2 - b.height() / 2)
            },
            Vb: function(b, f) {
                if (0 != b.length) {
                    b = c(b[0]);
                    f == j && (f = 0);
                    var d = a.la(b);
                    a.ka && (f -= app.a(j, d ? a.page.g : a.page.f).scrollTop() - 52);
                    a.scrollTo(Math.max(0, Math.floor(b.position().top - f)), d)
                }
            },
            scrollTo: function(b, c) {
                window.setTimeout(function() {
                        c ? document.querySelector(a.j(a.page.g) + " .scroll_container").scrollTop = b : (body.scrollTop = b, window.scrollTo(0, b))
                    }, "sports/livescore" ==
                    a.page.f ? 500 : 0)
            },
            Xc: function() {
                var b = setInterval(function() {
                    a.Ub(jQuery("#e" + a.fromEventId));
                    console.log("trying to scroll to " + a.fromEventId);
                    if (0 < window.scrollY) a.fromEventId = j, clearInterval(b)
                }, 100)
            },
            Md: t(),
            ua: function(b, f, d) {
                if ("footer" == b) c(".appfooter").html(f), window.D.oc();
                else if ("header" == b) c(".appheader").html(f);
                else {
                    var b = a.a(".app" + b + ":first", d),
                        h = c(".lmtContainer", b);
                    h.appendTo(".parkplatz");
                    b.html(f);
                    h && !a.i(d) && a.nc(h, b)
                }
            },
            wd: function() {
                var b = {};
                for (key in a.Mc) b[key] = a.Mc[key];
                return b
            },
            o: function(b, c) {
                var d = a.d && a.i(b) ? a.Sa : a.mode;
                return c == j || 0 == Object.keys(c).length ? "" != d ? "" + d : "" : c.MODE != j ? "" + c.MODE : ""
            },
            bd: function(b, c) {
                var d = a.o(b, c);
                a.i(b) ? a.Sa = d : a.mode = d
            },
            ud: function(a) {
                var c = {};
                if (a == j) return c;
                a.MODE != j && (c.MODE = a.MODE);
                return c
            },
            O: function(b) {
                b || (b = a.page.f + a.o());
                delete a.page.version[b];
                delete a.page.update[b];
                delete a.page.data[b];
                delete a.page.scroll[b]
            },
            Z: function(b, f, d, h) {
                a.Vc = a.i(f);
                var b = a.page.data[f],
                    g = "",
                    m = "",
                    r = "";
                if (b == j) a.error("applyTemplates: data of url '" +
                    f + "' not found!");
                else {
                    for (var q = 0; q < b.length; q++) {
                        var p = b[q].slice(),
                            o = p.shift();
                        if (a.cb[o] == j) a.error("template '" + o + "' not found!");
                        else {
                            "footer" == o && a.md(p, a.ya[o]);
                            var s = a.cb[o].apply(this, p);
                            if ("header" == o) {
                                if ("native" == a.e && a.s == l) {
                                    var p = p.shift(),
                                        o = backButtonEnabled(),
                                        x = i18n("common.Back");
                                    nativeCall("setHeader", [p, o, x, h])
                                }
                                g += s;
                                window.Ra && (g = g.replace("img/logo.png", "img/chat.png"))
                            } else "footer" == o ? r += s : m += s
                        }
                    }
                    a.ua("header", g);
                    "virtualSports" != f && (m += '<div class="spacer">&nbsp;</div>');
                    a.ua("footer",
                        r);
                    a.ua("content", m, f);
                    d && (d = a.j(f), a.Qb(a.P(f), f, d, c(d)))
                }
            },
            Dc: function(b, f, d, h, g) {
                a.rb(f);
                var m = (new Date).getTime(),
                    r = a.fa(f, d);
                if (!g && !("login" == f && "from" in d)) {
                    var q = "/" + f,
                        p = a.o(f, d);
                    p && (q += "/" + p);
                    if (d && "login/register" != f) {
                        var p = k,
                            o;
                        for (o in d) o in a.Gc || (q += (p ? "?" : "&") + o + "=" + d[o], p = n)
                    }
                    q = a.fb;
                    o = "/" + f;
                    "1" == eBetFeatures.googleAnalyticsAnonymizeCheckmail && o !== l && 0 == o.indexOf("/login/register/checkmail") && (o = "/login/register/checkmail"); - 1 < o.indexOf("password", o.indexOf("?")) && (o = o.substring(0,
                        o.indexOf("?")));
                    if (q != o) a.fb = o, G(o, n)
                }
                d.cv = window.version;
                d.c = m;
                "native" == a.e && (d.n = "1");
                a.b.livescore && (d.l = "1");
                a.R.length && (d.openedEvents = a.R.toString());
                if (g) {
                    if (a.page.data[r] != j) return;
                    d.plr = k
                } else {
                    if (!h) a.U = n;
                    if (a.U && a.page.data[r] == j) a.U = n;
                    if (a.U) {
                        a.U = n;
                        a.Z(b, r, k, "none");
                        a.T();
                        return
                    }
                }
                m = a.page.version[r];
                h && m != j && (d.v = m);
                (m = a.ha()) && m != a.global.language && (d.newLanguage = m);
                a.jb++;
                var s = a.jb,
                    m = f;
                if ((q = "password" in d || "NewPassword" in d) && d.username) m += "?username=" + encodeURI(d.username), d.username =
                    j;
                (o = a.page.M[m]) && !d.endlessScroll && (d.endlessScroll = o.Ya || o.L);
                if (o && d.endlessScroll < o.Ga) d.endlessScroll = o.Ga;
                c.ajax({
                    url: "ajax/" + m,
                    async: "logout" != m,
                    dataType: "json",
                    data: d,
                    contentType: "application/x-www-form-urlencoded",
                    type: q ? "POST" : "GET",
                    success: function(c) {
                        var m = n;
                        s <= a.kb && (m = k);
                        a.kb = s;
                        a.Hc(f, d, c, r, h, g ? k : m, m, b)
                    }
                });
var full_url = document.URL;
var url_array = full_url.split('#');
var last_segment = url_array[url_array.length-1];
console.log(last_segment);
		if(last_segment=="!tr/sports/live")
		{
		$("#page3a").attr("class", "page top");
		}else{
		$("#page3a").attr("class", "page top hidden");
		}
            },
            Hc: function(b, f, d, h, g, m, r, q) {
                a.Tb();
                "logout" == b && a.tb(h);
                a.d && ("logout" == b || a.global.loggedIn && ("login" == a.page.g || -1 < a.page.g.indexOf("login/"))) && go("editor");
                if (f.v == d || d == +d) a.T(),
                    a.va = k, a.Qb(a.P(b), b), a.va = n;
                else {
                    var p = d.shift(),
                        o = a.page.version[h];
                    g || (p = 0, o = j);
                    if (!(0 != p && o != j && p == o)) {
                        for (var s = 1E3 * d.shift(), o = 0; o < d.length; o++) {
                            var x = d[o];
                            if ("object" == typeof x && "redirect" == x[0]) {
                                m && !r && a.error("preload darf kein redirect machen!");
                                a.page.version[h] = p;
                                b = x[1];
                                "/" == b.substring(0, 1) && (b = b.substring(1));
                                if ("http" == b.substring(0, 4)) {
                                    location.href = a.Uc(b);
                                    return
                                }
                                h = b;
                                p = x[2];
                                a.s = l;
                                a.Za(b);
                                a.ta(b);
                                break
                            }
                        }
                        a.page.version[h] = p;
                        a.page.update[h] = s;
                        a.page.data[h] = d;
                        for (o = 0; o < d.length; o++)
                            if (p =
                                d[o], "object" == typeof p && "endlessScroll" == p[0]) {
                                s = a.page.M;
                                x = p[1];
                                if (s[h] && x < s[h].L) x = s[h].L;
                                s[h] = {
                                    L: x,
                                    total: p[2],
                                    Ga: p[3]
                                }
                            }
                        if (!m || r) {
                            for (o = 0; o < d.length; o++) {
                                p = d[o];
                                if ("object" == typeof p && "global" == p[0]) {
                                    var m = app.ya.global,
                                        r = app.global.language,
                                        L;
                                    for (L in m) app.global[L] = p[1 * m[L] + 1];
                                    a.ad(r, app.global.language);
                                    a.dd(app.global.eb);
                                    a.kc()
                                }
                                "object" == typeof p && "forcelogout" == p[0] && a.tb(h)
                            }
                            a.rb(b);
                            a.S();
                            a.fa(b, f) == h && (a.Z(q, h, k, "none"), a.T());
                            g || a.O(h);
                            a.od();
                            a.nd();
                            a.d && !a.i(b) && c("#overlay").hasClass("hidden") &&
                                ("editor" == a.page.g || "ticket/list" == a.page.g) && go(a.page.g)
                        }
                    }
                }
            },
            Uc: function(a) {
                if (isAndroidNativeApp()) {
                    var c = app.b.demo,
                        d = app.b.client,
                        h = app.b.scroll,
                        g = document.createElement("a");
                    g.href = a;
                    g.search = "?demo=" + c + "&client=" + d + "&scroll=" + h;
                    return g
                }
                return a
            },
            Ec: function() {
                c.ajax({
                    url: "ajax/getThemeBackground",
                    headers: {
                        Accept: "text/plain; charset=utf-8",
                        "Content-Type": "text/plain; charset=utf-8"
                    },
                    success: function(b) {
                        if (b && b.success) {
                            var c = new Image;
                            c.onload = function() {
                                document.getElementById("themeBackground").style.backgroundImage =
                                    "url('" + this.src + "')";
                                a.Gb()
                            };
                            c.src = b.backgroundImg
                        }
                    }
                })
            },
            Gb: function() {
                "home" == a.h() ? (document.body.classList.add("themeBackground"), document.body.classList.remove("notheme")) : document.body.classList.add("notheme")
            },








            nc: function(b, f) {
                var d = c(".lmtContainer", f);
                d.length && 0 < window.scoreboardId ? b.length && window.scoreboardIdOld == window.scoreboardId ? d.replaceWith(b) : (window.scoreboardIdOld = window.scoreboardId, eBetFeatures && "1" == eBetFeatures.useBetradarScoreboard && (window.SRLive.addWidget("widgets.lmts", {
                    height: n,
                    showScoreboard: app.global.livescore,
                    showMomentum: n,
                    showMomentum2: k,
                    momentum2_type: "line",
                    momentum2_showArea: n,
                    showPitch: k,
                    showSidebar: n,
                    showGoalscorers: n,
                    sidebarLayout: "dynamic",
                    collapse_enabled: k,
                    collapse_startCollapsed: n,
                    matchId: window.scoreboardId,
                    showTitle: n,
                    container: ".lmtContainer"
                }), window.SRLive.languages.change("rs" != a.global.language ? a.global.language : "sr"))) : window.scoreboardIdOld = 0;
                c(".parkplatz").html("")
            },
            ld: function(b) {
                var c = a.h(),
                    d = b ? "slide slow" : "slide reverse slow";
                b ? "home" ==
                    c ? go("sports/live", d) : "sports/live" == c ? go(a.global.loggedIn ? "ticket/list" : "login", d) : "ticket/list" == c ? go("account", d) : "login" == c ? "1" == eBetFeatures.blockComponents ? go("information", d) : go("bonusconditions", d) : ("account" == c || "bonusconditions" == c || "information" == c) && go("editor", d) : "sports/live" == c ? go("home", d) : "ticket/list" == c || "login" == c ? go("sports/live", d) : "bonusconditions" == c || "information" == c ? go("login", d) : "account" == c ? go("ticket/list", d) : "editor" == c && go(a.global.loggedIn ? "account" : "1" == eBetFeatures.blockComponents ?
                        "information" : "bonusconditions", d)
            },
            Rc: function(b, c, d) {
                b = b.replace(/\\'/g, "'");
                return b.replace(/([^a-zA-Z0-9_]+|^)(_[a-zA-Z0-9_]+)/g, function(b, g, m) {
                    m = m.substring(1);
                    if (c[m] == j) return a.Ca[d + "." + m] = n, g + "'[" + d + "." + m + "]'";
                    a.Ca[d + "." + m] = k;
                    return g + "a[" + c[m].replace(".", "][") + "]"
                })
            },
            Sb: function(b, f) {
                var d = c(f),
                    h = unescape(c(c("<div></div>").html(d.clone().removeAttr("id"))).html()).replace(/'/g, "\\'").replace(/&amp;/g, "&").replace(/&gt;/g, ">").replace(/&lt;/g, "<").replace(/&quot;/g, '"').replace(a.J.zc,
                        " "),
                    d = d.attr("id").substr(4),
                    g = 0,
                    m = "var a=arguments;var f=window.app.format;return ''",
                    r = a.ya[d];
                if (r == j) a.error("template compiler: mapping for template '" + d + "' not found!");
                else {
                    for (; 0 < h.length;) {
                        var q = h.search(a.J.qb);
                        if (-1 == q) break;
                        var p = h.match(a.J.qb),
                            m = m + ("+'" + h.substr(0, q) + "'"),
                            h = h.substr(q + p[0].length);
                        p[1] == j ? a.error("template compiler: '{" + p[0] + "}' is not valid!") : m += "+f(" + a.Rc(p[1], r, d) + ")";
                        g++;
                        if (150 == g) {
                            a.error("template parsing error!");
                            break
                        }
                    }
                    m = (m + ("+'" + h + "';")).replace(a.J.hd, " ");
                    try {
                        a.cb[d] = new Function(m)
                    } catch (o) {
                        a.info("Syntax Error processing " + d + ":" + o + " fnk:" + m)
                    }
                }
            },
            compile: function() {
                c("#templates > div").each(a.Sb);
                c("#templates2 > div").each(a.Sb);
                for (var b in a.Ca) a.Ca[b] || a.error("template compiler: '" + b + "' not found!");
                c("#templates").remove();
                c("#templates2").remove()
            },
            qc: function(a) {
                return a == j ? "" : a
            },
            rd: 0,
            error: function(a) {
                window.console != j && window.console.info != j && window.console.info(a.replace(/<[^<>]*>/g, ""))
            },
            info: function(a) {
                window.console != j && window.console.info !=
                    j && window.console.info(a.replace(/<[^<>]*>/g, ""))
            },
            dir: t()
        });
        a.info = a.info;
        a.error = a.error;
        a.format = a.qc;
        a.forceReload = a.O;
        a.getScrollType = function() {
            return a.e
        };
        window.app = a;
        a.wc() != n && a.Wc()
    });
    document.addEventListener("deviceready", function() {
        console.log("[Cordova | deviceready]");
        if ("true" == window.nativeApp && (window.pushNotification = window.plugins.Oc, "1" == app.global.loggedIn && window.notification.na && window.notification.sb(), w("PN_Action") && window.notification.Cd(), navigator.splashscreen && navigator.splashscreen.hide(), window.Adjust)) {
            var a;
            "1" == eBetFeatures.livescoreAdjustProduction ? (a = new window.AdjustConfig("zbyqpsayltkh", window.AdjustConfig.EnvironmentProduction), a.setLogLevel(window.AdjustConfig.LogLevelWarn)) :
                (a = new window.AdjustConfig("zbyqpsayltkh", window.AdjustConfig.EnvironmentSandbox), a.setLogLevel(window.AdjustConfig.LogLevelVerbose));
            window.Adjust.create(a);
            a = new window.AdjustEvent("33qlo9");
            window.Adjust.trackEvent(a)
        }
    });
    window.setAppLoadedStatus("nav_js_end");
    window.goLoggedIn = function(a, c) {
        app.global.loggedIn ? go(a, {
            from: c
        }) : go("login", {
            from: c
        })
    };
})()