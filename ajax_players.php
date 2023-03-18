<?php

session_start();

@header("Content-type: text/html; charset=utf-8");

include 'db.php';

if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:login.php"); exit(); die(); }
if (!function_exists('stripos')) {

    function stripos_clone($haystack, $needle, $offset = 0) {
        return strpos(strtoupper($haystack), strtoupper($needle), $offset);
    }

} else {

    function stripos_clone($haystack, $needle, $offset = 0) {
        return stripos($haystack, $needle, $offset = 0);
    }

}if (isset($_SERVER['QUERY_STRING'])) {
    $queryString = strtolower($_SERVER['QUERY_STRING']);
    if (stripos_clone($queryString, '%select%20') OR stripos_clone($queryString, '%20union%20') OR stripos_clone($queryString, 'union/*') OR stripos_clone($queryString, 'c2nyaxb0') OR stripos_clone($queryString, '+union+') OR stripos_clone($queryString, 'http://') OR stripos_clone($queryString, 'https://') OR ( stripos_clone($queryString, 'cmd=') AND ! stripos_clone($queryString, '&cmd')) OR ( stripos_clone($queryString, 'exec') AND ! stripos_clone($queryString, 'execu')) OR stripos_clone($queryString, 'union') OR stripos_clone($queryString, 'concat') OR stripos_clone($queryString, 'ftp://')) {
       exit;
    }
}
@include 'class.phpmailer.php';
function agent($u_agent) {
if (preg_match('/linux/i', $u_agent)) {
        $platform = 'Linux';
    }
    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'Mac';
    }
    elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'Windows';
    }
    
    // Next get the name of the useragent yes seperately and for good reason
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) 
    { 
        $bname = 'Internet Explorer'; 
        $ub = "MSIE"; 
    } 
    elseif(preg_match('/Firefox/i',$u_agent)) 
    { 
        $bname = 'Mozilla Firefox'; 
        $ub = "Firefox"; 
    } 
    elseif(preg_match('/Chrome/i',$u_agent)) 
    { 
        $bname = 'Google Chrome'; 
        $ub = "Chrome"; 
    } 
    elseif(preg_match('/Safari/i',$u_agent)) 
    { 
        $bname = 'Apple Safari'; 
        $ub = "Safari"; 
    } 
    elseif(preg_match('/Opera/i',$u_agent)) 
    { 
        $bname = 'Opera'; 
        $ub = "Opera"; 
    } 
    elseif(preg_match('/Netscape/i',$u_agent)) 
    { 
        $bname = 'Netscape'; 
        $ub = "Netscape"; 
    } 
	return "$platform $bname";
}



$ayarbir = bilgi("select olmayanmaclar,futbol_live_xml_url_gelecek,futbol_live_xml_url,ayar_id from sistemayar where ayar_id='1'");

$a = gd("a");

if($a=="limitupdate") {

die(nf($ub['bakiye']));	

}

$ustler = "SELECT k.hesap_sahibi_id as ust1 ,k2.hesap_sahibi_id as ust2 FROM kullanici as k  INNER JOIN kullanici as k2 ON k2.id = k.hesap_sahibi_id where k.id=".$_SESSION['betuser']."";
#echo $ustler;
$sor = sed_sql_query($ustler);
$r = sed_sql_fetchassoc($sor);
$_SESSION['ustler'] = array($r['ust1'],$r['ust2']);

if($a=="uplign") {

	$id = gd("id");

	$ulke_adi = gd("name");

	$ds = gd("ds");	

	sed_sql_query("UPDATE program_lig set ".$ds."='$ulke_adi' where id='$id'");

	die();	

}

if($a=="bethistory") {
header('Content-Type: application/json; charset=utf-8');
## fonksiyon kupon_icerik_getir ##
function kupon_icerik_getir($kupon_id){

$row = bilgi("select * from kuponlar where id='".$kupon_id."' and casino='1'");
$row2 = bilgi("select * from kupon_ic_casino where kupon_id='".$kupon_id."'");

if($row2['kazanma']==1){
$kazanma_ver2 = 3;
$acikkart_ver = 1;
} else if($row2['kazanma']==2){
$kazanma_ver2 = 1;
$acikkart_ver = 0;
} else if($row2['kazanma']==3){
$kazanma_ver2 = 2;
$acikkart_ver = 0;
} else if($row2['kazanma']==4){
$kazanma_ver2 = 4;
$acikkart_ver = 0;
}

if($row2['gameid']==8){

if($row2['secenek']=="Krupiyenin kartı siyah olacak"){
$suits_ver = ['clubs','spades'];
} else if($row2['secenek']=="Krupiyenin kartı kırmızı olacak"){
$suits_ver = ['diamonds','hearts'];
} else if($row2['secenek']=="Oyuncunun kartı siyah olacak"){
$suits_ver = ['clubs','spades'];
} else if($row2['secenek']=="Oyuncunun kartı kırmızı olacak"){
$suits_ver = ['diamonds','hearts'];
} else if($row2['secenek']=="Krupiyenin kartı sinek olacak"){
$suits_ver = ['clubs'];
} else if($row2['secenek']=="Krupiyenin kartı karo olacak"){
$suits_ver = ['diamonds'];
} else if($row2['secenek']=="Krupiyenin kartı kupa olacak"){
$suits_ver = ['hearts'];
} else if($row2['secenek']=="Krupiyenin kartı maça olacak"){
$suits_ver = ['spades'];
} else if($row2['secenek']=="Oyuncunun kartı sinek olacak"){
$suits_ver = ['clubs'];
} else if($row2['secenek']=="Oyuncunun kartı karo olacak"){
$suits_ver = ['diamonds'];
} else if($row2['secenek']=="Oyuncunun kartı kupa olacak"){
$suits_ver = ['hearts'];
} else if($row2['secenek']=="Oyuncunun kartı maça olacak"){
$suits_ver = ['spades'];
} else {
$suits_ver = '[]';
}

if($row2['oyuncukart']>$row2['krupiyekart']){
$json_bets_cards = array(
"id"=>"404",
"suit"=>"".$row2['oyuncusimge']."",
"value"=>"".$row2['oyuncukart']."",
"score"=>"".$row2['oyuncukart']."",
"dealed_to"=>"player",
"run_cards_id"=>"4372542"
);
$winner_ver = "player";
} else if($row2['oyuncukart']<$row2['krupiyekart']){
$json_bets_cards = array(
"id"=>"202",
"suit"=>"".$row2['krupiyesimge']."",
"value"=>"".$row2['krupiyekart']."",
"score"=>"".$row2['krupiyekart']."",
"dealed_to"=>"dealer",
"run_cards_id"=>"4372542"
);
$winner_ver = "dealer";
}

$json_bets_sonuc1 = array(
"id"=>"404",
"suit"=>"".$row2['oyuncusimge']."",
"value"=>"".$row2['oyuncukart']."",
"score"=>"".$row2['oyuncukart'].""
);

$json_bets_sonuc2 = array(
"id"=>"202",
"suit"=>"".$row2['krupiyesimge']."",
"value"=>"".$row2['krupiyekart']."",
"score"=>"".$row2['krupiyekart'].""
);

$json_bets_sonuc = array(
"card_player"=>$json_bets_sonuc1,
"card_dealer"=>$json_bets_sonuc2,
"winner"=>"".$winner_ver."",
"score_dealer"=>"".$row2['krupiyekart']."",
"score_player"=>"".$row2['oyuncukart'].""
);

if($row2['oyuncukart']!='' && $row2['krupiyekart']!=''){
$json_bets_icerik[$row2['roundid']] = array(
"bahiskodu"=>"".$row2['roundid']."",
"canli"=>"1",
"orankodu"=>"".$row2['oddid']."",
"oyunkodu"=>"8",
"oran"=>"".nf($row2['oran'])."",
"bahis"=>"".$row2['secenek']."",
"spid"=>"",
"oyunad"=>"Basmaca",
"tercih"=>"".$row2['secenek']."",
"oyunkad"=>"Basmaca",
"ktercih"=>"".$row2['secenek']."",
"idcol"=>"".$row2['grupid']."",
"onstatu"=>"active",
"acikkart"=>$acikkart_ver,
"statu"=>"".$kazanma_ver2."",
"itemsCount"=>"".$kac_sayi_var."",
"suits"=>$suits_ver,
"radarid"=>"",
"cards"=>$json_bets_cards,
"bsaati"=>"".$row2['ilkgiris']."",
"bttimes"=>"".date("d-m H:i",$row2['ilkgiris'])."",
"videourl"=>"".$row2['video']."",
"sonuc"=>$json_bets_sonuc,
"zaman"=>"".$row['kupon_time'].""
);
} else {
$json_bets_icerik[$row2['roundid']] = array(
"bahiskodu"=>"".$row2['roundid']."",
"canli"=>"1",
"orankodu"=>"".$row2['oddid']."",
"oyunkodu"=>"8",
"oran"=>"".nf($row2['oran'])."",
"bahis"=>"".$row2['secenek']."",
"spid"=>"",
"oyunad"=>"Basmaca",
"tercih"=>"".$row2['secenek']."",
"oyunkad"=>"Basmaca",
"ktercih"=>"".$row2['secenek']."",
"idcol"=>"".$row2['grupid']."",
"onstatu"=>"active",
"acikkart"=>$acikkart_ver,
"statu"=>"".$kazanma_ver2."",
"itemsCount"=>"".$kac_sayi_var."",
"suits"=>$suits_ver,
"radarid"=>"",
"bsaati"=>"".$row2['ilkgiris']."",
"bttimes"=>"".date("d-m H:i",$row2['ilkgiris'])."",
"zaman"=>"".$row['kupon_time'].""
);
}

} else if($row2['gameid']==5){

$json_bets_cards[] = array(
"id"=>"309",
"suit"=>"".$row2['el_1_1_renk']."",
"value"=>"".$row2['el_1_1'].""
);

$json_bets_cards[] = array(
"id"=>"314",
"suit"=>"".$row2['el_1_2_renk']."",
"value"=>"".$row2['el_1_2'].""
);

$json_bets_cards[] = array(
"id"=>"112",
"suit"=>"".$row2['el_2_1_renk']."",
"value"=>"".$row2['el_2_1'].""
);

$json_bets_cards[] = array(
"id"=>"105",
"suit"=>"".$row2['el_2_2_renk']."",
"value"=>"".$row2['el_2_2'].""
);

$json_bets_cards[] = array(
"id"=>"211",
"suit"=>"".$row2['el_3_1_renk']."",
"value"=>"".$row2['el_3_1'].""
);

$json_bets_cards[] = array(
"id"=>"106",
"suit"=>"".$row2['el_3_2_renk']."",
"value"=>"".$row2['el_3_2'].""
);

$json_bets_cards[] = array(
"id"=>"402",
"suit"=>"".$row2['el_4_1_renk']."",
"value"=>"".$row2['el_4_1'].""
);

$json_bets_cards[] = array(
"id"=>"114",
"suit"=>"".$row2['el_4_2_renk']."",
"value"=>"".$row2['el_4_2'].""
);

$json_bets_cards[] = array(
"id"=>"104",
"suit"=>"".$row2['el_5_1_renk']."",
"value"=>"".$row2['el_5_1'].""
);

$json_bets_cards[] = array(
"id"=>"207",
"suit"=>"".$row2['el_5_2_renk']."",
"value"=>"".$row2['el_5_2'].""
);

$json_bets_cards[] = array(
"id"=>"308",
"suit"=>"".$row2['el_6_1_renk']."",
"value"=>"".$row2['el_6_1'].""
);

$json_bets_cards[] = array(
"id"=>"312",
"suit"=>"".$row2['el_6_2_renk']."",
"value"=>"".$row2['el_6_2'].""
);

$json_bets_results = array(
"winners"=>"[".$row2['kazananeller']."]",
"hand"=>7,
"combination_name"=>"".$row2['kazanmasekli'].""
);

$json_bets_players['1'][] = array("id"=>"402","suit"=>"".$row2['el_1_1_renk']."","value"=>"".$row2['el_1_1']."");

$json_bets_players['1'][] = array("id"=>"309","suit"=>"".$row2['el_1_2_renk']."","value"=>"".$row2['el_1_2']."");

$json_bets_players['2'][] = array("id"=>"114","suit"=>"".$row2['el_2_1_renk']."","value"=>"".$row2['el_2_1']."");

$json_bets_players['2'][] = array("id"=>"314","suit"=>"".$row2['el_2_2_renk']."","value"=>"".$row2['el_2_2']."");

$json_bets_players['3'][] = array("id"=>"104","suit"=>"".$row2['el_3_1_renk']."","value"=>"".$row2['el_3_1']."");

$json_bets_players['3'][] = array("id"=>"112","suit"=>"".$row2['el_3_2_renk']."","value"=>"".$row2['el_3_2']."");

$json_bets_players['4'][] = array("id"=>"207","suit"=>"".$row2['el_4_1_renk']."","value"=>"".$row2['el_4_1']."");

$json_bets_players['4'][] = array("id"=>"105","suit"=>"".$row2['el_4_2_renk']."","value"=>"".$row2['el_4_2']."");

$json_bets_players['5'][] = array("id"=>"308","suit"=>"".$row2['el_5_1_renk']."","value"=>"".$row2['el_5_1']."");

$json_bets_players['5'][] = array("id"=>"211","suit"=>"".$row2['el_5_2_renk']."","value"=>"".$row2['el_5_2']."");

$json_bets_players['6'][] = array("id"=>"312","suit"=>"".$row2['el_6_1_renk']."","value"=>"".$row2['el_6_1']."");

$json_bets_players['6'][] = array("id"=>"106","suit"=>"".$row2['el_6_2_renk']."","value"=>"".$row2['el_6_2']."");

$json_bets_table_cards[] = array("id"=>"408","suit"=>"".$row2['kel_1_renk']."","value"=>"".$row2['kel_1']."");

$json_bets_table_cards[] = array("id"=>"304","suit"=>"".$row2['kel_2_renk']."","value"=>"".$row2['kel_2']."");

$json_bets_table_cards[] = array("id"=>"208","suit"=>"".$row2['kel_3_renk']."","value"=>"".$row2['kel_3']."");

$json_bets_table_cards[] = array("id"=>"403","suit"=>"".$row2['kel_4_renk']."","value"=>"".$row2['kel_4']."");

$json_bets_table_cards[] = array("id"=>"311","suit"=>"".$row2['kel_5_renk']."","value"=>"".$row2['kel_5']."");

$json_bets_situation = array(
"players"=>$json_bets_players,
"table_cards"=>$json_bets_table_cards
);

$json_bets_sonuc = array(
"results"=>$json_bets_results,
"situation"=>$json_bets_situation
);

if($row2['kazananeller']!='' && $row2['kazanmasekli']!=''){
$json_bets_icerik[$row2['roundid']] = array(
"bahiskodu"=>"".$row2['roundid']."",
"canli"=>"1",
"orankodu"=>"".$row2['oddid']."",
"oyunkodu"=>"5",
"oran"=>"".nf($row2['oran'])."",
"bahis"=>"".$row2['secenek']."",
"spid"=>"",
"oyunad"=>"Poker",
"tercih"=>"".$row2['secenek']."",
"oyunkad"=>"Poker",
"ktercih"=>"".$row2['secenek']."",
"idcol"=>"".$row2['grupid']."",
"onstatu"=>"active",
"acikkart"=>$acikkart_ver,
"statu"=>"".$kazanma_ver2."",
"itemsCount"=>"".$kac_sayi_var."",
"suits"=>[],
"radarid"=>"",
"cards"=>$json_bets_cards,
"bsaati"=>"".$row2['ilkgiris']."",
"bttimes"=>"".date("d-m H:i",$row2['ilkgiris'])."",
"videourl"=>"".$row2['video']."",
"sonuc"=>$json_bets_sonuc,
"zaman"=>"".$row['kupon_time'].""
);
} else {
$json_bets_icerik[$row2['roundid']] = array(
"bahiskodu"=>"".$row2['roundid']."",
"canli"=>"1",
"orankodu"=>"".$row2['oddid']."",
"oyunkodu"=>"5",
"oran"=>"".nf($row2['oran'])."",
"bahis"=>"".$row2['secenek']."",
"spid"=>"",
"oyunad"=>"Poker",
"tercih"=>"".$row2['secenek']."",
"oyunkad"=>"Poker",
"ktercih"=>"".$row2['secenek']."",
"idcol"=>"".$row2['grupid']."",
"onstatu"=>"active",
"acikkart"=>$acikkart_ver,
"statu"=>"".$kazanma_ver2."",
"itemsCount"=>"".$kac_sayi_var."",
"suits"=>[],
"radarid"=>"",
"bsaati"=>"".$row2['ilkgiris']."",
"bttimes"=>"".date("d-m H:i",$row2['ilkgiris'])."",
"zaman"=>"".$row['kupon_time'].""
);
}


} else if($row2['gameid']==6){

if($row2['secenek']=="Sıradaki kart – siyah"){
$suits_ver = ['clubs','spades'];
} else if($row2['secenek']=="Sıradaki kart – kırmızı"){
$suits_ver = ['diamonds','hearts'];
} else if($row2['secenek']=="Sıradaki kart – sinek"){
$suits_ver = ['clubs'];
} else if($row2['secenek']=="Sıradaki kart – karo"){
$suits_ver = ['diamonds'];
} else if($row2['secenek']=="Sıradaki kart – kupa"){
$suits_ver = ['hearts'];
} else if($row2['secenek']=="Sıradaki kart – maça"){
$suits_ver = ['spades'];
} else {
$suits_ver = '[]';
}

$json_bets_cards[] = array(
"id"=>"204",
"suit"=>"".$row2['oyuncu_1_renk']."",
"value"=>"".$row2['oyuncu_1']."",
"score"=>"".$row2['oyuncu_1']."",
"dealed_to"=>"player",
"run_cards_id"=>"4372542"
);

$json_bets_cards[] = array(
"id"=>"109",
"suit"=>"".$row2['krupiye_1_renk']."",
"value"=>"".$row2['krupiye_1']."",
"score"=>"".$row2['krupiye_1']."",
"dealed_to"=>"banker",
"run_cards_id"=>"4372542"
);

$json_bets_player[] = array(
"suit"=>"".$row2['oyuncu_1_renk']."",
"symbol"=>"&#x2665;&#xFE0E",
"value"=>"".$row2['oyuncu_1']."",
"score"=>"".$row2['oyuncu_1'].""
);

$json_bets_player[] = array(
"suit"=>"".$row2['oyuncu_2_renk']."",
"symbol"=>"&#x2665;&#xFE0E",
"value"=>"".$row2['oyuncu_2']."",
"score"=>"".$row2['oyuncu_2'].""
);
if($row2['oyuncu_3']!=''){
$json_bets_player[] = array(
"suit"=>"".$row2['oyuncu_3_renk']."",
"symbol"=>"&#x2665;&#xFE0E",
"value"=>"".$row2['oyuncu_3']."",
"score"=>"".$row2['oyuncu_3'].""
);
}
$json_bets_banker[] = array(
"suit"=>"".$row2['krupiye_1_renk']."",
"symbol"=>"&#x2665;&#xFE0E",
"value"=>"".$row2['krupiye_1']."",
"score"=>"".$row2['krupiye_1'].""
);

$json_bets_banker[] = array(
"suit"=>"".$row2['krupiye_2_renk']."",
"symbol"=>"&#x2665;&#xFE0E",
"value"=>"".$row2['krupiye_2']."",
"score"=>"".$row2['krupiye_2'].""
);
if($row2['krupiye_3']!=''){
$json_bets_banker[] = array(
"suit"=>"".$row2['krupiye_3_renk']."",
"symbol"=>"&#x2665;&#xFE0E",
"value"=>"".$row2['krupiye_3']."",
"score"=>"".$row2['krupiye_3'].""
);
}
$json_bets_situation = array(
"player"=>$json_bets_player,
"banker"=>$json_bets_banker
);

if($row2['skor_oyuncu']>$row2['skor_krupiye']){
	$winner_ver = "player";
} else {
	$winner_ver = "banker";
}

$json_bets_score = array(
"player"=>$row2['skor_oyuncu'],
"banker"=>$row2['skor_krupiye']
);

$kazananeller_bol = explode(',',$row2['kazananeller']);

$kazanan5_turkce = CasinoTurkcelestirme($kazananeller_bol[5]);
$kazanan4_turkce = CasinoTurkcelestirme($kazananeller_bol[4]);
$kazanan3_turkce = CasinoTurkcelestirme($kazananeller_bol[3]);
$kazanan2_turkce = CasinoTurkcelestirme($kazananeller_bol[2]);
$kazanan1_turkce = CasinoTurkcelestirme($kazananeller_bol[1]);
$kazanan0_turkce = CasinoTurkcelestirme($kazananeller_bol[0]);

if($kazananeller_bol[5]!=''){
$kazanan_eller_ver = $kazanan0_turkce.",".$kazanan1_turkce.",".$kazanan2_turkce.",".$kazanan3_turkce.",".$kazanan4_turkce.",".$kazanan5_turkce;
} else if($kazananeller_bol[4]!=''){
$kazanan_eller_ver = $kazanan0_turkce.",".$kazanan1_turkce.",".$kazanan2_turkce.",".$kazanan3_turkce.",".$kazanan4_turkce;
} else if($kazananeller_bol[3]!=''){
$kazanan_eller_ver = $kazanan0_turkce.",".$kazanan1_turkce.",".$kazanan2_turkce.",".$kazanan3_turkce;
} else if($kazananeller_bol[2]!=''){
$kazanan_eller_ver = $kazanan0_turkce.",".$kazanan1_turkce.",".$kazanan2_turkce;
} else if($kazananeller_bol[1]!=''){
$kazanan_eller_ver = $kazanan0_turkce.",".$kazanan1_turkce;
} else {
$kazanan_eller_ver = $kazanan0_turkce;
}

$json_bets_results = array(
"situation"=>$json_bets_situation,
"winner"=>"".$winner_ver."",
"side_bets"=>"".$row2['kazananeller']."",
"score"=>$json_bets_score,
"bet_round_id"=>"".$row2['kazanmasekli']."",
"side_bets_names"=>["".$kazanan_eller_ver.""]
);

$json_bets_situationcards1[] = array(
"id"=>"201",
"suit"=>"".$row2['oyuncu_1_renk']."",
"value"=>"".$row2['oyuncu_1']."",
"score"=>"".$row2['oyuncu_1']."",
"dealed_to"=>"player",
"run_cards_id"=>"7868414"
);

$json_bets_situationcards1[] = array(
"id"=>"202",
"suit"=>"".$row2['oyuncu_2_renk']."",
"value"=>"".$row2['oyuncu_2']."",
"score"=>"".$row2['oyuncu_2']."",
"dealed_to"=>"player",
"run_cards_id"=>"7868414"
);
if($row2['oyuncu_3']!=''){
$json_bets_situationcards1[] = array(
"id"=>"203",
"suit"=>"".$row2['oyuncu_3_renk']."",
"value"=>"".$row2['oyuncu_3']."",
"score"=>"".$row2['oyuncu_3']."",
"dealed_to"=>"player",
"run_cards_id"=>"7868414"
);
}

$json_bets_situationcards1[] = array(
"id"=>"204",
"suit"=>"".$row2['krupiye_1_renk']."",
"value"=>"".$row2['krupiye_1']."",
"score"=>"".$row2['krupiye_1']."",
"dealed_to"=>"banker",
"run_cards_id"=>"7868414"
);

$json_bets_situationcards1[] = array(
"id"=>"205",
"suit"=>"".$row2['krupiye_2_renk']."",
"value"=>"".$row2['krupiye_2']."",
"score"=>"".$row2['krupiye_2']."",
"dealed_to"=>"banker",
"run_cards_id"=>"7868414"
);
if($row2['krupiye_3']!=''){
$json_bets_situationcards1[] = array(
"id"=>"206",
"suit"=>"".$row2['krupiye_3_renk']."",
"value"=>"".$row2['krupiye_3']."",
"score"=>"".$row2['krupiye_3']."",
"dealed_to"=>"banker",
"run_cards_id"=>"7868414"
);
}
$json_bets_situationplayers = array(
"cards"=>$json_bets_situationcards1,
"cards"=>$json_bets_situationcards2
);

$json_bets_situation2 = array(
"players"=>$json_bets_situationplayers
);

$json_bets_sonuc = array(
"results"=>$json_bets_results,
"situation"=>$json_bets_situation2
);

if($row2['kazananeller']!=''){
$json_bets_icerik[$row2['roundid']] = array(
"bahiskodu"=>"".$row2['roundid']."",
"canli"=>"1",
"orankodu"=>"".$row2['oddid']."",
"oyunkodu"=>"6",
"oran"=>"".nf($row2['oran'])."",
"bahis"=>"".$row2['secenek']."",
"spid"=>"",
"oyunad"=>"Bakara",
"tercih"=>"".$row2['secenek']."",
"oyunkad"=>"Bakara",
"ktercih"=>"".$row2['secenek']."",
"idcol"=>"".$row2['grupid']."",
"onstatu"=>"active",
"acikkart"=>0,
"statu"=>"".$kazanma_ver2."",
"itemsCount"=>"".$kac_sayi_var."",
"suits"=>$suits_ver,
"radarid"=>"",
"cards"=>$json_bets_cards,
"bsaati"=>"".$row2['ilkgiris']."",
"bttimes"=>"".date("d-m H:i",$row2['ilkgiris'])."",
"videourl"=>"".$row2['video']."",
"sonuc"=>$json_bets_sonuc,
"zaman"=>"".$row['kupon_time'].""
);
} else {
$json_bets_icerik[$row2['roundid']] = array(
"bahiskodu"=>"".$row2['roundid']."",
"canli"=>"1",
"orankodu"=>"".$row2['oddid']."",
"oyunkodu"=>"6",
"oran"=>"".nf($row2['oran'])."",
"bahis"=>"".$row2['secenek']."",
"spid"=>"",
"oyunad"=>"Bakara",
"tercih"=>"".$row2['secenek']."",
"oyunkad"=>"Bakara",
"ktercih"=>"".$row2['secenek']."",
"idcol"=>"".$row2['grupid']."",
"onstatu"=>"active",
"acikkart"=>0,
"statu"=>"".$kazanma_ver2."",
"itemsCount"=>"".$kac_sayi_var."",
"suits"=>$suits_ver,
"radarid"=>"",
"bsaati"=>"".$row2['ilkgiris']."",
"bttimes"=>"".date("d-m H:i",$row2['ilkgiris'])."",
"zaman"=>"".$row['kupon_time'].""
);
}

} else if($row2['gameid']==7){

if($row2['sayi']==1 || $row2['sayi']==4 || $row2['sayi']==7 || $row2['sayi']==10 || $row2['sayi']==13 || $row2['sayi']==16){
	$renk_ver = "black";
} else if($row2['sayi']==2 || $row2['sayi']==5 || $row2['sayi']==8 || $row2['sayi']==11 || $row2['sayi']==14 || $row2['sayi']==17){
	$renk_ver = "grey";
} else if($row2['sayi']==3 || $row2['sayi']==6 || $row2['sayi']==9 || $row2['sayi']==12 || $row2['sayi']==15 || $row2['sayi']==18){ 
	$renk_ver = "red";
}

if($row2['sayi']!=''){
$json_bets_ex[] = array(
"color"=>$renk_ver,
"id"=>"111",
"number"=>"".$row2['sayi'].""
);
}

$json_bets_sonuc[] = array(
"number"=>"".$row2['kazanannumara']."",
"color"=>"".$row2['kazananrenk'].""
);

if($row2['kazanannumara']!=''){
$json_bets_icerik[$row2['roundid']] = array(
"bahiskodu"=>"".$row2['roundid']."",
"canli"=>"1",
"orankodu"=>"".$row2['oddid']."",
"oyunkodu"=>"7",
"oran"=>"".nf($row2['oran'])."",
"bahis"=>"".$row2['secenek']."",
"spid"=>"",
"oyunad"=>"Çarkıfelek",
"tercih"=>"".$row2['secenek']."",
"oyunkad"=>"Çarkıfelek",
"ktercih"=>"".$row2['secenek']."",
"idcol"=>"".$row2['grupid']."",
"onstatu"=>"active",
"acikkart"=>0,
"statu"=>"".$kazanma_ver2."",
"itemsCount"=>"".$kac_sayi_var."",
"suits"=>$suits_ver,
"radarid"=>"",
"ex"=>$json_bets_ex,
"bsaati"=>"".$row2['ilkgiris']."",
"bttimes"=>"".date("d-m H:i",$row2['ilkgiris'])."",
"videourl"=>"".$row2['video']."",
"sonuc"=>$json_bets_sonuc,
"zaman"=>"".$row['kupon_time'].""
);
} else {
$json_bets_icerik[$row2['roundid']] = array(
"bahiskodu"=>"".$row2['roundid']."",
"canli"=>"1",
"orankodu"=>"".$row2['oddid']."",
"oyunkodu"=>"7",
"oran"=>"".nf($row2['oran'])."",
"bahis"=>"".$row2['secenek']."",
"spid"=>"",
"oyunad"=>"Çarkıfelek",
"tercih"=>"".$row2['secenek']."",
"oyunkad"=>"Çarkıfelek",
"ktercih"=>"".$row2['secenek']."",
"idcol"=>"".$row2['grupid']."",
"onstatu"=>"active",
"acikkart"=>0,
"statu"=>"".$kazanma_ver2."",
"itemsCount"=>"".$kac_sayi_var."",
"suits"=>$suits_ver,
"radarid"=>"",
"ex"=>$json_bets_ex,
"bsaati"=>"".$row2['ilkgiris']."",
"bttimes"=>"".date("d-m H:i",$row2['ilkgiris'])."",
"zaman"=>"".$row['kupon_time'].""
);
}

} else if($row2['gameid']==10){

if($row2['oddid']==594){
$json_bets_ex[] = array(
"color"=>"dice-red",
"id"=>"148",
"number"=>"".$row2['sayi'].""
);
} else if($row2['oddid']==595){
$json_bets_ex[] = array(
"color"=>"dice-blue",
"id"=>"148",
"number"=>"".$row2['sayi'].""
);
} else if($row2['oddid']==596){
$sayilari_bol = explode(',',$row2['sayi']);
$json_bets_ex[] = array(
"color"=>"dice-red",
"id"=>"148",
"number"=>"".$sayilari_bol[0].""
);
$json_bets_ex[] = array(
"color"=>"dice-blue",
"id"=>"148",
"number"=>"".$sayilari_bol[1].""
);
}

$json_bets_sonuc[] = array(
"number"=>"".$row2['zar_1']."",
"color"=>"dice"
);

$json_bets_sonuc[] = array(
"number"=>"".$row2['zar_2']."",
"color"=>"dice"
);

if($row2['zar_1']!='' && $row2['zar_2']!=''){
$json_bets_icerik[$row2['roundid']] = array(
"bahiskodu"=>"".$row2['roundid']."",
"canli"=>"1",
"orankodu"=>"".$row2['oddid']."",
"oyunkodu"=>"10",
"oran"=>"".nf($row2['oran'])."",
"bahis"=>"".$row2['secenek']."",
"spid"=>"",
"oyunad"=>"Zar Düellosu",
"tercih"=>"".$row2['secenek']."",
"oyunkad"=>"Zar Düellosu",
"ktercih"=>"".$row2['secenek']."",
"idcol"=>"".$row2['grupid']."",
"onstatu"=>"active",
"acikkart"=>0,
"statu"=>"".$kazanma_ver2."",
"itemsCount"=>"".$kac_sayi_var."",
"suits"=>$suits_ver,
"radarid"=>"",
"ex"=>$json_bets_ex,
"bsaati"=>"".$row2['ilkgiris']."",
"bttimes"=>"".date("d-m H:i",$row2['ilkgiris'])."",
"videourl"=>"".$row2['video']."",
"sonuc"=>$json_bets_sonuc,
"zaman"=>"".$row['kupon_time'].""
);
} else {
$json_bets_icerik[$row2['roundid']] = array(
"bahiskodu"=>"".$row2['roundid']."",
"canli"=>"1",
"orankodu"=>"".$row2['oddid']."",
"oyunkodu"=>"10",
"oran"=>"".nf($row2['oran'])."",
"bahis"=>"".$row2['secenek']."",
"spid"=>"",
"oyunad"=>"Zar Düellosu",
"tercih"=>"".$row2['secenek']."",
"oyunkad"=>"Zar Düellosu",
"ktercih"=>"".$row2['secenek']."",
"idcol"=>"".$row2['grupid']."",
"onstatu"=>"active",
"acikkart"=>0,
"statu"=>"".$kazanma_ver2."",
"itemsCount"=>"".$kac_sayi_var."",
"suits"=>$suits_ver,
"radarid"=>"",
"ex"=>$json_bets_ex,
"bsaati"=>"".$row2['ilkgiris']."",
"bttimes"=>"".date("d-m H:i",$row2['ilkgiris'])."",
"zaman"=>"".$row['kupon_time'].""
);
}

} else if($row2['gameid']==12){

$json_bets_results = array(
"winners"=>["".$row2['kazananeller'].""],
"hand"=>"".$row2['kazanmasekli']."",
"combination_name"=>"".$row2['kazanmasekli'].""
);

$json_bets_situation_dealer[] = array(
"id"=>"407",
"suit"=>"".$row2['el_2_1_renk']."",
"value"=>"".$row2['el_2_1']."",
"dealed_to"=>"dealer",
"run_cards_id"=>"1604234"
);

$json_bets_situation_dealer[] = array(
"id"=>"113",
"suit"=>"".$row2['el_2_2_renk']."",
"value"=>"".$row2['el_2_2']."",
"dealed_to"=>"dealer",
"run_cards_id"=>"1604234"
);

$json_bets_situation_player[] = array(
"id"=>"412",
"suit"=>"".$row2['el_1_1_renk']."",
"value"=>"".$row2['el_1_1']."",
"dealed_to"=>"player",
"run_cards_id"=>"1604234"
);

$json_bets_situation_player[] = array(
"id"=>"107",
"suit"=>"".$row2['el_1_2_renk']."",
"value"=>"".$row2['el_1_2']."",
"dealed_to"=>"player",
"run_cards_id"=>"1604234"
);

$json_bets_situation_players = array(
"dealer"=>$json_bets_situation_dealer,
"player"=>$json_bets_situation_player
);

$json_bets_situation_table_cards[] = array(
"id"=>"209",
"suit"=>"".$row2['kel_1_renk']."",
"value"=>"".$row2['kel_1']."",
"dealed_to"=>"board",
"run_cards_id"=>"1604234"
);

$json_bets_situation_table_cards[] = array(
"id"=>"410",
"suit"=>"".$row2['kel_2_renk']."",
"value"=>"".$row2['kel_2']."",
"dealed_to"=>"board",
"run_cards_id"=>"1604234"
);

$json_bets_situation_table_cards[] = array(
"id"=>"311",
"suit"=>"".$row2['kel_3_renk']."",
"value"=>"".$row2['kel_3']."",
"dealed_to"=>"board",
"run_cards_id"=>"1604234"
);

$json_bets_situation_table_cards[] = array(
"id"=>"312",
"suit"=>"".$row2['kel_4_renk']."",
"value"=>"".$row2['kel_4']."",
"dealed_to"=>"board",
"run_cards_id"=>"1604234"
);

$json_bets_situation_table_cards[] = array(
"id"=>"309",
"suit"=>"".$row2['kel_5_renk']."",
"value"=>"".$row2['kel_5']."",
"dealed_to"=>"board",
"run_cards_id"=>"1604234"
);

$json_bets_situation = array(
"players"=>$json_bets_situation_players,
"table_cards"=>$json_bets_situation_table_cards
);

$json_bets_sonuc = array(
"results"=>$json_bets_results,
"situation"=>$json_bets_situation
);

if($row2['kazananeller']!=''){
$json_bets_icerik[$row2['roundid']] = array(
"bahiskodu"=>"".$row2['roundid']."",
"canli"=>"1",
"orankodu"=>"".$row2['oddid']."",
"oyunkodu"=>"12",
"oran"=>"".nf($row2['oran'])."",
"bahis"=>"".$row2['secenek']."",
"spid"=>"",
"oyunad"=>"6+ Poker",
"tercih"=>"".$row2['secenek']."",
"oyunkad"=>"6+ Poker",
"ktercih"=>"".$row2['secenek']."",
"idcol"=>"".$row2['grupid']."",
"onstatu"=>"active",
"acikkart"=>0,
"statu"=>"".$kazanma_ver2."",
"itemsCount"=>"".$kac_sayi_var."",
"suits"=>$suits_ver,
"radarid"=>"",
"bsaati"=>"".$row2['ilkgiris']."",
"bttimes"=>"".date("d-m H:i",$row2['ilkgiris'])."",
"videourl"=>"".$row2['video']."",
"sonuc"=>$json_bets_sonuc,
"zaman"=>"".$row['kupon_time'].""
);
} else {
$json_bets_icerik[$row2['roundid']] = array(
"bahiskodu"=>"".$row2['roundid']."",
"canli"=>"1",
"orankodu"=>"".$row2['oddid']."",
"oyunkodu"=>"12",
"oran"=>"".nf($row2['oran'])."",
"bahis"=>"".$row2['secenek']."",
"spid"=>"",
"oyunad"=>"6+ Poker",
"tercih"=>"".$row2['secenek']."",
"oyunkad"=>"6+ Poker",
"ktercih"=>"".$row2['secenek']."",
"idcol"=>"".$row2['grupid']."",
"onstatu"=>"active",
"acikkart"=>0,
"statu"=>"".$kazanma_ver2."",
"itemsCount"=>"".$kac_sayi_var."",
"suits"=>$suits_ver,
"radarid"=>"",
"bsaati"=>"".$row2['ilkgiris']."",
"bttimes"=>"".date("d-m H:i",$row2['ilkgiris'])."",
"zaman"=>"".$row['kupon_time'].""
);
}

} else if($row2['gameid']==3){

$sayilari_bol = explode(',',$row2['sayi']);

if($row2['sayi']!=''){

if($row2['oddid']==273 || $row2['oddid']==274){

if($row2['sayi']<10){
	$renk_ver = "white";
} else if($row2['sayi']==10 || $row2['sayi']==11 || $row2['sayi']==12 || $row2['sayi']==13 || $row2['sayi']==14 || $row2['sayi']==15 || $row2['sayi']==16 || $row2['sayi']==17 || $row2['sayi']==18){
	$renk_ver = "green";
} else if($row2['sayi']==19 || $row2['sayi']==20 || $row2['sayi']==21 || $row2['sayi']==22 || $row2['sayi']==23 || $row2['sayi']==24 || $row2['sayi']==25 || $row2['sayi']==26 || $row2['sayi']==27){
	$renk_ver = "red";
} else if($row2['sayi']>27){
	$renk_ver = "blue";
}

$json_bets_ex[] = array(
"color"=>$renk_ver,
"id"=>"111",
"number"=>"".$row2['sayi'].""
);

} else if($row2['oddid']==275){

if($sayilari_bol[0]<10){
	$renk_ver1 = "white";
} else if($sayilari_bol[0]==10 || $sayilari_bol[0]==11 || $sayilari_bol[0]==12 || $sayilari_bol[0]==13 || $sayilari_bol[0]==14 || $sayilari_bol[0]==15 || $sayilari_bol[0]==16 || $sayilari_bol[0]==17 || $sayilari_bol[0]==18){
	$renk_ver1 = "green";
} else if($sayilari_bol[0]==19 || $sayilari_bol[0]==20 || $sayilari_bol[0]==21 || $sayilari_bol[0]==22 || $sayilari_bol[0]==23 || $sayilari_bol[0]==24 || $sayilari_bol[0]==25 || $sayilari_bol[0]==26 || $sayilari_bol[0]==27){
	$renk_ver1 = "red";
} else if($sayilari_bol[0]>27){
	$renk_ver1 = "blue";
}

if($sayilari_bol[1]<10){
	$renk_ver2 = "white";
} else if($sayilari_bol[1]==10 || $sayilari_bol[1]==11 || $sayilari_bol[1]==12 || $sayilari_bol[1]==13 || $sayilari_bol[1]==14 || $sayilari_bol[1]==15 || $sayilari_bol[1]==16 || $sayilari_bol[1]==17 || $sayilari_bol[1]==18){
	$renk_ver2 = "green";
} else if($sayilari_bol[1]==19 || $sayilari_bol[1]==20 || $sayilari_bol[1]==21 || $sayilari_bol[1]==22 || $sayilari_bol[1]==23 || $sayilari_bol[1]==24 || $sayilari_bol[1]==25 || $sayilari_bol[1]==26 || $sayilari_bol[1]==27){
	$renk_ver2 = "red";
} else if($sayilari_bol[1]>27){
	$renk_ver2 = "blue";
}

$json_bets_ex[] = array(
"color"=>$renk_ver1,
"id"=>"111",
"number"=>"".$sayilari_bol[0].""
);

$json_bets_ex[] = array(
"color"=>$renk_ver2,
"id"=>"112",
"number"=>"".$sayilari_bol[1].""
);

} else if($row2['oddid']==276){

if($sayilari_bol[0]<10){
	$renk_ver1 = "white";
} else if($sayilari_bol[0]==10 || $sayilari_bol[0]==11 || $sayilari_bol[0]==12 || $sayilari_bol[0]==13 || $sayilari_bol[0]==14 || $sayilari_bol[0]==15 || $sayilari_bol[0]==16 || $sayilari_bol[0]==17 || $sayilari_bol[0]==18){
	$renk_ver1 = "green";
} else if($sayilari_bol[0]==19 || $sayilari_bol[0]==20 || $sayilari_bol[0]==21 || $sayilari_bol[0]==22 || $sayilari_bol[0]==23 || $sayilari_bol[0]==24 || $sayilari_bol[0]==25 || $sayilari_bol[0]==26 || $sayilari_bol[0]==27){
	$renk_ver1 = "red";
} else if($sayilari_bol[0]>27){
	$renk_ver1 = "blue";
}

if($sayilari_bol[1]<10){
	$renk_ver2 = "white";
} else if($sayilari_bol[1]==10 || $sayilari_bol[1]==11 || $sayilari_bol[1]==12 || $sayilari_bol[1]==13 || $sayilari_bol[1]==14 || $sayilari_bol[1]==15 || $sayilari_bol[1]==16 || $sayilari_bol[1]==17 || $sayilari_bol[1]==18){
	$renk_ver2 = "green";
} else if($sayilari_bol[1]==19 || $sayilari_bol[1]==20 || $sayilari_bol[1]==21 || $sayilari_bol[1]==22 || $sayilari_bol[1]==23 || $sayilari_bol[1]==24 || $sayilari_bol[1]==25 || $sayilari_bol[1]==26 || $sayilari_bol[1]==27){
	$renk_ver2 = "red";
} else if($sayilari_bol[1]>27){
	$renk_ver2 = "blue";
}

if($sayilari_bol[2]<10){
	$renk_ver3 = "white";
} else if($sayilari_bol[2]==10 || $sayilari_bol[2]==11 || $sayilari_bol[2]==12 || $sayilari_bol[2]==13 || $sayilari_bol[2]==14 || $sayilari_bol[2]==15 || $sayilari_bol[2]==16 || $sayilari_bol[2]==17 || $sayilari_bol[2]==18){
	$renk_ver3 = "green";
} else if($sayilari_bol[2]==19 || $sayilari_bol[2]==20 || $sayilari_bol[2]==21 || $sayilari_bol[2]==22 || $sayilari_bol[2]==23 || $sayilari_bol[2]==24 || $sayilari_bol[2]==25 || $sayilari_bol[2]==26 || $sayilari_bol[2]==27){
	$renk_ver3 = "red";
} else if($sayilari_bol[2]>27){
	$renk_ver3 = "blue";
}

$json_bets_ex[] = array(
"color"=>$renk_ver1,
"id"=>"111",
"number"=>"".$sayilari_bol[0].""
);

$json_bets_ex[] = array(
"color"=>$renk_ver2,
"id"=>"112",
"number"=>"".$sayilari_bol[1].""
);

$json_bets_ex[] = array(
"color"=>$renk_ver3,
"id"=>"113",
"number"=>"".$sayilari_bol[2].""
);

}

}

if($row2['sayi_1']!=''){
$json_bets_sonuc[] = array(
"color"=>"".$row2['sayi_1_renk']."",
"id"=>"19",
"number"=>"".$row2['sayi_1'].""
);
}

if($row2['sayi_2']!=''){
$json_bets_sonuc[] = array(
"color"=>"".$row2['sayi_2_renk']."",
"id"=>"11",
"number"=>"".$row2['sayi_2'].""
);
}

if($row2['sayi_3']!=''){
$json_bets_sonuc[] = array(
"color"=>"".$row2['sayi_3_renk']."",
"id"=>"17",
"number"=>"".$row2['sayi_3'].""
);
}

if($row2['sayi_4']!=''){
$json_bets_sonuc[] = array(
"color"=>"".$row2['sayi_4_renk']."",
"id"=>"36",
"number"=>"".$row2['sayi_4'].""
);
}

if($row2['sayi_5']!=''){
$json_bets_sonuc[] = array(
"color"=>"".$row2['sayi_5_renk']."",
"id"=>"21",
"number"=>"".$row2['sayi_5'].""
);
}

if($row2['sayi_1']!=''){
$json_bets_icerik[$row2['roundid']] = array(
"bahiskodu"=>"".$row2['roundid']."",
"canli"=>"1",
"orankodu"=>"".$row2['oddid']."",
"oyunkodu"=>"3",
"oran"=>"".nf($row2['oran'])."",
"bahis"=>"".$row2['secenek']."",
"spid"=>"",
"oyunad"=>"Sayısal Loto 5",
"tercih"=>"".$row2['secenek']."",
"oyunkad"=>"Sayısal Loto 5",
"ktercih"=>"".$row2['secenek']."",
"idcol"=>"".$row2['grupid']."",
"onstatu"=>"active",
"acikkart"=>0,
"statu"=>"".$kazanma_ver2."",
"itemsCount"=>"".$kac_sayi_var."",
"suits"=>$suits_ver,
"radarid"=>"",
"ex"=>$json_bets_ex,
"bsaati"=>"".$row2['ilkgiris']."",
"bttimes"=>"".date("d-m H:i",$row2['ilkgiris'])."",
"videourl"=>"".$row2['video']."",
"sonuc"=>$json_bets_sonuc,
"zaman"=>"".$row['kupon_time'].""
);
} else {
$json_bets_icerik[$row2['roundid']] = array(
"bahiskodu"=>"".$row2['roundid']."",
"canli"=>"1",
"orankodu"=>"".$row2['oddid']."",
"oyunkodu"=>"3",
"oran"=>"".nf($row2['oran'])."",
"bahis"=>"".$row2['secenek']."",
"spid"=>"",
"oyunad"=>"Sayısal Loto 5",
"tercih"=>"".$row2['secenek']."",
"oyunkad"=>"Sayısal Loto 5",
"ktercih"=>"".$row2['secenek']."",
"idcol"=>"".$row2['grupid']."",
"onstatu"=>"active",
"acikkart"=>0,
"statu"=>"".$kazanma_ver2."",
"itemsCount"=>"".$kac_sayi_var."",
"suits"=>$suits_ver,
"radarid"=>"",
"ex"=>$json_bets_ex,
"bsaati"=>"".$row2['ilkgiris']."",
"bttimes"=>"".date("d-m H:i",$row2['ilkgiris'])."",
"zaman"=>"".$row['kupon_time'].""
);
}

} else if($row2['gameid']==9){

$sayilari_bol = explode(',',$row2['sayi']);

if($row2['sayi']!=''){

if($row2['oddid']==553 || $row2['oddid']==554 || $row2['oddid']==555 || $row2['oddid']==559 || $row2['oddid']==560 || $row2['oddid']==561 || $row2['oddid']==562){

if($row2['sayi']==1 || $row2['sayi']==2 || $row2['sayi']==5 || $row2['sayi']==6 || $row2['sayi']==9){ $renk_ver = "red"; } else { $renk_ver = "blue"; }

$json_bets_ex[] = array(
"color"=>$renk_ver,
"id"=>"111",
"number"=>"".$row2['sayi'].""
);

} else if($row2['oddid']==556 || $row2['oddid']==557 || $row2['oddid']==558){

if($sayilari_bol[0]==1 || $sayilari_bol[0]==2 || $sayilari_bol[0]==5 || $sayilari_bol[0]==6 || $sayilari_bol[0]==9){ $renk_ver1 = "red"; } else { $renk_ver1 = "blue"; }
if($sayilari_bol[1]==1 || $sayilari_bol[1]==2 || $sayilari_bol[1]==5 || $sayilari_bol[1]==6 || $sayilari_bol[1]==9){ $renk_ver2 = "red"; } else { $renk_ver2 = "blue"; }

$json_bets_ex[] = array(
"color"=>$renk_ver1,
"id"=>"111",
"number"=>"".$sayilari_bol[0].""
);

$json_bets_ex[] = array(
"color"=>$renk_ver2,
"id"=>"112",
"number"=>"".$sayilari_bol[1].""
);

}

}

if($row2['sayi_1']!=''){
$json_bets_sonuc[] = array(
"color"=>"".$row2['sayi_1_renk']."",
"id"=>"19",
"number"=>"".$row2['sayi_1'].""
);
}

if($row2['sayi_2']!=''){
$json_bets_sonuc[] = array(
"color"=>"".$row2['sayi_2_renk']."",
"id"=>"11",
"number"=>"".$row2['sayi_2'].""
);
}

if($row2['sayi_3']!=''){
$json_bets_sonuc[] = array(
"color"=>"".$row2['sayi_3_renk']."",
"id"=>"17",
"number"=>"".$row2['sayi_3'].""
);
}

if($row2['sayi_4']!=''){
$json_bets_sonuc[] = array(
"color"=>"".$row2['sayi_4_renk']."",
"id"=>"36",
"number"=>"".$row2['sayi_4'].""
);
}

if($row2['sayi_5']!=''){
$json_bets_sonuc[] = array(
"color"=>"".$row2['sayi_5_renk']."",
"id"=>"21",
"number"=>"".$row2['sayi_5'].""
);
}

if($row2['sayi_6']!=''){
$json_bets_sonuc[] = array(
"color"=>"".$row2['sayi_6_renk']."",
"id"=>"29",
"number"=>"".$row2['sayi_6'].""
);
}

if($row2['sayi_1']!=''){
$json_bets_icerik[$row2['roundid']] = array(
"bahiskodu"=>"".$row2['roundid']."",
"canli"=>"1",
"orankodu"=>"".$row2['oddid']."",
"oyunkodu"=>"9",
"oran"=>"".nf($row2['oran'])."",
"bahis"=>"".$row2['secenek']."",
"spid"=>"",
"oyunad"=>"Sayısal Loto 6",
"tercih"=>"".$row2['secenek']."",
"oyunkad"=>"Sayısal Loto 6",
"ktercih"=>"".$row2['secenek']."",
"idcol"=>"".$row2['grupid']."",
"onstatu"=>"active",
"acikkart"=>0,
"statu"=>"".$kazanma_ver2."",
"itemsCount"=>"".$kac_sayi_var."",
"suits"=>$suits_ver,
"radarid"=>"",
"ex"=>$json_bets_ex,
"bsaati"=>"".$row2['ilkgiris']."",
"bttimes"=>"".date("d-m H:i",$row2['ilkgiris'])."",
"videourl"=>"".$row2['video']."",
"sonuc"=>$json_bets_sonuc,
"zaman"=>"".$row['kupon_time'].""
);
} else {
$json_bets_icerik[$row2['roundid']] = array(
"bahiskodu"=>"".$row2['roundid']."",
"canli"=>"1",
"orankodu"=>"".$row2['oddid']."",
"oyunkodu"=>"9",
"oran"=>"".nf($row2['oran'])."",
"bahis"=>"".$row2['secenek']."",
"spid"=>"",
"oyunad"=>"Sayısal Loto 6",
"tercih"=>"".$row2['secenek']."",
"oyunkad"=>"Sayısal Loto 6",
"ktercih"=>"".$row2['secenek']."",
"idcol"=>"".$row2['grupid']."",
"onstatu"=>"active",
"acikkart"=>0,
"statu"=>"".$kazanma_ver2."",
"itemsCount"=>"".$kac_sayi_var."",
"suits"=>$suits_ver,
"radarid"=>"",
"ex"=>$json_bets_ex,
"bsaati"=>"".$row2['ilkgiris']."",
"bttimes"=>"".date("d-m H:i",$row2['ilkgiris'])."",
"zaman"=>"".$row['kupon_time'].""
);
}

} else if($row2['gameid']==1){

$sayilari_bol = explode(',',$row2['sayi']);

if($row2['sayi']!=''){

if($row2['oddid']==1 || $row2['oddid']==2){

if($row2['sayi']==1 || $row2['sayi']==3 || $row2['sayi']==5 || $row2['sayi']==8 || $row2['sayi']==10 || $row2['sayi']==12|| $row2['sayi']==13|| $row2['sayi']==15|| $row2['sayi']==17|| $row2['sayi']==20|| $row2['sayi']==22 || $row2['sayi']==24|| $row2['sayi']==26|| $row2['sayi']==27|| $row2['sayi']==29|| $row2['sayi']==32|| $row2['sayi']==34|| $row2['sayi']==36|| $row2['sayi']==37|| $row2['sayi']==39|| $row2['sayi']==41){ $renk_ver = "yellow"; } else { $renk_ver = "black"; }

$json_bets_ex[] = array(
"color"=>$renk_ver,
"id"=>"111",
"number"=>"".$row2['sayi'].""
);

} else if($row2['oddid']==3){

if($sayilari_bol[0]==1 || $sayilari_bol[0]==3 || $sayilari_bol[0]==5 || $sayilari_bol[0]==8 || $sayilari_bol[0]==10 || $sayilari_bol[0]==12|| $sayilari_bol[0]==13|| $sayilari_bol[0]==15|| $sayilari_bol[0]==17|| $sayilari_bol[0]==20|| $sayilari_bol[0]==22 || $sayilari_bol[0]==24|| $sayilari_bol[0]==26|| $sayilari_bol[0]==27|| $sayilari_bol[0]==29|| $sayilari_bol[0]==32|| $sayilari_bol[0]==34|| $sayilari_bol[0]==36|| $sayilari_bol[0]==37|| $sayilari_bol[0]==39|| $sayilari_bol[0]==41){ $renk_ver1 = "yellow"; } else { $renk_ver1 = "black"; }

if($sayilari_bol[1]==1 || $sayilari_bol[1]==3 || $sayilari_bol[1]==5 || $sayilari_bol[1]==8 || $sayilari_bol[1]==10 || $sayilari_bol[1]==12|| $sayilari_bol[1]==13|| $sayilari_bol[1]==15|| $sayilari_bol[1]==17|| $sayilari_bol[1]==20|| $sayilari_bol[1]==22 || $sayilari_bol[1]==24|| $sayilari_bol[1]==26|| $sayilari_bol[1]==27|| $sayilari_bol[1]==29|| $sayilari_bol[1]==32|| $sayilari_bol[1]==34|| $sayilari_bol[1]==36|| $sayilari_bol[1]==37|| $sayilari_bol[1]==39|| $sayilari_bol[1]==41){ $renk_ver2 = "yellow"; } else { $renk_ver2 = "black"; }

$json_bets_ex[] = array(
"color"=>$renk_ver1,
"id"=>"112",
"number"=>"".$sayilari_bol[0].""
);

$json_bets_ex[] = array(
"color"=>$renk_ver2,
"id"=>"113",
"number"=>"".$sayilari_bol[1].""
);

} else if($row2['oddid']==4){

if($sayilari_bol[0]==1 || $sayilari_bol[0]==3 || $sayilari_bol[0]==5 || $sayilari_bol[0]==8 || $sayilari_bol[0]==10 || $sayilari_bol[0]==12|| $sayilari_bol[0]==13|| $sayilari_bol[0]==15|| $sayilari_bol[0]==17|| $sayilari_bol[0]==20|| $sayilari_bol[0]==22 || $sayilari_bol[0]==24|| $sayilari_bol[0]==26|| $sayilari_bol[0]==27|| $sayilari_bol[0]==29|| $sayilari_bol[0]==32|| $sayilari_bol[0]==34|| $sayilari_bol[0]==36|| $sayilari_bol[0]==37|| $sayilari_bol[0]==39|| $sayilari_bol[0]==41){ $renk_ver1 = "yellow"; } else { $renk_ver1 = "black"; }

if($sayilari_bol[1]==1 || $sayilari_bol[1]==3 || $sayilari_bol[1]==5 || $sayilari_bol[1]==8 || $sayilari_bol[1]==10 || $sayilari_bol[1]==12|| $sayilari_bol[1]==13|| $sayilari_bol[1]==15|| $sayilari_bol[1]==17|| $sayilari_bol[1]==20|| $sayilari_bol[1]==22 || $sayilari_bol[1]==24|| $sayilari_bol[1]==26|| $sayilari_bol[1]==27|| $sayilari_bol[1]==29|| $sayilari_bol[1]==32|| $sayilari_bol[1]==34|| $sayilari_bol[1]==36|| $sayilari_bol[1]==37|| $sayilari_bol[1]==39|| $sayilari_bol[1]==41){ $renk_ver2 = "yellow"; } else { $renk_ver2 = "black"; }

if($sayilari_bol[2]==1 || $sayilari_bol[2]==3 || $sayilari_bol[2]==5 || $sayilari_bol[2]==8 || $sayilari_bol[2]==10 || $sayilari_bol[2]==12|| $sayilari_bol[2]==13|| $sayilari_bol[2]==15|| $sayilari_bol[2]==17|| $sayilari_bol[2]==20|| $sayilari_bol[2]==22 || $sayilari_bol[2]==24|| $sayilari_bol[2]==26|| $sayilari_bol[2]==27|| $sayilari_bol[2]==29|| $sayilari_bol[2]==32|| $sayilari_bol[2]==34|| $sayilari_bol[2]==36|| $sayilari_bol[2]==37|| $sayilari_bol[2]==39|| $sayilari_bol[2]==41){ $renk_ver3 = "yellow"; } else { $renk_ver3 = "black"; }

$json_bets_ex[] = array(
"color"=>$renk_ver1,
"id"=>"114",
"number"=>"".$sayilari_bol[0].""
);

$json_bets_ex[] = array(
"color"=>$renk_ver2,
"id"=>"115",
"number"=>"".$sayilari_bol[1].""
);

$json_bets_ex[] = array(
"color"=>$renk_ver3,
"id"=>"116",
"number"=>"".$sayilari_bol[2].""
);

} else if($row2['oddid']==5){

if($sayilari_bol[0]==1 || $sayilari_bol[0]==3 || $sayilari_bol[0]==5 || $sayilari_bol[0]==8 || $sayilari_bol[0]==10 || $sayilari_bol[0]==12|| $sayilari_bol[0]==13|| $sayilari_bol[0]==15|| $sayilari_bol[0]==17|| $sayilari_bol[0]==20|| $sayilari_bol[0]==22 || $sayilari_bol[0]==24|| $sayilari_bol[0]==26|| $sayilari_bol[0]==27|| $sayilari_bol[0]==29|| $sayilari_bol[0]==32|| $sayilari_bol[0]==34|| $sayilari_bol[0]==36|| $sayilari_bol[0]==37|| $sayilari_bol[0]==39|| $sayilari_bol[0]==41){ $renk_ver1 = "yellow"; } else { $renk_ver1 = "black"; }

if($sayilari_bol[1]==1 || $sayilari_bol[1]==3 || $sayilari_bol[1]==5 || $sayilari_bol[1]==8 || $sayilari_bol[1]==10 || $sayilari_bol[1]==12|| $sayilari_bol[1]==13|| $sayilari_bol[1]==15|| $sayilari_bol[1]==17|| $sayilari_bol[1]==20|| $sayilari_bol[1]==22 || $sayilari_bol[1]==24|| $sayilari_bol[1]==26|| $sayilari_bol[1]==27|| $sayilari_bol[1]==29|| $sayilari_bol[1]==32|| $sayilari_bol[1]==34|| $sayilari_bol[1]==36|| $sayilari_bol[1]==37|| $sayilari_bol[1]==39|| $sayilari_bol[1]==41){ $renk_ver2 = "yellow"; } else { $renk_ver2 = "black"; }

if($sayilari_bol[2]==1 || $sayilari_bol[2]==3 || $sayilari_bol[2]==5 || $sayilari_bol[2]==8 || $sayilari_bol[2]==10 || $sayilari_bol[2]==12|| $sayilari_bol[2]==13|| $sayilari_bol[2]==15|| $sayilari_bol[2]==17|| $sayilari_bol[2]==20|| $sayilari_bol[2]==22 || $sayilari_bol[2]==24|| $sayilari_bol[2]==26|| $sayilari_bol[2]==27|| $sayilari_bol[2]==29|| $sayilari_bol[2]==32|| $sayilari_bol[2]==34|| $sayilari_bol[2]==36|| $sayilari_bol[2]==37|| $sayilari_bol[2]==39|| $sayilari_bol[2]==41){ $renk_ver3 = "yellow"; } else { $renk_ver3 = "black"; }

if($sayilari_bol[3]==1 || $sayilari_bol[3]==3 || $sayilari_bol[3]==5 || $sayilari_bol[3]==8 || $sayilari_bol[3]==10 || $sayilari_bol[3]==12|| $sayilari_bol[3]==13|| $sayilari_bol[3]==15|| $sayilari_bol[3]==17|| $sayilari_bol[3]==20|| $sayilari_bol[3]==22 || $sayilari_bol[3]==24|| $sayilari_bol[3]==26|| $sayilari_bol[3]==27|| $sayilari_bol[3]==29|| $sayilari_bol[3]==32|| $sayilari_bol[3]==34|| $sayilari_bol[3]==36|| $sayilari_bol[3]==37|| $sayilari_bol[3]==39|| $sayilari_bol[3]==41){ $renk_ver4 = "yellow"; } else { $renk_ver4 = "black"; }

$json_bets_ex[] = array(
"color"=>$renk_ver1,
"id"=>"117",
"number"=>"".$sayilari_bol[0].""
);

$json_bets_ex[] = array(
"color"=>$renk_ver2,
"id"=>"118",
"number"=>"".$sayilari_bol[1].""
);

$json_bets_ex[] = array(
"color"=>$renk_ver3,
"id"=>"119",
"number"=>"".$sayilari_bol[2].""
);

$json_bets_ex[] = array(
"color"=>$renk_ver4,
"id"=>"120",
"number"=>"".$sayilari_bol[3].""
);

} else if($row2['oddid']==81 || $row2['oddid']==82 || $row2['oddid']==83 || $row2['oddid']==84 || $row2['oddid']==85 || $row2['oddid']==86){

if($sayilari_bol[0]==1 || $sayilari_bol[0]==3 || $sayilari_bol[0]==5 || $sayilari_bol[0]==8 || $sayilari_bol[0]==10 || $sayilari_bol[0]==12|| $sayilari_bol[0]==13|| $sayilari_bol[0]==15|| $sayilari_bol[0]==17|| $sayilari_bol[0]==20|| $sayilari_bol[0]==22 || $sayilari_bol[0]==24|| $sayilari_bol[0]==26|| $sayilari_bol[0]==27|| $sayilari_bol[0]==29|| $sayilari_bol[0]==32|| $sayilari_bol[0]==34|| $sayilari_bol[0]==36|| $sayilari_bol[0]==37|| $sayilari_bol[0]==39|| $sayilari_bol[0]==41){ $renk_ver1 = "yellow"; } else { $renk_ver1 = "black"; }

if($sayilari_bol[1]==1 || $sayilari_bol[1]==3 || $sayilari_bol[1]==5 || $sayilari_bol[1]==8 || $sayilari_bol[1]==10 || $sayilari_bol[1]==12|| $sayilari_bol[1]==13|| $sayilari_bol[1]==15|| $sayilari_bol[1]==17|| $sayilari_bol[1]==20|| $sayilari_bol[1]==22 || $sayilari_bol[1]==24|| $sayilari_bol[1]==26|| $sayilari_bol[1]==27|| $sayilari_bol[1]==29|| $sayilari_bol[1]==32|| $sayilari_bol[1]==34|| $sayilari_bol[1]==36|| $sayilari_bol[1]==37|| $sayilari_bol[1]==39|| $sayilari_bol[1]==41){ $renk_ver2 = "yellow"; } else { $renk_ver2 = "black"; }

if($sayilari_bol[2]==1 || $sayilari_bol[2]==3 || $sayilari_bol[2]==5 || $sayilari_bol[2]==8 || $sayilari_bol[2]==10 || $sayilari_bol[2]==12|| $sayilari_bol[2]==13|| $sayilari_bol[2]==15|| $sayilari_bol[2]==17|| $sayilari_bol[2]==20|| $sayilari_bol[2]==22 || $sayilari_bol[2]==24|| $sayilari_bol[2]==26|| $sayilari_bol[2]==27|| $sayilari_bol[2]==29|| $sayilari_bol[2]==32|| $sayilari_bol[2]==34|| $sayilari_bol[2]==36|| $sayilari_bol[2]==37|| $sayilari_bol[2]==39|| $sayilari_bol[2]==41){ $renk_ver3 = "yellow"; } else { $renk_ver3 = "black"; }

if($sayilari_bol[3]==1 || $sayilari_bol[3]==3 || $sayilari_bol[3]==5 || $sayilari_bol[3]==8 || $sayilari_bol[3]==10 || $sayilari_bol[3]==12|| $sayilari_bol[3]==13|| $sayilari_bol[3]==15|| $sayilari_bol[3]==17|| $sayilari_bol[3]==20|| $sayilari_bol[3]==22 || $sayilari_bol[3]==24|| $sayilari_bol[3]==26|| $sayilari_bol[3]==27|| $sayilari_bol[3]==29|| $sayilari_bol[3]==32|| $sayilari_bol[3]==34|| $sayilari_bol[3]==36|| $sayilari_bol[3]==37|| $sayilari_bol[3]==39|| $sayilari_bol[3]==41){ $renk_ver4 = "yellow"; } else { $renk_ver4 = "black"; }

if($sayilari_bol[4]==1 || $sayilari_bol[4]==3 || $sayilari_bol[4]==5 || $sayilari_bol[4]==8 || $sayilari_bol[4]==10 || $sayilari_bol[4]==12|| $sayilari_bol[4]==13|| $sayilari_bol[4]==15|| $sayilari_bol[4]==17|| $sayilari_bol[4]==20|| $sayilari_bol[4]==22 || $sayilari_bol[4]==24|| $sayilari_bol[4]==26|| $sayilari_bol[4]==27|| $sayilari_bol[4]==29|| $sayilari_bol[4]==32|| $sayilari_bol[4]==34|| $sayilari_bol[4]==36|| $sayilari_bol[4]==37|| $sayilari_bol[4]==39|| $sayilari_bol[4]==41){ $renk_ver5 = "yellow"; } else { $renk_ver5 = "black"; }

if($sayilari_bol[5]==1 || $sayilari_bol[5]==3 || $sayilari_bol[5]==5 || $sayilari_bol[5]==8 || $sayilari_bol[5]==10 || $sayilari_bol[5]==12|| $sayilari_bol[5]==13|| $sayilari_bol[5]==15|| $sayilari_bol[5]==17|| $sayilari_bol[5]==20|| $sayilari_bol[5]==22 || $sayilari_bol[5]==24|| $sayilari_bol[5]==26|| $sayilari_bol[5]==27|| $sayilari_bol[5]==29|| $sayilari_bol[5]==32|| $sayilari_bol[5]==34|| $sayilari_bol[5]==36|| $sayilari_bol[5]==37|| $sayilari_bol[5]==39|| $sayilari_bol[5]==41){ $renk_ver6 = "yellow"; } else { $renk_ver6 = "black"; }

if($sayilari_bol[6]==1 || $sayilari_bol[6]==3 || $sayilari_bol[6]==5 || $sayilari_bol[6]==8 || $sayilari_bol[6]==10 || $sayilari_bol[6]==12|| $sayilari_bol[6]==13|| $sayilari_bol[6]==15|| $sayilari_bol[6]==17|| $sayilari_bol[6]==20|| $sayilari_bol[6]==22 || $sayilari_bol[6]==24|| $sayilari_bol[6]==26|| $sayilari_bol[6]==27|| $sayilari_bol[6]==29|| $sayilari_bol[6]==32|| $sayilari_bol[6]==34|| $sayilari_bol[6]==36|| $sayilari_bol[6]==37|| $sayilari_bol[6]==39|| $sayilari_bol[6]==41){ $renk_ver7 = "yellow"; } else { $renk_ver7 = "black"; }

$json_bets_ex[] = array(
"color"=>$renk_ver1,
"id"=>"121",
"number"=>"".$sayilari_bol[0].""
);

$json_bets_ex[] = array(
"color"=>$renk_ver2,
"id"=>"122",
"number"=>"".$sayilari_bol[1].""
);

$json_bets_ex[] = array(
"color"=>$renk_ver3,
"id"=>"123",
"number"=>"".$sayilari_bol[2].""
);

$json_bets_ex[] = array(
"color"=>$renk_ver4,
"id"=>"124",
"number"=>"".$sayilari_bol[3].""
);

$json_bets_ex[] = array(
"color"=>$renk_ver5,
"id"=>"125",
"number"=>"".$sayilari_bol[4].""
);

$json_bets_ex[] = array(
"color"=>$renk_ver6,
"id"=>"126",
"number"=>"".$sayilari_bol[5].""
);

$json_bets_ex[] = array(
"color"=>$renk_ver7,
"id"=>"127",
"number"=>"".$sayilari_bol[6].""
);

}

}

if($row2['sayi_1']!=''){
$json_bets_sonuc[] = array(
"color"=>"".$row2['sayi_1_renk']."",
"id"=>"19",
"number"=>"".$row2['sayi_1'].""
);
}

if($row2['sayi_2']!=''){
$json_bets_sonuc[] = array(
"color"=>"".$row2['sayi_2_renk']."",
"id"=>"11",
"number"=>"".$row2['sayi_2'].""
);
}

if($row2['sayi_3']!=''){
$json_bets_sonuc[] = array(
"color"=>"".$row2['sayi_3_renk']."",
"id"=>"17",
"number"=>"".$row2['sayi_3'].""
);
}

if($row2['sayi_4']!=''){
$json_bets_sonuc[] = array(
"color"=>"".$row2['sayi_4_renk']."",
"id"=>"36",
"number"=>"".$row2['sayi_4'].""
);
}

if($row2['sayi_5']!=''){
$json_bets_sonuc[] = array(
"color"=>"".$row2['sayi_5_renk']."",
"id"=>"21",
"number"=>"".$row2['sayi_5'].""
);
}

if($row2['sayi_6']!=''){
$json_bets_sonuc[] = array(
"color"=>"".$row2['sayi_6_renk']."",
"id"=>"29",
"number"=>"".$row2['sayi_6'].""
);
}

if($row2['sayi_7']!=''){
$json_bets_sonuc[] = array(
"color"=>"".$row2['sayi_7_renk']."",
"id"=>"29",
"number"=>"".$row2['sayi_7'].""
);
}

if($row2['sayi_1']!=''){
$json_bets_icerik[$row2['roundid']] = array(
"bahiskodu"=>"".$row2['roundid']."",
"canli"=>"1",
"orankodu"=>"".$row2['oddid']."",
"oyunkodu"=>"1",
"oran"=>"".nf($row2['oran'])."",
"bahis"=>"".$row2['secenek']."",
"spid"=>"",
"oyunad"=>"Sayısal Loto 7",
"tercih"=>"".$row2['secenek']."",
"oyunkad"=>"Sayısal Loto 7",
"ktercih"=>"".$row2['secenek']."",
"idcol"=>"".$row2['grupid']."",
"onstatu"=>"active",
"acikkart"=>0,
"statu"=>"".$kazanma_ver2."",
"itemsCount"=>"".$kac_sayi_var."",
"suits"=>$suits_ver,
"radarid"=>"",
"ex"=>$json_bets_ex,
"bsaati"=>"".$row2['ilkgiris']."",
"bttimes"=>"".date("d-m H:i",$row2['ilkgiris'])."",
"videourl"=>"".$row2['video']."",
"sonuc"=>$json_bets_sonuc,
"zaman"=>"".$row['kupon_time'].""
);
} else {
$json_bets_icerik[$row2['roundid']] = array(
"bahiskodu"=>"".$row2['roundid']."",
"canli"=>"1",
"orankodu"=>"".$row2['oddid']."",
"oyunkodu"=>"1",
"oran"=>"".nf($row2['oran'])."",
"bahis"=>"".$row2['secenek']."",
"spid"=>"",
"oyunad"=>"Sayısal Loto 7",
"tercih"=>"".$row2['secenek']."",
"oyunkad"=>"Sayısal Loto 7",
"ktercih"=>"".$row2['secenek']."",
"idcol"=>"".$row2['grupid']."",
"onstatu"=>"active",
"acikkart"=>0,
"statu"=>"".$kazanma_ver2."",
"itemsCount"=>"".$kac_sayi_var."",
"suits"=>$suits_ver,
"radarid"=>"",
"ex"=>$json_bets_ex,
"bsaati"=>"".$row2['ilkgiris']."",
"bttimes"=>"".date("d-m H:i",$row2['ilkgiris'])."",
"zaman"=>"".$row['kupon_time'].""
);
}

}

return $json_bets_icerik;
}
## fonksiyon kupon_icerik_getir ##
$tarih1 = $_POST['date'];

$durum = $_POST['statu'];

if($durum=="3") { $durum_ekle = "and durum='1'"; } else if($durum=="1") { $durum_ekle = "and durum='2'"; } else if($durum=="2") { $durum_ekle = "and durum='3'"; } else { $durum_ekle = "";	}

$sqladder = "and casino='1' and user_id='$ub[id]' and kupon_tarihi_belirle='$tarih1' $durum_ekle and hesap_kesim_zaman=''";

$sor = sed_sql_query("select * from kuponlar where id!='' $sqladder order by id desc");
$sayi_ver = 0;
while($row=sed_sql_fetcharray($sor)) {
$sayi_ver++;
if($row['durum']==1){
$kazanma_ver = 0;
} else if($row['durum']==2){
$kazanma_ver = 1;
} else if($row['durum']==3){
$kazanma_ver = 2;
} else if($row['durum']==4){
$kazanma_ver = 3;
}

$json_bets[$sayi_ver] = array(
"bets"=>kupon_icerik_getir($row['id']),
"kid"=>"".$row['id']."",
"amount"=>"".nf($row['yatan'])."",
"win"=>"".nf($row['tutar'])."",
"statu"=>"".$kazanma_ver."",
"date"=>"".date("H:i",$row['kupon_time']).""
);

}

$json = array(
"success"=>"true",
"bets"=>$json_bets
);

echo json_encode($json);

}


if($a=="kupondsanal") {

$id = gd("id");

$kb = bilgi("select * from kuponlar where id='$id'");

$ouseri = bilgi("select * from kullanici where id='$kb[user_id]'");

if($ouseri['wkdurum']=="1") { $ouseri_ust = bilgi("select * from kullanici where id='$ouseri[hesap_sahibi_id]'"); }

$bayilerim = benimbayilerim($ub['id']);

$bayiler_arr = explode(",",$bayilerim);

if(!in_array($kb['user_id'],$bayiler_arr)) { die("#404"); }

?>

<div id="cboxWrapper" style="height: 400px; width: 993px;">
<div>
<div id="cboxTopLeft" style="float: left;"></div>
<div id="cboxTopCenter" style="float: left; width: 951px;"></div>
<div id="cboxTopRight" style="float: left;"></div>
</div>
<div style="clear: left;">
<div id="cboxMiddleLeft" style="float: left; height: 360px;"></div>
<div id="cboxContent" style="float: left; width: 975px; height: 391px;">
<div id="cboxLoadedContent" style="width: 976px; overflow: auto; height: 362px;">
<table class="tablesorter" id="TdaHS54" style="width:99.9%;">
<thead>
<tr>
<th><?=getTranslation('sanalmaclaricin236')?></th>
<th style="text-align:left;"><?=getTranslation('sanalmaclaricin237')?></th>
<th><?=getTranslation('sanalmaclaricin238')?></th>
<th><?=getTranslation('sanalmaclaricin239')?></th>
<th><?=getTranslation('sanalmaclaricin240')?></th>
<th><?=getTranslation('sanalmaclaricin241')?></th>
<th><?=getTranslation('sanalmaclaricin242')?></th>
<th><?=getTranslation('sanalmaclaricin243')?></th>
</tr>
</thead>
<tbody>

<?php

function yuzdes($str) {

if(strlen($str)==1) { $yuzdedondur = "0.0".$str.""; } else

if(strlen($str)==2) { $yuzdedondur = "0.".$str.""; }

return $yuzdedondur;

}

$sor = sed_sql_query("select * from kupon_ic_sanal where kupon_id='$id'");

while($row=sed_sql_fetcharray($sor)) {

if($row['oran_tip']=="Maç Sonucu"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin185')."";
} else if($row['oran_tip']=="Handikap (0:1)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin186')."";
} else if($row['oran_tip']=="Handikap (1:0)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin187')."";
} else if($row['oran_tip']=="Handikap (0:2)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin188')."";
} else if($row['oran_tip']=="Handikap (2:0)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin189')."";
} else if($row['oran_tip']=="Çifte Şans"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin190')."";
} else if($row['oran_tip']=="İlk Gol"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin191')."";
} else if($row['oran_tip']=="İki Takımda Gol atar"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin192')."";
} else if($row['oran_tip']=="Beraberlik-Bahis Yok"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin193')."";
} else if($row['oran_tip']=="Toplam Gol Tek/Çift"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin194')."";
} else if($row['oran_tip']=="En çok skor olacak yarı"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin195')."";
} else if($row['oran_tip']=="İlk yarı sonu"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin196')."";
} else if($row['oran_tip']=="İlk Yarı Çifte Şans"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin197')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Gol (0.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin198')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Gol (1.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin199')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Gol (2.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin200')."";
} else if($row['oran_tip']=="Toplam Gol (1.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin201')."";
} else if($row['oran_tip']=="Toplam Gol (2.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin202')."";
} else if($row['oran_tip']=="Toplam Gol (3.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin203')."";
} else if($row['oran_tip']=="Ev sahibi takım toplam gol (0.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin204')."";
} else if($row['oran_tip']=="Ev sahibi takım toplam gol (1.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin205')."";
} else if($row['oran_tip']=="Ev sahibi takım toplam gol (2.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin206')."";
} else if($row['oran_tip']=="Deplasman takımı toplam gol (0.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin207')."";
} else if($row['oran_tip']=="Deplasman takımı toplam gol (1.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin208')."";
} else if($row['oran_tip']=="Deplasman takımı toplam gol (2.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin209')."";
} else if($row['oran_tip']=="Ev sahibi takım gol sayısı"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin210')."";
} else if($row['oran_tip']=="Deplasman takımı gol sayısı"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin211')."";
} else if($row['oran_tip']=="İlk Yarı/Maç Sonucu"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin212')."";
} else if($row['oran_tip']=="Gol atacak takımlar"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin213')."";
} else if($row['oran_tip']=="Maç Sonucu ve Toplam Gol (1.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin214')."";
} else if($row['oran_tip']=="Maç Sonucu ve Toplam Gol (2.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin215')."";
} else if($row['oran_tip']=="Toplam Gol Sayısı"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin216')."";
} else if($row['oran_tip']=="Kesin Skor"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin217')."";
} else if($row['oran_tip']=="Maç Kazananı"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin22')."";
} else if($row['oran_tip']=="İlk Yarı Kazananı"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin23')."";
} else if($row['oran_tip']=="En Çok Sayı Yapılan Çeyrek"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin24')."";
} else if($row['oran_tip']=="Toplam Sayı (180.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin30')."";
} else if($row['oran_tip']=="Toplam Sayı (181.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin31')."";
} else if($row['oran_tip']=="Toplam Sayı (182.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin32')."";
} else if($row['oran_tip']=="Toplam Sayı (183.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin33')."";
} else if($row['oran_tip']=="Toplam Sayı (184.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin34')."";
} else if($row['oran_tip']=="Toplam Sayı (185.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin35')."";
} else if($row['oran_tip']=="Toplam Sayı (186.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin36')."";
} else if($row['oran_tip']=="Toplam Sayı (187.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin37')."";
} else if($row['oran_tip']=="Toplam Sayı (188.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin38')."";
} else if($row['oran_tip']=="Toplam Sayı (189.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin39')."";
} else if($row['oran_tip']=="Handikap (+1.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin40')."";
} else if($row['oran_tip']=="Handikap (+2.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin41')."";
} else if($row['oran_tip']=="Handikap (+3.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin42')."";
} else if($row['oran_tip']=="Handikap (+4.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin43')."";
} else if($row['oran_tip']=="Handikap (+5.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin44')."";
} else if($row['oran_tip']=="Handikap (+6.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin45')."";
} else if($row['oran_tip']=="Handikap (+7.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin46')."";
} else if($row['oran_tip']=="Handikap (+8.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin47')."";
} else if($row['oran_tip']=="Handikap (+9.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin48')."";
} else if($row['oran_tip']=="Handikap (+10.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin49')."";
} else if($row['oran_tip']=="Handikap (+11.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin50')."";
} else if($row['oran_tip']=="Handikap (+12.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin51')."";
} else if($row['oran_tip']=="Handikap (+13.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin52')."";
} else if($row['oran_tip']=="Handikap (+14.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin53')."";
} else if($row['oran_tip']=="Handikap (+15.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin54')."";
} else if($row['oran_tip']=="Handikap (+16.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin55')."";
} else if($row['oran_tip']=="Handikap (+17.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin56')."";
} else if($row['oran_tip']=="Handikap (+18.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin57')."";
} else if($row['oran_tip']=="Handikap (+19.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin58')."";
} else if($row['oran_tip']=="Handikap (-1.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin59')."";
} else if($row['oran_tip']=="Handikap (-2.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin60')."";
} else if($row['oran_tip']=="Handikap (-3.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin61')."";
} else if($row['oran_tip']=="Handikap (-4.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin62')."";
} else if($row['oran_tip']=="Handikap (-5.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin63')."";
} else if($row['oran_tip']=="Handikap (-6.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin64')."";
} else if($row['oran_tip']=="Handikap (-7.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin65')."";
} else if($row['oran_tip']=="Handikap (-8.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin66')."";
} else if($row['oran_tip']=="Handikap (-9.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin67')."";
} else if($row['oran_tip']=="Handikap (-10.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin68')."";
} else if($row['oran_tip']=="Handikap (-11.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin69')."";
} else if($row['oran_tip']=="Handikap (-12.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin70')."";
} else if($row['oran_tip']=="Handikap (-13.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin71')."";
} else if($row['oran_tip']=="Handikap (-14.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin72')."";
} else if($row['oran_tip']=="Handikap (-15.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin73')."";
} else if($row['oran_tip']=="Handikap (-16.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin74')."";
} else if($row['oran_tip']=="Handikap (-17.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin75')."";
} else if($row['oran_tip']=="Handikap (-18.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin76')."";
} else if($row['oran_tip']=="Handikap (-19.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin77')."";
} else if($row['oran_tip']=="X'e İlk Kim Ulaşır (20)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin78')."";
} else if($row['oran_tip']=="X'e İlk Kim Ulaşır (40)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin79')."";
} else if($row['oran_tip']=="X'e İlk Kim Ulaşır (60)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin80')."";
} else if($row['oran_tip']=="Kazanma Aralığı (İlk Yarı)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin81')."";
} else if($row['oran_tip']=="Kazanma Aralığı (Uzatmalar Dahil)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin82')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (80.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin83')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (81.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin84')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (82.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin85')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (83.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin86')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (84.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin87')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (85.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin88')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (86.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin89')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (87.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin90')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (88.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin91')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (89.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin92')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (90.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin93')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (91.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin94')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (92.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin95')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (93.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin96')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (94.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin97')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (95.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin98')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (96.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin99')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (97.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin100')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (98.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin101')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (99.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin102')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (80.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin103')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (81.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin104')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (82.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin105')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (83.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin106')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (84.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin107')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (85.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin108')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (86.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin109')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (87.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin110')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (88.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin111')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (89.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin112')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (90.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin113')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (91.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin114')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (92.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin115')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (93.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin116')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (94.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin117')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (95.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin118')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (96.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin119')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (97.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin120')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (98.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin121')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (99.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin122')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+0.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin123')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+1.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin124')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+2.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin125')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+3.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin126')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+4.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin127')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+5.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin128')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+6.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin129')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+7.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin130')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+8.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin131')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+9.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin132')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+10.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin133')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+11.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin134')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+12.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin135')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+13.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin136')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+14.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin137')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+15.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin138')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+16.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin139')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+17.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin140')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+18.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin141')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+19.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin142')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+20.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin143')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-0.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin144')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-1.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin145')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-2.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin146')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-3.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin147')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-4.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin148')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-5.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin149')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-6.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin150')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-7.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin151')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-8.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin152')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-9.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin153')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-10.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin154')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-11.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin155')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-12.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin156')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-13.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin157')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-14.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin158')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-15.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin159')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-16.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin160')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-17.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin161')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-18.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin162')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-19.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin163')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-20.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin164')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (80.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin165')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (81.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin166')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (82.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin167')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (83.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin168')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (84.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin169')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (85.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin170')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (86.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin171')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (87.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin172')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (88.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin173')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (89.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin174')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (90.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin175')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (91.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin176')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (92.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin177')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (93.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin178')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (94.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin179')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (95.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin180')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (96.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin181')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (97.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin182')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (98.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin183')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (99.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin184')."";
} else if($row['oran_tip']=="Sıralı İkili"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin13')."";
} else if($row['oran_tip']=="Sırasız İkili"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin14')."";
} else if($row['oran_tip']=="Sıralı Üçlü"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin15')."";
} else if($row['oran_tip']=="Sırasız Üçlü"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin16')."";
} else if($row['oran_tip']=="Kazanır"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin17')."";
} else if($row['oran_tip']=="İlk İkiye Girer"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin18')."";
} else if($row['oran_tip']=="İlk Üçe Girer"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin19')."";
} else if($row['oran_tip']=="Evet"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin20')."";
} else if($row['oran_tip']=="Hayır"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin21')."";
} else {
	$tipismi_ver = $row['oran_tip'];
}

if($row['oran_val']=="Her ikisi de"){
	$valismi_ver = "".getTranslation('sanalmaclaricin218')."";
} else if($row['oran_val']=="Sadece ev sahibi takım"){
	$valismi_ver = "".getTranslation('sanalmaclaricin219')."";
} else if($row['oran_val']=="Sadece deplasman takımı"){
	$valismi_ver = "".getTranslation('sanalmaclaricin220')."";
} else if($row['oran_val']=="Hiçbiri"){
	$valismi_ver = "".getTranslation('sanalmaclaricin221')."";
} else if($row['oran_val']=="1 ve A"){
	$valismi_ver = "".getTranslation('sanalmaclaricin222')."";
} else if($row['oran_val']=="1 ve Ü"){
	$valismi_ver = "".getTranslation('sanalmaclaricin223')."";
} else if($row['oran_val']=="X ve A"){
	$valismi_ver = "".getTranslation('sanalmaclaricin224')."";
} else if($row['oran_val']=="X ve Ü"){
	$valismi_ver = "".getTranslation('sanalmaclaricin225')."";
} else if($row['oran_val']=="2 ve A"){
	$valismi_ver = "".getTranslation('sanalmaclaricin226')."";
} else if($row['oran_val']=="2 ve Ü"){
	$valismi_ver = "".getTranslation('sanalmaclaricin227')."";
} else if($row['oran_val']=="Diğer"){
	$valismi_ver = "".getTranslation('sanalmaclaricin228')."";
} else if($row['oran_val']=="HT 11+"){
	$valismi_ver = "".getTranslation('sanalmaclaricin229')."";
} else if($row['oran_val']=="HT 6-10"){
	$valismi_ver = "".getTranslation('sanalmaclaricin230')."";
} else if($row['oran_val']=="HT 1-5"){
	$valismi_ver = "".getTranslation('sanalmaclaricin231')."";
} else if($row['oran_val']=="AT 11+"){
	$valismi_ver = "".getTranslation('sanalmaclaricin232')."";
} else if($row['oran_val']=="AT 6-10"){
	$valismi_ver = "".getTranslation('sanalmaclaricin233')."";
} else if($row['oran_val']=="AT 1-5"){
	$valismi_ver = "".getTranslation('sanalmaclaricin234')."";
} else if($row['oran_val']=="1. Çeyrek"){
	$valismi_ver = "".getTranslation('devreler13')."";
} else if($row['oran_val']=="2. Çeyrek"){
	$valismi_ver = "".getTranslation('devreler15')."";
} else if($row['oran_val']=="3. Çeyrek"){
	$valismi_ver = "".getTranslation('devreler17')."";
} else if($row['oran_val']=="4. Çeyrek"){
	$valismi_ver = "".getTranslation('devreler19')."";
} else if($row['oran_val']=="Eşit"){
	$valismi_ver = "".getTranslation('oransecenek61')."";
} else if($row['oran_val']=="u"){ 
	$valismi_ver = "".getTranslation('oransecenek31')."";
} else if($row['oran_val']=="o"){ 
	$valismi_ver = "".getTranslation('oransecenek30')."";
} else if($row['oran_val']=="Alt"){ 
	$valismi_ver = "".getTranslation('oransecenek31')."";
} else if($row['oran_val']=="Üst"){ 
	$valismi_ver = "".getTranslation('oransecenek30')."";
} else if($row['oran_val']=="Evet"){
	$valismi_ver = "".getTranslation('oransecenek23')."";
} else if($row['oran_val']=="Hayır"){
	$valismi_ver = "".getTranslation('oransecenek24')."";
} else if($row['oran_val']=="Tek"){
	$valismi_ver = "".getTranslation('oransecenek28')."";
} else if($row['oran_val']=="Çift"){
	$valismi_ver = "".getTranslation('oransecenek29')."";
} else if($row['oran_val']=="İlk Yarı"){
	$valismi_ver = "".getTranslation('canlianlatimjs9')."";
} else if($row['oran_val']=="İkinci Yarı"){
	$valismi_ver = "".getTranslation('canlianlatimjs11')."";
} else if($row['oran_val']=="Ev Sahibi"){
	$valismi_ver = "".getTranslation('canlioransecenek7')."";
} else if($row['oran_val']=="Deplasman"){
	$valismi_ver = "".getTranslation('canlioransecenek8')."";
} else {
	$valismi_ver = $row['oran_val'];
}

?>

<tr class="itext-<?php if($row['kazanma']=="1") { echo "3"; } else if($row['kazanma']=="2") { echo "1"; } else if($row['kazanma']=="3") { echo "2"; } else if($row['kazanma']=="4") { echo "4"; } ?> c">
<td style="text-align:center;">
<?php if($row['spor_tip']=="vflm_v2") { ?><?=getTranslation('sanalmaclaricin2')?>
<?php } else if($row['spor_tip']=="vfct_v2") { ?><?=getTranslation('sanalmaclaricin3')?>
<?php } else if($row['spor_tip']=="vfcc_v2") { ?><?=getTranslation('sanalmaclaricin4')?>
<?php } else if($row['spor_tip']=="vfwc_v2") { ?><?=getTranslation('sanalmaclaricin5')?>
<?php } else if($row['spor_tip']=="vfec_v2") { ?><?=getTranslation('sanalmaclaricin6')?>
<?php } else if($row['spor_tip']=="vbl_v2") { ?><?=getTranslation('sanalmaclaricin7')?>
<?php } else if($row['spor_tip']=="vhc_v2") { ?><?=getTranslation('sanalmaclaricin8')?>
<?php } else if($row['spor_tip']=="vdr_v2") { ?><?=getTranslation('sanalmaclaricin9')?>
<?php } ?>
</td>
<td style="cursor: pointer;"><?=$row['ev_takim']; ?>&nbsp;-&nbsp;<?=$row['konuk_takim']; ?></td>
<td style="text-align:center;"><?=$tipismi_ver; ?></td>
<td style="text-align:center;"><?=$valismi_ver; ?></td>
<td style="text-align:center;"><? $oranes = nf($row['oran']); echo $oranes; ?></td>

<td style="text-align:center;"><?php if($row['kazanma']!="1") { ?><?php if($row['spor_tip']=="vdr_v2" || $row['spor_tip']=="vhc_v2"){ ?><?=getTranslation('mobilsonuclar')?><?php } else { ?>( <?=$row['iy_ev'];?> - <?=$row['iy_dep'];?> ) <?=$row['ms_ev'];?> - <?=$row['ms_dep'];?><?php } ?>&nbsp;&nbsp;&nbsp;<img onclick="openlivedetails(<?=$row['id'];?>);" style="width: 16px;" src="/players/img/arrowdown.png"><?php } else { ?><?=getTranslation('sanalmaclaricin244')?><?php } ?></td>

<td style="text-align:center;"><?php if($row['kazanma']=="1") { ?><?=getTranslation('ajaxtumkuponlarim4')?><?php } else if($row['kazanma']=="2") { ?><?=getTranslation('ajaxtumkuponlarim2')?><?php } else if($row['kazanma']=="3") { ?><?=getTranslation('ajaxtumkuponlarim3')?><?php } else if($row['kazanma']=="4") { ?><?=getTranslation('ajaxtumkuponlarim5')?><?php } ?></td>

<td style="text-align:center;"><?=date('Y-m-d H:i:s',$row['mac_time']);?></td>

</tr>

<tr id="ticdet_<?=$row['id']; ?>" style="display: none;">
<?php if($row['spor_tip']=="vflm_v2" || $row['spor_tip']=="vfct_v2" || $row['spor_tip']=="vfcc_v2" || $row['spor_tip']=="vfwc_v2" || $row['spor_tip']=="vfec_v2") { ?>
<td colspan="12"><span style="display: block;text-align: center;"><b><?=getTranslation('sanalmaclaricin245')?> : <?php if($row['birincigol']=="1"){ ?> <?=getTranslation('ajaxkupond50')?> <?php } else if($row['birincigol']=="2"){ ?> <?=getTranslation('ajaxkupond51')?> <?php } else { ?> <?=getTranslation('sanalmaclaricin246')?> <?php } ?></b><br></span></td>
<?php } else if($row['spor_tip']=="vbl_v2") { ?>
<?php
$set_1_bulma = explode(' - ',$row['set_1']);
$set_2_bulma = explode(' - ',$row['set_2']);
$set_3_bulma = explode(' - ',$row['set_3']);
$set_4_bulma = explode(' - ',$row['set_4']);
$set_5_bulma = explode(' - ',$row['set_5']);
?>
<td colspan="12">
<span style="display: block;width: <?php if($set_5_bulma[0]+$set_5_bulma[1]>0) { ?>20%<?php } else { ?>25%<?php } ?>;float: left;text-align: center;"><b><?=getTranslation('ajaxkupond52')?></b><br><?=getTranslation('ajaxkupond50')?> ( <font style="color:#f00;font-weight: bold;"><?=$set_1_bulma[0];?></font> )<br><?=getTranslation('ajaxkupond51')?> ( <font style="color:#f00;font-weight: bold;"><?=$set_1_bulma[1];?></font> )<br></span>
<span style="display: block;width: <?php if($set_5_bulma[0]+$set_5_bulma[1]>0) { ?>20%<?php } else { ?>25%<?php } ?>;float: left;text-align: center;"><b><?=getTranslation('ajaxkupond53')?></b><br><?=getTranslation('ajaxkupond50')?> ( <font style="color:#f00;font-weight: bold;"><?=$set_2_bulma[0];?></font> )<br><?=getTranslation('ajaxkupond51')?> ( <font style="color:#f00;font-weight: bold;"><?=$set_2_bulma[1];?></font> )<br></span>
<span style="display: block;width: <?php if($set_5_bulma[0]+$set_5_bulma[1]>0) { ?>20%<?php } else { ?>25%<?php } ?>;float: left;text-align: center;"><b><?=getTranslation('ajaxkupond54')?></b><br><?=getTranslation('ajaxkupond50')?> ( <font style="color:#f00;font-weight: bold;"><?=$set_3_bulma[0];?></font> )<br><?=getTranslation('ajaxkupond51')?> ( <font style="color:#f00;font-weight: bold;"><?=$set_3_bulma[1];?></font> )<br></span>
<span style="display: block;width: <?php if($set_5_bulma[0]+$set_5_bulma[1]>0) { ?>20%<?php } else { ?>25%<?php } ?>;float: left;text-align: center;"><b><?=getTranslation('ajaxkupond55')?></b><br><?=getTranslation('ajaxkupond50')?> ( <font style="color:#f00;font-weight: bold;"><?=$set_4_bulma[0];?></font> )<br><?=getTranslation('ajaxkupond51')?> ( <font style="color:#f00;font-weight: bold;"><?=$set_4_bulma[1];?></font> )<br></span>
<?php if($set_5_bulma[0]+$set_5_bulma[1]>0) { ?>
<span style="display: block;width: 20%;float: left;text-align: center;"><b><?=getTranslation('ajaxkupond56')?></b><br><?=getTranslation('ajaxkupond50')?> ( <font style="color:#f00;font-weight: bold;"><?=$set_5_bulma[0];?></font> )<br><?=getTranslation('ajaxkupond51')?> ( <font style="color:#f00;font-weight: bold;"><?=$set_5_bulma[1];?></font> )<br></span>
</td>
<?php } ?>
<?php } else if($row['spor_tip']=="vhc_v2") { ?>
<td colspan="12">
<span style="display: block;text-align: left;"><b>1.<?=getTranslation('sanalmaclaricin247')?> : <?=$row['at_1'];?> - <?=$row['at_1_isim'];?> - <?=$row['at_1_joker'];?></b><br></span>
<span style="display: block;text-align: left;"><b>2.<?=getTranslation('sanalmaclaricin247')?> : <?=$row['at_2'];?> - <?=$row['at_2_isim'];?> - <?=$row['at_2_joker'];?></b><br></span>
<span style="display: block;text-align: left;"><b>3.<?=getTranslation('sanalmaclaricin247')?> : <?=$row['at_3'];?> - <?=$row['at_3_isim'];?> - <?=$row['at_3_joker'];?></b><br></span>
</td>
<?php } else if($row['spor_tip']=="vdr_v2") { ?>
<td colspan="12">
<span style="display: block;text-align: left;"><b>1.<?=getTranslation('sanalmaclaricin248')?> : <?=$row['at_1'];?> - <?=$row['at_1_joker'];?></b><br></span>
<span style="display: block;text-align: left;"><b>2.<?=getTranslation('sanalmaclaricin248')?> : <?=$row['at_2'];?> - <?=$row['at_2_joker'];?></b><br></span>
<span style="display: block;text-align: left;"><b>3.<?=getTranslation('sanalmaclaricin248')?> : <?=$row['at_3'];?> - <?=$row['at_3_joker'];?></b><br></span>
</td>
<?php } ?>
</tr>

<?php } ?>


<tr>
<td colspan="16">
<table class="tablesorter">
<tbody>
<tr>
<td><?=getTranslation('ajaxkupond68')?></td>
<td><strong><?=nf($kb['yatan']); ?></strong></td>
<td><?=getTranslation('ajaxkupond69')?></td>
<td><strong><?=nf($kb['oran']); ?></strong></td>
<td><?=getTranslation('ajaxkupond70')?></td>
<td><strong><?=nf($kb['tutar']); ?></strong></td>
<td><?=getTranslation('ajaxkupond71')?></td>
<td><strong><?=durumnedir($kb['durum']); ?></strong></td>


<?php if($ouseri['kazananyuzde']!="0" || $ouseri['kazananyuzde']!=""  || $ouseri_ust['kazananyuzde']!="0" || $ouseri_ust['kazananyuzde']!="") { 


if($ouseri['wkdurum']=="1") {
$yuzdesi = yuzdes($ouseri_ust['kazananyuzde']); 
} else {
$yuzdesi = yuzdes($ouseri['kazananyuzde']); 
}

$kesinti = $kb['tutar']*$yuzdesi;

$gercektutar = $kb['tutar']-$kesinti;

?>

<td><?=getTranslation('ajaxkupond72')?></td>
<td><strong><?=nf($kesinti);?></strong></td>

<td><?=getTranslation('ajaxkupond73')?></td>
<td><strong><?=nf($gercektutar);?></strong></td>

<?php } ?>


</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td colspan="12">
<div class="notice info">
<p><strong><?=getTranslation('ajaxkupond74')?>:</strong><?=date("d-m-Y H:i:s",$kb['kupon_time']); ?> <strong><?=getTranslation('ajaxkupond75')?>:</strong><?=$kb['ipadres'];?> <strong><?=getTranslation('ajaxkupond76')?>:</strong> <?=$kb['kupon_nots']; ?> <?php if($kb['durum']==4){ ?> / <strong><?=getTranslation('yeniyerler_kasa455')?> : <?=$kb['iptalusername']; ?> ( <?=getTranslation('ajaxkupond75')?> : <?=$kb['iptalipadres']; ?> )</strong><?php } ?></p>
</div>
</td>
</tr>


</tbody>
</table>
</div>
<div id="cboxLoadingOverlay" style="float: left; display: none;"></div>
<div id="cboxLoadingGraphic" style="float: left; display: none;"></div>
<div id="cboxTitle" style="float: left; display: block;"><?=$id;?> <?=getTranslation('ajaxkupond77')?></div>
<div id="cboxCurrent" style="float: left; display: none;"></div>
<div id="cboxNext" style="float: left; display: none;"></div>
<div id="cboxPrevious" style="float: left; display: none;"></div>
<div id="cboxSlideshow" style="float: left; display: none;"></div>
<div id="cboxClose" style="float: left;" onclick="kuponkapat();"></div>
</div>
<div id="cboxMiddleRight" style="float: left; height: 360px;"></div>
</div>
<div style="clear: left;">
<div id="cboxBottomLeft" style="float: left;"></div>
<div id="cboxBottomCenter" style="float: left; width: 951px;"></div>
<div id="cboxBottomRight" style="float: left;"></div>
</div>
</div>

<script>
function openlivedetails(x) { $( "#ticdet_"+x ).toggle(); }
</script>

<?php }

if($a=="kupond") {

$id = gd("id");

$kb = bilgi("select * from kuponlar where id='$id'");

$ouseri = bilgi("select * from kullanici where id='$kb[user_id]'");

if($ouseri['wkdurum']=="1") { $ouseri_ust = bilgi("select * from kullanici where id='$ouseri[hesap_sahibi_id]'"); }

$bayilerim = benimbayilerim($ub['id']);

$bayiler_arr = explode(",",$bayilerim);

if(!in_array($kb['user_id'],$bayiler_arr)) { die("#404"); }



?>

<div id="cboxWrapper" style="height: 400px; width: 993px;">
<div>
<div id="cboxTopLeft" style="float: left;"></div>
<div id="cboxTopCenter" style="float: left; width: 951px;"></div>
<div id="cboxTopRight" style="float: left;"></div>
</div>
<div style="clear: left;">
<div id="cboxMiddleLeft" style="float: left; height: 360px;"></div>
<div id="cboxContent" style="float: left; width: 975px; height: 391px;">
<div id="cboxLoadedContent" style="width: 976px; overflow: auto; height: 362px;">
<table class="tablesorter" id="TdaHS54" style="width:99.9%;">
<thead>
<tr>
<th></th>
<th><?=getTranslation('ajaxkupond1')?></th>
<th><?=getTranslation('ajaxkupond2')?></th>
<th><?=getTranslation('ajaxkupond3')?></th>
<th><?=getTranslation('ajaxkupond4')?></th>
<th><?=getTranslation('ajaxkupond5')?></th>
<th><?=getTranslation('ajaxkupond6')?></th>
<th><?=getTranslation('ajaxkupond7')?></th>
<th><?=getTranslation('ajaxkupond8')?></th>
<th><?=getTranslation('ajaxkupond9')?></th>
<th><?=getTranslation('ajaxkupond10')?></th>
</tr>
</thead>
<tbody>

<?php

function yuzdes($str) {

if(strlen($str)==1) { $yuzdedondur = "0.0".$str.""; } else

if(strlen($str)==2) { $yuzdedondur = "0.".$str.""; }

return $yuzdedondur;

}

$fark_kupon_icin = time()-120;

$sor = sed_sql_query("select * from kupon_ic where kupon_id='$id'");

while($row=sed_sql_fetcharray($sor)) { 

$ob = explode("|",$row['oran_tip']);
$secim_yapimi = $ob[0];
$secim_yapimi2 = $ob[1];

if($row['spor_tip']=="canli") {

$zaman = date("d-m-Y H:i",$row['mac_time']);	

$infobol = explode("|",$row['canli_info']);

$canlizaman = "$infobol[0] <strong>($infobol[1])</strong>";



$canlibilgi = sed_sql_query("select * from canli_maclar where id='$row[mac_db_id]' and devre!='Bitti'");

if(sed_sql_numrows($canlibilgi)>0) {

$bilgisi = sed_sql_fetcharray($canlibilgi);	

$iy = "$bilgisi[iy_ev]-$bilgisi[iy_konuk]";

$iy2 = "$bilgisi[iy_ev]-$bilgisi[iy_konuk]";

$ms = "$bilgisi[ev_skor]-$bilgisi[konuk_skor]";

$ms2 = "$bilgisi[ev_skor]-$bilgisi[konuk_skor]";

if($bilgisi['devre']=="İlk Yarı"){
	$sonuc_versene = $iy;
} else {
	$sonuc_versene = "( ".$iy." )".$ms2." <img onclick='openlivedetails(".$row['id'].");' style='width: 16px;' src='/players/img/arrowdown.png'>";
}

$farki = time()-120;

if($bilgisi['songuncelleme']<$farki) {

$macsonucu = "".getTranslation('ajaxkupond13').""; 
$iys = "$bilgisi[iy_ev]-$bilgisi[iy_konuk]";
$mss = "$bilgisi[ev_skor]-$bilgisi[konuk_skor]";
//sed_sql_query("update kupon_ic set iy='$iy2',ms='$ms2' where mac_db_id='$row[mac_db_id]'");
} else

if($bilgisi['devremi']=="1") {

$macsonucu = "".getTranslation('ajaxkupond14').""; } else 

if($bilgisi['gelecek']=="1") {

$macsonucu = "".getTranslation('ajaxkupond15').""; } else

{

$macsonucu = "".getTranslation('ajaxkupond11')." <strong>($bilgisi[dakika] <img src=/img/live.gif />)</strong>";

}

} else { 

$sonuc_versene = "".$row['iy']." / ".$row['ms']." <img onclick='openlivedetails(".$row['id'].");' style='width: 16px;' src='/players/img/arrowdown.png'>";

$macsonucu = "";

}

$canlimi = '<td style="text-align:center;" class="itext-1">'.getTranslation('ajaxkupond12').'</td>';

} else if($row['spor_tip']=="canlib") {

$zaman = date("d-m-Y H:i",$row['mac_time']);	

$infobol = explode("|",$row['canli_info']);

$canlizaman = "$infobol[0] <strong>($infobol[1])</strong>";

$canlibilgi = sed_sql_query("select * from basketbol_canli_maclar where id='$row[mac_db_id]'");

if(sed_sql_numrows($canlibilgi)>0) {

$bilgisi = sed_sql_fetcharray($canlibilgi);	

$birinci_ceyrek_bol_kupon = explode(" - ",$bilgisi['bir_period_skor']);
$ikinci_ceyrek_bol_kupon = explode(" - ",$bilgisi['iki_period_skor']);
$ucuncu_ceyrek_bol_kupon = explode(" - ",$bilgisi['uc_period_skor']);
$dorduncu_ceyrek_bol_kupon = explode(" - ",$bilgisi['dort_period_skor']);
$besinci_ceyrek_bol_kupon = explode(" - ",$bilgisi['bes_period_skor']);
if($besinci_ceyrek_bol_kupon[0]+$besinci_ceyrek_bol_kupon[1]>0){
	$sonuc_versene = "(".$birinci_ceyrek_bol_kupon[0]."-".$birinci_ceyrek_bol_kupon[1].") (".$ikinci_ceyrek_bol_kupon[0]."-".$ikinci_ceyrek_bol_kupon[1].") <br> (".$ucuncu_ceyrek_bol_kupon[0]."-".$ucuncu_ceyrek_bol_kupon[1].") (".$dorduncu_ceyrek_bol_kupon[0]."-".$dorduncu_ceyrek_bol_kupon[1].") <br> (".$besinci_ceyrek_bol_kupon[0]."-".$besinci_ceyrek_bol_kupon[1].") / ".$bilgisi['ev_skor']."-".$bilgisi['konuk_skor']."";
} else {
	$sonuc_versene = "(".$birinci_ceyrek_bol_kupon[0]."-".$birinci_ceyrek_bol_kupon[1].") (".$ikinci_ceyrek_bol_kupon[0]."-".$ikinci_ceyrek_bol_kupon[1].") <br> (".$ucuncu_ceyrek_bol_kupon[0]."-".$ucuncu_ceyrek_bol_kupon[1].") (".$dorduncu_ceyrek_bol_kupon[0]."-".$dorduncu_ceyrek_bol_kupon[1].") <br> ".$bilgisi['ev_skor']."-".$bilgisi['konuk_skor']."";
}


$farki = time()-120;

if($bilgisi['songuncelleme']<$farki) { $macsonucu = "".getTranslation('ajaxkupond13').""; } else 
if($bilgisi['devremi']=="1") { $macsonucu = "".getTranslation('ajaxkupond14').""; } else 
if($bilgisi['gelecek']=="1") { $macsonucu = "".getTranslation('ajaxkupond15').""; } else 
{ $macsonucu = "".getTranslation('ajaxkupond16').": <strong>".$bilgisi['period']." <img src=/img/live.gif /></strong>"; }

} else { 

$sonuc_versene = "".$row['iy']." / ".$row['ms']." <img onclick='openlivedetails(".$row['id'].");' style='width: 16px;' src='/players/img/arrowdown.png'>";

$macsonucu = "";

}

$canlimi = '<td style="text-align:center;" class="itext-1">'.getTranslation('ajaxkupond12').'</td>';

} else if($row['spor_tip']=="canlit") {

$zaman = date("d-m-Y H:i",$row['mac_time']);	

$infobol = explode("|",$row['canli_info']);

$canlizaman = "$infobol[0] <strong>($infobol[1])</strong>";

$canlibilgi = sed_sql_query("select * from canli_maclar_tenis where id='$row[mac_db_id]' and songuncelleme>$fark_kupon_icin");

if(sed_sql_numrows($canlibilgi)>0) {

$bilgisi = sed_sql_fetcharray($canlibilgi);	

$birinci_ceyrek_bol_kupon = explode(" - ",$bilgisi['bir_period_skor']);
$ikinci_ceyrek_bol_kupon = explode(" - ",$bilgisi['iki_period_skor']);
$ucuncu_ceyrek_bol_kupon = explode(" - ",$bilgisi['uc_period_skor']);
$dorduncu_ceyrek_bol_kupon = explode(" - ",$bilgisi['dort_period_skor']);
$besinci_ceyrek_bol_kupon = explode(" - ",$bilgisi['bes_period_skor']);

if($besinci_ceyrek_bol_kupon[0]+$besinci_ceyrek_bol_kupon[1]>0){
	$sonuc_versene = "(".$birinci_ceyrek_bol_kupon[0]."-".$birinci_ceyrek_bol_kupon[1].") (".$ikinci_ceyrek_bol_kupon[0]."-".$ikinci_ceyrek_bol_kupon[1].") <br> (".$ucuncu_ceyrek_bol_kupon[0]."-".$ucuncu_ceyrek_bol_kupon[1].") (".$dorduncu_ceyrek_bol_kupon[0]."-".$dorduncu_ceyrek_bol_kupon[1].") <br> (".$besinci_ceyrek_bol_kupon[0]."-".$besinci_ceyrek_bol_kupon[1].") / ".$bilgisi['ev_skor']."-".$bilgisi['konuk_skor']."";
} else if($dorduncu_ceyrek_bol_kupon[0]+$dorduncu_ceyrek_bol_kupon[1]>0){
	$sonuc_versene = "(".$birinci_ceyrek_bol_kupon[0]."-".$birinci_ceyrek_bol_kupon[1].") (".$ikinci_ceyrek_bol_kupon[0]."-".$ikinci_ceyrek_bol_kupon[1].") <br> (".$ucuncu_ceyrek_bol_kupon[0]."-".$ucuncu_ceyrek_bol_kupon[1].") (".$dorduncu_ceyrek_bol_kupon[0]."-".$dorduncu_ceyrek_bol_kupon[1].") <br> / ".$bilgisi['ev_skor']."-".$bilgisi['konuk_skor']."";
} else if($ucuncu_ceyrek_bol_kupon[0]+$ucuncu_ceyrek_bol_kupon[1]>0){
	$sonuc_versene = "(".$birinci_ceyrek_bol_kupon[0]."-".$birinci_ceyrek_bol_kupon[1].") (".$ikinci_ceyrek_bol_kupon[0]."-".$ikinci_ceyrek_bol_kupon[1].") <br> (".$ucuncu_ceyrek_bol_kupon[0]."-".$ucuncu_ceyrek_bol_kupon[1].") / ".$bilgisi['ev_skor']."-".$bilgisi['konuk_skor']."";
} else {
	$sonuc_versene = "(".$birinci_ceyrek_bol_kupon[0]."-".$birinci_ceyrek_bol_kupon[1].") (".$ikinci_ceyrek_bol_kupon[0]."-".$ikinci_ceyrek_bol_kupon[1].") <br> ".$bilgisi['ev_skor']."-".$bilgisi['konuk_skor']."";
}


$farki = time()-120;

if($bilgisi['songuncelleme']<$farki) { $macsonucu = "".getTranslation('ajaxkupond13').""; } else 
if($bilgisi['devremi']=="1") { $macsonucu = "".getTranslation('ajaxkupond14').""; } else 
if($bilgisi['gelecek']=="1") { $macsonucu = "".getTranslation('ajaxkupond15').""; } else 
{ $macsonucu = "".getTranslation('ajaxkupond16').": <strong>".$bilgisi['period']." <img src=/img/live.gif /></strong>"; }

} else { 

$sonuc_versene = "".$row['ms']." <img onclick='openlivedetails(".$row['id'].");' style='width: 16px;' src='/players/img/arrowdown.png'>";

$macsonucu = "";

}

$canlimi = '<td style="text-align:center;" class="itext-1">'.getTranslation('ajaxkupond12').'</td>';

} else if($row['spor_tip']=="canliv") {

$zaman = date("d-m-Y H:i",$row['mac_time']);	

$infobol = explode("|",$row['canli_info']);

$canlizaman = "$infobol[0] <strong>($infobol[1])</strong>";

$canlibilgi = sed_sql_query("select * from canli_maclar_voleybol where id='$row[mac_db_id]' and songuncelleme>$fark_kupon_icin");

if(sed_sql_numrows($canlibilgi)>0) {

$bilgisi = sed_sql_fetcharray($canlibilgi);	

$birinci_ceyrek_bol_kupon = explode(" - ",$bilgisi['bir_period_skor']);
$ikinci_ceyrek_bol_kupon = explode(" - ",$bilgisi['iki_period_skor']);
$ucuncu_ceyrek_bol_kupon = explode(" - ",$bilgisi['uc_period_skor']);
$dorduncu_ceyrek_bol_kupon = explode(" - ",$bilgisi['dort_period_skor']);
$besinci_ceyrek_bol_kupon = explode(" - ",$bilgisi['bes_period_skor']);
if($besinci_ceyrek_bol_kupon[0]+$besinci_ceyrek_bol_kupon[1]>0){
	$sonuc_versene = "(".$birinci_ceyrek_bol_kupon[0]."-".$birinci_ceyrek_bol_kupon[1].") (".$ikinci_ceyrek_bol_kupon[0]."-".$ikinci_ceyrek_bol_kupon[1].") <br> (".$ucuncu_ceyrek_bol_kupon[0]."-".$ucuncu_ceyrek_bol_kupon[1].") (".$dorduncu_ceyrek_bol_kupon[0]."-".$dorduncu_ceyrek_bol_kupon[1].") <br> (".$besinci_ceyrek_bol_kupon[0]."-".$besinci_ceyrek_bol_kupon[1].") / ".$bilgisi['ev_skor']."-".$bilgisi['konuk_skor']."";
} else {
	$sonuc_versene = "(".$birinci_ceyrek_bol_kupon[0]."-".$birinci_ceyrek_bol_kupon[1].") (".$ikinci_ceyrek_bol_kupon[0]."-".$ikinci_ceyrek_bol_kupon[1].") <br> (".$ucuncu_ceyrek_bol_kupon[0]."-".$ucuncu_ceyrek_bol_kupon[1].") (".$dorduncu_ceyrek_bol_kupon[0]."-".$dorduncu_ceyrek_bol_kupon[1].") <br> ".$bilgisi['ev_skor']."-".$bilgisi['konuk_skor']."";
}


$farki = time()-120;

if($bilgisi['songuncelleme']<$farki) { $macsonucu = "".getTranslation('ajaxkupond13').""; } else 
if($bilgisi['devremi']=="1") { $macsonucu = "".getTranslation('ajaxkupond14').""; } else 
if($bilgisi['gelecek']=="1") { $macsonucu = "".getTranslation('ajaxkupond15').""; } else 
{ $macsonucu = "".getTranslation('ajaxkupond16').": <strong>".$bilgisi['period']." <img src=/img/live.gif /></strong>"; }

} else { 

$sonuc_versene = "".$row['ms']." <img onclick='openlivedetails(".$row['id'].");' style='width: 16px;' src='/players/img/arrowdown.png'>";

$macsonucu = "";

}

$canlimi = '<td style="text-align:center;" class="itext-1">'.getTranslation('ajaxkupond12').'</td>';

} else if($row['spor_tip']=="canlibuz") {

$zaman = date("d-m-Y H:i",$row['mac_time']);	

$infobol = explode("|",$row['canli_info']);

$canlizaman = "$infobol[0] <strong>($infobol[1])</strong>";

$canlibilgi = sed_sql_query("select * from canli_maclar_buzhokeyi where id='$row[mac_db_id]' and songuncelleme>$fark_kupon_icin");

if(sed_sql_numrows($canlibilgi)>0) {

$bilgisi = sed_sql_fetcharray($canlibilgi);	

$birinci_ceyrek_bol_kupon = explode(" - ",$bilgisi['bir_period_skor']);
$ikinci_ceyrek_bol_kupon = explode(" - ",$bilgisi['iki_period_skor']);
$ucuncu_ceyrek_bol_kupon = explode(" - ",$bilgisi['uc_period_skor']);
if($ucuncu_ceyrek_bol_kupon[0]+$ucuncu_ceyrek_bol_kupon[1]>0){
	$sonuc_versene = "(".$birinci_ceyrek_bol_kupon[0]."-".$birinci_ceyrek_bol_kupon[1].") (".$ikinci_ceyrek_bol_kupon[0]."-".$ikinci_ceyrek_bol_kupon[1].") <br> (".$ucuncu_ceyrek_bol_kupon[0]."-".$ucuncu_ceyrek_bol_kupon[1].") / ".$bilgisi['ev_skor']."-".$bilgisi['konuk_skor']."";
} else {
	$sonuc_versene = "(".$birinci_ceyrek_bol_kupon[0]."-".$birinci_ceyrek_bol_kupon[1].") (".$ikinci_ceyrek_bol_kupon[0]."-".$ikinci_ceyrek_bol_kupon[1].") <br> ".$bilgisi['ev_skor']."-".$bilgisi['konuk_skor']."";
}


$farki = time()-120;

if($bilgisi['songuncelleme']<$farki) { $macsonucu = "".getTranslation('ajaxkupond13').""; } else 
if($bilgisi['devremi']=="1") { $macsonucu = "".getTranslation('ajaxkupond14').""; } else 
if($bilgisi['gelecek']=="1") { $macsonucu = "".getTranslation('ajaxkupond15').""; } else 
{ $macsonucu = "".getTranslation('ajaxkupond16').": <strong>".$bilgisi['period']." <img src=/img/live.gif /></strong>"; }

} else { 

$sonuc_versene = "".$row['ms']." <img onclick='openlivedetails(".$row['id'].");' style='width: 16px;' src='/players/img/arrowdown.png'>";

$macsonucu = "";

}

$canlimi = '<td style="text-align:center;" class="itext-1">'.getTranslation('ajaxkupond12').'</td>';

} else if($row['spor_tip']=="canlimt") {

$zaman = date("d-m-Y H:i",$row['mac_time']);	

$infobol = explode("|",$row['canli_info']);

$canlizaman = "$infobol[0] <strong>($infobol[1])</strong>";

$canlibilgi = sed_sql_query("select * from canli_maclar_masatenis where id='$row[mac_db_id]' and songuncelleme>$fark_kupon_icin");

if(sed_sql_numrows($canlibilgi)>0) {

$bilgisi = sed_sql_fetcharray($canlibilgi);	

$birinci_ceyrek_bol_kupon = explode(" - ",$bilgisi['bir_period_skor']);
$ikinci_ceyrek_bol_kupon = explode(" - ",$bilgisi['iki_period_skor']);
$ucuncu_ceyrek_bol_kupon = explode(" - ",$bilgisi['uc_period_skor']);
$dorduncu_ceyrek_bol_kupon = explode(" - ",$bilgisi['dort_period_skor']);
$besinci_ceyrek_bol_kupon = explode(" - ",$bilgisi['bes_period_skor']);

$bir_ev_ver = $birinci_ceyrek_bol_kupon[0];
$iki_ev_ver = $ikinci_ceyrek_bol_kupon[0];
$uc_ev_ver = $ucuncu_ceyrek_bol_kupon[0];
$dort_ev_ver = $dorduncu_ceyrek_bol_kupon[0];
$bes_ev_ver = $besinci_ceyrek_bol_kupon[0];

$bir_dep_ver = $birinci_ceyrek_bol_kupon[1];
$iki_dep_ver = $ikinci_ceyrek_bol_kupon[1];
$uc_dep_ver = $ucuncu_ceyrek_bol_kupon[1];
$dort_dep_ver = $dorduncu_ceyrek_bol_kupon[1];
$bes_dep_ver = $besinci_ceyrek_bol_kupon[1];

if($bir_ev_ver>0){ $bir_ev_verdim = $bir_ev_ver; } else { $bir_ev_verdim = 0; }
if($iki_ev_ver>0){ $iki_ev_verdim = $iki_ev_ver; } else { $iki_ev_verdim = 0; }
if($uc_ev_ver>0){ $uc_ev_verdim = $uc_ev_ver; } else { $uc_ev_verdim = 0; }
if($dort_ev_ver>0){ $dort_ev_verdim = $dort_ev_ver; } else { $dort_ev_verdim = 0; }
if($bes_ev_ver>0){ $bes_ev_verdim = $bes_ev_ver; } else { $bes_ev_verdim = 0; }

if($bir_dep_ver>0){ $bir_dep_verdim = $bir_dep_ver; } else { $bir_dep_verdim = 0; }
if($iki_dep_ver>0){ $iki_dep_verdim = $iki_dep_ver; } else { $iki_dep_verdim = 0; }
if($uc_dep_ver>0){ $uc_dep_verdim = $uc_dep_ver; } else { $uc_dep_verdim = 0; }
if($dort_dep_ver>0){ $dort_dep_verdim = $dort_dep_ver; } else { $dort_dep_verdim = 0; }
if($bes_dep_ver>0){ $bes_dep_verdim = $bes_dep_ver; } else { $bes_dep_verdim = 0; }

if($bes_ev_verdim+$bes_dep_verdim>0){
	$sonuc_versene = "(".$bir_ev_verdim."-".$bir_dep_verdim.") (".$iki_ev_verdim."-".$iki_dep_verdim.") (".$uc_ev_verdim."-".$uc_dep_verdim.") (".$dort_ev_verdim."-".$dort_dep_verdim.") <br> (".$bes_ev_verdim."-".$bes_dep_verdim.")
	/ ".$bilgisi['ev_skor']."-".$bilgisi['konuk_skor']."";
} else {
	$sonuc_versene = "(".$bir_ev_verdim."-".$bir_dep_verdim.") (".$iki_ev_verdim."-".$iki_dep_verdim.") <br> (".$uc_ev_verdim."-".$uc_dep_verdim.") (".$dort_ev_verdim."-".$dort_dep_verdim.") / ".$bilgisi['ev_skor']."-".$bilgisi['konuk_skor']."";
}


$farki = time()-120;

if($bilgisi['songuncelleme']<$farki) { $macsonucu = "".getTranslation('ajaxkupond13').""; } else 
if($bilgisi['devremi']=="1") { $macsonucu = "".getTranslation('ajaxkupond14').""; } else 
if($bilgisi['gelecek']=="1") { $macsonucu = "".getTranslation('ajaxkupond15').""; } else 
{ $macsonucu = "".getTranslation('ajaxkupond16').": <strong>".$bilgisi['period']." <img src=/img/live.gif /></strong>"; }

} else { 

$sonuc_versene = "".$row['ms']." <img onclick='openlivedetails(".$row['id'].");' style='width: 16px;' src='/players/img/arrowdown.png'>";

$macsonucu = "";

}

$canlimi = '<td style="text-align:center;" class="itext-1">'.getTranslation('ajaxkupond12').'</td>';

} else {

if($row['mac_time']<time()) { $macsonucu = "".getTranslation('ajaxkupond18').""; } else 
if($row['ertelendi']=="1") { $macsonucu = "<strong>".getTranslation('ajaxkupond19')."</strong>"; } else { $macsonucu = ""; }

if($row['spor_tip']=="sanal") { 
$zaman = date("d-m-Y H:i:s",strtotime($row['mac_time']));	
}else
{
	$zaman = date("d-m-Y H:i",$row['mac_time']);
}

if($row['spor_tip']=="tenis" || $row['spor_tip']=="voleybol" || $row['spor_tip']=="buzhokeyi"){
$sonuc_versene = "".$row['ms']." <img onclick='openlivedetails(".$row['id'].");' style='width: 16px;' src='/players/img/arrowdown.png'>";
} else {
$sonuc_versene = "".$row['iy']." / ".$row['ms']." <img onclick='openlivedetails(".$row['id'].");' style='width: 16px;' src='/players/img/arrowdown.png'>";
}

$canlimi = '<td style="text-align:center;" class="itext-2">'.getTranslation('ajaxkupond17').'</td>';

$canlizaman = "-";

}

if($row['spor_tip']=="futbol") {

if($secim_yapimi=="1X2"){
	$translatele = getTranslation('futboloran1');
} else if($secim_yapimi=="Handikap (0:1)"){
	$translatele = getTranslation('futboloran2');
} else if($secim_yapimi=="Handikap (1:0)"){
	$translatele = getTranslation('futboloran3');
} else if($secim_yapimi=="Handikap (0:2)"){
	$translatele = getTranslation('futboloran4');
} else if($secim_yapimi=="Handikap (2:0)"){
	$translatele = getTranslation('futboloran5');
} else if($secim_yapimi=="1X2 ( 1.YARI )"){
	$translatele = getTranslation('futboloran6');
} else if($secim_yapimi=="1X2 ( 2.YARI )"){
	$translatele = getTranslation('futboloran7');
} else if($secim_yapimi=="1.Yarı Çifte Şans"){
	$translatele = getTranslation('futboloran8');
} else if($secim_yapimi=="1.YARI KG"){
	$translatele = getTranslation('futboloran9');
} else if($secim_yapimi=="Beraberlikte İade"){
	$translatele = getTranslation('futboloran10');
} else if($secim_yapimi=="Toplam Gol Alt/Üst 0.5"){
	$translatele = getTranslation('futboloran11');
} else if($secim_yapimi=="Toplam Gol Alt/Üst 1.5"){
	$translatele = getTranslation('futboloran12');
} else if($secim_yapimi=="Toplam Gol Alt/Üst 2.5"){
	$translatele = getTranslation('futboloran13');
} else if($secim_yapimi=="Toplam Gol Alt/Üst 3.5"){
	$translatele = getTranslation('futboloran14');
} else if($secim_yapimi=="Toplam Gol Alt/Üst 4.5"){
	$translatele = getTranslation('futboloran15');
} else if($secim_yapimi=="Toplam Gol Alt/Üst 5.5"){
	$translatele = getTranslation('futboloran16');
} else if($secim_yapimi=="1.Yarı Toplam Gol Alt/Üst 0.5"){
	$translatele = getTranslation('futboloran18');
} else if($secim_yapimi=="1.Yarı Toplam Gol Alt/Üst 1.5"){
	$translatele = getTranslation('futboloran19');
} else if($secim_yapimi=="1.Yarı Toplam Gol Alt/Üst 2.5"){
	$translatele = getTranslation('futboloran20');
} else if($secim_yapimi=="1.Yarı Toplam Gol Alt/Üst 3.5"){
	$translatele = getTranslation('futboloran21');
} else if($secim_yapimi=="2.Yarı Toplam Gol Alt/Üst 0.5"){
	$translatele = getTranslation('futboloran22');
} else if($secim_yapimi=="2.Yarı Toplam Gol Alt/Üst 1.5"){
	$translatele = getTranslation('futboloran23');
} else if($secim_yapimi=="2.Yarı Toplam Gol Alt/Üst 2.5"){
	$translatele = getTranslation('futboloran24');
} else if($secim_yapimi=="2.Yarı Toplam Gol Alt/Üst 3.5"){
	$translatele = getTranslation('futboloran25');
} else if($secim_yapimi=="Ev Sahibi Gol Atarmı ?"){
	$translatele = getTranslation('futboloran26');
} else if($secim_yapimi=="Deplasman Gol Atarmı ?"){
	$translatele = getTranslation('futboloran27');
} else if($secim_yapimi=="Karşılıklı Gol"){
	$translatele = getTranslation('futboloran28');
} else if($secim_yapimi=="​​​​​​​​​​1.Yarı Tek/Çift"){
	$translatele = getTranslation('futboloran29');
} else if($secim_yapimi=="Tek/Çift"){
	$translatele = getTranslation('futboloran30');
} else if($secim_yapimi=="Evsahibi Kaç Gol Atar ?"){
	$translatele = getTranslation('futboloran31');
} else if($secim_yapimi=="Deplasman Kaç Gol Atar ?"){
	$translatele = getTranslation('futboloran32');
} else if($secim_yapimi=="Evsahibi 1.Yarı Kaç Gol Atar ?"){
	$translatele = getTranslation('futboloran33');
} else if($secim_yapimi=="Evsahibi 2.Yarı Kaç Gol Atar ?"){
	$translatele = getTranslation('futboloran34');
} else if($secim_yapimi=="Deplasman 1.Yarı Kaç Gol Atar ?"){
	$translatele = getTranslation('futboloran35');
} else if($secim_yapimi=="Deplasman 2.Yarı Kaç Gol Atar ?"){
	$translatele = getTranslation('futboloran36');
} else if($secim_yapimi=="Evsahibi 1.Yarı A/Ü 0.5"){
	$translatele = getTranslation('futboloran37');
} else if($secim_yapimi=="Evsahibi 1.Yarı A/Ü 1.5"){
	$translatele = getTranslation('futboloran38');
} else if($secim_yapimi=="Deplasman 1.Yarı A/Ü 0.5"){
	$translatele = getTranslation('futboloran39');
} else if($secim_yapimi=="Deplasman 1.Yarı A/Ü 1.5"){
	$translatele = getTranslation('futboloran40');
} else if($secim_yapimi=="Evsahibi A/Ü 1.5"){
	$translatele = getTranslation('futboloran41');
} else if($secim_yapimi=="Deplasman A/Ü 1.5"){
	$translatele = getTranslation('futboloran42');
} else if($secim_yapimi=="​​​​​Evsahibi Her 2 yarıda Gol Atar ?"){
	$translatele = getTranslation('futboloran43');
} else if($secim_yapimi=="Deplasman Her 2 yarıda Gol Atar ?"){
	$translatele = getTranslation('futboloran44');
} else if($secim_yapimi=="Hangi Devrede Fazla Gol Olur"){
	$translatele = getTranslation('futboloran45');
} else if($secim_yapimi=="Evsahibi Hangi Devrede Fazla Gol Atar ?"){
	$translatele = getTranslation('futboloran46');
} else if($secim_yapimi=="Deplasman Hangi Devrede Fazla Gol Atar ?"){
	$translatele = getTranslation('futboloran47');
} else if($secim_yapimi=="Müsabakada kaç gol atılır? (0-4+)"){
	$translatele = getTranslation('futboloran48');
} else if($secim_yapimi=="Müsabakada kaç gol atılır? (0-5+)"){
	$translatele = getTranslation('futboloran49');
} else if($secim_yapimi=="Müsabakada kaç gol atılır? (0-6+)"){
	$translatele = getTranslation('futboloran50');
} else if($secim_yapimi=="Herhangi bir takım 1 gol farkla kazanır mı?"){
	$translatele = getTranslation('futboloran51');
} else if($secim_yapimi=="Herhangi bir takım 2 gol farkla kazanır mı?"){
	$translatele = getTranslation('futboloran52');
} else if($secim_yapimi=="Herhangi bir takım 3 gol farkla kazanır mı?"){
	$translatele = getTranslation('futboloran53');
} else if($secim_yapimi=="1X2 ve toplam gol sayısı 2.5"){
	$translatele = getTranslation('futboloran54');
} else if($secim_yapimi=="Maç sonucu ve karşılıklı goller"){
	$translatele = getTranslation('futboloran55');
} else if($secim_yapimi=="İlk Yarı / Maç Sonucu"){
	$translatele = getTranslation('futboloran56');
} else if($secim_yapimi=="Skor Bahsi (90 Dakika)"){
	$translatele = getTranslation('futboloran57');
} else if($secim_yapimi=="Çifte Şans"){
	$translatele = getTranslation('futboloran58');
} else if($secim_yapimi=="Toplam Sari Kart Alt/Üst 3.5"){
	$translatele = getTranslation('futboloran59');
} else if($secim_yapimi=="Kirmizi kart cikar mi?"){
	$translatele = getTranslation('futboloran60');
} else if($secim_yapimi=="Macta kac tane penalti olur?"){
	$translatele = getTranslation('futboloran61');
} else if($secim_yapimi=="1.Takim Sari Kart Alt/Üst 1.5"){
	$translatele = getTranslation('futboloran62');
} else if($secim_yapimi=="1.Takim Sari Kart Alt/Üst 2.5"){
	$translatele = getTranslation('futboloran63');
} else if($secim_yapimi=="1.Takim Sari Kart Alt/Üst 3.5"){
	$translatele = getTranslation('futboloran64');
} else if($secim_yapimi=="2.Takim Sari Kart Alt/Üst 1.5"){
	$translatele = getTranslation('futboloran65');
} else if($secim_yapimi=="2.Takim Sari Kart Alt/Üst 2.5"){
	$translatele = getTranslation('futboloran66');
} else if($secim_yapimi=="2.Takim Sari Kart Alt/Üst 3.5"){
	$translatele = getTranslation('futboloran67');
} else if($secim_yapimi=="Sarı Kart Toplam Tek/Çift"){
	$translatele = getTranslation('futboloran68');
} else if($secim_yapimi=="Hangi Takım Çok Sarı Kart Yer ?"){
	$translatele = getTranslation('futboloran69');
} else if($secim_yapimi=="Toplam Korner Alt/Üst 5.5"){
	$translatele = getTranslation('futboloran70');
} else if($secim_yapimi=="Toplam Korner Alt/Üst 6.5"){
	$translatele = getTranslation('futboloran71');
} else if($secim_yapimi=="Toplam Korner Alt/Üst 7.5"){
	$translatele = getTranslation('futboloran72');
} else if($secim_yapimi=="Toplam Korner Alt/Üst 8.5"){
	$translatele = getTranslation('futboloran73');
} else if($secim_yapimi=="Toplam Korner Alt/Üst 9.5"){
	$translatele = getTranslation('futboloran74');
} else if($secim_yapimi=="Toplam Korner Alt/Üst 10.5"){
	$translatele = getTranslation('futboloran75');
} else if($secim_yapimi=="Toplam Korner Alt/Üst 11.5"){
	$translatele = getTranslation('futboloran76');
} else if($secim_yapimi=="Toplam Korner Alt/Üst 12.5"){
	$translatele = getTranslation('futboloran77');
} else if($secim_yapimi=="Toplam Korner Alt/Üst 13.5"){
	$translatele = getTranslation('futboloran78');
} else if($secim_yapimi=="Toplam Korner Alt/Üst 14.5"){
	$translatele = getTranslation('futboloran79');
} else if($secim_yapimi=="Toplam Korner Alt/Üst 15.5"){
	$translatele = getTranslation('futboloran80');
} else if($secim_yapimi=="1.Takım Korner Alt/Üst 2.5"){
	$translatele = getTranslation('futboloran81');
} else if($secim_yapimi=="1.Takım Korner Alt/Üst 3.5"){
	$translatele = getTranslation('futboloran82');
} else if($secim_yapimi=="1.Takım Korner Alt/Üst 4.5"){
	$translatele = getTranslation('futboloran83');
} else if($secim_yapimi=="1.Takım Korner Alt/Üst 5.5"){
	$translatele = getTranslation('futboloran84');
} else if($secim_yapimi=="1.Takım Korner Alt/Üst 6.5"){
	$translatele = getTranslation('futboloran85');
} else if($secim_yapimi=="1.Takım Korner Alt/Üst 7.5"){
	$translatele = getTranslation('futboloran86');
} else if($secim_yapimi=="1.Takım Korner Alt/Üst 8.5"){
	$translatele = getTranslation('futboloran87');
} else if($secim_yapimi=="1.Takım Korner Alt/Üst 9.5"){
	$translatele = getTranslation('futboloran88');
} else if($secim_yapimi=="1.Takım Korner Alt/Üst 10.5"){
	$translatele = getTranslation('futboloran89');
} else if($secim_yapimi=="2.Takım Korner Alt/Üst 2.5"){
	$translatele = getTranslation('futboloran90');
} else if($secim_yapimi=="2.Takım Korner Alt/Üst 3.5"){
	$translatele = getTranslation('futboloran91');
} else if($secim_yapimi=="2.Takım Korner Alt/Üst 4.5"){
	$translatele = getTranslation('futboloran92');
} else if($secim_yapimi=="2.Takım Korner Alt/Üst 5.5"){
	$translatele = getTranslation('futboloran93');
} else if($secim_yapimi=="2.Takım Korner Alt/Üst 6.5"){
	$translatele = getTranslation('futboloran94');
} else if($secim_yapimi=="2.Takım Korner Alt/Üst 7.5"){
	$translatele = getTranslation('futboloran95');
} else if($secim_yapimi=="2.Takım Korner Alt/Üst 8.5"){
	$translatele = getTranslation('futboloran96');
} else if($secim_yapimi=="2.Takım Korner Alt/Üst 9.5"){
	$translatele = getTranslation('futboloran97');
} else if($secim_yapimi=="2.Takım Korner Alt/Üst 10.5"){
	$translatele = getTranslation('futboloran98');
} else if($secim_yapimi=="Korner Toplam Tek/Çift"){
	$translatele = getTranslation('futboloran99');
} else if($secim_yapimi=="Hangi Takım Çok Korner Kullanır ?"){
	$translatele = getTranslation('futboloran100');
} else if($secim_yapimi=="1X2 ve toplam gol sayısı 3.5"){
	$translatele = getTranslation('futboloran101');
} else {
	$translatele = $secim_yapimi;
}

} else if($row['spor_tip']=="basketbol") {

if($secim_yapimi=="Kim Kazanır ? (Uz. Dahil)"){
	$translatele = getTranslation('basketboloran1');
} else if($secim_yapimi=="1X2 (Uz. Hariç)"){
	$translatele = getTranslation('basketboloran2');
} else if($secim_yapimi== "1X2 ( 1.YARI )"){
	$translatele = getTranslation('basketboloran3');
} else if($secim_yapimi== "Toplam Skor Tek/Çift"){
	$translatele = getTranslation('basketboloran4');
} else if($secim_yapimi== "Toplam Skor Alt/Üst"){
	$translatele = getTranslation('basketboloran5');
} else if($secim_yapimi== "Handikap ( 1.YARI )"){
	$translatele = getTranslation('basketboloran6');
} else if($secim_yapimi== "Handikap"){
	$translatele = getTranslation('basketboloran7');
} else if($secim_yapimi== "1.Yarı / MS"){
	$translatele = getTranslation('basketboloran8');
} else if($secim_yapimi== "İki Devrede Kazanır"){
	$translatele = getTranslation('basketboloran9');
} else if($secim_yapimi== "Tüm Periyotları Kazanır"){
	$translatele = getTranslation('basketboloran10');
} else if($secim_yapimi== "1.Takım İY Alt/Üst"){
	$translatele = getTranslation('basketboloran11');
} else if($secim_yapimi== "2.Takım İY Alt/Üst"){
	$translatele = getTranslation('basketboloran12');
} else if($secim_yapimi== "1.Takım Alt/Üst"){
	$translatele = getTranslation('basketboloran13');
} else if($secim_yapimi== "2.Takım Alt/Üst"){
	$translatele = getTranslation('basketboloran14');
} else if($secim_yapimi== "1.Takım 1.Çeyrek Alt/Üst"){
	$translatele = getTranslation('basketboloran15');
} else if($secim_yapimi== "2.Takım 1.Çeyrek Alt/Üst"){
	$translatele = getTranslation('basketboloran16');
} else if($secim_yapimi== "1.Çeyrek Kim Kazanır"){
	$translatele = getTranslation('basketboloran17');
} else if($secim_yapimi== "1.Çeyrek Toplam Tek/Çift"){
	$translatele = getTranslation('basketboloran18');
} else if($secim_yapimi== "1.Yarı Toplam Tek/Çift"){
	$translatele = getTranslation('basketboloran19');
} else {
	$translatele = $secim_yapimi;
}

}  else if($row['spor_tip']=="tenis") {

if($secim_yapimi=="Kim Kazanır ?"){
	$translatele = getTranslation('tenisoran1');
} else if($secim_yapimi=="Set Bahsi"){
	$translatele = getTranslation('tenisoran2');
} else if($secim_yapimi=="1.Seti Kim Kazanır ?"){
	$translatele = getTranslation('tenisoran3');
} else if($secim_yapimi=="2.Seti Kim Kazanır ?"){
	$translatele = getTranslation('tenisoran4');
} else if($secim_yapimi=="1.Oyuncu 1 Set Kazanır"){
	$translatele = getTranslation('tenisoran5');
} else if($secim_yapimi=="2.Oyuncu 1 Set Kazanır"){
	$translatele = getTranslation('tenisoran6');
} else {
	$translatele = $secim_yapimi;
}

} else if($row['spor_tip']=="voleybol") {

if($secim_yapimi=="Kim Kazanır ?"){
	$translatele = getTranslation('voleyboloran1');
} else if($secim_yapimi=="Set bahisi"){
	$translatele = getTranslation('voleyboloran2');
} else if($secim_yapimi=="Toplam Alt/Üst"){
	$translatele = getTranslation('voleyboloran3');
} else if($secim_yapimi=="5 Set Sürermi ?"){
	$translatele = getTranslation('voleyboloran4');
} else {
	$translatele = $secim_yapimi;
}

} else if($row['spor_tip']=="buzhokeyi") {

if($secim_yapimi=="Kim Kazanır"){
	$translatele = getTranslation('buzhokeyioran1');
} else if($secim_yapimi=="1X2"){
	$translatele = getTranslation('buzhokeyioran2');
} else if($secim_yapimi=="1.P 1X2"){
	$translatele = getTranslation('buzhokeyioran3');
} else if($secim_yapimi=="2.P 1X2"){
	$translatele = getTranslation('buzhokeyioran4');
} else if($secim_yapimi=="3.P 1X2"){
	$translatele = getTranslation('buzhokeyioran5');
} else if($secim_yapimi=="Çifte Şans"){
	$translatele = getTranslation('buzhokeyioran6');
} else if($secim_yapimi=="1.P Çifte Şans"){
	$translatele = getTranslation('buzhokeyioran7');
} else if($secim_yapimi=="2.P Çifte Şans"){
	$translatele = getTranslation('buzhokeyioran8');
} else if($secim_yapimi=="3.P Çifte Şans"){
	$translatele = getTranslation('buzhokeyioran9');
} else {
	$translatele = $secim_yapimi;
}

} else if($row['spor_tip']=="masatenisi") {

if($secim_yapimi=="Kim Kazanır"){
	$translatele = getTranslation('masatenisioran1');
} else {
	$translatele = $secim_yapimi;
}

} else if($row['spor_tip']=="rugby") {

if($secim_yapimi=="1X2"){
	$translatele = getTranslation('rugbyoran1');
} else {
	$translatele = $secim_yapimi;
}

} else if($row['spor_tip']=="beyzbol") {

$translatele = $secim_yapimi;

} else if($row['spor_tip']=="dovus") {

$translatele = $secim_yapimi;

} else if($row['spor_tip']=="canli") {

if($secim_yapimi=="1X2"){
	$translatele = getTranslation('futboloran1');
} else if($secim_yapimi=="Handikap 0:1"){
	$translatele = getTranslation('futboloran2');
} else if($secim_yapimi=="Handikap 1:0"){
	$translatele = getTranslation('futboloran3');
} else if($secim_yapimi=="Handikap 0:2"){
	$translatele = getTranslation('futboloran4');
} else if($secim_yapimi=="Handikap 2:0"){
	$translatele = getTranslation('futboloran5');
} else if($secim_yapimi=="1.Yarı Sonucu"){
	$translatele = getTranslation('futboloran6');
} else if($secim_yapimi=="2.Yarı Sonucu"){
	$translatele = getTranslation('futboloran7');
} else if($secim_yapimi=="1.Yarı Çifte Şans"){
	$translatele = getTranslation('futboloran8');
} else if($secim_yapimi=="1.Yarı Karşılıklı Gol"){
	$translatele = getTranslation('futboloran9');
} else if($secim_yapimi=="Beraberlikte İade"){
	$translatele = getTranslation('futboloran10');
} else if($secim_yapimi=="Toplam 0.5 Gol Alt Üst"){
	$translatele = getTranslation('futboloran11');
} else if($secim_yapimi=="Toplam 1.5 Gol Alt Üst"){
	$translatele = getTranslation('futboloran12');
} else if($secim_yapimi=="Toplam 2.5 Gol Alt Üst"){
	$translatele = getTranslation('futboloran13');
} else if($secim_yapimi=="Toplam 3.5 Gol Alt Üst"){
	$translatele = getTranslation('futboloran14');
} else if($secim_yapimi=="Toplam 4.5 Gol Alt Üst"){
	$translatele = getTranslation('futboloran15');
} else if($secim_yapimi=="Toplam 5.5 Gol Alt Üst"){
	$translatele = getTranslation('futboloran16');
} else if($secim_yapimi=="1.Yarı 0.5 Gol Alt Üst"){
	$translatele = getTranslation('futboloran18');
} else if($secim_yapimi=="1.Yarı 1.5 Gol Alt Üst"){
	$translatele = getTranslation('futboloran19');
} else if($secim_yapimi=="1.Yarı 2.5 Gol Alt Üst"){
	$translatele = getTranslation('futboloran20');
} else if($secim_yapimi=="1.Yarı Toplam Gol 3.5 Alt/Üst"){
	$translatele = getTranslation('futboloran21');
} else if($secim_yapimi=="2.Yarı 0.5 Gol Alt Üst"){
	$translatele = getTranslation('futboloran22');
} else if($secim_yapimi=="2.Yarı 1.5 Gol Alt Üst"){
	$translatele = getTranslation('futboloran23');
} else if($secim_yapimi=="2.Yarı 2.5 Gol Alt Üst"){
	$translatele = getTranslation('futboloran24');
} else if($secim_yapimi=="2.Yarı 3.5 Gol Alt Üst"){
	$translatele = getTranslation('futboloran25');
} else if($secim_yapimi=="Ev Sahibi Müsabakada Gol Atarmı ?"){
	$translatele = getTranslation('futboloran26');
} else if($secim_yapimi=="Deplasman Müsabakada Gol Atarmı ?"){
	$translatele = getTranslation('futboloran27');
} else if($secim_yapimi=="Karşılıklı Gol Olurmu ?"){
	$translatele = getTranslation('futboloran28');
} else if($secim_yapimi=="​​​​​1.Yarı Tek / Çift"){
	$translatele = getTranslation('futboloran29');
} else if($secim_yapimi=="Toplam Gol Tek / Çift"){
	$translatele = getTranslation('futboloran30');
} else if($secim_yapimi=="Ev Sahibi Toplam Kaç Gol Atar ?"){
	$translatele = getTranslation('futboloran31');
} else if($secim_yapimi=="Deplasman Toplam Kaç Gol Atar ?"){
	$translatele = getTranslation('futboloran32');
} else if($secim_yapimi=="Ev Sahibi İlk Yarı Tam Gol Sayısı"){
	$translatele = getTranslation('futboloran33');
} else if($secim_yapimi=="Ev Sahibi İkinci Yarı Tam Gol Sayısı"){
	$translatele = getTranslation('futboloran34');
} else if($secim_yapimi=="Deplasman İlk Yarı Tam Gol Sayısı"){
	$translatele = getTranslation('futboloran35');
} else if($secim_yapimi=="Deplasman İkinci Yarı Tam Gol Sayısı"){
	$translatele = getTranslation('futboloran36');
} else if($secim_yapimi=="Ev Sahibi 1.Yarı 0.5 Gol Alt Üst"){
	$translatele = getTranslation('futboloran37');
} else if($secim_yapimi=="Ev Sahibi 1.Yarı 1.5 Gol Alt Üst"){
	$translatele = getTranslation('futboloran38');
} else if($secim_yapimi=="Deplasman 1.Yarı 0.5 Gol Alt Üst"){
	$translatele = getTranslation('futboloran39');
} else if($secim_yapimi=="Deplasman 1.Yarı 1.5 Gol Alt Üst"){
	$translatele = getTranslation('futboloran40');
} else if($secim_yapimi=="Evsahibi Toplam 1.5 Alt/Üst"){
	$translatele = getTranslation('futboloran41');
} else if($secim_yapimi=="Deplasman Toplam 1.5 Alt/Üst"){
	$translatele = getTranslation('futboloran42');
} else if($secim_yapimi=="​​​​​Evsahibi Her 2 yarıda Gol Atar ?"){
	$translatele = getTranslation('futboloran43');
} else if($secim_yapimi=="Deplasman Her 2 yarıda Gol Atar ?"){
	$translatele = getTranslation('futboloran44');
} else if($secim_yapimi=="Hangi Devrede Fazla Gol Olur"){
	$translatele = getTranslation('futboloran45');
} else if($secim_yapimi=="Evsahibi Hangi Devrede Fazla Gol Atar ?"){
	$translatele = getTranslation('futboloran46');
} else if($secim_yapimi=="Deplasman Hangi Devrede Fazla Gol Atar ?"){
	$translatele = getTranslation('futboloran47');
} else if($secim_yapimi=="Müsabakada kaç gol atılır? (0-4)"){
	$translatele = getTranslation('futboloran48');
} else if($secim_yapimi=="Müsabakada kaç gol atılır? (0-5)"){
	$translatele = getTranslation('futboloran49');
} else if($secim_yapimi=="Müsabakada kaç gol atılır? (0-6)"){
	$translatele = getTranslation('futboloran50');
} else if($secim_yapimi=="Herhangi Bir Takım 1 Gol Farkla Kazanirmi ?"){
	$translatele = getTranslation('futboloran51');
} else if($secim_yapimi=="Herhangi Bir Takım 2 Gol Farkla Kazanirmi ?"){
	$translatele = getTranslation('futboloran52');
} else if($secim_yapimi=="Herhangi Bir Takım 3 Gol Farkla Kazanirmi ?"){
	$translatele = getTranslation('futboloran53');
} else if($secim_yapimi=="Maç Sonucu ve 2.5 Alt/Üst"){
	$translatele = getTranslation('futboloran54');
} else if($secim_yapimi=="Maç Sonucu ve Karşılıklı Gol"){
	$translatele = getTranslation('futboloran55');
} else if($secim_yapimi=="İlk Yarı / Maç Sonucu"){
	$translatele = getTranslation('futboloran56');
} else if($secim_yapimi=="Maç Skoru"){
	$translatele = getTranslation('futboloran57');
} else if($secim_yapimi=="Çifte Şans"){
	$translatele = getTranslation('futboloran58');
} else if($secim_yapimi=="Toplam Sarı Kart 3.5 Alt/Üst"){
	$translatele = getTranslation('futboloran59');
} else if($secim_yapimi=="Kırmızı Kart Çıkar mı?"){
	$translatele = getTranslation('futboloran60');
} else if($secim_yapimi=="Maçta Kaç Tane Penaltı Olur ?"){
	$translatele = getTranslation('futboloran61');
} else if($secim_yapimi=="1.Takim Sari Kart 1.5 Alt/Üst"){
	$translatele = getTranslation('futboloran62');
} else if($secim_yapimi=="1.Takim Sari Kart 2.5 Alt/Üst"){
	$translatele = getTranslation('futboloran63');
} else if($secim_yapimi=="1.Takim Sari Kart 3.5 Alt/Üst"){
	$translatele = getTranslation('futboloran64');
} else if($secim_yapimi=="2.Takim Sari Kart 1.5 Alt/Üst"){
	$translatele = getTranslation('futboloran65');
} else if($secim_yapimi=="2.Takim Sari Kart 2.5 Alt/Üst"){
	$translatele = getTranslation('futboloran66');
} else if($secim_yapimi=="2.Takim Sari Kart 3.5 Alt/Üst"){
	$translatele = getTranslation('futboloran67');
} else if($secim_yapimi=="Sarı Kart Toplam Tek/Çift"){
	$translatele = getTranslation('futboloran68');
} else if($secim_yapimi=="Hangi Takım Çok Sarı Kart Yer ?"){
	$translatele = getTranslation('futboloran69');
} else if($secim_yapimi=="Toplam Korner 5.5 Alt/Üst"){
	$translatele = getTranslation('futboloran70');
} else if($secim_yapimi=="Toplam Korner 6.5 Alt/Üst"){
	$translatele = getTranslation('futboloran71');
} else if($secim_yapimi=="Toplam Korner 7.5 Alt/Üst"){
	$translatele = getTranslation('futboloran72');
} else if($secim_yapimi=="Toplam Korner 8.5 Alt/Üst"){
	$translatele = getTranslation('futboloran73');
} else if($secim_yapimi=="Toplam Korner 9.5 Alt/Üst"){
	$translatele = getTranslation('futboloran74');
} else if($secim_yapimi=="Toplam Korner 10.5 Alt/Üst"){
	$translatele = getTranslation('futboloran75');
} else if($secim_yapimi=="Toplam Korner 11.5 Alt/Üst"){
	$translatele = getTranslation('futboloran76');
} else if($secim_yapimi=="Toplam Korner 12.5 Alt/Üst"){
	$translatele = getTranslation('futboloran77');
} else if($secim_yapimi=="Toplam Korner 13.5 Alt/Üst"){
	$translatele = getTranslation('futboloran78');
} else if($secim_yapimi=="Toplam Korner 14.5 Alt/Üst"){
	$translatele = getTranslation('futboloran79');
} else if($secim_yapimi=="Toplam Korner 15.5 Alt/Üst"){
	$translatele = getTranslation('futboloran80');
} else if($secim_yapimi=="1.Takım Toplam Korner 2.5 Alt/Üst"){
	$translatele = getTranslation('futboloran81');
} else if($secim_yapimi=="1.Takım Toplam Korner 3.5 Alt/Üst"){
	$translatele = getTranslation('futboloran82');
} else if($secim_yapimi=="1.Takım Toplam Korner 4.5 Alt/Üst"){
	$translatele = getTranslation('futboloran83');
} else if($secim_yapimi=="1.Takım Toplam Korner 5.5 Alt/Üst"){
	$translatele = getTranslation('futboloran84');
} else if($secim_yapimi=="1.Takım Toplam Korner 6.5 Alt/Üst"){
	$translatele = getTranslation('futboloran85');
} else if($secim_yapimi=="1.Takım Toplam Korner 7.5 Alt/Üst"){
	$translatele = getTranslation('futboloran86');
} else if($secim_yapimi=="1.Takım Toplam Korner 8.5 Alt/Üst"){
	$translatele = getTranslation('futboloran87');
} else if($secim_yapimi=="1.Takım Toplam Korner 9.5 Alt/Üst"){
	$translatele = getTranslation('futboloran88');
} else if($secim_yapimi=="1.Takım Toplam Korner 10.5 Alt/Üst"){
	$translatele = getTranslation('futboloran89');
} else if($secim_yapimi=="2.Takım Toplam Korner 2.5 Alt/Üst"){
	$translatele = getTranslation('futboloran90');
} else if($secim_yapimi=="2.Takım Toplam Korner 3.5 Alt/Üst"){
	$translatele = getTranslation('futboloran91');
} else if($secim_yapimi=="2.Takım Toplam Korner 4.5 Alt/Üst"){
	$translatele = getTranslation('futboloran92');
} else if($secim_yapimi=="2.Takım Toplam Korner 5.5 Alt/Üst"){
	$translatele = getTranslation('futboloran93');
} else if($secim_yapimi=="2.Takım Toplam Korner 6.5 Alt/Üst"){
	$translatele = getTranslation('futboloran94');
} else if($secim_yapimi=="2.Takım Toplam Korner 7.5 Alt/Üst"){
	$translatele = getTranslation('futboloran95');
} else if($secim_yapimi=="2.Takım Toplam Korner 8.5 Alt/Üst"){
	$translatele = getTranslation('futboloran96');
} else if($secim_yapimi=="2.Takım Toplam Korner 9.5 Alt/Üst"){
	$translatele = getTranslation('futboloran97');
} else if($secim_yapimi=="2.Takım Toplam Korner 10.5 Alt/Üst"){
	$translatele = getTranslation('futboloran98');
} else if($secim_yapimi=="Korner Tek/Çift"){
	$translatele = getTranslation('futboloran99');
} else if($secim_yapimi=="Hangi Takım Çok Korner Kullanır ?"){
	$translatele = getTranslation('futboloran100');
} else if($secim_yapimi=="Maç Sonucu ve 3.5 Alt/Üst"){
	$translatele = getTranslation('futboloran101');
} else if($secim_yapimi=="Ev Sahibi 0.5 Gol Alt Üst"){
	$translatele = getTranslation('futboloran102');
} else if($secim_yapimi=="Ev Sahibi 1.5 Gol Alt Üst"){
	$translatele = getTranslation('futboloran103');
} else if($secim_yapimi=="Ev Sahibi 2.5 Gol Alt Üst"){
	$translatele = getTranslation('futboloran104');
} else if($secim_yapimi=="Deplasman 0.5 Gol Alt Üst"){
	$translatele = getTranslation('futboloran105');
} else if($secim_yapimi=="Deplasman 1.5 Gol Alt Üst"){
	$translatele = getTranslation('futboloran106');
} else if($secim_yapimi=="Deplasman 2.5 Gol Alt Üst"){
	$translatele = getTranslation('futboloran107');
} else if($secim_yapimi=="Toplam Kaç Gol Atılır ?"){
	$translatele = getTranslation('futboloran108');
} else if($secim_yapimi=="1.Yarı Skoru"){
	$translatele = getTranslation('futboloran109');
} else if($secim_yapimi=="Ev Sahibi 1.Yarı 2.5 Gol Alt Üst"){
	$translatele = getTranslation('futboloran110');
} else if($secim_yapimi=="Deplasman 1.Yarı 2.5 Gol Alt Üst"){
	$translatele = getTranslation('futboloran111');
} else if($secim_yapimi=="İlk Yarıda Kaç Gol Olur ?"){
	$translatele = getTranslation('futboloran112');
} else if($secim_yapimi=="2.Yarıda Toplam Kaç Gol Olur ?"){
	$translatele = getTranslation('futboloran113');
} else if($secim_yapimi=="1. yarıda 1.golü hangi takım atar?"){
	$translatele = getTranslation('futboloran114');
} else if($secim_yapimi=="1. yarıda 2.golü hangi takım atar?"){
	$translatele = getTranslation('futboloran115');
} else if($secim_yapimi=="1.golü hangi takım atar?"){
	$translatele = getTranslation('futboloran116');
} else if($secim_yapimi=="2.golü hangi takım atar?"){
	$translatele = getTranslation('futboloran117');
} else if($secim_yapimi=="3.golü hangi takım atar?"){
	$translatele = getTranslation('futboloran118');
} else if($secim_yapimi=="4.golü hangi takım atar?"){
	$translatele = getTranslation('futboloran119');
} else if($secim_yapimi=="5.golü hangi takım atar?"){
	$translatele = getTranslation('futboloran120');
} else if($secim_yapimi=="6.golü hangi takım atar?"){
	$translatele = getTranslation('futboloran121');
} else if($secim_yapimi=="Toplam Sarı Kart 1.5 Alt/Üst"){
	$translatele = getTranslation('futboloran122');
} else if($secim_yapimi=="Toplam Sarı Kart 2.5 Alt/Üst"){
	$translatele = getTranslation('futboloran123');
} else if($secim_yapimi=="Toplam Sarı Kart 4.5 Alt/Üst"){
	$translatele = getTranslation('futboloran124');
} else if($secim_yapimi=="Kırmızı Kart Çıkarmı ?"){
	$translatele = getTranslation('futboloran125');
} else if($secim_yapimi=="Kaç Penaltı Olur ?"){
	$translatele = getTranslation('futboloran126');
} else if($secim_yapimi=="1.Takım Toplam Sarı Kart 1.5 Alt/Üst"){
	$translatele = getTranslation('futboloran127');
} else if($secim_yapimi=="1.Takım Toplam Sarı Kart 2.5 Alt/Üst"){
	$translatele = getTranslation('futboloran128');
} else if($secim_yapimi=="1.Takım Toplam Sarı Kart 3.5 Alt/Üst"){
	$translatele = getTranslation('futboloran129');
} else if($secim_yapimi=="2.Takım Toplam Sarı Kart 1.5 Alt/Üst"){
	$translatele = getTranslation('futboloran130');
} else if($secim_yapimi=="2.Takım Toplam Sarı Kart 2.5 Alt/Üst"){
	$translatele = getTranslation('futboloran131');
} else if($secim_yapimi=="2.Takım Toplam Sarı Kart 3.5 Alt/Üst"){
	$translatele = getTranslation('futboloran132');
} else if($secim_yapimi=="Sarı Kart Tek/Çift"){
	$translatele = getTranslation('futboloran133');
} else if($secim_yapimi=="1.Takım Toplam Korner 2.5 Alt/Üst"){
	$translatele = getTranslation('futboloran134');
} else if($secim_yapimi=="1.Takım Toplam Korner 3.5 Alt/Üst"){
	$translatele = getTranslation('futboloran135');
} else if($secim_yapimi=="1.Takım Toplam Korner 4.5 Alt/Üst"){
	$translatele = getTranslation('futboloran136');
} else if($secim_yapimi=="1.Takım Toplam Korner 5.5 Alt/Üst"){
	$translatele = getTranslation('futboloran137');
} else if($secim_yapimi=="1.Takım Toplam Korner 6.5 Alt/Üst"){
	$translatele = getTranslation('futboloran138');
} else if($secim_yapimi=="1.Takım Toplam Korner 7.5 Alt/Üst"){
	$translatele = getTranslation('futboloran139');
} else if($secim_yapimi=="1.Takım Toplam Korner 8.5 Alt/Üst"){
	$translatele = getTranslation('futboloran140');
} else if($secim_yapimi=="1.Takım Toplam Korner 9.5 Alt/Üst"){
	$translatele = getTranslation('futboloran141');
} else if($secim_yapimi=="1.Takım Toplam Korner 10.5 Alt/Üst"){
	$translatele = getTranslation('futboloran142');
} else if($secim_yapimi=="2.Takım Toplam Korner 2.5 Alt/Üst"){
	$translatele = getTranslation('futboloran143');
} else if($secim_yapimi=="2.Takım Toplam Korner 3.5 Alt/Üst"){
	$translatele = getTranslation('futboloran144');
} else if($secim_yapimi=="2.Takım Toplam Korner 4.5 Alt/Üst"){
	$translatele = getTranslation('futboloran145');
} else if($secim_yapimi=="2.Takım Toplam Korner 5.5 Alt/Üst"){
	$translatele = getTranslation('futboloran146');
} else if($secim_yapimi=="2.Takım Toplam Korner 6.5 Alt/Üst"){
	$translatele = getTranslation('futboloran147');
} else if($secim_yapimi=="2.Takım Toplam Korner 7.5 Alt/Üst"){
	$translatele = getTranslation('futboloran148');
} else if($secim_yapimi=="2.Takım Toplam Korner 8.5 Alt/Üst"){
	$translatele = getTranslation('futboloran149');
} else if($secim_yapimi=="2.Takım Toplam Korner 9.5 Alt/Üst"){
	$translatele = getTranslation('futboloran150');
} else if($secim_yapimi=="2.Takım Toplam Korner 10.5 Alt/Üst"){
	$translatele = getTranslation('futboloran151');
} else if($secim_yapimi=="Korner Tek/Çift"){
	$translatele = getTranslation('futboloran152');
} else if($secim_yapimi=="Hangi Takım Daha Çok Korner Kullanır ?"){
	$translatele = getTranslation('futboloran153');
} else if($secim_yapimi=="Kalan Süre Tahmini - skor:0-0"){
	$translatele = getTranslation('futboloran154');
} else if($secim_yapimi=="Kalan Süre Tahmini - skor:1-0"){
	$translatele = getTranslation('futboloran155');
} else if($secim_yapimi=="Kalan Süre Tahmini - skor:0-1"){
	$translatele = getTranslation('futboloran156');
} else if($secim_yapimi=="Kalan Süre Tahmini - skor:1-1"){
	$translatele = getTranslation('futboloran157');
} else if($secim_yapimi=="Kalan Süre Tahmini - skor:2-0"){
	$translatele = getTranslation('futboloran158');
} else if($secim_yapimi=="Kalan Süre Tahmini - skor:0-2"){
	$translatele = getTranslation('futboloran159');
} else if($secim_yapimi=="Kalan Süre Tahmini - skor:2-1"){
	$translatele = getTranslation('futboloran160');
} else if($secim_yapimi=="Kalan Süre Tahmini - skor:1-2"){
	$translatele = getTranslation('futboloran161');
} else if($secim_yapimi=="Kalan Süre Tahmini - skor:3-0"){
	$translatele = getTranslation('futboloran162');
} else if($secim_yapimi=="Kalan Süre Tahmini - skor:0-3"){
	$translatele = getTranslation('futboloran163');
} else if($secim_yapimi=="Kalan Süre Tahmini - skor:2-2"){
	$translatele = getTranslation('futboloran164');
} else if($secim_yapimi=="Kalan Süre Tahmini - skor:1-3"){
	$translatele = getTranslation('futboloran165');
} else if($secim_yapimi=="Kalan Süre Tahmini - skor:4-0"){
	$translatele = getTranslation('futboloran166');
} else if($secim_yapimi=="Kalan Süre Tahmini - skor:5-0"){
	$translatele = getTranslation('futboloran167');
} else if($secim_yapimi=="Kalan Süre Tahmini - skor:4-1"){
	$translatele = getTranslation('futboloran168');
} else if($secim_yapimi=="Kalan Süre Tahmini - skor:3-2"){
	$translatele = getTranslation('futboloran169');
} else if($secim_yapimi=="Kalan Süre Tahmini - skor:3-3"){
	$translatele = getTranslation('futboloran170');
} else {
	$translatele = $secim_yapimi;
}

} else if($row['spor_tip']=="canlib") {

if($secim_yapimi=="Kim Kazanır (Uz. Dahil)"){
	$translatele = getTranslation('basketboloran1');
} else if($secim_yapimi=="1X2 (Uz. Hariç)"){
	$translatele = getTranslation('basketboloran2');
} else if($secim_yapimi== "1X2(1.YARI)"){
	$translatele = getTranslation('basketboloran3');
} else if($secim_yapimi== "Toplam Skor Tek/Çift"){
	$translatele = getTranslation('basketboloran4');
} else if($secim_yapimi== "Toplam Skor Alt/Üst"){
	$translatele = getTranslation('basketboloran5');
} else if($secim_yapimi== "Handikap ( 1.YARI )"){
	$translatele = getTranslation('basketboloran6');
} else if($secim_yapimi== "Handikap"){
	$translatele = getTranslation('basketboloran7');
} else if($secim_yapimi== "1.Yarı / Maç Sonucu"){
	$translatele = getTranslation('basketboloran8');
} else if($secim_yapimi== "İki Devrede Kazanır"){
	$translatele = getTranslation('basketboloran9');
} else if($secim_yapimi== "Tüm Periyotları Kazanır"){
	$translatele = getTranslation('basketboloran10');
} else if($secim_yapimi== "1.Takım 1.Yarı Alt/Üst"){
	$translatele = getTranslation('basketboloran11');
} else if($secim_yapimi== "2.Takım 1.Yarı Alt/Üst"){
	$translatele = getTranslation('basketboloran12');
} else if($secim_yapimi== "1.Takım Alt/Üst"){
	$translatele = getTranslation('basketboloran13');
} else if($secim_yapimi== "2.Takım Alt/Üst"){
	$translatele = getTranslation('basketboloran14');
} else if($secim_yapimi== "1.Takım 1.Çeyrek Alt/Üst"){
	$translatele = getTranslation('basketboloran15');
} else if($secim_yapimi== "2.Takım 1.Çeyrek Alt/Üst"){
	$translatele = getTranslation('basketboloran16');
} else if($secim_yapimi== "1.Çeyrek Kim Kazanır"){
	$translatele = getTranslation('basketboloran17');
} else if($secim_yapimi== "1.Çeyrek Toplam Tek/Çift"){
	$translatele = getTranslation('basketboloran18');
} else if($secim_yapimi== "1.Yarı Toplam Tek/Çift"){
	$translatele = getTranslation('basketboloran19');
} else if($secim_yapimi== "1X2(2.YARI)"){
	$translatele = getTranslation('basketboloran20');
} else if($secim_yapimi== "1X2(1.Çeyrek)"){
	$translatele = getTranslation('basketboloran21');
} else if($secim_yapimi== "1X2(2.Çeyrek)"){
	$translatele = getTranslation('basketboloran22');
} else if($secim_yapimi== "1X2(3.Çeyrek)"){
	$translatele = getTranslation('basketboloran23');
} else if($secim_yapimi== "1X2(4.Çeyrek)"){
	$translatele = getTranslation('basketboloran24');
} else if($secim_yapimi== "2.Çeyrek Kim Kazanır"){
	$translatele = getTranslation('basketboloran25');
} else if($secim_yapimi== "3.Çeyrek Kim Kazanır"){
	$translatele = getTranslation('basketboloran26');
} else if($secim_yapimi== "4.Çeyrek Kim Kazanır"){
	$translatele = getTranslation('basketboloran27');
} else if($secim_yapimi== "1.Çeyrek Toplam Alt/Üst"){
	$translatele = getTranslation('basketboloran28');
} else if($secim_yapimi== "2.Çeyrek Toplam Alt/Üst"){
	$translatele = getTranslation('basketboloran29');
} else if($secim_yapimi== "3.Çeyrek Toplam Alt/Üst"){
	$translatele = getTranslation('basketboloran30');
} else if($secim_yapimi== "4.Çeyrek Toplam Alt/Üst"){
	$translatele = getTranslation('basketboloran31');
} else if($secim_yapimi== "1.Takım Toplam Alt/Üst"){
	$translatele = getTranslation('basketboloran32');
} else if($secim_yapimi== "2.Takım Toplam Alt/Üst"){
	$translatele = getTranslation('basketboloran33');
} else if($secim_yapimi== "1.Takım 1.Yarı Toplam Alt/Üst"){
	$translatele = getTranslation('basketboloran34');
} else if($secim_yapimi== "2.Takım 1.Yarı Toplam Alt/Üst"){
	$translatele = getTranslation('basketboloran35');
} else if($secim_yapimi== "1.Yarı Handikap"){
	$translatele = getTranslation('basketboloran36');
} else if($secim_yapimi== "2.Yarı Handikap"){
	$translatele = getTranslation('basketboloran37');
} else if($secim_yapimi== "1.Çeyrek Handikap"){
	$translatele = getTranslation('basketboloran38');
} else if($secim_yapimi== "2.Çeyrek Handikap"){
	$translatele = getTranslation('basketboloran39');
} else if($secim_yapimi== "3.Çeyrek Handikap"){
	$translatele = getTranslation('basketboloran40');
} else if($secim_yapimi== "4.Çeyrek Handikap"){
	$translatele = getTranslation('basketboloran41');
} else if($secim_yapimi== "2.Yarı Toplam Tek/Çift"){
	$translatele = getTranslation('basketboloran42');
} else if($secim_yapimi== "2.Çeyrek Toplam Tek/Çift"){
	$translatele = getTranslation('basketboloran43');
} else if($secim_yapimi== "3.Çeyrek Toplam Tek/Çift"){
	$translatele = getTranslation('basketboloran44');
} else if($secim_yapimi== "4.Çeyrek Toplam Tek/Çift"){
	$translatele = getTranslation('basketboloran45');
} else if($secim_yapimi== "Toplam Tek/Çift"){
	$translatele = getTranslation('basketboloran46');
} else if($secim_yapimi== "1.Yarı Kim Kazanır"){
	$translatele = getTranslation('basketboloran47');
} else if($secim_yapimi== "2.Yarı Kim Kazanır"){
	$translatele = getTranslation('basketboloran48');
} else {
	$translatele = $secim_yapimi;
}

} else if($row['spor_tip']=="canlit") {

if($secim_yapimi=="Kim Kazanır"){
	$translatele = getTranslation('tenisoran1');
} else if($secim_yapimi=="Set Bahisi"){
	$translatele = getTranslation('tenisoran2');
} else {
	$translatele = $secim_yapimi;
}

} else if($row['spor_tip']=="canliv") {

if($secim_yapimi=="Kim Kazanır"){
	$translatele = getTranslation('voleyboloran1');
} else if($secim_yapimi=="Set bahisi"){
	$translatele = getTranslation('voleyboloran2');
} else if($secim_yapimi=="Toplam Alt/Üst"){
	$translatele = getTranslation('voleyboloran3');
} else if($secim_yapimi=="5 Set Sürermi ?"){
	$translatele = getTranslation('voleyboloran4');
} else if($secim_yapimi=="1.Seti Kim Kazanır ?"){
	$translatele = getTranslation('voleyboloran5');
} else if($secim_yapimi=="2.Seti Kim Kazanır ?"){
	$translatele = getTranslation('voleyboloran6');
} else if($secim_yapimi=="3.Seti Kim Kazanır ?"){
	$translatele = getTranslation('voleyboloran7');
} else if($secim_yapimi=="4.Seti Kim Kazanır ?"){
	$translatele = getTranslation('voleyboloran8');
} else if($secim_yapimi=="Set bahisi (5 maç üzerinden)"){
	$translatele = getTranslation('voleyboloran9');
} else if($secim_yapimi=="Toplam Kaç Set Oynanır ?"){
	$translatele = getTranslation('voleyboloran10');
} else if($secim_yapimi=="1.Takım Toplam Sayı Alt/Üst"){
	$translatele = getTranslation('voleyboloran11');
} else if($secim_yapimi=="2.Takım Toplam Sayı Alt/Üst"){
	$translatele = getTranslation('voleyboloran12');
} else if($secim_yapimi=="1.Takım 1.Set Toplam Sayı Alt/Üst"){
	$translatele = getTranslation('voleyboloran13');
} else if($secim_yapimi=="2.Takım 1.Set Toplam Sayı Alt/Üst"){
	$translatele = getTranslation('voleyboloran14');
} else if($secim_yapimi=="1.Takım 2.Set Toplam Sayı Alt/Üst"){
	$translatele = getTranslation('voleyboloran15');
} else if($secim_yapimi=="2.Takım 2.Set Toplam Sayı Alt/Üst"){
	$translatele = getTranslation('voleyboloran16');
} else if($secim_yapimi=="1.Takım 3.Set Toplam Sayı Alt/Üst"){
	$translatele = getTranslation('voleyboloran17');
} else if($secim_yapimi=="2.Takım 3.Set Toplam Sayı Alt/Üst"){
	$translatele = getTranslation('voleyboloran18');
} else if($secim_yapimi=="1.Takım 4.Set Toplam Sayı Alt/Üst"){
	$translatele = getTranslation('voleyboloran19');
} else if($secim_yapimi=="2.Takım 4.Set Toplam Sayı Alt/Üst"){
	$translatele = getTranslation('voleyboloran20');
} else if($secim_yapimi=="Toplam Skor Alt/Üst"){
	$translatele = getTranslation('voleyboloran21');
} else if($secim_yapimi=="Toplam Sayı Tek/Çift"){
	$translatele = getTranslation('voleyboloran22');
} else if($secim_yapimi=="1.Set Toplam Sayı Tek/Çift"){
	$translatele = getTranslation('voleyboloran23');
} else if($secim_yapimi=="2.Set Toplam Sayı Tek/Çift"){
	$translatele = getTranslation('voleyboloran24');
} else if($secim_yapimi=="3.Set Toplam Sayı Tek/Çift"){
	$translatele = getTranslation('voleyboloran25');
} else if($secim_yapimi=="4.Set Toplam Sayı Tek/Çift"){
	$translatele = getTranslation('voleyboloran26');
} else if($secim_yapimi=="Müsabaka 5.Set Sürermi"){
	$translatele = getTranslation('voleyboloran27');
} else {
	$translatele = $secim_yapimi;
}

} else if($row['spor_tip']=="canlibuz") {

if($secim_yapimi=="Kim Kazanır"){
	$translatele = getTranslation('buzhokeyioran1');
} else if($secim_yapimi=="1X2"){
	$translatele = getTranslation('buzhokeyioran2');
} else if($secim_yapimi=="1.P Maç Sonucu"){
	$translatele = getTranslation('buzhokeyioran3');
} else if($secim_yapimi=="2.P Maç Sonucu"){
	$translatele = getTranslation('buzhokeyioran4');
} else if($secim_yapimi=="3.P Maç Sonucu"){
	$translatele = getTranslation('buzhokeyioran5');
} else if($secim_yapimi=="Cifte Sans"){
	$translatele = getTranslation('buzhokeyioran6');
} else if($secim_yapimi=="1.P Çifte Şans"){
	$translatele = getTranslation('buzhokeyioran7');
} else if($secim_yapimi=="2.P Çifte Şans"){
	$translatele = getTranslation('buzhokeyioran8');
} else if($secim_yapimi=="3.P Çifte Şans"){
	$translatele = getTranslation('buzhokeyioran9');
} else if($secim_yapimi=="Hangi periyod daha cok gol olur?"){
	$translatele = getTranslation('buzhokeyioran10');
} else {
	$translatele = $secim_yapimi;
}

} else if($row['spor_tip']=="canlimt") {

if($secim_yapimi=="Kim Kazanır"){
	$translatele = getTranslation('masatenisioran1');
} else if($secim_yapimi=="Set Bahisi"){
	$translatele = getTranslation('masatenisioran2');
} else if($secim_yapimi=="1. ve 2.Seti Kim Kazanır ?"){
	$translatele = getTranslation('masatenisioran3');
} else if($secim_yapimi=="2. ve 3.Seti Kim Kazanır ?"){
	$translatele = getTranslation('masatenisioran4');
} else if($secim_yapimi=="1.Seti Kim Kazanır"){
	$translatele = getTranslation('masatenisioran5');
} else if($secim_yapimi=="Toplam Skor"){
	$translatele = getTranslation('masatenisioran6');
} else if($secim_yapimi=="2.Seti Kim Kazanır"){
	$translatele = getTranslation('masatenisioran7');
} else if($secim_yapimi=="3.Seti Kim Kazanır"){
	$translatele = getTranslation('masatenisioran8');
} else if($secim_yapimi=="4.Seti Kim Kazanır"){
	$translatele = getTranslation('masatenisioran9');
} else if($secim_yapimi=="5.Seti Kim Kazanır"){
	$translatele = getTranslation('masatenisioran10');
} else {
	$translatele = $secim_yapimi;
}

}

if($dil_bilgisi22['language']=='en'){

if($secim_yapimi2=="E"){ $translatele2 = "Y";
} else if($secim_yapimi2=="H"){ $translatele2 = "N";
} else if($secim_yapimi2=="A"){ $translatele2 = "U";
} else if($secim_yapimi2=="Ü"){ $translatele2 = "O";
} else if($secim_yapimi2=="1 ve Ü"){ $translatele2 = "1 and O";
} else if($secim_yapimi2=="2 ve Ü"){ $translatele2 = "2 and O";
} else if($secim_yapimi2=="1 ve A"){ $translatele2 = "1 and U";
} else if($secim_yapimi2=="2 ve A"){ $translatele2 = "2 and U";
} else if($secim_yapimi2=="1 ve V"){ $translatele2 = "1 and Y";
} else if($secim_yapimi2=="2 ve V"){ $translatele2 = "2 and Y";
} else if($secim_yapimi2=="1 ve Y"){ $translatele2 = "1 and N";
} else if($secim_yapimi2=="2 ve Y"){ $translatele2 = "2 and N";
} else if($secim_yapimi2=="Gol Yok"){ $translatele2 = "No Goal";
} else if($secim_yapimi2=="X ve V"){ $translatele2 = "X and Y";
} else if($secim_yapimi2=="Ç"){ $translatele2 = "D";
} else if($secim_yapimi2=="T"){ $translatele2 = "S";
} else { 
$translatele2 = $secim_yapimi2;
}

} else if($dil_bilgisi22['language']=='de'){ 

if($secim_yapimi2=="E"){ $translatele2 = "J";
} else if($secim_yapimi2=="H"){ $translatele2 = "K";
} else if($secim_yapimi2=="A"){ $translatele2 = "N";
} else if($secim_yapimi2=="Ü"){ $translatele2 = "T";
} else if($secim_yapimi2=="1 ve Ü"){ $translatele2 = "1 und T";
} else if($secim_yapimi2=="2 ve Ü"){ $translatele2 = "2 und T";
} else if($secim_yapimi2=="1 ve A"){ $translatele2 = "1 und N";
} else if($secim_yapimi2=="2 ve A"){ $translatele2 = "2 und N";
} else if($secim_yapimi2=="1 ve V"){ $translatele2 = "1 und J";
} else if($secim_yapimi2=="2 ve V"){ $translatele2 = "2 und J";
} else if($secim_yapimi2=="1 ve Y"){ $translatele2 = "1 und K";
} else if($secim_yapimi2=="2 ve Y"){ $translatele2 = "2 und K";
} else if($secim_yapimi2=="Gol Yok"){ $translatele2 = "Kein Ziel";
} else if($secim_yapimi2=="X ve V"){ $translatele2 = "X und J";
} else if($secim_yapimi2=="Ç"){ $translatele2 = "P";
} else if($secim_yapimi2=="T"){ $translatele2 = "E";
} else { 
$translatele2 = $secim_yapimi2;
}

} else if($dil_bilgisi22['language']=='ar'){ 

if($secim_yapimi2=="E"){ $translatele2 = "أجل";
} else if($secim_yapimi2=="H"){ $translatele2 = "لا";
} else if($secim_yapimi2=="A"){ $translatele2 = "أدنى";
} else if($secim_yapimi2=="Ü"){ $translatele2 = "أعلى";
} else if($secim_yapimi2=="1 ve Ü"){ $translatele2 = "1 وما فوق";
} else if($secim_yapimi2=="2 ve Ü"){ $translatele2 = "2 وما فوق";
} else if($secim_yapimi2=="1 ve A"){ $translatele2 = "1 و السفلى";
} else if($secim_yapimi2=="2 ve A"){ $translatele2 = "2 و السفلى";
} else if($secim_yapimi2=="1 ve V"){ $translatele2 = "1 و نعم";
} else if($secim_yapimi2=="2 ve V"){ $translatele2 = "2 و نعم";
} else if($secim_yapimi2=="1 ve Y"){ $translatele2 = "1 و لا";
} else if($secim_yapimi2=="2 ve Y"){ $translatele2 = "2 و لا";
} else if($secim_yapimi2=="Gol Yok"){ $translatele2 = "لا هدف";
} else if($secim_yapimi2=="X ve V"){ $translatele2 = "س ونعم";
} else if($secim_yapimi2=="Ç"){ $translatele2 = "زوجان";
} else if($secim_yapimi2=="T"){ $translatele2 = "واحد";
} else { 
$translatele2 = $secim_yapimi2;
}

} else if($dil_bilgisi22['language']=='ru'){ 

if($secim_yapimi2=="E"){ $translatele2 = "да";
} else if($secim_yapimi2=="H"){ $translatele2 = "нет";
} else if($secim_yapimi2=="A"){ $translatele2 = "ниже";
} else if($secim_yapimi2=="Ü"){ $translatele2 = "топ";
} else if($secim_yapimi2=="1 ve Ü"){ $translatele2 = "1 и выше";
} else if($secim_yapimi2=="2 ve Ü"){ $translatele2 = "2 и выше";
} else if($secim_yapimi2=="1 ve A"){ $translatele2 = "1 и ниже";
} else if($secim_yapimi2=="2 ve A"){ $translatele2 = "2 и ниже";
} else if($secim_yapimi2=="1 ve V"){ $translatele2 = "1 и да";
} else if($secim_yapimi2=="2 ve V"){ $translatele2 = "2 и да";
} else if($secim_yapimi2=="1 ve Y"){ $translatele2 = "1 и нет";
} else if($secim_yapimi2=="2 ve Y"){ $translatele2 = "2 и нет";
} else if($secim_yapimi2=="Gol Yok"){ $translatele2 = "Нет цели";
} else if($secim_yapimi2=="X ve V"){ $translatele2 = "Х и да";
} else if($secim_yapimi2=="Ç"){ $translatele2 = "пара";
} else if($secim_yapimi2=="T"){ $translatele2 = "один";
} else { 
$translatele2 = $secim_yapimi2;
}

} else { 
$translatele2 = $secim_yapimi2;
}

$sari_kart_bol = explode(" - ",$row['sari_kart']);
$kirmizi_kart_bol = explode(" - ",$row['kirmizi_kart']);
$korner_bol = explode(" - ",$row['korner']);
$penalti_bol = explode(" - ",$row['penalti']);

$birperiod_bol = explode(" - ",$row['birperiod']);
$ikiperiod_bol = explode(" - ",$row['ikiperiod']);
$ucperiod_bol = explode(" - ",$row['ucperiod']);
$dortperiod_bol = explode(" - ",$row['dortperiod']);
$besperiod_bol = explode(" - ",$row['besperiod']);

?>

<tr class="itext-<?php if($row['kazanma']=="1") { echo "3"; } else if($row['kazanma']=="2") { echo "1"; } else if($row['kazanma']=="3") { echo "2"; } else if($row['kazanma']=="4") { echo "4"; } ?> c">
<td style="text-align:center;"><div class="icon">
<?php if($row['spor_tip']=="sanal") { ?><?=getTranslation('ajaxkupond20')?><?php } else { ?>

<?php if($row['spor_tip']=="futbol") { ?>
<div class="sports soccer" title="Futbol"></div>
<?php } else if($row['spor_tip']=="canli") { ?>
<div class="sports soccer" title="Futbol"></div>
<?php } else if($row['spor_tip']=="canlib") { ?>
<div class="sports basketball" title="Basketbol"></div>
<?php } else if($row['spor_tip']=="canlit") { ?>
<div class="sports tennis" title="Tenis"></div>
<?php } else if($row['spor_tip']=="canliv") { ?>
<div class="sports volleyball" title="Voleybol"></div>
<?php } else if($row['spor_tip']=="canlibuz") { ?>
<div class="sports ice-hockey" title="Buz Hokeyi"></div>
<?php } else if($row['spor_tip']=="canlih") { ?>
<div class="sports handball" title="Hentbol"></div>
<?php } else if($row['spor_tip']=="basketbol") { ?>
<div class="sports basketball" title="Basketbol"></div>
<?php } else if($row['spor_tip']=="tenis") { ?>
<div class="sports tennis" title="Tenis"></div>
<?php } else if($row['spor_tip']=="voleybol") { ?>
<div class="sports volleyball" title="Voleybol"></div>
<?php } else if($row['spor_tip']=="buzhokeyi") { ?>
<div class="sports ice-hockey" title="Buz Hokeyi"></div>
<?php } else if($row['spor_tip']=="masatenisi") { ?>
<div class="sports table-tennis" title="Masa Tenisi"></div>
<?php } else if($row['spor_tip']=="beyzbol") { ?>
<div class="sports baseball" title="Beyzbol"></div>
<?php } else if($row['spor_tip']=="rugby") { ?>
<div class="sports rugby" title="Rugby"></div>
<?php } else if($row['spor_tip']=="dovus") { ?>
<div class="sports boxing" title="MMA"></div>
<?php } ?>

<?php } ?>
</div></td>
<td style="text-align:center;">&nbsp;&nbsp;
<?php if($row['spor_tip']=="sanal") { ?>
<?=$row['sezon']; ?> / <?=$row['hafta']; ?>
<?php } else { ?>

<?php if($row['mac_kodu']=="CNL") { ?>
<?=getTranslation('ajaxkupond21')?>
<?php } else if($row['mac_kodu']=="CNLB") { ?>
<?=getTranslation('ajaxkupond22')?>
<?php } else if($row['mac_kodu']=="CNLT") { ?>
<?=getTranslation('ajaxkupond23')?>
<?php } else if($row['mac_kodu']=="CNLV") { ?>
<?=getTranslation('ajaxkupond24')?>
<?php } else if($row['mac_kodu']=="CNLBUZ") { ?>
<?=getTranslation('ajaxkupond25')?>
<?php } else if($row['mac_kodu']=="CNLH") { ?>
<?=getTranslation('ajaxkupond26')?>
<?php } else { ?>
<?=$row['mac_kodu']; ?>
<?php } ?>

<?php } ?>
</td>
<td class="l"><?=$row['ev_takim']; ?> - <?=$row['konuk_takim']; ?></td>
<td style="text-align:center;"><?=$zaman;?></td>
<td style="text-align:center;"><?=$translatele;?></td>
<td style="text-align:center;"><?=$translatele2;?> <?php if(!empty($row['oran_val'])) { echo "($row[oran_val])"; } ?></td>
<td style="text-align:center;"><?php $oranes = nf($row['oran']); echo $oranes; ?></td>
<?=$canlimi;?>
<td style="text-align:center;">
<?php if($row['kazanma']=="1") { ?>
<img src="/assets/img/ticket/ticket_3.png" alt="Statu" border="0">
<?php } else if($row['kazanma']=="2") { ?>
<img src="/assets/img/ticket/ticket_1.png" alt="Statu" border="0">
<?php } else if($row['kazanma']=="3") { ?>
<img src="/assets/img/ticket/ticket_2.png" alt="Statu" border="0">
<?php } else if($row['kazanma']=="4") { ?>
<img src="/assets/img/ticket/ticket_4.png" alt="Statu" border="0">
<?php } ?>
</td>
<td style="text-align:center;" class="l"><?=$canlizaman;?></td>
<td style="text-align:center;"><?=$sonuc_versene;?> <br> <?php if($oranes=="1.00") { echo getTranslation('ajaxkupond45'); } else if($row['kazanma']=="1") { echo $macsonucu; } else { ?><?=getTranslation('kupondegistir28')?><?php } ?></td>
</tr>

<tr id="ticdet_<?=$row['id']; ?>" style="display: none;">
<?php if($row['spor_tip']=="futbol" || $row['spor_tip']=="canli") { ?>
<td colspan="12">
<span style="display: block;width: 25%;float: left;text-align: center;"><b><?=getTranslation('ajaxkupond46')?></b><br><?=getTranslation('ajaxkupond50')?> ( <font style="color:#f00;font-weight: bold;"><?=$sari_kart_bol[0];?></font> )<br><?=getTranslation('ajaxkupond51')?> ( <font style="color:#f00;font-weight: bold;"><?=$sari_kart_bol[1];?></font> )<br></span>
<span style="display: block;width: 25%;float: left;text-align: center;"><b><?=getTranslation('ajaxkupond47')?></b><br><?=getTranslation('ajaxkupond50')?> ( <font style="color:#f00;font-weight: bold;"><?=$kirmizi_kart_bol[0];?></font> )<br><?=getTranslation('ajaxkupond51')?> ( <font style="color:#f00;font-weight: bold;"><?=$kirmizi_kart_bol[1];?></font> )<br></span>
<span style="display: block;width: 25%;float: left;text-align: center;"><b><?=getTranslation('ajaxkupond48')?></b><br><?=getTranslation('ajaxkupond50')?> ( <font style="color:#f00;font-weight: bold;"><?=$korner_bol[0];?></font> )<br><?=getTranslation('ajaxkupond51')?> ( <font style="color:#f00;font-weight: bold;"><?=$korner_bol[1];?></font> )<br></span>
<span style="display: block;width: 25%;float: left;text-align: center;"><b><?=getTranslation('ajaxkupond49')?></b><br><?=getTranslation('ajaxkupond50')?> ( <font style="color:#f00;font-weight: bold;"><?=$penalti_bol[0];?></font> )<br><?=getTranslation('ajaxkupond51')?> ( <font style="color:#f00;font-weight: bold;"><?=$penalti_bol[1];?></font> )<br></span>
</td>
<?php } else if($row['spor_tip']=="basketbol" || $row['spor_tip']=="canlib") { ?>
<td colspan="12">
<span style="display: block;width: <?php if($besperiod_bol[0]+$besperiod_bol[1]>0) { ?>20%<?php } else { ?>25%<?php } ?>;float: left;text-align: center;"><b><?=getTranslation('ajaxkupond52')?></b><br><?=getTranslation('ajaxkupond50')?> ( <font style="color:#f00;font-weight: bold;"><?=$birperiod_bol[0];?></font> )<br><?=getTranslation('ajaxkupond51')?> ( <font style="color:#f00;font-weight: bold;"><?=$birperiod_bol[1];?></font> )<br></span>
<span style="display: block;width: <?php if($besperiod_bol[0]+$besperiod_bol[1]>0) { ?>20%<?php } else { ?>25%<?php } ?>;float: left;text-align: center;"><b><?=getTranslation('ajaxkupond53')?></b><br><?=getTranslation('ajaxkupond50')?> ( <font style="color:#f00;font-weight: bold;"><?=$ikiperiod_bol[0];?></font> )<br><?=getTranslation('ajaxkupond51')?> ( <font style="color:#f00;font-weight: bold;"><?=$ikiperiod_bol[1];?></font> )<br></span>
<span style="display: block;width: <?php if($besperiod_bol[0]+$besperiod_bol[1]>0) { ?>20%<?php } else { ?>25%<?php } ?>;float: left;text-align: center;"><b><?=getTranslation('ajaxkupond54')?></b><br><?=getTranslation('ajaxkupond50')?> ( <font style="color:#f00;font-weight: bold;"><?=$ucperiod_bol[0];?></font> )<br><?=getTranslation('ajaxkupond51')?> ( <font style="color:#f00;font-weight: bold;"><?=$ucperiod_bol[1];?></font> )<br></span>
<span style="display: block;width: <?php if($besperiod_bol[0]+$besperiod_bol[1]>0) { ?>20%<?php } else { ?>25%<?php } ?>;float: left;text-align: center;"><b><?=getTranslation('ajaxkupond55')?></b><br><?=getTranslation('ajaxkupond50')?> ( <font style="color:#f00;font-weight: bold;"><?=$dortperiod_bol[0];?></font> )<br><?=getTranslation('ajaxkupond51')?> ( <font style="color:#f00;font-weight: bold;"><?=$dortperiod_bol[1];?></font> )<br></span>
<?php if($besperiod_bol[0]+$besperiod_bol[1]>0) { ?>
<span style="display: block;width: 20%;float: left;text-align: center;"><b><?=getTranslation('ajaxkupond56')?></b><br><?=getTranslation('ajaxkupond50')?> ( <font style="color:#f00;font-weight: bold;"><?=$besperiod_bol[0];?></font> )<br><?=getTranslation('ajaxkupond51')?> ( <font style="color:#f00;font-weight: bold;"><?=$besperiod_bol[1];?></font> )<br></span>
<?php } ?>
</td>
<?php } else if($row['spor_tip']=="tenis" || $row['spor_tip']=="canlit") { ?>
<td colspan="12">
<span style="display: block;width: <?php if($besperiod_bol[0]+$besperiod_bol[1]>0) { ?>20%<?php } else if($dortperiod_bol[0]+$dortperiod_bol[1]>0) { ?>25%<?php } else if($ucperiod_bol[0]+$ucperiod_bol[1]>0) { ?>33%<?php } else { ?>50%<?php } ?>;float: left;text-align: center;"><b><?=getTranslation('ajaxkupond57')?></b><br><?=getTranslation('ajaxkupond50')?> ( <font style="color:#f00;font-weight: bold;"><?=$birperiod_bol[0];?></font> )<br><?=getTranslation('ajaxkupond51')?> ( <font style="color:#f00;font-weight: bold;"><?=$birperiod_bol[1];?></font> )<br></span>
<span style="display: block;width: <?php if($ucperiod_bol[0]+$ucperiod_bol[1]>0) { ?>33%<?php } else { ?>50%<?php } ?>;float: left;text-align: center;"><b><?=getTranslation('ajaxkupond58')?></b><br><?=getTranslation('ajaxkupond50')?> ( <font style="color:#f00;font-weight: bold;"><?=$ikiperiod_bol[0];?></font> )<br><?=getTranslation('ajaxkupond51')?> ( <font style="color:#f00;font-weight: bold;"><?=$ikiperiod_bol[1];?></font> )<br></span>
<?php if($ucperiod_bol[0]+$ucperiod_bol[1]>0) { ?>
<span style="display: block;width: 33%;float: left;text-align: center;"><b><?=getTranslation('ajaxkupond59')?></b><br><?=getTranslation('ajaxkupond50')?> ( <font style="color:#f00;font-weight: bold;"><?=$ucperiod_bol[0];?></font> )<br><?=getTranslation('ajaxkupond51')?> ( <font style="color:#f00;font-weight: bold;"><?=$ucperiod_bol[1];?></font> )<br></span>
<?php } ?>
<?php if($dortperiod_bol[0]+$dortperiod_bol[1]>0) { ?>
<span style="display: block;width: 25%;float: left;text-align: center;"><b>4.<?=getTranslation('ajaxcanlibahisler9')?></b><br><?=getTranslation('ajaxkupond50')?> ( <font style="color:#f00;font-weight: bold;"><?=$dortperiod_bol[0];?></font> )<br><?=getTranslation('ajaxkupond51')?> ( <font style="color:#f00;font-weight: bold;"><?=$dortperiod_bol[1];?></font> )<br></span>
<?php } ?>
<?php if($besperiod_bol[0]+$besperiod_bol[1]>0) { ?>
<span style="display: block;width: 20%;float: left;text-align: center;"><b>5.<?=getTranslation('ajaxcanlibahisler9')?></b><br><?=getTranslation('ajaxkupond50')?> ( <font style="color:#f00;font-weight: bold;"><?=$besperiod_bol[0];?></font> )<br><?=getTranslation('ajaxkupond51')?> ( <font style="color:#f00;font-weight: bold;"><?=$besperiod_bol[1];?></font> )<br></span>
<?php } ?>
</td>
<?php } else if($row['spor_tip']=="voleybol" || $row['spor_tip']=="canliv") { ?>
<td colspan="12">
<span style="display: block;width: <?php if($besperiod_bol[0]+$besperiod_bol[1]>0) { ?>20%<?php } else { ?>25%<?php } ?>;float: left;text-align: center;"><b><?=getTranslation('ajaxkupond57')?></b><br><?=getTranslation('ajaxkupond50')?> ( <font style="color:#f00;font-weight: bold;"><?=$birperiod_bol[0];?></font> )<br><?=getTranslation('ajaxkupond51')?> ( <font style="color:#f00;font-weight: bold;"><?=$birperiod_bol[1];?></font> )<br></span>
<span style="display: block;width: <?php if($besperiod_bol[0]+$besperiod_bol[1]>0) { ?>20%<?php } else { ?>25%<?php } ?>;float: left;text-align: center;"><b><?=getTranslation('ajaxkupond58')?></b><br><?=getTranslation('ajaxkupond50')?> ( <font style="color:#f00;font-weight: bold;"><?=$ikiperiod_bol[0];?></font> )<br><?=getTranslation('ajaxkupond51')?> ( <font style="color:#f00;font-weight: bold;"><?=$ikiperiod_bol[1];?></font> )<br></span>
<span style="display: block;width: <?php if($besperiod_bol[0]+$besperiod_bol[1]>0) { ?>20%<?php } else { ?>25%<?php } ?>;float: left;text-align: center;"><b><?=getTranslation('ajaxkupond59')?></b><br><?=getTranslation('ajaxkupond50')?> ( <font style="color:#f00;font-weight: bold;"><?=$ucperiod_bol[0];?></font> )<br><?=getTranslation('ajaxkupond51')?> ( <font style="color:#f00;font-weight: bold;"><?=$ucperiod_bol[1];?></font> )<br></span>
<span style="display: block;width: <?php if($besperiod_bol[0]+$besperiod_bol[1]>0) { ?>20%<?php } else { ?>25%<?php } ?>;float: left;text-align: center;"><b><?=getTranslation('ajaxkupond60')?></b><br><?=getTranslation('ajaxkupond50')?> ( <font style="color:#f00;font-weight: bold;"><?=$dortperiod_bol[0];?></font> )<br><?=getTranslation('ajaxkupond51')?> ( <font style="color:#f00;font-weight: bold;"><?=$dortperiod_bol[1];?></font> )<br></span>
<?php if($besperiod_bol[0]+$besperiod_bol[1]>0) { ?>
<span style="display: block;width: 20%;float: left;text-align: center;"><b><?=getTranslation('ajaxkupond61')?></b><br><?=getTranslation('ajaxkupond50')?> ( <font style="color:#f00;font-weight: bold;"><?=$besperiod_bol[0];?></font> )<br><?=getTranslation('ajaxkupond51')?> ( <font style="color:#f00;font-weight: bold;"><?=$besperiod_bol[1];?></font> )<br></span>
<?php } ?>
</td>
<?php } else if($row['spor_tip']=="buzhokeyi" || $row['spor_tip']=="canlibuz") { ?>
<td colspan="12">
<span style="display: block;width: 33%;float: left;text-align: center;"><b><?=getTranslation('ajaxkupond62')?></b><br><?=getTranslation('ajaxkupond50')?> ( <font style="color:#f00;font-weight: bold;"><?=$birperiod_bol[0];?></font> )<br><?=getTranslation('ajaxkupond51')?> ( <font style="color:#f00;font-weight: bold;"><?=$birperiod_bol[1];?></font> )<br></span>
<span style="display: block;width: 33%;float: left;text-align: center;"><b><?=getTranslation('ajaxkupond63')?></b><br><?=getTranslation('ajaxkupond50')?> ( <font style="color:#f00;font-weight: bold;"><?=$ikiperiod_bol[0];?></font> )<br><?=getTranslation('ajaxkupond51')?> ( <font style="color:#f00;font-weight: bold;"><?=$ikiperiod_bol[1];?></font> )<br></span>
<span style="display: block;width: 33%;float: left;text-align: center;"><b><?=getTranslation('ajaxkupond64')?></b><br><?=getTranslation('ajaxkupond50')?> ( <font style="color:#f00;font-weight: bold;"><?=$ucperiod_bol[0];?></font> )<br><?=getTranslation('ajaxkupond51')?> ( <font style="color:#f00;font-weight: bold;"><?=$ucperiod_bol[1];?></font> )<br></span>
</td>
<?php } else if($row['spor_tip']=="hentbol") { ?>
<td colspan="12">
<span style="display: block;width: 33%;float: left;text-align: center;"><b><?=getTranslation('ajaxkupond65')?></b><br><?=getTranslation('ajaxkupond50')?> ( <font style="color:#f00;font-weight: bold;"><?=$birperiod_bol[0];?></font> )<br><?=getTranslation('ajaxkupond51')?> ( <font style="color:#f00;font-weight: bold;"><?=$birperiod_bol[1];?></font> )<br></span>
<span style="display: block;width: 33%;float: left;text-align: center;"><b><?=getTranslation('ajaxkupond66')?></b><br><?=getTranslation('ajaxkupond50')?> ( <font style="color:#f00;font-weight: bold;"><?=$ikiperiod_bol[0];?></font> )<br><?=getTranslation('ajaxkupond51')?> ( <font style="color:#f00;font-weight: bold;"><?=$ikiperiod_bol[1];?></font> )<br></span>
<span style="display: block;width: 33%;float: left;text-align: center;"><b><?=getTranslation('ajaxkupond67')?></b><br><?=getTranslation('ajaxkupond50')?> ( <font style="color:#f00;font-weight: bold;"><?=$birperiod_bol[0]+$ikiperiod_bol[0];?></font> )<br><?=getTranslation('ajaxkupond51')?> ( <font style="color:#f00;font-weight: bold;"><?=$birperiod_bol[1]+$ikiperiod_bol[1];?></font> )<br></span>
</td>
<?php } ?>
</tr>

<?php } ?>


<tr>
<td colspan="16">
<table class="tablesorter">
<tbody>
<tr>
<td><?=getTranslation('ajaxkupond68')?></td>
<td><strong><?=nf($kb['yatan']); ?></strong></td>
<td><?=getTranslation('ajaxkupond69')?></td>
<td><strong><?=nf($kb['oran']); ?></strong></td>
<td><?=getTranslation('ajaxkupond70')?></td>
<td><strong><?=nf($kb['tutar']); ?></strong></td>
<td><?=getTranslation('ajaxkupond71')?></td>
<td><strong><?=durumnedir($kb['durum']); ?></strong></td>


<?php if($ouseri['kazananyuzde']!="0" || $ouseri['kazananyuzde']!=""  || $ouseri_ust['kazananyuzde']!="0" || $ouseri_ust['kazananyuzde']!="") { 


if($ouseri['wkdurum']=="1") {
$yuzdesi = yuzdes($ouseri_ust['kazananyuzde']); 
} else {
$yuzdesi = yuzdes($ouseri['kazananyuzde']); 
}

$kesinti = $kb['tutar']*$yuzdesi;

$gercektutar = $kb['tutar']-$kesinti;

?>

<td><?=getTranslation('ajaxkupond72')?></td>
<td><strong><?=nf($kesinti);?></strong></td>

<td><?=getTranslation('ajaxkupond73')?></td>
<td><strong><?=nf($gercektutar);?></strong></td>

<?php } ?>


</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td colspan="12">
<div class="notice info">
<p><strong><?=getTranslation('ajaxkupond74')?>:</strong><?=date("d-m-Y H:i:s",$kb['kupon_time']); ?> <strong><?=getTranslation('ajaxkupond75')?>:</strong><?=$kb['ipadres'];?> <strong><?=getTranslation('ajaxkupond76')?>:</strong> <?=$kb['kupon_nots']; ?> <?php if($kb['durum']==4){ ?> / <strong>İptal Eden : <?=$kb['iptalusername']; ?> ( İP Adresi : <?=$kb['iptalipadres']; ?> )</strong><?php } ?></p>
</div>
</td>
</tr>


</tbody>
</table>
</div>
<div id="cboxLoadingOverlay" style="float: left; display: none;"></div>
<div id="cboxLoadingGraphic" style="float: left; display: none;"></div>
<div id="cboxTitle" style="float: left; display: block;"><?=$id;?> <?=getTranslation('ajaxkupond77')?></div>
<div id="cboxCurrent" style="float: left; display: none;"></div>
<div id="cboxNext" style="float: left; display: none;"></div>
<div id="cboxPrevious" style="float: left; display: none;"></div>
<div id="cboxSlideshow" style="float: left; display: none;"></div>
<div id="cboxClose" style="float: left;" onclick="kuponkapat();"></div>
</div>
<div id="cboxMiddleRight" style="float: left; height: 360px;"></div>
</div>
<div style="clear: left;">
<div id="cboxBottomLeft" style="float: left;"></div>
<div id="cboxBottomCenter" style="float: left; width: 951px;"></div>
<div id="cboxBottomRight" style="float: left;"></div>
</div>
</div>

<script>
function openlivedetails(x) { $( "#ticdet_"+x ).toggle(); }
</script>

<?php }

if($a=="kupondd") {

$id = gd("id");

$kb = bilgi("select * from kuponlar where id='$id'");

$ouseri = bilgi("select * from kullanici where id='$kb[user_id]'");

if($ouseri['wkdurum']=="1") { $ouseri_ust = bilgi("select * from kullanici where id='$ouseri[hesap_sahibi_id]'"); }

$bayilerim = benimbayilerim($ub['id']);

$bayiler_arr = explode(",",$bayilerim);

if(!in_array($kb['user_id'],$bayiler_arr)) { die("#404"); }

?>

<div id="cboxWrapper" style="height: 400px; width: 993px;">
<div>
<div id="cboxTopLeft" style="float: left;"></div>
<div id="cboxTopCenter" style="float: left; width: 951px;"></div>
<div id="cboxTopRight" style="float: left;"></div>
</div>
<div style="clear: left;">
<div id="cboxMiddleLeft" style="float: left; height: 360px;"></div>
<div id="cboxContent" style="float: left; width: 975px; height: 391px;">
<div id="cboxLoadedContent" style="width: 976px; overflow: auto; height: 362px;">
<table class="tablesorter" id="TdaHS54" style="width:99.9%;">
<thead>
<tr>
<th><?=getTranslation('yeniyerler_kasa221')?></th>
<th><?=getTranslation('ajaxtumkuponlarim15')?></th>
<th><?=getTranslation('hizligirissecim')?></th>
<th><?=getTranslation('ajaxtumkuponlarim19')?></th>
<th><?=getTranslation('ajaxkupond7')?></th>
<th><?=getTranslation('ajaxkupond8')?></th>
<th>#<?=getTranslation('hizligirissecim')?></th>
<th><?=getTranslation('ajaxhesaprapor11')?></th>
</tr>
</thead>
<tbody>

<?php

function yuzdes($str) {

if(strlen($str)==1) { $yuzdedondur = "0.0".$str.""; } else

if(strlen($str)==2) { $yuzdedondur = "0.".$str.""; }

return $yuzdedondur;

}



$sor = sed_sql_query("select * from kupon_ic_casino where kupon_id='$id'");

while($row=sed_sql_fetcharray($sor)) { 

if($row['gameid']==1){
$oyun_isim = "".getTranslation('yeniyerler_kasa337')." 7";
} else if($row['gameid']==3){
$oyun_isim = "".getTranslation('yeniyerler_kasa337')." 5";
} else if($row['gameid']==5){
$oyun_isim = "".getTranslation('yeniyerler_kasa332')."";
} else if($row['gameid']==6){
$oyun_isim = "".getTranslation('yeniyerler_kasa333')."";
} else if($row['gameid']==7){
$oyun_isim = "".getTranslation('yeniyerler_kasa334')."";
} else if($row['gameid']==8){
$oyun_isim = "".getTranslation('yeniyerler_kasa331')."";
} else if($row['gameid']==9){
$oyun_isim = "".getTranslation('yeniyerler_kasa337')." 6";
} else if($row['gameid']==10){
$oyun_isim = "".getTranslation('yeniyerler_kasa335')."";
} else if($row['gameid']==12){
$oyun_isim = "".getTranslation('yeniyerler_kasa336')."";
}

if($row['secenek']=="Krupiye kazanır"){
$secenek_isim = "".getTranslation('casinoicin271')."";
} else if($row['secenek']=="Oyuncu kazanır"){
$secenek_isim = "".getTranslation('casinoicin272')."";
} else if($row['secenek']=="Savaş"){
$secenek_isim = "".getTranslation('casinoicin13')."";
} else if($row['secenek']=="Krupiyenin kartı kırmızı olacak"){
$secenek_isim = "".getTranslation('casinoicin273')."";
} else if($row['secenek']=="Krupiyenin kartı siyah olacak"){
$secenek_isim = "".getTranslation('casinoicin274')."";
} else if($row['secenek']=="Oyuncunun kartı kırmızı olacak"){
$secenek_isim = "".getTranslation('casinoicin275')."";
} else if($row['secenek']=="Oyuncunun kartı siyah olacak"){
$secenek_isim = "".getTranslation('casinoicin276')."";
} else if($row['secenek']=="Krupiyenin kartı sinek olacak"){
$secenek_isim = "".getTranslation('casinoicin277')."";
} else if($row['secenek']=="Krupiyenin kartı karo olacak"){
$secenek_isim = "".getTranslation('casinoicin278')."";
} else if($row['secenek']=="Krupiyenin kartı kupa olacak"){
$secenek_isim = "".getTranslation('casinoicin279')."";
} else if($row['secenek']=="Krupiyenin kartı maça olacak"){
$secenek_isim = "".getTranslation('casinoicin280')."";
} else if($row['secenek']=="Oyuncunun kartı sinek olacak"){
$secenek_isim = "".getTranslation('casinoicin281')."";
} else if($row['secenek']=="Oyuncunun kartı karo olacak"){
$secenek_isim = "".getTranslation('casinoicin282')."";
} else if($row['secenek']=="Oyuncunun kartı kupa olacak"){
$secenek_isim = "".getTranslation('casinoicin283')."";
} else if($row['secenek']=="Oyuncunun kartı maça olacak"){
$secenek_isim = "".getTranslation('casinoicin284')."";
} else if($row['secenek']=="Krupiyenin kart değeri tam olarak 8 olacak"){
$secenek_isim = "".getTranslation('casinoicin285')."";
} else if($row['secenek']=="Krupiyenin kart değeri 8 den az olacak"){
$secenek_isim = "".getTranslation('casinoicin286')."";
} else if($row['secenek']=="Krupiyenin kart değeri 8 den çok olacak"){
$secenek_isim = "".getTranslation('casinoicin287')."";
} else if($row['secenek']=="Oyuncunun kart değeri tam olarak 8 olacak"){
$secenek_isim = "".getTranslation('casinoicin288')."";
} else if($row['secenek']=="Oyuncunun kart değeri 8 den az olacak"){
$secenek_isim = "".getTranslation('casinoicin289')."";
} else if($row['secenek']=="Oyuncunun kart değeri 8 den çok olacak"){
$secenek_isim = "".getTranslation('casinoicin290')."";
} else if($row['secenek']=="Krupiyenin kartı resimli olacak (Vale, Kız, Papaz)"){
$secenek_isim = "".getTranslation('casinoicin291')."";
} else if($row['secenek']=="Krupiyenin kartı numara olacak (A, 2, 3, 4, 5, 6, 7, 8, 9, 10)"){
$secenek_isim = "".getTranslation('casinoicin292')."";
} else if($row['secenek']=="Oyuncun kartı resimli olacak (Vale, Kız, Papaz)"){
$secenek_isim = "".getTranslation('casinoicin293')."";
} else if($row['secenek']=="Oyuncunun kartı numara olacak (A, 2, 3, 4, 5, 6, 7, 8, 9, 10)"){
$secenek_isim = "".getTranslation('casinoicin294')."";
} else if($row['secenek']=="1. el kazanır"){
$secenek_isim = "".getTranslation('casinoicin242')."";
} else if($row['secenek']=="2. el kazanır"){
$secenek_isim = "".getTranslation('casinoicin237')."";
} else if($row['secenek']=="3. el kazanır"){
$secenek_isim = "".getTranslation('casinoicin238')."";
} else if($row['secenek']=="4. el kazanır"){
$secenek_isim = "".getTranslation('casinoicin239')."";
} else if($row['secenek']=="5. el kazanır"){
$secenek_isim = "".getTranslation('casinoicin240')."";
} else if($row['secenek']=="6. el kazanır"){
$secenek_isim = "".getTranslation('casinoicin241')."";
} else if($row['secenek']=="Yüksek Kart kazanır"){
$secenek_isim = "".getTranslation('casinoicin243')."";
} else if($row['secenek']=="Per kazanır"){
$secenek_isim = "".getTranslation('casinoicin244')."";
} else if($row['secenek']=="Döper kazanır"){
$secenek_isim = "".getTranslation('casinoicin245')."";
} else if($row['secenek']=="Üçlü kazanır"){
$secenek_isim = "".getTranslation('casinoicin246')."";
} else if($row['secenek']=="Kent kazanır"){
$secenek_isim = "".getTranslation('casinoicin247')."";
} else if($row['secenek']=="Floş kazanır"){
$secenek_isim = "".getTranslation('casinoicin248')."";
} else if($row['secenek']=="Ful kazanır"){
$secenek_isim = "".getTranslation('casinoicin249')."";
} else if($row['secenek']=="Kare kazanır"){
$secenek_isim = "".getTranslation('casinoicin250')."";
} else if($row['secenek']=="Sıralı Floş kazanır"){
$secenek_isim = "".getTranslation('casinoicin251')."";
} else if($row['secenek']=="Royal Floş kazanır"){
$secenek_isim = "".getTranslation('casinoicin252')."";
} else if($row['secenek']=="Oyuncu"){
$secenek_isim = "".getTranslation('casinoicin12')."";
} else if($row['secenek']=="Krupiye"){
$secenek_isim = "".getTranslation('casinoicin11')."";
} else if($row['secenek']=="Beraberlik"){
$secenek_isim = "".getTranslation('casinoicin14')."";
} else if($row['secenek']=="Oyuncu Per"){
$secenek_isim = "".getTranslation('casinoicin15')."";
} else if($row['secenek']=="Kurpiyer Per"){
$secenek_isim = "".getTranslation('casinoicin16')."";
} else if($row['secenek']=="İkisinden biri Per"){
$secenek_isim = "".getTranslation('casinoicin17')."";
} else if($row['secenek']=="Kusursuz Per"){
$secenek_isim = "".getTranslation('casinoicin18')."";
} else if($row['secenek']=="Küçük"){
$secenek_isim = "".getTranslation('casinoicin19')."";
} else if($row['secenek']=="Büyük"){
$secenek_isim = "".getTranslation('casinoicin20')."";
} else if($row['secenek']=="Daha fazla KIRMIZI kart gelecek"){
$secenek_isim = "".getTranslation('casinoicin21')."";
} else if($row['secenek']=="Daha fazla SİYAH kart gelecek"){
$secenek_isim = "".getTranslation('casinoicin22')."";
} else if($row['secenek']=="Eşit sayıda SİYAH ve KIRMIZI kart gelecek"){
$secenek_isim = "".getTranslation('casinoicin23')."";
} else if($row['secenek']=="Sıradaki kart - kırmızı"){
$secenek_isim = "".getTranslation('casinoicin35')."";
} else if($row['secenek']=="Sıradaki kart - siyah"){
$secenek_isim = "".getTranslation('casinoicin36')."";
} else if($row['secenek']=="Bütün kartlar AYNI DESTE olacak"){
$secenek_isim = "".getTranslation('casinoicin24')."";
} else if($row['secenek']=="OYUNCUYA gelen ilk iki kart AYNI DESTE olacak"){
$secenek_isim = "".getTranslation('casinoicin25')."";
} else if($row['secenek']=="KRUPİYEYE gelen ilk iki kart AYNI DESTE olacak"){
$secenek_isim = "".getTranslation('casinoicin26')."";
} else if($row['secenek']=="Sıradaki kart - maça"){
$secenek_isim = "".getTranslation('casinoicin37')."";
} else if($row['secenek']=="Sıradaki kart - kupa"){
$secenek_isim = "".getTranslation('casinoicin38')."";
} else if($row['secenek']=="Sıradaki kart - sinek"){
$secenek_isim = "".getTranslation('casinoicin39')."";
} else if($row['secenek']=="Sıradaki kart - karo"){
$secenek_isim = "".getTranslation('casinoicin40')."";
} else if($row['secenek']=="Oyuncu ve Krupiyenin sayıları toplamı 9.5 ALT"){
$secenek_isim = "".getTranslation('casinoicin27')."";
} else if($row['secenek']=="Oyuncu ve Krupiyenin sayıları toplamı 9.5 ÜST"){
$secenek_isim = "".getTranslation('casinoicin28')."";
} else if($row['secenek']=="Oyuncu ve Krupiyenin sayıları toplamı ÇİFT sayı olacak"){
$secenek_isim = "".getTranslation('casinoicin29')."";
} else if($row['secenek']=="Oyuncu ve Krupiyenin sayıları toplamı TEK sayı olacak"){
$secenek_isim = "".getTranslation('casinoicin30')."";
} else if($row['secenek']=="OYUNCU SAYILARI toplamı ÇİFT sayı olacak"){
$secenek_isim = "".getTranslation('casinoicin31')."";
} else if($row['secenek']=="OYUNCU SAYILARI toplamı TEK sayı olacak"){
$secenek_isim = "".getTranslation('casinoicin32')."";
} else if($row['secenek']=="KRUPİYE SAYILARI toplamı ÇİFT sayı olacak"){
$secenek_isim = "".getTranslation('casinoicin33')."";
} else if($row['secenek']=="KRUPİYE SAYILARI toplamı TEK sayı olacak"){
$secenek_isim = "".getTranslation('casinoicin34')."";
} else if($row['secenek']=="Çarkın Oku SEÇİLEN NUMARA (1.....18) de duracak"){
$secenek_isim = "".getTranslation('casinoicin253')."";
} else if($row['secenek']=="Çarkın Oku 1 DEN 6 YA (1 ve 6 dahil ) sayı sıralaması içinde duracak"){
$secenek_isim = "".getTranslation('casinoicin254')."";
} else if($row['secenek']=="Çarkın Oku 7 DEN 12 YE (7 ve 12 dahil ) sayı sıralaması içinde duracak"){
$secenek_isim = "".getTranslation('casinoicin255')."";
} else if($row['secenek']=="Çarkın Oku 13 DEN 18' E (13 ve 18 dahil ) sayı sıralaması içinde duracak"){
$secenek_isim = "".getTranslation('casinoicin256')."";
} else if($row['secenek']=="Çarkın Oku 9.5'dan KÜÇÜK bir sayıda duracak"){
$secenek_isim = "".getTranslation('casinoicin257')."";
} else if($row['secenek']=="Çarkın Oku 9.5'dan BÜYÜK bir sayıda duracak"){
$secenek_isim = "".getTranslation('casinoicin258')."";
} else if($row['secenek']=="Çarkın Oku GRİ dilimde duracak"){
$secenek_isim = "".getTranslation('casinoicin259')."";
} else if($row['secenek']=="Çarkın Oku KIRMIZI dilimde duracak"){
$secenek_isim = "".getTranslation('casinoicin260')."";
} else if($row['secenek']=="Çarkın Oku SİYAH dilimde duracak"){
$secenek_isim = "".getTranslation('casinoicin261')."";
} else if($row['secenek']=="Çarkın Oku YILDIZLI KUPA diliminde duracak"){
$secenek_isim = "".getTranslation('casinoicin262')."";
} else if($row['secenek']=="Çarkın Oku herhangi bir ÇİFT sayıda duracak"){
$secenek_isim = "".getTranslation('casinoicin263')."";
} else if($row['secenek']=="Çarkın Oku herhangi bir TEK sayıda duracak"){
$secenek_isim = "".getTranslation('casinoicin264')."";
} else if($row['secenek']=="Çarkın Oku GRİ dilimde herhangi bir ÇİFT sayıda duracak"){
$secenek_isim = "".getTranslation('casinoicin265')."";
} else if($row['secenek']=="Çarkın Oku GRİ dilimde herhangi bir TEK sayıda duracak"){
$secenek_isim = "".getTranslation('casinoicin266')."";
} else if($row['secenek']=="Çarkın Oku KIRMIZI dilimde herhangi bir ÇİFT sayıda duracak"){
$secenek_isim = "".getTranslation('casinoicin267')."";
} else if($row['secenek']=="Çarkın Oku KIRMIZI dilimde herhangi bir TEK sayıda duracak"){
$secenek_isim = "".getTranslation('casinoicin268')."";
} else if($row['secenek']=="Çarkın Oku SİYAH dilimde herhangi bir ÇİFT sayıda duracak"){
$secenek_isim = "".getTranslation('casinoicin269')."";
} else if($row['secenek']=="Çarkın Oku SİYAH dilimde herhangi bir TEK sayıda duracak"){
$secenek_isim = "".getTranslation('casinoicin270')."";
} else if($row['secenek']=="Kırmızı zar kazanacak"){
$secenek_isim = "".getTranslation('casinoicin343')."";
} else if($row['secenek']=="Mavi zar kazanacak"){
$secenek_isim = "".getTranslation('casinoicin344')."";
} else if($row['secenek']=="Seçilen numara KIRMIZI zarda gelecek"){
$secenek_isim = "".getTranslation('casinoicin345')."";
} else if($row['secenek']=="Seçilen numara MAVİ zarda gelecek"){
$secenek_isim = "".getTranslation('casinoicin346')."";
} else if($row['secenek']=="Seçilen KIRMIZI ve MAVİ zar kombinasyonu gelecek"){
$secenek_isim = "".getTranslation('casinoicin347')."";
} else if($row['secenek']=="KIRMIZI zarda gelen sayı TEK olacak"){
$secenek_isim = "".getTranslation('casinoicin348')."";
} else if($row['secenek']=="KIRMIZI zarda gelen sayı ÇİFT olacak"){
$secenek_isim = "".getTranslation('casinoicin349')."";
} else if($row['secenek']=="MAVİ zarda gelen sayı TEK olacak"){
$secenek_isim = "".getTranslation('casinoicin350')."";
} else if($row['secenek']=="MAVİ zarda gelen sayı ÇİFT olacak"){
$secenek_isim = "".getTranslation('casinoicin351')."";
} else if($row['secenek']=="İKİ zarda gelen sayıların toplamı TEK olacak"){
$secenek_isim = "".getTranslation('casinoicin352')."";
} else if($row['secenek']=="İKİ zarda gelen sayıların toplamı ÇİFT olacak"){
$secenek_isim = "".getTranslation('casinoicin353')."";
} else if($row['secenek']=="KIRMIZI zar için gelen sayı 3.5 ALT"){
$secenek_isim = "".getTranslation('casinoicin354')."";
} else if($row['secenek']=="KIRMIZI zar için gelen sayı 3.5 ÜST"){
$secenek_isim = "".getTranslation('casinoicin355')."";
} else if($row['secenek']=="MAVİ zar için gelen sayı 3.5 ALT"){
$secenek_isim = "".getTranslation('casinoicin356')."";
} else if($row['secenek']=="MAVI zar için gelen sayı 3.5 ÜST"){
$secenek_isim = "".getTranslation('casinoicin357')."";
} else if($row['secenek']=="İki zar toplam sayılar 4.5 ALT"){
$secenek_isim = "".getTranslation('casinoicin358')."";
} else if($row['secenek']=="İki zar toplam sayılar 4.5 ÜST"){
$secenek_isim = "".getTranslation('casinoicin359')."";
} else if($row['secenek']=="İki zar toplam sayılar 5.5 ALT"){
$secenek_isim = "".getTranslation('casinoicin360')."";
} else if($row['secenek']=="İki zar toplam sayılar 5.5 ÜST"){
$secenek_isim = "".getTranslation('casinoicin361')."";
} else if($row['secenek']=="İki zar toplam sayılar 6.5 ALT"){
$secenek_isim = "".getTranslation('casinoicin362')."";
} else if($row['secenek']=="İki zar toplam sayılar 6.5 ÜST"){
$secenek_isim = "".getTranslation('casinoicin363')."";
} else if($row['secenek']=="İki zar toplam sayılar 7.5 ALT"){
$secenek_isim = "".getTranslation('casinoicin364')."";
} else if($row['secenek']=="İki zar toplam sayılar 7.5 ÜST"){
$secenek_isim = "".getTranslation('casinoicin365')."";
} else if($row['secenek']=="İki zar toplam sayılar 8.5 ALT"){
$secenek_isim = "".getTranslation('casinoicin366')."";
} else if($row['secenek']=="İki zar toplam sayılar 8.5 ÜST"){
$secenek_isim = "".getTranslation('casinoicin367')."";
} else if($row['secenek']=="İki zar toplam sayılar 9.5 ALT"){
$secenek_isim = "".getTranslation('casinoicin368')."";
} else if($row['secenek']=="İki zar toplam sayılar 9.5 ÜST"){
$secenek_isim = "".getTranslation('casinoicin369')."";
} else if($row['secenek']=="Eşitlik"){
$secenek_isim = "".getTranslation('casinoicin372')."";
} else if($row['secenek']=="1-36 arasında seçilmiş numara bu çekilişte gelecek"){
$secenek_isim = "".getTranslation('casinoicin190')."";
} else if($row['secenek']=="1-36 arasında seçilmiş numara bu çekilişte GELMEYECEK"){
$secenek_isim = "".getTranslation('casinoicin191')."";
} else if($row['secenek']=="1-36 arasında seçilmiş İKİ numara bu çekilişte gelecek"){
$secenek_isim = "".getTranslation('casinoicin192')."";
} else if($row['secenek']=="1-36 arasında seçilmiş ÜÇ numara bu çekilişte gelecek"){
$secenek_isim = "".getTranslation('casinoicin193')."";
} else if($row['secenek']=="Daha çok TEK sayılı toplar gelecek"){
$secenek_isim = "".getTranslation('casinoicin41')."";
} else if($row['secenek']=="Daha çok ÇİFT sayılı toplar gelecek"){
$secenek_isim = "".getTranslation('casinoicin42')."";
} else if($row['secenek']=="Gelen topların numara toplamı TEK sayı olacak"){
$secenek_isim = "".getTranslation('casinoicin111')."";
} else if($row['secenek']=="Gelen topların numara toplamı ÇİFT sayı olacak"){
$secenek_isim = "".getTranslation('casinoicin112')."";
} else if($row['secenek']=="Gelen numaraların toplamı 92,5'ten AZ olacak"){
$secenek_isim = "".getTranslation('casinoicin113')."";
} else if($row['secenek']=="Gelen numaraların toplamı 92,5'ten ÇOK olacak"){
$secenek_isim = "".getTranslation('casinoicin114')."";
} else if($row['secenek']=="En az bir tane BEYAZ top gelecek"){
$secenek_isim = "".getTranslation('casinoicin115')."";
} else if($row['secenek']=="Hiç BEYAZ top gelmeyecek"){
$secenek_isim = "".getTranslation('casinoicin116')."";
} else if($row['secenek']=="1,5'ten ÇOK BEYAZ top gelecek"){
$secenek_isim = "".getTranslation('casinoicin117')."";
} else if($row['secenek']=="1,5'ten AZ BEYAZ top gelecek"){
$secenek_isim = "".getTranslation('casinoicin118')."";
} else if($row['secenek']=="2,5'ten ÇOK BEYAZ top gelecek"){
$secenek_isim = "".getTranslation('casinoicin119')."";
} else if($row['secenek']=="2,5'ten AZ BEYAZ top gelecek"){
$secenek_isim = "".getTranslation('casinoicin120')."";
} else if($row['secenek']=="3,5'ten ÇOK BEYAZ top gelecek"){
$secenek_isim = "".getTranslation('casinoicin121')."";
} else if($row['secenek']=="BEŞ tane BEYAZ top gelecek"){
$secenek_isim = "".getTranslation('casinoicin122')."";
} else if($row['secenek']=="TAM olarak BİR BEYAZ TOP gelecek"){
$secenek_isim = "".getTranslation('casinoicin145')."";
} else if($row['secenek']=="TAM olarak BİR BEYAZ top GELMEYECEK"){
$secenek_isim = "".getTranslation('casinoicin146')."";
} else if($row['secenek']=="TAM olarak İKİ BEYAZ TOP gelecek"){
$secenek_isim = "".getTranslation('casinoicin147')."";
} else if($row['secenek']=="TAM olarak İKİ BEYAZ top GELMEYECEK"){
$secenek_isim = "".getTranslation('casinoicin189')."";
} else if($row['secenek']=="TAM olarak ÜÇ BEYAZ TOP gelecek"){
$secenek_isim = "".getTranslation('casinoicin180')."";
} else if($row['secenek']=="TAM olarak ÜÇ BEYAZ top GELMEYECEK"){
$secenek_isim = "".getTranslation('casinoicin181')."";
} else if($row['secenek']=="TAM olarak DÖRT BEYAZ TOP gelecek"){
$secenek_isim = "".getTranslation('casinoicin182')."";
} else if($row['secenek']=="En az bir tane YEŞİL top gelecek"){
$secenek_isim = "".getTranslation('casinoicin123')."";
} else if($row['secenek']=="Hiç YEŞİL top gelmeyecek"){
$secenek_isim = "".getTranslation('casinoicin124')."";
} else if($row['secenek']=="1,5'ten ÇOK YEŞİL top gelecek"){
$secenek_isim = "".getTranslation('casinoicin125')."";
} else if($row['secenek']=="1,5'ten AZ YEŞİL top gelecek"){
$secenek_isim = "".getTranslation('casinoicin126')."";
} else if($row['secenek']=="2,5'ten ÇOK YEŞİL top gelecek"){
$secenek_isim = "".getTranslation('casinoicin127')."";
} else if($row['secenek']=="2,5'ten AZ YEŞİL top gelecek"){
$secenek_isim = "".getTranslation('casinoicin128')."";
} else if($row['secenek']=="3,5'ten ÇOK YEŞİL top gelecek"){
$secenek_isim = "".getTranslation('casinoicin129')."";
} else if($row['secenek']=="BEŞ tane YEŞİL top gelecek"){
$secenek_isim = "".getTranslation('casinoicin130')."";
} else if($row['secenek']=="TAM olarak BİR YEŞİL TOP gelecek"){
$secenek_isim = "".getTranslation('casinoicin183')."";
} else if($row['secenek']=="TAM olarak BİR YEŞİL top GELMEYECEK"){
$secenek_isim = "".getTranslation('casinoicin184')."";
} else if($row['secenek']=="TAM olarak İKİ YEŞİL TOP gelecek"){
$secenek_isim = "".getTranslation('casinoicin185')."";
} else if($row['secenek']=="TAM olarak İKİ YEŞİL top GELMEYECEK"){
$secenek_isim = "".getTranslation('casinoicin186')."";
} else if($row['secenek']=="TAM olarak ÜÇ YEŞİL TOP gelecek"){
$secenek_isim = "".getTranslation('casinoicin187')."";
} else if($row['secenek']=="TAM olarak ÜÇ YEŞİL top GELMEYECEK"){
$secenek_isim = "".getTranslation('casinoicin188')."";
} else if($row['secenek']=="TAM olarak DÖRT YEŞİL top gelecek"){
$secenek_isim = "".getTranslation('casinoicin194')."";
} else if($row['secenek']=="En az bir tane KIRMIZI top gelecek"){
$secenek_isim = "".getTranslation('casinoicin131')."";
} else if($row['secenek']=="Hiç KIRMIZI top gelmeyecek"){
$secenek_isim = "".getTranslation('casinoicin132')."";
} else if($row['secenek']=="1,5'ten ÇOK KIRMIZI top gelecek"){
$secenek_isim = "".getTranslation('casinoicin133')."";
} else if($row['secenek']=="1,5'ten AZ KIRMIZI top gelecek"){
$secenek_isim = "".getTranslation('casinoicin134')."";
} else if($row['secenek']=="2,5'ten ÇOK KIRMIZI top gelecek"){
$secenek_isim = "".getTranslation('casinoicin135')."";
} else if($row['secenek']=="2,5'ten AZ KIRMIZI top gelecek"){
$secenek_isim = "".getTranslation('casinoicin234')."";
} else if($row['secenek']=="3,5'ten ÇOK KIRMIZI top gelecek"){
$secenek_isim = "".getTranslation('casinoicin136')."";
} else if($row['secenek']=="BEŞ tane KIRMIZI top gelecek"){
$secenek_isim = "".getTranslation('casinoicin137')."";
} else if($row['secenek']=="TAM olarak BİR KIRMIZI top gelecek"){
$secenek_isim = "".getTranslation('casinoicin195')."";
} else if($row['secenek']=="TAM olarak BİR KIRMIZI top GELMEYECEK"){
$secenek_isim = "".getTranslation('casinoicin196')."";
} else if($row['secenek']=="TAM olarak İKİ KIRMIZI top gelecek"){
$secenek_isim = "".getTranslation('casinoicin197')."";
} else if($row['secenek']=="TAM olarak İKİ KIRMIZI top GELMEYECEK"){
$secenek_isim = "".getTranslation('casinoicin198')."";
} else if($row['secenek']=="TAM olarak ÜÇ KIRMIZI top gelecek"){
$secenek_isim = "".getTranslation('casinoicin199')."";
} else if($row['secenek']=="TAM olarak ÜÇ KIRMIZI top GELMEYECEK"){
$secenek_isim = "".getTranslation('casinoicin200')."";
} else if($row['secenek']=="TAM olarak DÖRT KIRMIZI top gelecek"){
$secenek_isim = "".getTranslation('casinoicin201')."";
} else if($row['secenek']=="En az bir tane MAVİ top gelecek"){
$secenek_isim = "".getTranslation('casinoicin233')."";
} else if($row['secenek']=="Hiç MAVİ top gelmeyecek"){
$secenek_isim = "".getTranslation('casinoicin138')."";
} else if($row['secenek']=="1,5'ten ÇOK MAVİ top gelecek"){
$secenek_isim = "".getTranslation('casinoicin139')."";
} else if($row['secenek']=="1,5'ten AZ MAVİ top gelecek"){
$secenek_isim = "".getTranslation('casinoicin140')."";
} else if($row['secenek']=="2,5'ten ÇOK MAVİ top gelecek"){
$secenek_isim = "".getTranslation('casinoicin141')."";
} else if($row['secenek']=="2,5'ten AZ MAVİ top gelecek"){
$secenek_isim = "".getTranslation('casinoicin142')."";
} else if($row['secenek']=="3,5'ten ÇOK MAVİ top gelecek"){
$secenek_isim = "".getTranslation('casinoicin143')."";
} else if($row['secenek']=="BEŞ tane MAVİ top gelecek"){
$secenek_isim = "".getTranslation('casinoicin144')."";
} else if($row['secenek']=="TAM olarak BİR MAVİ top gelecek"){
$secenek_isim = "".getTranslation('casinoicin202')."";
} else if($row['secenek']=="TAM olarak BİR MAVİ top GELMEYECEK"){
$secenek_isim = "".getTranslation('casinoicin203')."";
} else if($row['secenek']=="TAM olarak İKİ MAVİ top gelecek"){
$secenek_isim = "".getTranslation('casinoicin204')."";
} else if($row['secenek']=="TAM olarak İKİ MAVİ top GELMEYECEK"){
$secenek_isim = "".getTranslation('casinoicin205')."";
} else if($row['secenek']=="TAM olarak ÜÇ MAVİ top gelecek"){
$secenek_isim = "".getTranslation('casinoicin232')."";
} else if($row['secenek']=="TAM olarak ÜÇ MAVİ top GELMEYECEK"){
$secenek_isim = "".getTranslation('casinoicin206')."";
} else if($row['secenek']=="TAM olarak DÖRT MAVİ top gelecek"){
$secenek_isim = "".getTranslation('casinoicin207')."";
} else if($row['secenek']=="ÜÇ veya daha fazla AYNI RENK top gelecek"){
$secenek_isim = "".getTranslation('casinoicin208')."";
} else if($row['secenek']=="DÖRT veya daha fazla AYNI RENK top gelecek"){
$secenek_isim = "".getTranslation('casinoicin209')."";
} else if($row['secenek']=="BEŞ AYNI RENK top gelecek"){
$secenek_isim = "".getTranslation('casinoicin210')."";
} else if($row['secenek']=="Gelen BEYAZ ve YEŞİL toplar KIRMIZI ve MAVİ toplardan FAZLA olacak"){
$secenek_isim = "".getTranslation('casinoicin211')."";
} else if($row['secenek']=="Gelen BEYAZ ve KIRMIZI toplar YEŞİL ve MAVİ toplardan FAZLA olacak"){
$secenek_isim = "".getTranslation('casinoicin212')."";
} else if($row['secenek']=="Gelen BEYAZ ve MAVİ toplar YEŞİL ve KIRMIZI toplardan FAZLA olacak"){
$secenek_isim = "".getTranslation('casinoicin213')."";
} else if($row['secenek']=="Gelen BEYAZ toplar YEŞİL toplardan FAZLA olacak"){
$secenek_isim = "".getTranslation('casinoicin214')."";
} else if($row['secenek']=="Gelen YEŞİL toplar BEYAZ toplardan FAZLA olacak"){
$secenek_isim = "".getTranslation('casinoicin215')."";
} else if($row['secenek']=="EŞİT SAYIDA BEYAZ ve YEŞİL top gelecek"){
$secenek_isim = "".getTranslation('casinoicin216')."";
} else if($row['secenek']=="Gelen BEYAZ toplar KIRMIZI toplardan FAZLA olacak"){
$secenek_isim = "".getTranslation('casinoicin217')."";
} else if($row['secenek']=="Gelen KIRMIZI toplar BEYAZ toplardan FAZLA olacak"){
$secenek_isim = "".getTranslation('casinoicin218')."";
} else if($row['secenek']=="EŞİT SAYIDA BEYAZ ve KIRMIZI top gelecek"){
$secenek_isim = "".getTranslation('casinoicin219')."";
} else if($row['secenek']=="Gelen BEYAZ toplar MAVİ toplardan FAZLA olacak"){
$secenek_isim = "".getTranslation('casinoicin220')."";
} else if($row['secenek']=="Gelen MAVİ toplar BEYAZ toplardan FAZLA olacak"){
$secenek_isim = "".getTranslation('casinoicin221')."";
} else if($row['secenek']=="EŞİT SAYIDA BEYAZ ve MAVİ top gelecek"){
$secenek_isim = "".getTranslation('casinoicin222')."";
} else if($row['secenek']=="Gelen YEŞİL toplar KIRMIZI toplardan FAZLA olacak"){
$secenek_isim = "".getTranslation('casinoicin223')."";
} else if($row['secenek']=="Gelen KIRMIZI toplar YEŞİL toplardan FAZLA olacak"){
$secenek_isim = "".getTranslation('casinoicin231')."";
} else if($row['secenek']=="EŞİT SAYIDA YEŞİL ve KIRMIZI top gelecek"){
$secenek_isim = "".getTranslation('casinoicin230')."";
} else if($row['secenek']=="Gelen YEŞİL toplar MAVİ toplardan FAZLA olacak"){
$secenek_isim = "".getTranslation('casinoicin229')."";
} else if($row['secenek']=="Gelen MAVİ toplar YEŞİL toplardan FAZLA olacak"){
$secenek_isim = "".getTranslation('casinoicin228')."";
} else if($row['secenek']=="EŞİT SAYIDA YEŞİL ve MAVİ top gelecek"){
$secenek_isim = "".getTranslation('casinoicin227')."";
} else if($row['secenek']=="Gelen KIRMIZI toplar MAVİ toplardan FAZLA olacak"){
$secenek_isim = "".getTranslation('casinoicin226')."";
} else if($row['secenek']=="Gelen MAVİ toplar KIRMIZI toplardan FAZLA olacak"){
$secenek_isim = "".getTranslation('casinoicin225')."";
} else if($row['secenek']=="EŞİT SAYIDA MAVİ ve KIRMIZI top gelecek"){
$secenek_isim = "".getTranslation('casinoicin224')."";
} else if($row['secenek']=="0,...,9 arasında seçilmiş numara A bölgeye çekilecek"){
$secenek_isim = "".getTranslation('casinoicin305')."";
} else if($row['secenek']=="0,...,9 arasında seçilmiş numara B bölgeye çekilecek"){
$secenek_isim = "".getTranslation('casinoicin306')."";
} else if($row['secenek']=="0,...,9 arasında seçilmiş numara C bölgeye çekilecek"){
$secenek_isim = "".getTranslation('casinoicin307')."";
} else if($row['secenek']=="A bölgesindeki şanslı numaralar arasında seçilen numara olacak 00,...,99"){
$secenek_isim = "".getTranslation('casinoicin308')."";
} else if($row['secenek']=="B bölgesindeki şanslı numaralar arasında seçilen numara olacak 00,...,99"){
$secenek_isim = "".getTranslation('casinoicin309')."";
} else if($row['secenek']=="C bölgesindeki şanslı numaralar arasında seçilen numara olacak 00,...,99"){
$secenek_isim = "".getTranslation('casinoicin310')."";
} else if($row['secenek']=="Seçilen numarayla (0-9) gelen şanslı topların ADEDİ 1.5 ÜST olacak."){
$secenek_isim = "".getTranslation('casinoicin311')."";
} else if($row['secenek']=="Seçilen numarayla (0-9) gelen şanslı topların ADEDİ 1.5 ALT olacak."){
$secenek_isim = "".getTranslation('casinoicin312')."";
} else if($row['secenek']=="Seçilen numarayla (0-9) gelen şanslı topların ADEDİ ÇİFT SAYI olacak."){
$secenek_isim = "".getTranslation('casinoicin313')."";
} else if($row['secenek']=="Seçilen numarayla (0-9) gelen şanslı topların ADEDİ TEK SAYI olacak."){
$secenek_isim = "".getTranslation('casinoicin314')."";
} else if($row['secenek']=="Çekilen KIRMIZI topların üzerindeki numaralar TOPLAMI 13.5 ALT"){
$secenek_isim = "".getTranslation('casinoicin315')."";
} else if($row['secenek']=="Çekilen KIRMIZI topların üzerindeki numaralar TOPLAMI 13.5 ÜST"){
$secenek_isim = "".getTranslation('casinoicin316')."";
} else if($row['secenek']=="Çekilen MAVİ topların üzerindeki numaralar TOPLAMI 12.5 ALT"){
$secenek_isim = "".getTranslation('casinoicin317')."";
} else if($row['secenek']=="Çekilen MAVİ topların üzerindeki numaralar TOPLAMI 12.5 ÜST"){
$secenek_isim = "".getTranslation('casinoicin318')."";
} else if($row['secenek']=="A bölgeye çekilen topların üzerindeki numaralar TOPLAMI 9.5 ALT"){
$secenek_isim = "".getTranslation('casinoicin319')."";
} else if($row['secenek']=="A bölgeye çekilen topların üzerindeki numaralar TOPLAMI 9.5 ÜST"){
$secenek_isim = "".getTranslation('casinoicin320')."";
} else if($row['secenek']=="B bölgeye çekilen topların üzerindeki numaralar TOPLAMI 9.5 ALT"){
$secenek_isim = "".getTranslation('casinoicin321')."";
} else if($row['secenek']=="B bölgeye çekilen topların üzerindeki numaralar TOPLAMI 9.5 ÜST"){
$secenek_isim = "".getTranslation('casinoicin322')."";
} else if($row['secenek']=="C bölgeye çekilen topların üzerindeki numaralar TOPLAMI 9.5 ALT"){
$secenek_isim = "".getTranslation('casinoicin323')."";
} else if($row['secenek']=="C bölgeye çekilen topların üzerindeki numaralar TOPLAMI 9.5 ÜST"){
$secenek_isim = "".getTranslation('casinoicin324')."";
} else if($row['secenek']=="Çekilen topların üzerindeki numaraların toplamı ÇİFT SAYI olacak"){
$secenek_isim = "".getTranslation('casinoicin325')."";
} else if($row['secenek']=="Çekilen topların üzerindeki numaraların toplamı TEK SAYI olacak"){
$secenek_isim = "".getTranslation('casinoicin326')."";
} else if($row['secenek']=="ÇİFT sayılı topların ADEDİ 2.5 ALT olacak"){
$secenek_isim = "".getTranslation('casinoicin327')."";
} else if($row['secenek']=="ÇİFT sayılı topların ADEDİ 2.5 ÜST olacak"){
$secenek_isim = "".getTranslation('casinoicin328')."";
} else if($row['secenek']=="TEK sayılı topların ADEDİ 2.5 ALT olacak"){
$secenek_isim = "".getTranslation('casinoicin329')."";
} else if($row['secenek']=="TEK sayılı topların ADEDİ 2.5 ÜST olacak"){
$secenek_isim = "".getTranslation('casinoicin330')."";
} else if($row['secenek']=="A bölgesindeki şanslı topların toplamı ÇİFT SAYI olacak"){
$secenek_isim = "".getTranslation('casinoicin331')."";
} else if($row['secenek']=="A bölgesindeki şanslı topların toplamı TEK SAYI olacak"){
$secenek_isim = "".getTranslation('casinoicin332')."";
} else if($row['secenek']=="B bölgesindeki şanslı topların toplamı ÇİFT SAYI olacak"){
$secenek_isim = "".getTranslation('casinoicin333')."";
} else if($row['secenek']=="B bölgesindeki şanslı topların toplamı TEK SAYI olacak"){
$secenek_isim = "".getTranslation('casinoicin334')."";
} else if($row['secenek']=="C bölgesindeki şanslı topların toplamı ÇİFT SAYI olacak"){
$secenek_isim = "".getTranslation('casinoicin335')."";
} else if($row['secenek']=="C bölgesindeki şanslı topların toplamı TEK SAYI olacak"){
$secenek_isim = "".getTranslation('casinoicin336')."";
} else if($row['secenek']=="Çekilen topların üzerindeki numaralar TOPLAMI 26.5 ALT"){
$secenek_isim = "".getTranslation('casinoicin337')."";
} else if($row['secenek']=="Çekilen topların üzerindeki numaralar TOPLAMI 26.5 ÜST"){
$secenek_isim = "".getTranslation('casinoicin338')."";
} else if($row['secenek']=="Çekilen topların üzerindeki numaralar TOPLAMI 15.5 ALT"){
$secenek_isim = "".getTranslation('casinoicin339')."";
} else if($row['secenek']=="Çekilen topların üzerindeki numaralar TOPLAMI 15.5 ÜST"){
$secenek_isim = "".getTranslation('casinoicin340')."";
} else if($row['secenek']=="Çekilen topların üzerindeki numaralar TOPLAMI 38.5 ALT"){
$secenek_isim = "".getTranslation('casinoicin341')."";
} else if($row['secenek']=="Çekilen topların üzerindeki numaralar TOPLAMI 38.5 ÜST"){
$secenek_isim = "".getTranslation('casinoicin342')."";
} else if($row['secenek']=="1-42 arasında seçilmiş numara bu çekilişte gelecek"){
$secenek_isim = "".getTranslation('casinoicin175')."";
} else if($row['secenek']=="1-42 arasında seçilmiş numara bu çekilişte GELMEYECEK"){
$secenek_isim = "".getTranslation('casinoicin176')."";
} else if($row['secenek']=="1-42 arasında seçilmiş İKİ adet numara bu çekilişte gelecek"){
$secenek_isim = "".getTranslation('casinoicin179')."";
} else if($row['secenek']=="1-42 arasında seçilmiş ÜÇ adet numara bu çekilişte gelecek"){
$secenek_isim = "".getTranslation('casinoicin178')."";
} else if($row['secenek']=="1-42 arasında seçilmiş DÖRT adet numara bu çekilişte gelecek"){
$secenek_isim = "".getTranslation('casinoicin177')."";
} else if($row['secenek']=="Seçilen YEDİ numaranın HİÇBİRİ gelmeyecek"){
$secenek_isim = "".getTranslation('casinoicin103')."";
} else if($row['secenek']=="Seçilen YEDİ numaranın en az BİRİ gelecek"){
$secenek_isim = "".getTranslation('casinoicin104')."";
} else if($row['secenek']=="Seçilen YEDİ numaranın en az İKİSİ gelecek"){
$secenek_isim = "".getTranslation('casinoicin105')."";
} else if($row['secenek']=="Seçilen YEDİ numaranın en az ÜÇÜ gelecek"){
$secenek_isim = "".getTranslation('casinoicin106')."";
} else if($row['secenek']=="Seçilen YEDİ numaranın en az DÖRDÜ gelecek"){
$secenek_isim = "".getTranslation('casinoicin107')."";
} else if($row['secenek']=="Seçilen YEDİ numaranın en az BEŞİ gelecek"){
$secenek_isim = "".getTranslation('casinoicin108')."";
} else if($row['secenek']=="Gelen SARI topların numara TOPLAMI 73,5'tan AZ olacak"){
$secenek_isim = "".getTranslation('casinoicin71')."";
} else if($row['secenek']=="Gelen SARI topların numara TOPLAMI 73,5'tan ÇOK olacak"){
$secenek_isim = "".getTranslation('casinoicin72')."";
} else if($row['secenek']=="Gelen SİYAH topların numara TOPLAMI 73,5'tan AZ olacak"){
$secenek_isim = "".getTranslation('casinoicin73')."";
} else if($row['secenek']=="Gelen SİYAH topların numara TOPLAMI 73,5'tan ÇOK olacak"){
$secenek_isim = "".getTranslation('casinoicin74')."";
} else if($row['secenek']=="Gelen numaraların toplamı 100,5'ten AZ olacak"){
$secenek_isim = "".getTranslation('casinoicin63')."";
} else if($row['secenek']=="Gelen numaraların toplamı 125,5'ten AZ olacak"){
$secenek_isim = "".getTranslation('casinoicin64')."";
} else if($row['secenek']=="Gelen numaraların toplamı 125,5'ten ÇOK olacak"){
$secenek_isim = "".getTranslation('casinoicin65')."";
} else if($row['secenek']=="Gelen numaraların toplamı 150,5'ten AZ olacak"){
$secenek_isim = "".getTranslation('casinoicin66')."";
} else if($row['secenek']=="Gelen numaraların toplamı 150,5'ten ÇOK olacak"){
$secenek_isim = "".getTranslation('casinoicin67')."";
} else if($row['secenek']=="Gelen numaraların toplamı 175,5'ten AZ olacak"){
$secenek_isim = "".getTranslation('casinoicin68')."";
} else if($row['secenek']=="Gelen numaraların toplamı 175,5'ten ÇOK olacak"){
$secenek_isim = "".getTranslation('casinoicin69')."";
} else if($row['secenek']=="Gelen numaraların toplamı 200,5'ten ÇOK olacak"){
$secenek_isim = "".getTranslation('casinoicin70')."";
} else if($row['secenek']=="3.5'ten AZ SARI top gelecek"){
$secenek_isim = "".getTranslation('casinoicin75')."";
} else if($row['secenek']=="3.5'ten ÇOK SARI top gelecek"){
$secenek_isim = "".getTranslation('casinoicin76')."";
} else if($row['secenek']=="2.5'ten AZ SARI top gelecek"){
$secenek_isim = "".getTranslation('casinoicin77')."";
} else if($row['secenek']=="2.5'ten ÇOK SARI top gelecek"){
$secenek_isim = "".getTranslation('casinoicin78')."";
} else if($row['secenek']=="1.5'ten AZ SARI top gelecek"){
$secenek_isim = "".getTranslation('casinoicin79')."";
} else if($row['secenek']=="1.5'ten ÇOK SARI top gelecek"){
$secenek_isim = "".getTranslation('casinoicin80')."";
} else if($row['secenek']=="Hiç SARI top gelmeyecek"){
$secenek_isim = "".getTranslation('casinoicin81')."";
} else if($row['secenek']=="3.5'ten AZ SİYAH top gelecek"){
$secenek_isim = "".getTranslation('casinoicin82')."";
} else if($row['secenek']=="3.5'ten ÇOK SİYAH top gelecek"){
$secenek_isim = "".getTranslation('casinoicin83')."";
} else if($row['secenek']=="2.5'ten AZ SİYAH top gelecek"){
$secenek_isim = "".getTranslation('casinoicin84')."";
} else if($row['secenek']=="2.5'ten ÇOK SİYAH top gelecek"){
$secenek_isim = "".getTranslation('casinoicin85')."";
} else if($row['secenek']=="1.5'ten AZ SİYAH top gelecek"){
$secenek_isim = "".getTranslation('casinoicin86')."";
} else if($row['secenek']=="1.5'ten ÇOK SİYAH top gelecek"){
$secenek_isim = "".getTranslation('casinoicin87')."";
} else if($row['secenek']=="Hiç SİYAH top gelmeyecek"){
$secenek_isim = "".getTranslation('casinoicin88')."";
} else if($row['secenek']=="YEDİ TANE SARI top gelecek"){
$secenek_isim = "".getTranslation('casinoicin89')."";
} else if($row['secenek']=="TAM olarak ALTI SARI TOP gelecek"){
$secenek_isim = "".getTranslation('casinoicin90')."";
} else if($row['secenek']=="TAM olarak BEŞ SARI TOP gelecek"){
$secenek_isim = "".getTranslation('casinoicin91')."";
} else if($row['secenek']=="TAM olarak DÖRT SARI TOP gelecek"){
$secenek_isim = "".getTranslation('casinoicin92')."";
} else if($row['secenek']=="TAM olarak ÜÇ SARI TOP gelecek"){
$secenek_isim = "".getTranslation('casinoicin93')."";
} else if($row['secenek']=="TAM olarak İKİ SARI TOP gelecek"){
$secenek_isim = "".getTranslation('casinoicin94')."";
} else if($row['secenek']=="TAM olarak BİR SARI TOP gelecek"){
$secenek_isim = "".getTranslation('casinoicin95')."";
} else if($row['secenek']=="YEDİ TANE SİYAH top gelecek"){
$secenek_isim = "".getTranslation('casinoicin96')."";
} else if($row['secenek']=="TAM olarak ALTI SİYAH TOP gelecek"){
$secenek_isim = "".getTranslation('casinoicin97')."";
} else if($row['secenek']=="TAM olarak BEŞ SİYAH TOP gelecek"){
$secenek_isim = "".getTranslation('casinoicin98')."";
} else if($row['secenek']=="TAM olarak DÖRT SİYAH TOP gelecek"){
$secenek_isim = "".getTranslation('casinoicin99')."";
} else if($row['secenek']=="TAM olarak ÜÇ SİYAH TOP gelecek"){
$secenek_isim = "".getTranslation('casinoicin100')."";
} else if($row['secenek']=="TAM olarak İKİ SİYAH TOP gelecek"){
$secenek_isim = "".getTranslation('casinoicin101')."";
} else if($row['secenek']=="TAM olarak BİR SİYAH TOP gelecek"){
$secenek_isim = "".getTranslation('casinoicin102')."";
} else if($row['secenek']=="Daha çok TEK sayılı toplar gelecek"){
$secenek_isim = "".getTranslation('casinoicin109')."";
} else if($row['secenek']=="Daha çok ÇİFT sayılı toplar gelecek"){
$secenek_isim = "".getTranslation('casinoicin110')."";
} else if($row['secenek']=="Gelen topların numara toplamı TEK sayı olacak"){
$secenek_isim = "".getTranslation('casinoicin111')."";
} else if($row['secenek']=="Gelen topların numara toplamı ÇİFT sayı olacak"){
$secenek_isim = "".getTranslation('casinoicin112')."";
} else if($row['secenek']=="İLK gelen numara TEK sayı olacak"){
$secenek_isim = "".getTranslation('casinoicin45')."";
} else if($row['secenek']=="İLK gelen numara ÇİFT sayı olacak"){
$secenek_isim = "".getTranslation('casinoicin46')."";
} else if($row['secenek']=="SON gelen numara TEK sayı olacak"){
$secenek_isim = "".getTranslation('casinoicin47')."";
} else if($row['secenek']=="SON gelen numara ÇİFT sayı olacak"){
$secenek_isim = "".getTranslation('casinoicin48')."";
} else if($row['secenek']=="Gelen İLK İKİ numara TEK sayı olacak"){
$secenek_isim = "".getTranslation('casinoicin50')."";
} else if($row['secenek']=="Gelen İLK İKİ numara ÇİFT sayı olacak"){
$secenek_isim = "".getTranslation('casinoicin51')."";
} else if($row['secenek']=="İLK gelen numara TEK sayı, İKİNCİ gelen numara ÇİFT sayı olacak"){
$secenek_isim = "".getTranslation('casinoicin49')."";
} else if($row['secenek']=="İLK gelen numara ÇİFT sayı, İKİNCİ gelen numara TEK sayı olacak"){
$secenek_isim = "".getTranslation('casinoicin52')."";
} else if($row['secenek']=="İLK gelen numara TEK sayı, SON gelen numara ÇİFT sayı olacak"){
$secenek_isim = "".getTranslation('casinoicin53')."";
} else if($row['secenek']=="İLK gelen numara ÇİFT sayı, SON gelen numara TEK sayı olacak"){
$secenek_isim = "".getTranslation('casinoicin54')."";
} else if($row['secenek']=="İLK gelen topun RENGİ - SARI olur"){
$secenek_isim = "".getTranslation('casinoicin55')."";
} else if($row['secenek']=="İLK gelen topun RENGİ - SİYAH olur"){
$secenek_isim = "".getTranslation('casinoicin56')."";
} else if($row['secenek']=="SON gelen topun RENGİ - SARI olur"){
$secenek_isim = "".getTranslation('casinoicin57')."";
} else if($row['secenek']=="SON gelen topun RENGİ - SİYAH olur"){
$secenek_isim = "".getTranslation('casinoicin58')."";
} else if($row['secenek']=="Daha fazla SARI top gelecek"){
$secenek_isim = "".getTranslation('casinoicin59')."";
} else if($row['secenek']=="Daha fazla SİYAH top gelecek"){
$secenek_isim = "".getTranslation('casinoicin60')."";
} else if($row['secenek']=="İKİNCİ gelen topun rengi İLK gelen topun renginde olacak"){
$secenek_isim = "".getTranslation('casinoicin61')."";
} else if($row['secenek']=="İKİNCİ gelen topun rengi İLK gelen toptan FARKLI RENK olacak"){
$secenek_isim = "".getTranslation('casinoicin62')."";
} else if($row['secenek']=="Berabere"){
$secenek_isim = "".getTranslation('casinoicin14')."";
} else {
$secenek_isim = "".$row['secenek']."";
}

?>

<tr class="itext-<?php if($row['kazanma']=="1") { echo "3"; } else if($row['kazanma']=="2") { echo "1"; } else if($row['kazanma']=="3") { echo "2"; } else if($row['kazanma']=="4") { echo "4"; } ?> c">

<td style="text-align:center;"><?=$row['roundid']; ?></td>

<td style="text-align:center;"><?=$oyun_isim;?></td>

<td style="text-align:center;"><?=$secenek_isim; ?></td>

<td style="text-align:center;"><?=nf($row['oran']);?></td>

<td style="text-align:center;"><?=getTranslation('ajaxkupond12')?></td>

<td style="text-align:center;">
<?php if($row['kazanma']=="1") { ?>
<img src="assets/img/ticket/ticket_3.png" alt="Statu" border="0">
<?php } else if($row['kazanma']=="2") { ?>
<img src="assets/img/ticket/ticket_1.png" alt="Statu" border="0">
<img onclick="WatchCasinoVideo('<?=$row['id'];?>','<?=$row['roundid'];?>','<?=$row['video'];?>');" src="casino/tvliste.png" alt="İzle" border="0" style="width: 17px;cursor: pointer;">
<?php } else if($row['kazanma']=="3") { ?>
<img src="assets/img/ticket/ticket_2.png" alt="Statu" border="0">
<img onclick="WatchCasinoVideo('<?=$row['id'];?>','<?=$row['roundid'];?>','<?=$row['video'];?>');" src="casino/tvliste.png" alt="İzle" border="0" style="width: 17px;cursor: pointer;">
<?php } else if($row['kazanma']=="4") { ?>
<img src="assets/img/ticket/ticket_4.png" alt="Statu" border="0">
<?php } ?>
</td>

<?php if($row['gameid']==9){ ?>

<?php if($row['oddid']==553 || $row['oddid']==554 || $row['oddid']==555 || $row['oddid']==559 || $row['oddid']==560 || $row['oddid']==561 || $row['oddid']==562){ ?>
<?php if($row['sayi']==1 || $row['sayi']==2 || $row['sayi']==5 || $row['sayi']==6 || $row['sayi']==9){ $renk_ver = "red"; } else { $renk_ver = "blue"; } ?>

<td class="card"><div class="syslitem"><div class="lottery-item li-<?=$renk_ver;?>"><span><?=$row['sayi'];?></span></div></div></td>

<?php } else  if($row['oddid']==556 || $row['oddid']==557 || $row['oddid']==558){ ?>
<?php 
$sayi_bol_hadi = explode(',',$row['sayi']);
if($sayi_bol_hadi[0]==1 || $sayi_bol_hadi[0]==2 || $sayi_bol_hadi[0]==5 || $sayi_bol_hadi[0]==6 || $sayi_bol_hadi[0]==9){ $renk_ver1 = "red"; } else { $renk_ver1 = "blue"; }
if($sayi_bol_hadi[1]==1 || $sayi_bol_hadi[1]==2 || $sayi_bol_hadi[1]==5 || $sayi_bol_hadi[1]==6 || $sayi_bol_hadi[1]==9){ $renk_ver2 = "red"; } else { $renk_ver2 = "blue"; }
?>
<td class="card">
<div class="syslitem"><div class="lottery-item li-<?=$renk_ver1;?>"><span><?=$sayi_bol_hadi[0];?></span></div></div>
<div class="syslitem"><div class="lottery-item li-<?=$renk_ver2;?>"><span><?=$sayi_bol_hadi[1];?></span></div></div>
</td>

<?php } else { ?>

<td class="card" style="text-align:center;"></td>

<?php } ?>

<?php } else if($row['gameid']==1){ ?>

<?php if($row['oddid']==1 || $row['oddid']==2){

if($row['sayi']==1 || $row['sayi']==3 || $row['sayi']==5 || $row['sayi']==8 || $row['sayi']==10 || $row['sayi']==12|| $row['sayi']==13|| $row['sayi']==15|| $row['sayi']==17|| $row['sayi']==20|| $row['sayi']==22 || $row['sayi']==24|| $row['sayi']==26|| $row['sayi']==27|| $row['sayi']==29|| $row['sayi']==32|| $row['sayi']==34|| $row['sayi']==36|| $row['sayi']==37|| $row['sayi']==39|| $row['sayi']==41){ $renk_ver = "yellow"; } else { $renk_ver = "black"; }
?>

<td class="card" style="width: 28px;">
<div class="syslitem7s" style="display: block;float: left;margin-right: 1px;">
<div class="lottery-item li-<?=$renk_ver;?>" style="width: 24px;height: 24px;"><span><?=$row['sayi'];?></span></div>
</div>
</td>

<?php } else  if($row['oddid']==3){

$sayi_bol_hadi = explode(',',$row['sayi']);

if($sayi_bol_hadi[0]==1 || $sayi_bol_hadi[0]==3 || $sayi_bol_hadi[0]==5 || $sayi_bol_hadi[0]==8 || $sayi_bol_hadi[0]==10 || $sayi_bol_hadi[0]==12|| $sayi_bol_hadi[0]==13|| $sayi_bol_hadi[0]==15|| $sayi_bol_hadi[0]==17|| $sayi_bol_hadi[0]==20|| $sayi_bol_hadi[0]==22 || $sayi_bol_hadi[0]==24|| $sayi_bol_hadi[0]==26|| $sayi_bol_hadi[0]==27|| $sayi_bol_hadi[0]==29|| $sayi_bol_hadi[0]==32|| $sayi_bol_hadi[0]==34|| $sayi_bol_hadi[0]==36|| $sayi_bol_hadi[0]==37|| $sayi_bol_hadi[0]==39|| $sayi_bol_hadi[0]==41){ $renk_ver1 = "yellow"; } else { $renk_ver1 = "black"; }

if($sayi_bol_hadi[1]==1 || $sayi_bol_hadi[1]==3 || $sayi_bol_hadi[1]==5 || $sayi_bol_hadi[1]==8 || $sayi_bol_hadi[1]==10 || $sayi_bol_hadi[1]==12|| $sayi_bol_hadi[1]==13|| $sayi_bol_hadi[1]==15|| $sayi_bol_hadi[1]==17|| $sayi_bol_hadi[1]==20|| $sayi_bol_hadi[1]==22 || $sayi_bol_hadi[1]==24|| $sayi_bol_hadi[1]==26|| $sayi_bol_hadi[1]==27|| $sayi_bol_hadi[1]==29|| $sayi_bol_hadi[1]==32|| $sayi_bol_hadi[1]==34|| $sayi_bol_hadi[1]==36|| $sayi_bol_hadi[1]==37|| $sayi_bol_hadi[1]==39|| $sayi_bol_hadi[1]==41){ $renk_ver2 = "yellow"; } else { $renk_ver2 = "black"; }

?>

<td class="card" style="width: 56px;">
<div class="syslitem7s" style="display: block;float: left;margin-right: 1px;">
<div class="lottery-item li-<?=$renk_ver1;?>" style="width: 24px;height: 24px;"><span><?=$sayi_bol_hadi[0];?></span></div>
</div>
<div class="syslitem7s" style="display: block;float: left;margin-right: 1px;">
<div class="lottery-item li-<?=$renk_ver2;?>" style="width: 24px;height: 24px;"><span><?=$sayi_bol_hadi[1];?></span></div>
</div>
</td>

<?php } else  if($row['oddid']==4){

$sayi_bol_hadi = explode(',',$row['sayi']);

if($sayi_bol_hadi[0]==1 || $sayi_bol_hadi[0]==3 || $sayi_bol_hadi[0]==5 || $sayi_bol_hadi[0]==8 || $sayi_bol_hadi[0]==10 || $sayi_bol_hadi[0]==12|| $sayi_bol_hadi[0]==13|| $sayi_bol_hadi[0]==15|| $sayi_bol_hadi[0]==17|| $sayi_bol_hadi[0]==20|| $sayi_bol_hadi[0]==22 || $sayi_bol_hadi[0]==24|| $sayi_bol_hadi[0]==26|| $sayi_bol_hadi[0]==27|| $sayi_bol_hadi[0]==29|| $sayi_bol_hadi[0]==32|| $sayi_bol_hadi[0]==34|| $sayi_bol_hadi[0]==36|| $sayi_bol_hadi[0]==37|| $sayi_bol_hadi[0]==39|| $sayi_bol_hadi[0]==41){ $renk_ver1 = "yellow"; } else { $renk_ver1 = "black"; }

if($sayi_bol_hadi[1]==1 || $sayi_bol_hadi[1]==3 || $sayi_bol_hadi[1]==5 || $sayi_bol_hadi[1]==8 || $sayi_bol_hadi[1]==10 || $sayi_bol_hadi[1]==12|| $sayi_bol_hadi[1]==13|| $sayi_bol_hadi[1]==15|| $sayi_bol_hadi[1]==17|| $sayi_bol_hadi[1]==20|| $sayi_bol_hadi[1]==22 || $sayi_bol_hadi[1]==24|| $sayi_bol_hadi[1]==26|| $sayi_bol_hadi[1]==27|| $sayi_bol_hadi[1]==29|| $sayi_bol_hadi[1]==32|| $sayi_bol_hadi[1]==34|| $sayi_bol_hadi[1]==36|| $sayi_bol_hadi[1]==37|| $sayi_bol_hadi[1]==39|| $sayi_bol_hadi[1]==41){ $renk_ver2 = "yellow"; } else { $renk_ver2 = "black"; }

if($sayi_bol_hadi[2]==1 || $sayi_bol_hadi[2]==3 || $sayi_bol_hadi[2]==5 || $sayi_bol_hadi[2]==8 || $sayi_bol_hadi[2]==10 || $sayi_bol_hadi[2]==12|| $sayi_bol_hadi[2]==13|| $sayi_bol_hadi[2]==15|| $sayi_bol_hadi[2]==17|| $sayi_bol_hadi[2]==20|| $sayi_bol_hadi[2]==22 || $sayi_bol_hadi[2]==24|| $sayi_bol_hadi[2]==26|| $sayi_bol_hadi[2]==27|| $sayi_bol_hadi[2]==29|| $sayi_bol_hadi[2]==32|| $sayi_bol_hadi[2]==34|| $sayi_bol_hadi[2]==36|| $sayi_bol_hadi[2]==37|| $sayi_bol_hadi[2]==39|| $sayi_bol_hadi[2]==41){ $renk_ver3 = "yellow"; } else { $renk_ver3 = "black"; }

?>

<td class="card" style="width: 84px;">
<div class="syslitem7s" style="display: block;float: left;margin-right: 1px;">
<div class="lottery-item li-<?=$renk_ver1;?>" style="width: 24px;height: 24px;"><span><?=$sayi_bol_hadi[0];?></span></div>
</div>
<div class="syslitem7s" style="display: block;float: left;margin-right: 1px;">
<div class="lottery-item li-<?=$renk_ver2;?>" style="width: 24px;height: 24px;"><span><?=$sayi_bol_hadi[1];?></span></div>
</div>
<div class="syslitem7s" style="display: block;float: left;margin-right: 1px;">
<div class="lottery-item li-<?=$renk_ver3;?>" style="width: 24px;height: 24px;"><span><?=$sayi_bol_hadi[2];?></span></div>
</div>
</td>

<?php } else  if($row['oddid']==5){

$sayi_bol_hadi = explode(',',$row['sayi']);

if($sayi_bol_hadi[0]==1 || $sayi_bol_hadi[0]==3 || $sayi_bol_hadi[0]==5 || $sayi_bol_hadi[0]==8 || $sayi_bol_hadi[0]==10 || $sayi_bol_hadi[0]==12|| $sayi_bol_hadi[0]==13|| $sayi_bol_hadi[0]==15|| $sayi_bol_hadi[0]==17|| $sayi_bol_hadi[0]==20|| $sayi_bol_hadi[0]==22 || $sayi_bol_hadi[0]==24|| $sayi_bol_hadi[0]==26|| $sayi_bol_hadi[0]==27|| $sayi_bol_hadi[0]==29|| $sayi_bol_hadi[0]==32|| $sayi_bol_hadi[0]==34|| $sayi_bol_hadi[0]==36|| $sayi_bol_hadi[0]==37|| $sayi_bol_hadi[0]==39|| $sayi_bol_hadi[0]==41){ $renk_ver1 = "yellow"; } else { $renk_ver1 = "black"; }

if($sayi_bol_hadi[1]==1 || $sayi_bol_hadi[1]==3 || $sayi_bol_hadi[1]==5 || $sayi_bol_hadi[1]==8 || $sayi_bol_hadi[1]==10 || $sayi_bol_hadi[1]==12|| $sayi_bol_hadi[1]==13|| $sayi_bol_hadi[1]==15|| $sayi_bol_hadi[1]==17|| $sayi_bol_hadi[1]==20|| $sayi_bol_hadi[1]==22 || $sayi_bol_hadi[1]==24|| $sayi_bol_hadi[1]==26|| $sayi_bol_hadi[1]==27|| $sayi_bol_hadi[1]==29|| $sayi_bol_hadi[1]==32|| $sayi_bol_hadi[1]==34|| $sayi_bol_hadi[1]==36|| $sayi_bol_hadi[1]==37|| $sayi_bol_hadi[1]==39|| $sayi_bol_hadi[1]==41){ $renk_ver2 = "yellow"; } else { $renk_ver2 = "black"; }

if($sayi_bol_hadi[2]==1 || $sayi_bol_hadi[2]==3 || $sayi_bol_hadi[2]==5 || $sayi_bol_hadi[2]==8 || $sayi_bol_hadi[2]==10 || $sayi_bol_hadi[2]==12|| $sayi_bol_hadi[2]==13|| $sayi_bol_hadi[2]==15|| $sayi_bol_hadi[2]==17|| $sayi_bol_hadi[2]==20|| $sayi_bol_hadi[2]==22 || $sayi_bol_hadi[2]==24|| $sayi_bol_hadi[2]==26|| $sayi_bol_hadi[2]==27|| $sayi_bol_hadi[2]==29|| $sayi_bol_hadi[2]==32|| $sayi_bol_hadi[2]==34|| $sayi_bol_hadi[2]==36|| $sayi_bol_hadi[2]==37|| $sayi_bol_hadi[2]==39|| $sayi_bol_hadi[2]==41){ $renk_ver3 = "yellow"; } else { $renk_ver3 = "black"; }

if($sayi_bol_hadi[3]==1 || $sayi_bol_hadi[3]==3 || $sayi_bol_hadi[3]==5 || $sayi_bol_hadi[3]==8 || $sayi_bol_hadi[3]==10 || $sayi_bol_hadi[3]==12|| $sayi_bol_hadi[3]==13|| $sayi_bol_hadi[3]==15|| $sayi_bol_hadi[3]==17|| $sayi_bol_hadi[3]==20|| $sayi_bol_hadi[3]==22 || $sayi_bol_hadi[3]==24|| $sayi_bol_hadi[3]==26|| $sayi_bol_hadi[3]==27|| $sayi_bol_hadi[3]==29|| $sayi_bol_hadi[3]==32|| $sayi_bol_hadi[3]==34|| $sayi_bol_hadi[3]==36|| $sayi_bol_hadi[3]==37|| $sayi_bol_hadi[3]==39|| $sayi_bol_hadi[3]==41){ $renk_ver4 = "yellow"; } else { $renk_ver4 = "black"; }

?>

<td class="card" style="width: 112px;">
<div class="syslitem7s" style="display: block;float: left;margin-right: 1px;">
<div class="lottery-item li-<?=$renk_ver1;?>" style="width: 24px;height: 24px;"><span><?=$sayi_bol_hadi[0];?></span></div>
</div>
<div class="syslitem7s" style="display: block;float: left;margin-right: 1px;">
<div class="lottery-item li-<?=$renk_ver2;?>" style="width: 24px;height: 24px;"><span><?=$sayi_bol_hadi[1];?></span></div>
</div>
<div class="syslitem7s" style="display: block;float: left;margin-right: 1px;">
<div class="lottery-item li-<?=$renk_ver3;?>" style="width: 24px;height: 24px;"><span><?=$sayi_bol_hadi[2];?></span></div>
</div>
<div class="syslitem7s" style="display: block;float: left;margin-right: 1px;">
<div class="lottery-item li-<?=$renk_ver4;?>" style="width: 24px;height: 24px;"><span><?=$sayi_bol_hadi[3];?></span></div>
</div>
</td>

<?php } else  if($row['oddid']==81 || $row['oddid']==82 || $row['oddid']==83 || $row['oddid']==84 || $row['oddid']==85 || $row['oddid']==86){

$sayi_bol_hadi = explode(',',$row['sayi']);

if($sayi_bol_hadi[0]==1 || $sayi_bol_hadi[0]==3 || $sayi_bol_hadi[0]==5 || $sayi_bol_hadi[0]==8 || $sayi_bol_hadi[0]==10 || $sayi_bol_hadi[0]==12|| $sayi_bol_hadi[0]==13|| $sayi_bol_hadi[0]==15|| $sayi_bol_hadi[0]==17|| $sayi_bol_hadi[0]==20|| $sayi_bol_hadi[0]==22 || $sayi_bol_hadi[0]==24|| $sayi_bol_hadi[0]==26|| $sayi_bol_hadi[0]==27|| $sayi_bol_hadi[0]==29|| $sayi_bol_hadi[0]==32|| $sayi_bol_hadi[0]==34|| $sayi_bol_hadi[0]==36|| $sayi_bol_hadi[0]==37|| $sayi_bol_hadi[0]==39|| $sayi_bol_hadi[0]==41){ $renk_ver1 = "yellow"; } else { $renk_ver1 = "black"; }

if($sayi_bol_hadi[1]==1 || $sayi_bol_hadi[1]==3 || $sayi_bol_hadi[1]==5 || $sayi_bol_hadi[1]==8 || $sayi_bol_hadi[1]==10 || $sayi_bol_hadi[1]==12|| $sayi_bol_hadi[1]==13|| $sayi_bol_hadi[1]==15|| $sayi_bol_hadi[1]==17|| $sayi_bol_hadi[1]==20|| $sayi_bol_hadi[1]==22 || $sayi_bol_hadi[1]==24|| $sayi_bol_hadi[1]==26|| $sayi_bol_hadi[1]==27|| $sayi_bol_hadi[1]==29|| $sayi_bol_hadi[1]==32|| $sayi_bol_hadi[1]==34|| $sayi_bol_hadi[1]==36|| $sayi_bol_hadi[1]==37|| $sayi_bol_hadi[1]==39|| $sayi_bol_hadi[1]==41){ $renk_ver2 = "yellow"; } else { $renk_ver2 = "black"; }

if($sayi_bol_hadi[2]==1 || $sayi_bol_hadi[2]==3 || $sayi_bol_hadi[2]==5 || $sayi_bol_hadi[2]==8 || $sayi_bol_hadi[2]==10 || $sayi_bol_hadi[2]==12|| $sayi_bol_hadi[2]==13|| $sayi_bol_hadi[2]==15|| $sayi_bol_hadi[2]==17|| $sayi_bol_hadi[2]==20|| $sayi_bol_hadi[2]==22 || $sayi_bol_hadi[2]==24|| $sayi_bol_hadi[2]==26|| $sayi_bol_hadi[2]==27|| $sayi_bol_hadi[2]==29|| $sayi_bol_hadi[2]==32|| $sayi_bol_hadi[2]==34|| $sayi_bol_hadi[2]==36|| $sayi_bol_hadi[2]==37|| $sayi_bol_hadi[2]==39|| $sayi_bol_hadi[2]==41){ $renk_ver3 = "yellow"; } else { $renk_ver3 = "black"; }

if($sayi_bol_hadi[3]==1 || $sayi_bol_hadi[3]==3 || $sayi_bol_hadi[3]==5 || $sayi_bol_hadi[3]==8 || $sayi_bol_hadi[3]==10 || $sayi_bol_hadi[3]==12|| $sayi_bol_hadi[3]==13|| $sayi_bol_hadi[3]==15|| $sayi_bol_hadi[3]==17|| $sayi_bol_hadi[3]==20|| $sayi_bol_hadi[3]==22 || $sayi_bol_hadi[3]==24|| $sayi_bol_hadi[3]==26|| $sayi_bol_hadi[3]==27|| $sayi_bol_hadi[3]==29|| $sayi_bol_hadi[3]==32|| $sayi_bol_hadi[3]==34|| $sayi_bol_hadi[3]==36|| $sayi_bol_hadi[3]==37|| $sayi_bol_hadi[3]==39|| $sayi_bol_hadi[3]==41){ $renk_ver4 = "yellow"; } else { $renk_ver4 = "black"; }

if($sayi_bol_hadi[4]==1 || $sayi_bol_hadi[4]==3 || $sayi_bol_hadi[4]==5 || $sayi_bol_hadi[4]==8 || $sayi_bol_hadi[4]==10 || $sayi_bol_hadi[4]==12|| $sayi_bol_hadi[4]==13|| $sayi_bol_hadi[4]==15|| $sayi_bol_hadi[4]==17|| $sayi_bol_hadi[4]==20|| $sayi_bol_hadi[4]==22 || $sayi_bol_hadi[4]==24|| $sayi_bol_hadi[4]==26|| $sayi_bol_hadi[4]==27|| $sayi_bol_hadi[4]==29|| $sayi_bol_hadi[4]==32|| $sayi_bol_hadi[4]==34|| $sayi_bol_hadi[4]==36|| $sayi_bol_hadi[4]==37|| $sayi_bol_hadi[4]==39|| $sayi_bol_hadi[4]==41){ $renk_ver5 = "yellow"; } else { $renk_ver5 = "black"; }

if($sayi_bol_hadi[5]==1 || $sayi_bol_hadi[5]==3 || $sayi_bol_hadi[5]==5 || $sayi_bol_hadi[5]==8 || $sayi_bol_hadi[5]==10 || $sayi_bol_hadi[5]==12|| $sayi_bol_hadi[5]==13|| $sayi_bol_hadi[5]==15|| $sayi_bol_hadi[5]==17|| $sayi_bol_hadi[5]==20|| $sayi_bol_hadi[5]==22 || $sayi_bol_hadi[5]==24|| $sayi_bol_hadi[5]==26|| $sayi_bol_hadi[5]==27|| $sayi_bol_hadi[5]==29|| $sayi_bol_hadi[5]==32|| $sayi_bol_hadi[5]==34|| $sayi_bol_hadi[5]==36|| $sayi_bol_hadi[5]==37|| $sayi_bol_hadi[5]==39|| $sayi_bol_hadi[5]==41){ $renk_ver6 = "yellow"; } else { $renk_ver6 = "black"; }

if($sayi_bol_hadi[6]==1 || $sayi_bol_hadi[6]==3 || $sayi_bol_hadi[6]==5 || $sayi_bol_hadi[6]==8 || $sayi_bol_hadi[6]==10 || $sayi_bol_hadi[6]==12|| $sayi_bol_hadi[6]==13|| $sayi_bol_hadi[6]==15|| $sayi_bol_hadi[6]==17|| $sayi_bol_hadi[6]==20|| $sayi_bol_hadi[6]==22 || $sayi_bol_hadi[6]==24|| $sayi_bol_hadi[6]==26|| $sayi_bol_hadi[6]==27|| $sayi_bol_hadi[6]==29|| $sayi_bol_hadi[6]==32|| $sayi_bol_hadi[6]==34|| $sayi_bol_hadi[6]==36|| $sayi_bol_hadi[6]==37|| $sayi_bol_hadi[6]==39|| $sayi_bol_hadi[6]==41){ $renk_ver7 = "yellow"; } else { $renk_ver7 = "black"; }

?>

<td class="card" style="width: 196px;">
<div class="syslitem7s" style="display: block;float: left;margin-right: 1px;">
<div class="lottery-item li-<?=$renk_ver1;?>" style="width: 24px;height: 24px;"><span><?=$sayi_bol_hadi[0];?></span></div>
</div>
<div class="syslitem7s" style="display: block;float: left;margin-right: 1px;">
<div class="lottery-item li-<?=$renk_ver2;?>" style="width: 24px;height: 24px;"><span><?=$sayi_bol_hadi[1];?></span></div>
</div>
<div class="syslitem7s" style="display: block;float: left;margin-right: 1px;">
<div class="lottery-item li-<?=$renk_ver3;?>" style="width: 24px;height: 24px;"><span><?=$sayi_bol_hadi[2];?></span></div>
</div>
<div class="syslitem7s" style="display: block;float: left;margin-right: 1px;">
<div class="lottery-item li-<?=$renk_ver4;?>" style="width: 24px;height: 24px;"><span><?=$sayi_bol_hadi[3];?></span></div>
</div>
<div class="syslitem7s" style="display: block;float: left;margin-right: 1px;">
<div class="lottery-item li-<?=$renk_ver5;?>" style="width: 24px;height: 24px;"><span><?=$sayi_bol_hadi[4];?></span></div>
</div>
<div class="syslitem7s" style="display: block;float: left;margin-right: 1px;">
<div class="lottery-item li-<?=$renk_ver6;?>" style="width: 24px;height: 24px;"><span><?=$sayi_bol_hadi[5];?></span></div>
</div>
<div class="syslitem7s" style="display: block;float: left;margin-right: 1px;">
<div class="lottery-item li-<?=$renk_ver7;?>" style="width: 24px;height: 24px;"><span><?=$sayi_bol_hadi[6];?></span></div>
</div>
</td>

<?php } else { ?>

<td class="card" style="text-align:center;"></td>

<?php } ?>

<?php } else if($row['gameid']==3){ ?>

<?php if($row['oddid']==273 || $row['oddid']==274 || $row['oddid']==275 || $row['oddid']==276){ ?>

<td class="card" style="width: 84px;">
<div class="syslitem">

<?php
$sayila= $row['sayi'];
$yenisayilar = explode(',',$sayila);
$sayila = 1;
foreach($yenisayilar as $sayilariyazdir){
$sayila++;
if($sayilariyazdir<10){ $renk_ver = "white"; } else
if($sayilariyazdir==10 || $sayilariyazdir==11 || $sayilariyazdir==12 || $sayilariyazdir==13 || $sayilariyazdir==14 || $sayilariyazdir==15 || $sayilariyazdir==16 || $sayilariyazdir==17 || $sayilariyazdir==18){ $renk_ver = "green"; } else
if($sayilariyazdir==19 || $sayilariyazdir==20 || $sayilariyazdir==21 || $sayilariyazdir==22 || $sayilariyazdir==23 || $sayilariyazdir==24 || $sayilariyazdir==25 || $sayilariyazdir==26 || $sayilariyazdir==27){ $renk_ver = "red"; } else
if($sayilariyazdir>27){ $renk_ver = "blue"; }
?>

<?php if($sayila>1){ ?>
<div class="syslitem">
<?php } ?>

<div class="lottery-item li-<?=$renk_ver;?>" style="float: left;margin-right: 2px;"><span><?=$sayilariyazdir;?></span></div>

<?php if($sayila>1){ ?>
</div>
<?php } ?>

<?php } ?>

</div>
</td>

<?php } else { ?>
<td class="card" style="text-align:center;"></td>
<?php } ?>

<?php } else if($row['gameid']==8){ ?>

<td class="card" style="text-align:center;">

<?php if($row['oddid']==531 || $row['oddid']==533){ ?>
<span class="diamonds"></span>
<span class="hearts"></span>
<?php } else if($row['oddid']==532 || $row['oddid']==534){ ?>
<span class="clubs"></span>
<span class="spades"></span>
<?php } else if($row['oddid']==535){ ?>
<span class="clubs"></span>
<?php } else if($row['oddid']==536){ ?>
<span class="diamonds"></span>
<?php } else if($row['oddid']==537){ ?>
<span class="hearts"></span>
<?php } else if($row['oddid']==538){ ?>
<span class="spades"></span>
<?php } else if($row['oddid']==539){ ?>
<span class="clubs"></span>
<?php } else if($row['oddid']==540){ ?>
<span class="diamonds"></span>
<?php } else if($row['oddid']==541){ ?>
<span class="hearts"></span>
<?php } else if($row['oddid']==542){ ?>
<span class="spades"></span>
<?php } ?>

</td>

<?php } else if($row['gameid']==7){ ?>

<?php if($row['oddid']==500){ ?>

<td class="card"><div class="felekitem"><div class="lottery-item li-<? if($row['sayi']==1 || $row['sayi']==4 || $row['sayi']==7 || $row['sayi']==10 || $row['sayi']==13 || $row['sayi']==16){ ?>black<?php } else if($row['sayi']==2 || $row['sayi']==5 || $row['sayi']==8 || $row['sayi']==11 || $row['sayi']==14 || $row['sayi']==17){ ?>grey<?php } else if($row['sayi']==3 || $row['sayi']==6 || $row['sayi']==9 || $row['sayi']==12 || $row['sayi']==15 || $row['sayi']==18){ ?>red<?php } ?>"><span><?=$row['sayi'];?></span></div></div></td>
<?php } else { ?>
<td class="card" style="text-align:center;"></td>
<?php } ?>

<? }  else if($row['gameid']==10){ ?>

<?php if($row['oddid']==594){ ?>

<td class="card" style="text-align: left;width: 66px;">
<span class="dice-item dice-<?=$row['sayi'];?> dice-red" data-qa="area-game-item-1" style="width: 25px;height: 25px;float: left;"></span>
</td>

<?php } else if($row['oddid']==595){ ?>

<td class="card" style="text-align: left;width: 66px;">
<span class="dice-item dice-<?=$row['sayi'];?> dice-blue" data-qa="area-game-item-1" style="width: 25px;height: 25px;float: left;"></span>
</td>

<?php } else if($row['oddid']==596){ ?>
<?php
$sayilari_bol = explode(',',$row['sayi']);
$sayi_1_ver = $sayilari_bol[0];
$sayi_2_ver = $sayilari_bol[1];
?>
<td class="card" style="text-align: left;width: 66px;">
<span class="dice-item dice-<?=$sayi_1_ver;?> dice-red" data-qa="area-game-item-1" style="width: 25px;height: 25px;float: left;"></span>
<span class="dice-item dice-<?=$sayi_2_ver;?> dice-blue" data-qa="area-game-item-1" style="width: 25px;height: 25px;float: left;"></span>
</td>

<?php } else { ?>
<td class="card" style="text-align:center;"></td>
<?php } ?>

<? } else { ?>
<td class="card" style="text-align:center;"></td>
<?php } ?>


<?php ## SONUÇ YERİ İÇİN ## ?>

<?php if($row['gameid']==8){ ?>

<td class="card" style="text-align:center;">

<?php if($row['oddid']==531){ ?>
<?php if($row['krupiyesimge']=="diamonds" || $row['krupiyesimge']=="hearts"){ ?>
<span class="diamonds"></span>
<span class="hearts"></span>
<?php } else if($row['krupiyesimge']=="clubs" || $row['krupiyesimge']=="spades"){ ?>
<span class="clubs"></span>
<span class="spades"></span>
<?php } ?>

<?php } else if($row['oddid']==532){ ?>

<?php if($row['krupiyesimge']=="diamonds" || $row['krupiyesimge']=="hearts"){ ?>
<span class="diamonds"></span>
<span class="hearts"></span>
<?php } else if($row['krupiyesimge']=="clubs" || $row['krupiyesimge']=="spades"){ ?>
<span class="clubs"></span>
<span class="spades"></span>
<?php } ?>

<?php } else if($row['oddid']==533){ ?>

<?php if($row['oyuncusimge']=="diamonds" || $row['oyuncusimge']=="hearts"){ ?>
<span class="diamonds"></span>
<span class="hearts"></span>
<?php } else if($row['oyuncusimge']=="clubs" || $row['oyuncusimge']=="spades"){ ?>
<span class="clubs"></span>
<span class="spades"></span>
<?php } ?>

<?php } else if($row['oddid']==534){ ?>

<?php if($row['oyuncusimge']=="diamonds" || $row['oyuncusimge']=="hearts"){ ?>
<span class="diamonds"></span>
<span class="hearts"></span>
<?php } else if($row['oyuncusimge']=="clubs" || $row['oyuncusimge']=="spades"){ ?>
<span class="clubs"></span>
<span class="spades"></span>
<?php } ?>

<?php } else if($row['oddid']==535 || $row['oddid']==536 || $row['oddid']==537 || $row['oddid']==538){ ?>

<span class="<?=$row['krupiyesimge'];?>"></span>

<?php } else if($row['oddid']==539 || $row['oddid']==540 || $row['oddid']==541 || $row['oddid']==542){ ?>
<span class="<?=$row['oyuncusimge'];?>"></span>

<?php } else { ?>

<font style="top: 2.4px;position: relative;"><?=getTranslation('yeniyerler_kasa222')?>: <font style="text-transform: capitalize;"><?=$row['krupiyekart'];?></font></font><span class="<?=$row['krupiyesimge'];?>"></span>
<br>
<font style="top: 2.4px;position: relative;"><?=getTranslation('yeniyerler_kasa223')?>: <font style="text-transform: capitalize;"><?=$row['oyuncukart'];?></font></font><span class="<?=$row['oyuncusimge'];?>"></span>

<?php } ?>

</td>

<?php } else if($row['gameid']==5){ ?>

<td class="card" style="text-align: left;"><?=getTranslation('selectoptionkazanan')?> : <?=$row['kazanmasekli'];?><br><?=getTranslation('yeniyerler_kasa224')?> : <?=$row['kazananeller'];?></td>

<?php } else if($row['gameid']==6){ ?>

<td class="bakaracards" style="text-align: left;width: 130px;">

<div class="results-player-cards winner">
<span class="baccarat-results-winner player">O</span>
<span class="card <?=$row['oyuncu_1_renk'];?>" data-qa="area-card-<?=$row['oyuncu_1_renk'];?>"><b style="top: 2.4px;position: relative;"><?=$row['oyuncu_1'];?></b><span class="<?=$row['oyuncu_1_renk'];?>"></span></span>
<span class="card <?=$row['oyuncu_2_renk'];?>" data-qa="area-card-<?=$row['oyuncu_2_renk'];?>"><b style="top: 2.4px;position: relative;"><?=$row['oyuncu_2'];?></b><span class="<?=$row['oyuncu_2_renk'];?>"></span></span>
<?php if($row['oyuncu_3']!=''){ ?>
<span class="card <?=$row['oyuncu_3_renk'];?>" data-qa="area-card-<?=$row['oyuncu_3_renk'];?>"><b style="top: 2.4px;position: relative;"><?=$row['oyuncu_3'];?></b><span class="<?=$row['oyuncu_3_renk'];?>"></span></span>
<?php } ?>
<span class="baccarat-result-score">(<?=$row['skor_oyuncu'];?>)</span>
</div>

<div class="results-banker-cards lost">
<span class="baccarat-results-winner banker">K</span>
<span class="card <?=$row['krupiye_1_renk'];?>" data-qa="area-card-<?=$row['krupiye_1_renk'];?>"><b style="top: 2.4px;position: relative;"><?=$row['krupiye_1'];?></b><span class="<?=$row['krupiye_1_renk'];?>"></span></span>
<span class="card <?=$row['krupiye_2_renk'];?>" data-qa="area-card-<?=$row['krupiye_2_renk'];?>"><b style="top: 2.4px;position: relative;"><?=$row['krupiye_2'];?></b><span class="<?=$row['krupiye_2_renk'];?>"></span></span>
<?php if($row['oyuncu_3']!=''){ ?>
<span class="card <?=$row['krupiye_3_renk'];?>" data-qa="area-card-<?=$row['krupiye_3_renk'];?>"><b style="top: 2.4px;position: relative;"><?=$row['krupiye_3'];?></b><span class="<?=$row['krupiye_3_renk'];?>"></span></span>
<?php } ?>
<span class="baccarat-result-score">(<?=$row['skor_krupiye'];?>)</span>
</div>

</td>

<?php } else if($row['gameid']==7){ ?>

<td class="felekitem" style="text-align: left;width: 66px;"><?php if($row['kazanannumara']!=''){ ?><div class="lottery-item li-<?=$row['kazananrenk'];?>"><span><?=$row['kazanannumara'];?></span></div><?php } ?></td>

<?php } else if($row['gameid']==10){ ?>

<td class="card" style="text-align: left;width: 66px;">
<span class="dice-item dice-<?=$row['zar_1'];?> dice-red" data-qa="area-game-item-1" style="width: 25px;height: 25px;float: left;"></span>
<span class="dice-item dice-<?=$row['zar_2'];?> dice-blue" data-qa="area-game-item-1" style="width: 25px;height: 25px;float: left;"></span>
</td>

<?php } else if($row['gameid']==12){ ?>

<td class="card" style="text-align: left;"><?=getTranslation('selectoptionkazanan')?> : <?php if($row['kazananeller']=="split"){ ?><?=getTranslation('yeniyerler_kasa225')?><?php } else if($row['kazananeller']=="player"){ ?><?=getTranslation('yeniyerler_kasa223')?><?php } else if($row['kazananeller']=="dealer"){ ?><?=getTranslation('yeniyerler_kasa222')?><?php } ?><br><?=getTranslation('yeniyerler_kasa224')?> : <?=$row['kazanmasekli'];?></td>

<?php } else if($row['gameid']==3){ ?>

<td class="syslitem" style="text-align: left;width: 140px;">

<div class="lottery-item li-<?=$row['sayi_1_renk'];?>" style="float: left;margin-right: 2px;"><span><?=$row['sayi_1'];?></span></div>
<div class="lottery-item li-<?=$row['sayi_2_renk'];?>" style="float: left;margin-right: 2px;"><span><?=$row['sayi_2'];?></span></div>
<div class="lottery-item li-<?=$row['sayi_3_renk'];?>" style="float: left;margin-right: 2px;"><span><?=$row['sayi_3'];?></span></div>
<div class="lottery-item li-<?=$row['sayi_4_renk'];?>" style="float: left;margin-right: 2px;"><span><?=$row['sayi_4'];?></span></div>
<div class="lottery-item li-<?=$row['sayi_5_renk'];?>" style="float: left;margin-right: 2px;"><span><?=$row['sayi_5'];?></span></div>

</td>

<?php } else if($row['gameid']==9){ ?>

<td class="card" style="text-align: left;width: 90px;">

<div class="results-player-cards" style="display: block;float: left;">
<span class="baccarat-results-winner player" style="display: block;float: left;margin-top: 6px;margin-right: 7px;">A</span>
<div class="syslitem" style="width: 75px;">
<div class="lottery-item li-<?=$row['sayi_1_renk'];?>" style="display: block;float: left;margin-right: 4px;"><span><?=$row['sayi_1'];?></span></div>
<div class="lottery-item li-<?=$row['sayi_2_renk'];?>" style="display: block;float: left;"><span><?=$row['sayi_2'];?></span></div>
</div>
</div>

<div class="results-banker-cards" style="clear: both;display: block;float: left">
<span class="baccarat-results-winner banker" style="display: block;float: left;margin-top: 6px;margin-right: 7px;">B</span>
<div class="syslitem" style="width: 75px;">
<div class="lottery-item li-<?=$row['sayi_3_renk'];?>" style="display: block;float: left;margin-right: 4px;"><span><?=$row['sayi_3'];?></span></div>
<div class="lottery-item li-<?=$row['sayi_4_renk'];?>" style="display: block;float: left;"><span><?=$row['sayi_4'];?></span></div>
</div>
</div>

<div class="results-banker-cards" style="clear: both;display: block;float: left">
<span class="baccarat-results-winner banker" style="display: block;float: left;margin-top: 6px;margin-right: 7px;">C</span>
<div class="syslitem" style="width: 75px;">
<div class="lottery-item li-<?=$row['sayi_5_renk'];?>" style="display: block;float: left;margin-right: 4px;"><span><?=$row['sayi_5'];?></span></div>
<div class="lottery-item li-<?=$row['sayi_6_renk'];?>" style="display: block;float: left;"><span><?=$row['sayi_6'];?></span></div>
</div>
</div>

</td>

<?php } else if($row['gameid']==1){ ?>

<td class="syslitem7s" style="text-align: left;width: 198px;">
<div class="lottery-item li-<?=$row['sayi_1_renk'];?>" style="float: left;margin-right: 2px;"><span><?=$row['sayi_1'];?></span></div>
<div class="lottery-item li-<?=$row['sayi_2_renk'];?>" style="float: left;margin-right: 2px;"><span><?=$row['sayi_2'];?></span></div>
<div class="lottery-item li-<?=$row['sayi_3_renk'];?>" style="float: left;margin-right: 2px;"><span><?=$row['sayi_3'];?></span></div>
<div class="lottery-item li-<?=$row['sayi_4_renk'];?>" style="float: left;margin-right: 2px;"><span><?=$row['sayi_4'];?></span></div>
<div class="lottery-item li-<?=$row['sayi_5_renk'];?>" style="float: left;margin-right: 2px;"><span><?=$row['sayi_5'];?></span></div>
<div class="lottery-item li-<?=$row['sayi_6_renk'];?>" style="float: left;margin-right: 2px;"><span><?=$row['sayi_6'];?></span></div>
<div class="lottery-item li-<?=$row['sayi_7_renk'];?>" style="float: left;margin-right: 2px;"><span><?=$row['sayi_7'];?></span></div>
</td>

<?php } ?>

<?php ## SONUÇ YERİ İÇİN ## ?>

</tr>

<?php } ?>


<tr>
<td colspan="16">
<table class="tablesorter">
<tbody>
<tr>
<td><?=getTranslation('ajaxkupond68')?></td>
<td><strong><?=nf($kb['yatan']); ?></strong></td>
<td><?=getTranslation('ajaxkupond69')?></td>
<td><strong><?=nf($kb['oran']); ?></strong></td>
<td><?=getTranslation('ajaxkupond70')?></td>
<td><strong><?=nf($kb['tutar']); ?></strong></td>
<td><?=getTranslation('ajaxkupond71')?></td>
<td><strong><?=durumnedir($kb['durum']); ?></strong></td>


<?php if($ouseri['kazananyuzde']!="0" || $ouseri['kazananyuzde']!=""  || $ouseri_ust['kazananyuzde']!="0" || $ouseri_ust['kazananyuzde']!="") { 


if($ouseri['wkdurum']=="1") {
$yuzdesi = yuzdes($ouseri_ust['kazananyuzde']); 
} else {
$yuzdesi = yuzdes($ouseri['kazananyuzde']); 
}

$kesinti = $kb['tutar']*$yuzdesi;

$gercektutar = $kb['tutar']-$kesinti;

?>

<td><?=getTranslation('ajaxkupond72')?></td>
<td><strong><?=nf($kesinti);?></strong></td>

<td><?=getTranslation('ajaxkupond73')?></td>
<td><strong><?=nf($gercektutar);?></strong></td>

<?php } ?>


</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td colspan="12">
<div class="notice info">
<p><strong><?=getTranslation('ajaxkupond74')?>:</strong><?=date("d-m-Y H:i:s",$kb['kupon_time']); ?> <strong><?=getTranslation('ajaxkupond75')?>:</strong><?=$kb['ipadres'];?> <strong><?=getTranslation('ajaxkupond76')?>:</strong> <?=$kb['kupon_nots']; ?> <?php if($kb['durum']==4){ ?> / <strong><?=getTranslation('yeniyerler_kasa455')?> : <?=$kb['iptalusername']; ?> ( <?=getTranslation('ajaxkupond75')?> : <?=$kb['iptalipadres']; ?> )</strong><?php } ?></p>
</div>
</td>
</tr>


</tbody>
</table>
</div>
<div id="cboxLoadingOverlay" style="float: left; display: none;"></div>
<div id="cboxLoadingGraphic" style="float: left; display: none;"></div>
<div id="cboxTitle" style="float: left; display: block;"><?=$id;?> <?=getTranslation('ajaxkupond77')?></div>
<div id="cboxCurrent" style="float: left; display: none;"></div>
<div id="cboxNext" style="float: left; display: none;"></div>
<div id="cboxPrevious" style="float: left; display: none;"></div>
<div id="cboxSlideshow" style="float: left; display: none;"></div>
<div id="cboxClose" style="float: left;" onclick="kuponkapat();"></div>
</div>
<div id="cboxMiddleRight" style="float: left; height: 360px;"></div>
</div>
<div style="clear: left;">
<div id="cboxBottomLeft" style="float: left;"></div>
<div id="cboxBottomCenter" style="float: left; width: 951px;"></div>
<div id="cboxBottomRight" style="float: left;"></div>
</div>
</div>

<? }

if($a=="kuponddd") {

$id = gd("id");

$kb = bilgi("select * from kuponlar where id='$id'");

$ouseri = bilgi("select * from kullanici where id='$kb[user_id]'");

if($ouseri['wkdurum']=="1") { $ouseri_ust = bilgi("select * from kullanici where id='$ouseri[hesap_sahibi_id]'"); }

$bayilerim = benimbayilerim($ub['id']);

$bayiler_arr = explode(",",$bayilerim);

if(!in_array($kb['user_id'],$bayiler_arr)) { die("#404"); }

?>

<div id="cboxWrapper" style="height: 400px; width: 993px;">
<div>
<div id="cboxTopLeft" style="float: left;"></div>
<div id="cboxTopCenter" style="float: left; width: 951px;"></div>
<div id="cboxTopRight" style="float: left;"></div>
</div>
<div style="clear: left;">
<div id="cboxMiddleLeft" style="float: left; height: 360px;"></div>
<div id="cboxContent" style="float: left; width: 975px; height: 391px;">
<div id="cboxLoadedContent" style="width: 976px; overflow: auto; height: 362px;">
<table class="tablesorter" id="TdaHS54" style="width:99.9%;">
<thead>
<tr>
<th><?=getTranslation('ajaxkuponlarim15')?></th>
<th><?=getTranslation('yeniyerler_kasa226')?></th>
<th><?=getTranslation('hizligirissecim')?></th>
<th><?=getTranslation('yeniyerler_kasa227')?></th>
<th><?=getTranslation('ajaxtumkuponlarim12')?></th>
<th><?=getTranslation('ajaxhesaprapor11')?></th>
<th><?=getTranslation('yeniyerler_kasa228')?></th>
<th><?=getTranslation('oran')?></th>
<th><?=getTranslation('ajaxtumkuponlarim8')?></th>
</tr>
</thead>
<tbody>

<?php

function yuzdes($str) {

if(strlen($str)==1) { $yuzdedondur = "0.0".$str.""; } else

if(strlen($str)==2) { $yuzdedondur = "0.".$str.""; }

return $yuzdedondur;

}

$sor = sed_sql_query("select * from kupon_ic_rulet where kupon_id='$id'");

while($row=sed_sql_fetcharray($sor)) { 

if($row['roundid']=="single" || $row['roundid']=="zero"){
$oyun_isim = "".getTranslation('casinoicin433')."";
} else if($row['roundid']=="multi4"){
$oyun_isim = "".getTranslation('casinoicin436')."";
} else if($row['roundid']=="multi2"){
$oyun_isim = "".getTranslation('casinoicin434')."";
} else if($row['roundid']=="multi3"){
$oyun_isim = "".getTranslation('casinoicin435')."";
} else if($row['roundid']=="line1" || $row['roundid']=="line2" || $row['roundid']=="line3"){
$oyun_isim = "".getTranslation('casinoicin442')."";
} else if($row['roundid']=="1st12"){
$oyun_isim = "".getTranslation('casinoicin437')."";
} else if($row['roundid']=="2nd12"){
$oyun_isim = "".getTranslation('casinoicin438')."";
} else if($row['roundid']=="3rd12"){
$oyun_isim = "".getTranslation('casinoicin439')."";
} else if($row['roundid']=="even"){
$oyun_isim = "".getTranslation('casinoicin446')."";
} else if($row['roundid']=="odd"){
$oyun_isim = "".getTranslation('casinoicin445')."";
} else if($row['roundid']=="red"){
$oyun_isim = "".getTranslation('casinoicin443')."";
} else if($row['roundid']=="black"){
$oyun_isim = "".getTranslation('casinoicin444')."";
} else if($row['roundid']=="1to18"){
$oyun_isim = "".getTranslation('casinoicin440')."";
} else if($row['roundid']=="19to36"){
$oyun_isim = "".getTranslation('casinoicin441')."";
}

$oran_bol = explode('.',$row['oran']);

?>

<tr class="itext-<?php if($row['kazanma']=="1") { echo "3"; } else if($row['kazanma']=="2") { echo "1"; } else if($row['kazanma']=="3") { echo "2"; } else if($row['kazanma']=="4") { echo "4"; } ?> c">

<td style="text-align:center;"><?=getTranslation('yeniyerler_kasa229')?></td>

<td style="text-align:center;"><?=$row['oddid']; ?></td>

<td style="text-align:center;"><?=$oyun_isim;?></td>

<td style="text-align:center;"><?=$row['sayi']; ?></td>

<td style="text-align:center;"><?=nf($row['grupid']);?></td>

<td style="text-align:center;"><?=$row['sonuc']; ?></td>

<td style="text-align:center;"><?=$row['sonuczamani']; ?></td>

<td style="text-align:center;">x <?=$oran_bol[0];?></td>

<td style="text-align:center;">
<?php if($row['kazanma']=="1") { ?><?=getTranslation('ajaxtumkuponlarim4')?><?php } else if($row['kazanma']=="2") { ?><?=getTranslation('ajaxtumkuponlarim2')?><?php } else if($row['kazanma']=="3") { ?><?=getTranslation('ajaxtumkuponlarim3')?><?php } else if($row['kazanma']=="4") { ?><?=getTranslation('ajaxtumkuponlarim5')?><?php } ?>
</td>

</tr>

<?php } ?>


<tr>
<td colspan="16">
<table class="tablesorter">
<tbody>
<tr>
<td><?=getTranslation('ajaxkupond68')?></td>
<td><strong><?=nf($kb['yatan']); ?></strong></td>
<td><?=getTranslation('ajaxkupond69')?></td>
<td><strong><?=nf($kb['oran']); ?></strong></td>
<td><?=getTranslation('ajaxkupond70')?></td>
<td><strong><?=nf($kb['tutar']); ?></strong></td>
<td><?=getTranslation('ajaxkupond71')?></td>
<td><strong><?=durumnedir($kb['durum']); ?></strong></td>


<?php if($ouseri['kazananyuzde']!="0" || $ouseri['kazananyuzde']!=""  || $ouseri_ust['kazananyuzde']!="0" || $ouseri_ust['kazananyuzde']!="") { 


if($ouseri['wkdurum']=="1") {
$yuzdesi = yuzdes($ouseri_ust['kazananyuzde']); 
} else {
$yuzdesi = yuzdes($ouseri['kazananyuzde']); 
}

$kesinti = $kb['tutar']*$yuzdesi;

$gercektutar = $kb['tutar']-$kesinti;

?>

<td><?=getTranslation('ajaxkupond72')?></td>
<td><strong><?=nf($kesinti);?></strong></td>

<td><?=getTranslation('ajaxkupond73')?></td>
<td><strong><?=nf($gercektutar);?></strong></td>

<?php } ?>


</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td colspan="12">
<div class="notice info">
<p><strong><?=getTranslation('ajaxkupond74')?>:</strong><?=date("d-m-Y H:i:s",$kb['kupon_time']); ?> <strong><?=getTranslation('ajaxkupond75')?>:</strong><?=$kb['ipadres'];?> <strong><?=getTranslation('ajaxkupond76')?>:</strong> <?=$kb['kupon_nots']; ?> <?php if($kb['durum']==4){ ?> / <strong><?=getTranslation('yeniyerler_kasa455')?> : <?=$kb['iptalusername']; ?> ( <?=getTranslation('ajaxkupond75')?> : <?=$kb['iptalipadres']; ?> )</strong><?php } ?></p>
</div>
</td>
</tr>


</tbody>
</table>
</div>
<div id="cboxLoadingOverlay" style="float: left; display: none;"></div>
<div id="cboxLoadingGraphic" style="float: left; display: none;"></div>
<div id="cboxTitle" style="float: left; display: block;"><?=$id;?> <?=getTranslation('ajaxkupond77')?></div>
<div id="cboxCurrent" style="float: left; display: none;"></div>
<div id="cboxNext" style="float: left; display: none;"></div>
<div id="cboxPrevious" style="float: left; display: none;"></div>
<div id="cboxSlideshow" style="float: left; display: none;"></div>
<div id="cboxClose" style="float: left;" onclick="kuponkapat();"></div>
</div>
<div id="cboxMiddleRight" style="float: left; height: 360px;"></div>
</div>
<div style="clear: left;">
<div id="cboxBottomLeft" style="float: left;"></div>
<div id="cboxBottomCenter" style="float: left; width: 951px;"></div>
<div id="cboxBottomRight" style="float: left;"></div>
</div>
</div>

<?php }

if($a=="kupondegisimlog") {

$tarih1 = basla_time(gd("tarih1"));

$tarih2 = bitir_time(gd("tarih2"));

$kid = gd("kid");

if(!empty($kid)) { $kid_ekle = "and kupon_id='$kid'"; } else { $kid_ekle = ""; }

$pageper = 50;

$benimbayilerim = benimbayilerim($ub['id']);

$bayi_array = explode(",",$benimbayilerim);

$gelen_sayfa = (isset($_GET['sayfa']) && $_GET['sayfa'] !='' ) ? intval($_GET['sayfa']) : 1;

//Sayfada kaç kayıt görünecek
$limit = $pageper;

//Kaç sayfa öncesi ve sonrası görünecek
$s_s = 10;

/*------------------------------------
Alan Başlıklarını ve $sonuc['alan1'] 
kısımlarını kendinize göre değiştirin
-------------------------------------*/


$sqladder_sayfalama = "edit_user_id='".$ub['id']."' $kid_ekle and zaman between '$tarih1' and '$tarih2'";

$s_sor = sed_sql_query("select count(id) from kupon_data where $sqladder_sayfalama") or trigger_error(mysql_error(),E_USER_ERROR);

$satir = sed_sql_result($s_sor,0);

sed_sql_freeresult($s_sor);

if($satir >0){//sonuç varsa

$baslama = ($gelen_sayfa > 1) ? (($gelen_sayfa -1) * $limit) : 0 ;

$sayfa_kac = $satir/$limit;

$sayfa_sayisi = ($satir % $limit != 0) ? intval($sayfa_kac)+1 : intval($sayfa_kac);

$basla=( $satir >= $baslama ) ? $baslama : 0 ;

unset( $sayfa_kac, $baslama );

$sqladderone = "edit_user_id='".$ub['id']."' $kid_ekle and zaman between '$tarih1' and '$tarih2' order by zaman DESC limit $basla,$limit";

$sor = sed_sql_query("select * from kupon_data where $sqladderone");

$i=1;

$style='';

if(sed_sql_numrows($sor)<1) { ?>

<div class="space_9 clear"></div>

<div class="space_9 clear"></div>

<div class="new_sheet cf panelHead" style="margin-top: 0px;height: 25px;line-height: 25px;text-align: center;background: #fff;border-bottom: 3px solid #ef8107;border-top: 3px solid #ef8107;">
<?=getTranslation('ajaxkupondegisim1')?>
</div>

<?php } else { ?>

<table class="tablesorter">
<tbody>
<tr>
<th><?=gd("tarih1");?> / <?=gd("tarih2");?> <?=getTranslation('ajaxkupondegisim2')?></th>
</tr>
</tbody>
</table>

<table id="tablesorter" class="tablesorter">
<thead>
<tr>
<th class="header">#</th>
<th class="header"><?=getTranslation('ajaxkupondegisim3')?></th>
<th class="header"><?=getTranslation('ajaxkupondegisim4')?></th>
<th class="header"><?=getTranslation('ajaxkupondegisim5')?></th>
<th class="header"><?=getTranslation('ajaxkupondegisim6')?></th>
<th class="header"><?=getTranslation('ajaxkupondegisim7')?></th>
<th class="header"><?=getTranslation('ajaxkupondegisim8')?></th>
</tr>
</thead>
<tbody>

<?php while($ass=sed_sql_fetcharray($sor)) { 
$karsilasma_bilgi = bilgi("select * from kupon_ic where id='".$ass['kupon_ic_id']."' limit 1");
?>

<tr class="itext-3 c">
<td style="text-align:center;"><?=$ass['id']; ?></td>
<td style="text-align:center;"><?=$ass['kupon_id']; ?></td>
<td style="text-align:center;"><?=$karsilasma_bilgi['ev_takim']; ?> - <?=$karsilasma_bilgi['konuk_takim']; ?></td>


<?php if($ass['edit_oran']!=$ass['yeni_oran']) { ?>

<td style="text-align:center;color: #0074d9;"><?=getTranslation('ajaxkupondegisim9')?></td>

<td style="text-align:center;"><?=$ass['edit_oran'];?></td>

<td style="text-align:center;"><?=$ass['yeni_oran'];?></td>

<?php } else { ?>

<td style="text-align:center;color:#f00;"><?=getTranslation('ajaxkupondegisim10')?></td>

<td style="text-align:center;"><?php if($ass['edit_durum']==1){ ?><font style="color:#000;"><?=getTranslation('ajaxkupondegisim11')?></font><?php } else if($ass['edit_durum']==2){ ?><font style="color:#42dc26;"><?=getTranslation('ajaxkupondegisim12')?></font><?php } else if($ass['edit_durum']==3){ ?><font style="color:#f00;"><?=getTranslation('ajaxkupondegisim13')?></font><?php } else if($ass['edit_durum']==4){ ?><font style="color:#0074df;"><?=getTranslation('ajaxkupondegisim14')?></font><?php } ?></td>

<td style="text-align:center;"><?php if($ass['yeni_durum']==1){ ?><font style="color:#000;"><?=getTranslation('ajaxkupondegisim11')?></font><?php } else if($ass['yeni_durum']==2){ ?><font style="color:#42dc26;"><?=getTranslation('ajaxkupondegisim12')?></font><?php } else if($ass['yeni_durum']==3){ ?><font style="color:#f00;"><?=getTranslation('ajaxkupondegisim13')?></font><?php } else if($ass['yeni_durum']==4){ ?><font style="color:#0074df;"><?=getTranslation('ajaxkupondegisim14')?></font><?php } ?></td>

<?php } ?>

<td style="text-align:center;"><?=$ass['ipadres'];?></td>

<?php } ?>

</tbody>
</table>

<div class="space_9"></div>
<div class="space"></div>

<span>
<div class="sheet_body_sub on cf">
<div class="main_box pager cf">
<div class="left" style="width: 100%">
<div class="div_center">

<?php 
$style = ($style=='') ? '2' : '';
$i++;
} ?>		

<?php 
		$hangi_sayfa= ($gelen_sayfa > 0)? $gelen_sayfa : 1 ;
		echo '<div class="inline" style="height: 38px;line-height: 24px;"><nav class="zipagin-light light-green">';	
	
	
			$alt= ($gelen_sayfa - $s_s);
			if($sayfa_sayisi <= $s_s || $gelen_sayfa <= $s_s ) {$alt=1;} 
			$ust= (($gelen_sayfa + $s_s)< $sayfa_sayisi ) ? ($gelen_sayfa + $s_s) : ($sayfa_sayisi);	
			echo ($gelen_sayfa > 1 )? '<a class="" href="javascript:;" onclick="kuponraporgetir(1,1);" id="sayfaveri">'.getTranslation('ajaxtumkuponlarim30').'</a><a class="" href="javascript:;" id="sayfaveri" onclick="kuponraporgetir(1,'.($gelen_sayfa -1).');">« '.getTranslation('ajaxtumkuponlarim31').'</a>':' ';
			for($i=$alt; $i<=$ust ;$i++){		
				echo ($i != $gelen_sayfa ) ? '<a class="" href="javascript:;" id="sayfaveri" onclick="kuponraporgetir(1,'.$i.');">'.$i.'</a>' : '<span>'.$i.'</span>';
				}
			echo ($gelen_sayfa < $sayfa_sayisi)? '<a class="" href="javascript:;" id="sayfaveri" onclick="kuponraporgetir(1,'.($gelen_sayfa +1).');">'.getTranslation('ajaxtumkuponlarim32').' »</a><a class="" href="javascript:;" id="sayfaveri" onclick="kuponraporgetir(1,'.$sayfa_sayisi.');">'.getTranslation('ajaxtumkuponlarim33').'</a>' :'';
			echo '</nav></div>';
?>

</div>
</div>
</div>
</div>
</span>

<?php } else { ?>

<div class="space_9 clear"></div>

<div class="space_9 clear"></div>

<div class="new_sheet cf panelHead" style="margin-top: 0px;height: 25px;line-height: 25px;text-align: center;background: #fff;border-bottom: 3px solid #ef8107;border-top: 3px solid #ef8107;">
<?=getTranslation('ajaxkupondegisim1')?>
</div>

<?php } ?>

<table class="tablesorter">
<tbody><tr>
<th><?=getTranslation('ajaxkupondegisim15')?></th>
</tr>
<tr>
<td>
<div class="notice info">
<ul class="list-unordered list-checked2">
<li><?=getTranslation('ajaxkupondegisim16')?></li>
</ul>
</div>
</td>
</tr>
</tbody>
</table>
</div>

<?php }

if($a=="analiz_macgetir") {

$sportip = gd("sportip");

$baslangic = tarihtotime_start(gd("tarih"));

$bitis = tarihtotime_end(gd("tarih"));

$benimkiler = benimbayilerim($ub['id']);

if($sportip=="") {
die('<option value="">Spor tipi seçiniz</option>');
}

$sor = sed_sql_query("select * from kupon_ic where spor_tip='$sportip' and mac_time between '$baslangic' and '$bitis' group by ev_takim,konuk_takim order by ev_takim asc");

if(sed_sql_numrows($sor)<1) {

echo '<option value="">Maç bulunamadı</option>';

} else {

echo '<option value="">Maç seçiniz</option>';

while($row=sed_sql_fetcharray($sor)) {

?>

<option value="<?="$row[ev_takim]|$row[konuk_takim]";?>">( <?="$row[iy] / $row[ms]"; ?> ) <?="$row[ev_takim] - $row[konuk_takim]"; ?></option>

<?php } } ?>

<?php } 

if($a=="analiz_tahmingetir") {

$sportip = gd("sportip");

$baslangic = tarihtotime_start(gd("tarih"));

$bitis = tarihtotime_end(gd("tarih"));

$benimkiler = benimbayilerim($ub['id']);

$mac = gd("mac");

$macbol = explode("|",$mac);

$ev_takim = $macbol[0];

$konuk_takim = $macbol[1];

$sor = sed_sql_query("select * from kupon_ic where spor_tip='$sportip' and mac_time between '$baslangic' and '$bitis' and ev_takim='$ev_takim' and konuk_takim='$konuk_takim' group by oran_tip order by oran_tip asc");

if(sed_sql_numrows($sor)<1) {

echo '<option value="">Maç seçiniz</option>';

} else {

echo '<option value="">Tahmin Seçiniz</option>';

while($row=sed_sql_fetcharray($sor)) {

$otbol = explode("|",$row['oran_tip']);

?>

<option value="<?=base64_encode($row['oran_tip']); ?>"><?="$otbol[0] - $otbol[1]"; ?> <?php if(!empty($row['oran_val'])) { echo "($row[oran_val])"; } ?></option>

<?php } } ?>

<?php } 

if($a=="analizle") {

$baslangic = tarihtotime_start(gd("tarih"));

$bitis = tarihtotime_end(gd("tarih"));

$benimkiler = benimbayilerim($ub['id']);

$sportip = gd("sportip");

$macdbid = gd("macdbid");

$macbol = explode("|",$macdbid);

$oranvalid = base64_decode(gd("oranvalid"));

$durum = gd("durum");

$enazoran = gd("enazoran");

if($enazoran=="") { $enazoran = "1"; }

if($oranvalid=="") { $oranvalidekle = ""; } else { $oranvalidekle = "and oran_tip='$oranvalid'"; }

if(empty($sportip) || empty($macdbid)) { die("<div class='bos'>Lütfen <strong>Spor Tip</strong> bölümünden başlayarak tüm alanları sırasıyla seçiniz</div>"); }

if($durum=="") { $durum_ekle = ""; } else { $durum_ekle = "and k.durum='$durum'"; }

$sor = sed_sql_query("select * from kupon_ic where mac_time between '$baslangic' and '$bitis' and spor_tip='$sportip' and ev_takim='$macbol[0]' and konuk_takim='$macbol[1]' ".$oranvalidekle." and oran>$enazoran order by id desc");

$bilgisi = sed_sql_fetcharray($sor);

if(sed_sql_numrows($sor)<1) { echo "<div class='bos' style='text-align: center;font-weight: bold;margin: 10px;'>Herhangi bir sonuç bulunamadı</div>"; } else {

?>

<?php if($ub['id']=="1") { 

?>

<form method="post">

<div class="card-header">Kuponları ortak düzenle</div>
<div class="card">
<div class="card-block">
<div class="row">

<div class="form-group col-sm-2">
<label for="">İlk Yarı</label>
<input type="text" class="form-control" id="duzen_iy" value="<?=$bilgisi['iy']; ?>">
</div>

<div class="form-group col-sm-2">
<label for="">Maç Sonucu</label>
<input type="text" class="form-control" id="duzen_ms" value="<?=$bilgisi['ms']; ?>">
</div>

<div class="form-group col-sm-2">
<label for="">Sabit Oran</label>
<input type="text" class="form-control" id="duzen_ortakoran" value="<?php if($oranvalid!="") { echo "1"; } else { echo "0"; } ?>">
</div>

<div class="form-group col-sm-2">
<label for="">Tercih</label>
<input type="text" class="form-control" id="duzen_orantip" value="<?php if($oranvalid!="") { echo $bilgisi['oran_tip']; } else { echo ""; } ?>">
</div>

<div class="form-group col-sm-2">
<label for="">Oran Değiştir</label>
<select class="form-control" id="duzen_orandegis">
<option value="0">Hayır</option>
<option value="1">Evet</option>
</select>
</div>

<div class="form-group col-sm-2">
<label for="">Durum Değiştir</label>
<select class="form-control" id="duzen_durum">
<option value="1">Bahis açık (Yeniden hesapla)</option>
<option value="2">Kazandı</option>
<option value="3">Kaybetti</option>
<option value="4">İptal</option>
</select>
</div>

</div>
</div>
<div class="card-footer">
<button type="button" class="btn btn-link btn-sm" onClick="allduzenle();">Güncelle</button>
<input type="hidden" id="duzen_macdbid" value="<?="$macbol[0]|$macbol[1]"; ?>">
<input type="hidden" id="duzen_sportip" value="<?=$sportip;?>">
<input type="hidden" id="duzen_startfi" value="<?=$baslangic;?>|<?=$bitis;?>">
</div>
</div>

<script>

function allduzenle() {

	if(confirm('Emin misin?')) {

	var rand = Math.random();

	var iy = $("#duzen_iy").val();

	var ms = $("#duzen_ms").val();

	var ortakoran = $("#duzen_ortakoran").val();

	var orantip = $("#duzen_orantip").val();

	var orandegis = $("#duzen_orandegis").val();

	var durum = $("#duzen_durum").val();

	var macdbid = $("#duzen_macdbid").val();

	var kuponids = $("#duzen_kupon_ids").val();

	var sportip = $("#duzen_sportip").val()

	var baslabit = $("#duzen_startfi").val();
	
	$.ajax({
		url: '../ajax_players.php?a=analizduzelt&iy='+iy+'&ms='+ms+'&ortakoran='+ortakoran+'&orantip='+orantip+'&orandegis='+orandegis+'&durum='+durum+'&macdbid='+macdbid+'&sportip='+sportip+'&baslabit='+baslabit+'',
		type:"POST",
		data: "kuponids="+kuponids+"",
		success: function(data) {
		raporla();	
		}
		});

	}

}

</script>

<?php } ?>

<div class="card">
<div class="card-block p-0">
<div class="table-responsive">
<table class="table mb-0">
<thead>
<tr>
<th width="5%">Kupon ID</th>
<th width="10%">Bayi</th>
<th width="15%">Karşılaşma</th>
<th width="10%" style="text-align:center;">Tarih</th>
<th width="5%" style="text-align:center;">Tercih</th>
<th width="5%" style="text-align:center;">Seçim</th>
<th width="5%" style="text-align:center;">Oran</th>
<th width="5%" style="text-align:center;">Durum</th>
</tr>
</thead>
<tbody id="calcall">

<?php 

$sor = sed_sql_query("select * from kupon_ic where mac_time between '$baslangic' and '$bitis' and spor_tip='$sportip' and ev_takim='$macbol[0]' and konuk_takim='$macbol[1]' ".$oranvalidekle." and oran>$enazoran order by id desc");

while($row=sed_sql_fetcharray($sor)) { 

$ob = explode("|",$row['oran_tip']);

$kupon_ids .= "$row[kupon_id],";

$kup_bilgi = bilgi("select * from kuponlar where id='$row[kupon_id]'");

?>

<tr>
<td width="10%"><?=$kup_bilgi['id']; ?></td>
<td width="10%">BK<?=$kup_bilgi['user_id']; ?> (<?=$kup_bilgi['username']; ?>)</td>
<td width="15%"><?=$row['ev_takim']; ?> - <?=$row['konuk_takim']; ?></td>
<td width="10%" style="text-align:center;"><?=date("d-m-Y H:i:s",$kup_bilgi['kupon_time']); ?></td>
<td width="10%" style="text-align:center;"><code><?=$ob[0]; ?></code></td>
<td width="10%" style="text-align:center;"><code><?=$ob[1]; ?></code></td>
<td width="10%" style="text-align:center;"><code><?=nf($row['oran']); ?></code></td>
<td width="10%" style="text-align:center;"><span class="tag tag-<?php if($row['kazanma']==1){ ?>warning<?php } else if($row['kazanma']==2){ ?>success<?php } else if($row['kazanma']==3){ ?>danger<?php } else if($row['kazanma']==4){ ?>info<?php } ?>" style="width: 56px;text-align: center;"><?php if($row['kazanma']==1){ ?>Bekliyor<?php } else if($row['kazanma']==2){?>Kazandı<?php } else if($row['kazanma']==3){?>Kaybetti<?php } else if($row['kazanma']==4){?>İptal Edildi<?php } ?></span></td>
</tr>

<?php } ?>

</div>

<?php if($ub['id']=="1") { ?>

<input type="hidden" id="duzen_kupon_ids" value="<?=substr($kupon_ids,0,-1); ?>">

</form>

<?php } ?>

<?php } ?>

<?php }

if($a=="analizduzelt") {

$iy = gd("iy");

$ms = gd("ms");

$ortakoran = gd("ortakoran");

$orantip = gd("orantip");

$orandegis = gd("orandegis");

$durum = gd("durum");

$macdbid = gd("macdbid");

$sportip = gd("sportip");

$kuponids = pd("kuponids");

$macbol = explode("|",$macdbid);

$baslabit = explode("|",gd("baslabit"));

$basla = $baslabit[0];

$bitir = $baslabit[1];

if($orandegis==1) { $orandegis_ekle = ",oran='$ortakoran'"; } else { $orandegis_ekle = ""; }

if(!empty($orantip)) { $orantip_ekle = "and oran_tip='$orantip'"; } else { $orantip_ekle = ""; }

sed_sql_query("update kupon_ic set iy='$iy',ms='$ms',kazanma='$durum'".$orandegis_ekle." where spor_tip='".$sportip."' and ev_takim='$macbol[0]' and konuk_takim='$macbol[1]' ".$orantip_ekle." and mac_time between '$basla' and '$bitir' and kazanma!='4'"); 

$kuponlar = explode(",",$kuponids);

for($i=0; $i<count($kuponlar); $i++) {

kupon_hesapla($kuponlar[$i]);

}

}

if($a=="kuponduz") {

$kupon_id = gd("kupon_id");

$yenioran = gd("yenioran");

$yenidurum = gd("yenidurum");

$mevcutoran = gd("mevcutoran");

$mevcutdurum = gd("mevcutdurum");

$line_id = gd("idob");

$bayilerim = explode(",",benimbayilerim($ub['id']));

$zaman = time();

$ipadres = $_SERVER['REMOTE_ADDR'];

$kupon_bilgi = bilgi("select * from kuponlar where id='$kupon_id' limit 1");

if(empty($kupon_bilgi['id'])) { die("2"); } else

if(!in_array($kupon_bilgi['user_id'],$bayilerim)) { die("2"); } else {

sed_sql_query("update kupon_ic set oran='$yenioran',kazanma='$yenidurum' where id='$line_id'");

if($mevcutoran!=$yenioran || $mevcutdurum!=$yenidurum) {

sed_sql_query("insert into kupon_data (id,kupon_id,kupon_ic_id,edit_user,edit_user_id,edit_oran,edit_durum,yeni_oran,yeni_durum,zaman,ipadres) values

('','$kupon_id','$line_id','$ub[username]','$ub[id]','$mevcutoran','$mevcutdurum','$yenioran','$yenidurum','$zaman','$ipadres')");

}

kupon_hesapla($kupon_id);

die("1");

}

}

if($a=="ligdurumdegis") {

$ulke = gd("ulke");
$lig = gd("lig");
$spor_tipi = gd("spor_tipi");

sed_sql_query("delete from program_lig_gizli where spor_tipi='".$spor_tipi."' and lig_adi='".$lig."' and lig_ulke='".$ulke."' and bayi_id='".$ub['id']."'");

}

if($a=="canlidurum_degis") {

$id = gd("id");
$sportipi = gd("sportipi");
$durum = gd("durum");

if($sportipi=="futbol" && $durum == 1){
sed_sql_query("delete from yasakcanli where spor_tipi='futbol' and eventid='".$id."' and bayi_id='".$ub['id']."'");
} else if($sportipi=="futbol" && $durum == 0){
sed_sql_query("INSERT INTO yasakcanli SET spor_tipi='futbol', eventid = '".$id."', bayi_id = '".$ub['id']."'");
} else if($sportipi=="basketbol" && $durum == 1){
sed_sql_query("delete from yasakcanli where spor_tipi='basketbol' and eventid='".$id."' and bayi_id='".$ub['id']."'");
} else if($sportipi=="basketbol" && $durum == 0){
sed_sql_query("INSERT INTO yasakcanli SET spor_tipi='basketbol', eventid = '".$id."', bayi_id = '".$ub['id']."'");
} else if($sportipi=="tenis" && $durum == 1){
sed_sql_query("delete from yasakcanli where spor_tipi='tenis' and eventid='".$id."' and bayi_id='".$ub['id']."'");
} else if($sportipi=="tenis" && $durum == 0){
sed_sql_query("INSERT INTO yasakcanli SET spor_tipi='tenis', eventid = '".$id."', bayi_id = '".$ub['id']."'");
} else if($sportipi=="voleybol" && $durum == 1){
sed_sql_query("delete from yasakcanli where spor_tipi='voleybol' and eventid='".$id."' and bayi_id='".$ub['id']."'");
} else if($sportipi=="voleybol" && $durum == 0){
sed_sql_query("INSERT INTO yasakcanli SET spor_tipi='voleybol', eventid = '".$id."', bayi_id = '".$ub['id']."'");
} else if($sportipi=="buzhokeyi" && $durum == 1){
sed_sql_query("delete from yasakcanli where spor_tipi='buzhokeyi' and eventid='".$id."' and bayi_id='".$ub['id']."'");
} else if($sportipi=="buzhokeyi" && $durum == 0){
sed_sql_query("INSERT INTO yasakcanli SET spor_tipi='buzhokeyi', eventid = '".$id."', bayi_id = '".$ub['id']."'");
} else if($sportipi=="masatenis" && $durum == 1){
sed_sql_query("delete from yasakcanli where spor_tipi='masatenis' and eventid='".$id."' and bayi_id='".$ub['id']."'");
} else if($sportipi=="masatenis" && $durum == 0){
sed_sql_query("INSERT INTO yasakcanli SET spor_tipi='masatenis', eventid = '".$id."', bayi_id = '".$ub['id']."'");
}

}

if($a=="canlibahisler") {

$sa = date("H:i");
$fark = time()-120;

$sor = sed_sql_query("select * from canli_maclar where songuncelleme>$fark and isibitti='0' group by eventid asc");
?>

<table class="tablesorter">
<thead>
<tr>
<th colspan="10">
<font style="float:left;"><?=getTranslation('ajaxcanlibahisler1')?></font>
<font style="float:right;"><?=getTranslation('ajaxcanlibahisler2')?> : 
<select class="inputCombo chosen" onchange="window.location.href='canlibahislerbasket.php';">
<option value="1" selected><?=getTranslation('ajaxcanlibahisler3')?></option>
<option value="2"><?=getTranslation('ajaxcanlibahisler4')?></option>
</select>
</font>
</th>
</tr>
<tr>
<th width="50"><a class="grid" title="<?=getTranslation('ajaxcanlibahisler5')?>"><?=getTranslation('ajaxcanlibahisler5')?></a></th>
<th><?=getTranslation('ajaxcanlibahisler6')?></th>
<th><?=getTranslation('ajaxcanlibahisler7')?></th>
<th width="40"><?=getTranslation('ajaxcanlibahisler8')?></th>
<th width="90"><?=getTranslation('ajaxcanlibahisler9')?></th>
<th width="40"><?=getTranslation('ajaxcanlibahisler10')?></th>
<th width="25"></th>
</tr>
</thead>
<tbody>

<?php
$yeni = false;
$ulke = null;
while($row=sed_sql_fetcharray($sor)) {
$baslama_saat = strtotime($row['baslamasaat']);
$saat_ver = date("H:i",$baslama_saat);
$toplam = sed_sql_numrows($sor);

$bilgisi_getir_durum = bilgi("select * from yasakcanli where spor_tipi='futbol' and eventid='".$row['eventid']."' and bayi_id='".$ub['id']."'");
if($bilgisi_getir_durum['id']>0) { $bilgisini_ver_durum = 0; } else { $bilgisini_ver_durum = 1; }


?>

<tr id="livetr_<?=$row['eventid']; ?>">
<td class="c" style="text-align:center;"><?=$saat_ver; ?></td>
<td><?="".substr($row['ev_takim'],0,15)." - ".substr($row['konuk_takim'],0,15).""; ?></td>
<td><?=$row['ulke']; ?> <?php if($row['lig_adi']=="") { echo "Müsabaka bilgisi güncellendi."; } else { ?><?=$row['lig_adi']; ?><?php } ?></td>
<td class="c" style="text-align:center;"><?=$row['ev_skor']; ?>:<?=$row['konuk_skor']; ?></td>
<td class="c" style="text-align:center;"><?php if($row['devre']=="Devre arası") { echo "Devre"; } else if($row['devre']=="Henüz başlamadı") { echo "Az kaldı"; } else if($row['devremi']=="1") { echo "Devre"; } else if($row['dakika']=="") { echo "-"; } else { echo $row['devre']; } ?></td>
<td class="c livetimer_" style="text-align:center;"><?=$row['dakika'];?></td>
<td class="c" style="text-align:center;">

<?php if($bilgisini_ver_durum==1){ ?>
<a class="grid" href="javascript:;" onclick="canlidurum_degis('<?=$row['eventid'];?>','futbol','0');"><img src="/players/img/bahisler/status_1.png" border="0" id="liveimg_<?=$row['eventid']; ?>"></a>
<?php } else { ?>
<a class="grid" href="javascript:;" onclick="canlidurum_degis('<?=$row['eventid'];?>','futbol','1');"><img src="/players/img/bahisler/status_2.png" border="0" id="liveimg_<?=$row['eventid']; ?>"></a>
<?php } ?>

</td>
</tr>

<?php } ?>

<tr><td class="last" colspan="7"><?=getTranslation('ajaxcanlibahisler11')?> <?=$toplam; ?> <?=getTranslation('ajaxcanlibahisler12')?>.</td></tr>
</tbody>
</table>

<script>
function canlidurum_degis(id,sportipi,durum) {

var rand = Math.random();

$.get('../ajax_players.php?a=canlidurum_degis&id='+id+'&sportipi=futbol&durum='+durum+'',function(data) {
	failcont("<?=getTranslation('ajaxcanlibahisler13')?>","<?=getTranslation('ajaxcanlibahisler14')?>");
});

}
</script>

<table class="tablesorter">
<tbody>
<tr>
<th><?=getTranslation('ajaxcanlibahisler15')?></th>
</tr>
<tr>
<td></td>
</tr>
<tr>
<td>
<div class="notice info">
<ul class="list-unordered list-checked2">
<li><?=getTranslation('ajaxcanlibahisler16')?></li>
<li><?=getTranslation('ajaxcanlibahisler17')?></li>
<li><?=getTranslation('ajaxcanlibahisler18')?></li>
<li><?=getTranslation('ajaxcanlibahisler19')?></li>
<li><?=getTranslation('ajaxcanlibahisler20')?></li>
</ul>
</div>
</td>
</tr>
</tbody>
</table>

<script>
$(document).ready(function(e) {
var maclist = setTimeout(function() { canlimaclist(0); },8000);
});
</script>

<?php } 

if($a=="canlibahisler_2") {

$sa = date("H:i");
$fark = time()-120;

$sor = sed_sql_query("select * from basketbol_canli_maclar where songuncelleme>$fark and isibitti='0' group by eventid asc");
?>

<table class="tablesorter">
<thead>
<tr>
<th colspan="10">
<font style="float:left;"><?=getTranslation('ajaxcanlibahisler1')?></font>
<font style="float:right;"><?=getTranslation('ajaxcanlibahisler2')?> : 
<select class="inputCombo chosen" onchange="window.location.href='canlibahisler.php';">
<option value="1"><?=getTranslation('ajaxcanlibahisler3')?></option>
<option value="2" selected><?=getTranslation('ajaxcanlibahisler4')?></option>
</select>
</font>
</th>
</tr>
<tr>
<th width="50"><a class="grid" title="<?=getTranslation('ajaxcanlibahisler5')?>"><?=getTranslation('ajaxcanlibahisler5')?></a></th>
<th><?=getTranslation('ajaxcanlibahisler6')?></th>
<th><?=getTranslation('ajaxcanlibahisler7')?></th>
<th width="40"><?=getTranslation('ajaxcanlibahisler8')?></th>
<th width="90"><?=getTranslation('ajaxcanlibahisler9')?></th>
<th width="40"><?=getTranslation('ajaxcanlibahisler10')?></th>
<th width="25"></th>
</tr>
</thead>
<tbody>

<?php
$yeni = false;
$ulke = null;
while($row=sed_sql_fetcharray($sor)) {
$baslama_saat = strtotime($row['baslamasaat']);
$saat_ver = date("H:i",$baslama_saat);
$toplam = sed_sql_numrows($sor);

$bilgisi_getir_durum = bilgi("select * from yasakcanli where spor_tipi='basketbol' and eventid='".$row['eventid']."' and bayi_id='".$ub['id']."'");
if($bilgisi_getir_durum['id']>0) { $bilgisini_ver_durum = 0; } else { $bilgisini_ver_durum = 1; }


?>

<tr id="livetr_<?=$row['eventid']; ?>">
<td class="c" style="text-align:center;"><?=$saat_ver; ?></td>
<td><?="".substr($row['ev_takim'],0,15)." - ".substr($row['konuk_takim'],0,15).""; ?></td>
<td><?=$row['ulke']; ?> <?php if($row['lig_adi']=="") { echo "Müsabaka bilgisi güncellendi."; } else { ?><?=$row['lig_adi']; ?><?php } ?></td>
<td class="c" style="text-align:center;"><?=$row['ev_skor']; ?>:<?=$row['konuk_skor']; ?></td>
<td class="c" style="text-align:center;"><?=$row['period'];?></td>
<td class="c livetimer_" style="text-align:center;"><?=$row['dakika'];?></td>
<td class="c" style="text-align:center;">

<?php if($bilgisini_ver_durum==1){ ?>
<a class="grid" href="javascript:;" onclick="canlidurum_degis('<?=$row['eventid'];?>','basketbol','0');"><img src="/players/img/bahisler/status_1.png" border="0" id="liveimg_<?=$row['eventid']; ?>"></a>
<?php } else { ?>
<a class="grid" href="javascript:;" onclick="canlidurum_degis('<?=$row['eventid'];?>','basketbol','1');"><img src="/players/img/bahisler/status_2.png" border="0" id="liveimg_<?=$row['eventid']; ?>"></a>
<?php } ?>

</td>
</tr>

<?php } ?>

<tr><td class="last" colspan="7"><?=getTranslation('ajaxcanlibahisler11')?> <?=$toplam; ?> <?=getTranslation('ajaxcanlibahisler12')?>.</td></tr>
</tbody>
</table>

<script>
function canlidurum_degis(id,sportipi,durum) {

var rand = Math.random();

$.get('../ajax_players.php?a=canlidurum_degis&id='+id+'&sportipi=basketbol&durum='+durum+'',function(data) {
	failcont("<?=getTranslation('ajaxcanlibahisler13')?>","<?=getTranslation('ajaxcanlibahisler14')?>");
});

}
</script>

<table class="tablesorter">
<tbody>
<tr>
<th><?=getTranslation('ajaxcanlibahisler15')?></th>
</tr>
<tr>
<td></td>
</tr>
<tr>
<td>
<div class="notice info">
<ul class="list-unordered list-checked2">
<li><?=getTranslation('ajaxcanlibahisler16')?></li>
<li><?=getTranslation('ajaxcanlibahisler17')?></li>
<li><?=getTranslation('ajaxcanlibahisler18')?></li>
<li><?=getTranslation('ajaxcanlibahisler19')?></li>
<li><?=getTranslation('ajaxcanlibahisler20')?></li>
</ul>
</div>
</td>
</tr>
</tbody>
</table>

<script>
$(document).ready(function(e) {
var maclist = setTimeout(function() { canlimaclist(0); },8000);
});
</script>

<?php }

if($a=="sistemdekiler"){

$fark = time()-100;
if($ub['id']==1){
$sor = sed_sql_query("select * from kullanici where sonislem>$fark and root='0' order by sonislem desc");
}else{
$sor = sed_sql_query("select * from kullanici where sonislem>$fark and root='0' and (hesap_sahibi_user='".$ub['id']."' or hesap_sahibi_id='".$ub['id']."' or hesap_root_id='".$ub['id']."' or hesap_root_root_id='".$ub['id']."') order by sonislem desc");
}
$toplam = sed_sql_numrows($sor);
?>

<table class="tablesorter">
<tbody><tr>
<th><?=getTranslation('sistemdekiler3')?></th>
</tr>
<tr>
<td></td>
</tr>
<tr>
<td>
<div class="notice info">
<table class="tablesorter">
<tbody><tr>
<td style="width:45%;"><?=getTranslation('sistemdekiler4')?></td>
<td><strong style="color:#f00;font-weight:bold;font-size:12px;"><?=$toplam;?></strong> -  <?=getTranslation('sistemdekiler5')?></td>
</tr>
</tbody></table>
</div>
</td>
</tr>
</tbody>
</table>

<table class="tablesorter">
<thead>
<tr>
<th><?=getTranslation('sistemdekiler6')?></th>
<th><?=getTranslation('sistemdekiler7')?></th>
<th><?=getTranslation('sistemdekiler8')?></th>
<th><?=getTranslation('sistemdekiler9')?></th>
<th><?=getTranslation('sistemdekiler10')?></th>
<th><?=getTranslation('sistemdekiler11')?></th>
<th><?=getTranslation('sistemdekiler12')?></th>
</tr>
</thead>
<tbody>
<?php
while($row=sed_sql_fetcharray($sor)) { 
?>

<tr class="c">

<td style="text-align:center"><?=$row['username']; ?></td>
<td style="text-align:center"><?php 
if($row['id']=="1") { echo "Sistem Sahibi"; } else
if($row['hesap_root_root_id']=="") { echo "Patron Hesabı"; } else
if($row['wkyetki']=="3") { echo "Web Kullanıcı"; } else
if($row['wkyetki']=="2") { echo "Bayi"; } else
if($row['wkyetki']=="1") { echo "Süper Bayi"; } else
if($row['alt_durum']>0 && $row['alt_alt_durum']<1) { echo "Admin"; } else
if($row['alt_alt_durum']>0 && $row['sahip']<1) { echo "Super Admin"; } else
if($row['sahip']>0) { echo "Joker Admin"; }
?></td>
<td style="text-align:center"><?=$row['hesap_sahibi_user']; ?></td>
<td style="text-align:center"><?=date('d.m / H:i',$row['sonislem']);?></td>
<td style="text-align:center"><?=agent($row['oantarayici']); ?></td>
<td style="text-align:center"><a class="grid" href="https://ipinfo.io/<?=$row['oanip']; ?>" title="<?=getTranslation('sistemdekiler13')?>" rel="external">
<img src="/players/img/bayiler/ip.png" alt="Detaylar" border="0">
</a></td>
<td style="text-align:center"><a href="sistemdekiler.php?islem=disariat&id=<?=$row['id']?>"><img src="/players/img/bayiler/deleteyetki.png" alt="Dışarı At" border="0"></a></td>

</tr>
<?php } ?>

<?php }

if($a=="spordallari") {

$id = gd("id");

$sor = sed_sql_query("select * from sistemayar where ayar_id='$id'");

if(sed_sql_numrows($sor)<1) { ?>

<table class="tablesorter">
<thead>
<tr>
<th colspan="3"><?=getTranslation('ajaxspordallari1')?></th>
</tr>
<tr>
<th><?=getTranslation('ajaxspordallari2')?></th>
<th width="45"><?=getTranslation('ajaxspordallari3')?></th>
<th width="45"><?=getTranslation('ajaxspordallari4')?></th>
</tr>
</thead>

<?php } else { ?>

<script>

function asdes(order,as) {

$("#order").val(order);	

$("#ascdesc").val(as);

$("#suanval").val(1);

spordallari(<?=$id;?>);

}

function spordallaridurum(id,sportipi,durum) {

var rand = Math.random();	

$.get('../ajax_players.php?a=spordallaridurumdegis&id='+id+'&sportipi='+sportipi+'&durum='+durum+'',function(data) { spordallari('<?=$id;?>'); });

}

</script>

<table class="tablesorter">
<thead>
<tr>
<th colspan="3"><?=getTranslation('ajaxspordallari1')?></th>
</tr>
<tr>
<th><?=getTranslation('ajaxspordallari2')?></th>
<th width="45"><?=getTranslation('ajaxspordallari3')?></th>
<th width="45"><?=getTranslation('ajaxspordallari4')?></th>
</tr>
</thead>
<tbody>

<?php

while($row=sed_sql_fetcharray($sor)) {

?>

<tr class="c">
<td class="l"><?=getTranslation('ajaxspordallarisanalfutbol')?></td>
<td>
<?php 
if($row['sanal']=="1") {
$dur_sanalfutbol = 1;
?>
<img src="/players/img/akfpsf_1.png" alt="Durum" border="0">
<?php } else if($row['sanal']=="0") {
$dur_sanalfutbol = 0; 
?> 
<img src="/players/img/akfpsf_2.png" alt="Durum" border="0">
<?php } else if($row['sanal']=="") {
$dur_sanalfutbol = 0;
?>
<img src="/players/img/akfpsf_2.png" alt="Durum" border="0">
<?php } ?>
</td>

<td>
<?php if($dur_sanalfutbol=="1") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','sanal','0');"><font style="color:#f00;font-weight:bold;"><?=getTranslation('ajaxspordallaripasifet')?></font></a>
<?php } else if($dur_sanalfutbol=="0") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','sanal','1');"><font style="color:#0f8311;font-weight:bold;"><?=getTranslation('ajaxspordallariaktifet')?></font></a>
<?php } ?>
</td>

</tr>

<tr class="c">
<td class="l"><?=getTranslation('ajaxspordallaribasketbol')?></td>
<td>
<?php if($row['basketbol']=="1") { 
$dur_basketbol = 1;
?>
<img src="/players/img/akfpsf_1.png" alt="Durum" border="0">
<?php } else if($row['basketbol']=="0") { 
$dur_basketbol = 0;
?>
<img src="/players/img/akfpsf_2.png" alt="Durum" border="0">
<?php } else if($row['basketbol']=="") { 
$dur_basketbol = 0;
?>
<img src="/players/img/akfpsf_2.png" alt="Durum" border="0">
<?php } ?>
</td>

<td>
<?php if($dur_basketbol=="1") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','basketbol','0');"><font style="color:#f00;font-weight:bold;"><?=getTranslation('ajaxspordallaripasifet')?></font></a>
<?php } else if($dur_basketbol=="0") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','basketbol','1');"><font style="color:#0f8311;font-weight:bold;"><?=getTranslation('ajaxspordallariaktifet')?></font></a>
<?php } ?>
</td>

</tr>

<tr class="c">
<td class="l"><?=getTranslation('ajaxspordallaritenis')?></td>

<td>
<?php if($row['tenis']=="1") { 
$dur_tenis = 1;
?>
<img src="/players/img/akfpsf_1.png" alt="Durum" border="0">
<?php } else if($row['tenis']=="0") { 
$dur_tenis = 0;
?>
<img src="/players/img/akfpsf_2.png" alt="Durum" border="0">
<?php } else if($row['tenis']=="") { 
$dur_tenis = 0;
?>
<img src="/players/img/akfpsf_2.png" alt="Durum" border="0">
<?php } ?>
</td>

<td>
<?php if($dur_tenis=="1") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','tenis','0');"><font style="color:#f00;font-weight:bold;"><?=getTranslation('ajaxspordallaripasifet')?></font></a>
<?php } else if($dur_tenis=="0") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','tenis','1');"><font style="color:#0f8311;font-weight:bold;"><?=getTranslation('ajaxspordallariaktifet')?></font></a>
<?php } ?>
</td>

</tr>

<tr class="c">
<td class="l"><?=getTranslation('ajaxspordallarivoleybol')?></td>

<td>
<?php if($row['voleybol']=="1") { 
$dur_voleybol = 1;
?>
<img src="/players/img/akfpsf_1.png" alt="Durum" border="0">
<?php } else if($row['voleybol']=="0") { 
$dur_voleybol = 0;
?>
<img src="/players/img/akfpsf_2.png" alt="Durum" border="0">
<?php } else if($row['voleybol']=="") { 
$dur_voleybol = 0;
?>
<img src="/players/img/akfpsf_2.png" alt="Durum" border="0">
<?php } ?>
</td>

<td>
<?php if($dur_voleybol=="1") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','voleybol','0');"><font style="color:#f00;font-weight:bold;"><?=getTranslation('ajaxspordallaripasifet')?></font></a>
<?php } else if($dur_voleybol=="0") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','voleybol','1');"><font style="color:#0f8311;font-weight:bold;"><?=getTranslation('ajaxspordallariaktifet')?></font></a>
<?php } ?>
</td>

</tr>

<tr class="c">
<td class="l"><?=getTranslation('ajaxspordallaribuzhokeyi')?></td>

<td>
<?php if($row['buzhokeyi']=="1") { 
$dur_buzhokeyi = 1;
?>
<img src="/players/img/akfpsf_1.png" alt="Durum" border="0">
<?php } else if($row['buzhokeyi']=="0") { 
$dur_buzhokeyi = 0;
?>
<img src="/players/img/akfpsf_2.png" alt="Durum" border="0">
<?php } else if($row['buzhokeyi']=="") { 
$dur_buzhokeyi = 0;
?>
<img src="/players/img/akfpsf_2.png" alt="Durum" border="0">
<?php } ?>
</td>

<td>
<?php if($dur_buzhokeyi=="1") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','buzhokeyi','0');"><font style="color:#f00;font-weight:bold;"><?=getTranslation('ajaxspordallaripasifet')?></font></a>
<?php } else if($dur_buzhokeyi=="0") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','buzhokeyi','1');"><font style="color:#0f8311;font-weight:bold;"><?=getTranslation('ajaxspordallariaktifet')?></font></a>
<?php } ?>
</td>

</tr>

<tr class="c">
<td class="l"><?=getTranslation('ajaxspordallarihentbol')?></td>

<td>
<?php if($row['hentbol']=="1") { 
$dur_hentbol = 1;
?>
<img src="/players/img/akfpsf_1.png" alt="Durum" border="0">
<?php } else if($row['hentbol']=="0") { 
$dur_hentbol = 0;
?>
<img src="/players/img/akfpsf_2.png" alt="Durum" border="0">
<?php } else if($row['hentbol']=="") { 
$dur_hentbol = 0;
?>
<img src="/players/img/akfpsf_2.png" alt="Durum" border="0">
<?php } ?>
</td>

<td>
<?php if($dur_hentbol=="1") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','hentbol','0');"><font style="color:#f00;font-weight:bold;"><?=getTranslation('ajaxspordallaripasifet')?></font></a>
<?php } else if($dur_hentbol=="0") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','hentbol','1');"><font style="color:#0f8311;font-weight:bold;"><?=getTranslation('ajaxspordallariaktifet')?></font></a>
<?php } ?>
</td>

</tr>


<tr class="c">
<td class="l" style="color: #1102f5;font-weight: bold;"><?=getTranslation('ajaxspordallaricanlibahisler')?> <font style="color: #f00;float: right;font-weight: bold;"><?=getTranslation('ajaxspordallaricanlibahisler1')?></font></td>

<td>
<?php if($row['canlifutbol']=="1") { 
$dur_canlifutbol = 1;
?>
<img src="/players/img/akfpsf_1.png" alt="Durum" border="0">
<?php } else if($row['canlifutbol']=="0") { 
$dur_canlifutbol = 0;
?>
<img src="/players/img/akfpsf_2.png" alt="Durum" border="0">
<?php } else if($row['canlifutbol']=="") { 
$dur_canlifutbol = 0;
?>
<img src="/players/img/akfpsf_2.png" alt="Durum" border="0">
<?php } ?>
</td>

<td>
<?php if($dur_canlifutbol=="1") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','canlifutbol','0');"><font style="color:#f00;font-weight:bold;"><?=getTranslation('ajaxspordallaripasifet')?></font></a>
<?php } else if($dur_canlifutbol=="0") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','canlifutbol','1');"><font style="color:#0f8311;font-weight:bold;"><?=getTranslation('ajaxspordallariaktifet')?></font></a>
<?php } ?>
</td>

</tr>

<tr class="c">
<td class="l"><?=getTranslation('ajaxspordallaricanlibasketbol')?></td>

<td>
<?php if($row['canlibasketbol']=="1") { 
$dur_canlibasketbol = 1;
?>
<img src="/players/img/akfpsf_1.png" alt="Durum" border="0">
<?php } else if($row['canlibasketbol']=="0") { 
$dur_canlibasketbol = 0;
?>
<img src="/players/img/akfpsf_2.png" alt="Durum" border="0">
<?php } else if($row['canlibasketbol']=="") { 
$dur_canlibasketbol = 0;
?>
<img src="/players/img/akfpsf_2.png" alt="Durum" border="0">
<?php } ?>
</td>

<td>
<?php if($dur_canlibasketbol=="1") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','canlibasketbol','0');"><font style="color:#f00;font-weight:bold;"><?=getTranslation('ajaxspordallaripasifet')?></font></a>
<?php } else if($dur_canlibasketbol=="0") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','canlibasketbol','1');"><font style="color:#0f8311;font-weight:bold;"><?=getTranslation('ajaxspordallariaktifet')?></font></a>
<?php } ?>
</td>

</tr>

<tr class="c">
<td class="l"><?=getTranslation('ajaxspordallaricanlitenis')?></td>

<td>
<?php if($row['canlitenis']=="1") { 
$dur_canlitenis = 1;
?>
<img src="/players/img/akfpsf_1.png" alt="Durum" border="0">
<?php } else if($row['canlitenis']=="0") { 
$dur_canlitenis = 0;
?>
<img src="/players/img/akfpsf_2.png" alt="Durum" border="0">
<?php } else if($row['canlitenis']=="") { 
$dur_canlitenis = 0;
?>
<img src="/players/img/akfpsf_2.png" alt="Durum" border="0">
<?php } ?>
</td>

<td>
<?php if($dur_canlitenis=="1") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','canlitenis','0');"><font style="color:#f00;font-weight:bold;"><?=getTranslation('ajaxspordallaripasifet')?></font></a>
<?php } else if($dur_canlitenis=="0") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','canlitenis','1');"><font style="color:#0f8311;font-weight:bold;"><?=getTranslation('ajaxspordallariaktifet')?></font></a>
<?php } ?>
</td>

</tr>

<tr class="c">
<td class="l"><?=getTranslation('ajaxspordallaricanlivoleybol')?></td>

<td>
<?php if($row['canlivoleybol']=="1") { 
$dur_canlivoleybol = 1;
?>
<img src="/players/img/akfpsf_1.png" alt="Durum" border="0">
<?php } else if($row['canlivoleybol']=="0") { 
$dur_canlivoleybol = 0;
?>
<img src="/players/img/akfpsf_2.png" alt="Durum" border="0">
<?php } else if($row['canlivoleybol']=="") { 
$dur_canlivoleybol = 0;
?>
<img src="/players/img/akfpsf_2.png" alt="Durum" border="0">
<?php } ?>
</td>

<td>
<?php if($dur_canlivoleybol=="1") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','canlivoleybol','0');"><font style="color:#f00;font-weight:bold;"><?=getTranslation('ajaxspordallaripasifet')?></font></a>
<?php } else if($dur_canlivoleybol=="0") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','canlivoleybol','1');"><font style="color:#0f8311;font-weight:bold;"><?=getTranslation('ajaxspordallariaktifet')?></font></a>
<?php } ?>
</td>

</tr>

<tr class="c">
<td class="l"><?=getTranslation('ajaxspordallaricanlibuzhokeyi')?></td>

<td>
<?php if($row['canlibuzhokeyi']=="1") { 
$dur_canlibuzhokeyi = 1;
?>
<img src="/players/img/akfpsf_1.png" alt="Durum" border="0">
<?php } else if($row['canlibuzhokeyi']=="0") { 
$dur_canlibuzhokeyi = 0;
?>
<img src="/players/img/akfpsf_2.png" alt="Durum" border="0">
<?php } else if($row['canlibuzhokeyi']=="") { 
$dur_canlibuzhokeyi = 0;
?>
<img src="/players/img/akfpsf_2.png" alt="Durum" border="0">
<?php } ?>
</td>

<td>
<?php if($dur_canlibuzhokeyi=="1") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','canlibuzhokeyi','0');"><font style="color:#f00;font-weight:bold;"><?=getTranslation('ajaxspordallaripasifet')?></font></a>
<?php } else if($dur_canlibuzhokeyi=="0") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','canlibuzhokeyi','1');"><font style="color:#0f8311;font-weight:bold;"><?=getTranslation('ajaxspordallariaktifet')?></font></a>
<?php } ?>
</td>

</tr>

<tr class="c">

<td class="l"><font style="color: #0095ff;font-weight: bold;"><?=getTranslation('ajaxspordallaricanlihentbol')?></font> <font style="color: #f00;float: right;font-weight: bold;"><?=getTranslation('ajaxspordallaricanlihentbol1')?></font></td>

<td>
<img src="/players/img/akfpsf_2.png" alt="Durum" border="0">
</td>

<td>
<font style="color:#0f8311;font-weight:bold;"><?=getTranslation('ajaxspordallariaktifet')?></font>
</td>

</tr>

<?php } ?>

</tbody>
</table>

<?php } ?>

<table class="tablesorter">
<tbody><tr>
<th><?=getTranslation('ajaxspordallari5')?></th>
</tr>
<tr>
<td>
<div class="notice info">
<ul class="list-unordered list-checked2">
<li><?=getTranslation('ajaxspordallari6')?></li>
<li><?=getTranslation('ajaxspordallari7')?></li>
<li><?=getTranslation('ajaxspordallari8')?></li>
</ul>
</div>
</td>
</tr>
</tbody></table>

<?php }

if($a=="toplumbsdegis") {

$sportipi = gd("sportipi");

$mbs = gd("mbs");

if($sportipi=="sanalmbs"){
sed_sql_query("UPDATE sistemayar SET sanalmbs = '".$mbs."' WHERE ayar_id = '".$ub['id']."'");
} else if($sportipi=="futbolmbs"){
sed_sql_query("UPDATE sistemayar SET futbolmbs = '".$mbs."' WHERE ayar_id = '".$ub['id']."'");
} else if($sportipi=="basketmbs"){
sed_sql_query("UPDATE sistemayar SET basketmbs = '".$mbs."' WHERE ayar_id = '".$ub['id']."'");
} else if($sportipi=="tenismbs"){
sed_sql_query("UPDATE sistemayar SET tenismbs = '".$mbs."' WHERE ayar_id = '".$ub['id']."'");
} else if($sportipi=="voleybolmbs"){
sed_sql_query("UPDATE sistemayar SET voleybolmbs = '".$mbs."' WHERE ayar_id = '".$ub['id']."'");
} else if($sportipi=="buzhokeyimbs"){
sed_sql_query("UPDATE sistemayar SET buzhokeyimbs = '".$mbs."' WHERE ayar_id = '".$ub['id']."'");
} else if($sportipi=="hentbolmbs"){
sed_sql_query("UPDATE sistemayar SET hentbolmbs = '".$mbs."' WHERE ayar_id = '".$ub['id']."'");
} else if($sportipi=="canlifutbolmbs"){
sed_sql_query("UPDATE sistemayar SET canlifutbolmbs = '".$mbs."' WHERE ayar_id = '".$ub['id']."'");
} else if($sportipi=="canlibasketmbs"){
sed_sql_query("UPDATE sistemayar SET canlibasketmbs = '".$mbs."' WHERE ayar_id = '".$ub['id']."'");
} else if($sportipi=="canlitenismbs"){
sed_sql_query("UPDATE sistemayar SET canlitenismbs = '".$mbs."' WHERE ayar_id = '".$ub['id']."'");
} else if($sportipi=="canlivoleybolmbs"){
sed_sql_query("UPDATE sistemayar SET canlivoleybolmbs = '".$mbs."' WHERE ayar_id = '".$ub['id']."'");
} else if($sportipi=="canlibuzhokeyimbs"){
sed_sql_query("UPDATE sistemayar SET canlibuzhokeyimbs = '".$mbs."' WHERE ayar_id = '".$ub['id']."'");
} else if($sportipi=="canlihentbolmbs"){
sed_sql_query("UPDATE sistemayar SET canlihentbolmbs = '".$mbs."' WHERE ayar_id = '".$ub['id']."'");
}

}

if($a=="toplumbs") {

$sor = sed_sql_query("select * from sistemayar where ayar_id='".$ub['id']."'");

if(sed_sql_numrows($sor)<1) { ?>

<table class="tablesorter">
<thead>
<tr>
<th colspan="3"><?=getTranslation('ajaxtoplumbs1')?></th>
</tr>
<tr>
<th><?=getTranslation('ajaxtoplumbs2')?></th>
<th width="45"><?=getTranslation('ajaxtoplumbs3')?></th>
<th width="45"><?=getTranslation('ajaxtoplumbs4')?></th>
</tr>
</thead>

<?php } else { ?>

<script>

function asdes(order,as) {

$("#order").val(order);	

$("#ascdesc").val(as);

$("#suanval").val(1);

spordallari(<?=$id;?>);

}

function toplumbsdegis(sportipi,mbs,tip) {

var rand = Math.random();	

$.get('../ajax_players.php?a=toplumbsdegis&sportipi='+sportipi+'&mbs='+mbs+'',function(data) { 
failcont('<?=getTranslation('ajaxtoplumbs24')?>',''+tip+ ' <?=getTranslation('ajaxtoplumbs25')?> : ' +mbs+ ' <?=getTranslation('ajaxtoplumbs26')?>');
});

}

</script>

<table class="tablesorter">
<thead>
<tr>
<th colspan="3"><?=getTranslation('ajaxtoplumbs1')?></th>
</tr>
<tr>
<th><?=getTranslation('ajaxtoplumbs2')?></th>
<th width="45"><?=getTranslation('ajaxtoplumbs5')?></th>
</tr>
</thead>
<tbody>

<?php

while($row=sed_sql_fetcharray($sor)) {

?>

<tr class="c">
<td class="l"><?=getTranslation('ajaxtoplumbs6')?></td>

<td>
<select class="inputCombo chosen" style="width: 100%;" id="sanalmbs" onchange="toplumbsdegis('sanalmbs',$(this).val(),'<?=getTranslation('ajaxtoplumbs6')?>');">
<option <?php if($row['sanalmbs']=="1") { ?>selected<?php } ?> value="1">1</option>
<option <?php if($row['sanalmbs']=="2") { ?>selected<?php } ?> value="2">2</option>
<option <?php if($row['sanalmbs']=="3") { ?>selected<?php } ?> value="3">3</option>
<option <?php if($row['sanalmbs']=="4") { ?>selected<?php } ?> value="4">4</option>
</select>
</td>

</tr>


<tr class="c">
<td class="l"><?=getTranslation('ajaxtoplumbs7')?></td>

<td>
<select class="inputCombo chosen" style="width: 100%;" id="futbolmbs" onchange="toplumbsdegis('futbolmbs',$(this).val(),'<?=getTranslation('ajaxtoplumbs7')?>');">
<option <?php if($row['futbolmbs']=="1") { ?>selected<?php } ?> value="1">1</option>
<option <?php if($row['futbolmbs']=="2") { ?>selected<?php } ?> value="2">2</option>
<option <?php if($row['futbolmbs']=="3") { ?>selected<?php } ?> value="3">3</option>
<option <?php if($row['futbolmbs']=="4") { ?>selected<?php } ?> value="4">4</option>
</select>
</td>

</tr>

<tr class="c">
<td class="l"><?=getTranslation('ajaxtoplumbs8')?></td>
<td>
<select class="inputCombo chosen" style="width: 100%;" id="basketmbs" onchange="toplumbsdegis('basketmbs',$(this).val(),'<?=getTranslation('ajaxtoplumbs8')?>');">
<option <?php if($row['basketmbs']=="1") { ?>selected<?php } ?> value="1">1</option>
<option <?php if($row['basketmbs']=="2") { ?>selected<?php } ?> value="2">2</option>
<option <?php if($row['basketmbs']=="3") { ?>selected<?php } ?> value="3">3</option>
<option <?php if($row['basketmbs']=="4") { ?>selected<?php } ?> value="4">4</option>
</select>
</td>

</tr>

<tr class="c">
<td class="l"><?=getTranslation('ajaxtoplumbs9')?></td>

<td>
<select class="inputCombo chosen" style="width: 100%;" id="tenismbs" onchange="toplumbsdegis('tenismbs',$(this).val(),'<?=getTranslation('ajaxtoplumbs9')?>');">
<option <?php if($row['tenismbs']=="1") { ?>selected<?php } ?> value="1">1</option>
<option <?php if($row['tenismbs']=="2") { ?>selected<?php } ?> value="2">2</option>
<option <?php if($row['tenismbs']=="3") { ?>selected<?php } ?> value="3">3</option>
<option <?php if($row['tenismbs']=="4") { ?>selected<?php } ?> value="4">4</option>
</select>
</td>

</tr>

<tr class="c">
<td class="l"><?=getTranslation('ajaxtoplumbs10')?></td>

<td>
<select class="inputCombo chosen" style="width: 100%;" id="voleybolmbs" onchange="toplumbsdegis('voleybolmbs',$(this).val(),'<?=getTranslation('ajaxtoplumbs10')?>');">
<option <?php if($row['voleybolmbs']=="1") { ?>selected<?php } ?> value="1">1</option>
<option <?php if($row['voleybolmbs']=="2") { ?>selected<?php } ?> value="2">2</option>
<option <?php if($row['voleybolmbs']=="3") { ?>selected<?php } ?> value="3">3</option>
<option <?php if($row['voleybolmbs']=="4") { ?>selected<?php } ?> value="4">4</option>
</select>
</td>

</tr>

<tr class="c">
<td class="l"><?=getTranslation('ajaxtoplumbs11')?></td>

<td>
<select class="inputCombo chosen" style="width: 100%;" id="buzhokeyimbs" onchange="toplumbsdegis('buzhokeyimbs',$(this).val(),'<?=getTranslation('ajaxtoplumbs11')?>');">
<option <?php if($row['buzhokeyimbs']=="1") { ?>selected<?php } ?> value="1">1</option>
<option <?php if($row['buzhokeyimbs']=="2") { ?>selected<?php } ?> value="2">2</option>
<option <?php if($row['buzhokeyimbs']=="3") { ?>selected<?php } ?> value="3">3</option>
<option <?php if($row['buzhokeyimbs']=="4") { ?>selected<?php } ?> value="4">4</option>
</select>
</td>

</tr>

<tr class="c">
<td class="l"><?=getTranslation('ajaxtoplumbs12')?></td>

<td>
<select class="inputCombo chosen" style="width: 100%;" id="hentbolmbs" onchange="toplumbsdegis('hentbolmbs',$(this).val(),'<?=getTranslation('ajaxtoplumbs12')?>');">
<option <?php if($row['hentbolmbs']=="1") { ?>selected<?php } ?> value="1">1</option>
<option <?php if($row['hentbolmbs']=="2") { ?>selected<?php } ?> value="2">2</option>
<option <?php if($row['hentbolmbs']=="3") { ?>selected<?php } ?> value="3">3</option>
<option <?php if($row['hentbolmbs']=="4") { ?>selected<?php } ?> value="4">4</option>
</select>
</td>

</tr>


<tr class="c">
<td class="l"><?=getTranslation('ajaxtoplumbs13')?></td>

<td>
<select class="inputCombo chosen" style="width: 100%;" id="canlifutbolmbs" onchange="toplumbsdegis('canlifutbolmbs',$(this).val(),'<?=getTranslation('ajaxtoplumbs13')?>');">
<option <?php if($row['canlifutbolmbs']=="1") { ?>selected<?php } ?> value="1">1</option>
<option <?php if($row['canlifutbolmbs']=="2") { ?>selected<?php } ?> value="2">2</option>
<option <?php if($row['canlifutbolmbs']=="3") { ?>selected<?php } ?> value="3">3</option>
<option <?php if($row['canlifutbolmbs']=="4") { ?>selected<?php } ?> value="4">4</option>
</select>
</td>

</tr>

<tr class="c">
<td class="l"><?=getTranslation('ajaxtoplumbs14')?></td>

<td>
<select class="inputCombo chosen" style="width: 100%;" id="canlibasketmbs" onchange="toplumbsdegis('canlibasketmbs',$(this).val(),'<?=getTranslation('ajaxtoplumbs14')?>');">
<option <?php if($row['canlibasketmbs']=="1") { ?>selected<?php } ?> value="1">1</option>
<option <?php if($row['canlibasketmbs']=="2") { ?>selected<?php } ?> value="2">2</option>
<option <?php if($row['canlibasketmbs']=="3") { ?>selected<?php } ?> value="3">3</option>
<option <?php if($row['canlibasketmbs']=="4") { ?>selected<?php } ?> value="4">4</option>
</select>
</td>

</tr>

<tr class="c">
<td class="l"><?=getTranslation('ajaxtoplumbs15')?></td>

<td>
<select class="inputCombo chosen" style="width: 100%;" id="canlitenismbs" onchange="toplumbsdegis('canlitenismbs',$(this).val(),'<?=getTranslation('ajaxtoplumbs15')?>');">
<option <?php if($row['canlitenismbs']=="1") { ?>selected<?php } ?> value="1">1</option>
<option <?php if($row['canlitenismbs']=="2") { ?>selected<?php } ?> value="2">2</option>
<option <?php if($row['canlitenismbs']=="3") { ?>selected<?php } ?> value="3">3</option>
<option <?php if($row['canlitenismbs']=="4") { ?>selected<?php } ?> value="4">4</option>
</select>
</td>

</tr>

<tr class="c">
<td class="l"><?=getTranslation('ajaxtoplumbs16')?></td>

<td>
<select class="inputCombo chosen" style="width: 100%;" id="canlivoleybolmbs" onchange="toplumbsdegis('canlivoleybolmbs',$(this).val(),'<?=getTranslation('ajaxtoplumbs16')?>');">
<option <?php if($row['canlivoleybolmbs']=="1") { ?>selected<?php } ?> value="1">1</option>
<option <?php if($row['canlivoleybolmbs']=="2") { ?>selected<?php } ?> value="2">2</option>
<option <?php if($row['canlivoleybolmbs']=="3") { ?>selected<?php } ?> value="3">3</option>
<option <?php if($row['canlivoleybolmbs']=="4") { ?>selected<?php } ?> value="4">4</option>
</select>
</td>

</tr>

<tr class="c">
<td class="l"><?=getTranslation('ajaxtoplumbs17')?></td>

<td>
<select class="inputCombo chosen" style="width: 100%;" id="canlibuzhokeyimbs" onchange="toplumbsdegis('canlibuzhokeyimbs',$(this).val(),'<?=getTranslation('ajaxtoplumbs17')?>');">
<option <?php if($row['canlibuzhokeyimbs']=="1") { ?>selected<?php } ?> value="1">1</option>
<option <?php if($row['canlibuzhokeyimbs']=="2") { ?>selected<?php } ?> value="2">2</option>
<option <?php if($row['canlibuzhokeyimbs']=="3") { ?>selected<?php } ?> value="3">3</option>
<option <?php if($row['canlibuzhokeyimbs']=="4") { ?>selected<?php } ?> value="4">4</option>
</select>
</td>

</tr>

<tr class="c">
<td class="l"><?=getTranslation('ajaxtoplumbs18')?></td>

<td>
<select class="inputCombo chosen" style="width: 100%;" id="canlihentbolmbs" onchange="toplumbsdegis('canlihentbolmbs',$(this).val(),'<?=getTranslation('ajaxtoplumbs18')?>');">
<option <?php if($row['canlihentbolmbs']=="1") { ?>selected <?php } ?> value="1">1</option>
<option <?php if($row['canlihentbolmbs']=="2") { ?>selected <?php } ?> value="2">2</option>
<option <?php if($row['canlihentbolmbs']=="3") { ?>selected <?php } ?> value="3">3</option>
<option <?php if($row['canlihentbolmbs']=="4") { ?>selected <?php } ?> value="4">4</option>
</select>
</td>

</tr>

<?php } ?>

</tbody>
</table>

<?php } ?>

<table class="tablesorter">
<tbody><tr>
<th><?=getTranslation('ajaxtoplumbs19')?></th>
</tr>
<tr>
<td>
<div class="notice info">
<ul class="list-unordered list-checked2">
<li><?=getTranslation('ajaxtoplumbs20')?></li>
<li><?=getTranslation('ajaxtoplumbs21')?></li>
<li><?=getTranslation('ajaxtoplumbs22')?></li>
<li><?=getTranslation('ajaxtoplumbs23')?></li>
</ul>
</div>
</td>
</tr>
</tbody></table>

<?php }

if($a=="mbsdegis") {

$id = gd("id");

$sportipi = gd("sportipi");

$mbs = gd("mbs");

## FUTBOL ##

if($sportipi=="futbol" && $mbs == 1){
sed_sql_query("delete from maclar_mbs where spor_tipi='futbol' and mac_id='".$id."' and bayi_id='".$ub['id']."'");
} else if($sportipi=="futbol"){

$farray2 = bilgi("SELECT mac_id, mbs FROM maclar_mbs WHERE spor_tipi='futbol' AND mac_id = '".$id."' AND bayi_id = '".$ub['id']."' AND mbs != '1'");

if($farray2['mac_id'] < 1){
sed_sql_query("INSERT INTO maclar_mbs SET spor_tipi='futbol', mac_id = '".$id."', bayi_id = '".$ub['id']."', mbs = '".$mbs."'");
}else{
sed_sql_query("UPDATE maclar_mbs SET mbs = '".$mbs."' WHERE mac_id = '".$id."' AND bayi_id = '".$ub['id']."' AND spor_tipi='futbol'");
}

}

## FUTBOL ##

## BASKETBOL ##

else if($sportipi=="basketbol" && $mbs == 1){
sed_sql_query("delete from maclar_mbs where spor_tipi='basketbol' and mac_id='".$id."' and bayi_id='".$ub['id']."'");
} else if($sportipi=="basketbol"){

$farray2 = bilgi("SELECT mac_id, mbs FROM maclar_mbs WHERE spor_tipi='basketbol' AND mac_id = '".$id."' AND bayi_id = '".$ub['id']."' AND mbs != '1'");

if($farray2['mac_id'] < 1){
sed_sql_query("INSERT INTO maclar_mbs SET spor_tipi='basketbol', mac_id = '".$id."', bayi_id = '".$ub['id']."', mbs = '".$mbs."'");
}else{
sed_sql_query("UPDATE maclar_mbs SET mbs = '".$mbs."' WHERE mac_id = '".$id."' AND bayi_id = '".$ub['id']."' AND spor_tipi='basketbol'");
}

}

## BASKETBOL ##

}

if($a=="durumdegis_bahisler") {

$id = gd("id");

$sportipi = gd("sportipi");

$durum = gd("durum");

if($sportipi=="futbol" && $durum == 1){
sed_sql_query("delete from maclar_durum where spor_tipi='futbol' and mac_id='".$id."' and bayi_id='".$ub['id']."'");
} else if($sportipi=="futbol" && $durum == 0){
sed_sql_query("INSERT INTO maclar_durum SET spor_tipi='futbol', mac_id = '".$id."', bayi_id = '".$ub['id']."', durum = '0'");
} else if($sportipi=="basketbol" && $durum == 1){
sed_sql_query("delete from maclar_durum where spor_tipi='basketbol' and mac_id='".$id."' and bayi_id='".$ub['id']."'");
} else if($sportipi=="basketbol" && $durum == 0){
sed_sql_query("INSERT INTO maclar_durum SET spor_tipi='basketbol', mac_id = '".$id."', bayi_id = '".$ub['id']."', durum = '0'");
}

}

if($a=="bahisler") {

$spor_tip = gd("spor_tip");
$lig = gd("lig");
$pageper = 50;

if($lig!='0'){
	$lig_ekle = "AND kupa_isim='".$lig."'";
} else {
	$lig_ekle = "";
}

$gelen_sayfa = (isset($_GET['sayfa']) && $_GET['sayfa'] !='' ) ? intval($_GET['sayfa']) : 1;

//Sayfada kaç kayıt görünecek
$limit = $pageper;

//Kaç sayfa öncesi ve sonrası görünecek
$s_s = 10;

/*------------------------------------
Alan Başlıklarını ve $sonuc['alan1'] 
kısımlarını kendinize göre değiştirin
-------------------------------------*/

if($spor_tip==1){
$s_sor = sed_sql_query("select count(id) from program_futbol where id!=''") or trigger_error(mysql_error(),E_USER_ERROR);
} else if($spor_tip==2){
$s_sor = sed_sql_query("select count(id) from program_basketbol where id!=''") or trigger_error(mysql_error(),E_USER_ERROR);
}

$satir = sed_sql_result($s_sor,0);

sed_sql_freeresult($s_sor);

if($satir >0){//sonuç varsa

$baslama = ($gelen_sayfa > 1) ? (($gelen_sayfa -1) * $limit) : 0 ;

$sayfa_kac = $satir/$limit;

$sayfa_sayisi = ($satir % $limit != 0) ? intval($sayfa_kac)+1 : intval($sayfa_kac);

$basla=( $satir >= $baslama ) ? $baslama : 0 ;

unset( $sayfa_kac, $baslama );

if($spor_tip==1){
$sor = sed_sql_query("select * from program_futbol where id!='' $lig_ekle limit $basla,$limit");
$sor2 = sed_sql_query("select * from program_futbol where id!='' group by ulkeadi");
$spor_tipi_secim = "program_futbol";
} else if($spor_tip==2){
$sor = sed_sql_query("select * from program_basketbol where id!='' $lig_ekle limit $basla,$limit");
$sor2 = sed_sql_query("select * from program_basketbol where id!=''  group by ulkeadi");
$spor_tipi_secim = "program_basketbol";
}

$i=1;

$style='';

if(sed_sql_numrows($sor)<1) { ?>

<table class="tablesorter">
<thead>
<tr>
<th colspan="6"><?=getTranslation('ajaxbahisler1')?></th>
</tr>
</thead>
<tbody>
<tr>
<td width="100"><?=getTranslation('ajaxbahisler2')?></td>
<td>
<select class="inputCombo" style="width:120px;" name="spid" onchange="bahisler($(this).val(),'0','1');">
<option value=""><?=getTranslation('ajaxbahisler3')?></option>
<option <?php if($spor_tip==1){ ?>selected="selected" <?php } ?> value="1"><?=getTranslation('ajaxbahisler4')?></option>
<option <?php if($spor_tip==2){ ?>selected="selected" <?php } ?> value="2"><?=getTranslation('ajaxbahisler5')?></option>
</select>
</td>
</tr>
</tbody>
</table>

<?php } else { ?>

<style>
span.sport-icon-big {
	width: 24px;
	display: inline-block;
	padding: 0px;
	height: 24px;
	vertical-align: text-top;
	background: url('/players/img/icon-sprite-sb.13.png') -18px -1px no-repeat;
}
.sport-icon-big.soccer { background-position: -18px -526px; }
.sport-icon-big.basketball {background-position: -18px -151px;}
</style>

<script>

function asdes(order,as) {

$("#order").val(order);	

$("#ascdesc").val(as);

$("#suanval").val(1);

bahisler(<?=$spor_tip;?>);

}

function mbsdegis(id,sportipi,mbs) {

var rand = Math.random();	

$.get('../ajax_players.php?a=mbsdegis&id='+id+'&sportipi='+sportipi+'&mbs='+mbs+'',function(data) { failcont("Onaylandı","Müsabakanın MBS : "+mbs+" Olarak Kaydedildi."); });

}

function durumdegis_bahisler(id,sportipi,durum) {

var rand = Math.random();

$.get('../ajax_players.php?a=durumdegis_bahisler&id='+id+'&sportipi='+sportipi+'&durum='+durum+'',function(data) { 

if(durum==1){
	$("#aktif_pasif_buton_"+id).html('<a style="font-weight: bold;color: #f00;" href="javascript:;" onclick="durumdegis_bahisler(\''+id+'\',\''+sportipi+'\',\'0\');">Pasif Et</a>');
	$("#aktif_pasif_resim_"+id).html('<img src="/players/img/bahisler/status_1.png" alt="Aktif" border="0">');
	failcont("Onaylandı","Müsabaka Aktif Edildi.");
} else if(durum==0){
	$("#aktif_pasif_buton_"+id).html('<a style="font-weight: bold;color: #0e8c06;" href="javascript:;" onclick="durumdegis_bahisler(\''+id+'\',\''+sportipi+'\',\'1\');">Aktif Et</a>');
	$("#aktif_pasif_resim_"+id).html('<img src="/players/img/bahisler/status_2.png" alt="Pasif" border="0">');
	failcont("Onaylandı","Müsabaka Pasif Edildi.");
}



});

}

</script>

<table class="tablesorter">
<thead>
<tr>
<th colspan="6"><?=getTranslation('ajaxbahisler1')?></th>
</tr>
</thead>
<tbody>
<tr>
<td width="100"><?=getTranslation('ajaxbahisler2')?></td>
<td>
<select class="inputCombo" style="width:120px;" name="spid" onchange="bahisler($(this).val(),'0','1');">
<option value=""><?=getTranslation('ajaxbahisler3')?></option>
<option <?php if($spor_tip==1){ ?>selected="selected" <?php } ?> value="1"><?=getTranslation('ajaxbahisler4')?></option>
<option <?php if($spor_tip==2){ ?>selected="selected" <?php } ?> value="2"><?=getTranslation('ajaxbahisler5')?></option>
</select>
</td>
<td width="100"><?=getTranslation('ajaxbahisler6')?></td>
<td>
<select class="inputCombo" style="width:300px;" name="lid" onchange="bahisler('<?=$spor_tip;?>',$(this).val());">
<option value="0"><?=getTranslation('ajaxbahisler7')?></option>
<?php 
while($rows2=sed_sql_fetcharray($sor2)) { 
$toplams = bilgi("SELECT COUNT(CASE WHEN id!='' THEN id END) as toplam_bulunan_mac FROM $spor_tipi_secim WHERE kupa_isim='".$rows2['kupa_isim']."'");
?>
<option <?php if($lig==$rows2['kupa_isim']){ ?>selected="selected" <?php } ?> value="<?=$rows2['kupa_isim'];?>"><?=$rows2['kupa_ulke'];?>-<?=$rows2['kupa_isim'];?> (<?=$toplams['toplam_bulunan_mac'];?>)</option>
<?php } ?>
</select>
</td>
</tr>
</tbody>
</table>

<table class="tablesorter">
<thead>
<tr>
<th width="45"><?=getTranslation('ajaxbahisler8')?></th>
<th width="45"><?=getTranslation('ajaxbahisler9')?></th>
<th colspan="2" width="40"></th>
<th width="40"><?=getTranslation('ajaxbahisler10')?></th>
<th><?=getTranslation('ajaxbahisler11')?></th>
<th width="90"><?=getTranslation('ajaxbahisler12')?></th>
<th colspan="3" width="100"></th>
</tr>
</thead>
<tbody>


<?php

while($row=sed_sql_fetcharray($sor)) {

if($spor_tip==1){
$bilgisi_getir = bilgi("select * from maclar_mbs where spor_tipi='futbol' and mac_id='".$row['id']."' and bayi_id='".$ub['id']."'");
$bilgisi_getir_durum = bilgi("select * from maclar_durum where spor_tipi='futbol' and mac_id='".$row['id']."' and bayi_id='".$ub['id']."'");
$spor_tipi_ver = "futbol";
} else if($spor_tip==2){
$bilgisi_getir = bilgi("select * from maclar_mbs where spor_tipi='basketbol' and mac_id='".$row['id']."' and bayi_id='".$ub['id']."'");
$bilgisi_getir_durum = bilgi("select * from maclar_durum where spor_tipi='basketbol' and mac_id='".$row['id']."' and bayi_id='".$ub['id']."'");
$spor_tipi_ver = "basketbol";
}

if($bilgisi_getir['id']>0) { $bilgisini_ver = $bilgisi_getir['mbs']; } else { $bilgisini_ver = $row['mbs']; }
if($bilgisi_getir_durum['id']>0) { $bilgisini_ver_durum = $bilgisi_getir_durum['durum']; } else { $bilgisini_ver_durum = 1; }
?>

<tr>
<td style="text-align: center;"><?=$row['mac_kodu'];?></td>
<td style="text-align: center;"><?=$row['iddaa_kodu'];?></td>
<td style="text-align: center;"><? if($spor_tip==1){ ?><span class="sport-icon-big soccer"></span><?php } else if($spor_tip==2){ ?><span class="sport-icon-big basketball"></span><?php } ?></td>
<td style="text-align: center;"><a class="tipS" title="<?=$row['kupa_ulke'];?> - <?=$row['kupa_isim'];?>"><img src="/players/img/bahisler/info.png" border="0"></a></td>
<td style="text-align: center;">
<select class="inputCombo" onchange="mbsdegis('<?=$row['id'];?>','<?=$spor_tipi_ver;?>',$(this).val());">
<option value="1" <?php if($bilgisini_ver==1){ ?>selected="selected" <?php } ?>>1</option>
<option value="2" <?php if($bilgisini_ver==2){ ?>selected="selected" <?php } ?>>2</option>
<option value="3" <?php if($bilgisini_ver==3){ ?>selected="selected" <?php } ?>>3</option>
<option value="4" <?php if($bilgisini_ver==4){ ?>selected="selected" <?php } ?>>4</option>
</select>
</td>
<td><?=$row['ev_takim'];?>-<?=$row['konuk_takim'];?></td>
<td style="text-align: center;"><?php echo date("d-m H:i",$row['mac_time']);?></td>

<td style="text-align: center;width:50px;" id="aktif_pasif_buton_<?=$row['id'];?>">
<?php if($bilgisini_ver_durum==1){ ?>
<a style="font-weight: bold;color: #f00;" href="javascript:;" onclick="durumdegis_bahisler('<?=$row['id'];?>','<?=$spor_tipi_ver;?>','0');"><?=getTranslation('ajaxspordallaripasifet')?></a>
<?php } else { ?>
<a style="font-weight: bold;color: #0e8c06;" href="javascript:;" onclick="durumdegis_bahisler('<?=$row['id'];?>','<?=$spor_tipi_ver;?>','1');"><?=getTranslation('ajaxspordallariaktifet')?></a>
<?php } ?>
</td>

<td style="text-align: center;" id="aktif_pasif_resim_<?=$row['id'];?>">
<?php if($bilgisini_ver_durum==1){ ?>
<img src="/players/img/bahisler/status_1.png" alt="Aktif" border="0">
<?php } else { ?>
<img src="/players/img/bahisler/status_2.png" alt="Pasif" border="0">
<?php } ?>
</td>
<td style="text-align: center;">
<a class="grid" href="bahisler_<?=$spor_tipi_ver;?>.php?spor_tip=<?=$spor_tipi_ver;?>&id=<?=$row['id'];?>" title="<?=getTranslation('ajaxbahisler23')?>">
<img src="/players/img/bahisler/refresh.png" alt="<?=getTranslation('ajaxbahisler23')?>" border="0">
</a>
</td>
</tr>

<?php } ?>

</tbody>
</table>

<?php $style = ($style=='') ? '2' : '';
$i++;

} ?>

<div class="sheet_body_sub on cf">
<div class="main_box pager cf">	
<div class="left" style="width: 100%">
<div class="div_center">

<?php 
		$hangi_sayfa= ($gelen_sayfa > 0)? $gelen_sayfa : 1 ;
		echo '<div class="inline" style="height: 38px;line-height: 24px;"><nav class="zipagin-light light-green">';	
	
	
			$alt= ($gelen_sayfa - $s_s);
			if($sayfa_sayisi <= $s_s || $gelen_sayfa <= $s_s ) {$alt=1;} 
			$ust= (($gelen_sayfa + $s_s)< $sayfa_sayisi ) ? ($gelen_sayfa + $s_s) : ($sayfa_sayisi);	
			echo ($gelen_sayfa > 1 )? '<a class="" href="javascript:;" onclick="bahisler('.$spor_tip.',0,1);" id="sayfaveri">'.getTranslation('ajaxtumkuponlarim30').'</a><a class="" href="javascript:;" id="sayfaveri" onclick="bahisler('.$spor_tip.',0,'.($gelen_sayfa -1).');">« '.getTranslation('ajaxtumkuponlarim31').'</a>':' ';
			for($i=$alt; $i<=$ust ;$i++){		
				echo ($i != $gelen_sayfa ) ? '<a class="" href="javascript:;" id="sayfaveri" onclick="bahisler('.$spor_tip.',0,'.$i.');">'.$i.'</a>' : '<span>'.$i.'</span>';
				}
			echo ($gelen_sayfa < $sayfa_sayisi)? '<a class="" href="javascript:;" id="sayfaveri" onclick="bahisler('.$spor_tip.',0,'.($gelen_sayfa +1).');">'.getTranslation('ajaxtumkuponlarim32').' »</a><a class="" href="javascript:;" id="sayfaveri" onclick="bahisler('.$spor_tip.',0,'.$sayfa_sayisi.');">'.getTranslation('ajaxtumkuponlarim33').'</a>' :'';
			echo '</nav></div>';
?>

<?php } else { ?>

<table class="tablesorter">
<thead>
<tr>
<th colspan="6"><?=getTranslation('ajaxbahisler1')?></th>
</tr>
</thead>
<tbody>
<tr>
<td width="100"><?=getTranslation('ajaxbahisler2')?></td>
<td>
<select class="inputCombo" style="width:120px;" name="spid" onchange="bahisler($(this).val(),'0','1');">
<option value=""><?=getTranslation('ajaxbahisler3')?></option>
<option <?php if($spor_tip==1){ ?>selected="selected" <?php } ?> value="1"><?=getTranslation('ajaxbahisler4')?></option>
<option <?php if($spor_tip==2){ ?>selected="selected" <?php } ?> value="2"><?=getTranslation('ajaxbahisler5')?></option>
</select>
</td>
</tr>
</tbody>
</table>

<div class="space_9 clear"></div>

<div class="space_9 clear"></div>

<div class="new_sheet cf panelHead" style="margin-top: 0px;height: 25px;line-height: 25px;text-align: center;background: #fff;border-bottom: 3px solid #ef8107;border-top: 3px solid #ef8107;">
<?=getTranslation('ajaxbahisler13')?>
</div>

<?php } ?>

</div>
</div>
</div>
<table class="tablesorter">
<tbody><tr>
<th><?=getTranslation('ajaxbahisler14')?></th>
</tr>
<tr>
<td></td>
</tr>
<tr>
<td>
<div class="notice info">
<ul class="list-unordered list-checked2">
<li><?=getTranslation('ajaxbahisler15')?></li>
<li><?=getTranslation('ajaxbahisler16')?></li>
<li><?=getTranslation('ajaxbahisler17')?></li>
<li><?=getTranslation('ajaxbahisler18')?></li>
<li><?=getTranslation('ajaxbahisler19')?></li>
<li><?=getTranslation('ajaxbahisler20')?></li>
<li><?=getTranslation('ajaxbahisler21')?></li>
<li><?=getTranslation('ajaxbahisler22')?></li>
</ul>
</div>
</td>
</tr>
</tbody>
</table>

<?php }

if($a=="oyunlari_degis_normal") {

$tip_isim = gd("tip_isim");

$oran_tip_id = gd("oran_tip_id");

$durum = gd("durum");

$spor_tipi = gd("spor_tipi");

if($spor_tipi=="futbol" && $durum == 1){
sed_sql_query("delete from oyunlar_normal where spor_tipi='futbol' and tip_isim='".$tip_isim."' and oran_tip_id='".$oran_tip_id."' and bayi_id='".$ub['id']."'");
} else if($spor_tipi=="futbol" && $durum == 0){
sed_sql_query("INSERT INTO oyunlar_normal SET spor_tipi='futbol', tip_isim = '".$tip_isim."', oran_tip_id = '".$oran_tip_id."', bayi_id = '".$ub['id']."', status = '1'");
} else if($spor_tipi=="basketbol" && $durum == 1){
sed_sql_query("delete from oyunlar_normal where spor_tipi='basketbol' and tip_isim='".$tip_isim."' and oran_tip_id='".$oran_tip_id."' and bayi_id='".$ub['id']."'");
} else if($spor_tipi=="basketbol" && $durum == 0){
sed_sql_query("INSERT INTO oyunlar_normal SET spor_tipi='basketbol', tip_isim = '".$tip_isim."', oran_tip_id = '".$oran_tip_id."', bayi_id = '".$ub['id']."', status = '1'");
} else if($spor_tipi=="tenis" && $durum == 1){
sed_sql_query("delete from oyunlar_normal where spor_tipi='tenis' and tip_isim='".$tip_isim."' and oran_tip_id='".$oran_tip_id."' and bayi_id='".$ub['id']."'");
} else if($spor_tipi=="tenis" && $durum == 0){
sed_sql_query("INSERT INTO oyunlar_normal SET spor_tipi='tenis', tip_isim = '".$tip_isim."', oran_tip_id = '".$oran_tip_id."', bayi_id = '".$ub['id']."', status = '1'");
} else if($spor_tipi=="voleybol" && $durum == 1){
sed_sql_query("delete from oyunlar_normal where spor_tipi='voleybol' and tip_isim='".$tip_isim."' and oran_tip_id='".$oran_tip_id."' and bayi_id='".$ub['id']."'");
} else if($spor_tipi=="voleybol" && $durum == 0){
sed_sql_query("INSERT INTO oyunlar_normal SET spor_tipi='voleybol', tip_isim = '".$tip_isim."', oran_tip_id = '".$oran_tip_id."', bayi_id = '".$ub['id']."', status = '1'");
} else if($spor_tipi=="buzhokeyi" && $durum == 1){
sed_sql_query("delete from oyunlar_normal where spor_tipi='buzhokeyi' and tip_isim='".$tip_isim."' and oran_tip_id='".$oran_tip_id."' and bayi_id='".$ub['id']."'");
} else if($spor_tipi=="buzhokeyi" && $durum == 0){
sed_sql_query("INSERT INTO oyunlar_normal SET spor_tipi='buzhokeyi', tip_isim = '".$tip_isim."', oran_tip_id = '".$oran_tip_id."', bayi_id = '".$ub['id']."', status = '1'");
} else if($spor_tipi=="hentbol" && $durum == 1){
sed_sql_query("delete from oyunlar_normal where spor_tipi='hentbol' and tip_isim='".$tip_isim."' and oran_tip_id='".$oran_tip_id."' and bayi_id='".$ub['id']."'");
} else if($spor_tipi=="hentbol" && $durum == 0){
sed_sql_query("INSERT INTO oyunlar_normal SET spor_tipi='hentbol', tip_isim = '".$tip_isim."', oran_tip_id = '".$oran_tip_id."', bayi_id = '".$ub['id']."', status = '1'");
}

}

if($a=="oyunlari_degis_canli") {

$tip_isim = gd("tip_isim");

$durum = gd("durum");

$spor_tipi = gd("spor_tipi");

if($spor_tipi=="futbol" && $durum == 1){
sed_sql_query("delete from oyunlar_canli where spor_tipi='futbol' and tip_isim='".$tip_isim."' and bayi_id='".$ub['id']."'");
} else if($spor_tipi=="futbol" && $durum == 0){
sed_sql_query("INSERT INTO oyunlar_canli SET spor_tipi='futbol', tip_isim = '".$tip_isim."', bayi_id = '".$ub['id']."', status = '1'");
} else if($spor_tipi=="basketbol" && $durum == 1){
sed_sql_query("delete from oyunlar_canli where spor_tipi='basketbol' and tip_isim='".$tip_isim."' and bayi_id='".$ub['id']."'");
} else if($spor_tipi=="basketbol" && $durum == 0){
sed_sql_query("INSERT INTO oyunlar_canli SET spor_tipi='basketbol', tip_isim = '".$tip_isim."', bayi_id = '".$ub['id']."', status = '1'");
} else if($spor_tipi=="tenis" && $durum == 1){
sed_sql_query("delete from oyunlar_canli where spor_tipi='tenis' and tip_isim='".$tip_isim."' and bayi_id='".$ub['id']."'");
} else if($spor_tipi=="tenis" && $durum == 0){
sed_sql_query("INSERT INTO oyunlar_canli SET spor_tipi='tenis', tip_isim = '".$tip_isim."', bayi_id = '".$ub['id']."', status = '1'");
} else if($spor_tipi=="voleybol" && $durum == 1){
sed_sql_query("delete from oyunlar_canli where spor_tipi='voleybol' and tip_isim='".$tip_isim."' and bayi_id='".$ub['id']."'");
} else if($spor_tipi=="voleybol" && $durum == 0){
sed_sql_query("INSERT INTO oyunlar_canli SET spor_tipi='voleybol', tip_isim = '".$tip_isim."', bayi_id = '".$ub['id']."', status = '1'");
} else if($spor_tipi=="buzhokeyi" && $durum == 1){
sed_sql_query("delete from oyunlar_canli where spor_tipi='buzhokeyi' and tip_isim='".$tip_isim."' and bayi_id='".$ub['id']."'");
} else if($spor_tipi=="buzhokeyi" && $durum == 0){
sed_sql_query("INSERT INTO oyunlar_canli SET spor_tipi='buzhokeyi', tip_isim = '".$tip_isim."', bayi_id = '".$ub['id']."', status = '1'");
} else if($spor_tipi=="hentbol" && $durum == 1){
sed_sql_query("delete from oyunlar_canli where spor_tipi='hentbol' and tip_isim='".$tip_isim."' and bayi_id='".$ub['id']."'");
} else if($spor_tipi=="hentbol" && $durum == 0){
sed_sql_query("INSERT INTO oyunlar_canli SET spor_tipi='hentbol', tip_isim = '".$tip_isim."', bayi_id = '".$ub['id']."', status = '1'");
}

}

if($a=="oyun_turleri_canli") {

$oyuntip = gd("tip");

if($oyuntip==1){

$orderle = "FIELD(varoname, '1X2', 'Handikap 1:0', 'Handikap 2:0', 'Handikap 0:1', 'Handikap 0:2', 'Çifte Şans', '1.Yarı Çifte Şans', '1.Yarı Sonucu', '1.Yarı 0.5 Gol Alt Üst', '1.Yarı 1.5 Gol Alt Üst', '1.Yarı 2.5 Gol Alt Üst', 'Toplam 0.5 Gol Alt Üst', 'Toplam 1.5 Gol Alt Üst', 'Toplam 2.5 Gol Alt Üst', 'Toplam 3.5 Gol Alt Üst', 'Toplam 4.5 Gol Alt Üst', 'Toplam 5.5 Gol Alt Üst', '2.Yarı 0.5 Gol Alt Üst', '2.Yarı 1.5 Gol Alt Üst', '2.Yarı 2.5 Gol Alt Üst', '2.Yarı 3.5 Gol Alt Üst', '1.Yarı Karşılıklı Gol', 'Karşılıklı Gol Olurmu ?', 'Ev Sahibi Müsabakada Gol Atarmı ?', 'Deplasman Müsabakada Gol Atarmı ?', 'Toplam Gol Tek / Çift', '1.Yarı Tek / Çift', 'Ev Sahibi 0.5 Gol Alt Üst', 'Ev Sahibi 1.5 Gol Alt Üst', 'Ev Sahibi 2.5 Gol Alt Üst', 'Deplasman 0.5 Gol Alt Üst', 'Deplasman 1.5 Gol Alt Üst', 'Deplasman 2.5 Gol Alt Üst', 'İlk yarıda 1.golü hangi takım atar?', '1. yarıda 1.golü hangi takım atar?', '1.golü hangi takım atar?', '2.golü hangi takım atar?', '3.golü hangi takım atar?', '4.golü hangi takım atar?', '5.golü hangi takım atar?', '6.golü hangi takım atar?', 'Toplam Kaç Gol Atılır ?', 'Ev Sahibi Toplam Kaç Gol Atar ?', 'Deplasman Toplam Kaç Gol Atar ?', 'Ev Sahibi 1.Yarı 0.5 Gol Alt Üst', 'Ev Sahibi 1.Yarı 1.5 Gol Alt Üst', 'Ev Sahibi 1.Yarı 2.5 Gol Alt Üst', 'Deplasman 1.Yarı 0.5 Gol Alt Üst', 'Deplasman 1.Yarı 1.5 Gol Alt Üst', 'Deplasman 1.Yarı 2.5 Gol Alt Üst', 'Maç Sonucu ve Karşılıklı Gol', 'İlk Yarıda Kaç Gol Olur ?', 'Ev Sahibi İlk Yarı Tam Gol Sayısı', 'Ev sahibi İkinci Yarı Tam Gol Sayısı', 'Deplasman İlk Yarı Tam Gol Sayısı', 'Deplasman İkinci Yarı Tam Gol Sayısı', '2.Yarıda Toplam Kaç Gol Olur ?', 'Herhangi Bir Takım 1 Gol Farkla Kazanirmi ?', 'Herhangi Bir Takım 2 Gol Farkla Kazanirmi ?', 'Herhangi Bir Takım 3 Gol Farkla Kazanirmi ?', '2.Yarı Sonucu', 'Müsabakada kaç gol atılır? (0-4+)', 'Müsabakada kaç gol atılır? (0-5+)', 'Müsabakada kaç gol atılır? (0-6+)', '1.Yarı Skoru', 'Maç Skoru', 'Toplam Sarı Kart 1.5 Alt/Üst', 'Toplam Sarı Kart 2.5 Alt/Üst', 'Toplam Sarı Kart 3.5 Alt/Üst', 'Toplam Sarı Kart 4.5 Alt/Üst', 'Kirmizi kart cikar mi?', 'Kaç Penaltı Olur ?', '1.Takım Toplam Sarı Kart 1.5 Alt/Üst', '1.Takım Toplam Sarı Kart 2.5 Alt/Üst', '1.Takım Toplam Sarı Kart 3.5 Alt/Üst', '2.Takım Toplam Sarı Kart 1.5 Alt/Üst', '2.Takım Toplam Sarı Kart 2.5 Alt/Üst', '2.Takım Toplam Sarı Kart 3.5 Alt/Üst', 'Sarı Kart Tek/Çift', 'Hangi Takım Çok Sarı Kart Yer ?', 'Toplam Korner 5.5 Alt/Üst', 'Toplam Korner 6.5 Alt/Üst', 'Toplam Korner 7.5 Alt/Üst', 'Toplam Korner 8.5 Alt/Üst', 'Toplam Korner 9.5 Alt/Üst', 'Toplam Korner 10.5 Alt/Üst', 'Toplam Korner 11.5 Alt/Üst', 'Toplam Korner 12.5 Alt/Üst', 'Toplam Korner 13.5 Alt/Üst', 'Toplam Korner 14.5 Alt/Üst', 'Toplam Korner 15.5 Alt/Üst', '1.Takım Toplam Korner 2.5 Alt/Üst', '1.Takım Toplam Korner 3.5 Alt/Üst', '1.Takım Toplam Korner 4.5 Alt/Üst', '1.Takım Toplam Korner 5.5 Alt/Üst', '1.Takım Toplam Korner 6.5 Alt/Üst', '1.Takım Toplam Korner 7.5 Alt/Üst', '1.Takım Toplam Korner 8.5 Alt/Üst', '1.Takım Toplam Korner 9.5 Alt/Üst', '1.Takım Toplam Korner 10.5 Alt/Üst', '2.Takım Toplam Korner 2.5 Alt/Üst', '2.Takım Toplam Korner 3.5 Alt/Üst', '2.Takım Toplam Korner 4.5 Alt/Üst', '2.Takım Toplam Korner 5.5 Alt/Üst', '2.Takım Toplam Korner 6.5 Alt/Üst', '2.Takım Toplam Korner 7.5 Alt/Üst', '2.Takım Toplam Korner 8.5 Alt/Üst', '2.Takım Toplam Korner 9.5 Alt/Üst', '2.Takım Toplam Korner 10.5 Alt/Üst', 'Korner Tek/Çift', 'Hangi Takım Daha Çok Korner Kullanır ?') ASC";

$sor = sed_sql_query("select * from canli_tip where id!='' group by varoname ORDER BY {$orderle}");

} else if($oyuntip==2){

$orderle = "FIELD(varoname, '1X2', '1X2(1.YARI)', '1X2(2.YARI)', 'Kim Kazanır', '1.Çeyrek Kim Kazanır', '2.Çeyrek Kim Kazanır', '3.Çeyrek Kim Kazanır', '4.Çeyrek Kim Kazanır', 'Toplam Skor Alt/Üst', '1.Çeyrek Toplam Alt/Üst', '2.Çeyrek Toplam Alt/Üst', '3.Çeyrek Toplam Alt/Üst', '4.Çeyrek Toplam Alt/Üst', '1.Çeyrek Handikap', '2.Çeyrek Handikap', '3.Çeyrek Handikap', '4.Çeyrek Handikap', 'Toplam Tek/Çift', '1.Çeyrek Toplam Tek/Çift', '2.Çeyrek Toplam Tek/Çift', '3.Çeyrek Toplam Tek/Çift', '4.Çeyrek Toplam Tek/Çift') ASC";

$sor = sed_sql_query("select * from basketbol_canli_tip where id!='' group by varoname");

} else if($oyuntip==3){

$orderle = "FIELD(varoname, 'Kim Kazanır', 'Set Bahisi') ASC";

$sor = sed_sql_query("select * from canli_tip_tenis where id!='' group by varoname ORDER BY {$orderle}");

} else if($oyuntip==4){

$orderle = "FIELD(varoname, 'Kim Kazanır', '1.Seti Kim Kazanır ?', '2.Seti Kim Kazanır ?', '3.Seti Kim Kazanır ?', '4.Seti Kim Kazanır ?', 'Toplam Kaç Set Oynanır ?', 'Müsabaka 5.Set Sürermi', 'Set bahisi (5 maç üzerinden)', 'Toplam Sayı Tek/Çift', '1.Set Toplam Sayı Tek/Çift', '2.Set Toplam Sayı Tek/Çift', '3.Set Toplam Sayı Tek/Çift', '4.Set Toplam Sayı Tek/Çift', 'Toplam Sayı Alt/Üst', '1.Takım Toplam Sayı Alt/Üst', '2.Takım Toplam Sayı Alt/Üst', '1.Takım 1.Set Toplam Sayı Alt/Üst', '2.Takım 1.Set Toplam Sayı Alt/Üst', '1.Takım 2.Set Toplam Sayı Alt/Üst', '2.Takım 2.Set Toplam Sayı Alt/Üst', '1.Takım 3.Set Toplam Sayı Alt/Üst', '2.Takım 3.Set Toplam Sayı Alt/Üst', '1.Takım 4.Set Toplam Sayı Alt/Üst', '2.Takım 4.Set Toplam Sayı Alt/Üst') ASC";

$sor = sed_sql_query("select * from canli_tip_voleybol where id!='' group by varoname ORDER BY {$orderle}");

} else if($oyuntip==5){

$orderle = "FIELD(varoname, '1X2', 'Cifte Sans', 'Hangi periyod daha cok gol olur?') ASC";

$sor = sed_sql_query("select * from canli_tip_buzhokeyi where id!='' group by varoname ORDER BY {$orderle}");

} else if($oyuntip==6){

$sor = sed_sql_query("select * from canli_tip_hentbol where id!='' group by varoname");

} else {

$orderle = "FIELD(varoname, '1X2', 'Handikap 1:0', 'Handikap 2:0', 'Handikap 0:1', 'Handikap 0:2', 'Çifte Şans', '1.Yarı Çifte Şans', '1.Yarı Sonucu', '1.Yarı 0.5 Gol Alt Üst', '1.Yarı 1.5 Gol Alt Üst', '1.Yarı 2.5 Gol Alt Üst', 'Toplam 0.5 Gol Alt Üst', 'Toplam 1.5 Gol Alt Üst', 'Toplam 2.5 Gol Alt Üst', 'Toplam 3.5 Gol Alt Üst', 'Toplam 4.5 Gol Alt Üst', 'Toplam 5.5 Gol Alt Üst', '2.Yarı 0.5 Gol Alt Üst', '2.Yarı 1.5 Gol Alt Üst', '2.Yarı 2.5 Gol Alt Üst', '2.Yarı 3.5 Gol Alt Üst', '1.Yarı Karşılıklı Gol', 'Karşılıklı Gol Olurmu ?', 'Ev Sahibi Müsabakada Gol Atarmı ?', 'Deplasman Müsabakada Gol Atarmı ?', 'Toplam Gol Tek / Çift', '1.Yarı Tek / Çift', 'Ev Sahibi 0.5 Gol Alt Üst', 'Ev Sahibi 1.5 Gol Alt Üst', 'Ev Sahibi 2.5 Gol Alt Üst', 'Deplasman 0.5 Gol Alt Üst', 'Deplasman 1.5 Gol Alt Üst', 'Deplasman 2.5 Gol Alt Üst', 'İlk yarıda 1.golü hangi takım atar?', '1. yarıda 1.golü hangi takım atar?', '1.golü hangi takım atar?', '2.golü hangi takım atar?', '3.golü hangi takım atar?', '4.golü hangi takım atar?', '5.golü hangi takım atar?', '6.golü hangi takım atar?', 'Toplam Kaç Gol Atılır ?', 'Ev Sahibi Toplam Kaç Gol Atar ?', 'Deplasman Toplam Kaç Gol Atar ?', 'Ev Sahibi 1.Yarı 0.5 Gol Alt Üst', 'Ev Sahibi 1.Yarı 1.5 Gol Alt Üst', 'Ev Sahibi 1.Yarı 2.5 Gol Alt Üst', 'Deplasman 1.Yarı 0.5 Gol Alt Üst', 'Deplasman 1.Yarı 1.5 Gol Alt Üst', 'Deplasman 1.Yarı 2.5 Gol Alt Üst', 'Maç Sonucu ve Karşılıklı Gol', 'İlk Yarıda Kaç Gol Olur ?', 'Ev Sahibi İlk Yarı Tam Gol Sayısı', 'Ev sahibi İkinci Yarı Tam Gol Sayısı', 'Deplasman İlk Yarı Tam Gol Sayısı', 'Deplasman İkinci Yarı Tam Gol Sayısı', '2.Yarıda Toplam Kaç Gol Olur ?', 'Herhangi Bir Takım 1 Gol Farkla Kazanirmi ?', 'Herhangi Bir Takım 2 Gol Farkla Kazanirmi ?', 'Herhangi Bir Takım 3 Gol Farkla Kazanirmi ?', '2.Yarı Sonucu', 'Müsabakada kaç gol atılır? (0-4+)', 'Müsabakada kaç gol atılır? (0-5+)', 'Müsabakada kaç gol atılır? (0-6+)', '1.Yarı Skoru', 'Maç Skoru') ASC";

$sor = sed_sql_query("select * from canli_tip where id!='' group by varoname ORDER BY {$orderle}");

}

if(sed_sql_numrows($sor)<1) { ?>

<table class="tablesorter">
<thead>
<tr>
<th colspan="3"><?=getTranslation('ajaxoyunturleri_canli4')?></th>
</tr>
<tr>
<th><?=getTranslation('ajaxoyunturleri_canli5')?></th>
<th width="45"><?=getTranslation('ajaxoyunturleri_canli6')?></th>
<th width="45"><?=getTranslation('ajaxoyunturleri_canli7')?></th>
</tr>
</thead>
<tbody>

<?php } else { ?>

<script>
function asdes(order,as) {
$("#order").val(order);	
$("#ascdesc").val(as);
$("#suanval").val(1);
oyunturleri_canli(1);
}
function oyunlari_degis_canli(tip_isim,durum,spor_tipi) {
var rand = Math.random();	
$.get('../ajax_players.php?a=oyunlari_degis_canli&tip_isim='+tip_isim+'&durum='+durum+'&spor_tipi='+spor_tipi+'',function(data) { oyunturleri_canli(<?=$oyuntip;?>); });
}
</script>

<table class="tablesorter">
<thead>
<tr>
<th colspan="3"><?=getTranslation('ajaxoyunturleri_canli4')?></th>
</tr>
<tr>
<th><?=getTranslation('ajaxoyunturleri_canli5')?></th>
<th width="45"><?=getTranslation('ajaxoyunturleri_canli6')?></th>
<th width="45"><?=getTranslation('ajaxoyunturleri_canli7')?></th>
</tr>
</thead>
<tbody>

<?php

while($row=sed_sql_fetcharray($sor)) {

if($oyuntip==1){

if($row['varoname']=="Müsabakada kaç gol atılır? (0-4+)"){
	$oran_ismi_ver = "Müsabakada kaç gol atılır? (0-4 )";
} else if($row['varoname']=="Müsabakada kaç gol atılır? (0-5+)"){
	$oran_ismi_ver = "Müsabakada kaç gol atılır? (0-5 )";
} else if($row['varoname']=="Müsabakada kaç gol atılır? (0-6+)"){
	$oran_ismi_ver = "Müsabakada kaç gol atılır? (0-6 )";
} else {
	$oran_ismi_ver = $row['varoname'];
}

$bilgisi_getir = bilgi("select * from oyunlar_canli where spor_tipi='futbol' and tip_isim='".$oran_ismi_ver."' and bayi_id='".$ub['id']."'");

$spor_tipi_ver = "futbol";

} else if($oyuntip==2){

$bilgisi_getir = bilgi("select * from oyunlar_canli where spor_tipi='basketbol' and tip_isim='".$row['varoname']."' and bayi_id='".$ub['id']."'");

$spor_tipi_ver = "basketbol";

} else if($oyuntip==3){

$bilgisi_getir = bilgi("select * from oyunlar_canli where spor_tipi='tenis' and tip_isim='".$row['varoname']."' and bayi_id='".$ub['id']."'");

$spor_tipi_ver = "tenis";

} else if($oyuntip==4){

$bilgisi_getir = bilgi("select * from oyunlar_canli where spor_tipi='voleybol' and tip_isim='".$row['varoname']."' and bayi_id='".$ub['id']."'");

$spor_tipi_ver = "voleybol";

} else if($oyuntip==5){

$bilgisi_getir = bilgi("select * from oyunlar_canli where spor_tipi='buzhokeyi' and tip_isim='".$row['varoname']."' and bayi_id='".$ub['id']."'");

$spor_tipi_ver = "buzhokeyi";

} else if($oyuntip==6){

$bilgisi_getir = bilgi("select * from oyunlar_canli where spor_tipi='hentbol' and tip_isim='".$row['varoname']."' and bayi_id='".$ub['id']."'");

$spor_tipi_ver = "hentbol";

} else {

if($row['varoname']=="Müsabakada kaç gol atılır? (0-4+)"){
	$oran_ismi_ver = "Müsabakada kaç gol atılır? (0-4 )";
} else if($row['varoname']=="Müsabakada kaç gol atılır? (0-5+)"){
	$oran_ismi_ver = "Müsabakada kaç gol atılır? (0-5 )";
} else if($row['varoname']=="Müsabakada kaç gol atılır? (0-6+)"){
	$oran_ismi_ver = "Müsabakada kaç gol atılır? (0-6 )";
} else {
	$oran_ismi_ver = $row['varoname'];
}

$bilgisi_getir = bilgi("select * from oyunlar_canli where spor_tipi='futbol' and tip_isim='".$oran_ismi_ver."' and bayi_id='".$ub['id']."'");

$spor_tipi_ver = "futbol";

}

if($bilgisi_getir['status']=="1") { $bilgisini_ver = 0; } else { $bilgisini_ver = 1; }

?>


<tr class="c">

<td class="l">

<?php if($oyuntip==1){ ?>

<?php if($row['varoname']=="1X2"){ ?>
<?=getTranslation('fcanlioran1')?>
<?php } else if($row['varoname']=="Handikap 1:0"){ ?>
<?=getTranslation('fcanlioran2')?>
<?php } else if($row['varoname']=="Handikap 2:0"){ ?>
<?=getTranslation('fcanlioran3')?>
<?php } else if($row['varoname']=="Handikap 0:1"){ ?>
<?=getTranslation('fcanlioran4')?>
<?php } else if($row['varoname']=="Handikap 0:2"){ ?>
<?=getTranslation('fcanlioran5')?>
<?php } else if($row['varoname']=="Çifte Şans"){ ?>
<?=getTranslation('fcanlioran6')?>
<?php } else if($row['varoname']=="1.Yarı Çifte Şans"){ ?>
<?=getTranslation('fcanlioran7')?>
<?php } else if($row['varoname']=="1.Yarı 0.5 Gol Alt Üst"){ ?>
<?=getTranslation('fcanlioran8')?>
<?php } else if($row['varoname']=="1.Yarı 1.5 Gol Alt Üst"){ ?>
<?=getTranslation('fcanlioran9')?>
<?php } else if($row['varoname']=="1.Yarı 2.5 Gol Alt Üst"){ ?>
<?=getTranslation('fcanlioran10')?>
<?php } else if($row['varoname']=="Toplam 0.5 Gol Alt Üst"){ ?>
<?=getTranslation('fcanlioran11')?>
<?php } else if($row['varoname']=="Toplam 1.5 Gol Alt Üst"){ ?>
<?=getTranslation('fcanlioran12')?>
<?php } else if($row['varoname']=="Toplam 2.5 Gol Alt Üst"){ ?>
<?=getTranslation('fcanlioran13')?>
<?php } else if($row['varoname']=="Toplam 3.5 Gol Alt Üst"){ ?>
<?=getTranslation('fcanlioran14')?>
<?php } else if($row['varoname']=="Toplam 4.5 Gol Alt Üst"){ ?>
<?=getTranslation('fcanlioran15')?>
<?php } else if($row['varoname']=="Toplam 5.5 Gol Alt Üst"){ ?>
<?=getTranslation('fcanlioran16')?>
<?php } else if($row['varoname']=="2.Yarı 0.5 Gol Alt Üst"){ ?>
<?=getTranslation('fcanlioran17')?>
<?php } else if($row['varoname']=="2.Yarı 1.5 Gol Alt Üst"){ ?>
<?=getTranslation('fcanlioran18')?>
<?php } else if($row['varoname']=="2.Yarı 2.5 Gol Alt Üst"){ ?>
<?=getTranslation('fcanlioran19')?>
<?php } else if($row['varoname']=="2.Yarı 3.5 Gol Alt Üst"){ ?>
<?=getTranslation('fcanlioran20')?>
<?php } else if($row['varoname']=="Karşılıklı Gol Olurmu ?"){ ?>
<?=getTranslation('fcanlioran21')?>
<?php } else if($row['varoname']=="Ev Sahibi Müsabakada Gol Atarmı ?"){ ?>
<?=getTranslation('fcanlioran22')?>
<?php } else if($row['varoname']=="Deplasman Müsabakada Gol Atarmı ?"){ ?>
<?=getTranslation('fcanlioran23')?>
<?php } else if($row['varoname']=="Toplam Gol Tek / Çift"){ ?>
<?=getTranslation('fcanlioran24')?>
<?php } else if($row['varoname']=="1.Yarı Tek / Çift"){ ?>
<?=getTranslation('fcanlioran25')?>
<?php } else if($row['varoname']=="1.Yarı Karşılıklı Gol"){ ?>
<?=getTranslation('fcanlioran26')?>
<?php } else if($row['varoname']=="Maç Sonucu ve Karşılıklı Gol"){ ?>
<?=getTranslation('fcanlioran27')?>
<?php } else if($row['varoname']=="Ev Sahibi 0.5 Gol Alt Üst"){ ?>
<?=getTranslation('fcanlioran28')?>
<?php } else if($row['varoname']=="Ev Sahibi 1.5 Gol Alt Üst"){ ?>
<?=getTranslation('fcanlioran29')?>
<?php } else if($row['varoname']=="Ev Sahibi 2.5 Gol Alt Üst"){ ?>
<?=getTranslation('fcanlioran30')?>
<?php } else if($row['varoname']=="Deplasman 0.5 Gol Alt Üst"){ ?>
<?=getTranslation('fcanlioran31')?>
<?php } else if($row['varoname']=="Deplasman 1.5 Gol Alt Üst"){ ?>
<?=getTranslation('fcanlioran32')?>
<?php } else if($row['varoname']=="Deplasman 2.5 Gol Alt Üst"){ ?>
<?=getTranslation('fcanlioran33')?>
<?php } else if($row['varoname']=="Toplam Kaç Gol Atılır ?"){ ?>
<?=getTranslation('fcanlioran34')?>
<?php } else if($row['varoname']=="Ev Sahibi Toplam Kaç Gol Atar ?"){ ?>
<?=getTranslation('fcanlioran35')?>
<?php } else if($row['varoname']=="Deplasman Toplam Kaç Gol Atar ?"){ ?>
<?=getTranslation('fcanlioran36')?>
<?php } else if($row['varoname']=="1.Yarı Skoru"){ ?>
<?=getTranslation('fcanlioran37')?>
<?php } else if($row['varoname']=="Maç Skoru"){ ?>
<?=getTranslation('fcanlioran38')?>
<?php } else if($row['varoname']=="Ev Sahibi 1.Yarı 0.5 Gol Alt Üst"){ ?>
<?=getTranslation('fcanlioran39')?>
<?php } else if($row['varoname']=="Ev Sahibi 1.Yarı 1.5 Gol Alt Üst"){ ?>
<?=getTranslation('fcanlioran40')?>
<?php } else if($row['varoname']=="Ev Sahibi 1.Yarı 2.5 Gol Alt Üst"){ ?>
<?=getTranslation('fcanlioran41')?>
<?php } else if($row['varoname']=="Deplasman 1.Yarı 0.5 Gol Alt Üst"){ ?>
<?=getTranslation('fcanlioran42')?>
<?php } else if($row['varoname']=="Deplasman 1.Yarı 1.5 Gol Alt Üst"){ ?>
<?=getTranslation('fcanlioran43')?>
<?php } else if($row['varoname']=="Deplasman 1.Yarı 2.5 Gol Alt Üst"){ ?>
<?=getTranslation('fcanlioran44')?>
<?php } else if($row['varoname']=="Ev Sahibi İlk Yarı Tam Gol Sayısı"){ ?>
<?=getTranslation('fcanlioran45')?>
<?php } else if($row['varoname']=="Ev sahibi İkinci Yarı Tam Gol Sayısı"){ ?>
<?=getTranslation('fcanlioran46')?>
<?php } else if($row['varoname']=="Deplasman İlk Yarı Tam Gol Sayısı"){ ?>
<?=getTranslation('fcanlioran47')?>
<?php } else if($row['varoname']=="Deplasman İkinci Yarı Tam Gol Sayısı"){ ?>
<?=getTranslation('fcanlioran48')?>
<?php } else if($row['varoname']=="Herhangi Bir Takım 1 Gol Farkla Kazanirmi ?"){ ?>
<?=getTranslation('fcanlioran49')?>
<?php } else if($row['varoname']=="Herhangi Bir Takım 2 Gol Farkla Kazanirmi ?"){ ?>
<?=getTranslation('fcanlioran50')?>
<?php } else if($row['varoname']=="Herhangi Bir Takım 3 Gol Farkla Kazanirmi ?"){ ?>
<?=getTranslation('fcanlioran51')?>
<?php } else if($row['varoname']=="1.Yarı Sonucu"){ ?>
<?=getTranslation('fcanlioran52')?>
<?php } else if($row['varoname']=="2.Yarı Sonucu"){ ?>
<?=getTranslation('fcanlioran53')?>
<?php } else if($row['varoname']=="İlk Yarıda Kaç Gol Olur ?"){ ?>
<?=getTranslation('fcanlioran54')?>
<?php } else if($row['varoname']=="2.Yarıda Toplam Kaç Gol Olur ?"){ ?>
<?=getTranslation('fcanlioran55')?>
<?php } else if($row['varoname']=="Müsabakada kaç gol atılır? (0-4+)"){ ?>
<?=getTranslation('fcanlioran56')?>
<?php } else if($row['varoname']=="Müsabakada kaç gol atılır? (0-5+)"){ ?>
<?=getTranslation('fcanlioran57')?>
<?php } else if($row['varoname']=="Müsabakada kaç gol atılır? (0-6+)"){ ?>
<?=getTranslation('fcanlioran58')?>
<?php } else if($row['varoname']=="1. yarıda 1.golü hangi takım atar?"){ ?>
<?=getTranslation('fcanlioran59')?>
<?php } else if($row['varoname']=="1.golü hangi takım atar?"){ ?>
<?=getTranslation('fcanlioran60')?>
<?php } else if($row['varoname']=="2.golü hangi takım atar?"){ ?>
<?=getTranslation('fcanlioran61')?>
<?php } else if($row['varoname']=="3.golü hangi takım atar?"){ ?>
<?=getTranslation('fcanlioran62')?>
<?php } else if($row['varoname']=="4.golü hangi takım atar?"){ ?>
<?=getTranslation('fcanlioran63')?>
<?php } else if($row['varoname']=="5.golü hangi takım atar?"){ ?>
<?=getTranslation('fcanlioran64')?>
<?php } else if($row['varoname']=="6.golü hangi takım atar?"){ ?>
<?=getTranslation('fcanlioran65')?>
<?php } else { ?>
<?=$row['varoname'];?>
<?php } ?>

<?php } else if($oyuntip==2){ ?>

<?php if($row['varoname']=="1X2"){ ?>
<?=getTranslation('bcanlioran1')?>
<?php } else if($row['varoname']=="1X2(1.YARI)"){ ?>
<?=getTranslation('bcanlioran2')?>
<?php } else if($row['varoname']=="1X2(2.YARI)"){ ?>
<?=getTranslation('bcanlioran3')?>
<?php } else if($row['varoname']=="Kim Kazanır"){ ?>
<?=getTranslation('bcanlioran4')?>
<?php } else if($row['varoname']=="1.Çeyrek Kim Kazanır"){ ?>
<?=getTranslation('bcanlioran5')?>
<?php } else if($row['varoname']=="2.Çeyrek Kim Kazanır"){ ?>
<?=getTranslation('bcanlioran6')?>
<?php } else if($row['varoname']=="3.Çeyrek Kim Kazanır"){ ?>
<?=getTranslation('bcanlioran7')?>
<?php } else if($row['varoname']=="4.Çeyrek Kim Kazanır"){ ?>
<?=getTranslation('bcanlioran8')?>
<?php } else if($row['varoname']=="Toplam Skor Alt/Üst"){ ?>
<?=getTranslation('bcanlioran9')?>
<?php } else if($row['varoname']=="1.Çeyrek Toplam Alt/Üst"){ ?>
<?=getTranslation('bcanlioran10')?>
<?php } else if($row['varoname']=="2.Çeyrek Toplam Alt/Üst"){ ?>
<?=getTranslation('bcanlioran11')?>
<?php } else if($row['varoname']=="3.Çeyrek Toplam Alt/Üst"){ ?>
<?=getTranslation('bcanlioran12')?>
<?php } else if($row['varoname']=="4.Çeyrek Toplam Alt/Üst"){ ?>
<?=getTranslation('bcanlioran13')?>
<?php } else if($row['varoname']=="1.Çeyrek Handikap"){ ?>
<?=getTranslation('bcanlioran14')?>
<?php } else if($row['varoname']=="2.Çeyrek Handikap"){ ?>
<?=getTranslation('bcanlioran15')?>
<?php } else if($row['varoname']=="3.Çeyrek Handikap"){ ?>
<?=getTranslation('bcanlioran16')?>
<?php } else if($row['varoname']=="4.Çeyrek Handikap"){ ?>
<?=getTranslation('bcanlioran17')?>
<?php } else if($row['varoname']=="1.Çeyrek Toplam Tek/Çift"){ ?>
<?=getTranslation('bcanlioran18')?>
<?php } else if($row['varoname']=="2.Çeyrek Toplam Tek/Çift"){ ?>
<?=getTranslation('bcanlioran19')?>
<?php } else if($row['varoname']=="3.Çeyrek Toplam Tek/Çift"){ ?>
<?=getTranslation('bcanlioran20')?>
<?php } else if($row['varoname']=="4.Çeyrek Toplam Tek/Çift"){ ?>
<?=getTranslation('bcanlioran21')?>
<?php } else if($row['varoname']=="Toplam Tek/Çift"){ ?>
<?=getTranslation('bcanlioran22')?>
<?php } else { ?>
<?=$row['varoname'];?>
<?php } ?>

<?php } else if($oyuntip==3){ ?>

<?php if($row['varoname']=="Kim Kazanır"){ ?>
<?=getTranslation('tcanlioran1')?>
<?php } else if($row['varoname']=="Set Bahisi"){ ?>
<?=getTranslation('tcanlioran2')?>
<?php } else { ?>
<?=$row['varoname'];?>
<?php } ?>

<?php } else if($oyuntip==4){ ?>

<?php if($row['varoname']=="Kim Kazanır"){ ?>
<?=getTranslation('vcanlioran1')?>
<?php } else if($row['varoname']=="1.Seti Kim Kazanır ?"){ ?>
<?=getTranslation('vcanlioran2')?>
<?php } else if($row['varoname']=="2.Seti Kim Kazanır ?"){ ?>
<?=getTranslation('vcanlioran3')?>
<?php } else if($row['varoname']=="3.Seti Kim Kazanır ?"){ ?>
<?=getTranslation('vcanlioran4')?>
<?php } else if($row['varoname']=="4.Seti Kim Kazanır ?"){ ?>
<?=getTranslation('vcanlioran5')?>
<?php } else if($row['varoname']=="Set bahisi (5 maç üzerinden)"){ ?>
<?=getTranslation('vcanlioran6')?>
<?php } else if($row['varoname']=="Toplam Kaç Set Oynanır ?"){ ?>
<?=getTranslation('vcanlioran7')?>
<?php } else if($row['varoname']=="1.Takım Toplam Sayı Alt/Üst"){ ?>
<?=getTranslation('vcanlioran8')?>
<?php } else if($row['varoname']=="2.Takım Toplam Sayı Alt/Üst"){ ?>
<?=getTranslation('vcanlioran9')?>
<?php } else if($row['varoname']=="1.Takım 1.Set Toplam Sayı Alt/Üst"){ ?>
<?=getTranslation('vcanlioran10')?>
<?php } else if($row['varoname']=="2.Takım 1.Set Toplam Sayı Alt/Üst"){ ?>
<?=getTranslation('vcanlioran11')?>
<?php } else if($row['varoname']=="1.Takım 2.Set Toplam Sayı Alt/Üst"){ ?>
<?=getTranslation('vcanlioran12')?>
<?php } else if($row['varoname']=="2.Takım 2.Set Toplam Sayı Alt/Üst"){ ?>
<?=getTranslation('vcanlioran13')?>
<?php } else if($row['varoname']=="1.Takım 3.Set Toplam Sayı Alt/Üst"){ ?>
<?=getTranslation('vcanlioran14')?>
<?php } else if($row['varoname']=="2.Takım 3.Set Toplam Sayı Alt/Üst"){ ?>
<?=getTranslation('vcanlioran15')?>
<?php } else if($row['varoname']=="1.Takım 4.Set Toplam Sayı Alt/Üst"){ ?>
<?=getTranslation('vcanlioran16')?>
<?php } else if($row['varoname']=="2.Takım 4.Set Toplam Sayı Alt/Üst"){ ?>
<?=getTranslation('vcanlioran17')?>
<?php } else if($row['varoname']=="Toplam Sayı Alt/Üst"){ ?>
<?=getTranslation('vcanlioran18')?>
<?php } else if($row['varoname']=="Toplam Sayı Tek/Çift"){ ?>
<?=getTranslation('vcanlioran19')?>
<?php } else if($row['varoname']=="1.Set Toplam Sayı Tek/Çift"){ ?>
<?=getTranslation('vcanlioran20')?>
<?php } else if($row['varoname']=="2.Set Toplam Sayı Tek/Çift"){ ?>
<?=getTranslation('vcanlioran21')?>
<?php } else if($row['varoname']=="3.Set Toplam Sayı Tek/Çift"){ ?>
<?=getTranslation('vcanlioran22')?>
<?php } else if($row['varoname']=="4.Set Toplam Sayı Tek/Çift"){ ?>
<?=getTranslation('vcanlioran23')?>
<?php } else if($row['varoname']=="Müsabaka 5.Set Sürermi"){ ?>
<?=getTranslation('vcanlioran24')?>
<?php } else { ?>
<?=$row['varoname'];?>
<?php } ?>

<?php } else if($oyuntip==5){ ?>

<?php if($row['varoname']=="1X2"){ ?>
<?=getTranslation('buzcanlioran1')?>
<?php } else if($row['varoname']=="Cifte Sans"){ ?>
<?=getTranslation('buzcanlioran2')?>
<?php } else if($row['varoname']=="Hangi periyod daha cok gol olur?"){ ?>
<?=getTranslation('buzcanlioran3')?>
<?php } else { ?>
<?=$row['varoname'];?>
<?php } ?>

<?php } ?>

</td>

<td>
<?php if($bilgisini_ver == 0) { ?>
<img src="/players/img/akfpsf_2.png" alt="Durum" border="0">
<?php } else { ?>
<img src="/players/img/akfpsf_1.png" alt="Durum" border="0">
<?php } ?>
</td>

<td>
<?php if($bilgisini_ver == 0) { ?>
<a href="javascript:;" onClick="oyunlari_degis_canli('<?=$row['varoname']; ?>','1','<?=$spor_tipi_ver;?>');"><font style="color:#0f8311;font-weight:bold;"><?=getTranslation('ajaxspordallariaktifet')?></font></a>
<?php } else { ?>
<a href="javascript:;" onClick="oyunlari_degis_canli('<?=$row['varoname']; ?>','0','<?=$spor_tipi_ver;?>');"><font style="color:#f00;font-weight:bold;"><?=getTranslation('ajaxspordallaripasifet')?></font></a>
<?php } ?>
</td>

</tr>

<?php } ?>

</tbody>
</table>

<?php } ?>

<?php }

if($a=="oyun_turleri") {

$oyuntip = gd("tip");

if($oyuntip==1){

$sor = sed_sql_query("select * from oran_tip_futbol where id!=''");

} else if($oyuntip==2){

$sor = sed_sql_query("select * from oran_tip_basketbol where id!=''");

} else if($oyuntip==3){

$sor = sed_sql_query("select * from oran_tip_tenis where id!=''");

} else if($oyuntip==4){

$sor = sed_sql_query("select * from oran_tip_voleybol where id!=''");

} else if($oyuntip==5){

$sor = sed_sql_query("select * from oran_tip_buzhokeyi where id!=''");

} else if($oyuntip==6){

$sor = sed_sql_query("select * from oran_tip_hentbol where id!=''");

} else {

$sor = sed_sql_query("select * from oran_tip_futbol where id!=''");

}

if(sed_sql_numrows($sor)<1) { ?>

<table class="tablesorter">
<thead>
<tr>
<th colspan="3">OYUN TÜRLERİ AKTİFLEŞTİRME VE PASİFLEŞTİRME EKRANI</th>
</tr>
<tr>
<th>Oyun Kategorileri</th>
<th width="45">Durum</th>
<th width="45">Eylemler</th>
</tr>
</thead>
<tbody>

<?php } else { ?>

<script>
function asdes(order,as) {
$("#order").val(order);	
$("#ascdesc").val(as);
$("#suanval").val(1);
oyunturleri(1);
}
function oyunlari_degis_normal(tip_isim,oran_tip_id,durum,spor_tipi) {
var rand = Math.random();	
$.get('../ajax_players.php?a=oyunlari_degis_normal&tip_isim='+tip_isim+'&oran_tip_id='+oran_tip_id+'&durum='+durum+'&spor_tipi='+spor_tipi+'',function(data) { oyunturleri(<?=$oyuntip;?>); });
}
</script>

<table class="tablesorter">
<thead>
<tr>
<th colspan="3"><?=getTranslation('ajaxoyunturleri1')?></th>
</tr>
<tr>
<th><?=getTranslation('ajaxoyunturleri2')?></th>
<th width="45"><?=getTranslation('ajaxoyunturleri3')?></th>
<th width="45"><?=getTranslation('ajaxoyunturleri4')?></th>
</tr>
</thead>
<tbody>

<?php

while($row=sed_sql_fetcharray($sor)) {

if($oyuntip==1){

$bilgisi_getir = bilgi("select * from oyunlar_normal where spor_tipi='futbol' and tip_isim='".$row['tip_isim']."' and bayi_id='".$ub['id']."'");

$spor_tipi_ver = "futbol";

} else if($oyuntip==2){

$bilgisi_getir = bilgi("select * from oyunlar_normal where spor_tipi='basketbol' and tip_isim='".$row['tip_isim']."' and bayi_id='".$ub['id']."'");

$spor_tipi_ver = "basketbol";

} else if($oyuntip==3){

$bilgisi_getir = bilgi("select * from oyunlar_normal where spor_tipi='tenis' and tip_isim='".$row['tip_isim']."' and bayi_id='".$ub['id']."'");

$spor_tipi_ver = "tenis";

} else if($oyuntip==4){

$bilgisi_getir = bilgi("select * from oyunlar_normal where spor_tipi='voleybol' and tip_isim='".$row['tip_isim']."' and bayi_id='".$ub['id']."'");

$spor_tipi_ver = "voleybol";

} else if($oyuntip==5){

$bilgisi_getir = bilgi("select * from oyunlar_normal where spor_tipi='buzhokeyi' and tip_isim='".$row['tip_isim']."' and bayi_id='".$ub['id']."'");

$spor_tipi_ver = "buzhokeyi";

} else if($oyuntip==6){

$bilgisi_getir = bilgi("select * from oyunlar_normal where spor_tipi='hentbol' and tip_isim='".$row['tip_isim']."' and bayi_id='".$ub['id']."'");

$spor_tipi_ver = "hentbol";

} else {

$bilgisi_getir = bilgi("select * from oyunlar_normal where spor_tipi='futbol' and tip_isim='".$row['tip_isim']."' and bayi_id='".$ub['id']."'");

$spor_tipi_ver = "futbol";

}

if($bilgisi_getir['status']=="1") { $bilgisini_ver = 0; } else { $bilgisini_ver = 1; }

?>


<tr class="c">

<td class="l">
<?php if($oyuntip==1){ ?>
<?=getTranslation('foran'.$row['id'].'')?>
<?php } else if($oyuntip==2){ ?>
<?=getTranslation('boran'.$row['id'].'')?>
<?php } else if($oyuntip==3){ ?>
<?=getTranslation('toran'.$row['id'].'')?>
<?php } else if($oyuntip==4){ ?>
<?=getTranslation('voran'.$row['id'].'')?>
<?php } else if($oyuntip==5){ ?>
<?=getTranslation('buzoran'.$row['id'].'')?>
<?php } else if($oyuntip==6){ ?>
<?=getTranslation('horan'.$row['id'].'')?>
<?php } ?>
</td>

<td>
<?php if($bilgisini_ver == 0) { ?>
<img src="/players/img/akfpsf_2.png" alt="Durum" border="0">
<?php } else { ?>
<img src="/players/img/akfpsf_1.png" alt="Durum" border="0">
<?php } ?>
</td>

<td>
<?php if($bilgisini_ver == 0) { ?>
<a href="javascript:;" onClick="oyunlari_degis_normal('<?=$row['tip_isim']; ?>','<?=$row['id']; ?>','1','<?=$spor_tipi_ver;?>');"><font style="color:#0f8311;font-weight:bold;"><?=getTranslation('ajaxspordallariaktifet')?></font></a>
<?php } else { ?>
<a href="javascript:;" onClick="oyunlari_degis_normal('<?=$row['tip_isim']; ?>','<?=$row['id']; ?>','0','<?=$spor_tipi_ver;?>');"><font style="color:#f00;font-weight:bold;"><?=getTranslation('ajaxspordallaripasifet')?></font></a>
<?php } ?>
</td>

</tr>

<?php } ?>

</tbody>
</table>

<?php } ?>

<?php }

if($a=="karalistegerial") {

$id = gd("id");

$bayilerim = benimbayilerim($ub['id']);

$bayi_array = explode(",",$bayilerim);
if(!in_array($id,$bayi_array)) { die("<div class='bos'>Cok guzel hareketler bunlar ;*</div>"); }

uyelerigerial($id);

if(file_exists("sistem/natoservers/hesap_sahibi_id_".$ub['id'].".xml")) {

unlink("sistem/natoservers/hesap_sahibi_id_".$ub['id'].".xml");

benimbayilerim($ub['id']);

}

}

if($a=="karaliste") {

$id = gd("id");

if($id=="1" && $ub['id']!="1") { die("..."); }

$bayilerim = benimbayilerim($ub['id']);

$bayi_array = explode(",",$bayilerim);

if(!in_array($id,$bayi_array)) { die("<div class='bos'>Bu yetkiye <strong>MAALESEF</strong> sahip değilsiniz.</div>"); }

$order = gd("order");

$ascdesc = gd("ascdesc");



if($order=="bakiye") {

	$ordered = "order by CAST($order AS UNSIGNED) $ascdesc";

} else {

	$ordered = "order by $order $ascdesc";

}



if($ascdesc=="asc") { $neworder = "desc"; } else { $neworder = "asc"; }

$sor = sed_sql_query("select * from kullanici where hesap_sahibi_id='$id' and root='1' and sil='0' $ordered");

if(sed_sql_numrows($sor)<1) { ?>

<table class="tablesorter">
<tbody>
<tr>
<th><?=getTranslation('ajaxkaraliste1')?></th>
</tr>
</tbody></table>

<table class="tablesorter">
<thead>
<tr>
<th>#</th>
<th><?=getTranslation('ajaxkaraliste2')?></th>
<th><?=getTranslation('ajaxkaraliste3')?></th>
<th><?=getTranslation('ajaxkaraliste4')?></th>
<th><?=getTranslation('ajaxkaraliste5')?></th>
<th><?=getTranslation('ajaxkaraliste6')?></th>
<th><?=getTranslation('ajaxkaraliste7')?></th>
</tr>
</thead>
<tbody>
<tr>
<td colspan="9">
<div class="notice info">
<ul class="list-unordered list-checked2">
<li><?=getTranslation('ajaxkaraliste8')?></li>
<li><?=getTranslation('ajaxkaraliste9')?></li>
<li><?=getTranslation('ajaxkaraliste10')?></li>
<li><?=getTranslation('ajaxkaraliste11')?></li>
<li><?=getTranslation('ajaxkaraliste12')?></li>
<li><?=getTranslation('ajaxkaraliste13')?><?=$ub['alt_limit'];?><?=getTranslation('ajaxkaraliste14')?></li>

</ul>
</div>
</td>
</tr>
</tbody>
</table>

<?php } else { 

$obilgi = bilgi("select * from kullanici where id='$id'");

?>

<script>

function asdes(order,as) {

$("#order").val(order);	

$("#ascdesc").val(as);

$("#suanval").val(1);

karaliste(<?=$id;?>);

}

function gerialkaraliste(id,uname) {

var rand = Math.random();

if(confirm(''+uname+' adlı kullanıcıyı ve ona bağlı alt kullanıcıları geri almak istediğinizden emin misiniz?')) {

$.get('../ajax_players.php?a=karalistegerial&id='+id+'&rand='+rand+'',function(data) { $("#users").html(data); karaliste('<?=$id;?>'); });	

}	

}

</script>

<table class="tablesorter">
<tbody>
<tr>
<th><?=getTranslation('ajaxkaraliste1')?></th>
</tr>
</tbody></table>

<table class="tablesorter">
<thead>
<tr>
<th>#</th>
<th><?=getTranslation('ajaxkaraliste2')?></th>
<th><?=getTranslation('ajaxkaraliste3')?></th>
<th><?=getTranslation('ajaxkaraliste4')?></th>
<th><?=getTranslation('ajaxkaraliste5')?></th>
<th><?=getTranslation('ajaxkaraliste6')?></th>
<th><?=getTranslation('ajaxkaraliste7')?></th>
</tr>
</thead>
<tbody>

<?php

while($row=sed_sql_fetcharray($sor)) {

$alttotal=sed_sql_numrows(sed_sql_query("select hesap_sahibi_id from kullanici where hesap_sahibi_id='$row[id]' and root='0'"));

?>


<tr class="c">

<td style="text-align:center"><?=$row['id']; ?></td>
<td style="text-align:center"><?=$row['username']; ?></td>
<td style="text-align:center"><?=$row['hatirlatmaad']; ?></td>
<td style="text-align:center"><?=hesap_tipi($row['id']); ?></td>
<td style="text-align:center"><?=nf($row['bakiye']); ?> <?=getTranslation('parabirimi')?></td>
<td style="text-align:center"><?=date("d.m.Y H:i:s",$row['silinme_tarihi']); ?></td>


<?php if($ub['alt_sinir'] > $row['alt_sinir']) { ?>

<td style="text-align:center" width="16">
<a class="grid" title="<?=getTranslation('ajaxkaraliste15')?>" href="javascript:;" onClick="gerialkaraliste('<?=$row['id']; ?>','<?=$row['username']; ?>');">
<img src="/players/img/gerial.png" style="width:70%;" alt="<?=getTranslation('ajaxkaraliste15')?>" border="0"></a>
</td>

<?php } ?>

</tr>

<?php } ?>


<tr>
<td colspan="9">
<div class="notice info">
<ul class="list-unordered list-checked2">
<li><?=getTranslation('ajaxkaraliste8')?></li>
<li><?=getTranslation('ajaxkaraliste9')?></li>
<li><?=getTranslation('ajaxkaraliste10')?></li>
<li><?=getTranslation('ajaxkaraliste11')?></li>
<li><?=getTranslation('ajaxkaraliste12')?></li>
<li><?=getTranslation('ajaxkaraliste13')?><?=$ub['alt_limit'];?><?=getTranslation('ajaxkaraliste14')?></li>

</ul>
</div>
</td>
</tr>
</tbody>
</table>

<?php }

}

if($a=="girislog"){

$userid = gd("bayiadi");

$pageper = 50;

$benimbayilerim = benimbayilerim($ub['id']);

$bayi_array = explode(",",$benimbayilerim);


if(strstr($userid,"-plus")) { 

$idbul = explode("-",$userid); $idalti = $idbul[0]; 

$onunkiler = benimbayilerim($idalti);

$userid = $idalti;

} 

if(!empty($userid) && in_array($userid,$bayi_array)) { 

if($onunkiler) {

	$user_ekle = "user_id in ($onunkiler)";

} else {

	$user_ekle = "user_id='$userid'"; 

}

} else { 

$user_ekle = "user_id in ($benimbayilerim)"; 

}

$bayilerim = benimbayilerim($ub['id']);

$gelen_sayfa = (isset($_GET['sayfa']) && $_GET['sayfa'] !='' ) ? intval($_GET['sayfa']) : 1;

$limit = $pageper;

$s_s = 10;

$s_sor = sed_sql_query("select count(id) from login_data where $user_ekle") or trigger_error(mysql_error(),E_USER_ERROR);

$satir = sed_sql_result($s_sor,0);

sed_sql_freeresult($s_sor);

if($satir >0){//sonuç varsa

$baslama = ($gelen_sayfa > 1) ? (($gelen_sayfa -1) * $limit) : 0 ;

$sayfa_kac = $satir/$limit;

$sayfa_sayisi = ($satir % $limit != 0) ? intval($sayfa_kac)+1 : intval($sayfa_kac);

$basla=( $satir >= $baslama ) ? $baslama : 0 ;

unset( $sayfa_kac, $baslama );

$sor = sed_sql_query("select * from login_data where $user_ekle order by zaman desc limit $basla,$limit");

$i=1;

$style='';

$toplam = sed_sql_numrows($sor);

if(sed_sql_numrows($sor)<1) { ?>

<div class="space_9 clear"></div>

<div class="space_9 clear"></div>

<div class="new_sheet cf panelHead" style="margin-top: 0px;height: 25px;line-height: 25px;text-align: center;background: #fff;border-bottom: 3px solid #ef8107;border-top: 3px solid #ef8107;">
<?=getTranslation('ajaxgirislog1')?>
</div>

<?php } else { ?>

<table class="tablesorter">
<tbody>
<tr>
<td>
<div class="notice info">
<ul class="list-unordered list-checked2">
<li style="color:#000"><?=getTranslation('ajaxgirislog2')?> : <strong style="color:#f00;font-weight:bold;font-size:15px;"><?=$toplam;?></strong></li>
</ul>
</div>
</td>
</tr>
</tbody>
</table>
<table id="tablesorter" class="tablesorter">
<thead>
<tr>
<th style="text-align:left;" class="header"><?=getTranslation('ajaxgirislog3')?></th>
<th class="header"><?=getTranslation('ajaxgirislog4')?></th>
<th class="header"><?=getTranslation('ajaxgirislog5')?></th>
<th class="header"><?=getTranslation('ajaxgirislog6')?></th>
<th class="header"></th>
</tr>
</thead>

<?php while($row=sed_sql_fetcharray($sor)) { ?>

<tbody>
<tr>
<td><?=$row['login_user']; ?></td>
<td style="text-align:center"><?=getTranslation('ajaxgirislog7')?></td>
<td style="text-align:center"><?=date('d.m.Y H:i:s',$row['zaman']);?></td>
<td style="text-align:center"><?=$row['login_ip']; ?></td>
<td width="16">
<a target="_blank" class="grid" href="https://ipinfo.io/<?=$row['login_ip']; ?>" title="<?=getTranslation('ajaxgirislog8')?>" rel="external">
<img src="/players/img/bayiler/ip.png" alt="<?=getTranslation('ajaxgirislog9')?>" border="0">
</a>
</td>
</tr>
</tbody>

<?php } ?>

</table>

<div class="space_9"></div>
<div class="space"></div>

<span>
<div class="sheet_body_sub on cf">
<div class="main_box pager cf">
<div class="left" style="width: 100%">
<div class="div_center">


<?php $style = ($style=='') ? '2' : '';
$i++; } ?>

<?php 
		$hangi_sayfa= ($gelen_sayfa > 0)? $gelen_sayfa : 1 ;
		echo '<div class="inline" style="height: 38px;line-height: 24px;"><nav class="zipagin-light light-green">';	
	
	
			$alt= ($gelen_sayfa - $s_s);
			if($sayfa_sayisi <= $s_s || $gelen_sayfa <= $s_s ) {$alt=1;} 
			$ust= (($gelen_sayfa + $s_s)< $sayfa_sayisi ) ? ($gelen_sayfa + $s_s) : ($sayfa_sayisi);	
			echo ($gelen_sayfa > 1 )? '<a class="" href="javascript:;" onclick="girisloggetir(1,1);" id="sayfaveri">'.getTranslation('ajaxtumkuponlarim30').'</a><a class="" href="javascript:;" id="sayfaveri" onclick="girisloggetir(1,'.($gelen_sayfa -1).');">« '.getTranslation('ajaxtumkuponlarim31').'</a>':' ';
			for($i=$alt; $i<=$ust ;$i++){		
				echo ($i != $gelen_sayfa ) ? '<a class="" href="javascript:;" id="sayfaveri" onclick="girisloggetir(1,'.$i.');">'.$i.'</a>' : '<span>'.$i.'</span>';
				}
			echo ($gelen_sayfa < $sayfa_sayisi)? '<a class="" href="javascript:;" id="sayfaveri" onclick="girisloggetir(1,'.($gelen_sayfa +1).');">'.getTranslation('ajaxtumkuponlarim32').' »</a><a class="" href="javascript:;" id="sayfaveri" onclick="girisloggetir(1,'.$sayfa_sayisi.');">'.getTranslation('ajaxtumkuponlarim33').'</a>' :'';
			echo '</nav></div>';
?>

</div>
</div>
</div>
</div>
</span>

<?php } else { ?>

<div class="space_9 clear"></div>

<div class="space_9 clear"></div>

<div class="new_sheet cf panelHead" style="margin-top: 0px;height: 25px;line-height: 25px;text-align: center;background: #fff;border-bottom: 3px solid #ef8107;border-top: 3px solid #ef8107;">
<?=getTranslation('ajaxgirislog1')?>
</div>

<?php } ?>

<table class="tablesorter">
<tbody><tr>
<th><?=getTranslation('ajaxgirislog10')?></th>
</tr>
<tr>
<td></td>
</tr>
<tr>
<td>
<div class="notice info">
<ul class="list-unordered list-checked2">
<li><?=getTranslation('ajaxgirislog11')?></li>
<li><?=getTranslation('ajaxgirislog12')?></li>
<li><?=getTranslation('ajaxgirislog13')?></li>
</ul>
</div>
</td>
</tr>
</tbody>
</table>
</div>

<?php }

if($a=="kuponraporlari") {

$kupon_id = gd("kupon_id");

if($kupon_id>0){
	$kupon_id_ver = "and aciklama='".$kupon_id." numaralı kupon yatırıldı' or aciklama='".$kupon_id." numaralı kupon kazancı'";
} else {
	$kupon_id_ver = "";
}

$tarih1 = basla_time(gd("tarih1"));

$tarih2 = bitir_time(gd("tarih2"));

$islemtip = gd("islemtip");

$userid = gd("useri");

$pageper = 30;

$benimbayilerim = benimbayilerim($ub['id']);

$bayi_array = explode(",",$benimbayilerim);


if(strstr($userid,"-plus")) { 

$idbul = explode("-",$userid); $idalti = $idbul[0]; 

$onunkiler = benimbayilerim($idalti);

$userid = $idalti;

} 

if(!empty($userid) && in_array($userid,$bayi_array)) { 

if($onunkiler) {

	$user_ekle = "user_id in ($onunkiler)";

} else {

	$user_ekle = "user_id='$userid'"; 

}

} else { 

$user_ekle = "user_id in ($benimbayilerim)"; 

}

$gelen_sayfa = (isset($_GET['sayfa']) && $_GET['sayfa'] !='' ) ? intval($_GET['sayfa']) : 1;

if(!empty($islemtip)) { $islemtip_ekle = "and tip='$islemtip'"; } else { $islemtip_ekle = ""; }

//Sayfada kaç kayıt görünecek
$limit = $pageper;

//Kaç sayfa öncesi ve sonrası görünecek
$s_s = 10;

/*------------------------------------
Alan Başlıklarını ve $sonuc['alan1'] 
kısımlarını kendinize göre değiştirin
-------------------------------------*/


$sqladder_sayfalama = "$user_ekle $kupon_id_ver and zaman between '$tarih1' and '$tarih2' $islemtip_ekle";

$s_sor = sed_sql_query("select count(id) from hesap_hareket_gecici2 where $sqladder_sayfalama") or trigger_error(mysql_error(),E_USER_ERROR);

$satir = sed_sql_result($s_sor,0);

sed_sql_freeresult($s_sor);

if($satir >0){//sonuç varsa

$baslama = ($gelen_sayfa > 1) ? (($gelen_sayfa -1) * $limit) : 0 ;

$sayfa_kac = $satir/$limit;

$sayfa_sayisi = ($satir % $limit != 0) ? intval($sayfa_kac)+1 : intval($sayfa_kac);

$basla=( $satir >= $baslama ) ? $baslama : 0 ;

unset( $sayfa_kac, $baslama );

$sqladderone = "$user_ekle $kupon_id_ver and zaman between '$tarih1' and '$tarih2' $islemtip_ekle order by id DESC limit $basla,$limit";
$sqladderone2 = "$user_ekle $kupon_id_ver and zaman between '$tarih1' and '$tarih2' $islemtip_ekle order by id DESC";

$sor = sed_sql_query("select * from hesap_hareket_gecici2 where $sqladderone");

$i=1;

$style='';

$toplams = bilgi("SELECT 

COUNT(CASE WHEN id!='' THEN id END) as toplam_kayit,

SUM(CASE WHEN tip='ekle' THEN tutar END) as toplam_kazanan_miktar,

SUM(CASE WHEN tip='cikar' THEN tutar END) as toplam_yatan_miktar,

SUM(CASE WHEN tip='iptal' THEN tutar END) as toplam_iptal_miktar

FROM hesap_hareket_gecici2 WHERE $sqladderone2"); 

if(sed_sql_numrows($sor)<1) { ?>

<div class="space_9 clear"></div>

<div class="space_9 clear"></div>

<div class="new_sheet cf panelHead" style="margin-top: 0px;height: 25px;line-height: 25px;text-align: center;background: #fff;border-bottom: 3px solid #ef8107;border-top: 3px solid #ef8107;">
<?=getTranslation('ajaxkuponraporlari1')?>
</div>

<?php } else { ?>

<table class="tablesorter">
<tbody><tr>
<th><?=gd("tarih1");?> / <?=gd("tarih2");?> <?=getTranslation('ajaxkuponraporlari2')?></th>
</tr>
<tr>
<td></td>
</tr>
<tr>
<td>
<div class="notice info">
<table class="tablesorter">
<tbody>
<tr>
<td><?=getTranslation('ajaxkuponraporlari3')?></td>
<td><?=$toplams['toplam_kayit'];?></td>
<td><?=getTranslation('ajaxkuponraporlari4')?></td>
<td><?=nf($toplams['toplam_iptal_miktar']); ?></td>
</tr>
<tr>
<td><?=getTranslation('ajaxkuponraporlari5')?></td>
<td><?=nf($toplams['toplam_yatan_miktar']); ?></td>
<td><?=getTranslation('ajaxkuponraporlari6')?></td>
<td><?=nf($toplams['toplam_kazanan_miktar']); ?></td>
</tr>
</tbody>
</table>
</div>
</td>
</tr>
</tbody>
</table>

<table id="tablesorter" class="tablesorter">
<thead>
<tr>
<th class="header">#</th>
<th class="header"><?=getTranslation('ajaxkuponraporlari7')?></th>
<th class="header"><?=getTranslation('ajaxkuponraporlari8')?></th>
<th class="header"><?=getTranslation('ajaxkuponraporlari9')?></th>
<th class="header"><?=getTranslation('ajaxkuponraporlari10')?></th>
<th class="header"><?=getTranslation('ajaxkuponraporlari11')?></th>
<th class="header"><?=getTranslation('ajaxkuponraporlari12')?></th>
<th class="header"><?=getTranslation('ajaxkuponraporlari13')?></th>
</tr>
</thead>
<tbody>

<?php
while($ass=sed_sql_fetcharray($sor)) {
$id_bul = explode(" ",$ass['aciklama']);
?>

<tr class="itext-<?php if($ass['tip']=="ekle"){ ?>1<?php } else if($ass['tip']=="cikar"){ ?>2<?php } else if($ass['tip']=="iptal"){ ?>1<?php } ?> c">
<td style="text-align:center;"><?=$ass['id']; ?></td>
<td><?=$ass['username']; ?></td>
<td style="text-align:center;"><?php if($ass['tip']=="ekle") { ?><img src="/players/img/inout_1.png" alt="İşlem Türü" border="0"><?php } else if($ass['tip']=="cikar") { ?><img src="/players/img/inout_2.png" alt="İşlem Türü" border="0"><?php } else if($ass['tip']=="iptal") { ?><img src="/players/img/inout_1.png" alt="İşlem Türü" border="0"><?php } ?></td>
<td style="text-align:center;"><?=nf($ass['onceki_tutar']); ?></td>
<td style="text-align:center;"><?=nf($ass['tutar']); ?></td>
<td style="text-align:center;">

<?php if($ass['tip']=="ekle") { ?>

<?=nf($ass['onceki_tutar']+$ass['tutar']); ?>

<?php } else if($ass['tip']=="cikar") { ?>

<?=nf($ass['onceki_tutar']-$ass['tutar']); ?>

<?php } else if($ass['tip']=="iptal") { ?>

<?=nf($ass['onceki_tutar']+$ass['tutar']); ?>

<?php } ?>

</td>
<td style="text-align:center;"><font style="color:#000;"><?=date("d-m-Y",$ass['zaman']);?></font> <?=date("H:i:s",$ass['zaman']); ?></td>
<td class="l"><?=$id_bul[0];?> <?php if($ass['tip']=="cikar") { ?><?=getTranslation('ajaxkuponraporlari14')?><?php } else if($ass['tip']=="ekle") { ?><?=getTranslation('ajaxkuponraporlari15')?><?php } else if($ass['tip']=="iptal") { ?>numaralı kupon iptal bedeli<?php } ?>
</td>
</tr>

<?php } ?>

</tbody>
</table>

<div class="space_9"></div>
<div class="space"></div>

<span>
<div class="sheet_body_sub on cf">
<div class="main_box pager cf">
<div class="left" style="width: 100%">
<div class="div_center">

<?php 
$style = ($style=='') ? '2' : '';
$i++;
} ?>		

<?php 
		$hangi_sayfa= ($gelen_sayfa > 0)? $gelen_sayfa : 1 ;
		echo '<div class="inline" style="height: 38px;line-height: 24px;"><nav class="zipagin-light light-green">';	
	
	
			$alt= ($gelen_sayfa - $s_s);
			if($sayfa_sayisi <= $s_s || $gelen_sayfa <= $s_s ) {$alt=1;} 
			$ust= (($gelen_sayfa + $s_s)< $sayfa_sayisi ) ? ($gelen_sayfa + $s_s) : ($sayfa_sayisi);	
			echo ($gelen_sayfa > 1 )? '<a class="" href="javascript:;" onclick="kuponraporgetir(1,1);" id="sayfaveri">'.getTranslation('ajaxtumkuponlarim30').'</a><a class="" href="javascript:;" id="sayfaveri" onclick="kuponraporgetir(1,'.($gelen_sayfa -1).');">« '.getTranslation('ajaxtumkuponlarim31').'</a>':' ';
			for($i=$alt; $i<=$ust ;$i++){		
				echo ($i != $gelen_sayfa ) ? '<a class="" href="javascript:;" id="sayfaveri" onclick="kuponraporgetir(1,'.$i.');">'.$i.'</a>' : '<span>'.$i.'</span>';
				}
			echo ($gelen_sayfa < $sayfa_sayisi)? '<a class="" href="javascript:;" id="sayfaveri" onclick="kuponraporgetir(1,'.($gelen_sayfa +1).');">'.getTranslation('ajaxtumkuponlarim32').' »</a><a class="" href="javascript:;" id="sayfaveri" onclick="kuponraporgetir(1,'.$sayfa_sayisi.');">'.getTranslation('ajaxtumkuponlarim33').'</a>' :'';
			echo '</nav></div>';
?>

</div>
</div>
</div>
</div>
</span>

<?php } else { ?>

<div class="space_9 clear"></div>

<div class="space_9 clear"></div>

<div class="new_sheet cf panelHead" style="margin-top: 0px;height: 25px;line-height: 25px;text-align: center;background: #fff;border-bottom: 3px solid #ef8107;border-top: 3px solid #ef8107;">
<?=getTranslation('ajaxkuponraporlari1')?>
</div>

<?php } ?>

<table class="tablesorter">
<tbody><tr>
<th><?=getTranslation('ajaxkuponraporlari16')?></th>
</tr>
<tr>
<td></td>
</tr>
<tr>
<td>
<div class="notice info">
<ul class="list-unordered list-checked2">
<li><?=getTranslation('ajaxkuponraporlari17')?></li>
<li><?=getTranslation('ajaxkuponraporlari18')?></li>
<li><?=getTranslation('ajaxkuponraporlari19')?></li>
<li><?=getTranslation('ajaxkuponraporlari20')?></li>
<li><?=getTranslation('ajaxkuponraporlari21')?></li>
<li><?=getTranslation('ajaxkuponraporlari22')?></li>
<li><?=getTranslation('ajaxkuponraporlari23')?></li>
<li><?=getTranslation('ajaxkuponraporlari24')?></li>
</ul>
</div>
</td>
</tr>
</tbody>
</table>
</div>

<?php }

if($a=="kuponraporum") {

$tarih1 = basla_time(gd("tarih1"));

$tarih2 = bitir_time(gd("tarih2"));

$islemtip = gd("islemtip");

$dil = gd("dil");

$userid = $ub['id'];

$pageper = 50;

$gelen_sayfa = (isset($_GET['sayfa']) && $_GET['sayfa'] !='' ) ? intval($_GET['sayfa']) : 1;

if(!empty($islemtip)) { $islemtip_ekle = "and tip='$islemtip'"; } else { $islemtip_ekle = ""; }

//Sayfada kaç kayıt görünecek
$limit = $pageper;

//Kaç sayfa öncesi ve sonrası görünecek
$s_s = 10;

/*------------------------------------
Alan Başlıklarını ve $sonuc['alan1'] 
kısımlarını kendinize göre değiştirin
-------------------------------------*/


$sqladder_sayfalama = "user_id='$userid' and aciklama NOT LIKE '%casino%' and aciklama NOT LIKE '%rulet%' and zaman between '$tarih1' and '$tarih2' $islemtip_ekle";

$s_sor = sed_sql_query("select count(id) from hesap_hareket_gecici2 where $sqladder_sayfalama") or trigger_error(mysql_error(),E_USER_ERROR);

$satir = sed_sql_result($s_sor,0);

sed_sql_freeresult($s_sor);

if($satir >0){//sonuç varsa

$baslama = ($gelen_sayfa > 1) ? (($gelen_sayfa -1) * $limit) : 0 ;

$sayfa_kac = $satir/$limit;

$sayfa_sayisi = ($satir % $limit != 0) ? intval($sayfa_kac)+1 : intval($sayfa_kac);

$basla=( $satir >= $baslama ) ? $baslama : 0 ;

unset( $sayfa_kac, $baslama );

$sqladderone = "user_id='$userid' and aciklama NOT LIKE '%casino%' and aciklama NOT LIKE '%rulet%' and zaman between '$tarih1' and '$tarih2' $islemtip_ekle order by id DESC limit $basla,$limit";

$sor = sed_sql_query("select * from hesap_hareket_gecici2 where $sqladderone");

$i=1;

$style='';

$toplams = bilgi("SELECT 

COUNT(CASE WHEN id!='' THEN id END) as toplam_kayit,

SUM(CASE WHEN tip='ekle' THEN tutar END) as toplam_kazanan_miktar,

SUM(CASE WHEN tip='cikar' THEN tutar END) as toplam_yatan_miktar,

SUM(CASE WHEN tip='iptal' THEN tutar END) as toplam_iptal_miktar

FROM hesap_hareket_gecici2 WHERE $sqladderone"); 

if(sed_sql_numrows($sor)<1) { ?>

<div class="space_9 clear"></div>

<div class="space_9 clear"></div>

<div class="new_sheet cf panelHead" style="margin-top: 0px;height: 25px;line-height: 25px;text-align: center;background: #fff;border-bottom: 3px solid #ef8107;border-top: 3px solid #ef8107;">
<?=getTranslation('ajaxkuponraporlari1')?>
</div>

<?php } else { ?>

<table class="tablesorter">
<tbody><tr>
<th><?=gd("tarih1");?> / <?=gd("tarih2");?> <?=getTranslation('ajaxkuponraporlari2')?></th>
</tr>
<tr>
<td></td>
</tr>
<tr>
<td>
<div class="notice info">
<table class="tablesorter">
<tbody>
<tr>
<td><?=getTranslation('ajaxkuponraporlari3')?></td>
<td><?=$toplams['toplam_kayit'];?></td>
<td><?=getTranslation('ajaxkuponraporlari4')?></td>
<td><?=nf($toplams['toplam_iptal_miktar']); ?></td>
</tr>
<tr>
<td><?=getTranslation('ajaxkuponraporlari5')?></td>
<td><?=nf($toplams['toplam_yatan_miktar']); ?></td>
<td><?=getTranslation('ajaxkuponraporlari6')?></td>
<td><?=nf($toplams['toplam_kazanan_miktar']); ?></td>
</tr>
</tbody>
</table>
</div>
</td>
</tr>
</tbody>
</table>

<table id="tablesorter" class="tablesorter">
<thead>
<tr>
<th class="header">#</th>
<th class="header"><?=getTranslation('ajaxkuponraporlari7')?></th>
<th class="header"><?=getTranslation('ajaxkuponraporlari8')?></th>
<th class="header"><?=getTranslation('ajaxkuponraporlari9')?></th>
<th class="header"><?=getTranslation('ajaxkuponraporlari10')?></th>
<th class="header"><?=getTranslation('ajaxkuponraporlari11')?></th>
<th class="header"><?=getTranslation('ajaxkuponraporlari12')?></th>
<th class="header"><?=getTranslation('ajaxkuponraporlari13')?></th>
</tr>
</thead>
<tbody>

<?php
while($ass=sed_sql_fetcharray($sor)) {
$id_bul = explode(" ",$ass['aciklama']);

if($dil=='en'){
$gelen = array('numaralı kupon kazancı','numaralı kupon yatırıldı','numaralı kupon iptal bedeli');
$degisen = array('coupon winnings','coupon number deposited','coupon cancellation fee');
$aciklama_ver = str_replace($gelen,$degisen,$ass['aciklama']);
} else if($dil=='de'){
$gelen = array('numaralı kupon kazancı','numaralı kupon yatırıldı','numaralı kupon iptal bedeli');
$degisen = array('Gutscheingewinne','Gutscheinnummer hinterlegt','Stornogebühr für nummerierte Coupons');
$aciklama_ver = str_replace($gelen,$degisen,$ass['aciklama']);
} else if($dil=='ar'){
$gelen = array('numaralı kupon kazancı','numaralı kupon yatırıldı','numaralı kupon iptal bedeli');
$degisen = array('المكاسب القسيمة','تم إيداع رقم القسيمة','رسوم إلغاء القسيمة مرقمة');
$aciklama_ver = str_replace($gelen,$degisen,$ass['aciklama']);
} else if($dil=='ru'){
$gelen = array('numaralı kupon kazancı','numaralı kupon yatırıldı','numaralı kupon iptal bedeli');
$degisen = array('купонный выигрыш','номер депонированного купона','Комиссия за аннулирование пронумерованного купона');
$aciklama_ver = str_replace($gelen,$degisen,$ass['aciklama']);
} else {
$aciklama_ver = $ass['aciklama'];
}

?>

<tr class="itext-<?php if($ass['tip']=="ekle"){ ?>1<?php } else if($ass['tip']=="cikar"){ ?>2<?php } else if($ass['tip']=="iptal"){ ?>1<?php } ?> c">
<td><?=$id_bul[0];?></td>
<td><?=$ass['username']; ?></td>
<td style="text-align:center;"><?php if($ass['tip']=="ekle") { ?><img src="/players/img/inout_1.png" alt="İşlem Türü" border="0"><?php } else if($ass['tip']=="cikar") { ?><img src="/players/img/inout_2.png" alt="İşlem Türü" border="0"><?php } else if($ass['tip']=="iptal") { ?><img src="/players/img/inout_1.png" alt="İşlem Türü" border="0"><?php } ?></td>
<td style="text-align:center;"><?=nf($ass['onceki_tutar']); ?></td>
<td style="text-align:center;"><?=nf($ass['tutar']); ?></td>
<td style="text-align:center;">

<?php if($ass['tip']=="ekle") { ?>

<?=nf($ass['onceki_tutar']+$ass['tutar']); ?>

<?php } else if($ass['tip']=="cikar") { ?>

<?=nf($ass['onceki_tutar']-$ass['tutar']); ?>

<?php } else if($ass['tip']=="iptal") { ?>

<?=nf($ass['onceki_tutar']+$ass['tutar']); ?>

<?php } ?>

</td>
<td style="text-align:center;"><font style="color:#000;"><?=date("d-m-Y",$ass['zaman']);?></font> <?=date("H:i:s",$ass['zaman']); ?></td>
<td class="l"><?=$aciklama_ver;?>
</tr>

<?php } ?>

</tbody>
</table>

<div class="space_9"></div>
<div class="space"></div>

<span>
<div class="sheet_body_sub on cf">
<div class="main_box pager cf">
<div class="left" style="width: 100%">
<div class="div_center">

<?php 
$style = ($style=='') ? '2' : '';
$i++;
} ?>		

<?php 
		$hangi_sayfa= ($gelen_sayfa > 0)? $gelen_sayfa : 1 ;
		echo '<div class="inline" style="height: 38px;line-height: 24px;"><nav class="zipagin-light light-green">';	
	
	
			$alt= ($gelen_sayfa - $s_s);
			if($sayfa_sayisi <= $s_s || $gelen_sayfa <= $s_s ) {$alt=1;} 
			$ust= (($gelen_sayfa + $s_s)< $sayfa_sayisi ) ? ($gelen_sayfa + $s_s) : ($sayfa_sayisi);	
			echo ($gelen_sayfa > 1 )? '<a class="" href="javascript:;" onclick="raporgetir(1,1);" id="sayfaveri">'.getTranslation('ajaxtumkuponlarim30').'</a><a class="" href="javascript:;" id="sayfaveri" onclick="raporgetir(1,'.($gelen_sayfa -1).');">« '.getTranslation('ajaxtumkuponlarim31').'</a>':' ';
			for($i=$alt; $i<=$ust ;$i++){		
				echo ($i != $gelen_sayfa ) ? '<a class="" href="javascript:;" id="sayfaveri" onclick="raporgetir(1,'.$i.');">'.$i.'</a>' : '<span>'.$i.'</span>';
				}
			echo ($gelen_sayfa < $sayfa_sayisi)? '<a class="" href="javascript:;" id="sayfaveri" onclick="raporgetir(1,'.($gelen_sayfa +1).');">'.getTranslation('ajaxtumkuponlarim32').' »</a><a class="" href="javascript:;" id="sayfaveri" onclick="raporgetir(1,'.$sayfa_sayisi.');">'.getTranslation('ajaxtumkuponlarim33').'</a>' :'';
			echo '</nav></div>';
?>

</div>
</div>
</div>
</div>
</span>

<?php } else { ?>

<div class="space_9 clear"></div>

<div class="space_9 clear"></div>

<div class="new_sheet cf panelHead" style="margin-top: 0px;height: 25px;line-height: 25px;text-align: center;background: #fff;border-bottom: 3px solid #ef8107;border-top: 3px solid #ef8107;">
<?=getTranslation('ajaxkuponraporlari1')?>
</div>

<?php } ?>

<table class="tablesorter">
<tbody><tr>
<th><?=getTranslation('ajaxkuponraporlari16')?></th>
</tr>
<tr>
<td></td>
</tr>
<tr>
<td>
<div class="notice info">
<ul class="list-unordered list-checked2">
<li><?=getTranslation('ajaxkuponraporlari17')?></li>
<li><?=getTranslation('ajaxkuponraporlari18')?></li>
<li><?=getTranslation('ajaxkuponraporlari19')?></li>
<li><?=getTranslation('ajaxkuponraporlari20')?></li>
<li><?=getTranslation('ajaxkuponraporlari21')?></li>
<li><?=getTranslation('ajaxkuponraporlari22')?></li>
<li><?=getTranslation('ajaxkuponraporlari23')?></li>
<li><?=getTranslation('ajaxkuponraporlari24')?></li>
</ul>
</div>
</td>
</tr>
</tbody>
</table>
</div>

<br>
<br>

<?php }

if($a=="ckuponraporum") {

$tarih1 = basla_time(gd("tarih1"));

$tarih2 = bitir_time(gd("tarih2"));

$islemtip = gd("islemtip");

$dil = gd("dil");

$userid = $ub['id'];

$pageper = 50;

$gelen_sayfa = (isset($_GET['sayfa']) && $_GET['sayfa'] !='' ) ? intval($_GET['sayfa']) : 1;

if(!empty($islemtip)) { $islemtip_ekle = "and tip='$islemtip'"; } else { $islemtip_ekle = ""; }

//Sayfada kaç kayıt görünecek
$limit = $pageper;

//Kaç sayfa öncesi ve sonrası görünecek
$s_s = 10;

/*------------------------------------
Alan Başlıklarını ve $sonuc['alan1'] 
kısımlarını kendinize göre değiştirin
-------------------------------------*/


$sqladder_sayfalama = "user_id='$userid' and (aciklama like '%$casino%' or aciklama like '%$rulet%') and zaman between '$tarih1' and '$tarih2' $islemtip_ekle";

$s_sor = sed_sql_query("select count(id) from hesap_hareket_gecici2 where $sqladder_sayfalama") or trigger_error(mysql_error(),E_USER_ERROR);

$satir = sed_sql_result($s_sor,0);

sed_sql_freeresult($s_sor);

if($satir >0){//sonuç varsa

$baslama = ($gelen_sayfa > 1) ? (($gelen_sayfa -1) * $limit) : 0 ;

$sayfa_kac = $satir/$limit;

$sayfa_sayisi = ($satir % $limit != 0) ? intval($sayfa_kac)+1 : intval($sayfa_kac);

$basla=( $satir >= $baslama ) ? $baslama : 0 ;

unset( $sayfa_kac, $baslama );

$sqladderone = "user_id='$userid' and (aciklama like '%$casino%' or aciklama like '%$rulet%') and zaman between '$tarih1' and '$tarih2' $islemtip_ekle order by id DESC limit $basla,$limit";

$sor = sed_sql_query("select * from hesap_hareket_gecici2 where $sqladderone");

$i=1;

$style='';

$toplams = bilgi("SELECT 

COUNT(CASE WHEN id!='' THEN id END) as toplam_kayit,

SUM(CASE WHEN tip='ekle' THEN tutar END) as toplam_kazanan_miktar,

SUM(CASE WHEN tip='cikar' THEN tutar END) as toplam_yatan_miktar,

SUM(CASE WHEN tip='iptal' THEN tutar END) as toplam_iptal_miktar

FROM hesap_hareket_gecici2 WHERE $sqladderone"); 

if(sed_sql_numrows($sor)<1) { ?>

<div class="space_9 clear"></div>

<div class="space_9 clear"></div>

<div class="new_sheet cf panelHead" style="margin-top: 0px;height: 25px;line-height: 25px;text-align: center;background: #fff;border-bottom: 3px solid #ef8107;border-top: 3px solid #ef8107;">
<?=getTranslation('ajaxkuponraporlari1')?>
</div>

<?php } else { ?>

<table class="tablesorter">
<tbody><tr>
<th><?=gd("tarih1");?> / <?=gd("tarih2");?> <?=getTranslation('ajaxkuponraporlari2')?></th>
</tr>
<tr>
<td></td>
</tr>
<tr>
<td>
<div class="notice info">
<table class="tablesorter">
<tbody>
<tr>
<td><?=getTranslation('ajaxkuponraporlari3')?></td>
<td><?=$toplams['toplam_kayit'];?></td>
<td><?=getTranslation('ajaxkuponraporlari4')?></td>
<td><?=nf($toplams['toplam_iptal_miktar']); ?></td>
</tr>
<tr>
<td><?=getTranslation('ajaxkuponraporlari5')?></td>
<td><?=nf($toplams['toplam_yatan_miktar']); ?></td>
<td><?=getTranslation('ajaxkuponraporlari6')?></td>
<td><?=nf($toplams['toplam_kazanan_miktar']); ?></td>
</tr>
</tbody>
</table>
</div>
</td>
</tr>
</tbody>
</table>

<table id="tablesorter" class="tablesorter">
<thead>
<tr>
<th class="header">#</th>
<th class="header"><?=getTranslation('ajaxkuponraporlari7')?></th>
<th class="header"><?=getTranslation('ajaxkuponraporlari8')?></th>
<th class="header"><?=getTranslation('ajaxkuponraporlari9')?></th>
<th class="header"><?=getTranslation('ajaxkuponraporlari10')?></th>
<th class="header"><?=getTranslation('ajaxkuponraporlari11')?></th>
<th class="header"><?=getTranslation('ajaxkuponraporlari12')?></th>
<th class="header"><?=getTranslation('ajaxkuponraporlari13')?></th>
</tr>
</thead>
<tbody>

<?php
while($ass=sed_sql_fetcharray($sor)) {
$id_bul = explode(" ",$ass['aciklama']);

if($dil=='en'){
$gelen = array('numaralı rulet kupon yatırıldı','numaralı casino kupon yatırıldı','numaralı casino kupon kazancı','numaralı rulet kupon kazancı');
$degisen = array('numbered roulette coupon deposited','Casino coupon deposited','number one casino coupon winnings','roulette coupon winning');
$aciklama_ver = str_replace($gelen,$degisen,$ass['aciklama']);
} else if($dil=='de'){
$gelen = array('numaralı rulet kupon yatırıldı','numaralı casino kupon yatırıldı','numaralı casino kupon kazancı','numaralı rulet kupon kazancı');
$degisen = array('nummerierter Roulette-Gutschein hinterlegt','Casino-Gutschein hinterlegt','Casino-Coupon-Gewinne Nummer eins','Roulette-Gutschein gewinnen');
$aciklama_ver = str_replace($gelen,$degisen,$ass['aciklama']);
} else if($dil=='ar'){
$gelen = array('numaralı rulet kupon yatırıldı','numaralı casino kupon yatırıldı','numaralı casino kupon kazancı','numaralı rulet kupon kazancı');
$degisen = array('تم إيداع قسيمة الروليت المرقمة','تم إيداع قسيمة الكازينو','رقم واحد المكاسب القسيمة كازينو','الفوز بقسيمة الروليت');
$aciklama_ver = str_replace($gelen,$degisen,$ass['aciklama']);
} else if($dil=='ru'){
$gelen = array('numaralı rulet kupon yatırıldı','numaralı casino kupon yatırıldı','numaralı casino kupon kazancı','numaralı rulet kupon kazancı');
$degisen = array('пронумерованный купон на рулетку депонирован','Купон казино депонирован','выигрыш по купону казино номер один','выигрыш купона в рулетке');
$aciklama_ver = str_replace($gelen,$degisen,$ass['aciklama']);
} else {
$aciklama_ver = $ass['aciklama'];
}
?>

<tr class="itext-<?php if($ass['tip']=="ekle"){ ?>1<?php } else if($ass['tip']=="cikar"){ ?>2<?php } else if($ass['tip']=="iptal" || $ass['tip']=="ruletiptal" || $ass['tip']=="casinoiptal"){ ?>4<?php } ?> c">
<td><?=$id_bul[0];?></td>
<td><?=$ass['username']; ?></td>
<td style="text-align:center;"><?php if($ass['tip']=="ekle") { ?><img src="/players/img/inout_1.png" alt="İşlem Türü" border="0"><?php } else if($ass['tip']=="cikar") { ?><img src="/players/img/inout_2.png" alt="İşlem Türü" border="0"><?php } else if($ass['tip']=="iptal" || $ass['tip']=="ruletiptal" || $ass['tip']=="casinoiptal") { ?><img src="/players/img/inout_1.png" alt="İşlem Türü" border="0"><?php } ?></td>
<td style="text-align:center;"><?=nf($ass['onceki_tutar']); ?></td>
<td style="text-align:center;"><?=nf($ass['tutar']); ?></td>
<td style="text-align:center;">

<?php if($ass['tip']=="ekle") { ?>

<?=nf($ass['onceki_tutar']+$ass['tutar']); ?>

<?php } else if($ass['tip']=="cikar") { ?>

<?=nf($ass['onceki_tutar']-$ass['tutar']); ?>

<?php } else if($ass['tip']=="iptal" || $ass['tip']=="ruletiptal" || $ass['tip']=="casinoiptal") { ?>

<?=nf($ass['onceki_tutar']+$ass['tutar']); ?>

<?php } ?>

</td>
<td style="text-align:center;"><font style="color:#000;"><?=date("d-m-Y",$ass['zaman']);?></font> <?=date("H:i:s",$ass['zaman']); ?></td>
<td class="l"><?=$aciklama_ver;?>
</tr>

<?php } ?>

</tbody>
</table>

<div class="space_9"></div>
<div class="space"></div>

<span>
<div class="sheet_body_sub on cf">
<div class="main_box pager cf">
<div class="left" style="width: 100%">
<div class="div_center">

<?php 
$style = ($style=='') ? '2' : '';
$i++;
} ?>		

<?php 
		$hangi_sayfa= ($gelen_sayfa > 0)? $gelen_sayfa : 1 ;
		echo '<div class="inline" style="height: 38px;line-height: 24px;"><nav class="zipagin-light light-green">';	
	
	
			$alt= ($gelen_sayfa - $s_s);
			if($sayfa_sayisi <= $s_s || $gelen_sayfa <= $s_s ) {$alt=1;} 
			$ust= (($gelen_sayfa + $s_s)< $sayfa_sayisi ) ? ($gelen_sayfa + $s_s) : ($sayfa_sayisi);	
			echo ($gelen_sayfa > 1 )? '<a class="" href="javascript:;" onclick="raporgetir(1,1);" id="sayfaveri">'.getTranslation('ajaxtumkuponlarim30').'</a><a class="" href="javascript:;" id="sayfaveri" onclick="raporgetir(1,'.($gelen_sayfa -1).');">« '.getTranslation('ajaxtumkuponlarim31').'</a>':' ';
			for($i=$alt; $i<=$ust ;$i++){		
				echo ($i != $gelen_sayfa ) ? '<a class="" href="javascript:;" id="sayfaveri" onclick="raporgetir(1,'.$i.');">'.$i.'</a>' : '<span>'.$i.'</span>';
				}
			echo ($gelen_sayfa < $sayfa_sayisi)? '<a class="" href="javascript:;" id="sayfaveri" onclick="raporgetir(1,'.($gelen_sayfa +1).');">'.getTranslation('ajaxtumkuponlarim32').' »</a><a class="" href="javascript:;" id="sayfaveri" onclick="raporgetir(1,'.$sayfa_sayisi.');">'.getTranslation('ajaxtumkuponlarim33').'</a>' :'';
			echo '</nav></div>';
?>

</div>
</div>
</div>
</div>
</span>

<?php } else { ?>

<div class="space_9 clear"></div>

<div class="space_9 clear"></div>

<div class="new_sheet cf panelHead" style="margin-top: 0px;height: 25px;line-height: 25px;text-align: center;background: #fff;border-bottom: 3px solid #ef8107;border-top: 3px solid #ef8107;">
<?=getTranslation('ajaxkuponraporlari1')?>
</div>

<?php } ?>

<table class="tablesorter">
<tbody><tr>
<th><?=getTranslation('ajaxkuponraporlari16')?></th>
</tr>
<tr>
<td></td>
</tr>
<tr>
<td>
<div class="notice info">
<ul class="list-unordered list-checked2">
<li><?=getTranslation('ajaxkuponraporlari17')?></li>
<li><?=getTranslation('ajaxkuponraporlari18')?></li>
<li><?=getTranslation('ajaxkuponraporlari19')?></li>
<li><?=getTranslation('ajaxkuponraporlari20')?></li>
<li><?=getTranslation('ajaxkuponraporlari21')?></li>
<li><?=getTranslation('ajaxkuponraporlari22')?></li>
<li><?=getTranslation('ajaxkuponraporlari23')?></li>
<li><?=getTranslation('ajaxkuponraporlari24')?></li>
</ul>
</div>
</td>
</tr>
</tbody>
</table>
</div>

<br>
<br>

<?php }

if($a=="bakiyeraporu") {

$tarih1 = basla_time(gd("tarih1"));

$tarih2 = bitir_time(gd("tarih2"));

$islemtip = gd("islemtip");

$userid = gd("useri");

$pageper = 50;

$benimbayilerim = benimbayilerim($ub['id']);

$bayi_array = explode(",",$benimbayilerim);


if(strstr($userid,"-plus")) { 

$idbul = explode("-",$userid); $idalti = $idbul[0]; 

$onunkiler = benimbayilerim($idalti);

$userid = $idalti;

} 

if(!empty($userid) && in_array($userid,$bayi_array)) { 

if($onunkiler) {

	$user_ekle = "user_id in ($onunkiler)";

} else {

	$user_ekle = "user_id='$userid'"; 

}

} else { 

$user_ekle = "user_id in ($benimbayilerim)"; 

}

$gelen_sayfa = (isset($_GET['sayfa']) && $_GET['sayfa'] !='' ) ? intval($_GET['sayfa']) : 1;

if(!empty($islemtip)) { $islemtip_ekle = "and tip='$islemtip'"; } else { $islemtip_ekle = ""; }

//Sayfada kaç kayıt görünecek
$limit = $pageper;

//Kaç sayfa öncesi ve sonrası görünecek
$s_s = 10;

/*------------------------------------
Alan Başlıklarını ve $sonuc['alan1'] 
kısımlarını kendinize göre değiştirin
-------------------------------------*/


$sqladder_sayfalama = "$user_ekle and zaman between '$tarih1' and '$tarih2' $islemtip_ekle";

$s_sor = sed_sql_query("select count(id) from hesap_hareket where $sqladder_sayfalama") or trigger_error(mysql_error(),E_USER_ERROR);

$satir = sed_sql_result($s_sor,0);

sed_sql_freeresult($s_sor);

if($satir >0){//sonuç varsa

$baslama = ($gelen_sayfa > 1) ? (($gelen_sayfa -1) * $limit) : 0 ;

$sayfa_kac = $satir/$limit;

$sayfa_sayisi = ($satir % $limit != 0) ? intval($sayfa_kac)+1 : intval($sayfa_kac);

$basla=( $satir >= $baslama ) ? $baslama : 0 ;

unset( $sayfa_kac, $baslama );

$sqladderone = "$user_ekle and zaman between '$tarih1' and '$tarih2' $islemtip_ekle order by zaman asc limit $basla,$limit";

$sor = sed_sql_query("select * from hesap_hareket where $sqladderone");

$i=1;

$style='';

if(sed_sql_numrows($sor)<1) { ?>

<div class="space_9 clear"></div>

<div class="space_9 clear"></div>

<div class="new_sheet cf panelHead" style="margin-top: 0px;height: 25px;line-height: 25px;text-align: center;background: #fff;border-bottom: 3px solid #ef8107;border-top: 3px solid #ef8107;">
<?=getTranslation('ajaxbakiyeraporu1')?>
</div>

<?php } else { ?>

<table class="tablesorter">
<tbody><tr>
<th><?=gd("tarih1");?> / <?=gd("tarih2");?> <?=getTranslation('ajaxbakiyeraporu2')?></th>
</tr>
</tbody>
</table>

<table id="tablesorter" class="tablesorter">
<thead>
<tr>
<th class="header">#</th>
<th class="header"><?=getTranslation('ajaxbakiyeraporu3')?></th>
<th class="header"><?=getTranslation('ajaxbakiyeraporu4')?></th>
<th class="header"><?=getTranslation('ajaxbakiyeraporu5')?></th>
<th class="header"><?=getTranslation('ajaxbakiyeraporu6')?></th>
<th class="header"><?=getTranslation('ajaxbakiyeraporu7')?></th>
<th class="header"><?=getTranslation('ajaxbakiyeraporu8')?></th>
<th class="header"><?=getTranslation('ajaxbakiyeraporu9')?></th>
</tr>
</thead>
<tbody>

<?php while($ass=sed_sql_fetcharray($sor)) { ?>

<tr class="itext-<?php if($ass['tip']=="ekle"){ ?>1<?php } else if($ass['tip']=="cikar"){ ?>2<?php } else if($ass['iptal']=="ekle"){ ?>1<?php } ?> c">
<td><?=$ass['id'];?></td>
<td><?=$ass['username']; ?></td>
<td style="text-align:center;"><?php if($ass['tip']=="ekle") { ?><img src="/players/img/inout_1.png" alt="İşlem Türü" border="0"><?php } else if($ass['tip']=="cikar") { ?><img src="/players/img/inout_2.png" alt="İşlem Türü" border="0"><?php } else if($ass['tip']=="iptal") { ?><img src="/players/img/inout_1.png" alt="İşlem Türü" border="0"><?php } ?></td>
<td style="text-align:center;"><?=nf($ass['onceki_tutar']); ?></td>
<td style="text-align:center;"><?=nf($ass['tutar']); ?></td>
<td style="text-align:center;">

<?php if($ass['tip']=="ekle") { ?>

<?=nf($ass['onceki_tutar']+$ass['tutar']); ?>

<?php } else if($ass['tip']=="cikar") { ?>

<?=nf($ass['onceki_tutar']-$ass['tutar']); ?>

<?php } else if($ass['tip']=="iptal") { ?>

<?=nf($ass['onceki_tutar']+$ass['tutar']); ?>

<?php } ?>

</td>
<td style="text-align:center;"><font style="color:#000;"><?=date("d-m-Y",$ass['zaman']);?></font> <?=date("H:i:s",$ass['zaman']); ?></td>
<td class="l">


<?php if($ass['aciklama']=="Hesaptan Müşteriye"){ ?>
<?=getTranslation('ajaxbakiyeraporu10')?>
<?php } else if($ass['aciklama']=="Müşteriden Hesaba"){ ?>
<?=getTranslation('ajaxbakiyeraporu11')?>
<?php } else if($ass['aciklama']=="Müşteriye Aktarılan Bakiye"){ ?>
<?=getTranslation('ajaxbakiyeraporu12')?>
<?php } else if($ass['aciklama']=="Müşteriden Çekilen Bakiye"){ ?>
<?=getTranslation('ajaxbakiyeraporu13')?>
<?php } else if($ass['aciklama']=="Bahis Hesabından - Kasaya"){ ?>
<?=getTranslation('ajaxbakiyeraporu14')?>
<?php } else if($ass['aciklama']=="Kasa Hesabından - Bahis Hesabına"){ ?>
<?=getTranslation('ajaxbakiyeraporu15')?>
<?php } else if($ass['aciklama']=="Hesap açılırken eklendi."){ ?>
<?=getTranslation('ajaxbakiyeraporu16')?>
<?php } else { ?>
<?=$ass['aciklama'];?>
<?php } ?>
</td>


</tr>

<?php } ?>

</tbody>
</table>

<div class="space_9"></div>
<div class="space"></div>

<span>
<div class="sheet_body_sub on cf">
<div class="main_box pager cf">
<div class="left" style="width: 100%">
<div class="div_center">

<?php 
$style = ($style=='') ? '2' : '';
$i++;
} ?>		

<?php 
		$hangi_sayfa= ($gelen_sayfa > 0)? $gelen_sayfa : 1 ;
		echo '<div class="inline" style="height: 38px;line-height: 24px;"><nav class="zipagin-light light-green">';	
	
	
			$alt= ($gelen_sayfa - $s_s);
			if($sayfa_sayisi <= $s_s || $gelen_sayfa <= $s_s ) {$alt=1;} 
			$ust= (($gelen_sayfa + $s_s)< $sayfa_sayisi ) ? ($gelen_sayfa + $s_s) : ($sayfa_sayisi);	
			echo ($gelen_sayfa > 1 )? '<a class="" href="javascript:;" onclick="raporgetir(1,1);" id="sayfaveri">'.getTranslation('ajaxtumkuponlarim30').'</a><a class="" href="javascript:;" id="sayfaveri" onclick="raporgetir(1,'.($gelen_sayfa -1).');">« '.getTranslation('ajaxtumkuponlarim31').'</a>':' ';
			for($i=$alt; $i<=$ust ;$i++){		
				echo ($i != $gelen_sayfa ) ? '<a class="" href="javascript:;" id="sayfaveri" onclick="raporgetir(1,'.$i.');">'.$i.'</a>' : '<span>'.$i.'</span>';
				}
			echo ($gelen_sayfa < $sayfa_sayisi)? '<a class="" href="javascript:;" id="sayfaveri" onclick="raporgetir(1,'.($gelen_sayfa +1).');">'.getTranslation('ajaxtumkuponlarim32').' »</a><a class="" href="javascript:;" id="sayfaveri" onclick="raporgetir(1,'.$sayfa_sayisi.');">'.getTranslation('ajaxtumkuponlarim33').'</a>' :'';
			echo '</nav></div>';
?>

</div>
</div>
</div>
</div>
</span>

<?php } else { ?>

<div class="space_9 clear"></div>

<div class="space_9 clear"></div>

<div class="new_sheet cf panelHead" style="margin-top: 0px;height: 25px;line-height: 25px;text-align: center;background: #fff;border-bottom: 3px solid #ef8107;border-top: 3px solid #ef8107;">
<?=getTranslation('ajaxbakiyeraporu1')?>
</div>

<?php } ?>

<table class="tablesorter">
<tbody><tr>
<th><?=getTranslation('ajaxbakiyeraporu17')?></th>
</tr>
<tr>
<td></td>
</tr>
<tr>
<td>
<div class="notice info">
<ul class="list-unordered list-checked2">
<li><?=getTranslation('ajaxbakiyeraporu18')?></li>
<li><?=getTranslation('ajaxbakiyeraporu19')?></li>
<li><?=getTranslation('ajaxbakiyeraporu20')?></li>
<li><?=getTranslation('ajaxbakiyeraporu21')?></li>
<li><?=getTranslation('ajaxbakiyeraporu22')?></li>
<li><?=getTranslation('ajaxbakiyeraporu23')?></li>
<li><?=getTranslation('ajaxbakiyeraporu24')?></li>
<li><?=getTranslation('ajaxbakiyeraporu25')?></li>
</ul>
</div>
</td>
</tr>
</tbody>
</table>
</div>

<?php }

if($a=="bakiyeraporum") {

$tarih1 = basla_time(gd("tarih1"));

$tarih2 = bitir_time(gd("tarih2"));

$islemtip = gd("islemtip");

$userid = $ub['id'];

$pageper = 50;

$gelen_sayfa = (isset($_GET['sayfa']) && $_GET['sayfa'] !='' ) ? intval($_GET['sayfa']) : 1;

if(!empty($islemtip)) { $islemtip_ekle = "and tip='$islemtip'"; } else { $islemtip_ekle = ""; }

//Sayfada kaç kayıt görünecek
$limit = $pageper;

//Kaç sayfa öncesi ve sonrası görünecek
$s_s = 10;

/*------------------------------------
Alan Başlıklarını ve $sonuc['alan1'] 
kısımlarını kendinize göre değiştirin
-------------------------------------*/


$sqladder_sayfalama = "user_id='$userid' and zaman between '$tarih1' and '$tarih2' $islemtip_ekle";

$s_sor = sed_sql_query("select count(id) from hesap_hareket where $sqladder_sayfalama") or trigger_error(mysql_error(),E_USER_ERROR);

$satir = sed_sql_result($s_sor,0);

sed_sql_freeresult($s_sor);

if($satir >0){//sonuç varsa

$baslama = ($gelen_sayfa > 1) ? (($gelen_sayfa -1) * $limit) : 0 ;

$sayfa_kac = $satir/$limit;

$sayfa_sayisi = ($satir % $limit != 0) ? intval($sayfa_kac)+1 : intval($sayfa_kac);

$basla=( $satir >= $baslama ) ? $baslama : 0 ;

unset( $sayfa_kac, $baslama );

$sqladderone = "user_id='$userid' and tip NOT IN ('casinoekle','casinocikar','casinoiptal') and zaman between '$tarih1' and '$tarih2' $islemtip_ekle order by zaman asc limit $basla,$limit";

$sor = sed_sql_query("select * from hesap_hareket where $sqladderone");

$i=1;

$style='';

if(sed_sql_numrows($sor)<1) { ?>

<div class="space_9 clear"></div>

<div class="space_9 clear"></div>

<div class="new_sheet cf panelHead" style="margin-top: 0px;height: 25px;line-height: 25px;text-align: center;background: #fff;border-bottom: 3px solid #ef8107;border-top: 3px solid #ef8107;">
<?=getTranslation('ajaxbakiyeraporu1')?>
</div>

<?php } else { ?>

<table class="tablesorter">
<tbody><tr>
<th><?=gd("tarih1");?> / <?=gd("tarih2");?> <?=getTranslation('ajaxbakiyeraporu2')?></th>
</tr>
</tbody>
</table>

<table id="tablesorter" class="tablesorter">
<thead>
<tr>
<th class="header">#</th>
<th class="header"><?=getTranslation('ajaxbakiyeraporu3')?></th>
<th class="header"><?=getTranslation('ajaxbakiyeraporu4')?></th>
<th class="header"><?=getTranslation('ajaxbakiyeraporu5')?></th>
<th class="header"><?=getTranslation('ajaxbakiyeraporu6')?></th>
<th class="header"><?=getTranslation('ajaxbakiyeraporu7')?></th>
<th class="header"><?=getTranslation('ajaxbakiyeraporu8')?></th>
<th class="header"><?=getTranslation('ajaxbakiyeraporu9')?></th>
</tr>
</thead>
<tbody>

<?php while($ass=sed_sql_fetcharray($sor)) {

if($ass['aciklama']=="Hesaptan Müşteriye"){
	$aciklama_ver = getTranslation('raporaciklama4');
} else if($ass['aciklama']=="Müşteriden Hesaba"){
	$aciklama_ver = getTranslation('raporaciklama5');
} else if($ass['aciklama']=="Müşteriye Aktarılan Bakiye"){
	$aciklama_ver = getTranslation('raporaciklama6');
} else if($ass['aciklama']=="Müşteriden Çekilen Bakiye"){
	$aciklama_ver = getTranslation('raporaciklama7');
} else if($ass['aciklama']=="Bahis Hesabından - Kasaya"){
	$aciklama_ver = getTranslation('raporaciklama8');
} else if($ass['aciklama']=="Kasa Hesabından - Bahis Hesabına"){
	$aciklama_ver = getTranslation('raporaciklama9');
} else if($ass['aciklama']=="Hesap açılırken eklendi."){
	$aciklama_ver = getTranslation('raporaciklama10');
} else if($ass['aciklama']=="Hesap açılırken eklendi"){
	$aciklama_ver = getTranslation('raporaciklama10');
} else if($ass['aciklama']=="Bahis Hesabından - Müşteriye"){
	$aciklama_ver = getTranslation('raporaciklama11');
} else if($ass['aciklama']=="Müşteriden - Bahis Hesabına"){
	$aciklama_ver = getTranslation('raporaciklama12');
} else if($ass['aciklama']=="Spor Bahisinden - Casinoya Aktarılan Bakiye"){
	$aciklama_ver = getTranslation('raporaciklama15');
} else if($ass['aciklama']=="Casinodan - Spor Bahisine Aktarılan Bakiye"){
	$aciklama_ver = getTranslation('raporaciklama16');
} else if($ass['aciklama']=="Casino Bahis Hesabından - Müşteriye"){
	$aciklama_ver = getTranslation('raporaciklama17');
} else if($ass['aciklama']=="Müşteriye Aktarılan Casino Bakiye"){
	$aciklama_ver = getTranslation('raporaciklama18');
} else if($ass['aciklama']=="Casino Bahis Hesabından - Yedek Admine"){
	$aciklama_ver = getTranslation('raporaciklama19');
} else if($ass['aciklama']=="Yedek Admine Aktarılan Casino Bakiye"){
	$aciklama_ver = getTranslation('raporaciklama20');
} else if($ass['aciklama']=="Casino Bahis Hesabından - Admine"){
	$aciklama_ver = getTranslation('raporaciklama21');
} else if($ass['aciklama']=="Admine Aktarılan Casino Bakiye"){
	$aciklama_ver = getTranslation('raporaciklama22');
} else if($ass['aciklama']=="Müşteriden - Casino Bahis Hesabına"){
	$aciklama_ver = getTranslation('raporaciklama23');
} else if($ass['aciklama']=="Yedek Adminden - Admin Hesabına"){
	$aciklama_ver = getTranslation('raporaciklama24');
} else if($ass['aciklama']=="Müşteriden - Yedek Admin Hesabına"){
	$aciklama_ver = getTranslation('raporaciklama25');
} else if($ass['aciklama']=="Süper Adminden - Admin Hesabına"){
	$aciklama_ver = getTranslation('raporaciklama26');
} else if($ass['aciklama']=="Yedek Admine Aktarılan Bakiye"){
	$aciklama_ver = getTranslation('raporaciklama27');
} else if($ass['aciklama']=="Bahis Hesabından - Yedek Admine"){
	$aciklama_ver = getTranslation('raporaciklama28');
} else {
	$aciklama_ver = $ass['aciklama'];
}

?>

<tr class="itext-<?php if($ass['tip']=="ekle"){ ?>1<?php } else if($ass['tip']=="cikar" || $ass['tip']=="bakiyecikar"){ ?>2<?php } else if($ass['iptal']=="ekle"){ ?>1<?php } ?> c">
<td><?=$ass['id'];?></td>
<td><?=$ass['username']; ?></td>
<td style="text-align:center;"><?php if($ass['tip']=="ekle") { ?><img src="/players/img/inout_1.png" alt="İşlem Türü" border="0"><?php } else if($ass['tip']=="cikar" || $ass['tip']=="bakiyecikar") { ?><img src="/players/img/inout_2.png" alt="İşlem Türü" border="0"><?php } else if($ass['tip']=="iptal") { ?><img src="/players/img/inout_1.png" alt="İşlem Türü" border="0"><?php } ?></td>
<td style="text-align:center;"><?=nf($ass['onceki_tutar']); ?></td>
<td style="text-align:center;"><?=nf($ass['tutar']); ?></td>
<td style="text-align:center;">

<?php if($ass['tip']=="ekle") { ?>

<?=nf($ass['onceki_tutar']+$ass['tutar']); ?>

<?php } else if($ass['tip']=="cikar" || $ass['tip']=="bakiyecikar") { ?>

<?=nf($ass['onceki_tutar']-$ass['tutar']); ?>

<?php } else if($ass['tip']=="iptal") { ?>

<?=nf($ass['onceki_tutar']+$ass['tutar']); ?>

<?php } ?>

</td>
<td style="text-align:center;"><font style="color:#000;"><?=date("d-m-Y",$ass['zaman']);?></font> <?=date("H:i:s",$ass['zaman']); ?></td>
<td class="l">
<?=$aciklama_ver;?>
</td>
</tr>

<?php } ?>

</tbody>
</table>

<div class="space_9"></div>
<div class="space"></div>

<span>
<div class="sheet_body_sub on cf">
<div class="main_box pager cf">
<div class="left" style="width: 100%">
<div class="div_center">

<?php 
$style = ($style=='') ? '2' : '';
$i++;
} ?>		

<?php 
		$hangi_sayfa= ($gelen_sayfa > 0)? $gelen_sayfa : 1 ;
		echo '<div class="inline" style="height: 38px;line-height: 24px;"><nav class="zipagin-light light-green">';	
	
	
			$alt= ($gelen_sayfa - $s_s);
			if($sayfa_sayisi <= $s_s || $gelen_sayfa <= $s_s ) {$alt=1;} 
			$ust= (($gelen_sayfa + $s_s)< $sayfa_sayisi ) ? ($gelen_sayfa + $s_s) : ($sayfa_sayisi);	
			echo ($gelen_sayfa > 1 )? '<a class="" href="javascript:;" onclick="raporgetir(1,1);" id="sayfaveri">'.getTranslation('ajaxtumkuponlarim30').'</a><a class="" href="javascript:;" id="sayfaveri" onclick="raporgetir(1,'.($gelen_sayfa -1).');">« '.getTranslation('ajaxtumkuponlarim31').'</a>':' ';
			for($i=$alt; $i<=$ust ;$i++){		
				echo ($i != $gelen_sayfa ) ? '<a class="" href="javascript:;" id="sayfaveri" onclick="raporgetir(1,'.$i.');">'.$i.'</a>' : '<span>'.$i.'</span>';
				}
			echo ($gelen_sayfa < $sayfa_sayisi)? '<a class="" href="javascript:;" id="sayfaveri" onclick="raporgetir(1,'.($gelen_sayfa +1).');">'.getTranslation('ajaxtumkuponlarim32').' »</a><a class="" href="javascript:;" id="sayfaveri" onclick="raporgetir(1,'.$sayfa_sayisi.');">'.getTranslation('ajaxtumkuponlarim33').'</a>' :'';
			echo '</nav></div>';
?>

</div>
</div>
</div>
</div>
</span>

<?php } else { ?>

<div class="space_9 clear"></div>

<div class="space_9 clear"></div>

<div class="new_sheet cf panelHead" style="margin-top: 0px;height: 25px;line-height: 25px;text-align: center;background: #fff;border-bottom: 3px solid #ef8107;border-top: 3px solid #ef8107;">
<?=getTranslation('ajaxbakiyeraporu1')?>
</div>

<?php } ?>

<table class="tablesorter">
<tbody><tr>
<th><?=getTranslation('ajaxbakiyeraporu17')?></th>
</tr>
<tr>
<td></td>
</tr>
<tr>
<td>
<div class="notice info">
<ul class="list-unordered list-checked2">
<li><?=getTranslation('ajaxkuponraporlari17')?></li>
<li><?=getTranslation('ajaxkuponraporlari18')?></li>
<li><?=getTranslation('ajaxkuponraporlari19')?></li>
<li><?=getTranslation('ajaxkuponraporlari20')?></li>
<li><?=getTranslation('ajaxkuponraporlari21')?></li>
<li><?=getTranslation('ajaxkuponraporlari22')?></li>
<li><?=getTranslation('ajaxkuponraporlari23')?></li>
<li><?=getTranslation('ajaxkuponraporlari24')?></li>
</ul>
</div>
</td>
</tr>
</tbody>
</table>
</div>

<br>
<br>

<?php }

if($a=="cbakiyeraporum") {

$tarih1 = basla_time(gd("tarih1"));

$tarih2 = bitir_time(gd("tarih2"));

$islemtip = gd("islemtip");

$userid = $ub['id'];

$pageper = 50;

$gelen_sayfa = (isset($_GET['sayfa']) && $_GET['sayfa'] !='' ) ? intval($_GET['sayfa']) : 1;

if(!empty($islemtip)) { $islemtip_ekle = "and tip='$islemtip'"; } else { $islemtip_ekle = ""; }

//Sayfada kaç kayıt görünecek
$limit = $pageper;

//Kaç sayfa öncesi ve sonrası görünecek
$s_s = 10;

/*------------------------------------
Alan Başlıklarını ve $sonuc['alan1'] 
kısımlarını kendinize göre değiştirin
-------------------------------------*/


$sqladder_sayfalama = "user_id='$userid' and zaman between '$tarih1' and '$tarih2' $islemtip_ekle";

$s_sor = sed_sql_query("select count(id) from hesap_hareket where $sqladder_sayfalama") or trigger_error(mysql_error(),E_USER_ERROR);

$satir = sed_sql_result($s_sor,0);

sed_sql_freeresult($s_sor);

if($satir >0){//sonuç varsa

$baslama = ($gelen_sayfa > 1) ? (($gelen_sayfa -1) * $limit) : 0 ;

$sayfa_kac = $satir/$limit;

$sayfa_sayisi = ($satir % $limit != 0) ? intval($sayfa_kac)+1 : intval($sayfa_kac);

$basla=( $satir >= $baslama ) ? $baslama : 0 ;

unset( $sayfa_kac, $baslama );

$sqladderone = "user_id='$userid' and tip NOT IN ('ekle','bakiyecikar','cikar','iptal') and zaman between '$tarih1' and '$tarih2' $islemtip_ekle order by zaman asc limit $basla,$limit";

$sor = sed_sql_query("select * from hesap_hareket where $sqladderone");

$i=1;

$style='';

if(sed_sql_numrows($sor)<1) { ?>

<div class="space_9 clear"></div>

<div class="space_9 clear"></div>

<div class="new_sheet cf panelHead" style="margin-top: 0px;height: 25px;line-height: 25px;text-align: center;background: #fff;border-bottom: 3px solid #ef8107;border-top: 3px solid #ef8107;">
<?=getTranslation('ajaxbakiyeraporu1')?>
</div>

<?php } else { ?>

<table class="tablesorter">
<tbody><tr>
<th><?=gd("tarih1");?> / <?=gd("tarih2");?> <?=getTranslation('ajaxbakiyeraporu2')?></th>
</tr>
</tbody>
</table>

<table id="tablesorter" class="tablesorter">
<thead>
<tr>
<th class="header">#</th>
<th class="header"><?=getTranslation('ajaxbakiyeraporu3')?></th>
<th class="header"><?=getTranslation('ajaxbakiyeraporu4')?></th>
<th class="header"><?=getTranslation('ajaxbakiyeraporu5')?></th>
<th class="header"><?=getTranslation('ajaxbakiyeraporu6')?></th>
<th class="header"><?=getTranslation('ajaxbakiyeraporu7')?></th>
<th class="header"><?=getTranslation('ajaxbakiyeraporu8')?></th>
<th class="header"><?=getTranslation('ajaxbakiyeraporu9')?></th>
</tr>
</thead>
<tbody>

<?php while($ass=sed_sql_fetcharray($sor)) {

if($ass['aciklama']=="Hesaptan Müşteriye"){
	$aciklama_ver = getTranslation('raporaciklama4');
} else if($ass['aciklama']=="Müşteriden Hesaba"){
	$aciklama_ver = getTranslation('raporaciklama5');
} else if($ass['aciklama']=="Müşteriye Aktarılan Bakiye"){
	$aciklama_ver = getTranslation('raporaciklama6');
} else if($ass['aciklama']=="Müşteriden Çekilen Bakiye"){
	$aciklama_ver = getTranslation('raporaciklama7');
} else if($ass['aciklama']=="Bahis Hesabından - Kasaya"){
	$aciklama_ver = getTranslation('raporaciklama8');
} else if($ass['aciklama']=="Kasa Hesabından - Bahis Hesabına"){
	$aciklama_ver = getTranslation('raporaciklama9');
} else if($ass['aciklama']=="Hesap açılırken eklendi."){
	$aciklama_ver = getTranslation('raporaciklama10');
} else if($ass['aciklama']=="Hesap açılırken eklendi"){
	$aciklama_ver = getTranslation('raporaciklama10');
} else if($ass['aciklama']=="Bahis Hesabından - Müşteriye"){
	$aciklama_ver = getTranslation('raporaciklama11');
} else if($ass['aciklama']=="Müşteriden - Bahis Hesabına"){
	$aciklama_ver = getTranslation('raporaciklama12');
} else if($ass['aciklama']=="Spor Bahisinden - Casinoya Aktarılan Bakiye"){
	$aciklama_ver = getTranslation('raporaciklama15');
} else if($ass['aciklama']=="Casinodan - Spor Bahisine Aktarılan Bakiye"){
	$aciklama_ver = getTranslation('raporaciklama16');
} else if($ass['aciklama']=="Casino Bahis Hesabından - Müşteriye"){
	$aciklama_ver = getTranslation('raporaciklama17');
} else if($ass['aciklama']=="Müşteriye Aktarılan Casino Bakiye"){
	$aciklama_ver = getTranslation('raporaciklama18');
} else if($ass['aciklama']=="Casino Bahis Hesabından - Yedek Admine"){
	$aciklama_ver = getTranslation('raporaciklama19');
} else if($ass['aciklama']=="Yedek Admine Aktarılan Casino Bakiye"){
	$aciklama_ver = getTranslation('raporaciklama20');
} else if($ass['aciklama']=="Casino Bahis Hesabından - Admine"){
	$aciklama_ver = getTranslation('raporaciklama21');
} else if($ass['aciklama']=="Admine Aktarılan Casino Bakiye"){
	$aciklama_ver = getTranslation('raporaciklama22');
} else if($ass['aciklama']=="Müşteriden - Casino Bahis Hesabına"){
	$aciklama_ver = getTranslation('raporaciklama23');
} else if($ass['aciklama']=="Yedek Adminden - Admin Hesabına"){
	$aciklama_ver = getTranslation('raporaciklama24');
} else if($ass['aciklama']=="Müşteriden - Yedek Admin Hesabına"){
	$aciklama_ver = getTranslation('raporaciklama25');
} else if($ass['aciklama']=="Süper Adminden - Admin Hesabına"){
	$aciklama_ver = getTranslation('raporaciklama26');
} else if($ass['aciklama']=="Yedek Admine Aktarılan Bakiye"){
	$aciklama_ver = getTranslation('raporaciklama27');
} else if($ass['aciklama']=="Bahis Hesabından - Yedek Admine"){
	$aciklama_ver = getTranslation('raporaciklama28');
} else {
	$aciklama_ver = $ass['aciklama'];
}

?>

<tr class="itext-<?php if($ass['tip']=="casinoekle"){ ?>1<?php } else if($ass['tip']=="casinocikar"){ ?>2<?php } else if($ass['tip']=="casinoiptal"){ ?>1<?php } ?> c">
<td><?=$ass['id'];?></td>
<td><?=$ass['username']; ?></td>
<td style="text-align:center;"><?php if($ass['tip']=="casinoekle") { ?><img src="/players/img/inout_1.png" alt="İşlem Türü" border="0"><?php } else if($ass['tip']=="casinocikar") { ?><img src="/players/img/inout_2.png" alt="İşlem Türü" border="0"><?php } else if($ass['tip']=="casinoiptal") { ?><img src="/players/img/inout_1.png" alt="İşlem Türü" border="0"><?php } ?></td>
<td style="text-align:center;"><?=nf($ass['onceki_tutar']); ?></td>
<td style="text-align:center;"><?=nf($ass['tutar']); ?></td>
<td style="text-align:center;">

<?php if($ass['tip']=="casinoekle") { ?>

<?=nf($ass['onceki_tutar']+$ass['tutar']); ?>

<?php } else if($ass['tip']=="casinocikar") { ?>

<?=nf($ass['onceki_tutar']-$ass['tutar']); ?>

<?php } else if($ass['tip']=="casinoiptal") { ?>

<?=nf($ass['onceki_tutar']+$ass['tutar']); ?>

<?php } ?>

</td>
<td style="text-align:center;"><font style="color:#000;"><?=date("d-m-Y",$ass['zaman']);?></font> <?=date("H:i:s",$ass['zaman']); ?></td>
<td class="l">
<?=$aciklama_ver;?>
</td>
</tr>

<?php } ?>

</tbody>
</table>

<div class="space_9"></div>
<div class="space"></div>

<span>
<div class="sheet_body_sub on cf">
<div class="main_box pager cf">
<div class="left" style="width: 100%">
<div class="div_center">

<?php 
$style = ($style=='') ? '2' : '';
$i++;
} ?>		

<?php 
		$hangi_sayfa= ($gelen_sayfa > 0)? $gelen_sayfa : 1 ;
		echo '<div class="inline" style="height: 38px;line-height: 24px;"><nav class="zipagin-light light-green">';	
	
	
			$alt= ($gelen_sayfa - $s_s);
			if($sayfa_sayisi <= $s_s || $gelen_sayfa <= $s_s ) {$alt=1;} 
			$ust= (($gelen_sayfa + $s_s)< $sayfa_sayisi ) ? ($gelen_sayfa + $s_s) : ($sayfa_sayisi);	
			echo ($gelen_sayfa > 1 )? '<a class="" href="javascript:;" onclick="raporgetir(1,1);" id="sayfaveri">'.getTranslation('ajaxtumkuponlarim30').'</a><a class="" href="javascript:;" id="sayfaveri" onclick="raporgetir(1,'.($gelen_sayfa -1).');">« '.getTranslation('ajaxtumkuponlarim31').'</a>':' ';
			for($i=$alt; $i<=$ust ;$i++){		
				echo ($i != $gelen_sayfa ) ? '<a class="" href="javascript:;" id="sayfaveri" onclick="raporgetir(1,'.$i.');">'.$i.'</a>' : '<span>'.$i.'</span>';
				}
			echo ($gelen_sayfa < $sayfa_sayisi)? '<a class="" href="javascript:;" id="sayfaveri" onclick="raporgetir(1,'.($gelen_sayfa +1).');">'.getTranslation('ajaxtumkuponlarim32').' »</a><a class="" href="javascript:;" id="sayfaveri" onclick="raporgetir(1,'.$sayfa_sayisi.');">'.getTranslation('ajaxtumkuponlarim33').'</a>' :'';
			echo '</nav></div>';
?>

</div>
</div>
</div>
</div>
</span>

<?php } else { ?>

<div class="space_9 clear"></div>

<div class="space_9 clear"></div>

<div class="new_sheet cf panelHead" style="margin-top: 0px;height: 25px;line-height: 25px;text-align: center;background: #fff;border-bottom: 3px solid #ef8107;border-top: 3px solid #ef8107;">
<?=getTranslation('ajaxbakiyeraporu1')?>
</div>

<?php } ?>

<table class="tablesorter">
<tbody><tr>
<th><?=getTranslation('ajaxbakiyeraporu17')?></th>
</tr>
<tr>
<td></td>
</tr>
<tr>
<td>
<div class="notice info">
<ul class="list-unordered list-checked2">
<li><?=getTranslation('ajaxkuponraporlari17')?></li>
<li><?=getTranslation('ajaxkuponraporlari18')?></li>
<li><?=getTranslation('ajaxkuponraporlari19')?></li>
<li><?=getTranslation('ajaxkuponraporlari20')?></li>
<li><?=getTranslation('ajaxkuponraporlari21')?></li>
<li><?=getTranslation('ajaxkuponraporlari22')?></li>
<li><?=getTranslation('ajaxkuponraporlari23')?></li>
<li><?=getTranslation('ajaxkuponraporlari24')?></li>
</ul>
</div>
</td>
</tr>
</tbody>
</table>
</div>

<br>
<br>

<?php }

if($a=="hesaprapor") {

$tarih1 = basla_time(gd("tarih1"));

$tarih2 = bitir_time(gd("tarih2"));

$satir = gd("satir");

$durum = gd("durum");

$tip = gd("tip");

$hesapdurum = 1;

$userid = gd("userid");

$benimbayilerim = benimbayilerim($ub['id']);

$bayi_array = explode(",",$benimbayilerim);


if(strstr($userid,"-plus")) { 

$idbul = explode("-",$userid); $idalti = $idbul[0]; 

$onunkiler = benimbayilerim($idalti);

$userid = $idalti;

} 





if(!empty($userid) && in_array($userid,$bayi_array)) { 

if($onunkiler) {

	$user_ekle = "user_id in ($onunkiler)";

} else {

	$user_ekle = "user_id='$userid'"; 

}

} else { 

$user_ekle = "user_id in ($benimbayilerim)"; 

}

if(!empty($satir)) {

if($satir==3) { $satir_ekle = "and toplam_mac>2"; } else

if($satir==1 || $satir==2) { $satir_ekle = "and toplam_mac='$satir'"; }	

} else {

$satir_ekle = "";	

}

if(!empty($tip)) {

if($tip=="1") { $tip_ekle = "and canli='0'"; } else

if($tip=="2") { $tip_ekle = "and canli='1'"; }	

} else {

$tip_ekle = "";	

}

if($hesapdurum=="1") { $hesap_ekle = "and hesap_kesim_zaman=''"; } else { $hesap_ekle = ""; }

$sqladderone = "$user_ekle and kupon_time between '$tarih1' and '$tarih2' $hesap_ekle $satir_ekle $tip_ekle group by kupon_tarihi_belirle order by kupon_time asc";

$sor = sed_sql_query("select * from kuponlar where $sqladderone");

if(sed_sql_numrows($sor)<1) { ?>

<div class="space_9 clear"></div>

<div class="space_9 clear"></div>

<div class="new_sheet cf panelHead" style="margin-top: 0px;height: 25px;line-height: 25px;text-align: center;background: #fff;border-bottom: 3px solid #ef8107;border-top: 3px solid #ef8107;">
<?=getTranslation('ajaxhesaprapor1')?>
</div>

<?php } else { ?>

<table id="tablesorter" class="tablesorter">
<thead>
<tr>
<th class="header"><?=getTranslation('ajaxhesaprapor2')?></th>
<th class="header"><?=getTranslation('ajaxhesaprapor3')?></th>
<th class="header"><?=getTranslation('ajaxhesaprapor4')?></th>
<th class="header"><?=getTranslation('ajaxhesaprapor5')?></th>
<th class="header"><?=getTranslation('ajaxhesaprapor4')?></th>
<th class="header"><?=getTranslation('ajaxhesaprapor7')?></th>
<th class="header"><?=getTranslation('ajaxhesaprapor4')?></th>
<th class="header"><?=getTranslation('ajaxhesaprapor9')?></th>
<th class="header"><?=getTranslation('ajaxhesaprapor4')?></th>
<th class="header"><?=getTranslation('ajaxhesaprapor11')?></th></tr>
</thead>
<tbody>

<?php 

while($ass=sed_sql_fetcharray($sor)) { 



$sqladder = "$user_ekle and kupon_time between '$tarih1' and '$tarih2' $hesap_ekle $satir_ekle $tip_ekle and kupon_tarihi_belirle='$ass[kupon_tarihi_belirle]'";

// toplam yatırılan

$toplam_odenen = bilgi("select SUM(yatan) as toplam from kuponlar where $sqladder");

$toplam_odenen_adet = sed_sql_numrows(sed_sql_query("select * from kuponlar where $sqladder"));

$top_odenen = $top_odenen+$toplam_odenen['toplam'];

$top_odenen_adet = $top_odenen_adet+$toplam_odenen_adet;

// toplam kazanan

$toplam_kazanan = bilgi("select SUM(tutar) as toplam from kuponlar where $sqladder and durum='2'");

$toplam_kazanan_adet = sed_sql_numrows(sed_sql_query("select * from kuponlar where $sqladder and durum='2'"));

$top_kazanan = $top_kazanan+$toplam_kazanan['toplam'];

$top_kazanan_adet = $top_kazanan_adet+$toplam_kazanan_adet;

// toplam kaybeden

$toplam_kaybeden = bilgi("select SUM(yatan) as toplam from kuponlar where $sqladder and durum='3'");

$toplam_kaybeden_adet = sed_sql_numrows(sed_sql_query("select * from kuponlar where $sqladder and durum='3'"));

$top_kaybeden = $top_kaybeden+$toplam_kaybeden['toplam'];

$top_kaybeden_adet = $top_kaybeden_adet+$toplam_kaybeden_adet;

// toplam devam

$toplam_devam = bilgi("select SUM(yatan) as toplam from kuponlar where $sqladder and durum='1'");

$toplam_devam_adet = sed_sql_numrows(sed_sql_query("select * from kuponlar where $sqladder and durum='1'"));

$top_devam = $top_devam+$toplam_devam['toplam'];

$top_devam_adet = $top_devam_adet+$toplam_devam_adet;

// toplam iptal

$toplam_iptal = bilgi("select SUM(yatan) as toplam from kuponlar where $sqladder and durum='4'");

$toplam_iptal_adet = sed_sql_numrows(sed_sql_query("select * from kuponlar where $sqladder and durum='4'"));

$top_iptal = $top_iptal+$toplam_iptal['toplam'];

$top_iptal_adet = $top_iptal_adet+$toplam_iptal_adet;


$satir_toplam = $toplam_odenen['toplam']-$toplam_iptal['toplam']-$toplam_kazanan['toplam']-$toplam_devam['toplam'];

$satir_toplam_genel = $satir_toplam_genel+$satir_toplam;



?>



<tr class="itext-3 c">
<td><?=$ass['kupon_tarih']; ?></td>
<td><?=nf($toplam_odenen['toplam']-$toplam_iptal['toplam']); ?></td>
<td><?=$toplam_odenen_adet;?></td>
<td class="itext-1"><?=nf($toplam_kazanan['toplam']); ?></td>
<td class="itext-1"><?=$toplam_kazanan_adet;?></td>
<td class="itext-2"><?=nf($toplam_kaybeden['toplam']); ?></td>
<td class="itext-2"><?=$toplam_kaybeden_adet;?></td>
<td><?=nf($toplam_devam['toplam']); ?></td>
<td><?=$toplam_devam_adet;?></td>
<td class="itext-<?php if($satir_toplam<0) { echo "2"; } else { echo "1"; } ?>"><?=nf($satir_toplam);?></td>
</tr>


<?php } ?>

</tbody>
<tfoot>
<tr class="itext-3 c">
<th style="text-align: left;"><?=getTranslation('ajaxhesaprapor12')?></th>
<th style="text-align: left;"><?=nf($top_odenen-$top_iptal);?></th>
<th style="text-align: left;"><?=$top_odenen_adet;?></th>
<th style="text-align: left;" class="itext-1"><?=nf($top_kazanan);?></th>
<th style="text-align: left;" class="itext-1"><?=$top_kazanan_adet;?></th>
<th style="text-align: left;" class="itext-2"><?=nf($top_kaybeden);?></th>
<th style="text-align: left;" class="itext-2"><?=$top_kaybeden_adet;?></th>
<th style="text-align: left;"><?=nf($top_devam);?></th>
<th style="text-align: left;"><?=$top_devam_adet;?></th>
<th style="text-align: left;" class="itext-<?php if($satir_toplam_genel<0) { echo "2"; } else { echo "1"; } ?>"><?=nf($satir_toplam_genel);?></th>
</tr></tfoot>
</table>

<script type='text/javascript'>
var chart = AmCharts.makeChart("chartdiv1", {
  "type": "serial",
  "theme": "light",
  "dataProvider": [{
    "country": "<?=getTranslation('ajaxtumkuponlarim4')?>",
    "visits": <?=$top_devam_adet;?>,
	"renk": "#999999"
  }, {
    "country": "<?=getTranslation('ajaxtumkuponlarim3')?>",
    "visits": <?=$top_kaybeden_adet;?>,
	"renk": "#FF0F00"
  }, {
    "country": "<?=getTranslation('ajaxtumkuponlarim2')?>",
    "visits": <?=$top_kazanan_adet;?>,
	"renk": "#04D215"
  }, {
    "country": "<?=getTranslation('ajaxtumkuponlarim5')?>",
    "visits": <?=$top_iptal_adet;?>,
	"renk": "#2A0CD0"
  }],
  "graphs": [{
    "fillAlphas": 0.9,
    "lineAlpha": 0.2,
    "type": "column",
	"colorField": "renk",
    "valueField": "visits",
	"balloonText": "[[category]]: [[value]] <?=getTranslation('ajaxhesaprapor4')?>"
  }],
  "categoryField": "country"
});

var chart = AmCharts.makeChart("chartdiv2", {
  "type": "serial",
  "theme": "light",
  "dataProvider": [{
    "country": "<?=getTranslation('ajaxtumkuponlarim4')?>",
    "visits": <?=nf($top_devam);?>,
	"renk": "#999999"
  }, {
    "country": "<?=getTranslation('ajaxtumkuponlarim3')?>",
    "visits": <?=nf($top_kaybeden);?>,
	"renk": "#FF0F00"
  }, {
    "country": "<?=getTranslation('ajaxtumkuponlarim2')?>",
    "visits": <?=nf($top_kazanan);?>,
	"renk": "#04D215"
  }, {
    "country": "<?=getTranslation('ajaxtumkuponlarim5')?>",
    "visits": <?=nf($top_iptal);?>,
	"renk": "#2A0CD0"
  }],
  "graphs": [{
    "fillAlphas": 0.9,
    "lineAlpha": 0.2,
    "type": "column",
	"colorField": "renk",
    "valueField": "visits",
	"balloonText": "[[category]]: [[value]] K"
  }],
  "categoryField": "country"
});
</script>

<table class="tablesorter">
<thead>
<tr>
<th><?=getTranslation('ajaxhesaprapor13')?></th>
</tr>
</thead>
<tbody>
<tr>
<td><div id="chartdiv1" style="width: 100%; height: 355px;"></div></td>
</tr>
<tr>
<th><?=getTranslation('ajaxhesaprapor14')?></th>
</tr>
<tr>
<td><div id="chartdiv2" style="width: 100%; height: 355px;"></div></td>
</tr>
</tbody>
</table>

<div class="space_9"></div>
<div class="space"></div>

<?php } ?>

<table class="tablesorter">
<tr>
<th><?=getTranslation('ajaxhesaprapor15')?></th>
</tr>
<tr>
<td></td>
</tr>
<tr>
<td>
<div class="notice info">
<ul class="list-unordered list-checked2">
<li><?=getTranslation('ajaxhesaprapor16')?></li>
<li><?=getTranslation('ajaxhesaprapor17')?></li>
<li><?=getTranslation('ajaxhesaprapor18')?></li>
<li><?=getTranslation('ajaxhesaprapor19')?></li>
<li><?=getTranslation('ajaxhesaprapor20')?></li>
<li><?=getTranslation('ajaxhesaprapor21')?></li>
</ul>
</div>
</td>
</tr>
</table>

<?php }

if($a=="komisyonraporu") {

$tarih1 = basla_time(gd("tarih1"));

$tarih2 = bitir_time(gd("tarih2"));

$satir = gd("satir");

$tip = gd("tip");

if(!empty($satir)) {

if($satir=="kombine") { $satir_ekle = "and toplam_mac>1"; } else

if($satir==3) { $satir_ekle = "and toplam_mac>2"; } else

if($satir==1 || $satir==2) { $satir_ekle = "and toplam_mac='$satir'"; }	

} else {

$satir_ekle = "";	

}

if(!empty($durum)) { $durum_ekle = "and durum='$durum'"; } else { $durum_ekle = ""; }

if(!empty($tip)) {

if($tip=="1") { $tip_ekle = "and canli='0'"; } else

if($tip=="2") { $tip_ekle = "and canli='1'"; }	

} else {

$tip_ekle = "";	

}

$userid = gd("useri");

$benimbayilerim = benimbayilerim($ub['id']);

$bayi_array = explode(",",$benimbayilerim);


if(strstr($userid,"-plus")) { 

$idbul = explode("-",$userid); $idalti = $idbul[0]; 

$onunkiler = benimbayilerim($idalti);

$userid = $idalti;

} 

if(!empty($userid) && in_array($userid,$bayi_array)) { 

if($onunkiler) {

	$user_ekle = "and user_id in ($onunkiler)";

} else {

	$user_ekle = "and user_id='$userid'"; 

}

} else { 

$user_ekle = "and user_id in ($benimbayilerim)"; 

}

$genelbayilerim = benimbayilerim($ub['id']);

$bayi_array = explode(",",$genelbayilerim);



if(!in_array($useri,$bayi_array) && $useri!="") { die("<div class='bos'>Yetkisiz bir işlem.</div>"); }





$sqladderf = "kupon_time between '$tarih1' and '$tarih2' $user_ekle $tip_ekle $satir_ekle and hesap_kesim_zaman=''";





$sor = sed_sql_query("select * from kuponlar where $sqladderf group by user_id order by username asc");

if(sed_sql_numrows($sor)<1) { ?>

<div class="space_9 clear"></div>

<div class="space_9 clear"></div>

<div class="new_sheet cf panelHead" style="margin-top: 0px;height: 25px;line-height: 25px;text-align: center;background: #fff;border-bottom: 3px solid #ef8107;border-top: 3px solid #ef8107;">
<?=getTranslation('ajaxkomisyonraporu1')?>
</div>

<?php } else { ?>

<table id="tablesorter" class="tablesorter">
<thead>
<tr>
<th colspan="12" class="header"><?=date("d-m-Y",$tarih1);?> / <?=date("d-m-Y",$tarih2);?> <?=getTranslation('ajaxkomisyonraporu2')?></th>
</tr>
<tr>
<th class="header"><?=getTranslation('ajaxkomisyonraporu3')?></th>
<th class="header"><?=getTranslation('ajaxkomisyonraporu4')?></th>
<th class="header"><?=getTranslation('ajaxkomisyonraporu5')?></th>
<th class="header"><?=getTranslation('ajaxkomisyonraporu6')?></th>
<th class="header"><?=getTranslation('ajaxkomisyonraporu7')?></th>
<th class="header"><?=getTranslation('ajaxkomisyonraporu8')?></th>
<th class="header"><?=getTranslation('ajaxkomisyonraporu9')?></th>
<th class="header"><?=getTranslation('ajaxkomisyonraporu10')?></th>
<th class="header"><?=getTranslation('ajaxkomisyonraporu11')?></th>
<th class="header"><?=getTranslation('ajaxkomisyonraporu12')?></th>
<th colspan="2" class="header"></th>
</tr>
</thead>

<?php

while($row=sed_sql_fetcharray($sor)) {



$userim = bilgi("select * from kullanici where id='$row[user_id]'");

	

$sqladder = "kupon_time between '$tarih1' and '$tarih2' and user_id='$row[user_id]' $tip_ekle $satir_ekle and hesap_kesim_zaman=''";



$toplams = bilgi("SELECT 

	   SUM(CASE WHEN id!='' THEN yatan END) as toplam_odenen,

	   COUNT(CASE WHEN id!='' THEN id END) as toplam_odenen_adet,

       SUM(CASE WHEN durum='2' THEN tutar END) as toplam_kazanan,

	   COUNT(CASE WHEN durum='2' THEN id END) as toplam_kazanan_adet,

	   SUM(CASE WHEN durum='3' THEN yatan END) as toplam_kaybeden,

	   COUNT(CASE WHEN durum='3' THEN id END) as toplam_kaybeden_adet,

	   SUM(CASE WHEN durum='1' THEN yatan END) as toplam_devam,

	   COUNT(CASE WHEN durum='1' THEN id END) as toplam_devam_adet,

	   SUM(CASE WHEN durum='4' THEN yatan END) as toplam_iptal,

	   COUNT(CASE WHEN durum='4' THEN id END) as toplam_iptal_adet

  FROM kuponlar WHERE $sqladder");



// toplam yatırılan

$toplam_odenen_adet = $toplams['toplam_odenen_adet'];

$top_odenen = $top_odenen+$toplams['toplam_odenen'];

$top_odenen_adet = $top_odenen_adet+$toplam_odenen_adet;

// toplam kazanan

$toplam_kazanan_adet = $toplams['toplam_kazanan_adet'];

$top_kazanan = $top_kazanan+$toplams['toplam_kazanan'];

$top_kazanan_adet = $top_kazanan_adet+$toplam_kazanan_adet;

// toplam kaybeden

$toplam_kaybeden_adet = $toplams['toplam_kaybeden_adet'];

$top_kaybeden = $top_kaybeden+$toplams['toplam_kaybeden'];

$top_kaybeden_adet = $top_kaybeden_adet+$toplam_kaybeden_adet;

// toplam devam

$toplam_devam_adet = $toplams['toplam_devam_adet'];

$top_devam = $top_devam+$toplams['toplam_devam'];

$top_devam_adet = $top_devam_adet+$toplam_devam_adet;

// toplam iptal

$toplam_iptal_adet = $toplams['toplam_iptal_adet'];

$top_iptal = $top_iptal+$toplams['toplam_iptal'];

$top_iptal_adet = $top_iptal_adet+$toplam_iptal_adet;





// toplamlar.

$satir_toplam = $toplams['toplam_odenen']-$toplams['toplam_iptal']-$toplams['toplam_kazanan']-$toplams['toplam_devam'];

$satir_toplam_genel = $satir_toplam_genel+$satir_toplam;



?>


<tr class="itext-3 c" style="text-align: center;">
<td><?=$row['username']; ?></td>
<td><?=n($toplam_odenen_adet-$toplam_iptal_adet);?></td>
<td><?=nf($toplams['toplam_odenen']-$toplams['toplam_iptal']); ?></td>
<td class="itext-1"><?=nf($toplams['toplam_kazanan']); ?></td>
<td class="itext-2"><?=nf($toplams['toplam_kaybeden']); ?></td>
<td><?=nf($toplams['toplam_devam']); ?></td>
<td class="itext-<?php if($satir_toplam<0) { echo "2"; } else { echo "1"; } ?>"><?=nf($satir_toplam);?></td>

<td><?php 



if($teklibayi) { echo "Toplamda"; } else {

if($userim['n_calisma_sekli']=="1") { echo "".getTranslation('ajaxkomisyonraporu13')." %$userim[komisyon]"; } else

if($userim['n_calisma_sekli']=="2") { echo "".getTranslation('ajaxkomisyonraporu14')." %$userim[komisyon]"; }



if($userim['wkdurum']=="1") {echo "($userim[hesap_sahibi_user])"; } 

}

?></td>

<td class="itext-<?php if($satir_toplam<0) { echo "2"; } else { echo "1"; } ?>"><?=nf($satir_toplam);?></td>

<td><?php 



if($userim['n_calisma_sekli']=="1" && $userim['n_komisyon']>0 && $satir_toplam>0) {

$yuzdecarp = carpan($userim['n_komisyon']);

$gelen = $satir_toplam*$yuzdecarp;

} else 

if($userim['n_calisma_sekli']=="2" && $userim['n_komisyon']>0 && $toplams['toplam_odenen']>0) {

$yuzdecarp = carpan($userim['n_komisyon']);

$gelen = $toplam_odenen['toplam']*$yuzdecarp;

} else 

if($userim['n_calisma_sekli']=="3" && $userim['n_komisyon']>0 && $toplams['toplam_kazanan']>0) {

$yuzdecarp = carpan($userim['n_komisyon']);

$gelen = $toplams['toplam_kazanan']*$yuzdecarp;

} else {

$gelen = "0";	

}

if($teklibayi) { echo "Toplamda"; } else {

echo nf($gelen);

}

$kom_top = $kom_top+$gelen;



$net = $satir_toplam-$gelen; 

$net_top = $net_top+$net;





?></td>

<td width="16">
<a class="grid" href="profil.php?userid=<?=$userim['id'];?>" title="Düzenle">
<img src="/players/img/edit.png" alt="Düzenle" border="0">
</a>
</td>
<td width="16">
<a class="grid" href="bayiduzenle.php?id=<?=$userim['id'];?>" title="Profil">
<img src="/players/img/members.png" alt="Profil" border="0">
</a>
</td>

</tr>

<?php } ?>
</tbody>
<tfoot>
<tr class="itext-3 c">
<th style="text-align: center;"><?=getTranslation('ajaxkomisyonraporu15')?></th>
<th style="text-align: center;"><?=n($top_odenen_adet-$top_iptal_adet);?></th>
<th style="text-align: center;"><?=nf($top_odenen-$top_iptal);?></th>
<th style="text-align: center;" class="itext-1"><?=nf($top_kazanan);?></th>
<th style="text-align: center;" class="itext-2"><?=nf($top_kaybeden);?></th>
<th style="text-align: center;"><?=nf($top_devam);?></th>
<th style="text-align: center;" class="itext-<?php if($satir_toplam_genel<0) { echo "2"; } else { echo "1"; } ?>"><?=nf($satir_toplam_genel);?></th>

<th style="text-align: center;"><?php if($teklibayi) { ?>



<?php

if($ouser['n_calisma_sekli']=="1") { echo "Kasadan %$ouser[n_komisyon]"; } else

if($ouser['n_calisma_sekli']=="2") { echo "Yatandan %$ouser[n_komisyon]"; } 

?>



<?php } ?></th>

<th style="text-align: center;" class="itext-<?php if($net_top<0) {echo "2"; } else { echo "1"; } ?>"><?=nf($net_top);?></th>

<th style="text-align: center;"><?



if($teklibayi) {

if($ouser['n_calisma_sekli']=="1" && $ouser['n_komisyon']>0 && $satir_toplam_genel>0) {

$yuzdecarp = carpan($ouser['n_komisyon']);

$gelen = $satir_toplam_genel*$yuzdecarp;

} else 

if($ouser['n_calisma_sekli']=="2" && $ouser['n_komisyon']>0 && ($top_odenen-$top_iptal)>0) {

$yuzdecarp = carpan($ouser['n_komisyon']);

$gelen = ($top_odenen-$top_iptal)*$yuzdecarp;

} else {

$gelen = "0";	

}

echo nf($gelen);

}



if($teklibayi) {

	$net_top = $satir_toplam_genel-$gelen;

}



?></th>

<th style="text-align: center;" class="itext-1"></th>
<th style="text-align: center;" class="itext-1"></th>

</tr>
</tfoot>
</table>

<?php } ?>

<table class="tablesorter">
<tbody><tr>
<th><?=getTranslation('ajaxkomisyonraporu16')?></th>
</tr>
<tr>
<td></td>
</tr>
<tr>
<td>
<div class="notice info">
<ul class="list-unordered list-checked2">
<li><?=getTranslation('ajaxkomisyonraporu17')?></li>
<li><?=getTranslation('ajaxkomisyonraporu18')?></li>
<li><?=getTranslation('ajaxkomisyonraporu19')?></li>
<li><?=getTranslation('ajaxkomisyonraporu20')?></li>
<li><?=getTranslation('ajaxkomisyonraporu21')?></li>
<li><?=getTranslation('ajaxkomisyonraporu22')?></li>
</ul>
</div>
</td>
</tr>
</tbody></table>

<br>
<br>

<?php }

if($a=="bayidurumdegis") {

$id = gd("id");

$durum = gd("durum");

$bayilerim = "".benimbayilerim($ub['id']).",$id";

$bayi_array = explode(",",$bayilerim);

if(!in_array($id,$bayi_array)) { die("22"); }

bayidurumdegis($id,$durum);

}


if($a=="spordallaridurumdegis") {

$id = gd("id");

$sportipi = gd("sportipi");

$durum = gd("durum");

sed_sql_query("update sistemayar set $sportipi='$durum' where ayar_id='$id'");

}

function uyelerisilsuperbayi($id,$kendibilgisi) {
$bilgisi = bilgi("select * from kullanici where id='$id'");
$kendibilgisi = bilgi("select * from kullanici where id='$kendibilgisi'");
$rand = time();
$bakiye_ekle = $bilgisi['bakiye']+$kendibilgisi['bakiye'];
sed_sql_query("update kullanici set bakiye='".$bakiye_ekle."' where id='".$kendibilgisi['id']."'");
sed_sql_query("update kullanici set bakiye='0',root='1',silinme_tarihi='".time()."' where id='".$bilgisi['id']."'");
}

if($a=="bayisilsuperbayi") {

$id = gd("id");

$bayilerim = benimbayilerim($ub['id']);

$bayi_array = explode(",",$bayilerim);
if($ub['bayisilmeyetki']!="1"){die("Bayi silme yetkiniz bulunmamakta");}
if(!in_array($id,$bayi_array)) { die("<div class='bos'>Cok guzel hareketler bunlar ;*</div>"); }

uyelerisilsuperbayi($id,$ub['id']);

if(file_exists("sistem/natoservers/hesap_sahibi_id_".$ub['id'].".xml")) {

unlink("sistem/natoservers/hesap_sahibi_id_".$ub['id'].".xml");

benimbayilerim($ub['id']);

}

}

if($a=="bayisil") {

$id = gd("id");

$bayilerim = benimbayilerim($ub['id']);

$bayi_array = explode(",",$bayilerim);
if($ub['bayisilmeyetki']!="1"){die("Bayi silme yetkiniz bulunmamakta");}
if(!in_array($id,$bayi_array)) { die("<div class='bos'>Cok guzel hareketler bunlar ;*</div>"); }

uyelerisil($id);

if(file_exists("sistem/natoservers/hesap_sahibi_id_".$ub['id'].".xml")) {

unlink("sistem/natoservers/hesap_sahibi_id_".$ub['id'].".xml");

benimbayilerim($ub['id']);

}

}

if($a=="bayiler") {

$id = gd("id");

if($id=="1" && $ub['id']!="1") { die("..."); }

$bayilerim = benimbayilerim($ub['id']);

$bayi_array = explode(",",$bayilerim);

if(!in_array($id,$bayi_array)) { die("<div class='bos'>Bu yetkiye <strong>MAALESEF</strong> sahip değilsiniz.</div>"); }

$order = gd("order");

$ascdesc = gd("ascdesc");



if($order=="bakiye") {

	$ordered = "order by CAST($order AS UNSIGNED) $ascdesc";

} else {

	$ordered = "order by $order $ascdesc";

}



if($ascdesc=="asc") { $neworder = "desc"; } else { $neworder = "asc"; }

$sor = sed_sql_query("select * from kullanici where hesap_sahibi_id='$id' and root='0' $ordered");

if(sed_sql_numrows($sor)<1) { ?>

<table class="tablesorter">
<tbody><tr>
<th><?=getTranslation('ajaxusers1')?></th>
</tr>
<tr>
<td></td>
</tr>
<tr>
<td>
<div class="notice info">
<table class="tablesorter">
<tbody><tr>
<td><?=getTranslation('ajaxusers2')?></td>
<td>0</td>
<td><?=getTranslation('ajaxusers3')?></td>
<td>0</td>
<td><?=getTranslation('ajaxusers4')?></td>
<td>0</td>
<td><?=getTranslation('ajaxusers5')?></td>
<td>0</td>
</tr>
<tr>
<td><?=getTranslation('ajaxusers6')?></td>
<td>0</td>
<td><?=getTranslation('ajaxusers7')?></td>
<td>0</td>
<td><?=getTranslation('ajaxusers8')?></td>
<td>0</td>
<td><?=getTranslation('ajaxusers9')?></td>
<td>0.00</td>
</tr>
</tbody></table>
</div>
</td>
</tr>
</tbody></table>
<table class="tablesorter">
<thead>
<tr>
<th>#</th>
<th><?=getTranslation('ajaxusers10')?></th>
<th><?=getTranslation('ajaxusers11')?></th>
<th><?=getTranslation('ajaxusers12')?></th>
<th><?=getTranslation('ajaxusers13')?></th>
<th><?=getTranslation('ajaxusers14')?></th>
<th colspan="6"><?=getTranslation('ajaxusers15')?></th>
</tr>
</thead>
<tbody>
<tr><td colspan="13">
<div class="notice info">
<ul class="list-unordered list-checked2">
<li><?=getTranslation('ajaxusers16')?></li>
<li><?=getTranslation('ajaxusers17')?></li>
<li><?=getTranslation('ajaxusers18')?></li>
<li><?=getTranslation('ajaxusers19')?></li>
<li><?=getTranslation('ajaxusers20')?></li>
<li><?=getTranslation('ajaxusers21')?></li>
</ul>
</div>
</td>
</tr>
</tbody>
</table>

<?php } else { 

$obilgi = bilgi("select * from kullanici where id='$id'");

$toplams = bilgi("SELECT COUNT(id) as toplam_kullanicim FROM kullanici WHERE hesap_sahibi_id='$id' and root='0'"); 

$toplams_superbayim = bilgi("SELECT COUNT(id) as toplam_superbayim FROM kullanici WHERE hesap_sahibi_id='$id' and root='0' and wkyetki='1'"); 

$toplams_bayim = bilgi("SELECT COUNT(id) as toplam_bayim FROM kullanici WHERE hesap_sahibi_id='$id' and root='0' and wkyetki='2'"); 

$toplams_musterim = bilgi("SELECT COUNT(id) as toplam_musterim FROM kullanici WHERE hesap_sahibi_id='$id' and root='0' and wkyetki='3'"); 

$toplams_pasifler = bilgi("SELECT COUNT(id) as toplam_pasifler FROM kullanici WHERE hesap_sahibi_id='$id' and root='0' and durum='0'"); 

$toplams_canliyasak = bilgi("SELECT COUNT(id) as toplam_canliyasak FROM kullanici WHERE hesap_sahibi_id='$id' and root='0' and canlioynama='0'"); 

$toplams_hareketsizhesap = bilgi("SELECT COUNT(id) as toplam_hareketsizhesap FROM kullanici WHERE hesap_sahibi_id='$id' and root='0' and sonislem=''"); 

$toplams_bakiyeler = bilgi("SELECT SUM(bakiye) as toplam_bakiyeler FROM kullanici WHERE hesap_sahibi_id='$id' and root='0'"); 

$toplams_bakiyeler_superbayiler = bilgi("SELECT SUM(bakiye) as toplam_bakiyeler_superbayi FROM kullanici WHERE hesap_root_id='$id' and root='0'");

if($ub["alt_durum"]=="1" && $ub["alt_alt_durum"]=="0"){
	$bakiyelerini_ver_toplam = nf($toplams_bakiyeler['toplam_bakiyeler']+$toplams_bakiyeler_superbayiler['toplam_bakiyeler_superbayi']);
} else {
	$bakiyelerini_ver_toplam = nf($toplams_bakiyeler['toplam_bakiyeler']);
}

?>

<script>

function asdes(order,as) {

$("#order").val(order);	

$("#ascdesc").val(as);

$("#suanval").val(1);

bayiler(<?=$id;?>);

}

function bayidurum(id,durum) {

var rand = Math.random();	

$.get('../ajax_players.php?a=bayidurumdegis&id='+id+'&durum='+durum+'',function(data) { bayiler('<?=$id;?>'); });

}

function bayisilsuperbayi(id,uname) {

var rand = Math.random();

if(confirm(''+uname+' <?=getTranslation('ajaxusers22')?>')) {

$.get('../ajax_players.php?a=bayisilsuperbayi&id='+id+'&rand='+rand+'',function(data) { $("#users").html(data); bayiler('<?=$id;?>'); });	

}	

}

function bayisil(id,uname) {

var rand = Math.random();

if(confirm(''+uname+' <?=getTranslation('ajaxusers22')?>')) {

$.get('../ajax_players.php?a=bayisil&id='+id+'&rand='+rand+'',function(data) { $("#users").html(data); bayiler('<?=$id;?>'); });	

}	

}

</script>

<table class="tablesorter">
<tbody><tr>
<th><?=getTranslation('ajaxusers1')?></th>
</tr>
<tr>
<td></td>
</tr>
<tr>
<td>
<div class="notice info">
<table class="tablesorter">
<tbody><tr>
<td><?=getTranslation('ajaxusers2')?></td>
<td><?=$toplams['toplam_kullanicim']; ?></td>
<td><?=getTranslation('ajaxusers3')?></td>
<td><?=$toplams_superbayim['toplam_superbayim']; ?></td>
<td><?=getTranslation('ajaxusers4')?></td>
<td><?=$toplams_bayim['toplam_bayim']; ?></td>
<td><?=getTranslation('ajaxusers5')?></td>
<td><?=$toplams_musterim['toplam_musterim']; ?></td>
</tr>
<tr>
<td><?=getTranslation('ajaxusers6')?></td>
<td><?=$toplams_pasifler['toplam_pasifler']; ?></td>
<td><?=getTranslation('ajaxusers7')?></td>
<td><?=$toplams_canliyasak['toplam_canliyasak']; ?></td>
<td><?=getTranslation('ajaxusers8')?></td>
<td><?=$toplams_hareketsizhesap['toplam_hareketsizhesap']; ?></td>
<td><?=getTranslation('ajaxusers9')?></td>
<td><?=$bakiyelerini_ver_toplam; ?></td>
</tr>
</tbody></table>
</div>
</td>
</tr>
</tbody></table>

<table class="tablesorter">
<thead>

<?php if($ub['alt_durum']>0 && $ub['alt_alt_durum']==0) { ?>
<tr>
<th colspan="13">
<font onclick="tumuyeleripasifle(1);" style="float: left;color: #ffffff;cursor: pointer;border: 2px solid #27ff00;padding: 3px;">Tüm Üyeleri Aktif Et</font>
<font onclick="tumuyeleripasifle(0);" style="float: right;color: #ffffff;cursor: pointer;border: 2px solid #000;padding: 3px;">Tüm Üyeleri Pasif Et</font>
</th>
</tr>
<?php } else if($ub['wkyetki']==1) { ?>
<tr>
<th colspan="13">
<font onclick="tumuyeleripasifle(1);" style="float: left;color: #ffffff;cursor: pointer;border: 2px solid #27ff00;padding: 3px;">Tüm Üyeleri Aktif Et</font>
<font onclick="tumuyeleripasifle(0);" style="float: right;color: #ffffff;cursor: pointer;border: 2px solid #000;padding: 3px;">Tüm Üyeleri Pasif Et</font>
</th>
</tr>
<?php } ?>

<?php if($id!=$ub['id']) { ?>
<tr>
<th colspan="13"><a href="javascript:javascript:bayiler('<?=$ub['id']; ?>');" style="float:left;margin-right:20px;" class="grid" title="Geri"><img src="img/help_back.png" border="0"></a> <font style="color:#fff;font-size:15px;">( <?=$obilgi['username']; ?> )</font> <?=getTranslation('ajaxusers24')?></th>
</tr>
<?php } ?>
<tr>
<th>#</th>

<th><?=getTranslation('ajaxusers10')?></th>
<th><?=getTranslation('ajaxusers12')?></th>
<th><?=getTranslation('ajaxusers11')?></th>
<th><?=getTranslation('ajaxusers13')?></th>
<th><?=getTranslation('ajaxusers14')?></th>
<?php if($ub['alt_durum']>0 && $ub['alt_alt_durum']==0) { ?>
<th colspan="6"><?=getTranslation('ajaxusers15')?></th>
<?php } else if($ub['wkyetki']==1) { ?>
<th colspan="6"><?=getTranslation('ajaxusers15')?></th>
<?php } else { ?>
<th colspan="5"><?=getTranslation('ajaxusers15')?></th>
<?php } ?>

</tr>
</thead>
<tbody>

<?php

while($row=sed_sql_fetcharray($sor)) {

$alttotal=sed_sql_numrows(sed_sql_query("select hesap_sahibi_id from kullanici where hesap_sahibi_id='$row[id]' and root='0'"));

$toplams_bakiyeleriniver = bilgi("SELECT SUM(bakiye) as toplam_bakiyesiniver FROM kullanici WHERE hesap_sahibi_id='$row[id]' and root='0'");

if($row["wkyetki"]==1){
	$bakiye_ver = $row['bakiye']+$toplams_bakiyeleriniver['toplam_bakiyesiniver'];
} else {
	$bakiye_ver = $row['bakiye'];
}

$kullanici_bakiye_bol = explode(".",$bakiye_ver);
$kullanici_bakiye_kurus = substr($kullanici_bakiye_bol[1], 0, 2);
if($kullanici_bakiye_kurus>0){
$bakiyele = substr(nf($kullanici_bakiye_bol[0]), 0, -3);
$bakiyesini_ver = "".$bakiyele.".".$kullanici_bakiye_kurus."";
} else {
$bakiyele = substr(nf($kullanici_bakiye_bol[0]), 0, -3);
$bakiyesini_ver = "".$bakiyele.".00";
}

?>

<tr class="c">

<td style="text-align:center"><?=$row['id']; ?></td>
<td style="text-align:center"><?=$row['username']; ?></td>
<td style="text-align:center"><?=$row['hatirlatmaad']; ?></td>
<td style="text-align:center"><?=hesap_tipi($row['id']); ?></td>
<td style="text-align:center"><?=$bakiyesini_ver; ?> <?=getTranslation('parabirimi')?></td>
<td style="text-align:center"><? if($alttotal>0) { ?><a href="javascript:;" onClick="bayiler('<?=$row['id']; ?>');" class="redlink"><?=getTranslation('ajaxusers23')?> (<?=$alttotal?>)</a> <?php } else { ?>---<?php } ?></td>


<td style="text-align:center" width="16">
<?php if($row['durum']=="1") { $dur = 1; echo "<img src='/players/img/bayiler/status_1.png' title='".getTranslation('ajaxusers27')."' alt='Durum' border='0'>"; } else if($row['durum']=="0") { $dur = 0; echo "<img src='/players/img/bayiler/status_2.png' title='".getTranslation('ajaxusers28')."' alt='Durum' border='0'>"; } ?>
</td>

<td style="text-align:center" width="40">

<?php if($dur==1) { ?>
<a href="javascript:;" onClick="bayidurum('<?=$row['id']; ?>','0');"><font style="color:#f00;font-weight:bold;"><?=getTranslation('ajaxusers25')?></font></a>
<?php } else if($dur==0) { ?>
<a href="javascript:;" onClick="bayidurum('<?=$row['id']; ?>','1');"><font style="color:#0f8311;font-weight:bold;"><?=getTranslation('ajaxusers26')?></font></a>
<?php } ?>

</td>

<?php if($ub['alt_durum']>0 && $ub['alt_alt_durum']==0) { ?>
<td width="16">
<a class="grid" href="bakiyeisleadmin.php?id=<?=$row['id']; ?>" title="<?=getTranslation('ajaxusers29')?>">
<img src="/players/img/bayiler/money.png" alt="<?=getTranslation('ajaxusers29')?>" border="0">
</a>
</td>
<?php } else if($ub['wkyetki']==1) { ?>
<td width="16">
<a class="grid" href="bakiye_isle.php?id=<?=$row['id']; ?>" title="<?=getTranslation('ajaxusers29')?>">
<img src="/players/img/bayiler/money.png" alt="<?=getTranslation('ajaxusers29')?>" border="0">
</a>
</td>
<?php } ?>

<?php if($ub['wkyetki']==1){ ?>
<td style="text-align:center" width="16">
<a class="grid" href="javascript:;" title="<?=getTranslation('ajaxusers30')?>" onClick="bayisilsuperbayi('<?=$row['id']; ?>','<?=$row['username']; ?>');" >
<img src="/players/img/bayiler/deleteyetki.png" alt="<?=getTranslation('ajaxusers30')?>" border="0">
</a>
</td>
<?php } else { ?>
<td style="text-align:center" width="16">
<a class="grid" href="javascript:;" title="<?=getTranslation('ajaxusers30')?>" onClick="bayisil('<?=$row['id']; ?>','<?=$row['username']; ?>');" >
<img src="/players/img/bayiler/deleteyetki.png" alt="<?=getTranslation('ajaxusers30')?>" border="0">
</a>
</td>
<?php } ?>


<?php if($id!=$ub['id']) { ?> 

<td style="text-align:center" width="16"></td>

<?php } else { ?>

<td style="text-align:center" width="16">
<a class="grid" href="userediting.php?id=<?=$row['id']; ?>" title="<?=getTranslation('ajaxusers31')?>"><img src="/players/img/bayiler/edit.png" alt="Düzenle" border="0"></a>
</td>

<?php } ?>



<td style="text-align:center" width="16">
<a class="grid" href="profil.php?userid=<?=$row['id']; ?>" title="<?=getTranslation('ajaxusers31')?>"><img src="/players/img/bayiler/members.png" alt="Profil" border="0"></a>
</td>
</tr>



<?php } ?>

<tr><td colspan="13">
<div class="notice info">
<ul class="list-unordered list-checked2">
<?php if($ub['alt_durum']>0 && $ub['alt_alt_durum']==0) { ?>
<li><?=getTranslation('ajaxusers32')?></li>
<li><?=getTranslation('ajaxusers33')?></li>
<li><?=getTranslation('ajaxusers34')?></li>
<?php } else if($ub['wkyetki']==1) { ?>
<li><?=getTranslation('ajaxusers35')?></li>
<?php } else { ?>
<li><?=getTranslation('ajaxusers36')?></li>
<li><?=getTranslation('ajaxusers37')?></li>
<li><?=getTranslation('ajaxusers38')?></li>
<?php } ?>
</ul>
</div>
</td>
</tr>
</tbody>
</table>

<?php }

}

if($a=="tumkuponlarim") {

$kuponno = gd("kupon_no");

$tarih1 = basla_time(gd("tarih1"));

$tarih2 = bitir_time(gd("tarih2"));

$satir = gd("satir");

$durum = gd("durum");

$tip = gd("tip");

$order = gd("order");

$ascdesc = gd("ascdesc");

$pageper = 50;

if($ascdesc=="asc") { $yenidesk = "desc"; } else { $yenidesk = "asc"; }

$userid = gd("userid");


$benimbayilerim = benimbayilerim($ub['id']);

$bayi_array = explode(",",$benimbayilerim);





if(strstr($userid,"-plus")) { 

$idbul = explode("-",$userid); $idalti = $idbul[0]; 

$onunkiler = benimbayilerim($idalti);

$userid = $idalti;

} 





if(!empty($userid) && in_array($userid,$bayi_array)) { 

if($onunkiler) {

	$user_ekle = "and user_id in ($onunkiler)";

} else {

	$user_ekle = "and user_id='$userid'"; 

}

} else { 

$user_ekle = "and user_id in ($benimbayilerim)"; 

}





if(!empty($kuponno)) { $kupon_ekle = "and id='$kuponno'"; } else { $kupon_ekle = ""; }

if(!empty($satir)) {

if($satir=="kombine") { $satir_ekle = "and toplam_mac>1"; } else

if($satir==3) { $satir_ekle = "and toplam_mac>2"; } else

if($satir==1 || $satir==2) { $satir_ekle = "and toplam_mac='$satir'"; }	

} else {

$satir_ekle = "";	

}

if(!empty($durum)) { $durum_ekle = "and durum='$durum'"; } else { $durum_ekle = ""; }

if(!empty($tip)) {

if($tip=="1") { $tip_ekle = "and canli='1' and canlib='0' and futbol='0' and basketbol='0' and voleybol='0' and duello='0'"; } else

if($tip=="2") { $tip_ekle = "and canlib='1' and canli='0' and futbol='0' and basketbol='0' and voleybol='0' and duello='0'"; } else

if($tip=="3") { $tip_ekle = "and futbol='1' and canli='0' and canlib='0' and basketbol='0' and voleybol='0' and duello='0'"; } else

if($tip=="4") { $tip_ekle = "and basketbol='1' and canli='0' and canlib='0' and futbol='0' and voleybol='0' and duello='0'"; } else

if($tip=="5") { $tip_ekle = "and voleybol='1' and canli='0' and canlib='0' and futbol='0' and basketbol='0' and duello='0'"; }	else

if($tip=="6") { $tip_ekle = "and duello='1' and voleybol='0' and canli='0' and canlib='0' and futbol='0' and basketbol='0'"; }	else

if($tip=="7") { $tip_ekle = "and canli='3'"; }	

} else {

$tip_ekle = "";	

}


$gelen_sayfa = (isset($_GET['sayfa']) && $_GET['sayfa'] !='' ) ? intval($_GET['sayfa']) : 1;

//Bağlanılacak Tablo
$tablo = 'kuponlar';

//Sayfada kaç kayıt görünecek
$limit = $pageper;

//Kaç sayfa öncesi ve sonrası görünecek
$s_s = 10;

/*------------------------------------
Alan Başlıklarını ve $sonuc['alan1'] 
kısımlarını kendinize göre değiştirin
-------------------------------------*/


$sqladder_sayfalama = "$user_ekle and and casino='0' kupon_time between '$tarih1' and '$tarih2' $kupon_ekle $satir_ekle $durum_ekle $tip_ekle and hesap_kesim_zaman=''";

$s_sor = sed_sql_query("select count(id) from $tablo where id!='' $sqladder_sayfalama") or trigger_error(mysql_error(),E_USER_ERROR);

$satir = sed_sql_result($s_sor,0);

sed_sql_freeresult($s_sor);

if($satir >0){//sonuç varsa

$baslama = ($gelen_sayfa > 1) ? (($gelen_sayfa -1) * $limit) : 0 ;

$sayfa_kac = $satir/$limit;

$sayfa_sayisi = ($satir % $limit != 0) ? intval($sayfa_kac)+1 : intval($sayfa_kac);

$basla=( $satir >= $baslama ) ? $baslama : 0 ;

unset( $sayfa_kac, $baslama );


$sqladder = "$user_ekle and and casino='0' kupon_time between '$tarih1' and '$tarih2' $kupon_ekle $sahip_ekle $satir_ekle $durum_ekle $tip_ekle and hesap_kesim_zaman=''";


$sor = sed_sql_query("select * from kuponlar where id!='' $sqladder order by CAST($order AS UNSIGNED) $ascdesc limit $basla,$limit");

$i=1;

$style='';

$toplams_yatan_tl = bilgi("SELECT SUM(CASE WHEN id!='' THEN yatan END) as toplam_odenen_2 FROM kuponlar WHERE id!='' $sqladder");

$toplams_kazanan_tl = bilgi("SELECT SUM(CASE WHEN durum='2' THEN tutar END) as toplam_kazanan_2 FROM kuponlar WHERE id!='' $sqladder");

$toplams_bekleyen_tl = bilgi("SELECT SUM(CASE WHEN durum='2' AND odendi='0' THEN tutar END) as toplam_bekleyen_2 FROM kuponlar WHERE id!='' $sqladder");

$toplams_kupon = bilgi("SELECT COUNT(CASE WHEN id!='' THEN id END) as toplam_kupon FROM kuponlar WHERE id!='' $sqladder");

$toplams_kazanan = bilgi("SELECT COUNT(CASE WHEN durum='2' THEN id END) as toplam_kazanan FROM kuponlar WHERE id!='' $sqladder");

$toplams_kaybeden = bilgi("SELECT COUNT(CASE WHEN durum='3' THEN id END) as toplam_kaybeden FROM kuponlar WHERE id!='' $sqladder");

$toplams_bekleyen = bilgi("SELECT COUNT(CASE WHEN durum='1' THEN id END) as toplam_bekleyen FROM kuponlar WHERE id!='' $sqladder");

$toplams_iptal = bilgi("SELECT COUNT(CASE WHEN durum='4' THEN id END) as toplam_iptal FROM kuponlar WHERE id!='' $sqladder");

$toplams_canli = bilgi("SELECT COUNT(CASE WHEN canli='1' OR canlib='1' OR canlit='1' OR canliv='1' OR canlibuz='1' OR canlih='1' THEN id END) as toplam_canli FROM kuponlar WHERE id!='' $sqladder");

$toplams_normal = bilgi("SELECT COUNT(CASE WHEN futbol='1' OR basketbol='1' OR tenis='1' OR voleybol='1' OR buzhokeyi='1' OR hentbol='1' THEN id END) as toplam_normal FROM kuponlar WHERE id!='' $sqladder");

if(sed_sql_numrows($sor)<1) {  } else {

?>

<div class="space_9 clear"></div>
<div class="middle" style="text-align: center;background: #fff;margin-top: 4px;height: 71px;">
<div class="informer">
<a href="#">
<span class="title"><?=n($toplams_kupon['toplam_kupon']); ?></span>
<span class="text"><?=getTranslation('ajaxtumkuponlarim1')?></span>
</a>
</div>
<div class="informer">
<a href="#">
<span class="title"><?=n($toplams_kazanan['toplam_kazanan']); ?></span>
<span class="text"><?=getTranslation('ajaxtumkuponlarim2')?></span>
</a>
</div>
<div class="informer">
<a href="#">
<span class="title"><?=n($toplams_kaybeden['toplam_kaybeden']); ?></span>
<span class="text"><?=getTranslation('ajaxtumkuponlarim3')?></span>
</a>
</div>
<div class="informer">
<a href="#">
<span class="title"><?=n($toplams_bekleyen['toplam_devam']); ?></span>
<span class="text"><?=getTranslation('ajaxtumkuponlarim4')?></span>
</a>
</div>
<div class="informer">
<a href="#">
<span class="title"><?=n($toplams_iptal['toplam_iptal']); ?></span>
<span class="text"><?=getTranslation('ajaxtumkuponlarim5')?></span>
</a>
</div>
<div class="informer">
<a href="#">
<span class="title"><?=n($toplams_canli['toplam_canli']); ?></span>
<span class="text"><?=getTranslation('ajaxtumkuponlarim6')?></span>
</a>
</div>
<div class="informer">
<a href="#">
<span class="title"><?=n($toplams_normal['toplam_normal']); ?></span>
<span class="text"><?=getTranslation('ajaxtumkuponlarim7')?></span>
</a>
</div>
</div>

<div class="new_sheet cf panelHead">

<div class="sheet_c1 left" style="padding: 0px; width: 41px;"><a class=""><span class=""><?=getTranslation('ajaxtumkuponlarim8')?></span></a></div>

<div class="sheet_c1 left" style="padding: 0px;width: 77px;border-right: 1px solid #a8d3e6;text-align: center;"><a class=""><span class=""><?=getTranslation('ajaxtumkuponlarim9')?></span></a></div>

<div class="sheet_c1 left" style="padding: 0px;width: 92px;border-right: 1px solid #a8d3e6;text-align: center;"><a class=""><span class=""><?=getTranslation('ajaxtumkuponlarim10')?></span></a></div>

<div class="sheet_c1 left" style="padding: 0px;width: 88px;border-right: 1px solid #a8d3e6;text-align: center;"><a class=""><span class=""><?=getTranslation('ajaxtumkuponlarim11')?></span></a></div>

<div class="sheet_c1 left" style="padding: 0px;width: 88px;border-right: 1px solid #a8d3e6;text-align: center;"><a class=""><span class=""><?=getTranslation('ajaxtumkuponlarim12')?></span></a></div>	

<div class="sheet_c1 left" style="padding: 0px;width: 88px;border-right: 1px solid #a8d3e6;text-align: center;"><a class=""><span class=""><?=getTranslation('ajaxtumkuponlarim13')?></span></a></div>

<div class="sheet_c1 left" style="padding: 0px;width: 88px;border-right: 1px solid #a8d3e6;text-align: center;"><a class=""><span class=""><?=getTranslation('ajaxtumkuponlarim14')?></span></a></div>

<div class="sheet_c1 left" style="padding: 0px;width: 45px;border-right: 1px solid #a8d3e6;text-align: center;"><a class=""><span class=""><?=getTranslation('ajaxtumkuponlarim15')?></span></a></div>

<div class="sheet_c1 left" style="padding: 0px;width: 139px;border-right: 1px solid #a8d3e6;text-align: center;"><a class=""><span class=""><?=getTranslation('ajaxtumkuponlarim16')?></span></a></div>

</div>

<div class="tooltip" id="tooltip"></div>

<div class="space_9"></div>

<div class="new_sheet" style="margin-top: 0px;">

<?php

while($row=sed_sql_fetcharray($sor)) { 
$canli_var = 0;
$hesap_sahibi_bul = bilgi("SELECT hesap_sahibi_user FROM kullanici WHERE username='$row[username]'");
$sor2 = sed_sql_query("select * from kupon_ic where kupon_id='$row[id]'");
while($row2=sed_sql_fetcharray($sor2)) {
if($row2['spor_tip']=="canli" || $row2['spor_tip']=="canlib" || $row2['spor_tip']=="canlit" || $row2['spor_tip']=="canliv" || $row2['spor_tip']=="canlibuz" || $row2['spor_tip']=="canlimt"){ $canli_var = 1; }
}
?>


<div class="header cf" id="kuponid_<?=$row['id']; ?>" style="color: #<?php if($row['durum']==1){ ?>000<?php } else if($row['durum']==2){ ?>89d047<?php } else if($row['durum']==3){ ?>ff0404<?php } else if($row['durum']==4){ ?>21a5d2<?php } ?>;">
<div class="sheet_c2 pad_l_6 left" onmouseout="untip()" onmouseover="tip('<?=durumnedir($row['durum']); ?>', 0)" style="background: #<?php if($row['durum']==1){ ?>f6f7f5<?php } else if($row['durum']==2){ ?>89d047<?php } else if($row['durum']==3){ ?>ff0404<?php } else if($row['durum']==4){ ?>21a5d2<?php } ?>;line-height: 29px;width: 25px;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">
<div class="marg_txt lightblue">
<?php if($row['durum']==1){ ?>
<img title="Bekliyor" src="../assets/img/ticket/ticket_3.png" alt="" width="9" height="9" style="width: 12px;height: 12px;vertical-align: middle;">
<?php } else if($row['durum']==2){ ?>
<img title="Kazandı" src="../assets/img/ticket/ticket_1.png" alt="" width="9" height="9" style="width: 12px;height: 12px;vertical-align: middle;">
<?php } else if($row['durum']==3){ ?>
<img title="Kaybetti" src="../assets/img/ticket/ticket_2.png" alt="" width="9" height="9" style="width: 12px;height: 12px;vertical-align: middle;">
<?php } else if($row['durum']==4){ ?>
<img title="İptal Edildi" src="../assets/img/ticket/ticket_4.png" alt="" width="9" height="9" style="width: 12px;height: 12px;vertical-align: middle;">
<?php } ?>
</div>
</div>
<div class="sheet_c1 left" style="background: #<?php if($row['durum']==1){ ?>f6f7f5<?php } else if($row['durum']==2){ ?>89d047<?php } else if($row['durum']==3){ ?>ff0404<?php } else if($row['durum']==4){ ?>21a5d2<?php } ?>;height: 31px;border-right: 1px solid #a8d3e6;">				
<div id="jq-<?=$row['id']; ?>" class="sheet_tab " style="margin: 6px 0 0 0px;" onclick="javascript:MyTicket.Report(<?=$row['id']; ?>);void(0);"><?=$row['id']; ?></div>
</div>

<div class="sheet_c2 pad_l_6 left" onmouseout="untip()" onmouseover="tip('<?=$hesap_sahibi_bul['hesap_sahibi_user'];?>(<?=$row['username']; ?>) <br> <?=getTranslation('ajaxtumkuponlarim17')?> : <?=$row['kupon_nots']; ?> ', 0)" style="width: 92px;background: #e9f5fb;height: 31px;overflow: hidden;    border-right: 1px solid #a8d3e6;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">
<b><?php if($ub['wkyetki']==1 && $ub['alt_durum']==0){ ?><?=$row['username']; ?><?php } else if($ub['username']!=$hesap_sahibi_bul['hesap_sahibi_user']){ ?><?=$hesap_sahibi_bul['hesap_sahibi_user'];?>(<?=$row['username']; ?>)<?php } else if($ub['username']==$hesap_sahibi_bul['hesap_sahibi_user']){ ?><?=$row['username']; ?><?php } ?></b>
</div>

<div class="sheet_c2 pad_l_6 left" onmouseout="untip()" onmouseover="tip('21-11-2019 15:10:30', 0)" style="width: 88px;height: 31px;    border-right: 1px solid #a8d3e6;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">
<b><?=date("d-m",$row['kupon_time']); ?></b>&nbsp;<?=date("H:i:s",$row['kupon_time']); ?>
</div>

<div class="sheet_c2 pad_l_6 left" onmouseout="untip()" onmouseover="tip('<?=getTranslation('ajaxtumkuponlarim18')?> : <?=nf($row['yatan']); ?> (K)', 0)" style="width: 88px;    border-right: 1px solid #a8d3e6;background: #e9f5fb;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">
<b><?=nf($row['yatan']); ?> (K)</b>
</div>

<div class="sheet_c2 pad_l_6 left" onmouseout="untip()" onmouseover="tip('T. <?=getTranslation('ajaxtumkuponlarim19')?> : <?=nf($row['oran']); ?>', 0)" style="width: 88px;    border-right: 1px solid #a8d3e6;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">
<b><?=nf($row['oran']); ?></b>
</div>

<div class="sheet_c2 pad_l_6 left" onmouseout="untip()" onmouseover="tip('Max. <?=getTranslation('ajaxtumkuponlarim20')?> : <?=nf($row['tutar']); ?> (K)', 0)" style="width: 88px;    border-right: 1px solid #a8d3e6;background: #e9f5fb;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">
<b><?=nf($row['tutar']); ?> (K)</b>
</div>

<div class="sheet_c2 pad_l_6 left" onmouseout="untip()" onmouseover="tip('<?=getTranslation('ajaxtumkuponlarim21')?> : <?=$row['toplam_mac']; ?> <br> <?=getTranslation('ajaxtumkuponlarim22')?> : <?=$row['tutan']; ?>', 0)" style="width: 45px;    border-right: 1px solid #a8d3e6;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">
<b><?=$row['toplam_mac']; ?>/<?=$row['tutan']; ?></b>
</div>

<div class="sheet_c2 pad_l_6 left" style="width: 27px;    border-right: 1px solid #a8d3e6;background: #e9f5fb;line-height: 41px;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">
<a class="grid" onmouseout="untip()" onmouseover="tip('<?=getTranslation('ajaxtumkuponlarim23')?>', 0)" href="javascript:;" onClick="kuponyazdir('<?=$row['id']; ?>');">
<img src="../assets/img/ticket/print.png" border="0">
</a>
</div>

<div class="sheet_c2 pad_l_6 left" style="width: 27px;    border-right: 1px solid #a8d3e6;background: #e9f5fb;line-height: 41px;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">

<? 

$baslama = $row['baslamatime'];

$yatirma_zaman = $row['kupon_time'];

$gecen_zaman = time()-$yatirma_zaman;

$silme_sure = userayar('iptal_sure');

$suan = time();

$baslamavefark = $baslama-$suan;

$tarih_ver = date("Y.m.d");

$iptalsayisi = bilgi("SELECT COUNT(CASE WHEN id!='' THEN id END) as toplam_iptal_adet FROM iptal_listesi WHERE iptal_user_id='$ub[id]' and tarih='$tarih_ver'");

$toplam_iptal_adeti = $iptalsayisi['toplam_iptal_adet'];

if($canli_var!=1) {

if($ub['alt_durum']==0 && userayar('iptal_limit')>$toplam_iptal_adeti) {

if(

($row['canli']=="0" && $gecen_zaman<$silme_sure && $baslamavefark>0  && $row['durum']!="4") || 

($ub['alt_durum']>0 && $baslamavefark>0 && $row['durum']!="4") || 

($ub['alt_alt_durum']>0 && $row['durum']!="4") || ($ub['alt_durum']>0 && $row['durum']!="4") ) { 

?>

<a class="grid" onmouseout="untip()" onmouseover="tip('<?=getTranslation('ajaxtumkuponlarim24')?>', 0)" href="javascript:;" onclick="kupon_iptal('<?=$row['id']; ?>');" title="İptal">
<img src="../assets/img/ticket/delete.png" alt="İptal" border="0">
</a>

<?php } ?>

<?php } ?>

<?php } ?>

<?php

if($ub['alt_durum']>0) {

if(

($row['canli']=="0" && $gecen_zaman<$silme_sure && $baslamavefark>0  && $row['durum']!="4") || 

($ub['alt_durum']>0 && $baslamavefark>0 && $row['durum']!="4") || 

($ub['alt_alt_durum']>0 && $row['durum']!="4") || ($ub['alt_durum']>0 && $row['durum']!="4") ) { 

?>

<a class="grid" onmouseout="untip()" onmouseover="tip('<?=getTranslation('ajaxtumkuponlarim24')?>', 0)" href="javascript:;" onclick="kupon_iptal('<?=$row['id']; ?>');" title="İptal">
<img src="../assets/img/ticket/delete.png" alt="İptal" border="0">
</a>

<?php } ?>

<?php } ?>

</div>

<div class="sheet_c2 pad_l_6 left" style="width: 27px;    border-right: 1px solid #a8d3e6;background: #e9f5fb;line-height: 41px;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;"></div>

<div class="sheet_c2 pad_l_6 left" style="width: 27px;    border-right: 1px solid #a8d3e6;background: #e9f5fb;line-height: 41px;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;"></div>

<div class="sheet_c2 pad_l_6 left" style="width: 27px;    border-right: 1px solid #a8d3e6;background: #e9f5fb;line-height: 41px;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">
<?php if($row['canli']==3) { ?>
<a class="grid" onmouseout="untip()" onmouseover="tip('<?=getTranslation('ajaxtumkuponlarim25')?>', 0)" href="javascript:kupongoruntulesanal('<?=$row['id']; ?>');" title="Görüntüle">
<img src="../assets/img/ticket/sheet_zoom-1DDB2A5ADBB9A1DD91D6A0584C8AE0BE.png" alt="Görüntüle" border="0">
</a>
<?php } else { ?>
<a class="grid" onmouseout="untip()" onmouseover="tip('<?=getTranslation('ajaxtumkuponlarim25')?>', 0)" href="javascript:kupongoruntule('<?=$row['id']; ?>');" title="Görüntüle">
<img src="../assets/img/ticket/sheet_zoom-1DDB2A5ADBB9A1DD91D6A0584C8AE0BE.png" alt="Görüntüle" border="0">
</a>
<?php } ?>
</div>

</div>

<?php } ?>

<div class="space"></div>
<div class="space_9 clear"></div>

<div class="new_sheet cf panelHead" style="margin-top: -3px;">
<div class="sheet_c1 left" style="padding: 0px;width: 300px;border-right: 1px solid #a8d3e6;text-align: center;">
<a class="uline"><span class=""><?=getTranslation('ajaxtumkuponlarim34')?>:</span></a>
</div>

<div class="sheet_c1 left" onmouseout="untip()" onmouseover="tip('<?=getTranslation('ajaxtumkuponlarim26')?>: <?=nf($toplams_yatan_tl['toplam_odenen_2']); ?> (K)', 0)" style="padding: 0px;width: 88px;border-right: 1px solid #a8d3e6;text-align: center;">
<a class=""><span class=""><b><?=nf($toplams_yatan_tl['toplam_odenen_2']); ?> (K)</b></span></a>
</div>

<div class="sheet_c1 left" style="padding: 0px;width: 88px;border-right: 1px solid #a8d3e6;text-align: center;">
<a class="uline"><span class=""></span></a>
</div>

<div class="sheet_c1 left" onmouseout="untip()" onmouseover="tip('<?=getTranslation('ajaxtumkuponlarim27')?>: <?=nf($toplams_kazanan_tl['toplam_kazanan_2']); ?> (K)', 0)" style="padding: 0px;width: 88px;border-right: 1px solid #a8d3e6;text-align: center;">
<a class=""><span class=""><b><?=nf($toplams_kazanan_tl['toplam_kazanan_2']); ?> (K)</b></span></a>
</div>

<div class="sheet_c1 left" onmouseout="untip()" onmouseover="tip('<?=getTranslation('ajaxtumkuponlarim28')?>:<?=nf($toplams_bekleyen_tl['toplam_bekleyen_2']); ?> (K)', 0)" style="padding: 0px;width: 185px;border-right: 1px solid #a8d3e6;text-align: center;">
<a class=""><span class=""><?=getTranslation('ajaxtumkuponlarim35')?>: <b><?=nf($toplams_bekleyen_tl['toplam_bekleyen_2']); ?> (K)</b></span></a>
</div>

</div>

<div class="space_9"></div>
<div class="space"></div>

<span>
<div class="sheet_body_sub on cf">
<div class="main_box pager cf">
<div class="left" style="width: 100%">
<div class="div_center">

<?php $style = ($style=='') ? '2' : '';

$i++;

} ?>
			

			<?php 
		$hangi_sayfa= ($gelen_sayfa > 0)? $gelen_sayfa : 1 ;
		echo '<div class="inline" style="height: 38px;line-height: 24px;"><nav class="zipagin-light light-green">';	
	
	
			$alt= ($gelen_sayfa - $s_s);
			if($sayfa_sayisi <= $s_s || $gelen_sayfa <= $s_s ) {$alt=1;} 
			$ust= (($gelen_sayfa + $s_s)< $sayfa_sayisi ) ? ($gelen_sayfa + $s_s) : ($sayfa_sayisi);	
			echo ($gelen_sayfa > 1 )? '<a class="" href="javascript:;" onclick="kupongetir(1,1);" id="sayfaveri">'.getTranslation('ajaxtumkuponlarim30').'</a><a class="" href="javascript:;" id="sayfaveri" onclick="kupongetir(1,'.($gelen_sayfa -1).');">« '.getTranslation('ajaxtumkuponlarim31').'</a>':' ';
			for($i=$alt; $i<=$ust ;$i++){		
				echo ($i != $gelen_sayfa ) ? '<a class="" href="javascript:;" id="sayfaveri" onclick="kupongetir(1,'.$i.');">'.$i.'</a>' : '<span>'.$i.'</span>';
				}
			echo ($gelen_sayfa < $sayfa_sayisi)? '<a class="" href="javascript:;" id="sayfaveri" onclick="kupongetir(1,'.($gelen_sayfa +1).');">'.getTranslation('ajaxtumkuponlarim32').' »</a><a class="" href="javascript:;" id="sayfaveri" onclick="kupongetir(1,'.$sayfa_sayisi.');">'.getTranslation('ajaxtumkuponlarim33').'</a>' :'';
			echo '</nav></div>';
?>

</div>
</div>
</div>
</div>
</span>

<?php } else { ?>

<div class="space_9 clear"></div>

<div class="space_9 clear"></div>

<div class="new_sheet cf panelHead" style="margin-top: 0px;text-align: center;border-top: 3px solid #ef8107;">
<?=getTranslation('ajaxtumkuponlarim29')?>
</div>

<?php } ?>

<script>

function kupon_iptal(id) {

if(confirm(''+id+' <?=getTranslation('ajaxtumkuponlarim36')?>')) {

loadall();

var rand = Math.random();

$.get('../ajax.php?a=kuponiptal&id='+id+'&rand='+rand+'',function(data) { 

if(data=="401") { failcont('Hata','<?=getTranslation('ajaxtumkuponlarim37')?>.'); } else

if(data=="404") { failcont('Hata','<?=getTranslation('ajaxtumkuponlarim38')?>.'); } else

if(data=="405") { failcont('Hata','<?=getTranslation('ajaxtumkuponlarim39')?>.'); } else {

kupongetir(5);

limitupdate();

}

});

}

}

</script>



<?php }

if($a=="kuponlarim") {

$kuponno = gd("kupon_no");

$tarih1 = basla_time(gd("tarih1"));

$tarih2 = bitir_time(gd("tarih2"));

$satir = gd("satir");

$durum = gd("durum");

$tip = gd("tip");

$pageper = 50;

$kupon_sure = gd("kupon_sure");

$order = gd("order");

$ascdesc = gd("ascdesc");

if($ascdesc=="asc") { $yenidesk = "desc"; } else { $yenidesk = "asc"; }





if(!empty($kuponno)) { $kupon_ekle = "and id='$kuponno'"; } else { $kupon_ekle = ""; }

if(!empty($satir)) {

if($satir=="kombine") { $satir_ekle = "and toplam_mac>1"; } else

if($satir==3) { $satir_ekle = "and toplam_mac>2"; } else

if($satir==1 || $satir==2) { $satir_ekle = "and toplam_mac='$satir'"; }	

} else {

$satir_ekle = "";	

}

if(!empty($durum)) {

if($durum=="0") { $durum_ekle = ""; } else

if($durum=="1") { $durum_ekle = "and durum='1'"; } else

if($durum=="2") { $durum_ekle = "and durum='2'"; } else 

if($durum=="3") { $durum_ekle = "and durum='3'"; } else

if($durum=="4") { $durum_ekle = "and durum='4'"; } else

if($durum=="5") { $durum_ekle = "and durum='2' and odendi='1'"; }

} else {

$durum_ekle = "";	

}

if(!empty($tip)) {

if($tip=="0") { $tip_ekle = ""; } else

if($tip=="1") { $tip_ekle = "and canli='1'"; } else

if($tip=="2") { $tip_ekle = "and canlib='1'"; } else

if($tip=="3") { $tip_ekle = "and canlit='1'"; } else

if($tip=="4") { $tip_ekle = "and canliv='1'"; } else

if($tip=="5") { $tip_ekle = "and canlibuz='1'"; } else

if($tip=="6") { $tip_ekle = "and canlimt='1'"; } else

if($tip=="7") { $tip_ekle = "and futbol='1'"; } else

if($tip=="8") { $tip_ekle = "and basketbol='1'"; } else

if($tip=="9") { $tip_ekle = "and tenis='1'"; } else

if($tip=="10") { $tip_ekle = "and voleybol='1'"; } else

if($tip=="11") { $tip_ekle = "and buzhokeyi='1'"; } else

if($tip=="12") { $tip_ekle = "and masatenisi='1'"; } else

if($tip=="13") { $tip_ekle = "and beyzbol='1'"; } else

if($tip=="14") { $tip_ekle = "and rugby='1'"; } else

if($tip=="15") { $tip_ekle = "and dovus='1'"; } else

if($tip=="16") { $tip_ekle = "and canli='3'"; }	

} else {

$tip_ekle = "";	

}

$bugun = date('d.m.Y H:i:s');
$yenitarih = strtotime('-30 minute',strtotime($bugun));
$yenitarih = date('d.m.Y H:i:s' ,$yenitarih );
$yenitarih2 = strtotime('-1 hour',strtotime($bugun));
$yenitarih2 = date('d.m.Y H:i:s' ,$yenitarih2 );
$yenitarih3 = strtotime('-3 hour',strtotime($bugun));
$yenitarih3 = date('d.m.Y H:i:s' ,$yenitarih3 );
$yenitarih4 = strtotime('-6 hour',strtotime($bugun));
$yenitarih4 = date('d.m.Y H:i:s' ,$yenitarih4 );

if(!empty($kupon_sure)) {

if($kupon_sure=="0") { $kupon_sure_ekle = ""; } else

if($kupon_sure=="1") { $kupon_sure_ekle = "and kupon_tarih > '$yenitarih'"; } else

if($kupon_sure=="2") { $kupon_sure_ekle = "and kupon_tarih > '$yenitarih2'"; } else 

if($kupon_sure=="3") { $kupon_sure_ekle = "and kupon_tarih > '$yenitarih3'"; } else

if($kupon_sure=="4") { $kupon_sure_ekle = "and kupon_tarih > '$yenitarih4'"; }

} else {

$kupon_sure_ekle = "";	

}


$gelen_sayfa = (isset($_GET['sayfa']) && $_GET['sayfa'] !='' ) ? intval($_GET['sayfa']) : 1;

//Bağlanılacak Tablo
$tablo = 'kuponlar';

//Sayfada kaç kayıt görünecek
$limit = $pageper;

//Kaç sayfa öncesi ve sonrası görünecek
$s_s = 10;

/*------------------------------------
Alan Başlıklarını ve $sonuc['alan1'] 
kısımlarını kendinize göre değiştirin
-------------------------------------*/

$sqladder_sayfalama = "and user_id='$ub[id]' and casino='0' and kupon_time between '$tarih1' and '$tarih2' $kupon_ekle $satir_ekle $durum_ekle $tip_ekle $kupon_sure_ekle and hesap_kesim_zaman=''";


$s_sor = sed_sql_query("select count(id) from $tablo where id!='' $sqladder_sayfalama") or trigger_error(mysql_error(),E_USER_ERROR);

$satir = sed_sql_result($s_sor,0);

sed_sql_freeresult($s_sor);

if($satir >0){//sonuç varsa

$baslama = ($gelen_sayfa > 1) ? (($gelen_sayfa -1) * $limit) : 0 ;

$sayfa_kac = $satir/$limit;

$sayfa_sayisi = ($satir % $limit != 0) ? intval($sayfa_kac)+1 : intval($sayfa_kac);

$basla=( $satir >= $baslama ) ? $baslama : 0 ;

unset( $sayfa_kac, $baslama );



$sqladder = "and user_id='$ub[id]' and casino='0' and kupon_time between '$tarih1' and '$tarih2' $kupon_ekle $sahip_ekle $satir_ekle $durum_ekle $tip_ekle $kupon_sure_ekle and hesap_kesim_zaman=''";

$sor = sed_sql_query("select * from kuponlar where id!='' $sqladder order by CAST($order AS UNSIGNED) $ascdesc limit $basla,$limit");

$i=1;

$style='';


$toplams_kupon = bilgi("SELECT COUNT(CASE WHEN id!='' THEN id END) as toplam_kupon FROM kuponlar WHERE id!='' $sqladder");

$toplams_kazanan = bilgi("SELECT COUNT(CASE WHEN durum='2' THEN id END) as toplam_kazanan FROM kuponlar WHERE id!='' $sqladder");

$toplams_kaybeden = bilgi("SELECT COUNT(CASE WHEN durum='3' THEN id END) as toplam_kaybeden FROM kuponlar WHERE id!='' $sqladder");

$toplams_bekleyen = bilgi("SELECT COUNT(CASE WHEN durum='1' THEN id END) as toplam_bekleyen FROM kuponlar WHERE id!='' $sqladder");

$toplams_iptal = bilgi("SELECT COUNT(CASE WHEN durum='4' THEN id END) as toplam_iptal FROM kuponlar WHERE id!='' $sqladder");

$toplams_canli = bilgi("SELECT COUNT(CASE WHEN canli='1' OR canlib='1' OR canlit='1' OR canliv='1' OR canlibuz='1' OR canlimt='1' THEN id END) as toplam_canli FROM kuponlar WHERE id!='' $sqladder");

$toplams_normal = bilgi("SELECT COUNT(CASE WHEN futbol='1' OR basketbol='1' OR tenis='1' OR voleybol='1' OR buzhokeyi='1' OR masatenisi='1' OR beyzbol='1' OR rugby='1' OR dovus='1' THEN id END) as toplam_normal FROM kuponlar WHERE id!='' $sqladder");

if(sed_sql_numrows($sor)<1) { echo "<div class='nokuponda'>Herhangi bir kupon bulunamadı.</div>"; } else {

?>

<div class="space_9 clear"></div>
<div class="middle" style="text-align: center;background: #fff;margin-top: 4px;height: 71px;">
<div class="informer">
<a href="#">
<span class="title"><?=n($toplams_kupon['toplam_kupon']); ?></span>
<span class="text"><?=getTranslation('ajaxtumkuponlarim1')?></span>
</a>
</div>
<div class="informer">
<a href="#">
<span class="title"><?=n($toplams_kazanan['toplam_kazanan']); ?></span>
<span class="text"><?=getTranslation('ajaxtumkuponlarim2')?></span>
</a>
</div>
<div class="informer">
<a href="#">
<span class="title"><?=n($toplams_kaybeden['toplam_kaybeden']); ?></span>
<span class="text"><?=getTranslation('ajaxtumkuponlarim3')?></span>
</a>
</div>
<div class="informer">
<a href="#">
<span class="title"><?=n($toplams_bekleyen['toplam_bekleyen']); ?></span>
<span class="text"><?=getTranslation('ajaxtumkuponlarim4')?></span>
</a>
</div>
<div class="informer">
<a href="#">
<span class="title"><?=n($toplams_iptal['toplam_iptal']); ?></span>
<span class="text"><?=getTranslation('ajaxtumkuponlarim5')?></span>
</a>
</div>
<div class="informer">
<a href="#">
<span class="title"><?=n($toplams_canli['toplam_canli']); ?></span>
<span class="text"><?=getTranslation('ajaxtumkuponlarim6')?></span>
</a>
</div>
<div class="informer">
<a href="#">
<span class="title"><?=n($toplams_normal['toplam_normal']); ?></span>
<span class="text"><?=getTranslation('ajaxtumkuponlarim7')?></span>
</a>
</div>
</div>

<div class="space_9 clear"></div>
<div class="new_sheet cf panelHead">
		
<div class="sheet_c1 left" style="padding: 0px; width: 41px;">
<a class=""><span class=""><?=getTranslation('ajaxtumkuponlarim8')?></span></a>
</div>

<div class="sheet_c1 left" style="padding: 0px;width: 77px;border-right: 1px solid #a8d3e6;text-align: center;">
<a class=""><span class=""><?=getTranslation('ajaxtumkuponlarim9')?></span></a>
</div>

<div class="sheet_c1 left" style="padding: 0px;width: 92px;border-right: 1px solid #a8d3e6;text-align: center;">
<a class=""><span class=""><?=getTranslation('ajaxtumkuponlarim10')?></span></a>
</div>

<div class="sheet_c1 left" style="padding: 0px;width: 88px;border-right: 1px solid #a8d3e6;text-align: center;">
<a class=""><span class=""><?=getTranslation('ajaxtumkuponlarim11')?></span></a>
</div>

<div class="sheet_c1 left" style="padding: 0px;width: 88px;border-right: 1px solid #a8d3e6;text-align: center;">
<a class=""><span class=""><?=getTranslation('ajaxtumkuponlarim12')?></span></a>
</div>

<div class="sheet_c1 left" style="padding: 0px;width: 88px;border-right: 1px solid #a8d3e6;text-align: center;">
<a class=""><span class=""><?=getTranslation('ajaxtumkuponlarim13')?></span></a>
</div>

<div class="sheet_c1 left" style="padding: 0px;width: 88px;border-right: 1px solid #a8d3e6;text-align: center;">
<a class=""><span class=""><?=getTranslation('ajaxtumkuponlarim14')?></span></a>
</div>

<div class="sheet_c1 left" style="padding: 0px;width: 45px;border-right: 1px solid #a8d3e6;text-align: center;">
<a class=""><span class=""><?=getTranslation('ajaxtumkuponlarim15')?></span></a>
</div>

<div class="sheet_c1 left" style="padding: 0px;width: 139px;border-right: 1px solid #a8d3e6;text-align: center;">
<a class=""><span class=""><?=getTranslation('ajaxtumkuponlarim16')?></span></a>
</div>

</div>

<div class="tooltip" id="tooltip"></div>

<div class="space_9"></div>

<div class="new_sheet" style="margin-top: 0px;">

<?php

while($row=sed_sql_fetcharray($sor)) { 
$canli_var = 0;
$sor2 = sed_sql_query("select * from kupon_ic where kupon_id='$row[id]'");
while($row2=sed_sql_fetcharray($sor2)) {
if($row2['spor_tip']=="canli" || $row2['spor_tip']=="canlib" || $row2['spor_tip']=="canlit" || $row2['spor_tip']=="canliv" || $row2['spor_tip']=="canlibuz" || $row2['spor_tip']=="canlimt"){ $canli_var = 1; }
}
?>

<div class="header cf" id="kuponid_<?=$row['id']; ?>" style="color: #<?php if($row['durum']==1){ ?>000<?php } else if($row['durum']==2){ ?>89d047<?php } else if($row['durum']==3){ ?>ff0404<?php } else if($row['durum']==4){ ?>21a5d2<?php } ?>;">
<div class="sheet_c2 pad_l_6 left" onmouseout="untip()" onmouseover="tip('<?=durumnedir($row['durum']); ?>', 0)" style="background: #<?php if($row['durum']==1){ ?>f6f7f5<?php } else if($row['durum']==2){ ?>89d047<?php } else if($row['durum']==3){ ?>ff0404<?php } else if($row['durum']==4){ ?>21a5d2<?php } ?>;line-height: 29px;width: 25px;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">
<div class="marg_txt lightblue">
<?php if($row['durum']==1){ ?>
<img title="Bekliyor" src="/assets/img/ticket/ticket_3.png" alt="" width="9" height="9" style="margin-top:9px;width: 12px;height: 12px;vertical-align: middle;">
<?php } else if($row['durum']==2){ ?>
<img title="Kazandı" src="/assets/img/ticket/ticket_1.png" alt="" width="9" height="9" style="margin-top:9px;width: 12px;height: 12px;vertical-align: middle;">
<?php } else if($row['durum']==3){ ?>
<img title="Kaybetti" src="/assets/img/ticket/ticket_2.png" alt="" width="9" height="9" style="margin-top:9px;width: 12px;height: 12px;vertical-align: middle;">
<?php } else if($row['durum']==4){ ?>
<img title="İptal Edildi" src="/assets/img/ticket/ticket_4.png" alt="" width="9" height="9" style="margin-top:9px;width: 12px;height: 12px;vertical-align: middle;">
<?php } ?>
</div>
</div>
<div class="sheet_c1 left" style="background: #<?php if($row['durum']==1){ ?>f6f7f5<?php } else if($row['durum']==2){ ?>89d047<?php } else if($row['durum']==3){ ?>ff0404<?php } else if($row['durum']==4){ ?>21a5d2<?php } ?>;height: 31px;border-right: 1px solid #a8d3e6;">				
<div id="jq-14036820453" class="sheet_tab " style="margin: 6px 0 0 0px;" onclick="kd<?=$row['id']; ?>('<?=$row['id']; ?>');"><?=$row['id']; ?></div>
</div>

<div class="sheet_c2 pad_l_6 left" onmouseout="untip()" onmouseover="tip('<?=$row['username']; ?> <br> Açıklama : <?php if($row['kupon_nots']) { echo $row['kupon_nots']; }?>', 0)" style="width: 92px;background: #e9f5fb;height: 31px;overflow: hidden;    border-right: 1px solid #a8d3e6;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">
<b><?=$row['username']; ?></b>
</div>

<div class="sheet_c2 pad_l_6 left" onmouseout="untip()" onmouseover="tip('<?=date("d-m-Y H:i:s",$row['kupon_time']); ?>', 0)" style="width: 88px;height: 31px;    border-right: 1px solid #a8d3e6;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">
<b><?=date("d-m",$row['kupon_time']); ?></b>&nbsp;<?=date("H:i:s",$row['kupon_time']); ?>
</div>

<div class="sheet_c2 pad_l_6 left" onmouseout="untip()" onmouseover="tip('Yatırılan : <?=nf($row['yatan']); ?> (K)', 0)" style="width: 88px;    border-right: 1px solid #a8d3e6;background: #e9f5fb;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">
<b><?=nf($row['yatan']); ?> (K)</b>
</div>

<div class="sheet_c2 pad_l_6 left" onmouseout="untip()" onmouseover="tip('T. Oran : <?=nf($row['oran']); ?>', 0)" style="width: 88px;    border-right: 1px solid #a8d3e6;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">
<b><?=nf($row['oran']); ?></b>
</div>

<div class="sheet_c2 pad_l_6 left" onmouseout="untip()" onmouseover="tip('MAx. Kazanç : <?=nf($row['tutar']); ?> (K)', 0)" style="width: 88px;    border-right: 1px solid #a8d3e6;background: #e9f5fb;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">
<b><?=nf($row['tutar']); ?> (K)</b>
</div>

<div class="sheet_c2 pad_l_6 left" onmouseout="untip()" onmouseover="tip('Bahis : <?=$row['toplam_mac']; ?> <br> Tutan Bahis : <?=$row['tutan']; ?>', 0)" style="width: 45px;    border-right: 1px solid #a8d3e6;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">
<b><?=$row['toplam_mac']; ?>/<?=$row['tutan']; ?></b>
</div>

<div class="sheet_c2 pad_l_6 left" style="width: 27px;    border-right: 1px solid #a8d3e6;background: #e9f5fb;line-height: 41px;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">
<a class="grid" onmouseout="untip()" onmouseover="tip('Kuponu Yazdır', 0)" href="javascript:;" onClick="kuponyazdir('<?=$row['id']; ?>');"><img style="margin-top:6px;" src="/assets/img/ticket/print.png" border="0"></a>
</div>

<div class="sheet_c2 pad_l_6 left" style="width: 27px;    border-right: 1px solid #a8d3e6;background: #e9f5fb;line-height: 41px;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">

<?php 

$baslama = $row['baslamatime'];

$yatirma_zaman = $row['kupon_time'];

$gecen_zaman = time()-$yatirma_zaman;

$silme_sure = userayar('iptal_sure')*60;

$suan = time();

$baslamavefark = $baslama-$suan;

$tarih_ver = date("Y.m.d");

$iptalsayisi = bilgi("SELECT COUNT(CASE WHEN id!='' THEN id END) as toplam_iptal_adet FROM iptal_listesi WHERE iptal_user_id='$ub[id]' and tarih='$tarih_ver'");

$toplam_iptal_adeti = $iptalsayisi['toplam_iptal_adet'];

if($canli_var!=1) {

if($ub['alt_durum']==0 && userayar('iptal_limit')>$toplam_iptal_adeti) {

if(

($row['canli']=="0" && $gecen_zaman<$silme_sure && $baslamavefark>0  && $row['durum']!="4") || 

($ub['alt_durum']>0 && $baslamavefark>0 && $row['durum']!="4") || 

($ub['alt_alt_durum']>0 && $row['durum']!="4") || ($ub['alt_durum']>0 && $row['durum']!="4") ) { 

?>

<a class="grid" onmouseout="untip()" onmouseover="tip('Kuponu İptal Et', 0)" href="javascript:;" onclick="kupon_iptal('<?=$row['id']; ?>');" title="İptal">
<img src="../assets/img/ticket/delete.png" alt="İptal" border="0">
</a>

<?php } ?>

<?php } ?>

<?php } ?>

<?php

if($canli_var!=1) {

if($ub['alt_durum']>0) {

if(

($row['canli']=="0" && $gecen_zaman<$silme_sure && $baslamavefark>0  && $row['durum']!="4") || 

($ub['alt_durum']>0 && $baslamavefark>0 && $row['durum']!="4") || 

($ub['alt_alt_durum']>0 && $row['durum']!="4") || ($ub['alt_durum']>0 && $row['durum']!="4") ) { 

?>

<a class="grid" onmouseout="untip()" onmouseover="tip('Kuponu İptal Et', 0)" href="javascript:;" onclick="kupon_iptal('<?=$row['id']; ?>');" title="İptal">
<img src="../assets/img/ticket/delete.png" alt="İptal" border="0">
</a>

<?php } ?>

<?php } ?>

<?php } ?>

</div>

<div class="sheet_c2 pad_l_6 left" style="width: 27px;    border-right: 1px solid #a8d3e6;background: #e9f5fb;line-height: 41px;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">

<?php if($row['durum']=="2" && $row['odendi']=="0") { ?>

<i onclick="kupon_odendi('<?=$row['id']; ?>');" class="fa fa-dollar"></i>

<?php } ?>

</div>

<div class="sheet_c2 pad_l_6 left" style="width: 27px;    border-right: 1px solid #a8d3e6;background: #e9f5fb;line-height: 41px;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;"></div>

<div class="sheet_c2 pad_l_6 left" style="width: 27px;    border-right: 1px solid #a8d3e6;background: #e9f5fb;line-height: 41px;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">
<?php if($row['canli']==3) { ?>
<a class="grid" onmouseout="untip()" onmouseover="tip('Kuponu Görüntüle', 0)" href="javascript:kupongoruntulesanal('<?=$row['id']; ?>');" title="Görüntüle"><img src="/assets/img/ticket/sheet_zoom-1DDB2A5ADBB9A1DD91D6A0584C8AE0BE.png" style="margin-top:6px;" alt="Görüntüle" border="0"></a>
<?php } else { ?>
<a class="grid" onmouseout="untip()" onmouseover="tip('Kuponu Görüntüle', 0)" href="javascript:kupongoruntule('<?=$row['id']; ?>');" title="Görüntüle"><img src="/assets/img/ticket/sheet_zoom-1DDB2A5ADBB9A1DD91D6A0584C8AE0BE.png" style="margin-top:6px;" alt="Görüntüle" border="0"></a>
<?php } ?>
</div>

</div>

<?php } ?>

</div>

<div class="space_9"></div>
<div class="space"></div>

<span>
<div class="sheet_body_sub on cf">
<div class="main_box pager cf">
<div class="left" style="width: 100%">
<div class="div_center">

<?php $style = ($style=='') ? '2' : '';

$i++;

} ?>
			

			<?php 
		$hangi_sayfa= ($gelen_sayfa > 0)? $gelen_sayfa : 1 ;
		echo '<div class="inline" style="height: 38px;line-height: 24px;"><nav class="zipagin-light light-green">';	
	
	
			$alt= ($gelen_sayfa - $s_s);
			if($sayfa_sayisi <= $s_s || $gelen_sayfa <= $s_s ) {$alt=1;} 
			$ust= (($gelen_sayfa + $s_s)< $sayfa_sayisi ) ? ($gelen_sayfa + $s_s) : ($sayfa_sayisi);	
			echo ($gelen_sayfa > 1 )? '<a class="" href="javascript:;" onclick="kupongetir(1,1);" id="sayfaveri">İlk Sayfa</a><a class="" href="javascript:;" id="sayfaveri" onclick="kupongetir(1,'.($gelen_sayfa -1).');">« Geri</a>':' ';
			for($i=$alt; $i<=$ust ;$i++){		
				echo ($i != $gelen_sayfa ) ? '<a class="" href="javascript:;" id="sayfaveri" onclick="kupongetir(1,'.$i.');">'.$i.'</a>' : '<span>'.$i.'</span>';
				}
			echo ($gelen_sayfa < $sayfa_sayisi)? '<a class="" href="javascript:;" id="sayfaveri" onclick="kupongetir(1,'.($gelen_sayfa +1).');">İleri »</a><a class="" href="javascript:;" id="sayfaveri" onclick="kupongetir(1,'.$sayfa_sayisi.');">Son Sayfa</a>' :'';
			echo '</nav></div>';
?>

</div>
</div>
</div>
</div>
</span>

<?php } else { echo '<tr><td colspan="5" class="s_yok">Hiç Bir Sonuç Bulunamadı</td></tr></table>'; } ?>

</div>

<script>

function kupon_iptal(id) {

if(confirm(''+id+' <?=getTranslation('ajaxtumkuponlarim36')?>')) {

loadall();

var rand = Math.random();

$.get('../ajax.php?a=kuponiptal&id='+id+'&rand='+rand+'',function(data) { 

if(data=="401") { failcont('Hata','<?=getTranslation('ajaxtumkuponlarim37')?>'); } else

if(data=="404") { failcont('Hata','<?=getTranslation('ajaxtumkuponlarim38')?>'); } else

if(data=="405") { failcont('Hata','<?=getTranslation('ajaxtumkuponlarim39')?>'); } else {

kupongetir(5);

limitupdate();

}

});

}

}

function kupon_odendi(id) {

if(confirm(''+id+' <?=getTranslation('ajaxnumaralikuponuodendi')?>')) {

loadall();

var rand = Math.random();

$.get('../ajax.php?a=kuponodendi&id='+id+'&rand='+rand+'',function(data) { 

if(data=="401") { failcont('Hata','<?=getTranslation('failconthata19')?>'); } else

if(data=="404") { failcont('Hata','<?=getTranslation('failconthata20')?>'); } else {

kupongetir(5);

limitupdate();

}

});

}

}

</script>



<?php }

if($a=="ckuponlarim") {

$kuponno = gd("kupon_no");

$tarih1 = basla_time(gd("tarih1"));

$tarih2 = bitir_time(gd("tarih2"));

$satir = gd("satir");

$durum = gd("durum");

$tip = gd("tip");

$pageper = 50;

$kupon_sure = gd("kupon_sure");

$order = gd("order");

$ascdesc = gd("ascdesc");

if($ascdesc=="asc") { $yenidesk = "desc"; } else { $yenidesk = "asc"; }





if(!empty($kuponno)) { $kupon_ekle = "and id='$kuponno'"; } else { $kupon_ekle = ""; }

if(!empty($satir)) {

if($satir=="kombine") { $satir_ekle = "and toplam_mac>1"; } else

if($satir==3) { $satir_ekle = "and toplam_mac>2"; } else

if($satir==1 || $satir==2) { $satir_ekle = "and toplam_mac='$satir'"; }	

} else {

$satir_ekle = "";	

}

if(!empty($durum)) {

if($durum=="0") { $durum_ekle = ""; } else

if($durum=="1") { $durum_ekle = "and durum='1'"; } else

if($durum=="2") { $durum_ekle = "and durum='2'"; } else 

if($durum=="3") { $durum_ekle = "and durum='3'"; } else

if($durum=="4") { $durum_ekle = "and durum='4'"; } else

if($durum=="5") { $durum_ekle = "and durum='2' and odendi='1'"; }

} else {

$durum_ekle = "";	

}

$bugun = date('d.m.Y H:i:s');
$yenitarih = strtotime('-30 minute',strtotime($bugun));
$yenitarih = date('d.m.Y H:i:s' ,$yenitarih );
$yenitarih2 = strtotime('-1 hour',strtotime($bugun));
$yenitarih2 = date('d.m.Y H:i:s' ,$yenitarih2 );
$yenitarih3 = strtotime('-3 hour',strtotime($bugun));
$yenitarih3 = date('d.m.Y H:i:s' ,$yenitarih3 );
$yenitarih4 = strtotime('-6 hour',strtotime($bugun));
$yenitarih4 = date('d.m.Y H:i:s' ,$yenitarih4 );

if(!empty($kupon_sure)) {

if($kupon_sure=="0") { $kupon_sure_ekle = ""; } else

if($kupon_sure=="1") { $kupon_sure_ekle = "and kupon_tarih > '$yenitarih'"; } else

if($kupon_sure=="2") { $kupon_sure_ekle = "and kupon_tarih > '$yenitarih2'"; } else 

if($kupon_sure=="3") { $kupon_sure_ekle = "and kupon_tarih > '$yenitarih3'"; } else

if($kupon_sure=="4") { $kupon_sure_ekle = "and kupon_tarih > '$yenitarih4'"; }

} else {

$kupon_sure_ekle = "";	

}


$gelen_sayfa = (isset($_GET['sayfa']) && $_GET['sayfa'] !='' ) ? intval($_GET['sayfa']) : 1;

//Bağlanılacak Tablo
$tablo = 'kuponlar';

//Sayfada kaç kayıt görünecek
$limit = $pageper;

//Kaç sayfa öncesi ve sonrası görünecek
$s_s = 10;

/*------------------------------------
Alan Başlıklarını ve $sonuc['alan1'] 
kısımlarını kendinize göre değiştirin
-------------------------------------*/

$sqladder_sayfalama = "and user_id='$ub[id]' and casino!='0' and kupon_time between '$tarih1' and '$tarih2' $kupon_ekle $satir_ekle $durum_ekle $kupon_sure_ekle and hesap_kesim_zaman=''";


$s_sor = sed_sql_query("select count(id) from $tablo where id!='' $sqladder_sayfalama") or trigger_error(mysql_error(),E_USER_ERROR);

$satir = sed_sql_result($s_sor,0);

sed_sql_freeresult($s_sor);

if($satir >0){//sonuç varsa

$baslama = ($gelen_sayfa > 1) ? (($gelen_sayfa -1) * $limit) : 0 ;

$sayfa_kac = $satir/$limit;

$sayfa_sayisi = ($satir % $limit != 0) ? intval($sayfa_kac)+1 : intval($sayfa_kac);

$basla=( $satir >= $baslama ) ? $baslama : 0 ;

unset( $sayfa_kac, $baslama );



$sqladder = "and user_id='$ub[id]' and casino!='0' and kupon_time between '$tarih1' and '$tarih2' $kupon_ekle $sahip_ekle $satir_ekle $durum_ekle $tip_ekle $kupon_sure_ekle and hesap_kesim_zaman=''";

$sor = sed_sql_query("select * from kuponlar where id!='' $sqladder order by CAST($order AS UNSIGNED) $ascdesc limit $basla,$limit");

$i=1;

$style='';


$toplams_kupon = bilgi("SELECT COUNT(CASE WHEN id!='' THEN id END) as toplam_kupon FROM kuponlar WHERE id!='' $sqladder");

$toplams_kazanan = bilgi("SELECT COUNT(CASE WHEN durum='2' THEN id END) as toplam_kazanan FROM kuponlar WHERE id!='' $sqladder");

$toplams_kaybeden = bilgi("SELECT COUNT(CASE WHEN durum='3' THEN id END) as toplam_kaybeden FROM kuponlar WHERE id!='' $sqladder");

$toplams_bekleyen = bilgi("SELECT COUNT(CASE WHEN durum='1' THEN id END) as toplam_bekleyen FROM kuponlar WHERE id!='' $sqladder");

$toplams_iptal = bilgi("SELECT COUNT(CASE WHEN durum='4' THEN id END) as toplam_iptal FROM kuponlar WHERE id!='' $sqladder");

$toplams_canli = bilgi("SELECT COUNT(CASE WHEN canli='1' OR canlib='1' OR canlit='1' OR canliv='1' OR canlibuz='1' OR canlih='1' THEN id END) as toplam_canli FROM kuponlar WHERE id!='' $sqladder");

$toplams_normal = bilgi("SELECT COUNT(CASE WHEN futbol='1' OR basketbol='1' OR tenis='1' OR voleybol='1' OR buzhokeyi='1' OR hentbol='1' THEN id END) as toplam_normal FROM kuponlar WHERE id!='' $sqladder");


if(sed_sql_numrows($sor)<1) { echo "<div class='nokuponda'>Herhangi bir kupon bulunamadı.</div>"; } else {

?>

<div class="space_9 clear"></div>
<div class="middle" style="text-align: center;background: #fff;margin-top: 4px;height: 71px;">
<div class="informer">
<a href="#">
<span class="title"><?=n($toplams_kupon['toplam_kupon']); ?></span>
<span class="text"><?=getTranslation('ajaxtumkuponlarim1')?></span>
</a>
</div>
<div class="informer">
<a href="#">
<span class="title"><?=n($toplams_kazanan['toplam_kazanan']); ?></span>
<span class="text"><?=getTranslation('ajaxtumkuponlarim2')?></span>
</a>
</div>
<div class="informer">
<a href="#">
<span class="title"><?=n($toplams_kaybeden['toplam_kaybeden']); ?></span>
<span class="text"><?=getTranslation('ajaxtumkuponlarim3')?></span>
</a>
</div>
<div class="informer">
<a href="#">
<span class="title"><?=n($toplams_bekleyen['toplam_bekleyen']); ?></span>
<span class="text"><?=getTranslation('ajaxtumkuponlarim4')?></span>
</a>
</div>
<div class="informer">
<a href="#">
<span class="title"><?=n($toplams_iptal['toplam_iptal']); ?></span>
<span class="text"><?=getTranslation('ajaxtumkuponlarim5')?></span>
</a>
</div>
<div class="informer">
<a href="#">
<span class="title"><?=n($toplams_canli['toplam_canli']); ?></span>
<span class="text"><?=getTranslation('ajaxtumkuponlarim6')?></span>
</a>
</div>
<div class="informer">
<a href="#">
<span class="title"><?=n($toplams_normal['toplam_normal']); ?></span>
<span class="text"><?=getTranslation('ajaxtumkuponlarim7')?></span>
</a>
</div>
</div>

<div class="space_9 clear"></div>
<div class="new_sheet cf panelHead">
		
<div class="sheet_c1 left" style="padding: 0px; width: 41px;">
<a class=""><span class=""><?=getTranslation('ajaxtumkuponlarim8')?></span></a>
</div>

<div class="sheet_c1 left" style="padding: 0px;width: 77px;border-right: 1px solid #a8d3e6;text-align: center;">
<a class=""><span class=""><?=getTranslation('ajaxtumkuponlarim9')?></span></a>
</div>

<div class="sheet_c1 left" style="padding: 0px;width: 92px;border-right: 1px solid #a8d3e6;text-align: center;">
<a class=""><span class=""><?=getTranslation('ajaxtumkuponlarim10')?></span></a>
</div>

<div class="sheet_c1 left" style="padding: 0px;width: 88px;border-right: 1px solid #a8d3e6;text-align: center;">
<a class=""><span class=""><?=getTranslation('ajaxtumkuponlarim11')?></span></a>
</div>

<div class="sheet_c1 left" style="padding: 0px;width: 88px;border-right: 1px solid #a8d3e6;text-align: center;">
<a class=""><span class=""><?=getTranslation('ajaxtumkuponlarim12')?></span></a>
</div>

<div class="sheet_c1 left" style="padding: 0px;width: 88px;border-right: 1px solid #a8d3e6;text-align: center;">
<a class=""><span class=""><?=getTranslation('ajaxtumkuponlarim13')?></span></a>
</div>

<div class="sheet_c1 left" style="padding: 0px;width: 88px;border-right: 1px solid #a8d3e6;text-align: center;">
<a class=""><span class=""><?=getTranslation('ajaxtumkuponlarim14')?></span></a>
</div>

<div class="sheet_c1 left" style="padding: 0px;width: 45px;border-right: 1px solid #a8d3e6;text-align: center;">
<a class=""><span class=""><?=getTranslation('ajaxtumkuponlarim15')?></span></a>
</div>

<div class="sheet_c1 left" style="padding: 0px;width: 139px;border-right: 1px solid #a8d3e6;text-align: center;">
<a class=""><span class=""><?=getTranslation('ajaxtumkuponlarim16')?></span></a>
</div>

</div>

<div class="tooltip" id="tooltip"></div>

<div class="space_9"></div>

<div class="new_sheet" style="margin-top: 0px;">

<?php

while($row=sed_sql_fetcharray($sor)) { 
$sor2 = sed_sql_query("select * from kupon_ic where kupon_id='$row[id]'");
while($row2=sed_sql_fetcharray($sor2)) {
$canlibilgi = sed_sql_query("select * from canli_maclar where id='$row2[mac_db_id]'");
if(sed_sql_numrows($canlibilgi)>0) {
$bilgisi = sed_sql_fetcharray($canlibilgi);	
if($bilgisi['songuncelleme']<$farki) {} elseif($bilgisi['devremi']=="1") { } elseif($bilgisi['gelecek']=="1") { } else{
$canlivar = "<strong><img src=/img/live.gif /></strong>";
}}} 
?>

<div class="header cf" id="kuponid_<?=$row['id']; ?>" style="color: #<?php if($row['durum']==1){ ?>000<?php } else if($row['durum']==2){ ?>89d047<?php } else if($row['durum']==3){ ?>ff0404<?php } else if($row['durum']==4){ ?>21a5d2<?php } ?>;">
<div class="sheet_c2 pad_l_6 left" onmouseout="untip()" onmouseover="tip('<?=durumnedir($row['durum']); ?>', 0)" style="background: #<?php if($row['durum']==1){ ?>f6f7f5<?php } else if($row['durum']==2){ ?>89d047<?php } else if($row['durum']==3){ ?>ff0404<?php } else if($row['durum']==4){ ?>21a5d2<?php } ?>;line-height: 29px;width: 25px;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">
<div class="marg_txt lightblue">
<?php if($row['durum']==1){ ?>
<img title="Bekliyor" src="/assets/img/ticket/ticket_3.png" alt="" width="9" height="9" style="margin-top:9px;width: 12px;height: 12px;vertical-align: middle;">
<?php } else if($row['durum']==2){ ?>
<img title="Kazandı" src="/assets/img/ticket/ticket_1.png" alt="" width="9" height="9" style="margin-top:9px;width: 12px;height: 12px;vertical-align: middle;">
<?php } else if($row['durum']==3){ ?>
<img title="Kaybetti" src="/assets/img/ticket/ticket_2.png" alt="" width="9" height="9" style="margin-top:9px;width: 12px;height: 12px;vertical-align: middle;">
<?php } else if($row['durum']==4){ ?>
<img title="İptal Edildi" src="/assets/img/ticket/ticket_4.png" alt="" width="9" height="9" style="margin-top:9px;width: 12px;height: 12px;vertical-align: middle;">
<?php } ?>
</div>
</div>
<div class="sheet_c1 left" style="background: #<?php if($row['durum']==1){ ?>f6f7f5<?php } else if($row['durum']==2){ ?>89d047<?php } else if($row['durum']==3){ ?>ff0404<?php } else if($row['durum']==4){ ?>21a5d2<?php } ?>;height: 31px;border-right: 1px solid #a8d3e6;">				
<div id="jq-14036820453" class="sheet_tab " style="margin: 6px 0 0 0px;" onclick="kd<?=$row['id']; ?>('<?=$row['id']; ?>');"><?=$row['id']; ?></div>
</div>

<div class="sheet_c2 pad_l_6 left" onmouseout="untip()" onmouseover="tip('<?=$row['username']; ?> <br> Açıklama : <?php if($row['kupon_nots']) { echo $row['kupon_nots']; }?>', 0)" style="width: 92px;background: #e9f5fb;height: 31px;overflow: hidden;    border-right: 1px solid #a8d3e6;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">
<b><?=$row['username']; ?></b>
</div>

<div class="sheet_c2 pad_l_6 left" onmouseout="untip()" onmouseover="tip('<?=date("d-m-Y H:i:s",$row['kupon_time']); ?>', 0)" style="width: 88px;height: 31px;    border-right: 1px solid #a8d3e6;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">
<b><?=date("d-m",$row['kupon_time']); ?></b>&nbsp;<?=date("H:i:s",$row['kupon_time']); ?>
</div>

<div class="sheet_c2 pad_l_6 left" onmouseout="untip()" onmouseover="tip('Yatırılan : <?=nf($row['yatan']); ?> (K)', 0)" style="width: 88px;    border-right: 1px solid #a8d3e6;background: #e9f5fb;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">
<b><?=nf($row['yatan']); ?> (K)</b>
</div>

<div class="sheet_c2 pad_l_6 left" onmouseout="untip()" onmouseover="tip('T. Oran : <?=nf($row['oran']); ?>', 0)" style="width: 88px;    border-right: 1px solid #a8d3e6;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">
<b><?=nf($row['oran']); ?></b>
</div>

<div class="sheet_c2 pad_l_6 left" onmouseout="untip()" onmouseover="tip('MAx. Kazanç : <?=nf($row['tutar']); ?> (K)', 0)" style="width: 88px;    border-right: 1px solid #a8d3e6;background: #e9f5fb;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">
<b><?=nf($row['tutar']); ?> (K)</b>
</div>

<div class="sheet_c2 pad_l_6 left" onmouseout="untip()" onmouseover="tip('Bahis : <?=$row['toplam_mac']; ?> <br> Tutan Bahis : <?=$row['tutan']; ?>', 0)" style="width: 45px;    border-right: 1px solid #a8d3e6;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">
<b><?=$row['toplam_mac']; ?>/<?=$row['tutan']; ?></b>
</div>

<div class="sheet_c2 pad_l_6 left" style="width: 27px;    border-right: 1px solid #a8d3e6;background: #e9f5fb;line-height: 41px;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">
<a class="grid" onmouseout="untip()" onmouseover="tip('Kuponu Yazdır', 0)" href="javascript:;" onClick="kuponyazdir('<?=$row['id']; ?>');"><img style="margin-top:6px;" src="/assets/img/ticket/print.png" border="0"></a>
</div>

<div class="sheet_c2 pad_l_6 left" style="width: 27px;    border-right: 1px solid #a8d3e6;background: #e9f5fb;line-height: 41px;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">

<?php 

$baslama = $row['baslamatime'];

$yatirma_zaman = $row['kupon_time'];

$gecen_zaman = time()-$yatirma_zaman;

$silme_sure = userayar('iptal_sure');

$suan = time();

$baslamavefark = $baslama-$suan;

$tarih_ver = date("Y.m.d");

$iptalsayisi = bilgi("SELECT COUNT(CASE WHEN id!='' THEN id END) as toplam_iptal_adet FROM iptal_listesi WHERE iptal_user_id='$ub[id]' and tarih='$tarih_ver'");

$toplam_iptal_adeti = $iptalsayisi['toplam_iptal_adet'];

if($ub['alt_durum']==0 && userayar('iptal_limit')>$toplam_iptal_adeti) {

if(

($row['canli']=="0" && $gecen_zaman<$silme_sure && $baslamavefark>0  && $row['durum']!="4") || 

($ub['alt_durum']>0 && $baslamavefark>0 && $row['durum']!="4") || 

($ub['alt_alt_durum']>0 && $row['durum']!="4") || ($ub['alt_durum']>0 && $row['durum']!="4") ) { 

?>

<a class="grid" onmouseout="untip()" onmouseover="tip('Kuponu İptal Et', 0)" href="javascript:;" onclick="kupon_iptal('<?=$row['id']; ?>');" title="İptal">
<img src="../assets/img/ticket/delete.png" alt="İptal" border="0">
</a>

<?php } ?>

<?php } ?>

<?php

if($ub['alt_durum']>0) {

if(

($row['canli']=="0" && $gecen_zaman<$silme_sure && $baslamavefark>0  && $row['durum']!="4") || 

($ub['alt_durum']>0 && $baslamavefark>0 && $row['durum']!="4") || 

($ub['alt_alt_durum']>0 && $row['durum']!="4") || ($ub['alt_durum']>0 && $row['durum']!="4") ) { 

?>

<a class="grid" onmouseout="untip()" onmouseover="tip('Kuponu İptal Et', 0)" href="javascript:;" onclick="kupon_iptal('<?=$row['id']; ?>');" title="İptal">
<img src="../assets/img/ticket/delete.png" alt="İptal" border="0">
</a>

<?php } ?>

<?php } ?>

</div>

<div class="sheet_c2 pad_l_6 left" style="width: 27px;    border-right: 1px solid #a8d3e6;background: #e9f5fb;line-height: 41px;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">

<?php if($row['durum']=="2" && $row['odendi']=="0") { ?>

<i onclick="kupon_odendi('<?=$row['id']; ?>');" class="fa fa-dollar"></i>

<?php } ?>

</div>

<div class="sheet_c2 pad_l_6 left" style="width: 27px;    border-right: 1px solid #a8d3e6;background: #e9f5fb;line-height: 41px;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;"></div>

<?php if($row['casino']==2){ ?>
<div class="sheet_c2 pad_l_6 left" style="width: 27px;    border-right: 1px solid #a8d3e6;background: #e9f5fb;line-height: 41px;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">
<a class="grid" onmouseout="untip()" onmouseover="tip('Kuponu Görüntüle', 0)" href="javascript:kupongoruntulerulet('<?=$row['id']; ?>');" title="Görüntüle"><img src="/assets/img/ticket/sheet_zoom-1DDB2A5ADBB9A1DD91D6A0584C8AE0BE.png" style="margin-top:6px;" alt="Görüntüle" border="0"></a>
</div>
<?php } else { ?>
<div class="sheet_c2 pad_l_6 left" style="width: 27px;    border-right: 1px solid #a8d3e6;background: #e9f5fb;line-height: 41px;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">
<a class="grid" onmouseout="untip()" onmouseover="tip('Kuponu Görüntüle', 0)" href="javascript:kupongoruntulecasino('<?=$row['id']; ?>');" title="Görüntüle"><img src="/assets/img/ticket/sheet_zoom-1DDB2A5ADBB9A1DD91D6A0584C8AE0BE.png" style="margin-top:6px;" alt="Görüntüle" border="0"></a>
</div>
<?php } ?>

</div>

<?php } ?>

</div>

<div class="space_9"></div>
<div class="space"></div>

<span>
<div class="sheet_body_sub on cf">
<div class="main_box pager cf">
<div class="left" style="width: 100%">
<div class="div_center">

<?php $style = ($style=='') ? '2' : '';

$i++;

} ?>
			

			<?php 
		$hangi_sayfa= ($gelen_sayfa > 0)? $gelen_sayfa : 1 ;
		echo '<div class="inline" style="height: 38px;line-height: 24px;"><nav class="zipagin-light light-green">';	
	
	
			$alt= ($gelen_sayfa - $s_s);
			if($sayfa_sayisi <= $s_s || $gelen_sayfa <= $s_s ) {$alt=1;} 
			$ust= (($gelen_sayfa + $s_s)< $sayfa_sayisi ) ? ($gelen_sayfa + $s_s) : ($sayfa_sayisi);	
			echo ($gelen_sayfa > 1 )? '<a class="" href="javascript:;" onclick="kupongetir(1,1);" id="sayfaveri">İlk Sayfa</a><a class="" href="javascript:;" id="sayfaveri" onclick="kupongetir(1,'.($gelen_sayfa -1).');">« Geri</a>':' ';
			for($i=$alt; $i<=$ust ;$i++){		
				echo ($i != $gelen_sayfa ) ? '<a class="" href="javascript:;" id="sayfaveri" onclick="kupongetir(1,'.$i.');">'.$i.'</a>' : '<span>'.$i.'</span>';
				}
			echo ($gelen_sayfa < $sayfa_sayisi)? '<a class="" href="javascript:;" id="sayfaveri" onclick="kupongetir(1,'.($gelen_sayfa +1).');">İleri »</a><a class="" href="javascript:;" id="sayfaveri" onclick="kupongetir(1,'.$sayfa_sayisi.');">Son Sayfa</a>' :'';
			echo '</nav></div>';
?>

</div>
</div>
</div>
</div>
</span>

<?php } else { echo '<tr><td colspan="5" class="s_yok">Hiç Bir Sonuç Bulunamadı</td></tr></table>'; } ?>

</div>

<script>

function kupon_iptal(id) {

if(confirm(''+id+' <?=getTranslation('ajaxtumkuponlarim36')?>')) {

loadall();

var rand = Math.random();

$.get('../ajax.php?a=kuponiptal&id='+id+'&rand='+rand+'',function(data) { 

if(data=="401") { failcont('Hata','<?=getTranslation('ajaxtumkuponlarim37')?>'); } else

if(data=="404") { failcont('Hata','<?=getTranslation('ajaxtumkuponlarim38')?>'); } else

if(data=="405") { failcont('Hata','<?=getTranslation('ajaxtumkuponlarim39')?>'); } else {

kupongetir(5);

limitupdate();

}

});

}

}

function kupon_odendi(id) {

if(confirm(''+id+' <?=getTranslation('ajaxnumaralikuponuodendi')?>')) {

loadall();

var rand = Math.random();

$.get('../ajax.php?a=kuponodendi&id='+id+'&rand='+rand+'',function(data) { 

if(data=="401") { failcont('Hata','<?=getTranslation('failconthata19')?>'); } else

if(data=="404") { failcont('Hata','<?=getTranslation('failconthata20')?>'); } else {

kupongetir(5);

limitupdate();

}

});

}

}

</script>



<?php }
@ob_end_flush();
@ob_end_flush();

sed_sql_close($connection_id);
?>