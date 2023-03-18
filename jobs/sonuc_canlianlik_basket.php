<?php
$sonuclandirXBX = true;
echo "<pre>"; 
echo date('d.m.Y H:i:s')."\n";
include 'xml.php';

check_kontrol();

$sql = "SELECT * FROM kupon_ic where kazanma = 1 AND spor_tip='canlib' AND mac_kodu='CNLB'";
$sor = sed_sql_query($sql);
if(sed_sql_numrows($sor)>0) {
	while ($r = sed_sql_fetchassoc($sor)) {
		$mac = "SELECT * FROM basketbol_canli_maclar WHERE gizli=0 AND id=".$r['mac_db_id'];
		$s = sed_sql_query($mac);
		$mac_id = $r['mac_db_id'];
		$d = sed_sql_fetchassoc($s);
		$oran =  $r['oran_tip'];
		$oran = explode("|", $oran);
		$songuncelleme = $mb['songuncelleme'];
		$fark = time()-$songuncelleme;	
		$iy_durum = $mb['iybitti'];
		$oran_t = trim($oran[0]);
		$oran_s = trim($oran[1]);
		$kid = $r['id'];
		$kid2 = $r['kupon_id'];
		$secenek_nedir = $r['oran_val'];
		if(isset($d) && !empty($d)) {
			$iy_ev_toplam = $d["iy_ev"];
			$ms_ev_toplam = $d["ev_skor"];
			$iy_konuk_toplam = $d["iy_konuk"];
			$ms_konuk_toplam = $d["konuk_skor"];
			echo "<br>";
			echo "Kupon Numarası: " . $kid2 . "<br>";
			echo "Kupondaki Maç ID'si: " . $kid . "<br>";
			echo $d["ev_takim"] . " - " . $d["konuk_takim"] . "<br>";
			echo "IY: " . $d["iy_ev"] . "-" . $d["iy_konuk"] . " / MS: " . $d["ev_skor"] . "-" . $d["konuk_skor"] . "<br>";
			
			echo $oran_t . "<br>";
			echo "Secenek: " . $oran_s . "<br>";
			sonuclandir($oran_t,$oran_s,$d,$kid,$secenek_nedir);
			echo "<br><br>";
			
		}
	}
}else{
	echo "Anlık sonuçlandırılacak kayıt bulunamadı..";
}

