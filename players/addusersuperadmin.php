<?
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); die(); exit(); }
if($ub['alt_durum']<1 && $ub['wkyetki']<1 && $ub['alt_alt_durum']<1 && $ub['sahip']=="0") { header("Location:index.php"); }
if($ub['adminpanel']=="1") { header("Location:admin"); }

function domain($domain){
    preg_match('#(?:http://)?(?:www\.)?([a-zA-Z0-9\-\.]+)/?#is', $domain, $d);
    return $d[1];
}

if(isset($_POST['submit'])) {

$username = pd("user");
$password = pd("sifre");
$hatirlatmaad = pd("hatirlatmaad");
$websitesi = domain($_SERVER["SERVER_NAME"]);
$kontrol = sed_sql_query("select * from kullanici where username='$username'");
$altsinir = pd("alt_sinir");
$altsinir2 = pd("alt_sinir2");
$zaman = time();

if(strlen($username)<4) {
$onaylandi = 111;
} else if(sed_sql_numrows($kontrol)>0) { 
$onaylandi = 3;
} else if(empty($password)) {
$onaylandi = 4;
} else {

sed_sql_query("INSERT INTO kullanici SET 
username='".$username."',
password='".$password."',
hatirlatmaad='".$hatirlatmaad."',
hesap_sahibi_user='".$ub['username']."',
hesap_sahibi_id='".$ub['id']."',
hesap_root_id='".$ub['hesap_sahibi_id']."',
hesap_root_root_id='".$ub['hesap_root_id']."',
alt_durum='1',
alt_alt_durum='1',
alt_sinir='".$altsinir."',
alt_sinir_2='".$altsinir2."',
olusturma_zaman='".$zaman."',
websitesi='".$websitesi."'");

$onaylandi = 1;

}

}
?>
<? include 'header.php'; ?>
<? include 'menu.php'; ?>
<div id="main" class="lwkSelector" style="width: 758px;">
<div id="live">
<div class="space_20"></div>
<div class="main_space" id="main_wide">
<script>
$("#adduser").addClass("activemnuitems");
</script>
<div class="z-right-container" id="maskcontainer">

<? if($onaylandi==1) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('playersaddusersuperadmin1')?></div>
<? } else if($onaylandi==3) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('playersaddusersuperadmin2')?></div>
<? } else if($onaylandi==4) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('playersaddusersuperadmin3')?></div>
<? } else if($onaylandi==111) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();">En az 4 Harfli Kullanıcı Adı Belirlemelisiniz.</div>
<? } ?>

<? if($ub['sahip']==1) { ?>
<form method="post" name="newu">

<table class="tablesorter">
<thead>
<tr>
<th colspan="2"><?=getTranslation('playersaddusersuperadmin4')?></th>
</tr>
</thead>
<tbody>
<tr>
<td width="250"><?=getTranslation('playersaddusersuperadmin5')?> <span class="itext-2">*</span></td>
<td>
<input type="text" class="inputText" style="width:185px" name="user" id="ouser" onChange="userkontrol();">
<span class="itext-3" style="margin-left:15px;"><?=getTranslation('playersaddusersuperadmin6')?></span>
</td>
</tr>
<tr>
<td width="250"><?=getTranslation('playersaddusersuperadmin7')?> <span class="itext-2">*</span></td>
<td>
<input type="text" class="inputText" style="width:185px" name="sifre">
<span class="itext-3" style="margin-left:15px;"><?=getTranslation('playersaddusersuperadmin8')?></span>
</td>
</tr>
<tr>
<td width="250"><?=getTranslation('playersaddusersuperadmin9')?> </td>
<td>
<input type="text" class="inputText" style="width:185px" name="hatirlatmaad" id="huser" autocomplete="off">
<span class="itext-3" style="margin-left:15px;"><?=getTranslation('playersaddusersuperadmin10')?></span>
</td>
</tr>
<tr>
<td width="250"><?=getTranslation('playersaddusersuperadmin11')?></td>
<td>
<input type="text" class="inputText" style="width:185px" name="alt_sinir">
</td>
</tr>

<tr>
<td width="250"><?=getTranslation('playersaddusersuperadmin12')?></td>
<td>
<input type="text" class="inputText" style="width:185px" name="alt_sinir2">
</td>
</tr>


<tr>
<td class="last" colspan="2">
<input type="submit" class="btn btn-large btn-primary" name="submit" value="<?=getTranslation('playersaddusersuperadmin13')?>" id="kaydet">
</td>
</tr>
</tbody>
</table>
</form>
<script>
$(document).ready(function(e) {
    $("#kaydet").click(function(e) {
    var f = self.document.newu;
	if(f.user.value.length<2) { alertify.error('<?=getTranslation('playersaddusersuperadmin14')?>'); f.user.select(); } else
	if(f.sifre.value.length<1) { alertify.error('<?=getTranslation('playersaddusersuperadmin15')?>'); f.sifre.focus(); } else {
	f.submit();
	}
    });
});
</script>
<? } ?>
<script>
$(document).ready(function(e) {
    $("input").attr('autocomplete','off');
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

<? include 'footer.php'; ?>

</body>
</html>