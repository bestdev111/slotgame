<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); die(); exit(); }
?>
<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>

<script>
$("#tumkuponlar").addClass("activemnuitems");
</script>

<div id="main" class="lwkSelector" style="width: 758px;">
<div id="live">
<div class="space_20"></div>
<div class="main_space" id="main_wide" style="margin-left: -20px;margin-top: -8px;">
<div id="comp-myContent" class="e_active e_noCache ">
<div id="mybettings" class="margin_r_12">
<div class="space_20"></div>
<div class="space clear"></div>
<div class="e_active e_noCache status"></div>
<div>

<table class="tab_box_2">
<tbody>	
<tr>
<td colspan="4" style="height: 32px;border: 1px solid #cccccc;width: 100%;display: block;">

<div class="tab_2_cont num_1" style="float:left">
<div class="drop_box" style="line-height: 25px;"><input type="text" class="inputText" placeHolder="Kupon İD" id="k_kuponno" style="width:58px" size="4"></div>


<div class="drop_box">
<input type="text" style="width:58px;border: 1px solid #126f8e;line-height: 23px;" class="firstNameNew ng-invalid ng-invalid-required ng-valid-pattern ng-dirty placeholder tcal tcalInput" id="tarih1" name="tarih1" autocomplete="off" value="<?=date("d-m-Y",strtotime("-1 day")); ?>" size="7">
</div>

<div class="drop_box">
<input autocomplete="off" type="text" style="width:58px;border: 1px solid #126f8e;line-height: 23px;" class="firstNameNew ng-invalid ng-invalid-required ng-valid-pattern ng-dirty placeholder tcal tcalInput" id="tarih2" name="tarih2" value="<?=date("d-m-Y"); ?>" size="7">
</div>

<div class="drop_box">
<?
$bayilerim = benimbayilerim($ub['id']);
?>
<select class="inputCombo chosen" style="width: 100%;" id="k_user">

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
</div>

<div class="drop_box">
<select class="inputCombo chosen" style="width: 100%;" id="k_durum">
<option value=""><?=getTranslation('selectoptionhepsi')?></option>
<option value="1"><?=getTranslation('selectoptionbekleyen')?></option>
<option value="2"><?=getTranslation('selectoptionkazanan')?></option>
<option value="3"><?=getTranslation('selectoptionkaybeden')?></option>
<option value="4"><?=getTranslation('selectoptioniptalolan')?></option>
</select>
</div>

<div class="drop_box">
<select class="inputCombo chosen" style="width: 100%;" id="k_satir">
<option value=""><?=getTranslation('selectoptiontumu')?></option>
<option value="1"><?=getTranslation('selectoptiontekli')?></option>
<option value="kombine"><?=getTranslation('selectoptionkombine')?></option>
<option value="2"><?=getTranslation('selectoptionikili')?></option>
<option value="3"><?=getTranslation('selectoption3veuzeri')?></option>
</select>
</div>

<div class="drop_box">
<select class="inputCombo chosen" style="width: 100%;" id="k_tip">
<option value=""><?=getTranslation('selectoptiontumu')?></option>
<option value="1"><?=getTranslation('selectoptioncanlifutbol')?></option>
<option value="2"><?=getTranslation('selectoptioncanlibasketbol')?></option>
<option value="3"><?=getTranslation('selectoptioncanlitenis')?></option>
<option value="4"><?=getTranslation('selectoptioncanlivoleybol')?></option>
<option value="5"><?=getTranslation('selectoptioncanlibuzhokeyi')?></option>
<option value="6"><?=getTranslation('selectoptioncanlihentbol')?></option>
<option value="7"><?=getTranslation('selectoptionfutbol')?></option>
<option value="8"><?=getTranslation('selectoptionbasketbol')?></option>
<option value="9"><?=getTranslation('selectoptiontenis')?></option>
<option value="10"><?=getTranslation('selectoptionvoleybol')?></option>
<option value="11"><?=getTranslation('selectoptionbuzhokeyi')?></option>
<option value="12"><?=getTranslation('selectoptionhentbol')?></option>
<option value="13"><?=getTranslation('selectoptionsanalfutbol')?></option>
</select>
</div>

<div class="drop_box" style="PADDING: 0px;FLOAT: right;width: 15px;">
<button class="btn btn-primary" onclick="kupongetir(1,1);">Ara</button>
</div>

<input type="hidden" id="order" value="id">
<input type="hidden" id="ascdesc" value="desc">
<input type="hidden" id="suanval" value="1">

</div>
</td>
</tr>
</tbody>
</table>
</div>

<div class="space_9 clear"></div>
<div class="space_9 clear"></div>


<div id="kupons"></div>

<input hidden id="closewarm" value="1">
<script>
var screenw = screen.width;

