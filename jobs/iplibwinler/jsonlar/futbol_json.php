<?php
$mac_id = $_GET['eventid'];

if($mac_id){
error_reporting(0);
header('Content-type: application/json');

function LiveTRmsg($msg = 0){
$r = array('Suspended','Red card to','Yellow card to','Goal kick to','Corner to','Halftime','Free kick to','Throw in to','1st Half','No clear indication of added time','2nd Half','Goal for','Goal by','added time','minutes','minute','by penalty','scored by shot','Players are coming out','Game about to start','Offside to','Substitution','Finished','Regular time over','by head','Photo taking','National anthem singing','Shake hands','by shot','goal kick','Last to happen','Players lined up','Penalty awarded to','Penalty missed','penalty missed','Kick-off','First goalkeeper','1st','2nd','3rd','4th','5th','6th','7th','8th','9th','10th','11th','12th','13th','Extra Time over');
$rp = array('Askıya Alındı','Kırmızı kart','Sarı kart','Kale vuruşu','Köşe vuruşu','Devre arası','Serbest vuruş','Taç atışı','İlk Yarı','uzatmalar gösteriliyor','İkinci Yarı','Gol','Gol','eklenen süre','dakika','dakika','penaltıdan atıldı','Şutla atıldı','Oyuncular sahaya çıkıyor','Maç başlamak üzere','Ofsayt','Oyuncu degisikligi','Sona erdi','Normal süre sona erdi','kafa vurusu','Fotograf cektiriliyor','Ulusal marş okunuyor','Oyuncular tokalaşıyor','Sutla atıldı','kale vuruşu','son gerçekleşen olay','Oyuncular sıra halinde diziliyor','Penaltı vuruşu','Penaltıyı atamadı','Penaltıyı atamadı','Başlama vuruşu','İlk kale vuruşu','1.','2.','3.','4.','5.','6.','7.','8.','9.','10.','11.','12.','13.','Uzatmalar Bitti');
return str_replace($r,$rp,$msg);
}

function bahisVeri($id) {
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://api.betsapi.com/v3/events/upcoming?sport_id=1&token=114444-JI2jOk1v24722P");
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

$ev_tisort = "#000000";
$ev_sort = "#000000";
$konuk_tisort = "#000000";
$konuk_sort = "#000000";
$sari_kart_1 = "0";
$sari_kart_2 = "0";
$kirmizi_kart_1 = "0";
$kirmizi_kart_2 = "0";
$korner_1 = "0";
$korner_2 = "0";
$penalti_1 = "0";
$penalti_2 = "0";
$evin_sayisi = "01";
$konukun_sayisi = "02";
$iy_icin_yaptim = "1";
$count_sayisi_ver = "255";

$ev_tisort = $match->hshtcolor;
$ev_sort = $match->htshtcolor;
$konuk_tisort = $match->ashtcolor;
$konuk_sort = $match->atshtcolor;
$sari_kart_1 = (int)$match->ycardh;
$sari_kart_2 = (int)$match->ycarda;
$kirmizi_kart_1 = (int)$match->redh;
$kirmizi_kart_2 = (int)$match->reda;
$korner_1 = (int)$match->crnh;
$korner_2 = (int)$match->crna;
$penalti_1 = (int)$match->pnlth;
$penalti_2 = (int)$match->pnlta;
$skor_ev = (int)$match->sch;
$skor_dep = (int)$match->sca;
$skor_ev_iy = (int)$match->isch;
$skor_dep_iy = (int)$match->isca;
$betradarid = (int)$match->radarid;

if($ev_tisort && $ev_sort && $konuk_tisort && $konuk_sort){
$json['veriler']['veri'] = array("ev_tisort"=>$ev_tisort,"ev_sort"=>$ev_sort,"konuk_tisort"=>$konuk_tisort,"konuk_sort"=>$konuk_sort,"evsarikart"=>$sari_kart_1,"konuksarikart"=>$sari_kart_2,"evkirmizikart"=>$kirmizi_kart_1,"konukkirmizikart"=>$kirmizi_kart_2,"evkorner"=>$korner_1,"konukkorner"=>$korner_2,"evpenalti"=>$penalti_1,"konukpenalti"=>$penalti_2,"iy_ev"=>$skor_ev_iy,"iy_dep"=>$skor_dep_iy,"ms_ev"=>$skor_ev,"ms_dep"=>$skor_dep,"betradarid"=>$betradarid);
}


foreach($match->Msg as $messagesver){
$mesajtypesi = $messagesver->type;
$mesajtime = $messagesver->dk;
$aciklamasi = LiveTRmsg($messagesver->N);

$json['veriler']['messages'][] = array("mesajtypesi"=>$mesajtypesi,"mesajtime"=>$mesajtime,"aciklamasi"=>$aciklamasi);

}


foreach($match->oran as $oranlar){
$GameTemplateId = $oranlar->tempid;
$icoranlar = $oranlar->rest;

if($GameTemplateId==17) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;
$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"1","detay"=>"1X2","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2,"oran3"=>$oran3,"visible3"=>$visible3);
}
}

if($GameTemplateId==54) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;
$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"2","detay"=>"Handikap 1:0","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2,"oran3"=>$oran3,"visible3"=>$visible3);
}
}

if($GameTemplateId==502) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"3","detay"=>"Handikap 2:0","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2,"oran3"=>$oran3,"visible3"=>$visible3);
}
}

if($GameTemplateId==52) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"4","detay"=>"Handikap 0:1","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2,"oran3"=>$oran3,"visible3"=>$visible3);
}
}

if($GameTemplateId==501) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"5","detay"=>"Handikap 0:2","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2,"oran3"=>$oran3,"visible3"=>$visible3);
}
}

if($GameTemplateId==3187) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"6","detay"=>"Çifte Şans","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2,"oran3"=>$oran3,"visible3"=>$visible3);
}
}

if($GameTemplateId==11748) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"7","detay"=>"1.Yarı Çifte Şans","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2,"oran3"=>$oran3,"visible3"=>$visible3);
}
}


