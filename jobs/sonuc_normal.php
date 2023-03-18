<?php
header("Content-type: text/html; charset=utf-8");
set_time_limit(0);
include 'xml.php';
flush();

function futbol_sonuc($sarikart,$kirmizikart,$korner,$penalti,$iy_skor,$ms_skor,$oranval) {
$sarikart_bol = explode(" - ",$sarikart);
$kirmizikart_bol = explode(" - ",$kirmizikart);
$korner_bol = explode(" - ",$korner);
$penalti_bol = explode(" - ",$penalti);
$iy_skorbol = explode(" - ",$iy_skor);
$ms_skorbol = explode(" - ",$ms_skor);

$sari_kart_ev = $sarikart_bol[0];
$sari_kart_konuk = $sarikart_bol[1];
$kirmizi_kart_ev = $kirmizikart_bol[0];
$kirmizi_kart_konuk = $kirmizikart_bol[1];
$korner_ev = $korner_bol[0];
$korner_konuk = $korner_bol[1];
$penalti_ev = $penalti_bol[0];
$penalti_konuk = $penalti_bol[1];

$iy_ev_skor = $iy_skorbol[0];
$iy_konuk_skor = $iy_skorbol[1];
$ms_ev_skor = $ms_skorbol[0];
$ms_konuk_skor = $ms_skorbol[1];

$ev_ikincihesap = $ms_ev_skor-$iy_ev_skor;
$konuk_ikincihesap = $ms_konuk_skor-$iy_konuk_skor;
	
if($ev_ikincihesap<0) { $ev_ikincihesap = 0; }
if($konuk_ikincihesap<0) { $konuk_ikincihesap = 0; }
	
$ms_toplam_gol = $ms_ev_skor+$ms_konuk_skor;
$iy_toplam_gol = $iy_ev_skor+$iy_konuk_skor;
$ik_toplam_gol = $ev_ikincihesap+$konuk_ikincihesap;
	
$han_ev_skor_1 = $ms_ev_skor+1;
$han_konuk_skor_1 = $ms_konuk_skor+1;
$han_ev_skor_2 = $ms_ev_skor+2;
$han_konuk_skor_2 = $ms_konuk_skor+2;


if($ms_ev_skor-$ms_konuk_skor==1){
	$birgol_fark = 1;
} else if($ms_konuk_skor-$ms_ev_skor==1){
	$birgol_fark = 1;
} else {
	$birgol_fark = 0;
}

if($ms_ev_skor-$ms_konuk_skor==2){
	$ikigol_fark = 1;
} else if($ms_konuk_skor-$ms_ev_skor==2){
	$ikigol_fark = 1;
} else {
	$ikigol_fark = 0;
}

if($ms_ev_skor-$ms_konuk_skor==3){
	$ucgol_fark = 1;
} else if($ms_konuk_skor-$ms_ev_skor==3){
	$ucgol_fark = 1;
} else {
	$ucgol_fark = 0;
}

$sari_kart_topla = $sari_kart_ev+$sari_kart_konuk;
$kirmizi_topla = $kirmizi_kart_ev+$kirmizi_kart_konuk;
$penalti_topla = $penalti_ev+$penalti_konuk;
$korner_topla = $korner_ev+$korner_konuk;
if($sari_kart_topla%2==0) { $saritekcift = "cift"; } else { $saritekcift = "tek"; }
if($korner_topla%2==0) { $kornertekcift = "cift"; } else { $kornertekcift = "tek"; }
if($iy_toplam_gol%2==0) { $iy_tekcift = "cift"; } else { $iy_tekcift = "tek"; }
if($ms_toplam_gol%2==0) { $ms_tekcift = "cift"; } else { $ms_tekcift = "tek"; }
if($ik_toplam_gol%2==0) { $ikinci_yari_tekcift = "cift"; } else { $ikinci_yari_tekcift = "tek"; }
if($ms_ev_skor%2==0) { $ms_ev_tekcift = "cift"; } else { $ms_ev_tekcift = "tek"; }
if($ms_konuk_skor%2==0) { $ms_konuk_tekcift = "cift"; } else { $ms_konuk_tekcift = "tek"; }

## 1X2 ##
if($oranval==1 && $ms_ev_skor>$ms_konuk_skor) { $donen = 2; }
else if($oranval==2 && $ms_ev_skor==$ms_konuk_skor) { $donen = 2; }
else if($oranval==3 && $ms_ev_skor<$ms_konuk_skor) { $donen = 2; }
## HANDİKAP 0:1 ##
else if($oranval==4 && $ms_ev_skor>$han_konuk_skor_1) { $donen = 2; }
else if($oranval==5 && $ms_ev_skor==$han_konuk_skor_1) { $donen = 2; }
else if($oranval==6 && $ms_ev_skor<$han_konuk_skor_1) { $donen = 2; }
## HANDİKAP 1:0 ##
else if($oranval==7 && $han_ev_skor_1>$ms_konuk_skor) { $donen = 2; }
else if($oranval==8 && $han_ev_skor_1==$ms_konuk_skor) { $donen = 2; }
else if($oranval==9 && $han_ev_skor_1<$ms_konuk_skor) { $donen = 2; }
## HANDİKAP 0:2 ##
else if($oranval==10 && $ms_ev_skor>$han_konuk_skor_2) { $donen = 2; }
else if($oranval==11 && $ms_ev_skor==$han_konuk_skor_2) { $donen = 2; }
else if($oranval==12 && $ms_ev_skor<$han_konuk_skor_2) { $donen = 2; }
## HANDİKAP 2:0 ##
else if($oranval==13 && $han_ev_skor_2>$ms_konuk_skor) { $donen = 2; }
else if($oranval==14 && $han_ev_skor_2==$ms_konuk_skor) { $donen = 2; }
else if($oranval==15 && $han_ev_skor_2<$ms_konuk_skor) { $donen = 2; }
## 1X2 1.YARI ##
else if($oranval==16 && $iy_ev_skor>$iy_konuk_skor) { $donen = 2; }
else if($oranval==17 && $iy_ev_skor==$iy_konuk_skor) { $donen = 2; }
else if($oranval==18 && $iy_ev_skor<$iy_konuk_skor) { $donen = 2; }
## 1X2 2.YARI ##
else if($oranval==19 && $ev_ikincihesap>$konuk_ikincihesap) { $donen = 2; }
else if($oranval==20 && $ev_ikincihesap==$konuk_ikincihesap) { $donen = 2; }
else if($oranval==21 && $ev_ikincihesap<$konuk_ikincihesap) { $donen = 2; }
## 1.Yarı Çifte Şans ##
else if($oranval==22 && $iy_ev_skor>$iy_konuk_skor) { $donen = 2; }
else if($oranval==22 && $iy_ev_skor==$iy_konuk_skor) { $donen = 2; }
else if($oranval==23 && $iy_ev_skor==$iy_konuk_skor) { $donen = 2; }
else if($oranval==23 && $iy_ev_skor<$iy_konuk_skor) { $donen = 2; }
else if($oranval==24 && $iy_ev_skor>$iy_konuk_skor) { $donen = 2; }
else if($oranval==24 && $iy_ev_skor<$iy_konuk_skor) { $donen = 2; }
## 1.YARI KG ##
else if($oranval==25 && $iy_ev_skor>0 && $iy_konuk_skor>0) { $donen = 2; }
else if($oranval==26 && ($iy_ev_skor<1 || $iy_konuk_skor<1)) { $donen = 2; }
## Beraberlikte İade ##
else if($oranval==27 && $ms_ev_skor>$ms_konuk_skor) { $donen = 2; }
else if($oranval==27 && $ms_ev_skor==$ms_konuk_skor) { $donen = 4; }
else if($oranval==28 && $ms_ev_skor<$ms_konuk_skor) { $donen = 2; }
else if($oranval==28 && $ms_ev_skor==$ms_konuk_skor) { $donen = 4; }
## Toplam Gol Alt/Üst 0.5 ##
else if($oranval==29 && $ms_toplam_gol<1) { $donen = 2; }
else if($oranval==30 && $ms_toplam_gol>0) { $donen = 2; }
## Toplam Gol Alt/Üst 1.5 ##
else if($oranval==31 && $ms_toplam_gol<2) { $donen = 2; }
else if($oranval==32 && $ms_toplam_gol>1) { $donen = 2; }
## Toplam Gol Alt/Üst 2.5 ##
else if($oranval==33 && $ms_toplam_gol<3) { $donen = 2; }
else if($oranval==34 && $ms_toplam_gol>2) { $donen = 2; }
## Toplam Gol Alt/Üst 3.5 ##
else if($oranval==35 && $ms_toplam_gol<4) { $donen = 2; }
else if($oranval==36 && $ms_toplam_gol>3) { $donen = 2; }
## Toplam Gol Alt/Üst 4.5 ##
else if($oranval==37 && $ms_toplam_gol<5) { $donen = 2; }
else if($oranval==38 && $ms_toplam_gol>4) { $donen = 2; }
## Toplam Gol Alt/Üst 5.5 ##
else if($oranval==39 && $ms_toplam_gol<6) { $donen = 2; }
else if($oranval==40 && $ms_toplam_gol>5) { $donen = 2; }
## 1.Yarı Toplam Gol Alt/Üst 0.5 ##
else if($oranval==41 && $iy_toplam_gol<1) { $donen = 2; }
else if($oranval==42 && $iy_toplam_gol>0) { $donen = 2; }
## 1.Yarı Toplam Gol Alt/Üst 1.5 ##
else if($oranval==43 && $iy_toplam_gol<2) { $donen = 2; }
else if($oranval==44 && $iy_toplam_gol>1) { $donen = 2; }
## 1.Yarı Toplam Gol Alt/Üst 2.5 ##
else if($oranval==45 && $iy_toplam_gol<3) { $donen = 2; }
else if($oranval==46 && $iy_toplam_gol>2) { $donen = 2; }
## 1.Yarı Toplam Gol Alt/Üst 3.5 ##
else if($oranval==47 && $iy_toplam_gol<4) { $donen = 2; }
else if($oranval==48 && $iy_toplam_gol>3) { $donen = 2; }
## 2.Yarı Toplam Gol Alt/Üst 0.5 ##
else if($oranval==49 && $ik_toplam_gol<1) { $donen = 2; }
else if($oranval==50 && $ik_toplam_gol>0) { $donen = 2; }
## 2.Yarı Toplam Gol Alt/Üst 1.5 ##
else if($oranval==51 && $ik_toplam_gol<2) { $donen = 2; }
else if($oranval==52 && $ik_toplam_gol>1) { $donen = 2; }
## 2.Yarı Toplam Gol Alt/Üst 2.5 ##
else if($oranval==53 && $ik_toplam_gol<3) { $donen = 2; }
else if($oranval==54 && $ik_toplam_gol>2) { $donen = 2; }
## 2.Yarı Toplam Gol Alt/Üst 3.5 ##
else if($oranval==55 && $ik_toplam_gol<4) { $donen = 2; }
else if($oranval==56 && $ik_toplam_gol>3) { $donen = 2; }
## Ev Sahibi Gol Atarmı ? ##
else if($oranval==57 && $ms_ev_skor>0) { $donen = 2; }
else if($oranval==58 && $ms_ev_skor==0) { $donen = 2; }
## Deplasman Gol Atarmı ? ##
else if($oranval==59 && $ms_konuk_skor>0) { $donen = 2; }
else if($oranval==60 && $ms_konuk_skor==0) { $donen = 2; }
## Karşılıklı Gol ##
else if($oranval==61 && $ms_ev_skor>0 && $ms_konuk_skor>0) { $donen = 2; }
else if($oranval==62 && ($ms_ev_skor<1 || $ms_konuk_skor<1)) { $donen = 2; }
## 1.Yarı Tek/Çift ##
else if($oranval==63 && $iy_tekcift=="cift") { $donen = 2; }
else if($oranval==64 && $iy_tekcift=="tek") { $donen = 2; }
## Tek/Çift ##
else if($oranval==65 && $ms_tekcift=="cift") { $donen = 2; }
else if($oranval==66 && $ms_tekcift=="tek") { $donen = 2; }
## Evsahibi Kaç Gol Atar ? ##
else if($oranval==67 && $ms_ev_skor==0) { $donen = 2; }
else if($oranval==68 && $ms_ev_skor==1) { $donen = 2; }
else if($oranval==69 && $ms_ev_skor==2) { $donen = 2; }
else if($oranval==70 && $ms_ev_skor>2) { $donen = 2; }
## Deplasman Kaç Gol Atar ? ##
else if($oranval==71 && $ms_konuk_skor==0) { $donen = 2; }
else if($oranval==72 && $ms_konuk_skor==1) { $donen = 2; }
else if($oranval==73 && $ms_konuk_skor==2) { $donen = 2; }
else if($oranval==74 && $ms_konuk_skor>2) { $donen = 2; }
## Evsahibi 1.Yarı Kaç Gol Atar ? ##
else if($oranval==75 && $iy_ev_skor==0) { $donen = 2; }
else if($oranval==76 && $iy_ev_skor==1) { $donen = 2; }
else if($oranval==77 && $iy_ev_skor==2) { $donen = 2; }
else if($oranval==78 && $iy_ev_skor>2) { $donen = 2; }
## Evsahibi 2.Yarı Kaç Gol Atar ? ##
else if($oranval==79 && $ev_ikincihesap==0) { $donen = 2; }
else if($oranval==80 && $ev_ikincihesap==1) { $donen = 2; }
else if($oranval==81 && $ev_ikincihesap==2) { $donen = 2; }
else if($oranval==82 && $ev_ikincihesap>2) { $donen = 2; }
## Deplasman 1.Yarı Kaç Gol Atar ? ##
else if($oranval==83 && $iy_konuk_skor==0) { $donen = 2; }
else if($oranval==84 && $iy_konuk_skor==1) { $donen = 2; }
else if($oranval==85 && $iy_konuk_skor==2) { $donen = 2; }
else if($oranval==86 && $iy_konuk_skor>2) { $donen = 2; }
## Deplasman 2.Yarı Kaç Gol Atar ? ##
else if($oranval==87 && $konuk_ikincihesap==0) { $donen = 2; }
else if($oranval==88 && $konuk_ikincihesap==1) { $donen = 2; }
else if($oranval==89 && $konuk_ikincihesap==2) { $donen = 2; }
else if($oranval==90 && $konuk_ikincihesap>2) { $donen = 2; }
## Evsahibi 1.Yarı A/Ü 0.5 ##
else if($oranval==91 && $iy_ev_skor<1) { $donen = 2; }
else if($oranval==92 && $iy_ev_skor>0) { $donen = 2; }
## Evsahibi 1.Yarı A/Ü 1.5 ##
else if($oranval==93 && $iy_ev_skor<2) { $donen = 2; }
else if($oranval==94 && $iy_ev_skor>1) { $donen = 2; }
## Deplasman 1.Yarı A/Ü 0.5 ##
else if($oranval==95 && $iy_konuk_skor<1) { $donen = 2; }
else if($oranval==96 && $iy_konuk_skor>0) { $donen = 2; }
## Deplasman 1.Yarı A/Ü 1.5 ##
else if($oranval==97 && $iy_konuk_skor<2) { $donen = 2; }
else if($oranval==98 && $iy_konuk_skor>1) { $donen = 2; }
## Evsahibi A/Ü 1.5 ##
else if($oranval==99 && $ms_ev_skor<2) { $donen = 2; }
else if($oranval==100 && $ms_ev_skor>1) { $donen = 2; }
## Deplasman A/Ü 1.5 ##
else if($oranval==101 && $ms_konuk_skor<2) { $donen = 2; }
else if($oranval==102 && $ms_konuk_skor>1) { $donen = 2; }
## Evsahibi Her 2 yarıda Gol Atar ? ##
else if($oranval==103 && $iy_ev_skor>0 && $ev_ikincihesap>0) { $donen = 2; }
else if($oranval==104 && ($iy_ev_skor<1 || $ev_ikincihesap<1)) { $donen = 2; }
## Deplasman Her 2 yarıda Gol Atar ? ##
else if($oranval==105 && $iy_konuk_skor>0 && $konuk_ikincihesap>0) { $donen = 2; }
else if($oranval==106 && ($iy_konuk_skor<1 || $konuk_ikincihesap<1)) { $donen = 2; }
## Hangi Devrede Fazla Gol Olur ##
else if($oranval==107 && $iy_toplam_gol>$ik_toplam_gol) { $donen = 2; }
else if($oranval==108 && $iy_toplam_gol==$ik_toplam_gol) { $donen = 2; }
else if($oranval==109 && $iy_toplam_gol<$ik_toplam_gol) { $donen = 2; }
## Evsahibi Hangi Devrede Fazla Gol Atar ? ##
else if($oranval==110 && $iy_ev_skor>$ev_ikincihesap) { $donen = 2; }
else if($oranval==111 && $iy_ev_skor==$ev_ikincihesap) { $donen = 2; }
else if($oranval==112 && $iy_ev_skor<$ev_ikincihesap) { $donen = 2; }
## Deplasman Hangi Devrede Fazla Gol Atar ? ##
else if($oranval==113 && $iy_konuk_skor>$konuk_ikincihesap) { $donen = 2; }
else if($oranval==114 && $iy_konuk_skor==$konuk_ikincihesap) { $donen = 2; }
else if($oranval==115 && $iy_konuk_skor<$konuk_ikincihesap) { $donen = 2; }
## Müsabakada kaç gol atılır? (0-4+) ##
else if($oranval==116 && $ms_toplam_gol<2) { $donen = 2; }
else if($oranval==117 && ($ms_toplam_gol==2 || $ms_toplam_gol==3)) { $donen = 2; }
else if($oranval==118 && $ms_toplam_gol>3) { $donen = 2; }
## Müsabakada kaç gol atılır? (0-5+) ##
else if($oranval==119 && $ms_toplam_gol<3) { $donen = 2; }
else if($oranval==120 && ($ms_toplam_gol==3 || $ms_toplam_gol==4)) { $donen = 2; }
else if($oranval==121 && $ms_toplam_gol>4) { $donen = 2; }
## Müsabakada kaç gol atılır? (0-6+) ##
else if($oranval==122 && $ms_toplam_gol<4) { $donen = 2; }
else if($oranval==123 && ($ms_toplam_gol==4 || $ms_toplam_gol==5)) { $donen = 2; }
else if($oranval==124 && $ms_toplam_gol>5) { $donen = 2; }
## Herhangi bir takım 1 gol farkla kazanır mı? ##
else if($oranval==125 && $birgol_fark==1) { $donen = 2; }
else if($oranval==126 && $birgol_fark==0) { $donen = 2; }
## Herhangi bir takım 2 gol farkla kazanır mı? ##
else if($oranval==127 && $ikigol_fark==1) { $donen = 2; }
else if($oranval==128 && $ikigol_fark==0) { $donen = 2; }
## Herhangi bir takım 3 gol farkla kazanır mı? ##
else if($oranval==129 && $ucgol_fark==1) { $donen = 2; }
else if($oranval==130 && $ucgol_fark==0) { $donen = 2; }
## 1X2 ve toplam gol sayısı ##
else if($oranval==131 && $ms_toplam_gol>2 && $ms_ev_skor>$ms_konuk_skor) { $donen = 2; }
else if($oranval==132 && $ms_toplam_gol>2 && $ms_ev_skor<$ms_konuk_skor) { $donen = 2; }
else if($oranval==133 && $ms_toplam_gol<3 && $ms_ev_skor>$ms_konuk_skor) { $donen = 2; }
else if($oranval==134 && $ms_toplam_gol<3 && $ms_ev_skor<$ms_konuk_skor) { $donen = 2; }
else if($oranval==135 && $ms_ev_skor==$ms_konuk_skor) { $donen = 2; }
## 1X2 ve toplam gol sayısı 3.5 ##
else if($oranval==266 && $ms_toplam_gol>3 && $ms_ev_skor>$ms_konuk_skor) { $donen = 2; }
else if($oranval==267 && $ms_toplam_gol>3 && $ms_ev_skor<$ms_konuk_skor) { $donen = 2; }
else if($oranval==268 && $ms_toplam_gol<4 && $ms_ev_skor>$ms_konuk_skor) { $donen = 2; }
else if($oranval==269 && $ms_toplam_gol<4 && $ms_ev_skor<$ms_konuk_skor) { $donen = 2; }
else if($oranval==270 && $ms_ev_skor==$ms_konuk_skor) { $donen = 2; }
## Maç sonucu ve karşılıklı goller ##
else if($oranval==136 && $ms_ev_skor>$ms_konuk_skor && $ms_ev_skor>0 && $ms_konuk_skor>0) { $donen = 2; }
else if($oranval==137 && $ms_ev_skor<$ms_konuk_skor && $ms_ev_skor>0 && $ms_konuk_skor>0) { $donen = 2; }
else if($oranval==138 && $ms_ev_skor>$ms_konuk_skor && ($ms_ev_skor<1 || $ms_konuk_skor<1)) { $donen = 2; }
else if($oranval==139 && $ms_ev_skor<$ms_konuk_skor && ($ms_ev_skor<1 || $ms_konuk_skor<1)) { $donen = 2; }
else if($oranval==140 && $ms_toplam_gol==0) { $donen = 2; }
else if($oranval==141 && $ms_ev_skor==$ms_konuk_skor && $ms_ev_skor>0 && $ms_konuk_skor>0) { $donen = 2; }
## İlk Yarı / Maç Sonucu ##
else if($oranval==142 && $iy_ev_skor>$iy_konuk_skor && $ms_ev_skor>$ms_konuk_skor) { $donen = 2; }
else if($oranval==143 && $iy_ev_skor==$iy_konuk_skor && $ms_ev_skor>$ms_konuk_skor) { $donen = 2; }
else if($oranval==144 && $iy_ev_skor<$iy_konuk_skor && $ms_ev_skor>$ms_konuk_skor) { $donen = 2; }
else if($oranval==145 && $iy_ev_skor>$iy_konuk_skor && $ms_ev_skor==$ms_konuk_skor) { $donen = 2; }
else if($oranval==146 && $iy_ev_skor==$iy_konuk_skor && $ms_ev_skor==$ms_konuk_skor) { $donen = 2; }
else if($oranval==147 && $iy_ev_skor<$iy_konuk_skor && $ms_ev_skor==$ms_konuk_skor) { $donen = 2; }
else if($oranval==148 && $iy_ev_skor>$iy_konuk_skor && $ms_ev_skor<$ms_konuk_skor) { $donen = 2; }
else if($oranval==149 && $iy_ev_skor==$iy_konuk_skor && $ms_ev_skor<$ms_konuk_skor) { $donen = 2; }
else if($oranval==150 && $iy_ev_skor<$iy_konuk_skor && $ms_ev_skor<$ms_konuk_skor) { $donen = 2; }
## Skor Bahsi (90 Dakika) ##
else if($oranval==151 && $ms_ev_skor==0 && $ms_konuk_skor==0) { $donen = 2; }
else if($oranval==152 && $ms_ev_skor==1 && $ms_konuk_skor==0) { $donen = 2; }
else if($oranval==153 && $ms_ev_skor==1 && $ms_konuk_skor==1) { $donen = 2; }
else if($oranval==154 && $ms_ev_skor==0 && $ms_konuk_skor==1) { $donen = 2; }
else if($oranval==155 && $ms_ev_skor==2 && $ms_konuk_skor==0) { $donen = 2; }
else if($oranval==156 && $ms_ev_skor==2 && $ms_konuk_skor==1) { $donen = 2; }
else if($oranval==157 && $ms_ev_skor==2 && $ms_konuk_skor==2) { $donen = 2; }
else if($oranval==158 && $ms_ev_skor==1 && $ms_konuk_skor==2) { $donen = 2; }
else if($oranval==159 && $ms_ev_skor==0 && $ms_konuk_skor==2) { $donen = 2; }
else if($oranval==160 && $ms_ev_skor==3 && $ms_konuk_skor==0) { $donen = 2; }
else if($oranval==161 && $ms_ev_skor==3 && $ms_konuk_skor==1) { $donen = 2; }
else if($oranval==162 && $ms_ev_skor==3 && $ms_konuk_skor==2) { $donen = 2; }
else if($oranval==163 && $ms_ev_skor==3 && $ms_konuk_skor==3) { $donen = 2; }
else if($oranval==164 && $ms_ev_skor==2 && $ms_konuk_skor==3) { $donen = 2; }
else if($oranval==165 && $ms_ev_skor==1 && $ms_konuk_skor==3) { $donen = 2; }
else if($oranval==166 && $ms_ev_skor==0 && $ms_konuk_skor==3) { $donen = 2; }
else if($oranval==167 && $ms_ev_skor==4 && $ms_konuk_skor==0) { $donen = 2; }
else if($oranval==168 && $ms_ev_skor==4 && $ms_konuk_skor==1) { $donen = 2; }
else if($oranval==169 && $ms_ev_skor==4 && $ms_konuk_skor==2) { $donen = 2; }
else if($oranval==170 && $ms_ev_skor==4 && $ms_konuk_skor==3) { $donen = 2; }
else if($oranval==171 && $ms_ev_skor==4 && $ms_konuk_skor==4) { $donen = 2; }
else if($oranval==172 && $ms_ev_skor==3 && $ms_konuk_skor==4) { $donen = 2; }
else if($oranval==173 && $ms_ev_skor==2 && $ms_konuk_skor==4) { $donen = 2; }
else if($oranval==174 && $ms_ev_skor==1 && $ms_konuk_skor==4) { $donen = 2; }
else if($oranval==175 && $ms_ev_skor==0 && $ms_konuk_skor==4) { $donen = 2; }
## Çifte Şans ##
else if($oranval==176 && ($ms_ev_skor>$ms_konuk_skor || $ms_ev_skor==$ms_konuk_skor)) { $donen = 2; }
else if($oranval==177 && ($ms_ev_skor==$ms_konuk_skor || $ms_ev_skor<$ms_konuk_skor)) { $donen = 2; }
else if($oranval==178 && ($ms_ev_skor>$ms_konuk_skor || $ms_ev_skor<$ms_konuk_skor)) { $donen = 2; }
## Toplam Sari Kart Alt/Üst 3.5 ##
else if($oranval==179 && $sari_kart_topla>3) { $donen = 2; }
else if($oranval==180 && $sari_kart_topla<4) { $donen = 2; }
## Kirmizi kart cikar mi? ##
else if($oranval==181 && $kirmizi_topla>0) { $donen = 2; }
else if($oranval==182 && $kirmizi_topla<1) { $donen = 2; }
## Macta kac tane penalti olur? ##
else if($oranval==183 && $penalti_topla==0) { $donen = 2; }
else if($oranval==184 && $penalti_topla==1) { $donen = 2; }
else if($oranval==185 && $penalti_topla>1) { $donen = 2; }
## 1.Takim Sari Kart Alt/Üst 1.5 ##
else if($oranval==186 && $sari_kart_ev>1) { $donen = 2; }
else if($oranval==187 && $sari_kart_ev<2) { $donen = 2; }
## 1.Takim Sari Kart Alt/Üst 2.5 ##
else if($oranval==188 && $sari_kart_ev>2) { $donen = 2; }
else if($oranval==189 && $sari_kart_ev<3) { $donen = 2; }
## 1.Takim Sari Kart Alt/Üst 3.5 ##
else if($oranval==190 && $sari_kart_ev>3) { $donen = 2; }
else if($oranval==191 && $sari_kart_ev<4) { $donen = 2; }
## 2.Takim Sari Kart Alt/Üst 1.5 ##
else if($oranval==192 && $sari_kart_konuk>1) { $donen = 2; }
else if($oranval==193 && $sari_kart_konuk<2) { $donen = 2; }
## 2.Takim Sari Kart Alt/Üst 2.5 ##
else if($oranval==194 && $sari_kart_konuk>2) { $donen = 2; }
else if($oranval==195 && $sari_kart_konuk<3) { $donen = 2; }
## 2.Takim Sari Kart Alt/Üst 3.5 ##
else if($oranval==196 && $sari_kart_konuk>3) { $donen = 2; }
else if($oranval==197 && $sari_kart_konuk<4) { $donen = 2; }
## Sarı Kart Toplam Tek/Çift ##
else if($oranval==198 && $saritekcift=="cift") { $donen = 2; }
else if($oranval==199 && $saritekcift=="tek") { $donen = 2; }
## Hangi Takım Çok Sarı Kart Yer ? ##
else if($oranval==200 && $sari_kart_ev>$sari_kart_konuk) { $donen = 2; }
else if($oranval==201 && $sari_kart_ev==$sari_kart_konuk) { $donen = 2; }
else if($oranval==202 && $sari_kart_ev<$sari_kart_konuk) { $donen = 2; }
## Toplam Korner Alt/Üst 5.5 ##
else if($oranval==203 && $korner_topla>5) { $donen = 2; }
else if($oranval==204 && $korner_topla<6) { $donen = 2; }
## Toplam Korner Alt/Üst 6.5 ##
else if($oranval==205 && $korner_topla>6) { $donen = 2; }
else if($oranval==206 && $korner_topla<7) { $donen = 2; }
## Toplam Korner Alt/Üst 7.5 ##
else if($oranval==207 && $korner_topla>7) { $donen = 2; }
else if($oranval==208 && $korner_topla<8) { $donen = 2; }
## Toplam Korner Alt/Üst 8.5 ##
else if($oranval==209 && $korner_topla>8) { $donen = 2; }
else if($oranval==210 && $korner_topla<9) { $donen = 2; }
## Toplam Korner Alt/Üst 9.5 ##
else if($oranval==211 && $korner_topla>9) { $donen = 2; }
else if($oranval==212 && $korner_topla<10) { $donen = 2; }
## Toplam Korner Alt/Üst 10.5 ##
else if($oranval==213 && $korner_topla>10) { $donen = 2; }
else if($oranval==214 && $korner_topla<11) { $donen = 2; }
## Toplam Korner Alt/Üst 11.5 ##
else if($oranval==215 && $korner_topla>11) { $donen = 2; }
else if($oranval==216 && $korner_topla<12) { $donen = 2; }
## Toplam Korner Alt/Üst 12.5 ##
else if($oranval==217 && $korner_topla>12) { $donen = 2; }
else if($oranval==218 && $korner_topla<13) { $donen = 2; }
## Toplam Korner Alt/Üst 13.5 ##
else if($oranval==219 && $korner_topla>13) { $donen = 2; }
else if($oranval==220 && $korner_topla<14) { $donen = 2; }
## Toplam Korner Alt/Üst 14.5 ##
else if($oranval==221 && $korner_topla>14) { $donen = 2; }
else if($oranval==222 && $korner_topla<15) { $donen = 2; }
## Toplam Korner Alt/Üst 15.5 ##
else if($oranval==223 && $korner_topla>15) { $donen = 2; }
else if($oranval==224 && $korner_topla<16) { $donen = 2; }
## 1.Takım Korner Alt/Üst 2.5 ##
else if($oranval==225 && $korner_ev>2) { $donen = 2; }
else if($oranval==226 && $korner_ev<3) { $donen = 2; }
## 1.Takım Korner Alt/Üst 3.5 ##
else if($oranval==227 && $korner_ev>3) { $donen = 2; }
else if($oranval==228 && $korner_ev<4) { $donen = 2; }
## 1.Takım Korner Alt/Üst 4.5 ##
else if($oranval==229 && $korner_ev>4) { $donen = 2; }
else if($oranval==230 && $korner_ev<5) { $donen = 2; }
## 1.Takım Korner Alt/Üst 5.5 ##
else if($oranval==231 && $korner_ev>5) { $donen = 2; }
else if($oranval==232 && $korner_ev<6) { $donen = 2; }
## 1.Takım Korner Alt/Üst 6.5 ##
else if($oranval==232 && $korner_ev>6) { $donen = 2; }
else if($oranval==234 && $korner_ev<7) { $donen = 2; }
## 1.Takım Korner Alt/Üst 7.5 ##
else if($oranval==235 && $korner_ev>7) { $donen = 2; }
else if($oranval==236 && $korner_ev<8) { $donen = 2; }
## 1.Takım Korner Alt/Üst 8.5 ##
else if($oranval==237 && $korner_ev>8) { $donen = 2; }
else if($oranval==238 && $korner_ev<9) { $donen = 2; }
## 1.Takım Korner Alt/Üst 9.5 ##
else if($oranval==239 && $korner_ev>9) { $donen = 2; }
else if($oranval==240 && $korner_ev<10) { $donen = 2; }
## 1.Takım Korner Alt/Üst 10.5 ##
else if($oranval==241 && $korner_ev>10) { $donen = 2; }
else if($oranval==242 && $korner_ev<11) { $donen = 2; }
## 2.Takım Korner Alt/Üst 2.5 ##
else if($oranval==243 && $korner_konuk>2) { $donen = 2; }
else if($oranval==244 && $korner_konuk<3) { $donen = 2; }
## 2.Takım Korner Alt/Üst 3.5 ##
else if($oranval==245 && $korner_konuk>3) { $donen = 2; }
else if($oranval==246 && $korner_konuk<4) { $donen = 2; }
## 2.Takım Korner Alt/Üst 4.5 ##
else if($oranval==247 && $korner_konuk>4) { $donen = 2; }
else if($oranval==248 && $korner_konuk<5) { $donen = 2; }
## 2.Takım Korner Alt/Üst 5.5 ##
else if($oranval==249 && $korner_konuk>5) { $donen = 2; }
else if($oranval==250 && $korner_konuk<6) { $donen = 2; }
## 2.Takım Korner Alt/Üst 6.5 ##
else if($oranval==251 && $korner_konuk>6) { $donen = 2; }
else if($oranval==252 && $korner_konuk<7) { $donen = 2; }
## 2.Takım Korner Alt/Üst 7.5 ##
else if($oranval==253 && $korner_konuk>7) { $donen = 2; }
else if($oranval==254 && $korner_konuk<8) { $donen = 2; }
## 2.Takım Korner Alt/Üst 8.5 ##
else if($oranval==255 && $korner_konuk>8) { $donen = 2; }
else if($oranval==256 && $korner_konuk<9) { $donen = 2; }
## 2.Takım Korner Alt/Üst 9.5 ##
else if($oranval==257 && $korner_konuk>9) { $donen = 2; }
else if($oranval==258 && $korner_konuk<10) { $donen = 2; }
## 2.Takım Korner Alt/Üst 10.5 ##
else if($oranval==259 && $korner_konuk>10) { $donen = 2; }
else if($oranval==260 && $korner_konuk<11) { $donen = 2; }
## Korner Toplam Tek/Çift ##
else if($oranval==261 && $kornertekcift=="cift") { $donen = 2; }
else if($oranval==262 && $kornertekcift=="tek") { $donen = 2; }
## Hangi Takım Çok Korner Kullanır ? ##
else if($oranval==263 && $korner_ev>$korner_konuk) { $donen = 2; }
else if($oranval==264 && $korner_ev==$korner_konuk) { $donen = 2; }
else if($oranval==265 && $korner_ev<$korner_konuk) { $donen = 2; }
## TUTMAYANLARI KAYBETTİ YAPMA ELSE'Sİ ##
else { $donen = 3; }
return $donen;

}

