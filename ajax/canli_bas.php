<?PHP
include "../jobs/singledb.php";
/*$linkmysql = mysql_connect($dbhost,$dbuser,$dbpass);
mysql_select_db($dbname);
sed_sql_query("SET NAMES 'UTF8'");
sed_sql_query("SET character_set_connection = 'UTF8'");
sed_sql_query("SET character_set_client = 'UTF8'");
sed_sql_query("SET character_set_results = 'UTF8'");*/

function nf($str) { return number_format($str,2,".","."); }

function farray($query){ $sql =  sed_sql_fetcharray(sed_sql_query($query)); return $sql; }

function LiveTRHatalari($msg = 0){
$r = array("&","'");
$rp = array(" "," ");
return str_replace($r,$rp,$msg);
}

if($_GET['cmd'] == "FutbolSonuc"){
FutbolSonuc();
}

if($_GET['cmd'] == "BasketbolSonuc"){
BasketbolSonuc();
}

if($_GET['cmd'] == "TenisSonuc"){
TenisSonuc();
}

if($_GET['cmd'] == "FutbolListe"){
FutbolListe();
}

if($_GET['cmd'] == "BasketbolListe"){
BasketbolListe();
}

if($_GET['cmd'] == "TenisListe"){
TenisListe();
}

function curlfonksiyon($adres){
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$adres);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
return  curl_exec($ch);
curl_close($ch);
}

function FutbolSonuc(){

$sonucbilgigetir22 = curlfonksiyon("https://jackpotmatic.store/api/rulet_sonuclar.php?cmd=Rulet");
$jsonGet22 = json_decode($sonucbilgigetir22,1);
$all22 = $jsonGet22["veriler"];

foreach($all22 as $inner22){

$runid = $inner22['runid'];
$sonuc = $inner22['sonuc'];
$sonuczamani_ver = date("H:i",strtotime('+3 hours'));

$bilgile22 = farray("select id from kupon_ic_rulet where rulet_tip='1' and oddid='$runid' and sonuc='' and sonuczamani='' and kazanma='1'");
if($bilgile22['id'] > 0){
sed_sql_query("UPDATE kupon_ic_rulet SET sonuc = '".$sonuc."',sonuczamani = '".$sonuczamani_ver."' WHERE oddid='".$runid."' and rulet_tip='1'");
}

}

$sonucbilgigetir2 = curlfonksiyon("https://jackpotmatic.store/api/rulet_sonuclar.php?cmd=Rulet2");
$jsonGet2 = json_decode($sonucbilgigetir2,1);
$all2 = $jsonGet2["veriler"];

foreach($all2 as $inner2){

$runid2 = $inner2['runid'];
$sonuc2 = $inner2['sonuc'];
$sonuczamani_ver2 = date("H:i",strtotime('+3 hours'));

$bilgile2 = farray("select id from kupon_ic_rulet where rulet_tip='2' and oddid='$runid2' and sonuc='' and sonuczamani='' and kazanma='1'");
if($bilgile2['id'] > 0){
sed_sql_query("UPDATE kupon_ic_rulet SET sonuc = '".$sonuc2."',sonuczamani = '".$sonuczamani_ver2."' WHERE oddid='".$runid2."' and rulet_tip='2'");
}

}

}

