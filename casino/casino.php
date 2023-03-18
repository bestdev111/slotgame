<?php
session_start();
header('Content-Type: application/json; charset=utf-8');

include '../db.php';
/*$linkmysql = mysql_connect($dbhost,$dbuser,$dbpass);
mysql_select_db($dbname);
sed_sql_query("SET NAMES 'UTF8'");
sed_sql_query("SET character_set_connection = 'UTF8'");
sed_sql_query("SET character_set_client = 'UTF8'");
sed_sql_query("SET character_set_results = 'UTF8'");*/

function curl($adres){
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$adres);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 5);
return  curl_exec($ch);
curl_close($ch);
}

function farray($query){ $sql =  sed_sql_fetcharray(sed_sql_query($query)); return $sql; }

$gameid = $_GET['game_id'];

## CASİNO KUPON ##

if($_GET['action']=="coupon"){

///////////////////////////////////////////////

if($_GET['do']=="add_casino_bet"){



function kuponda_ayni_kontrolcasino($session_id,$gameid,$oddid,$grupid) {
$kontrol = sed_sql_query("select ev_takim,konuk_takim,session_id,mac_db_id from kupongecicisanal where (ev_takim like '%$ev_takim%' or konuk_takim like '%$konuk_takim%') and session_id='$session_id' and mac_db_id!='$id'");
if(sed_sql_numrows($kontrol)>0) {
	die("124");
}	
}

$session_id = $_GET['session_id'];
$roundid = $_GET['round'];
$oddid = $_GET['odid'];
$grupid = $_GET['grupid'];
$gameid = $_GET['gameid'];
$odds = $_GET['odds'];
$timeleftgame = $_GET['timeleftgame'];
$odname = $_GET['odname'];
$gname = $_GET['gname'];

$items = $_GET['items'];
if($items!=''){
foreach($_GET['items'] as $key => $data) {

$ekle .= "$data[number],";
$donecek = substr($ekle,0,-1);

}
} else {
$donecek = "";
}

$js = curl("https://betwingo.xyz/api/casino_json.php?ajax=1");
$geldi = json_decode($js);
foreach($geldi as $ok) {
if($gameid==$ok->game_id){
$kartsayisi = 1;
foreach($ok->cards as $ok) {
$kartsayisi++;
}
}
}

if($gameid==6 && ($oddid==494 || $oddid==495 || $oddid==496 || $oddid==497 || $oddid==498 || $oddid==499)){
	$odname_ver = "".$odname." ".$kartsayisi.".Kart";
} else {
	$odname_ver = $odname;
}

$suan = time();

kuponda_ayni_kontrolcasino($session_id,$gameid,$oddid,$grupid);

if($odds=="-") { die(); }

$kontrol = sed_sql_query("select * from kupon_casino where session_id='$session_id' and gameid='$gameid'");

if(sed_sql_numrows($kontrol)<1) {

sed_sql_query("insert into kupon_casino (id,session_id,aktif,gameid,roundid,oddid,grupid,oran,secenek,sayi,ilkgiris) 

values ('','$session_id','1','$gameid','$roundid','$oddid','$grupid','$odds','$odname_ver','$donecek','$suan')");

} else {

$kupondaki = sed_sql_fetchassoc($kontrol);

sed_sql_query("update kupon_casino set aktif='1',roundid='$roundid',oddid='$oddid',grupid='$grupid',oran='$odds',secenek='$odname_ver',sayi='$donecek' where id='$kupondaki[id]'");

}

/////////////////////////////// KUPON İÇERİĞİ ///////////////////////////////////////

$sor = sed_sql_query("select * from kupon_casino where session_id='$session_id' order by id asc");

if(sed_sql_numrows($sor)<1) {

$bos = 1;

$json2[] = array(
"id"=>"1338",
"user"=>"uzun",
"lastlogin"=>"15-08-2020 21:56:01",
"parent"=>true,
"online"=>false
);

$json = array(
"popup"=>false,
"nt"=>"",
"balance"=>"0.00",
"changes"=>false,
"chat"=>$json2,
"unread"=>false
);

} else {

while($row=sed_sql_fetcharray($sor)) {

$oran = $oran*$row['oran'];

if($row['gameid']==1){
$oyun_isim = "Sayısal Loto 7";
} else if($row['gameid']==3){
$oyun_isim = "Sayısal Loto 5";
} else if($row['gameid']==5){
$oyun_isim = "Poker";
} else if($row['gameid']==6){
$oyun_isim = "Bakara";
} else if($row['gameid']==7){
$oyun_isim = "Çarkıfelek";
} else if($row['gameid']==8){
$oyun_isim = "Basmaca";
} else if($row['gameid']==9){
$oyun_isim = "Sayısal Loto 6";
} else if($row['gameid']==10){
$oyun_isim = "Zar Düellosu";
} else if($row['gameid']==12){
$oyun_isim = "6+ Poker";
}

$js = curl("https://betwingo.xyz/api/casino_json.php?ajax=1");
$geldi = json_decode($js);

$js2 = curl("https://betwingo.xyz/api/casino_json.php?ajax=2");
$geldi2 = json_decode($js2);

foreach($geldi2 as $ok2) {

if($row['gameid']==$ok2->gameId){

foreach($ok2->options as $ok3) {

if($row['oddid']==$ok3->id){

if($row['sayi']>0){
$sayi_ver = $row['sayi'];
} else {
$sayi_ver = 0;
}

$json_bets = array(
"value"=>$ok3->value,
"status"=>$ok3->status,
"id"=>$ok3->id,
"itemsCount"=>$ok3->itemsCount,
"suits"=>$ok3->suits,
"sayi"=>$sayi_ver,
"expectedBlueDice"=>$ok3->expectedBlueDice
);

}

}

}

}

foreach($geldi as $ok) {

if($ok->game_id==1){
$oyun_isim = "Sayısal Loto 7";
} else if($ok->game_id==3){
$oyun_isim = "Sayısal Loto 5";
} else if($ok->game_id==5){
$oyun_isim = "Poker";
} else if($ok->game_id==6){
$oyun_isim = "Bakara";
} else if($ok->game_id==7){
$oyun_isim = "Çarkıfelek";
} else if($ok->game_id==8){
$oyun_isim = "Basmaca";
} else if($ok->game_id==9){
$oyun_isim = "Sayısal Loto 6";
} else if($ok->game_id==10){
$oyun_isim = "Zar Düellosu";
} else if($ok->game_id==12){
$oyun_isim = "6+ Poker";
}

if($row['gameid']==$ok->game_id){

$saniye_cevir = date('i:s',$ok->seconds_left);

if($saniye_cevir=="00:00"){
	$timleft_ver = "";
} else {
	$timleft_ver = $saniye_cevir;
}

if($row['eskiroundid']>0){
	$roundla = $row['eskiroundid'];
} else {
	$roundla = $row['roundid'];
}

$json_game = array(
"game_id"=>"".$ok->game_id."",
"game_name"=>"".$oyun_isim."",
"secleft"=>$ok->seconds_left,
"oldround"=>"".$roundla."",
"run_id"=>"".$ok->draw_code."",
"goleft"=>"".$timleft_ver."",
"bets"=>$json_bets
);

}


$json = array(
"status"=>"success",
"game"=>$json_game
);

}

echo json_encode($json);

}

}
/////////////////////////////// KUPON İÇERİĞİ ///////////////////////////////////////
}

///////////////////////////////////////////////

} else 

##### SONUÇLAMA #####

if($_GET['action']=="kuponsonucla"){

function casino_kupon_sonucla_basmaca($secenek,$oyuncukart,$oyuncusimge,$krupiyekart,$krupiyesimge,$gameid,$roundid,$kid) {
	
	if($oyuncukart=="2"){	$kart_ver_oyuncu = 2;
	} else if($oyuncukart=="3"){	$kart_ver_oyuncu = 3;
	} else if($oyuncukart=="4"){	$kart_ver_oyuncu = 4;
	} else if($oyuncukart=="5"){	$kart_ver_oyuncu = 5;
	} else if($oyuncukart=="6"){	$kart_ver_oyuncu = 6;
	} else if($oyuncukart=="7"){	$kart_ver_oyuncu = 7;
	} else if($oyuncukart=="8"){	$kart_ver_oyuncu = 8;
	} else if($oyuncukart=="9"){	$kart_ver_oyuncu = 9;
	} else if($oyuncukart=="10"){	$kart_ver_oyuncu = 10;
	} else if($oyuncukart=="j"){	$kart_ver_oyuncu = 11;
	} else if($oyuncukart=="q"){	$kart_ver_oyuncu = 12;
	} else if($oyuncukart=="k"){	$kart_ver_oyuncu = 13;
	} else if($oyuncukart=="a"){	$kart_ver_oyuncu = 14;	}
	
	if($krupiyekart=="2"){ 	$kart_ver_krupiye = 2;
	} else if($krupiyekart=="3"){	$kart_ver_krupiye = 3;
	} else if($krupiyekart=="4"){	$kart_ver_krupiye = 4;
	} else if($krupiyekart=="5"){	$kart_ver_krupiye = 5;
	} else if($krupiyekart=="6"){	$kart_ver_krupiye = 6;
	} else if($krupiyekart=="7"){	$kart_ver_krupiye = 7;
	} else if($krupiyekart=="8"){	$kart_ver_krupiye = 8;
	} else if($krupiyekart=="9"){	$kart_ver_krupiye = 9;
	} else if($krupiyekart=="10"){	$kart_ver_krupiye = 10;
	} else if($krupiyekart=="j"){	$kart_ver_krupiye = 11;
	} else if($krupiyekart=="q"){	$kart_ver_krupiye = 12;
	} else if($krupiyekart=="k"){	$kart_ver_krupiye = 13;
	} else if($krupiyekart=="a"){	$kart_ver_krupiye = 14;	}
	
	if($secenek=="Krupiye kazanır" && $kart_ver_krupiye>$kart_ver_oyuncu) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Oyuncu kazanır" && $kart_ver_krupiye<$kart_ver_oyuncu) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Savaş" && $kart_ver_krupiye==$kart_ver_oyuncu) { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="Krupiyenin kartı kırmızı olacak" && ($krupiyesimge=="hearts" || $krupiyesimge=="diamonds")) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Krupiyenin kartı siyah olacak" && ($krupiyesimge=="clubs" || $krupiyesimge=="spades")) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Oyuncunun kartı kırmızı olacak" && ($oyuncusimge=="hearts" || $oyuncusimge=="diamonds")) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Oyuncunun kartı siyah olacak" && ($oyuncusimge=="clubs" || $oyuncusimge=="spades")) { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="Krupiyenin kartı sinek olacak" && $krupiyesimge=="clubs") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Krupiyenin kartı karo olacak" && $krupiyesimge=="diamonds") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Krupiyenin kartı kupa olacak" && $krupiyesimge=="hearts") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Krupiyenin kartı maça olacak" && $krupiyesimge=="spades") { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="Oyuncunun kartı sinek olacak" && $oyuncusimge=="clubs") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Oyuncunun kartı karo olacak" && $oyuncusimge=="diamonds") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Oyuncunun kartı kupa olacak" && $oyuncusimge=="hearts") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Oyuncunun kartı maça olacak" && $oyuncusimge=="spades") { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="Krupiyenin kart değeri tam olarak 8 olacak" && $kart_ver_krupiye==8) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Krupiyenin kart değeri 8 den az olacak" && $kart_ver_krupiye<8) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Krupiyenin kart değeri 8 den çok olacak" && $kart_ver_krupiye>8) { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="Oyuncunun kart değeri tam olarak 8 olacak" && $kart_ver_oyuncu==8) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Oyuncunun kart değeri 8 den az olacak" && $kart_ver_oyuncu<8) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Oyuncunun kart değeri 8 den çok olacak" && $kart_ver_oyuncu>8) { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="Krupiyenin kartı resimli olacak (Vale, Kız, Papaz)" && ($kart_ver_krupiye==11 || $kart_ver_krupiye==12 || $kart_ver_krupiye==13)) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Krupiyenin kartı numara olacak (A, 2, 3, 4, 5, 6, 7, 8, 9, 10)" && ($kart_ver_krupiye==14 || $kart_ver_krupiye==2 || $kart_ver_krupiye==3 || $kart_ver_krupiye==4 || $kart_ver_krupiye==5 || $kart_ver_krupiye==6 || $kart_ver_krupiye==7 || $kart_ver_krupiye==8 || $kart_ver_krupiye==9 || $kart_ver_krupiye==10)) { kazanma(2,$gameid,$roundid,$kid); } else
	
	
	if($secenek=="Oyuncun kartı resimli olacak (Vale, Kız, Papaz)" && ($kart_ver_oyuncu==11 || $kart_ver_oyuncu==12 || $kart_ver_oyuncu==13)) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Oyuncunun kartı numara olacak (A, 2, 3, 4, 5, 6, 7, 8, 9, 10)" && ($kart_ver_oyuncu==14 || $kart_ver_oyuncu==2 || $kart_ver_oyuncu==3 || $kart_ver_oyuncu==4 || $kart_ver_oyuncu==5 || $kart_ver_oyuncu==6 || $kart_ver_oyuncu==7 || $kart_ver_oyuncu==8 || $kart_ver_oyuncu==9 || $kart_ver_oyuncu==10)) { kazanma(2,$gameid,$roundid,$kid); } else
	
	{ kazanma(3,$gameid,$roundid,$kid); }
	
}

function casino_kupon_sonucla_poker($secenek,$kazananeller,$kazanmasekli,$gameid,$roundid,$kid) {
	
	$kazananeller_bol = explode(",",$kazananeller);
	$kazananel_1 = $kazananeller_bol[0];
	$kazananel_2_ver = $kazananeller_bol[1];
	$kazananel_3_ver = $kazananeller_bol[2];
	$kazananel_4_ver = $kazananeller_bol[3];
	$kazananel_5_ver = $kazananeller_bol[4];
	$kazananel_6_ver = $kazananeller_bol[5];
	
	if($kazananel_2_ver>0){ $kazananel_2 = $kazananel_2_ver; } else { $kazananel_2 = 0; }
	if($kazananel_3_ver>0){ $kazananel_3 = $kazananel_3_ver; } else { $kazananel_3 = 0; }
	if($kazananel_4_ver>0){ $kazananel_4 = $kazananel_4_ver; } else { $kazananel_4 = 0; }
	if($kazananel_5_ver>0){ $kazananel_5 = $kazananel_5_ver; } else { $kazananel_5 = 0; }
	if($kazananel_6_ver>0){ $kazananel_6 = $kazananel_6_ver; } else { $kazananel_6 = 0; }
	
	if($secenek=="1. el kazanır" && $kazananel_1==1) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="2. el kazanır" && ($kazananel_1==2 || $kazananel_2==2)) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="3. el kazanır" && ($kazananel_1==3 || $kazananel_2==3 || $kazananel_3==3)) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="4. el kazanır" && ($kazananel_1==4 || $kazananel_2==4 || $kazananel_3==4 || $kazananel_4==4)) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="5. el kazanır" && ($kazananel_1==5 || $kazananel_2==5 || $kazananel_3==5 || $kazananel_4==5 || $kazananel_5==5)) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="6. el kazanır" && ($kazananel_1==6 || $kazananel_2==6 || $kazananel_3==6 || $kazananel_4==6 || $kazananel_5==6 || $kazananel_6==6)) { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="Yüksek Kart kazanır" && $kazanmasekli=="Yüksek Kart") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Per kazanır" && $kazanmasekli=="Per") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Döper kazanır" && $kazanmasekli=="Döper") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Üçlü kazanır" && $kazanmasekli=="Üçlü") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Kent kazanır" && $kazanmasekli=="Kent") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Floş kazanır" && $kazanmasekli=="Floş") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Ful kazanır" && $kazanmasekli=="Ful") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Kare kazanır" && $kazanmasekli=="Kare") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Sıralı Floş kazanır" && $kazanmasekli=="Sıralı Floş") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Royal Floş kazanır" && $kazanmasekli=="Royal Floş") { kazanma(2,$gameid,$roundid,$kid); } else
	
	{ kazanma(3,$gameid,$roundid,$kid); }
	
}

