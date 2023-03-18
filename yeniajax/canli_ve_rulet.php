<?PHP
include "../jobs/singledb.php";
/*$linkmysql = mysql_connect($dbhost,$dbuser,$dbpass);
mysql_select_db($dbname);
sed_sql_query("SET NAMES 'UTF8'");
sed_sql_query("SET character_set_connection = 'UTF8'");
sed_sql_query("SET character_set_client = 'UTF8'");
sed_sql_query("SET character_set_results = 'UTF8'");*/

function bilgi($str) { 
if(strstr($str,'limit')) {
$bilgi = sed_sql_fetchassoc(sed_sql_query($str)); 
} else {
$bilgi = sed_sql_fetchassoc(sed_sql_query("".$str." limit 1")); 
}
return $bilgi; 
}

function nf($str) { return number_format($str,2,".","."); }

function LiveTRHatalari($msg = 0){
$r = array("&","'");
$rp = array(" "," ");
return str_replace($r,$rp,$msg);
}

function curlfonksiyon($adres){
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$adres);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
return  curl_exec($ch);
curl_close($ch);
}

function farray($query){ $sql =  sed_sql_fetcharray(sed_sql_query($query)); return $sql; }

############## CANLI FUTBOL ################

$js = curlfonksiyon("https://betwingo.xyz/api/canli_bilgiler.php?tip=futbol");