function basketbol_sonuc($birinciset,$ikinciset,$ucuncuset,$dorduncuset,$besinciset,$orantip,$secenekver) {
$birinciset_bol = explode(" - ",$birinciset);
$ikinciset_bol = explode(" - ",$ikinciset);
$ucuncuset_bol = explode(" - ",$ucuncuset);
$dorduncuset_bol = explode(" - ",$dorduncuset);
$besinciset_bol = explode(" - ",$besinciset);

$bir_ev = $birinciset_bol[0];
$bir_dep = $birinciset_bol[1];
$iki_ev = $ikinciset_bol[0];
$iki_dep = $ikinciset_bol[1];
$uc_ev = $ucuncuset_bol[0];
$uc_dep = $ucuncuset_bol[1];
$dort_ev = $dorduncuset_bol[0];
$dort_dep = $dorduncuset_bol[1];
$bes_ev = $besinciset_bol[0];
$bes_dep = $besinciset_bol[1];

$oran_tip_bol = explode("|",$orantip);
$oran_tip = $oran_tip_bol[0];
$oran_secenek = $oran_tip_bol[1];

$secenekbol = explode(",",$secenekver);
$donusensecenek = "".$secenekbol[0].".5";

$iy_toplam_ev = $bir_ev+$iki_ev;
$iy_toplam_konuk = $bir_dep+$iki_dep;
$ms_toplam_ev = $bir_ev+$iki_ev+$uc_ev+$dort_ev;
$ms_toplam_konuk = $bir_dep+$iki_dep+$uc_dep+$dort_dep;
$toplam_skor = $ms_toplam_ev+$ms_toplam_konuk;

$bir_toplam_skor = $bir_ev+$bir_dep;
$bir_yari_toplam_skor = $iy_toplam_ev+$iy_toplam_konuk;

if($toplam_skor%2==0) { $toplamskortekcift = "cift"; } else { $toplamskortekcift = "tek"; }
if($bir_toplam_skor%2==0) { $bir_toplamskortekcift = "cift"; } else { $bir_toplamskortekcift = "tek"; }
if($bir_yari_toplam_skor%2==0) { $bir_yari_toplamskortekcift = "cift"; } else { $bir_yari_toplamskortekcift = "tek"; }

$handikapli_ilkyari_ev = $iy_toplam_ev+$donusensecenek;
$handikapli_ilkyari_konuk = $iy_toplam_konuk+$donusensecenek;
$handikapli_ev = $ms_toplam_ev+$donusensecenek;
$handikapli_konuk = $ms_toplam_konuk+$donusensecenek;

$uzatmali_ev_toplam = $ms_toplam_ev+$bes_ev;
$uzatmali_dep_toplam = $ms_toplam_konuk+$bes_dep;
## Kim Kazanır ? ##
if($oran_tip=="Kim Kazanır ? (Uz. Dahil)" && $oran_secenek=="1" && $uzatmali_ev_toplam>$uzatmali_dep_toplam) { $donen = 2; }
else if($oran_tip=="Kim Kazanır ? (Uz. Dahil)" && $oran_secenek=="2" && $uzatmali_ev_toplam<$uzatmali_dep_toplam) { $donen = 2; }
## 1X2 ##
else if($oran_tip=="1X2 (Uz. Hariç)" && $oran_secenek=="1" && $ms_toplam_ev>$ms_toplam_konuk) { $donen = 2; }
else if($oran_tip=="1X2 (Uz. Hariç)" && $oran_secenek=="X" && $ms_toplam_ev==$ms_toplam_konuk) { $donen = 2; }
else if($oran_tip=="1X2 (Uz. Hariç)" && $oran_secenek=="2" && $ms_toplam_ev<$ms_toplam_konuk) { $donen = 2; }
## 1X2 ( 1.YARI ) ##
else if($oran_tip=="1X2 ( 1.YARI )" && $oran_secenek=="1" && $iy_toplam_ev>$iy_toplam_konuk) { $donen = 2; }
else if($oran_tip=="1X2 ( 1.YARI )" && $oran_secenek=="X" && $iy_toplam_ev==$iy_toplam_konuk) { $donen = 2; }
else if($oran_tip=="1X2 ( 1.YARI )" && $oran_secenek=="2" && $iy_toplam_ev<$iy_toplam_konuk) { $donen = 2; }
## Toplam Skor Tek/Çift ##
else if($oran_tip=="Toplam Skor Tek/Çift" && $oran_secenek=="T" && $toplamskortekcift=="tek") { $donen = 2; }
else if($oran_tip=="Toplam Skor Tek/Çift" && $oran_secenek=="Ç" && $toplamskortekcift=="cift") { $donen = 2; }
else if($oran_tip=="Toplam Skor Tek/Çift" && $oran_secenek=="Tek" && $toplamskortekcift=="tek") { $donen = 2; }
else if($oran_tip=="Toplam Skor Tek/Çift" && $oran_secenek=="Çift" && $toplamskortekcift=="cift") { $donen = 2; }
## Toplam Skor Alt/Üst ##
else if($oran_tip=="Toplam Skor Alt/Üst" && $oran_secenek=="Ü" && $toplam_skor>$donusensecenek) { $donen = 2; }
else if($oran_tip=="Toplam Skor Alt/Üst" && $oran_secenek=="A" && $toplam_skor<$donusensecenek) { $donen = 2; }
else if($oran_tip=="Toplam Skor Alt/Üst" && $oran_secenek=="Üst" && $toplam_skor>$donusensecenek) { $donen = 2; }
else if($oran_tip=="Toplam Skor Alt/Üst" && $oran_secenek=="Alt" && $toplam_skor<$donusensecenek) { $donen = 2; }
## Handikap ( 1.YARI ) ##
else if($oran_tip=="Handikap ( 1.YARI )" && $oran_secenek=="1" && $handikapli_ilkyari_ev>$iy_toplam_konuk) { $donen = 2; }
else if($oran_tip=="Handikap ( 1.YARI )" && $oran_secenek=="2" && $handikapli_ilkyari_konuk>$iy_toplam_ev) { $donen = 2; }
## Handikap ##
else if($oran_tip=="Handikap" && $oran_secenek=="1" && $handikapli_ev>$ms_toplam_konuk) { $donen = 2; }
else if($oran_tip=="Handikap" && $oran_secenek=="2" && $handikapli_konuk>$ms_toplam_ev) { $donen = 2; }
## 1.Yarı / MS ##
else if($oran_tip=="1.Yarı / MS" && $oran_secenek=="1/1" && $iy_toplam_ev>$iy_toplam_konuk && $ms_toplam_ev>$ms_toplam_konuk) { $donen = 2; }
else if($oran_tip=="1.Yarı / MS" && $oran_secenek=="X/1" && $iy_toplam_ev==$iy_toplam_konuk && $ms_toplam_ev>$ms_toplam_konuk) { $donen = 2; }
else if($oran_tip=="1.Yarı / MS" && $oran_secenek=="2/1" && $iy_toplam_ev<$iy_toplam_konuk && $ms_toplam_ev>$ms_toplam_konuk) { $donen = 2; }
else if($oran_tip=="1.Yarı / MS" && $oran_secenek=="1/2" && $iy_toplam_ev>$iy_toplam_konuk && $ms_toplam_ev<$ms_toplam_konuk) { $donen = 2; }
else if($oran_tip=="1.Yarı / MS" && $oran_secenek=="X/2" && $iy_toplam_ev==$iy_toplam_konuk && $ms_toplam_ev<$ms_toplam_konuk) { $donen = 2; }
else if($oran_tip=="1.Yarı / MS" && $oran_secenek=="2/2" && $iy_toplam_ev<$iy_toplam_konuk && $ms_toplam_ev<$ms_toplam_konuk) { $donen = 2; }
## İki Devrede Kazanır ##
else if($oran_tip=="İki Devrede Kazanır" && $oran_secenek=="1" && $iy_toplam_ev>$iy_toplam_konuk && $ms_toplam_ev>$ms_toplam_konuk) { $donen = 2; }
else if($oran_tip=="İki Devrede Kazanır" && $oran_secenek=="2" && $iy_toplam_ev<$iy_toplam_konuk && $ms_toplam_ev<$ms_toplam_konuk) { $donen = 2; }
## Tüm Periyotları Kazanır ##
else if($oran_tip=="Tüm Periyotları Kazanır" && $oran_secenek=="1" && $bir_ev>$bir_dep && $iki_ev>$iki_dep && $uc_ev>$uc_dep && $dort_ev>$dort_dep) { $donen = 2; }
else if($oran_tip=="Tüm Periyotları Kazanır" && $oran_secenek=="2" && $bir_ev<$bir_dep && $iki_ev<$iki_dep && $uc_ev<$uc_dep && $dort_ev<$dort_dep) { $donen = 2; }
## 1.Takım İY Alt/Üst ##
else if($oran_tip=="1.Takım İY Alt/Üst" && $oran_secenek=="Ü" && $iy_toplam_ev>$donusensecenek) { $donen = 2; }
else if($oran_tip=="1.Takım İY Alt/Üst" && $oran_secenek=="A" && $iy_toplam_ev<$donusensecenek) { $donen = 2; }
else if($oran_tip=="1.Takım İY Alt/Üst" && $oran_secenek=="Üst" && $iy_toplam_ev>$donusensecenek) { $donen = 2; }
else if($oran_tip=="1.Takım İY Alt/Üst" && $oran_secenek=="Alt" && $iy_toplam_ev<$donusensecenek) { $donen = 2; }
## 2.Takım İY Alt/Üst ##
else if($oran_tip=="2.Takım İY Alt/Üst" && $oran_secenek=="Ü" && $iy_toplam_konuk>$donusensecenek) { $donen = 2; }
else if($oran_tip=="2.Takım İY Alt/Üst" && $oran_secenek=="A" && $iy_toplam_konuk<$donusensecenek) { $donen = 2; }
else if($oran_tip=="2.Takım İY Alt/Üst" && $oran_secenek=="Üst" && $iy_toplam_konuk>$donusensecenek) { $donen = 2; }
else if($oran_tip=="2.Takım İY Alt/Üst" && $oran_secenek=="Alt" && $iy_toplam_konuk<$donusensecenek) { $donen = 2; }
## 1.Takım Alt/Üst ##
else if($oran_tip=="1.Takım Alt/Üst" && $oran_secenek=="Ü" && $ms_toplam_ev>$donusensecenek) { $donen = 2; }
else if($oran_tip=="1.Takım Alt/Üst" && $oran_secenek=="A" && $ms_toplam_ev<$donusensecenek) { $donen = 2; }
else if($oran_tip=="1.Takım Alt/Üst" && $oran_secenek=="Üst" && $ms_toplam_ev>$donusensecenek) { $donen = 2; }
else if($oran_tip=="1.Takım Alt/Üst" && $oran_secenek=="Alt" && $ms_toplam_ev<$donusensecenek) { $donen = 2; }
## 2.Takım Alt/Üst ##
else if($oran_tip=="2.Takım Alt/Üst" && $oran_secenek=="Ü" && $ms_toplam_konuk>$donusensecenek) { $donen = 2; }
else if($oran_tip=="2.Takım Alt/Üst" && $oran_secenek=="A" && $ms_toplam_konuk<$donusensecenek) { $donen = 2; }
else if($oran_tip=="2.Takım Alt/Üst" && $oran_secenek=="Üst" && $ms_toplam_konuk>$donusensecenek) { $donen = 2; }
else if($oran_tip=="2.Takım Alt/Üst" && $oran_secenek=="Alt" && $ms_toplam_konuk<$donusensecenek) { $donen = 2; }
## 1.Takım 1.Çeyrek Alt/Üst ##
else if($oran_tip=="1.Takım 1.Çeyrek Alt/Üst" && $oran_secenek=="Ü" && $bir_ev>$donusensecenek) { $donen = 2; }
else if($oran_tip=="1.Takım 1.Çeyrek Alt/Üst" && $oran_secenek=="A" && $bir_ev<$donusensecenek) { $donen = 2; }
else if($oran_tip=="1.Takım 1.Çeyrek Alt/Üst" && $oran_secenek=="Üst" && $bir_ev>$donusensecenek) { $donen = 2; }
else if($oran_tip=="1.Takım 1.Çeyrek Alt/Üst" && $oran_secenek=="Alt" && $bir_ev<$donusensecenek) { $donen = 2; }
## 1.Takım 1.Çeyrek Alt/Üst ##
else if($oran_tip=="2.Takım 1.Çeyrek Alt/Üst" && $oran_secenek=="Ü" && $bir_dep>$donusensecenek) { $donen = 2; }
else if($oran_tip=="2.Takım 1.Çeyrek Alt/Üst" && $oran_secenek=="A" && $bir_dep<$donusensecenek) { $donen = 2; }
else if($oran_tip=="2.Takım 1.Çeyrek Alt/Üst" && $oran_secenek=="Üst" && $bir_dep>$donusensecenek) { $donen = 2; }
else if($oran_tip=="2.Takım 1.Çeyrek Alt/Üst" && $oran_secenek=="Alt" && $bir_dep<$donusensecenek) { $donen = 2; }
## 1.Çeyrek Kim Kazanır ##
else if($oran_tip=="1.Çeyrek Kim Kazanır" && $oran_secenek=="1" && $bir_ev>$bir_dep) { $donen = 2; }
else if($oran_tip=="1.Çeyrek Kim Kazanır" && $oran_secenek=="2" && $bir_ev<$bir_dep) { $donen = 2; }
## 1.Çeyrek Toplam Tek/Çift ##
else if($oran_tip=="1.Çeyrek Toplam Tek/Çift" && $oran_secenek=="T" && $bir_toplamskortekcift=="tek") { $donen = 2; }
else if($oran_tip=="1.Çeyrek Toplam Tek/Çift" && $oran_secenek=="Ç" && $bir_toplamskortekcift=="cift") { $donen = 2; }
else if($oran_tip=="1.Çeyrek Toplam Tek/Çift" && $oran_secenek=="Tek" && $bir_toplamskortekcift=="tek") { $donen = 2; }
else if($oran_tip=="1.Çeyrek Toplam Tek/Çift" && $oran_secenek=="Çift" && $bir_toplamskortekcift=="cift") { $donen = 2; }
## 1.Yarı Toplam Tek/Çift ##
else if($oran_tip=="1.Yarı Toplam Tek/Çift" && $oran_secenek=="T" && $bir_yari_toplamskortekcift=="tek") { $donen = 2; }
else if($oran_tip=="1.Yarı Toplam Tek/Çift" && $oran_secenek=="Ç" && $bir_yari_toplamskortekcift=="cift") { $donen = 2; }
else if($oran_tip=="1.Yarı Toplam Tek/Çift" && $oran_secenek=="Tek" && $bir_yari_toplamskortekcift=="tek") { $donen = 2; }
else if($oran_tip=="1.Yarı Toplam Tek/Çift" && $oran_secenek=="Çift" && $bir_yari_toplamskortekcift=="cift") { $donen = 2; }
## TUTMAYANLARI KAYBETTİ YAPMA ELSE'Sİ ##
else { $donen = 3; }
return $donen;

}

