<?php
session_start();
include '../db.php';

if (isset($_SESSION['betuser'])) {
    $user = $_SESSION['betuser'];
    $ayar = bilgi("select * from sistemayar where ayar_id=".$_SESSION['betuser']);
} else {
    header("Location:/login.php");
    die();
    exit();
}

if($ub['sahip']=="1") {
	
}

else if($ub['alt_alt_durum']>0) {
	
}

else if ($ub['alt_durum'] < 1 || $ub['sistemayarlaryetki'] == 0 || ($ub['alt_alt_durum'] > 0) || ($ub['sahip'] == "1")) {
    header("Location:index.php");
}

if (isset($_POST['submit'])) {

$sanal_mintutar = pd("sanal_mintutar");
$sanal_maxtutar = pd("sanal_maxtutar");
$sanal_mbs = pd("sanal_mbs");
$sanal_minoran = pd("sanal_minoran");
$sanal_maxoran = pd("sanal_maxoran");

$macbasitutarbulten = pd("macbasitutarbulten");
$macbasitutarcanli = pd("macbasitutarcanli");
$kuponalim = pd("kuponalim");
$max_satir = pd("max_satir");
$min_kupon_tutar = pd("min_kupon_tutar");
$aynikupon_max_tutar = pd("aynikupon_max_tutar");
$min_oran = pd("min_oran");
$maxoran = pd("maxoran");
$max_odeme = pd("max_odeme");
$tekmac_max_tutar = pd("tekmac_max_tutar");
$canli_sure = pd("canli_sure");
if($canli_sure<10){
	$canli_sure = 10;
	$hatavar = 1;
} else {
	$canli_sure = $canli_sure;
	$hatavar = 0;
}

$bahiskombinasyonu = pd("bahiskombinasyonu");
$iptal_limit = pd("iptal_limit");

$iptal_sure = pd("iptal_sure");
$wattsap = pd("wattsap");
$wattsap_sayisi = strlen($wattsap);
if($wattsap!=0 && $wattsap_sayisi<11){
	$hatavar = 2;
}

$canlifutbol = pd("canlifutbol");
$canli_ilkyari_yayindan_kaldir = pd("canli_ilkyari_yayindan_kaldir");
$canli_yayindan_kaldir = pd("canli_yayindan_kaldir");
$orankorumamaxoranver = pd("orankorumamaxoran");

if($orankorumamaxoranver==9999){
	$orankorumamaxoran = pd("elilegirilendeger");
} else {
	$orankorumamaxoran = pd("orankorumamaxoran");
}

$kontrol = sed_sql_query("select * from sistemayar where ayar_id='$ub[id]'");

if (sed_sql_numrows($kontrol) == 0 && $hatavar == 0) {

sed_sql_query("INSERT INTO sistemayar SET
macbasitutarbulten = '".$macbasitutarbulten."',
macbasitutarcanli = '".$macbasitutarcanli."',
kuponalim = '".$kuponalim."',
max_satir = '".$max_satir."',
min_kupon_tutar = '".$min_kupon_tutar."',
aynikupon_max_tutar = '".$aynikupon_max_tutar."',
min_oran = '".$min_oran."',
maxoran = '".$maxoran."',
max_odeme = '".$max_odeme."',
tekmac_max_tutar = '".$tekmac_max_tutar."',
canli_sure = '".$canli_sure."',
bahiskombinasyonu = '".$bahiskombinasyonu."',
iptal_limit = '".$iptal_limit."',
iptal_sure = '".$iptal_sure."',
wattsap = '".$wattsap."',
canlifutbol = '".$canlifutbol."',
canli_ilkyari_yayindan_kaldir = '".$canli_ilkyari_yayindan_kaldir."',
canli_yayindan_kaldir = '".$canli_yayindan_kaldir."',
orankorumamaxoran = '".$orankorumamaxoran."',
sanal_mintutar = '".$sanal_mintutar."',
sanal_maxtutar = '".$sanal_maxtutar."',
sanal_mbs = '".$sanal_mbs."',
sanal_minoran = '".$sanal_minoran."',
sanal_maxoran = '".$sanal_maxoran."',
ayar_id = '".$ub['id']."'");
header("Location:ayarlar.php?onay=1");
} else if ($hatavar == 0) {

sed_sql_query("update sistemayar set 
macbasitutarbulten = '".$macbasitutarbulten."',
macbasitutarcanli = '".$macbasitutarcanli."',
kuponalim = '".$kuponalim."',
max_satir = '".$max_satir."',
min_kupon_tutar = '".$min_kupon_tutar."',
aynikupon_max_tutar = '".$aynikupon_max_tutar."',
min_oran = '".$min_oran."',
maxoran = '".$maxoran."',
max_odeme = '".$max_odeme."',
tekmac_max_tutar = '".$tekmac_max_tutar."',
canli_sure = '".$canli_sure."',
bahiskombinasyonu = '".$bahiskombinasyonu."',
iptal_limit = '".$iptal_limit."',
iptal_sure = '".$iptal_sure."',
wattsap = '".$wattsap."',
canlifutbol = '".$canlifutbol."',
canli_ilkyari_yayindan_kaldir = '".$canli_ilkyari_yayindan_kaldir."',
canli_yayindan_kaldir = '".$canli_yayindan_kaldir."',
orankorumamaxoran = '".$orankorumamaxoran."',
sanal_mintutar = '".$sanal_mintutar."',
sanal_maxtutar = '".$sanal_maxtutar."',
sanal_mbs = '".$sanal_mbs."',
sanal_minoran = '".$sanal_minoran."',
sanal_maxoran = '".$sanal_maxoran."'
where ayar_id='".$ub['id']."'");
header("Location:ayarlar.php?onay=1");
} else if ($hatavar == 2) {
header("Location:ayarlar.php?onay=4");
} else {

sed_sql_query("update sistemayar set 
macbasitutarbulten = '".$macbasitutarbulten."',
macbasitutarcanli = '".$macbasitutarcanli."',
kuponalim = '".$kuponalim."',
max_satir = '".$max_satir."',
min_kupon_tutar = '".$min_kupon_tutar."',
aynikupon_max_tutar = '".$aynikupon_max_tutar."',
min_oran = '".$min_oran."',
maxoran = '".$maxoran."',
max_odeme = '".$max_odeme."',
tekmac_max_tutar = '".$tekmac_max_tutar."',
canli_sure = '".$canli_sure."',
bahiskombinasyonu = '".$bahiskombinasyonu."',
iptal_limit = '".$iptal_limit."',
iptal_sure = '".$iptal_sure."',
wattsap = '".$wattsap."',
canlifutbol = '".$canlifutbol."',
canli_ilkyari_yayindan_kaldir = '".$canli_ilkyari_yayindan_kaldir."',
canli_yayindan_kaldir = '".$canli_yayindan_kaldir."',
orankorumamaxoran = '".$orankorumamaxoran."',
sanal_mintutar = '".$sanal_mintutar."',
sanal_maxtutar = '".$sanal_maxtutar."',
sanal_mbs = '".$sanal_mbs."',
sanal_minoran = '".$sanal_minoran."',
sanal_maxoran = '".$sanal_maxoran."'
where ayar_id='".$ub['id']."'");
header("Location:ayarlar.php?onay=2");
}
}

if (isset($_POST['yasaklikelime'])) {
	$kelime = pd('kelime');
	$user_id = $_SESSION['betuser'];
	$ektarih = date("d.m.Y H:i:s");
	$sql = "INSERT INTO yasak_kelimeler (user_id,user_role,kelime,tarih) VALUES ('".$user_id."', '0', '".$kelime."','".$ektarih."')";
	if(strlen(trim($kelime))>2) {
		sed_sql_query($sql);
		header("Location:ayarlar.php?onay=3");
	}
}

$onaylandi = $_GET['onay'];
?>
<?php include 'header.php'; ?>

<main class="main">
<ol class="breadcrumb mb-0">
<li class="breadcrumb-item"><?=getTranslation('superadmin108')?></li>
</ol>
<div class="container-fluid mt-2">
<div class="row">
<div class="row">

<? if($onaylandi==1) { ?>
<div class="alert alert-success mb-0" id="success" style="display:block;"><?=getTranslation('yaziciayar37')?></div>
<? } else if($onaylandi==2) { ?>
<div class="alert alert-info mb-0" id="info" style="display:block;"><?=getTranslation('yeniyerler_kasa200')?></div>
<? } else if($onaylandi==3) { ?>
<div class="alert alert-success mb-0" id="success" style="display:block;"><?=getTranslation('yeniyerler_kasa201')?></div>
<? } else if($onaylandi==4) { ?>
<div class="alert alert-danger mb-0" id="error" style="display:block;"><?=getTranslation('yeniyerler_kasa202')?></div>
<? } ?>

<div class="container-fluid mt-2">
<div class="row">
<div class="card">

<div class="card-header font-weight-bold"><?=getTranslation('ayardosyasi2')?></div>
<div class="card-block">
<div class="row">
<form name="kelime" method="post">
<div class="form-group col-sm-3">
<label for=""><?=getTranslation('yeniyerler_kasa203')?></label>
<input style="width: 160px;float: left;" class="form-control" type="text" placeholder="<?=getTranslation('yeniyerler_kasa204')?>" name="kelime" />
<button style="float: left;" type="submit" class="btn btn-link btn-sm" type="submit" name="yasaklikelime"><?=getTranslation('ayardosyasi38')?></button>
</div>
</form>

<div class="form-group col-sm-9">
<label for=""><?=getTranslation('yeniyerler_kasa205')?></label>
<?
$sql = "SELECT * FROM yasak_kelimeler WHERE user_id = ".$_SESSION['betuser'] ."";
$sor = sed_sql_query($sql);
$toplam_sayi = 0;
if (sed_sql_numrows($sor) > 0) {
?>
<br>
<? while ($r = sed_sql_fetchassoc($sor)) { $toplam_sayi++; ?>
<span style="border: 1px solid #00F;padding: 5px;margin: 3px;" class="itext-3"><?=$r['kelime'];?> <b><a style="color:#f00;" href="javascript:void(0);" class="yskKelimeDeleteJS" data-id="<?=$r['id'];?>">(<?=getTranslation('playersduyurular11')?>)</a></b></span>
<? if($toplam_sayi==8 || $toplam_sayi==16){ ?>
<br>
<br>
<? } ?>
<? } ?>
<? } else { ?><?=getTranslation('yeniyerler_kasa206')?><? } ?>
</div>

</div>
</div>
</div>
</div>
</div>

<div class="col-sm-6">
<div class="card">
<div class="card-header"><?=getTranslation('yeniyerler_kasa207')?></div>
<div class="card-block">

<form method="post" name="newu">

<div class="form-group">
<label for=""><?=getTranslation('ayardosyasi39')?></label>
<div class="input-group">
<select class="form-control" name="kuponalim"> 
<option <?if($ayar['kuponalim']=="1"){ ?>selected<? } ?> value="1"><?=getTranslation('ayardosyasi40')?></option> 
<option <?if($ayar['kuponalim']=="0"){ ?>selected<? } ?> value="0"><?=getTranslation('ayardosyasi41')?></option>
</select>
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa208')?></label>
<div class="input-group">
<input type="text" class="form-control" name="macbasitutarbulten" value="<?= $ayar['macbasitutarbulten']; ?>">
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa209')?></label>
<div class="input-group">
<input type="text" class="form-control" name="macbasitutarcanli" value="<?= $ayar['macbasitutarcanli']; ?>">
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('ayardosyasi5')?></label>
<div class="input-group">
<input type="text" class="form-control" name="max_satir" value="<?if($ayar['max_satir']>0){?><?= $ayar['max_satir']; ?><? } else { ?>12<? } ?>">
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('ayardosyasi6')?></label>
<div class="input-group">
<select class="form-control" name="min_oran"> 
<option <?if($ayar['min_oran']=="1.01"){ ?>selected<? } else if($ayar['min_oran']=="") { ?>selected<? } ?> value="1.01">1.01</option> 
<option <?if($ayar['min_oran']=="1.02"){ ?>selected<? } ?> value="1.02">1.02</option> 
<option <?if($ayar['min_oran']=="1.03"){ ?>selected<? } ?> value="1.03">1.03</option> 
<option <?if($ayar['min_oran']=="1.04"){ ?>selected<? } ?> value="1.04">1.04</option> 
<option <?if($ayar['min_oran']=="1.05"){ ?>selected<? } ?> value="1.05">1.05</option> 
<option <?if($ayar['min_oran']=="1.06"){ ?>selected<? } ?> value="1.06">1.06</option>
<option <?if($ayar['min_oran']=="1.07"){ ?>selected<? } ?> value="1.07">1.07</option>
<option <?if($ayar['min_oran']=="1.08"){ ?>selected<? } ?> value="1.08">1.08</option>
<option <?if($ayar['min_oran']=="1.09"){ ?>selected<? } ?> value="1.09">1.09</option>
<option <?if($ayar['min_oran']=="1.10"){ ?>selected<? } ?> value="1.10">1.10</option>
<option <?if($ayar['min_oran']=="1.11"){ ?>selected<? } ?> value="1.11">1.11</option>
<option <?if($ayar['min_oran']=="1.12"){ ?>selected<? } ?> value="1.12">1.12</option>
<option <?if($ayar['min_oran']=="1.13"){ ?>selected<? } ?> value="1.13">1.13</option>
<option <?if($ayar['min_oran']=="1.14"){ ?>selected<? } ?> value="1.14">1.14</option>
<option <?if($ayar['min_oran']=="1.15"){ ?>selected<? } ?> value="1.15">1.15</option>
<option <?if($ayar['min_oran']=="1.16"){ ?>selected<? } ?> value="1.16">1.16</option>
<option <?if($ayar['min_oran']=="1.17"){ ?>selected<? } ?> value="1.17">1.17</option>
<option <?if($ayar['min_oran']=="1.18"){ ?>selected<? } ?> value="1.18">1.18</option>
<option <?if($ayar['min_oran']=="1.19"){ ?>selected<? } ?> value="1.19">1.19</option>
<option <?if($ayar['min_oran']=="1.20"){ ?>selected<? } ?> value="1.20">1.20</option>
<option <?if($ayar['min_oran']=="1.21"){ ?>selected<? } ?> value="1.21">1.21</option>
<option <?if($ayar['min_oran']=="1.22"){ ?>selected<? } ?> value="1.22">1.22</option>
<option <?if($ayar['min_oran']=="1.23"){ ?>selected<? } ?> value="1.23">1.23</option>
<option <?if($ayar['min_oran']=="1.24"){ ?>selected<? } ?> value="1.24">1.24</option>
<option <?if($ayar['min_oran']=="1.25"){ ?>selected<? } ?> value="1.25">1.25</option>
<option <?if($ayar['min_oran']=="1.26"){ ?>selected<? } ?> value="1.26">1.26</option>
<option <?if($ayar['min_oran']=="1.27"){ ?>selected<? } ?> value="1.27">1.27</option>
<option <?if($ayar['min_oran']=="1.28"){ ?>selected<? } ?> value="1.28">1.28</option>
<option <?if($ayar['min_oran']=="1.29"){ ?>selected<? } ?> value="1.29">1.29</option>
<option <?if($ayar['min_oran']=="1.30"){ ?>selected<? } ?> value="1.30">1.30</option>
<option <?if($ayar['min_oran']=="1.31"){ ?>selected<? } ?> value="1.31">1.31</option>
<option <?if($ayar['min_oran']=="1.32"){ ?>selected<? } ?> value="1.32">1.32</option>
<option <?if($ayar['min_oran']=="1.33"){ ?>selected<? } ?> value="1.33">1.33</option>
<option <?if($ayar['min_oran']=="1.34"){ ?>selected<? } ?> value="1.34">1.34</option>
<option <?if($ayar['min_oran']=="1.35"){ ?>selected<? } ?> value="1.35">1.35</option>
<option <?if($ayar['min_oran']=="1.36"){ ?>selected<? } ?> value="1.36">1.36</option>
<option <?if($ayar['min_oran']=="1.37"){ ?>selected<? } ?> value="1.37">1.37</option>
<option <?if($ayar['min_oran']=="1.38"){ ?>selected<? } ?> value="1.38">1.38</option>
<option <?if($ayar['min_oran']=="1.39"){ ?>selected<? } ?> value="1.39">1.39</option>
<option <?if($ayar['min_oran']=="1.40"){ ?>selected<? } ?> value="1.40">1.40</option>
<option <?if($ayar['min_oran']=="1.41"){ ?>selected<? } ?> value="1.41">1.41</option>
<option <?if($ayar['min_oran']=="1.42"){ ?>selected<? } ?> value="1.42">1.42</option>
<option <?if($ayar['min_oran']=="1.43"){ ?>selected<? } ?> value="1.43">1.43</option>
<option <?if($ayar['min_oran']=="1.44"){ ?>selected<? } ?> value="1.44">1.44</option>
<option <?if($ayar['min_oran']=="1.45"){ ?>selected<? } ?> value="1.45">1.45</option>
<option <?if($ayar['min_oran']=="1.46"){ ?>selected<? } ?> value="1.46">1.46</option>
<option <?if($ayar['min_oran']=="1.47"){ ?>selected<? } ?> value="1.47">1.47</option>
<option <?if($ayar['min_oran']=="1.48"){ ?>selected<? } ?> value="1.48">1.48</option>
<option <?if($ayar['min_oran']=="1.49"){ ?>selected<? } ?> value="1.49">1.49</option>
<option <?if($ayar['min_oran']=="1.50"){ ?>selected<? } ?> value="1.50">1.50</option>
<option <?if($ayar['min_oran']=="1.51"){ ?>selected<? } ?> value="1.51">1.51</option>
<option <?if($ayar['min_oran']=="1.52"){ ?>selected<? } ?> value="1.52">1.52</option>
<option <?if($ayar['min_oran']=="1.53"){ ?>selected<? } ?> value="1.53">1.53</option>
<option <?if($ayar['min_oran']=="1.54"){ ?>selected<? } ?> value="1.54">1.54</option>
<option <?if($ayar['min_oran']=="1.55"){ ?>selected<? } ?> value="1.55">1.55</option>
<option <?if($ayar['min_oran']=="1.56"){ ?>selected<? } ?> value="1.56">1.56</option>
<option <?if($ayar['min_oran']=="1.57"){ ?>selected<? } ?> value="1.57">1.57</option>
<option <?if($ayar['min_oran']=="1.58"){ ?>selected<? } ?> value="1.58">1.58</option>
<option <?if($ayar['min_oran']=="1.59"){ ?>selected<? } ?> value="1.59">1.59</option>
<option <?if($ayar['min_oran']=="1.60"){ ?>selected<? } ?> value="1.60">1.60</option>
<option <?if($ayar['min_oran']=="1.61"){ ?>selected<? } ?> value="1.61">1.61</option>
<option <?if($ayar['min_oran']=="1.62"){ ?>selected<? } ?> value="1.62">1.62</option>
<option <?if($ayar['min_oran']=="1.63"){ ?>selected<? } ?> value="1.63">1.63</option>
<option <?if($ayar['min_oran']=="1.64"){ ?>selected<? } ?> value="1.64">1.64</option>
<option <?if($ayar['min_oran']=="1.65"){ ?>selected<? } ?> value="1.65">1.65</option>
<option <?if($ayar['min_oran']=="1.66"){ ?>selected<? } ?> value="1.66">1.66</option>
<option <?if($ayar['min_oran']=="1.67"){ ?>selected<? } ?> value="1.67">1.67</option>
<option <?if($ayar['min_oran']=="1.68"){ ?>selected<? } ?> value="1.68">1.68</option>
<option <?if($ayar['min_oran']=="1.69"){ ?>selected<? } ?> value="1.69">1.69</option>
<option <?if($ayar['min_oran']=="1.70"){ ?>selected<? } ?> value="1.70">1.70</option>
<option <?if($ayar['min_oran']=="1.71"){ ?>selected<? } ?> value="1.71">1.71</option>
<option <?if($ayar['min_oran']=="1.72"){ ?>selected<? } ?> value="1.72">1.72</option>
<option <?if($ayar['min_oran']=="1.73"){ ?>selected<? } ?> value="1.73">1.73</option>
<option <?if($ayar['min_oran']=="1.74"){ ?>selected<? } ?> value="1.74">1.74</option>
<option <?if($ayar['min_oran']=="1.75"){ ?>selected<? } ?> value="1.75">1.75</option>
</select>
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('ayardosyasi7')?></label>
<div class="input-group">
<input type="text" class="form-control" name="min_kupon_tutar" value="<?if($ayar['min_kupon_tutar']>0){ ?><?= $ayar['min_kupon_tutar']; ?><? } else { ?>5<? } ?>">
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('ayardosyasi8')?> ( TL )</label>
<div class="input-group">
<input type="text" class="form-control" name="aynikupon_max_tutar" value="<?if($ayar['aynikupon_max_tutar']>0){ ?><?= $ayar['aynikupon_max_tutar']; ?><? } else { ?>10000<? } ?>">
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('ayardosyasi9')?></label>
<div class="input-group">
<input type="text" class="form-control" name="maxoran" value="<?if($ayar['maxoran']>0){ ?><?= $ayar['maxoran']; ?><? } else { ?>100<? } ?>">
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('ayardosyasi10')?> ( TL )</label>
<div class="input-group">
<input type="text" class="form-control" name="max_odeme" value="<?if($ayar['max_odeme']>0){ ?><?= $ayar['max_odeme']; ?><? } else { ?>10000<? } ?>">
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('ayardosyasi11')?> ( TL )</label>
<div class="input-group">
<input type="text" class="form-control" name="tekmac_max_tutar" value="<?if($ayar['tekmac_max_tutar']>0){ ?><?= $ayar['tekmac_max_tutar']; ?><? } else { ?>5000<? } ?>">
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('ayardosyasi19')?> ( <?=getTranslation('ayardosyasi20')?> )</label>
<div class="input-group">
<input type="text" class="form-control" name="iptal_limit" value="<?if($ayar['iptal_limit']>0){ ?><?= $ayar['iptal_limit']; ?><? } else { ?>10<? } ?>">
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('ayardosyasi21')?> ( <?=getTranslation('ayardosyasi37')?> )</label>
<div class="input-group">
<input type="text" class="form-control" name="iptal_sure" value="<?if($ayar['iptal_sure']>0){ ?><?= $ayar['iptal_sure']; ?><? } else { ?>2<? } ?>">
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('ayardosyasi22')?></label>
<div class="input-group">
<input class="form-control" type="text" name="wattsap" id="wattsap" maxlength="11" value="<?= $ayar['wattsap']; ?>">
<span class="itext-3"><?=getTranslation('ayardosyasi23')?></span>
</div>
</div>


</div>
</div>
</div>

<script>
function degerver(val){
	if(val==9999){
		$('#eldegeri').show();
		$('#eldegeri2').show();
	} else {
		$('#eldegeri').hide();
		$('#eldegeri2').hide();
	}
}
</script>

<div class="col-sm-6">
<div class="card">
<div class="card-header"><?=getTranslation('yeniyerler_kasa490')?></div>
<div class="card-block">

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa491')?></label>
<div class="input-group">
<input type="text" class="form-control" name="sanal_mintutar" value="<?=$ayar['sanal_mintutar']; ?>">
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa492')?></label>
<div class="input-group">
<input type="text" class="form-control" name="sanal_maxtutar" value="<?=$ayar['sanal_maxtutar']; ?>">
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa493')?></label>
<div class="input-group">
<select class="form-control" name="sanal_mbs">
<option value="1" <? if($ayar['sanal_mbs']==1){ ?> selected <? } ?>>1</option>
<option value="2" <? if($ayar['sanal_mbs']==2){ ?> selected <? } ?>>2</option>
<option value="3" <? if($ayar['sanal_mbs']==3){ ?> selected <? } ?>>3</option>
<option value="4" <? if($ayar['sanal_mbs']==4){ ?> selected <? } ?>>4</option>
<option value="5" <? if($ayar['sanal_mbs']==5){ ?> selected <? } ?>>5</option>
</select>
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa494')?></label>
<div class="input-group">
<input type="text" class="form-control" name="sanal_minoran" value="<?=$ayar['sanal_minoran']; ?>">
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa495')?></label>
<div class="input-group">
<input type="text" class="form-control" name="sanal_maxoran" value="<?=$ayar['sanal_maxoran']; ?>">
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('playersayar23')?></label>
<div class="input-group">
<select class="form-control" name="canlifutbol">
<option value="1" <? if($ayar['canlifutbol']==1){ ?> selected <? } ?>><?=getTranslation('playersayar24')?></option>
<option value="2" <? if($ayar['canlifutbol']==2){ ?> selected <? } ?>><?=getTranslation('playersayar25')?></option>
</select>
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('playersayar26')?></label>
<div class="input-group">
<select class="form-control" name="orankorumamaxoran" onchange="degerver(this.value);void(0);">
<option value="9999"><?=getTranslation('playersayar27')?></option>
<option value="1" <? if($ayar['orankorumamaxoran']==1){ ?> selected <? } ?>>1</option>
<option value="2" <? if($ayar['orankorumamaxoran']==2){ ?> selected <? } ?>>2</option>
<option value="3" <? if($ayar['orankorumamaxoran']==3){ ?> selected <? } ?>>3</option>
<option value="4" <? if($ayar['orankorumamaxoran']==4){ ?> selected <? } ?>>4</option>
<option value="5" <? if($ayar['orankorumamaxoran']==5){ ?> selected <? } ?>>5</option>
<option value="6" <? if($ayar['orankorumamaxoran']==6){ ?> selected <? } ?>>6</option>
<option value="7" <? if($ayar['orankorumamaxoran']==7){ ?> selected <? } ?>>7</option>
<option value="8" <? if($ayar['orankorumamaxoran']==8){ ?> selected <? } ?>>8</option>
<option value="9" <? if($ayar['orankorumamaxoran']==9){ ?> selected <? } ?>>9</option>
<option value="10" <? if($ayar['orankorumamaxoran']==10){ ?> selected <? } ?>>10</option>
<option value="11" <? if($ayar['orankorumamaxoran']==11){ ?> selected <? } ?>>11</option>
<option value="12" <? if($ayar['orankorumamaxoran']==12){ ?> selected <? } ?>>12</option>
<option value="13" <? if($ayar['orankorumamaxoran']==13){ ?> selected <? } ?>>13</option>
<option value="14" <? if($ayar['orankorumamaxoran']==14){ ?> selected <? } ?>>14</option>
<option value="15" <? if($ayar['orankorumamaxoran']==15){ ?> selected <? } ?>>15</option>
<option value="16" <? if($ayar['orankorumamaxoran']==16){ ?> selected <? } ?>>16</option>
<option value="17" <? if($ayar['orankorumamaxoran']==17){ ?> selected <? } ?>>17</option>
<option value="18" <? if($ayar['orankorumamaxoran']==18){ ?> selected <? } ?>>18</option>
<option value="19" <? if($ayar['orankorumamaxoran']==19){ ?> selected <? } ?>>19</option>
<option value="20" <? if($ayar['orankorumamaxoran']==20){ ?> selected <? } ?>>20</option>
<option value="22" <? if($ayar['orankorumamaxoran']==22){ ?> selected <? } ?>>22</option>
<option value="22" <? if($ayar['orankorumamaxoran']==22){ ?> selected <? } ?>>22</option>
<option value="23" <? if($ayar['orankorumamaxoran']==23){ ?> selected <? } ?>>23</option>
<option value="24" <? if($ayar['orankorumamaxoran']==24){ ?> selected <? } ?>>24</option>
<option value="25" <? if($ayar['orankorumamaxoran']==25){ ?> selected <? } ?>>25</option>
<option value="26" <? if($ayar['orankorumamaxoran']==26){ ?> selected <? } ?>>26</option>
<option value="27" <? if($ayar['orankorumamaxoran']==27){ ?> selected <? } ?>>27</option>
<option value="28" <? if($ayar['orankorumamaxoran']==28){ ?> selected <? } ?>>28</option>
<option value="29" <? if($ayar['orankorumamaxoran']==29){ ?> selected <? } ?>>29</option>
<option value="30" <? if($ayar['orankorumamaxoran']==30){ ?> selected <? } ?>>30</option>
<option value="33" <? if($ayar['orankorumamaxoran']==33){ ?> selected <? } ?>>33</option>
<option value="32" <? if($ayar['orankorumamaxoran']==32){ ?> selected <? } ?>>32</option>
<option value="33" <? if($ayar['orankorumamaxoran']==33){ ?> selected <? } ?>>33</option>
<option value="34" <? if($ayar['orankorumamaxoran']==34){ ?> selected <? } ?>>34</option>
<option value="35" <? if($ayar['orankorumamaxoran']==35){ ?> selected <? } ?>>35</option>
<option value="36" <? if($ayar['orankorumamaxoran']==36){ ?> selected <? } ?>>36</option>
<option value="37" <? if($ayar['orankorumamaxoran']==37){ ?> selected <? } ?>>37</option>
<option value="38" <? if($ayar['orankorumamaxoran']==38){ ?> selected <? } ?>>38</option>
<option value="39" <? if($ayar['orankorumamaxoran']==39){ ?> selected <? } ?>>39</option>
<option value="40" <? if($ayar['orankorumamaxoran']==40){ ?> selected <? } ?>>40</option>
<option value="44" <? if($ayar['orankorumamaxoran']==44){ ?> selected <? } ?>>44</option>
<option value="42" <? if($ayar['orankorumamaxoran']==42){ ?> selected <? } ?>>42</option>
<option value="43" <? if($ayar['orankorumamaxoran']==43){ ?> selected <? } ?>>43</option>
<option value="44" <? if($ayar['orankorumamaxoran']==44){ ?> selected <? } ?>>44</option>
<option value="45" <? if($ayar['orankorumamaxoran']==45){ ?> selected <? } ?>>45</option>
<option value="46" <? if($ayar['orankorumamaxoran']==46){ ?> selected <? } ?>>46</option>
<option value="47" <? if($ayar['orankorumamaxoran']==47){ ?> selected <? } ?>>47</option>
<option value="48" <? if($ayar['orankorumamaxoran']==48){ ?> selected <? } ?>>48</option>
<option value="49" <? if($ayar['orankorumamaxoran']==49){ ?> selected <? } ?>>49</option>
<option value="50" <? if($ayar['orankorumamaxoran']==50){ ?> selected <? } ?>>50</option>
<option value="55" <? if($ayar['orankorumamaxoran']==55){ ?> selected <? } ?>>55</option>
<option value="52" <? if($ayar['orankorumamaxoran']==52){ ?> selected <? } ?>>52</option>
<option value="53" <? if($ayar['orankorumamaxoran']==53){ ?> selected <? } ?>>53</option>
<option value="54" <? if($ayar['orankorumamaxoran']==54){ ?> selected <? } ?>>54</option>
<option value="55" <? if($ayar['orankorumamaxoran']==55){ ?> selected <? } ?>>55</option>
<option value="56" <? if($ayar['orankorumamaxoran']==56){ ?> selected <? } ?>>56</option>
<option value="57" <? if($ayar['orankorumamaxoran']==57){ ?> selected <? } ?>>57</option>
<option value="58" <? if($ayar['orankorumamaxoran']==58){ ?> selected <? } ?>>58</option>
<option value="59" <? if($ayar['orankorumamaxoran']==59){ ?> selected <? } ?>>59</option>
<option value="60" <? if($ayar['orankorumamaxoran']==60){ ?> selected <? } ?>>60</option>
<option value="66" <? if($ayar['orankorumamaxoran']==66){ ?> selected <? } ?>>66</option>
<option value="62" <? if($ayar['orankorumamaxoran']==62){ ?> selected <? } ?>>62</option>
<option value="63" <? if($ayar['orankorumamaxoran']==63){ ?> selected <? } ?>>63</option>
<option value="64" <? if($ayar['orankorumamaxoran']==64){ ?> selected <? } ?>>64</option>
<option value="65" <? if($ayar['orankorumamaxoran']==65){ ?> selected <? } ?>>65</option>
<option value="66" <? if($ayar['orankorumamaxoran']==66){ ?> selected <? } ?>>66</option>
<option value="67" <? if($ayar['orankorumamaxoran']==67){ ?> selected <? } ?>>67</option>
<option value="68" <? if($ayar['orankorumamaxoran']==68){ ?> selected <? } ?>>68</option>
<option value="69" <? if($ayar['orankorumamaxoran']==69){ ?> selected <? } ?>>69</option>
<option value="70" <? if($ayar['orankorumamaxoran']==70){ ?> selected <? } ?>>70</option>
<option value="77" <? if($ayar['orankorumamaxoran']==77){ ?> selected <? } ?>>77</option>
<option value="72" <? if($ayar['orankorumamaxoran']==72){ ?> selected <? } ?>>72</option>
<option value="73" <? if($ayar['orankorumamaxoran']==73){ ?> selected <? } ?>>73</option>
<option value="74" <? if($ayar['orankorumamaxoran']==74){ ?> selected <? } ?>>74</option>
<option value="75" <? if($ayar['orankorumamaxoran']==75){ ?> selected <? } ?>>75</option>
<option value="76" <? if($ayar['orankorumamaxoran']==76){ ?> selected <? } ?>>76</option>
<option value="77" <? if($ayar['orankorumamaxoran']==77){ ?> selected <? } ?>>77</option>
<option value="78" <? if($ayar['orankorumamaxoran']==78){ ?> selected <? } ?>>78</option>
<option value="79" <? if($ayar['orankorumamaxoran']==79){ ?> selected <? } ?>>79</option>
<option value="80" <? if($ayar['orankorumamaxoran']==80){ ?> selected <? } ?>>80</option>
<option value="88" <? if($ayar['orankorumamaxoran']==88){ ?> selected <? } ?>>88</option>
<option value="82" <? if($ayar['orankorumamaxoran']==82){ ?> selected <? } ?>>82</option>
<option value="83" <? if($ayar['orankorumamaxoran']==83){ ?> selected <? } ?>>83</option>
<option value="84" <? if($ayar['orankorumamaxoran']==84){ ?> selected <? } ?>>84</option>
<option value="85" <? if($ayar['orankorumamaxoran']==85){ ?> selected <? } ?>>85</option>
<option value="86" <? if($ayar['orankorumamaxoran']==86){ ?> selected <? } ?>>86</option>
<option value="87" <? if($ayar['orankorumamaxoran']==87){ ?> selected <? } ?>>87</option>
<option value="88" <? if($ayar['orankorumamaxoran']==88){ ?> selected <? } ?>>88</option>
<option value="89" <? if($ayar['orankorumamaxoran']==89){ ?> selected <? } ?>>89</option>
<option value="90" <? if($ayar['orankorumamaxoran']==90){ ?> selected <? } ?>>90</option>
<option value="99" <? if($ayar['orankorumamaxoran']==99){ ?> selected <? } ?>>99</option>
<option value="92" <? if($ayar['orankorumamaxoran']==92){ ?> selected <? } ?>>92</option>
<option value="93" <? if($ayar['orankorumamaxoran']==93){ ?> selected <? } ?>>93</option>
<option value="94" <? if($ayar['orankorumamaxoran']==94){ ?> selected <? } ?>>94</option>
<option value="95" <? if($ayar['orankorumamaxoran']==95){ ?> selected <? } ?>>95</option>
<option value="96" <? if($ayar['orankorumamaxoran']==96){ ?> selected <? } ?>>96</option>
<option value="97" <? if($ayar['orankorumamaxoran']==97){ ?> selected <? } ?>>97</option>
<option value="98" <? if($ayar['orankorumamaxoran']==98){ ?> selected <? } ?>>98</option>
<option value="99" <? if($ayar['orankorumamaxoran']==99){ ?> selected <? } ?>>99</option>
<option value="100" <? if($ayar['orankorumamaxoran']==100){ ?> selected <? } ?>>100</option>
</select>

<input <? if($ayar['orankorumamaxoran']<101){ ?>style="text-align:center;width:65px;display:none;"<? } else { ?>style="text-align:center;width:65px;"<? } ?> id="eldegeri" type="text" class="form-control"  name="elilegirilendeger" value="<? if($ayar['orankorumamaxoran']<101){ ?>101<? } else { ?><?=$ayar['orankorumamaxoran'];?><? } ?>">
<span <? if($ayar['orankorumamaxoran']<101){ ?>style="display:none;padding:6px;"<? } ?> style="padding:6px;" id="eldegeri2" class="itext-3"><?=getTranslation('playersayar28')?></span>

<br><br>
<span class="itext-3"><?=getTranslation('playersayar29')?></span>

</div>
</div>


<div class="form-group">
<label for=""><?=getTranslation('ayardosyasi12')?></label>
<div class="input-group">
<select class="form-control" name="canli_sure"> 
<option <?if($ayar['canli_sure']=="1"){ ?>selected<? } ?> value="1">1 <?=getTranslation('ayardosyasi13')?></option> 
<option <?if($ayar['canli_sure']=="2"){ ?>selected<? } ?> value="2">2 <?=getTranslation('ayardosyasi13')?></option> 
<option <?if($ayar['canli_sure']=="3"){ ?>selected<? } ?> value="3">3 <?=getTranslation('ayardosyasi13')?></option> 
<option <?if($ayar['canli_sure']=="4"){ ?>selected<? } ?> value="4">4 <?=getTranslation('ayardosyasi13')?></option> 
<option <?if($ayar['canli_sure']=="5"){ ?>selected<? } ?> value="5">5 <?=getTranslation('ayardosyasi13')?></option> 
<option <?if($ayar['canli_sure']=="6"){ ?>selected<? } ?> value="6">6 <?=getTranslation('ayardosyasi13')?></option> 
<option <?if($ayar['canli_sure']=="7"){ ?>selected<? } ?> value="7">7 <?=getTranslation('ayardosyasi13')?></option> 
<option <?if($ayar['canli_sure']=="8"){ ?>selected<? } ?> value="8">8 <?=getTranslation('ayardosyasi13')?></option> 
<option <?if($ayar['canli_sure']=="9"){ ?>selected<? } ?> value="9">9 <?=getTranslation('ayardosyasi13')?></option> 
<option <?if($ayar['canli_sure']=="10"){ ?>selected<? } else if($ayar['canli_sure']=="") { ?>selected<? } ?> value="10">10 <?=getTranslation('ayardosyasi13')?></option> 
<option <?if($ayar['canli_sure']=="11"){ ?>selected<? } ?> value="11">11 <?=getTranslation('ayardosyasi13')?></option> 
<option <?if($ayar['canli_sure']=="12"){ ?>selected<? } ?> value="12">12 <?=getTranslation('ayardosyasi13')?></option> 
<option <?if($ayar['canli_sure']=="13"){ ?>selected<? } ?> value="13">13 <?=getTranslation('ayardosyasi13')?></option> 
<option <?if($ayar['canli_sure']=="14"){ ?>selected<? } ?> value="14">14 <?=getTranslation('ayardosyasi13')?></option> 
<option <?if($ayar['canli_sure']=="15"){ ?>selected<? } ?> value="15">15 <?=getTranslation('ayardosyasi13')?></option> 
<option <?if($ayar['canli_sure']=="16"){ ?>selected<? } ?> value="16">16 <?=getTranslation('ayardosyasi13')?></option>
<option <?if($ayar['canli_sure']=="17"){ ?>selected<? } ?> value="17">17 <?=getTranslation('ayardosyasi13')?></option>
<option <?if($ayar['canli_sure']=="18"){ ?>selected<? } ?> value="18">18 <?=getTranslation('ayardosyasi13')?></option>
<option <?if($ayar['canli_sure']=="19"){ ?>selected<? } ?> value="19">19 <?=getTranslation('ayardosyasi13')?></option>
<option <?if($ayar['canli_sure']=="20"){ ?>selected<? } ?> value="20">20 <?=getTranslation('ayardosyasi13')?></option>
</select>
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('ayardosyasi16')?></label>
<div class="input-group">
<select class="form-control" name="bahiskombinasyonu">
<option value="1" <? if($ayar['bahiskombinasyonu']==1){ ?> selected <? } ?>><?=getTranslation('ayardosyasi17')?></option>
<option value="2" <? if($ayar['bahiskombinasyonu']==2){ ?> selected <? } ?>><?=getTranslation('ayardosyasi18')?></option>
</select>
</div>
</div>

<?

if($ayar['canli_ilkyari_yayindan_kaldir']>0){
$canli_yayindan_kaldir_iy_ver = $ayar['canli_ilkyari_yayindan_kaldir'];
} else {
$canli_yayindan_kaldir_iy_ver = 44;
}


if($ayar['canli_yayindan_kaldir']>0){
$canli_yayindan_kaldir_ver = $ayar['canli_yayindan_kaldir'];
} else {
$canli_yayindan_kaldir_ver = 89;
}

?>

<div class="form-group">
<label for=""><?=getTranslation('playersayar212')?></label>
<div class="input-group">
<select class="form-control" name="canli_ilkyari_yayindan_kaldir">
<? for ($i = 1; $i < 46; $i++) { ?>
<option value="<?= $i; ?>" <? if ($canli_yayindan_kaldir_iy_ver == $i) { echo "selected"; } ?>><?= $i; ?>.<?=getTranslation('playersayar213')?></option>
<? } ?>
<option value="75" <? if ($ayar['canli_ilkyari_yayindan_kaldir'] == 75) { echo "selected"; } ?>><?=getTranslation('playersayar214')?></option>
</select>
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('playersayar215')?></label>
<div class="input-group">
<select class="form-control" name="canli_yayindan_kaldir">
<? for ($i = 45; $i < 91; $i++) { ?>
<option value="<?= $i; ?>" <? if ($canli_yayindan_kaldir_ver == $i) { echo "selected"; } ?>><?= $i; ?>.<?=getTranslation('playersayar213')?></option>
<? } ?>
<option value="125" <? if ($ayar['canli_yayindan_kaldir'] == 125) { echo "selected"; } ?>><?=getTranslation('playersayar214')?></option>
</select>
</div>
</div>

</div>
</div>
</div>

<div class="col-sm-12">
<div class="card card-block">
<input class="btn btn-large btn-primary" id="kaydet" type="submit" name="submit" value="<?=getTranslation('playersayar218')?>">
</div>
</div>
</form>

</div>
</div>
</div>
</main>

<script>
$(document).ready(function (e) {
$("#kaydet").click(function (e) {
self.document.newu.submit();
});
});
$(document).on("click", ".yskKelimeDeleteJS", function (e){
e.preventDefault();
var self = $(this);
var id = self.data("id");
if (typeof(id) != "undefined") {
if (confirm("<?=getTranslation('ayardosyasi36')?>")){
$.get("../ajax_superadmin.php?a=yasaklikelimesil&id=" + id, function(data) {
var pr = self.parents("span");
pr.remove();
});
return false;
}
}
});
</script>

<?php include 'footer.php'; ?>

</body>
</html>