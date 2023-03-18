<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:login.php"); die(); exit(); }

$a=$_GET["a"];

if($a=="kupontemizle") {

sed_sql_query("delete from kupon_casino where session_id='$session_id'");

die("11");

}


if($a=="sil") {
$str = intval($_POST["id"]);
sed_sql_query("delete from kupon_casino where session_id='$session_id' and id='$str'");

die("11");

}


if($a=="kuponok") {

function curl($adres){
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$adres);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 5);
return  curl_exec($ch);
curl_close($ch);
}

$tutar = pd("tutar");

$kuponadi = pd("kuponadi");

$kupon_yatan_bol = explode('.',$tutar);

if($kupon_yatan_bol[1]>0){
	$kuponda_kurus_var = 1;
} else {
	$kuponda_kurus_var = 0;
}

if($kuponda_kurus_var>0) { unset($_SESSION['ilk_zaman']); die("403"); exit(); }

if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $tutar)) { unset($_SESSION['ilk_zaman']); die("403"); exit(); }

if($ub['casinobakiye']<$tutar || $tutar<1) { unset($_SESSION['ilk_zaman']); die("403"); exit(); }

$sor_kupon = sed_sql_query("select * from kupon_casino where session_id='$session_id'");
while($row_kupon=sed_sql_fetcharray($sor_kupon)) {
$js = curl("https://betwingo.xyz/api/casino_json.php?ajax=1");
$geldi = json_decode($js);
foreach($geldi as $ok) {
if($row_kupon['gameid']==$ok->game_id){
$seconds_ver = $ok->seconds_left;
}
}
kuponda_casino_sonkontrol($row_kupon['gameid'],$row_kupon['roundid'],$row_kupon['oddid'],$row_kupon['id']);
}

$macsiralama = sed_sql_query("select * from kupon_casino where session_id='$session_id'");

while($ass=sed_sql_fetcharray($macsiralama)) {

if($ass['roundid']=="") {
die("988"); exit();
}

if($ass['gameid']=="8") {
if(userayar('casino_basmaca_maxbahis')<$tutar) { unset($_SESSION['ilk_zaman']); die("410"); exit(); }
if(userayar('casino_basmaca_minbahis')>$tutar) { unset($_SESSION['ilk_zaman']); die("420"); exit(); }
} else if($ass['gameid']=="5") {
if(userayar('casino_poker_maxbahis')<$tutar) { unset($_SESSION['ilk_zaman']); die("411"); exit(); }
if(userayar('casino_poker_minbahis')>$tutar) { unset($_SESSION['ilk_zaman']); die("421"); exit(); }
} else if($ass['gameid']=="6") {
if(userayar('casino_bakara_maxbahis')<$tutar) { unset($_SESSION['ilk_zaman']); die("412"); exit(); }
if(userayar('casino_bakara_minbahis')>$tutar) { unset($_SESSION['ilk_zaman']); die("422"); exit(); }
} else if($ass['gameid']=="7") {
if(userayar('casino_carkifelek_maxbahis')<$tutar) { unset($_SESSION['ilk_zaman']); die("413"); exit(); }
if(userayar('casino_carkifelek_minbahis')>$tutar) { unset($_SESSION['ilk_zaman']); die("423"); exit(); }
} else if($ass['gameid']=="10") {
if(userayar('casino_zar_maxbahis')<$tutar) { unset($_SESSION['ilk_zaman']); die("414"); exit(); }
if(userayar('casino_zar_minbahis')>$tutar) { unset($_SESSION['ilk_zaman']); die("424"); exit(); }
} else if($ass['gameid']=="12") {
if(userayar('casino_poker6_maxbahis')<$tutar) { unset($_SESSION['ilk_zaman']); die("415"); exit(); }
if(userayar('casino_poker6_minbahis')>$tutar) { unset($_SESSION['ilk_zaman']); die("425"); exit(); }
} else if($ass['gameid']=="3") {
if(userayar('casino_loto5_maxbahis')<$tutar) { unset($_SESSION['ilk_zaman']); die("416"); exit(); }
if(userayar('casino_loto5_minbahis')>$tutar) { unset($_SESSION['ilk_zaman']); die("426"); exit(); }
} else if($ass['gameid']=="9") {
if(userayar('casino_loto6_maxbahis')<$tutar) { unset($_SESSION['ilk_zaman']); die("417"); exit(); }
if(userayar('casino_loto6_minbahis')>$tutar) { unset($_SESSION['ilk_zaman']); die("427"); exit(); }
} else if($ass['gameid']=="1") {
if(userayar('casino_loto7_maxbahis')<$tutar) { unset($_SESSION['ilk_zaman']); die("418"); exit(); }
if(userayar('casino_loto7_minbahis')>$tutar) { unset($_SESSION['ilk_zaman']); die("428"); exit(); }
}

if($ass['gameid']=="8" || $ass['gameid']=="5" || $ass['gameid']=="6") {
if($ass['aktif']=="0" || $seconds_ver<3 || $seconds_ver>23) { unset($_SESSION['ilk_zaman']); die("404"); }
} else if($ass['gameid']=="12") {
if($ass['aktif']=="0" || $seconds_ver<3) { unset($_SESSION['ilk_zaman']); die("404"); }
} else {
if($ass['aktif']=="0") { unset($_SESSION['ilk_zaman']); die("404"); }
}
$mac_siralamas = base64_encode("$ass[gameid]|$ass[roundid]|$ass[oddid]|$ass[secenek]");

$mac_siralama .= "".$mac_siralamas."|";

}