function kupongoruntule(id) {
$("#kuponid_"+id+"").addClass('itext-0');
$("#cboxOverlay").css('display','block');

if(screenw>600) {
$(".kuponici").css('top','75px');
$(".kuponici").css('left','175px');
$(".kuponici").css('position','fixed');
$(".kuponici").css('width','993px');
$(".kuponici").css('height','400px');
$(".kuponici").css('overflow','hidden');
$(".kuponici").css('opacity','1');
$(".kuponici").css('cursor','auto');
} else {
$(".kuponici").css('top','150px');
$(".kuponici").css('width','993px');
$(".kuponici").css('height','400px');
$(".kuponici").css('overflow','hidden');
$(".kuponici").css('opacity','1');
$(".kuponici").css('cursor','auto');
}

$(".kuponici").css('display','block');
$(".kuponici").html('<div id="delay_layer" class="overlay_layer"><div class="innerWrap"><div class="contentBlock" style="border: dashed;border-color: #f74835;"><div class="headline"><?=getTranslation('lutfen1')?> <span class="highlighted"><?=getTranslation('lutfen2')?></span></div><div class="bodyText"><?=getTranslation('lutfen3')?></div><div class="progressbar"><div class="progressbarInner"></div></div></div></div></div>');
var rand = Math.random();
$.get('../ajax.php?a=kupond&id='+id+'&rand='+rand+'',function(data) { $(".kuponici").html(data); });
}

function kupongoruntulesanal(id) {
$("#kuponid_"+id+"").addClass('itext-0');
$("#cboxOverlay").css('display','block');

if(screenw>600) {
$(".kuponici").css('top','75px');
$(".kuponici").css('left','175px');
$(".kuponici").css('position','fixed');
$(".kuponici").css('width','993px');
$(".kuponici").css('height','400px');
$(".kuponici").css('overflow','hidden');
$(".kuponici").css('opacity','1');
$(".kuponici").css('cursor','auto');
} else {
$(".kuponici").css('top','150px');
$(".kuponici").css('width','993px');
$(".kuponici").css('height','400px');
$(".kuponici").css('overflow','hidden');
$(".kuponici").css('opacity','1');
$(".kuponici").css('cursor','auto');
}

$(".kuponici").css('display','block');
$(".kuponici").html('<div id="delay_layer" class="overlay_layer"><div class="innerWrap"><div class="contentBlock" style="border: dashed;border-color: #f74835;"><div class="headline"><?=getTranslation('lutfen1')?> <span class="highlighted"><?=getTranslation('lutfen2')?></span></div><div class="bodyText"><?=getTranslation('lutfen3')?></div><div class="progressbar"><div class="progressbarInner"></div></div></div></div></div>');
var rand = Math.random();
$.get('../ajax.php?a=kupondsanal&id='+id+'&rand='+rand+'',function(data) { $(".kuponici").html(data); });
}

function kuponkapat() {
$(".kuponici").html(''); 
$("#cboxOverlay").css('display','none');
$(".kuponici").css('display','none');
$("body").css('overflow','auto');	
}
$(document).ready(function(e) {
kupongetir(1,1);
$("#cboxOverlay").click(function() { kuponkapat(); });
});
function asdes(order,as) {
$("#order").val(order);	
$("#ascdesc").val(as);
$("#suanval").val(1);
kupongetir(1,1);
}
function kupongetir(val, sayfaveri) {
if(val=="1") {
$("#suanval").val(1);
$("#kupons").html('<div id="delay_layer" class="overlay_layer"><div class="innerWrap"><div class="contentBlock"><div class="headline"><?=getTranslation('lutfen1')?> <span class="highlighted"><?=getTranslation('lutfen2')?></span></div><div class="bodyText"><?=getTranslation('lutfen3')?></div><div class="progressbar"><div class="progressbarInner"></div></div></div></div></div>');
}
var kupon_no = $("#k_kuponno").val();
var tarih1 = $("#tarih1").val();
var tarih2 = $("#tarih2").val();
var satir = $("#k_satir").val();
var durum = $("#k_durum").val();
var tip = $("#k_tip").val();	
var rand = Math.random();
var order = $("#order").val();
var asde = $("#ascdesc").val();
var paging = $("#suanval").val();
var userid = $("#k_user").val();
$.get('../ajax_players.php?a=tumkuponlarim&sayfa='+sayfaveri+'&userid='+userid+'&rand='+rand+'&kupon_no='+kupon_no+'&tarih1='+tarih1+'&tarih2='+tarih2+'&satir='+satir+'&durum='+durum+'&tip='+tip+'&order='+order+'&ascdesc='+asde+'',function(data) { $("#kupons").html(data); loadexit(); });
}
function loadall() {
$("#loadall").show();
$("body").css('overflow','hidden');
}
function loadexit() {
$("#loadall").hide();
$("body").css('overflow','auto');
}
function checkShowTooltip(text,len){
	if(len == undefined)
		return true;
	if(!text)
		return false;
	var max = 0;
	var lines = jQuery("<div>"+text+"</div>").html().split(/<br[^>]*>/gi);
	for(i=0;i<lines.length;i++)
		max = Math.max(max,jQuery.trim(lines[i]).replace(/\s+/g, ' ').length);

	return max >= len;
}
</script>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<?php include 'footer.php'; ?>


</body>
</html>