function tenis_sonuc($msset,$birinciset,$ikinciset,$ucuncuset,$oranval) {

$msset_bol = explode(" - ",$msset);

$birinciset_bol = explode(" - ",$birinciset);
$ikinciset_bol = explode(" - ",$ikinciset);
$ucuncuset_bol = explode(" - ",$ucuncuset);

$ms_ev = $msset_bol[0];
$ms_dep = $msset_bol[1];

$bir_ev = $birinciset_bol[0];
$bir_dep = $birinciset_bol[1];
$iki_ev = $ikinciset_bol[0];
$iki_dep = $ikinciset_bol[1];
$uc_ev = $ucuncuset_bol[0];
$uc_dep = $ucuncuset_bol[1];

$ms_toplam_ev = $bir_ev+$iki_ev+$uc_ev;
$ms_toplam_konuk = $bir_dep+$iki_dep+$uc_dep;

if($bir_ev>$bir_dep){
	$birset_kazandi_ev = 1;
} else if($iki_ev>$iki_dep){
	$birset_kazandi_ev = 1;
} else if($uc_ev>$uc_dep){
	$birset_kazandi_ev = 1;
} else {
	$birset_kazandi_ev = 0;
}

if($bir_ev<$bir_dep){
	$birset_kazandi_dep = 1;
} else if($iki_ev<$iki_dep){
	$birset_kazandi_dep = 1;
} else if($uc_ev<$uc_dep){
	$birset_kazandi_dep = 1;
} else {
	$birset_kazandi_dep = 0;
}

## Kim Kazanır ? ##
if($oranval==1 && $ms_ev>$ms_dep) { $donen = 2; }
else if($oranval==2 && $ms_ev<$ms_dep) { $donen = 2; }
## Set Bahsi ##
else if($oranval==3 && $ms_ev==2 && $ms_dep==0) { $donen = 2; }
else if($oranval==4 && $ms_ev==2 && $ms_dep==1) { $donen = 2; }
else if($oranval==5 && $ms_ev==1 && $ms_dep==2) { $donen = 2; }
else if($oranval==6 && $ms_ev==0 && $ms_dep==2) { $donen = 2; }
## 1.Seti Kim Kazanır ? ##
else if($oranval==7 && $bir_ev>$bir_dep) { $donen = 2; }
else if($oranval==8 && $bir_ev<$bir_dep) { $donen = 2; }
## 2.Seti Kim Kazanır ? ##
else if($oranval==9 && $iki_ev>$iki_dep) { $donen = 2; }
else if($oranval==10 && $iki_ev<$iki_dep) { $donen = 2; }
## 1.Oyuncu 1 Set Kazanır ##
else if($oranval==11 && $birset_kazandi_ev==1) { $donen = 2; }
else if($oranval==12 && $birset_kazandi_ev==0) { $donen = 2; }
## 2.Oyuncu 1 Set Kazanır ##
else if($oranval==13 && $birset_kazandi_dep==1) { $donen = 2; }
else if($oranval==14 && $birset_kazandi_dep==0) { $donen = 2; }
## TUTMAYANLARI KAYBETTİ YAPMA ELSE'Sİ ##
else { $donen = 3; }
return $donen;

}

