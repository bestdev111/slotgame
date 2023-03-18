<?php
session_start();
@header("Content-type: text/html; charset=utf-8");
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:login.php"); exit(); die(); }

$dil_bilgisi = bilgi("select * from language_content where name='".$ub['username']."' limit 1");

$mac_id = $_GET['eventid'];
$sportipi = $_GET['sportipi'];

$karsilasmayok = 0;
$games_varmi = 0;

if($sportipi=="4"){

if($mac_id){
error_reporting(0);
header('Content-type: application/json');

if($dil_bilgisi['language']=='ru'){

function LiveTRmsg($msg = 0){
$r = array('Suspended','Red card to','Yellow card to','Goal kick to','Corner to','Halftime','Free kick to','Throw in to','1st Half','No clear indication of added time','2nd Half','Goal for','Goal by','added time','minutes','minute','by penalty','scored by shot','Players are coming out','Game about to start','Offside to','Substitution','Finished','Regular time over','by head','Photo taking','National anthem singing','Shake hands','by shot','goal kick','Last to happen','Players lined up','Penalty awarded to','Penalty missed','penalty missed','Kick-off','First goalkeeper','1st','2nd','3rd','4th','5th','6th','7th','8th','9th','10th','11th','12th','13th','Extra Time over');
$rp = array('Приостановленный','Красная карточка','Желтая карточка','удар от ворот','угловой','Половина времени','Штрафной удар','вбрасывание','Первая половина','показаны расширения','Вторая половина','озеро','озеро','добавленное время','минута','минута','пробил пенальти','Выстрелил выстрелом','Игроки выходят на поле','Матч вот-вот начнется','Офсайд','Смена игрока','Это закончилось','Обычное время истекло','выстрел в голову','Фотография сделана','Государственный гимн играет','Игроки пожимают друг другу руки','Выстрелил выстрелом','удар от ворот','последнее событие','Выстраиваются игроки','пенальти','пенальти','Не забил пенальти','подать мяч','первый удар от ворот','1.','2.','3.','4.','5.','6.','7.','8.','9.','10.','11.','12.','13.','Расширение завершено');
return str_replace($r,$rp,$msg);
}

} else if($dil_bilgisi['language']=='en'){

function LiveTRmsg($msg = 0){
$r = array('Suspended','Red card to','Yellow card to','Goal kick to','Corner to','Halftime','Free kick to','Throw in to','1st Half','No clear indication of added time','2nd Half','Goal for','Goal by','added time','minutes','minute','by penalty','scored by shot','Players are coming out','Game about to start','Offside to','Substitution','Finished','Regular time over','by head','Photo taking','National anthem singing','Shake hands','by shot','goal kick','Last to happen','Players lined up','Penalty awarded to','Penalty missed','penalty missed','Kick-off','First goalkeeper','1st','2nd','3rd','4th','5th','6th','7th','8th','9th','10th','11th','12th','13th','Extra Time over');
$rp = array('Suspended','Red card','Yellow card','Goal kick','Corner kick','Half time','Free kick','Throw in','First half','extensions are shown','Second half','Goal','Goal','Added time','Minute','Minute','Kicked off penalty','Shot with a shot','Players take the field','The match is about to start','Offside','Player change','It ended','Regular time has expired','Head shot','Photo being taken','The national anthem is played','Players shaking hands','Shot with a shot','Goal kick','Last event','Players line up','Penalty kick','Penalty kick','Didnt score the penalty','Kick off','First goal kick','1.','2.','3.','4.','5.','6.','7.','8.','9.','10.','11.','12.','13.','Overtime Ended');
return str_replace($r,$rp,$msg);
}

} else if($dil_bilgisi['language']=='de'){

function LiveTRmsg($msg = 0){
$r = array('Suspended','Red card to','Yellow card to','Goal kick to','Corner to','Halftime','Free kick to','Throw in to','1st Half','No clear indication of added time','2nd Half','Goal for','Goal by','added time','minutes','minute','by penalty','scored by shot','Players are coming out','Game about to start','Offside to','Substitution','Finished','Regular time over','by head','Photo taking','National anthem singing','Shake hands','by shot','goal kick','Last to happen','Players lined up','Penalty awarded to','Penalty missed','penalty missed','Kick-off','First goalkeeper','1st','2nd','3rd','4th','5th','6th','7th','8th','9th','10th','11th','12th','13th','Extra Time over');
$rp = array('Suspendiert','Rote Karte','Gelbe Karte','Abstoß','Eckstoß','Halbzeit','Freistoß','Einwerfen','Erste Hälfte','Erweiterungen werden angezeigt','Zweite Hälfte','Goal','Goal','Zusätzliche Zeit','Minute','Minute','Elfmeter geschossen','Mit einem Schuss erschossen','Spieler erobern das Feld','Das Match geht gleich los','Abseits','Spielerwechsel','Es endet','Reguläre Zeit ist abgelaufen','Kopfschuss','Foto wird gemacht','Die Nationalhymne wird gespielt','Spieler beim Händeschütteln','Mit einem Schuss erschossen','Abstoß','Letzte Veranstaltung','Spieler stellen sich auf','Elfmeter','Elfmeter nicht geschossen','Elfmeter nicht geschossen','beginnen','erster Torschuss','1.','2.','3.','4.','5.','6.','7.','8.','9.','10.','11.','12.','13.','Überstunden beendet');
return str_replace($r,$rp,$msg);
}

} else if($dil_bilgisi['language']=='ar'){

function LiveTRmsg($msg = 0){
$r = array('Suspended','Red card to','Yellow card to','Goal kick to','Corner to','Halftime','Free kick to','Throw in to','1st Half','No clear indication of added time','2nd Half','Goal for','Goal by','added time','minutes','minute','by penalty','scored by shot','Players are coming out','Game about to start','Offside to','Substitution','Finished','Regular time over','by head','Photo taking','National anthem singing','Shake hands','by shot','goal kick','Last to happen','Players lined up','Penalty awarded to','Penalty missed','penalty missed','Kick-off','First goalkeeper','1st','2nd','3rd','4th','5th','6th','7th','8th','9th','10th','11th','12th','13th','Extra Time over');
$rp = array('Askıya Alındı','Kırmızı kart','Sarı kart','Kale vuruşu','Köşe vuruşu','Devre arası','Serbest vuruş','Taç atışı','İlk Yarı','uzatmalar gösteriliyor','İkinci Yarı','Gol','Gol','eklenen süre','dakika','dakika','penaltıdan atıldı','Şutla atıldı','Oyuncular sahaya çıkıyor','Maç başlamak üzere','Ofsayt','Oyuncu degisikligi','Sona erdi','Normal süre sona erdi','kafa vurusu','Fotograf cektiriliyor','Ulusal marş okunuyor','Oyuncular tokalaşıyor','Sutla atıldı','kale vuruşu','son gerçekleşen olay','Oyuncular sıra halinde diziliyor','Penaltı vuruşu','Penaltıyı atamadı','Penaltıyı atamadı','Başlama vuruşu','İlk kale vuruşu','1.','2.','3.','4.','5.','6.','7.','8.','9.','10.','11.','12.','13.','Uzatmalar Bitti');
return str_replace($r,$rp,$msg);
}

} else {

function LiveTRmsg($msg = 0){
$r = array('Suspended','Red card to','Yellow card to','Goal kick to','Corner to','Halftime','Free kick to','Throw in to','1st Half','No clear indication of added time','2nd Half','Goal for','Goal by','added time','minutes','minute','by penalty','scored by shot','Players are coming out','Game about to start','Offside to','Substitution','Finished','Regular time over','by head','Photo taking','National anthem singing','Shake hands','by shot','goal kick','Last to happen','Players lined up','Penalty awarded to','Penalty missed','penalty missed','Kick-off','First goalkeeper','1st','2nd','3rd','4th','5th','6th','7th','8th','9th','10th','11th','12th','13th','Extra Time over');
$rp = array('Askıya Alındı','Kırmızı kart','Sarı kart','Kale vuruşu','Köşe vuruşu','Devre arası','Serbest vuruş','Taç atışı','İlk Yarı','uzatmalar gösteriliyor','İkinci Yarı','Gol','Gol','eklenen süre','dakika','dakika','penaltıdan atıldı','Şutla atıldı','Oyuncular sahaya çıkıyor','Maç başlamak üzere','Ofsayt','Oyuncu degisikligi','Sona erdi','Normal süre sona erdi','kafa vurusu','Fotograf cektiriliyor','Ulusal marş okunuyor','Oyuncular tokalaşıyor','Sutla atıldı','kale vuruşu','son gerçekleşen olay','Oyuncular sıra halinde diziliyor','Penaltı vuruşu','Penaltıyı atamadı','Penaltıyı atamadı','Başlama vuruşu','İlk kale vuruşu','1.','2.','3.','4.','5.','6.','7.','8.','9.','10.','11.','12.','13.','Uzatmalar Bitti');
return str_replace($r,$rp,$msg);
}

}

function bahisVeri($id) {
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://betwingo.xyz/api/canli_bilgiler_oran.php?tip=futbol&id=".$id."");
// curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 25);
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
$karsilasmayok++;
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

$evtakim = $match->h;
$deptakim = $match->a;
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
$betradarid = $match->radarid;
$simulation = $match->smid;
$lig_id = $match->lid;
$lig_adi = $match->lig;
$ulke_id = $match->uid;
$ulke_adi = $match->ulke;
$newtimestamp = $match->actionts;
$tarih = date('Y-m-d H:i:s', $newtimestamp);
$baslangic_tarih = date('Y-m-d H:i', $newtimestamp);

$suanki_strtotime_ver = time();
$suanki_saat_ver = date("Y-m-d H:i:s",$suanki_strtotime_ver);

$saatleri_cikar_bakalim = strtotime($suanki_saat_ver)-strtotime($tarih);
$saatleri_bol_simdide = $saatleri_cikar_bakalim/60;

$seconds_getir = $match->secound;
if($seconds_getir>0){
	$seconds_ver = $match->secound/60;
} else {
	$seconds_ver = 0;
}

$baslangic_tarih2 = $match->sdate;
$baslangic_saat2 = $match->sht;

$dakikayi_ver_hadi = $saatleri_bol_simdide+$seconds_ver;
$dakikayi_hadi_bol = explode(".",$dakikayi_ver_hadi);
$dakikayi_ver_hadi = $dakikayi_hadi_bol[0];

$periodId = $match->pid;

if($ev_tisort && $ev_sort && $konuk_tisort && $konuk_sort){
$json = array(
"eid"=>$mac_id,
"prv"=>"0",
"n"=>"".$evtakim." - ".$deptakim."",
"spid"=>"4",
"spidname"=>"Football",
"lid"=>$lig_id,
"lig"=>$lig_adi,
"h"=>$evtakim,
"a"=>$deptakim,
"hshtcolor"=>$ev_sort,
"htshtcolor"=>$ev_tisort,
"ashtcolor"=>$konuk_sort,
"atshtcolor"=>$konuk_tisort,
"run"=>true,
"actionts"=>"".$newtimestamp."",
"referedate"=>"".$newtimestamp."000",
"secound"=>"".$seconds_getir."",
"reftime"=>"".$newtimestamp."",
"addicon"=>"",
"reftimet"=>"".$newtimestamp."",
"tvisible"=>true,
"tv"=>"",
"pid"=>"".$periodId."",
"dk"=>"".$dakikayi_ver_hadi."",
"sn"=>"00",
"uid"=>"".$ulke_id."",
"ulke"=>$ulke_adi,
"sdate"=>"".$baslangic_tarih2."",
"sht"=>"".$baslangic_saat2."",
"radarid"=>"".$betradarid."",
"smid"=>"".$simulation."",
"gseri"=>"0",
"sch"=>"".$skor_ev."",
"sca"=>"".$skor_dep."",
"isch"=>"".$skor_ev_iy."",
"isca"=>"".$skor_dep_iy."",
"crnh"=>"".$korner_1."",
"crna"=>"".$korner_2."",
"redh"=>"".$kirmizi_kart_1."",
"reda"=>"".$kirmizi_kart_2."",
"serph"=>"0",
"serpa"=>"0",
"ycardh"=>"".$sari_kart_1."",
"ycarda"=>"".$sari_kart_2."",
"pnlth"=>"".$penalti_1."",
"pnlta"=>"".$penalti_2."",
"turn"=>"0",
"turnvis"=>"0"
);
}

foreach($match->Msg as $keysss => $messagesver){
$mesajtypesi = $messagesver->type;
$mesajteam = $messagesver->team;
$mesajtime = $messagesver->dk;
$aciklamasi = LiveTRmsg($messagesver->N);

$json['Msg'][] = array("id"=>$keysss,"type"=>$mesajtypesi,"dk"=>$mesajtime,"team"=>$mesajteam,"N"=>$aciklamasi);

}

foreach($match->oran as $oranlar){

$games_varmi++;

$GameTemplateId = $oranlar->tempid;
$icoranlar = $oranlar->rest;

if($GameTemplateId==17) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"1X2","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"1X2","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"1X2","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;
$oran_visible = $oranlar->o;

$json['live']['17'] = array("tempid"=>"17","N2"=>"".getTranslation('futboloran1')."","N"=>"1X2","id"=>"1","o"=>$oran_visible);

$json['live']['17']['games'][] = array(
"Id"=>"1",
"EGID"=>"1",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"17"
);

$json['live']['17']['games'][] = array(
"Id"=>"2",
"EGID"=>"1",
"Namexxx"=>"X","Name"=>"X",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"17"
);

$json['live']['17']['games'][] = array(
"Id"=>"3",
"EGID"=>"1",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"17"
);

}



if($GameTemplateId==54) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Handikap 1:0","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Handikap 1:0","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"Handikap 1:0","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;
$oran_visible = $oranlar->o;

$json['live']['54'] = array("tempid"=>"54","N2"=>"".getTranslation('futboloran3')."","N"=>"Handikap 1:0","id"=>"2","o"=>$oran_visible);

$json['live']['54']['games'][] = array(
"Id"=>"4",
"EGID"=>"2",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"54"
);

$json['live']['54']['games'][] = array(
"Id"=>"5",
"EGID"=>"2",
"Namexxx"=>"X","Name"=>"X",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"54"
);

$json['live']['54']['games'][] = array(
"Id"=>"6",
"EGID"=>"2",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"54"
);

}

if($GameTemplateId==502) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Handikap 2:0","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Handikap 2:0","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"Handikap 2:0","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;

$json['live']['502'] = array("tempid"=>"502","N2"=>"".getTranslation('futboloran5')."","N"=>"Handikap 2:0","id"=>"3","o"=>$oran_visible);

$json['live']['502']['games'][] = array(
"Id"=>"7",
"EGID"=>"3",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"502"
);

$json['live']['502']['games'][] = array(
"Id"=>"8",
"EGID"=>"3",
"Namexxx"=>"X","Name"=>"X",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"502"
);

$json['live']['502']['games'][] = array(
"Id"=>"9",
"EGID"=>"3",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"502"
);

}

if($GameTemplateId==52) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Handikap 0:1","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Handikap 0:1","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"Handikap 0:1","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;

$json['live']['52'] = array("tempid"=>"52","N2"=>"".getTranslation('futboloran2')."","N"=>"Handikap 0:1","id"=>"4","o"=>$oran_visible);

$json['live']['52']['games'][] = array(
"Id"=>"10",
"EGID"=>"4",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"52"
);

$json['live']['52']['games'][] = array(
"Id"=>"11",
"EGID"=>"4",
"Namexxx"=>"X","Name"=>"X",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"52"
);

$json['live']['52']['games'][] = array(
"Id"=>"12",
"EGID"=>"4",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"52"
);

}

if($GameTemplateId==501) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Handikap 0:2","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Handikap 0:2","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"Handikap 0:2","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;

$json['live']['501'] = array("tempid"=>"501","N2"=>"".getTranslation('futboloran4')."","N"=>"Handikap 0:2","id"=>"5","o"=>$oran_visible);

$json['live']['501']['games'][] = array(
"Id"=>"13",
"EGID"=>"5",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"501"
);

$json['live']['501']['games'][] = array(
"Id"=>"14",
"EGID"=>"5",
"Namexxx"=>"X","Name"=>"X",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"501"
);

$json['live']['501']['games'][] = array(
"Id"=>"15",
"EGID"=>"5",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"501"
);

}

if($GameTemplateId==3187) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Çifte Şans","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Çifte Şans","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"Çifte Şans","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;

$json['live']['3187'] = array("tempid"=>"3187","N2"=>"".getTranslation('futboloran58')."","N"=>"Çifte Şans","id"=>"6","o"=>$oran_visible);

$json['live']['3187']['games'][] = array(
"Id"=>"16",
"EGID"=>"6",
"Namexxx"=>"".getTranslation('oransecenek35')."","Name"=>"1 ve X",
"Name1X2"=>"1X",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"3187"
);

$json['live']['3187']['games'][] = array(
"Id"=>"17",
"EGID"=>"6",
"Namexxx"=>"".getTranslation('oransecenek36')."","Name"=>"X ve 2",
"Name1X2"=>"X2",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"3187"
);

$json['live']['3187']['games'][] = array(
"Id"=>"18",
"EGID"=>"6",
"Namexxx"=>"".getTranslation('oransecenek37')."","Name"=>"1 ve 2",
"Name1X2"=>"12",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"3187"
);

}

if($GameTemplateId==11748) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"1.Yarı Çifte Şans","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"1.Yarı Çifte Şans","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"1.Yarı Çifte Şans","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;

$json['live']['11748'] = array("tempid"=>"11748","N2"=>"".getTranslation('futboloran8')."","N"=>"1.Yarı Çifte Şans","id"=>"7","o"=>$oran_visible);

$json['live']['11748']['games'][] = array(
"Id"=>"19",
"EGID"=>"7",
"Namexxx"=>"".getTranslation('oransecenek35')."","Name"=>"1 ve X",
"Name1X2"=>"1X",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"11748"
);

$json['live']['11748']['games'][] = array(
"Id"=>"20",
"EGID"=>"7",
"Namexxx"=>"".getTranslation('oransecenek36')."","Name"=>"X ve 2",
"Name1X2"=>"X2",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"11748"
);

$json['live']['11748']['games'][] = array(
"Id"=>"21",
"EGID"=>"7",
"Namexxx"=>"".getTranslation('oransecenek37')."","Name"=>"1 ve 2",
"Name1X2"=>"12",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"11748"
);

}

if($GameTemplateId==7688) {
$oran2_ver = number_format($icoranlar[0]->Odds,2);
$oran1_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"1.Yarı 0.5 Gol Alt Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"1.Yarı 0.5 Gol Alt Üst","futbol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$oran_visible = $oranlar->o;

$json['live']['7688'] = array("tempid"=>"7688","N2"=>"".getTranslation('futboloran18')."","N"=>"1.Yarı 0.5 Gol Alt Üst","id"=>"8","o"=>$oran_visible);

$json['live']['7688']['games'][] = array(
"Id"=>"21",
"EGID"=>"8",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 0.5","Name"=>"Üst 0.5",
"Name1X2"=>"+",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"7688"
);

$json['live']['7688']['games'][] = array(
"Id"=>"22",
"EGID"=>"8",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 0.5","Name"=>"Alt 0.5",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"7688"
);

}

if($GameTemplateId==7689) {
$oran2_ver = number_format($icoranlar[0]->Odds,2);
$oran1_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"1.Yarı 1.5 Gol Alt Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"1.Yarı 1.5 Gol Alt Üst","futbol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$oran_visible = $oranlar->o;

$json['live']['7689'] = array("tempid"=>"7689","N2"=>"".getTranslation('futboloran19')."","N"=>"1.Yarı 1.5 Gol Alt Üst","id"=>"9","o"=>$oran_visible);

$json['live']['7689']['games'][] = array(
"Id"=>"21",
"EGID"=>"9",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 1.5","Name"=>"Üst 1.5",
"Name1X2"=>"+",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"7689"
);

$json['live']['7689']['games'][] = array(
"Id"=>"22",
"EGID"=>"9",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 1.5","Name"=>"Alt 1.5",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"7689"
);

}

if($GameTemplateId==7890) {
$oran2_ver = number_format($icoranlar[0]->Odds,2);
$oran1_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"1.Yarı 2.5 Gol Alt Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"1.Yarı 2.5 Gol Alt Üst","futbol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$oran_visible = $oranlar->o;

$json['live']['7890'] = array("tempid"=>"7890","N2"=>"".getTranslation('futboloran20')."","N"=>"1.Yarı 2.5 Gol Alt Üst","id"=>"10","o"=>$oran_visible);

$json['live']['7890']['games'][] = array(
"Id"=>"21",
"EGID"=>"10",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 2.5","Name"=>"Üst 2.5",
"Name1X2"=>"+",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"7890"
);

$json['live']['7890']['games'][] = array(
"Id"=>"22",
"EGID"=>"10",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 2.5","Name"=>"Alt 2.5",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"7890"
);

}

if($GameTemplateId==7233) {
$oran2_ver = number_format($icoranlar[0]->Odds,2);
$oran1_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Toplam 0.5 Gol Alt Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Toplam 0.5 Gol Alt Üst","futbol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$oran_visible = $oranlar->o;

$json['live']['7233'] = array("tempid"=>"7233","N2"=>"".getTranslation('futboloran11')."","N"=>"Toplam 0.5 Gol Alt Üst","id"=>"11","o"=>$oran_visible);

$json['live']['7233']['games'][] = array(
"Id"=>"23",
"EGID"=>"11",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 0.5","Name"=>"Üst 0.5",
"Name1X2"=>"+",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"7233"
);

$json['live']['7233']['games'][] = array(
"Id"=>"24",
"EGID"=>"11",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 0.5","Name"=>"Alt 0.5",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"7233"
);

}

if($GameTemplateId==1772) {
$oran2_ver = number_format($icoranlar[0]->Odds,2);
$oran1_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Toplam 1.5 Gol Alt Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Toplam 1.5 Gol Alt Üst","futbol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$oran_visible = $oranlar->o;

$json['live']['1772'] = array("tempid"=>"1772","N2"=>"".getTranslation('futboloran12')."","N"=>"Toplam 1.5 Gol Alt Üst","id"=>"12","o"=>$oran_visible);

$json['live']['1772']['games'][] = array(
"Id"=>"25",
"EGID"=>"12",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 1.5","Name"=>"Üst 1.5",
"Name1X2"=>"+",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"1772"
);

$json['live']['1772']['games'][] = array(
"Id"=>"26",
"EGID"=>"12",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 1.5","Name"=>"Alt 1.5",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"1772"
);

}

if($GameTemplateId==173) {
$oran2_ver = number_format($icoranlar[0]->Odds,2);
$oran1_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Toplam 2.5 Gol Alt Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Toplam 2.5 Gol Alt Üst","futbol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$oran_visible = $oranlar->o;

$json['live']['173'] = array("tempid"=>"173","N2"=>"".getTranslation('futboloran13')."","N"=>"Toplam 2.5 Gol Alt Üst","id"=>"13","o"=>$oran_visible);

$json['live']['173']['games'][] = array(
"Id"=>"27",
"EGID"=>"13",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 2.5","Name"=>"Üst 2.5",
"Name2"=>"Ü",
"Name1X2"=>"+",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"173"
);

$json['live']['173']['games'][] = array(
"Id"=>"28",
"EGID"=>"13",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 2.5","Name"=>"Alt 2.5",
"Name2"=>"A",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"173"
);

}

if($GameTemplateId==8933) {
$oran2_ver = number_format($icoranlar[0]->Odds,2);
$oran1_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Toplam 3.5 Gol Alt Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Toplam 3.5 Gol Alt Üst","futbol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$oran_visible = $oranlar->o;

$json['live']['8933'] = array("tempid"=>"8933","N2"=>"".getTranslation('futboloran14')."","N"=>"Toplam 3.5 Gol Alt Üst","id"=>"14","o"=>$oran_visible);

$json['live']['8933']['games'][] = array(
"Id"=>"29",
"EGID"=>"14",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 3.5","Name"=>"Üst 3.5",
"Name1X2"=>"+",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"8933"
);

$json['live']['8933']['games'][] = array(
"Id"=>"30",
"EGID"=>"14",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 3.5","Name"=>"Alt 3.5",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"8933"
);

}

if($GameTemplateId==1791) {
$oran2_ver = number_format($icoranlar[0]->Odds,2);
$oran1_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Toplam 4.5 Gol Alt Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Toplam 4.5 Gol Alt Üst","futbol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$oran_visible = $oranlar->o;

$json['live']['1791'] = array("tempid"=>"1791","N2"=>"".getTranslation('futboloran15')."","N"=>"Toplam 4.5 Gol Alt Üst","id"=>"15","o"=>$oran_visible);

$json['live']['1791']['games'][] = array(
"Id"=>"31",
"EGID"=>"15",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 4.5","Name"=>"Üst 4.5",
"Name1X2"=>"+",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"1791"
);

$json['live']['1791']['games'][] = array(
"Id"=>"32",
"EGID"=>"15",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 4.5","Name"=>"Alt 4.5",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"1791"
);

}

if($GameTemplateId==859) {
$oran2_ver = number_format($icoranlar[0]->Odds,2);
$oran1_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Toplam 5.5 Gol Alt Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Toplam 5.5 Gol Alt Üst","futbol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$oran_visible = $oranlar->o;

$json['live']['859'] = array("tempid"=>"859","N2"=>"".getTranslation('futboloran16')."","N"=>"Toplam 5.5 Gol Alt Üst","id"=>"16","o"=>$oran_visible);

$json['live']['859']['games'][] = array(
"Id"=>"33",
"EGID"=>"16",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 5.5","Name"=>"Üst 5.5",
"Name1X2"=>"+",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"859"
);

$json['live']['859']['games'][] = array(
"Id"=>"34",
"EGID"=>"16",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 5.5","Name"=>"Alt 5.5",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"859"
);

}

if($GameTemplateId==313) {
$oran2_ver = number_format($icoranlar[0]->Odds,2);
$oran1_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Toplam 6.5 Gol Alt Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Toplam 6.5 Gol Alt Üst","futbol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$oran_visible = $oranlar->o;

$json['live']['313'] = array("tempid"=>"313","N2"=>"Toplam 6.5 Gol Alt Üst","N"=>"Toplam 6.5 Gol Alt Üst","id"=>"16","o"=>$oran_visible);

$json['live']['313']['games'][] = array(
"Id"=>"33",
"EGID"=>"16",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 6.5","Name"=>"Üst 6.5",
"Name1X2"=>"+",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"313"
);

$json['live']['313']['games'][] = array(
"Id"=>"34",
"EGID"=>"16",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 6.5","Name"=>"Alt 6.5",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"313"
);

}

if($GameTemplateId==1383) {
$oran2_ver = number_format($icoranlar[0]->Odds,2);
$oran1_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Toplam 7.5 Gol Alt Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Toplam 7.5 Gol Alt Üst","futbol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$oran_visible = $oranlar->o;

$json['live']['1383'] = array("tempid"=>"1383","N2"=>"Toplam 7.5 Gol Alt Üst","N"=>"Toplam 7.5 Gol Alt Üst","id"=>"16","o"=>$oran_visible);

$json['live']['1383']['games'][] = array(
"Id"=>"33",
"EGID"=>"16",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 7.5","Name"=>"Üst 7.5",
"Name1X2"=>"+",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"1383"
);

$json['live']['1383']['games'][] = array(
"Id"=>"34",
"EGID"=>"16",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 7.5","Name"=>"Alt 7.5",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"1383"
);

}

if($GameTemplateId==322) {
$oran2_ver = number_format($icoranlar[0]->Odds,2);
$oran1_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Toplam 8.5 Gol Alt Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Toplam 8.5 Gol Alt Üst","futbol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$oran_visible = $oranlar->o;

$json['live']['322'] = array("tempid"=>"322","N2"=>"Toplam 8.5 Gol Alt Üst","N"=>"Toplam 8.5 Gol Alt Üst","id"=>"16","o"=>$oran_visible);

$json['live']['322']['games'][] = array(
"Id"=>"33",
"EGID"=>"16",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 8.5","Name"=>"Üst 8.5",
"Name1X2"=>"+",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"322"
);

$json['live']['322']['games'][] = array(
"Id"=>"34",
"EGID"=>"16",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 8.5","Name"=>"Alt 8.5",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"322"
);

}

if($GameTemplateId==19595) {
$oran2_ver = number_format($icoranlar[0]->Odds,2);
$oran1_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"2.Yarı 0.5 Gol Alt Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"2.Yarı 0.5 Gol Alt Üst","futbol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$oran_visible = $oranlar->o;

$json['live']['19595'] = array("tempid"=>"19595","N2"=>"".getTranslation('futboloran22')."","N"=>"2.Yarı 0.5 Gol Alt Üst","id"=>"17","o"=>$oran_visible);

$json['live']['19595']['games'][] = array(
"Id"=>"35",
"EGID"=>"17",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 0.5","Name"=>"Üst 0.5",
"Name1X2"=>"+",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"19595"
);

$json['live']['19595']['games'][] = array(
"Id"=>"36",
"EGID"=>"17",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 0.5","Name"=>"Alt 0.5",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"19595"
);

}

if($GameTemplateId==19596) {
$oran2_ver = number_format($icoranlar[0]->Odds,2);
$oran1_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"2.Yarı 1.5 Gol Alt Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"2.Yarı 1.5 Gol Alt Üst","futbol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$oran_visible = $oranlar->o;

$json['live']['19596'] = array("tempid"=>"19596","N2"=>"".getTranslation('futboloran23')."","N"=>"2.Yarı 1.5 Gol Alt Üst","id"=>"18","o"=>$oran_visible);

$json['live']['19596']['games'][] = array(
"Id"=>"37",
"EGID"=>"18",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 1.5","Name"=>"Üst 1.5",
"Name1X2"=>"+",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"19596"
);

$json['live']['19596']['games'][] = array(
"Id"=>"38",
"EGID"=>"18",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 1.5","Name"=>"Alt 1.5",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"19596"
);

}

if($GameTemplateId==19597) {
$oran2_ver = number_format($icoranlar[0]->Odds,2);
$oran1_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"2.Yarı 2.5 Gol Alt Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"2.Yarı 2.5 Gol Alt Üst","futbol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$oran_visible = $oranlar->o;

$json['live']['19597'] = array("tempid"=>"19597","N2"=>"".getTranslation('futboloran24')."","N"=>"2.Yarı 2.5 Gol Alt Üst","id"=>"19","o"=>$oran_visible);

$json['live']['19597']['games'][] = array(
"Id"=>"39",
"EGID"=>"19",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 2.5","Name"=>"Üst 2.5",
"Name1X2"=>"+",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"19597"
);

$json['live']['19597']['games'][] = array(
"Id"=>"40",
"EGID"=>"19",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 2.5","Name"=>"Alt 2.5",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"19597"
);

}

if($GameTemplateId==20506) {
$oran2_ver = number_format($icoranlar[0]->Odds,2);
$oran1_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"2.Yarı 3.5 Gol Alt Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"2.Yarı 3.5 Gol Alt Üst","futbol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$oran_visible = $oranlar->o;

$json['live']['20506'] = array("tempid"=>"20506","N2"=>"".getTranslation('futboloran25')."","N"=>"2.Yarı 3.5 Gol Alt Üst","id"=>"20","o"=>$oran_visible);

$json['live']['20506']['games'][] = array(
"Id"=>"41",
"EGID"=>"20",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 3.5","Name"=>"Üst 3.5",
"Name1X2"=>"+",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"20506"
);

$json['live']['20506']['games'][] = array(
"Id"=>"42",
"EGID"=>"20",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 3.5","Name"=>"Alt 3.5",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"20506"
);

}

if($GameTemplateId==7824) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Karşılıklı Gol Olurmu ?","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Karşılıklı Gol Olurmu ?","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;

$json['live']['7824'] = array("tempid"=>"7824","N2"=>"".getTranslation('futboloran28')."","N"=>"Karşılıklı Gol Olurmu ?","id"=>"21","o"=>$oran_visible);

$json['live']['7824']['games'][] = array(
"Id"=>"43",
"EGID"=>"21",
"hcoun"=>"5",
"Namexxx"=>"".getTranslation('oransecenek23')."","Name"=>"Evet",
"Name1X2"=>"E",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"7824"
);

$json['live']['7824']['games'][] = array(
"Id"=>"44",
"EGID"=>"21",
"hcoun"=>"3",
"Namexxx"=>"".getTranslation('oransecenek24')."","Name"=>"Hayır",
"Name1X2"=>"H",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"7824"
);

}

if($GameTemplateId==11087) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Ev Sahibi Müsabakada Gol Atarmı ?","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Ev Sahibi Müsabakada Gol Atarmı ?","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;

