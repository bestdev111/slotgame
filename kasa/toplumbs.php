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
<li class="breadcrumb-item"><?=getTranslation('yeniyerler_kasa196')?></li>
</ol>

<div id="toplumbs"></div>

</main>

<input type="hidden" id="order" value="username">
<input type="hidden" id="ascdesc" value="asc">
<input type="hidden" id="defotime" value="<?=$ub['id']; ?>">

<script>
function toplumbs() {
var rand = Math.random();
$.get('../ajax_superadmin.php?a=toplumbs&rand='+rand+'',function(data) { 
$("#toplumbs").html(data);
});	
}
$(document).ready(function(e) {
toplumbs();
});
</script>
<?php include 'footer.php'; ?>

</body>
</html>