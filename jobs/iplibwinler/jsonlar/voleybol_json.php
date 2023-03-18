<?php
$mac_id = $_GET['eventid'];

if($mac_id){
error_reporting(0);
header('Content-type: application/json'); 

function bahisVeri($id) {
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://betwingo.xyz/api/canli_bilgiler_oran.php?tip=voleybol&id=".$id."");
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
$aciklamasi = $messagesver->N;

$json['veriler']['messages'][] = array("mesajtypesi"=>$mesajtypesi,"mesajtime"=>$mesajtime,"aciklamasi"=>$aciklamasi);

}

foreach($match->oran as $oranlar){
$GameTemplateId = $oranlar->tempid;
$icoranlar = $oranlar->rest;

if($GameTemplateId == 1545) {

$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"1","detay"=>"Kim Kazanır","oran_adi_1"=>"1","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"2","oran2"=>$oran2,"visible2"=>$visible2);
}

}

if($GameTemplateId == 1547) {

$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"2","detay"=>"1.Seti Kim Kazanır ?","oran_adi_1"=>"1","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"2","oran2"=>$oran2,"visible2"=>$visible2);
}

}

if($GameTemplateId == 8263) {

$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"3","detay"=>"2.Seti Kim Kazanır ?","oran_adi_1"=>"1","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"2","oran2"=>$oran2,"visible2"=>$visible2);
}

}

if($GameTemplateId == 1550) {

$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"4","detay"=>"3.Seti Kim Kazanır ?","oran_adi_1"=>"1","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"2","oran2"=>$oran2,"visible2"=>$visible2);
}

}

if($GameTemplateId == 1551) {

$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"5","detay"=>"4.Seti Kim Kazanır ?","oran_adi_1"=>"1","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"2","oran2"=>$oran2,"visible2"=>$visible2);
}

}

if($GameTemplateId == 499) {

$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);
$oran4 = number_format($icoranlar[3]->Odds,2);
$oran5 = number_format($icoranlar[4]->Odds,2);
$oran6 = number_format($icoranlar[5]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;
$visible4 = $icoranlar[3]->Visible;
$visible5 = $icoranlar[4]->Visible;
$visible6 = $icoranlar[5]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"6","detay"=>"Set bahisi (5 maç üzerinden)","oran_adi_1"=>"3:0","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"3:1","oran2"=>$oran2,"visible2"=>$visible2,"oran_adi_3"=>"3:2","oran3"=>$oran3,"visible3"=>$visible3,"oran_adi_4"=>"2:3","oran4"=>$oran4,"visible4"=>$visible4,"oran_adi_5"=>"1:3","oran5"=>$oran5,"visible5"=>$visible5,"oran_adi_6"=>"0:3","oran6"=>$oran6,"visible6"=>$visible6);
}

}

if($GameTemplateId == 6355) {

$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"7","detay"=>"Toplam Kaç Set Oynanır ?","oran_adi_1"=>"3","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"4","oran2"=>$oran2,"visible2"=>$visible2,"oran_adi_3"=>"5","oran3"=>$oran3,"visible3"=>$visible3);
}

}

if($GameTemplateId == 31887) {

$oran2 = number_format($icoranlar[0]->Odds,2);
$oran1 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;
$oran1Name = $icoranlar[0]->name->value;
$alt_ust_getir = $icoranlar[0]->Name;
$alt_ust_bol = explode(" ",$alt_ust_getir);
$ust_ver = $alt_ust_bol[1];
if($ust_ver != ''){
$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"8","detay"=>"1.Takım Toplam Sayı Alt/Üst","secenek"=>$ust_ver,"oran_adi_1"=>"Alt ".$ust_ver."","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"Üst ".$ust_ver."","oran2"=>$oran2,"visible2"=>$visible2);
}
}

}