function casino_kupon_sonucla_bakara($secenek,$kazananeller,$oyuncu_1,$oyuncu_1_renk,$oyuncu_2,$oyuncu_2_renk,$oyuncu_3,$oyuncu_3_renk,$krupiye_1,$krupiye_1_renk,$krupiye_2,$krupiye_2_renk,$krupiye_3,$krupiye_3_renk,$kazanan,$skor_oyuncu,$skor_krupiye,$gameid,$roundid,$kid) {
	
	$kazananeller_bol = explode(",",$kazananeller);
	$kazananel_1 = $kazananeller_bol[0];
	$kazananel_2_ver = $kazananeller_bol[1];
	$kazananel_3_ver = $kazananeller_bol[2];
	$kazananel_4_ver = $kazananeller_bol[3];
	$kazananel_5_ver = $kazananeller_bol[4];
	$kazananel_6_ver = $kazananeller_bol[5];

	if($kazananel_2_ver!=''){ $kazananel_2 = $kazananel_2_ver; } else { $kazananel_2 = 0; }
	if($kazananel_3_ver!=''){ $kazananel_3 = $kazananel_3_ver; } else { $kazananel_3 = 0; }
	if($kazananel_4_ver!=''){ $kazananel_4 = $kazananel_4_ver; } else { $kazananel_4 = 0; }
	if($kazananel_5_ver!=''){ $kazananel_5 = $kazananel_5_ver; } else { $kazananel_5 = 0; }
	if($kazananel_6_ver!=''){ $kazananel_6 = $kazananel_6_ver; } else { $kazananel_6 = 0; }
	
	if($oyuncu_3>0){ $oyuncu_3 = $oyuncu_3; } else { $oyuncu_3 = 0; }
	if($oyuncu_3_renk!=''){ $oyuncu_3_renk = $oyuncu_3_renk; } else { $oyuncu_3_renk = 0; }
	if($krupiye_3>0){ $krupiye_3 = $krupiye_3; } else { $krupiye_3 = 0; }
	if($krupiye_3_renk!=''){ $krupiye_3_renk = $krupiye_3_renk; } else { $krupiye_3_renk = 0; }
	
	## KART TOPLAM OYUNCU ##
	$kirmizi_kart_oyuncu = 0;
	$siyah_kart_oyuncu = 0;
	## OYUNCU 1 ##
	if($oyuncu_1_renk=="diamonds" || $oyuncu_1_renk=="hearts"){
		$kirmizi_kart_oyuncu++;
	} else if($oyuncu_1_renk=="clubs" || $oyuncu_1_renk=="spades"){
		$siyah_kart_oyuncu++;
	}
	## OYUNCU 2 ##
	if($oyuncu_2_renk=="diamonds" || $oyuncu_2_renk=="hearts"){
		$kirmizi_kart_oyuncu++;
	} else if($oyuncu_2_renk=="clubs" || $oyuncu_2_renk=="spades"){
		$siyah_kart_oyuncu++;
	}
	## OYUNCU 3 ##
	if($oyuncu_3_renk=="diamonds" || $oyuncu_3_renk=="hearts"){
		$kirmizi_kart_oyuncu++;
	} else if($oyuncu_3_renk=="clubs" || $oyuncu_3_renk=="spades"){
		$siyah_kart_oyuncu++;
	}
	
	## KART TOPLAM KRUPİYE ##
	$kirmizi_kart_krupiye = 0;
	$siyah_kart_krupiye = 0;
	## KRUPİYE 1 ##
	if($krupiye_1_renk=="diamonds" || $krupiye_1_renk=="hearts"){
		$kirmizi_kart_krupiye++;
	} else if($krupiye_1_renk=="clubs" || $krupiye_1_renk=="spades"){
		$siyah_kart_krupiye++;
	}
	## KRUPİYE 2 ##
	if($krupiye_2_renk=="diamonds" || $krupiye_2_renk=="hearts"){
		$kirmizi_kart_krupiye++;
	} else if($krupiye_2_renk=="clubs" || $krupiye_2_renk=="spades"){
		$siyah_kart_krupiye++;
	}
	## KRUPİYE 3 ##
	if($krupiye_3_renk=="diamonds" || $krupiye_3_renk=="hearts"){
		$kirmizi_kart_krupiye++;
	} else if($krupiye_3_renk=="clubs" || $krupiye_3_renk=="spades"){
		$siyah_kart_krupiye++;
	}
	
	$kirmizi_kart_toplam_ver = $kirmizi_kart_oyuncu+$kirmizi_kart_krupiye;
	$siyah_kart_toplam_ver = $siyah_kart_oyuncu+$siyah_kart_krupiye;
	
	$toplam_sayilari = $skor_oyuncu+$skor_krupiye;
	
	if($toplam_sayilari%2==0) { $toplam_tekcift = "cift"; } else { $toplam_tekcift = "tek"; }
	if($skor_oyuncu%2==0) { $oyuncu_tekcift = "cift"; } else { $oyuncu_tekcift = "tek"; }
	if($skor_krupiye%2==0) { $krupiye_tekcift = "cift"; } else { $krupiye_tekcift = "tek"; }
	
	if($secenek=="Oyuncu" && $skor_oyuncu>$skor_krupiye) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Krupiye" && $skor_oyuncu<$skor_krupiye) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Berabere" && $skor_oyuncu==$skor_krupiye) { kazanma(2,$gameid,$roundid,$kid); } else
	
	## KAZANAN ELLER BAŞLANGIÇ ##
	if($secenek=="Oyuncu Per" && $kazananel_1=="Player pair") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Oyuncu Per" && $kazananel_2=="Player pair" && $kazananel_2!="0") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Oyuncu Per" && $kazananel_3=="Player pair" && $kazananel_3!="0") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Oyuncu Per" && $kazananel_4=="Player pair" && $kazananel_4!="0") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Oyuncu Per" && $kazananel_5=="Player pair" && $kazananel_5!="0") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Oyuncu Per" && $kazananel_6=="Player pair" && $kazananel_6!="0") { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="Kurpiyer Per" && $kazananel_1=="Banker pair") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Kurpiyer Per" && $kazananel_2=="Banker pair" && $kazananel_2!="0") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Kurpiyer Per" && $kazananel_3=="Banker pair" && $kazananel_3!="0") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Kurpiyer Per" && $kazananel_4=="Banker pair" && $kazananel_4!="0") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Kurpiyer Per" && $kazananel_5=="Banker pair" && $kazananel_5!="0") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Kurpiyer Per" && $kazananel_6=="Banker pair" && $kazananel_6!="0") { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="İkisinden biri Per" && $kazananel_1=="Either pair") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="İkisinden biri Per" && $kazananel_2=="Either pair" && $kazananel_2!="0") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="İkisinden biri Per" && $kazananel_3=="Either pair" && $kazananel_3!="0") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="İkisinden biri Per" && $kazananel_4=="Either pair" && $kazananel_4!="0") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="İkisinden biri Per" && $kazananel_5=="Either pair" && $kazananel_5!="0") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="İkisinden biri Per" && $kazananel_6=="Either pair" && $kazananel_6!="0") { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="Kusursuz Per" && $kazananel_1=="Perfect pair") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Kusursuz Per" && $kazananel_2=="Perfect pair" && $kazananel_2!="0") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Kusursuz Per" && $kazananel_3=="Perfect pair" && $kazananel_3!="0") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Kusursuz Per" && $kazananel_4=="Perfect pair" && $kazananel_4!="0") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Kusursuz Per" && $kazananel_5=="Perfect pair" && $kazananel_5!="0") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Kusursuz Per" && $kazananel_6=="Perfect pair" && $kazananel_6!="0") { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="Küçük" && $kazananel_1=="Small") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Küçük" && $kazananel_2=="Small" && $kazananel_2!="0") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Küçük" && $kazananel_3=="Small" && $kazananel_3!="0") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Küçük" && $kazananel_4=="Small" && $kazananel_4!="0") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Küçük" && $kazananel_5=="Small" && $kazananel_5!="0") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Küçük" && $kazananel_6=="Small" && $kazananel_6!="0") { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="Büyük" && $kazananel_1=="Big") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Büyük" && $kazananel_2=="Big" && $kazananel_2!="0") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Büyük" && $kazananel_3=="Big" && $kazananel_3!="0") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Büyük" && $kazananel_4=="Big" && $kazananel_4!="0") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Büyük" && $kazananel_5=="Big" && $kazananel_5!="0") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Büyük" && $kazananel_6=="Big" && $kazananel_6!="0") { kazanma(2,$gameid,$roundid,$kid); } else
	## KAZANAN ELLER BİTİŞ ##
	
	if($secenek=="Daha fazla KIRMIZI kart gelecek" && $kirmizi_kart_toplam_ver>$siyah_kart_toplam_ver) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Daha fazla SİYAH kart gelecek" && $kirmizi_kart_toplam_ver<$siyah_kart_toplam_ver) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Eşit sayıda SİYAH ve KIRMIZI kart gelecek" && $kirmizi_kart_toplam_ver==$siyah_kart_toplam_ver) { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="Sıradaki kart - kırmızı 1.Kart" && ($oyuncu_1_renk=="diamonds" || $oyuncu_1_renk=="hearts")) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Sıradaki kart - kırmızı 2.Kart" && ($krupiye_1_renk=="diamonds" || $krupiye_1_renk=="hearts")) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Sıradaki kart - kırmızı 3.Kart" && ($oyuncu_2_renk=="diamonds" || $oyuncu_2_renk=="hearts")) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Sıradaki kart - kırmızı 4.Kart" && ($krupiye_2_renk=="diamonds" || $krupiye_2_renk=="hearts")) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Sıradaki kart - kırmızı 5.Kart" && ($oyuncu_3_renk=="diamonds" || $oyuncu_3_renk=="hearts")) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Sıradaki kart - kırmızı 6.Kart" && ($krupiye_3_renk=="diamonds" || $krupiye_3_renk=="hearts")) { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="Sıradaki kart - siyah 1.Kart" && ($oyuncu_1_renk=="clubs" || $oyuncu_1_renk=="spades")) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Sıradaki kart - siyah 2.Kart" && ($krupiye_1_renk=="clubs" || $krupiye_1_renk=="spades")) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Sıradaki kart - siyah 3.Kart" && ($oyuncu_2_renk=="clubs" || $oyuncu_2_renk=="spades")) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Sıradaki kart - siyah 4.Kart" && ($krupiye_2_renk=="clubs" || $krupiye_2_renk=="spades")) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Sıradaki kart - siyah 5.Kart" && ($oyuncu_3_renk=="clubs" || $oyuncu_3_renk=="spades")) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Sıradaki kart - siyah 6.Kart" && ($krupiye_3_renk=="clubs" || $krupiye_3_renk=="spades")) { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="Sıradaki kart - maça 1.Kart" && $oyuncu_1_renk=="spades") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Sıradaki kart - maça 2.Kart" && $krupiye_1_renk=="spades") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Sıradaki kart - maça 3.Kart" && $oyuncu_2_renk=="spades") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Sıradaki kart - maça 4.Kart" && $krupiye_2_renk=="spades") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Sıradaki kart - maça 5.Kart" && $oyuncu_3_renk=="spades") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Sıradaki kart - maça 6.Kart" && $krupiye_3_renk=="spades") { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="Sıradaki kart - kupa 1.Kart" && $oyuncu_1_renk=="hearts") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Sıradaki kart - kupa 2.Kart" && $krupiye_1_renk=="hearts") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Sıradaki kart - kupa 3.Kart" && $oyuncu_2_renk=="hearts") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Sıradaki kart - kupa 4.Kart" && $krupiye_2_renk=="hearts") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Sıradaki kart - kupa 5.Kart" && $oyuncu_3_renk=="hearts") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Sıradaki kart - kupa 6.Kart" && $krupiye_3_renk=="hearts") { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="Sıradaki kart - sinek 1.Kart" && $oyuncu_1_renk=="clubs") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Sıradaki kart - sinek 2.Kart" && $krupiye_1_renk=="clubs") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Sıradaki kart - sinek 3.Kart" && $oyuncu_2_renk=="clubs") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Sıradaki kart - sinek 4.Kart" && $krupiye_2_renk=="clubs") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Sıradaki kart - sinek 5.Kart" && $oyuncu_3_renk=="clubs") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Sıradaki kart - sinek 6.Kart" && $krupiye_3_renk=="clubs") { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="Sıradaki kart - karo 1.Kart" && $oyuncu_1_renk=="diamonds") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Sıradaki kart - karo 2.Kart" && $krupiye_1_renk=="diamonds") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Sıradaki kart - karo 3.Kart" && $oyuncu_2_renk=="diamonds") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Sıradaki kart - karo 4.Kart" && $krupiye_2_renk=="diamonds") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Sıradaki kart - karo 5.Kart" && $oyuncu_3_renk=="diamonds") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Sıradaki kart - karo 6.Kart" && $krupiye_3_renk=="diamonds") { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="Bütün kartlar AYNI DESTE olacak") { 
		if($oyuncu_1_renk=="diamonds" && $oyuncu_2_renk=="diamonds" && ($oyuncu_3_renk=="diamonds" || $oyuncu_3_renk==0) && $krupiye_1_renk=="diamonds" && $krupiye_2_renk=="diamonds" && ($krupiye_3_renk=="diamonds" || $krupiye_3_renk==0)){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($oyuncu_1_renk=="hearts" && $oyuncu_2_renk=="hearts" && ($oyuncu_3_renk=="hearts" || $oyuncu_3_renk==0) && $krupiye_1_renk=="hearts" && $krupiye_2_renk=="hearts" && ($krupiye_3_renk=="hearts" || $krupiye_3_renk==0)){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($oyuncu_1_renk=="clubs" && $oyuncu_2_renk=="clubs" && ($oyuncu_3_renk=="clubs" || $oyuncu_3_renk==0) && $krupiye_1_renk=="clubs" && $krupiye_2_renk=="clubs" && ($krupiye_3_renk=="clubs" || $krupiye_3_renk==0)){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($oyuncu_1_renk=="spades" && $oyuncu_2_renk=="spades" && ($oyuncu_3_renk=="spades" || $oyuncu_3_renk==0) && $krupiye_1_renk=="spades" && $krupiye_2_renk=="spades" && ($krupiye_3_renk=="spades" || $krupiye_3_renk==0)){
			kazanma(2,$gameid,$roundid,$kid);
		} else {
			kazanma(3,$gameid,$roundid,$kid);
		}	
	} else
	
	if($secenek=="OYUNCUYA gelen ilk iki kart AYNI DESTE olacak") {
		if($oyuncu_1_renk=="diamonds" && $oyuncu_2_renk=="diamonds"){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($oyuncu_1_renk=="hearts" && $oyuncu_2_renk=="hearts"){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($oyuncu_1_renk=="clubs" && $oyuncu_2_renk=="clubs"){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($oyuncu_1_renk=="spades" && $oyuncu_2_renk=="spades"){
			kazanma(2,$gameid,$roundid,$kid);
		} else {
			kazanma(3,$gameid,$roundid,$kid);
		}
	} else
	
	
	
	if($secenek=="KRUPİYEYE gelen ilk iki kart AYNI DESTE olacak") {
		if($krupiye_1_renk=="diamonds" && $krupiye_2_renk=="diamonds"){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($krupiye_1_renk=="hearts" && $krupiye_2_renk=="hearts"){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($krupiye_1_renk=="clubs" && $krupiye_2_renk=="clubs"){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($krupiye_1_renk=="spades" && $krupiye_2_renk=="spades"){
			kazanma(2,$gameid,$roundid,$kid);
		} else {
			kazanma(3,$gameid,$roundid,$kid);
		}
	} else
	
	if($secenek=="Oyuncu ve Krupiyenin sayıları toplamı 9.5 ALT" && $toplam_sayilari<10) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Oyuncu ve Krupiyenin sayıları toplamı 9.5 ÜST" && $toplam_sayilari>9) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Oyuncu ve Krupiyenin sayıları toplamı ÇİFT sayı olacak" && $toplam_tekcift=="cift") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Oyuncu ve Krupiyenin sayıları toplamı TEK sayı olacak" && $toplam_tekcift=="tek") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="OYUNCU SAYILARI toplamı ÇİFT sayı olacak" && $oyuncu_tekcift=="cift") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="OYUNCU SAYILARI toplamı TEK sayı olacak" && $oyuncu_tekcift=="tek") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="KRUPİYE SAYILARI toplamı ÇİFT sayı olacak" && $krupiye_tekcift=="cift") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="KRUPİYE SAYILARI toplamı TEK sayı olacak" && $krupiye_tekcift=="tek") { kazanma(2,$gameid,$roundid,$kid); } else
	
	{ kazanma(3,$gameid,$roundid,$kid); }
	
}

function casino_kupon_sonucla_carkifelek($secenek,$secilisayi,$kazanannumara,$kazananrenk,$gameid,$roundid,$kid) {
	
	if($kazanannumara%2==0) { $toplam_tekcift = "cift"; } else { $toplam_tekcift = "tek"; }
	
	if($secenek=="Çarkın Oku SEÇİLEN NUMARA (1.....18) de duracak" && $secilisayi==1 && $kazanannumara==1) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Çarkın Oku SEÇİLEN NUMARA (1.....18) de duracak" && $secilisayi==2 && $kazanannumara==2) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Çarkın Oku SEÇİLEN NUMARA (1.....18) de duracak" && $secilisayi==3 && $kazanannumara==3) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Çarkın Oku SEÇİLEN NUMARA (1.....18) de duracak" && $secilisayi==4 && $kazanannumara==4) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Çarkın Oku SEÇİLEN NUMARA (1.....18) de duracak" && $secilisayi==5 && $kazanannumara==5) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Çarkın Oku SEÇİLEN NUMARA (1.....18) de duracak" && $secilisayi==6 && $kazanannumara==6) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Çarkın Oku SEÇİLEN NUMARA (1.....18) de duracak" && $secilisayi==7 && $kazanannumara==7) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Çarkın Oku SEÇİLEN NUMARA (1.....18) de duracak" && $secilisayi==8 && $kazanannumara==8) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Çarkın Oku SEÇİLEN NUMARA (1.....18) de duracak" && $secilisayi==9 && $kazanannumara==9) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Çarkın Oku SEÇİLEN NUMARA (1.....18) de duracak" && $secilisayi==10 && $kazanannumara==10) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Çarkın Oku SEÇİLEN NUMARA (1.....18) de duracak" && $secilisayi==11 && $kazanannumara==11) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Çarkın Oku SEÇİLEN NUMARA (1.....18) de duracak" && $secilisayi==12 && $kazanannumara==12) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Çarkın Oku SEÇİLEN NUMARA (1.....18) de duracak" && $secilisayi==13 && $kazanannumara==13) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Çarkın Oku SEÇİLEN NUMARA (1.....18) de duracak" && $secilisayi==14 && $kazanannumara==14) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Çarkın Oku SEÇİLEN NUMARA (1.....18) de duracak" && $secilisayi==15 && $kazanannumara==15) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Çarkın Oku SEÇİLEN NUMARA (1.....18) de duracak" && $secilisayi==16 && $kazanannumara==16) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Çarkın Oku SEÇİLEN NUMARA (1.....18) de duracak" && $secilisayi==17 && $kazanannumara==17) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Çarkın Oku SEÇİLEN NUMARA (1.....18) de duracak" && $secilisayi==18 && $kazanannumara==18) { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="Çarkın Oku 1 DEN  6 YA (1 ve 6 dahil ) sayı sıralaması içinde duracak") {
		if($kazanannumara==1){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($kazanannumara==2){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($kazanannumara==3){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($kazanannumara==4){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($kazanannumara==5){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($kazanannumara==6){
			kazanma(2,$gameid,$roundid,$kid);
		} else {
			kazanma(3,$gameid,$roundid,$kid);
		}
	} else
		
	if($secenek=="Çarkın Oku 7 DEN  12 YE (7 ve 12 dahil ) sayı sıralaması içinde duracak") {
		if($kazanannumara==7){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($kazanannumara==8){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($kazanannumara==9){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($kazanannumara==10){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($kazanannumara==11){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($kazanannumara==12){
			kazanma(2,$gameid,$roundid,$kid);
		} else {
			kazanma(3,$gameid,$roundid,$kid);
		}
	} else
		
	if($secenek=="Çarkın Oku 13 DEN  18’ E (13 ve 18 dahil ) sayı sıralaması içinde duracak") {
		if($kazanannumara==13){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($kazanannumara==14){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($kazanannumara==15){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($kazanannumara==16){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($kazanannumara==17){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($kazanannumara==18){
			kazanma(2,$gameid,$roundid,$kid);
		} else {
			kazanma(3,$gameid,$roundid,$kid);
		}
	} else
		
	if($secenek=="Çarkın Oku 9.5’dan KÜÇÜK bir sayıda duracak" && $kazanannumara<10) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Çarkın Oku 9.5’dan BÜYÜK bir sayıda duracak" && $kazanannumara>9) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Çarkın Oku GRİ dilimde duracak" && $kazananrenk=="grey") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Çarkın Oku KIRMIZI dilimde duracak" && $kazananrenk=="red") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Çarkın Oku SİYAH dilimde duracak" && $kazananrenk=="black") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Çarkın Oku YILDIZLI KUPA diliminde duracak" && $kazanannumara==0) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Çarkın Oku herhangi bir ÇİFT sayıda duracak" && $toplam_tekcift=="cift") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Çarkın Oku herhangi bir TEK sayıda duracak" && $toplam_tekcift=="tek") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Çarkın Oku GRİ dilimde herhangi bir ÇİFT sayıda duracak" && $toplam_tekcift=="cift" && $kazananrenk=="grey") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Çarkın Oku GRİ dilimde herhangi bir TEK sayıda duracak" && $toplam_tekcift=="tek" && $kazananrenk=="grey") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Çarkın Oku KIRMIZI dilimde herhangi bir ÇİFT sayıda duracak" && $toplam_tekcift=="cift" && $kazananrenk=="red") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Çarkın Oku KIRMIZI dilimde herhangi bir TEK sayıda duracak" && $toplam_tekcift=="tek" && $kazananrenk=="red") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Çarkın Oku SİYAH dilimde herhangi bir ÇİFT sayıda duracak" && $toplam_tekcift=="cift" && $kazananrenk=="black") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Çarkın Oku SİYAH dilimde herhangi bir TEK sayıda duracak" && $toplam_tekcift=="tek" && $kazananrenk=="black") { kazanma(2,$gameid,$roundid,$kid); } else
	
	{ kazanma(3,$gameid,$roundid,$kid); }
	
}

function casino_kupon_sonucla_zar($secenek,$secilisayi,$zar_1,$zar_2,$gameid,$roundid,$kid) {
	
	$secili_sayi_bol = explode(",",$secilisayi);
	$secilen_sayi_1 = $secili_sayi_bol[0];
	$secilen_sayi_2 = $secili_sayi_bol[1];
	$zar_toplami = $zar_1+$zar_2;
	if($zar_1%2==0) { $zar_1_tekcift = "cift"; } else { $zar_1_tekcift = "tek"; }
	if($zar_2%2==0) { $zar_2_tekcift = "cift"; } else { $zar_2_tekcift = "tek"; }
	if($zar_toplami%2==0) { $zar_toplam_tekcift = "cift"; } else { $zar_toplam_tekcift = "tek"; }
	
	if($secenek=="Kırmızı zar kazanacak" && $zar_1>$zar_2) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Berabere" && $zar_1==$zar_2) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Mavi zar kazanacak" && $zar_1<$zar_2) { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="Seçilen numara KIRMIZI zarda gelecek" && $secilisayi==1 && $zar_1==1) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Seçilen numara KIRMIZI zarda gelecek" && $secilisayi==2 && $zar_1==2) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Seçilen numara KIRMIZI zarda gelecek" && $secilisayi==3 && $zar_1==3) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Seçilen numara KIRMIZI zarda gelecek" && $secilisayi==4 && $zar_1==4) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Seçilen numara KIRMIZI zarda gelecek" && $secilisayi==5 && $zar_1==5) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Seçilen numara KIRMIZI zarda gelecek" && $secilisayi==6 && $zar_1==6) { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="Seçilen numara MAVİ zarda gelecek" && $secilisayi==1 && $zar_2==1) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Seçilen numara MAVİ zarda gelecek" && $secilisayi==2 && $zar_2==2) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Seçilen numara MAVİ zarda gelecek" && $secilisayi==3 && $zar_2==3) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Seçilen numara MAVİ zarda gelecek" && $secilisayi==4 && $zar_2==4) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Seçilen numara MAVİ zarda gelecek" && $secilisayi==5 && $zar_2==5) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Seçilen numara MAVİ zarda gelecek" && $secilisayi==6 && $zar_2==6) { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="Seçilen KIRMIZI ve MAVİ zar kombinasyonu gelecek") {
		if($secilen_sayi_1==1 && $secilen_sayi_2==1 && $zar_1==1 && $zar_2==1){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($secilen_sayi_1==1 && $secilen_sayi_2==2 && $zar_1==1 && $zar_2==2){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($secilen_sayi_1==1 && $secilen_sayi_2==3 && $zar_1==1 && $zar_2==3){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($secilen_sayi_1==1 && $secilen_sayi_2==4 && $zar_1==1 && $zar_2==4){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($secilen_sayi_1==1 && $secilen_sayi_2==5 && $zar_1==1 && $zar_2==5){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($secilen_sayi_1==1 && $secilen_sayi_2==6 && $zar_1==1 && $zar_2==6){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($secilen_sayi_1==2 && $secilen_sayi_2==1 && $zar_1==2 && $zar_2==1){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($secilen_sayi_1==2 && $secilen_sayi_2==2 && $zar_1==2 && $zar_2==2){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($secilen_sayi_1==2 && $secilen_sayi_2==3 && $zar_1==2 && $zar_2==3){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($secilen_sayi_1==2 && $secilen_sayi_2==4 && $zar_1==2 && $zar_2==4){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($secilen_sayi_1==2 && $secilen_sayi_2==5 && $zar_1==2 && $zar_2==5){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($secilen_sayi_1==2 && $secilen_sayi_2==6 && $zar_1==2 && $zar_2==6){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($secilen_sayi_1==3 && $secilen_sayi_2==1 && $zar_1==3 && $zar_2==1){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($secilen_sayi_1==3 && $secilen_sayi_2==2 && $zar_1==3 && $zar_2==2){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($secilen_sayi_1==3 && $secilen_sayi_2==3 && $zar_1==3 && $zar_2==3){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($secilen_sayi_1==3 && $secilen_sayi_2==4 && $zar_1==3 && $zar_2==4){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($secilen_sayi_1==3 && $secilen_sayi_2==5 && $zar_1==3 && $zar_2==5){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($secilen_sayi_1==3 && $secilen_sayi_2==6 && $zar_1==3 && $zar_2==6){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($secilen_sayi_1==4 && $secilen_sayi_2==1 && $zar_1==4 && $zar_2==1){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($secilen_sayi_1==4 && $secilen_sayi_2==2 && $zar_1==4 && $zar_2==2){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($secilen_sayi_1==4 && $secilen_sayi_2==3 && $zar_1==4 && $zar_2==3){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($secilen_sayi_1==4 && $secilen_sayi_2==4 && $zar_1==4 && $zar_2==4){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($secilen_sayi_1==4 && $secilen_sayi_2==5 && $zar_1==4 && $zar_2==5){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($secilen_sayi_1==4 && $secilen_sayi_2==6 && $zar_1==4 && $zar_2==6){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($secilen_sayi_1==5 && $secilen_sayi_2==1 && $zar_1==5 && $zar_2==1){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($secilen_sayi_1==5 && $secilen_sayi_2==2 && $zar_1==5 && $zar_2==2){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($secilen_sayi_1==5 && $secilen_sayi_2==3 && $zar_1==5 && $zar_2==3){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($secilen_sayi_1==5 && $secilen_sayi_2==4 && $zar_1==5 && $zar_2==4){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($secilen_sayi_1==5 && $secilen_sayi_2==5 && $zar_1==5 && $zar_2==5){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($secilen_sayi_1==5 && $secilen_sayi_2==6 && $zar_1==5 && $zar_2==6){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($secilen_sayi_1==6 && $secilen_sayi_2==1 && $zar_1==6 && $zar_2==1){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($secilen_sayi_1==6 && $secilen_sayi_2==2 && $zar_1==6 && $zar_2==2){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($secilen_sayi_1==6 && $secilen_sayi_2==3 && $zar_1==6 && $zar_2==3){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($secilen_sayi_1==6 && $secilen_sayi_2==4 && $zar_1==6 && $zar_2==4){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($secilen_sayi_1==6 && $secilen_sayi_2==5 && $zar_1==6 && $zar_2==5){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($secilen_sayi_1==6 && $secilen_sayi_2==6 && $zar_1==6 && $zar_2==6){
			kazanma(2,$gameid,$roundid,$kid);
		} else {
			kazanma(3,$gameid,$roundid,$kid);
		}
	} else
	
	if($secenek=="KIRMIZI zarda gelen sayı TEK olacak" && $zar_1_tekcift=="tek") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="KIRMIZI zarda gelen sayı ÇİFT olacak" && $zar_1_tekcift=="cift") { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="MAVİ zarda gelen sayı TEK olacak" && $zar_2_tekcift=="tek") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="MAVİ zarda gelen sayı ÇİFT olacak" && $zar_2_tekcift=="cift") { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="İKİ zarda gelen sayıların toplamı TEK olacak" && $zar_toplam_tekcift=="tek") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="İKİ zarda gelen sayıların toplamı ÇİFT olacak" && $zar_toplam_tekcift=="cift") { kazanma(2,$gameid,$roundid,$kid); } else
	
	
	if($secenek=="KIRMIZI zar için gelen sayı 3.5 ALT" && $zar_1<4) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="KIRMIZI zar için gelen sayı 3.5 ÜST" && $zar_1>3) { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="MAVİ zar için gelen sayı 3.5 ALT" && $zar_2<4) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="MAVI zar için gelen sayı 3.5 ÜST" && $zar_2>3) { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="İki zar toplam sayılar 4.5 ALT" && $zar_toplami<5) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="İki zar toplam sayılar 4.5 ÜST" && $zar_toplami>4) { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="İki zar toplam sayılar 5.5 ALT" && $zar_toplami<6) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="İki zar toplam sayılar 5.5 ÜST" && $zar_toplami>5) { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="İki zar toplam sayılar 6.5 ALT" && $zar_toplami<7) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="İki zar toplam sayılar 6.5 ÜST" && $zar_toplami>6) { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="İki zar toplam sayılar 7.5 ALT" && $zar_toplami<8) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="İki zar toplam sayılar 7.5 ÜST" && $zar_toplami>7) { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="İki zar toplam sayılar 8.5 ALT" && $zar_toplami<9) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="İki zar toplam sayılar 8.5 ÜST" && $zar_toplami>8) { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="İki zar toplam sayılar 9.5 ALT" && $zar_toplami<10) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="İki zar toplam sayılar 9.5 ÜST" && $zar_toplami>9) { kazanma(2,$gameid,$roundid,$kid); } else
	
	
	{ kazanma(3,$gameid,$roundid,$kid); }
	
}

function casino_kupon_sonucla_poker6($secenek,$kazananeller,$kazanmasekli,$gameid,$roundid,$kid) {
	
	if($secenek=="Krupiye kazanır" && $kazananeller=="dealer") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Oyuncu kazanır" && $kazananeller=="player") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Eşitlik" && $kazananeller=="split") { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="Yüksek Kart kazanır" && $kazanmasekli=="Yüksek Kart") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Per kazanır" && $kazanmasekli=="Per") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Döper kazanır" && $kazanmasekli=="Döper") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Üçlü kazanır" && $kazanmasekli=="Üçlü") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Kent kazanır" && $kazanmasekli=="Kent") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Floş kazanır" && $kazanmasekli=="Floş") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Ful kazanır" && $kazanmasekli=="Ful") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Kare kazanır" && $kazanmasekli=="Kare") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Sıralı Floş kazanır" && $kazanmasekli=="Sıralı Floş") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Royal Floş kazanır" && $kazanmasekli=="Royal Floş") { kazanma(2,$gameid,$roundid,$kid); } else
	
	{ kazanma(3,$gameid,$roundid,$kid); }
	
}

function casino_kupon_sonucla_loto5($secenek,$secilisayi,$sayi_1,$sayi_1_renk,$sayi_2,$sayi_2_renk,$sayi_3,$sayi_3_renk,$sayi_4,$sayi_4_renk,$sayi_5,$sayi_5_renk,$gameid,$roundid,$kid) {
	
	$secilisayi_bol = explode(",",$secilisayi);
	$secili_sayi_ver_1 = $secilisayi_bol[0];
	$secili_sayi_ver_2 = $secilisayi_bol[1];
	$secili_sayi_ver_3 = $secilisayi_bol[2];
	
	if($secili_sayi_ver_1==$sayi_1){
		$secili_sayi_1_varmi = 1;
	} else if($secili_sayi_ver_1==$sayi_2){
		$secili_sayi_1_varmi = 1;
	} else if($secili_sayi_ver_1==$sayi_3){
		$secili_sayi_1_varmi = 1;
	} else if($secili_sayi_ver_1==$sayi_4){
		$secili_sayi_1_varmi = 1;
	} else if($secili_sayi_ver_1==$sayi_5){
		$secili_sayi_1_varmi = 1;
	} else {
		$secili_sayi_1_varmi = 0;
	}
	
	if($secili_sayi_ver_2==$sayi_1){
		$secili_sayi_2_varmi = 1;
	} else if($secili_sayi_ver_2==$sayi_2){
		$secili_sayi_2_varmi = 1;
	} else if($secili_sayi_ver_2==$sayi_3){
		$secili_sayi_2_varmi = 1;
	} else if($secili_sayi_ver_2==$sayi_4){
		$secili_sayi_2_varmi = 1;
	} else if($secili_sayi_ver_2==$sayi_5){
		$secili_sayi_2_varmi = 1;
	} else {
		$secili_sayi_2_varmi = 0;
	}
	
	if($secili_sayi_ver_3==$sayi_1){
		$secili_sayi_3_varmi = 1;
	} else if($secili_sayi_ver_3==$sayi_2){
		$secili_sayi_3_varmi = 1;
	} else if($secili_sayi_ver_3==$sayi_3){
		$secili_sayi_3_varmi = 1;
	} else if($secili_sayi_ver_3==$sayi_4){
		$secili_sayi_3_varmi = 1;
	} else if($secili_sayi_ver_3==$sayi_5){
		$secili_sayi_3_varmi = 1;
	} else {
		$secili_sayi_3_varmi = 0;
	}
	
	$toplarin_toplami = $sayi_1+$sayi_2+$sayi_3+$sayi_4+$sayi_5;
	
	$tek_sayili_top = 0;
	$cift_sayili_top = 0;
	
	$beyaztop_sayisi = 0;
	$yesiltop_sayisi = 0;
	$kirmizitop_sayisi = 0;
	$mavitop_sayisi = 0;
	
	if($toplarin_toplami%2==0) { $toplarin_toplami_tekcift = "cift"; } else { $toplarin_toplami_tekcift = "tek"; }
	
	if($sayi_1%2==0) { $sayi_1_tekcift = "cift"; } else { $sayi_1_tekcift = "tek"; }
	if($sayi_2%2==0) { $sayi_2_tekcift = "cift"; } else { $sayi_2_tekcift = "tek"; }
	if($sayi_3%2==0) { $sayi_3_tekcift = "cift"; } else { $sayi_3_tekcift = "tek"; }
	if($sayi_4%2==0) { $sayi_4_tekcift = "cift"; } else { $sayi_4_tekcift = "tek"; }
	if($sayi_5%2==0) { $sayi_5_tekcift = "cift"; } else { $sayi_5_tekcift = "tek"; }
	
	if($sayi_1_tekcift=="tek"){
		$tek_sayili_top++;
	} else if($sayi_1_tekcift=="cift"){
		$cift_sayili_top++;
	}
	
	if($sayi_2_tekcift=="tek"){
		$tek_sayili_top++;
	} else if($sayi_2_tekcift=="cift"){
		$cift_sayili_top++;
	}
	
	if($sayi_3_tekcift=="tek"){
		$tek_sayili_top++;
	} else if($sayi_3_tekcift=="cift"){
		$cift_sayili_top++;
	}
	
	if($sayi_4_tekcift=="tek"){
		$tek_sayili_top++;
	} else if($sayi_4_tekcift=="cift"){
		$cift_sayili_top++;
	}
	
	if($sayi_5_tekcift=="tek"){
		$tek_sayili_top++;
	} else if($sayi_5_tekcift=="cift"){
		$cift_sayili_top++;
	}
	
	if($sayi_1_renk=="white"){ $beyaztop_sayisi++; } else
	if($sayi_1_renk=="green"){ $yesiltop_sayisi++; } else
	if($sayi_1_renk=="red"){ $kirmizitop_sayisi++; } else
	if($sayi_1_renk=="blue"){ $mavitop_sayisi++; }
	
	if($sayi_2_renk=="white"){ $beyaztop_sayisi++; } else
	if($sayi_2_renk=="green"){ $yesiltop_sayisi++; } else
	if($sayi_2_renk=="red"){ $kirmizitop_sayisi++; } else
	if($sayi_2_renk=="blue"){ $mavitop_sayisi++; }
	
	if($sayi_3_renk=="white"){ $beyaztop_sayisi++; } else
	if($sayi_3_renk=="green"){ $yesiltop_sayisi++; } else
	if($sayi_3_renk=="red"){ $kirmizitop_sayisi++; } else
	if($sayi_3_renk=="blue"){ $mavitop_sayisi++; }
	
	if($sayi_4_renk=="white"){ $beyaztop_sayisi++; } else
	if($sayi_4_renk=="green"){ $yesiltop_sayisi++; } else
	if($sayi_4_renk=="red"){ $kirmizitop_sayisi++; } else
	if($sayi_4_renk=="blue"){ $mavitop_sayisi++; }
	
	if($sayi_5_renk=="white"){ $beyaztop_sayisi++; } else
	if($sayi_5_renk=="green"){ $yesiltop_sayisi++; } else
	if($sayi_5_renk=="red"){ $kirmizitop_sayisi++; } else
	if($sayi_5_renk=="blue"){ $mavitop_sayisi++; }
	
	$beyaz_ve_yesil_toplam = $beyaztop_sayisi+$yesiltop_sayisi;
	$kirmizi_ve_mavi_toplam = $kirmizitop_sayisi+$mavitop_sayisi;
	$beyaz_ve_kirmizi_toplam = $beyaztop_sayisi+$kirmizitop_sayisi;
	$yesil_ve_mavi_toplam = $yesiltop_sayisi+$mavitop_sayisi;
	$beyaz_ve_mavi_toplam = $beyaztop_sayisi+$mavitop_sayisi;
	$yesil_ve_kirmizi_toplam = $yesiltop_sayisi+$kirmizitop_sayisi;
	
	
	if($secenek=="1-36 arasında seçilmiş numara bu çekilişte GELMEYECEK" && $sayi_1!=$secilisayi && $sayi_2!=$secilisayi && $sayi_3!=$secilisayi && $sayi_4!=$secilisayi && $sayi_5!=$secilisayi) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="1-36 arasında seçilmiş numara bu çekilişte gelecek" && ($sayi_1==$secilisayi || $sayi_2==$secilisayi || $sayi_3==$secilisayi || $sayi_4==$secilisayi || $sayi_5==$secilisayi)) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="1-36 arasında seçilmiş İKİ numara bu çekilişte gelecek" && $secili_sayi_1_varmi==1 && $secili_sayi_2_varmi==1) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="1-36 arasında seçilmiş ÜÇ numara bu çekilişte gelecek" && $secili_sayi_1_varmi==1 && $secili_sayi_2_varmi==1 && $secili_sayi_3_varmi==1) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Daha çok TEK sayılı toplar gelecek" && $tek_sayili_top>$cift_sayili_top) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Daha çok ÇİFT sayılı toplar gelecek" && $tek_sayili_top<$cift_sayili_top) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Gelen topların numara toplamı TEK sayı olacak" && $toplarin_toplami_tekcift=="tek") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Gelen topların numara toplamı ÇİFT sayı olacak" && $toplarin_toplami_tekcift=="cift") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Gelen numaraların toplamı 92,5’ten AZ olacak" && $toplarin_toplami<93) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Gelen numaraların toplamı 92,5’ten ÇOK olacak" && $toplarin_toplami>92) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="En az bir tane BEYAZ top gelecek" && $beyaztop_sayisi>0) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Hiç BEYAZ top gelmeyecek" && $beyaztop_sayisi==0) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="1,5’ten ÇOK BEYAZ top gelecek" && $beyaztop_sayisi>1) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="1,5’ten AZ BEYAZ top gelecek" && $beyaztop_sayisi<2) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="2,5’ten ÇOK BEYAZ top gelecek" && $beyaztop_sayisi>2) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="2,5’ten AZ BEYAZ top gelecek" && $beyaztop_sayisi<3) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="3,5’ten ÇOK BEYAZ top gelecek" && $beyaztop_sayisi>3) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="BEŞ tane BEYAZ top gelecek" && $beyaztop_sayisi==5) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="TAM olarak BİR BEYAZ TOP gelecek" && $beyaztop_sayisi==1) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="TAM olarak BİR BEYAZ top GELMEYECEK" && $beyaztop_sayisi!=1) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="TAM olarak İKİ BEYAZ TOP gelecek" && $beyaztop_sayisi==2) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="TAM olarak İKİ BEYAZ top GELMEYECEK" && $beyaztop_sayisi!=2) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="TAM olarak ÜÇ BEYAZ TOP gelecek" && $beyaztop_sayisi==3) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="TAM olarak ÜÇ BEYAZ top GELMEYECEK" && $beyaztop_sayisi!=3) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="TAM olarak DÖRT BEYAZ TOP gelecek" && $beyaztop_sayisi==4) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="En az bir tane YEŞİL top gelecek" && $yesiltop_sayisi>0) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Hiç YEŞİL top gelmeyecek" && $yesiltop_sayisi==0) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="1,5’ten ÇOK YEŞİL top gelecek" && $yesiltop_sayisi>1) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="1,5’ten AZ YEŞİL top gelecek" && $yesiltop_sayisi<2) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="2,5’ten AZ YEŞİL top gelecek" && $yesiltop_sayisi<3) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="2,5’ten ÇOK YEŞİL top gelecek" && $yesiltop_sayisi>2) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="3,5’ten ÇOK YEŞİL top gelecek" && $yesiltop_sayisi>3) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="BEŞ tane YEŞİL top gelecek" && $yesiltop_sayisi==5) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="TAM olarak BİR YEŞİL TOP gelecek" && $yesiltop_sayisi==1) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="TAM olarak BİR YEŞİL top GELMEYECEK" && $yesiltop_sayisi!=1) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="TAM olarak İKİ YEŞİL TOP gelecek" && $yesiltop_sayisi==2) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="TAM olarak İKİ YEŞİL top GELMEYECEK" && $yesiltop_sayisi!=2) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="TAM olarak ÜÇ YEŞİL TOP gelecek" && $yesiltop_sayisi==3) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="TAM olarak ÜÇ YEŞİL top GELMEYECEK" && $yesiltop_sayisi!=3) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="TAM olarak DÖRT YEŞİL top gelecek" && $yesiltop_sayisi==4) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="En az bir tane KIRMIZI top gelecek" && $kirmizitop_sayisi>0) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Hiç KIRMIZI top gelmeyecek" && $kirmizitop_sayisi==0) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="1,5’ten ÇOK KIRMIZI top gelecek" && $kirmizitop_sayisi>1) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="1,5’ten AZ KIRMIZI top gelecek" && $kirmizitop_sayisi<2) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="2,5’ten ÇOK KIRMIZI top gelecek" && $kirmizitop_sayisi>2) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="2,5’ten AZ KIRMIZI top gelecek" && $kirmizitop_sayisi<3) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="3,5’ten ÇOK KIRMIZI top gelecek" && $kirmizitop_sayisi>3) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="BEŞ tane KIRMIZI top gelecek" && $kirmizitop_sayisi==5) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="TAM olarak BİR KIRMIZI top gelecek" && $kirmizitop_sayisi==1) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="TAM olarak BİR KIRMIZI top GELMEYECEK" && $kirmizitop_sayisi!=1) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="TAM olarak İKİ KIRMIZI top gelecek" && $kirmizitop_sayisi==2) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="TAM olarak İKİ KIRMIZI top GELMEYECEK" && $kirmizitop_sayisi!=2) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="TAM olarak ÜÇ KIRMIZI top gelecek" && $kirmizitop_sayisi==3) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="TAM olarak ÜÇ KIRMIZI top GELMEYECEK" && $kirmizitop_sayisi!=3) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="TAM olarak DÖRT KIRMIZI top gelecek" && $kirmizitop_sayisi==4) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="En az bir tane MAVİ top gelecek" && $mavitop_sayisi>0) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Hiç MAVİ  top gelmeyecek" && $mavitop_sayisi==0) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="1,5’ten ÇOK MAVİ top gelecek" && $mavitop_sayisi>1) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="1,5’ten AZ MAVİ top gelecek" && $mavitop_sayisi<2) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="2,5’ten ÇOK MAVİ top gelecek" && $mavitop_sayisi>2) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="2,5’ten AZ MAVİ top gelecek" && $mavitop_sayisi<3) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="3,5’ten ÇOK MAVİ top gelecek" && $mavitop_sayisi>3) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="BEŞ tane MAVİ top gelecek" && $mavitop_sayisi==5) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="TAM olarak BİR MAVİ top gelecek" && $mavitop_sayisi==1) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="TAM olarak BİR MAVİ top GELMEYECEK" && $mavitop_sayisi!=1) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="TAM olarak İKİ MAVİ top gelecek" && $mavitop_sayisi==2) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="TAM olarak İKİ MAVİ top GELMEYECEK" && $mavitop_sayisi!=2) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="TAM olarak ÜÇ MAVİ top gelecek" && $mavitop_sayisi==3) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="TAM olarak ÜÇ MAVİ top GELMEYECEK" && $mavitop_sayisi!=3) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="TAM olarak DÖRT MAVİ top gelecek" && $mavitop_sayisi==4) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="ÜÇ veya daha fazla AYNI RENK top gelecek") {
		if($beyaztop_sayisi==3){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($yesiltop_sayisi==3){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($kirmizitop_sayisi==3){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($mavitop_sayisi==3){
			kazanma(2,$gameid,$roundid,$kid);
		} else {
			kazanma(3,$gameid,$roundid,$kid);
		}
	} else
	if($secenek=="DÖRT veya daha fazla AYNI RENK top gelecek") {
		if($beyaztop_sayisi==4){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($yesiltop_sayisi==4){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($kirmizitop_sayisi==4){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($mavitop_sayisi==4){
			kazanma(2,$gameid,$roundid,$kid);
		} else {
			kazanma(3,$gameid,$roundid,$kid);
		}
	} else
	if($secenek=="BEŞ AYNI RENK top gelecek") {
		if($beyaztop_sayisi==5){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($yesiltop_sayisi==5){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($kirmizitop_sayisi==5){
			kazanma(2,$gameid,$roundid,$kid);
		} else if($mavitop_sayisi==5){
			kazanma(2,$gameid,$roundid,$kid);
		} else {
			kazanma(3,$gameid,$roundid,$kid);
		}
	} else
	if($secenek=="Gelen BEYAZ ve YEŞİL toplar KIRMIZI ve MAVİ toplardan FAZLA olacak" && $beyaz_ve_yesil_toplam>$kirmizi_ve_mavi_toplam) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Gelen BEYAZ ve KIRMIZI toplar YEŞİL ve MAVİ toplardan FAZLA olacak" && $beyaz_ve_kirmizi_toplam>$yesil_ve_mavi_toplam) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Gelen BEYAZ ve MAVİ toplar YEŞİL ve KIRMIZI toplardan FAZLA olacak" && $beyaz_ve_mavi_toplam>$yesil_ve_kirmizi_toplam) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Gelen BEYAZ toplar YEŞİL toplardan FAZLA olacak" && $beyaztop_sayisi>$yesiltop_sayisi) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Gelen YEŞİL toplar BEYAZ toplardan FAZLA olacak" && $yesiltop_sayisi>$beyaztop_sayisi) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="EŞİT SAYIDA BEYAZ ve YEŞİL top gelecek" && $beyaztop_sayisi==$yesiltop_sayisi) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Gelen BEYAZ toplar KIRMIZI toplardan FAZLA olacak" && $beyaztop_sayisi>$kirmizitop_sayisi) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Gelen KIRMIZI toplar BEYAZ toplardan FAZLA olacak" && $kirmizitop_sayisi>$beyaztop_sayisi) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="EŞİT SAYIDA BEYAZ ve KIRMIZI top gelecek" && $beyaztop_sayisi==$kirmizitop_sayisi) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Gelen BEYAZ toplar MAVİ toplardan FAZLA olacak" && $beyaztop_sayisi>$mavitop_sayisi) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Gelen MAVİ toplar BEYAZ toplardan FAZLA olacak" && $mavitop_sayisi>$beyaztop_sayisi) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="EŞİT SAYIDA BEYAZ ve MAVİ top gelecek" && $beyaztop_sayisi==$mavitop_sayisi) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Gelen YEŞİL toplar KIRMIZI toplardan FAZLA olacak" && $yesiltop_sayisi>$kirmizitop_sayisi) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Gelen KIRMIZI toplar YEŞİL toplardan FAZLA olacak" && $kirmizitop_sayisi>$yesiltop_sayisi) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="EŞİT SAYIDA YEŞİL ve KIRMIZI top gelecek" && $yesiltop_sayisi==$kirmizitop_sayisi) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Gelen YEŞİL toplar MAVİ toplardan FAZLA olacak" && $yesiltop_sayisi>$mavitop_sayisi) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Gelen MAVİ toplar YEŞİL toplardan FAZLA olacak" && $mavitop_sayisi>$yesiltop_sayisi) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="EŞİT SAYIDA YEŞİL ve MAVİ top gelecek" && $yesiltop_sayisi==$mavitop_sayisi) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Gelen KIRMIZI toplar MAVİ toplardan FAZLA olacak" && $kirmizitop_sayisi>$mavitop_sayisi) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Gelen MAVİ toplar KIRMIZI toplardan FAZLA olacak" && $mavitop_sayisi>$kirmizitop_sayisi) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="EŞİT SAYIDA MAVİ ve KIRMIZI top gelecek" && $kirmizitop_sayisi==$mavitop_sayisi) { kazanma(2,$gameid,$roundid,$kid); } else

	{ kazanma(3,$gameid,$roundid,$kid); }
	
}

