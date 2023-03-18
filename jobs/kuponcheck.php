<?php
session_start();
header("Content-type: text/html; charset=utf-8");
include 'xml.php';

function kupon_hesapla($id) {
$kupon_bilgi = bilgi("select * from kuponlar where id='$id' and canli!='3' and casino='0' order by id asc");
$oran = 1;
$sor = sed_sql_query("select kazanma,oran from kupon_ic where kupon_id='$id'");
while($row=sed_sql_fetcharray($sor)) {
if($row['kazanma']!="4") {
	$oran = $oran*$row['oran'];
}

}
$yeni_oran = $oran;

sed_sql_query("update kuponlar set oran='$yeni_oran' where id='$id' and canli!='3' and casino='0'");		


$userbilgi = bilgi("select id,hesap_sahibi_id,hesap_root_id,bakiye from kullanici where id='$kupon_bilgi[user_id]'");
$userayar = bilgi("select ayar_id,maxoran,max_odeme from sistemayar where (ayar_id='$userbilgi[id]' or ayar_id='$userbilgi[hesap_sahibi_id]' or ayar_id='$userbilgi[hesap_root_id]')");
if($userayar['maxoran']=="") { $maxoran = 1000; } else { $maxoran = $userayar['maxoran']; }
if($yeni_oran>$maxoran) { $yenioran = $maxoran; $oran = $maxoran; }
$yeni_tutar = $kupon_bilgi['yatan']*$oran;

if($yeni_tutar>$userayar['max_odeme'] && !empty($userayar['max_odeme'])) { $yeni_tutar = $userayar['max_odeme']; }


$toplam_mac = 0;
$toplam_acik = 0;
$toplam_kazanan = 0;
$toplam_kaybeden = 0;
$toplam_iptal = 0;
$toplam_sorgusu = sed_sql_query("select kazanma from kupon_ic where kupon_id='$id'");
while($asso=sed_sql_fetcharray($toplam_sorgusu)) {	
	if($asso['kazanma']=="1") { $toplam_acik = $toplam_acik+1; } else
	if($asso['kazanma']=="2") { $toplam_kazanan = $toplam_kazanan+1; } else
	if($asso['kazanma']=="3") { $toplam_kaybeden = $toplam_kaybeden+1; } else
	if($asso['kazanma']=="4") { $toplam_iptal = $toplam_iptal+1; }
}
$toplam_mac = sed_sql_numrows($toplam_sorgusu);
sed_sql_query("update kuponlar set tutan='$toplam_kazanan' where id='$id' and canli!='3' and casino='0'");




if($toplam_mac==$toplam_iptal) { $durum = 4; } else
if($toplam_kaybeden>0) { $durum = 3; } else
if($toplam_acik<1) { $durum = 2; } else { $durum = 1; }
if($durum==1 && $kupon_bilgi['bakiye_aktarim']==1) {
sed_sql_query("update kullanici set bakiye=bakiye-$kupon_bilgi[tutar] where id='$kupon_bilgi[user_id]'");	
$bakiye_aktarim = "0";
} else
if($durum==2 && $kupon_bilgi['bakiye_aktarim']==0) {
sed_sql_query("update kullanici set bakiye=bakiye+$yeni_tutar where id='$kupon_bilgi[user_id]'");	
$bakiye_aktarim = "1";
} else
if($durum==2 && $kupon_bilgi['bakiye_aktarim']==1) {
sed_sql_query("update kullanici set bakiye=bakiye-$kupon_bilgi[tutar] where id='$kupon_bilgi[user_id]'");	
sed_sql_query("update kullanici set bakiye=bakiye+$yeni_tutar where id='$kupon_bilgi[user_id]'");	
$bakiye_aktarim = "1";
} else
if($durum==3 && $kupon_bilgi['bakiye_aktarim']==1) {
sed_sql_query("update kullanici set bakiye=bakiye-$kupon_bilgi[tutar] where id='$kupon_bilgi[user_id]'");	
$bakiye_aktarim = "0";	
} else
if($durum==4 && $kupon_bilgi['bakiye_aktarim']==1) {
sed_sql_query("update kullanici set bakiye=bakiye-$kupon_bilgi[tutar] where id='$kupon_bilgi[user_id]'");	
sed_sql_query("update kullanici set bakiye=bakiye+$kupon_bilgi[yatan] where id='$kupon_bilgi[user_id]'");	
$bakiye_aktarim = "0";
} else 
if($durum==4 && $kupon_bilgi['bakiye_aktarim']==0) {
sed_sql_query("update kullanici set bakiye=bakiye+$kupon_bilgi[yatan] where id='$kupon_bilgi[user_id]'");	
$bakiye_aktarim = "0";
} else {
$bakiye_aktarim = $kupon_bilgi['bakiye_aktarim'];	
}
sed_sql_query("update kuponlar set oran='$yeni_oran',tutar='$yeni_tutar',durum='$durum',bakiye_aktarim='$bakiye_aktarim',toplam_mac='$toplam_mac' where id='$id' and canli!='3' and casino='0'");

if($durum==2){

sed_sql_query("INSERT INTO hesap_hareket_gecici2 SET user_id='".$kupon_bilgi['user_id']."',username='".$kupon_bilgi['username']."',tip='ekle',tutar = '".$yeni_tutar."',onceki_tutar = '".$userbilgi['bakiye']."',aciklama = '".$id." numaralı kupon kazancı',islemi_yapan = 'sistem',zaman = '".time()."',detay = '1'");

}

}


