<?
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:../login.php"); die(); exit(); }
if($ub['alt_durum']<1 && $ub['wkyetki']<1 && $ub['alt_alt_durum']<1 && $ub['sahip']=="0") { header("Location:index.php"); }
if($ub['adminpanel']=="1") { header("Location:admin"); }
rebuild($ub['id']);

?>
<? include 'header.php'; ?>
<? include 'menu.php'; ?>
<script>$('#bahisler2').addClass("activemnuitems")</script>

<div id="main" class="lwkSelector" style="width: 758px;">
<div id="live">
<div class="space_20"></div>
<div class="main_space" id="main_wide">
<div class="z-right-container" id="maskcontainer">


<div id="bahisler"></div>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<input type="hidden" id="order" value="username">
<input type="hidden" id="ascdesc" value="asc">
<input type="hidden" id="defotime" value="<?=$ub['id']; ?>">

<script>
function bahisler(spor_tip,lig,sayfaveri) {
$("#bahisler").html('<div id="delay_layer" class="overlay_layer"><div class="innerWrap"><div class="contentBlock"><div class="headline"><?=getTranslation('lutfen1')?> <span class="highlighted"><?=getTranslation('lutfen2')?></span></div><div class="bodyText"><?=getTranslation('lutfen3')?></div><div class="progressbar"><div class="progressbarInner"></div></div></div></div></div>');
var rand = Math.random();
$.get('../ajax_players.php?a=bahisler&sayfa='+sayfaveri+'&spor_tip='+spor_tip+'&lig='+lig+'&rand='+rand+'',function(data) { 
$("#bahisler").html(data);
});	
}
$(document).ready(function(e) {
bahisler(0);
});
</script>
<? include 'footer.php'; ?>

</body>
</html>