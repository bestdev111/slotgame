<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); die(); exit(); }
if($ub['alt_durum']<1 && $ub['wkyetki']<1 && $ub['alt_alt_durum']<1 && $ub['sahip']=="0") { header("Location:index.php"); }
if($ub['adminpanel']=="1") { header("Location:admin"); }

function domain($domain){
    preg_match('#(?:http://)?(?:www\.)?([a-zA-Z0-9\-\.]+)/?#is', $domain, $d);
    return $d[1];
}

$toplam_kullanici = sed_sql_numrows(sed_sql_query("select hesap_sahibi_id,root from kullanici where hesap_sahibi_id='$ub[id]' and root='0'"));
$kendilimitim = $ub['alt_sinir'];
$toplams_limit = bilgi("SELECT SUM(CASE WHEN id!='' THEN alt_sinir END) as toplam_limit FROM kullanici WHERE hesap_sahibi_id='$ub[id]' and root='0'");
$alt_sinirini_bul = $kendilimitim-$toplam_kullanici-$toplams_limit['toplam_limit'];


if(isset($_POST['submit'])) {

$bayisilmeyetki = pd("bayisilme");
$username = pd("user");
$password = pd("sifre");
$hatirlatmaad = pd("hatirlatmaad");
$active = pd("active");
$websitesi = domain($_SERVER["SERVER_NAME"]);
$wkyetki = "1";
$altsinir = pd("alt_sinir");
$kontrol = sed_sql_query("select * from kullanici where username='$username'");
$zaman = time();

if($active>0){ $durum = 1; } else { $durum = 0; }

$hesapla_limit = $kendilimitim-$toplams_limit['toplam_limit']-$altsinir-1;

if(strlen($username)<4) {
$onaylandi = 111;
} else if(sed_sql_numrows($kontrol)>0) { 
$onaylandi = 3;
} else if($wkyetki<1) {
	$onaylandi = 5;
} else if(empty($password)) {
$onaylandi = 4;
} else if($hesapla_limit>0) {

sed_sql_query("INSERT INTO kullanici SET 
username='".$username."',
bayisilmeyetki='".$bayisilmeyetki."',
password='".$password."',
hatirlatmaad='".$hatirlatmaad."',
hesap_sahibi_user='".$ub['username']."',
hesap_sahibi_id='".$ub['id']."',
hesap_root_id='".$ub['hesap_sahibi_id']."',
hesap_root_root_id='".$ub['hesap_root_id']."',
n_calisma_sekli='2',
n_komisyon='0',
kazananyuzde='0',
canlioynama='1',
wkyetki='".$wkyetki."',
durum='".$durum."',
alt_sinir='".$altsinir."',
olusturma_zaman='".$zaman."',
websitesi='".$websitesi."'");

$onaylandi = 1;

} else {

$onaylandi = 2;

}

}
?>
<?php include 'header.php'; ?>

<main class="main">
<ol class="breadcrumb mb-0">
<li class="breadcrumb-item"><?=getTranslation('yeniyerler_kasa156')?></li>
</ol>
</div>
</div>

<? if($onaylandi==1) { ?>
<div class="alert alert-success mb-0" id="success" style="display:block;"><?=getTranslation('adduseradmin1')?></div>
<? } else if($onaylandi==2) { ?>
<div class="alert alert-danger mb-0" id="error" style="display:block;"><?=getTranslation('adduseradmin2')?></div>
<? } else if($onaylandi==3) { ?>
<div class="alert alert-info mb-0" id="info" style="display:block;"><?=getTranslation('adduseradmin3')?></div>
<? } else if($onaylandi==4) { ?>
<div class="alert alert-info mb-0" id="info" style="display:block;"><?=getTranslation('adduseradmin4')?></div>
<? } else if($onaylandi==5) { ?>
<div class="alert alert-info mb-0" id="info" style="display:block;"><?=getTranslation('adduseradmin5')?></div>
<? } else if($onaylandi==111) { ?>
<div class="alert alert-info mb-0" id="info" style="display:block;"><?=getTranslation('yeniyerler_kasa488')?></div>
<? } ?>

<? if($kendilimitim-$toplam_kullanici-$toplams_limit['toplam_limit']<1) { ?>

<br>

<div class="row container">
<div class="col-xs-12 col-sm-4 col-lg-3" style="width:100%;">
<div class="card card-inverse card-danger">
<div class="card-block p-1">
<div style="font-weight: bold;"><?=getTranslation('yeniyerler_kasa86')?> <?=$kendilimitim;?></div>
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
<div class="card-header">
<?=getTranslation('yeniyerler_kasa157')?>
</div>
<div class="card-block">
<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa148')?></label>
<input type="text" class="form-control" name="user" id="ouser" onChange="userkontrol();" placeholder="<?=getTranslation('yeniyerler_kasa148')?>">
</div>
<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa158')?>: <?=$alt_sinirini_bul-1;?> </label>
<input type="text" class="form-control" min="0" max="<?=$alt_sinirini_bul-1;?>" placeholder="<?=getTranslation('yeniyerler_kasa489')?>" name="alt_sinir">
</div>
<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa151')?></label>
<input type="text" class="form-control" name="hatirlatmaad" id="huser" autocomplete="off" placeholder="<?=getTranslation('yeniyerler_kasa487')?>">
</div>
</div>
</div>
</div>
<div class="col-sm-6">
<div class="card">
<div class="card-header">
<?=getTranslation('yeniyerler_kasa159')?>
</div>
<div class="card-block">
<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa149')?></label>
<div class="input-group">
<input type="text" class="form-control" name="sifre" id="sifre">
<span class="input-group-btn">
<button class="btn btn-link" type="button" onclick="generatePassword();"><?=getTranslation('yeniyerler_kasa150')?></button>
</span>
</div>
</div>
<div class="form-group">
<label for=""><?=getTranslation('bayisilmeyetki')?></label>
<div class="input-group">
<label class="check-item check-red">
<input type="radio" name="bayisilme" value="1" checked="">
<span><?=getTranslation('yaziciayar22')?></span>
</label>
<label class="check-item" style="margin-left: 10px;">
<input type="radio" name="bayisilme" value="0">
<span><?=getTranslation('yaziciayar23')?></span>
</label>
</div>
</div>
<div class="form-check mt-2">
<label class="form-check-label">
<input class="form-check-input" type="checkbox" name="active" checked="" value="1"> <?=getTranslation('yeniyerler_kasa160')?></label>
</div>
</div>
</div>
</div>
<div class="col-sm-12">
<div class="card card-block">
<button type="submit" class="btn btn-success" name="submit"  id="kaydet"><?=getTranslation('yeniyerler_kasa155')?></button>
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
	if(f.user.value.length<2) { alertify.error('<?=getTranslation('adduseradmin62')?>'); f.user.select(); } else
	if(f.sifre.value.length<1) { alertify.error('<?=getTranslation('adduseradmin63')?>'); f.sifre.focus(); } else {
	f.submit();
	}
    });
});
$(document).ready(function(e) {
    $("input").attr('autocomplete','off');
});
</script>
<? } ?>

</main>

<?php include 'footer.php'; ?>

</body>
</html>