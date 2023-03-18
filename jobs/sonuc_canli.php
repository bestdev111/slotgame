<?php
header("Content-type: text/html; charset=utf-8");
set_time_limit(0);
include 'xml.php';
flush();

function golbul($mac_db_id,$gol) {
$sor = sed_sql_query("select mac_db_id,golsayi,atantakim from canli_gol_list where mac_db_id='$mac_db_id' and golsayi='$gol'");
if(sed_sql_numrows($sor)<1) { $donen = "0"; } else {
$bilgisi = sed_sql_fetcharray($sor);
$donen = $bilgisi['atantakim'];
}
return $donen;
}

function canli_normal_sonuc_futbol($iy,$ms,$sari,$kirmizi,$korner,$penalti,$oran_tip,$kid,$mac_db_id) {
    $kacmacacik = sed_sql_query("select count(1) from canli_maclar where aktif = 1");
    $kacmac = sed_sql_result($kacmacacik,0,0);
    if($kacmac == 0)
        exit;
    
	$ob = explode("|",$oran_tip);
	$ot = $ob[0];
	$or = $ob[1];
	$iy_bol = explode(" - ",$iy);
	$ms_bol = explode(" - ",$ms);
	$sari_bol = explode(" - ",$sari);
	$kirmizi_bol = explode(" - ",$kirmizi);
	$korner_bol = explode(" - ",$korner);
	$penalti_bol = explode(" - ",$penalti);
	$iy_ev = $iy_bol[0];
	$iy_konuk = $iy_bol[1];
	$ms_ev = $ms_bol[0];
	$ms_konuk = $ms_bol[1];
	
	$ev_skor = $ms_ev;
	$konuk_skor = $ms_konuk;
	
	$ik_ev = $ms_ev-$iy_ev;
	$ik_konuk = $ms_konuk-$iy_konuk;
	
	$iy_toplam_gol = $iy_ev+$iy_konuk;
	$ms_toplam_gol = $ms_ev+$ms_konuk;
	$ik_toplam_gol = $ik_ev+$ik_konuk;
	
	$ms_ev_h1 = $ms_ev+1;
	$ms_konuk_h1 = $ms_konuk+1;
	$ms_ev_h2 = $ms_ev+2;
	$ms_konuk_h2 = $ms_konuk+2;
	
	if($ev_skor-$konuk_skor==1){
		$birgol_fark = 1;
	} else if($konuk_skor-$ev_skor==1){
		$birgol_fark = 1;
	} else {
		$birgol_fark = 0;
	}

	if($ev_skor-$konuk_skor==2){
		$ikigol_fark = 1;
	} else if($konuk_skor-$ev_skor==2){
		$ikigol_fark = 1;
	} else {
		$ikigol_fark = 0;
	}

	if($ev_skor-$konuk_skor==3){
		$ucgol_fark = 1;
	} else if($konuk_skor-$ev_skor==3){
		$ucgol_fark = 1;
	} else {
		$ucgol_fark = 0;
	}
	
	if($iy_toplam_gol%2==0) { $iy_tekcift = "cift"; } else { $iy_tekcift = "tek"; }
	if($ik_toplam_gol%2==0) { $ik_tekcift = "cift"; } else { $ik_tekcift = "tek"; }
	if($ms_toplam_gol%2==0) { $ms_tekcift = "cift"; } else { $ms_tekcift = "tek"; }
	
	$sari_ev = $sari_bol[0];
	$sari_dep = $sari_bol[1];
	$kirmizi_ev = $kirmizi_bol[0];
	$kirmizi_dep = $kirmizi_bol[1];
	$korner_ev = $korner_bol[0];
	$korner_dep = $korner_bol[1];
	$penalti_ev = $penalti_bol[0];
	$penalti_dep = $penalti_bol[1];
	
	$sari_toplam = $sari_ev+$sari_dep;
	$kirmizi_toplam = $kirmizi_ev+$kirmizi_dep;
	$korner_toplam = $korner_ev+$korner_dep;
	$penalti_toplam = $penalti_ev+$penalti_dep;
	
	if($sari_toplam%2==0) { $sari_tekcift = "cift"; } else { $sari_tekcift = "tek"; }
	if($korner_toplam%2==0) { $korner_tekcift = "cift"; } else { $korner_tekcift = "tek"; }
	
	if($ot=="Toplam Sarı Kart 1.5 Alt/Üst") {
		if($or=="A" && $sari_toplam<2) { kazanma(2,$kid); } else
		if($or=="Ü" && $sari_toplam>1) { kazanma(2,$kid); } else
		if($or=="Alt 1.5" && $sari_toplam<2) { kazanma(2,$kid); } else
		if($or=="Üst 1.5" && $sari_toplam>1) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Toplam Sarı Kart 2.5 Alt/Üst") {
		if($or=="A" && $sari_toplam<3) { kazanma(2,$kid); } else
		if($or=="Ü" && $sari_toplam>2) { kazanma(2,$kid); } else
		if($or=="Alt 2.5" && $sari_toplam<3) { kazanma(2,$kid); } else
		if($or=="Üst 2.5" && $sari_toplam>2) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	}  else if($ot=="Toplam Sarı Kart 3.5 Alt/Üst") {
		if($or=="A" && $sari_toplam<4) { kazanma(2,$kid); } else
		if($or=="Ü" && $sari_toplam>3) { kazanma(2,$kid); } else
		if($or=="Alt 3.5" && $sari_toplam<4) { kazanma(2,$kid); } else
		if($or=="Üst 3.5" && $sari_toplam>3) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	}  else if($ot=="Toplam Sarı Kart 4.5 Alt/Üst") {
		if($or=="A" && $sari_toplam<5) { kazanma(2,$kid); } else
		if($or=="Ü" && $sari_toplam>4) { kazanma(2,$kid); } else
		if($or=="Alt 4.5" && $sari_toplam<5) { kazanma(2,$kid); } else
		if($or=="Üst 4.5" && $sari_toplam>4) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Kırmızı Kart Çıkarmı ?") {
		if($or=="E" && $kirmizi_toplam>0) { kazanma(2,$kid); } else
		if($or=="H" && $kirmizi_toplam==0) { kazanma(2,$kid); } else
		if($or=="Evet" && $kirmizi_toplam>0) { kazanma(2,$kid); } else
		if($or=="Hayır" && $kirmizi_toplam==0) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Kaç Penaltı Olur ?") {
		if($or=="0" && $penalti_toplam==0) { kazanma(2,$kid); } else
		if($or=="1" && $penalti_toplam==1) { kazanma(2,$kid); } else
		if($or=="2+" && $penalti_toplam>1) { kazanma(2,$kid); } else
		if($or=="Penaltı Yok" && $penalti_toplam==0) { kazanma(2,$kid); } else
		if($or=="1 Penaltı" && $penalti_toplam==1) { kazanma(2,$kid); } else
		if($or=="2 veya Üstü" && $penalti_toplam>1) { kazanma(2,$kid); } else 
		if($or=="2 veya üstü" && $penalti_toplam>1) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="1.Takım Toplam Sarı Kart 1.5 Alt/Üst") {
		if($or=="A" && $sari_ev<2) { kazanma(2,$kid); } else
		if($or=="Ü" && $sari_ev>1) { kazanma(2,$kid); } else
		if($or=="Alt 1.5" && $sari_ev<2) { kazanma(2,$kid); } else
		if($or=="Üst 1.5" && $sari_ev>1) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="1.Takım Toplam Sarı Kart 2.5 Alt/Üst") {
		if($or=="A" && $sari_ev<3) { kazanma(2,$kid); } else
		if($or=="Ü" && $sari_ev>2) { kazanma(2,$kid); } else
		if($or=="Alt 2.5" && $sari_ev<3) { kazanma(2,$kid); } else
		if($or=="Üst 2.5" && $sari_ev>2) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="1.Takım Toplam Sarı Kart 3.5 Alt/Üst") {
		if($or=="A" && $sari_ev<4) { kazanma(2,$kid); } else
		if($or=="Ü" && $sari_ev>3) { kazanma(2,$kid); } else
		if($or=="Alt 3.5" && $sari_ev<4) { kazanma(2,$kid); } else
		if($or=="Üst 3.5" && $sari_ev>3) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="2.Takım Toplam Sarı Kart 1.5 Alt/Üst") {
		if($or=="A" && $sari_dep<2) { kazanma(2,$kid); } else
		if($or=="Ü" && $sari_dep>1) { kazanma(2,$kid); } else
		if($or=="Alt 1.5" && $sari_dep<2) { kazanma(2,$kid); } else
		if($or=="Üst 1.5" && $sari_dep>1) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="2.Takım Toplam Sarı Kart 2.5 Alt/Üst") {
		if($or=="A" && $sari_dep<3) { kazanma(2,$kid); } else
		if($or=="Ü" && $sari_dep>2) { kazanma(2,$kid); } else
		if($or=="Alt 2.5" && $sari_dep<3) { kazanma(2,$kid); } else
		if($or=="Üst 2.5" && $sari_dep>2) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="2.Takım Toplam Sarı Kart 3.5 Alt/Üst") {
		if($or=="A" && $sari_dep<4) { kazanma(2,$kid); } else
		if($or=="Ü" && $sari_dep>3) { kazanma(2,$kid); } else
		if($or=="Alt 3.5" && $sari_dep<4) { kazanma(2,$kid); } else
		if($or=="Üst 3.5" && $sari_dep>3) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Sarı Kart Tek/Çift") {
		if($or=="T" && $sari_tekcift=="tek") { kazanma(2,$kid); } else
		if($or=="Ç" && $sari_tekcift=="cift") { kazanma(2,$kid); } else 
		if($or=="Tek" && $sari_tekcift=="tek") { kazanma(2,$kid); } else
		if($or=="Çift" && $sari_tekcift=="cift") { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Hangi Takım Çok Sarı Kart Yer ?") {
		if($or=="1" && $sari_ev>$sari_dep) { kazanma(2,$kid); } else
		if($or=="X" && $sari_ev==$sari_dep) { kazanma(2,$kid); } else
		if($or=="2" && $sari_ev<$sari_dep) { kazanma(2,$kid); } else
		if($or=="Ev Sahibi" && $sari_ev>$sari_dep) { kazanma(2,$kid); } else
		if($or=="Eşit" && $sari_ev==$sari_dep) { kazanma(2,$kid); } else
		if($or=="Deplasman" && $sari_ev<$sari_dep) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Toplam Korner 5.5 Alt/Üst") {
		if($or=="A" && $korner_toplam<6) { kazanma(2,$kid); } else
		if($or=="Ü" && $korner_toplam>5) { kazanma(2,$kid); } else
		if($or=="Alt 5.5" && $korner_toplam<6) { kazanma(2,$kid); } else
		if($or=="Üst 5.5" && $korner_toplam>5) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Toplam Korner 6.5 Alt/Üst") {
		if($or=="A" && $korner_toplam<7) { kazanma(2,$kid); } else
		if($or=="Ü" && $korner_toplam>6) { kazanma(2,$kid); } else
		if($or=="Alt 6.5" && $korner_toplam<7) { kazanma(2,$kid); } else
		if($or=="Üst 6.5" && $korner_toplam>6) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Toplam Korner 7.5 Alt/Üst") {
		if($or=="A" && $korner_toplam<8) { kazanma(2,$kid); } else
		if($or=="Ü" && $korner_toplam>7) { kazanma(2,$kid); } else
		if($or=="Alt 7.5" && $korner_toplam<8) { kazanma(2,$kid); } else
		if($or=="Üst 7.5" && $korner_toplam>7) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Toplam Korner 8.5 Alt/Üst") {
		if($or=="A" && $korner_toplam<9) { kazanma(2,$kid); } else
		if($or=="Ü" && $korner_toplam>8) { kazanma(2,$kid); } else
		if($or=="Alt 8.5" && $korner_toplam<9) { kazanma(2,$kid); } else
		if($or=="Üst 8.5" && $korner_toplam>8) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Toplam Korner 9.5 Alt/Üst") {
		if($or=="A" && $korner_toplam<10) { kazanma(2,$kid); } else
		if($or=="Ü" && $korner_toplam>9) { kazanma(2,$kid); } else
		if($or=="Alt 9.5" && $korner_toplam<10) { kazanma(2,$kid); } else
		if($or=="Üst 9.5" && $korner_toplam>9) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Toplam Korner 10.5 Alt/Üst") {
		if($or=="A" && $korner_toplam<11) { kazanma(2,$kid); } else
		if($or=="Ü" && $korner_toplam>10) { kazanma(2,$kid); } else
		if($or=="Alt 10.5" && $korner_toplam<11) { kazanma(2,$kid); } else
		if($or=="Üst 10.5" && $korner_toplam>10) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Toplam Korner 11.5 Alt/Üst") {
		if($or=="A" && $korner_toplam<12) { kazanma(2,$kid); } else
		if($or=="Ü" && $korner_toplam>11) { kazanma(2,$kid); } else
		if($or=="Alt 11.5" && $korner_toplam<12) { kazanma(2,$kid); } else
		if($or=="Üst 11.5" && $korner_toplam>11) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Toplam Korner 12.5 Alt/Üst") {
		if($or=="A" && $korner_toplam<13) { kazanma(2,$kid); } else
		if($or=="Ü" && $korner_toplam>12) { kazanma(2,$kid); } else
		if($or=="Alt 12.5" && $korner_toplam<13) { kazanma(2,$kid); } else
		if($or=="Üst 12.5" && $korner_toplam>12) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Toplam Korner 13.5 Alt/Üst") {
		if($or=="A" && $korner_toplam<14) { kazanma(2,$kid); } else
		if($or=="Ü" && $korner_toplam>13) { kazanma(2,$kid); } else
		if($or=="Alt 13.5" && $korner_toplam<14) { kazanma(2,$kid); } else
		if($or=="Üst 13.5" && $korner_toplam>13) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Toplam Korner 14.5 Alt/Üst") {
		if($or=="A" && $korner_toplam<15) { kazanma(2,$kid); } else
		if($or=="Ü" && $korner_toplam>14) { kazanma(2,$kid); } else
		if($or=="Alt 14.5" && $korner_toplam<15) { kazanma(2,$kid); } else
		if($or=="Üst 14.5" && $korner_toplam>14) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Toplam Korner 15.5 Alt/Üst") {
		if($or=="A" && $korner_toplam<16) { kazanma(2,$kid); } else
		if($or=="Ü" && $korner_toplam>15) { kazanma(2,$kid); } else
		if($or=="Alt 15.5" && $korner_toplam<16) { kazanma(2,$kid); } else
		if($or=="Üst 15.5" && $korner_toplam>15) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="1.Takım Toplam Korner 2.5 Alt/Üst") {
		if($or=="A" && $korner_ev<3) { kazanma(2,$kid); } else
		if($or=="Ü" && $korner_ev>2) { kazanma(2,$kid); } else
		if($or=="Alt 2.5" && $korner_ev<3) { kazanma(2,$kid); } else
		if($or=="Üst 2.5" && $korner_ev>2) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="1.Takım Toplam Korner 3.5 Alt/Üst") {
		if($or=="A" && $korner_ev<4) { kazanma(2,$kid); } else
		if($or=="Ü" && $korner_ev>3) { kazanma(2,$kid); } else
		if($or=="Alt 3.5" && $korner_ev<4) { kazanma(2,$kid); } else
		if($or=="Üst 3.5" && $korner_ev>3) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="1.Takım Toplam Korner 4.5 Alt/Üst") {
		if($or=="A" && $korner_ev<5) { kazanma(2,$kid); } else
		if($or=="Ü" && $korner_ev>4) { kazanma(2,$kid); } else
		if($or=="Alt 4.5" && $korner_ev<5) { kazanma(2,$kid); } else
		if($or=="Üst 4.5" && $korner_ev>4) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="1.Takım Toplam Korner 5.5 Alt/Üst") {
		if($or=="A" && $korner_ev<6) { kazanma(2,$kid); } else
		if($or=="Ü" && $korner_ev>5) { kazanma(2,$kid); } else
		if($or=="Alt 5.5" && $korner_ev<6) { kazanma(2,$kid); } else
		if($or=="Üst 5.5" && $korner_ev>5) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="1.Takım Toplam Korner 6.5 Alt/Üst") {
		if($or=="A" && $korner_ev<7) { kazanma(2,$kid); } else
		if($or=="Ü" && $korner_ev>6) { kazanma(2,$kid); } else
		if($or=="Alt 6.5" && $korner_ev<7) { kazanma(2,$kid); } else
		if($or=="Üst 6.5" && $korner_ev>6) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="1.Takım Toplam Korner 7.5 Alt/Üst") {
		if($or=="A" && $korner_ev<8) { kazanma(2,$kid); } else
		if($or=="Ü" && $korner_ev>7) { kazanma(2,$kid); } else
		if($or=="Alt 7.5" && $korner_ev<8) { kazanma(2,$kid); } else
		if($or=="Üst 7.5" && $korner_ev>7) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="1.Takım Toplam Korner 8.5 Alt/Üst") {
		if($or=="A" && $korner_ev<9) { kazanma(2,$kid); } else
		if($or=="Ü" && $korner_ev>8) { kazanma(2,$kid); } else
		if($or=="Alt 8.5" && $korner_ev<9) { kazanma(2,$kid); } else
		if($or=="Üst 8.5" && $korner_ev>8) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="1.Takım Toplam Korner 9.5 Alt/Üst") {
		if($or=="A" && $korner_ev<10) { kazanma(2,$kid); } else
		if($or=="Ü" && $korner_ev>9) { kazanma(2,$kid); } else
		if($or=="Alt 9.5" && $korner_ev<10) { kazanma(2,$kid); } else
		if($or=="Üst 9.5" && $korner_ev>9) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="1.Takım Toplam Korner 10.5 Alt/Üst") {
		if($or=="A" && $korner_ev<11) { kazanma(2,$kid); } else
		if($or=="Ü" && $korner_ev>10) { kazanma(2,$kid); } else
		if($or=="Alt 10.5" && $korner_ev<11) { kazanma(2,$kid); } else
		if($or=="Üst 10.5" && $korner_ev>10) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="2.Takım Toplam Korner 2.5 Alt/Üst") {
		if($or=="A" && $korner_dep<3) { kazanma(2,$kid); } else
		if($or=="Ü" && $korner_dep>2) { kazanma(2,$kid); } else
		if($or=="Alt 2.5" && $korner_dep<3) { kazanma(2,$kid); } else
		if($or=="Üst 2.5" && $korner_dep>2) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="2.Takım Toplam Korner 3.5 Alt/Üst") {
		if($or=="A" && $korner_dep<4) { kazanma(2,$kid); } else
		if($or=="Ü" && $korner_dep>3) { kazanma(2,$kid); } else
		if($or=="Alt 3.5" && $korner_dep<4) { kazanma(2,$kid); } else
		if($or=="Üst 3.5" && $korner_dep>3) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="2.Takım Toplam Korner 4.5 Alt/Üst") {
		if($or=="A" && $korner_dep<5) { kazanma(2,$kid); } else
		if($or=="Ü" && $korner_dep>4) { kazanma(2,$kid); } else
		if($or=="Alt 4.5" && $korner_dep<5) { kazanma(2,$kid); } else
		if($or=="Üst 4.5" && $korner_dep>4) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="2.Takım Toplam Korner 5.5 Alt/Üst") {
		if($or=="A" && $korner_dep<6) { kazanma(2,$kid); } else
		if($or=="Ü" && $korner_dep>5) { kazanma(2,$kid); } else
		if($or=="Alt 5.5" && $korner_dep<6) { kazanma(2,$kid); } else
		if($or=="Üst 5.5" && $korner_dep>5) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="2.Takım Toplam Korner 6.5 Alt/Üst") {
		if($or=="A" && $korner_dep<7) { kazanma(2,$kid); } else
		if($or=="Ü" && $korner_dep>6) { kazanma(2,$kid); } else
		if($or=="Alt 6.5" && $korner_dep<7) { kazanma(2,$kid); } else
		if($or=="Üst 6.5" && $korner_dep>6) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="2.Takım Toplam Korner 7.5 Alt/Üst") {
		if($or=="A" && $korner_dep<8) { kazanma(2,$kid); } else
		if($or=="Ü" && $korner_dep>7) { kazanma(2,$kid); } else
		if($or=="Alt 7.5" && $korner_dep<8) { kazanma(2,$kid); } else
		if($or=="Üst 7.5" && $korner_dep>7) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="2.Takım Toplam Korner 8.5 Alt/Üst") {
		if($or=="A" && $korner_dep<9) { kazanma(2,$kid); } else
		if($or=="Ü" && $korner_dep>8) { kazanma(2,$kid); } else
		if($or=="Alt 8.5" && $korner_dep<9) { kazanma(2,$kid); } else
		if($or=="Üst 8.5" && $korner_dep>8) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="2.Takım Toplam Korner 9.5 Alt/Üst") {
		if($or=="A" && $korner_dep<10) { kazanma(2,$kid); } else
		if($or=="Ü" && $korner_dep>9) { kazanma(2,$kid); } else
		if($or=="Alt 9.5" && $korner_dep<10) { kazanma(2,$kid); } else
		if($or=="Üst 9.5" && $korner_dep>9) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="2.Takım Toplam Korner 10.5 Alt/Üst") {
		if($or=="A" && $korner_dep<11) { kazanma(2,$kid); } else
		if($or=="Ü" && $korner_dep>10) { kazanma(2,$kid); } else
		if($or=="Alt 10.5" && $korner_dep<11) { kazanma(2,$kid); } else
		if($or=="Üst 10.5" && $korner_dep>10) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Korner Tek/Çift") {
		if($or=="T" && $korner_tekcift=="tek") { kazanma(2,$kid); } else
		if($or=="Ç" && $korner_tekcift=="cift") { kazanma(2,$kid); } else 
		if($or=="Tek" && $korner_tekcift=="tek") { kazanma(2,$kid); } else
		if($or=="Çift" && $korner_tekcift=="cift") { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Hangi Takım Daha Çok Korner Kullanır ?") {
		if($or=="1" && $korner_ev>$korner_dep) { kazanma(2,$kid); } else
		if($or=="X" && $korner_ev==$korner_dep) { kazanma(2,$kid); } else 
		if($or=="2" && $korner_ev<$korner_dep) { kazanma(2,$kid); } else
		if($or=="Ev Sahibi" && $korner_ev>$korner_dep) { kazanma(2,$kid); } else
		if($or=="Eşit" && $korner_ev==$korner_dep) { kazanma(2,$kid); } else 
		if($or=="Deplasman" && $korner_ev<$korner_dep) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="1X2") {
		if($or=="1" && $ms_ev>$ms_konuk) { kazanma(2,$kid); } else
		if($or=="X" && $ms_ev==$ms_konuk) { kazanma(2,$kid); } else
		if($or=="2" && $ms_ev<$ms_konuk) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Handikap 1:0") {
		if($or=="1" && $ms_ev_h1 > $konuk_skor) { kazanma(2,$kid); } else
		if($or=="X" && $ms_ev_h1 == $konuk_skor) { kazanma(2,$kid); } else
		if($or=="2" && $ms_ev_h1 < $konuk_skor) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Handikap 2:0") {
		if($or=="1" && $ms_ev_h2 > $konuk_skor) { kazanma(2,$kid); } else
		if($or=="X" && $ms_ev_h2 == $konuk_skor) { kazanma(2,$kid); } else
		if($or=="2" && $ms_ev_h2 < $konuk_skor) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Handikap 0:1") {
		if($or=="1" && $ms_ev > $ms_konuk_h1) { kazanma(2,$kid); } else
		if($or=="X" && $ms_ev == $ms_konuk_h1) { kazanma(2,$kid); } else
		if($or=="2" && $ms_ev < $ms_konuk_h1) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Handikap 0:2") {
		if($or=="1" && $ms_ev > $ms_konuk_h2) { kazanma(2,$kid); } else
		if($or=="X" && $ms_ev == $ms_konuk_h2) { kazanma(2,$kid); } else
		if($or=="2" && $ms_ev < $ms_konuk_h2) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot == "Çifte Şans") {
		if($or=="1X" && ($ms_ev>$ms_konuk || $ms_ev==$ms_konuk)) { kazanma(2,$kid); } else
		if($or=="12" && ($ms_ev>$ms_konuk || $ms_ev<$ms_konuk)) { kazanma(2,$kid); } else
		if($or=="X2" && ($ms_ev<$ms_konuk || $ms_ev==$ms_konuk)) { kazanma(2,$kid); } else
		if($or=="1 veya X" && ($ms_ev>$ms_konuk || $ms_ev==$ms_konuk)) { kazanma(2,$kid); } else
		if($or=="1 veya 2" && ($ms_ev>$ms_konuk || $ms_ev<$ms_konuk)) { kazanma(2,$kid); } else
		if($or=="X veya 2" && ($ms_ev<$ms_konuk || $ms_ev==$ms_konuk)) { kazanma(2,$kid); } else
		if($or=="1 ve X" && ($ms_ev>$ms_konuk || $ms_ev==$ms_konuk)) { kazanma(2,$kid); } else
		if($or=="1 ve 2" && ($ms_ev>$ms_konuk || $ms_ev<$ms_konuk)) { kazanma(2,$kid); } else
		if($or=="X ve 2" && ($ms_ev<$ms_konuk || $ms_ev==$ms_konuk)) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot == "1.Yarı Çifte Şans") {
		if($or=="1X" && ($iy_ev>$iy_konuk || $iy_ev==$iy_konuk)) { kazanma(2,$kid); } else
		if($or=="12" && ($iy_ev>$iy_konuk || $iy_ev<$iy_konuk)) { kazanma(2,$kid); } else
		if($or=="X2" && ($iy_ev<$iy_konuk || $iy_ev==$iy_konuk)) { kazanma(2,$kid); } else
		if($or=="1 veya X" && ($iy_ev>$iy_konuk || $iy_ev==$iy_konuk)) { kazanma(2,$kid); } else
		if($or=="1 veya 2" && ($iy_ev>$iy_konuk || $iy_ev<$iy_konuk)) { kazanma(2,$kid); } else
		if($or=="X veya 2" && ($iy_ev<$iy_konuk || $iy_ev==$iy_konuk)) { kazanma(2,$kid); } else
		if($or=="1 ve X" && ($iy_ev>$iy_konuk || $iy_ev==$iy_konuk)) { kazanma(2,$kid); } else
		if($or=="1 ve 2" && ($iy_ev>$iy_konuk || $iy_ev<$iy_konuk)) { kazanma(2,$kid); } else
		if($or=="X ve 2" && ($iy_ev<$iy_konuk || $iy_ev==$iy_konuk)) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="1.Yarı 0.5 Gol Alt Üst") {
		if($or=="A" && $iy_toplam_gol<1) { kazanma(2,$kid); } else
		if($or=="Ü" && $iy_toplam_gol>0) { kazanma(2,$kid); } else 
		if($or=="Alt 0.5" && $iy_toplam_gol<1) { kazanma(2,$kid); } else
		if($or=="Üst 0.5" && $iy_toplam_gol>0) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="1.Yarı 1.5 Gol Alt Üst") {
		if($or=="A" && $iy_toplam_gol<2) { kazanma(2,$kid); } else
		if($or=="Ü" && $iy_toplam_gol>1) { kazanma(2,$kid); } else 
		if($or=="Alt 1.5" && $iy_toplam_gol<2) { kazanma(2,$kid); } else
		if($or=="Üst 1.5" && $iy_toplam_gol>1) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="1.Yarı 2.5 Gol Alt Üst") {
		if($or=="A" && $iy_toplam_gol<3) { kazanma(2,$kid); } else
		if($or=="Ü" && $iy_toplam_gol>2) { kazanma(2,$kid); } else 
		if($or=="Alt 2.5" && $iy_toplam_gol<3) { kazanma(2,$kid); } else
		if($or=="Üst 2.5" && $iy_toplam_gol>2) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Toplam 0.5 Gol Alt Üst") {
		if($or=="A" && $ms_toplam_gol<1) { kazanma(2,$kid); } else
		if($or=="Ü" && $ms_toplam_gol>0) { kazanma(2,$kid); } else 
		if($or=="Alt 0.5" && $ms_toplam_gol<1) { kazanma(2,$kid); } else
		if($or=="Üst 0.5" && $ms_toplam_gol>0) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Toplam 1.5 Gol Alt Üst") {
		if($or=="A" && $ms_toplam_gol<2) { kazanma(2,$kid); } else
		if($or=="Ü" && $ms_toplam_gol>1) { kazanma(2,$kid); } else 
		if($or=="Alt 1.5" && $ms_toplam_gol<2) { kazanma(2,$kid); } else
		if($or=="Üst 1.5" && $ms_toplam_gol>1) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Toplam 2.5 Gol Alt Üst") {
		if($or=="A" && $ms_toplam_gol<3) { kazanma(2,$kid); } else
		if($or=="Ü" && $ms_toplam_gol>2) { kazanma(2,$kid); } else 
		if($or=="Alt 2.5" && $ms_toplam_gol<3) { kazanma(2,$kid); } else
		if($or=="Üst 2.5" && $ms_toplam_gol>2) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Toplam 3.5 Gol Alt Üst") {
		if($or=="A" && $ms_toplam_gol<4) { kazanma(2,$kid); } else
		if($or=="Ü" && $ms_toplam_gol>3) { kazanma(2,$kid); } else 
		if($or=="Alt 3.5" && $ms_toplam_gol<4) { kazanma(2,$kid); } else
		if($or=="Üst 3.5" && $ms_toplam_gol>3) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Toplam 4.5 Gol Alt Üst") {
		if($or=="A" && $ms_toplam_gol<5) { kazanma(2,$kid); } else
		if($or=="Ü" && $ms_toplam_gol>4) { kazanma(2,$kid); } else 
		if($or=="Alt 4.5" && $ms_toplam_gol<5) { kazanma(2,$kid); } else
		if($or=="Üst 4.5" && $ms_toplam_gol>4) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Toplam 5.5 Gol Alt Üst") {
		if($or=="A" && $ms_toplam_gol<6) { kazanma(2,$kid); } else
		if($or=="Ü" && $ms_toplam_gol>5) { kazanma(2,$kid); } else 
		if($or=="Alt 5.5" && $ms_toplam_gol<6) { kazanma(2,$kid); } else
		if($or=="Üst 5.5" && $ms_toplam_gol>5) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Toplam 6.5 Gol Alt Üst") {
		if($or=="A" && $ms_toplam_gol<7) { kazanma(2,$kid); } else
		if($or=="Ü" && $ms_toplam_gol>6) { kazanma(2,$kid); } else 
		if($or=="Alt 6.5" && $ms_toplam_gol<7) { kazanma(2,$kid); } else
		if($or=="Üst 6.5" && $ms_toplam_gol>6) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Toplam 7.5 Gol Alt Üst") {
		if($or=="A" && $ms_toplam_gol<8) { kazanma(2,$kid); } else
		if($or=="Ü" && $ms_toplam_gol>7) { kazanma(2,$kid); } else 
		if($or=="Alt 7.5" && $ms_toplam_gol<8) { kazanma(2,$kid); } else
		if($or=="Üst 7.5" && $ms_toplam_gol>7) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Toplam 8.5 Gol Alt Üst") {
		if($or=="A" && $ms_toplam_gol<9) { kazanma(2,$kid); } else
		if($or=="Ü" && $ms_toplam_gol>8) { kazanma(2,$kid); } else 
		if($or=="Alt 8.5" && $ms_toplam_gol<9) { kazanma(2,$kid); } else
		if($or=="Üst 8.5" && $ms_toplam_gol>8) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="2.Yarı 0.5 Gol Alt Üst") {
		if($or=="A" && $ik_toplam_gol<1) { kazanma(2,$kid); } else
		if($or=="Ü" && $ik_toplam_gol>0) { kazanma(2,$kid); } else 
		if($or=="Alt 0.5" && $ik_toplam_gol<1) { kazanma(2,$kid); } else
		if($or=="Üst 0.5" && $ik_toplam_gol>0) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="2.Yarı 1.5 Gol Alt Üst") {
		if($or=="A" && $ik_toplam_gol<2) { kazanma(2,$kid); } else
		if($or=="Ü" && $ik_toplam_gol>1) { kazanma(2,$kid); } else 
		if($or=="Alt 1.5" && $ik_toplam_gol<2) { kazanma(2,$kid); } else
		if($or=="Üst 1.5" && $ik_toplam_gol>1) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="2.Yarı 2.5 Gol Alt Üst") {
		if($or=="A" && $ik_toplam_gol<3) { kazanma(2,$kid); } else
		if($or=="Ü" && $ik_toplam_gol>2) { kazanma(2,$kid); } else 
		if($or=="Alt 2.5" && $ik_toplam_gol<3) { kazanma(2,$kid); } else
		if($or=="Üst 2.5" && $ik_toplam_gol>2) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="2.Yarı 3.5 Gol Alt Üst") {
		if($or=="A" && $ik_toplam_gol<4) { kazanma(2,$kid); } else
		if($or=="Ü" && $ik_toplam_gol>3) { kazanma(2,$kid); } else 
		if($or=="Alt 3.5" && $ik_toplam_gol<4) { kazanma(2,$kid); } else
		if($or=="Üst 3.5" && $ik_toplam_gol>3) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Karşılıklı Gol Olurmu ?") {
		if($or=="E" && $ms_ev>0 && $ms_konuk>0) { kazanma(2,$kid); } else
		if($or=="H" && ($ms_ev<1 || $ms_konuk<1)) { kazanma(2,$kid); } else 
		if($or=="Evet" && $ms_ev>0 && $ms_konuk>0) { kazanma(2,$kid); } else
		if($or=="Hayır" && ($ms_ev<1 || $ms_konuk<1)) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Ev Sahibi Müsabakada Gol Atarmı ?") {
		if($or=="E" && $ms_ev>0) { kazanma(2,$kid); } else
		if($or=="H" && $ms_ev<1) { kazanma(2,$kid); } else 
		if($or=="Evet" && $ms_ev>0) { kazanma(2,$kid); } else
		if($or=="Hayır" && $ms_ev<1) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Deplasman Müsabakada Gol Atarmı ?") {
		if($or=="E" && $ms_konuk>0) { kazanma(2,$kid); } else
		if($or=="H" && $ms_konuk<1) { kazanma(2,$kid); } else 
		if($or=="Evet" && $ms_konuk>0) { kazanma(2,$kid); } else
		if($or=="Hayır" && $ms_konuk<1) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Toplam Gol Tek / Çift") {
		if($or=="T" && $ms_tekcift=="tek") { kazanma(2,$kid); } else
		if($or=="Ç" && $ms_tekcift=="cift") { kazanma(2,$kid); } else 
		if($or=="Tek" && $ms_tekcift=="tek") { kazanma(2,$kid); } else
		if($or=="Çift" && $ms_tekcift=="cift") { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="1.Yarı Tek / Çift") {
		if($or=="T" && $iy_tekcift=="tek") { kazanma(2,$kid); } else
		if($or=="Ç" && $iy_tekcift=="cift") { kazanma(2,$kid); } else 
		if($or=="Tek" && $iy_tekcift=="tek") { kazanma(2,$kid); } else
		if($or=="Çift" && $iy_tekcift=="cift") { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="1.Yarı Karşılıklı Gol") {
		if($or=="E" && $iy_ev>0 && $iy_konuk>0) { kazanma(2,$kid); } else
		if($or=="H" && ($iy_ev<1 || $iy_konuk<1)) { kazanma(2,$kid); } else 
		if($or=="Evet" && $iy_ev>0 && $iy_konuk>0) { kazanma(2,$kid); } else
		if($or=="Hayır" && ($iy_ev<1 || $iy_konuk<1)) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Maç Sonucu ve Karşılıklı Gol") {
		if($or=="Ev Gol Yiyerek Kazanır" && (($ev_skor > $konuk_skor) && ($ev_skor > 0 && $konuk_skor > 0))) { kazanma(2,$kid); } else
		if($or=="Dep Gol Yiyerek Kazanır" && (($konuk_skor > $ev_skor) && ($ev_skor > 0 && $konuk_skor > 0))) { kazanma(2,$kid); } else
		if($or=="Ev Gol Yemeden Kazanır" && (($ev_skor > $konuk_skor) && ($konuk_skor == 0))) { kazanma(2,$kid); } else
		if($or=="Dep Gol Yemeden Kazanır" && (($konuk_skor > $ev_skor) && ($ev_skor == 0))) { kazanma(2,$kid); } else
		if($or=="İki takım da gol atamaz" && $ms_toplam_gol == 0) { kazanma(2,$kid); } else
		if($or=="İki takım da gol atar ve berabere biter" && (($ev_skor > 0 && $konuk_skor > 0) && $ev_skor == $konuk_skor)) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Ev Sahibi 0.5 Gol Alt Üst") {
		if($or=="A" && $ms_ev<1) { kazanma(2,$kid); } else
		if($or=="Ü" && $ms_ev>0) { kazanma(2,$kid); } else 
		if($or=="Alt 0.5" && $ms_ev<1) { kazanma(2,$kid); } else
		if($or=="Üst 0.5" && $ms_ev>0) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Ev Sahibi 1.5 Gol Alt Üst") {
		if($or=="A" && $ms_ev<2) { kazanma(2,$kid); } else
		if($or=="Ü" && $ms_ev>1) { kazanma(2,$kid); } else 
		if($or=="Alt 1.5" && $ms_ev<2) { kazanma(2,$kid); } else
		if($or=="Üst 1.5" && $ms_ev>1) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Ev Sahibi 2.5 Gol Alt Üst") {
		if($or=="A" && $ms_ev<3) { kazanma(2,$kid); } else
		if($or=="Ü" && $ms_ev>2) { kazanma(2,$kid); } else 
		if($or=="Alt 2.5" && $ms_ev<3) { kazanma(2,$kid); } else
		if($or=="Üst 2.5" && $ms_ev>2) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Deplasman 0.5 Gol Alt Üst") {
		if($or=="A" && $ms_konuk<1) { kazanma(2,$kid); } else
		if($or=="Ü" && $ms_konuk>0) { kazanma(2,$kid); } else 
		if($or=="Alt 0.5" && $ms_konuk<1) { kazanma(2,$kid); } else
		if($or=="Üst 0.5" && $ms_konuk>0) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Deplasman 1.5 Gol Alt Üst") {
		if($or=="A" && $ms_konuk<2) { kazanma(2,$kid); } else
		if($or=="Ü" && $ms_konuk>1) { kazanma(2,$kid); } else 
		if($or=="Alt 1.5" && $ms_konuk<2) { kazanma(2,$kid); } else
		if($or=="Üst 1.5" && $ms_konuk>1) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Deplasman 2.5 Gol Alt Üst") {
		if($or=="A" && $ms_konuk<3) { kazanma(2,$kid); } else
		if($or=="Ü" && $ms_konuk>2) { kazanma(2,$kid); } else 
		if($or=="Alt 2.5" && $ms_konuk<3) { kazanma(2,$kid); } else
		if($or=="Üst 2.5" && $ms_konuk>2) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Toplam Kaç Gol Atılır ?") {
		if($or=="1" && $ms_toplam_gol == 1) { kazanma(2,$kid); } else
		if($or=="2" && $ms_toplam_gol == 2) { kazanma(2,$kid); } else
		if($or=="3" && $ms_toplam_gol == 3) { kazanma(2,$kid); } else
		if($or=="4" && $ms_toplam_gol == 4) { kazanma(2,$kid); } else
		if($or=="5" && $ms_toplam_gol == 5) { kazanma(2,$kid); } else
		if($or=="6" && $ms_toplam_gol == 6) { kazanma(2,$kid); } else
		if($or=="7" && $ms_toplam_gol == 7) { kazanma(2,$kid); } else
		if($or=="1 Gol" && $ms_toplam_gol == 1) { kazanma(2,$kid); } else
		if($or=="2 Gol" && $ms_toplam_gol == 2) { kazanma(2,$kid); } else
		if($or=="3 Gol" && $ms_toplam_gol == 3) { kazanma(2,$kid); } else
		if($or=="4 Gol" && $ms_toplam_gol == 4) { kazanma(2,$kid); } else
		if($or=="5 Gol" && $ms_toplam_gol == 5) { kazanma(2,$kid); } else
		if($or=="6 Gol" && $ms_toplam_gol == 6) { kazanma(2,$kid); } else
		if($or=="7 Gol" && $ms_toplam_gol == 7) { kazanma(2,$kid); } else
		if($or=="8 veya üstü" && $ms_toplam_gol > 7) { kazanma(2,$kid); } else
		if($or=="Gol Yok" && $ms_toplam_gol == 0) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Ev Sahibi Toplam Kaç Gol Atar ?") {
		if($or=="1" && $ev_skor==1) { kazanma(2,$kid); } else
		if($or=="2" && $ev_skor==2) { kazanma(2,$kid); } else
		if($or=="1 Gol" && $ev_skor==1) { kazanma(2,$kid); } else
		if($or=="2 Gol" && $ev_skor==2) { kazanma(2,$kid); } else
		if($or=="3 veya üstü" && $ev_skor > 2) { kazanma(2,$kid); } else
		if($or=="Gol Yok" && $ev_skor==0) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Deplasman Toplam Kaç Gol Atar ?") {
		if($or=="1" && $konuk_skor==1) { kazanma(2,$kid); } else
		if($or=="2" && $konuk_skor==2) { kazanma(2,$kid); } else
		if($or=="1 Gol" && $konuk_skor==1) { kazanma(2,$kid); } else
		if($or=="2 Gol" && $konuk_skor==2) { kazanma(2,$kid); } else
		if($or=="3 veya üstü" && $konuk_skor > 2) { kazanma(2,$kid); } else
		if($or=="Gol Yok" && $konuk_skor==0) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="1.Yarı Skoru") {
		if($or=="0:0" && $iy_ev == 0 && $iy_konuk == 0) { kazanma(2,$kid); } else
		if($or=="1:0" && $iy_ev == 1 && $iy_konuk == 0) { kazanma(2,$kid); } else
		if($or=="1:1" && $iy_ev == 1 && $iy_konuk == 1) { kazanma(2,$kid); } else
		if($or=="0:1" && $iy_ev == 0 && $iy_konuk == 1) { kazanma(2,$kid); } else
		if($or=="2:0" && $iy_ev == 2 && $iy_konuk == 0) { kazanma(2,$kid); } else
		if($or=="2:1" && $iy_ev == 2 && $iy_konuk == 1) { kazanma(2,$kid); } else
		if($or=="2:2" && $iy_ev == 2 && $iy_konuk == 2) { kazanma(2,$kid); } else
		if($or=="1:2" && $iy_ev == 1 && $iy_konuk == 2) { kazanma(2,$kid); } else
		if($or=="0:2" && $iy_ev == 0 && $iy_konuk == 2) { kazanma(2,$kid); } else
		if($or=="3:0" && $iy_ev == 3 && $iy_konuk == 0) { kazanma(2,$kid); } else
		if($or=="3:1" && $iy_ev == 3 && $iy_konuk == 1) { kazanma(2,$kid); } else
		if($or=="3:2" && $iy_ev == 3 && $iy_konuk == 2) { kazanma(2,$kid); } else
		if($or=="3:3" && $iy_ev == 3 && $iy_konuk == 3) { kazanma(2,$kid); } else
        if($or=="2:3" && $iy_ev == 2 && $iy_konuk == 3) { kazanma(2,$kid); } else
		if($or=="1:3" && $iy_ev == 1 && $iy_konuk == 3) { kazanma(2,$kid); } else
		if($or=="0:3" && $iy_ev == 0 && $iy_konuk == 3) { kazanma(2,$kid); } else
		if($or=="4:0" && $iy_ev == 4 && $iy_konuk == 0) { kazanma(2,$kid); } else
		if($or=="4:1" && $iy_ev == 4 && $iy_konuk == 1) { kazanma(2,$kid); } else
		if($or=="4:2" && $iy_ev == 4 && $iy_konuk == 2) { kazanma(2,$kid); } else
		if($or=="4:3" && $iy_ev == 4 && $iy_konuk == 3) { kazanma(2,$kid); } else
		if($or=="4:4" && $iy_ev == 4 && $iy_konuk == 4) { kazanma(2,$kid); } else
		if($or=="3:4" && $iy_ev == 3 && $iy_konuk == 4) { kazanma(2,$kid); } else
		if($or=="2:4" && $iy_ev == 2 && $iy_konuk == 4) { kazanma(2,$kid); } else
		if($or=="1:4" && $iy_ev == 1 && $iy_konuk == 4) { kazanma(2,$kid); } else
		if($or=="0:4" && $iy_ev == 0 && $iy_konuk == 4) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Maç Skoru") {
		if($or=="0:0" && $ev_skor == 0 && $konuk_skor == 0) { kazanma(2,$kid); } else
		if($or=="1:0" && $ev_skor == 1 && $konuk_skor == 0) { kazanma(2,$kid); } else
		if($or=="1:1" && $ev_skor == 1 && $konuk_skor == 1) { kazanma(2,$kid); } else
		if($or=="0:1" && $ev_skor == 0 && $konuk_skor == 1) { kazanma(2,$kid); } else
		if($or=="2:0" && $ev_skor == 2 && $konuk_skor == 0) { kazanma(2,$kid); } else
		if($or=="2:1" && $ev_skor == 2 && $konuk_skor == 1) { kazanma(2,$kid); } else
		if($or=="2:2" && $ev_skor == 2 && $konuk_skor == 2) { kazanma(2,$kid); } else
		if($or=="1:2" && $ev_skor == 1 && $konuk_skor == 2) { kazanma(2,$kid); } else
		if($or=="0:2" && $ev_skor == 0 && $konuk_skor == 2) { kazanma(2,$kid); } else
		if($or=="3:0" && $ev_skor == 3 && $konuk_skor == 0) { kazanma(2,$kid); } else
		if($or=="3:1" && $ev_skor == 3 && $konuk_skor == 1) { kazanma(2,$kid); } else
		if($or=="3:2" && $ev_skor == 3 && $konuk_skor == 2) { kazanma(2,$kid); } else
		if($or=="3:3" && $ev_skor == 3 && $konuk_skor == 3) { kazanma(2,$kid); } else
		if($or=="2:3" && $ev_skor == 2 && $konuk_skor == 3) { kazanma(2,$kid); } else
		if($or=="1:3" && $ev_skor == 1 && $konuk_skor == 3) { kazanma(2,$kid); } else
		if($or=="0:3" && $ev_skor == 0 && $konuk_skor == 3) { kazanma(2,$kid); } else
		if($or=="4:0" && $ev_skor == 4 && $konuk_skor == 0) { kazanma(2,$kid); } else
		if($or=="4:1" && $ev_skor == 4 && $konuk_skor == 1) { kazanma(2,$kid); } else
		if($or=="4:2" && $ev_skor == 4 && $konuk_skor == 2) { kazanma(2,$kid); } else
		if($or=="4:3" && $ev_skor == 4 && $konuk_skor == 3) { kazanma(2,$kid); } else
		if($or=="4:4" && $ev_skor == 4 && $konuk_skor == 4) { kazanma(2,$kid); } else
		if($or=="3:4" && $ev_skor == 3 && $konuk_skor == 4) { kazanma(2,$kid); } else
		if($or=="2:4" && $ev_skor == 2 && $konuk_skor == 4) { kazanma(2,$kid); } else
		if($or=="1:4" && $ev_skor == 1 && $konuk_skor == 4) { kazanma(2,$kid); } else
		if($or=="0:4" && $ev_skor == 0 && $konuk_skor == 4) { kazanma(2,$kid); } else
		if($or=="Başka bir sonuç" && ($ev_skor > 4 || $konuk_skor > 4)) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Ev Sahibi 1.Yarı 0.5 Gol Alt Üst") {
		if($or=="A" && $iy_ev<1) { kazanma(2,$kid); } else
		if($or=="Ü" && $iy_ev>0) { kazanma(2,$kid); } else 
		if($or=="Alt 0.5" && $iy_ev<1) { kazanma(2,$kid); } else
		if($or=="Üst 0.5" && $iy_ev>0) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Ev Sahibi 1.Yarı 1.5 Gol Alt Üst") {
		if($or=="A" && $iy_ev<2) { kazanma(2,$kid); } else
		if($or=="Ü" && $iy_ev>1) { kazanma(2,$kid); } else 
		if($or=="Alt 1.5" && $iy_ev<2) { kazanma(2,$kid); } else
		if($or=="Üst 1.5" && $iy_ev>1) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Ev Sahibi 1.Yarı 2.5 Gol Alt Üst") {
		if($or=="A" && $iy_ev<3) { kazanma(2,$kid); } else
		if($or=="Ü" && $iy_ev>2) { kazanma(2,$kid); } else 
		if($or=="Alt 2.5" && $iy_ev<3) { kazanma(2,$kid); } else
		if($or=="Üst 2.5" && $iy_ev>2) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Deplasman 1.Yarı 0.5 Gol Alt Üst") {
		if($or=="A" && $iy_konuk<1) { kazanma(2,$kid); } else
		if($or=="Ü" && $iy_konuk>0) { kazanma(2,$kid); } else 
		if($or=="Alt 0.5" && $iy_konuk<1) { kazanma(2,$kid); } else
		if($or=="Üst 0.5" && $iy_konuk>0) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Deplasman 1.Yarı 1.5 Gol Alt Üst") {
		if($or=="A" && $iy_konuk<2) { kazanma(2,$kid); } else
		if($or=="Ü" && $iy_konuk>1) { kazanma(2,$kid); } else 
		if($or=="Alt 1.5" && $iy_konuk<2) { kazanma(2,$kid); } else
		if($or=="Üst 1.5" && $iy_konuk>1) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Deplasman 1.Yarı 2.5 Gol Alt Üst") {
		if($or=="A" && $iy_konuk<3) { kazanma(2,$kid); } else
		if($or=="Ü" && $iy_konuk>2) { kazanma(2,$kid); } else 
		if($or=="Alt 2.5" && $iy_konuk<3) { kazanma(2,$kid); } else
		if($or=="Üst 2.5" && $iy_konuk>2) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Ev Sahibi İlk Yarı Tam Gol Sayısı") {
		if($or=="Gol Yok" && $iy_ev==0) { kazanma(2,$kid); } else
		if($or=="1" && $iy_ev==1) { kazanma(2,$kid); } else 
		if($or=="2" && $iy_ev==2) { kazanma(2,$kid); } else 
		if($or=="1 Gol" && $iy_ev==1) { kazanma(2,$kid); } else 
		if($or=="2 Gol" && $iy_ev==2) { kazanma(2,$kid); } else 
		if($or=="3 veya üstü" && $iy_ev>2) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Ev Sahibi İkinci Yarı Tam Gol Sayısı") {
		if($or=="Gol Yok" && $ik_ev==0) { kazanma(2,$kid); } else
		if($or=="1" && $ik_ev==1) { kazanma(2,$kid); } else 
		if($or=="2" && $ik_ev==2) { kazanma(2,$kid); } else 
		if($or=="1 Gol" && $ik_ev==1) { kazanma(2,$kid); } else 
		if($or=="2 Gol" && $ik_ev==2) { kazanma(2,$kid); } else 
		if($or=="3 veya üstü" && $ik_ev>2) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Deplasman İlk Yarı Tam Gol Sayısı") {
		if($or=="Gol Yok" && $iy_konuk==0) { kazanma(2,$kid); } else
		if($or=="1" && $iy_konuk==1) { kazanma(2,$kid); } else 
		if($or=="2" && $iy_konuk==2) { kazanma(2,$kid); } else 
		if($or=="1 Gol" && $iy_konuk==1) { kazanma(2,$kid); } else 
		if($or=="2 Gol" && $iy_konuk==2) { kazanma(2,$kid); } else 
		if($or=="3 veya üstü" && $iy_konuk>2) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Deplasman İkinci Yarı Tam Gol Sayısı") {
		if($or=="Gol Yok" && $ik_konuk==0) { kazanma(2,$kid); } else
		if($or=="1" && $ik_konuk==1) { kazanma(2,$kid); } else 
		if($or=="2" && $ik_konuk==2) { kazanma(2,$kid); } else 
		if($or=="1 Gol" && $ik_konuk==1) { kazanma(2,$kid); } else 
		if($or=="2 Gol" && $ik_konuk==2) { kazanma(2,$kid); } else 
		if($or=="3 veya üstü" && $ik_konuk>2) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Herhangi Bir Takım 1 Gol Farkla Kazanirmi ?") {
		if($or=="E" && $birgol_fark==1) { kazanma(2,$kid); } else
		if($or=="H" && $birgol_fark==0) { kazanma(2,$kid); } else 
		if($or=="Evet" && $birgol_fark==1) { kazanma(2,$kid); } else
		if($or=="Hayır" && $birgol_fark==0) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Herhangi Bir Takım 2 Gol Farkla Kazanirmi ?") {
		if($or=="E" && $ikigol_fark==1) { kazanma(2,$kid); } else
		if($or=="H" && $ikigol_fark==0) { kazanma(2,$kid); } else 
		if($or=="Evet" && $ikigol_fark==1) { kazanma(2,$kid); } else
		if($or=="Hayır" && $ikigol_fark==0) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Herhangi Bir Takım 3 Gol Farkla Kazanirmi ?") {
		if($or=="E" && $ucgol_fark==1) { kazanma(2,$kid); } else
		if($or=="H" && $ucgol_fark==0) { kazanma(2,$kid); } else 
		if($or=="Evet" && $ucgol_fark==1) { kazanma(2,$kid); } else
		if($or=="Hayır" && $ucgol_fark==0) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="1.Yarı Sonucu") {
		if($or=="1" && $iy_ev>$iy_konuk) { kazanma(2,$kid); } else
		if($or=="X" && $iy_ev==$iy_konuk) { kazanma(2,$kid); } else
		if($or=="2" && $iy_ev<$iy_konuk) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="2.Yarı Sonucu") {
		if($or=="1" && $ik_ev>$ik_konuk) { kazanma(2,$kid); } else
		if($or=="X" && $ik_ev==$ik_konuk) { kazanma(2,$kid); } else
		if($or=="2" && $ik_ev<$ik_konuk) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="İlk Yarıda Kaç Gol Olur ?") {
		if($or=="Gol Yok" && $iy_toplam_gol==0) { kazanma(2,$kid); } else
		if($or=="1" && $iy_toplam_gol==1) { kazanma(2,$kid); } else
		if($or=="2" && $iy_toplam_gol==2) { kazanma(2,$kid); } else
		if($or=="1 Gol" && $iy_toplam_gol==1) { kazanma(2,$kid); } else
		if($or=="2 Gol" && $iy_toplam_gol==2) { kazanma(2,$kid); } else
		if($or=="3 veya üstü" && $iy_toplam_gol>2) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="2.Yarıda Toplam Kaç Gol Olur ?") {
		if($or=="Gol Yok" && $ik_toplam_gol==0) { kazanma(2,$kid); } else
		if($or=="1" && $ik_toplam_gol==1) { kazanma(2,$kid); } else
		if($or=="2" && $ik_toplam_gol==2) { kazanma(2,$kid); } else
		if($or=="1 Gol" && $ik_toplam_gol==1) { kazanma(2,$kid); } else
		if($or=="2 Gol" && $ik_toplam_gol==2) { kazanma(2,$kid); } else
		if($or=="3 veya üstü" && $ik_toplam_gol>2) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Müsabakada kaç gol atılır? (0-4)") {
		if($or=="0-1" && $ms_toplam_gol == 0) { kazanma(2,$kid); } else
		if($or=="0-1" && $ms_toplam_gol == 1) { kazanma(2,$kid); } else
		if($or=="2-3" && $ms_toplam_gol == 2) { kazanma(2,$kid); } else
		if($or=="2-3" && $ms_toplam_gol == 3) { kazanma(2,$kid); } else
		if($or=="4 veya üstü" && $ms_toplam_gol > 3) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Müsabakada kaç gol atılır? (0-5)") {
		if($or=="0-2" && $ms_toplam_gol == 0) { kazanma(2,$kid); } else
		if($or=="0-2" && $ms_toplam_gol == 1) { kazanma(2,$kid); } else
		if($or=="0-2" && $ms_toplam_gol == 2) { kazanma(2,$kid); } else
		if($or=="3-4" && $ms_toplam_gol == 3) { kazanma(2,$kid); } else
		if($or=="3-4" && $ms_toplam_gol == 4) { kazanma(2,$kid); } else
		if($or=="5 veya üstü" && $ms_toplam_gol > 4) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Müsabakada kaç gol atılır? (0-6)") {
		if($or=="0-3" && $ms_toplam_gol == 0) { kazanma(2,$kid); } else
		if($or=="0-3" && $ms_toplam_gol == 1) { kazanma(2,$kid); } else
		if($or=="0-3" && $ms_toplam_gol == 2) { kazanma(2,$kid); } else
		if($or=="0-3" && $ms_toplam_gol == 3) { kazanma(2,$kid); } else
		if($or=="4-5" && $ms_toplam_gol == 4) { kazanma(2,$kid); } else
		if($or=="4-5" && $ms_toplam_gol == 5) { kazanma(2,$kid); } else
		if($or=="6 veya üstü" && $ms_toplam_gol > 5) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="1. yarıda 1.golü hangi takım atar?") {
		$golvarmi = golbul($mac_db_id, 1);
		if($or=="1" && $iy_toplam_gol>0 && $golvarmi == 1) { kazanma(2,$kid); } else
		if($or=="X" && $iy_toplam_gol == 0) { kazanma(2,$kid); } else
		if($or=="2" && $iy_toplam_gol>0 && $golvarmi == 2) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="1. yarıda 2.golü hangi takım atar?") {
		$golvarmi = golbul($mac_db_id, 2);
		if($or=="1" && $iy_toplam_gol>1 && $golvarmi == 1) { kazanma(2,$kid); } else
		if($or=="X" && $iy_toplam_gol == 1) { kazanma(2,$kid); } else
		if($or=="2" && $iy_toplam_gol>1 && $golvarmi == 2) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="1.golü hangi takım atar?") {
		$golvarmi = golbul($mac_db_id, 1);
		if($or=="1" && $golvarmi == 1) { kazanma(2,$kid); } else
		if($or=="X" && $ms_toplam_gol < 1) { kazanma(2,$kid); } else
		if($or=="2" && $golvarmi == 2) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="2.golü hangi takım atar?") {
		$golvarmi = golbul($mac_db_id, 2);
		if($or=="1" && $golvarmi == 1) { kazanma(2,$kid); } else
		if($or=="X" && $ms_toplam_gol < 2) { kazanma(2,$kid); } else
		if($or=="2" && $golvarmi == 2) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="3.golü hangi takım atar?") {
		$golvarmi = golbul($mac_db_id, 3);
		if($or=="1" && $golvarmi == 1) { kazanma(2,$kid); } else
		if($or=="X" && $ms_toplam_gol < 3) { kazanma(2,$kid); } else
		if($or=="2" && $golvarmi == 2) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="4.golü hangi takım atar?") {
		$golvarmi = golbul($mac_db_id, 4);
		if($or=="1" && $golvarmi == 1) { kazanma(2,$kid); } else
		if($or=="X" && $ms_toplam_gol < 4) { kazanma(2,$kid); } else
		if($or=="2" && $golvarmi == 2) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="5.golü hangi takım atar?") {
		$golvarmi = golbul($mac_db_id, 5);
		if($or=="1" && $golvarmi == 1) { kazanma(2,$kid); } else
		if($or=="X" && $ms_toplam_gol < 5) { kazanma(2,$kid); } else
		if($or=="2" && $golvarmi == 2) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="6.golü hangi takım atar?") {
		$golvarmi = golbul($mac_db_id, 6);
		if($or=="1" && $golvarmi == 1) { kazanma(2,$kid); } else
		if($or=="X" && $ms_toplam_gol < 6) { kazanma(2,$kid); } else
		if($or=="2" && $golvarmi == 2) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Kalan Süre Tahmini - skor:0-0") {
		if($or=="1" && $ev_skor > $konuk_skor) { kazanma(2,$kid); } else
		if($or=="X" && $ev_skor == $konuk_skor) { kazanma(2,$kid); } else
		if($or=="2" && $ev_skor < $konuk_skor) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Kalan Süre Tahmini - skor:1-0") {
		$ev_skor_ver = $ev_skor-1;
		$konuk_skor_ver = $konuk_skor;
		if($or=="1" && $ev_skor_ver > $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="X" && $ev_skor_ver == $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="2" && $ev_skor_ver < $konuk_skor_ver) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Kalan Süre Tahmini - skor:0-1") {
		$ev_skor_ver = $ev_skor;
		$konuk_skor_ver = $konuk_skor-1;
		if($or=="1" && $ev_skor_ver > $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="X" && $ev_skor_ver == $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="2" && $ev_skor_ver < $konuk_skor_ver) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Kalan Süre Tahmini - skor:1-1") {
		$ev_skor_ver = $ev_skor-1;
		$konuk_skor_ver = $konuk_skor-1;
		if($or=="1" && $ev_skor_ver > $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="X" && $ev_skor_ver == $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="2" && $ev_skor_ver < $konuk_skor_ver) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Kalan Süre Tahmini - skor:2-0") {
		$ev_skor_ver = $ev_skor-2;
		$konuk_skor_ver = $konuk_skor;
		if($or=="1" && $ev_skor_ver > $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="X" && $ev_skor_ver == $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="2" && $ev_skor_ver < $konuk_skor_ver) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Kalan Süre Tahmini - skor:0-2") {
		$ev_skor_ver = $ev_skor;
		$konuk_skor_ver = $konuk_skor-2;
		if($or=="1" && $ev_skor_ver > $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="X" && $ev_skor_ver == $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="2" && $ev_skor_ver < $konuk_skor_ver) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Kalan Süre Tahmini - skor:2-1") {
		$ev_skor_ver = $ev_skor-2;
		$konuk_skor_ver = $konuk_skor-1;
		if($or=="1" && $ev_skor_ver > $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="X" && $ev_skor_ver == $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="2" && $ev_skor_ver < $konuk_skor_ver) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Kalan Süre Tahmini - skor:1-2") {
		$ev_skor_ver = $ev_skor-1;
		$konuk_skor_ver = $konuk_skor-2;
		if($or=="1" && $ev_skor_ver > $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="X" && $ev_skor_ver == $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="2" && $ev_skor_ver < $konuk_skor_ver) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Kalan Süre Tahmini - skor:3-0") {
		$ev_skor_ver = $ev_skor-3;
		$konuk_skor_ver = $konuk_skor;
		if($or=="1" && $ev_skor_ver > $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="X" && $ev_skor_ver == $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="2" && $ev_skor_ver < $konuk_skor_ver) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Kalan Süre Tahmini - skor:0-3") {
		$ev_skor_ver = $ev_skor;
		$konuk_skor_ver = $konuk_skor-3;
		if($or=="1" && $ev_skor_ver > $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="X" && $ev_skor_ver == $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="2" && $ev_skor_ver < $konuk_skor_ver) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Kalan Süre Tahmini - skor:2-2") {
		$ev_skor_ver = $ev_skor-2;
		$konuk_skor_ver = $konuk_skor-2;
		if($or=="1" && $ev_skor_ver > $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="X" && $ev_skor_ver == $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="2" && $ev_skor_ver < $konuk_skor_ver) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Kalan Süre Tahmini - skor:1-3") {
		$ev_skor_ver = $ev_skor-1;
		$konuk_skor_ver = $konuk_skor-3;
		if($or=="1" && $ev_skor_ver > $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="X" && $ev_skor_ver == $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="2" && $ev_skor_ver < $konuk_skor_ver) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Kalan Süre Tahmini - skor:3-1") {
		$ev_skor_ver = $ev_skor-3;
		$konuk_skor_ver = $konuk_skor-1;
		if($or=="1" && $ev_skor_ver > $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="X" && $ev_skor_ver == $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="2" && $ev_skor_ver < $konuk_skor_ver) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Kalan Süre Tahmini - skor:4-0") {
		$ev_skor_ver = $ev_skor-4;
		$konuk_skor_ver = $konuk_skor;
		if($or=="1" && $ev_skor_ver > $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="X" && $ev_skor_ver == $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="2" && $ev_skor_ver < $konuk_skor_ver) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Kalan Süre Tahmini - skor:0-4") {
		$ev_skor_ver = $ev_skor;
		$konuk_skor_ver = $konuk_skor-4;
		if($or=="1" && $ev_skor_ver > $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="X" && $ev_skor_ver == $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="2" && $ev_skor_ver < $konuk_skor_ver) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Kalan Süre Tahmini - skor:5-0") {
		$ev_skor_ver = $ev_skor-5;
		$konuk_skor_ver = $konuk_skor;
		if($or=="1" && $ev_skor_ver > $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="X" && $ev_skor_ver == $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="2" && $ev_skor_ver < $konuk_skor_ver) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Kalan Süre Tahmini - skor:0-5") {
		$ev_skor_ver = $ev_skor;
		$konuk_skor_ver = $konuk_skor-5;
		if($or=="1" && $ev_skor_ver > $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="X" && $ev_skor_ver == $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="2" && $ev_skor_ver < $konuk_skor_ver) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Kalan Süre Tahmini - skor:4-1") {
		$ev_skor_ver = $ev_skor-4;
		$konuk_skor_ver = $konuk_skor-1;
		if($or=="1" && $ev_skor_ver > $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="X" && $ev_skor_ver == $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="2" && $ev_skor_ver < $konuk_skor_ver) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Kalan Süre Tahmini - skor:1-4") {
		$ev_skor_ver = $ev_skor-1;
		$konuk_skor_ver = $konuk_skor-4;
		if($or=="1" && $ev_skor_ver > $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="X" && $ev_skor_ver == $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="2" && $ev_skor_ver < $konuk_skor_ver) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Kalan Süre Tahmini - skor:3-2") {
		$ev_skor_ver = $ev_skor-3;
		$konuk_skor_ver = $konuk_skor-2;
		if($or=="1" && $ev_skor_ver > $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="X" && $ev_skor_ver == $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="2" && $ev_skor_ver < $konuk_skor_ver) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Kalan Süre Tahmini - skor:2-3") {
		$ev_skor_ver = $ev_skor-2;
		$konuk_skor_ver = $konuk_skor-3;
		if($or=="1" && $ev_skor_ver > $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="X" && $ev_skor_ver == $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="2" && $ev_skor_ver < $konuk_skor_ver) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Kalan Süre Tahmini - skor:6-0") {
		$ev_skor_ver = $ev_skor-6;
		$konuk_skor_ver = $konuk_skor;
		if($or=="1" && $ev_skor_ver > $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="X" && $ev_skor_ver == $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="2" && $ev_skor_ver < $konuk_skor_ver) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Kalan Süre Tahmini - skor:0-6") {
		$ev_skor_ver = $ev_skor;
		$konuk_skor_ver = $konuk_skor-6;
		if($or=="1" && $ev_skor_ver > $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="X" && $ev_skor_ver == $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="2" && $ev_skor_ver < $konuk_skor_ver) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Kalan Süre Tahmini - skor:5-1") {
		$ev_skor_ver = $ev_skor-5;
		$konuk_skor_ver = $konuk_skor-1;
		if($or=="1" && $ev_skor_ver > $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="X" && $ev_skor_ver == $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="2" && $ev_skor_ver < $konuk_skor_ver) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Kalan Süre Tahmini - skor:1-5") {
		$ev_skor_ver = $ev_skor-1;
		$konuk_skor_ver = $konuk_skor-5;
		if($or=="1" && $ev_skor_ver > $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="X" && $ev_skor_ver == $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="2" && $ev_skor_ver < $konuk_skor_ver) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Kalan Süre Tahmini - skor:4-2") {
		$ev_skor_ver = $ev_skor-4;
		$konuk_skor_ver = $konuk_skor-2;
		if($or=="1" && $ev_skor_ver > $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="X" && $ev_skor_ver == $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="2" && $ev_skor_ver < $konuk_skor_ver) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Kalan Süre Tahmini - skor:2-4") {
		$ev_skor_ver = $ev_skor-2;
		$konuk_skor_ver = $konuk_skor-4;
		if($or=="1" && $ev_skor_ver > $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="X" && $ev_skor_ver == $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="2" && $ev_skor_ver < $konuk_skor_ver) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Kalan Süre Tahmini - skor:3-3") {
		$ev_skor_ver = $ev_skor-3;
		$konuk_skor_ver = $konuk_skor-3;
		if($or=="1" && $ev_skor_ver > $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="X" && $ev_skor_ver == $konuk_skor_ver) { kazanma(2,$kid); } else
		if($or=="2" && $ev_skor_ver < $konuk_skor_ver) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	}
	
}
## FUTBOL BİTTİ ##
function canli_normal_sonuc_basketbol($birset,$ikiset,$ucset,$dortset,$besset,$secenekver2,$oran_tip,$kid,$mac_db_id) {
    $kacmacacik = sed_sql_query("select count(1) from basketbol_canli_maclar where aktif = 1");
    $kacmac = sed_sql_result($kacmacacik,0,0);
    if($kacmac == 0)
        exit;
    
	$ob = explode("|",$oran_tip);
	$ot = $ob[0];
	$or = $ob[1];
	$seceneklesene = explode(' ',$or);
	$oran_1_bosluk = $seceneklesene[0];
	$secenekver = $seceneklesene[1];
	$secenekvirgul = explode(',',$seceneklesene[1]);
	$secenekver_handikap = $secenekvirgul[0].".5";
	
	$birset_bol = explode(" - ",$birset);
	$ikiset_bol = explode(" - ",$ikiset);
	$ucset_bol = explode(" - ",$ucset);
	$dortset_bol = explode(" - ",$dortset);
	$besset_bol = explode(" - ",$besset);
	$bir_ev = $birset_bol[0];
	$bir_dep = $birset_bol[1];
	$iki_ev = $ikiset_bol[0];
	$iki_dep = $ikiset_bol[1];
	$uc_ev = $ucset_bol[0];
	$uc_dep = $ucset_bol[1];
	$dort_ev = $dortset_bol[0];
	$dort_dep = $dortset_bol[1];
	$bes_ev = $besset_bol[0];
	$bes_dep = $besset_bol[1];
	
	$iy_toplam_gol = $bir_ev+$bir_dep+$iki_ev+$iki_dep;
	$ms_toplam_gol = $bir_ev+$bir_dep+$iki_ev+$iki_dep+$uc_ev+$uc_dep+$dort_ev+$dort_dep;
	$ik_toplam_gol = $uc_ev+$uc_dep+$dort_ev+$dort_dep;
	$birinci_ceyrek_toplam_gol = $bir_ev+$bir_dep;
	$ikinci_ceyrek_toplam_gol = $iki_ev+$iki_dep;
	$ucuncu_ceyrek_toplam_gol = $uc_ev+$uc_dep;
	$dorduncu_ceyrek_toplam_gol = $dort_ev+$dort_dep;
	
	$ev_skor = $bir_ev+$iki_ev+$uc_ev+$dort_ev;
	$dep_skor = $bir_dep+$iki_dep+$uc_dep+$dort_dep;
	$iy_ev_skor = $bir_ev+$iki_ev;
	$iy_dep_skor = $bir_dep+$iki_dep;
	$ik_ev_skor = $uc_ev+$dort_ev;
	$ik_dep_skor = $uc_dep+$dort_dep;
	
	$uzatmali_ev_skor = $bir_ev+$iki_ev+$uc_ev+$dort_ev+$bes_ev;
	$uzatmali_dep_skor = $bir_dep+$iki_dep+$uc_dep+$dort_dep+$bes_dep;

	if($ms_toplam_gol%2==0) { $ms_tekcift = "cift"; } else { $ms_tekcift = "tek"; }
	if($birinci_ceyrek_toplam_gol%2==0) { $birset_tekcift = "cift"; } else { $birset_tekcift = "tek"; }
	if($ikinci_ceyrek_toplam_gol%2==0) { $ikiset_tekcift = "cift"; } else { $ikiset_tekcift = "tek"; }
	if($ucuncu_ceyrek_toplam_gol%2==0) { $ucset_tekcift = "cift"; } else { $ucset_tekcift = "tek"; }
	if($dorduncu_ceyrek_toplam_gol%2==0) { $dortset_tekcift = "cift"; } else { $dortset_tekcift = "tek"; }
	
	if($iy_toplam_gol%2==0) { $iy_tekciftbasket = "cift"; } else { $iy_tekciftbasket = "tek"; }
	if($ik_toplam_gol%2==0) { $ik_tekciftbasket = "cift"; } else { $ik_tekciftbasket = "tek"; }
	
	if($ot=="1X2 (Uz. Hariç)") {
		if($or=="1" && $ev_skor > $dep_skor) { kazanma(2,$kid); } else
		if($or=="X" && $ev_skor == $dep_skor) { kazanma(2,$kid); } else
		if($or=="2" && $ev_skor < $dep_skor) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="1X2(1.YARI)") {
		if($or=="1" && $iy_ev_skor > $iy_dep_skor) { kazanma(2,$kid); } else
		if($or=="X" && $iy_ev_skor == $iy_dep_skor) { kazanma(2,$kid); } else
		if($or=="2" && $iy_ev_skor < $iy_dep_skor) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="1X2(2.YARI)") {
		if($or=="1" && $ik_ev_skor > $ik_dep_skor) { kazanma(2,$kid); } else
		if($or=="X" && $ik_ev_skor == $ik_dep_skor) { kazanma(2,$kid); } else
		if($or=="2" && $ik_ev_skor < $ik_dep_skor) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="1X2(1.Çeyrek)") {
		if($or=="1" && $bir_ev > $bir_dep) { kazanma(2,$kid); } else
		if($or=="X" && $bir_ev == $bir_dep) { kazanma(2,$kid); } else
		if($or=="2" && $bir_ev < $bir_dep) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="1X2(2.Çeyrek)") {
		if($or=="1" && $iki_ev > $iki_dep) { kazanma(2,$kid); } else
		if($or=="X" && $iki_ev == $iki_dep) { kazanma(2,$kid); } else
		if($or=="2" && $iki_ev < $iki_dep) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="1X2(3.Çeyrek)") {
		if($or=="1" && $uc_ev > $uc_dep) { kazanma(2,$kid); } else
		if($or=="X" && $uc_ev == $uc_dep) { kazanma(2,$kid); } else
		if($or=="2" && $uc_ev < $uc_dep) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="1X2(4.Çeyrek)") {
		if($or=="1" && $dort_ev > $dort_dep) { kazanma(2,$kid); } else
		if($or=="X" && $dort_ev == $dort_dep) { kazanma(2,$kid); } else
		if($or=="2" && $dort_ev < $dort_dep) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Kim Kazanır (Uz. Dahil)") {
		if($or=="1" && $uzatmali_ev_skor > $uzatmali_dep_skor) { kazanma(2,$kid); } else
		if($or=="2" && $uzatmali_ev_skor < $uzatmali_dep_skor) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="1.Yarı Kim Kazanır") {
		if($or=="1" && $iy_ev_skor > $iy_dep_skor) { kazanma(2,$kid); } else
		if($or=="2" && $iy_ev_skor < $iy_dep_skor) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="2.Yarı Kim Kazanır") {
		if($or=="1" && $ik_ev_skor > $ik_dep_skor) { kazanma(2,$kid); } else
		if($or=="2" && $ik_ev_skor < $ik_dep_skor) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="1.Çeyrek Kim Kazanır") {
		if($or=="1" && $bir_ev > $bir_dep) { kazanma(2,$kid); } else
		if($or=="2" && $bir_ev < $bir_dep) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="2.Çeyrek Kim Kazanır") {
		if($or=="1" && $iki_ev > $iki_dep) { kazanma(2,$kid); } else
		if($or=="2" && $iki_ev < $iki_dep) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="3.Çeyrek Kim Kazanır") {
		if($or=="1" && $uc_ev > $uc_dep) { kazanma(2,$kid); } else
		if($or=="2" && $uc_ev < $uc_dep) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="4.Çeyrek Kim Kazanır") {
		if($or=="1" && $dort_ev > $dort_dep) { kazanma(2,$kid); } else
		if($or=="2" && $dort_ev < $dort_dep) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Toplam Skor Alt/Üst") {
		if($oran_1_bosluk=="A" && $ms_toplam_gol < $secenekver) { kazanma(2,$kid); } else
		if($oran_1_bosluk=="Ü" && $ms_toplam_gol > $secenekver) { kazanma(2,$kid); } else 
		if($oran_1_bosluk=="Alt" && $ms_toplam_gol < $secenekver) { kazanma(2,$kid); } else
		if($oran_1_bosluk=="Üst" && $ms_toplam_gol > $secenekver) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="1.Çeyrek Toplam Alt/Üst") {
		if($oran_1_bosluk=="A" && $birinci_ceyrek_toplam_gol < $secenekver) { kazanma(2,$kid); } else
		if($oran_1_bosluk=="Ü" && $birinci_ceyrek_toplam_gol > $secenekver) { kazanma(2,$kid); } else 
		if($oran_1_bosluk=="Alt" && $birinci_ceyrek_toplam_gol < $secenekver) { kazanma(2,$kid); } else
		if($oran_1_bosluk=="Üst" && $birinci_ceyrek_toplam_gol > $secenekver) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="2.Çeyrek Toplam Alt/Üst") {
		if($oran_1_bosluk=="A" && $ikinci_ceyrek_toplam_gol < $secenekver) { kazanma(2,$kid); } else
		if($oran_1_bosluk=="Ü" && $ikinci_ceyrek_toplam_gol > $secenekver) { kazanma(2,$kid); } else 
		if($oran_1_bosluk=="Alt" && $ikinci_ceyrek_toplam_gol < $secenekver) { kazanma(2,$kid); } else
		if($oran_1_bosluk=="Üst" && $ikinci_ceyrek_toplam_gol > $secenekver) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="3.Çeyrek Toplam Alt/Üst") {
		if($oran_1_bosluk=="A" && $ucuncu_ceyrek_toplam_gol < $secenekver) { kazanma(2,$kid); } else
		if($oran_1_bosluk=="Ü" && $ucuncu_ceyrek_toplam_gol > $secenekver) { kazanma(2,$kid); } else 
		if($oran_1_bosluk=="Alt" && $ucuncu_ceyrek_toplam_gol < $secenekver) { kazanma(2,$kid); } else
		if($oran_1_bosluk=="Üst" && $ucuncu_ceyrek_toplam_gol > $secenekver) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="4.Çeyrek Toplam Alt/Üst") {
		if($oran_1_bosluk=="A" && $dorduncu_ceyrek_toplam_gol < $secenekver) { kazanma(2,$kid); } else
		if($oran_1_bosluk=="Ü" && $dorduncu_ceyrek_toplam_gol > $secenekver) { kazanma(2,$kid); } else 
		if($oran_1_bosluk=="Alt" && $dorduncu_ceyrek_toplam_gol < $secenekver) { kazanma(2,$kid); } else
		if($oran_1_bosluk=="Üst" && $dorduncu_ceyrek_toplam_gol > $secenekver) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="1.Takım Toplam Alt/Üst") {
		if($oran_1_bosluk=="A" && $ev_skor < $secenekver) { kazanma(2,$kid); } else
		if($oran_1_bosluk=="Ü" && $ev_skor > $secenekver) { kazanma(2,$kid); } else 
		if($oran_1_bosluk=="Alt" && $ev_skor < $secenekver) { kazanma(2,$kid); } else
		if($oran_1_bosluk=="Üst" && $ev_skor > $secenekver) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="2.Takım Toplam Alt/Üst") {
		if($oran_1_bosluk=="A" && $dep_skor < $secenekver) { kazanma(2,$kid); } else
		if($oran_1_bosluk=="Ü" && $dep_skor > $secenekver) { kazanma(2,$kid); } else 
		if($oran_1_bosluk=="Alt" && $dep_skor < $secenekver) { kazanma(2,$kid); } else
		if($oran_1_bosluk=="Üst" && $dep_skor > $secenekver) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="1.Takım 1.Yarı Toplam Alt/Üst") {
		if($oran_1_bosluk=="A" && $iy_ev_skor < $secenekver) { kazanma(2,$kid); } else
		if($oran_1_bosluk=="Ü" && $iy_ev_skor > $secenekver) { kazanma(2,$kid); } else 
		if($oran_1_bosluk=="Alt" && $iy_ev_skor < $secenekver) { kazanma(2,$kid); } else
		if($oran_1_bosluk=="Üst" && $iy_ev_skor > $secenekver) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="2.Takım 1.Yarı Toplam Alt/Üst") {
		if($oran_1_bosluk=="A" && $iy_dep_skor < $secenekver) { kazanma(2,$kid); } else
		if($oran_1_bosluk=="Ü" && $iy_dep_skor > $secenekver) { kazanma(2,$kid); } else 
		if($oran_1_bosluk=="Alt" && $iy_dep_skor < $secenekver) { kazanma(2,$kid); } else
		if($oran_1_bosluk=="Üst" && $iy_dep_skor > $secenekver) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Handikap") {
		if($oran_1_bosluk=="1" && ($ev_skor+$secenekver_handikap) > $dep_skor) { kazanma(2,$kid); } else
		if($oran_1_bosluk=="2" && ($dep_skor+$secenekver_handikap) > $ev_skor) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="1.Yarı Handikap") {
		if($oran_1_bosluk=="1" && ($iy_ev_skor+$secenekver_handikap) > $iy_dep_skor) { kazanma(2,$kid); } else
		if($oran_1_bosluk=="2" && ($iy_dep_skor+$secenekver_handikap) > $iy_ev_skor) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="2.Yarı Handikap") {
		if($oran_1_bosluk=="1" && ($ik_ev_skor+$secenekver_handikap) > $ik_dep_skor) { kazanma(2,$kid); } else
		if($oran_1_bosluk=="2" && ($ik_dep_skor+$secenekver_handikap) > $ik_ev_skor) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="1.Çeyrek Handikap") {
		if($oran_1_bosluk=="1" && ($bir_ev+$secenekver_handikap) > $bir_dep) { kazanma(2,$kid); } else
		if($oran_1_bosluk=="2" && ($bir_dep+$secenekver_handikap) > $bir_ev) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="2.Çeyrek Handikap") {
		if($oran_1_bosluk=="1" && ($iki_ev+$secenekver_handikap) > $iki_dep) { kazanma(2,$kid); } else
		if($oran_1_bosluk=="2" && ($iki_dep+$secenekver_handikap) > $iki_ev) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="3.Çeyrek Handikap") {
		if($oran_1_bosluk=="1" && ($uc_ev+$secenekver_handikap) > $uc_dep) { kazanma(2,$kid); } else
		if($oran_1_bosluk=="2" && ($uc_dep+$secenekver_handikap) > $uc_ev) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="4.Çeyrek Handikap") {
		if($oran_1_bosluk=="1" && ($dort_ev+$secenekver_handikap) > $dort_dep) { kazanma(2,$kid); } else
		if($oran_1_bosluk=="2" && ($dort_dep+$secenekver_handikap) > $dort_ev) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="1.Yarı Toplam Tek/Çift") {
		if($or=="T" && $iy_tekciftbasket=="tek") { kazanma(2,$kid); } else
		if($or=="Ç" && $iy_tekciftbasket=="cift") { kazanma(2,$kid); } else 
		if($or=="Tek" && $iy_tekciftbasket=="tek") { kazanma(2,$kid); } else
		if($or=="Çift" && $iy_tekciftbasket=="cift") { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="2.Yarı Toplam Tek/Çift") {
		if($or=="T" && $ik_tekciftbasket=="tek") { kazanma(2,$kid); } else
		if($or=="Ç" && $ik_tekciftbasket=="cift") { kazanma(2,$kid); } else 
		if($or=="Tek" && $ik_tekciftbasket=="tek") { kazanma(2,$kid); } else
		if($or=="Çift" && $ik_tekciftbasket=="cift") { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="1.Çeyrek Toplam Tek/Çift") {
		if($or=="T" && $birset_tekcift=="tek") { kazanma(2,$kid); } else
		if($or=="Ç" && $birset_tekcift=="cift") { kazanma(2,$kid); } else 
		if($or=="Tek" && $birset_tekcift=="tek") { kazanma(2,$kid); } else
		if($or=="Çift" && $birset_tekcift=="cift") { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="2.Çeyrek Toplam Tek/Çift") {
		if($or=="T" && $ikiset_tekcift=="tek") { kazanma(2,$kid); } else
		if($or=="Ç" && $ikiset_tekcift=="cift") { kazanma(2,$kid); } else 
		if($or=="Tek" && $ikiset_tekcift=="tek") { kazanma(2,$kid); } else
		if($or=="Çift" && $ikiset_tekcift=="cift") { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="3.Çeyrek Toplam Tek/Çift") {
		if($or=="T" && $ucset_tekcift=="tek") { kazanma(2,$kid); } else
		if($or=="Ç" && $ucset_tekcift=="cift") { kazanma(2,$kid); } else 
		if($or=="Tek" && $ucset_tekcift=="tek") { kazanma(2,$kid); } else
		if($or=="Çift" && $ucset_tekcift=="cift") { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="4.Çeyrek Toplam Tek/Çift") {
		if($or=="T" && $dortset_tekcift=="tek") { kazanma(2,$kid); } else
		if($or=="Ç" && $dortset_tekcift=="cift") { kazanma(2,$kid); } else 
		if($or=="Tek" && $dortset_tekcift=="tek") { kazanma(2,$kid); } else
		if($or=="Çift" && $dortset_tekcift=="cift") { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Toplam Tek/Çift") {
		if($or=="T" && $ms_tekcift=="tek") { kazanma(2,$kid); } else
		if($or=="Ç" && $ms_tekcift=="cift") { kazanma(2,$kid); } else 
		if($or=="Tek" && $ms_tekcift=="tek") { kazanma(2,$kid); } else
		if($or=="Çift" && $ms_tekcift=="cift") { kazanma(2,$kid); } else { kazanma(3,$kid); }
	}

}
## BASKETBOL BİTTİ ##

function canli_normal_sonuc_tenis($mssonuc,$oran_tip,$kid,$mac_db_id) {
    $kacmacacik = sed_sql_query("select count(1) from canli_maclar_tenis where aktif = 1");
    $kacmac = sed_sql_result($kacmacacik,0,0);
    if($kacmac == 0)
        exit;
    
	$ob = explode("|",$oran_tip);
	$ot = $ob[0];
	$or = $ob[1];
	$mssonuc_bol = explode(" - ",$mssonuc);
	$ev_skor = $mssonuc_bol[0];
	$dep_skor = $mssonuc_bol[1];
	
	if($ot=="Kim Kazanır") {
		if($or=="1" && $ev_skor > $dep_skor) { kazanma(2,$kid); } else
		if($or=="2" && $ev_skor < $dep_skor) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Set Bahisi") {
		if($or=="2:0" && $ev_skor==2 && $dep_skor==0) { kazanma(2,$kid); } else
		if($or=="2:1" && $ev_skor==2 && $dep_skor==1) { kazanma(2,$kid); } else 
		if($or=="1:2" && $ev_skor==1 && $dep_skor==2) { kazanma(2,$kid); } else
		if($or=="0:2" && $ev_skor==0 && $dep_skor==2) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	}

}
## TENİS BİTTİ ##


function canli_normal_sonuc_voleybol($msver,$birset,$ikiset,$ucset,$dortset,$besset,$secenekver,$oran_tip,$kid,$mac_db_id) {
    $kacmacacik = sed_sql_query("select count(1) from canli_maclar_voleybol where aktif = 1");
    $kacmac = sed_sql_result($kacmacacik,0,0);
    if($kacmac == 0)
        exit;
	
	$ob = explode("|",$oran_tip);
	$ot = $ob[0];
	$or = $ob[1];
	
	
	$seceneklesene = explode(' ',$or);
	$oran_1_bosluk = $seceneklesene[0];
	$secenekgetir = $seceneklesene[1];
	$secenekartila = $secenekgetir+0.5;
	$secenekver = $secenekartila;
	
	$secenekver2 = $seceneklesene[1];
	
	$birset_bol = explode(" - ",$birset);
	$ikiset_bol = explode(" - ",$ikiset);
	$ucset_bol = explode(" - ",$ucset);
	$dortset_bol = explode(" - ",$dortset);
	$besset_bol = explode(" - ",$besset);
	$msver_bol = explode(" - ",$msver);
	$bir_ev = $birset_bol[0];
	$bir_dep = $birset_bol[1];
	$iki_ev = $ikiset_bol[0];
	$iki_dep = $ikiset_bol[1];
	$uc_ev = $ucset_bol[0];
	$uc_dep = $ucset_bol[1];
	$dort_ev = $dortset_bol[0];
	$dort_dep = $dortset_bol[1];
	$bes_ev = $besset_bol[0];
	$bes_dep = $besset_bol[1];
	
	$evskor_ver = 0;
	$depskor_ver = 0;
	if($bir_ev>$bir_dep){ $evskor_ver++; } else if($bir_ev<$bir_dep){ $depskor_ver++; }
	if($iki_ev>$iki_dep){ $evskor_ver++; } else if($iki_ev<$iki_dep){ $depskor_ver++; }
	if($uc_ev>$uc_dep){ $evskor_ver++; } else if($uc_ev<$uc_dep){ $depskor_ver++; }
	if($dort_ev>$dort_dep){ $evskor_ver++; } else if($dort_ev<$dort_dep){ $depskor_ver++; }
	if($bes_ev>$bes_dep){ $evskor_ver++; } else if($bes_ev<$bes_dep){ $depskor_ver++; }
	$ms_ev = $evskor_ver;
	$ms_dep = $depskor_ver;
	
	$iy_toplam_gol = $bir_ev+$bir_dep+$iki_ev+$iki_dep;
	$ms_toplam_gol = $bir_ev+$bir_dep+$iki_ev+$iki_dep+$uc_ev+$uc_dep+$dort_ev+$dort_dep+$bes_ev+$bes_dep;
	$ik_toplam_gol = $uc_ev+$uc_dep+$dort_ev+$dort_dep;
	$birinci_ceyrek_toplam_gol = $bir_ev+$bir_dep;
	$ikinci_ceyrek_toplam_gol = $iki_ev+$iki_dep;
	$ucuncu_ceyrek_toplam_gol = $uc_ev+$uc_dep;
	$dorduncu_ceyrek_toplam_gol = $dort_ev+$dort_dep;
	$besinci_ceyrek_toplam_gol = $bes_ev+$bes_dep;
	
	$ev_skor = $bir_ev+$iki_ev+$uc_ev+$dort_ev+$bes_ev;
	$dep_skor = $bir_dep+$iki_dep+$uc_dep+$dort_dep+$bes_dep;
	$iy_ev_skor = $bir_ev+$iki_ev;
	$iy_dep_skor = $bir_dep+$iki_dep;
	$ik_ev_skor = $uc_ev+$dort_ev;
	$ik_dep_skor = $uc_dep+$dort_dep;

	if($ms_toplam_gol%2==0) { $ms_tekcift = "cift"; } else { $ms_tekcift = "tek"; }
	if($birinci_ceyrek_toplam_gol%2==0) { $birset_tekcift = "cift"; } else { $birset_tekcift = "tek"; }
	if($ikinci_ceyrek_toplam_gol%2==0) { $ikiset_tekcift = "cift"; } else { $ikiset_tekcift = "tek"; }
	if($ucuncu_ceyrek_toplam_gol%2==0) { $ucset_tekcift = "cift"; } else { $ucset_tekcift = "tek"; }
	if($dorduncu_ceyrek_toplam_gol%2==0) { $dortset_tekcift = "cift"; } else { $dortset_tekcift = "tek"; }
	
	if($ot=="Kim Kazanır") {
		if($or=="1" && $ms_ev > $ms_dep) { kazanma(2,$kid); } else
		if($or=="2" && $ms_ev < $ms_dep) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="1.Seti Kim Kazanır ?") {
		if($or=="1" && $bir_ev > $bir_dep) { kazanma(2,$kid); } else
		if($or=="2" && $bir_ev < $bir_dep) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="2.Seti Kim Kazanır ?") {
		if($or=="1" && $iki_ev > $iki_dep) { kazanma(2,$kid); } else
		if($or=="2" && $iki_ev < $iki_dep) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="3.Seti Kim Kazanır ?") {
		if($or=="1" && $uc_ev > $uc_dep) { kazanma(2,$kid); } else
		if($or=="2" && $uc_ev < $uc_dep) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="4.Seti Kim Kazanır ?") {
		if($or=="1" && $dort_ev > $dort_dep) { kazanma(2,$kid); } else
		if($or=="2" && $dort_ev < $dort_dep) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Set bahisi (5 maç üzerinden)") {
		if($or=="3:0" && $ms_ev==3 && $ms_dep==0) { kazanma(2,$kid); } else
		if($or=="3:1" && $ms_ev==3 && $ms_dep==1) { kazanma(2,$kid); } else
		if($or=="3:2" && $ms_ev==3 && $ms_dep==2) { kazanma(2,$kid); } else
		if($or=="2:3" && $ms_ev==2 && $ms_dep==3) { kazanma(2,$kid); } else
		if($or=="1:3" && $ms_ev==1 && $ms_dep==3) { kazanma(2,$kid); } else
		if($or=="0:3" && $ms_ev==0 && $ms_dep==3) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Toplam Kaç Set Oynanır ?") {
		if($or=="3" && $ucuncu_ceyrek_toplam_gol>0 && $dorduncu_ceyrek_toplam_gol==0 && $besinci_ceyrek_toplam_gol==0) { kazanma(2,$kid); } else
		if($or=="4" && $dorduncu_ceyrek_toplam_gol>0 && $besinci_ceyrek_toplam_gol==0) { kazanma(2,$kid); } else
		if($or=="5" && $besinci_ceyrek_toplam_gol>0) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Toplam Sayı Tek/Çift") {
		if($or=="T" && $ms_tekcift=="tek") { kazanma(2,$kid); } else
		if($or=="Ç" && $ms_tekcift=="cift") { kazanma(2,$kid); } else 
		if($or=="Tek" && $ms_tekcift=="tek") { kazanma(2,$kid); } else
		if($or=="Çift" && $ms_tekcift=="cift") { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="1.Set Toplam Sayı Tek/Çift") {
		if($or=="T" && $birset_tekcift=="tek") { kazanma(2,$kid); } else
		if($or=="Ç" && $birset_tekcift=="cift") { kazanma(2,$kid); } else 
		if($or=="Tek" && $birset_tekcift=="tek") { kazanma(2,$kid); } else
		if($or=="Çift" && $birset_tekcift=="cift") { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="2.Set Toplam Sayı Tek/Çift") {
		if($or=="T" && $ikiset_tekcift=="tek") { kazanma(2,$kid); } else
		if($or=="Ç" && $ikiset_tekcift=="cift") { kazanma(2,$kid); } else 
		if($or=="Tek" && $ikiset_tekcift=="tek") { kazanma(2,$kid); } else
		if($or=="Çift" && $ikiset_tekcift=="cift") { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="3.Set Toplam Sayı Tek/Çift") {
		if($or=="T" && $ucset_tekcift=="tek") { kazanma(2,$kid); } else
		if($or=="Ç" && $ucset_tekcift=="cift") { kazanma(2,$kid); } else 
		if($or=="Tek" && $ucset_tekcift=="tek") { kazanma(2,$kid); } else
		if($or=="Çift" && $ucset_tekcift=="cift") { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="4.Set Toplam Sayı Tek/Çift") {
		if($or=="T" && $dortset_tekcift=="tek") { kazanma(2,$kid); } else
		if($or=="Ç" && $dortset_tekcift=="cift") { kazanma(2,$kid); } else 
		if($or=="Tek" && $dortset_tekcift=="tek") { kazanma(2,$kid); } else
		if($or=="Çift" && $dortset_tekcift=="cift") { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Müsabaka 5.Set Sürermi") {
		if($or=="E" && $besinci_ceyrek_toplam_gol>0) { kazanma(2,$kid); } else
		if($or=="H" && $besinci_ceyrek_toplam_gol==0) { kazanma(2,$kid); } else 
		if($or=="Evet" && $besinci_ceyrek_toplam_gol>0) { kazanma(2,$kid); } else
		if($or=="Hayır" && $besinci_ceyrek_toplam_gol==0) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="1.Takım Toplam Sayı Alt/Üst") {
		if($or=="A ".$secenekver2."" && $ev_skor < $secenekver) { kazanma(2,$kid); } else
		if($or=="Ü ".$secenekver2."" && $ev_skor > $secenekver) { kazanma(2,$kid); } else 
		if($or=="Alt ".$secenekver2."" && $ev_skor < $secenekver) { kazanma(2,$kid); } else
		if($or=="Üst ".$secenekver2."" && $ev_skor > $secenekver) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="2.Takım Toplam Sayı Alt/Üst") {
		if($or=="A ".$secenekver2."" && $dep_skor < $secenekver) { kazanma(2,$kid); } else
		if($or=="Ü ".$secenekver2."" && $dep_skor > $secenekver) { kazanma(2,$kid); } else 
		if($or=="Alt ".$secenekver2."" && $dep_skor < $secenekver) { kazanma(2,$kid); } else
		if($or=="Üst ".$secenekver2."" && $dep_skor > $secenekver) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="1.Takım 1.Set Toplam Sayı Alt/Üst") {
		if($or=="A ".$secenekver2."" && $bir_ev < $secenekver) { kazanma(2,$kid); } else
		if($or=="Ü ".$secenekver2."" && $bir_ev > $secenekver) { kazanma(2,$kid); } else 
		if($or=="Alt ".$secenekver2."" && $bir_ev < $secenekver) { kazanma(2,$kid); } else
		if($or=="Üst ".$secenekver2."" && $bir_ev > $secenekver) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="2.Takım 1.Set Toplam Sayı Alt/Üst") {
		if($or=="A ".$secenekver2."" && $bir_dep < $secenekver) { kazanma(2,$kid); } else
		if($or=="Ü ".$secenekver2."" && $bir_dep > $secenekver) { kazanma(2,$kid); } else 
		if($or=="Alt ".$secenekver2."" && $bir_dep < $secenekver) { kazanma(2,$kid); } else
		if($or=="Üst ".$secenekver2."" && $bir_dep > $secenekver) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="1.Takım 2.Set Toplam Sayı Alt/Üst") {
		if($or=="A ".$secenekver2."" && $iki_ev < $secenekver) { kazanma(2,$kid); } else
		if($or=="Ü ".$secenekver2."" && $iki_ev > $secenekver) { kazanma(2,$kid); } else 
		if($or=="Alt ".$secenekver2."" && $iki_ev < $secenekver) { kazanma(2,$kid); } else
		if($or=="Üst ".$secenekver2."" && $iki_ev > $secenekver) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="2.Takım 2.Set Toplam Sayı Alt/Üst") {
		if($or=="A ".$secenekver2."" && $iki_dep < $secenekver) { kazanma(2,$kid); } else
		if($or=="Ü ".$secenekver2."" && $iki_dep > $secenekver) { kazanma(2,$kid); } else 
		if($or=="Alt ".$secenekver2."" && $iki_dep < $secenekver) { kazanma(2,$kid); } else
		if($or=="Üst ".$secenekver2."" && $iki_dep > $secenekver) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="1.Takım 3.Set Toplam Sayı Alt/Üst") {
		if($or=="A ".$secenekver2."" && $uc_ev < $secenekver) { kazanma(2,$kid); } else
		if($or=="Ü ".$secenekver2."" && $uc_ev > $secenekver) { kazanma(2,$kid); } else 
		if($or=="Alt ".$secenekver2."" && $uc_ev < $secenekver) { kazanma(2,$kid); } else
		if($or=="Üst ".$secenekver2."" && $uc_ev > $secenekver) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="2.Takım 3.Set Toplam Sayı Alt/Üst") {
		if($or=="A ".$secenekver2."" && $uc_dep < $secenekver) { kazanma(2,$kid); } else
		if($or=="Ü ".$secenekver2."" && $uc_dep > $secenekver) { kazanma(2,$kid); } else 
		if($or=="Alt ".$secenekver2."" && $uc_dep < $secenekver) { kazanma(2,$kid); } else
		if($or=="Üst ".$secenekver2."" && $uc_dep > $secenekver) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="1.Takım 4.Set Toplam Sayı Alt/Üst") {
		if($or=="A ".$secenekver2."" && $dort_ev < $secenekver) { kazanma(2,$kid); } else
		if($or=="Ü ".$secenekver2."" && $dort_ev > $secenekver) { kazanma(2,$kid); } else 
		if($or=="Alt ".$secenekver2."" && $dort_ev < $secenekver) { kazanma(2,$kid); } else
		if($or=="Üst ".$secenekver2."" && $dort_ev > $secenekver) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="2.Takım 4.Set Toplam Sayı Alt/Üst") {
		if($or=="A ".$secenekver2."" && $dort_dep < $secenekver) { kazanma(2,$kid); } else
		if($or=="Ü ".$secenekver2."" && $dort_dep > $secenekver) { kazanma(2,$kid); } else 
		if($or=="Alt ".$secenekver2."" && $dort_dep < $secenekver) { kazanma(2,$kid); } else
		if($or=="Üst ".$secenekver2."" && $dort_dep > $secenekver) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Toplam Sayı Alt/Üst") {
		if($or=="A ".$secenekver2."" && $ms_toplam_gol < $secenekver) { kazanma(2,$kid); } else
		if($or=="Ü ".$secenekver2."" && $ms_toplam_gol > $secenekver) { kazanma(2,$kid); } else 
		if($or=="Alt ".$secenekver2."" && $ms_toplam_gol < $secenekver) { kazanma(2,$kid); } else
		if($or=="Üst ".$secenekver2."" && $ms_toplam_gol > $secenekver) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	}

}
## VOLEYBOL SONUÇ BİTTİ ##
function canli_normal_sonuc_buzhokeyi($msver,$birset,$ikiset,$ucset,$oran_tip,$kid,$mac_db_id) {
    $kacmacacik = sed_sql_query("select count(1) from canli_maclar_buzhokeyi where aktif = 1");
    $kacmac = sed_sql_result($kacmacacik,0,0);
    if($kacmac == 0)
        exit;
    
	$ob = explode("|",$oran_tip);
	$ot = $ob[0];
	$or = $ob[1];
	$birset_bol = explode(" - ",$birset);
	$ikiset_bol = explode(" - ",$ikiset);
	$ucset_bol = explode(" - ",$ucset);
	$msver_bol = explode(" - ",$msver);
	$bir_ev = $birset_bol[0];
	$bir_dep = $birset_bol[1];
	$iki_ev = $ikiset_bol[0];
	$iki_dep = $ikiset_bol[1];
	$uc_ev = $ucset_bol[0];
	$uc_dep = $ucset_bol[1];
	$ms_ev = $msver_bol[0];
	$ms_dep = $msver_bol[1];
	
	$ev_skor = $bir_ev+$iki_ev+$uc_ev;
	$dep_skor = $bir_dep+$iki_dep+$uc_dep;
	
	$bir_period_toplam = $bir_ev+$bir_dep;
	$iki_period_toplam = $iki_ev+$iki_dep;
	$uc_period_toplam = $uc_ev+$uc_dep;
	
	if($ot=="1X2") {
		if($or=="1" && $ms_ev > $ms_dep) { kazanma(2,$kid); } else
		if($or=="X" && $ms_ev == $ms_dep) { kazanma(2,$kid); } else
		if($or=="2" && $ms_ev < $ms_dep) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Cifte Sans") {
		if($or=="1X" && $ms_ev > $ms_dep) { kazanma(2,$kid); } else
		if($or=="1X" && $ms_ev == $ms_dep) { kazanma(2,$kid); } else
		if($or=="X2" && $ms_ev == $ms_dep) { kazanma(2,$kid); } else
		if($or=="X2" && $ms_ev < $ms_dep) { kazanma(2,$kid); } else
		if($or=="12" && $ms_ev > $ms_dep) { kazanma(2,$kid); } else
		if($or=="12" && $ms_ev < $ms_dep) { kazanma(2,$kid); } else 
		if($or=="1 veya X" && $ms_ev > $ms_dep) { kazanma(2,$kid); } else
		if($or=="1 veya X" && $ms_ev == $ms_dep) { kazanma(2,$kid); } else
		if($or=="X veya 2" && $ms_ev == $ms_dep) { kazanma(2,$kid); } else
		if($or=="X veya 2" && $ms_ev < $ms_dep) { kazanma(2,$kid); } else
		if($or=="1 veya 2" && $ms_ev > $ms_dep) { kazanma(2,$kid); } else
		if($or=="1 veya 2" && $ms_ev < $ms_dep) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Hangi periyod daha cok gol olur?") {
		if($or=="1.P" && $bir_period_toplam > $iki_period_toplam && $bir_period_toplam > $uc_period_toplam) { kazanma(2,$kid); } else
		if($or=="2.P" && $iki_period_toplam > $bir_period_toplam && $iki_period_toplam > $uc_period_toplam) { kazanma(2,$kid); } else
		if($or=="3.P" && $uc_period_toplam > $bir_period_toplam && $uc_period_toplam > $iki_period_toplam) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	}

}
## BUZHOKEYİ BİTTİ ##
function canli_normal_sonuc_masatenisi($msver,$birset,$ikiset,$ucset,$dortset,$besset,$oran_tip,$kid,$mac_db_id) {
    $kacmacacik = sed_sql_query("select count(1) from canli_maclar_masatenis where aktif = 1");
    $kacmac = sed_sql_result($kacmacacik,0,0);
    if($kacmac == 0)
        exit;
    
	$ob = explode("|",$oran_tip);
	$ot = $ob[0];
	$or = $ob[1];
	$birset_bol = explode(" - ",$birset);
	$ikiset_bol = explode(" - ",$ikiset);
	$ucset_bol = explode(" - ",$ucset);
	$dortset_bol = explode(" - ",$dortset);
	$besset_bol = explode(" - ",$besset);
	$msver_bol = explode(" - ",$msver);
	$bir_ev = $birset_bol[0];
	$bir_dep = $birset_bol[1];
	$iki_ev = $ikiset_bol[0];
	$iki_dep = $ikiset_bol[1];
	$uc_ev = $ucset_bol[0];
	$uc_dep = $ucset_bol[1];
	$dort_ev = $dortset_bol[0];
	$dort_dep = $dortset_bol[1];
	$bes_ev = $besset_bol[0];
	$bes_dep = $besset_bol[1];
	$ms_ev = $msver_bol[0];
	$ms_dep = $msver_bol[1];
	
	$ev_skor = $bir_ev+$iki_ev+$uc_ev;
	$dep_skor = $bir_dep+$iki_dep+$uc_dep;
	
	$bir_period_toplam = $bir_ev+$bir_dep;
	$iki_period_toplam = $iki_ev+$iki_dep;
	$uc_period_toplam = $uc_ev+$uc_dep;
	
	if($ot=="Kim Kazanır") {
		if($or=="1" && $ms_ev > $ms_dep) { kazanma(2,$kid); } else
		if($or=="2" && $ms_ev < $ms_dep) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="Set Bahisi") {
		if($or=="3:0" && $ms_ev==3 && $ms_dep==0) { kazanma(2,$kid); } else
		if($or=="3:1" && $ms_ev==3 && $ms_dep==1) { kazanma(2,$kid); } else
		if($or=="3:2" && $ms_ev==3 && $ms_dep==2) { kazanma(2,$kid); } else
		if($or=="2:3" && $ms_ev==2 && $ms_dep==3) { kazanma(2,$kid); } else
		if($or=="1:3" && $ms_ev==1 && $ms_dep==3) { kazanma(2,$kid); } else
		if($or=="0:3" && $ms_ev==0 && $ms_dep==3) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="1.Seti Kim Kazanır") {
		if($or=="1" && $bir_ev > $bir_dep) { kazanma(2,$kid); } else
		if($or=="2" && $bir_ev < $bir_dep) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="2.Seti Kim Kazanır") {
		if($or=="1" && $iki_ev > $iki_dep) { kazanma(2,$kid); } else
		if($or=="2" && $iki_ev < $iki_dep) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="3.Seti Kim Kazanır") {
		if($or=="1" && $uc_ev > $uc_dep) { kazanma(2,$kid); } else
		if($or=="2" && $uc_ev < $uc_dep) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="4.Seti Kim Kazanır") {
		if($or=="1" && $dort_ev > $dort_dep) { kazanma(2,$kid); } else
		if($or=="2" && $dort_ev < $dort_dep) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	} else if($ot=="5.Seti Kim Kazanır") {
		if($or=="1" && $bes_ev > $bes_dep) { kazanma(2,$kid); } else
		if($or=="2" && $bes_ev < $bes_dep) { kazanma(2,$kid); } else { kazanma(3,$kid); }
	}

}
## MASA TENİSİ BİTTİ ##

function kazanma($durum,$kid) {
$suan = time();
$kuponbilgi = bilgi("select kupon_id from kupon_ic where id='$kid'");
$kupon = bilgi("select kupon_time,id from kuponlar where id='$kuponbilgi[kupon_id]'");
$fark = $suan-$kupon['kupon_time'];
if($fark<500 && $durum==2) {
sed_sql_query("update kupon_ic set sonuc_time='$suan',sahibe='1' where id='$kid'");
} else {
sed_sql_query("update kupon_ic set sonuc_time='$suan',kazanma='$durum' where id='$kid'");
}
}

$sor_futbol = sed_sql_query("select ev_takim,konuk_takim,kupon_id,iy,ms,sari_kart,kirmizi_kart,korner,penalti,oran_tip,id,mac_db_id from kupon_ic where kazanma='1' and spor_tip='canli' and iy!='' and ms!='' and sahibe<2");
while($row_futbol=sed_sql_fetcharray($sor_futbol)){ 
echo "CANLI FUTBOL";
echo "<br>";
echo "$row_futbol[kupon_id] - Nolu Kupon Sonuçlandırıldı.";
echo "<br>";
canli_normal_sonuc_futbol($row_futbol['iy'],$row_futbol['ms'],$row_futbol['sari_kart'],$row_futbol['kirmizi_kart'],$row_futbol['korner'],$row_futbol['penalti'],$row_futbol['oran_tip'],$row_futbol['id'],$row_futbol['mac_db_id']);
}

$sor_basketbol = sed_sql_query("select ev_takim,konuk_takim,kupon_id,birperiod,ikiperiod,ucperiod,dortperiod,besperiod,oran_val,iy,ms,oran_tip,id,mac_db_id from kupon_ic where kazanma='1' and spor_tip='canlib' and iy!='' and ms!='' and sahibe<2");
while($row_basketbol=sed_sql_fetcharray($sor_basketbol)){ 
echo "<br>";
echo "CANLI BASKETBOL";
echo "<br>";
echo "$row_basketbol[kupon_id] - Nolu Kupon Sonuçlandırıldı.";
echo "<br>";
echo "<br>";
echo "<br>";
canli_normal_sonuc_basketbol($row_basketbol['birperiod'],$row_basketbol['ikiperiod'],$row_basketbol['ucperiod'],$row_basketbol['dortperiod'],$row_basketbol['besperiod'],$row_basketbol['oran_val'],$row_basketbol['oran_tip'],$row_basketbol['id'],$row_basketbol['mac_db_id']);
}

$sor_tenis = sed_sql_query("select ev_takim,konuk_takim,kupon_id,birperiod,ikiperiod,ucperiod,ms,oran_tip,id,mac_db_id from kupon_ic where kazanma='1' and spor_tip='canlit' and ms!='' and sahibe<2");
while($row_tenis=sed_sql_fetcharray($sor_tenis)){ 
echo "<br>";
echo "CANLI TENİS";
echo "<br>";
echo "$row_tenis[kupon_id] - Nolu Kupon Sonuçlandırıldı.";
echo "<br>";
echo "<br>";
echo "<br>";
canli_normal_sonuc_tenis($row_tenis['ms'],$row_tenis['oran_tip'],$row_tenis['id'],$row_tenis['mac_db_id']);
}

$sor_voleybol = sed_sql_query("select ev_takim,konuk_takim,kupon_id,birperiod,ikiperiod,ucperiod,dortperiod,besperiod,oran_val,iy,ms,oran_tip,id,mac_db_id from kupon_ic where kazanma='1' and spor_tip='canliv' and ms!='' and sahibe<2");
while($row_voleybol=sed_sql_fetcharray($sor_voleybol)){ 
echo "<br>";
echo "CANLI VOLEYBOL";
echo "<br>";
echo "$row_voleybol[kupon_id] - Nolu Kupon Sonuçlandırıldı.";
echo "<br>";
echo "<br>";
echo "<br>";
canli_normal_sonuc_voleybol($row_voleybol['ms'],$row_voleybol['birperiod'],$row_voleybol['ikiperiod'],$row_voleybol['ucperiod'],$row_voleybol['dortperiod'],$row_voleybol['besperiod'],$row_voleybol['oran_val'],$row_voleybol['oran_tip'],$row_voleybol['id'],$row_voleybol['mac_db_id']);
}

$sor_buzhokeyi = sed_sql_query("select ev_takim,konuk_takim,kupon_id,birperiod,ikiperiod,ucperiod,iy,ms,oran_tip,id,mac_db_id from kupon_ic where kazanma='1' and spor_tip='canlibuz' and ms!='' and sahibe<2");
while($row_buzhokeyi=sed_sql_fetcharray($sor_buzhokeyi)){ 
echo "<br>";
echo "CANLI BUZHOKEYİ";
echo "<br>";
echo "$row_buzhokeyi[kupon_id] - Nolu Kupon Sonuçlandırıldı.";
echo "<br>";
echo "<br>";
echo "<br>";
canli_normal_sonuc_buzhokeyi($row_buzhokeyi['ms'],$row_buzhokeyi['birperiod'],$row_buzhokeyi['ikiperiod'],$row_buzhokeyi['ucperiod'],$row_buzhokeyi['oran_tip'],$row_buzhokeyi['id'],$row_buzhokeyi['mac_db_id']);
}

$sor_masatenisi = sed_sql_query("select ev_takim,konuk_takim,kupon_id,birperiod,ikiperiod,ucperiod,dortperiod,besperiod,iy,ms,oran_tip,id,mac_db_id from kupon_ic where kazanma='1' and spor_tip='canlimt' and ms!='' and sahibe<2");
while($row_masatenisi=sed_sql_fetcharray($sor_masatenisi)){ 
echo "<br>";
echo "CANLI MASATENİSİ";
echo "<br>";
echo "$row_masatenisi[kupon_id] - Nolu Kupon Sonuçlandırıldı.";
echo "<br>";
echo "<br>";
echo "<br>";
canli_normal_sonuc_masatenisi($row_masatenisi['ms'],$row_masatenisi['birperiod'],$row_masatenisi['ikiperiod'],$row_masatenisi['ucperiod'],$row_masatenisi['dortperiod'],$row_masatenisi['besperiod'],$row_masatenisi['oran_tip'],$row_masatenisi['id'],$row_masatenisi['mac_db_id']);
}
?>
<meta http-equiv="refresh" content="15">