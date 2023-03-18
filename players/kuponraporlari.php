<?
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); die(); exit(); }
if($ub['adminpanel']=="1") { header("Location:admin"); }
?>
<? include 'header.php'; ?>
<? include 'menu.php'; ?>

<script>
$("#kuponraporlari").addClass("activemnuitems");
</script>

<div id="main" class="lwkSelector" style="width: 758px;">
<div id="live">
<div class="space_20"></div>
<div class="main_space" id="main_wide">
<table style="width:98%" class="filterTable">
<tbody>
<tr>
<td class="filtersCell1 l" style="width:105px" nowrap="">
<input class="inputText" placeholder="<?=getTranslation('playerskuponno')?>" type="text" style="width:90px" name="kid" id="kid" value="">
</td>
<td class="filtersCell1 l" style="width:120px" nowrap="">
<input class="inputText tcal tcalInput" type="text" style="width:90px" id="tarih1" name="tarih1" autocomplete="off" value="<?=date("d-m-Y",strtotime("Last Tuesday")); ?>">
</td>
<td class="filtersCell1 l" style="width:118px" nowrap="">
<input autocomplete="off" class="inputText tcal tcalInput" type="text" style="width:90px" id="tarih2" name="tarih2" value="<?=date("d-m-Y"); ?>">
</td>

<td class="filtersCell1">&nbsp;</td>
<td class="filtersCell1 l" style="width:145px" nowrap="">


<?
$bayilerim = benimbayilerim($ub['id']);
?>
<select class="inputCombo chosen" tabindex="3" style="width: 97%;" id="hesap_islemi">

<? if($ub['alt_durum']>0 && $ub['alt_alt_durum']>0) { ?>

<optgroup style="text-transform: uppercase;color:red;" label="GENEL">
<option style="color:#000;text-transform: none;" value=""><?=getTranslation('tumhesaplar')?></option>
</optgroup>

<?
$sor = sed_sql_query("select * from kullanici where hesap_sahibi_id='".$ub['id']."' and root='0' order by id asc");
if(sed_sql_numrows($sor)>0) {
while($row=sed_sql_fetcharray($sor)) { ?>

<optgroup style="text-transform: uppercase;color:red;" label="<?=$row['username'];?>">
<option style="color:#000;text-transform: none;" value="<?=$row['id'];?>-plus"><?=$row['username']; ?></option>

<?
$sor2 = sed_sql_query("select username,id,wkyetki from kullanici where hesap_sahibi_id='".$row['id']."'");
if(sed_sql_numrows($sor2)>0) {
while($row2=sed_sql_fetcharray($sor2)) {
?>
<option style="color:#000;text-transform: none;" value="<?=$row2['id'];?><? if($row2['wkyetki']==1){ ?>-plus<? } ?>"> -> <?=$row2['username']; ?></option>
<? } ?>
<? } ?>

</optgroup>

<? } ?>
<? } ?>
<? } else if($ub['alt_durum']>0) { ?>

<optgroup style="text-transform: uppercase;color:red;" label="<?=$ub['username'];?>">
<option style="color:#000;text-transform: none;" value=""><?=getTranslation('tumhesaplar')?></option>
<?
$sor = sed_sql_query("select * from kullanici where hesap_sahibi_id='".$ub['id']."' and root='0' order by id asc");
if(sed_sql_numrows($sor)>0) {
while($row=sed_sql_fetcharray($sor)) {
?>
<option style="color:#000;text-transform: none;" value="<?=$row['id'];?>"><?=$row['username']; ?></option>
<? } ?>
<? } ?>
</optgroup>

<?
$sor = sed_sql_query("select * from kullanici where hesap_sahibi_id='".$ub['id']."' and root='0' and wkyetki='1' order by id asc");
if(sed_sql_numrows($sor)>0) {
while($row=sed_sql_fetcharray($sor)) {
?>

<optgroup style="text-transform: uppercase;color:red;" label="<?=$row['username'];?>">
<option style="color:#000;text-transform: none;" value="<?=$row['id'];?>-plus"><?=getTranslation('tumhesaplar')?></option>
<option style="color:#000;text-transform: none;" value="<?=$row['id'];?>"><?=$row['username']; ?></option>

<?
$sor2 = sed_sql_query("select username,id,wkyetki from kullanici where hesap_sahibi_id='".$row['id']."'");
if(sed_sql_numrows($sor2)>0) {
while($row2=sed_sql_fetcharray($sor2)) {
?>
<option style="color:#000;text-transform: none;" value="<?=$row2['id'];?><? if($row2['wkyetki']==1){ ?>-plus<? } ?>"> -> <?=$row2['username']; ?></option>
<? } ?>
<? } ?>

</optgroup>

<? } ?>
<? } ?>
<? } ?>

</select>
</td>
<td class="filtersCell1 l" style="width:175px" nowrap="">
<select class="inputCombo chosen" tabindex="3" style="width: 80%;" id="islemtip">
<option value=""><?=getTranslation('selectoptiontumu')?></option>
<option value="cikar"><?=getTranslation('selectoptionkuponyatirma')?></option>
<option value="ekle"><?=getTranslation('selectoptionkuponkazanc')?></option>
<option value="iptal"><?=getTranslation('selectoptionkuponiptal')?></option>
</select>
</td>

<td class="filtersCell1 l" style="width:175px" nowrap="">
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
var kupon_id = $("#kid").val();
var tarih1 = $("#tarih1").val();
var tarih2 = $("#tarih2").val();
var islemtip = $("#islemtip").val();
var useri = $("#hesap_islemi").val();
$.get('../ajax_players.php?a=kuponraporlari&sayfa='+sayfaveri+'&kupon_id='+kupon_id+'&tarih1='+tarih1+'&tarih2='+tarih2+'&islemtip='+islemtip+'&useri='+useri+'',function(data) { $("#kupons").html(data); });
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