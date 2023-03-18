<?php
session_start();
include "../db.php";
header('Content-type: application/json');

$getle = $_GET['cmd'];

/////////////////////////////// KuponSonucla ///////////////////////////////////////

if($getle=="KuponSonucla"){

function rulet_sonucla($roundid,$sayi,$sonuc,$kid) {

$sayilari_bol = explode(",",$sayi);

if($roundid=="single") {
	if($sayi==$sonuc) { kazanma(2,$kid); } else { kazanma(3,$kid); }
} else if($roundid=="multi2") {
	if($sayilari_bol[0]==$sonuc || $sayilari_bol[1]==$sonuc) { kazanma(2,$kid); } else { kazanma(3,$kid); }
} else if($roundid=="multi4") {
	if($sayilari_bol[0]==$sonuc || $sayilari_bol[1]==$sonuc || $sayilari_bol[2]==$sonuc || $sayilari_bol[3]==$sonuc) { kazanma(2,$kid); } else { kazanma(3,$kid); }
} else if($roundid=="line1") {
	if($sonuc=="1" || $sonuc=="4" || $sonuc=="7" || $sonuc=="10" || $sonuc=="13" || $sonuc=="16" || $sonuc=="19" || $sonuc=="22" || $sonuc=="25" || $sonuc=="28" || $sonuc=="31" || $sonuc=="34") { kazanma(2,$kid); } else { kazanma(3,$kid); }
} else if($roundid=="line2") {
	if($sonuc=="2" || $sonuc=="5" || $sonuc=="8" || $sonuc=="11" || $sonuc=="14" || $sonuc=="17" || $sonuc=="20" || $sonuc=="23" || $sonuc=="26" || $sonuc=="29" || $sonuc=="32" || $sonuc=="35") { kazanma(2,$kid); } else { kazanma(3,$kid); }
} else if($roundid=="line3") {
	if($sonuc=="3" || $sonuc=="6" || $sonuc=="9" || $sonuc=="12" || $sonuc=="15" || $sonuc=="18" || $sonuc=="21" || $sonuc=="24" || $sonuc=="27" || $sonuc=="30" || $sonuc=="33" || $sonuc=="36") { kazanma(2,$kid); } else { kazanma(3,$kid); }
} else if($roundid=="1st12") {
	if($sonuc=="1" || $sonuc=="2" || $sonuc=="3" || $sonuc=="4" || $sonuc=="5" || $sonuc=="6" || $sonuc=="7" || $sonuc=="8" || $sonuc=="9" || $sonuc=="10" || $sonuc=="11" || $sonuc=="12") { kazanma(2,$kid); } else { kazanma(3,$kid); }
} else if($roundid=="2nd12") {
	if($sonuc=="13" || $sonuc=="14" || $sonuc=="15" || $sonuc=="16" || $sonuc=="17" || $sonuc=="18" || $sonuc=="19" || $sonuc=="20" || $sonuc=="21" || $sonuc=="22" || $sonuc=="23" || $sonuc=="24") { kazanma(2,$kid); } else { kazanma(3,$kid); }
} else if($roundid=="3rd12") {
	if($sonuc=="25" || $sonuc=="26" || $sonuc=="27" || $sonuc=="28" || $sonuc=="29" || $sonuc=="30" || $sonuc=="31" || $sonuc=="32" || $sonuc=="33" || $sonuc=="34" || $sonuc=="35" || $sonuc=="36") { kazanma(2,$kid); } else { kazanma(3,$kid); }
} else if($roundid=="even") {
	if($sonuc=="2" || $sonuc=="4" || $sonuc=="6" || $sonuc=="8" || $sonuc=="10" || $sonuc=="12" || $sonuc=="14" || $sonuc=="16" || $sonuc=="18" || $sonuc=="20" || $sonuc=="22" || $sonuc=="24" || $sonuc=="26" || $sonuc=="28" || $sonuc=="30" || $sonuc=="32" || $sonuc=="34" || $sonuc=="36") { kazanma(2,$kid); } else { kazanma(3,$kid); }
} else if($roundid=="odd") {
	if($sonuc=="1" || $sonuc=="3" || $sonuc=="5" || $sonuc=="7" || $sonuc=="9" || $sonuc=="11" || $sonuc=="13" || $sonuc=="15" || $sonuc=="17" || $sonuc=="19" || $sonuc=="21" || $sonuc=="23" || $sonuc=="25" || $sonuc=="27" || $sonuc=="29" || $sonuc=="31" || $sonuc=="33" || $sonuc=="35") { kazanma(2,$kid); } else { kazanma(3,$kid); }
} else if($roundid=="red") {
	if($sonuc=="1" || $sonuc=="3" || $sonuc=="5" || $sonuc=="7" || $sonuc=="9" || $sonuc=="12" || $sonuc=="14" || $sonuc=="16" || $sonuc=="18" || $sonuc=="19" || $sonuc=="21" || $sonuc=="23" || $sonuc=="25" || $sonuc=="27" || $sonuc=="30" || $sonuc=="32" || $sonuc=="34" || $sonuc=="36") { kazanma(2,$kid); } else { kazanma(3,$kid); }
} else if($roundid=="black") {
	if($sonuc=="2" || $sonuc=="4" || $sonuc=="6" || $sonuc=="8" || $sonuc=="10" || $sonuc=="11" || $sonuc=="13" || $sonuc=="15" || $sonuc=="17" || $sonuc=="20" || $sonuc=="22" || $sonuc=="24" || $sonuc=="26" || $sonuc=="28" || $sonuc=="29" || $sonuc=="31" || $sonuc=="33" || $sonuc=="35") { kazanma(2,$kid); } else { kazanma(3,$kid); }
} else if($roundid=="1to18") {
	if($sonuc=="1" || $sonuc=="2" || $sonuc=="3" || $sonuc=="4" || $sonuc=="5" || $sonuc=="6" || $sonuc=="7" || $sonuc=="8" || $sonuc=="9" || $sonuc=="10" || $sonuc=="11" || $sonuc=="12" || $sonuc=="13" || $sonuc=="14" || $sonuc=="15" || $sonuc=="16" || $sonuc=="17" || $sonuc=="18") { kazanma(2,$kid); } else { kazanma(3,$kid); }
} else if($roundid=="19to36") {
	if($sonuc=="19" || $sonuc=="20" || $sonuc=="21" || $sonuc=="22" || $sonuc=="23" || $sonuc=="24" || $sonuc=="25" || $sonuc=="26" || $sonuc=="27" || $sonuc=="28" || $sonuc=="29" || $sonuc=="30" || $sonuc=="31" || $sonuc=="32" || $sonuc=="33" || $sonuc=="34" || $sonuc=="35" || $sonuc=="36") { kazanma(2,$kid); } else { kazanma(3,$kid); }
}

}

function rulet_sonucla2($roundid,$sayi,$sonuc,$kid) {

$sayilari_bol = explode(",",$sayi);

if($roundid=="single") {
	if($sayi==$sonuc) { kazanma2(2,$kid); } else { kazanma2(3,$kid); }
} else if($roundid=="multi2") {
	if($sayilari_bol[0]==$sonuc || $sayilari_bol[1]==$sonuc) { kazanma2(2,$kid); } else { kazanma2(3,$kid); }
} else if($roundid=="multi4") {
	if($sayilari_bol[0]==$sonuc || $sayilari_bol[1]==$sonuc || $sayilari_bol[2]==$sonuc || $sayilari_bol[3]==$sonuc) { kazanma2(2,$kid); } else { kazanma2(3,$kid); }
} else if($roundid=="line1") {
	if($sonuc=="1" || $sonuc=="4" || $sonuc=="7" || $sonuc=="10" || $sonuc=="13" || $sonuc=="16" || $sonuc=="19" || $sonuc=="22" || $sonuc=="25" || $sonuc=="28" || $sonuc=="31" || $sonuc=="34") { kazanma2(2,$kid); } else { kazanma2(3,$kid); }
} else if($roundid=="line2") {
	if($sonuc=="2" || $sonuc=="5" || $sonuc=="8" || $sonuc=="11" || $sonuc=="14" || $sonuc=="17" || $sonuc=="20" || $sonuc=="23" || $sonuc=="26" || $sonuc=="29" || $sonuc=="32" || $sonuc=="35") { kazanma2(2,$kid); } else { kazanma2(3,$kid); }
} else if($roundid=="line3") {
	if($sonuc=="3" || $sonuc=="6" || $sonuc=="9" || $sonuc=="12" || $sonuc=="15" || $sonuc=="18" || $sonuc=="21" || $sonuc=="24" || $sonuc=="27" || $sonuc=="30" || $sonuc=="33" || $sonuc=="36") { kazanma2(2,$kid); } else { kazanma2(3,$kid); }
} else if($roundid=="1st12") {
	if($sonuc=="1" || $sonuc=="2" || $sonuc=="3" || $sonuc=="4" || $sonuc=="5" || $sonuc=="6" || $sonuc=="7" || $sonuc=="8" || $sonuc=="9" || $sonuc=="10" || $sonuc=="11" || $sonuc=="12") { kazanma2(2,$kid); } else { kazanma2(3,$kid); }
} else if($roundid=="2nd12") {
	if($sonuc=="13" || $sonuc=="14" || $sonuc=="15" || $sonuc=="16" || $sonuc=="17" || $sonuc=="18" || $sonuc=="19" || $sonuc=="20" || $sonuc=="21" || $sonuc=="22" || $sonuc=="23" || $sonuc=="24") { kazanma2(2,$kid); } else { kazanma2(3,$kid); }
} else if($roundid=="3rd12") {
	if($sonuc=="25" || $sonuc=="26" || $sonuc=="27" || $sonuc=="28" || $sonuc=="29" || $sonuc=="30" || $sonuc=="31" || $sonuc=="32" || $sonuc=="33" || $sonuc=="34" || $sonuc=="35" || $sonuc=="36") { kazanma2(2,$kid); } else { kazanma2(3,$kid); }
} else if($roundid=="even") {
	if($sonuc=="2" || $sonuc=="4" || $sonuc=="6" || $sonuc=="8" || $sonuc=="10" || $sonuc=="12" || $sonuc=="14" || $sonuc=="16" || $sonuc=="18" || $sonuc=="20" || $sonuc=="22" || $sonuc=="24" || $sonuc=="26" || $sonuc=="28" || $sonuc=="30" || $sonuc=="32" || $sonuc=="34" || $sonuc=="36") { kazanma2(2,$kid); } else { kazanma2(3,$kid); }
} else if($roundid=="odd") {
	if($sonuc=="1" || $sonuc=="3" || $sonuc=="5" || $sonuc=="7" || $sonuc=="9" || $sonuc=="11" || $sonuc=="13" || $sonuc=="15" || $sonuc=="17" || $sonuc=="19" || $sonuc=="21" || $sonuc=="23" || $sonuc=="25" || $sonuc=="27" || $sonuc=="29" || $sonuc=="31" || $sonuc=="33" || $sonuc=="35") { kazanma2(2,$kid); } else { kazanma2(3,$kid); }
} else if($roundid=="red") {
	if($sonuc=="1" || $sonuc=="3" || $sonuc=="5" || $sonuc=="7" || $sonuc=="9" || $sonuc=="12" || $sonuc=="14" || $sonuc=="16" || $sonuc=="18" || $sonuc=="19" || $sonuc=="21" || $sonuc=="23" || $sonuc=="25" || $sonuc=="27" || $sonuc=="30" || $sonuc=="32" || $sonuc=="34" || $sonuc=="36") { kazanma2(2,$kid); } else { kazanma2(3,$kid); }
} else if($roundid=="black") {
	if($sonuc=="2" || $sonuc=="4" || $sonuc=="6" || $sonuc=="8" || $sonuc=="10" || $sonuc=="11" || $sonuc=="13" || $sonuc=="15" || $sonuc=="17" || $sonuc=="20" || $sonuc=="22" || $sonuc=="24" || $sonuc=="26" || $sonuc=="28" || $sonuc=="29" || $sonuc=="31" || $sonuc=="33" || $sonuc=="35") { kazanma2(2,$kid); } else { kazanma2(3,$kid); }
} else if($roundid=="1to18") {
	if($sonuc=="1" || $sonuc=="2" || $sonuc=="3" || $sonuc=="4" || $sonuc=="5" || $sonuc=="6" || $sonuc=="7" || $sonuc=="8" || $sonuc=="9" || $sonuc=="10" || $sonuc=="11" || $sonuc=="12" || $sonuc=="13" || $sonuc=="14" || $sonuc=="15" || $sonuc=="16" || $sonuc=="17" || $sonuc=="18") { kazanma2(2,$kid); } else { kazanma2(3,$kid); }
} else if($roundid=="19to36") {
	if($sonuc=="19" || $sonuc=="20" || $sonuc=="21" || $sonuc=="22" || $sonuc=="23" || $sonuc=="24" || $sonuc=="25" || $sonuc=="26" || $sonuc=="27" || $sonuc=="28" || $sonuc=="29" || $sonuc=="30" || $sonuc=="31" || $sonuc=="32" || $sonuc=="33" || $sonuc=="34" || $sonuc=="35" || $sonuc=="36") { kazanma2(2,$kid); } else { kazanma2(3,$kid); }
}

}

function kazanma($durum,$kid) {
sed_sql_query("update kupon_ic_rulet set kazanma='$durum' where id='$kid' and rulet_tip='1'");
}

function kazanma2($durum,$kid) {
sed_sql_query("update kupon_ic_rulet set kazanma='$durum' where id='$kid' and rulet_tip='2'");
}

$sor_rulet = sed_sql_query("select kupon_id,roundid,sayi,sonuc,id from kupon_ic_rulet where rulet_tip='1' and kazanma='1' and sonuc!='' and sonuczamani!=''");
while($row_rulet=sed_sql_fetcharray($sor_rulet)){
echo "RULET - $row_rulet[kupon_id] - Nolu Kupon Sonuçlandırıldı. *** ";
rulet_sonucla($row_rulet['roundid'],$row_rulet['sayi'],$row_rulet['sonuc'],$row_rulet['id']);
}

$sor_rulet2 = sed_sql_query("select kupon_id,roundid,sayi,sonuc,id from kupon_ic_rulet where rulet_tip='2' and kazanma='1' and sonuc!='' and sonuczamani!=''");
while($row_rulet2=sed_sql_fetcharray($sor_rulet2)){
echo "RULET 2 - $row_rulet2[kupon_id] - Nolu Kupon Sonuçlandırıldı. *** ";
rulet_sonucla2($row_rulet2['roundid'],$row_rulet2['sayi'],$row_rulet2['sonuc'],$row_rulet2['id']);
}

}

