<?
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); die(); exit(); }
if($ub['adminpanel']=="1") { header("Location:admin"); }
?>
<? include 'header.php'; ?>
<? include 'menu.php'; ?>

<script>
$("#kupondegisimlog").addClass("activemnuitems");
</script>

<div id="main" class="lwkSelector" style="width: 758px;">
<div id="live">
<div class="space_20"></div>
<div class="main_space" id="main_wide">
<table style="width:98%" class="filterTable">
<tbody>
<tr>
<td class="filtersCell1 l" style="width:125px" nowrap="">
<input class="inputText tcal tcalInput" type="text" style="width:90px" id="tarih1" name="tarih1" autocomplete="off" value="<?=date("01-m-Y"); ?>">
</td>
<td class="filtersCell1 l" style="width:125px" nowrap="">
<input autocomplete="off" class="inputText tcal tcalInput" type="text" style="width:90px" id="tarih2" name="tarih2" value="<?=date("d-m-Y"); ?>">
</td>

<td class="filtersCell1 l" style="width:110px" nowrap="">
<input class="inputText" placeholder="<?=getTranslation('playerskuponno')?>" type="text" style="width:90px" name="kid" id="kid" value="">
</td>

<td class="filtersCell1" style="width: 310px;">&nbsp;</td>

<td class="filtersCell1">
<button class="btn btn-primary" onclick="kuponraporgetir(1,1);">Ara</button>
</td>

</tr>
</tbody>
</table>

<div id="kupons"></div>

<script>
function kuponraporgetir(val, sayfaveri) {
if(val=="1") {
$("#suanval").val(1);
$("#kupons").html('<div id="delay_layer" class="overlay_layer"><div class="innerWrap"><div class="contentBlock"><div class="headline"><?=getTranslation('lutfen1')?> <span class="highlighted"><?=getTranslation('lutfen2')?></span></div><div class="bodyText"><?=getTranslation('lutfen3')?></div><div class="progressbar"><div class="progressbarInner"></div></div></div></div></div>');
}
var rand = Math.random();
var tarih1 = $("#tarih1").val();
var tarih2 = $("#tarih2").val();
var kid = $("#kid").val();
$.get('../ajax_players.php?a=kupondegisimlog&sayfa='+sayfaveri+'&kid='+kid+'&tarih1='+tarih1+'&tarih2='+tarih2+'',function(data) { $("#kupons").html(data); });
}
$(document).ready(function(e) {
kuponraporgetir(1,1);
});
</script>

</div>
</div>
</div>
</div>
</div>
</div>

<? include 'footer.php'; ?>


</body>
</html>