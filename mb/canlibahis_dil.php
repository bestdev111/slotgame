<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:login.php"); die(); exit(); }
if(userayar('canlifutbol')!="1") { header("Location:index.php"); }
?>
<?php include 'header.php'; ?>
<script>$("#baslikdivi").html('<span><?=getTranslation('mobilheaderdivcanli1')?></span>');</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/md5.js"></script>
<div id="page2" class="page top hidden">
<div class="scroll_container" onscroll="scrollActions(this)">
<div class="scroll_wrapper">
<div class="appcontent">
<div>  </div>
<div class="livegamesboard">
<div class="eventPointInfo" style="position: relative;z-index: 9;">
<div class="eventInfo" style="float: left;width: 70%;text-align: left;">
<div class="LaugeName" id="LaugeName"></div>
</div>
<div class="eventInfo" id="getscoreboard" onclick="Live.Details.CloseRadarPanel();">
<div class="icon">
<div class="scIcon live-icon messages _0 _4_255" style="background-position: -471px -319px;width: 27px;"></div>
</div>
</div>
<div class="eventInfo liveselect" id="getanimation" onclick="Live.Details.OpenAnimation();">
<div class="icon">
<div class="scIcon live-icon messages _0 _4_255" style="background-position: -23px -126px;width: 27px;"></div>
</div>
</div>
<div class="eventInfo" id="gettvlist" style="" onclick="Live.Details.OpenRadarTv('undefined');">
<div class="icon">
<div class="scIcon live-icon messages _0 _4_255" style="background-position: -468px -126px;width: 27px;"></div>
</div>
</div>
</div>
<div id="score-panel-1" class="matchscores" style="position: relative; z-index: 9;">
<div class="scorebox headline">
<div class="eventpointDG">
<div class="top time small"><span class=" lminute" id="time"></span><span class="" id="periodComment"></span></div>
<div class="top right live-overview-hometeam"></div>
<div class="top center noBG">
<span class="homegoals"></span>:<span class="awaygoals"></span>
<br>
<span id="soccrht" style="font-size: 14px;font-weight: normal;clear: both;display: block;"></span>
</div>
<div class="top left live-overview-awayteam"></div>
<div class="top time small" id="tvstamp" style="" onclick="Live.Details.OpenRadarTv('undefined');">
<div class="icon" style="width: 35px;height: 10px;overflow: hidden;"><div class="sports_small tv-show" style="width: 3px;float: left;height: 10px;"></div>TV</div>
</div>
</div>
</div>
</div>

<style>
.score-panel-2 .teamrows .score span {
	width: 14px;
	display: block;
	text-align: center;
}
.liveselect {
    border-bottom: 3px solid #d0d300;
}
</style>