if($GameTemplateId==7688) {
$oran2 = number_format($icoranlar[0]->Odds,2);
$oran1 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$skor_iy_topla = $skor_ev_iy+$skor_dep_iy;
if($skor_iy_topla>0){
	$visible1 = 0;
	$visible2 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"8","detay"=>"1.Yarı 0.5 Gol Alt Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($GameTemplateId==7689) {
$oran2 = number_format($icoranlar[0]->Odds,2);
$oran1 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$skor_iy_topla = $skor_ev_iy+$skor_dep_iy;
if($skor_iy_topla>1){
	$visible1 = 0;
	$visible2 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"9","detay"=>"1.Yarı 1.5 Gol Alt Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($GameTemplateId==7890) {
$oran2 = number_format($icoranlar[0]->Odds,2);
$oran1 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$skor_iy_topla = $skor_ev_iy+$skor_dep_iy;
if($skor_iy_topla>2){
	$visible1 = 0;
	$visible2 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"10","detay"=>"1.Yarı 2.5 Gol Alt Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($GameTemplateId==7233) {
$oran2 = number_format($icoranlar[0]->Odds,2);
$oran1 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$skor_topla = $skor_ev+$skor_dep;
if($skor_topla>0){
	$visible1 = 0;
	$visible2 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"11","detay"=>"Toplam 0.5 Gol Alt Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($GameTemplateId==1772) {
$oran2 = number_format($icoranlar[0]->Odds,2);
$oran1 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$skor_topla = $skor_ev+$skor_dep;
if($skor_topla>1){
	$visible1 = 0;
	$visible2 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"12","detay"=>"Toplam 1.5 Gol Alt Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($GameTemplateId==173) {
$oran2 = number_format($icoranlar[0]->Odds,2);
$oran1 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$skor_topla = $skor_ev+$skor_dep;
if($skor_topla>2){
	$visible1 = 0;
	$visible2 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"13","detay"=>"Toplam 2.5 Gol Alt Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($GameTemplateId==8933) {
$oran2 = number_format($icoranlar[0]->Odds,2);
$oran1 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$skor_topla = $skor_ev+$skor_dep;
if($skor_topla>3){
	$visible1 = 0;
	$visible2 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"14","detay"=>"Toplam 3.5 Gol Alt Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($GameTemplateId==1791) {
$oran2 = number_format($icoranlar[0]->Odds,2);
$oran1 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$skor_topla = $skor_ev+$skor_dep;
if($skor_topla>4){
	$visible1 = 0;
	$visible2 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"15","detay"=>"Toplam 4.5 Gol Alt Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($GameTemplateId==859) {
$oran2 = number_format($icoranlar[0]->Odds,2);
$oran1 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$skor_topla = $skor_ev+$skor_dep;
if($skor_topla>5){
	$visible1 = 0;
	$visible2 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"16","detay"=>"Toplam 5.5 Gol Alt Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($GameTemplateId==313) {
$oran2 = number_format($icoranlar[0]->Odds,2);
$oran1 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$skor_topla = $skor_ev+$skor_dep;
if($skor_topla>6){
	$visible1 = 0;
	$visible2 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"220","detay"=>"Toplam 6.5 Gol Alt Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($GameTemplateId==1383) {
$oran2 = number_format($icoranlar[0]->Odds,2);
$oran1 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$skor_topla = $skor_ev+$skor_dep;
if($skor_topla>7){
	$visible1 = 0;
	$visible2 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"221","detay"=>"Toplam 7.5 Gol Alt Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($GameTemplateId==322) {
$oran2 = number_format($icoranlar[0]->Odds,2);
$oran1 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$skor_topla = $skor_ev+$skor_dep;
if($skor_topla>8){
	$visible1 = 0;
	$visible2 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"222","detay"=>"Toplam 8.5 Gol Alt Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($GameTemplateId==19595) {
$oran2 = number_format($icoranlar[0]->Odds,2);
$oran1 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$skor_ik_hesapla_ev = $skor_ev-$skor_ev_iy;
$skor_ik_hesapla_dep = $skor_dep-$skor_dep_iy;
$skor_ik_topla = $skor_ik_hesapla_ev+$skor_ik_hesapla_dep;
if($skor_ik_topla>0){
	$visible1 = 0;
	$visible2 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"17","detay"=>"2.Yarı 0.5 Gol Alt Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($GameTemplateId==19596) {
$oran2 = number_format($icoranlar[0]->Odds,2);
$oran1 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$skor_ik_hesapla_ev = $skor_ev-$skor_ev_iy;
$skor_ik_hesapla_dep = $skor_dep-$skor_dep_iy;
$skor_ik_topla = $skor_ik_hesapla_ev+$skor_ik_hesapla_dep;
if($skor_ik_topla>1){
	$visible1 = 0;
	$visible2 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"18","detay"=>"2.Yarı 1.5 Gol Alt Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($GameTemplateId==19597) {
$oran2 = number_format($icoranlar[0]->Odds,2);
$oran1 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$skor_ik_hesapla_ev = $skor_ev-$skor_ev_iy;
$skor_ik_hesapla_dep = $skor_dep-$skor_dep_iy;
$skor_ik_topla = $skor_ik_hesapla_ev+$skor_ik_hesapla_dep;
if($skor_ik_topla>2){
	$visible1 = 0;
	$visible2 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"19","detay"=>"2.Yarı 2.5 Gol Alt Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($GameTemplateId==20506) {
$oran2 = number_format($icoranlar[0]->Odds,2);
$oran1 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$skor_ik_hesapla_ev = $skor_ev-$skor_ev_iy;
$skor_ik_hesapla_dep = $skor_dep-$skor_dep_iy;
$skor_ik_topla = $skor_ik_hesapla_ev+$skor_ik_hesapla_dep;
if($skor_ik_topla>3){
	$visible1 = 0;
	$visible2 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"20","detay"=>"2.Yarı 3.5 Gol Alt Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($GameTemplateId==7824) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

if($skor_ev>0 && $skor_dep>0){
	$visible1 = 0;
	$visible2 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"21","detay"=>"Karşılıklı Gol Olurmu ?","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($GameTemplateId==11087) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

if($skor_ev>0){
	$visible1 = 0;
	$visible2 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"22","detay"=>"Ev Sahibi Müsabakada Gol Atarmı ?","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($GameTemplateId==11086) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

if($skor_dep>0){
	$visible1 = 0;
	$visible2 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"23","detay"=>"Deplasman Müsabakada Gol Atarmı ?","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($GameTemplateId==4665) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"24","detay"=>"Toplam Gol Tek / Çift","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($GameTemplateId==16449) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"25","detay"=>"1.Yarı Tek / Çift","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($GameTemplateId==15085) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

if($skor_ev_iy>0 && $skor_dep_iy>0){
	$visible1 = 0;
	$visible2 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"26","detay"=>"1.Yarı Karşılıklı Gol","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($GameTemplateId==24392) {
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
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"27","detay"=>"Maç Sonucu ve Karşılıklı Gol","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2,"oran3"=>$oran3,"visible3"=>$visible3,"oran4"=>$oran4,"visible4"=>$visible4,"oran5"=>$oran5,"visible5"=>$visible5,"oran6"=>$oran6,"visible6"=>$visible6);
}
}

if($GameTemplateId==20083) {
$oran2 = number_format($icoranlar[0]->Odds,2);
$oran1 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

if($skor_ev>0){
	$visible1 = 0;
	$visible2 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"28","detay"=>"Ev Sahibi 0.5 Gol Alt Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($GameTemplateId==16454) {
$oran2 = number_format($icoranlar[0]->Odds,2);
$oran1 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

if($skor_ev>1){
	$visible1 = 0;
	$visible2 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"29","detay"=>"Ev Sahibi 1.5 Gol Alt Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($GameTemplateId==24138) {
$oran2 = number_format($icoranlar[0]->Odds,2);
$oran1 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

if($skor_ev>2){
	$visible1 = 0;
	$visible2 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"30","detay"=>"Ev Sahibi 2.5 Gol Alt Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($GameTemplateId==20084) {
$oran2 = number_format($icoranlar[0]->Odds,2);
$oran1 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

if($skor_dep>0){
	$visible1 = 0;
	$visible2 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"31","detay"=>"Deplasman 0.5 Gol Alt Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($GameTemplateId==16455) {
$oran2 = number_format($icoranlar[0]->Odds,2);
$oran1 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

if($skor_dep>1){
	$visible1 = 0;
	$visible2 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"32","detay"=>"Deplasman 1.5 Gol Alt Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($GameTemplateId==20085) {
$oran2 = number_format($icoranlar[0]->Odds,2);
$oran1 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

if($skor_dep>2){
	$visible1 = 0;
	$visible2 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"33","detay"=>"Deplasman 2.5 Gol Alt Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($GameTemplateId==2196) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);
$oran4 = number_format($icoranlar[3]->Odds,2);
$oran5 = number_format($icoranlar[4]->Odds,2);
$oran6 = number_format($icoranlar[5]->Odds,2);
$oran7 = number_format($icoranlar[6]->Odds,2);
$oran8 = number_format($icoranlar[7]->Odds,2);
$oran9 = number_format($icoranlar[8]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;
$visible4 = $icoranlar[3]->Visible;
$visible5 = $icoranlar[4]->Visible;
$visible6 = $icoranlar[5]->Visible;
$visible7 = $icoranlar[6]->Visible;
$visible8 = $icoranlar[7]->Visible;
$visible9 = $icoranlar[8]->Visible;

$skor_topla = $skor_ev+$skor_dep;
if($skor_topla>0){
	$visible1 = 0;
}

if($skor_topla>1){
	$visible2 = 0;
}

if($skor_topla>2){
	$visible3 = 0;
}

if($skor_topla>3){
	$visible4 = 0;
}

if($skor_topla>4){
	$visible5 = 0;
}

if($skor_topla>5){
	$visible6 = 0;
}

if($skor_topla>6){
	$visible7 = 0;
}

if($skor_topla>7){
	$visible8 = 0;
}

if($skor_topla>7){
	$visible9 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"34","detay"=>"Toplam Kaç Gol Atılır ?","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2,"oran3"=>$oran3,"visible3"=>$visible3,"oran4"=>$oran4,"visible4"=>$visible4,"oran5"=>$oran5,"visible5"=>$visible5,"oran6"=>$oran6,"visible6"=>$visible6,"oran7"=>$oran7,"visible7"=>$visible7,"oran8"=>$oran8,"visible8"=>$visible8,"oran9"=>$oran9,"visible9"=>$visible9);
}
}

if($GameTemplateId==4726) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);
$oran4 = number_format($icoranlar[3]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;
$visible4 = $icoranlar[3]->Visible;

if($skor_ev>0){
	$visible1 = 0;
}

if($skor_ev>1){
	$visible2 = 0;
}

if($skor_ev>2){
	$visible3 = 0;
}

if($skor_ev>2){
	$visible4 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"35","detay"=>"Ev Sahibi Toplam Kaç Gol Atar ?","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2,"oran3"=>$oran3,"visible3"=>$visible3,"oran4"=>$oran4,"visible4"=>$visible4);
}
}

if($GameTemplateId==4727) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);
$oran4 = number_format($icoranlar[3]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;
$visible4 = $icoranlar[3]->Visible;

if($skor_dep>0){
	$visible1 = 0;
}

if($skor_dep>1){
	$visible2 = 0;
}

if($skor_dep>2){
	$visible3 = 0;
}

if($skor_dep>2){
	$visible4 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"36","detay"=>"Deplasman Toplam Kaç Gol Atar ?","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2,"oran3"=>$oran3,"visible3"=>$visible3,"oran4"=>$oran4,"visible4"=>$visible4);
}
}

if($GameTemplateId==26644) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);
$oran4 = number_format($icoranlar[3]->Odds,2);
$oran5 = number_format($icoranlar[4]->Odds,2);
$oran6 = number_format($icoranlar[5]->Odds,2);
$oran7 = number_format($icoranlar[6]->Odds,2);
$oran8 = number_format($icoranlar[7]->Odds,2);
$oran9 = number_format($icoranlar[8]->Odds,2);
$oran10 = number_format($icoranlar[9]->Odds,2);
$oran11 = number_format($icoranlar[10]->Odds,2);
$oran12 = number_format($icoranlar[11]->Odds,2);
$oran13 = number_format($icoranlar[12]->Odds,2);
$oran14 = number_format($icoranlar[13]->Odds,2);
$oran15 = number_format($icoranlar[14]->Odds,2);
$oran16 = number_format($icoranlar[15]->Odds,2);
$oran17 = number_format($icoranlar[16]->Odds,2);
$oran18 = number_format($icoranlar[17]->Odds,2);
$oran19 = number_format($icoranlar[18]->Odds,2);
$oran20 = number_format($icoranlar[19]->Odds,2);
$oran21 = number_format($icoranlar[20]->Odds,2);
$oran22 = number_format($icoranlar[21]->Odds,2);
$oran23 = number_format($icoranlar[22]->Odds,2);
$oran24 = number_format($icoranlar[23]->Odds,2);
$oran25 = number_format($icoranlar[24]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;
$visible4 = $icoranlar[3]->Visible;
$visible5 = $icoranlar[4]->Visible;
$visible6 = $icoranlar[5]->Visible;
$visible7 = $icoranlar[6]->Visible;
$visible8 = $icoranlar[7]->Visible;
$visible9 = $icoranlar[8]->Visible;
$visible10 = $icoranlar[9]->Visible;
$visible11 = $icoranlar[10]->Visible;
$visible12 = $icoranlar[11]->Visible;
$visible13 = $icoranlar[12]->Visible;
$visible14 = $icoranlar[13]->Visible;
$visible15 = $icoranlar[14]->Visible;
$visible16 = $icoranlar[15]->Visible;
$visible17 = $icoranlar[16]->Visible;
$visible18 = $icoranlar[17]->Visible;
$visible19 = $icoranlar[18]->Visible;
$visible20 = $icoranlar[19]->Visible;
$visible21 = $icoranlar[20]->Visible;
$visible22 = $icoranlar[21]->Visible;
$visible23 = $icoranlar[22]->Visible;
$visible24 = $icoranlar[23]->Visible;
$visible25 = $icoranlar[24]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"37","detay"=>"1.Yarı Skoru","oran1_adi"=>"0:0","oran1"=>$oran1,"visible1"=>$visible1,"oran2_adi"=>"1:0","oran2"=>$oran2,"visible2"=>$visible2,"oran3_adi"=>"1:1","oran3"=>$oran3,"visible3"=>$visible3,"oran4_adi"=>"0:1","oran4"=>$oran4,"visible4"=>$visible4,"oran5_adi"=>"2:0","oran5"=>$oran5,"visible5"=>$visible5,"oran6_adi"=>"2:1","oran6"=>$oran6,"visible6"=>$visible6,"oran7_adi"=>"2:2","oran7"=>$oran7,"visible7"=>$visible7,"oran8_adi"=>"1:2","oran8"=>$oran8,"visible8"=>$visible8,"oran9_adi"=>"0:2","oran9"=>$oran9,"visible9"=>$visible9,"oran10_adi"=>"3:0","oran10"=>$oran10,"visible10"=>$visible10,"oran11_adi"=>"3:1","oran11"=>$oran11,"visible11"=>$visible11,"oran12_adi"=>"3:2","oran12"=>$oran12,"visible12"=>$visible12,"oran13_adi"=>"3:3","oran13"=>$oran13,"visible13"=>$visible13,"oran14_adi"=>"2:3","oran14"=>$oran14,"visible14"=>$visible14,"oran15_adi"=>"1:3","oran15"=>$oran15,"visible15"=>$visible15,"oran16_adi"=>"0:3","oran16"=>$oran16,"visible16"=>$visible16,"oran17_adi"=>"4:0","oran17"=>$oran17,"visible17"=>$visible17,"oran18_adi"=>"4:1","oran18"=>$oran18,"visible18"=>$visible18,"oran19_adi"=>"4:2","oran19"=>$oran19,"visible19"=>$visible19,"oran20_adi"=>"4:3","oran20"=>$oran20,"visible20"=>$visible20,"oran21_adi"=>"4:4","oran21"=>$oran21,"visible21"=>$visible21,"oran22_adi"=>"3:4","oran22"=>$oran22,"visible22"=>$visible22,"oran23_adi"=>"2:4","oran23"=>$oran23,"visible23"=>$visible23,"oran24_adi"=>"1:4","oran24"=>$oran24,"visible24"=>$visible24,"oran25_adi"=>"0:4","oran25"=>$oran25,"visible25"=>$visible25);
}
}

if($GameTemplateId==19193) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);
$oran4 = number_format($icoranlar[3]->Odds,2);
$oran5 = number_format($icoranlar[4]->Odds,2);
$oran6 = number_format($icoranlar[5]->Odds,2);
$oran7 = number_format($icoranlar[6]->Odds,2);
$oran8 = number_format($icoranlar[7]->Odds,2);
$oran9 = number_format($icoranlar[8]->Odds,2);
$oran10 = number_format($icoranlar[9]->Odds,2);
$oran11 = number_format($icoranlar[10]->Odds,2);
$oran12 = number_format($icoranlar[11]->Odds,2);
$oran13 = number_format($icoranlar[12]->Odds,2);
$oran14 = number_format($icoranlar[13]->Odds,2);
$oran15 = number_format($icoranlar[14]->Odds,2);
$oran16 = number_format($icoranlar[15]->Odds,2);
$oran17 = number_format($icoranlar[16]->Odds,2);
$oran18 = number_format($icoranlar[17]->Odds,2);
$oran19 = number_format($icoranlar[18]->Odds,2);
$oran20 = number_format($icoranlar[19]->Odds,2);
$oran21 = number_format($icoranlar[20]->Odds,2);
$oran22 = number_format($icoranlar[21]->Odds,2);
$oran23 = number_format($icoranlar[22]->Odds,2);
$oran24 = number_format($icoranlar[23]->Odds,2);
$oran25 = number_format($icoranlar[24]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;
$visible4 = $icoranlar[3]->Visible;
$visible5 = $icoranlar[4]->Visible;
$visible6 = $icoranlar[5]->Visible;
$visible7 = $icoranlar[6]->Visible;
$visible8 = $icoranlar[7]->Visible;
$visible9 = $icoranlar[8]->Visible;
$visible10 = $icoranlar[9]->Visible;
$visible11 = $icoranlar[10]->Visible;
$visible12 = $icoranlar[11]->Visible;
$visible13 = $icoranlar[12]->Visible;
$visible14 = $icoranlar[13]->Visible;
$visible15 = $icoranlar[14]->Visible;
$visible16 = $icoranlar[15]->Visible;
$visible17 = $icoranlar[16]->Visible;
$visible18 = $icoranlar[17]->Visible;
$visible19 = $icoranlar[18]->Visible;
$visible20 = $icoranlar[19]->Visible;
$visible21 = $icoranlar[20]->Visible;
$visible22 = $icoranlar[21]->Visible;
$visible23 = $icoranlar[22]->Visible;
$visible24 = $icoranlar[23]->Visible;
$visible25 = $icoranlar[24]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"38","detay"=>"Maç Skoru","oran1_adi"=>"0:0","oran1"=>$oran1,"visible1"=>$visible1,"oran2_adi"=>"1:0","oran2"=>$oran2,"visible2"=>$visible2,"oran3_adi"=>"1:1","oran3"=>$oran3,"visible3"=>$visible3,"oran4_adi"=>"0:1","oran4"=>$oran4,"visible4"=>$visible4,"oran5_adi"=>"2:0","oran5"=>$oran5,"visible5"=>$visible5,"oran6_adi"=>"2:1","oran6"=>$oran6,"visible6"=>$visible6,"oran7_adi"=>"2:2","oran7"=>$oran7,"visible7"=>$visible7,"oran8_adi"=>"1:2","oran8"=>$oran8,"visible8"=>$visible8,"oran9_adi"=>"0:2","oran9"=>$oran9,"visible9"=>$visible9,"oran10_adi"=>"3:0","oran10"=>$oran10,"visible10"=>$visible10,"oran11_adi"=>"3:1","oran11"=>$oran11,"visible11"=>$visible11,"oran12_adi"=>"3:2","oran12"=>$oran12,"visible12"=>$visible12,"oran13_adi"=>"3:3","oran13"=>$oran13,"visible13"=>$visible13,"oran14_adi"=>"2:3","oran14"=>$oran14,"visible14"=>$visible14,"oran15_adi"=>"1:3","oran15"=>$oran15,"visible15"=>$visible15,"oran16_adi"=>"0:3","oran16"=>$oran16,"visible16"=>$visible16,"oran17_adi"=>"4:0","oran17"=>$oran17,"visible17"=>$visible17,"oran18_adi"=>"4:1","oran18"=>$oran18,"visible18"=>$visible18,"oran19_adi"=>"4:2","oran19"=>$oran19,"visible19"=>$visible19,"oran20_adi"=>"4:3","oran20"=>$oran20,"visible20"=>$visible20,"oran21_adi"=>"4:4","oran21"=>$oran21,"visible21"=>$visible21,"oran22_adi"=>"3:4","oran22"=>$oran22,"visible22"=>$visible22,"oran23_adi"=>"2:4","oran23"=>$oran23,"visible23"=>$visible23,"oran24_adi"=>"1:4","oran24"=>$oran24,"visible24"=>$visible24,"oran25_adi"=>"0:4","oran25"=>$oran25,"visible25"=>$visible25);
}
}

if($GameTemplateId==31316) {
$oran2 = number_format($icoranlar[0]->Odds,2);
$oran1 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

if($skor_ev_iy>0){
	$visible1 = 0;
	$visible2 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"39","detay"=>"Ev Sahibi 1.Yarı 0.5 Gol Alt Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($GameTemplateId==31317) {
$oran2 = number_format($icoranlar[0]->Odds,2);
$oran1 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

if($skor_ev_iy>1){
	$visible1 = 0;
	$visible2 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"40","detay"=>"Ev Sahibi 1.Yarı 1.5 Gol Alt Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($GameTemplateId==31318) {
$oran2 = number_format($icoranlar[0]->Odds,2);
$oran1 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

if($skor_ev_iy>2){
	$visible1 = 0;
	$visible2 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"41","detay"=>"Ev Sahibi 1.Yarı 2.5 Gol Alt Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($GameTemplateId==31319) {
$oran2 = number_format($icoranlar[0]->Odds,2);
$oran1 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

if($skor_dep_iy>0){
	$visible1 = 0;
	$visible2 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"42","detay"=>"Deplasman 1.Yarı 0.5 Gol Alt Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($GameTemplateId==31320) {
$oran2 = number_format($icoranlar[0]->Odds,2);
$oran1 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

if($skor_dep_iy>1){
	$visible1 = 0;
	$visible2 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"43","detay"=>"Deplasman 1.Yarı 1.5 Gol Alt Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($GameTemplateId==31321) {
$oran2 = number_format($icoranlar[0]->Odds,2);
$oran1 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

if($skor_dep_iy>2){
	$visible1 = 0;
	$visible2 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"44","detay"=>"Deplasman 1.Yarı 2.5 Gol Alt Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($GameTemplateId==4720) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);
$oran4 = number_format($icoranlar[3]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;
$visible4 = $icoranlar[3]->Visible;

if($skor_ev_iy>0){
	$visible1 = 0;
}

if($skor_ev_iy>1){
	$visible2 = 0;
}

if($skor_ev_iy>2){
	$visible3 = 0;
}

if($skor_ev_iy>2){
	$visible4 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"45","detay"=>"Ev Sahibi İlk Yarı Tam Gol Sayısı","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2,"oran3"=>$oran3,"visible3"=>$visible3,"oran4"=>$oran4,"visible4"=>$visible4);
}
}

if($GameTemplateId==4733) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);
$oran4 = number_format($icoranlar[3]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;
$visible4 = $icoranlar[3]->Visible;

if($skor_ev>0){
	$visible1 = 0;
}

if($skor_ev>1){
	$visible2 = 0;
}

if($skor_ev>2){
	$visible3 = 0;
}

if($skor_ev>2){
	$visible4 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"46","detay"=>"Ev Sahibi İkinci Yarı Tam Gol Sayısı","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2,"oran3"=>$oran3,"visible3"=>$visible3,"oran4"=>$oran4,"visible4"=>$visible4);
}
}

if($GameTemplateId==4721) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);
$oran4 = number_format($icoranlar[3]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;
$visible4 = $icoranlar[3]->Visible;

if($skor_dep_iy>0){
	$visible1 = 0;
}

if($skor_dep_iy>1){
	$visible2 = 0;
}

if($skor_dep_iy>2){
	$visible3 = 0;
}

if($skor_dep_iy>2){
	$visible4 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"47","detay"=>"Deplasman İlk Yarı Tam Gol Sayısı","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2,"oran3"=>$oran3,"visible3"=>$visible3,"oran4"=>$oran4,"visible4"=>$visible4);
}
}

if($GameTemplateId==4734) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);
$oran4 = number_format($icoranlar[3]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;
$visible4 = $icoranlar[3]->Visible;

if($skor_dep>0){
	$visible1 = 0;
}

if($skor_dep>1){
	$visible2 = 0;
}

if($skor_dep>2){
	$visible3 = 0;
}

if($skor_dep>2){
	$visible4 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"48","detay"=>"Deplasman İkinci Yarı Tam Gol Sayısı","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2,"oran3"=>$oran3,"visible3"=>$visible3,"oran4"=>$oran4,"visible4"=>$visible4);
}
}

if($GameTemplateId==19508) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"49","detay"=>"Herhangi Bir Takım 1 Gol Farkla Kazanirmi ?","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($GameTemplateId==19509) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"50","detay"=>"Herhangi Bir Takım 2 Gol Farkla Kazanirmi ?","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($GameTemplateId==19510) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"51","detay"=>"Herhangi Bir Takım 3 Gol Farkla Kazanirmi ?","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($GameTemplateId==2488) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"52","detay"=>"1.Yarı Sonucu","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2,"oran3"=>$oran3,"visible3"=>$visible3);
}
}

if($GameTemplateId==4778) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"53","detay"=>"2.Yarı Sonucu","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2,"oran3"=>$oran3,"visible3"=>$visible3);
}
}

if($GameTemplateId==27536) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);
$oran4 = number_format($icoranlar[3]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;
$visible4 = $icoranlar[3]->Visible;

$skor_iy_topla = $skor_ev_iy+$skor_dep_iy;

if($skor_iy_topla>0){
	$visible1 = 0;
}

if($skor_iy_topla>1){
	$visible2 = 0;
}

if($skor_iy_topla>2){
	$visible3 = 0;
}

if($skor_iy_topla>2){
	$visible4 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"54","detay"=>"İlk Yarıda Kaç Gol Olur ?","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2,"oran3"=>$oran3,"visible3"=>$visible3,"oran4"=>$oran4,"visible4"=>$visible4);
}
}

if($GameTemplateId==4732) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);
$oran4 = number_format($icoranlar[3]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;
$visible4 = $icoranlar[3]->Visible;

$skor_ik_hesapla_ev = $skor_ev-$skor_ev_iy;
$skor_ik_hesapla_dep = $skor_dep-$skor_dep_iy;
$skor_ik_topla = $skor_ik_hesapla_ev+$skor_ik_hesapla_dep;

if($skor_ik_topla>0){
	$visible1 = 0;
}

if($skor_ik_topla>1){
	$visible2 = 0;
}

if($skor_ik_topla>2){
	$visible3 = 0;
}

if($skor_ik_topla>2){
	$visible4 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"55","detay"=>"2.Yarıda Toplam Kaç Gol Olur ?","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2,"oran3"=>$oran3,"visible3"=>$visible3,"oran4"=>$oran4,"visible4"=>$visible4);
}
}

if($GameTemplateId==27531) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$skor_topla = $skor_ev+$skor_dep;

if($skor_topla>1){
	$visible1 = 0;
}

if($skor_topla>3){
	$visible2 = 0;
}

if($skor_topla>3){
	$visible3 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"56","detay"=>"Müsabakada kaç gol atılır? (0-4)","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2,"oran3"=>$oran3,"visible3"=>$visible3);
}
}

if($GameTemplateId==27534) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$skor_topla = $skor_ev+$skor_dep;

if($skor_topla>2){
	$visible1 = 0;
}

if($skor_topla>4){
	$visible2 = 0;
}

if($skor_topla>4){
	$visible3 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"57","detay"=>"Müsabakada kaç gol atılır? (0-5)","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2,"oran3"=>$oran3,"visible3"=>$visible3);
}
}

if($GameTemplateId==27535) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$skor_topla = $skor_ev+$skor_dep;

if($skor_topla>3){
	$visible1 = 0;
}

if($skor_topla>5){
	$visible2 = 0;
}

if($skor_topla>5){
	$visible3 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"58","detay"=>"Müsabakada kaç gol atılır? (0-6)","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2,"oran3"=>$oran3,"visible3"=>$visible3);
}
}

if($GameTemplateId==4956) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$skor_iy_topla = $skor_ev_iy+$skor_dep_iy;
if($skor_iy_topla>0){
	$visible1 = 0;
	$visible2 = 0;
	$visible3 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"59","detay"=>"1. yarıda 1.golü hangi takım atar?","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2,"oran3"=>$oran3,"visible3"=>$visible3);
}
}

if($GameTemplateId==13461) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$skor_iy_topla = $skor_ev_iy+$skor_dep_iy;
if($skor_iy_topla>1){
	$visible1 = 0;
	$visible2 = 0;
	$visible3 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"111","detay"=>"1. yarıda 2.golü hangi takım atar?","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2,"oran3"=>$oran3,"visible3"=>$visible3);
}
}

if($GameTemplateId==118) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$skor_topla = $skor_ev+$skor_dep;
if($skor_topla>0){
	$visible1 = 0;
	$visible2 = 0;
	$visible3 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"60","detay"=>"1.golü hangi takım atar?","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2,"oran3"=>$oran3,"visible3"=>$visible3);
}
}

if($GameTemplateId==1344) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$skor_topla = $skor_ev+$skor_dep;
if($skor_topla>1){
	$visible1 = 0;
	$visible2 = 0;
	$visible3 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"61","detay"=>"2.golü hangi takım atar?","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2,"oran3"=>$oran3,"visible3"=>$visible3);
}
}

if($GameTemplateId==1345) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$skor_topla = $skor_ev+$skor_dep;
if($skor_topla>2){
	$visible1 = 0;
	$visible2 = 0;
	$visible3 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"62","detay"=>"3.golü hangi takım atar?","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2,"oran3"=>$oran3,"visible3"=>$visible3);
}
}

if($GameTemplateId==1346) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$skor_topla = $skor_ev+$skor_dep;
if($skor_topla>3){
	$visible1 = 0;
	$visible2 = 0;
	$visible3 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"63","detay"=>"4.golü hangi takım atar?","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2,"oran3"=>$oran3,"visible3"=>$visible3);
}
}

if($GameTemplateId==1347) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$skor_topla = $skor_ev+$skor_dep;
if($skor_topla>4){
	$visible1 = 0;
	$visible2 = 0;
	$visible3 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"64","detay"=>"5.golü hangi takım atar?","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2,"oran3"=>$oran3,"visible3"=>$visible3);
}
}

if($GameTemplateId==1348) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$skor_topla = $skor_ev+$skor_dep;
if($skor_topla>5){
	$visible1 = 0;
	$visible2 = 0;
	$visible3 = 0;
}

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"65","detay"=>"6.golü hangi takım atar?","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2,"oran3"=>$oran3,"visible3"=>$visible3);
}
}

## YENİ ORANLAR ##********************************************************************************************************************

if($GameTemplateId==9922) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);

$ust_ver = $oranlar->attr;

if($ust_ver == '1,5'){

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"66","detay"=>"Toplam Sarı Kart 1.5 Alt/Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($ust_ver == '2,5'){

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"67","detay"=>"Toplam Sarı Kart 2.5 Alt/Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($ust_ver == '3,5'){

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"68","detay"=>"Toplam Sarı Kart 3.5 Alt/Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($ust_ver == '4,5'){

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"69","detay"=>"Toplam Sarı Kart 4.5 Alt/Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}


}

if($GameTemplateId==19976) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"70","detay"=>"Kırmızı Kart Çıkarmı ?","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($GameTemplateId==1328) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"71","detay"=>"Kaç Penaltı Olur ?","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2,"oran3"=>$oran3,"visible3"=>$visible3);
}
}

