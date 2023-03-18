<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); die(); exit(); }
if($ub['alt_durum']<1 && $ub['wkyetki']<1 && $ub['alt_alt_durum']<1 && $ub['sahip']=="0") { header("Location:index.php"); }
if($ayar['casino_yetki']!='1') { header("Location:../"); }
rebuild($ub['id']);

?>
<?php include 'header.php'; ?>

<main class="main">
<ol class="breadcrumb mb-0">
<li class="breadcrumb-item"><?=getTranslation('yeniyerler_kasa329')?></li>
</ol>

<div id="casinodallari"></div>

</main>

<script>
function casinodallari(id) {
var rand = Math.random();
$.get('../ajax_superadmin.php?a=casinodallari&id=<?=$ub['id'];?>&rand='+rand+'',function(data) { 
$("#casinodallari").html(data);
});	
}
$(document).ready(function(e) {
casinodallari('<?=$ub['id']; ?>');
});
</script>
<?php include 'footer.php'; ?>

</body>
</html>