function voleybol_sonuc($msver,$birinciset,$ikinciset,$ucuncuset,$dorduncuset,$besinciset,$oranval,$secenekver) {
$macsonucu_bol = explode(" - ",$msver);
$birinciset_bol = explode(" - ",$birinciset);
$ikinciset_bol = explode(" - ",$ikinciset);
$ucuncuset_bol = explode(" - ",$ucuncuset);
$dorduncuset_bol = explode(" - ",$dorduncuset);
$besinciset_bol = explode(" - ",$besinciset);

$mac_sonucu_ev = $macsonucu_bol[0];
$mac_sonucu_dep = $macsonucu_bol[1];

$bir_ev = $birinciset_bol[0];
$bir_dep = $birinciset_bol[1];
$iki_ev = $ikinciset_bol[0];
$iki_dep = $ikinciset_bol[1];
$uc_ev = $ucuncuset_bol[0];
$uc_dep = $ucuncuset_bol[1];
$dort_ev = $dorduncuset_bol[0];
$dort_dep = $dorduncuset_bol[1];
$bes_ev = $besinciset_bol[0];
$bes_dep = $besinciset_bol[1];

$ms_toplam_ev = $bir_ev+$iki_ev+$uc_ev+$dort_ev+$bes_ev;
$ms_toplam_konuk = $bir_dep+$iki_dep+$uc_dep+$dort_dep+$bes_dep;
$toplam_skor_ver = $ms_toplam_ev+$ms_toplam_konuk;

$doneceksecenek = substr($secenekver,0,-2);
$donusensecenek = "".$doneceksecenek.".5";

## KİM KAZANIR ? ##
if($oranval==1 && $mac_sonucu_ev>$mac_sonucu_dep) { $donen = 2; }
else if($oranval==2 && $mac_sonucu_ev<$mac_sonucu_dep) { $donen = 2; }
## Set Bahsi ##
else if($oranval==3 && $dort_ev+$dort_dep==0 && $bes_ev+$bes_dep==0) { $donen = 2; }
else if($oranval==4 && $bes_ev+$bes_dep==0) { $donen = 2; }
else if($oranval==5 && $bes_ev+$bes_dep>0) { $donen = 2; }
## Toplam Alt/Üst ##
else if($oranval==6 && $toplam_skor_ver>$donusensecenek) { $donen = 2; }
else if($oranval==7 && $toplam_skor_ver<$donusensecenek) { $donen = 2; }
## Müsabaka 5 set sürer mi? ##
else if($oranval==8 && $bes_ev+$bes_dep>0) { $donen = 2; }
else if($oranval==9 && $bes_ev+$bes_dep==0) { $donen = 2; }
## TUTMAYANLARI KAYBETTİ YAPMA ELSE'Sİ ##
else { $donen = 3; }
return $donen;

}

