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
<script>
$("#komisyonraporu").addClass("activemnuitems");
</script>

<div id="main" class="lwkSelector" style="width: 758px;">
<div id="live">
<div class="space_20"></div>
<div class="main_space" id="main_wide">
<table style="width:98%" class="filterTable">
<tbody>
<tr>


<td class="filtersCell1 l" style="width:125px" nowrap="">
<input class="inputText tcal tcalInput" type="text" style="width:90px" id="tarih1" name="tarih1" autocomplete="off" value="<?=date("d-m-Y",strtotime("Last Tuesday")); ?>">
</td>

<td class="filtersCell1 l" style="width:125px" nowrap="">
<input autocomplete="off" class="inputText tcal tcalInput" type="text" style="width:90px" id="tarih2" name="tarih2" value="<?=date("d-m-Y"); ?>">
</td>

<td class="filtersCell1">&nbsp;</td>
<td class="filtersCell1 l" style="width:140px;padding: 0px 10px 0px 0px;" nowrap="">
<? if($ub['wkyetki']<2) { ?>
<?
$bayilerim = benimbayilerim($ub['id']);
?>
<select class="inputCombo choiceChosen" tabindex="3" style="width: 100%;" id="k_user">

<? if($ub['alt_durum']>0) { ?>

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
<? } else if($ub['wkyetki']==1) { ?>

<optgroup style="text-transform: uppercase;color:red;" label="<?=$ub['username'];?>">
<option style="color:#000;text-transform: none;" value=""><?=getTranslation('tumhesaplar')?></option>
<option style="color:#000;text-transform: none;" value="<?=$ub['id'];?>"><?=$ub['username'];?></option>
<?
$sor = sed_sql_query("select * from kullanici where hesap_sahibi_id='".$ub['id']."' and root='0' order by id asc");
if(sed_sql_numrows($sor)>0) {
while($row=sed_sql_fetcharray($sor)) {
?>
<option style="color:#000;text-transform: none;" value="<?=$row['id'];?>"><?=$row['username']; ?></option>
<? } ?>
<? } ?>
</optgroup>
<? } ?>

</select>
<? } ?>
</td>
<td class="filtersCell1 l" style="width:140px;padding: 0px 10px 0px 0px;" nowrap="">
<select class="inputCombo choiceChosen" tabindex="3" style="width: 100%;" id="k_satir">
<option value=""><?=getTranslation('selectoptiontumu')?></option>
<option value="1"><?=getTranslation('selectoptiontekli')?></option>
<option value="kombine"><?=getTranslation('selectoptionkombine')?></option>
<option value="2"><?=getTranslation('selectoptionikili')?></option>
<option value="3"><?=getTranslation('selectoption3veuzeri')?></option>
</select>
</td>

<td class="filtersCell1 l" style="width:140px;padding: 0px 10px 0px 0px;" nowrap="">
<select class="inputCombo choiceChosen" tabindex="3" style="width: 100%;" id="k_tip">
<option value=""><?=getTranslation('selectoptionraporhepsi')?></option>
<option value="1"><?=getTranslation('selectoptionrapornormal')?></option>
<option value="2"><?=getTranslation('selectoptionraporcanli')?></option>
</select>
</td>

<td class="filtersCell1 c" style="width:25px" nowrap="">
<button class="btn btn-primary" onclick="raporgetir(1);">Ara</button>
</td>

</tr>
</tbody>
</table>


<div id="kupons"></div>

<script>
function raporgetir(val) {
if(val=="1") {
$("#suanval").val(1);
$("#kupons").html('<div id="delay_layer" class="overlay_layer"><div class="innerWrap"><div class="contentBlock"><div class="headline"><?=getTranslation('lutfen1')?> <span class="highlighted"><?=getTranslation('lutfen2')?></span></div><div class="bodyText"><?=getTranslation('lutfen3')?></div><div class="progressbar"><div class="progressbarInner"></div></div></div></div></div>');
}
var rand = Math.random();
var tarih1 = $("#tarih1").val();
var tarih2 = $("#tarih2").val();
var islemtip = $("#islemtip").val();
var useri = $("#k_user").val();
var satir = $("#k_satir").val();
var tip = $("#k_tip").val();
$.get('../ajax_players.php?a=komisyonraporu&useri='+useri+'&tarih1='+tarih1+'&tarih2='+tarih2+'&satir='+satir+'&tip='+tip+'',function(data) { $("#kupons").html(data); });
}
$(document).ready(function(e) {
raporgetir(1);
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