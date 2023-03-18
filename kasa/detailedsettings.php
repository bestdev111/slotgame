<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); die(); exit(); }
if($ub['alt_durum']<1 && $ub['wkyetki']<1 && $ub['alt_alt_durum']<1 && $ub['sahip']=="0") { header("Location:index.php"); }


if(isset($_GET['id'])) {
$id = gd("id");
$bayilerim = "".benimbayilerim($ub['id'])."";
$bayi_array = explode(",",$bayilerim);
if(!in_array($id,$bayi_array) || !is_numeric($id)) { die("<div class='bos'>Buna yetkili degilsiniz.</div>"); }
$_SESSION['edituser'] = $id;
header("Location:detailedsettings.php");
}

if($_GET['action']=="set_default"){

$oid = $_SESSION['edituser'];

sed_sql_query("update kullanici set ayar_sekil='1',site_adi='',macbasitutarbulten = '10000',macbasitutarcanli = '10000',canli_ilkyari_yayindan_kaldir = '45',canli_yayindan_kaldir = '89',orankorumamaxoran = '100',canli_sure='10',bahiskombinasyonu='1',kuponalim='1',sporbulten='1',iptal_sure='1',iptal_limit='10',tekmac_max_tutar='5000',max_odeme='10000',min_oran='1.01',maxoran='1000',min_kupon_tutar='3',aynikupon_max_tutar='2000	',max_satir='12',canlifutbol='1',futbolmbs='1',canlifutbolmbs='1',basketbol='1',basketmbs='1',canlibasketbol='1',canlibasketmbs='1',tenis='1',tenismbs='1',canlitenis='1',canlitenismbs='1',voleybol='1',voleybolmbs='1',canlivoleybol='1',canlivoleybolmbs='1',buzhokeyi='1',buzhokeyimbs='1',canlibuzhokeyi='1',canlibuzhokeyimbs='1',masatenisi='1',masatenisimbs='1',canlimasatenisi='1',canlimasatenisimbs='1',beyzbol='1',beyzbolmbs='1',dovus='1',dovusmbs='1',rugby='1',rugbymbs='1',hentbol='1',hentbolmbs='1',casino_yetki='1',rulet_yetki='1',rulet_oynama='1' where id='$oid'");

sed_sql_query("update kullanici set ayar_sekil='1',site_adi='',macbasitutarbulten = '10000',macbasitutarcanli = '10000',canli_ilkyari_yayindan_kaldir = '45',canli_yayindan_kaldir = '89',orankorumamaxoran = '100',canli_sure='10',bahiskombinasyonu='1',kuponalim='1',sporbulten='1',iptal_sure='1',iptal_limit='10',tekmac_max_tutar='5000',max_odeme='10000',min_oran='1.01',maxoran='1000',min_kupon_tutar='3',aynikupon_max_tutar='2000	',max_satir='12',canlifutbol='1',futbolmbs='1',canlifutbolmbs='1',basketbol='1',basketmbs='1',canlibasketbol='1',canlibasketmbs='1',tenis='1',tenismbs='1',canlitenis='1',canlitenismbs='1',voleybol='1',voleybolmbs='1',canlivoleybol='1',canlivoleybolmbs='1',buzhokeyi='1',buzhokeyimbs='1',canlibuzhokeyi='1',canlibuzhokeyimbs='1',masatenisi='1',masatenisimbs='1',canlimasatenisi='1',canlimasatenisimbs='1',beyzbol='1',beyzbolmbs='1',dovus='1',dovusmbs='1',rugby='1',rugbymbs='1',hentbol='1',hentbolmbs='1',casino_yetki='1',rulet_yetki='1',rulet_oynama='1' where hesap_sahibi_id='$oid'");
$onaylandi = 2;

}