function kupon_hesapla_sanal($id_sanal) {
$kupon_bilgi_sanal = bilgi("select * from kuponlar where id='$id_sanal' and canli='3' and casino='0' order by id asc");
$oran_sanal = 1;

$sor_sanal = sed_sql_query("select kazanma,oran from kupon_ic_sanal where kupon_id='$id_sanal'");
while($row_sanal=sed_sql_fetcharray($sor_sanal)) {
if($row_sanal['kazanma']!="4") {
	$oran_sanal = $oran_sanal*$row_sanal['oran'];
}
}

$yeni_oran_sanal = $oran_sanal;

sed_sql_query("update kuponlar set oran='$yeni_oran_sanal' where id='$id_sanal' and canli='3' and casino='0'");		


$userbilgi_sanal = bilgi("select id,hesap_sahibi_id,hesap_root_id,bakiye from kullanici where id='$kupon_bilgi_sanal[user_id]'");
$userayar_sanal = bilgi("select ayar_id,maxoran,max_odeme from sistemayar where (ayar_id='$userbilgi_sanal[id]' or ayar_id='$userbilgi_sanal[hesap_sahibi_id]' or ayar_id='$userbilgi_sanal[hesap_root_id]')");
if($userayar_sanal['maxoran']=="") { $maxoran_sanal = 1000; } else { $maxoran_sanal = $userayar_sanal['maxoran']; }
if($yeni_oran_sanal>$maxoran_sanal) { $yenioran_sanal = $maxoran_sanal; $oran_sanal = $maxoran_sanal; }
$yeni_tutar_sanal = $kupon_bilgi_sanal['yatan']*$oran_sanal;

//if($yeni_tutar_sanal>$userayar_sanal['max_odeme'] && !empty($userayar_sanal['max_odeme'])) { $yeni_tutar_sanal = $userayar_sanal['max_odeme']; }


$toplam_mac_sanal = 0;
$toplam_acik_sanal = 0;
$toplam_kazanan_sanal = 0;
$toplam_kaybeden_sanal = 0;
$toplam_iptal_sanal = 0;

$toplam_sorgusu_sanal = sed_sql_query("select kazanma from kupon_ic_sanal where kupon_id='$id_sanal'");
while($asso_sanal=sed_sql_fetcharray($toplam_sorgusu_sanal)) {	
	if($asso_sanal['kazanma']=="1") { $toplam_acik_sanal = $toplam_acik_sanal+1; } else
	if($asso_sanal['kazanma']=="2") { $toplam_kazanan_sanal = $toplam_kazanan_sanal+1; } else
	if($asso_sanal['kazanma']=="3") { $toplam_kaybeden_sanal = $toplam_kaybeden_sanal+1; } else
	if($asso_sanal['kazanma']=="4") { $toplam_iptal_sanal = $toplam_iptal_sanal+1; }
}
$toplam_mac_sanal = sed_sql_numrows($toplam_sorgusu_sanal);
sed_sql_query("update kuponlar set tutan='$toplam_kazanan_sanal' where id='$id_sanal' and canli='3' and casino='0'");




if($toplam_mac_sanal==$toplam_iptal_sanal) { $durum_sanal = 4; } else
if($toplam_kaybeden_sanal>0) { $durum_sanal = 3; } else
if($toplam_acik_sanal<1) { $durum_sanal = 2; } else { $durum_sanal = 1; }
if($durum_sanal==1 && $kupon_bilgi_sanal['bakiye_aktarim']==1) {
sed_sql_query("update kullanici set bakiye=bakiye-$kupon_bilgi_sanal[tutar] where id='$kupon_bilgi_sanal[user_id]'");	
$bakiye_aktarim_sanal = "0";
} else
if($durum_sanal==2 && $kupon_bilgi_sanal['bakiye_aktarim']==0) {
sed_sql_query("update kullanici set bakiye=bakiye+$yeni_tutar_sanal where id='$kupon_bilgi_sanal[user_id]'");	
$bakiye_aktarim_sanal = "1";
} else
if($durum_sanal==2 && $kupon_bilgi_sanal['bakiye_aktarim']==1) {
sed_sql_query("update kullanici set bakiye=bakiye-$kupon_bilgi_sanal[tutar] where id='$kupon_bilgi_sanal[user_id]'");	
sed_sql_query("update kullanici set bakiye=bakiye+$yeni_tutar_sanal where id='$kupon_bilgi_sanal[user_id]'");	
$bakiye_aktarim_sanal = "1";
} else
if($durum_sanal==3 && $kupon_bilgi_sanal['bakiye_aktarim']==1) {
sed_sql_query("update kullanici set bakiye=bakiye-$kupon_bilgi_sanal[tutar] where id='$kupon_bilgi_sanal[user_id]'");	
$bakiye_aktarim_sanal = "0";	
} else
if($durum_sanal==4 && $kupon_bilgi_sanal['bakiye_aktarim']==1) {
sed_sql_query("update kullanici set bakiye=bakiye-$kupon_bilgi_sanal[tutar] where id='$kupon_bilgi_sanal[user_id]'");	
sed_sql_query("update kullanici set bakiye=bakiye+$kupon_bilgi_sanal[yatan] where id='$kupon_bilgi_sanal[user_id]'");	
$bakiye_aktarim_sanal = "0";
} else 
if($durum_sanal==4 && $kupon_bilgi_sanal['bakiye_aktarim']==0) {
sed_sql_query("update kullanici set bakiye=bakiye+$kupon_bilgi_sanal[yatan] where id='$kupon_bilgi_sanal[user_id]'");	
$bakiye_aktarim_sanal = "0";
} else {
$bakiye_aktarim_sanal = $kupon_bilgi_sanal['bakiye_aktarim'];	
}
sed_sql_query("update kuponlar set oran='$yeni_oran_sanal',tutar='$yeni_tutar_sanal',durum='$durum_sanal',bakiye_aktarim='$bakiye_aktarim_sanal',toplam_mac='$toplam_mac_sanal' where id='$id_sanal' and canli='3' and casino='0'");

if($durum_sanal==2){

sed_sql_query("INSERT INTO hesap_hareket_gecici2 SET user_id='".$kupon_bilgi_sanal['user_id']."',username='".$kupon_bilgi_sanal['username']."',tip='ekle',tutar = '".$yeni_tutar_sanal."',onceki_tutar = '".$userbilgi_sanal['bakiye']."',aciklama = '".$id_sanal." numaralı sanal kupon kazancı',islemi_yapan = 'sistem',zaman = '".time()."',detay = '1'");

}

}