if($GameTemplateId==18739) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);

$ust_ver = $oranlar->attr;

if($ust_ver == '1,5'){

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"72","detay"=>"1.Takım Toplam Sarı Kart 1.5 Alt/Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($ust_ver == '2,5'){

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"73","detay"=>"1.Takım Toplam Sarı Kart 2.5 Alt/Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($ust_ver == '3,5'){

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"74","detay"=>"1.Takım Toplam Sarı Kart 3.5 Alt/Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

}

if($GameTemplateId==18740) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);

$ust_ver = $oranlar->attr;

if($ust_ver == '1,5'){

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"75","detay"=>"2.Takım Toplam Sarı Kart 1.5 Alt/Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($ust_ver == '2,5'){

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"76","detay"=>"2.Takım Toplam Sarı Kart 2.5 Alt/Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($ust_ver == '3,5'){

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"77","detay"=>"2.Takım Toplam Sarı Kart 3.5 Alt/Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

}

if($GameTemplateId==17929) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"78","detay"=>"Sarı Kart Tek/Çift","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($GameTemplateId==4753) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"79","detay"=>"Hangi Takım Çok Sarı Kart Yer ?","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2,"oran3"=>$oran3,"visible3"=>$visible3);
}
}

if($GameTemplateId==4523) {
$oran1 = number_format($icoranlar[1]->Odds,2);
$oran2 = number_format($icoranlar[0]->Odds,2);

$ust_ver = $oranlar->attr;

if($ust_ver == '5,5'){

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"80","detay"=>"Toplam Korner 5.5 Alt/Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($ust_ver == '6,5'){

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"81","detay"=>"Toplam Korner 6.5 Alt/Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($ust_ver == '7,5'){

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"82","detay"=>"Toplam Korner 7.5 Alt/Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($ust_ver == '8,5'){

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"83","detay"=>"Toplam Korner 8.5 Alt/Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($ust_ver == '9,5'){

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"84","detay"=>"Toplam Korner 9.5 Alt/Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($ust_ver == '10,5'){

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"85","detay"=>"Toplam Korner 10.5 Alt/Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($ust_ver == '11,5'){

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"86","detay"=>"Toplam Korner 11.5 Alt/Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($ust_ver == '12,5'){

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"87","detay"=>"Toplam Korner 12.5 Alt/Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($ust_ver == '13,5'){

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"88","detay"=>"Toplam Korner 13.5 Alt/Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($ust_ver == '14,5'){

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"89","detay"=>"Toplam Korner 14.5 Alt/Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($ust_ver == '15,5'){

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"90","detay"=>"Toplam Korner 15.5 Alt/Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

}

if($GameTemplateId==4784) {
$oran1 = number_format($icoranlar[1]->Odds,2);
$oran2 = number_format($icoranlar[0]->Odds,2);

$ust_ver = $oranlar->attr;

if($ust_ver == '2,5'){

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"91","detay"=>"1.Takım Toplam Korner 2.5 Alt/Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($ust_ver == '3,5'){

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"92","detay"=>"1.Takım Toplam Korner 3.5 Alt/Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($ust_ver == '4,5'){

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"93","detay"=>"1.Takım Toplam Korner 4.5 Alt/Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($ust_ver == '5,5'){

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"94","detay"=>"1.Takım Toplam Korner 5.5 Alt/Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($ust_ver == '6,5'){

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"95","detay"=>"1.Takım Toplam Korner 6.5 Alt/Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($ust_ver == '7,5'){

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"96","detay"=>"1.Takım Toplam Korner 7.5 Alt/Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($ust_ver == '8,5'){

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"97","detay"=>"1.Takım Toplam Korner 8.5 Alt/Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($ust_ver == '9,5'){

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"98","detay"=>"1.Takım Toplam Korner 9.5 Alt/Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($ust_ver == '10,5'){

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"99","detay"=>"1.Takım Toplam Korner 10.5 Alt/Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

}

if($GameTemplateId==4785) {
$oran1 = number_format($icoranlar[1]->Odds,2);
$oran2 = number_format($icoranlar[0]->Odds,2);

$ust_ver = $oranlar->attr;

if($ust_ver == '2,5'){

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"100","detay"=>"2.Takım Toplam Korner 2.5 Alt/Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($ust_ver == '3,5'){

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"101","detay"=>"2.Takım Toplam Korner 3.5 Alt/Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($ust_ver == '4,5'){

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"102","detay"=>"2.Takım Toplam Korner 4.5 Alt/Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($ust_ver == '5,5'){

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"103","detay"=>"2.Takım Toplam Korner 5.5 Alt/Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($ust_ver == '6,5'){

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"104","detay"=>"2.Takım Toplam Korner 6.5 Alt/Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($ust_ver == '7,5'){

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"105","detay"=>"2.Takım Toplam Korner 7.5 Alt/Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($ust_ver == '8,5'){

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"106","detay"=>"2.Takım Toplam Korner 8.5 Alt/Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($ust_ver == '9,5'){

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"107","detay"=>"2.Takım Toplam Korner 9.5 Alt/Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($ust_ver == '10,5'){

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"108","detay"=>"2.Takım Toplam Korner 10.5 Alt/Üst","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

}

if($GameTemplateId==17925) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"109","detay"=>"Korner Tek/Çift","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2);
}
}

if($GameTemplateId==4793) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"110","detay"=>"Hangi Takım Daha Çok Korner Kullanır ?","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2,"oran3"=>$oran3,"visible3"=>$visible3);
}
}