function casino_kupon_sonucla_loto6($secenek,$secilisayi,$sayi_1,$sayi_1_renk,$sayi_2,$sayi_2_renk,$sayi_3,$sayi_3_renk,$sayi_4,$sayi_4_renk,$sayi_5,$sayi_5_renk,$sayi_6,$sayi_6_renk,$gameid,$roundid,$kid) {
	
	$secilisayi_bol = explode(",",$secilisayi);
	$secili_sayi_ver_1 = $secilisayi_bol[0];
	$secili_sayi_ver_2 = $secilisayi_bol[1];
	
	$secilisayi_ver = 0;
	
	if($sayi_1==$secilisayi){ $secilisayi_ver++; }
	if($sayi_2==$secilisayi){ $secilisayi_ver++; }
	if($sayi_3==$secilisayi){ $secilisayi_ver++; }
	if($sayi_4==$secilisayi){ $secilisayi_ver++; }
	if($sayi_5==$secilisayi){ $secilisayi_ver++; }
	if($sayi_6==$secilisayi){ $secilisayi_ver++; }
	
	if($sayi_1_renk=="red"){ $sayi_1_kirmizi = $sayi_1; $sayi_1_mavi = 0; }
	else if($sayi_1_renk=="blue"){ $sayi_1_kirmizi = 0; $sayi_1_mavi = $sayi_1; }
	
	if($sayi_2_renk=="red"){ $sayi_2_kirmizi = $sayi_2; $sayi_2_mavi = 0; }
	else if($sayi_2_renk=="blue"){ $sayi_2_kirmizi = 0; $sayi_2_mavi = $sayi_2; }
	
	if($sayi_3_renk=="red"){ $sayi_3_kirmizi = $sayi_3; $sayi_3_mavi = 0; }
	else if($sayi_3_renk=="blue"){ $sayi_3_kirmizi = 0; $sayi_3_mavi = $sayi_3; }
	
	if($sayi_4_renk=="red"){ $sayi_4_kirmizi = $sayi_4; $sayi_4_mavi = 0; }
	else if($sayi_4_renk=="blue"){ $sayi_4_kirmizi = 0; $sayi_4_mavi = $sayi_4; }
	
	if($sayi_5_renk=="red"){ $sayi_5_kirmizi = $sayi_5; $sayi_5_mavi = 0; }
	else if($sayi_5_renk=="blue"){ $sayi_5_kirmizi = 0; $sayi_5_mavi = $sayi_5; }
	
	if($sayi_6_renk=="red"){ $sayi_6_kirmizi = $sayi_6; $sayi_6_mavi = 0; }
	else if($sayi_6_renk=="blue"){ $sayi_6_kirmizi = 0; $sayi_6_mavi = $sayi_6; }
	
	$kirmizi_toplam_sayi_ver = $sayi_1_kirmizi+$sayi_2_kirmizi+$sayi_3_kirmizi+$sayi_4_kirmizi+$sayi_5_kirmizi+$sayi_6_kirmizi;
	$mavi_toplam_sayi_ver = $sayi_1_mavi+$sayi_2_mavi+$sayi_3_mavi+$sayi_4_mavi+$sayi_5_mavi+$sayi_6_mavi;
	
	$a_bolgesi_toplam_sayi = $sayi_1+$sayi_2;
	$b_bolgesi_toplam_sayi = $sayi_3+$sayi_4;
	$c_bolgesi_toplam_sayi = $sayi_5+$sayi_6;
	
	$tum_toplarin_toplami = $sayi_1+$sayi_2+$sayi_3+$sayi_4+$sayi_5+$sayi_6;
	
	if($secilisayi_ver%2==0) { $sayi_toplam_tekcift = "cift"; } else { $sayi_toplam_tekcift = "tek"; }
	if($tum_toplarin_toplami%2==0) { $tum_toplarin_toplami_tekcift = "cift"; } else { $tum_toplarin_toplami_tekcift = "tek"; }
	
	if($sayi_1%2==0) { $sayi_1_tekcift = "cift"; } else { $sayi_1_tekcift = "tek"; }
	if($sayi_2%2==0) { $sayi_2_tekcift = "cift"; } else { $sayi_2_tekcift = "tek"; }
	if($sayi_3%2==0) { $sayi_3_tekcift = "cift"; } else { $sayi_3_tekcift = "tek"; }
	if($sayi_4%2==0) { $sayi_4_tekcift = "cift"; } else { $sayi_4_tekcift = "tek"; }
	if($sayi_5%2==0) { $sayi_5_tekcift = "cift"; } else { $sayi_5_tekcift = "tek"; }
	if($sayi_6%2==0) { $sayi_6_tekcift = "cift"; } else { $sayi_6_tekcift = "tek"; }
	
	if($a_bolgesi_toplam_sayi%2==0) { $a_bolgesi_tekcift = "cift"; } else { $a_bolgesi_tekcift = "tek"; }
	if($b_bolgesi_toplam_sayi%2==0) { $b_bolgesi_tekcift = "cift"; } else { $b_bolgesi_tekcift = "tek"; }
	if($c_bolgesi_toplam_sayi%2==0) { $c_bolgesi_tekcift = "cift"; } else { $c_bolgesi_tekcift = "tek"; }
	
	$tek_sayili_top = 0;
	$cift_sayili_top = 0;
	
	if($sayi_1_tekcift=="tek"){
		$tek_sayili_top++;
	} else if($sayi_1_tekcift=="cift"){
		$cift_sayili_top++;
	}
	
	if($sayi_2_tekcift=="tek"){
		$tek_sayili_top++;
	} else if($sayi_2_tekcift=="cift"){
		$cift_sayili_top++;
	}
	
	if($sayi_3_tekcift=="tek"){
		$tek_sayili_top++;
	} else if($sayi_3_tekcift=="cift"){
		$cift_sayili_top++;
	}
	
	if($sayi_4_tekcift=="tek"){
		$tek_sayili_top++;
	} else if($sayi_4_tekcift=="cift"){
		$cift_sayili_top++;
	}
	
	if($sayi_5_tekcift=="tek"){
		$tek_sayili_top++;
	} else if($sayi_5_tekcift=="cift"){
		$cift_sayili_top++;
	}
	
	if($sayi_6_tekcift=="tek"){
		$tek_sayili_top++;
	} else if($sayi_6_tekcift=="cift"){
		$cift_sayili_top++;
	}
	
	if($secenek=="0,...,9 arasında seçilmiş numara A bölgeye çekilecek" && ($sayi_1==$secilisayi || $sayi_2==$secilisayi)) { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="0,...,9 arasında seçilmiş numara B bölgeye çekilecek" && ($sayi_3==$secilisayi || $sayi_4==$secilisayi)) { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="0,...,9 arasında seçilmiş numara C bölgeye çekilecek" && ($sayi_5==$secilisayi || $sayi_6==$secilisayi)) { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="A bölgesindeki şanslı numaralar arasında seçilen numara olacak 00,...,99" && $sayi_1==$secili_sayi_ver_1 && $sayi_2==$secili_sayi_ver_2) { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="B bölgesindeki şanslı numaralar arasında seçilen numara olacak 00,...,99" && $sayi_3==$secili_sayi_ver_1 && $sayi_4==$secili_sayi_ver_2) { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="C bölgesindeki şanslı numaralar arasında seçilen numara olacak 00,...,99" && $sayi_5==$secili_sayi_ver_1 && $sayi_6==$secili_sayi_ver_2) { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="Seçilen numarayla (0-9) gelen şanslı topların ADEDİ 1.5 ÜST olacak." && $secilisayi_ver>1) { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="Seçilen numarayla (0-9) gelen şanslı topların ADEDİ 1.5 ALT olacak." && $secilisayi_ver<2) { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="Seçilen numarayla (0-9) gelen şanslı topların ADEDİ ÇİFT SAYI olacak." && $sayi_toplam_tekcift=="cift") { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="Seçilen numarayla (0-9) gelen şanslı topların ADEDİ TEK SAYI olacak." && $sayi_toplam_tekcift=="tek") { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="Çekilen KIRMIZI topların üzerindeki numaralar TOPLAMI 13.5 ALT" && $kirmizi_toplam_sayi_ver<14) { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="Çekilen KIRMIZI topların üzerindeki numaralar TOPLAMI 13.5 ÜST" && $kirmizi_toplam_sayi_ver>13) { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="Çekilen MAVİ topların üzerindeki numaralar TOPLAMI 12.5 ALT" && $mavi_toplam_sayi_ver<13) { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="Çekilen MAVİ topların üzerindeki numaralar TOPLAMI 12.5 ÜST" && $mavi_toplam_sayi_ver>12) { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="A bölgeye çekilen topların üzerindeki numaralar TOPLAMI 9.5 ALT" && $a_bolgesi_toplam_sayi<10) { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="A bölgeye çekilen topların üzerindeki numaralar TOPLAMI 9.5 ÜST" && $a_bolgesi_toplam_sayi>9) { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="B bölgeye çekilen topların üzerindeki numaralar TOPLAMI 9.5 ALT" && $b_bolgesi_toplam_sayi<10) { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="B bölgeye çekilen topların üzerindeki numaralar TOPLAMI 9.5 ÜST" && $b_bolgesi_toplam_sayi>9) { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="C bölgeye çekilen topların üzerindeki numaralar TOPLAMI 9.5 ALT" && $c_bolgesi_toplam_sayi<10) { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="C bölgeye çekilen topların üzerindeki numaralar TOPLAMI 9.5 ÜST" && $c_bolgesi_toplam_sayi>9) { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="Çekilen topların üzerindeki numaraların toplamı ÇİFT SAYI olacak" && $tum_toplarin_toplami_tekcift=="cift") { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="Çekilen topların üzerindeki numaraların toplamı TEK SAYI olacak" && $tum_toplarin_toplami_tekcift=="tek") { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="ÇİFT sayılı topların ADEDİ 2.5 ALT olacak" && $cift_sayili_top<3) { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="ÇİFT sayılı topların ADEDİ 2.5 ÜST olacak" && $cift_sayili_top>2) { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="TEK sayılı topların ADEDİ 2.5 ALT olacak" && $tek_sayili_top<3) { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="TEK sayılı topların ADEDİ 2.5 ÜST olacak" && $tek_sayili_top>2) { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="A bölgesindeki şanslı topların toplamı ÇİFT SAYI olacak" && $a_bolgesi_tekcift=="cift") { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="A bölgesindeki şanslı topların toplamı TEK SAYI olacak" && $a_bolgesi_tekcift=="tek") { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="B bölgesindeki şanslı topların toplamı ÇİFT SAYI olacak" && $b_bolgesi_tekcift=="cift") { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="B bölgesindeki şanslı topların toplamı TEK SAYI olacak" && $b_bolgesi_tekcift=="tek") { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="C bölgesindeki şanslı topların toplamı ÇİFT SAYI olacak" && $c_bolgesi_tekcift=="cift") { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="C bölgesindeki şanslı topların toplamı TEK SAYI olacak" && $c_bolgesi_tekcift=="tek") { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="Çekilen topların üzerindeki numaralar TOPLAMI 26.5 ALT" && $tum_toplarin_toplami<27) { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="Çekilen topların üzerindeki numaralar TOPLAMI 26.5 ÜST" && $tum_toplarin_toplami>26) { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="Çekilen topların üzerindeki numaralar TOPLAMI 15.5 ALT" && $tum_toplarin_toplami<16) { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="Çekilen topların üzerindeki numaralar TOPLAMI 15.5 ÜST" && $tum_toplarin_toplami>15) { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="Çekilen topların üzerindeki numaralar TOPLAMI 38.5 ALT" && $tum_toplarin_toplami<39) { kazanma(2,$gameid,$roundid,$kid); } else
	
	if($secenek=="Çekilen topların üzerindeki numaralar TOPLAMI 38.5 ÜST" && $tum_toplarin_toplami>38) { kazanma(2,$gameid,$roundid,$kid); } else
	
	{ kazanma(3,$gameid,$roundid,$kid); }
	
}