$json['live']['11087'] = array("tempid"=>"11087","N2"=>"".getTranslation('futboloran26')."","N"=>"Ev Sahibi Müsabakada Gol Atarmı ?","id"=>"22","o"=>$oran_visible);

$json['live']['11087']['games'][] = array(
"Id"=>"45",
"EGID"=>"22",
"hcoun"=>"5",
"Namexxx"=>"".getTranslation('oransecenek23')."","Name"=>"Evet",
"Name1X2"=>"E",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"11087"
);

$json['live']['11087']['games'][] = array(
"Id"=>"46",
"EGID"=>"22",
"hcoun"=>"3",
"Namexxx"=>"".getTranslation('oransecenek24')."","Name"=>"Hayır",
"Name1X2"=>"H",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"11087"
);

}

if($GameTemplateId==11086) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Deplasman Müsabakada Gol Atarmı ?","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Deplasman Müsabakada Gol Atarmı ?","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;

$json['live']['11086'] = array("tempid"=>"11086","N2"=>"".getTranslation('futboloran27')."","N"=>"Deplasman Müsabakada Gol Atarmı ?","id"=>"23","o"=>$oran_visible);

$json['live']['11086']['games'][] = array(
"Id"=>"47",
"EGID"=>"23",
"hcoun"=>"5",
"Namexxx"=>"".getTranslation('oransecenek23')."","Name"=>"Evet",
"Name1X2"=>"E",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"11086"
);

$json['live']['11086']['games'][] = array(
"Id"=>"48",
"EGID"=>"23",
"hcoun"=>"3",
"Namexxx"=>"".getTranslation('oransecenek24')."","Name"=>"Hayır",
"Name1X2"=>"H",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"11086"
);

}

if($GameTemplateId==4665) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Toplam Gol Tek / Çift","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Toplam Gol Tek / Çift","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;

$json['live']['4665'] = array("tempid"=>"4665","N2"=>"".getTranslation('futboloran30')."","N"=>"Toplam Gol Tek / Çift","id"=>"24","o"=>$oran_visible);

$json['live']['4665']['games'][] = array(
"Id"=>"49",
"EGID"=>"24",
"hcoun"=>"5",
"Namexxx"=>"".getTranslation('oransecenek29')."","Name"=>"Çift",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"4665"
);

$json['live']['4665']['games'][] = array(
"Id"=>"50",
"EGID"=>"24",
"hcoun"=>"3",
"Namexxx"=>"".getTranslation('oransecenek28')."","Name"=>"Tek",
"Name1X2"=>"T",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"4665"
);

}

if($GameTemplateId==16449) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"1.Yarı Tek / Çift","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"1.Yarı Tek / Çift","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;

$json['live']['16449'] = array("tempid"=>"16449","N2"=>"".getTranslation('futboloran29')."","N"=>"1.Yarı Tek / Çift","id"=>"25","o"=>$oran_visible);

$json['live']['16449']['games'][] = array(
"Id"=>"51",
"EGID"=>"25",
"hcoun"=>"5",
"Namexxx"=>"".getTranslation('oransecenek29')."","Name"=>"Çift",
"Name1X2"=>"Ç",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"16449"
);

$json['live']['16449']['games'][] = array(
"Id"=>"52",
"EGID"=>"25",
"hcoun"=>"3",
"Namexxx"=>"".getTranslation('oransecenek28')."","Name"=>"Tek",
"Name1X2"=>"T",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"16449"
);

}

if($GameTemplateId==15085) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"1.Yarı Karşılıklı Gol","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"1.Yarı Karşılıklı Gol","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;

$json['live']['15085'] = array("tempid"=>"15085","N2"=>"".getTranslation('futboloran9')."","N"=>"1.Yarı Karşılıklı Gol","id"=>"26","o"=>$oran_visible);

$json['live']['15085']['games'][] = array(
"Id"=>"53",
"EGID"=>"26",
"Namexxx"=>"".getTranslation('oransecenek23')."","Name"=>"Evet",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"15085"
);

$json['live']['15085']['games'][] = array(
"Id"=>"54",
"EGID"=>"26",
"Namexxx"=>"".getTranslation('oransecenek24')."","Name"=>"Hayır",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"15085"
);

}

if($GameTemplateId==24392) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);
$oran4_ver = number_format($icoranlar[3]->Odds,2);
$oran5_ver = number_format($icoranlar[4]->Odds,2);
$oran6_ver = number_format($icoranlar[5]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Maç Sonucu ve Karşılıklı Gol","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Maç Sonucu ve Karşılıklı Gol","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"Maç Sonucu ve Karşılıklı Gol","futbol");
$oran4 = dusenoranbulcanli($oran4_ver,"Maç Sonucu ve Karşılıklı Gol","futbol");
$oran5 = dusenoranbulcanli($oran5_ver,"Maç Sonucu ve Karşılıklı Gol","futbol");
$oran6 = dusenoranbulcanli($oran6_ver,"Maç Sonucu ve Karşılıklı Gol","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;
$visible4 = $icoranlar[3]->Visible;
$visible5 = $icoranlar[4]->Visible;
$visible6 = $icoranlar[5]->Visible;

$oran_visible = $oranlar->o;

$json['live']['24392'] = array("tempid"=>"24392","N2"=>"".getTranslation('futboloran55')."","N"=>"Maç Sonucu ve Karşılıklı Gol","id"=>"27","o"=>$oran_visible);

$json['live']['24392']['games'][] = array(
"Id"=>"55",
"EGID"=>"27",
"Namexxx"=>"".getTranslation('oransecenek48')."","Name"=>"Ev Gol Yiyerek Kazanır",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"24392"
);

$json['live']['24392']['games'][] = array(
"Id"=>"56",
"EGID"=>"27",
"Namexxx"=>"".getTranslation('oransecenek49')."","Name"=>"Dep Gol Yiyerek Kazanır",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"24392"
);

$json['live']['24392']['games'][] = array(
"Id"=>"57",
"EGID"=>"27",
"Namexxx"=>"".getTranslation('oransecenek50')."","Name"=>"Ev Gol Yemeden Kazanır",
"Name1X2"=>"",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"24392"
);

$json['live']['24392']['games'][] = array(
"Id"=>"58",
"EGID"=>"27",
"Namexxx"=>"".getTranslation('oransecenek51')."","Name"=>"Dep Gol Yemeden Kazanır",
"Name1X2"=>"",
"Visible"=>$visible4,
"Odds"=>"".$oran4."",
"templateId"=>"24392"
);

$json['live']['24392']['games'][] = array(
"Id"=>"59",
"EGID"=>"27",
"Namexxx"=>"".getTranslation('oransecenek52')."","Name"=>"İki takım da gol atamaz",
"Name1X2"=>"",
"Visible"=>$visible5,
"Odds"=>"".$oran5."",
"templateId"=>"24392"
);

$json['live']['24392']['games'][] = array(
"Id"=>"60",
"EGID"=>"27",
"Namexxx"=>"".getTranslation('oransecenek53')."","Name"=>"İki takım da gol atar ve berabere biter",
"Name1X2"=>"",
"Visible"=>$visible6,
"Odds"=>"".$oran6."",
"templateId"=>"24392"
);

}

if($GameTemplateId==20083) {
$oran2_ver = number_format($icoranlar[0]->Odds,2);
$oran1_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Ev Sahibi 0.5 Gol Alt Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Ev Sahibi 0.5 Gol Alt Üst","futbol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$oran_visible = $oranlar->o;

$json['live']['20083'] = array("tempid"=>"20083","N2"=>"".getTranslation('futboloran102')."","N"=>"Ev Sahibi 0.5 Gol Alt Üst","id"=>"28","o"=>$oran_visible);

$json['live']['20083']['games'][] = array(
"Id"=>"61",
"EGID"=>"28",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 0.5","Name"=>"Üst 0.5",
"Name1X2"=>"+",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"20083"
);

$json['live']['20083']['games'][] = array(
"Id"=>"62",
"EGID"=>"28",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 0.5","Name"=>"Alt 0.5",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"20083"
);

}

if($GameTemplateId==16454) {
$oran2_ver = number_format($icoranlar[0]->Odds,2);
$oran1_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Ev Sahibi 1.5 Gol Alt Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Ev Sahibi 1.5 Gol Alt Üst","futbol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$oran_visible = $oranlar->o;

$json['live']['16454'] = array("tempid"=>"16454","N2"=>"".getTranslation('futboloran103')."","N"=>"Ev Sahibi 1.5 Gol Alt Üst","id"=>"29","o"=>$oran_visible);

$json['live']['16454']['games'][] = array(
"Id"=>"63",
"EGID"=>"29",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 1.5","Name"=>"Üst 1.5",
"Name1X2"=>"+",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"16454"
);

$json['live']['16454']['games'][] = array(
"Id"=>"64",
"EGID"=>"29",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 1.5","Name"=>"Alt 1.5",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"16454"
);

}

if($GameTemplateId==24138) {
$oran2_ver = number_format($icoranlar[0]->Odds,2);
$oran1_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Ev Sahibi 2.5 Gol Alt Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Ev Sahibi 2.5 Gol Alt Üst","futbol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$oran_visible = $oranlar->o;

$json['live']['24138'] = array("tempid"=>"24138","N2"=>"".getTranslation('futboloran104')."","N"=>"Ev Sahibi 2.5 Gol Alt Üst","id"=>"30","o"=>$oran_visible);

$json['live']['24138']['games'][] = array(
"Id"=>"65",
"EGID"=>"30",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 2.5","Name"=>"Üst 2.5",
"Name1X2"=>"+",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"24138"
);

$json['live']['24138']['games'][] = array(
"Id"=>"66",
"EGID"=>"30",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 2.5","Name"=>"Alt 2.5",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"24138"
);

}

if($GameTemplateId==20084) {
$oran2_ver = number_format($icoranlar[0]->Odds,2);
$oran1_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Deplasman 0.5 Gol Alt Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Deplasman 0.5 Gol Alt Üst","futbol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$oran_visible = $oranlar->o;

$json['live']['20084'] = array("tempid"=>"20084","N2"=>"".getTranslation('futboloran105')."","N"=>"Deplasman 0.5 Gol Alt Üst","id"=>"31","o"=>$oran_visible);

$json['live']['20084']['games'][] = array(
"Id"=>"67",
"EGID"=>"31",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 0.5","Name"=>"Üst 0.5",
"Name1X2"=>"+",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"20084"
);

$json['live']['20084']['games'][] = array(
"Id"=>"68",
"EGID"=>"31",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 0.5","Name"=>"Alt 0.5",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"20084"
);

}

if($GameTemplateId==16455) {
$oran2_ver = number_format($icoranlar[0]->Odds,2);
$oran1_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Deplasman 1.5 Gol Alt Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Deplasman 1.5 Gol Alt Üst","futbol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$oran_visible = $oranlar->o;

$json['live']['16455'] = array("tempid"=>"16455","N2"=>"".getTranslation('futboloran106')."","N"=>"Deplasman 1.5 Gol Alt Üst","id"=>"32","o"=>$oran_visible);

$json['live']['16455']['games'][] = array(
"Id"=>"69",
"EGID"=>"32",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 1.5","Name"=>"Üst 1.5",
"Name1X2"=>"+",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"16455"
);

$json['live']['16455']['games'][] = array(
"Id"=>"70",
"EGID"=>"32",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 1.5","Name"=>"Alt 1.5",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"16455"
);

}

if($GameTemplateId==20085) {
$oran2_ver = number_format($icoranlar[0]->Odds,2);
$oran1_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Deplasman 2.5 Gol Alt Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Deplasman 2.5 Gol Alt Üst","futbol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$oran_visible = $oranlar->o;

$json['live']['20085'] = array("tempid"=>"20085","N2"=>"".getTranslation('futboloran107')."","N"=>"Deplasman 2.5 Gol Alt Üst","id"=>"33","o"=>$oran_visible);

$json['live']['20085']['games'][] = array(
"Id"=>"71",
"EGID"=>"33",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 2.5","Name"=>"Üst 2.5",
"Name1X2"=>"+",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"20085"
);

$json['live']['20085']['games'][] = array(
"Id"=>"72",
"EGID"=>"33",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 2.5","Name"=>"Alt 2.5",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"20085"
);

}

if($GameTemplateId==2196) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);
$oran4_ver = number_format($icoranlar[3]->Odds,2);
$oran5_ver = number_format($icoranlar[4]->Odds,2);
$oran6_ver = number_format($icoranlar[5]->Odds,2);
$oran7_ver = number_format($icoranlar[6]->Odds,2);
$oran8_ver = number_format($icoranlar[7]->Odds,2);
$oran9_ver = number_format($icoranlar[8]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Toplam Kaç Gol Atılır ?","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Toplam Kaç Gol Atılır ?","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"Toplam Kaç Gol Atılır ?","futbol");
$oran4 = dusenoranbulcanli($oran4_ver,"Toplam Kaç Gol Atılır ?","futbol");
$oran5 = dusenoranbulcanli($oran5_ver,"Toplam Kaç Gol Atılır ?","futbol");
$oran6 = dusenoranbulcanli($oran6_ver,"Toplam Kaç Gol Atılır ?","futbol");
$oran7 = dusenoranbulcanli($oran7_ver,"Toplam Kaç Gol Atılır ?","futbol");
$oran8 = dusenoranbulcanli($oran8_ver,"Toplam Kaç Gol Atılır ?","futbol");
$oran9 = dusenoranbulcanli($oran9_ver,"Toplam Kaç Gol Atılır ?","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;
$visible4 = $icoranlar[3]->Visible;
$visible5 = $icoranlar[4]->Visible;
$visible6 = $icoranlar[5]->Visible;
$visible7 = $icoranlar[6]->Visible;
$visible8 = $icoranlar[7]->Visible;
$visible9 = $icoranlar[8]->Visible;

$oran_visible = $oranlar->o;

$json['live']['2196'] = array("tempid"=>"2196","N2"=>"".getTranslation('futboloran108')."","N"=>"Toplam Kaç Gol Atılır ?","id"=>"34","o"=>$oran_visible);

$json['live']['2196']['games'][] = array(
"Id"=>"73",
"EGID"=>"34",
"Namexxx"=>"".getTranslation('oransecenek21')."","Name"=>"Gol Yok",
"Name1X2"=>"0",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"2196"
);

$json['live']['2196']['games'][] = array(
"Id"=>"74",
"EGID"=>"34",
"Namexxx"=>"".getTranslation('oransecenek40')."","Name"=>"1 Gol",
"Name1X2"=>"1",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"2196"
);

$json['live']['2196']['games'][] = array(
"Id"=>"75",
"EGID"=>"34",
"Namexxx"=>"".getTranslation('oransecenek41')."","Name"=>"2 Gol",
"Name1X2"=>"2",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"2196"
);

$json['live']['2196']['games'][] = array(
"Id"=>"76",
"EGID"=>"34",
"Namexxx"=>"".getTranslation('oransecenek42')."","Name"=>"3 Gol",
"Name1X2"=>"3",
"Visible"=>$visible4,
"Odds"=>"".$oran4."",
"templateId"=>"2196"
);

$json['live']['2196']['games'][] = array(
"Id"=>"77",
"EGID"=>"34",
"Namexxx"=>"".getTranslation('oransecenek43')."","Name"=>"4 Gol",
"Name1X2"=>"4",
"Visible"=>$visible5,
"Odds"=>"".$oran5."",
"templateId"=>"2196"
);

$json['live']['2196']['games'][] = array(
"Id"=>"78",
"EGID"=>"34",
"Namexxx"=>"".getTranslation('oransecenek44')."","Name"=>"5 Gol",
"Name1X2"=>"5",
"Visible"=>$visible6,
"Odds"=>"".$oran6."",
"templateId"=>"2196"
);

$json['live']['2196']['games'][] = array(
"Id"=>"79",
"EGID"=>"34",
"Namexxx"=>"".getTranslation('oransecenek45')."","Name"=>"6 Gol",
"Name1X2"=>"6",
"Visible"=>$visible7,
"Odds"=>"".$oran7."",
"templateId"=>"2196"
);

$json['live']['2196']['games'][] = array(
"Id"=>"80",
"EGID"=>"34",
"Namexxx"=>"".getTranslation('oransecenek46')."","Name"=>"7 Gol",
"Name1X2"=>"7",
"Visible"=>$visible8,
"Odds"=>"".$oran8."",
"templateId"=>"2196"
);

$json['live']['2196']['games'][] = array(
"Id"=>"81",
"EGID"=>"34",
"Namexxx"=>"".getTranslation('oransecenek47')."","Name"=>"8 veya üstü",
"Name1X2"=>"8+",
"Visible"=>$visible9,
"Odds"=>"".$oran9."",
"templateId"=>"2196"
);

}

if($GameTemplateId==4726) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);
$oran4_ver = number_format($icoranlar[3]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Ev Sahibi Toplam Kaç Gol Atar ?","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Ev Sahibi Toplam Kaç Gol Atar ?","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"Ev Sahibi Toplam Kaç Gol Atar ?","futbol");
$oran4 = dusenoranbulcanli($oran4_ver,"Ev Sahibi Toplam Kaç Gol Atar ?","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;
$visible4 = $icoranlar[3]->Visible;

$oran_visible = $oranlar->o;

$json['live']['4726'] = array("tempid"=>"4726","N2"=>"".getTranslation('futboloran31')."","N"=>"Ev Sahibi Toplam Kaç Gol Atar ?","id"=>"35","o"=>$oran_visible);

$json['live']['4726']['games'][] = array(
"Id"=>"82",
"EGID"=>"35",
"Namexxx"=>"".getTranslation('oransecenek21')."","Name"=>"Gol Yok",
"Name1X2"=>"0",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"4726"
);

$json['live']['4726']['games'][] = array(
"Id"=>"83",
"EGID"=>"35",
"Namexxx"=>"".getTranslation('oransecenek40')."","Name"=>"1 Gol",
"Name1X2"=>"1",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"4726"
);

$json['live']['4726']['games'][] = array(
"Id"=>"84",
"EGID"=>"35",
"Namexxx"=>"".getTranslation('oransecenek41')."","Name"=>"2 Gol",
"Name1X2"=>"2",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"4726"
);

$json['live']['4726']['games'][] = array(
"Id"=>"85",
"EGID"=>"35",
"Namexxx"=>"".getTranslation('oransecenek54')."","Name"=>"3 veya üstü",
"Name1X2"=>"3+",
"Visible"=>$visible4,
"Odds"=>"".$oran4."",
"templateId"=>"4726"
);

}

if($GameTemplateId==4727) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);
$oran4_ver = number_format($icoranlar[3]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Deplasman Toplam Kaç Gol Atar ?","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Deplasman Toplam Kaç Gol Atar ?","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"Deplasman Toplam Kaç Gol Atar ?","futbol");
$oran4 = dusenoranbulcanli($oran4_ver,"Deplasman Toplam Kaç Gol Atar ?","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;
$visible4 = $icoranlar[3]->Visible;

$oran_visible = $oranlar->o;

$json['live']['4727'] = array("tempid"=>"4727","N2"=>"".getTranslation('futboloran32')."","N"=>"Deplasman Toplam Kaç Gol Atar ?","id"=>"36","o"=>$oran_visible);

$json['live']['4727']['games'][] = array(
"Id"=>"86",
"EGID"=>"36",
"Namexxx"=>"".getTranslation('oransecenek21')."","Name"=>"Gol Yok",
"Name1X2"=>"0",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"4727"
);

$json['live']['4727']['games'][] = array(
"Id"=>"87",
"EGID"=>"36",
"Namexxx"=>"".getTranslation('oransecenek40')."","Name"=>"1 Gol",
"Name1X2"=>"1",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"4727"
);

$json['live']['4727']['games'][] = array(
"Id"=>"88",
"EGID"=>"36",
"Namexxx"=>"".getTranslation('oransecenek41')."","Name"=>"2 Gol",
"Name1X2"=>"2",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"4727"
);

$json['live']['4727']['games'][] = array(
"Id"=>"89",
"EGID"=>"36",
"Namexxx"=>"".getTranslation('oransecenek54')."","Name"=>"3 veya üstü",
"Name1X2"=>"3+",
"Visible"=>$visible4,
"Odds"=>"".$oran4."",
"templateId"=>"4727"
);

}

if($GameTemplateId==26644) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);
$oran4_ver = number_format($icoranlar[3]->Odds,2);
$oran5_ver = number_format($icoranlar[4]->Odds,2);
$oran6_ver = number_format($icoranlar[5]->Odds,2);
$oran7_ver = number_format($icoranlar[6]->Odds,2);
$oran8_ver = number_format($icoranlar[7]->Odds,2);
$oran9_ver = number_format($icoranlar[8]->Odds,2);
$oran10_ver = number_format($icoranlar[9]->Odds,2);
$oran11_ver = number_format($icoranlar[10]->Odds,2);
$oran12_ver = number_format($icoranlar[11]->Odds,2);
$oran13_ver = number_format($icoranlar[12]->Odds,2);
$oran14_ver = number_format($icoranlar[13]->Odds,2);
$oran15_ver = number_format($icoranlar[14]->Odds,2);
$oran16_ver = number_format($icoranlar[15]->Odds,2);
$oran17_ver = number_format($icoranlar[16]->Odds,2);
$oran18_ver = number_format($icoranlar[17]->Odds,2);
$oran19_ver = number_format($icoranlar[18]->Odds,2);
$oran20_ver = number_format($icoranlar[19]->Odds,2);
$oran21_ver = number_format($icoranlar[20]->Odds,2);
$oran22_ver = number_format($icoranlar[21]->Odds,2);
$oran23_ver = number_format($icoranlar[22]->Odds,2);
$oran24_ver = number_format($icoranlar[23]->Odds,2);
$oran25_ver = number_format($icoranlar[24]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"1.Yarı Skoru","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"1.Yarı Skoru","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"1.Yarı Skoru","futbol");
$oran4 = dusenoranbulcanli($oran4_ver,"1.Yarı Skoru","futbol");
$oran5 = dusenoranbulcanli($oran5_ver,"1.Yarı Skoru","futbol");
$oran6 = dusenoranbulcanli($oran6_ver,"1.Yarı Skoru","futbol");
$oran7 = dusenoranbulcanli($oran7_ver,"1.Yarı Skoru","futbol");
$oran8 = dusenoranbulcanli($oran8_ver,"1.Yarı Skoru","futbol");
$oran9 = dusenoranbulcanli($oran9_ver,"1.Yarı Skoru","futbol");
$oran10 = dusenoranbulcanli($oran10_ver,"1.Yarı Skoru","futbol");
$oran11 = dusenoranbulcanli($oran11_ver,"1.Yarı Skoru","futbol");
$oran12 = dusenoranbulcanli($oran12_ver,"1.Yarı Skoru","futbol");
$oran13 = dusenoranbulcanli($oran13_ver,"1.Yarı Skoru","futbol");
$oran14 = dusenoranbulcanli($oran14_ver,"1.Yarı Skoru","futbol");
$oran15 = dusenoranbulcanli($oran15_ver,"1.Yarı Skoru","futbol");
$oran16 = dusenoranbulcanli($oran16_ver,"1.Yarı Skoru","futbol");
$oran17 = dusenoranbulcanli($oran17_ver,"1.Yarı Skoru","futbol");
$oran18 = dusenoranbulcanli($oran18_ver,"1.Yarı Skoru","futbol");
$oran19 = dusenoranbulcanli($oran19_ver,"1.Yarı Skoru","futbol");
$oran20 = dusenoranbulcanli($oran20_ver,"1.Yarı Skoru","futbol");
$oran21 = dusenoranbulcanli($oran21_ver,"1.Yarı Skoru","futbol");
$oran22 = dusenoranbulcanli($oran22_ver,"1.Yarı Skoru","futbol");
$oran23 = dusenoranbulcanli($oran23_ver,"1.Yarı Skoru","futbol");
$oran24 = dusenoranbulcanli($oran24_ver,"1.Yarı Skoru","futbol");
$oran25 = dusenoranbulcanli($oran25_ver,"1.Yarı Skoru","futbol");

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

$json['live']['26644'] = array("tempid"=>"26644","N2"=>"".getTranslation('futboloran109')."","N"=>"1.Yarı Skoru","id"=>"37","o"=>$oran_visible);

$json['live']['26644']['games'][] = array(
"Id"=>"100",
"EGID"=>"37",
"Namexxx"=>"0:0","Name"=>"0:0",
"Name1X2"=>"0:0",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"26644"
);

$json['live']['26644']['games'][] = array(
"Id"=>"101",
"EGID"=>"37",
"Namexxx"=>"1:0","Name"=>"1:0",
"Name1X2"=>"1:0",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"26644"
);

$json['live']['26644']['games'][] = array(
"Id"=>"102",
"EGID"=>"37",
"Namexxx"=>"1:1","Name"=>"1:1",
"Name1X2"=>"1:1",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"26644"
);

$json['live']['26644']['games'][] = array(
"Id"=>"103",
"EGID"=>"37",
"Namexxx"=>"0:1","Name"=>"0:1",
"Name1X2"=>"0:1",
"Visible"=>$visible4,
"Odds"=>"".$oran4."",
"templateId"=>"26644"
);

$json['live']['26644']['games'][] = array(
"Id"=>"104",
"EGID"=>"37",
"Namexxx"=>"2:0","Name"=>"2:0",
"Name1X2"=>"2:0",
"Visible"=>$visible5,
"Odds"=>"".$oran5."",
"templateId"=>"26644"
);

$json['live']['26644']['games'][] = array(
"Id"=>"105",
"EGID"=>"37",
"Namexxx"=>"2:1","Name"=>"2:1",
"Name1X2"=>"2:1",
"Visible"=>$visible6,
"Odds"=>"".$oran6."",
"templateId"=>"26644"
);

$json['live']['26644']['games'][] = array(
"Id"=>"106",
"EGID"=>"37",
"Namexxx"=>"2:2","Name"=>"2:2",
"Name1X2"=>"2:2",
"Visible"=>$visible7,
"Odds"=>"".$oran7."",
"templateId"=>"26644"
);

$json['live']['26644']['games'][] = array(
"Id"=>"107",
"EGID"=>"37",
"Namexxx"=>"1:2","Name"=>"1:2",
"Name1X2"=>"1:2",
"Visible"=>$visible8,
"Odds"=>"".$oran8."",
"templateId"=>"26644"
);

$json['live']['26644']['games'][] = array(
"Id"=>"108",
"EGID"=>"37",
"Namexxx"=>"0:2","Name"=>"0:2",
"Name1X2"=>"0:2",
"Visible"=>$visible9,
"Odds"=>"".$oran9."",
"templateId"=>"26644"
);

$json['live']['26644']['games'][] = array(
"Id"=>"109",
"EGID"=>"37",
"Namexxx"=>"3:0","Name"=>"3:0",
"Name1X2"=>"3:0",
"Visible"=>$visible10,
"Odds"=>"".$oran10."",
"templateId"=>"26644"
);

$json['live']['26644']['games'][] = array(
"Id"=>"110",
"EGID"=>"37",
"Namexxx"=>"3:1","Name"=>"3:1",
"Name1X2"=>"3:1",
"Visible"=>$visible11,
"Odds"=>"".$oran11."",
"templateId"=>"26644"
);

$json['live']['26644']['games'][] = array(
"Id"=>"111",
"EGID"=>"37",
"Namexxx"=>"3:2","Name"=>"3:2",
"Name1X2"=>"3:2",
"Visible"=>$visible12,
"Odds"=>"".$oran12."",
"templateId"=>"26644"
);

$json['live']['26644']['games'][] = array(
"Id"=>"112",
"EGID"=>"37",
"Namexxx"=>"3:3","Name"=>"3:3",
"Name1X2"=>"3:3",
"Visible"=>$visible13,
"Odds"=>"".$oran13."",
"templateId"=>"26644"
);

$json['live']['26644']['games'][] = array(
"Id"=>"113",
"EGID"=>"37",
"Namexxx"=>"2:3","Name"=>"2:3",
"Name1X2"=>"2:3",
"Visible"=>$visible14,
"Odds"=>"".$oran14."",
"templateId"=>"26644"
);

$json['live']['26644']['games'][] = array(
"Id"=>"114",
"EGID"=>"37",
"Namexxx"=>"1:3","Name"=>"1:3",
"Name1X2"=>"1:3",
"Visible"=>$visible15,
"Odds"=>"".$oran15."",
"templateId"=>"26644"
);

$json['live']['26644']['games'][] = array(
"Id"=>"115",
"EGID"=>"37",
"Namexxx"=>"0:3","Name"=>"0:3",
"Name1X2"=>"0:3",
"Visible"=>$visible16,
"Odds"=>"".$oran16."",
"templateId"=>"26644"
);

$json['live']['26644']['games'][] = array(
"Id"=>"116",
"EGID"=>"37",
"Namexxx"=>"4:0","Name"=>"4:0",
"Name1X2"=>"4:0",
"Visible"=>$visible17,
"Odds"=>"".$oran17."",
"templateId"=>"26644"
);

$json['live']['26644']['games'][] = array(
"Id"=>"117",
"EGID"=>"37",
"Namexxx"=>"4:1","Name"=>"4:1",
"Name1X2"=>"4:1",
"Visible"=>$visible18,
"Odds"=>"".$oran18."",
"templateId"=>"26644"
);

$json['live']['26644']['games'][] = array(
"Id"=>"118",
"EGID"=>"37",
"Namexxx"=>"4:2","Name"=>"4:2",
"Name1X2"=>"4:2",
"Visible"=>$visible19,
"Odds"=>"".$oran19."",
"templateId"=>"26644"
);

$json['live']['26644']['games'][] = array(
"Id"=>"119",
"EGID"=>"37",
"Namexxx"=>"4:3","Name"=>"4:3",
"Name1X2"=>"4:3",
"Visible"=>$visible20,
"Odds"=>"".$oran20."",
"templateId"=>"26644"
);

$json['live']['26644']['games'][] = array(
"Id"=>"120",
"EGID"=>"37",
"Namexxx"=>"4:4","Name"=>"4:4",
"Name1X2"=>"4:4",
"Visible"=>$visible21,
"Odds"=>"".$oran21."",
"templateId"=>"26644"
);

$json['live']['26644']['games'][] = array(
"Id"=>"121",
"EGID"=>"37",
"Namexxx"=>"3:4","Name"=>"3:4",
"Name1X2"=>"3:4",
"Visible"=>$visible22,
"Odds"=>"".$oran22."",
"templateId"=>"26644"
);

$json['live']['26644']['games'][] = array(
"Id"=>"122",
"EGID"=>"37",
"Namexxx"=>"2:4","Name"=>"2:4",
"Name1X2"=>"2:4",
"Visible"=>$visible23,
"Odds"=>"".$oran23."",
"templateId"=>"26644"
);

$json['live']['26644']['games'][] = array(
"Id"=>"123",
"EGID"=>"37",
"Namexxx"=>"1:4","Name"=>"1:4",
"Name1X2"=>"1:4",
"Visible"=>$visible24,
"Odds"=>"".$oran24."",
"templateId"=>"26644"
);

$json['live']['26644']['games'][] = array(
"Id"=>"124",
"EGID"=>"37",
"Namexxx"=>"0:4","Name"=>"0:4",
"Name1X2"=>"0:4",
"Visible"=>$visible25,
"Odds"=>"".$oran25."",
"templateId"=>"26644"
);

}

