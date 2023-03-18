<?
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); die(); exit(); }
if($ub['alt_alt_durum']!=0 && $ub['alt_durum']!=1) { header("Location:index.php"); }

if(isset($_POST['submit'])){
$tip = pd("tip");
$tutar = pd("tutar");
$userid = pd("userid");
$bayilerim = "".benimbayilerim($userid)."";
$bayi_array = explode(",",$bayilerim);
$ouser = bilgi("select * from kullanici where id='$userid'");

if(!in_array($userid,$bayi_array) || !is_numeric($userid)) {

header("Location:bakiyeisleadmin.php?onay=1");//BUNA YETKİLİ DEĞİLSİNİZ !

} else if($tip=='ekle') {
	
	sed_sql_query("update kullanici set bakiye=bakiye+$tutar where id='$userid'");
	
	sed_sql_query("INSERT INTO hesap_hareket SET user_id='".$userid."',username='".$ouser['username']."',tip='ekle',tutar='".$tutar."',aciklama='Kasa Hesabından - Bahis Hesabına',islemi_yapan='".$ub['username']."',zaman='".time()."',onceki_tutar='".$ouser['bakiye']."'");
	
	header("Location:bakiyeisleadmin.php?onay=2");//KREDİ EKLENMİŞTİR.

} else if($tip=='cikar') {
	
	if($ouser['bakiye']<$tutar){ 
		
		header("Location:bakiyeisleadmin.php?onay=5");//ÇIKARTILACAK BAKİYE HATALI.
	
	} else {

		sed_sql_query("update kullanici set bakiye=bakiye-$tutar where id='$userid'");
		
		sed_sql_query("INSERT INTO hesap_hareket SET user_id='".$userid."',username='".$ouser['username']."',tip='cikar',tutar='".$tutar."',aciklama='Bahis Hesabından - Kasaya',islemi_yapan='".$ub['username']."',zaman='".time()."',onceki_tutar='".$ouser['bakiye']."'");

		header("Location:bakiyeisleadmin.php?onay=3");//KREDİ ÇIKARTILMIŞTIR.
	
	}

} else {

	header("Location:bakiyeisleadmin.php?onay=4");//İŞLEM SEÇİNİZ !

}

}

?>
<? include 'header.php'; ?>
<? include 'menu.php'; ?>
<script>
$("#bakiye_isle").addClass("activemnuitems");
</script>
<div id="main" class="lwkSelector" style="width: 750px;padding-top: 16px;">
<div id="live" style="margin-top: -5px;">
<div class="space_20"></div>
<div class="main_space" id="main_wide">
<div class="z-right-container" id="maskcontainer">

<? if($_GET['onay']==1) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('bakiyetransferformu2aciklama13')?></div>
<? } else if($_GET['onay']==2) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('bakiyetransferformu2aciklama14')?></div>
<? } else if($_GET['onay']==3) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('bakiyetransferformu2aciklama15')?></div>
<? } else if($_GET['onay']==4) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('bakiyetransferformu2aciklama16')?></div>
<? } else if($_GET['onay']==5) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('bakiyetransferformu2aciklama17')?></div>
<? } ?>

<form method="post" class="form">
<table class="tablesorter">
<thead>
<tr>
<th colspan="2"><?=getTranslation('bakiyetransferformu')?></th>
</tr>
</thead>
<tbody>
<tr>
<td width="200"><?=getTranslation('bakiyetransferformukullanici')?></td>
<td>
<?
$bayilerim = benimbayilerim($ub['id']);
?>
<select class="inputCombo choiceChosen" style="width:175px;" tabindex="3" id="userid" name="userid">
<? if($ub['alt_durum']>0) {
$sor = sed_sql_query("select * from kullanici where hesap_sahibi_id='".$ub['id']."' and alt_durum='0' and wkdurum='0' and root='0' order by username asc");
while($row=sed_sql_fetcharray($sor)) { ?>
<option <? if($id_bul == $row['id']) { echo "selected"; } ?> value="<?=$row['id']; ?>"><?=$row['username']; ?></option>
<? } ?>
<? } else if($ub['wkyetki']=='1') {
$sor = sed_sql_query("select * from kullanici where hesap_sahibi_id='".$ub['id']."' and alt_durum='0' and wkdurum='1' and root='0' order by hesap_sahibi_user asc,username asc");
while($row=sed_sql_fetcharray($sor)) { ?>
<option <? if($id_bul == $row['id']) { echo "selected"; } ?> value="<?=$row['id']; ?>"><?=$row['username']; ?></option>
<? } ?>
<? } ?>
</select>
</td>
</tr>
<tr>
<td width="200"><?=getTranslation('bakiyetransferformuislemturu')?></td>
<td>
<select class="inputCombo choiceChosen" style="width:175px;" tabindex="3" id="tip" name="tip">
<option value="islemsec">----------------</option>
<option value="ekle"><?=getTranslation('bakiyetransferformuparayatirma')?></option>
<option value="cikar"><?=getTranslation('bakiyetransferformuparacekme')?></option>
</select>
</td>
</tr>
<tr>
<td width="200"><?=getTranslation('bakiyetransferformumiktar')?></td>
<td>
<input class="inputText" type="text" name="tutar" id="tutar" style="width:60px" maxlength="5" value="">
<strong style="color:#f00;font-weight:bold;font-size:16px;"><?=getTranslation('parabirimi')?></strong>
</td>
</tr>
<tr>
<td colspan="2">
<div class="notice info">
<ul class="list-unordered list-checked2">
<li><?=getTranslation('bakiyetransferformu2aciklama1')?></li>
<li><?=getTranslation('bakiyetransferformu2aciklama2')?></li>
<li><?=getTranslation('bakiyetransferformu2aciklama3')?></li>
<li><?=getTranslation('bakiyetransferformu2aciklama4')?></li>
</ul>
</div>
</td>
</tr>
<tr>
<td class="last" colspan="2">
<input class="btn btn-large btn-primary2" type="submit" name="submit" style="width:100%;" class="button" value="<?=getTranslation('bakiyetransferformuonaylama')?>">
</td>
</tr>
</tbody>
</table>
</form>

