<?
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); die(); exit(); }
if($ub['alt_durum']!=1 && $ub['alt_alt_durum']!=0) { header("Location:index.php"); }

$toplam_kullanicim = sed_sql_numrows(sed_sql_query("select hesap_sahibi_id,root from kullanici where hesap_sahibi_id='$ub[id]' and root='0'"));
$toplams_limitm = bilgi("SELECT SUM(CASE WHEN id!='' THEN alt_sinir END) as toplam_limitm FROM kullanici WHERE hesap_sahibi_id='$ub[id]' and root='0'");
$alt_sinirini_bul2 = $ub['alt_sinir']-$toplams_limitm['toplam_limitm']-$toplam_kullanicim;

if(isset($_POST['submit'])){
$tip = pd("tip");
$adet = pd("adet");
$userid = pd("userid");
$bayilerim = "".benimbayilerim($userid)."";
$bayi_array = explode(",",$bayilerim);
$ouser = bilgi("select * from kullanici where id='$userid'");

$toplam_kullanici = sed_sql_numrows(sed_sql_query("select hesap_sahibi_id,root from kullanici where hesap_sahibi_id='$userid' and root='0'"));
$toplams_limit = bilgi("SELECT SUM(CASE WHEN id!='' THEN alt_sinir END) as toplam_limit FROM kullanici WHERE hesap_sahibi_id='$userid' and root='0'");
$alt_sinirini_bul = $ouser['alt_sinir']-$toplams_limit['toplam_limit']-$toplam_kullanici;

if(!in_array($userid,$bayi_array) || !is_numeric($userid)) {

$onaylandi = 1;//BUNA YETKİLİ DEĞİLSİNİZ !

} else if($tip=='ekle') {

if($alt_sinirini_bul2<$adet){
	
	$onaylandi = 6;//BAYİye KREDİ EKLEMEK İSTEDİĞİNİZ KADAR LİMİTİNİZ YOKTUR

} else {
	
	sed_sql_query("update kullanici set alt_sinir=alt_sinir+$adet where id='$userid'");
	
	$onaylandi = 2;//KREDİ EKLENMİŞTİR.

}

} else if($tip=='cikar') {

if($alt_sinirini_bul<$adet){
	
	$onaylandi = 5;//BAYİDEN ÇIKARTMAK İSTEDİĞİNİZ KADAR LİMİTİ YOKTUR BAYİNİN

} else {

	sed_sql_query("update kullanici set alt_sinir=alt_sinir-$adet where id='$userid'");

	$onaylandi = 3;//KREDİ ÇIKARTILMIŞTIR.

}

} else {

$onaylandi = 4;//İŞLEM SEÇİNİZ !

}

}

?>
<? include 'header.php'; ?>
<? include 'menu.php'; ?>
<script>$("#krediekle").addClass("activemnuitems");</script>

<div id="main" class="lwkSelector" style="width: 758px;">
<div id="live">
<div class="space_20"></div>
<div class="main_space" id="main_wide">
<div class="z-right-container" id="maskcontainer">

<? if($onaylandi==1) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('playerskrediekle1')?></div>
<? } else if($onaylandi==2) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('playerskrediekle2')?></div>
<? } else if($onaylandi==3) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('playerskrediekle3')?></div>
<? } else if($onaylandi==4) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('playerskrediekle4')?></div>
<? } else if($onaylandi==5) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('playerskrediekle5')?></div>
<? } else if($onaylandi==6) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('playerskrediekle6')?><?=$alt_sinirini_bul2;?><?=getTranslation('playerskrediekle7')?></div>
<? } ?>

<form method="post" class="form">
<table class="tablesorter">
<thead>
<tr>
<th colspan="2"><?=getTranslation('playerskrediekle8')?></th>
</tr>
</thead>
<tbody>
<tr>
<td width="200"><?=getTranslation('playerskrediekle9')?></td>
<td>
<?
$bayilerim = benimbayilerim($ub['id']);
?>
<select class="inputCombo choiceChosen" style="width:150px;" tabindex="3" id="userid" name="userid">

<?
$sor = sed_sql_query("select * from kullanici where hesap_sahibi_id='".$ub['id']."' and root='0' order by id asc");
if(sed_sql_numrows($sor)>0) {
while($row=sed_sql_fetcharray($sor)) { ?>
<option style="color:#000;text-transform: none;" value="<?=$row['id'];?>"><?=$row['username']; ?></option>
<? } ?>
<? } ?>

</select>
</td>
</tr>
<tr>
<td width="200"><?=getTranslation('playerskrediekle10')?></td>
<td>
<select class="inputCombo choiceChosen" style="width:150px;" tabindex="3" id="tip" name="tip">
<option value="islemsec">----------------</option>
<option value="ekle"><?=getTranslation('playerskrediekle11')?></option>
<option value="cikar"><?=getTranslation('playerskrediekle12')?></option>
</select>
</td>
</tr>
<tr>
<td width="200"><?=getTranslation('playerskrediekle13')?></td>
<td>
<input class="inputText" type="text" name="adet" id="adet" style="width:60px" maxlength="5" value="">
</td>
</tr>
<tr>
<td colspan="2">
<div class="notice info">
<ul class="list-unordered list-checked2">
<li><?=getTranslation('playerskrediekle14')?></li>
<li><?=getTranslation('playerskrediekle15')?></li>
<li><?=getTranslation('playerskrediekle16')?></li>
</ul>
</div>
</td>
</tr>
<tr>
<td class="last" colspan="2">
<input class="btn btn-large btn-primary2" type="submit" name="submit" style="width:100%;" class="button" value="<?=getTranslation('playerskrediekle17')?>">
</td>
</tr>
</tbody>
</table>
</form>

<table id="tablesorter" class="tablesorter">
<thead>
<tr>
<th colspan="8"><?=getTranslation('playerskrediekle18')?></th>
</tr>
<tr>
<th><?=getTranslation('playerskrediekle19')?></th>
<th><?=getTranslation('playerskrediekle20')?></th>
<th><?=getTranslation('playerskrediekle21')?></th>
</tr>
</thead>
<tbody>

<?
$sor = sed_sql_query("select * from kullanici where hesap_sahibi_id='".$ub['id']."' and root='0' order by id asc");
if(sed_sql_numrows($sor)>0) {
while($row=sed_sql_fetcharray($sor)) { 
$toplam_kullanici = sed_sql_numrows(sed_sql_query("select hesap_sahibi_id,root from kullanici where hesap_sahibi_id='$row[id]' and root='0'"));
$toplams_limit = bilgi("SELECT SUM(CASE WHEN id!='' THEN alt_sinir END) as toplam_limit FROM kullanici WHERE hesap_sahibi_id='$row[id]' and root='0'");
$alt_sinirini_bul = $row['alt_sinir']-$toplams_limit['toplam_limit']-$toplam_kullanici;
?>
<tr class="itext-3" style="text-align:center;">
<td><?=$row['username']; ?></td>
<td><?=$row['alt_sinir']; ?></td>
<td><?=$alt_sinirini_bul; ?></td>
</tr>
<? } ?>
<? } else { ?>
<tr class="itext-3" style="text-align:center;">
<td colspan="3"><?=getTranslation('playerskrediekle22')?></td>
</tr>
<? } ?>

</tbody>
</table>

<script>
$(document).ready(function(e) {
    $("#kaydet").click(function(e) {
	f.submit();
    });
});
</script>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<? include 'footer.php'; ?>

</body>
</html>