if($GameTemplateId==19193) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);
$oran4_ver = number_format($icoranlar[3]->Odds,2);
$oran5_ver = number_format($icoranlar[4]->Odds,2);
$oran6_ver = number_format($icoranlar[5]->Odds,2);
$oran7_ver = number_format($icoranlar[6]->Odds,2);
$oran8_ver = number_format($icoranlar[7]->Odds,2);
$oran9_ver = number_format($icoranlar[8]->Odds,2);
$oran10_ver = number_format($icoranlar[9]->Odds,2);
$oran11_ver = number_format($icoranlar[10]->Odds,2);
$oran12_ver = number_format($icoranlar[11]->Odds,2);
$oran13_ver = number_format($icoranlar[12]->Odds,2);
$oran14_ver = number_format($icoranlar[13]->Odds,2);
$oran15_ver = number_format($icoranlar[14]->Odds,2);
$oran16_ver = number_format($icoranlar[15]->Odds,2);
$oran17_ver = number_format($icoranlar[16]->Odds,2);
$oran18_ver = number_format($icoranlar[17]->Odds,2);
$oran19_ver = number_format($icoranlar[18]->Odds,2);
$oran20_ver = number_format($icoranlar[19]->Odds,2);
$oran21_ver = number_format($icoranlar[20]->Odds,2);
$oran22_ver = number_format($icoranlar[21]->Odds,2);
$oran23_ver = number_format($icoranlar[22]->Odds,2);
$oran24_ver = number_format($icoranlar[23]->Odds,2);
$oran25_ver = number_format($icoranlar[24]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Maç Skoru","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Maç Skoru","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"Maç Skoru","futbol");
$oran4 = dusenoranbulcanli($oran4_ver,"Maç Skoru","futbol");
$oran5 = dusenoranbulcanli($oran5_ver,"Maç Skoru","futbol");
$oran6 = dusenoranbulcanli($oran6_ver,"Maç Skoru","futbol");
$oran7 = dusenoranbulcanli($oran7_ver,"Maç Skoru","futbol");
$oran8 = dusenoranbulcanli($oran8_ver,"Maç Skoru","futbol");
$oran9 = dusenoranbulcanli($oran9_ver,"Maç Skoru","futbol");
$oran10 = dusenoranbulcanli($oran10_ver,"Maç Skoru","futbol");
$oran11 = dusenoranbulcanli($oran11_ver,"Maç Skoru","futbol");
$oran12 = dusenoranbulcanli($oran12_ver,"Maç Skoru","futbol");
$oran13 = dusenoranbulcanli($oran13_ver,"Maç Skoru","futbol");
$oran14 = dusenoranbulcanli($oran14_ver,"Maç Skoru","futbol");
$oran15 = dusenoranbulcanli($oran15_ver,"Maç Skoru","futbol");
$oran16 = dusenoranbulcanli($oran16_ver,"Maç Skoru","futbol");
$oran17 = dusenoranbulcanli($oran17_ver,"Maç Skoru","futbol");
$oran18 = dusenoranbulcanli($oran18_ver,"Maç Skoru","futbol");
$oran19 = dusenoranbulcanli($oran19_ver,"Maç Skoru","futbol");
$oran20 = dusenoranbulcanli($oran20_ver,"Maç Skoru","futbol");
$oran21 = dusenoranbulcanli($oran21_ver,"Maç Skoru","futbol");
$oran22 = dusenoranbulcanli($oran22_ver,"Maç Skoru","futbol");
$oran23 = dusenoranbulcanli($oran23_ver,"Maç Skoru","futbol");
$oran24 = dusenoranbulcanli($oran24_ver,"Maç Skoru","futbol");
$oran25 = dusenoranbulcanli($oran25_ver,"Maç Skoru","futbol");

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

$json['live']['19193'] = array("tempid"=>"19193","N2"=>"".getTranslation('futboloran57')."","N"=>"Maç Skoru","id"=>"38","o"=>$oran_visible);

$json['live']['19193']['games'][] = array(
"Id"=>"125",
"EGID"=>"38",
"Namexxx"=>"0:0","Name"=>"0:0",
"Name1X2"=>"0:0",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"19193"
);

$json['live']['19193']['games'][] = array(
"Id"=>"126",
"EGID"=>"38",
"Namexxx"=>"1:0","Name"=>"1:0",
"Name1X2"=>"1:0",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"19193"
);

$json['live']['19193']['games'][] = array(
"Id"=>"127",
"EGID"=>"38",
"Namexxx"=>"1:1","Name"=>"1:1",
"Name1X2"=>"1:1",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"19193"
);

$json['live']['19193']['games'][] = array(
"Id"=>"128",
"EGID"=>"38",
"Namexxx"=>"0:1","Name"=>"0:1",
"Name1X2"=>"0:1",
"Visible"=>$visible4,
"Odds"=>"".$oran4."",
"templateId"=>"19193"
);

$json['live']['19193']['games'][] = array(
"Id"=>"129",
"EGID"=>"38",
"Namexxx"=>"2:0","Name"=>"2:0",
"Name1X2"=>"2:0",
"Visible"=>$visible5,
"Odds"=>"".$oran5."",
"templateId"=>"19193"
);

$json['live']['19193']['games'][] = array(
"Id"=>"130",
"EGID"=>"38",
"Namexxx"=>"2:1","Name"=>"2:1",
"Name1X2"=>"2:1",
"Visible"=>$visible6,
"Odds"=>"".$oran6."",
"templateId"=>"19193"
);

$json['live']['19193']['games'][] = array(
"Id"=>"131",
"EGID"=>"38",
"Namexxx"=>"2:2","Name"=>"2:2",
"Name1X2"=>"2:2",
"Visible"=>$visible7,
"Odds"=>"".$oran7."",
"templateId"=>"19193"
);

$json['live']['19193']['games'][] = array(
"Id"=>"132",
"EGID"=>"38",
"Namexxx"=>"1:2","Name"=>"1:2",
"Name1X2"=>"1:2",
"Visible"=>$visible8,
"Odds"=>"".$oran8."",
"templateId"=>"19193"
);

$json['live']['19193']['games'][] = array(
"Id"=>"133",
"EGID"=>"38",
"Namexxx"=>"0:2","Name"=>"0:2",
"Name1X2"=>"0:2",
"Visible"=>$visible9,
"Odds"=>"".$oran9."",
"templateId"=>"19193"
);

$json['live']['19193']['games'][] = array(
"Id"=>"134",
"EGID"=>"38",
"Namexxx"=>"3:0","Name"=>"3:0",
"Name1X2"=>"3:0",
"Visible"=>$visible10,
"Odds"=>"".$oran10."",
"templateId"=>"19193"
);

$json['live']['19193']['games'][] = array(
"Id"=>"135",
"EGID"=>"38",
"Namexxx"=>"3:1","Name"=>"3:1",
"Name1X2"=>"3:1",
"Visible"=>$visible11,
"Odds"=>"".$oran11."",
"templateId"=>"19193"
);

$json['live']['19193']['games'][] = array(
"Id"=>"136",
"EGID"=>"38",
"Namexxx"=>"3:2","Name"=>"3:2",
"Name1X2"=>"3:2",
"Visible"=>$visible12,
"Odds"=>"".$oran12."",
"templateId"=>"19193"
);

$json['live']['19193']['games'][] = array(
"Id"=>"137",
"EGID"=>"38",
"Namexxx"=>"3:3","Name"=>"3:3",
"Name1X2"=>"3:3",
"Visible"=>$visible13,
"Odds"=>"".$oran13."",
"templateId"=>"19193"
);

$json['live']['19193']['games'][] = array(
"Id"=>"138",
"EGID"=>"38",
"Namexxx"=>"2:3","Name"=>"2:3",
"Name1X2"=>"2:3",
"Visible"=>$visible14,
"Odds"=>"".$oran14."",
"templateId"=>"19193"
);

$json['live']['19193']['games'][] = array(
"Id"=>"139",
"EGID"=>"38",
"Namexxx"=>"1:3","Name"=>"1:3",
"Name1X2"=>"1:3",
"Visible"=>$visible15,
"Odds"=>"".$oran15."",
"templateId"=>"19193"
);

$json['live']['19193']['games'][] = array(
"Id"=>"140",
"EGID"=>"38",
"Namexxx"=>"0:3","Name"=>"0:3",
"Name1X2"=>"0:3",
"Visible"=>$visible16,
"Odds"=>"".$oran16."",
"templateId"=>"19193"
);

$json['live']['19193']['games'][] = array(
"Id"=>"141",
"EGID"=>"38",
"Namexxx"=>"4:0","Name"=>"4:0",
"Name1X2"=>"4:0",
"Visible"=>$visible17,
"Odds"=>"".$oran17."",
"templateId"=>"19193"
);

$json['live']['19193']['games'][] = array(
"Id"=>"142",
"EGID"=>"38",
"Namexxx"=>"4:1","Name"=>"4:1",
"Name1X2"=>"4:1",
"Visible"=>$visible18,
"Odds"=>"".$oran18."",
"templateId"=>"19193"
);

$json['live']['19193']['games'][] = array(
"Id"=>"143",
"EGID"=>"38",
"Namexxx"=>"4:2","Name"=>"4:2",
"Name1X2"=>"4:2",
"Visible"=>$visible19,
"Odds"=>"".$oran19."",
"templateId"=>"19193"
);

$json['live']['19193']['games'][] = array(
"Id"=>"144",
"EGID"=>"38",
"Namexxx"=>"4:3","Name"=>"4:3",
"Name1X2"=>"4:3",
"Visible"=>$visible20,
"Odds"=>"".$oran20."",
"templateId"=>"19193"
);

$json['live']['19193']['games'][] = array(
"Id"=>"145",
"EGID"=>"38",
"Namexxx"=>"4:4","Name"=>"4:4",
"Name1X2"=>"4:4",
"Visible"=>$visible21,
"Odds"=>"".$oran21."",
"templateId"=>"19193"
);

$json['live']['19193']['games'][] = array(
"Id"=>"146",
"EGID"=>"38",
"Namexxx"=>"3:4","Name"=>"3:4",
"Name1X2"=>"3:4",
"Visible"=>$visible22,
"Odds"=>"".$oran22."",
"templateId"=>"19193"
);

$json['live']['19193']['games'][] = array(
"Id"=>"147",
"EGID"=>"38",
"Namexxx"=>"2:4","Name"=>"2:4",
"Name1X2"=>"2:4",
"Visible"=>$visible23,
"Odds"=>"".$oran23."",
"templateId"=>"19193"
);

$json['live']['19193']['games'][] = array(
"Id"=>"148",
"EGID"=>"38",
"Namexxx"=>"1:4","Name"=>"1:4",
"Name1X2"=>"1:4",
"Visible"=>$visible24,
"Odds"=>"".$oran24."",
"templateId"=>"19193"
);

$json['live']['19193']['games'][] = array(
"Id"=>"149",
"EGID"=>"38",
"Namexxx"=>"0:4","Name"=>"0:4",
"Name1X2"=>"0:4",
"Visible"=>$visible25,
"Odds"=>"".$oran25."",
"templateId"=>"19193"
);

}

if($GameTemplateId==31316) {
$oran2_ver = number_format($icoranlar[0]->Odds,2);
$oran1_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Ev Sahibi 1.Yarı 0.5 Gol Alt Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Ev Sahibi 1.Yarı 0.5 Gol Alt Üst","futbol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$oran_visible = $oranlar->o;

$json['live']['31316'] = array("tempid"=>"31316","N2"=>"".getTranslation('futboloran37')."","N"=>"Ev Sahibi 1.Yarı 0.5 Gol Alt Üst","id"=>"39","o"=>$oran_visible);

$json['live']['31316']['games'][] = array(
"Id"=>"150",
"EGID"=>"39",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 0.5","Name"=>"Üst 0.5",
"Name1X2"=>"+",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"31316"
);

$json['live']['31316']['games'][] = array(
"Id"=>"151",
"EGID"=>"39",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 0.5","Name"=>"Alt 0.5",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"31316"
);

}

if($GameTemplateId==31317) {
$oran2_ver = number_format($icoranlar[0]->Odds,2);
$oran1_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Ev Sahibi 1.Yarı 1.5 Gol Alt Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Ev Sahibi 1.Yarı 1.5 Gol Alt Üst","futbol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$oran_visible = $oranlar->o;

$json['live']['31317'] = array("tempid"=>"31317","N2"=>"".getTranslation('futboloran38')."","N"=>"Ev Sahibi 1.Yarı 1.5 Gol Alt Üst","id"=>"40","o"=>$oran_visible);

$json['live']['31317']['games'][] = array(
"Id"=>"152",
"EGID"=>"40",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 1.5","Name"=>"Üst 1.5",
"Name1X2"=>"+",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"31317"
);

$json['live']['31317']['games'][] = array(
"Id"=>"153",
"EGID"=>"40",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 1.5","Name"=>"Alt 1.5",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"31317"
);

}

if($GameTemplateId==31318) {
$oran2_ver = number_format($icoranlar[0]->Odds,2);
$oran1_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Ev Sahibi 1.Yarı 2.5 Gol Alt Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Ev Sahibi 1.Yarı 2.5 Gol Alt Üst","futbol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$oran_visible = $oranlar->o;

$json['live']['31318'] = array("tempid"=>"31318","N2"=>"".getTranslation('futboloran110')."","N"=>"Ev Sahibi 1.Yarı 2.5 Gol Alt Üst","id"=>"41","o"=>$oran_visible);

$json['live']['31318']['games'][] = array(
"Id"=>"154",
"EGID"=>"41",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 2.5","Name"=>"Üst 2.5",
"Name1X2"=>"+",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"31318"
);

$json['live']['31318']['games'][] = array(
"Id"=>"155",
"EGID"=>"41",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 2.5","Name"=>"Alt 2.5",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"31318"
);

}

if($GameTemplateId==31319) {
$oran2_ver = number_format($icoranlar[0]->Odds,2);
$oran1_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Deplasman 1.Yarı 0.5 Gol Alt Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Deplasman 1.Yarı 0.5 Gol Alt Üst","futbol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$oran_visible = $oranlar->o;

$json['live']['31319'] = array("tempid"=>"31319","N2"=>"".getTranslation('futboloran39')."","N"=>"Deplasman 1.Yarı 0.5 Gol Alt Üst","id"=>"42","o"=>$oran_visible);

$json['live']['31319']['games'][] = array(
"Id"=>"156",
"EGID"=>"42",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 0.5","Name"=>"Üst 0.5",
"Name1X2"=>"+",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"31319"
);

$json['live']['31319']['games'][] = array(
"Id"=>"157",
"EGID"=>"42",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 0.5","Name"=>"Alt 0.5",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"31319"
);

}

if($GameTemplateId==31320) {
$oran2_ver = number_format($icoranlar[0]->Odds,2);
$oran1_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Deplasman 1.Yarı 1.5 Gol Alt Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Deplasman 1.Yarı 1.5 Gol Alt Üst","futbol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$oran_visible = $oranlar->o;

$json['live']['31320'] = array("tempid"=>"31320","N2"=>"".getTranslation('futboloran40')."","N"=>"Deplasman 1.Yarı 1.5 Gol Alt Üst","id"=>"43","o"=>$oran_visible);

$json['live']['31320']['games'][] = array(
"Id"=>"158",
"EGID"=>"43",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 1.5","Name"=>"Üst 1.5",
"Name1X2"=>"+",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"31320"
);

$json['live']['31320']['games'][] = array(
"Id"=>"159",
"EGID"=>"43",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 1.5","Name"=>"Alt 1.5",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"31320"
);

}

if($GameTemplateId==31321) {
$oran2_ver = number_format($icoranlar[0]->Odds,2);
$oran1_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Deplasman 1.Yarı 2.5 Gol Alt Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Deplasman 1.Yarı 2.5 Gol Alt Üst","futbol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$oran_visible = $oranlar->o;

$json['live']['31321'] = array("tempid"=>"31321","N2"=>"".getTranslation('futboloran111')."","N"=>"Deplasman 1.Yarı 2.5 Gol Alt Üst","id"=>"44","o"=>$oran_visible);

$json['live']['31321']['games'][] = array(
"Id"=>"160",
"EGID"=>"44",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 2.5","Name"=>"Üst 2.5",
"Name1X2"=>"+",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"31321"
);

$json['live']['31321']['games'][] = array(
"Id"=>"161",
"EGID"=>"44",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 2.5","Name"=>"Alt 2.5",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"31321"
);

}

if($GameTemplateId==4720) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);
$oran4_ver = number_format($icoranlar[3]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Ev Sahibi İlk Yarı Tam Gol Sayısı","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Ev Sahibi İlk Yarı Tam Gol Sayısı","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"Ev Sahibi İlk Yarı Tam Gol Sayısı","futbol");
$oran4 = dusenoranbulcanli($oran4_ver,"Ev Sahibi İlk Yarı Tam Gol Sayısı","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;
$visible4 = $icoranlar[3]->Visible;

$oran_visible = $oranlar->o;

$json['live']['4720'] = array("tempid"=>"4720","N2"=>"".getTranslation('futboloran33')."","N"=>"Ev Sahibi İlk Yarı Tam Gol Sayısı","id"=>"45","o"=>$oran_visible);

$json['live']['4720']['games'][] = array(
"Id"=>"162",
"EGID"=>"45",
"Namexxx"=>"".getTranslation('oransecenek21')."","Name"=>"Gol Yok",
"Name1X2"=>"0",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"4720"
);

$json['live']['4720']['games'][] = array(
"Id"=>"163",
"EGID"=>"45",
"Namexxx"=>"".getTranslation('oransecenek40')."","Name"=>"1 Gol",
"Name1X2"=>"1",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"4720"
);

$json['live']['4720']['games'][] = array(
"Id"=>"164",
"EGID"=>"45",
"Namexxx"=>"".getTranslation('oransecenek41')."","Name"=>"2 Gol",
"Name1X2"=>"2",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"4720"
);

$json['live']['4720']['games'][] = array(
"Id"=>"165",
"EGID"=>"45",
"Namexxx"=>"".getTranslation('oransecenek54')."","Name"=>"3 veya üstü",
"Name1X2"=>"3+",
"Visible"=>$visible4,
"Odds"=>"".$oran4."",
"templateId"=>"4720"
);

}

if($GameTemplateId==4733) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);
$oran4_ver = number_format($icoranlar[3]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Ev Sahibi İkinci Yarı Tam Gol Sayısı","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Ev Sahibi İkinci Yarı Tam Gol Sayısı","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"Ev Sahibi İkinci Yarı Tam Gol Sayısı","futbol");
$oran4 = dusenoranbulcanli($oran4_ver,"Ev Sahibi İkinci Yarı Tam Gol Sayısı","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;
$visible4 = $icoranlar[3]->Visible;

$oran_visible = $oranlar->o;

$json['live']['4733'] = array("tempid"=>"4733","N2"=>"".getTranslation('futboloran34')."","N"=>"Ev Sahibi İkinci Yarı Tam Gol Sayısı","id"=>"46","o"=>$oran_visible);

$json['live']['4733']['games'][] = array(
"Id"=>"166",
"EGID"=>"46",
"Namexxx"=>"".getTranslation('oransecenek21')."","Name"=>"Gol Yok",
"Name1X2"=>"0",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"4733"
);

$json['live']['4733']['games'][] = array(
"Id"=>"167",
"EGID"=>"46",
"Namexxx"=>"".getTranslation('oransecenek40')."","Name"=>"1 Gol",
"Name1X2"=>"1",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"4733"
);

$json['live']['4733']['games'][] = array(
"Id"=>"168",
"EGID"=>"46",
"Namexxx"=>"".getTranslation('oransecenek41')."","Name"=>"2 Gol",
"Name1X2"=>"2",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"4733"
);

$json['live']['4733']['games'][] = array(
"Id"=>"169",
"EGID"=>"46",
"Namexxx"=>"".getTranslation('oransecenek54')."","Name"=>"3 veya üstü",
"Name1X2"=>"3+",
"Visible"=>$visible4,
"Odds"=>"".$oran4."",
"templateId"=>"4733"
);

}

if($GameTemplateId==4721) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);
$oran4_ver = number_format($icoranlar[3]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Deplasman İlk Yarı Tam Gol Sayısı","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Deplasman İlk Yarı Tam Gol Sayısı","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"Deplasman İlk Yarı Tam Gol Sayısı","futbol");
$oran4 = dusenoranbulcanli($oran4_ver,"Deplasman İlk Yarı Tam Gol Sayısı","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;
$visible4 = $icoranlar[3]->Visible;

$oran_visible = $oranlar->o;

$json['live']['4721'] = array("tempid"=>"4721","N2"=>"".getTranslation('futboloran35')."","N"=>"Deplasman İlk Yarı Tam Gol Sayısı","id"=>"47","o"=>$oran_visible);

$json['live']['4721']['games'][] = array(
"Id"=>"170",
"EGID"=>"47",
"Namexxx"=>"".getTranslation('oransecenek21')."","Name"=>"Gol Yok",
"Name1X2"=>"0",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"4721"
);

$json['live']['4721']['games'][] = array(
"Id"=>"171",
"EGID"=>"47",
"Namexxx"=>"".getTranslation('oransecenek40')."","Name"=>"1 Gol",
"Name1X2"=>"1",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"4721"
);

$json['live']['4721']['games'][] = array(
"Id"=>"172",
"EGID"=>"47",
"Namexxx"=>"".getTranslation('oransecenek41')."","Name"=>"2 Gol",
"Name1X2"=>"2",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"4721"
);

$json['live']['4721']['games'][] = array(
"Id"=>"173",
"EGID"=>"47",
"Namexxx"=>"".getTranslation('oransecenek54')."","Name"=>"3 veya üstü",
"Name1X2"=>"3+",
"Visible"=>$visible4,
"Odds"=>"".$oran4."",
"templateId"=>"4721"
);

}

if($GameTemplateId==4734) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);
$oran4_ver = number_format($icoranlar[3]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Deplasman İkinci Yarı Tam Gol Sayısı","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Deplasman İkinci Yarı Tam Gol Sayısı","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"Deplasman İkinci Yarı Tam Gol Sayısı","futbol");
$oran4 = dusenoranbulcanli($oran4_ver,"Deplasman İkinci Yarı Tam Gol Sayısı","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;
$visible4 = $icoranlar[3]->Visible;

$oran_visible = $oranlar->o;

$json['live']['4734'] = array("tempid"=>"4734","N2"=>"".getTranslation('futboloran36')."","N"=>"Deplasman İkinci Yarı Tam Gol Sayısı","id"=>"48","o"=>$oran_visible);

$json['live']['4734']['games'][] = array(
"Id"=>"174",
"EGID"=>"48",
"Namexxx"=>"".getTranslation('oransecenek21')."","Name"=>"Gol Yok",
"Name1X2"=>"0",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"4734"
);

$json['live']['4734']['games'][] = array(
"Id"=>"175",
"EGID"=>"48",
"Namexxx"=>"".getTranslation('oransecenek40')."","Name"=>"1 Gol",
"Name1X2"=>"1",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"4734"
);

$json['live']['4734']['games'][] = array(
"Id"=>"176",
"EGID"=>"48",
"Namexxx"=>"".getTranslation('oransecenek41')."","Name"=>"2 Gol",
"Name1X2"=>"2",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"4734"
);

$json['live']['4734']['games'][] = array(
"Id"=>"177",
"EGID"=>"48",
"Namexxx"=>"".getTranslation('oransecenek54')."","Name"=>"3 veya üstü",
"Name1X2"=>"3+",
"Visible"=>$visible4,
"Odds"=>"".$oran4."",
"templateId"=>"4734"
);

}

if($GameTemplateId==19508) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Herhangi Bir Takım 1 Gol Farkla Kazanirmi ?","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Herhangi Bir Takım 1 Gol Farkla Kazanirmi ?","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;

$json['live']['19508'] = array("tempid"=>"19508","N2"=>"".getTranslation('futboloran51')."","N"=>"Herhangi Bir Takım 1 Gol Farkla Kazanirmi ?","id"=>"49","o"=>$oran_visible);

$json['live']['19508']['games'][] = array(
"Id"=>"178",
"EGID"=>"49",
"hcoun"=>"5",
"Namexxx"=>"".getTranslation('oransecenek23')."","Name"=>"Evet",
"Name1X2"=>"E",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"19508"
);

$json['live']['19508']['games'][] = array(
"Id"=>"179",
"EGID"=>"49",
"hcoun"=>"3",
"Namexxx"=>"".getTranslation('oransecenek24')."","Name"=>"Hayır",
"Name1X2"=>"H",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"19508"
);

}

if($GameTemplateId==19509) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Herhangi Bir Takım 2 Gol Farkla Kazanirmi ?","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Herhangi Bir Takım 2 Gol Farkla Kazanirmi ?","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;

$json['live']['19509'] = array("tempid"=>"19509","N2"=>"".getTranslation('futboloran52')."","N"=>"Herhangi Bir Takım 2 Gol Farkla Kazanirmi ?","id"=>"50","o"=>$oran_visible);

$json['live']['19509']['games'][] = array(
"Id"=>"180",
"EGID"=>"50",
"hcoun"=>"5",
"Namexxx"=>"".getTranslation('oransecenek23')."","Name"=>"Evet",
"Name1X2"=>"E",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"19509"
);

$json['live']['19509']['games'][] = array(
"Id"=>"181",
"EGID"=>"50",
"hcoun"=>"3",
"Namexxx"=>"".getTranslation('oransecenek24')."","Name"=>"Hayır",
"Name1X2"=>"H",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"19509"
);

}

if($GameTemplateId==19510) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Herhangi Bir Takım 3 Gol Farkla Kazanirmi ?","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Herhangi Bir Takım 3 Gol Farkla Kazanirmi ?","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;

$json['live']['19510'] = array("tempid"=>"19510","N2"=>"".getTranslation('futboloran53')."","N"=>"Herhangi Bir Takım 3 Gol Farkla Kazanirmi ?","id"=>"51","o"=>$oran_visible);

$json['live']['19510']['games'][] = array(
"Id"=>"182",
"EGID"=>"51",
"hcoun"=>"5",
"Namexxx"=>"".getTranslation('oransecenek23')."","Name"=>"Evet",
"Name1X2"=>"E",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"19510"
);

$json['live']['19510']['games'][] = array(
"Id"=>"183",
"EGID"=>"51",
"hcoun"=>"3",
"Namexxx"=>"".getTranslation('oransecenek24')."","Name"=>"Hayır",
"Name1X2"=>"H",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"19510"
);

}

if($GameTemplateId==2488) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"1.Yarı Sonucu","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"1.Yarı Sonucu","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"1.Yarı Sonucu","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;

$json['live']['2488'] = array("tempid"=>"2488","N2"=>"".getTranslation('futboloran6')."","N"=>"1.Yarı Sonucu","id"=>"52","o"=>$oran_visible);

$json['live']['2488']['games'][] = array(
"Id"=>"184",
"EGID"=>"52",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"2488"
);

$json['live']['2488']['games'][] = array(
"Id"=>"185",
"EGID"=>"52",
"Namexxx"=>"X","Name"=>"X",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"2488"
);

$json['live']['2488']['games'][] = array(
"Id"=>"186",
"EGID"=>"52",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"-",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"2488"
);

}

if($GameTemplateId==4778) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"2.Yarı Sonucu","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"2.Yarı Sonucu","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"2.Yarı Sonucu","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;

$json['live']['4778'] = array("tempid"=>"4778","N2"=>"".getTranslation('futboloran7')."","N"=>"2.Yarı Sonucu","id"=>"53","o"=>$oran_visible);

$json['live']['4778']['games'][] = array(
"Id"=>"187",
"EGID"=>"53",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"4778"
);

$json['live']['4778']['games'][] = array(
"Id"=>"188",
"EGID"=>"53",
"Namexxx"=>"X","Name"=>"X",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"4778"
);

$json['live']['4778']['games'][] = array(
"Id"=>"189",
"EGID"=>"53",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"-",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"4778"
);

}

if($GameTemplateId==27536) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);
$oran4_ver = number_format($icoranlar[3]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"İlk Yarıda Kaç Gol Olur ?","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"İlk Yarıda Kaç Gol Olur ?","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"İlk Yarıda Kaç Gol Olur ?","futbol");
$oran4 = dusenoranbulcanli($oran4_ver,"İlk Yarıda Kaç Gol Olur ?","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;
$visible4 = $icoranlar[3]->Visible;

$oran_visible = $oranlar->o;

$json['live']['27536'] = array("tempid"=>"27536","N2"=>"".getTranslation('futboloran112')."","N"=>"İlk Yarıda Kaç Gol Olur ?","id"=>"54","o"=>$oran_visible);

$json['live']['27536']['games'][] = array(
"Id"=>"190",
"EGID"=>"54",
"Namexxx"=>"".getTranslation('oransecenek21')."","Name"=>"Gol Yok",
"Name1X2"=>"0",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"27536"
);

$json['live']['27536']['games'][] = array(
"Id"=>"191",
"EGID"=>"54",
"Namexxx"=>"".getTranslation('oransecenek40')."","Name"=>"1 Gol",
"Name1X2"=>"1",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"27536"
);

$json['live']['27536']['games'][] = array(
"Id"=>"192",
"EGID"=>"54",
"Namexxx"=>"".getTranslation('oransecenek41')."","Name"=>"2 Gol",
"Name1X2"=>"2",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"27536"
);

$json['live']['27536']['games'][] = array(
"Id"=>"193",
"EGID"=>"54",
"Namexxx"=>"".getTranslation('oransecenek54')."","Name"=>"3 veya üstü",
"Name1X2"=>"3+",
"Visible"=>$visible4,
"Odds"=>"".$oran4."",
"templateId"=>"27536"
);

}

if($GameTemplateId==4732) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);
$oran4_ver = number_format($icoranlar[3]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"2.Yarıda Toplam Kaç Gol Olur ?","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"2.Yarıda Toplam Kaç Gol Olur ?","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"2.Yarıda Toplam Kaç Gol Olur ?","futbol");
$oran4 = dusenoranbulcanli($oran4_ver,"2.Yarıda Toplam Kaç Gol Olur ?","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;
$visible4 = $icoranlar[3]->Visible;

$oran_visible = $oranlar->o;

$json['live']['4732'] = array("tempid"=>"4732","N2"=>"".getTranslation('futboloran113')."","N"=>"2.Yarıda Toplam Kaç Gol Olur ?","id"=>"55","o"=>$oran_visible);

$json['live']['4732']['games'][] = array(
"Id"=>"194",
"EGID"=>"55",
"Namexxx"=>"".getTranslation('oransecenek21')."","Name"=>"Gol Yok",
"Name1X2"=>"0",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"4732"
);

$json['live']['4732']['games'][] = array(
"Id"=>"195",
"EGID"=>"55",
"Namexxx"=>"".getTranslation('oransecenek40')."","Name"=>"1 Gol",
"Name1X2"=>"1",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"4732"
);

$json['live']['4732']['games'][] = array(
"Id"=>"196",
"EGID"=>"55",
"Namexxx"=>"".getTranslation('oransecenek41')."","Name"=>"2 Gol",
"Name1X2"=>"2",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"4732"
);

$json['live']['4732']['games'][] = array(
"Id"=>"197",
"EGID"=>"55",
"Namexxx"=>"".getTranslation('oransecenek54')."","Name"=>"3 veya üstü",
"Name1X2"=>"3+",
"Visible"=>$visible4,
"Odds"=>"".$oran4."",
"templateId"=>"4732"
);

}

if($GameTemplateId==27531) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Müsabakada kaç gol atılır? (0-4)","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Müsabakada kaç gol atılır? (0-4)","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"Müsabakada kaç gol atılır? (0-4)","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;

$json['live']['27531'] = array("tempid"=>"27531","N2"=>"".getTranslation('futboloran48')."","N"=>"Müsabakada kaç gol atılır? (0-4)","id"=>"56","o"=>$oran_visible);

$json['live']['27531']['games'][] = array(
"Id"=>"198",
"EGID"=>"56",
"Namexxx"=>"0-1","Name"=>"0-1",
"Name1X2"=>"0-1",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"27531"
);

$json['live']['27531']['games'][] = array(
"Id"=>"199",
"EGID"=>"56",
"Namexxx"=>"2-3","Name"=>"2-3",
"Name1X2"=>"2-3",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"27531"
);

$json['live']['27531']['games'][] = array(
"Id"=>"200",
"EGID"=>"56",
"Namexxx"=>"".getTranslation('oransecenek55')."","Name"=>"4 veya üstü",
"Name1X2"=>"4+",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"27531"
);

}

if($GameTemplateId==27534) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Müsabakada kaç gol atılır? (0-5)","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Müsabakada kaç gol atılır? (0-5)","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"Müsabakada kaç gol atılır? (0-5)","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;

$json['live']['27534'] = array("tempid"=>"27534","N2"=>"".getTranslation('futboloran49')."","N"=>"Müsabakada kaç gol atılır? (0-5)","id"=>"57","o"=>$oran_visible);

$json['live']['27534']['games'][] = array(
"Id"=>"201",
"EGID"=>"57",
"Namexxx"=>"0-2","Name"=>"0-2",
"Name1X2"=>"0-1",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"27534"
);

$json['live']['27534']['games'][] = array(
"Id"=>"202",
"EGID"=>"57",
"Namexxx"=>"3-4","Name"=>"3-4",
"Name1X2"=>"3-4",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"27534"
);

$json['live']['27534']['games'][] = array(
"Id"=>"203",
"EGID"=>"57",
"Namexxx"=>"".getTranslation('oransecenek56')."","Name"=>"5 veya üstü",
"Name1X2"=>"5+",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"27534"
);

}

if($GameTemplateId==27535) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Müsabakada kaç gol atılır? (0-6)","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Müsabakada kaç gol atılır? (0-6)","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"Müsabakada kaç gol atılır? (0-6)","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;

$json['live']['27535'] = array("tempid"=>"27535","N2"=>"".getTranslation('futboloran50')."","N"=>"Müsabakada kaç gol atılır? (0-6)","id"=>"58","o"=>$oran_visible);

$json['live']['27535']['games'][] = array(
"Id"=>"204",
"EGID"=>"58",
"Namexxx"=>"0-3","Name"=>"0-3",
"Name1X2"=>"0-3",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"27535"
);