<table id="tablesorter" class="tablesorter">
<thead>
<tr>
<th colspan="8"><?=getTranslation('bakiyetransferformu2aciklama5')?></th>
</tr>
<tr>
<th>#</th>
<th><?=getTranslation('bakiyetransferformu2aciklama6')?></th>
<th><?=getTranslation('bakiyetransferformu2aciklama7')?></th>
<th><?=getTranslation('bakiyetransferformu2aciklama8')?></th>
<th><?=getTranslation('bakiyetransferformu2aciklama9')?></th>
<th><?=getTranslation('bakiyetransferformu2aciklama10')?></th>
<th><?=getTranslation('bakiyetransferformu2aciklama11')?></th>
<th><?=getTranslation('bakiyetransferformu2aciklama12')?></th>
</tr>
</thead>
<tbody>



<? 

$useri_getir = $ub['username'];

$sor = sed_sql_query("select * from hesap_hareket where islemi_yapan='$useri_getir' and detay='0' order by zaman desc limit 10");


while($row=sed_sql_fetcharray($sor)) { 

if($row['tip']=="ekle") { $sonraki_tutar = $row['onceki_tutar']+$row['tutar']; } else

if($row['tip']=="cikar") { $sonraki_tutar = $row['onceki_tutar']-$row['tutar']; }

?>

<tr class="itext-<? if($row['tip']=="ekle") {echo "1"; } else if($row['tip']=="cikar") { echo "2"; } ?> c">
<td><?=$row['id']; ?></td>
<td><?=$row['username']; ?></td>
<td style="text-align:center">

<? if($row['tip']=="ekle") { ?> 
<img src="img/inout_1.png" alt="İşlem Türü" border="0"></td>
<? } else if($row['tip']=="cikar") { ?>
<img src="img/inout_2.png" alt="İşlem Türü" border="0"></td>
<? } ?>
<td><?=nf($row['onceki_tutar']); ?></td>
<td><?=nf($row['tutar']); ?></td>
<td><?=nf($sonraki_tutar);?></td>
<td><font style="color:#000;"><?=date("d-m-Y",$row['zaman']); ?></font> <?=date("H:i:s",$row['zaman']); ?></td>

<td class="l">
<? if($row['aciklama']=="Hesaptan Müşteriye"){ ?>
<?=getTranslation('ajaxbakiyeraporu10')?>
<? } else if($row['aciklama']=="Müşteriden Hesaba"){ ?>
<?=getTranslation('ajaxbakiyeraporu11')?>
<? } else if($row['aciklama']=="Müşteriye Aktarılan Bakiye"){ ?>
<?=getTranslation('ajaxbakiyeraporu12')?>
<? } else if($row['aciklama']=="Müşteriden Çekilen Bakiye"){ ?>
<?=getTranslation('ajaxbakiyeraporu13')?>
<? } else if($row['aciklama']=="Bahis Hesabından - Kasaya"){ ?>
<?=getTranslation('ajaxbakiyeraporu14')?>
<? } else if($row['aciklama']=="Kasa Hesabından - Bahis Hesabına"){ ?>
<?=getTranslation('ajaxbakiyeraporu15')?>
<? } else if($row['aciklama']=="Hesap açılırken eklendi."){ ?>
<?=getTranslation('ajaxbakiyeraporu16')?>
<? } ?>
</td>

</tr>
<? } ?>
</tbody>
</table>
</div>
</div>


<script>
$(document).ready(function(e) {
$("#kaydet").click(function(e) {
var f = self.document.newu;
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

<? include 'footer.php'; ?>

</body>
</html>