if($GameTemplateId==21077) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"110","detay"=>"Kalan Süre Tahmini - skor:0-0","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2,"oran3"=>$oran3,"visible3"=>$visible3);
}
}

if($GameTemplateId==21057) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"110","detay"=>"Kalan Süre Tahmini - skor:1-0","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2,"oran3"=>$oran3,"visible3"=>$visible3);
}
}

if($GameTemplateId==21056) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"110","detay"=>"Kalan Süre Tahmini - skor:0-1","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2,"oran3"=>$oran3,"visible3"=>$visible3);
}
}

if($GameTemplateId==21078) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"110","detay"=>"Kalan Süre Tahmini - skor:1-1","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2,"oran3"=>$oran3,"visible3"=>$visible3);
}
}

if($GameTemplateId==21059) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"110","detay"=>"Kalan Süre Tahmini - skor:2-0","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2,"oran3"=>$oran3,"visible3"=>$visible3);
}
}

if($GameTemplateId==21058) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"110","detay"=>"Kalan Süre Tahmini - skor:0-2","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2,"oran3"=>$oran3,"visible3"=>$visible3);
}
}

if($GameTemplateId==21093) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"110","detay"=>"Kalan Süre Tahmini - skor:2-1","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2,"oran3"=>$oran3,"visible3"=>$visible3);
}
}