function buzhokeyi_sonuc($birinciset,$ikinciset,$ucuncuset,$oranval) {
$birinciset_bol = explode(" - ",$birinciset);
$ikinciset_bol = explode(" - ",$ikinciset);
$ucuncuset_bol = explode(" - ",$ucuncuset);

$bir_ev = $birinciset_bol[0];
$bir_dep = $birinciset_bol[1];
$iki_ev = $ikinciset_bol[0];
$iki_dep = $ikinciset_bol[1];
$uc_ev = $ucuncuset_bol[0];
$uc_dep = $ucuncuset_bol[1];

$ms_toplam_ev = $bir_ev+$iki_ev+$uc_ev;
$ms_toplam_konuk = $bir_dep+$iki_dep+$uc_dep;
$toplam_skor_ver = $ms_toplam_ev+$ms_toplam_konuk;

## 1X2 ##
if($oranval==1 && $ms_toplam_ev>$ms_toplam_konuk) { $donen = 2; }
else if($oranval==2 && $ms_toplam_ev==$ms_toplam_konuk) { $donen = 2; }
else if($oranval==3 && $ms_toplam_ev<$ms_toplam_konuk) { $donen = 2; }
## 1.P 1X2 ##
else if($oranval==4 && $bir_ev>$bir_dep) { $donen = 2; }
else if($oranval==5 && $bir_ev==$bir_dep) { $donen = 2; }
else if($oranval==6 && $bir_ev<$bir_dep) { $donen = 2; }
## 2.P 1X2 ##
else if($oranval==7 && $iki_ev>$iki_dep) { $donen = 2; }
else if($oranval==8 && $iki_ev==$iki_dep) { $donen = 2; }
else if($oranval==9 && $iki_ev<$iki_dep) { $donen = 2; }
## 3.P 1X2 ##
else if($oranval==10 && $uc_ev>$uc_dep) { $donen = 2; }
else if($oranval==11 && $uc_ev==$uc_dep) { $donen = 2; }
else if($oranval==12 && $uc_ev<$uc_dep) { $donen = 2; }
## Çifte Şans ##
else if($oranval==13 && ($ms_toplam_ev>$ms_toplam_konuk || $ms_toplam_ev==$ms_toplam_konuk)) { $donen = 2; }
else if($oranval==14 && ($ms_toplam_ev==$ms_toplam_konuk || $ms_toplam_ev<$ms_toplam_konuk)) { $donen = 2; }
else if($oranval==15 && ($ms_toplam_ev<$ms_toplam_konuk || $ms_toplam_ev>$ms_toplam_konuk)) { $donen = 2; }
## 1.P Çifte Şans ##
else if($oranval==16 && ($bir_ev>$bir_dep || $bir_ev==$bir_dep)) { $donen = 2; }
else if($oranval==17 && ($bir_ev==$bir_dep || $bir_ev<$bir_dep)) { $donen = 2; }
else if($oranval==18 && ($bir_ev<$bir_dep || $bir_ev>$bir_dep)) { $donen = 2; }
## 2.P Çifte Şans ##
else if($oranval==19 && ($iki_ev>$iki_dep || $iki_ev==$iki_dep)) { $donen = 2; }
else if($oranval==20 && ($iki_ev==$iki_dep || $iki_ev<$iki_dep)) { $donen = 2; }
else if($oranval==21 && ($iki_ev<$iki_dep || $iki_ev>$iki_dep)) { $donen = 2; }
## 3.P Çifte Şans ##
else if($oranval==22 && ($uc_ev>$uc_dep || $uc_ev==$uc_dep)) { $donen = 2; }
else if($oranval==23 && ($uc_ev==$uc_dep || $uc_ev<$uc_dep)) { $donen = 2; }
else if($oranval==24 && ($uc_ev<$uc_dep || $uc_ev>$uc_dep)) { $donen = 2; }
## TUTMAYANLARI KAYBETTİ YAPMA ELSE'Sİ ##
else { $donen = 3; }
return $donen;

}

