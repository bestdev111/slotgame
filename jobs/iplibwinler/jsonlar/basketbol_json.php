<?php
$mac_id = $_GET['eventid'];

if($mac_id){
error_reporting(0);
header('Content-type: application/json'); 



function LiveTRmsg($msg = 0){
$r = array('Number of 2-pointers scored in 1. half','Number of 2-pointers scored in 2. quarter','Number of 3-pointers scored in 1. half','Number of 3-pointers scored in 2. quarter','Number of fouls in 1. half','Number of Fouls in','Number of points in 1. half','Team to score last in 2. quarter','Number of points in 2. quarter','Number of free throws in 1. half','Number of free throws in 2. quarter','Timeout ended','Timeout','free throw missed','quarter intermission','Number of 2-pointers scored in 1. quarter','Number of 3-pointers scored in 1. quarter','Team to score last in 1. quarter','quarter Score','quarter Total','Number of points in 1. quarter','Number of free throws in 1. quarter','2 free throws are issued to team','free throw scored','1 free throws are issued to team','3-pointer scored','foul','2-pointer scored','quarter','1st','2nd','3rd','4th','5th','6th','7th','8th','9th','10th','11th','12th','13th','14th','15th','16th','17th','18th','19th','20th','21th','22th','23th','24th','25th','26th','27th','28th','29th','30th','31th','32th','33th','34th','35th','36th','37th','38th','39th','40th','41th','42th','43th','44th','45th','46th','47th','48th','49th','50th','51th','52th','53th','54th','55th','56th','57th','58th','59th','60th','61th','62th','63th','64th','65th','66th','67th','68th','69th','70th','71th','72th','73th','74th','75th','76th','77th','78th','79th','80th','81th','82th','83th','84th','85th','86th','87th','88th','89th','90th','91th','92th','93th','94th','95th','96th','97th','98th','99th','100th');
$rp = array('Toplam Sayı 1.Yarı','2.Çeyrekte Atılan 2\'lik Atışlar','3\'Lük Toplam Sayı 1.Yarı','2.Çeyrekte Atılan 3\'Lük Atışlar','Toplam Foul Sayısı 1.Yarı','Toplam Foul Sayısı','1.Yarıdaki Puan Sayısı','Son Atılan Sayı 2. Çeyrek','2.Çeyrekteki Puan Sayısı','Toplam Serbest Atış 1.Yarı','Toplam Serbest Atış 1.Çeyrek','Mola Bitti','Mola','Serbest Atış Kaçırdı','Çeyrek Tamamlandı','1.Çeyrekte Atılan 2\'Lik Atışlar','1.Çeyrekte Atılan 3\'Lük Atışlar','Son Atılan Sayı 1.Çeyrek','Çeyrek Sayısı','Çeyrek Toplam','1.Çeyrekteki Puan Sayısı','Toplam Serbest Atış 1.Çeyrek','Takıma 2 Serbest Atış Hakkı Verildi','Serbest Atış Kullandı','Takıma 1 Serbest Atış Hakkı Verildi','3 Sayılık Puan','Foul','2 Sayılık Puan','Çeyrek','1.','2.','3.','4.','5.','6.','7.','8.','9.','10.','11.','12.','13.','14.','15.','16.','17.','18.','19.','20.','21.','22.','23.','24.','25.','26.','27.','28.','29.','30.','31.','32.','33.','34.','35.','36.','37.','38.','39.','40.','41.','42.','43.','44.','45.','46.','47.','48.','49.','50.','51.','52.','53.','54.','55.','56.','57.','58.','59.','60.','61.','62.','63.','64.','65.','66.','67.','68.','69.','70.','71.','72.','73.','74.','75.','76.','77.','78.','79.','80.','81.','82.','83.','84.','85.','86.','87.','88.','89.','90.','91.','92.','93.','94.','95.','96.','97.','98.','99.','100.');
return str_replace($r,$rp,$msg);
}

function bahisVeri($id) {
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://betwingo.xyz/api/canli_bilgiler_oran.php?tip=basketbol&id=".$id."");
// curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
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
return bahisVeri($id);
}
}

$bahisler = bahisVeri($mac_id);
$maclar = json_decode($bahisler);

