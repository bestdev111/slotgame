<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); die(); exit(); }
if($ub['alt_durum']!=1 && $ub['alt_alt_durum']!=0) { header("Location:index.php"); }

$toplam_kullanicim = sed_sql_numrows(sed_sql_query("select hesap_sahibi_id,root from kullanici where hesap_sahibi_id='$ub[id]' and root='0'"));
$toplams_limitm = bilgi("SELECT SUM(CASE WHEN id!='' THEN alt_sinir END) as toplam_limitm FROM kullanici WHERE hesap_sahibi_id='$ub[id]' and root='0'");
$alt_sinirini_bul2 = $ub['alt_sinir']-$toplams_limitm['toplam_limitm']-$toplam_kullanicim;

if(isset($_POST['submit'])){
$tip = pd("tip");
$adet = pd("adet");
$userid = pd("userid");
$bayilerim = "".benimbayilerim($userid)."";
$bayi_array = explode(",",$bayilerim);
$ouser = bilgi("select * from kullanici where id='$userid'");

$toplam_kullanici = sed_sql_numrows(sed_sql_query("select hesap_sahibi_id,root from kullanici where hesap_sahibi_id='$userid' and root='0'"));
$toplams_limit = bilgi("SELECT SUM(CASE WHEN id!='' THEN alt_sinir END) as toplam_limit FROM kullanici WHERE hesap_sahibi_id='$userid' and root='0'");
$alt_sinirini_bul = $ouser['alt_sinir']-$toplams_limit['toplam_limit']-$toplam_kullanici;

if(!in_array($userid,$bayi_array) || !is_numeric($userid)) {

$onaylandi = 1;//BUNA YETKİLİ DEĞİLSİNİZ !

} else if($tip=='ekle') {

if($alt_sinirini_bul2<$adet){
	
	$onaylandi = 6;//BAYİye KREDİ EKLEMEK İSTEDİĞİNİZ KADAR LİMİTİNİZ YOKTUR

} else {
	
	sed_sql_query("update kullanici set alt_sinir=alt_sinir+$adet where id='$userid'");
	
	$onaylandi = 2;//KREDİ EKLENMİŞTİR.

}

} else if($tip=='cikar') {

if($alt_sinirini_bul<$adet){
	
	$onaylandi = 5;//BAYİDEN ÇIKARTMAK İSTEDİĞİNİZ KADAR LİMİTİ YOKTUR BAYİNİN

} else {

	sed_sql_query("update kullanici set alt_sinir=alt_sinir-$adet where id='$userid'");

	$onaylandi = 3;//KREDİ ÇIKARTILMIŞTIR.

}

} else {

$onaylandi = 4;//İŞLEM SEÇİNİZ !

}

}

?>
<?php include 'header.php'; ?>

<main class="main">
<ol class="breadcrumb mb-0">
<li class="breadcrumb-item"><?=getTranslation('playerskrediekle23')?></li>
</ol>
</div>
</div>

<? if($onaylandi==1) { ?>
<div class="alert alert-danger mb-0" id="error" style="display:block;"><?=getTranslation('playerskrediekle1')?></div>
<? } else if($onaylandi==2) { ?>
<div class="alert alert-success mb-0" id="success" style="display:block;"><?=getTranslation('playerskrediekle2')?></div>
<? } else if($onaylandi==3) { ?>
<div class="alert alert-success mb-0" id="success" style="display:block;"><?=getTranslation('playerskrediekle3')?></div>
<? } else if($onaylandi==4) { ?>
<div class="alert alert-danger mb-0" id="error" style="display:block;"><?=getTranslation('playerskrediekle4')?></div>
<? } else if($onaylandi==5) { ?>
<div class="alert alert-info mb-0" id="info" style="display:block;"><?=getTranslation('playerskrediekle5')?></div>
<? } else if($onaylandi==6) { ?>
<div class="alert alert-info mb-0" id="info" style="display:block;"><?=getTranslation('playerskrediekle6')?><?=$alt_sinirini_bul2;?><?=getTranslation('playerskrediekle7')?></div>
<? } ?>

<div class="container-fluid mt-2">
<div class="row">
<div class="row">
<form id="dealer-form" method="post" name="newu">
<div class="col-sm-6">
<div class="card">
<div class="card-header">
Kullanıcı İşlemi
</div>
<div class="card-block">
<div class="form-group">
<label for="">KULLANICI</label>
<?
$bayilerim = benimbayilerim($ub['id']);
?>
<select class="form-control" tabindex="3" id="userid" name="userid">

<?
$sor = sed_sql_query("select * from kullanici where hesap_sahibi_id='".$ub['id']."' and root='0' order by id asc");
if(sed_sql_numrows($sor)>0) {
while($row=sed_sql_fetcharray($sor)) { ?>
<option style="color:#000;text-transform: none;" value="<?=$row['id'];?>"><?=$row['username']; ?></option>
<? } ?>
<? } ?>

</select>
</div>
<div class="form-group">
<label for=""><?=getTranslation('playerskrediekle10')?></label>
<select class="form-control" tabindex="3" id="tip" name="tip">
<option value="islemsec">----------------</option>
<option value="ekle"><?=getTranslation('playerskrediekle11')?></option>
<option value="cikar"><?=getTranslation('playerskrediekle12')?></option>
</select>
</div>
<div class="form-group">
<label for="">LİMİT</label>
<input class="form-control" type="text" name="adet" id="adet" maxlength="5" value="">
</div>
<div class="form-group">
<button type="submit" class="btn btn-success" name="submit"  id="kaydet">ONAYLA</button>
</div>
</div>
</div>
</div>
</form>

<div class="col-sm-6">
<div class="card">
<div class="card-header">
Kullanıcı Bilgileri
</div>
<div class="card-block">
<div class="form-group">
<label for="" style="width:50%">Kullanıcı Adı</label>
<label for="" style="width:18%;text-align: center;">Mevcut Limiti</label>
<label for="" style="width:18%;text-align: center;">Kalan Limiti</label>
</div>
<div class="form-check mt-2">

<?
$sor = sed_sql_query("select * from kullanici where hesap_sahibi_id='".$ub['id']."' and root='0' order by id asc");
if(sed_sql_numrows($sor)>0) {
while($row=sed_sql_fetcharray($sor)) { 
$toplam_kullanici = sed_sql_numrows(sed_sql_query("select hesap_sahibi_id,root from kullanici where hesap_sahibi_id='$row[id]' and root='0'"));
$toplams_limit = bilgi("SELECT SUM(CASE WHEN id!='' THEN alt_sinir END) as toplam_limit FROM kullanici WHERE hesap_sahibi_id='$row[id]' and root='0'");
$alt_sinirini_bul = $row['alt_sinir']-$toplams_limit['toplam_limit']-$toplam_kullanici;
?>
<label for="" style="width:50%;border-bottom: 1px solid;"><?=$row['username']; ?></label>
<label for="" style="width:18%;text-align: center;border-bottom: 1px solid;"><?=$row['alt_sinir']; ?></label>
<label for="" style="width:18%;text-align: center;border-bottom: 1px solid;"><?=$alt_sinirini_bul; ?></label>
<? } ?>
<? } else { ?>
<label for="" style="width:50%">Bayiniz Bulunmamaktadır.</label>
<label for="" style="width:18%;text-align: center;">--</label>
<label for="" style="width:18%;text-align: center;">--</label>
<? } ?>

</div>
</div>
</div>
</div>
</div>
</div>
</div>

<script>
$(document).ready(function(e) {
    $("#kaydet").click(function(e) {
	f.submit();
    });
});
</script>

<?php include 'footer.php'; ?>

</body>
</html>