function BasketbolSonuc(){

$js = curlfonksiyon("https://jackpotmatic.store/api/sonuclar_bulten.php?tip=sonucver_futbol");

$jsonGet = json_decode($js,1);
$all = $jsonGet["veriler"];

foreach($all as $inner){
$ertelendi = $inner['ertelendi'];

if($ertelendi == 0){
$eventid = $inner['eventid'];
$ev_takim = $inner['ev_takim'];
$dep_takim = $inner['konuk_takim'];

$ev_iy = $inner['iy_ev'];
$konuk_iy = $inner['iy_konuk'];
$ms_ev = $inner['ev_skor'];
$ms_dep = $inner['konuk_skor'];
$sari_ev = $inner['sari_ev'];
$sari_konuk = $inner['sari_konuk'];
$kirmizi_ev = $inner['kirmizi_ev'];
$kirmizi_konuk = $inner['kirmizi_konuk'];
$korner_ev = $inner['korner_ev'];
$korner_konuk = $inner['korner_konuk'];
$penalti_ev = $inner['penalti_ev'];
$penalti_konuk = $inner['penalti_konuk'];

$iy_birlestir = "".$ev_iy." - ".$konuk_iy."";
$ms_birlestir = "".$ms_ev." - ".$ms_dep."";
$sari_birlestir = "".$sari_ev." - ".$sari_konuk."";
$kirmizi_birlestir = "".$kirmizi_ev." - ".$kirmizi_konuk."";
$korner_birlestir = "".$korner_ev." - ".$korner_konuk."";
$penalti_birlestir = "".$penalti_ev." - ".$penalti_konuk."";

$farray = farray("SELECT id FROM kupon_ic WHERE mac_kodu='".$eventid."' AND spor_tip='futbol' AND iy='' AND ms=''");
if($farray['id'] > 0){
sed_sql_query("UPDATE kupon_ic SET iy = '".$iy_birlestir."',ms = '".$ms_birlestir."',sari_kart = '".$sari_birlestir."',kirmizi_kart = '".$kirmizi_birlestir."',korner = '".$korner_birlestir."',penalti = '".$penalti_birlestir."' WHERE mac_kodu='".$eventid."' AND spor_tip='futbol' AND iy='' AND ms=''");
}

} else if($ertelendi == 1){

sed_sql_query("update kupon_ic set kazanma='4',ertelendi='1' where mac_kodu='$eventid' and spor_tip='futbol' AND iy='' AND ms=''");

}

}

$js_basketbol = curlfonksiyon("https://jackpotmatic.store/api/sonuclar_bulten.php?tip=sonucver_basket");

$jsonGet_basketbol = json_decode($js_basketbol,1);
$all_basketbol = $jsonGet_basketbol["veriler"];

foreach($all_basketbol as $inner_basketbol){
$ertelendi_basketbol = $inner_basketbol['ertelendi'];

if($ertelendi_basketbol == 0){
$eventid_basketbol = $inner_basketbol['eventid'];
$ev_takim_basketbol = $inner_basketbol['ev_takim'];
$dep_takim_basketbol = $inner_basketbol['konuk_takim'];

$ev_iy_basketbol = $inner_basketbol['iy_ev'];
$konuk_iy_basketbol = $inner_basketbol['iy_konuk'];
$ms_ev_basketbol = $inner_basketbol['ev_skor'];
$ms_dep_basketbol = $inner_basketbol['konuk_skor'];

$ev_1_basketbol = $inner_basketbol['ev_1'];
$dep_1_basketbol = $inner_basketbol['dep_1'];
$ev_2_basketbol = $inner_basketbol['ev_2'];
$dep_2_basketbol = $inner_basketbol['dep_2'];
$ev_3_basketbol = $inner_basketbol['ev_3'];
$dep_3_basketbol = $inner_basketbol['dep_3'];
$ev_4_basketbol = $inner_basketbol['ev_4'];
$dep_4_basketbol = $inner_basketbol['dep_4'];
$ev_5_basketbol = $inner_basketbol['ev_5'];
$dep_5_basketbol = $inner_basketbol['dep_5'];

if($ev_5_basketbol > 0){ $ev_5_ver_basketbol = $ev_5_basketbol; } else { $ev_5_ver_basketbol = 0; }
if($dep_5_basketbol > 0){ $dep_5_ver_basketbol = $dep_5_basketbol; } else { $dep_5_ver_basketbol = 0; }

$iy_birlestir_basketbol = "".$ev_iy_basketbol." - ".$konuk_iy_basketbol."";
$ms_birlestir_basketbol = "".$ms_ev_basketbol." - ".$ms_dep_basketbol."";
$bir_birlestir_basketbol = "".$ev_1_basketbol." - ".$dep_1_basketbol."";
$iki_birlestir_basketbol = "".$ev_2_basketbol." - ".$dep_2_basketbol."";
$uc_birlestir_basketbol = "".$ev_3_basketbol." - ".$dep_3_basketbol."";
$dort_birlestir_basketbol = "".$ev_4_basketbol." - ".$dep_4_basketbol."";
$bes_birlestir_basketbol = "".$ev_5_ver_basketbol." - ".$dep_5_ver_basketbol."";

$farray_basketbol = farray("SELECT id FROM kupon_ic WHERE mac_kodu='".$eventid_basketbol."' AND ev_takim='".$ev_takim_basketbol."' AND konuk_takim='".$dep_takim_basketbol."' AND spor_tip='basketbol' AND iy='' AND ms=''");
if($farray_basketbol['id'] > 0){
sed_sql_query("UPDATE kupon_ic SET iy = '".$iy_birlestir_basketbol."',ms = '".$ms_birlestir_basketbol."',birperiod = '".$bir_birlestir_basketbol."',ikiperiod = '".$iki_birlestir_basketbol."',ucperiod = '".$uc_birlestir_basketbol."',dortperiod = '".$dort_birlestir_basketbol."',besperiod = '".$bes_birlestir_basketbol."' WHERE mac_kodu='".$eventid_basketbol."' AND ev_takim='".$ev_takim_basketbol."' AND konuk_takim='".$dep_takim_basketbol."' AND spor_tip='basketbol' AND iy='' AND ms=''");
}

} else if($ertelendi_basketbol == 1){

sed_sql_query("update kupon_ic set kazanma='4',ertelendi='1' where mac_kodu='$eventid_basketbol' and spor_tip='basketbol' AND iy='' AND ms=''");

}

}

$js_tenis = curlfonksiyon("https://jackpotmatic.store/api/sonuclar_bulten.php?tip=sonucver_tenis");

$jsonGet_tenis = json_decode($js_tenis,1);
$all_tenis = $jsonGet_tenis["veriler"];

foreach($all_tenis as $inner_tenis){
$ertelendi_tenis = $inner_tenis['ertelendi'];

if($ertelendi_tenis == 0){
$eventid_tenis = $inner_tenis['eventid'];
$ev_takim_tenis = $inner_tenis['ev_takim'];
$dep_takim_tenis = $inner_tenis['konuk_takim'];

$ms_ev_tenis = $inner_tenis['ev_skor'];
$ms_dep_tenis = $inner_tenis['konuk_skor'];

$ev_1_tenis = $inner_tenis['ev_1'];
$dep_1_tenis = $inner_tenis['dep_1'];
$ev_2_tenis = $inner_tenis['ev_2'];
$dep_2_tenis = $inner_tenis['dep_2'];
$ev_3_tenis = $inner_tenis['ev_3'];
$dep_3_tenis = $inner_tenis['dep_3'];
$ev_4_tenis = $inner_tenis['ev_4'];
$dep_4_tenis = $inner_tenis['dep_4'];
$ev_5_tenis = $inner_tenis['ev_5'];
$dep_5_tenis = $inner_tenis['dep_5'];

$ms_birlestir_tenis = "".$ms_ev_tenis." - ".$ms_dep_tenis."";
$bir_birlestir_tenis = "".$ev_1_tenis." - ".$dep_1_tenis."";
$iki_birlestir_tenis = "".$ev_2_tenis." - ".$dep_2_tenis."";
$uc_birlestir_tenis = "".$ev_3_tenis." - ".$dep_3_tenis."";
$dort_birlestir_tenis = "".$ev_4_tenis." - ".$dep_4_tenis."";
$bes_birlestir_tenis = "".$ev_5_tenis." - ".$dep_5_tenis."";

$farray_tenis = farray("SELECT id FROM kupon_ic WHERE mac_kodu='".$eventid_tenis."' AND ev_takim='".$ev_takim_tenis."' AND konuk_takim='".$dep_takim_tenis."' AND spor_tip='tenis' AND ms=''");
if($farray_tenis['id'] > 0){
sed_sql_query("UPDATE kupon_ic SET ms = '".$ms_birlestir_tenis."',birperiod = '".$bir_birlestir_tenis."',ikiperiod = '".$iki_birlestir_tenis."',ucperiod = '".$uc_birlestir_tenis."',dortperiod = '".$dort_birlestir_tenis."',besperiod = '".$bes_birlestir_tenis."' WHERE mac_kodu='".$eventid_tenis."' AND ev_takim='".$ev_takim_tenis."' AND konuk_takim='".$dep_takim_tenis."' AND spor_tip='tenis' AND ms=''");
}

} else if($ertelendi_tenis == 1){

sed_sql_query("update kupon_ic set kazanma='4',ertelendi='1' where mac_kodu='$eventid_tenis' and spor_tip='tenis' AND ms=''");

}

}



$js_voleybol = curlfonksiyon("https://jackpotmatic.store/api/sonuclar_bulten.php?tip=sonucver_voleybol");

$jsonGet_voleybol = json_decode($js_voleybol,1);
$all_voleybol = $jsonGet_voleybol["veriler"];

foreach($all_voleybol as $inner_voleybol){
$ertelendi_voleybol = $inner_voleybol['ertelendi'];

if($ertelendi_voleybol == 0){
$eventid_voleybol = $inner_voleybol['eventid'];
$ev_takim_voleybol = $inner_voleybol['ev_takim'];
$dep_takim_voleybol = $inner_voleybol['konuk_takim'];

$ms_ev_voleybol = $inner_voleybol['ev_skor'];
$ms_dep_voleybol = $inner_voleybol['konuk_skor'];

$ev_1_voleybol = $inner_voleybol['ev_1'];
$dep_1_voleybol = $inner_voleybol['dep_1'];
$ev_2_voleybol = $inner_voleybol['ev_2'];
$dep_2_voleybol = $inner_voleybol['dep_2'];
$ev_3_voleybol = $inner_voleybol['ev_3'];
$dep_3_voleybol = $inner_voleybol['dep_3'];
$ev_4_voleybol = $inner_voleybol['ev_4'];
$dep_4_voleybol = $inner_voleybol['dep_4'];
$ev_5_voleybol = $inner_voleybol['ev_5'];
$dep_5_voleybol = $inner_voleybol['dep_5'];

$ms_birlestir_voleybol = "".$ms_ev_voleybol." - ".$ms_dep_voleybol."";
$bir_birlestir_voleybol = "".$ev_1_voleybol." - ".$dep_1_voleybol."";
$iki_birlestir_voleybol = "".$ev_2_voleybol." - ".$dep_2_voleybol."";
$uc_birlestir_voleybol = "".$ev_3_voleybol." - ".$dep_3_voleybol."";
$dort_birlestir_voleybol = "".$ev_4_voleybol." - ".$dep_4_voleybol."";
$bes_birlestir_voleybol = "".$ev_5_voleybol." - ".$dep_5_voleybol."";

$farray_voleybol = farray("SELECT id FROM kupon_ic WHERE mac_kodu='".$eventid_voleybol."' AND ev_takim='".$ev_takim_voleybol."' AND konuk_takim='".$dep_takim_voleybol."' AND spor_tip='voleybol' AND ms=''");
if($farray_voleybol['id'] > 0){
sed_sql_query("UPDATE kupon_ic SET ms = '".$ms_birlestir_voleybol."',birperiod = '".$bir_birlestir_voleybol."',ikiperiod = '".$iki_birlestir_voleybol."',ucperiod = '".$uc_birlestir_voleybol."',dortperiod = '".$dort_birlestir_voleybol."',besperiod = '".$bes_birlestir_voleybol."' WHERE mac_kodu='".$eventid_voleybol."' AND ev_takim='".$ev_takim_voleybol."' AND konuk_takim='".$dep_takim_voleybol."' AND spor_tip='voleybol' AND ms=''");
}

} else if($ertelendi_voleybol == 1){

sed_sql_query("update kupon_ic set kazanma='4',ertelendi='1' where mac_kodu='$eventid_voleybol' and spor_tip='voleybol' AND ms=''");

}

}

$js_buzhokeyi = curlfonksiyon("https://jackpotmatic.store/api/sonuclar_bulten.php?tip=sonucver_buzhokeyi");

$jsonGet_buzhokeyi = json_decode($js_buzhokeyi,1);
$all_buzhokeyi = $jsonGet_buzhokeyi["veriler"];

foreach($all_buzhokeyi as $inner_buzhokeyi){
$ertelendi_buzhokeyi = $inner_buzhokeyi['ertelendi'];

if($ertelendi_buzhokeyi == 0){
$eventid_buzhokeyi = $inner_buzhokeyi['eventid'];
$ev_takim_buzhokeyi = $inner_buzhokeyi['ev_takim'];
$dep_takim_buzhokeyi = $inner_buzhokeyi['konuk_takim'];

$ms_ev_buzhokeyi = $inner_buzhokeyi['ev_skor'];
$ms_dep_buzhokeyi = $inner_buzhokeyi['konuk_skor'];

$ev_1_buzhokeyi = $inner_buzhokeyi['ev_1'];
$dep_1_buzhokeyi = $inner_buzhokeyi['dep_1'];
$ev_2_buzhokeyi = $inner_buzhokeyi['ev_2'];
$dep_2_buzhokeyi = $inner_buzhokeyi['dep_2'];
$ev_3_buzhokeyi = $inner_buzhokeyi['ev_3'];
$dep_3_buzhokeyi = $inner_buzhokeyi['dep_3'];
$ev_4_buzhokeyi = $inner_buzhokeyi['ev_4'];
$dep_4_buzhokeyi = $inner_buzhokeyi['dep_4'];

$ms_birlestir_buzhokeyi = "".$ms_ev_buzhokeyi." - ".$ms_dep_buzhokeyi."";
$bir_birlestir_buzhokeyi = "".$ev_1_buzhokeyi." - ".$dep_1_buzhokeyi."";
$iki_birlestir_buzhokeyi = "".$ev_2_buzhokeyi." - ".$dep_2_buzhokeyi."";
$uc_birlestir_buzhokeyi = "".$ev_3_buzhokeyi." - ".$dep_3_buzhokeyi."";
$dort_birlestir_buzhokeyi = "".$ev_4_buzhokeyi." - ".$dep_4_buzhokeyi."";

$farray_buzhokeyi = farray("SELECT id FROM kupon_ic WHERE mac_kodu='".$eventid_buzhokeyi."' AND ev_takim='".$ev_takim_buzhokeyi."' AND konuk_takim='".$dep_takim_buzhokeyi."' AND spor_tip='buzhokeyi' AND ms=''");
if($farray_buzhokeyi['id'] > 0){
sed_sql_query("UPDATE kupon_ic SET ms = '".$ms_birlestir_buzhokeyi."',birperiod = '".$bir_birlestir_buzhokeyi."',ikiperiod = '".$iki_birlestir_buzhokeyi."',ucperiod = '".$uc_birlestir_buzhokeyi."',dortperiod = '".$dort_birlestir_buzhokeyi."' WHERE mac_kodu='".$eventid_buzhokeyi."' AND ev_takim='".$ev_takim_buzhokeyi."' AND konuk_takim='".$dep_takim_buzhokeyi."' AND spor_tip='buzhokeyi' AND ms=''");
}

} else if($ertelendi_buzhokeyi == 1){

sed_sql_query("update kupon_ic set kazanma='4',ertelendi='1' where mac_kodu='$eventid_buzhokeyi' and spor_tip='buzhokeyi' AND ms=''");

}

}

$js_masatenisi = curlfonksiyon("https://jackpotmatic.store/api/sonuclar_bulten.php?tip=sonucver_masatenisi");

$jsonGet_masatenisi = json_decode($js_masatenisi,1);
$all_masatenisi = $jsonGet_masatenisi["veriler"];

foreach($all_masatenisi as $inner_masatenisi){
$ertelendi_masatenisi = $inner_masatenisi['ertelendi'];

if($ertelendi_masatenisi == 0){
$eventid_masatenisi = $inner_masatenisi['eventid'];
$ev_takim_masatenisi = $inner_masatenisi['ev_takim'];
$dep_takim_masatenisi = $inner_masatenisi['konuk_takim'];

$ms_ev_masatenisi = $inner_masatenisi['ev_skor'];
$ms_dep_masatenisi = $inner_masatenisi['konuk_skor'];

$ev_1_masatenisi = $inner_masatenisi['ev_1'];
$dep_1_masatenisi = $inner_masatenisi['dep_1'];
$ev_2_masatenisi = $inner_masatenisi['ev_2'];
$dep_2_masatenisi = $inner_masatenisi['dep_2'];
$ev_3_masatenisi = $inner_masatenisi['ev_3'];
$dep_3_masatenisi = $inner_masatenisi['dep_3'];
$ev_4_masatenisi = $inner_masatenisi['ev_4'];
$dep_4_masatenisi = $inner_masatenisi['dep_4'];
$ev_5_masatenisi = $inner_masatenisi['ev_5'];
$dep_5_masatenisi = $inner_masatenisi['dep_5'];

$ms_birlestir_masatenisi = "".$ms_ev_masatenisi." - ".$ms_dep_masatenisi."";
$bir_birlestir_masatenisi = "".$ev_1_masatenisi." - ".$dep_1_masatenisi."";
$iki_birlestir_masatenisi = "".$ev_2_masatenisi." - ".$dep_2_masatenisi."";
$uc_birlestir_masatenisi = "".$ev_3_masatenisi." - ".$dep_3_masatenisi."";
$dort_birlestir_masatenisi = "".$ev_4_masatenisi." - ".$dep_4_masatenisi."";
$bes_birlestir_masatenisi = "".$ev_5_masatenisi." - ".$dep_5_masatenisi."";

$farray_masatenisi = farray("SELECT id FROM kupon_ic WHERE mac_kodu='".$eventid_masatenisi."' AND ev_takim='".$ev_takim_masatenisi."' AND konuk_takim='".$dep_takim_masatenisi."' AND spor_tip='masatenisi' AND ms=''");
if($farray_masatenisi['id'] > 0){
sed_sql_query("UPDATE kupon_ic SET ms = '".$ms_birlestir_masatenisi."',birperiod = '".$bir_birlestir_masatenisi."',ikiperiod = '".$iki_birlestir_masatenisi."',ucperiod = '".$uc_birlestir_masatenisi."',dortperiod = '".$dort_birlestir_masatenisi."',besperiod = '".$bes_birlestir_masatenisi."' WHERE mac_kodu='".$eventid_masatenisi."' AND ev_takim='".$ev_takim_masatenisi."' AND konuk_takim='".$dep_takim_masatenisi."' AND spor_tip='masatenisi' AND ms=''");
}

} else if($ertelendi_masatenisi == 1){

sed_sql_query("update kupon_ic set kazanma='4',ertelendi='1' where mac_kodu='$eventid_masatenisi' and spor_tip='masatenisi' AND ms=''");

}

}

$js_rugby = curlfonksiyon("https://jackpotmatic.store/api/sonuclar_bulten.php?tip=sonucver_rugby");

$jsonGet_rugby = json_decode($js_rugby,1);
$all_rugby = $jsonGet_rugby["veriler"];

foreach($all_rugby as $inner_rugby){
$ertelendi_rugby = $inner_rugby['ertelendi'];

if($ertelendi_rugby == 0){
$eventid_rugby = $inner_rugby['eventid'];
$ev_takim_rugby = $inner_rugby['ev_takim'];
$dep_takim_rugby = $inner_rugby['konuk_takim'];

$ms_ev_rugby = $inner_rugby['ev_skor'];
$ms_dep_rugby = $inner_rugby['konuk_skor'];

$ev_1_rugby = $inner_rugby['ev_1'];
$dep_1_rugby = $inner_rugby['dep_1'];
$ev_2_rugby = $inner_rugby['ev_2'];
$dep_2_rugby = $inner_rugby['dep_2'];
$ev_3_rugby = $inner_rugby['ev_3'];
$dep_3_rugby = $inner_rugby['dep_3'];

$ms_birlestir_rugby = "".$ms_ev_rugby." - ".$ms_dep_rugby."";
$bir_birlestir_rugby = "".$ev_1_rugby." - ".$dep_1_rugby."";
$iki_birlestir_rugby = "".$ev_2_rugby." - ".$dep_2_rugby."";
$uc_birlestir_rugby = "".$ev_3_rugby." - ".$dep_3_rugby."";

$farray_rugby = farray("SELECT id FROM kupon_ic WHERE mac_kodu='".$eventid_rugby."' AND ev_takim='".$ev_takim_rugby."' AND konuk_takim='".$dep_takim_rugby."' AND spor_tip='rugby' AND ms=''");
if($farray_rugby['id'] > 0){
sed_sql_query("UPDATE kupon_ic SET ms = '".$ms_birlestir_rugby."',birperiod = '".$bir_birlestir_rugby."',ikiperiod = '".$iki_birlestir_rugby."',ucperiod = '".$uc_birlestir_rugby."' WHERE mac_kodu='".$eventid_rugby."' AND ev_takim='".$ev_takim_rugby."' AND konuk_takim='".$dep_takim_rugby."' AND spor_tip='rugby' AND ms=''");
}

} else if($ertelendi_rugby == 1){

sed_sql_query("update kupon_ic set kazanma='4',ertelendi='1' where mac_kodu='$eventid_rugby' and spor_tip='rugby' AND ms=''");

}

}

}

