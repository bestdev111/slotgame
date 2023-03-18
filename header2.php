<?php
if(isset($_GET['language'])){

$bilgile = bilgi("select * from language_content where name='".$ub['username']."' limit 1");
if($bilgile['id']==''){
sed_sql_query("INSERT INTO language_content SET name='".$ub['username']."', language='".$_GET['language']."'");
} else {
sed_sql_query("update language_content set language='".$_GET['language']."' where name='".$ub['username']."'");
}

}

$dil_bilgisi = bilgi("select * from language_content where name='".$ub['username']."' limit 1");

function canlida_oran_yasaklimi($bayiid,$tipisim,$sportipi) {

$bilgisi_getir = bilgi("select * from oyunlar_canli where spor_tipi='".$sportipi."' and tip_isim='".$tipisim."' and bayi_id='".$bayiid."'");

if($bilgisi_getir['id']>0){
	$donecek = 1;
} else {
	$donecek = 0;
}

return $donecek;

}

?>

<html xmlns="http://www.w3.org/1999/xhtml" lang="tr" dir="ltr"  itemscope="itemscope" itemtype="http://schema.org/WebSite" class="sr-lang-en">
<head>
<style type="text/css">
@charset "UTF-8";[ng\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak,.ng-hide{display:none !important;}ng\:form{display:block;}.ng-animate-block-transitions{transition:0s all!important;-webkit-transition:0s all!important;}
</style>
<meta charset="UTF-8">
<title><? if(userayar('site_adi')!=''){ ?><?=userayar('site_adi');?><? } else { ?><?=$site_adi;?><? } ?> | <?=getTranslation('sporbahis')?></title>
<meta name="keywords" content="-" />
<meta name="description" content="-">
<link rel="stylesheet" type="text/css" href="assets/css/css22.css">
<link rel="stylesheet" type="text/css" href="players/css/jquery-datepicker-85474B510E464EAC1B819689D87D29B3.css">
<link rel="stylesheet" type="text/css" href="assets/css/ebet-D446D2F52DAC32FA5747B4596AA0359D3.css?vs=1573248523">

<link rel="stylesheet" type="text/css" href="assets/css/slider-59A34BE099BA5AFA41C253AE1FE8E1C6.css">
<link rel="stylesheet" type="text/css" href="assets/css/live-FECB7CA271FA5B7F8137BB2E249B9366.css?vas=1573248523">
<link rel="stylesheet" type="text/css" href="assets/css/branding-7B04168329FD3CE12A8EAD629C35DF6F.css">
<link rel="stylesheet" type="text/css" href="assets/css/smallconference-AA563BD74DC2C3386DC37EB5B65A13E9.css">
<script type="text/javascript" src="assets/js/jquery-663628F795CB62444143FDE1EBDF2B5B.js"></script>
<script type="text/javascript" src="assets/js/jquery.datepicker-5EA26C76BF24B71DE8281F3C09DE0D34.js"></script>
<script type="text/javascript" src="assets/js/jquery-datepicker-i18n-C2C7E961B37EDD438B914D8C55ED7487.js"></script>
<script type="text/javascript" src="assets/js/myaccount-DD06D76F13BDE9C1BC25DD39AA1AFA3B.js"></script>
<link rel="icon" type="image/png" href="mb/assets/img/apple-touch-icon-pict.png">
<link rel="apple-touch-startup-image" href="mb/assets/img/apple-touch-icon-pict.png"/>
<script src="general4444.js?r=2" type="text/javascript" charset="utf-8"></script>
 <base href="<?=base_url() ?>">
<script>
var eBetFeatures = {navDirectLinks:'1',refreshIntervalWeb:'2000',useCacheKeyWeb:'1',zopim:'1',refreshFrameworkDontReplaceNext:'1',statisticsClientId:'491',statisticsDesign:'2',statisticsCompany:'rakipbahis',newStatisticPage:'0',displayScoreboardWeb:'1',webDelayToggleResults:'0',springSportbetAdaptations:'1',crosshairEffect:'1',enableSpecialBetFilterLayer:'0',newSwLayerToggle:'1'};
function errorwari(msg) {
	
	jQuery("#fly_message").html(msg);
	jQuery(".fly_warning_layer").show();
	
}

function SadeceRakam(e,allowedchars){var key=e.charCode==undefined?e.keyCode:e.charCode;if((/^[0-9]+$/.test(String.fromCharCode(key)))||key==0||key==13||isPassKey(key,allowedchars)){return true;}else{return false;}}
function isPassKey(key,allowedchars){if(allowedchars!=null){for(var i=0;i<allowedchars.length;i++){if(allowedchars[i]==String.fromCharCode(key))return true;}}return false;}
function SadeceRakamBlur(e,clear){var nesne=e.target?e.target:e.srcElement;var val=nesne.value;val=val.replace(/^\s+|\s+$/g,"");if(clear)val=val.replace(/\s{2,}/g," ");nesne.value=val;}
function nf(number)
{
    var number = number.toFixed(2) + '';
    var x = number.split('.');
    var x1 = x[0];
    var x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

function openAccountbox() {
        jQuery('#user').addClass('on').removeClass('wait');
}

function closeAccountbox() {
       jQuery('#user').addClass('wait');
       setTimeout(function() {
           if (jQuery('#user').hasClass('wait')) {
                jQuery('#user').removeClass('on');
           }
       }, 400);
}

function showVirtualSportsChooser(tab) {
var chooser = jQuery('#virtualSportsChooser');
chooser.show();
}
function hideVirtualSportsChooser() {
jQuery('#virtualSportsChooser').hide();
}
</script>
<style>
.error-coupon{
	color:red;
	text-align:center;
	padding:5px;
}
#messages_layer, .overlay_layer, .casino_layer {
    color: #f74835;
}
#messages_layer .headline .highlighted, .casino_layer .headline, .overlay_layer .headline .highlighted {
    color: #382422;
}
#delay_layer .progressbar .progressbarInner, #delay_layer_live .progressbar .progressbarInner {
    background: #f74835;
}
</style>
<link rel="apple-touch-startup-image" href="assets/img/apple-touch-icon-pict.png"/>