$json['live']['27535']['games'][] = array(
"Id"=>"205",
"EGID"=>"58",
"Namexxx"=>"4-5","Name"=>"4-5",
"Name1X2"=>"4-5",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"27535"
);

$json['live']['27535']['games'][] = array(
"Id"=>"206",
"EGID"=>"58",
"Namexxx"=>"".getTranslation('oransecenek57')."","Name"=>"6 veya üstü",
"Name1X2"=>"6+",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"27535"
);

}

if($GameTemplateId==4956) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"1. yarıda 1.golü hangi takım atar?","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"1. yarıda 1.golü hangi takım atar?","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"1. yarıda 1.golü hangi takım atar?","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;

$json['live']['4956'] = array("tempid"=>"4956","N2"=>"".getTranslation('futboloran114')."","N"=>"1. yarıda 1.golü hangi takım atar?","id"=>"59","o"=>$oran_visible);

$json['live']['4956']['games'][] = array(
"Id"=>"207",
"EGID"=>"59",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"4956"
);

$json['live']['4956']['games'][] = array(
"Id"=>"208",
"EGID"=>"59",
"Namexxx"=>"X","Name"=>"X",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"4956"
);

$json['live']['4956']['games'][] = array(
"Id"=>"209",
"EGID"=>"59",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"4956"
);

}

if($GameTemplateId==13461) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"1. yarıda 2.golü hangi takım atar?","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"1. yarıda 2.golü hangi takım atar?","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"1. yarıda 2.golü hangi takım atar?","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;

$json['live']['13461'] = array("tempid"=>"13461","N2"=>"".getTranslation('futboloran115')."","N"=>"1. yarıda 2.golü hangi takım atar?","id"=>"59","o"=>$oran_visible);

$json['live']['13461']['games'][] = array(
"Id"=>"207",
"EGID"=>"59",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"13461"
);

$json['live']['13461']['games'][] = array(
"Id"=>"208",
"EGID"=>"59",
"Namexxx"=>"X","Name"=>"X",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"13461"
);

$json['live']['13461']['games'][] = array(
"Id"=>"209",
"EGID"=>"59",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"13461"
);

}

if($GameTemplateId==118) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"1.golü hangi takım atar?","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"1.golü hangi takım atar?","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"1.golü hangi takım atar?","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;

$json['live']['118'] = array("tempid"=>"118","N2"=>"".getTranslation('futboloran116')."","N"=>"1.golü hangi takım atar?","id"=>"60","o"=>$oran_visible);

$json['live']['118']['games'][] = array(
"Id"=>"210",
"EGID"=>"60",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"118"
);

$json['live']['118']['games'][] = array(
"Id"=>"211",
"EGID"=>"60",
"Namexxx"=>"X","Name"=>"X",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"118"
);

$json['live']['118']['games'][] = array(
"Id"=>"212",
"EGID"=>"60",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"118"
);

}

if($GameTemplateId==1344) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"2.golü hangi takım atar?","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"2.golü hangi takım atar?","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"2.golü hangi takım atar?","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;

$json['live']['1344'] = array("tempid"=>"1344","N2"=>"".getTranslation('futboloran117')."","N"=>"2.golü hangi takım atar?","id"=>"61","o"=>$oran_visible);

$json['live']['1344']['games'][] = array(
"Id"=>"213",
"EGID"=>"61",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"1344"
);

$json['live']['1344']['games'][] = array(
"Id"=>"214",
"EGID"=>"61",
"Namexxx"=>"X","Name"=>"X",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"1344"
);

$json['live']['1344']['games'][] = array(
"Id"=>"215",
"EGID"=>"61",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"1344"
);

}

if($GameTemplateId==1345) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"3.golü hangi takım atar?","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"3.golü hangi takım atar?","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"3.golü hangi takım atar?","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;

$json['live']['1345'] = array("tempid"=>"1345","N2"=>"".getTranslation('futboloran118')."","N"=>"3.golü hangi takım atar?","id"=>"62","o"=>$oran_visible);

$json['live']['1345']['games'][] = array(
"Id"=>"216",
"EGID"=>"62",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"1345"
);

$json['live']['1345']['games'][] = array(
"Id"=>"217",
"EGID"=>"62",
"Namexxx"=>"X","Name"=>"X",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"1345"
);

$json['live']['1345']['games'][] = array(
"Id"=>"218",
"EGID"=>"62",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"1345"
);

}

if($GameTemplateId==1346) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"4.golü hangi takım atar?","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"4.golü hangi takım atar?","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"4.golü hangi takım atar?","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;

$json['live']['1346'] = array("tempid"=>"1346","N2"=>"".getTranslation('futboloran119')."","N"=>"4.golü hangi takım atar?","id"=>"63","o"=>$oran_visible);

$json['live']['1346']['games'][] = array(
"Id"=>"219",
"EGID"=>"63",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"1346"
);

$json['live']['1346']['games'][] = array(
"Id"=>"220",
"EGID"=>"63",
"Namexxx"=>"X","Name"=>"X",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"1346"
);

$json['live']['1346']['games'][] = array(
"Id"=>"221",
"EGID"=>"63",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"1346"
);

}

if($GameTemplateId==1347) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"5.golü hangi takım atar?","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"5.golü hangi takım atar?","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"5.golü hangi takım atar?","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;

$json['live']['1347'] = array("tempid"=>"1347","N2"=>"".getTranslation('futboloran120')."","N"=>"5.golü hangi takım atar?","id"=>"64","o"=>$oran_visible);

$json['live']['1347']['games'][] = array(
"Id"=>"222",
"EGID"=>"64",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"1347"
);

$json['live']['1347']['games'][] = array(
"Id"=>"223",
"EGID"=>"64",
"Namexxx"=>"X","Name"=>"X",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"1347"
);

$json['live']['1347']['games'][] = array(
"Id"=>"224",
"EGID"=>"64",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"1347"
);

}

if($GameTemplateId==1348) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"6.golü hangi takım atar?","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"6.golü hangi takım atar?","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"6.golü hangi takım atar?","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;

$json['live']['1348'] = array("tempid"=>"1348","N2"=>"".getTranslation('futboloran121')."","N"=>"6.golü hangi takım atar?","id"=>"65","o"=>$oran_visible);

$json['live']['1348']['games'][] = array(
"Id"=>"225",
"EGID"=>"65",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"1348"
);

$json['live']['1348']['games'][] = array(
"Id"=>"226",
"EGID"=>"65",
"Namexxx"=>"X","Name"=>"X",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"1348"
);

$json['live']['1348']['games'][] = array(
"Id"=>"227",
"EGID"=>"65",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"1348"
);

}

#################################################### YENİ ORANLAR #########################################################

if($GameTemplateId==9922) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$ust_ver = $oranlar->attr;

if($ust_ver == '1,5'){

$oran1 = dusenoranbulcanli($oran1_ver,"Toplam Sarı Kart 1.5 Alt/Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Toplam Sarı Kart 1.5 Alt/Üst","futbol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['9922'] = array("tempid"=>"9922","N2"=>"".getTranslation('futboloran122')."","N"=>"Toplam Sarı Kart 1.5 Alt/Üst","id"=>"66","o"=>$oran_visible);

$json['live']['9922']['games'][] = array(
"Id"=>"228",
"EGID"=>"66",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 1.5","Name"=>"Üst 1.5",
"Name1X2"=>"+",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"9922"
);

$json['live']['9922']['games'][] = array(
"Id"=>"229",
"EGID"=>"66",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 1.5","Name"=>"Alt 1.5",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"9922"
);

}
}

if($ust_ver == '2,5'){

$oran1 = dusenoranbulcanli($oran1_ver,"Toplam Sarı Kart 2.5 Alt/Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Toplam Sarı Kart 2.5 Alt/Üst","futbol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['9923'] = array("tempid"=>"9923","N2"=>"".getTranslation('futboloran123')."","N"=>"Toplam Sarı Kart 2.5 Alt/Üst","id"=>"67","o"=>$oran_visible);

$json['live']['9923']['games'][] = array(
"Id"=>"230",
"EGID"=>"67",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 2.5","Name"=>"Üst 2.5",
"Name1X2"=>"+",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"9923"
);

$json['live']['9923']['games'][] = array(
"Id"=>"231",
"EGID"=>"67",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 2.5","Name"=>"Alt 2.5",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"9923"
);

}
}

if($ust_ver == '3,5'){

$oran1 = dusenoranbulcanli($oran1_ver,"Toplam Sarı Kart 3.5 Alt/Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Toplam Sarı Kart 3.5 Alt/Üst","futbol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['9924'] = array("tempid"=>"9924","N2"=>"".getTranslation('futboloran59')."","N"=>"Toplam Sarı Kart 3.5 Alt/Üst","id"=>"68","o"=>$oran_visible);

$json['live']['9924']['games'][] = array(
"Id"=>"232",
"EGID"=>"68",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 3.5","Name"=>"Üst 3.5",
"Name1X2"=>"+",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"9924"
);

$json['live']['9924']['games'][] = array(
"Id"=>"233",
"EGID"=>"68",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 3.5","Name"=>"Alt 3.5",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"9924"
);

}
}

if($ust_ver == '4,5'){

$oran1 = dusenoranbulcanli($oran1_ver,"Toplam Sarı Kart 4.5 Alt/Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Toplam Sarı Kart 4.5 Alt/Üst","futbol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['9925'] = array("tempid"=>"9925","N2"=>"".getTranslation('futboloran124')."","N"=>"Toplam Sarı Kart 4.5 Alt/Üst","id"=>"69","o"=>$oran_visible);

$json['live']['9925']['games'][] = array(
"Id"=>"234",
"EGID"=>"69",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 4.5","Name"=>"Üst 4.5",
"Name1X2"=>"+",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"9925"
);

$json['live']['9925']['games'][] = array(
"Id"=>"235",
"EGID"=>"69",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 4.5","Name"=>"Alt 4.5",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"9925"
);

}
}


}

if($GameTemplateId==19976) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Kırmızı Kart Çıkarmı ?","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Kırmızı Kart Çıkarmı ?","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['19976'] = array("tempid"=>"19976","N2"=>"".getTranslation('futboloran125')."","N"=>"Kırmızı Kart Çıkarmı ?","id"=>"70","o"=>$oran_visible);

$json['live']['19976']['games'][] = array(
"Id"=>"236",
"EGID"=>"70",
"hcoun"=>"5",
"Namexxx"=>"".getTranslation('oransecenek23')."","Name"=>"Evet",
"Name1X2"=>"E",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"19976"
);

$json['live']['19976']['games'][] = array(
"Id"=>"237",
"EGID"=>"70",
"hcoun"=>"3",
"Namexxx"=>"".getTranslation('oransecenek24')."","Name"=>"Hayır",
"Name1X2"=>"H",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"19976"
);

}
}

if($GameTemplateId==1328) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Kaç Penaltı Olur ?","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Kaç Penaltı Olur ?","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"Kaç Penaltı Olur ?","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['1328'] = array("tempid"=>"1328","N2"=>"".getTranslation('futboloran126')."","N"=>"Kaç Penaltı Olur ?","id"=>"71","o"=>$oran_visible);

$json['live']['1328']['games'][] = array(
"Id"=>"238",
"EGID"=>"71",
"hcoun"=>"5",
"Namexxx"=>"0","Name"=>"0",
"Name1X2"=>"0",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"1328"
);

$json['live']['1328']['games'][] = array(
"Id"=>"239",
"EGID"=>"71",
"hcoun"=>"3",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"1",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"1328"
);


$json['live']['1328']['games'][] = array(
"Id"=>"240",
"EGID"=>"71",
"hcoun"=>"3",
"Namexxx"=>"".getTranslation('oransecenek62')."","Name"=>"2 veya üstü",
"Name1X2"=>"2+",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"1328"
);

}
}

if($GameTemplateId==18739) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$ust_ver = $oranlar->attr;

if($ust_ver == '1,5'){

$oran1 = dusenoranbulcanli($oran1_ver,"1.Takım Toplam Sarı Kart 1.5 Alt/Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"1.Takım Toplam Sarı Kart 1.5 Alt/Üst","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['18739'] = array("tempid"=>"18739","N2"=>"".getTranslation('futboloran127')."","N"=>"1.Takım Toplam Sarı Kart 1.5 Alt/Üst","id"=>"72","o"=>$oran_visible);

$json['live']['18739']['games'][] = array(
"Id"=>"241",
"EGID"=>"72",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 1.5","Name"=>"Üst 1.5",
"Name1X2"=>"+",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"18739"
);

$json['live']['18739']['games'][] = array(
"Id"=>"242",
"EGID"=>"72",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 1.5","Name"=>"Alt 1.5",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"18739"
);

}
}

if($ust_ver == '2,5'){

$oran1 = dusenoranbulcanli($oran1_ver,"1.Takım Toplam Sarı Kart 2.5 Alt/Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"1.Takım Toplam Sarı Kart 2.5 Alt/Üst","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['187398'] = array("tempid"=>"187398","N2"=>"".getTranslation('futboloran128')."","N"=>"1.Takım Toplam Sarı Kart 2.5 Alt/Üst","id"=>"73","o"=>$oran_visible);

$json['live']['187398']['games'][] = array(
"Id"=>"243",
"EGID"=>"73",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 2.5","Name"=>"Üst 2.5",
"Name1X2"=>"+",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"187398"
);

$json['live']['187398']['games'][] = array(
"Id"=>"244",
"EGID"=>"73",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 2.5","Name"=>"Alt 2.5",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"187398"
);

}
}

if($ust_ver == '3,5'){

$oran1 = dusenoranbulcanli($oran1_ver,"1.Takım Toplam Sarı Kart 3.5 Alt/Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"1.Takım Toplam Sarı Kart 3.5 Alt/Üst","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['187399'] = array("tempid"=>"187399","N2"=>"".getTranslation('futboloran129')."","N"=>"1.Takım Toplam Sarı Kart 3.5 Alt/Üst","id"=>"74","o"=>$oran_visible);

$json['live']['187399']['games'][] = array(
"Id"=>"245",
"EGID"=>"74",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 3.5","Name"=>"Üst 3.5",
"Name1X2"=>"+",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"187399"
);

$json['live']['187399']['games'][] = array(
"Id"=>"246",
"EGID"=>"74",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 3.5","Name"=>"Alt 3.5",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"187399"
);

}
}

}

if($GameTemplateId==18740) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$ust_ver = $oranlar->attr;

if($ust_ver == '1,5'){

$oran1 = dusenoranbulcanli($oran1_ver,"2.Takım Toplam Sarı Kart 1.5 Alt/Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"2.Takım Toplam Sarı Kart 1.5 Alt/Üst","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['18740'] = array("tempid"=>"18740","N2"=>"".getTranslation('futboloran130')."","N"=>"2.Takım Toplam Sarı Kart 1.5 Alt/Üst","id"=>"75","o"=>$oran_visible);

$json['live']['18740']['games'][] = array(
"Id"=>"247",
"EGID"=>"75",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 1.5","Name"=>"Üst 1.5",
"Name1X2"=>"+",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"18740"
);

$json['live']['18740']['games'][] = array(
"Id"=>"248",
"EGID"=>"75",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 1.5","Name"=>"Alt 1.5",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"18740"
);

}
}

if($ust_ver == '2,5'){

$oran1 = dusenoranbulcanli($oran1_ver,"2.Takım Toplam Sarı Kart 2.5 Alt/Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"2.Takım Toplam Sarı Kart 2.5 Alt/Üst","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['187408'] = array("tempid"=>"187408","N2"=>"".getTranslation('futboloran131')."","N"=>"2.Takım Toplam Sarı Kart 2.5 Alt/Üst","id"=>"76","o"=>$oran_visible);

$json['live']['187408']['games'][] = array(
"Id"=>"249",
"EGID"=>"76",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 2.5","Name"=>"Üst 2.5",
"Name1X2"=>"+",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"187408"
);

$json['live']['187408']['games'][] = array(
"Id"=>"250",
"EGID"=>"76",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 2.5","Name"=>"Alt 2.5",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"187408"
);

}
}

if($ust_ver == '3,5'){

$oran1 = dusenoranbulcanli($oran1_ver,"2.Takım Toplam Sarı Kart 3.5 Alt/Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"2.Takım Toplam Sarı Kart 3.5 Alt/Üst","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['187409'] = array("tempid"=>"187409","N2"=>"".getTranslation('futboloran132')."","N"=>"2.Takım Toplam Sarı Kart 3.5 Alt/Üst","id"=>"77","o"=>$oran_visible);

$json['live']['187409']['games'][] = array(
"Id"=>"251",
"EGID"=>"77",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 3.5","Name"=>"Üst 3.5",
"Name1X2"=>"+",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"187409"
);

$json['live']['187409']['games'][] = array(
"Id"=>"252",
"EGID"=>"77",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 3.5","Name"=>"Alt 3.5",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"187409"
);

}
}

}

if($GameTemplateId==17929) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Sarı Kart Tek/Çift","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Sarı Kart Tek/Çift","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['17929'] = array("tempid"=>"17929","N2"=>"".getTranslation('futboloran133')."","N"=>"Sarı Kart Tek/Çift","id"=>"78","o"=>$oran_visible);

$json['live']['17929']['games'][] = array(
"Id"=>"253",
"EGID"=>"78",
"hcoun"=>"5",
"Namexxx"=>"".getTranslation('oransecenek29')."","Name"=>"Çift",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"17929"
);

$json['live']['17929']['games'][] = array(
"Id"=>"254",
"EGID"=>"78",
"hcoun"=>"3",
"Namexxx"=>"".getTranslation('oransecenek28')."","Name"=>"Tek",
"Name1X2"=>"T",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"17929"
);

}
}

if($GameTemplateId==4753) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Hangi Takım Çok Sarı Kart Yer ?","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Hangi Takım Çok Sarı Kart Yer ?","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"Hangi Takım Çok Sarı Kart Yer ?","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['4753'] = array("tempid"=>"4753","N2"=>"".getTranslation('futboloran69')."","N"=>"Hangi Takım Çok Sarı Kart Yer ?","id"=>"79","o"=>$oran_visible);

$json['live']['4753']['games'][] = array(
"Id"=>"255",
"EGID"=>"79",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"4753"
);

$json['live']['4753']['games'][] = array(
"Id"=>"256",
"EGID"=>"79",
"Namexxx"=>"X","Name"=>"X",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"4753"
);

$json['live']['4753']['games'][] = array(
"Id"=>"257",
"EGID"=>"79",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"-",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"4753"
);

}
}

if($GameTemplateId==4523) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$ust_ver = $oranlar->attr;

if($ust_ver == '5,5'){

$oran1 = dusenoranbulcanli($oran1_ver,"Toplam Korner 5.5 Alt/Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Toplam Korner 5.5 Alt/Üst","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['4523'] = array("tempid"=>"4523","N2"=>"".getTranslation('futboloran70')."","N"=>"Toplam Korner 5.5 Alt/Üst","id"=>"80","o"=>$oran_visible);

$json['live']['4523']['games'][] = array(
"Id"=>"258",
"EGID"=>"80",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 5.5","Name"=>"Üst 5.5",
"Name1X2"=>"+",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"4523"
);

$json['live']['4523']['games'][] = array(
"Id"=>"259",
"EGID"=>"80",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 5.5","Name"=>"Alt 5.5",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"4523"
);

}
}

if($ust_ver == '6,5'){

$oran1 = dusenoranbulcanli($oran1_ver,"Toplam Korner 6.5 Alt/Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Toplam Korner 6.5 Alt/Üst","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['4524'] = array("tempid"=>"4524","N2"=>"".getTranslation('futboloran71')."","N"=>"Toplam Korner 6.5 Alt/Üst","id"=>"81","o"=>$oran_visible);

$json['live']['4524']['games'][] = array(
"Id"=>"260",
"EGID"=>"81",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 6.5","Name"=>"Üst 6.5",
"Name1X2"=>"+",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"4524"
);

$json['live']['4524']['games'][] = array(
"Id"=>"261",
"EGID"=>"81",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 6.5","Name"=>"Alt 6.5",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"4524"
);

}
}

if($ust_ver == '7,5'){

$oran1 = dusenoranbulcanli($oran1_ver,"Toplam Korner 7.5 Alt/Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Toplam Korner 7.5 Alt/Üst","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['4525'] = array("tempid"=>"4525","N2"=>"".getTranslation('futboloran72')."","N"=>"Toplam Korner 7.5 Alt/Üst","id"=>"82","o"=>$oran_visible);

$json['live']['4525']['games'][] = array(
"Id"=>"262",
"EGID"=>"82",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 7.5","Name"=>"Üst 7.5",
"Name1X2"=>"+",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"4525"
);

$json['live']['4525']['games'][] = array(
"Id"=>"263",
"EGID"=>"82",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 7.5","Name"=>"Alt 7.5",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"4525"
);

}
}

if($ust_ver == '8,5'){

$oran1 = dusenoranbulcanli($oran1_ver,"Toplam Korner 8.5 Alt/Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Toplam Korner 8.5 Alt/Üst","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['4526'] = array("tempid"=>"4526","N2"=>"".getTranslation('futboloran73')."","N"=>"Toplam Korner 8.5 Alt/Üst","id"=>"83","o"=>$oran_visible);

$json['live']['4526']['games'][] = array(
"Id"=>"264",
"EGID"=>"83",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 8.5","Name"=>"Üst 8.5",
"Name1X2"=>"+",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"4526"
);

$json['live']['4526']['games'][] = array(
"Id"=>"265",
"EGID"=>"83",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 8.5","Name"=>"Alt 8.5",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"4526"
);

}
}

if($ust_ver == '9,5'){

$oran1 = dusenoranbulcanli($oran1_ver,"Toplam Korner 9.5 Alt/Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Toplam Korner 9.5 Alt/Üst","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['4527'] = array("tempid"=>"4527","N2"=>"".getTranslation('futboloran74')."","N"=>"Toplam Korner 9.5 Alt/Üst","id"=>"84","o"=>$oran_visible);

$json['live']['4527']['games'][] = array(
"Id"=>"266",
"EGID"=>"84",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 9.5","Name"=>"Üst 9.5",
"Name1X2"=>"+",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"4527"
);

$json['live']['4527']['games'][] = array(
"Id"=>"267",
"EGID"=>"84",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 9.5","Name"=>"Alt 9.5",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"4527"
);

}
}

if($ust_ver == '10,5'){

$oran1 = dusenoranbulcanli($oran1_ver,"Toplam Korner 10.5 Alt/Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Toplam Korner 10.5 Alt/Üst","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['4528'] = array("tempid"=>"4528","N2"=>"".getTranslation('futboloran75')."","N"=>"Toplam Korner 10.5 Alt/Üst","id"=>"85","o"=>$oran_visible);

$json['live']['4528']['games'][] = array(
"Id"=>"268",
"EGID"=>"85",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 10.5","Name"=>"Üst 10.5",
"Name1X2"=>"+",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"4528"
);

$json['live']['4528']['games'][] = array(
"Id"=>"269",
"EGID"=>"85",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 10.5","Name"=>"Alt 10.5",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"4528"
);

}
}

if($ust_ver == '11,5'){

$oran1 = dusenoranbulcanli($oran1_ver,"Toplam Korner 11.5 Alt/Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Toplam Korner 11.5 Alt/Üst","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['4529'] = array("tempid"=>"4529","N2"=>"".getTranslation('futboloran76')."","N"=>"Toplam Korner 11.5 Alt/Üst","id"=>"86","o"=>$oran_visible);

$json['live']['4529']['games'][] = array(
"Id"=>"270",
"EGID"=>"86",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 11.5","Name"=>"Üst 11.5",
"Name1X2"=>"+",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"4529"
);

$json['live']['4529']['games'][] = array(
"Id"=>"271",
"EGID"=>"86",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 11.5","Name"=>"Alt 11.5",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"4529"
);

}
}

if($ust_ver == '12,5'){

$oran1 = dusenoranbulcanli($oran1_ver,"Toplam Korner 12.5 Alt/Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Toplam Korner 12.5 Alt/Üst","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['4530'] = array("tempid"=>"4530","N2"=>"".getTranslation('futboloran77')."","N"=>"Toplam Korner 12.5 Alt/Üst","id"=>"87","o"=>$oran_visible);

$json['live']['4530']['games'][] = array(
"Id"=>"272",
"EGID"=>"87",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 12.5","Name"=>"Üst 12.5",
"Name1X2"=>"+",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"4530"
);

$json['live']['4530']['games'][] = array(
"Id"=>"273",
"EGID"=>"87",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 12.5","Name"=>"Alt 12.5",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"4530"
);

}
}

if($ust_ver == '13,5'){

$oran1 = dusenoranbulcanli($oran1_ver,"Toplam Korner 13.5 Alt/Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Toplam Korner 13.5 Alt/Üst","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['4531'] = array("tempid"=>"4531","N2"=>"".getTranslation('futboloran78')."","N"=>"Toplam Korner 13.5 Alt/Üst","id"=>"88","o"=>$oran_visible);

$json['live']['4531']['games'][] = array(
"Id"=>"274",
"EGID"=>"88",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 13.5","Name"=>"Üst 13.5",
"Name1X2"=>"+",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"4531"
);

$json['live']['4531']['games'][] = array(
"Id"=>"275",
"EGID"=>"88",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 13.5","Name"=>"Alt 13.5",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"4531"
);

}
}

if($ust_ver == '14,5'){

$oran1 = dusenoranbulcanli($oran1_ver,"Toplam Korner 14.5 Alt/Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Toplam Korner 14.5 Alt/Üst","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['4532'] = array("tempid"=>"4532","N2"=>"".getTranslation('futboloran79')."","N"=>"Toplam Korner 14.5 Alt/Üst","id"=>"89","o"=>$oran_visible);

$json['live']['4532']['games'][] = array(
"Id"=>"276",
"EGID"=>"89",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 14.5","Name"=>"Üst 14.5",
"Name1X2"=>"+",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"4532"
);

$json['live']['4532']['games'][] = array(
"Id"=>"277",
"EGID"=>"89",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 14.5","Name"=>"Alt 14.5",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"4532"
);

}
}

if($ust_ver == '15,5'){

$oran1 = dusenoranbulcanli($oran1_ver,"Toplam Korner 15.5 Alt/Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Toplam Korner 15.5 Alt/Üst","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['4533'] = array("tempid"=>"4533","N2"=>"".getTranslation('futboloran80')."","N"=>"Toplam Korner 15.5 Alt/Üst","id"=>"90","o"=>$oran_visible);

$json['live']['4533']['games'][] = array(
"Id"=>"278",
"EGID"=>"90",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 15.5","Name"=>"Üst 15.5",
"Name1X2"=>"+",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"4533"
);

$json['live']['4533']['games'][] = array(
"Id"=>"279",
"EGID"=>"90",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 15.5","Name"=>"Alt 15.5",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"4533"
);

}
}

}

if($GameTemplateId==4784) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$ust_ver = $oranlar->attr;

if($ust_ver == '2,5'){

$oran1 = dusenoranbulcanli($oran1_ver,"1.Takım Toplam Korner 2.5 Alt/Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"1.Takım Toplam Korner 2.5 Alt/Üst","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['4784'] = array("tempid"=>"4784","N2"=>"".getTranslation('futboloran134')."","N"=>"1.Takım Toplam Korner 2.5 Alt/Üst","id"=>"91","o"=>$oran_visible);

$json['live']['4784']['games'][] = array(
"Id"=>"280",
"EGID"=>"91",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 2.5","Name"=>"Üst 2.5",
"Name1X2"=>"+",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"4784"
);

$json['live']['4784']['games'][] = array(
"Id"=>"281",
"EGID"=>"91",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 2.5","Name"=>"Alt 2.5",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"4784"
);

}
}

if($ust_ver == '3,5'){

$oran1 = dusenoranbulcanli($oran1_ver,"1.Takım Toplam Korner 3.5 Alt/Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"1.Takım Toplam Korner 3.5 Alt/Üst","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['47841'] = array("tempid"=>"47841","N2"=>"".getTranslation('futboloran135')."","N"=>"1.Takım Toplam Korner 3.5 Alt/Üst","id"=>"92","o"=>$oran_visible);

$json['live']['47841']['games'][] = array(
"Id"=>"282",
"EGID"=>"92",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 3.5","Name"=>"Üst 3.5",
"Name1X2"=>"+",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"47841"
);

$json['live']['47841']['games'][] = array(
"Id"=>"283",
"EGID"=>"92",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 3.5","Name"=>"Alt 3.5",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"47841"
);

}
}

if($ust_ver == '4,5'){

$oran1 = dusenoranbulcanli($oran1_ver,"1.Takım Toplam Korner 4.5 Alt/Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"1.Takım Toplam Korner 4.5 Alt/Üst","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['47842'] = array("tempid"=>"47842","N2"=>"".getTranslation('futboloran136')."","N"=>"1.Takım Toplam Korner 4.5 Alt/Üst","id"=>"93","o"=>$oran_visible);

$json['live']['47842']['games'][] = array(
"Id"=>"284",
"EGID"=>"93",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 4.5","Name"=>"Üst 4.5",
"Name1X2"=>"+",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"47842"
);

$json['live']['47842']['games'][] = array(
"Id"=>"285",
"EGID"=>"93",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 4.5","Name"=>"Alt 4.5",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"47842"
);

}
}

if($ust_ver == '5,5'){

$oran1 = dusenoranbulcanli($oran1_ver,"1.Takım Toplam Korner 5.5 Alt/Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"1.Takım Toplam Korner 5.5 Alt/Üst","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['47843'] = array("tempid"=>"47843","N2"=>"".getTranslation('futboloran137')."","N"=>"1.Takım Toplam Korner 5.5 Alt/Üst","id"=>"94","o"=>$oran_visible);

$json['live']['47843']['games'][] = array(
"Id"=>"286",
"EGID"=>"94",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 5.5","Name"=>"Üst 5.5",
"Name1X2"=>"+",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"47843"
);

$json['live']['47843']['games'][] = array(
"Id"=>"287",
"EGID"=>"94",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 5.5","Name"=>"Alt 5.5",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"47843"
);

}
}

if($ust_ver == '6,5'){

$oran1 = dusenoranbulcanli($oran1_ver,"1.Takım Toplam Korner 6.5 Alt/Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"1.Takım Toplam Korner 6.5 Alt/Üst","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['47844'] = array("tempid"=>"47844","N2"=>"".getTranslation('futboloran138')."","N"=>"1.Takım Toplam Korner 6.5 Alt/Üst","id"=>"95","o"=>$oran_visible);

$json['live']['47844']['games'][] = array(
"Id"=>"288",
"EGID"=>"95",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 6.5","Name"=>"Üst 6.5",
"Name1X2"=>"+",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"47844"
);

$json['live']['47844']['games'][] = array(
"Id"=>"289",
"EGID"=>"95",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 6.5","Name"=>"Alt 6.5",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"47844"
);

}
}

if($ust_ver == '7,5'){

$oran1 = dusenoranbulcanli($oran1_ver,"1.Takım Toplam Korner 7.5 Alt/Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"1.Takım Toplam Korner 7.5 Alt/Üst","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['47845'] = array("tempid"=>"47845","N2"=>"".getTranslation('futboloran139')."","N"=>"1.Takım Toplam Korner 7.5 Alt/Üst","id"=>"96","o"=>$oran_visible);

$json['live']['47845']['games'][] = array(
"Id"=>"290",
"EGID"=>"96",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 7.5","Name"=>"Üst 7.5",
"Name1X2"=>"+",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"47845"
);

$json['live']['47845']['games'][] = array(
"Id"=>"291",
"EGID"=>"96",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 7.5","Name"=>"Alt 7.5",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"47845"
);

}
}

if($ust_ver == '8,5'){

$oran1 = dusenoranbulcanli($oran1_ver,"1.Takım Toplam Korner 8.5 Alt/Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"1.Takım Toplam Korner 8.5 Alt/Üst","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['47846'] = array("tempid"=>"47846","N2"=>"".getTranslation('futboloran140')."","N"=>"1.Takım Toplam Korner 8.5 Alt/Üst","id"=>"97","o"=>$oran_visible);

$json['live']['47846']['games'][] = array(
"Id"=>"292",
"EGID"=>"97",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 8.5","Name"=>"Üst 8.5",
"Name1X2"=>"+",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"47846"
);

$json['live']['47846']['games'][] = array(
"Id"=>"293",
"EGID"=>"97",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 8.5","Name"=>"Alt 8.5",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"47846"
);

}
}

if($ust_ver == '9,5'){

$oran1 = dusenoranbulcanli($oran1_ver,"1.Takım Toplam Korner 9.5 Alt/Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"1.Takım Toplam Korner 9.5 Alt/Üst","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['47847'] = array("tempid"=>"47847","N2"=>"".getTranslation('futboloran141')."","N"=>"1.Takım Toplam Korner 9.5 Alt/Üst","id"=>"98","o"=>$oran_visible);

$json['live']['47847']['games'][] = array(
"Id"=>"294",
"EGID"=>"98",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 9.5","Name"=>"Üst 9.5",
"Name1X2"=>"+",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"47847"
);

$json['live']['47847']['games'][] = array(
"Id"=>"295",
"EGID"=>"98",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 9.5","Name"=>"Alt 9.5",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"47847"
);

}
}

