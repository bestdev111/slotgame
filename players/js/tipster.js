var mytip = null;

function update_tip(e){
	if(mytip){
	var x = (document.all) ? window.event.clientX : e.pageX;
       if(mytip.offsetParent == null)
        var y = (document.all) ? window.event.clientY + document.documentElement.scrollTop : e.pageY;
		var dx = mytip.offsetWidth;
		if(document.body.clientWidth < dx + x + 15)
			mytip.style.left = (x - dx - 15) + 'px';
		else
			mytip.style.left = (x + 15) + 'px';
		mytip.style.top = (y + 15) + 'px';
	}
}

function tip(text, len, filterOutHtml){
	if(!checkShowTooltip(text,len))
		return;
	if (filterOutHtml) {
		text = text.replace(/<\/?([a-z][a-z0-9]*)\b[^>]*>?/gi, '');
	}
	mytip = document.getElementById('tooltip');
	mytip.style.display = 'block';
	mytip.innerHTML = text;
	document.onmousemove = update_tip;
}


function cancelTip(tipId) {
	tipCancelled = true;
	untip();
}

function untipElement(el) {
	var t = jQuery(el);
	var visible = t.length && t.is(":visible");
	if (visible) {
		t.hide();
	}
	return visible;
}

function untip(){
	var tips = [mytip, mytip_2, mytip_2, mytip_3, mytip_4, mytip_5, mytip_7, mytip_8, mytip_9, mytip_10];
	for (var i = 0; i < tips.length; i++) {
		if (untipElement(tips[i])) {
			break;
		}
	}
}

function tip_check(this_obj, text, len){
	var this_obj_2 = this_obj.parent().parent();
	if(this_obj_2.find(".hide").is(":hidden")){
		tip(text, len);
	}
}

//Tooltip 2
var mytip_2 = null;

function tip_2(text, this_obj, flip) {
    mytip_2 = document.getElementById('tooltip_2');
    mytip_2.style.display = 'block';
    document.getElementById('tooltip_2_inner').innerHTML = text;
    var offset = this_obj.parent().offset();
    if(flip)
    	mytip_2.style.left = (offset.left - mytip_2.offsetWidth - 2) + 'px';
	else
	    mytip_2.style.left = (offset.left + this_obj.width() + 2) + 'px';
    mytip_2.style.top = (offset.top - 8) + 'px';
    var inner = mytip_2.children[0];
    if (offset.top > jQuery(window).scrollTop() + jQuery(window).height()/2) {
        jQuery(inner).addClass("bottomarrow");
        jQuery(inner).removeClass("toparrow");
        inner.style.top = "-" + Math.max(0, inner.offsetHeight - 36) + "px";
    } else {
        jQuery(inner).addClass("toparrow");
        jQuery(inner).removeClass("bottomarrow");
        inner.style.top = "";
    }
}

//Tooltip 3
var mytip_3 = null;
function tip_3(width, dx, dy, head_1, head_2, text, this_obj, pos){
	mytip_3 = document.getElementById('tooltip_3');
	mytip_3.style.display = 'block';
	mytip_3.style.width = width + 'px';
	var tl = document.getElementById('tooltip_3_tl');
	var bl = document.getElementById('tooltip_3_bl');
	if(this_obj.hasClass("redborder")){
		document.getElementById('tooltip_3_tr').innerHTML = head_1;
		document.getElementById('tooltip_3_br').innerHTML = head_2 + text;
		if(pos){
			tl.style.backgroundImage = 'url(/img/tooltip_3_tl_red_bot.png)';
			bl.style.backgroundImage = 'url(/img/tooltip_3_bl_bot.png)';
		}
		else{
			tl.style.backgroundImage = 'url(/img/tooltip_3_tl_red.png)';
			bl.style.backgroundImage = 'url(/img/tooltip_3_bl.png)';
		}
		document.getElementById('tooltip_3_tr').style.backgroundImage = 'url(/img/tooltip_3_tr_red.png)';
	}
	else{
		document.getElementById('tooltip_3_tr').innerHTML = head_2;
		document.getElementById('tooltip_3_br').innerHTML = text;
		if(pos){
			tl.style.backgroundImage = 'url(/img/tooltip_3_tl_bot.png)';
			bl.style.backgroundImage = 'url(/img/tooltip_3_bl_bot.png)';
		}
		else{
			tl.style.backgroundImage = 'url(/img/tooltip_3_tl.png)';
			bl.style.backgroundImage = 'url(/img/tooltip_3_bl.png)';
		}
		document.getElementById('tooltip_3_tr').style.backgroundImage = 'url(/img/tooltip_3_tr.png)';
	}
	var offset = this_obj.offset();
	mytip_3.style.marginLeft = dx + 'px';
	pos ? mytip_3.style.top = (offset.top + dy - mytip_3.offsetHeight) + 'px' : mytip_3.style.top = (offset.top - dy) + 'px';
}

