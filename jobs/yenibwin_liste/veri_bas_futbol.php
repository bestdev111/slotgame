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
if($_GET['func'] == "iddaaesle"){
iddaaesle();
}
function canlilisteal(){
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://betwingo.xyz/api/jsonlar_bulten/futbol_json_liste.php");
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
curl_setopt($ch, CURLOPT_URL,"http://betwingo.xyz/api/jsonlar_bulten/futbol_oran_liste.php?veriidsigir=" . $macid);
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
    sed_sql_query("update program_futbol set gunceldestek='0' where kupa_isim!='Duello'");
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

$farray = farray("SELECT id FROM program_futbol WHERE bulten = 'hititbet' AND mac_kodu = '".$mackodu."'");

if($farray['id'] < 1){
sed_sql_query("INSERT INTO program_futbol SET
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
istatistik = '".$betradarid."',
songuncelleme = '".time()."',
kayittime = '".time()."',
aktif = '1'");
$macid = sed_sql_insertid();
print 'Kayıt Edildi';
}else{
sed_sql_query("UPDATE program_futbol SET	
mac_kodu = '".$mackodu."',
mac_tarih = '".$ttarih."',
mac_time = '".$mac_time."',
istatistik = '".$betradarid."',
aktif = '1',
gunceldestek = '1',
songuncelleme = '".time()."'
WHERE mac_kodu = '".$mackodu."'");						
print 'Güncellendi';
}

print '<br>';

}

sed_sql_query("update program_futbol set aktif='0' where gunceldestek='0' and kupa_isim!='Duello'");

print macguncelle();

}

function kontrolyap(){

$suan = time()-1800;

$kontrol_sql1 = sed_sql_query("select id from program_futbol where songuncelleme<$suan");

while($row1=sed_sql_fetcharray($kontrol_sql1)) {
sed_sql_query("delete from oranlar_futbol where mac_db_id='$row1[id]'");
sed_sql_query("delete from program_futbol where id='$row1[id]'");
}

}

function macguncelle(){
$time_ver = time();
$sql = sed_sql_query("SELECT mac_kodu, ev_takim, konuk_takim FROM program_futbol WHERE bulten = 'hititbet' AND mac_time > $time_ver");

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

function oranguncelle($bwinidsi,$ev_takim,$konuk_takim,$oran_val_id,$oran) {
if(!empty($oran)) {
$idbul = farray("SELECT id FROM program_futbol WHERE mac_kodu='".$bwinidsi."' and ev_takim='".$ev_takim."' and konuk_takim='".$konuk_takim."' and bulten='hititbet'");
$mac_db_id = $idbul['id'];
$mac_id = $idbul['mac_id'];
$otbul = farray("select * from oran_val_futbol where id='".$oran_val_id."'");
$kontrol = farray("SELECT id FROM oranlar_futbol where mac_db_id='".$mac_db_id."' and oran_val_id='".$oran_val_id."'");
if($kontrol['id'] < 1){
sed_sql_query("INSERT INTO oranlar_futbol SET
mac_db_id = '".$mac_db_id."',
oran_val_id = '".$oran_val_id."',
oran = '".$oran."',
gunceldestek = '1',
bulten = 'hititbet',
songuncelleme = '".time()."',
oran_tip = '".$otbul['oran_tip']."'");
} else {
sed_sql_query("UPDATE oranlar_futbol SET	
oran='".$oran."',
gunceldestek='1',
oran_tip='".$otbul['oran_tip']."',
songuncelleme = '".time()."'
where mac_db_id='".$mac_db_id."' and oran_val_id='".$oran_val_id."'");
}
}

}

function oranguncelleliste($bwinidsi,$ev_takim,$konuk_takim,$orantip,$oran) {
if(!empty($oran)) {
sed_sql_query("UPDATE program_futbol SET $orantip='".$oran."' where mac_kodu='".$bwinidsi."' and ev_takim='".$ev_takim."' and konuk_takim='".$konuk_takim."' and bulten='hititbet'");
}
}

function orankontrolyap(){

$suan = time()-1800;

$kontrol_sql2 = sed_sql_query("select id from oranlar_futbol where songuncelleme<$suan");

while($row2=sed_sql_fetcharray($kontrol_sql2)) {
sed_sql_query("delete from oranlar_futbol where id='$row2[id]'");
}

}

function macguncellexml($bwinidsi, $ev_takim, $konuk_takim){

$maclar = json_decode(macdetay($bwinidsi));

foreach($maclar->oranlar as $event){

$GameTemplateId = $event->GameTemplateId;

if($GameTemplateId == 1) { //Maç Sonucu
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,1,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,2,$event->oran2);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,3,$event->oran3);

oranguncelleliste($bwinidsi,$ev_takim,$konuk_takim,'evoran',$event->oran1);
oranguncelleliste($bwinidsi,$ev_takim,$konuk_takim,'beraberoran',$event->oran2);
oranguncelleliste($bwinidsi,$ev_takim,$konuk_takim,'deporan',$event->oran3);
}

if($GameTemplateId == 2) { //Handikap (0:1)
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,4,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,5,$event->oran2);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,6,$event->oran3);
}

if($GameTemplateId == 3) { //Handikap (1:0)
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,7,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,8,$event->oran2);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,9,$event->oran3);
}

