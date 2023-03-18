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
}
if($_GET['func'] == "macguncelle"){
macguncelle();
}

function canlilisteal(){
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://betwingo.xyz/api/jsonlar_bulten/buzhokeyi_json_liste.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 5);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,5); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$url_cikti = curl_exec($ch);
$curl_info = curl_getinfo($ch);
curl_close($ch);
return $url_cikti;
}

function macdetay($macid){
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"http://betwingo.xyz/api/jsonlar_bulten/buzhokeyi_oran_liste.php?veriidsigir=" . $macid);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 5);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,5); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$url_cikti = curl_exec($ch);
$curl_info = curl_getinfo($ch);
curl_close($ch);
if($curl_info["http_code"] == 200){
return $url_cikti;
}else{
return macdetay($macid);
}
}

function MacListesi(){

$maclar = json_decode(canlilisteal());

$toplammac = count($maclar->veriler);
if($toplammac > 1) {
    sed_sql_query("update program_buzhokeyi set gunceldestek='0' where kupa_isim!='Duello'");
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

$newtimestamp = strtotime($tarih);
$tarih = date('Y-m-d H:i:s', $newtimestamp);
$ttarih = date('d.m.y', $newtimestamp);
$ssaat = date('H:i:s', $newtimestamp);
$mac_time = strtotime($tarih);

$farray = farray("SELECT id FROM program_buzhokeyi WHERE bulten = 'hititbet' AND mac_kodu = '".$mackodu."'");

if($farray['id'] < 1){
sed_sql_query("INSERT INTO program_buzhokeyi SET
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
bayrak = '',
bulten = 'hititbet',
gunceldestek = '1',
istatistik = '".$betradarid."',
songuncelleme = '".time()."',
kayittime = '".time()."',
aktif = '1'");
$macid = sed_sql_insertid();
print 'Kayıt Edildi';
}else{
sed_sql_query("UPDATE program_buzhokeyi SET	
mac_kodu = '".$mackodu."',
mac_tarih = '".$ttarih."',
mac_time = '".$mac_time."',
aktif = '1',
gunceldestek = '1',
songuncelleme = '".time()."',
istatistik = '".$betradarid."'
WHERE mac_kodu = '".$mackodu."'");						
print 'Güncellendi';
}

print '<br>';

}

sed_sql_query("update program_buzhokeyi set aktif='0' where gunceldestek='0' and kupa_isim!='Duello'");

print macguncelle();

}

function kontrolyap(){

$suan = time()-1800;

$kontrol_sql1 = sed_sql_query("select id from program_buzhokeyi where songuncelleme<$suan");

while($row1=sed_sql_fetcharray($kontrol_sql1)) {
sed_sql_query("delete from oranlar_buzhokeyi where mac_db_id='$row1[id]'");
sed_sql_query("delete from program_buzhokeyi where id='$row1[id]'");
}

}

function macguncelle(){
$time_ver = time();
$sql = sed_sql_query("SELECT mac_kodu, ev_takim, konuk_takim FROM program_buzhokeyi WHERE bulten = 'hititbet' AND mac_time > $time_ver ORDER BY kayittime DESC");

$return = '';
$maclar = array();
$events = array();
while($read = sed_sql_fetcharray($sql)){
print $read['mac_kodu'] . ' - ';
$mac_kodu = $read['mac_kodu'];
$ev_takim = $read['ev_takim'];
$konuk_takim = $read['konuk_takim'];
print macguncellexml($mac_kodu,$ev_takim,$konuk_takim);
}
}

function oranguncelle($betarenaid,$ev_takim,$konuk_takim,$oran_val_id,$oran) {
if(!empty($oran)) {
$idbul = farray("SELECT id FROM program_buzhokeyi WHERE mac_kodu='".$betarenaid."' and ev_takim='".$ev_takim."' and konuk_takim='".$konuk_takim."' and bulten='hititbet'");
$mac_db_id = $idbul['id'];
$mac_id = $idbul['mac_id'];
$otbul = farray("select * from oran_val_buzhokeyi where id='".$oran_val_id."'");
$kontrol = farray("SELECT id FROM oranlar_buzhokeyi where mac_db_id='".$mac_db_id."' and oran_val_id='".$oran_val_id."'");
if($kontrol['id'] < 1){
sed_sql_query("INSERT INTO oranlar_buzhokeyi SET
mac_db_id = '".$mac_db_id."',
oran_val_id = '".$oran_val_id."',
oran = '".$oran."',
gunceldestek = '1',
songuncelleme = '".time()."',
oran_tip = '".$otbul['oran_tip']."'");
} else {
sed_sql_query("UPDATE oranlar_buzhokeyi SET	
oran='".$oran."',
gunceldestek='1',
oran_tip='".$otbul['oran_tip']."',
songuncelleme = '".time()."'
where mac_db_id='".$mac_db_id."' and oran_val_id='".$oran_val_id."'");
}
}
print orankontrolyap();
}

function orankontrolyap(){

$suan = time()-1800;

$kontrol_sql2 = sed_sql_query("select id from oranlar_buzhokeyi where songuncelleme<$suan");

while($row2=sed_sql_fetcharray($kontrol_sql2)) {
sed_sql_query("delete from oranlar_buzhokeyi where id='$row2[id]'");
}

}

function macguncellexml($betarenaid, $ev_takim, $konuk_takim){

$maclar = json_decode(macdetay($betarenaid));

foreach($maclar->oranlar as $event){

$GameTemplateId = $event->GameTemplateId;

if($GameTemplateId == 2) { //1X2
oranguncelle($betarenaid,$ev_takim,$konuk_takim,17,$event->oran1);
oranguncelle($betarenaid,$ev_takim,$konuk_takim,18,$event->oran2);
oranguncelle($betarenaid,$ev_takim,$konuk_takim,19,$event->oran3);
}

if($GameTemplateId == 3) { //1.P 1X2
oranguncelle($betarenaid,$ev_takim,$konuk_takim,20,$event->oran1);
oranguncelle($betarenaid,$ev_takim,$konuk_takim,21,$event->oran2);
oranguncelle($betarenaid,$ev_takim,$konuk_takim,22,$event->oran3);
}

if($GameTemplateId == 4) { //2.P 1X2
oranguncelle($betarenaid,$ev_takim,$konuk_takim,23,$event->oran1);
oranguncelle($betarenaid,$ev_takim,$konuk_takim,24,$event->oran2);
oranguncelle($betarenaid,$ev_takim,$konuk_takim,25,$event->oran3);
}

if($GameTemplateId == 5) { //3.P 1X2
oranguncelle($betarenaid,$ev_takim,$konuk_takim,26,$event->oran1);
oranguncelle($betarenaid,$ev_takim,$konuk_takim,27,$event->oran2);
oranguncelle($betarenaid,$ev_takim,$konuk_takim,28,$event->oran3);
}

if($GameTemplateId == 6) { //Cifte Sans
oranguncelle($betarenaid,$ev_takim,$konuk_takim,29,$event->oran1);
oranguncelle($betarenaid,$ev_takim,$konuk_takim,30,$event->oran2);
oranguncelle($betarenaid,$ev_takim,$konuk_takim,31,$event->oran3);
}

if($GameTemplateId == 7) { //1.P Cifte Sans
oranguncelle($betarenaid,$ev_takim,$konuk_takim,32,$event->oran1);
oranguncelle($betarenaid,$ev_takim,$konuk_takim,33,$event->oran2);
oranguncelle($betarenaid,$ev_takim,$konuk_takim,34,$event->oran3);
}

if($GameTemplateId == 8) { //2.P Cifte Sans
oranguncelle($betarenaid,$ev_takim,$konuk_takim,35,$event->oran1);
oranguncelle($betarenaid,$ev_takim,$konuk_takim,36,$event->oran2);
oranguncelle($betarenaid,$ev_takim,$konuk_takim,37,$event->oran3);
}

if($GameTemplateId == 9) { //3.P Cifte Sans
oranguncelle($betarenaid,$ev_takim,$konuk_takim,38,$event->oran1);
oranguncelle($betarenaid,$ev_takim,$konuk_takim,39,$event->oran2);
oranguncelle($betarenaid,$ev_takim,$konuk_takim,40,$event->oran3);
}



}
print 'Güncellendi<br>';
}


//mysql_close();
