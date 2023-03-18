<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); die(); exit(); }
if($ub['alt_durum']<1 && $ub['wkyetki']<1 && $ub['alt_alt_durum']<1 && $ub['sahip']=="0") { header("Location:index.php"); }
if($ub['adminpanel']=="1") { header("Location:admin"); }
rebuild($ub['id']);

?>
<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>

<script>$("#spordallari2").addClass("activemnuitems");</script>

<div id="main" class="lwkSelector" style="width: 758px;">
<div id="live">
<div class="space_20"></div>
<div class="main_space" id="main_wide">
<script>$('#acmen_9').addClass("active")</script>
<div class="z-right-container" id="maskcontainer">


<div id="spordallari"></div>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<script>
function spordallari(id) {
$("#spordallari").html('<div id="delay_layer" class="overlay_layer"><div class="innerWrap"><div class="contentBlock"><div class="headline"><?=getTranslation('lutfen1')?> <span class="highlighted"><?=getTranslation('lutfen2')?></span></div><div class="bodyText"><?=getTranslation('lutfen3')?></div><div class="progressbar"><div class="progressbarInner"></div></div></div></div></div>');
var rand = Math.random();
$.get('../ajax_players.php?a=spordallari&id=<?=$ub['id'];?>&rand='+rand+'',function(data) { 
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