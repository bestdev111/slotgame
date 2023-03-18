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
<li class="breadcrumb-item">Spor Dalları</li>
</ol>


<div id="spordallari"></div>

</main>

<script>
function spordallari(id) {
var rand = Math.random();
$.get('../ajax_superadmin.php?a=spordallari&id=<?=$ub['id'];?>&rand='+rand+'',function(data) { 
$("#spordallari").html(data);
});	
}
$(document).ready(function(e) {
spordallari('<?=$ub['id']; ?>');
});
</script>
<?php include 'footer.php'; ?>

</body>
</html>