if($GameTemplateId==21092) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"110","detay"=>"Kalan Süre Tahmini - skor:1-2","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2,"oran3"=>$oran3,"visible3"=>$visible3);
}
}

if($GameTemplateId==21061) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"110","detay"=>"Kalan Süre Tahmini - skor:3-0","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2,"oran3"=>$oran3,"visible3"=>$visible3);
}
}

if($GameTemplateId==21060) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"110","detay"=>"Kalan Süre Tahmini - skor:0-3","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2,"oran3"=>$oran3,"visible3"=>$visible3);
}
}

if($GameTemplateId==21079) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"110","detay"=>"Kalan Süre Tahmini - skor:2-2","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2,"oran3"=>$oran3,"visible3"=>$visible3);
}
}

if($GameTemplateId==21094) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"110","detay"=>"Kalan Süre Tahmini - skor:1-3","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2,"oran3"=>$oran3,"visible3"=>$visible3);
}
}

if($GameTemplateId==21063) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"110","detay"=>"Kalan Süre Tahmini - skor:4-0","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2,"oran3"=>$oran3,"visible3"=>$visible3);
}
}

if($GameTemplateId==21065) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"110","detay"=>"Kalan Süre Tahmini - skor:5-0","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2,"oran3"=>$oran3,"visible3"=>$visible3);
}
}

if($GameTemplateId==21097) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"110","detay"=>"Kalan Süre Tahmini - skor:4-1","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2,"oran3"=>$oran3,"visible3"=>$visible3);
}
}

if($GameTemplateId==21102) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"110","detay"=>"Kalan Süre Tahmini - skor:3-2","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2,"oran3"=>$oran3,"visible3"=>$visible3);
}
}

if($GameTemplateId==21080) {
$oran1 = number_format($icoranlar[0]->Odds,2);
$oran2 = number_format($icoranlar[1]->Odds,2);
$oran3 = number_format($icoranlar[2]->Odds,2);

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="true"){
$json['veriler']['oranlar'][] = array("GameTemplateId"=>"110","detay"=>"Kalan Süre Tahmini - skor:3-3","oran1"=>$oran1,"visible1"=>$visible1,"oran2"=>$oran2,"visible2"=>$visible2,"oran3"=>$oran3,"visible3"=>$visible3);
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