function masatenisi_sonuc($msset,$oranval) {
$msset_bol = explode(" - ",$msset);
$mac_sonucu_ev = $msset_bol[0];
$mac_sonucu_dep = $msset_bol[1];

## 1X2 ##
if($oranval==1 && $mac_sonucu_ev>$mac_sonucu_dep) { $donen = 2; }
else if($oranval==2 && $mac_sonucu_ev<$mac_sonucu_dep) { $donen = 2; }
## TUTMAYANLARI KAYBETTİ YAPMA ELSE'Sİ ##
else { $donen = 3; }
return $donen;

}

function beyzbol_sonuc($msset,$oranval) {
$msset_bol = explode(" - ",$msset);
$mac_sonucu_ev = $msset_bol[0];
$mac_sonucu_dep = $msset_bol[1];

## 1X2 ##
if($oranval==1 && $mac_sonucu_ev>$mac_sonucu_dep) { $donen = 2; }
else if($oranval==2 && $mac_sonucu_ev<$mac_sonucu_dep) { $donen = 2; }
## TUTMAYANLARI KAYBETTİ YAPMA ELSE'Sİ ##
else { $donen = 3; }
return $donen;

}

function rugby_sonuc($msset,$oranval) {
$msset_bol = explode(" - ",$msset);
$mac_sonucu_ev = $msset_bol[0];
$mac_sonucu_dep = $msset_bol[1];

## 1X2 ##
if($oranval==1 && $mac_sonucu_ev>$mac_sonucu_dep) { $donen = 2; }
else if($oranval==2 && $mac_sonucu_ev==$mac_sonucu_dep) { $donen = 2; }
else if($oranval==3 && $mac_sonucu_ev<$mac_sonucu_dep) { $donen = 2; }
## TUTMAYANLARI KAYBETTİ YAPMA ELSE'Sİ ##
else { $donen = 3; }
return $donen;

}