<body id="brand" >
<div class="wrapper">
<div class="container">


<?

if($ub['alt_alt_durum']>0) {
$sor = sed_sql_query("select * from duyurular where (user_id='$ub[hesap_sahibi_id]' or user_id='$ub[id]')");	
} else
if($ub['alt_durum']>0) {
$sor = sed_sql_query("select * from duyurular where (user_id='$ub[hesap_sahibi_id]' or user_id='$ub[id]')");
} else
if($ub['alt_durum']<1 && $ub['wkdurum']=="0") {
$sor = sed_sql_query("select * from duyurular where (user_id='$ub[hesap_sahibi_id]' or user_id='$ub[id]' or user_id='$ub[hesap_root_id]')");
} else
if($ub['wkdurum']=="1") {
$sor = sed_sql_query("select * from duyurular where yayin='1' and (user_id='$ub[hesap_sahibi_id]' or user_id='$ub[id]' or user_id='$ub[hesap_root_id]')");
}

if(sed_sql_numrows($sor)>0) {
?>
<div id="head" style="margin: 0 0 -12px 12px;height: 28px;">
<div data-qa="logo" id="logo" style="display: flex;justify-content: center;align-items: center;width: 180px;height: 28px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;" class=""><?=getTranslation('ustduyuru1')?></div>
<marquee behavior="scroll" scrollamount="4" scrolldelay="10" direction="left" class="newser">
<?
$a == 0;
while($row=sed_sql_fetcharray($sor)) { 
$a++;
?>

<font style="color: #000;padding: 0 10px 0 20px;font-size: 15px;"><?=$a;?>.<?=getTranslation('ustduyuru2')?> [ <?=$row['mesaj']; ?> ]</font>
<? } ?>
</marquee>
</div>
<? } ?>

<div id="head">
<div data-qa="logo" id="logo" style="display: flex;justify-content: center;align-items: center;width: 180px;height: 44px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;" class="">
<a href="/" target="_self" style="font-size: 24px;font-weight: bold;margin-top: 0px;color: #ffffff;">
<img src="/img/logots.png">
</a>
</div>
<div id="navbar">
<div id="search_nav">
<div id="searchToggle" onclick="jQuery('#searchField').focus();jQuery('#search_nav').toggleClass('on');closeSearchOnEsc();">
</div>

<div id="searchWrapper">
<input id="searchResultType" name="tee" type="hidden">
<input id="searchField" name="s" autocomplete="off" placeholder="<?=getTranslation('arama')?>" maxlength="68" class="sub_search_txt placeholder" value="<?=getTranslation('arama')?>" type="text" onkeyup="takim_arama_ekrani();">

