<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); die(); exit(); }
if($ub['alt_durum']<1 && $ub['wkyetki']<1 && $ub['alt_alt_durum']<1 && $ub['sahip']=="0") { header("Location:index.php"); }
if($ub['adminpanel']=="1") { header("Location:admin"); }
rebuild($ub['id']);
?>
<?php include 'header.php'; ?>

<main class="main">
<ol class="breadcrumb mb-0">
<li class="breadcrumb-item">Kupon Raporları</li>
</ol>
<div class="alert alert-danger mb-0" id="error"></div>
<div class="alert alert-info mb-0" id="info"></div>
<div class="alert alert-success mb-0" id="success"></div>
<div class="container-fluid mt-2">
<div class="row">
<div class="card">

<div class="card-header">
<div class="row">

<div class="col-sm-2">
<input class="form-control tcal tcalInput" type="text" style="width:75%" id="tarih1" name="tarih1" autocomplete="off" value="<?=date("d-m-Y",strtotime('-1 Day')); ?>">
</div>

<div class="col-sm-2">
<input autocomplete="off" class="form-control tcal tcalInput" type="text" style="width:75%" id="tarih2" name="tarih2" value="<?=date("d-m-Y"); ?>">
</div>

<div class="col-sm-2">
<? if($ub['wkyetki']<2) { ?>
<?
$bayilerim = benimbayilerim($ub['id']);
?>
<select class="form-control" tabindex="3" style="width: 100%;" id="k_user">

<? if($ub['alt_durum']>0) { ?>

<optgroup style="text-transform: uppercase;color:red;" label="<?=$ub['username'];?>">
<option style="color:#000;text-transform: none;" value=""><?=getTranslation('tumhesaplar')?></option>
<?
$sor = sed_sql_query("select * from kullanici where hesap_sahibi_id='".$ub['id']."' and root='0' order by id asc");
if(sed_sql_numrows($sor)>0) {
while($row=sed_sql_fetcharray($sor)) {
?>
<option style="color:#000;text-transform: none;" value="<?=$row['id'];?>"><?=$row['username']; ?></option>
<? } ?>
<? } ?>
</optgroup>

<?
$sor = sed_sql_query("select * from kullanici where hesap_sahibi_id='".$ub['id']."' and root='0' and wkyetki='1' order by id asc");
if(sed_sql_numrows($sor)>0) {
while($row=sed_sql_fetcharray($sor)) {
?>

<optgroup style="text-transform: uppercase;color:red;" label="<?=$row['username'];?>">
<option style="color:#000;text-transform: none;" value="<?=$row['id'];?>-plus"><?=getTranslation('tumhesaplar')?></option>
<option style="color:#000;text-transform: none;" value="<?=$row['id'];?>"><?=$row['username']; ?></option>

<?
$sor2 = sed_sql_query("select username,id,wkyetki from kullanici where hesap_sahibi_id='".$row['id']."'");
if(sed_sql_numrows($sor2)>0) {
while($row2=sed_sql_fetcharray($sor2)) {
?>
<option style="color:#000;text-transform: none;" value="<?=$row2['id'];?><? if($row2['wkyetki']==1){ ?>-plus<? } ?>"> -> <?=$row2['username']; ?></option>
<? } ?>
<? } ?>

</optgroup>

<? } ?>
<? } ?>
<? } else if($ub['wkyetki']==1) { ?>

<optgroup style="text-transform: uppercase;color:red;" label="<?=$ub['username'];?>">
<option style="color:#000;text-transform: none;" value=""><?=getTranslation('tumhesaplar')?></option>
<option style="color:#000;text-transform: none;" value="<?=$ub['id'];?>"><?=$ub['username'];?></option>
<?
$sor = sed_sql_query("select * from kullanici where hesap_sahibi_id='".$ub['id']."' and root='0' order by id asc");
if(sed_sql_numrows($sor)>0) {
while($row=sed_sql_fetcharray($sor)) {
?>
<option style="color:#000;text-transform: none;" value="<?=$row['id'];?>"><?=$row['username']; ?></option>
<? } ?>
<? } ?>
</optgroup>
<? } ?>

</select>
<? } ?>
</div>

<div class="col-sm-2">
<select class="form-control" tabindex="3" style="width: 100%;" id="k_satir">
<option value=""><?=getTranslation('selectoptiontumu')?></option>
<option value="1"><?=getTranslation('selectoptiontekli')?></option>
<option value="kombine"><?=getTranslation('selectoptionkombine')?></option>
<option value="2"><?=getTranslation('selectoptionikili')?></option>
<option value="3"><?=getTranslation('selectoption3veuzeri')?></option>
</select>
</div>

<div class="col-sm-2">
<select class="form-control" tabindex="3" style="width: 100%;" id="k_tip">
<option value=""><?=getTranslation('selectoptionraporhepsi')?></option>
<option value="1"><?=getTranslation('selectoptionrapornormal')?></option>
<option value="2"><?=getTranslation('selectoptionraporcanli')?></option>
</select>
</div>

<div class="col-sm-2">
<button class="btn btn-success btn-block" style="margin-top: auto;" onclick="raporgetir(1);">Ara</button>
</div>

</div>
</div>

<div id="kupons"></div>

</div>
</div>
</main>

<script>
function raporgetir(val) {
if(val=="1") {
$("#suanval").val(1);
}
var rand = Math.random();
var tarih1 = $("#tarih1").val();
var tarih2 = $("#tarih2").val();
var islemtip = $("#islemtip").val();
var useri = $("#k_user").val();
var satir = $("#k_satir").val();
var tip = $("#k_tip").val();
$.get('../ajax_superadmin.php?a=komisyonraporu&useri='+useri+'&tarih1='+tarih1+'&tarih2='+tarih2+'&satir='+satir+'&tip='+tip+'',function(data) { $("#kupons").html(data); });
}
$(document).ready(function(e) {
raporgetir(1);
});

</script>

<?php include 'footer.php'; ?>


</body>
</html>