$jsonGet = json_decode($js);
foreach($jsonGet->veriler as $inner){

$corners_ev = 0;
$corners_dep = 0;
$kirmizikart_ev = 0;
$kirmizikart_dep = 0;
$sarikart_ev = 0;
$sarikart_dep = 0;
$penalti_ev = 0;
$penalti_dep = 0;
$ev_skor = 0;
$dep_skor = 0;
$oran1_1x2 = 0;
$oran2_1x2 = 0;
$oran3_1x2 = 0;
$oran_05alt = 0;
$oran_05ust = 0;
$oran_15alt = 0;
$oran_15ust = 0;
$oran_25alt = 0;
$oran_25ust = 0;
$oran_35alt = 0;
$oran_35ust = 0;
$oran_45alt = 0;
$oran_45ust = 0;
$oran_55alt = 0;
$oran_55ust = 0;
$orankg_var = 0;
$orankg_yok = 0;
$oran1_1x2_gosterim = 0;
$oran2_1x2_gosterim = 0;
$oran3_1x2_gosterim = 0;
$oran_05alt_gosterim = 0;
$oran_05ust_gosterim = 0;
$oran_15alt_gosterim = 0;
$oran_15ust_gosterim = 0;
$oran_25alt_gosterim = 0;
$oran_25ust_gosterim = 0;
$oran_35alt_gosterim = 0;
$oran_35ust_gosterim = 0;
$oran_45alt_gosterim = 0;
$oran_45ust_gosterim = 0;
$oran_55alt_gosterim = 0;
$oran_55ust_gosterim = 0;
$orankg_yok_gosterim = 0;
$orankg_var_gosterim = 0;
$oran1x2_tamamen_visible = 0;
$oran1x2_tamamen_visible2 = 0;
$oran1x2_tamamen_visible3 = 0;
$oran_05altust_tamamen_visible = 0;
$oran_15altust_tamamen_visible = 0;
$oran_25altust_tamamen_visible = 0;
$oran_35altust_tamamen_visible = 0;
$oran_45altust_tamamen_visible = 0;
$oran_55altust_tamamen_visible = 0;
$orankg_tamamen_visible = 0;
$orankg_tamamen_visible1 = 0;

$oran1x2_gosterim_ver = 0;
$oran_05altust_tamamen_visible_ver = 0;
$oran_15altust_tamamen_visible_ver = 0;
$oran_25altust_tamamen_visible_ver = 0;
$oran_35altust_tamamen_visible_ver = 0;
$oran_45altust_tamamen_visible_ver = 0;
$oran_55altust_tamamen_visible_ver = 0;
$karsilikligol_gosterim_ver = 0;
$iy_ev_skor = 0;
$iy_konuk_skor = 0;
$durum_nedir = "false";

$eventid = $inner->eventid;
$corners_ev = $inner->korner_ev;
$corners_dep = $inner->korner_konuk;
$kirmizikart_ev = $inner->kirmizi_ev;
$kirmizikart_dep = $inner->kirmizi_konuk;
$sarikart_ev = $inner->sari_ev;
$sarikart_dep = $inner->sari_konuk;
$penalti_ev = $inner->penalti_ev;
$penalti_dep = $inner->penalti_konuk;
$ev_skor = $inner->ev_skor;
$dep_skor = $inner->konuk_skor;
$iy_ev_skor = $inner->iy_ev;
$iy_konuk_skor = $inner->iy_konuk;
$betradar = $inner->betradar_id;
$matchSimulationId = $inner->simulation;
$ulke_ver = $inner->ulke;
$ulkeid = $inner->ulkeid;
$lig = $inner->lig_adi;
$lig_ver = str_replace("'",'',$lig);
$ligid = $inner->lig_id;
$devre = $inner->devre;
$aktif = $inner->aktif;
$devremi = $inner->devremi;
$dakikayi_ver_hadi = $inner->dakika;
$seconds_getir = $inner->saniye;
$ev_takim_ver = $inner->ev_takim;
$dep_takim_ver = $inner->konuk_takim;
$tarihsaat2 = $inner->baslamasaat;
$tarihsaat = $inner->baslamasaat2;
$oran1_1x2 = $inner->ev_oran;
$oran2_1x2 = $inner->berabere_oran;
$oran3_1x2 = $inner->konuk_oran;
$oran_05alt = $inner->alt05;
$oran_05ust = $inner->ust05;
$oran_15alt = $inner->alt15;
$oran_15ust = $inner->ust15;
$oran_25alt = $inner->alt25;
$oran_25ust = $inner->ust25;
$oran_35alt = $inner->alt35;
$oran_35ust = $inner->ust35;
$oran_45alt = $inner->alt45;
$oran_45ust = $inner->ust45;
$oran_55alt = $inner->alt55;
$oran_55ust = $inner->ust55;
$oran_05altust_tamamen_visible_ver = $inner->altustgol05;
$oran_15altust_tamamen_visible_ver = $inner->altustgol15;
$oran_25altust_tamamen_visible_ver = $inner->altustgol25;
$oran_35altust_tamamen_visible_ver = $inner->altustgol35;
$oran_45altust_tamamen_visible_ver = $inner->altustgol45;
$oran_55altust_tamamen_visible_ver = $inner->altustgol55;
$orankg_yok = $inner->kgyok;
$orankg_var = $inner->kgvar;

if($ulke_ver=="Kore (Güney)"){
	$ulke = "Kore Güney";
} else {
	$ulke = $ulke_ver;
}

$orankg_yok = $inner->kgyok;
$orankg_var = $inner->kgvar;

$ulke_ve_lig = "".$ulke." - ".$lig."";
if(
strpos($ulke_ve_lig,"Almanya - Hessenliga")===false
&& strpos($ulke_ve_lig,"Almanya - Yerel Lig kuzey")===false
&& strpos($ulke_ve_lig,"Almanya - Yerel Lig batı")===false
&& strpos($ulke_ve_lig,"Almanya - Bundesliga Bayanlar")===false
&& strpos($ulke_ve_lig,"Almanya - Oberliga NOFV Nord")===false
&& strpos($ulke_ve_lig,"Almanya - Schleswig Holstein Liga")===false
&& strpos($ulke_ve_lig,"Almanya - Regionalliga Bayern")===false
&& strpos($ulke_ve_lig,"İngiltere - National League South")===false
&& strpos($ulke_ve_lig,"İngiltere - National League North")===false
&& strpos($ulke_ve_lig,"İngiltere - FA Cup - Build a Bet Price Boosts")===false
&& strpos($ulke_ve_lig,"İngiltere - Premier League 2 - Division 2")===false
&& strpos($ulke_ve_lig,"İngiltere - Premier League 2 - Division 1")===false
&& strpos($ulke_ve_lig,"İngiltere - Southern League Premier - Central")===false
&& strpos($ulke_ve_lig,"İngiltere - Ryman Isthmian Premier Division")===false
&& strpos($ulke_ve_lig,"İngiltere - Southern League Premier - South")===false
&& strpos($ulke_ve_lig,"İngiltere - Northern Premier")===false
&& strpos($ulke_ve_lig,"İspanya - Tercera Division - 6. Grup")===false
&& strpos($ulke_ve_lig,"İspanya - Segunda B 4. Grup")===false
&& strpos($ulke_ve_lig,"İspanya - Segunda B 1. Grup")===false
&& strpos($ulke_ve_lig,"İspanya - Segunda B 2. Grup")===false
&& strpos($ulke_ve_lig,"İspanya - Segunda B 3. Grup")===false
&& strpos($ulke_ve_lig,"İspanya - Tercera Division - 1. Grup")===false
&& strpos($ulke_ve_lig,"İspanya - Tercera Division - 2. Grup")===false
&& strpos($ulke_ve_lig,"İspanya - Tercera Division - 3. Grup")===false
&& strpos($ulke_ve_lig,"İspanya - Tercera Division - 4. Grup")===false
&& strpos($ulke_ve_lig,"İspanya - Tercera Division - 5. Grup")===false
&& strpos($ulke_ve_lig,"İspanya - Tercera Division - 6. Grup")===false
&& strpos($ulke_ve_lig,"İspanya - Tercera Division - 7. Grup")===false
&& strpos($ulke_ve_lig,"İspanya - Tercera Division - 8. Grup")===false
&& strpos($ulke_ve_lig,"İspanya - Tercera Division - 9. Grup")===false
&& strpos($ulke_ve_lig,"İspanya - Tercera Division - 10. Grup")===false
&& strpos($ulke_ve_lig,"İspanya - Tercera Division - 11. Grup")===false
&& strpos($ulke_ve_lig,"İspanya - Tercera Division - 12. Grup")===false
&& strpos($ulke_ve_lig,"İspanya - Tercera Division - 13. Grup")===false
&& strpos($ulke_ve_lig,"İspanya - Tercera Division - 14. Grup")===false
&& strpos($ulke_ve_lig,"İspanya - Tercera Division - 15. Grup")===false
&& strpos($ulke_ve_lig,"İspanya - Tercera Division - 16. Grup")===false
&& strpos($ulke_ve_lig,"İspanya - Tercera Division - 17. Grup")===false
&& strpos($ulke_ve_lig,"İspanya - Tercera Division - 18. Grup")===false
&& strpos($ulke_ve_lig,"İspanya - Tercera Division - 19. Grup")===false
&& strpos($ulke_ve_lig,"İspanya - Tercera Division - 20. Grup")===false
&& strpos($ulke_ve_lig,"İspanya - Segunda Division Feminina")===false
&& strpos($ulke_ve_lig,"İspanya - Division de Honor U19")===false
&& strpos($ulke_ve_lig,"İtalya - Serie C - Girone A")===false
&& strpos($ulke_ve_lig,"İtalya - Serie C - Girone B")===false
&& strpos($ulke_ve_lig,"İtalya - Serie C - Girone C")===false
&& strpos($ulke_ve_lig,"Hollanda - Eredivisie Women")===false
&& strpos($ulke_ve_lig,"Belçika - Super League - Women")===false
&& strpos($ulke_ve_lig,"Portekiz - Campeonato Nacional")===false
&& strpos($ulke_ve_lig,"Portekiz - Campeonato Nacional U23")===false
&& strpos($ulke_ve_lig,"Danimarka - 2nd Division Pulje 2")===false
&& strpos($ulke_ve_lig,"Danimarka - 2nd Division Pulje 1")===false
&& strpos($ulke_ve_lig,"Danimarka - Danmarksserien - 2. Grup")===false
&& strpos($ulke_ve_lig,"Danimarka - Danmarksserien - Pulje 4")===false
&& strpos($ulke_ve_lig,"Çek Cumhuriyeti - U19 1st Division")===false
&& strpos($ulke_ve_lig,"Çek Cumhuriyeti - Ceska Fotbalova Liga")===false
&& strpos($ulke_ve_lig,"Almanya - Bayernliga Nord")===false
&& strpos($ulke_ve_lig,"Almanya - Oberliga Rheinland-Pfalz/Saar")===false
&& strpos($ulke_ve_lig,"Almanya - Oberliga Hamburg")===false
&& strpos($ulke_ve_lig,"Almanya - Oberliga Westfalen")===false
&& strpos($ulke_ve_lig,"Almanya - Oberliga NOFV Süd")===false
&& strpos($ulke_ve_lig,"Almanya - Oberliga Baden-Württemberg")===false
&& strpos($ulke_ve_lig,"Romanya - LIGA III - Group 1")===false
&& strpos($ulke_ve_lig,"Romanya - LIGA III - Group 2")===false
&& strpos($ulke_ve_lig,"Romanya - Liga III - Group 3")===false
&& strpos($ulke_ve_lig,"Romanya - Liga III - Group 4")===false
&& strpos($ulke_ve_lig,"Romanya - Liga III - Group 5")===false
&& strpos($ulke_ve_lig,"Almanya - Bayernliga Süd")===false
&& strpos($ulke_ve_lig,"Almanya - A-Junioren Bundesliga Nord/Nordost")===false
&& strpos($ulke_ve_lig,"Almanya - A-Junioren Bundesliga West")===false
&& strpos($ulke_ve_lig,"Almanya - A-Junioren Bundesliga Süd/Südwest")===false
&& strpos($ulke_ve_lig,"Almanya - Oberliga Niedersachsen")===false
&& strpos($ulke_ve_lig,"Avusturya - Regionalliga Salzburg")===false
&& strpos($ulke_ve_lig,"Avusturya - Yerel Lig doğu")===false
&& strpos($ulke_ve_lig,"Avusturya - Yerel Lig Orta")===false
&& strpos($ulke_ve_lig,"Dünya - Süper Oran")===false
&& strpos($ulke_ve_lig,"İngiltere - Community Shield - Build a Bet Price Boosts")===false
&& strpos($ulke_ve_lig,"Avrupa - Women’s European Championship Qualification")===false
&& strpos($ulke_ve_lig,"İran - Iran Pro League")===false
&& strpos($ulke_ve_lig,"Kıbrıs Rum Kesimi - 1. Division")===false
&& strpos($ulke_ve_lig,"İngiltere - England National League")===false
&& strpos($ulke_ve_lig,"İsrail - Israel Premier League")===false
&& strpos($ulke_ve_lig,"İran - Pro League")===false
&& strpos($ulke_ve_lig,"İngiltere - National League")===false
&& strpos($ulke_ve_lig,"İsrail - Premier League")===false
&& strpos($ulke_ve_lig,"Almanya - Bölgesel Ligi, Kuzey")===false
&& strpos($ulke_ve_lig,"Almanya - Bölgesel Ligi Kuzeydoğu")===false
&& strpos($ulke_ve_lig,"Almanya - Bölgesel Ligi Bavaria")===false
&& strpos($ulke_ve_lig,"Almanya - Landespokal Berlin")===false
&& strpos($ulke_ve_lig,"Almanya - Bayernliga Kuzey")===false
&& strpos($ulke_ve_lig,"Almanya - Bayernliga Güney")===false
&& strpos($ulke_ve_lig,"Almanya - Bayernliga  Kuzey")===false
&& strpos($ulke_ve_lig,"Almanya - Bayernliga  Güney")===false
&& strpos($ulke_ve_lig,"İngiltere - Northern Division One East")===false
&& strpos($ulke_ve_lig,"İngiltere - Northern Division One West")===false
&& strpos($ulke_ve_lig,"İngiltere - Southern Division One Central")===false
&& strpos($ulke_ve_lig,"İngiltere - Southern Division One South")===false
&& strpos($ulke_ve_lig,"İngiltere - Southern Football League, Premier Division South")===false
&& strpos($ulke_ve_lig,"İngiltere - Southern Football League,Premier Division Central")===false
&& strpos($ulke_ve_lig,"Polonya - Iii Liga, Group 1")===false
&& strpos($ulke_ve_lig,"Polonya - Iii Liga, Group 2")===false
&& strpos($ulke_ve_lig,"Polonya - Iii Liga, Group 3")===false
&& strpos($ulke_ve_lig,"Polonya - Iii Liga, Group 4")===false
&& strpos($ulke_ve_lig,"Avusturya - Eliteliga Vorarlberg")===false
&& strpos($ulke_ve_lig,"Avusturya - Regionalliga Tirol")===false
&& strpos($ulke_ve_lig,"Portekiz - İkinci Lig B")===false
&& strpos($ulke_ve_lig,"Estonya - Esiliiga")===false
&& strpos($ulke_ve_lig,"İzlanda - Urvalsdeild, Kadınlar")===false
&& strpos($ulke_ve_lig,"Meksika - U20 Ligi")===false
&& strpos($ulke_ve_lig,"Meksika - Liga De Expansion MX, Apertura")===false
&& strpos($ulke_ve_lig,"Avustralya - South Australia State League 1")===false
&& strpos($ulke_ve_lig,"Paraguay - Primera Division, Clausura")===false
&& strpos($ulke_ve_lig,"İskoçya - Lowland League")===false
&& strpos($ulke_ve_lig,"Norveç - 3rd Division Group 1")===false
&& strpos($ulke_ve_lig,"Norveç - 3rd Division Group 2")===false
&& strpos($ulke_ve_lig,"Norveç - 3rd Division Group 3")===false
&& strpos($ulke_ve_lig,"Norveç - 3rd Division Group 4")===false
&& strpos($ulke_ve_lig,"Norveç - 2. Lig Grup 2")===false
&& strpos($ulke_ve_lig,"Faroe Adaları - 1. Deild")===false
&& strpos($ulke_ve_lig,"Dünya - Özel Maçlar")===false
&& strpos($ulke_ve_lig,"Uganda - FUFA Big League")===false
&& strpos($ulke_ve_lig,"Malezya - Süper Lig")===false
&& strpos($ulke_ve_lig,"Uruguay - Primera Division Reserve League")===false
&& strpos($ulke_ve_lig,"Arjantin - Primera B Reserves")===false
&& strpos($ulke_ve_lig,"Cezayir - Lig 1")===false
&& strpos($ulke_ve_lig,"Bangladeş - Premier Lig")===false
&& strpos($ulke_ve_lig,"Bolivya - Division Profesional")===false
&& strpos($ulke_ve_lig,"Güney Afrika - Premier League")===false
&& strpos($ulke_ve_lig,"Lüksemburg - Ulusal Lig")===false
&& strpos($ulke_ve_lig,"Danimarka - Danmarksserien, Pulje 4")===false
&& strpos($ulke_ve_lig,"İsveç - 2nd Division NG")===false
){

if($devre != "Başlamadı" && $ev_takim_ver != "" && $dep_takim_ver != ""){

$farray = farray("SELECT * FROM canli_maclar where eventid = '".$eventid."'");

if($farray['id'] < 1){

sed_sql_query("INSERT INTO canli_maclar SET
ev_takim='".$ev_takim_ver."',
konuk_takim='".$dep_takim_ver."',
ev_skor='".$ev_skor."',
konuk_skor='".$dep_skor."',
dakika='".$dakikayi_ver_hadi."',
devre='".$devre."',
eventid='".$eventid."',
betradar_id='".$betradar."',
simulation='".$matchSimulationId."',
songuncelleme='".time()."',
gelecek='0',
saniye='".$seconds_getir."',
baslamasaat='".$tarihsaat2."',
baslamasaat2='".$tarihsaat."',
ulke='".$ulke."',
ulkeid='".$ulkeid."',
lig_adi='".$lig_ver."',
lig_id='".$ligid."',
korner_ev='".$corners_ev."',
korner_konuk='".$corners_dep."',
kirmizi_ev='".$kirmizikart_ev."',
kirmizi_konuk='".$kirmizikart_dep."',
sari_ev='".$sarikart_ev."',
sari_konuk='".$sarikart_dep."',
penalti_ev='".$penalti_ev."',
penalti_konuk='".$penalti_dep."',
ev_oran='".$oran1_1x2."',
berabere_oran='".$oran2_1x2."',
konuk_oran='".$oran3_1x2."',
alt05='".$oran_05alt."',
ust05='".$oran_05ust."',
alt15='".$oran_15alt."',
ust15='".$oran_15ust."',
alt25='".$oran_25alt."',
ust25='".$oran_25ust."',
alt35='".$oran_35alt."',
ust35='".$oran_35ust."',
alt45='".$oran_45alt."',
ust45='".$oran_45ust."',
alt55='".$oran_55alt."',
ust55='".$oran_55ust."',
altustgol05='".$oran_05altust_tamamen_visible_ver."',
altustgol15='".$oran_15altust_tamamen_visible_ver."',
altustgol25='".$oran_25altust_tamamen_visible_ver."',
altustgol35='".$oran_35altust_tamamen_visible_ver."',
altustgol45='".$oran_45altust_tamamen_visible_ver."',
altustgol55='".$oran_55altust_tamamen_visible_ver."',
kgyok='".$orankg_yok."',
kgvar='".$orankg_var."'");

sed_sql_query("delete from program_futbol where ev_takim='".$ev_takim_ver."' and konuk_takim='".$dep_takim_ver."'");

} else {

$mevcut_ev_skor = $farray['ev_skor'];
$mevcut_konuk_skor = $farray['konuk_skor'];
$yenigol = $ev_skor+$dep_skor;
$bugun_tarihi_bul = date("d.m.Y");
if( (($mevcut_ev_skor!=$ev_skor) || ($mevcut_konuk_skor!=$dep_skor)) && $yenigol!="0") {

if($mevcut_ev_skor!=$ev_skor) { $atantakim = 1; } else if($mevcut_konuk_skor!=$dep_skor) { $atantakim = 2; }

sed_sql_query("UPDATE canli_maclar SET gol='".time()."' WHERE eventid='".$eventid."'");

$golkontrol = farray("SELECT * FROM canli_gol_list where eventid = '".$eventid."' AND golsayi='".$yenigol."'");

if($golkontrol['id'] < 1){

sed_sql_query("INSERT INTO canli_gol_list SET eventid='".$eventid."',dakika='".$dakikayi_ver_hadi."',golsayi='".$yenigol."',atantakim='".$atantakim."',mac_db_id='".$farray['id']."',y_ev_skor='".$ev_skor."',y_konuk_skor='".$dep_skor."',musabaka='".$ev_takim_ver." - ".$dep_takim_ver."',zaman='".$bugun_tarihi_bul."',devre='".$devre."'");

}

}

if($yenigol=="0") {
sed_sql_query("delete from canli_gol_list where mac_db_id='".$farray['id']."' and eventid='".$eventid."' AND golsayi='1'");
sed_sql_query("delete from canli_gol_list where mac_db_id='".$farray['id']."' and eventid='".$eventid."' AND golsayi='2'");
} else if($yenigol=="1") {
sed_sql_query("delete from canli_gol_list where mac_db_id='".$farray['id']."' and eventid='".$eventid."' AND golsayi='2'");
sed_sql_query("delete from canli_gol_list where mac_db_id='".$farray['id']."' and eventid='".$eventid."' AND golsayi='3'");
} else if($yenigol=="2") {
sed_sql_query("delete from canli_gol_list where mac_db_id='".$farray['id']."' and eventid='".$eventid."' AND golsayi='3'");
sed_sql_query("delete from canli_gol_list where mac_db_id='".$farray['id']."' and eventid='".$eventid."' AND golsayi='4'");
} else if($yenigol=="3") {
sed_sql_query("delete from canli_gol_list where mac_db_id='".$farray['id']."' and eventid='".$eventid."' AND golsayi='4'");
sed_sql_query("delete from canli_gol_list where mac_db_id='".$farray['id']."' and eventid='".$eventid."' AND golsayi='5'");
} else if($yenigol=="4") {
sed_sql_query("delete from canli_gol_list where mac_db_id='".$farray['id']."' and eventid='".$eventid."' AND golsayi='5'");
sed_sql_query("delete from canli_gol_list where mac_db_id='".$farray['id']."' and eventid='".$eventid."' AND golsayi='6'");
} else if($yenigol=="5") {
sed_sql_query("delete from canli_gol_list where mac_db_id='".$farray['id']."' and eventid='".$eventid."' AND golsayi='6'");
}

$songol = $farray['gol'];
$suan = time();
$fark = $suan-$songol;

sed_sql_query("UPDATE canli_maclar SET	
ev_skor='".$ev_skor."',
konuk_skor='".$dep_skor."',
iy_ev='".$iy_ev_skor."',
iy_konuk='".$iy_konuk_skor."',
dakika='".$dakikayi_ver_hadi."',
devre='".$devre."',
devremi='".$devremi."',
songuncelleme='".time()."',
gelecek='0',
saniye='".$seconds_getir."',
aktif='".$aktif."',
baslamasaat='".$tarihsaat2."',
baslamasaat2='".$tarihsaat."',
korner_ev='".$corners_ev."',
korner_konuk='".$corners_dep."',
kirmizi_ev='".$kirmizikart_ev."',
kirmizi_konuk='".$kirmizikart_dep."',
sari_ev='".$sarikart_ev."',
sari_konuk='".$sarikart_dep."',
penalti_ev='".$penalti_ev."',
penalti_konuk='".$penalti_dep."',
ev_oran='".$oran1_1x2."',
berabere_oran='".$oran2_1x2."',
konuk_oran='".$oran3_1x2."',
alt05='".$oran_05alt."',
ust05='".$oran_05ust."',
alt15='".$oran_15alt."',
ust15='".$oran_15ust."',
alt25='".$oran_25alt."',
ust25='".$oran_25ust."',
alt35='".$oran_35alt."',
ust35='".$oran_35ust."',
alt45='".$oran_45alt."',
ust45='".$oran_45ust."',
alt55='".$oran_55alt."',
ust55='".$oran_55ust."',
altustgol05='".$oran_05altust_tamamen_visible_ver."',
altustgol15='".$oran_15altust_tamamen_visible_ver."',
altustgol25='".$oran_25altust_tamamen_visible_ver."',
altustgol35='".$oran_35altust_tamamen_visible_ver."',
altustgol45='".$oran_45altust_tamamen_visible_ver."',
altustgol55='".$oran_55altust_tamamen_visible_ver."',
kgyok='".$orankg_yok."',
kgvar='".$orankg_var."'
WHERE eventid='".$eventid."'");

}

}

}

}

$kontrol_yap_bakalim = sed_sql_query("select * from canli_maclar where isibitti='0' and dakika > 89");
while($kontrolrow=sed_sql_fetcharray($kontrol_yap_bakalim)) {

$fark = time()-$kontrolrow["songuncelleme"];

if($kontrolrow["dakika"] > 120 && $kontrolrow["devre"] == "Bitti") {
sed_sql_query("UPDATE canli_maclar SET sonucok='1' WHERE eventid='".$kontrolrow["eventid"]."'");
}

if($fark>20 && $kontrolrow["devre"] == "Bitti") {

sed_sql_query("UPDATE kupon_ic SET sari_kart='".$kontrolrow['sari_ev']." - ".$kontrolrow['sari_konuk']."',kirmizi_kart='".$kontrolrow['kirmizi_ev']." - ".$kontrolrow['kirmizi_konuk']."',korner='".$kontrolrow['korner_ev']." - ".$kontrolrow['korner_konuk']."',penalti='".$kontrolrow['penalti_ev']." - ".$kontrolrow['penalti_konuk']."',iy='".$kontrolrow['iy_ev']." - ".$kontrolrow['iy_konuk']."',ms='".$kontrolrow['ev_skor']." - ".$kontrolrow['konuk_skor']."',sahibe='0' WHERE ev_takim='".$kontrolrow['ev_takim']."' and konuk_takim='".$kontrolrow['konuk_takim']."' and spor_tip='canli' and mac_db_id='".$kontrolrow['id']."'");

sed_sql_query("UPDATE canli_maclar SET devre='Bitti',isibitti='1',sonucok='1' WHERE eventid='".$kontrolrow["eventid"]."'");

echo "<font color ='red'>".$kontrolrow["ev_takim"]." v ".$kontrolrow["konuk_takim"]." maçı sonuçlandırıldı.</font></br>";

}

}

############# CANLI BASKETBOL ####################


$js_basket = curlfonksiyon("https://betwingo.xyz/api/canli_bilgiler.php?tip=basketbol");

$jsonGet_basket = json_decode($js_basket);
foreach($jsonGet_basket->veriler as $inner_basket){

$evskor_basket = 0;
$depskor_basket = 0;
$ev1c_basket = 0;
$dep1c_basket = 0;
$ev2c_basket = 0;
$dep2c_basket = 0;
$ev3c_basket = 0;
$dep3c_basket = 0;
$ev4c_basket = 0;
$dep4c_basket = 0;
$ev5c_basket = 0;
$dep5c_basket = 0;
$oran_kimkazanir_1_basket = "0.00";
$oran_kimkazanir_2_basket = "0.00";
$oran_secenekver_basket = "0";
$oran_ust_basket = "0.00";
$oran_alt_basket = "0.00";
$dakika_basket = "00";

$eventid_basket = $inner_basket->eventid;
$betradar_basket = $inner_basket->betradar_id;
$ev_takim_ver_basket = $inner_basket->ev_takim;
$dep_takim_ver_basket = $inner_basket->konuk_takim;
$ulke_basket = $inner_basket->ulke;
$ulkeid_basket = $inner_basket->ulkeid;
$lig_basket = $inner_basket->lig_adi;

## EV SKORLARI ##
$ev1c_basket = $inner_basket->ev1c;
$ev2c_basket = $inner_basket->ev2c;
$ev3c_basket = $inner_basket->ev3c;
$ev4c_basket = $inner_basket->ev4c;
$ev5c_basket = $inner_basket->ev5c;
## DEP SKORLARI ##
$dep1c_basket = $inner_basket->dep1c;
$dep2c_basket = $inner_basket->dep2c;
$dep3c_basket = $inner_basket->dep3c;
$dep4c_basket = $inner_basket->dep4c;
$dep5c_basket = $inner_basket->dep5c;

$aktif_basket = $inner_basket->aktif;
$dakika_basket = $inner_basket->dakika;
$devre_basket = $inner_basket->period;
$gel_basket = $inner_basket->gelecek;
$tarihsaat_basket = $inner_basket->baslamasaat;
$oran_kimkazanir_1_basket = $inner_basket->ev_oran;
$oran_kimkazanir_2_basket = $inner_basket->konuk_oran;
$oran_secenekver_basket = $inner_basket->altustgol;
$oran_ust_basket = $inner_basket->ust;
$oran_alt_basket = $inner_basket->alt;


if($devre_basket != "Başlamadı" && $ev_takim_ver_basket != "" && $dep_takim_ver_basket != ""){

$farray_basket = farray("SELECT * FROM basketbol_canli_maclar where eventid = '".$eventid_basket."'");

$iy_ev_skoru_basket = $ev1c_basket+$ev2c_basket;
$iy_konuk_skoru_basket = $dep1c_basket+$dep2c_basket;

$ev_skoru_basket = $ev1c_basket+$ev2c_basket+$ev3c_basket+$ev4c_basket;
$konuk_skoru_basket = $dep1c_basket+$dep2c_basket+$dep3c_basket+$dep4c_basket;

$bir_period_skor_basket = "".$ev1c_basket." - ".$dep1c_basket."";
$iki_period_skor_basket = "".$ev2c_basket." - ".$dep2c_basket."";
$uc_period_skor_basket = "".$ev3c_basket." - ".$dep3c_basket."";
$dort_period_skor_basket = "".$ev4c_basket." - ".$dep4c_basket."";

if($ev5c_basket>0){ $ev_5_ver_basket = $ev5c_basket; } else { $ev_5_ver_basket = 0; }
if($dep5c_basket>0){ $dep_5_ver_basket = $dep5c_basket; } else { $dep_5_ver_basket = 0; }

$bes_period_skor_basket = "".$ev_5_ver_basket." - ".$dep_5_ver_basket."";

if($farray_basket['id'] < 1){


sed_sql_query("INSERT INTO basketbol_canli_maclar SET
ev_takim='".$ev_takim_ver_basket."',
konuk_takim='".$dep_takim_ver_basket."',
iy_ev='".$iy_ev_skoru_basket."',
iy_konuk='".$iy_konuk_skoru_basket."',
ev_skor='".$ev_skoru_basket."',
konuk_skor='".$konuk_skoru_basket."',
aktif='".$aktif_basket."',
period='".$devre_basket."',
lig_adi='".$lig_basket."',
ulke='".$ulke_basket."',
ulkeid='".$ulkeid_basket."',
betradar_id='".$betradar_basket."',
eventid='".$eventid_basket."',
songuncelleme='".time()."',
gelecek='".$gel_basket."',
dakika='".$dakika_basket."',
baslamasaat='".$tarihsaat_basket."',
ev_oran='".$oran_kimkazanir_1_basket."',
konuk_oran='".$oran_kimkazanir_2_basket."',
altustgol='".$oran_secenekver_basket."',
ust='".$oran_ust_basket."',
alt='".$oran_alt_basket."'");

sed_sql_query("delete from program_basketbol where ev_takim='".$ev_takim_ver_basket."' and konuk_takim='".$dep_takim_ver_basket."' and kupa_ulke='".$ulke_basket."'");

} else {

sed_sql_query("UPDATE basketbol_canli_maclar SET	
iy_ev='".$iy_ev_skoru_basket."',
iy_konuk='".$iy_konuk_skoru_basket."',
ev_skor='".$ev_skoru_basket."',
konuk_skor='".$konuk_skoru_basket."',
aktif='".$aktif_basket."',
period='".$devre_basket."',
bir_period_skor='".$bir_period_skor_basket."',
iki_period_skor='".$iki_period_skor_basket."',
uc_period_skor='".$uc_period_skor_basket."',
dort_period_skor='".$dort_period_skor_basket."',
bes_period_skor='".$bes_period_skor_basket."',
lig_adi='".$lig_basket."',
songuncelleme='".time()."',
gelecek='".$gel_basket."',
betradar_id='".$betradar_basket."',
baslamasaat='".$tarihsaat_basket."',
dakika='".$dakika_basket."',
ev_oran='".$oran_kimkazanir_1_basket."',
konuk_oran='".$oran_kimkazanir_2_basket."',
altustgol='".$oran_secenekver_basket."',
ust='".$oran_ust_basket."',
alt='".$oran_alt_basket."'
WHERE eventid='".$eventid_basket."'");

}

}

}

$kontrol_yap_bakalim_basketbol = sed_sql_query("select * from basketbol_canli_maclar where isibitti='0'");
while($kontrolrow_basketbol=sed_sql_fetcharray($kontrol_yap_bakalim_basketbol)) {

if($kontrolrow_basketbol["period"] == "Bitti") {

sed_sql_query("UPDATE kupon_ic SET birperiod='".$kontrolrow_basketbol['bir_period_skor']."',ikiperiod='".$kontrolrow_basketbol['iki_period_skor']."',ucperiod='".$kontrolrow_basketbol['uc_period_skor']."',dortperiod='".$kontrolrow_basketbol['dort_period_skor']."',besperiod='".$kontrolrow_basketbol['bes_period_skor']."',iy='".$kontrolrow_basketbol['iy_ev']." - ".$kontrolrow_basketbol['iy_konuk']."',ms='".$kontrolrow_basketbol['ev_skor']." - ".$kontrolrow_basketbol['konuk_skor']."' WHERE ev_takim='".$kontrolrow_basketbol['ev_takim']."' and konuk_takim='".$kontrolrow_basketbol['konuk_takim']."' and spor_tip='canlib' and mac_db_id='".$kontrolrow_basketbol['id']."'");

sed_sql_query("UPDATE basketbol_canli_maclar SET devre='Bitti',isibitti='1',sonucok='1' WHERE eventid='".$kontrolrow_basketbol["eventid"]."'");

echo "<font color ='red'>".$kontrolrow_basketbol["ev_takim"]." v ".$kontrolrow_basketbol["konuk_takim"]." maçı sonuçlandırıldı.</font></br>";

}

}

//mysqli_close();