if($GameTemplateId == 4) { //Handikap (0:2)
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,10,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,11,$event->oran2);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,12,$event->oran3);
}

if($GameTemplateId == 5) { //Handikap (2:0)
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,13,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,14,$event->oran2);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,15,$event->oran3);
}

if($GameTemplateId == 6) { //İlk Yarı Sonucu
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,16,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,17,$event->oran2);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,18,$event->oran3);
}

if($GameTemplateId == 7) { //İkinci Yarı Sonucu
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,19,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,20,$event->oran2);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,21,$event->oran3);
}

if($GameTemplateId == 8) { //1.Yarı Çifte Şans
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,22,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,23,$event->oran2);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,24,$event->oran3);
}

if($GameTemplateId == 9) { //İlk Yarı Karşılıklı Gol
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,25,$event->oran1);//evet
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,26,$event->oran2);//hayır
}

if($GameTemplateId == 10) { //Beraberlikte İade
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,27,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,28,$event->oran2);
}

if($GameTemplateId == 11) { //Toplam Gol Alt/Ust 0.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,29,$event->oran1);//alt
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,30,$event->oran2);//üst
}

if($GameTemplateId == 12) { //Toplam Gol Alt/Ust 1.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,31,$event->oran1);//alt
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,32,$event->oran2);//üst
}

if($GameTemplateId == 13) { //Toplam Gol Alt/Ust 2.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,33,$event->oran1);//alt
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,34,$event->oran2);//üst

oranguncelleliste($bwinidsi,$ev_takim,$konuk_takim,'alt25',$event->oran1);//alt
oranguncelleliste($bwinidsi,$ev_takim,$konuk_takim,'ust25',$event->oran2);//üst
}

if($GameTemplateId == 14) { //Toplam Gol Alt/Ust 3.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,35,$event->oran1);//alt
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,36,$event->oran2);//üst
}

if($GameTemplateId == 15) { //Toplam Gol Alt/Ust 4.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,37,$event->oran1);//alt
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,38,$event->oran2);//üst
}

if($GameTemplateId == 16) { //Toplam Gol Alt/Ust 5.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,39,$event->oran1);//alt
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,40,$event->oran2);//üst
}

if($GameTemplateId == 17) { //1.Yarı Toplam Gol Alt/Ust 0.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,41,$event->oran1);//alt
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,42,$event->oran2);//üst
}

if($GameTemplateId == 18) { //1.Yarı Toplam Gol Alt/Ust 1.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,43,$event->oran1);//alt
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,44,$event->oran2);//üst
}

if($GameTemplateId == 19) { //1.Yarı Toplam Gol Alt/Ust 2.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,45,$event->oran1);//alt
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,46,$event->oran2);//üst
}

if($GameTemplateId == 20) { //1.Yarı Toplam Gol Alt/Ust 3.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,47,$event->oran1);//alt
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,48,$event->oran2);//üst
}

if($GameTemplateId == 21) { //2.Yarı Toplam Gol Alt/Ust 0.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,49,$event->oran1);//alt
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,50,$event->oran2);//üst
}

if($GameTemplateId == 22) { //2.Yarı Toplam Gol Alt/Ust 1.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,51,$event->oran1);//alt
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,52,$event->oran2);//üst
}

if($GameTemplateId == 23) { //2.Yarı Toplam Gol Alt/Ust 2.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,53,$event->oran1);//alt
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,54,$event->oran2);//üst
}

if($GameTemplateId == 24) { //2.Yarı Toplam Gol Alt/Ust 3.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,55,$event->oran1);//alt
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,56,$event->oran2);//üst
}