function TenisSonuc(){

$js_futbol = curlfonksiyon("http://jackpotmatic.store/api/sonuclar_canli.php?tip=sonucver_futbol");

$jsonGet_futbol = json_decode($js_futbol,1);
$all_futbol = $jsonGet_futbol["veriler"];

foreach($all_futbol as $inner_futbol){
$ertelendi_futbol = $inner_futbol['ertelendi'];

if($ertelendi_futbol == 0){
$eventid_futbol = $inner_futbol['eventid'];
$devre_futbol = $inner_futbol['devre'];
$baslamasaat_futbol = $inner_futbol['baslamasaat'];
$ev_takim_futbol = $inner_futbol['ev_takim'];
$dep_takim_futbol = $inner_futbol['konuk_takim'];

$ev_iy_futbol = $inner_futbol['iy_ev'];
$konuk_iy_futbol = $inner_futbol['iy_konuk'];
$ms_ev_futbol = $inner_futbol['ev_skor'];
$ms_dep_futbol = $inner_futbol['konuk_skor'];
$sari_ev_futbol = $inner_futbol['sari_ev'];
$sari_konuk_futbol = $inner_futbol['sari_konuk'];
$kirmizi_ev_futbol = $inner_futbol['kirmizi_ev'];
$kirmizi_konuk_futbol = $inner_futbol['kirmizi_konuk'];
$korner_ev_futbol = $inner_futbol['korner_ev'];
$korner_konuk_futbol = $inner_futbol['korner_konuk'];
$ofsayt_ev_futbol = $inner_futbol['ofsayt_ev'];
$ofsayt_konuk_futbol = $inner_futbol['ofsayt_konuk'];
$penalti_ev_futbol = $inner_futbol['penalti_ev'];
$penalti_konuk_futbol = $inner_futbol['penalti_konuk'];

$gol_1_futbol = $inner_futbol['gol_1'];
$gol_2_futbol = $inner_futbol['gol_2'];
$gol_3_futbol = $inner_futbol['gol_3'];
$gol_4_futbol = $inner_futbol['gol_4'];
$gol_5_futbol = $inner_futbol['gol_5'];
$gol_6_futbol = $inner_futbol['gol_6'];

$gol_1_dakika_futbol = $inner_futbol['gol_1_dakika'];
$gol_2_dakika_futbol = $inner_futbol['gol_2_dakika'];
$gol_3_dakika_futbol = $inner_futbol['gol_3_dakika'];
$gol_4_dakika_futbol = $inner_futbol['gol_4_dakika'];
$gol_5_dakika_futbol = $inner_futbol['gol_5_dakika'];
$gol_6_dakika_futbol = $inner_futbol['gol_6_dakika'];

$bugun_tarihi_bul_futbol = date("d.m.Y");

$farray_futbol = farray("SELECT id FROM canli_maclar WHERE eventid='".$eventid_futbol."' AND devre!='Bitti'");
if($farray_futbol['id'] > 0){
sed_sql_query("UPDATE canli_maclar SET ev_skor = '".$ms_ev_futbol."',konuk_skor = '".$ms_dep_futbol."',iy_ev = '".$ev_iy_futbol."',iy_konuk = '".$konuk_iy_futbol."',sari_ev = '".$sari_ev_futbol."',sari_konuk = '".$sari_konuk_futbol."',kirmizi_ev = '".$kirmizi_ev_futbol."',kirmizi_konuk = '".$kirmizi_konuk_futbol."',korner_ev = '".$korner_ev_futbol."',korner_konuk = '".$korner_konuk_futbol."',ofsayt_ev = '".$ofsayt_ev_futbol."',ofsayt_konuk = '".$ofsayt_konuk_futbol."',penalti_ev = '".$penalti_ev_futbol."',penalti_konuk = '".$penalti_konuk_futbol."',devre = 'Bitti',dakika = '91' WHERE eventid='".$eventid_futbol."' AND devre!='Bitti'");

$gol_kontrol_1_futbol = farray("SELECT id FROM canli_gol_list WHERE eventid='".$eventid_futbol."' AND mac_db_id='".$farray_futbol['id']."' AND golsayi='1'");
if($gol_1_futbol>0 && $gol_kontrol_1_futbol['id']<1){
sed_sql_query("INSERT INTO canli_gol_list SET eventid='".$eventid_futbol."',dakika='".$gol_1_dakika_futbol."',golsayi='1',atantakim='".$gol_1_futbol."',mac_db_id='".$farray_futbol['id']."',y_ev_skor='".$ms_ev_futbol."',y_konuk_skor='".$ms_dep_futbol."',musabaka='".$ev_takim_futbol." - ".$dep_takim_futbol."',zaman='".$bugun_tarihi_bul_futbol."',devre='Bitti'");
}
$gol_kontrol_2_futbol = farray("SELECT id FROM canli_gol_list WHERE eventid='".$eventid_futbol."' AND mac_db_id='".$farray_futbol['id']."' AND golsayi='2'");
if($gol_2_futbol>0 && $gol_kontrol_2_futbol['id']<1){
sed_sql_query("INSERT INTO canli_gol_list SET eventid='".$eventid_futbol."',dakika='".$gol_2_dakika_futbol."',golsayi='2',atantakim='".$gol_2_futbol."',mac_db_id='".$farray_futbol['id']."',y_ev_skor='".$ms_ev_futbol."',y_konuk_skor='".$ms_dep_futbol."',musabaka='".$ev_takim_futbol." - ".$dep_takim_futbol."',zaman='".$bugun_tarihi_bul_futbol."',devre='Bitti'");
}
$gol_kontrol_3_futbol = farray("SELECT id FROM canli_gol_list WHERE eventid='".$eventid_futbol."' AND mac_db_id='".$farray_futbol['id']."' AND golsayi='3'");
if($gol_3_futbol>0 && $gol_kontrol_3_futbol['id']<1){
sed_sql_query("INSERT INTO canli_gol_list SET eventid='".$eventid_futbol."',dakika='".$gol_3_dakika_futbol."',golsayi='3',atantakim='".$gol_3_futbol."',mac_db_id='".$farray_futbol['id']."',y_ev_skor='".$ms_ev_futbol."',y_konuk_skor='".$ms_dep_futbol."',musabaka='".$ev_takim_futbol." - ".$dep_takim_futbol."',zaman='".$bugun_tarihi_bul_futbol."',devre='Bitti'");
}
$gol_kontrol_4_futbol = farray("SELECT id FROM canli_gol_list WHERE eventid='".$eventid_futbol."' AND mac_db_id='".$farray_futbol['id']."' AND golsayi='4'");
if($gol_4_futbol>0 && $gol_kontrol_4_futbol['id']<1){
sed_sql_query("INSERT INTO canli_gol_list SET eventid='".$eventid_futbol."',dakika='".$gol_4_dakika_futbol."',golsayi='4',atantakim='".$gol_4_futbol."',mac_db_id='".$farray_futbol['id']."',y_ev_skor='".$ms_ev_futbol."',y_konuk_skor='".$ms_dep_futbol."',musabaka='".$ev_takim_futbol." - ".$dep_takim_futbol."',zaman='".$bugun_tarihi_bul_futbol."',devre='Bitti'");
}
$gol_kontrol_5_futbol = farray("SELECT id FROM canli_gol_list WHERE eventid='".$eventid_futbol."' AND mac_db_id='".$farray_futbol['id']."' AND golsayi='5'");
if($gol_5_futbol>0 && $gol_kontrol_5_futbol['id']<1){
sed_sql_query("INSERT INTO canli_gol_list SET eventid='".$eventid_futbol."',dakika='".$gol_5_dakika_futbol."',golsayi='5',atantakim='".$gol_5_futbol."',mac_db_id='".$farray_futbol['id']."',y_ev_skor='".$ms_ev_futbol."',y_konuk_skor='".$ms_dep_futbol."',musabaka='".$ev_takim_futbol." - ".$dep_takim_futbol."',zaman='".$bugun_tarihi_bul_futbol."',devre='Bitti'");
}
$gol_kontrol_6_futbol = farray("SELECT id FROM canli_gol_list WHERE eventid='".$eventid_futbol."' AND mac_db_id='".$farray_futbol['id']."' AND golsayi='6'");
if($gol_6_futbol>0 && $gol_kontrol_6_futbol['id']<1){
sed_sql_query("INSERT INTO canli_gol_list SET eventid='".$eventid_futbol."',dakika='".$gol_6_dakika_futbol."',golsayi='6',atantakim='".$gol_6_futbol."',mac_db_id='".$farray_futbol['id']."',y_ev_skor='".$ms_ev_futbol."',y_konuk_skor='".$ms_dep_futbol."',musabaka='".$ev_takim_futbol." - ".$dep_takim_futbol."',zaman='".$bugun_tarihi_bul_futbol."',devre='Bitti'");
}

}

} else if($ertelendi_futbol == 1){

sed_sql_query("update kupon_ic set kazanma='4',ertelendi='1' where mac_kodu='$eventid_futbol' and spor_tip='canli' AND iy='' AND ms=''");

}

}

$js_basket = curlfonksiyon("http://jackpotmatic.store/api/sonuclar_canli.php?tip=sonucver_basket");

$jsonGet_basket = json_decode($js_basket,1);
$all_basket = $jsonGet_basket["veriler"];

foreach($all_basket as $inner_basket){
$ertelendi_basket = $inner_basket['ertelendi'];

if($ertelendi_basket == 0){
$eventid_basket = $inner_basket['eventid'];
$baslamasaat_basket = $inner_basket['baslamasaat'];
$ev_takim_basket = $inner_basket['ev_takim'];
$dep_takim_basket = $inner_basket['konuk_takim'];

$ev_iy_basket = $inner_basket['iy_ev'];
$konuk_iy_basket = $inner_basket['iy_konuk'];
$ms_ev_basket = $inner_basket['ev_skor'];
$ms_dep_basket = $inner_basket['konuk_skor'];

$ev_1_basket = $inner_basket['ev_1'];
$dep_1_basket = $inner_basket['dep_1'];
$ev_2_basket = $inner_basket['ev_2'];
$dep_2_basket = $inner_basket['dep_2'];
$ev_3_basket = $inner_basket['ev_3'];
$dep_3_basket = $inner_basket['dep_3'];
$ev_4_basket = $inner_basket['ev_4'];
$dep_4_basket = $inner_basket['dep_4'];
$ev_5_basket = $inner_basket['ev_5'];
$dep_5_basket = $inner_basket['dep_5'];

if($ev_5_basket > 0){ $ev_5_ver_basket = $ev_5_basket; } else { $ev_5_ver_basket = 0; }
if($dep_5_basket > 0){ $dep_5_ver_basket = $dep_5_basket; } else { $dep_5_ver_basket = 0; }

$bir_birlestir_basket = "".$ev_1_basket." - ".$dep_1_basket."";
$iki_birlestir_basket = "".$ev_2_basket." - ".$dep_2_basket."";
$uc_birlestir_basket = "".$ev_3_basket." - ".$dep_3_basket."";
$dort_birlestir_basket = "".$ev_4_basket." - ".$dep_4_basket."";
$bes_birlestir_basket = "".$ev_5_ver_basket." - ".$dep_5_ver_basket."";

$farray_basket = farray("SELECT id FROM basketbol_canli_maclar WHERE eventid='".$eventid_basket."' AND ev_takim='".$ev_takim_basket."' AND konuk_takim='".$dep_takim_basket."' AND period!='Bitti'");
if($farray_basket['id'] > 0){
sed_sql_query("UPDATE basketbol_canli_maclar SET ev_skor = '".$ms_ev_basket."',konuk_skor = '".$ms_dep_basket."',iy_ev = '".$ev_iy_basket."',iy_konuk = '".$konuk_iy_basket."',bir_period_skor = '".$bir_birlestir_basket."',iki_period_skor = '".$iki_birlestir_basket."',uc_period_skor = '".$uc_birlestir_basket."',dort_period_skor = '".$dort_birlestir_basket."',bes_period_skor = '".$bes_birlestir_basket."',period = 'Bitti' WHERE eventid='".$eventid_basket."' AND ev_takim='".$ev_takim_basket."' AND konuk_takim='".$dep_takim_basket."' AND period!='Bitti'");

}

} else if($ertelendi_basket == 1){

sed_sql_query("update kupon_ic set kazanma='4',ertelendi='1' where mac_kodu='$eventid_basket' and spor_tip='canlib' AND iy='' AND ms=''");

}

}

$js_tenis = curlfonksiyon("http://jackpotmatic.store/api/sonuclar_canli.php?tip=sonucver_tenis");

$jsonGet_tenis = json_decode($js_tenis,1);
$all_tenis = $jsonGet_tenis["veriler"];

foreach($all_tenis as $inner_tenis){
$ertelendi_tenis = $inner_tenis['ertelendi'];

if($ertelendi_tenis == 0){
$eventid_tenis = $inner_tenis['eventid'];
$baslamasaat_tenis = $inner_tenis['baslamasaat'];
$ev_takim_tenis = $inner_tenis['ev_takim'];
$dep_takim_tenis = $inner_tenis['konuk_takim'];

$ms_ev_tenis = $inner_tenis['ev_skor'];
$ms_dep_tenis = $inner_tenis['konuk_skor'];

$ev_1_tenis = $inner_tenis['ev_1'];
$dep_1_tenis = $inner_tenis['dep_1'];
$ev_2_tenis = $inner_tenis['ev_2'];
$dep_2_tenis = $inner_tenis['dep_2'];
$ev_3_tenis = $inner_tenis['ev_3'];
$dep_3_tenis = $inner_tenis['dep_3'];
$ev_4_tenis = $inner_tenis['ev_4'];
$dep_4_tenis = $inner_tenis['dep_4'];
$ev_5_tenis = $inner_tenis['ev_5'];
$dep_5_tenis = $inner_tenis['dep_5'];

$bir_birlestir_tenis = "".$ev_1_tenis." - ".$dep_1_tenis."";
$iki_birlestir_tenis = "".$ev_2_tenis." - ".$dep_2_tenis."";
$uc_birlestir_tenis = "".$ev_3_tenis." - ".$dep_3_tenis."";
$dort_birlestir_tenis = "".$ev_4_tenis." - ".$dep_4_tenis."";
$bes_birlestir_tenis = "".$ev_5_tenis." - ".$dep_5_tenis."";

$farray_tenis = farray("SELECT id FROM canli_maclar_tenis WHERE eventid='".$eventid_tenis."' AND ev_takim='".$ev_takim_tenis."' AND konuk_takim='".$dep_takim_tenis."' AND period!='Bitti'");
if($farray_tenis['id'] > 0 && $ev_1_tenis > 0 && $dep_1_tenis > 0 && $ev_2_tenis > 0 && $dep_2_tenis > 0){
sed_sql_query("UPDATE canli_maclar_tenis SET ev_skor = '".$ms_ev_tenis."',konuk_skor = '".$ms_dep_tenis."',bir_period_skor = '".$bir_birlestir_tenis."',iki_period_skor = '".$iki_birlestir_tenis."',uc_period_skor = '".$uc_birlestir_tenis."',dort_period_skor = '".$dort_birlestir_tenis."',bes_period_skor = '".$bes_birlestir_tenis."',period = 'Bitti' WHERE eventid='".$eventid_tenis."' AND ev_takim='".$ev_takim_tenis."' AND konuk_takim='".$dep_takim_tenis."' AND period!='Bitti'");

}

} else if($ertelendi_tenis == 1){

sed_sql_query("update kupon_ic set kazanma='4',ertelendi='1' where mac_kodu='$eventid_tenis' and spor_tip='canlit' AND ms=''");

}

}

$js_v = curlfonksiyon("http://jackpotmatic.store/api/sonuclar_canli.php?tip=sonucver_voleybol");

$jsonGet_v = json_decode($js_v,1);
$all_v = $jsonGet_v["veriler"];

foreach($all_v as $inner_v){
$ertelendi_v = $inner_v['ertelendi'];

if($ertelendi_v == 0){
$eventid_v = $inner_v['eventid'];
$baslamasaat_v = $inner_v['baslamasaat'];
$ev_takim_v = $inner_v['ev_takim'];
$dep_takim_v = $inner_v['konuk_takim'];

$ms_ev_v = $inner_v['ev_skor'];
$ms_dep_v = $inner_v['konuk_skor'];

$ev_1_v = $inner_v['ev_1'];
$dep_1_v = $inner_v['dep_1'];
$ev_2_v = $inner_v['ev_2'];
$dep_2_v = $inner_v['dep_2'];
$ev_3_v = $inner_v['ev_3'];
$dep_3_v = $inner_v['dep_3'];
$ev_4_v = $inner_v['ev_4'];
$dep_4_v = $inner_v['dep_4'];
$ev_5_v = $inner_v['ev_5'];
$dep_5_v = $inner_v['dep_5'];

if($ev_1_v > 0){ $ev_1_ver_v = $ev_1_v; } else { $ev_1_ver_v = 0; }
if($dep_1_v > 0){ $dep_1_ver_v = $dep_1_v; } else { $dep_1_ver_v = 0; }

if($ev_2_v > 0){ $ev_2_ver_v = $ev_2_v; } else { $ev_2_ver_v = 0; }
if($dep_2_v > 0){ $dep_2_ver_v = $dep_2_v; } else { $dep_2_ver_v = 0; }

if($ev_3_v > 0){ $ev_3_ver_v = $ev_3_v; } else { $ev_3_ver_v = 0; }
if($dep_3_v > 0){ $dep_3_ver_v = $dep_3_v; } else { $dep_3_ver_v = 0; }

if($ev_4_v > 0){ $ev_4_ver_v = $ev_4_v; } else { $ev_4_ver_v = 0; }
if($dep_4_v > 0){ $dep_4_ver_v = $dep_4_v; } else { $dep_4_ver_v = 0; }

if($ev_5_v > 0){ $ev_5_ver_v = $ev_5_v; } else { $ev_5_ver_v = 0; }
if($dep_5_v > 0){ $dep_5_ver_v = $dep_5_v; } else { $dep_5_ver_v = 0; }

$bir_birlestir_v = "".$ev_1_ver_v." - ".$dep_1_ver_v."";
$iki_birlestir_v = "".$ev_2_ver_v." - ".$dep_2_ver_v."";
$uc_birlestir_v = "".$ev_3_ver_v." - ".$dep_3_ver_v."";
$dort_birlestir_v = "".$ev_4_ver_v." - ".$dep_4_ver_v."";
$bes_birlestir_v = "".$ev_5_ver_v." - ".$dep_5_ver_v."";

$farray_v = farray("SELECT id FROM canli_maclar_voleybol WHERE eventid='".$eventid_v."' AND ev_takim='".$ev_takim_v."' AND konuk_takim='".$dep_takim_v."' AND period!='Bitti'");
if($farray_v['id'] > 0){
sed_sql_query("UPDATE canli_maclar_voleybol SET ev_skor = '".$ms_ev_v."',konuk_skor = '".$ms_dep_v."',bir_period_skor = '".$bir_birlestir_v."',iki_period_skor = '".$iki_birlestir_v."',uc_period_skor = '".$uc_birlestir_v."',dort_period_skor = '".$dort_birlestir_v."',bes_period_skor = '".$bes_birlestir_v."',period = 'Bitti' WHERE eventid='".$eventid_v."' AND ev_takim='".$ev_takim_v."' AND konuk_takim='".$dep_takim_v."' AND period!='Bitti'");

}

} else if($ertelendi_v == 1){

sed_sql_query("update kupon_ic set kazanma='4',ertelendi='1' where mac_kodu='$eventid_v' and spor_tip='canliv' AND ms=''");

}

}

$js_buz = curlfonksiyon("http://jackpotmatic.store/api/sonuclar_canli.php?tip=sonucver_buzhokeyi");

$jsonGet_buz = json_decode($js_buz,1);
$all_buz = $jsonGet_buz["veriler"];

foreach($all_buz as $inner_buz){
$ertelendi_buz = $inner_buz['ertelendi'];

if($ertelendi_buz == 0){
$eventid_buz = $inner_buz['eventid'];
$baslamasaat_buz = $inner_buz['baslamasaat'];
$ev_takim_buz = $inner_buz['ev_takim'];
$dep_takim_buz = $inner_buz['konuk_takim'];

$ms_ev_buz = $inner_buz['ev_skor'];
$ms_dep_buz = $inner_buz['konuk_skor'];

$ev_1_buz = $inner_buz['ev_1'];
$dep_1_buz = $inner_buz['dep_1'];
$ev_2_buz = $inner_buz['ev_2'];
$dep_2_buz = $inner_buz['dep_2'];
$ev_3_buz = $inner_buz['ev_3'];
$dep_3_buz = $inner_buz['dep_3'];
$ev_4_buz = $inner_buz['ev_4'];
$dep_4_buz = $inner_buz['dep_4'];
$ev_5_buz = $inner_buz['ev_5'];
$dep_5_buz = $inner_buz['dep_5'];

if($ev_1_buz > 0){ $ev_1_ver_buz = $ev_1_buz; } else { $ev_1_ver_buz = 0; }
if($dep_1_buz > 0){ $dep_1_ver_buz = $dep_1_buz; } else { $dep_1_ver_buz = 0; }

if($ev_2_buz > 0){ $ev_2_ver_buz = $ev_2_buz; } else { $ev_2_ver_buz = 0; }
if($dep_2_buz > 0){ $dep_2_ver_buz = $dep_2_buz; } else { $dep_2_ver_buz = 0; }

if($ev_3_buz > 0){ $ev_3_ver_buz = $ev_3_buz; } else { $ev_3_ver_buz = 0; }
if($dep_3_buz > 0){ $dep_3_ver_buz = $dep_3_buz; } else { $dep_3_ver_buz = 0; }

$bir_birlestir_buz = "".$ev_1_ver_buz." - ".$dep_1_ver_buz."";
$iki_birlestir_buz = "".$ev_2_ver_buz." - ".$dep_2_ver_buz."";
$uc_birlestir_buz = "".$ev_3_ver_buz." - ".$dep_3_ver_buz."";

$farray_buz = farray("SELECT id FROM canli_maclar_buzhokeyi WHERE eventid='".$eventid_buz."' AND ev_takim='".$ev_takim_buz."' AND konuk_takim='".$dep_takim_buz."' AND period!='Bitti'");
if($farray_buz['id'] > 0){
sed_sql_query("UPDATE canli_maclar_buzhokeyi SET ev_skor = '".$ms_ev_buz."',konuk_skor = '".$ms_dep_buz."',bir_period_skor = '".$bir_birlestir_buz."',iki_period_skor = '".$iki_birlestir_buz."',uc_period_skor = '".$uc_birlestir_buz."',period = 'Bitti' WHERE eventid='".$eventid_buz."' AND ev_takim='".$ev_takim_buz."' AND konuk_takim='".$dep_takim_buz."' AND period!='Bitti'");

}

} else if($ertelendi_buz == 1){

sed_sql_query("update kupon_ic set kazanma='4',ertelendi='1' where mac_kodu='$eventid_buz' and spor_tip='canlibuz' AND ms=''");

}

}

$js_mt = curlfonksiyon("http://jackpotmatic.store/api/sonuclar_canli.php?tip=sonucver_masatenisi");

$jsonGet_mt = json_decode($js_mt,1);
$all_mt = $jsonGet_mt["veriler"];

foreach($all_mt as $inner_mt){
$ertelendi_mt = $inner_mt['ertelendi'];

if($ertelendi_mt == 0){
$eventid_mt = $inner_mt['eventid'];
$baslamasaat_mt = $inner_mt['baslamasaat'];
$ev_takim_mt = $inner_mt['ev_takim'];
$dep_takim_mt = $inner_mt['konuk_takim'];

$ms_ev_mt = $inner_mt['ev_skor'];
$ms_dep_mt = $inner_mt['konuk_skor'];

$ev_1_mt = $inner_mt['ev_1'];
$dep_1_mt = $inner_mt['dep_1'];
$ev_2_mt = $inner_mt['ev_2'];
$dep_2_mt = $inner_mt['dep_2'];
$ev_3_mt = $inner_mt['ev_3'];
$dep_3_mt = $inner_mt['dep_3'];
$ev_4_mt = $inner_mt['ev_4'];
$dep_4_mt = $inner_mt['dep_4'];
$ev_5_mt = $inner_mt['ev_5'];
$dep_5_mt = $inner_mt['dep_5'];

if($ev_1_mt > 0){ $ev_1_ver_mt = $ev_1_mt; } else { $ev_1_ver_mt = 0; }
if($dep_1_mt > 0){ $dep_1_ver_mt = $dep_1_mt; } else { $dep_1_ver_mt = 0; }

if($ev_2_mt > 0){ $ev_2_ver_mt = $ev_2_mt; } else { $ev_2_ver_mt = 0; }
if($dep_2_mt > 0){ $dep_2_ver_mt = $dep_2_mt; } else { $dep_2_ver_mt = 0; }

if($ev_3_mt > 0){ $ev_3_ver_mt = $ev_3_mt; } else { $ev_3_ver_mt = 0; }
if($dep_3_mt > 0){ $dep_3_ver_mt = $dep_3_mt; } else { $dep_3_ver_mt = 0; }

if($ev_4_mt > 0){ $ev_4_ver_mt = $ev_4_mt; } else { $ev_4_ver_mt = 0; }
if($dep_4_mt > 0){ $dep_4_ver_mt = $dep_4_mt; } else { $dep_4_ver_mt = 0; }

if($ev_5_mt > 0){ $ev_5_ver_mt = $ev_5_mt; } else { $ev_5_ver_mt = 0; }
if($dep_5_mt > 0){ $dep_5_ver_mt = $dep_5_mt; } else { $dep_5_ver_mt = 0; }

$bir_birlestir_mt = "".$ev_1_ver_mt." - ".$dep_1_ver_mt."";
$iki_birlestir_mt = "".$ev_2_ver_mt." - ".$dep_2_ver_mt."";
$uc_birlestir_mt = "".$ev_3_ver_mt." - ".$dep_3_ver_mt."";
$dort_birlestir_mt = "".$ev_4_ver_mt." - ".$dep_4_ver_mt."";
$bes_birlestir_mt = "".$ev_5_ver_mt." - ".$dep_5_ver_mt."";

$farray_mt = farray("SELECT id FROM canli_maclar_masatenis WHERE eventid='".$eventid_mt."' AND ev_takim='".$ev_takim_mt."' AND konuk_takim='".$dep_takim_mt."' AND period!='Bitti'");
if($farray_mt['id'] > 0){
sed_sql_query("UPDATE canli_maclar_masatenis SET ev_skor = '".$ms_ev_mt."',konuk_skor = '".$ms_dep_mt."',bir_period_skor = '".$bir_birlestir_mt."',iki_period_skor = '".$iki_birlestir_mt."',uc_period_skor = '".$uc_birlestir_mt."',dort_period_skor = '".$dort_birlestir_mt."',bes_period_skor = '".$bes_birlestir_mt."',period = 'Bitti' WHERE eventid='".$eventid_mt."' AND ev_takim='".$ev_takim_mt."' AND konuk_takim='".$dep_takim_mt."' AND period!='Bitti'");

}

} else if($ertelendi_mt == 1){

sed_sql_query("update kupon_ic set kazanma='4',ertelendi='1' where mac_kodu='$eventid_mt' and spor_tip='canlimt' AND ms=''");

}

}

}