if(isset($_POST['submit'])) {

$site_adi_ver = pd("site_adi");
$macbasitutarbulten = pd("macbasitutarbulten");
$macbasitutarcanli = pd("macbasitutarcanli");
$canli_sure = pd("canli_sure");
$bahiskombinasyonu = pd("bahiskombinasyonu");
$tumbultenbahis = pd("tumbultenbahis");
$sporbulten = pd("sporbulten");
$iptal_sure = pd("iptal_sure");
$iptal_limit = pd("iptal_limit");
$tekmac_max_tutar = pd("tekmac_max_tutar");
$max_odeme = pd("max_odeme");
$min_oran = pd("min_oran");
$maxoran = pd("maxoran");
$min_kupon_tutar = pd("min_kupon_tutar");
$aynikupon_max_tutar = pd("aynikupon_max_tutar");
$max_satir = pd("max_satir");
$canlifutbol = pd("canlifutbol");
$futbolmbs = pd("futbolmbs");
$canlifutbolmbs = pd("canlifutbolmbs");
$basketbol = pd("basketbol");
$basketmbs = pd("basketmbs");
$canlibasketbol = pd("canlibasketbol");
$canlibasketmbs = pd("canlibasketmbs");
$tenis = pd("tenis");
$tenismbs = pd("tenismbs");
$canlitenis = pd("canlitenis");
$canlitenismbs = pd("canlitenismbs");
$voleybol = pd("voleybol");
$voleybolmbs = pd("voleybolmbs");
$canlivoleybol = pd("canlivoleybol");
$canlivoleybolmbs = pd("canlivoleybolmbs");
$buzhokeyi = pd("buzhokeyi");
$buzhokeyimbs = pd("buzhokeyimbs");
$canlibuzhokeyi = pd("canlibuzhokeyi");
$canlibuzhokeyimbs = pd("canlibuzhokeyimbs");
$masatenisi = pd("masatenisi");
$masatenisimbs = pd("masatenisimbs");
$canlimasatenisi = pd("canlimasatenisi");
$canlimasatenisimbs = pd("canlimasatenisimbs");
$beyzbol = pd("beyzbol");
$beyzbolmbs = pd("beyzbolmbs");
$dovus = pd("dovus");
$dovusmbs = pd("dovusmbs");
$rugby = pd("rugby");
$rugbymbs = pd("rugbymbs");
$hentbol = pd("hentbol");
$hentbolmbs = pd("hentbolmbs");
$casino_yetki = pd("casino_yetki");
$rulet_yetki = pd("rulet_yetki");
$canli_ilkyari_yayindan_kaldir = pd("canli_ilkyari_yayindan_kaldir");
$canli_yayindan_kaldir = pd("canli_yayindan_kaldir");
$orankorumamaxoran = pd("orankorumamaxoran");

if($canli_ilkyari_yayindan_kaldir==0){
$canli_ilk_yari_esitle = 75;
} else {
$canli_ilk_yari_esitle = $canli_ilkyari_yayindan_kaldir;
}

if($canli_yayindan_kaldir==0){
$canli_esitle = 120;
} else {
$canli_esitle = $canli_yayindan_kaldir;
}

$oid = $_SESSION['edituser'];

$zaman = time();
if($ub['alt_durum']>0) {

if($wkyetki!=1){
	$alt_sinir_ver = "alt_sinir='0'";
} else {
	$alt_sinir_ver = "alt_sinir=alt_sinir";
}

sed_sql_query("update kullanici set ayar_sekil='2',site_adi='$site_adi_ver',macbasitutarbulten = '$macbasitutarbulten',macbasitutarcanli = '$macbasitutarcanli',canli_ilkyari_yayindan_kaldir = '$canli_ilk_yari_esitle',canli_yayindan_kaldir = '$canli_esitle',orankorumamaxoran = '$orankorumamaxoran',canli_sure='$canli_sure',bahiskombinasyonu='$bahiskombinasyonu',sporbulten='$sporbulten',kuponalim='$tumbultenbahis',iptal_sure='$iptal_sure',iptal_limit='$iptal_limit',tekmac_max_tutar='$tekmac_max_tutar',max_odeme='$max_odeme',min_oran='$min_oran',maxoran='$maxoran',min_kupon_tutar='$min_kupon_tutar',aynikupon_max_tutar='$aynikupon_max_tutar',max_satir='$max_satir',canlifutbol='$canlifutbol',futbolmbs='$futbolmbs',canlifutbolmbs='$canlifutbolmbs',basketbol='$basketbol',basketmbs='$basketmbs',canlibasketbol='$canlibasketbol',canlibasketmbs='$canlibasketmbs',tenis='$tenis',tenismbs='$tenismbs',canlitenis='$canlitenis',canlitenismbs='$canlitenismbs',voleybol='$voleybol',voleybolmbs='$voleybolmbs',canlivoleybol='$canlivoleybol',canlivoleybolmbs='$canlivoleybolmbs',buzhokeyi='$buzhokeyi',buzhokeyimbs='$buzhokeyimbs',canlibuzhokeyi='$canlibuzhokeyi',canlibuzhokeyimbs='$canlibuzhokeyimbs',masatenisi='$masatenisi',masatenisimbs='$masatenisimbs',canlimasatenisi='$canlimasatenisi',canlimasatenisimbs='$canlimasatenisimbs',beyzbol='$beyzbol',beyzbolmbs='$beyzbolmbs',dovus='$dovus',dovusmbs='$dovusmbs',rugby='$rugby',rugbymbs='$rugbymbs',hentbol='$hentbol',hentbolmbs='$hentbolmbs',casino_yetki='$casino_yetki',rulet_yetki='$rulet_yetki',rulet_oynama='$rulet_yetki' where id='$oid'");

sed_sql_query("update kullanici set ayar_sekil='2',site_adi='$site_adi_ver',macbasitutarbulten = '$macbasitutarbulten',macbasitutarcanli = '$macbasitutarcanli',canli_ilkyari_yayindan_kaldir = '$canli_ilk_yari_esitle',canli_yayindan_kaldir = '$canli_esitle',orankorumamaxoran = '$orankorumamaxoran',canli_sure='$canli_sure',bahiskombinasyonu='$bahiskombinasyonu',sporbulten='$sporbulten',kuponalim='$tumbultenbahis',iptal_sure='$iptal_sure',iptal_limit='$iptal_limit',tekmac_max_tutar='$tekmac_max_tutar',max_odeme='$max_odeme',min_oran='$min_oran',maxoran='$maxoran',min_kupon_tutar='$min_kupon_tutar',aynikupon_max_tutar='$aynikupon_max_tutar',max_satir='$max_satir',canlifutbol='$canlifutbol',futbolmbs='$futbolmbs',canlifutbolmbs='$canlifutbolmbs',basketbol='$basketbol',basketmbs='$basketmbs',canlibasketbol='$canlibasketbol',canlibasketmbs='$canlibasketmbs',tenis='$tenis',tenismbs='$tenismbs',canlitenis='$canlitenis',canlitenismbs='$canlitenismbs',voleybol='$voleybol',voleybolmbs='$voleybolmbs',canlivoleybol='$canlivoleybol',canlivoleybolmbs='$canlivoleybolmbs',buzhokeyi='$buzhokeyi',buzhokeyimbs='$buzhokeyimbs',canlibuzhokeyi='$canlibuzhokeyi',canlibuzhokeyimbs='$canlibuzhokeyimbs',masatenisi='$masatenisi',masatenisimbs='$masatenisimbs',canlimasatenisi='$canlimasatenisi',canlimasatenisimbs='$canlimasatenisimbs',beyzbol='$beyzbol',beyzbolmbs='$beyzbolmbs',dovus='$dovus',dovusmbs='$dovusmbs',rugby='$rugby',rugbymbs='$rugbymbs',hentbol='$hentbol',hentbolmbs='$hentbolmbs',casino_yetki='$casino_yetki',rulet_yetki='$rulet_yetki',rulet_oynama='$rulet_yetki' where hesap_sahibi_id='$oid'");
$onaylandi = 1;

}


}

