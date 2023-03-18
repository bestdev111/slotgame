<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); exit(); }
if($ub['sahip']!=1) { header("Location:index.php"); }

$toplam_kullanici = sed_sql_numrows(sed_sql_query("select hesap_sahibi_id,root from kullanici where hesap_sahibi_id='$ub[id]' and root='0'"));
$admin_limiti = $ub['alt_sinir'];
$user_limiti = $ub['alt_sinir_2'];
$toplams_limit = bilgi("SELECT SUM(CASE WHEN id!='' THEN alt_sinir END) as toplam_limit FROM kullanici WHERE hesap_sahibi_id='$ub[id]' and root='0'");

if(isset($_POST['submit'])) {

$username = pd("user");
$password = pd("sifre");
$hatirlatmaad = pd("hatirlatmaad");
$kontrol = sed_sql_query("select * from kullanici where username='$username'");
$altsinir = pd("alt_sinir");
$altsinir2 = pd("alt_sinir_2");
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
kupon_yetki='1',
alt_sinir='".$altsinir."',
alt_sinir_2='".$altsinir2."',
olusturma_zaman='".$zaman."',
websitesi='jackpotmatic.store'");

$onaylandi = 1;

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

<? if($onaylandi==1) { ?>
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

<div class="container-fluid mt-2">
<div class="row">
<div class="row">
<form id="dealer-form" method="post" name="newu">
<div class="col-sm-6">
<div class="card">
<div class="card-header">
<?=getTranslation('superadmin79')?>
</div>
<div class="card-block">
<div class="form-group">
<label for=""><?=getTranslation('superadmin80')?></label>
<input type="text" class="form-control" maxlength="150" placeholder="<?=getTranslation('superadmin80')?>" name="user" id="ouser" onChange="userkontrol();">
</div>
<div class="form-group">
<label for=""><?=getTranslation('superadmin81')?></label>
<div class="input-group">
<input type="text" class="form-control" maxlength="20" id="sifre" name="sifre">
<span class="input-group-btn">
<button class="btn btn-link" type="button" onclick="generatePassword();"><?=getTranslation('superadmin82')?></button>
</span>
</div>
</div>
<div class="form-group">
<label for=""><?=getTranslation('superadmin83')?></label>
<input type="text" class="form-control" maxlength="150" name="hatirlatmaad" id="huser" autocomplete="off">
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa162')?></label>
<input type="text" class="form-control" name="alt_sinir">
</div>

<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa163')?></label>
<input type="text" class="form-control" name="alt_sinir_2">
</div>

</div>
</div>
</div>
<div class="col-sm-12">
<div class="card card-block">
<button type="submit" class="btn btn-success" name="submit" id="kaydet"><?=getTranslation('superadmin90')?></button>
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

</main>

<?php include 'footer.php'; ?>

</body>
</html>