if($ust_ver == '10,5'){

$oran1 = dusenoranbulcanli($oran1_ver,"1.Takım Toplam Korner 10.5 Alt/Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"1.Takım Toplam Korner 10.5 Alt/Üst","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['47848'] = array("tempid"=>"47848","N2"=>"".getTranslation('futboloran142')."","N"=>"1.Takım Toplam Korner 10.5 Alt/Üst","id"=>"99","o"=>$oran_visible);

$json['live']['47848']['games'][] = array(
"Id"=>"296",
"EGID"=>"99",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 10.5","Name"=>"Üst 10.5",
"Name1X2"=>"+",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"47848"
);

$json['live']['47848']['games'][] = array(
"Id"=>"297",
"EGID"=>"99",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 10.5","Name"=>"Alt 10.5",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"47848"
);

}
}

}

if($GameTemplateId==4785) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$ust_ver = $oranlar->attr;

if($ust_ver == '2,5'){

$oran1 = dusenoranbulcanli($oran1_ver,"2.Takım Toplam Korner 2.5 Alt/Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"2.Takım Toplam Korner 2.5 Alt/Üst","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['4785'] = array("tempid"=>"4785","N2"=>"".getTranslation('futboloran143')."","N"=>"2.Takım Toplam Korner 2.5 Alt/Üst","id"=>"100","o"=>$oran_visible);

$json['live']['4785']['games'][] = array(
"Id"=>"298",
"EGID"=>"100",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 2.5","Name"=>"Üst 2.5",
"Name1X2"=>"+",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"4785"
);

$json['live']['4785']['games'][] = array(
"Id"=>"299",
"EGID"=>"100",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 2.5","Name"=>"Alt 2.5",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"4785"
);

}
}

if($ust_ver == '3,5'){

$oran1 = dusenoranbulcanli($oran1_ver,"2.Takım Toplam Korner 3.5 Alt/Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"2.Takım Toplam Korner 3.5 Alt/Üst","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['47851'] = array("tempid"=>"47851","N2"=>"".getTranslation('futboloran144')."","N"=>"2.Takım Toplam Korner 3.5 Alt/Üst","id"=>"100","o"=>$oran_visible);

$json['live']['47851']['games'][] = array(
"Id"=>"300",
"EGID"=>"100",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 3.5","Name"=>"Üst 3.5",
"Name1X2"=>"+",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"47851"
);

$json['live']['47851']['games'][] = array(
"Id"=>"301",
"EGID"=>"100",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 3.5","Name"=>"Alt 3.5",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"47851"
);

}
}

if($ust_ver == '4,5'){

$oran1 = dusenoranbulcanli($oran1_ver,"2.Takım Toplam Korner 4.5 Alt/Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"2.Takım Toplam Korner 4.5 Alt/Üst","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['47852'] = array("tempid"=>"47852","N2"=>"".getTranslation('futboloran145')."","N"=>"2.Takım Toplam Korner 4.5 Alt/Üst","id"=>"100","o"=>$oran_visible);

$json['live']['47852']['games'][] = array(
"Id"=>"302",
"EGID"=>"100",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 4.5","Name"=>"Üst 4.5",
"Name1X2"=>"+",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"47852"
);

$json['live']['47852']['games'][] = array(
"Id"=>"303",
"EGID"=>"100",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 4.5","Name"=>"Alt 4.5",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"47852"
);

}
}

if($ust_ver == '5,5'){

$oran1 = dusenoranbulcanli($oran1_ver,"2.Takım Toplam Korner 5.5 Alt/Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"2.Takım Toplam Korner 5.5 Alt/Üst","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['47853'] = array("tempid"=>"47853","N2"=>"".getTranslation('futboloran146')."","N"=>"2.Takım Toplam Korner 5.5 Alt/Üst","id"=>"100","o"=>$oran_visible);

$json['live']['47853']['games'][] = array(
"Id"=>"304",
"EGID"=>"100",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 5.5","Name"=>"Üst 5.5",
"Name1X2"=>"+",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"47853"
);

$json['live']['47853']['games'][] = array(
"Id"=>"305",
"EGID"=>"100",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 5.5","Name"=>"Alt 5.5",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"47853"
);

}
}

if($ust_ver == '6,5'){

$oran1 = dusenoranbulcanli($oran1_ver,"2.Takım Toplam Korner 6.5 Alt/Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"2.Takım Toplam Korner 6.5 Alt/Üst","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['47854'] = array("tempid"=>"47854","N2"=>"".getTranslation('futboloran147')."","N"=>"2.Takım Toplam Korner 6.5 Alt/Üst","id"=>"100","o"=>$oran_visible);

$json['live']['47854']['games'][] = array(
"Id"=>"306",
"EGID"=>"100",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 6.5","Name"=>"Üst 6.5",
"Name1X2"=>"+",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"47854"
);

$json['live']['47854']['games'][] = array(
"Id"=>"307",
"EGID"=>"100",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 6.5","Name"=>"Alt 6.5",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"47854"
);

}
}

if($ust_ver == '7,5'){

$oran1 = dusenoranbulcanli($oran1_ver,"2.Takım Toplam Korner 7.5 Alt/Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"2.Takım Toplam Korner 7.5 Alt/Üst","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['47855'] = array("tempid"=>"47855","N2"=>"".getTranslation('futboloran148')."","N"=>"2.Takım Toplam Korner 7.5 Alt/Üst","id"=>"100","o"=>$oran_visible);

$json['live']['47855']['games'][] = array(
"Id"=>"308",
"EGID"=>"100",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 7.5","Name"=>"Üst 7.5",
"Name1X2"=>"+",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"47855"
);

$json['live']['47855']['games'][] = array(
"Id"=>"309",
"EGID"=>"100",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 7.5","Name"=>"Alt 7.5",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"47855"
);

}
}

if($ust_ver == '8,5'){

$oran1 = dusenoranbulcanli($oran1_ver,"2.Takım Toplam Korner 8.5 Alt/Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"2.Takım Toplam Korner 8.5 Alt/Üst","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['47856'] = array("tempid"=>"47856","N2"=>"".getTranslation('futboloran149')."","N"=>"2.Takım Toplam Korner 8.5 Alt/Üst","id"=>"100","o"=>$oran_visible);

$json['live']['47856']['games'][] = array(
"Id"=>"310",
"EGID"=>"100",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 8.5","Name"=>"Üst 8.5",
"Name1X2"=>"+",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"47856"
);

$json['live']['47856']['games'][] = array(
"Id"=>"311",
"EGID"=>"100",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 8.5","Name"=>"Alt 8.5",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"47856"
);

}
}

if($ust_ver == '9,5'){

$oran1 = dusenoranbulcanli($oran1_ver,"2.Takım Toplam Korner 9.5 Alt/Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"2.Takım Toplam Korner 9.5 Alt/Üst","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['47857'] = array("tempid"=>"47857","N2"=>"".getTranslation('futboloran150')."","N"=>"2.Takım Toplam Korner 9.5 Alt/Üst","id"=>"100","o"=>$oran_visible);

$json['live']['47857']['games'][] = array(
"Id"=>"312",
"EGID"=>"100",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 9.5","Name"=>"Üst 9.5",
"Name1X2"=>"+",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"47857"
);

$json['live']['47857']['games'][] = array(
"Id"=>"313",
"EGID"=>"100",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 9.5","Name"=>"Alt 9.5",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"47857"
);

}
}

if($ust_ver == '10,5'){

$oran1 = dusenoranbulcanli($oran1_ver,"2.Takım Toplam Korner 10.5 Alt/Üst","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"2.Takım Toplam Korner 10.5 Alt/Üst","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['47858'] = array("tempid"=>"47858","N2"=>"".getTranslation('futboloran151')."","N"=>"2.Takım Toplam Korner 10.5 Alt/Üst","id"=>"100","o"=>$oran_visible);

$json['live']['47858']['games'][] = array(
"Id"=>"314",
"EGID"=>"100",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." 10.5","Name"=>"Üst 10.5",
"Name1X2"=>"+",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"47858"
);

$json['live']['47858']['games'][] = array(
"Id"=>"315",
"EGID"=>"100",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." 10.5","Name"=>"Alt 10.5",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"47858"
);

}
}

}

if($GameTemplateId==17925) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Korner Tek/Çift","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Korner Tek/Çift","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['17925'] = array("tempid"=>"17925","N2"=>"".getTranslation('futboloran152')."","N"=>"Korner Tek/Çift","id"=>"101","o"=>$oran_visible);

$json['live']['17925']['games'][] = array(
"Id"=>"316",
"EGID"=>"101",
"hcoun"=>"5",
"Namexxx"=>"".getTranslation('oransecenek29')."","Name"=>"Çift",
"Name1X2"=>"Ç",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"17925"
);

$json['live']['17925']['games'][] = array(
"Id"=>"317",
"EGID"=>"101",
"hcoun"=>"3",
"Namexxx"=>"".getTranslation('oransecenek28')."","Name"=>"Tek",
"Name1X2"=>"T",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"17925"
);

}
}

if($GameTemplateId==4793) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Hangi Takım Daha Çok Korner Kullanır ?","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Hangi Takım Daha Çok Korner Kullanır ?","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"Hangi Takım Daha Çok Korner Kullanır ?","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['4793'] = array("tempid"=>"4793","N2"=>"".getTranslation('futboloran153')."","N"=>"Hangi Takım Daha Çok Korner Kullanır ?","id"=>"102","o"=>$oran_visible);

$json['live']['4793']['games'][] = array(
"Id"=>"318",
"EGID"=>"102",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"4793"
);

$json['live']['4793']['games'][] = array(
"Id"=>"319",
"EGID"=>"102",
"Namexxx"=>"X","Name"=>"X",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"4793"
);

$json['live']['4793']['games'][] = array(
"Id"=>"320",
"EGID"=>"102",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"-",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"4793"
);

}
}

if($GameTemplateId==21077) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Kalan Süre Tahmini - skor:0-0","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Kalan Süre Tahmini - skor:0-0","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"Kalan Süre Tahmini - skor:0-0","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['21077'] = array("tempid"=>"21077","N2"=>"".getTranslation('futboloran154')."","N"=>"Kalan Süre Tahmini - skor:0-0","id"=>"105","o"=>$oran_visible);

$json['live']['21077']['games'][] = array(
"Id"=>"324",
"EGID"=>"105",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"21077"
);

$json['live']['21077']['games'][] = array(
"Id"=>"325",
"EGID"=>"105",
"Namexxx"=>"X","Name"=>"X",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"21077"
);

$json['live']['21077']['games'][] = array(
"Id"=>"326",
"EGID"=>"105",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"-",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"21077"
);

}
}

if($GameTemplateId==21057) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Kalan Süre Tahmini - skor:1-0","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Kalan Süre Tahmini - skor:1-0","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"Kalan Süre Tahmini - skor:1-0","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['21057'] = array("tempid"=>"21057","N2"=>"".getTranslation('futboloran155')."","N"=>"Kalan Süre Tahmini - skor:1-0","id"=>"106","o"=>$oran_visible);

$json['live']['21057']['games'][] = array(
"Id"=>"321",
"EGID"=>"106",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"21057"
);

$json['live']['21057']['games'][] = array(
"Id"=>"322",
"EGID"=>"106",
"Namexxx"=>"X","Name"=>"X",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"21057"
);

$json['live']['21057']['games'][] = array(
"Id"=>"323",
"EGID"=>"106",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"-",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"21057"
);

}
}

if($GameTemplateId==21056) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Kalan Süre Tahmini - skor:0-1","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Kalan Süre Tahmini - skor:0-1","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"Kalan Süre Tahmini - skor:0-1","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['21056'] = array("tempid"=>"21056","N2"=>"".getTranslation('futboloran156')."","N"=>"Kalan Süre Tahmini - skor:0-1","id"=>"104","o"=>$oran_visible);

$json['live']['21056']['games'][] = array(
"Id"=>"324",
"EGID"=>"104",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"21056"
);

$json['live']['21056']['games'][] = array(
"Id"=>"325",
"EGID"=>"104",
"Namexxx"=>"X","Name"=>"X",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"21056"
);

$json['live']['21056']['games'][] = array(
"Id"=>"326",
"EGID"=>"104",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"-",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"21056"
);

}
}

if($GameTemplateId==21078) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Kalan Süre Tahmini - skor:1-1","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Kalan Süre Tahmini - skor:1-1","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"Kalan Süre Tahmini - skor:1-1","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['21078'] = array("tempid"=>"21078","N2"=>"".getTranslation('futboloran157')."","N"=>"Kalan Süre Tahmini - skor:1-1","id"=>"104","o"=>$oran_visible);

$json['live']['21078']['games'][] = array(
"Id"=>"324",
"EGID"=>"104",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"21078"
);

$json['live']['21078']['games'][] = array(
"Id"=>"325",
"EGID"=>"104",
"Namexxx"=>"X","Name"=>"X",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"21078"
);

$json['live']['21078']['games'][] = array(
"Id"=>"326",
"EGID"=>"104",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"-",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"21078"
);

}
}

if($GameTemplateId==21059) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Kalan Süre Tahmini - skor:2-0","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Kalan Süre Tahmini - skor:2-0","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"Kalan Süre Tahmini - skor:2-0","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['21059'] = array("tempid"=>"21059","N2"=>"".getTranslation('futboloran158')."","N"=>"Kalan Süre Tahmini - skor:2-0","id"=>"104","o"=>$oran_visible);

$json['live']['21059']['games'][] = array(
"Id"=>"324",
"EGID"=>"104",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"21059"
);

$json['live']['21059']['games'][] = array(
"Id"=>"325",
"EGID"=>"104",
"Namexxx"=>"X","Name"=>"X",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"21059"
);

$json['live']['21059']['games'][] = array(
"Id"=>"326",
"EGID"=>"104",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"-",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"21059"
);

}
}

if($GameTemplateId==21058) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Kalan Süre Tahmini - skor:0-2","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Kalan Süre Tahmini - skor:0-2","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"Kalan Süre Tahmini - skor:0-2","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['21058'] = array("tempid"=>"21058","N2"=>"".getTranslation('futboloran159')."","N"=>"Kalan Süre Tahmini - skor:0-2","id"=>"104","o"=>$oran_visible);

$json['live']['21058']['games'][] = array(
"Id"=>"324",
"EGID"=>"104",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"21058"
);

$json['live']['21058']['games'][] = array(
"Id"=>"325",
"EGID"=>"104",
"Namexxx"=>"X","Name"=>"X",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"21058"
);

$json['live']['21058']['games'][] = array(
"Id"=>"326",
"EGID"=>"104",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"-",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"21058"
);

}
}

if($GameTemplateId==21093) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Kalan Süre Tahmini - skor:2-1","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Kalan Süre Tahmini - skor:2-1","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"Kalan Süre Tahmini - skor:2-1","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['21093'] = array("tempid"=>"21093","N2"=>"".getTranslation('futboloran160')."","N"=>"Kalan Süre Tahmini - skor:2-1","id"=>"104","o"=>$oran_visible);

$json['live']['21093']['games'][] = array(
"Id"=>"324",
"EGID"=>"104",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"21093"
);

$json['live']['21093']['games'][] = array(
"Id"=>"325",
"EGID"=>"104",
"Namexxx"=>"X","Name"=>"X",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"21093"
);

$json['live']['21093']['games'][] = array(
"Id"=>"326",
"EGID"=>"104",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"-",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"21093"
);

}
}

if($GameTemplateId==21092) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Kalan Süre Tahmini - skor:1-2","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Kalan Süre Tahmini - skor:1-2","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"Kalan Süre Tahmini - skor:1-2","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['21092'] = array("tempid"=>"21092","N2"=>"".getTranslation('futboloran161')."","N"=>"Kalan Süre Tahmini - skor:1-2","id"=>"104","o"=>$oran_visible);

$json['live']['21092']['games'][] = array(
"Id"=>"324",
"EGID"=>"104",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"21092"
);

$json['live']['21092']['games'][] = array(
"Id"=>"325",
"EGID"=>"104",
"Namexxx"=>"X","Name"=>"X",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"21092"
);

$json['live']['21092']['games'][] = array(
"Id"=>"326",
"EGID"=>"104",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"-",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"21092"
);

}
}

if($GameTemplateId==21061) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Kalan Süre Tahmini - skor:3-0","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Kalan Süre Tahmini - skor:3-0","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"Kalan Süre Tahmini - skor:3-0","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['21061'] = array("tempid"=>"21061","N2"=>"".getTranslation('futboloran162')."","N"=>"Kalan Süre Tahmini - skor:3-0","id"=>"104","o"=>$oran_visible);

$json['live']['21061']['games'][] = array(
"Id"=>"324",
"EGID"=>"104",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"21061"
);

$json['live']['21061']['games'][] = array(
"Id"=>"325",
"EGID"=>"104",
"Namexxx"=>"X","Name"=>"X",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"21061"
);

$json['live']['21061']['games'][] = array(
"Id"=>"326",
"EGID"=>"104",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"-",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"21061"
);

}
}

if($GameTemplateId==21060) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Kalan Süre Tahmini - skor:0-3","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Kalan Süre Tahmini - skor:0-3","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"Kalan Süre Tahmini - skor:0-3","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['21060'] = array("tempid"=>"21060","N2"=>"".getTranslation('futboloran163')."","N"=>"Kalan Süre Tahmini - skor:0-3","id"=>"104","o"=>$oran_visible);

$json['live']['21060']['games'][] = array(
"Id"=>"324",
"EGID"=>"104",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"21060"
);

$json['live']['21060']['games'][] = array(
"Id"=>"325",
"EGID"=>"104",
"Namexxx"=>"X","Name"=>"X",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"21060"
);

$json['live']['21060']['games'][] = array(
"Id"=>"326",
"EGID"=>"104",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"-",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"21060"
);

}
}

if($GameTemplateId==21079) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Kalan Süre Tahmini - skor:2-2","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Kalan Süre Tahmini - skor:2-2","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"Kalan Süre Tahmini - skor:2-2","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['21079'] = array("tempid"=>"21079","N2"=>"".getTranslation('futboloran164')."","N"=>"Kalan Süre Tahmini - skor:2-2","id"=>"104","o"=>$oran_visible);

$json['live']['21079']['games'][] = array(
"Id"=>"324",
"EGID"=>"104",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"21079"
);

$json['live']['21079']['games'][] = array(
"Id"=>"325",
"EGID"=>"104",
"Namexxx"=>"X","Name"=>"X",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"21079"
);

$json['live']['21079']['games'][] = array(
"Id"=>"326",
"EGID"=>"104",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"-",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"21079"
);

}
}

if($GameTemplateId==21094) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Kalan Süre Tahmini - skor:1-3","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Kalan Süre Tahmini - skor:1-3","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"Kalan Süre Tahmini - skor:1-3","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['21094'] = array("tempid"=>"21094","N2"=>"".getTranslation('futboloran165')."","N"=>"Kalan Süre Tahmini - skor:1-3","id"=>"104","o"=>$oran_visible);

$json['live']['21094']['games'][] = array(
"Id"=>"324",
"EGID"=>"104",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"21094"
);

$json['live']['21094']['games'][] = array(
"Id"=>"325",
"EGID"=>"104",
"Namexxx"=>"X","Name"=>"X",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"21094"
);

$json['live']['21094']['games'][] = array(
"Id"=>"326",
"EGID"=>"104",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"-",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"21094"
);

}
}

if($GameTemplateId==21063) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Kalan Süre Tahmini - skor:4-0","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Kalan Süre Tahmini - skor:4-0","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"Kalan Süre Tahmini - skor:4-0","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['21063'] = array("tempid"=>"21063","N2"=>"".getTranslation('futboloran166')."","N"=>"Kalan Süre Tahmini - skor:4-0","id"=>"104","o"=>$oran_visible);

$json['live']['21063']['games'][] = array(
"Id"=>"324",
"EGID"=>"104",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"21063"
);

$json['live']['21063']['games'][] = array(
"Id"=>"325",
"EGID"=>"104",
"Namexxx"=>"X","Name"=>"X",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"21063"
);

$json['live']['21063']['games'][] = array(
"Id"=>"326",
"EGID"=>"104",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"-",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"21063"
);

}
}

if($GameTemplateId==21065) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Kalan Süre Tahmini - skor:5-0","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Kalan Süre Tahmini - skor:5-0","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"Kalan Süre Tahmini - skor:5-0","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['21065'] = array("tempid"=>"21065","N2"=>"".getTranslation('futboloran167')."","N"=>"Kalan Süre Tahmini - skor:5-0","id"=>"104","o"=>$oran_visible);

$json['live']['21065']['games'][] = array(
"Id"=>"324",
"EGID"=>"104",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"21065"
);

$json['live']['21065']['games'][] = array(
"Id"=>"325",
"EGID"=>"104",
"Namexxx"=>"X","Name"=>"X",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"21065"
);

$json['live']['21065']['games'][] = array(
"Id"=>"326",
"EGID"=>"104",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"-",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"21065"
);

}
}

if($GameTemplateId==21097) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Kalan Süre Tahmini - skor:4-1","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Kalan Süre Tahmini - skor:4-1","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"Kalan Süre Tahmini - skor:4-1","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['21097'] = array("tempid"=>"21097","N2"=>"".getTranslation('futboloran168')."","N"=>"Kalan Süre Tahmini - skor:4-1","id"=>"104","o"=>$oran_visible);

$json['live']['21097']['games'][] = array(
"Id"=>"324",
"EGID"=>"104",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"21097"
);

$json['live']['21097']['games'][] = array(
"Id"=>"325",
"EGID"=>"104",
"Namexxx"=>"X","Name"=>"X",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"21097"
);

$json['live']['21097']['games'][] = array(
"Id"=>"326",
"EGID"=>"104",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"-",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"21097"
);

}
}

if($GameTemplateId==21102) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Kalan Süre Tahmini - skor:3-2","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Kalan Süre Tahmini - skor:3-2","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"Kalan Süre Tahmini - skor:3-2","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['21102'] = array("tempid"=>"21102","N2"=>"".getTranslation('futboloran169')."","N"=>"Kalan Süre Tahmini - skor:3-2","id"=>"104","o"=>$oran_visible);

$json['live']['21102']['games'][] = array(
"Id"=>"324",
"EGID"=>"104",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"21102"
);

$json['live']['21102']['games'][] = array(
"Id"=>"325",
"EGID"=>"104",
"Namexxx"=>"X","Name"=>"X",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"21102"
);

$json['live']['21102']['games'][] = array(
"Id"=>"326",
"EGID"=>"104",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"-",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"21102"
);

}
}

if($GameTemplateId==21080) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Kalan Süre Tahmini - skor:3-3","futbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Kalan Süre Tahmini - skor:3-3","futbol");
$oran3 = dusenoranbulcanli($oran3_ver,"Kalan Süre Tahmini - skor:3-3","futbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;
if($oran_visible=="Visible"){

$json['live']['21080'] = array("tempid"=>"21080","N2"=>"".getTranslation('futboloran170')."","N"=>"Kalan Süre Tahmini - skor:3-3","id"=>"104","o"=>$oran_visible);

$json['live']['21080']['games'][] = array(
"Id"=>"324",
"EGID"=>"104",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"21080"
);

$json['live']['21080']['games'][] = array(
"Id"=>"325",
"EGID"=>"104",
"Namexxx"=>"X","Name"=>"X",
"Name1X2"=>"-",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"21080"
);

$json['live']['21080']['games'][] = array(
"Id"=>"326",
"EGID"=>"104",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"-",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"21080"
);

}
}

## ORAN BİTİŞ YERİ ##
}

}

if($karsilasmayok==0){
$json = array("eid"=>0);
echo json_encode($json);
} else {
echo json_encode($json);
}

}

} else if($sportipi=="7"){

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
$karsilasmayok++;
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
$count_sayisi_ver = "255";

$evtakim = $match->a;
$deptakim = $match->h;
$ev_tisort = $match->hshtcolor;
$ev_sort = $match->htshtcolor;
$konuk_tisort = $match->ashtcolor;
$konuk_sort = $match->atshtcolor;
$betradarid = $match->radarid;
$lig_id = $match->lid;
$lig_adi = $match->lig;
$ulke_id = $match->uid;
$ulke_adi = $match->ulke;
$baslangic_tarih2 = $match->sdate;
$baslangic_saat2 = $match->sht;
$periodId = $match->pid;
$dakika_ver_simdi = $match->dk;
$saniye_ver_simdi = $match->sn;

$sayi_ver_basket_0 = 255;
$sayi_ver_basket_1 = 1;
$sayi_ver_basket_2 = 3;
$sayi_ver_basket_3 = 5;
$sayi_ver_basket_4 = 7;
## EV SKORLARI ##
$skor_ev = (int)$match->sch;
$ev1c = (int)$match->ev1c;
$ev2c = (int)$match->ev2c;
$ev3c = (int)$match->ev3c;
$ev4c = (int)$match->ev4c;
## DEP SKORLARI ##
$skor_dep = (int)$match->sca;
$dep1c = (int)$match->dep1c;
$dep2c = (int)$match->dep2c;
$dep3c = (int)$match->dep3c;
$dep4c = (int)$match->dep4c;
## ///// ##

$json = array(
"eid"=>$mac_id,
"prv"=>"0",
"n"=>"".$evtakim." - ".$deptakim."",
"spid"=>"7",
"spidname"=>"Basketball",
"lid"=>"".$lig_id."",
"lig"=>$lig_adi,
"h"=>$evtakim,
"a"=>$deptakim,
"hshtcolor"=>"",
"htshtcolor"=>"",
"ashtcolor"=>"",
"atshtcolor"=>"",
"run"=>true,
"actionts"=>"",
"referedate"=>"0",
"secound"=>"0",
"reftime"=>"",
"reftimet"=>"",
"addicon"=>"",
"tvisible"=>true,
"tv"=>"",
"pid"=>"".$periodId."",
"dk"=>"".$dakika_ver_simdi."",
"sn"=>"".$saniye_ver_simdi."",
"uid"=>"".$ulke_id."",
"ulke"=>$ulke_adi,
"sdate"=>"".$baslangic_tarih2."",
"sht"=>"".$baslangic_saat2."",
"radarid"=>"".$betradarid."",
"smid"=>"",
"gseri"=>"0",
"sch"=>"".$skor_ev."",
"sca"=>"".$skor_dep."",
"isch"=>"0",
"isca"=>"0",
"crnh"=>"0",
"crna"=>"0",
"redh"=>"0",
"reda"=>"0",
"serph"=>"0",
"serpa"=>"0",
"ycardh"=>"0",
"ycarda"=>"0",
"pnlth"=>"0",
"pnlta"=>"0",
"turn"=>"0",
"periodsh"=>["1"=>$ev1c,"2"=>$ev2c,"3"=>$ev3c,"4"=>$ev4c,"5"=>"0","6"=>"0","7"=>"0"],
"periodsa"=>["1"=>$dep1c,"2"=>$dep2c,"3"=>$dep3c,"4"=>$dep4c,"5"=>"0","6"=>"0","7"=>"0"],
"turnvis"=>""
);

foreach($match->Msg as $keysss => $messagesver){
$mesajtypesi = $messagesver->type;
$mesajteam = $messagesver->team;
$mesajtime = $messagesver->dk;
$aciklamasi = LiveTRmsg($messagesver->N);

$json['Msg'][] = array("id"=>$keysss,"type"=>$mesajtypesi,"dk"=>$mesajtime,"team"=>$mesajteam,"N"=>$aciklamasi);

}

foreach($match->oran as $oranlar){
$GameTemplateId = $oranlar->tempid;
$icoranlar = $oranlar->rest;

if($GameTemplateId == 15025) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"1X2 (Uz. Hariç)","basketbol");
$oran2 = dusenoranbulcanli($oran2_ver,"1X2 (Uz. Hariç)","basketbol");
$oran3 = dusenoranbulcanli($oran3_ver,"1X2 (Uz. Hariç)","basketbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;

$json['live']['15025'] = array("tempid"=>"15025","N2"=>"".getTranslation('basketboloran2')."","N"=>"1X2 (Uz. Hariç)","id"=>"1","o"=>$oran_visible);

$json['live']['15025']['games'][] = array(
"Id"=>"1",
"EGID"=>"1",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"15025"
);

$json['live']['15025']['games'][] = array(
"Id"=>"2",
"EGID"=>"1",
"Namexxx"=>"X","Name"=>"X",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"15025"
);

$json['live']['15025']['games'][] = array(
"Id"=>"3",
"EGID"=>"1",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"15025"
);

}


if($GameTemplateId == 19849) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"1X2(1.YARI)","basketbol");
$oran2 = dusenoranbulcanli($oran2_ver,"1X2(1.YARI)","basketbol");
$oran3 = dusenoranbulcanli($oran3_ver,"1X2(1.YARI)","basketbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;

$json['live']['19849'] = array("tempid"=>"19849","N2"=>"".getTranslation('basketboloran3')."","N"=>"1X2(1.YARI)","id"=>"2","o"=>$oran_visible);

$json['live']['19849']['games'][] = array(
"Id"=>"4",
"EGID"=>"2",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"19849"
);

$json['live']['19849']['games'][] = array(
"Id"=>"5",
"EGID"=>"2",
"Namexxx"=>"X","Name"=>"X",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"19849"
);

$json['live']['19849']['games'][] = array(
"Id"=>"6",
"EGID"=>"2",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"19849"
);

}

if($GameTemplateId == 31511) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"1X2(2.YARI)","basketbol");
$oran2 = dusenoranbulcanli($oran2_ver,"1X2(2.YARI)","basketbol");
$oran3 = dusenoranbulcanli($oran3_ver,"1X2(2.YARI)","basketbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;

$json['live']['31511'] = array("tempid"=>"31511","N2"=>"".getTranslation('basketboloran20')."","N"=>"1X2(2.YARI)","id"=>"3","o"=>$oran_visible);

$json['live']['31511']['games'][] = array(
"Id"=>"7",
"EGID"=>"3",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"31511"
);

$json['live']['31511']['games'][] = array(
"Id"=>"8",
"EGID"=>"3",
"Namexxx"=>"X","Name"=>"X",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"31511"
);

$json['live']['31511']['games'][] = array(
"Id"=>"9",
"EGID"=>"3",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"31511"
);

}

if($GameTemplateId == 31512) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"1X2(1.Çeyrek)","basketbol");
$oran2 = dusenoranbulcanli($oran2_ver,"1X2(1.Çeyrek)","basketbol");
$oran3 = dusenoranbulcanli($oran3_ver,"1X2(1.Çeyrek)","basketbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;

$json['live']['31512'] = array("tempid"=>"31512","N2"=>"".getTranslation('basketboloran21')."","N"=>"1X2(1.Çeyrek)","id"=>"4","o"=>$oran_visible);

$json['live']['31512']['games'][] = array(
"Id"=>"10",
"EGID"=>"4",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"31512"
);

$json['live']['31512']['games'][] = array(
"Id"=>"11",
"EGID"=>"4",
"Namexxx"=>"X","Name"=>"X",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"31512"
);

$json['live']['31512']['games'][] = array(
"Id"=>"12",
"EGID"=>"4",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"31512"
);

}

if($GameTemplateId == 31513) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"1X2(2.Çeyrek)","basketbol");
$oran2 = dusenoranbulcanli($oran2_ver,"1X2(2.Çeyrek)","basketbol");
$oran3 = dusenoranbulcanli($oran3_ver,"1X2(2.Çeyrek)","basketbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;

$json['live']['31513'] = array("tempid"=>"31513","N2"=>"".getTranslation('basketboloran22')."","N"=>"1X2(2.Çeyrek)","id"=>"5","o"=>$oran_visible);

$json['live']['31513']['games'][] = array(
"Id"=>"13",
"EGID"=>"5",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"31513"
);

$json['live']['31513']['games'][] = array(
"Id"=>"14",
"EGID"=>"5",
"Namexxx"=>"X","Name"=>"X",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"31513"
);

$json['live']['31513']['games'][] = array(
"Id"=>"15",
"EGID"=>"5",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"31513"
);

}