<ul class="dropdown-menu ng-isolate-scope" role="listbox" id="search_ver" style="top: 30px; left: 0px;display:none;"></ul>

<div id="closeSearch" onclick="jQuery('#searchField').focus();jQuery('#search_nav').toggleClass('on');listelesene(2);"></div>
</div>
<script>
function takim_arama_ekrani() {
var karakter = $("#searchField").val().length;
if(karakter>1) { listelesene(0); } else { listelesene(1); }
}
function listelesene(val) {
if(val==1){
	$("#search_ver").css('display','none');
	$("#search_ver").html('');
} else if(val==2){
	$("#search_ver").css('display','none');
	$("#search_ver").html('');
	$("#searchField").val('');
} else {
	var aranan_takim = $("#searchField").val();
	$.get('ajax.php?a=livesearch_arama&aranan_takim='+aranan_takim+'',function(data) {
	$("#search_ver").html(data);
	$("#search_ver").css('display','block');
	});
}

}

function aramagetir(val) {
$.get('ajax.php?a=livesearch_bulunan&macdbid='+val+'',function(data) {
$("#main").html(data);
});
}

function opensubbet(val) {
$("#opensubbet_"+val).toggle();
$("#slocesubbet_"+val).toggle();
$("#resultTypeFilter_"+val+"_UPCOMING").toggle();
}

function slocesubbet(val) {
$("#opensubbet_"+val).toggle();
$("#slocesubbet_"+val).toggle();
$("#resultTypeFilter_"+val+"_UPCOMING").toggle();
}

function macsonucuac(val) {
$("#budacount_"+val+" #thebox_1_"+val).show();
$("#budacount_"+val+" #thebox_16_"+val).hide();
$("#budacount_"+val+" #thebox_28_"+val).hide();
$("#budacount_"+val+" #thebox_45_"+val).hide();
$("#budacount_"+val+" #realgames_1_"+val).show();
$("#budacount_"+val+" #realgames_16_"+val).hide();
$("#budacount_"+val+" #realgames_28_"+val).hide();
$("#budacount_"+val+" #realgames_45_"+val).hide();
$("#budacount_"+val+" #odseelctbut_1_"+val).addClass('on');
$("#budacount_"+val+" #odseelctbut_16_"+val).removeClass('on');
$("#budacount_"+val+" #odseelctbut_28_"+val).removeClass('on');
$("#budacount_"+val+" #odseelctbut_45_"+val).removeClass('on');
}

function ciftesansac(val) {
$("#budacount_"+val+" #thebox_1_"+val).hide();
$("#budacount_"+val+" #thebox_16_"+val).show();
$("#budacount_"+val+" #thebox_28_"+val).hide();
$("#budacount_"+val+" #thebox_45_"+val).hide();
$("#budacount_"+val+" #realgames_1_"+val).hide();
$("#budacount_"+val+" #realgames_16_"+val).show();
$("#budacount_"+val+" #realgames_28_"+val).hide();
$("#budacount_"+val+" #realgames_45_"+val).hide();
$("#budacount_"+val+" #odseelctbut_1_"+val).removeClass('on');
$("#budacount_"+val+" #odseelctbut_16_"+val).addClass('on');
$("#budacount_"+val+" #odseelctbut_28_"+val).removeClass('on');
$("#budacount_"+val+" #odseelctbut_45_"+val).removeClass('on');
}

function altustac(val) {
$("#budacount_"+val+" #thebox_1_"+val).hide();
$("#budacount_"+val+" #thebox_16_"+val).hide();
$("#budacount_"+val+" #thebox_28_"+val).show();
$("#budacount_"+val+" #thebox_45_"+val).hide();
$("#budacount_"+val+" #realgames_1_"+val).hide();
$("#budacount_"+val+" #realgames_16_"+val).hide();
$("#budacount_"+val+" #realgames_28_"+val).show();
$("#budacount_"+val+" #realgames_45_"+val).hide();
$("#budacount_"+val+" #odseelctbut_1_"+val).removeClass('on');
$("#budacount_"+val+" #odseelctbut_16_"+val).removeClass('on');
$("#budacount_"+val+" #odseelctbut_28_"+val).addClass('on');
$("#budacount_"+val+" #odseelctbut_45_"+val).removeClass('on');
}