<div id="score-panel-2" class="matchscores" style="display:none;position: relative;z-index: 9;">
<div class="odd ">
<div id="e185525010" class="event match " onclick="; app.fromEventId = window.scrollY > 0 ? 185525010 : null;">
<div class="hidden">
<div colspan="11" class="c_comment">
<div class="c_comment"></div>
<div class="c_pointer"></div>
</div>
</div>
<div class="event_wrapper">
<div class="datetime ">
<div class="sportsIcon ">
<div class="icon">
<div class="sports basketball"></div>
</div>
</div>
<div class="date standard ">
<div id="time">  </div>
<span class="small" id="periodComment"></span>
</div>
</div>
<div class="teamrows">
<div class="teamrow">
<div class="team live-overview-hometeam"></div>
<div class="score">
<div class=""><span class="1hpc"></span></div>
<div class=""><span class="2hpc"></span></div>
<div class=""><span class="3hpc"></span></div>
<div class=""><span class="4hpc"></span></div>
<div class=""><span class="5hpc" style="display:none;"></span></div>
<div class=""><span class="6hpc" style="display:none;"></span></div>
<div class=""><span class="7hpc" style="display:none;"></span></div>
<div class="bold"><span class="2homegoals"></span></div>
</div>
</div>
<div class="teamrow">
<div class="team live-overview-awayteam"></div>
<div class="score">
<div class=""><span class="1apc"></span></div>
<div class=""><span class="2apc"></span></div>
<div class=""><span class="3apc"></span></div>
<div class=""><span class="4apc"></span></div>
<div class=""><span class="5apc" style="display:none;"></span></div>
<div class=""><span class="6apc" style="display:none;"></span></div>
<div class=""><span class="7apc" style="display:none;"></span></div>
<div class="bold"><span class="2awaygoals"></span></div>
</div>
</div>
</div>
<div class="placeholder "></div>
</div>
</div>
</div>
</div>
<div class="live-tracker-wrap" style="position: relative; margin-top: 1px; z-index: 1;">
<div class="lmt-container lmtContainer sr-widgets-lmts" id="iframecontainer" style="text-align: center; background: rgb(0, 0, 0); display: block;"></div>
</div>
<div class="noradars" id="noradars" style="display: none;">
<div class="eventPointInfo" id="eventcarthead">
<div class="eventInfo">
<div class="score"><span class="redhomes"></span>:<span class="redaways"></span></div>
<div class="icon"> <div class="scIcon red-card"></div> </div>
</div>
<div class="eventInfo">
<div class="score"><span class="yellowhome"></span>:<span class="yellowaway"></span></div>
<div class="icon"> <div class="scIcon yellow-card"></div> </div>
</div>
<div class="eventInfo">
<div class="score"><span class="cornerhome"></span>:<span class="corneraway"></span></div>
<div class="icon">
<div class="scIcon corner-kick"></div>
</div>
</div>
<div class="eventInfo">
<div class="score"><span class="hpenalts"></span>:<span class="apenalts"></span></div>
<div class="icon">
<div class="scIcon goal-kick"></div>
</div>
</div>
</div>
<div class="eventPointInfo">
<div class="scorebox eventpoint">
<div class="eventpointDG" id="lastComment"></div>
<div id="messagevent" style="display: none;"></div>
</div>
</div>
<div class="gerperfomcontainer">
<div class="myEventsHeaders open" onclick="eventfavoritog();" style="">
<span class="minify_icon"></span>
<span class="minify_icon"></span>
</div>
</div>
</div>
</div>

<div id="tpl_liveoddstatsdebug" class="liveoddstatsdebug" id="liveoddstatsdebug" style="text-align: center;"></div>
<div class="liveoddstats"></div>

</div>
</div>
</div>
</div>

<div id="page3a" class="page top">
<div class="scroll_container" style="min-height: 311px;">
<div class="scroll_wrapper" style="padding-top: 44px; padding-bottom: 44px;">
<div class="appcontent">
<div>  </div>

<div class="filterbarlive filterbar showQuickFilter">
<form class="form" onclick="toggleQuickFilterLive()" onsubmit="searchlive(this.elements[0].value); return false;" action="#" style="transition: 0s">
<input type="text" class="searchfield" onfocus="disableQuickFilter()" placeholder="<?=getTranslation('mobilsearchfieldarama')?>" maxlength="68" onkeyup="updateSearch()">
<span><?=getTranslation('superadmin164')?></span>
<div id="searchDeleteIcon" class="deleteIcon hidden" onclick="hideSuggestionslive()">x</div> 
<div id="suggestions" class="hidden"></div>
</form>

<div class="quickFilter" id="livefilterq">
<? if(userayar('casino_yetki')>0) { ?>
<div class="icon " onclick="getle('livecasino')"><div class="filterIcon categories casinoQuickFilterIcon"></div><span><?=getTranslation('yeniyerler_kasa132')?></span></div>
<? } ?>
<? if(userayar('rulet_oynama')>0 && userayar('rulet_yetki')>0) { ?>
<div class="icon " onclick="getle('../rulets')"><div class="filterIcon categories casinoQuickFilterIcon2"></div><span><?=getTranslation('yeniyerler_kasa229')?></span></div>
<? } ?>
<div class="icon selected" id="iconsstar_1" onclick="getlivetabl(1);listelesene(11);"><div class="sports soccer"></div><span><?=getTranslation('mobilfutbol')?></span></div>