if($GameTemplateId == 31514) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"1X2(3.Çeyrek)","basketbol");
$oran2 = dusenoranbulcanli($oran2_ver,"1X2(3.Çeyrek)","basketbol");
$oran3 = dusenoranbulcanli($oran3_ver,"1X2(3.Çeyrek)","basketbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;

$json['live']['31514'] = array("tempid"=>"31514","N2"=>"".getTranslation('basketboloran23')."","N"=>"1X2(3.Çeyrek)","id"=>"6","o"=>$oran_visible);

$json['live']['31514']['games'][] = array(
"Id"=>"16",
"EGID"=>"6",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"31514"
);

$json['live']['31514']['games'][] = array(
"Id"=>"17",
"EGID"=>"6",
"Namexxx"=>"X","Name"=>"X",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"31514"
);

$json['live']['31514']['games'][] = array(
"Id"=>"18",
"EGID"=>"6",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"31514"
);

}

if($GameTemplateId == 31515) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"1X2(4.Çeyrek)","basketbol");
$oran2 = dusenoranbulcanli($oran2_ver,"1X2(4.Çeyrek)","basketbol");
$oran3 = dusenoranbulcanli($oran3_ver,"1X2(4.Çeyrek)","basketbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;

$json['live']['31515'] = array("tempid"=>"31515","N2"=>"".getTranslation('basketboloran24')."","N"=>"1X2(4.Çeyrek)","id"=>"7","o"=>$oran_visible);

$json['live']['31515']['games'][] = array(
"Id"=>"19",
"EGID"=>"7",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"31515"
);

$json['live']['31515']['games'][] = array(
"Id"=>"20",
"EGID"=>"7",
"Namexxx"=>"X","Name"=>"X",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"31515"
);

$json['live']['31515']['games'][] = array(
"Id"=>"21",
"EGID"=>"7",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"31515"
);

}

if($GameTemplateId == 66) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Kim Kazanır (Uz. Dahil)","basketbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Kim Kazanır (Uz. Dahil)","basketbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;

$json['live']['66'] = array("tempid"=>"66","N2"=>"".getTranslation('basketboloran1')."","N"=>"Kim Kazanır (Uz. Dahil)","id"=>"8","o"=>$oran_visible);

$json['live']['66']['games'][] = array(
"Id"=>"22",
"EGID"=>"8",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"66"
);

$json['live']['66']['games'][] = array(
"Id"=>"23",
"EGID"=>"8",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"66"
);

}

if($GameTemplateId == 14610) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"1.Çeyrek Kim Kazanır","basketbol");
$oran2 = dusenoranbulcanli($oran2_ver,"1.Çeyrek Kim Kazanır","basketbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;

$json['live']['14610'] = array("tempid"=>"14610","N2"=>"".getTranslation('basketboloran17')."","N"=>"1.Çeyrek Kim Kazanır","id"=>"9","o"=>$oran_visible);

$json['live']['14610']['games'][] = array(
"Id"=>"24",
"EGID"=>"9",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"14610"
);

$json['live']['14610']['games'][] = array(
"Id"=>"25",
"EGID"=>"9",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"14610"
);

}

if($GameTemplateId == 20127) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"2.Çeyrek Kim Kazanır","basketbol");
$oran2 = dusenoranbulcanli($oran2_ver,"2.Çeyrek Kim Kazanır","basketbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;

$json['live']['20127'] = array("tempid"=>"20127","N2"=>"".getTranslation('basketboloran25')."","N"=>"2.Çeyrek Kim Kazanır","id"=>"10","o"=>$oran_visible);

$json['live']['20127']['games'][] = array(
"Id"=>"26",
"EGID"=>"10",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"20127"
);

$json['live']['20127']['games'][] = array(
"Id"=>"27",
"EGID"=>"10",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"20127"
);

}

if($GameTemplateId == 20128) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"3.Çeyrek Kim Kazanır","basketbol");
$oran2 = dusenoranbulcanli($oran2_ver,"3.Çeyrek Kim Kazanır","basketbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;

$json['live']['20128'] = array("tempid"=>"20128","N2"=>"".getTranslation('basketboloran26')."","N"=>"3.Çeyrek Kim Kazanır","id"=>"11","o"=>$oran_visible);

$json['live']['20128']['games'][] = array(
"Id"=>"28",
"EGID"=>"11",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"20128"
);

$json['live']['20128']['games'][] = array(
"Id"=>"29",
"EGID"=>"11",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"20128"
);

}

if($GameTemplateId == 20129) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"4.Çeyrek Kim Kazanır","basketbol");
$oran2 = dusenoranbulcanli($oran2_ver,"4.Çeyrek Kim Kazanır","basketbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;

$json['live']['20129'] = array("tempid"=>"20129","N2"=>"".getTranslation('basketboloran27')."","N"=>"4.Çeyrek Kim Kazanır","id"=>"12","o"=>$oran_visible);

$json['live']['20129']['games'][] = array(
"Id"=>"30",
"EGID"=>"12",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"20129"
);

$json['live']['20129']['games'][] = array(
"Id"=>"31",
"EGID"=>"12",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"20129"
);

}

if($GameTemplateId == 102) {
$oran2_ver = number_format($icoranlar[0]->Odds,2);
$oran1_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Toplam Skor Alt/Üst","basketbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Toplam Skor Alt/Üst","basketbol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$alt_ust_getir = $icoranlar[0]->Name;
$alt_ust_bol = explode(" ",$alt_ust_getir);
$ust_ver = $alt_ust_bol[1];

if($ust_ver != ''){
$oran_visible = $oranlar->o;

$json['live']['102'] = array("tempid"=>"102","N2"=>"".getTranslation('basketboloran5')."","N"=>"Toplam Skor Alt/Üst","id"=>"13","o"=>$oran_visible);

$json['live']['102']['games'][] = array(
"Id"=>"32",
"EGID"=>"13",
"hcoun"=>"9",
"Namexxx"=>"".getTranslation('oransecenek30')." ".$ust_ver."","Name"=>"Üst ".$ust_ver."",
"Name1X2"=>"+",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"102"
);

$json['live']['102']['games'][] = array(
"Id"=>"33",
"EGID"=>"13",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." ".$ust_ver."","Name"=>"Alt ".$ust_ver."",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"102"
);

}

}

if($GameTemplateId == 7356) {
$oran2_ver = number_format($icoranlar[0]->Odds,2);
$oran1_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"1.Çeyrek Toplam Alt/Üst","basketbol");
$oran2 = dusenoranbulcanli($oran2_ver,"1.Çeyrek Toplam Alt/Üst","basketbol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$alt_ust_getir = $icoranlar[0]->Name;
$alt_ust_bol = explode(" ",$alt_ust_getir);
$ust_ver = $alt_ust_bol[1];

if($ust_ver != ''){
$oran_visible = $oranlar->o;

$json['live']['7356'] = array("tempid"=>"7356","N2"=>"".getTranslation('basketboloran28')."","N"=>"1.Çeyrek Toplam Alt/Üst","id"=>"14","o"=>$oran_visible);

$json['live']['7356']['games'][] = array(
"Id"=>"34",
"EGID"=>"14",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." ".$ust_ver."","Name"=>"Üst ".$ust_ver."",
"Name1X2"=>"+",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"7356"
);

$json['live']['7356']['games'][] = array(
"Id"=>"35",
"EGID"=>"14",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." ".$ust_ver."","Name"=>"Alt ".$ust_ver."",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"7356"
);

}

}

if($GameTemplateId == 17588) {
$oran2_ver = number_format($icoranlar[0]->Odds,2);
$oran1_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"2.Çeyrek Toplam Alt/Üst","basketbol");
$oran2 = dusenoranbulcanli($oran2_ver,"2.Çeyrek Toplam Alt/Üst","basketbol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$alt_ust_getir = $icoranlar[0]->Name;
$alt_ust_bol = explode(" ",$alt_ust_getir);
$ust_ver = $alt_ust_bol[1];

if($ust_ver != ''){
$oran_visible = $oranlar->o;

$json['live']['17588'] = array("tempid"=>"17588","N2"=>"".getTranslation('basketboloran29')."","N"=>"2.Çeyrek Toplam Alt/Üst","id"=>"15","o"=>$oran_visible);

$json['live']['17588']['games'][] = array(
"Id"=>"36",
"EGID"=>"15",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." ".$ust_ver."","Name"=>"Üst ".$ust_ver."",
"Name1X2"=>"+",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"17588"
);

$json['live']['17588']['games'][] = array(
"Id"=>"37",
"EGID"=>"15",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." ".$ust_ver."","Name"=>"Alt ".$ust_ver."",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"17588"
);

}

}

if($GameTemplateId == 17589) {
$oran2_ver = number_format($icoranlar[0]->Odds,2);
$oran1_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"3.Çeyrek Toplam Alt/Üst","basketbol");
$oran2 = dusenoranbulcanli($oran2_ver,"3.Çeyrek Toplam Alt/Üst","basketbol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$alt_ust_getir = $icoranlar[0]->Name;
$alt_ust_bol = explode(" ",$alt_ust_getir);
$ust_ver = $alt_ust_bol[1];

if($ust_ver != ''){
$oran_visible = $oranlar->o;

$json['live']['17589'] = array("tempid"=>"17589","N2"=>"".getTranslation('basketboloran30')."","N"=>"3.Çeyrek Toplam Alt/Üst","id"=>"16","o"=>$oran_visible);

$json['live']['17589']['games'][] = array(
"Id"=>"38",
"EGID"=>"16",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." ".$ust_ver."","Name"=>"Üst ".$ust_ver."",
"Name1X2"=>"+",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"17589"
);

$json['live']['17589']['games'][] = array(
"Id"=>"39",
"EGID"=>"16",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." ".$ust_ver."","Name"=>"Alt ".$ust_ver."",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"17589"
);

}

}

if($GameTemplateId == 17590) {
$oran2_ver = number_format($icoranlar[0]->Odds,2);
$oran1_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"4.Çeyrek Toplam Alt/Üst","basketbol");
$oran2 = dusenoranbulcanli($oran2_ver,"4.Çeyrek Toplam Alt/Üst","basketbol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$alt_ust_getir = $icoranlar[0]->Name;
$alt_ust_bol = explode(" ",$alt_ust_getir);
$ust_ver = $alt_ust_bol[1];

if($ust_ver != ''){
$oran_visible = $oranlar->o;

$json['live']['17590'] = array("tempid"=>"17590","N2"=>"".getTranslation('basketboloran31')."","N"=>"4.Çeyrek Toplam Alt/Üst","id"=>"17","o"=>$oran_visible);

$json['live']['17590']['games'][] = array(
"Id"=>"40",
"EGID"=>"17",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." ".$ust_ver."","Name"=>"Üst ".$ust_ver."",
"Name1X2"=>"+",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"17590"
);

$json['live']['17590']['games'][] = array(
"Id"=>"41",
"EGID"=>"17",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." ".$ust_ver."","Name"=>"Alt ".$ust_ver."",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"17590"
);

}

}

if($GameTemplateId == 12426) {
$oran2_ver = number_format($icoranlar[0]->Odds,2);
$oran1_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"1.Takım Toplam Alt/Üst","basketbol");
$oran2 = dusenoranbulcanli($oran2_ver,"1.Takım Toplam Alt/Üst","basketbol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$alt_ust_getir = $icoranlar[0]->Name;
$alt_ust_bol = explode(" ",$alt_ust_getir);
$ust_ver = $alt_ust_bol[1];

if($ust_ver != ''){
$oran_visible = $oranlar->o;

$json['live']['12426'] = array("tempid"=>"12426","N2"=>"".getTranslation('basketboloran32')."","N"=>"1.Takım Toplam Alt/Üst","id"=>"18","o"=>$oran_visible);

$json['live']['12426']['games'][] = array(
"Id"=>"42",
"EGID"=>"18",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." ".$ust_ver."","Name"=>"Üst ".$ust_ver."",
"Name1X2"=>"+",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"12426"
);

$json['live']['12426']['games'][] = array(
"Id"=>"43",
"EGID"=>"18",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." ".$ust_ver."","Name"=>"Alt ".$ust_ver."",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"12426"
);

}

}

if($GameTemplateId == 18191) {
$oran2_ver = number_format($icoranlar[0]->Odds,2);
$oran1_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"2.Takım Toplam Alt/Üst","basketbol");
$oran2 = dusenoranbulcanli($oran2_ver,"2.Takım Toplam Alt/Üst","basketbol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$alt_ust_getir = $icoranlar[0]->Name;
$alt_ust_bol = explode(" ",$alt_ust_getir);
$ust_ver = $alt_ust_bol[1];

if($ust_ver != ''){
$oran_visible = $oranlar->o;

$json['live']['18191'] = array("tempid"=>"18191","N2"=>"".getTranslation('basketboloran33')."","N"=>"2.Takım Toplam Alt/Üst","id"=>"19","o"=>$oran_visible);

$json['live']['18191']['games'][] = array(
"Id"=>"44",
"EGID"=>"19",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." ".$ust_ver."","Name"=>"Üst ".$ust_ver."",
"Name1X2"=>"+",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"18191"
);

$json['live']['18191']['games'][] = array(
"Id"=>"45",
"EGID"=>"19",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." ".$ust_ver."","Name"=>"Alt ".$ust_ver."",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"18191"
);

}

}

if($GameTemplateId == 12811) {
$oran2_ver = number_format($icoranlar[0]->Odds,2);
$oran1_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"1.Takım 1.Yarı Toplam Alt/Üst","basketbol");
$oran2 = dusenoranbulcanli($oran2_ver,"1.Takım 1.Yarı Toplam Alt/Üst","basketbol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$alt_ust_getir = $icoranlar[0]->Name;
$alt_ust_bol = explode(" ",$alt_ust_getir);
$ust_ver = $alt_ust_bol[1];

if($ust_ver != ''){
$oran_visible = $oranlar->o;

$json['live']['12811'] = array("tempid"=>"12811","N2"=>"".getTranslation('basketboloran34')."","N"=>"1.Takım 1.Yarı Toplam Alt/Üst","id"=>"20","o"=>$oran_visible);

$json['live']['12811']['games'][] = array(
"Id"=>"46",
"EGID"=>"20",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." ".$ust_ver."","Name"=>"Üst ".$ust_ver."",
"Name1X2"=>"+",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"12811"
);

$json['live']['12811']['games'][] = array(
"Id"=>"47",
"EGID"=>"20",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." ".$ust_ver."","Name"=>"Alt ".$ust_ver."",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"12811"
);

}

}

if($GameTemplateId == 18188) {
$oran2_ver = number_format($icoranlar[0]->Odds,2);
$oran1_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"2.Takım 1.Yarı Toplam Alt/Üst","basketbol");
$oran2 = dusenoranbulcanli($oran2_ver,"2.Takım 1.Yarı Toplam Alt/Üst","basketbol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$alt_ust_getir = $icoranlar[0]->Name;
$alt_ust_bol = explode(" ",$alt_ust_getir);
$ust_ver = $alt_ust_bol[1];

if($ust_ver != ''){
$oran_visible = $oranlar->o;

$json['live']['18188'] = array("tempid"=>"18188","N2"=>"".getTranslation('basketboloran35')."","N"=>"2.Takım 1.Yarı Toplam Alt/Üst","id"=>"21","o"=>$oran_visible);

$json['live']['18188']['games'][] = array(
"Id"=>"48",
"EGID"=>"21",
"hcoun"=>"8",
"Namexxx"=>"".getTranslation('oransecenek30')." ".$ust_ver."","Name"=>"Üst ".$ust_ver."",
"Name1X2"=>"+",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"18188"
);

$json['live']['18188']['games'][] = array(
"Id"=>"49",
"EGID"=>"21",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." ".$ust_ver."","Name"=>"Alt ".$ust_ver."",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"18188"
);

}

}

if($GameTemplateId == 7699) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Handikap","basketbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Handikap","basketbol");

$ev_sahibi_handikap = $icoranlar[0]->attr;
$deplasman_handikap = $icoranlar[1]->attr;

$visible1 = $icoranlar[0]->Visible;
if($visible1=="Visible"){
	$visible1 = 1;
} else {
	$visible1 = 0;
}
$visible2 = $icoranlar[1]->Visible;
if($visible2=="Visible"){
	$visible2 = 1;
} else {
	$visible2 = 0;
}

$oran_visible = $oranlar->o;

$json['live']['7699'] = array("tempid"=>"7699","N2"=>"".getTranslation('basketboloran7')."","N"=>"Handikap","id"=>"22","o"=>$oran_visible);

$json['live']['7699']['games'][] = array(
"Id"=>"50",
"EGID"=>"22",
"hcoun"=>"5",
"Namexxx"=>"1 ".$ev_sahibi_handikap."","Name"=>"1 ".$ev_sahibi_handikap."",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"7699"
);

$json['live']['7699']['games'][] = array(
"Id"=>"51",
"EGID"=>"22",
"hcoun"=>"3",
"Namexxx"=>"2 ".$deplasman_handikap."","Name"=>"2 ".$deplasman_handikap."",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"7699"
);

}

if($GameTemplateId == 7698) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"1.Yarı Handikap","basketbol");
$oran2 = dusenoranbulcanli($oran2_ver,"1.Yarı Handikap","basketbol");

$ev_sahibi_handikap = $icoranlar[0]->attr;
$deplasman_handikap = $icoranlar[1]->attr;

$visible1 = $icoranlar[0]->Visible;
if($visible1=="Visible"){
	$visible1 = 1;
} else {
	$visible1 = 0;
}
$visible2 = $icoranlar[1]->Visible;
if($visible2=="Visible"){
	$visible2 = 1;
} else {
	$visible2 = 0;
}

$oran_visible = $oranlar->o;

$json['live']['7698'] = array("tempid"=>"7698","N2"=>"".getTranslation('basketboloran36')."","N"=>"1.Yarı Handikap","id"=>"23","o"=>$oran_visible);

$json['live']['7698']['games'][] = array(
"Id"=>"52",
"EGID"=>"23",
"hcoun"=>"5",
"Namexxx"=>"1 ".$ev_sahibi_handikap."","Name"=>"1 ".$ev_sahibi_handikap."",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"7698"
);

$json['live']['7698']['games'][] = array(
"Id"=>"53",
"EGID"=>"23",
"hcoun"=>"3",
"Namexxx"=>"2 ".$deplasman_handikap."","Name"=>"2 ".$deplasman_handikap."",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"7698"
);

}

if($GameTemplateId == 11305) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"2.Yarı Handikap","basketbol");
$oran2 = dusenoranbulcanli($oran2_ver,"2.Yarı Handikap","basketbol");

$ev_sahibi_handikap = $icoranlar[0]->attr;
$deplasman_handikap = $icoranlar[1]->attr;

$visible1 = $icoranlar[0]->Visible;
if($visible1=="Visible"){
	$visible1 = 1;
} else {
	$visible1 = 0;
}
$visible2 = $icoranlar[1]->Visible;
if($visible2=="Visible"){
	$visible2 = 1;
} else {
	$visible2 = 0;
}

$oran_visible = $oranlar->o;

$json['live']['11305'] = array("tempid"=>"11305","N2"=>"".getTranslation('basketboloran37')."","N"=>"2.Yarı Handikap","id"=>"24","o"=>$oran_visible);

$json['live']['11305']['games'][] = array(
"Id"=>"54",
"EGID"=>"24",
"hcoun"=>"5",
"Namexxx"=>"1 ".$ev_sahibi_handikap."","Name"=>"1 ".$ev_sahibi_handikap."",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"11305"
);

$json['live']['11305']['games'][] = array(
"Id"=>"55",
"EGID"=>"24",
"hcoun"=>"3",
"Namexxx"=>"2 ".$deplasman_handikap."","Name"=>"2 ".$deplasman_handikap."",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"11305"
);

}

if($GameTemplateId == 7332) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"1.Çeyrek Handikap","basketbol");
$oran2 = dusenoranbulcanli($oran2_ver,"1.Çeyrek Handikap","basketbol");

$ev_sahibi_handikap = $icoranlar[0]->attr;
$deplasman_handikap = $icoranlar[1]->attr;

$visible1 = $icoranlar[0]->Visible;
if($visible1=="Visible"){
	$visible1 = 1;
} else {
	$visible1 = 0;
}
$visible2 = $icoranlar[1]->Visible;
if($visible2=="Visible"){
	$visible2 = 1;
} else {
	$visible2 = 0;
}

$oran_visible = $oranlar->o;

$json['live']['7332'] = array("tempid"=>"7332","N2"=>"".getTranslation('basketboloran38')."","N"=>"1.Çeyrek Handikap","id"=>"25","o"=>$oran_visible);

$json['live']['7332']['games'][] = array(
"Id"=>"56",
"EGID"=>"25",
"hcoun"=>"5",
"Namexxx"=>"1 ".$ev_sahibi_handikap."","Name"=>"1 ".$ev_sahibi_handikap."",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"7332"
);

$json['live']['7332']['games'][] = array(
"Id"=>"57",
"EGID"=>"25",
"hcoun"=>"3",
"Namexxx"=>"2 ".$deplasman_handikap."","Name"=>"2 ".$deplasman_handikap."",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"7332"
);

}

if($GameTemplateId == 7357) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"2.Çeyrek Handikap","basketbol");
$oran2 = dusenoranbulcanli($oran2_ver,"2.Çeyrek Handikap","basketbol");

$ev_sahibi_handikap = $icoranlar[0]->attr;
$deplasman_handikap = $icoranlar[1]->attr;

$visible1 = $icoranlar[0]->Visible;
if($visible1=="Visible"){
	$visible1 = 1;
} else {
	$visible1 = 0;
}
$visible2 = $icoranlar[1]->Visible;
if($visible2=="Visible"){
	$visible2 = 1;
} else {
	$visible2 = 0;
}

$oran_visible = $oranlar->o;

$json['live']['7357'] = array("tempid"=>"7357","N2"=>"".getTranslation('basketboloran39')."","N"=>"2.Çeyrek Handikap","id"=>"26","o"=>$oran_visible);

$json['live']['7357']['games'][] = array(
"Id"=>"58",
"EGID"=>"26",
"hcoun"=>"5",
"Namexxx"=>"1 ".$ev_sahibi_handikap."","Name"=>"1 ".$ev_sahibi_handikap."",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"7357"
);

$json['live']['7357']['games'][] = array(
"Id"=>"59",
"EGID"=>"26",
"hcoun"=>"3",
"Namexxx"=>"2 ".$deplasman_handikap."","Name"=>"2 ".$deplasman_handikap."",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"7357"
);

}

if($GameTemplateId == 11306) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"3.Çeyrek Handikap","basketbol");
$oran2 = dusenoranbulcanli($oran2_ver,"3.Çeyrek Handikap","basketbol");

$ev_sahibi_handikap = $icoranlar[0]->attr;
$deplasman_handikap = $icoranlar[1]->attr;

$visible1 = $icoranlar[0]->Visible;
if($visible1=="Visible"){
	$visible1 = 1;
} else {
	$visible1 = 0;
}
$visible2 = $icoranlar[1]->Visible;
if($visible2=="Visible"){
	$visible2 = 1;
} else {
	$visible2 = 0;
}

$oran_visible = $oranlar->o;

$json['live']['11306'] = array("tempid"=>"11306","N2"=>"".getTranslation('basketboloran40')."","N"=>"3.Çeyrek Handikap","id"=>"27","o"=>$oran_visible);

$json['live']['11306']['games'][] = array(
"Id"=>"60",
"EGID"=>"27",
"hcoun"=>"5",
"Namexxx"=>"1 ".$ev_sahibi_handikap."","Name"=>"1 ".$ev_sahibi_handikap."",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"11306"
);

$json['live']['11306']['games'][] = array(
"Id"=>"61",
"EGID"=>"27",
"hcoun"=>"3",
"Namexxx"=>"2 ".$deplasman_handikap."","Name"=>"2 ".$deplasman_handikap."",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"11306"
);

}

if($GameTemplateId == 2837) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"4.Çeyrek Handikap","basketbol");
$oran2 = dusenoranbulcanli($oran2_ver,"4.Çeyrek Handikap","basketbol");

$ev_sahibi_handikap = $icoranlar[0]->attr;
$deplasman_handikap = $icoranlar[1]->attr;

$visible1 = $icoranlar[0]->Visible;
if($visible1=="Visible"){
	$visible1 = 1;
} else {
	$visible1 = 0;
}
$visible2 = $icoranlar[1]->Visible;
if($visible2=="Visible"){
	$visible2 = 1;
} else {
	$visible2 = 0;
}

$oran_visible = $oranlar->o;

$json['live']['2837'] = array("tempid"=>"2837","N2"=>"".getTranslation('basketboloran41')."","N"=>"4.Çeyrek Handikap","id"=>"28","o"=>$oran_visible);

$json['live']['2837']['games'][] = array(
"Id"=>"62",
"EGID"=>"28",
"hcoun"=>"5",
"Namexxx"=>"1 ".$ev_sahibi_handikap."","Name"=>"1 ".$ev_sahibi_handikap."",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"2837"
);

$json['live']['2837']['games'][] = array(
"Id"=>"63",
"EGID"=>"28",
"hcoun"=>"3",
"Namexxx"=>"2 ".$deplasman_handikap."","Name"=>"2 ".$deplasman_handikap."",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"2837"
);

}


if($GameTemplateId == 12173) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"1.Yarı Toplam Tek/Çift","basketbol");
$oran2 = dusenoranbulcanli($oran2_ver,"1.Yarı Toplam Tek/Çift","basketbol");

$visible1 = $icoranlar[0]->Visible;
if($visible1=="Visible"){
	$visible1 = 1;
} else {
	$visible1 = 0;
}
$visible2 = $icoranlar[1]->Visible;
if($visible2=="Visible"){
	$visible2 = 1;
} else {
	$visible2 = 0;
}

$oran_visible = $oranlar->o;

$json['live']['12173'] = array("tempid"=>"12173","N2"=>"".getTranslation('basketboloran19')."","N"=>"1.Yarı Toplam Tek/Çift","id"=>"29","o"=>$oran_visible);

$json['live']['12173']['games'][] = array(
"Id"=>"64",
"EGID"=>"29",
"hcoun"=>"5",
"Namexxx"=>"".getTranslation('oransecenek28')."","Name"=>"Tek",
"Name1X2"=>"T",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"12173"
);

$json['live']['12173']['games'][] = array(
"Id"=>"65",
"EGID"=>"29",
"hcoun"=>"3",
"Namexxx"=>"".getTranslation('oransecenek29')."","Name"=>"Çift",
"Name1X2"=>"Ç",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"12173"
);

}

if($GameTemplateId == 12174) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"2.Yarı Toplam Tek/Çift","basketbol");
$oran2 = dusenoranbulcanli($oran2_ver,"2.Yarı Toplam Tek/Çift","basketbol");

$visible1 = $icoranlar[0]->Visible;
if($visible1=="Visible"){
	$visible1 = 1;
} else {
	$visible1 = 0;
}
$visible2 = $icoranlar[1]->Visible;
if($visible2=="Visible"){
	$visible2 = 1;
} else {
	$visible2 = 0;
}

$oran_visible = $oranlar->o;

$json['live']['12174'] = array("tempid"=>"12174","N2"=>"".getTranslation('basketboloran42')."","N"=>"2.Yarı Toplam Tek/Çift","id"=>"30","o"=>$oran_visible);

$json['live']['12174']['games'][] = array(
"Id"=>"66",
"EGID"=>"30",
"hcoun"=>"5",
"Namexxx"=>"".getTranslation('oransecenek28')."","Name"=>"Tek",
"Name1X2"=>"T",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"12174"
);

$json['live']['12174']['games'][] = array(
"Id"=>"67",
"EGID"=>"30",
"hcoun"=>"3",
"Namexxx"=>"".getTranslation('oransecenek29')."","Name"=>"Çift",
"Name1X2"=>"Ç",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"12174"
);

}

if($GameTemplateId == 12140) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"1.Çeyrek Toplam Tek/Çift","basketbol");
$oran2 = dusenoranbulcanli($oran2_ver,"1.Çeyrek Toplam Tek/Çift","basketbol");

$visible1 = $icoranlar[0]->Visible;
if($visible1=="Visible"){
	$visible1 = 1;
} else {
	$visible1 = 0;
}
$visible2 = $icoranlar[1]->Visible;
if($visible2=="Visible"){
	$visible2 = 1;
} else {
	$visible2 = 0;
}

$oran_visible = $oranlar->o;

$json['live']['12140'] = array("tempid"=>"12140","N2"=>"".getTranslation('basketboloran18')."","N"=>"1.Çeyrek Toplam Tek/Çift","id"=>"31","o"=>$oran_visible);

$json['live']['12140']['games'][] = array(
"Id"=>"68",
"EGID"=>"31",
"hcoun"=>"5",
"Namexxx"=>"".getTranslation('oransecenek28')."","Name"=>"Tek",
"Name1X2"=>"T",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"12140"
);

$json['live']['12140']['games'][] = array(
"Id"=>"69",
"EGID"=>"31",
"hcoun"=>"3",
"Namexxx"=>"".getTranslation('oransecenek29')."","Name"=>"Çift",
"Name1X2"=>"Ç",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"12140"
);

}

if($GameTemplateId == 12141) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"2.Çeyrek Toplam Tek/Çift","basketbol");
$oran2 = dusenoranbulcanli($oran2_ver,"2.Çeyrek Toplam Tek/Çift","basketbol");

$visible1 = $icoranlar[0]->Visible;
if($visible1=="Visible"){
	$visible1 = 1;
} else {
	$visible1 = 0;
}
$visible2 = $icoranlar[1]->Visible;
if($visible2=="Visible"){
	$visible2 = 1;
} else {
	$visible2 = 0;
}

$oran_visible = $oranlar->o;

$json['live']['12141'] = array("tempid"=>"12141","N2"=>"".getTranslation('basketboloran43')."","N"=>"2.Çeyrek Toplam Tek/Çift","id"=>"32","o"=>$oran_visible);

$json['live']['12141']['games'][] = array(
"Id"=>"70",
"EGID"=>"32",
"hcoun"=>"5",
"Namexxx"=>"".getTranslation('oransecenek28')."","Name"=>"Tek",
"Name1X2"=>"T",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"12141"
);

$json['live']['12141']['games'][] = array(
"Id"=>"71",
"EGID"=>"32",
"hcoun"=>"3",
"Namexxx"=>"".getTranslation('oransecenek29')."","Name"=>"Çift",
"Name1X2"=>"Ç",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"12141"
);

}

if($GameTemplateId == 12142) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"3.Çeyrek Toplam Tek/Çift","basketbol");
$oran2 = dusenoranbulcanli($oran2_ver,"3.Çeyrek Toplam Tek/Çift","basketbol");

$visible1 = $icoranlar[0]->Visible;
if($visible1=="Visible"){
	$visible1 = 1;
} else {
	$visible1 = 0;
}
$visible2 = $icoranlar[1]->Visible;
if($visible2=="Visible"){
	$visible2 = 1;
} else {
	$visible2 = 0;
}

$oran_visible = $oranlar->o;

$json['live']['12142'] = array("tempid"=>"12142","N2"=>"".getTranslation('basketboloran44')."","N"=>"3.Çeyrek Toplam Tek/Çift","id"=>"33","o"=>$oran_visible);

$json['live']['12142']['games'][] = array(
"Id"=>"72",
"EGID"=>"33",
"hcoun"=>"5",
"Namexxx"=>"".getTranslation('oransecenek28')."","Name"=>"Tek",
"Name1X2"=>"T",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"12142"
);

$json['live']['12142']['games'][] = array(
"Id"=>"73",
"EGID"=>"33",
"hcoun"=>"3",
"Namexxx"=>"".getTranslation('oransecenek29')."","Name"=>"Çift",
"Name1X2"=>"Ç",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"12142"
);

}

if($GameTemplateId == 12143) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"4.Çeyrek Toplam Tek/Çift","basketbol");
$oran2 = dusenoranbulcanli($oran2_ver,"4.Çeyrek Toplam Tek/Çift","basketbol");

$visible1 = $icoranlar[0]->Visible;
if($visible1=="Visible"){
	$visible1 = 1;
} else {
	$visible1 = 0;
}
$visible2 = $icoranlar[1]->Visible;
if($visible2=="Visible"){
	$visible2 = 1;
} else {
	$visible2 = 0;
}

$oran_visible = $oranlar->o;

$json['live']['12143'] = array("tempid"=>"12143","N2"=>"".getTranslation('basketboloran45')."","N"=>"4.Çeyrek Toplam Tek/Çift","id"=>"34","o"=>$oran_visible);

$json['live']['12143']['games'][] = array(
"Id"=>"74",
"EGID"=>"34",
"hcoun"=>"5",
"Namexxx"=>"".getTranslation('oransecenek28')."","Name"=>"Tek",
"Name1X2"=>"T",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"12143"
);

$json['live']['12143']['games'][] = array(
"Id"=>"75",
"EGID"=>"34",
"hcoun"=>"3",
"Namexxx"=>"".getTranslation('oransecenek29')."","Name"=>"Çift",
"Name1X2"=>"Ç",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"12143"
);

}