function karsilikligolac(val) {
$("#budacount_"+val+" #thebox_1_"+val).hide();
$("#budacount_"+val+" #thebox_16_"+val).hide();
$("#budacount_"+val+" #thebox_28_"+val).hide();
$("#budacount_"+val+" #thebox_45_"+val).show();
$("#budacount_"+val+" #realgames_1_"+val).hide();
$("#budacount_"+val+" #realgames_16_"+val).hide();
$("#budacount_"+val+" #realgames_28_"+val).hide();
$("#budacount_"+val+" #realgames_45_"+val).show();
$("#budacount_"+val+" #odseelctbut_1_"+val).removeClass('on');
$("#budacount_"+val+" #odseelctbut_16_"+val).removeClass('on');
$("#budacount_"+val+" #odseelctbut_28_"+val).removeClass('on');
$("#budacount_"+val+" #odseelctbut_45_"+val).addClass('on');
}
</script>
<style type="text/css">
@keyframes hello {
  0% {
    opacity: 0.1;
  }
  50% {
	opacity: 999.9;
  }
  100% {
    opacity: 0.1;
  }
}
</style>

<input id="searchResultType" name="t" type="hidden">
<input id="searchSuggestion" name="fs" value="false" type="hidden">

<ul id="comp-suggestion">
</ul>

</div>

<ul id="head_nav">
<li class="first">
<a href="spor-bahisleri" class="nss-reg"><?=getTranslation('sporbahis')?></a>
</li>

<? if($ub['alt_durum']=="1" && $ub['alt_alt_durum']=="1") { ?>
<li class="first">
<a href="canli-bahis" class="nss-reg"><?=getTranslation('canlibahis')?></a>
</li>
<? } else { ?>


<li class="first">
<a href="canli-bahis" class="nss-reg"><?=getTranslation('canlibahis')?></a>
</li>
<? } ?>




<li class="first">
<a href="livecasino" class="nss-reg"><?=getTranslation('yeniyerler_kasa132')?></a>
</li>


<li class="first">
<a href="slots" class="nss-reg">Slots</a>
</li>



<li class="first">
<a href="sanal-spor" class="nss-reg"><?=getTranslation('sanalspor')?></a>
<br>
<span class="darkGradient lminute background-color: #f74835;padding: 3px 5px;border-radius: 2px;left: 33%;top: -9px;box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.4);"><i style="color: white;font-size: 9px;"><?=getTranslation('yeniyerler_kasa383')?></i></span>
</li>


<li class="first">
</li>
</ul>

</div>
<div id="comp-accountBox" class="e_active e_noCache ">
<div id="loggedIn_nav">
<div id="" >
<a id="balance"><?=ucfirst($ub['username']); ?> </a>
<div id="loggedIn_box">
<div class="">

</div>
</div>
</div>

<? if($ub['alt_durum']>0 || $ub['alt_alt_durum']>0 || $ub['sahip']>0 || $ub['wkyetki']=="1") { ?>
<div id="myBets" style="background:#f74835 !important;">
<a href="players/tumkuponlar.php"><?=getTranslation('kuponlar')?></a>
<span id="comp-openTicketCount2" class="e_active e_noCache ">
</span>
</div>
<? } else { ?>
<div id="myBets" style="background:#f74835 !important;">
<a href="login">GIRIŞ YAP</a>
<span id="comp-login" class="e_active e_noCache ">
</span>
</div>
<? } ?>

<div id="myBets" style="background:#f74835 !important;">
<a href="register">KAYIT OL</a>
<span id="comp-login" class="e_active e_noCache ">
</span>
</div>




</div>
</div> 
</div>

<? if($_SERVER['PHP_SELF'] == "rulet.php" || $_SERVER['PHP_SELF'] == "rulets.php") { ?>

<div id="head" style="margin: 0px 0px 5px 12px;">
<div id="navbar">
<ul id="content" style="display: flex;width: auto;height: 44px;padding: 0;flex: 1 0;justify-content: center;">
<li class="first"><a class="nss-reg" <? if($_SERVER['PHP_SELF'] == "rulet.php") { ?>style="color: #f74835;"<? } ?> href="rulet"><?=getTranslation('yeniyerler_kasa229')?> 1</a></li>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<li class="first"><a class="nss-reg" <? if($_SERVER['PHP_SELF'] == "rulets.php") { ?>style="color: #f74835;"<? } ?> href="rulets"><?=getTranslation('yeniyerler_kasa229')?> 2</a></li>

</div>
</div>

<? } ?>