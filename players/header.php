<?php
if($ub['alt_durum']==1 && $ub['alt_alt_durum']==1) { header("Location:../superadmin"); }
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:../login"); exit(); }

$dil_bilgisi = bilgi("select * from language_content where name='".$ub['username']."' limit 1");
?>
<!DOCTYPE HTML>
<html>
<head>
<title><? if(userayar('site_adi')!=''){ ?><?=userayar('site_adi');?><? } else { ?><?=$site_adi;?><? } ?> | <?=getTranslation('sporbahis')?></title>
<meta http-equiv="Content-Language" content="tr"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=765, height=200, initial-scale=1">
<meta name="keywords" content="sanal spor oyunları"/>
<meta name="description" content="Sanal parayla gerçek oyun.Spor oyunları üzerine sanal oynayın. Kendinizi test edin."/>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&amp;subset=latin,cyrillic" />
<link rel="stylesheet" type="text/css" href="css/jquery-datepicker-85474B510E464EAC1B819689D87D29B3.css" />
<link rel="stylesheet" type="text/css" href="css/ebet-25D152B60B3AEA8A40CD8F2C39561746.css" />
<link rel="stylesheet" type="text/css" href="css/paymentlist-4A07081677A264139A206A1FFDB0E7F5.css" />
<link rel="stylesheet" type="text/css" href="css/slider-59A34BE099BA5AFA41C253AE1FE8E1C6.css" />
<link rel="stylesheet" type="text/css" href="css/live-EAE1FAE34BE271AB1FA096624F872437.css" />
<link rel="stylesheet" type="text/css" href="css/jgrowl.css?v=3.4.8">
<link rel="stylesheet" type="text/css" href="css/branding-D41D8CD98F00B204E9800998ECF8427E.css" />
<link rel="stylesheet" type="text/css" href="css/smallconference-AA563BD74DC2C3386DC37EB5B65A13E9.css" />
<link rel="stylesheet" type="text/css" href="css/allcss.css" />
<link rel="stylesheet" type="text/css" href="css/alerts.css?v=3.4.8"/>
<link rel="stylesheet" type="text/css" href="css/colorbox.css?v=3.4.8">
<link rel="stylesheet" type="text/css" href="/players/css/YhgdfAS.css?v=3.4.8"/>
<link rel="stylesheet" type="text/css" href="css/gBVLOKN.css?v=3.4.8"/>
<link rel="stylesheet" type="text/css" href="css/tipsy.css?v=3.4.8">
<link rel="stylesheet" type="text/css" href="css/betv2.css" />
<link rel="icon" type="image/png" href="/mb/assets/img/apple-touch-icon-pict.png">
<link rel="apple-touch-startup-image" href="mb/assets/img/apple-touch-icon-pict.png"/>

<link rel="stylesheet" type="text/css" href="/assets/YhgdfAS//YhgdfAS.css?v=3.4.8"/>
<script type="text/javascript" src="/assets/YhgdfAS/YhgdfAS.js?v=3.4.8"></script>
 <base href="<?=base_url() ?>">