function BasketbolListe(){

$js = curlfonksiyon("https://jackpotmatic.store/api/canli_bilgiler.php?tip=voleybol");

$jsonGet = json_decode($js);
foreach($jsonGet->veriler as $inner){

$oran_kimkazanir_1 = 0;
$oran_kimkazanir_2 = 0;
$oran_secenekver = 0;
$oran_ust = 0;
$oran_alt = 0;
$evskor_ver = 0;
$depskor_ver = 0;
$evskor = 0;
$depskor = 0;
$ev1c = 0;
$dep1c = 0;
$ev2c = 0;
$dep2c = 0;
$ev3c = 0;
$dep3c = 0;
$ev4c = 0;
$dep4c = 0;
$ev5c = 0;
$dep5c = 0;
$sayi_versene = 255;
$skor_sayi_1 = 1;
$skor_sayi_3 = 3;
$skor_sayi_5 = 5;
$skor_sayi_7 = 7;
$skor_sayi_9 = 9;
$betradar = 0;

## EV SKORLARI ##
$ev1c = $inner->ev1c;
$ev2c = $inner->ev2c;
$ev3c = $inner->ev3c;
$ev3c = $inner->ev4c;
$ev5c = $inner->ev5c;
## DEP SKORLARI ##
$dep1c = $inner->dep1c;
$dep2c = $inner->dep2c;
$dep3c = $inner->dep3c;
$dep4c = $inner->dep4c;
$dep5c = $inner->dep5c;

## ///// ##
$aktif = $inner->aktif;
$devre = $inner->period;

if($devre == "3.Set"){
$devremi=1;
} else {
$devremi=0;
}

if($devre == "Başlamadı"){
$gel = "1";
} else {
$gel = "0";
}

$eventid = $inner->eventid;
$ev_takim_ver = $inner->ev_takim;
$dep_takim_ver = $inner->konuk_takim;
$oran_kimkazanir_1 = $inner->ev_oran;
$oran_kimkazanir_2 = $inner->konuk_oran;
$oran_secenekver = $inner->altustgol;
$oran_ust = $inner->ust;
$oran_alt = $inner->alt;
$ulke = $inner->ulke;
$lig = $inner->lig_adi;
$ulkeid = $inner->ulkeid;
$betradar = $inner->betradar_id;
$gel = $inner->gelecek;
$tarihsaat = $inner->baslamasaat;
$evskor = $inner->ev_skor;
$depskor = $inner->konuk_skor;

if($devre != "Başlamadı" && $ev_takim_ver != "" && $dep_takim_ver != ""){

$farray = farray("SELECT * FROM canli_maclar_voleybol where eventid = '".$eventid."'");

$bir_period_skor = "".$ev1c." - ".$dep1c."";
$iki_period_skor = "".$ev2c." - ".$dep2c."";
$uc_period_skor = "".$ev3c." - ".$dep3c."";
$dort_period_skor = "".$ev4c." - ".$dep4c."";
$bes_period_skor = "".$ev5c." - ".$dep5c."";

if($farray['id'] < 1){

sed_sql_query("INSERT INTO canli_maclar_voleybol SET
ev_takim='".$ev_takim_ver."',
konuk_takim='".$dep_takim_ver."',
ev_oran='".$oran_kimkazanir_1."',
konuk_oran='".$oran_kimkazanir_2."',
altustgol='".$oran_secenekver."',
ust='".$oran_ust."',
alt='".$oran_alt."',
aktif='".$aktif."',
period='".$devre."',
devremi='".$devremi."',
ulke='".$ulke."',
lig_adi='".$lig."',
ulkeid='".$ulkeid."',
dakika='0',
betradar_id='".$betradar."',
eventid='".$eventid."',
songuncelleme='".time()."',
gelecek='".$gel."',
baslamasaat='".$tarihsaat."'");

print ''.$ev_takim_ver.' - '.$dep_takim_ver.' / '.$dakikayi_ver_hadi.' / Kayıt Edildi';

sed_sql_query("delete from program_voleybol where ev_takim='".$ev_takim_ver."' and konuk_takim='".$dep_takim_ver."' and kupa_ulke='".$ulke."'");

} else {

sed_sql_query("UPDATE canli_maclar_voleybol SET	
ev_oran='".$oran_kimkazanir_1."',
konuk_oran='".$oran_kimkazanir_2."',
altustgol='".$oran_secenekver."',
ust='".$oran_ust."',
alt='".$oran_alt."',
period='".$devre."',
ev_skor='".$evskor."',
konuk_skor='".$depskor."',
bir_period_skor='".$bir_period_skor."',
iki_period_skor='".$iki_period_skor."',
uc_period_skor='".$uc_period_skor."',
dort_period_skor='".$dort_period_skor."',
bes_period_skor='".$bes_period_skor."',
devremi='".$devremi."',
aktif='".$aktif."',
songuncelleme='".time()."',
gelecek='".$gel."',
dakika='0',
betradar_id='".$betradar."',
baslamasaat='".$tarihsaat."'
WHERE eventid='".$eventid."'");

print ''.$ev_takim_ver.' - '.$dep_takim_ver.' / '.$dakikayi_ver_hadi.' / Güncellendi';

}

print '<br>';

}

}

$js = curlfonksiyon("https://jackpotmatic.store/api/canli_bilgiler.php?tip=buzhokeyi");

$jsonGet = json_decode($js);
foreach($jsonGet->veriler as $inner){

$oran_kimkazanir_1 = 0;
$oran_kimkazanir_2 = 0;
$oran_kimkazanir_3 = 0;
$betradar = 0;
$evskor = 0;
$depskor = 0;
$ev1c = 0;
$ev2c = 0;
$ev3c = 0;
$dep1c = 0;
$dep2c = 0;
$dep3c = 0;

## EV SKORLARI ##
$ev1c = $inner->ev1c;
$ev2c = $inner->ev2c;
$ev3c = $inner->ev3c;
## DEP SKORLARI ##
$dep1c = $inner->dep1c;
$dep2c = $inner->dep2c;
$dep3c = $inner->dep3c;

## ///// ##
$aktif = $inner->aktif;
$devre = $inner->period;

if($devre == "Başlamadı"){
$gel = "1";
} else {
$gel = "0";
}

$eventid = $inner->eventid;
$ev_takim_ver = $inner->ev_takim;
$dep_takim_ver = $inner->konuk_takim;
$oran_kimkazanir_1 = $inner->ev_oran;
$oran_kimkazanir_2 = $inner->berabere_oran;
$oran_kimkazanir_3 = $inner->konuk_oran;
$ulke = $inner->ulke;
$lig = $inner->lig_adi;
$ulkeid = $inner->ulkeid;
$betradar = $inner->betradar_id;
$gel = $inner->gelecek;
$tarihsaat = $inner->baslamasaat;
$evskor = $inner->ev_skor;
$depskor = $inner->konuk_skor;

if($devre != "Başlamadı" && $ev_takim_ver != "" && $dep_takim_ver != ""){

$farray = farray("SELECT * FROM canli_maclar_buzhokeyi where eventid = '".$eventid."'");

$bir_period_skor = "".$ev1c." - ".$dep1c."";
$iki_period_skor = "".$ev2c." - ".$dep2c."";
$uc_period_skor = "".$ev3c." - ".$dep3c."";

if($farray['id'] < 1){

sed_sql_query("INSERT INTO canli_maclar_buzhokeyi SET
ev_takim='".$ev_takim_ver."',
konuk_takim='".$dep_takim_ver."',
ev_oran='".$oran_kimkazanir_1."',
berabere_oran='".$oran_kimkazanir_2."',
konuk_oran='".$oran_kimkazanir_3."',
aktif='".$aktif."',
period='".$devre."',
ulke='".$ulke."',
lig_adi='".$lig."',
ulkeid='".$ulkeid."',
dakika='0',
betradar_id='".$betradar."',
eventid='".$eventid."',
songuncelleme='".time()."',
gelecek='".$gel."',
baslamasaat='".$tarihsaat."'");

print ''.$ev_takim_ver.' - '.$dep_takim_ver.' / '.$dakikayi_ver_hadi.' / Kayıt Edildi';

sed_sql_query("delete from program_buzhokeyi where ev_takim='".$ev_takim_ver."' and konuk_takim='".$dep_takim_ver."' and kupa_ulke='".$ulke."'");

} else {

sed_sql_query("UPDATE canli_maclar_buzhokeyi SET	
ev_skor='".$evskor."',
konuk_skor='".$depskor."',
ev_oran='".$oran_kimkazanir_1."',
berabere_oran='".$oran_kimkazanir_2."',
konuk_oran='".$oran_kimkazanir_3."',
period='".$devre."',
bir_period_skor='".$bir_period_skor."',
iki_period_skor='".$iki_period_skor."',
uc_period_skor='".$uc_period_skor."',
aktif='".$aktif."',
songuncelleme='".time()."',
gelecek='".$gel."',
betradar_id='".$betradar."',
baslamasaat='".$tarihsaat."'
WHERE eventid='".$eventid."'");

print ''.$ev_takim_ver.' - '.$dep_takim_ver.' / '.$dakikayi_ver_hadi.' / Güncellendi';

}

print '<br>';

}

}

$kontrol_yap_bakalim_basketbol = sed_sql_query("select * from basketbol_canli_maclar where isibitti='0'");
while($kontrolrow_basketbol=sed_sql_fetcharray($kontrol_yap_bakalim_basketbol)) {

if($kontrolrow_basketbol["period"] == "Bitti") {

sed_sql_query("UPDATE kupon_ic SET birperiod='".$kontrolrow_basketbol['bir_period_skor']."',ikiperiod='".$kontrolrow_basketbol['iki_period_skor']."',ucperiod='".$kontrolrow_basketbol['uc_period_skor']."',dortperiod='".$kontrolrow_basketbol['dort_period_skor']."',besperiod='".$kontrolrow_basketbol['bes_period_skor']."',iy='".$kontrolrow_basketbol['iy_ev']." - ".$kontrolrow_basketbol['iy_konuk']."',ms='".$kontrolrow_basketbol['ev_skor']." - ".$kontrolrow_basketbol['konuk_skor']."' WHERE ev_takim='".$kontrolrow_basketbol['ev_takim']."' and konuk_takim='".$kontrolrow_basketbol['konuk_takim']."' and spor_tip='canlib' and mac_db_id='".$kontrolrow_basketbol['id']."'");

sed_sql_query("UPDATE basketbol_canli_maclar SET devre='Bitti',isibitti='1',sonucok='1' WHERE eventid='".$kontrolrow_basketbol["eventid"]."'");

echo "<font color ='red'>".$kontrolrow_basketbol["ev_takim"]." v ".$kontrolrow_basketbol["konuk_takim"]." maçı sonuçlandırıldı.</font></br>";

}

}

$kontrol_yap_bakalim_voleybol = sed_sql_query("select * from canli_maclar_voleybol where isibitti='0'");
while($kontrolrow_voleybol=sed_sql_fetcharray($kontrol_yap_bakalim_voleybol)) {

if($kontrolrow_voleybol["period"] == "Bitti") {

sed_sql_query("UPDATE kupon_ic SET birperiod='".$kontrolrow_voleybol['bir_period_skor']."',ikiperiod='".$kontrolrow_voleybol['iki_period_skor']."',ucperiod='".$kontrolrow_voleybol['uc_period_skor']."',dortperiod='".$kontrolrow_voleybol['dort_period_skor']."',besperiod='".$kontrolrow_voleybol['bes_period_skor']."',ms='".$kontrolrow_voleybol['ev_skor']." - ".$kontrolrow_voleybol['konuk_skor']."' WHERE ev_takim='".$kontrolrow_voleybol['ev_takim']."' and konuk_takim='".$kontrolrow_voleybol['konuk_takim']."' and spor_tip='canliv' and mac_db_id='".$kontrolrow_voleybol['id']."'");

sed_sql_query("UPDATE canli_maclar_voleybol SET devre='Bitti',isibitti='1',sonucok='1' WHERE eventid='".$kontrolrow_voleybol["eventid"]."'");

echo "<font color ='red'>".$kontrolrow_voleybol["ev_takim"]." v ".$kontrolrow_voleybol["konuk_takim"]." maçı sonuçlandırıldı.</font></br>";

}

}

$kontrol_yap_bakalim_buzhokeyi = sed_sql_query("select * from canli_maclar_buzhokeyi where isibitti='0'");
while($kontrolrow_buzhokeyi=sed_sql_fetcharray($kontrol_yap_bakalim_buzhokeyi)) {

if($kontrolrow_buzhokeyi["period"] == "Bitti") {

sed_sql_query("UPDATE kupon_ic SET birperiod='".$kontrolrow_buzhokeyi['bir_period_skor']."',ikiperiod='".$kontrolrow_buzhokeyi['iki_period_skor']."',ucperiod='".$kontrolrow_buzhokeyi['uc_period_skor']."',ms='".$kontrolrow_buzhokeyi['ev_skor']." - ".$kontrolrow_buzhokeyi['konuk_skor']."' WHERE ev_takim='".$kontrolrow_buzhokeyi['ev_takim']."' and konuk_takim='".$kontrolrow_buzhokeyi['konuk_takim']."' and spor_tip='canlibuz' and mac_db_id='".$kontrolrow_buzhokeyi['id']."'");

sed_sql_query("UPDATE canli_maclar_buzhokeyi SET devre='Bitti',isibitti='1',sonucok='1' WHERE eventid='".$kontrolrow_buzhokeyi["eventid"]."'");

echo "<font color ='red'>".$kontrolrow_buzhokeyi["ev_takim"]." v ".$kontrolrow_buzhokeyi["konuk_takim"]." maçı sonuçlandırıldı.</font></br>";

}

}

}

function TenisListe(){

$js = curlfonksiyon("https://jackpotmatic.store/api/canli_bilgiler.php?tip=tenis");

$jsonGet = json_decode($js);
foreach($jsonGet->veriler as $inner){

$evskor_ver = 0;
$depskor_ver = 0;
$evskor_verdim = 0;
$depskor_verdim = 0;
$ev1c = 0;
$dep1c = 0;
$ev2c = 0;
$dep2c = 0;
$ev3c = 0;
$dep3c = 0;
$ev4c = 0;
$dep4c = 0;
$ev5c = 0;
$dep5c = 0;
$evskor = 0;
$depskor = 0;
$sayi_versene = 255;
$skor_sayi_1 = 1;
$skor_sayi_3 = 3;
$skor_sayi_5 = 5;
$skor_sayi_7 = 7;
$skor_sayi_9 = 9;
$betradar = 0;
$oran_1X2_1 = 0;
$oran_1X2_3 = 0;

## EV SKORLARI ##
$ev1c = $inner->ev1c;
$ev2c = $inner->ev2c;
$ev3c = $inner->ev3c;
$ev4c = $inner->ev4c;
$ev5c = $inner->ev5c;
## DEP SKORLARI ##
$dep1c = $inner->dep1c;
$dep2c = $inner->dep2c;
$dep3c = $inner->dep3c;
$dep4c = $inner->dep4c;
$dep5c = $inner->dep5c;

$aktif = $inner->aktif;
$devre = $inner->period;

$evskor = $inner->ev_skor;
$depskor = $inner->konuk_skor;

$eventid = $inner->eventid;
$ev_takim_ver = $inner->ev_takim;
$dep_takim_ver = $inner->konuk_takim;
$oran_1X2_1 = $inner->ev_oran;
$oran_1X2_3 = $inner->konuk_oran;
$ulke = $inner->ulke;
$ulkeid = $inner->ulkeid;
$betradar = $inner->betradar_id;
$gel = $inner->gelecek;
$tarihsaat = $inner->baslamasaat;

if($devre != "Başlamadı" && $ev_takim_ver != "" && $dep_takim_ver != ""){

$farray = farray("SELECT * FROM canli_maclar_tenis where eventid = '".$eventid."'");

$bir_period_skor = "".$ev1c." - ".$dep1c."";
$iki_period_skor = "".$ev2c." - ".$dep2c."";
$uc_period_skor = "".$ev3c." - ".$dep3c."";
$dort_period_skor = "".$ev4c." - ".$dep4c."";
$bes_period_skor = "".$ev5c." - ".$dep5c."";

if($farray['id'] < 1){

sed_sql_query("INSERT INTO canli_maclar_tenis SET
ev_takim='".$ev_takim_ver."',
konuk_takim='".$dep_takim_ver."',
ev_skor='0',
konuk_skor='0',
ev_oran='".$oran_1X2_1."',
konuk_oran='".$oran_1X2_3."',
aktif='".$aktif."',
period='".$devre."',
ulke='".$ulke."',
ulkeid='".$ulkeid."',
dakika='0',
betradar_id='".$betradar."',
eventid='".$eventid."',
songuncelleme='".time()."',
gelecek='".$gel."',
baslamasaat='".$tarihsaat."'");
print ''.$ev_takim_ver.' - '.$dep_takim_ver.' / Kayıt Edildi';

sed_sql_query("delete from program_tenis where ev_takim='".$ev_takim_ver."' and konuk_takim='".$dep_takim_ver."' and kupa_ulke='".$ulke."'");

} else {

sed_sql_query("UPDATE canli_maclar_tenis SET	
ev_skor='".$evskor."',
konuk_skor='".$depskor."',
ev_oran='".$oran_1X2_1."',
konuk_oran='".$oran_1X2_3."',
period='".$devre."',
bir_period_skor='".$bir_period_skor."',
iki_period_skor='".$iki_period_skor."',
uc_period_skor='".$uc_period_skor."',
dort_period_skor='".$dort_period_skor."',
bes_period_skor='".$bes_period_skor."',
aktif='".$aktif."',
songuncelleme='".time()."',
gelecek='".$gel."',
dakika='0',
betradar_id='".$betradar."',
baslamasaat='".$tarihsaat."'
WHERE eventid='".$eventid."'");

print ''.$ev_takim_ver.' - '.$dep_takim_ver.' / Güncellendi';

}

print '<br>';

}

}

$js = curlfonksiyon("https://jackpotmatic.store/api/canli_bilgiler.php?tip=masatenisi");

$jsonGet = json_decode($js);
foreach($jsonGet->veriler as $inner){

$ev1c = 0;
$dep1c = 0;
$ev2c = 0;
$dep2c = 0;
$ev3c = 0;
$dep3c = 0;
$ev4c = 0;
$dep4c = 0;
$ev5c = 0;
$dep5c = 0;
$evskor = 0;
$depskor = 0;
$betradar = 0;
$oran_1X2_1 = 0;
$oran_1X2_3 = 0;

## EV SKORLARI ##
$ev1c = $inner->ev1c;
$ev2c = $inner->ev2c;
$ev3c = $inner->ev3c;
$ev4c = $inner->ev4c;
$ev5c = $inner->ev5c;
## DEP SKORLARI ##
$dep1c = $inner->dep1c;
$dep2c = $inner->dep2c;
$dep3c = $inner->dep3c;
$dep4c = $inner->dep4c;
$dep5c = $inner->dep5c;

$aktif = $inner->aktif;
$devre = $inner->period;

$evskor = $inner->ev_skor;
$depskor = $inner->konuk_skor;

$eventid = $inner->eventid;
$ev_takim_ver = $inner->ev_takim;
$dep_takim_ver = $inner->konuk_takim;
$oran_1X2_1 = $inner->ev_oran;
$oran_1X2_3 = $inner->konuk_oran;
$ulke = $inner->ulke;
$ulkeid = $inner->ulkeid;
$betradar = $inner->betradar_id;
$gel = $inner->gelecek;
$tarihsaat = $inner->baslamasaat;

if($devre != "Başlamadı" && $ev_takim_ver != "" && $dep_takim_ver != ""){

$farray = farray("SELECT * FROM canli_maclar_masatenis where eventid = '".$eventid."'");

$bir_period_skor = "".$ev1c." - ".$dep1c."";
$iki_period_skor = "".$ev2c." - ".$dep2c."";
$uc_period_skor = "".$ev3c." - ".$dep3c."";
$dort_period_skor = "".$ev4c." - ".$dep4c."";
$bes_period_skor = "".$ev5c." - ".$dep5c."";

if($farray['id'] < 1){

sed_sql_query("INSERT INTO canli_maclar_masatenis SET
ev_takim='".$ev_takim_ver."',
konuk_takim='".$dep_takim_ver."',
ev_skor='0',
konuk_skor='0',
ev_oran='".$oran_1X2_1."',
konuk_oran='".$oran_1X2_3."',
aktif='".$aktif."',
period='".$devre."',
ulke='".$ulke."',
ulkeid='".$ulkeid."',
dakika='0',
betradar_id='".$betradar."',
eventid='".$eventid."',
songuncelleme='".time()."',
gelecek='".$gel."',
baslamasaat='".$tarihsaat."'");
print ''.$ev_takim_ver.' - '.$dep_takim_ver.' / Kayıt Edildi';

sed_sql_query("delete from program_masatenisi where ev_takim='".$ev_takim_ver."' and konuk_takim='".$dep_takim_ver."' and kupa_ulke='".$ulke."'");

} else {

sed_sql_query("UPDATE canli_maclar_masatenis SET	
ev_skor='".$evskor."',
konuk_skor='".$depskor."',
ev_oran='".$oran_1X2_1."',
konuk_oran='".$oran_1X2_3."',
period='".$devre."',
bir_period_skor='".$bir_period_skor."',
iki_period_skor='".$iki_period_skor."',
uc_period_skor='".$uc_period_skor."',
dort_period_skor='".$dort_period_skor."',
bes_period_skor='".$bes_period_skor."',
aktif='".$aktif."',
songuncelleme='".time()."',
gelecek='".$gel."',
dakika='0',
betradar_id='".$betradar."',
baslamasaat='".$tarihsaat."'
WHERE eventid='".$eventid."'");

print ''.$ev_takim_ver.' - '.$dep_takim_ver.' / Güncellendi';

}

print '<br>';

}

}

$kontrol_yap_bakalim_tenis = sed_sql_query("select * from canli_maclar_tenis where isibitti='0'");
while($kontrolrow_tenis=sed_sql_fetcharray($kontrol_yap_bakalim_tenis)) {

if($kontrolrow_tenis["period"] == "Bitti") {

sed_sql_query("UPDATE kupon_ic SET birperiod='".$kontrolrow_tenis['bir_period_skor']."',ikiperiod='".$kontrolrow_tenis['iki_period_skor']."',ucperiod='".$kontrolrow_tenis['uc_period_skor']."',dortperiod='".$kontrolrow_tenis['dort_period_skor']."',besperiod='".$kontrolrow_tenis['bes_period_skor']."',ms='".$kontrolrow_tenis['ev_skor']." - ".$kontrolrow_tenis['konuk_skor']."' WHERE ev_takim='".$kontrolrow_tenis['ev_takim']."' and konuk_takim='".$kontrolrow_tenis['konuk_takim']."' and spor_tip='canlit' and mac_db_id='".$kontrolrow_tenis['id']."'");

sed_sql_query("UPDATE canli_maclar_tenis SET devre='Bitti',isibitti='1',sonucok='1' WHERE eventid='".$kontrolrow_tenis["eventid"]."'");

echo "<font color ='red'>".$kontrolrow_tenis["ev_takim"]." v ".$kontrolrow_tenis["konuk_takim"]." maçı sonuçlandırıldı.</font></br>";

}

}

$kontrol_yap_bakalim_masatenis = sed_sql_query("select * from canli_maclar_masatenis where isibitti='0'");
while($kontrolrow_masatenis=sed_sql_fetcharray($kontrol_yap_bakalim_masatenis)) {

if($kontrolrow_masatenis["period"] == "Bitti") {

sed_sql_query("UPDATE kupon_ic SET birperiod='".$kontrolrow_masatenis['bir_period_skor']."',ikiperiod='".$kontrolrow_masatenis['iki_period_skor']."',ucperiod='".$kontrolrow_masatenis['uc_period_skor']."',dortperiod='".$kontrolrow_masatenis['dort_period_skor']."',besperiod='".$kontrolrow_masatenis['bes_period_skor']."',ms='".$kontrolrow_masatenis['ev_skor']." - ".$kontrolrow_masatenis['konuk_skor']."' WHERE ev_takim='".$kontrolrow_masatenis['ev_takim']."' and konuk_takim='".$kontrolrow_masatenis['konuk_takim']."' and spor_tip='canlimt' and mac_db_id='".$kontrolrow_masatenis['id']."'");

sed_sql_query("UPDATE canli_maclar_masatenis SET devre='Bitti',isibitti='1',sonucok='1' WHERE eventid='".$kontrolrow_masatenis["eventid"]."'");

echo "<font color ='red'>".$kontrolrow_masatenis["ev_takim"]." v ".$kontrolrow_masatenis["konuk_takim"]." maçı sonuçlandırıldı.</font></br>";

}

}

}

//mysql_close();