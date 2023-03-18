<?php
$sonuclandirXBX = true;
echo "<pre>"; 
echo date('d.m.Y H:i:s')."\n";
include 'xml.php';

check_kontrol();

$sql = "SELECT * FROM kupon_ic where kazanma = 1 AND spor_tip='canli' AND mac_kodu='CNL'";
$sor = sed_sql_query($sql);
if(sed_sql_numrows($sor)>0) {
	while ($r = sed_sql_fetchassoc($sor)) {
		$mac = "SELECT * FROM canli_maclar WHERE sonucok=0 AND dakika<89 AND id=".$r['mac_db_id'];
		$s = sed_sql_query($mac);
		$mac_id = $r['mac_db_id'];
		$d = sed_sql_fetchassoc($s);
		$oran =  $r['oran_tip'];
		$oran = explode("|", $oran);
		$oran_t = trim($oran[0]);
		$oran_s = trim($oran[1]);
		$kid = $r['id'];
		$kid_getirsenelan = $r['kupon_id'];
		if(isset($d) && !empty($d)) {
			echo "<br>";
			echo "Kupon ID: " . $kid_getirsenelan . "<br>";
			echo $d["ev_takim"] . " - " . $d["konuk_takim"] . "<br>";
			echo "IY: " . $d["iy_ev"] . "-" . $d["iy_konuk"] . " / MS: " . $d["ev_skor"] . "-" . $d["konuk_skor"] . "<br>";
			
			echo $oran_t . "<br>";
			echo "Secenek: " . $oran_s . "<br>";
			
			sonuclandir($oran_t,$oran_s,$d,$kid);
			echo "<br><br>";
		}
	}
}else{
	echo "Anlık sonuçlandırılacak kayıt bulunamadı..";
}