$toporan = 1;

$toplamoranbul = sed_sql_query("select oran,session_id from kupon_casino where session_id='$session_id'");

while($toplamoranhesapla = sed_sql_fetcharray($toplamoranbul)) {

	$toporan = $toporan*$toplamoranhesapla['oran'];

}

$toplamoran = $toporan;

if($toplamoran=="1.00") { unset($_SESSION['ilk_zaman']); die("430"); exit(); }

$kazanc = $toplamoran*$tutar;

$zaman = time();

$tarih = date("d.m.Y H:i:s");

$gunluk_tarih_ver = date("d.m.Y");

$sonkontrol = sed_sql_query("select session_id,aktif from kupon_casino where session_id='$session_id' and aktif='0'");

if(sed_sql_numrows($sonkontrol)>0) { unset($_SESSION['ilk_zaman']); die("404"); }

$sonkalan = sed_sql_query("select * from kupon_casino where session_id='$session_id'");

if(sed_sql_numrows($sonkalan)<1) { unset($_SESSION['ilk_zaman']); die("404"); }

$ipadres = $_SERVER['REMOTE_ADDR'];

$toplamibul = sed_sql_query("select * from kupon_casino where session_id='$session_id'");

$toplammac = sed_sql_numrows($toplamibul);

sed_sql_query("insert into kuponlar (id,user_id,username,oran,yatan,tutar,kupon_time,basketbol,futbol,voleybol,duello,canli,canlib,casino,toplam_mac,kupon_nots,durum,session_id,kupon_tarih,ipadres,mac_siralama,kupon_tarihi_belirle) values

('','$ub[id]','$ub[username]','$toplamoran','$tutar','$kazanc','$zaman','0','0','0','0','0','0','1','$toplammac','$kuponadi','1','$session_id','$tarih','$ipadres','$mac_siralama','$gunluk_tarih_ver')");

sed_sql_query("update kullanici set casinobakiye=casinobakiye-$tutar where id='$ub[id]'");


$kuponidbul = bilgi("select id,session_id,kupon_time from kuponlar where session_id='$session_id' order by id desc limit 1");

$kupon_id = $kuponidbul['id'];
$kupon_zaman = $kuponidbul['kupon_time'];

sed_sql_query("INSERT INTO hesap_hareket_gecici2 SET 
user_id='".$ub['id']."',
username='".$ub['username']."',
tip='cikar',
tutar = '".$tutar."',
onceki_tutar = '".$ub['casinobakiye']."',
aciklama = '".$kupon_id." numaralı casino kupon yatırıldı',
islemi_yapan = 'sistem',
zaman = '".$kupon_zaman."',
detay = '1'");

$sor = sed_sql_query("select * from kupon_casino where session_id='$session_id'");

while($row=sed_sql_fetcharray($sor)) {

sed_sql_query("insert into kupon_ic_casino (id,oran,session_id,kupon_id,user_id,username,ilkgiris,gameid,roundid,oddid,grupid,secenek,sayi) values ('','$row[oran]','$session_id','$kupon_id','$ub[id]','$ub[username]','$row[ilkgiris]','$row[gameid]','$row[roundid]','$row[oddid]','$row[grupid]','$row[secenek]','$row[sayi]')");

}

}

//mysql_close($linkdatas);
?>