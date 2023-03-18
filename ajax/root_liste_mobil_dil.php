<?php 
session_start();
header('Content-Type: application/json; charset=utf-8');
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:login.php"); exit(); die(); }
error_reporting(0);

function gizli_lig_list_canli($sportip) {
global $ub;
global $dizin;

$mac_bilgi_kendim = sed_sql_query("select * from program_lig_gizli where spor_tipi='".$sportip."' and bayi_id='".$ub['id']."'");
$mac_bilgi_altim = sed_sql_query("select * from program_lig_gizli where spor_tipi='".$sportip."' and bayi_id='".$ub['hesap_sahibi_id']."'");
$mac_bilgi_altiminalti = sed_sql_query("select * from program_lig_gizli where spor_tipi='".$sportip."' and bayi_id='".$ub['hesap_root_id']."'");
$mac_bilgi_altiminalti_2 = sed_sql_query("select * from program_lig_gizli where spor_tipi='".$sportip."' and bayi_id='".$ub['hesap_root_root_id']."'");
$mac_bilgi_kendim_toplam = sed_sql_numrows($mac_bilgi_kendim);
$mac_bilgi_altim_toplam = sed_sql_numrows($mac_bilgi_altim);
$mac_bilgi_altiminalti_toplam = sed_sql_numrows($mac_bilgi_altiminalti);
$mac_bilgi_altiminalti_toplam_2 = sed_sql_numrows($mac_bilgi_altiminalti_2);


if($mac_bilgi_kendim_toplam>0) {

while($row=sed_sql_fetcharray($mac_bilgi_kendim)) {
if(!empty($row['lig_adi'])) {
$ekle .= "'$row[lig_id]',";
}
}
$donecek = substr($ekle,0,-1);

} else if($mac_bilgi_altim_toplam>0) {

while($row=sed_sql_fetcharray($mac_bilgi_altim)) {
if(!empty($row['lig_adi'])) {
$ekle .= "'$row[lig_id]',";
}
}
$donecek = substr($ekle,0,-1);

} else if($mac_bilgi_altiminalti_toplam>0) {

while($row=sed_sql_fetcharray($mac_bilgi_altiminalti)) {
if(!empty($row['lig_adi'])) {
$ekle .= "'$row[lig_id]',";
}
}
$donecek = substr($ekle,0,-1);

} else if($mac_bilgi_altiminalti_toplam_2>0) {

while($row=sed_sql_fetcharray($mac_bilgi_altiminalti_2)) {
if(!empty($row['lig_adi'])) {
$ekle .= "'$row[lig_id]',";
}
}
$donecek = substr($ekle,0,-1);

}  else {
$donecek = "";
}
return $donecek;
}

