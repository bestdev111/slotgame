<?php
$mac_id = $_GET['eventid'];

if($mac_id){
error_reporting(0);
header('Content-type: application/json'); 

function bahisVeri($id) {
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://betwingo.xyz/api/canli_bilgiler_oran.php?tip=tenis&id=".$id."");
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

if($GameTemplateId == 62) {

$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"1","detay"=>"Kim Kazanır","oran_adi_1"=>"1","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"2","oran2"=>$oran2,"visible2"=>$visible2);
}

}

if($GameTemplateId == 79) {

$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);
$oran4 = number_format($icoranlar[3]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;
$visible4 = $icoranlar[3]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"2","detay"=>"Set Bahisi","oran_adi_1"=>"2:0","oran1"=>$oran1,"visible1"=>$visible1,"oran_adi_2"=>"2:1","oran2"=>$oran2,"visible2"=>$visible2,"oran_adi_3"=>"1:2","oran3"=>$oran3,"visible3"=>$visible3,"oran_adi_4"=>"0:2","oran4"=>$oran4,"visible4"=>$visible4);
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