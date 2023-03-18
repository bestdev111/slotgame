<?php
session_start(); ob_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); die(); exit(); }
if($ub['wkdurum']!="0" || $ub['alt_durum']<1) { 
header("Location:index.php");
exit();
}
if($ub['adminpanel']=="1") { header("Location:admin"); }

if(gd('islem')=="disariat"){
	$fark = time()-101;
	$sorgu = sed_sql_query("UPDATE kullanici SET atdisari='1',sonislem='".$fark."' WHERE id ='".gd('id')."'")or die(sed_sql_error());
	if($sorgu){
		$onaylandi = 1;
	}else{
		$onaylandi = 2;
	}
}


?>
<?php include 'header.php'; ?>

<main class="main">
<ol class="breadcrumb mb-0">
<li class="breadcrumb-item"><?=getTranslation('sistemdekiler3')?></li>
</ol>

<? if($onaylandi==1) { ?>
<div class="alert alert-success mb-0" id="success" style="display: block;"><?=getTranslation('sistemdekiler1')?></div>
<? } else if($onaylandi==2) { ?>
<div class="alert alert-danger mb-0" id="error" style="display: block;"><?=getTranslation('sistemdekiler2')?></div>
<? } ?>

<div class="container-fluid mt-2">
<div class="row">
<div class="card">

<div id="sistemdekiler"></div>

</div>
</div>
</main>

<script>
var xhr;
setInterval(function() { 
sistemdekilergetir();
},10000);
function sistemdekilergetir() {
xhr = $.ajax({
url: '../ajax_superadmin.php?a=sistemdekiler',
success: function(data) {
$("#sistemdekiler").html(data);
}
});
}
$(document).ready(function(e) {
sistemdekilergetir();
});
</script>

<?php include 'footer.php'; ?>

</body>
</html>