if($GameTemplateId == 25) { //Ev Sahibi Gol Atarmı ?
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,57,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,58,$event->oran2);
}

if($GameTemplateId == 26) { //Deplasman Gol Atarmı ?
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,59,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,60,$event->oran2);
}

if($GameTemplateId == 27) { //Karşılıklı Gol
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,61,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,62,$event->oran2);
}

if($GameTemplateId == 28) { //​​​​​1Y Tek/Çift
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,63,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,64,$event->oran2);
}

if($GameTemplateId == 29) { //Tek/Çift
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,65,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,66,$event->oran2);
}

if($GameTemplateId == 30) { //Evsahibi Kaç Gol Atar ?
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,67,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,68,$event->oran2);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,69,$event->oran3);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,70,$event->oran4);
}

if($GameTemplateId == 31) { //Deplasman Kaç Gol Atar ?
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,71,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,72,$event->oran2);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,73,$event->oran3);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,74,$event->oran4);
}

if($GameTemplateId == 32) { //Evsahibi 1.Yarı Kaç Gol Atar ?
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,75,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,76,$event->oran2);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,77,$event->oran3);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,78,$event->oran4);
}

if($GameTemplateId == 33) { //Evsahibi 2.Yarı Kaç Gol Atar ?
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,79,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,80,$event->oran2);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,81,$event->oran3);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,82,$event->oran4);
}

if($GameTemplateId == 34) { //Deplasman 1.Yarı Kaç Gol Atar ?
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,83,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,84,$event->oran2);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,85,$event->oran3);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,86,$event->oran4);
}

if($GameTemplateId == 35) { //Deplasman 2.Yarı Kaç Gol Atar ?
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,87,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,88,$event->oran2);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,89,$event->oran3);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,90,$event->oran4);
}

if($GameTemplateId == 36) { //Evsahibi 1.Yarı Ü/A 0.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,91,$event->oran1);//alt
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,92,$event->oran2);//üst
}

if($GameTemplateId == 37) { //Evsahibi 1.Yarı Ü/A 1.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,93,$event->oran1);//alt
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,94,$event->oran2);//üst
}

if($GameTemplateId == 38) { //Deplasman 1.Yarı Ü/A 0.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,95,$event->oran1);//alt
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,96,$event->oran2);//üst
}

if($GameTemplateId == 39) { //Deplasman 1.Yarı Ü/A 1.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,97,$event->oran1);//alt
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,98,$event->oran2);//üst
}

if($GameTemplateId == 40) { //Evsahibi Ü/A 1.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,99,$event->oran1);//alt
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,100,$event->oran2);//üst
}

if($GameTemplateId == 41) { //Deplasman Ü/A 1.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,101,$event->oran1);//alt
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,102,$event->oran2);//üst
}

if($GameTemplateId == 42) { //​​​​​Evsahibi Her 2 yarıda Gol Atar ?
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,103,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,104,$event->oran2);
}

if($GameTemplateId == 43) { //​​​​​Deplasman Her 2 yarıda Gol Atar ?
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,105,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,106,$event->oran2);
}

if($GameTemplateId == 44) { //​​​​​Hangi Devrede Fazla Gol Olur
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,107,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,108,$event->oran2);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,109,$event->oran3);
}

if($GameTemplateId == 45) { //Evsahibi Hangi Devrede Fazla Gol Atar ?
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,110,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,111,$event->oran2);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,112,$event->oran3);
}

if($GameTemplateId == 46) { //Deplasman Hangi Devrede Fazla Gol Atar ?
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,113,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,114,$event->oran2);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,115,$event->oran3);
}

if($GameTemplateId == 47) { //Müsabakada kaç gol atılır? (0-4+)
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,116,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,117,$event->oran2);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,118,$event->oran3);
}

if($GameTemplateId == 48) { //Müsabakada kaç gol atılır? (0-5+)
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,119,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,120,$event->oran2);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,121,$event->oran3);
}

if($GameTemplateId == 49) { //​​​​​Müsabakada kaç gol atılır? (0-6+)
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,122,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,123,$event->oran2);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,124,$event->oran3);
}

if($GameTemplateId == 50) { //​​​​​Herhangi bir takım 1 gol farkla kazanır mı?
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,125,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,126,$event->oran2);
}