if($GameTemplateId == 7970) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Toplam Tek/Çift","basketbol");
$oran2 = dusenoranbulcanli($oran2_ver,"Toplam Tek/Çift","basketbol");

$visible1 = $icoranlar[0]->Visible;
if($visible1=="Visible"){
	$visible1 = 1;
} else {
	$visible1 = 0;
}
$visible2 = $icoranlar[1]->Visible;
if($visible2=="Visible"){
	$visible2 = 1;
} else {
	$visible2 = 0;
}

$oran_visible = $oranlar->o;

$json['live']['7970'] = array("tempid"=>"7970","N2"=>"".getTranslation('basketboloran46')."","N"=>"Toplam Tek/Çift","id"=>"35","o"=>$oran_visible);

$json['live']['7970']['games'][] = array(
"Id"=>"76",
"EGID"=>"35",
"hcoun"=>"5",
"Namexxx"=>"".getTranslation('oransecenek28')."","Name"=>"Tek",
"Name1X2"=>"T",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"7970"
);

$json['live']['7970']['games'][] = array(
"Id"=>"77",
"EGID"=>"35",
"hcoun"=>"3",
"Namexxx"=>"".getTranslation('oransecenek29')."","Name"=>"Çift",
"Name1X2"=>"Ç",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"7970"
);

}

if($GameTemplateId == 13974) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"1.Yarı Kim Kazanır","basketbol");
$oran2 = dusenoranbulcanli($oran2_ver,"1.Yarı Kim Kazanır","basketbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;

$json['live']['13974'] = array("tempid"=>"13974","N2"=>"".getTranslation('basketboloran47')."","N"=>"1.Yarı Kim Kazanır","id"=>"36","o"=>$oran_visible);

$json['live']['13974']['games'][] = array(
"Id"=>"78",
"EGID"=>"36",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"13974"
);

$json['live']['13974']['games'][] = array(
"Id"=>"79",
"EGID"=>"36",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"13974"
);

}

if($GameTemplateId == 7764) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"2.Yarı Kim Kazanır","basketbol");
$oran2 = dusenoranbulcanli($oran2_ver,"2.Yarı Kim Kazanır","basketbol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;

$json['live']['7764'] = array("tempid"=>"7764","N2"=>"".getTranslation('basketboloran48')."","N"=>"2.Yarı Kim Kazanır","id"=>"37","o"=>$oran_visible);

$json['live']['7764']['games'][] = array(
"Id"=>"80",
"EGID"=>"37",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"7764"
);

$json['live']['7764']['games'][] = array(
"Id"=>"81",
"EGID"=>"37",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"7764"
);

}



}

}

if($karsilasmayok==0){
$json = array("eid"=>0);
echo json_encode($json);
} else {
echo json_encode($json);
}

}

}  else if($sportipi=="5"){

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
$karsilasmayok++;
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
$count_sayisi_ver = "255";

$evtakim = $match->h;
$deptakim = $match->a;
$betradarid = $match->radarid;
$lig_id = $match->lid;
$lig_adi = $match->lig;
$ulke_id = $match->uid;
$ulke_adi = $match->ulke;
$baslangic_tarih2 = $match->sdate;
$baslangic_saat2 = $match->sht;
$periodId = $match->pid;

$sayi_ver_255 = 255;
$sayi_ver_0 = 0;
$sayi_ver_1 = 1;
$sayi_ver_2 = 2;

## EV SKORLARI ##
$ev1c = $match->ev1c;
$ev2c = $match->ev2c;
$ev3c = $match->ev3c;
## DEP SKORLARI ##
$dep1c = $match->dep1c;
$dep2c = $match->dep2c;
$dep3c = $match->dep3c;

$evskor_verdim = 0;
$depskor_verdim = 0;
$evskor_ver = 0;
$depskor_ver = 0;

if($periodId == 2){

if($ev1c>$dep1c){
	$evskor_ver = 1;
	$depskor_ver = 0;
} else if($ev1c<$dep1c){
	$depskor_ver = 1;
	$evskor_ver = 0;
}

$evskor_verdim = $evskor_ver;
$depskor_verdim = $depskor_ver;

}

if($periodId == 3){

if($ev1c>$dep1c){
	$evskor_ver = 1;
	$depskor_ver = 0;
} else if($ev1c<$dep1c){
	$depskor_ver = 1;
	$evskor_ver = 0;
}

if($ev2c>$dep2c){
	$evskor_ver_2 = 1;
	$depskor_ver_2 = 0;
} else if($ev2c<$dep2c){
	$depskor_ver_2 = 1;
	$evskor_ver_2 = 0;
}

$evskor_verdim = $evskor_ver+$evskor_ver_2;
$depskor_verdim = $depskor_ver+$depskor_ver_2;

}

if($periodId > 4){

if($ev1c>$dep1c){
	$evskor_ver = 1;
	$depskor_ver = 0;
} else if($ev1c<$dep1c){
	$depskor_ver = 1;
	$evskor_ver = 0;
}

if($ev2c>$dep2c){
	$evskor_ver_2 = 1;
	$depskor_ver_2 = 0;
} else if($ev2c<$dep2c){
	$depskor_ver_2 = 1;
	$evskor_ver_2 = 0;
}

if($ev3c>$dep3c){
	$evskor_ver_3 = 1;
	$depskor_ver_3 = 0;
} else if($ev3c<$dep3c){
	$depskor_ver_3 = 1;
	$evskor_ver_3 = 0;
}

$evskor_verdim = $evskor_ver+$evskor_ver_2+$evskor_ver_3;
$depskor_verdim = $depskor_ver+$depskor_ver_2+$depskor_ver_3;

}

$skor_ev_ver = $evskor_verdim;
$skor_dep_ver = $depskor_verdim;

if($skor_ev_ver>0){ $skor_ev = $skor_ev_ver; } else { $skor_ev = 0; }
if($skor_dep_ver>0){ $skor_dep = $skor_dep_ver; } else { $skor_dep = 0; }

$dakika_ver_simdi = "00";
$saniye_ver_simdi = "00";

if($ev_tisort && $ev_sort && $konuk_tisort && $konuk_sort){
$json = array(
"eid"=>$mac_id,
"prv"=>"0",
"n"=>"".$evtakim." - ".$deptakim."",
"spid"=>"5",
"spidname"=>"Tenis",
"lid"=>"".$lig_id."",
"lig"=>$lig_adi,
"h"=>$evtakim,
"a"=>$deptakim,
"hshtcolor"=>"",
"htshtcolor"=>"",
"ashtcolor"=>"",
"atshtcolor"=>"",
"run"=>true,
"actionts"=>"",
"referedate"=>"0",
"secound"=>"0",
"reftime"=>"",
"reftimet"=>"",
"addicon"=>"",
"tvisible"=>true,
"tv"=>"",
"pid"=>"".$periodId."",
"dk"=>"".$dakika_ver_simdi."",
"sn"=>"".$saniye_ver_simdi."",
"uid"=>"".$ulke_id."",
"ulke"=>$ulke_adi,
"sdate"=>"".$baslangic_tarih2."",
"sht"=>"".$baslangic_saat2."",
"radarid"=>"".$betradarid."",
"smid"=>"",
"gseri"=>"0",
"sch"=>"".$skor_ev."",
"sca"=>"".$skor_dep."",
"isch"=>"0",
"isca"=>"0",
"crnh"=>"0",
"crna"=>"0",
"redh"=>"0",
"reda"=>"0",
"serph"=>"0",
"serpa"=>"0",
"ycardh"=>"0",
"ycarda"=>"0",
"pnlth"=>"0",
"pnlta"=>"0",
"turn"=>"0",
"periodsh"=>["1"=>$ev1c,"2"=>$ev2c,"3"=>$ev3c,"4"=>"0","5"=>"0","6"=>"0","7"=>"0"],
"periodsa"=>["1"=>$dep1c,"2"=>$dep2c,"3"=>$dep3c,"4"=>"0","5"=>"0","6"=>"0","7"=>"0"],
"turnvis"=>""
);
}

foreach($match->Msg as $keysss => $messagesver){
$mesajtypesi = $messagesver->type;
$mesajteam = $messagesver->team;
$mesajtime = $messagesver->dk;
$aciklamasi = $messagesver->N;

$json['Msg'][] = array("id"=>$keysss,"type"=>$mesajtypesi,"dk"=>$mesajtime,"team"=>$mesajteam,"N"=>$aciklamasi);

}

foreach($match->oran as $oranlar){
$GameTemplateId = $oranlar->tempid;
$icoranlar = $oranlar->rest;

## period id 6 ##
if($periodId!=6){

if($GameTemplateId == 62) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Kim Kazanır","tenis");
$oran2 = dusenoranbulcanli($oran2_ver,"Kim Kazanır","tenis");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;

$json['live']['62'] = array("tempid"=>"62","N2"=>"".getTranslation('tenisoran1')."","N"=>"Kim Kazanır","id"=>"1","o"=>$oran_visible);

$json['live']['62']['games'][] = array(
"Id"=>"1",
"EGID"=>"1",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"62"
);

$json['live']['62']['games'][] = array(
"Id"=>"2",
"EGID"=>"1",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"62"
);

}

if($GameTemplateId == 79) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);
$oran4_ver = number_format($icoranlar[3]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Set Bahisi","tenis");
$oran2 = dusenoranbulcanli($oran2_ver,"Set Bahisi","tenis");
$oran3 = dusenoranbulcanli($oran3_ver,"Set Bahisi","tenis");
$oran4 = dusenoranbulcanli($oran4_ver,"Set Bahisi","tenis");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;
$visible4 = $icoranlar[3]->Visible;

$oran_visible = $oranlar->o;

$json['live']['79'] = array("tempid"=>"79","N2"=>"".getTranslation('tenisoran2')."","N"=>"Set Bahisi","id"=>"2","o"=>$oran_visible);

$json['live']['79']['games'][] = array(
"Id"=>"1",
"EGID"=>"2",
"Namexxx"=>"2:0","Name"=>"2:0",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"79"
);

$json['live']['79']['games'][] = array(
"Id"=>"2",
"EGID"=>"2",
"Namexxx"=>"2:1","Name"=>"2:1",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"79"
);

$json['live']['79']['games'][] = array(
"Id"=>"3",
"EGID"=>"2",
"Namexxx"=>"1:2","Name"=>"1:2",
"Name1X2"=>"",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"79"
);

$json['live']['79']['games'][] = array(
"Id"=>"4",
"EGID"=>"2",
"Namexxx"=>"0:2","Name"=>"0:2",
"Name1X2"=>"",
"Visible"=>$visible4,
"Odds"=>"".$oran4."",
"templateId"=>"79"
);

}

}
## period id 6 ##

}

}

if($karsilasmayok==0){
$json = array("eid"=>0);
echo json_encode($json);
} else {
echo json_encode($json);
}

}

} else if($sportipi=="18"){

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
$karsilasmayok++;
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
$count_sayisi_ver = "255";

$evtakim = $match->h;
$deptakim = $match->a;
$betradarid = $match->radarid;
$lig_id = $match->lid;
$lig_adi = $match->lig;
$ulke_id = $match->uid;
$ulke_adi = $match->ulke;
$baslangic_tarih2 = $match->sdate;
$baslangic_saat2 = $match->sht;
$periodId = $match->pid;

$sayi_ver_255 = 255;
$sayi_ver_0 = 0;
$sayi_ver_1 = 1;
$sayi_ver_2 = 2;
$sayi_ver_3 = 3;
$sayi_ver_4 = 4;

## EV SKORLARI ##
$ev1c = $match->ev1c;
$ev2c = $match->ev2c;
$ev3c = $match->ev3c;
$ev4c = $match->ev4c;
$ev5c = $match->ev5c;
## DEP SKORLARI ##
$dep1c = $match->dep1c;
$dep2c = $match->dep2c;
$dep3c = $match->dep3c;
$dep4c = $match->dep4c;
$dep5c = $match->dep5c;

$evskor_ver = 0;
$depskor_ver = 0;

if($periodId == 2){ if($ev1c>$dep1c){ $evskor_ver++; } else if($ev1c<$dep1c){ $depskor_ver++; } }

if($periodId == 3){ if($ev1c>$dep1c){ $evskor_ver++; } else if($ev1c<$dep1c){ $depskor_ver++; } }

if($periodId == 4){ if($ev1c>$dep1c){ $evskor_ver++; } else if($ev1c<$dep1c){ $depskor_ver++; } if($ev2c>$dep2c){ $evskor_ver++; } else if($ev2c<$dep2c){ $depskor_ver++; } }

if($periodId == 5){ if($ev1c>$dep1c){ $evskor_ver++; } else if($ev1c<$dep1c){ $depskor_ver++; } if($ev2c>$dep2c){ $evskor_ver++; } else if($ev2c<$dep2c){ $depskor_ver++; } }

if($periodId == 6){ if($ev1c>$dep1c){ $evskor_ver++; } else if($ev1c<$dep1c){ $depskor_ver++; } if($ev2c>$dep2c){ $evskor_ver++; } else if($ev2c<$dep2c){ $depskor_ver++; } if($ev3c>$dep3c){ $evskor_ver++; } else if($ev3c<$dep3c){ $depskor_ver++; } }

if($periodId == 7){ if($ev1c>$dep1c){ $evskor_ver++; } else if($ev1c<$dep1c){ $depskor_ver++; } if($ev2c>$dep2c){ $evskor_ver++; } else if($ev2c<$dep2c){ $depskor_ver++; } if($ev3c>$dep3c){ $evskor_ver++; } else if($ev3c<$dep3c){ $depskor_ver++; } }

if($periodId == 8){ if($ev1c>$dep1c){ $evskor_ver++; } else if($ev1c<$dep1c){ $depskor_ver++; } if($ev2c>$dep2c){ $evskor_ver++; } else if($ev2c<$dep2c){ $depskor_ver++; } if($ev3c>$dep3c){ $evskor_ver++; } else if($ev3c<$dep3c){ $depskor_ver++; } if($ev4c>$dep4c){ $evskor_ver++; } else if($ev4c<$dep4c){ $depskor_ver++; } }

if($periodId >8){ if($ev1c>$dep1c){ $evskor_ver++; } else if($ev1c<$dep1c){ $depskor_ver++; } if($ev2c>$dep2c){ $evskor_ver++; } else if($ev2c<$dep2c){ $depskor_ver++; } if($ev3c>$dep3c){ $evskor_ver++; } else if($ev3c<$dep3c){ $depskor_ver++; } if($ev4c>$dep4c){ $evskor_ver++; } else if($ev4c<$dep4c){ $depskor_ver++; } if($ev5c>$dep5c){ $evskor_ver++; } else if($ev5c<$dep5c){ $depskor_ver++; } }

$skor_ev_ver = $evskor_ver;
$skor_dep_ver = $depskor_ver;

if($skor_ev_ver>0){ $skor_ev = $skor_ev_ver; } else { $skor_ev = 0; }
if($skor_dep_ver>0){ $skor_dep = $skor_dep_ver; } else { $skor_dep = 0; }

$dakika_ver_simdi = "00";
$saniye_ver_simdi = "00";

if($ev_tisort && $ev_sort && $konuk_tisort && $konuk_sort){
$json = array(
"eid"=>$mac_id,
"prv"=>"0",
"n"=>"".$evtakim." - ".$deptakim."",
"spid"=>"18",
"spidname"=>"Voleybol",
"lid"=>"".$lig_id."",
"lig"=>$lig_adi,
"h"=>$evtakim,
"a"=>$deptakim,
"hshtcolor"=>"",
"htshtcolor"=>"",
"ashtcolor"=>"",
"atshtcolor"=>"",
"run"=>true,
"actionts"=>"",
"referedate"=>"0",
"secound"=>"0",
"reftime"=>"",
"reftimet"=>"",
"addicon"=>"",
"tvisible"=>true,
"tv"=>"",
"pid"=>"".$periodId."",
"dk"=>"".$dakika_ver_simdi."",
"sn"=>"".$saniye_ver_simdi."",
"uid"=>"".$ulke_id."",
"ulke"=>$ulke_adi,
"sdate"=>"".$baslangic_tarih2."",
"sht"=>"".$baslangic_saat2."",
"radarid"=>"".$betradarid."",
"smid"=>"",
"gseri"=>"0",
"sch"=>"".$skor_ev."",
"sca"=>"".$skor_dep."",
"isch"=>"0",
"isca"=>"0",
"crnh"=>"0",
"crna"=>"0",
"redh"=>"0",
"reda"=>"0",
"serph"=>"0",
"serpa"=>"0",
"ycardh"=>"0",
"ycarda"=>"0",
"pnlth"=>"0",
"pnlta"=>"0",
"turn"=>"0",
"periodsh"=>["1"=>$ev1c,"2"=>$ev2c,"3"=>$ev3c,"4"=>$ev4c,"5"=>$ev5c,"6"=>"0","7"=>"0"],
"periodsa"=>["1"=>$dep1c,"2"=>$dep2c,"3"=>$dep3c,"4"=>$dep4c,"5"=>$dep5c,"6"=>"0","7"=>"0"],
"turnvis"=>""
);
}

foreach($match->Msg as $keysss => $messagesver){
$mesajtypesi = $messagesver->type;
$mesajteam = $messagesver->team;
$mesajtime = $messagesver->dk;
$aciklamasi = $messagesver->N;

$json['Msg'][] = array("id"=>$keysss,"type"=>$mesajtypesi,"N"=>$aciklamasi);

}

foreach($match->oran as $oranlar){
$GameTemplateId = $oranlar->tempid;
$icoranlar = $oranlar->rest;

if($GameTemplateId == 1545) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Kim Kazanır","voleybol");
$oran2 = dusenoranbulcanli($oran2_ver,"Kim Kazanır","voleybol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;

$json['live']['1545'] = array("tempid"=>"1545","N2"=>"".getTranslation('voleyboloran1')."","N"=>"Kim Kazanır","id"=>"1","o"=>$oran_visible);

$json['live']['1545']['games'][] = array(
"Id"=>"1",
"EGID"=>"1",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"1545"
);

$json['live']['1545']['games'][] = array(
"Id"=>"2",
"EGID"=>"1",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"1545"
);

}

if($GameTemplateId == 1547) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"1.Seti Kim Kazanır ?","voleybol");
$oran2 = dusenoranbulcanli($oran2_ver,"1.Seti Kim Kazanır ?","voleybol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;

$json['live']['1547'] = array("tempid"=>"1547","N2"=>"".getTranslation('voleyboloran5')."","N"=>"1.Seti Kim Kazanır ?","id"=>"2","o"=>$oran_visible);

$json['live']['1547']['games'][] = array(
"Id"=>"3",
"EGID"=>"2",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"1547"
);

$json['live']['1547']['games'][] = array(
"Id"=>"4",
"EGID"=>"2",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"1547"
);

}

if($GameTemplateId == 8263) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"2.Seti Kim Kazanır ?","voleybol");
$oran2 = dusenoranbulcanli($oran2_ver,"2.Seti Kim Kazanır ?","voleybol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;

$json['live']['8263'] = array("tempid"=>"8263","N2"=>"".getTranslation('voleyboloran6')."","N"=>"2.Seti Kim Kazanır ?","id"=>"3","o"=>$oran_visible);

$json['live']['8263']['games'][] = array(
"Id"=>"5",
"EGID"=>"3",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"8263"
);

$json['live']['8263']['games'][] = array(
"Id"=>"6",
"EGID"=>"3",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"8263"
);

}

if($GameTemplateId == 1550) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"3.Seti Kim Kazanır ?","voleybol");
$oran2 = dusenoranbulcanli($oran2_ver,"3.Seti Kim Kazanır ?","voleybol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;

$json['live']['1550'] = array("tempid"=>"1550","N2"=>"".getTranslation('voleyboloran7')."","N"=>"3.Seti Kim Kazanır ?","id"=>"4","o"=>$oran_visible);

$json['live']['1550']['games'][] = array(
"Id"=>"7",
"EGID"=>"4",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"1550"
);

$json['live']['1550']['games'][] = array(
"Id"=>"8",
"EGID"=>"4",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"1550"
);

}

if($GameTemplateId == 1551) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"4.Seti Kim Kazanır ?","voleybol");
$oran2 = dusenoranbulcanli($oran2_ver,"4.Seti Kim Kazanır ?","voleybol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;

$json['live']['1551'] = array("tempid"=>"1551","N2"=>"".getTranslation('voleyboloran8')."","N"=>"4.Seti Kim Kazanır ?","id"=>"5","o"=>$oran_visible);

$json['live']['1551']['games'][] = array(
"Id"=>"9",
"EGID"=>"5",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"1551"
);

$json['live']['1551']['games'][] = array(
"Id"=>"10",
"EGID"=>"5",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"1551"
);

}

if($GameTemplateId == 499) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);
$oran4_ver = number_format($icoranlar[3]->Odds,2);
$oran5_ver = number_format($icoranlar[4]->Odds,2);
$oran6_ver = number_format($icoranlar[5]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Set bahisi (5 maç üzerinden)","voleybol");
$oran2 = dusenoranbulcanli($oran2_ver,"Set bahisi (5 maç üzerinden)","voleybol");
$oran3 = dusenoranbulcanli($oran3_ver,"Set bahisi (5 maç üzerinden)","voleybol");
$oran4 = dusenoranbulcanli($oran4_ver,"Set bahisi (5 maç üzerinden)","voleybol");
$oran5 = dusenoranbulcanli($oran5_ver,"Set bahisi (5 maç üzerinden)","voleybol");
$oran6 = dusenoranbulcanli($oran6_ver,"Set bahisi (5 maç üzerinden)","voleybol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;
$visible4 = $icoranlar[3]->Visible;
$visible5 = $icoranlar[4]->Visible;
$visible6 = $icoranlar[5]->Visible;

$oran_visible = $oranlar->o;

$json['live']['499'] = array("tempid"=>"499","N2"=>"".getTranslation('voleyboloran9')."","N"=>"Set bahisi (5 maç üzerinden)","id"=>"6","o"=>$oran_visible);

$json['live']['499']['games'][] = array(
"Id"=>"11",
"EGID"=>"6",
"Namexxx"=>"3:0","Name"=>"3:0",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"499"
);

$json['live']['499']['games'][] = array(
"Id"=>"12",
"EGID"=>"6",
"Namexxx"=>"3:1","Name"=>"3:1",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"499"
);

$json['live']['499']['games'][] = array(
"Id"=>"13",
"EGID"=>"6",
"Namexxx"=>"3:2","Name"=>"3:2",
"Name1X2"=>"",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"499"
);

$json['live']['499']['games'][] = array(
"Id"=>"14",
"EGID"=>"6",
"Namexxx"=>"2:3","Name"=>"2:3",
"Name1X2"=>"",
"Visible"=>$visible4,
"Odds"=>"".$oran4."",
"templateId"=>"499"
);

$json['live']['499']['games'][] = array(
"Id"=>"15",
"EGID"=>"6",
"Namexxx"=>"1:3","Name"=>"1:3",
"Name1X2"=>"",
"Visible"=>$visible5,
"Odds"=>"".$oran5."",
"templateId"=>"499"
);

$json['live']['499']['games'][] = array(
"Id"=>"16",
"EGID"=>"6",
"Namexxx"=>"0:3","Name"=>"0:3",
"Name1X2"=>"",
"Visible"=>$visible6,
"Odds"=>"".$oran6."",
"templateId"=>"499"
);

}

if($GameTemplateId == 6355) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Toplam Kaç Set Oynanır ?","voleybol");
$oran2 = dusenoranbulcanli($oran2_ver,"Toplam Kaç Set Oynanır ?","voleybol");
$oran3 = dusenoranbulcanli($oran3_ver,"Toplam Kaç Set Oynanır ?","voleybol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;

$json['live']['6355'] = array("tempid"=>"6355","N2"=>"".getTranslation('voleyboloran10')."","N"=>"Toplam Kaç Set Oynanır ?","id"=>"7","o"=>$oran_visible);

$json['live']['6355']['games'][] = array(
"Id"=>"17",
"EGID"=>"7",
"Namexxx"=>"3","Name"=>"3",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"6355"
);

$json['live']['6355']['games'][] = array(
"Id"=>"18",
"EGID"=>"7",
"Namexxx"=>"4","Name"=>"4",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"6355"
);

$json['live']['6355']['games'][] = array(
"Id"=>"19",
"EGID"=>"7",
"Namexxx"=>"5","Name"=>"5",
"Name1X2"=>"",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"6355"
);

}

if($GameTemplateId == 31887) {
$oran2_ver = number_format($icoranlar[0]->Odds,2);
$oran1_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"1.Takım Toplam Sayı Alt/Üst","voleybol");
$oran2 = dusenoranbulcanli($oran2_ver,"1.Takım Toplam Sayı Alt/Üst","voleybol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$alt_ust_getir = $icoranlar[0]->Name;
$alt_ust_bol = explode(" ",$alt_ust_getir);
$ust_ver = $alt_ust_bol[1];

if($ust_ver != ''){
$oran_visible = $oranlar->o;

$json['live']['31887'] = array("tempid"=>"31887","N2"=>"".getTranslation('voleyboloran11')."","N"=>"1.Takım Toplam Sayı Alt/Üst","id"=>"8","o"=>$oran_visible);

$json['live']['31887']['games'][] = array(
"Id"=>"20",
"EGID"=>"8",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." ".$ust_ver."","Name"=>"Alt ".$ust_ver."",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"31887"
);

$json['live']['31887']['games'][] = array(
"Id"=>"21",
"EGID"=>"8",
"hcoun"=>"9",
"Namexxx"=>"".getTranslation('oransecenek30')." ".$ust_ver."","Name"=>"Üst ".$ust_ver."",
"Name1X2"=>"+",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"31887"
);

}

}

if($GameTemplateId == 31894) {
$oran2_ver = number_format($icoranlar[0]->Odds,2);
$oran1_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"2.Takım Toplam Sayı Alt/Üst","voleybol");
$oran2 = dusenoranbulcanli($oran2_ver,"2.Takım Toplam Sayı Alt/Üst","voleybol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$alt_ust_getir = $icoranlar[0]->Name;
$alt_ust_bol = explode(" ",$alt_ust_getir);
$ust_ver = $alt_ust_bol[1];

if($ust_ver != ''){
$oran_visible = $oranlar->o;

$json['live']['31894'] = array("tempid"=>"31894","N2"=>"".getTranslation('voleyboloran12')."","N"=>"2.Takım Toplam Sayı Alt/Üst","id"=>"9","o"=>$oran_visible);

$json['live']['31894']['games'][] = array(
"Id"=>"22",
"EGID"=>"9",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." ".$ust_ver."","Name"=>"Alt ".$ust_ver."",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"31894"
);

$json['live']['31894']['games'][] = array(
"Id"=>"23",
"EGID"=>"9",
"hcoun"=>"9",
"Namexxx"=>"".getTranslation('oransecenek30')." ".$ust_ver."","Name"=>"Üst ".$ust_ver."",
"Name1X2"=>"+",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"31894"
);

}

}

if($GameTemplateId == 31881) {
$oran2_ver = number_format($icoranlar[0]->Odds,2);
$oran1_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"1.Takım 1.Set Toplam Sayı Alt/Üst","voleybol");
$oran2 = dusenoranbulcanli($oran2_ver,"1.Takım 1.Set Toplam Sayı Alt/Üst","voleybol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$alt_ust_getir = $icoranlar[0]->Name;
$alt_ust_bol = explode(" ",$alt_ust_getir);
$ust_ver = $alt_ust_bol[1];

if($ust_ver != ''){
$oran_visible = $oranlar->o;

$json['live']['31881'] = array("tempid"=>"31881","N2"=>"".getTranslation('voleyboloran13')."","N"=>"1.Takım 1.Set Toplam Sayı Alt/Üst","id"=>"10","o"=>$oran_visible);

$json['live']['31881']['games'][] = array(
"Id"=>"24",
"EGID"=>"10",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." ".$ust_ver."","Name"=>"Alt ".$ust_ver."",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"31881"
);

$json['live']['31881']['games'][] = array(
"Id"=>"25",
"EGID"=>"10",
"hcoun"=>"9",
"Namexxx"=>"".getTranslation('oransecenek30')." ".$ust_ver."","Name"=>"Üst ".$ust_ver."",
"Name1X2"=>"+",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"31881"
);

}

}

if($GameTemplateId == 31888) {
$oran2_ver = number_format($icoranlar[0]->Odds,2);
$oran1_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"2.Takım 1.Set Toplam Sayı Alt/Üst","voleybol");
$oran2 = dusenoranbulcanli($oran2_ver,"2.Takım 1.Set Toplam Sayı Alt/Üst","voleybol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$alt_ust_getir = $icoranlar[0]->Name;
$alt_ust_bol = explode(" ",$alt_ust_getir);
$ust_ver = $alt_ust_bol[1];

if($ust_ver != ''){
$oran_visible = $oranlar->o;

$json['live']['31888'] = array("tempid"=>"31888","N2"=>"".getTranslation('voleyboloran14')."","N"=>"2.Takım 1.Set Toplam Sayı Alt/Üst","id"=>"11","o"=>$oran_visible);

$json['live']['31888']['games'][] = array(
"Id"=>"26",
"EGID"=>"11",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." ".$ust_ver."","Name"=>"Alt ".$ust_ver."",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"31888"
);

$json['live']['31888']['games'][] = array(
"Id"=>"27",
"EGID"=>"11",
"hcoun"=>"9",
"Namexxx"=>"".getTranslation('oransecenek30')." ".$ust_ver."","Name"=>"Üst ".$ust_ver."",
"Name1X2"=>"+",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"31888"
);

}

}

if($GameTemplateId == 31882) {
$oran2_ver = number_format($icoranlar[0]->Odds,2);
$oran1_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"1.Takım 2.Set Toplam Sayı Alt/Üst","voleybol");
$oran2 = dusenoranbulcanli($oran2_ver,"1.Takım 2.Set Toplam Sayı Alt/Üst","voleybol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$alt_ust_getir = $icoranlar[0]->Name;
$alt_ust_bol = explode(" ",$alt_ust_getir);
$ust_ver = $alt_ust_bol[1];

if($ust_ver != ''){
$oran_visible = $oranlar->o;

$json['live']['31882'] = array("tempid"=>"31882","N2"=>"".getTranslation('voleyboloran15')."","N"=>"1.Takım 2.Set Toplam Sayı Alt/Üst","id"=>"12","o"=>$oran_visible);

$json['live']['31882']['games'][] = array(
"Id"=>"28",
"EGID"=>"12",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." ".$ust_ver."","Name"=>"Alt ".$ust_ver."",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"31882"
);

$json['live']['31882']['games'][] = array(
"Id"=>"29",
"EGID"=>"12",
"hcoun"=>"9",
"Namexxx"=>"".getTranslation('oransecenek30')." ".$ust_ver."","Name"=>"Üst ".$ust_ver."",
"Name1X2"=>"+",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"31882"
);

}

}

if($GameTemplateId == 31889) {
$oran2_ver = number_format($icoranlar[0]->Odds,2);
$oran1_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"2.Takım 2.Set Toplam Sayı Alt/Üst","voleybol");
$oran2 = dusenoranbulcanli($oran2_ver,"2.Takım 2.Set Toplam Sayı Alt/Üst","voleybol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$alt_ust_getir = $icoranlar[0]->Name;
$alt_ust_bol = explode(" ",$alt_ust_getir);
$ust_ver = $alt_ust_bol[1];

if($ust_ver != ''){
$oran_visible = $oranlar->o;

$json['live']['31889'] = array("tempid"=>"31889","N2"=>"".getTranslation('voleyboloran16')."","N"=>"2.Takım 2.Set Toplam Sayı Alt/Üst","id"=>"13","o"=>$oran_visible);

$json['live']['31889']['games'][] = array(
"Id"=>"30",
"EGID"=>"13",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." ".$ust_ver."","Name"=>"Alt ".$ust_ver."",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"31889"
);

$json['live']['31889']['games'][] = array(
"Id"=>"31",
"EGID"=>"13",
"hcoun"=>"9",
"Namexxx"=>"".getTranslation('oransecenek30')." ".$ust_ver."","Name"=>"Üst ".$ust_ver."",
"Name1X2"=>"+",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"31889"
);

}

}

if($GameTemplateId == 31883) {
$oran2_ver = number_format($icoranlar[0]->Odds,2);
$oran1_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"1.Takım 3.Set Toplam Sayı Alt/Üst","voleybol");
$oran2 = dusenoranbulcanli($oran2_ver,"1.Takım 3.Set Toplam Sayı Alt/Üst","voleybol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$alt_ust_getir = $icoranlar[0]->Name;
$alt_ust_bol = explode(" ",$alt_ust_getir);
$ust_ver = $alt_ust_bol[1];

if($ust_ver != ''){
$oran_visible = $oranlar->o;

$json['live']['31883'] = array("tempid"=>"31883","N2"=>"".getTranslation('voleyboloran17')."","N"=>"1.Takım 3.Set Toplam Sayı Alt/Üst","id"=>"14","o"=>$oran_visible);

$json['live']['31883']['games'][] = array(
"Id"=>"32",
"EGID"=>"14",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." ".$ust_ver."","Name"=>"Alt ".$ust_ver."",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"31883"
);

$json['live']['31883']['games'][] = array(
"Id"=>"33",
"EGID"=>"14",
"hcoun"=>"9",
"Namexxx"=>"".getTranslation('oransecenek30')." ".$ust_ver."","Name"=>"Üst ".$ust_ver."",
"Name1X2"=>"+",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"31883"
);

}

}

if($GameTemplateId == 31890) {
$oran2_ver = number_format($icoranlar[0]->Odds,2);
$oran1_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"2.Takım 3.Set Toplam Sayı Alt/Üst","voleybol");
$oran2 = dusenoranbulcanli($oran2_ver,"2.Takım 3.Set Toplam Sayı Alt/Üst","voleybol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$alt_ust_getir = $icoranlar[0]->Name;
$alt_ust_bol = explode(" ",$alt_ust_getir);
$ust_ver = $alt_ust_bol[1];

if($ust_ver != ''){
$oran_visible = $oranlar->o;

$json['live']['31890'] = array("tempid"=>"31890","N2"=>"".getTranslation('voleyboloran18')."","N"=>"2.Takım 3.Set Toplam Sayı Alt/Üst","id"=>"15","o"=>$oran_visible);

$json['live']['31890']['games'][] = array(
"Id"=>"34",
"EGID"=>"15",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." ".$ust_ver."","Name"=>"Alt ".$ust_ver."",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"31890"
);

$json['live']['31890']['games'][] = array(
"Id"=>"35",
"EGID"=>"15",
"hcoun"=>"9",
"Namexxx"=>"".getTranslation('oransecenek30')." ".$ust_ver."","Name"=>"Üst ".$ust_ver."",
"Name1X2"=>"+",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"31890"
);

}

}

if($GameTemplateId == 31884) {
$oran2_ver = number_format($icoranlar[0]->Odds,2);
$oran1_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"1.Takım 4.Set Toplam Sayı Alt/Üst","voleybol");
$oran2 = dusenoranbulcanli($oran2_ver,"1.Takım 4.Set Toplam Sayı Alt/Üst","voleybol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$alt_ust_getir = $icoranlar[0]->Name;
$alt_ust_bol = explode(" ",$alt_ust_getir);
$ust_ver = $alt_ust_bol[1];

if($ust_ver != ''){
$oran_visible = $oranlar->o;

$json['live']['31884'] = array("tempid"=>"31884","N2"=>"".getTranslation('voleyboloran19')."","N"=>"1.Takım 4.Set Toplam Sayı Alt/Üst","id"=>"16","o"=>$oran_visible);

$json['live']['31884']['games'][] = array(
"Id"=>"36",
"EGID"=>"16",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." ".$ust_ver."","Name"=>"Alt ".$ust_ver."",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"31884"
);

$json['live']['31884']['games'][] = array(
"Id"=>"37",
"EGID"=>"16",
"hcoun"=>"9",
"Namexxx"=>"".getTranslation('oransecenek30')." ".$ust_ver."","Name"=>"Üst ".$ust_ver."",
"Name1X2"=>"+",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"31884"
);

}

}

if($GameTemplateId == 31891) {
$oran2_ver = number_format($icoranlar[0]->Odds,2);
$oran1_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"2.Takım 4.Set Toplam Sayı Alt/Üst","voleybol");
$oran2 = dusenoranbulcanli($oran2_ver,"2.Takım 4.Set Toplam Sayı Alt/Üst","voleybol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$alt_ust_getir = $icoranlar[0]->Name;
$alt_ust_bol = explode(" ",$alt_ust_getir);
$ust_ver = $alt_ust_bol[1];

if($ust_ver != ''){
$oran_visible = $oranlar->o;

$json['live']['31891'] = array("tempid"=>"31891","N2"=>"".getTranslation('voleyboloran20')."","N"=>"2.Takım 4.Set Toplam Sayı Alt/Üst","id"=>"17","o"=>$oran_visible);

$json['live']['31891']['games'][] = array(
"Id"=>"38",
"EGID"=>"17",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." ".$ust_ver."","Name"=>"Alt ".$ust_ver."",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"31891"
);

$json['live']['31891']['games'][] = array(
"Id"=>"39",
"EGID"=>"17",
"hcoun"=>"9",
"Namexxx"=>"".getTranslation('oransecenek30')." ".$ust_ver."","Name"=>"Üst ".$ust_ver."",
"Name1X2"=>"+",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"31891"
);

}

}

if($GameTemplateId == 9210) {
$oran2_ver = number_format($icoranlar[0]->Odds,2);
$oran1_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Toplam Sayı Alt/Üst","voleybol");
$oran2 = dusenoranbulcanli($oran2_ver,"Toplam Sayı Alt/Üst","voleybol");

$visible1 = $icoranlar[1]->Visible;
$visible2 = $icoranlar[0]->Visible;

$alt_ust_getir = $icoranlar[0]->Name;
$alt_ust_bol = explode(" ",$alt_ust_getir);
$ust_ver = $alt_ust_bol[1];

if($ust_ver != ''){
$oran_visible = $oranlar->o;

$json['live']['9210'] = array("tempid"=>"9210","N2"=>"".getTranslation('voleyboloran21')."","N"=>"Toplam Sayı Alt/Üst","id"=>"18","o"=>$oran_visible);

$json['live']['9210']['games'][] = array(
"Id"=>"40",
"EGID"=>"18",
"hcoun"=>"7",
"Namexxx"=>"".getTranslation('oransecenek31')." ".$ust_ver."","Name"=>"Alt ".$ust_ver."",
"Name1X2"=>"-",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"9210"
);

$json['live']['9210']['games'][] = array(
"Id"=>"41",
"EGID"=>"18",
"hcoun"=>"9",
"Namexxx"=>"".getTranslation('oransecenek30')." ".$ust_ver."","Name"=>"Üst ".$ust_ver."",
"Name1X2"=>"+",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"9210"
);

}

}

if($GameTemplateId==14437) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Toplam Sayı Tek/Çift","voleybol");
$oran2 = dusenoranbulcanli($oran2_ver,"Toplam Sayı Tek/Çift","voleybol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;

$json['live']['14437'] = array("tempid"=>"14437","N2"=>"".getTranslation('voleyboloran22')."","N"=>"Toplam Sayı Tek/Çift","id"=>"19","o"=>$oran_visible);

$json['live']['14437']['games'][] = array(
"Id"=>"42",
"EGID"=>"19",
"hcoun"=>"3",
"Namexxx"=>"".getTranslation('oransecenek28')."","Name"=>"Tek",
"Name1X2"=>"T",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"14437"
);

$json['live']['14437']['games'][] = array(
"Id"=>"43",
"EGID"=>"19",
"hcoun"=>"5",
"Namexxx"=>"".getTranslation('oransecenek29')."","Name"=>"Çift",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"14437"
);

}

if($GameTemplateId==11950) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"1.Set Toplam Sayı Tek/Çift","voleybol");
$oran2 = dusenoranbulcanli($oran2_ver,"1.Set Toplam Sayı Tek/Çift","voleybol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;

$json['live']['11950'] = array("tempid"=>"11950","N2"=>"".getTranslation('voleyboloran23')."","N"=>"1.Set Toplam Sayı Tek/Çift","id"=>"20","o"=>$oran_visible);

$json['live']['11950']['games'][] = array(
"Id"=>"44",
"EGID"=>"20",
"hcoun"=>"3",
"Namexxx"=>"".getTranslation('oransecenek28')."","Name"=>"Tek",
"Name1X2"=>"T",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"11950"
);

$json['live']['11950']['games'][] = array(
"Id"=>"45",
"EGID"=>"20",
"hcoun"=>"5",
"Namexxx"=>"".getTranslation('oransecenek29')."","Name"=>"Çift",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"11950"
);

}

