<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); die(); exit(); }
if($ub['adminpanel']=="1") { header("Location:admin"); }

$buhafta_tarih1 = date("d-m-Y",strtotime('Last Tuesday'));
$buhafta_tarih2 = date("d-m-Y",strtotime('Monday'));

$buay_tarih1 = date("01-m-Y");
$buay_tarih2 = date("d-m-Y");

$gecen_hafta_tarihle_1 = date("d-m-Y",strtotime('Last Tuesday'));
$gecen_hafta_tarihle_2 = date("d-m-Y",strtotime('Monday'));
$newDate = strtotime('-7 day',strtotime($gecen_hafta_tarihle_1));
$newDate2 = strtotime('-7 day',strtotime($gecen_hafta_tarihle_2));
$gecen_hafta_1_ver = date("d-m-Y",$newDate);
$gecen_hafta_2_ver = date("d-m-Y",$newDate2);

?>
<?php include 'header.php'; ?>

<main class="main">
<ol class="breadcrumb mb-0">
<li class="breadcrumb-item">Rapor Detay</li>
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
<input type="text" class="form-control pickadate picker__input tcal tcalInput" id="tarih1" name="tarih1" autocomplete="off" value="<?=date("d-m-Y",strtotime('Last Tuesday')); ?>" size="7" style="text-align:center;">
</div>

<div class="col-sm-2">
<input type="text" class="form-control pickadate picker__input tcal tcalInput" id="tarih2" name="tarih2" autocomplete="off" value="<?=date("d-m-Y"); ?>" size="7" style="text-align:center;">
</div>

<?
$bayilerim = benimbayilerim($ub['id']);
?>
<div class="col-sm-2">
<select class="form-control" style="width:150px;" name="userid" id="userid">
<optgroup style="text-transform: uppercase;color:red;" label="<?=getTranslation('superadmin182')?>">
<option style="color:#000;text-transform: none;" value=""><?=getTranslation('tumhesaplar')?></option>
</optgroup>

<?
$sor = sed_sql_query("select * from kullanici where hesap_sahibi_id='".$ub['id']."' and root='0' order by id asc");
if(sed_sql_numrows($sor)>0) {
while($row=sed_sql_fetcharray($sor)) { ?>

<optgroup style="text-transform: uppercase;color:red;" label="<?=$row['username'];?>">
<option style="color:#000;text-transform: none;" <? if($userid=="".$row['id']."-plus"){ ?>selected<? } ?> value="<?=$row['id'];?>-plus"><?=getTranslation('tumhesaplar')?></option>
<option style="color:#000;text-transform: none;" <? if($userid==$row['id']){ ?>selected<? } ?> value="<?=$row['id'];?>"><?=$row['username']; ?></option>

<?
$sor2 = sed_sql_query("select username,id,wkyetki from kullanici where hesap_sahibi_id='".$row['id']."'");
if(sed_sql_numrows($sor2)>0) {
while($row2=sed_sql_fetcharray($sor2)) {
if($row2['wkyetki']==1){
$yetkilidir = "".$row2['id']."-plus";
} else {
$yetkilidir = $row2['id'];
}
?>
<option style="color:#000;text-transform: none;" <? if($userid==$yetkilidir){ ?>selected<? } ?> value="<?=$row2['id'];?><? if($row2['wkyetki']==1){ ?>-plus<? } ?>"> -> <?=$row2['username']; ?></option>
<? } ?>
<? } ?>

</optgroup>

<? } ?>
<? } ?>
</select>
</div>

<div class="col-sm-2">
<input type="hidden" id="order" value="id">
<input type="hidden" id="ascdesc" value="desc">
<button class="btn btn-success btn-block" style="margin-top: auto;" onclick="raporgetir(1);"><?=getTranslation('yeniyerler_kasa42')?></button>
</div>

<div class="col-sm-4">
<a href="javascript:;" onclick="raporlama(1);" class="btn btn-link" style="margin-top:2px"><?=getTranslation('yeniyerler_kasa43')?></a>
<a href="javascript:;" onclick="raporlama(2);" class="btn btn-link" style="margin-top:2px"><?=getTranslation('yeniyerler_kasa44')?></a>
<a href="javascript:;" onclick="raporlama(3);" class="btn btn-link" style="margin-top:2px"><?=getTranslation('yeniyerler_kasa45')?></a>
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
var tarih1 = $("#tarih1").val();
var tarih2 = $("#tarih2").val();
var userid = $("#userid").val();	
var rand = Math.random();
$.get('../ajax_superadmin.php?a=rapordetay&rand='+rand+'&userid='+userid+'&tarih1='+tarih1+'&tarih2='+tarih2+'',function(data) { $("#kupons").html(data); });
}
$(document).ready(function(e) {
raporgetir(1);
});

</script>

<?php include 'footer.php'; ?>

</body>
</html>