if(isset($_GET['ok'])) {
rebuild($ub['id']);
}

$ubilgi = bilgi("select * from kullanici where id='$_SESSION[edituser]'"); 
?>
<?php include 'header.php'; ?>

<main class="main">
<ol class="breadcrumb mb-0">
<li class="breadcrumb-item"><?=getTranslation('bakiyeislekullanici')?> : <?=$ubilgi['username'];?></li>
</ol>
<div class="alert alert-danger mb-0" id="error"></div>
<div class="alert alert-info mb-0" id="info"></div>
<? if($onaylandi==1) { ?>
<script>alert('<?=getTranslation('yeniyerler_kasa231')?>');</script>
<? } ?>
<? if($onaylandi==2) { ?>
<script>alert('<?=getTranslation('yeniyerler_kasa232')?>');</script>
<? } ?>
<div class="container-fluid mt-2">
<div class="row">

<?
if($ubilgi['ayar_sekil']=='2'){
	$ayar_bilgi = $ubilgi;
} else {
	$ayar_bilgi = $ayar;
}
?>


<? if($ubilgi['ayar_sekil']=='2'){ ?>

<div class="container-fluid mt-2">
<div class="row">
<div class="card">
<div class="card-header font-weight-bold"><i class="fa fa-exclamation-triangle"></i> <?=getTranslation('yeniyerler_kasa233')?><a href="detailedsettings.php?action=set_default" class="btn btn-info btn-sm" style="float:right;"><?=getTranslation('yeniyerler_kasa234')?></a></div>
<div class="card-block">
<div class="row">
<div class="form-group col-sm-9" style="font-weight:bold;">
<b class="text-success"><?=$ubilgi['username'];?></b> <?=getTranslation('yeniyerler_kasa235')?>
<br>
<span class="text-danger"><?=getTranslation('yeniyerler_kasa236')?></span>
</div>
</div>
</div>
</div>
</div>
</div>

<? } else { ?>


<div class="container-fluid mt-2">
<div class="row">
<div class="card">
<div class="card-header font-weight-bold"><i class="fa fa-exclamation-triangle"></i> <?=getTranslation('yeniyerler_kasa233')?></div>
<div class="card-block">
<div class="row">
<div class="form-group col-sm-9" style="font-weight:bold;">
<b class="text-success"><?=$ubilgi['username'];?></b> <?=getTranslation('yeniyerler_kasa235')?>
<br>
<?=getTranslation('yeniyerler_kasa237')?>
</div>
</div>
</div>
</div>
</div>
</div>

<? } ?>

<form method="post" name="newu" action="detailedsettings.php">

<div class="col-sm-6">
<div class="card">
<div class="card-header" id="bahisayarlari2" onclick="secenekaktifle('bahisayarlari','<?=getTranslation('yeniyerler_kasa238')?>');"><?=getTranslation('yeniyerler_kasa238')?> <i class="fa fa-angle-double-down" style="float: right;margin-top: 1%;font-size: 16px;font-weight: bold;"></i></div>
<div class="card-block" id="bahisayarlari" style="display:none;">

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa239')?></label>
<div class="input-group">
<input type="text" class="form-control" name="site_adi" value="<? if($ayar_bilgi['site_adi']!=''){ ?><?=$ayar_bilgi['site_adi']; ?><? } else { ?><?=$site_adi;?><? } ?>">
<BR>
<span class="itext-3"><?=getTranslation('yeniyerler_kasa240')?></span>
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa241')?></label>
<div class="input-group">
<input type="text" class="form-control" name="iptal_sure" value="<?=$ayar_bilgi['iptal_sure']; ?>">
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa242')?></label>
<div class="input-group">
<input type="text" class="form-control" name="iptal_limit" value="<?=$ayar_bilgi['iptal_limit']; ?>">
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa243')?> | TRY</label>
<div class="input-group">
<input type="text" class="form-control" name="tekmac_max_tutar" value="<?=$ayar_bilgi['tekmac_max_tutar']; ?>">
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa244')?> | TRY</label>
<div class="input-group">
<input type="text" class="form-control" name="max_odeme" value="<?=$ayar_bilgi['max_odeme']; ?>">
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa245')?></label>
<div class="input-group">
<input type="text" class="form-control" name="min_oran" value="<?=$ayar_bilgi['min_oran']; ?>">
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa246')?></label>
<div class="input-group">
<input type="text" class="form-control" name="maxoran" value="<?=$ayar_bilgi['maxoran']; ?>">
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa247')?> | TRY</label>
<div class="input-group">
<input type="text" class="form-control" name="min_kupon_tutar" value="<?=$ayar_bilgi['min_kupon_tutar']; ?>">
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa248')?> | TRY</label>
<div class="input-group">
<input type="text" class="form-control" name="aynikupon_max_tutar" value="<?=$ayar_bilgi['aynikupon_max_tutar']; ?>">
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa249')?></label>
<div class="input-group">
<input type="text" class="form-control" name="max_satir" value="<?=$ayar_bilgi['max_satir']; ?>">
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa208')?> | TRY</label>
<div class="input-group">
<input type="text" class="form-control" name="macbasitutarbulten" value="<?=$ayar_bilgi['macbasitutarbulten']; ?>">
<BR>
<span class="itext-3"><?=getTranslation('yeniyerler_kasa250')?></span>
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa209')?> | TRY</label>
<div class="input-group">
<input type="text" class="form-control" name="macbasitutarcanli" value="<?=$ayar_bilgi['macbasitutarcanli']; ?>">
<BR>
<span class="itext-3"><?=getTranslation('yeniyerler_kasa250')?></span>
</div>
</div>

