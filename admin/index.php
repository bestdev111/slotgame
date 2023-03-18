<?php
session_start();
include '../db.php';
if(isset($_GET['logout'])) { 
sed_sql_query("delete from kupon where session_id='$session_id'");
session_unset(); }
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location: ../login.php"); exit(); }

if($_GET['s']=="skorgirfutbol") {
## FUTBOL SONUÇ GİRİŞ BAŞLANGIÇ ##

$macid = $_GET["macid"];
$iy_ev = $_GET["iy_ev"];
$iy_dep = $_GET["iy_dep"];
$ms_ev = $_GET["ms_ev"];
$ms_dep = $_GET["ms_dep"];

$iy_birlestir = "".$iy_ev." - ".$iy_dep."";
$ms_birlestir = "".$ms_ev." - ".$ms_dep."";

if($ub['id']=="1") {

sed_sql_query("update kupon_ic set iy='$iy_birlestir',ms='$ms_birlestir' where mac_db_id='$macid' and spor_tip='futbol'");

}

## FUTBOL SONUÇ GİRİŞ BİTİŞ ##
} else if($_GET['s']=="ertelefutbol") {
## FUTBOL ERTELEME BAŞLANGIÇ ##

$macid = $_GET["macid"];

if($ub['id']=="1") {

sed_sql_query("update kupon_ic set kazanma='4',ertelendi='1' where mac_db_id='$macid' and spor_tip='futbol'");	

}

## FUTBOL ERTELEME BİTİŞ ##
} else if($_GET['s']=="skorgirbasketbol") {
## BASKETBOL SONUÇ GİRİŞ BAŞLANGIÇ ##

$macid = $_GET["macid"];
$p1_ev = $_GET["p1_ev"];
$p2_ev = $_GET["p2_ev"];
$p3_ev = $_GET["p3_ev"];
$p4_ev = $_GET["p4_ev"];
$p5_ev = $_GET["p5_ev"];
$p1_dep = $_GET["p1_dep"];
$p2_dep = $_GET["p2_dep"];
$p3_dep = $_GET["p3_dep"];
$p4_dep = $_GET["p4_dep"];
$p5_dep = $_GET["p5_dep"];

if($p5_ev>0){ $p5_ev = $p5_ev; } else { $p5_ev = 0; }

if($p5_dep>0){ $p5_dep = $p5_dep; } else { $p5_dep = 0; }

$p1_birlestir = "".$p1_ev." - ".$p1_dep."";
$p2_birlestir = "".$p2_ev." - ".$p2_dep."";
$p3_birlestir = "".$p3_ev." - ".$p3_dep."";
$p4_birlestir = "".$p4_ev." - ".$p4_dep."";
$p5_birlestir = "".$p5_ev." - ".$p5_dep."";

$iy_ev_topla = $p1_ev+$p2_ev;
$ms_ev_topla = $p1_ev+$p2_ev+$p3_ev+$p4_ev;

$iy_dep_topla = $p1_dep+$p2_dep;
$ms_dep_topla = $p1_dep+$p2_dep+$p3_dep+$p4_dep;

$iy_birlestir = "".$iy_ev_topla." - ".$iy_dep_topla."";
$ms_birlestir = "".$ms_ev_topla." - ".$ms_dep_topla."";

if($ub['id']=="1") {

sed_sql_query("update kupon_ic set iy='$iy_birlestir',ms='$ms_birlestir',birperiod='$p1_birlestir',ikiperiod='$p2_birlestir',ucperiod='$p3_birlestir',dortperiod='$p4_birlestir',besperiod='$p5_birlestir' where mac_db_id='$macid' and spor_tip='basketbol'");

}

## BASKETBOL SONUÇ GİRİŞ BİTİŞ ##
} else if($_GET['s']=="ertelebasketbol") {
## BASKETBOL ERTELEME BAŞLANGIÇ ##

$macid = $_GET["macid"];

if($ub['id']=="1") {

sed_sql_query("update kupon_ic set kazanma='4',ertelendi='1' where mac_db_id='$macid' and spor_tip='basketbol'");	

}

## BASKETBOL ERTELEME BİTİŞ ##
} else if($_GET['s']=="skorgirtenis") {
## TENİS SONUÇ GİRİŞ BAŞLANGIÇ ##

$macid = $_GET["macid"];
$p1_ev = $_GET["p1_ev"];
$p2_ev = $_GET["p2_ev"];
$p3_ev = $_GET["p3_ev"];
$p1_dep = $_GET["p1_dep"];
$p2_dep = $_GET["p2_dep"];
$p3_dep = $_GET["p3_dep"];

$p1_birlestir = "".$p1_ev." - ".$p1_dep."";
$p2_birlestir = "".$p2_ev." - ".$p2_dep."";
$p3_birlestir = "".$p3_ev." - ".$p3_dep."";

$evskor_ver ="0";
$depskor_ver ="0";
if($p1_ev>$p1_dep){
	$evskor_ver++;
} else if($p1_ev<$p1_dep){
	$depskor_ver++;
}

if($p2_ev>$p2_dep){
	$evskor_ver++;
} else if($p2_ev<$p2_dep){
	$depskor_ver++;
}

if($p3_ev>$p3_dep){
	$evskor_ver++;
} else if($p3_ev<$p3_dep){
	$depskor_ver++;
}

$ms_birlestir = "".$evskor_ver." - ".$depskor_ver."";

if($ub['id']=="1") {

sed_sql_query("update kupon_ic set ms='$ms_birlestir',birperiod='$p1_birlestir',ikiperiod='$p2_birlestir',ucperiod='$p3_birlestir' where mac_db_id='$macid' and spor_tip='tenis'");

}

## TENİS SONUÇ GİRİŞ BİTİŞ ##
} else if($_GET['s']=="erteletenis") {
## TENİS ERTELEME BAŞLANGIÇ ##

$macid = $_GET["macid"];

if($ub['id']=="1") {

sed_sql_query("update kupon_ic set kazanma='4',ertelendi='1' where mac_db_id='$macid' and spor_tip='tenis'");	

}

## TENİS ERTELEME BİTİŞ ##
} else if($_GET['s']=="skorgirvoleybol") {
## VOLEYBOL SONUÇ GİRİŞ BAŞLANGIÇ ##

$macid = $_GET["macid"];
$p1_ev = $_GET["p1_ev"];
$p2_ev = $_GET["p2_ev"];
$p3_ev = $_GET["p3_ev"];
$p4_ev = $_GET["p4_ev"];
$p5_ev = $_GET["p5_ev"];
$p1_dep = $_GET["p1_dep"];
$p2_dep = $_GET["p2_dep"];
$p3_dep = $_GET["p3_dep"];
$p4_dep = $_GET["p4_dep"];
$p5_dep = $_GET["p5_dep"];

if($p5_ev>0){ $p5_ev = $p5_ev; } else { $p5_ev = 0; }

if($p5_dep>0){ $p5_dep = $p5_dep; } else { $p5_dep = 0; }

$p1_birlestir = "".$p1_ev." - ".$p1_dep."";
$p2_birlestir = "".$p2_ev." - ".$p2_dep."";
$p3_birlestir = "".$p3_ev." - ".$p3_dep."";
$p4_birlestir = "".$p4_ev." - ".$p4_dep."";
$p5_birlestir = "".$p5_ev." - ".$p5_dep."";

$evskor_ver ="0";
$depskor_ver ="0";
if($p1_ev>$p1_dep){
	$evskor_ver++;
} else if($p1_ev<$p1_dep){
	$depskor_ver++;
}

if($p2_ev>$p2_dep){
	$evskor_ver++;
} else if($p2_ev<$p2_dep){
	$depskor_ver++;
}

if($p3_ev>$p3_dep){
	$evskor_ver++;
} else if($p3_ev<$p3_dep){
	$depskor_ver++;
}

if($p4_ev>$p4_dep){
	$evskor_ver++;
} else if($p4_ev<$p4_dep){
	$depskor_ver++;
}

$ms_birlestir = "".$evskor_ver." - ".$depskor_ver."";

if($ub['id']=="1") {

sed_sql_query("update kupon_ic set ms='$ms_birlestir',birperiod='$p1_birlestir',ikiperiod='$p2_birlestir',ucperiod='$p3_birlestir',dortperiod='$p4_birlestir',besperiod='$p5_birlestir' where mac_db_id='$macid' and spor_tip='voleybol'");

}

## VOLEYBOL SONUÇ GİRİŞ BİTİŞ ##
} else if($_GET['s']=="ertelevoleybol") {
## VOLEYBOL ERTELEME BAŞLANGIÇ ##

$macid = $_GET["macid"];

if($ub['id']=="1") {

sed_sql_query("update kupon_ic set kazanma='4',ertelendi='1' where mac_db_id='$macid' and spor_tip='voleybol'");	

}

## VOLEYBOL ERTELEME BİTİŞ ##
} else if($_GET['s']=="skorgirbuzhokeyi") {
## BUZHOKEYI SONUÇ GİRİŞ BAŞLANGIÇ ##

$macid = $_GET["macid"];
$p1_ev = $_GET["p1_ev"];
$p2_ev = $_GET["p2_ev"];
$p3_ev = $_GET["p3_ev"];
$p1_dep = $_GET["p1_dep"];
$p2_dep = $_GET["p2_dep"];
$p3_dep = $_GET["p3_dep"];

$p1_birlestir = "".$p1_ev." - ".$p1_dep."";
$p2_birlestir = "".$p2_ev." - ".$p2_dep."";
$p3_birlestir = "".$p3_ev." - ".$p3_dep."";

$ms_ev_topla = $p1_ev+$p2_ev+$p3_ev;
$ms_dep_topla = $p1_dep+$p2_dep+$p3_dep;

$ms_birlestir = "".$ms_ev_topla." - ".$ms_dep_topla."";

if($ub['id']=="1") {

sed_sql_query("update kupon_ic set ms='$ms_birlestir',birperiod='$p1_birlestir',ikiperiod='$p2_birlestir',ucperiod='$p3_birlestir' where mac_db_id='$macid' and spor_tip='buzhokeyi'");

}

## BUZHOKEYI SONUÇ GİRİŞ BİTİŞ ##
} else if($_GET['s']=="ertelebuzhokeyi") {
## BUZHOKEYI ERTELEME BAŞLANGIÇ ##

$macid = $_GET["macid"];

if($ub['id']=="1") {

sed_sql_query("update kupon_ic set kazanma='4',ertelendi='1' where mac_db_id='$macid' and spor_tip='buzhokeyi'");	

}

## BUZHOKEYI ERTELEME BİTİŞ ##
} else if($_GET['s']=="skorgirmasatenisi") {
## MASA TENİSİ SONUÇ GİRİŞ BAŞLANGIÇ ##

$macid = $_GET["macid"];
$p1_ev = $_GET["p1_ev"];
$p1_dep = $_GET["p1_dep"];

$ms_birlestir = "".$p1_ev." - ".$p1_dep."";

if($ub['id']=="1") {

sed_sql_query("update kupon_ic set ms='$ms_birlestir' where mac_db_id='$macid' and spor_tip='masatenisi'");

}

## MASA TENİSİ SONUÇ GİRİŞ BİTİŞ ##
} else if($_GET['s']=="skorgirbeyzbol") {
## MASA TENİSİ SONUÇ GİRİŞ BAŞLANGIÇ ##

$macid = $_GET["macid"];
$p1_ev = $_GET["p1_ev"];
$p1_dep = $_GET["p1_dep"];

$ms_birlestir = "".$p1_ev." - ".$p1_dep."";

if($ub['id']=="1") {

sed_sql_query("update kupon_ic set ms='$ms_birlestir' where mac_db_id='$macid' and spor_tip='beyzbol'");

}

## MASA TENİSİ SONUÇ GİRİŞ BİTİŞ ##
} else if($_GET['s']=="skorgirrugby") {
## MASA TENİSİ SONUÇ GİRİŞ BAŞLANGIÇ ##

$macid = $_GET["macid"];
$p1_ev = $_GET["p1_ev"];
$p1_dep = $_GET["p1_dep"];

$ms_birlestir = "".$p1_ev." - ".$p1_dep."";

if($ub['id']=="1") {

sed_sql_query("update kupon_ic set ms='$ms_birlestir' where mac_db_id='$macid' and spor_tip='rugby'");

}

## MASA TENİSİ SONUÇ GİRİŞ BİTİŞ ##
} else if($_GET['s']=="skorgirdovus") {
## MMA SONUÇ GİRİŞ BAŞLANGIÇ ##

$macid = $_GET["macid"];
$p1_ev = $_GET["p1_ev"];
$p1_dep = $_GET["p1_dep"];

$ms_birlestir = "".$p1_ev." - ".$p1_dep."";

if($ub['id']=="1") {

sed_sql_query("update kupon_ic set ms='$ms_birlestir' where mac_db_id='$macid' and spor_tip='dovus'");

}

## MMA SONUÇ GİRİŞ BİTİŞ ##
} else if($_GET['s']=="ertelemasatenisi") {
## MASA TENİSİ ERTELEME BAŞLANGIÇ ##

$macid = $_GET["macid"];

if($ub['id']=="1") {

sed_sql_query("update kupon_ic set kazanma='4',ertelendi='1' where mac_db_id='$macid' and spor_tip='masatenisi'");	

}

## MASA TENİSİ ERTELEME BİTİŞ ##
} else if($_GET['s']=="ertelebeyzbol") {
## BEYZBOL ERTELEME BAŞLANGIÇ ##

$macid = $_GET["macid"];

if($ub['id']=="1") {

sed_sql_query("update kupon_ic set kazanma='4',ertelendi='1' where mac_db_id='$macid' and spor_tip='beyzbol'");	

}

## BEYZBOL ERTELEME BİTİŞ ##
} else if($_GET['s']=="ertelerugby") {
## RUGBY ERTELEME BAŞLANGIÇ ##

$macid = $_GET["macid"];

if($ub['id']=="1") {

sed_sql_query("update kupon_ic set kazanma='4',ertelendi='1' where mac_db_id='$macid' and spor_tip='rugby'");	

}

## RUGBY ERTELEME BİTİŞ ##
} else if($_GET['s']=="erteledovus") {
## MMA ERTELEME BAŞLANGIÇ ##

$macid = $_GET["macid"];

if($ub['id']=="1") {

sed_sql_query("update kupon_ic set kazanma='4',ertelendi='1' where mac_db_id='$macid' and spor_tip='dovus'");	

}

## MMA ERTELEME BİTİŞ ##
} else if($_GET['s']=="skorgircanlifutbol") {
## CANLI FUTBOL SONUÇ GİRİŞ BAŞLANGIÇ ##

function farray($query){ $sql =  mysql_fetch_array(sed_sql_query($query)); return $sql; }

$macid = $_GET["macid"];
$iy_ev = $_GET["iy_ev"];
$iy_dep = $_GET["iy_dep"];
$ms_ev = $_GET["ms_ev"];
$ms_dep = $_GET["ms_dep"];


$gol_1 = $_GET["gol_1"];
$gol_2 = $_GET["gol_2"];
$gol_3 = $_GET["gol_3"];
$gol_4 = $_GET["gol_4"];
$gol_5 = $_GET["gol_5"];
$gol_6 = $_GET["gol_6"];

$iy_birlestir = "".$iy_ev." - ".$iy_dep."";
$ms_birlestir = "".$ms_ev." - ".$ms_dep."";

if($ub['id']=="1") {

$eventid_getirici = farray("SELECT eventid,ev_takim,konuk_takim FROM canli_maclar WHERE id='".$macid."'");
$eventid = $eventid_getirici['eventid'];
$ev_takim = $eventid_getirici['ev_takim'];
$dep_takim = $eventid_getirici['konuk_takim'];
$bugun_tarihi_bul = date('d.m.Y');
## SIRADAKİ GOL 1 ##
$gol_kontrol_1 = farray("SELECT id FROM canli_gol_list WHERE eventid='".$eventid."' AND mac_db_id='".$macid."' AND golsayi='1'");
if($gol_1>0 && $gol_kontrol_1['id']<1){
sed_sql_query("INSERT INTO canli_gol_list SET eventid='".$eventid."',dakika='91',golsayi='1',atantakim='".$gol_1."',mac_db_id='".$macid."',y_ev_skor='".$ms_ev."',y_konuk_skor='".$ms_dep."',musabaka='".$ev_takim." - ".$dep_takim."',zaman='".$bugun_tarihi_bul."',devre='Bitti'");
}
## SIRADAKİ GOL 2 ##
$gol_kontrol_2 = farray("SELECT id FROM canli_gol_list WHERE eventid='".$eventid."' AND mac_db_id='".$macid."' AND golsayi='2'");
if($gol_2>0 && $gol_kontrol_2['id']<1){
sed_sql_query("INSERT INTO canli_gol_list SET eventid='".$eventid."',dakika='91',golsayi='2',atantakim='".$gol_2."',mac_db_id='".$macid."',y_ev_skor='".$ms_ev."',y_konuk_skor='".$ms_dep."',musabaka='".$ev_takim." - ".$dep_takim."',zaman='".$bugun_tarihi_bul."',devre='Bitti'");
}
## SIRADAKİ GOL 3 ##
$gol_kontrol_3 = farray("SELECT id FROM canli_gol_list WHERE eventid='".$eventid."' AND mac_db_id='".$macid."' AND golsayi='3'");
if($gol_3>0 && $gol_kontrol_3['id']<1){
sed_sql_query("INSERT INTO canli_gol_list SET eventid='".$eventid."',dakika='91',golsayi='3',atantakim='".$gol_3."',mac_db_id='".$macid."',y_ev_skor='".$ms_ev."',y_konuk_skor='".$ms_dep."',musabaka='".$ev_takim." - ".$dep_takim."',zaman='".$bugun_tarihi_bul."',devre='Bitti'");
}
## SIRADAKİ GOL 4 ##
$gol_kontrol_4 = farray("SELECT id FROM canli_gol_list WHERE eventid='".$eventid."' AND mac_db_id='".$macid."' AND golsayi='4'");
if($gol_4>0 && $gol_kontrol_4['id']<1){
sed_sql_query("INSERT INTO canli_gol_list SET eventid='".$eventid."',dakika='91',golsayi='4',atantakim='".$gol_4."',mac_db_id='".$macid."',y_ev_skor='".$ms_ev."',y_konuk_skor='".$ms_dep."',musabaka='".$ev_takim." - ".$dep_takim."',zaman='".$bugun_tarihi_bul."',devre='Bitti'");
}
## SIRADAKİ GOL 5 ##
$gol_kontrol_5 = farray("SELECT id FROM canli_gol_list WHERE eventid='".$eventid."' AND mac_db_id='".$macid."' AND golsayi='5'");
if($gol_5>0 && $gol_kontrol_5['id']<1){
sed_sql_query("INSERT INTO canli_gol_list SET eventid='".$eventid."',dakika='91',golsayi='5',atantakim='".$gol_5."',mac_db_id='".$macid."',y_ev_skor='".$ms_ev."',y_konuk_skor='".$ms_dep."',musabaka='".$ev_takim." - ".$dep_takim."',zaman='".$bugun_tarihi_bul."',devre='Bitti'");
}
## SIRADAKİ GOL 6 ##
$gol_kontrol_6 = farray("SELECT id FROM canli_gol_list WHERE eventid='".$eventid."' AND mac_db_id='".$macid."' AND golsayi='6'");
if($gol_6>0 && $gol_kontrol_6['id']<1){
sed_sql_query("INSERT INTO canli_gol_list SET eventid='".$eventid."',dakika='91',golsayi='6',atantakim='".$gol_6."',mac_db_id='".$macid."',y_ev_skor='".$ms_ev."',y_konuk_skor='".$ms_dep."',musabaka='".$ev_takim." - ".$dep_takim."',zaman='".$bugun_tarihi_bul."',devre='Bitti'");
}

sed_sql_query("update canli_maclar SET iy_ev='".$iy_ev."',iy_konuk='".$iy_dep."',ev_skor='".$ms_ev."',konuk_skor='".$ms_dep."',devre='Bitti',dakika='91' WHERE id='".$macid."'");


}

## CANLI FUTBOL SONUÇ GİRİŞ BİTİŞ ##
} else if($_GET['s']=="ertelecanlifutbol") {
## CANLI FUTBOL ERTELEME BAŞLANGIÇ ##

$macid = $_GET["macid"];

if($ub['id']=="1") {

sed_sql_query("update kupon_ic set kazanma='4',ertelendi='1' where mac_db_id='$macid' and spor_tip='canli'");	

}

## CANLI FUTBOL ERTELEME BİTİŞ ##
} else if($_GET['s']=="skorgircanlibasketbol") {
## CANLI BASKETBOL SONUÇ GİRİŞ BAŞLANGIÇ ##

$macid = $_GET["macid"];
$p1_ev = $_GET["p1_ev"];
$p2_ev = $_GET["p2_ev"];
$p3_ev = $_GET["p3_ev"];
$p4_ev = $_GET["p4_ev"];
$p5_ev = $_GET["p5_ev"];
$p1_dep = $_GET["p1_dep"];
$p2_dep = $_GET["p2_dep"];
$p3_dep = $_GET["p3_dep"];
$p4_dep = $_GET["p4_dep"];
$p5_dep = $_GET["p5_dep"];

if($p5_ev==""){
	$p5_ev = 0;
} else {
	$p5_ev = $p5_ev;
}

if($p5_dep==""){
	$p5_dep = 0;
} else {
	$p5_dep = $p5_dep;
}

$p1_birlestir = "".$p1_ev." - ".$p1_dep."";
$p2_birlestir = "".$p2_ev." - ".$p2_dep."";
$p3_birlestir = "".$p3_ev." - ".$p3_dep."";
$p4_birlestir = "".$p4_ev." - ".$p4_dep."";
$p5_birlestir = "".$p5_ev." - ".$p5_dep."";

$iy_ev_topla = $p1_ev+$p2_ev;
$ms_ev_topla = $p1_ev+$p2_ev+$p3_ev+$p4_ev;

$iy_dep_topla = $p1_dep+$p2_dep;
$ms_dep_topla = $p1_dep+$p2_dep+$p3_dep+$p4_dep;

$iy_birlestir = "".$iy_ev_topla." - ".$iy_dep_topla."";
$ms_birlestir = "".$ms_ev_topla." - ".$ms_dep_topla."";

if($ub['id']=="1") {

sed_sql_query("update kupon_ic set iy='$iy_birlestir',ms='$ms_birlestir',birperiod='$p1_birlestir',ikiperiod='$p2_birlestir',ucperiod='$p3_birlestir',dortperiod='$p4_birlestir',besperiod='$p5_birlestir' where mac_db_id='$macid' and spor_tip='canlib'");

}

## CANLI BASKETBOL SONUÇ GİRİŞ BİTİŞ ##
} else if($_GET['s']=="ertelecanlibasketbol") {
## CANLI BASKETBOL ERTELEME BAŞLANGIÇ ##

$macid = $_GET["macid"];

if($ub['id']=="1") {

sed_sql_query("update kupon_ic set kazanma='4',ertelendi='1' where mac_db_id='$macid' and spor_tip='canlib'");	

}

## CANLI BASKETBOL ERTELEME BİTİŞ ##
} else if($_GET['s']=="skorgircanlitenis") {
## CANLI TENİS SONUÇ GİRİŞ BAŞLANGIÇ ##

$macid = $_GET["macid"];
$p1_ev = $_GET["p1_ev"];
$p2_ev = $_GET["p2_ev"];
$p3_ev = $_GET["p3_ev"];
$p1_dep = $_GET["p1_dep"];
$p2_dep = $_GET["p2_dep"];
$p3_dep = $_GET["p3_dep"];

$p1_birlestir = "".$p1_ev." - ".$p1_dep."";
$p2_birlestir = "".$p2_ev." - ".$p2_dep."";
$p3_birlestir = "".$p3_ev." - ".$p3_dep."";

$evskor_ver ="0";
$depskor_ver ="0";
if($p1_ev>$p1_dep){
	$evskor_ver++;
} else if($p1_ev<$p1_dep){
	$depskor_ver++;
}

if($p2_ev>$p2_dep){
	$evskor_ver++;
} else if($p2_ev<$p2_dep){
	$depskor_ver++;
}

if($p3_ev>$p3_dep){
	$evskor_ver++;
} else if($p3_ev<$p3_dep){
	$depskor_ver++;
}

$ms_birlestir = "".$evskor_ver." - ".$depskor_ver."";

if($ub['id']=="1") {

sed_sql_query("update kupon_ic set ms='$ms_birlestir',birperiod='$p1_birlestir',ikiperiod='$p2_birlestir',ucperiod='$p3_birlestir' where mac_db_id='$macid' and spor_tip='canlit'");

}

## CANLI TENİS SONUÇ GİRİŞ BİTİŞ ##
} else if($_GET['s']=="ertelecanlitenis") {
## CANLI TENİS ERTELEME BAŞLANGIÇ ##

$macid = $_GET["macid"];

if($ub['id']=="1") {

sed_sql_query("update kupon_ic set kazanma='4',ertelendi='1' where mac_db_id='$macid' and spor_tip='canlit'");	

}

## CANLI TENİS ERTELEME BİTİŞ ##
} else if($_GET['s']=="skorgircanlimtenis") {
## CANLI MASA TENİS SONUÇ GİRİŞ BAŞLANGIÇ ##

$macid = $_GET["macid"];
$p1_ev = $_GET["p1_ev"];
$p2_ev = $_GET["p2_ev"];
$p3_ev = $_GET["p3_ev"];
$p4_ev = $_GET["p4_ev"];
$p5_ev = $_GET["p5_ev"];
$p1_dep = $_GET["p1_dep"];
$p2_dep = $_GET["p2_dep"];
$p3_dep = $_GET["p3_dep"];
$p4_dep = $_GET["p4_dep"];
$p5_dep = $_GET["p5_dep"];

$p1_birlestir = "".$p1_ev." - ".$p1_dep."";
$p2_birlestir = "".$p2_ev." - ".$p2_dep."";
$p3_birlestir = "".$p3_ev." - ".$p3_dep."";
$p4_birlestir = "".$p4_ev." - ".$p4_dep."";
$p5_birlestir = "".$p5_ev." - ".$p5_dep."";

$evskor_ver ="0";
$depskor_ver ="0";
if($p1_ev>$p1_dep){
	$evskor_ver++;
} else if($p1_ev<$p1_dep){
	$depskor_ver++;
}

if($p2_ev>$p2_dep){
	$evskor_ver++;
} else if($p2_ev<$p2_dep){
	$depskor_ver++;
}

if($p3_ev>$p3_dep){
	$evskor_ver++;
} else if($p3_ev<$p3_dep){
	$depskor_ver++;
}

if($p4_ev>$p4_dep){
	$evskor_ver++;
} else if($p4_ev<$p4_dep){
	$depskor_ver++;
}

if($p5_ev>$p5_dep){
	$evskor_ver++;
} else if($p5_ev<$p5_dep){
	$depskor_ver++;
}

$ms_birlestir = "".$evskor_ver." - ".$depskor_ver."";

if($ub['id']=="1") {

sed_sql_query("update kupon_ic set ms='$ms_birlestir',birperiod='$p1_birlestir',ikiperiod='$p2_birlestir',ucperiod='$p3_birlestir',dortperiod='$p4_birlestir',besperiod='$p5_birlestir' where mac_db_id='$macid' and spor_tip='canlimt'");

}

## CANLI MASA TENİS SONUÇ GİRİŞ BİTİŞ ##
} else if($_GET['s']=="ertelecanlimtenis") {
## CANLI MASA TENİS ERTELEME BAŞLANGIÇ ##

$macid = $_GET["macid"];

if($ub['id']=="1") {

sed_sql_query("update kupon_ic set kazanma='4',ertelendi='1' where mac_db_id='$macid' and spor_tip='canlimt'");	

}

## CANLI MASA TENİS ERTELEME BİTİŞ ##
} else if($_GET['s']=="skorgircanlivoleybol") {
## CANLI VOLEYBOL SONUÇ GİRİŞ BAŞLANGIÇ ##

$macid = $_GET["macid"];
$p1_ev = $_GET["p1_ev"];
$p2_ev = $_GET["p2_ev"];
$p3_ev = $_GET["p3_ev"];
$p4_ev = $_GET["p4_ev"];
$p5_ev = $_GET["p5_ev"];
$p1_dep = $_GET["p1_dep"];
$p2_dep = $_GET["p2_dep"];
$p3_dep = $_GET["p3_dep"];
$p4_dep = $_GET["p4_dep"];
$p5_dep = $_GET["p5_dep"];

if($p5_ev==""){
	$p5_ev = 0;
} else {
	$p5_ev = $p5_ev;
}

if($p5_dep==""){
	$p5_dep = 0;
} else {
	$p5_dep = $p5_dep;
}

$p1_birlestir = "".$p1_ev." - ".$p1_dep."";
$p2_birlestir = "".$p2_ev." - ".$p2_dep."";
$p3_birlestir = "".$p3_ev." - ".$p3_dep."";
$p4_birlestir = "".$p4_ev." - ".$p4_dep."";
$p5_birlestir = "".$p5_ev." - ".$p5_dep."";

$evskor_ver ="0";
$depskor_ver ="0";
if($p1_ev>$p1_dep){
	$evskor_ver++;
} else if($p1_ev<$p1_dep){
	$depskor_ver++;
}

if($p2_ev>$p2_dep){
	$evskor_ver++;
} else if($p2_ev<$p2_dep){
	$depskor_ver++;
}

if($p3_ev>$p3_dep){
	$evskor_ver++;
} else if($p3_ev<$p3_dep){
	$depskor_ver++;
}

if($p4_ev>$p4_dep){
	$evskor_ver++;
} else if($p4_ev<$p4_dep){
	$depskor_ver++;
}

$ms_birlestir = "".$evskor_ver." - ".$depskor_ver."";

if($ub['id']=="1") {

sed_sql_query("update kupon_ic set ms='$ms_birlestir',birperiod='$p1_birlestir',ikiperiod='$p2_birlestir',ucperiod='$p3_birlestir',dortperiod='$p4_birlestir',besperiod='$p5_birlestir' where mac_db_id='$macid' and spor_tip='canliv'");

}

## CANLI VOLEYBOL SONUÇ GİRİŞ BİTİŞ ##
} else if($_GET['s']=="ertelecanlivoleybol") {
## CANLI VOLEYBOL ERTELEME BAŞLANGIÇ ##

$macid = $_GET["macid"];

if($ub['id']=="1") {

sed_sql_query("update kupon_ic set kazanma='4',ertelendi='1' where mac_db_id='$macid' and spor_tip='canliv'");	

}

## CANLI VOLEYBOL ERTELEME BİTİŞ ##
} else if($_GET['s']=="skorgircanlibuzhokeyi") {
## CANLI BUZHOKEYI SONUÇ GİRİŞ BAŞLANGIÇ ##

$macid = $_GET["macid"];
$p1_ev = $_GET["p1_ev"];
$p2_ev = $_GET["p2_ev"];
$p3_ev = $_GET["p3_ev"];
$p1_dep = $_GET["p1_dep"];
$p2_dep = $_GET["p2_dep"];
$p3_dep = $_GET["p3_dep"];

$p1_birlestir = "".$p1_ev." - ".$p1_dep."";
$p2_birlestir = "".$p2_ev." - ".$p2_dep."";
$p3_birlestir = "".$p3_ev." - ".$p3_dep."";

$ms_ev_topla = $p1_ev+$p2_ev+$p3_ev;
$ms_dep_topla = $p1_dep+$p2_dep+$p3_dep;

$ms_birlestir = "".$ms_ev_topla." - ".$ms_dep_topla."";

if($ub['id']=="1") {

sed_sql_query("update kupon_ic set ms='$ms_birlestir',birperiod='$p1_birlestir',ikiperiod='$p2_birlestir',ucperiod='$p3_birlestir' where mac_db_id='$macid' and spor_tip='canlibuz'");

}

## CANLI BUZHOKEYI SONUÇ GİRİŞ BİTİŞ ##
} else if($_GET['s']=="ertelecanlibuzhokeyi") {
## CANLI BUZHOKEYI ERTELEME BAŞLANGIÇ ##

$macid = $_GET["macid"];

if($ub['id']=="1") {

sed_sql_query("update kupon_ic set kazanma='4',ertelendi='1' where mac_db_id='$macid' and spor_tip='canlibuz'");	

}

## CANLI BUZHOKEYI ERTELEME BİTİŞ ##
} else { ?>

<?php include "header.php"; ?>

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
<div class="col-xs-12 col-sm-4 col-lg-3" style="width:100%;">
<div class="card card-inverse card-danger">
<div class="card-block p-1">
<div style="font-weight: bold;">Sol Menüden İstediğiniz Spor Tipini Seçebilirsiniz.</div>
</div>
</div>
</div>
</div>

</div>
</div>
</main>

<?php include "footer.php"; ?>

<? } ?>