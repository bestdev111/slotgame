<?
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); die(); exit(); }
if($ub['wkyetki']<2) { header("Location:spor-bahisleri"); }
if(userayar('casino_yetki')<1) { header("Location:/players"); }
?>
<? include 'header.php'; ?>
<? include 'menu.php'; ?>

<script>
$("#ckuponraporlari").addClass("activemnuitems");
</script>

<div id="main" class="lwkSelector" style="width: 758px;">
<div id="live">
<div class="space_20"></div>
<div class="main_space" id="main_wide">
<table style="width:98%" class="filterTable">
<tbody>
<tr>
<td class="filtersCell1 l" style="width:110px" nowrap="">
<input class="inputText" type="text" placeholder="<?=getTranslation('playerskuponno')?>" style="width:90px" name="kid" id="kid" value="">
</td>
<td class="filtersCell1 l" style="width:125px" nowrap="">
<input class="inputText tcal tcalInput" type="text" style="width:90px" id="tarih1" name="tarih1" autocomplete="off" value="<?=date("d-m-Y",strtotime("Last Tuesday")); ?>">
</td>
<td class="filtersCell1 l" style="width:125px" nowrap="">
<input autocomplete="off" class="inputText tcal tcalInput" type="text" style="width:90px" id="tarih2" name="tarih2" value="<?=date("d-m-Y"); ?>">
</td>

<td class="filtersCell1 l" style="width:150px" nowrap="">
<select class="inputCombo chosen" tabindex="3" style="width: 80%;" id="islemtip">
<option value=""><?=getTranslation('ajaxbahisler7')?></option>
<option value="cikar"><?=getTranslation('selectoptionkuponyatirma')?></option>
<option value="ekle"><?=getTranslation('selectoptionkuponkazanc')?></option>
<option value="iptal"><?=getTranslation('selectoptionkuponiptal')?></option>
</select>
</td>

<td class="filtersCell1 l">
<button class="btn btn-primary" onclick="kuponraporgetir(1,1,'<?=$dil_bilgisi['language'];?>');"><?=getTranslation('mobilara')?></button>
</td>

</tr>
</tbody>
</table>

<div id="kupons"></div>

<script>
function kuponraporgetir(val, sayfaveri, dil) {
if(val=="1") {
$("#suanval").val(1);
$("#kupons").html('<div id="delay_layer" class="overlay_layer"><div class="innerWrap"><div class="contentBlock"><div class="headline"><?=getTranslation('lutfen1')?> <span class="highlighted"><?=getTranslation('lutfen2')?></span></div><div class="bodyText"><?=getTranslation('lutfen3')?></div><div class="progressbar"><div class="progressbarInner"></div></div></div></div></div>');
}
var rand = Math.random();
var tarih1 = $("#tarih1").val();
var tarih2 = $("#tarih2").val();
var islemtip = $("#islemtip").val();
$.get('../ajax_players.php?a=ckuponraporum&sayfa='+sayfaveri+'&tarih1='+tarih1+'&tarih2='+tarih2+'&islemtip='+islemtip+'&dil='+dil+'',function(data) { $("#kupons").html(data); });
}
$(document).ready(function(e) {
kuponraporgetir(1,1,'<?=$dil_bilgisi['language'];?>');
});
</script>

</div>
</div>
</div>
</div>
</div>
</div>

<? include '../footer.php'; ?>


</body>
</html>