</div>
</div>
</div>

<div class="col-sm-6">
<div class="card">
<div class="card-header" id="canliayarlari2" onclick="secenekaktifle('canliayarlari','<?=getTranslation('yeniyerler_kasa252')?>');"><?=getTranslation('yeniyerler_kasa252')?> <i class="fa fa-angle-double-down" style="float: right;margin-top: 1%;font-size: 16px;font-weight: bold;"></i></div>
<div class="card-block" id="canliayarlari" style="display:none;">

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa251')?></label>
<div class="input-group">
<input type="text" class="form-control" name="canli_ilkyari_yayindan_kaldir" value="<? if($ayar_bilgi['canli_ilkyari_yayindan_kaldir']>45){ ?>0<? } else { ?><?=$ayar_bilgi['canli_ilkyari_yayindan_kaldir']; ?><? } ?>">
<BR>
<span class="itext-3"><?=getTranslation('yeniyerler_kasa253')?></span>
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa254')?></label>
<div class="input-group">
<input type="text" class="form-control" name="canli_yayindan_kaldir" value="<? if($ayar_bilgi['canli_yayindan_kaldir']>90){ ?>0<? } else { ?><?=$ayar_bilgi['canli_yayindan_kaldir']; ?><? } ?>">
<BR>
<span class="itext-3"><?=getTranslation('yeniyerler_kasa255')?></span>
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa256')?></label>
<div class="input-group">
<input type="text" class="form-control" name="canli_sure" value="<?=$ayar_bilgi['canli_sure']; ?>">
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa257')?></label>
<div class="input-group">
<input type="text" class="form-control" name="orankorumamaxoran" value="<?=$ayar_bilgi['orankorumamaxoran']; ?>">
<BR>
<span class="itext-3"><?=getTranslation('yeniyerler_kasa258')?></span>
</div>
</div>

</div>
</div>
</div>


<div class="col-sm-6">
<div class="card">
<div class="card-header" id="ackapatayarlari2" onclick="secenekaktifle('ackapatayarlari','<?=getTranslation('yeniyerler_kasa259')?>');"><?=getTranslation('yeniyerler_kasa259')?> <i class="fa fa-angle-double-down" style="float: right;margin-top: 1%;font-size: 16px;font-weight: bold;"></i></div>
<div class="card-block" id="ackapatayarlari" style="display:none;">

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa260')?></label>
<div class="input-group">
<label class="check-item check-red">
<input type="radio" name="tumbultenbahis" value="0" <? if($ayar_bilgi['kuponalim']==0){ ?>checked=""<? } ?>>
<span><?=getTranslation('yaziciayar22')?></span>
</label>
<label class="check-item" style="margin-left: 10px;">
<input type="radio" name="tumbultenbahis" value="1" <? if($ayar_bilgi['kuponalim']==1){ ?>checked=""<? } ?>>
<span><?=getTranslation('yaziciayar23')?></span>
</label>
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa261')?></label>
<div class="input-group">
<label class="check-item check-red">
<input type="radio" name="bahiskombinasyonu" value="2" <? if($ayar_bilgi['bahiskombinasyonu']==2){ ?>checked=""<? } ?>>
<span><?=getTranslation('yaziciayar22')?></span>
</label>
<label class="check-item" style="margin-left: 10px;">
<input type="radio" name="bahiskombinasyonu" value="1" <? if($ayar_bilgi['bahiskombinasyonu']==1){ ?>checked=""<? } ?>>
<span><?=getTranslation('yaziciayar23')?></span>
</label>
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa262')?></label>
<div class="input-group">
<label class="check-item check-red">
<input type="radio" name="sporbulten" value="0" <? if($ayar_bilgi['sporbulten']==0){ ?>checked=""<? } ?>>
<span><?=getTranslation('yaziciayar22')?></span>
</label>
<label class="check-item" style="margin-left: 10px;">
<input type="radio" name="sporbulten" value="1" <? if($ayar_bilgi['sporbulten']==1){ ?>checked=""<? } ?>>
<span><?=getTranslation('yaziciayar23')?></span>
</label>
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa263')?></label>
<div class="input-group">
<label class="check-item check-red">
<input type="radio" name="canlifutbol" value="0" <? if($ayar_bilgi['canlifutbol']==0){ ?>checked=""<? } ?>>
<span><?=getTranslation('yaziciayar22')?></span>
</label>
<label class="check-item" style="margin-left: 10px;">
<input type="radio" name="canlifutbol" value="1" <? if($ayar_bilgi['canlifutbol']==1){ ?>checked=""<? } ?>>
<span><?=getTranslation('yaziciayar23')?></span>
</label>
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa264')?></label>
<div class="input-group">
<label class="check-item">
<input type="radio" name="casino_yetki" value="1" <? if($ayar_bilgi['casino_yetki']==1){ ?>checked=""<? } ?>>
<span><?=getTranslation('yeniyerler_kasa265')?></span>
</label>
<label class="check-item check-red" style="margin-left: 10px;">
<input type="radio" name="casino_yetki" value="0" <? if($ayar_bilgi['casino_yetki']==0){ ?>checked=""<? } ?>>
<span><?=getTranslation('yeniyerler_kasa266')?></span>
</label>
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa267')?></label>
<div class="input-group">
<label class="check-item">
<input type="radio" name="rulet_yetki" value="1" <? if($ayar_bilgi['rulet_yetki']==1){ ?>checked=""<? } ?>>
<span><?=getTranslation('yeniyerler_kasa268')?></span>
</label>
<label class="check-item check-red" style="margin-left: 10px;">
<input type="radio" name="rulet_yetki" value="0" <? if($ayar_bilgi['rulet_yetki']==0){ ?>checked=""<? } ?>>
<span><?=getTranslation('yeniyerler_kasa269')?></span>
</label>
</div>
</div>

