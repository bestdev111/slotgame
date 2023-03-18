<?
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); die(); exit(); }
if($ub['alt_durum']<1 && $ub['wkyetki']<1 && $ub['alt_alt_durum']<1 && $ub['sahip']=="0") { header("Location:index.php"); }


if(isset($_GET['id'])) {
$id = gd("id");
$bayilerim = "".benimbayilerim($ub['id'])."";
$bayi_array = explode(",",$bayilerim);
if(!in_array($id,$bayi_array) || !is_numeric($id)) { die("<div class='bos'>Buna yetkili degilsiniz.</div>"); }
$_SESSION['edituser'] = $id;
header("Location:userediting.php");
}


if(isset($_POST['submit'])) {

$normuser = pd("normuser");
$username = pd("user");
$password = pd("sifre");
$hatirlatmaad = pd("hatirlatmaad");
$websitesi = pd("websitesi");

if(empty($password)) { $onaylandi = 2; }

$oid = $_SESSION['edituser'];

$zaman = time();
if($ub['sahip']=="1") {

sed_sql_query("update kullanici set sistemayarlaryetki='0',bayisilmeyetki='1',password='$password',hatirlatmaad='$hatirlatmaad',bulten='hititbet',formul_yetki='0',websitesi='$websitesi' where id='$oid'");
$onaylandi = 1;

} else if($ub['alt_alt_durum']>0) {

sed_sql_query("update kullanici set sistemayarlaryetki='1',password='$password',hatirlatmaad='$hatirlatmaad',bulten='hititbet',kuponiptalyetki='1',bayisilmeyetki='1',formul_yetki='1',websitesi='$websitesi' where id='$oid'");
$onaylandi = 1;

} else if($ub['alt_durum']>0) {

$calisma_sekli = pd("calisma_sekli");
$yuzde = pd("yuzde");
$kazananyuzde = pd("kazananyuzde");
$canlioynama = pd("canlioynama");
$kuponalim = pd("kuponalim");
$wkyetki = pd("wkyetki");

if($wkyetki!=1){
	$alt_sinir_ver = "alt_sinir='0'";
} else {
	$alt_sinir_ver = "alt_sinir=alt_sinir";
}

$wklimit = pd("wklimit");
$bultendegisim = pd("bultendegisim");
$canli_calisma_sekli = pd("canli_calisma_sekli");
$canli_tekmac_yuzde = pd("canli_tekmac_yuzde");
$canli_kombine_yuzde = pd("canli_kombine_yuzde");
$normal_calisma_sekli = pd("normal_calisma_sekli");
$normal_tekmac_yuzde = pd("normal_tekmac_yuzde");
$normal_kombine_yuzde = pd("normal_kombine_yuzde");
$n_calisma_sekli = pd("n_calisma_sekli");
$n_komisyon = pd("n_komisyon");

sed_sql_query("update kullanici set password='$password',hatirlatmaad='$hatirlatmaad',calisma_sekli='$calisma_sekli',komisyon='$yuzde',kazananyuzde='$kazananyuzde',canlioynama='$canlioynama',kuponalim='$kuponalim',$alt_sinir_ver,wkyetki='$wkyetki',wksilmeyetki='1',bulten='hititbet',bulten_yetki='0',betmatik='$ub[betmatik]',canli_calisma_sekli='$canli_calisma_sekli',canli_tekmac_yuzde='$canli_tekmac_yuzde',canli_kombine_yuzde='$canli_kombine_yuzde',normal_calisma_sekli='$normal_calisma_sekli',normal_tekmac_yuzde='$normal_tekmac_yuzde',normal_kombine_yuzde='$normal_kombine_yuzde',n_calisma_sekli='$n_calisma_sekli',n_komisyon='$n_komisyon',websitesi='$websitesi' where id='$oid'");

sed_sql_query("update kullanici set canlioynama='$canlioynama',kuponalim='$kuponalim',bulten='hititbet',bulten_yetki='0',betmatik='$ub[betmatik]',websitesi='$websitesi' where hesap_sahibi_id='$oid'");
$onaylandi = 1;

} else if($ub['wkyetki']=="1") {

sed_sql_query("update kullanici set password='$password',hatirlatmaad='$hatirlatmaad' where id='$oid'");
$onaylandi = 1;

}


}

if(isset($_GET['ok'])) {
rebuild($ub['id']);
}


?>
<? include 'header.php'; ?>
<? include 'menu.php'; ?>

<div id="main" class="lwkSelector" style="width: 758px;">
<div id="live">
<div class="space_20"></div>
<div class="main_space" id="main_wide">
<div class="z-right-container" id="maskcontainer">