<? if(userayar('canlibasketbol')=="1") { ?>
<div class="icon " id="iconsstar_2" onclick="getlivetabl(2);listelesene(22);"><div class="sports basketball"></div><span><?=getTranslation('mobilbasketbol')?></span></div>
<? } ?>

<? if(userayar('canlitenis')=="1") { ?>
<div class="icon " id="iconsstar_3" onclick="getlivetabl(3);listelesene(33);"><div class="sports tennis"></div><span><?=getTranslation('mobiltenis')?></span></div>
<? } ?>

<? if(userayar('canlivoleybol')=="1") { ?>
<div class="icon " id="iconsstar_4" onclick="getlivetabl(4);listelesene(44);"><div class="sports volleyball"></div><span><?=getTranslation('mobilvoleybol')?></span></div>
<? } ?>

<? if(userayar('canlibuzhokeyi')=="1") { ?>
<div class="icon " id="iconsstar_5" onclick="getlivetabl(5);listelesene(55);"><div class="sports ice-hockey"></div><span><?=getTranslation('mobilbuzhokeyi')?></span></div>
<? } ?>

<? if(userayar('canlimasatenisi')=="1") { ?>
<div class="icon " id="iconsstar_6" onclick="getlivetabl(6);listelesene(66);"><div class="sports table-tennis"></div><span><?=getTranslation('yeniyerler_kasa179')?></span></div>
<? } ?>

</div>
</div>

<div class="betfilterbar">

<div class="cell w25 selected " id="tab_1" onclick="javascript:;changeMarket(1);">
<div class="text w100"><?=getTranslation('yeniyerler_kasa366')?></div>
<div class="text" style="vertical-align:top;"></div>
</div>

<div class="cell w25  " id="tab_2" onclick="javascript:;changeMarket(28);">
<div class="text w100"><?=getTranslation('yeniyerler_kasa367')?></div>
<div class="text" style="vertical-align:top;"></div>
</div>

<div class="cell w25  " id="tab_3" onclick="javascript:;changeMarket(45);">
<div class="text w100"><?=getTranslation('yeniyerler_kasa368')?></div>
<div class="text" style="vertical-align:top;"></div>
</div>

<div class="cell w25  openothersmenu " id="tab_4" onclick="javascript:;openmenus(this);">
<div class="text w100"><?=getTranslation('mobildiger')?></div>
<div class="text" style="vertical-align:top;"></div>
</div>

<div class="_md md-open-menu-container md-whiteframe-z2 md-active md-clickable" id="menu_container_1" style="top: 104px;position: absolute;z-index: 13;right: 1px;left: 1px;float: right;display: none;background: #ffffff;border: 1px solid #d7dcde;">
<md-menu-content role="menu">

<md-menu-item>
<div class="navitem arrow" onclick="changeMarket(26);"><div class="icon"><div class="sports blank"></div></div><div class="text"><?=getTranslation('yeniyerler_kasa369')?></div><div class="value"></div></div>
</md-menu-item>

<md-menu-item>
<div class="navitem arrow" onclick="changeMarket(27);"><div class="icon"><div class="sports blank"></div></div><div class="text"><?=getTranslation('yeniyerler_kasa370')?></div><div class="value"></div></div>
</md-menu-item>

<md-menu-item>
<div class="navitem arrow" onclick="changeMarket(29);"><div class="icon"><div class="sports blank"></div></div><div class="text"><?=getTranslation('yeniyerler_kasa371')?></div><div class="value"></div></div>
</md-menu-item>

<md-menu-item>
<div class="navitem arrow" onclick="changeMarket(30);"><div class="icon"><div class="sports blank"></div></div><div class="text"><?=getTranslation('yeniyerler_kasa372')?></div><div class="value"></div></div>
</md-menu-item>

<md-menu-item>
<div class="navitem arrow" onclick="changeMarket(31);"><div class="icon"><div class="sports blank"></div></div><div class="text"><?=getTranslation('yeniyerler_kasa373')?></div><div class="value"></div></div>
</md-menu-item>