</div>
</div>
</div>



<div class="col-sm-6">
<div class="card">
<div class="card-header" id="sporayarlari2" onclick="secenekaktifle('sporayarlari','<?=getTranslation('yeniyerler_kasa270')?>');"><?=getTranslation('yeniyerler_kasa270')?> <i class="fa fa-angle-double-down" style="float: right;margin-top: 1%;font-size: 16px;font-weight: bold;"></i></div>
<div class="card-block" id="sporayarlari" style="display:none;">

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa271')?></label>
<div class="input-group">
<select class="form-control" name="futbolmbs" style="float: right;">
<option value="1" <? if($ayar_bilgi['futbolmbs']==1){ ?>selected<? } ?>>1</option>
<option value="2" <? if($ayar_bilgi['futbolmbs']==2){ ?>selected<? } ?>>2</option>
<option value="3" <? if($ayar_bilgi['futbolmbs']==3){ ?>selected<? } ?>>3</option>
<option value="4" <? if($ayar_bilgi['futbolmbs']==4){ ?>selected<? } ?>>4</option>
<option value="5" <? if($ayar_bilgi['futbolmbs']==5){ ?>selected<? } ?>>5</option>
</select>
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa272')?></label>
<div class="input-group">
<select class="form-control" name="canlifutbolmbs" style="float: right;">
<option value="1" <? if($ayar_bilgi['canlifutbolmbs']==1){ ?>selected<? } ?>>1</option>
<option value="2" <? if($ayar_bilgi['canlifutbolmbs']==2){ ?>selected<? } ?>>2</option>
<option value="3" <? if($ayar_bilgi['canlifutbolmbs']==3){ ?>selected<? } ?>>3</option>
<option value="4" <? if($ayar_bilgi['canlifutbolmbs']==4){ ?>selected<? } ?>>4</option>
<option value="5" <? if($ayar_bilgi['canlifutbolmbs']==5){ ?>selected<? } ?>>5</option>
</select>
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa273')?></label>
<div class="input-group">
<select class="form-control" name="basketmbs" style="float: right;">
<option value="1" <? if($ayar_bilgi['basketmbs']==1){ ?>selected<? } ?>>1</option>
<option value="2" <? if($ayar_bilgi['basketmbs']==2){ ?>selected<? } ?>>2</option>
<option value="3" <? if($ayar_bilgi['basketmbs']==3){ ?>selected<? } ?>>3</option>
<option value="4" <? if($ayar_bilgi['basketmbs']==4){ ?>selected<? } ?>>4</option>
<option value="5" <? if($ayar_bilgi['basketmbs']==5){ ?>selected<? } ?>>5</option>
</select>
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa274')?></label>
<div class="input-group">
<select class="form-control" name="basketbol" style="float: right;">
<option value="1" <? if($ayar_bilgi['basketbol']==1){ ?>selected<? } ?>><?=getTranslation('yeniyerler_kasa301')?></option>
<option value="0" <? if($ayar_bilgi['basketbol']==0){ ?>selected<? } ?>><?=getTranslation('yeniyerler_kasa302')?></option>
</select>
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa275')?></label>
<div class="input-group">
<select class="form-control" name="canlibasketmbs" style="float: right;">
<option value="1" <? if($ayar_bilgi['canlibasketmbs']==1){ ?>selected<? } ?>>1</option>
<option value="2" <? if($ayar_bilgi['canlibasketmbs']==2){ ?>selected<? } ?>>2</option>
<option value="3" <? if($ayar_bilgi['canlibasketmbs']==3){ ?>selected<? } ?>>3</option>
<option value="4" <? if($ayar_bilgi['canlibasketmbs']==4){ ?>selected<? } ?>>4</option>
<option value="5" <? if($ayar_bilgi['canlibasketmbs']==5){ ?>selected<? } ?>>5</option>
</select>
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa276')?></label>
<div class="input-group">
<select class="form-control" name="canlibasketbol" style="float: right;">
<option value="1" <? if($ayar_bilgi['canlibasketbol']==1){ ?>selected<? } ?>><?=getTranslation('yeniyerler_kasa301')?></option>
<option value="0" <? if($ayar_bilgi['canlibasketbol']==0){ ?>selected<? } ?>><?=getTranslation('yeniyerler_kasa302')?></option>
</select>
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa277')?></label>
<div class="input-group">
<select class="form-control" name="tenismbs" style="float: right;">
<option value="1" <? if($ayar_bilgi['tenismbs']==1){ ?>selected<? } ?>>1</option>
<option value="2" <? if($ayar_bilgi['tenismbs']==2){ ?>selected<? } ?>>2</option>
<option value="3" <? if($ayar_bilgi['tenismbs']==3){ ?>selected<? } ?>>3</option>
<option value="4" <? if($ayar_bilgi['tenismbs']==4){ ?>selected<? } ?>>4</option>
<option value="5" <? if($ayar_bilgi['tenismbs']==5){ ?>selected<? } ?>>5</option>
</select>
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa278')?></label>
<div class="input-group">
<select class="form-control" name="tenis" style="float: right;">
<option value="1" <? if($ayar_bilgi['tenis']==1){ ?>selected<? } ?>><?=getTranslation('yeniyerler_kasa301')?></option>
<option value="0" <? if($ayar_bilgi['tenis']==0){ ?>selected<? } ?>><?=getTranslation('yeniyerler_kasa302')?></option>
</select>
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa279')?></label>
<div class="input-group">
<select class="form-control" name="canlitenismbs" style="float: right;">
<option value="1" <? if($ayar_bilgi['canlitenismbs']==1){ ?>selected<? } ?>>1</option>
<option value="2" <? if($ayar_bilgi['canlitenismbs']==2){ ?>selected<? } ?>>2</option>
<option value="3" <? if($ayar_bilgi['canlitenismbs']==3){ ?>selected<? } ?>>3</option>
<option value="4" <? if($ayar_bilgi['canlitenismbs']==4){ ?>selected<? } ?>>4</option>
<option value="5" <? if($ayar_bilgi['canlitenismbs']==5){ ?>selected<? } ?>>5</option>
</select>
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa280')?></label>
<div class="input-group">
<select class="form-control" name="canlitenis" style="float: right;">
<option value="1" <? if($ayar_bilgi['canlitenis']==1){ ?>selected<? } ?>><?=getTranslation('yeniyerler_kasa301')?></option>
<option value="0" <? if($ayar_bilgi['canlitenis']==0){ ?>selected<? } ?>><?=getTranslation('yeniyerler_kasa302')?></option>
</select>
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa281')?></label>
<div class="input-group">
<select class="form-control" name="voleybolmbs" style="float: right;">
<option value="1" <? if($ayar_bilgi['voleybolmbs']==1){ ?>selected<? } ?>>1</option>
<option value="2" <? if($ayar_bilgi['voleybolmbs']==2){ ?>selected<? } ?>>2</option>
<option value="3" <? if($ayar_bilgi['voleybolmbs']==3){ ?>selected<? } ?>>3</option>
<option value="4" <? if($ayar_bilgi['voleybolmbs']==4){ ?>selected<? } ?>>4</option>
<option value="5" <? if($ayar_bilgi['voleybolmbs']==5){ ?>selected<? } ?>>5</option>
</select>
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa282')?></label>
<div class="input-group">
<select class="form-control" name="voleybol" style="float: right;">
<option value="1" <? if($ayar_bilgi['voleybol']==1){ ?>selected<? } ?>><?=getTranslation('yeniyerler_kasa301')?></option>
<option value="0" <? if($ayar_bilgi['voleybol']==0){ ?>selected<? } ?>><?=getTranslation('yeniyerler_kasa302')?></option>
</select>
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa283')?></label>
<div class="input-group">
<select class="form-control" name="canlivoleybolmbs" style="float: right;">
<option value="1" <? if($ayar_bilgi['canlivoleybolmbs']==1){ ?>selected<? } ?>>1</option>
<option value="2" <? if($ayar_bilgi['canlivoleybolmbs']==2){ ?>selected<? } ?>>2</option>
<option value="3" <? if($ayar_bilgi['canlivoleybolmbs']==3){ ?>selected<? } ?>>3</option>
<option value="4" <? if($ayar_bilgi['canlivoleybolmbs']==4){ ?>selected<? } ?>>4</option>
<option value="5" <? if($ayar_bilgi['canlivoleybolmbs']==5){ ?>selected<? } ?>>5</option>
</select>
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa284')?></label>
<div class="input-group">
<select class="form-control" name="canlivoleybol" style="float: right;">
<option value="1" <? if($ayar_bilgi['canlivoleybol']==1){ ?>selected<? } ?>><?=getTranslation('yeniyerler_kasa301')?></option>
<option value="0" <? if($ayar_bilgi['canlivoleybol']==0){ ?>selected<? } ?>><?=getTranslation('yeniyerler_kasa302')?></option>
</select>
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa285')?></label>
<div class="input-group">
<select class="form-control" name="buzhokeyimbs" style="float: right;">
<option value="1" <? if($ayar_bilgi['buzhokeyimbs']==1){ ?>selected<? } ?>>1</option>
<option value="2" <? if($ayar_bilgi['buzhokeyimbs']==2){ ?>selected<? } ?>>2</option>
<option value="3" <? if($ayar_bilgi['buzhokeyimbs']==3){ ?>selected<? } ?>>3</option>
<option value="4" <? if($ayar_bilgi['buzhokeyimbs']==4){ ?>selected<? } ?>>4</option>
<option value="5" <? if($ayar_bilgi['buzhokeyimbs']==5){ ?>selected<? } ?>>5</option>
</select>
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa286')?></label>
<div class="input-group">
<select class="form-control" name="buzhokeyi" style="float: right;">
<option value="1" <? if($ayar_bilgi['buzhokeyi']==1){ ?>selected<? } ?>><?=getTranslation('yeniyerler_kasa301')?></option>
<option value="0" <? if($ayar_bilgi['buzhokeyi']==0){ ?>selected<? } ?>><?=getTranslation('yeniyerler_kasa302')?></option>
</select>
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa287')?></label>
<div class="input-group">
<select class="form-control" name="canlibuzhokeyimbs" style="float: right;">
<option value="1" <? if($ayar_bilgi['canlibuzhokeyimbs']==1){ ?>selected<? } ?>>1</option>
<option value="2" <? if($ayar_bilgi['canlibuzhokeyimbs']==2){ ?>selected<? } ?>>2</option>
<option value="3" <? if($ayar_bilgi['canlibuzhokeyimbs']==3){ ?>selected<? } ?>>3</option>
<option value="4" <? if($ayar_bilgi['canlibuzhokeyimbs']==4){ ?>selected<? } ?>>4</option>
<option value="5" <? if($ayar_bilgi['canlibuzhokeyimbs']==5){ ?>selected<? } ?>>5</option>
</select>
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa288')?></label>
<div class="input-group">
<select class="form-control" name="canlibuzhokeyi" style="float: right;">
<option value="1" <? if($ayar_bilgi['canlibuzhokeyi']==1){ ?>selected<? } ?>><?=getTranslation('yeniyerler_kasa301')?></option>
<option value="0" <? if($ayar_bilgi['canlibuzhokeyi']==0){ ?>selected<? } ?>><?=getTranslation('yeniyerler_kasa302')?></option>
</select>
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa289')?></label>
<div class="input-group">
<select class="form-control" name="masatenisimbs" style="float: right;">
<option value="1" <? if($ayar_bilgi['masatenisimbs']==1){ ?>selected<? } ?>>1</option>
<option value="2" <? if($ayar_bilgi['masatenisimbs']==2){ ?>selected<? } ?>>2</option>
<option value="3" <? if($ayar_bilgi['masatenisimbs']==3){ ?>selected<? } ?>>3</option>
<option value="4" <? if($ayar_bilgi['masatenisimbs']==4){ ?>selected<? } ?>>4</option>
<option value="5" <? if($ayar_bilgi['masatenisimbs']==5){ ?>selected<? } ?>>5</option>
</select>
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa290')?></label>
<div class="input-group">
<select class="form-control" name="masatenisi" style="float: right;">
<option value="1" <? if($ayar_bilgi['masatenisi']==1){ ?>selected<? } ?>><?=getTranslation('yeniyerler_kasa301')?></option>
<option value="0" <? if($ayar_bilgi['masatenisi']==0){ ?>selected<? } ?>><?=getTranslation('yeniyerler_kasa302')?></option>
</select>
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa291')?></label>
<div class="input-group">
<select class="form-control" name="canlimasatenisimbs" style="float: right;">
<option value="1" <? if($ayar_bilgi['canlimasatenisimbs']==1){ ?>selected<? } ?>>1</option>
<option value="2" <? if($ayar_bilgi['canlimasatenisimbs']==2){ ?>selected<? } ?>>2</option>
<option value="3" <? if($ayar_bilgi['canlimasatenisimbs']==3){ ?>selected<? } ?>>3</option>
<option value="4" <? if($ayar_bilgi['canlimasatenisimbs']==4){ ?>selected<? } ?>>4</option>
<option value="5" <? if($ayar_bilgi['canlimasatenisimbs']==5){ ?>selected<? } ?>>5</option>
</select>
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa292')?></label>
<div class="input-group">
<select class="form-control" name="canlimasatenisi" style="float: right;">
<option value="1" <? if($ayar_bilgi['canlimasatenisi']==1){ ?>selected<? } ?>><?=getTranslation('yeniyerler_kasa301')?></option>
<option value="0" <? if($ayar_bilgi['canlimasatenisi']==0){ ?>selected<? } ?>><?=getTranslation('yeniyerler_kasa302')?></option>
</select>
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa293')?></label>
<div class="input-group">
<select class="form-control" name="rugbymbs" style="float: right;">
<option value="1" <? if($ayar_bilgi['rugbymbs']==1){ ?>selected<? } ?>>1</option>
<option value="2" <? if($ayar_bilgi['rugbymbs']==2){ ?>selected<? } ?>>2</option>
<option value="3" <? if($ayar_bilgi['rugbymbs']==3){ ?>selected<? } ?>>3</option>
<option value="4" <? if($ayar_bilgi['rugbymbs']==4){ ?>selected<? } ?>>4</option>
<option value="5" <? if($ayar_bilgi['rugbymbs']==5){ ?>selected<? } ?>>5</option>
</select>
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa294')?></label>
<div class="input-group">
<select class="form-control" name="rugby" style="float: right;">
<option value="1" <? if($ayar_bilgi['rugby']==1){ ?>selected<? } ?>><?=getTranslation('yeniyerler_kasa301')?></option>
<option value="0" <? if($ayar_bilgi['rugby']==0){ ?>selected<? } ?>><?=getTranslation('yeniyerler_kasa302')?></option>
</select>
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa295')?></label>
<div class="input-group">
<select class="form-control" name="beyzbolmbs" style="float: right;">
<option value="1" <? if($ayar_bilgi['beyzbolmbs']==1){ ?>selected<? } ?>>1</option>
<option value="2" <? if($ayar_bilgi['beyzbolmbs']==2){ ?>selected<? } ?>>2</option>
<option value="3" <? if($ayar_bilgi['beyzbolmbs']==3){ ?>selected<? } ?>>3</option>
<option value="4" <? if($ayar_bilgi['beyzbolmbs']==4){ ?>selected<? } ?>>4</option>
<option value="5" <? if($ayar_bilgi['beyzbolmbs']==5){ ?>selected<? } ?>>5</option>
</select>
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa296')?></label>
<div class="input-group">
<select class="form-control" name="beyzbol" style="float: right;">
<option value="1" <? if($ayar_bilgi['beyzbol']==1){ ?>selected<? } ?>><?=getTranslation('yeniyerler_kasa301')?></option>
<option value="0" <? if($ayar_bilgi['beyzbol']==0){ ?>selected<? } ?>><?=getTranslation('yeniyerler_kasa302')?></option>
</select>
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa297')?></label>
<div class="input-group">
<select class="form-control" name="dovusmbs" style="float: right;">
<option value="1" <? if($ayar_bilgi['dovusmbs']==1){ ?>selected<? } ?>>1</option>
<option value="2" <? if($ayar_bilgi['dovusmbs']==2){ ?>selected<? } ?>>2</option>
<option value="3" <? if($ayar_bilgi['dovusmbs']==3){ ?>selected<? } ?>>3</option>
<option value="4" <? if($ayar_bilgi['dovusmbs']==4){ ?>selected<? } ?>>4</option>
<option value="5" <? if($ayar_bilgi['dovusmbs']==5){ ?>selected<? } ?>>5</option>
</select>
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa298')?></label>
<div class="input-group">
<select class="form-control" name="dovus" style="float: right;">
<option value="1" <? if($ayar_bilgi['dovus']==1){ ?>selected<? } ?>><?=getTranslation('yeniyerler_kasa301')?></option>
<option value="0" <? if($ayar_bilgi['dovus']==0){ ?>selected<? } ?>><?=getTranslation('yeniyerler_kasa302')?></option>
</select>
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa299')?></label>
<div class="input-group">
<select class="form-control" name="hentbolmbs" style="float: right;">
<option value="1" <? if($ayar_bilgi['hentbolmbs']==1){ ?>selected<? } ?>>1</option>
<option value="2" <? if($ayar_bilgi['hentbolmbs']==2){ ?>selected<? } ?>>2</option>
<option value="3" <? if($ayar_bilgi['hentbolmbs']==3){ ?>selected<? } ?>>3</option>
<option value="4" <? if($ayar_bilgi['hentbolmbs']==4){ ?>selected<? } ?>>4</option>
<option value="5" <? if($ayar_bilgi['hentbolmbs']==5){ ?>selected<? } ?>>5</option>
</select>
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa300')?></label>
<div class="input-group">
<select class="form-control" name="hentbol" style="float: right;">
<option value="1" <? if($ayar_bilgi['hentbol']==1){ ?>selected<? } ?>><?=getTranslation('yeniyerler_kasa301')?></option>
<option value="0" <? if($ayar_bilgi['hentbol']==0){ ?>selected<? } ?>><?=getTranslation('yeniyerler_kasa302')?></option>
</select>
</div>
</div>