<script>
function geridon(){
javascript:history.go(-1);
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
<style type="text/css">
#header .navheader {
    position: relative;
}
.divDerbiBantSayac{
	font-size:20px;
	font-weight:bold;
	width:475px;
	height:44px;
	position:absolute;
	left:77px;top:12px;
}
.divDerbiBantSayac span{
	font-size:25px;
	font-weight:bold;
	color:red;
	line-height:36px;
	letter-spacing:1px;
}
.saat{
	left:90px
}
.dakika{
	left:170px
}
.saniye{
	left:230px
}
.pos{
	position:absolute;
	color:#fff;
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
<script>
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
</script>
<script src="/players/js/tipster.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/jquery-ui-1.8.21.custom.min.js"></script>
<script src="js/mousehold.js"></script>

</head>
<body id="brand" class="theme">
<a name="top"></a>
<div id="ci_l"></div>
<div id="ci_r"></div>
<div id="ci_nav"></div>
<div class="wrapper">
<div class="container">
<noscript><div id="noscript">L&uuml;tfen taray&#305;c&#305;n&#305;z&#305;n JavaScript&acute;ini etkinle&#351;tirin! Please activate JavaScript in your browser!</div></noscript>
<div id="head" class="ng-scope userLogged" style="    margin: 15px 0 18px 0px;">
<div data-qa="logo" style="height:35px;" id="logo" class="">
<a href="/" target="_self" style="font-size: 24px;font-weight: bold;margin-top: 0px;color: #ffffff;">
<img src="/img/logots.png">
</a></div>
<div id="navbar">
<ul id="head_nav">
<li><a href="../spor-bahisleri"><span class="sub ng-binding"><?=getTranslation('sporbahis')?></span></a></li>
<? if(userayar('canlifutbol')=="1") { ?>
<li><a href="../canli-bahis"><span class="sub ng-binding"><?=getTranslation('canlibahis')?></span></a></li>
<? } ?>

<? if(userayar('casino_yetki')>0) { ?>
<li class="first">
<a href="../livecasino" class="nss-reg"><?=getTranslation('yeniyerler_kasa132')?></a>
</li>
<? } ?>
<? if(userayar('casino_yetki')>0) { ?>
<li class="first">
<a href="../slots" class="nss-reg">Slots</a>
</li>
<? } ?>

<br>
<span class="darkGradient lminute background-color: #f74835;padding: 3px 5px;border-radius: 2px;left: 18%;top: -9px;box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.4);"><i style="color: white;font-size: 9px;"><?=getTranslation('yeniyerler_kasa383')?></i></span>
</li>


<? if(userayar('sanal_futbolv2')>0 || userayar('sanal_futbol')>0 || userayar('sanal_sampiyonlar')>0 || userayar('sanal_dunya')>0 || userayar('sanal_avrupa')>0 || userayar('sanal_basketbol')>0 || userayar('sanal_atyarisi')>0) { ?>
<li class="first">
<a href="../sanal-spor" class="nss-reg"><?=getTranslation('sanalspor')?></a>
<br>
<span class="darkGradient lminute background-color: #f74835;padding: 3px 5px;border-radius: 2px;left: 33%;top: -9px;box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.4);"><i style="color: white;font-size: 9px;"><?=getTranslation('yeniyerler_kasa383')?></i></span>
</li>
<? } ?>

</ul>
</div>
<div id="comp-accountBox" class="ng-scope">
<div id="loggedIn_nav" class="groupB">

<div id="user" onmouseover="openAccountbox()" onmouseout="closeAccountbox()" class="wait" >
<a id="balance"><?=ucfirst($ub['username']); ?> </a>
<div id="loggedIn_box">
<div class="bubble b_top">
<ul>
<li id="userDetails">
<div><?=ucfirst($ub['username']); ?></div>
<span><?=getTranslation('sporbahis')?>:  <font id="balance2"><?=nf($ub['bakiye']); ?></font> </span>
<span><?=getTranslation('yeniyerler_kasa384')?>:  <font id="balance2"><?=nf($ub['casinobakiye']); ?></font> </span>
</li>
<li id="accountLink">
<a data-qa="navigationLayerStatement" href="../statement">
<?=getTranslation('hesapozeti')?>
</a>
</li>

<? if($ub['alt_durum']>0 || $ub['alt_alt_durum']>0 || $ub['sahip']>0 || $ub['wkyetki']=="1") { ?>
<li id="mybetsLink">
<a data-qa="navigationLayerMyBets" href="players/tumkuponlar.php">
<?=getTranslation('kuponlar')?><span id="comp-openTicketCount1" class="e_active e_noCache "></span>
</a>
</li>
<? } else { ?>
<li id="mybetsLink">
<a data-qa="navigationLayerMyBets" href="../TicketList">
<?=getTranslation('kuponlarim')?><span id="comp-openTicketCount1" class="e_active e_noCache "></span>
</a>
</li>
<? } ?>

<li id="securityLink">
<a data-qa="navigationLayerPassword" href="/players/sifredegistir.php">
<?=getTranslation('sifreguvenlik')?>
</a>
</li>   
   
<li id="logoutLink">
<form id="logoutForm" action="spor-bahisleri?logout=1" method="post" onsubmit="sessionStorage.clear();">
<input name="viewId" value="" type="hidden">
<span>
<input data-qa="accountBoxLogout" id="logoutButton" class="" value="<?=getTranslation('cikis')?>" type="submit">
</span>
</form>
   </li>
<li id="accountBoxLastLogin">
<span class="lastLogin">
<?
$loginsor = sed_sql_query("select * from login_data WHERE login_user='".$ub['username']."' ORDER BY id desc LIMIT 1");
$loginrow = sed_sql_fetcharray($loginsor);
?>
<?=getTranslation('songiris')?>: <?=date("d.m.Y H:i:s",$loginrow['zaman']);?>
</span>
</li>
</ul>
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
<a href="../TicketList"><?=getTranslation('kuponlarim')?></a>
<span id="comp-openTicketCount2" class="e_active e_noCache ">
</span>
</div>
<? } ?>