function casino_kupon_sonucla_loto7($secenek,$secilisayi,$sayi_1,$sayi_1_renk,$sayi_2,$sayi_2_renk,$sayi_3,$sayi_3_renk,$sayi_4,$sayi_4_renk,$sayi_5,$sayi_5_renk,$sayi_6,$sayi_6_renk,$sayi_7,$sayi_7_renk,$gameid,$roundid,$kid) {
	
	$secilisayi_bol = explode(",",$secilisayi);
	$secili_sayi_ver_1 = $secilisayi_bol[0];
	$secili_sayi_ver_2 = $secilisayi_bol[1];
	$secili_sayi_ver_3 = $secilisayi_bol[2];
	$secili_sayi_ver_4 = $secilisayi_bol[3];
	$secili_sayi_ver_5 = $secilisayi_bol[4];
	$secili_sayi_ver_6 = $secilisayi_bol[5];
	$secili_sayi_ver_7 = $secilisayi_bol[6];
	
	if($secilisayi==$sayi_1){ $secili_sayi_1_varmi = 1; } else 
	if($secilisayi==$sayi_2){ $secili_sayi_1_varmi = 1; } else 
	if($secilisayi==$sayi_3){ $secili_sayi_1_varmi = 1; } else 
	if($secilisayi==$sayi_4){ $secili_sayi_1_varmi = 1; } else 
	if($secilisayi==$sayi_5){ $secili_sayi_1_varmi = 1; } else 
	if($secilisayi==$sayi_6){ $secili_sayi_1_varmi = 1; } else 
	if($secilisayi==$sayi_7){ $secili_sayi_1_varmi = 1; } else { $secili_sayi_1_varmi = 0; }
	
	$secili_sayi_2_tane = 0;
	$secili_sayi_3_tane = 0;
	$secili_sayi_4_tane = 0;
	
	if($secili_sayi_ver_1==$sayi_1){ $secili_sayi_2_tane++; }
	if($secili_sayi_ver_1==$sayi_2){ $secili_sayi_2_tane++; }
	if($secili_sayi_ver_1==$sayi_3){ $secili_sayi_2_tane++; }
	if($secili_sayi_ver_1==$sayi_4){ $secili_sayi_2_tane++; }
	if($secili_sayi_ver_1==$sayi_5){ $secili_sayi_2_tane++; }
	if($secili_sayi_ver_1==$sayi_6){ $secili_sayi_2_tane++; }
	if($secili_sayi_ver_1==$sayi_7){ $secili_sayi_2_tane++; }
	#########################################################
	if($secili_sayi_ver_2==$sayi_1){ $secili_sayi_2_tane++; }
	if($secili_sayi_ver_2==$sayi_2){ $secili_sayi_2_tane++; }
	if($secili_sayi_ver_2==$sayi_3){ $secili_sayi_2_tane++; }
	if($secili_sayi_ver_2==$sayi_4){ $secili_sayi_2_tane++; }
	if($secili_sayi_ver_2==$sayi_5){ $secili_sayi_2_tane++; }
	if($secili_sayi_ver_2==$sayi_6){ $secili_sayi_2_tane++; }
	if($secili_sayi_ver_2==$sayi_7){ $secili_sayi_2_tane++; }
	
	/////////////////////////////////////////////////////////
	
	if($secili_sayi_ver_1==$sayi_1){ $secili_sayi_3_tane++; }
	if($secili_sayi_ver_1==$sayi_2){ $secili_sayi_3_tane++; }
	if($secili_sayi_ver_1==$sayi_3){ $secili_sayi_3_tane++; }
	if($secili_sayi_ver_1==$sayi_4){ $secili_sayi_3_tane++; }
	if($secili_sayi_ver_1==$sayi_5){ $secili_sayi_3_tane++; }
	if($secili_sayi_ver_1==$sayi_6){ $secili_sayi_3_tane++; }
	if($secili_sayi_ver_1==$sayi_7){ $secili_sayi_3_tane++; }
	#########################################################
	if($secili_sayi_ver_2==$sayi_1){ $secili_sayi_3_tane++; }
	if($secili_sayi_ver_2==$sayi_2){ $secili_sayi_3_tane++; }
	if($secili_sayi_ver_2==$sayi_3){ $secili_sayi_3_tane++; }
	if($secili_sayi_ver_2==$sayi_4){ $secili_sayi_3_tane++; }
	if($secili_sayi_ver_2==$sayi_5){ $secili_sayi_3_tane++; }
	if($secili_sayi_ver_2==$sayi_6){ $secili_sayi_3_tane++; }
	if($secili_sayi_ver_2==$sayi_7){ $secili_sayi_3_tane++; }
	#########################################################
	if($secili_sayi_ver_3==$sayi_1){ $secili_sayi_3_tane++; }
	if($secili_sayi_ver_3==$sayi_2){ $secili_sayi_3_tane++; }
	if($secili_sayi_ver_3==$sayi_3){ $secili_sayi_3_tane++; }
	if($secili_sayi_ver_3==$sayi_4){ $secili_sayi_3_tane++; }
	if($secili_sayi_ver_3==$sayi_5){ $secili_sayi_3_tane++; }
	if($secili_sayi_ver_3==$sayi_6){ $secili_sayi_3_tane++; }
	if($secili_sayi_ver_3==$sayi_7){ $secili_sayi_3_tane++; }
	
	/////////////////////////////////////////////////////////
	
	if($secili_sayi_ver_1==$sayi_1){ $secili_sayi_4_tane++; }
	if($secili_sayi_ver_1==$sayi_2){ $secili_sayi_4_tane++; }
	if($secili_sayi_ver_1==$sayi_3){ $secili_sayi_4_tane++; }
	if($secili_sayi_ver_1==$sayi_4){ $secili_sayi_4_tane++; }
	if($secili_sayi_ver_1==$sayi_5){ $secili_sayi_4_tane++; }
	if($secili_sayi_ver_1==$sayi_6){ $secili_sayi_4_tane++; }
	if($secili_sayi_ver_1==$sayi_7){ $secili_sayi_4_tane++; }
	#########################################################
	if($secili_sayi_ver_2==$sayi_1){ $secili_sayi_4_tane++; }
	if($secili_sayi_ver_2==$sayi_2){ $secili_sayi_4_tane++; }
	if($secili_sayi_ver_2==$sayi_3){ $secili_sayi_4_tane++; }
	if($secili_sayi_ver_2==$sayi_4){ $secili_sayi_4_tane++; }
	if($secili_sayi_ver_2==$sayi_5){ $secili_sayi_4_tane++; }
	if($secili_sayi_ver_2==$sayi_6){ $secili_sayi_4_tane++; }
	if($secili_sayi_ver_2==$sayi_7){ $secili_sayi_4_tane++; }
	#########################################################
	if($secili_sayi_ver_3==$sayi_1){ $secili_sayi_4_tane++; }
	if($secili_sayi_ver_3==$sayi_2){ $secili_sayi_4_tane++; }
	if($secili_sayi_ver_3==$sayi_3){ $secili_sayi_4_tane++; }
	if($secili_sayi_ver_3==$sayi_4){ $secili_sayi_4_tane++; }
	if($secili_sayi_ver_3==$sayi_5){ $secili_sayi_4_tane++; }
	if($secili_sayi_ver_3==$sayi_6){ $secili_sayi_4_tane++; }
	if($secili_sayi_ver_3==$sayi_7){ $secili_sayi_4_tane++; }
	#########################################################
	if($secili_sayi_ver_4==$sayi_1){ $secili_sayi_4_tane++; }
	if($secili_sayi_ver_4==$sayi_2){ $secili_sayi_4_tane++; }
	if($secili_sayi_ver_4==$sayi_3){ $secili_sayi_4_tane++; }
	if($secili_sayi_ver_4==$sayi_4){ $secili_sayi_4_tane++; }
	if($secili_sayi_ver_4==$sayi_5){ $secili_sayi_4_tane++; }
	if($secili_sayi_ver_4==$sayi_6){ $secili_sayi_4_tane++; }
	if($secili_sayi_ver_4==$sayi_7){ $secili_sayi_4_tane++; }
	
	$secili_sayi_7_tane = 0;
	
	if($secili_sayi_ver_1==$sayi_1){ $secili_sayi_7_tane++; }
	if($secili_sayi_ver_1==$sayi_2){ $secili_sayi_7_tane++; }
	if($secili_sayi_ver_1==$sayi_3){ $secili_sayi_7_tane++; }
	if($secili_sayi_ver_1==$sayi_4){ $secili_sayi_7_tane++; }
	if($secili_sayi_ver_1==$sayi_5){ $secili_sayi_7_tane++; }
	if($secili_sayi_ver_1==$sayi_6){ $secili_sayi_7_tane++; }
	if($secili_sayi_ver_1==$sayi_7){ $secili_sayi_7_tane++; }
	#########################################################
	if($secili_sayi_ver_2==$sayi_1){ $secili_sayi_7_tane++; }
	if($secili_sayi_ver_2==$sayi_2){ $secili_sayi_7_tane++; }
	if($secili_sayi_ver_2==$sayi_3){ $secili_sayi_7_tane++; }
	if($secili_sayi_ver_2==$sayi_4){ $secili_sayi_7_tane++; }
	if($secili_sayi_ver_2==$sayi_5){ $secili_sayi_7_tane++; }
	if($secili_sayi_ver_2==$sayi_6){ $secili_sayi_7_tane++; }
	if($secili_sayi_ver_2==$sayi_7){ $secili_sayi_7_tane++; }
	#########################################################
	if($secili_sayi_ver_3==$sayi_1){ $secili_sayi_7_tane++; }
	if($secili_sayi_ver_3==$sayi_2){ $secili_sayi_7_tane++; }
	if($secili_sayi_ver_3==$sayi_3){ $secili_sayi_7_tane++; }
	if($secili_sayi_ver_3==$sayi_4){ $secili_sayi_7_tane++; }
	if($secili_sayi_ver_3==$sayi_5){ $secili_sayi_7_tane++; }
	if($secili_sayi_ver_3==$sayi_6){ $secili_sayi_7_tane++; }
	if($secili_sayi_ver_3==$sayi_7){ $secili_sayi_7_tane++; }
	#########################################################
	if($secili_sayi_ver_4==$sayi_1){ $secili_sayi_7_tane++; }
	if($secili_sayi_ver_4==$sayi_2){ $secili_sayi_7_tane++; }
	if($secili_sayi_ver_4==$sayi_3){ $secili_sayi_7_tane++; }
	if($secili_sayi_ver_4==$sayi_4){ $secili_sayi_7_tane++; }
	if($secili_sayi_ver_4==$sayi_5){ $secili_sayi_7_tane++; }
	if($secili_sayi_ver_4==$sayi_6){ $secili_sayi_7_tane++; }
	if($secili_sayi_ver_4==$sayi_7){ $secili_sayi_7_tane++; }
	#########################################################
	if($secili_sayi_ver_5==$sayi_1){ $secili_sayi_7_tane++; }
	if($secili_sayi_ver_5==$sayi_2){ $secili_sayi_7_tane++; }
	if($secili_sayi_ver_5==$sayi_3){ $secili_sayi_7_tane++; }
	if($secili_sayi_ver_5==$sayi_4){ $secili_sayi_7_tane++; }
	if($secili_sayi_ver_5==$sayi_5){ $secili_sayi_7_tane++; }
	if($secili_sayi_ver_5==$sayi_6){ $secili_sayi_7_tane++; }
	if($secili_sayi_ver_5==$sayi_7){ $secili_sayi_7_tane++; }
	#########################################################
	if($secili_sayi_ver_6==$sayi_1){ $secili_sayi_7_tane++; }
	if($secili_sayi_ver_6==$sayi_2){ $secili_sayi_7_tane++; }
	if($secili_sayi_ver_6==$sayi_3){ $secili_sayi_7_tane++; }
	if($secili_sayi_ver_6==$sayi_4){ $secili_sayi_7_tane++; }
	if($secili_sayi_ver_6==$sayi_5){ $secili_sayi_7_tane++; }
	if($secili_sayi_ver_6==$sayi_6){ $secili_sayi_7_tane++; }
	if($secili_sayi_ver_6==$sayi_7){ $secili_sayi_7_tane++; }
	#########################################################
	if($secili_sayi_ver_7==$sayi_1){ $secili_sayi_7_tane++; }
	if($secili_sayi_ver_7==$sayi_2){ $secili_sayi_7_tane++; }
	if($secili_sayi_ver_7==$sayi_3){ $secili_sayi_7_tane++; }
	if($secili_sayi_ver_7==$sayi_4){ $secili_sayi_7_tane++; }
	if($secili_sayi_ver_7==$sayi_5){ $secili_sayi_7_tane++; }
	if($secili_sayi_ver_7==$sayi_6){ $secili_sayi_7_tane++; }
	if($secili_sayi_ver_7==$sayi_7){ $secili_sayi_7_tane++; }
	
	$sari_top_kactane = 0;
	$siyah_top_kactane = 0;
	
	if($sayi_1_renk=="yellow"){ $sari_1 = $sayi_1; $siyah_1 = 0; $sari_top_kactane++; } else if($sayi_1_renk=="black"){ $sari_1 = 0; $siyah_1 = $sayi_1; $siyah_top_kactane++; }
	if($sayi_2_renk=="yellow"){ $sari_2 = $sayi_2; $siyah_2 = 0; $sari_top_kactane++; } else if($sayi_2_renk=="black"){ $sari_2 = 0; $siyah_2 = $sayi_2; $siyah_top_kactane++; }
	if($sayi_3_renk=="yellow"){ $sari_3 = $sayi_3; $siyah_3 = 0; $sari_top_kactane++; } else if($sayi_3_renk=="black"){ $sari_3 = 0; $siyah_3 = $sayi_3; $siyah_top_kactane++; }
	if($sayi_4_renk=="yellow"){ $sari_4 = $sayi_4; $siyah_4 = 0; $sari_top_kactane++; } else if($sayi_4_renk=="black"){ $sari_4 = 0; $siyah_4 = $sayi_4; $siyah_top_kactane++; }
	if($sayi_5_renk=="yellow"){ $sari_5 = $sayi_5; $siyah_5 = 0; $sari_top_kactane++; } else if($sayi_5_renk=="black"){ $sari_5 = 0; $siyah_5 = $sayi_5; $siyah_top_kactane++; }
	if($sayi_6_renk=="yellow"){ $sari_6 = $sayi_6; $siyah_6 = 0; $sari_top_kactane++; } else if($sayi_6_renk=="black"){ $sari_6 = 0; $siyah_6 = $sayi_6; $siyah_top_kactane++; }
	if($sayi_7_renk=="yellow"){ $sari_7 = $sayi_7; $siyah_7 = 0; $sari_top_kactane++; } else if($sayi_7_renk=="black"){ $sari_7 = 0; $siyah_7 = $sayi_7; $siyah_top_kactane++; }
	
	$sari_renk_toplami = $sari_1+$sari_2+$sari_3+$sari_4+$sari_5+$sari_6+$sari_7;
	$siyah_renk_toplami = $siyah_1+$siyah_2+$siyah_3+$siyah_4+$siyah_5+$siyah_6+$siyah_7;
	$toplam_top_sayisi = $sari_renk_toplami+$siyah_renk_toplami;
	
	$toplam_top_sayilari = $sayi_1+$sayi_2+$sayi_3+$sayi_4+$sayi_5+$sayi_6+$sayi_7;
	$ilk_iki_top_toplam = $sayi_1+$sayi_2;
	
	if($toplam_top_sayilari%2==0) { $toplam_top_sayilari_tekcift = "cift"; } else { $toplam_top_sayilari_tekcift = "tek"; }
	if($ilk_iki_top_toplam%2==0) { $ilk_iki_top_tekcift = "cift"; } else { $ilk_iki_top_tekcift = "tek"; }
	
	
	if($sayi_1%2==0) { $sayi_1_tekcift = "cift"; } else { $sayi_1_tekcift = "tek"; }
	if($sayi_2%2==0) { $sayi_2_tekcift = "cift"; } else { $sayi_2_tekcift = "tek"; }
	if($sayi_3%2==0) { $sayi_3_tekcift = "cift"; } else { $sayi_3_tekcift = "tek"; }
	if($sayi_4%2==0) { $sayi_4_tekcift = "cift"; } else { $sayi_4_tekcift = "tek"; }
	if($sayi_5%2==0) { $sayi_5_tekcift = "cift"; } else { $sayi_5_tekcift = "tek"; }
	if($sayi_6%2==0) { $sayi_6_tekcift = "cift"; } else { $sayi_6_tekcift = "tek"; }
	if($sayi_7%2==0) { $sayi_7_tekcift = "cift"; } else { $sayi_7_tekcift = "tek"; }
	
	$tek_sayili_top = 0;
	$cift_sayili_top = 0;
	
	if($sayi_1_tekcift=="tek"){
		$tek_sayili_top++;
	} else if($sayi_1_tekcift=="cift"){
		$cift_sayili_top++;
	}
	
	if($sayi_2_tekcift=="tek"){
		$tek_sayili_top++;
	} else if($sayi_2_tekcift=="cift"){
		$cift_sayili_top++;
	}
	
	if($sayi_3_tekcift=="tek"){
		$tek_sayili_top++;
	} else if($sayi_3_tekcift=="cift"){
		$cift_sayili_top++;
	}
	
	if($sayi_4_tekcift=="tek"){
		$tek_sayili_top++;
	} else if($sayi_4_tekcift=="cift"){
		$cift_sayili_top++;
	}
	
	if($sayi_5_tekcift=="tek"){
		$tek_sayili_top++;
	} else if($sayi_5_tekcift=="cift"){
		$cift_sayili_top++;
	}
	
	if($sayi_6_tekcift=="tek"){
		$tek_sayili_top++;
	} else if($sayi_6_tekcift=="cift"){
		$cift_sayili_top++;
	}
	
	if($sayi_7_tekcift=="tek"){
		$tek_sayili_top++;
	} else if($sayi_7_tekcift=="cift"){
		$cift_sayili_top++;
	}
	
	if($secenek=="1-42 arasında seçilmiş numara bu çekilişte gelecek" && $secili_sayi_1_varmi==1) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="1-42 arasında seçilmiş numara bu çekilişte GELMEYECEK" && $secili_sayi_1_varmi==0) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="1-42 arasında seçilmiş İKİ adet numara bu çekilişte gelecek" && $secili_sayi_2_tane>1) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="1-42 arasında seçilmiş ÜÇ adet numara bu çekilişte gelecek" && $secili_sayi_3_tane>2) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="1-42 arasında seçilmiş DÖRT adet numara bu çekilişte gelecek" && $secili_sayi_4_tane>3) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Seçilen YEDİ numaranın HİÇBİRİ gelmeyecek" && $secili_sayi_7_tane==0) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Seçilen YEDİ numaranın en az BİRİ gelecek" && $secili_sayi_7_tane>0) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Seçilen YEDİ numaranın en az İKİSİ gelecek" && $secili_sayi_7_tane>1) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Seçilen YEDİ numaranın en az ÜÇÜ gelecek" && $secili_sayi_7_tane>2) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Seçilen YEDİ numaranın en az DÖRDÜ gelecek" && $secili_sayi_7_tane>3) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Seçilen YEDİ numaranın en az BEŞİ gelecek" && $secili_sayi_7_tane>4) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Gelen SARI topların numara TOPLAMI 73,5’tan AZ olacak" && $sari_renk_toplami<74) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Gelen SARI topların numara TOPLAMI 73,5’tan ÇOK olacak" && $sari_renk_toplami>73) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Gelen SİYAH topların numara TOPLAMI 73,5’tan AZ olacak" && $siyah_renk_toplami<74) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Gelen SİYAH topların numara TOPLAMI 73,5’tan ÇOK olacak" && $siyah_renk_toplami>73) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Gelen numaraların toplamı 100,5’ten AZ olacak" && $toplam_top_sayisi<101) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Gelen numaraların toplamı 125,5’ten AZ olacak" && $toplam_top_sayisi<126) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Gelen numaraların toplamı 125,5’ten ÇOK olacak" && $toplam_top_sayisi>125) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Gelen numaraların toplamı 150,5’ten AZ olacak" && $toplam_top_sayisi<151) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Gelen numaraların toplamı 150,5’ten ÇOK olacak" && $toplam_top_sayisi>150) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Gelen numaraların toplamı 175,5’ten AZ olacak" && $toplam_top_sayisi<176) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Gelen numaraların toplamı 175,5’ten ÇOK olacak" && $toplam_top_sayisi>175) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Gelen numaraların toplamı 200,5’ten ÇOK olacak" && $toplam_top_sayisi>200) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="3.5’ten AZ SARI top gelecek" && $sari_top_kactane<4) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="3.5’ten ÇOK SARI top gelecek" && $sari_top_kactane>3) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="2.5’ten AZ SARI top gelecek" && $sari_top_kactane<3) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="2.5’ten ÇOK SARI top gelecek" && $sari_top_kactane>2) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="1.5’ten AZ SARI top gelecek" && $sari_top_kactane<2) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="1.5’ten ÇOK SARI top gelecek" && $sari_top_kactane>1) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Hiç SARI top gelmeyecek" && $sari_top_kactane==0) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="3.5’ten AZ SİYAH top gelecek" && $siyah_top_kactane<4) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="3.5’ten ÇOK SİYAH top gelecek" && $siyah_top_kactane>3) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="2.5’ten AZ SİYAH top gelecek" && $siyah_top_kactane<3) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="2.5’ten ÇOK SİYAH top gelecek" && $siyah_top_kactane>2) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="1.5’ten AZ SİYAH top gelecek" && $siyah_top_kactane<2) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="1.5’ten ÇOK SİYAH top gelecek" && $siyah_top_kactane>1) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Hiç SİYAH top gelmeyecek" && $siyah_top_kactane==0) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="YEDİ TANE SARI top gelecek" && $sari_top_kactane==7) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="TAM olarak ALTI SARI TOP gelecek" && $sari_top_kactane==6) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="TAM olarak BEŞ SARI TOP gelecek" && $sari_top_kactane==5) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="TAM olarak DÖRT SARI TOP gelecek" && $sari_top_kactane==4) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="TAM olarak ÜÇ SARI TOP gelecek" && $sari_top_kactane==3) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="TAM olarak İKİ SARI TOP gelecek" && $sari_top_kactane==2) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="TAM olarak BİR SARI TOP gelecek" && $sari_top_kactane==1) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="YEDİ TANE SİYAH top gelecek" && $siyah_top_kactane==7) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="TAM olarak ALTI SİYAH TOP gelecek" && $siyah_top_kactane==6) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="TAM olarak BEŞ SİYAH TOP gelecek" && $siyah_top_kactane==5) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="TAM olarak DÖRT SİYAH TOP gelecek" && $siyah_top_kactane==4) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="TAM olarak ÜÇ SİYAH TOP gelecek" && $siyah_top_kactane==3) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="TAM olarak İKİ SİYAH TOP gelecek" && $siyah_top_kactane==2) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="TAM olarak BİR SİYAH TOP gelecek" && $siyah_top_kactane==1) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Daha çok TEK sayılı toplar gelecek" && $tek_sayili_top>$cift_sayili_top) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Daha çok ÇİFT sayılı toplar gelecek" && $cift_sayili_top>$tek_sayili_top) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Gelen topların numara toplamı TEK sayı olacak" && $toplam_top_sayilari_tekcift=="tek") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Gelen topların numara toplamı ÇİFT sayı olacak" && $toplam_top_sayilari_tekcift=="cift") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="İLK gelen numara TEK sayı olacak" && $sayi_1_tekcift=="tek") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="İLK gelen numara ÇİFT sayı olacak" && $sayi_1_tekcift=="cift") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="SON gelen numara TEK sayı olacak" && $sayi_7_tekcift=="tek") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="SON gelen numara ÇİFT sayı olacak" && $sayi_7_tekcift=="cift") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Gelen İLK İKİ numara TEK sayı olacak" && $sayi_1_tekcift=="tek" && $sayi_2_tekcift=="tek") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Gelen İLK İKİ numara ÇİFT sayı olacak" && $sayi_1_tekcift=="cift" && $sayi_2_tekcift=="cift") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="İLK gelen numara TEK sayı, İKİNCİ gelen numara ÇİFT sayı olacak" && $sayi_1_tekcift=="tek" && $sayi_2_tekcift=="cift") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="İLK gelen numara ÇİFT sayı, İKİNCİ gelen numara TEK sayı olacak" && $sayi_1_tekcift=="cift" && $sayi_2_tekcift=="tek") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="İLK gelen numara TEK sayı, SON gelen numara ÇİFT sayı olacak" && $sayi_1_tekcift=="tek" && $sayi_7_tekcift=="cift") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="İLK gelen numara ÇİFT sayı, SON gelen numara TEK sayı olacak" && $sayi_1_tekcift=="cift" && $sayi_7_tekcift=="tek") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="İLK gelen topun RENGİ - SARI olur" && $sayi_1_renk=="yellow") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="İLK gelen topun RENGİ - SİYAH olur" && $sayi_1_renk=="black") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="SON gelen topun RENGİ - SARI olur" && $sayi_7_renk=="yellow") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="SON gelen topun RENGİ - SİYAH olur" && $sayi_7_renk=="black") { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Daha fazla SARI top gelecek" && $sari_top_kactane>$siyah_top_kactane) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="Daha fazla SİYAH top gelecek" && $siyah_top_kactane>$sari_top_kactane) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="İKİNCİ gelen topun rengi İLK gelen topun renginde olacak" && $sayi_1_renk==$sayi_2_renk) { kazanma(2,$gameid,$roundid,$kid); } else
	if($secenek=="İKİNCİ gelen topun rengi İLK gelen toptan FARKLI RENK olacak" && $sayi_2_renk!=$sayi_1_renk) { kazanma(2,$gameid,$roundid,$kid); } else
	
	{ kazanma(3,$gameid,$roundid,$kid); }
	
}

function kazanma($durum,$gameid,$roundid,$kid) {
sed_sql_query("update kupon_ic_casino set kazanma='$durum' where id='$kid' and gameid='$gameid' and roundid='$roundid'");
}

$sor_basmaca = sed_sql_query("select secenek,oyuncukart,oyuncusimge,krupiyekart,krupiyesimge,gameid,roundid,id,kupon_id from kupon_ic_casino where kazanma='1' and video!='' and oyuncukart!='' and oyuncusimge!='' and krupiyekart!='' and krupiyesimge!='' and gameid='8'");
while($row_basmaca=sed_sql_fetcharray($sor_basmaca)){ 
echo "BASMACA - $row_basmaca[kupon_id] - Nolu Kupon Sonuçlandırıldı. *** ";
casino_kupon_sonucla_basmaca($row_basmaca['secenek'],$row_basmaca['oyuncukart'],$row_basmaca['oyuncusimge'],$row_basmaca['krupiyekart'],$row_basmaca['krupiyesimge'],$row_basmaca['gameid'],$row_basmaca['roundid'],$row_basmaca['id']);
}

$sor_poker = sed_sql_query("select secenek,kazananeller,kazanmasekli,gameid,roundid,id,kupon_id from kupon_ic_casino where kazanma='1' and video!='' and kazananeller!='' and kazanmasekli!='' and gameid='5'");
while($row_poker=sed_sql_fetcharray($sor_poker)){ 
echo "POKER - $row_poker[kupon_id] - Nolu Kupon Sonuçlandırıldı. *** ";
casino_kupon_sonucla_poker($row_poker['secenek'],$row_poker['kazananeller'],$row_poker['kazanmasekli'],$row_poker['gameid'],$row_poker['roundid'],$row_poker['id']);
}