if($GameTemplateId == 31894) {

$oran2 = number_format($icoranlar[0]->Odds,2);
$oran1 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;
$oran1Name = $icoranlar[0]->name->value;
$alt_ust_getir = $icoranlar[0]->Name;
$alt_ust_bol = explode(" ",$alt_ust_getir);
$ust_ver = $alt_ust_bol[1];
if($ust_ver != ''){
$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"9","detay"=>"2.Takım Toplam Sayı Alt/Üst","secenek"=>$ust_ver,"oran_adi_1"=>"Alt ".$ust_ver."","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"Üst ".$ust_ver."","oran2"=>$oran2,"visible2"=>$visible2);
}
}

}

if($GameTemplateId == 31881) {

$oran2 = number_format($icoranlar[0]->Odds,2);
$oran1 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;
$oran1Name = $icoranlar[0]->name->value;
$alt_ust_getir = $icoranlar[0]->Name;
$alt_ust_bol = explode(" ",$alt_ust_getir);
$ust_ver = $alt_ust_bol[1];
if($ust_ver != ''){
$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"10","detay"=>"1.Takım 1.Set Toplam Sayı Alt/Üst","secenek"=>$ust_ver,"oran_adi_1"=>"Alt ".$ust_ver."","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"Üst ".$ust_ver."","oran2"=>$oran2,"visible2"=>$visible2);
}
}

}

if($GameTemplateId == 31888) {

$oran2 = number_format($icoranlar[0]->Odds,2);
$oran1 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;
$oran1Name = $icoranlar[0]->name->value;
$alt_ust_getir = $icoranlar[0]->Name;
$alt_ust_bol = explode(" ",$alt_ust_getir);
$ust_ver = $alt_ust_bol[1];
if($ust_ver != ''){
$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"11","detay"=>"2.Takım 1.Set Toplam Sayı Alt/Üst","secenek"=>$ust_ver,"oran_adi_1"=>"Alt ".$ust_ver."","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"Üst ".$ust_ver."","oran2"=>$oran2,"visible2"=>$visible2);
}
}

}

if($GameTemplateId == 31882) {

$oran2 = number_format($icoranlar[0]->Odds,2);
$oran1 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;
$oran1Name = $icoranlar[0]->name->value;
$alt_ust_getir = $icoranlar[0]->Name;
$alt_ust_bol = explode(" ",$alt_ust_getir);
$ust_ver = $alt_ust_bol[1];
if($ust_ver != ''){
$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"12","detay"=>"1.Takım 2.Set Toplam Sayı Alt/Üst","secenek"=>$ust_ver,"oran_adi_1"=>"Alt ".$ust_ver."","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"Üst ".$ust_ver."","oran2"=>$oran2,"visible2"=>$visible2);
}
}

}

if($GameTemplateId == 31889) {

$oran2 = number_format($icoranlar[0]->Odds,2);
$oran1 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;
$oran1Name = $icoranlar[0]->name->value;
$alt_ust_getir = $icoranlar[0]->Name;
$alt_ust_bol = explode(" ",$alt_ust_getir);
$ust_ver = $alt_ust_bol[1];
if($ust_ver != ''){
$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"13","detay"=>"2.Takım 2.Set Toplam Sayı Alt/Üst","secenek"=>$ust_ver,"oran_adi_1"=>"Alt ".$ust_ver."","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"Üst ".$ust_ver."","oran2"=>$oran2,"visible2"=>$visible2);
}
}

}

if($GameTemplateId == 31883) {

$oran2 = number_format($icoranlar[0]->Odds,2);
$oran1 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;
$oran1Name = $icoranlar[0]->name->value;
$alt_ust_getir = $icoranlar[0]->Name;
$alt_ust_bol = explode(" ",$alt_ust_getir);
$ust_ver = $alt_ust_bol[1];
if($ust_ver != ''){
$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"14","detay"=>"1.Takım 3.Set Toplam Sayı Alt/Üst","secenek"=>$ust_ver,"oran_adi_1"=>"Alt ".$ust_ver."","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"Üst ".$ust_ver."","oran2"=>$oran2,"visible2"=>$visible2);
}
}

}

