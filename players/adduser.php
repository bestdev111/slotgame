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
if($bakiye>0 && $bakiye<$ub['bakiye']) {
$buid = bilgi("select id,hesap_sahibi_id from kullanici where hesap_sahibi_id='$ub[id]' order by id desc limit 1");
hesap_hareket('ekle',$username,$buid['id'],$bakiye,'Hesap açılırken eklendi.');
hesap_hareket('cikar',$username,$ub['id'],$bakiye,''.$username.' Adlı Müşterisine '.$ub['username'].' Ekledi');
}

$onaylandi = 1;

} else {

$onaylandi = 2;

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
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('uyariadduser1')?></div>
<? } else if($onaylandi==2) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('uyariadduser2')?></div>
<? } else if($onaylandi==3) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('uyariadduser3')?></div>
<? } else if($onaylandi==4) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('uyariadduser4')?></div>
<? } else if($onaylandi==111) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();">En az 4 Harfli Kullanıcı Adı Belirlemelisiniz.</div>
<? } ?>

<? if($admin_limiti-$toplam_kullanici<1) { ?>

<div class="new_sheet cf panelHead" style="margin-top: 0px;height: 25px;line-height: 25px;text-align: center;background: #fff;border-bottom: 3px solid #ef8107;border-top: 3px solid #ef8107;"><?=getTranslation('addussertanimlama1')?> <?=$user_limiti;?> <?=getTranslation('addussertanimlama2')?></div>
</div>

<? } else { ?>


<?
## SÜPER BAYİ İLE MÜŞTERİ OLUŞTURMA TABLOSU ##
if($ub['wkyetki']=="1") {
?>
<form method="post" name="newu">

<table class="tablesorter">
<thead>
<tr>
<th colspan="2"><?=getTranslation('addussermusteriolusturmaformu')?></th>
</tr>
</thead>
<tbody>
<tr>
<td width="250"><?=getTranslation('addusserkullaniciadi')?> <span class="itext-2">*</span></td>
<td>
<input type="text" class="inputText" style="width:185px" name="user" id="ouser" onChange="userkontrol();">
<span class="itext-3" style="margin-left:15px;"><?=getTranslation('addusserinputaciklama')?> (<strike>ü,ö,ş,ı,ğ</strike>)</span>
</td>
</tr>
<tr>
<td width="250"><?=getTranslation('addussersifre')?> <span class="itext-2">*</span></td>
<td>
<input type="text" class="inputText" style="width:185px" name="sifre">
<span class="itext-3" style="margin-left:15px;"><?=getTranslation('addusserinputaciklama')?></span>
</td>
</tr>
<tr>
<td width="250"><?=getTranslation('addusserhatirlatmaadi')?> </td>
<td>
<input type="text" class="inputText" style="width:185px" name="hatirlatmaad" id="huser" autocomplete="off">
<span class="itext-3" style="margin-left:15px;"><?=getTranslation('addusserinputaciklama2')?></span>
</td>
</tr>
<tr>
<td width="250"><?=getTranslation('addusserbaslangiclimiti')?> </td>
<td>
<input type="text" class="inputText" style="width:45px" name="bakiye" value="0"><span class="itext-3" style="margin-left:15px;"><?=getTranslation('parabirimi')?></span>
<strong style="color:#F00;"><?=getTranslation('addusserinputaciklama3')?> <?=nf($ub['bakiye']);?> <?=getTranslation('addusserinputaciklama4')?></strong>
<span class="itext-3"><br><?=getTranslation('addusserinputaciklama5')?><br><?=getTranslation('addusserinputaciklama6')?></span>
</td>
</tr>
<tr>
<td width="250"><?=getTranslation('addusserkullanicilimitiniz')?></td>
<td>
<span class="itext-3" style="margin-left:15px;"><?=getTranslation('addussermevcutlimit')?> ( <span style="color:red;"><?=$admin_limiti;?></span> ) / <?=getTranslation('addusserkalanlimit')?> ( <span style="color:red;"><?=$admin_limiti-$toplam_kullanici; ?></span> )</span>
</td>
</tr>
<tr>
<td class="last" colspan="2">
<input type="submit" class="btn btn-large btn-primary" name="submit" value="HESAP AÇ" id="kaydet">
</td>
</tr>
</tbody>
</table>
</form>
<script>
$(document).ready(function(e) {
    $("#kaydet").click(function(e) {
    var f = self.document.newu;
	if(f.user.value.length<2) { alertify.error('Geçerli bir kullanıcı adı yazınız'); f.user.select(); } else
	if(f.sifre.value.length<1) { alertify.error('Geçerli bir şifre yazınız'); f.sifre.focus(); } else {
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
<? } ?>

<table class="tablesorter">
<thead>
<tr>
<th colspan="2"><?=getTranslation('addusseruyelikbilgilendirme')?></th>
</tr>
</thead>
<tbody>
<tr>
<td style="width:100px;"><?=getTranslation('addussermusteriaciklama')?></td>
<td><?=getTranslation('addussermusteriaciklama1')?>
<br><br>
<i><?=getTranslation('addussermusteriaciklama2')?></i></td>
</tr>
</tbody>
</table>

<table class="tablesorter">
<thead>
<tr>
<th><?=getTranslation('addussermusteriaciklama3')?></th>
<th><?=getTranslation('addussermusteriaciklama')?></th>
</tr>
</thead>
<tbody>
<tr>
<td><?=getTranslation('addussermusteriaciklama4')?></td>
<td class="c" style="text-align:center;"><img src="/players/img/check_2.png" alt="Yetkiler" border="0"></td>
</tr>
<tr>
<td><?=getTranslation('addussermusteriaciklama5')?></td>
<td class="c" style="text-align:center;"><img src="/players/img/check_2.png" alt="Yetkiler" border="0"></td>
</tr>
<tr>
<td><?=getTranslation('addussermusteriaciklama6')?></td>
<td class="c" style="text-align:center;"><img src="/players/img/check.png" alt="Yetkiler" border="0"></td>
</tr>
<tr>
<td><?=getTranslation('addussermusteriaciklama7')?></td>
<td class="c" style="text-align:center;"><img src="/players/img/check.png" alt="Yetkiler" border="0"></td>
</tr>
<tr>
<td><?=getTranslation('addussermusteriaciklama8')?></td>
<td class="c" style="text-align:center;"><img src="/players/img/check.png" alt="Yetkiler" border="0"></td>
</tr>
</tbody>
</table>

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