</md-menu-content>
</div>

</div>



<div class="myEventsHeader open" onclick="eventfavoritog();"  style="display:none;">
<span class="minify_icon"></span><span class="minify_icon"></span><div class="text title noselect"><?=getTranslation('mobilfavoriler')?></div>
</div>
<div class="evetnliveaddedfav"></div>
<div class="upcomingEventsHeader"> <div class="text title noselect"><?=getTranslation('ajaxtumkuponlarim6')?></div> </div>
<div class="evetnliveadded"></div>
<? if(userayar('canlibasketbol')=="1") { ?>
<div class="evetnliveaddedbasket" style="display:none;"></div>
<? } ?>
<? if(userayar('canlitenis')=="1") { ?>
<div class="evetnliveaddedtennis" style="display:none;"></div>
<? } ?>
<? if(userayar('canlivoleybol')=="1") { ?>
<div class="evetnliveaddedvoleybol" style="display:none;"></div>
<? } ?>
<? if(userayar('canlibuzhokeyi')=="1") { ?>
<div class="evetnliveaddedbuzhokeyi" style="display:none;"></div>
<? } ?>
<? if(userayar('canlimasatenisi')=="1") { ?>
<div class="evetnliveaddedmtennis" style="display:none;"></div>
<? } ?>

</div>
</div>
</div>
</div>

<div class="clear"></div>

<input id="sportipi" value="11" type="text" style="display:none;">
<input id="eventidvar" onclick="Live.Details.Open(<?=$_GET['eventid'];?>);" type="button" style="display:none;">
<script>
window.toggleQuickFilterLive = function() {
        if(!(window.event && 30 < window.event.offsetX)) $(".filterbarlive").toggleClass("showQuickFilter"), window.Ea = $(".filterbarlive").hasClass("showQuickFilter"), window.Ea ? setTimeout(function() {
            document.activeElement.blur();
        }, 50) : $(".filterbarlive input.searchfield").focus()
    };
	
$(document).ready(function(){
Live.Play();
kuponguncelle(1);
<?if($_GET['eventid']>0){?>
setTimeout(function() {
$("#eventidvar").click()
}, 1500)
<? } ?>
});
window.toggleQuickFilter = function() {
$(".filterbar").toggleClass("showQuickFilter");
};
window.disableQuickFilter = function() {
setTimeout(function() {
$(".filterbar").removeClass("showQuickFilter")
}, 100)
};

function canliyigetir() {
$(".liveoddstats").html('');
$("#page3a").removeClass('hidden');
$("#page2").addClass('hidden');
$("#historygeri").show();
$("#historygeri2").hide();
}

function updateSearch() {
var karakter = $(".searchField").val().length;
if(karakter>1) { listelesene(0); } else { listelesene(1); }
}

function listelesene(val) {

if(val==11){
	$("#sportipi").val('11');
} else if(val==22){
	$("#sportipi").val('22');
} else if(val==33){
	$("#sportipi").val('33');
} else if(val==44){
	$("#sportipi").val('44');
} else if(val==55){
	$("#sportipi").val('55');
} else if(val==66){
	$("#sportipi").val('66');
} else if(val==1){
	$("#suggestions").addClass('hidden');
	$("#searchDeleteIcon").addClass('hidden');
	$("#suggestions").html('');
} else if(val==2){
	$("#suggestions").addClass('hidden');
	$(".filterbarlive").addClass('showQuickFilter');
	$("#searchDeleteIcon").addClass('hidden');
	$("#suggestions").html('');
	$(".searchField").val('');
} else {
	var aranan_takim = $(".searchField").val();
	var sportipi = $("#sportipi").val();
	$.get('export.php?a=livesearch_arama&sportip='+sportipi+'&aranan_takim='+aranan_takim+'',function(data) {
	$("#suggestions").removeClass('hidden');
	$("#searchDeleteIcon").removeClass('hidden');
	$("#suggestions").html(data);
	});
}

}