foreach($maclar as $match){

$evin_sayisi = "01";
$konukun_sayisi = "02";
$count_sayisi_ver = 255;

$betradarid = (int)$match->radarid;
$lig_id = $match->lid;
$lig_adi = $match->lig;
$ulke_id = $match->uid;
$ulke_adi = $match->ulke;
$evtakim = $match->h;
$deptakim = $match->a;

$json['veriler']['veri'] = array("betradarid"=>$lig_id);

foreach($match->Msg as $messagesver){
$mesajtypesi = $messagesver->type;
$mesajtime = $messagesver->dk;
$aciklamasi = LiveTRmsg($messagesver->N);

$json['veriler']['messages'][] = array("mesajtypesi"=>$mesajtypesi,"mesajtime"=>$mesajtime,"aciklamasi"=>$aciklamasi);

}

foreach($match->oran as $oranlar){
$GameTemplateId = $oranlar->tempid;
$icoranlar = $oranlar->rest;

if($GameTemplateId == 15025) {

$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"1","detay"=>"1X2 (Uz. Hariç)","oran_adi_1"=>"1","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"X","oran2"=>$oran2,"visible2"=>$visible2,"oran_adi_3"=>"2","oran3"=>$oran3,"visible3"=>$visible3);
}

}


if($GameTemplateId == 19849) {

$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"2","detay"=>"1X2(1.YARI)","oran_adi_1"=>"1","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"X","oran2"=>$oran2,"visible2"=>$visible2,"oran_adi_3"=>"2","oran3"=>$oran3,"visible3"=>$visible3);
}

}

if($GameTemplateId == 31511) {

$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"3","detay"=>"1X2(2.YARI)","oran_adi_1"=>"1","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"X","oran2"=>$oran2,"visible2"=>$visible2,"oran_adi_3"=>"2","oran3"=>$oran3,"visible3"=>$visible3);
}

}

if($GameTemplateId == 31512) {

$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"4","detay"=>"1X2(1.Çeyrek)","oran_adi_1"=>"1","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"X","oran2"=>$oran2,"visible2"=>$visible2,"oran_adi_3"=>"2","oran3"=>$oran3,"visible3"=>$visible3);
}

}

if($GameTemplateId == 31513) {

$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"5","detay"=>"1X2(2.Çeyrek)","oran_adi_1"=>"1","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"X","oran2"=>$oran2,"visible2"=>$visible2,"oran_adi_3"=>"2","oran3"=>$oran3,"visible3"=>$visible3);
}

}

if($GameTemplateId == 31514) {

$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"6","detay"=>"1X2(3.Çeyrek)","oran_adi_1"=>"1","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"X","oran2"=>$oran2,"visible2"=>$visible2,"oran_adi_3"=>"2","oran3"=>$oran3,"visible3"=>$visible3);
}

}

if($GameTemplateId == 31515) {

$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"7","detay"=>"1X2(4.Çeyrek)","oran_adi_1"=>"1","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"X","oran2"=>$oran2,"visible2"=>$visible2,"oran_adi_3"=>"2","oran3"=>$oran3,"visible3"=>$visible3);
}

}

if($GameTemplateId == 66) {

$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"8","detay"=>"Kim Kazanır (Uz. Dahil)","oran_adi_1"=>"1","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"2","oran2"=>$oran2,"visible2"=>$visible2);
}

}

if($GameTemplateId == 14610) {

$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"9","detay"=>"1.Çeyrek Kim Kazanır","oran_adi_1"=>"1","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"2","oran2"=>$oran2,"visible2"=>$visible2);
}

}

if($GameTemplateId == 20127) {

$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"10","detay"=>"2.Çeyrek Kim Kazanır","oran_adi_1"=>"1","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"2","oran2"=>$oran2,"visible2"=>$visible2);
}

}

if($GameTemplateId == 20128) {

$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"11","detay"=>"3.Çeyrek Kim Kazanır","oran_adi_1"=>"1","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"2","oran2"=>$oran2,"visible2"=>$visible2);
}

}

if($GameTemplateId == 20129) {

$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"12","detay"=>"4.Çeyrek Kim Kazanır","oran_adi_1"=>"1","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"2","oran2"=>$oran2,"visible2"=>$visible2);
}

}

if($GameTemplateId == 102) {

$oran2 = number_format($icoranlar[0]->Odds,2);
$oran1 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$alt_ust_getir = $icoranlar[0]->Name;
$alt_ust_bol = explode(" ",$alt_ust_getir);
$ust_ver = $alt_ust_bol[1];

if($ust_ver != ''){
$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"13","detay"=>"Toplam Skor Alt/Üst","secenek"=>$ust_ver,"oran_adi_1"=>"Alt ".$ust_ver."","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"Üst ".$ust_ver."","oran2"=>$oran2,"visible2"=>$visible2);
}
}

}

if($GameTemplateId == 7356) {

$oran2 = number_format($icoranlar[0]->Odds,2);
$oran1 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$alt_ust_getir = $icoranlar[0]->Name;
$alt_ust_bol = explode(" ",$alt_ust_getir);
$ust_ver = $alt_ust_bol[1];

if($ust_ver != ''){
$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"14","detay"=>"1.Çeyrek Toplam Alt/Üst","secenek"=>$ust_ver,"oran_adi_1"=>"Alt ".$ust_ver."","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"Üst ".$ust_ver."","oran2"=>$oran2,"visible2"=>$visible2);
}
}

}

