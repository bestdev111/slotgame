<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); die(); exit(); }
if($ub['wkyetki']!=1) { header("Location:index.php"); }
if($ub['adminpanel']=="1") { header("Location:admin"); }

function domain($domain){
    preg_match('#(?:http://)?(?:www\.)?([a-zA-Z0-9\-\.]+)/?#is', $domain, $d);
    return $d[1];
}

$toplam_kullanici = sed_sql_numrows(sed_sql_query("select hesap_sahibi_id,root from kullanici where hesap_sahibi_id='$ub[id]' and root='0'"));
$admin_limiti = $ub['alt_sinir'];

if(isset($_POST['submit'])) {

$username = pd("user");
$password = pd("sifre");
$hatirlatmaad = pd("hatirlatmaad");
$websitesi = domain($_SERVER["SERVER_NAME"]);
$kontrol = sed_sql_query("select * from kullanici where username='$username'");
$zaman = time();

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
wkyetki='3',
wkdurum='1',
alt_sinir='0',
olusturma_zaman='".$zaman."',
websitesi='".$websitesi."'");

$bakiye = pd("bakiye");
if($bakiye>0 && $bakiye<=$ub['bakiye']) {
$buid = bilgi("select id,hesap_sahibi_id from kullanici where hesap_sahibi_id='$ub[id]' order by id desc limit 1");
hesap_hareketweb('ekle',$username,$buid['id'],$ub['id'],$bakiye,'Hesap açılırken eklendi.');
}

$onaylandi = 1;

} else {

$onaylandi = 2;

}

}
?>
<?php include 'header.php'; ?>

<main class="main">
<ol class="breadcrumb mb-0">
<li class="breadcrumb-item"><?=getTranslation('yeniyerler_kasa143')?></li>
</ol>
</div>
</div>

<? if($onaylandi==1) { ?>
<div class="alert alert-success mb-0" id="success" style="display:block;"><?=getTranslation('yeniyerler_kasa144')?></div>
<? } else if($onaylandi==2) { ?>
<div class="alert alert-danger mb-0" id="error" style="display:block;"><?=getTranslation('yeniyerler_kasa145')?></div>
<? } else if($onaylandi==3) { ?>
<div class="alert alert-info mb-0" id="info" style="display:block;"><?=getTranslation('yeniyerler_kasa146')?></div>
<? } else if($onaylandi==4) { ?>
<div class="alert alert-danger mb-0" id="error" style="display:block;"><?=getTranslation('yeniyerler_kasa147')?></div>
<? } else if($onaylandi==111) { ?>
<div class="alert alert-info mb-0" id="info" style="display:block;">En az 4 Harfli Kullanıcı Adı Belirlemelisiniz.</div>
<? } ?>

<? if($admin_limiti-$toplam_kullanici<1) { ?>

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
<div class="card-header"><?=getTranslation('yeniyerler_kasa143')?></div>
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
<label for=""><?=getTranslation('yeniyerler_kasa152')?></label>
<input type="text" class="form-control" style="width:100px;display: initial;" name="bakiye" value="0">
<span class="itext-3" style="margin-left:15px;">TL</span>
<br>
<strong style="color:#F00;"><?=nf($ub['bakiye']);?> <?=getTranslation('yeniyerler_kasa153')?></strong>
<span class="itext-3"><br><?=getTranslation('yeniyerler_kasa154')?></span>
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