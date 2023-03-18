<?PHP
include 'singledb.php';
/*$linkmysql = mysql_connect($dbhost,$dbuser,$dbpass);
mysql_select_db($dbname);

sed_sql_query("SET NAMES 'UTF8'");
sed_sql_query("SET character_set_connection = 'UTF8'");
sed_sql_query("SET character_set_client = 'UTF8'");
sed_sql_query("SET character_set_results = 'UTF8'");
*/
function bilgi($str) { 
if(strstr($str,'limit')) {
$bilgi = sed_sql_fetchassoc(sed_sql_query($str)); 
} else {
$bilgi = sed_sql_fetchassoc(sed_sql_query("".$str." limit 1")); 
}
return $bilgi; 
}

function farray($query){ $sql =  sed_sql_fetcharray(sed_sql_query($query)); return $sql; }

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
$sonuczamani_ver = date("H:i",strtotime("+3 hours"));

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
$sonuczamani_ver2 = date("H:i",strtotime("+3 hours"));

$bilgile = bilgi("select * from kupon_ic_rulet where rulet_tip='2' and oddid='$runid2' and sonuc='' and sonuczamani='' and kazanma='1'");
if($bilgile['id'] > 0){
sed_sql_query("UPDATE kupon_ic_rulet SET sonuc = '".$sonuc2."',sonuczamani = '".$sonuczamani_ver2."' WHERE oddid='".$runid2."' and rulet_tip='2'");
}

}

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

function kupon_hesapla_ruletsss($id) {
$kupon_bilgi = bilgi("select * from kuponlar where id='$id' and casino='2' order by id asc");
$tutacak_bakiye = 0;
$yeni_bakiye = 0;
$kazananmac = 0;
$oran = 0;
$sor = sed_sql_query("select kazanma,grupid,oran from kupon_ic_rulet where kupon_id='$id'");
while($row=sed_sql_fetcharray($sor)) {
	if($row['kazanma']<3) {
		$oran = $oran+$row['oran'];
		$yeni_bakiye = $row['grupid']*$row['oran'];
		$tutacak_bakiye = $tutacak_bakiye+$yeni_bakiye;
	}
	if($row['kazanma']==2) {
		$kazananmac = $kazananmac+1;
	}
}

$tutan_bakiye = $tutacak_bakiye;
$kazananmacsayi = $kazananmac;

$userbilgi = bilgi("select id,hesap_sahibi_id,hesap_root_id,casinobakiye from kullanici where id='$kupon_bilgi[user_id]'");
$yeni_oran = $oran;
$yeni_tutar = $kupon_bilgi['yatan']*$oran;

$toplam_mac = 0;
$toplam_acik = 0;
$toplam_kazanan = 0;
$toplam_kaybeden = 0;
$toplam_iptal = 0;
$toplam_sorgusu = sed_sql_query("select kazanma from kupon_ic_rulet where kupon_id='$id'");
while($asso=sed_sql_fetcharray($toplam_sorgusu)) {
	if($asso['kazanma']=="1") { $toplam_acik = $toplam_acik+1; } else
	if($asso['kazanma']=="2") { $toplam_kazanan = $toplam_kazanan+1; } else
	if($asso['kazanma']=="3") { $toplam_kaybeden = $toplam_kaybeden+1; } else
	if($asso['kazanma']=="4") { $toplam_iptal = $toplam_iptal+1; }
}

$toplam_mac = sed_sql_numrows($toplam_sorgusu);
sed_sql_query("update kuponlar set tutan='$toplam_kazanan' where id='$id' and casino='2'");

if($toplam_mac==$toplam_iptal) {
	$durum = 4;
} else if($toplam_acik==0 && $toplam_kazanan>0) {
	$durum = 2;
} else if($toplam_acik==0 && $toplam_kazanan==0 && $toplam_kaybeden>0) {
	$durum = 3;
} else {
	$durum = 1;
}

if($durum==1 && $kupon_bilgi['bakiye_aktarim']==1) {
sed_sql_query("update kullanici set casinobakiye=casinobakiye-$kupon_bilgi[tutar] where id='$kupon_bilgi[user_id]'");	
$bakiye_aktarim = "0";
} else if($durum==2 && $kupon_bilgi['bakiye_aktarim']==0) {
sed_sql_query("update kullanici set casinobakiye=casinobakiye+$tutan_bakiye where id='$kupon_bilgi[user_id]'");	
$bakiye_aktarim = "1";
} else if($durum==2 && $kupon_bilgi['bakiye_aktarim']==1) {
sed_sql_query("update kullanici set casinobakiye=casinobakiye-$kupon_bilgi[tutar] where id='$kupon_bilgi[user_id]'");	
sed_sql_query("update kullanici set casinobakiye=casinobakiye+$tutan_bakiye where id='$kupon_bilgi[user_id]'");	
$bakiye_aktarim = "1";
} else if($durum==3 && $kupon_bilgi['bakiye_aktarim']==1) {
sed_sql_query("update kullanici set casinobakiye=casinobakiye-$kupon_bilgi[tutar] where id='$kupon_bilgi[user_id]'");	
$bakiye_aktarim = "0";	
} else if($durum==4 && $kupon_bilgi['bakiye_aktarim']==1) {
sed_sql_query("update kullanici set casinobakiye=casinobakiye-$kupon_bilgi[tutar] where id='$kupon_bilgi[user_id]'");	
sed_sql_query("update kullanici set casinobakiye=casinobakiye+$kupon_bilgi[yatan] where id='$kupon_bilgi[user_id]'");	
$bakiye_aktarim = "0";
} else if($durum==4 && $kupon_bilgi['bakiye_aktarim']==0) {
sed_sql_query("update kullanici set casinobakiye=casinobakiye+$kupon_bilgi[yatan] where id='$kupon_bilgi[user_id]'");	
$bakiye_aktarim = "0";
} else {
$bakiye_aktarim = $kupon_bilgi['bakiye_aktarim'];	
}
sed_sql_query("update kuponlar set oran='$yeni_oran',tutar='$tutan_bakiye',tutan='$kazananmacsayi',durum='$durum',bakiye_aktarim='$bakiye_aktarim',toplam_mac='$toplam_mac' where id='$id' and casino='2'");

if($durum==2){

sed_sql_query("INSERT INTO hesap_hareket_gecici2 SET user_id='".$kupon_bilgi['user_id']."',username='".$kupon_bilgi['username']."',tip='ekle',tutar = '".$tutan_bakiye."',onceki_tutar = '".$userbilgi['casinobakiye']."',aciklama = '".$id." numaralı rulet kupon kazancı',islemi_yapan = 'sistem',zaman = '".time()."',detay = '1'");

}

}

$sor = sed_sql_query("select id,durum from kuponlar where durum='1' and casino='2' order by id asc");
while($row=sed_sql_fetcharray($sor)) {
kupon_hesapla_ruletsss($row['id']);
echo "$row[id], ";
flush();
}

//mysqli_close();