if($GameTemplateId == 17588) {

$oran2 = number_format($icoranlar[0]->Odds,2);
$oran1 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$alt_ust_getir = $icoranlar[0]->Name;
$alt_ust_bol = explode(" ",$alt_ust_getir);
$ust_ver = $alt_ust_bol[1];

if($ust_ver != ''){
$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"15","detay"=>"2.Çeyrek Toplam Alt/Üst","secenek"=>$ust_ver,"oran_adi_1"=>"Alt ".$ust_ver."","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"Üst ".$ust_ver."","oran2"=>$oran2,"visible2"=>$visible2);
}
}

}

if($GameTemplateId == 17589) {

$oran2 = number_format($icoranlar[0]->Odds,2);
$oran1 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$alt_ust_getir = $icoranlar[0]->Name;
$alt_ust_bol = explode(" ",$alt_ust_getir);
$ust_ver = $alt_ust_bol[1];

if($ust_ver != ''){
$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"16","detay"=>"3.Çeyrek Toplam Alt/Üst","secenek"=>$ust_ver,"oran_adi_1"=>"Alt ".$ust_ver."","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"Üst ".$ust_ver."","oran2"=>$oran2,"visible2"=>$visible2);
}
}

}

if($GameTemplateId == 17590) {

$oran2 = number_format($icoranlar[0]->Odds,2);
$oran1 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$alt_ust_getir = $icoranlar[0]->Name;
$alt_ust_bol = explode(" ",$alt_ust_getir);
$ust_ver = $alt_ust_bol[1];

if($ust_ver != ''){
$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"17","detay"=>"4.Çeyrek Toplam Alt/Üst","secenek"=>$ust_ver,"oran_adi_1"=>"Alt ".$ust_ver."","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"Üst ".$ust_ver."","oran2"=>$oran2,"visible2"=>$visible2);
}
}

}

if($GameTemplateId == 12426) {

$oran2 = number_format($icoranlar[0]->Odds,2);
$oran1 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$alt_ust_getir = $icoranlar[0]->Name;
$alt_ust_bol = explode(" ",$alt_ust_getir);
$ust_ver = $alt_ust_bol[1];

if($ust_ver != ''){

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"18","detay"=>"1.Takım Toplam Alt/Üst","secenek"=>$ust_ver,"oran_adi_1"=>"Alt ".$ust_ver."","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"Üst ".$ust_ver."","oran2"=>$oran2,"visible2"=>$visible2);
}

}

}

if($GameTemplateId == 18191) {

$oran2 = number_format($icoranlar[0]->Odds,2);
$oran1 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$alt_ust_getir = $icoranlar[0]->Name;
$alt_ust_bol = explode(" ",$alt_ust_getir);
$ust_ver = $alt_ust_bol[1];

if($ust_ver != ''){

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"19","detay"=>"2.Takım Toplam Alt/Üst","secenek"=>$ust_ver,"oran_adi_1"=>"Alt ".$ust_ver."","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"Üst ".$ust_ver."","oran2"=>$oran2,"visible2"=>$visible2);
}

}

}

if($GameTemplateId == 12811) {

$oran2 = number_format($icoranlar[0]->Odds,2);
$oran1 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$alt_ust_getir = $icoranlar[0]->Name;
$alt_ust_bol = explode(" ",$alt_ust_getir);
$ust_ver = $alt_ust_bol[1];

if($ust_ver != ''){

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"20","detay"=>"1.Takım 1.Yarı Toplam Alt/Üst","secenek"=>$ust_ver,"oran_adi_1"=>"Alt ".$ust_ver."","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"Üst ".$ust_ver."","oran2"=>$oran2,"visible2"=>$visible2);
}

}

}

if($GameTemplateId == 18188) {

$oran2 = number_format($icoranlar[0]->Odds,2);
$oran1 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$alt_ust_getir = $icoranlar[0]->Name;
$alt_ust_bol = explode(" ",$alt_ust_getir);
$ust_ver = $alt_ust_bol[1];

if($ust_ver != ''){

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"21","detay"=>"2.Takım 1.Yarı Toplam Alt/Üst","secenek"=>$ust_ver,"oran_adi_1"=>"Alt ".$ust_ver."","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"Üst ".$ust_ver."","oran2"=>$oran2,"visible2"=>$visible2);
}

}

}

if($GameTemplateId == 7699) {

$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);

$ev_sahibi_handikap = $icoranlar[0]->attr;
$deplasman_handikap = $icoranlar[1]->attr;

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"22","detay"=>"Handikap","oran_adi_1"=>"1 ".$ev_sahibi_handikap."","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"2 ".$deplasman_handikap."","oran2"=>$oran2,"visible2"=>$visible2);
}

}

if($GameTemplateId == 7698) {

$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);

