<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:../login.php"); exit(); }
$tip_ver = $_GET['tip'];
if($tip_ver==1){
	$sportipi = "FUTBOL";
} else if($tip_ver==2){
	$sportipi = "BASKETBOL";
} else if($tip_ver==3){
	$sportipi = "TENİS";
} else if($tip_ver==4){
	$sportipi = "VOLEYBOL";
} else if($tip_ver==5){
	$sportipi = "BUZ HOKEYİ";
} else if($tip_ver==6){
	$sportipi = "HENTBOL";
}
?>
<?php include 'header.php'; ?>

<div id="page1" class="page top">
<div class="scroll_container" style="min-height: 311px;">
<div class="scroll_wrapper" style="padding-top: 44px; padding-bottom: 44px;">
<div class="appcontent">
<div>  </div>

<div id="loadresultulkeler"></div>

<div class="contentbottom hidden"> </div>
<div class="hidden">  </div>
<div class="spacer">&nbsp;</div>
</div>
</div>
</div>
</div>

<script>
function loadtip(tip,ulke) {
$.get('export.php?a=resultopen&tip='+tip+'&ulke='+ulke+'',function(data) {
$("#loadresultulkeler").html(data);
});
}
loadtip('<?=$_GET['tip'];?>','<?=$_GET['ulke'];?>');
</script>
</div>
</div>

<?php include 'footer.php'; ?>

</body>
</html>