function sonuclandir($oad, $oran_s, $mac_data, $kid, $secenekver){
	$mac_db_id = $mac_data['id'];
	$mb = bilgi("select * from basketbol_canli_maclar where id='$mac_db_id'");
	$songuncelleme = $mb['songuncelleme'];
	$fark = time()-$songuncelleme;
	
	$oran_s_bol = explode(" ",$oran_s);
	$oran_1_bosluk = $oran_s_bol[0];
	$oran_secenek_nedir = $oran_s_bol[1];
	$secenekvirgul = explode(',',$oran_s_bol[1]);
	$secenekver_handikap = $secenekvirgul[0].".5";
	
	$birinci_period = $mac_data['bir_period_skor'];
	$ikinci_period = $mac_data['iki_period_skor'];
	$ucuncu_period = $mac_data['uc_period_skor'];
	$dorduncu_period = $mac_data['dort_period_skor'];
	
	$period_1 =  $mac_data['bir_period_skor'];
	$period_1 = explode(" - ", $period_1);
	$period_1_bol_ev = trim($period_1[0]);
	$period_1_bol_konuk = trim($period_1[1]);
	
	$period_2 =  $mac_data['iki_period_skor'];
	$period_2 = explode(" - ", $period_2);
	$period_2_bol_ev = trim($period_2[0]);
	$period_2_bol_konuk = trim($period_2[1]);
	
	$period_3 =  $mac_data['uc_period_skor'];
	$period_3 = explode(" - ", $period_3);
	$period_3_bol_ev = trim($period_3[0]);
	$period_3_bol_konuk = trim($period_3[1]);
	
	$period_4 =  $mac_data['dort_period_skor'];
	$period_4 = explode(" - ", $period_4);
	$period_4_bol_ev = trim($period_4[0]);
	$period_4_bol_konuk = trim($period_4[1]);
	
	$period_1_toplami = $period_1_bol_ev+$period_1_bol_konuk;
	$period_2_toplami = $period_2_bol_ev+$period_2_bol_konuk;
	$period_3_toplami = $period_3_bol_ev+$period_3_bol_konuk;
	$period_4_toplami = $period_4_bol_ev+$period_4_bol_konuk;
	$iy_ev_toplam = $period_1_bol_ev+$period_2_bol_ev;
	$iy_konuk_toplam = $period_1_bol_konuk+$period_2_bol_konuk;
	$ikinci_ev_toplam = $period_3_bol_ev+$period_4_bol_ev;
	$ikinci_konuk_toplam = $period_3_bol_konuk+$period_4_bol_konuk;
	$ikinci_yari_toplamlari = $ikinci_ev_toplam+$ikinci_konuk_toplam;
	$ev_takim_toplam = $period_1_bol_ev+$period_2_bol_ev+$period_3_bol_ev+$period_4_bol_ev;
	$konuk_takim_toplam = $period_1_bol_konuk+$period_2_bol_konuk+$period_3_bol_konuk+$period_4_bol_konuk;
	
	$iy_period_gol_sayisi = $iy_ev_toplam+$iy_konuk_toplam;
	$ms_period_gol_sayisi = $ikinci_ev_toplam+$ikinci_konuk_toplam;
	$toplam_period_gol_sayisi = $ev_takim_toplam+$konuk_takim_toplam;
	
	if($period_1_toplami%2==0) { $period_1_tekcift = "cift"; } else { $period_1_tekcift = "tek"; }
	if($period_2_toplami%2==0) { $period_2_tekcift = "cift"; } else { $period_2_tekcift = "tek"; }
	if($period_3_toplami%2==0) { $period_3_tekcift = "cift"; } else { $period_3_tekcift = "tek"; }
	if($period_4_toplami%2==0) { $period_4_tekcift = "cift"; } else { $period_4_tekcift = "tek"; }
	if($iy_period_gol_sayisi%2==0) { $iy_toplam_tekcift = "cift"; } else { $iy_toplam_tekcift = "tek"; }
	
	
	$mDurum = $mac_data["period"];
	
	if($oad == "1X2(1.YARI)"){
		if($mDurum=="2.Ara" || $mDurum=="3.Çeyrek" || $mDurum=="3.Ara" || $mDurum=="4.Çeyrek"){
		if($oran_s == "1" && $iy_ev_toplam > $iy_konuk_toplam){ echo "Kazandı <br>"; kazanma(2, $kid); } else
		if($oran_s == "X" && $iy_ev_toplam == $iy_konuk_toplam){ echo "Kazandı <br>"; kazanma(2, $kid); } else
		if($oran_s == "2" && $iy_ev_toplam < $iy_konuk_toplam){ echo "Kazandı <br>"; kazanma(2, $kid); } else
		{ echo "Kaybettiasd <br>"; kazanma(3, $kid); }
		}
	} else if($oad == "1X2(1.Çeyrek)"){
		if($mDurum=="2.Çeyrek" || $mDurum=="2.Ara" || $mDurum=="3.Çeyrek" || $mDurum=="3.Ara" || $mDurum=="4.Çeyrek"){
		if($oran_s == "1" && $period_1_bol_ev > $period_1_bol_konuk){ echo "Kazandı <br>"; kazanma(2, $kid); } else
		if($oran_s == "X" && $period_1_bol_ev == $period_1_bol_konuk){ echo "Kazandı <br>"; kazanma(2, $kid); } else
		if($oran_s == "2" && $period_1_bol_ev < $period_1_bol_konuk){ echo "Kazandı <br>"; kazanma(2, $kid); } else
		{ echo "Kaybetti <br>"; kazanma(3, $kid); }
		}
	} else if($oad == "1X2(2.Çeyrek)"){
		if($mDurum=="3.Çeyrek" || $mDurum=="3.Ara" || $mDurum=="4.Çeyrek"){
		if($oran_s == "1" && $period_2_bol_ev > $period_2_bol_konuk){ echo "Kazandı <br>"; kazanma(2, $kid); } else
		if($oran_s == "X" && $period_2_bol_ev == $period_2_bol_konuk){ echo "Kazandı <br>"; kazanma(2, $kid); } else
		if($oran_s == "2" && $period_2_bol_ev < $period_2_bol_konuk){ echo "Kazandı <br>"; kazanma(2, $kid); } else
		{ echo "Kaybetti <br>"; kazanma(3, $kid); }
		}
	} else if($oad == "1X2(3.Çeyrek)" && $mDurum=="4.Çeyrek"){
		if($oran_s == "1" && $period_3_bol_ev > $period_3_bol_konuk){ echo "Kazandı <br>"; kazanma(2, $kid); } else
		if($oran_s == "X" && $period_3_bol_ev == $period_3_bol_konuk){ echo "Kazandı <br>"; kazanma(2, $kid); } else
		if($oran_s == "2" && $period_3_bol_ev < $period_3_bol_konuk){ echo "Kazandı <br>"; kazanma(2, $kid); } else
		{ echo "Kaybetti <br>"; kazanma(3, $kid); }
	} else if($oad == "1.Yarı Kim Kazanır"){
		if($mDurum=="2.Ara" || $mDurum=="3.Çeyrek" || $mDurum=="3.Ara" || $mDurum=="4.Çeyrek"){
		if($oran_s == "1" && $iy_ev_toplam > $iy_konuk_toplam){ echo "Kazandı <br>"; kazanma(2, $kid); } else
		if($oran_s == "2" && $iy_ev_toplam < $iy_konuk_toplam){ echo "Kazandı <br>"; kazanma(2, $kid); } else
		{ echo "Kaybetti <br>"; kazanma(3, $kid); }
		}
	} else if($oad == "1.Çeyrek Kim Kazanır"){
		if($mDurum=="1.Ara" || $mDurum=="2.Çeyrek" || $mDurum=="2.Ara" || $mDurum=="3.Çeyrek" || $mDurum=="3.Ara" || $mDurum=="4.Çeyrek"){
		if($oran_s == "1" && $period_1_bol_ev > $period_1_bol_konuk){ echo "Kazandı <br>"; kazanma(2, $kid); } else
		if($oran_s == "2" && $period_1_bol_ev < $period_1_bol_konuk){ echo "Kazandı <br>"; kazanma(2, $kid); } else
		{ echo "Kaybetti <br>"; kazanma(3, $kid); }
		}
	} else if($oad == "2.Çeyrek Kim Kazanır"){
		if($mDurum=="2.Ara" || $mDurum=="3.Çeyrek" || $mDurum=="3.Ara" || $mDurum=="4.Çeyrek"){
		if($oran_s == "1" && $period_2_bol_ev > $period_2_bol_konuk){ echo "Kazandı <br>"; kazanma(2, $kid); } else
		if($oran_s == "2" && $period_2_bol_ev < $period_2_bol_konuk){ echo "Kazandı <br>"; kazanma(2, $kid); } else
		{ echo "Kaybetti <br>"; kazanma(3, $kid); }
		}
	} else if($oad == "3.Çeyrek Kim Kazanır"){
		if($mDurum=="3.Ara" || $mDurum=="4.Çeyrek"){
		if($oran_s == "1" && $period_3_bol_ev > $period_3_bol_konuk){ echo "Kazandı <br>"; kazanma(2, $kid); } else
		if($oran_s == "2" && $period_3_bol_ev < $period_3_bol_konuk){ echo "Kazandı <br>"; kazanma(2, $kid); } else
		{ echo "Kaybetti <br>"; kazanma(3, $kid); }
		}
	} else if($oad == "Toplam Skor Alt/Üst"){
		if($oran_1_bosluk == "A" && $toplam_period_gol_sayisi > $oran_secenek_nedir){ echo "Kaybetti <br> A ".$oran_secenek_nedir."<br>"; kazanma(3, $kid); } else
		if($oran_1_bosluk == "Ü" && $toplam_period_gol_sayisi > $oran_secenek_nedir){ echo "Kazandı <br> Ü ".$oran_secenek_nedir."<br>"; kazanma(2, $kid); } else
		if($oran_1_bosluk == "Alt" && $toplam_period_gol_sayisi > $oran_secenek_nedir){ echo "Kaybetti <br> A ".$oran_secenek_nedir."<br>"; kazanma(3, $kid); } else
		if($oran_1_bosluk == "Üst" && $toplam_period_gol_sayisi > $oran_secenek_nedir){ echo "Kazandı <br> Ü ".$oran_secenek_nedir."<br>"; kazanma(2, $kid); }
	} else if($oad == "1.Çeyrek Toplam Alt/Üst"){
		if($mDurum=="1.Çeyrek"){
		if($oran_1_bosluk == "A" && $period_1_toplami > $oran_secenek_nedir){ echo "Kaybetti <br> A ".$oran_secenek_nedir."<br>"; kazanma(3, $kid); } else
		if($oran_1_bosluk == "Ü" && $period_1_toplami > $oran_secenek_nedir){ echo "Kazandı <br> Ü ".$oran_secenek_nedir."<br>"; kazanma(2, $kid); } else
		if($oran_1_bosluk == "Alt" && $period_1_toplami > $oran_secenek_nedir){ echo "Kaybetti <br> A ".$oran_secenek_nedir."<br>"; kazanma(3, $kid); } else
		if($oran_1_bosluk == "Üst" && $period_1_toplami > $oran_secenek_nedir){ echo "Kazandı <br> Ü ".$oran_secenek_nedir."<br>"; kazanma(2, $kid); }
		} else if($mDurum=="1.Ara" || $mDurum=="2.Çeyrek" || $mDurum=="2.Ara" || $mDurum=="3.Çeyrek" || $mDurum=="3.Ara" || $mDurum=="4.Çeyrek"){
		if($oran_1_bosluk == "A" && $period_1_toplami < $oran_secenek_nedir){ echo "Kazandı <br> A ".$oran_secenek_nedir."<br>"; kazanma(2, $kid); } else
		if($oran_1_bosluk == "Ü" && $period_1_toplami > $oran_secenek_nedir){ echo "Kazandı <br> Ü ".$oran_secenek_nedir."<br>"; kazanma(2, $kid); } else
		if($oran_1_bosluk == "Alt" && $period_1_toplami < $oran_secenek_nedir){ echo "Kazandı <br> A ".$oran_secenek_nedir."<br>"; kazanma(2, $kid); } else
		if($oran_1_bosluk == "Üst" && $period_1_toplami > $oran_secenek_nedir){ echo "Kazandı <br> Ü ".$oran_secenek_nedir."<br>"; kazanma(2, $kid); } else
		{ echo "Kaybetti <br>"; kazanma(3, $kid); }
		}
	} else if($oad == "2.Çeyrek Toplam Alt/Üst"){
		if($mDurum=="2.Çeyrek"){
		if($oran_1_bosluk == "A" && $period_2_toplami > $oran_secenek_nedir){ echo "Kaybetti <br> A ".$oran_secenek_nedir."<br>"; kazanma(3, $kid); } else
		if($oran_1_bosluk == "Ü" && $period_2_toplami > $oran_secenek_nedir){ echo "Kazandı <br> Ü ".$oran_secenek_nedir."<br>"; kazanma(2, $kid); } else
		if($oran_1_bosluk == "Alt" && $period_2_toplami > $oran_secenek_nedir){ echo "Kaybetti <br> A ".$oran_secenek_nedir."<br>"; kazanma(3, $kid); } else
		if($oran_1_bosluk == "Üst" && $period_2_toplami > $oran_secenek_nedir){ echo "Kazandı <br> Ü ".$oran_secenek_nedir."<br>"; kazanma(2, $kid); }
		} else if($mDurum=="2.Ara" || $mDurum=="3.Çeyrek" || $mDurum=="3.Ara" || $mDurum=="4.Çeyrek"){
		if($oran_1_bosluk == "A" && $period_2_toplami < $oran_secenek_nedir){ echo "Kazandı <br> A ".$oran_secenek_nedir."<br>"; kazanma(2, $kid); } else
		if($oran_1_bosluk == "Ü" && $period_2_toplami > $oran_secenek_nedir){ echo "Kazandı <br> Ü ".$oran_secenek_nedir."<br>"; kazanma(2, $kid); } else
		if($oran_1_bosluk == "Alt" && $period_2_toplami < $oran_secenek_nedir){ echo "Kazandı <br> A ".$oran_secenek_nedir."<br>"; kazanma(2, $kid); } else
		if($oran_1_bosluk == "Üst" && $period_2_toplami > $oran_secenek_nedir){ echo "Kazandı <br> Ü ".$oran_secenek_nedir."<br>"; kazanma(2, $kid); } else
		{ echo "Kaybetti <br>"; kazanma(3, $kid); }
		}
	} else if($oad == "3.Çeyrek Toplam Alt/Üst"){
		if($mDurum=="3.Çeyrek"){
		if($oran_1_bosluk == "A" && $period_3_toplami > $oran_secenek_nedir){ echo "Kaybetti <br> A ".$oran_secenek_nedir."<br>"; kazanma(3, $kid); } else
		if($oran_1_bosluk == "Ü" && $period_3_toplami > $oran_secenek_nedir){ echo "Kazandı <br> Ü ".$oran_secenek_nedir."<br>"; kazanma(2, $kid); } else
		if($oran_1_bosluk == "Alt" && $period_3_toplami > $oran_secenek_nedir){ echo "Kaybetti <br> A ".$oran_secenek_nedir."<br>"; kazanma(3, $kid); } else
		if($oran_1_bosluk == "Üst" && $period_3_toplami > $oran_secenek_nedir){ echo "Kazandı <br> Ü ".$oran_secenek_nedir."<br>"; kazanma(2, $kid); }
		} else if($mDurum=="3.Ara" || $mDurum=="4.Çeyrek"){
		if($oran_1_bosluk == "A" && $period_3_toplami < $oran_secenek_nedir){ echo "Kazandı <br> A ".$oran_secenek_nedir."<br>"; kazanma(2, $kid); } else
		if($oran_1_bosluk == "Ü" && $period_3_toplami > $oran_secenek_nedir){ echo "Kazandı <br> Ü ".$oran_secenek_nedir."<br>"; kazanma(2, $kid); } else
		if($oran_1_bosluk == "Alt" && $period_3_toplami < $oran_secenek_nedir){ echo "Kazandı <br> A ".$oran_secenek_nedir."<br>"; kazanma(2, $kid); } else
		if($oran_1_bosluk == "Üst" && $period_3_toplami > $oran_secenek_nedir){ echo "Kazandı <br> Ü ".$oran_secenek_nedir."<br>"; kazanma(2, $kid); } else
		{ echo "Kaybetti <br>"; kazanma(3, $kid); }
		}
	} else if($oad == "4.Çeyrek Toplam Alt/Üst" && $mDurum=="4.Çeyrek"){
		if($oran_1_bosluk == "A" && $period_4_toplami > $oran_secenek_nedir){ echo "Kaybetti <br> A ".$oran_secenek_nedir."<br>"; kazanma(3, $kid); } else
		if($oran_1_bosluk == "Ü" && $period_4_toplami > $oran_secenek_nedir){ echo "Kazandı <br> Ü ".$oran_secenek_nedir."<br>"; kazanma(2, $kid); } else
		if($oran_1_bosluk == "Alt" && $period_4_toplami > $oran_secenek_nedir){ echo "Kaybetti <br> A ".$oran_secenek_nedir."<br>"; kazanma(3, $kid); } else
		if($oran_1_bosluk == "Üst" && $period_4_toplami > $oran_secenek_nedir){ echo "Kazandı <br> Ü ".$oran_secenek_nedir."<br>"; kazanma(2, $kid); }
	} else if($oad == "1.Takım Toplam Alt/Üst"){
		if($oran_1_bosluk == "A" && $ev_takim_toplam > $oran_secenek_nedir){ echo "Kaybetti <br> A ".$oran_secenek_nedir."<br>"; kazanma(3, $kid); } else
		if($oran_1_bosluk == "Ü" && $ev_takim_toplam > $oran_secenek_nedir){ echo "Kazandı <br> Ü ".$oran_secenek_nedir."<br>"; kazanma(2, $kid); } else
		if($oran_1_bosluk == "Alt" && $ev_takim_toplam > $oran_secenek_nedir){ echo "Kaybetti <br> A ".$oran_secenek_nedir."<br>"; kazanma(3, $kid); } else
		if($oran_1_bosluk == "Üst" && $ev_takim_toplam > $oran_secenek_nedir){ echo "Kazandı <br> Ü ".$oran_secenek_nedir."<br>"; kazanma(2, $kid); }
	} else if($oad == "2.Takım Toplam Alt/Üst"){
		if($oran_1_bosluk == "A" && $konuk_takim_toplam > $oran_secenek_nedir){ echo "Kaybetti <br> A ".$oran_secenek_nedir."<br>"; kazanma(3, $kid); } else
		if($oran_1_bosluk == "Ü" && $konuk_takim_toplam > $oran_secenek_nedir){ echo "Kazandı <br> Ü ".$oran_secenek_nedir."<br>"; kazanma(2, $kid); } else
		if($oran_1_bosluk == "Alt" && $konuk_takim_toplam > $oran_secenek_nedir){ echo "Kaybetti <br> A ".$oran_secenek_nedir."<br>"; kazanma(3, $kid); } else
		if($oran_1_bosluk == "Üst" && $konuk_takim_toplam > $oran_secenek_nedir){ echo "Kazandı <br> Ü ".$oran_secenek_nedir."<br>"; kazanma(2, $kid); }
	} else if($oad == "1.Takım 1.Yarı Toplam Alt/Üst"){
		if($mDurum=="1.Çeyrek"){
		if($oran_1_bosluk == "A" && $iy_ev_toplam > $oran_secenek_nedir){ echo "Kaybetti <br> A ".$oran_secenek_nedir."<br>"; kazanma(3, $kid); } else
		if($oran_1_bosluk == "Ü" && $iy_ev_toplam > $oran_secenek_nedir){ echo "Kazandı <br> Ü ".$oran_secenek_nedir."<br>"; kazanma(2, $kid); } else
		if($oran_1_bosluk == "Alt" && $iy_ev_toplam > $oran_secenek_nedir){ echo "Kaybetti <br> A ".$oran_secenek_nedir."<br>"; kazanma(3, $kid); } else
		if($oran_1_bosluk == "Üst" && $iy_ev_toplam > $oran_secenek_nedir){ echo "Kazandı <br> Ü ".$oran_secenek_nedir."<br>"; kazanma(2, $kid); }
		} else if($mDurum=="1.Ara"){
		if($oran_1_bosluk == "A" && $iy_ev_toplam > $oran_secenek_nedir){ echo "Kaybetti <br> A ".$oran_secenek_nedir."<br>"; kazanma(3, $kid); } else
		if($oran_1_bosluk == "Ü" && $iy_ev_toplam > $oran_secenek_nedir){ echo "Kazandı <br> Ü ".$oran_secenek_nedir."<br>"; kazanma(2, $kid); } else
		if($oran_1_bosluk == "Alt" && $iy_ev_toplam > $oran_secenek_nedir){ echo "Kaybetti <br> A ".$oran_secenek_nedir."<br>"; kazanma(3, $kid); } else
		if($oran_1_bosluk == "Üst" && $iy_ev_toplam > $oran_secenek_nedir){ echo "Kazandı <br> Ü ".$oran_secenek_nedir."<br>"; kazanma(2, $kid); }
		} else if($mDurum=="2.Çeyrek"){
		if($oran_1_bosluk == "A" && $iy_ev_toplam > $oran_secenek_nedir){ echo "Kaybetti <br> A ".$oran_secenek_nedir."<br>"; kazanma(3, $kid); } else
		if($oran_1_bosluk == "Ü" && $iy_ev_toplam > $oran_secenek_nedir){ echo "Kazandı <br> Ü ".$oran_secenek_nedir."<br>"; kazanma(2, $kid); } else
		if($oran_1_bosluk == "Alt" && $iy_ev_toplam > $oran_secenek_nedir){ echo "Kaybetti <br> A ".$oran_secenek_nedir."<br>"; kazanma(3, $kid); } else
		if($oran_1_bosluk == "Üst" && $iy_ev_toplam > $oran_secenek_nedir){ echo "Kazandı <br> Ü ".$oran_secenek_nedir."<br>"; kazanma(2, $kid); }
		} else if($mDurum=="2.Ara" || $mDurum=="3.Çeyrek" || $mDurum=="3.Ara" || $mDurum=="4.Çeyrek"){
		if($oran_1_bosluk == "A" && $iy_ev_toplam < $oran_secenek_nedir){ echo "Kazandı <br> A ".$oran_secenek_nedir."<br>"; kazanma(2, $kid); } else
		if($oran_1_bosluk == "Ü" && $iy_ev_toplam > $oran_secenek_nedir){ echo "Kazandı <br> Ü ".$oran_secenek_nedir."<br>"; kazanma(2, $kid); } else
		if($oran_1_bosluk == "Alt" && $iy_ev_toplam < $oran_secenek_nedir){ echo "Kazandı <br> A ".$oran_secenek_nedir."<br>"; kazanma(2, $kid); } else
		if($oran_1_bosluk == "Üst" && $iy_ev_toplam > $oran_secenek_nedir){ echo "Kazandı <br> Ü ".$oran_secenek_nedir."<br>"; kazanma(2, $kid); } else
		{ echo "Kaybetti <br>"; kazanma(3, $kid); }
		}
	} else if($oad == "2.Takım 1.Yarı Toplam Alt/Üst"){
		if($mDurum=="1.Çeyrek"){
		if($oran_1_bosluk == "A" && $iy_konuk_toplam > $oran_secenek_nedir){ echo "Kaybetti <br> A ".$oran_secenek_nedir."<br>"; kazanma(3, $kid); } else
		if($oran_1_bosluk == "Ü" && $iy_konuk_toplam > $oran_secenek_nedir){ echo "Kazandı <br> Ü ".$oran_secenek_nedir."<br>"; kazanma(2, $kid); } else
		if($oran_1_bosluk == "Alt" && $iy_konuk_toplam > $oran_secenek_nedir){ echo "Kaybetti <br> A ".$oran_secenek_nedir."<br>"; kazanma(3, $kid); } else
		if($oran_1_bosluk == "Üst" && $iy_konuk_toplam > $oran_secenek_nedir){ echo "Kazandı <br> Ü ".$oran_secenek_nedir."<br>"; kazanma(2, $kid); }
		} else if($mDurum=="1.Ara"){
		if($oran_1_bosluk == "A" && $iy_konuk_toplam > $oran_secenek_nedir){ echo "Kaybetti <br> A ".$oran_secenek_nedir."<br>"; kazanma(3, $kid); } else
		if($oran_1_bosluk == "Ü" && $iy_konuk_toplam > $oran_secenek_nedir){ echo "Kazandı <br> Ü ".$oran_secenek_nedir."<br>"; kazanma(2, $kid); } else
		if($oran_1_bosluk == "Alt" && $iy_konuk_toplam > $oran_secenek_nedir){ echo "Kaybetti <br> A ".$oran_secenek_nedir."<br>"; kazanma(3, $kid); } else
		if($oran_1_bosluk == "Üst" && $iy_konuk_toplam > $oran_secenek_nedir){ echo "Kazandı <br> Ü ".$oran_secenek_nedir."<br>"; kazanma(2, $kid); }
		} else if($mDurum=="2.Çeyrek"){
		if($oran_1_bosluk == "A" && $iy_konuk_toplam > $oran_secenek_nedir){ echo "Kaybetti <br> A ".$oran_secenek_nedir."<br>"; kazanma(3, $kid); } else
		if($oran_1_bosluk == "Ü" && $iy_konuk_toplam > $oran_secenek_nedir){ echo "Kazandı <br> Ü ".$oran_secenek_nedir."<br>"; kazanma(2, $kid); } else
		if($oran_1_bosluk == "Alt" && $iy_konuk_toplam > $oran_secenek_nedir){ echo "Kaybetti <br> A ".$oran_secenek_nedir."<br>"; kazanma(3, $kid); } else
		if($oran_1_bosluk == "Üst" && $iy_konuk_toplam > $oran_secenek_nedir){ echo "Kazandı <br> Ü ".$oran_secenek_nedir."<br>"; kazanma(2, $kid); }
		} else if($mDurum=="2.Ara" || $mDurum=="3.Çeyrek" || $mDurum=="3.Ara" || $mDurum=="4.Çeyrek"){
		if($oran_1_bosluk == "A" && $iy_konuk_toplam < $oran_secenek_nedir){ echo "Kazandı <br> A ".$oran_secenek_nedir."<br>"; kazanma(2, $kid); } else
		if($oran_1_bosluk == "Ü" && $iy_konuk_toplam > $oran_secenek_nedir){ echo "Kazandı <br> Ü ".$oran_secenek_nedir."<br>"; kazanma(2, $kid); } else
		if($oran_1_bosluk == "Alt" && $iy_konuk_toplam < $oran_secenek_nedir){ echo "Kazandı <br> A ".$oran_secenek_nedir."<br>"; kazanma(2, $kid); } else
		if($oran_1_bosluk == "Üst" && $iy_konuk_toplam > $oran_secenek_nedir){ echo "Kazandı <br> Ü ".$oran_secenek_nedir."<br>"; kazanma(2, $kid); } else
		{ echo "Kaybetti <br>"; kazanma(3, $kid); }
		}
	} else if($oad == "1.Yarı Handikap"){
		if($mDurum=="2.Ara" || $mDurum=="3.Çeyrek" || $mDurum=="3.Ara" || $mDurum=="4.Çeyrek"){
		if($oran_1_bosluk == "1" && ($iy_ev_toplam+$secenekver_handikap) > $iy_konuk_toplam){ echo "Kazandı <br> 1 ".$secenekver_handikap."<br>"; kazanma(2, $kid); } else
		if($oran_1_bosluk == "2" && ($iy_konuk_toplam+$secenekver_handikap) > $iy_ev_toplam){ echo "Kazandı <br> 2 ".$secenekver_handikap."<br>"; kazanma(2, $kid); } else
		{ echo "Kaybetti <br>"; kazanma(3, $kid); }
		}
	} else if($oad == "1.Çeyrek Handikap"){
		if($mDurum=="1.Ara" || $mDurum=="2.Çeyrek" || $mDurum=="2.Ara" || $mDurum=="3.Çeyrek" || $mDurum=="3.Ara" || $mDurum=="4.Çeyrek"){
		if($oran_1_bosluk == "1" && ($period_1_bol_ev+$secenekver_handikap) > $period_1_bol_konuk){ echo "Kazandı <br> 1 ".$secenekver_handikap."<br>"; kazanma(2, $kid); } else
		if($oran_1_bosluk == "2" && ($period_1_bol_konuk+$secenekver_handikap) > $period_1_bol_ev){ echo "Kazandı <br> 2 ".$secenekver_handikap."<br>"; kazanma(2, $kid); } else
		{ echo "Kaybetti <br>"; kazanma(3, $kid); }
		}
	} else if($oad == "2.Çeyrek Handikap"){
		if($mDurum=="2.Ara" || $mDurum=="3.Çeyrek" || $mDurum=="3.Ara" || $mDurum=="4.Çeyrek"){
		if($oran_1_bosluk == "1" && ($period_2_bol_ev+$secenekver_handikap) > $period_2_bol_konuk){ echo "Kazandı <br> 1 ".$secenekver_handikap."<br>"; kazanma(2, $kid); } else
		if($oran_1_bosluk == "2" && ($period_2_bol_konuk+$secenekver_handikap) > $period_2_bol_ev){ echo "Kazandı <br> 2 ".$secenekver_handikap."<br>"; kazanma(2, $kid); } else
		{ echo "Kaybetti <br>"; kazanma(3, $kid); }
		}
	} else if($oad == "3.Çeyrek Handikap"){
		if($mDurum=="3.Ara" || $mDurum=="4.Çeyrek"){
		if($oran_1_bosluk == "1" && ($period_3_bol_ev+$secenekver_handikap) > $period_3_bol_konuk){ echo "Kazandı <br> 1 ".$secenekver_handikap."<br>"; kazanma(2, $kid); } else
		if($oran_1_bosluk == "2" && ($period_3_bol_konuk+$secenekver_handikap) > $period_3_bol_ev){ echo "Kazandı <br> 2 ".$secenekver_handikap."<br>"; kazanma(2, $kid); } else
		{ echo "Kaybetti <br>"; kazanma(3, $kid); }
		}
	} else if($oad == "1.Yarı Toplam Tek/Çift"){
		if($mDurum=="2.Ara" || $mDurum=="3.Çeyrek" || $mDurum=="3.Ara" || $mDurum=="4.Çeyrek"){
		if($oran_s == "T" && $iy_toplam_tekcift=="tek"){ echo "Kazandı <br>"; kazanma(2, $kid); } else
		if($oran_s == "Ç" && $iy_toplam_tekcift=="cift"){ echo "Kazandı <br>"; kazanma(2, $kid); } else
		if($oran_s == "Tek" && $iy_toplam_tekcift=="tek"){ echo "Kazandı <br>"; kazanma(2, $kid); } else
		if($oran_s == "Çift" && $iy_toplam_tekcift=="cift"){ echo "Kazandı <br>"; kazanma(2, $kid); } else
		{ echo "Kaybetti <br>"; kazanma(3, $kid); }
		}
	} else if($oad == "1.Çeyrek Toplam Tek/Çift"){
		if($mDurum=="1.Ara" || $mDurum=="2.Çeyrek" || $mDurum=="2.Ara" || $mDurum=="3.Çeyrek" || $mDurum=="3.Ara" || $mDurum=="4.Çeyrek"){
		if($oran_s == "T" && $period_1_tekcift=="tek"){ echo "Kazandı <br>"; kazanma(2, $kid); } else
		if($oran_s == "Ç" && $period_1_tekcift=="cift"){ echo "Kazandı <br>"; kazanma(2, $kid); } else
		if($oran_s == "Tek" && $period_1_tekcift=="tek"){ echo "Kazandı <br>"; kazanma(2, $kid); } else
		if($oran_s == "Çift" && $period_1_tekcift=="cift"){ echo "Kazandı <br>"; kazanma(2, $kid); } else
		{ echo "Kaybetti <br>"; kazanma(3, $kid); }
		}
	} else if($oad == "2.Çeyrek Toplam Tek/Çift"){
		if($mDurum=="2.Ara" || $mDurum=="3.Çeyrek" || $mDurum=="3.Ara" || $mDurum=="4.Çeyrek"){
		if($oran_s == "T" && $period_2_tekcift=="tek"){ echo "Kazandı <br>"; kazanma(2, $kid); } else
		if($oran_s == "Ç" && $period_2_tekcift=="cift"){ echo "Kazandı <br>"; kazanma(2, $kid); } else
		if($oran_s == "Tek" && $period_2_tekcift=="tek"){ echo "Kazandı <br>"; kazanma(2, $kid); } else
		if($oran_s == "Çift" && $period_2_tekcift=="cift"){ echo "Kazandı <br>"; kazanma(2, $kid); } else
		{ echo "Kaybetti <br>"; kazanma(3, $kid); }
		}
	} else if($oad == "3.Çeyrek Toplam Tek/Çift"){
		if($mDurum=="3.Ara" || $mDurum=="4.Çeyrek"){
		if($oran_s == "T" && $period_3_tekcift=="tek"){ echo "Kazandı <br>"; kazanma(2, $kid); } else
		if($oran_s == "Ç" && $period_3_tekcift=="cift"){ echo "Kazandı <br>"; kazanma(2, $kid); } else
		if($oran_s == "Tek" && $period_3_tekcift=="tek"){ echo "Kazandı <br>"; kazanma(2, $kid); } else
		if($oran_s == "Çift" && $period_3_tekcift=="cift"){ echo "Kazandı <br>"; kazanma(2, $kid); } else
		{ echo "Kaybetti <br>"; kazanma(3, $kid); }
		}
	}
	
}
 