function tip_3Secret(width, dx, dy, head_1, head_2, text, this_obj, styleObj, form, pos, addPasswordGenerator){
	mytip_3 = document.getElementById('tooltip_3');
	mytip_3.style.display = 'block';
	mytip_3.style.width = width + 'px';
	var tl = document.getElementById('tooltip_3_tl');
	var bl = document.getElementById('tooltip_3_bl');
	if(jQuery("#"+form+"\\:"+styleObj).hasClass("redborder")){
		document.getElementById('tooltip_3_tr').innerHTML = head_1;
		document.getElementById('tooltip_3_br').innerHTML = head_2 + text;
		if(pos){
			tl.style.backgroundImage = 'url(/img/tooltip_3_tl_red_bot.png)';
			bl.style.backgroundImage = 'url(/img/tooltip_3_bl_bot.png)';
		}
		else{
			tl.style.backgroundImage = 'url(/img/tooltip_3_tl_red.png)';
			bl.style.backgroundImage = 'url(/img/tooltip_3_bl.png)';
		}
		document.getElementById('tooltip_3_tr').style.backgroundImage = 'url(/img/tooltip_3_tr_red.png)';
	}
	else{
		document.getElementById('tooltip_3_tr').innerHTML = head_2;
		document.getElementById('tooltip_3_br').innerHTML = text;
		if(pos){
			tl.style.backgroundImage = 'url(/img/tooltip_3_tl_bot.png)';
			bl.style.backgroundImage = 'url(/img/tooltip_3_bl_bot.png)';
		}
		else{
			tl.style.backgroundImage = 'url(/img/tooltip_3_tl.png)';
			bl.style.backgroundImage = 'url(/img/tooltip_3_bl.png)';
		}
		document.getElementById('tooltip_3_tr').style.backgroundImage = 'url(/img/tooltip_3_tr.png)';
	}
	if(addPasswordGenerator && addPasswordGenerator.length > 0) {
		jQuery("#tooltip_3_br" ).append(addPasswordGenerator);
	}
	var offset = this_obj.offset();
	mytip_3.style.marginLeft = dx + 'px';
	pos ? mytip_3.style.top = (offset.top + dy - mytip_3.offsetHeight) + 'px' : mytip_3.style.top = (offset.top - dy) + 'px';
}

//Tooltip 4 (Top Spiel Zeitleiste)
var mytip_4 = null;

function tip_4(this_obj, a, b, c){
	mytip_4 = document.getElementById('tooltip_4');
	document.getElementById('tooltip_4_m').innerHTML = '<span>' + a + '</span><br />' + b + '<br />' + c;
	if(a < 6)
		document.getElementById('tooltip_4_m').style.background = 'url(/img/conference/timeline/tl_ttm2.png) no-repeat left top';
	else
		document.getElementById('tooltip_4_m').style.background = 'url(/img/conference/timeline/tl_ttm.png) no-repeat center top';
	document.getElementById('tooltip_4').style.display = 'block';
	var offset = this_obj.offset();
	var dx = mytip_4.offsetWidth / 2 - 4;
	if(a < 6)
		mytip_4.style.left = (offset.left - 20) + 'px';
	else
		mytip_4.style.left = (offset.left - dx) + 'px';
	mytip_4.style.top = (offset.top - 84) + 'px';
}

//Tooltip 5 (Casino Gamepreview Floorplan)
var mytip_5 = null;

function tip_5(this_obj, pict, tip){
	mytip_5 = document.getElementById('tooltip_' + tip);
	mytip_5.style.display = 'block';
	mytip_5.firstChild.src = pict;
	var offset = this_obj.offset();
	mytip_5.style.left = (offset.left - 40) + 'px';
	mytip_5.style.top = (offset.top - 140) + 'px';
}

function tip_3Close(){
	mytip_3 = document.getElementById('tooltip_3');
	mytip_3.style.display = 'none';
}

var mytip_7 = null;

