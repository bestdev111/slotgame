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
<li class="breadcrumb-item"><?=getTranslation('yeniyerler_kasa211')?></li>
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
<input class="form-control tcal tcalInput" style="text-align:center;" type="text" id="tarih1" name="tarih1" autocomplete="off" value="<?=date("01-m-Y"); ?>">
</div>

<div class="col-sm-2">
<input class="form-control tcal tcalInput" style="text-align:center;" type="text" id="tarih2" name="tarih2" autocomplete="off" value="<?=date("d-m-Y"); ?>">
</div>

<div class="col-sm-2">
<input class="form-control" type="text" name="kid" id="kid" placeholder="Kupon No" value="">
</div>

<div class="col-sm-2">
<button class="btn btn-success btn-block" style="margin-top: auto;" onclick="kuponraporgetir(1,1);"><?=getTranslation('yeniyerler_kasa42')?></button>
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
function kuponraporgetir(val, sayfaveri) {
if(val=="1") {
$("#suanval").val(1);
}
var rand = Math.random();
var tarih1 = $("#tarih1").val();
var tarih2 = $("#tarih2").val();
var kid = $("#kid").val();
$.get('../ajax_superadmin.php?a=kupondegisimlog&sayfa='+sayfaveri+'&kid='+kid+'&tarih1='+tarih1+'&tarih2='+tarih2+'',function(data) { $("#kupons").html(data); });
}

function raporlama(val) {
if(val=="1") {
$("#tarih1").val('<?=$buhafta_tarih1;?>');
$("#tarih2").val('<?=$buhafta_tarih2;?>');	
kuponraporgetir(1,1);
} else if(val=="2") {
$("#tarih1").val('<?=$buay_tarih1;?>');
$("#tarih2").val('<?=$buay_tarih2;?>');	
kuponraporgetir(1,1);
} else if(val=="3") {
$("#tarih1").val('<?=$gecen_hafta_1_ver;?>');
$("#tarih2").val('<?=$gecen_hafta_2_ver;?>');	
kuponraporgetir(1,1);
}
}


$(document).ready(function(e) {
kuponraporgetir(1,1);
});

</script>

<?php include 'footer.php'; ?>

</body>
</html>