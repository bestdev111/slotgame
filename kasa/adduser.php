<?PHP
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); exit(); }
if($ub['wkyetki']>0 || $ub['alt_alt_durum']<1) { header("Location:index.php"); }

$toplam_kullanici = sed_sql_numrows(sed_sql_query("select hesap_sahibi_id,root from kullanici where hesap_sahibi_id='$ub[id]' and root='0'"));
$admin_limiti = $ub['alt_sinir'];
$user_limiti = $ub['alt_sinir_2'];
$toplams_limit = bilgi("SELECT SUM(CASE WHEN id!='' THEN alt_sinir END) as toplam_limit FROM kullanici WHERE hesap_sahibi_id='$ub[id]' and root='0'");

$_SESSION['betuserayarid'] = pd("user");
$_SESSION['betuserayaridayarkullan'] = pd("ayarkullan");
$_SESSION['casino_yetki'] = pd("casino_yetki");

if(isset($_POST['submit'])) {
$username = pd("user");
$password = pd("sifre");
$hatirlatmaad = pd("hatirlatmaad");
$kupon_yetki = pd("kupon_yetki");
$casino_yetki = pd("casino_yetki");
$kontrol = sed_sql_query("select * from kullanici where username='$username'");
$altsinir = pd("alt_sinir");
$zaman = time();

if($altsinir<1){
	$altsinir = 0;
} else {
	$altsinir = $altsinir;
}

$hesapla_limit = $admin_limiti-$toplam_kullanici;

if(strlen($username)<4) {
$onaylandi = 111;
} else if(sed_sql_numrows($kontrol)>0) { 
$onaylandi = 3;
} else if(empty($password)) {
$onaylandi = 4;
} else if($hesapla_limit>0) {

sed_sql_query("INSERT INTO kullanici SET 
username='".$username."',
password='".$password."',
hatirlatmaad='".$hatirlatmaad."',
hesap_sahibi_user='".$ub['username']."',
hesap_sahibi_id='".$ub['id']."',
hesap_root_id='".$ub['hesap_sahibi_id']."',
hesap_root_root_id='".$ub['hesap_root_id']."',
alt_durum='1',
alt_alt_durum='0',
kupon_yetki='".$kupon_yetki."',
alt_sinir='".$altsinir."',
olusturma_zaman='".$zaman."',
casino_yetki='".$casino_yetki."',
websitesi='jackpotmatic.store'");

$onaylandi = 1;

} else {

$onaylandi = 2;

}

}
?>
<?php include 'header.php'; ?>

<main class="main">
<ol class="breadcrumb mb-0">
<li class="breadcrumb-item"><?=getTranslation('superadmin74')?></li>
</ol>
</div>
</div>

<? if($onaylandi==1) {
$useridver = $_SESSION['betuserayarid'];
$ayarkullan = $_SESSION['betuserayaridayarkullan'];
$casino_yetki = $_SESSION['casino_yetki'];
$kullanici_id = bilgi("select * from kullanici where username='$useridver' order by id DESC limit 1");
$kontrols2 = sed_sql_query("select * from sistemayar where ayar_id='".$kullanici_id['id']."'");
if(sed_sql_numrows($kontrols2)<1) {
sed_sql_query("INSERT INTO sistemayar SET ayar_id='".$kullanici_id['id']."',casino_yetki='".$casino_yetki."',ayarkullan='".$ayarkullan."'");
}
?>
<div class="alert alert-success mb-0" id="success" style="display:block;"><?=getTranslation('superadmin75')?></div>
<? } else if($onaylandi==2) { ?>
<div class="alert alert-danger mb-0" id="error" style="display:block;"><?=getTranslation('superadmin76')?></div>
<? } else if($onaylandi==3) { ?>
<div class="alert alert-info mb-0" id="info" style="display:block;"><?=getTranslation('superadmin77')?></div>
<? } else if($onaylandi==4) { ?>
<div class="alert alert-info mb-0" id="info" style="display:block;"><?=getTranslation('superadmin78')?></div>
<? } else if($onaylandi==111) { ?>
<div class="alert alert-info mb-0" id="info" style="display:block;">En az 4 Harfli Kullanıcı Adı Belirlemelisiniz.</div>
<? } ?>

<? if($admin_limiti-$toplam_kullanici==0) { ?>

<br>

<div class="row container">
<div class="col-xs-12 col-sm-4 col-lg-3" style="width:100%;">
<div class="card card-inverse card-danger">
<div class="card-block p-1">
<div style="font-weight: bold;"><?=getTranslation('yeniyerler_kasa86')?> <?=$admin_limiti;?></div>
</div>
</div>
</div>
</div>

<? } else { ?>

<div class="container-fluid mt-2">
<div class="row">
<div class="row">
<form id="dealer-form" method="post" name="newu">
<div class="col-sm-6">
<div class="card">
<div class="card-header"><?=getTranslation('superadmin79')?></div>
<div class="card-block">

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa148')?></label>
<input type="text" class="form-control" maxlength="150" placeholder="<?=getTranslation('yeniyerler_kasa148')?>" name="user" id="ouser" onChange="userkontrol();">
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa149')?></label>
<div class="input-group">
<input type="text" class="form-control" maxlength="20" id="sifre" name="sifre">
<span class="input-group-btn">
<button class="btn btn-link" type="button" onclick="generatePassword();"><?=getTranslation('yeniyerler_kasa150')?></button>
</span>
</div>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa151')?></label>
<input type="text" class="form-control" maxlength="150" name="hatirlatmaad" id="huser" autocomplete="off">
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa165')?></label>
<select class="form-control" name="casino_yetki" id="casino_yetki">
<option value="1"><?=getTranslation('yeniyerler_kasa166')?></option>
<option value="0"><?=getTranslation('yeniyerler_kasa167')?></option>
</select>
</div>

<div class="form-group">
<label for=""><?=getTranslation('superadmin84')?></label>
<font style="float: right;"><?=getTranslation('superadmin85')?> ( <span style="color:red;"><?=$admin_limiti;?></span> ) / <?=getTranslation('superadmin86')?> ( <span style="color:red;"><?=$admin_limiti-$toplam_kullanici;?></span> )</font>
</div>

<div class="form-group">
<label for=""><?=getTranslation('superadmin87')?></label>
<font style="float: right;"><?=getTranslation('superadmin85')?> ( <span style="color:red;"><?=$user_limiti;?></span> ) / <?=getTranslation('superadmin86')?> ( <span style="color:red;"><?=$user_limiti-$toplams_limit['toplam_limit'];?></span> )</font>
</div>

<div class="form-group">
<label for=""><?=getTranslation('superadmin88')?></label>
<font style="float: right;font-weight:bold;color:#f00;"><?=getTranslation('superadmin89')?></font>
<input type="text" class="form-control" name="alt_sinir">
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa168')?></label>
<select class="form-control" name="kupon_yetki" id="kupon_yetki">
<option value="1"><?=getTranslation('yeniyerler_kasa169')?></option>
<option value="0"><?=getTranslation('yeniyerler_kasa170')?></option>
</select>
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa171')?></label>
<select class="form-control" name="ayarkullan" id="ayarkullan">
<option value="1"><?=getTranslation('yeniyerler_kasa172')?></option>
<option value="0"><?=getTranslation('yeniyerler_kasa173')?></option>
</select>
</div>

</div>
</div>
</div>
<div class="col-sm-12">
<div class="card card-block">
<button type="submit" class="btn btn-success" name="submit" id="kaydet"><?=getTranslation('yeniyerler_kasa155')?></button>
</div>
</div>
</form>
</div>
</div>
</div>

<script>
function randomize(length, chars){
if (!chars) {
var chars = "abcdefghijklmnopqrstuvyz1234567890";
}
var str = "";
for (var x = 0; x < length; x++) {
var i = Math.floor(Math.random() * chars.length);
str += chars.charAt(i);
}
return str;
}

function generatePassword(){
var passwordChars = randomize(6, 'abcdefghikmnprstuvyz1234567890');
$('#sifre').val(passwordChars);
}
generatePassword();
$(document).ready(function(e) {
    $("#kaydet").click(function(e) {
    var f = self.document.newu;
	if(f.user.value.length<2) { alertify.error('<?=getTranslation('playersaddusersuper23')?>'); f.user.select(); } else
	if(f.sifre.value.length<1) { alertify.error('<?=getTranslation('playersaddusersuper24')?>'); f.sifre.focus(); } else {
	f.submit();
	}
    });
});
</script>

<script>
$(document).ready(function(e) {
    $("input").attr('autocomplete','off');
});
</script>

<? } ?>

</main>

<?php include 'footer.php'; ?>

</body>
</html>