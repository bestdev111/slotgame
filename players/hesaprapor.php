<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); die(); exit(); }
if($ub['adminpanel']=="1") { header("Location:admin"); }
?>
<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>
<script src="/players/js/amcharts.js"></script>
<script src="/players/js/serial.js"></script>
<script>
$("#hesaprapor").addClass("activemnuitems");
</script>

<div id="main" class="lwkSelector" style="width: 758px;">
<div id="live">
<div class="space_20"></div>
<div class="main_space" id="main_wide">
<table style="width:98%" class="filterTable">
<tbody>
<tr>
<td class="filtersCell1 l" style="width:115px" nowrap="">
<input type="text" class="inputText tcal tcalInput" style="width:80px" id="tarih1" name="tarih1" autocomplete="off" value="<?=date("01-m-Y"); ?>" size="7">
</td>
<td class="filtersCell1 l" style="width:115px" nowrap="">
<input autocomplete="off" type="text" class="inputText tcal tcalInput" style="width:80px" id="tarih2" name="tarih2" value="<?=date("d-m-Y"); ?>" size="7">
</td>

<td class="filtersCell1 l" style="width:180px" nowrap="">
<?
$bayilerim = benimbayilerim($ub['id']);
?>
<select class="inputCombo choiceChosen" style="width: 97%;" id="k_userid">

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
</td>

<td class="filtersCell1 l" style="width:85px" nowrap="">
<select class="inputCombo choiceChosen" style="width: 95%;" id="k_tip">
<option value=""><?=getTranslation('selectoptiontumu')?></option>
<option value="1"><?=getTranslation('selectoptionrapornormal')?></option>
<option value="2"><?=getTranslation('selectoptionraporcanli')?></option>
</select>
</td>

<td class="filtersCell1 l" style="width:85px" nowrap="">
<select class="inputCombo choiceChosen" style="width: 95%;" id="k_satir">
<option value=""><?=getTranslation('selectoptiontumu')?></option>
<option value="1"><?=getTranslation('selectoptiontekli')?></option>
<option value="2"><?=getTranslation('selectoptionikili')?></option>
<option value="3"><?=getTranslation('selectoption3veuzeri')?></option>
</select>
</td>

<td class="filtersCell1" style="width: 90px;">&nbsp;</td>

<td class="filtersCell1 c" style="width:20px" nowrap="">
<button class="btn btn-primary" onclick="raporgetir(1,1);">Ara</button>
<input type="hidden" id="order" value="id">
<input type="hidden" id="ascdesc" value="desc">
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
var tarih1 = $("#tarih1").val();
var tarih2 = $("#tarih2").val();
var userid = $("#k_userid").val();
var satir = $("#k_satir").val();
var tip = $("#k_tip").val();	
var rand = Math.random();
var order = $("#order").val();
var asde = $("#ascdesc").val();
$.get('../ajax_players.php?a=hesaprapor&rand='+rand+'&tarih1='+tarih1+'&tarih2='+tarih2+'&userid='+userid+'&satir='+satir+'&tip='+tip+'&order='+order+'&ascdesc='+asde+'',function(data) { $("#kupons").html(data); });
}
$(document).ready(function(e) {
raporgetir(1,1);
});
</script>

</div>
</div>

<div class="clear"></div>
</div>
</div>
</div>
</div>

<br>
<br>

<?php include '../footer.php'; ?>


</body>
</html>