function tip_7(text, this_obj){
    mytip_7 = document.getElementById('tooltip_7');
    mytip_7.style.display = 'block';
    document.getElementById('tooltip_7_inner').innerHTML = text;
    var offset = this_obj.offset();
    mytip_7.style.left = (offset.left - 17) + 'px';
    mytip_7.style.top = (offset.top - mytip_7.offsetHeight) + 'px';
    }

//Tooltip 8 (Registration Footer)
var mytip_8 = null;

function tip_8(text, this_obj, newFooter){
	mytip_8 = document.getElementById('tooltip_8');
	mytip_8.style.display = 'block';
	document.getElementById('tooltip_8_inner').innerHTML = text;
	var offset = this_obj.offset();
	mytip_8.style.left = (offset.left - 23) + 'px';
	mytip_8.style.top = '-'+ (mytip_8.offsetHeight - (newFooter ? 49 : 14)) + 'px';
	}

// Tooltip 9 (BR Stats Layer)
var mytip_9 = null;

function tip_9(eventId, eventType, type){
	//einen mï¿½glichen anderen schon aufgeklappten Layer zurï¿½cksetzen
	untipElement(mytip_9);
	var tipId = 'betradar_layer_'+eventId+'_'+eventType;
	mytip_9 = document.getElementById(tipId);
	if (mytip_9 == null) {
		return;
	}
	var jq_mytip_9 = jQuery(mytip_9);
	//weil die Layers per asynchron geladen werden, zusÃ¤tzlich ï¿½berprï¿½fen,
	//ob der Mauszeiger nicht schon weg ist
	if (type == 'liveConference') {
		var prefix = '#jq-event-id-'+eventId;
		var eventRow = jq_mytip_9.closest(prefix+'-live', prefix+'-top', prefix+'-myLiveEvents');
		if (eventRow.length && !eventRow.is(':hover')) {
			return;
		}
	}
	jq_mytip_9.show();
	var height = mytip_9.offsetHeight;
	var pBottom;
	var offset;
	function pointerBottom() {
		return offset.top - jQuery(window).scrollTop() > height;
	}
	//StatsLayer auf der LWK
	if (type == 'liveConference') {
		//vor der Berechnung erstmal style.top auf standardwert setzen
		//damit die Berechungn pointerBottom() immer stabile Werte zurÃ¼ckliefert
		mytip_9.style.top = '-4px';
		offset = jq_mytip_9.offset();
		if(pBottom = pointerBottom()){
			mytip_9.style.top = (-height + 36) + 'px';
		}
	}
	// StatsLayer bei Icons (auf der Startseite)
	else {
		var eventTypeText = '';
		if(eventType) {
			eventTypeText = '-' + eventType;
		}
		offset = jQuery('#statistics-'+eventId+eventTypeText).offset();
		mytip_9.style.left = (offset.left - 330) + 'px';
		var layer = jQuery(".betradar_layer");
		if(pBottom = pointerBottom()){
			mytip_9.style.top = (offset.top - height + 15) + 'px';
			layer.removeClass('bottom');
		} else{
			mytip_9.style.top = (offset.top - 10) + 'px';
			layer.addClass('bottom');
		}
	}
	var layer = jQuery("#betradar_layer_"+eventId);
	//die Styles: bubble b_left b_shad nicht in template setzen, weil fï¿½r IE deren Reihenfolge im
	//Zusammenhang mit top10/bot10 wichtig ist
	var upClasses = "top10 bubble b_left b_shad";
	var downClasses = "bot10 bubble b_left b_shad";
	if (pBottom) {
		layer.removeClass(upClasses).addClass(downClasses);
		layer.find(".betradar_top").hide();
		layer.find(".betradar_bot").show();
	} else {
		layer.removeClass(downClasses).addClass(upClasses);
		layer.find(".betradar_top").show();
		layer.find(".betradar_bot").hide();
	}
}

//Tooltip 10 (New Timeline)
var mytip_10 = null;

function tip_10(this_obj, a, b){
	mytip_10 = document.getElementById('tooltip_10');
	document.getElementById('tooltip_10_a').innerHTML = a;
	document.getElementById('tooltip_10_b').innerHTML = b;
	mytip_10.style.display = 'block';
	var offset = this_obj.offset();
	var pos_parent = jQuery(this_obj).parent().position();
	if((offset.left - pos_parent.left) > 595){
		mytip_10.style.left = (offset.left - 154) + 'px';
		jQuery('#tooltip_10').addClass('flip');
		}
	else{
		mytip_10.style.left = (offset.left - 14) + 'px';
		jQuery('#tooltip_10').removeClass('flip');
		}
	mytip_10.style.top = (offset.top - 90) + 'px';
}