<div id="deposit"><a href="../players/" class="ng-binding"><?=getTranslation('hesabim')?></a></div>
</div>
</div>
</div>

<div id="content" class="left">
<div style="clear:both;"></div>
<div id="layer_bg"></div>
<div id="delay_layer" class="overlay_layer hide ">
<div class="innerWrap">
<div class="contentBlock">
<div class="headline"><?=getTranslation('lutfen1')?> <span class="highlighted"><?=getTranslation('lutfen2')?></span></div>
<div class="bodyText"><?=getTranslation('lutfen3')?></div>
<div class="progressbar">
<div class="progressbarInner"></div>
</div>
</div>
</div>
</div>

<script>
var A_TCALCONF={'cssprefix':'tcal','months':['<?=getTranslation('tarihsecmeay_1');?>','<?=getTranslation('tarihsecmeay_2');?>','<?=getTranslation('tarihsecmeay_3');?>','<?=getTranslation('tarihsecmeay_4');?>','<?=getTranslation('tarihsecmeay_5');?>','<?=getTranslation('tarihsecmeay_6');?>','<?=getTranslation('tarihsecmeay_7');?>','<?=getTranslation('tarihsecmeay_8');?>','<?=getTranslation('tarihsecmeay_9');?>','<?=getTranslation('tarihsecmeay_10');?>','<?=getTranslation('tarihsecmeay_11');?>','<?=getTranslation('tarihsecmeay_12');?>'],'weekdays':['<?=getTranslation('tarihsecmegun_kisa_1');?>','<?=getTranslation('tarihsecmegun_kisa_2');?>','<?=getTranslation('tarihsecmegun_kisa_3');?>','<?=getTranslation('tarihsecmegun_kisa_4');?>','<?=getTranslation('tarihsecmegun_kisa_5');?>','<?=getTranslation('tarihsecmegun_kisa_6');?>','<?=getTranslation('tarihsecmegun_kisa_7');?>'],'longwdays':['<?=getTranslation('tarihsecmegun_1');?>','<?=getTranslation('tarihsecmegun_2');?>','<?=getTranslation('tarihsecmegun_3');?>','<?=getTranslation('tarihsecmegun_4');?>','<?=getTranslation('tarihsecmegun_5');?>','<?=getTranslation('tarihsecmegun_6');?>','<?=getTranslation('tarihsecmegun_7');?>'],'yearscroll':true,'weekstart':0,'prevyear':'Previous Year','nextyear':'Next Year','prevmonth':'Previous Month','nextmonth':'Next Month','format':'d-m-Y'};
</script>