<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); die(); exit(); }
if($ub['wkyetki']>0 || $ub['alt_alt_durum']<1) { header("Location:../index.php"); }
?>
<?php include 'header.php'; ?>

<main class="main">
<ol class="breadcrumb mb-0">
<li class="breadcrumb-item">Rulet Aç/Kapat</li>
</ol>

<div id="ruletliste"></div>

</main>

<script>
function ruletliste() {
var rand = Math.random();
$.get('../ajax_superadmin.php?a=ruletackapat&rand='+rand+'',function(data) { 
$("#ruletliste").html(data);
});	
}
$(document).ready(function(e) {
ruletliste();
});
</script>
<?php include 'footer.php'; ?>

</body>
</html>