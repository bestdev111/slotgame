<?php
session_start();
include '../db.php';
if(isset($_GET['logout'])) { 
sed_sql_query("delete from kupon where session_id='$session_id'");
session_unset(); }
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); exit(); }

function uyelerisilsuperbayi_icin($id) {
global $ub;
$bilgisi = bilgi("select * from kullanici where id='$id'");
$rand = time();
$bakiyesi = $bilgisi['bakiye'];
sed_sql_query("update kullanici set bakiye=bakiye+$bakiyesi where id='$ub[id]'");
sed_sql_query("update kullanici set bakiye='0',root='1',silinme_tarihi='".time()."' where id='$bilgisi[id]'");
}

if(isset($_GET['language'])){

$bilgile = bilgi("select * from language_content where name='".$ub['username']."' limit 1");
if($bilgile['id']==''){
sed_sql_query("INSERT INTO language_content SET name='".$ub['username']."', language='".$_GET['language']."'");
} else {
sed_sql_query("update language_content set language='".$_GET['language']."' where name='".$ub['username']."'");
}
header("Location:index.php");
}

$site_urlsi = $_SERVER['SERVER_NAME'];

if($_GET['s']=="search_musteri") {

$musteriadi = $_GET["musteriadi"];

if($musteriadi) { 
	$musteriadi_ekle = "and username like '%$musteriadi%'"; 
}

$sor = sed_sql_query("select * from kullanici where hesap_sahibi_id='$ub[id]' and root='0' $musteriadi_ekle LIMIT 10");
if(sed_sql_numrows($sor)<1) { die('<li style="display: flex;align-items: center;height: 100%;font-size: 14px;color: #2e303b;position: relative;margin-left: 5px;" class="uib-typeahead-match ng-scope">'.getTranslation('superadminmusteriyok').'</li>'); }
while($row=sed_sql_fetcharray($sor)) { ?>

<li style="display: flex;align-items: center;height: 100%;font-size: 14px;color: #2e303b;position: relative;margin-left: 5px;" class="uib-typeahead-match ng-scope">
<a href="detailed.php?id=<?=$row['id'];?>" class="ng-binding ng-scope"><?=$row['username'];?></a>
</li>

<? } ?>

<? } else if($_GET['s']=="userediting") { ?>

<?

## ŞİFRE ÜRETME KODLARI BAŞLANGIÇ##
function SifreUret(){
$alphabet = 'abcdefghijklnopqrstuvwxyz0123456789';
$pass = array(); //remember to declare $pass as an array
$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
for ($i = 0; $i < 6; $i++) {
$n = rand(0, $alphaLength);
$pass[] = $alphabet[$n];
}
return implode($pass); //turn the array into a string
}
## ŞİFRE ÜRETME KODLARI BİTİŞ ##

if(@$_POST){
## KREDİ LİMİTİ ATIM POST YERİ ##
if($_POST["islem"] == "in" and $_POST["type"] == 1){

$toplam_kullanicim = bilgi("select SUM(alt_sinir) as toplam from kullanici where hesap_sahibi_id='".$ub["id"]."' and root='0'");
$toplam_kullanici = sed_sql_numrows(sed_sql_query("select hesap_sahibi_id,root from kullanici where hesap_sahibi_id='$ub[id]' and root='0'"));

if($ub['alt_durum']==1 && $ub['alt_alt_durum']==1){
$toplam_ver = $ub['alt_sinir_2']-$toplam_kullanici-$toplam_kullanicim['toplam'];
} else {
$toplam_ver = $ub['alt_sinir']-$toplam_kullanici-$toplam_kullanicim['toplam'];
}
if($ub['alt_durum']==1 && $ub['alt_alt_durum']==1){
if($toplam_ver > 0 && $toplam_ver >= $_POST["limitstr"] && $_POST["limitstr"]!=''){
$kullanici_bakiyesi = bilgi("select * from kullanici where id='".$_POST["customerid"]."' and root='0' limit 1");
$yenilimiti = $kullanici_bakiyesi['alt_sinir'] + $_POST["limitstr"];
sed_sql_query("update kullanici set alt_sinir='".$yenilimiti."' where id='".$_POST["customerid"]."' and root='0'");
sed_sql_query("INSERT INTO hesap_hareket_gecici SET user_id='".$_POST['customerid']."',username='".$kullanici_bakiyesi['username']."',tip='ekle',tutar='".$_POST["limitstr"]."',aciklama='limitekleme',islemi_yapan='".$ub['username']."',zaman='".time()."',onceki_tutar='".$kullanici_bakiyesi['alt_sinir']."'");
echo "1";
}else{
echo "2";
exit();
}
} else {
if($toplam_ver > 0 && $toplam_ver >= $_POST["limitstr"] && $_POST["limitstr"]!=''){
$kullanici_bakiyesi = bilgi("select * from kullanici where id='".$_POST["customerid"]."' and root='0' limit 1");
$yenilimiti = $kullanici_bakiyesi['alt_sinir'] + $_POST["limitstr"];
sed_sql_query("update kullanici set alt_sinir='".$yenilimiti."' where id='".$_POST["customerid"]."' and root='0'");
sed_sql_query("INSERT INTO hesap_hareket_gecici SET user_id='".$_POST['customerid']."',username='".$kullanici_bakiyesi['username']."',tip='ekle',tutar='".$_POST["limitstr"]."',aciklama='limitekleme',islemi_yapan='".$ub['username']."',zaman='".time()."',onceki_tutar='".$kullanici_bakiyesi['alt_sinir']."'");
echo "1";
}else{
echo "2";
exit();
}
}
}


if($_POST["islem"] == "out" and $_POST["type"] == 2){
$kullanici_bakiyesi = bilgi("select * from kullanici where id='".$_POST["customerid"]."' and root='0' limit 1");
if($kullanici_bakiyesi['alt_sinir'] >= $_POST["limitstr"] and $_POST["limitstr"]!=''){
$yenilimiti = $kullanici_bakiyesi['alt_sinir'] - $_POST["limitstr"];
sed_sql_query("update kullanici set alt_sinir='".$yenilimiti."' where id='".$_POST["customerid"]."' and root='0'");
sed_sql_query("INSERT INTO hesap_hareket_gecici SET user_id='".$_POST['customerid']."',username='".$kullanici_bakiyesi['username']."',tip='cikar',tutar='".$_POST["limitstr"]."',aciklama='limitcikarma',islemi_yapan='".$ub['username']."',zaman='".time()."',onceki_tutar='".$kullanici_bakiyesi['alt_sinir']."'");
echo "1";
}else{
echo "2";
exit();
}
}
## KREDİ ATIM YERİ POST BİTİŞ ##

## BAKİYE ATIM POST YERİ ##
if($_POST["islem"] == "bakiyein" and $_POST["type"] == 1){
if($_POST["limitstr"]>0){

if($ub["wkyetki"]>0){
if($ub["bakiye"]>=$_POST["limitstr"]){
$kullanici_bakiyesi = bilgi("select * from kullanici where id='".$_POST["customerid"]."' and root='0' limit 1");
$yenilimiti = $kullanici_bakiyesi['bakiye'] + $_POST["limitstr"];
$yenilimitkendim = $ub['bakiye'] - $_POST["limitstr"];
sed_sql_query("update kullanici set bakiye='".$yenilimiti."' where id='".$_POST["customerid"]."' and root='0'");
sed_sql_query("update kullanici set bakiye='".$yenilimitkendim."' where id='".$ub["id"]."' and root='0'");
sed_sql_query("INSERT INTO hesap_hareket SET user_id='".$_POST['customerid']."',username='".$kullanici_bakiyesi['username']."',tip='ekle',tutar='".$_POST["limitstr"]."',aciklama='Bahis Hesabından - Müşteriye',islemi_yapan='".$ub['username']."',zaman='".time()."',onceki_tutar='".$kullanici_bakiyesi['bakiye']."'");
sed_sql_query("INSERT INTO hesap_hareket SET user_id='".$ub['id']."',username='".$ub['username']."',tip='bakiyecikar',tutar='".$_POST["limitstr"]."',aciklama='Müşteriye Aktarılan Bakiye',islemi_yapan='".$ub['username']."',zaman='".time()."',onceki_tutar='".$ub['bakiye']."'");
echo "1";
} else {
echo "2";
exit();
}
} else {

$kullanici_bakiyesi = bilgi("select * from kullanici where id='".$_POST["customerid"]."' and root='0' limit 1");
$yenilimiti = $kullanici_bakiyesi['bakiye'] + $_POST["limitstr"];
sed_sql_query("update kullanici set bakiye='".$yenilimiti."' where id='".$_POST["customerid"]."' and root='0'");
sed_sql_query("INSERT INTO hesap_hareket SET user_id='".$_POST['customerid']."',username='".$kullanici_bakiyesi['username']."',tip='ekle',tutar='".$_POST["limitstr"]."',aciklama='Kasadan - Bahis Hesabına',islemi_yapan='".$ub['username']."',zaman='".time()."',onceki_tutar='".$kullanici_bakiyesi['bakiye']."'");
echo "1";

}

}else{
echo "2";
exit();
}
}

if($_POST["islem"] == "bakiyeout" and $_POST["type"] == 2){
$kullanici_bakiyesi = bilgi("select * from kullanici where id='".$_POST["customerid"]."' and root='0' limit 1");
if($kullanici_bakiyesi['bakiye'] >= $_POST["limitstr"] and $_POST["limitstr"]!=''){
$yenilimiti = $kullanici_bakiyesi['bakiye'] - $_POST["limitstr"];
sed_sql_query("update kullanici set bakiye='".$yenilimiti."' where id='".$_POST["customerid"]."' and root='0'");
if($ub["wkyetki"]>0){
sed_sql_query("update kullanici set bakiye=bakiye+$_POST[limitstr] where id='".$ub["id"]."' and root='0'");
sed_sql_query("INSERT INTO hesap_hareket SET user_id='".$_POST['customerid']."',username='".$kullanici_bakiyesi['username']."',tip='cikar',tutar='".$_POST["limitstr"]."',aciklama='Müşteriden - Bahis Hesabına',islemi_yapan='".$ub['username']."',zaman='".time()."',onceki_tutar='".$kullanici_bakiyesi['bakiye']."'");
} else {
sed_sql_query("INSERT INTO hesap_hareket SET user_id='".$_POST['customerid']."',username='".$kullanici_bakiyesi['username']."',tip='cikar',tutar='".$_POST["limitstr"]."',aciklama='Bahis Hesabından - Kasaya',islemi_yapan='".$ub['username']."',zaman='".time()."',onceki_tutar='".$kullanici_bakiyesi['bakiye']."'");
}
echo "1";
}else{
echo "2";
exit();
}
}
## BAKİYE ATIM YERİ POST BİTİŞ ##

## CASİNO BAKİYE ATIM POST YERİ ##
if($_POST["islem"] == "casinobakiyein" and $_POST["type"] == 1){
if($_POST["limitstr"]>0){

if($ub["wkyetki"]>0){
if($ub["casinobakiye"]>=$_POST["limitstr"]){
$kullanici_bakiyesi = bilgi("select * from kullanici where id='".$_POST["customerid"]."' and root='0' limit 1");
$yenilimiti = $kullanici_bakiyesi['casinobakiye'] + $_POST["limitstr"];
$yenilimitkendim = $ub['casinobakiye'] - $_POST["limitstr"];
sed_sql_query("update kullanici set casinobakiye='".$yenilimiti."' where id='".$_POST["customerid"]."' and root='0'");
sed_sql_query("update kullanici set casinobakiye='".$yenilimitkendim."' where id='".$ub["id"]."' and root='0'");
sed_sql_query("INSERT INTO hesap_hareket SET user_id='".$_POST['customerid']."',username='".$kullanici_bakiyesi['username']."',tip='casinoekle',tutar='".$_POST["limitstr"]."',aciklama='Bahis Hesabından - Müşteriye',islemi_yapan='".$ub['username']."',zaman='".time()."',onceki_tutar='".$kullanici_bakiyesi['casinobakiye']."'");
sed_sql_query("INSERT INTO hesap_hareket SET user_id='".$ub['id']."',username='".$ub['username']."',tip='casinocikar',tutar='".$_POST["limitstr"]."',aciklama='Müşteriye Aktarılan Casino Bakiye',islemi_yapan='".$ub['username']."',zaman='".time()."',onceki_tutar='".$ub['casinobakiye']."'");
echo "1";
} else {
echo "2";
exit();
}
} else {

$kullanici_bakiyesi = bilgi("select * from kullanici where id='".$_POST["customerid"]."' and root='0' limit 1");
$yenilimiti = $kullanici_bakiyesi['casinobakiye'] + $_POST["limitstr"];
sed_sql_query("update kullanici set casinobakiye='".$yenilimiti."' where id='".$_POST["customerid"]."' and root='0'");
sed_sql_query("INSERT INTO hesap_hareket SET user_id='".$_POST['customerid']."',username='".$kullanici_bakiyesi['username']."',tip='casinoekle',tutar='".$_POST["limitstr"]."',aciklama='Kasadan - Bahis Hesabına',islemi_yapan='".$ub['username']."',zaman='".time()."',onceki_tutar='".$kullanici_bakiyesi['casinobakiye']."'");
echo "1";

}

}else{
echo "2";
exit();
}
}

if($_POST["islem"] == "casinobakiyeout" and $_POST["type"] == 2){
$kullanici_bakiyesi = bilgi("select * from kullanici where id='".$_POST["customerid"]."' and root='0' limit 1");
if($kullanici_bakiyesi['casinobakiye'] >= $_POST["limitstr"] and $_POST["limitstr"]!=''){
$yenilimiti = $kullanici_bakiyesi['casinobakiye'] - $_POST["limitstr"];
sed_sql_query("update kullanici set casinobakiye='".$yenilimiti."' where id='".$_POST["customerid"]."' and root='0'");
if($ub["wkyetki"]>0){
sed_sql_query("update kullanici set casinobakiye=casinobakiye+$_POST[limitstr] where id='".$ub["id"]."' and root='0'");
sed_sql_query("INSERT INTO hesap_hareket SET user_id='".$_POST['customerid']."',username='".$kullanici_bakiyesi['username']."',tip='casinocikar',tutar='".$_POST["limitstr"]."',aciklama='Müşteriden - Casino Bahis Hesabına',islemi_yapan='".$ub['username']."',zaman='".time()."',onceki_tutar='".$kullanici_bakiyesi['casinobakiye']."'");
} else {
sed_sql_query("INSERT INTO hesap_hareket SET user_id='".$_POST['customerid']."',username='".$kullanici_bakiyesi['username']."',tip='casinocikar',tutar='".$_POST["limitstr"]."',aciklama='Casino Bahis Hesabından - Kasaya',islemi_yapan='".$ub['username']."',zaman='".time()."',onceki_tutar='".$kullanici_bakiyesi['casinobakiye']."'");
}
echo "1";
}else{
echo "2";
exit();
}
}
## CASİNO BAKİYE ATIM YERİ POST BİTİŞ ##

## ŞİFRE SIFIRLAMA POST BAŞLANGIÇ ##
if($_POST["islem"] == "sifresifirla"){
$YeniSifre = SifreUret();
$kullanici_bilgisi_1 = sed_sql_query("select * from kullanici where id='".$_POST["id"]."' and hesap_sahibi_id='".$ub['id']."' and root='0' LIMIT 1");
if(sed_sql_numrows($kullanici_bilgisi_1)>0) {
sed_sql_query("update kullanici set password='".$YeniSifre."' where id='".$_POST["id"]."' and root='0' and hesap_sahibi_id='".$ub['id']."'");
echo "1";
}else{
echo "2";
exit();
}
}
## ŞİFRE SIFIRLAMA POST BİTİŞ ##

## PASİFLEŞTİRME POST BAŞLANGIÇ ##
if($_POST["islem"] == "kullanicidurumdegis"){

$id = $_POST["id"];

$durum = $_POST["durum"];

$bayilerim = "".benimbayilerim($ub['id']).",$id";

$bayi_array = explode(",",$bayilerim);

if(!in_array($id,$bayi_array)) { die("22"); }

bayidurumdegis($id,$durum);

}
## PASİFLEŞTİRME POST BİTİŞ ##

## BAYİ SİLME POST BAŞLANGIÇ ##
if($_POST["islem"] == "silmeyetkipost"){

$id = $_POST["id"];

$bayilerim = benimbayilerim($ub['id']);

$bayi_array = explode(",",$bayilerim);
if(!in_array($id,$bayi_array)) { die("22"); }

$kullanici_bilgi = bilgi("select id,bayisilmeyetki from kullanici where id='".$id."' and hesap_sahibi_id='".$ub['id']."' limit 1");
if($kullanici_bilgi['id']>0 && $kullanici_bilgi['bayisilmeyetki']==0){
sed_sql_query("update kullanici set bayisilmeyetki='1' where id='".$kullanici_bilgi['id']."'");
} else if($kullanici_bilgi['id']>0 && $kullanici_bilgi['bayisilmeyetki']==1){
sed_sql_query("update kullanici set bayisilmeyetki='0' where id='".$kullanici_bilgi['id']."'");
}

}
## BAYİ SİLME POST BİTİŞ ##

## KARALİSTEYE ALMA POST BAŞLANGIÇ ##
if($_POST["islem"] == "karalistepost"){

$id = $_POST["id"];

$bayilerim = benimbayilerim($ub['id']);

$bayi_array = explode(",",$bayilerim);
if(!in_array($id,$bayi_array)) { die("22"); }
if($ub['bayisilmeyetki']==0){
die("23");
} else if($ub['wkyetki']==1){
uyelerisilsuperbayi_icin($id);
} else {
uyelerisil($id);
}

if(file_exists("sistem/natoservers/hesap_sahibi_id_".$ub['id'].".xml")) {

unlink("sistem/natoservers/hesap_sahibi_id_".$ub['id'].".xml");

benimbayilerim($ub['id']);

}

}
## KARALİSTEYE ALMA POST BİTİŞ ##

## KARALİSTEDEN ÇIKARMA POST BAŞLANGIÇ ##
if($_POST["islem"] == "karalistepostgerigetir"){

$id = $_POST["id"];

$bayilerim = benimbayilerim($ub['id']);

$bayi_array = explode(",",$bayilerim);
if(!in_array($id,$bayi_array)) { die("22"); }

if($ub['wkyetki']==1){
$toplam_kullanici = sed_sql_numrows(sed_sql_query("select hesap_sahibi_id,root from kullanici where hesap_sahibi_id='$ub[id]' and root='0'"));
$admin_limiti = $ub['alt_sinir'];
$hesapla_limit = $admin_limiti-$toplam_kullanici;
} else if($ub['alt_durum']==1 && $ub['alt_alt_durum']==0){
$toplam_kullanici = sed_sql_numrows(sed_sql_query("select hesap_sahibi_id,root from kullanici where hesap_sahibi_id='$ub[id]' and root='0'"));
$admin_limiti = $ub['alt_sinir'];
$toplams_limit = bilgi("SELECT SUM(CASE WHEN id!='' THEN alt_sinir END) as toplam_limit FROM kullanici WHERE hesap_sahibi_id='$ub[id]' and root='0' and durum='1'");
$hesapla_limit = $admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit'];
$kullanici_bilgi = bilgi("select * from kullanici where id='".$id."' limit 1");
$kullanicinin_limiti = $kullanici_bilgi['alt_sinir'];
} else if($ub['alt_durum']==1 && $ub['alt_alt_durum']==1){
$toplam_kullanici_admin = sed_sql_numrows(sed_sql_query("select hesap_sahibi_id,root from kullanici where hesap_sahibi_id='$ub[id]' and root='0'"));
$hesapla_limit_admin = $ub['alt_sinir']-$toplam_kullanici_admin;

$toplams_limit_altsinirlar = bilgi("SELECT SUM(CASE WHEN id!='' THEN alt_sinir END) as toplam_limit FROM kullanici WHERE hesap_sahibi_id='$ub[id]' and root='0' and durum='1'");
$hesapla_limit_kullanicilimitim = $ub['alt_sinir_2']-$toplams_limit_altsinirlar['toplam_limit'];

$kullanici_bilgi = bilgi("select * from kullanici where id='".$id."' limit 1");
$kullanicinin_limiti = $kullanici_bilgi['alt_sinir'];
}

if($ub['wkyetki']==1 && $hesapla_limit>0){
uyelerigerial($id);
} else if($ub['alt_durum']==1 && $ub['alt_alt_durum']==0 && $hesapla_limit>=$kullanicinin_limiti){
uyelerigerial($id);
} else if($ub['alt_durum']==1 && $ub['alt_alt_durum']==1 && $hesapla_limit_admin>0 && $hesapla_limit_kullanicilimitim>=$kullanicinin_limiti){
uyelerigerial($id);
} else {
die("23");
}

if(file_exists("sistem/natoservers/hesap_sahibi_id_".$ub['id'].".xml")) {

benimbayilerim($ub['id']);

}

}
## KARALİSTEDEN ÇIKARMA POST BİTİŞ ##

}

?>

<? } else if($_GET['s']=="kupondegistir") { ?>

<?

if(@$_POST){
if($_POST["islem"] == "kupondegisim" and $_POST["type"] == 1){
## BAŞLANGIÇ##

$kupon_id = $_POST["kuponid"];

$yenidurum = $_POST["cdurum"];

$mevcutdurum = $_POST["durum"];

$line_id = $_POST["kuponicid"];

$bayilerim = explode(",",benimbayilerim($ub['id']));

$zaman = time();

$ipadres = $_SERVER['REMOTE_ADDR'];

$kupon_bilgi = bilgi("select * from kuponlar where id='$kupon_id' and casino='0' limit 1");

if(empty($kupon_bilgi['id'])) { die("2"); } else

if(!in_array($kupon_bilgi['user_id'],$bayilerim)) { die("2"); } else {

sed_sql_query("update kupon_ic set kazanma='$yenidurum' where id='$line_id'");

if($mevcutdurum!=$yenidurum) {

sed_sql_query("insert into kupon_data (id,kupon_id,kupon_ic_id,edit_user,edit_user_id,edit_durum,yeni_durum,zaman,ipadres) values

('','$kupon_id','$line_id','$ub[username]','$ub[id]','$mevcutdurum','$yenidurum','$zaman','$ipadres')");

}

kupon_hesapla($kupon_id);

die("1");

}

##BİTİŞ##

}

if($_POST["islem"] == "casinokupondegisim" and $_POST["type"] == 1){
## BAŞLANGIÇ##

$kupon_id = $_POST["kuponid"];

$yenidurum = $_POST["cdurum"];

$mevcutdurum = $_POST["durum"];

$line_id = $_POST["kuponicid"];

$bayilerim = explode(",",benimbayilerim($ub['id']));

$zaman = time();

$ipadres = $_SERVER['REMOTE_ADDR'];

$kupon_bilgi = bilgi("select * from kuponlar where id='$kupon_id' and casino='1' limit 1");

if(empty($kupon_bilgi['id'])) { die("2"); } else

if(!in_array($kupon_bilgi['user_id'],$bayilerim)) { die("2"); } else {

sed_sql_query("update kupon_ic_casino set kazanma='$yenidurum' where id='$line_id'");

if($mevcutdurum!=$yenidurum) {

sed_sql_query("insert into kupon_data (id,kupon_id,kupon_ic_id,edit_user,edit_user_id,edit_durum,yeni_durum,zaman,ipadres) values

('','$kupon_id','$line_id','$ub[username]','$ub[id]','$mevcutdurum','$yenidurum','$zaman','$ipadres')");

}

kupon_hesapla_casino($kupon_id);

die("1");

}

##BİTİŞ##

}

if($_POST["islem"] == "casinokupondegisimrulet" and $_POST["type"] == 1){
## BAŞLANGIÇ##

$kupon_id = $_POST["kuponid"];

$yenidurum = $_POST["cdurum"];

$mevcutdurum = $_POST["durum"];

$line_id = $_POST["kuponicid"];

$bayilerim = explode(",",benimbayilerim($ub['id']));

$zaman = time();

$ipadres = $_SERVER['REMOTE_ADDR'];

$kupon_bilgi = bilgi("select * from kuponlar where id='$kupon_id' and casino='2' limit 1");

if(empty($kupon_bilgi['id'])) { die("2"); } else

if(!in_array($kupon_bilgi['user_id'],$bayilerim)) { die("2"); } else {

if($mevcutdurum!=$yenidurum) {

sed_sql_query("update kupon_ic_rulet set kazanma='$yenidurum' where id='$line_id'");

sed_sql_query("insert into kupon_data (id,kupon_id,kupon_ic_id,edit_user,edit_user_id,edit_durum,yeni_durum,zaman,ipadres) values

('','$kupon_id','$line_id','$ub[username]','$ub[id]','$mevcutdurum','$yenidurum','$zaman','$ipadres')");

kupon_hesapla_rulet($kupon_id);

die("1");

} else {
	die("2");
}

}

##BİTİŞ##

}

}

?>

<? } else if($_GET['s']=="kuponiptal") { ?>

<?

$id = gd("id");

$row = bilgi("select * from kuponlar where id='$id' and casino!='1'");

$bayilerim = explode(",",benimbayilerim($ub['id']));

$user_id = $row['user_id'];
$yatan = $row['yatan'];
if($ub['kuponiptalyetki']!="1"){exit('401');}
if(!in_array($user_id,$bayilerim)) { die("401"); }

$baslama = $row['baslamatime'];

$yatirma_zaman = $row['kupon_time'];

$gecen_zaman = time()-$yatirma_zaman;

$silme_sure = $ayar['iptal_sure']*60;

$suan = time();

$baslamavefark = $baslama-$suan;

$ipadres = $_SERVER['REMOTE_ADDR'];

$tarih_ver = date("Y.m.d");

$iptalsayisi = bilgi("SELECT COUNT(CASE WHEN id!='' THEN id END) as toplam_iptal_adet FROM iptal_listesi WHERE iptal_user_id='$ub[id]' and tarih='$tarih_ver'");

$toplam_iptal_adeti = $iptalsayisi['toplam_iptal_adet'];

if($ayar['iptal_limit']<$toplam_iptal_adeti && $ub['alt_durum']==0) {
echo "405";
exit();
}

if(

($row['canli']=="0" && $gecen_zaman<$silme_sure && $baslamavefark>0 && $row['durum']!="4") || 

($ub['alt_durum']>0 && $baslamavefark>0 && $row['durum']!="4") || 

(($ub['alt_alt_durum']>0 || $ub['alt_durum']>0) && $row['durum']!="4")

) {

$kullanici_bilgisi = bilgi("select * from kullanici where id='$user_id'");

sed_sql_query("INSERT INTO iptal_listesi SET kupon_id='".$id."',iptal_zaman='".time()."',iptal_user_id='".$ub['id']."',iptal_username='".$ub['username']."',iptal_ip='".$ipadres."',kupon_user_id='".$kullanici_bilgisi['id']."',tarih = '".$tarih_ver."'");

sed_sql_query("INSERT INTO hesap_hareket_gecici2 SET user_id='".$kullanici_bilgisi['user_id']."',username='".$kullanici_bilgisi['username']."',tip='iptal',tutar = '".$yatan."',onceki_tutar = '".$kullanici_bilgisi['bakiye']."',aciklama = '".$row['id']." numaralı kupon iptal bedeli',islemi_yapan = '".$ub['username']."',zaman = '".time()."',detay = '1'");

sed_sql_query("update kuponlar set durum='4',iptalusername='".$ub['username']."',iptalipadres='".$ipadres."' where id='$id' and casino!='1'");

sed_sql_query("update kupon_ic set kazanma='4' where kupon_id='$id'");
sed_sql_query("update kullanici set bakiye=bakiye+$yatan where id='$user_id'");
kupon_hesapla($id);

} else {

die("404");	

}

?>

<? } else { ?>

<? include "header.php"; ?>

<? if($ub['alt_durum']==1 && $ub['alt_alt_durum']==1){ ?>

<?
$toplam_kullanici = sed_sql_numrows(sed_sql_query("select hesap_sahibi_id,root from kullanici where hesap_sahibi_id='$ub[id]' and root='0'"));
$toplam_kullanici_aktif = sed_sql_numrows(sed_sql_query("select hesap_sahibi_id,root from kullanici where hesap_sahibi_id='$ub[id]' and root='0' and durum='1'"));
$toplam_kullanici_pasif = sed_sql_numrows(sed_sql_query("select hesap_sahibi_id,root from kullanici where hesap_sahibi_id='$ub[id]' and root='0' and durum='0'"));
$admin_limiti = $ub['alt_sinir'];
$user_limiti = $ub['alt_sinir_2'];
$toplams_limit = bilgi("SELECT SUM(CASE WHEN id!='' THEN alt_sinir END) as toplam_limit FROM kullanici WHERE hesap_sahibi_id='$ub[id]' and root='0'");
?>

<main class="main">
<ol class="breadcrumb mb-0">
<li class="breadcrumb-item"><?=getTranslation('superadmin2')?></li>
</ol>
<div class="alert alert-danger mb-0" id="error"></div>
<div class="alert alert-info mb-0" id="info"></div>
<div class="alert alert-success mb-0" id="success"></div>
<div class="container-fluid mt-2">
<div class="row">

<? if($admin_limiti-$toplam_kullanici==0) { ?>

<div class="row container">
<div class="col-xs-12 col-sm-4 col-lg-3" style="width:100%;">
<div class="card card-inverse card-danger">
<div class="card-block p-1">
<div style="font-weight: bold;"><?=getTranslation('yeniyerler_kasa86')?> <?=$admin_limiti;?></div>
</div>
</div>
</div>
</div>

<? } ?>

<div class="card">
<div class="card-header"><?=getTranslation('yeniyerler_kasa87')?></div>
<div class="card-block p-0">
<div class="table-responsive">
<table class="table mb-0">
<tbody>
<tr>
<th class="text-xs-right"><?=getTranslation('yeniyerler_kasa93')?></th>
<td><code id="tm"><?=$toplam_kullanici;?></code></td>
<th class="text-xs-right"><?=getTranslation('yeniyerler_kasa94')?></th>
<td><code id="tma"><?=$toplam_kullanici_aktif;?></code></td>
<th class="text-xs-right"><?=getTranslation('yeniyerler_kasa95')?></th>
<td><code id="tmp"><?=$toplam_kullanici_pasif;?></code></td>
<th class="text-xs-right"><?=getTranslation('yeniyerler_kasa96')?></th>
<td><code id="tmb"><?=$admin_limiti;?></code></td>
</tr>
</tbody>
</table>

<table class="table mb-0">
<tbody>
<tr>
<th class="text-xs-right"><?=getTranslation('yeniyerler_kasa97')?></th>
<td><code id="tmb"><?=$user_limiti; ?></code></td>
<th class="text-xs-right"><?=getTranslation('yeniyerler_kasa98')?></th>
<td><code id="tm"><?=$user_limiti-$toplams_limit['toplam_limit'];?></code></td>
</tr>
</tbody>
</table>


</div>
</div>
</div>

<div class="card">
<div class="card-header font-weight-bold"><?=getTranslation('superadmin23')?></div>
<div class="card-block">
<div class="row container">
<div class="form-group col-sm-3">
<label for=""><?=getTranslation('superadmin24')?></label>
<input type="text" id="searchField" placeholder="<?=getTranslation('superadmin24')?>" class="form-control musteri-search-by" onkeypress="musteri_arama_ekrani();">
<ul id="search_ver" style="display:none;position: absolute;z-index: 1000;float: left;min-width: 160px;padding: 5px 0;width: 96%;margin: 2px 0 0;list-style: none;font-size: 14px;text-align: left;background-color: #fff;border: 1px solid rgba(0, 0, 0, 0.15);border-radius: 4px;box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);background-clip: padding-box;"></ul>
<div style="position: absolute;z-index: 2;right: 2.5%;margin-right: 22px;top: 25px;height: 22px;color: #9f9f9f;padding: 10px 0 10px 20px;display:none;" id="searchdeleteicon" class="deleteIcon" onclick="listelesene(5)">x</div>
</div>
<div class="form-group col-sm-3">
<label for=""><?=getTranslation('superadmin25')?></label>
<div class="easy-autocompletse" style=""><code>https://<?=$site_urlsi;?></code></div>
</div>
</div>
<div class="row container">
<div class="form-group col-xs-6 col-sm-3">
<? if($user_limiti-$toplams_limit['toplam_limit']==0) { ?>
<a href="musteri-tanimlama" class="btn btn-primary btn-block"><?=getTranslation('superadmin26')?></a>
<? } else { ?>
<a href="adduser.php" class="btn btn-primary btn-block"><?=getTranslation('superadmin7')?></a>
<? } ?>
</div>
</div>
</div>
</div>

</div>
</div>
</main>

<? } else if($ub['alt_durum']==1 && $ub['alt_alt_durum']==0){ ?>

<?
$toplam_kullanici = sed_sql_numrows(sed_sql_query("select hesap_sahibi_id,root from kullanici where hesap_sahibi_id='$ub[id]' and root='0'"));
$toplam_kullanici_aktif = sed_sql_numrows(sed_sql_query("select hesap_sahibi_id,root from kullanici where hesap_sahibi_id='$ub[id]' and root='0' and durum='1'"));
$toplam_kullanici_pasif = sed_sql_numrows(sed_sql_query("select hesap_sahibi_id,root from kullanici where hesap_sahibi_id='$ub[id]' and root='0' and durum='0'"));
$toplam_kullanici_bakiye = bilgi("SELECT SUM(CASE WHEN id!='' THEN bakiye END) as toplambakiye FROM kullanici WHERE hesap_sahibi_id='$ub[id]' and root='0'");


$admin_limiti = $ub['alt_sinir'];
$user_limiti = $ub['alt_sinir_2'];
$toplams_limit = bilgi("SELECT SUM(CASE WHEN id!='' THEN alt_sinir END) as toplam_limit FROM kullanici WHERE hesap_sahibi_id='$ub[id]' and root='0'");
?>

<main class="main">
<ol class="breadcrumb mb-0">
<li class="breadcrumb-item"><?=getTranslation('superadmin2')?></li>
</ol>
<div class="alert alert-danger mb-0" id="error"></div>
<div class="alert alert-info mb-0" id="info"></div>
<div class="alert alert-success mb-0" id="success"></div>
<div class="container-fluid mt-2">
<div class="row">

<div class="row container">


<div class="col-xs-6 col-sm-4 col-lg-3">
<div class="card card-inverse card-success">
<div class="card-block p-1">
<div class="h4 m-a-0" id="tabse"><?=getTranslation('yeniyerler_kasa88')?></div>
<div><?=getTranslation('yeniyerler_kasa89')?></div>
</div>
</div>
</div>


<div class="col-xs-6 col-sm-4 col-lg-3">
<div class="card card-inverse card-success">
<div class="card-block p-1">
<div class="h4 m-a-0" id="tabcsre"><?=getTranslation('yeniyerler_kasa88')?></div>
<div><?=getTranslation('yeniyerler_kasa90')?></div>
</div>
</div>
</div>

</div>

<? if($admin_limiti-$toplam_kullanici==0) { ?>

<div class="row container">
<div class="col-xs-12 col-sm-4 col-lg-3" style="width:100%;">
<div class="card card-inverse card-danger">
<div class="card-block p-1">
<div style="font-weight: bold;"><?=getTranslation('yeniyerler_kasa86')?> <?=$admin_limiti;?></div>
</div>
</div>
</div>
</div>

<? } ?>

<div class="card">
<div class="card-header font-weight-bold"><?=getTranslation('yeniyerler_kasa91')?></div>
<div class="card-block">
<div class="row container">
<div class="form-group col-sm-3">
<label for=""><?=getTranslation('yeniyerler_kasa92')?></label>
<input type="text" id="searchField" placeholder="<?=getTranslation('yeniyerler_kasa92')?>" class="form-control musteri-search-by" onkeypress="musteri_arama_ekrani();">
<ul id="search_ver" style="display:none;position: absolute;z-index: 1000;float: left;min-width: 160px;padding: 5px 0;width: 96%;margin: 2px 0 0;list-style: none;font-size: 14px;text-align: left;background-color: #fff;border: 1px solid rgba(0, 0, 0, 0.15);border-radius: 4px;box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);background-clip: padding-box;"></ul>
<div style="position: absolute;z-index: 2;right: 2.5%;margin-right: 22px;top: 25px;height: 22px;color: #9f9f9f;padding: 10px 0 10px 20px;display:none;" id="searchdeleteicon" class="deleteIcon" onclick="listelesene(5)">x</div>
</div>
<div class="form-group col-sm-3">
<label for=""><?=getTranslation('yeniyerler_kasa99')?></label>
<div class="easy-autocompletse" style=""><code>https://<?=$site_urlsi;?></code></div>
</div>
</div>
<div class="row container">
<div class="form-group col-xs-6 col-sm-3">
<? if($user_limiti-$toplams_limit['toplam_limit']==0) { ?>
<a href="musteri-tanimlama" class="btn btn-primary btn-block"><?=getTranslation('yeniyerler_kasa100')?></a>
<? } else { ?>
<a href="adduser.php" class="btn btn-primary btn-block"><?=getTranslation('yeniyerler_kasa101')?></a>
<? } ?>
</div>
</div>
</div>
</div>

<div class="card">
<div class="card-header"><?=getTranslation('yeniyerler_kasa87')?></div>
<div class="card-block p-0">
<div class="table-responsive">
<table class="table mb-0">
<tbody>

<tr>
<th class="text-xs-right"><?=getTranslation('yeniyerler_kasa102')?></th>
<td><code id="tm"><?=$toplam_kullanici;?></code></td>
<th class="text-xs-right"><?=getTranslation('yeniyerler_kasa103')?></th>
<td><code id="tma"><?=$toplam_kullanici_aktif;?></code></td>
<th class="text-xs-right"><?=getTranslation('yeniyerler_kasa104')?></th>
<td><code id="tmp"><?=$toplam_kullanici_pasif;?></code></td>
<th class="text-xs-right"><?=getTranslation('yeniyerler_kasa105')?></th>
<td><code id="tmb"><?=nf($toplam_kullanici_bakiye['toplambakiye']);?></code></td>
</tr>

<tr>
<th class="text-xs-right"><?=getTranslation('yeniyerler_kasa106')?></th>
<td><code id="tmb">0</code></td>
<th class="text-xs-right"><?=getTranslation('yeniyerler_kasa107')?></th>
<td><code id="tmb">0</code></td>
<th class="text-xs-right"><?=getTranslation('yeniyerler_kasa108')?></th>
<td><code id="tmb">0</code></td>
<th class="text-xs-right"><?=getTranslation('yeniyerler_kasa109')?></th>
<td><code id="tm">0.00</code></td>
</tr>

</tbody>
</div>
</div>
</div>

</div>
</div>
</main>

<? } else if($ub['wkyetki']==1){ ?>

<?
$toplam_kullanici = sed_sql_numrows(sed_sql_query("select hesap_sahibi_id,root from kullanici where hesap_sahibi_id='$ub[id]' and root='0'"));
$toplam_kullanici_aktif = sed_sql_numrows(sed_sql_query("select hesap_sahibi_id,root from kullanici where hesap_sahibi_id='$ub[id]' and root='0' and durum='1'"));
$toplam_kullanici_pasif = sed_sql_numrows(sed_sql_query("select hesap_sahibi_id,root from kullanici where hesap_sahibi_id='$ub[id]' and root='0' and durum='0'"));
$toplam_kullanici_bakiye = bilgi("SELECT SUM(CASE WHEN id!='' THEN bakiye END) as toplambakiye FROM kullanici WHERE hesap_sahibi_id='$ub[id]' and root='0'");

$admin_limiti = $ub['alt_sinir'];
$toplams_limit = bilgi("SELECT SUM(CASE WHEN id!='' THEN alt_sinir END) as toplam_limit FROM kullanici WHERE hesap_sahibi_id='$ub[id]' and root='0'");

## BAKİYESİ ##
$kullanici_bakiye_bol = explode(".",$ub['bakiye']);
$kullanici_bakiye_kurus = substr($kullanici_bakiye_bol[1], 0, 2);
if($kullanici_bakiye_kurus>0){
$bakiyele = substr(nf($kullanici_bakiye_bol[0]), 0, -3);
$bakiyesini_ver = "".$bakiyele.".".$kullanici_bakiye_kurus."";
} else {
$bakiyele = substr(nf($kullanici_bakiye_bol[0]), 0, -3);
$bakiyesini_ver = "".$bakiyele.".00";
}
## CASİNO BAKİYESİ ##
$kullanici_bakiye_bol_casino = explode(".",$ub['casinobakiye']);
$kullanici_bakiye_kurus_casino = substr($kullanici_bakiye_bol_casino[1], 0, 2);
if($kullanici_bakiye_kurus_casino>0){
$bakiyele_casino = substr(nf($kullanici_bakiye_bol_casino[0]), 0, -3);
$bakiyesini_ver_casino = "".$bakiyele_casino.".".$kullanici_bakiye_kurus_casino."";
} else {
$bakiyele_casino = substr(nf($kullanici_bakiye_bol_casino[0]), 0, -3);
$bakiyesini_ver_casino = "".$bakiyele_casino.".00";
}

?>

<main class="main">
<ol class="breadcrumb mb-0">
<li class="breadcrumb-item"><?=getTranslation('superadmin2')?></li>
</ol>
<div class="alert alert-danger mb-0" id="error"></div>
<div class="alert alert-info mb-0" id="info"></div>
<div class="alert alert-success mb-0" id="success"></div>
<div class="container-fluid mt-2">
<div class="row">

<div class="row container">


<div class="col-xs-6 col-sm-4 col-lg-3">
<div class="card card-inverse card-success">
<div class="card-block p-1">
<div class="h4 m-a-0" id="tabse"><?=$bakiyesini_ver; ?></div>
<div><?=getTranslation('yeniyerler_kasa89')?></div>
</div>
</div>
</div>


<div class="col-xs-6 col-sm-4 col-lg-3">
<div class="card card-inverse card-success">
<div class="card-block p-1">
<div class="h4 m-a-0" id="tabcsre"><?=$bakiyesini_ver_casino; ?></div>
<div><?=getTranslation('yeniyerler_kasa90')?></div>
</div>
</div>
</div>

</div>

<? if($admin_limiti-$toplam_kullanici==0) { ?>

<div class="row container">
<div class="col-xs-12 col-sm-4 col-lg-3" style="width:100%;">
<div class="card card-inverse card-danger">
<div class="card-block p-1">
<div style="font-weight: bold;"><?=getTranslation('yeniyerler_kasa86')?> <?=$admin_limiti;?></div>
</div>
</div>
</div>
</div>

<? } ?>

<div class="card">
<div class="card-header font-weight-bold"><?=getTranslation('yeniyerler_kasa91')?></div>
<div class="card-block">
<div class="row container">
<div class="form-group col-sm-3">
<label for=""><?=getTranslation('yeniyerler_kasa92')?></label>
<input type="text" id="searchField" placeholder="<?=getTranslation('yeniyerler_kasa92')?>" class="form-control musteri-search-by" onkeypress="musteri_arama_ekrani();">
<ul id="search_ver" style="display:none;position: absolute;z-index: 1000;float: left;min-width: 160px;padding: 5px 0;width: 96%;margin: 2px 0 0;list-style: none;font-size: 14px;text-align: left;background-color: #fff;border: 1px solid rgba(0, 0, 0, 0.15);border-radius: 4px;box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);background-clip: padding-box;"></ul>
<div style="position: absolute;z-index: 2;right: 2.5%;margin-right: 22px;top: 25px;height: 22px;color: #9f9f9f;padding: 10px 0 10px 20px;display:none;" id="searchdeleteicon" class="deleteIcon" onclick="listelesene(5)">x</div>
</div>
<div class="form-group col-sm-3">
<label for=""><?=getTranslation('yeniyerler_kasa99')?></label>
<div class="easy-autocompletse" style=""><code>https://<?=$site_urlsi;?></code></div>
</div>
</div>
<div class="row container">
<div class="form-group col-xs-6 col-sm-3">
<? if($admin_limiti-$toplam_kullanici==0) { ?>
<a href="musteri-tanimlama" class="btn btn-primary btn-block"><?=getTranslation('yeniyerler_kasa100')?></a>
<? } else { ?>
<a href="adduser.php" class="btn btn-primary btn-block"><?=getTranslation('yeniyerler_kasa101')?></a>
<? } ?>
</div>
</div>
</div>
</div>

<div class="card">
<div class="card-header"><?=getTranslation('yeniyerler_kasa87')?></div>
<div class="card-block p-0">
<div class="table-responsive">
<table class="table mb-0">
<tbody>

<tr>
<th class="text-xs-right"><?=getTranslation('yeniyerler_kasa106')?></th>
<td><code id="tmb"><?=$toplam_kullanici;?></code></td>
<th class="text-xs-right"><?=getTranslation('yeniyerler_kasa107')?></th>
<td><code id="tmb"><?=$toplam_kullanici_aktif;?></code></td>
<th class="text-xs-right"><?=getTranslation('yeniyerler_kasa108')?></th>
<td><code id="tmb"><?=$toplam_kullanici_pasif;?></code></td>
<th class="text-xs-right"><?=getTranslation('yeniyerler_kasa109')?></th>
<td><code id="tm"><?=nf($toplam_kullanici_bakiye['toplambakiye']);?></code></td>
</tr>

</tbody>
</div>
</div>
</div>

</div>
</div>
</main>

<? } // bitiş ?>

<script>
function musteri_arama_ekrani() {
var karakter = $("#searchField").val().length;
if(karakter>1) { listelesene(0); } else { listelesene(1); }
}
function listelesene(val) {
if(val==5){
	$("#search_ver").css('display','none');
	$("#search_ver").html('');
	$("#searchdeleteicon").hide();
	$("#searchField").val('');
} else if(val==1){
	$("#search_ver").css('display','none');
	$("#search_ver").html('');
	$("#searchdeleteicon").hide();
} else {
	var arananmusteri = $("#searchField").val();
	$.get('index.php?s=search_musteri&musteriadi='+arananmusteri+'',function(data) {
	$("#search_ver").html(data);
	$("#search_ver").css('display','block');
	$("#searchdeleteicon").show();
	});
}

}
</script>

<?php include "footer.php"; ?>

<? } ?>