</div>
</div>
</div>


<div class="col-sm-12">
<div class="card card-block">
<button type="submit" name="submit" id="kaydet" class="btn btn-large btn-primary"><?=getTranslation('yaziciayar48')?></button>
<input type="hidden" id="ussecure" name="usec" value="0">
<input type="hidden" id="normuser" name="normuser" value="<?=$ubilgi['username']; ?>">
</form>
</div>
</div>

</div>
</div>
</main>

<script>
function secenekaktifle(val,val2){
	$('#'+val).slideDown('fast');
	document.getElementById(''+val+'2').setAttribute('onclick', 'secenekpasifle(\''+val+'\',\''+val2+'\');');
	$('#'+val+'2').html(''+val2+' <i class="fa fa-angle-double-left" style="float: right;margin-top: 1%;font-size: 16px;font-weight: bold;"></i>');
}

function secenekpasifle(val,val2){
	$("#"+val).slideUp('fast');
	document.getElementById(''+val+'2').setAttribute('onclick', 'secenekaktifle(\''+val+'\',\''+val2+'\');');
	$('#'+val+'2').html(''+val2+' <i class="fa fa-angle-double-down" style="float: right;margin-top: 1%;font-size: 16px;font-weight: bold;"></i>');
}

$(document).ready(function(e) {
    $("#kaydet").click(function(e) {
    var f = self.document.newu;
	var normuser = $("#normuser").val();
	if(f.user.value.length<2) { alertify.error('<?=getTranslation('playersuserediting24')?>'); f.user.select(); } else
	if(f.sifre.value.length<1) { alertify.error('<?=getTranslation('playersuserediting25')?>'); f.sifre.focus(); } else
	if(f.usec.value=="0" && normuser!=f.user.value) { alertify.error('<?=getTranslation('playersuserediting26')?>'); f.user.select(); } else {
	f.submit();
	}
    });
});
</script>

</div>
</div>
</div>

<?php include 'footer.php'; ?>

</body>
</html>