$sor_bakara = sed_sql_query("select secenek,kazananeller,oyuncu_1,oyuncu_1_renk,oyuncu_2,oyuncu_2_renk,oyuncu_3,oyuncu_3_renk,krupiye_1,krupiye_1_renk,krupiye_2,krupiye_2_renk,krupiye_3,krupiye_3_renk,kazanan,skor_oyuncu,skor_krupiye,gameid,roundid,id,kupon_id from kupon_ic_casino where kazanma='1' and video!='' and oyuncu_1!='' and oyuncu_1_renk!='' and oyuncu_2!='' and oyuncu_2_renk!='' and krupiye_1!='' and krupiye_1_renk!='' and krupiye_2!='' and krupiye_2_renk!='' and kazanan!='' and skor_oyuncu!='' and skor_krupiye!='' and kazananeller!='' and gameid='6'");
while($row_bakara=sed_sql_fetcharray($sor_bakara)){ 
echo "BAKARA - $row_bakara[kupon_id] - Nolu Kupon Sonuçlandırıldı. *** ";
casino_kupon_sonucla_bakara($row_bakara['secenek'],$row_bakara['kazananeller'],$row_bakara['oyuncu_1'],$row_bakara['oyuncu_1_renk'],$row_bakara['oyuncu_2'],$row_bakara['oyuncu_2_renk'],$row_bakara['oyuncu_3'],$row_bakara['oyuncu_3_renk'],$row_bakara['krupiye_1'],$row_bakara['krupiye_1_renk'],$row_bakara['krupiye_2'],$row_bakara['krupiye_2_renk'],$row_bakara['krupiye_3'],$row_bakara['krupiye_3_renk'],$row_bakara['kazanan'],$row_bakara['skor_oyuncu'],$row_bakara['skor_krupiye'],$row_bakara['gameid'],$row_bakara['roundid'],$row_bakara['id']);
}

$sor_carkifelek = sed_sql_query("select secenek,sayi,kazanannumara,kazananrenk,gameid,roundid,id,kupon_id from kupon_ic_casino where kazanma='1' and video!='' and kazanannumara!='' and gameid='7'");
while($row_carkifelek=sed_sql_fetcharray($sor_carkifelek)){ 
echo "ÇARKIFELEK - $row_carkifelek[kupon_id] - Nolu Kupon Sonuçlandırıldı. *** ";
casino_kupon_sonucla_carkifelek($row_carkifelek['secenek'],$row_carkifelek['sayi'],$row_carkifelek['kazanannumara'],$row_carkifelek['kazananrenk'],$row_carkifelek['gameid'],$row_carkifelek['roundid'],$row_carkifelek['id']);
}

$sor_zar = sed_sql_query("select secenek,sayi,zar_1,zar_2,gameid,roundid,id,kupon_id from kupon_ic_casino where kazanma='1' and video!='' and zar_1!='' and zar_2!='' and gameid='10'");
while($row_zar=sed_sql_fetcharray($sor_zar)){ 
echo "ZAR - $row_zar[kupon_id] - Nolu Kupon Sonuçlandırıldı. *** ";
casino_kupon_sonucla_zar($row_zar['secenek'],$row_zar['sayi'],$row_zar['zar_1'],$row_zar['zar_2'],$row_zar['gameid'],$row_zar['roundid'],$row_zar['id']);
}

$sor_poker6 = sed_sql_query("select secenek,kazananeller,kazanmasekli,gameid,roundid,id,kupon_id from kupon_ic_casino where kazanma='1' and video!='' and kazananeller!='' and kazanmasekli!='' and gameid='12'");
while($row_poker6=sed_sql_fetcharray($sor_poker6)){ 
echo "POKER 6 - $row_poker6[kupon_id] - Nolu Kupon Sonuçlandırıldı. *** ";
casino_kupon_sonucla_poker6($row_poker6['secenek'],$row_poker6['kazananeller'],$row_poker6['kazanmasekli'],$row_poker6['gameid'],$row_poker6['roundid'],$row_poker6['id']);
}

$sor_loto5 = sed_sql_query("select secenek,sayi,sayi_1,sayi_1_renk,sayi_2,sayi_2_renk,sayi_3,sayi_3_renk,sayi_4,sayi_4_renk,sayi_5,sayi_5_renk,gameid,roundid,id,kupon_id from kupon_ic_casino where kazanma='1' and video!='' and sayi_1!='' and sayi_1_renk!='' and sayi_2!='' and sayi_2_renk!='' and sayi_3!='' and sayi_3_renk!='' and sayi_4!='' and sayi_4_renk!='' and sayi_5!='' and sayi_5_renk!='' and gameid='3'");
while($row_loto5=sed_sql_fetcharray($sor_loto5)){ 
echo "SAYISAL LOTO 5 - $row_loto5[kupon_id] - Nolu Kupon Sonuçlandırıldı. *** ";
casino_kupon_sonucla_loto5($row_loto5['secenek'],$row_loto5['sayi'],$row_loto5['sayi_1'],$row_loto5['sayi_1_renk'],$row_loto5['sayi_2'],$row_loto5['sayi_2_renk'],$row_loto5['sayi_3'],$row_loto5['sayi_3_renk'],$row_loto5['sayi_4'],$row_loto5['sayi_4_renk'],$row_loto5['sayi_5'],$row_loto5['sayi_5_renk'],$row_loto5['gameid'],$row_loto5['roundid'],$row_loto5['id']);
}

$sor_loto6 = sed_sql_query("select secenek,sayi,sayi_1,sayi_1_renk,sayi_2,sayi_2_renk,sayi_3,sayi_3_renk,sayi_4,sayi_4_renk,sayi_5,sayi_5_renk,sayi_6,sayi_6_renk,gameid,roundid,id,kupon_id from kupon_ic_casino where kazanma='1' and video!='' and sayi_1!='' and sayi_1_renk!='' and sayi_2!='' and sayi_2_renk!='' and sayi_3!='' and sayi_3_renk!='' and sayi_4!='' and sayi_4_renk!='' and sayi_5!='' and sayi_5_renk!='' and sayi_6!='' and sayi_6_renk!='' and gameid='9'");
while($row_loto6=sed_sql_fetcharray($sor_loto6)){ 
echo "SAYISAL LOTO 6 - $row_loto6[kupon_id] - Nolu Kupon Sonuçlandırıldı. *** ";
casino_kupon_sonucla_loto6($row_loto6['secenek'],$row_loto6['sayi'],$row_loto6['sayi_1'],$row_loto6['sayi_1_renk'],$row_loto6['sayi_2'],$row_loto6['sayi_2_renk'],$row_loto6['sayi_3'],$row_loto6['sayi_3_renk'],$row_loto6['sayi_4'],$row_loto6['sayi_4_renk'],$row_loto6['sayi_5'],$row_loto6['sayi_5_renk'],$row_loto6['sayi_6'],$row_loto6['sayi_6_renk'],$row_loto6['gameid'],$row_loto6['roundid'],$row_loto6['id']);
}

$sor_loto7 = sed_sql_query("select secenek,sayi,sayi_1,sayi_1_renk,sayi_2,sayi_2_renk,sayi_3,sayi_3_renk,sayi_4,sayi_4_renk,sayi_5,sayi_5_renk,sayi_6,sayi_6_renk,sayi_7,sayi_7_renk,gameid,roundid,id,kupon_id from kupon_ic_casino where kazanma='1' and video!='' and sayi_1!='' and sayi_1_renk!='' and sayi_2!='' and sayi_2_renk!='' and sayi_3!='' and sayi_3_renk!='' and sayi_4!='' and sayi_4_renk!='' and sayi_5!='' and sayi_5_renk!='' and sayi_6!='' and sayi_6_renk!='' and sayi_7!='' and sayi_7_renk!='' and gameid='1'");
while($row_loto7=sed_sql_fetcharray($sor_loto7)){ 
echo "SAYISAL LOTO 7 - $row_loto7[kupon_id] - Nolu Kupon Sonuçlandırıldı. *** ";
casino_kupon_sonucla_loto7($row_loto7['secenek'],$row_loto7['sayi'],$row_loto7['sayi_1'],$row_loto7['sayi_1_renk'],$row_loto7['sayi_2'],$row_loto7['sayi_2_renk'],$row_loto7['sayi_3'],$row_loto7['sayi_3_renk'],$row_loto7['sayi_4'],$row_loto7['sayi_4_renk'],$row_loto7['sayi_5'],$row_loto7['sayi_5_renk'],$row_loto7['sayi_6'],$row_loto7['sayi_6_renk'],$row_loto7['sayi_7'],$row_loto7['sayi_7_renk'],$row_loto7['gameid'],$row_loto7['roundid'],$row_loto7['id']);
}

} else 

##### SONUÇ GİRME #####
	
