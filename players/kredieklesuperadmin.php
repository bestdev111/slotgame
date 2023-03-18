<?
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); die(); exit(); }
if($ub['sahip']!="1") { header("Location:index.php"); }

if(isset($_POST['submit'])){
$tip = pd("tip");
$limittip = pd("limittip");
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

} else if($limittip=='limitsec') {

	$onaylandi = 7;//LİMİT TÜRÜ SEÇİNİZ

} else if($tip=='ekle') {
	
	if($limittip=='admin') {
	
	sed_sql_query("update kullanici set alt_sinir=alt_sinir+$adet where id='$userid'");
	
	$onaylandi = 2;//KREDİ EKLENMİŞTİR.
	
	} else if($limittip=='kullanici') {
	
	sed_sql_query("update kullanici set alt_sinir_2=alt_sinir_2+$adet where id='$userid'");
	
	$onaylandi = 2;//KREDİ EKLENMİŞTİR.
	
	}

} else if($tip=='cikar') {

	if($limittip=='admin') {
	
	sed_sql_query("update kullanici set alt_sinir=alt_sinir-$adet where id='$userid'");

	$onaylandi = 3;//KREDİ ÇIKARTILMIŞTIR.
	
	} else if($limittip=='kullanici') {
	
	sed_sql_query("update kullanici set alt_sinir_2=alt_sinir_2-$adet where id='$userid'");

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
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('playerskredieklesuperadmin1')?></div>
<? } else if($onaylandi==2) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('playerskredieklesuperadmin2')?></div>
<? } else if($onaylandi==3) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('playerskredieklesuperadmin3')?></div>
<? } else if($onaylandi==4) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('playerskredieklesuperadmin4')?></div>
<? } else if($onaylandi==5) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('playerskredieklesuperadmin5')?></div>
<? } else if($onaylandi==6) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('playerskredieklesuperadmin6')?> <?=$alt_sinirini_bul2;?> <?=getTranslation('playerskredieklesuperadmin7')?></div>
<? } else if($onaylandi==7) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('playerskredieklesuperadmin8')?></div>
<? } ?>

<form method="post" class="form">
<table class="tablesorter">
<thead>
<tr>
<th colspan="2"><?=getTranslation('playerskredieklesuperadmin9')?></th>
</tr>
</thead>
<tbody>
<tr>
<td width="200"><?=getTranslation('playerskredieklesuperadmin10')?></td>
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
<td width="200"><?=getTranslation('playerskredieklesuperadmin11')?></td>
<td>
<select class="inputCombo choiceChosen" style="width:150px;" tabindex="3" id="tip" name="tip">
<option value="islemsec">----------------</option>
<option value="ekle"><?=getTranslation('playerskredieklesuperadmin12')?></option>
<option value="cikar"><?=getTranslation('playerskredieklesuperadmin13')?></option>
</select>
</td>
</tr>
<tr>
<td width="200"><?=getTranslation('playerskredieklesuperadmin14')?></td>
<td>
<select class="inputCombo choiceChosen" style="width:150px;" tabindex="3" id="limittip" name="limittip">
<option value="limitsec">----------------</option>
<option value="admin"><?=getTranslation('playerskredieklesuperadmin15')?></option>
<option value="kullanici"><?=getTranslation('playerskredieklesuperadmin16')?></option>
</select>
</td>
</tr>
<tr>
<td width="200"><?=getTranslation('playerskredieklesuperadmin17')?></td>
<td>
<input class="inputText" type="text" name="adet" id="adet" style="width:60px" maxlength="5" value="">
</td>
</tr>
<tr>
<td colspan="2">
<div class="notice info">
<ul class="list-unordered list-checked2">
<li><?=getTranslation('playerskredieklesuperadmin18')?></li>
<li><?=getTranslation('playerskredieklesuperadmin19')?></li>
<li><?=getTranslation('playerskredieklesuperadmin20')?></li>
</ul>
</div>
</td>
</tr>
<tr>
<td class="last" colspan="2">
<input class="btn btn-large btn-primary2" type="submit" name="submit" style="width:100%;" class="button" value="<?=getTranslation('playerskredieklesuperadmin21')?>">
</td>
</tr>
</tbody>
</table>
</form>

<table id="tablesorter" class="tablesorter">
<thead>
<tr>
<th colspan="8"><?=getTranslation('playerskredieklesuperadmin22')?></th>
</tr>
<tr>
<th><?=getTranslation('playerskredieklesuperadmin23')?></th>
<th><?=getTranslation('playerskredieklesuperadmin24')?></th>
<th><?=getTranslation('playerskredieklesuperadmin25')?></th>
<th><?=getTranslation('playerskredieklesuperadmin26')?></th>
<th><?=getTranslation('playerskredieklesuperadmin27')?></th>
</tr>
</thead>
<tbody>

<?
$sor = sed_sql_query("select * from kullanici where hesap_sahibi_id='".$ub['id']."' and root='0' order by id asc");
if(sed_sql_numrows($sor)>0) {
while($row=sed_sql_fetcharray($sor)) { 
$toplam_kullanici = sed_sql_numrows(sed_sql_query("select hesap_sahibi_id,root from kullanici where hesap_sahibi_id='$row[id]' and root='0'"));
$toplams_limit = bilgi("SELECT SUM(CASE WHEN id!='' THEN alt_sinir END) as toplam_limit FROM kullanici WHERE hesap_sahibi_id='$row[id]' and root='0'");
$alt_sinirini_bul = $row['alt_sinir']-$toplam_kullanici;
$alt_sinirini_bul_2 = $row['alt_sinir_2']-$toplams_limit['toplam_limit'];
?>
<tr class="itext-3" style="text-align:center;">
<td><?=$row['username']; ?></td>
<td style="background-color: #3b4aff75;"><?=$row['alt_sinir']; ?></td>
<td style="background-color: #3b4aff75;"><?=$alt_sinirini_bul; ?></td>
<td style="background-color: #f9897c;"><?=$row['alt_sinir_2']; ?></td>
<td style="background-color: #f9897c;"><?=$alt_sinirini_bul_2; ?></td>
</tr>
<? } ?>
<? } else { ?>
<tr class="itext-3" style="text-align:center;">
<td colspan="3"><?=getTranslation('playerskredieklesuperadmin28')?></td>
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