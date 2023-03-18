var ebetReg = (function() {
    function fieldChanged() {
        var n = jQuery(this);
        var v = (n.attr("type") == "checkbox") ? (n.is(':checked') ? 1 : 0) : n.val();
        var f = n.attr("_name");
        var statusFields = jQuery(this).parent().parent().find(".status");
        jQuery.post('/spring/reg/s', {
            v: v,
            f: f
        }).done(function() {
            if (f == 'contact.phonePrefix') {
                RefreshHandler.update('form/ddnew?n=contact.phoneBrazilPrefix');
            } else {
                RefreshHandler.updateNodes(statusFields);
            }
        });

    }

    return {
        registerRow: function(node) {
            node = jQuery(node);
            var all = jQuery("input", node).add("select", node);
            all.on("blur", fieldChanged);
            all.on("click", fieldChanged);
            all.on("focus", fieldChanged);
        }
    };
})();