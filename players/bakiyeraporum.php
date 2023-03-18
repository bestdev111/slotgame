<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); die(); exit(); }
if($ub['wkyetki']<2) { header("Location:index.php"); }
if($ub['adminpanel']=="1") { header("Location:admin"); }

?>
<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>

<script>
$("#bakiyeraporu").addClass("activemnuitems");
</script>

<div id="main" class="lwkSelector" style="width: 758px;">
<div id="live">
<div class="space_20"></div>
<div class="main_space" id="main_wide">
<table style="width:98%" class="filterTable">
<tbody>
<tr>

<td class="filtersCell1 l" style="width:125px" nowrap="">
<input type="text" style="width:90px" class="inputText tcal tcalInput" id="tarih1" name="tarih1" autocomplete="off" value="<?=date("d-m-Y",strtotime("Last Tuesday")); ?>">
</td>

<td class="filtersCell1 l" style="width:125px" nowrap="">
<input autocomplete="off" type="text" style="width:90px" class="inputText tcal tcalInput" id="tarih2" name="tarih2" value="<?=date("d-m-Y"); ?>">
</td>


<td class="filtersCell1 l" style="width:90px" nowrap="">
<select class="inputCombo choiceChosen" tabindex="3" id="islemtip">
<option value=""><?=getTranslation('selectoptionraporhepsi')?></option>
<option value="ekle"><?=getTranslation('selectoptioneklenenler')?></option>
<option value="cikar"><?=getTranslation('selectoptioncikarilanlar')?></option>
</select>
</td>

<td class="filtersCell1 c" style="width:120px" nowrap=""></td>

<td class="filtersCell1 l" style="width:90px" nowrap="">
<button class="btn btn-primary" onclick="raporgetir(1,1);"><?=getTranslation('mobilara')?></button>
</td>

</tr>
</tbody>
</table>

<div id="kupons"></div>

<script>
function raporgetir(val, sayfaveri) {
if(val=="1") {
$("#suanval").val(1);
$("#kupons").html('<div id="delay_layer" class="overlay_layer"><div class="innerWrap"><div class="contentBlock"><div class="headline"><?=getTranslation('lutfen1')?> <span class="highlighted"><?=getTranslation('lutfen2')?></span></div><div class="bodyText"><?=getTranslation('lutfen3')?></div><div class="progressbar"><div class="progressbarInner"></div></div></div></div></div>');
}
var rand = Math.random();
var tarih1 = $("#tarih1").val();
var tarih2 = $("#tarih2").val();
var islemtip = $("#islemtip").val();
$.get('../ajax_players.php?a=bakiyeraporum&sayfa='+sayfaveri+'&tarih1='+tarih1+'&tarih2='+tarih2+'&islemtip='+islemtip+'',function(data) { $("#kupons").html(data); });
}
$(document).ready(function(e) {
raporgetir(1,1);
});
</script>

</div>
</div>
</div>
</div>
</div>
</div>

<?php include '../footer.php'; ?>


</body>
</html>