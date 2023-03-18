/**
 * hoverIntent r6 // 2011.02.26 // jQuery 1.5.1+
 * <http://cherne.net/brian/resources/jquery.hoverIntent.html>
 * 
 * @param  f  onMouseOver function || An object with configuration options
 * @param  g  onMouseOut function  || Nothing (use configuration options object)
 * @author    Brian Cherne brian(at)cherne(dot)net
 */
(function($) {
    $.fn.hoverIntent = function(f, g) {
        var cfg = {
            sensitivity: 7,
            interval: 100,
            timeout: 0
        };
        cfg = $.extend(cfg, g ? {
            over: f,
            out: g
        } : f);
        var cX, cY, pX, pY;
        var track = function(ev) {
            cX = ev.pageX;
            cY = ev.pageY
        };
        var compare = function(ev, ob) {
            ob.hoverIntent_t = clearTimeout(ob.hoverIntent_t);
            if ((Math.abs(pX - cX) + Math.abs(pY - cY)) < cfg.sensitivity) {
                $(ob).unbind("mousemove", track);
                ob.hoverIntent_s = 1;
                return cfg.over.apply(ob, [ev])
            } else {
                pX = cX;
                pY = cY;
                ob.hoverIntent_t = setTimeout(function() {
                    compare(ev, ob)
                }, cfg.interval)
            }
        };
        var delay = function(ev, ob) {
            ob.hoverIntent_t = clearTimeout(ob.hoverIntent_t);
            ob.hoverIntent_s = 0;
            return cfg.out.apply(ob, [ev])
        };
        var handleHover = function(e) {
            var ev = jQuery.extend({}, e);
            var ob = this;
            if (ob.hoverIntent_t) {
                ob.hoverIntent_t = clearTimeout(ob.hoverIntent_t)
            }
            if (e.type == "mouseenter") {
                pX = ev.pageX;
                pY = ev.pageY;
                $(ob).bind("mousemove", track);
                if (ob.hoverIntent_s != 1) {
                    ob.hoverIntent_t = setTimeout(function() {
                        compare(ev, ob)
                    }, cfg.interval)
                }
            } else {
                $(ob).unbind("mousemove", track);
                if (ob.hoverIntent_s == 1) {
                    ob.hoverIntent_t = setTimeout(function() {
                        delay(ev, ob)
                    }, cfg.timeout)
                }
            }
        };
        return this.bind('mouseenter', handleHover).bind('mouseleave', handleHover)
    }
})(jQuery);


jQuery(document).ready(function() {
    // Side: list slide, top winner slide
    jQuery(".list_slide, .winner_slide").hoverIntent(move_left, move_right);


});

//Openbets: open tickets hover
function initBetsHover() {
    jQuery(".bets_hover").hoverIntent(show_bets, hide_bets);
}

function move_left() {
    var width;
    if (jQuery(this).attr("class") == 'list_slide')
        width = 38;
    else if (jQuery(this).attr("class") == 'winner_slide')
        width = 16;
    jQuery(this).animate({
        left: '-=' + width
    }, 300).css({
        'background-color': '#f7f7f7'
    });
}

function move_right() {
    var width;
    if (jQuery(this).attr("class") == 'list_slide')
        width = 38;
    else if (jQuery(this).attr("class") == 'winner_slide')
        width = 16;
    jQuery(this).animate({
        left: '+=' + width
    }, 300).css({
        'background-color': '#fff'
    });
}

function show_bets() {
    jQuery(this).find('.bubble').show();
}

function hide_bets() {
    jQuery(this).find('.bubble').hide();
}