function dovus_sonuc($msset,$oranval) {
$msset_bol = explode(" - ",$msset);
$mac_sonucu_ev = $msset_bol[0];
$mac_sonucu_dep = $msset_bol[1];

## 1X2 ##
if($oranval==1 && $mac_sonucu_ev>$mac_sonucu_dep) { $donen = 2; }
else if($oranval==2 && $mac_sonucu_ev==$mac_sonucu_dep) { $donen = 2; }
else if($oranval==3 && $mac_sonucu_ev<$mac_sonucu_dep) { $donen = 2; }
## TUTMAYANLARI KAYBETTİ YAPMA ELSE'Sİ ##
else { $donen = 3; }
return $donen;

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

if($_GET['cmd']=="sonucla"){

$kupondokumnormal_futbol = sed_sql_query("select kupon_id,sari_kart,kirmizi_kart,korner,penalti,iy,ms,oran_val_id,id from kupon_ic where spor_tip='futbol' and kazanma='1' and iy!='' and ms!='' limit 1000");
echo sed_sql_numrows($kupondokumnormal_futbol). " Tane Kupon Sonuçlandırılıyor... ( FUTBOL İÇİN ) <br><br>";
while($row_futbol=sed_sql_fetcharray($kupondokumnormal_futbol)) {
echo "$row_futbol[kupon_id] İd'li Kupon Sonuçlandı.<br>";
flush();
if(!empty($row_futbol['iy']) && !empty($row_futbol['ms'])) {
$sonucgetir_futbol = futbol_sonuc($row_futbol['sari_kart'],$row_futbol['kirmizi_kart'],$row_futbol['korner'],$row_futbol['penalti'],$row_futbol['iy'],$row_futbol['ms'],$row_futbol['oran_val_id']);
sed_sql_query("update kupon_ic set kazanma='$sonucgetir_futbol' where id='$row_futbol[id]'");
}
echo "<br>";
}

$kupondokumnormal_basketbol = sed_sql_query("select iy,ms,kupon_id,birperiod,ikiperiod,ucperiod,dortperiod,besperiod,oran_tip,oran_val,id from kupon_ic where spor_tip='basketbol' and kazanma='1' and iy!='' and ms!='' limit 1000");
echo sed_sql_numrows($kupondokumnormal_basketbol). " Tane Kupon Sonuçlandırılıyor... ( BASKETBOL İÇİN ) <br><br>";
while($row_basketbol=sed_sql_fetcharray($kupondokumnormal_basketbol)) {
echo "$row_basketbol[kupon_id] İd'li Kupon Sonuçlandı.<br>";
flush();
if(!empty($row_basketbol['iy']) && !empty($row_basketbol['ms'])) {
$sonucgetir_basketbol = basketbol_sonuc($row_basketbol['birperiod'],$row_basketbol['ikiperiod'],$row_basketbol['ucperiod'],$row_basketbol['dortperiod'],$row_basketbol['besperiod'],$row_basketbol['oran_tip'],$row_basketbol['oran_val']);
sed_sql_query("update kupon_ic set kazanma='$sonucgetir_basketbol' where id='$row_basketbol[id]'");
}
echo "<br>";
}

$kupondokumnormal_tenis = sed_sql_query("select ms,kupon_id,birperiod,ikiperiod,ucperiod,oran_val_id,id from kupon_ic where spor_tip='tenis' and kazanma='1' and ms!='' limit 1000");
echo sed_sql_numrows($kupondokumnormal_tenis). " Tane Kupon Sonuçlandırılıyor... ( TENİS İÇİN ) <br><br>";
while($row_tenis=sed_sql_fetcharray($kupondokumnormal_tenis)) {
echo "$row_tenis[kupon_id] İd'li Kupon Sonuçlandı.<br>";
flush();
if(!empty($row_tenis['ms'])) {
$sonucgetir_tenis = tenis_sonuc($row_tenis['ms'],$row_tenis['birperiod'],$row_tenis['ikiperiod'],$row_tenis['ucperiod'],$row_tenis['oran_val_id']);
sed_sql_query("update kupon_ic set kazanma='$sonucgetir_tenis' where id='$row_tenis[id]'");
}
echo "<br>";
}
-
$kupondokumnormal_voleybol = sed_sql_query("select ms,kupon_id,birperiod,ikiperiod,ucperiod,dortperiod,besperiod,oran_val_id,oran_val,id from kupon_ic where spor_tip='voleybol' and kazanma='1' and ms!='' limit 1000");
echo sed_sql_numrows($kupondokumnormal_voleybol). " Tane Kupon Sonuçlandırılıyor... ( VOLEYBOL İÇİN ) <br><br>";
while($row_voleybol=sed_sql_fetcharray($kupondokumnormal_voleybol)) {
echo "$row_voleybol[kupon_id] İd'li Kupon Sonuçlandı.<br>";
flush();
if(!empty($row_voleybol['ms'])) {
$sonucgetir_voleybol = voleybol_sonuc($row_voleybol['ms'],$row_voleybol['birperiod'],$row_voleybol['ikiperiod'],$row_voleybol['ucperiod'],$row_voleybol['dortperiod'],$row_voleybol['besperiod'],$row_voleybol['oran_val_id'],$row_voleybol['oran_val']);
sed_sql_query("update kupon_ic set kazanma='$sonucgetir_voleybol' where id='$row_voleybol[id]'");
}
echo "<br>";
}

$kupondokumnormal_buzhokeyi = sed_sql_query("select ms,kupon_id,birperiod,ikiperiod,ucperiod,oran_val_id,id from kupon_ic where spor_tip='buzhokeyi' and kazanma='1' and ms!='' limit 1000");
echo sed_sql_numrows($kupondokumnormal_buzhokeyi). " Tane Kupon Sonuçlandırılıyor... ( BUZHOKEYİ İÇİN ) <br><br>";
while($row_buzhokeyi=sed_sql_fetcharray($kupondokumnormal_buzhokeyi)) {
echo "$row_buzhokeyi[kupon_id] İd'li Kupon Sonuçlandı.<br>";
flush();
if(!empty($row_buzhokeyi['ms'])) {
$sonucgetir_buzhokeyi = buzhokeyi_sonuc($row_buzhokeyi['birperiod'],$row_buzhokeyi['ikiperiod'],$row_buzhokeyi['ucperiod'],$row_buzhokeyi['oran_val_id']);
sed_sql_query("update kupon_ic set kazanma='$sonucgetir_buzhokeyi' where id='$row_buzhokeyi[id]'");
}
echo "<br>";
}

$kupondokumnormal_masatenisi = sed_sql_query("select ms,kupon_id,oran_val_id,id from kupon_ic where spor_tip='masatenisi' and kazanma='1' and ms!='' limit 1000");
echo sed_sql_numrows($kupondokumnormal_masatenisi). " Tane Kupon Sonuçlandırılıyor... ( MASA TENİSİ İÇİN ) <br><br>";
while($row_masatenisi=sed_sql_fetcharray($kupondokumnormal_masatenisi)) {
echo "$row_masatenisi[kupon_id] İd'li Kupon Sonuçlandı.<br>";
flush();
if(!empty($row_masatenisi['ms'])) {
$sonucgetir_masatenisi = masatenisi_sonuc($row_masatenisi['ms'],$row_masatenisi['oran_val_id']);
sed_sql_query("update kupon_ic set kazanma='$sonucgetir_masatenisi' where id='$row_masatenisi[id]'");
}
echo "<br>";
}

$kupondokumnormal_beyzbol = sed_sql_query("select ms,kupon_id,oran_val_id,id from kupon_ic where spor_tip='beyzbol' and kazanma='1' and ms!='' limit 1000");
echo sed_sql_numrows($kupondokumnormal_beyzbol). " Tane Kupon Sonuçlandırılıyor... ( BEYZBOL İÇİN ) <br><br>";
while($row_beyzbol=sed_sql_fetcharray($kupondokumnormal_beyzbol)) {
echo "$row_beyzbol[kupon_id] İd'li Kupon Sonuçlandı.<br>";
flush();
if(!empty($row_beyzbol['ms'])) {
$sonucgetir_beyzbol = beyzbol_sonuc($row_beyzbol['ms'],$row_beyzbol['oran_val_id']);
sed_sql_query("update kupon_ic set kazanma='$sonucgetir_beyzbol' where id='$row_beyzbol[id]'");
}
echo "<br>";
}

$kupondokumnormal_rugby = sed_sql_query("select ms,kupon_id,oran_val_id,id from kupon_ic where spor_tip='rugby' and kazanma='1' and ms!='' limit 1000");
echo sed_sql_numrows($kupondokumnormal_rugby). " Tane Kupon Sonuçlandırılıyor... ( RUGBY İÇİN ) <br><br>";
while($row_rugby=sed_sql_fetcharray($kupondokumnormal_rugby)) {
echo "$row_rugby[kupon_id] İd'li Kupon Sonuçlandı.<br>";
flush();
if(!empty($row_rugby['ms'])) {
$sonucgetir_rugby = rugby_sonuc($row_rugby['ms'],$row_rugby['oran_val_id']);
sed_sql_query("update kupon_ic set kazanma='$sonucgetir_rugby' where id='$row_rugby[id]'");
}
echo "<br>";
}

$kupondokumnormal_dovus = sed_sql_query("select ms,kupon_id,oran_val_id,id from kupon_ic where spor_tip='dovus' and kazanma='1' and ms!='' limit 1000");
echo sed_sql_numrows($kupondokumnormal_dovus). " Tane Kupon Sonuçlandırılıyor... ( MMA İÇİN ) <br><br>";
while($row_dovus=sed_sql_fetcharray($kupondokumnormal_dovus)) {
echo "$row_dovus[kupon_id] İd'li Kupon Sonuçlandı.<br>";
flush();
if(!empty($row_dovus['ms'])) {
$sonucgetir_dovus = dovus_sonuc($row_dovus['ms'],$row_dovus['oran_val_id']);
sed_sql_query("update kupon_ic set kazanma='$sonucgetir_dovus' where id='$row_dovus[id]'");
}
echo "<br>";
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