function sonuclandir($oad, $oran_s, $mac_data, $kid){
	$iy_ev = $mac_data['iy_ev'];
	$iy_dep = $mac_data['iy_konuk'];
	$ev_skor = $mac_data['ev_skor'];
	$dep_skor = $mac_data['konuk_skor'];
	$ik_ev = $mac_data['ev_skor']-$mac_data['iy_ev'];
	$ik_dep = $mac_data['konuk_skor']-$mac_data['iy_konuk'];
	$mDurum = $mac_data["devre"];
	
	$iy_toplam_gol = $mac_data['iy_ev']+$mac_data['iy_konuk'];
	$ms_toplam_gol = $mac_data['ev_skor']+$mac_data['konuk_skor'];
	$ik_toplam_gol = $ik_ev+$ik_dep;
	
	$sari_ev = $mac_data['sari_ev'];
	$sari_dep = $mac_data['sari_konuk'];
	$kirmizi_ev = $mac_data['kirmizi_ev'];
	$kirmizi_dep = $mac_data['kirmizi_konuk'];
	$penalti_ev = $mac_data['penalti_ev'];
	$penalti_dep = $mac_data['penalti_konuk'];
	$korner_ev = $mac_data['korner_ev'];
	$korner_dep = $mac_data['korner_konuk'];
	
	$sari_toplam = $mac_data['sari_ev']+$mac_data['sari_konuk'];
	$kirmizi_toplam = $mac_data['kirmizi_ev']+$mac_data['kirmizi_konuk'];
	$penalti_toplam = $mac_data['penalti_ev']+$mac_data['penalti_konuk'];
	$korner_toplam = $mac_data['korner_ev']+$mac_data['korner_konuk'];
	
	if($iy_toplam_gol%2==0) { $iy_tekcift = "cift"; } else { $iy_tekcift = "tek"; }
	
	if($oad == "1.Yarı Çifte Şans"){
		if($mDurum=="Devre Arası"){
			if($oran_s == "1X" && $iy_ev > $iy_dep){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "1X" && $iy_ev == $iy_dep){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "12" && $iy_ev > $iy_dep){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "12" && $iy_ev < $iy_dep){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "X2" && $iy_ev == $iy_dep){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "X2" && $iy_ev < $iy_dep){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "1 veya X" && $iy_ev > $iy_dep){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "1 veya X" && $iy_ev == $iy_dep){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "1 veya 2" && $iy_ev > $iy_dep){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "1 veya 2" && $iy_ev < $iy_dep){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "X veya 2" && $iy_ev == $iy_dep){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "X veya 2" && $iy_ev < $iy_dep){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "1 ve X" && $iy_ev > $iy_dep){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "1 ve X" && $iy_ev == $iy_dep){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "1 ve 2" && $iy_ev > $iy_dep){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "1 ve 2" && $iy_ev < $iy_dep){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "X ve 2" && $iy_ev == $iy_dep){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "X ve 2" && $iy_ev < $iy_dep){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			{ echo "Kaybetti <br>"; kazanma(3, $kid); }
		} else if($mDurum=="İkinci Yarı"){
			if($oran_s == "1X" && $iy_ev > $iy_dep){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "1X" && $iy_ev == $iy_dep){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "12" && $iy_ev > $iy_dep){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "12" && $iy_ev < $iy_dep){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "X2" && $iy_ev == $iy_dep){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "X2" && $iy_ev < $iy_dep){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "1 veya X" && $iy_ev > $iy_dep){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "1 veya X" && $iy_ev == $iy_dep){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "1 veya 2" && $iy_ev > $iy_dep){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "1 veya 2" && $iy_ev < $iy_dep){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "X veya 2" && $iy_ev == $iy_dep){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "X veya 2" && $iy_ev < $iy_dep){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			{ echo "Kaybetti <br>"; kazanma(3, $kid); }
		}
	} else if($oad == "1.Yarı 0.5 Gol Alt Üst"){
		if($mDurum=="İlk Yarı"){
			if($oran_s == "A" && $iy_toplam_gol>0){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $iy_toplam_gol>0){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 0.5" && $iy_toplam_gol>0){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 0.5" && $iy_toplam_gol>0){ echo "Kazandı <br>"; kazanma(2, $kid); }
		} else if($mDurum=="Devre Arası" || $mDurum=="İkinci Yarı"){
			if($oran_s == "A" && $iy_toplam_gol<1){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Ü" && $iy_toplam_gol>0){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 0.5" && $iy_toplam_gol<1){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Üst 0.5" && $iy_toplam_gol>0){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			{ echo "Kaybetti <br>"; kazanma(3, $kid); }
		}
	} else if($oad == "1.Yarı 1.5 Gol Alt Üst"){
		if($mDurum=="İlk Yarı"){
			if($oran_s == "A" && $iy_toplam_gol>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $iy_toplam_gol>1){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 1.5" && $iy_toplam_gol>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 1.5" && $iy_toplam_gol>1){ echo "Kazandı <br>"; kazanma(2, $kid); }
		} else if($mDurum=="Devre Arası" || $mDurum=="İkinci Yarı"){
			if($oran_s == "A" && $iy_toplam_gol<2){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Ü" && $iy_toplam_gol>1){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 1.5" && $iy_toplam_gol<2){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Üst 1.5" && $iy_toplam_gol>1){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			{ echo "Kaybetti <br>"; kazanma(3, $kid); }
		}
	} else if($oad == "1.Yarı 2.5 Gol Alt Üst"){
		if($mDurum=="İlk Yarı"){
			if($oran_s == "A" && $iy_toplam_gol>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $iy_toplam_gol>2){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 2.5" && $iy_toplam_gol>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 2.5" && $iy_toplam_gol>2){ echo "Kazandı <br>"; kazanma(2, $kid); }
		} else if($mDurum=="Devre Arası" || $mDurum=="İkinci Yarı"){
			if($oran_s == "A" && $iy_toplam_gol<3){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Ü" && $iy_toplam_gol>2){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 2.5" && $iy_toplam_gol<3){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Üst 2.5" && $iy_toplam_gol>2){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			{ echo "Kaybetti <br>"; kazanma(3, $kid); }
		}
	} else if($oad == "Toplam Sarı Kart 1.5 Alt/Üst"){
			if($oran_s == "A" && $sari_toplam>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $sari_toplam>1){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 1.5" && $sari_toplam>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 1.5" && $sari_toplam>1){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "Toplam Sarı Kart 2.5 Alt/Üst"){
			if($oran_s == "A" && $sari_toplam>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $sari_toplam>2){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 2.5" && $sari_toplam>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 2.5" && $sari_toplam>2){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "Toplam Sarı Kart 3.5 Alt/Üst"){
			if($oran_s == "A" && $sari_toplam>3){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $sari_toplam>3){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 3.5" && $sari_toplam>3){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 3.5" && $sari_toplam>3){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "Toplam Sarı Kart 4.5 Alt/Üst"){
			if($oran_s == "A" && $sari_toplam>4){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $sari_toplam>4){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 4.5" && $sari_toplam>4){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 4.5" && $sari_toplam>4){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "Kırmızı Kart Çıkarmı ?"){
			if($oran_s == "H" && $kirmizi_toplam>0){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "E" && $kirmizi_toplam>0){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Hayır" && $kirmizi_toplam>0){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Evet" && $kirmizi_toplam>0){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "Kaç Penaltı Olur ?"){
			if($oran_s == "0" && $penalti_toplam>0){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "1" && $penalti_toplam>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "2+" && $penalti_toplam>1){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Penaltı Yok" && $penalti_toplam>0){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "1 Penaltı" && $penalti_toplam>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "2 veya Üstü" && $penalti_toplam>1){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "2 veya üstü" && $penalti_toplam>1){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "1.Takım Toplam Sarı Kart 1.5 Alt/Üst"){
			if($oran_s == "A" && $sari_ev>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $sari_ev>1){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 1.5" && $sari_ev>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 1.5" && $sari_ev>1){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "1.Takım Toplam Sarı Kart 2.5 Alt/Üst"){
			if($oran_s == "A" && $sari_ev>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $sari_ev>2){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 2.5" && $sari_ev>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 2.5" && $sari_ev>2){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "1.Takım Toplam Sarı Kart 3.5 Alt/Üst"){
			if($oran_s == "A" && $sari_ev>3){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $sari_ev>3){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 3.5" && $sari_ev>3){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 3.5" && $sari_ev>3){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "2.Takım Toplam Sarı Kart 1.5 Alt/Üst"){
			if($oran_s == "A" && $sari_dep>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $sari_dep>1){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 1.5" && $sari_dep>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 1.5" && $sari_dep>1){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "2.Takım Toplam Sarı Kart 2.5 Alt/Üst"){
			if($oran_s == "A" && $sari_dep>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $sari_dep>2){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 2.5" && $sari_dep>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 2.5" && $sari_dep>2){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "2.Takım Toplam Sarı Kart 3.5 Alt/Üst"){
			if($oran_s == "A" && $sari_dep>3){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $sari_dep>3){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 3.5" && $sari_dep>3){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 3.5" && $sari_dep>3){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "Toplam Korner 5.5 Alt/Üst"){
			if($oran_s == "A" && $korner_toplam>5){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $korner_toplam>5){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 5.5" && $korner_toplam>5){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 5.5" && $korner_toplam>5){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "Toplam Korner 6.5 Alt/Üst"){
			if($oran_s == "A" && $korner_toplam>6){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $korner_toplam>6){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 6.5" && $korner_toplam>6){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 6.5" && $korner_toplam>6){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "Toplam Korner 7.5 Alt/Üst"){
			if($oran_s == "A" && $korner_toplam>7){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $korner_toplam>7){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 7.5" && $korner_toplam>7){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 7.5" && $korner_toplam>7){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "Toplam Korner 8.5 Alt/Üst"){
			if($oran_s == "A" && $korner_toplam>8){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $korner_toplam>8){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 8.5" && $korner_toplam>8){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 8.5" && $korner_toplam>8){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "Toplam Korner 9.5 Alt/Üst"){
			if($oran_s == "A" && $korner_toplam>9){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $korner_toplam>9){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 9.5" && $korner_toplam>9){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 9.5" && $korner_toplam>9){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "Toplam Korner 10.5 Alt/Üst"){
			if($oran_s == "A" && $korner_toplam>10){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $korner_toplam>10){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 10.5" && $korner_toplam>10){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 10.5" && $korner_toplam>10){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "Toplam Korner 11.5 Alt/Üst"){
			if($oran_s == "A" && $korner_toplam>11){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $korner_toplam>11){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 11.5" && $korner_toplam>11){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 11.5" && $korner_toplam>11){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "Toplam Korner 12.5 Alt/Üst"){
			if($oran_s == "A" && $korner_toplam>12){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $korner_toplam>12){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 12.5" && $korner_toplam>12){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 12.5" && $korner_toplam>12){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "Toplam Korner 13.5 Alt/Üst"){
			if($oran_s == "A" && $korner_toplam>13){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $korner_toplam>13){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 13.5" && $korner_toplam>13){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 13.5" && $korner_toplam>13){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "Toplam Korner 14.5 Alt/Üst"){
			if($oran_s == "A" && $korner_toplam>14){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $korner_toplam>14){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 14.5" && $korner_toplam>14){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 14.5" && $korner_toplam>14){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "Toplam Korner 15.5 Alt/Üst"){
			if($oran_s == "A" && $korner_toplam>15){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $korner_toplam>15){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 15.5" && $korner_toplam>15){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 15.5" && $korner_toplam>15){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "1.Takım Toplam Korner 2.5 Alt/Üst"){
			if($oran_s == "A" && $korner_ev>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $korner_ev>2){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 2.5" && $korner_ev>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 2.5" && $korner_ev>2){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "1.Takım Toplam Korner 3.5 Alt/Üst"){
			if($oran_s == "A" && $korner_ev>3){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $korner_ev>3){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 3.5" && $korner_ev>3){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 3.5" && $korner_ev>3){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "1.Takım Toplam Korner 4.5 Alt/Üst"){
			if($oran_s == "A" && $korner_ev>4){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $korner_ev>4){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 4.5" && $korner_ev>4){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 4.5" && $korner_ev>4){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "1.Takım Toplam Korner 5.5 Alt/Üst"){
			if($oran_s == "A" && $korner_ev>5){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $korner_ev>5){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 5.5" && $korner_ev>5){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 5.5" && $korner_ev>5){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "1.Takım Toplam Korner 6.5 Alt/Üst"){
			if($oran_s == "A" && $korner_ev>6){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $korner_ev>6){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 6.5" && $korner_ev>6){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 6.5" && $korner_ev>6){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "1.Takım Toplam Korner 7.5 Alt/Üst"){
			if($oran_s == "A" && $korner_ev>7){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $korner_ev>7){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 7.5" && $korner_ev>7){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 7.5" && $korner_ev>7){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "1.Takım Toplam Korner 8.5 Alt/Üst"){
			if($oran_s == "A" && $korner_ev>8){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $korner_ev>8){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 8.5" && $korner_ev>8){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 8.5" && $korner_ev>8){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "1.Takım Toplam Korner 9.5 Alt/Üst"){
			if($oran_s == "A" && $korner_ev>9){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $korner_ev>9){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 9.5" && $korner_ev>9){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 9.5" && $korner_ev>9){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "1.Takım Toplam Korner 10.5 Alt/Üst"){
			if($oran_s == "A" && $korner_ev>10){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $korner_ev>10){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 10.5" && $korner_ev>10){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 10.5" && $korner_ev>10){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "2.Takım Toplam Korner 2.5 Alt/Üst"){
			if($oran_s == "A" && $korner_dep>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $korner_dep>2){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 2.5" && $korner_dep>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 2.5" && $korner_dep>2){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "2.Takım Toplam Korner 3.5 Alt/Üst"){
			if($oran_s == "A" && $korner_dep>3){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $korner_dep>3){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 3.5" && $korner_dep>3){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 3.5" && $korner_dep>3){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "2.Takım Toplam Korner 4.5 Alt/Üst"){
			if($oran_s == "A" && $korner_dep>4){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $korner_dep>4){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 4.5" && $korner_dep>4){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 4.5" && $korner_dep>4){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "2.Takım Toplam Korner 5.5 Alt/Üst"){
			if($oran_s == "A" && $korner_dep>5){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $korner_dep>5){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 5.5" && $korner_dep>5){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 5.5" && $korner_dep>5){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "2.Takım Toplam Korner 6.5 Alt/Üst"){
			if($oran_s == "A" && $korner_dep>6){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $korner_dep>6){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 6.5" && $korner_dep>6){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 6.5" && $korner_dep>6){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "2.Takım Toplam Korner 7.5 Alt/Üst"){
			if($oran_s == "A" && $korner_dep>7){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $korner_dep>7){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 7.5" && $korner_dep>7){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 7.5" && $korner_dep>7){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "2.Takım Toplam Korner 8.5 Alt/Üst"){
			if($oran_s == "A" && $korner_dep>8){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $korner_dep>8){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 8.5" && $korner_dep>8){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 8.5" && $korner_dep>8){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "2.Takım Toplam Korner 9.5 Alt/Üst"){
			if($oran_s == "A" && $korner_dep>9){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $korner_dep>9){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 9.5" && $korner_dep>9){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 9.5" && $korner_dep>9){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "2.Takım Toplam Korner 10.5 Alt/Üst"){
			if($oran_s == "A" && $korner_dep>10){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $korner_dep>10){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 10.5" && $korner_dep>10){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 10.5" && $korner_dep>10){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "Toplam 0.5 Gol Alt Üst"){
			if($oran_s == "A" && $ms_toplam_gol>0){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $ms_toplam_gol>0){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 0.5" && $ms_toplam_gol>0){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 0.5" && $ms_toplam_gol>0){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "Toplam 1.5 Gol Alt Üst"){
			if($oran_s == "A" && $ms_toplam_gol>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $ms_toplam_gol>1){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 1.5" && $ms_toplam_gol>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 1.5" && $ms_toplam_gol>1){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "Toplam 2.5 Gol Alt Üst"){
			if($oran_s == "A" && $ms_toplam_gol>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $ms_toplam_gol>2){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 2.5" && $ms_toplam_gol>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 2.5" && $ms_toplam_gol>2){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "Toplam 3.5 Gol Alt Üst"){
			if($oran_s == "A" && $ms_toplam_gol>3){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $ms_toplam_gol>3){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 3.5" && $ms_toplam_gol>3){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 3.5" && $ms_toplam_gol>3){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "Toplam 4.5 Gol Alt Üst"){
			if($oran_s == "A" && $ms_toplam_gol>4){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $ms_toplam_gol>4){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 4.5" && $ms_toplam_gol>4){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 4.5" && $ms_toplam_gol>4){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "Toplam 5.5 Gol Alt Üst"){
			if($oran_s == "A" && $ms_toplam_gol>5){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $ms_toplam_gol>5){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 5.5" && $ms_toplam_gol>5){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 5.5" && $ms_toplam_gol>5){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "Toplam 6.5 Gol Alt Üst"){
			if($oran_s == "A" && $ms_toplam_gol>6){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $ms_toplam_gol>6){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 6.5" && $ms_toplam_gol>6){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 6.5" && $ms_toplam_gol>6){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "Toplam 7.5 Gol Alt Üst"){
			if($oran_s == "A" && $ms_toplam_gol>7){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $ms_toplam_gol>7){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 7.5" && $ms_toplam_gol>7){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 7.5" && $ms_toplam_gol>7){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "Toplam 8.5 Gol Alt Üst"){
			if($oran_s == "A" && $ms_toplam_gol>8){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $ms_toplam_gol>8){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 8.5" && $ms_toplam_gol>8){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 8.5" && $ms_toplam_gol>8){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "2.Yarı 0.5 Gol Alt Üst" && $mDurum=="İkinci Yarı"){
			if($oran_s == "A" && $ik_toplam_gol>0){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $ik_toplam_gol>0){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 0.5" && $ik_toplam_gol>0){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 0.5" && $ik_toplam_gol>0){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "2.Yarı 1.5 Gol Alt Üst" && $mDurum=="İkinci Yarı"){
			if($oran_s == "A" && $ik_toplam_gol>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $ik_toplam_gol>1){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 1.5" && $ik_toplam_gol>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 1.5" && $ik_toplam_gol>1){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "2.Yarı 2.5 Gol Alt Üst" && $mDurum=="İkinci Yarı"){
			if($oran_s == "A" && $ik_toplam_gol>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $ik_toplam_gol>2){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 2.5" && $ik_toplam_gol>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 2.5" && $ik_toplam_gol>2){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "2.Yarı 3.5 Gol Alt Üst" && $mDurum=="İkinci Yarı"){
			if($oran_s == "A" && $ik_toplam_gol>3){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $ik_toplam_gol>3){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 3.5" && $ik_toplam_gol>3){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 3.5" && $ik_toplam_gol>3){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "Karşılıklı Gol Olurmu ?"){
			if($oran_s == "H" && $ev_skor>0 && $konuk_skor>0){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "E" && $ev_skor>0 && $konuk_skor>0){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Hayır" && $ev_skor>0 && $konuk_skor>0){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Evet" && $ev_skor>0 && $konuk_skor>0){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "Ev Sahibi Müsabakada Gol Atarmı ?"){
			if($oran_s == "H" && $ev_skor>0){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "E" && $ev_skor>0){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Hayır" && $ev_skor>0){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Evet" && $ev_skor>0){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "Deplasman Müsabakada Gol Atarmı ?"){
			if($oran_s == "H" && $konuk_skor>0){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "E" && $konuk_skor>0){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Hayır" && $konuk_skor>0){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Evet" && $konuk_skor>0){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "1.Yarı Tek / Çift"){
		if($mDurum=="Devre Arası"){
			if($oran_s == "T" && $iy_tekcift=="tek"){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Ç" && $iy_tekcift=="cift"){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Tek" && $iy_tekcift=="tek"){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Çift" && $iy_tekcift=="cift"){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			{ echo "Kaybetti <br>"; kazanma(3, $kid); }
		} else if($mDurum=="İkinci Yarı"){
			if($oran_s == "T" && $iy_tekcift=="tek"){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Ç" && $iy_tekcift=="cift"){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Tek" && $iy_tekcift=="tek"){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Çift" && $iy_tekcift=="cift"){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			{ echo "Kaybetti <br>"; kazanma(3, $kid); }
		}
	}  else if($oad == "1.Yarı Karşılıklı Gol"){
		if($mDurum=="İlk Yarı"){
			if($oran_s == "H" && $iy_ev>0 && $iy_dep>0){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "E" && $iy_ev>0 && $iy_dep>0){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Hayır" && $iy_ev>0 && $iy_dep>0){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Evet" && $iy_ev>0 && $iy_dep>0){ echo "Kazandı <br>"; kazanma(2, $kid); }
		} else if($mDurum=="Devre Arası" || $mDurum=="İkinci Yarı"){
			if($oran_s == "E" && ($iy_ev<1 || $iy_dep<1)){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "H" && $iy_ev>0 && $iy_dep>0){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Evet" && ($iy_ev<1 || $iy_dep<1)){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Hayır" && $iy_ev>0 && $iy_dep>0){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			{ echo "Kazandı <br>"; kazanma(2, $kid); }
		}
	} else if($oad == "Ev Sahibi 0.5 Gol Alt Üst"){
			if($oran_s == "A" && $ev_skor>0){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $ev_skor>0){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 0.5" && $ev_skor>0){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 0.5" && $ev_skor>0){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "Ev Sahibi 1.5 Gol Alt Üst"){
			if($oran_s == "A" && $ev_skor>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $ev_skor>1){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 1.5" && $ev_skor>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 1.5" && $ev_skor>1){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "Ev Sahibi 2.5 Gol Alt Üst"){
			if($oran_s == "A" && $ev_skor>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $ev_skor>2){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 2.5" && $ev_skor>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 2.5" && $ev_skor>2){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "Deplasman 0.5 Gol Alt Üst"){
			if($oran_s == "A" && $konuk_skor>0){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $konuk_skor>0){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 0.5" && $konuk_skor>0){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 0.5" && $konuk_skor>0){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "Deplasman 1.5 Gol Alt Üst"){
			if($oran_s == "A" && $konuk_skor>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $konuk_skor>1){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 1.5" && $konuk_skor>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 1.5" && $konuk_skor>1){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "Deplasman 2.5 Gol Alt Üst"){
			if($oran_s == "A" && $konuk_skor>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $konuk_skor>2){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 2.5" && $konuk_skor>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 2.5" && $konuk_skor>2){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "Toplam Kaç Gol Atılır ?"){
			if($oran_s == "Gol Yok" && $ms_toplam_gol>0){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "1" && $ms_toplam_gol>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "2" && $ms_toplam_gol>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "3" && $ms_toplam_gol>3){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "4" && $ms_toplam_gol>4){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "5" && $ms_toplam_gol>5){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "6" && $ms_toplam_gol>6){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "7" && $ms_toplam_gol>7){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "1 Gol" && $ms_toplam_gol>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "2 Gol" && $ms_toplam_gol>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "3 Gol" && $ms_toplam_gol>3){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "4 Gol" && $ms_toplam_gol>4){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "5 Gol" && $ms_toplam_gol>5){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "6 Gol" && $ms_toplam_gol>6){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "7 Gol" && $ms_toplam_gol>7){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "8 veya üstü" && $ms_toplam_gol>7){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "Ev Sahibi Toplam Kaç Gol Atar ?"){
			if($oran_s == "Gol Yok" && $ev_skor>0){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "1" && $ev_skor>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "2" && $ev_skor>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "1 Gol" && $ev_skor>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "2 Gol" && $ev_skor>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "3 veya üstü" && $ev_skor>2){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "Deplasman Toplam Kaç Gol Atar ?"){
			if($oran_s == "Gol Yok" && $konuk_skor>0){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "1" && $konuk_skor>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "2" && $konuk_skor>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "1 Gol" && $konuk_skor>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "2 Gol" && $konuk_skor>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "3 veya üstü" && $konuk_skor>2){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "1.Yarı Skoru"){
		if($mDurum=="İlk Yarı"){
			if($oran_s == "0:0"){ if($iy_ev>0 && $iy_dep>0){ echo "Kaybetti <br>"; kazanma(3, $kid); } } else
			if($oran_s == "1:0"){ if($iy_ev>1 && $iy_dep>0){ echo "Kaybetti <br>"; kazanma(3, $kid); } } else
			if($oran_s == "1:1"){ if($iy_ev>1 && $iy_dep>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } } else
			if($oran_s == "0:1"){ if($iy_ev>0 && $iy_dep>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } } else
			if($oran_s == "2:0"){ if($iy_ev>2 && $iy_dep>0){ echo "Kaybetti <br>"; kazanma(3, $kid); } } else
			if($oran_s == "2:1"){ if($iy_ev>2 && $iy_dep>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } } else
			if($oran_s == "2:2"){ if($iy_ev>2 && $iy_dep>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } } else
			if($oran_s == "1:2"){ if($iy_ev>1 && $iy_dep>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } } else
			if($oran_s == "0:2"){ if($iy_ev>0 && $iy_dep>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } } else
			if($oran_s == "3:0"){ if($iy_ev>3 && $iy_dep>0){ echo "Kaybetti <br>"; kazanma(3, $kid); } } else
			if($oran_s == "3:1"){ if($iy_ev>3 && $iy_dep>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } } else
			if($oran_s == "3:2"){ if($iy_ev>3 && $iy_dep>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } } else
			if($oran_s == "3:3"){ if($iy_ev>3 && $iy_dep>3){ echo "Kaybetti <br>"; kazanma(3, $kid); } } else
			if($oran_s == "2:3"){ if($iy_ev>2 && $iy_dep>3){ echo "Kaybetti <br>"; kazanma(3, $kid); } } else
			if($oran_s == "1:3"){ if($iy_ev>1 && $iy_dep>3){ echo "Kaybetti <br>"; kazanma(3, $kid); } } else
			if($oran_s == "0:3"){ if($iy_ev>0 && $iy_dep>3){ echo "Kaybetti <br>"; kazanma(3, $kid); } } else
			if($oran_s == "4:0"){ if($iy_ev>4 && $iy_dep>0){ echo "Kaybetti <br>"; kazanma(3, $kid); } } else
			if($oran_s == "4:1"){ if($iy_ev>4 && $iy_dep>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } } else
			if($oran_s == "4:2"){ if($iy_ev>4 && $iy_dep>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } } else
			if($oran_s == "4:3"){ if($iy_ev>4 && $iy_dep>3){ echo "Kaybetti <br>"; kazanma(3, $kid); } } else
			if($oran_s == "4:4"){ if($iy_ev>4 && $iy_dep>4){ echo "Kaybetti <br>"; kazanma(3, $kid); } } else
			if($oran_s == "3:4"){ if($iy_ev>3 && $iy_dep>4){ echo "Kaybetti <br>"; kazanma(3, $kid); } } else
			if($oran_s == "2:4"){ if($iy_ev>2 && $iy_dep>4){ echo "Kaybetti <br>"; kazanma(3, $kid); } } else
			if($oran_s == "1:4"){ if($iy_ev>1 && $iy_dep>4){ echo "Kaybetti <br>"; kazanma(3, $kid); } } else
			if($oran_s == "0:4"){ if($iy_ev>0 && $iy_dep>4){ echo "Kaybetti <br>"; kazanma(3, $kid); } }
		} else if($mDurum=="Devre Arası" || $mDurum=="İkinci Yarı"){
			if($oran_s == "0:0" && $iy_ev==0 && $iy_dep==0){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "1:0" && $iy_ev==1 && $iy_dep==0){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "1:1" && $iy_ev==1 && $iy_dep==1){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "0:1" && $iy_ev==0 && $iy_dep==1){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "2:0" && $iy_ev==2 && $iy_dep==0){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "2:1" && $iy_ev==2 && $iy_dep==1){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "2:2" && $iy_ev==2 && $iy_dep==2){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "1:2" && $iy_ev==1 && $iy_dep==2){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "0:2" && $iy_ev==0 && $iy_dep==2){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "3:0" && $iy_ev==3 && $iy_dep==0){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "3:1" && $iy_ev==3 && $iy_dep==1){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "3:2" && $iy_ev==3 && $iy_dep==2){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "3:3" && $iy_ev==3 && $iy_dep==3){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "2:3" && $iy_ev==2 && $iy_dep==3){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "1:3" && $iy_ev==1 && $iy_dep==3){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "0:3" && $iy_ev==0 && $iy_dep==3){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "4:0" && $iy_ev==4 && $iy_dep==0){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "4:1" && $iy_ev==4 && $iy_dep==1){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "4:2" && $iy_ev==4 && $iy_dep==2){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "4:3" && $iy_ev==4 && $iy_dep==3){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "4:4" && $iy_ev==4 && $iy_dep==4){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "3:4" && $iy_ev==3 && $iy_dep==4){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "2:4" && $iy_ev==2 && $iy_dep==4){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "1:4" && $iy_ev==1 && $iy_dep==4){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "0:4" && $iy_ev==0 && $iy_dep==4){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			{ echo "Kaybetti <br>"; kazanma(3, $kid); }
		}
	} else if($oad == "Maç Skoru"){
			if($oran_s == "0:0" && $ev_skor>0 || $konuk_skor>0){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "1:0" && $ev_skor>1 || $konuk_skor>0){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "1:1" && $ev_skor>1 || $konuk_skor>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "0:1" && $ev_skor>0 || $konuk_skor>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "2:0" && $ev_skor>2 || $konuk_skor>0){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "2:1" && $ev_skor>2 || $konuk_skor>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "2:2" && $ev_skor>2 || $konuk_skor>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "1:2" && $ev_skor>1 || $konuk_skor>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "0:2" && $ev_skor>0 || $konuk_skor>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "3:0" && $ev_skor>3 || $konuk_skor>0){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "3:1" && $ev_skor>3 || $konuk_skor>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "3:2" && $ev_skor>3 || $konuk_skor>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "3:3" && $ev_skor>3 || $konuk_skor>3){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "2:3" && $ev_skor>2 || $konuk_skor>3){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "1:3" && $ev_skor>1 || $konuk_skor>3){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "0:3" && $ev_skor>0 || $konuk_skor>3){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "4:0" && $ev_skor>4 || $konuk_skor>0){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "4:1" && $ev_skor>4 || $konuk_skor>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "4:2" && $ev_skor>4 || $konuk_skor>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "4:3" && $ev_skor>4 || $konuk_skor>3){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "4:4" && $ev_skor>4 || $konuk_skor>4){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "3:4" && $ev_skor>3 || $konuk_skor>4){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "2:4" && $ev_skor>2 || $konuk_skor>4){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "1:4" && $ev_skor>1 || $konuk_skor>4){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "0:4" && $ev_skor>0 || $konuk_skor>4){ echo "Kaybetti <br>"; kazanma(3, $kid); }
	} else if($oad == "Ev Sahibi 1.Yarı 0.5 Gol Alt Üst"){
		if($mDurum=="İlk Yarı"){
			if($oran_s == "A" && $iy_ev>0){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $iy_ev>0){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 0.5" && $iy_ev>0){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 0.5" && $iy_ev>0){ echo "Kazandı <br>"; kazanma(2, $kid); }
		} else if($mDurum=="Devre Arası" || $mDurum=="İkinci Yarı"){
			if($oran_s == "A" && $iy_ev<1){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Ü" && $iy_ev>0){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 0.5" && $iy_ev<1){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Üst 0.5" && $iy_ev>0){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			{ echo "Kaybetti <br>"; kazanma(3, $kid); }
		}
	} else if($oad == "Ev Sahibi 1.Yarı 1.5 Gol Alt Üst"){
		if($mDurum=="İlk Yarı"){
			if($oran_s == "A" && $iy_ev>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $iy_ev>1){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 1.5" && $iy_ev>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 1.5" && $iy_ev>1){ echo "Kazandı <br>"; kazanma(2, $kid); }
		} else if($mDurum=="Devre Arası" || $mDurum=="İkinci Yarı"){
			if($oran_s == "A" && $iy_ev<2){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Ü" && $iy_ev>1){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 1.5" && $iy_ev<2){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Üst 1.5" && $iy_ev>1){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			{ echo "Kaybetti <br>"; kazanma(3, $kid); }
		}
	} else if($oad == "Ev Sahibi 1.Yarı 2.5 Gol Alt Üst"){
		if($mDurum=="İlk Yarı"){
			if($oran_s == "A" && $iy_ev>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $iy_ev>2){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 2.5" && $iy_ev>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 2.5" && $iy_ev>2){ echo "Kazandı <br>"; kazanma(2, $kid); }
		} else if($mDurum=="Devre Arası" || $mDurum=="İkinci Yarı"){
			if($oran_s == "A" && $iy_ev<3){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Ü" && $iy_ev>2){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 2.5" && $iy_ev<3){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Üst 2.5" && $iy_ev>2){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			{ echo "Kaybetti <br>"; kazanma(3, $kid); }
		}
	} else if($oad == "Deplasman 1.Yarı 0.5 Gol Alt Üst"){
		if($mDurum=="İlk Yarı"){
			if($oran_s == "A" && $iy_dep>0){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $iy_dep>0){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 0.5" && $iy_dep>0){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 0.5" && $iy_dep>0){ echo "Kazandı <br>"; kazanma(2, $kid); }
		} else if($mDurum=="Devre Arası" || $mDurum=="İkinci Yarı"){
			if($oran_s == "A" && $iy_dep<1){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Ü" && $iy_dep>0){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 0.5" && $iy_dep<1){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Üst 0.5" && $iy_dep>0){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			{ echo "Kaybetti <br>"; kazanma(3, $kid); }
		}
	} else if($oad == "Deplasman 1.Yarı 1.5 Gol Alt Üst"){
		if($mDurum=="İlk Yarı"){
			if($oran_s == "A" && $iy_dep>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $iy_dep>1){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 1.5" && $iy_dep>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 1.5" && $iy_dep>1){ echo "Kazandı <br>"; kazanma(2, $kid); }
		} else if($mDurum=="Devre Arası" || $mDurum=="İkinci Yarı"){
			if($oran_s == "A" && $iy_dep<2){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Ü" && $iy_dep>1){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 1.5" && $iy_dep<2){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Üst 1.5" && $iy_dep>1){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			{ echo "Kaybetti <br>"; kazanma(3, $kid); }
		}
	} else if($oad == "Deplasman 1.Yarı 2.5 Gol Alt Üst"){
		if($mDurum=="İlk Yarı"){
			if($oran_s == "A" && $iy_dep>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Ü" && $iy_dep>2){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 2.5" && $iy_dep>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "Üst 2.5" && $iy_dep>2){ echo "Kazandı <br>"; kazanma(2, $kid); }
		} else if($mDurum=="Devre Arası" || $mDurum=="İkinci Yarı"){
			if($oran_s == "A" && $iy_dep<3){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Ü" && $iy_dep>2){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Alt 2.5" && $iy_dep<3){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "Üst 2.5" && $iy_dep>2){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			{ echo "Kaybetti <br>"; kazanma(3, $kid); }
		}
	} else if($oad == "Ev Sahibi İlk Yarı Tam Gol Sayısı"){
		if($mDurum=="İlk Yarı"){
			if($oran_s == "Gol Yok" && $iy_ev>0){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "1" && $iy_ev>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "2" && $iy_ev>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "1 Gol" && $iy_ev>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "2 Gol" && $iy_ev>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "3 veya üstü" && $iy_ev>2){ echo "Kazandı <br>"; kazanma(2, $kid); }
		} else if($mDurum=="Devre Arası" || $mDurum=="İkinci Yarı"){
			if($oran_s == "Gol Yok" && $iy_ev==0){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "1" && $iy_ev==1){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "2" && $iy_ev==2){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "1 Gol" && $iy_ev==1){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "2 Gol" && $iy_ev==2){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "3 veya üstü" && $iy_ev>2){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			{ echo "Kaybetti <br>"; kazanma(3, $kid); }
		}
	} else if($oad == "Ev sahibi İkinci Yarı Tam Gol Sayısı" && $mDurum=="İkinci Yarı"){
			if($oran_s == "Gol Yok" && $ik_ev>0){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "1" && $ik_ev>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "2" && $ik_ev>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "1 Gol" && $ik_ev>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "2 Gol" && $ik_ev>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "3 veya üstü" && $ik_ev>2){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "Deplasman İlk Yarı Tam Gol Sayısı"){
		if($mDurum=="İlk Yarı"){
			if($oran_s == "Gol Yok" && $iy_dep>0){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "1" && $iy_dep>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "2" && $iy_dep>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "1 Gol" && $iy_dep>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "2 Gol" && $iy_dep>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "3 veya üstü" && $iy_dep>2){ echo "Kazandı <br>"; kazanma(2, $kid); }
		} else if($mDurum=="Devre Arası" || $mDurum=="İkinci Yarı"){
			if($oran_s == "Gol Yok" && $iy_dep==0){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "1" && $iy_dep==1){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "2" && $iy_dep==2){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "1 Gol" && $iy_dep==1){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "2 Gol" && $iy_dep==2){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "3 veya üstü" && $iy_dep>2){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			{ echo "Kaybetti <br>"; kazanma(3, $kid); }
		}
	} else if($oad == "Deplasman İkinci Yarı Tam Gol Sayısı" && $mDurum=="İkinci Yarı"){
			if($oran_s == "Gol Yok" && $ik_dep>0){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "1" && $ik_dep>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "2" && $ik_dep>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "1 Gol" && $ik_dep>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "2 Gol" && $ik_dep>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "3 veya üstü" && $ik_dep>2){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "1.Yarı Sonucu" && $mDurum!="İlk Yarı"){
			if($oran_s == "1" && $iy_ev>$iy_dep){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "X" && $iy_ev==$iy_dep){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "2" && $iy_ev<$iy_dep){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			{ echo "Kaybetti <br>"; kazanma(3, $kid); }
	} else if($oad == "İlk Yarıda Kaç Gol Olur ?"){
		if($mDurum=="İlk Yarı"){
			if($oran_s == "Gol Yok" && $iy_toplam_gol>0){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "1" && $iy_toplam_gol>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "2" && $iy_toplam_gol>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "1 Gol" && $iy_toplam_gol>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "2 Gol" && $iy_toplam_gol>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "3 veya üstü" && $iy_toplam_gol>2){ echo "Kazandı <br>"; kazanma(2, $kid); }
		} else if($mDurum=="Devre Arası" || $mDurum=="İkinci Yarı"){
			if($oran_s == "Gol Yok" && $iy_toplam_gol==0){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "1" && $iy_toplam_gol==1){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "2" && $iy_toplam_gol==2){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "1 Gol" && $iy_toplam_gol==1){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "2 Gol" && $iy_toplam_gol==2){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "3 veya üstü" && $iy_toplam_gol>2){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			{ echo "Kaybetti <br>"; kazanma(3, $kid); }
		}
	} else if($oad == "2.Yarıda Toplam Kaç Gol Olur ?" && $mDurum=="İkinci Yarı"){
			if($oran_s == "Gol Yok" && $ik_toplam_gol>0){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "1" && $ik_toplam_gol>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "2" && $ik_toplam_gol>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "1 Gol" && $ik_toplam_gol>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "2 Gol" && $ik_toplam_gol>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "3 veya üstü" && $ik_toplam_gol>2){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "Müsabakada kaç gol atılır? (0-4)"){
			if($oran_s == "0-1" && $ms_toplam_gol>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "2-3" && $ik_toplam_gol>3){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "4 veya üstü" && $ik_toplam_gol>3){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "Müsabakada kaç gol atılır? (0-5)"){
			if($oran_s == "0-2" && $ms_toplam_gol>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "3-4" && $ik_toplam_gol>4){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "5 veya üstü" && $ik_toplam_gol>4){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "Müsabakada kaç gol atılır? (0-6)"){
			if($oran_s == "0-3" && $ms_toplam_gol>3){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "4-5" && $ik_toplam_gol>5){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "6 veya üstü" && $ik_toplam_gol>5){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "1. yarıda 1.golü hangi takım atar?"){
		$golvarmi = golbul($mac_data['id'], 1);
		if($mDurum=="İlk Yarı"){
			if($oran_s == "1" && $golvarmi==1 && $iy_toplam_gol>0){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "X" && $iy_toplam_gol>0){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "2" && $golvarmi==2 && $iy_toplam_gol>0){ echo "Kazandı <br>"; kazanma(2, $kid); }
		} else if($mDurum=="Devre Arası" || $mDurum=="İkinci Yarı"){
			if($oran_s == "1" && $golvarmi==1 && $iy_toplam_gol>0){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "X" && $iy_toplam_gol==0){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "2" && $golvarmi==2 && $iy_toplam_gol>0){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			{ echo "Kaybetti <br>"; kazanma(3, $kid); }
		}
	} else if($oad == "1. yarıda 2.golü hangi takım atar?"){
		$golvarmi = golbul($mac_data['id'], 2);
		if($mDurum=="İlk Yarı"){
			if($oran_s == "1" && $golvarmi==1 && $iy_toplam_gol>1){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "X" && $iy_toplam_gol>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "2" && $golvarmi==2 && $iy_toplam_gol>1){ echo "Kazandı <br>"; kazanma(2, $kid); }
		} else if($mDurum=="Devre Arası" || $mDurum=="İkinci Yarı"){
			if($oran_s == "1" && $golvarmi==1 && $iy_toplam_gol>1){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "X" && $iy_toplam_gol==1){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "2" && $golvarmi==2 && $iy_toplam_gol>1){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			{ echo "Kaybetti <br>"; kazanma(3, $kid); }
		}
	} else if($oad == "1.golü hangi takım atar?"){
		$golvarmi = golbul($mac_data['id'], 1);
			if($oran_s == "1" && $golvarmi==1 && $ms_toplam_gol>0){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "X" && $ms_toplam_gol>0){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "2" && $golvarmi==2 && $ms_toplam_gol>0){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "2.golü hangi takım atar?"){
		$golvarmi = golbul($mac_data['id'], 2);
			if($oran_s == "1" && $golvarmi==1 && $ms_toplam_gol>1){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "X" && $ms_toplam_gol>1){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "2" && $golvarmi==2 && $ms_toplam_gol>1){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "3.golü hangi takım atar?"){
		$golvarmi = golbul($mac_data['id'], 3);
			if($oran_s == "1" && $golvarmi==1 && $ms_toplam_gol>2){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "X" && $ms_toplam_gol>2){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "2" && $golvarmi==2 && $ms_toplam_gol>2){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "4.golü hangi takım atar?"){
		$golvarmi = golbul($mac_data['id'], 4);
			if($oran_s == "1" && $golvarmi==1 && $ms_toplam_gol>3){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "X" && $ms_toplam_gol>3){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "2" && $golvarmi==2 && $ms_toplam_gol>3){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "5.golü hangi takım atar?"){
		$golvarmi = golbul($mac_data['id'], 5);
			if($oran_s == "1" && $golvarmi==1 && $ms_toplam_gol>4){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "X" && $ms_toplam_gol>4){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "2" && $golvarmi==2 && $ms_toplam_gol>4){ echo "Kazandı <br>"; kazanma(2, $kid); }
	} else if($oad == "6.golü hangi takım atar?"){
		$golvarmi = golbul($mac_data['id'], 6);
			if($oran_s == "1" && $golvarmi==1 && $ms_toplam_gol>5){ echo "Kazandı <br>"; kazanma(2, $kid); } else
			if($oran_s == "X" && $ms_toplam_gol>5){ echo "Kaybetti <br>"; kazanma(3, $kid); } else
			if($oran_s == "2" && $golvarmi==2 && $ms_toplam_gol>5){ echo "Kazandı <br>"; kazanma(2, $kid); }
	}

}
 

function kazanma($durum, $kid){
	GLOBAL $sonuclandirXBX;
	if($sonuclandirXBX === true){
		/* Check bekletme suresi */
		$check_timeout = 7 * 60;
		
		/* Sonuclandirma kilidi */
		$result_unlocked = false;
		
		/* Sonuclandirmadan once kolon icin check yapilmis mi ? */
		$check = sed_sql_query("SELECT check_time FROM kupon_ic WHERE id = '$kid'");
		if(sed_sql_numrows($check) > 0){
			$x = sed_sql_fetcharray($check);
			$check_time = $x["check_time"];
			if($check_time > 0){
				/* Kontrol zamani girilmis, timeout gecerli mi ? */
				if( time() > $check_time ){
					/* Check suresi dolmus, sonuclandir */
					$result_unlocked = true;
				}
			}else{
				/* Check time tanimli degil, tanimla ve suanda islemi pas gec */
				sed_sql_query("UPDATE kupon_ic SET check_time = '". (time() + $check_timeout) ."' WHERE id = '$kid'");
			}
		}
		
		if($result_unlocked === true){
			$suan = time();
			$kuponbilgi = bilgi("select kupon_id from kupon_ic where id='$kid'");
			$kupon = bilgi("select kupon_time,id from kuponlar where id='$kuponbilgi[kupon_id]'");
			$fark = $suan-$kupon['kupon_time'];
			if($fark<150 && $durum==2) {
				sed_sql_query("update kupon_ic set sonuc_time='$suan',sahibe='1' where id='$kid'");
			} else {
				sed_sql_query("update kupon_ic set sonuc_time='$suan',kazanma='$durum' where id='$kid'");
			}
		}
	}
}

function golbul($mac_db_id,$gol) {
	$sor = sed_sql_query("select mac_db_id,golsayi,atantakim from canli_gol_list where mac_db_id='$mac_db_id' and golsayi='$gol' ORDER BY id DESC");
	if(sed_sql_numrows($sor)<1) { $donen = "0"; } else {
	$bilgisi = sed_sql_fetcharray($sor);
	$donen = $bilgisi['atantakim'];
	}
	return $donen;
}

function check_kontrol(){
	$data = sed_sql_query("SELECT id, kupon_id, check_time FROM kupon_ic WHERE check_time != 0 AND kazanma = 1");
	if(sed_sql_numrows($data)){
		while($x = sed_sql_fetcharray($data)){
			if(time() > ($x["check_time"]+(485))){
				/* Check time'si sifirla */
				sed_sql_query("UPDATE kupon_ic SET check_time = 0 WHERE id = '". $x["id"] ."'");
				echo "Sifirlandi, Kupon ID: " . $x["kupon_id"] . "<br>"; 
			}
		}
	}
}

 ?>
 <meta http-equiv="refresh" content="15">