function kazanma($durum, $kid){
	GLOBAL $sonuclandirXBX;
	if($sonuclandirXBX === true){
		/* Check bekletme suresi */
		$check_timeout = 2 * 60;
		
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

function check_kontrol(){
	$data = sed_sql_query("SELECT id, kupon_id, check_time FROM kupon_ic WHERE check_time != 0 AND kazanma = 1");
	if(sed_sql_numrows($data)){
		while($x = sed_sql_fetcharray($data)){
			if(time() > ($x["check_time"]+(60*10))){
				/* Check time'si sifirla */
				sed_sql_query("UPDATE kupon_ic SET check_time = 0 WHERE id = '". $x["id"] ."'");
				echo "Sifirlandi, Kupon ID: " . $x["kupon_id"] . "<br>"; 
			}
		}
	}
}

## SANALLAR İÇİN ##

## FUTBOL SONUÇLARI ##
function futbol_sonuc_sanal($birincigol,$iy_ev,$iy_dep,$ms_ev,$ms_dep,$oran_tip,$oran_val) {
$ik_hesapla_ev = $ms_ev-$iy_ev;
$ik_hesapla_dep = $ms_dep-$iy_dep;
$iy_toplam_hesapla = $iy_ev+$iy_dep;
$ik_toplam_hesapla = $ik_hesapla_ev+$ik_hesapla_dep;
$ms_toplam_hesapla = $ms_ev+$ms_dep;
if($ms_toplam_hesapla%2==0) { $ms_tekcift = "cift"; } else { $ms_tekcift = "tek"; }

if($oran_tip=="Maç Sonucu") {
	if($oran_val=="1" && $ms_ev>$ms_dep) {
		$donen = 2;
	} else if($oran_val=="X" && $ms_ev==$ms_dep) {
		$donen = 2;
	} else if($oran_val=="2" && $ms_ev<$ms_dep) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk Gol") {
	if($oran_val=="1" && $birincigol==1) {
		$donen = 2;
	} else if($oran_val=="X" && $birincigol==0) {
		$donen = 2;
	} else if($oran_val=="2" && $birincigol==2) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İki Takımda Gol atar") {
	if($oran_val=="Evet" && $ms_ev>0 && $ms_dep>0) {
		$donen = 2;
	} else if($oran_val=="Hayır" && ($ms_ev<1 || $ms_dep<1)) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Beraberlik-Bahis Yok") {
	if($oran_val=="1" && $ms_ev>$ms_dep) {
		$donen = 2;
	} else if($oran_val=="1" && $ms_ev==$ms_dep) {
		$donen = 4;
	} else if($oran_val=="2" && $ms_ev<$ms_dep) {
		$donen = 2;
	} else if($oran_val=="2" && $ms_ev==$ms_dep) {
		$donen = 4;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Toplam Gol Tek/Çift") {
	if($oran_val=="Tek" && $ms_tekcift=="tek") {
		$donen = 2;
	} else if($oran_val=="Çift" && $ms_tekcift=="cift") {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="En çok skor olacak yarı") {
	if($oran_val=="İlk Yarı" && $iy_toplam_hesapla>$ik_toplam_hesapla) {
		$donen = 2;
	} else if($oran_val=="Eşit" && $iy_toplam_hesapla==$ik_toplam_hesapla) {
		$donen = 2;
	} else if($oran_val=="İkinci Yarı" && $iy_toplam_hesapla<$ik_toplam_hesapla) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk yarı sonu") {
	if($oran_val=="1" && $iy_ev>$iy_dep) {
		$donen = 2;
	} else if($oran_val=="X" && $iy_ev==$iy_dep) {
		$donen = 2;
	} else if($oran_val=="2" && $iy_ev<$iy_dep) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk Yarı Çifte Şans") {
	if($oran_val=="1X" && $iy_ev>$iy_dep) {
		$donen = 2;
	} else if($oran_val=="1X" && $iy_ev==$iy_dep) {
		$donen = 2;
	} else if($oran_val=="12" && $iy_ev>$iy_dep) {
		$donen = 2;
	} else if($oran_val=="12" && $iy_ev<$iy_dep) {
		$donen = 2;
	} else if($oran_val=="X2" && $iy_ev==$iy_dep) {
		$donen = 2;
	} else if($oran_val=="X2" && $iy_ev<$iy_dep) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk Yarı Toplam Gol (0.5)") {
	if($oran_val=="Alt" && $iy_toplam_hesapla<1) {
		$donen = 2;
	} else if($oran_val=="Üst" && $iy_toplam_hesapla>0) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk Yarı Toplam Gol (1.5)") {
	if($oran_val=="Alt" && $iy_toplam_hesapla<2) {
		$donen = 2;
	} else if($oran_val=="Üst" && $iy_toplam_hesapla>1) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk Yarı Toplam Gol (2.5)") {
	if($oran_val=="Alt" && $iy_toplam_hesapla<3) {
		$donen = 2;
	} else if($oran_val=="Üst" && $iy_toplam_hesapla>2) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Çifte Şans") {
	if($oran_val=="1X" && $ms_ev>$ms_dep) {
		$donen = 2;
	} else if($oran_val=="1X" && $ms_ev==$ms_dep) {
		$donen = 2;
	} else if($oran_val=="12" && $ms_ev>$ms_dep) {
		$donen = 2;
	} else if($oran_val=="12" && $ms_ev<$ms_dep) {
		$donen = 2;
	} else if($oran_val=="X2" && $ms_ev==$ms_dep) {
		$donen = 2;
	} else if($oran_val=="X2" && $ms_ev<$ms_dep) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Toplam Gol (1.5)") {
	if($oran_val=="Alt" && $ms_toplam_hesapla<2) {
		$donen = 2;
	} else if($oran_val=="Üst" && $ms_toplam_hesapla>1) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Toplam Gol (2.5)") {
	if($oran_val=="Alt" && $ms_toplam_hesapla<3) {
		$donen = 2;
	} else if($oran_val=="Üst" && $ms_toplam_hesapla>2) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Toplam Gol (3.5)") {
	if($oran_val=="Alt" && $ms_toplam_hesapla<4) {
		$donen = 2;
	} else if($oran_val=="Üst" && $ms_toplam_hesapla>3) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Maç Sonucu ve Toplam Gol (1.5)") {
	if($oran_val=="1 ve Alt" && $ms_ev>$ms_dep && $ms_toplam_hesapla<2) {
		$donen = 2;
	} else if($oran_val=="1 ve Üst" && $ms_ev>$ms_dep && $ms_toplam_hesapla>1) {
		$donen = 2;
	} else if($oran_val=="X ve Alt" && $ms_ev==$ms_dep && $ms_toplam_hesapla<2) {
		$donen = 2;
	} else if($oran_val=="X ve Üst" && $ms_ev==$ms_dep && $ms_toplam_hesapla>1) {
		$donen = 2;
	} else if($oran_val=="2 ve Alt" && $ms_ev<$ms_dep && $ms_toplam_hesapla<2) {
		$donen = 2;
	} else if($oran_val=="2 ve Üst" && $ms_ev<$ms_dep && $ms_toplam_hesapla>1) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Maç Sonucu ve Toplam Gol (2.5)") {
	if($oran_val=="1 ve Alt" && $ms_ev>$ms_dep && $ms_toplam_hesapla<3) {
		$donen = 2;
	} else if($oran_val=="1 ve Üst" && $ms_ev>$ms_dep && $ms_toplam_hesapla>2) {
		$donen = 2;
	} else if($oran_val=="X ve Alt" && $ms_ev==$ms_dep && $ms_toplam_hesapla<3) {
		$donen = 2;
	} else if($oran_val=="X ve Üst" && $ms_ev==$ms_dep && $ms_toplam_hesapla>2) {
		$donen = 2;
	} else if($oran_val=="2 ve Alt" && $ms_ev<$ms_dep && $ms_toplam_hesapla<3) {
		$donen = 2;
	} else if($oran_val=="2 ve Üst" && $ms_ev<$ms_dep && $ms_toplam_hesapla>2) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Ev sahibi takım toplam gol (0.5)") {
	if($oran_val=="Alt" && $ms_ev<1) {
		$donen = 2;
	} else if($oran_val=="Üst" && $ms_ev>0) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Ev sahibi takım toplam gol (1.5)") {
	if($oran_val=="Alt" && $ms_ev<2) {
		$donen = 2;
	} else if($oran_val=="Üst" && $ms_ev>1) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Ev sahibi takım toplam gol (2.5)") {
	if($oran_val=="Alt" && $ms_ev<3) {
		$donen = 2;
	} else if($oran_val=="Üst" && $ms_ev>2) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Deplasman takımı toplam gol (0.5)") {
	if($oran_val=="Alt" && $ms_dep<1) {
		$donen = 2;
	} else if($oran_val=="Üst" && $ms_dep>0) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Deplasman takımı toplam gol (1.5)") {
	if($oran_val=="Alt" && $ms_dep<2) {
		$donen = 2;
	} else if($oran_val=="Üst" && $ms_dep>1) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Deplasman takımı toplam gol (2.5)") {
	if($oran_val=="Alt" && $ms_dep<3) {
		$donen = 2;
	} else if($oran_val=="Üst" && $ms_dep>2) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Gol atacak takımlar") {
	if($oran_val=="Her ikisi de" && $ms_ev>0 && $ms_dep>0) {
		$donen = 2;
	} else if($oran_val=="Sadece ev sahibi takım" && $ms_ev>0 && $ms_dep==0) {
		$donen = 2;
	} else if($oran_val=="Sadece deplasman takımı" && $ms_ev==0 && $ms_dep>0) {
		$donen = 2;
	} else if($oran_val=="Hiçbiri" && $ms_ev==0 && $ms_dep==0) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Ev sahibi takım gol sayısı") {
	if($oran_val=="0" && $ms_ev==0) {
		$donen = 2;
	} else if($oran_val=="1" && $ms_ev==1) {
		$donen = 2;
	} else if($oran_val=="2" && $ms_ev==2) {
		$donen = 2;
	} else if($oran_val=="3" && $ms_ev==3) {
		$donen = 2;
	} else if($oran_val=="4+" && $ms_ev>3) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Deplasman takımı gol sayısı") {
	if($oran_val=="0" && $ms_dep==0) {
		$donen = 2;
	} else if($oran_val=="1" && $ms_dep==1) {
		$donen = 2;
	} else if($oran_val=="2" && $ms_dep==2) {
		$donen = 2;
	} else if($oran_val=="3" && $ms_dep==3) {
		$donen = 2;
	} else if($oran_val=="4+" && $ms_dep>3) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Toplam Gol Sayısı") {
	if($oran_val=="0" && $ms_toplam_hesapla==0) {
		$donen = 2;
	} else if($oran_val=="1" && $ms_toplam_hesapla==1) {
		$donen = 2;
	} else if($oran_val=="2" && $ms_toplam_hesapla==2) {
		$donen = 2;
	} else if($oran_val=="3" && $ms_toplam_hesapla==3) {
		$donen = 2;
	} else if($oran_val=="4" && $ms_toplam_hesapla==4) {
		$donen = 2;
	} else if($oran_val=="5" && $ms_toplam_hesapla==5) {
		$donen = 2;
	} else if($oran_val=="6+" && $ms_toplam_hesapla>5) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk Yarı/Maç Sonucu") {
	if($oran_val=="11" && $iy_ev>$iy_dep && $ms_ev>$ms_dep) {
		$donen = 2;
	} else if($oran_val=="12" && $iy_ev>$iy_dep && $ms_ev<$ms_dep) {
		$donen = 2;
	} else if($oran_val=="1X" && $iy_ev>$iy_dep && $ms_ev==$ms_dep) {
		$donen = 2;
	} else if($oran_val=="21" && $iy_ev<$iy_dep && $ms_ev>$ms_dep) {
		$donen = 2;
	} else if($oran_val=="22" && $iy_ev<$iy_dep && $ms_ev<$ms_dep) {
		$donen = 2;
	} else if($oran_val=="2X" && $iy_ev<$iy_dep && $ms_ev==$ms_dep) {
		$donen = 2;
	} else if($oran_val=="X1" && $iy_ev==$iy_dep && $ms_ev>$ms_dep) {
		$donen = 2;
	} else if($oran_val=="X2" && $iy_ev==$iy_dep && $ms_ev<$ms_dep) {
		$donen = 2;
	} else if($oran_val=="XX" && $iy_ev==$iy_dep && $ms_ev==$ms_dep) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Kesin Skor") {
	if($oran_val=="0:0" && $ms_ev==0 && $ms_dep==0) {
		$donen = 2;
	} else if($oran_val=="0:1" && $ms_ev==0 && $ms_dep==1) {
		$donen = 2;
	} else if($oran_val=="0:2" && $ms_ev==0 && $ms_dep==2) {
		$donen = 2;
	} else if($oran_val=="0:3" && $ms_ev==0 && $ms_dep==3) {
		$donen = 2;
	} else if($oran_val=="1:0" && $ms_ev==1 && $ms_dep==0) {
		$donen = 2;
	} else if($oran_val=="1:1" && $ms_ev==1 && $ms_dep==1) {
		$donen = 2;
	} else if($oran_val=="1:2" && $ms_ev==1 && $ms_dep==2) {
		$donen = 2;
	} else if($oran_val=="1:3" && $ms_ev==1 && $ms_dep==3) {
		$donen = 2;
	} else if($oran_val=="2:0" && $ms_ev==2 && $ms_dep==0) {
		$donen = 2;
	} else if($oran_val=="2:1" && $ms_ev==2 && $ms_dep==1) {
		$donen = 2;
	} else if($oran_val=="2:2" && $ms_ev==2 && $ms_dep==2) {
		$donen = 2;
	} else if($oran_val=="2:3" && $ms_ev==2 && $ms_dep==3) {
		$donen = 2;
	} else if($oran_val=="3:0" && $ms_ev==3 && $ms_dep==0) {
		$donen = 2;
	} else if($oran_val=="3:1" && $ms_ev==3 && $ms_dep==1) {
		$donen = 2;
	} else if($oran_val=="3:2" && $ms_ev==3 && $ms_dep==2) {
		$donen = 2;
	} else if($oran_val=="3:3" && $ms_ev==3 && $ms_dep==3) {
		$donen = 2;
	} else if($oran_val=="Diğer") {
		if($ms_ev==0 && $ms_dep==0) {$donen = 3;} else 
		if($ms_ev==0 && $ms_dep==1) {$donen = 3;} else 
		if($ms_ev==0 && $ms_dep==2) {$donen = 3;} else 
		if($ms_ev==0 && $ms_dep==3) {$donen = 3;} else 
		if($ms_ev==1 && $ms_dep==0) {$donen = 3;} else 
		if($ms_ev==1 && $ms_dep==1) {$donen = 3;} else 
		if($ms_ev==1 && $ms_dep==2) {$donen = 3;} else 
		if($ms_ev==1 && $ms_dep==3) {$donen = 3;} else 
		if($ms_ev==2 && $ms_dep==0) {$donen = 3;} else 
		if($ms_ev==2 && $ms_dep==1) {$donen = 3;} else 
		if($ms_ev==2 && $ms_dep==2) {$donen = 3;} else 
		if($ms_ev==2 && $ms_dep==3) {$donen = 3;} else 
		if($ms_ev==3 && $ms_dep==0) {$donen = 3;} else 
		if($ms_ev==3 && $ms_dep==1) {$donen = 3;} else 
		if($ms_ev==3 && $ms_dep==2) {$donen = 3;} else 
		if($ms_ev==3 && $ms_dep==3) {$donen = 3;} else {$donen = 2;}
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Handikap (0:1)") {
	if($oran_val=="1" && $ms_ev>($ms_dep+1)) {
		$donen = 2;
	} else if($oran_val=="X" && $ms_ev==($ms_dep+1)) {
		$donen = 2;
	} else if($oran_val=="2" && $ms_ev<($ms_dep+1)) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Handikap (1:0)") {
	if($oran_val=="1" && ($ms_ev+1)>$ms_dep) {
		$donen = 2;
	} else if($oran_val=="X" && ($ms_ev+1)==$ms_dep) {
		$donen = 2;
	} else if($oran_val=="2" && ($ms_ev+1)<$ms_dep) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Handikap (0:2)") {
	if($oran_val=="1" && $ms_ev>($ms_dep+2)) {
		$donen = 2;
	} else if($oran_val=="X" && $ms_ev==($ms_dep+2)) {
		$donen = 2;
	} else if($oran_val=="2" && $ms_ev<($ms_dep+2)) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Handikap (2:0)") {
	if($oran_val=="1" && ($ms_ev+2)>$ms_dep) {
		$donen = 2;
	} else if($oran_val=="X" && ($ms_ev+2)==$ms_dep) {
		$donen = 2;
	} else if($oran_val=="2" && ($ms_ev+2)<$ms_dep) {
		$donen = 2;
	} else {
		$donen = 3;
	}
}

return $donen;
}

$kupondokum = sed_sql_query("select birincigol,iy_ev,iy_dep,ms_ev,ms_dep,oran_tip,oran_val,id from kupon_ic_sanal where (spor_tip='vflm_v2' or spor_tip='vfct_v2' or spor_tip='vfcc_v2' or spor_tip='vfwc_v2' or spor_tip='vfec_v2') and kazanma='1' and iy_ev!='' and iy_dep!='' and ms_ev!='' and ms_dep!='' limit 1000");
echo sed_sql_numrows($kupondokum). " Tane Kupon Sonuçlandırılıyor... ( SANAL FUTBOL İÇİN ) <br>";
while($row=sed_sql_fetcharray($kupondokum)) {
flush();
if($row['iy_ev']!='' && $row['iy_dep']!='' && $row['ms_ev']!='' && $row['ms_dep']!='') {
//echo "Seçenek : ".$row['oran_tip']." - ".$row['oran_val']." - İY SKOR : ".$row['iy_ev']." - ".$row['iy_dep']." - MS SKOR : ".$row['ms_ev']." - ".$row['ms_dep']."";
$sonucgetir_futbol = futbol_sonuc_sanal($row['birincigol'],$row['iy_ev'],$row['iy_dep'],$row['ms_ev'],$row['ms_dep'],$row['oran_tip'],$row['oran_val']);
sed_sql_query("update kupon_ic_sanal set kazanma='$sonucgetir_futbol' where id='$row[id]' and (spor_tip='vflm_v2' or spor_tip='vfct_v2' or spor_tip='vfcc_v2' or spor_tip='vfwc_v2' or spor_tip='vfec_v2')");
}
}
## FUTBOL SONUÇLARI ##

## BASKETBOL SONUÇLARI ##
function basketbol_sonuc_sanal($set_1,$set_2,$set_3,$set_4,$set_5,$kazanan_20,$kazanan_40,$kazanan_60,$oran_tip,$oran_val) {

$set_1_bol = explode(' - ',$set_1);
$set_2_bol = explode(' - ',$set_2);
$set_3_bol = explode(' - ',$set_3);
$set_4_bol = explode(' - ',$set_4);
$set_5_bol = explode(' - ',$set_5);

$set_1_ev = $set_1_bol[0];
$set_1_dep = $set_1_bol[1];
$set_2_ev = $set_2_bol[0];
$set_2_dep = $set_2_bol[1];
$set_3_ev = $set_3_bol[0];
$set_3_dep = $set_3_bol[1];
$set_4_ev = $set_4_bol[0];
$set_4_dep = $set_4_bol[1];
$set_5_ev = $set_5_bol[0];
$set_5_dep = $set_5_bol[1];

$ilkyari_ev = $set_1_ev+$set_2_ev;
$ilkyari_dep = $set_1_dep+$set_2_dep;
$macsonucu_ev = $set_1_ev+$set_2_ev+$set_3_ev+$set_4_ev;
$macsonucu_dep = $set_1_dep+$set_2_dep+$set_3_dep+$set_4_dep;
$macsonucu_uzatmali_ev = $set_1_ev+$set_2_ev+$set_3_ev+$set_4_ev+$set_5_ev;
$macsonucu_uzatmali_dep = $set_1_dep+$set_2_dep+$set_3_dep+$set_4_dep+$set_5_dep;

if($oran_tip=="Maç Kazananı") {
	if($oran_val=="1" && $macsonucu_uzatmali_ev>$macsonucu_uzatmali_dep) {
		$donen = 2;
	} else if($oran_val=="2" && $macsonucu_uzatmali_ev<$macsonucu_uzatmali_dep) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk Yarı Kazananı") {
	if($oran_val=="1" && $ilkyari_ev>$ilkyari_dep) {
		$donen = 2;
	} else if($oran_val=="x" && $ilkyari_ev==$ilkyari_dep) {
		$donen = 2;
	} else if($oran_val=="2" && $ilkyari_ev<$ilkyari_dep) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="En Çok Sayı Yapılan Çeyrek") {
	if($oran_val=="1. Çeyrek" && ($set_1_ev+$set_1_dep)>($set_2_ev+$set_2_dep) && ($set_1_ev+$set_1_dep)>($set_3_ev+$set_3_dep) && ($set_1_ev+$set_1_dep)>($set_4_ev+$set_4_dep)) {
		$donen = 2;
	} else if($oran_val=="2. Çeyrek" && ($set_2_ev+$set_2_dep)>($set_1_ev+$set_1_dep) && ($set_2_ev+$set_2_dep)>($set_3_ev+$set_3_dep) && ($set_2_ev+$set_2_dep)>($set_4_ev+$set_4_dep)) {
		$donen = 2;
	} else if($oran_val=="3. Çeyrek" && ($set_3_ev+$set_3_dep)>($set_1_ev+$set_1_dep) && ($set_3_ev+$set_3_dep)>($set_2_ev+$set_2_dep) && ($set_3_ev+$set_3_dep)>($set_4_ev+$set_4_dep)) {
		$donen = 2;
	} else if($oran_val=="4. Çeyrek" && ($set_4_ev+$set_4_dep)>($set_1_ev+$set_1_dep) && ($set_4_ev+$set_4_dep)>($set_2_ev+$set_2_dep) && ($set_4_ev+$set_4_dep)>($set_3_ev+$set_3_dep)) {
		$donen = 2;
	} else if($oran_val=="Eşit" && ($set_1_ev+$set_1_dep)==($set_2_ev+$set_2_dep) && ($set_1_ev+$set_1_dep)==($set_3_ev+$set_3_dep) && ($set_1_ev+$set_1_dep)==($set_4_ev+$set_4_dep) && ($set_2_ev+$set_2_dep)==($set_3_ev+$set_3_dep) && ($set_2_ev+$set_2_dep)==($set_4_ev+$set_4_dep) && ($set_3_ev+$set_3_dep)==($set_4_ev+$set_4_dep)
	) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Toplam Sayı (180.5)") {
	if($oran_val=="u" && ($macsonucu_ev+$macsonucu_dep)<181) {
		$donen = 2;
	} else if($oran_val=="o" && ($macsonucu_ev+$macsonucu_dep)>180) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Toplam Sayı (181.5)") {
	if($oran_val=="u" && ($macsonucu_ev+$macsonucu_dep)<182) {
		$donen = 2;
	} else if($oran_val=="o" && ($macsonucu_ev+$macsonucu_dep)>181) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Toplam Sayı (182.5)") {
	if($oran_val=="u" && ($macsonucu_ev+$macsonucu_dep)<183) {
		$donen = 2;
	} else if($oran_val=="o" && ($macsonucu_ev+$macsonucu_dep)>182) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Toplam Sayı (183.5)") {
	if($oran_val=="u" && ($macsonucu_ev+$macsonucu_dep)<184) {
		$donen = 2;
	} else if($oran_val=="o" && ($macsonucu_ev+$macsonucu_dep)>183) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Toplam Sayı (184.5)") {
	if($oran_val=="u" && ($macsonucu_ev+$macsonucu_dep)<185) {
		$donen = 2;
	} else if($oran_val=="o" && ($macsonucu_ev+$macsonucu_dep)>184) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Toplam Sayı (185.5)") {
	if($oran_val=="u" && ($macsonucu_ev+$macsonucu_dep)<186) {
		$donen = 2;
	} else if($oran_val=="o" && ($macsonucu_ev+$macsonucu_dep)>185) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Toplam Sayı (186.5)") {
	if($oran_val=="u" && ($macsonucu_ev+$macsonucu_dep)<187) {
		$donen = 2;
	} else if($oran_val=="o" && ($macsonucu_ev+$macsonucu_dep)>186) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Toplam Sayı (187.5)") {
	if($oran_val=="u" && ($macsonucu_ev+$macsonucu_dep)<188) {
		$donen = 2;
	} else if($oran_val=="o" && ($macsonucu_ev+$macsonucu_dep)>187) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Toplam Sayı (188.5)") {
	if($oran_val=="u" && ($macsonucu_ev+$macsonucu_dep)<189) {
		$donen = 2;
	} else if($oran_val=="o" && ($macsonucu_ev+$macsonucu_dep)>188) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Toplam Sayı (189.5)") {
	if($oran_val=="u" && ($macsonucu_ev+$macsonucu_dep)<190) {
		$donen = 2;
	} else if($oran_val=="o" && ($macsonucu_ev+$macsonucu_dep)>189) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Handikap (+1.5)") {
	if($oran_val=="1 (+1.5)" && ($macsonucu_ev+2)>$macsonucu_dep) {
		$donen = 2;
	} else if($oran_val=="2 (+1.5)" && ($macsonucu_dep+2)>$macsonucu_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Handikap (+2.5)") {
	if($oran_val=="1 (+2.5)" && ($macsonucu_ev+3)>$macsonucu_dep) {
		$donen = 2;
	} else if($oran_val=="2 (+2.5)" && ($macsonucu_dep+3)>$macsonucu_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Handikap (+3.5)") {
	if($oran_val=="1 (+3.5)" && ($macsonucu_ev+4)>$macsonucu_dep) {
		$donen = 2;
	} else if($oran_val=="2 (+3.5)" && ($macsonucu_dep+4)>$macsonucu_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Handikap (+4.5)") {
	if($oran_val=="1 (+4.5)" && ($macsonucu_ev+5)>$macsonucu_dep) {
		$donen = 2;
	} else if($oran_val=="2 (+4.5)" && ($macsonucu_dep+5)>$macsonucu_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Handikap (+5.5)") {
	if($oran_val=="1 (+5.5)" && ($macsonucu_ev+6)>$macsonucu_dep) {
		$donen = 2;
	} else if($oran_val=="2 (+5.5)" && ($macsonucu_dep+6)>$macsonucu_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Handikap (+6.5)") {
	if($oran_val=="1 (+6.5)" && ($macsonucu_ev+7)>$macsonucu_dep) {
		$donen = 2;
	} else if($oran_val=="2 (+6.5)" && ($macsonucu_dep+7)>$macsonucu_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Handikap (+7.5)") {
	if($oran_val=="1 (+7.5)" && ($macsonucu_ev+8)>$macsonucu_dep) {
		$donen = 2;
	} else if($oran_val=="2 (+7.5)" && ($macsonucu_dep+8)>$macsonucu_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Handikap (+8.5)") {
	if($oran_val=="1 (+8.5)" && ($macsonucu_ev+9)>$macsonucu_dep) {
		$donen = 2;
	} else if($oran_val=="2 (+8.5)" && ($macsonucu_dep+9)>$macsonucu_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Handikap (+9.5)") {
	if($oran_val=="1 (+9.5)" && ($macsonucu_ev+10)>$macsonucu_dep) {
		$donen = 2;
	} else if($oran_val=="2 (+9.5)" && ($macsonucu_dep+10)>$macsonucu_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Handikap (+10.5)") {
	if($oran_val=="1 (+10.5)" && ($macsonucu_ev+11)>$macsonucu_dep) {
		$donen = 2;
	} else if($oran_val=="2 (+10.5)" && ($macsonucu_dep+11)>$macsonucu_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Handikap (+11.5)") {
	if($oran_val=="1 (+11.5)" && ($macsonucu_ev+12)>$macsonucu_dep) {
		$donen = 2;
	} else if($oran_val=="2 (+11.5)" && ($macsonucu_dep+12)>$macsonucu_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Handikap (+12.5)") {
	if($oran_val=="1 (+12.5)" && ($macsonucu_ev+13)>$macsonucu_dep) {
		$donen = 2;
	} else if($oran_val=="2 (+12.5)" && ($macsonucu_dep+13)>$macsonucu_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Handikap (+13.5)") {
	if($oran_val=="1 (+13.5)" && ($macsonucu_ev+14)>$macsonucu_dep) {
		$donen = 2;
	} else if($oran_val=="2 (+13.5)" && ($macsonucu_dep+14)>$macsonucu_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Handikap (+14.5)") {
	if($oran_val=="1 (+14.5)" && ($macsonucu_ev+15)>$macsonucu_dep) {
		$donen = 2;
	} else if($oran_val=="2 (+14.5)" && ($macsonucu_dep+15)>$macsonucu_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Handikap (+15.5)") {
	if($oran_val=="1 (+15.5)" && ($macsonucu_ev+16)>$macsonucu_dep) {
		$donen = 2;
	} else if($oran_val=="2 (+15.5)" && ($macsonucu_dep+16)>$macsonucu_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Handikap (+16.5)") {
	if($oran_val=="1 (+16.5)" && ($macsonucu_ev+17)>$macsonucu_dep) {
		$donen = 2;
	} else if($oran_val=="2 (+16.5)" && ($macsonucu_dep+17)>$macsonucu_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Handikap (+17.5)") {
	if($oran_val=="1 (+17.5)" && ($macsonucu_ev+18)>$macsonucu_dep) {
		$donen = 2;
	} else if($oran_val=="2 (+17.5)" && ($macsonucu_dep+18)>$macsonucu_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Handikap (+18.5)") {
	if($oran_val=="1 (+18.5)" && ($macsonucu_ev+19)>$macsonucu_dep) {
		$donen = 2;
	} else if($oran_val=="2 (+18.5)" && ($macsonucu_dep+19)>$macsonucu_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Handikap (+19.5)") {
	if($oran_val=="1 (+19.5)" && ($macsonucu_ev+20)>$macsonucu_dep) {
		$donen = 2;
	} else if($oran_val=="2 (+19.5)" && ($macsonucu_dep+20)>$macsonucu_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="X'e İlk Kim Ulaşır (20)") {
	if($oran_val=="Ev Sahibi" && $kazanan_20==1) {
		$donen = 2;
	} else if($oran_val=="Deplasman" && $kazanan_20==2) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="X'e İlk Kim Ulaşır (40)") {
	if($oran_val=="Ev Sahibi" && $kazanan_40==1) {
		$donen = 2;
	} else if($oran_val=="Deplasman" && $kazanan_40==2) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="X'e İlk Kim Ulaşır (60)") {
	if($oran_val=="Ev Sahibi" && $kazanan_60==1) {
		$donen = 2;
	} else if($oran_val=="Deplasman" && $kazanan_60==2) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Kazanma Aralığı (İlk Yarı)") {
	if($oran_val=="HT 11+" && ($ilkyari_ev-$ilkyari_dep)>10) {
		$donen = 2;
	} else if($oran_val=="HT 6-10" && ($ilkyari_ev-$ilkyari_dep)==6) {
		$donen = 2;
	} else if($oran_val=="HT 6-10" && ($ilkyari_ev-$ilkyari_dep)==7) {
		$donen = 2;
	} else if($oran_val=="HT 6-10" && ($ilkyari_ev-$ilkyari_dep)==8) {
		$donen = 2;
	} else if($oran_val=="HT 6-10" && ($ilkyari_ev-$ilkyari_dep)==9) {
		$donen = 2;
	} else if($oran_val=="HT 6-10" && ($ilkyari_ev-$ilkyari_dep)==10) {
		$donen = 2;
	} else if($oran_val=="HT 1-5" && ($ilkyari_ev-$ilkyari_dep)==1) {
		$donen = 2;
	} else if($oran_val=="HT 1-5" && ($ilkyari_ev-$ilkyari_dep)==2) {
		$donen = 2;
	} else if($oran_val=="HT 1-5" && ($ilkyari_ev-$ilkyari_dep)==3) {
		$donen = 2;
	} else if($oran_val=="HT 1-5" && ($ilkyari_ev-$ilkyari_dep)==4) {
		$donen = 2;
	} else if($oran_val=="HT 1-5" && ($ilkyari_ev-$ilkyari_dep)==5) {
		$donen = 2;
	} else if($oran_val=="AT 11+" && ($ilkyari_dep-$ilkyari_ev)>10) {
		$donen = 2;
	} else if($oran_val=="AT 6-10" && ($ilkyari_dep-$ilkyari_ev)==6) {
		$donen = 2;
	} else if($oran_val=="AT 6-10" && ($ilkyari_dep-$ilkyari_ev)==7) {
		$donen = 2;
	} else if($oran_val=="AT 6-10" && ($ilkyari_dep-$ilkyari_ev)==8) {
		$donen = 2;
	} else if($oran_val=="AT 6-10" && ($ilkyari_dep-$ilkyari_ev)==9) {
		$donen = 2;
	} else if($oran_val=="AT 6-10" && ($ilkyari_dep-$ilkyari_ev)==10) {
		$donen = 2;
	} else if($oran_val=="AT 1-5" && ($ilkyari_dep-$ilkyari_ev)==1) {
		$donen = 2;
	} else if($oran_val=="AT 1-5" && ($ilkyari_dep-$ilkyari_ev)==2) {
		$donen = 2;
	} else if($oran_val=="AT 1-5" && ($ilkyari_dep-$ilkyari_ev)==3) {
		$donen = 2;
	} else if($oran_val=="AT 1-5" && ($ilkyari_dep-$ilkyari_ev)==4) {
		$donen = 2;
	} else if($oran_val=="AT 1-5" && ($ilkyari_dep-$ilkyari_ev)==5) {
		$donen = 2;
	} else if($oran_val=="X" && $ilkyari_dep==$ilkyari_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Kazanma Aralığı (Uzatmalar Dahil)") {
	if($oran_val=="HT 11+" && ($macsonucu_uzatmali_ev-$macsonucu_uzatmali_dep)>10) {
		$donen = 2;
	} else if($oran_val=="HT 6-10" && ($macsonucu_uzatmali_ev-$macsonucu_uzatmali_dep)==6) {
		$donen = 2;
	} else if($oran_val=="HT 6-10" && ($macsonucu_uzatmali_ev-$macsonucu_uzatmali_dep)==7) {
		$donen = 2;
	} else if($oran_val=="HT 6-10" && ($macsonucu_uzatmali_ev-$macsonucu_uzatmali_dep)==8) {
		$donen = 2;
	} else if($oran_val=="HT 6-10" && ($macsonucu_uzatmali_ev-$macsonucu_uzatmali_dep)==9) {
		$donen = 2;
	} else if($oran_val=="HT 6-10" && ($macsonucu_uzatmali_ev-$macsonucu_uzatmali_dep)==10) {
		$donen = 2;
	} else if($oran_val=="HT 1-5" && ($macsonucu_uzatmali_ev-$macsonucu_uzatmali_dep)==1) {
		$donen = 2;
	} else if($oran_val=="HT 1-5" && ($macsonucu_uzatmali_ev-$macsonucu_uzatmali_dep)==2) {
		$donen = 2;
	} else if($oran_val=="HT 1-5" && ($macsonucu_uzatmali_ev-$macsonucu_uzatmali_dep)==3) {
		$donen = 2;
	} else if($oran_val=="HT 1-5" && ($macsonucu_uzatmali_ev-$macsonucu_uzatmali_dep)==4) {
		$donen = 2;
	} else if($oran_val=="HT 1-5" && ($macsonucu_uzatmali_ev-$macsonucu_uzatmali_dep)==5) {
		$donen = 2;
	} else if($oran_val=="AT 11+" && ($macsonucu_uzatmali_dep-$macsonucu_uzatmali_ev)>10) {
		$donen = 2;
	} else if($oran_val=="AT 6-10" && ($macsonucu_uzatmali_dep-$macsonucu_uzatmali_ev)==6) {
		$donen = 2;
	} else if($oran_val=="AT 6-10" && ($macsonucu_uzatmali_dep-$macsonucu_uzatmali_ev)==7) {
		$donen = 2;
	} else if($oran_val=="AT 6-10" && ($macsonucu_uzatmali_dep-$macsonucu_uzatmali_ev)==8) {
		$donen = 2;
	} else if($oran_val=="AT 6-10" && ($macsonucu_uzatmali_dep-$macsonucu_uzatmali_ev)==9) {
		$donen = 2;
	} else if($oran_val=="AT 6-10" && ($macsonucu_uzatmali_dep-$macsonucu_uzatmali_ev)==10) {
		$donen = 2;
	} else if($oran_val=="AT 1-5" && ($macsonucu_uzatmali_dep-$macsonucu_uzatmali_ev)==1) {
		$donen = 2;
	} else if($oran_val=="AT 1-5" && ($macsonucu_uzatmali_dep-$macsonucu_uzatmali_ev)==2) {
		$donen = 2;
	} else if($oran_val=="AT 1-5" && ($macsonucu_uzatmali_dep-$macsonucu_uzatmali_ev)==3) {
		$donen = 2;
	} else if($oran_val=="AT 1-5" && ($macsonucu_uzatmali_dep-$macsonucu_uzatmali_ev)==4) {
		$donen = 2;
	} else if($oran_val=="AT 1-5" && ($macsonucu_uzatmali_dep-$macsonucu_uzatmali_ev)==5) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Ev Sahibi Takımın Toplam Sayısı (80.5)") {
	if($oran_val=="u" && $macsonucu_ev<81) {
		$donen = 2;
	} else if($oran_val=="o" && $macsonucu_ev>80) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Ev Sahibi Takımın Toplam Sayısı (81.5)") {
	if($oran_val=="u" && $macsonucu_ev<82) {
		$donen = 2;
	} else if($oran_val=="o" && $macsonucu_ev>81) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Ev Sahibi Takımın Toplam Sayısı (82.5)") {
	if($oran_val=="u" && $macsonucu_ev<83) {
		$donen = 2;
	} else if($oran_val=="o" && $macsonucu_ev>82) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Ev Sahibi Takımın Toplam Sayısı (83.5)") {
	if($oran_val=="u" && $macsonucu_ev<84) {
		$donen = 2;
	} else if($oran_val=="o" && $macsonucu_ev>83) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Ev Sahibi Takımın Toplam Sayısı (84.5)") {
	if($oran_val=="u" && $macsonucu_ev<85) {
		$donen = 2;
	} else if($oran_val=="o" && $macsonucu_ev>84) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Ev Sahibi Takımın Toplam Sayısı (85.5)") {
	if($oran_val=="u" && $macsonucu_ev<86) {
		$donen = 2;
	} else if($oran_val=="o" && $macsonucu_ev>85) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Ev Sahibi Takımın Toplam Sayısı (86.5)") {
	if($oran_val=="u" && $macsonucu_ev<87) {
		$donen = 2;
	} else if($oran_val=="o" && $macsonucu_ev>86) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Ev Sahibi Takımın Toplam Sayısı (87.5)") {
	if($oran_val=="u" && $macsonucu_ev<88) {
		$donen = 2;
	} else if($oran_val=="o" && $macsonucu_ev>87) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Ev Sahibi Takımın Toplam Sayısı (88.5)") {
	if($oran_val=="u" && $macsonucu_ev<89) {
		$donen = 2;
	} else if($oran_val=="o" && $macsonucu_ev>88) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Ev Sahibi Takımın Toplam Sayısı (89.5)") {
	if($oran_val=="u" && $macsonucu_ev<90) {
		$donen = 2;
	} else if($oran_val=="o" && $macsonucu_ev>89) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Ev Sahibi Takımın Toplam Sayısı (90.5)") {
	if($oran_val=="u" && $macsonucu_ev<91) {
		$donen = 2;
	} else if($oran_val=="o" && $macsonucu_ev>90) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Ev Sahibi Takımın Toplam Sayısı (91.5)") {
	if($oran_val=="u" && $macsonucu_ev<92) {
		$donen = 2;
	} else if($oran_val=="o" && $macsonucu_ev>91) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Ev Sahibi Takımın Toplam Sayısı (92.5)") {
	if($oran_val=="u" && $macsonucu_ev<93) {
		$donen = 2;
	} else if($oran_val=="o" && $macsonucu_ev>92) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Ev Sahibi Takımın Toplam Sayısı (93.5)") {
	if($oran_val=="u" && $macsonucu_ev<94) {
		$donen = 2;
	} else if($oran_val=="o" && $macsonucu_ev>93) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Ev Sahibi Takımın Toplam Sayısı (94.5)") {
	if($oran_val=="u" && $macsonucu_ev<95) {
		$donen = 2;
	} else if($oran_val=="o" && $macsonucu_ev>94) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Ev Sahibi Takımın Toplam Sayısı (95.5)") {
	if($oran_val=="u" && $macsonucu_ev<96) {
		$donen = 2;
	} else if($oran_val=="o" && $macsonucu_ev>95) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Ev Sahibi Takımın Toplam Sayısı (96.5)") {
	if($oran_val=="u" && $macsonucu_ev<97) {
		$donen = 2;
	} else if($oran_val=="o" && $macsonucu_ev>96) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Ev Sahibi Takımın Toplam Sayısı (97.5)") {
	if($oran_val=="u" && $macsonucu_ev<98) {
		$donen = 2;
	} else if($oran_val=="o" && $macsonucu_ev>97) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Ev Sahibi Takımın Toplam Sayısı (98.5)") {
	if($oran_val=="u" && $macsonucu_ev<99) {
		$donen = 2;
	} else if($oran_val=="o" && $macsonucu_ev>98) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Ev Sahibi Takımın Toplam Sayısı (99.5)") {
	if($oran_val=="u" && $macsonucu_ev<100) {
		$donen = 2;
	} else if($oran_val=="o" && $macsonucu_ev>99) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Deplasman Takımın Toplam Sayısı (80.5)") {
	if($oran_val=="u" && $macsonucu_dep<81) {
		$donen = 2;
	} else if($oran_val=="o" && $macsonucu_dep>80) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Deplasman Takımın Toplam Sayısı (81.5)") {
	if($oran_val=="u" && $macsonucu_dep<82) {
		$donen = 2;
	} else if($oran_val=="o" && $macsonucu_dep>81) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Deplasman Takımın Toplam Sayısı (82.5)") {
	if($oran_val=="u" && $macsonucu_dep<83) {
		$donen = 2;
	} else if($oran_val=="o" && $macsonucu_dep>82) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Deplasman Takımın Toplam Sayısı (83.5)") {
	if($oran_val=="u" && $macsonucu_dep<84) {
		$donen = 2;
	} else if($oran_val=="o" && $macsonucu_dep>83) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Deplasman Takımın Toplam Sayısı (84.5)") {
	if($oran_val=="u" && $macsonucu_dep<85) {
		$donen = 2;
	} else if($oran_val=="o" && $macsonucu_dep>84) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Deplasman Takımın Toplam Sayısı (85.5)") {
	if($oran_val=="u" && $macsonucu_dep<86) {
		$donen = 2;
	} else if($oran_val=="o" && $macsonucu_dep>85) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Deplasman Takımın Toplam Sayısı (86.5)") {
	if($oran_val=="u" && $macsonucu_dep<87) {
		$donen = 2;
	} else if($oran_val=="o" && $macsonucu_dep>86) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Deplasman Takımın Toplam Sayısı (87.5)") {
	if($oran_val=="u" && $macsonucu_dep<88) {
		$donen = 2;
	} else if($oran_val=="o" && $macsonucu_dep>87) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Deplasman Takımın Toplam Sayısı (88.5)") {
	if($oran_val=="u" && $macsonucu_dep<89) {
		$donen = 2;
	} else if($oran_val=="o" && $macsonucu_dep>88) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Deplasman Takımın Toplam Sayısı (89.5)") {
	if($oran_val=="u" && $macsonucu_dep<90) {
		$donen = 2;
	} else if($oran_val=="o" && $macsonucu_dep>89) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Deplasman Takımın Toplam Sayısı (90.5)") {
	if($oran_val=="u" && $macsonucu_dep<91) {
		$donen = 2;
	} else if($oran_val=="o" && $macsonucu_dep>90) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Deplasman Takımın Toplam Sayısı (91.5)") {
	if($oran_val=="u" && $macsonucu_dep<92) {
		$donen = 2;
	} else if($oran_val=="o" && $macsonucu_dep>91) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Deplasman Takımın Toplam Sayısı (92.5)") {
	if($oran_val=="u" && $macsonucu_dep<93) {
		$donen = 2;
	} else if($oran_val=="o" && $macsonucu_dep>92) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Deplasman Takımın Toplam Sayısı (93.5)") {
	if($oran_val=="u" && $macsonucu_dep<94) {
		$donen = 2;
	} else if($oran_val=="o" && $macsonucu_dep>93) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Deplasman Takımın Toplam Sayısı (94.5)") {
	if($oran_val=="u" && $macsonucu_dep<95) {
		$donen = 2;
	} else if($oran_val=="o" && $macsonucu_dep>94) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Deplasman Takımın Toplam Sayısı (95.5)") {
	if($oran_val=="u" && $macsonucu_dep<96) {
		$donen = 2;
	} else if($oran_val=="o" && $macsonucu_dep>95) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Deplasman Takımın Toplam Sayısı (96.5)") {
	if($oran_val=="u" && $macsonucu_dep<97) {
		$donen = 2;
	} else if($oran_val=="o" && $macsonucu_dep>96) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Deplasman Takımın Toplam Sayısı (97.5)") {
	if($oran_val=="u" && $macsonucu_dep<98) {
		$donen = 2;
	} else if($oran_val=="o" && $macsonucu_dep>97) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Deplasman Takımın Toplam Sayısı (98.5)") {
	if($oran_val=="u" && $macsonucu_dep<99) {
		$donen = 2;
	} else if($oran_val=="o" && $macsonucu_dep>98) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Deplasman Takımın Toplam Sayısı (99.5)") {
	if($oran_val=="u" && $macsonucu_dep<100) {
		$donen = 2;
	} else if($oran_val=="o" && $macsonucu_dep>99) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk Yarı Handikap (+0.5)") {
	if($oran_val=="1 (+0.5)" && ($ilkyari_ev+1)>$ilkyari_dep) {
		$donen = 2;
	} else if($oran_val=="2 (+0.5)" && ($ilkyari_dep+1)>$ilkyari_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk Yarı Handikap (+1.5)") {
	if($oran_val=="1 (+1.5)" && ($ilkyari_ev+2)>$ilkyari_dep) {
		$donen = 2;
	} else if($oran_val=="2 (+1.5)" && ($ilkyari_dep+2)>$ilkyari_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk Yarı Handikap (+2.5)") {
	if($oran_val=="1 (+2.5)" && ($ilkyari_ev+3)>$ilkyari_dep) {
		$donen = 2;
	} else if($oran_val=="2 (+2.5)" && ($ilkyari_dep+3)>$ilkyari_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk Yarı Handikap (+3.5)") {
	if($oran_val=="1 (+3.5)" && ($ilkyari_ev+4)>$ilkyari_dep) {
		$donen = 2;
	} else if($oran_val=="2 (+3.5)" && ($ilkyari_dep+4)>$ilkyari_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk Yarı Handikap (+4.5)") {
	if($oran_val=="1 (+4.5)" && ($ilkyari_ev+5)>$ilkyari_dep) {
		$donen = 2;
	} else if($oran_val=="2 (+4.5)" && ($ilkyari_dep+5)>$ilkyari_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk Yarı Handikap (+5.5)") {
	if($oran_val=="1 (+5.5)" && ($ilkyari_ev+6)>$ilkyari_dep) {
		$donen = 2;
	} else if($oran_val=="2 (+5.5)" && ($ilkyari_dep+6)>$ilkyari_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk Yarı Handikap (+6.5)") {
	if($oran_val=="1 (+6.5)" && ($ilkyari_ev+7)>$ilkyari_dep) {
		$donen = 2;
	} else if($oran_val=="2 (+6.5)" && ($ilkyari_dep+7)>$ilkyari_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk Yarı Handikap (+7.5)") {
	if($oran_val=="1 (+7.5)" && ($ilkyari_ev+8)>$ilkyari_dep) {
		$donen = 2;
	} else if($oran_val=="2 (+7.5)" && ($ilkyari_dep+8)>$ilkyari_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk Yarı Handikap (+8.5)") {
	if($oran_val=="1 (+8.5)" && ($ilkyari_ev+9)>$ilkyari_dep) {
		$donen = 2;
	} else if($oran_val=="2 (+8.5)" && ($ilkyari_dep+9)>$ilkyari_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk Yarı Handikap (+9.5)") {
	if($oran_val=="1 (+9.5)" && ($ilkyari_ev+10)>$ilkyari_dep) {
		$donen = 2;
	} else if($oran_val=="2 (+9.5)" && ($ilkyari_dep+10)>$ilkyari_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk Yarı Handikap (+10.5)") {
	if($oran_val=="1 (+10.5)" && ($ilkyari_ev+11)>$ilkyari_dep) {
		$donen = 2;
	} else if($oran_val=="2 (+10.5)" && ($ilkyari_dep+11)>$ilkyari_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk Yarı Handikap (+11.5)") {
	if($oran_val=="1 (+11.5)" && ($ilkyari_ev+12)>$ilkyari_dep) {
		$donen = 2;
	} else if($oran_val=="2 (+11.5)" && ($ilkyari_dep+12)>$ilkyari_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk Yarı Handikap (+12.5)") {
	if($oran_val=="1 (+12.5)" && ($ilkyari_ev+13)>$ilkyari_dep) {
		$donen = 2;
	} else if($oran_val=="2 (+12.5)" && ($ilkyari_dep+13)>$ilkyari_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk Yarı Handikap (+13.5)") {
	if($oran_val=="1 (+13.5)" && ($ilkyari_ev+14)>$ilkyari_dep) {
		$donen = 2;
	} else if($oran_val=="2 (+13.5)" && ($ilkyari_dep+14)>$ilkyari_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk Yarı Handikap (+14.5)") {
	if($oran_val=="1 (+14.5)" && ($ilkyari_ev+15)>$ilkyari_dep) {
		$donen = 2;
	} else if($oran_val=="2 (+14.5)" && ($ilkyari_dep+15)>$ilkyari_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk Yarı Handikap (+15.5)") {
	if($oran_val=="1 (+15.5)" && ($ilkyari_ev+16)>$ilkyari_dep) {
		$donen = 2;
	} else if($oran_val=="2 (+15.5)" && ($ilkyari_dep+16)>$ilkyari_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk Yarı Handikap (+16.5)") {
	if($oran_val=="1 (+16.5)" && ($ilkyari_ev+17)>$ilkyari_dep) {
		$donen = 2;
	} else if($oran_val=="2 (+16.5)" && ($ilkyari_dep+17)>$ilkyari_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk Yarı Handikap (+17.5)") {
	if($oran_val=="1 (+17.5)" && ($ilkyari_ev+18)>$ilkyari_dep) {
		$donen = 2;
	} else if($oran_val=="2 (+17.5)" && ($ilkyari_dep+18)>$ilkyari_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk Yarı Handikap (+18.5)") {
	if($oran_val=="1 (+18.5)" && ($ilkyari_ev+19)>$ilkyari_dep) {
		$donen = 2;
	} else if($oran_val=="2 (+18.5)" && ($ilkyari_dep+19)>$ilkyari_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk Yarı Handikap (+19.5)") {
	if($oran_val=="1 (+19.5)" && ($ilkyari_ev+20)>$ilkyari_dep) {
		$donen = 2;
	} else if($oran_val=="2 (+19.5)" && ($ilkyari_dep+20)>$ilkyari_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk Yarı Handikap (+20.5)") {
	if($oran_val=="1 (+20.5)" && ($ilkyari_ev+21)>$ilkyari_dep) {
		$donen = 2;
	} else if($oran_val=="2 (+20.5)" && ($ilkyari_dep+21)>$ilkyari_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk Yarı Handikap (-0.5)") {
	if($oran_val=="1 (-0.5)" && ($ilkyari_ev-1)>$ilkyari_dep) {
		$donen = 2;
	} else if($oran_val=="2 (-0.5)" && ($ilkyari_dep-1)>$ilkyari_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk Yarı Handikap (-1.5)") {
	if($oran_val=="1 (-1.5)" && ($ilkyari_ev-2)>$ilkyari_dep) {
		$donen = 2;
	} else if($oran_val=="2 (-1.5)" && ($ilkyari_dep-2)>$ilkyari_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk Yarı Handikap (-2.5)") {
	if($oran_val=="1 (-2.5)" && ($ilkyari_ev-3)>$ilkyari_dep) {
		$donen = 2;
	} else if($oran_val=="2 (-2.5)" && ($ilkyari_dep-3)>$ilkyari_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk Yarı Handikap (-3.5)") {
	if($oran_val=="1 (-3.5)" && ($ilkyari_ev-4)>$ilkyari_dep) {
		$donen = 2;
	} else if($oran_val=="2 (-3.5)" && ($ilkyari_dep-4)>$ilkyari_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk Yarı Handikap (-4.5)") {
	if($oran_val=="1 (-4.5)" && ($ilkyari_ev-5)>$ilkyari_dep) {
		$donen = 2;
	} else if($oran_val=="2 (-4.5)" && ($ilkyari_dep-5)>$ilkyari_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk Yarı Handikap (-5.5)") {
	if($oran_val=="1 (-5.5)" && ($ilkyari_ev-6)>$ilkyari_dep) {
		$donen = 2;
	} else if($oran_val=="2 (-5.5)" && ($ilkyari_dep-6)>$ilkyari_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk Yarı Handikap (-6.5)") {
	if($oran_val=="1 (-6.5)" && ($ilkyari_ev-7)>$ilkyari_dep) {
		$donen = 2;
	} else if($oran_val=="2 (-6.5)" && ($ilkyari_dep-7)>$ilkyari_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk Yarı Handikap (-7.5)") {
	if($oran_val=="1 (-7.5)" && ($ilkyari_ev-8)>$ilkyari_dep) {
		$donen = 2;
	} else if($oran_val=="2 (-7.5)" && ($ilkyari_dep-8)>$ilkyari_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk Yarı Handikap (-8.5)") {
	if($oran_val=="1 (-8.5)" && ($ilkyari_ev-9)>$ilkyari_dep) {
		$donen = 2;
	} else if($oran_val=="2 (-8.5)" && ($ilkyari_dep-9)>$ilkyari_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk Yarı Handikap (-9.5)") {
	if($oran_val=="1 (-9.5)" && ($ilkyari_ev-10)>$ilkyari_dep) {
		$donen = 2;
	} else if($oran_val=="2 (-9.5)" && ($ilkyari_dep-10)>$ilkyari_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk Yarı Handikap (-10.5)") {
	if($oran_val=="1 (-10.5)" && ($ilkyari_ev-11)>$ilkyari_dep) {
		$donen = 2;
	} else if($oran_val=="2 (-10.5)" && ($ilkyari_dep-11)>$ilkyari_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk Yarı Handikap (-11.5)") {
	if($oran_val=="1 (-11.5)" && ($ilkyari_ev-12)>$ilkyari_dep) {
		$donen = 2;
	} else if($oran_val=="2 (-11.5)" && ($ilkyari_dep-12)>$ilkyari_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk Yarı Handikap (-12.5)") {
	if($oran_val=="1 (-12.5)" && ($ilkyari_ev-13)>$ilkyari_dep) {
		$donen = 2;
	} else if($oran_val=="2 (-12.5)" && ($ilkyari_dep-13)>$ilkyari_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk Yarı Handikap (-13.5)") {
	if($oran_val=="1 (-13.5)" && ($ilkyari_ev-14)>$ilkyari_dep) {
		$donen = 2;
	} else if($oran_val=="2 (-13.5)" && ($ilkyari_dep-14)>$ilkyari_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk Yarı Handikap (-14.5)") {
	if($oran_val=="1 (-14.5)" && ($ilkyari_ev-15)>$ilkyari_dep) {
		$donen = 2;
	} else if($oran_val=="2 (-14.5)" && ($ilkyari_dep-15)>$ilkyari_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk Yarı Handikap (-15.5)") {
	if($oran_val=="1 (-15.5)" && ($ilkyari_ev-16)>$ilkyari_dep) {
		$donen = 2;
	} else if($oran_val=="2 (-15.5)" && ($ilkyari_dep-16)>$ilkyari_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk Yarı Handikap (-16.5)") {
	if($oran_val=="1 (-16.5)" && ($ilkyari_ev-17)>$ilkyari_dep) {
		$donen = 2;
	} else if($oran_val=="2 (-16.5)" && ($ilkyari_dep-17)>$ilkyari_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk Yarı Handikap (-17.5)") {
	if($oran_val=="1 (-17.5)" && ($ilkyari_ev-18)>$ilkyari_dep) {
		$donen = 2;
	} else if($oran_val=="2 (-17.5)" && ($ilkyari_dep-18)>$ilkyari_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk Yarı Handikap (-18.5)") {
	if($oran_val=="1 (-18.5)" && ($ilkyari_ev-19)>$ilkyari_dep) {
		$donen = 2;
	} else if($oran_val=="2 (-18.5)" && ($ilkyari_dep-19)>$ilkyari_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk Yarı Handikap (-19.5)") {
	if($oran_val=="1 (-19.5)" && ($ilkyari_ev-20)>$ilkyari_dep) {
		$donen = 2;
	} else if($oran_val=="2 (-19.5)" && ($ilkyari_dep-20)>$ilkyari_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk Yarı Handikap (-20.5)") {
	if($oran_val=="1 (-20.5)" && ($ilkyari_ev-21)>$ilkyari_dep) {
		$donen = 2;
	} else if($oran_val=="2 (-20.5)" && ($ilkyari_dep-21)>$ilkyari_ev) {
		$donen = 2;
	} else {
		$donen = 3;
	}
}

return $donen;
}

$kupondokum_vbl = sed_sql_query("select iy_ev,iy_dep,ms_ev,ms_dep,set_1,set_2,set_3,set_4,set_5,kazanan_20,kazanan_40,kazanan_60,oran_tip,oran_val,id from kupon_ic_sanal where spor_tip='vbl_v2' and kazanma='1' and iy_ev!='' and iy_dep!='' and ms_ev!='' and ms_dep!='' limit 1000");
echo sed_sql_numrows($kupondokum_vbl). " Tane Kupon Sonuçlandırılıyor... ( SANAL BASKETBOL İÇİN ) <br>";
while($row_vbl=sed_sql_fetcharray($kupondokum_vbl)) {
flush();
if($row_vbl['iy_ev']!='' && $row_vbl['iy_dep']!='' && $row_vbl['ms_ev']!='' && $row_vbl['ms_dep']!='') {
$sonucgetir_basketbol = basketbol_sonuc_sanal($row_vbl['set_1'],$row_vbl['set_2'],$row_vbl['set_3'],$row_vbl['set_4'],$row_vbl['set_5'],$row_vbl['kazanan_20'],$row_vbl['kazanan_40'],$row_vbl['kazanan_60'],$row_vbl['oran_tip'],$row_vbl['oran_val']);
sed_sql_query("update kupon_ic_sanal set kazanma='$sonucgetir_basketbol' where id='$row_vbl[id]' and spor_tip='vbl_v2'");
}
}
## BASKETBOL SONUÇLARI ##


## AT YARIŞI SONUÇLARI ##
function sanalat_sonuc($secilmisat,$at_1,$at_2,$at_3,$oran_tip,$oran_val) {

$oran_val_bol = explode(',',$oran_val);

if($oran_tip=="Kazanır") {
	if($oran_val=="Evet" && $secilmisat==$at_1) {
		$donen = 2;
	} else if($oran_val=="Hayır" && $secilmisat!=$at_1) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk Üçe Girer") {
	if($oran_val=="Evet" && $secilmisat==$at_1) {
		$donen = 2;
	} else if($oran_val=="Evet" && $secilmisat==$at_2) {
		$donen = 2;
	} else if($oran_val=="Evet" && $secilmisat==$at_3) {
		$donen = 2;
	} else if($oran_val=="Hayır" && $secilmisat!=$at_1) {
		$donen = 2;
	} else if($oran_val=="Hayır" && $secilmisat!=$at_2) {
		$donen = 2;
	} else if($oran_val=="Hayır" && $secilmisat!=$at_3) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="İlk İkiye Girer") {
	if($oran_val=="Evet" && $secilmisat==$at_1) {
		$donen = 2;
	} else if($oran_val=="Evet" && $secilmisat==$at_2) {
		$donen = 2;
	} else if($oran_val=="Hayır" && $secilmisat!=$at_1) {
		$donen = 2;
	} else if($oran_val=="Hayır" && $secilmisat!=$at_2) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Sıralı İkili") {
	if($oran_val_bol[0]==$at_1 && $oran_val_bol[1]==$at_2) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Sırasız İkili") {
	if(($oran_val_bol[0]==$at_1 && $oran_val_bol[1]==$at_2) || ($oran_val_bol[1]==$at_1 && $oran_val_bol[0]==$at_2)) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Sıralı Üçlü") {
	if($oran_val_bol[0]==$at_1 && $oran_val_bol[1]==$at_2 && $oran_val_bol[2]==$at_3) {
		$donen = 2;
	} else {
		$donen = 3;
	}
} else if($oran_tip=="Sırasız Üçlü") {
	if(($oran_val_bol[0]==$at_1 && $oran_val_bol[1]==$at_2 && $oran_val_bol[2]==$at_3) || ($oran_val_bol[1]==$at_1 && $oran_val_bol[0]==$at_2 && $oran_val_bol[2]==$at_3) || ($oran_val_bol[0]==$at_1 && $oran_val_bol[2]==$at_2 && $oran_val_bol[1]==$at_3)) {
		$donen = 2;
	} else {
		$donen = 3;
	}
}

return $donen;
}

$kupondokum_sanalat = sed_sql_query("select mac_kodu,at_1,at_2,at_3,oran_tip,oran_val,id from kupon_ic_sanal where (spor_tip='vhc_v2' or spor_tip='vdr_v2') and kazanma='1' and at_1!='0' and at_2!='0' and at_3!='0' limit 1000");
echo sed_sql_numrows($kupondokum_sanalat). " Tane Kupon Sonuçlandırılıyor... ( SANAL AT YARIŞI İÇİN ) <br>";
while($row_sanalat=sed_sql_fetcharray($kupondokum_sanalat)) {
flush();
if($row_sanalat['at_1']!='0' && $row_sanalat['at_2']!='0' && $row_sanalat['at_3']!='0') {
$sonucgetir_sanalat = sanalat_sonuc($row_sanalat['mac_kodu'],$row_sanalat['at_1'],$row_sanalat['at_2'],$row_sanalat['at_3'],$row_sanalat['oran_tip'],$row_sanalat['oran_val']);
sed_sql_query("update kupon_ic_sanal set kazanma='$sonucgetir_sanalat' where id='$row_sanalat[id]' and (spor_tip='vhc_v2' or spor_tip='vdr_v2') and at_1!='0' and at_2!='0' and at_3!='0'");
}
}
## AT YARIŞI SONUÇLARI ##

function azzcurl($adres){
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$adres);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 50);
return  curl_exec($ch);
curl_close($ch);
}

$time_ver = time()-180;

## FUTBOL V2 SONUÇLARI ##

$sor_vflm = sed_sql_query("select * from kupon_ic_sanal where kazanma='1' and mac_time<$time_ver and spor_tip='vflm_v2' and iy_ev='' and iy_dep='' and ms_ev='' and ms_dep='' group by sezon_hafta order by sezonid ASC");

while($row_vflm=sed_sql_fetcharray($sor_vflm)){

$js_vflm = azzcurl("https://betwingo.xyz/api/sanalmaclar_sonuc.php?tip=futbolv2&sezonid=".$row_vflm['sezonid']."&hafta=".$row_vflm['hafta']."");
$jsonGet_vflm = json_decode($js_vflm,1);
$all_vflm = $jsonGet_vflm['doc'][0]['data'];

foreach($all_vflm as $all_vflm2){

foreach($all_vflm2['realcategories'] as $all_vflm3){

foreach($all_vflm3['tournaments'] as $all_vflm4){

foreach($all_vflm4['matches'] as $keysss => $all_vflm5){

$macstatusu_id_vflm = $all_vflm5['status']['_id'];
$macstatusu_devre_vflm = $all_vflm5['status']['name'];

$mac_idsi_vflm = $all_vflm5['_id'];
$iy_skor_ev_vflm = $all_vflm5['periods']['p1']['home'];
$iy_skor_dep_vflm = $all_vflm5['periods']['p1']['away'];
$ms_skor_ev_vflm = $all_vflm5['periods']['ft']['home'];
$ms_skor_dep_vflm = $all_vflm5['periods']['ft']['away'];
$birinci_gol_atan_ver_vflm = $all_vflm5['1st_goal'];

if($birinci_gol_atan_ver_vflm=="home"){
	$birinci_gol_atan_vflm = 1;
} else if($birinci_gol_atan_ver_vflm=="away"){
	$birinci_gol_atan_vflm = 2;
} else {
	$birinci_gol_atan_vflm = 0;
}

if($macstatusu_id_vflm=="100" && $macstatusu_devre_vflm=="Ended"){

sed_sql_query("update kupon_ic_sanal set birincigol='$birinci_gol_atan_vflm',iy_ev='$iy_skor_ev_vflm',iy_dep='$iy_skor_dep_vflm',ms_ev='$ms_skor_ev_vflm',ms_dep='$ms_skor_dep_vflm' where mac_kodu='$mac_idsi_vflm' and spor_tip='vflm_v2' and kazanma='1' and iy_ev='' and iy_dep='' and ms_ev='' and ms_dep=''");

}

}

}

}

}

}

## FUTBOL V2 SONUÇLARI ##

## TÜRKİYE LİGİ SONUÇLARI ##

$sor_vfct = sed_sql_query("select * from kupon_ic_sanal where kazanma='1' and mac_time<$time_ver and spor_tip='vfct_v2' and iy_ev='' and iy_dep='' and ms_ev='' and ms_dep='' group by sezon_hafta order by sezonid ASC");

while($row_vfct=sed_sql_fetcharray($sor_vfct)){

$js_vfct = azzcurl("https://betwingo.xyz/api/sanalmaclar_sonuc.php?tip=turkiye&sezonid=".$row_vfct['sezonid']."&hafta=".$row_vfct['hafta']."");

$jsonGet_vfct = json_decode($js_vfct,1);
$all_vfct = $jsonGet_vfct['doc'][0]['data'];

foreach($all_vfct as $all_vfct2){

foreach($all_vfct2['realcategories'] as $all_vfct3){

foreach($all_vfct3['tournaments'] as $all_vfct4){

foreach($all_vfct4['matches'] as $keysss => $all_vfct5){

$macstatusu_id_vfct = $all_vfct5['status']['_id'];
$macstatusu_devre_vfct = $all_vfct5['status']['name'];

$mac_idsi_vfct = $all_vfct5['_id'];
$iy_skor_ev_vfct = $all_vfct5['periods']['p1']['home'];
$iy_skor_dep_vfct = $all_vfct5['periods']['p1']['away'];
$ms_skor_ev_vfct = $all_vfct5['periods']['ft']['home'];
$ms_skor_dep_vfct = $all_vfct5['periods']['ft']['away'];
$birinci_gol_atan_ver_vfct = $all_vfct5['1st_goal'];

if($birinci_gol_atan_ver_vfct=="home"){
	$birinci_gol_atan_vfct = 1;
} else if($birinci_gol_atan_ver_vfct=="away"){
	$birinci_gol_atan_vfct = 2;
} else {
	$birinci_gol_atan_vfct = 0;
}

if($macstatusu_id_vfct=="100" && $macstatusu_devre_vfct=="Ended"){

sed_sql_query("update kupon_ic_sanal set birincigol='$birinci_gol_atan_vfct',iy_ev='$iy_skor_ev_vfct',iy_dep='$iy_skor_dep_vfct',ms_ev='$ms_skor_ev_vfct',ms_dep='$ms_skor_dep_vfct' where mac_kodu='$mac_idsi_vfct' and spor_tip='vfct_v2' and kazanma='1' and iy_ev='' and iy_dep='' and ms_ev='' and ms_dep=''");

}

}

}

}

}

}

## TÜRKİYE LİGİ SONUÇLARI ##

## ŞAMPİYONLAR LİGİ SONUÇLARI ##

$sor_vfcc = sed_sql_query("select * from kupon_ic_sanal where kazanma='1' and mac_time<$time_ver and spor_tip='vfcc_v2' and iy_ev='' and iy_dep='' and ms_ev='' and ms_dep='' group by sezonid order by sezonid ASC");

while($row_vfcc=sed_sql_fetcharray($sor_vfcc)){

$js_vfcc = azzcurl("https://betwingo.xyz/api/sanalmaclar_sonuc.php?tip=sampiyonlar&sezonid=".$row_vfcc['sezonid']."");
$jsonGet_vfcc = json_decode($js_vfcc,1);
$all_vfcc = $jsonGet_vfcc['doc'][0]['data'];

foreach($all_vfcc as $all_vfcc2){

foreach($all_vfcc2['realcategories'] as $all_vfcc3){

foreach($all_vfcc3['tournaments'] as $all_vfcc4){

foreach($all_vfcc4['matches'] as $keysss => $all_vfcc5){

$macstatusu_id_vfcc = $all_vfcc5['status']['_id'];
$macstatusu_devre_vfcc = $all_vfcc5['status']['name'];

$mac_idsi_vfcc = $all_vfcc5['_id'];
$iy_skor_ev_vfcc = $all_vfcc5['periods']['p1']['home'];
$iy_skor_dep_vfcc = $all_vfcc5['periods']['p1']['away'];
$ms_skor_ev_vfcc = $all_vfcc5['periods']['ft']['home'];
$ms_skor_dep_vfcc = $all_vfcc5['periods']['ft']['away'];
$birinci_gol_atan_ver_vfcc = $all_vfcc5['1st_goal'];

if($birinci_gol_atan_ver_vfcc=="home"){
	$birinci_gol_atan_vfcc = 1;
} else if($birinci_gol_atan_ver_vfcc=="away"){
	$birinci_gol_atan_vfcc = 2;
} else {
	$birinci_gol_atan_vfcc = 0;
}

if($macstatusu_id_vfcc=="100" && $macstatusu_devre_vfcc=="Ended"){

sed_sql_query("update kupon_ic_sanal set birincigol='$birinci_gol_atan_vfcc',iy_ev='$iy_skor_ev_vfcc',iy_dep='$iy_skor_dep_vfcc',ms_ev='$ms_skor_ev_vfcc',ms_dep='$ms_skor_dep_vfcc' where mac_kodu='$mac_idsi_vfcc' and spor_tip='vfcc_v2' and kazanma='1' and iy_ev='' and iy_dep='' and ms_ev='' and ms_dep=''");

}

}

}

}

}

}

## ŞAMPİYONLAR LİGİ SONUÇLARI ##

## DÜNYA KUPASI SONUÇLARI ##

$sor_vfwc = sed_sql_query("select * from kupon_ic_sanal where kazanma='1' and mac_time<$time_ver and spor_tip='vfwc_v2' and iy_ev='' and iy_dep='' and ms_ev='' and ms_dep='' group by sezonid order by sezonid ASC");

while($row_vfwc=sed_sql_fetcharray($sor_vfwc)){

$js_vfwc = azzcurl("https://betwingo.xyz/api/sanalmaclar_sonuc.php?tip=dunya&sezonid=".$row_vfwc['sezonid']."");
$jsonGet_vfwc = json_decode($js_vfwc,1);
$all_vfwc = $jsonGet_vfwc['doc'][0]['data'];

foreach($all_vfwc as $all_vfwc2){

foreach($all_vfwc2['realcategories'] as $all_vfwc3){

foreach($all_vfwc3['tournaments'] as $all_vfwc4){

foreach($all_vfwc4['matches'] as $keysss => $all_vfwc5){

$macstatusu_id_vfwc = $all_vfwc5['status']['_id'];
$macstatusu_devre_vfwc = $all_vfwc5['status']['name'];

$mac_idsi_vfwc = $all_vfwc5['_id'];
$iy_skor_ev_vfwc = $all_vfwc5['periods']['p1']['home'];
$iy_skor_dep_vfwc = $all_vfwc5['periods']['p1']['away'];
$ms_skor_ev_vfwc = $all_vfwc5['periods']['ft']['home'];
$ms_skor_dep_vfwc = $all_vfwc5['periods']['ft']['away'];
$birinci_gol_atan_ver_vfwc = $all_vfwc5['1st_goal'];

if($birinci_gol_atan_ver_vfwc=="home"){
	$birinci_gol_atan_vfwc = 1;
} else if($birinci_gol_atan_ver_vfwc=="away"){
	$birinci_gol_atan_vfwc = 2;
} else {
	$birinci_gol_atan_vfwc = 0;
}

if($macstatusu_id_vfwc=="100" && $macstatusu_devre_vfwc=="Ended"){

sed_sql_query("update kupon_ic_sanal set birincigol='$birinci_gol_atan_vfwc',iy_ev='$iy_skor_ev_vfwc',iy_dep='$iy_skor_dep_vfwc',ms_ev='$ms_skor_ev_vfwc',ms_dep='$ms_skor_dep_vfwc' where mac_kodu='$mac_idsi_vfwc' and spor_tip='vfwc_v2' and kazanma='1' and iy_ev='' and iy_dep='' and ms_ev='' and ms_dep=''");

}

}

}

}

}

}

## DÜNYA KUPASI SONUÇLARI ##

## AVRUPA 2020 SONUÇLARI ##

$sor_vfec = sed_sql_query("select * from kupon_ic_sanal where kazanma='1' and mac_time<$time_ver and spor_tip='vfec_v2' and iy_ev='' and iy_dep='' and ms_ev='' and ms_dep='' group by sezonid order by sezonid ASC");

while($row_vfec=sed_sql_fetcharray($sor_vfec)){

$js_vfec = azzcurl("https://betwingo.xyz/api/sanalmaclar_sonuc.php?tip=avrupa2020&sezonid=".$row_vfec['sezonid']."");
$jsonGet_vfec = json_decode($js_vfec,1);
$all_vfec = $jsonGet_vfec['doc'][0]['data'];

foreach($all_vfec as $all_vfec2){

foreach($all_vfec2['realcategories'] as $all_vfec3){

foreach($all_vfec3['tournaments'] as $all_vfec4){

foreach($all_vfec4['matches'] as $keysss => $all_vfec5){

$macstatusu_id_vfec = $all_vfec5['status']['_id'];
$macstatusu_devre_vfec = $all_vfec5['status']['name'];

$mac_idsi_vfec = $all_vfec5['_id'];
$iy_skor_ev_vfec = $all_vfec5['periods']['p1']['home'];
$iy_skor_dep_vfec = $all_vfec5['periods']['p1']['away'];
$ms_skor_ev_vfec = $all_vfec5['periods']['ft']['home'];
$ms_skor_dep_vfec = $all_vfec5['periods']['ft']['away'];
$birinci_gol_atan_ver_vfec = $all_vfec5['1st_goal'];

if($birinci_gol_atan_ver_vfec=="home"){
	$birinci_gol_atan_vfec = 1;
} else if($birinci_gol_atan_ver_vfec=="away"){
	$birinci_gol_atan_vfec = 2;
} else {
	$birinci_gol_atan_vfec = 0;
}

if($macstatusu_id_vfec=="100" && $macstatusu_devre_vfec=="Ended"){

sed_sql_query("update kupon_ic_sanal set birincigol='$birinci_gol_atan_vfec',iy_ev='$iy_skor_ev_vfec',iy_dep='$iy_skor_dep_vfec',ms_ev='$ms_skor_ev_vfec',ms_dep='$ms_skor_dep_vfec' where mac_kodu='$mac_idsi_vfec' and spor_tip='vfec_v2' and kazanma='1' and iy_ev='' and iy_dep='' and ms_ev='' and ms_dep=''");

}

}

}

}

}

}

## AVRUPA 2020 SONUÇLARI ##

## BASKETBOL SONUÇLARI ##

$sor_vbl = sed_sql_query("select * from kupon_ic_sanal where kazanma='1' and mac_time<$time_ver and spor_tip='vbl_v2' and iy_ev='' and iy_dep='' and ms_ev='' and ms_dep='' group by sezon_hafta order by sezonid ASC");

while($row_vbl=sed_sql_fetcharray($sor_vbl)){

$js_vbl = azzcurl("https://betwingo.xyz/api/sanalmaclar_sonuc.php?tip=basketbol&sezonid=".$row_vbl['sezonid']."&hafta=".$row_vbl['hafta']."");
$jsonGet_vbl = json_decode($js_vbl,1);
$all_vbl = $jsonGet_vbl['doc'][0]['data'];

foreach($all_vbl as $all_vbl2){

foreach($all_vbl2['realcategories'] as $all_vbl3){

foreach($all_vbl3['tournaments'] as $all_vbl4){

foreach($all_vbl4['matches'] as $keysss => $all_vbl5){

$macstatusu_id_vbl = $all_vbl5['status']['_id'];
$macstatusu_devre_vbl = $all_vbl5['status']['name'];

$mac_idsi_vbl = $all_vbl5['_id'];
$set_1_ev_vbl = $all_vbl5['periods']['p1']['home'];
$set_1_dep_vbl = $all_vbl5['periods']['p1']['away'];
$set_2_ev_vbl = $all_vbl5['periods']['p2']['home'];
$set_2_dep_vbl = $all_vbl5['periods']['p2']['away'];
$set_3_ev_vbl = $all_vbl5['periods']['p3']['home'];
$set_3_dep_vbl = $all_vbl5['periods']['p3']['away'];
$set_4_ev_vbl = $all_vbl5['periods']['p4']['home'];
$set_4_dep_vbl = $all_vbl5['periods']['p4']['away'];
$set_5_ev_vbl = $all_vbl5['periods']['p5']['home'];
$set_5_dep_vbl = $all_vbl5['periods']['p5']['away'];

$kimkazandi_20 = $all_vbl5['races']['20']['winner'];
$kimkazandi_40 = $all_vbl5['races']['40']['winner'];
$kimkazandi_60 = $all_vbl5['races']['60']['winner'];

if($kimkazandi_20=="home"){
	$kimkazanmis_20 = "1";
} else if($kimkazandi_20=="away"){
	$kimkazanmis_20 = "2";
} else {
	$kimkazanmis_20 = "0";
}

if($kimkazandi_40=="home"){
	$kimkazanmis_40 = "1";
} else if($kimkazandi_40=="away"){
	$kimkazanmis_40 = "2";
} else {
	$kimkazanmis_40 = "0";
}

if($kimkazandi_60=="home"){
	$kimkazanmis_60 = "1";
} else if($kimkazandi_60=="away"){
	$kimkazanmis_60 = "2";
} else {
	$kimkazanmis_60 = "0";
}

$set1_birlestir_vbl = "".$set_1_ev_vbl." - ".$set_1_dep_vbl."";
$set2_birlestir_vbl = "".$set_2_ev_vbl." - ".$set_2_dep_vbl."";
$set3_birlestir_vbl = "".$set_3_ev_vbl." - ".$set_3_dep_vbl."";
$set4_birlestir_vbl = "".$set_4_ev_vbl." - ".$set_4_dep_vbl."";
$set5_birlestir_vbl = "".$set_5_ev_vbl." - ".$set_5_dep_vbl."";

$iy_ev_skor_topla_vbl = $set_1_ev_vbl+$set_2_ev_vbl;
$iy_dep_skor_topla_vbl = $set_1_dep_vbl+$set_2_dep_vbl;
$ev_skor_topla_vbl = $set_1_ev_vbl+$set_2_ev_vbl+$set_3_ev_vbl+$set_4_ev_vbl;
$dep_skor_topla_vbl = $set_1_dep_vbl+$set_2_dep_vbl+$set_3_dep_vbl+$set_4_dep_vbl;

if($macstatusu_id_vbl=="100" && $macstatusu_devre_vbl=="Ended"){

sed_sql_query("update kupon_ic_sanal set iy_ev='$iy_ev_skor_topla_vbl',iy_dep='$iy_dep_skor_topla_vbl',ms_ev='$ev_skor_topla_vbl',ms_dep='$dep_skor_topla_vbl',set_1='$set1_birlestir_vbl',set_2='$set2_birlestir_vbl',set_3='$set3_birlestir_vbl',set_4='$set4_birlestir_vbl',set_5='$set5_birlestir_vbl',kazanan_20='$kimkazanmis_20',kazanan_40='$kimkazanmis_40',kazanan_60='$kimkazanmis_60' where mac_kodu='$mac_idsi_vbl' and spor_tip='vbl_v2' and kazanma='1' and iy_ev='' and iy_dep='' and ms_ev='' and ms_dep=''");

}

}

}

}

}

}

## BASKETBOL SONUÇLARI ##

## AT SONUÇLARI ##

$sor_vhc = sed_sql_query("select * from kupon_ic_sanal where kazanma='1' and mac_time<$time_ver and spor_tip='vhc_v2' and at_1='0' and at_2='0' and at_3='0' group by sezon_hafta order by sezonid ASC");

while($row_vhc=sed_sql_fetcharray($sor_vhc)){

$js_vhc = azzcurl("https://betwingo.xyz/api/sanalmaclar_sonuc.php?tip=at&sezonid=".$row_vhc['sezonid']."&sezon=".$row_vhc['sezon']."");

preg_match_all('#<img src="/vhc/img/overlays/numbers/small/(.*?)" alt="" class="start_nr_overlay"/>#si', $js_vhc, $js_al_vhc);
preg_match_all('#<span class="runner">(.*?)</span>#si', $js_vhc, $js_al_takim_vhc);
preg_match_all('#<span class="rider">(.*?)</span>#si', $js_vhc, $js_al_joker_vhc);

## KAZANAN SIRALAMA ##
$kazanmasirasi_1_vhc = $js_al_vhc[0][0];
$kazanmasirasi_1_vhc = explode('.png',$kazanmasirasi_1_vhc);
$kazanmasirasi_1_vhc = explode('img/overlays/numbers/small/',$kazanmasirasi_1_vhc[0]);
$kazanmasirasi_1_vhc = $kazanmasirasi_1_vhc[1];

$kazanmasirasi_2_vhc = $js_al_vhc[0][1];
$kazanmasirasi_2_vhc = explode('.png',$kazanmasirasi_2_vhc);
$kazanmasirasi_2_vhc = explode('img/overlays/numbers/small/',$kazanmasirasi_2_vhc[0]);
$kazanmasirasi_2_vhc = $kazanmasirasi_2_vhc[1];

$kazanmasirasi_3_vhc = $js_al_vhc[0][2];
$kazanmasirasi_3_vhc = explode('.png',$kazanmasirasi_3_vhc);
$kazanmasirasi_3_vhc = explode('img/overlays/numbers/small/',$kazanmasirasi_3_vhc[0]);
$kazanmasirasi_3_vhc = $kazanmasirasi_3_vhc[1];
## KAZANAN SIRALAMA ##
## KAZANAN TAKIM ##
$kazanankisi_1_vhc = $js_al_takim_vhc[0][0];
$kazanankisi_1_vhc = explode('</span',$kazanankisi_1_vhc);
$kazanankisi_1_vhc = explode(' class="runner">',$kazanankisi_1_vhc[0]);
$kazanankisi_1_vhc = $kazanankisi_1_vhc[1];
$kazanankisi_1_vhc = str_replace("'", "`", $kazanankisi_1_vhc);

$kazanankisi_2_vhc = $js_al_takim_vhc[0][1];
$kazanankisi_2_vhc = explode('</span',$kazanankisi_2_vhc);
$kazanankisi_2_vhc = explode(' class="runner">',$kazanankisi_2_vhc[0]);
$kazanankisi_2_vhc = $kazanankisi_2_vhc[1];
$kazanankisi_2_vhc = str_replace("'", "`", $kazanankisi_2_vhc);

$kazanankisi_3_vhc = $js_al_takim_vhc[0][2];
$kazanankisi_3_vhc = explode('</span',$kazanankisi_3_vhc);
$kazanankisi_3_vhc = explode(' class="runner">',$kazanankisi_3_vhc[0]);
$kazanankisi_3_vhc = $kazanankisi_3_vhc[1];
$kazanankisi_3_vhc = str_replace("'", "`", $kazanankisi_3_vhc);
## KAZANAN TAKIM ##
## KAZANAN JOKER ##
$kazananjoker_1_vhc = $js_al_joker_vhc[0][0];
$kazananjoker_1_vhc = explode('</span',$kazananjoker_1_vhc);
$kazananjoker_1_vhc = explode(' class="rider">',$kazananjoker_1_vhc[0]);
$kazananjoker_1_vhc = $kazananjoker_1_vhc[1];
$kazananjoker_1_vhc = str_replace("'", "`", $kazananjoker_1_vhc);

$kazananjoker_2_vhc = $js_al_joker_vhc[0][1];
$kazananjoker_2_vhc = explode('</span',$kazananjoker_2_vhc);
$kazananjoker_2_vhc = explode(' class="rider">',$kazananjoker_2_vhc[0]);
$kazananjoker_2_vhc = $kazananjoker_2_vhc[1];
$kazananjoker_2_vhc = str_replace("'", "`", $kazananjoker_2_vhc);

$kazananjoker_3_vhc = $js_al_joker_vhc[0][2];
$kazananjoker_3_vhc = explode('</span',$kazananjoker_3_vhc);
$kazananjoker_3_vhc = explode(' class="rider">',$kazananjoker_3_vhc[0]);
$kazananjoker_3_vhc = $kazananjoker_3_vhc[1];
$kazananjoker_3_vhc = str_replace("'", "`", $kazananjoker_3_vhc);
## KAZANAN JOKER ##

/*
echo "AT 1: ".$kazanmasirasi_1_vhc." - AT İSİM : ".$kazanankisi_1_vhc." - AT JOKER : ".$kazananjoker_1_vhc."<BR>";
echo "AT 2: ".$kazanmasirasi_2_vhc." - AT İSİM : ".$kazanankisi_2_vhc." - AT JOKER : ".$kazananjoker_2_vhc."<BR>";
echo "AT 3: ".$kazanmasirasi_3_vhc." - AT İSİM : ".$kazanankisi_3_vhc." - AT JOKER : ".$kazananjoker_3_vhc."<BR>";
*/

if($kazanmasirasi_1_vhc>0 && $kazanmasirasi_2_vhc>0 && $kazanmasirasi_3_vhc>0){

sed_sql_query("update kupon_ic_sanal set at_1='$kazanmasirasi_1_vhc',at_1_isim='$kazanankisi_1_vhc',at_1_joker='$kazananjoker_1_vhc',at_2='$kazanmasirasi_2_vhc',at_2_isim='$kazanankisi_2_vhc',at_2_joker='$kazananjoker_2_vhc',at_3='$kazanmasirasi_3_vhc',at_3_isim='$kazanankisi_3_vhc',at_3_joker='$kazananjoker_3_vhc' where sezonid='$row_vhc[sezonid]' and sezon='$row_vhc[sezon]' and hafta='$row_vhc[hafta]' and spor_tip='vhc_v2' and kazanma='1' and at_1='0' and at_2='0' and at_3='0'");

}


}

## AT SONUÇLARI ##

## KÖPEK SONUÇLARI ##

$sor_vdr = sed_sql_query("select * from kupon_ic_sanal where kazanma='1' and mac_time<$time_ver and spor_tip='vdr_v2' and at_1='0' and at_2='0' and at_3='0' group by sezon_hafta order by sezonid ASC");

while($row_vdr=sed_sql_fetcharray($sor_vdr)){

$js_vdr = azzcurl("https://betwingo.xyz/api/sanalmaclar_sonuc.php?tip=kopek&sezonid=".$row_vdr['sezonid']."&sezon=".$row_vdr['sezon']."");

preg_match_all('#<img src="/vdr/img/bibs/(.*?)" alt="Stats" class="statisticbib"/>#si', $js_vdr, $js_al_vdr);
preg_match_all('#<span class="runner">(.*?)</span>#si', $js_vdr, $js_al_joker_vdr);

## KAZANAN SIRALAMA ##
$kazanmasirasi_1_vdr = $js_al_vdr[0][0];
$kazanmasirasi_1_vdr = explode('.png',$kazanmasirasi_1_vdr);
$kazanmasirasi_1_vdr = explode('img/bibs/bibs_race_begin_big',$kazanmasirasi_1_vdr[0]);
$kazanmasirasi_1_vdr = $kazanmasirasi_1_vdr[1];

$kazanmasirasi_2_vdr = $js_al_vdr[0][1];
$kazanmasirasi_2_vdr = explode('.png',$kazanmasirasi_2_vdr);
$kazanmasirasi_2_vdr = explode('img/bibs/bibs_race_begin_big',$kazanmasirasi_2_vdr[0]);
$kazanmasirasi_2_vdr = $kazanmasirasi_2_vdr[1];

$kazanmasirasi_3_vdr = $js_al_vdr[0][2];
$kazanmasirasi_3_vdr = explode('.png',$kazanmasirasi_3_vdr);
$kazanmasirasi_3_vdr = explode('img/bibs/bibs_race_begin_big',$kazanmasirasi_3_vdr[0]);
$kazanmasirasi_3_vdr = $kazanmasirasi_3_vdr[1];
## KAZANAN SIRALAMA ##
## KAZANAN JOKER ##
$kazananjoker_1_vdr = $js_al_joker_vdr[0][0];
$kazananjoker_1_vdr = explode('</span',$kazananjoker_1_vdr);
$kazananjoker_1_vdr = explode(' class="runner">',$kazananjoker_1_vdr[0]);
$kazananjoker_1_vdr = $kazananjoker_1_vdr[1];
$kazananjoker_1_vdr = str_replace("'", "`", $kazananjoker_1_vdr);

$kazananjoker_2_vdr = $js_al_joker_vdr[0][1];
$kazananjoker_2_vdr = explode('</span',$kazananjoker_2_vdr);
$kazananjoker_2_vdr = explode(' class="runner">',$kazananjoker_2_vdr[0]);
$kazananjoker_2_vdr = $kazananjoker_2_vdr[1];
$kazananjoker_2_vdr = str_replace("'", "`", $kazananjoker_2_vdr);

$kazananjoker_3_vdr = $js_al_joker_vdr[0][2];
$kazananjoker_3_vdr = explode('</span',$kazananjoker_3_vdr);
$kazananjoker_3_vdr = explode(' class="runner">',$kazananjoker_3_vdr[0]);
$kazananjoker_3_vdr = $kazananjoker_3_vdr[1];
$kazananjoker_3_vdr = str_replace("'", "`", $kazananjoker_3_vdr);
## KAZANAN JOKER ##

if($kazanmasirasi_1_vdr>0 && $kazanmasirasi_2_vdr>0 && $kazanmasirasi_3_vdr>0){

sed_sql_query("update kupon_ic_sanal set at_1='$kazanmasirasi_1_vdr',at_1_joker='$kazananjoker_1_vdr',at_2='$kazanmasirasi_2_vdr',at_2_joker='$kazananjoker_2_vdr',at_3='$kazanmasirasi_3_vdr',at_3_joker='$kazananjoker_3_vdr' where sezonid='$row_vdr[sezonid]' and sezon='$row_vdr[sezon]' and hafta='$row_vdr[hafta]' and spor_tip='vdr_v2' and kazanma='1' and at_1='0' and at_2='0' and at_3='0'");

}

}

## KÖPEK SONUÇLARI ##

## SANALLAR İÇİN ##

?>
<meta http-equiv="refresh" content="15">