if($GameTemplateId == 51) { //​​​​​Herhangi bir takım 2 gol farkla kazanır mı?
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,127,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,128,$event->oran2);
}

if($GameTemplateId == 52) { //Herhangi bir takım 3 gol farkla kazanır mı?
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,129,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,130,$event->oran2);
}

if($GameTemplateId == 53) { //​​​​​1X2 ve toplam gol sayısı
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,131,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,132,$event->oran2);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,133,$event->oran3);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,134,$event->oran4);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,135,$event->oran5);
}

if($GameTemplateId == 54) { //Maç sonucu ve karşılıklı goller
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,136,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,137,$event->oran2);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,138,$event->oran3);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,139,$event->oran4);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,140,$event->oran5);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,141,$event->oran6);
}

if($GameTemplateId == 55) { //​​​​​İlk Yarı / Maç Sonucu
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,142,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,143,$event->oran2);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,144,$event->oran3);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,145,$event->oran4);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,146,$event->oran5);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,147,$event->oran6);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,148,$event->oran7);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,149,$event->oran8);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,150,$event->oran9);
}

if($GameTemplateId == 56) { //​​​​​Skor Bahsi (90 Dakika)
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,151,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,152,$event->oran2);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,153,$event->oran3);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,154,$event->oran4);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,155,$event->oran5);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,156,$event->oran6);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,157,$event->oran7);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,158,$event->oran8);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,159,$event->oran9);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,160,$event->oran10);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,161,$event->oran11);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,162,$event->oran12);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,163,$event->oran13);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,164,$event->oran14);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,165,$event->oran15);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,166,$event->oran16);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,167,$event->oran17);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,168,$event->oran18);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,169,$event->oran19);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,170,$event->oran20);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,171,$event->oran21);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,172,$event->oran22);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,173,$event->oran23);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,174,$event->oran24);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,175,$event->oran25);
}

if($GameTemplateId == 57) { //​​​​​Çifte Şans
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,176,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,177,$event->oran2);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,178,$event->oran3);

oranguncelleliste($bwinidsi,$ev_takim,$konuk_takim,'cf1x',$event->oran1);
oranguncelleliste($bwinidsi,$ev_takim,$konuk_takim,'cfx2',$event->oran2);
oranguncelleliste($bwinidsi,$ev_takim,$konuk_takim,'cf12',$event->oran3);
}

if($GameTemplateId == 60) { //Musabakada kac sari kart gosterilir? 3.5 alt üst
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,179,$event->oran1);//üst
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,180,$event->oran2);//alt
}

if($GameTemplateId == 61) { //Kirmizi kart cikar mi?
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,181,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,182,$event->oran2);
}

if($GameTemplateId == 62) { //​​​​​Macta kac tane penalti olur?
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,183,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,184,$event->oran2);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,185,$event->oran3);
}

if($GameTemplateId == 63) { //​​​​​1. takim kac sari kart gorur? 1.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,186,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,187,$event->oran2);
}

if($GameTemplateId == 64) { //​​​​​1. takim kac sari kart gorur? 2.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,188,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,189,$event->oran2);
}

if($GameTemplateId == 65) { //​​​​​1. takim kac sari kart gorur? 3.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,190,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,191,$event->oran2);
}

if($GameTemplateId == 66) { //​​​​​2. takim kac sari kart gorur? 1.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,192,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,193,$event->oran2);
}

if($GameTemplateId == 67) { //​​​​​2. takim kac sari kart gorur? 2.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,194,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,195,$event->oran2);
}

if($GameTemplateId == 68) { //​​​​​2. takim kac sari kart gorur? 3.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,196,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,197,$event->oran2);
}

if($GameTemplateId == 69) { //​​​​​Sari kart sayisi tek mi cift mi olur?
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,198,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,199,$event->oran2);
}

if($GameTemplateId == 70) { //Hangi takim daha cok sari kart gorur?
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,200,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,201,$event->oran2);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,202,$event->oran3);
}

if($GameTemplateId == 71) { //Macta toplam kac korner atisi kullanilir? 5.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,203,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,204,$event->oran2);
}

if($GameTemplateId == 72) { //Macta toplam kac korner atisi kullanilir? 6.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,205,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,206,$event->oran2);
}

if($GameTemplateId == 73) { //Macta toplam kac korner atisi kullanilir? 7.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,207,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,208,$event->oran2);
}

if($GameTemplateId == 74) { //​​​​​Macta toplam kac korner atisi kullanilir? 8.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,209,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,210,$event->oran2);
}