/////////////////////////////// KuponSonucGir ///////////////////////////////////////

if($getle=="KuponSonucGir"){

function bilgigetir() {
$url='https://betwingo.xyz/api/rulet_sonuclar.php?cmd=Rulet';
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, "Firefox/3.6.8");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_URL, $url);
$gelenveri = curl_exec($ch);
return $gelenveri;
}

$sonucbilgigetir = bilgigetir();
$jsonGet = json_decode($sonucbilgigetir,1);
$all = $jsonGet["veriler"];

foreach($all as $inner){

$runid = $inner['runid'];
$sonuc = $inner['sonuc'];
$sonuczamani_ver = date("H:i");

$bilgile = bilgi("select * from kupon_ic_rulet where rulet_tip='1' and oddid='$runid' and sonuc='' and sonuczamani='' and kazanma='1'");
if($bilgile['id'] > 0){
sed_sql_query("UPDATE kupon_ic_rulet SET sonuc = '".$sonuc."',sonuczamani = '".$sonuczamani_ver."' WHERE oddid='".$runid."' and rulet_tip='1'");
}

}

function bilgigetir2() {
$url='https://betwingo.xyz/api/rulet_sonuclar.php?cmd=Rulet2';
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, "Firefox/3.6.8");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_URL, $url);
$gelenveri = curl_exec($ch);
return $gelenveri;
}