if($GameTemplateId==11951) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"2.Set Toplam Sayı Tek/Çift","voleybol");
$oran2 = dusenoranbulcanli($oran2_ver,"2.Set Toplam Sayı Tek/Çift","voleybol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;

$json['live']['11951'] = array("tempid"=>"11951","N2"=>"".getTranslation('voleyboloran24')."","N"=>"2.Set Toplam Sayı Tek/Çift","id"=>"21","o"=>$oran_visible);

$json['live']['11951']['games'][] = array(
"Id"=>"46",
"EGID"=>"21",
"hcoun"=>"3",
"Namexxx"=>"".getTranslation('oransecenek28')."","Name"=>"Tek",
"Name1X2"=>"T",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"11951"
);

$json['live']['11951']['games'][] = array(
"Id"=>"47",
"EGID"=>"21",
"hcoun"=>"5",
"Namexxx"=>"".getTranslation('oransecenek29')."","Name"=>"Çift",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"11951"
);

}

if($GameTemplateId==11952) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"3.Set Toplam Sayı Tek/Çift","voleybol");
$oran2 = dusenoranbulcanli($oran2_ver,"3.Set Toplam Sayı Tek/Çift","voleybol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;

$json['live']['11952'] = array("tempid"=>"11952","N2"=>"".getTranslation('voleyboloran25')."","N"=>"3.Set Toplam Sayı Tek/Çift","id"=>"22","o"=>$oran_visible);

$json['live']['11952']['games'][] = array(
"Id"=>"48",
"EGID"=>"22",
"hcoun"=>"3",
"Namexxx"=>"".getTranslation('oransecenek28')."","Name"=>"Tek",
"Name1X2"=>"T",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"11952"
);

$json['live']['11952']['games'][] = array(
"Id"=>"49",
"EGID"=>"22",
"hcoun"=>"5",
"Namexxx"=>"".getTranslation('oransecenek29')."","Name"=>"Çift",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"11952"
);

}

if($GameTemplateId==11953) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"4.Set Toplam Sayı Tek/Çift","voleybol");
$oran2 = dusenoranbulcanli($oran2_ver,"4.Set Toplam Sayı Tek/Çift","voleybol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;

$json['live']['11953'] = array("tempid"=>"11953","N2"=>"".getTranslation('voleyboloran26')."","N"=>"4.Set Toplam Sayı Tek/Çift","id"=>"23","o"=>$oran_visible);

$json['live']['11953']['games'][] = array(
"Id"=>"50",
"EGID"=>"23",
"hcoun"=>"3",
"Namexxx"=>"".getTranslation('oransecenek28')."","Name"=>"Tek",
"Name1X2"=>"T",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"11953"
);

$json['live']['11953']['games'][] = array(
"Id"=>"51",
"EGID"=>"23",
"hcoun"=>"5",
"Namexxx"=>"".getTranslation('oransecenek29')."","Name"=>"Çift",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"11953"
);

}

if($GameTemplateId==14484) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Müsabaka 5.Set Sürermi","voleybol");
$oran2 = dusenoranbulcanli($oran2_ver,"Müsabaka 5.Set Sürermi","voleybol");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;

$json['live']['14484'] = array("tempid"=>"14484","N2"=>"".getTranslation('voleyboloran27')."","N"=>"Müsabaka 5.Set Sürermi","id"=>"24","o"=>$oran_visible);

$json['live']['14484']['games'][] = array(
"Id"=>"52",
"EGID"=>"24",
"hcoun"=>"3",
"Namexxx"=>"".getTranslation('oransecenek23')."","Name"=>"Evet",
"Name1X2"=>"T",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"14484"
);

$json['live']['14484']['games'][] = array(
"Id"=>"53",
"EGID"=>"24",
"hcoun"=>"5",
"Namexxx"=>"".getTranslation('oransecenek24')."","Name"=>"Hayır",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"14484"
);

}



}

}

if($karsilasmayok==0){
$json = array("eid"=>0);
echo json_encode($json);
} else {
echo json_encode($json);
}

}

} else if($sportipi=="12"){

if($mac_id){
error_reporting(0);
header('Content-type: application/json');

function bahisVeri($id) {
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://betwingo.xyz/api/canli_bilgiler_oran.php?tip=buzhokeyi&id=".$id."");
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
$karsilasmayok++;
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
$count_sayisi_ver = "255";

$evtakim = $match->h;
$deptakim = $match->a;
$betradarid = $match->radarid;
$lig_id = $match->lid;
$lig_adi = $match->lig;
$ulke_id = $match->uid;
$ulke_adi = $match->ulke;
$baslangic_tarih2 = $match->sdate;
$baslangic_saat2 = $match->sht;
$periodId = $match->pid;

$sayi_ver_255 = 255;
$sayi_ver_0 = 0;
$sayi_ver_1 = 1;
$sayi_ver_2 = 3;
$sayi_ver_3 = 5;
$sayi_ver_4 = 4;

## EV SKORLARI ##
$ev1c = $match->ev1c;
$ev2c = $match->ev2c;
$ev3c = $match->ev3c;
$skor_ev = $match->sch;
## DEP SKORLARI ##
$dep1c = $match->dep1c;
$dep2c = $match->dep2c;
$dep3c = $match->dep3c;
$skor_dep = $match->sca;

$dakika_ver_simdi = "00";
$saniye_ver_simdi = "00";

if($ev_tisort && $ev_sort && $konuk_tisort && $konuk_sort){
$json = array(
"eid"=>$mac_id,
"prv"=>"0",
"n"=>"".$evtakim." - ".$deptakim."",
"spid"=>"12",
"spidname"=>"Buzhokeyi",
"lid"=>"".$lig_id."",
"lig"=>$lig_adi,
"h"=>$evtakim,
"a"=>$deptakim,
"hshtcolor"=>"",
"htshtcolor"=>"",
"ashtcolor"=>"",
"atshtcolor"=>"",
"run"=>true,
"actionts"=>"",
"referedate"=>"0",
"secound"=>"0",
"reftime"=>"",
"reftimet"=>"",
"addicon"=>"",
"tvisible"=>true,
"tv"=>"",
"pid"=>"".$periodId."",
"dk"=>"".$dakika_ver_simdi."",
"sn"=>"".$saniye_ver_simdi."",
"uid"=>"".$ulke_id."",
"ulke"=>$ulke_adi,
"sdate"=>"".$baslangic_tarih2."",
"sht"=>"".$baslangic_saat2."",
"radarid"=>"".$betradarid."",
"smid"=>"",
"gseri"=>"0",
"sch"=>"".$skor_ev."",
"sca"=>"".$skor_dep."",
"isch"=>"0",
"isca"=>"0",
"crnh"=>"0",
"crna"=>"0",
"redh"=>"0",
"reda"=>"0",
"serph"=>"0",
"serpa"=>"0",
"ycardh"=>"0",
"ycarda"=>"0",
"pnlth"=>"0",
"pnlta"=>"0",
"turn"=>"0",
"periodsh"=>["1"=>$ev1c,"2"=>$ev2c,"3"=>$ev3c,"4"=>"0","5"=>"0","6"=>"0","7"=>"0"],
"periodsa"=>["1"=>$dep1c,"2"=>$dep2c,"3"=>$dep3c,"4"=>"0","5"=>"0","6"=>"0","7"=>"0"],
"turnvis"=>""
);
}

foreach($match->Msg as $keysss => $messagesver){
$mesajtypesi = $messagesver->type;
$mesajteam = $messagesver->team;
$mesajtime = $messagesver->dk;
$aciklamasi = $messagesver->N;

$json['Msg'][] = array("id"=>$keysss,"type"=>$mesajtypesi,"N"=>$aciklamasi);

}

foreach($match->oran as $oranlar){
$GameTemplateId = $oranlar->tempid;
$icoranlar = $oranlar->rest;

if($GameTemplateId == 51) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"1X2","buzhokeyi");
$oran2 = dusenoranbulcanli($oran2_ver,"1X2","buzhokeyi");
$oran3 = dusenoranbulcanli($oran3_ver,"1X2","buzhokeyi");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;

$json['live']['51'] = array("tempid"=>"51","N2"=>"".getTranslation('buzhokeyioran2')."","N"=>"1X2","id"=>"1","o"=>$oran_visible);

$json['live']['51']['games'][] = array(
"Id"=>"1",
"EGID"=>"1",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"51"
);

$json['live']['51']['games'][] = array(
"Id"=>"2",
"EGID"=>"1",
"Namexxx"=>"X","Name"=>"X",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"51"
);

$json['live']['51']['games'][] = array(
"Id"=>"3",
"EGID"=>"1",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"51"
);

}

if($GameTemplateId == 14464) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Cifte Sans","buzhokeyi");
$oran2 = dusenoranbulcanli($oran2_ver,"Cifte Sans","buzhokeyi");
$oran3 = dusenoranbulcanli($oran3_ver,"Cifte Sans","buzhokeyi");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;

$json['live']['14464'] = array("tempid"=>"14464","N2"=>"".getTranslation('buzhokeyioran6')."","N"=>"Cifte Sans","id"=>"2","o"=>$oran_visible);

$json['live']['14464']['games'][] = array(
"Id"=>"4",
"EGID"=>"2",
"Namexxx"=>"1X","Name"=>"1X",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"14464"
);

$json['live']['14464']['games'][] = array(
"Id"=>"5",
"EGID"=>"2",
"Namexxx"=>"X2","Name"=>"X2",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"14464"
);

$json['live']['14464']['games'][] = array(
"Id"=>"6",
"EGID"=>"2",
"Namexxx"=>"12","Name"=>"12",
"Name1X2"=>"",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"14464"
);

}

if($GameTemplateId == 2771) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Hangi periyod daha cok gol olur?","buzhokeyi");
$oran2 = dusenoranbulcanli($oran2_ver,"Hangi periyod daha cok gol olur?","buzhokeyi");
$oran3 = dusenoranbulcanli($oran3_ver,"Hangi periyod daha cok gol olur?","buzhokeyi");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;

$oran_visible = $oranlar->o;

$json['live']['2771'] = array("tempid"=>"2771","N2"=>"".getTranslation('buzhokeyioran10')."","N"=>"Hangi periyod daha cok gol olur?","id"=>"3","o"=>$oran_visible);

$json['live']['2771']['games'][] = array(
"Id"=>"7",
"EGID"=>"3",
"Namexxx"=>"".getTranslation('oransecenek58')."","Name"=>"1.P",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"2771"
);

$json['live']['2771']['games'][] = array(
"Id"=>"8",
"EGID"=>"3",
"Namexxx"=>"".getTranslation('oransecenek59')."","Name"=>"2.P",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"2771"
);

$json['live']['2771']['games'][] = array(
"Id"=>"9",
"EGID"=>"3",
"Namexxx"=>"".getTranslation('oransecenek60')."","Name"=>"3.P",
"Name1X2"=>"",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"2771"
);

}



}

}

if($karsilasmayok==0){
$json = array("eid"=>0);
echo json_encode($json);
} else {
echo json_encode($json);
}

}

} else if($sportipi=="56"){

if($mac_id){
error_reporting(0);
header('Content-type: application/json');

function bahisVeri($id) {
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://betwingo.xyz/api/canli_bilgiler_oran.php?tip=masatenisi&id=".$id."");
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
$karsilasmayok++;
$ev_tisort = "#000000";
$ev_sort = "#000000";
$konuk_tisort = "#000000";
$konuk_sort = "#000000";

$evin_sayisi = "01";
$konukun_sayisi = "02";
$count_sayisi_ver = "255";

$evtakim = $match->h;
$deptakim = $match->a;
$betradarid = "";
$lig_id = $match->lid;
$lig_adi = $match->lig;
$ulke_id = $match->uid;
$ulke_adi = $match->ulke;
$periodId = $match->pid;

$sayi_ver_255 = 255;
$sayi_ver_0 = 0;
$sayi_ver_1 = 1;
$sayi_ver_2 = 2;
$sayi_ver_3 = 3;
$sayi_ver_4 = 4;

## EV SKORLARI ##
$ev1c = $match->ev1c;
$ev2c = $match->ev2c;
$ev3c = $match->ev3c;
$ev4c = $match->ev4c;
$ev5c = $match->ev5c;
## DEP SKORLARI ##
$dep1c = $match->dep1c;
$dep2c = $match->dep2c;
$dep3c = $match->dep3c;
$dep4c = $match->dep4c;
$dep5c = $match->dep5c;

$baslangic_tarih2 = $match->sdate;
$baslangic_saat2 = $match->sht;

$evskor_ver = 0;
$depskor_ver = 0;

if($periodId == 2 || $periodId == 3){
	if($ev1c>$dep1c){$evskor_ver++;} else if($ev1c<$dep1c){$depskor_ver++;}
}

if($periodId == 4 || $periodId == 5){
	if($ev1c>$dep1c){$evskor_ver++;} else if($ev1c<$dep1c){$depskor_ver++;}
	if($ev2c>$dep2c){$evskor_ver++;} else if($ev2c<$dep2c){$depskor_ver++;}
}

if($periodId == 6 || $periodId == 7){
	if($ev1c>$dep1c){$evskor_ver++;} else if($ev1c<$dep1c){$depskor_ver++;}
	if($ev2c>$dep2c){$evskor_ver++;} else if($ev2c<$dep2c){$depskor_ver++;}
	if($ev3c>$dep3c){$evskor_ver++;} else if($ev3c<$dep3c){$depskor_ver++;}
}

if($periodId == 8 || $periodId == 9){
	if($ev1c>$dep1c){$evskor_ver++;} else if($ev1c<$dep1c){$depskor_ver++;}
	if($ev2c>$dep2c){$evskor_ver++;} else if($ev2c<$dep2c){$depskor_ver++;}
	if($ev3c>$dep3c){$evskor_ver++;} else if($ev3c<$dep3c){$depskor_ver++;}
	if($ev4c>$dep4c){$evskor_ver++;} else if($ev4c<$dep4c){$depskor_ver++;}
}

if($periodId == 10 || $periodId == 11 || $periodId == 12 || $periodId == 13 || $periodId == 14 || $periodId == 255){
	if($ev1c>$dep1c){$evskor_ver++;} else if($ev1c<$dep1c){$depskor_ver++;}
	if($ev2c>$dep2c){$evskor_ver++;} else if($ev2c<$dep2c){$depskor_ver++;}
	if($ev3c>$dep3c){$evskor_ver++;} else if($ev3c<$dep3c){$depskor_ver++;}
	if($ev4c>$dep4c){$evskor_ver++;} else if($ev4c<$dep4c){$depskor_ver++;}
	if($ev5c>$dep5c){$evskor_ver++;} else if($ev5c<$dep5c){$depskor_ver++;}
}

$skor_ev_ver = $evskor_ver;
$skor_dep_ver = $depskor_ver;

if($skor_ev_ver>0){ $skor_ev = $skor_ev_ver; } else { $skor_ev = 0; }
if($skor_dep_ver>0){ $skor_dep = $skor_dep_ver; } else { $skor_dep = 0; }

$dakika_ver_simdi = "00";
$saniye_ver_simdi = "00";

if($ev_tisort && $ev_sort && $konuk_tisort && $konuk_sort){
$json = array(
"eid"=>$mac_id,
"prv"=>"0",
"n"=>"".$evtakim." - ".$deptakim."",
"spid"=>"56",
"spidname"=>"Masa Tenisi",
"lid"=>"".$lig_id."",
"lig"=>$lig_adi,
"h"=>$evtakim,
"a"=>$deptakim,
"hshtcolor"=>"",
"htshtcolor"=>"",
"ashtcolor"=>"",
"atshtcolor"=>"",
"run"=>true,
"actionts"=>"",
"referedate"=>"0",
"secound"=>"0",
"reftime"=>"",
"reftimet"=>"",
"addicon"=>"",
"tvisible"=>true,
"tv"=>"",
"pid"=>"".$periodId."",
"dk"=>"".$dakika_ver_simdi."",
"sn"=>"".$saniye_ver_simdi."",
"uid"=>"".$ulke_id."",
"ulke"=>$ulke_adi,
"sdate"=>"".$baslangic_tarih2."",
"sht"=>"".$baslangic_saat2."",
"radarid"=>"".$betradarid."",
"smid"=>"",
"gseri"=>"0",
"sch"=>"".$skor_ev."",
"sca"=>"".$skor_dep."",
"isch"=>"0",
"isca"=>"0",
"crnh"=>"0",
"crna"=>"0",
"redh"=>"0",
"reda"=>"0",
"serph"=>"0",
"serpa"=>"0",
"ycardh"=>"0",
"ycarda"=>"0",
"pnlth"=>"0",
"pnlta"=>"0",
"turn"=>"0",
"periodsh"=>["1"=>$ev1c,"2"=>$ev2c,"3"=>$ev3c,"4"=>$ev4c,"5"=>$ev5c,"6"=>"0","7"=>"0"],
"periodsa"=>["1"=>$dep1c,"2"=>$dep2c,"3"=>$dep3c,"4"=>$dep4c,"5"=>$dep5c,"6"=>"0","7"=>"0"],
"turnvis"=>""
);
}

foreach($match->Msg as $keysss => $messagesver){
$mesajtypesi = $messagesver->type;
$mesajteam = $messagesver->team;
$mesajtime = $messagesver->dk;
$aciklamasi = $messagesver->N;

$json['Msg'][] = array("id"=>$keysss,"type"=>$mesajtypesi,"N"=>$aciklamasi);

}

foreach($match->oran as $oranlar){
$GameTemplateId = $oranlar->tempid;
$icoranlar = $oranlar->rest;

if($GameTemplateId == 5421) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Kim Kazanır","masatenis");
$oran2 = dusenoranbulcanli($oran2_ver,"Kim Kazanır","masatenis");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;

$json['live']['5421'] = array("tempid"=>"5421","N2"=>"".getTranslation('masatenisioran1')."","N"=>"Kim Kazanır","id"=>"1","o"=>$oran_visible);

$json['live']['5421']['games'][] = array(
"Id"=>"1",
"EGID"=>"1",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"5421"
);

$json['live']['5421']['games'][] = array(
"Id"=>"2",
"EGID"=>"1",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"5421"
);

}

if($GameTemplateId == 17547) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);
$oran3_ver = number_format($icoranlar[2]->Odds,2);
$oran4_ver = number_format($icoranlar[3]->Odds,2);
$oran5_ver = number_format($icoranlar[4]->Odds,2);
$oran6_ver = number_format($icoranlar[5]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"Set Bahisi","masatenis");
$oran2 = dusenoranbulcanli($oran2_ver,"Set Bahisi","masatenis");
$oran3 = dusenoranbulcanli($oran3_ver,"Set Bahisi","masatenis");
$oran4 = dusenoranbulcanli($oran4_ver,"Set Bahisi","masatenis");
$oran5 = dusenoranbulcanli($oran5_ver,"Set Bahisi","masatenis");
$oran6 = dusenoranbulcanli($oran6_ver,"Set Bahisi","masatenis");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;
$visible3 = $icoranlar[2]->Visible;
$visible4 = $icoranlar[3]->Visible;
$visible5 = $icoranlar[4]->Visible;
$visible6 = $icoranlar[5]->Visible;
$oran_visible = $oranlar->o;

$json['live']['17547'] = array("tempid"=>"17547","N2"=>"".getTranslation('masatenisioran2')."","N"=>"Set Bahisi","id"=>"2","o"=>$oran_visible);

$json['live']['17547']['games'][] = array(
"Id"=>"3",
"EGID"=>"2",
"Namexxx"=>"3:0","Name"=>"3:0",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"17547"
);

$json['live']['17547']['games'][] = array(
"Id"=>"4",
"EGID"=>"2",
"Namexxx"=>"3:1","Name"=>"3:1",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"17547"
);

$json['live']['17547']['games'][] = array(
"Id"=>"5",
"EGID"=>"2",
"Namexxx"=>"3:2","Name"=>"3:2",
"Name1X2"=>"",
"Visible"=>$visible3,
"Odds"=>"".$oran3."",
"templateId"=>"17547"
);

$json['live']['17547']['games'][] = array(
"Id"=>"6",
"EGID"=>"2",
"Namexxx"=>"2:3","Name"=>"2:3",
"Name1X2"=>"",
"Visible"=>$visible4,
"Odds"=>"".$oran4."",
"templateId"=>"17547"
);

$json['live']['17547']['games'][] = array(
"Id"=>"7",
"EGID"=>"2",
"Namexxx"=>"1:3","Name"=>"1:3",
"Name1X2"=>"",
"Visible"=>$visible5,
"Odds"=>"".$oran5."",
"templateId"=>"17547"
);

$json['live']['17547']['games'][] = array(
"Id"=>"8",
"EGID"=>"2",
"Namexxx"=>"0:3","Name"=>"0:3",
"Name1X2"=>"",
"Visible"=>$visible6,
"Odds"=>"".$oran6."",
"templateId"=>"17547"
);

}

if($GameTemplateId == 5424) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"1.Seti Kim Kazanır","masatenis");
$oran2 = dusenoranbulcanli($oran2_ver,"1.Seti Kim Kazanır","masatenis");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;

$json['live']['5424'] = array("tempid"=>"5424","N2"=>"".getTranslation('masatenisioran5')."","N"=>"1.Seti Kim Kazanır","id"=>"3","o"=>$oran_visible);

$json['live']['5424']['games'][] = array(
"Id"=>"9",
"EGID"=>"3",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"5424"
);

$json['live']['5424']['games'][] = array(
"Id"=>"10",
"EGID"=>"3",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"5424"
);

}

if($GameTemplateId == 8261) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"2.Seti Kim Kazanır","masatenis");
$oran2 = dusenoranbulcanli($oran2_ver,"2.Seti Kim Kazanır","masatenis");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;

$json['live']['8261'] = array("tempid"=>"8261","N2"=>"".getTranslation('masatenisioran7')."","N"=>"2.Seti Kim Kazanır","id"=>"4","o"=>$oran_visible);

$json['live']['8261']['games'][] = array(
"Id"=>"11",
"EGID"=>"4",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"8261"
);

$json['live']['8261']['games'][] = array(
"Id"=>"12",
"EGID"=>"4",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"8261"
);

}

if($GameTemplateId == 5426) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"3.Seti Kim Kazanır","masatenis");
$oran2 = dusenoranbulcanli($oran2_ver,"3.Seti Kim Kazanır","masatenis");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;

$json['live']['5426'] = array("tempid"=>"5426","N2"=>"".getTranslation('masatenisioran8')."","N"=>"3.Seti Kim Kazanır","id"=>"5","o"=>$oran_visible);

$json['live']['5426']['games'][] = array(
"Id"=>"13",
"EGID"=>"5",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"5426"
);

$json['live']['5426']['games'][] = array(
"Id"=>"14",
"EGID"=>"5",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"5426"
);

}

if($GameTemplateId == 5427) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"4.Seti Kim Kazanır","masatenis");
$oran2 = dusenoranbulcanli($oran2_ver,"4.Seti Kim Kazanır","masatenis");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;

$json['live']['5427'] = array("tempid"=>"5427","N2"=>"".getTranslation('masatenisioran9')."","N"=>"4.Seti Kim Kazanır","id"=>"6","o"=>$oran_visible);

$json['live']['5427']['games'][] = array(
"Id"=>"15",
"EGID"=>"6",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"5427"
);

$json['live']['5427']['games'][] = array(
"Id"=>"16",
"EGID"=>"6",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"5427"
);

}

if($GameTemplateId == 5428) {
$oran1_ver = number_format($icoranlar[0]->Odds,2);
$oran2_ver = number_format($icoranlar[1]->Odds,2);

$oran1 = dusenoranbulcanli($oran1_ver,"5.Seti Kim Kazanır","masatenis");
$oran2 = dusenoranbulcanli($oran2_ver,"5.Seti Kim Kazanır","masatenis");

$visible1 = $icoranlar[0]->Visible;
$visible2 = $icoranlar[1]->Visible;

$oran_visible = $oranlar->o;

$json['live']['5428'] = array("tempid"=>"5428","N2"=>"".getTranslation('masatenisioran10')."","N"=>"5.Seti Kim Kazanır","id"=>"7","o"=>$oran_visible);

$json['live']['5428']['games'][] = array(
"Id"=>"17",
"EGID"=>"7",
"Namexxx"=>"1","Name"=>"1",
"Name1X2"=>"",
"Visible"=>$visible1,
"Odds"=>"".$oran1."",
"templateId"=>"5428"
);

$json['live']['5428']['games'][] = array(
"Id"=>"18",
"EGID"=>"7",
"Namexxx"=>"2","Name"=>"2",
"Name1X2"=>"",
"Visible"=>$visible2,
"Odds"=>"".$oran2."",
"templateId"=>"5428"
);

}



}

}

if($karsilasmayok==0){
$json = array("eid"=>0);
echo json_encode($json);
} else {
echo json_encode($json);
}

}

}