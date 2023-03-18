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
<li class="breadcrumb-item"><?=getTranslation('yeniyerler_kasa183')?></li>
</ol>

<div id="bahisler"></div>

</main>

<input type="hidden" id="order" value="username">
<input type="hidden" id="ascdesc" value="asc">
<input type="hidden" id="defotime" value="<?=$ub['id']; ?>">

<script>
function bahisler(spor_tip,lig,sayfaveri) {
var rand = Math.random();
$.get('../ajax_superadmin.php?a=bahisler&sayfa='+sayfaveri+'&spor_tip='+spor_tip+'&lig='+lig+'&rand='+rand+'',function(data) { 
$("#bahisler").html(data);
});	
}
$(document).ready(function(e) {
bahisler(0);
});
</script>
<?php include 'footer.php'; ?>

</body>
</html>