function canliekle(eklesayi,tahminadi,secenek,oran,eventid,spid,thist) {
var rand = Math.random();
$("."+eventid+"").removeClass('selected');
if(spid=="4"){
$.get('export.php?a=canliekle&rand=' + rand + '&tahminadi=' + tahminadi + '&secenek=' + secenek + '&oran=' + oran + '&eventid=' + eventid + '', function (data) {
if (data == "2") {
alert('<?=getTranslation('mobilmacsuanaskida')?>');
} else if (data == "1") {
kuponguncelle();
$("."+eventid+"").removeClass('selected');
$("div[oddsid='" + eklesayi + "']").addClass('selected');
animateOddButton(thist);
} else if (data == "200") {
kuponguncelle();
$("."+eventid+"").removeClass('selected');
}
});
} else if(spid=="7"){
$.get('export.php?a=canliekleb&rand=' + rand + '&tahminadi=' + tahminadi + '&secenek=' + secenek + '&oran=' + oran + '&eventid=' + eventid + '', function (data) {
if (data == "2") {
alert('<?=getTranslation('mobilmacsuanaskida')?>');
} else if (data == "1") {
kuponguncelle();
$("."+eventid+"").removeClass('selected');
$("div[oddsid='" + eklesayi + "']").addClass('selected');
animateOddButton(thist);
} else if (data == "200") {
kuponguncelle();
$("."+eventid+"").removeClass('selected');
}
});
} else if(spid=="5"){
$.get('export.php?a=canlieklet&rand=' + rand + '&tahminadi=' + tahminadi + '&secenek=' + secenek + '&oran=' + oran + '&eventid=' + eventid + '', function (data) {
if (data == "2") {
alert('<?=getTranslation('mobilmacsuanaskida')?>');
} else if (data == "1") {
kuponguncelle();
$("."+eventid+"").removeClass('selected');
$("div[oddsid='" + eklesayi + "']").addClass('selected');
animateOddButton(thist);
} else if (data == "200") {
kuponguncelle();
$("."+eventid+"").removeClass('selected');
}
});
} else if(spid=="18"){
var rand = Math.random();
$.get('export.php?a=canlieklev&rand=' + rand + '&tahminadi=' + tahminadi + '&secenek=' + secenek + '&oran=' + oran + '&eventid=' + eventid + '', function (data) {
if (data == "2") {
alert('<?=getTranslation('mobilmacsuanaskida')?>');
} else if (data == "1") {
kuponguncelle();
$("."+eventid+"").removeClass('selected');
$("div[oddsid='" + eklesayi + "']").addClass('selected');
animateOddButton(thist);
} else if (data == "200") {
kuponguncelle();
$("."+eventid+"").removeClass('selected');
}
});
} else if(spid=="12"){
$.get('export.php?a=canlieklebuz&rand=' + rand + '&tahminadi=' + tahminadi + '&secenek=' + secenek + '&oran=' + oran + '&eventid=' + eventid + '', function (data) {
if (data == "2") {
alert('<?=getTranslation('mobilmacsuanaskida')?>');
} else if (data == "1") {
kuponguncelle();
$("."+eventid+"").removeClass('selected');
$("div[oddsid='" + eklesayi + "']").addClass('selected');
animateOddButton(thist);
} else if (data == "200") {
kuponguncelle();
$("."+eventid+"").removeClass('selected');
}
});
} else if(spid=="56"){
$.get('export.php?a=canlieklemt&rand=' + rand + '&tahminadi=' + tahminadi + '&secenek=' + secenek + '&oran=' + oran + '&eventid=' + eventid + '', function (data) {
if (data == "2") {
alert('<?=getTranslation('mobilmacsuanaskida')?>');
} else if (data == "1") {
kuponguncelle();
$("."+eventid+"").removeClass('selected');
$("div[oddsid='" + eklesayi + "']").addClass('selected');
animateOddButton(thist);
} else if (data == "200") {
kuponguncelle();
$("."+eventid+"").removeClass('selected');
}
});
}
}
</script>

<?php include 'footer.php'; ?>

</body>
</html>