if($_GET['action']=="sonucgir"){

$js = curl("https://betwingo.xyz/api/casino_json.php?ajax=3");

$jsonGet = json_decode($js,1);
$all = $jsonGet["veriler"];

foreach($all as $inner){

if($inner['game_id']==8){

$game_id = $inner['game_id'];
$roundid = $inner['roundid'];
$video_url = $inner['video_url'];
$oyuncu_kart_sayi = $inner['oyuncu_kart_sayi'];
$oyuncu_kart_simge = $inner['oyuncu_kart_simge'];
$krupiye_kart_sayi = $inner['krupiye_kart_sayi'];
$krupiye_kart_simge = $inner['krupiye_kart_simge'];

$farray = farray("SELECT id FROM kupon_ic_casino WHERE kazanma='1' AND video='' AND gameid='8' AND roundid='".$roundid."'");
if($farray['id'] > 0){

sed_sql_query("UPDATE kupon_ic_casino SET 
oyuncukart = '".$oyuncu_kart_sayi."',
oyuncusimge = '".$oyuncu_kart_simge."',
krupiyekart = '".$krupiye_kart_sayi."',
krupiyesimge = '".$krupiye_kart_simge."',
video = '".$video_url."' WHERE gameid='8' AND roundid='".$roundid."' AND kazanma='1'");

print "8 - ".$roundid;
print ' / Güncellendi';
print '<br>';

}

}

if($inner['game_id']==5){

$game_id = $inner['game_id'];
$roundid = $inner['roundid'];
$video_url = $inner['video_url'];
$kazananeller1 = $inner['kazananeller1'];
$kazananeller2 = $inner['kazananeller2'];
$kazananeller3 = $inner['kazananeller3'];
$kazananeller4 = $inner['kazananeller4'];
$kazananeller5 = $inner['kazananeller5'];
$kazananeller6 = $inner['kazananeller6'];
$kazanmasekli = $inner['kazanmasekli'];

$el_1_1 = $inner['el_1_1'];	$el_1_1_renk = $inner['el_1_1_renk'];
$el_1_2 = $inner['el_1_2'];	$el_1_2_renk = $inner['el_1_2_renk'];
$el_2_1 = $inner['el_2_1'];	$el_2_1_renk = $inner['el_2_1_renk'];
$el_2_2 = $inner['el_2_2'];	$el_2_2_renk = $inner['el_2_2_renk'];
$el_3_1 = $inner['el_3_1'];	$el_3_1_renk = $inner['el_3_1_renk'];
$el_3_2 = $inner['el_3_2'];	$el_3_2_renk = $inner['el_3_2_renk'];
$el_4_1 = $inner['el_4_1'];	$el_4_1_renk = $inner['el_4_1_renk'];
$el_4_2 = $inner['el_4_2'];	$el_4_2_renk = $inner['el_4_2_renk'];
$el_5_1 = $inner['el_5_1'];	$el_5_1_renk = $inner['el_5_1_renk'];
$el_5_2 = $inner['el_5_2'];	$el_5_2_renk = $inner['el_5_2_renk'];
$el_6_1 = $inner['el_6_1'];	$el_6_1_renk = $inner['el_6_1_renk'];
$el_6_2 = $inner['el_6_2'];	$el_6_2_renk = $inner['el_6_2_renk'];

$kel_1 = $inner['kel_1'];	$kel_1_renk = $inner['kel_1_renk'];
$kel_2 = $inner['kel_2'];	$kel_2_renk = $inner['kel_2_renk'];
$kel_3 = $inner['kel_3'];	$kel_3_renk = $inner['kel_3_renk'];
$kel_4 = $inner['kel_4'];	$kel_4_renk = $inner['kel_4_renk'];
$kel_5 = $inner['kel_5'];	$kel_5_renk = $inner['kel_5_renk'];

if($kazananeller6>0){
	$kazananeller = "".$kazananeller1.",".$kazananeller2.",".$kazananeller3.",".$kazananeller4.",".$kazananeller5.",".$kazananeller6."";
} else if($kazananeller5>0){
	$kazananeller = "".$kazananeller1.",".$kazananeller2.",".$kazananeller3.",".$kazananeller4.",".$kazananeller5."";
} else if($kazananeller4>0){
	$kazananeller = "".$kazananeller1.",".$kazananeller2.",".$kazananeller3.",".$kazananeller4."";
} else if($kazananeller3>0){
	$kazananeller = "".$kazananeller1.",".$kazananeller2.",".$kazananeller3."";
} else if($kazananeller2>0){
	$kazananeller = "".$kazananeller1.",".$kazananeller2."";
} else {
	$kazananeller = $kazananeller1;
}

$farray = farray("SELECT id FROM kupon_ic_casino WHERE kazanma='1' AND video='' AND gameid='5' AND roundid='".$roundid."'");
if($farray['id'] > 0){

sed_sql_query("UPDATE kupon_ic_casino SET 
kazananeller = '".$kazananeller."',
kazanmasekli = '".$kazanmasekli."',
el_1_1 = '".$el_1_1."',el_1_1_renk = '".$el_1_1_renk."',
el_1_2 = '".$el_1_2."',el_1_2_renk = '".$el_1_2_renk."',
el_2_1 = '".$el_2_1."',el_2_1_renk = '".$el_2_1_renk."',
el_2_2 = '".$el_2_2."',el_2_2_renk = '".$el_2_2_renk."',
el_3_1 = '".$el_3_1."',el_3_1_renk = '".$el_3_1_renk."',
el_3_2 = '".$el_3_2."',el_3_2_renk = '".$el_3_2_renk."',
el_4_1 = '".$el_4_1."',el_4_1_renk = '".$el_4_1_renk."',
el_4_2 = '".$el_4_2."',el_4_2_renk = '".$el_4_2_renk."',
el_5_1 = '".$el_5_1."',el_5_1_renk = '".$el_5_1_renk."',
el_5_2 = '".$el_5_2."',el_5_2_renk = '".$el_5_2_renk."',
el_6_1 = '".$el_6_1."',el_6_1_renk = '".$el_6_1_renk."',
el_6_2 = '".$el_6_2."',el_6_2_renk = '".$el_6_2_renk."',
kel_1 = '".$kel_1."',kel_1_renk = '".$kel_1_renk."',
kel_2 = '".$kel_2."',kel_2_renk = '".$kel_2_renk."',
kel_3 = '".$kel_3."',kel_3_renk = '".$kel_3_renk."',
kel_4 = '".$kel_4."',kel_4_renk = '".$kel_4_renk."',
kel_5 = '".$kel_5."',kel_5_renk = '".$kel_5_renk."',
video = '".$video_url."' WHERE gameid='5' AND roundid='".$roundid."' AND kazanma='1'");

print "5 - ".$roundid;
print ' / Güncellendi';
print '<br>';

}

}

if($inner['game_id']==6){

$game_id = $inner['game_id'];
$roundid = $inner['roundid'];
$video_url = $inner['video_url'];
$oyuncu_1 = $inner['oyuncu_1'];
$oyuncu_1_renk = $inner['oyuncu_1_renk'];
$oyuncu_2 = $inner['oyuncu_2'];
$oyuncu_2_renk = $inner['oyuncu_2_renk'];
$oyuncu_3 = $inner['oyuncu_3'];
$oyuncu_3_renk = $inner['oyuncu_3_renk'];
$krupiye_1 = $inner['krupiye_1'];
$krupiye_1_renk = $inner['krupiye_1_renk'];
$krupiye_2 = $inner['krupiye_2'];
$krupiye_2_renk = $inner['krupiye_2_renk'];
$krupiye_3 = $inner['krupiye_3'];
$krupiye_3_renk = $inner['krupiye_3_renk'];
$kazanan = $inner['kazanan'];
$skor_oyuncu = $inner['skor_oyuncu'];
$skor_krupiye = $inner['skor_krupiye'];

$kazananeller1 = $inner['kazananeller1'];
$kazananeller2 = $inner['kazananeller2'];
$kazananeller3 = $inner['kazananeller3'];
$kazananeller4 = $inner['kazananeller4'];
$kazananeller5 = $inner['kazananeller5'];
$kazananeller6 = $inner['kazananeller6'];

if($kazananeller6!=''){
	$kazananeller = "".$kazananeller1.",".$kazananeller2.",".$kazananeller3.",".$kazananeller4.",".$kazananeller5.",".$kazananeller6."";
} else if($kazananeller5!=''){
	$kazananeller = "".$kazananeller1.",".$kazananeller2.",".$kazananeller3.",".$kazananeller4.",".$kazananeller5."";
} else if($kazananeller4!=''){
	$kazananeller = "".$kazananeller1.",".$kazananeller2.",".$kazananeller3.",".$kazananeller4."";
} else if($kazananeller3!=''){
	$kazananeller = "".$kazananeller1.",".$kazananeller2.",".$kazananeller3."";
} else if($kazananeller2!=''){
	$kazananeller = "".$kazananeller1.",".$kazananeller2."";
} else {
	$kazananeller = $kazananeller1;
}

$farray = farray("SELECT id FROM kupon_ic_casino WHERE kazanma='1' AND video='' AND gameid='6' AND roundid='".$roundid."'");
if($farray['id'] > 0){

sed_sql_query("UPDATE kupon_ic_casino SET 
oyuncu_1 = '".$oyuncu_1."',
oyuncu_1_renk = '".$oyuncu_1_renk."',
oyuncu_2 = '".$oyuncu_2."',
oyuncu_2_renk = '".$oyuncu_2_renk."',
oyuncu_3 = '".$oyuncu_3."',
oyuncu_3_renk = '".$oyuncu_3_renk."',
krupiye_1 = '".$krupiye_1."',
krupiye_1_renk = '".$krupiye_1_renk."',
krupiye_2 = '".$krupiye_2."',
krupiye_2_renk = '".$krupiye_2_renk."',
krupiye_3 = '".$krupiye_3."',
krupiye_3_renk = '".$krupiye_3_renk."',
kazanan = '".$kazanan."',
skor_oyuncu = '".$skor_oyuncu."',
skor_krupiye = '".$skor_krupiye."',
kazananeller = '".$kazananeller."',
video = '".$video_url."' WHERE gameid='6' AND roundid='".$roundid."' AND kazanma='1'");

print "6 - ".$roundid;
print ' / Güncellendi';
print '<br>';

}

}

if($inner['game_id']==7){

$game_id = $inner['game_id'];
$roundid = $inner['roundid'];
$video_url = $inner['video_url'];
$kazanan_numara = $inner['kazanan_numara'];
$kazanan_renk = $inner['kazanan_renk'];

$farray = farray("SELECT id FROM kupon_ic_casino WHERE kazanma='1' AND video='' AND gameid='7' AND roundid='".$roundid."'");
if($farray['id'] > 0){

sed_sql_query("UPDATE kupon_ic_casino SET 
kazanannumara = '".$kazanan_numara."',
kazananrenk = '".$kazanan_renk."',
video = '".$video_url."' WHERE gameid='7' AND roundid='".$roundid."' AND kazanma='1'");

print "7 - ".$roundid;
print ' / Güncellendi';
print '<br>';

}

}

if($inner['game_id']==10){

$game_id = $inner['game_id'];
$roundid = $inner['roundid'];
$video_url = $inner['video_url'];
$zar_1_sayi = $inner['zar_1_sayi'];
$zar_2_sayi = $inner['zar_2_sayi'];

$farray = farray("SELECT id FROM kupon_ic_casino WHERE kazanma='1' AND video='' AND gameid='10' AND roundid='".$roundid."'");
if($farray['id'] > 0){

sed_sql_query("UPDATE kupon_ic_casino SET 
zar_1 = '".$zar_1_sayi."',
zar_2 = '".$zar_2_sayi."',
video = '".$video_url."' WHERE gameid='10' AND roundid='".$roundid."' AND kazanma='1'");

print "10 - ".$roundid;
print ' / Güncellendi';
print '<br>';

}

}

if($inner['game_id']==12){

$game_id = $inner['game_id'];
$roundid = $inner['roundid'];
$video_url = $inner['video_url'];
$kazananeller1 = $inner['kazananeller1'];
$kazananeller2 = $inner['kazananeller2'];
$kazananeller3 = $inner['kazananeller3'];
$kazananeller4 = $inner['kazananeller4'];
$kazananeller5 = $inner['kazananeller5'];
$kazananeller6 = $inner['kazananeller6'];
$kazanmasekli = $inner['kazanmasekli'];

$el_1_1 = $inner['el_1_1'];	$el_1_1_renk = $inner['el_1_1_renk'];
$el_1_2 = $inner['el_1_2'];	$el_1_2_renk = $inner['el_1_2_renk'];

$el_2_1 = $inner['el_2_1'];	$el_2_1_renk = $inner['el_2_1_renk'];
$el_2_2 = $inner['el_2_2'];	$el_2_2_renk = $inner['el_2_2_renk'];

$kel_1 = $inner['kel_1'];	$kel_1_renk = $inner['kel_1_renk'];
$kel_2 = $inner['kel_2'];	$kel_2_renk = $inner['kel_2_renk'];
$kel_3 = $inner['kel_3'];	$kel_3_renk = $inner['kel_3_renk'];
$kel_4 = $inner['kel_4'];	$kel_4_renk = $inner['kel_4_renk'];
$kel_5 = $inner['kel_5'];	$kel_5_renk = $inner['kel_5_renk'];

if($kazananeller2>0){
	$kazananeller = "".$kazananeller1.",".$kazananeller2."";
} else if($kazananeller3>0){
	$kazananeller = "".$kazananeller1.",".$kazananeller2.",".$kazananeller3."";
} else if($kazananeller4>0){
	$kazananeller = "".$kazananeller1.",".$kazananeller2.",".$kazananeller3.",".$kazananeller4."";
} else if($kazananeller5>0){
	$kazananeller = "".$kazananeller1.",".$kazananeller2.",".$kazananeller3.",".$kazananeller4.",".$kazananeller5."";
} else if($kazananeller6>0){
	$kazananeller = "".$kazananeller1.",".$kazananeller2.",".$kazananeller3.",".$kazananeller4.",".$kazananeller5.",".$kazananeller6."";
} else {
	$kazananeller = $kazananeller1;
}

$farray = farray("SELECT id FROM kupon_ic_casino WHERE kazanma='1' AND video='' AND gameid='12' AND roundid='".$roundid."'");
if($farray['id'] > 0){

sed_sql_query("UPDATE kupon_ic_casino SET 
kazananeller = '".$kazananeller."',
kazanmasekli = '".$kazanmasekli."',
el_1_1 = '".$el_1_1."',el_1_1_renk = '".$el_1_1_renk."',
el_1_2 = '".$el_1_2."',el_1_2_renk = '".$el_1_2_renk."',
el_2_1 = '".$el_2_1."',el_2_1_renk = '".$el_2_1_renk."',
el_2_2 = '".$el_2_2."',el_2_2_renk = '".$el_2_2_renk."',
kel_1 = '".$kel_1."',kel_1_renk = '".$kel_1_renk."',
kel_2 = '".$kel_2."',kel_2_renk = '".$kel_2_renk."',
kel_3 = '".$kel_3."',kel_3_renk = '".$kel_3_renk."',
kel_4 = '".$kel_4."',kel_4_renk = '".$kel_4_renk."',
kel_5 = '".$kel_5."',kel_5_renk = '".$kel_5_renk."',
video = '".$video_url."' WHERE gameid='12' AND roundid='".$roundid."' AND kazanma='1'");

print "12 - ".$roundid;
print ' / Güncellendi';
print '<br>';

}

}

if($inner['game_id']==3){

$game_id = $inner['game_id'];
$roundid = $inner['roundid'];
$video_url = $inner['video_url'];
$sayi_1 = $inner['sayi_1'];
$sayi_1_renk = $inner['sayi_1_renk'];
$sayi_2 = $inner['sayi_2'];
$sayi_2_renk = $inner['sayi_2_renk'];
$sayi_3 = $inner['sayi_3'];
$sayi_3_renk = $inner['sayi_3_renk'];
$sayi_4 = $inner['sayi_4'];
$sayi_4_renk = $inner['sayi_4_renk'];
$sayi_5 = $inner['sayi_5'];
$sayi_5_renk = $inner['sayi_5_renk'];

$farray = farray("SELECT id FROM kupon_ic_casino WHERE kazanma='1' AND video='' AND gameid='3' AND roundid='".$roundid."'");
if($farray['id'] > 0){

sed_sql_query("UPDATE kupon_ic_casino SET 
sayi_1 = '".$sayi_1."',
sayi_1_renk = '".$sayi_1_renk."',
sayi_2 = '".$sayi_2."',
sayi_2_renk = '".$sayi_2_renk."',
sayi_3 = '".$sayi_3."',
sayi_3_renk = '".$sayi_3_renk."',
sayi_4 = '".$sayi_4."',
sayi_4_renk = '".$sayi_4_renk."',
sayi_5 = '".$sayi_5."',
sayi_5_renk = '".$sayi_5_renk."',
video = '".$video_url."' WHERE gameid='3' AND roundid='".$roundid."' AND kazanma='1'");

print "3 - ".$roundid;
print ' / Güncellendi';
print '<br>';

}

}

if($inner['game_id']==9){

$game_id = $inner['game_id'];
$roundid = $inner['roundid'];
$video_url = $inner['video_url'];
$sayi_1 = $inner['sayi_1'];
$sayi_1_renk = $inner['sayi_1_renk'];
$sayi_2 = $inner['sayi_2'];
$sayi_2_renk = $inner['sayi_2_renk'];
$sayi_3 = $inner['sayi_3'];
$sayi_3_renk = $inner['sayi_3_renk'];
$sayi_4 = $inner['sayi_4'];
$sayi_4_renk = $inner['sayi_4_renk'];
$sayi_5 = $inner['sayi_5'];
$sayi_5_renk = $inner['sayi_5_renk'];
$sayi_6 = $inner['sayi_6'];
$sayi_6_renk = $inner['sayi_6_renk'];

$farray = farray("SELECT id FROM kupon_ic_casino WHERE kazanma='1' AND video='' AND gameid='9' AND roundid='".$roundid."'");
if($farray['id'] > 0){

sed_sql_query("UPDATE kupon_ic_casino SET 
sayi_1 = '".$sayi_1."',
sayi_1_renk = '".$sayi_1_renk."',
sayi_2 = '".$sayi_2."',
sayi_2_renk = '".$sayi_2_renk."',
sayi_3 = '".$sayi_3."',
sayi_3_renk = '".$sayi_3_renk."',
sayi_4 = '".$sayi_4."',
sayi_4_renk = '".$sayi_4_renk."',
sayi_5 = '".$sayi_5."',
sayi_5_renk = '".$sayi_5_renk."',
sayi_6 = '".$sayi_6."',
sayi_6_renk = '".$sayi_6_renk."',
video = '".$video_url."' WHERE gameid='9' AND roundid='".$roundid."' AND kazanma='1'");

print "9 - ".$roundid;
print ' / Güncellendi';
print '<br>';

}

}

if($inner['game_id']==1){

$game_id = $inner['game_id'];
$roundid = $inner['roundid'];
$video_url = $inner['video_url'];
$sayi_1 = $inner['sayi_1'];
$sayi_1_renk = $inner['sayi_1_renk'];
$sayi_2 = $inner['sayi_2'];
$sayi_2_renk = $inner['sayi_2_renk'];
$sayi_3 = $inner['sayi_3'];
$sayi_3_renk = $inner['sayi_3_renk'];
$sayi_4 = $inner['sayi_4'];
$sayi_4_renk = $inner['sayi_4_renk'];
$sayi_5 = $inner['sayi_5'];
$sayi_5_renk = $inner['sayi_5_renk'];
$sayi_6 = $inner['sayi_6'];
$sayi_6_renk = $inner['sayi_6_renk'];
$sayi_7 = $inner['sayi_7'];
$sayi_7_renk = $inner['sayi_7_renk'];

$farray = farray("SELECT id FROM kupon_ic_casino WHERE kazanma='1' AND video='' AND gameid='1' AND roundid='".$roundid."'");
if($farray['id'] > 0){

sed_sql_query("UPDATE kupon_ic_casino SET 
sayi_1 = '".$sayi_1."',
sayi_1_renk = '".$sayi_1_renk."',
sayi_2 = '".$sayi_2."',
sayi_2_renk = '".$sayi_2_renk."',
sayi_3 = '".$sayi_3."',
sayi_3_renk = '".$sayi_3_renk."',
sayi_4 = '".$sayi_4."',
sayi_4_renk = '".$sayi_4_renk."',
sayi_5 = '".$sayi_5."',
sayi_5_renk = '".$sayi_5_renk."',
sayi_6 = '".$sayi_6."',
sayi_6_renk = '".$sayi_6_renk."',
sayi_7 = '".$sayi_7."',
sayi_7_renk = '".$sayi_7_renk."',
video = '".$video_url."' WHERE gameid='1' AND roundid='".$roundid."' AND kazanma='1'");

print "1 - ".$roundid;
print ' / Güncellendi';
print '<br>';

}

}

}

} else

## CASİNO STREAM ##

if($_GET['action']=="casino_stream"){

$js = curl("https://betwingo.xyz/api/casino_json.php?ajax=4&gameid=".$gameid."");
$geldi = json_decode($js);

if($gameid==5){
$json = array(
"status"=>"success",
"stream_name"=>$geldi
);
} else {
$json = array(
"status"=>"success",
"stream_name"=>$geldi->stream->name
);

}

echo json_encode($json);

} else 

## CASİNO BETS ##

if($_GET['action']=="casino_bets"){

$js = curl("https://betwingo.xyz/api/casino_json.php?ajax=1");
$geldi = json_decode($js);

$js2 = curl("https://betwingo.xyz/api/casino_json.php?ajax=2");
$geldi2 = json_decode($js2);

$js4 = curl("https://betwingo.xyz/api/casino_json.php?ajax=5&gameid=".$gameid."");
$jsonGet4 = json_decode($js4);
$geldi4 = $jsonGet4->items->results;
$verigeldimi = 0;
foreach(@$geldi4 as $ok4) {
if($verigeldimi==0 && $gameid==$ok4->game_id){
$oyunsayiekle = 1;
$gameids_ver[$ok4->game_id] = "".($ok4->run+$oyunsayiekle)."";
$verigeldimi++;
}
}

foreach($geldi2 as $ok2) {

if($gameid==$ok2->gameId){

foreach($ok2->options as $ok3) {

$bets[$ok3->id] = array(
"value"=>$ok3->value,
"status"=>$ok3->status,
"id"=>$ok3->id,
"itemsCount"=>$ok3->itemsCount,
"suits"=>$ok3->suits,
"expectedBlueDice"=>$ok3->expectedBlueDice
);

}

foreach($ok2->groups as $group) {

$odds = array();
foreach($group->ids as $id) {

$odds[$id] = $bets[$id];

}

$json3[] = array(
"id"=>$group->id,
"odds"=>$odds
);

}

$json5 = $ok2->lotteryItems;

}

}

foreach($geldi as $ok) {

if($gameid==$ok->game_id){

if($ok->game_id==1 || $ok->game_id==3 || $ok->game_id==9){
$json2 = array(
"game_id"=>$ok->game_id,
"bets"=>$json3,
"items"=>$json5,
"run_id"=>$ok->draw_code
);
} else {
$json2 = array(
"game_id"=>$ok->game_id,
"bets"=>$json3,
"items"=>$json5,
"run_id"=>$gameids_ver[$ok->game_id]
);
}

$json = array(
"status"=>"success",
"game"=>$json2
);

}

}

echo json_encode($json);

} else 

## CASİNO REFRESH ##

if($_GET['action']=="casino_refresh"){

$js = curl("https://betwingo.xyz/api/casino_json.php?ajax=1");
$geldi = json_decode($js);

$js2 = curl("https://betwingo.xyz/api/casino_json.php?ajax=2");
$geldi2 = json_decode($js2);

$js4 = curl("https://betwingo.xyz/api/casino_json.php?ajax=5&gameid=".(int)$gameid."");
$jsonGet4 = json_decode($js4);
$geldi4 = $jsonGet4->items->results;
$verigeldimi = 0;
foreach (@$geldi4 as $ok4) {
if($verigeldimi==0 && $gameid==$ok4->game_id){
$oyunsayiekle = 1;
$gameids_ver_ref[$ok4->game_id] = "".($ok4->run+$oyunsayiekle)."";
$verigeldimi++;
}
}

foreach($geldi2 as $ok2) {

if($gameid==$ok2->gameId){

foreach($ok2->options as $ok3) {

$bets[$ok3->id] = array(
"value"=>$ok3->value,
"status"=>$ok3->status,
"id"=>$ok3->id,
"itemsCount"=>$ok3->itemsCount,
"suits"=>$ok3->suits,
"expectedBlueDice"=>$ok3->expectedBlueDice
);

}

foreach($ok2->groups as $group) {

$odds = array();
foreach($group->ids as $id) {

$odds[$id] = $bets[$id];

}

$json3[] = array(
"id"=>$group->id,
"odds"=>$odds
);

}

$json5 = $ok2->lotteryItems;

}

}

foreach($geldi as $ok) {

$saniye_cevir = date('i:s',$ok->seconds_left);

if($ok->game_id==1){
$oyun_isim = "Sayısal Loto 7";
} else if($ok->game_id==3){
$oyun_isim = "Sayısal Loto 5";
} else if($ok->game_id==5){
$oyun_isim = "Poker";
} else if($ok->game_id==6){
$oyun_isim = "Bakara";
} else if($ok->game_id==7){
$oyun_isim = "Çarkıfelek";
} else if($ok->game_id==8){
$oyun_isim = "Basmaca";
} else if($ok->game_id==9){
$oyun_isim = "Sayısal Loto 6";
} else if($ok->game_id==10){
$oyun_isim = "Zar Düellosu";
} else if($ok->game_id==12){
$oyun_isim = "6+ Poker";
}

if($saniye_cevir=="00:00"){
	$timleft_ver = "";
} else {
	$timleft_ver = $saniye_cevir;
}

$nextdrawsla = 1;

if($ok->game_id==1 || $ok->game_id==3 || $ok->game_id==9){
$json6[$ok->game_id] = array(
"id"=>$ok->game_id,
"title"=>$oyun_isim,
"timeLeft"=>$timleft_ver,
"secondsLeft"=>$ok->seconds_left,
"draw_code"=>$ok->draw_code,
"next_draw_code"=>$ok->next_draw_code,
"cards"=>$ok->cards,
"state"=>$ok->game_state
);
} else {
$json6[$ok->game_id] = array(
"id"=>$ok->game_id,
"title"=>$oyun_isim,
"timeLeft"=>$timleft_ver,
"secondsLeft"=>$ok->seconds_left,
"draw_code"=>$gameids_ver_ref[$ok->game_id],
"next_draw_code"=>"".($gameids_ver_ref[$ok->game_id]+$nextdrawsla)."",
"cards"=>$ok->cards,
"state"=>$ok->game_state
);
}

if($gameid==$ok->game_id){

if($ok->game_id==1 || $ok->game_id==3 || $ok->game_id==9){
$json2 = array(
"game_id"=>$ok->game_id,
"bets"=>$json3,
"items"=>$json5,
"run_id"=>$ok->draw_code
);
} else {
$json2 = array(
"game_id"=>$ok->game_id,
"bets"=>$json3,
"items"=>$json5,
"run_id"=>$gameids_ver_ref[$ok->game_id]
);
}

}

$json = array(
"status"=>"success",
"game"=>$json2,
"list"=>$json6
);

}

echo json_encode($json);

} else 

## CASİNO TRANSLATİON ##

if($_GET['action']=="casino_translations"){

$json_translations_strings = array(
"Date"=>"Tarih",
"Game"=>"Oyun",
"Draw"=>"Çekiliş No",
"Bet"=>"Bahis",
"Odd"=>"Oran",
"Result"=>"Sonuç",
"Amount"=>"Miktar",
"Won"=>"Kazanç",
"Time"=>"Zaman",
"War"=>"Savaş",
"Tie"=>"Berabere",
"Video"=>"Video",
"Watch"=>"İzle",
"bet_history"=>"Bahis Geçmişi",
"cancelled"=>"Çekiliş iptal edildi.",
"active"=>"aktif",
"no_bets"=>"Bu tarih için hiç bahsiniz yok.",
"no_results"=>"No results.",
"choose_another"=>"Başka bir tarih seçin veya hemen bahis yapmaya başlayın",
"single"=>"tek",
"subscriptions"=>"Abonelikler",
"combinations"=>"kombineler",
"not_found"=>"Page not found",
"request_error"=>"Something went wrong",
"try_again"=>"Try again",
"draws"=>"Çekilişler",
"back"=>"Geri",
"back_to_list"=>"Listeye geri dön",
"subscription_no"=>"Subscription No",
"all_games"=>"Tüm Oyunlar",
"draw_number"=>"çekiliş numarası",
"filter"=>"Filtre",
"video_does_not_exist"=>"Video yok.",
"bonus"=>"Bonus",
"remaining"=>"remaining",
"promotions"=>"Promotions",
"no_promotions"=>"No new promotions",
"lobby"=>"Lobby",
"results"=>"Sonuçlar",
"how_to_play"=>"Nasıl Oynanır?",
"dealers"=>"Krupiyelerimiz",
"balance"=>"Bakiye",
"favorites"=>"Favoriler",
"recent_bets"=>"Bahisleriniz",
"place_bet"=>"Bahisi onayla",
"confirm"=>"Onayla",
"cancel"=>"iptal",
"bet_slip"=>"Bahis Kuponu",
"bet_slip_empty"=>"Bahis kuponunuz boş.",
"bet_slip_empty_choose"=>"Lütfen listeden bahis seçiniz.",
"possible_winning"=>"Olası kazanç",
"add_one_more_bet"=>"+Bir bahis daha ekleyiniz",
"games_for_combo"=>"Kombine için müsait oyunlar",
"total_odd"=>"Toplam oran",
"amount"=>"Miktar",
"total_amount"=>"Toplam miktar",
"number_of_draws"=>"çekiliş sayısı",
"combination"=>"kombine",
"bet_inprocess"=>"Please wait, we process your bet.",
"amount_should_be_positive"=>"Böyle bir seçim bulunmamaktadır.",
"please_login"=>"Bahis yapmak için hesabınıza giriş yapmanız gerekmektedir.",
"ok"=>"OK",
"accepted_upcoming_draw"=>"Bu çekiliş için bahisler kapandı. Bahis bir sonraki çekiliş için geçerli olacaktır.",
"place_bets"=>"Lütfen bahislerinizi yapın.",
"dealing_cards"=>"Lütfen kartlar dağıtılana kadar bekleyiniz.",
"draw_returned"=>"Teknik bir problemden dolayı oyun turu geçersiz sayılarak, tüm bahis miktarları iade edilmiştir.",
"banker_pair"=>"Kurpiyer Pair",
"player_pair"=>"Oyuncu Pair",
"natural"=>"DOĞAL",
"history"=>"TARiH",
"lottery_is_returned"=>"Teknik bir problemden dolayı oyun turu geçersiz sayılarak, tüm bahis miktarları iade edilmiştir.",
"won_message"=>"Kazanç",
"last_results_title"=>"Son 5 Oyun",
"maintenance"=>"Oyun bakım altında",
"live_starts_in"=>"Canlı yayına kalana süre",
"live"=>"CANLI",
"win"=>"Win",
"tax"=>"Vergi",
"payout_tax"=>"ödeme vergisi",
"run_started"=>"Oyun turu başladı.",
"waiting_for_results"=>"Sonuçlar bekleniyor...",
"rerun_spin"=>"Dönüş tekrarı",
"rerun_spin_rules"=>"Kural bölümü 4.2",
"rerun_roll"=>"Zar atışının tekrarı",
"rerun_roll_rules"=>"Bölüm 5.2",
"shuffle_deck"=>"Bu oyun turundan sonra kartlık değiştirilecektir.",
"top_won_title"=>"Son Oyunun Kazançları",
"odds_have_changed"=>"Odds have been changed",
"pick_your_guess"=>"Make a choice",
"stake"=>"Stake amount",
"oops_bad_luck"=>"Try again. Better luck next time!",
"missed_round"=>"No choice made - Cashed out",
"game_started"=>"Bet accepted. Good luck!",
"game_stopped"=>"You are a WINNER! Cashed out",
"dealing_the_card"=>"Wait for next card",
"clear"=>"Clear",
"cashout"=>"Cash Out",
"correct_guess"=>"Congratulations! Great Win!",
"not_logged_in"=>"Siz bağlı değilsiniz"
);

$json_translations_notifications = array(
"cashback.upcoming.title"=>"Cashback upcoming {percent}%",
"cashback.upcoming.description"=>"Cashback promotion will start on {date}",
"cashback.active.title"=>"Cashback {percent}%",
"cashback.active.description"=>"Cashback promotion is on and will last until {date}"
);

$json_translations_rounds_5 = array(
"1"=>"BET",
"2"=>"PREFLOPTA",
"3"=>"DÜŞME",
"4"=>"DÖNÜŞ",
"5"=>"AKIŞ"
);

$json_translations_rounds_6 = array(
"1"=>"Öncelikli bahisler",
"2"=>"Oyuncu kartı",
"3"=>"Krupiye kartı"
);

$json_translations_rounds_8 = array(
"1"=>"Öncelikli bahisler",
"2"=>"Oyuncu kartı"
);

$json_translations_rounds = array(
"5"=>$json_translations_rounds_5,
"6"=>$json_translations_rounds_6,
"8"=>$json_translations_rounds_8
);

$json_translations_statuses = array(
"lost"=>"kaybetti",
"active"=>"aktif",
"push"=>"itme",
"returned"=>"İade edildi",
"won"=>"kazandı"
);

$json_translations_favorites = array(
"add"=>"Sık kullanılanlara ekle",
"remove"=>"Sık kullanılanlardan kaldır"
);

$json_translations_resultsAbbr = array(
"player"=>"P",
"dealer"=>"D",
"banker"=>"B"
);

$json_translations_gameNames = array(
"1"=>"Şanslı 7",
"9"=>"Şanslı 6",
"3"=>"Şanslı 5",
"4"=>"ZAR",
"10"=>"Zar Düellosu",
"12"=>"6+ Poker",
"7"=>"Çarkıfelek",
"5"=>"Poker",
"6"=>"Bakara",
"8"=>"Basmaca"
);

$json_translations_oddGroups = array(
"29"=>"Toplam Sayı Az / Çok",
"30"=>"Tek / Çift",
"32"=>"Eller",
"33"=>"Kombinasyonlar",
"28"=>"Numaralar",
"26"=>"Diğer Renkler",
"25"=>"Mavi Toplar",
"24"=>"Kırmızı Toplar",
"23"=>"Yeşil Toplar",
"22"=>"Beyaz Toplar",
"21"=>"Numaralar",
"20"=>"Siyah / Sarı",
"19"=>"Tek / Çift",
"18"=>"Toplam Adetler",
"17"=>"Toplam Az / Çok",
"16"=>"Siyah ve Sarı Toplar Az / Çok",
"15"=>"Numaralar",
"27"=>"Kombinasyonlar",
"35"=>"ANA BAHİSLER",
"36"=>"YAN BAHİSLER",
"37"=>"RENK",
"38"=>"DESTE",
"39"=>"TOPLAM",
"40"=>"ÇİFT / TEK",
"41"=>"Sayılar",
"42"=>"Renk",
"43"=>"Çift / Tek",
"45"=>"ANA BAHİSLER",
"46"=>"RENKLER",
"47"=>"DESTE",
"48"=>"DEĞERLER",
"49"=>"NUMARALAR",
"50"=>"TOPLAM ADETLER",
"51"=>"Renkler",
"52"=>"TEK / ÇİFT",
"53"=>"TOPLAM ALT / ÜST",
"54"=>"ANA BAHİSLER",
"55"=>"NUMARALAR",
"56"=>"TEK ÇİFT",
"57"=>"TOPLAM ALT / ÜST",
"58"=>"Hands",
"59"=>"Combinations",
"60"=>"En Fazla Kart Rengi"
);

$json_translations_oddGroups_dil = array(
"29"=>"".getTranslation('casinoicin373')."",
"30"=>"".getTranslation('casinoicin374')."",
"32"=>"".getTranslation('casinoicin375')."",
"33"=>"".getTranslation('casinoicin376')."",
"28"=>"".getTranslation('casinoicin377')."",
"26"=>"".getTranslation('casinoicin378')."",
"25"=>"".getTranslation('casinoicin379')."",
"24"=>"".getTranslation('casinoicin380')."",
"23"=>"".getTranslation('casinoicin381')."",
"22"=>"".getTranslation('casinoicin382')."",
"21"=>"".getTranslation('casinoicin377')."",
"20"=>"".getTranslation('casinoicin383')."",
"19"=>"".getTranslation('casinoicin374')."",
"18"=>"".getTranslation('casinoicin384')."",
"17"=>"".getTranslation('casinoicin385')."",
"16"=>"".getTranslation('casinoicin386')."",
"15"=>"".getTranslation('casinoicin377')."",
"27"=>"".getTranslation('casinoicin376')."",
"35"=>"".getTranslation('casinoicin387')."",
"36"=>"".getTranslation('casinoicin388')."",
"37"=>"".getTranslation('casinoicin389')."",
"38"=>"".getTranslation('casinoicin390')."",
"39"=>"".getTranslation('casinoicin391')."",
"40"=>"".getTranslation('casinoicin374')."",
"41"=>"".getTranslation('casinoicin392')."",
"42"=>"".getTranslation('casinoicin389')."",
"43"=>"".getTranslation('casinoicin374')."",
"45"=>"".getTranslation('casinoicin387')."",
"46"=>"".getTranslation('casinoicin393')."",
"47"=>"".getTranslation('casinoicin390')."",
"48"=>"".getTranslation('casinoicin394')."",
"49"=>"".getTranslation('casinoicin377')."",
"50"=>"".getTranslation('casinoicin384')."",
"51"=>"".getTranslation('casinoicin393')."",
"52"=>"".getTranslation('casinoicin374')."",
"53"=>"".getTranslation('casinoicin395')."",
"54"=>"".getTranslation('casinoicin387')."",
"55"=>"".getTranslation('casinoicin377')."",
"56"=>"".getTranslation('casinoicin374')."",
"57"=>"".getTranslation('casinoicin395')."",
"58"=>"".getTranslation('casinoicin396')."",
"59"=>"".getTranslation('casinoicin397')."",
"60"=>"".getTranslation('casinoicin398').""
);

$json_translations_odds = array(
"9"=>"Daha çok TEK sayılı toplar gelecek",
"10"=>"Daha çok ÇİFT sayılı toplar gelecek",
"11"=>"Gelen topların numara toplamı TEK sayı olacak",
"12"=>"Gelen topların numara toplamı ÇİFT sayı olacak",
"13"=>"İLK gelen numara TEK sayı olacak",
"14"=>"İLK gelen numara ÇİFT sayı olacak",
"15"=>"SON gelen numara TEK sayı olacak",
"16"=>"SON gelen numara ÇİFT sayı olacak",
"19"=>"İLK gelen numara TEK sayı, İKİNCİ gelen numara ÇİFT sayı olacak",
"17"=>"Gelen İLK İKİ numara TEK sayı olacak",
"18"=>"Gelen İLK İKİ numara ÇİFT sayı olacak",
"20"=>"İLK gelen numara ÇİFT sayı, İKİNCİ gelen numara TEK sayı olacak",
"21"=>"İLK gelen numara TEK sayı, SON gelen numara ÇİFT sayı olacak",
"22"=>"İLK gelen numara ÇİFT sayı, SON gelen numara TEK sayı olacak",
"23"=>"İLK gelen topun RENGİ - SARI olur",
"24"=>"İLK gelen topun RENGİ - SİYAH olur",
"25"=>"SON gelen topun RENGİ - SARI olur",
"26"=>"SON gelen topun RENGİ - SİYAH olur",
"27"=>"Daha fazla SARI top gelecek",
"28"=>"Daha fazla SİYAH top gelecek",
"29"=>"İKİNCİ gelen topun rengi İLK gelen topun renginde olacak",
"30"=>"İKİNCİ gelen topun rengi İLK gelen toptan FARKLI RENK olacak",
"35"=>"Gelen numaraların toplamı 100,5’ten AZ olacak",
"37"=>"Gelen numaraların toplamı 125,5’ten AZ olacak",
"38"=>"Gelen numaraların toplamı 125,5’ten ÇOK olacak",
"39"=>"Gelen numaraların toplamı 150,5’ten AZ olacak",
"40"=>"Gelen numaraların toplamı 150,5’ten ÇOK olacak",
"41"=>"Gelen numaraların toplamı 175,5’ten AZ olacak",
"42"=>"Gelen numaraların toplamı 175,5’ten ÇOK olacak",
"44"=>"Gelen numaraların toplamı 200,5’ten ÇOK olacak",
"49"=>"Gelen SARI topların numara TOPLAMI 73,5’tan AZ olacak",
"50"=>"Gelen SARI topların numara TOPLAMI 73,5’tan ÇOK olacak",
"51"=>"Gelen SİYAH topların numara TOPLAMI 73,5’tan AZ olacak",
"52"=>"Gelen SİYAH topların numara TOPLAMI 73,5’tan ÇOK olacak",
"53"=>"3.5’ten AZ SARI top gelecek",
"54"=>"3.5’ten ÇOK SARI top gelecek",
"55"=>"2.5’ten AZ SARI top gelecek",
"56"=>"2.5’ten ÇOK SARI top gelecek",
"57"=>"1.5’ten AZ SARI top gelecek",
"58"=>"1.5’ten ÇOK SARI top gelecek",
"59"=>"Hiç SARI top gelmeyecek",
"60"=>"3.5’ten AZ SİYAH top gelecek",
"61"=>"3.5’ten ÇOK SİYAH top gelecek",
"62"=>"2.5’ten AZ SİYAH top gelecek",
"63"=>"2.5’ten ÇOK SİYAH top gelecek",
"64"=>"1.5’ten AZ SİYAH top gelecek",
"65"=>"1.5’ten ÇOK SİYAH top gelecek",
"66"=>"Hiç SİYAH top gelmeyecek",
"67"=>"YEDİ TANE SARI top gelecek",
"68"=>"TAM olarak ALTI SARI TOP gelecek",
"69"=>"TAM olarak BEŞ SARI TOP gelecek",
"70"=>"TAM olarak DÖRT SARI TOP gelecek",
"71"=>"TAM olarak ÜÇ SARI TOP gelecek",
"72"=>"TAM olarak İKİ SARI TOP gelecek",
"73"=>"TAM olarak BİR SARI TOP gelecek",
"74"=>"YEDİ TANE SİYAH top gelecek",
"75"=>"TAM olarak ALTI SİYAH TOP gelecek",
"76"=>"TAM olarak BEŞ SİYAH TOP gelecek",
"77"=>"TAM olarak DÖRT SİYAH TOP gelecek",
"78"=>"TAM olarak ÜÇ SİYAH TOP gelecek",
"79"=>"TAM olarak İKİ SİYAH TOP gelecek",
"80"=>"TAM olarak BİR SİYAH TOP gelecek",
"81"=>"Seçilen YEDİ numaranın HİÇBİRİ gelmeyecek",
"82"=>"Seçilen YEDİ numaranın en az BİRİ gelecek",
"83"=>"Seçilen YEDİ numaranın en az İKİSİ gelecek",
"84"=>"Seçilen YEDİ numaranın en az ÜÇÜ gelecek",
"85"=>"Seçilen YEDİ numaranın en az DÖRDÜ gelecek",
"86"=>"Seçilen YEDİ numaranın en az BEŞİ gelecek",
"279"=>"Daha çok TEK sayılı toplar gelecek",
"280"=>"Daha çok ÇİFT sayılı toplar gelecek",
"281"=>"Gelen topların numara toplamı TEK sayı olacak",
"282"=>"Gelen topların numara toplamı ÇİFT sayı olacak",
"283"=>"Gelen numaraların toplamı 92,5’ten AZ olacak",
"284"=>"Gelen numaraların toplamı 92,5’ten ÇOK olacak",
"285"=>"En az bir tane BEYAZ top gelecek",
"286"=>"Hiç BEYAZ top gelmeyecek",
"287"=>"1,5’ten ÇOK BEYAZ top gelecek",
"288"=>"1,5’ten AZ BEYAZ top gelecek",
"289"=>"2,5’ten ÇOK BEYAZ top gelecek",
"290"=>"2,5’ten AZ BEYAZ top gelecek",
"291"=>"3,5’ten ÇOK BEYAZ top gelecek",
"293"=>"BEŞ tane BEYAZ top gelecek",
"294"=>"En az bir tane YEŞİL top gelecek",
"295"=>"Hiç YEŞİL top gelmeyecek",
"296"=>"1,5’ten ÇOK YEŞİL top gelecek",
"297"=>"1,5’ten AZ YEŞİL top gelecek",
"298"=>"2,5’ten ÇOK YEŞİL top gelecek",
"299"=>"2,5’ten AZ YEŞİL top gelecek",
"300"=>"3,5’ten ÇOK YEŞİL top gelecek",
"302"=>"BEŞ tane YEŞİL top gelecek",
"303"=>"En az bir tane KIRMIZI top gelecek",
"304"=>"Hiç KIRMIZI top gelmeyecek",
"305"=>"1,5’ten ÇOK KIRMIZI top gelecek",
"306"=>"1,5’ten AZ KIRMIZI top gelecek",
"307"=>"2,5’ten ÇOK KIRMIZI top gelecek",
"309"=>"3,5’ten ÇOK KIRMIZI top gelecek",
"311"=>"BEŞ tane KIRMIZI top gelecek",
"313"=>"Hiç MAVİ  top gelmeyecek",
"314"=>"1,5’ten ÇOK MAVİ top gelecek",
"315"=>"1,5’ten AZ MAVİ top gelecek",
"316"=>"2,5’ten ÇOK MAVİ top gelecek",
"317"=>"2,5’ten AZ MAVİ top gelecek",
"318"=>"3,5’ten ÇOK MAVİ top gelecek",
"320"=>"BEŞ tane MAVİ top gelecek",
"321"=>"TAM olarak BİR BEYAZ TOP gelecek",
"322"=>"TAM olarak BİR BEYAZ top GELMEYECEK",
"323"=>"TAM olarak İKİ BEYAZ TOP gelecek",
"379"=>"İkişer kere aynı numaralar gelecek (farklı)",
"378"=>"En az iki AYNI numara olacak",
"383"=>"Hepsi farklı gelecek",
"380"=>"Aynı numaradan üç tane gelecek",
"384"=>"Üç tane aynı numara ve iki tane aynı numara gelecek",
"385"=>"Aynı numaradan dört tane gelecek",
"386"=>"Aynı numaradan beş tane gelecek",
"390"=>"Seçilen numara gelecek",
"391"=>"Seçilen numara GELMEYECEK",
"392"=>"Gelen zarların sayıları toplamı 17,5’ten AZ olacak",
"393"=>"Gelen zarların sayıları toplamı 17,5’ten ÇOK olacak",
"394"=>"Gelen zarların sayıları toplamı 13,5’ten AZ olacak",
"389"=>"Seçilen numara TAM olarak ÜÇ kere gelecek",
"387"=>"Seçilen numara TAM olarak İKİ kere gelecek",
"395"=>"Gelen zarların sayıları toplamı 13,5’ten ÇOK olacak",
"396"=>"Gelen zarların sayıları toplamı 21,5’ten AZ olacak",
"397"=>"Gelen zarların sayıları toplamı 21,5’ten ÇOK olacak",
"398"=>"Gelen zarların sayıları toplamı 10,5’ten AZ olacak",
"399"=>"Gelen zarların sayıları toplamı 10,5’ten ÇOK olacak",
"400"=>"Gelen zarların sayıları toplamı 24,5’ten AZ olacak",
"401"=>"Gelen zarların sayıları toplamı 24,5’ten ÇOK olacak",
"402"=>"Daha çok TEK sayılı zarlar gelecek",
"407"=>"Gelen her zarın numarası tek sayı olacak",
"406"=>"Gelen her zarın numarası çift sayı olacak",
"405"=>"DÖRT tane numarası ÇİFT sayı olan ve BİR tane de TEK sayı olan zar gelecek",
"404"=>"DÖRT tane numarası TEK sayı olan ve BİR tane de ÇİFT sayı olan zar gelecek",
"403"=>"Daha çok ÇİFT sayılı zarlar gelecek",
"1"=>"1-42 arasında seçilmiş numara bu çekilişte gelecek",
"2"=>"1-42 arasında seçilmiş numara bu çekilişte GELMEYECEK",
"5"=>"1-42 arasında seçilmiş DÖRT adet numara bu çekilişte gelecek",
"4"=>"1-42 arasında seçilmiş ÜÇ adet numara bu çekilişte gelecek",
"3"=>"1-42 arasında seçilmiş İKİ adet numara bu çekilişte gelecek",
"325"=>"TAM olarak ÜÇ BEYAZ TOP gelecek",
"326"=>"TAM olarak ÜÇ BEYAZ top GELMEYECEK",
"327"=>"TAM olarak DÖRT BEYAZ TOP gelecek",
"330"=>"TAM olarak BİR YEŞİL TOP gelecek",
"331"=>"TAM olarak BİR YEŞİL top GELMEYECEK",
"332"=>"TAM olarak İKİ YEŞİL TOP gelecek",
"333"=>"TAM olarak İKİ YEŞİL top GELMEYECEK",
"334"=>"TAM olarak ÜÇ YEŞİL TOP gelecek",
"335"=>"TAM olarak ÜÇ YEŞİL top GELMEYECEK",
"324"=>"TAM olarak İKİ BEYAZ top GELMEYECEK",
"273"=>"1-36 arasında seçilmiş numara bu çekilişte gelecek",
"274"=>"1-36 arasında seçilmiş numara bu çekilişte GELMEYECEK",
"275"=>"1-36 arasında seçilmiş İKİ numara bu çekilişte gelecek",
"276"=>"1-36 arasında seçilmiş ÜÇ numara bu çekilişte gelecek",
"336"=>"TAM olarak DÖRT YEŞİL top gelecek",
"338"=>"TAM olarak BİR KIRMIZI top gelecek",
"339"=>"TAM olarak BİR KIRMIZI top GELMEYECEK",
"340"=>"TAM olarak İKİ KIRMIZI top gelecek",
"341"=>"TAM olarak İKİ KIRMIZI top GELMEYECEK",
"342"=>"TAM olarak ÜÇ KIRMIZI top gelecek",
"343"=>"TAM olarak ÜÇ KIRMIZI top GELMEYECEK",
"344"=>"TAM olarak DÖRT KIRMIZI top gelecek",
"346"=>"TAM olarak BİR MAVİ top gelecek",
"347"=>"TAM olarak BİR MAVİ top GELMEYECEK",
"348"=>"TAM olarak İKİ MAVİ top gelecek",
"349"=>"TAM olarak İKİ MAVİ top GELMEYECEK",
"351"=>"TAM olarak ÜÇ MAVİ top GELMEYECEK",
"352"=>"TAM olarak DÖRT MAVİ top gelecek",
"354"=>"ÜÇ veya daha fazla AYNI RENK top gelecek",
"355"=>"DÖRT veya daha fazla AYNI RENK top gelecek",
"356"=>"BEŞ AYNI RENK top gelecek",
"357"=>"Gelen BEYAZ ve YEŞİL toplar KIRMIZI ve MAVİ toplardan FAZLA olacak",
"358"=>"Gelen BEYAZ ve KIRMIZI toplar YEŞİL ve MAVİ toplardan FAZLA olacak",
"359"=>"Gelen BEYAZ ve MAVİ toplar YEŞİL ve KIRMIZI toplardan FAZLA olacak",
"360"=>"Gelen BEYAZ toplar YEŞİL toplardan FAZLA olacak",
"361"=>"Gelen YEŞİL toplar BEYAZ toplardan FAZLA olacak",
"362"=>"EŞİT SAYIDA BEYAZ ve YEŞİL top gelecek",
"363"=>"Gelen BEYAZ toplar KIRMIZI toplardan FAZLA olacak",
"364"=>"Gelen KIRMIZI toplar BEYAZ toplardan FAZLA olacak",
"365"=>"EŞİT SAYIDA BEYAZ ve KIRMIZI top gelecek",
"366"=>"Gelen BEYAZ toplar MAVİ toplardan FAZLA olacak",
"367"=>"Gelen MAVİ toplar BEYAZ toplardan FAZLA olacak",
"368"=>"EŞİT SAYIDA BEYAZ ve MAVİ top gelecek",
"369"=>"Gelen YEŞİL toplar KIRMIZI toplardan FAZLA olacak",
"377"=>"EŞİT SAYIDA MAVİ ve KIRMIZI top gelecek",
"376"=>"Gelen MAVİ toplar KIRMIZI toplardan FAZLA olacak",
"375"=>"Gelen KIRMIZI toplar MAVİ toplardan FAZLA olacak",
"374"=>"EŞİT SAYIDA YEŞİL ve MAVİ top gelecek",
"373"=>"Gelen MAVİ toplar YEŞİL toplardan FAZLA olacak",
"372"=>"Gelen YEŞİL toplar MAVİ toplardan FAZLA olacak",
"371"=>"EŞİT SAYIDA YEŞİL ve KIRMIZI top gelecek",
"370"=>"Gelen KIRMIZI toplar YEŞİL toplardan FAZLA olacak",
"350"=>"TAM olarak ÜÇ MAVİ top gelecek",
"312"=>"En az bir tane MAVİ top gelecek",
"308"=>"2,5’ten AZ KIRMIZI top gelecek",
"382"=>"Sırayla 2, 3, 4, 5 ,6 gelecek",
"381"=>"Sırayla 1, 2, 3, 4, 5 gelecek",
"447"=>"2. el kazanır",
"448"=>"3. el kazanır",
"449"=>"4. el kazanır",
"450"=>"5. el kazanır",
"451"=>"6. el kazanır",
"446"=>"1. el kazanır",
"459"=>"Yüksek Kart kazanır",
"460"=>"Per kazanır",
"461"=>"Döper kazanır",
"462"=>"Üçlü kazanır",
"463"=>"Kent kazanır",
"464"=>"Floş kazanır",
"465"=>"Ful kazanır",
"466"=>"Kare kazanır",
"467"=>"Sıralı Floş kazanır",
"468"=>"Royal Floş kazanır",
"469"=>"Oyuncu",
"470"=>"Krupiye",
"471"=>"Berabere",
"472"=>"Oyuncu Per",
"473"=>"Kurpiyer Per",
"474"=>"İkisinden biri Per",
"475"=>"Kusursuz Per",
"476"=>"Küçük",
"477"=>"Büyük",
"478"=>"Daha fazla KIRMIZI kart gelecek",
"479"=>"Daha fazla SİYAH kart gelecek",
"480"=>"Eşit sayıda SİYAH ve KIRMIZI kart gelecek",
"483"=>"Bütün kartlar AYNI DESTE olacak",
"484"=>"OYUNCUYA gelen ilk iki kart AYNI DESTE olacak",
"485"=>"KRUPİYEYE gelen ilk iki kart AYNI DESTE olacak",
"486"=>"Oyuncu ve Krupiyenin sayıları toplamı 9.5 ALT",
"487"=>"Oyuncu ve Krupiyenin sayıları toplamı 9.5 ÜST",
"488"=>"Oyuncu ve Krupiyenin sayıları toplamı ÇİFT sayı olacak",
"489"=>"Oyuncu ve Krupiyenin sayıları toplamı TEK sayı olacak",
"490"=>"OYUNCU SAYILARI toplamı ÇİFT sayı olacak",
"491"=>"OYUNCU SAYILARI toplamı TEK sayı olacak",
"492"=>"KRUPİYE SAYILARI toplamı ÇİFT sayı olacak",
"493"=>"KRUPİYE SAYILARI toplamı TEK sayı olacak",
"494"=>"Sıradaki kart - kırmızı",
"495"=>"Sıradaki kart - siyah",
"496"=>"Sıradaki kart - maça",
"497"=>"Sıradaki kart - kupa",
"498"=>"Sıradaki kart - sinek",
"499"=>"Sıradaki kart - karo",
"500"=>"Çarkın Oku SEÇİLEN NUMARA (1.....18) de duracak",
"501"=>"Çarkın Oku 1 DEN  6 YA (1 ve 6 dahil ) sayı sıralaması içinde duracak",
"502"=>"Çarkın Oku 7 DEN  12 YE (7 ve 12 dahil ) sayı sıralaması içinde duracak",
"503"=>"Çarkın Oku 13 DEN  18’ E (13 ve 18 dahil ) sayı sıralaması içinde duracak",
"504"=>"Çarkın Oku 9.5’dan KÜÇÜK bir sayıda duracak",
"505"=>"Çarkın Oku 9.5’dan BÜYÜK bir sayıda duracak",
"506"=>"Çarkın Oku GRİ dilimde duracak",
"507"=>"Çarkın Oku KIRMIZI dilimde duracak",
"508"=>"Çarkın Oku SİYAH dilimde duracak",
"509"=>"Çarkın Oku YILDIZLI KUPA diliminde duracak",
"510"=>"Çarkın Oku herhangi bir ÇİFT sayıda duracak",
"511"=>"Çarkın Oku herhangi bir TEK sayıda duracak",
"512"=>"Çarkın Oku GRİ dilimde herhangi bir ÇİFT sayıda duracak",
"513"=>"Çarkın Oku GRİ dilimde herhangi bir TEK sayıda duracak",
"514"=>"Çarkın Oku KIRMIZI dilimde herhangi bir ÇİFT sayıda duracak",
"515"=>"Çarkın Oku KIRMIZI dilimde herhangi bir TEK sayıda duracak",
"516"=>"Çarkın Oku SİYAH dilimde herhangi bir ÇİFT sayıda duracak",
"517"=>"Çarkın Oku SİYAH dilimde herhangi bir TEK sayıda duracak",
"528"=>"Krupiye kazanır",
"529"=>"Oyuncu kazanır",
"530"=>"Savaş",
"531"=>"Krupiyenin kartı kırmızı olacak",
"532"=>"Krupiyenin kartı siyah olacak",
"533"=>"Oyuncunun kartı kırmızı olacak",
"534"=>"Oyuncunun kartı siyah olacak",
"535"=>"Krupiyenin kartı sinek olacak",
"536"=>"Krupiyenin kartı karo olacak",
"537"=>"Krupiyenin kartı kupa olacak",
"538"=>"Krupiyenin kartı maça olacak",
"539"=>"Oyuncunun kartı sinek olacak",
"540"=>"Oyuncunun kartı karo olacak",
"541"=>"Oyuncunun kartı kupa olacak",
"542"=>"Oyuncunun kartı maça olacak",
"543"=>"Krupiyenin kart değeri tam olarak 8 olacak",
"544"=>"Krupiyenin kart değeri 8 den az olacak",
"545"=>"Krupiyenin kart değeri 8 den çok olacak",
"546"=>"Oyuncunun kart değeri tam olarak 8 olacak",
"547"=>"Oyuncunun kart değeri 8 den az olacak",
"548"=>"Oyuncunun kart değeri 8 den çok olacak",
"549"=>"Krupiyenin kartı resimli olacak (Vale, Kız, Papaz)",
"550"=>"Krupiyenin kartı numara olacak (A, 2, 3, 4, 5, 6, 7, 8, 9, 10)",
"551"=>"Oyuncun kartı resimli olacak (Vale, Kız, Papaz)",
"552"=>"Oyuncunun kartı numara olacak (A, 2, 3, 4, 5, 6, 7, 8, 9, 10)",
"518"=>"80.5’ten daha az düşmüş sayı miktarı",
"519"=>"80.5’ten daha fazla düşmüş sayı miktarı",
"520"=>"99.5’ten daha az düşmüş sayı miktarı",
"521"=>"99.5’ten daha fazla düşmüş sayı miktarı",
"522"=>"En azından 1 sayı kırmızı 5 düşecek",
"523"=>"En azından 1 sayı kırmızı 5 düşmeyecek",
"524"=>"En azından 1 sayı kırmızı 10 düşecek",
"525"=>"En azından 1 sayı kırmızı 10 düşmeyecek",
"526"=>"En azından bitişik numara ile 2 sayı düşecek",
"527"=>"En azından bitişik numara ile 2 sayı düşmeyecek",
"553"=>"0,...,9 arasında seçilmiş numara A bölgeye çekilecek",
"554"=>"0,...,9 arasında seçilmiş numara B bölgeye çekilecek",
"555"=>"0,...,9 arasında seçilmiş numara C bölgeye çekilecek",
"556"=>"A bölgesindeki şanslı numaralar arasında seçilen numara olacak 00,...,99",
"557"=>"B bölgesindeki şanslı numaralar arasında seçilen numara olacak 00,...,99",
"558"=>"C bölgesindeki şanslı numaralar arasında seçilen numara olacak 00,...,99",
"559"=>"Seçilen numarayla (0-9) gelen şanslı topların ADEDİ 1.5 ÜST olacak.",
"560"=>"Seçilen numarayla (0-9) gelen şanslı topların ADEDİ 1.5 ALT olacak.",
"561"=>"Seçilen numarayla (0-9) gelen şanslı topların ADEDİ ÇİFT SAYI olacak.",
"562"=>"Seçilen numarayla (0-9) gelen şanslı topların ADEDİ TEK SAYI olacak.",
"563"=>"Çekilen KIRMIZI topların üzerindeki numaralar TOPLAMI 13.5 ALT",
"564"=>"Çekilen KIRMIZI topların üzerindeki numaralar TOPLAMI 13.5 ÜST",
"565"=>"Çekilen MAVİ topların üzerindeki numaralar TOPLAMI 12.5 ALT",
"566"=>"Çekilen MAVİ topların üzerindeki numaralar TOPLAMI 12.5 ÜST",
"567"=>"A bölgeye çekilen topların üzerindeki numaralar TOPLAMI 9.5 ALT",
"568"=>"A bölgeye çekilen topların üzerindeki numaralar TOPLAMI 9.5 ÜST",
"569"=>"B bölgeye çekilen topların üzerindeki numaralar TOPLAMI 9.5 ALT",
"570"=>"B bölgeye çekilen topların üzerindeki numaralar TOPLAMI 9.5 ÜST",
"571"=>"C bölgeye çekilen topların üzerindeki numaralar TOPLAMI 9.5 ALT",
"572"=>"C bölgeye çekilen topların üzerindeki numaralar TOPLAMI 9.5 ÜST",
"573"=>"Çekilen topların üzerindeki numaraların toplamı ÇİFT SAYI olacak",
"574"=>"Çekilen topların üzerindeki numaraların toplamı TEK SAYI olacak",
"575"=>"ÇİFT sayılı topların ADEDİ 2.5 ALT olacak",
"576"=>"ÇİFT sayılı topların ADEDİ 2.5 ÜST olacak",
"577"=>"TEK sayılı topların ADEDİ 2.5 ALT olacak",
"578"=>"TEK sayılı topların ADEDİ 2.5 ÜST olacak",
"579"=>"A bölgesindeki şanslı topların toplamı ÇİFT SAYI olacak",
"580"=>"A bölgesindeki şanslı topların toplamı TEK SAYI olacak",
"581"=>"B bölgesindeki şanslı topların toplamı ÇİFT SAYI olacak",
"582"=>"B bölgesindeki şanslı topların toplamı TEK SAYI olacak",
"583"=>"C bölgesindeki şanslı topların toplamı ÇİFT SAYI olacak",
"584"=>"C bölgesindeki şanslı topların toplamı TEK SAYI olacak",
"585"=>"Çekilen topların üzerindeki numaralar TOPLAMI 26.5 ALT",
"586"=>"Çekilen topların üzerindeki numaralar TOPLAMI 26.5 ÜST",
"587"=>"Çekilen topların üzerindeki numaralar TOPLAMI 15.5 ALT",
"588"=>"Çekilen topların üzerindeki numaralar TOPLAMI 15.5 ÜST",
"589"=>"Çekilen topların üzerindeki numaralar TOPLAMI 38.5 ALT",
"590"=>"Çekilen topların üzerindeki numaralar TOPLAMI 38.5 ÜST",
"591"=>"Kırmızı zar kazanacak",
"592"=>"Berabere",
"593"=>"Mavi zar kazanacak",
"594"=>"Seçilen numara KIRMIZI zarda gelecek",
"595"=>"Seçilen numara MAVİ zarda gelecek",
"596"=>"Seçilen KIRMIZI ve MAVİ zar kombinasyonu gelecek",
"597"=>"KIRMIZI zarda gelen sayı TEK olacak",
"598"=>"KIRMIZI zarda gelen sayı ÇİFT olacak",
"599"=>"MAVİ zarda gelen sayı TEK olacak",
"600"=>"MAVİ zarda gelen sayı ÇİFT olacak",
"601"=>"İKİ zarda gelen sayıların toplamı TEK olacak",
"602"=>"İKİ zarda gelen sayıların toplamı ÇİFT olacak",
"603"=>"KIRMIZI zar için gelen sayı 3.5 ALT",
"604"=>"KIRMIZI zar için gelen sayı 3.5 ÜST",
"605"=>"MAVİ zar için gelen sayı 3.5 ALT",
"606"=>"MAVI zar için gelen sayı 3.5 ÜST",
"607"=>"İki zar toplam sayılar 4.5 ALT",
"608"=>"İki zar toplam sayılar 4.5 ÜST",
"609"=>"İki zar toplam sayılar 5.5 ALT",
"610"=>"İki zar toplam sayılar 5.5 ÜST",
"611"=>"İki zar toplam sayılar 6.5 ALT",
"612"=>"İki zar toplam sayılar 6.5 ÜST",
"613"=>"İki zar toplam sayılar 7.5 ALT",
"614"=>"İki zar toplam sayılar 7.5 ÜST",
"615"=>"İki zar toplam sayılar 8.5 ALT",
"616"=>"İki zar toplam sayılar 8.5 ÜST",
"617"=>"İki zar toplam sayılar 9.5 ALT",
"618"=>"İki zar toplam sayılar 9.5 ÜST",
"619"=>"Krupiye kazanır",
"620"=>"Oyuncu kazanır",
"622"=>"Yüksek Kart kazanır",
"632"=>"Kirmizi",
"633"=>"Siyah",
"621"=>"Eşitlik",
"623"=>"Per kazanır",
"624"=>"Döper kazanır",
"625"=>"Üçlü kazanır",
"626"=>"Kent kazanır",
"627"=>"Floş kazanır",
"628"=>"Ful kazanır",
"629"=>"Kare kazanır",
"630"=>"Sıralı Floş kazanır",
"631"=>"Royal Floş kazanır"
);

$json_translations_odds_dil = array(
"9"=>"".getTranslation('casinoicin41')."",
"10"=>"".getTranslation('casinoicin42')."",
"11"=>"".getTranslation('casinoicin43')."",
"12"=>"".getTranslation('casinoicin44')."",
"13"=>"".getTranslation('casinoicin45')."",
"14"=>"".getTranslation('casinoicin46')."",
"15"=>"".getTranslation('casinoicin47')."",
"16"=>"".getTranslation('casinoicin48')."",
"19"=>"".getTranslation('casinoicin49')."",
"17"=>"".getTranslation('casinoicin50')."",
"18"=>"".getTranslation('casinoicin51')."",
"20"=>"".getTranslation('casinoicin52')."",
"21"=>"".getTranslation('casinoicin53')."",
"22"=>"".getTranslation('casinoicin54')."",
"23"=>"".getTranslation('casinoicin55')."",
"24"=>"".getTranslation('casinoicin56')."",
"25"=>"".getTranslation('casinoicin57')."",
"26"=>"".getTranslation('casinoicin58')."",
"27"=>"".getTranslation('casinoicin59')."",
"28"=>"".getTranslation('casinoicin60')."",
"29"=>"".getTranslation('casinoicin61')."",
"30"=>"".getTranslation('casinoicin62')."",
"35"=>"".getTranslation('casinoicin63')."",
"37"=>"".getTranslation('casinoicin64')."",
"38"=>"".getTranslation('casinoicin65')."",
"39"=>"".getTranslation('casinoicin66')."",
"40"=>"".getTranslation('casinoicin67')."",
"41"=>"".getTranslation('casinoicin68')."",
"42"=>"".getTranslation('casinoicin69')."",
"44"=>"".getTranslation('casinoicin70')."",
"49"=>"".getTranslation('casinoicin71')."",
"50"=>"".getTranslation('casinoicin72')."",
"51"=>"".getTranslation('casinoicin73')."",
"52"=>"".getTranslation('casinoicin74')."",
"53"=>"".getTranslation('casinoicin75')."",
"54"=>"".getTranslation('casinoicin76')."",
"55"=>"".getTranslation('casinoicin77')."",
"56"=>"".getTranslation('casinoicin78')."",
"57"=>"".getTranslation('casinoicin79')."",
"58"=>"".getTranslation('casinoicin80')."",
"59"=>"".getTranslation('casinoicin81')."",
"60"=>"".getTranslation('casinoicin82')."",
"61"=>"".getTranslation('casinoicin83')."",
"62"=>"".getTranslation('casinoicin84')."",
"63"=>"".getTranslation('casinoicin85')."",
"64"=>"".getTranslation('casinoicin86')."",
"65"=>"".getTranslation('casinoicin87')."",
"66"=>"".getTranslation('casinoicin88')."",
"67"=>"".getTranslation('casinoicin89')."",
"68"=>"".getTranslation('casinoicin90')."",
"69"=>"".getTranslation('casinoicin91')."",
"70"=>"".getTranslation('casinoicin92')."",
"71"=>"".getTranslation('casinoicin93')."",
"72"=>"".getTranslation('casinoicin94')."",
"73"=>"".getTranslation('casinoicin95')."",
"74"=>"".getTranslation('casinoicin96')."",
"75"=>"".getTranslation('casinoicin97')."",
"76"=>"".getTranslation('casinoicin98')."",
"77"=>"".getTranslation('casinoicin99')."",
"78"=>"".getTranslation('casinoicin100')."",
"79"=>"".getTranslation('casinoicin101')."",
"80"=>"".getTranslation('casinoicin102')."",
"81"=>"".getTranslation('casinoicin103')."",
"82"=>"".getTranslation('casinoicin104')."",
"83"=>"".getTranslation('casinoicin105')."",
"84"=>"".getTranslation('casinoicin106')."",
"85"=>"".getTranslation('casinoicin107')."",
"86"=>"".getTranslation('casinoicin108')."",
"279"=>"".getTranslation('casinoicin109')."",
"280"=>"".getTranslation('casinoicin110')."",
"281"=>"".getTranslation('casinoicin111')."",
"282"=>"".getTranslation('casinoicin112')."",
"283"=>"".getTranslation('casinoicin113')."",
"284"=>"".getTranslation('casinoicin114')."",
"285"=>"".getTranslation('casinoicin115')."",
"286"=>"".getTranslation('casinoicin116')."",
"287"=>"".getTranslation('casinoicin117')."",
"288"=>"".getTranslation('casinoicin118')."",
"289"=>"".getTranslation('casinoicin119')."",
"290"=>"".getTranslation('casinoicin120')."",
"291"=>"".getTranslation('casinoicin121')."",
"293"=>"".getTranslation('casinoicin122')."",
"294"=>"".getTranslation('casinoicin123')."",
"295"=>"".getTranslation('casinoicin124')."",
"296"=>"".getTranslation('casinoicin125')."",
"297"=>"".getTranslation('casinoicin126')."",
"298"=>"".getTranslation('casinoicin127')."",
"299"=>"".getTranslation('casinoicin128')."",
"300"=>"".getTranslation('casinoicin129')."",
"302"=>"".getTranslation('casinoicin130')."",
"303"=>"".getTranslation('casinoicin131')."",
"304"=>"".getTranslation('casinoicin132')."",
"305"=>"".getTranslation('casinoicin133')."",
"306"=>"".getTranslation('casinoicin134')."",
"307"=>"".getTranslation('casinoicin135')."",
"309"=>"".getTranslation('casinoicin136')."",
"311"=>"".getTranslation('casinoicin137')."",
"313"=>"".getTranslation('casinoicin138')."",
"314"=>"".getTranslation('casinoicin139')."",
"315"=>"".getTranslation('casinoicin140')."",
"316"=>"".getTranslation('casinoicin141')."",
"317"=>"".getTranslation('casinoicin142')."",
"318"=>"".getTranslation('casinoicin143')."",
"320"=>"".getTranslation('casinoicin144')."",
"321"=>"".getTranslation('casinoicin145')."",
"322"=>"".getTranslation('casinoicin146')."",
"323"=>"".getTranslation('casinoicin147')."",
"379"=>"".getTranslation('casinoicin148')."",
"378"=>"".getTranslation('casinoicin149')."",
"383"=>"".getTranslation('casinoicin150')."",
"380"=>"".getTranslation('casinoicin151')."",
"384"=>"".getTranslation('casinoicin152')."",
"385"=>"".getTranslation('casinoicin153')."",
"386"=>"".getTranslation('casinoicin154')."",
"390"=>"".getTranslation('casinoicin155')."",
"391"=>"".getTranslation('casinoicin156')."",
"392"=>"".getTranslation('casinoicin157')."",
"393"=>"".getTranslation('casinoicin158')."",
"394"=>"".getTranslation('casinoicin159')."",
"389"=>"".getTranslation('casinoicin160')."",
"387"=>"".getTranslation('casinoicin161')."",
"395"=>"".getTranslation('casinoicin162')."",
"396"=>"".getTranslation('casinoicin163')."",
"397"=>"".getTranslation('casinoicin164')."",
"398"=>"".getTranslation('casinoicin165')."",
"399"=>"".getTranslation('casinoicin166')."",
"400"=>"".getTranslation('casinoicin167')."",
"401"=>"".getTranslation('casinoicin168')."",
"402"=>"".getTranslation('casinoicin169')."",
"407"=>"".getTranslation('casinoicin170')."",
"406"=>"".getTranslation('casinoicin171')."",
"405"=>"".getTranslation('casinoicin172')."",
"404"=>"".getTranslation('casinoicin173')."",
"403"=>"".getTranslation('casinoicin174')."",
"1"=>"".getTranslation('casinoicin175')."",
"2"=>"".getTranslation('casinoicin176')."",
"5"=>"".getTranslation('casinoicin177')."",
"4"=>"".getTranslation('casinoicin178')."",
"3"=>"".getTranslation('casinoicin179')."",
"325"=>"".getTranslation('casinoicin180')."",
"326"=>"".getTranslation('casinoicin181')."",
"327"=>"".getTranslation('casinoicin182')."",
"330"=>"".getTranslation('casinoicin183')."",
"331"=>"".getTranslation('casinoicin184')."",
"332"=>"".getTranslation('casinoicin185')."",
"333"=>"".getTranslation('casinoicin186')."",
"334"=>"".getTranslation('casinoicin187')."",
"335"=>"".getTranslation('casinoicin188')."",
"324"=>"".getTranslation('casinoicin189')."",
"273"=>"".getTranslation('casinoicin190')."",
"274"=>"".getTranslation('casinoicin191')."",
"275"=>"".getTranslation('casinoicin192')."",
"276"=>"".getTranslation('casinoicin193')."",
"336"=>"".getTranslation('casinoicin194')."",
"338"=>"".getTranslation('casinoicin195')."",
"339"=>"".getTranslation('casinoicin196')."",
"340"=>"".getTranslation('casinoicin197')."",
"341"=>"".getTranslation('casinoicin198')."",
"342"=>"".getTranslation('casinoicin199')."",
"343"=>"".getTranslation('casinoicin200')."",
"344"=>"".getTranslation('casinoicin201')."",
"346"=>"".getTranslation('casinoicin202')."",
"347"=>"".getTranslation('casinoicin203')."",
"348"=>"".getTranslation('casinoicin204')."",
"349"=>"".getTranslation('casinoicin205')."",
"351"=>"".getTranslation('casinoicin206')."",
"352"=>"".getTranslation('casinoicin207')."",
"354"=>"".getTranslation('casinoicin208')."",
"355"=>"".getTranslation('casinoicin209')."",
"356"=>"".getTranslation('casinoicin210')."",
"357"=>"".getTranslation('casinoicin211')."",
"358"=>"".getTranslation('casinoicin212')."",
"359"=>"".getTranslation('casinoicin213')."",
"360"=>"".getTranslation('casinoicin214')."",
"361"=>"".getTranslation('casinoicin215')."",
"362"=>"".getTranslation('casinoicin216')."",
"363"=>"".getTranslation('casinoicin217')."",
"364"=>"".getTranslation('casinoicin218')."",
"365"=>"".getTranslation('casinoicin219')."",
"366"=>"".getTranslation('casinoicin220')."",
"367"=>"".getTranslation('casinoicin221')."",
"368"=>"".getTranslation('casinoicin222')."",
"369"=>"".getTranslation('casinoicin223')."",
"377"=>"".getTranslation('casinoicin224')."",
"376"=>"".getTranslation('casinoicin225')."",
"375"=>"".getTranslation('casinoicin226')."",
"374"=>"".getTranslation('casinoicin227')."",
"373"=>"".getTranslation('casinoicin228')."",
"372"=>"".getTranslation('casinoicin229')."",
"371"=>"".getTranslation('casinoicin230')."",
"370"=>"".getTranslation('casinoicin231')."",
"350"=>"".getTranslation('casinoicin232')."",
"312"=>"".getTranslation('casinoicin233')."",
"308"=>"".getTranslation('casinoicin234')."",
"382"=>"".getTranslation('casinoicin235')."",
"381"=>"".getTranslation('casinoicin236')."",
"447"=>"".getTranslation('casinoicin237')."",
"448"=>"".getTranslation('casinoicin238')."",
"449"=>"".getTranslation('casinoicin239')."",
"450"=>"".getTranslation('casinoicin240')."",
"451"=>"".getTranslation('casinoicin241')."",
"446"=>"".getTranslation('casinoicin242')."",
"459"=>"".getTranslation('casinoicin243')."",
"460"=>"".getTranslation('casinoicin244')."",
"461"=>"".getTranslation('casinoicin245')."",
"462"=>"".getTranslation('casinoicin246')."",
"463"=>"".getTranslation('casinoicin247')."",
"464"=>"".getTranslation('casinoicin248')."",
"465"=>"".getTranslation('casinoicin249')."",
"466"=>"".getTranslation('casinoicin250')."",
"467"=>"".getTranslation('casinoicin251')."",
"468"=>"".getTranslation('casinoicin252')."",
"469"=>"".getTranslation('casinoicin12')."",
"470"=>"".getTranslation('casinoicin11')."",
"471"=>"".getTranslation('casinoicin14')."",
"472"=>"".getTranslation('casinoicin15')."",
"473"=>"".getTranslation('casinoicin16')."",
"474"=>"".getTranslation('casinoicin17')."",
"475"=>"".getTranslation('casinoicin18')."",
"476"=>"".getTranslation('casinoicin19')."",
"477"=>"".getTranslation('casinoicin20')."",
"478"=>"".getTranslation('casinoicin21')."",
"479"=>"".getTranslation('casinoicin22')."",
"480"=>"".getTranslation('casinoicin23')."",
"483"=>"".getTranslation('casinoicin24')."",
"484"=>"".getTranslation('casinoicin25')."",
"485"=>"".getTranslation('casinoicin26')."",
"486"=>"".getTranslation('casinoicin27')."",
"487"=>"".getTranslation('casinoicin28')."",
"488"=>"".getTranslation('casinoicin29')."",
"489"=>"".getTranslation('casinoicin30')."",
"490"=>"".getTranslation('casinoicin31')."",
"491"=>"".getTranslation('casinoicin32')."",
"492"=>"".getTranslation('casinoicin33')."",
"493"=>"".getTranslation('casinoicin34')."",
"494"=>"".getTranslation('casinoicin35')."",
"495"=>"".getTranslation('casinoicin36')."",
"496"=>"".getTranslation('casinoicin37')."",
"497"=>"".getTranslation('casinoicin38')."",
"498"=>"".getTranslation('casinoicin39')."",
"499"=>"".getTranslation('casinoicin40')."",
"500"=>"".getTranslation('casinoicin253')."",
"501"=>"".getTranslation('casinoicin254')."",
"502"=>"".getTranslation('casinoicin255')."",
"503"=>"".getTranslation('casinoicin256')."",
"504"=>"".getTranslation('casinoicin257')."",
"505"=>"".getTranslation('casinoicin258')."",
"506"=>"".getTranslation('casinoicin259')."",
"507"=>"".getTranslation('casinoicin260')."",
"508"=>"".getTranslation('casinoicin261')."",
"509"=>"".getTranslation('casinoicin262')."",
"510"=>"".getTranslation('casinoicin263')."",
"511"=>"".getTranslation('casinoicin264')."",
"512"=>"".getTranslation('casinoicin265')."",
"513"=>"".getTranslation('casinoicin266')."",
"514"=>"".getTranslation('casinoicin267')."",
"515"=>"".getTranslation('casinoicin268')."",
"516"=>"".getTranslation('casinoicin269')."",
"517"=>"".getTranslation('casinoicin270')."",
"528"=>"".getTranslation('casinoicin271')."",
"529"=>"".getTranslation('casinoicin272')."",
"530"=>"".getTranslation('casinoicin13')."",
"531"=>"".getTranslation('casinoicin273')."",
"532"=>"".getTranslation('casinoicin274')."",
"533"=>"".getTranslation('casinoicin275')."",
"534"=>"".getTranslation('casinoicin276')."",
"535"=>"".getTranslation('casinoicin277')."",
"536"=>"".getTranslation('casinoicin278')."",
"537"=>"".getTranslation('casinoicin279')."",
"538"=>"".getTranslation('casinoicin280')."",
"539"=>"".getTranslation('casinoicin281')."",
"540"=>"".getTranslation('casinoicin282')."",
"541"=>"".getTranslation('casinoicin283')."",
"542"=>"".getTranslation('casinoicin284')."",
"543"=>"".getTranslation('casinoicin285')."",
"544"=>"".getTranslation('casinoicin286')."",
"545"=>"".getTranslation('casinoicin287')."",
"546"=>"".getTranslation('casinoicin288')."",
"547"=>"".getTranslation('casinoicin289')."",
"548"=>"".getTranslation('casinoicin290')."",
"549"=>"".getTranslation('casinoicin291')."",
"550"=>"".getTranslation('casinoicin292')."",
"551"=>"".getTranslation('casinoicin293')."",
"552"=>"".getTranslation('casinoicin294')."",
"518"=>"".getTranslation('casinoicin295')."",
"519"=>"".getTranslation('casinoicin296')."",
"520"=>"".getTranslation('casinoicin297')."",
"521"=>"".getTranslation('casinoicin298')."",
"522"=>"".getTranslation('casinoicin299')."",
"523"=>"".getTranslation('casinoicin300')."",
"524"=>"".getTranslation('casinoicin301')."",
"525"=>"".getTranslation('casinoicin302')."",
"526"=>"".getTranslation('casinoicin303')."",
"527"=>"".getTranslation('casinoicin304')."",
"553"=>"".getTranslation('casinoicin305')."",
"554"=>"".getTranslation('casinoicin306')."",
"555"=>"".getTranslation('casinoicin307')."",
"556"=>"".getTranslation('casinoicin308')."",
"557"=>"".getTranslation('casinoicin309')."",
"558"=>"".getTranslation('casinoicin310')."",
"559"=>"".getTranslation('casinoicin311')."",
"560"=>"".getTranslation('casinoicin312')."",
"561"=>"".getTranslation('casinoicin313')."",
"562"=>"".getTranslation('casinoicin314')."",
"563"=>"".getTranslation('casinoicin315')."",
"564"=>"".getTranslation('casinoicin316')."",
"565"=>"".getTranslation('casinoicin317')."",
"566"=>"".getTranslation('casinoicin318')."",
"567"=>"".getTranslation('casinoicin319')."",
"568"=>"".getTranslation('casinoicin320')."",
"569"=>"".getTranslation('casinoicin321')."",
"570"=>"".getTranslation('casinoicin322')."",
"571"=>"".getTranslation('casinoicin323')."",
"572"=>"".getTranslation('casinoicin324')."",
"573"=>"".getTranslation('casinoicin325')."",
"574"=>"".getTranslation('casinoicin326')."",
"575"=>"".getTranslation('casinoicin327')."",
"576"=>"".getTranslation('casinoicin328')."",
"577"=>"".getTranslation('casinoicin329')."",
"578"=>"".getTranslation('casinoicin330')."",
"579"=>"".getTranslation('casinoicin331')."",
"580"=>"".getTranslation('casinoicin332')."",
"581"=>"".getTranslation('casinoicin333')."",
"582"=>"".getTranslation('casinoicin334')."",
"583"=>"".getTranslation('casinoicin335')."",
"584"=>"".getTranslation('casinoicin336')."",
"585"=>"".getTranslation('casinoicin337')."",
"586"=>"".getTranslation('casinoicin338')."",
"587"=>"".getTranslation('casinoicin339')."",
"588"=>"".getTranslation('casinoicin340')."",
"589"=>"".getTranslation('casinoicin341')."",
"590"=>"".getTranslation('casinoicin342')."",
"591"=>"".getTranslation('casinoicin343')."",
"592"=>"".getTranslation('casinoicin14')."",
"593"=>"".getTranslation('casinoicin344')."",
"594"=>"".getTranslation('casinoicin345')."",
"595"=>"".getTranslation('casinoicin346')."",
"596"=>"".getTranslation('casinoicin347')."",
"597"=>"".getTranslation('casinoicin348')."",
"598"=>"".getTranslation('casinoicin349')."",
"599"=>"".getTranslation('casinoicin350')."",
"600"=>"".getTranslation('casinoicin351')."",
"601"=>"".getTranslation('casinoicin352')."",
"602"=>"".getTranslation('casinoicin353')."",
"603"=>"".getTranslation('casinoicin354')."",
"604"=>"".getTranslation('casinoicin355')."",
"605"=>"".getTranslation('casinoicin356')."",
"606"=>"".getTranslation('casinoicin357')."",
"607"=>"".getTranslation('casinoicin358')."",
"608"=>"".getTranslation('casinoicin359')."",
"609"=>"".getTranslation('casinoicin360')."",
"610"=>"".getTranslation('casinoicin361')."",
"611"=>"".getTranslation('casinoicin362')."",
"612"=>"".getTranslation('casinoicin363')."",
"613"=>"".getTranslation('casinoicin364')."",
"614"=>"".getTranslation('casinoicin365')."",
"615"=>"".getTranslation('casinoicin366')."",
"616"=>"".getTranslation('casinoicin367')."",
"617"=>"".getTranslation('casinoicin368')."",
"618"=>"".getTranslation('casinoicin369')."",
"619"=>"".getTranslation('casinoicin271')."",
"620"=>"".getTranslation('casinoicin272')."",
"622"=>"".getTranslation('casinoicin243')."",
"632"=>"".getTranslation('casinoicin370')."",
"633"=>"".getTranslation('casinoicin371')."",
"621"=>"".getTranslation('casinoicin372')."",
"623"=>"".getTranslation('casinoicin244')."",
"624"=>"".getTranslation('casinoicin245')."",
"625"=>"".getTranslation('casinoicin246')."",
"626"=>"".getTranslation('casinoicin247')."",
"627"=>"".getTranslation('casinoicin248')."",
"628"=>"".getTranslation('casinoicin249')."",
"629"=>"".getTranslation('casinoicin250')."",
"630"=>"".getTranslation('casinoicin251')."",
"631"=>"".getTranslation('casinoicin252').""
);

$json_translations_baccaratOdds = array(
"469"=>"Oyuncu",
"470"=>"Krupiye",
"471"=>"Berabere",
"472"=>"Oyuncu Per",
"473"=>"Kurpiyer Per",
"474"=>"İkisinden biri Per",
"475"=>"Kusursuz Per",
"476"=>"Küçük",
"477"=>"Büyük",
"478"=>"Daha fazla KIRMIZI kart gelecek",
"479"=>"Daha fazla SİYAH kart gelecek",
"480"=>"Eşit sayıda SİYAH ve KIRMIZI kart gelecek",
"483"=>"Bütün kartlar AYNI DESTE olacak",
"484"=>"OYUNCUYA gelen ilk iki kart AYNI DESTE olacak",
"485"=>"KRUPİYEYE gelen ilk iki kart AYNI DESTE olacak",
"486"=>"Oyuncu ve Krupiyenin sayıları toplamı 9.5 ALT",
"487"=>"Oyuncu ve Krupiyenin sayıları toplamı 9.5 \u00dcST",
"488"=>"Oyuncu ve Krupiyenin sayıları toplamı ÇİFT sayı olacak",
"489"=>"Oyuncu ve Krupiyenin sayıları toplamı TEK sayı olacak",
"490"=>"OYUNCU SAYILARI toplamı ÇİFT sayı olacak",
"491"=>"OYUNCU SAYILARI toplamı TEK sayı olacak",
"492"=>"KRUPİYE SAYILARI toplamı ÇİFT sayı olacak",
"493"=>"KRUPİYE SAYILARI toplamı TEK sayı olacak",
"494"=>"Sıradaki kart - kırmızı",
"495"=>"Sıradaki kart - siyah",
"496"=>"Sıradaki kart - maça",
"497"=>"Sıradaki kart - kupa",
"498"=>"Sıradaki kart - sinek",
"499"=>"Sıradaki kart - karo"
);

$json_translations_baccaratOdds_dil = array(
"469"=>"".getTranslation('casinoicin12')."",
"470"=>"".getTranslation('casinoicin11')."",
"471"=>"".getTranslation('casinoicin14')."",
"472"=>"".getTranslation('casinoicin15')."",
"473"=>"".getTranslation('casinoicin16')."",
"474"=>"".getTranslation('casinoicin17')."",
"475"=>"".getTranslation('casinoicin18')."",
"476"=>"".getTranslation('casinoicin19')."",
"477"=>"".getTranslation('casinoicin20')."",
"478"=>"".getTranslation('casinoicin21')."",
"479"=>"".getTranslation('casinoicin22')."",
"480"=>"".getTranslation('casinoicin23')."",
"483"=>"".getTranslation('casinoicin24')."",
"484"=>"".getTranslation('casinoicin25')."",
"485"=>"".getTranslation('casinoicin26')."",
"486"=>"".getTranslation('casinoicin27')."",
"487"=>"".getTranslation('casinoicin28')."",
"488"=>"".getTranslation('casinoicin29')."",
"489"=>"".getTranslation('casinoicin30')."",
"490"=>"".getTranslation('casinoicin31')."",
"491"=>"".getTranslation('casinoicin32')."",
"492"=>"".getTranslation('casinoicin33')."",
"493"=>"".getTranslation('casinoicin34')."",
"494"=>"".getTranslation('casinoicin35')."",
"495"=>"".getTranslation('casinoicin36')."",
"496"=>"".getTranslation('casinoicin37')."",
"497"=>"".getTranslation('casinoicin38')."",
"498"=>"".getTranslation('casinoicin39')."",
"499"=>"".getTranslation('casinoicin40').""
);

$json_translations_baccaratWinners = array(
"player"=>"Oyuncu",
"banker"=>"Krupiye",
"tie"=>"Beraberlik"
);

$json_translations_baccaratWinners_dil = array(
"player"=>"".getTranslation('casinoicin12')."",
"banker"=>"".getTranslation('casinoicin11')."",
"tie"=>"".getTranslation('casinoicin14').""
);

$json_translations_warWinners = array(
"dealer"=>"Krupiye",
"player"=>"Oyuncu",
"war"=>"Savaş"
);

$json_translations_warWinners_dil = array(
"dealer"=>"".getTranslation('casinoicin11')."",
"player"=>"".getTranslation('casinoicin12')."",
"war"=>"".getTranslation('casinoicin13').""
);

$json_translations_pokerComboOdds = array(
"1"=>"Yüksek Kart",
"2"=>"Per",
"3"=>"Döper",
"4"=>"Üçlü",
"5"=>"Kent",
"6"=>"Floş",
"7"=>"Ful",
"8"=>"Kare",
"9"=>"Sıralı Floş",
"10"=>"Royal Floş"
);

$json_translations_pokerComboOdds_dil = array(
"1"=>"".getTranslation('casinoicin1')."",
"2"=>"".getTranslation('casinoicin2')."",
"3"=>"".getTranslation('casinoicin3')."",
"4"=>"".getTranslation('casinoicin4')."",
"5"=>"".getTranslation('casinoicin5')."",
"6"=>"".getTranslation('casinoicin6')."",
"7"=>"".getTranslation('casinoicin7')."",
"8"=>"".getTranslation('casinoicin8')."",
"9"=>"".getTranslation('casinoicin9')."",
"10"=>"".getTranslation('casinoicin10').""
);

$json_translations_errors = array(
"TOO_MANY_REQUESTS"=>"TOO MANY REQUESTS.",
"ROUND_IS_NOT_OPEN_FOR_BETTING"=>"PLEASE WAIT FOR BETTING ROUND TO START",
"ODDS_NOT_AVAILABLE"=>"ODDS ARE NOT AVAILABLE",
"ODDS_VALUE_IS_INCORRECT"=>"INCORRECT ODDS VALUE",
"PLAYER_ALREADY_HAS_ACTIVE_STREAK"=>"ONLY ONE BET PER PLAYER IS ALLOWED",
"BET_AMOUNT_DIFFERS_AFTER_ROUNDING"=>"STAKE DIFFERS AFTER ROUNDING",
"MIN_BET_AMOUNT_NOT_REACHED"=>"CAN NOT BET LESS THAN MINIMUM STAKE",
"BET_GREATER_THAN_MAX_BET_AMOUNT"=>"STAKE EXCEEDS MAXIMUM STAKE LIMIT",
"POTENTIAL_WINNING_GREATER_THAN_LIMIT"=>"POTENTIAL WINNING EXCEEDS MAXIMUM WINNING LIMIT",
"PAY_IN_PERSISTING_FAILED"=>"BET NOT ACCEPTED. TRY AGAIN",
"transaction_failed_bet_timeout"=>"TRANSACTION FAILED BET TIMEOUT",
"transaction_failed_bet_not_accepted"=>"TRANSACTION FAILED BET NOT ACCEPTED",
"STREAK_IS_CALCULATING"=>"CALCULATING RESULTS",
"CHANGING_ODDS_IS_FORBIDDEN"=>"CAN NOT CHANGE THE OUTCOME",
"ROUND_IS_SKIPPED"=>"CALCULATING RESULTS",
"PLACE_BET_PERSISTING_FAILED"=>"BET WAS NOT ACCEPTED. TRY AGAIN",
"NO_ACTIVE_STREAK"=>"NOTHING TO CASH OUT",
"PAYOUT_RESTRICTED_DURING_CARD_DEALING"=>"CASH OUT IS NOT AVAILABLE",
"STREAK_IS_PROCESSING"=>"CALCULATING CASH OUT",
"PAYOUT_OF_NEW_STREAK_IS_NOT_ALLOWED"=>"CASH OUT IS NOT AVAILABLE",
"This field is missing."=>" value is missing.",
"This value should not be null."=>" value should not be null.",
"This value should be of type int."=>" value should be of type int.",
"This value should be of type string."=>" value should be of type string.",
"[runId]"=>"Run id",
"[roundId]"=>"Round id",
"[amount]"=>"Miktar",
"[oddId]"=>"Odd id",
"[oddValue]"=>"Odd Value"
);

$json_translations = array(
"strings"=>$json_translations_strings,
"notifications"=>$json_translations_notifications,
"rounds"=>$json_translations_rounds,
"statuses"=>$json_translations_statuses,
"favorites"=>$json_translations_favorites,
"resultsAbbr"=>$json_translations_resultsAbbr,
"gameNames"=>$json_translations_gameNames,
"oddGroups"=>$json_translations_oddGroups,
"oddGroups_dil"=>$json_translations_oddGroups_dil,
"odds"=>$json_translations_odds,
"odds_dil"=>$json_translations_odds_dil,
"baccaratOdds"=>$json_translations_baccaratOdds,
"baccaratOdds_dil"=>$json_translations_baccaratOdds_dil,
"baccaratWinners"=>$json_translations_baccaratWinners,
"baccaratWinners_dil"=>$json_translations_baccaratWinners_dil,
"warWinners"=>$json_translations_warWinners,
"warWinners_dil"=>$json_translations_warWinners_dil,
"pokerComboOdds"=>$json_translations_pokerComboOdds,
"pokerComboOdds_dil"=>$json_translations_pokerComboOdds_dil,
"errors"=>$json_translations_errors
);

$json = array(
"status"=>"success",
"translations"=>$json_translations
);

echo json_encode($json);

}