<? if($onaylandi==1) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('playersuserediting1')?></div>
<? } else if($onaylandi==2) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('playersuserediting2')?></div>
<? } else if($onaylandi==3) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('playersuserediting3')?></div>
<? } ?>

<? if($ub['sahip']=="1") { ?>

<?
$ubilgi = bilgi("select * from kullanici where id='$_SESSION[edituser]'"); 
$toplam_kullanici = sed_sql_numrows(sed_sql_query("select hesap_sahibi_id,root from kullanici where hesap_sahibi_id='$ubilgi[id]' and root='0'"));
$toplams_limit = bilgi("SELECT SUM(CASE WHEN id!='' THEN alt_sinir END) as toplam_limit FROM kullanici WHERE hesap_sahibi_id='$ubilgi[id]' and root='0'");
$alt_sinirini_bul = $ubilgi['alt_sinir']-$toplam_kullanici;
$alt_sinirini_bul_2 = $ubilgi['alt_sinir_2']-$toplams_limit['toplam_limit'];
?>

<form method="post" name="newu">

<table class="tablesorter">
<thead>
<tr>
<th colspan="2"><?=getTranslation('playersuserediting4')?></th>
</tr>
</thead>
<tbody>
<tr>
<td width="250"><?=getTranslation('playersuserediting8')?> <span class="itext-2">*</span></td>
<td>
<input type="text" disabled style="width:185px" class="inputText" name="user" id="ouser" onChange="userkontroledit();" value="<?=$ubilgi['username']; ?>">
<span class="itext-3" style="margin-left:15px;"><?=getTranslation('playersuserediting16')?></span>
</td>
</tr>
<tr>
<td width="250"><?=getTranslation('playersuserediting9')?> <span class="itext-2">*</span></td>
<td>
<input type="text" class="inputText" style="width:185px" name="sifre" value="<?=$ubilgi['password']; ?>">
<span class="itext-3" style="margin-left:15px;"><?=getTranslation('playersuserediting17')?></span>
</td>
</tr>
<tr>
<td width="250"><?=getTranslation('playersuserediting10')?> </td>
<td>
<input type="text" class="inputText" style="width:185px" name="hatirlatmaad" id="ouser" onChange="userkontroledit();" value="<?=$ubilgi['hatirlatmaad']; ?>">
<span class="itext-3" style="margin-left:15px;"><?=getTranslation('playersuserediting18')?></span>
</td>
</tr>

<tr>
<td width="250"><?=getTranslation('playersuserediting111')?></td>
<td>
<span class="itext-3"><?=getTranslation('playersuserediting19')?> ( <span style="color:red;"><?=$ubilgi['alt_sinir'];?></span> ) / <?=getTranslation('playersuserediting20')?> ( <span style="color:red;"><?=$alt_sinirini_bul; ?></span> )</span>
</td>
</tr>

<tr>
<td width="250"><?=getTranslation('playersuserediting12')?></td>
<td>
<span class="itext-3"><?=getTranslation('playersuserediting19')?> ( <span style="color:red;"><?=$ubilgi['alt_sinir_2'];?></span> ) / <?=getTranslation('playersuserediting20')?> ( <span style="color:red;"><?=$alt_sinirini_bul_2; ?></span> )</span>
</td>
</tr>

<tr>
<td width="250"><?=getTranslation('playersuserediting13')?> & <?=getTranslation('playersuserediting12')?></td>
<td>
<span class="itext-3"><?=getTranslation('playersuserediting21')?> <font style="color:#f00;"><a href="kredieklesuperadmin.php"><?=getTranslation('playersuserediting22')?></a></font> <?=getTranslation('playersuserediting23')?>.</span>
</td>
</tr>

<tr>
<td width="250"><?=getTranslation('playersuserediting14')?></td>
<td>
<input type="text" class="inputText" name="websitesi" value="<?=$ubilgi['websitesi']; ?>">
</td>
</tr>

<tr>
<td class="last" colspan="2">
<input type="submit" class="btn btn-large btn-primary" name="submit" value="<?=getTranslation('playersuserediting15')?>" id="kaydet">
</td>
</tr>
</tbody>
</table>
<input type="hidden" id="ussecure" name="usec" value="0">
<input type="hidden" id="normuser" name="normuser" value="<?=$ubilgi['username']; ?>">
</form>
<script>
$(document).ready(function(e) {
    $("#kaydet").click(function(e) {
    var f = self.document.newu;
	var normuser = $("#normuser").val();
	if(f.user.value.length<2) { alertify.error('<?=getTranslation('playersuserediting24')?>'); f.user.select(); } else
	if(f.sifre.value.length<1) { alertify.error('<?=getTranslation('playersuserediting25')?>'); f.sifre.focus(); } else
	if(f.usec.value=="0" && normuser!=f.user.value) { alertify.error('<?=getTranslation('playersuserediting26')?>'); f.user.select(); } else {
	f.submit();
	}
    });
});
</script>
<? } else if($ub['alt_alt_durum']>0) { ?>

<?
$ubilgi = bilgi("select * from kullanici where id='$_SESSION[edituser]'"); 
$toplam_kullanici = sed_sql_numrows(sed_sql_query("select hesap_sahibi_id,root from kullanici where hesap_sahibi_id='$ubilgi[id]' and root='0'"));
$toplams_limit = bilgi("SELECT SUM(CASE WHEN id!='' THEN alt_sinir END) as toplam_limit FROM kullanici WHERE hesap_sahibi_id='$ubilgi[id]' and root='0'");
$alt_sinirini_bul = $ubilgi['alt_sinir']-$toplams_limit['toplam_limit']-$toplam_kullanici;
?>

<form method="post" name="newu">

<table class="tablesorter">
<thead>
<tr>
<th colspan="2"><?=getTranslation('playersuserediting5')?></th>
</tr>
</thead>
<tbody>
<tr>
<td width="250"><?=getTranslation('playersuserediting8')?> <span class="itext-2">*</span></td>
<td>
<input type="text" disabled style="width:185px" class="inputText" name="user" id="ouser" onChange="userkontroledit();" value="<?=$ubilgi['username']; ?>">
<span class="itext-3" style="margin-left:15px;"><?=getTranslation('playersuserediting16')?></span>
</td>
</tr>
<tr>
<td width="250"><?=getTranslation('playersuserediting9')?> <span class="itext-2">*</span></td>
<td>
<input type="text" class="inputText" style="width:185px" name="sifre" value="<?=$ubilgi['password']; ?>">
<span class="itext-3" style="margin-left:15px;"><?=getTranslation('playersuserediting17')?></span>
</td>
</tr>
<tr>
<td width="250"><?=getTranslation('playersuserediting10')?> </td>
<td>
<input type="text" class="inputText" style="width:185px" name="hatirlatmaad" id="ouser" onChange="userkontroledit();" value="<?=$ubilgi['hatirlatmaad']; ?>">
<span class="itext-3" style="margin-left:15px;"><?=getTranslation('playersuserediting18')?></span>
</td>
</tr>
<tr>
<td width="250"><?=getTranslation('playersuserediting27')?></td>
<td>
<span class="itext-3"><?=getTranslation('playersuserediting19')?> ( <span style="color:red;"><?=$ubilgi['alt_sinir'];?></span> ) / <?=getTranslation('playersuserediting20')?> ( <span style="color:red;"><?=$alt_sinirini_bul; ?></span> )</span>
</td>
</tr>

<tr>
<td width="250"><?=getTranslation('playersuserediting12')?></td>
<td>
<span class="itext-3"><?=getTranslation('playersuserediting21')?> <font style="color:#f00;"><a href="krediekleadmin.php"><?=getTranslation('playersuserediting22')?></a></font> <?=getTranslation('playersuserediting23')?></span>
</td>
</tr>

<tr>
<td width="250"><?=getTranslation('playersuserediting14')?></td>
<td>
<input type="text" class="inputText" name="websitesi" value="<?=$ubilgi['websitesi']; ?>">
</td>
</tr>

<tr>
<td class="last" colspan="2">
<input type="submit" class="btn btn-large btn-primary" name="submit" value="<?=getTranslation('playersuserediting15')?>" id="kaydet">
</td>
</tr>
</tbody>
</table>
<input type="hidden" id="ussecure" name="usec" value="0">
<input type="hidden" id="normuser" name="normuser" value="<?=$ubilgi['username']; ?>">
</form>
<script>
$(document).ready(function(e) {
    $("#kaydet").click(function(e) {
    var f = self.document.newu;
	var normuser = $("#normuser").val();
	if(f.user.value.length<2) { alertify.error('<?=getTranslation('playersuserediting24')?>'); f.user.select(); } else
	if(f.sifre.value.length<1) { alertify.error('<?=getTranslation('playersuserediting25')?>'); f.sifre.focus(); } else {
	f.submit();
	}
    });
});
</script>
<? } else if($ub['alt_durum']>0) { ?>
<?
$ubilgi = bilgi("select * from kullanici where id='$_SESSION[edituser]'"); 
$toplam_kullanici = sed_sql_numrows(sed_sql_query("select hesap_sahibi_id,root from kullanici where hesap_sahibi_id='$ubilgi[id]' and root='0'"));
$toplams_limit = bilgi("SELECT SUM(CASE WHEN id!='' THEN alt_sinir END) as toplam_limit FROM kullanici WHERE hesap_sahibi_id='$ubilgi[id]' and root='0'");
$alt_sinirini_bul = $ubilgi['alt_sinir']-$toplams_limit['toplam_limit']-$toplam_kullanici;
?>
<form method="post" name="newu">

<table class="tablesorter">
<thead>
<tr>
<th colspan="2"><?=getTranslation('playersuserediting6')?></th>
</tr>
</thead>
<tbody>
<tr>
<td width="250"><?=getTranslation('playersuserediting8')?> <span class="itext-2">*</span></td>
<td>
<input type="text" disabled style="width:185px" class="inputText" name="user" id="ouser" onChange="userkontroledit();" value="<?=$ubilgi['username']; ?>">
<span class="itext-3" style="margin-left:15px;"><?=getTranslation('playersuserediting16')?></span>
</td>
</tr>
<tr>
<td width="250"><?=getTranslation('playersuserediting9')?> <span class="itext-2">*</span></td>
<td>
<input type="text" class="inputText" style="width:185px" name="sifre" value="<?=$ubilgi['password']; ?>">
<span class="itext-3" style="margin-left:15px;"><?=getTranslation('playersuserediting17')?></span>
</td>
</tr>
<tr>
<td width="250"><?=getTranslation('playersuserediting10')?> </td>
<td>
<input type="text" class="inputText" style="width:185px" name="hatirlatmaad" id="ouser" onChange="userkontroledit();" value="<?=$ubilgi['hatirlatmaad']; ?>">
<span class="itext-3" style="margin-left:15px;"><?=getTranslation('playersuserediting18')?></span>
</td>
</tr>

<tr>
<td width="250"><?=getTranslation('playersuserediting28')?> </td>
<td>
<select class="inputText" name="n_calisma_sekli">
<option value="1" <? if($ubilgi['n_calisma_sekli']=="1") { echo "selected"; } ?>>Kasaya kalan paradan</option>
<option value="2" <? if($ubilgi['n_calisma_sekli']=="2") { echo "selected"; } ?>>Tüm yatırılan paradan</option>
</select>
</td>
</tr>

<tr>
<td width="250"><?=getTranslation('playersuserediting29')?> </td>
<td>
<input type="number" class="inputText sh" name="n_komisyon" max="99" value="<?=$ubilgi['n_komisyon']; ?>">
</td>
</tr>

<tr>
<td width="250"><?=getTranslation('playersuserediting30')?> </td>
<td>
<input type="text" class="inputText sh" name="kazananyuzde" value="<?=$ubilgi['kazananyuzde']; ?>">
<span class="itext-3" style="margin-left:15px;"><?=getTranslation('playersuserediting31')?></span>
</td>
</tr>

<tr>
<td width="250"><?=getTranslation('playersuserediting32')?> </td>
<td>
<select class="inputText" name="canlioynama">
<option value="1" <? if($ubilgi['canlioynama']=="1") { echo "selected"; } ?>><?=getTranslation('playersuserediting33')?></option>
<option value="0" <? if($ubilgi['canlioynama']=="0") { echo "selected"; } ?>><?=getTranslation('playersuserediting34')?></option>
</select>
</td>
</tr>

<tr>
<td width="250"><?=getTranslation('playersuserediting35')?> </td>
<td>
<select class="inputText" name="kuponalim">
<option value="1" <? if($ubilgi['kuponalim']=="1") { echo "selected"; } ?>><?=getTranslation('playersuserediting36')?></option>
<option value="0" <? if($ubilgi['kuponalim']=="0") { echo "selected"; } ?>><?=getTranslation('playersuserediting37')?></option>
</select>
</td>
</tr>

<tr>
<td width="250"><?=getTranslation('playersuserediting38')?> </td>
<td>
<select class="inputText" name="wkyetki">
<option value="1" <? if($ubilgi['wkyetki']=="1") { echo "selected"; } ?>><?=getTranslation('playersuserediting39')?></option>
<option value="2" <? if($ubilgi['wkyetki']=="2") { echo "selected"; } ?>><?=getTranslation('playersuserediting40')?></option>
<option value="3" <? if($ubilgi['wkyetki']=="3") { echo "selected"; } ?>><?=getTranslation('playersuserediting41')?></option>
</select>
</td>
</tr>

<tr>
<td width="250"><?=getTranslation('playersuserediting12')?></td>
<td>
<span class="itext-3"><?=getTranslation('playersuserediting21')?> <font style="color:#f00;"><a href="krediekle.php"><?=getTranslation('playersuserediting22')?></a></font> <?=getTranslation('playersuserediting23')?></span>
</td>
</tr>

<tr>
<td class="last" colspan="2">
<input type="submit" class="btn btn-large btn-primary" name="submit" value="<?=getTranslation('playersuserediting15')?>" id="kaydet">
</td>
</tr>
</tbody>
</table>
<input type="hidden" id="ussecure" name="usec" value="0">
<input type="hidden" id="normuser" name="normuser" value="<?=$ubilgi['username']; ?>">
</form>
<script>
$(document).ready(function(e) {
    $("#kaydet").click(function(e) {
    var f = self.document.newu;
	var normuser = $("#normuser").val();
	if(f.user.value.length<2) { alertify.error('<?=getTranslation('playersuserediting24')?>'); f.user.select(); } else
	if(f.sifre.value.length<1) { alertify.error('<?=getTranslation('playersuserediting25')?>'); f.sifre.focus(); } else
	if(f.usec.value=="0" && normuser!=f.user.value) { alertify.error('<?=getTranslation('playersuserediting26')?>'); f.user.select(); } else {
	f.submit();
	}
    });
});
</script>
<? } else if($ub['wkyetki']=="1") { ?>

<?
$ubilgi = bilgi("select * from kullanici where id='$_SESSION[edituser]'"); 
$toplam_kullanici = sed_sql_numrows(sed_sql_query("select hesap_sahibi_id,root from kullanici where hesap_sahibi_id='$ubilgi[id]' and root='0'"));
$toplams_limit = bilgi("SELECT SUM(CASE WHEN id!='' THEN alt_sinir END) as toplam_limit FROM kullanici WHERE hesap_sahibi_id='$ubilgi[id]' and root='0'");
$alt_sinirini_bul = $ubilgi['alt_sinir']-$toplams_limit['toplam_limit']-$toplam_kullanici;
?>

<form method="post" name="newu">

<table class="tablesorter">
<thead>
<tr>
<th colspan="2"><?=getTranslation('playersuserediting7')?></th>
</tr>
</thead>
<tbody>
<tr>
<td width="250"><?=getTranslation('playersuserediting8')?> <span class="itext-2">*</span></td>
<td>
<input type="text" disabled style="width:185px" class="inputText" name="user" id="ouser" onChange="userkontroledit();" value="<?=$ubilgi['username']; ?>">
<span class="itext-3" style="margin-left:15px;"><?=getTranslation('playersuserediting16')?></span>
</td>
</tr>
<tr>
<td width="250"><?=getTranslation('playersuserediting9')?> <span class="itext-2">*</span></td>
<td>
<input type="text" class="inputText" style="width:185px" name="sifre" value="<?=$ubilgi['password']; ?>">
<span class="itext-3" style="margin-left:15px;"><?=getTranslation('playersuserediting17')?></span>
</td>
</tr>
<tr>
<td width="250"><?=getTranslation('playersuserediting10')?> </td>
<td>
<input type="text" class="inputText" style="width:185px" name="hatirlatmaad" id="ouser" onChange="userkontroledit();" value="<?=$ubilgi['hatirlatmaad']; ?>">
<span class="itext-3" style="margin-left:15px;"><?=getTranslation('playersuserediting18')?></span>
</td>
</tr>
<tr>
<td class="last" colspan="2">
<input type="submit" class="btn btn-large btn-primary" name="submit" value="<?=getTranslation('playersuserediting15')?>" id="kaydet">
</td>
</tr>
</tbody>
</table>
<input type="hidden" id="ussecure" name="usec" value="0">
<input type="hidden" id="normuser" name="normuser" value="<?=$ubilgi['username']; ?>">
</form>
<script>
$(document).ready(function(e) {
    $("#kaydet").click(function(e) {
    var f = self.document.newu;
	if(f.user.value.length<2) { alertify.error('<?=getTranslation('playersuserediting24')?>'); f.user.select(); } else
	if(f.sifre.value.length<1) { alertify.error('<?=getTranslation('playersuserediting25')?>'); f.sifre.focus(); } else
	if(f.usec.value=="0") { alertify.error('<?=getTranslation('playersuserediting26')?>'); f.user.select(); } else {
	f.submit();
	}
    });
});
</script>


<? } ?>



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