if($GameTemplateId == 31890) {

$oran2 = number_format($icoranlar[0]->Odds,2);
$oran1 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;
$oran1Name = $icoranlar[0]->name->value;
$alt_ust_getir = $icoranlar[0]->Name;
$alt_ust_bol = explode(" ",$alt_ust_getir);
$ust_ver = $alt_ust_bol[1];
if($ust_ver != ''){
$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"15","detay"=>"2.Takım 3.Set Toplam Sayı Alt/Üst","secenek"=>$ust_ver,"oran_adi_1"=>"Alt ".$ust_ver."","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"Üst ".$ust_ver."","oran2"=>$oran2,"visible2"=>$visible2);
}
}

}

if($GameTemplateId == 31884) {

$oran2 = number_format($icoranlar[0]->Odds,2);
$oran1 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;
$oran1Name = $icoranlar[0]->name->value;
$alt_ust_getir = $icoranlar[0]->Name;
$alt_ust_bol = explode(" ",$alt_ust_getir);
$ust_ver = $alt_ust_bol[1];
if($ust_ver != ''){
$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"16","detay"=>"1.Takım 4.Set Toplam Sayı Alt/Üst","secenek"=>$ust_ver,"oran_adi_1"=>"Alt ".$ust_ver."","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"Üst ".$ust_ver."","oran2"=>$oran2,"visible2"=>$visible2);
}
}

}

if($GameTemplateId == 31891) {

$oran2 = number_format($icoranlar[0]->Odds,2);
$oran1 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;
$oran1Name = $icoranlar[0]->name->value;
$alt_ust_getir = $icoranlar[0]->Name;
$alt_ust_bol = explode(" ",$alt_ust_getir);
$ust_ver = $alt_ust_bol[1];
if($ust_ver != ''){
$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"17","detay"=>"2.Takım 4.Set Toplam Sayı Alt/Üst","secenek"=>$ust_ver,"oran_adi_1"=>"Alt ".$ust_ver."","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"Üst ".$ust_ver."","oran2"=>$oran2,"visible2"=>$visible2);
}
}

}

if($GameTemplateId == 9210) {

$oran2 = number_format($icoranlar[0]->Odds,2);
$oran1 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;
$oran1Name = $icoranlar[0]->name->value;
$alt_ust_getir = $icoranlar[0]->Name;
$alt_ust_bol = explode(" ",$alt_ust_getir);
$ust_ver = $alt_ust_bol[1];
if($ust_ver != ''){
$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"18","detay"=>"Toplam Sayı Alt/Üst","secenek"=>$ust_ver,"oran_adi_1"=>"Alt ".$ust_ver."","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"Üst ".$ust_ver."","oran2"=>$oran2,"visible2"=>$visible2);
}
}

}

if($GameTemplateId == 14437) {

$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"19","detay"=>"Toplam Sayı Tek/Çift","oran_adi_1"=>"Tek","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"Çift","oran2"=>$oran2,"visible2"=>$visible2);
}

}

if($GameTemplateId == 11950) {

$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"20","detay"=>"1.Set Toplam Sayı Tek/Çift","oran_adi_1"=>"Tek","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"Çift","oran2"=>$oran2,"visible2"=>$visible2);
}

}

if($GameTemplateId == 11951) {

$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"21","detay"=>"2.Set Toplam Sayı Tek/Çift","oran_adi_1"=>"Tek","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"Çift","oran2"=>$oran2,"visible2"=>$visible2);
}

}

if($GameTemplateId == 11952) {

$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"22","detay"=>"3.Set Toplam Sayı Tek/Çift","oran_adi_1"=>"Tek","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"Çift","oran2"=>$oran2,"visible2"=>$visible2);
}

}

if($GameTemplateId == 11953) {

$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"23","detay"=>"4.Set Toplam Sayı Tek/Çift","oran_adi_1"=>"Tek","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"Çift","oran2"=>$oran2,"visible2"=>$visible2);
}

}

if($GameTemplateId == 14484) {

$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"24","detay"=>"Müsabaka 5.Set Sürermi","oran_adi_1"=>"Evet","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"Hayır","oran2"=>$oran2,"visible2"=>$visible2);
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