$ev_sahibi_handikap = $icoranlar[0]->attr;
$deplasman_handikap = $icoranlar[1]->attr;

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"23","detay"=>"1.Yarı Handikap","oran_adi_1"=>"1 ".$ev_sahibi_handikap."","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"2 ".$deplasman_handikap."","oran2"=>$oran2,"visible2"=>$visible2);
}

}

if($GameTemplateId == 11305) {

$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);

$ev_sahibi_handikap = $icoranlar[0]->attr;
$deplasman_handikap = $icoranlar[1]->attr;

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"24","detay"=>"2.Yarı Handikap","oran_adi_1"=>"1 ".$ev_sahibi_handikap."","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"2 ".$deplasman_handikap."","oran2"=>$oran2,"visible2"=>$visible2);
}

}

if($GameTemplateId == 7332) {

$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);

$ev_sahibi_handikap = $icoranlar[0]->attr;
$deplasman_handikap = $icoranlar[1]->attr;

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"25","detay"=>"1.Çeyrek Handikap","oran_adi_1"=>"1 ".$ev_sahibi_handikap."","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"2 ".$deplasman_handikap."","oran2"=>$oran2,"visible2"=>$visible2);
}

}

if($GameTemplateId == 7357) {

$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);

$ev_sahibi_handikap = $icoranlar[0]->attr;
$deplasman_handikap = $icoranlar[1]->attr;

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"26","detay"=>"2.Çeyrek Handikap","oran_adi_1"=>"1 ".$ev_sahibi_handikap."","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"2 ".$deplasman_handikap."","oran2"=>$oran2,"visible2"=>$visible2);
}

}

if($GameTemplateId == 11306) {

$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);

$ev_sahibi_handikap = $icoranlar[0]->attr;
$deplasman_handikap = $icoranlar[1]->attr;

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"27","detay"=>"3.Çeyrek Handikap","oran_adi_1"=>"1 ".$ev_sahibi_handikap."","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"2 ".$deplasman_handikap."","oran2"=>$oran2,"visible2"=>$visible2);
}

}

if($GameTemplateId == 2837) {

$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);

$ev_sahibi_handikap = $icoranlar[0]->attr;
$deplasman_handikap = $icoranlar[1]->attr;

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"28","detay"=>"4.Çeyrek Handikap","oran_adi_1"=>"1 ".$ev_sahibi_handikap."","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"2 ".$deplasman_handikap."","oran2"=>$oran2,"visible2"=>$visible2);
}

}

if($GameTemplateId == 12173) {

$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"29","detay"=>"1.Yarı Toplam Tek/Çift","oran_adi_1"=>"Tek","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"Çift","oran2"=>$oran2,"visible2"=>$visible2);
}

}

if($GameTemplateId == 12174) {

$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"30","detay"=>"2.Yarı Toplam Tek/Çift","oran_adi_1"=>"Tek","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"Çift","oran2"=>$oran2,"visible2"=>$visible2);
}

}

if($GameTemplateId == 12140) {

$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"31","detay"=>"1.Çeyrek Toplam Tek/Çift","oran_adi_1"=>"Tek","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"Çift","oran2"=>$oran2,"visible2"=>$visible2);
}

}

if($GameTemplateId == 12141) {

$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"32","detay"=>"2.Çeyrek Toplam Tek/Çift","oran_adi_1"=>"Tek","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"Çift","oran2"=>$oran2,"visible2"=>$visible2);
}

}

if($GameTemplateId == 12142) {

$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"33","detay"=>"3.Çeyrek Toplam Tek/Çift","oran_adi_1"=>"Tek","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"Çift","oran2"=>$oran2,"visible2"=>$visible2);
}

}

if($GameTemplateId == 12143) {

$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"34","detay"=>"4.Çeyrek Toplam Tek/Çift","oran_adi_1"=>"Tek","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"Çift","oran2"=>$oran2,"visible2"=>$visible2);
}

}

if($GameTemplateId == 7970) {

$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"35","detay"=>"Toplam Tek/Çift","oran_adi_1"=>"Tek","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"Çift","oran2"=>$oran2,"visible2"=>$visible2);
}

}

if($GameTemplateId == 13974) {

$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"36","detay"=>"1.Yarı Kim Kazanır","oran_adi_1"=>"1","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"2","oran2"=>$oran2,"visible2"=>$visible2);
}

}

if($GameTemplateId == 7764) {

$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"37","detay"=>"2.Yarı Kim Kazanır","oran_adi_1"=>"1","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"2","oran2"=>$oran2,"visible2"=>$visible2);
}

}




}

}

echo json_encode($json);

} else {

?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
<html><head>
<title>404 Not Found</title>
</head><body>
<h1>Not Found</h1>
<p>The requested URL was not found on this server.</p>
<p>Additionally, a 404 Not Found
error was encountered while trying to use an ErrorDocument to handle the request.</p>
</body></html>
<? } ?>