if($_GET['cmd']=="main"){

$toplam_mac = 0;

/* yasak kelimeler */ 
$whereyasak ="";
$whereyasak .= ' AND ev_takim not like "%reserves%" AND konuk_takim not like "%reserves%" ';
$sec = "SELECT * FROM yasak_kelimeler WHERE user_id IN (1,".$_SESSION['betuser'].",".implode(",", $_SESSION['ustler']).")";
$sor = sed_sql_query($sec);
while($r = sed_sql_fetchassoc($sor)) {
$whereyasak.= ' AND ev_takim not like "%'.$r['kelime'].'%" AND konuk_takim not like "%'.$r['kelime'].'%" ';
}
/* yasak kelimeler */

$sa = date("H:i");
$fark = time()-120;

if(userayar('canlifutbol')=="1") {

$gizli_ligler_futbol = gizli_lig_list_canli('cfutbol');
if($gizli_ligler_futbol=="") { $gizli_lig_ekle_futbol = ""; } else { $gizli_lig_ekle_futbol = "and lig_id not in ($gizli_ligler_futbol)"; }
$gizli_canlilar = gizlicanlimaclist();
$sor = sed_sql_query("select * from canli_maclar where gelecek='0' {$whereyasak} and songuncelleme>$fark and isibitti='0' and sonucok='0' and devre!='Yarıda Kaldı' and lig_adi not like '%J2 League%' $gizli_canlilar $gizli_lig_ekle_futbol group by eventid order by ulkeid asc");

while($row=sed_sql_fetcharray($sor)) {

$songuncelleme_tarih = date("d-m-Y H:i:s",$row['songuncelleme']);
$takim_birlestir = "".$row['ev_takim']." - ".$row['konuk_takim']."";
$baslama_saat_str = strtotime($row['baslamasaat']);
$baslama_saat_saat = date("H:i",$baslama_saat_str);
$baslama_saat_tarihli = date("d-m-Y H:i:s",$baslama_saat_str);
$dakika_eklenmis_saat = strtotime($row['baslamasaat'])+$row['dakika'];
$getir_bakem_saati = date("d-m-Y H:i:s",$dakika_eklenmis_saat);

if($row['devre']=="Başlamadı"){
	$period_id = 0;
} else if($row['devre']=="İlk Yarı"){
	$period_id = 1;
} else if($row['devre']=="Devre Arası"){
	$period_id = 2;
} else if($row['devre']=="İkinci Yarı"){
	$period_id = 3;
} else if($row['devre']=="Bitti"){
	$period_id = 255;
} else if($row['devre']=="Bitti2"){
	$period_id = 255;
}

$ev_oran_ver1 = "0.00";
$ber_oran_ver1 = "0.00";
$dep_oran_ver1 = "0.00";
$alt_ust_05_ust_ver1 = "0.00";
$alt_ust_05_alt_ver1 = "0.00";
$alt_ust_15_ust_ver1 = "0.00";
$alt_ust_15_alt_ver1 = "0.00";
$alt_ust_25_ust_ver1 = "0.00";
$alt_ust_25_alt_ver1 = "0.00";
$alt_ust_35_ust_ver1 = "0.00";
$alt_ust_35_alt_ver1 = "0.00";
$alt_ust_45_ust_ver1 = "0.00";
$alt_ust_45_alt_ver1 = "0.00";
$alt_ust_55_ust_ver1 = "0.00";
$alt_ust_55_alt_ver1 = "0.00";
$karsilikligol_var1 = "0.00";
$karsilikligol_yok1 = "0.00";

$ev_oran_ver1 = $row['ev_oran'];
$ber_oran_ver1 = $row['berabere_oran'];
$dep_oran_ver1 = $row['konuk_oran'];

$alt_ust_05_ust_ver1 = $row['ust05'];
$alt_ust_05_alt_ver1 = $row['alt05'];

$alt_ust_15_ust_ver1 = $row['ust15'];
$alt_ust_15_alt_ver1 = $row['alt15'];

$alt_ust_25_ust_ver1 = $row['ust25'];
$alt_ust_25_alt_ver1 = $row['alt25'];

$alt_ust_35_ust_ver1 = $row['ust35'];
$alt_ust_35_alt_ver1 = $row['alt35'];

$alt_ust_45_ust_ver1 = $row['ust45'];
$alt_ust_45_alt_ver1 = $row['alt45'];

$alt_ust_55_ust_ver1 = $row['ust55'];
$alt_ust_55_alt_ver1 = $row['alt55'];

$karsilikligol_var1 = $row['kgvar'];
$karsilikligol_yok1 = $row['kgyok'];

$ev_oran_ver = dusenoranbulcanli($ev_oran_ver1,"1X2","futbol");
$ber_oran_ver = dusenoranbulcanli($ber_oran_ver1,"1X2","futbol");
$dep_oran_ver = dusenoranbulcanli($dep_oran_ver1,"1X2","futbol");

$alt_ust_05_ust_ver = dusenoranbulcanli($alt_ust_05_ust_ver1,"Toplam 0.5 Gol Alt Üst","futbol");
$alt_ust_05_alt_ver = dusenoranbulcanli($alt_ust_05_alt_ver1,"Toplam 0.5 Gol Alt Üst","futbol");

$alt_ust_15_ust_ver = dusenoranbulcanli($alt_ust_15_ust_ver1,"Toplam 1.5 Gol Alt Üst","futbol");
$alt_ust_15_alt_ver = dusenoranbulcanli($alt_ust_15_alt_ver1,"Toplam 1.5 Gol Alt Üst","futbol");

$alt_ust_25_ust_ver = dusenoranbulcanli($alt_ust_25_ust_ver1,"Toplam 2.5 Gol Alt Üst","futbol");
$alt_ust_25_alt_ver = dusenoranbulcanli($alt_ust_25_alt_ver1,"Toplam 2.5 Gol Alt Üst","futbol");

$alt_ust_35_ust_ver = dusenoranbulcanli($alt_ust_35_ust_ver1,"Toplam 3.5 Gol Alt Üst","futbol");
$alt_ust_35_alt_ver = dusenoranbulcanli($alt_ust_35_alt_ver1,"Toplam 3.5 Gol Alt Üst","futbol");

$alt_ust_45_ust_ver = dusenoranbulcanli($alt_ust_45_ust_ver1,"Toplam 4.5 Gol Alt Üst","futbol");
$alt_ust_45_alt_ver = dusenoranbulcanli($alt_ust_45_alt_ver1,"Toplam 4.5 Gol Alt Üst","futbol");

$alt_ust_55_ust_ver = dusenoranbulcanli($alt_ust_55_ust_ver1,"Toplam 5.5 Gol Alt Üst","futbol");
$alt_ust_55_alt_ver = dusenoranbulcanli($alt_ust_55_alt_ver1,"Toplam 5.5 Gol Alt Üst","futbol");

$karsilikligol_var = dusenoranbulcanli($karsilikligol_var,"Karşılıklı Gol Olurmu ?","futbol");
$karsilikligol_yok = dusenoranbulcanli($karsilikligol_yok1,"Karşılıklı Gol Olurmu ?","futbol");

if($ev_oran_ver>0 || $ber_oran_ver>0 || $dep_oran_ver>0){
$json2['17'] = array("tempid"=>"17","N2"=>"1X2","N"=>"1X2","id"=>"1","o"=>true);

$json2['17']['games'] = array(
["Id"=>"1","EGID"=>"1","Namexxx"=>"1","Name"=>"1","Name1X2"=>"","Visible"=>true,"Odds"=>$ev_oran_ver,"templateId"=>"17"],
["Id"=>"2","EGID"=>"1","Namexxx"=>"X","Name"=>"X","Name1X2"=>"","Visible"=>true,"Odds"=>$ber_oran_ver,"templateId"=>"17"],
["Id"=>"3","EGID"=>"1","Namexxx"=>"2","Name"=>"2","Name1X2"=>"","Visible"=>true,"Odds"=>$dep_oran_ver,"templateId"=>"17"]
);
} else {
$json2['17'] = array();
}

if($karsilikligol_var>0 || $karsilikligol_var>0){
$json2['7824'] = array("tempid"=>"7824","N2"=>"Karşılıklı Gol Olurmu ?","N"=>"Karşılıklı Gol Olurmu ?","id"=>"7","o"=>true);

$json2['7824']['games'] = array(
["Id"=>"7","EGID"=>"7","Namexxx"=>"E","Name"=>"E","Name1X2"=>"","Visible"=>true,"Odds"=>$karsilikligol_var,"templateId"=>"7824"],
["Id"=>"8","EGID"=>"7","Namexxx"=>"H","Name"=>"H","Name1X2"=>"","Visible"=>true,"Odds"=>$karsilikligol_yok,"templateId"=>"7824"]
);
} else {
$json2['7824'] = array();
}

if($row["altustgol05"]==1){
	$visible_05 = true;
} else {
	$visible_05 = false;
}
if($row["altustgol15"]==1){
	$visible_15 = true;
} else {
	$visible_15 = false;
}
if($row["altustgol25"]==1){
	$visible_25 = true;
} else {
	$visible_25 = false;
}
if($row["altustgol35"]==1){
	$visible_35 = true;
} else {
	$visible_35 = false;
}
if($row["altustgol45"]==1){
	$visible_45 = true;
} else {
	$visible_45 = false;
}
if($row["altustgol55"]==1){
	$visible_55 = true;
} else {
	$visible_55 = false;
}

if($row["altustgol05"]==1){
	$showl_ver = 26;
} else if($row["altustgol15"]==1){
	$showl_ver = 27;
} else if($row["altustgol25"]==1){
	$showl_ver = 28;
} else if($row["altustgol35"]==1){
	$showl_ver = 29;
} else if($row["altustgol45"]==1){
	$showl_ver = 30;
} else if($row["altustgol55"]==1){
	$showl_ver = 31;
}

if($alt_ust_05_ust_ver>0 || $alt_ust_05_alt_ver>0){
$json2['7233'] = array("tempid"=>"7233","N2"=>"Toplam 0.5 Gol Alt Üst","N"=>"Toplam 0.5 Gol Alt Üst","id"=>"2","o"=>$visible_05,"showl"=>$showl_ver);

$json2['7233']['games'] = array(
["Id"=>"1","EGID"=>"2","hcoun"=>"8","Name1X2"=>"+","Namexxx"=>"+","Name"=>"Ü","Visible"=>true,"Odds"=>$alt_ust_05_ust_ver,"templateId"=>"7233"],
["Id"=>"3","EGID"=>"2","hcoun"=>"7","Name1X2"=>"-","Namexxx"=>"-","Name"=>"A","Visible"=>true,"Odds"=>$alt_ust_05_alt_ver,"templateId"=>"7233"]
);
} else {
$json2['7233'] = array();
}

if($alt_ust_15_ust_ver>0 || $alt_ust_15_alt_ver>0){
$json2['1772'] = array("tempid"=>"1772","N2"=>"Toplam 1.5 Gol Alt Üst","N"=>"Toplam 1.5 Gol Alt Üst","id"=>"3","o"=>$visible_15,"showl"=>$showl_ver);

$json2['1772']['games'] = array(
["Id"=>"1","EGID"=>"3","hcoun"=>"8","Name1X2"=>"+","Namexxx"=>"+","Name"=>"Ü","Visible"=>true,"Odds"=>$alt_ust_15_ust_ver,"templateId"=>"1772"],
["Id"=>"3","EGID"=>"3","hcoun"=>"7","Name1X2"=>"-","Namexxx"=>"-","Name"=>"A","Visible"=>true,"Odds"=>$alt_ust_15_alt_ver,"templateId"=>"1772"]
);
} else {
$json2['1772'] = array();
}

if($alt_ust_25_ust_ver>0 || $alt_ust_25_alt_ver>0){
$json2['173'] = array("tempid"=>"173","N2"=>"Toplam 2.5 Gol Alt Üst","N"=>"Toplam 2.5 Gol Alt Üst","id"=>"4","o"=>$visible_25,"showl"=>$showl_ver);

$json2['173']['games'] = array(
["Id"=>"1","EGID"=>"4","hcoun"=>"8","Name1X2"=>"+","Namexxx"=>"+","Name"=>"Ü","Visible"=>true,"Odds"=>$alt_ust_25_ust_ver,"templateId"=>"173"],
["Id"=>"3","EGID"=>"4","hcoun"=>"7","Name1X2"=>"-","Namexxx"=>"-","Name"=>"A","Visible"=>true,"Odds"=>$alt_ust_25_alt_ver,"templateId"=>"173"]
);
} else {
$json2['173'] = array();
}

if($alt_ust_35_ust_ver>0 || $alt_ust_35_alt_ver>0){
$json2['8933'] = array("tempid"=>"8933","N2"=>"Toplam 3.5 Gol Alt Üst","N"=>"Toplam 3.5 Gol Alt Üst","id"=>"5","o"=>$visible_35,"showl"=>$showl_ver);

$json2['8933']['games'] = array(
["Id"=>"1","EGID"=>"5","hcoun"=>"8","Name1X2"=>"+","Namexxx"=>"+","Name"=>"Ü","Visible"=>true,"Odds"=>$alt_ust_35_ust_ver,"templateId"=>"8933"],
["Id"=>"3","EGID"=>"5","hcoun"=>"7","Name1X2"=>"-","Namexxx"=>"-","Name"=>"A","Visible"=>true,"Odds"=>$alt_ust_35_alt_ver,"templateId"=>"8933"]
);
} else {
$json2['8933'] = array();
}

if($alt_ust_45_ust_ver>0 || $alt_ust_45_alt_ver>0){
$json2['1791'] = array("tempid"=>"1791","N2"=>"Toplam 4.5 Gol Alt Üst","N"=>"Toplam 4.5 Gol Alt Üst","id"=>"6","o"=>$visible_45,"showl"=>$showl_ver);

$json2['1791']['games'] = array(
["Id"=>"1","EGID"=>"6","hcoun"=>"8","Name1X2"=>"+","Namexxx"=>"+","Name"=>"Ü","Visible"=>true,"Odds"=>$alt_ust_45_ust_ver,"templateId"=>"1791"],
["Id"=>"3","EGID"=>"6","hcoun"=>"7","Name1X2"=>"-","Namexxx"=>"-","Name"=>"A","Visible"=>true,"Odds"=>$alt_ust_45_alt_ver,"templateId"=>"1791"]
);
} else {
$json2['1791'] = array();
}

if($alt_ust_55_ust_ver>0 || $alt_ust_55_alt_ver>0){
$json2['859'] = array("tempid"=>"859","N2"=>"Toplam 5.5 Gol Alt Üst","N"=>"Toplam 5.5 Gol Alt Üst","id"=>"7","o"=>$visible_55,"showl"=>$showl_ver);

$json2['859']['games'] = array(
["Id"=>"1","EGID"=>"7","hcoun"=>"8","Name1X2"=>"+","Namexxx"=>"+","Name"=>"Ü","Visible"=>true,"Odds"=>$alt_ust_55_ust_ver,"templateId"=>"859"],
["Id"=>"3","EGID"=>"7","hcoun"=>"7","Name1X2"=>"-","Namexxx"=>"-","Name"=>"A","Visible"=>true,"Odds"=>$alt_ust_55_alt_ver,"templateId"=>"859"]
);
} else {
$json2['859'] = array();
}


$ulke_ver = ulkeadikisalt($row["ulke"]);
$farklattir = time()-$row["songuncelleme"];

$json[] = array(
"id"=>$row['eventid'],
"uri"=>"1",
"addicon"=>"play",
"gseri"=>"0",
"tv"=>"",
"update_at"=>$row['songuncelleme'],
"farksayisi"=>$farklattir,
"update_atzone"=>$songuncelleme_tarih,
"h"=>$row['ev_takim'],
"a"=>$row['konuk_takim'],
"spid"=>"4",
"tkm"=>$takim_birlestir,
"uname"=>$ulke_ver,
"unamemobil"=>$ulke_ver,
//"uname"=>$row["ulke"],
"uid"=>$row['ulkeid'],
"lname"=>$row['lig_adi'],
"lid"=>$row['lig_id'],
"radarid"=>$row['betradar_id'],
"addtime"=>$row['songuncelleme'],
"directtime"=>"0",
"smid"=>$row['simulation'],
"tarih"=>$baslama_saat_tarihli,
"sht"=>$baslama_saat_saat,
"run"=>"true",
"tmac"=>$getir_bakem_saati,
"dk"=>$row['dakika'],
"sn"=>$row['saniye'],
"stps"=>"",
"sch"=>$row['ev_skor'],
"sca"=>$row['konuk_skor'],
"isch"=>$row['iy_ev'],
"isca"=>$row['iy_konuk'],
"redh"=>$row['kirmizi_ev'],
"reda"=>$row['kirmizi_konuk'],
"pid"=>$period_id,
"srtat"=>time(),
"acsc"=>time(),
"periodsh"=>["1"=>"0","2"=>"0","3"=>"0","4"=>"0","5"=>"0","6"=>"0","7"=>"0"],
"periodsa"=>["1"=>"0","2"=>"0","3"=>"0","4"=>"0","5"=>"0","6"=>"0","7"=>"0"],
"turn"=>"0",
"live"=>$json2
);

$toplam_mac++;

}

if(userayar('canlibasketbol')=="1") {

$gizli_canlilar = gizlicanlimaclistb();
$sor = sed_sql_query("select * from basketbol_canli_maclar where gelecek='0' {$whereyasak} and songuncelleme>$fark and isibitti='0' and lig_adi not like '%NCAA%' $gizli_canlilar group by eventid  order by ulkeid asc");

/*
$sor = sed_sql_query("select * from basketbol_canli_maclar where gelecek='0' {$whereyasak} and songuncelleme>$fark and isibitti='0' and lig_adi not like '%E-Sports%' $gizli_canlilar group by eventid  order by ulkeid asc");
*/

while($row=sed_sql_fetcharray($sor)) {

$songuncelleme_tarih = date("d-m-Y H:i:s",$row['songuncelleme']);
$takim_birlestir = "".$row['ev_takim']." - ".$row['konuk_takim']."";
$baslama_saat_str = strtotime($row['baslamasaat']);
$baslama_saat_saat = date("H:i",$baslama_saat_str);
$baslama_saat_tarihli = date("d-m-Y H:i:s",$baslama_saat_str);
$dakika_eklenmis_saat = strtotime($row['baslamasaat'])+$row['dakika'];
$getir_bakem_saati = date("d-m-Y H:i:s",$dakika_eklenmis_saat);

if($row['period']=="Başlamadı"){
	$period_id = 0;
} else if($row['period']=="1.Çeyrek"){
	$period_id = 1;
} else if($row['period']=="1.Ara"){
	$period_id = 2;
} else if($row['period']=="2.Çeyrek"){
	$period_id = 3;
} else if($row['period']=="2.Ara"){
	$period_id = 4;
} else if($row['period']=="3.Çeyrek"){
	$period_id = 5;
} else if($row['period']=="3.Ara"){
	$period_id = 6;
} else if($row['period']=="4.Çeyrek"){
	$period_id = 7;
} else if($row['period']=="4.Ara"){
	$period_id = 8;
} else if($row['period']=="Bitti"){
	$period_id = 255;
}

$bir_period_skor_bol = explode(" - ",$row['bir_period_skor']);
$iki_period_skor_bol = explode(" - ",$row['iki_period_skor']);
$uc_period_skor_bol = explode(" - ",$row['uc_period_skor']);
$dort_period_skor_bol = explode(" - ",$row['dort_period_skor']);

$ev_1_ver = $bir_period_skor_bol[0];
$ev_2_ver = $iki_period_skor_bol[0];
$ev_3_ver = $uc_period_skor_bol[0];
$ev_4_ver = $dort_period_skor_bol[0];

$dep_1_ver = $bir_period_skor_bol[1];
$dep_2_ver = $iki_period_skor_bol[1];
$dep_3_ver = $uc_period_skor_bol[1];
$dep_4_ver = $dort_period_skor_bol[1];

$ev_oran_ver1 = "0.00";
$dep_oran_ver1 = "0.00";
$alt_ust_ust_ver1 = "0.00";
$alt_ust_alt_ver1 = "0.00";

$ev_oran_ver1 = $row['ev_oran'];
$dep_oran_ver1 = $row['konuk_oran'];

$alt_ust_ust_ver1 = $row['ust'];
$alt_ust_alt_ver1 = $row['alt'];

$ev_oran_ver = dusenoranbulcanli($ev_oran_ver1,"Kim Kazanır (Uz. Dahil)","basketbol");
$dep_oran_ver = dusenoranbulcanli($dep_oran_ver1,"Kim Kazanır (Uz. Dahil)","basketbol");

$alt_ust_ust_ver = dusenoranbulcanli($alt_ust_ust_ver1,"Toplam Skor Alt/Üst","basketbol");
$alt_ust_alt_ver = dusenoranbulcanli($alt_ust_alt_ver1,"Toplam Skor Alt/Üst","basketbol");

if($row['ev_oran']=='0.00' || $row['konuk_oran']=='0.00' || $row['ev_oran']=='' || $row['konuk_oran']==''){
	$oran_visible_ver = false;
} else {
	$oran_visible_ver = true;
}

$json3['66'] = array("tempid"=>"66","N2"=>"Kim Kazanır","N"=>"Kim Kazanır","id"=>"1","o"=>$oran_visible_ver);

$json3['66']['games'] = array(
["Id"=>"1","EGID"=>"1","Namexxx"=>"1","Name"=>"1","Name1X2"=>"","Visible"=>true,"Odds"=>$ev_oran_ver,"templateId"=>"66"],
["Id"=>"2","EGID"=>"1","Namexxx"=>"2","Name"=>"2","Name1X2"=>"","Visible"=>true,"Odds"=>$dep_oran_ver,"templateId"=>"66"]
);

if($row['altustgol']=='0'){
	$oran_visible_ver2 = false;
} else {
	$oran_visible_ver2 = true;
}

$json3['102'] = array("tempid"=>"102","N2"=>"Toplam Skor Alt/Üst","N"=>"Toplam Skor Alt/Üst","id"=>"2","o"=>$oran_visible_ver2);

$json3['102']['games'] = array(
["Id"=>"3","EGID"=>"2","hcoun"=>"8","Namexxx"=>"Üst ".$row['altustgol']."","Name"=>"Üst ".$row['altustgol']."","Name1X2"=>"+","Visible"=>true,"Odds"=>$alt_ust_ust_ver,"templateId"=>"102"],
["Id"=>"4","EGID"=>"2","hcoun"=>"7","Namexxx"=>"Alt ".$row['altustgol']."","Name"=>"Alt ".$row['altustgol']."","Name1X2"=>"-","Visible"=>true,"Odds"=>$alt_ust_alt_ver,"templateId"=>"102"]
);

$ulke_ver = ulkeadikisalt($row["ulke"]);

$farklattir = time()-$row["songuncelleme"];

$json[] = array(
"id"=>$row['eventid'],
"uri"=>"1",
"addicon"=>"",
"gseri"=>"0",
"tv"=>"",
"update_at"=>$row['songuncelleme'],
"farksayisi"=>$farklattir,
"update_atzone"=>$songuncelleme_tarih,
"h"=>$row['ev_takim'],
"a"=>$row['konuk_takim'],
"spid"=>"7",
"tkm"=>$takim_birlestir,
"uname"=>$ulke_ver,
"unamemobil"=>$ulke_ver,
"uid"=>$row['ulkeid'],
"lname"=>$row['lig_adi'],
"lid"=>$row['lig_id'],
"radarid"=>$row['betradar_id'],
"addtime"=>$row['songuncelleme'],
"directtime"=>"0",
"smid"=>"",
"tarih"=>$baslama_saat_tarihli,
"sht"=>$baslama_saat_saat,
"run"=>"true",
"tmac"=>$getir_bakem_saati,
"dk"=>$row['dakika'],
"sn"=>"",
"stps"=>"",
"sch"=>$row['ev_skor'],
"sca"=>$row['konuk_skor'],
"isch"=>$row['iy_ev'],
"isca"=>$row['iy_konuk'],
"redh"=>"0",
"reda"=>"0",
"pid"=>$period_id,
"srtat"=>time(),
"acsc"=>time(),
"periodsh"=>["1"=>$ev_1_ver,"2"=>$ev_2_ver,"3"=>$ev_3_ver,"4"=>$ev_4_ver,"5"=>"0","6"=>"0","7"=>"0"],
"periodsa"=>["1"=>$dep_1_ver,"2"=>$dep_2_ver,"3"=>$dep_3_ver,"4"=>$dep_4_ver,"5"=>"0","6"=>"0","7"=>"0"],
"turn"=>"0",
"live"=>$json3
);

$toplam_mac++;

}

}

if(userayar('canlitenis')=="1") {

$gizli_canlilar = gizlicanlimaclistt();
$sor = sed_sql_query("select * from canli_maclar_tenis where gelecek='0' {$whereyasak} and songuncelleme>$fark and isibitti='0' and lig_adi not like '%E-Sports%' $gizli_canlilar group by eventid  order by ulkeid asc");

while($row=sed_sql_fetcharray($sor)) {

$songuncelleme_tarih = date("d-m-Y H:i:s",$row['songuncelleme']);
$takim_birlestir = "".$row['ev_takim']." - ".$row['konuk_takim']."";
$baslama_saat_str = strtotime($row['baslamasaat']);
$baslama_saat_saat = date("H:i",$baslama_saat_str);
$baslama_saat_tarihli = date("d-m-Y H:i:s",$baslama_saat_str);
$dakika_eklenmis_saat = strtotime($row['baslamasaat'])+$row['dakika'];
$getir_bakem_saati = date("d-m-Y H:i:s",$dakika_eklenmis_saat);

if($row['period']=="Başlamadı"){
	$period_id = 0;
} else if($row['period']=="1.Set"){
	$period_id = 1;
} else if($row['period']=="2.Set"){
	$period_id = 2;
} else if($row['period']=="3.Set"){
	$period_id = 3;
} else if($row['period']=="Durdu"){
	$period_id = 6;
} else if($row['period']=="Bitti"){
	$period_id = 255;
}

$bir_period_skor_bol = explode(" - ",$row['bir_period_skor']);
$iki_period_skor_bol = explode(" - ",$row['iki_period_skor']);
$uc_period_skor_bol = explode(" - ",$row['uc_period_skor']);
$dort_period_skor_bol = explode(" - ",$row['dort_period_skor']);

$ev_1_ver = $bir_period_skor_bol[0];
$ev_2_ver = $iki_period_skor_bol[0];
$ev_3_ver = $uc_period_skor_bol[0];
$ev_4_ver = $dort_period_skor_bol[0];

$dep_1_ver = $bir_period_skor_bol[1];
$dep_2_ver = $iki_period_skor_bol[1];
$dep_3_ver = $uc_period_skor_bol[1];
$dep_4_ver = $dort_period_skor_bol[1];

if($row['ev_oran']=='0.00' || $row['konuk_oran']=='0.00' || $row['ev_oran']=='' || $row['konuk_oran']==''){
	$oran_visible_ver = false;
} else {
	$oran_visible_ver = true;
}

$ev_oran_ver1 = "0.00";
$dep_oran_ver1 = "0.00";

$ev_oran_ver1 = $row['ev_oran'];
$dep_oran_ver1 = $row['konuk_oran'];

$ev_oran_ver = dusenoranbulcanli($ev_oran_ver1,"Kim Kazanır","tenis");
$dep_oran_ver = dusenoranbulcanli($dep_oran_ver1,"Kim Kazanır","tenis");

$json3['66'] = array("tempid"=>"66","N2"=>"Kim Kazanır","N"=>"Kim Kazanır","id"=>"1","o"=>$oran_visible_ver);

$json3['66']['games'] = array(
["Id"=>"1","EGID"=>"1","Namexxx"=>"1","Name"=>"1","Name1X2"=>"","Visible"=>true,"Odds"=>$ev_oran_ver,"templateId"=>"66"],
["Id"=>"2","EGID"=>"1","Namexxx"=>"2","Name"=>"2","Name1X2"=>"","Visible"=>true,"Odds"=>$dep_oran_ver,"templateId"=>"66"]
);

$ulke_ver = ulkeadikisalt($row["ulke"]);

$json[] = array(
"id"=>$row['eventid'],
"uri"=>"1",
"addicon"=>"",
"gseri"=>"0",
"tv"=>"",
"update_at"=>$row['songuncelleme'],
"update_atzone"=>$songuncelleme_tarih,
"h"=>$row['ev_takim'],
"a"=>$row['konuk_takim'],
"spid"=>"5",
"tkm"=>$takim_birlestir,
"uname"=>$ulke_ver,
"unamemobil"=>$ulke_ver,
"uid"=>$row['ulkeid'],
"lname"=>$row['lig_adi'],
"lid"=>$row['lig_id'],
"radarid"=>$row['betradar_id'],
"addtime"=>$row['songuncelleme'],
"directtime"=>"0",
"smid"=>"",
"tarih"=>$baslama_saat_tarihli,
"sht"=>$baslama_saat_saat,
"run"=>"true",
"tmac"=>$getir_bakem_saati,
"dk"=>$row['dakika'],
"sn"=>"",
"stps"=>"",
"sch"=>$row['ev_skor'],
"sca"=>$row['konuk_skor'],
"isch"=>$row['iy_ev'],
"isca"=>$row['iy_konuk'],
"redh"=>"0",
"reda"=>"0",
"pid"=>$period_id,
"srtat"=>time(),
"acsc"=>time(),
"periodsh"=>["1"=>$ev_1_ver,"2"=>$ev_2_ver,"3"=>$ev_3_ver,"4"=>$ev_4_ver,"5"=>"0","6"=>"0","7"=>$row['ev_skor']],
"periodsa"=>["1"=>$dep_1_ver,"2"=>$dep_2_ver,"3"=>$dep_3_ver,"4"=>$dep_4_ver,"5"=>"0","6"=>"0","7"=>$row['konuk_skor']],
"turn"=>"0",
"live"=>$json3
);

$toplam_mac++;

}

}

if(userayar('canlivoleybol')=="1") {

$gizli_canlilar = gizlicanlimaclistv();
$sor = sed_sql_query("select * from canli_maclar_voleybol where gelecek='0' {$whereyasak} and songuncelleme>$fark and isibitti='0' and lig_adi not like '%E-Sports%' $gizli_canlilar group by eventid  order by ulkeid asc");

while($row=sed_sql_fetcharray($sor)) {

$songuncelleme_tarih = date("d-m-Y H:i:s",$row['songuncelleme']);
$takim_birlestir = "".$row['ev_takim']." - ".$row['konuk_takim']."";
$baslama_saat_str = strtotime($row['baslamasaat']);
$baslama_saat_saat = date("H:i",$baslama_saat_str);
$baslama_saat_tarihli = date("d-m-Y H:i:s",$baslama_saat_str);
$dakika_eklenmis_saat = strtotime($row['baslamasaat'])+$row['dakika'];
$getir_bakem_saati = date("d-m-Y H:i:s",$dakika_eklenmis_saat);

if($row['period']=="Başlamadı"){
	$period_id = 0;
} else if($row['period']=="1.Set"){
	$period_id = 1;
} else if($row['period']=="1.Ara"){
	$period_id = 2;
} else if($row['period']=="2.Set"){
	$period_id = 3;
} else if($row['period']=="2.Ara"){
	$period_id = 4;
} else if($row['period']=="3.Set"){
	$period_id = 5;
} else if($row['period']=="3.Ara"){
	$period_id = 6;
} else if($row['period']=="4.Set"){
	$period_id = 7;
} else if($row['period']=="4.Ara"){
	$period_id = 8;
} else if($row['period']=="5.Set"){
	$period_id = 9;
} else if($row['period']=="Bitti"){
	$period_id = 255;
}

$bir_period_skor_bol = explode(" - ",$row['bir_period_skor']);
$iki_period_skor_bol = explode(" - ",$row['iki_period_skor']);
$uc_period_skor_bol = explode(" - ",$row['uc_period_skor']);
$dort_period_skor_bol = explode(" - ",$row['dort_period_skor']);
$bes_period_skor_bol = explode(" - ",$row['bes_period_skor_bol']);

$ev_1_ver = $bir_period_skor_bol[0];
$ev_2_ver = $iki_period_skor_bol[0];
$ev_3_ver = $uc_period_skor_bol[0];
$ev_4_ver = $dort_period_skor_bol[0];
$ev_5_ver = $bes_period_skor_bol[0];

$dep_1_ver = $bir_period_skor_bol[1];
$dep_2_ver = $iki_period_skor_bol[1];
$dep_3_ver = $uc_period_skor_bol[1];
$dep_4_ver = $dort_period_skor_bol[1];
$dep_5_ver = $bes_period_skor_bol[1];

$ev_oran_ver1 = "0.00";
$dep_oran_ver1 = "0.00";

$ev_oran_ver1 = $row['ev_oran'];
$dep_oran_ver1 = $row['konuk_oran'];

$ev_oran_ver = dusenoranbulcanli($ev_oran_ver1,"Kim Kazanır","voleybol");
$dep_oran_ver = dusenoranbulcanli($dep_oran_ver1,"Kim Kazanır","voleybol");

if($ev_oran_ver=='0.00' || $dep_oran_ver=='0.00' || $ev_oran_ver=='' || $dep_oran_ver==''){
	$oran_visible_ver = false;
} else {
	$oran_visible_ver = true;
}

$json3['66'] = array("tempid"=>"66","N2"=>"Kim Kazanır","N"=>"Kim Kazanır","id"=>"1","o"=>$oran_visible_ver);

$json3['66']['games'] = array(
["Id"=>"1","EGID"=>"1","Namexxx"=>"1","Name"=>"1","Name1X2"=>"","Visible"=>true,"Odds"=>$ev_oran_ver,"templateId"=>"66"],
["Id"=>"2","EGID"=>"1","Namexxx"=>"2","Name"=>"2","Name1X2"=>"","Visible"=>true,"Odds"=>$dep_oran_ver,"templateId"=>"66"]
);

$ulke_ver = ulkeadikisalt($row["ulke"]);

$json[] = array(
"id"=>$row['eventid'],
"uri"=>"1",
"addicon"=>"",
"gseri"=>"0",
"tv"=>"",
"update_at"=>$row['songuncelleme'],
"update_atzone"=>$songuncelleme_tarih,
"h"=>$row['ev_takim'],
"a"=>$row['konuk_takim'],
"spid"=>"18",
"tkm"=>$takim_birlestir,
"uname"=>$ulke_ver,
"unamemobil"=>$ulke_ver,
"uid"=>$row['ulkeid'],
"lname"=>$row['lig_adi'],
"lid"=>$row['lig_id'],
"radarid"=>$row['betradar_id'],
"addtime"=>$row['songuncelleme'],
"directtime"=>"0",
"smid"=>"",
"tarih"=>$baslama_saat_tarihli,
"sht"=>$baslama_saat_saat,
"run"=>"true",
"tmac"=>$getir_bakem_saati,
"dk"=>$row['dakika'],
"sn"=>"",
"stps"=>"",
"period_1_ev"=>$ev_1_ver,
"period_2_ev"=>$ev_2_ver,
"period_3_ev"=>$ev_3_ver,
"period_4_ev"=>$ev_4_ver,
"period_5_ev"=>$ev_5_ver,
"period_1_dep"=>$dep_1_ver,
"period_2_dep"=>$dep_2_ver,
"period_3_dep"=>$dep_3_ver,
"period_4_dep"=>$dep_4_ver,
"period_5_dep"=>$dep_5_ver,
"sch"=>$row['ev_skor'],
"sca"=>$row['konuk_skor'],
"isch"=>$row['iy_ev'],
"isca"=>$row['iy_konuk'],
"redh"=>"0",
"reda"=>"0",
"pid"=>$period_id,
"srtat"=>time(),
"acsc"=>time(),
"periodsh"=>["1"=>$ev_1_ver,"2"=>$ev_2_ver,"3"=>$ev_3_ver,"4"=>$ev_4_ver,"5"=>$ev_5_ver,"6"=>"0","7"=>$row['ev_skor']],
"periodsa"=>["1"=>$dep_1_ver,"2"=>$dep_2_ver,"3"=>$dep_3_ver,"4"=>$dep_4_ver,"5"=>$dep_5_ver,"6"=>"0","7"=>$row['konuk_skor']],
"turn"=>"0",
"live"=>$json3
);

$toplam_mac++;

}

}

if(userayar('canlibuzhokeyi')=="1") {

$gizli_canlilar = gizlicanlimaclistbuz();
$sor = sed_sql_query("select * from canli_maclar_buzhokeyi where gelecek='0' {$whereyasak} and songuncelleme>$fark and isibitti='0' and lig_adi not like '%E-Sports%' $gizli_canlilar group by eventid  order by ulkeid asc");

while($row=sed_sql_fetcharray($sor)) {

$songuncelleme_tarih = date("d-m-Y H:i:s",$row['songuncelleme']);
$takim_birlestir = "".$row['ev_takim']." - ".$row['konuk_takim']."";
$baslama_saat_str = strtotime($row['baslamasaat']);
$baslama_saat_saat = date("H:i",$baslama_saat_str);
$baslama_saat_tarihli = date("d-m-Y H:i:s",$baslama_saat_str);
$dakika_eklenmis_saat = strtotime($row['baslamasaat'])+$row['dakika'];
$getir_bakem_saati = date("d-m-Y H:i:s",$dakika_eklenmis_saat);

if($row['period']=="Başlamadı"){
	$period_id = 0;
} else if($row['period']=="1.Period"){
	$period_id = 1;
} else if($row['period']=="1.Ara"){
	$period_id = 2;
} else if($row['period']=="2.Period"){
	$period_id = 3;
} else if($row['period']=="2.Ara"){
	$period_id = 4;
} else if($row['period']=="3.Period"){
	$period_id = 5;
} else if($row['period']=="3.Ara"){
	$period_id = 6;
} else if($row['period']=="Bitti"){
	$period_id = 255;
}

$bir_period_skor_bol = explode(" - ",$row['bir_period_skor']);
$iki_period_skor_bol = explode(" - ",$row['iki_period_skor']);
$uc_period_skor_bol = explode(" - ",$row['uc_period_skor']);

$ev_1_ver = $bir_period_skor_bol[0];
$ev_2_ver = $iki_period_skor_bol[0];
$ev_3_ver = $uc_period_skor_bol[0];

$dep_1_ver = $bir_period_skor_bol[1];
$dep_2_ver = $iki_period_skor_bol[1];
$dep_3_ver = $uc_period_skor_bol[1];

$ev_oran_ver1 = "0.00";
$ber_oran_ver1 = "0.00";
$dep_oran_ver1 = "0.00";

$ev_oran_ver1 = $row['ev_oran'];
$ber_oran_ver1 = $row['berabere_oran'];
$dep_oran_ver1 = $row['konuk_oran'];

$ev_oran_ver = dusenoranbulcanli($ev_oran_ver1,"1X2","buzhokeyi");
$ber_oran_ver = dusenoranbulcanli($ber_oran_ver1,"1X2","buzhokeyi");
$dep_oran_ver = dusenoranbulcanli($dep_oran_ver1,"1X2","buzhokeyi");

if($ev_oran_ver>0 || $ber_oran_ver>0 || $dep_oran_ver>0){
$json2['51'] = array("tempid"=>"51","N2"=>"1X2","N"=>"1X2","id"=>"1","o"=>true);

$json2['51']['games'] = array(
["Id"=>"1","EGID"=>"1","Namexxx"=>"1","Name"=>"1","Name1X2"=>"","Visible"=>true,"Odds"=>$ev_oran_ver,"templateId"=>"51"],
["Id"=>"2","EGID"=>"1","Namexxx"=>"X","Name"=>"X","Name1X2"=>"","Visible"=>true,"Odds"=>$ber_oran_ver,"templateId"=>"51"],
["Id"=>"3","EGID"=>"1","Namexxx"=>"2","Name"=>"2","Name1X2"=>"","Visible"=>true,"Odds"=>$dep_oran_ver,"templateId"=>"51"]
);
} else {
$json2['51'] = array();
}

$ulke_ver = ulkeadikisalt($row["ulke"]);

$json[] = array(
"id"=>$row['eventid'],
"uri"=>"1",
"addicon"=>"",
"gseri"=>"0",
"tv"=>"",
"update_at"=>$row['songuncelleme'],
"update_atzone"=>$songuncelleme_tarih,
"h"=>$row['ev_takim'],
"a"=>$row['konuk_takim'],
"spid"=>"12",
"tkm"=>$takim_birlestir,
"uname"=>$ulke_ver,
"unamemobil"=>$ulke_ver,
"uid"=>$row['ulkeid'],
"lname"=>$row['lig_adi'],
"lid"=>$row['lig_id'],
"radarid"=>$row['betradar_id'],
"addtime"=>$row['songuncelleme'],
"directtime"=>"0",
"smid"=>"",
"tarih"=>$baslama_saat_tarihli,
"sht"=>$baslama_saat_saat,
"run"=>"true",
"tmac"=>$getir_bakem_saati,
"dk"=>$row['dakika'],
"sn"=>"",
"stps"=>"",
"sch"=>$row['ev_skor'],
"sca"=>$row['konuk_skor'],
"isch"=>$row['iy_ev'],
"isca"=>$row['iy_konuk'],
"redh"=>"0",
"reda"=>"0",
"pid"=>$period_id,
"srtat"=>time(),
"acsc"=>time(),
"periodsh"=>["1"=>$ev_1_ver,"2"=>$ev_2_ver,"3"=>$ev_3_ver,"4"=>"0","5"=>"0","6"=>"0","7"=>$row['ev_skor']],
"periodsa"=>["1"=>$dep_1_ver,"2"=>$dep_2_ver,"3"=>$dep_3_ver,"4"=>"0","5"=>"0","6"=>"0","7"=>$row['konuk_skor']],
"turn"=>"0",
"live"=>$json2
);

$toplam_mac++;

}

}

if(userayar('canlimasatenisi')=="1") {

$gizli_canlilar = gizlicanlimaclistmt();
$sor = sed_sql_query("select * from canli_maclar_masatenis where gelecek='0' {$whereyasak} and songuncelleme>$fark and isibitti='0' and lig_adi not like '%E-Sports%' $gizli_canlilar group by eventid  order by ulkeid asc limit 7");

while($row=sed_sql_fetcharray($sor)) {

$songuncelleme_tarih = date("d-m-Y H:i:s",$row['songuncelleme']);
$takim_birlestir = "".$row['ev_takim']." - ".$row['konuk_takim']."";
$baslama_saat_str = strtotime($row['baslamasaat']);
$baslama_saat_saat = date("H:i",$baslama_saat_str);
$baslama_saat_tarihli = date("d-m-Y H:i:s",$baslama_saat_str);
$dakika_eklenmis_saat = strtotime($row['baslamasaat'])+$row['dakika'];
$getir_bakem_saati = date("d-m-Y H:i:s",$dakika_eklenmis_saat);

if($row['period']=="Başlamadı"){
	$period_id = 0;
} else if($row['period']=="1.SET"){
	$period_id = 1;
} else if($row['period']=="1.STP"){
	$period_id = 2;
} else if($row['period']=="2.SET"){
	$period_id = 3;
} else if($row['period']=="2.STP"){
	$period_id = 4;
} else if($row['period']=="3.SET"){
	$period_id = 5;
} else if($row['period']=="3.STP"){
	$period_id = 6;
} else if($row['period']=="4.SET"){
	$period_id = 7;
} else if($row['period']=="4.STP"){
	$period_id = 8;
} else if($row['period']=="5.SET"){
	$period_id = 9;
} else if($row['period']=="5.STP"){
	$period_id = 10;
} else if($row['period']=="Bitti"){
	$period_id = 255;
}

$bir_period_skor_bol = explode(" - ",$row['bir_period_skor']);
$iki_period_skor_bol = explode(" - ",$row['iki_period_skor']);
$uc_period_skor_bol = explode(" - ",$row['uc_period_skor']);
$dort_period_skor_bol = explode(" - ",$row['dort_period_skor_bol']);
$bes_period_skor_bol = explode(" - ",$row['bes_period_skor_bol']);

$ev_1_ver = $bir_period_skor_bol[0];
$ev_2_ver = $iki_period_skor_bol[0];
$ev_3_ver = $uc_period_skor_bol[0];
$ev_4_ver = $dort_period_skor_bol[0];
$ev_5_ver = $bes_period_skor_bol[0];

$dep_1_ver = $bir_period_skor_bol[1];
$dep_2_ver = $iki_period_skor_bol[1];
$dep_3_ver = $uc_period_skor_bol[1];
$dep_4_ver = $dort_period_skor_bol[1];
$dep_5_ver = $bes_period_skor_bol[1];

$ev_oran_ver1 = "0.00";
$dep_oran_ver1 = "0.00";

$ev_oran_ver1 = $row['ev_oran'];
$dep_oran_ver1 = $row['konuk_oran'];

$ev_oran_ver = dusenoranbulcanli($ev_oran_ver1,"Kim Kazanır","masatenis");
$dep_oran_ver1 = dusenoranbulcanli($dep_oran_ver1,"Kim Kazanır","masatenis");

if($row['ev_oran']=='0.00' || $row['konuk_oran']=='0.00' || $row['ev_oran']=='' || $row['konuk_oran']==''){
	$oran_visible_ver = false;
} else {
	$oran_visible_ver = true;
}

$json3['66'] = array("tempid"=>"66","N2"=>"Kim Kazanır","N"=>"Kim Kazanır","id"=>"1","o"=>$oran_visible_ver);

$json3['66']['games'] = array(
["Id"=>"1","EGID"=>"1","Namexxx"=>"1","Name"=>"1","Name1X2"=>"","Visible"=>true,"Odds"=>$ev_oran_ver,"templateId"=>"66"],
["Id"=>"2","EGID"=>"1","Namexxx"=>"2","Name"=>"2","Name1X2"=>"","Visible"=>true,"Odds"=>$dep_oran_ver1,"templateId"=>"66"]
);

$ulke_ver = ulkeadikisalt($row["ulke"]);

$json[] = array(
"id"=>$row['eventid'],
"uri"=>"1",
"addicon"=>"",
"gseri"=>"0",
"tv"=>"",
"update_at"=>$row['songuncelleme'],
"update_atzone"=>$songuncelleme_tarih,
"h"=>$row['ev_takim'],
"a"=>$row['konuk_takim'],
"spid"=>"56",
"tkm"=>$takim_birlestir,
"uname"=>$ulke_ver,
"unamemobil"=>$ulke_ver,
"uid"=>$row['ulkeid'],
"lname"=>$row['lig_adi'],
"lid"=>$row['lig_id'],
"radarid"=>$row['betradar_id'],
"addtime"=>$row['songuncelleme'],
"directtime"=>"0",
"smid"=>"",
"tarih"=>$baslama_saat_tarihli,
"sht"=>$baslama_saat_saat,
"run"=>"true",
"tmac"=>$getir_bakem_saati,
"dk"=>$row['dakika'],
"sn"=>"",
"stps"=>"",
"sch"=>$row['ev_skor'],
"sca"=>$row['konuk_skor'],
"isch"=>$row['iy_ev'],
"isca"=>$row['iy_konuk'],
"redh"=>"0",
"reda"=>"0",
"pid"=>$period_id,
"srtat"=>time(),
"acsc"=>time(),
"periodsh"=>["1"=>$ev_1_ver,"2"=>$ev_2_ver,"3"=>$ev_3_ver,"4"=>$ev_4_ver,"5"=>$ev_5_ver,"6"=>"0","7"=>$row['ev_skor']],
"periodsa"=>["1"=>$dep_1_ver,"2"=>$dep_2_ver,"3"=>$dep_3_ver,"4"=>$dep_4_ver,"5"=>$dep_5_ver,"6"=>"0","7"=>$row['konuk_skor']],
"turn"=>"0",
"live"=>$json3
);

$toplam_mac++;

}

}

}

if($toplam_mac==0){
$json[] = array();
}

echo json_encode($json);

}