function kupon_hesapla_casino($id) {
$kupon_bilgi = bilgi("select * from kuponlar where id='$id' and casino='1' order by id asc");
$oran = 1;
$sor = sed_sql_query("select kazanma,oran from kupon_ic_casino where kupon_id='$id'");
while($row=sed_sql_fetcharray($sor)) {
if($row['kazanma']!="4") { $oran = $oran*$row['oran']; }
}
$yeni_oran = $oran;

sed_sql_query("update kuponlar set oran='$yeni_oran' where id='$id' and casino='1'");		

$userbilgi = bilgi("select id,hesap_sahibi_id,hesap_root_id,casinobakiye from kullanici where id='$kupon_bilgi[user_id]'");

$yeni_tutar = $kupon_bilgi['yatan']*$oran;

$toplam_mac = 0;
$toplam_acik = 0;
$toplam_kazanan = 0;
$toplam_kaybeden = 0;
$toplam_iptal = 0;
$toplam_sorgusu = sed_sql_query("select kazanma from kupon_ic_casino where kupon_id='$id'");
while($asso=sed_sql_fetcharray($toplam_sorgusu)) {	
	if($asso['kazanma']=="1") { $toplam_acik = $toplam_acik+1; } else
	if($asso['kazanma']=="2") { $toplam_kazanan = $toplam_kazanan+1; } else
	if($asso['kazanma']=="3") { $toplam_kaybeden = $toplam_kaybeden+1; } else
	if($asso['kazanma']=="4") { $toplam_iptal = $toplam_iptal+1; }
}
$toplam_mac = sed_sql_numrows($toplam_sorgusu);
sed_sql_query("update kuponlar set tutan='$toplam_kazanan' where id='$id' and casino='1'");




if($toplam_mac==$toplam_iptal) { $durum = 4; } else
if($toplam_kaybeden>0) { $durum = 3; } else
if($toplam_acik<1) { $durum = 2; } else { $durum = 1; }
if($durum==1 && $kupon_bilgi['bakiye_aktarim']==1) {
sed_sql_query("update kullanici set casinobakiye=casinobakiye-$kupon_bilgi[tutar] where id='$kupon_bilgi[user_id]'");	
$bakiye_aktarim = "0";
} else
if($durum==2 && $kupon_bilgi['bakiye_aktarim']==0) {
sed_sql_query("update kullanici set casinobakiye=casinobakiye+$yeni_tutar where id='$kupon_bilgi[user_id]'");	
$bakiye_aktarim = "1";
} else
if($durum==2 && $kupon_bilgi['bakiye_aktarim']==1) {
sed_sql_query("update kullanici set casinobakiye=casinobakiye-$kupon_bilgi[tutar] where id='$kupon_bilgi[user_id]'");	
sed_sql_query("update kullanici set casinobakiye=casinobakiye+$yeni_tutar where id='$kupon_bilgi[user_id]'");	
$bakiye_aktarim = "1";
} else
if($durum==3 && $kupon_bilgi['bakiye_aktarim']==1) {
sed_sql_query("update kullanici set casinobakiye=casinobakiye-$kupon_bilgi[tutar] where id='$kupon_bilgi[user_id]'");	
$bakiye_aktarim = "0";	
} else
if($durum==4 && $kupon_bilgi['bakiye_aktarim']==1) {
sed_sql_query("update kullanici set casinobakiye=casinobakiye-$kupon_bilgi[tutar] where id='$kupon_bilgi[user_id]'");	
sed_sql_query("update kullanici set casinobakiye=casinobakiye+$kupon_bilgi[yatan] where id='$kupon_bilgi[user_id]'");	
$bakiye_aktarim = "0";
} else 
if($durum==4 && $kupon_bilgi['bakiye_aktarim']==0) {
sed_sql_query("update kullanici set casinobakiye=casinobakiye+$kupon_bilgi[yatan] where id='$kupon_bilgi[user_id]'");	
$bakiye_aktarim = "0";
} else {
$bakiye_aktarim = $kupon_bilgi['bakiye_aktarim'];	
}
sed_sql_query("update kuponlar set oran='$yeni_oran',tutar='$yeni_tutar',durum='$durum',bakiye_aktarim='$bakiye_aktarim',toplam_mac='$toplam_mac' where id='$id' and casino='1'");

if($durum==2){

sed_sql_query("INSERT INTO hesap_hareket_gecici2 SET user_id='".$kupon_bilgi['user_id']."',username='".$kupon_bilgi['username']."',tip='ekle',tutar = '".$yeni_tutar."',onceki_tutar = '".$userbilgi['casinobakiye']."',aciklama = '".$id." numaralı casino kupon kazancı',islemi_yapan = 'sistem',zaman = '".time()."',detay = '1'");

}

}

function kupon_hesapla_rulet($id) {
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


$sor = sed_sql_query("select id,durum from kuponlar where durum='1' and canli!='3' and casino!='1' order by id asc");
while($row=sed_sql_fetcharray($sor)) {
kupon_hesapla($row['id']);
echo "$row[id], ";
flush();
}


$sor_sanal = sed_sql_query("select id,durum from kuponlar where durum='1' and canli='3' and casino!='1' order by id asc");
while($row_sanal=sed_sql_fetcharray($sor_sanal)) {
kupon_hesapla_sanal($row_sanal['id']);
echo "$row_sanal[id], ";
flush();
}


$sor = sed_sql_query("select id,durum from kuponlar where durum='1' and casino='1' order by id asc");
while($row=sed_sql_fetcharray($sor)) {
kupon_hesapla_casino($row['id']);
echo "$row[id], ";
flush();
}

$sor = sed_sql_query("select id,durum from kuponlar where durum='1' and casino='2' order by id asc");
while($row=sed_sql_fetcharray($sor)) {
kupon_hesapla_rulet($row['id']);
echo "$row[id], ";
flush();
}

//mysql_close($linkmysql);
?>
<meta http-equiv="refresh" content="15">