$sonucbilgigetir2 = bilgigetir2();
$jsonGet2 = json_decode($sonucbilgigetir2,1);
$all2 = $jsonGet2["veriler"];

foreach($all2 as $inner2){

$runid2 = $inner2['runid'];
$sonuc2 = $inner2['sonuc'];
$sonuczamani_ver2 = date("H:i");

$bilgile = bilgi("select * from kupon_ic_rulet where rulet_tip='2' and oddid='$runid2' and sonuc='' and sonuczamani='' and kazanma='1'");
if($bilgile['id'] > 0){
sed_sql_query("UPDATE kupon_ic_rulet SET sonuc = '".$sonuc2."',sonuczamani = '".$sonuczamani_ver2."' WHERE oddid='".$runid2."' and rulet_tip='2'");
}

}

}

/////////////////////////////// KuponTekrarla ///////////////////////////////////////

if($getle=="KuponTekrarla"){

$suan = time();

$sonkupon = bilgi("select * from kuponlar where session_id='$session_id' and casino='2' order by id desc limit 1");

$sor = sed_sql_query("select * from kupon_ic_rulet where kupon_id='$sonkupon[id]' and rulet_tip='1'");

while($row=sed_sql_fetcharray($sor)) {

sed_sql_query("insert into kupon_rulet (id,session_id,gameid,roundid,grupid,oran,secenek,sayi,rulet_tip,ilkgiris) values 

('','$session_id','$row[gameid]','$row[roundid]','$row[grupid]','$row[oran]','$row[secenek]','$row[sayi]','1','$suan')");

}

$kontrol_kupon = sed_sql_query("select * from kupon_rulet where session_id='$session_id' and rulet_tip='1' order by id");

if(sed_sql_numrows($kontrol_kupon)<1) {

$json_coupon = array("total_odd"=>0,"fold"=>"5","amount"=>"5","maxgain"=>1,"ctype"=>"single","system"=>false,"category"=>6,"mbs"=>1,"kolon"=>1,"bets"=>false);

} else {

$toplamoran = 0;
$toplamyatan = 0;
while($row=sed_sql_fetcharray($kontrol_kupon)) {
$toplamoran = $toplamoran+$row['oran'];
$toplamyatan = $toplamyatan+$row['grupid'];

$bolunenler = explode(",", $row['sayi']);
$sayi = count($bolunenler);

if($row['secenek']=="zero"){
	$reasult_history[$row['id']] = 0;
} else if($row['secenek']=="" && $sayi=="1"){
	$reasult_history[$row['id']] = $row['sayi'];
} else {
	for($i=0; $i < $sayi; $i++){ $reasult_history[$row['id']][] = $bolunenler[$i]; }
}

$oran_bol = explode(".",$row['oran']);

$json_bets_2[$row['gameid']] = array("match_id"=>0,"bet_type"=>$row['roundid'],"bet"=>$reasult_history[$row['id']],"odd"=>$oran_bol[0],"stake"=>$row['grupid']);

}


$json_coupon = array("total_odd"=>nf($toplamoran),"fold"=>1,"amount"=>$toplamyatan,"maxgain"=>1,"ctype"=>"single","system"=>false,"category"=>6,"mbs"=>1,"kolon"=>1,"bets"=>$json_bets_2,"max_gain"=>$toplamoran);

}

$json = array("status"=>"success","coupon"=>$json_coupon);

echo json_encode($json);

}

/////////////////////////////// KuponTemizle ///////////////////////////////////////

if($getle=="KuponTemizle"){

$kontrol = sed_sql_query("select * from kupon_rulet where session_id='$session_id' and rulet_tip='1'");

if(sed_sql_numrows($kontrol)<1) {

$json = array("status"=>"success","html"=>"\n\n<div class=\"panel fastbet-panel\">\n\t<div class=\"panel-head\">\n\t\t<div class=\"panel-title\"><h3><b>H\u0131zl\u0131 Giri\u015f<\/b><\/h3><\/div>\n\t<\/div>\n\t<div class=\"panel-content p-0\">\n\t\t<form id=\"fastbet\">\n\t\t\t<div class=\"fast-bet\">\n\t\t\t\t<div class=\"fast-col\">\n\t\t\t\t\t<div class=\"input-group\">\n\t\t\t\t\t\t<div class=\"input-group-prepend\"><div class=\"input-group-text\">TAKIM\/KOD<\/div><\/div>\n\t\t\t\t\t\t<input type=\"text\" name=\"code\" class=\"form-control form-control-sm\" value=\"\">\n\t\t\t\t\t<\/div>\n\t\t\t\t<\/div>\n\t\t\t\t<div class=\"fast-col\">\n\t\t\t\t\t<div class=\"input-group\">\n\t\t\t\t\t\t<div class=\"input-group-prepend\"><div class=\"input-group-text\">SE\u00c7\u0130M<\/div><\/div>\n\t\t\t\t\t\t<input type=\"text\" name=\"secim\" class=\"form-control form-control-sm\" value=\"\">\n\t\t\t\t\t<\/div>\n\t\t\t\t<\/div>\n\t\t\t\t<div class=\"fast-col\">\n\t\t\t\t<\/div>\n\t\t\t<\/div>\n\t\t\t<input type=\"hidden\" name=\"matchid\" id=\"fast_matchid\" value=\"0\" \/>\n\t\t<\/form>\n\t\t<div id=\"fastbet-matches\" class=\"d-none\"><\/div>\n\t<\/div>\n<\/div>\n\n\n<div class=\"coupon-tabs\">\n\t<div class=\"coupon-tab active\" data-target=\"coupon\">KUPON YAP<\/div>\n\t<div class=\"coupon-tab\" data-target=\"mycoupons\">KUPONLARIM<\/div>\n<\/div>\n\n<div class=\"coupon-tab-content\" data-id=\"coupon\">\n\n\t<div class=\"betting-slip-content\" data-type=\"combo\" data-detail=\"0\">\n\t\t<div class=\"slip-wait\"><strong><span>10<\/span><\/strong><span style=\"text-align: center;\">L\u00fctfen bekleyin, kuponunuz oynan\u0131yor...<\/span><\/div>\n\t\t\t    <div class=\"coupon-empty\">\n\t        <i class=\"fal fa-file\"><\/i>\n\t        <strong>Kuponunuz bo\u015f.<\/strong>\n\t        <span class=\"text-muted\">Ma\u00e7 eklemek i\u00e7in oranlara t\u0131klay\u0131n\u0131z.<\/span>\n\t\t\t<a href=\"#\" class=\"load-prev-coupon coupon-load coupon-back\" data-before=\"1\">Son Kupon<\/a>\n\t    <\/div>\n\t\t<\/div>\n<\/div>\n\n<div class=\"coupon-tab-content\" data-id=\"mycoupons\">\n<\/div>\n","in_coupon"=>[]);

} else {

sed_sql_query("delete from kupon_rulet where session_id='".$session_id."' and rulet_tip='1'");

$json_coupon = array("total_odd"=>0,"fold"=>"5","amount"=>"5","maxgain"=>1,"ctype"=>"single","system"=>false,"category"=>6,"mbs"=>1,"kolon"=>1,"bets"=>false);

$json = array("status"=>"success","coupon"=>$json_coupon);

}

echo json_encode($json);

}

/////////////////////////////// KuponSil ///////////////////////////////////////

if($getle=="KuponSil"){

$key = $_POST['key'];

sed_sql_query("delete from kupon_rulet where session_id='".$session_id."' and rulet_tip='1' and gameid='".$key."'");

$kontrol2 = sed_sql_query("select * from kupon_rulet where session_id='$session_id' and rulet_tip='1'");

if(sed_sql_numrows($kontrol2)<1) {

$json_coupon = array("total_odd"=>0,"fold"=>"5","amount"=>"5","maxgain"=>1,"ctype"=>"single","system"=>false,"category"=>6,"mbs"=>1,"kolon"=>1,"bets"=>false);

} else {

$toplamoran = 0;
$toplamyatan = 0;
while($row=sed_sql_fetcharray($kontrol2)) {
$toplamoran = $toplamoran+$row['oran'];
$toplamyatan = $toplamyatan+$row['grupid'];

$bolunenler = explode(",", $row['sayi']);
$sayi = count($bolunenler);

if($row['secenek']=="zero"){
	$reasult_history[$row['id']] = 0;
} else if($row['secenek']=="" && $sayi=="1"){
	$reasult_history[$row['id']] = $row['sayi'];
} else {
	for($i=0; $i < $sayi; $i++){ $reasult_history[$row['id']][] = $bolunenler[$i]; }
}

$oran_bol = explode(".",$row['oran']);

$json_bets_2[$row['gameid']] = array("match_id"=>0,"bet_type"=>$row['roundid'],"bet"=>$reasult_history[$row['id']],"odd"=>$oran_bol[0],"stake"=>$row['grupid']);

}


$json_coupon = array("total_odd"=>nf($toplamoran),"fold"=>1,"amount"=>$toplamyatan,"maxgain"=>1,"ctype"=>"single","system"=>false,"category"=>6,"mbs"=>1,"kolon"=>1,"bets"=>$json_bets_2,"max_gain"=>$toplamoran);

}

$json = array("status"=>"success","message"=>"Bahis silindi.","coupon"=>$json_coupon);

echo json_encode($json);

}

/////////////////////////////// KuponEkle ///////////////////////////////////////

if($getle=="KuponEkle"){

$items = $_POST['selection'];
$tiklanansayi = $_POST['token'];

if($_POST && $items!="false"){

if($items=="zero" || $items=="line1" || $items=="line2" || $items=="line3" || $items=="1st12" || $items=="2nd12" || $items=="3rd12" || $items=="1to18" || $items=="even" || $items=="red" || $items=="black" || $items=="odd" || $items=="19to36"){

$verigir = $items;

if($items=="zero"){
$sayi = "0";
$oran = "36.00";
} else if($items=="line1"){
$sayi = "1,4,7,10,13,16,19,22,25,28,31,34";
$oran = "3.00";
} else if($items=="line2"){
$sayi = "2,5,8,11,14,17,20,23,26,29,32,35";
$oran = "3.00";
} else if($items=="line3"){
$sayi = "3,6,9,12,15,18,21,24,27,30,33,36";
$oran = "3.00";
} else if($items=="1st12"){
$sayi = "1,2,3,4,5,6,7,8,9,10,11,12";
$oran = "3.00";
} else if($items=="2nd12"){
$sayi = "13,14,15,16,17,18,19,20,21,22,23,24";
$oran = "3.00";
} else if($items=="3rd12"){
$sayi = "25,26,27,28,29,30,31,32,33,34,35,36";
$oran = "3.00";
} else if($items=="1to18"){
$sayi = "1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18";
$oran = "2.00";
} else if($items=="even"){
$sayi = "2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36";
$oran = "2.00";
} else if($items=="red"){
$sayi = "1,3,5,7,9,12,14,16,18,19,21,23,25,27,30,32,34,36";
$oran = "2.00";
} else if($items=="black"){
$sayi = "2,4,6,8,10,11,13,15,17,20,22,24,26,28,29,31,33,35";
$oran = "2.00";
} else if($items=="odd"){
$sayi = "1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35";
$oran = "2.00";
} else if($items=="19to36"){
$sayi = "19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36";
$oran = "2.00";
}

} else {
$toplam_sayi = 0;
foreach($items as $value){ $ekle .= "$value,"; $toplam_sayi++; }
$verigir = "";
$verigir2 = substr($ekle,0,-1);
$sayi = $verigir2;
if($toplam_sayi==4){
$oran = "9.00";
} else if($toplam_sayi==2){
$oran = "18.00";
} else {
$oran = "36.00";
}

}

$bolunenler = explode(",", $sayi);
$sayi2 = count($bolunenler);

if($verigir=="" && $sayi2=="1"){
	$isim_ver = "single".$bolunenler[0];
	$isim_ver2 = "single";
} else if($verigir=="zero"){
	$isim_ver = "zero";
	$isim_ver2 = "single";
} else if($verigir=="" && $sayi2=="4"){
	$isim_ver = "dortlu-".$bolunenler[0];
	$isim_ver2 = "multi4";
} else if($verigir=="" && $sayi2=="2"){
	if($bolunenler[0]==1 && $bolunenler[1]==2){
	$isim_ver = "dikey-".$bolunenler[0];
	$isim_ver2 = "multi2";
	} else if($bolunenler[0]==2 && $bolunenler[1]==3){
	$isim_ver = "dikey-".$bolunenler[0];
	$isim_ver2 = "multi2";
	} else if($bolunenler[0]==4 && $bolunenler[1]==5){
	$isim_ver = "dikey-".$bolunenler[0];
	$isim_ver2 = "multi2";
	} else if($bolunenler[0]==5 && $bolunenler[1]==6){
	$isim_ver = "dikey-".$bolunenler[0];
	$isim_ver2 = "multi2";
	} else if($bolunenler[0]==7 && $bolunenler[1]==8){
	$isim_ver = "dikey-".$bolunenler[0];
	$isim_ver2 = "multi2";
	} else if($bolunenler[0]==8 && $bolunenler[1]==9){
	$isim_ver = "dikey-".$bolunenler[0];
	$isim_ver2 = "multi2";
	} else if($bolunenler[0]==10 && $bolunenler[1]==11){
	$isim_ver = "dikey-".$bolunenler[0];
	$isim_ver2 = "multi2";
	} else if($bolunenler[0]==11 && $bolunenler[1]==12){
	$isim_ver = "dikey-".$bolunenler[0];
	$isim_ver2 = "multi2";
	} else if($bolunenler[0]==13 && $bolunenler[1]==14){
	$isim_ver = "dikey-".$bolunenler[0];
	$isim_ver2 = "multi2";
	} else if($bolunenler[0]==14 && $bolunenler[1]==15){
	$isim_ver = "dikey-".$bolunenler[0];
	$isim_ver2 = "multi2";
	} else if($bolunenler[0]==16 && $bolunenler[1]==17){
	$isim_ver = "dikey-".$bolunenler[0];
	$isim_ver2 = "multi2";
	} else if($bolunenler[0]==17 && $bolunenler[1]==18){
	$isim_ver = "dikey-".$bolunenler[0];
	$isim_ver2 = "multi2";
	} else if($bolunenler[0]==19 && $bolunenler[1]==20){
	$isim_ver = "dikey-".$bolunenler[0];
	$isim_ver2 = "multi2";
	} else if($bolunenler[0]==20 && $bolunenler[1]==21){
	$isim_ver = "dikey-".$bolunenler[0];
	$isim_ver2 = "multi2";
	} else if($bolunenler[0]==22 && $bolunenler[1]==23){
	$isim_ver = "dikey-".$bolunenler[0];
	$isim_ver2 = "multi2";
	} else if($bolunenler[0]==23 && $bolunenler[1]==24){
	$isim_ver = "dikey-".$bolunenler[0];
	$isim_ver2 = "multi2";
	} else if($bolunenler[0]==25 && $bolunenler[1]==26){
	$isim_ver = "dikey-".$bolunenler[0];
	$isim_ver2 = "multi2";
	} else if($bolunenler[0]==26 && $bolunenler[1]==27){
	$isim_ver = "dikey-".$bolunenler[0];
	$isim_ver2 = "multi2";
	} else if($bolunenler[0]==28 && $bolunenler[1]==29){
	$isim_ver = "dikey-".$bolunenler[0];
	$isim_ver2 = "multi2";
	} else if($bolunenler[0]==29 && $bolunenler[1]==30){
	$isim_ver = "dikey-".$bolunenler[0];
	$isim_ver2 = "multi2";
	} else if($bolunenler[0]==31 && $bolunenler[1]==32){
	$isim_ver = "dikey-".$bolunenler[0];
	$isim_ver2 = "multi2";
	} else if($bolunenler[0]==32 && $bolunenler[1]==33){
	$isim_ver = "dikey-".$bolunenler[0];
	$isim_ver2 = "multi2";
	} else if($bolunenler[0]==34 && $bolunenler[1]==35){
	$isim_ver = "dikey-".$bolunenler[0];
	$isim_ver2 = "multi2";
	} else if($bolunenler[0]==35 && $bolunenler[1]==36){
	$isim_ver = "dikey-".$bolunenler[0];
	$isim_ver2 = "multi2";
	} else {
	$isim_ver = "yatay-".$bolunenler[0];
	$isim_ver2 = "multi2";
	}
} else if($verigir=="line1"){
	$isim_ver = "line1";
	$isim_ver2 = $isim_ver;
} else if($verigir=="line2"){
	$isim_ver = "line2";
	$isim_ver2 = $isim_ver;
} else if($verigir=="line3"){
	$isim_ver = "line3";
	$isim_ver2 = $isim_ver;
} else if($verigir=="1st12"){
	$isim_ver = "1st12";
	$isim_ver2 = $isim_ver;
} else if($verigir=="2nd12"){
	$isim_ver = "2nd12";
	$isim_ver2 = $isim_ver;
} else if($verigir=="3rd12"){
	$isim_ver = "3rd12";
	$isim_ver2 = $isim_ver;
} else if($verigir=="even"){
	$isim_ver = "even";
	$isim_ver2 = $isim_ver;
} else if($verigir=="odd"){
	$isim_ver = "odd";
	$isim_ver2 = $isim_ver;
} else if($verigir=="red"){
	$isim_ver = "red";
	$isim_ver2 = $isim_ver;
} else if($verigir=="black"){
	$isim_ver = "black";
	$isim_ver2 = $isim_ver;
} else if($verigir=="1to18"){
	$isim_ver = "1to18";
	$isim_ver2 = $isim_ver;
} else if($verigir=="19to36"){
	$isim_ver = "19to36";
	$isim_ver2 = $isim_ver;
}

$suan = time();

$kontrol = sed_sql_query("select * from kupon_rulet where session_id='$session_id' and secenek='$verigir' and sayi='$sayi' and gameid='$isim_ver' and roundid='$isim_ver2' and rulet_tip='1'");

if(sed_sql_numrows($kontrol)<1) {

sed_sql_query("insert into kupon_rulet (id,session_id,gameid,roundid,oran,secenek,sayi,grupid,rulet_tip,ilkgiris) values ('','$session_id','$isim_ver','$isim_ver2','$oran','$verigir','$sayi','$tiklanansayi','1','$suan')");

} else {

$kupondaki = sed_sql_fetchassoc($kontrol);

sed_sql_query("update kupon_rulet set grupid=grupid+$tiklanansayi where id='$kupondaki[id]' and rulet_tip='1'");

}

}

$kontrol_kupon = sed_sql_query("select * from kupon_rulet where session_id='$session_id' and rulet_tip='1' order by id");

if(sed_sql_numrows($kontrol_kupon)<1) {

$json_coupon = array("total_odd"=>0,"fold"=>"5","amount"=>"5","maxgain"=>1,"ctype"=>"single","system"=>false,"category"=>6,"mbs"=>1,"kolon"=>1,"bets"=>false);
$json = array("status"=>"success","coupon"=>$json_coupon);

} else {

$toplamoran = 0;
$toplamyatan = 0;
while($row=sed_sql_fetcharray($kontrol_kupon)) {
$toplamoran = $toplamoran+$row['oran'];
$toplamyatan = $toplamyatan+$row['grupid'];

$bolunenler = explode(",", $row['sayi']);
$sayi = @count($bolunenler);

if($row['secenek']=="zero"){
	$reasult_history[$row['id']] = 0;
} else if($row['secenek']=="" && $sayi=="1"){
	$reasult_history[$row['id']] = $row['sayi'];
} else {
	for($i=0; $i < $sayi; $i++){ $reasult_history[$row['id']][] = $bolunenler[$i]; }
}

$oran_bol = explode(".",$row['oran']);

$json_bets_2[$row['gameid']] = array("match_id"=>0,"bet_type"=>$row['roundid'],"bet"=>$reasult_history[$row['id']],"odd"=>$oran_bol[0],"stake"=>$row['grupid']);

}


$json_coupon = array("total_odd"=>nf($toplamoran),"fold"=>1,"amount"=>$toplamyatan,"maxgain"=>1,"ctype"=>"single","system"=>false,"category"=>6,"mbs"=>1,"kolon"=>1,"bets"=>$json_bets_2,"max_gain"=>$toplamoran);
$json = array("status"=>"success","coupon"=>$json_coupon);

}

echo json_encode($json);

}

/////////////////////////////// PlayBilgisi ///////////////////////////////////////

if($getle=="PlayBilgisi"){

$auto = $_POST['auto'];
$run_id = $_POST['run_id'];
$ayargetir = userayar('rulet_yetki');

if($ayargetir!=1 || $ub['wkyetki']<1){

## RULET SİSTEMDE KAPALIDIR ##
$json = array("status"=>"error","message"=>"Hesabınız Bahis yapmaya Uygun Değildir.","balance"=>"0.00");
## RULET SİSTEMDE KAPALIDIR ##

} else if($run_id<10){

## RULET SEANS KAPALIDIR ##
$json = array("status"=>"error","message"=>"Lütfen Seansın Açılmasını Bekleyiniz.","balance"=>nf($ub['casinobakiye']));
## RULET SEANS KAPALIDIR ##

} else {

## KUPON YAPIMINA UYGUN İF BAŞLANGICI ##

if($auto=="true"){
## OTOMOTİK OYNA ##
$zaman = time();
$tarih = date("d.m.Y H:i:s");
$gunluk_tarih_ver = date("d.m.Y");

$toporan = 0;
$topyatan = 0;
$tutacak_bakiye = 0;
$toplambilgileri = sed_sql_query("select oran,grupid from kupon_rulet where session_id='$session_id' and rulet_tip='1'");
while($toplambilgilerihesapla = sed_sql_fetcharray($toplambilgileri)) {
$toporan = $toporan+$toplambilgilerihesapla['oran'];
$topyatan = $topyatan+$toplambilgilerihesapla['grupid'];
$toplamhesap = $toplambilgilerihesapla['grupid']*$toplambilgilerihesapla['oran'];
$tutacak_bakiye = $tutacak_bakiye+$toplamhesap;
}

$toplammac = sed_sql_numrows($toplambilgileri);

$toplamyatirilmisseans = bilgi("SELECT SUM(CASE WHEN id!='' THEN grupid END) as toplamyatan FROM kupon_ic_rulet WHERE oddid='$run_id' and user_id='$ub[id]' and rulet_tip='1'");
$yatirilanla_topla = $topyatan+$toplamyatirilmisseans['toplamyatan'];

if(userayar('ruletmin')>$topyatan){
$onaylama = 3;
} else if(userayar('ruletmax')<$topyatan){
$onaylama = 4;
} else if(userayar('ruletseans')<$yatirilanla_topla){
$onaylama = 5;
} else if($toplammac>0 && $ub['casinobakiye']>=$topyatan){
$toplamoran = $toporan;
$tutar = $topyatan;
$kazanc = $tutacak_bakiye;
$casinobakiye_hesapla = $ub['casinobakiye']-$tutar;

sed_sql_query("insert into kuponlar (id,user_id,username,oran,yatan,tutar,kupon_time,basketbol,futbol,voleybol,duello,canli,canlib,casino,toplam_mac,kupon_nots,durum,session_id,kupon_tarih,ipadres,mac_siralama,kupon_tarihi_belirle) values

('','$ub[id]','$ub[username]','$toplamoran','$tutar','$kazanc','$zaman','0','0','0','0','0','0','2','$toplammac','','1','$session_id','$tarih','$ipadres','1','$gunluk_tarih_ver')");

sed_sql_query("update kullanici set casinobakiye=casinobakiye-$tutar where id='$ub[id]'");

$kuponidbul = bilgi("select id,session_id,kupon_time from kuponlar where session_id='$session_id' order by id desc limit 1");

$kupon_id = $kuponidbul['id'];
$kupon_zaman = $kuponidbul['kupon_time'];

sed_sql_query("INSERT INTO hesap_hareket_gecici2 SET 
user_id='".$ub['id']."',
username='".$ub['username']."',
tip='cikar',
tutar = '".$tutar."',
onceki_tutar = '".$ub['casinobakiye']."',
aciklama = '".$kupon_id." numaralı rulet kupon yatırıldı',
islemi_yapan = 'sistem',
zaman = '".$kupon_zaman."',
detay = '1'");

$sor = sed_sql_query("select * from kupon_rulet where session_id='$session_id' and rulet_tip='1'");

while($row=sed_sql_fetcharray($sor)) {

sed_sql_query("insert into kupon_ic_rulet (id,rulet_tip,oran,session_id,kupon_id,user_id,username,ilkgiris,gameid,roundid,oddid,grupid,secenek,sayi) values ('','1','$row[oran]','$session_id','$kupon_id','$ub[id]','$ub[username]','$row[ilkgiris]','$row[gameid]','$row[roundid]','$run_id','$row[grupid]','$row[secenek]','$row[sayi]')");

$onaylama = 1;

}

} else {
$onaylama = 2;
}
## OTOMOTİK OYNA ##
} else {

$zaman = time();
$tarih = date("d.m.Y H:i:s");
$gunluk_tarih_ver = date("d.m.Y");

$toporan = 0;
$topyatan = 0;
$tutacak_bakiye = 0;
$toplambilgileri = sed_sql_query("select oran,grupid from kupon_rulet where session_id='$session_id' and rulet_tip='1'");
while($toplambilgilerihesapla = sed_sql_fetcharray($toplambilgileri)) {
$toporan = $toporan+$toplambilgilerihesapla['oran'];
$topyatan = $topyatan+$toplambilgilerihesapla['grupid'];
$toplamhesap = $toplambilgilerihesapla['grupid']*$toplambilgilerihesapla['oran'];
$tutacak_bakiye = $tutacak_bakiye+$toplamhesap;
}

$toplammac = sed_sql_numrows($toplambilgileri);

$toplamyatirilmisseans = bilgi("SELECT SUM(CASE WHEN id!='' THEN grupid END) as toplamyatan FROM kupon_ic_rulet WHERE oddid='$run_id' and user_id='$ub[id]' and rulet_tip='1'");
$yatirilanla_topla = $topyatan+$toplamyatirilmisseans['toplamyatan'];

if(userayar('ruletmin')>$topyatan){
$onaylama = 3;
} else if(userayar('ruletmax')<$topyatan){
$onaylama = 4;
} else if(userayar('ruletseans')<$yatirilanla_topla){
$onaylama = 5;
} else if($toplammac>0 && $ub['casinobakiye']>=$topyatan){
$toplamoran = $toporan;
$tutar = $topyatan;
$kazanc = $tutacak_bakiye;
$casinobakiye_hesapla = $ub['casinobakiye']-$tutar;

sed_sql_query("insert into kuponlar (id,user_id,username,oran,yatan,tutar,kupon_time,basketbol,futbol,voleybol,duello,canli,canlib,casino,toplam_mac,kupon_nots,durum,session_id,kupon_tarih,ipadres,mac_siralama,kupon_tarihi_belirle) values

('','$ub[id]','$ub[username]','$toplamoran','$tutar','$kazanc','$zaman','0','0','0','0','0','0','2','$toplammac','','1','$session_id','$tarih','$ipadres','1','$gunluk_tarih_ver')");

sed_sql_query("update kullanici set casinobakiye=casinobakiye-$tutar where id='$ub[id]'");

$kuponidbul = bilgi("select id,session_id,kupon_time from kuponlar where session_id='$session_id' order by id desc limit 1");

$kupon_id = $kuponidbul['id'];
$kupon_zaman = $kuponidbul['kupon_time'];

sed_sql_query("INSERT INTO hesap_hareket_gecici2 SET 
user_id='".$ub['id']."',
username='".$ub['username']."',
tip='cikar',
tutar = '".$tutar."',
onceki_tutar = '".$ub['casinobakiye']."',
aciklama = '".$kupon_id." numaralı rulet kupon yatırıldı',
islemi_yapan = 'sistem',
zaman = '".$kupon_zaman."',
detay = '1'");

$sor = sed_sql_query("select * from kupon_rulet where session_id='$session_id' and rulet_tip='1'");

while($row=sed_sql_fetcharray($sor)) {

sed_sql_query("insert into kupon_ic_rulet (id,rulet_tip,oran,session_id,kupon_id,user_id,username,ilkgiris,gameid,roundid,oddid,grupid,secenek,sayi) values ('','1','$row[oran]','$session_id','$kupon_id','$ub[id]','$ub[username]','$row[ilkgiris]','$row[gameid]','$row[roundid]','$run_id','$row[grupid]','$row[secenek]','$row[sayi]')");

$onaylama = 1;

}

} else {
$onaylama = 2;
}

}

if($onaylama==1){
	sed_sql_query("delete from kupon_rulet where session_id='".$session_id."' and rulet_tip='1'");
	$json_coupon = array("total_odd"=>0,"fold"=>"5","amount"=>"5","maxgain"=>1,"ctype"=>"single","system"=>false,"category"=>6,"mbs"=>1,"kolon"=>1,"bets"=>false,"applied"=>true,"applied_id"=>"".$kupon_id."");
	$json = array("status"=>"success","coupon"=>$json_coupon,"balance"=>nf($casinobakiye_hesapla));
} else if($onaylama==3){
	$json = array("status"=>"error","message"=>"".getTranslation('casinoicin428')." ".userayar('ruletmin')."","balance"=>nf($ub['casinobakiye']));
} else if($onaylama==4){
	$json = array("status"=>"error","message"=>"".getTranslation('casinoicin429')." ".userayar('ruletmax')."","balance"=>nf($ub['casinobakiye']));
} else if($onaylama==5){
	$json = array("status"=>"error","message"=>"".getTranslation('casinoicin430')." ".userayar('ruletseans')."","balance"=>nf($ub['casinobakiye']));
} else if($onaylama==2){
	$json = array("status"=>"error","message"=>"".getTranslation('casinoicin431')."","balance"=>nf($ub['casinobakiye']));
} else {
	$json = array("status"=>"error","message"=>"".getTranslation('casinoicin432')."","balance"=>nf($ub['casinobakiye']));
}


## KUPON YAPIMINA UYGUN İF BİTİŞİ ##
}

echo json_encode($json);

}

/////////////////////////////// RuletBilgisi ///////////////////////////////////////

if($getle=="RuletBilgisi"){

function bilgigetir() {
$url='https://betwingo.xyz/api/rulet_bilgi.php?cmd=Rulet';
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, "Firefox/3.6.8");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_URL, $url);
$gelenveri = curl_exec($ch);
return $gelenveri;
}

$ruletbilgi = bilgigetir();

$ruletbilgileri = explode("}{",$ruletbilgi);
$ruletbilgileri2 = explode("&",$ruletbilgileri[0]);

$run_id_parcala = explode("=",$ruletbilgileri2[1]);
$run_id = $run_id_parcala[1];

$status_parcala = explode("=",$ruletbilgileri2[5]);
$status = $status_parcala[1];

$remaining_time_parcala = explode("=",$ruletbilgileri2[7]);
$remaining_time2 = $remaining_time_parcala[1];
$remaining_time = $remaining_time2;

$next_call_parcala = explode("=",$ruletbilgileri2[8]);
$next_call = $next_call_parcala[1];

$nextTurn_parcala = explode("=",$ruletbilgileri2[1]);
$nextTurn = $nextTurn_parcala[1];

$lastResult_parcala = explode("=",$ruletbilgileri2[2]);
$lastResult = $lastResult_parcala[1];

$resultHistory_parcala = explode("=",$ruletbilgileri2[3]);
//$reasult_history = explode(",",$resultHistory_parcala[1]);

$kontrol_kupon = sed_sql_query("select * from kupon_rulet where session_id='$session_id' and rulet_tip='1' order by id");

if(sed_sql_numrows($kontrol_kupon)<1) {

$json_coupon = array("total_odd"=>0,"fold"=>"5","amount"=>"5","maxgain"=>1,"ctype"=>"single","system"=>false,"category"=>6,"mbs"=>1,"kolon"=>1,"bets"=>false);

} else {

$toplamoran = 0;
$toplamyatan = 0;
while($row=sed_sql_fetcharray($kontrol_kupon)) {
$toplamoran = $toplamoran+$row['oran'];
$toplamyatan = $toplamyatan+$row['grupid'];

$bolunenler = explode(",", $row['sayi']);
$sayi = @count($bolunenler);

if($row['secenek']=="zero"){
	$reasult_history[$row['id']] = 0;
} else if($row['secenek']=="" && $sayi=="1"){
	$reasult_history[$row['id']] = $row['sayi'];
} else {
	for($i=0; $i < $sayi; $i++){ $reasult_history[$row['id']][] = $bolunenler[$i]; }
}

$oran_bol = explode(".",$row['oran']);

$json_bets_2[$row['gameid']] = array("match_id"=>0,"bet_type"=>$row['roundid'],"bet"=>$reasult_history[$row['id']],"odd"=>$oran_bol[0],"stake"=>$row['grupid']);

}


$json_coupon = array("total_odd"=>nf($toplamoran),"fold"=>1,"amount"=>$toplamyatan,"maxgain"=>1,"ctype"=>"single","system"=>false,"category"=>6,"mbs"=>1,"kolon"=>1,"bets"=>$json_bets_2,"max_gain"=>$toplamoran);

}

$bolunenler_data = explode(",", $resultHistory_parcala[1]);
$sayi_data = @count($bolunenler_data);
$son_data = $sayi_data - 1;
for($i_data=$son_data; $i_data >= 0; --$i_data){
$reasult_history_data[] .= $bolunenler_data[$i_data];
}


$json_data = array("run_id"=>$run_id,"status"=>$status,"remaining_time"=>$remaining_time,"next_call"=>$next_call,"nextTurn"=>$nextTurn,"lastResult"=>$lastResult,"resultHistory"=>$reasult_history_data);

$json = array("status"=>"success","data"=>$json_data,"limit"=>"0.00","kalan"=>"0.00","coupon"=>$json_coupon);

echo json_encode($json);

}