if($GameTemplateId == 75) { //Macta toplam kac korner atisi kullanilir? 9.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,211,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,212,$event->oran2);
}

if($GameTemplateId == 76) { //Macta toplam kac korner atisi kullanilir? 10.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,213,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,214,$event->oran2);
}

if($GameTemplateId == 77) { //Macta toplam kac korner atisi kullanilir? 11.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,215,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,216,$event->oran2);
}

if($GameTemplateId == 78) { //Macta toplam kac korner atisi kullanilir? 12.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,217,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,218,$event->oran2);
}

if($GameTemplateId == 79) { //Macta toplam kac korner atisi kullanilir? 13.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,219,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,220,$event->oran2);
}

if($GameTemplateId == 80) { //Macta toplam kac korner atisi kullanilir? 14.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,221,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,222,$event->oran2);
}

if($GameTemplateId == 81) { //Macta toplam kac korner atisi kullanilir? 15.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,223,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,224,$event->oran2);
}

if($GameTemplateId == 82) { //​​​​​1. takim toplam kac tane korner kullanir? 2.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,225,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,226,$event->oran2);
}

if($GameTemplateId == 83) { //1. takim toplam kac tane korner kullanir? 3.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,227,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,228,$event->oran2);
}

if($GameTemplateId == 84) { //​​​​​1. takim toplam kac tane korner kullanir? 4.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,229,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,230,$event->oran2);
}

if($GameTemplateId == 85) { //​​​​​1. takim toplam kac tane korner kullanir? 5.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,231,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,232,$event->oran2);
}

if($GameTemplateId == 86) { //​​​​​1. takim toplam kac tane korner kullanir? 6.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,233,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,234,$event->oran2);
}

if($GameTemplateId == 87) { //​​​​​1. takim toplam kac tane korner kullanir? 7.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,235,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,236,$event->oran2);
}

if($GameTemplateId == 88) { //​​​​​1. takim toplam kac tane korner kullanir? 8.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,237,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,238,$event->oran2);
}

if($GameTemplateId == 89) { //​​​​​1. takim toplam kac tane korner kullanir? 9.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,239,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,240,$event->oran2);
}

if($GameTemplateId == 90) { //​​​​​1. takim toplam kac tane korner kullanir? 10.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,241,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,242,$event->oran2);
}

if($GameTemplateId == 91) { //​​​​​2. takim toplam kac tane korner kullanir? 2.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,243,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,244,$event->oran2);
}

if($GameTemplateId == 92) { //​​​​​2. takim toplam kac tane korner kullanir? 3.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,245,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,246,$event->oran2);
}

if($GameTemplateId == 93) { //2. takim toplam kac tane korner kullanir? 4.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,247,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,248,$event->oran2);
}

if($GameTemplateId == 94) { //​​​​​2. takim toplam kac tane korner kullanir? 5.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,249,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,250,$event->oran2);
}

if($GameTemplateId == 95) { //​​​​​2. takim toplam kac tane korner kullanir? 6.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,251,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,252,$event->oran2);
}

if($GameTemplateId == 96) { //​​​​​2. takim toplam kac tane korner kullanir? 7.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,253,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,254,$event->oran2);
}

if($GameTemplateId == 97) { //​​​​​2. takim toplam kac tane korner kullanir? 8.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,255,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,256,$event->oran2);
}

if($GameTemplateId == 98) { //​​​​​2. takim toplam kac tane korner kullanir? 9.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,257,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,258,$event->oran2);
}

if($GameTemplateId == 99) { //​​​​​2. takim toplam kac tane korner kullanir? 10.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,259,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,260,$event->oran2);
}

if($GameTemplateId == 100) { //​​​​​Korner sayisi tek mi cift mi olur?
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,261,$event->oran1);//çift
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,262,$event->oran2);//tek
}

if($GameTemplateId == 101) { //​​​​​Hangi takim daha cok korner kullanir?
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,263,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,264,$event->oran2);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,265,$event->oran3);
}

if($GameTemplateId == 102) { //​​​​​1X2 ve toplam gol sayısı 3.5
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,266,$event->oran1);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,267,$event->oran2);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,268,$event->oran3);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,269,$event->oran4);
oranguncelle($bwinidsi,$ev_takim,$konuk_takim,270,$event->oran5);
}

}
print 'Güncellendi<br>';
}


//mysql_close();
