<?PHP
include '../singledb.php';
/*$linkmysql = mysql_connect($dbhost,$dbuser,$dbpass);
mysql_select_db($dbname);

sed_sql_query("SET NAMES 'UTF8'");
sed_sql_query("SET character_set_connection = 'UTF8'");
sed_sql_query("SET character_set_client = 'UTF8'");
sed_sql_query("SET character_set_results = 'UTF8'");*/

function farray($query){
	$sql =  sed_sql_fetcharray(sed_sql_query($query));
	return $sql;
}

$func = $_GET['func'];
$canli = $_GET['canli'];
$type = (int)$_GET['type'];
$code = $_GET['code'];

if(!function_exists($func)){
	exit;
}

if($_GET['func'] == "MacListesi"){
MacListesi();
MacListesi_Beyzbol();
MacListesi_Masatenisi();
MacListesi_Rugby();
}

function curlkodlari($url){
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 15);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,90); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$url_cikti = curl_exec($ch);
$curl_info = curl_getinfo($ch);
curl_close($ch);
return $url_cikti;
}

function MacListesi(){

$maclar = json_decode(curlkodlari("http://betwingo.xyz/api/jsonlar_bulten/dovus_json_liste.php"));

$toplammacdovus = count($maclar->veriler);
if($toplammacdovus > 1) {
    sed_sql_query("update program_dovus set gunceldestek='0' where kupa_isim!='Duello'");
}

foreach($maclar->veriler as $event){

print $event->code . ' - ';

$mackodu = $event->code;
$tarih = $event->tarihsaat;
$ssaat = $event->mac_saat_getir;
$ttarih = $event->mac_tarih_getir;
$lig = $event->lig;
$lig_id = $event->lig_id;
$ulke = $event->ulke;
$bayrak = $event->ulke_id;
$evsahibi = $event->evsahibi;
$deplasman = $event->deplasman;

$oran1x2_1_ver = $event->oran1x2_1;
$oran1x2_2_ver = $event->oran1x2_2;
$oran1x2_3_ver = $event->oran1x2_3;

if($oran1x2_1_ver>0){ $oran1x2_1 = $oran1x2_1_ver; } else { $oran1x2_1 = "0.00"; }
if($oran1x2_2_ver>0){ $oran1x2_2 = $oran1x2_2_ver; } else { $oran1x2_2 = "0.00"; }
if($oran1x2_3_ver>0){ $oran1x2_3 = $oran1x2_3_ver; } else { $oran1x2_3 = "0.00"; }

$newtimestamp = strtotime($tarih);
$tarih = date('Y-m-d H:i:s', $newtimestamp);
$ttarih = date('d.m.y', $newtimestamp);
$ssaat = date('H:i:s', $newtimestamp);
$mac_time = strtotime($tarih);

$farray = farray("SELECT id FROM program_dovus WHERE bulten = 'hititbet' AND mac_kodu = '".$mackodu."'");

if($farray['id'] < 1){
sed_sql_query("INSERT INTO program_dovus SET
ev_takim = '".$evsahibi."',
konuk_takim = '".$deplasman."',
mac_kodu = '".$mackodu."',
mac_tarih = '".$ttarih."',
mac_time = '".$mac_time."',
mbs = '1',
kupa_isim = '".$lig."',
kupa_id = '".$lig_id."',
kupa_ulke = '".$ulke."',
ulkeadi = '".$ulke." - ".$lig."',
bayrak = '".$bayrak."',
bulten = 'hititbet',
gunceldestek = '1',
songuncelleme = '".time()."',
kayittime = '".time()."',
1x2_1 = '".$oran1x2_1."',
1x2_x = '".$oran1x2_2."',
1x2_2 = '".$oran1x2_3."',
aktif = '1'");
$macid = sed_sql_insertid();
print 'Kayıt Edildi';
}else{
sed_sql_query("UPDATE program_dovus SET	
mac_kodu = '".$mackodu."',
mac_tarih = '".$ttarih."',
mac_time = '".$mac_time."',
aktif = '1',
gunceldestek = '1',
1x2_1 = '".$oran1x2_1."',
1x2_x = '".$oran1x2_2."',
1x2_2 = '".$oran1x2_3."',
songuncelleme = '".time()."'
WHERE mac_kodu = '".$mackodu."'");						
print 'Güncellendi';
}

print '<br>';

}

sed_sql_query("update program_dovus set aktif='0' where gunceldestek='0' and kupa_isim!='Duello'");

}

function MacListesi_Beyzbol(){

$maclar = json_decode(curlkodlari("http://betwingo.xyz/api/jsonlar_bulten/beyzbol_json_liste.php"));

$toplammacbeyzbol = count($maclar->veriler);
if($toplammacbeyzbol > 1) {
    sed_sql_query("update program_beyzbol set gunceldestek='0' where kupa_isim!='Duello'");
}

foreach($maclar->veriler as $event){

print $event->code . ' - ';

$mackodu = $event->code;
$tarih = $event->tarihsaat;
$ssaat = $event->mac_saat_getir;
$ttarih = $event->mac_tarih_getir;
$lig = $event->lig;
$lig_id = $event->lig_id;
$ulke = $event->ulke;
$bayrak = $event->ulke_id;
$evsahibi = $event->evsahibi;
$deplasman = $event->deplasman;
$betradarid = $event->betradarid;

$kimkazanir_1_ver = $event->kimkazanir_1;
$kimkazanir_2_ver = $event->kimkazanir_2;

if($kimkazanir_1_ver>0){ $kimkazanir_1 = $kimkazanir_1_ver; } else { $kimkazanir_1 = "0.00"; }
if($kimkazanir_2_ver>0){ $kimkazanir_2 = $kimkazanir_2_ver; } else { $kimkazanir_2 = "0.00"; }

$newtimestamp = strtotime($tarih);
$tarih = date('Y-m-d H:i:s', $newtimestamp);
$ttarih = date('d.m.y', $newtimestamp);
$ssaat = date('H:i:s', $newtimestamp);
$mac_time = strtotime($tarih);

$farray = farray("SELECT id FROM program_beyzbol WHERE bulten = 'hititbet' AND mac_kodu = '".$mackodu."'");

if($farray['id'] < 1){
sed_sql_query("INSERT INTO program_beyzbol SET
ev_takim = '".$evsahibi."',
konuk_takim = '".$deplasman."',
mac_kodu = '".$mackodu."',
mac_tarih = '".$ttarih."',
mac_time = '".$mac_time."',
mbs = '1',
kupa_isim = '".$lig."',
kupa_id = '".$lig_id."',
kupa_ulke = '".$ulke."',
ulkeadi = '".$ulke." - ".$lig."',
bayrak = '".$bayrak."',
bulten = 'hititbet',
gunceldestek = '1',
songuncelleme = '".time()."',
kayittime = '".time()."',
istatistik = '".$betradarid."',
kimkazanir_1 = '".$kimkazanir_1."',
kimkazanir_2 = '".$kimkazanir_2."',
aktif = '1'");
$macid = sed_sql_insertid();
print 'Kayıt Edildi';
}else{
sed_sql_query("UPDATE program_beyzbol SET	
mac_kodu = '".$mackodu."',
mac_tarih = '".$ttarih."',
mac_time = '".$mac_time."',
aktif = '1',
gunceldestek = '1',
kimkazanir_1 = '".$kimkazanir_1."',
kimkazanir_2 = '".$kimkazanir_2."',
songuncelleme = '".time()."',
istatistik = '".$betradarid."'
WHERE mac_kodu = '".$mackodu."'");						
print 'Güncellendi';
}

print '<br>';

}

sed_sql_query("update program_beyzbol set aktif='0' where gunceldestek='0' and kupa_isim!='Duello'");

}

function MacListesi_Masatenisi(){

$maclar = json_decode(curlkodlari("http://betwingo.xyz/api/jsonlar_bulten/mtenis_json_liste.php"));

$toplammacmasatenisi = count($maclar->veriler);
if($toplammacmasatenisi > 1) {
    sed_sql_query("update program_masatenisi set gunceldestek='0' where kupa_isim!='Duello'");
}

foreach($maclar->veriler as $event){

print $event->code . ' - ';

$mackodu = $event->code;
$tarih = $event->tarihsaat;
$ssaat = $event->mac_saat_getir;
$ttarih = $event->mac_tarih_getir;
$lig = $event->lig;
$lig_id = $event->lig_id;
$ulke = $event->ulke;
$bayrak = $event->ulke_id;
$evsahibi = $event->evsahibi;
$deplasman = $event->deplasman;
$betradarid = $event->betradarid;

$kimkazanir_1_ver = $event->kimkazanir_1;
$kimkazanir_2_ver = $event->kimkazanir_2;

if($kimkazanir_1_ver>0){ $kimkazanir_1 = $kimkazanir_1_ver; } else { $kimkazanir_1 = "0.00"; }
if($kimkazanir_2_ver>0){ $kimkazanir_2 = $kimkazanir_2_ver; } else { $kimkazanir_2 = "0.00"; }

$newtimestamp = strtotime($tarih);
$tarih = date('Y-m-d H:i:s', $newtimestamp);
$ttarih = date('d.m.y', $newtimestamp);
$ssaat = date('H:i:s', $newtimestamp);
$mac_time = strtotime($tarih);

$farray = farray("SELECT id FROM program_masatenisi WHERE bulten = 'hititbet' AND mac_kodu = '".$mackodu."'");

if($farray['id'] < 1){
sed_sql_query("INSERT INTO program_masatenisi SET
ev_takim = '".$evsahibi."',
konuk_takim = '".$deplasman."',
mac_kodu = '".$mackodu."',
mac_tarih = '".$ttarih."',
mac_time = '".$mac_time."',
mbs = '1',
kupa_isim = '".$lig."',
kupa_id = '".$lig_id."',
kupa_ulke = '".$ulke."',
ulkeadi = '".$ulke." - ".$lig."',
bayrak = '".$bayrak."',
bulten = 'hititbet',
gunceldestek = '1',
songuncelleme = '".time()."',
kayittime = '".time()."',
istatistik = '".$betradarid."',
kimkazanir_1 = '".$kimkazanir_1."',
kimkazanir_2 = '".$kimkazanir_2."',
aktif = '1'");
$macid = sed_sql_insertid();
print 'Kayıt Edildi';
}else{
sed_sql_query("UPDATE program_masatenisi SET	
mac_kodu = '".$mackodu."',
mac_tarih = '".$ttarih."',
mac_time = '".$mac_time."',
aktif = '1',
gunceldestek = '1',
kimkazanir_1 = '".$kimkazanir_1."',
kimkazanir_2 = '".$kimkazanir_2."',
songuncelleme = '".time()."',
istatistik = '".$betradarid."'
WHERE mac_kodu = '".$mackodu."'");						
print 'Güncellendi';
}

print '<br>';

}

sed_sql_query("update program_masatenisi set aktif='0' where gunceldestek='0' and kupa_isim!='Duello'");

}

function MacListesi_Rugby(){

$maclar = json_decode(curlkodlari("http://betwingo.xyz/api/jsonlar_bulten/rugby_json_liste.php"));

$toplammacrugby = count($maclar->veriler);
if($toplammacrugby > 1) {
    sed_sql_query("update program_rugby set gunceldestek='0' where kupa_isim!='Duello'");
}

foreach($maclar->veriler as $event){

print $event->code . ' - ';

$mackodu = $event->code;
$tarih = $event->tarihsaat;
$ssaat = $event->mac_saat_getir;
$ttarih = $event->mac_tarih_getir;
$lig = $event->lig;
$lig_id = $event->lig_id;
$ulke = $event->ulke;
$bayrak = $event->ulke_id;
$evsahibi = $event->evsahibi;
$deplasman = $event->deplasman;
$betradarid = $event->betradarid;

$oran1x2_1_ver = $event->oran1x2_1;
$oran1x2_2_ver = $event->oran1x2_2;
$oran1x2_3_ver = $event->oran1x2_3;

if($oran1x2_1_ver>0){ $oran1x2_1 = $oran1x2_1_ver; } else { $oran1x2_1 = "0.00"; }
if($oran1x2_2_ver>0){ $oran1x2_2 = $oran1x2_2_ver; } else { $oran1x2_2 = "0.00"; }
if($oran1x2_3_ver>0){ $oran1x2_3 = $oran1x2_3_ver; } else { $oran1x2_3 = "0.00"; }

$newtimestamp = strtotime($tarih);
$tarih = date('Y-m-d H:i:s', $newtimestamp);
$ttarih = date('d.m.y', $newtimestamp);
$ssaat = date('H:i:s', $newtimestamp);
$mac_time = strtotime($tarih);

$farray = farray("SELECT id FROM program_rugby WHERE bulten = 'hititbet' AND mac_kodu = '".$mackodu."'");

if($farray['id'] < 1){
sed_sql_query("INSERT INTO program_rugby SET
ev_takim = '".$evsahibi."',
konuk_takim = '".$deplasman."',
mac_kodu = '".$mackodu."',
mac_tarih = '".$ttarih."',
mac_time = '".$mac_time."',
mbs = '1',
kupa_isim = '".$lig."',
kupa_id = '".$lig_id."',
kupa_ulke = '".$ulke."',
ulkeadi = '".$ulke." - ".$lig."',
bayrak = '".$bayrak."',
bulten = 'hititbet',
gunceldestek = '1',
songuncelleme = '".time()."',
kayittime = '".time()."',
istatistik = '".$betradarid."',
1x2_1 = '".$oran1x2_1."',
1x2_x = '".$oran1x2_2."',
1x2_2 = '".$oran1x2_3."',
aktif = '1'");
$macid = sed_sql_insertid();
print 'Kayıt Edildi';
}else{
sed_sql_query("UPDATE program_rugby SET	
mac_kodu = '".$mackodu."',
mac_tarih = '".$ttarih."',
mac_time = '".$mac_time."',
aktif = '1',
gunceldestek = '1',
1x2_1 = '".$oran1x2_1."',
1x2_x = '".$oran1x2_2."',
1x2_2 = '".$oran1x2_3."',
songuncelleme = '".time()."',
istatistik = '".$betradarid."'
WHERE mac_kodu = '".$mackodu."'");						
print 'Güncellendi';
}

print '<br>';

}

sed_sql_query("update program_rugby set aktif='0' where gunceldestek='0' and kupa_isim!='Duello'");

}


//mysql_close();
