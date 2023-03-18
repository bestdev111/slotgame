<?php

session_start();

@header("Content-type: text/html; charset=utf-8");

include '../db.php';

function ulkeismiduzenleme($ulkeismi){

if($ulkeismi=="İsveç"){
	$ulketranslate = "".getTranslation('ulke_isim_isvec')."";
} else if($ulkeismi=="Finlandiya"){
	$ulketranslate = "".getTranslation('ulke_isim_finlandiya')."";
} else if($ulkeismi=="Polonya"){
	$ulketranslate = "".getTranslation('ulke_isim_polonya')."";
} else if($ulkeismi=="İzlanda"){
	$ulketranslate = "".getTranslation('ulke_isim_izlanda')."";
} else if($ulkeismi=="Dünya"){
	$ulketranslate = "".getTranslation('ulke_isim_dunya')."";
} else if($ulkeismi=="Arjantin"){
	$ulketranslate = "".getTranslation('ulke_isim_arjantin')."";
} else if($ulkeismi=="Brezilya"){
	$ulketranslate = "".getTranslation('ulke_isim_brezilya')."";
} else if($ulkeismi=="Uruguay"){
	$ulketranslate = "".getTranslation('ulke_isim_uruguay')."";
} else if($ulkeismi=="Fildişi Sahilleri"){
	$ulketranslate = "".getTranslation('ulke_isim_fildisisahilleri')."";
} else if($ulkeismi=="Gambia"){
	$ulketranslate = "".getTranslation('ulke_isim_gambia')."";
} else if($ulkeismi=="Almanya"){
	$ulketranslate = "".getTranslation('ulke_isim_almanya')."";
} else if($ulkeismi=="İspanya"){
	$ulketranslate = "".getTranslation('ulke_isim_ispanya')."";
} else if($ulkeismi=="Danimarka"){
	$ulketranslate = "".getTranslation('ulke_isim_danimarka')."";
} else if($ulkeismi=="Litvanya"){
	$ulketranslate = "".getTranslation('ulke_isim_litvanya')."";
} else if($ulkeismi=="Avusturya"){
	$ulketranslate = "".getTranslation('ulke_isim_avusturya')."";
} else if($ulkeismi=="Beyaz Rusya"){
	$ulketranslate = "".getTranslation('ulke_isim_beyazrusya')."";
} else if($ulkeismi=="İsrail"){
	$ulketranslate = "".getTranslation('ulke_isim_israil')."";
} else if($ulkeismi=="Güney Kore"){
	$ulketranslate = "".getTranslation('ulke_isim_guneykore')."";
} else if($ulkeismi=="ABD"){
	$ulketranslate = "".getTranslation('ulke_isim_abd')."";
} else if($ulkeismi=="Japonya"){
	$ulketranslate = "".getTranslation('ulke_isim_japonya')."";
} else if($ulkeismi=="Venezuela"){
	$ulketranslate = "".getTranslation('ulke_isim_venezuela')."";
} else if($ulkeismi=="Asia"){
	$ulketranslate = "".getTranslation('ulke_isim_asia')."";
} else if($ulkeismi=="Kenya"){
	$ulketranslate = "".getTranslation('ulke_isim_kenya')."";
} else if($ulkeismi=="Yeni Zelanda"){
	$ulketranslate = "".getTranslation('ulke_isim_yenizelanda')."";
} else if($ulkeismi=="Avrupa"){
	$ulketranslate = "".getTranslation('ulke_isim_avrupa')."";
} else if($ulkeismi=="Kolombiya"){
	$ulketranslate = "".getTranslation('ulke_isim_kolombiya')."";
} else if($ulkeismi=="Güney Amerika"){
	$ulketranslate = "".getTranslation('ulke_isim_guneyamerika')."";
} else if($ulkeismi=="Avustralya"){
	$ulketranslate = "".getTranslation('ulke_isim_avustralya')."";
} else if($ulkeismi=="Kuzey Amerika"){
	$ulketranslate = "".getTranslation('ulke_isim_kuzeyamerika')."";
} else if($ulkeismi=="İrlanda"){
	$ulketranslate = "".getTranslation('ulke_isim_irlanda')."";
} else if($ulkeismi=="Mali"){
	$ulketranslate = "".getTranslation('ulke_isim_mali')."";
} else if($ulkeismi=="Bangladeş"){
	$ulketranslate = "".getTranslation('ulke_isim_banglades')."";
} else if($ulkeismi=="Mısır"){
	$ulketranslate = "".getTranslation('ulke_isim_misir')."";
} else if($ulkeismi=="Norveç"){
	$ulketranslate = "".getTranslation('ulke_isim_norvec')."";
} else if($ulkeismi=="Peru"){
	$ulketranslate = "".getTranslation('ulke_isim_peru')."";
} else if($ulkeismi=="Türkiye"){
	$ulketranslate = "".getTranslation('ulke_isim_turkiye')."";
} else if($ulkeismi=="İtalya"){
	$ulketranslate = "".getTranslation('ulke_isim_italya')."";
} else if($ulkeismi=="Slovakya"){
	$ulketranslate = "".getTranslation('ulke_isim_slovakya')."";
} else if($ulkeismi=="Hırvatistan"){
	$ulketranslate = "".getTranslation('ulke_isim_hirvatistan')."";
} else if($ulkeismi=="Gana"){
	$ulketranslate = "".getTranslation('ulke_isim_gana')."";
} else if($ulkeismi=="Kamerun"){
	$ulketranslate = "".getTranslation('ulke_isim_kamerun')."";
} else if($ulkeismi=="Kazakistan"){
	$ulketranslate = "".getTranslation('ulke_isim_kazakistan')."";
} else if($ulkeismi=="Hong Kong"){
	$ulketranslate = "".getTranslation('ulke_isim_hongkong')."";
} else if($ulkeismi=="Fransa"){
	$ulketranslate = "".getTranslation('ulke_isim_fransa')."";
} else if($ulkeismi=="Lübnan"){
	$ulketranslate = "".getTranslation('ulke_isim_lubnan')."";
} else if($ulkeismi=="Romanya"){
	$ulketranslate = "".getTranslation('ulke_isim_romanya')."";
} else if($ulkeismi=="Ruanda"){
	$ulketranslate = "".getTranslation('ulke_isim_ruanda')."";
} else if($ulkeismi=="Şili"){
	$ulketranslate = "".getTranslation('ulke_isim_sili')."";
} else if($ulkeismi=="Sırbistan"){
	$ulketranslate = "".getTranslation('ulke_isim_sirbistan')."";
} else if($ulkeismi=="Ukrayna"){
	$ulketranslate = "".getTranslation('ulke_isim_ukrayna')."";
} else if($ulkeismi=="Rusya"){
	$ulketranslate = "".getTranslation('ulke_isim_rusya')."";
} else if($ulkeismi=="İngiltere"){
	$ulketranslate = "".getTranslation('ulke_isim_ingiltere')."";
} else if($ulkeismi=="Portekiz"){
	$ulketranslate = "".getTranslation('ulke_isim_portekiz')."";
} else if($ulkeismi=="Estonya"){
	$ulketranslate = "".getTranslation('ulke_isim_estonya')."";
} else if($ulkeismi=="America"){
	$ulketranslate = "".getTranslation('ulke_isim_america')."";
} else if($ulkeismi=="Macau"){
	$ulketranslate = "".getTranslation('ulke_isim_macau')."";
} else if($ulkeismi=="Malavi"){
	$ulketranslate = "".getTranslation('ulke_isim_malavi')."";
} else if($ulkeismi=="El Salvador"){
	$ulketranslate = "".getTranslation('ulke_isim_elsalvador')."";
} else if($ulkeismi=="Lüksemburg"){
	$ulketranslate = "".getTranslation('ulke_isim_luksemburg')."";
} else if($ulkeismi=="Meksika"){
	$ulketranslate = "".getTranslation('ulke_isim_meksika')."";
} else if($ulkeismi=="Yunanistan"){
	$ulketranslate = "".getTranslation('ulke_isim_yunanistan')."";
} else if($ulkeismi=="Çek Cumhuriyeti"){
	$ulketranslate = "".getTranslation('ulke_isim_cekcumhuriyeti')."";
} else if($ulkeismi=="Macaristan"){
	$ulketranslate = "".getTranslation('ulke_isim_macaristan')."";
} else if($ulkeismi=="Fas"){
	$ulketranslate = "".getTranslation('ulke_isim_fas')."";
} else if($ulkeismi=="Senegal"){
	$ulketranslate = "".getTranslation('ulke_isim_senegal')."";
} else if($ulkeismi=="Nikaragua"){
	$ulketranslate = "".getTranslation('ulke_isim_nikaragua')."";
} else {
	$ulketranslate = $ulkeismi;
}

return $ulketranslate;
}

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

if($a=="livesearch_arama") {

$aranan_takim = gd("aranan_takim");
$sportip = gd("sportip");
$fark = time()-90;

/* yasak kelimeler */ 
$whereyasak ="";
$sec = "SELECT * FROM yasak_kelimeler WHERE user_id IN (1,".$_SESSION['betuser'].",".implode(",", $_SESSION['ustler']).")";
$sor = sed_sql_query($sec);
while($r = sed_sql_fetchassoc($sor)) {
$whereyasak.= ' AND ev_takim not like "%'.$r['kelime'].'%" AND konuk_takim not like "%'.$r['kelime'].'%" ';
}
/* yasak kelimeler */

if($sportip==11){
if($aranan_takim) { 
	$takim_ekle = "and (ev_takim like '%$aranan_takim%' or konuk_takim like '%$aranan_takim%')"; 
} else {
	$takim_ekle = "AND ev_takim='ASDDDSAASADSAD'"; 
}
$gizli_canlilar = gizlicanlimaclist();
$sor = sed_sql_query("select * from canli_maclar where id!='' $gizli_canlilar {$whereyasak} and songuncelleme>$fark $takim_ekle LIMIT 10");
if(sed_sql_numrows($sor)<1) { die('<div class="bartitle" onclick="listelesene(2);"><div class="text">Aradığınız Müsabaka Bulunmadı</div></div>'); }
?>
<div class="bartitle"><div class="text">Takımlar</div></div>
<? while($row=sed_sql_fetcharray($sor)) { ?>

<div class="barbottom" onclick="Live.Details.Open(<?=$row['eventid']; ?>);listelesene(2);"><div class="text"><?=$row['ev_takim'];?>-<?=$row['konuk_takim'];?></div></div>

<? } ?>
<div class="barbottomright" onclick="listelesene(2)"><input type="button" class="button" value="Kapat"></div>
<? } else if($sportip==22){
if($aranan_takim) { 
	$takim_ekle = "and (ev_takim like '%$aranan_takim%' or konuk_takim like '%$aranan_takim%')";
} else {
	$takim_ekle = "AND ev_takim='ASDDDSAASADSAD'"; 
}
$gizli_canlilar = gizlicanlimaclistb();
$sor = sed_sql_query("select * from basketbol_canli_maclar where id!='' $gizli_canlilar {$whereyasak} and songuncelleme>$fark $takim_ekle LIMIT 10");
if(sed_sql_numrows($sor)<1) { die('<div class="bartitle" onclick="listelesene(2);"><div class="text">Aradığınız Müsabaka Bulunmadı</div></div>'); }
?>
<div class="bartitle"><div class="text">Takımlar</div></div>
<? while($row=sed_sql_fetcharray($sor)) { ?>

<div class="barbottom" onclick="Live.Details.Open(<?=$row['eventid']; ?>);listelesene(2);"><div class="text"><?=$row['ev_takim'];?>-<?=$row['konuk_takim'];?></div></div>

<? } ?>
<div class="barbottomright" onclick="listelesene(2)"><input type="button" class="button" value="Kapat"></div>
<? } else if($sportip==33){
if($aranan_takim) { 
	$takim_ekle = "and (ev_takim like '%$aranan_takim%' or konuk_takim like '%$aranan_takim%')";
} else {
	$takim_ekle = "AND ev_takim='ASDDDSAASADSAD'"; 
}
$gizli_canlilar = gizlicanlimaclistt();
$sor = sed_sql_query("select * from canli_maclar_tenis where id!='' $gizli_canlilar {$whereyasak} and songuncelleme>$fark $takim_ekle LIMIT 10");
if(sed_sql_numrows($sor)<1) { die('<div class="bartitle" onclick="listelesene(2);"><div class="text">Aradığınız Müsabaka Bulunmadı</div></div>'); }
?>
<div class="bartitle"><div class="text">Takımlar</div></div>
<? while($row=sed_sql_fetcharray($sor)) { ?>

<div class="barbottom" onclick="Live.Details.Open(<?=$row['eventid']; ?>);listelesene(2);"><div class="text"><?=$row['ev_takim'];?>-<?=$row['konuk_takim'];?></div></div>

<? } ?>
<div class="barbottomright" onclick="listelesene(2)"><input type="button" class="button" value="Kapat"></div>
<? } else if($sportip==44){
if($aranan_takim) { 
	$takim_ekle = "and (ev_takim like '%$aranan_takim%' or konuk_takim like '%$aranan_takim%')";
} else {
	$takim_ekle = "AND ev_takim='ASDDDSAASADSAD'"; 
}
$gizli_canlilar = gizlicanlimaclistv();
$sor = sed_sql_query("select * from canli_maclar_voleybol where id!='' $gizli_canlilar {$whereyasak} and songuncelleme>$fark $takim_ekle LIMIT 10");
if(sed_sql_numrows($sor)<1) { die('<div class="bartitle" onclick="listelesene(2);"><div class="text">Aradığınız Müsabaka Bulunmadı</div></div>'); }
?>
<div class="bartitle"><div class="text">Takımlar</div></div>
<? while($row=sed_sql_fetcharray($sor)) { ?>

<div class="barbottom" onclick="Live.Details.Open(<?=$row['eventid']; ?>);listelesene(2);"><div class="text"><?=$row['ev_takim'];?>-<?=$row['konuk_takim'];?></div></div>

<? } ?>
<div class="barbottomright" onclick="listelesene(2)"><input type="button" class="button" value="Kapat"></div>
<? } else if($sportip==55){
if($aranan_takim) { 
	$takim_ekle = "and (ev_takim like '%$aranan_takim%' or konuk_takim like '%$aranan_takim%')";
} else {
	$takim_ekle = "AND ev_takim='ASDDDSAASADSAD'"; 
}
$gizli_canlilar = gizlicanlimaclistbuz();
$sor = sed_sql_query("select * from canli_maclar_buzhokeyi where id!='' $gizli_canlilar {$whereyasak} and songuncelleme>$fark $takim_ekle LIMIT 10");
if(sed_sql_numrows($sor)<1) { die('<div class="bartitle" onclick="listelesene(2);"><div class="text">Aradığınız Müsabaka Bulunmadı</div></div>'); }
?>
<div class="bartitle"><div class="text">Takımlar</div></div>
<? while($row=sed_sql_fetcharray($sor)) { ?>

<div class="barbottom" onclick="Live.Details.Open(<?=$row['eventid']; ?>);listelesene(2);"><div class="text"><?=$row['ev_takim'];?>-<?=$row['konuk_takim'];?></div></div>

<? } ?>
<div class="barbottomright" onclick="listelesene(2)"><input type="button" class="button" value="Kapat"></div>
<? } else if($sportip==66){
if($aranan_takim) { 
	$takim_ekle = "and (ev_takim like '%$aranan_takim%' or konuk_takim like '%$aranan_takim%')";
} else {
	$takim_ekle = "AND ev_takim='ASDDDSAASADSAD'"; 
}
$gizli_canlilar = gizlicanlimaclistmt();
$sor = sed_sql_query("select * from canli_maclar_hentbol where id!='' $gizli_canlilar {$whereyasak} and songuncelleme>$fark $takim_ekle LIMIT 10");
if(sed_sql_numrows($sor)<1) { die('<div class="bartitle" onclick="listelesene(2);"><div class="text">Aradığınız Müsabaka Bulunmadı</div></div>'); }
?>
<div class="bartitle"><div class="text">Takımlar</div></div>
<? while($row=sed_sql_fetcharray($sor)) { ?>

<div class="barbottom" onclick="Live.Details.Open(<?=$row['eventid']; ?>);listelesene(2);"><div class="text"><?=$row['ev_takim'];?>-<?=$row['konuk_takim'];?></div></div>

<? } ?>
<div class="barbottomright" onclick="listelesene(2)"><input type="button" class="button" value="Kapat"></div>
<? } else if($sportip==1){
if($aranan_takim) { 
	$takim_ekle = "and (ev_takim like '%$aranan_takim%' or konuk_takim like '%$aranan_takim%' or mac_kodu like '%$aranan_takim%' or iddaa_kodu like '%$aranan_takim%')";
} else {
	$takim_ekle = "AND ev_takim='ASDDDSAASADSAD'"; 
}

$gizli_ligler = gizli_lig_list();

$gizli_maclar = gizli_mac_list();

if($gizli_ligler=="") { $gizli_lig_ekle = ""; } else { $gizli_lig_ekle = "and ulkeadi not in ($gizli_ligler)"; }

if($gizli_maclar=="") { $gizli_mac_ekle = ""; } else { $gizli_mac_ekle = "and id not in ($gizli_maclar)"; } 

$gizli_ekle = "$gizli_lig_ekle $gizli_mac_ekle";

$sor = sed_sql_query("select * from program_futbol where id!='' $takim_ekle $gizli_ekle {$whereyasak} LIMIT 10");
if(sed_sql_numrows($sor)<1) { die('<div class="bartitle" onclick="listelesene(2);"><div class="text">Aradığınız Müsabaka Bulunmadı</div></div>'); }
?>
<div class="bartitle"><div class="text">Takımlar</div></div>
<? while($row=sed_sql_fetcharray($sor)) { ?>

<div class="barbottom" onclick="detaygetir('1','<?=$row['id'];?>');listelesene(2);"><div class="text"><?=$row['ev_takim'];?>-<?=$row['konuk_takim'];?></div></div>

<? } ?>
<div class="barbottomright" onclick="listelesene(2)"><input type="button" class="button" value="Kapat"></div>
<? } else if($sportip==2){
if($aranan_takim) { 
	$takim_ekle = "and (ev_takim like '%$aranan_takim%' or konuk_takim like '%$aranan_takim%' or mac_kodu like '%$aranan_takim%' or iddaa_kodu like '%$aranan_takim%')";
} else {
	$takim_ekle = "AND ev_takim='ASDDDSAASADSAD'"; 
}

$gizli_ligler = gizli_lig_listb();

$gizli_maclar = gizli_mac_listb();

if($gizli_ligler=="") { $gizli_lig_ekle = ""; } else { $gizli_lig_ekle = "and kupa_isim not in ($gizli_ligler)"; }

if($gizli_maclar=="") { $gizli_mac_ekle = ""; } else { $gizli_mac_ekle = "and id not in ($gizli_maclar)"; } 

$gizli_ekle = "$gizli_lig_ekle $gizli_mac_ekle";
$sor = sed_sql_query("select * from program_basketbol where id!='' $takim_ekle $gizli_ekle {$whereyasak} LIMIT 10");
if(sed_sql_numrows($sor)<1) { die('<div class="bartitle" onclick="listelesene(2);"><div class="text">Aradığınız Müsabaka Bulunmadı</div></div>'); }
?>
<div class="bartitle"><div class="text">Takımlar</div></div>
<? while($row=sed_sql_fetcharray($sor)) { ?>

<div class="barbottom" onclick="detaygetir('2','<?=$row['id'];?>');listelesene(2);"><div class="text"><?=$row['ev_takim'];?>-<?=$row['konuk_takim'];?></div></div>

<? } ?>
<div class="barbottomright" onclick="listelesene(2)"><input type="button" class="button" value="Kapat"></div>
<? } else if($sportip==3){
if($aranan_takim) { 
	$takim_ekle = "and (ev_takim like '%$aranan_takim%' or konuk_takim like '%$aranan_takim%' or mac_kodu like '%$aranan_takim%' or iddaa_kodu like '%$aranan_takim%')";
} else {
	$takim_ekle = "AND ev_takim='ASDDDSAASADSAD'"; 
}

$gizli_ligler = gizli_lig_listt();

if($gizli_ligler=="") { $gizli_lig_ekle = ""; } else { $gizli_lig_ekle = "and kupa_isim not in ($gizli_ligler)"; }

$gizli_ekle = "$gizli_lig_ekle";
$sor = sed_sql_query("select * from program_tenis where id!='' $takim_ekle $gizli_ekle {$whereyasak} LIMIT 10");
if(sed_sql_numrows($sor)<1) { die('<div class="bartitle" onclick="listelesene(2);"><div class="text">Aradığınız Müsabaka Bulunmadı</div></div>'); }
?>
<div class="bartitle"><div class="text">Takımlar</div></div>
<? while($row=sed_sql_fetcharray($sor)) { ?>

<div class="barbottom" onclick="detaygetir('3','<?=$row['id'];?>');listelesene(2);"><div class="text"><?=$row['ev_takim'];?>-<?=$row['konuk_takim'];?></div></div>

<? } ?>
<div class="barbottomright" onclick="listelesene(2)"><input type="button" class="button" value="Kapat"></div>
<? } else if($sportip==4){
if($aranan_takim) { 
	$takim_ekle = "and (ev_takim like '%$aranan_takim%' or konuk_takim like '%$aranan_takim%' or mac_kodu like '%$aranan_takim%' or iddaa_kodu like '%$aranan_takim%')";
} else {
	$takim_ekle = "AND ev_takim='ASDDDSAASADSAD'"; 
}

$gizli_ligler = gizli_lig_listv();

if($gizli_ligler=="") { $gizli_lig_ekle = ""; } else { $gizli_lig_ekle = "and kupa_isim not in ($gizli_ligler)"; }

$gizli_ekle = "$gizli_lig_ekle";

$sor = sed_sql_query("select * from program_voleybol where id!='' $takim_ekle $gizli_ekle {$whereyasak} LIMIT 10");
if(sed_sql_numrows($sor)<1) { die('<div class="bartitle" onclick="listelesene(2);"><div class="text">Aradığınız Müsabaka Bulunmadı</div></div>'); }
?>
<div class="bartitle"><div class="text">Takımlar</div></div>
<? while($row=sed_sql_fetcharray($sor)) { ?>

<div class="barbottom" onclick="detaygetir('4','<?=$row['id'];?>');listelesene(2);"><div class="text"><?=$row['ev_takim'];?>-<?=$row['konuk_takim'];?></div></div>

<? } ?>
<div class="barbottomright" onclick="listelesene(2)"><input type="button" class="button" value="Kapat"></div>
<? } else if($sportip==5){
if($aranan_takim) { 
	$takim_ekle = "and (ev_takim like '%$aranan_takim%' or konuk_takim like '%$aranan_takim%' or mac_kodu like '%$aranan_takim%' or iddaa_kodu like '%$aranan_takim%')";
} else {
	$takim_ekle = "AND ev_takim='ASDDDSAASADSAD'"; 
}

$gizli_ligler = gizli_lig_listbuz();

if($gizli_ligler=="") { $gizli_lig_ekle = ""; } else { $gizli_lig_ekle = "and kupa_isim not in ($gizli_ligler)"; }

$gizli_ekle = "$gizli_lig_ekle";

$sor = sed_sql_query("select * from program_buzhokeyi where id!='' $takim_ekle $gizli_ekle {$whereyasak} LIMIT 10");
if(sed_sql_numrows($sor)<1) { die('<div class="bartitle" onclick="listelesene(2);"><div class="text">Aradığınız Müsabaka Bulunmadı</div></div>'); }
?>
<div class="bartitle"><div class="text">Takımlar</div></div>
<? while($row=sed_sql_fetcharray($sor)) { ?>

<div class="barbottom" onclick="detaygetir('5','<?=$row['id'];?>');listelesene(2);"><div class="text"><?=$row['ev_takim'];?>-<?=$row['konuk_takim'];?></div></div>

<? } ?>
<div class="barbottomright" onclick="listelesene(2)"><input type="button" class="button" value="Kapat"></div>
<? } else if($sportip==6){
if($aranan_takim) { 
	$takim_ekle = "and (ev_takim like '%$aranan_takim%' or konuk_takim like '%$aranan_takim%' or mac_kodu like '%$aranan_takim%' or iddaa_kodu like '%$aranan_takim%')";
} else {
	$takim_ekle = "AND ev_takim='ASDDDSAASADSAD'"; 
}

$sor = sed_sql_query("select * from program_hentbol where id!='' $takim_ekle LIMIT 10");
if(sed_sql_numrows($sor)<1) { die('<div class="bartitle" onclick="listelesene(2);"><div class="text">Aradığınız Müsabaka Bulunmadı</div></div>'); }
?>
<div class="bartitle"><div class="text">Takımlar</div></div>
<? while($row=sed_sql_fetcharray($sor)) { ?>

<div class="barbottom" onclick="detaygetir('6','<?=$row['id'];?>');listelesene(2);"><div class="text"><?=$row['ev_takim'];?>-<?=$row['konuk_takim'];?></div></div>

<? } ?>
<div class="barbottomright" onclick="listelesene(2)"><input type="button" class="button" value="Kapat"></div>
<? } ?>

<? }

if($a=="yaklasanmaclar"){

$suan = time();

$kontrol_sql1 = sed_sql_query("select id from program_futbol where mac_time<$suan");
$kontrol_sql2 = sed_sql_query("select id from program_basketbol where mac_time<$suan");
$kontrol_sql3 = sed_sql_query("select id from program_tenis where mac_time<$suan");
$kontrol_sql4 = sed_sql_query("select id from program_voleybol where mac_time<$suan");
$kontrol_sql5 = sed_sql_query("select id from program_buzhokeyi where mac_time<$suan");
$kontrol_sql6 = sed_sql_query("select id from program_hentbol where mac_time<$suan");

while($row1=sed_sql_fetcharray($kontrol_sql1)) {
sed_sql_query("delete from oranlar_futbol where mac_db_id='$row1[id]'");
sed_sql_query("delete from program_futbol where id='$row1[id]'");
}
while($row2=sed_sql_fetcharray($kontrol_sql2)) {
sed_sql_query("delete from oranlar_basketbol where mac_db_id='$row2[id]'");
sed_sql_query("delete from program_basketbol where id='$row2[id]'");
}
while($row3=sed_sql_fetcharray($kontrol_sql3)) {
sed_sql_query("delete from oranlar_tenis where mac_db_id='$row3[id]'");
sed_sql_query("delete from program_tenis where id='$row3[id]'");
}
while($row4=sed_sql_fetcharray($kontrol_sql4)) {
sed_sql_query("delete from oranlar_voleybol where mac_db_id='$row4[id]'");
sed_sql_query("delete from program_voleybol where id='$row4[id]'");
}
while($row5=sed_sql_fetcharray($kontrol_sql5)) {
sed_sql_query("delete from oranlar_buzhokeyi where mac_db_id='$row5[id]'");
sed_sql_query("delete from program_buzhokeyi where id='$row5[id]'");
}
while($row6=sed_sql_fetcharray($kontrol_sql6)) {
sed_sql_query("delete from oranlar_hentbol where mac_db_id='$row6[id]'");
sed_sql_query("delete from program_hentbol where id='$row6[id]'");
}
sed_sql_query("delete from oranlar_futbol where oran='0.00'");
sed_sql_query("delete from oranlar_basketbol where oran='0.00'");
sed_sql_query("delete from oranlar_tenis where oran='0.00'");
sed_sql_query("delete from oranlar_voleybol where oran='0.00'");
sed_sql_query("delete from oranlar_buzhokeyi where oran='0.00'");
sed_sql_query("delete from oranlar_hentbol where oran='0.00'");


$do_cache = 1;
$mikro = microtime();

$tarih = date("d.m.y");

if($tarih=="") {

$tarih_ekle = "";

} else {

$tarih_ekle = "and mac_tarih='$tarih'";	

}



$saat = gd("saat");

if(!empty($saat) and $saat!=0) { $carp = ($saat*60); $eksi = time()+$carp; $saat_ekle = "and mac_time<$eksi"; } elseif($saat==0){$saat_ekle = "";}else { $carp = (180*60); $eksi = time()+$carp; $saat_ekle = "and mac_time<$eksi";} 

$ulke = gd("ulke");

if(!empty($ulke)) { $ulke_ekle = "and kupa_ulke='$ulke'"; } else { $ulke_ekle = ""; }


$sasi=0;

$gizli_ligler = gizli_lig_list();

$gizli_maclar = gizli_mac_list();

if($gizli_ligler=="") { $gizli_lig_ekle = ""; } else { $gizli_lig_ekle = "and ulkeadi not in ($gizli_ligler)"; }

if($gizli_maclar=="") { $gizli_mac_ekle = ""; } else { $gizli_mac_ekle = "and id not in ($gizli_maclar)"; } 

$gizli_ekle = "$gizli_lig_ekle $gizli_mac_ekle";

/* yasak kelimeler */ 
	$whereyasak ="";
	$sec = "SELECT * FROM yasak_kelimeler WHERE user_id IN (1,".$_SESSION['betuser'].",".implode(",", $_SESSION['ustler']).")";
	$sor = sed_sql_query($sec);
	while($r = sed_sql_fetchassoc($sor)) {
		$whereyasak.= ' AND (ev_takim not like "%'.$r['kelime'].'%" AND konuk_takim not like "%'.$r['kelime'].'%") ';
	}
/* yasak kelimeler */

$kayittime_ver = $suan-300;
$sqladder = "and kayittime<$kayittime_ver and bulten='hititbet' $gizli_ekle and kupa_isim not like '%Duello%' {$whereyasak} and aktif='1' and (evoran>0 or beraberoran>0 or deporan>0)";
$sor = sed_sql_query("select * from program_futbol where id!='' $sqladder order by mac_time asc LIMIT 5");
if(userayar('sporbulten')==0) { echo "<div class='bos' style='text-align: center;padding: 5px;font-weight: bold;'>Spor (bülten) bahisleri kapalıdır. Yöneticiniz ile görüşünüz.</div>"; } else {
if(sed_sql_numrows($sor)<1) { echo "<div class='bos' style='text-align: center;padding: 5px;font-weight: bold;'>".getTranslation('exportmusabakabulunmadi')."</div>"; }
$say=1;
while($row=sed_sql_fetcharray($sor)) { 
$say++;
$ev_kazanc = oranbul($row['id'],1);

$beraberlik = oranbul($row['id'],2);

$konuk_kazanc = oranbul($row['id'],3);

$mbs = mbsver($row['id'],$row['mbs'],$row['kupa_id']);

$encoded = "$row[id]|$row[ev_takim]|$row[konuk_takim]|$row[mac_kodu]|$mbs|$row[mac_time]|futbol";
?>

<div class="data" id="" onclick="">
<div class="odd  ">
<div id="e<?=$row["id"];?>" class="event match " onclick="detaygetir('1','<?=$row["id"];?>');">
<div class=""><div colspan="11" class="c_comment"><div class="c_comment"></div><div class="c_pointer"></div></div></div>
<div class="event_wrapper">
<div class="datetime ">
<div class="favorites hidden"> <img src="img/favorite0.png" onclick="toggleFavorite2(event, 9489690, undefined);"> </div>
<div class="sportsIcon ">
<div class="icon">
<div class="sports soccer"></div>
</div>
</div>
<div class="date small ">
<div> <?=date("d.m H:i",$row['mac_time']); ?> </div>
<img src="img/icons/live_rain.png" alt="" width="23" height="23" class="hidden">
<span class=""> <img src="assets/img/icon_top.png" alt="" width="24" height="12"> </span>
</div>
</div>
<div class="teamrows">
<div class="teamrow">
<div class="team"> <?=$row["ev_takim"];?>  </div>
<div class="score">
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
</div>
</div>
<div class="teamrow">
<div class="team"> <?=$row["konuk_takim"];?>  </div>
<div class="score">
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
</div>
</div>
</div>
<div class=""> <div class="count">  </div></div>
<div class="hidden" onclick="toggleBetMatrix(event, 9489690)"></div>
<div class="arrow "></div>
</div>
</div>
</div>

<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w25"><?=getTranslation('exportmacsonucutahmin')?></div>
<div class="cell w25 rsBut"> <div class="<?=$row["mac_kodu"];?> qbutton l" oddsid="<?=$row["mac_kodu"];?>1" onclick="kupon(<?=$row["mac_kodu"];?>1,<?=$row["mac_kodu"];?>,'<?=codekupon("$encoded|1|$ev_kazanc"); ?>', this);"> <div class="caption">1</div> <div class="quote"><?=$ev_kazanc;?></div></div></div>
<div class="cell w25 rsBut"> <div class="<?=$row["mac_kodu"];?> qbutton m" oddsid="<?=$row["mac_kodu"];?>2" onclick="kupon(<?=$row["mac_kodu"];?>2,<?=$row["mac_kodu"];?>,'<?=codekupon("$encoded|2|$beraberlik"); ?>', this);"> <div class="caption">X</div> <div class="quote"><?=$beraberlik;?></div></div> </div>
<div class="cell w25 rsBut"> <div class="<?=$row["mac_kodu"];?> qbutton s" oddsid="<?=$row["mac_kodu"];?>3" onclick="kupon(<?=$row["mac_kodu"];?>3,<?=$row["mac_kodu"];?>,'<?=codekupon("$encoded|3|$konuk_kazanc"); ?>', this);"> <div class="caption">2</div> <div class="quote"><?=$konuk_kazanc;?></div></div></div>

<div class=""> </div>
</div>
</div>

<? 

if($i==10){break;}

}

}

$sor = sed_sql_query("select oran_val_id,mac_kodu from kupon where session_id='$session_id' and spor_tip='futbol'");

while($row=sed_sql_fetcharray($sor)) { ?>

<script>
$("div[oddsid='<?=$row['mac_kodu'];?><?=$row['oran_val_id'];?>']").addClass('selected');
</script>

<? } 

}

if($a=="kuponekle") {

$val = gd("val");

maxkuponkontrol($session_id,userayar('max_satir'));

$encode = encodekupon($val);

$kes = explode("|",$encode);



$mac_db_id 		=	 	$kes[0];

$ev_takim 		=	 	$kes[1];

$konuk_takim	=	 	$kes[2];

$mbs			=		$kes[4];

$mac_time		=		$kes[5];

$spor_tip 		=		$kes[6];

$oran_val_id	=		$kes[7];

$oran 			=		$kes[8];



kuponda_ayni_kontrol($ev_takim,$konuk_takim,$mac_db_id);



if($oran=="-") { die(); }



if($spor_tip=="futbol" && userayar('futbol')=="0") { die("no"); }

if($spor_tip=="futbol") {

$oran_bilgi = bilgi("select oran_tip,id,oran_val from oran_val_futbol where id='$oran_val_id'");

$oran_tips = bilgi("select id,tip_isim from oran_tip_futbol where id='$oran_bilgi[oran_tip]'");

$mb = bilgi("select id,sonuc_id,mac_kodu,iddaa_kodu from program_futbol where id='$mac_db_id'");

$sonuc_id = $mb['sonuc_id'];

$oranval = "";

$bulten = 'hititbet';

if($mb['mac_kodu']!="") { $mac_kodu = $mb['mac_kodu']; } else { $mac_kodu = $mb['iddaa_kodu']; }

$oran_tip_ver = $oran_tips['tip_isim'];
$oran_val_ver = $oran_bilgi['oran_val'];


} else if($spor_tip=="basketbol") {

$oran_valid_getir = bilgi("select oran_val_id from oranlar_basketbol where id='$oran_val_id'");

$oran_bilgi = bilgi("select oran_tip,id,oran_val from oran_val_basketbol where id='$oran_valid_getir[oran_val_id]'");

$oran_tips = bilgi("select id,tip_isim from oran_tip_basketbol where id='$oran_bilgi[oran_tip]'");	

$mb = bilgi("select id,sonucid,bulten,mac_kodu,iddaa_kodu from program_basketbol where id='$mac_db_id'");

$ooran = bilgi("select oran_val_b,oran_val_id,mac_db_id from oranlar_basketbol where mac_db_id='$mac_db_id' and id='$oran_val_id'");

$sonuc_id = $mb['sonucid'];

$oranval = $ooran['oran_val_b'];

$bulten = $mb['bulten'];

if($mb['mac_kodu']!="") { $mac_kodu = $mb['mac_kodu']; } else { $mac_kodu = $mb['iddaa_kodu']; }

$oran_tip_ver = $oran_tips['tip_isim'];
$oran_val_ver = $oran_bilgi['oran_val'];

} else if($spor_tip=="tenis") {

$oran_bilgi = bilgi("select oran_tip,id,oran_val from oran_val_tenis where id='$oran_val_id'");

$oran_tips = bilgi("select id,tip_isim from oran_tip_tenis where id='$oran_bilgi[oran_tip]'");	

$mb = bilgi("select id,sonucid,bulten,mac_kodu,iddaa_kodu from program_tenis where id='$mac_db_id'");

$ooran = bilgi("select oran_val_id,mac_db_id from oranlar_tenis where mac_db_id='$mac_db_id' and oran_val_id='$oran_val_id'");

$sonuc_id = $mb['sonucid'];

$oranval = "";

$bulten = $mb['bulten'];

if($mb['mac_kodu']!="") { $mac_kodu = $mb['mac_kodu']; } else { $mac_kodu = $mb['iddaa_kodu']; }

$oran_tip_ver = $oran_tips['tip_isim'];
$oran_val_ver = $oran_bilgi['oran_val'];

} else if($spor_tip=="voleybol") {

$oran_bilgi = bilgi("select oran_tip,id,oran_val from oran_val_voleybol where id='$oran_val_id'");

$oran_tips = bilgi("select id,tip_isim from oran_tip_voleybol where id='$oran_bilgi[oran_tip]'");	

$mb = bilgi("select id,sonucid,bulten,mac_kodu,iddaa_kodu from program_voleybol where id='$mac_db_id'");

$ooran = bilgi("select oran_val_v,oran_val_id,mac_db_id from oranlar_voleybol where mac_db_id='$mac_db_id' and oran_val_id='$oran_val_id'");

$sonuc_id = $mb['sonucid'];

$oranval = $ooran['oran_val_v'];

$bulten = $mb['bulten'];

if($mb['mac_kodu']!="") { $mac_kodu = $mb['mac_kodu']; } else { $mac_kodu = $mb['iddaa_kodu']; }

$oran_tip_ver = $oran_tips['tip_isim'];
$oran_val_ver = $oran_bilgi['oran_val'];

} else if($spor_tip=="buzhokeyi") {

$oran_bilgi = bilgi("select oran_tip,id,oran_val from oran_val_buzhokeyi where id='$oran_val_id'");

$oran_tips = bilgi("select id,tip_isim from oran_tip_buzhokeyi where id='$oran_bilgi[oran_tip]'");	

$mb = bilgi("select id,sonucid,bulten,mac_kodu,iddaa_kodu from program_buzhokeyi where id='$mac_db_id'");

$ooran = bilgi("select oran_val_id,mac_db_id from oranlar_buzhokeyi where mac_db_id='$mac_db_id' and oran_val_id='$oran_val_id'");

$sonuc_id = $mb['sonucid'];

$oranval = "";

$bulten = $mb['bulten'];

if($mb['mac_kodu']!="") { $mac_kodu = $mb['mac_kodu']; } else { $mac_kodu = $mb['iddaa_kodu']; }

$oran_tip_ver = $oran_tips['tip_isim'];
$oran_val_ver = $oran_bilgi['oran_val'];

} else if($spor_tip=="masatenisi") {

$mb = bilgi("select id,sonucid,bulten,mac_kodu,iddaa_kodu from program_masatenisi where id='$mac_db_id'");

$sonuc_id = $mb['sonucid'];

$oranval = "";

$bulten = $mb['bulten'];

if($mb['mac_kodu']!="") { $mac_kodu = $mb['mac_kodu']; } else { $mac_kodu = $mb['iddaa_kodu']; }

if($oran_val_id==1){
	$oran_val_ver = "1";
} else if($oran_val_id==2){
	$oran_val_ver = "2";
}

$oran_tip_ver = "Kim Kazanır";

} else if($spor_tip=="beyzbol") {

$mb = bilgi("select id,sonucid,bulten,mac_kodu,iddaa_kodu from program_beyzbol where id='$mac_db_id'");

$sonuc_id = $mb['sonucid'];

$oranval = "";

$bulten = $mb['bulten'];

if($mb['mac_kodu']!="") { $mac_kodu = $mb['mac_kodu']; } else { $mac_kodu = $mb['iddaa_kodu']; }

if($oran_val_id==1){
	$oran_val_ver = "1";
} else if($oran_val_id==2){
	$oran_val_ver = "2";
}

$oran_tip_ver = "Kim Kazanır";

} else if($spor_tip=="rugby") {

$mb = bilgi("select id,sonucid,bulten,mac_kodu,iddaa_kodu from program_rugby where id='$mac_db_id'");

$sonuc_id = $mb['sonucid'];

$oranval = "";

$bulten = $mb['bulten'];

if($mb['mac_kodu']!="") { $mac_kodu = $mb['mac_kodu']; } else { $mac_kodu = $mb['iddaa_kodu']; }

if($oran_val_id==1){
	$oran_val_ver = "1";
} else if($oran_val_id==2){
	$oran_val_ver = "X";
} else if($oran_val_id==3){
	$oran_val_ver = "2";
}

$oran_tip_ver = "1X2";

} else if($spor_tip=="dovus") {

$mb = bilgi("select id,sonucid,bulten,mac_kodu,iddaa_kodu from program_dovus where id='$mac_db_id'");

$sonuc_id = $mb['sonucid'];

$oranval = "";

$bulten = $mb['bulten'];

if($mb['mac_kodu']!="") { $mac_kodu = $mb['mac_kodu']; } else { $mac_kodu = $mb['iddaa_kodu']; }

if($oran_val_id==1){
	$oran_val_ver = "1";
} else if($oran_val_id==2){
	$oran_val_ver = "X";
} else if($oran_val_id==3){
	$oran_val_ver = "2";
}

$oran_tip_ver = "1X2";

}






$oyun_tip = substr($spor_tip,0,1);

$suan = time();



$oran_tip = "$oran_tip_ver|$oran_val_ver";



$kontrol = sed_sql_query("select oran_tip,mac_db_id,spor_tip,session_id,id from kupon where session_id='$session_id' and spor_tip='$spor_tip' and mac_db_id='$mac_db_id'");

if(sed_sql_numrows($kontrol)<1) {

sed_sql_query("insert into kupon (id,mbs,mac_kodu,ev_takim,konuk_takim,mac_db_id,mac_time,mac_time_kontrol,oran_val_id,oran_tip,oran_val,oran,session_id,spor_tip,oyun_tip,bulten,sonucid,ilkgiris) 

values ('','$mbs','$mac_kodu','$ev_takim','$konuk_takim','$mac_db_id','$mac_time','$mac_time','$oran_val_id','$oran_tip','$oranval','$oran','$session_id','$spor_tip','$oyun_tip','$bulten','$sonuc_id','$suan')");

die("201");

} else {

$kupondaki = sed_sql_fetchassoc($kontrol);

if($kupondaki['oran_tip']==$oran_tip){

sed_sql_query("delete from kupon where id='$kupondaki[id]' and session_id='$session_id' and oran_tip='$oran_tip'");

} else {

sed_sql_query("update kupon set oran_val_id='$oran_val_id',oran_tip='$oran_tip',oran='$oran',oran_val='$oranval' where id='$kupondaki[id]'");

}

die("200");

}

}

if($a=="canliekle") {

maxkuponkontrol($session_id,userayar('max_satir'));

$oran_tip = gd("tahminadi");

$oran_val = gd("secenek");

$oran_ayari = gd("oran");

$ayardaki = (float)userayar('orankorumamaxoran');

if($ayardaki < $oran_ayari)

$oran_ayari = $ayardaki;

$oran = nf($oran_ayari);

$mac_db_id = gd("eventid");

$orantips = "$oran_tip|$oran_val";

$macbilgi = bilgi("select * from canli_maclar where eventid='$mac_db_id'");

kuponda_ayni_kontrol($macbilgi['ev_takim'],$macbilgi['konuk_takim'],$macbilgi['id']);

$surekli_aski_durum = surekli_aski_durum($macbilgi['eventid']);

if($macbilgi['aktif']=="0" || $surekli_aski_durum==1) { die("2"); }

$mactime = time()+300;

if($macbilgi['gelecek']=="1") {

$canliinfo = "".date("H:i")."|Başlamadan";

} else 

if($macbilgi['devremi']=="1") {

$canliinfo = "$macbilgi[ev_skor]:$macbilgi[konuk_skor]|Devre Arasında";

} else {

$canliinfo = "$macbilgi[ev_skor]:$macbilgi[konuk_skor]|$macbilgi[dakika]".getTranslation('canlidkicin')."";

}

$suan = time();



$canlimbs = canli_mbs_ver($macbilgi['eventid']);

$mac_timele = strtotime($macbilgi['baslamasaat']);

$kontrol = sed_sql_query("select * from kupon where session_id='$session_id' and spor_tip='canli' and canli_event='$macbilgi[eventid]'");

if(sed_sql_numrows($kontrol)<1) {

if(!empty($oran_val) && !empty($oran)) {

sed_sql_query("insert into kupon (id,mbs,mac_kodu,ev_takim,konuk_takim,mac_db_id,mac_time,mac_time_kontrol,oran_val_id,oran_tip,oran,session_id,spor_tip,oyun_tip,canli_event,canli_info,aktif,ilkgiris) values 

('','$canlimbs','CNL','$macbilgi[ev_takim]','$macbilgi[konuk_takim]','$macbilgi[id]','$mactime','$mac_timele','$oranvalid','$orantips','".$oran."','$session_id','canli','canli','$macbilgi[eventid]','$canliinfo','1','$suan')");

die("1");

}

} else {

$kupondaki = sed_sql_fetchassoc($kontrol);

if($kupondaki['oran_tip']==$orantips){

sed_sql_query("delete from kupon where id='$kupondaki[id]' and session_id='$session_id' and oran_tip='$orantips'");

} else {

sed_sql_query("update kupon set oran_val_id='$oranvalid',oran_tip='$orantips',oran='$oran',canli_info='$canliinfo',ilkgiris='$suan' where id='$kupondaki[id]'");

}

die("200");

}

}

if($a=="canliekleb") {

maxkuponkontrol($session_id,userayar('max_satir'));

$war = explode("|",base64_decode(gd("warrior")));

$oran_tip = gd("tahminadi");

if($oran_tip=="Handikap" || $oran_tip=="1.Yarı Handikap" || $oran_tip=="2.Yarı Handikap" || $oran_tip=="1.Çeyrek Handikap" || $oran_tip=="2.Çeyrek Handikap" || $oran_tip=="3.Çeyrek Handikap" || $oran_tip=="4.Çeyrek Handikap"){

$secenek_ver = gd("secenek");
$sonuc = explode(' ',$secenek_ver);

if($sonuc[0]=="1"){
$sonuc_veriyor = ltrim($secenek_ver,"1");
$sonuc_verdim = str_replace(' ','',$sonuc_veriyor);
if($sonuc_veriyor<1){
	$oran_val = "1 ".$sonuc_verdim."";
} else {
	$oran_val = "1 +".$sonuc_verdim."";
}

} else if($sonuc[0]=="2"){
$sonuc_veriyor = ltrim($secenek_ver,"2");
$sonuc_verdim = str_replace(' ','',$sonuc_veriyor);
if($sonuc_veriyor<1){
	$oran_val = "2 ".$sonuc_verdim."";
} else {
	$oran_val = "2 +".$sonuc_verdim."";
}

}

} else {
$oran_val = gd("secenek");
}

$oran = gd("oran");

$mac_db_id = gd("eventid");

$orantips = "$oran_tip|$oran_val";

$macbilgi = bilgi("select * from basketbol_canli_maclar where eventid='$mac_db_id'");

if($macbilgi['aktif']=="0") { die("2"); }

$mactime = time()+300;

if($macbilgi['gelecek']=="1") {

$canliinfo = "".date("H:i")."|Başlamadan";

} else 

if($macbilgi['devremi']=="1") {

$canliinfo = "$macbilgi[ev_skor]:$macbilgi[konuk_skor]|$macbilgi[period]";

} else {

$canliinfo = "$macbilgi[ev_skor]:$macbilgi[konuk_skor]|$macbilgi[period]";

}

$suan = time();

$mac_timele = strtotime($macbilgi['baslamasaat']);

$kontrol = sed_sql_query("select * from kupon where session_id='$session_id' and spor_tip='canlib' and canli_event='$macbilgi[eventid]'");

if(sed_sql_numrows($kontrol)<1) {

if(!empty($oran_val) && !empty($oran)) {

$canlibasketmbs = userayar('canlibasketmbs');

sed_sql_query("insert into kupon (id,mbs,mac_kodu,ev_takim,konuk_takim,mac_db_id,mac_time,mac_time_kontrol,oran_val_id,oran_tip,oran,session_id,spor_tip,oyun_tip,canli_event,canli_info,aktif,ilkgiris) values 

('','$canlibasketmbs','CNLB','$macbilgi[ev_takim]','$macbilgi[konuk_takim]','$macbilgi[id]','$mactime','$mac_timele','$oranvalid','$orantips','".$oran."','$session_id','canlib','canlib','$macbilgi[eventid]','$canliinfo','1','$suan')");

die("1");

}

} else {

$kupondaki = sed_sql_fetchassoc($kontrol);

if($kupondaki['oran_tip']==$orantips){

sed_sql_query("delete from kupon where id='$kupondaki[id]' and session_id='$session_id' and oran_tip='$orantips'");

} else {

sed_sql_query("update kupon set oran_val_id='$oranvalid',oran_tip='$orantips',oran='$oran',canli_info='$canliinfo',ilkgiris='$suan' where id='$kupondaki[id]'");

}

die("200");

}

}

if($a=="canlieklet") {

maxkuponkontrol($session_id,userayar('max_satir'));

$war = explode("|",base64_decode(gd("warrior")));

$oran_tip = gd("tahminadi");

$oran_val = gd("secenek");

$oran = gd("oran");

$mac_db_id = gd("eventid");

$orantips = "$oran_tip|$oran_val";

$macbilgi = bilgi("select * from canli_maclar_tenis where eventid='$mac_db_id'");

if($macbilgi['aktif']=="0") { die("2"); }

$mactime = time()+300;

if($macbilgi['gelecek']=="1") {

$canliinfo = "".date("H:i")."|Başlamadan";

} else 

if($macbilgi['devremi']=="1") {

$canliinfo = "$macbilgi[ev_skor]:$macbilgi[konuk_skor]|$macbilgi[period]";

} else {

$canliinfo = "$macbilgi[ev_skor]:$macbilgi[konuk_skor]|$macbilgi[period]";

}

$suan = time();

$mac_timele = strtotime($macbilgi['baslamasaat']);

$kontrol = sed_sql_query("select * from kupon where session_id='$session_id' and spor_tip='canlit' and canli_event='$macbilgi[eventid]'");

if(sed_sql_numrows($kontrol)<1) {

if(!empty($oran_val) && !empty($oran)) {

$canlitenismbs = userayar('canlitenismbs');

sed_sql_query("insert into kupon (id,mbs,mac_kodu,ev_takim,konuk_takim,mac_db_id,mac_time,mac_time_kontrol,oran_val_id,oran_tip,oran,session_id,spor_tip,oyun_tip,canli_event,canli_info,aktif,ilkgiris) values 

('','$canlitenismbs','CNLT','$macbilgi[ev_takim]','$macbilgi[konuk_takim]','$macbilgi[id]','$mactime','$mac_timele','$oranvalid','$orantips','".$oran."','$session_id','canlit','canlit','$macbilgi[eventid]','$canliinfo','1','$suan')");

die("1");

}

} else {

$kupondaki = sed_sql_fetchassoc($kontrol);

if($kupondaki['oran_tip']==$orantips){

sed_sql_query("delete from kupon where id='$kupondaki[id]' and session_id='$session_id' and oran_tip='$orantips'");

} else {

sed_sql_query("update kupon set oran_val_id='$oranvalid',oran_tip='$orantips',oran='$oran',canli_info='$canliinfo',ilkgiris='$suan' where id='$kupondaki[id]'");

}

die("200");

}

}

if($a=="canlieklev") {

maxkuponkontrol($session_id,userayar('max_satir'));

$war = explode("|",base64_decode(gd("warrior")));

$oran_tip = gd("tahminadi");

$oran_val = gd("secenek");

$oran = gd("oran");

$mac_db_id = gd("eventid");

$orantips = "$oran_tip|$oran_val";

$macbilgi = bilgi("select * from canli_maclar_voleybol where eventid='$mac_db_id'");

if($macbilgi['aktif']=="0") { die("2"); }

$mactime = time()+300;

if($macbilgi['gelecek']=="1") {

$canliinfo = "".date("H:i")."|Başlamadan";

} else 

if($macbilgi['devremi']=="1") {

$canliinfo = "$macbilgi[ev_skor]:$macbilgi[konuk_skor]|$macbilgi[period]";

} else {

$canliinfo = "$macbilgi[ev_skor]:$macbilgi[konuk_skor]|$macbilgi[period]";

}

$suan = time();

$mac_timele = strtotime($macbilgi['baslamasaat']);

$kontrol = sed_sql_query("select * from kupon where session_id='$session_id' and spor_tip='canliv' and canli_event='$macbilgi[eventid]'");

if(sed_sql_numrows($kontrol)<1) {

if(!empty($oran_val) && !empty($oran)) {

$canlivoleybolmbs = userayar('canlivoleybolmbs');

sed_sql_query("insert into kupon (id,mbs,mac_kodu,ev_takim,konuk_takim,mac_db_id,mac_time,mac_time_kontrol,oran_val_id,oran_tip,oran,session_id,spor_tip,oyun_tip,canli_event,canli_info,aktif,ilkgiris) values 

('','$canlivoleybolmbs','CNLV','$macbilgi[ev_takim]','$macbilgi[konuk_takim]','$macbilgi[id]','$mactime','$mac_timele','$oranvalid','$orantips','".$oran."','$session_id','canliv','canliv','$macbilgi[eventid]','$canliinfo','1','$suan')");

die("1");

}

} else {

$kupondaki = sed_sql_fetchassoc($kontrol);

if($kupondaki['oran_tip']==$orantips){

sed_sql_query("delete from kupon where id='$kupondaki[id]' and session_id='$session_id' and oran_tip='$orantips'");

} else {

sed_sql_query("update kupon set oran_val_id='$oranvalid',oran_tip='$orantips',oran='$oran',canli_info='$canliinfo',ilkgiris='$suan' where id='$kupondaki[id]'");

}

die("200");

}

}

if($a=="canlieklebuz") {

maxkuponkontrol($session_id,userayar('max_satir'));

$war = explode("|",base64_decode(gd("warrior")));

$oran_tip = gd("tahminadi");

$oran_val = gd("secenek");

$oran = gd("oran");

$mac_db_id = gd("eventid");

$orantips = "$oran_tip|$oran_val";

$macbilgi = bilgi("select * from canli_maclar_buzhokeyi where eventid='$mac_db_id'");

if($macbilgi['aktif']=="0") { die("2"); }

$mactime = time()+300;

if($macbilgi['gelecek']=="1") {

$canliinfo = "".date("H:i")."|Başlamadan";

} else 

if($macbilgi['devremi']=="1") {

$canliinfo = "$macbilgi[ev_skor]:$macbilgi[konuk_skor]|$macbilgi[period]";

} else {

$canliinfo = "$macbilgi[ev_skor]:$macbilgi[konuk_skor]|$macbilgi[period]";

}

$suan = time();

$mac_timele = strtotime($macbilgi['baslamasaat']);

$kontrol = sed_sql_query("select * from kupon where session_id='$session_id' and spor_tip='canlibuz' and canli_event='$macbilgi[eventid]'");

if(sed_sql_numrows($kontrol)<1) {

if(!empty($oran_val) && !empty($oran)) {

$canlibuzhokeyimbs = userayar('canlibuzhokeyimbs');

sed_sql_query("insert into kupon (id,mbs,mac_kodu,ev_takim,konuk_takim,mac_db_id,mac_time,mac_time_kontrol,oran_val_id,oran_tip,oran,session_id,spor_tip,oyun_tip,canli_event,canli_info,aktif,ilkgiris) values 

('','$canlibuzhokeyimbs','CNLBUZ','$macbilgi[ev_takim]','$macbilgi[konuk_takim]','$macbilgi[id]','$mactime','$mac_timele','$oranvalid','$orantips','".$oran."','$session_id','canlibuz','canlibuz','$macbilgi[eventid]','$canliinfo','1','$suan')");

die("1");

}

} else {

$kupondaki = sed_sql_fetchassoc($kontrol);

if($kupondaki['oran_tip']==$orantips){

sed_sql_query("delete from kupon where id='$kupondaki[id]' and session_id='$session_id' and oran_tip='$orantips'");

} else {

sed_sql_query("update kupon set oran_val_id='$oranvalid',oran_tip='$orantips',oran='$oran',canli_info='$canliinfo',ilkgiris='$suan' where id='$kupondaki[id]'");

}

die("200");

}

}

if($a=="canlieklemt") {

maxkuponkontrol($session_id,userayar('max_satir'));

$war = explode("|",base64_decode(gd("warrior")));

$oran_tip = gd("tahminadi");

$oran_val = gd("secenek");

$oran = gd("oran");

$mac_db_id = gd("eventid");

$orantips = "$oran_tip|$oran_val";

$macbilgi = bilgi("select * from canli_maclar_masatenis where eventid='$mac_db_id'");

if($macbilgi['aktif']=="0") { die("2"); }

$mactime = time()+300;

if($macbilgi['gelecek']=="1") {

$canliinfo = "".date("H:i")."|Başlamadan";

} else 

if($macbilgi['devremi']=="1") {

$canliinfo = "$macbilgi[ev_skor]:$macbilgi[konuk_skor]|$macbilgi[period]";

} else {

$canliinfo = "$macbilgi[ev_skor]:$macbilgi[konuk_skor]|$macbilgi[period]";

}

$suan = time();

$mac_timele = strtotime($macbilgi['baslamasaat']);

$kontrol = sed_sql_query("select * from kupon where session_id='$session_id' and spor_tip='canlimt' and canli_event='$macbilgi[eventid]'");

if(sed_sql_numrows($kontrol)<1) {

if(!empty($oran_val) && !empty($oran)) {

$canlimasatenisimbs = userayar('canlimasatenisimbs');

sed_sql_query("insert into kupon (id,mbs,mac_kodu,ev_takim,konuk_takim,mac_db_id,mac_time,mac_time_kontrol,oran_val_id,oran_tip,oran,session_id,spor_tip,oyun_tip,canli_event,canli_info,aktif,ilkgiris) values 

('','$canlimasatenisimbs','CNLMT','$macbilgi[ev_takim]','$macbilgi[konuk_takim]','$macbilgi[id]','$mactime','$mac_timele','$oranvalid','$orantips','".$oran."','$session_id','canlimt','canlimt','$macbilgi[eventid]','$canliinfo','1','$suan')");

die("1");

}

} else {

$kupondaki = sed_sql_fetchassoc($kontrol);

if($kupondaki['oran_tip']==$orantips){

sed_sql_query("delete from kupon where id='$kupondaki[id]' and session_id='$session_id' and oran_tip='$orantips'");

} else {

sed_sql_query("update kupon set oran_val_id='$oranvalid',oran_tip='$orantips',oran='$oran',canli_info='$canliinfo',ilkgiris='$suan' where id='$kupondaki[id]'");

}

die("200");

}

}

if($a=="sporbahisleri"){ 

$futbolsayi = sed_sql_fetchassoc(sed_sql_query("select COUNT(DISTINCT id) AS sayi from program_futbol where mac_time>'".time()."' AND bulten='hititbet'"));
$basketbolsayi = sed_sql_fetchassoc(sed_sql_query("select COUNT(DISTINCT id) AS sayi from program_basketbol where mac_time>'".time()."' AND bulten='hititbet'"));
$tenissayi = sed_sql_fetchassoc(sed_sql_query("select COUNT(DISTINCT id) AS sayi from program_tenis where mac_time>'".time()."' AND bulten='hititbet'"));
$voleybolsayi = sed_sql_fetchassoc(sed_sql_query("select COUNT(DISTINCT id) AS sayi from program_voleybol where mac_time>'".time()."' AND bulten='hititbet'"));
$buzhokeyisayi = sed_sql_fetchassoc(sed_sql_query("select COUNT(DISTINCT id) AS sayi from program_buzhokeyi where mac_time>'".time()."' AND bulten='hititbet'"));
$masatenisisayi = sed_sql_fetchassoc(sed_sql_query("select COUNT(DISTINCT id) AS sayi from program_masatenisi where mac_time>'".time()."' AND bulten='hititbet'"));
$beyzbolsayi = sed_sql_fetchassoc(sed_sql_query("select COUNT(DISTINCT id) AS sayi from program_beyzbol where mac_time>'".time()."' AND bulten='hititbet'"));
$rugbysayi = sed_sql_fetchassoc(sed_sql_query("select COUNT(DISTINCT id) AS sayi from program_rugby where mac_time>'".time()."' AND bulten='hititbet'"));
$dovussayi = sed_sql_fetchassoc(sed_sql_query("select COUNT(DISTINCT id) AS sayi from program_dovus where mac_time>'".time()."' AND bulten='hititbet'"));

?>

<div class="preload2 navitem arrow" onclick="getle('sport99')"> <div class="icon"> <div class="sports soccer"></div> <span class="hidden c "></span> </div> <div class="text"><?=getTranslation('mobilsports5')?></div><div class="value"><div class="count normal "><?=$futbolsayi["sayi"];?></div></div></div>
<? if(userayar('basketbol')=="1") { ?>
<div class="preload2 navitem arrow" onclick="getle('sport2')"> <div class="icon"> <div class="sports basketball"></div> <span class="hidden c "></span> </div> <div class="text"><?=getTranslation('mobilsports6')?></div><div class="value"><div class="count normal "><?=$basketbolsayi["sayi"];?></div></div></div>
<? } ?>
<? if(userayar('tenis')=="1") { ?>
<div class=" navitem arrow" onclick="getle('sport3')"> <div class="icon"> <div class="sports tennis"></div> <span class="hidden c "></span> </div> <div class="text"><?=getTranslation('mobilsports7')?></div><div class="value"><div class="count normal "><?=$tenissayi["sayi"];?></div></div></div>
<? } ?>
<? if(userayar('voleybol')=="1") { ?>
<div class=" navitem arrow" onclick="getle('sport4')"> <div class="icon"> <div class="sports volleyball"></div> <span class="hidden c "></span> </div> <div class="text"><?=getTranslation('mobilsports8')?></div><div class="value"><div class="count normal "><?=$voleybolsayi["sayi"];?></div></div></div>
<? } ?>
<? if(userayar('buzhokeyi')=="1") { ?>
<div class=" navitem arrow" onclick="getle('sport5')"> <div class="icon"> <div class="sports ice-hockey"></div> <span class="hidden c "></span> </div> <div class="text"><?=getTranslation('mobilsports9')?></div><div class="value"><div class="count normal "><?=$buzhokeyisayi["sayi"];?></div></div></div>
<? } ?>
<? if(userayar('masatenisi')=="1") { ?>
<div class=" navitem arrow" onclick="getle('sport9')"> <div class="icon"> <div class="sports table-tennis"></div> <span class="hidden c "></span> </div> <div class="text"><?=getTranslation('yeniyerler_kasa179')?></div><div class="value"><div class="count normal "><?=$masatenisisayi["sayi"];?></div></div></div>
<? } ?>
<? if(userayar('beyzbol')=="1") { ?>
<div class=" navitem arrow" onclick="getle('sport10')"> <div class="icon"> <div class="sports baseball"></div> <span class="hidden c "></span> </div> <div class="text"><?=getTranslation('yeniyerler_kasa197')?></div><div class="value"><div class="count normal "><?=$beyzbolsayi["sayi"];?></div></div></div>
<? } ?>
<? if(userayar('rugby')=="1") { ?>
<div class=" navitem arrow" onclick="getle('sport11')"> <div class="icon"> <div class="sports rugby"></div> <span class="hidden c "></span> </div> <div class="text"><?=getTranslation('yeniyerler_kasa198')?></div><div class="value"><div class="count normal "><?=$rugbysayi["sayi"];?></div></div></div>
<? } ?>
<? if(userayar('dovus')=="1") { ?>
<div class=" navitem arrow" onclick="getle('sport12')"> <div class="icon"> <div class="sports boxing"></div> <span class="hidden c "></span> </div> <div class="text"><?=getTranslation('yeniyerler_kasa199')?></div><div class="value"><div class="count normal "><?=$dovussayi["sayi"];?></div></div></div>
<? } ?>
<div class="contentbottom hidden"> </div>
<div class="spacer">&nbsp;</div>

<? }

if($a=="highlightsmaclar"){

$suan = time();

$kontrol_sql1 = sed_sql_query("select id from program_futbol where mac_time<$suan");
$kontrol_sql2 = sed_sql_query("select id from program_basketbol where mac_time<$suan");
$kontrol_sql3 = sed_sql_query("select id from program_tenis where mac_time<$suan");
$kontrol_sql4 = sed_sql_query("select id from program_voleybol where mac_time<$suan");
$kontrol_sql5 = sed_sql_query("select id from program_buzhokeyi where mac_time<$suan");
$kontrol_sql6 = sed_sql_query("select id from program_masatenisi where mac_time<$suan");
$kontrol_sql7 = sed_sql_query("select id from program_beyzbol where mac_time<$suan");
$kontrol_sql8 = sed_sql_query("select id from program_rugby where mac_time<$suan");
$kontrol_sql9 = sed_sql_query("select id from program_dovus where mac_time<$suan");

while($row1=sed_sql_fetcharray($kontrol_sql1)) {
sed_sql_query("delete from oranlar_futbol where mac_db_id='$row1[id]'");
sed_sql_query("delete from program_futbol where id='$row1[id]'");
sed_sql_query("delete from maclar_oranlar where mac_db_id='$row1[id]' and spor_tipi='futbol'");
}
while($row2=sed_sql_fetcharray($kontrol_sql2)) {
sed_sql_query("delete from oranlar_basketbol where mac_db_id='$row2[id]'");
sed_sql_query("delete from program_basketbol where id='$row2[id]'");
sed_sql_query("delete from maclar_oranlar where mac_db_id='$row2[id]' and spor_tipi='basketbol'");
}
while($row3=sed_sql_fetcharray($kontrol_sql3)) {
sed_sql_query("delete from oranlar_tenis where mac_db_id='$row3[id]'");
sed_sql_query("delete from program_tenis where id='$row3[id]'");
sed_sql_query("delete from maclar_oranlar where mac_db_id='$row3[id]' and spor_tipi='tenis'");
}
while($row4=sed_sql_fetcharray($kontrol_sql4)) {
sed_sql_query("delete from oranlar_voleybol where mac_db_id='$row4[id]'");
sed_sql_query("delete from program_voleybol where id='$row4[id]'");
}
while($row5=sed_sql_fetcharray($kontrol_sql5)) {
sed_sql_query("delete from oranlar_buzhokeyi where mac_db_id='$row5[id]'");
sed_sql_query("delete from program_buzhokeyi where id='$row5[id]'");
}
while($row6=sed_sql_fetcharray($kontrol_sql6)) {
sed_sql_query("delete from program_masatenisi where id='$row6[id]'");
}
while($row7=sed_sql_fetcharray($kontrol_sql7)) {
sed_sql_query("delete from program_beyzbol where id='$row7[id]'");
}
while($row8=sed_sql_fetcharray($kontrol_sql8)) {
sed_sql_query("delete from program_rugby where id='$row8[id]'");
}
while($row9=sed_sql_fetcharray($kontrol_sql9)) {
sed_sql_query("delete from program_dovus where id='$row9[id]'");
}

$ulke = gd("ulke");

$do_cache = 1;
$mikro = microtime();

if(!empty($ulke)) { $ulke_ekle = "and kupa_ulke='$ulke'"; } else { $ulke_ekle = ""; }

$sasi=0;

$gizli_ligler = gizli_lig_list();

$gizli_maclar = gizli_mac_list();

if($gizli_ligler=="") { $gizli_lig_ekle = ""; } else { $gizli_lig_ekle = "and ulkeadi not in ($gizli_ligler)"; }

if($gizli_maclar=="") { $gizli_mac_ekle = ""; } else { $gizli_mac_ekle = "and id not in ($gizli_maclar)"; } 

$gizli_ekle = "$gizli_lig_ekle $gizli_mac_ekle";

/* yasak kelimeler */ 
$whereyasak ="";
$sec = "SELECT * FROM yasak_kelimeler WHERE user_id IN (1,".$_SESSION['betuser'].",".implode(",", $_SESSION['ustler']).")";
$sor = sed_sql_query($sec);
while($r = sed_sql_fetchassoc($sor)) {
$whereyasak.= ' AND ev_takim not like "%'.$r['kelime'].'%" AND konuk_takim not like "%'.$r['kelime'].'%" ';
}
/* yasak kelimeler */

$kayittime_ver = $suan-300;
$sqladder = "and kayittime<$kayittime_ver and bulten='hititbet' $gizli_ekle and kupa_isim not like '%Duello%' {$whereyasak} and aktif='1'";
$sor = sed_sql_query("select * from program_futbol where id!='' $sqladder order by mac_time asc LIMIT 10");

?>

<div class="navtitle navsub ">
<div class="tlsubitem">
<div class="icon"><div class="sports_small soccer"></div> </div>
<div class="text"><?=ulkeismiduzenleme($row["kupa_ulke"]);?></div>
</div>
</div>

<?

$say=1;
while($row=sed_sql_fetcharray($sor)) { 
$say++;

$ev_kazanc = oranbulxxx_futbol($row['id'],1);

$beraberlik = oranbulxxx_futbol($row['id'],2);

$konuk_kazanc = oranbulxxx_futbol($row['id'],3);

$mbs = mbsver($row['id'],$row['mbs'],$row['kupa_id']);

$encoded = "$row[id]|$row[ev_takim]|$row[konuk_takim]|$row[mac_kodu]|$mbs|$row[mac_time]|futbol";
$datetime_ver = date("d.m H:i",$row['mac_time']);
$datetime_ver2 = date("d.m",$row['mac_time']);
$bugun_tarih_ver = date("d.m");
$yarin_tarih_ver = date("d.m",strtotime('+1 day'));
if($datetime_ver2==$bugun_tarih_ver){
	$tarihle = "Bugün";
} else if($datetime_ver2==$yarin_tarih_ver){
	$tarihle = "Yarın";
} else {
	$tarihle = $datetime_ver;
}
?>

<div class="<? if ($say %2 != 0){ ?>even<? }else{ ?>odd<? } ?>">
<div id="e<?=$row["id"];?>" class="event match " onclick="detaygetir('1','<?=$row["id"];?>');">
<div class="">
<div colspan="11" class="c_comment">
<div class="c_comment"></div>
<div class="c_pointer"></div>
</div>
</div>
<div class="event_wrapper">
<div class="datetime ">
<div class="sportsIcon ">
<div class="icon">
<div class="sports soccer"></div>
</div>
</div>
<div class="date small ">
<div> <?=$tarihle; ?> </div>
<img src="assets/img/live_rain.png" alt="" width="23" height="23" class="hidden">
<span class=""> <img src="assets/img/icon_top.png" alt="" width="24" height="12"> </span>
</div>
</div>
<div class="teamrows">
<div class="teamrow">
<div class="team"> <?=$row["ev_takim"];?>  </div>
<div class="score">
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
</div>
</div>
<div class="teamrow">
<div class="team"> <?=$row["konuk_takim"];?>  </div>
<div class="score">
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
</div>
</div>
</div>
<div class=""> <div class="count"> <?=getTranslation('exportmbs')?> <?=$mbs;?> </div></div>
<div class="hidden" onclick="toggleBetMatrix(event, 9492123)"></div>
<div class="arrow "></div>
</div>
</div>
</div>

<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w25"><?=getTranslation('exportmacsonucutahmin')?></div>
<div class="cell w25 rsBut"><div class="<?=$row["mac_kodu"];?> qbutton l" oddsid="<?=$row["mac_kodu"];?>1" onClick="kupon(<?=$row["mac_kodu"];?>1,<?=$row["mac_kodu"];?>,'<?=codekupon("$encoded|1|$ev_kazanc"); ?>', this);"> <div class="caption">1</div> <div class="quote"><?=$ev_kazanc;?></div></div></div>
<div class="cell w25 rsBut"><div class="<?=$row["mac_kodu"];?> qbutton m" oddsid="<?=$row["mac_kodu"];?>2" onClick="kupon(<?=$row["mac_kodu"];?>2,<?=$row["mac_kodu"];?>,'<?=codekupon("$encoded|2|$beraberlik"); ?>', this);"> <div class="caption">X</div> <div class="quote"><?=$beraberlik;?></div></div></div>
<div class="cell w25 rsBut"> <div class="<?=$row["mac_kodu"];?> qbutton s" oddsid="<?=$row["mac_kodu"];?>3" onClick="kupon(<?=$row["mac_kodu"];?>3,<?=$row["mac_kodu"];?>,'<?=codekupon("$encoded|3|$konuk_kazanc"); ?>', this);"> <div class="caption">2</div> <div class="quote"><?=$konuk_kazanc;?></div></div></div>
<div class=""> </div>
</div>
<? } ?>

<?

$sor = sed_sql_query("select oran_val_id,mac_kodu from kupon where session_id='$session_id' and spor_tip='futbol'");

while($row=sed_sql_fetcharray($sor)) { ?>

<script>
$("div[oddsid='<?=$row['mac_kodu'];?><?=$row['oran_val_id'];?>']").addClass('selected');
</script>

<? }

}

if($a=="futbolfavoriulkeler") {

$do_cache = 1;
$mikro = microtime();

$sasi=0;

$gizli_ligler = gizli_lig_list();

$gizli_maclar = gizli_mac_list();

if($gizli_ligler=="") { $gizli_lig_ekle = ""; } else { $gizli_lig_ekle = "and ulkeadi not in ($gizli_ligler)"; }

if($gizli_maclar=="") { $gizli_mac_ekle = ""; } else { $gizli_mac_ekle = "and id not in ($gizli_maclar)"; } 

$gizli_ekle = "$gizli_lig_ekle $gizli_mac_ekle";

$sqladder = "and bulten='hititbet' $gizli_ekle and kupa_isim not like '%Duello%' and aktif='1'";

$orderduzen = "FIELD(kupa_ulke, 'İtalya','Fransa','İspanya','İngiltere','Almanya','Türkiye') DESC";

$sor = sed_sql_query("select * from program_futbol where id!='' and kupa_ulke IN ('Türkiye','İngiltere','İspanya','Almanya','İtalya','Fransa') $sqladder group by kupa_isim  order by {$orderduzen}");

if(sed_sql_numrows($sor)<1) { die("<div style='text-align: center;font-weight: bold;'>".getTranslation('exportmusabakabulunmadi')."</div>"); }

$say=1;
while($row=sed_sql_fetcharray($sor)) { 
$say++;
?>

<div class="navtitle navsub ">
<div class="tlsubitem">
<div class="icon"><div class="sports_small soccer"></div> </div>
<div class="text"><?=$row['kupa_ulke'];?>-<?=$row['kupa_isim'];?></div>
</div>
</div>

<?

$i = 1;
unset($ss);
unset($ass);
$ss = sed_sql_query("select * from program_futbol where id!='' $sqladder and kupa_isim='$row[kupa_isim]' order by mac_time asc ");
while($ass=sed_sql_fetcharray($ss)){
$i++;

$ev_kazanc = oranbul($ass['id'],1);

$beraberlik = oranbul($ass['id'],2);

$konuk_kazanc = oranbul($ass['id'],3);

$mbs = mbsver($ass['id'],$ass['mbs'],$ass['kupa_id']);

$encoded = "$ass[id]|$ass[ev_takim]|$ass[konuk_takim]|$ass[mac_kodu]|$mbs|$ass[mac_time]|futbol";
?>

<div class="<? if ($i %2 != 0){ ?>even<? }else{ ?>odd<? } ?>">
<div id="e9492123" class="event match " onclick="go('sports/event/getodds/1/9492123'); app.fromEventId = window.scrollY > 0 ? 9492123 : null;">
<div class="">
<div colspan="11" class="c_comment">
<div class="c_comment"></div>
<div class="c_pointer"></div>
</div>
</div>
<div class="event_wrapper">
<div class="datetime ">
<div class="sportsIcon ">
<div class="icon">
<div class="sports soccer"></div>
</div>
</div>
<div class="date small ">
<div> <?=date("d.m H:i",$ass['mac_time']); ?> </div>
<img src="assets/img/live_rain.png" alt="" width="23" height="23" class="hidden">
<span class=""> <img src="assets/img/icon_top.png" alt="" width="24" height="12"> </span>
</div>
</div>
<div class="teamrows">
<div class="teamrow">
<div class="team"> <?=$ass["ev_takim"];?>  </div>
<div class="score">
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
</div>
</div>
<div class="teamrow">
<div class="team"> <?=$ass["konuk_takim"];?>  </div>
<div class="score">
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
</div>
</div>
</div>
<div class=""> <div class="count"> <?=getTranslation('exportmbs')?> <?=$mbs;?> </div></div>
<div class="hidden" onclick="toggleBetMatrix(event, 9492123)"></div>
<div class="arrow "></div>
</div>
</div>
</div>

<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w25"><?=getTranslation('exportmacsonucutahmin')?></div>
<div class="cell w25 rsBut"> <div class="<?=$ass["id"];?> qbutton l" oddsid="<?=$ass["id"];?>1" onclick="kupon(<?=$ass["id"];?>1,<?=$ass["id"];?>,'<?=codekupon("$encoded|1|$ev_kazanc"); ?>', this);"> <div class="caption">1</div> <div class="quote"><?=$ev_kazanc;?></div></div></div>
<div class="cell w25 rsBut"> <div class="<?=$ass["id"];?> qbutton m" oddsid="<?=$ass["id"];?>2" onclick="kupon(<?=$ass["id"];?>2,<?=$ass["id"];?>,'<?=codekupon("$encoded|2|$beraberlik"); ?>', this);"> <div class="caption">X</div> <div class="quote"><?=$beraberlik;?></div></div> </div>
<div class="cell w25 rsBut"> <div class="<?=$ass["id"];?> qbutton s" oddsid="<?=$ass["id"];?>3" onclick="kupon(<?=$ass["id"];?>3,<?=$ass["id"];?>,'<?=codekupon("$encoded|3|$konuk_kazanc"); ?>', this);"> <div class="caption">2</div> <div class="quote"><?=$konuk_kazanc;?></div></div></div>

<div class=""> </div>
</div>
</div>

<? } ?>

<? } ?>

<?

$sor = sed_sql_query("select oran_val_id,mac_db_id from kupon where session_id='$session_id' and spor_tip='futbol'");

while($row=sed_sql_fetcharray($sor)) { ?>

<script>
$("div[oddsid='<?=$row['mac_db_id'];?><?=$row['oran_val_id'];?>']").addClass('selected');
</script>

<? }

}

if($a=="futbolbugun") {

$do_cache = 1;
$mikro = microtime();

$sasi=0;

$tarih = date("d.m.y");

$gizli_ligler = gizli_lig_list();

$gizli_maclar = gizli_mac_list();

if($gizli_ligler=="") { $gizli_lig_ekle = ""; } else { $gizli_lig_ekle = "and ulkeadi not in ($gizli_ligler)"; }

if($gizli_maclar=="") { $gizli_mac_ekle = ""; } else { $gizli_mac_ekle = "and id not in ($gizli_maclar)"; } 

$gizli_ekle = "$gizli_lig_ekle $gizli_mac_ekle";

$order = "FIELD(kupa_ulke,'Dünya','Faroe Adaları','Suriye','Macaristan','Montenegro','Yunanistan','Ermenistan','İzlanda','Estonya','Sırbistan','Filistin','Güney Kore','Slovenya','İsrail','Beyaz Rusya','Vietnam','Bulgaristan','Hırvatistan','Kosova','Kosova (Kosova)','Portekiz','Avusturya','Slovakya','Litvanya','Türkmenistan','Ukrayna','Polonya','Rusya','Romanya','Finlandiya','Çek Cumhuriyeti','Polanya','Isvec','Danimarka','Hollanda','Fransa','Italya','Ispanya','İngiltere','Almanya','Turkiye') DESC";

$order2 = "FIELD(kupa_isim,'Bundesliga','2. Bundesliga','3. Liga','Bundesliga - Eşzamanlı özel bahisler','2. Bundesliga konferans - Özel bahisler','LaLiga','LaLiga2','Superligaen','1. Division','Kakkonen A','Kakkonen B','Kakkonen C','I Liga','II Liga','V-League','V-League 2','Premier League','National League','K League 1','K League 2') ASC";

$sqladder = "and bulten='hititbet' and mac_tarih='$tarih' $gizli_ekle and kupa_isim not like '%Duello%' and aktif='1'";
$sor = sed_sql_query("select * from program_futbol where id!='' $sqladder group by ulkeadi  order by {$order},{$order2}");

if(userayar('sporbulten')==0) { echo "<div style='text-align: center;font-weight: bold;'>".getTranslation('yeniyerler_kasa364')."</div>"; } else {

if(sed_sql_numrows($sor)<1) { die("<div style='text-align: center;font-weight: bold;'>".getTranslation('exportmusabakabulunmadi')."</div>"); }

$say=1;
while($row=sed_sql_fetcharray($sor)) { 
$say++;
?>

<div class="navtitle navsub ">
<div class="tlsubitem">
<div class="icon"><span class="sports_small countryIconmain c<?=$row['bayrak'];?> "></span> </div>
<div class="text"><?=$row['kupa_ulke'];?>-<?=$row['kupa_isim'];?></div>
</div>
</div>

<?

$i = 1;
unset($ss);
unset($ass);
$ss = sed_sql_query("select * from program_futbol where id!='' $sqladder and ulkeadi='$row[ulkeadi]' order by mac_time asc ");
while($ass=sed_sql_fetcharray($ss)){
$i++;

$ev_kazanc = oranbul($ass['id'],1);

$beraberlik = oranbul($ass['id'],2);

$konuk_kazanc = oranbul($ass['id'],3);

$mbs = mbsver($ass['id'],$ass['mbs'],$ass['kupa_id']);

$encoded = "$ass[id]|$ass[ev_takim]|$ass[konuk_takim]|$ass[mac_kodu]|$mbs|$ass[mac_time]|futbol";
?>

<div class="<? if ($i %2 != 0){ ?>even<? }else{ ?>odd<? } ?>">
<div id="e<?=$ass["id"];?>" class="event match " onclick="detaygetir('1','<?=$ass["id"];?>');">
<div class="">
<div colspan="11" class="c_comment">
<div class="c_comment"></div>
<div class="c_pointer"></div>
</div>
</div>
<div class="event_wrapper">
<div class="datetime ">
<div class="sportsIcon ">
<div class="icon">
<div class="sports soccer"></div>
</div>
</div>
<div class="date small ">
<div> <?=date("d.m H:i",$ass['mac_time']); ?> </div>
<img src="assets/img/live_rain.png" alt="" width="23" height="23" class="hidden">
<span class=""> <img src="assets/img/icon_top.png" alt="" width="24" height="12"> </span>
</div>
</div>
<div class="teamrows">
<div class="teamrow">
<div class="team"> <?=$ass["ev_takim"];?>  </div>
<div class="score">
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
</div>
</div>
<div class="teamrow">
<div class="team"> <?=$ass["konuk_takim"];?>  </div>
<div class="score">
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
</div>
</div>
</div>
<div class=""> <div class="count"> <?=getTranslation('exportmbs')?> <?=$mbs;?> </div></div>
<div class="hidden" onclick="toggleBetMatrix(event, 9492123)"></div>
<div class="arrow "></div>
</div>
</div>
</div>

<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w25"><?=getTranslation('exportmacsonucutahmin')?></div>
<div class="cell w25 rsBut"> <div class="<?=$ass["mac_kodu"];?> qbutton l" oddsid="<?=$ass["mac_kodu"];?>1" onclick="kupon(<?=$ass["mac_kodu"];?>1,<?=$ass["mac_kodu"];?>,'<?=codekupon("$encoded|1|$ev_kazanc"); ?>', this);"> <div class="caption">1</div> <div class="quote"><?=$ev_kazanc;?></div></div></div>
<div class="cell w25 rsBut"> <div class="<?=$ass["mac_kodu"];?> qbutton m" oddsid="<?=$ass["mac_kodu"];?>2" onclick="kupon(<?=$ass["mac_kodu"];?>2,<?=$ass["mac_kodu"];?>,'<?=codekupon("$encoded|2|$beraberlik"); ?>', this);"> <div class="caption">X</div> <div class="quote"><?=$beraberlik;?></div></div> </div>
<div class="cell w25 rsBut"> <div class="<?=$ass["mac_kodu"];?> qbutton s" oddsid="<?=$ass["mac_kodu"];?>3" onclick="kupon(<?=$ass["mac_kodu"];?>3,<?=$ass["mac_kodu"];?>,'<?=codekupon("$encoded|3|$konuk_kazanc"); ?>', this);"> <div class="caption">2</div> <div class="quote"><?=$konuk_kazanc;?></div></div></div>

<div class=""> </div>
</div>
</div>

<? } ?>

<? } ?>

<? } ?>

<?

$sor = sed_sql_query("select oran_val_id,mac_kodu from kupon where session_id='$session_id' and spor_tip='futbol'");

while($row=sed_sql_fetcharray($sor)) { ?>

<script>
$("div[oddsid='<?=$row['mac_kodu'];?><?=$row['oran_val_id'];?>']").addClass('selected');
</script>

<? }

}



if($a=="futbolulkeler") {

$suan = time();

$do_cache = 1;
$mikro = microtime();

$sasi=0;

$tarih = date("d.m.y");

$gizli_ligler = gizli_lig_list();

$gizli_maclar = gizli_mac_list();

if($gizli_ligler=="") { $gizli_lig_ekle = ""; } else { $gizli_lig_ekle = "and ulkeadi not in ($gizli_ligler)"; }

if($gizli_maclar=="") { $gizli_mac_ekle = ""; } else { $gizli_mac_ekle = "and id not in ($gizli_maclar)"; } 

$gizli_ekle = "$gizli_lig_ekle $gizli_mac_ekle";

/* yasak kelimeler */ 
$whereyasak ="";
$sec = "SELECT * FROM yasak_kelimeler WHERE user_id IN (1,".$_SESSION['betuser'].",".implode(",", $_SESSION['ustler']).")";
$sor = sed_sql_query($sec);
while($r = sed_sql_fetchassoc($sor)) {
$whereyasak.= ' AND ev_takim not like "%'.$r['kelime'].'%" AND konuk_takim not like "%'.$r['kelime'].'%" ';
}
/* yasak kelimeler */
$kayittime_ver = $suan-300;

$order = "FIELD(kupa_ulke,'Dünya','Faroe Adaları','Suriye','Macaristan','Montenegro','Yunanistan','Ermenistan','İzlanda','Estonya','Sırbistan','Filistin','Güney Kore','Slovenya','İsrail','Beyaz Rusya','Vietnam','Bulgaristan','Hırvatistan','Kosova','Kosova (Kosova)','Portekiz','Avusturya','Slovakya','Litvanya','Türkmenistan','Ukrayna','Polonya','Rusya','Romanya','Finlandiya','Çek Cumhuriyeti','Polanya','Isvec','Danimarka','Hollanda','Fransa','Italya','Ispanya','İngiltere','Almanya','Turkiye') DESC";

$sqladder = "and kayittime<$kayittime_ver and bulten='hititbet' and mac_time>'".time()."' $gizli_ekle and kupa_isim not like '%Duello%' {$whereyasak} and aktif='1'";
$sor = sed_sql_query("select * from program_futbol where id!='' $sqladder group by kupa_ulke  order by {$order}");

if(sed_sql_numrows($sor)<1) { die("<div style='text-align: center;font-weight: bold;'>".getTranslation('exportmusabakabulunmadi')."</div>"); }

$say=1;
while($row=sed_sql_fetcharray($sor)) { 
$say++;
$ulketoplami = sed_sql_fetchassoc(sed_sql_query("select COUNT(DISTINCT id) AS sayi from program_futbol where kupa_ulke='".$row['kupa_ulke']."' and mac_time>'".time()."' AND bulten='hititbet'"));
?>

<div class=" navitem arrow" onclick="getle('sport1?ulke=<?=$row['kupa_ulke'];?>')"> <div class="icon">  <span class="countryIconmain c<?=$row['bayrak'];?> "></span> </div> <div class="text"><?=ulkeismiduzenleme($row["kupa_ulke"]);?></div><div class="value"><div class="count normal "><?=$ulketoplami['sayi'];?></div></div></div>

<? } ?>

<? }

if($a=="basketbolulkeler") {

$suan = time();

$do_cache = 1;
$mikro = microtime();

$sasi=0;

$tarih = date("d.m.y");

$gizli_ligler = gizli_lig_listb();

$gizli_maclar = gizli_mac_listb();

if($gizli_ligler=="") { $gizli_lig_ekle = ""; } else { $gizli_lig_ekle = "and ulkeadi not in ($gizli_ligler)"; }

if($gizli_maclar=="") { $gizli_mac_ekle = ""; } else { $gizli_mac_ekle = "and id not in ($gizli_maclar)"; } 

$gizli_ekle = "$gizli_lig_ekle $gizli_mac_ekle";

/* yasak kelimeler */ 
$whereyasak ="";
$sec = "SELECT * FROM yasak_kelimeler WHERE user_id IN (1,".$_SESSION['betuser'].",".implode(",", $_SESSION['ustler']).")";
$sor = sed_sql_query($sec);
while($r = sed_sql_fetchassoc($sor)) {
$whereyasak.= ' AND ev_takim not like "%'.$r['kelime'].'%" AND konuk_takim not like "%'.$r['kelime'].'%" ';
}
/* yasak kelimeler */
$kayittime_ver = $suan-300;

$order = "FIELD(kupa_ulke,'Dünya','Faroe Adaları','Suriye','Macaristan','Montenegro','Yunanistan','Ermenistan','İzlanda','Estonya','Sırbistan','Filistin','Güney Kore','Slovenya','İsrail','Beyaz Rusya','Vietnam','Bulgaristan','Hırvatistan','Kosova','Kosova (Kosova)','Portekiz','Avusturya','Slovakya','Litvanya','Türkmenistan','Ukrayna','Polonya','Rusya','Romanya','Finlandiya','Çek Cumhuriyeti','Polanya','Isvec','Danimarka','Hollanda','Fransa','Italya','Ispanya','İngiltere','Almanya','Turkiye') DESC";

$sqladder = "AND (kimkazanir!='0' or 1x2!='0' or handikap!='0' or altust!='0') and kayittime<$kayittime_ver and bulten='hititbet' and mac_time>'".time()."' $gizli_ekle and kupa_isim not like '%Duello%' {$whereyasak} and aktif='1'";
$sor = sed_sql_query("select * from program_basketbol where id!='' $sqladder group by kupa_ulke  order by {$order}");

if(sed_sql_numrows($sor)<1) { die("<div style='text-align: center;font-weight: bold;'>".getTranslation('exportmusabakabulunmadi')."</div>"); }

$say=1;
while($row=sed_sql_fetcharray($sor)) { 
$say++;
$ulketoplami = sed_sql_fetchassoc(sed_sql_query("select COUNT(DISTINCT id) AS sayi from program_basketbol where kupa_ulke='".$row['kupa_ulke']."' and mac_time>'".time()."' AND bulten='hititbet' AND (kimkazanir!='0' or 1x2!='0' or handikap!='0' or altust!='0')"));
?>

<div class=" navitem arrow" onclick="getle('sport7?ulke=<?=$row['kupa_ulke'];?>')"> <div class="icon">  <span class="countryIconmain c<?=$row['bayrak'];?> "></span> </div> <div class="text"><?=ulkeismiduzenleme($row["kupa_ulke"]);?></div><div class="value"><div class="count normal "><?=$ulketoplami['sayi'];?></div></div></div>

<? } ?>

<? }

if($a=="tenisulkeler") {

$suan = time();

$do_cache = 1;
$mikro = microtime();

$sasi=0;

$tarih = date("d.m.y");

$gizli_ligler = gizli_lig_listt();

if($gizli_ligler=="") { $gizli_lig_ekle = ""; } else { $gizli_lig_ekle = "and ulkeadi not in ($gizli_ligler)"; }

$gizli_ekle = "$gizli_lig_ekle";

/* yasak kelimeler */ 
$whereyasak ="";
$sec = "SELECT * FROM yasak_kelimeler WHERE user_id IN (1,".$_SESSION['betuser'].",".implode(",", $_SESSION['ustler']).")";
$sor = sed_sql_query($sec);
while($r = sed_sql_fetchassoc($sor)) {
$whereyasak.= ' AND ev_takim not like "%'.$r['kelime'].'%" AND konuk_takim not like "%'.$r['kelime'].'%" ';
}
/* yasak kelimeler */
$kayittime_ver = $suan-300;

$order = "FIELD(kupa_ulke,'Dünya','Faroe Adaları','Suriye','Macaristan','Montenegro','Yunanistan','Ermenistan','İzlanda','Estonya','Sırbistan','Filistin','Güney Kore','Slovenya','İsrail','Beyaz Rusya','Vietnam','Bulgaristan','Hırvatistan','Kosova','Kosova (Kosova)','Portekiz','Avusturya','Slovakya','Litvanya','Türkmenistan','Ukrayna','Polonya','Rusya','Romanya','Finlandiya','Çek Cumhuriyeti','Polanya','Isvec','Danimarka','Hollanda','Fransa','Italya','Ispanya','İngiltere','Almanya','Turkiye') DESC";

$sqladder = "AND (kimkazanir!='0' or setbahisi!='0') and kayittime<$kayittime_ver and bulten='hititbet' and mac_time>'".time()."' $gizli_ekle and kupa_isim not like '%Duello%' {$whereyasak} and aktif='1'";
$sor = sed_sql_query("select * from program_tenis where id!='' $sqladder group by kupa_isim  order by kupa_id ASC");

if(sed_sql_numrows($sor)<1) { die("<div style='text-align: center;font-weight: bold;'>".getTranslation('exportmusabakabulunmadi')."</div>"); }

$say=1;
while($row=sed_sql_fetcharray($sor)) { 
$say++;
$ulketoplami = sed_sql_fetchassoc(sed_sql_query("select COUNT(DISTINCT id) AS sayi from program_tenis where kupa_isim='".$row['kupa_isim']."' and mac_time>'".time()."' AND bulten='hititbet' AND (kimkazanir!='0' or setbahisi!='0')"));

$lig_isim_kisalt = substr($row['kupa_isim'],0,30);

?>

<div class=" navitem arrow" onclick="getle('sport8?lig=<?=$row['kupa_id'];?>')"> <div class="text"><?=$lig_isim_kisalt;?></div><div class="value"><div class="count normal "><?=$ulketoplami['sayi'];?></div></div></div>

<? } ?>

<? }

if($a=="voleybolulkeler") {

$suan = time();

$do_cache = 1;
$mikro = microtime();

$sasi=0;

$tarih = date("d.m.y");

$gizli_ligler = gizli_lig_listv();

if($gizli_ligler=="") { $gizli_lig_ekle = ""; } else { $gizli_lig_ekle = "and ulkeadi not in ($gizli_ligler)"; }

$gizli_ekle = "$gizli_lig_ekle";

/* yasak kelimeler */ 
$whereyasak ="";
$sec = "SELECT * FROM yasak_kelimeler WHERE user_id IN (1,".$_SESSION['betuser'].",".implode(",", $_SESSION['ustler']).")";
$sor = sed_sql_query($sec);
while($r = sed_sql_fetchassoc($sor)) {
$whereyasak.= ' AND ev_takim not like "%'.$r['kelime'].'%" AND konuk_takim not like "%'.$r['kelime'].'%" ';
}
/* yasak kelimeler */
$kayittime_ver = $suan-300;

$order = "FIELD(kupa_ulke,'Dünya','Faroe Adaları','Suriye','Macaristan','Montenegro','Yunanistan','Ermenistan','İzlanda','Estonya','Sırbistan','Filistin','Güney Kore','Slovenya','İsrail','Beyaz Rusya','Vietnam','Bulgaristan','Hırvatistan','Kosova','Kosova (Kosova)','Portekiz','Avusturya','Slovakya','Litvanya','Türkmenistan','Ukrayna','Polonya','Rusya','Romanya','Finlandiya','Çek Cumhuriyeti','Polanya','Isvec','Danimarka','Hollanda','Fransa','Italya','Ispanya','İngiltere','Almanya','Turkiye') DESC";

$sqladder = "and kayittime<$kayittime_ver and bulten='hititbet' and mac_time>'".time()."' $gizli_ekle and kupa_isim not like '%Duello%' {$whereyasak} and aktif='1'";
$sor = sed_sql_query("select * from program_voleybol where id!='' $sqladder group by kupa_ulke  order by kupa_id ASC");

if(sed_sql_numrows($sor)<1) { die("<div style='text-align: center;font-weight: bold;'>".getTranslation('exportmusabakabulunmadi')."</div>"); }

$say=1;
while($row=sed_sql_fetcharray($sor)) { 
$say++;
$ulketoplami = sed_sql_fetchassoc(sed_sql_query("select COUNT(DISTINCT id) AS sayi from program_voleybol where kupa_isim='".$row['kupa_isim']."' and mac_time>'".time()."' AND bulten='hititbet'"));

?>

<div class=" navitem arrow" onclick="getle('sport44?ulke=<?=$row['kupa_ulke'];?>')"> <div class="icon">  <span class="countryIconmain c<?=$row['bayrak'];?> "></span> </div> <div class="text"><?=ulkeismiduzenleme($row["kupa_ulke"]);?></div><div class="value"><div class="count normal "><?=$ulketoplami['sayi'];?></div></div></div>

<? } ?>

<? }

if($a=="buzhokeyiulkeler") {

$suan = time();

$do_cache = 1;
$mikro = microtime();

$sasi=0;

$tarih = date("d.m.y");

$gizli_ligler = gizli_lig_listv();

if($gizli_ligler=="") { $gizli_lig_ekle = ""; } else { $gizli_lig_ekle = "and ulkeadi not in ($gizli_ligler)"; }

$gizli_ekle = "$gizli_lig_ekle";

/* yasak kelimeler */ 
$whereyasak ="";
$sec = "SELECT * FROM yasak_kelimeler WHERE user_id IN (1,".$_SESSION['betuser'].",".implode(",", $_SESSION['ustler']).")";
$sor = sed_sql_query($sec);
while($r = sed_sql_fetchassoc($sor)) {
$whereyasak.= ' AND ev_takim not like "%'.$r['kelime'].'%" AND konuk_takim not like "%'.$r['kelime'].'%" ';
}
/* yasak kelimeler */
$kayittime_ver = $suan-300;

$order = "FIELD(kupa_ulke,'Dünya','Faroe Adaları','Suriye','Macaristan','Montenegro','Yunanistan','Ermenistan','İzlanda','Estonya','Sırbistan','Filistin','Güney Kore','Slovenya','İsrail','Beyaz Rusya','Vietnam','Bulgaristan','Hırvatistan','Kosova','Kosova (Kosova)','Portekiz','Avusturya','Slovakya','Litvanya','Türkmenistan','Ukrayna','Polonya','Rusya','Romanya','Finlandiya','Çek Cumhuriyeti','Polanya','Isvec','Danimarka','Hollanda','Fransa','Italya','Ispanya','İngiltere','Almanya','Turkiye') DESC";

$sqladder = "and kayittime<$kayittime_ver and bulten='hititbet' and mac_time>'".time()."' $gizli_ekle and kupa_isim not like '%Duello%' {$whereyasak} and aktif='1'";
$sor = sed_sql_query("select * from program_buzhokeyi where id!='' $sqladder group by kupa_ulke  order by kupa_id ASC");

if(sed_sql_numrows($sor)<1) { die("<div style='text-align: center;font-weight: bold;'>".getTranslation('exportmusabakabulunmadi')."</div>"); }

$say=1;
while($row=sed_sql_fetcharray($sor)) { 
$say++;
$ulketoplami = sed_sql_fetchassoc(sed_sql_query("select COUNT(DISTINCT id) AS sayi from program_buzhokeyi where kupa_isim='".$row['kupa_isim']."' and mac_time>'".time()."' AND bulten='hititbet'"));

?>

<div class=" navitem arrow" onclick="getle('sport55?ulke=<?=$row['kupa_ulke'];?>')"> <div class="icon">  <span class="countryIconmain c<?=$row['bayrak'];?> "></span> </div> <div class="text"><?=ulkeismiduzenleme($row["kupa_ulke"]);?></div><div class="value"><div class="count normal "><?=$ulketoplami['sayi'];?></div></div></div>

<? } ?>

<? }

if($a=="futbolbulten") {

$suan = time();

$kontrol_sql1 = sed_sql_query("select id from program_futbol where mac_time<$suan");
$kontrol_sql2 = sed_sql_query("select id from program_basketbol where mac_time<$suan");
$kontrol_sql3 = sed_sql_query("select id from program_tenis where mac_time<$suan");
$kontrol_sql4 = sed_sql_query("select id from program_voleybol where mac_time<$suan");
$kontrol_sql5 = sed_sql_query("select id from program_buzhokeyi where mac_time<$suan");
$kontrol_sql6 = sed_sql_query("select id from program_masatenisi where mac_time<$suan");
$kontrol_sql7 = sed_sql_query("select id from program_beyzbol where mac_time<$suan");
$kontrol_sql8 = sed_sql_query("select id from program_rugby where mac_time<$suan");
$kontrol_sql9 = sed_sql_query("select id from program_dovus where mac_time<$suan");

while($row1=sed_sql_fetcharray($kontrol_sql1)) {
sed_sql_query("delete from oranlar_futbol where mac_db_id='$row1[id]'");
sed_sql_query("delete from program_futbol where id='$row1[id]'");
sed_sql_query("delete from maclar_oranlar where mac_db_id='$row1[id]' and spor_tipi='futbol'");
}
while($row2=sed_sql_fetcharray($kontrol_sql2)) {
sed_sql_query("delete from oranlar_basketbol where mac_db_id='$row2[id]'");
sed_sql_query("delete from program_basketbol where id='$row2[id]'");
sed_sql_query("delete from maclar_oranlar where mac_db_id='$row2[id]' and spor_tipi='basketbol'");
}
while($row3=sed_sql_fetcharray($kontrol_sql3)) {
sed_sql_query("delete from oranlar_tenis where mac_db_id='$row3[id]'");
sed_sql_query("delete from program_tenis where id='$row3[id]'");
sed_sql_query("delete from maclar_oranlar where mac_db_id='$row3[id]' and spor_tipi='tenis'");
}
while($row4=sed_sql_fetcharray($kontrol_sql4)) {
sed_sql_query("delete from oranlar_voleybol where mac_db_id='$row4[id]'");
sed_sql_query("delete from program_voleybol where id='$row4[id]'");
}
while($row5=sed_sql_fetcharray($kontrol_sql5)) {
sed_sql_query("delete from oranlar_buzhokeyi where mac_db_id='$row5[id]'");
sed_sql_query("delete from program_buzhokeyi where id='$row5[id]'");
}
while($row6=sed_sql_fetcharray($kontrol_sql6)) {
sed_sql_query("delete from program_masatenisi where id='$row6[id]'");
}
while($row7=sed_sql_fetcharray($kontrol_sql7)) {
sed_sql_query("delete from program_beyzbol where id='$row7[id]'");
}
while($row8=sed_sql_fetcharray($kontrol_sql8)) {
sed_sql_query("delete from program_rugby where id='$row8[id]'");
}
while($row9=sed_sql_fetcharray($kontrol_sql9)) {
sed_sql_query("delete from program_dovus where id='$row9[id]'");
}

$ulke = gd("ulke");

$do_cache = 1;
$mikro = microtime();

if(!empty($ulke)) { $ulke_ekle = "and kupa_ulke='$ulke'"; } else { $ulke_ekle = ""; }

$sasi=0;

$gizli_ligler = gizli_lig_list();

$gizli_maclar = gizli_mac_list();

if($gizli_ligler=="") { $gizli_lig_ekle = ""; } else { $gizli_lig_ekle = "and ulkeadi not in ($gizli_ligler)"; }

if($gizli_maclar=="") { $gizli_mac_ekle = ""; } else { $gizli_mac_ekle = "and id not in ($gizli_maclar)"; } 

$gizli_ekle = "$gizli_lig_ekle $gizli_mac_ekle";

/* yasak kelimeler */ 
$whereyasak ="";
$sec = "SELECT * FROM yasak_kelimeler WHERE user_id IN (1,".$_SESSION['betuser'].",".implode(",", $_SESSION['ustler']).")";
$sor = sed_sql_query($sec);
while($r = sed_sql_fetchassoc($sor)) {
$whereyasak.= ' AND ev_takim not like "%'.$r['kelime'].'%" AND konuk_takim not like "%'.$r['kelime'].'%" ';
}
/* yasak kelimeler */

$kayittime_ver = $suan-300;
$songuncellemever = $suan-1800;
$sqladder = "and kayittime<$kayittime_ver and bulten='hititbet' $ulke_ekle $gizli_ekle and kupa_isim not like '%Duello%' {$whereyasak} and aktif='1' and (evoran>0 or beraberoran>0 or deporan>0)";
$sor = sed_sql_query("select * from program_futbol where id!='' $sqladder group by kupa_isim  order by mac_time asc ");

if(userayar('sporbulten')==0) { echo "<div style='text-align: center;font-weight: bold;'>".getTranslation('yeniyerler_kasa364')."</div>"; } else {

if(sed_sql_numrows($sor)<1) { die("<div style='text-align: center;font-weight: bold;'>".getTranslation('exportmusabakabulunmadi')."</div>"); }

$say=1;
while($row=sed_sql_fetcharray($sor)) { 
$say++;
?>
<div class="navtitle navsub ">
<div class="tlsubitem">
<div class="icon"><div class="sports_small soccer"></div> </div>
<div class="text"><?=$row['kupa_ulke'];?>-<?=$row['kupa_isim'];?></div>
</div>
</div>
<?

$i = 1;
unset($ss);
unset($ass);
$ss = sed_sql_query("select * from program_futbol where id!='' $sqladder and kupa_isim='$row[kupa_isim]' order by mac_time asc ");
while($ass=sed_sql_fetcharray($ss)){
$i++;

$ev_kazanc = oranbulxxx_futbol($ass['id'],1);

$beraberlik = oranbulxxx_futbol($ass['id'],2);

$konuk_kazanc = oranbulxxx_futbol($ass['id'],3);

$mbs = mbsver($ass['id'],$ass['mbs'],$ass['kupa_id']);

$encoded = "$ass[id]|$ass[ev_takim]|$ass[konuk_takim]|$ass[mac_kodu]|$mbs|$ass[mac_time]|futbol";
?>

<div class="<? if ($i %2 != 0){ ?>even<? }else{ ?>odd<? } ?>">
<div id="e<?=$ass["id"];?>" class="event match " onclick="detaygetir('1','<?=$ass["id"];?>');">
<div class="">
<div colspan="11" class="c_comment">
<div class="c_comment"></div>
<div class="c_pointer"></div>
</div>
</div>
<div class="event_wrapper">
<div class="datetime ">
<div class="sportsIcon ">
<div class="icon">
<div class="sports soccer"></div>
</div>
</div>
<div class="date small ">
<div> <?=date("d.m H:i",$ass['mac_time']); ?> </div>
<img src="assets/img/live_rain.png" alt="" width="23" height="23" class="hidden">
<span class=""> <img src="assets/img/icon_top.png" alt="" width="24" height="12"> </span>
</div>
</div>
<div class="teamrows">
<div class="teamrow">
<div class="team"> <?=$ass["ev_takim"];?>  </div>
<div class="score">
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
</div>
</div>
<div class="teamrow">
<div class="team"> <?=$ass["konuk_takim"];?>  </div>
<div class="score">
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
</div>
</div>
</div>
<div class=""> <div class="count"> <?=getTranslation('exportmbs')?> <?=$mbs;?> </div></div>
<div class="hidden" onclick="toggleBetMatrix(event, 9492123)"></div>
<div class="arrow "></div>
</div>
</div>
</div>

<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w25"><?=getTranslation('exportmacsonucutahmin')?></div>
<div class="cell w25 rsBut"><div class="<?=$ass["mac_kodu"];?> qbutton l" oddsid="<?=$ass["mac_kodu"];?>1" onClick="kupon(<?=$ass["mac_kodu"];?>1,<?=$ass["mac_kodu"];?>,'<?=codekupon("$encoded|1|$ev_kazanc"); ?>', this);"> <div class="caption">1</div> <div class="quote"><?=$ev_kazanc;?></div></div></div>
<div class="cell w25 rsBut"><div class="<?=$ass["mac_kodu"];?> qbutton m" oddsid="<?=$ass["mac_kodu"];?>2" onClick="kupon(<?=$ass["mac_kodu"];?>2,<?=$ass["mac_kodu"];?>,'<?=codekupon("$encoded|2|$beraberlik"); ?>', this);"> <div class="caption">X</div> <div class="quote"><?=$beraberlik;?></div></div></div>
<div class="cell w25 rsBut"> <div class="<?=$ass["mac_kodu"];?> qbutton s" oddsid="<?=$ass["mac_kodu"];?>3" onClick="kupon(<?=$ass["mac_kodu"];?>3,<?=$ass["mac_kodu"];?>,'<?=codekupon("$encoded|3|$konuk_kazanc"); ?>', this);"> <div class="caption">2</div> <div class="quote"><?=$konuk_kazanc;?></div></div></div>
<div class=""> </div>
</div>
<? } ?>
<? } ?>
<? } ?>

<?

$sor = sed_sql_query("select oran_val_id,mac_kodu from kupon where session_id='$session_id' and spor_tip='futbol'");

while($row=sed_sql_fetcharray($sor)) { ?>

<script>
$("div[oddsid='<?=$row['mac_kodu'];?><?=$row['oran_val_id'];?>']").addClass('selected');
</script>

<? }

}

function oranbulb_mobil($id,$oranvalid) {
global $ub;
global $dizin;
$oran = bilgi("select oran,mac_db_id,oran_val_id from oranlar_basketbol where mac_db_id='$id' and oran_val_id='$oranvalid'");

$oran_bilgi_kendim = bilgi("select * from maclar_oranlar where spor_tipi='basketbol' and mac_db_id='".$id."' and oran_val_id='$oranvalid' and bayi_id='".$ub['id']."'");
$oran_bilgi_altim = bilgi("select * from maclar_oranlar where spor_tipi='basketbol' and mac_db_id='".$id."' and oran_val_id='$oranvalid' and bayi_id='".$ub['hesap_sahibi_id']."'");
$oran_bilgi_altiminalti = bilgi("select * from maclar_oranlar where spor_tipi='basketbol' and mac_db_id='".$id."' and oran_val_id='$oranvalid' and bayi_id='".$ub['hesap_root_id']."'");

$oran_tip_bul = bilgi("select oran_tip from oran_val_basketbol where id='$oranvalid'");

$oran_bilgi_toplu_bir = bilgi("select * from maclar_topluoranlar where spor_tipi='basketbol' and oran_val_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['id']."'");
$oran_bilgi_toplu_iki = bilgi("select * from maclar_topluoranlar where spor_tipi='basketbol' and oran_val_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['hesap_sahibi_id']."'");
$oran_bilgi_toplu_uc = bilgi("select * from maclar_topluoranlar where spor_tipi='basketbol' and oran_val_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['hesap_root_id']."'");

if($oran_bilgi_kendim['id']>0) {
	$oran_ver = $oran_bilgi_kendim['oran'];
	$kullan = 1;
} else if($oran_bilgi_altim['id']>0) {
	$oran_ver = $oran_bilgi_altim['oran'];
	$kullan = 1;
} else if($oran_bilgi_altiminalti['id']>0) {
	$oran_ver = $oran_bilgi_altiminalti['oran'];
	$kullan = 1;
}

if($oran_bilgi_toplu_bir['id']>0) {
	$oran_ver2 = $oran_bilgi_toplu_bir['oran'];
} else if($oran_bilgi_toplu_iki['id']>0) {
	$oran_ver2 = $oran_bilgi_toplu_iki['oran'];
} else if($oran_bilgi_toplu_uc['id']>0) {
	$oran_ver2 = $oran_bilgi_toplu_uc['oran'];
} else {
	$oran_ver2 = 0.00;
}

if($kullan==1) {
$donecek = $oran['oran']+$oran_ver+$oran_ver2;
} else {
$donecek = $oran['oran']+$oran_ver2;
}

if($donecek=="" || $donecek<1.01) { $donen = "-"; } else { $donen = nf($donecek); }
return $donen;
}

if($a=="basketbolbulten") {

$suan = time();

$kontrol_sql1 = sed_sql_query("select id from program_futbol where mac_time<$suan");
$kontrol_sql2 = sed_sql_query("select id from program_basketbol where mac_time<$suan");
$kontrol_sql3 = sed_sql_query("select id from program_tenis where mac_time<$suan");
$kontrol_sql4 = sed_sql_query("select id from program_voleybol where mac_time<$suan");
$kontrol_sql5 = sed_sql_query("select id from program_buzhokeyi where mac_time<$suan");
$kontrol_sql6 = sed_sql_query("select id from program_masatenisi where mac_time<$suan");
$kontrol_sql7 = sed_sql_query("select id from program_beyzbol where mac_time<$suan");
$kontrol_sql8 = sed_sql_query("select id from program_rugby where mac_time<$suan");
$kontrol_sql9 = sed_sql_query("select id from program_dovus where mac_time<$suan");

while($row1=sed_sql_fetcharray($kontrol_sql1)) {
sed_sql_query("delete from oranlar_futbol where mac_db_id='$row1[id]'");
sed_sql_query("delete from program_futbol where id='$row1[id]'");
sed_sql_query("delete from maclar_oranlar where mac_db_id='$row1[id]' and spor_tipi='futbol'");
}
while($row2=sed_sql_fetcharray($kontrol_sql2)) {
sed_sql_query("delete from oranlar_basketbol where mac_db_id='$row2[id]'");
sed_sql_query("delete from program_basketbol where id='$row2[id]'");
sed_sql_query("delete from maclar_oranlar where mac_db_id='$row2[id]' and spor_tipi='basketbol'");
}
while($row3=sed_sql_fetcharray($kontrol_sql3)) {
sed_sql_query("delete from oranlar_tenis where mac_db_id='$row3[id]'");
sed_sql_query("delete from program_tenis where id='$row3[id]'");
sed_sql_query("delete from maclar_oranlar where mac_db_id='$row3[id]' and spor_tipi='tenis'");
}
while($row4=sed_sql_fetcharray($kontrol_sql4)) {
sed_sql_query("delete from oranlar_voleybol where mac_db_id='$row4[id]'");
sed_sql_query("delete from program_voleybol where id='$row4[id]'");
}
while($row5=sed_sql_fetcharray($kontrol_sql5)) {
sed_sql_query("delete from oranlar_buzhokeyi where mac_db_id='$row5[id]'");
sed_sql_query("delete from program_buzhokeyi where id='$row5[id]'");
}
while($row6=sed_sql_fetcharray($kontrol_sql6)) {
sed_sql_query("delete from program_masatenisi where id='$row6[id]'");
}
while($row7=sed_sql_fetcharray($kontrol_sql7)) {
sed_sql_query("delete from program_beyzbol where id='$row7[id]'");
}
while($row8=sed_sql_fetcharray($kontrol_sql8)) {
sed_sql_query("delete from program_rugby where id='$row8[id]'");
}
while($row9=sed_sql_fetcharray($kontrol_sql9)) {
sed_sql_query("delete from program_dovus where id='$row9[id]'");
}

$do_cache = 1;
$mikro = microtime();

$sasi=0;

$ulke = gd("ulke");

if(!empty($ulke)) { $ulke_ekle = "and kupa_ulke='$ulke'"; } else { $ulke_ekle = ""; }

$gizli_ligler = gizli_lig_listb();

$gizli_maclar = gizli_mac_listb();

if($gizli_ligler=="") { $gizli_lig_ekle = ""; } else { $gizli_lig_ekle = "and kupa_isim not in ($gizli_ligler)"; }

if($gizli_maclar=="") { $gizli_mac_ekle = ""; } else { $gizli_mac_ekle = "and id not in ($gizli_maclar)"; } 

$gizli_ekle = "$gizli_lig_ekle $gizli_mac_ekle";

/* yasak kelimeler */ 
$whereyasak ="";
$sec = "SELECT * FROM yasak_kelimeler WHERE user_id IN (1,".$_SESSION['betuser'].",".implode(",", $_SESSION['ustler']).")";
$sor = sed_sql_query($sec);
while($r = sed_sql_fetchassoc($sor)) {
$whereyasak.= ' AND ev_takim not like "%'.$r['kelime'].'%" AND konuk_takim not like "%'.$r['kelime'].'%" ';
}
/* yasak kelimeler */

$kayittime_ver = $suan-300;
$sqladder = "AND (kimkazanir!='0' or 1x2!='0' or handikap!='0' or altust!='0') and kayittime<$kayittime_ver and bulten='hititbet' $ulke_ekle $gizli_ekle and kupa_isim not like '%Duello%' {$whereyasak} and aktif='1'";
$sor = sed_sql_query("select * from program_basketbol where id!='' $sqladder group by kupa_isim  order by mac_time asc ");

if(userayar('sporbulten')==0) { echo "<div style='text-align: center;font-weight: bold;'>".getTranslation('yeniyerler_kasa364')."</div>"; } else {

if(sed_sql_numrows($sor)<1) { die("<div style='text-align: center;font-weight: bold;'>".getTranslation('exportmusabakabulunmadi')."</div>"); }

$say=1;
while($row=sed_sql_fetcharray($sor)) { 
$say++;
?>
<div class="navtitle navsub ">
<div class="tlsubitem">
<div class="icon"><div class="sports_small basketball"></div> </div>
<div class="text"><?=$row['kupa_ulke'];?>-<?=$row['kupa_isim'];?></div>
</div>
</div>
<?

$i = 1;
unset($ss);
unset($ass);
$ss = sed_sql_query("select * from program_basketbol where id!='' $sqladder and kupa_isim='$row[kupa_isim]' order by mac_time asc ");
while($ass=sed_sql_fetcharray($ss)){
	$i++;

$ev_kazanc = oranbulb_mobil($ass['id'],3);

$beraberlik = oranbulb_mobil($ass['id'],4);

$konuk_kazanc = oranbulb_mobil($ass['id'],5);	

$ev_kazanc_id = oranbulb_mobil_id($ass['id'],3);

$beraberlik_id = oranbulb_mobil_id($ass['id'],4);

$konuk_kazanc_id = oranbulb_mobil_id($ass['id'],5);	

$mbs = mbsverb($ass['id'],$ass['mbs'],$ass['kupa_id']);

$encoded = "$ass[id]|$ass[ev_takim]|$ass[konuk_takim]|$ass[mac_kodu]|$mbs|$ass[mac_time]|basketbol";
?>

<div class="<? if ($i %2 != 0){ ?>even<? }else{ ?>odd<? } ?>">
<div id="e<?=$ass["id"];?>" class="event match " onclick="detaygetir('2','<?=$ass["id"];?>');">
<div class="">
<div colspan="11" class="c_comment">
<div class="c_comment"></div>
<div class="c_pointer"></div>
</div>
</div>
<div class="event_wrapper">
<div class="datetime ">
<div class="sportsIcon ">
<div class="icon">
<div class="sports soccer"></div>
</div>
</div>
<div class="date small ">
<div> <?=date("d.m H:i",$ass['mac_time']); ?> </div>
<img src="assets/img/live_rain.png" alt="" width="23" height="23" class="hidden">
<span class=""> <img src="assets/img/icon_top.png" alt="" width="24" height="12"> </span>
</div>
</div>
<div class="teamrows">
<div class="teamrow">
<div class="team"> <?=$ass["ev_takim"];?>  </div>
<div class="score">
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
</div>
</div>
<div class="teamrow">
<div class="team"> <?=$ass["konuk_takim"];?>  </div>
<div class="score">
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
</div>
</div>
</div>
<div class=""> <div class="count"> <?=getTranslation('exportmbs')?> <?=$mbs;?> </div></div>
<div class="hidden" onclick="toggleBetMatrix(event, 9492123)"></div>
<div class="arrow "></div>
</div>
</div>
</div>

<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w25"><?=getTranslation('exportmacsonucutahmin')?></div>

<div class="cell w25 rsBut"><div class="<?=$ass["mac_kodu"];?> qbutton l" oddsid="<?=$ass["mac_kodu"];?><?=$ev_kazanc_id;?>" onClick="kupon(<?=$ass["mac_kodu"];?><?=$ev_kazanc_id;?>,<?=$ass["mac_kodu"];?>,'<?=codekupon("$encoded|$ev_kazanc_id|$ev_kazanc"); ?>', this);"> <div class="caption">1</div> <div class="quote"><?=$ev_kazanc;?></div></div></div>

<div class="cell w25 rsBut"> <div class="<?=$ass["mac_kodu"];?> qbutton m" oddsid="<?=$ass["mac_kodu"];?><?=$beraberlik_id;?>" onClick="kupon(<?=$ass["mac_kodu"];?><?=$beraberlik_id;?>,<?=$ass["mac_kodu"];?>,'<?=codekupon("$encoded|$beraberlik_id|$beraberlik"); ?>', this);"> <div class="caption">X</div> <div class="quote"><?=$beraberlik;?></div></div></div>

<div class="cell w25 rsBut"> <div class="<?=$ass["mac_kodu"];?> qbutton s" oddsid="<?=$ass["mac_kodu"];?><?=$konuk_kazanc_id;?>" onClick="kupon(<?=$ass["mac_kodu"];?><?=$konuk_kazanc_id;?>,<?=$ass["mac_kodu"];?>,'<?=codekupon("$encoded|$konuk_kazanc_id|$konuk_kazanc"); ?>', this);"> <div class="caption">2</div> <div class="quote"><?=$konuk_kazanc;?></div></div></div>

<div class=""> </div>
</div>

<? } ?>

<? } ?>

<? } ?>

<?

$sor = sed_sql_query("select oran_val_id,mac_kodu from kupon where session_id='$session_id' and spor_tip='basketbol'");

while($row=sed_sql_fetcharray($sor)) {

?>

<script>$("div[oddsid='<?=$row['mac_kodu'];?><?=$row['oran_val_id'];?>']").addClass('selected');</script>

<? }

}

if($a=="basketbolbugun") {

$suan = time();

$do_cache = 1;
$mikro = microtime();

$sasi=0;

$ulke = gd("ulke");

if(!empty($ulke)) { $ulke_ekle = "and kupa_ulke='$ulke'"; } else { $ulke_ekle = ""; }

$gizli_ligler = gizli_lig_listb();

$gizli_maclar = gizli_mac_listb();

if($gizli_ligler=="") { $gizli_lig_ekle = ""; } else { $gizli_lig_ekle = "and kupa_isim not in ($gizli_ligler)"; }

if($gizli_maclar=="") { $gizli_mac_ekle = ""; } else { $gizli_mac_ekle = "and id not in ($gizli_maclar)"; } 

$gizli_ekle = "$gizli_lig_ekle $gizli_mac_ekle";

/* yasak kelimeler */ 
$whereyasak ="";
$sec = "SELECT * FROM yasak_kelimeler WHERE user_id IN (1,".$_SESSION['betuser'].",".implode(",", $_SESSION['ustler']).")";
$sor = sed_sql_query($sec);
while($r = sed_sql_fetchassoc($sor)) {
$whereyasak.= ' AND ev_takim not like "%'.$r['kelime'].'%" AND konuk_takim not like "%'.$r['kelime'].'%" ';
}
/* yasak kelimeler */

$tarih_ver = date("d.m.y");

$kayittime_ver = $suan-300;
$sqladder = "and kayittime<$kayittime_ver and mac_tarih='$tarih_ver' and bulten='hititbet' $ulke_ekle $gizli_ekle and kupa_isim not like '%Duello%' {$whereyasak} and aktif='1'";
$sor = sed_sql_query("select * from program_basketbol where id!='' $sqladder group by kupa_isim  order by mac_time asc ");

if(userayar('sporbulten')==0) { echo "<div style='text-align: center;font-weight: bold;'>".getTranslation('yeniyerler_kasa364')."</div>"; } else {

if(sed_sql_numrows($sor)<1) { die("<div style='text-align: center;font-weight: bold;'>".getTranslation('exportmusabakabulunmadi')."</div>"); }

$say=1;
while($row=sed_sql_fetcharray($sor)) { 
$say++;
?>
<div class="navtitle navsub ">
<div class="tlsubitem">
<div class="icon"><div class="sports_small basketball"></div> </div>
<div class="text"><?=$row['kupa_ulke'];?>-<?=$row['kupa_isim'];?></div>
</div>
</div>
<?

$i = 1;
unset($ss);
unset($ass);
$ss = sed_sql_query("select * from program_basketbol where id!='' $sqladder and kupa_isim='$row[kupa_isim]' order by mac_time asc ");
while($ass=sed_sql_fetcharray($ss)){
	$i++;

$ev_kazanc = oranbulb_mobil($ass['id'],3);

$beraberlik = oranbulb_mobil($ass['id'],4);

$konuk_kazanc = oranbulb_mobil($ass['id'],5);	

$ev_kazanc_id = oranbulb_mobil_id($ass['id'],3);

$beraberlik_id = oranbulb_mobil_id($ass['id'],4);

$konuk_kazanc_id = oranbulb_mobil_id($ass['id'],5);	

$mbs = mbsverb($ass['id'],$ass['mbs'],$ass['kupa_id']);

$encoded = "$ass[id]|$ass[ev_takim]|$ass[konuk_takim]|$ass[mac_kodu]|$mbs|$ass[mac_time]|basketbol";
?>

<div class="<? if ($i %2 != 0){ ?>even<? }else{ ?>odd<? } ?>">
<div id="e<?=$ass["id"];?>" class="event match " onclick="detaygetir('2','<?=$ass["id"];?>');">
<div class="">
<div colspan="11" class="c_comment">
<div class="c_comment"></div>
<div class="c_pointer"></div>
</div>
</div>
<div class="event_wrapper">
<div class="datetime ">
<div class="sportsIcon ">
<div class="icon">
<div class="sports soccer"></div>
</div>
</div>
<div class="date small ">
<div> <?=date("d.m H:i",$ass['mac_time']); ?> </div>
<img src="assets/img/live_rain.png" alt="" width="23" height="23" class="hidden">
<span class=""> <img src="assets/img/icon_top.png" alt="" width="24" height="12"> </span>
</div>
</div>
<div class="teamrows">
<div class="teamrow">
<div class="team"> <?=$ass["ev_takim"];?>  </div>
<div class="score">
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
</div>
</div>
<div class="teamrow">
<div class="team"> <?=$ass["konuk_takim"];?>  </div>
<div class="score">
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
</div>
</div>
</div>
<div class=""> <div class="count"> <?=getTranslation('exportmbs')?> <?=$mbs;?> </div></div>
<div class="hidden" onclick="toggleBetMatrix(event, 9492123)"></div>
<div class="arrow "></div>
</div>
</div>
</div>

<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w25"><?=getTranslation('exportmacsonucutahmin')?></div>

<div class="cell w25 rsBut"><div class="<?=$ass["mac_kodu"];?> qbutton l" oddsid="<?=$ass["mac_kodu"];?><?=$ev_kazanc_id;?>" onClick="kupon(<?=$ass["mac_kodu"];?><?=$ev_kazanc_id;?>,<?=$ass["mac_kodu"];?>,'<?=codekupon("$encoded|$ev_kazanc_id|$ev_kazanc"); ?>', this);"> <div class="caption">1</div> <div class="quote"><?=$ev_kazanc;?></div></div></div>

<div class="cell w25 rsBut"> <div class="<?=$ass["mac_kodu"];?> qbutton m" oddsid="<?=$ass["mac_kodu"];?><?=$beraberlik_id;?>" onClick="kupon(<?=$ass["mac_kodu"];?><?=$beraberlik_id;?>,<?=$ass["mac_kodu"];?>,'<?=codekupon("$encoded|$beraberlik_id|$beraberlik"); ?>', this);"> <div class="caption">X</div> <div class="quote"><?=$beraberlik;?></div></div></div>

<div class="cell w25 rsBut"> <div class="<?=$ass["mac_kodu"];?> qbutton s" oddsid="<?=$ass["mac_kodu"];?><?=$konuk_kazanc_id;?>" onClick="kupon(<?=$ass["mac_kodu"];?><?=$konuk_kazanc_id;?>,<?=$ass["mac_kodu"];?>,'<?=codekupon("$encoded|$konuk_kazanc_id|$konuk_kazanc"); ?>', this);"> <div class="caption">2</div> <div class="quote"><?=$konuk_kazanc;?></div></div></div>

<div class=""> </div>
</div>

<? } ?>

<? } ?>

<? } ?>

<?

$sor = sed_sql_query("select oran_val_id,mac_kodu from kupon where session_id='$session_id' and spor_tip='basketbol'");

while($row=sed_sql_fetcharray($sor)) {

?>

<script>
$("div[oddsid='<?=$row['mac_kodu'];?><?=$row['oran_val_id'];?>']").addClass('selected');
</script>

<? }

}

if($a=="tenisbulten") {

$suan = time();

$kontrol_sql1 = sed_sql_query("select id from program_futbol where mac_time<$suan");
$kontrol_sql2 = sed_sql_query("select id from program_basketbol where mac_time<$suan");
$kontrol_sql3 = sed_sql_query("select id from program_tenis where mac_time<$suan");
$kontrol_sql4 = sed_sql_query("select id from program_voleybol where mac_time<$suan");
$kontrol_sql5 = sed_sql_query("select id from program_buzhokeyi where mac_time<$suan");
$kontrol_sql6 = sed_sql_query("select id from program_masatenisi where mac_time<$suan");
$kontrol_sql7 = sed_sql_query("select id from program_beyzbol where mac_time<$suan");
$kontrol_sql8 = sed_sql_query("select id from program_rugby where mac_time<$suan");
$kontrol_sql9 = sed_sql_query("select id from program_dovus where mac_time<$suan");

while($row1=sed_sql_fetcharray($kontrol_sql1)) {
sed_sql_query("delete from oranlar_futbol where mac_db_id='$row1[id]'");
sed_sql_query("delete from program_futbol where id='$row1[id]'");
sed_sql_query("delete from maclar_oranlar where mac_db_id='$row1[id]' and spor_tipi='futbol'");
}
while($row2=sed_sql_fetcharray($kontrol_sql2)) {
sed_sql_query("delete from oranlar_basketbol where mac_db_id='$row2[id]'");
sed_sql_query("delete from program_basketbol where id='$row2[id]'");
sed_sql_query("delete from maclar_oranlar where mac_db_id='$row2[id]' and spor_tipi='basketbol'");
}
while($row3=sed_sql_fetcharray($kontrol_sql3)) {
sed_sql_query("delete from oranlar_tenis where mac_db_id='$row3[id]'");
sed_sql_query("delete from program_tenis where id='$row3[id]'");
sed_sql_query("delete from maclar_oranlar where mac_db_id='$row3[id]' and spor_tipi='tenis'");
}
while($row4=sed_sql_fetcharray($kontrol_sql4)) {
sed_sql_query("delete from oranlar_voleybol where mac_db_id='$row4[id]'");
sed_sql_query("delete from program_voleybol where id='$row4[id]'");
}
while($row5=sed_sql_fetcharray($kontrol_sql5)) {
sed_sql_query("delete from oranlar_buzhokeyi where mac_db_id='$row5[id]'");
sed_sql_query("delete from program_buzhokeyi where id='$row5[id]'");
}
while($row6=sed_sql_fetcharray($kontrol_sql6)) {
sed_sql_query("delete from program_masatenisi where id='$row6[id]'");
}
while($row7=sed_sql_fetcharray($kontrol_sql7)) {
sed_sql_query("delete from program_beyzbol where id='$row7[id]'");
}
while($row8=sed_sql_fetcharray($kontrol_sql8)) {
sed_sql_query("delete from program_rugby where id='$row8[id]'");
}
while($row9=sed_sql_fetcharray($kontrol_sql9)) {
sed_sql_query("delete from program_dovus where id='$row9[id]'");
}

$do_cache = 1;
$mikro = microtime();

$sasi=0;

$lig = gd("lig");

if(!empty($lig)) { $lig_ekle = "and kupa_id='$lig'"; } else { $lig_ekle = ""; }

$gizli_ligler = gizli_lig_listt();

if($gizli_ligler=="") { $gizli_lig_ekle = ""; } else { $gizli_lig_ekle = "and kupa_isim not in ($gizli_ligler)"; }

$gizli_ekle = "$gizli_lig_ekle";
/* yasak kelimeler */ 
$whereyasak ="";
$sec = "SELECT * FROM yasak_kelimeler WHERE user_id IN (1,".$_SESSION['betuser'].",".implode(",", $_SESSION['ustler']).")";
$sor = sed_sql_query($sec);
while($r = sed_sql_fetchassoc($sor)) {
$whereyasak.= ' AND ev_takim not like "%'.$r['kelime'].'%" AND konuk_takim not like "%'.$r['kelime'].'%" ';
}
/* yasak kelimeler */

$kayittime_ver = $suan-300;
$sqladder = "AND (kimkazanir!='0' or setbahisi!='0') and kayittime<$kayittime_ver and bulten='hititbet' $lig_ekle $gizli_ekle and kupa_isim not like '%Duello%' {$whereyasak} and aktif='1'";
$sor = sed_sql_query("select * from program_tenis where id!='' $sqladder group by kupa_isim  order by mac_time asc ");

if(userayar('sporbulten')==0) { echo "<div style='text-align: center;font-weight: bold;'>".getTranslation('yeniyerler_kasa364')."</div>"; } else {

if(sed_sql_numrows($sor)<1) { die("<div style='text-align: center;font-weight: bold;'>".getTranslation('exportmusabakabulunmadi')."</div>"); }

$say=1;
while($row=sed_sql_fetcharray($sor)) { 
$say++;
?>

<div id="tenis_<?=$row['kupa_id'];?>" class="navtitle navsub ">
<div class="tlsubitem">
<div class="icon"><div class="sports_small tennis"></div> </div>
<div class="text"><?=$row['kupa_ulke'];?>-<?=$row['kupa_isim'];?></div>
</div>
</div>

<?
$mactoplamsayisi = 0;
$i = 1;
unset($ss);
unset($ass);
$ss = sed_sql_query("select * from program_tenis where id!='' $sqladder and kupa_isim='$row[kupa_isim]' order by mac_time asc ");
while($ass=sed_sql_fetcharray($ss)){
	$i++;
$ev_kazanc = oranbult($ass['id'],1);

$konuk_kazanc = oranbult($ass['id'],2);	

$mbs = mbsvert($ass['id'],$ass['mbs'],$ass['kupa_id']);

$encoded = "$ass[id]|$ass[ev_takim]|$ass[konuk_takim]|$ass[mac_kodu]|$mbs|$ass[mac_time]|tenis";

if($ev_kazanc>0 || $konuk_kazanc>0){
$mactoplamsayisi++;
?>

<div class="<? if ($i %2 != 0){ ?>even<? }else{ ?>odd<? } ?>">
<div id="e9492123" class="event match " onclick="detaygetir('3','<?=$ass["id"];?>');">
<div class="">
<div colspan="11" class="c_comment">
<div class="c_comment"></div>
<div class="c_pointer"></div>
</div>
</div>
<div class="event_wrapper">
<div class="datetime ">
<div class="sportsIcon ">
<div class="icon">
<div class="sports soccer"></div>
</div>
</div>
<div class="date small ">
<div> <?=date("d.m H:i",$ass['mac_time']); ?> </div>
<img src="assets/img/live_rain.png" alt="" width="23" height="23" class="hidden">
<span class=""> <img src="assets/img/icon_top.png" alt="" width="24" height="12"> </span>
</div>
</div>
<div class="teamrows">
<div class="teamrow">
<div class="team"> <?=$ass["ev_takim"];?>  </div>
<div class="score">
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
</div>
</div>
<div class="teamrow">
<div class="team"> <?=$ass["konuk_takim"];?>  </div>
<div class="score">
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
</div>
</div>
</div>
<div class=""> <div class="count"> <?=getTranslation('exportmbs')?> <?=$mbs;?> </div></div>
<div class="hidden" onclick="toggleBetMatrix(event, 9492123)"></div>
<div class="arrow "></div>
</div>
</div>
</div>

<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('exportkimkazanirtahmin')?></div>

<div class="cell w25 rsBut"><div class="<?=$ass["mac_kodu"];?> qbutton l" oddsid="<?=$ass["mac_kodu"];?>1" onClick="kupon(<?=$ass["mac_kodu"];?>1,<?=$ass["mac_kodu"];?>,'<?=codekupon("$encoded|1|$ev_kazanc"); ?>', this);"> <div class="caption">1</div> <div class="quote"><?=$ev_kazanc;?></div></div></div>

<div class="cell w25 rsBut"> <div class="<?=$ass["mac_kodu"];?> qbutton s" oddsid="<?=$ass["mac_kodu"];?>2" onClick="kupon(<?=$ass["mac_kodu"];?>2,<?=$ass["mac_kodu"];?>,'<?=codekupon("$encoded|2|$konuk_kazanc"); ?>', this);"> <div class="caption">2</div> <div class="quote"><?=$konuk_kazanc;?></div></div></div>

<div class=""> </div>
</div>

<? } ?>

<? } ?>
<? } ?>
<? } ?>

<?

$sor = sed_sql_query("select oran_val_id,mac_kodu from kupon where session_id='$session_id' and spor_tip='tenis'");

while($row=sed_sql_fetcharray($sor)) {

?>

<script>$("div[oddsid='<?=$row['mac_kodu'];?><?=$row['oran_val_id'];?>']").addClass('selected');</script>

<? }

}

if($a=="tenisbugun") {

$suan = time();

$do_cache = 1;
$mikro = microtime();

$sasi=0;

$lig = gd("lig");

if(!empty($lig)) { $lig_ekle = "and kupa_id='$lig'"; } else { $lig_ekle = ""; }

$gizli_ligler = gizli_lig_listt();

if($gizli_ligler=="") { $gizli_lig_ekle = ""; } else { $gizli_lig_ekle = "and kupa_isim not in ($gizli_ligler)"; }

$gizli_ekle = "$gizli_lig_ekle";
/* yasak kelimeler */ 
$whereyasak ="";
$sec = "SELECT * FROM yasak_kelimeler WHERE user_id IN (1,".$_SESSION['betuser'].",".implode(",", $_SESSION['ustler']).")";
$sor = sed_sql_query($sec);
while($r = sed_sql_fetchassoc($sor)) {
$whereyasak.= ' AND ev_takim not like "%'.$r['kelime'].'%" AND konuk_takim not like "%'.$r['kelime'].'%" ';
}
/* yasak kelimeler */

$tarih_ver = date("d.m.y");

$kayittime_ver = $suan-300;
$sqladder = "and kayittime<$kayittime_ver and mac_tarih='$tarih_ver' and bulten='hititbet' $lig_ekle $gizli_ekle and kupa_isim not like '%Duello%' {$whereyasak} and aktif='1'";
$sor = sed_sql_query("select * from program_tenis where id!='' $sqladder group by kupa_isim  order by mac_time asc ");

if(userayar('sporbulten')==0) { echo "<div style='text-align: center;font-weight: bold;'>".getTranslation('yeniyerler_kasa364')."</div>"; } else {

if(sed_sql_numrows($sor)<1) { die("<div style='text-align: center;font-weight: bold;'>".getTranslation('exportmusabakabulunmadi')."</div>"); }

$say=1;
while($row=sed_sql_fetcharray($sor)) { 
$say++;
?>

<div id="tenis_<?=$row['kupa_id'];?>" class="navtitle navsub ">
<div class="tlsubitem">
<div class="icon"><div class="sports_small tennis"></div> </div>
<div class="text"><?=$row['kupa_ulke'];?>-<?=$row['kupa_isim'];?></div>
</div>
</div>

<?
$mactoplamsayisi = 0;
$i = 1;
unset($ss);
unset($ass);
$ss = sed_sql_query("select * from program_tenis where id!='' $sqladder and kupa_isim='$row[kupa_isim]' order by mac_time asc ");
while($ass=sed_sql_fetcharray($ss)){
	$i++;
$ev_kazanc = oranbult($ass['id'],1);

$konuk_kazanc = oranbult($ass['id'],2);	

$mbs = mbsvert($ass['id'],$ass['mbs'],$ass['kupa_id']);

$encoded = "$ass[id]|$ass[ev_takim]|$ass[konuk_takim]|$ass[mac_kodu]|$mbs|$ass[mac_time]|tenis";

if($ev_kazanc>0 || $konuk_kazanc>0){
$mactoplamsayisi++;
?>

<div class="<? if ($i %2 != 0){ ?>even<? }else{ ?>odd<? } ?>">
<div id="e9492123" class="event match " onclick="detaygetir('3','<?=$ass["id"];?>');">
<div class="">
<div colspan="11" class="c_comment">
<div class="c_comment"></div>
<div class="c_pointer"></div>
</div>
</div>
<div class="event_wrapper">
<div class="datetime ">
<div class="sportsIcon ">
<div class="icon">
<div class="sports soccer"></div>
</div>
</div>
<div class="date small ">
<div> <?=date("d.m H:i",$ass['mac_time']); ?> </div>
<img src="assets/img/live_rain.png" alt="" width="23" height="23" class="hidden">
<span class=""> <img src="assets/img/icon_top.png" alt="" width="24" height="12"> </span>
</div>
</div>
<div class="teamrows">
<div class="teamrow">
<div class="team"> <?=$ass["ev_takim"];?>  </div>
<div class="score">
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
</div>
</div>
<div class="teamrow">
<div class="team"> <?=$ass["konuk_takim"];?>  </div>
<div class="score">
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
</div>
</div>
</div>
<div class=""> <div class="count"> <?=getTranslation('exportmbs')?> <?=$mbs;?> </div></div>
<div class="hidden" onclick="toggleBetMatrix(event, 9492123)"></div>
<div class="arrow "></div>
</div>
</div>
</div>

<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('exportkimkazanirtahmin')?></div>

<div class="cell w25 rsBut"><div class="<?=$ass["mac_kodu"];?> qbutton l" oddsid="<?=$ass["mac_kodu"];?>1" onClick="kupon(<?=$ass["mac_kodu"];?>1,<?=$ass["mac_kodu"];?>,'<?=codekupon("$encoded|1|$ev_kazanc"); ?>', this);"> <div class="caption">1</div> <div class="quote"><?=$ev_kazanc;?></div></div></div>

<div class="cell w25 rsBut"> <div class="<?=$ass["mac_kodu"];?> qbutton s" oddsid="<?=$ass["mac_kodu"];?>2" onClick="kupon(<?=$ass["mac_kodu"];?>2,<?=$ass["mac_kodu"];?>,'<?=codekupon("$encoded|2|$konuk_kazanc"); ?>', this);"> <div class="caption">2</div> <div class="quote"><?=$konuk_kazanc;?></div></div></div>

<div class=""> </div>
</div>

<? } ?>

<? } ?>
<? } ?>
<? } ?>

<?

$sor = sed_sql_query("select oran_val_id,mac_kodu from kupon where session_id='$session_id' and spor_tip='tenis'");

while($row=sed_sql_fetcharray($sor)) {

?>

<script>$("div[oddsid='<?=$row['mac_kodu'];?><?=$row['oran_val_id'];?>']").addClass('selected');</script>

<? }

}

if($a=="voleybolbulten") {

$suan = time();

$kontrol_sql1 = sed_sql_query("select id from program_futbol where mac_time<$suan");
$kontrol_sql2 = sed_sql_query("select id from program_basketbol where mac_time<$suan");
$kontrol_sql3 = sed_sql_query("select id from program_tenis where mac_time<$suan");
$kontrol_sql4 = sed_sql_query("select id from program_voleybol where mac_time<$suan");
$kontrol_sql5 = sed_sql_query("select id from program_buzhokeyi where mac_time<$suan");
$kontrol_sql6 = sed_sql_query("select id from program_masatenisi where mac_time<$suan");
$kontrol_sql7 = sed_sql_query("select id from program_beyzbol where mac_time<$suan");
$kontrol_sql8 = sed_sql_query("select id from program_rugby where mac_time<$suan");
$kontrol_sql9 = sed_sql_query("select id from program_dovus where mac_time<$suan");

while($row1=sed_sql_fetcharray($kontrol_sql1)) {
sed_sql_query("delete from oranlar_futbol where mac_db_id='$row1[id]'");
sed_sql_query("delete from program_futbol where id='$row1[id]'");
sed_sql_query("delete from maclar_oranlar where mac_db_id='$row1[id]' and spor_tipi='futbol'");
}
while($row2=sed_sql_fetcharray($kontrol_sql2)) {
sed_sql_query("delete from oranlar_basketbol where mac_db_id='$row2[id]'");
sed_sql_query("delete from program_basketbol where id='$row2[id]'");
sed_sql_query("delete from maclar_oranlar where mac_db_id='$row2[id]' and spor_tipi='basketbol'");
}
while($row3=sed_sql_fetcharray($kontrol_sql3)) {
sed_sql_query("delete from oranlar_tenis where mac_db_id='$row3[id]'");
sed_sql_query("delete from program_tenis where id='$row3[id]'");
sed_sql_query("delete from maclar_oranlar where mac_db_id='$row3[id]' and spor_tipi='tenis'");
}
while($row4=sed_sql_fetcharray($kontrol_sql4)) {
sed_sql_query("delete from oranlar_voleybol where mac_db_id='$row4[id]'");
sed_sql_query("delete from program_voleybol where id='$row4[id]'");
}
while($row5=sed_sql_fetcharray($kontrol_sql5)) {
sed_sql_query("delete from oranlar_buzhokeyi where mac_db_id='$row5[id]'");
sed_sql_query("delete from program_buzhokeyi where id='$row5[id]'");
}
while($row6=sed_sql_fetcharray($kontrol_sql6)) {
sed_sql_query("delete from program_masatenisi where id='$row6[id]'");
}
while($row7=sed_sql_fetcharray($kontrol_sql7)) {
sed_sql_query("delete from program_beyzbol where id='$row7[id]'");
}
while($row8=sed_sql_fetcharray($kontrol_sql8)) {
sed_sql_query("delete from program_rugby where id='$row8[id]'");
}
while($row9=sed_sql_fetcharray($kontrol_sql9)) {
sed_sql_query("delete from program_dovus where id='$row9[id]'");
}

$do_cache = 1;
$mikro = microtime();

$ulke = gd("ulke");

if(!empty($ulke)) { $ulke_ekle = "and kupa_ulke='$ulke'"; } else { $ulke_ekle = ""; }

$sasi=0;

$gizli_ligler = gizli_lig_listv();

if($gizli_ligler=="") { $gizli_lig_ekle = ""; } else { $gizli_lig_ekle = "and kupa_isim not in ($gizli_ligler)"; }

$gizli_ekle = "$gizli_lig_ekle";
/* yasak kelimeler */ 
$whereyasak ="";
$sec = "SELECT * FROM yasak_kelimeler WHERE user_id IN (1,".$_SESSION['betuser'].",".implode(",", $_SESSION['ustler']).")";
$sor = sed_sql_query($sec);
while($r = sed_sql_fetchassoc($sor)) {
$whereyasak.= ' AND ev_takim not like "%'.$r['kelime'].'%" AND konuk_takim not like "%'.$r['kelime'].'%" ';
}
/* yasak kelimeler */
$kayittime_ver = $suan-300;
$sqladder = "and kayittime<$kayittime_ver and bulten='hititbet' $ulke_ekle $gizli_ekle and kupa_isim not like '%Duello%' {$whereyasak} and aktif='1'";
$sor = sed_sql_query("select * from program_voleybol where id!='' $sqladder group by kupa_isim  order by mac_time asc ");

if(userayar('sporbulten')==0) { echo "<div style='text-align: center;font-weight: bold;'>".getTranslation('yeniyerler_kasa364')."</div>"; } else {

if(sed_sql_numrows($sor)<1) { die("<div style='text-align: center;font-weight: bold;'>".getTranslation('exportmusabakabulunmadi')."</div>"); }

$say=1;
while($row=sed_sql_fetcharray($sor)) { 
$say++;
?>
<div class="navtitle navsub ">
<div class="tlsubitem">
<div class="icon"><div class="sports_small volleyball"></div> </div>
<div class="text"><?=$row['kupa_ulke'];?>-<?=$row['kupa_isim'];?></div>
</div>
</div>
<?

$i = 1;
unset($ss);
unset($ass);
$ss = sed_sql_query("select * from program_voleybol where id!='' $sqladder and kupa_isim='$row[kupa_isim]' order by mac_time asc ");
while($ass=sed_sql_fetcharray($ss)){
	$i++;
$ev_kazanc = oranbulv($ass['id'],1);

$konuk_kazanc = oranbulv($ass['id'],2);	

$mbs = mbsverv($ass['id'],$ass['mbs'],$ass['kupa_id']);

$encoded = "$ass[id]|$ass[ev_takim]|$ass[konuk_takim]|$ass[mac_kodu]|$mbs|$ass[mac_time]|voleybol";
?>

<div class="<? if ($i %2 != 0){ ?>even<? }else{ ?>odd<? } ?>">
<div id="e9492123" class="event match " onclick="detaygetir('4','<?=$ass["id"];?>');">
<div class="">
<div colspan="11" class="c_comment">
<div class="c_comment"></div>
<div class="c_pointer"></div>
</div>
</div>
<div class="event_wrapper">
<div class="datetime ">
<div class="sportsIcon ">
<div class="icon">
<div class="sports soccer"></div>
</div>
</div>
<div class="date small ">
<div> <?=date("d.m H:i",$ass['mac_time']); ?> </div>
<img src="assets/img/live_rain.png" alt="" width="23" height="23" class="hidden">
<span class=""> <img src="assets/img/icon_top.png" alt="" width="24" height="12"> </span>
</div>
</div>
<div class="teamrows">
<div class="teamrow">
<div class="team"> <?=$ass["ev_takim"];?>  </div>
<div class="score">
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
</div>
</div>
<div class="teamrow">
<div class="team"> <?=$ass["konuk_takim"];?>  </div>
<div class="score">
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
</div>
</div>
</div>
<div class=""> <div class="count"> <?=getTranslation('exportmbs')?> <?=$mbs;?> </div></div>
<div class="hidden" onclick="toggleBetMatrix(event, 9492123)"></div>
<div class="arrow "></div>
</div>
</div>
</div>

<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('exportkimkazanirtahmin')?></div>
<div class="cell w25 rsBut"><div class="<?=$ass["mac_kodu"];?> qbutton l" oddsid="<?=$ass["mac_kodu"];?>1" onClick="kupon(<?=$ass["mac_kodu"];?>1,<?=$ass["mac_kodu"];?>,'<?=codekupon("$encoded|1|$ev_kazanc"); ?>', this);"> <div class="caption">1</div> <div class="quote"><?=$ev_kazanc;?></div></div></div>
<div class="cell w25 rsBut"> <div class="<?=$ass["mac_kodu"];?> qbutton s" oddsid="<?=$ass["mac_kodu"];?>2" onClick="kupon(<?=$ass["mac_kodu"];?>2,<?=$ass["mac_kodu"];?>,'<?=codekupon("$encoded|2|$konuk_kazanc"); ?>', this);"> <div class="caption">2</div> <div class="quote"><?=$konuk_kazanc;?></div></div></div>
<div class=""> </div>
</div>

<? } ?>
<? } ?>
<? } ?>

<?

$sor = sed_sql_query("select oran_val_id,mac_kodu from kupon where session_id='$session_id' and spor_tip='voleybol'");

while($row=sed_sql_fetcharray($sor)) {

?>

<script>$("div[oddsid='<?=$row['mac_kodu'];?><?=$row['oran_val_id'];?>']").addClass('selected');</script>

<? }

}

if($a=="buzhokeyibulten") {

$suan = time();

$kontrol_sql1 = sed_sql_query("select id from program_futbol where mac_time<$suan");
$kontrol_sql2 = sed_sql_query("select id from program_basketbol where mac_time<$suan");
$kontrol_sql3 = sed_sql_query("select id from program_tenis where mac_time<$suan");
$kontrol_sql4 = sed_sql_query("select id from program_voleybol where mac_time<$suan");
$kontrol_sql5 = sed_sql_query("select id from program_buzhokeyi where mac_time<$suan");
$kontrol_sql6 = sed_sql_query("select id from program_masatenisi where mac_time<$suan");
$kontrol_sql7 = sed_sql_query("select id from program_beyzbol where mac_time<$suan");
$kontrol_sql8 = sed_sql_query("select id from program_rugby where mac_time<$suan");
$kontrol_sql9 = sed_sql_query("select id from program_dovus where mac_time<$suan");

while($row1=sed_sql_fetcharray($kontrol_sql1)) {
sed_sql_query("delete from oranlar_futbol where mac_db_id='$row1[id]'");
sed_sql_query("delete from program_futbol where id='$row1[id]'");
sed_sql_query("delete from maclar_oranlar where mac_db_id='$row1[id]' and spor_tipi='futbol'");
}
while($row2=sed_sql_fetcharray($kontrol_sql2)) {
sed_sql_query("delete from oranlar_basketbol where mac_db_id='$row2[id]'");
sed_sql_query("delete from program_basketbol where id='$row2[id]'");
sed_sql_query("delete from maclar_oranlar where mac_db_id='$row2[id]' and spor_tipi='basketbol'");
}
while($row3=sed_sql_fetcharray($kontrol_sql3)) {
sed_sql_query("delete from oranlar_tenis where mac_db_id='$row3[id]'");
sed_sql_query("delete from program_tenis where id='$row3[id]'");
sed_sql_query("delete from maclar_oranlar where mac_db_id='$row3[id]' and spor_tipi='tenis'");
}
while($row4=sed_sql_fetcharray($kontrol_sql4)) {
sed_sql_query("delete from oranlar_voleybol where mac_db_id='$row4[id]'");
sed_sql_query("delete from program_voleybol where id='$row4[id]'");
}
while($row5=sed_sql_fetcharray($kontrol_sql5)) {
sed_sql_query("delete from oranlar_buzhokeyi where mac_db_id='$row5[id]'");
sed_sql_query("delete from program_buzhokeyi where id='$row5[id]'");
}
while($row6=sed_sql_fetcharray($kontrol_sql6)) {
sed_sql_query("delete from program_masatenisi where id='$row6[id]'");
}
while($row7=sed_sql_fetcharray($kontrol_sql7)) {
sed_sql_query("delete from program_beyzbol where id='$row7[id]'");
}
while($row8=sed_sql_fetcharray($kontrol_sql8)) {
sed_sql_query("delete from program_rugby where id='$row8[id]'");
}
while($row9=sed_sql_fetcharray($kontrol_sql9)) {
sed_sql_query("delete from program_dovus where id='$row9[id]'");
}

$do_cache = 1;
$mikro = microtime();

$ulke = gd("ulke");

if(!empty($ulke)) { $ulke_ekle = "and kupa_ulke='$ulke'"; } else { $ulke_ekle = ""; }

$sasi=0;

$gizli_ligler = gizli_lig_listbuz();

if($gizli_ligler=="") { $gizli_lig_ekle = ""; } else { $gizli_lig_ekle = "and kupa_isim not in ($gizli_ligler)"; }

$gizli_ekle = "$gizli_lig_ekle";
/* yasak kelimeler */ 
$whereyasak ="";
$sec = "SELECT * FROM yasak_kelimeler WHERE user_id IN (1,".$_SESSION['betuser'].",".implode(",", $_SESSION['ustler']).")";
$sor = sed_sql_query($sec);
while($r = sed_sql_fetchassoc($sor)) {
$whereyasak.= ' AND ev_takim not like "%'.$r['kelime'].'%" AND konuk_takim not like "%'.$r['kelime'].'%" ';
}
/* yasak kelimeler */
$kayittime_ver = $suan-300;
$sqladder = "and kayittime<$kayittime_ver and bulten='hititbet' $ulke_ekle $gizli_ekle and kupa_isim not like '%Duello%' {$whereyasak} and aktif='1'";
$sor = sed_sql_query("select * from program_buzhokeyi where id!='' $sqladder group by kupa_isim  order by mac_time asc ");

if(userayar('sporbulten')==0) { echo "<div style='text-align: center;font-weight: bold;'>".getTranslation('yeniyerler_kasa364')."</div>"; } else {

if(sed_sql_numrows($sor)<1) { die("<div style='text-align: center;font-weight: bold;'>".getTranslation('exportmusabakabulunmadi')."</div>"); }

$say=1;
while($row=sed_sql_fetcharray($sor)) { 
$say++;
?>
<div class="navtitle navsub ">
<div class="tlsubitem">
<div class="icon"><div class="sports_small ice-hockey"></div> </div>
<div class="text"><?=$row['kupa_ulke'];?>-<?=$row['kupa_isim'];?></div>
</div>
</div>
<?

$i = 1;
unset($ss);
unset($ass);
$ss = sed_sql_query("select * from program_buzhokeyi where id!='' $sqladder and kupa_isim='$row[kupa_isim]' order by mac_time asc ");
while($ass=sed_sql_fetcharray($ss)){
$i++;

$ev_kazanc = oranbulbuz($ass['id'],17);

$beraberlik = oranbulbuz($ass['id'],18);

$konuk_kazanc = oranbulbuz($ass['id'],19);

$mbs = mbsverbuz($ass['id'],$ass['mbs'],$ass['kupa_id']);

$encoded = "$ass[id]|$ass[ev_takim]|$ass[konuk_takim]|$ass[mac_kodu]|$mbs|$ass[mac_time]|buzhokeyi";
?>

<div class="<? if ($i %2 != 0){ ?>even<? }else{ ?>odd<? } ?>">
<div id="e9492123" class="event match " onclick="detaygetir('5','<?=$ass["id"];?>');">
<div class="">
<div colspan="11" class="c_comment">
<div class="c_comment"></div>
<div class="c_pointer"></div>
</div>
</div>
<div class="event_wrapper">
<div class="datetime ">
<div class="sportsIcon ">
<div class="icon">
<div class="sports soccer"></div>
</div>
</div>
<div class="date small ">
<div> <?=date("d.m H:i",$ass['mac_time']); ?> </div>
<img src="assets/img/live_rain.png" alt="" width="23" height="23" class="hidden">
<span class=""> <img src="assets/img/icon_top.png" alt="" width="24" height="12"> </span>
</div>
</div>
<div class="teamrows">
<div class="teamrow">
<div class="team"> <?=$ass["ev_takim"];?>  </div>
<div class="score">
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
</div>
</div>
<div class="teamrow">
<div class="team"> <?=$ass["konuk_takim"];?>  </div>
<div class="score">
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
</div>
</div>
</div>
<div class=""> <div class="count"> <?=getTranslation('exportmbs')?> <?=$mbs;?> </div></div>
<div class="hidden" onclick="toggleBetMatrix(event, 9492123)"></div>
<div class="arrow "></div>
</div>
</div>
</div>

<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w25"><?=getTranslation('exportmacsonucutahmin')?></div>
<div class="cell w25 rsBut"><div class="<?=$ass["mac_kodu"];?> qbutton l" oddsid="<?=$ass["mac_kodu"];?>1" onClick="kupon(<?=$ass["mac_kodu"];?>1,<?=$ass["mac_kodu"];?>,'<?=codekupon("$encoded|17|$ev_kazanc"); ?>', this);"> <div class="caption">1</div> <div class="quote"><?=$ev_kazanc;?></div></div></div>
<div class="cell w25 rsBut"><div class="<?=$ass["mac_kodu"];?> qbutton s" oddsid="<?=$ass["mac_kodu"];?>2" onClick="kupon(<?=$ass["mac_kodu"];?>2,<?=$ass["mac_kodu"];?>,'<?=codekupon("$encoded|18|$beraberlik"); ?>', this);"> <div class="caption">X</div> <div class="quote"><?=$beraberlik;?></div></div></div>
<div class="cell w25 rsBut"> <div class="<?=$ass["mac_kodu"];?> qbutton r" oddsid="<?=$ass["mac_kodu"];?>3" onClick="kupon(<?=$ass["mac_kodu"];?>3,<?=$ass["mac_kodu"];?>,'<?=codekupon("$encoded|19|$konuk_kazanc"); ?>', this);"> <div class="caption">2</div> <div class="quote"><?=$konuk_kazanc;?></div></div></div>
<div class=""> </div>
</div>

<? } ?>
<? } ?>
<? } ?>

<?

$sor = sed_sql_query("select oran_val_id,mac_kodu from kupon where session_id='$session_id' and spor_tip='buzhokeyi'");

while($row=sed_sql_fetcharray($sor)) {

?>

<script>$("div[oddsid='<?=$row['mac_kodu'];?><?=$row['oran_val_id'];?>']").addClass('selected');</script>

<? }

}

if($a=="masatenisbulten") {

$suan = time();

$kontrol_sql1 = sed_sql_query("select id from program_futbol where mac_time<$suan");
$kontrol_sql2 = sed_sql_query("select id from program_basketbol where mac_time<$suan");
$kontrol_sql3 = sed_sql_query("select id from program_tenis where mac_time<$suan");
$kontrol_sql4 = sed_sql_query("select id from program_voleybol where mac_time<$suan");
$kontrol_sql5 = sed_sql_query("select id from program_buzhokeyi where mac_time<$suan");
$kontrol_sql6 = sed_sql_query("select id from program_masatenisi where mac_time<$suan");
$kontrol_sql7 = sed_sql_query("select id from program_beyzbol where mac_time<$suan");
$kontrol_sql8 = sed_sql_query("select id from program_rugby where mac_time<$suan");
$kontrol_sql9 = sed_sql_query("select id from program_dovus where mac_time<$suan");

while($row1=sed_sql_fetcharray($kontrol_sql1)) {
sed_sql_query("delete from oranlar_futbol where mac_db_id='$row1[id]'");
sed_sql_query("delete from program_futbol where id='$row1[id]'");
sed_sql_query("delete from maclar_oranlar where mac_db_id='$row1[id]' and spor_tipi='futbol'");
}
while($row2=sed_sql_fetcharray($kontrol_sql2)) {
sed_sql_query("delete from oranlar_basketbol where mac_db_id='$row2[id]'");
sed_sql_query("delete from program_basketbol where id='$row2[id]'");
sed_sql_query("delete from maclar_oranlar where mac_db_id='$row2[id]' and spor_tipi='basketbol'");
}
while($row3=sed_sql_fetcharray($kontrol_sql3)) {
sed_sql_query("delete from oranlar_tenis where mac_db_id='$row3[id]'");
sed_sql_query("delete from program_tenis where id='$row3[id]'");
sed_sql_query("delete from maclar_oranlar where mac_db_id='$row3[id]' and spor_tipi='tenis'");
}
while($row4=sed_sql_fetcharray($kontrol_sql4)) {
sed_sql_query("delete from oranlar_voleybol where mac_db_id='$row4[id]'");
sed_sql_query("delete from program_voleybol where id='$row4[id]'");
}
while($row5=sed_sql_fetcharray($kontrol_sql5)) {
sed_sql_query("delete from oranlar_buzhokeyi where mac_db_id='$row5[id]'");
sed_sql_query("delete from program_buzhokeyi where id='$row5[id]'");
}
while($row6=sed_sql_fetcharray($kontrol_sql6)) {
sed_sql_query("delete from program_masatenisi where id='$row6[id]'");
}
while($row7=sed_sql_fetcharray($kontrol_sql7)) {
sed_sql_query("delete from program_beyzbol where id='$row7[id]'");
}
while($row8=sed_sql_fetcharray($kontrol_sql8)) {
sed_sql_query("delete from program_rugby where id='$row8[id]'");
}
while($row9=sed_sql_fetcharray($kontrol_sql9)) {
sed_sql_query("delete from program_dovus where id='$row9[id]'");
}

$do_cache = 1;
$mikro = microtime();

$sasi=0;

$gizli_ligler = gizli_lig_listmasatenisi();

if($gizli_ligler=="") { $gizli_lig_ekle = ""; } else { $gizli_lig_ekle = "and kupa_isim not in ($gizli_ligler)"; }

$gizli_ekle = "$gizli_lig_ekle";
/* yasak kelimeler */ 
$whereyasak ="";
$sec = "SELECT * FROM yasak_kelimeler WHERE user_id IN (1,".$_SESSION['betuser'].",".implode(",", $_SESSION['ustler']).")";
$sor = sed_sql_query($sec);
while($r = sed_sql_fetchassoc($sor)) {
$whereyasak.= ' AND ev_takim not like "%'.$r['kelime'].'%" AND konuk_takim not like "%'.$r['kelime'].'%" ';
}
/* yasak kelimeler */

$kayittime_ver = $suan-60;
$sqladder = "and kayittime<$kayittime_ver and bulten='hititbet' $gizli_ekle and kupa_isim not like '%Duello%' {$whereyasak} and aktif='1'";
$sor = sed_sql_query("select * from program_masatenisi where id!='' $sqladder group by kupa_isim  order by mac_time asc ");

if(userayar('sporbulten')==0) { echo "<div style='text-align: center;font-weight: bold;'>".getTranslation('yeniyerler_kasa364')."</div>"; } else {

if(sed_sql_numrows($sor)<1) { die("<div style='text-align: center;font-weight: bold;'>".getTranslation('exportmusabakabulunmadi')."</div>"); }

$say=1;
while($row=sed_sql_fetcharray($sor)) { 
$say++;
?>

<div id="tenis_<?=$row['kupa_id'];?>" class="navtitle navsub ">
<div class="tlsubitem">
<div class="icon"><div class="sports_small table-tennis"></div> </div>
<div class="text"><?=$row['kupa_ulke'];?>-<?=$row['kupa_isim'];?></div>
</div>
</div>

<?
$mactoplamsayisi = 0;
$i = 1;
unset($ss);
unset($ass);
$ss = sed_sql_query("select * from program_masatenisi where id!='' $sqladder and kupa_isim='$row[kupa_isim]' order by mac_time asc ");
while($ass=sed_sql_fetcharray($ss)){
$i++;

$ev_kazanc = $ass['kimkazanir_1'];
$konuk_kazanc = $ass['kimkazanir_2'];	

$mbs = mbsvermasatenisi($ass['id'],$ass['mbs'],$ass['kupa_id']);

$encoded = "$ass[id]|$ass[ev_takim]|$ass[konuk_takim]|$ass[mac_kodu]|$mbs|$ass[mac_time]|masatenisi";

if($ev_kazanc>0 || $konuk_kazanc>0){
$mactoplamsayisi++;
?>

<div class="<? if ($i %2 != 0){ ?>even<? }else{ ?>odd<? } ?>">
<div id="e9492123" class="event match " onclick="detaygetir('3','<?=$ass["id"];?>');">
<div class="">
<div colspan="11" class="c_comment">
<div class="c_comment"></div>
<div class="c_pointer"></div>
</div>
</div>
<div class="event_wrapper">
<div class="datetime ">
<div class="sportsIcon ">
<div class="icon">
<div class="sports soccer"></div>
</div>
</div>
<div class="date small ">
<div> <?=date("d.m H:i",$ass['mac_time']); ?> </div>
<img src="assets/img/live_rain.png" alt="" width="23" height="23" class="hidden">
<span class=""> <img src="assets/img/icon_top.png" alt="" width="24" height="12"> </span>
</div>
</div>
<div class="teamrows">
<div class="teamrow">
<div class="team"> <?=$ass["ev_takim"];?>  </div>
<div class="score">
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
</div>
</div>
<div class="teamrow">
<div class="team"> <?=$ass["konuk_takim"];?>  </div>
<div class="score">
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
</div>
</div>
</div>
<div class=""> <div class="count"> <?=getTranslation('exportmbs')?> <?=$mbs;?> </div></div>
<div class="hidden" onclick="toggleBetMatrix(event, 9492123)"></div>
<div class="arrow "></div>
</div>
</div>
</div>

<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('exportkimkazanirtahmin')?></div>

<div class="cell w25 rsBut"><div class="<?=$ass["mac_kodu"];?> qbutton l" oddsid="<?=$ass["mac_kodu"];?>1" onClick="kupon(<?=$ass["mac_kodu"];?>1,<?=$ass["mac_kodu"];?>,'<?=codekupon("$encoded|1|$ev_kazanc"); ?>', this);"> <div class="caption">1</div> <div class="quote"><?=$ev_kazanc;?></div></div></div>

<div class="cell w25 rsBut"> <div class="<?=$ass["mac_kodu"];?> qbutton s" oddsid="<?=$ass["mac_kodu"];?>2" onClick="kupon(<?=$ass["mac_kodu"];?>2,<?=$ass["mac_kodu"];?>,'<?=codekupon("$encoded|2|$konuk_kazanc"); ?>', this);"> <div class="caption">2</div> <div class="quote"><?=$konuk_kazanc;?></div></div></div>

<div class=""> </div>
</div>

<? } ?>

<? } ?>
<? } ?>
<? } ?>

<?

$sor = sed_sql_query("select oran_val_id,mac_kodu from kupon where session_id='$session_id' and spor_tip='masatenisi'");

while($row=sed_sql_fetcharray($sor)) {

?>

<script>$("div[oddsid='<?=$row['mac_kodu'];?><?=$row['oran_val_id'];?>']").addClass('selected');</script>

<? }

}

if($a=="beyzbolbulten") {

$suan = time();

$kontrol_sql1 = sed_sql_query("select id from program_futbol where mac_time<$suan");
$kontrol_sql2 = sed_sql_query("select id from program_basketbol where mac_time<$suan");
$kontrol_sql3 = sed_sql_query("select id from program_tenis where mac_time<$suan");
$kontrol_sql4 = sed_sql_query("select id from program_voleybol where mac_time<$suan");
$kontrol_sql5 = sed_sql_query("select id from program_buzhokeyi where mac_time<$suan");
$kontrol_sql6 = sed_sql_query("select id from program_masatenisi where mac_time<$suan");
$kontrol_sql7 = sed_sql_query("select id from program_beyzbol where mac_time<$suan");
$kontrol_sql8 = sed_sql_query("select id from program_rugby where mac_time<$suan");
$kontrol_sql9 = sed_sql_query("select id from program_dovus where mac_time<$suan");

while($row1=sed_sql_fetcharray($kontrol_sql1)) {
sed_sql_query("delete from oranlar_futbol where mac_db_id='$row1[id]'");
sed_sql_query("delete from program_futbol where id='$row1[id]'");
sed_sql_query("delete from maclar_oranlar where mac_db_id='$row1[id]' and spor_tipi='futbol'");
}
while($row2=sed_sql_fetcharray($kontrol_sql2)) {
sed_sql_query("delete from oranlar_basketbol where mac_db_id='$row2[id]'");
sed_sql_query("delete from program_basketbol where id='$row2[id]'");
sed_sql_query("delete from maclar_oranlar where mac_db_id='$row2[id]' and spor_tipi='basketbol'");
}
while($row3=sed_sql_fetcharray($kontrol_sql3)) {
sed_sql_query("delete from oranlar_tenis where mac_db_id='$row3[id]'");
sed_sql_query("delete from program_tenis where id='$row3[id]'");
sed_sql_query("delete from maclar_oranlar where mac_db_id='$row3[id]' and spor_tipi='tenis'");
}
while($row4=sed_sql_fetcharray($kontrol_sql4)) {
sed_sql_query("delete from oranlar_voleybol where mac_db_id='$row4[id]'");
sed_sql_query("delete from program_voleybol where id='$row4[id]'");
}
while($row5=sed_sql_fetcharray($kontrol_sql5)) {
sed_sql_query("delete from oranlar_buzhokeyi where mac_db_id='$row5[id]'");
sed_sql_query("delete from program_buzhokeyi where id='$row5[id]'");
}
while($row6=sed_sql_fetcharray($kontrol_sql6)) {
sed_sql_query("delete from program_masatenisi where id='$row6[id]'");
}
while($row7=sed_sql_fetcharray($kontrol_sql7)) {
sed_sql_query("delete from program_beyzbol where id='$row7[id]'");
}
while($row8=sed_sql_fetcharray($kontrol_sql8)) {
sed_sql_query("delete from program_rugby where id='$row8[id]'");
}
while($row9=sed_sql_fetcharray($kontrol_sql9)) {
sed_sql_query("delete from program_dovus where id='$row9[id]'");
}

$do_cache = 1;
$mikro = microtime();

$sasi=0;

$gizli_ligler = gizli_lig_listbeyzbol();

if($gizli_ligler=="") { $gizli_lig_ekle = ""; } else { $gizli_lig_ekle = "and kupa_isim not in ($gizli_ligler)"; }

$gizli_ekle = "$gizli_lig_ekle";
/* yasak kelimeler */ 
$whereyasak ="";
$sec = "SELECT * FROM yasak_kelimeler WHERE user_id IN (1,".$_SESSION['betuser'].",".implode(",", $_SESSION['ustler']).")";
$sor = sed_sql_query($sec);
while($r = sed_sql_fetchassoc($sor)) {
$whereyasak.= ' AND ev_takim not like "%'.$r['kelime'].'%" AND konuk_takim not like "%'.$r['kelime'].'%" ';
}
/* yasak kelimeler */

$kayittime_ver = $suan-60;
$sqladder = "and kayittime<$kayittime_ver and bulten='hititbet' $gizli_ekle and kupa_isim not like '%Duello%' {$whereyasak} and aktif='1'";
$sor = sed_sql_query("select * from program_beyzbol where id!='' $sqladder group by kupa_isim  order by mac_time asc ");

if(userayar('sporbulten')==0) { echo "<div style='text-align: center;font-weight: bold;'>".getTranslation('yeniyerler_kasa364')."</div>"; } else {

if(sed_sql_numrows($sor)<1) { die("<div style='text-align: center;font-weight: bold;'>".getTranslation('exportmusabakabulunmadi')."</div>"); }

$say=1;
while($row=sed_sql_fetcharray($sor)) { 
$say++;
?>

<div id="tenis_<?=$row['kupa_id'];?>" class="navtitle navsub ">
<div class="tlsubitem">
<div class="icon"><div class="sports_small baseball"></div> </div>
<div class="text"><?=$row['kupa_ulke'];?>-<?=$row['kupa_isim'];?></div>
</div>
</div>

<?
$mactoplamsayisi = 0;
$i = 1;
unset($ss);
unset($ass);
$ss = sed_sql_query("select * from program_beyzbol where id!='' $sqladder and kupa_isim='$row[kupa_isim]' order by mac_time asc ");
while($ass=sed_sql_fetcharray($ss)){
$i++;

$ev_kazanc = $ass['kimkazanir_1'];
$konuk_kazanc = $ass['kimkazanir_2'];	

$mbs = mbsverbeyzbol($ass['id'],$ass['mbs'],$ass['kupa_id']);

$encoded = "$ass[id]|$ass[ev_takim]|$ass[konuk_takim]|$ass[mac_kodu]|$mbs|$ass[mac_time]|beyzbol";

if($ev_kazanc>0 || $konuk_kazanc>0){
$mactoplamsayisi++;
?>

<div class="<? if ($i %2 != 0){ ?>even<? }else{ ?>odd<? } ?>">
<div id="e9492123" class="event match " onclick="detaygetir('3','<?=$ass["id"];?>');">
<div class="">
<div colspan="11" class="c_comment">
<div class="c_comment"></div>
<div class="c_pointer"></div>
</div>
</div>
<div class="event_wrapper">
<div class="datetime ">
<div class="sportsIcon ">
<div class="icon">
<div class="sports soccer"></div>
</div>
</div>
<div class="date small ">
<div> <?=date("d.m H:i",$ass['mac_time']); ?> </div>
<img src="assets/img/live_rain.png" alt="" width="23" height="23" class="hidden">
<span class=""> <img src="assets/img/icon_top.png" alt="" width="24" height="12"> </span>
</div>
</div>
<div class="teamrows">
<div class="teamrow">
<div class="team"> <?=$ass["ev_takim"];?>  </div>
<div class="score">
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
</div>
</div>
<div class="teamrow">
<div class="team"> <?=$ass["konuk_takim"];?>  </div>
<div class="score">
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
</div>
</div>
</div>
<div class=""> <div class="count"> <?=getTranslation('exportmbs')?> <?=$mbs;?> </div></div>
<div class="hidden" onclick="toggleBetMatrix(event, 9492123)"></div>
<div class="arrow "></div>
</div>
</div>
</div>

<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('exportkimkazanirtahmin')?></div>

<div class="cell w25 rsBut"><div class="<?=$ass["mac_kodu"];?> qbutton l" oddsid="<?=$ass["mac_kodu"];?>1" onClick="kupon(<?=$ass["mac_kodu"];?>1,<?=$ass["mac_kodu"];?>,'<?=codekupon("$encoded|1|$ev_kazanc"); ?>', this);"> <div class="caption">1</div> <div class="quote"><?=$ev_kazanc;?></div></div></div>

<div class="cell w25 rsBut"> <div class="<?=$ass["mac_kodu"];?> qbutton s" oddsid="<?=$ass["mac_kodu"];?>2" onClick="kupon(<?=$ass["mac_kodu"];?>2,<?=$ass["mac_kodu"];?>,'<?=codekupon("$encoded|2|$konuk_kazanc"); ?>', this);"> <div class="caption">2</div> <div class="quote"><?=$konuk_kazanc;?></div></div></div>

<div class=""> </div>
</div>

<? } ?>

<? } ?>
<? } ?>
<? } ?>

<?

$sor = sed_sql_query("select oran_val_id,mac_kodu from kupon where session_id='$session_id' and spor_tip='beyzbol'");

while($row=sed_sql_fetcharray($sor)) {

?>

<script>$("div[oddsid='<?=$row['mac_kodu'];?><?=$row['oran_val_id'];?>']").addClass('selected');</script>

<? }

}

if($a=="rugbybulten") {

$suan = time();

$kontrol_sql1 = sed_sql_query("select id from program_futbol where mac_time<$suan");
$kontrol_sql2 = sed_sql_query("select id from program_basketbol where mac_time<$suan");
$kontrol_sql3 = sed_sql_query("select id from program_tenis where mac_time<$suan");
$kontrol_sql4 = sed_sql_query("select id from program_voleybol where mac_time<$suan");
$kontrol_sql5 = sed_sql_query("select id from program_buzhokeyi where mac_time<$suan");
$kontrol_sql6 = sed_sql_query("select id from program_masatenisi where mac_time<$suan");
$kontrol_sql7 = sed_sql_query("select id from program_beyzbol where mac_time<$suan");
$kontrol_sql8 = sed_sql_query("select id from program_rugby where mac_time<$suan");
$kontrol_sql9 = sed_sql_query("select id from program_dovus where mac_time<$suan");

while($row1=sed_sql_fetcharray($kontrol_sql1)) {
sed_sql_query("delete from oranlar_futbol where mac_db_id='$row1[id]'");
sed_sql_query("delete from program_futbol where id='$row1[id]'");
sed_sql_query("delete from maclar_oranlar where mac_db_id='$row1[id]' and spor_tipi='futbol'");
}
while($row2=sed_sql_fetcharray($kontrol_sql2)) {
sed_sql_query("delete from oranlar_basketbol where mac_db_id='$row2[id]'");
sed_sql_query("delete from program_basketbol where id='$row2[id]'");
sed_sql_query("delete from maclar_oranlar where mac_db_id='$row2[id]' and spor_tipi='basketbol'");
}
while($row3=sed_sql_fetcharray($kontrol_sql3)) {
sed_sql_query("delete from oranlar_tenis where mac_db_id='$row3[id]'");
sed_sql_query("delete from program_tenis where id='$row3[id]'");
sed_sql_query("delete from maclar_oranlar where mac_db_id='$row3[id]' and spor_tipi='tenis'");
}
while($row4=sed_sql_fetcharray($kontrol_sql4)) {
sed_sql_query("delete from oranlar_voleybol where mac_db_id='$row4[id]'");
sed_sql_query("delete from program_voleybol where id='$row4[id]'");
}
while($row5=sed_sql_fetcharray($kontrol_sql5)) {
sed_sql_query("delete from oranlar_buzhokeyi where mac_db_id='$row5[id]'");
sed_sql_query("delete from program_buzhokeyi where id='$row5[id]'");
}
while($row6=sed_sql_fetcharray($kontrol_sql6)) {
sed_sql_query("delete from program_masatenisi where id='$row6[id]'");
}
while($row7=sed_sql_fetcharray($kontrol_sql7)) {
sed_sql_query("delete from program_beyzbol where id='$row7[id]'");
}
while($row8=sed_sql_fetcharray($kontrol_sql8)) {
sed_sql_query("delete from program_rugby where id='$row8[id]'");
}
while($row9=sed_sql_fetcharray($kontrol_sql9)) {
sed_sql_query("delete from program_dovus where id='$row9[id]'");
}

$do_cache = 1;
$mikro = microtime();

$ulke = gd("ulke");

if(!empty($ulke)) { $ulke_ekle = "and kupa_ulke='$ulke'"; } else { $ulke_ekle = ""; }

$sasi=0;

$gizli_ligler = gizli_lig_listrugby();

if($gizli_ligler=="") { $gizli_lig_ekle = ""; } else { $gizli_lig_ekle = "and kupa_isim not in ($gizli_ligler)"; }

$gizli_ekle = "$gizli_lig_ekle";
/* yasak kelimeler */ 
$whereyasak ="";
$sec = "SELECT * FROM yasak_kelimeler WHERE user_id IN (1,".$_SESSION['betuser'].",".implode(",", $_SESSION['ustler']).")";
$sor = sed_sql_query($sec);
while($r = sed_sql_fetchassoc($sor)) {
$whereyasak.= ' AND ev_takim not like "%'.$r['kelime'].'%" AND konuk_takim not like "%'.$r['kelime'].'%" ';
}
/* yasak kelimeler */
$kayittime_ver = $suan-300;
$sqladder = "and kayittime<$kayittime_ver and bulten='hititbet' $ulke_ekle $gizli_ekle and kupa_isim not like '%Duello%' {$whereyasak} and aktif='1'";
$sor = sed_sql_query("select * from program_rugby where id!='' $sqladder group by kupa_isim  order by mac_time asc ");

if(userayar('sporbulten')==0) { echo "<div style='text-align: center;font-weight: bold;'>".getTranslation('yeniyerler_kasa364')."</div>"; } else {

if(sed_sql_numrows($sor)<1) { die("<div style='text-align: center;font-weight: bold;'>".getTranslation('exportmusabakabulunmadi')."</div>"); }

$say=1;
while($row=sed_sql_fetcharray($sor)) { 
$say++;
?>
<div class="navtitle navsub ">
<div class="tlsubitem">
<div class="icon"><div class="sports_small rugby"></div> </div>
<div class="text"><?=$row['kupa_ulke'];?>-<?=$row['kupa_isim'];?></div>
</div>
</div>
<?

$i = 1;
unset($ss);
unset($ass);
$ss = sed_sql_query("select * from program_rugby where id!='' $sqladder and kupa_isim='$row[kupa_isim]' order by mac_time asc ");
while($ass=sed_sql_fetcharray($ss)){
$i++;

$ev_kazanc = $ass['1x2_1'];
$beraberlik = $ass['1x2_x'];
$konuk_kazanc = $ass['1x2_2'];	

$mbs = mbsverrugby($ass['id'],$ass['mbs'],$ass['kupa_id']);

$encoded = "$ass[id]|$ass[ev_takim]|$ass[konuk_takim]|$ass[mac_kodu]|$mbs|$ass[mac_time]|rugby";
?>

<div class="<? if ($i %2 != 0){ ?>even<? }else{ ?>odd<? } ?>">
<div id="e9492123" class="event match " onclick="detaygetir('5','<?=$ass["id"];?>');">
<div class="">
<div colspan="11" class="c_comment">
<div class="c_comment"></div>
<div class="c_pointer"></div>
</div>
</div>
<div class="event_wrapper">
<div class="datetime ">
<div class="sportsIcon ">
<div class="icon">
<div class="sports soccer"></div>
</div>
</div>
<div class="date small ">
<div> <?=date("d.m H:i",$ass['mac_time']); ?> </div>
<img src="assets/img/live_rain.png" alt="" width="23" height="23" class="hidden">
<span class=""> <img src="assets/img/icon_top.png" alt="" width="24" height="12"> </span>
</div>
</div>
<div class="teamrows">
<div class="teamrow">
<div class="team"> <?=$ass["ev_takim"];?>  </div>
<div class="score">
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
</div>
</div>
<div class="teamrow">
<div class="team"> <?=$ass["konuk_takim"];?>  </div>
<div class="score">
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
</div>
</div>
</div>
<div class=""> <div class="count"> <?=getTranslation('exportmbs')?> <?=$mbs;?> </div></div>
<div class="hidden" onclick="toggleBetMatrix(event, 9492123)"></div>
<div class="arrow "></div>
</div>
</div>
</div>

<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w25"><?=getTranslation('exportmacsonucutahmin')?></div>
<div class="cell w25 rsBut"><div class="<?=$ass["mac_kodu"];?> qbutton l" oddsid="<?=$ass["mac_kodu"];?>1" onClick="kupon(<?=$ass["mac_kodu"];?>1,<?=$ass["mac_kodu"];?>,'<?=codekupon("$encoded|1|$ev_kazanc"); ?>', this);"> <div class="caption">1</div> <div class="quote"><?=$ev_kazanc;?></div></div></div>
<div class="cell w25 rsBut"><div class="<?=$ass["mac_kodu"];?> qbutton s" oddsid="<?=$ass["mac_kodu"];?>2" onClick="kupon(<?=$ass["mac_kodu"];?>2,<?=$ass["mac_kodu"];?>,'<?=codekupon("$encoded|2|$beraberlik"); ?>', this);"> <div class="caption">X</div> <div class="quote"><?=$beraberlik;?></div></div></div>
<div class="cell w25 rsBut"> <div class="<?=$ass["mac_kodu"];?> qbutton r" oddsid="<?=$ass["mac_kodu"];?>3" onClick="kupon(<?=$ass["mac_kodu"];?>3,<?=$ass["mac_kodu"];?>,'<?=codekupon("$encoded|3|$konuk_kazanc"); ?>', this);"> <div class="caption">2</div> <div class="quote"><?=$konuk_kazanc;?></div></div></div>
<div class=""> </div>
</div>

<? } ?>
<? } ?>
<? } ?>

<?

$sor = sed_sql_query("select oran_val_id,mac_kodu from kupon where session_id='$session_id' and spor_tip='rugby'");

while($row=sed_sql_fetcharray($sor)) {

?>

<script>$("div[oddsid='<?=$row['mac_kodu'];?><?=$row['oran_val_id'];?>']").addClass('selected');</script>

<? }

}

if($a=="dovusbulten") {

$suan = time();

$kontrol_sql1 = sed_sql_query("select id from program_futbol where mac_time<$suan");
$kontrol_sql2 = sed_sql_query("select id from program_basketbol where mac_time<$suan");
$kontrol_sql3 = sed_sql_query("select id from program_tenis where mac_time<$suan");
$kontrol_sql4 = sed_sql_query("select id from program_voleybol where mac_time<$suan");
$kontrol_sql5 = sed_sql_query("select id from program_buzhokeyi where mac_time<$suan");
$kontrol_sql6 = sed_sql_query("select id from program_masatenisi where mac_time<$suan");
$kontrol_sql7 = sed_sql_query("select id from program_beyzbol where mac_time<$suan");
$kontrol_sql8 = sed_sql_query("select id from program_rugby where mac_time<$suan");
$kontrol_sql9 = sed_sql_query("select id from program_dovus where mac_time<$suan");

while($row1=sed_sql_fetcharray($kontrol_sql1)) {
sed_sql_query("delete from oranlar_futbol where mac_db_id='$row1[id]'");
sed_sql_query("delete from program_futbol where id='$row1[id]'");
sed_sql_query("delete from maclar_oranlar where mac_db_id='$row1[id]' and spor_tipi='futbol'");
}
while($row2=sed_sql_fetcharray($kontrol_sql2)) {
sed_sql_query("delete from oranlar_basketbol where mac_db_id='$row2[id]'");
sed_sql_query("delete from program_basketbol where id='$row2[id]'");
sed_sql_query("delete from maclar_oranlar where mac_db_id='$row2[id]' and spor_tipi='basketbol'");
}
while($row3=sed_sql_fetcharray($kontrol_sql3)) {
sed_sql_query("delete from oranlar_tenis where mac_db_id='$row3[id]'");
sed_sql_query("delete from program_tenis where id='$row3[id]'");
sed_sql_query("delete from maclar_oranlar where mac_db_id='$row3[id]' and spor_tipi='tenis'");
}
while($row4=sed_sql_fetcharray($kontrol_sql4)) {
sed_sql_query("delete from oranlar_voleybol where mac_db_id='$row4[id]'");
sed_sql_query("delete from program_voleybol where id='$row4[id]'");
}
while($row5=sed_sql_fetcharray($kontrol_sql5)) {
sed_sql_query("delete from oranlar_buzhokeyi where mac_db_id='$row5[id]'");
sed_sql_query("delete from program_buzhokeyi where id='$row5[id]'");
}
while($row6=sed_sql_fetcharray($kontrol_sql6)) {
sed_sql_query("delete from program_masatenisi where id='$row6[id]'");
}
while($row7=sed_sql_fetcharray($kontrol_sql7)) {
sed_sql_query("delete from program_beyzbol where id='$row7[id]'");
}
while($row8=sed_sql_fetcharray($kontrol_sql8)) {
sed_sql_query("delete from program_rugby where id='$row8[id]'");
}
while($row9=sed_sql_fetcharray($kontrol_sql9)) {
sed_sql_query("delete from program_dovus where id='$row9[id]'");
}

$do_cache = 1;
$mikro = microtime();

$ulke = gd("ulke");

if(!empty($ulke)) { $ulke_ekle = "and kupa_ulke='$ulke'"; } else { $ulke_ekle = ""; }

$sasi=0;

$gizli_ligler = gizli_lig_listdovus();

if($gizli_ligler=="") { $gizli_lig_ekle = ""; } else { $gizli_lig_ekle = "and kupa_isim not in ($gizli_ligler)"; }

$gizli_ekle = "$gizli_lig_ekle";
/* yasak kelimeler */ 
$whereyasak ="";
$sec = "SELECT * FROM yasak_kelimeler WHERE user_id IN (1,".$_SESSION['betuser'].",".implode(",", $_SESSION['ustler']).")";
$sor = sed_sql_query($sec);
while($r = sed_sql_fetchassoc($sor)) {
$whereyasak.= ' AND ev_takim not like "%'.$r['kelime'].'%" AND konuk_takim not like "%'.$r['kelime'].'%" ';
}
/* yasak kelimeler */
$kayittime_ver = $suan-300;
$sqladder = "and kayittime<$kayittime_ver and bulten='hititbet' $ulke_ekle $gizli_ekle and kupa_isim not like '%Duello%' {$whereyasak} and aktif='1'";
$sor = sed_sql_query("select * from program_dovus where id!='' $sqladder group by kupa_isim  order by mac_time asc ");

if(userayar('sporbulten')==0) { echo "<div style='text-align: center;font-weight: bold;'>".getTranslation('yeniyerler_kasa364')."</div>"; } else {

if(sed_sql_numrows($sor)<1) { die("<div style='text-align: center;font-weight: bold;'>".getTranslation('exportmusabakabulunmadi')."</div>"); }

$say=1;
while($row=sed_sql_fetcharray($sor)) { 
$say++;
?>
<div class="navtitle navsub ">
<div class="tlsubitem">
<div class="icon"><div class="sports_small boxing"></div> </div>
<div class="text"><?=$row['kupa_ulke'];?>-<?=$row['kupa_isim'];?></div>
</div>
</div>
<?

$i = 1;
unset($ss);
unset($ass);
$ss = sed_sql_query("select * from program_dovus where id!='' $sqladder and kupa_isim='$row[kupa_isim]' order by mac_time asc ");
while($ass=sed_sql_fetcharray($ss)){
$i++;

$ev_kazanc = $ass['1x2_1'];
$beraberlik = $ass['1x2_x'];
$konuk_kazanc = $ass['1x2_2'];	

$mbs = mbsverdovus($ass['id'],$ass['mbs'],$ass['kupa_id']);

$encoded = "$ass[id]|$ass[ev_takim]|$ass[konuk_takim]|$ass[mac_kodu]|$mbs|$ass[mac_time]|dovus";
?>

<div class="<? if ($i %2 != 0){ ?>even<? }else{ ?>odd<? } ?>">
<div id="e9492123" class="event match " onclick="detaygetir('5','<?=$ass["id"];?>');">
<div class="">
<div colspan="11" class="c_comment">
<div class="c_comment"></div>
<div class="c_pointer"></div>
</div>
</div>
<div class="event_wrapper">
<div class="datetime ">
<div class="sportsIcon ">
<div class="icon">
<div class="sports soccer"></div>
</div>
</div>
<div class="date small ">
<div> <?=date("d.m H:i",$ass['mac_time']); ?> </div>
<img src="assets/img/live_rain.png" alt="" width="23" height="23" class="hidden">
<span class=""> <img src="assets/img/icon_top.png" alt="" width="24" height="12"> </span>
</div>
</div>
<div class="teamrows">
<div class="teamrow">
<div class="team"> <?=$ass["ev_takim"];?>  </div>
<div class="score">
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
</div>
</div>
<div class="teamrow">
<div class="team"> <?=$ass["konuk_takim"];?>  </div>
<div class="score">
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
</div>
</div>
</div>
<div class=""> <div class="count"> <?=getTranslation('exportmbs')?> <?=$mbs;?> </div></div>
<div class="hidden" onclick="toggleBetMatrix(event, 9492123)"></div>
<div class="arrow "></div>
</div>
</div>
</div>

<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w25"><?=getTranslation('exportmacsonucutahmin')?></div>
<div class="cell w25 rsBut"><div class="<?=$ass["mac_kodu"];?> qbutton l" oddsid="<?=$ass["mac_kodu"];?>1" onClick="kupon(<?=$ass["mac_kodu"];?>1,<?=$ass["mac_kodu"];?>,'<?=codekupon("$encoded|1|$ev_kazanc"); ?>', this);"> <div class="caption">1</div> <div class="quote"><?=$ev_kazanc;?></div></div></div>
<div class="cell w25 rsBut"><div class="<?=$ass["mac_kodu"];?> qbutton s" oddsid="<?=$ass["mac_kodu"];?>2" onClick="kupon(<?=$ass["mac_kodu"];?>2,<?=$ass["mac_kodu"];?>,'<?=codekupon("$encoded|2|$beraberlik"); ?>', this);"> <div class="caption">X</div> <div class="quote"><?=$beraberlik;?></div></div></div>
<div class="cell w25 rsBut"> <div class="<?=$ass["mac_kodu"];?> qbutton r" oddsid="<?=$ass["mac_kodu"];?>3" onClick="kupon(<?=$ass["mac_kodu"];?>3,<?=$ass["mac_kodu"];?>,'<?=codekupon("$encoded|3|$konuk_kazanc"); ?>', this);"> <div class="caption">2</div> <div class="quote"><?=$konuk_kazanc;?></div></div></div>
<div class=""> </div>
</div>

<? } ?>
<? } ?>
<? } ?>

<?

$sor = sed_sql_query("select oran_val_id,mac_kodu from kupon where session_id='$session_id' and spor_tip='dovus'");

while($row=sed_sql_fetcharray($sor)) {

?>

<script>$("div[oddsid='<?=$row['mac_kodu'];?><?=$row['oran_val_id'];?>']").addClass('selected');</script>

<? }

}

if($a=="detaygetir") {

$sportip = gd("sportip");
$mac_db_id = gd("id");

if($sportip==1){

$mb = bilgi("select * from program_futbol where id='$mac_db_id'");

$fark = $mb['mac_time']-time();

$gizli_oran_tips = gizli_oran_tips($mb['kupa_id'],$mb['id']);

if($gizli_oran_tips!="") { $gizli_ekle = "and oran_tip not in ($gizli_oran_tips)"; } else { $gizli_ekle = ""; }

?>

<div style="text-align: center;font-weight: bold;color: #2a7394;background-color: #fff;position: relative;z-index: 9999;" onclick="loadbulten2();"><?=getTranslation('exportlisteyedon')?></div>

<div class="odd singlebar barmiddle " style="z-index: 100;position: absolute;">
<div id="e9441141" class="event match noborder">
<div class="hidden"><div colspan="11" class="c_comment"><div class="c_comment"></div><div class="c_pointer"></div></div></div>
<div class="event_wrapper">
<div class="datetime ">
<div class="favorites hidden"> <img src="assets/img/favorite0.png"> </div>
<div class="sportsIcon "><div class="icon"><div class="sports soccer"></div> </div></div>
<div class="date small ">
<div> <?=date("d.m H:i",$mb['mac_time']); ?> </div>
<img src="assets/img/live_rain.png" alt="" width="23" height="23" class="hidden">
<span class=""> <img src="assets/img/icon_live.png" alt="" width="24" height="12"> </span>
</div>
</div>
<div class="teamrows">
<div class="teamrow">
<div class="team"> <?=$mb['ev_takim'];?>  </div>
<div class="score">
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
</div>
</div>
<div class="teamrow">
<div class="team"> <?=$mb['konuk_takim'];?>  </div>
<div class="score">
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
</div>
</div>
</div>
<div class="hidden"> <div class="hidden">  </div></div>
<div class="hidden"></div>
<div class="placeholder "></div>
</div>
</div>
</div>

<? if($mb['istatistik']>0){ ?>
<iframe src="https://href.li/?https://cs.betradar.com/ls/widgets/?/totobo/tr/page/widgets_lmts#matchId=<?=$mb['istatistik'];?>" id="liveTrackerCenter" frameborder="0" scrolling="no" style="width: 100%;height: 340px;margin-top:-50px;" onload="resizeIframe(this)"></iframe>
<? } ?>

<div id="rsg1" class="rsGroup" style="display: block;">

<?

$sor = sed_sql_query("select mac_db_id,oran_tip,durum,oran_val_id from oranlar_futbol where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' group by oran_tip order by oran_val_id asc");
$i = 1;
while($ass=sed_sql_fetchassoc($sor)) { 
$i++;
$tip = bilgi("select id,tip_isim,tip_kodu from oran_tip_futbol where id='$ass[oran_tip]'");

?>
<? if($tip['tip_kodu']==3) { ?>	
<div class="navitem noborder w100 odd" style=""> <div class="cell rsDesc w25"><?=getTranslation('foran'.$tip['id'].'')?></div>
<?
$sss = sed_sql_query("select id,mac_db_id,oran_tip,oran_val_id,oran,yapi,durum from oranlar_futbol ora where mac_db_id='$mac_db_id' and durum='1' and oran_tip='$ass[oran_tip]' $gizli_ekle order by (select yapi from oran_val_futbol ov where ov.id=ora.oran_val_id) asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_futbol where id='$row[oran_val_id]'");
$mbs = mbsver($mb['id'],$mb['mbs'],$mb['kupa_id']);
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$mbs|$mb[mac_time]|futbol";
$buoran = oranbul($mb['id'],$row['oran_val_id']);
?>
<div class="cell w25 rsBut"> <div class="<?=$mb["id"];?> qbutton <?=md5($row['oran_val_id']."|".$mb["id"]);?>  " oddsid="<?=$mb["id"];?><?=$row["oran_tip"];?><?=$row["oran_val_id"];?>" onclick="kupon(<?=$mb["id"];?><?=$row["oran_tip"];?><?=$row["oran_val_id"];?>,<?=$mb["id"];?>,'<?=codekupon("$encoded|$row[oran_val_id]|$buoran"); ?>', this);"> <div class="caption">

<? if($dil_bilgisi22['language']=='en'){ ?>


<? if($oran_bilgi['oran_val']=="E"){ ?>Y
<? } else if($oran_bilgi['oran_val']=="H"){ ?>N
<? } else if($oran_bilgi['oran_val']=="A"){ ?>U
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>O
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 and O
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 and O
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 and U
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 and U
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 and Y
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 and Y
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 and N
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 and N
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>No Goal
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>X and Y
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>D
<? } else if($oran_bilgi['oran_val']=="T"){ ?>S
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='de'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>J
<? } else if($oran_bilgi['oran_val']=="H"){ ?>K
<? } else if($oran_bilgi['oran_val']=="A"){ ?>N
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>T
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 und T
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 und T
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 und N
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 und N
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 und J
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 und J
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 und K
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 und K
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>Kein Ziel
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>X und J
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>P
<? } else if($oran_bilgi['oran_val']=="T"){ ?>E
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='ar'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>أجل
<? } else if($oran_bilgi['oran_val']=="H"){ ?>لا
<? } else if($oran_bilgi['oran_val']=="A"){ ?>أدنى
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>أعلى
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 وما فوق
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 وما فوق
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 و السفلى
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 و السفلى
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 و نعم
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 و نعم
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 و لا
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 و لا
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>لا هدف
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>س ونعم
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>زوجان
<? } else if($oran_bilgi['oran_val']=="T"){ ?>واحد
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='ru'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>да
<? } else if($oran_bilgi['oran_val']=="H"){ ?>нет
<? } else if($oran_bilgi['oran_val']=="A"){ ?>ниже
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>топ
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 и выше
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 и выше
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 и ниже
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 и ниже
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 и да
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 и да
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 и нет
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 и нет
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>Нет цели
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>Х и да
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>пара
<? } else if($oran_bilgi['oran_val']=="T"){ ?>один
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

</div> <div class="quote"><?=nf($buoran); ?></div></div></div>
<? } ?>
<div class=""></div>
</div>
<? } else if($tip['tip_kodu']==2) { ?>
<div class="navitem noborder w100 odd" style=""> <div class="cell rsDesc w50"><?=getTranslation('foran'.$tip['id'].'')?></div>
<?
$sss = sed_sql_query("select id,mac_db_id,oran_tip,oran_val_id,oran,yapi,durum from oranlar_futbol ora where mac_db_id='$mac_db_id' and durum='1' and oran_tip='$ass[oran_tip]' $gizli_ekle order by (select yapi from oran_val_futbol ov where ov.id=ora.oran_val_id) asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_futbol where id='$row[oran_val_id]'");
$mbs = mbsver($mb['id'],$mb['mbs'],$mb['kupa_id']);
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$mbs|$mb[mac_time]|futbol";
$buoran = oranbul($mb['id'],$row['oran_val_id']);
?>
<div class="cell w25 rsBut"> <div class="<?=$mb["id"];?> qbutton <?=md5($row['oran_val_id']."|".$mb["id"]);?>  " oddsid="<?=$mb["id"];?><?=$row["oran_tip"];?><?=$row["oran_val_id"];?>" onclick="kupon(<?=$mb["id"];?><?=$row["oran_tip"];?><?=$row["oran_val_id"];?>,<?=$mb["id"];?>,'<?=codekupon("$encoded|$row[oran_val_id]|$buoran"); ?>', this);"> <div class="caption">

<? if($dil_bilgisi22['language']=='en'){ ?>


<? if($oran_bilgi['oran_val']=="E"){ ?>Y
<? } else if($oran_bilgi['oran_val']=="H"){ ?>N
<? } else if($oran_bilgi['oran_val']=="A"){ ?>U
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>O
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 and O
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 and O
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 and U
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 and U
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 and Y
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 and Y
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 and N
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 and N
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>No Goal
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>X and Y
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>D
<? } else if($oran_bilgi['oran_val']=="T"){ ?>S
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='de'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>J
<? } else if($oran_bilgi['oran_val']=="H"){ ?>K
<? } else if($oran_bilgi['oran_val']=="A"){ ?>N
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>T
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 und T
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 und T
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 und N
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 und N
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 und J
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 und J
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 und K
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 und K
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>Kein Ziel
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>X und J
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>P
<? } else if($oran_bilgi['oran_val']=="T"){ ?>E
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='ar'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>أجل
<? } else if($oran_bilgi['oran_val']=="H"){ ?>لا
<? } else if($oran_bilgi['oran_val']=="A"){ ?>أدنى
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>أعلى
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 وما فوق
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 وما فوق
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 و السفلى
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 و السفلى
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 و نعم
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 و نعم
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 و لا
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 و لا
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>لا هدف
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>س ونعم
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>زوجان
<? } else if($oran_bilgi['oran_val']=="T"){ ?>واحد
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='ru'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>да
<? } else if($oran_bilgi['oran_val']=="H"){ ?>нет
<? } else if($oran_bilgi['oran_val']=="A"){ ?>ниже
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>топ
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 и выше
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 и выше
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 и ниже
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 и ниже
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 и да
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 и да
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 и нет
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 и нет
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>Нет цели
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>Х и да
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>пара
<? } else if($oran_bilgi['oran_val']=="T"){ ?>один
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

</div> <div class="quote"><?=nf($buoran); ?></div></div></div>
<? } ?>
<div class=""></div>
</div>
<? } else if($tip['tip_kodu']==4) { ?>
<div class="navitem odd"> <div class="w100 center text small bold" style="height:22px;"><?=getTranslation('foran'.$tip['id'].'')?></div></div>
<div class="navitem noborder w100 odd">
<?
$sss = sed_sql_query("select id,mac_db_id,oran_tip,oran_val_id,oran,yapi,durum from oranlar_futbol ora where mac_db_id='$mac_db_id' and durum='1' and oran_tip='$ass[oran_tip]' $gizli_ekle order by (select yapi from oran_val_futbol ov where ov.id=ora.oran_val_id) asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_futbol where id='$row[oran_val_id]'");
$mbs = mbsver($mb['id'],$mb['mbs'],$mb['kupa_id']);
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$mbs|$mb[mac_time]|futbol";
$buoran = oranbul($mb['id'],$row['oran_val_id']);
?>
<div class="cell w50"> <div class="<?=$mb["id"];?> qbutton <?=md5($row['oran_val_id']."|".$mb["id"]);?>  " oddsid="<?=$mb["id"];?><?=$row["oran_tip"];?><?=$row["oran_val_id"];?>" onclick="kupon(<?=$mb["id"];?><?=$row["oran_tip"];?><?=$row["oran_val_id"];?>,<?=$mb["id"];?>,'<?=codekupon("$encoded|$row[oran_val_id]|$buoran"); ?>', this);"> <div class="caption">

<? if($dil_bilgisi22['language']=='en'){ ?>


<? if($oran_bilgi['oran_val']=="E"){ ?>Y
<? } else if($oran_bilgi['oran_val']=="H"){ ?>N
<? } else if($oran_bilgi['oran_val']=="A"){ ?>U
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>O
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 and O
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 and O
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 and U
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 and U
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 and Y
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 and Y
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 and N
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 and N
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>No Goal
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>X and Y
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>D
<? } else if($oran_bilgi['oran_val']=="T"){ ?>S
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='de'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>J
<? } else if($oran_bilgi['oran_val']=="H"){ ?>K
<? } else if($oran_bilgi['oran_val']=="A"){ ?>N
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>T
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 und T
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 und T
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 und N
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 und N
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 und J
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 und J
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 und K
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 und K
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>Kein Ziel
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>X und J
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>P
<? } else if($oran_bilgi['oran_val']=="T"){ ?>E
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='ar'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>أجل
<? } else if($oran_bilgi['oran_val']=="H"){ ?>لا
<? } else if($oran_bilgi['oran_val']=="A"){ ?>أدنى
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>أعلى
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 وما فوق
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 وما فوق
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 و السفلى
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 و السفلى
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 و نعم
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 و نعم
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 و لا
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 و لا
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>لا هدف
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>س ونعم
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>زوجان
<? } else if($oran_bilgi['oran_val']=="T"){ ?>واحد
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='ru'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>да
<? } else if($oran_bilgi['oran_val']=="H"){ ?>нет
<? } else if($oran_bilgi['oran_val']=="A"){ ?>ниже
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>топ
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 и выше
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 и выше
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 и ниже
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 и ниже
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 и да
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 и да
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 и нет
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 и нет
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>Нет цели
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>Х и да
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>пара
<? } else if($oran_bilgi['oran_val']=="T"){ ?>один
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

</div> <div class="quote"><?=nf($buoran); ?></div></div></div>
<? if($kz==2 or $kz==4){ ?>
</div>
<div class="navitem noborder w100 odd">
<? } ?>
<? } ?>
</div>
<div class=""></div>
</div>
<? } else { ?>
<div class="navitem odd"> <div class="w100 center text small bold" style="height:22px;"><?=getTranslation('foran'.$tip['id'].'')?></div></div>
<div class="navitem noborder w100 odd">
<?
$sss = sed_sql_query("select id,mac_db_id,oran_tip,oran_val_id,oran,yapi,durum from oranlar_futbol ora where mac_db_id='$mac_db_id' and durum='1' and oran_tip='$ass[oran_tip]' $gizli_ekle order by (select yapi from oran_val_futbol ov where ov.id=ora.oran_val_id) asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_futbol where id='$row[oran_val_id]'");
$mbs = mbsver($mb['id'],$mb['mbs'],$mb['kupa_id']);
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$mbs|$mb[mac_time]|futbol";
$buoran = oranbul($mb['id'],$row['oran_val_id']);
?>
<div class="cell w50"> <div class="<?=$mb["id"];?> qbutton <?=md5($row['oran_val_id']."|".$mb["id"]);?>  " oddsid="<?=$mb["id"];?><?=$row["oran_tip"];?><?=$row["oran_val_id"];?>" onclick="kupon(<?=$mb["id"];?><?=$row["oran_tip"];?><?=$row["oran_val_id"];?>,<?=$mb["id"];?>,'<?=codekupon("$encoded|$row[oran_val_id]|$buoran"); ?>', this);"> <div class="caption">

<? if($dil_bilgisi22['language']=='en'){ ?>


<? if($oran_bilgi['oran_val']=="E"){ ?>Y
<? } else if($oran_bilgi['oran_val']=="H"){ ?>N
<? } else if($oran_bilgi['oran_val']=="A"){ ?>U
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>O
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 and O
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 and O
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 and U
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 and U
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 and Y
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 and Y
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 and N
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 and N
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>No Goal
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>X and Y
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>D
<? } else if($oran_bilgi['oran_val']=="T"){ ?>S
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='de'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>J
<? } else if($oran_bilgi['oran_val']=="H"){ ?>K
<? } else if($oran_bilgi['oran_val']=="A"){ ?>N
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>T
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 und T
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 und T
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 und N
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 und N
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 und J
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 und J
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 und K
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 und K
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>Kein Ziel
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>X und J
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>P
<? } else if($oran_bilgi['oran_val']=="T"){ ?>E
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='ar'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>أجل
<? } else if($oran_bilgi['oran_val']=="H"){ ?>لا
<? } else if($oran_bilgi['oran_val']=="A"){ ?>أدنى
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>أعلى
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 وما فوق
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 وما فوق
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 و السفلى
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 و السفلى
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 و نعم
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 و نعم
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 و لا
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 و لا
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>لا هدف
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>س ونعم
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>زوجان
<? } else if($oran_bilgi['oran_val']=="T"){ ?>واحد
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='ru'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>да
<? } else if($oran_bilgi['oran_val']=="H"){ ?>нет
<? } else if($oran_bilgi['oran_val']=="A"){ ?>ниже
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>топ
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 и выше
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 и выше
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 и ниже
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 и ниже
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 и да
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 и да
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 и нет
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 и нет
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>Нет цели
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>Х и да
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>пара
<? } else if($oran_bilgi['oran_val']=="T"){ ?>один
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

</div> <div class="quote"><?=nf($buoran); ?></div></div></div>
<? if($kz==2 or $kz==4 or $kz==6 or $kz==8 or $kz==10 or $kz==12 or $kz==14 or $kz==16 or $kz==18 or $kz==20 or $kz==22 or $kz==24 or $kz==26 or $kz==28 or $kz==30 or $kz==32 or $kz==34 or $kz==36 or $kz==38 or $kz==40 or $kz==42 or $kz==44 or $kz==46 or $kz==48){ ?>
</div>
<div class="navitem noborder w100 odd">
<? } ?>
<? } ?>
</div>
<div class=""></div>
</div>
<? } ?>
<? } ?>
<div style="text-align: center;font-weight: bold;color: #f64835;" onclick="loadbulten2();"><?=getTranslation('exportlisteyedon')?></div>

<?
$sor = sed_sql_query("select oran_tip,oran_val_id,mac_db_id from kupon where session_id='$session_id' and mac_kodu='$mb[mac_kodu]' and spor_tip='futbol'");
while($row=sed_sql_fetcharray($sor)) {
$oran_tip_bol = explode('|',$row['oran_tip']);
if($oran_tip_bol[0]=="1X2"){ $oran_tip_ver = 1; } else
if($oran_tip_bol[0]=="Handikap (0:1)"){ $oran_tip_ver = 2; } else
if($oran_tip_bol[0]=="Handikap (1:0)"){ $oran_tip_ver = 3; } else
if($oran_tip_bol[0]=="Handikap (0:2)"){ $oran_tip_ver = 4; } else
if($oran_tip_bol[0]=="Handikap (2:0)"){ $oran_tip_ver = 5; } else
if($oran_tip_bol[0]=="1X2 ( 1.YARI )"){ $oran_tip_ver = 6; } else
if($oran_tip_bol[0]=="1X2 ( 2.YARI )"){ $oran_tip_ver = 7; } else
if($oran_tip_bol[0]=="1.Yarı Çifte Şans"){ $oran_tip_ver = 8; } else
if($oran_tip_bol[0]=="1.YARI KG"){ $oran_tip_ver = 9; } else
if($oran_tip_bol[0]=="Beraberlikte İade"){ $oran_tip_ver = 10; } else
if($oran_tip_bol[0]=="Toplam Gol Alt/Üst 0.5"){ $oran_tip_ver = 11; } else
if($oran_tip_bol[0]=="Toplam Gol Alt/Üst 1.5"){ $oran_tip_ver = 12; } else
if($oran_tip_bol[0]=="Toplam Gol Alt/Üst 2.5"){ $oran_tip_ver = 13; } else
if($oran_tip_bol[0]=="Toplam Gol Alt/Üst 3.5"){ $oran_tip_ver = 14; } else
if($oran_tip_bol[0]=="Toplam Gol Alt/Üst 4.5"){ $oran_tip_ver = 15; } else
if($oran_tip_bol[0]=="Toplam Gol Alt/Üst 5.5"){ $oran_tip_ver = 16; } else

if($oran_tip_bol[0]=="1.Yarı Toplam Gol Alt/Üst 0.5"){ $oran_tip_ver = 18; } else
if($oran_tip_bol[0]=="1.Yarı Toplam Gol Alt/Üst 1.5"){ $oran_tip_ver = 19; } else
if($oran_tip_bol[0]=="1.Yarı Toplam Gol Alt/Üst 2.5"){ $oran_tip_ver = 20; } else
if($oran_tip_bol[0]=="1.Yarı Toplam Gol Alt/Üst 3.5"){ $oran_tip_ver = 21; } else
if($oran_tip_bol[0]=="2.Yarı Toplam Gol Alt/Üst 0.5"){ $oran_tip_ver = 22; } else
if($oran_tip_bol[0]=="2.Yarı Toplam Gol Alt/Üst 1.5"){ $oran_tip_ver = 23; } else
if($oran_tip_bol[0]=="2.Yarı Toplam Gol Alt/Üst 2.5"){ $oran_tip_ver = 24; } else
if($oran_tip_bol[0]=="2.Yarı Toplam Gol Alt/Üst 3.5"){ $oran_tip_ver = 25; } else
if($oran_tip_bol[0]=="Ev Sahibi Gol Atarmı ?"){ $oran_tip_ver = 26; } else
if($oran_tip_bol[0]=="Deplasman Gol Atarmı ?"){ $oran_tip_ver = 27; } else
if($oran_tip_bol[0]=="Karşılıklı Gol"){ $oran_tip_ver = 28; } else
if($oran_tip_bol[0]=="​​​​​1.Yarı Tek/Çift"){ $oran_tip_ver = 29; } else
if($oran_tip_bol[0]=="Tek/Çift"){ $oran_tip_ver = 30; } else
if($oran_tip_bol[0]=="Evsahibi Kaç Gol Atar ?"){ $oran_tip_ver = 31; } else
if($oran_tip_bol[0]=="Deplasman Kaç Gol Atar ?"){ $oran_tip_ver = 32; } else
if($oran_tip_bol[0]=="Evsahibi 1.Yarı Kaç Gol Atar ?"){ $oran_tip_ver = 33; } else
if($oran_tip_bol[0]=="Evsahibi 2.Yarı Kaç Gol Atar ?"){ $oran_tip_ver = 34; } else
if($oran_tip_bol[0]=="Deplasman 1.Yarı Kaç Gol Atar ?"){ $oran_tip_ver = 35; } else
if($oran_tip_bol[0]=="Deplasman 2.Yarı Kaç Gol Atar ?"){ $oran_tip_ver = 36; } else
if($oran_tip_bol[0]=="Evsahibi 1.Yarı A/Ü 0.5"){ $oran_tip_ver = 37; } else
if($oran_tip_bol[0]=="Evsahibi 1.Yarı A/Ü 1.5"){ $oran_tip_ver = 38; } else
if($oran_tip_bol[0]=="Deplasman 1.Yarı A/Ü 0.5"){ $oran_tip_ver = 39; } else
if($oran_tip_bol[0]=="Deplasman 1.Yarı A/Ü 1.5"){ $oran_tip_ver = 40; } else
if($oran_tip_bol[0]=="Evsahibi A/Ü 1.5"){ $oran_tip_ver = 41; } else
if($oran_tip_bol[0]=="Deplasman A/Ü 1.5"){ $oran_tip_ver = 42; } else
if($oran_tip_bol[0]=="​​​​​Evsahibi Her 2 yarıda Gol Atar ?"){ $oran_tip_ver = 43; } else
if($oran_tip_bol[0]=="Deplasman Her 2 yarıda Gol Atar ?"){ $oran_tip_ver = 44; } else
if($oran_tip_bol[0]=="Hangi Devrede Fazla Gol Olur"){ $oran_tip_ver = 45; } else
if($oran_tip_bol[0]=="Evsahibi Hangi Devrede Fazla Gol Atar ?"){ $oran_tip_ver = 46; } else
if($oran_tip_bol[0]=="Deplasman Hangi Devrede Fazla Gol Atar ?"){ $oran_tip_ver = 47; } else
if($oran_tip_bol[0]=="Müsabakada kaç gol atılır? (0-4+)"){ $oran_tip_ver = 48; } else
if($oran_tip_bol[0]=="Müsabakada kaç gol atılır? (0-5+)"){ $oran_tip_ver = 49; } else
if($oran_tip_bol[0]=="Müsabakada kaç gol atılır? (0-6+)"){ $oran_tip_ver = 50; } else
if($oran_tip_bol[0]=="Herhangi bir takım 1 gol farkla kazanır mı?"){ $oran_tip_ver = 51; } else
if($oran_tip_bol[0]=="Herhangi bir takım 2 gol farkla kazanır mı?"){ $oran_tip_ver = 52; } else
if($oran_tip_bol[0]=="Herhangi bir takım 3 gol farkla kazanır mı?"){ $oran_tip_ver = 53; } else
if($oran_tip_bol[0]=="1X2 ve toplam gol sayısı"){ $oran_tip_ver = 54; } else
if($oran_tip_bol[0]=="Maç sonucu ve karşılıklı goller"){ $oran_tip_ver = 55; } else
if($oran_tip_bol[0]=="İlk Yarı / Maç Sonucu"){ $oran_tip_ver = 56; } else
if($oran_tip_bol[0]=="Skor Bahsi (90 Dakika)"){ $oran_tip_ver = 57; } else
if($oran_tip_bol[0]=="Çifte Şans"){ $oran_tip_ver = 58; } else
if($oran_tip_bol[0]=="Toplam Sari Kart Alt/Üst 3.5"){ $oran_tip_ver = 59; } else
if($oran_tip_bol[0]=="Kirmizi kart cikar mi?"){ $oran_tip_ver = 60; } else
if($oran_tip_bol[0]=="Macta kac tane penalti olur?"){ $oran_tip_ver = 61; } else
if($oran_tip_bol[0]=="1.Takim Sari Kart Alt/Üst 1.5"){ $oran_tip_ver = 62; } else
if($oran_tip_bol[0]=="1.Takim Sari Kart Alt/Üst 2.5"){ $oran_tip_ver = 63; } else
if($oran_tip_bol[0]=="1.Takim Sari Kart Alt/Üst 3.5"){ $oran_tip_ver = 64; } else
if($oran_tip_bol[0]=="2.Takim Sari Kart Alt/Üst 1.5"){ $oran_tip_ver = 65; } else
if($oran_tip_bol[0]=="2.Takim Sari Kart Alt/Üst 2.5"){ $oran_tip_ver = 66; } else
if($oran_tip_bol[0]=="2.Takim Sari Kart Alt/Üst 3.5"){ $oran_tip_ver = 67; } else
if($oran_tip_bol[0]=="Sarı Kart Toplam Tek/Çift"){ $oran_tip_ver = 68; } else
if($oran_tip_bol[0]=="Hangi Takım Çok Sarı Kart Yer ?"){ $oran_tip_ver = 69; } else
if($oran_tip_bol[0]=="Toplam Korner Alt/Üst 5.5"){ $oran_tip_ver = 70; } else
if($oran_tip_bol[0]=="Toplam Korner Alt/Üst 6.5"){ $oran_tip_ver = 71; } else
if($oran_tip_bol[0]=="Toplam Korner Alt/Üst 7.5"){ $oran_tip_ver = 72; } else
if($oran_tip_bol[0]=="Toplam Korner Alt/Üst 8.5"){ $oran_tip_ver = 73; } else
if($oran_tip_bol[0]=="Toplam Korner Alt/Üst 9.5"){ $oran_tip_ver = 74; } else
if($oran_tip_bol[0]=="Toplam Korner Alt/Üst 10.5"){ $oran_tip_ver = 75; } else
if($oran_tip_bol[0]=="Toplam Korner Alt/Üst 11.5"){ $oran_tip_ver = 76; } else
if($oran_tip_bol[0]=="Toplam Korner Alt/Üst 12.5"){ $oran_tip_ver = 77; } else
if($oran_tip_bol[0]=="Toplam Korner Alt/Üst 13.5"){ $oran_tip_ver = 78; } else
if($oran_tip_bol[0]=="Toplam Korner Alt/Üst 14.5"){ $oran_tip_ver = 79; } else
if($oran_tip_bol[0]=="Toplam Korner Alt/Üst 15.5"){ $oran_tip_ver = 80; } else
if($oran_tip_bol[0]=="1.Takım Korner Alt/Üst 2.5"){ $oran_tip_ver = 81; } else
if($oran_tip_bol[0]=="1.Takım Korner Alt/Üst 3.5"){ $oran_tip_ver = 82; } else
if($oran_tip_bol[0]=="1.Takım Korner Alt/Üst 4.5"){ $oran_tip_ver = 83; } else
if($oran_tip_bol[0]=="1.Takım Korner Alt/Üst 5.5"){ $oran_tip_ver = 84; } else
if($oran_tip_bol[0]=="1.Takım Korner Alt/Üst 6.5"){ $oran_tip_ver = 85; } else
if($oran_tip_bol[0]=="1.Takım Korner Alt/Üst 7.5"){ $oran_tip_ver = 86; } else
if($oran_tip_bol[0]=="1.Takım Korner Alt/Üst 8.5"){ $oran_tip_ver = 87; } else
if($oran_tip_bol[0]=="1.Takım Korner Alt/Üst 9.5"){ $oran_tip_ver = 88; } else
if($oran_tip_bol[0]=="1.Takım Korner Alt/Üst 10.5"){ $oran_tip_ver = 89; } else
if($oran_tip_bol[0]=="2.Takım Korner Alt/Üst 2.5"){ $oran_tip_ver = 90; } else
if($oran_tip_bol[0]=="2.Takım Korner Alt/Üst 3.5"){ $oran_tip_ver = 91; } else
if($oran_tip_bol[0]=="2.Takım Korner Alt/Üst 4.5"){ $oran_tip_ver = 92; } else
if($oran_tip_bol[0]=="2.Takım Korner Alt/Üst 5.5"){ $oran_tip_ver = 93; } else
if($oran_tip_bol[0]=="2.Takım Korner Alt/Üst 6.5"){ $oran_tip_ver = 94; } else
if($oran_tip_bol[0]=="2.Takım Korner Alt/Üst 7.5"){ $oran_tip_ver = 95; } else
if($oran_tip_bol[0]=="2.Takım Korner Alt/Üst 8.5"){ $oran_tip_ver = 96; } else
if($oran_tip_bol[0]=="2.Takım Korner Alt/Üst 9.5"){ $oran_tip_ver = 97; } else
if($oran_tip_bol[0]=="2.Takım Korner Alt/Üst 10.5"){ $oran_tip_ver = 98; } else
if($oran_tip_bol[0]=="Korner Toplam Tek/Çift"){ $oran_tip_ver = 99; } else
if($oran_tip_bol[0]=="Hangi Takım Çok Korner Kullanır ?"){ $oran_tip_ver = 100; } else
?>
<script>
$("div[oddsid='<?=$row['mac_db_id'];?><?=$oran_tip_ver;?><?=$row['oran_val_id'];?>']").addClass('selected');
</script>
<? } ?>

<? }
## FUTBOL BİTİŞİ ##

else if($sportip==2){

$mb = bilgi("select * from program_basketbol where id='$mac_db_id'");

$fark = $mb['mac_time']-time();

$gizli_oran_tips = gizli_oran_tips_basketbol($mb['kupa_id'],$mb['id']);

if($gizli_oran_tips!="") { $gizli_ekle = "and oran_tip not in ($gizli_oran_tips)"; } else { $gizli_ekle = ""; }

?>

<div style="text-align: center;font-weight: bold;color: #2a7394;background-color: #fff;position: relative;z-index: 9999;" onclick="loadbulten2();"><?=getTranslation('exportlisteyedon')?></div>

<div class="odd singlebar barmiddle " style="<? if($mb['istatistik']>0){ ?>z-index: 100;position: absolute;<? } ?>">
<div id="e9441141" class="event match noborder">
<div class="hidden"><div colspan="11" class="c_comment"><div class="c_comment"></div><div class="c_pointer"></div></div></div>
<div class="event_wrapper">
<div class="datetime ">
<div class="favorites hidden"> <img src="assets/img/favorite0.png"> </div>
<div class="sportsIcon "><div class="icon"><div class="sports soccer"></div> </div></div>
<div class="date small ">
<div> <?=date("d.m H:i",$mb['mac_time']); ?> </div>
<img src="assets/img/live_rain.png" alt="" width="23" height="23" class="hidden">
<span class=""> <img src="assets/img/icon_live.png" alt="" width="24" height="12"> </span>
</div>
</div>
<div class="teamrows">
<div class="teamrow">
<div class="team"> <?=$mb['ev_takim'];?>  </div>
<div class="score">
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
</div>
</div>
<div class="teamrow">
<div class="team"> <?=$mb['konuk_takim'];?>  </div>
<div class="score">
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
</div>
</div>
</div>
<div class="hidden"> <div class="hidden">  </div></div>
<div class="hidden"></div>
<div class="placeholder "></div>
</div>
</div>
</div>

<? if($mb['istatistik']>0){ ?>
<iframe src="https://href.li/?https://cs.betradar.com/ls/widgets/?/totobo/tr/page/widgets_lmts#matchId=<?=$mb['istatistik'];?>" id="liveTrackerCenter" frameborder="0" scrolling="no" style="width: 100%;height: 340px;margin-top:-50px;" onload="resizeIframe(this)"></iframe>
<? } ?>

<div id="rsg1" class="rsGroup" style="display: block;">

<?
$orderle = "FIELD(oran_tip, '2', '3', '1', '17', '4', '19', '18', '9', '10', '6', '7', '15', '16', '11', '12', '13', '14', '5', '8') ASC";

$sor = sed_sql_query("select mac_db_id,oran_tip,durum from oranlar_basketbol where mac_db_id='$mac_db_id' and durum='1' $gizli_ekle group by oran_tip order by {$orderle}");

$i = 1;
while($ass=sed_sql_fetchassoc($sor)) { 
$i++;
$tip = bilgi("select id,tip_isim,tip_kodu from oran_tip_basketbol where id='$ass[oran_tip]'");

?>
<? if($tip['tip_kodu']==3) { ?>	
<div class="navitem noborder w100 odd" style=""> <div class="cell rsDesc w25"><?=$tip['tip_isim'];?></div>
<?
$sss = sed_sql_query("select id,mac_db_id,oran_tip,oran_val_id,oran,durum,oran_val_b from oranlar_basketbol where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' group by oran_val_id order by oran_val_id asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_basketbol where id='$row[oran_val_id]'");
$mbs = mbsverb($mb['id'],$mb['mbs'],$mb['kupa_id']);
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$mbs|$mb[mac_time]|basketbol";
$buoran = oranbulb($mac_db_id,$row['id']);
?>
<div class="cell w25 rsBut"> <div class="<?=$mb["id"];?> qbutton <?=md5($row['oran_val_id']."|".$mb["id"]);?>  " oddsid="<?=$mb["id"];?><?=$row["id"];?>" onclick="kupon(<?=$mb["id"];?><?=$row["id"];?>,<?=$mb["id"];?>,'<?=codekupon("$encoded|$row[id]|$buoran"); ?>', this);"> <div class="caption">

<? if($dil_bilgisi22['language']=='en'){ ?>


<? if($oran_bilgi['oran_val']=="E"){ ?>Y
<? } else if($oran_bilgi['oran_val']=="H"){ ?>N
<? } else if($oran_bilgi['oran_val']=="A"){ ?>U
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>O
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 and O
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 and O
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 and U
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 and U
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 and Y
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 and Y
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 and N
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 and N
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>No Goal
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>X and Y
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>D
<? } else if($oran_bilgi['oran_val']=="T"){ ?>S
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='de'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>J
<? } else if($oran_bilgi['oran_val']=="H"){ ?>K
<? } else if($oran_bilgi['oran_val']=="A"){ ?>N
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>T
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 und T
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 und T
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 und N
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 und N
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 und J
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 und J
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 und K
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 und K
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>Kein Ziel
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>X und J
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>P
<? } else if($oran_bilgi['oran_val']=="T"){ ?>E
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='ar'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>أجل
<? } else if($oran_bilgi['oran_val']=="H"){ ?>لا
<? } else if($oran_bilgi['oran_val']=="A"){ ?>أدنى
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>أعلى
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 وما فوق
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 وما فوق
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 و السفلى
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 و السفلى
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 و نعم
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 و نعم
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 و لا
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 و لا
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>لا هدف
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>س ونعم
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>زوجان
<? } else if($oran_bilgi['oran_val']=="T"){ ?>واحد
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='ru'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>да
<? } else if($oran_bilgi['oran_val']=="H"){ ?>нет
<? } else if($oran_bilgi['oran_val']=="A"){ ?>ниже
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>топ
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 и выше
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 и выше
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 и ниже
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 и ниже
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 и да
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 и да
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 и нет
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 и нет
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>Нет цели
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>Х и да
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>пара
<? } else if($oran_bilgi['oran_val']=="T"){ ?>один
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

 <? if($row['oran_val_b']!="") { echo "( <font style='color:#f00;font-weight:bold;'>$row[oran_val_b]</font> )"; } ?></div> <div class="quote"><?=nf($buoran); ?></div></div></div>
<? } ?>
<div class=""></div>
</div>
<? } else if($tip['tip_kodu']==2) { ?>
<div class="navitem noborder w100 odd" style=""> <div class="cell rsDesc w50"><?=$tip['tip_isim'];?></div>
<?
$sss = sed_sql_query("select id,mac_db_id,oran_tip,oran_val_id,oran,durum,oran_val_b from oranlar_basketbol where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' group by oran_val_id order by oran_val_id asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_basketbol where id='$row[oran_val_id]'");
$mbs = mbsverb($mb['id'],$mb['mbs'],$mb['kupa_id']);
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$mbs|$mb[mac_time]|basketbol";
$buoran = oranbulb($mac_db_id,$row['id']);
?>
<div class="cell w25 rsBut"> <div class="<?=$mb["id"];?> qbutton <?=md5($row['oran_val_id']."|".$mb["id"]);?>  " oddsid="<?=$mb["id"];?><?=$row["id"];?>" onclick="kupon(<?=$mb["id"];?><?=$row["id"];?>,<?=$mb["id"];?>,'<?=codekupon("$encoded|$row[id]|$buoran"); ?>', this);"> <div class="caption">

<? if($dil_bilgisi22['language']=='en'){ ?>


<? if($oran_bilgi['oran_val']=="E"){ ?>Y
<? } else if($oran_bilgi['oran_val']=="H"){ ?>N
<? } else if($oran_bilgi['oran_val']=="A"){ ?>U
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>O
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 and O
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 and O
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 and U
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 and U
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 and Y
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 and Y
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 and N
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 and N
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>No Goal
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>X and Y
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>D
<? } else if($oran_bilgi['oran_val']=="T"){ ?>S
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='de'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>J
<? } else if($oran_bilgi['oran_val']=="H"){ ?>K
<? } else if($oran_bilgi['oran_val']=="A"){ ?>N
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>T
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 und T
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 und T
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 und N
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 und N
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 und J
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 und J
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 und K
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 und K
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>Kein Ziel
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>X und J
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>P
<? } else if($oran_bilgi['oran_val']=="T"){ ?>E
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='ar'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>أجل
<? } else if($oran_bilgi['oran_val']=="H"){ ?>لا
<? } else if($oran_bilgi['oran_val']=="A"){ ?>أدنى
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>أعلى
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 وما فوق
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 وما فوق
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 و السفلى
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 و السفلى
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 و نعم
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 و نعم
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 و لا
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 و لا
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>لا هدف
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>س ونعم
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>زوجان
<? } else if($oran_bilgi['oran_val']=="T"){ ?>واحد
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='ru'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>да
<? } else if($oran_bilgi['oran_val']=="H"){ ?>нет
<? } else if($oran_bilgi['oran_val']=="A"){ ?>ниже
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>топ
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 и выше
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 и выше
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 и ниже
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 и ниже
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 и да
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 и да
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 и нет
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 и нет
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>Нет цели
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>Х и да
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>пара
<? } else if($oran_bilgi['oran_val']=="T"){ ?>один
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

 <? if($row['oran_val_b']!="") { echo "( <font style='color:#f00;font-weight:bold;'>$row[oran_val_b]</font> )"; } ?></div> <div class="quote"><?=nf($buoran); ?></div></div></div>
<? } ?>
<div class=""></div>
</div>
<? } else if($tip['tip_kodu']==4) { ?>
<div class="navitem odd"> <div class="w100 center text small bold" style="height:22px;"><?=$tip['tip_isim'];?></div></div>
<div class="navitem noborder w100 odd">
<?
$sss = sed_sql_query("select id,mac_db_id,oran_tip,oran_val_id,oran,durum,oran_val_b from oranlar_basketbol where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' group by oran_val_b,oran_val_id order by id asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_basketbol where id='$row[oran_val_id]'");
$mbs = mbsverb($mb['id'],$mb['mbs'],$mb['kupa_id']);
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$mbs|$mb[mac_time]|basketbol";
$buoran = oranbulb($mac_db_id,$row['id']);
?>
<div class="cell w50"> <div class="<?=$mb["id"];?> qbutton <?=md5($row['oran_val_id']."|".$mb["id"]);?>  " oddsid="<?=$mb["id"];?><?=$row["id"];?>" onclick="kupon(<?=$mb["id"];?><?=$row["id"];?>,<?=$mb["id"];?>,'<?=codekupon("$encoded|$row[id]|$buoran"); ?>', this);"> <div class="caption">

<? if($dil_bilgisi22['language']=='en'){ ?>


<? if($oran_bilgi['oran_val']=="E"){ ?>Y
<? } else if($oran_bilgi['oran_val']=="H"){ ?>N
<? } else if($oran_bilgi['oran_val']=="A"){ ?>U
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>O
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 and O
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 and O
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 and U
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 and U
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 and Y
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 and Y
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 and N
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 and N
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>No Goal
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>X and Y
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>D
<? } else if($oran_bilgi['oran_val']=="T"){ ?>S
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='de'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>J
<? } else if($oran_bilgi['oran_val']=="H"){ ?>K
<? } else if($oran_bilgi['oran_val']=="A"){ ?>N
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>T
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 und T
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 und T
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 und N
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 und N
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 und J
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 und J
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 und K
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 und K
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>Kein Ziel
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>X und J
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>P
<? } else if($oran_bilgi['oran_val']=="T"){ ?>E
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='ar'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>أجل
<? } else if($oran_bilgi['oran_val']=="H"){ ?>لا
<? } else if($oran_bilgi['oran_val']=="A"){ ?>أدنى
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>أعلى
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 وما فوق
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 وما فوق
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 و السفلى
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 و السفلى
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 و نعم
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 و نعم
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 و لا
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 و لا
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>لا هدف
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>س ونعم
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>زوجان
<? } else if($oran_bilgi['oran_val']=="T"){ ?>واحد
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='ru'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>да
<? } else if($oran_bilgi['oran_val']=="H"){ ?>нет
<? } else if($oran_bilgi['oran_val']=="A"){ ?>ниже
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>топ
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 и выше
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 и выше
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 и ниже
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 и ниже
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 и да
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 и да
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 и нет
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 и нет
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>Нет цели
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>Х и да
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>пара
<? } else if($oran_bilgi['oran_val']=="T"){ ?>один
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

 <? if($row['oran_val_b']!="") { echo "( <font style='color:#f00;font-weight:bold;'>$row[oran_val_b]</font> )"; } ?></div> <div class="quote"><?=nf($buoran); ?></div></div></div>
<? if($kz==2 || $kz==4 || $kz==6 || $kz==8 || $kz==10 || $kz==12 || $kz==14 || $kz==16 || $kz==18 || $kz==20 || $kz==22 || $kz==24 || $kz==26 || $kz==28 || $kz==30 || $kz==32 || $kz==34 || $kz==36 || $kz==38 || $kz==40){ ?>
</div>
<div class="navitem noborder w100 odd">
<? } ?>
<? } ?>
</div>
<div class=""></div>
</div>
<? } else { ?>
<div class="navitem odd"> <div class="w100 center text small bold" style="height:22px;"><?=$tip['tip_isim'];?></div></div>
<div class="navitem noborder w100 odd">
<?
$sss = sed_sql_query("select id,mac_db_id,oran_tip,oran_val_id,oran,durum,oran_val_b from oranlar_basketbol where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' group by oran_val_id order by oran_val_id asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_basketbol where id='$row[oran_val_id]'");
$mbs = mbsverb($mb['id'],$mb['mbs'],$mb['kupa_id']);
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$mbs|$mb[mac_time]|basketbol";
$buoran = oranbulb($mac_db_id,$row['id']);
?>
<div class="cell w50"> <div class="<?=$mb["id"];?> qbutton <?=md5($row['oran_val_id']."|".$mb["id"]);?>  " oddsid="<?=$mb["id"];?><?=$row["id"];?>" onclick="kupon(<?=$mb["id"];?><?=$row["id"];?>,<?=$mb["id"];?>,'<?=codekupon("$encoded|$row[id]|$buoran"); ?>', this);"> <div class="caption">

<? if($dil_bilgisi22['language']=='en'){ ?>


<? if($oran_bilgi['oran_val']=="E"){ ?>Y
<? } else if($oran_bilgi['oran_val']=="H"){ ?>N
<? } else if($oran_bilgi['oran_val']=="A"){ ?>U
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>O
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 and O
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 and O
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 and U
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 and U
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 and Y
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 and Y
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 and N
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 and N
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>No Goal
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>X and Y
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>D
<? } else if($oran_bilgi['oran_val']=="T"){ ?>S
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='de'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>J
<? } else if($oran_bilgi['oran_val']=="H"){ ?>K
<? } else if($oran_bilgi['oran_val']=="A"){ ?>N
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>T
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 und T
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 und T
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 und N
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 und N
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 und J
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 und J
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 und K
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 und K
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>Kein Ziel
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>X und J
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>P
<? } else if($oran_bilgi['oran_val']=="T"){ ?>E
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='ar'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>أجل
<? } else if($oran_bilgi['oran_val']=="H"){ ?>لا
<? } else if($oran_bilgi['oran_val']=="A"){ ?>أدنى
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>أعلى
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 وما فوق
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 وما فوق
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 و السفلى
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 و السفلى
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 و نعم
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 و نعم
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 و لا
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 و لا
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>لا هدف
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>س ونعم
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>زوجان
<? } else if($oran_bilgi['oran_val']=="T"){ ?>واحد
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='ru'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>да
<? } else if($oran_bilgi['oran_val']=="H"){ ?>нет
<? } else if($oran_bilgi['oran_val']=="A"){ ?>ниже
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>топ
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 и выше
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 и выше
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 и ниже
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 и ниже
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 и да
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 и да
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 и нет
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 и нет
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>Нет цели
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>Х и да
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>пара
<? } else if($oran_bilgi['oran_val']=="T"){ ?>один
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

 <? if($row['oran_val_b']!="") { echo "( <font style='color:#f00;font-weight:bold;'>$row[oran_val_b]</font> )"; } ?></div> <div class="quote"><?=nf($buoran); ?></div></div></div>
<? if($kz==2 or $kz==4 or $kz==6 or $kz==8 or $kz==10 or $kz==12 or $kz==14 or $kz==16 or $kz==18 or $kz==20){ ?>
</div>
<div class="navitem noborder w100 odd">
<? } ?>
<? } ?>
</div>
<div class=""></div>
</div>
<? } ?>
<? } ?>
<div style="text-align: center;font-weight: bold;color: #f64835;" onclick="loadbulten2();"><?=getTranslation('exportlisteyedon')?></div>

<?
$sor = sed_sql_query("select oran_val_id,mac_db_id from kupon where session_id='$session_id' and mac_kodu='$mb[mac_kodu]' and spor_tip='basketbol'");
while($row=sed_sql_fetcharray($sor)) {
?>
<script>
$("div[oddsid='<?=$row['mac_db_id'];?><?=$row['oran_val_id'];?>']").addClass('selected');
</script>
<? } ?>

<? } 
## BASKETBOL BİTİŞİ ##

else if($sportip==3){

$mb = bilgi("select * from program_tenis where id='$mac_db_id'");

$fark = $mb['mac_time']-time();

$gizli_oran_tips = gizli_oran_tips_tenis($mb['id']);

if($gizli_oran_tips!="") { $gizli_ekle = "and oran_tip not in ($gizli_oran_tips)"; } else { $gizli_ekle = ""; }

?>

<div style="text-align: center;font-weight: bold;color: #2a7394;background-color: #fff;position: relative;z-index: 9999;" onclick="loadbulten2();"><?=getTranslation('exportlisteyedon')?></div>

<div class="odd singlebar barmiddle " style="<? if($mb['istatistik']>0){ ?>z-index: 100;position: absolute;<? } ?>">
<div id="e9441141" class="event match noborder">
<div class="hidden"><div colspan="11" class="c_comment"><div class="c_comment"></div><div class="c_pointer"></div></div></div>
<div class="event_wrapper">
<div class="datetime ">
<div class="favorites hidden"> <img src="assets/img/favorite0.png"> </div>
<div class="sportsIcon "><div class="icon"><div class="sports soccer"></div> </div></div>
<div class="date small ">
<div> <?=date("d.m H:i",$mb['mac_time']); ?> </div>
<img src="assets/img/live_rain.png" alt="" width="23" height="23" class="hidden">
<span class=""> <img src="assets/img/icon_live.png" alt="" width="24" height="12"> </span>
</div>
</div>
<div class="teamrows">
<div class="teamrow">
<div class="team"> <?=$mb['ev_takim'];?>  </div>
<div class="score">
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
</div>
</div>
<div class="teamrow">
<div class="team"> <?=$mb['konuk_takim'];?>  </div>
<div class="score">
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
</div>
</div>
</div>
<div class="hidden"> <div class="hidden">  </div></div>
<div class="hidden"></div>
<div class="placeholder "></div>
</div>
</div>
</div>

<? if($mb['istatistik']>0){ ?>
<iframe src="https://href.li/?https://cs.betradar.com/ls/widgets/?/totobo/tr/page/widgets_lmts#matchId=<?=$mb['istatistik'];?>" id="liveTrackerCenter" frameborder="0" scrolling="no" style="width: 100%;height: 340px;margin-top:-50px;" onload="resizeIframe(this)"></iframe>
<? } ?>

<div id="rsg1" class="rsGroup" style="display: block;">

<?
$orderle = "FIELD(oran_tip, '1', '3', '4', '5', '6', '2') ASC";

$sor = sed_sql_query("select mac_db_id,oran_tip,durum from oranlar_tenis where mac_db_id='$mac_db_id' and durum='1' $gizli_ekle group by oran_tip order by {$orderle}");

$i = 1;
while($ass=sed_sql_fetchassoc($sor)) { 
$i++;
$tip = bilgi("select id,tip_isim,tip_kodu from oran_tip_tenis where id='$ass[oran_tip]'");

?>
<? if($tip['tip_kodu']==3) { ?>	
<div class="navitem noborder w100 odd" style=""> <div class="cell rsDesc w25"><?=getTranslation('toran'.$tip['id'].'')?></div>
<?
$sss = sed_sql_query("select id,mac_db_id,oran_tip,oran_val_id,oran,durum from oranlar_tenis ora where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' order by (select yapi from oran_val_tenis ov where ov.id=ora.oran_val_id) asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_tenis where id='$row[oran_val_id]'");
$mbs = mbsvert($mb['id'],$mb['mbs'],$mb['kupa_id']);
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$mbs|$mb[mac_time]|tenis";
$buoran = oranbult($mac_db_id,$row['oran_val_id']);
?>
<div class="cell w25 rsBut"> <div class="<?=$mb["id"];?> qbutton <?=md5($row['oran_val_id']."|".$mb["id"]);?>  " oddsid="<?=$mb["id"];?><?=$row["oran_tip"];?><?=$row["oran_val_id"];?>" onclick="kupon(<?=$mb["id"];?><?=$row["oran_tip"];?><?=$row["oran_val_id"];?>,<?=$mb["id"];?>,'<?=codekupon("$encoded|$row[oran_val_id]|$buoran"); ?>', this);"> <div class="caption">

<? if($dil_bilgisi22['language']=='en'){ ?>


<? if($oran_bilgi['oran_val']=="E"){ ?>Y
<? } else if($oran_bilgi['oran_val']=="H"){ ?>N
<? } else if($oran_bilgi['oran_val']=="A"){ ?>U
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>O
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 and O
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 and O
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 and U
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 and U
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 and Y
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 and Y
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 and N
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 and N
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>No Goal
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>X and Y
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>D
<? } else if($oran_bilgi['oran_val']=="T"){ ?>S
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='de'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>J
<? } else if($oran_bilgi['oran_val']=="H"){ ?>K
<? } else if($oran_bilgi['oran_val']=="A"){ ?>N
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>T
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 und T
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 und T
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 und N
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 und N
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 und J
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 und J
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 und K
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 und K
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>Kein Ziel
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>X und J
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>P
<? } else if($oran_bilgi['oran_val']=="T"){ ?>E
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='ar'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>أجل
<? } else if($oran_bilgi['oran_val']=="H"){ ?>لا
<? } else if($oran_bilgi['oran_val']=="A"){ ?>أدنى
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>أعلى
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 وما فوق
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 وما فوق
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 و السفلى
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 و السفلى
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 و نعم
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 و نعم
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 و لا
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 و لا
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>لا هدف
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>س ونعم
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>زوجان
<? } else if($oran_bilgi['oran_val']=="T"){ ?>واحد
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='ru'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>да
<? } else if($oran_bilgi['oran_val']=="H"){ ?>нет
<? } else if($oran_bilgi['oran_val']=="A"){ ?>ниже
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>топ
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 и выше
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 и выше
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 и ниже
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 и ниже
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 и да
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 и да
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 и нет
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 и нет
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>Нет цели
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>Х и да
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>пара
<? } else if($oran_bilgi['oran_val']=="T"){ ?>один
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

</div> <div class="quote"><?=nf($buoran); ?></div></div></div>
<? } ?>
<div class=""></div>
</div>
<? } else if($tip['tip_kodu']==2) { ?>
<div class="navitem noborder w100 odd" style=""> <div class="cell rsDesc w50"><?=getTranslation('toran'.$tip['id'].'')?></div>
<?
$sss = sed_sql_query("select id,mac_db_id,oran_tip,oran_val_id,oran,durum from oranlar_tenis ora where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' order by (select yapi from oran_val_tenis ov where ov.id=ora.oran_val_id) asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_tenis where id='$row[oran_val_id]'");
$mbs = mbsvert($mb['id'],$mb['mbs'],$mb['kupa_id']);
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$mbs|$mb[mac_time]|tenis";
$buoran = oranbult($mac_db_id,$row['oran_val_id']);
?>
<div class="cell w25 rsBut"> <div class="<?=$mb["id"];?> qbutton <?=md5($row['oran_val_id']."|".$mb["id"]);?>  " oddsid="<?=$mb["id"];?><?=$row["oran_tip"];?><?=$row["oran_val_id"];?>" onclick="kupon(<?=$mb["id"];?><?=$row["oran_tip"];?><?=$row["oran_val_id"];?>,<?=$mb["id"];?>,'<?=codekupon("$encoded|$row[oran_val_id]|$buoran"); ?>', this);"> <div class="caption">

<? if($dil_bilgisi22['language']=='en'){ ?>


<? if($oran_bilgi['oran_val']=="E"){ ?>Y
<? } else if($oran_bilgi['oran_val']=="H"){ ?>N
<? } else if($oran_bilgi['oran_val']=="A"){ ?>U
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>O
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 and O
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 and O
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 and U
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 and U
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 and Y
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 and Y
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 and N
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 and N
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>No Goal
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>X and Y
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>D
<? } else if($oran_bilgi['oran_val']=="T"){ ?>S
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='de'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>J
<? } else if($oran_bilgi['oran_val']=="H"){ ?>K
<? } else if($oran_bilgi['oran_val']=="A"){ ?>N
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>T
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 und T
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 und T
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 und N
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 und N
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 und J
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 und J
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 und K
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 und K
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>Kein Ziel
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>X und J
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>P
<? } else if($oran_bilgi['oran_val']=="T"){ ?>E
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='ar'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>أجل
<? } else if($oran_bilgi['oran_val']=="H"){ ?>لا
<? } else if($oran_bilgi['oran_val']=="A"){ ?>أدنى
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>أعلى
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 وما فوق
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 وما فوق
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 و السفلى
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 و السفلى
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 و نعم
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 و نعم
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 و لا
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 و لا
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>لا هدف
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>س ونعم
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>زوجان
<? } else if($oran_bilgi['oran_val']=="T"){ ?>واحد
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='ru'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>да
<? } else if($oran_bilgi['oran_val']=="H"){ ?>нет
<? } else if($oran_bilgi['oran_val']=="A"){ ?>ниже
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>топ
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 и выше
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 и выше
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 и ниже
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 и ниже
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 и да
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 и да
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 и нет
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 и нет
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>Нет цели
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>Х и да
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>пара
<? } else if($oran_bilgi['oran_val']=="T"){ ?>один
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

</div> <div class="quote"><?=nf($buoran); ?></div></div></div>
<? } ?>
<div class=""></div>
</div>
<? } else if($tip['tip_kodu']==4) { ?>
<div class="navitem odd"> <div class="w100 center text small bold" style="height:22px;"><?=getTranslation('toran'.$tip['id'].'')?></div></div>
<div class="navitem noborder w100 odd">
<?
$sss = sed_sql_query("select id,mac_db_id,oran_tip,oran_val_id,oran,durum from oranlar_tenis ora where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' order by (select yapi from oran_val_tenis ov where ov.id=ora.oran_val_id) asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_tenis where id='$row[oran_val_id]'");
$mbs = mbsvert($mb['id'],$mb['mbs'],$mb['kupa_id']);
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$mbs|$mb[mac_time]|tenis";
$buoran = oranbult($mac_db_id,$row['oran_val_id']);
?>
<div class="cell w50"> <div class="<?=$mb["id"];?> qbutton <?=md5($row['oran_val_id']."|".$mb["id"]);?>  " oddsid="<?=$mb["id"];?><?=$row["oran_tip"];?><?=$row["oran_val_id"];?>" onclick="kupon(<?=$mb["id"];?><?=$row["oran_tip"];?><?=$row["oran_val_id"];?>,<?=$mb["id"];?>,'<?=codekupon("$encoded|$row[oran_val_id]|$buoran"); ?>', this);"> <div class="caption">

<? if($dil_bilgisi22['language']=='en'){ ?>


<? if($oran_bilgi['oran_val']=="E"){ ?>Y
<? } else if($oran_bilgi['oran_val']=="H"){ ?>N
<? } else if($oran_bilgi['oran_val']=="A"){ ?>U
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>O
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 and O
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 and O
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 and U
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 and U
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 and Y
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 and Y
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 and N
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 and N
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>No Goal
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>X and Y
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>D
<? } else if($oran_bilgi['oran_val']=="T"){ ?>S
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='de'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>J
<? } else if($oran_bilgi['oran_val']=="H"){ ?>K
<? } else if($oran_bilgi['oran_val']=="A"){ ?>N
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>T
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 und T
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 und T
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 und N
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 und N
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 und J
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 und J
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 und K
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 und K
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>Kein Ziel
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>X und J
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>P
<? } else if($oran_bilgi['oran_val']=="T"){ ?>E
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='ar'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>أجل
<? } else if($oran_bilgi['oran_val']=="H"){ ?>لا
<? } else if($oran_bilgi['oran_val']=="A"){ ?>أدنى
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>أعلى
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 وما فوق
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 وما فوق
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 و السفلى
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 و السفلى
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 و نعم
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 و نعم
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 و لا
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 و لا
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>لا هدف
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>س ونعم
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>زوجان
<? } else if($oran_bilgi['oran_val']=="T"){ ?>واحد
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='ru'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>да
<? } else if($oran_bilgi['oran_val']=="H"){ ?>нет
<? } else if($oran_bilgi['oran_val']=="A"){ ?>ниже
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>топ
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 и выше
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 и выше
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 и ниже
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 и ниже
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 и да
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 и да
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 и нет
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 и нет
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>Нет цели
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>Х и да
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>пара
<? } else if($oran_bilgi['oran_val']=="T"){ ?>один
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

</div> <div class="quote"><?=nf($buoran); ?></div></div></div>
<? if($kz==2 or $kz==4){ ?>
</div>
<div class="navitem noborder w100 odd">
<? } ?>
<? } ?>
</div>
<div class=""></div>
</div>
<? } else { ?>
<div class="navitem odd"> <div class="w100 center text small bold" style="height:22px;"><?=getTranslation('toran'.$tip['id'].'')?></div></div>
<div class="navitem noborder w100 odd">
<?
$sss = sed_sql_query("select id,mac_db_id,oran_tip,oran_val_id,oran,durum from oranlar_tenis ora where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' order by (select yapi from oran_val_tenis ov where ov.id=ora.oran_val_id) asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_tenis where id='$row[oran_val_id]'");
$mbs = mbsvert($mb['id'],$mb['mbs'],$mb['kupa_id']);
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$mbs|$mb[mac_time]|tenis";
$buoran = oranbult($mac_db_id,$row['oran_val_id']);
?>
<div class="cell w50"> <div class="<?=$mb["id"];?> qbutton <?=md5($row['oran_val_id']."|".$mb["id"]);?>  " oddsid="<?=$mb["id"];?><?=$row["oran_tip"];?><?=$row["oran_val_id"];?>" onclick="kupon(<?=$mb["id"];?><?=$row["oran_tip"];?><?=$row["oran_val_id"];?>,<?=$mb["id"];?>,'<?=codekupon("$encoded|$row[oran_val_id]|$buoran"); ?>', this);"> <div class="caption">

<? if($dil_bilgisi22['language']=='en'){ ?>


<? if($oran_bilgi['oran_val']=="E"){ ?>Y
<? } else if($oran_bilgi['oran_val']=="H"){ ?>N
<? } else if($oran_bilgi['oran_val']=="A"){ ?>U
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>O
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 and O
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 and O
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 and U
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 and U
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 and Y
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 and Y
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 and N
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 and N
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>No Goal
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>X and Y
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>D
<? } else if($oran_bilgi['oran_val']=="T"){ ?>S
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='de'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>J
<? } else if($oran_bilgi['oran_val']=="H"){ ?>K
<? } else if($oran_bilgi['oran_val']=="A"){ ?>N
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>T
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 und T
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 und T
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 und N
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 und N
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 und J
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 und J
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 und K
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 und K
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>Kein Ziel
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>X und J
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>P
<? } else if($oran_bilgi['oran_val']=="T"){ ?>E
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='ar'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>أجل
<? } else if($oran_bilgi['oran_val']=="H"){ ?>لا
<? } else if($oran_bilgi['oran_val']=="A"){ ?>أدنى
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>أعلى
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 وما فوق
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 وما فوق
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 و السفلى
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 و السفلى
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 و نعم
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 و نعم
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 و لا
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 و لا
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>لا هدف
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>س ونعم
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>زوجان
<? } else if($oran_bilgi['oran_val']=="T"){ ?>واحد
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='ru'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>да
<? } else if($oran_bilgi['oran_val']=="H"){ ?>нет
<? } else if($oran_bilgi['oran_val']=="A"){ ?>ниже
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>топ
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 и выше
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 и выше
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 и ниже
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 и ниже
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 и да
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 и да
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 и нет
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 и нет
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>Нет цели
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>Х и да
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>пара
<? } else if($oran_bilgi['oran_val']=="T"){ ?>один
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

</div> <div class="quote"><?=nf($buoran); ?></div></div></div>
<? if($kz==2 or $kz==4 or $kz==6 or $kz==8 or $kz==10 or $kz==12 or $kz==14 or $kz==16 or $kz==18 or $kz==20){ ?>
</div>
<div class="navitem noborder w100 odd">
<? } ?>
<? } ?>
</div>
<div class=""></div>
</div>
<? } ?>
<? } ?>
<div style="text-align: center;font-weight: bold;color: #f64835;" onclick="loadbulten2();"><?=getTranslation('exportlisteyedon')?></div>

<?
$sor = sed_sql_query("select oran_tip,oran_val_id,mac_db_id from kupon where session_id='$session_id' and mac_kodu='$mb[mac_kodu]' and spor_tip='tenis'");
while($row=sed_sql_fetcharray($sor)) {
$oran_tip_bol = explode('|',$row['oran_tip']);
if($oran_tip_bol[0]=="Kim Kazanır ?"){ $oran_tip_ver = 1; } else
if($oran_tip_bol[0]=="Set Bahsi"){ $oran_tip_ver = 2; } else
if($oran_tip_bol[0]=="1.Seti Kim Kazanır ?"){ $oran_tip_ver = 3; } else
if($oran_tip_bol[0]=="2.Seti Kim Kazanır ?"){ $oran_tip_ver = 4; } else
if($oran_tip_bol[0]=="1.Oyuncu 1 Set Kazanır"){ $oran_tip_ver = 5; } else
if($oran_tip_bol[0]=="2.Oyuncu 1 Set Kazanır"){ $oran_tip_ver = 6; }
?>
<script>
$("div[oddsid='<?=$row['mac_db_id'];?><?=$oran_tip_ver;?><?=$row['oran_val_id'];?>']").addClass('selected');
</script>
<? } ?>

<? } 
## TENİS BİTİŞİ ##

else if($sportip==4){

$mb = bilgi("select * from program_voleybol where id='$mac_db_id'");

$fark = $mb['mac_time']-time();

$gizli_oran_tips = gizli_oran_tips_voleybol($mb['id']);

if($gizli_oran_tips!="") { $gizli_ekle = "and oran_tip not in ($gizli_oran_tips)"; } else { $gizli_ekle = ""; }

?>

<div style="text-align: center;font-weight: bold;color: #f64835;" onclick="loadbulten2();"><?=getTranslation('exportlisteyedon')?></div>

<div class="odd singlebar barmiddle ">
<div id="e9441141" class="event match noborder">
<div class="hidden"><div colspan="11" class="c_comment"><div class="c_comment"></div><div class="c_pointer"></div></div></div>
<div class="event_wrapper">
<div class="datetime ">
<div class="favorites hidden"> <img src="assets/img/favorite0.png"> </div>
<div class="sportsIcon "><div class="icon"><div class="sports soccer"></div> </div></div>
<div class="date small ">
<div> <?=date("d.m H:i",$mb['mac_time']); ?> </div>
<img src="assets/img/live_rain.png" alt="" width="23" height="23" class="hidden">
<span class=""> <img src="assets/img/icon_live.png" alt="" width="24" height="12"> </span>
</div>
</div>
<div class="teamrows">
<div class="teamrow">
<div class="team"> <?=$mb['ev_takim'];?>  </div>
<div class="score">
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
</div>
</div>
<div class="teamrow">
<div class="team"> <?=$mb['konuk_takim'];?>  </div>
<div class="score">
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
</div>
</div>
</div>
<div class="hidden"> <div class="hidden">  </div></div>
<div class="hidden"></div>
<div class="placeholder "></div>
</div>
</div>
</div>
<div class="odd singlebar barmiddle" style="padding: 5px;"></div>
<div id="rsg1" class="rsGroup" style="display: block;">

<?
$orderle = "FIELD(oran_tip, '1', '4', '3', '2') ASC";

$sor = sed_sql_query("select mac_db_id,oran_tip,durum from oranlar_voleybol where mac_db_id='$mac_db_id' and durum='1' $gizli_ekle group by oran_tip order by {$orderle}");

$i = 1;
while($ass=sed_sql_fetchassoc($sor)) { 
$i++;
$tip = bilgi("select id,tip_isim,tip_kodu from oran_tip_voleybol where id='$ass[oran_tip]'");

?>
<? if($tip['tip_kodu']==3) { ?>	
<div class="navitem noborder w100 odd" style=""> <div class="cell rsDesc w25"><?=getTranslation('voran'.$tip['id'].'')?></div>
<?
$sss = sed_sql_query("select mac_db_id,oran_tip,oran_val_id,oran,durum,oran_val_v from oranlar_voleybol ora where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' order by (select yapi from oran_val_voleybol ov where ov.id=ora.oran_val_id) asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_voleybol where id='$row[oran_val_id]'");
$mbs = mbsverv($mb['id'],$mb['mbs'],$mb['kupa_id']);
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$mbs|$mb[mac_time]|voleybol";
$buoran = oranbulv($mac_db_id,$row['oran_val_id']);
?>
<div class="cell w25 rsBut"> <div class="qbutton l  s qbut-<?=md5($row['oran_val_id']."|".$mb["id"]);?>  " onclick="kupon('<?=codekupon("$encoded|$row[oran_val_id]|$buoran"); ?>');"> <div class="caption">

<? if($dil_bilgisi22['language']=='en'){ ?>


<? if($oran_bilgi['oran_val']=="E"){ ?>Y
<? } else if($oran_bilgi['oran_val']=="H"){ ?>N
<? } else if($oran_bilgi['oran_val']=="A"){ ?>U
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>O
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 and O
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 and O
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 and U
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 and U
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 and Y
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 and Y
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 and N
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 and N
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>No Goal
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>X and Y
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>D
<? } else if($oran_bilgi['oran_val']=="T"){ ?>S
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='de'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>J
<? } else if($oran_bilgi['oran_val']=="H"){ ?>K
<? } else if($oran_bilgi['oran_val']=="A"){ ?>N
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>T
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 und T
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 und T
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 und N
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 und N
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 und J
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 und J
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 und K
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 und K
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>Kein Ziel
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>X und J
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>P
<? } else if($oran_bilgi['oran_val']=="T"){ ?>E
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='ar'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>أجل
<? } else if($oran_bilgi['oran_val']=="H"){ ?>لا
<? } else if($oran_bilgi['oran_val']=="A"){ ?>أدنى
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>أعلى
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 وما فوق
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 وما فوق
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 و السفلى
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 و السفلى
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 و نعم
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 و نعم
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 و لا
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 و لا
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>لا هدف
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>س ونعم
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>زوجان
<? } else if($oran_bilgi['oran_val']=="T"){ ?>واحد
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='ru'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>да
<? } else if($oran_bilgi['oran_val']=="H"){ ?>нет
<? } else if($oran_bilgi['oran_val']=="A"){ ?>ниже
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>топ
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 и выше
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 и выше
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 и ниже
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 и ниже
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 и да
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 и да
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 и нет
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 и нет
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>Нет цели
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>Х и да
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>пара
<? } else if($oran_bilgi['oran_val']=="T"){ ?>один
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

 <? if($row['oran_val_v']!="") { echo "( <font style='color:#f00;font-weight:bold;'>$row[oran_val_v]</font> )"; } ?></div> <div class="quote"><?=nf($buoran); ?></div></div></div>
<? } ?>
<div class=""></div>
</div>
<? } else if($tip['tip_kodu']==2) { ?>
<div class="navitem noborder w100 odd" style=""> <div class="cell rsDesc w50"><?=getTranslation('voran'.$tip['id'].'')?></div>
<?
$sss = sed_sql_query("select mac_db_id,oran_tip,oran_val_id,oran,durum,oran_val_v from oranlar_voleybol ora where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' order by (select yapi from oran_val_voleybol ov where ov.id=ora.oran_val_id) asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_voleybol where id='$row[oran_val_id]'");
$mbs = mbsverv($mb['id'],$mb['mbs'],$mb['kupa_id']);
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$mbs|$mb[mac_time]|voleybol";
$buoran = oranbulv($mac_db_id,$row['oran_val_id']);
?>
<div class="cell w25 rsBut"> <div class="qbutton l  s qbut-<?=md5($row['oran_val_id']."|".$mb["id"]);?>  " onclick="kupon('<?=codekupon("$encoded|$row[oran_val_id]|$buoran"); ?>');"> <div class="caption">

<? if($dil_bilgisi22['language']=='en'){ ?>


<? if($oran_bilgi['oran_val']=="E"){ ?>Y
<? } else if($oran_bilgi['oran_val']=="H"){ ?>N
<? } else if($oran_bilgi['oran_val']=="A"){ ?>U
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>O
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 and O
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 and O
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 and U
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 and U
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 and Y
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 and Y
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 and N
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 and N
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>No Goal
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>X and Y
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>D
<? } else if($oran_bilgi['oran_val']=="T"){ ?>S
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='de'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>J
<? } else if($oran_bilgi['oran_val']=="H"){ ?>K
<? } else if($oran_bilgi['oran_val']=="A"){ ?>N
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>T
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 und T
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 und T
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 und N
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 und N
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 und J
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 und J
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 und K
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 und K
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>Kein Ziel
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>X und J
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>P
<? } else if($oran_bilgi['oran_val']=="T"){ ?>E
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='ar'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>أجل
<? } else if($oran_bilgi['oran_val']=="H"){ ?>لا
<? } else if($oran_bilgi['oran_val']=="A"){ ?>أدنى
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>أعلى
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 وما فوق
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 وما فوق
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 و السفلى
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 و السفلى
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 و نعم
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 و نعم
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 و لا
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 و لا
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>لا هدف
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>س ونعم
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>زوجان
<? } else if($oran_bilgi['oran_val']=="T"){ ?>واحد
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='ru'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>да
<? } else if($oran_bilgi['oran_val']=="H"){ ?>нет
<? } else if($oran_bilgi['oran_val']=="A"){ ?>ниже
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>топ
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 и выше
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 и выше
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 и ниже
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 и ниже
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 и да
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 и да
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 и нет
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 и нет
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>Нет цели
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>Х и да
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>пара
<? } else if($oran_bilgi['oran_val']=="T"){ ?>один
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

 <? if($row['oran_val_v']!="") { echo "( <font style='color:#f00;font-weight:bold;'>$row[oran_val_v]</font> )"; } ?></div> <div class="quote"><?=nf($buoran); ?></div></div></div>
<? } ?>
<div class=""></div>
</div>
<? } else if($tip['tip_kodu']==4) { ?>
<div class="navitem odd"> <div class="w100 center text small bold" style="height:22px;"><?=getTranslation('voran'.$tip['id'].'')?></div></div>
<div class="navitem noborder w100 odd">
<?
$sss = sed_sql_query("select mac_db_id,oran_tip,oran_val_id,oran,durum,oran_val_v from oranlar_voleybol ora where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' order by (select yapi from oran_val_voleybol ov where ov.id=ora.oran_val_id) asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_voleybol where id='$row[oran_val_id]'");
$mbs = mbsverv($mb['id'],$mb['mbs'],$mb['kupa_id']);
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$mbs|$mb[mac_time]|voleybol";
$buoran = oranbulv($mac_db_id,$row['oran_val_id']);
?>
<div class="cell w50"> <div class="qbutton rsMultBut s qbut-<?=md5($row['oran_val_id']."|".$mb["id"]);?>  " onclick="kupon('<?=codekupon("$encoded|$row[oran_val_id]|$buoran"); ?>');"> <div class="caption">

<? if($dil_bilgisi22['language']=='en'){ ?>


<? if($oran_bilgi['oran_val']=="E"){ ?>Y
<? } else if($oran_bilgi['oran_val']=="H"){ ?>N
<? } else if($oran_bilgi['oran_val']=="A"){ ?>U
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>O
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 and O
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 and O
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 and U
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 and U
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 and Y
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 and Y
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 and N
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 and N
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>No Goal
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>X and Y
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>D
<? } else if($oran_bilgi['oran_val']=="T"){ ?>S
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='de'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>J
<? } else if($oran_bilgi['oran_val']=="H"){ ?>K
<? } else if($oran_bilgi['oran_val']=="A"){ ?>N
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>T
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 und T
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 und T
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 und N
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 und N
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 und J
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 und J
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 und K
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 und K
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>Kein Ziel
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>X und J
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>P
<? } else if($oran_bilgi['oran_val']=="T"){ ?>E
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='ar'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>أجل
<? } else if($oran_bilgi['oran_val']=="H"){ ?>لا
<? } else if($oran_bilgi['oran_val']=="A"){ ?>أدنى
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>أعلى
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 وما فوق
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 وما فوق
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 و السفلى
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 و السفلى
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 و نعم
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 و نعم
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 و لا
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 و لا
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>لا هدف
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>س ونعم
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>زوجان
<? } else if($oran_bilgi['oran_val']=="T"){ ?>واحد
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='ru'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>да
<? } else if($oran_bilgi['oran_val']=="H"){ ?>нет
<? } else if($oran_bilgi['oran_val']=="A"){ ?>ниже
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>топ
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 и выше
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 и выше
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 и ниже
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 и ниже
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 и да
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 и да
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 и нет
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 и нет
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>Нет цели
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>Х и да
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>пара
<? } else if($oran_bilgi['oran_val']=="T"){ ?>один
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

 <? if($row['oran_val_v']!="") { echo "( <font style='color:#f00;font-weight:bold;'>$row[oran_val_v]</font> )"; } ?></div> <div class="quote"><?=nf($buoran); ?></div></div></div>
<? if($kz==2 or $kz==4){ ?>
</div>
<div class="navitem noborder w100 odd">
<? } ?>
<? } ?>
</div>
<div class=""></div>
</div>
<? } else { ?>
<div class="navitem odd"> <div class="w100 center text small bold" style="height:22px;"><?=getTranslation('voran'.$tip['id'].'')?></div></div>
<div class="navitem noborder w100 odd">
<?
$sss = sed_sql_query("select mac_db_id,oran_tip,oran_val_id,oran,durum,oran_val_v from oranlar_voleybol ora where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' order by (select yapi from oran_val_voleybol ov where ov.id=ora.oran_val_id) asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_voleybol where id='$row[oran_val_id]'");
$mbs = mbsverv($mb['id'],$mb['mbs'],$mb['kupa_id']);
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$mbs|$mb[mac_time]|voleybol";
$buoran = oranbulv($mac_db_id,$row['oran_val_id']);
?>
<div class="cell w50"> <div class="qbutton rsMultBut s qbut-<?=md5($row['oran_val_id']."|".$mb["id"]);?>  " onclick="kupon('<?=codekupon("$encoded|$row[oran_val_id]|$buoran"); ?>');"> <div class="caption">

<? if($dil_bilgisi22['language']=='en'){ ?>


<? if($oran_bilgi['oran_val']=="E"){ ?>Y
<? } else if($oran_bilgi['oran_val']=="H"){ ?>N
<? } else if($oran_bilgi['oran_val']=="A"){ ?>U
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>O
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 and O
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 and O
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 and U
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 and U
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 and Y
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 and Y
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 and N
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 and N
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>No Goal
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>X and Y
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>D
<? } else if($oran_bilgi['oran_val']=="T"){ ?>S
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='de'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>J
<? } else if($oran_bilgi['oran_val']=="H"){ ?>K
<? } else if($oran_bilgi['oran_val']=="A"){ ?>N
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>T
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 und T
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 und T
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 und N
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 und N
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 und J
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 und J
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 und K
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 und K
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>Kein Ziel
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>X und J
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>P
<? } else if($oran_bilgi['oran_val']=="T"){ ?>E
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='ar'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>أجل
<? } else if($oran_bilgi['oran_val']=="H"){ ?>لا
<? } else if($oran_bilgi['oran_val']=="A"){ ?>أدنى
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>أعلى
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 وما فوق
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 وما فوق
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 و السفلى
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 و السفلى
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 و نعم
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 و نعم
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 و لا
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 و لا
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>لا هدف
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>س ونعم
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>زوجان
<? } else if($oran_bilgi['oran_val']=="T"){ ?>واحد
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='ru'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>да
<? } else if($oran_bilgi['oran_val']=="H"){ ?>нет
<? } else if($oran_bilgi['oran_val']=="A"){ ?>ниже
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>топ
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 и выше
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 и выше
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 и ниже
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 и ниже
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 и да
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 и да
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 и нет
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 и нет
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>Нет цели
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>Х и да
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>пара
<? } else if($oran_bilgi['oran_val']=="T"){ ?>один
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

 <? if($row['oran_val_v']!="") { echo "( <font style='color:#f00;font-weight:bold;'>$row[oran_val_v]</font> )"; } ?></div> <div class="quote"><?=nf($buoran); ?></div></div></div>
<? if($kz==2 or $kz==4 or $kz==6 or $kz==8 or $kz==10 or $kz==12 or $kz==14 or $kz==16 or $kz==18 or $kz==20){ ?>
</div>
<div class="navitem noborder w100 odd">
<? } ?>
<? } ?>
</div>
<div class=""></div>
</div>
<? } ?>
<? } ?>
<div style="text-align: center;font-weight: bold;color: #f64835;" onclick="loadbulten2();"><?=getTranslation('exportlisteyedon')?></div>

<? } 
## VOLEYBOL BİTİŞİ ##

else if($sportip==5){

$mb = bilgi("select * from program_buzhokeyi where id='$mac_db_id'");

$fark = $mb['mac_time']-time();

$gizli_oran_tips = gizli_oran_tips_buzhokeyi($mb['id']);

if($gizli_oran_tips!="") { $gizli_ekle = "and oran_tip not in ($gizli_oran_tips)"; } else { $gizli_ekle = ""; }

?>

<div style="text-align: center;font-weight: bold;color: #f64835;" onclick="loadbulten2();"><?=getTranslation('exportlisteyedon')?></div>

<div class="odd singlebar barmiddle ">
<div id="e9441141" class="event match noborder">
<div class="hidden"><div colspan="11" class="c_comment"><div class="c_comment"></div><div class="c_pointer"></div></div></div>
<div class="event_wrapper">
<div class="datetime ">
<div class="favorites hidden"> <img src="assets/img/favorite0.png"> </div>
<div class="sportsIcon "><div class="icon"><div class="sports soccer"></div> </div></div>
<div class="date small ">
<div> <?=date("d.m H:i",$mb['mac_time']); ?> </div>
<img src="assets/img/live_rain.png" alt="" width="23" height="23" class="hidden">
<span class=""> <img src="assets/img/icon_live.png" alt="" width="24" height="12"> </span>
</div>
</div>
<div class="teamrows">
<div class="teamrow">
<div class="team"> <?=$mb['ev_takim'];?>  </div>
<div class="score">
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
</div>
</div>
<div class="teamrow">
<div class="team"> <?=$mb['konuk_takim'];?>  </div>
<div class="score">
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
</div>
</div>
</div>
<div class="hidden"> <div class="hidden">  </div></div>
<div class="hidden"></div>
<div class="placeholder "></div>
</div>
</div>
</div>
<div class="odd singlebar barmiddle" style="padding: 5px;"></div>
<div id="rsg1" class="rsGroup" style="display: block;">

<?
$orderle = "FIELD(oran_tip, '1', '2', '3', '4', '5', '6', '7', '8', '9') ASC";

$sor = sed_sql_query("select mac_db_id,oran_tip,durum from oranlar_buzhokeyi where mac_db_id='$mac_db_id' and durum='1' $gizli_ekle group by oran_tip order by {$orderle}");

$i = 1;
while($ass=sed_sql_fetchassoc($sor)) { 
$i++;
$tip = bilgi("select id,tip_isim,tip_kodu from oran_tip_buzhokeyi where id='$ass[oran_tip]'");

?>
<? if($tip['tip_kodu']==3) { ?>	
<div class="navitem noborder w100 odd" style=""> <div class="cell rsDesc w25"><?=getTranslation('buzoran'.$tip['id'].'')?></div>
<?
$sss = sed_sql_query("select mac_db_id,oran_tip,oran_val_id,oran,durum from oranlar_buzhokeyi ora where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' order by oran_val_id asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_buzhokeyi where id='$row[oran_val_id]'");
$mbs = mbsverbuz($mb['id'],$mb['mbs'],$mb['kupa_id']);
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$mbs|$mb[mac_time]|buzhokeyi";
$buoran = oranbulbuz($mac_db_id,$row['oran_val_id']);
?>
<div class="cell w25 rsBut"> <div class="qbutton l  s qbut-<?=md5($row['oran_val_id']."|".$mb["id"]);?>  " onclick="kupon('<?=codekupon("$encoded|$row[oran_val_id]|$buoran"); ?>');"> <div class="caption">

<? if($dil_bilgisi22['language']=='en'){ ?>


<? if($oran_bilgi['oran_val']=="E"){ ?>Y
<? } else if($oran_bilgi['oran_val']=="H"){ ?>N
<? } else if($oran_bilgi['oran_val']=="A"){ ?>U
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>O
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 and O
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 and O
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 and U
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 and U
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 and Y
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 and Y
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 and N
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 and N
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>No Goal
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>X and Y
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>D
<? } else if($oran_bilgi['oran_val']=="T"){ ?>S
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='de'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>J
<? } else if($oran_bilgi['oran_val']=="H"){ ?>K
<? } else if($oran_bilgi['oran_val']=="A"){ ?>N
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>T
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 und T
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 und T
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 und N
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 und N
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 und J
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 und J
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 und K
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 und K
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>Kein Ziel
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>X und J
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>P
<? } else if($oran_bilgi['oran_val']=="T"){ ?>E
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='ar'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>أجل
<? } else if($oran_bilgi['oran_val']=="H"){ ?>لا
<? } else if($oran_bilgi['oran_val']=="A"){ ?>أدنى
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>أعلى
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 وما فوق
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 وما فوق
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 و السفلى
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 و السفلى
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 و نعم
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 و نعم
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 و لا
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 و لا
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>لا هدف
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>س ونعم
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>زوجان
<? } else if($oran_bilgi['oran_val']=="T"){ ?>واحد
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='ru'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>да
<? } else if($oran_bilgi['oran_val']=="H"){ ?>нет
<? } else if($oran_bilgi['oran_val']=="A"){ ?>ниже
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>топ
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 и выше
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 и выше
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 и ниже
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 и ниже
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 и да
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 и да
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 и нет
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 и нет
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>Нет цели
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>Х и да
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>пара
<? } else if($oran_bilgi['oran_val']=="T"){ ?>один
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

</div> <div class="quote"><?=nf($buoran); ?></div></div></div>
<? } ?>
<div class=""></div>
</div>
<? } else if($tip['tip_kodu']==2) { ?>
<div class="navitem noborder w100 odd" style=""> <div class="cell rsDesc w50"><?=getTranslation('buzoran'.$tip['id'].'')?></div>
<?
$sss = sed_sql_query("select mac_db_id,oran_tip,oran_val_id,oran,durum from oranlar_buzhokeyi ora where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' order by oran_val_id asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_buzhokeyi where id='$row[oran_val_id]'");
$mbs = mbsverbuz($mb['id'],$mb['mbs'],$mb['kupa_id']);
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$mbs|$mb[mac_time]|buzhokeyi";
$buoran = oranbulbuz($mac_db_id,$row['oran_val_id']);
?>
<div class="cell w25 rsBut"> <div class="qbutton l  s qbut-<?=md5($row['oran_val_id']."|".$mb["id"]);?>  " onclick="kupon('<?=codekupon("$encoded|$row[oran_val_id]|$buoran"); ?>');"> <div class="caption">

<? if($dil_bilgisi22['language']=='en'){ ?>


<? if($oran_bilgi['oran_val']=="E"){ ?>Y
<? } else if($oran_bilgi['oran_val']=="H"){ ?>N
<? } else if($oran_bilgi['oran_val']=="A"){ ?>U
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>O
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 and O
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 and O
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 and U
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 and U
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 and Y
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 and Y
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 and N
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 and N
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>No Goal
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>X and Y
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>D
<? } else if($oran_bilgi['oran_val']=="T"){ ?>S
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='de'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>J
<? } else if($oran_bilgi['oran_val']=="H"){ ?>K
<? } else if($oran_bilgi['oran_val']=="A"){ ?>N
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>T
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 und T
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 und T
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 und N
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 und N
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 und J
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 und J
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 und K
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 und K
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>Kein Ziel
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>X und J
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>P
<? } else if($oran_bilgi['oran_val']=="T"){ ?>E
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='ar'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>أجل
<? } else if($oran_bilgi['oran_val']=="H"){ ?>لا
<? } else if($oran_bilgi['oran_val']=="A"){ ?>أدنى
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>أعلى
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 وما فوق
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 وما فوق
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 و السفلى
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 و السفلى
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 و نعم
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 و نعم
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 و لا
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 و لا
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>لا هدف
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>س ونعم
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>زوجان
<? } else if($oran_bilgi['oran_val']=="T"){ ?>واحد
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='ru'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>да
<? } else if($oran_bilgi['oran_val']=="H"){ ?>нет
<? } else if($oran_bilgi['oran_val']=="A"){ ?>ниже
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>топ
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 и выше
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 и выше
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 и ниже
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 и ниже
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 и да
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 и да
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 и нет
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 и нет
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>Нет цели
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>Х и да
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>пара
<? } else if($oran_bilgi['oran_val']=="T"){ ?>один
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

</div> <div class="quote"><?=nf($buoran); ?></div></div></div>
<? } ?>
<div class=""></div>
</div>
<? } else if($tip['tip_kodu']==4) { ?>
<div class="navitem odd"> <div class="w100 center text small bold" style="height:22px;"><?=getTranslation('buzoran'.$tip['id'].'')?></div></div>
<div class="navitem noborder w100 odd">
<?
$sss = sed_sql_query("select mac_db_id,oran_tip,oran_val_id,oran,durum from oranlar_buzhokeyi ora where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' order by oran_val_id asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_buzhokeyi where id='$row[oran_val_id]'");
$mbs = mbsverbuz($mb['id'],$mb['mbs'],$mb['kupa_id']);
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$mbs|$mb[mac_time]|buzhokeyi";
$buoran = oranbulbuz($mac_db_id,$row['oran_val_id']);
?>
<div class="cell w50"> <div class="qbutton rsMultBut s qbut-<?=md5($row['oran_val_id']."|".$mb["id"]);?>  " onclick="kupon('<?=codekupon("$encoded|$row[oran_val_id]|$buoran"); ?>');"> <div class="caption">

<? if($dil_bilgisi22['language']=='en'){ ?>


<? if($oran_bilgi['oran_val']=="E"){ ?>Y
<? } else if($oran_bilgi['oran_val']=="H"){ ?>N
<? } else if($oran_bilgi['oran_val']=="A"){ ?>U
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>O
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 and O
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 and O
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 and U
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 and U
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 and Y
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 and Y
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 and N
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 and N
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>No Goal
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>X and Y
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>D
<? } else if($oran_bilgi['oran_val']=="T"){ ?>S
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='de'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>J
<? } else if($oran_bilgi['oran_val']=="H"){ ?>K
<? } else if($oran_bilgi['oran_val']=="A"){ ?>N
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>T
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 und T
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 und T
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 und N
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 und N
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 und J
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 und J
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 und K
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 und K
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>Kein Ziel
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>X und J
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>P
<? } else if($oran_bilgi['oran_val']=="T"){ ?>E
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='ar'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>أجل
<? } else if($oran_bilgi['oran_val']=="H"){ ?>لا
<? } else if($oran_bilgi['oran_val']=="A"){ ?>أدنى
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>أعلى
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 وما فوق
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 وما فوق
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 و السفلى
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 و السفلى
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 و نعم
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 و نعم
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 و لا
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 و لا
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>لا هدف
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>س ونعم
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>زوجان
<? } else if($oran_bilgi['oran_val']=="T"){ ?>واحد
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='ru'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>да
<? } else if($oran_bilgi['oran_val']=="H"){ ?>нет
<? } else if($oran_bilgi['oran_val']=="A"){ ?>ниже
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>топ
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 и выше
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 и выше
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 и ниже
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 и ниже
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 и да
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 и да
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 и нет
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 и нет
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>Нет цели
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>Х и да
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>пара
<? } else if($oran_bilgi['oran_val']=="T"){ ?>один
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

</div> <div class="quote"><?=nf($buoran); ?></div></div></div>
<? if($kz==2 or $kz==4){ ?>
</div>
<div class="navitem noborder w100 odd">
<? } ?>
<? } ?>
</div>
<div class=""></div>
</div>
<? } else { ?>
<div class="navitem odd"> <div class="w100 center text small bold" style="height:22px;"><?=getTranslation('buzoran'.$tip['id'].'')?></div></div>
<div class="navitem noborder w100 odd">
<?
$sss = sed_sql_query("select mac_db_id,oran_tip,oran_val_id,oran,durum from oranlar_buzhokeyi ora where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' order by oran_val_id asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_buzhokeyi where id='$row[oran_val_id]'");
$mbs = mbsverbuz($mb['id'],$mb['mbs'],$mb['kupa_id']);
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$mbs|$mb[mac_time]|buzhokeyi";
$buoran = oranbulbuz($mac_db_id,$row['oran_val_id']);
?>
<div class="cell w50"> <div class="qbutton rsMultBut s qbut-<?=md5($row['oran_val_id']."|".$mb["id"]);?>  " onclick="kupon('<?=codekupon("$encoded|$row[oran_val_id]|$buoran"); ?>');"> <div class="caption">

<? if($dil_bilgisi22['language']=='en'){ ?>


<? if($oran_bilgi['oran_val']=="E"){ ?>Y
<? } else if($oran_bilgi['oran_val']=="H"){ ?>N
<? } else if($oran_bilgi['oran_val']=="A"){ ?>U
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>O
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 and O
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 and O
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 and U
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 and U
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 and Y
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 and Y
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 and N
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 and N
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>No Goal
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>X and Y
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>D
<? } else if($oran_bilgi['oran_val']=="T"){ ?>S
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='de'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>J
<? } else if($oran_bilgi['oran_val']=="H"){ ?>K
<? } else if($oran_bilgi['oran_val']=="A"){ ?>N
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>T
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 und T
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 und T
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 und N
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 und N
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 und J
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 und J
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 und K
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 und K
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>Kein Ziel
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>X und J
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>P
<? } else if($oran_bilgi['oran_val']=="T"){ ?>E
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='ar'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>أجل
<? } else if($oran_bilgi['oran_val']=="H"){ ?>لا
<? } else if($oran_bilgi['oran_val']=="A"){ ?>أدنى
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>أعلى
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 وما فوق
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 وما فوق
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 و السفلى
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 و السفلى
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 و نعم
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 و نعم
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 و لا
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 و لا
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>لا هدف
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>س ونعم
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>زوجان
<? } else if($oran_bilgi['oran_val']=="T"){ ?>واحد
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='ru'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>да
<? } else if($oran_bilgi['oran_val']=="H"){ ?>нет
<? } else if($oran_bilgi['oran_val']=="A"){ ?>ниже
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>топ
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 и выше
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 и выше
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 и ниже
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 и ниже
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 и да
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 и да
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 и нет
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 и нет
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>Нет цели
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>Х и да
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>пара
<? } else if($oran_bilgi['oran_val']=="T"){ ?>один
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

</div> <div class="quote"><?=nf($buoran); ?></div></div></div>
<? if($kz==2 or $kz==4 or $kz==6 or $kz==8 or $kz==10 or $kz==12 or $kz==14 or $kz==16 or $kz==18 or $kz==20){ ?>
</div>
<div class="navitem noborder w100 odd">
<? } ?>
<? } ?>
</div>
<div class=""></div>
</div>
<? } ?>
<? } ?>
<div style="text-align: center;font-weight: bold;color: #f64835;" onclick="loadbulten2();"><?=getTranslation('exportlisteyedon')?></div>

<? } 
## BUZHOKEYİ BİTİŞİ ##

else if($sportip==6){

$mb = bilgi("select * from program_hentbol where id='$mac_db_id'");

$fark = $mb['mac_time']-time();

$gizli_oran_tips = gizli_oran_tips_hentbol($mb['id']);

if($gizli_oran_tips!="") { $gizli_ekle = "and oran_tip not in ($gizli_oran_tips)"; } else { $gizli_ekle = ""; }

?>

<div style="text-align: center;font-weight: bold;color: #f64835;" onclick="loadbulten2();"><?=getTranslation('exportlisteyedon')?></div>

<div class="odd singlebar barmiddle ">
<div id="e9441141" class="event match noborder">
<div class="hidden"><div colspan="11" class="c_comment"><div class="c_comment"></div><div class="c_pointer"></div></div></div>
<div class="event_wrapper">
<div class="datetime ">
<div class="favorites hidden"> <img src="assets/img/favorite0.png"> </div>
<div class="sportsIcon "><div class="icon"><div class="sports soccer"></div> </div></div>
<div class="date small ">
<div> <?=date("d.m H:i",$mb['mac_time']); ?> </div>
<img src="assets/img/live_rain.png" alt="" width="23" height="23" class="hidden">
<span class=""> <img src="assets/img/icon_live.png" alt="" width="24" height="12"> </span>
</div>
</div>
<div class="teamrows">
<div class="teamrow">
<div class="team"> <?=$mb['ev_takim'];?>  </div>
<div class="score">
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
</div>
</div>
<div class="teamrow">
<div class="team"> <?=$mb['konuk_takim'];?>  </div>
<div class="score">
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
</div>
</div>
</div>
<div class="hidden"> <div class="hidden">  </div></div>
<div class="hidden"></div>
<div class="placeholder "></div>
</div>
</div>
</div>
<div class="odd singlebar barmiddle" style="padding: 5px;"></div>
<div id="rsg1" class="rsGroup" style="display: block;">

<?
$orderle = "FIELD(oran_tip, '3', '1', '5', '6', '7', '4', '2') ASC";

$sor = sed_sql_query("select mac_db_id,oran_tip,durum from oranlar_hentbol where mac_db_id='$mac_db_id' and durum='1' $gizli_ekle group by oran_tip order by {$orderle}");

$i = 1;
while($ass=sed_sql_fetchassoc($sor)) { 
$i++;
$tip = bilgi("select id,tip_isim,tip_kodu from oran_tip_hentbol where id='$ass[oran_tip]'");

?>
<? if($tip['tip_kodu']==3) { ?>	
<div class="navitem noborder w100 odd" style=""> <div class="cell rsDesc w25"><?=getTranslation('horan'.$tip['id'].'')?></div>
<?
$sss = sed_sql_query("select mac_db_id,oran_tip,oran_val_id,oran,durum,oran_val_h from oranlar_hentbol ora where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' order by oran_val_id asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_hentbol where id='$row[oran_val_id]'");
$mbs = mbsverh($mb['id'],$mb['mbs'],$mb['kupa_id']);
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$mbs|$mb[mac_time]|hentbol";
$buoran = oranbulh($mac_db_id,$row['oran_val_id']);
?>
<div class="cell w25 rsBut"> <div class="qbutton l  s qbut-<?=md5($row['oran_val_id']."|".$mb["id"]);?>  " onclick="kupon('<?=codekupon("$encoded|$row[oran_val_id]|$buoran"); ?>');"> <div class="caption">

<? if($dil_bilgisi22['language']=='en'){ ?>


<? if($oran_bilgi['oran_val']=="E"){ ?>Y
<? } else if($oran_bilgi['oran_val']=="H"){ ?>N
<? } else if($oran_bilgi['oran_val']=="A"){ ?>U
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>O
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 and O
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 and O
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 and U
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 and U
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 and Y
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 and Y
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 and N
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 and N
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>No Goal
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>X and Y
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>D
<? } else if($oran_bilgi['oran_val']=="T"){ ?>S
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='de'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>J
<? } else if($oran_bilgi['oran_val']=="H"){ ?>K
<? } else if($oran_bilgi['oran_val']=="A"){ ?>N
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>T
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 und T
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 und T
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 und N
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 und N
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 und J
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 und J
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 und K
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 und K
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>Kein Ziel
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>X und J
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>P
<? } else if($oran_bilgi['oran_val']=="T"){ ?>E
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='ar'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>أجل
<? } else if($oran_bilgi['oran_val']=="H"){ ?>لا
<? } else if($oran_bilgi['oran_val']=="A"){ ?>أدنى
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>أعلى
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 وما فوق
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 وما فوق
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 و السفلى
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 و السفلى
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 و نعم
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 و نعم
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 و لا
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 و لا
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>لا هدف
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>س ونعم
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>زوجان
<? } else if($oran_bilgi['oran_val']=="T"){ ?>واحد
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='ru'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>да
<? } else if($oran_bilgi['oran_val']=="H"){ ?>нет
<? } else if($oran_bilgi['oran_val']=="A"){ ?>ниже
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>топ
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 и выше
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 и выше
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 и ниже
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 и ниже
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 и да
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 и да
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 и нет
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 и нет
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>Нет цели
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>Х и да
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>пара
<? } else if($oran_bilgi['oran_val']=="T"){ ?>один
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

 <? if($row['oran_val_h']!="") { echo "( <font style='color:#f00;font-weight:bold;'>$row[oran_val_h]</font> )"; } ?></div> <div class="quote"><?=nf($buoran); ?></div></div></div>
<? } ?>
<div class=""></div>
</div>
<? } else if($tip['tip_kodu']==2) { ?>
<div class="navitem noborder w100 odd" style=""> <div class="cell rsDesc w50"><?=getTranslation('horan'.$tip['id'].'')?></div>
<?
$sss = sed_sql_query("select mac_db_id,oran_tip,oran_val_id,oran,durum,oran_val_h from oranlar_hentbol ora where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' order by oran_val_id asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_hentbol where id='$row[oran_val_id]'");
$mbs = mbsverh($mb['id'],$mb['mbs'],$mb['kupa_id']);
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$mbs|$mb[mac_time]|hentbol";
$buoran = oranbulh($mac_db_id,$row['oran_val_id']);
?>
<div class="cell w25 rsBut"> <div class="qbutton l  s qbut-<?=md5($row['oran_val_id']."|".$mb["id"]);?>  " onclick="kupon('<?=codekupon("$encoded|$row[oran_val_id]|$buoran"); ?>');"> <div class="caption">

<? if($dil_bilgisi22['language']=='en'){ ?>


<? if($oran_bilgi['oran_val']=="E"){ ?>Y
<? } else if($oran_bilgi['oran_val']=="H"){ ?>N
<? } else if($oran_bilgi['oran_val']=="A"){ ?>U
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>O
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 and O
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 and O
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 and U
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 and U
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 and Y
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 and Y
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 and N
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 and N
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>No Goal
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>X and Y
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>D
<? } else if($oran_bilgi['oran_val']=="T"){ ?>S
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='de'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>J
<? } else if($oran_bilgi['oran_val']=="H"){ ?>K
<? } else if($oran_bilgi['oran_val']=="A"){ ?>N
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>T
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 und T
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 und T
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 und N
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 und N
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 und J
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 und J
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 und K
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 und K
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>Kein Ziel
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>X und J
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>P
<? } else if($oran_bilgi['oran_val']=="T"){ ?>E
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='ar'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>أجل
<? } else if($oran_bilgi['oran_val']=="H"){ ?>لا
<? } else if($oran_bilgi['oran_val']=="A"){ ?>أدنى
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>أعلى
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 وما فوق
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 وما فوق
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 و السفلى
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 و السفلى
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 و نعم
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 و نعم
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 و لا
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 و لا
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>لا هدف
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>س ونعم
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>زوجان
<? } else if($oran_bilgi['oran_val']=="T"){ ?>واحد
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='ru'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>да
<? } else if($oran_bilgi['oran_val']=="H"){ ?>нет
<? } else if($oran_bilgi['oran_val']=="A"){ ?>ниже
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>топ
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 и выше
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 и выше
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 и ниже
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 и ниже
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 и да
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 и да
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 и нет
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 и нет
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>Нет цели
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>Х и да
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>пара
<? } else if($oran_bilgi['oran_val']=="T"){ ?>один
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

 <? if($row['oran_val_h']!="") { echo "( <font style='color:#f00;font-weight:bold;'>$row[oran_val_h]</font> )"; } ?></div> <div class="quote"><?=nf($buoran); ?></div></div></div>
<? } ?>
<div class=""></div>
</div>
<? } else if($tip['tip_kodu']==4) { ?>
<div class="navitem odd"> <div class="w100 center text small bold" style="height:22px;"><?=getTranslation('horan'.$tip['id'].'')?></div></div>
<div class="navitem noborder w100 odd">
<?
$sss = sed_sql_query("select mac_db_id,oran_tip,oran_val_id,oran,durum,oran_val_h from oranlar_hentbol ora where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' order by id asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_hentbol where id='$row[oran_val_id]'");
$mbs = mbsverh($mb['id'],$mb['mbs'],$mb['kupa_id']);
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$mbs|$mb[mac_time]|hentbol";
$buoran = oranbulh($mac_db_id,$row['oran_val_id']);
?>
<div class="cell w50"> <div class="qbutton rsMultBut s qbut-<?=md5($row['oran_val_id']."|".$mb["id"]);?>  " onclick="kupon('<?=codekupon("$encoded|$row[oran_val_id]|$buoran"); ?>');"> <div class="caption">

<? if($dil_bilgisi22['language']=='en'){ ?>


<? if($oran_bilgi['oran_val']=="E"){ ?>Y
<? } else if($oran_bilgi['oran_val']=="H"){ ?>N
<? } else if($oran_bilgi['oran_val']=="A"){ ?>U
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>O
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 and O
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 and O
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 and U
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 and U
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 and Y
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 and Y
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 and N
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 and N
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>No Goal
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>X and Y
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>D
<? } else if($oran_bilgi['oran_val']=="T"){ ?>S
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='de'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>J
<? } else if($oran_bilgi['oran_val']=="H"){ ?>K
<? } else if($oran_bilgi['oran_val']=="A"){ ?>N
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>T
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 und T
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 und T
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 und N
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 und N
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 und J
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 und J
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 und K
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 und K
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>Kein Ziel
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>X und J
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>P
<? } else if($oran_bilgi['oran_val']=="T"){ ?>E
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='ar'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>أجل
<? } else if($oran_bilgi['oran_val']=="H"){ ?>لا
<? } else if($oran_bilgi['oran_val']=="A"){ ?>أدنى
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>أعلى
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 وما فوق
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 وما فوق
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 و السفلى
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 و السفلى
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 و نعم
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 و نعم
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 و لا
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 و لا
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>لا هدف
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>س ونعم
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>زوجان
<? } else if($oran_bilgi['oran_val']=="T"){ ?>واحد
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='ru'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>да
<? } else if($oran_bilgi['oran_val']=="H"){ ?>нет
<? } else if($oran_bilgi['oran_val']=="A"){ ?>ниже
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>топ
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 и выше
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 и выше
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 и ниже
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 и ниже
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 и да
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 и да
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 и нет
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 и нет
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>Нет цели
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>Х и да
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>пара
<? } else if($oran_bilgi['oran_val']=="T"){ ?>один
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

 <? if($row['oran_val_h']!="") { echo "( <font style='color:#f00;font-weight:bold;'>$row[oran_val_h]</font> )"; } ?></div> <div class="quote"><?=nf($buoran); ?></div></div></div>
<? if($kz==2 or $kz==4){ ?>
</div>
<div class="navitem noborder w100 odd">
<? } ?>
<? } ?>
</div>
<div class=""></div>
</div>
<? } else { ?>
<div class="navitem odd"> <div class="w100 center text small bold" style="height:22px;"><?=getTranslation('horan'.$tip['id'].'')?></div></div>
<div class="navitem noborder w100 odd">
<?
$sss = sed_sql_query("select mac_db_id,oran_tip,oran_val_id,oran,durum,oran_val_h from oranlar_hentbol ora where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' order by oran_val_id asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_hentbol where id='$row[oran_val_id]'");
$mbs = mbsverh($mb['id'],$mb['mbs'],$mb['kupa_id']);
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$mbs|$mb[mac_time]|hentbol";
$buoran = oranbulh($mac_db_id,$row['oran_val_id']);
?>
<div class="cell w50"> <div class="qbutton rsMultBut s qbut-<?=md5($row['oran_val_id']."|".$mb["id"]);?>  " onclick="kupon('<?=codekupon("$encoded|$row[oran_val_id]|$buoran"); ?>');"> <div class="caption">

<? if($dil_bilgisi22['language']=='en'){ ?>


<? if($oran_bilgi['oran_val']=="E"){ ?>Y
<? } else if($oran_bilgi['oran_val']=="H"){ ?>N
<? } else if($oran_bilgi['oran_val']=="A"){ ?>U
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>O
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 and O
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 and O
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 and U
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 and U
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 and Y
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 and Y
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 and N
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 and N
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>No Goal
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>X and Y
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>D
<? } else if($oran_bilgi['oran_val']=="T"){ ?>S
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='de'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>J
<? } else if($oran_bilgi['oran_val']=="H"){ ?>K
<? } else if($oran_bilgi['oran_val']=="A"){ ?>N
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>T
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 und T
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 und T
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 und N
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 und N
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 und J
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 und J
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 und K
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 und K
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>Kein Ziel
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>X und J
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>P
<? } else if($oran_bilgi['oran_val']=="T"){ ?>E
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='ar'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>أجل
<? } else if($oran_bilgi['oran_val']=="H"){ ?>لا
<? } else if($oran_bilgi['oran_val']=="A"){ ?>أدنى
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>أعلى
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 وما فوق
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 وما فوق
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 و السفلى
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 و السفلى
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 و نعم
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 و نعم
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 و لا
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 و لا
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>لا هدف
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>س ونعم
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>زوجان
<? } else if($oran_bilgi['oran_val']=="T"){ ?>واحد
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='ru'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>да
<? } else if($oran_bilgi['oran_val']=="H"){ ?>нет
<? } else if($oran_bilgi['oran_val']=="A"){ ?>ниже
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>топ
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 и выше
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 и выше
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 и ниже
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 и ниже
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 и да
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 и да
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 и нет
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 и нет
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>Нет цели
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>Х и да
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>пара
<? } else if($oran_bilgi['oran_val']=="T"){ ?>один
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

 <? if($row['oran_val_h']!="") { echo "( <font style='color:#f00;font-weight:bold;'>$row[oran_val_h]</font> )"; } ?></div> <div class="quote"><?=nf($buoran); ?></div></div></div>
<? if($kz==2 or $kz==4 or $kz==6 or $kz==8 or $kz==10 or $kz==12 or $kz==14 or $kz==16 or $kz==18 or $kz==20){ ?>
</div>
<div class="navitem noborder w100 odd">
<? } ?>
<? } ?>
</div>
<div class=""></div>
</div>
<? } ?>
<? } ?>
<div style="text-align: center;font-weight: bold;color: #f64835;" onclick="loadbulten2();"><?=getTranslation('exportlisteyedon')?></div>

<? } 
## HENTBOL BİTİŞİ ##
?>

<? }

if($a=="results"){

$futbolsayi = sed_sql_fetchassoc(sed_sql_query("select COUNT(DISTINCT id) AS sayi from sonuclar where spor_tipi='futbol'"));
$basketbolsayi = sed_sql_fetchassoc(sed_sql_query("select COUNT(DISTINCT id) AS sayi from sonuclar where spor_tipi='basketbol'"));
$tenissayi = sed_sql_fetchassoc(sed_sql_query("select COUNT(DISTINCT id) AS sayi from sonuclar where spor_tipi='tenis'"));
$voleybolsayi = sed_sql_fetchassoc(sed_sql_query("select COUNT(DISTINCT id) AS sayi from sonuclar where spor_tipi='voleybol'"));
$buzhokeyisayi = sed_sql_fetchassoc(sed_sql_query("select COUNT(DISTINCT id) AS sayi from sonuclar where spor_tipi='buzhokeyi'"));
$hentbolsayi = sed_sql_fetchassoc(sed_sql_query("select COUNT(DISTINCT id) AS sayi from sonuclar where spor_tipi='hentbol'"));

?>

<div class="navitem arrow" onclick="getle('result?tip=1')"> <div class="icon"> <div class="sports soccer"></div> <span class="hidden c "></span> </div> <div class="text"><?=getTranslation('mobilsports5')?></div><div class="value"><div class="count normal "><?=$futbolsayi["sayi"];?></div></div></div>

<div class="navitem arrow" onclick="getle('result?tip=2')"> <div class="icon"> <div class="sports basketball"></div> <span class="hidden c "></span> </div> <div class="text"><?=getTranslation('mobilsports6')?></div><div class="value"><div class="count normal "><?=$basketbolsayi["sayi"];?></div></div></div>

<div class=" navitem arrow" onclick="getle('result?tip=3')"> <div class="icon"> <div class="sports tennis"></div> <span class="hidden c "></span> </div> <div class="text"><?=getTranslation('mobilsports7')?></div><div class="value"><div class="count normal "><?=$tenissayi["sayi"];?></div></div></div>

<div class=" navitem arrow" onclick="getle('result?tip=4')"> <div class="icon"> <div class="sports volleyball"></div> <span class="hidden c "></span> </div> <div class="text"><?=getTranslation('mobilsports8')?></div><div class="value"><div class="count normal "><?=$voleybolsayi["sayi"];?></div></div></div>

<div class=" navitem arrow" onclick="getle('result?tip=5')"> <div class="icon"> <div class="sports ice-hockey"></div> <span class="hidden c "></span> </div> <div class="text"><?=getTranslation('mobilsports9')?></div><div class="value"><div class="count normal "><?=$buzhokeyisayi["sayi"];?></div></div></div>

<div class=" navitem arrow" onclick="getle('result?tip=6')"> <div class="icon"> <div class="sports handball"></div> <span class="hidden c "></span> </div> <div class="text"><?=getTranslation('mobilsports10')?></div><div class="value"><div class="count normal "><?=$hentbolsayi["sayi"];?></div></div></div>

<div class="contentbottom hidden"> </div>
<div class="spacer">&nbsp;</div>

<? }

if($a=="result"){

$tip = gd("tip");

if($tip==1){

$sss = sed_sql_query("select ulke from sonuclar where spor_tipi='futbol' group by ulke");

while($row=sed_sql_fetchassoc($sss)) {

$ulkesayisi = sed_sql_fetchassoc(sed_sql_query("select COUNT(DISTINCT id) AS sayi from sonuclar where spor_tipi='futbol' and ulke='$row[ulke]'"));
?>

<div class="navitem arrow" onclick="getle('resultopen?tip=1&ulke=<?=$row['ulke'];?>')"> <div class="icon"> <div class="sports soccer"></div> <span class="hidden c "></span> </div> <div class="text"><?=$row['ulke'];?></div><div class="value"><div class="count normal "><?=$ulkesayisi["sayi"];?></div></div></div>

<? } ?>

<? } else if($tip==2){

$sss = sed_sql_query("select ulke from sonuclar where spor_tipi='basketbol' group by ulke");

while($row=sed_sql_fetchassoc($sss)) {

$ulkesayisi = sed_sql_fetchassoc(sed_sql_query("select COUNT(DISTINCT id) AS sayi from sonuclar where spor_tipi='basketbol' and ulke='$row[ulke]'"));
?>

<div class="navitem arrow" onclick="getle('resultopen?tip=2&ulke=<?=$row['ulke'];?>')"> <div class="icon"> <div class="sports basketball"></div> <span class="hidden c "></span> </div> <div class="text"><?=$row['ulke'];?></div><div class="value"><div class="count normal "><?=$ulkesayisi["sayi"];?></div></div></div>

<? } ?>

<? } else if($tip==3){

$sss = sed_sql_query("select ulke from sonuclar where spor_tipi='tenis' group by ulke");

while($row=sed_sql_fetchassoc($sss)) {

$ulkesayisi = sed_sql_fetchassoc(sed_sql_query("select COUNT(DISTINCT id) AS sayi from sonuclar where spor_tipi='tenis' and ulke='$row[ulke]'"));
?>

<div class=" navitem arrow" onclick="getle('resultopen?tip=3&ulke=<?=$row['ulke'];?>')"> <div class="icon"> <div class="sports tennis"></div> <span class="hidden c "></span> </div> <div class="text"><?=$row['ulke'];?></div><div class="value"><div class="count normal "><?=$ulkesayisi["sayi"];?></div></div></div>

<? } ?>

<? } else if($tip==4){

$sss = sed_sql_query("select ulke from sonuclar where spor_tipi='voleybol' group by ulke");

while($row=sed_sql_fetchassoc($sss)) {

$ulkesayisi = sed_sql_fetchassoc(sed_sql_query("select COUNT(DISTINCT id) AS sayi from sonuclar where spor_tipi='voleybol' and ulke='$row[ulke]'"));
?>

<div class=" navitem arrow" onclick="getle('resultopen?tip=4&ulke=<?=$row['ulke'];?>')"> <div class="icon"> <div class="sports volleyball"></div> <span class="hidden c "></span> </div> <div class="text"><?=$row['ulke'];?></div><div class="value"><div class="count normal "><?=$ulkesayisi["sayi"];?></div></div></div>

<? } ?>

<? } else if($tip==5){

$sss = sed_sql_query("select ulke from sonuclar where spor_tipi='buzhokeyi' group by ulke");

while($row=sed_sql_fetchassoc($sss)) {

$ulkesayisi = sed_sql_fetchassoc(sed_sql_query("select COUNT(DISTINCT id) AS sayi from sonuclar where spor_tipi='buzhokeyi' and ulke='$row[ulke]'"));
?>

<div class=" navitem arrow" onclick="getle('resultopen?tip=5&ulke=<?=$row['ulke'];?>')"> <div class="icon"> <div class="sports ice-hockey"></div> <span class="hidden c "></span> </div> <div class="text"><?=$row['ulke'];?></div><div class="value"><div class="count normal "><?=$ulkesayisi["sayi"];?></div></div></div>

<? } ?>

<? } else if($tip==6){

$sss = sed_sql_query("select ulke from sonuclar where spor_tipi='hentbol' group by ulke");

while($row=sed_sql_fetchassoc($sss)) {

$ulkesayisi = sed_sql_fetchassoc(sed_sql_query("select COUNT(DISTINCT id) AS sayi from sonuclar where spor_tipi='hentbol' and ulke='$row[ulke]'"));
?>

<div class=" navitem arrow" onclick="getle('resultopen?tip=6&ulke=<?=$row['ulke'];?>')"> <div class="icon"> <div class="sports handball"></div> <span class="hidden c "></span> </div> <div class="text"><?=$row['ulke'];?></div><div class="value"><div class="count normal "><?=$ulkesayisi["sayi"];?></div></div></div>

<? } ?>

<? } ?>

<div class="contentbottom hidden"> </div>
<div class="spacer">&nbsp;</div>

<? }

if($a=="resultopen"){

$tip = gd("tip");
$ulke = gd("ulke");

if(!empty($ulke)) { $ulke_ekle = "and ulke='$ulke'"; } else { $ulke_ekle = ""; }

if($tip==1){

$sss = sed_sql_query("select lig from sonuclar where spor_tipi='futbol' $ulke_ekle group by lig");

while($row=sed_sql_fetchassoc($sss)) {
?>

<div class="navtitle navsub ">
<div class="tlsubitem">
<div class="icon"><div class="sports_small soccer"></div> </div>
<div class="text"><?=$row['lig'];?></div>
</div>
</div>

<?
$sss2 = sed_sql_query("select * from sonuclar where spor_tipi='futbol' $ulke_ekle and lig='$row[lig]'");
while($row2=sed_sql_fetchassoc($sss2)) {
$iy_bol = explode('-',$row2['iy_sonuc']);
$ms_bol = explode('-',$row2['ms_sonuc']);

?>

<div class="odd  ">
<div class="event match">
<div class="hidden"><div colspan="11" class="c_comment"><div class="c_comment"></div><div class="c_pointer"></div></div></div>
<div class="event_wrapper">
<div class="datetime ">
<div class="sportsIcon "> <div class="icon"> <div class="sports soccer"></div> </div></div>
<div class="date small ">
<div> <?=$row2['mac_tarih'];?> </div>
<img src="./img/icons/live_rain.png" alt="" width="23" height="23" class="hidden">
<span class="hidden"> <img src="img/icon_blank.png" alt="" width="24" height="12"> </span>
</div>
</div>
<div class="teamrows">
<div class="teamrow">
<div class="team"> <?=$row2['ev_takim'];?>  </div>
<div class="score">
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class=""> <span class=""><?=$iy_bol[0];?></span></div>
<div class="bold"> <span class=""><?=$ms_bol[0];?></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
</div>
</div>
<div class="teamrow">
<div class="team"> <?=$row2['konuk_takim'];?>  </div>
<div class="score">
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class=" top"> <span class=""><?=$iy_bol[1];?></span></div>
<div class="bold top"> <span class=""><?=$ms_bol[1];?></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
</div>
</div>
</div>
<div class="hidden"> <div class="hidden">  </div></div>
<div class="hidden"></div>
<div class="placeholder "></div>
</div>
</div>
</div>

<? } ?>

<? } ?>

<? } else if($tip==2){

$sss = sed_sql_query("select lig from sonuclar where spor_tipi='basketbol' $ulke_ekle group by lig");

while($row=sed_sql_fetchassoc($sss)) {
?>

<div class="navtitle navsub ">
<div class="tlsubitem">
<div class="icon"><div class="sports_small soccer"></div> </div>
<div class="text"><?=$row['lig'];?></div>
</div>
</div>

<?
$sss2 = sed_sql_query("select * from sonuclar where spor_tipi='basketbol' $ulke_ekle and lig='$row[lig]'");
while($row2=sed_sql_fetchassoc($sss2)) {
$iy_bol = explode('-',$row2['iy_sonuc']);
$ms_bol = explode('-',$row2['ms_sonuc']);

?>

<div class="odd  ">
<div class="event match">
<div class="hidden"><div colspan="11" class="c_comment"><div class="c_comment"></div><div class="c_pointer"></div></div></div>
<div class="event_wrapper">
<div class="datetime ">
<div class="sportsIcon "> <div class="icon"> <div class="sports soccer"></div> </div></div>
<div class="date small ">
<div> <?=$row2['mac_tarih'];?> </div>
<img src="./img/icons/live_rain.png" alt="" width="23" height="23" class="hidden">
<span class="hidden"> <img src="img/icon_blank.png" alt="" width="24" height="12"> </span>
</div>
</div>
<div class="teamrows">
<div class="teamrow">
<div class="team"> <?=$row2['ev_takim'];?>  </div>
<div class="score">
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class=""> <span class=""><?=$iy_bol[0];?></span></div>
<div class="bold"> <span class=""><?=$ms_bol[0];?></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
</div>
</div>
<div class="teamrow">
<div class="team"> <?=$row2['konuk_takim'];?>  </div>
<div class="score">
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class=" top"> <span class=""><?=$iy_bol[1];?></span></div>
<div class="bold top"> <span class=""><?=$ms_bol[1];?></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
</div>
</div>
</div>
<div class="hidden"> <div class="hidden">  </div></div>
<div class="hidden"></div>
<div class="placeholder "></div>
</div>
</div>
</div>

<? } ?>

<? } ?>

<? } else if($tip==3){

$sss = sed_sql_query("select lig from sonuclar where spor_tipi='tenis' $ulke_ekle group by lig");

while($row=sed_sql_fetchassoc($sss)) {
?>

<div class="navtitle navsub ">
<div class="tlsubitem">
<div class="icon"><div class="sports_small soccer"></div> </div>
<div class="text"><?=$row['lig'];?></div>
</div>
</div>

<?
$sss2 = sed_sql_query("select * from sonuclar where spor_tipi='tenis' $ulke_ekle and lig='$row[lig]'");
while($row2=sed_sql_fetchassoc($sss2)) {
$ms_bol = explode('-',$row2['ms_sonuc']);

?>

<div class="odd  ">
<div class="event match">
<div class="hidden"><div colspan="11" class="c_comment"><div class="c_comment"></div><div class="c_pointer"></div></div></div>
<div class="event_wrapper">
<div class="datetime ">
<div class="sportsIcon "> <div class="icon"> <div class="sports soccer"></div> </div></div>
<div class="date small ">
<div> <?=$row2['mac_tarih'];?> </div>
<img src="./img/icons/live_rain.png" alt="" width="23" height="23" class="hidden">
<span class="hidden"> <img src="img/icon_blank.png" alt="" width="24" height="12"> </span>
</div>
</div>
<div class="teamrows">
<div class="teamrow">
<div class="team"> <?=$row2['ev_takim'];?>  </div>
<div class="score">
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="bold"> <span class=""><?=$ms_bol[0];?></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
</div>
</div>
<div class="teamrow">
<div class="team"> <?=$row2['konuk_takim'];?>  </div>
<div class="score">
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="bold top"> <span class=""><?=$ms_bol[1];?></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
</div>
</div>
</div>
<div class="hidden"> <div class="hidden">  </div></div>
<div class="hidden"></div>
<div class="placeholder "></div>
</div>
</div>
</div>

<? } ?>

<? } ?>

<? } else if($tip==4){

$sss = sed_sql_query("select lig from sonuclar where spor_tipi='voleybol' $ulke_ekle group by lig");

while($row=sed_sql_fetchassoc($sss)) {
?>

<div class="navtitle navsub ">
<div class="tlsubitem">
<div class="icon"><div class="sports_small soccer"></div> </div>
<div class="text"><?=$row['lig'];?></div>
</div>
</div>

<?
$sss2 = sed_sql_query("select * from sonuclar where spor_tipi='voleybol' $ulke_ekle and lig='$row[lig]'");
while($row2=sed_sql_fetchassoc($sss2)) {
$ms_bol = explode('-',$row2['ms_sonuc']);

?>

<div class="odd  ">
<div class="event match">
<div class="hidden"><div colspan="11" class="c_comment"><div class="c_comment"></div><div class="c_pointer"></div></div></div>
<div class="event_wrapper">
<div class="datetime ">
<div class="sportsIcon "> <div class="icon"> <div class="sports soccer"></div> </div></div>
<div class="date small ">
<div> <?=$row2['mac_tarih'];?> </div>
<img src="./img/icons/live_rain.png" alt="" width="23" height="23" class="hidden">
<span class="hidden"> <img src="img/icon_blank.png" alt="" width="24" height="12"> </span>
</div>
</div>
<div class="teamrows">
<div class="teamrow">
<div class="team"> <?=$row2['ev_takim'];?>  </div>
<div class="score">
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="bold"> <span class=""><?=$ms_bol[0];?></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
</div>
</div>
<div class="teamrow">
<div class="team"> <?=$row2['konuk_takim'];?>  </div>
<div class="score">
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="bold top"> <span class=""><?=$ms_bol[1];?></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
</div>
</div>
</div>
<div class="hidden"> <div class="hidden">  </div></div>
<div class="hidden"></div>
<div class="placeholder "></div>
</div>
</div>
</div>

<? } ?>

<? } ?>

<? } else if($tip==5){

$sss = sed_sql_query("select lig from sonuclar where spor_tipi='buzhokeyi' $ulke_ekle group by lig");

while($row=sed_sql_fetchassoc($sss)) {
?>

<div class="navtitle navsub ">
<div class="tlsubitem">
<div class="icon"><div class="sports_small soccer"></div> </div>
<div class="text"><?=$row['lig'];?></div>
</div>
</div>

<?
$sss2 = sed_sql_query("select * from sonuclar where spor_tipi='buzhokeyi' $ulke_ekle and lig='$row[lig]'");
while($row2=sed_sql_fetchassoc($sss2)) {
$ms_bol = explode('-',$row2['ms_sonuc']);

?>

<div class="odd  ">
<div class="event match">
<div class="hidden"><div colspan="11" class="c_comment"><div class="c_comment"></div><div class="c_pointer"></div></div></div>
<div class="event_wrapper">
<div class="datetime ">
<div class="sportsIcon "> <div class="icon"> <div class="sports soccer"></div> </div></div>
<div class="date small ">
<div> <?=$row2['mac_tarih'];?> </div>
<img src="./img/icons/live_rain.png" alt="" width="23" height="23" class="hidden">
<span class="hidden"> <img src="img/icon_blank.png" alt="" width="24" height="12"> </span>
</div>
</div>
<div class="teamrows">
<div class="teamrow">
<div class="team"> <?=$row2['ev_takim'];?>  </div>
<div class="score">
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="bold"> <span class=""><?=$ms_bol[0];?></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
</div>
</div>
<div class="teamrow">
<div class="team"> <?=$row2['konuk_takim'];?>  </div>
<div class="score">
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="bold top"> <span class=""><?=$ms_bol[1];?></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
</div>
</div>
</div>
<div class="hidden"> <div class="hidden">  </div></div>
<div class="hidden"></div>
<div class="placeholder "></div>
</div>
</div>
</div>

<? } ?>

<? } ?>

<? } else if($tip==6){

$sss = sed_sql_query("select lig from sonuclar where spor_tipi='hentbol' $ulke_ekle group by lig");

while($row=sed_sql_fetchassoc($sss)) {
?>

<div class="navtitle navsub ">
<div class="tlsubitem">
<div class="icon"><div class="sports_small soccer"></div> </div>
<div class="text"><?=$row['lig'];?></div>
</div>
</div>

<?
$sss2 = sed_sql_query("select * from sonuclar where spor_tipi='hentbol' $ulke_ekle and lig='$row[lig]'");
while($row2=sed_sql_fetchassoc($sss2)) {
$ms_bol = explode('-',$row2['ms_sonuc']);

?>

<div class="odd  ">
<div class="event match">
<div class="hidden"><div colspan="11" class="c_comment"><div class="c_comment"></div><div class="c_pointer"></div></div></div>
<div class="event_wrapper">
<div class="datetime ">
<div class="sportsIcon "> <div class="icon"> <div class="sports soccer"></div> </div></div>
<div class="date small ">
<div> <?=$row2['mac_tarih'];?> </div>
<img src="./img/icons/live_rain.png" alt="" width="23" height="23" class="hidden">
<span class="hidden"> <img src="img/icon_blank.png" alt="" width="24" height="12"> </span>
</div>
</div>
<div class="teamrows">
<div class="teamrow">
<div class="team"> <?=$row2['ev_takim'];?>  </div>
<div class="score">
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="bold"> <span class=""><?=$ms_bol[0];?></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
</div>
</div>
<div class="teamrow">
<div class="team"> <?=$row2['konuk_takim'];?>  </div>
<div class="score">
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="bold top"> <span class=""><?=$ms_bol[1];?></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
</div>
</div>
</div>
<div class="hidden"> <div class="hidden">  </div></div>
<div class="hidden"></div>
<div class="placeholder "></div>
</div>
</div>
</div>

<? } ?>

<? } ?>

<? } ?>

<? }

if($a=="kuponlarim") {

$kuponno = gd("kupon_no");

$tarih1 = basla_time(gd("tarih1"));

$tarih2 = bitir_time(gd("tarih2"));

$tarih1_ver = gd("tarih1");
$tarih2_ver = gd("tarih2");

$durum = gd("durum");

if(!empty($kuponno)) { $kupon_ekle = "and id='$kuponno'"; } else { $kupon_ekle = ""; }

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

$sqladder = "and casino='0' and user_id='$ub[id]' and kupon_time between '$tarih1' and '$tarih2' $kupon_ekle $durum_ekle and hesap_kesim_zaman='' order by CAST(id AS UNSIGNED) DESC limit 50";

$sor = sed_sql_query("select * from kuponlar where id!='' $sqladder");


$toplams_kupon = bilgi("SELECT COUNT(CASE WHEN id!='' THEN id END) as toplam_kupon FROM kuponlar WHERE id!='' $sqladder");

if(sed_sql_numrows($sor)<1) { echo "<div class='nokuponda' style='font-weight: bold;text-align: center;padding: 5px;'>".getTranslation('exportkuponbulunmadi')."</div>"; } else {

?>

<div class="navtitle navsub delete">
<div class="tlsubitem">
<div class="hidden"> </div>
<div class="text"><?=n($toplams_kupon['toplam_kupon']); ?> <?=getTranslation('yeniyerler_kasa379')?> <?if(n($toplams_kupon['toplam_kupon'])>49){ ?>50<? } else { ?><?=n($toplams_kupon['toplam_kupon']); ?><? } ?> | <?=$tarih1_ver;?> - <?=$tarih2_ver;?> <?=getTranslation('yeniyerler_kasa380')?></div>
<div class="text hidden"><div class="deleteOldTickets" onclick="deleteOldTickets()"><?=getTranslation('playersduyurular11')?></div></div>
<div class="text center hidden">
<div class="depositWithdrawalFilter "></div>
</div>
<div class="text hidden"><div class="downloadPage"></div></div>
</div>
</div>

<?
while($row=sed_sql_fetcharray($sor)) { 
?>

<div onclick="kupongoruntule('<?=$row['id']; ?>');" class="tlitem arrow_blk_down">
<div class="hidden">
<button id="cashoutButton53732" class="" onclick="cashoutTicket(53732)">
<div class="inner">
<div class="filling ">
<div class="text"><span><?=$row['id']; ?></span>  </div>
</div>
</div>
</button>
</div>
<div class="ticketstatusWrapper">
<div class="ticketstatus <? if($row['durum']==1){ ?>WAIT<? } else if($row['durum']==2){ ?>PAID_OUT<? } else if($row['durum']==3){ ?>LOST<? } else if($row['durum']==4){ ?>DELIVERED<? } ?>"></div>
<div class="tlsubitemColumn">
<div class="text"><?=durumnedir($row['durum']); ?></div>
<div class="text"><?=date("d-m H:i",$row['kupon_time']); ?></div>
</div>
<div class="tlsubitemColumn">
<div class="value"><? if($row['toplam_mac']=="1") { echo "".getTranslation('superadmin47').""; } else if($row['toplam_mac']=="2") { echo "".getTranslation('superadmin48').""; } else if($row['toplam_mac']=="3") { echo "".getTranslation('superadmin49').""; } else if($row['toplam_mac']>3) { echo "".getTranslation('superadmin50').""; } ?> <?=nf($row['yatan']); ?> TL</div>
<div class="value"><?=getTranslation('mobilbettingglossary26')?>: <?=nf($row['tutar']); ?> TL</div>
</div>
</div>
</div>


<? if($row['canli']=="3"){ ?>
<div class="ticketListBetDetails arrow hidden" id="cpdiv_<?=$row['id']; ?>">
<?
$sor2 = sed_sql_query("select * from kupon_ic_sanal where kupon_id='$row[id]'");
while($row2=sed_sql_fetcharray($sor2)) {

if($row2['spor_tip']=="vhc_v2" || $row2['spor_tip']=="vdr_v2"){
	$sonuc_versene2 = "Sonuçlandı";
} else {
	$sonuc_versene2 = "(".$row2['iy_ev']." - ".$row2['iy_dep'].") ".$row2['ms_ev']." - ".$row2['ms_dep']."";
}

?>

<div class="ticketitem even  betslipImage">
<div class="label date" id="evdate_<?=$row2['id']; ?>"><?=date("d-m H:i",$row2['mac_time']);?></div>
<div class="text">
<div class="bank hidden">Banko</div>
<span><?=$row2['ev_takim']; ?> - <?=$row2['konuk_takim']; ?></span>
<span class="hidden">  </span>
<br>
<span class="normal"></span>
</div>
<div class="value" id="scr_<?=$row2['id']; ?>"><? if($row2['kazanma']!="1"){ ?><?=$sonuc_versene2;?><? } else { ?><? } ?></div>
</div>
<div class="ticketsubitem even  betslipImage">
<div class="label" id="kid_<?=$row2['id']; ?>_scr_<?=$row2['id']; ?>"> <i <? if($row2['kazanma']!="1") { ?>class="hidden"<? } ?>><img style="margin-top: -2px;" src="assets/img/cpnwaiting.png"></i> </div>
<div class="text <? if($row2['kazanma']=="1") { ?>PAYBACK<? } else if($row2['kazanma']=="2") { ?>WON<? } else if($row2['kazanma']=="3") { ?>LOST<? } else if($row2['kazanma']=="4") { ?>CANCELED<? } ?>"><?=$row2['oran_tip'];?> <?=$row2['oran_val'];?></div>
<div class="value <? if($row2['kazanma']=="1") { ?>PAYBACK<? } else if($row2['kazanma']=="2") { ?>WON<? } else if($row2['kazanma']=="3") { ?>LOST<? } else if($row2['kazanma']=="4") { ?>CANCELED<? } ?>"><? $oranes = nf($row2['oran']); echo $oranes; ?></div>
</div>

<? } ?>

<div class="clear barfinish even "></div>
</div>

<? } else { ?>
<div class="ticketListBetDetails arrow hidden" id="cpdiv_<?=$row['id']; ?>" onclick="kuponicigoruntule('<?=$row['id']; ?>');">
<?
$sor2 = sed_sql_query("select * from kupon_ic where kupon_id='$row[id]'");
while($row2=sed_sql_fetcharray($sor2)) {

if($row2['spor_tip']=="canli") {

$zaman = date("d-m-Y H:i",$row2['mac_time']);	

$infobol = explode("|",$row2['canli_info']);

$canlizaman = "$infobol[0] <strong>($infobol[1])</strong>";

$canlibilgi = sed_sql_query("select * from canli_maclar where id='$row2[mac_db_id]' and devre!='Bitti'");

if(sed_sql_numrows($canlibilgi)>0) {

$bilgisi = sed_sql_fetcharray($canlibilgi);	

$iy = "$bilgisi[iy_ev]-$bilgisi[iy_konuk]";

$iy2 = "$bilgisi[iy_ev]-$bilgisi[iy_konuk]";

$ms = "$bilgisi[ev_skor]-$bilgisi[konuk_skor]";

$ms2 = "$bilgisi[ev_skor]-$bilgisi[konuk_skor]";

if($bilgisi['devre']=="İlk Yarı"){
	$sonuc_versene = "( ".$iy." )";
} else {
	$sonuc_versene = "".$ms2." ( ".$iy." )";
}

$farki = time()-75;

if($bilgisi['songuncelleme']<$farki) {

$macsonucu = ""; 
$iys = "$bilgisi[iy_ev]-$bilgisi[iy_konuk]";
$mss = "$bilgisi[ev_skor]-$bilgisi[konuk_skor]";
} else if($bilgisi['devremi']=="1") {

$macsonucu = "";

} else if($bilgisi['gelecek']=="1") {

$macsonucu = "";

} else {

$macsonucu = "".getTranslation('ajaxkupond11')." <strong>$bilgisi[dakika]".getTranslation('canlidkicin')."</strong>";

}

} else { 

$sonuc_versene = "".$row2['ms']." ( ".$row2['iy']." )";

$macsonucu = "";

}

$canlimi = '<td style="text-align:center;" class="itext-1">'.getTranslation('ajaxkupond12').'</td>';

} else if($row2['spor_tip']=="canlib") {

$zaman = date("d-m-Y H:i",$row2['mac_time']);	

$infobol = explode("|",$row2['canli_info']);

$canlizaman = "$infobol[0] <strong>($infobol[1])</strong>";

$canlibilgi = sed_sql_query("select * from basketbol_canli_maclar where id='$row2[mac_db_id]'");

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


$farki = time()-30;

if($bilgisi['songuncelleme']<$farki) { $macsonucu = ""; } else 
if($bilgisi['devremi']=="1") { $macsonucu = ""; } else 
if($bilgisi['gelecek']=="1") { $macsonucu = ""; } else 
{ $macsonucu = "".getTranslation('ajaxkupond16').": <strong>".$bilgisi['period']."</strong>"; }

} else { 

$sonuc_versene = "".$row2['iy']." / ".$row2['ms']." <img onclick='openlivedetails(".$row2['id'].");' style='width: 16px;' src='/players/img/arrowdown.png'>";

$macsonucu = "";

}

$canlimi = '<td style="text-align:center;" class="itext-1">'.getTranslation('ajaxkupond12').'</td>';

} else if($row2['spor_tip']=="canlit") {

$zaman = date("d-m-Y H:i",$row2['mac_time']);	

$infobol = explode("|",$row2['canli_info']);

$canlizaman = "$infobol[0] <strong>($infobol[1])</strong>";

$canlibilgi = sed_sql_query("select * from canli_maclar_tenis where id='$row2[mac_db_id]'");

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


$farki = time()-30;

if($bilgisi['songuncelleme']<$farki) { $macsonucu = ""; } else 
if($bilgisi['devremi']=="1") { $macsonucu = ""; } else 
if($bilgisi['gelecek']=="1") { $macsonucu = ""; } else 
{ $macsonucu = "".getTranslation('ajaxkupond16').": <strong>".$bilgisi['period']."</strong>"; }

} else { 

$sonuc_versene = "".$row2['ms']." <img onclick='openlivedetails(".$row2['id'].");' style='width: 16px;' src='/players/img/arrowdown.png'>";

$macsonucu = "";

}

$canlimi = '<td style="text-align:center;" class="itext-1">'.getTranslation('ajaxkupond12').'</td>';

} else if($row2['spor_tip']=="canliv") {

$zaman = date("d-m-Y H:i",$row2['mac_time']);	

$infobol = explode("|",$row2['canli_info']);

$canlizaman = "$infobol[0] <strong>($infobol[1])</strong>";

$canlibilgi = sed_sql_query("select * from canli_maclar_voleybol where id='$row2[mac_db_id]'");

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


$farki = time()-30;

if($bilgisi['songuncelleme']<$farki) { $macsonucu = ""; } else 
if($bilgisi['devremi']=="1") { $macsonucu = ""; } else 
if($bilgisi['gelecek']=="1") { $macsonucu = ""; } else 
{ $macsonucu = "".getTranslation('ajaxkupond16').": <strong>".$bilgisi['period']."</strong>"; }

} else { 

$sonuc_versene = "".$row2['ms']." <img onclick='openlivedetails(".$row2['id'].");' style='width: 16px;' src='/players/img/arrowdown.png'>";

$macsonucu = "";

}

$canlimi = '<td style="text-align:center;" class="itext-1">'.getTranslation('ajaxkupond12').'</td>';

} else if($row2['spor_tip']=="canlibuz") {

$zaman = date("d-m-Y H:i",$row2['mac_time']);	

$infobol = explode("|",$row2['canli_info']);

$canlizaman = "$infobol[0] <strong>($infobol[1])</strong>";

$canlibilgi = sed_sql_query("select * from canli_maclar_buzhokeyi where id='$row2[mac_db_id]'");

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


$farki = time()-30;

if($bilgisi['songuncelleme']<$farki) { $macsonucu = ""; } else 
if($bilgisi['devremi']=="1") { $macsonucu = ""; } else 
if($bilgisi['gelecek']=="1") { $macsonucu = ""; } else 
{ $macsonucu = "".getTranslation('ajaxkupond16').": <strong>".$bilgisi['period']."</strong>"; }

} else { 

$sonuc_versene = "".$row2['ms']."";

$macsonucu = "";

}

$canlimi = '<td style="text-align:center;" class="itext-1">'.getTranslation('ajaxkupond12').'</td>';

} else {

if($row2['mac_time']<time()) { $macsonucu = ""; } else if($row2['ertelendi']=="1") { $macsonucu = ""; } else { $macsonucu = ""; }

if($row2['spor_tip']=="sanal") { 
$zaman = date("d-m-Y H:i:s",strtotime($row2['mac_time']));	
}else
{
	$zaman = date("d-m-Y H:i",$row2['mac_time']);
}

if($row2['spor_tip']=="tenis" || $row2['spor_tip']=="voleybol" || $row2['spor_tip']=="buzhokeyi"){
$sonuc_versene = "".$row2['ms']."";
} else {
$sonuc_versene = "".$row2['iy']." / ".$row2['ms']."";
}

$canlimi = '<td style="text-align:center;" class="itext-2">'.getTranslation('ajaxkupond17').'</td>';

$canlizaman = "-";

}

$ob = explode("|",$row2['oran_tip']);

$secim_yapimi_kuponguncelle = $ob[0];
$secim_yapimi_kuponguncelle2 = $ob[1];

if($row2['spor_tip']=="futbol") {

if($secim_yapimi_kuponguncelle=="1X2"){
	$secilen_translate = getTranslation('futboloran1');
} else if($secim_yapimi_kuponguncelle=="Handikap (0:1)"){
	$secilen_translate = getTranslation('futboloran2');
} else if($secim_yapimi_kuponguncelle=="Handikap (1:0)"){
	$secilen_translate = getTranslation('futboloran3');
} else if($secim_yapimi_kuponguncelle=="Handikap (0:2)"){
	$secilen_translate = getTranslation('futboloran4');
} else if($secim_yapimi_kuponguncelle=="Handikap (2:0)"){
	$secilen_translate = getTranslation('futboloran5');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 1.YARI )"){
	$secilen_translate = getTranslation('futboloran6');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 2.YARI )"){
	$secilen_translate = getTranslation('futboloran7');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Çifte Şans"){
	$secilen_translate = getTranslation('futboloran8');
} else if($secim_yapimi_kuponguncelle=="1.YARI KG"){
	$secilen_translate = getTranslation('futboloran9');
} else if($secim_yapimi_kuponguncelle=="Beraberlikte İade"){
	$secilen_translate = getTranslation('futboloran10');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 0.5"){
	$secilen_translate = getTranslation('futboloran11');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 1.5"){
	$secilen_translate = getTranslation('futboloran12');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 2.5"){
	$secilen_translate = getTranslation('futboloran13');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 3.5"){
	$secilen_translate = getTranslation('futboloran14');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 4.5"){
	$secilen_translate = getTranslation('futboloran15');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 5.5"){
	$secilen_translate = getTranslation('futboloran16');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 0.5"){
	$secilen_translate = getTranslation('futboloran18');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 1.5"){
	$secilen_translate = getTranslation('futboloran19');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 2.5"){
	$secilen_translate = getTranslation('futboloran20');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 3.5"){
	$secilen_translate = getTranslation('futboloran21');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 0.5"){
	$secilen_translate = getTranslation('futboloran22');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 1.5"){
	$secilen_translate = getTranslation('futboloran23');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 2.5"){
	$secilen_translate = getTranslation('futboloran24');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 3.5"){
	$secilen_translate = getTranslation('futboloran25');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Gol Atarmı ?"){
	$secilen_translate = getTranslation('futboloran26');
} else if($secim_yapimi_kuponguncelle=="Deplasman Gol Atarmı ?"){
	$secilen_translate = getTranslation('futboloran27');
} else if($secim_yapimi_kuponguncelle=="Karşılıklı Gol"){
	$secilen_translate = getTranslation('futboloran28');
} else if($secim_yapimi_kuponguncelle=="​​​​​​​​​​1.Yarı Tek/Çift"){
	$secilen_translate = getTranslation('futboloran29');
} else if($secim_yapimi_kuponguncelle=="Tek/Çift"){
	$secilen_translate = getTranslation('futboloran30');
} else if($secim_yapimi_kuponguncelle=="Evsahibi Kaç Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran31');
} else if($secim_yapimi_kuponguncelle=="Deplasman Kaç Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran32');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı Kaç Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran33');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 2.Yarı Kaç Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran34');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı Kaç Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran35');
} else if($secim_yapimi_kuponguncelle=="Deplasman 2.Yarı Kaç Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran36');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı A/Ü 0.5"){
	$secilen_translate = getTranslation('futboloran37');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı A/Ü 1.5"){
	$secilen_translate = getTranslation('futboloran38');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı A/Ü 0.5"){
	$secilen_translate = getTranslation('futboloran39');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı A/Ü 1.5"){
	$secilen_translate = getTranslation('futboloran40');
} else if($secim_yapimi_kuponguncelle=="Evsahibi A/Ü 1.5"){
	$secilen_translate = getTranslation('futboloran41');
} else if($secim_yapimi_kuponguncelle=="Deplasman A/Ü 1.5"){
	$secilen_translate = getTranslation('futboloran42');
} else if($secim_yapimi_kuponguncelle=="​​​​​Evsahibi Her 2 yarıda Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran43');
} else if($secim_yapimi_kuponguncelle=="Deplasman Her 2 yarıda Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran44');
} else if($secim_yapimi_kuponguncelle=="Hangi Devrede Fazla Gol Olur"){
	$secilen_translate = getTranslation('futboloran45');
} else if($secim_yapimi_kuponguncelle=="Evsahibi Hangi Devrede Fazla Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran46');
} else if($secim_yapimi_kuponguncelle=="Deplasman Hangi Devrede Fazla Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran47');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-4+)"){
	$secilen_translate = getTranslation('futboloran48');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-5+)"){
	$secilen_translate = getTranslation('futboloran49');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-6+)"){
	$secilen_translate = getTranslation('futboloran50');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 1 gol farkla kazanır mı?"){
	$secilen_translate = getTranslation('futboloran51');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 2 gol farkla kazanır mı?"){
	$secilen_translate = getTranslation('futboloran52');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 3 gol farkla kazanır mı?"){
	$secilen_translate = getTranslation('futboloran53');
} else if($secim_yapimi_kuponguncelle=="1X2 ve toplam gol sayısı 2.5"){
	$secilen_translate = getTranslation('futboloran54');
} else if($secim_yapimi_kuponguncelle=="Maç sonucu ve karşılıklı goller"){
	$secilen_translate = getTranslation('futboloran55');
} else if($secim_yapimi_kuponguncelle=="İlk Yarı / Maç Sonucu"){
	$secilen_translate = getTranslation('futboloran56');
} else if($secim_yapimi_kuponguncelle=="Skor Bahsi (90 Dakika)"){
	$secilen_translate = getTranslation('futboloran57');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
	$secilen_translate = getTranslation('futboloran58');
} else if($secim_yapimi_kuponguncelle=="Toplam Sari Kart Alt/Üst 3.5"){
	$secilen_translate = getTranslation('futboloran59');
} else if($secim_yapimi_kuponguncelle=="Kirmizi kart cikar mi?"){
	$secilen_translate = getTranslation('futboloran60');
} else if($secim_yapimi_kuponguncelle=="Macta kac tane penalti olur?"){
	$secilen_translate = getTranslation('futboloran61');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 1.5"){
	$secilen_translate = getTranslation('futboloran62');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 2.5"){
	$secilen_translate = getTranslation('futboloran63');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 3.5"){
	$secilen_translate = getTranslation('futboloran64');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 1.5"){
	$secilen_translate = getTranslation('futboloran65');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 2.5"){
	$secilen_translate = getTranslation('futboloran66');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 3.5"){
	$secilen_translate = getTranslation('futboloran67');
} else if($secim_yapimi_kuponguncelle=="Sarı Kart Toplam Tek/Çift"){
	$secilen_translate = getTranslation('futboloran68');
} else if($secim_yapimi_kuponguncelle=="Hangi Takım Çok Sarı Kart Yer ?"){
	$secilen_translate = getTranslation('futboloran69');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 5.5"){
	$secilen_translate = getTranslation('futboloran70');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 6.5"){
	$secilen_translate = getTranslation('futboloran71');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 7.5"){
	$secilen_translate = getTranslation('futboloran72');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 8.5"){
	$secilen_translate = getTranslation('futboloran73');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 9.5"){
	$secilen_translate = getTranslation('futboloran74');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 10.5"){
	$secilen_translate = getTranslation('futboloran75');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 11.5"){
	$secilen_translate = getTranslation('futboloran76');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 12.5"){
	$secilen_translate = getTranslation('futboloran77');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 13.5"){
	$secilen_translate = getTranslation('futboloran78');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 14.5"){
	$secilen_translate = getTranslation('futboloran79');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 15.5"){
	$secilen_translate = getTranslation('futboloran80');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 2.5"){
	$secilen_translate = getTranslation('futboloran81');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 3.5"){
	$secilen_translate = getTranslation('futboloran82');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 4.5"){
	$secilen_translate = getTranslation('futboloran83');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 5.5"){
	$secilen_translate = getTranslation('futboloran84');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 6.5"){
	$secilen_translate = getTranslation('futboloran85');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 7.5"){
	$secilen_translate = getTranslation('futboloran86');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 8.5"){
	$secilen_translate = getTranslation('futboloran87');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 9.5"){
	$secilen_translate = getTranslation('futboloran88');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 10.5"){
	$secilen_translate = getTranslation('futboloran89');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 2.5"){
	$secilen_translate = getTranslation('futboloran90');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 3.5"){
	$secilen_translate = getTranslation('futboloran91');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 4.5"){
	$secilen_translate = getTranslation('futboloran92');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 5.5"){
	$secilen_translate = getTranslation('futboloran93');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 6.5"){
	$secilen_translate = getTranslation('futboloran94');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 7.5"){
	$secilen_translate = getTranslation('futboloran95');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 8.5"){
	$secilen_translate = getTranslation('futboloran96');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 9.5"){
	$secilen_translate = getTranslation('futboloran97');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 10.5"){
	$secilen_translate = getTranslation('futboloran98');
} else if($secim_yapimi_kuponguncelle=="Korner Toplam Tek/Çift"){
	$secilen_translate = getTranslation('futboloran99');
} else if($secim_yapimi_kuponguncelle=="Hangi Takım Çok Korner Kullanır ?"){
	$secilen_translate = getTranslation('futboloran100');
} else if($secim_yapimi_kuponguncelle=="1X2 ve toplam gol sayısı 3.5"){
	$secilen_translate = getTranslation('futboloran101');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

} else if($row2['spor_tip']=="basketbol") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ? (Uz. Dahil)"){
	$secilen_translate = getTranslation('basketboloran1');
} else if($secim_yapimi_kuponguncelle=="1X2 (Uz. Hariç)"){
	$secilen_translate = getTranslation('basketboloran2');
} else if($secim_yapimi_kuponguncelle== "1X2 ( 1.YARI )"){
	$secilen_translate = getTranslation('basketboloran3');
} else if($secim_yapimi_kuponguncelle== "Toplam Skor Tek/Çift"){
	$secilen_translate = getTranslation('basketboloran4');
} else if($secim_yapimi_kuponguncelle== "Toplam Skor Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran5');
} else if($secim_yapimi_kuponguncelle== "Handikap ( 1.YARI )"){
	$secilen_translate = getTranslation('basketboloran6');
} else if($secim_yapimi_kuponguncelle== "Handikap"){
	$secilen_translate = getTranslation('basketboloran7');
} else if($secim_yapimi_kuponguncelle== "1.Yarı / MS"){
	$secilen_translate = getTranslation('basketboloran8');
} else if($secim_yapimi_kuponguncelle== "İki Devrede Kazanır"){
	$secilen_translate = getTranslation('basketboloran9');
} else if($secim_yapimi_kuponguncelle== "Tüm Periyotları Kazanır"){
	$secilen_translate = getTranslation('basketboloran10');
} else if($secim_yapimi_kuponguncelle== "1.Takım İY Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran11');
} else if($secim_yapimi_kuponguncelle== "2.Takım İY Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran12');
} else if($secim_yapimi_kuponguncelle== "1.Takım Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran13');
} else if($secim_yapimi_kuponguncelle== "2.Takım Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran14');
} else if($secim_yapimi_kuponguncelle== "1.Takım 1.Çeyrek Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran15');
} else if($secim_yapimi_kuponguncelle== "2.Takım 1.Çeyrek Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran16');
} else if($secim_yapimi_kuponguncelle== "1.Çeyrek Kim Kazanır"){
	$secilen_translate = getTranslation('basketboloran17');
} else if($secim_yapimi_kuponguncelle== "1.Çeyrek Toplam Tek/Çift"){
	$secilen_translate = getTranslation('basketboloran18');
} else if($secim_yapimi_kuponguncelle== "1.Yarı Toplam Tek/Çift"){
	$secilen_translate = getTranslation('basketboloran19');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

}  else if($row2['spor_tip']=="tenis") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ?"){
	$secilen_translate = getTranslation('tenisoran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahsi"){
	$secilen_translate = getTranslation('tenisoran2');
} else if($secim_yapimi_kuponguncelle=="1.Seti Kim Kazanır ?"){
	$secilen_translate = getTranslation('tenisoran3');
} else if($secim_yapimi_kuponguncelle=="2.Seti Kim Kazanır ?"){
	$secilen_translate = getTranslation('tenisoran4');
} else if($secim_yapimi_kuponguncelle=="1.Oyuncu 1 Set Kazanır"){
	$secilen_translate = getTranslation('tenisoran5');
} else if($secim_yapimi_kuponguncelle=="2.Oyuncu 1 Set Kazanır"){
	$secilen_translate = getTranslation('tenisoran6');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

} else if($row2['spor_tip']=="voleybol") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ?"){
	$secilen_translate = getTranslation('voleyboloran1');
} else if($secim_yapimi_kuponguncelle=="Set bahisi"){
	$secilen_translate = getTranslation('voleyboloran2');
} else if($secim_yapimi_kuponguncelle=="Toplam Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran3');
} else if($secim_yapimi_kuponguncelle=="5 Set Sürermi ?"){
	$secilen_translate = getTranslation('voleyboloran4');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

} else if($row2['spor_tip']=="buzhokeyi") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
	$secilen_translate = getTranslation('buzhokeyioran1');
} else if($secim_yapimi_kuponguncelle=="1X2"){
	$secilen_translate = getTranslation('buzhokeyioran2');
} else if($secim_yapimi_kuponguncelle=="1.P 1X2"){
	$secilen_translate = getTranslation('buzhokeyioran3');
} else if($secim_yapimi_kuponguncelle=="2.P 1X2"){
	$secilen_translate = getTranslation('buzhokeyioran4');
} else if($secim_yapimi_kuponguncelle=="3.P 1X2"){
	$secilen_translate = getTranslation('buzhokeyioran5');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
	$secilen_translate = getTranslation('buzhokeyioran6');
} else if($secim_yapimi_kuponguncelle=="1.P Çifte Şans"){
	$secilen_translate = getTranslation('buzhokeyioran7');
} else if($secim_yapimi_kuponguncelle=="2.P Çifte Şans"){
	$secilen_translate = getTranslation('buzhokeyioran8');
} else if($secim_yapimi_kuponguncelle=="3.P Çifte Şans"){
	$secilen_translate = getTranslation('buzhokeyioran9');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

} else if($row2['spor_tip']=="masatenisi") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
	$secilen_translate = getTranslation('masatenisioran1');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

} else if($row2['spor_tip']=="rugby") {

if($secim_yapimi_kuponguncelle=="1X2"){
	$secilen_translate = getTranslation('rugbyoran1');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

} else if($row2['spor_tip']=="beyzbol") {

$secilen_translate = $secim_yapimi_kuponguncelle;

} else if($row2['spor_tip']=="dovus") {

$secilen_translate = $secim_yapimi_kuponguncelle;

} else if($row2['spor_tip']=="canli") {

if($secim_yapimi_kuponguncelle=="1X2"){
	$secilen_translate = getTranslation('futboloran1');
} else if($secim_yapimi_kuponguncelle=="Handikap 0:1"){
	$secilen_translate = getTranslation('futboloran2');
} else if($secim_yapimi_kuponguncelle=="Handikap 1:0"){
	$secilen_translate = getTranslation('futboloran3');
} else if($secim_yapimi_kuponguncelle=="Handikap 0:2"){
	$secilen_translate = getTranslation('futboloran4');
} else if($secim_yapimi_kuponguncelle=="Handikap 2:0"){
	$secilen_translate = getTranslation('futboloran5');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Sonucu"){
	$secilen_translate = getTranslation('futboloran6');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Sonucu"){
	$secilen_translate = getTranslation('futboloran7');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Çifte Şans"){
	$secilen_translate = getTranslation('futboloran8');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Karşılıklı Gol"){
	$secilen_translate = getTranslation('futboloran9');
} else if($secim_yapimi_kuponguncelle=="Beraberlikte İade"){
	$secilen_translate = getTranslation('futboloran10');
} else if($secim_yapimi_kuponguncelle=="Toplam 0.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran11');
} else if($secim_yapimi_kuponguncelle=="Toplam 1.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran12');
} else if($secim_yapimi_kuponguncelle=="Toplam 2.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran13');
} else if($secim_yapimi_kuponguncelle=="Toplam 3.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran14');
} else if($secim_yapimi_kuponguncelle=="Toplam 4.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran15');
} else if($secim_yapimi_kuponguncelle=="Toplam 5.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran16');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 0.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran18');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 1.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran19');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 2.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran20');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol 3.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran21');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 0.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran22');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 1.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran23');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 2.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran24');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 3.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran25');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Müsabakada Gol Atarmı ?"){
	$secilen_translate = getTranslation('futboloran26');
} else if($secim_yapimi_kuponguncelle=="Deplasman Müsabakada Gol Atarmı ?"){
	$secilen_translate = getTranslation('futboloran27');
} else if($secim_yapimi_kuponguncelle=="Karşılıklı Gol Olurmu ?"){
	$secilen_translate = getTranslation('futboloran28');
} else if($secim_yapimi_kuponguncelle=="​​​​​1.Yarı Tek / Çift"){
	$secilen_translate = getTranslation('futboloran29');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Tek / Çift"){
	$secilen_translate = getTranslation('futboloran30');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Toplam Kaç Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran31');
} else if($secim_yapimi_kuponguncelle=="Deplasman Toplam Kaç Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran32');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi İlk Yarı Tam Gol Sayısı"){
	$secilen_translate = getTranslation('futboloran33');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi İkinci Yarı Tam Gol Sayısı"){
	$secilen_translate = getTranslation('futboloran34');
} else if($secim_yapimi_kuponguncelle=="Deplasman İlk Yarı Tam Gol Sayısı"){
	$secilen_translate = getTranslation('futboloran35');
} else if($secim_yapimi_kuponguncelle=="Deplasman İkinci Yarı Tam Gol Sayısı"){
	$secilen_translate = getTranslation('futboloran36');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 0.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran37');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 1.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran38');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 0.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran39');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 1.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran40');
} else if($secim_yapimi_kuponguncelle=="Evsahibi Toplam 1.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran41');
} else if($secim_yapimi_kuponguncelle=="Deplasman Toplam 1.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran42');
} else if($secim_yapimi_kuponguncelle=="​​​​​Evsahibi Her 2 yarıda Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran43');
} else if($secim_yapimi_kuponguncelle=="Deplasman Her 2 yarıda Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran44');
} else if($secim_yapimi_kuponguncelle=="Hangi Devrede Fazla Gol Olur"){
	$secilen_translate = getTranslation('futboloran45');
} else if($secim_yapimi_kuponguncelle=="Evsahibi Hangi Devrede Fazla Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran46');
} else if($secim_yapimi_kuponguncelle=="Deplasman Hangi Devrede Fazla Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran47');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-4)"){
	$secilen_translate = getTranslation('futboloran48');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-5)"){
	$secilen_translate = getTranslation('futboloran49');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-6)"){
	$secilen_translate = getTranslation('futboloran50');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 1 Gol Farkla Kazanirmi ?"){
	$secilen_translate = getTranslation('futboloran51');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 2 Gol Farkla Kazanirmi ?"){
	$secilen_translate = getTranslation('futboloran52');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 3 Gol Farkla Kazanirmi ?"){
	$secilen_translate = getTranslation('futboloran53');
} else if($secim_yapimi_kuponguncelle=="Maç Sonucu ve 2.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran54');
} else if($secim_yapimi_kuponguncelle=="Maç Sonucu ve Karşılıklı Gol"){
	$secilen_translate = getTranslation('futboloran55');
} else if($secim_yapimi_kuponguncelle=="İlk Yarı / Maç Sonucu"){
	$secilen_translate = getTranslation('futboloran56');
} else if($secim_yapimi_kuponguncelle=="Maç Skoru"){
	$secilen_translate = getTranslation('futboloran57');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
	$secilen_translate = getTranslation('futboloran58');
} else if($secim_yapimi_kuponguncelle=="Toplam Sarı Kart 3.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran59');
} else if($secim_yapimi_kuponguncelle=="Kırmızı Kart Çıkar mı?"){
	$secilen_translate = getTranslation('futboloran60');
} else if($secim_yapimi_kuponguncelle=="Maçta Kaç Tane Penaltı Olur ?"){
	$secilen_translate = getTranslation('futboloran61');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart 1.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran62');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart 2.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran63');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart 3.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran64');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart 1.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran65');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart 2.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran66');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart 3.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran67');
} else if($secim_yapimi_kuponguncelle=="Sarı Kart Toplam Tek/Çift"){
	$secilen_translate = getTranslation('futboloran68');
} else if($secim_yapimi_kuponguncelle=="Hangi Takım Çok Sarı Kart Yer ?"){
	$secilen_translate = getTranslation('futboloran69');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner 5.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran70');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner 6.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran71');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner 7.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran72');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner 8.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran73');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner 9.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran74');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner 10.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran75');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner 11.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran76');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner 12.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran77');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner 13.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran78');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner 14.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran79');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner 15.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran80');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 2.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran81');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 3.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran82');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 4.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran83');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 5.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran84');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 6.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran85');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 7.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran86');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 8.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran87');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 9.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran88');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 10.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran89');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 2.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran90');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 3.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran91');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 4.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran92');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 5.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran93');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 6.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran94');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 7.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran95');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 8.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran96');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 9.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran97');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 10.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran98');
} else if($secim_yapimi_kuponguncelle=="Korner Tek/Çift"){
	$secilen_translate = getTranslation('futboloran99');
} else if($secim_yapimi_kuponguncelle=="Hangi Takım Çok Korner Kullanır ?"){
	$secilen_translate = getTranslation('futboloran100');
} else if($secim_yapimi_kuponguncelle=="Maç Sonucu ve 3.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran101');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 0.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran102');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran103');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 2.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran104');
} else if($secim_yapimi_kuponguncelle=="Deplasman 0.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran105');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran106');
} else if($secim_yapimi_kuponguncelle=="Deplasman 2.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran107');
} else if($secim_yapimi_kuponguncelle=="Toplam Kaç Gol Atılır ?"){
	$secilen_translate = getTranslation('futboloran108');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Skoru"){
	$secilen_translate = getTranslation('futboloran109');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 2.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran110');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 2.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran111');
} else if($secim_yapimi_kuponguncelle=="İlk Yarıda Kaç Gol Olur ?"){
	$secilen_translate = getTranslation('futboloran112');
} else if($secim_yapimi_kuponguncelle=="2.Yarıda Toplam Kaç Gol Olur ?"){
	$secilen_translate = getTranslation('futboloran113');
} else if($secim_yapimi_kuponguncelle=="1. yarıda 1.golü hangi takım atar?"){
	$secilen_translate = getTranslation('futboloran114');
} else if($secim_yapimi_kuponguncelle=="1. yarıda 2.golü hangi takım atar?"){
	$secilen_translate = getTranslation('futboloran115');
} else if($secim_yapimi_kuponguncelle=="1.golü hangi takım atar?"){
	$secilen_translate = getTranslation('futboloran116');
} else if($secim_yapimi_kuponguncelle=="2.golü hangi takım atar?"){
	$secilen_translate = getTranslation('futboloran117');
} else if($secim_yapimi_kuponguncelle=="3.golü hangi takım atar?"){
	$secilen_translate = getTranslation('futboloran118');
} else if($secim_yapimi_kuponguncelle=="4.golü hangi takım atar?"){
	$secilen_translate = getTranslation('futboloran119');
} else if($secim_yapimi_kuponguncelle=="5.golü hangi takım atar?"){
	$secilen_translate = getTranslation('futboloran120');
} else if($secim_yapimi_kuponguncelle=="6.golü hangi takım atar?"){
	$secilen_translate = getTranslation('futboloran121');
} else if($secim_yapimi_kuponguncelle=="Toplam Sarı Kart 1.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran122');
} else if($secim_yapimi_kuponguncelle=="Toplam Sarı Kart 2.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran123');
} else if($secim_yapimi_kuponguncelle=="Toplam Sarı Kart 4.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran124');
} else if($secim_yapimi_kuponguncelle=="Kırmızı Kart Çıkarmı ?"){
	$secilen_translate = getTranslation('futboloran125');
} else if($secim_yapimi_kuponguncelle=="Kaç Penaltı Olur ?"){
	$secilen_translate = getTranslation('futboloran126');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Sarı Kart 1.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran127');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Sarı Kart 2.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran128');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Sarı Kart 3.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran129');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Sarı Kart 1.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran130');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Sarı Kart 2.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran131');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Sarı Kart 3.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran132');
} else if($secim_yapimi_kuponguncelle=="Sarı Kart Tek/Çift"){
	$secilen_translate = getTranslation('futboloran133');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 2.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran134');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 3.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran135');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 4.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran136');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 5.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran137');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 6.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran138');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 7.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran139');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 8.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran140');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 9.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran141');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 10.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran142');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 2.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran143');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 3.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran144');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 4.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran145');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 5.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran146');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 6.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran147');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 7.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran148');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 8.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran149');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 9.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran150');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 10.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran151');
} else if($secim_yapimi_kuponguncelle=="Korner Tek/Çift"){
	$secilen_translate = getTranslation('futboloran152');
} else if($secim_yapimi_kuponguncelle=="Hangi Takım Daha Çok Korner Kullanır ?"){
	$secilen_translate = getTranslation('futboloran153');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:0-0"){
	$secilen_translate = getTranslation('futboloran154');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:1-0"){
	$secilen_translate = getTranslation('futboloran155');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:0-1"){
	$secilen_translate = getTranslation('futboloran156');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:1-1"){
	$secilen_translate = getTranslation('futboloran157');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:2-0"){
	$secilen_translate = getTranslation('futboloran158');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:0-2"){
	$secilen_translate = getTranslation('futboloran159');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:2-1"){
	$secilen_translate = getTranslation('futboloran160');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:1-2"){
	$secilen_translate = getTranslation('futboloran161');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:3-0"){
	$secilen_translate = getTranslation('futboloran162');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:0-3"){
	$secilen_translate = getTranslation('futboloran163');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:2-2"){
	$secilen_translate = getTranslation('futboloran164');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:1-3"){
	$secilen_translate = getTranslation('futboloran165');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:4-0"){
	$secilen_translate = getTranslation('futboloran166');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:5-0"){
	$secilen_translate = getTranslation('futboloran167');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:4-1"){
	$secilen_translate = getTranslation('futboloran168');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:3-2"){
	$secilen_translate = getTranslation('futboloran169');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:3-3"){
	$secilen_translate = getTranslation('futboloran170');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

} else if($row2['spor_tip']=="canlib") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır (Uz. Dahil)"){
	$secilen_translate = getTranslation('basketboloran1');
} else if($secim_yapimi_kuponguncelle=="1X2 (Uz. Hariç)"){
	$secilen_translate = getTranslation('basketboloran2');
} else if($secim_yapimi_kuponguncelle== "1X2(1.YARI)"){
	$secilen_translate = getTranslation('basketboloran3');
} else if($secim_yapimi_kuponguncelle== "Toplam Skor Tek/Çift"){
	$secilen_translate = getTranslation('basketboloran4');
} else if($secim_yapimi_kuponguncelle== "Toplam Skor Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran5');
} else if($secim_yapimi_kuponguncelle== "Handikap ( 1.YARI )"){
	$secilen_translate = getTranslation('basketboloran6');
} else if($secim_yapimi_kuponguncelle== "Handikap"){
	$secilen_translate = getTranslation('basketboloran7');
} else if($secim_yapimi_kuponguncelle== "1.Yarı / Maç Sonucu"){
	$secilen_translate = getTranslation('basketboloran8');
} else if($secim_yapimi_kuponguncelle== "İki Devrede Kazanır"){
	$secilen_translate = getTranslation('basketboloran9');
} else if($secim_yapimi_kuponguncelle== "Tüm Periyotları Kazanır"){
	$secilen_translate = getTranslation('basketboloran10');
} else if($secim_yapimi_kuponguncelle== "1.Takım 1.Yarı Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran11');
} else if($secim_yapimi_kuponguncelle== "2.Takım 1.Yarı Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran12');
} else if($secim_yapimi_kuponguncelle== "1.Takım Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran13');
} else if($secim_yapimi_kuponguncelle== "2.Takım Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran14');
} else if($secim_yapimi_kuponguncelle== "1.Takım 1.Çeyrek Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran15');
} else if($secim_yapimi_kuponguncelle== "2.Takım 1.Çeyrek Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran16');
} else if($secim_yapimi_kuponguncelle== "1.Çeyrek Kim Kazanır"){
	$secilen_translate = getTranslation('basketboloran17');
} else if($secim_yapimi_kuponguncelle== "1.Çeyrek Toplam Tek/Çift"){
	$secilen_translate = getTranslation('basketboloran18');
} else if($secim_yapimi_kuponguncelle== "1.Yarı Toplam Tek/Çift"){
	$secilen_translate = getTranslation('basketboloran19');
} else if($secim_yapimi_kuponguncelle== "1X2(2.YARI)"){
	$secilen_translate = getTranslation('basketboloran20');
} else if($secim_yapimi_kuponguncelle== "1X2(1.Çeyrek)"){
	$secilen_translate = getTranslation('basketboloran21');
} else if($secim_yapimi_kuponguncelle== "1X2(2.Çeyrek)"){
	$secilen_translate = getTranslation('basketboloran22');
} else if($secim_yapimi_kuponguncelle== "1X2(3.Çeyrek)"){
	$secilen_translate = getTranslation('basketboloran23');
} else if($secim_yapimi_kuponguncelle== "1X2(4.Çeyrek)"){
	$secilen_translate = getTranslation('basketboloran24');
} else if($secim_yapimi_kuponguncelle== "2.Çeyrek Kim Kazanır"){
	$secilen_translate = getTranslation('basketboloran25');
} else if($secim_yapimi_kuponguncelle== "3.Çeyrek Kim Kazanır"){
	$secilen_translate = getTranslation('basketboloran26');
} else if($secim_yapimi_kuponguncelle== "4.Çeyrek Kim Kazanır"){
	$secilen_translate = getTranslation('basketboloran27');
} else if($secim_yapimi_kuponguncelle== "1.Çeyrek Toplam Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran28');
} else if($secim_yapimi_kuponguncelle== "2.Çeyrek Toplam Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran29');
} else if($secim_yapimi_kuponguncelle== "3.Çeyrek Toplam Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran30');
} else if($secim_yapimi_kuponguncelle== "4.Çeyrek Toplam Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran31');
} else if($secim_yapimi_kuponguncelle== "1.Takım Toplam Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran32');
} else if($secim_yapimi_kuponguncelle== "2.Takım Toplam Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran33');
} else if($secim_yapimi_kuponguncelle== "1.Takım 1.Yarı Toplam Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran34');
} else if($secim_yapimi_kuponguncelle== "2.Takım 1.Yarı Toplam Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran35');
} else if($secim_yapimi_kuponguncelle== "1.Yarı Handikap"){
	$secilen_translate = getTranslation('basketboloran36');
} else if($secim_yapimi_kuponguncelle== "2.Yarı Handikap"){
	$secilen_translate = getTranslation('basketboloran37');
} else if($secim_yapimi_kuponguncelle== "1.Çeyrek Handikap"){
	$secilen_translate = getTranslation('basketboloran38');
} else if($secim_yapimi_kuponguncelle== "2.Çeyrek Handikap"){
	$secilen_translate = getTranslation('basketboloran39');
} else if($secim_yapimi_kuponguncelle== "3.Çeyrek Handikap"){
	$secilen_translate = getTranslation('basketboloran40');
} else if($secim_yapimi_kuponguncelle== "4.Çeyrek Handikap"){
	$secilen_translate = getTranslation('basketboloran41');
} else if($secim_yapimi_kuponguncelle== "2.Yarı Toplam Tek/Çift"){
	$secilen_translate = getTranslation('basketboloran42');
} else if($secim_yapimi_kuponguncelle== "2.Çeyrek Toplam Tek/Çift"){
	$secilen_translate = getTranslation('basketboloran43');
} else if($secim_yapimi_kuponguncelle== "3.Çeyrek Toplam Tek/Çift"){
	$secilen_translate = getTranslation('basketboloran44');
} else if($secim_yapimi_kuponguncelle== "4.Çeyrek Toplam Tek/Çift"){
	$secilen_translate = getTranslation('basketboloran45');
} else if($secim_yapimi_kuponguncelle== "Toplam Tek/Çift"){
	$secilen_translate = getTranslation('basketboloran46');
} else if($secim_yapimi_kuponguncelle== "1.Yarı Kim Kazanır"){
	$secilen_translate = getTranslation('basketboloran47');
} else if($secim_yapimi_kuponguncelle== "2.Yarı Kim Kazanır"){
	$secilen_translate = getTranslation('basketboloran48');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

} else if($row2['spor_tip']=="canlit") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
	$secilen_translate = getTranslation('tenisoran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahisi"){
	$secilen_translate = getTranslation('tenisoran2');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

} else if($row2['spor_tip']=="canliv") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
	$secilen_translate = getTranslation('voleyboloran1');
} else if($secim_yapimi_kuponguncelle=="Set bahisi"){
	$secilen_translate = getTranslation('voleyboloran2');
} else if($secim_yapimi_kuponguncelle=="Toplam Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran3');
} else if($secim_yapimi_kuponguncelle=="5 Set Sürermi ?"){
	$secilen_translate = getTranslation('voleyboloran4');
} else if($secim_yapimi_kuponguncelle=="1.Seti Kim Kazanır ?"){
	$secilen_translate = getTranslation('voleyboloran5');
} else if($secim_yapimi_kuponguncelle=="2.Seti Kim Kazanır ?"){
	$secilen_translate = getTranslation('voleyboloran6');
} else if($secim_yapimi_kuponguncelle=="3.Seti Kim Kazanır ?"){
	$secilen_translate = getTranslation('voleyboloran7');
} else if($secim_yapimi_kuponguncelle=="4.Seti Kim Kazanır ?"){
	$secilen_translate = getTranslation('voleyboloran8');
} else if($secim_yapimi_kuponguncelle=="Set bahisi (5 maç üzerinden)"){
	$secilen_translate = getTranslation('voleyboloran9');
} else if($secim_yapimi_kuponguncelle=="Toplam Kaç Set Oynanır ?"){
	$secilen_translate = getTranslation('voleyboloran10');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Sayı Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran11');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Sayı Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran12');
} else if($secim_yapimi_kuponguncelle=="1.Takım 1.Set Toplam Sayı Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran13');
} else if($secim_yapimi_kuponguncelle=="2.Takım 1.Set Toplam Sayı Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran14');
} else if($secim_yapimi_kuponguncelle=="1.Takım 2.Set Toplam Sayı Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran15');
} else if($secim_yapimi_kuponguncelle=="2.Takım 2.Set Toplam Sayı Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran16');
} else if($secim_yapimi_kuponguncelle=="1.Takım 3.Set Toplam Sayı Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran17');
} else if($secim_yapimi_kuponguncelle=="2.Takım 3.Set Toplam Sayı Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran18');
} else if($secim_yapimi_kuponguncelle=="1.Takım 4.Set Toplam Sayı Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran19');
} else if($secim_yapimi_kuponguncelle=="2.Takım 4.Set Toplam Sayı Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran20');
} else if($secim_yapimi_kuponguncelle=="Toplam Skor Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran21');
} else if($secim_yapimi_kuponguncelle=="Toplam Sayı Tek/Çift"){
	$secilen_translate = getTranslation('voleyboloran22');
} else if($secim_yapimi_kuponguncelle=="1.Set Toplam Sayı Tek/Çift"){
	$secilen_translate = getTranslation('voleyboloran23');
} else if($secim_yapimi_kuponguncelle=="2.Set Toplam Sayı Tek/Çift"){
	$secilen_translate = getTranslation('voleyboloran24');
} else if($secim_yapimi_kuponguncelle=="3.Set Toplam Sayı Tek/Çift"){
	$secilen_translate = getTranslation('voleyboloran25');
} else if($secim_yapimi_kuponguncelle=="4.Set Toplam Sayı Tek/Çift"){
	$secilen_translate = getTranslation('voleyboloran26');
} else if($secim_yapimi_kuponguncelle=="Müsabaka 5.Set Sürermi"){
	$secilen_translate = getTranslation('voleyboloran27');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

} else if($row2['spor_tip']=="canlibuz") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
	$secilen_translate = getTranslation('buzhokeyioran1');
} else if($secim_yapimi_kuponguncelle=="1X2"){
	$secilen_translate = getTranslation('buzhokeyioran2');
} else if($secim_yapimi_kuponguncelle=="1.P Maç Sonucu"){
	$secilen_translate = getTranslation('buzhokeyioran3');
} else if($secim_yapimi_kuponguncelle=="2.P Maç Sonucu"){
	$secilen_translate = getTranslation('buzhokeyioran4');
} else if($secim_yapimi_kuponguncelle=="3.P Maç Sonucu"){
	$secilen_translate = getTranslation('buzhokeyioran5');
} else if($secim_yapimi_kuponguncelle=="Cifte Sans"){
	$secilen_translate = getTranslation('buzhokeyioran6');
} else if($secim_yapimi_kuponguncelle=="1.P Çifte Şans"){
	$secilen_translate = getTranslation('buzhokeyioran7');
} else if($secim_yapimi_kuponguncelle=="2.P Çifte Şans"){
	$secilen_translate = getTranslation('buzhokeyioran8');
} else if($secim_yapimi_kuponguncelle=="3.P Çifte Şans"){
	$secilen_translate = getTranslation('buzhokeyioran9');
} else if($secim_yapimi_kuponguncelle=="Hangi periyod daha cok gol olur?"){
	$secilen_translate = getTranslation('buzhokeyioran10');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

} else if($row2['spor_tip']=="canlimt") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
	$secilen_translate = getTranslation('masatenisioran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahisi"){
	$secilen_translate = getTranslation('masatenisioran2');
} else if($secim_yapimi_kuponguncelle=="1. ve 2.Seti Kim Kazanır ?"){
	$secilen_translate = getTranslation('masatenisioran3');
} else if($secim_yapimi_kuponguncelle=="2. ve 3.Seti Kim Kazanır ?"){
	$secilen_translate = getTranslation('masatenisioran4');
} else if($secim_yapimi_kuponguncelle=="1.Seti Kim Kazanır"){
	$secilen_translate = getTranslation('masatenisioran5');
} else if($secim_yapimi_kuponguncelle=="Toplam Skor"){
	$secilen_translate = getTranslation('masatenisioran6');
} else if($secim_yapimi_kuponguncelle=="2.Seti Kim Kazanır"){
	$secilen_translate = getTranslation('masatenisioran7');
} else if($secim_yapimi_kuponguncelle=="3.Seti Kim Kazanır"){
	$secilen_translate = getTranslation('masatenisioran8');
} else if($secim_yapimi_kuponguncelle=="4.Seti Kim Kazanır"){
	$secilen_translate = getTranslation('masatenisioran9');
} else if($secim_yapimi_kuponguncelle=="5.Seti Kim Kazanır"){
	$secilen_translate = getTranslation('masatenisioran10');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

}

if($dil_bilgisi22['language']=='en'){

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "Y";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "N";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "U";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "O";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 and O";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 and O";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 and U";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 and U";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 and Y";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 and Y";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 and N";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 and N";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "No Goal";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "X and Y";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "D";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "S";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else if($dil_bilgisi22['language']=='de'){ 

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "J";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "K";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "N";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "T";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 und T";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 und T";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 und N";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 und N";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 und J";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 und J";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 und K";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 und K";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "Kein Ziel";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "X und J";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "P";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "E";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else if($dil_bilgisi22['language']=='ar'){ 

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "أجل";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "لا";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "أدنى";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "أعلى";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 وما فوق";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 وما فوق";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 و السفلى";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 و السفلى";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 و نعم";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 و نعم";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 و لا";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 و لا";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "لا هدف";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "س ونعم";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "زوجان";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "واحد";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else if($dil_bilgisi22['language']=='ru'){ 

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "да";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "нет";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "ниже";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "топ";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 и выше";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 и выше";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 и ниже";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 и ниже";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 и да";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 и да";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 и нет";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 и нет";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "Нет цели";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "Х и да";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "пара";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "один";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

$oranes = nf($row2['oran']);

$info_bol = explode('|',$row2['canli_info']);
?>

<div class="ticketitem even  betslipImage">
<div class="label date" id="evdate_<?=$row2['id']; ?>"><?=date("d-m H:i",$row2['mac_time']);?></div>
<div class="text">
<div class="bank hidden">Banko</div>
<span>
<div class="icon" style="width: 14px;margin-left: -7px;float: left;margin-top: 2px;">
<div class="sports_small <? if($row2['spor_tip']=="futbol") { ?>soccer<? } else if($row2['spor_tip']=="canli") { ?>soccer<? } else if($row2['spor_tip']=="basketbol") { ?>basketball<? } else if($row2['spor_tip']=="canlib") { ?>basketball<? } else if($row2['spor_tip']=="tenis") { ?>tennis<? } else if($row2['spor_tip']=="canlit") { ?>tennis<? } else if($row2['spor_tip']=="voleybol") { ?>volleyball<? } else if($row2['spor_tip']=="canliv") { ?>volleyball<? } else if($row2['spor_tip']=="buzhokeyi") { ?>ice-hockey<? } else if($row2['spor_tip']=="canlibuz") { ?>ice-hockey<? } else if($row2['spor_tip']=="hentbol") { ?>handball<? } ?>"></div>
</div>
<?=$row2['ev_takim']; ?> - <?=$row2['konuk_takim']; ?>
</span>
<span class="hidden">  </span>
<br>
<span class="normal"><? if($info_bol[0]!=''){ ?><?=$info_bol[0];?> <?=getTranslation('yeniyerler_kasa212')?> <?=$info_bol[1];?><? } ?></span>
</div>
<div class="value" id="scr_<?=$row2['id']; ?>"><?=$sonuc_versene; ?> <? if($row2['kazanma']=="1") { echo $macsonucu; } ?></div>
</div>
<div class="ticketsubitem even  betslipImage">
<div class="label" id="kid_<?=$row2['id']; ?>_scr_<?=$row2['id']; ?>"> <i <? if($row2['kazanma']!="1") { ?>class="hidden"<? } ?>><img style="margin-top: -2px;" src="assets/img/cpnwaiting.png"></i> </div>
<div class="text <? if($row2['kazanma']=="1") { ?>PAYBACK<? } else if($row2['kazanma']=="2") { ?>WON<? } else if($row2['kazanma']=="3") { ?>LOST<? } else if($row2['kazanma']=="4") { ?>CANCELED<? } ?>"><?=$secilen_translate;?> <?=$secilen_translate2;?> <? if(!empty($row2['oran_val'])) { echo "($row2[oran_val])"; } ?> </div>
<div class="value <? if($row2['kazanma']=="1") { ?>PAYBACK<? } else if($row2['kazanma']=="2") { ?>WON<? } else if($row2['kazanma']=="3") { ?>LOST<? } else if($row2['kazanma']=="4") { ?>CANCELED<? } ?>"><?=$oranes; ?></div>
</div>

<? } ?>

<div class="clear barfinish even "></div>
</div>

<? } ?>

<? } ?>

<? } ?>

<script>
function kupongoruntule(id) {
$("#cpdiv_"+id+"").toggleClass("hidden");
}
function kuponicigoruntule(id) {
var rand = Math.random();
$("#appcontent3").show();
$.get('export.php?a=kuponbilgiver&kuponid='+id+'&rand='+rand+'',function(data) { 
$("#appcontent3").html(data);
$("#appcontent1").hide();
$("#appcontent2").hide();
});
}
</script>

<? }

if($a=="kuponbilgiver") {

$kuponid = gd("kuponid");

$kb = bilgi("select  * from kuponlar where id='$kuponid' and user_id='$ub[id]'");

?>

<div>  </div>
<div class="bartitle bartitlebutton">
<div class="icon hidden"></div>
<div class="text"><?=getTranslation('ajaxkomisyonraporu4')?> <?=$kuponid;?></div>
<div class="icon shareBetslipIcon hidden"> <img src="img/share/share.png" alt=""> </div>
</div>
<div class="betslipImage">
<div class="barmiddle">
<div class="text"><?=getTranslation('kupondegistir17')?></div>
<div class="value pr_7" style="float:right;">
<div class="cell" style="text-transform:capitalize">
<div class="ticketstatus <? if($kb['durum']==1){ ?>WAIT<? } else if($kb['durum']==2){ ?>PAID_OUT<? } else if($kb['durum']==3){ ?>LOST<? } else if($kb['durum']==4){ ?>DELIVERED<? } ?>"></div>
<? if($kb['durum']==1){ ?><?=getTranslation('kupondegistir29')?><? } else if($kb['durum']==2){ ?><?=getTranslation('kupondegistir30')?><? } else if($kb['durum']==3){ ?><?=getTranslation('kupondegistir31')?><? } else if($kb['durum']==4){ ?><?=getTranslation('kupondegistir32')?><? } ?>
</div>
</div>
</div>
<div class="hidden"><div class="text normal"></div></div>
<div class="barmiddle"><div class="text"><?=getTranslation('ajaxgirislog5')?></div> <div class="value pr_7"><?=date("d-m H:i",$kb['kupon_time']); ?></div></div>
<div class="barmiddle "> <div class="text"><?=getTranslation('kuponkuponbahis')?></div><div class="value pr_7 private">1 x <?=nf($kb['yatan']); ?> TL = <?=nf($kb['yatan']); ?> TL</div></div>
<div class="hidden"> <div class="text">Ücret</div><div class="value pr_7 private"></div></div>
<div class="hidden"> <div class="text">Toplam bahis</div><div class="value pr_7 private"></div></div>
<div class="hidden"><div class="text">Mali kod</div> <div class="value pr_7"></div></div>
<div class="barmiddle hidden"> <div class="text"></div> <div class="value pr_7 private"></div></div>
<div class="barmiddle "> <div class="text"><?=getTranslation('mobilbettingglossary26')?></div> <div class="value pr_7 private"><?=nf($kb['tutar']); ?></div> </div>
<div class="barmiddle hidden"> <div class="text"></div> <div class="value pr_7 private"></div> </div>
<div class="barmiddle hidden"> <div class="text"></div><div class="value pr_7"></div></div>
<div class="barmiddle hidden"> <div class="text">Bonus çevrimini sağlayan tutar</div><div class="value pr_7 private"></div></div>
<div class="hidden"> <div class="text">Sistem</div> <div class="value pr_7">
<? if($kb['toplam_mac']=="1") { echo "".getTranslation('superadmin47').""; } else if($kb['toplam_mac']=="2") { echo "".getTranslation('superadmin48').""; } else if($kb['toplam_mac']=="3") { echo "".getTranslation('superadmin49').""; } else if($kb['toplam_mac']>3) { echo "".getTranslation('superadmin50').""; } ?>
</div></div>
<div class="hidden hidden"> <div class="text"></div><div class="value pr_7"></div></div>
<div class="hidden  "> <div class="text">Kazanç</div> <div class="value pr_7"><?=nf($kb['tutar']); ?></div> </div>
<div class="hidden hidden"> <div class="text"></div> <div class="value pr_7 private"></div> </div>
<div class="barmiddle " onclick=""> <div class="text"><?=getTranslation('mobilexportkupononaygoruntule10')?> <span class="hidden" style="padding-left:5px;font-weight:normal;"> (<span style="text-decoration:underline;"><?=getTranslation('yeniyerler_kasa365')?></span>)</span></div> <div class="value pr_7">
<? if($kb['toplam_mac']=="1") { echo "".getTranslation('superadmin47').""; } else if($kb['toplam_mac']=="2") { echo "".getTranslation('superadmin48').""; } else if($kb['toplam_mac']=="3") { echo "".getTranslation('superadmin49').""; } else if($kb['toplam_mac']>3) { echo "".getTranslation('superadmin50').""; } ?>
</div></div>
</div>

<?
$sor2 = sed_sql_query("select * from kupon_ic where kupon_id='$kuponid'");
while($row2=sed_sql_fetcharray($sor2)) {
$ob = explode("|",$row2['oran_tip']);

$secim_yapimi_kuponguncelle = $ob[0];
$secim_yapimi_kuponguncelle2 = $ob[1];

if($row2['spor_tip']=="futbol") {

if($secim_yapimi_kuponguncelle=="1X2"){
	$secilen_translate = getTranslation('futboloran1');
} else if($secim_yapimi_kuponguncelle=="Handikap (0:1)"){
	$secilen_translate = getTranslation('futboloran2');
} else if($secim_yapimi_kuponguncelle=="Handikap (1:0)"){
	$secilen_translate = getTranslation('futboloran3');
} else if($secim_yapimi_kuponguncelle=="Handikap (0:2)"){
	$secilen_translate = getTranslation('futboloran4');
} else if($secim_yapimi_kuponguncelle=="Handikap (2:0)"){
	$secilen_translate = getTranslation('futboloran5');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 1.YARI )"){
	$secilen_translate = getTranslation('futboloran6');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 2.YARI )"){
	$secilen_translate = getTranslation('futboloran7');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Çifte Şans"){
	$secilen_translate = getTranslation('futboloran8');
} else if($secim_yapimi_kuponguncelle=="1.YARI KG"){
	$secilen_translate = getTranslation('futboloran9');
} else if($secim_yapimi_kuponguncelle=="Beraberlikte İade"){
	$secilen_translate = getTranslation('futboloran10');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 0.5"){
	$secilen_translate = getTranslation('futboloran11');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 1.5"){
	$secilen_translate = getTranslation('futboloran12');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 2.5"){
	$secilen_translate = getTranslation('futboloran13');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 3.5"){
	$secilen_translate = getTranslation('futboloran14');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 4.5"){
	$secilen_translate = getTranslation('futboloran15');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 5.5"){
	$secilen_translate = getTranslation('futboloran16');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 0.5"){
	$secilen_translate = getTranslation('futboloran18');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 1.5"){
	$secilen_translate = getTranslation('futboloran19');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 2.5"){
	$secilen_translate = getTranslation('futboloran20');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 3.5"){
	$secilen_translate = getTranslation('futboloran21');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 0.5"){
	$secilen_translate = getTranslation('futboloran22');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 1.5"){
	$secilen_translate = getTranslation('futboloran23');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 2.5"){
	$secilen_translate = getTranslation('futboloran24');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 3.5"){
	$secilen_translate = getTranslation('futboloran25');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Gol Atarmı ?"){
	$secilen_translate = getTranslation('futboloran26');
} else if($secim_yapimi_kuponguncelle=="Deplasman Gol Atarmı ?"){
	$secilen_translate = getTranslation('futboloran27');
} else if($secim_yapimi_kuponguncelle=="Karşılıklı Gol"){
	$secilen_translate = getTranslation('futboloran28');
} else if($secim_yapimi_kuponguncelle=="​​​​​​​​​​1.Yarı Tek/Çift"){
	$secilen_translate = getTranslation('futboloran29');
} else if($secim_yapimi_kuponguncelle=="Tek/Çift"){
	$secilen_translate = getTranslation('futboloran30');
} else if($secim_yapimi_kuponguncelle=="Evsahibi Kaç Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran31');
} else if($secim_yapimi_kuponguncelle=="Deplasman Kaç Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran32');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı Kaç Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran33');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 2.Yarı Kaç Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran34');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı Kaç Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran35');
} else if($secim_yapimi_kuponguncelle=="Deplasman 2.Yarı Kaç Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran36');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı A/Ü 0.5"){
	$secilen_translate = getTranslation('futboloran37');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı A/Ü 1.5"){
	$secilen_translate = getTranslation('futboloran38');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı A/Ü 0.5"){
	$secilen_translate = getTranslation('futboloran39');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı A/Ü 1.5"){
	$secilen_translate = getTranslation('futboloran40');
} else if($secim_yapimi_kuponguncelle=="Evsahibi A/Ü 1.5"){
	$secilen_translate = getTranslation('futboloran41');
} else if($secim_yapimi_kuponguncelle=="Deplasman A/Ü 1.5"){
	$secilen_translate = getTranslation('futboloran42');
} else if($secim_yapimi_kuponguncelle=="​​​​​Evsahibi Her 2 yarıda Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran43');
} else if($secim_yapimi_kuponguncelle=="Deplasman Her 2 yarıda Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran44');
} else if($secim_yapimi_kuponguncelle=="Hangi Devrede Fazla Gol Olur"){
	$secilen_translate = getTranslation('futboloran45');
} else if($secim_yapimi_kuponguncelle=="Evsahibi Hangi Devrede Fazla Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran46');
} else if($secim_yapimi_kuponguncelle=="Deplasman Hangi Devrede Fazla Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran47');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-4+)"){
	$secilen_translate = getTranslation('futboloran48');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-5+)"){
	$secilen_translate = getTranslation('futboloran49');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-6+)"){
	$secilen_translate = getTranslation('futboloran50');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 1 gol farkla kazanır mı?"){
	$secilen_translate = getTranslation('futboloran51');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 2 gol farkla kazanır mı?"){
	$secilen_translate = getTranslation('futboloran52');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 3 gol farkla kazanır mı?"){
	$secilen_translate = getTranslation('futboloran53');
} else if($secim_yapimi_kuponguncelle=="1X2 ve toplam gol sayısı 2.5"){
	$secilen_translate = getTranslation('futboloran54');
} else if($secim_yapimi_kuponguncelle=="Maç sonucu ve karşılıklı goller"){
	$secilen_translate = getTranslation('futboloran55');
} else if($secim_yapimi_kuponguncelle=="İlk Yarı / Maç Sonucu"){
	$secilen_translate = getTranslation('futboloran56');
} else if($secim_yapimi_kuponguncelle=="Skor Bahsi (90 Dakika)"){
	$secilen_translate = getTranslation('futboloran57');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
	$secilen_translate = getTranslation('futboloran58');
} else if($secim_yapimi_kuponguncelle=="Toplam Sari Kart Alt/Üst 3.5"){
	$secilen_translate = getTranslation('futboloran59');
} else if($secim_yapimi_kuponguncelle=="Kirmizi kart cikar mi?"){
	$secilen_translate = getTranslation('futboloran60');
} else if($secim_yapimi_kuponguncelle=="Macta kac tane penalti olur?"){
	$secilen_translate = getTranslation('futboloran61');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 1.5"){
	$secilen_translate = getTranslation('futboloran62');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 2.5"){
	$secilen_translate = getTranslation('futboloran63');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 3.5"){
	$secilen_translate = getTranslation('futboloran64');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 1.5"){
	$secilen_translate = getTranslation('futboloran65');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 2.5"){
	$secilen_translate = getTranslation('futboloran66');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 3.5"){
	$secilen_translate = getTranslation('futboloran67');
} else if($secim_yapimi_kuponguncelle=="Sarı Kart Toplam Tek/Çift"){
	$secilen_translate = getTranslation('futboloran68');
} else if($secim_yapimi_kuponguncelle=="Hangi Takım Çok Sarı Kart Yer ?"){
	$secilen_translate = getTranslation('futboloran69');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 5.5"){
	$secilen_translate = getTranslation('futboloran70');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 6.5"){
	$secilen_translate = getTranslation('futboloran71');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 7.5"){
	$secilen_translate = getTranslation('futboloran72');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 8.5"){
	$secilen_translate = getTranslation('futboloran73');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 9.5"){
	$secilen_translate = getTranslation('futboloran74');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 10.5"){
	$secilen_translate = getTranslation('futboloran75');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 11.5"){
	$secilen_translate = getTranslation('futboloran76');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 12.5"){
	$secilen_translate = getTranslation('futboloran77');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 13.5"){
	$secilen_translate = getTranslation('futboloran78');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 14.5"){
	$secilen_translate = getTranslation('futboloran79');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 15.5"){
	$secilen_translate = getTranslation('futboloran80');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 2.5"){
	$secilen_translate = getTranslation('futboloran81');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 3.5"){
	$secilen_translate = getTranslation('futboloran82');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 4.5"){
	$secilen_translate = getTranslation('futboloran83');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 5.5"){
	$secilen_translate = getTranslation('futboloran84');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 6.5"){
	$secilen_translate = getTranslation('futboloran85');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 7.5"){
	$secilen_translate = getTranslation('futboloran86');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 8.5"){
	$secilen_translate = getTranslation('futboloran87');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 9.5"){
	$secilen_translate = getTranslation('futboloran88');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 10.5"){
	$secilen_translate = getTranslation('futboloran89');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 2.5"){
	$secilen_translate = getTranslation('futboloran90');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 3.5"){
	$secilen_translate = getTranslation('futboloran91');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 4.5"){
	$secilen_translate = getTranslation('futboloran92');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 5.5"){
	$secilen_translate = getTranslation('futboloran93');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 6.5"){
	$secilen_translate = getTranslation('futboloran94');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 7.5"){
	$secilen_translate = getTranslation('futboloran95');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 8.5"){
	$secilen_translate = getTranslation('futboloran96');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 9.5"){
	$secilen_translate = getTranslation('futboloran97');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 10.5"){
	$secilen_translate = getTranslation('futboloran98');
} else if($secim_yapimi_kuponguncelle=="Korner Toplam Tek/Çift"){
	$secilen_translate = getTranslation('futboloran99');
} else if($secim_yapimi_kuponguncelle=="Hangi Takım Çok Korner Kullanır ?"){
	$secilen_translate = getTranslation('futboloran100');
} else if($secim_yapimi_kuponguncelle=="1X2 ve toplam gol sayısı 3.5"){
	$secilen_translate = getTranslation('futboloran101');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

} else if($row2['spor_tip']=="basketbol") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ? (Uz. Dahil)"){
	$secilen_translate = getTranslation('basketboloran1');
} else if($secim_yapimi_kuponguncelle=="1X2 (Uz. Hariç)"){
	$secilen_translate = getTranslation('basketboloran2');
} else if($secim_yapimi_kuponguncelle== "1X2 ( 1.YARI )"){
	$secilen_translate = getTranslation('basketboloran3');
} else if($secim_yapimi_kuponguncelle== "Toplam Skor Tek/Çift"){
	$secilen_translate = getTranslation('basketboloran4');
} else if($secim_yapimi_kuponguncelle== "Toplam Skor Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran5');
} else if($secim_yapimi_kuponguncelle== "Handikap ( 1.YARI )"){
	$secilen_translate = getTranslation('basketboloran6');
} else if($secim_yapimi_kuponguncelle== "Handikap"){
	$secilen_translate = getTranslation('basketboloran7');
} else if($secim_yapimi_kuponguncelle== "1.Yarı / MS"){
	$secilen_translate = getTranslation('basketboloran8');
} else if($secim_yapimi_kuponguncelle== "İki Devrede Kazanır"){
	$secilen_translate = getTranslation('basketboloran9');
} else if($secim_yapimi_kuponguncelle== "Tüm Periyotları Kazanır"){
	$secilen_translate = getTranslation('basketboloran10');
} else if($secim_yapimi_kuponguncelle== "1.Takım İY Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran11');
} else if($secim_yapimi_kuponguncelle== "2.Takım İY Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran12');
} else if($secim_yapimi_kuponguncelle== "1.Takım Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran13');
} else if($secim_yapimi_kuponguncelle== "2.Takım Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran14');
} else if($secim_yapimi_kuponguncelle== "1.Takım 1.Çeyrek Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran15');
} else if($secim_yapimi_kuponguncelle== "2.Takım 1.Çeyrek Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran16');
} else if($secim_yapimi_kuponguncelle== "1.Çeyrek Kim Kazanır"){
	$secilen_translate = getTranslation('basketboloran17');
} else if($secim_yapimi_kuponguncelle== "1.Çeyrek Toplam Tek/Çift"){
	$secilen_translate = getTranslation('basketboloran18');
} else if($secim_yapimi_kuponguncelle== "1.Yarı Toplam Tek/Çift"){
	$secilen_translate = getTranslation('basketboloran19');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

}  else if($row2['spor_tip']=="tenis") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ?"){
	$secilen_translate = getTranslation('tenisoran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahsi"){
	$secilen_translate = getTranslation('tenisoran2');
} else if($secim_yapimi_kuponguncelle=="1.Seti Kim Kazanır ?"){
	$secilen_translate = getTranslation('tenisoran3');
} else if($secim_yapimi_kuponguncelle=="2.Seti Kim Kazanır ?"){
	$secilen_translate = getTranslation('tenisoran4');
} else if($secim_yapimi_kuponguncelle=="1.Oyuncu 1 Set Kazanır"){
	$secilen_translate = getTranslation('tenisoran5');
} else if($secim_yapimi_kuponguncelle=="2.Oyuncu 1 Set Kazanır"){
	$secilen_translate = getTranslation('tenisoran6');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

} else if($row2['spor_tip']=="voleybol") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ?"){
	$secilen_translate = getTranslation('voleyboloran1');
} else if($secim_yapimi_kuponguncelle=="Set bahisi"){
	$secilen_translate = getTranslation('voleyboloran2');
} else if($secim_yapimi_kuponguncelle=="Toplam Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran3');
} else if($secim_yapimi_kuponguncelle=="5 Set Sürermi ?"){
	$secilen_translate = getTranslation('voleyboloran4');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

} else if($row2['spor_tip']=="buzhokeyi") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
	$secilen_translate = getTranslation('buzhokeyioran1');
} else if($secim_yapimi_kuponguncelle=="1X2"){
	$secilen_translate = getTranslation('buzhokeyioran2');
} else if($secim_yapimi_kuponguncelle=="1.P 1X2"){
	$secilen_translate = getTranslation('buzhokeyioran3');
} else if($secim_yapimi_kuponguncelle=="2.P 1X2"){
	$secilen_translate = getTranslation('buzhokeyioran4');
} else if($secim_yapimi_kuponguncelle=="3.P 1X2"){
	$secilen_translate = getTranslation('buzhokeyioran5');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
	$secilen_translate = getTranslation('buzhokeyioran6');
} else if($secim_yapimi_kuponguncelle=="1.P Çifte Şans"){
	$secilen_translate = getTranslation('buzhokeyioran7');
} else if($secim_yapimi_kuponguncelle=="2.P Çifte Şans"){
	$secilen_translate = getTranslation('buzhokeyioran8');
} else if($secim_yapimi_kuponguncelle=="3.P Çifte Şans"){
	$secilen_translate = getTranslation('buzhokeyioran9');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

} else if($row2['spor_tip']=="masatenisi") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
	$secilen_translate = getTranslation('masatenisioran1');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

} else if($row2['spor_tip']=="rugby") {

if($secim_yapimi_kuponguncelle=="1X2"){
	$secilen_translate = getTranslation('rugbyoran1');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

} else if($row2['spor_tip']=="beyzbol") {

$secilen_translate = $secim_yapimi_kuponguncelle;

} else if($row2['spor_tip']=="dovus") {

$secilen_translate = $secim_yapimi_kuponguncelle;

} else if($row2['spor_tip']=="canli") {

if($secim_yapimi_kuponguncelle=="1X2"){
	$secilen_translate = getTranslation('futboloran1');
} else if($secim_yapimi_kuponguncelle=="Handikap 0:1"){
	$secilen_translate = getTranslation('futboloran2');
} else if($secim_yapimi_kuponguncelle=="Handikap 1:0"){
	$secilen_translate = getTranslation('futboloran3');
} else if($secim_yapimi_kuponguncelle=="Handikap 0:2"){
	$secilen_translate = getTranslation('futboloran4');
} else if($secim_yapimi_kuponguncelle=="Handikap 2:0"){
	$secilen_translate = getTranslation('futboloran5');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Sonucu"){
	$secilen_translate = getTranslation('futboloran6');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Sonucu"){
	$secilen_translate = getTranslation('futboloran7');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Çifte Şans"){
	$secilen_translate = getTranslation('futboloran8');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Karşılıklı Gol"){
	$secilen_translate = getTranslation('futboloran9');
} else if($secim_yapimi_kuponguncelle=="Beraberlikte İade"){
	$secilen_translate = getTranslation('futboloran10');
} else if($secim_yapimi_kuponguncelle=="Toplam 0.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran11');
} else if($secim_yapimi_kuponguncelle=="Toplam 1.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran12');
} else if($secim_yapimi_kuponguncelle=="Toplam 2.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran13');
} else if($secim_yapimi_kuponguncelle=="Toplam 3.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran14');
} else if($secim_yapimi_kuponguncelle=="Toplam 4.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran15');
} else if($secim_yapimi_kuponguncelle=="Toplam 5.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran16');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 0.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran18');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 1.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran19');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 2.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran20');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol 3.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran21');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 0.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran22');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 1.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran23');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 2.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran24');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 3.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran25');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Müsabakada Gol Atarmı ?"){
	$secilen_translate = getTranslation('futboloran26');
} else if($secim_yapimi_kuponguncelle=="Deplasman Müsabakada Gol Atarmı ?"){
	$secilen_translate = getTranslation('futboloran27');
} else if($secim_yapimi_kuponguncelle=="Karşılıklı Gol Olurmu ?"){
	$secilen_translate = getTranslation('futboloran28');
} else if($secim_yapimi_kuponguncelle=="​​​​​1.Yarı Tek / Çift"){
	$secilen_translate = getTranslation('futboloran29');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Tek / Çift"){
	$secilen_translate = getTranslation('futboloran30');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Toplam Kaç Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran31');
} else if($secim_yapimi_kuponguncelle=="Deplasman Toplam Kaç Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran32');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi İlk Yarı Tam Gol Sayısı"){
	$secilen_translate = getTranslation('futboloran33');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi İkinci Yarı Tam Gol Sayısı"){
	$secilen_translate = getTranslation('futboloran34');
} else if($secim_yapimi_kuponguncelle=="Deplasman İlk Yarı Tam Gol Sayısı"){
	$secilen_translate = getTranslation('futboloran35');
} else if($secim_yapimi_kuponguncelle=="Deplasman İkinci Yarı Tam Gol Sayısı"){
	$secilen_translate = getTranslation('futboloran36');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 0.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran37');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 1.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran38');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 0.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran39');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 1.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran40');
} else if($secim_yapimi_kuponguncelle=="Evsahibi Toplam 1.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran41');
} else if($secim_yapimi_kuponguncelle=="Deplasman Toplam 1.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran42');
} else if($secim_yapimi_kuponguncelle=="​​​​​Evsahibi Her 2 yarıda Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran43');
} else if($secim_yapimi_kuponguncelle=="Deplasman Her 2 yarıda Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran44');
} else if($secim_yapimi_kuponguncelle=="Hangi Devrede Fazla Gol Olur"){
	$secilen_translate = getTranslation('futboloran45');
} else if($secim_yapimi_kuponguncelle=="Evsahibi Hangi Devrede Fazla Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran46');
} else if($secim_yapimi_kuponguncelle=="Deplasman Hangi Devrede Fazla Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran47');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-4)"){
	$secilen_translate = getTranslation('futboloran48');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-5)"){
	$secilen_translate = getTranslation('futboloran49');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-6)"){
	$secilen_translate = getTranslation('futboloran50');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 1 Gol Farkla Kazanirmi ?"){
	$secilen_translate = getTranslation('futboloran51');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 2 Gol Farkla Kazanirmi ?"){
	$secilen_translate = getTranslation('futboloran52');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 3 Gol Farkla Kazanirmi ?"){
	$secilen_translate = getTranslation('futboloran53');
} else if($secim_yapimi_kuponguncelle=="Maç Sonucu ve 2.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran54');
} else if($secim_yapimi_kuponguncelle=="Maç Sonucu ve Karşılıklı Gol"){
	$secilen_translate = getTranslation('futboloran55');
} else if($secim_yapimi_kuponguncelle=="İlk Yarı / Maç Sonucu"){
	$secilen_translate = getTranslation('futboloran56');
} else if($secim_yapimi_kuponguncelle=="Maç Skoru"){
	$secilen_translate = getTranslation('futboloran57');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
	$secilen_translate = getTranslation('futboloran58');
} else if($secim_yapimi_kuponguncelle=="Toplam Sarı Kart 3.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran59');
} else if($secim_yapimi_kuponguncelle=="Kırmızı Kart Çıkar mı?"){
	$secilen_translate = getTranslation('futboloran60');
} else if($secim_yapimi_kuponguncelle=="Maçta Kaç Tane Penaltı Olur ?"){
	$secilen_translate = getTranslation('futboloran61');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart 1.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran62');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart 2.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran63');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart 3.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran64');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart 1.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran65');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart 2.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran66');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart 3.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran67');
} else if($secim_yapimi_kuponguncelle=="Sarı Kart Toplam Tek/Çift"){
	$secilen_translate = getTranslation('futboloran68');
} else if($secim_yapimi_kuponguncelle=="Hangi Takım Çok Sarı Kart Yer ?"){
	$secilen_translate = getTranslation('futboloran69');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner 5.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran70');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner 6.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran71');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner 7.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran72');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner 8.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran73');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner 9.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran74');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner 10.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran75');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner 11.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran76');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner 12.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran77');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner 13.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran78');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner 14.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran79');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner 15.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran80');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 2.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran81');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 3.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran82');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 4.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran83');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 5.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran84');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 6.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran85');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 7.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran86');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 8.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran87');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 9.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran88');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 10.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran89');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 2.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran90');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 3.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran91');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 4.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran92');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 5.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran93');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 6.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran94');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 7.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran95');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 8.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran96');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 9.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran97');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 10.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran98');
} else if($secim_yapimi_kuponguncelle=="Korner Tek/Çift"){
	$secilen_translate = getTranslation('futboloran99');
} else if($secim_yapimi_kuponguncelle=="Hangi Takım Çok Korner Kullanır ?"){
	$secilen_translate = getTranslation('futboloran100');
} else if($secim_yapimi_kuponguncelle=="Maç Sonucu ve 3.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran101');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 0.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran102');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran103');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 2.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran104');
} else if($secim_yapimi_kuponguncelle=="Deplasman 0.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran105');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran106');
} else if($secim_yapimi_kuponguncelle=="Deplasman 2.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran107');
} else if($secim_yapimi_kuponguncelle=="Toplam Kaç Gol Atılır ?"){
	$secilen_translate = getTranslation('futboloran108');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Skoru"){
	$secilen_translate = getTranslation('futboloran109');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 2.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran110');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 2.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran111');
} else if($secim_yapimi_kuponguncelle=="İlk Yarıda Kaç Gol Olur ?"){
	$secilen_translate = getTranslation('futboloran112');
} else if($secim_yapimi_kuponguncelle=="2.Yarıda Toplam Kaç Gol Olur ?"){
	$secilen_translate = getTranslation('futboloran113');
} else if($secim_yapimi_kuponguncelle=="1. yarıda 1.golü hangi takım atar?"){
	$secilen_translate = getTranslation('futboloran114');
} else if($secim_yapimi_kuponguncelle=="1. yarıda 2.golü hangi takım atar?"){
	$secilen_translate = getTranslation('futboloran115');
} else if($secim_yapimi_kuponguncelle=="1.golü hangi takım atar?"){
	$secilen_translate = getTranslation('futboloran116');
} else if($secim_yapimi_kuponguncelle=="2.golü hangi takım atar?"){
	$secilen_translate = getTranslation('futboloran117');
} else if($secim_yapimi_kuponguncelle=="3.golü hangi takım atar?"){
	$secilen_translate = getTranslation('futboloran118');
} else if($secim_yapimi_kuponguncelle=="4.golü hangi takım atar?"){
	$secilen_translate = getTranslation('futboloran119');
} else if($secim_yapimi_kuponguncelle=="5.golü hangi takım atar?"){
	$secilen_translate = getTranslation('futboloran120');
} else if($secim_yapimi_kuponguncelle=="6.golü hangi takım atar?"){
	$secilen_translate = getTranslation('futboloran121');
} else if($secim_yapimi_kuponguncelle=="Toplam Sarı Kart 1.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran122');
} else if($secim_yapimi_kuponguncelle=="Toplam Sarı Kart 2.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran123');
} else if($secim_yapimi_kuponguncelle=="Toplam Sarı Kart 4.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran124');
} else if($secim_yapimi_kuponguncelle=="Kırmızı Kart Çıkarmı ?"){
	$secilen_translate = getTranslation('futboloran125');
} else if($secim_yapimi_kuponguncelle=="Kaç Penaltı Olur ?"){
	$secilen_translate = getTranslation('futboloran126');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Sarı Kart 1.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran127');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Sarı Kart 2.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran128');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Sarı Kart 3.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran129');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Sarı Kart 1.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran130');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Sarı Kart 2.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran131');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Sarı Kart 3.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran132');
} else if($secim_yapimi_kuponguncelle=="Sarı Kart Tek/Çift"){
	$secilen_translate = getTranslation('futboloran133');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 2.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran134');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 3.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran135');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 4.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran136');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 5.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran137');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 6.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran138');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 7.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran139');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 8.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran140');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 9.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran141');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 10.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran142');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 2.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran143');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 3.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran144');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 4.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran145');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 5.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran146');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 6.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran147');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 7.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran148');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 8.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran149');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 9.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran150');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 10.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran151');
} else if($secim_yapimi_kuponguncelle=="Korner Tek/Çift"){
	$secilen_translate = getTranslation('futboloran152');
} else if($secim_yapimi_kuponguncelle=="Hangi Takım Daha Çok Korner Kullanır ?"){
	$secilen_translate = getTranslation('futboloran153');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:0-0"){
	$secilen_translate = getTranslation('futboloran154');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:1-0"){
	$secilen_translate = getTranslation('futboloran155');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:0-1"){
	$secilen_translate = getTranslation('futboloran156');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:1-1"){
	$secilen_translate = getTranslation('futboloran157');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:2-0"){
	$secilen_translate = getTranslation('futboloran158');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:0-2"){
	$secilen_translate = getTranslation('futboloran159');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:2-1"){
	$secilen_translate = getTranslation('futboloran160');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:1-2"){
	$secilen_translate = getTranslation('futboloran161');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:3-0"){
	$secilen_translate = getTranslation('futboloran162');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:0-3"){
	$secilen_translate = getTranslation('futboloran163');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:2-2"){
	$secilen_translate = getTranslation('futboloran164');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:1-3"){
	$secilen_translate = getTranslation('futboloran165');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:4-0"){
	$secilen_translate = getTranslation('futboloran166');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:5-0"){
	$secilen_translate = getTranslation('futboloran167');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:4-1"){
	$secilen_translate = getTranslation('futboloran168');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:3-2"){
	$secilen_translate = getTranslation('futboloran169');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:3-3"){
	$secilen_translate = getTranslation('futboloran170');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

} else if($row2['spor_tip']=="canlib") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır (Uz. Dahil)"){
	$secilen_translate = getTranslation('basketboloran1');
} else if($secim_yapimi_kuponguncelle=="1X2 (Uz. Hariç)"){
	$secilen_translate = getTranslation('basketboloran2');
} else if($secim_yapimi_kuponguncelle== "1X2(1.YARI)"){
	$secilen_translate = getTranslation('basketboloran3');
} else if($secim_yapimi_kuponguncelle== "Toplam Skor Tek/Çift"){
	$secilen_translate = getTranslation('basketboloran4');
} else if($secim_yapimi_kuponguncelle== "Toplam Skor Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran5');
} else if($secim_yapimi_kuponguncelle== "Handikap ( 1.YARI )"){
	$secilen_translate = getTranslation('basketboloran6');
} else if($secim_yapimi_kuponguncelle== "Handikap"){
	$secilen_translate = getTranslation('basketboloran7');
} else if($secim_yapimi_kuponguncelle== "1.Yarı / Maç Sonucu"){
	$secilen_translate = getTranslation('basketboloran8');
} else if($secim_yapimi_kuponguncelle== "İki Devrede Kazanır"){
	$secilen_translate = getTranslation('basketboloran9');
} else if($secim_yapimi_kuponguncelle== "Tüm Periyotları Kazanır"){
	$secilen_translate = getTranslation('basketboloran10');
} else if($secim_yapimi_kuponguncelle== "1.Takım 1.Yarı Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran11');
} else if($secim_yapimi_kuponguncelle== "2.Takım 1.Yarı Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran12');
} else if($secim_yapimi_kuponguncelle== "1.Takım Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran13');
} else if($secim_yapimi_kuponguncelle== "2.Takım Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran14');
} else if($secim_yapimi_kuponguncelle== "1.Takım 1.Çeyrek Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran15');
} else if($secim_yapimi_kuponguncelle== "2.Takım 1.Çeyrek Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran16');
} else if($secim_yapimi_kuponguncelle== "1.Çeyrek Kim Kazanır"){
	$secilen_translate = getTranslation('basketboloran17');
} else if($secim_yapimi_kuponguncelle== "1.Çeyrek Toplam Tek/Çift"){
	$secilen_translate = getTranslation('basketboloran18');
} else if($secim_yapimi_kuponguncelle== "1.Yarı Toplam Tek/Çift"){
	$secilen_translate = getTranslation('basketboloran19');
} else if($secim_yapimi_kuponguncelle== "1X2(2.YARI)"){
	$secilen_translate = getTranslation('basketboloran20');
} else if($secim_yapimi_kuponguncelle== "1X2(1.Çeyrek)"){
	$secilen_translate = getTranslation('basketboloran21');
} else if($secim_yapimi_kuponguncelle== "1X2(2.Çeyrek)"){
	$secilen_translate = getTranslation('basketboloran22');
} else if($secim_yapimi_kuponguncelle== "1X2(3.Çeyrek)"){
	$secilen_translate = getTranslation('basketboloran23');
} else if($secim_yapimi_kuponguncelle== "1X2(4.Çeyrek)"){
	$secilen_translate = getTranslation('basketboloran24');
} else if($secim_yapimi_kuponguncelle== "2.Çeyrek Kim Kazanır"){
	$secilen_translate = getTranslation('basketboloran25');
} else if($secim_yapimi_kuponguncelle== "3.Çeyrek Kim Kazanır"){
	$secilen_translate = getTranslation('basketboloran26');
} else if($secim_yapimi_kuponguncelle== "4.Çeyrek Kim Kazanır"){
	$secilen_translate = getTranslation('basketboloran27');
} else if($secim_yapimi_kuponguncelle== "1.Çeyrek Toplam Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran28');
} else if($secim_yapimi_kuponguncelle== "2.Çeyrek Toplam Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran29');
} else if($secim_yapimi_kuponguncelle== "3.Çeyrek Toplam Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran30');
} else if($secim_yapimi_kuponguncelle== "4.Çeyrek Toplam Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran31');
} else if($secim_yapimi_kuponguncelle== "1.Takım Toplam Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran32');
} else if($secim_yapimi_kuponguncelle== "2.Takım Toplam Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran33');
} else if($secim_yapimi_kuponguncelle== "1.Takım 1.Yarı Toplam Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran34');
} else if($secim_yapimi_kuponguncelle== "2.Takım 1.Yarı Toplam Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran35');
} else if($secim_yapimi_kuponguncelle== "1.Yarı Handikap"){
	$secilen_translate = getTranslation('basketboloran36');
} else if($secim_yapimi_kuponguncelle== "2.Yarı Handikap"){
	$secilen_translate = getTranslation('basketboloran37');
} else if($secim_yapimi_kuponguncelle== "1.Çeyrek Handikap"){
	$secilen_translate = getTranslation('basketboloran38');
} else if($secim_yapimi_kuponguncelle== "2.Çeyrek Handikap"){
	$secilen_translate = getTranslation('basketboloran39');
} else if($secim_yapimi_kuponguncelle== "3.Çeyrek Handikap"){
	$secilen_translate = getTranslation('basketboloran40');
} else if($secim_yapimi_kuponguncelle== "4.Çeyrek Handikap"){
	$secilen_translate = getTranslation('basketboloran41');
} else if($secim_yapimi_kuponguncelle== "2.Yarı Toplam Tek/Çift"){
	$secilen_translate = getTranslation('basketboloran42');
} else if($secim_yapimi_kuponguncelle== "2.Çeyrek Toplam Tek/Çift"){
	$secilen_translate = getTranslation('basketboloran43');
} else if($secim_yapimi_kuponguncelle== "3.Çeyrek Toplam Tek/Çift"){
	$secilen_translate = getTranslation('basketboloran44');
} else if($secim_yapimi_kuponguncelle== "4.Çeyrek Toplam Tek/Çift"){
	$secilen_translate = getTranslation('basketboloran45');
} else if($secim_yapimi_kuponguncelle== "Toplam Tek/Çift"){
	$secilen_translate = getTranslation('basketboloran46');
} else if($secim_yapimi_kuponguncelle== "1.Yarı Kim Kazanır"){
	$secilen_translate = getTranslation('basketboloran47');
} else if($secim_yapimi_kuponguncelle== "2.Yarı Kim Kazanır"){
	$secilen_translate = getTranslation('basketboloran48');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

} else if($row2['spor_tip']=="canlit") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
	$secilen_translate = getTranslation('tenisoran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahisi"){
	$secilen_translate = getTranslation('tenisoran2');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

} else if($row2['spor_tip']=="canliv") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
	$secilen_translate = getTranslation('voleyboloran1');
} else if($secim_yapimi_kuponguncelle=="Set bahisi"){
	$secilen_translate = getTranslation('voleyboloran2');
} else if($secim_yapimi_kuponguncelle=="Toplam Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran3');
} else if($secim_yapimi_kuponguncelle=="5 Set Sürermi ?"){
	$secilen_translate = getTranslation('voleyboloran4');
} else if($secim_yapimi_kuponguncelle=="1.Seti Kim Kazanır ?"){
	$secilen_translate = getTranslation('voleyboloran5');
} else if($secim_yapimi_kuponguncelle=="2.Seti Kim Kazanır ?"){
	$secilen_translate = getTranslation('voleyboloran6');
} else if($secim_yapimi_kuponguncelle=="3.Seti Kim Kazanır ?"){
	$secilen_translate = getTranslation('voleyboloran7');
} else if($secim_yapimi_kuponguncelle=="4.Seti Kim Kazanır ?"){
	$secilen_translate = getTranslation('voleyboloran8');
} else if($secim_yapimi_kuponguncelle=="Set bahisi (5 maç üzerinden)"){
	$secilen_translate = getTranslation('voleyboloran9');
} else if($secim_yapimi_kuponguncelle=="Toplam Kaç Set Oynanır ?"){
	$secilen_translate = getTranslation('voleyboloran10');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Sayı Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran11');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Sayı Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran12');
} else if($secim_yapimi_kuponguncelle=="1.Takım 1.Set Toplam Sayı Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran13');
} else if($secim_yapimi_kuponguncelle=="2.Takım 1.Set Toplam Sayı Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran14');
} else if($secim_yapimi_kuponguncelle=="1.Takım 2.Set Toplam Sayı Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran15');
} else if($secim_yapimi_kuponguncelle=="2.Takım 2.Set Toplam Sayı Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran16');
} else if($secim_yapimi_kuponguncelle=="1.Takım 3.Set Toplam Sayı Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran17');
} else if($secim_yapimi_kuponguncelle=="2.Takım 3.Set Toplam Sayı Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran18');
} else if($secim_yapimi_kuponguncelle=="1.Takım 4.Set Toplam Sayı Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran19');
} else if($secim_yapimi_kuponguncelle=="2.Takım 4.Set Toplam Sayı Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran20');
} else if($secim_yapimi_kuponguncelle=="Toplam Skor Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran21');
} else if($secim_yapimi_kuponguncelle=="Toplam Sayı Tek/Çift"){
	$secilen_translate = getTranslation('voleyboloran22');
} else if($secim_yapimi_kuponguncelle=="1.Set Toplam Sayı Tek/Çift"){
	$secilen_translate = getTranslation('voleyboloran23');
} else if($secim_yapimi_kuponguncelle=="2.Set Toplam Sayı Tek/Çift"){
	$secilen_translate = getTranslation('voleyboloran24');
} else if($secim_yapimi_kuponguncelle=="3.Set Toplam Sayı Tek/Çift"){
	$secilen_translate = getTranslation('voleyboloran25');
} else if($secim_yapimi_kuponguncelle=="4.Set Toplam Sayı Tek/Çift"){
	$secilen_translate = getTranslation('voleyboloran26');
} else if($secim_yapimi_kuponguncelle=="Müsabaka 5.Set Sürermi"){
	$secilen_translate = getTranslation('voleyboloran27');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

} else if($row2['spor_tip']=="canlibuz") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
	$secilen_translate = getTranslation('buzhokeyioran1');
} else if($secim_yapimi_kuponguncelle=="1X2"){
	$secilen_translate = getTranslation('buzhokeyioran2');
} else if($secim_yapimi_kuponguncelle=="1.P Maç Sonucu"){
	$secilen_translate = getTranslation('buzhokeyioran3');
} else if($secim_yapimi_kuponguncelle=="2.P Maç Sonucu"){
	$secilen_translate = getTranslation('buzhokeyioran4');
} else if($secim_yapimi_kuponguncelle=="3.P Maç Sonucu"){
	$secilen_translate = getTranslation('buzhokeyioran5');
} else if($secim_yapimi_kuponguncelle=="Cifte Sans"){
	$secilen_translate = getTranslation('buzhokeyioran6');
} else if($secim_yapimi_kuponguncelle=="1.P Çifte Şans"){
	$secilen_translate = getTranslation('buzhokeyioran7');
} else if($secim_yapimi_kuponguncelle=="2.P Çifte Şans"){
	$secilen_translate = getTranslation('buzhokeyioran8');
} else if($secim_yapimi_kuponguncelle=="3.P Çifte Şans"){
	$secilen_translate = getTranslation('buzhokeyioran9');
} else if($secim_yapimi_kuponguncelle=="Hangi periyod daha cok gol olur?"){
	$secilen_translate = getTranslation('buzhokeyioran10');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

} else if($row2['spor_tip']=="canlimt") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
	$secilen_translate = getTranslation('masatenisioran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahisi"){
	$secilen_translate = getTranslation('masatenisioran2');
} else if($secim_yapimi_kuponguncelle=="1. ve 2.Seti Kim Kazanır ?"){
	$secilen_translate = getTranslation('masatenisioran3');
} else if($secim_yapimi_kuponguncelle=="2. ve 3.Seti Kim Kazanır ?"){
	$secilen_translate = getTranslation('masatenisioran4');
} else if($secim_yapimi_kuponguncelle=="1.Seti Kim Kazanır"){
	$secilen_translate = getTranslation('masatenisioran5');
} else if($secim_yapimi_kuponguncelle=="Toplam Skor"){
	$secilen_translate = getTranslation('masatenisioran6');
} else if($secim_yapimi_kuponguncelle=="2.Seti Kim Kazanır"){
	$secilen_translate = getTranslation('masatenisioran7');
} else if($secim_yapimi_kuponguncelle=="3.Seti Kim Kazanır"){
	$secilen_translate = getTranslation('masatenisioran8');
} else if($secim_yapimi_kuponguncelle=="4.Seti Kim Kazanır"){
	$secilen_translate = getTranslation('masatenisioran9');
} else if($secim_yapimi_kuponguncelle=="5.Seti Kim Kazanır"){
	$secilen_translate = getTranslation('masatenisioran10');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

}

if($dil_bilgisi22['language']=='en'){

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "Y";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "N";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "U";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "O";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 and O";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 and O";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 and U";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 and U";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 and Y";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 and Y";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 and N";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 and N";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "No Goal";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "X and Y";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "D";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "S";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else if($dil_bilgisi22['language']=='de'){ 

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "J";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "K";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "N";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "T";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 und T";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 und T";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 und N";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 und N";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 und J";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 und J";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 und K";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 und K";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "Kein Ziel";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "X und J";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "P";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "E";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else if($dil_bilgisi22['language']=='ar'){ 

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "أجل";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "لا";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "أدنى";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "أعلى";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 وما فوق";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 وما فوق";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 و السفلى";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 و السفلى";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 و نعم";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 و نعم";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 و لا";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 و لا";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "لا هدف";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "س ونعم";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "زوجان";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "واحد";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else if($dil_bilgisi22['language']=='ru'){ 

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "да";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "нет";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "ниже";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "топ";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 и выше";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 и выше";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 и ниже";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 и ниже";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 и да";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 и да";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 и нет";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 и нет";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "Нет цели";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "Х и да";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "пара";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "один";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

if($row2['spor_tip']=="canli"){
$macbilgisi = bilgi("select eventid from canli_maclar where id='$row2[mac_db_id]' and devre!='Bitti'");
} else if($row2['spor_tip']=="canlib"){
$macbilgisi = bilgi("select eventid from basketbol_canli_maclar where id='$row2[mac_db_id]' and period!='Bitti'");
} else if($row2['spor_tip']=="canlit"){
$macbilgisi = bilgi("select eventid from canli_maclar_tenis where id='$row2[mac_db_id]' and period!='Bitti'");
} else if($row2['spor_tip']=="canliv"){
$macbilgisi = bilgi("select eventid from canli_maclar_voleybol where id='$row2[mac_db_id]' and period!='Bitti'");
} else if($row2['spor_tip']=="canlibuz"){
$macbilgisi = bilgi("select eventid from canli_maclar_buzhokeyi where id='$row2[mac_db_id]' and period!='Bitti'");
} else if($row2['spor_tip']=="canlih"){
$macbilgisi = bilgi("select eventid from canli_maclar_hentbol where id='$row2[mac_db_id]' and period!='Bitti'");
} else if($row2['spor_tip']=="futbol"){
$macbilgisi = bilgi("select mac_kodu from program_futbol where id='$row2[mac_db_id]'");
} else if($row2['spor_tip']=="basketbol"){
$macbilgisi = bilgi("select mac_kodu from program_basketbol where id='$row2[mac_db_id]'");
} else if($row2['spor_tip']=="tenis"){
$macbilgisi = bilgi("select mac_kodu from program_tenis where id='$row2[mac_db_id]'");
} else if($row2['spor_tip']=="voleybol"){
$macbilgisi = bilgi("select mac_kodu from program_voleybol where id='$row2[mac_db_id]'");
} else if($row2['spor_tip']=="buzhokeyi"){
$macbilgisi = bilgi("select mac_kodu from program_buzhokeyi where id='$row2[mac_db_id]'");
} else if($row2['spor_tip']=="masatenisi"){
$macbilgisi = bilgi("select mac_kodu from program_masatenisi where id='$row2[mac_db_id]'");
} else if($row2['spor_tip']=="beyzbol"){
$macbilgisi = bilgi("select mac_kodu from program_beyzbol where id='$row2[mac_db_id]'");
} else if($row2['spor_tip']=="rugby"){
$macbilgisi = bilgi("select mac_kodu from program_rugby where id='$row2[mac_db_id]'");
} else if($row2['spor_tip']=="dovus"){
$macbilgisi = bilgi("select mac_kodu from program_dovus where id='$row2[mac_db_id]'");
}

?>
<? if($row2['spor_tip']=="canli" || $row2['spor_tip']=="canlib" || $row2['spor_tip']=="canlit" || $row2['spor_tip']=="canliv" || $row2['spor_tip']=="canlibuz" || $row2['spor_tip']=="canlimt") { ?>
<div class="ticketitem even  betslipImage" <? if($macbilgisi['eventid']>0){ ?>onclick="window.location.href='/mb/live?eventid=<?=$macbilgisi['eventid'];?>'"<? } else { ?>onclick="karsilasmabulunmadi();"<? } ?>>
<? } else { ?>
<div class="ticketitem even  betslipImage" <? if($macbilgisi['mac_kodu']>0){ ?>onclick="detaygetir('<? if($row2['spor_tip']=="futbol"){ ?>futbol<? } else  if($row2['spor_tip']=="basketbol"){ ?>basketbol<? } else  if($row2['spor_tip']=="tenis"){ ?>tenis<? } else  if($row2['spor_tip']=="voleybol"){ ?>voleybol<? } else  if($row2['spor_tip']=="buzhokeyi"){ ?>buzhokeyi<? } else  if($row2['spor_tip']=="hentbol"){ ?>hentbol<? } ?>','<?=$row2['mac_db_id']; ?>');"<? } else { ?>onclick="karsilasmabulunmadi();"<? } ?>>
<? } ?>
<div class="label date" id="evdate_<?=$row2['id']; ?>"><?=date("d-m H:i",$row2['mac_time']);?></div>
<div class="text">
<div class="bank hidden">Banko</div>
<span>
<div class="icon" style="width: 14px;margin-left: -7px;float: left;margin-top: 2px;">
<div class="sports_small <? if($row2['spor_tip']=="futbol") { ?>soccer<? } else if($row2['spor_tip']=="canli") { ?>soccer<? } else if($row2['spor_tip']=="basketbol") { ?>basketball<? } else if($row2['spor_tip']=="canlib") { ?>basketball<? } else if($row2['spor_tip']=="tenis") { ?>tennis<? } else if($row2['spor_tip']=="canlit") { ?>tennis<? } else if($row2['spor_tip']=="voleybol") { ?>volleyball<? } else if($row2['spor_tip']=="canliv") { ?>volleyball<? } else if($row2['spor_tip']=="buzhokeyi") { ?>ice-hockey<? } else if($row2['spor_tip']=="canlibuz") { ?>ice-hockey<? } else if($row2['spor_tip']=="hentbol") { ?>handball<? } ?>"></div>
</div>
<?=$row2['ev_takim']; ?> - <?=$row2['konuk_takim']; ?>
</span>
<span class="hidden"></span>
<br>
<span class="normal"></span>
</div>
<div class="value" id="scr_<?=$row2['id']; ?>"><? if($row2['kazanma']!="1") { ?><?=$row2['ms']; ?> (<?=$row2['iy']; ?>)<? } ?></div>
</div>

<div class="ticketitem even  betslipImage">
<div class="label" id="kid_<?=$row2['id']; ?>_scr_<?=$row2['id']; ?>"> <i <? if($row2['kazanma']!="1") { ?>class="hidden"<? } ?>><img style="margin-top: -2px;" src="assets/img/cpnwaiting.png"></i> </div>
<div class="text <? if($row2['kazanma']=="1") { ?>OPEN<? } else if($row2['kazanma']=="2") { ?>WON<? } else if($row2['kazanma']=="3") { ?>LOST<? } else if($row2['kazanma']=="4") { ?>CANCELED<? } ?>"><?=$secilen_translate;?> <?=$secilen_translate2;?> <? if(!empty($row2['oran_val'])) { echo "($row2[oran_val])"; } ?>  </div>
<div class="value <? if($row2['kazanma']=="1") { ?>OPEN<? } else if($row2['kazanma']=="2") { ?>WON<? } else if($row2['kazanma']=="3") { ?>LOST<? } else if($row2['kazanma']=="4") { ?>CANCELED<? } ?>"><? $oranes = nf($row2['oran']); echo $oranes; ?></div>
</div>

<? } ?>

<div class="clear barfinish even "></div>
<div>
<div class="bigbutton_wrapper">
<button class="bigbutton simple" onclick="kuponukapatjs();">

<? if($ub["tema"]=="style1") { ?>
<div class="text" style="background: #bc2121;color: #fff;"><?=getTranslation('exportkuponukapatbutton')?></div>
<? } else if($ub["tema"]=="blue") { ?>
<div class="text" style="background: #3489a5;color: #fff;"><?=getTranslation('exportkuponukapatbutton')?></div>
<? } ?>

</button>
<button class="bigbutton simple" onclick="alert('<?=getTranslation('exportsorusorbutton2')?>');">
<div class="text"><?=getTranslation('exportsorusorbutton')?></div>
</button>
</div>
</div>
<div class="contentbottom hidden"> </div>
<div class="spacer">&nbsp;</div>
<script>
function kuponukapatjs() {
$("#appcontent3").html('');
$("#appcontent1").show();
$("#appcontent2").hide();
$("#appcontent3").hide();
}
</script>

<?

}

if($a=="bakiyeraporum") {

$tarih1 = basla_time(gd("tarih_ver"));

$tarih2 = bitir_time(gd("tarih_ver2"));

$islemtip = gd("islemtip");

if(!empty($islemtip)) { $islemtip_ekle = "and tip='$islemtip'"; } else { $islemtip_ekle = ""; }

$userid = $ub['id'];

$sqladderone = "user_id='$userid' and zaman between '$tarih1' and '$tarih2' $islemtip_ekle order by zaman asc limit 10000";

$sor = sed_sql_query("select * from hesap_hareket where $sqladderone");

$toplams_kayit = bilgi("SELECT COUNT(CASE WHEN id!='' THEN id END) as toplam_kayit FROM hesap_hareket WHERE $sqladderone");

if(sed_sql_numrows($sor)<1) { ?>

<div class="navtitle navsub ">
<div class="tlsubitem">
<div class="hidden"> </div>
<div class="text">0 <?=getTranslation('exportstatementkayit')?></div>
<div class="text hidden">
<div class="deleteOldTickets"></div>
</div>
<div class="text center hidden">
<div class="depositWithdrawalFilter "></div>
</div>
<div class="text hidden">
<div class="downloadPage"></div>
</div>
</div>
</div>

<? } else { ?>

<div class="navtitle navsub ">
<div class="tlsubitem">
<div class="hidden"> </div>
<div class="text"><?=n($toplams_kayit['toplam_kayit']); ?> <?=getTranslation('exportstatementkayit')?></div>
<div class="text hidden">
<div class="deleteOldTickets"></div>
</div>
<div class="text center hidden">
<div class="depositWithdrawalFilter "></div>
</div>
<div class="text hidden">
<div class="downloadPage"></div>
</div>
</div>
</div>

<? while($ass=sed_sql_fetcharray($sor)) { ?>

<div class="navitem accountEntry odd " onclick="">
<div class="account">
<div class="date small"><?=date("d.m H:i",$ass['zaman']);?></div>

<div class="text normal">
<? if($ass['aciklama']=="Hesaptan Müşteriye"){ ?>
<?=getTranslation('raporaciklama4');?>
<? } else if($ass['aciklama']=="Müşteriden Hesaba"){ ?>
<?=getTranslation('raporaciklama5');?>
<? } else if($ass['aciklama']=="Müşteriye Aktarılan Bakiye"){ ?>
<?=getTranslation('raporaciklama6');?>
<? } else if($ass['aciklama']=="Müşteriden Çekilen Bakiye"){ ?>
<?=getTranslation('raporaciklama7');?>
<? } else if($ass['aciklama']=="Bahis Hesabından - Kasaya"){ ?>
<?=getTranslation('raporaciklama8');?>
<? } else if($ass['aciklama']=="Kasa Hesabından - Bahis Hesabına"){ ?>
<?=getTranslation('raporaciklama9');?>
<? } else if($ass['aciklama']=="Hesap açılırken eklendi"){ ?>
<?=getTranslation('raporaciklama10');?>
<? } else if($ass['aciklama']=="Hesap açılırken eklendi."){ ?>
<?=getTranslation('raporaciklama10');?>
<? } else if($ass['aciklama']=="Bahis Hesabından - Müşteriye"){ ?>
<?=getTranslation('raporaciklama11');?>
<? } else if($ass['aciklama']=="Müşteriden - Bahis Hesabına"){ ?>
<?=getTranslation('raporaciklama12');?>
<? } else { ?>
<?=$ass['aciklama'];?>
<? } ?>
</div>

<div class="value"><nobr><?=nf($ass['tutar']); ?>&nbsp;</nobr></div>
</div>
<div class="hidden">
<div class="twoline">

<div class="text normal"><span>
<? if($ass['aciklama']=="Hesaptan Müşteriye"){ ?>
<?=getTranslation('raporaciklama4');?>
<? } else if($ass['aciklama']=="Müşteriden Hesaba"){ ?>
<?=getTranslation('raporaciklama5');?>
<? } else if($ass['aciklama']=="Müşteriye Aktarılan Bakiye"){ ?>
<?=getTranslation('raporaciklama6');?>
<? } else if($ass['aciklama']=="Müşteriden Çekilen Bakiye"){ ?>
<?=getTranslation('raporaciklama7');?>
<? } else if($ass['aciklama']=="Bahis Hesabından - Kasaya"){ ?>
<?=getTranslation('raporaciklama8');?>
<? } else if($ass['aciklama']=="Kasa Hesabından - Bahis Hesabına"){ ?>
<?=getTranslation('raporaciklama9');?>
<? } else if($ass['aciklama']=="Hesap açılırken eklendi"){ ?>
<?=getTranslation('raporaciklama10');?>
<? } else if($ass['aciklama']=="Hesap açılırken eklendi."){ ?>
<?=getTranslation('raporaciklama10');?>
<? } else if($ass['aciklama']=="Bahis Hesabından - Müşteriye"){ ?>
<?=getTranslation('raporaciklama11');?>
<? } else if($ass['aciklama']=="Müşteriden - Bahis Hesabına"){ ?>
<?=getTranslation('raporaciklama12');?>
<? } else { ?>
<?=$ass['aciklama'];?>
<? } ?>
</span></div>

<div class="value"><nobr>توازن: <?=nf($ass['tutar']); ?>&nbsp;</nobr></div>
</div>
</div>
<div class="hidden">
<div class="text normal grey"><span> <?=date("d.m H:i",$ass['zaman']);?> | الكاتب: النظام </span></div>
<div class="value grey"><nobr>فرق: <?=nf($ass['tutar']); ?>&nbsp;</nobr></div>
</div>
</div>

<? } ?>

<? } ?>

<? }

if($a=="kuponraporum") {

$tarih1 = basla_time(gd("tarih_ver"));

$tarih2 = bitir_time(gd("tarih_ver2"));

$islemtip = gd("islemtip");

$userid = $ub['id'];

if(!empty($islemtip)) { $islemtip_ekle = "and tip='$islemtip'"; } else { $islemtip_ekle = ""; }

$sqladderone = "user_id='$userid' and zaman between '$tarih1' and '$tarih2' $islemtip_ekle order by zaman asc limit 10000";

$sor = sed_sql_query("select * from hesap_hareket_gecici2 where $sqladderone");

$toplams = bilgi("SELECT COUNT(CASE WHEN id!='' THEN id END) as toplam_kayit FROM hesap_hareket_gecici2 WHERE $sqladderone"); 

if(sed_sql_numrows($sor)<1) { ?>

<div class="navtitle navsub ">
<div class="tlsubitem">
<div class="hidden"> </div>
<div class="text">0 <?=getTranslation('exportstatementkayit')?></div>
<div class="text hidden">
<div class="deleteOldTickets"></div>
</div>
<div class="text center hidden">
<div class="depositWithdrawalFilter "></div>
</div>
<div class="text hidden">
<div class="downloadPage"></div>
</div>
</div>
</div>

<? } else { ?>

<div class="navtitle navsub ">
<div class="tlsubitem">
<div class="hidden"> </div>
<div class="text"><?=n($toplams['toplam_kayit']); ?> <?=getTranslation('exportstatementkayit')?></div>
<div class="text hidden">
<div class="deleteOldTickets"></div>
</div>
<div class="text center hidden">
<div class="depositWithdrawalFilter "></div>
</div>
<div class="text hidden">
<div class="downloadPage"></div>
</div>
</div>
</div>

<?
while($ass=sed_sql_fetcharray($sor)) {
$id_bul = explode(" ",$ass['aciklama']);
$aciklamabul = explode(" numaralı ",$ass['aciklama']);
?>

<div class="navitem accountEntry odd arrow" onclick="kuponicigoruntule('<?=$id_bul[0];?>');">
<div class="account">
<div class="date small"><?=date("d.m H:i",$ass['zaman']);?></div>

<div class="text normal">

<? if($aciklamabul[1]=="rulet kupon yatırıldı"){ ?>
<?=$aciklamabul[0];?> <?=getTranslation('ajaxkuponraporlari14');?> ( <?=getTranslation('yeniyerler_kasa229');?> )
<? } else if($aciklamabul[1]=="sanal kupon yatırıldı"){ ?>
<?=$aciklamabul[0];?> <?=getTranslation('ajaxkuponraporlari14');?> ( <?=getTranslation('ajaxkupond20');?> )
<? } else if($aciklamabul[1]=="casino kupon yatırıldı"){ ?>
<?=$aciklamabul[0];?> <?=getTranslation('ajaxkuponraporlari14');?> ( <?=getTranslation('yeniyerler_kasa132');?> )
<? } else if($aciklamabul[1]=="kupon yatırıldı"){ ?>
<?=$aciklamabul[0];?> <?=getTranslation('ajaxkuponraporlari14');?>
<? } else if($aciklamabul[1]=="rulet kupon kazancı"){ ?>
<?=$aciklamabul[0];?> <?=getTranslation('ajaxkuponraporlari15');?> ( <?=getTranslation('yeniyerler_kasa229');?> )
<? } else if($aciklamabul[1]=="sanal kupon kazancı"){ ?>
<?=$aciklamabul[0];?> <?=getTranslation('ajaxkuponraporlari15');?> ( <?=getTranslation('ajaxkupond20');?> )
<? } else if($aciklamabul[1]=="casino kupon kazancı"){ ?>
<?=$aciklamabul[0];?> <?=getTranslation('ajaxkuponraporlari15');?> ( <?=getTranslation('yeniyerler_kasa132');?> )
<? } else if($aciklamabul[1]=="kupon kazancı"){ ?>
<?=$aciklamabul[0];?> <?=getTranslation('ajaxkuponraporlari15');?>
<? } else { ?>
<?=$ass['aciklama'];?>
<? } ?>

</div>

<div class="value"><nobr><? if($ass['tip']=="ekle") { echo "+"; } else if($ass['tip']=="cikar") { echo "-"; } else if($ass['tip']=="iptal") { echo "+"; } ?><?=nf($ass['tutar']); ?>&nbsp;TL</nobr></div>
</div>
<div class="hidden">
<div class="twoline">

<div class="text normal"><span>
<? if($aciklamabul[1]=="rulet kupon yatırıldı"){ ?>
<?=$aciklamabul[0];?> <?=getTranslation('ajaxkuponraporlari14');?> ( <?=getTranslation('yeniyerler_kasa229');?> )
<? } else if($aciklamabul[1]=="sanal kupon yatırıldı"){ ?>
<?=$aciklamabul[0];?> <?=getTranslation('ajaxkuponraporlari14');?> ( <?=getTranslation('ajaxkupond20');?> )
<? } else if($aciklamabul[1]=="casino kupon yatırıldı"){ ?>
<?=$aciklamabul[0];?> <?=getTranslation('ajaxkuponraporlari14');?> ( <?=getTranslation('yeniyerler_kasa132');?> )
<? } else if($aciklamabul[1]=="kupon yatırıldı"){ ?>
<?=$aciklamabul[0];?> <?=getTranslation('ajaxkuponraporlari14');?>
<? } else if($aciklamabul[1]=="rulet kupon kazancı"){ ?>
<?=$aciklamabul[0];?> <?=getTranslation('ajaxkuponraporlari15');?> ( <?=getTranslation('yeniyerler_kasa229');?> )
<? } else if($aciklamabul[1]=="sanal kupon kazancı"){ ?>
<?=$aciklamabul[0];?> <?=getTranslation('ajaxkuponraporlari15');?> ( <?=getTranslation('ajaxkupond20');?> )
<? } else if($aciklamabul[1]=="casino kupon kazancı"){ ?>
<?=$aciklamabul[0];?> <?=getTranslation('ajaxkuponraporlari15');?> ( <?=getTranslation('yeniyerler_kasa132');?> )
<? } else if($aciklamabul[1]=="kupon kazancı"){ ?>
<?=$aciklamabul[0];?> <?=getTranslation('ajaxkuponraporlari15');?>
<? } else { ?>
<?=$ass['aciklama'];?>
<? } ?>
</span></div>

<div class="value"><nobr>Balance: <? if($ass['tip']=="ekle") { echo "+"; } else if($ass['tip']=="cikar") { echo "-"; } else if($ass['tip']=="iptal") { echo "+"; } ?><?=nf($ass['tutar']); ?>&nbsp;TL</nobr></div>
</div>
</div>
<div class="hidden">
<div class="text normal grey"><span> <?=date("d.m H:i",$ass['zaman']);?> | Author: BK6217 </span></div>
<div class="value grey"><nobr>Difference: <? if($ass['tip']=="ekle") { echo "+"; } else if($ass['tip']=="cikar") { echo "-"; } else if($ass['tip']=="iptal") { echo "+"; } ?><?=nf($ass['tutar']); ?>&nbsp;TL</nobr></div>
</div>
</div>

<? } ?>

<? } ?>

<script>
function kuponicigoruntule(id) {
var rand = Math.random();
$("#appcontent3").show();
$.get('export.php?a=kuponbilgiver&kuponid='+id+'&rand='+rand+'',function(data) { 
$("#appcontent3").html(data);
$("#appcontent1").hide();
$("#appcontent2").hide();
});
}
</script>

<? }

if($a=="kuponsil") {

$id = gd("id");

sed_sql_query("delete from kupon where id='$id' and session_id='$session_id'");	

}

if($a=="kupononaygoruntule") {

$sonkupon = bilgi("select * from kuponlar where session_id='$session_id' order by id desc limit 1");

?>

<div id="kuponuma">
<div>
<div class="">
<div class="space_2">&nbsp;</div>
<div class="msgtext msgtextbg scrollTo">
<div class="icons msg_info"></div>
<div class="hidden"></div>
<div class="hidden"></div>
<div class="text"><?=getTranslation('mobilexportkupononaygoruntule1')?></div>
</div>
<div class=""></div>
</div>
</div>
<div class="bartitle bartitlebutton"><div class="icon hidden"></div><div class="text"><?=getTranslation('mobilexportkupononaygoruntule2')?> <?=$sonkupon['id'];?></div></div>
<div>
<div class="barmiddle">
<div class="text"><?=getTranslation('mobilexportkupononaygoruntule3')?></div>
<div class="value pr_7" style="float:right;">
<div class="cell" style="text-transform:capitalize"><div class="ticketstatus REJECTED"></div> <?=getTranslation('mobilexportkupononaygoruntule4')?></div>
</div>
</div>
<div class="barmiddle">
<div class="text"><?=getTranslation('mobilexportkupononaygoruntule5')?></div>
<div class="value pr_7"><?=turkce_tarih($sonkupon['kupon_time']); ?> <?=date("H:i",$sonkupon['kupon_time']);?></div>
</div>
<div class="barmiddle ">
<div class="text"><?=getTranslation('mobilexportkupononaygoruntule6')?></div>
<div class="value pr_7"><?=nf($sonkupon['yatan']); ?></div>
</div>
<div class="barmiddle ">
<div class="text"><?=getTranslation('mobilexportkupononaygoruntule7')?></div>
<div class="value pr_7"><?=nf($sonkupon['tutar']); ?></div>
</div>
<div class="barmiddle ">
<div class="text"><?=getTranslation('mobilexportkupononaygoruntule8')?></div>
<div class="value pr_7"><?=nf($sonkupon['oran']); ?></div>
</div>
<div class="barmiddle hidden">
<div class="text"><?=getTranslation('mobilexportkupononaygoruntule9')?></div>
<div class="value pr_7"></div>
</div>
<div class="barmiddle" onclick="">
<div class="text"><?=getTranslation('mobilexportkupononaygoruntule10')?></div>
<div class="value pr_7"></div>
</div>
</div>

<? 
$sor = sed_sql_query("select * from kupon_ic where kupon_id='$sonkupon[id]'");

while($row=sed_sql_fetcharray($sor)) {

$oranbilgi_bol = explode("|",$row['oran_tip']);

$secim_yapimi_kuponguncelle = $oranbilgi_bol[0];
$secim_yapimi_kuponguncelle2 = $oranbilgi_bol[1];

if($row['spor_tip']=="futbol") {

if($secim_yapimi_kuponguncelle=="1X2"){
	$secilen_translate = getTranslation('futboloran1');
} else if($secim_yapimi_kuponguncelle=="Handikap (0:1)"){
	$secilen_translate = getTranslation('futboloran2');
} else if($secim_yapimi_kuponguncelle=="Handikap (1:0)"){
	$secilen_translate = getTranslation('futboloran3');
} else if($secim_yapimi_kuponguncelle=="Handikap (0:2)"){
	$secilen_translate = getTranslation('futboloran4');
} else if($secim_yapimi_kuponguncelle=="Handikap (2:0)"){
	$secilen_translate = getTranslation('futboloran5');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 1.YARI )"){
	$secilen_translate = getTranslation('futboloran6');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 2.YARI )"){
	$secilen_translate = getTranslation('futboloran7');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Çifte Şans"){
	$secilen_translate = getTranslation('futboloran8');
} else if($secim_yapimi_kuponguncelle=="1.YARI KG"){
	$secilen_translate = getTranslation('futboloran9');
} else if($secim_yapimi_kuponguncelle=="Beraberlikte İade"){
	$secilen_translate = getTranslation('futboloran10');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 0.5"){
	$secilen_translate = getTranslation('futboloran11');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 1.5"){
	$secilen_translate = getTranslation('futboloran12');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 2.5"){
	$secilen_translate = getTranslation('futboloran13');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 3.5"){
	$secilen_translate = getTranslation('futboloran14');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 4.5"){
	$secilen_translate = getTranslation('futboloran15');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 5.5"){
	$secilen_translate = getTranslation('futboloran16');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 0.5"){
	$secilen_translate = getTranslation('futboloran18');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 1.5"){
	$secilen_translate = getTranslation('futboloran19');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 2.5"){
	$secilen_translate = getTranslation('futboloran20');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 3.5"){
	$secilen_translate = getTranslation('futboloran21');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 0.5"){
	$secilen_translate = getTranslation('futboloran22');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 1.5"){
	$secilen_translate = getTranslation('futboloran23');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 2.5"){
	$secilen_translate = getTranslation('futboloran24');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 3.5"){
	$secilen_translate = getTranslation('futboloran25');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Gol Atarmı ?"){
	$secilen_translate = getTranslation('futboloran26');
} else if($secim_yapimi_kuponguncelle=="Deplasman Gol Atarmı ?"){
	$secilen_translate = getTranslation('futboloran27');
} else if($secim_yapimi_kuponguncelle=="Karşılıklı Gol"){
	$secilen_translate = getTranslation('futboloran28');
} else if($secim_yapimi_kuponguncelle=="​​​​​​​​​​1.Yarı Tek/Çift"){
	$secilen_translate = getTranslation('futboloran29');
} else if($secim_yapimi_kuponguncelle=="Tek/Çift"){
	$secilen_translate = getTranslation('futboloran30');
} else if($secim_yapimi_kuponguncelle=="Evsahibi Kaç Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran31');
} else if($secim_yapimi_kuponguncelle=="Deplasman Kaç Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran32');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı Kaç Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran33');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 2.Yarı Kaç Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran34');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı Kaç Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran35');
} else if($secim_yapimi_kuponguncelle=="Deplasman 2.Yarı Kaç Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran36');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı A/Ü 0.5"){
	$secilen_translate = getTranslation('futboloran37');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı A/Ü 1.5"){
	$secilen_translate = getTranslation('futboloran38');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı A/Ü 0.5"){
	$secilen_translate = getTranslation('futboloran39');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı A/Ü 1.5"){
	$secilen_translate = getTranslation('futboloran40');
} else if($secim_yapimi_kuponguncelle=="Evsahibi A/Ü 1.5"){
	$secilen_translate = getTranslation('futboloran41');
} else if($secim_yapimi_kuponguncelle=="Deplasman A/Ü 1.5"){
	$secilen_translate = getTranslation('futboloran42');
} else if($secim_yapimi_kuponguncelle=="​​​​​Evsahibi Her 2 yarıda Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran43');
} else if($secim_yapimi_kuponguncelle=="Deplasman Her 2 yarıda Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran44');
} else if($secim_yapimi_kuponguncelle=="Hangi Devrede Fazla Gol Olur"){
	$secilen_translate = getTranslation('futboloran45');
} else if($secim_yapimi_kuponguncelle=="Evsahibi Hangi Devrede Fazla Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran46');
} else if($secim_yapimi_kuponguncelle=="Deplasman Hangi Devrede Fazla Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran47');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-4+)"){
	$secilen_translate = getTranslation('futboloran48');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-5+)"){
	$secilen_translate = getTranslation('futboloran49');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-6+)"){
	$secilen_translate = getTranslation('futboloran50');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 1 gol farkla kazanır mı?"){
	$secilen_translate = getTranslation('futboloran51');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 2 gol farkla kazanır mı?"){
	$secilen_translate = getTranslation('futboloran52');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 3 gol farkla kazanır mı?"){
	$secilen_translate = getTranslation('futboloran53');
} else if($secim_yapimi_kuponguncelle=="1X2 ve toplam gol sayısı 2.5"){
	$secilen_translate = getTranslation('futboloran54');
} else if($secim_yapimi_kuponguncelle=="Maç sonucu ve karşılıklı goller"){
	$secilen_translate = getTranslation('futboloran55');
} else if($secim_yapimi_kuponguncelle=="İlk Yarı / Maç Sonucu"){
	$secilen_translate = getTranslation('futboloran56');
} else if($secim_yapimi_kuponguncelle=="Skor Bahsi (90 Dakika)"){
	$secilen_translate = getTranslation('futboloran57');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
	$secilen_translate = getTranslation('futboloran58');
} else if($secim_yapimi_kuponguncelle=="Toplam Sari Kart Alt/Üst 3.5"){
	$secilen_translate = getTranslation('futboloran59');
} else if($secim_yapimi_kuponguncelle=="Kirmizi kart cikar mi?"){
	$secilen_translate = getTranslation('futboloran60');
} else if($secim_yapimi_kuponguncelle=="Macta kac tane penalti olur?"){
	$secilen_translate = getTranslation('futboloran61');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 1.5"){
	$secilen_translate = getTranslation('futboloran62');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 2.5"){
	$secilen_translate = getTranslation('futboloran63');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 3.5"){
	$secilen_translate = getTranslation('futboloran64');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 1.5"){
	$secilen_translate = getTranslation('futboloran65');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 2.5"){
	$secilen_translate = getTranslation('futboloran66');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 3.5"){
	$secilen_translate = getTranslation('futboloran67');
} else if($secim_yapimi_kuponguncelle=="Sarı Kart Toplam Tek/Çift"){
	$secilen_translate = getTranslation('futboloran68');
} else if($secim_yapimi_kuponguncelle=="Hangi Takım Çok Sarı Kart Yer ?"){
	$secilen_translate = getTranslation('futboloran69');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 5.5"){
	$secilen_translate = getTranslation('futboloran70');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 6.5"){
	$secilen_translate = getTranslation('futboloran71');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 7.5"){
	$secilen_translate = getTranslation('futboloran72');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 8.5"){
	$secilen_translate = getTranslation('futboloran73');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 9.5"){
	$secilen_translate = getTranslation('futboloran74');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 10.5"){
	$secilen_translate = getTranslation('futboloran75');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 11.5"){
	$secilen_translate = getTranslation('futboloran76');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 12.5"){
	$secilen_translate = getTranslation('futboloran77');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 13.5"){
	$secilen_translate = getTranslation('futboloran78');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 14.5"){
	$secilen_translate = getTranslation('futboloran79');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 15.5"){
	$secilen_translate = getTranslation('futboloran80');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 2.5"){
	$secilen_translate = getTranslation('futboloran81');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 3.5"){
	$secilen_translate = getTranslation('futboloran82');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 4.5"){
	$secilen_translate = getTranslation('futboloran83');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 5.5"){
	$secilen_translate = getTranslation('futboloran84');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 6.5"){
	$secilen_translate = getTranslation('futboloran85');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 7.5"){
	$secilen_translate = getTranslation('futboloran86');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 8.5"){
	$secilen_translate = getTranslation('futboloran87');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 9.5"){
	$secilen_translate = getTranslation('futboloran88');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 10.5"){
	$secilen_translate = getTranslation('futboloran89');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 2.5"){
	$secilen_translate = getTranslation('futboloran90');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 3.5"){
	$secilen_translate = getTranslation('futboloran91');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 4.5"){
	$secilen_translate = getTranslation('futboloran92');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 5.5"){
	$secilen_translate = getTranslation('futboloran93');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 6.5"){
	$secilen_translate = getTranslation('futboloran94');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 7.5"){
	$secilen_translate = getTranslation('futboloran95');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 8.5"){
	$secilen_translate = getTranslation('futboloran96');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 9.5"){
	$secilen_translate = getTranslation('futboloran97');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 10.5"){
	$secilen_translate = getTranslation('futboloran98');
} else if($secim_yapimi_kuponguncelle=="Korner Toplam Tek/Çift"){
	$secilen_translate = getTranslation('futboloran99');
} else if($secim_yapimi_kuponguncelle=="Hangi Takım Çok Korner Kullanır ?"){
	$secilen_translate = getTranslation('futboloran100');
} else if($secim_yapimi_kuponguncelle=="1X2 ve toplam gol sayısı 3.5"){
	$secilen_translate = getTranslation('futboloran101');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

} else if($row['spor_tip']=="basketbol") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ? (Uz. Dahil)"){
	$secilen_translate = getTranslation('basketboloran1');
} else if($secim_yapimi_kuponguncelle=="1X2 (Uz. Hariç)"){
	$secilen_translate = getTranslation('basketboloran2');
} else if($secim_yapimi_kuponguncelle== "1X2 ( 1.YARI )"){
	$secilen_translate = getTranslation('basketboloran3');
} else if($secim_yapimi_kuponguncelle== "Toplam Skor Tek/Çift"){
	$secilen_translate = getTranslation('basketboloran4');
} else if($secim_yapimi_kuponguncelle== "Toplam Skor Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran5');
} else if($secim_yapimi_kuponguncelle== "Handikap ( 1.YARI )"){
	$secilen_translate = getTranslation('basketboloran6');
} else if($secim_yapimi_kuponguncelle== "Handikap"){
	$secilen_translate = getTranslation('basketboloran7');
} else if($secim_yapimi_kuponguncelle== "1.Yarı / MS"){
	$secilen_translate = getTranslation('basketboloran8');
} else if($secim_yapimi_kuponguncelle== "İki Devrede Kazanır"){
	$secilen_translate = getTranslation('basketboloran9');
} else if($secim_yapimi_kuponguncelle== "Tüm Periyotları Kazanır"){
	$secilen_translate = getTranslation('basketboloran10');
} else if($secim_yapimi_kuponguncelle== "1.Takım İY Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran11');
} else if($secim_yapimi_kuponguncelle== "2.Takım İY Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran12');
} else if($secim_yapimi_kuponguncelle== "1.Takım Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran13');
} else if($secim_yapimi_kuponguncelle== "2.Takım Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran14');
} else if($secim_yapimi_kuponguncelle== "1.Takım 1.Çeyrek Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran15');
} else if($secim_yapimi_kuponguncelle== "2.Takım 1.Çeyrek Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran16');
} else if($secim_yapimi_kuponguncelle== "1.Çeyrek Kim Kazanır"){
	$secilen_translate = getTranslation('basketboloran17');
} else if($secim_yapimi_kuponguncelle== "1.Çeyrek Toplam Tek/Çift"){
	$secilen_translate = getTranslation('basketboloran18');
} else if($secim_yapimi_kuponguncelle== "1.Yarı Toplam Tek/Çift"){
	$secilen_translate = getTranslation('basketboloran19');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

}  else if($row['spor_tip']=="tenis") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ?"){
	$secilen_translate = getTranslation('tenisoran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahsi"){
	$secilen_translate = getTranslation('tenisoran2');
} else if($secim_yapimi_kuponguncelle=="1.Seti Kim Kazanır ?"){
	$secilen_translate = getTranslation('tenisoran3');
} else if($secim_yapimi_kuponguncelle=="2.Seti Kim Kazanır ?"){
	$secilen_translate = getTranslation('tenisoran4');
} else if($secim_yapimi_kuponguncelle=="1.Oyuncu 1 Set Kazanır"){
	$secilen_translate = getTranslation('tenisoran5');
} else if($secim_yapimi_kuponguncelle=="2.Oyuncu 1 Set Kazanır"){
	$secilen_translate = getTranslation('tenisoran6');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

} else if($row['spor_tip']=="voleybol") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ?"){
	$secilen_translate = getTranslation('voleyboloran1');
} else if($secim_yapimi_kuponguncelle=="Set bahisi"){
	$secilen_translate = getTranslation('voleyboloran2');
} else if($secim_yapimi_kuponguncelle=="Toplam Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran3');
} else if($secim_yapimi_kuponguncelle=="5 Set Sürermi ?"){
	$secilen_translate = getTranslation('voleyboloran4');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

} else if($row['spor_tip']=="buzhokeyi") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
	$secilen_translate = getTranslation('buzhokeyioran1');
} else if($secim_yapimi_kuponguncelle=="1X2"){
	$secilen_translate = getTranslation('buzhokeyioran2');
} else if($secim_yapimi_kuponguncelle=="1.P 1X2"){
	$secilen_translate = getTranslation('buzhokeyioran3');
} else if($secim_yapimi_kuponguncelle=="2.P 1X2"){
	$secilen_translate = getTranslation('buzhokeyioran4');
} else if($secim_yapimi_kuponguncelle=="3.P 1X2"){
	$secilen_translate = getTranslation('buzhokeyioran5');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
	$secilen_translate = getTranslation('buzhokeyioran6');
} else if($secim_yapimi_kuponguncelle=="1.P Çifte Şans"){
	$secilen_translate = getTranslation('buzhokeyioran7');
} else if($secim_yapimi_kuponguncelle=="2.P Çifte Şans"){
	$secilen_translate = getTranslation('buzhokeyioran8');
} else if($secim_yapimi_kuponguncelle=="3.P Çifte Şans"){
	$secilen_translate = getTranslation('buzhokeyioran9');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

} else if($row['spor_tip']=="masatenisi") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
	$secilen_translate = getTranslation('masatenisioran1');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

} else if($row['spor_tip']=="rugby") {

if($secim_yapimi_kuponguncelle=="1X2"){
	$secilen_translate = getTranslation('rugbyoran1');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

} else if($row['spor_tip']=="beyzbol") {

$secilen_translate = $secim_yapimi_kuponguncelle;

} else if($row['spor_tip']=="dovus") {

$secilen_translate = $secim_yapimi_kuponguncelle;

} else if($row['spor_tip']=="canli") {

if($secim_yapimi_kuponguncelle=="1X2"){
	$secilen_translate = getTranslation('futboloran1');
} else if($secim_yapimi_kuponguncelle=="Handikap 0:1"){
	$secilen_translate = getTranslation('futboloran2');
} else if($secim_yapimi_kuponguncelle=="Handikap 1:0"){
	$secilen_translate = getTranslation('futboloran3');
} else if($secim_yapimi_kuponguncelle=="Handikap 0:2"){
	$secilen_translate = getTranslation('futboloran4');
} else if($secim_yapimi_kuponguncelle=="Handikap 2:0"){
	$secilen_translate = getTranslation('futboloran5');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Sonucu"){
	$secilen_translate = getTranslation('futboloran6');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Sonucu"){
	$secilen_translate = getTranslation('futboloran7');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Çifte Şans"){
	$secilen_translate = getTranslation('futboloran8');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Karşılıklı Gol"){
	$secilen_translate = getTranslation('futboloran9');
} else if($secim_yapimi_kuponguncelle=="Beraberlikte İade"){
	$secilen_translate = getTranslation('futboloran10');
} else if($secim_yapimi_kuponguncelle=="Toplam 0.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran11');
} else if($secim_yapimi_kuponguncelle=="Toplam 1.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran12');
} else if($secim_yapimi_kuponguncelle=="Toplam 2.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran13');
} else if($secim_yapimi_kuponguncelle=="Toplam 3.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran14');
} else if($secim_yapimi_kuponguncelle=="Toplam 4.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran15');
} else if($secim_yapimi_kuponguncelle=="Toplam 5.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran16');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 0.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran18');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 1.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran19');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 2.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran20');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol 3.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran21');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 0.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran22');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 1.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran23');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 2.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran24');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 3.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran25');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Müsabakada Gol Atarmı ?"){
	$secilen_translate = getTranslation('futboloran26');
} else if($secim_yapimi_kuponguncelle=="Deplasman Müsabakada Gol Atarmı ?"){
	$secilen_translate = getTranslation('futboloran27');
} else if($secim_yapimi_kuponguncelle=="Karşılıklı Gol Olurmu ?"){
	$secilen_translate = getTranslation('futboloran28');
} else if($secim_yapimi_kuponguncelle=="​​​​​1.Yarı Tek / Çift"){
	$secilen_translate = getTranslation('futboloran29');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Tek / Çift"){
	$secilen_translate = getTranslation('futboloran30');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Toplam Kaç Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran31');
} else if($secim_yapimi_kuponguncelle=="Deplasman Toplam Kaç Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran32');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi İlk Yarı Tam Gol Sayısı"){
	$secilen_translate = getTranslation('futboloran33');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi İkinci Yarı Tam Gol Sayısı"){
	$secilen_translate = getTranslation('futboloran34');
} else if($secim_yapimi_kuponguncelle=="Deplasman İlk Yarı Tam Gol Sayısı"){
	$secilen_translate = getTranslation('futboloran35');
} else if($secim_yapimi_kuponguncelle=="Deplasman İkinci Yarı Tam Gol Sayısı"){
	$secilen_translate = getTranslation('futboloran36');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 0.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran37');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 1.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran38');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 0.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran39');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 1.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran40');
} else if($secim_yapimi_kuponguncelle=="Evsahibi Toplam 1.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran41');
} else if($secim_yapimi_kuponguncelle=="Deplasman Toplam 1.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran42');
} else if($secim_yapimi_kuponguncelle=="​​​​​Evsahibi Her 2 yarıda Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran43');
} else if($secim_yapimi_kuponguncelle=="Deplasman Her 2 yarıda Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran44');
} else if($secim_yapimi_kuponguncelle=="Hangi Devrede Fazla Gol Olur"){
	$secilen_translate = getTranslation('futboloran45');
} else if($secim_yapimi_kuponguncelle=="Evsahibi Hangi Devrede Fazla Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran46');
} else if($secim_yapimi_kuponguncelle=="Deplasman Hangi Devrede Fazla Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran47');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-4)"){
	$secilen_translate = getTranslation('futboloran48');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-5)"){
	$secilen_translate = getTranslation('futboloran49');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-6)"){
	$secilen_translate = getTranslation('futboloran50');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 1 Gol Farkla Kazanirmi ?"){
	$secilen_translate = getTranslation('futboloran51');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 2 Gol Farkla Kazanirmi ?"){
	$secilen_translate = getTranslation('futboloran52');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 3 Gol Farkla Kazanirmi ?"){
	$secilen_translate = getTranslation('futboloran53');
} else if($secim_yapimi_kuponguncelle=="Maç Sonucu ve 2.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran54');
} else if($secim_yapimi_kuponguncelle=="Maç Sonucu ve Karşılıklı Gol"){
	$secilen_translate = getTranslation('futboloran55');
} else if($secim_yapimi_kuponguncelle=="İlk Yarı / Maç Sonucu"){
	$secilen_translate = getTranslation('futboloran56');
} else if($secim_yapimi_kuponguncelle=="Maç Skoru"){
	$secilen_translate = getTranslation('futboloran57');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
	$secilen_translate = getTranslation('futboloran58');
} else if($secim_yapimi_kuponguncelle=="Toplam Sarı Kart 3.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran59');
} else if($secim_yapimi_kuponguncelle=="Kırmızı Kart Çıkar mı?"){
	$secilen_translate = getTranslation('futboloran60');
} else if($secim_yapimi_kuponguncelle=="Maçta Kaç Tane Penaltı Olur ?"){
	$secilen_translate = getTranslation('futboloran61');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart 1.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran62');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart 2.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran63');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart 3.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran64');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart 1.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran65');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart 2.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran66');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart 3.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran67');
} else if($secim_yapimi_kuponguncelle=="Sarı Kart Toplam Tek/Çift"){
	$secilen_translate = getTranslation('futboloran68');
} else if($secim_yapimi_kuponguncelle=="Hangi Takım Çok Sarı Kart Yer ?"){
	$secilen_translate = getTranslation('futboloran69');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner 5.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran70');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner 6.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran71');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner 7.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran72');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner 8.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran73');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner 9.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran74');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner 10.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran75');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner 11.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran76');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner 12.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran77');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner 13.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran78');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner 14.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran79');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner 15.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran80');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 2.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran81');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 3.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran82');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 4.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran83');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 5.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran84');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 6.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran85');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 7.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran86');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 8.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran87');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 9.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran88');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 10.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran89');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 2.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran90');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 3.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran91');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 4.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran92');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 5.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran93');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 6.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran94');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 7.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran95');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 8.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran96');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 9.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran97');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 10.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran98');
} else if($secim_yapimi_kuponguncelle=="Korner Tek/Çift"){
	$secilen_translate = getTranslation('futboloran99');
} else if($secim_yapimi_kuponguncelle=="Hangi Takım Çok Korner Kullanır ?"){
	$secilen_translate = getTranslation('futboloran100');
} else if($secim_yapimi_kuponguncelle=="Maç Sonucu ve 3.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran101');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 0.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran102');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran103');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 2.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran104');
} else if($secim_yapimi_kuponguncelle=="Deplasman 0.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran105');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran106');
} else if($secim_yapimi_kuponguncelle=="Deplasman 2.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran107');
} else if($secim_yapimi_kuponguncelle=="Toplam Kaç Gol Atılır ?"){
	$secilen_translate = getTranslation('futboloran108');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Skoru"){
	$secilen_translate = getTranslation('futboloran109');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 2.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran110');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 2.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran111');
} else if($secim_yapimi_kuponguncelle=="İlk Yarıda Kaç Gol Olur ?"){
	$secilen_translate = getTranslation('futboloran112');
} else if($secim_yapimi_kuponguncelle=="2.Yarıda Toplam Kaç Gol Olur ?"){
	$secilen_translate = getTranslation('futboloran113');
} else if($secim_yapimi_kuponguncelle=="1. yarıda 1.golü hangi takım atar?"){
	$secilen_translate = getTranslation('futboloran114');
} else if($secim_yapimi_kuponguncelle=="1. yarıda 2.golü hangi takım atar?"){
	$secilen_translate = getTranslation('futboloran115');
} else if($secim_yapimi_kuponguncelle=="1.golü hangi takım atar?"){
	$secilen_translate = getTranslation('futboloran116');
} else if($secim_yapimi_kuponguncelle=="2.golü hangi takım atar?"){
	$secilen_translate = getTranslation('futboloran117');
} else if($secim_yapimi_kuponguncelle=="3.golü hangi takım atar?"){
	$secilen_translate = getTranslation('futboloran118');
} else if($secim_yapimi_kuponguncelle=="4.golü hangi takım atar?"){
	$secilen_translate = getTranslation('futboloran119');
} else if($secim_yapimi_kuponguncelle=="5.golü hangi takım atar?"){
	$secilen_translate = getTranslation('futboloran120');
} else if($secim_yapimi_kuponguncelle=="6.golü hangi takım atar?"){
	$secilen_translate = getTranslation('futboloran121');
} else if($secim_yapimi_kuponguncelle=="Toplam Sarı Kart 1.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran122');
} else if($secim_yapimi_kuponguncelle=="Toplam Sarı Kart 2.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran123');
} else if($secim_yapimi_kuponguncelle=="Toplam Sarı Kart 4.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran124');
} else if($secim_yapimi_kuponguncelle=="Kırmızı Kart Çıkarmı ?"){
	$secilen_translate = getTranslation('futboloran125');
} else if($secim_yapimi_kuponguncelle=="Kaç Penaltı Olur ?"){
	$secilen_translate = getTranslation('futboloran126');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Sarı Kart 1.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran127');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Sarı Kart 2.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran128');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Sarı Kart 3.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran129');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Sarı Kart 1.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran130');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Sarı Kart 2.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran131');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Sarı Kart 3.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran132');
} else if($secim_yapimi_kuponguncelle=="Sarı Kart Tek/Çift"){
	$secilen_translate = getTranslation('futboloran133');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 2.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran134');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 3.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran135');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 4.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran136');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 5.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran137');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 6.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran138');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 7.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran139');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 8.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran140');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 9.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran141');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 10.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran142');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 2.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran143');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 3.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran144');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 4.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran145');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 5.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran146');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 6.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran147');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 7.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran148');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 8.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran149');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 9.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran150');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 10.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran151');
} else if($secim_yapimi_kuponguncelle=="Korner Tek/Çift"){
	$secilen_translate = getTranslation('futboloran152');
} else if($secim_yapimi_kuponguncelle=="Hangi Takım Daha Çok Korner Kullanır ?"){
	$secilen_translate = getTranslation('futboloran153');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:0-0"){
	$secilen_translate = getTranslation('futboloran154');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:1-0"){
	$secilen_translate = getTranslation('futboloran155');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:0-1"){
	$secilen_translate = getTranslation('futboloran156');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:1-1"){
	$secilen_translate = getTranslation('futboloran157');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:2-0"){
	$secilen_translate = getTranslation('futboloran158');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:0-2"){
	$secilen_translate = getTranslation('futboloran159');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:2-1"){
	$secilen_translate = getTranslation('futboloran160');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:1-2"){
	$secilen_translate = getTranslation('futboloran161');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:3-0"){
	$secilen_translate = getTranslation('futboloran162');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:0-3"){
	$secilen_translate = getTranslation('futboloran163');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:2-2"){
	$secilen_translate = getTranslation('futboloran164');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:1-3"){
	$secilen_translate = getTranslation('futboloran165');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:4-0"){
	$secilen_translate = getTranslation('futboloran166');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:5-0"){
	$secilen_translate = getTranslation('futboloran167');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:4-1"){
	$secilen_translate = getTranslation('futboloran168');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:3-2"){
	$secilen_translate = getTranslation('futboloran169');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:3-3"){
	$secilen_translate = getTranslation('futboloran170');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

} else if($row['spor_tip']=="canlib") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır (Uz. Dahil)"){
	$secilen_translate = getTranslation('basketboloran1');
} else if($secim_yapimi_kuponguncelle=="1X2 (Uz. Hariç)"){
	$secilen_translate = getTranslation('basketboloran2');
} else if($secim_yapimi_kuponguncelle== "1X2(1.YARI)"){
	$secilen_translate = getTranslation('basketboloran3');
} else if($secim_yapimi_kuponguncelle== "Toplam Skor Tek/Çift"){
	$secilen_translate = getTranslation('basketboloran4');
} else if($secim_yapimi_kuponguncelle== "Toplam Skor Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran5');
} else if($secim_yapimi_kuponguncelle== "Handikap ( 1.YARI )"){
	$secilen_translate = getTranslation('basketboloran6');
} else if($secim_yapimi_kuponguncelle== "Handikap"){
	$secilen_translate = getTranslation('basketboloran7');
} else if($secim_yapimi_kuponguncelle== "1.Yarı / Maç Sonucu"){
	$secilen_translate = getTranslation('basketboloran8');
} else if($secim_yapimi_kuponguncelle== "İki Devrede Kazanır"){
	$secilen_translate = getTranslation('basketboloran9');
} else if($secim_yapimi_kuponguncelle== "Tüm Periyotları Kazanır"){
	$secilen_translate = getTranslation('basketboloran10');
} else if($secim_yapimi_kuponguncelle== "1.Takım 1.Yarı Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran11');
} else if($secim_yapimi_kuponguncelle== "2.Takım 1.Yarı Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran12');
} else if($secim_yapimi_kuponguncelle== "1.Takım Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran13');
} else if($secim_yapimi_kuponguncelle== "2.Takım Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran14');
} else if($secim_yapimi_kuponguncelle== "1.Takım 1.Çeyrek Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran15');
} else if($secim_yapimi_kuponguncelle== "2.Takım 1.Çeyrek Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran16');
} else if($secim_yapimi_kuponguncelle== "1.Çeyrek Kim Kazanır"){
	$secilen_translate = getTranslation('basketboloran17');
} else if($secim_yapimi_kuponguncelle== "1.Çeyrek Toplam Tek/Çift"){
	$secilen_translate = getTranslation('basketboloran18');
} else if($secim_yapimi_kuponguncelle== "1.Yarı Toplam Tek/Çift"){
	$secilen_translate = getTranslation('basketboloran19');
} else if($secim_yapimi_kuponguncelle== "1X2(2.YARI)"){
	$secilen_translate = getTranslation('basketboloran20');
} else if($secim_yapimi_kuponguncelle== "1X2(1.Çeyrek)"){
	$secilen_translate = getTranslation('basketboloran21');
} else if($secim_yapimi_kuponguncelle== "1X2(2.Çeyrek)"){
	$secilen_translate = getTranslation('basketboloran22');
} else if($secim_yapimi_kuponguncelle== "1X2(3.Çeyrek)"){
	$secilen_translate = getTranslation('basketboloran23');
} else if($secim_yapimi_kuponguncelle== "1X2(4.Çeyrek)"){
	$secilen_translate = getTranslation('basketboloran24');
} else if($secim_yapimi_kuponguncelle== "2.Çeyrek Kim Kazanır"){
	$secilen_translate = getTranslation('basketboloran25');
} else if($secim_yapimi_kuponguncelle== "3.Çeyrek Kim Kazanır"){
	$secilen_translate = getTranslation('basketboloran26');
} else if($secim_yapimi_kuponguncelle== "4.Çeyrek Kim Kazanır"){
	$secilen_translate = getTranslation('basketboloran27');
} else if($secim_yapimi_kuponguncelle== "1.Çeyrek Toplam Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran28');
} else if($secim_yapimi_kuponguncelle== "2.Çeyrek Toplam Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran29');
} else if($secim_yapimi_kuponguncelle== "3.Çeyrek Toplam Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran30');
} else if($secim_yapimi_kuponguncelle== "4.Çeyrek Toplam Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran31');
} else if($secim_yapimi_kuponguncelle== "1.Takım Toplam Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran32');
} else if($secim_yapimi_kuponguncelle== "2.Takım Toplam Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran33');
} else if($secim_yapimi_kuponguncelle== "1.Takım 1.Yarı Toplam Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran34');
} else if($secim_yapimi_kuponguncelle== "2.Takım 1.Yarı Toplam Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran35');
} else if($secim_yapimi_kuponguncelle== "1.Yarı Handikap"){
	$secilen_translate = getTranslation('basketboloran36');
} else if($secim_yapimi_kuponguncelle== "2.Yarı Handikap"){
	$secilen_translate = getTranslation('basketboloran37');
} else if($secim_yapimi_kuponguncelle== "1.Çeyrek Handikap"){
	$secilen_translate = getTranslation('basketboloran38');
} else if($secim_yapimi_kuponguncelle== "2.Çeyrek Handikap"){
	$secilen_translate = getTranslation('basketboloran39');
} else if($secim_yapimi_kuponguncelle== "3.Çeyrek Handikap"){
	$secilen_translate = getTranslation('basketboloran40');
} else if($secim_yapimi_kuponguncelle== "4.Çeyrek Handikap"){
	$secilen_translate = getTranslation('basketboloran41');
} else if($secim_yapimi_kuponguncelle== "2.Yarı Toplam Tek/Çift"){
	$secilen_translate = getTranslation('basketboloran42');
} else if($secim_yapimi_kuponguncelle== "2.Çeyrek Toplam Tek/Çift"){
	$secilen_translate = getTranslation('basketboloran43');
} else if($secim_yapimi_kuponguncelle== "3.Çeyrek Toplam Tek/Çift"){
	$secilen_translate = getTranslation('basketboloran44');
} else if($secim_yapimi_kuponguncelle== "4.Çeyrek Toplam Tek/Çift"){
	$secilen_translate = getTranslation('basketboloran45');
} else if($secim_yapimi_kuponguncelle== "Toplam Tek/Çift"){
	$secilen_translate = getTranslation('basketboloran46');
} else if($secim_yapimi_kuponguncelle== "1.Yarı Kim Kazanır"){
	$secilen_translate = getTranslation('basketboloran47');
} else if($secim_yapimi_kuponguncelle== "2.Yarı Kim Kazanır"){
	$secilen_translate = getTranslation('basketboloran48');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

} else if($row['spor_tip']=="canlit") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
	$secilen_translate = getTranslation('tenisoran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahisi"){
	$secilen_translate = getTranslation('tenisoran2');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

} else if($row['spor_tip']=="canliv") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
	$secilen_translate = getTranslation('voleyboloran1');
} else if($secim_yapimi_kuponguncelle=="Set bahisi"){
	$secilen_translate = getTranslation('voleyboloran2');
} else if($secim_yapimi_kuponguncelle=="Toplam Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran3');
} else if($secim_yapimi_kuponguncelle=="5 Set Sürermi ?"){
	$secilen_translate = getTranslation('voleyboloran4');
} else if($secim_yapimi_kuponguncelle=="1.Seti Kim Kazanır ?"){
	$secilen_translate = getTranslation('voleyboloran5');
} else if($secim_yapimi_kuponguncelle=="2.Seti Kim Kazanır ?"){
	$secilen_translate = getTranslation('voleyboloran6');
} else if($secim_yapimi_kuponguncelle=="3.Seti Kim Kazanır ?"){
	$secilen_translate = getTranslation('voleyboloran7');
} else if($secim_yapimi_kuponguncelle=="4.Seti Kim Kazanır ?"){
	$secilen_translate = getTranslation('voleyboloran8');
} else if($secim_yapimi_kuponguncelle=="Set bahisi (5 maç üzerinden)"){
	$secilen_translate = getTranslation('voleyboloran9');
} else if($secim_yapimi_kuponguncelle=="Toplam Kaç Set Oynanır ?"){
	$secilen_translate = getTranslation('voleyboloran10');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Sayı Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran11');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Sayı Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran12');
} else if($secim_yapimi_kuponguncelle=="1.Takım 1.Set Toplam Sayı Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran13');
} else if($secim_yapimi_kuponguncelle=="2.Takım 1.Set Toplam Sayı Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran14');
} else if($secim_yapimi_kuponguncelle=="1.Takım 2.Set Toplam Sayı Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran15');
} else if($secim_yapimi_kuponguncelle=="2.Takım 2.Set Toplam Sayı Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran16');
} else if($secim_yapimi_kuponguncelle=="1.Takım 3.Set Toplam Sayı Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran17');
} else if($secim_yapimi_kuponguncelle=="2.Takım 3.Set Toplam Sayı Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran18');
} else if($secim_yapimi_kuponguncelle=="1.Takım 4.Set Toplam Sayı Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran19');
} else if($secim_yapimi_kuponguncelle=="2.Takım 4.Set Toplam Sayı Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran20');
} else if($secim_yapimi_kuponguncelle=="Toplam Skor Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran21');
} else if($secim_yapimi_kuponguncelle=="Toplam Sayı Tek/Çift"){
	$secilen_translate = getTranslation('voleyboloran22');
} else if($secim_yapimi_kuponguncelle=="1.Set Toplam Sayı Tek/Çift"){
	$secilen_translate = getTranslation('voleyboloran23');
} else if($secim_yapimi_kuponguncelle=="2.Set Toplam Sayı Tek/Çift"){
	$secilen_translate = getTranslation('voleyboloran24');
} else if($secim_yapimi_kuponguncelle=="3.Set Toplam Sayı Tek/Çift"){
	$secilen_translate = getTranslation('voleyboloran25');
} else if($secim_yapimi_kuponguncelle=="4.Set Toplam Sayı Tek/Çift"){
	$secilen_translate = getTranslation('voleyboloran26');
} else if($secim_yapimi_kuponguncelle=="Müsabaka 5.Set Sürermi"){
	$secilen_translate = getTranslation('voleyboloran27');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

} else if($row['spor_tip']=="canlibuz") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
	$secilen_translate = getTranslation('buzhokeyioran1');
} else if($secim_yapimi_kuponguncelle=="1X2"){
	$secilen_translate = getTranslation('buzhokeyioran2');
} else if($secim_yapimi_kuponguncelle=="1.P Maç Sonucu"){
	$secilen_translate = getTranslation('buzhokeyioran3');
} else if($secim_yapimi_kuponguncelle=="2.P Maç Sonucu"){
	$secilen_translate = getTranslation('buzhokeyioran4');
} else if($secim_yapimi_kuponguncelle=="3.P Maç Sonucu"){
	$secilen_translate = getTranslation('buzhokeyioran5');
} else if($secim_yapimi_kuponguncelle=="Cifte Sans"){
	$secilen_translate = getTranslation('buzhokeyioran6');
} else if($secim_yapimi_kuponguncelle=="1.P Çifte Şans"){
	$secilen_translate = getTranslation('buzhokeyioran7');
} else if($secim_yapimi_kuponguncelle=="2.P Çifte Şans"){
	$secilen_translate = getTranslation('buzhokeyioran8');
} else if($secim_yapimi_kuponguncelle=="3.P Çifte Şans"){
	$secilen_translate = getTranslation('buzhokeyioran9');
} else if($secim_yapimi_kuponguncelle=="Hangi periyod daha cok gol olur?"){
	$secilen_translate = getTranslation('buzhokeyioran10');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

} else if($row['spor_tip']=="canlimt") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
	$secilen_translate = getTranslation('masatenisioran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahisi"){
	$secilen_translate = getTranslation('masatenisioran2');
} else if($secim_yapimi_kuponguncelle=="1. ve 2.Seti Kim Kazanır ?"){
	$secilen_translate = getTranslation('masatenisioran3');
} else if($secim_yapimi_kuponguncelle=="2. ve 3.Seti Kim Kazanır ?"){
	$secilen_translate = getTranslation('masatenisioran4');
} else if($secim_yapimi_kuponguncelle=="1.Seti Kim Kazanır"){
	$secilen_translate = getTranslation('masatenisioran5');
} else if($secim_yapimi_kuponguncelle=="Toplam Skor"){
	$secilen_translate = getTranslation('masatenisioran6');
} else if($secim_yapimi_kuponguncelle=="2.Seti Kim Kazanır"){
	$secilen_translate = getTranslation('masatenisioran7');
} else if($secim_yapimi_kuponguncelle=="3.Seti Kim Kazanır"){
	$secilen_translate = getTranslation('masatenisioran8');
} else if($secim_yapimi_kuponguncelle=="4.Seti Kim Kazanır"){
	$secilen_translate = getTranslation('masatenisioran9');
} else if($secim_yapimi_kuponguncelle=="5.Seti Kim Kazanır"){
	$secilen_translate = getTranslation('masatenisioran10');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

}

if($dil_bilgisi22['language']=='en'){

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "Y";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "N";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "U";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "O";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 and O";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 and O";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 and U";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 and U";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 and Y";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 and Y";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 and N";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 and N";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "No Goal";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "X and Y";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "D";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "S";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else if($dil_bilgisi22['language']=='de'){ 

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "J";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "K";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "N";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "T";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 und T";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 und T";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 und N";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 und N";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 und J";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 und J";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 und K";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 und K";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "Kein Ziel";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "X und J";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "P";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "E";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else if($dil_bilgisi22['language']=='ar'){ 

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "أجل";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "لا";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "أدنى";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "أعلى";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 وما فوق";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 وما فوق";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 و السفلى";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 و السفلى";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 و نعم";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 و نعم";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 و لا";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 و لا";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "لا هدف";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "س ونعم";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "زوجان";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "واحد";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else if($dil_bilgisi22['language']=='ru'){ 

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "да";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "нет";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "ниже";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "топ";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 и выше";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 и выше";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 и ниже";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 и ниже";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 и да";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 и да";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 и нет";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 и нет";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "Нет цели";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "Х и да";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "пара";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "один";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

?>

<div class="ticketitem even">
<div class="label date"><?=date("d-m H:i",$row['mac_time']);?></div>
<div class="text">
<span><?=$row['ev_takim'];?> - <?=$row['konuk_takim'];?></span>
<br>
</div>
</div>
<div class="ticketsubitem even pad">
<div class="label"></div>
<div class="text OPEN"><?=$secilen_translate;?>&nbsp;<?=$secilen_translate2;?></div>
<div class="value OPEN"><?=nf($row['oran']);?></div>
</div>
<div class="clear barfinish even"></div>

<? } ?>

<div>
<div>
<div class="bigbutton_wrapper">
<button class="bigbutton" onClick="birle(); sonkupon(1);">
<div class="text"><?=getTranslation('mobilexportkupononaygoruntule11')?></div>
</button>
</div>
</div>
<div></div>
<div style="text-align: center; width: 100%;" class="contentbottom hidden">
<div class="bar arrow" onclick=""> </div>
<div class="contentbottomtext" style="padding-bottom: 50px;"> </div>
</div>
<div class="spacer">&nbsp;</div>
</div>
</div>

<script>
function kupontekraryukle() {
$("#avarey").show();
$("#avarey2").hide();
}
</script>

<?

}

if($a=="kupontemizle") {

sed_sql_query("delete from kupon where session_id='$session_id'");

die("11");

}

if($a=="kuponadetbul") {

$kupon_sayi_sor = sed_sql_query("select * from kupon where session_id='$session_id' order by id asc");
$toplammac = sed_sql_numrows($kupon_sayi_sor);
if($toplammac>0){
print $toplammac;
}else{
print "0";
}

}

if($a=="kuponguncelle") {

if(userayar('sistemkapat')=="1" || userayar('kuponalim')=="0") { die("<div class='bos'>".getTranslation('sistemdebahislerkapali')."</div>"); }

$oran = 1;

$sor = sed_sql_query("select * from kupon where session_id='$session_id' order by id asc");

$toplammac = sed_sql_numrows($sor);

if(sed_sql_numrows($sor)<1) {

$bos = 1;

?>

<div class="">
<div class="space_2">&nbsp;</div>
<div class="msgtext msgtextbg scrollTo">
<div class="icons msg_warning"></div>
<div class="hidden"></div>
<div class="hidden"></div>
<div class="text"><?=getTranslation('mobilexportkuponguncelle1')?></div>
</div>
<div class=""></div>
</div>

<div class="">
<div class="space_2">&nbsp;</div>
<div class="msgtext msgtextbg scrollTo" onClick="sonkupon(1);">
<div class="icons msg_success" style="margin-left: -28px;"></div>
<div class="hidden"></div>
<div class="hidden"></div>
<div class="text"><?=getTranslation('mobilexportkuponguncelle2')?></div>
</div>
<div class=""></div>
</div>

<? } else { ?>

<div id="kuponheaders" class="">
<div class="edtitle bartitle">
<div class="text" id="cbetnum"><?=$toplammac;?> <?=getTranslation('mobilexportkuponguncelle3')?></div>
<div class="value clearValue" id="sistemm1" onclick="clearEditor()"> <div class="text"><?=getTranslation('mobilexportkuponguncelle4')?></div></div>
</div>
</div>

<div id="kuponuma">
<div class="hidden" onclick="javascript:;"></div>

<? 
while($row=sed_sql_fetcharray($sor)) {

$ob = explode("|",$row['oran_tip']);
if($row['spor_tip']=="canli" || $row['spor_tip']=="canlib" || $row['spor_tip']=="canlit" || $row['spor_tip']=="canliv" || $row['spor_tip']=="canlibuz" || $row['spor_tip']=="canlimt") { $canlivar=1; } 
$oran = $oran*$row['oran'];

$secim_yapimi_kuponguncelle = $ob[0];
$secim_yapimi_kuponguncelle2 = $ob[1];

if($row['spor_tip']=="futbol") {

if($secim_yapimi_kuponguncelle=="1X2"){
	$secilen_translate = getTranslation('futboloran1');
} else if($secim_yapimi_kuponguncelle=="Handikap (0:1)"){
	$secilen_translate = getTranslation('futboloran2');
} else if($secim_yapimi_kuponguncelle=="Handikap (1:0)"){
	$secilen_translate = getTranslation('futboloran3');
} else if($secim_yapimi_kuponguncelle=="Handikap (0:2)"){
	$secilen_translate = getTranslation('futboloran4');
} else if($secim_yapimi_kuponguncelle=="Handikap (2:0)"){
	$secilen_translate = getTranslation('futboloran5');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 1.YARI )"){
	$secilen_translate = getTranslation('futboloran6');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 2.YARI )"){
	$secilen_translate = getTranslation('futboloran7');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Çifte Şans"){
	$secilen_translate = getTranslation('futboloran8');
} else if($secim_yapimi_kuponguncelle=="1.YARI KG"){
	$secilen_translate = getTranslation('futboloran9');
} else if($secim_yapimi_kuponguncelle=="Beraberlikte İade"){
	$secilen_translate = getTranslation('futboloran10');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 0.5"){
	$secilen_translate = getTranslation('futboloran11');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 1.5"){
	$secilen_translate = getTranslation('futboloran12');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 2.5"){
	$secilen_translate = getTranslation('futboloran13');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 3.5"){
	$secilen_translate = getTranslation('futboloran14');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 4.5"){
	$secilen_translate = getTranslation('futboloran15');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 5.5"){
	$secilen_translate = getTranslation('futboloran16');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 0.5"){
	$secilen_translate = getTranslation('futboloran18');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 1.5"){
	$secilen_translate = getTranslation('futboloran19');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 2.5"){
	$secilen_translate = getTranslation('futboloran20');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 3.5"){
	$secilen_translate = getTranslation('futboloran21');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 0.5"){
	$secilen_translate = getTranslation('futboloran22');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 1.5"){
	$secilen_translate = getTranslation('futboloran23');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 2.5"){
	$secilen_translate = getTranslation('futboloran24');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 3.5"){
	$secilen_translate = getTranslation('futboloran25');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Gol Atarmı ?"){
	$secilen_translate = getTranslation('futboloran26');
} else if($secim_yapimi_kuponguncelle=="Deplasman Gol Atarmı ?"){
	$secilen_translate = getTranslation('futboloran27');
} else if($secim_yapimi_kuponguncelle=="Karşılıklı Gol"){
	$secilen_translate = getTranslation('futboloran28');
} else if($secim_yapimi_kuponguncelle=="​​​​​​​​​​1.Yarı Tek/Çift"){
	$secilen_translate = getTranslation('futboloran29');
} else if($secim_yapimi_kuponguncelle=="Tek/Çift"){
	$secilen_translate = getTranslation('futboloran30');
} else if($secim_yapimi_kuponguncelle=="Evsahibi Kaç Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran31');
} else if($secim_yapimi_kuponguncelle=="Deplasman Kaç Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran32');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı Kaç Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran33');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 2.Yarı Kaç Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran34');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı Kaç Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran35');
} else if($secim_yapimi_kuponguncelle=="Deplasman 2.Yarı Kaç Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran36');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı A/Ü 0.5"){
	$secilen_translate = getTranslation('futboloran37');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı A/Ü 1.5"){
	$secilen_translate = getTranslation('futboloran38');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı A/Ü 0.5"){
	$secilen_translate = getTranslation('futboloran39');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı A/Ü 1.5"){
	$secilen_translate = getTranslation('futboloran40');
} else if($secim_yapimi_kuponguncelle=="Evsahibi A/Ü 1.5"){
	$secilen_translate = getTranslation('futboloran41');
} else if($secim_yapimi_kuponguncelle=="Deplasman A/Ü 1.5"){
	$secilen_translate = getTranslation('futboloran42');
} else if($secim_yapimi_kuponguncelle=="​​​​​Evsahibi Her 2 yarıda Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran43');
} else if($secim_yapimi_kuponguncelle=="Deplasman Her 2 yarıda Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran44');
} else if($secim_yapimi_kuponguncelle=="Hangi Devrede Fazla Gol Olur"){
	$secilen_translate = getTranslation('futboloran45');
} else if($secim_yapimi_kuponguncelle=="Evsahibi Hangi Devrede Fazla Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran46');
} else if($secim_yapimi_kuponguncelle=="Deplasman Hangi Devrede Fazla Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran47');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-4+)"){
	$secilen_translate = getTranslation('futboloran48');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-5+)"){
	$secilen_translate = getTranslation('futboloran49');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-6+)"){
	$secilen_translate = getTranslation('futboloran50');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 1 gol farkla kazanır mı?"){
	$secilen_translate = getTranslation('futboloran51');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 2 gol farkla kazanır mı?"){
	$secilen_translate = getTranslation('futboloran52');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 3 gol farkla kazanır mı?"){
	$secilen_translate = getTranslation('futboloran53');
} else if($secim_yapimi_kuponguncelle=="1X2 ve toplam gol sayısı 2.5"){
	$secilen_translate = getTranslation('futboloran54');
} else if($secim_yapimi_kuponguncelle=="Maç sonucu ve karşılıklı goller"){
	$secilen_translate = getTranslation('futboloran55');
} else if($secim_yapimi_kuponguncelle=="İlk Yarı / Maç Sonucu"){
	$secilen_translate = getTranslation('futboloran56');
} else if($secim_yapimi_kuponguncelle=="Skor Bahsi (90 Dakika)"){
	$secilen_translate = getTranslation('futboloran57');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
	$secilen_translate = getTranslation('futboloran58');
} else if($secim_yapimi_kuponguncelle=="Toplam Sari Kart Alt/Üst 3.5"){
	$secilen_translate = getTranslation('futboloran59');
} else if($secim_yapimi_kuponguncelle=="Kirmizi kart cikar mi?"){
	$secilen_translate = getTranslation('futboloran60');
} else if($secim_yapimi_kuponguncelle=="Macta kac tane penalti olur?"){
	$secilen_translate = getTranslation('futboloran61');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 1.5"){
	$secilen_translate = getTranslation('futboloran62');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 2.5"){
	$secilen_translate = getTranslation('futboloran63');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 3.5"){
	$secilen_translate = getTranslation('futboloran64');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 1.5"){
	$secilen_translate = getTranslation('futboloran65');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 2.5"){
	$secilen_translate = getTranslation('futboloran66');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 3.5"){
	$secilen_translate = getTranslation('futboloran67');
} else if($secim_yapimi_kuponguncelle=="Sarı Kart Toplam Tek/Çift"){
	$secilen_translate = getTranslation('futboloran68');
} else if($secim_yapimi_kuponguncelle=="Hangi Takım Çok Sarı Kart Yer ?"){
	$secilen_translate = getTranslation('futboloran69');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 5.5"){
	$secilen_translate = getTranslation('futboloran70');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 6.5"){
	$secilen_translate = getTranslation('futboloran71');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 7.5"){
	$secilen_translate = getTranslation('futboloran72');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 8.5"){
	$secilen_translate = getTranslation('futboloran73');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 9.5"){
	$secilen_translate = getTranslation('futboloran74');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 10.5"){
	$secilen_translate = getTranslation('futboloran75');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 11.5"){
	$secilen_translate = getTranslation('futboloran76');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 12.5"){
	$secilen_translate = getTranslation('futboloran77');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 13.5"){
	$secilen_translate = getTranslation('futboloran78');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 14.5"){
	$secilen_translate = getTranslation('futboloran79');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 15.5"){
	$secilen_translate = getTranslation('futboloran80');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 2.5"){
	$secilen_translate = getTranslation('futboloran81');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 3.5"){
	$secilen_translate = getTranslation('futboloran82');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 4.5"){
	$secilen_translate = getTranslation('futboloran83');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 5.5"){
	$secilen_translate = getTranslation('futboloran84');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 6.5"){
	$secilen_translate = getTranslation('futboloran85');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 7.5"){
	$secilen_translate = getTranslation('futboloran86');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 8.5"){
	$secilen_translate = getTranslation('futboloran87');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 9.5"){
	$secilen_translate = getTranslation('futboloran88');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 10.5"){
	$secilen_translate = getTranslation('futboloran89');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 2.5"){
	$secilen_translate = getTranslation('futboloran90');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 3.5"){
	$secilen_translate = getTranslation('futboloran91');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 4.5"){
	$secilen_translate = getTranslation('futboloran92');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 5.5"){
	$secilen_translate = getTranslation('futboloran93');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 6.5"){
	$secilen_translate = getTranslation('futboloran94');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 7.5"){
	$secilen_translate = getTranslation('futboloran95');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 8.5"){
	$secilen_translate = getTranslation('futboloran96');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 9.5"){
	$secilen_translate = getTranslation('futboloran97');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 10.5"){
	$secilen_translate = getTranslation('futboloran98');
} else if($secim_yapimi_kuponguncelle=="Korner Toplam Tek/Çift"){
	$secilen_translate = getTranslation('futboloran99');
} else if($secim_yapimi_kuponguncelle=="Hangi Takım Çok Korner Kullanır ?"){
	$secilen_translate = getTranslation('futboloran100');
} else if($secim_yapimi_kuponguncelle=="1X2 ve toplam gol sayısı 3.5"){
	$secilen_translate = getTranslation('futboloran101');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

} else if($row['spor_tip']=="basketbol") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ? (Uz. Dahil)"){
	$secilen_translate = getTranslation('basketboloran1');
} else if($secim_yapimi_kuponguncelle=="1X2 (Uz. Hariç)"){
	$secilen_translate = getTranslation('basketboloran2');
} else if($secim_yapimi_kuponguncelle== "1X2 ( 1.YARI )"){
	$secilen_translate = getTranslation('basketboloran3');
} else if($secim_yapimi_kuponguncelle== "Toplam Skor Tek/Çift"){
	$secilen_translate = getTranslation('basketboloran4');
} else if($secim_yapimi_kuponguncelle== "Toplam Skor Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran5');
} else if($secim_yapimi_kuponguncelle== "Handikap ( 1.YARI )"){
	$secilen_translate = getTranslation('basketboloran6');
} else if($secim_yapimi_kuponguncelle== "Handikap"){
	$secilen_translate = getTranslation('basketboloran7');
} else if($secim_yapimi_kuponguncelle== "1.Yarı / MS"){
	$secilen_translate = getTranslation('basketboloran8');
} else if($secim_yapimi_kuponguncelle== "İki Devrede Kazanır"){
	$secilen_translate = getTranslation('basketboloran9');
} else if($secim_yapimi_kuponguncelle== "Tüm Periyotları Kazanır"){
	$secilen_translate = getTranslation('basketboloran10');
} else if($secim_yapimi_kuponguncelle== "1.Takım İY Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran11');
} else if($secim_yapimi_kuponguncelle== "2.Takım İY Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran12');
} else if($secim_yapimi_kuponguncelle== "1.Takım Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran13');
} else if($secim_yapimi_kuponguncelle== "2.Takım Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran14');
} else if($secim_yapimi_kuponguncelle== "1.Takım 1.Çeyrek Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran15');
} else if($secim_yapimi_kuponguncelle== "2.Takım 1.Çeyrek Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran16');
} else if($secim_yapimi_kuponguncelle== "1.Çeyrek Kim Kazanır"){
	$secilen_translate = getTranslation('basketboloran17');
} else if($secim_yapimi_kuponguncelle== "1.Çeyrek Toplam Tek/Çift"){
	$secilen_translate = getTranslation('basketboloran18');
} else if($secim_yapimi_kuponguncelle== "1.Yarı Toplam Tek/Çift"){
	$secilen_translate = getTranslation('basketboloran19');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

}  else if($row['spor_tip']=="tenis") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ?"){
	$secilen_translate = getTranslation('tenisoran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahsi"){
	$secilen_translate = getTranslation('tenisoran2');
} else if($secim_yapimi_kuponguncelle=="1.Seti Kim Kazanır ?"){
	$secilen_translate = getTranslation('tenisoran3');
} else if($secim_yapimi_kuponguncelle=="2.Seti Kim Kazanır ?"){
	$secilen_translate = getTranslation('tenisoran4');
} else if($secim_yapimi_kuponguncelle=="1.Oyuncu 1 Set Kazanır"){
	$secilen_translate = getTranslation('tenisoran5');
} else if($secim_yapimi_kuponguncelle=="2.Oyuncu 1 Set Kazanır"){
	$secilen_translate = getTranslation('tenisoran6');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

} else if($row['spor_tip']=="voleybol") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ?"){
	$secilen_translate = getTranslation('voleyboloran1');
} else if($secim_yapimi_kuponguncelle=="Set bahisi"){
	$secilen_translate = getTranslation('voleyboloran2');
} else if($secim_yapimi_kuponguncelle=="Toplam Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran3');
} else if($secim_yapimi_kuponguncelle=="5 Set Sürermi ?"){
	$secilen_translate = getTranslation('voleyboloran4');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

} else if($row['spor_tip']=="buzhokeyi") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
	$secilen_translate = getTranslation('buzhokeyioran1');
} else if($secim_yapimi_kuponguncelle=="1X2"){
	$secilen_translate = getTranslation('buzhokeyioran2');
} else if($secim_yapimi_kuponguncelle=="1.P 1X2"){
	$secilen_translate = getTranslation('buzhokeyioran3');
} else if($secim_yapimi_kuponguncelle=="2.P 1X2"){
	$secilen_translate = getTranslation('buzhokeyioran4');
} else if($secim_yapimi_kuponguncelle=="3.P 1X2"){
	$secilen_translate = getTranslation('buzhokeyioran5');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
	$secilen_translate = getTranslation('buzhokeyioran6');
} else if($secim_yapimi_kuponguncelle=="1.P Çifte Şans"){
	$secilen_translate = getTranslation('buzhokeyioran7');
} else if($secim_yapimi_kuponguncelle=="2.P Çifte Şans"){
	$secilen_translate = getTranslation('buzhokeyioran8');
} else if($secim_yapimi_kuponguncelle=="3.P Çifte Şans"){
	$secilen_translate = getTranslation('buzhokeyioran9');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

} else if($row['spor_tip']=="masatenisi") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
	$secilen_translate = getTranslation('masatenisioran1');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

} else if($row['spor_tip']=="rugby") {

if($secim_yapimi_kuponguncelle=="1X2"){
	$secilen_translate = getTranslation('rugbyoran1');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

} else if($row['spor_tip']=="beyzbol") {

$secilen_translate = $secim_yapimi_kuponguncelle;

} else if($row['spor_tip']=="dovus") {

$secilen_translate = $secim_yapimi_kuponguncelle;

} else if($row['spor_tip']=="canli") {

if($secim_yapimi_kuponguncelle=="1X2"){
	$secilen_translate = getTranslation('futboloran1');
} else if($secim_yapimi_kuponguncelle=="Handikap 0:1"){
	$secilen_translate = getTranslation('futboloran2');
} else if($secim_yapimi_kuponguncelle=="Handikap 1:0"){
	$secilen_translate = getTranslation('futboloran3');
} else if($secim_yapimi_kuponguncelle=="Handikap 0:2"){
	$secilen_translate = getTranslation('futboloran4');
} else if($secim_yapimi_kuponguncelle=="Handikap 2:0"){
	$secilen_translate = getTranslation('futboloran5');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Sonucu"){
	$secilen_translate = getTranslation('futboloran6');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Sonucu"){
	$secilen_translate = getTranslation('futboloran7');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Çifte Şans"){
	$secilen_translate = getTranslation('futboloran8');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Karşılıklı Gol"){
	$secilen_translate = getTranslation('futboloran9');
} else if($secim_yapimi_kuponguncelle=="Beraberlikte İade"){
	$secilen_translate = getTranslation('futboloran10');
} else if($secim_yapimi_kuponguncelle=="Toplam 0.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran11');
} else if($secim_yapimi_kuponguncelle=="Toplam 1.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran12');
} else if($secim_yapimi_kuponguncelle=="Toplam 2.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran13');
} else if($secim_yapimi_kuponguncelle=="Toplam 3.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran14');
} else if($secim_yapimi_kuponguncelle=="Toplam 4.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran15');
} else if($secim_yapimi_kuponguncelle=="Toplam 5.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran16');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 0.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran18');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 1.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran19');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 2.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran20');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol 3.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran21');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 0.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran22');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 1.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran23');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 2.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran24');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 3.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran25');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Müsabakada Gol Atarmı ?"){
	$secilen_translate = getTranslation('futboloran26');
} else if($secim_yapimi_kuponguncelle=="Deplasman Müsabakada Gol Atarmı ?"){
	$secilen_translate = getTranslation('futboloran27');
} else if($secim_yapimi_kuponguncelle=="Karşılıklı Gol Olurmu ?"){
	$secilen_translate = getTranslation('futboloran28');
} else if($secim_yapimi_kuponguncelle=="​​​​​1.Yarı Tek / Çift"){
	$secilen_translate = getTranslation('futboloran29');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Tek / Çift"){
	$secilen_translate = getTranslation('futboloran30');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Toplam Kaç Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran31');
} else if($secim_yapimi_kuponguncelle=="Deplasman Toplam Kaç Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran32');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi İlk Yarı Tam Gol Sayısı"){
	$secilen_translate = getTranslation('futboloran33');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi İkinci Yarı Tam Gol Sayısı"){
	$secilen_translate = getTranslation('futboloran34');
} else if($secim_yapimi_kuponguncelle=="Deplasman İlk Yarı Tam Gol Sayısı"){
	$secilen_translate = getTranslation('futboloran35');
} else if($secim_yapimi_kuponguncelle=="Deplasman İkinci Yarı Tam Gol Sayısı"){
	$secilen_translate = getTranslation('futboloran36');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 0.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran37');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 1.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran38');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 0.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran39');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 1.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran40');
} else if($secim_yapimi_kuponguncelle=="Evsahibi Toplam 1.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran41');
} else if($secim_yapimi_kuponguncelle=="Deplasman Toplam 1.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran42');
} else if($secim_yapimi_kuponguncelle=="​​​​​Evsahibi Her 2 yarıda Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran43');
} else if($secim_yapimi_kuponguncelle=="Deplasman Her 2 yarıda Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran44');
} else if($secim_yapimi_kuponguncelle=="Hangi Devrede Fazla Gol Olur"){
	$secilen_translate = getTranslation('futboloran45');
} else if($secim_yapimi_kuponguncelle=="Evsahibi Hangi Devrede Fazla Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran46');
} else if($secim_yapimi_kuponguncelle=="Deplasman Hangi Devrede Fazla Gol Atar ?"){
	$secilen_translate = getTranslation('futboloran47');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-4)"){
	$secilen_translate = getTranslation('futboloran48');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-5)"){
	$secilen_translate = getTranslation('futboloran49');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-6)"){
	$secilen_translate = getTranslation('futboloran50');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 1 Gol Farkla Kazanirmi ?"){
	$secilen_translate = getTranslation('futboloran51');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 2 Gol Farkla Kazanirmi ?"){
	$secilen_translate = getTranslation('futboloran52');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 3 Gol Farkla Kazanirmi ?"){
	$secilen_translate = getTranslation('futboloran53');
} else if($secim_yapimi_kuponguncelle=="Maç Sonucu ve 2.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran54');
} else if($secim_yapimi_kuponguncelle=="Maç Sonucu ve Karşılıklı Gol"){
	$secilen_translate = getTranslation('futboloran55');
} else if($secim_yapimi_kuponguncelle=="İlk Yarı / Maç Sonucu"){
	$secilen_translate = getTranslation('futboloran56');
} else if($secim_yapimi_kuponguncelle=="Maç Skoru"){
	$secilen_translate = getTranslation('futboloran57');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
	$secilen_translate = getTranslation('futboloran58');
} else if($secim_yapimi_kuponguncelle=="Toplam Sarı Kart 3.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran59');
} else if($secim_yapimi_kuponguncelle=="Kırmızı Kart Çıkar mı?"){
	$secilen_translate = getTranslation('futboloran60');
} else if($secim_yapimi_kuponguncelle=="Maçta Kaç Tane Penaltı Olur ?"){
	$secilen_translate = getTranslation('futboloran61');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart 1.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran62');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart 2.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran63');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart 3.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran64');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart 1.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran65');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart 2.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran66');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart 3.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran67');
} else if($secim_yapimi_kuponguncelle=="Sarı Kart Toplam Tek/Çift"){
	$secilen_translate = getTranslation('futboloran68');
} else if($secim_yapimi_kuponguncelle=="Hangi Takım Çok Sarı Kart Yer ?"){
	$secilen_translate = getTranslation('futboloran69');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner 5.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran70');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner 6.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran71');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner 7.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran72');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner 8.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran73');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner 9.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran74');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner 10.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran75');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner 11.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran76');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner 12.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran77');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner 13.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran78');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner 14.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran79');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner 15.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran80');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 2.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran81');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 3.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran82');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 4.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran83');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 5.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran84');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 6.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran85');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 7.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran86');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 8.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran87');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 9.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran88');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 10.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran89');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 2.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran90');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 3.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran91');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 4.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran92');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 5.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran93');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 6.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran94');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 7.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran95');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 8.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran96');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 9.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran97');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 10.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran98');
} else if($secim_yapimi_kuponguncelle=="Korner Tek/Çift"){
	$secilen_translate = getTranslation('futboloran99');
} else if($secim_yapimi_kuponguncelle=="Hangi Takım Çok Korner Kullanır ?"){
	$secilen_translate = getTranslation('futboloran100');
} else if($secim_yapimi_kuponguncelle=="Maç Sonucu ve 3.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran101');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 0.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran102');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran103');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 2.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran104');
} else if($secim_yapimi_kuponguncelle=="Deplasman 0.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran105');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran106');
} else if($secim_yapimi_kuponguncelle=="Deplasman 2.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran107');
} else if($secim_yapimi_kuponguncelle=="Toplam Kaç Gol Atılır ?"){
	$secilen_translate = getTranslation('futboloran108');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Skoru"){
	$secilen_translate = getTranslation('futboloran109');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 2.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran110');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 2.5 Gol Alt Üst"){
	$secilen_translate = getTranslation('futboloran111');
} else if($secim_yapimi_kuponguncelle=="İlk Yarıda Kaç Gol Olur ?"){
	$secilen_translate = getTranslation('futboloran112');
} else if($secim_yapimi_kuponguncelle=="2.Yarıda Toplam Kaç Gol Olur ?"){
	$secilen_translate = getTranslation('futboloran113');
} else if($secim_yapimi_kuponguncelle=="1. yarıda 1.golü hangi takım atar?"){
	$secilen_translate = getTranslation('futboloran114');
} else if($secim_yapimi_kuponguncelle=="1. yarıda 2.golü hangi takım atar?"){
	$secilen_translate = getTranslation('futboloran115');
} else if($secim_yapimi_kuponguncelle=="1.golü hangi takım atar?"){
	$secilen_translate = getTranslation('futboloran116');
} else if($secim_yapimi_kuponguncelle=="2.golü hangi takım atar?"){
	$secilen_translate = getTranslation('futboloran117');
} else if($secim_yapimi_kuponguncelle=="3.golü hangi takım atar?"){
	$secilen_translate = getTranslation('futboloran118');
} else if($secim_yapimi_kuponguncelle=="4.golü hangi takım atar?"){
	$secilen_translate = getTranslation('futboloran119');
} else if($secim_yapimi_kuponguncelle=="5.golü hangi takım atar?"){
	$secilen_translate = getTranslation('futboloran120');
} else if($secim_yapimi_kuponguncelle=="6.golü hangi takım atar?"){
	$secilen_translate = getTranslation('futboloran121');
} else if($secim_yapimi_kuponguncelle=="Toplam Sarı Kart 1.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran122');
} else if($secim_yapimi_kuponguncelle=="Toplam Sarı Kart 2.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran123');
} else if($secim_yapimi_kuponguncelle=="Toplam Sarı Kart 4.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran124');
} else if($secim_yapimi_kuponguncelle=="Kırmızı Kart Çıkarmı ?"){
	$secilen_translate = getTranslation('futboloran125');
} else if($secim_yapimi_kuponguncelle=="Kaç Penaltı Olur ?"){
	$secilen_translate = getTranslation('futboloran126');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Sarı Kart 1.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran127');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Sarı Kart 2.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran128');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Sarı Kart 3.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran129');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Sarı Kart 1.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran130');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Sarı Kart 2.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran131');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Sarı Kart 3.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran132');
} else if($secim_yapimi_kuponguncelle=="Sarı Kart Tek/Çift"){
	$secilen_translate = getTranslation('futboloran133');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 2.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran134');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 3.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran135');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 4.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran136');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 5.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran137');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 6.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran138');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 7.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran139');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 8.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran140');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 9.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran141');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Korner 10.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran142');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 2.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran143');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 3.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran144');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 4.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran145');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 5.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran146');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 6.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran147');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 7.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran148');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 8.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran149');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 9.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran150');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Korner 10.5 Alt/Üst"){
	$secilen_translate = getTranslation('futboloran151');
} else if($secim_yapimi_kuponguncelle=="Korner Tek/Çift"){
	$secilen_translate = getTranslation('futboloran152');
} else if($secim_yapimi_kuponguncelle=="Hangi Takım Daha Çok Korner Kullanır ?"){
	$secilen_translate = getTranslation('futboloran153');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:0-0"){
	$secilen_translate = getTranslation('futboloran154');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:1-0"){
	$secilen_translate = getTranslation('futboloran155');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:0-1"){
	$secilen_translate = getTranslation('futboloran156');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:1-1"){
	$secilen_translate = getTranslation('futboloran157');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:2-0"){
	$secilen_translate = getTranslation('futboloran158');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:0-2"){
	$secilen_translate = getTranslation('futboloran159');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:2-1"){
	$secilen_translate = getTranslation('futboloran160');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:1-2"){
	$secilen_translate = getTranslation('futboloran161');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:3-0"){
	$secilen_translate = getTranslation('futboloran162');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:0-3"){
	$secilen_translate = getTranslation('futboloran163');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:2-2"){
	$secilen_translate = getTranslation('futboloran164');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:1-3"){
	$secilen_translate = getTranslation('futboloran165');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:4-0"){
	$secilen_translate = getTranslation('futboloran166');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:5-0"){
	$secilen_translate = getTranslation('futboloran167');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:4-1"){
	$secilen_translate = getTranslation('futboloran168');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:3-2"){
	$secilen_translate = getTranslation('futboloran169');
} else if($secim_yapimi_kuponguncelle=="Kalan Süre Tahmini - skor:3-3"){
	$secilen_translate = getTranslation('futboloran170');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

} else if($row['spor_tip']=="canlib") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır (Uz. Dahil)"){
	$secilen_translate = getTranslation('basketboloran1');
} else if($secim_yapimi_kuponguncelle=="1X2 (Uz. Hariç)"){
	$secilen_translate = getTranslation('basketboloran2');
} else if($secim_yapimi_kuponguncelle== "1X2(1.YARI)"){
	$secilen_translate = getTranslation('basketboloran3');
} else if($secim_yapimi_kuponguncelle== "Toplam Skor Tek/Çift"){
	$secilen_translate = getTranslation('basketboloran4');
} else if($secim_yapimi_kuponguncelle== "Toplam Skor Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran5');
} else if($secim_yapimi_kuponguncelle== "Handikap ( 1.YARI )"){
	$secilen_translate = getTranslation('basketboloran6');
} else if($secim_yapimi_kuponguncelle== "Handikap"){
	$secilen_translate = getTranslation('basketboloran7');
} else if($secim_yapimi_kuponguncelle== "1.Yarı / Maç Sonucu"){
	$secilen_translate = getTranslation('basketboloran8');
} else if($secim_yapimi_kuponguncelle== "İki Devrede Kazanır"){
	$secilen_translate = getTranslation('basketboloran9');
} else if($secim_yapimi_kuponguncelle== "Tüm Periyotları Kazanır"){
	$secilen_translate = getTranslation('basketboloran10');
} else if($secim_yapimi_kuponguncelle== "1.Takım 1.Yarı Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran11');
} else if($secim_yapimi_kuponguncelle== "2.Takım 1.Yarı Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran12');
} else if($secim_yapimi_kuponguncelle== "1.Takım Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran13');
} else if($secim_yapimi_kuponguncelle== "2.Takım Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran14');
} else if($secim_yapimi_kuponguncelle== "1.Takım 1.Çeyrek Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran15');
} else if($secim_yapimi_kuponguncelle== "2.Takım 1.Çeyrek Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran16');
} else if($secim_yapimi_kuponguncelle== "1.Çeyrek Kim Kazanır"){
	$secilen_translate = getTranslation('basketboloran17');
} else if($secim_yapimi_kuponguncelle== "1.Çeyrek Toplam Tek/Çift"){
	$secilen_translate = getTranslation('basketboloran18');
} else if($secim_yapimi_kuponguncelle== "1.Yarı Toplam Tek/Çift"){
	$secilen_translate = getTranslation('basketboloran19');
} else if($secim_yapimi_kuponguncelle== "1X2(2.YARI)"){
	$secilen_translate = getTranslation('basketboloran20');
} else if($secim_yapimi_kuponguncelle== "1X2(1.Çeyrek)"){
	$secilen_translate = getTranslation('basketboloran21');
} else if($secim_yapimi_kuponguncelle== "1X2(2.Çeyrek)"){
	$secilen_translate = getTranslation('basketboloran22');
} else if($secim_yapimi_kuponguncelle== "1X2(3.Çeyrek)"){
	$secilen_translate = getTranslation('basketboloran23');
} else if($secim_yapimi_kuponguncelle== "1X2(4.Çeyrek)"){
	$secilen_translate = getTranslation('basketboloran24');
} else if($secim_yapimi_kuponguncelle== "2.Çeyrek Kim Kazanır"){
	$secilen_translate = getTranslation('basketboloran25');
} else if($secim_yapimi_kuponguncelle== "3.Çeyrek Kim Kazanır"){
	$secilen_translate = getTranslation('basketboloran26');
} else if($secim_yapimi_kuponguncelle== "4.Çeyrek Kim Kazanır"){
	$secilen_translate = getTranslation('basketboloran27');
} else if($secim_yapimi_kuponguncelle== "1.Çeyrek Toplam Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran28');
} else if($secim_yapimi_kuponguncelle== "2.Çeyrek Toplam Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran29');
} else if($secim_yapimi_kuponguncelle== "3.Çeyrek Toplam Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran30');
} else if($secim_yapimi_kuponguncelle== "4.Çeyrek Toplam Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran31');
} else if($secim_yapimi_kuponguncelle== "1.Takım Toplam Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran32');
} else if($secim_yapimi_kuponguncelle== "2.Takım Toplam Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran33');
} else if($secim_yapimi_kuponguncelle== "1.Takım 1.Yarı Toplam Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran34');
} else if($secim_yapimi_kuponguncelle== "2.Takım 1.Yarı Toplam Alt/Üst"){
	$secilen_translate = getTranslation('basketboloran35');
} else if($secim_yapimi_kuponguncelle== "1.Yarı Handikap"){
	$secilen_translate = getTranslation('basketboloran36');
} else if($secim_yapimi_kuponguncelle== "2.Yarı Handikap"){
	$secilen_translate = getTranslation('basketboloran37');
} else if($secim_yapimi_kuponguncelle== "1.Çeyrek Handikap"){
	$secilen_translate = getTranslation('basketboloran38');
} else if($secim_yapimi_kuponguncelle== "2.Çeyrek Handikap"){
	$secilen_translate = getTranslation('basketboloran39');
} else if($secim_yapimi_kuponguncelle== "3.Çeyrek Handikap"){
	$secilen_translate = getTranslation('basketboloran40');
} else if($secim_yapimi_kuponguncelle== "4.Çeyrek Handikap"){
	$secilen_translate = getTranslation('basketboloran41');
} else if($secim_yapimi_kuponguncelle== "2.Yarı Toplam Tek/Çift"){
	$secilen_translate = getTranslation('basketboloran42');
} else if($secim_yapimi_kuponguncelle== "2.Çeyrek Toplam Tek/Çift"){
	$secilen_translate = getTranslation('basketboloran43');
} else if($secim_yapimi_kuponguncelle== "3.Çeyrek Toplam Tek/Çift"){
	$secilen_translate = getTranslation('basketboloran44');
} else if($secim_yapimi_kuponguncelle== "4.Çeyrek Toplam Tek/Çift"){
	$secilen_translate = getTranslation('basketboloran45');
} else if($secim_yapimi_kuponguncelle== "Toplam Tek/Çift"){
	$secilen_translate = getTranslation('basketboloran46');
} else if($secim_yapimi_kuponguncelle== "1.Yarı Kim Kazanır"){
	$secilen_translate = getTranslation('basketboloran47');
} else if($secim_yapimi_kuponguncelle== "2.Yarı Kim Kazanır"){
	$secilen_translate = getTranslation('basketboloran48');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

} else if($row['spor_tip']=="canlit") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
	$secilen_translate = getTranslation('tenisoran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahisi"){
	$secilen_translate = getTranslation('tenisoran2');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

} else if($row['spor_tip']=="canliv") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
	$secilen_translate = getTranslation('voleyboloran1');
} else if($secim_yapimi_kuponguncelle=="Set bahisi"){
	$secilen_translate = getTranslation('voleyboloran2');
} else if($secim_yapimi_kuponguncelle=="Toplam Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran3');
} else if($secim_yapimi_kuponguncelle=="5 Set Sürermi ?"){
	$secilen_translate = getTranslation('voleyboloran4');
} else if($secim_yapimi_kuponguncelle=="1.Seti Kim Kazanır ?"){
	$secilen_translate = getTranslation('voleyboloran5');
} else if($secim_yapimi_kuponguncelle=="2.Seti Kim Kazanır ?"){
	$secilen_translate = getTranslation('voleyboloran6');
} else if($secim_yapimi_kuponguncelle=="3.Seti Kim Kazanır ?"){
	$secilen_translate = getTranslation('voleyboloran7');
} else if($secim_yapimi_kuponguncelle=="4.Seti Kim Kazanır ?"){
	$secilen_translate = getTranslation('voleyboloran8');
} else if($secim_yapimi_kuponguncelle=="Set bahisi (5 maç üzerinden)"){
	$secilen_translate = getTranslation('voleyboloran9');
} else if($secim_yapimi_kuponguncelle=="Toplam Kaç Set Oynanır ?"){
	$secilen_translate = getTranslation('voleyboloran10');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Sayı Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran11');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Sayı Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran12');
} else if($secim_yapimi_kuponguncelle=="1.Takım 1.Set Toplam Sayı Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran13');
} else if($secim_yapimi_kuponguncelle=="2.Takım 1.Set Toplam Sayı Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran14');
} else if($secim_yapimi_kuponguncelle=="1.Takım 2.Set Toplam Sayı Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran15');
} else if($secim_yapimi_kuponguncelle=="2.Takım 2.Set Toplam Sayı Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran16');
} else if($secim_yapimi_kuponguncelle=="1.Takım 3.Set Toplam Sayı Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran17');
} else if($secim_yapimi_kuponguncelle=="2.Takım 3.Set Toplam Sayı Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran18');
} else if($secim_yapimi_kuponguncelle=="1.Takım 4.Set Toplam Sayı Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran19');
} else if($secim_yapimi_kuponguncelle=="2.Takım 4.Set Toplam Sayı Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran20');
} else if($secim_yapimi_kuponguncelle=="Toplam Skor Alt/Üst"){
	$secilen_translate = getTranslation('voleyboloran21');
} else if($secim_yapimi_kuponguncelle=="Toplam Sayı Tek/Çift"){
	$secilen_translate = getTranslation('voleyboloran22');
} else if($secim_yapimi_kuponguncelle=="1.Set Toplam Sayı Tek/Çift"){
	$secilen_translate = getTranslation('voleyboloran23');
} else if($secim_yapimi_kuponguncelle=="2.Set Toplam Sayı Tek/Çift"){
	$secilen_translate = getTranslation('voleyboloran24');
} else if($secim_yapimi_kuponguncelle=="3.Set Toplam Sayı Tek/Çift"){
	$secilen_translate = getTranslation('voleyboloran25');
} else if($secim_yapimi_kuponguncelle=="4.Set Toplam Sayı Tek/Çift"){
	$secilen_translate = getTranslation('voleyboloran26');
} else if($secim_yapimi_kuponguncelle=="Müsabaka 5.Set Sürermi"){
	$secilen_translate = getTranslation('voleyboloran27');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

} else if($row['spor_tip']=="canlibuz") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
	$secilen_translate = getTranslation('buzhokeyioran1');
} else if($secim_yapimi_kuponguncelle=="1X2"){
	$secilen_translate = getTranslation('buzhokeyioran2');
} else if($secim_yapimi_kuponguncelle=="1.P Maç Sonucu"){
	$secilen_translate = getTranslation('buzhokeyioran3');
} else if($secim_yapimi_kuponguncelle=="2.P Maç Sonucu"){
	$secilen_translate = getTranslation('buzhokeyioran4');
} else if($secim_yapimi_kuponguncelle=="3.P Maç Sonucu"){
	$secilen_translate = getTranslation('buzhokeyioran5');
} else if($secim_yapimi_kuponguncelle=="Cifte Sans"){
	$secilen_translate = getTranslation('buzhokeyioran6');
} else if($secim_yapimi_kuponguncelle=="1.P Çifte Şans"){
	$secilen_translate = getTranslation('buzhokeyioran7');
} else if($secim_yapimi_kuponguncelle=="2.P Çifte Şans"){
	$secilen_translate = getTranslation('buzhokeyioran8');
} else if($secim_yapimi_kuponguncelle=="3.P Çifte Şans"){
	$secilen_translate = getTranslation('buzhokeyioran9');
} else if($secim_yapimi_kuponguncelle=="Hangi periyod daha cok gol olur?"){
	$secilen_translate = getTranslation('buzhokeyioran10');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

} else if($row['spor_tip']=="canlimt") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
	$secilen_translate = getTranslation('masatenisioran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahisi"){
	$secilen_translate = getTranslation('masatenisioran2');
} else if($secim_yapimi_kuponguncelle=="1. ve 2.Seti Kim Kazanır ?"){
	$secilen_translate = getTranslation('masatenisioran3');
} else if($secim_yapimi_kuponguncelle=="2. ve 3.Seti Kim Kazanır ?"){
	$secilen_translate = getTranslation('masatenisioran4');
} else if($secim_yapimi_kuponguncelle=="1.Seti Kim Kazanır"){
	$secilen_translate = getTranslation('masatenisioran5');
} else if($secim_yapimi_kuponguncelle=="Toplam Skor"){
	$secilen_translate = getTranslation('masatenisioran6');
} else if($secim_yapimi_kuponguncelle=="2.Seti Kim Kazanır"){
	$secilen_translate = getTranslation('masatenisioran7');
} else if($secim_yapimi_kuponguncelle=="3.Seti Kim Kazanır"){
	$secilen_translate = getTranslation('masatenisioran8');
} else if($secim_yapimi_kuponguncelle=="4.Seti Kim Kazanır"){
	$secilen_translate = getTranslation('masatenisioran9');
} else if($secim_yapimi_kuponguncelle=="5.Seti Kim Kazanır"){
	$secilen_translate = getTranslation('masatenisioran10');
} else {
	$secilen_translate = $secim_yapimi_kuponguncelle;
}

}

if($dil_bilgisi22['language']=='en'){

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "Y";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "N";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "U";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "O";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 and O";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 and O";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 and U";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 and U";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 and Y";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 and Y";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 and N";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 and N";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "No Goal";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "X and Y";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "D";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "S";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else if($dil_bilgisi22['language']=='de'){ 

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "J";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "K";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "N";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "T";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 und T";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 und T";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 und N";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 und N";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 und J";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 und J";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 und K";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 und K";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "Kein Ziel";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "X und J";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "P";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "E";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else if($dil_bilgisi22['language']=='ar'){ 

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "أجل";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "لا";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "أدنى";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "أعلى";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 وما فوق";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 وما فوق";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 و السفلى";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 و السفلى";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 و نعم";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 و نعم";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 و لا";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 و لا";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "لا هدف";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "س ونعم";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "زوجان";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "واحد";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else if($dil_bilgisi22['language']=='ru'){ 

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "да";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "нет";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "ниже";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "топ";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 и выше";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 и выше";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 и ниже";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 и ниже";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 и да";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 и да";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 и нет";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 и нет";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "Нет цели";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "Х и да";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "пара";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "один";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

?>

<div class="editem removeWrapper">
<div class="text matchname"><?=$row['ev_takim'];?> - <?=$row['konuk_takim'];?></div>
<div class="invisible bank"><?=getTranslation('mobilexportkuponguncelle5')?></div>
<div class="comment"><?=$secilen_translate;?></div>
<div class="removeButton" onclick="kuponsil('<?=$row['id']; ?>');"><img src="assets/img/remove_slim_blue.png" alt="" width="10" height="10"></div>
</div>
<div class="edsubitem odd">
<div class="text w100"><div class="hidden"></div><?=$secilen_translate2;?> <? if($row['oran_val']!="") { echo "($row[oran_val])"; } ?> </div>

<div class="value <? if($row['aktif']=="0") { ?>paused<? } ?>"><? if($row['aktif']=="0") { ?>1.00<? } else { ?><?=$row['oran']; ?><? } ?></div>

<? if($row['mac_time']<time() && $row['spor_tip']!="canli" && $row['spor_tip']=="futbol") { $oynanamaz=1; ?>
<div class="inlineerror scrollTo2"><?=getTranslation('mobilexportkuponguncelle6')?></div>
<? }
if($row['mac_time']<time() && $row['spor_tip']!="canlib" && $row['spor_tip']=="basketbol") { $oynanamaz=1; ?>
<div class="inlineerror scrollTo2"><?=getTranslation('mobilexportkuponguncelle6')?></div>
<? }
if($row['mac_time']<time() && $row['spor_tip']!="canlit" && $row['spor_tip']=="tenis") { $oynanamaz=1; ?>
<div class="inlineerror scrollTo2"><?=getTranslation('mobilexportkuponguncelle6')?></div>
<? }
if($row['mac_time']<time() && $row['spor_tip']!="canliv" && $row['spor_tip']=="voleybol") { $oynanamaz=1; ?>
<div class="inlineerror scrollTo2"><?=getTranslation('mobilexportkuponguncelle6')?></div>
<? }
if($row['mac_time']<time() && $row['spor_tip']!="canlibuz" && $row['spor_tip']=="buzhokeyi") { $oynanamaz=1; ?>
<div class="inlineerror scrollTo2"><?=getTranslation('mobilexportkuponguncelle6')?></div>
<? }
if($row['mac_time']<time() && $row['spor_tip']!="canlih" && $row['spor_tip']=="masatenisi") { $oynanamaz=1; ?>
<div class="inlineerror scrollTo2"><?=getTranslation('mobilexportkuponguncelle6')?></div>
<? }
if($row['mac_time']<time() && $row['spor_tip']!="canlih" && $row['spor_tip']=="beyzbol") { $oynanamaz=1; ?>
<div class="inlineerror scrollTo2"><?=getTranslation('mobilexportkuponguncelle6')?></div>
<? }
if($row['mac_time']<time() && $row['spor_tip']!="canlih" && $row['spor_tip']=="rugby") { $oynanamaz=1; ?>
<div class="inlineerror scrollTo2"><?=getTranslation('mobilexportkuponguncelle6')?></div>
<? }
if($row['mac_time']<time() && $row['spor_tip']!="canlih" && $row['spor_tip']=="dovus") { $oynanamaz=1; ?>
<div class="inlineerror scrollTo2"><?=getTranslation('mobilexportkuponguncelle6')?></div>
<? }
if($row['mac_time']<time() && $row['spor_tip']=="canli") { $oynanamaz=1; ?>
<div class="inlineerror scrollTo2"><?=getTranslation('mobilexportkuponguncelle7')?></div>
<? }
if($row['mac_time']<time() && $row['spor_tip']=="canlib") { $oynanamaz=1; ?>
<div class="inlineerror scrollTo2"><?=getTranslation('mobilexportkuponguncelle7')?></div>
<? }
if($row['mac_time']<time() && $row['spor_tip']=="canlit") { $oynanamaz=1; ?>
<div class="inlineerror scrollTo2"><?=getTranslation('mobilexportkuponguncelle7')?></div>
<? }
if($row['mac_time']<time() && $row['spor_tip']=="canliv") { $oynanamaz=1; ?>
<div class="inlineerror scrollTo2"><?=getTranslation('mobilexportkuponguncelle7')?></div>
<? }
if($row['mac_time']<time() && $row['spor_tip']=="canlibuz") { $oynanamaz=1; ?>
<div class="inlineerror scrollTo2"><?=getTranslation('mobilexportkuponguncelle7')?></div>
<? }
if($row['mac_time']<time() && $row['spor_tip']=="canlih") { $oynanamaz=1; ?>
<div class="inlineerror scrollTo2"><?=getTranslation('mobilexportkuponguncelle7')?></div>
<? }
if($row['aktif']=="0") { $oynanamaz = 1; ?>
<div class="inlineerror scrollTo2"><?=getTranslation('mobilexportkuponguncelle7')?></div>
<? }
if($ob[0]=="" || $ob[1]=="") { $oynanamaz = 1; ?>
<div class="inlineerror scrollTo2">Seçenek Güncellendi</div>
<? } ?>

</div>

<?
$idcode = idcode("$row[mac_db_id]$row[spor_tip]$row[oran_val_id]");
?>

<script>
var cbet = jQuery(".qbut-<?=md5("$row[oran_tip]|$row[mac_db_id]"); ?>");
if(cbet.length>0) { cbet.addClass('selected'); }
var cbet2 = jQuery(".qbut-<?=md5("$row[oran_val_id]|$row[mac_db_id]"); ?>");
if(cbet2.length>0) { cbet2.addClass('selected'); }
var obet = jQuery(".qbut-<?=md5("$row[oran_tip]|$row[canli_event]"); ?>");
if(obet.length>0) { obet.addClass('selected'); }
</script>

<? } ?>

<? }
$maxmbs = bilgi("select MAX(mbs) as enmbs from kupon where session_id='$session_id'");
if($maxmbs['enmbs']>$toplammac) {
$mbshata = 1;
?>
<div class="msgtext msgtextbg scrollTo">
<div class="icons msg_warning"></div>
<div class="hidden"></div>
<div class="hidden"></div>
<div class="text"><?=getTranslation('mobilexportkuponguncelle8')?> (<?=$maxmbs['enmbs']-$toplammac;?>)  <?=getTranslation('mobilexportkuponguncelle9')?></div>
</div>
<? } else if($oran>1 && $oran<userayar('minoran')) {
$oranhata = 1;
?>
<div class="msgtext msgtextbg scrollTo">
<div class="icons msg_warning"></div>
<div class="hidden"></div>
<div class="hidden"></div>
<div class="text"><?=getTranslation('mobilexportkuponguncelle10')?> <strong>(<?=userayar('minoran');?>)</strong> <?=getTranslation('mobilexportkuponguncelle11')?></div>
</div>
<? } else if($oran>1 && $oran>userayar('maxoran')) {

$oranhatamaxoran = 1;

} ?>

<? if(!$bos) { ?>

<div id="ajax" class="ajax" style="display:none;">
<div class="block fadein50 hidden" style="position: fixed;">&nbsp;</div>
<table width="100%" height="100%" style="position: fixed;">
<tbody><tr><td height="100%" align="center">
<div class="window fadein">
<div class="image">&nbsp;</div><div class="msg"><?=getTranslation('mobileditor1')?></div></div></td>
</tr></tbody></table>
</div>

<input type="hidden" id="counts" value="15" />

<div class="kuponalt">

<?

$kuponyatan = gd("kuponyatan");

if($kuponyatan=="undefined") { $kuponyatan=""; }

$telefon = gd("telefon");

if($telefon=="undefined") { $telefon = ""; }

$kuponisim = gd("kuponisim");

if($kuponisim=="undefined") { $kuponisim = ""; }

?>

<div class="stakeButtons center barmiddle">
<button id="editor30" class="w25 active " onclick="changesumanmount(30);"><div class="text">30</div></button>
<button id="editor50" class="w25 active " onclick="changesumanmount(50);"><div class="text">50</div></button>
<button id="editor100" class="w25 active " onclick="changesumanmount(100);"><div class="text">100</div></button>
<button id="editor999" class="w25 active " onclick="javascript:bahisgir();changesumanmount(999);"><div class="text">...</div></button>
</div>

<div class="barmiddle small arrow noborder withlabel">
<div class="text"><?=getTranslation('mobilexportkuponguncelle12')?></div>
<div class="value" onclick="javascript:kuponadigir();">
<span id="kuponadigirin" class=""><?=getTranslation('mobilexportkuponguncelle13')?></span>
</div>
<input type="hidden" id="kuponisim" value="<?=$kuponisim;?>" class="input">
</div>

<div style="display:none;" class="barmiddle small arrow noborder withlabel">
<div class="text"><?=getTranslation('mobilexportkuponguncelle14')?></div>
<div class="value" onclick="javascript:telefongir();">
<span id="" class=""><?=getTranslation('mobilexportkuponguncelle15')?></span>
</div>
<input type="hidden" id="telefon" value="<?=$telefon;?>" class="miktar" autocomplete="off" placeholder="05323332211" maxlength="11">
</div>

<?
if($canlivar) {
$maxodeme = userayar("canli_max_tutar");
} else if($toplammac==1) {
$maxodeme = userayar("tekmac_max_tutar");
} else {
$maxodeme = userayar("max_odeme");
}
if($kuponyatan=="") { $kuponyatan = ""; }
?>

<div class="barmiddle small arrow noborder withlabel">
<div class="text"><?=getTranslation('mobilexportkuponguncelle16')?></div>
<div class="value" onclick="javascript:bahisgir();">
<span class="">1 x <span id="bahisgirin" class="">0</span> = <span id="bahisgirin2" class="">0.00</span> </span>
</div>
<input type="hidden" id="kuponyatan" value="<?=$kuponyatan;?>" class="input">
</div>

<div class="barbottom small withlabel" style="display:table;">
<div class="text"><?=getTranslation('mobilexportkuponguncelle17')?></div>
<div class="value" id="trate"><?=$oran;?></div>
</div>

<div class="barbottom small withlabel" style="display:table;">
<div class="text"><?=getTranslation('mobilexportkuponguncelle18')?></div>
<div class="value" id="tutarhesap"><?=number_format((int)$oran*(int)$kuponyatan,2,".",","); ?></div>
</div>

<div class="hidden" style="display:table;">
<div class="text"></div>
<div class="value"></div>
</div>

<div class="barbottom small withlabel" style="display:table;" onclick="Oran_Kabul_Kontrol();">
<div class="text"><?=getTranslation('mobilexportkuponguncelle19')?></div>
<div class="value">
<input class="checkbox checkboxBig" id="acceptLiveOddsCheckBox" onchange="toggleAcceptLiveOdds(this);" checked="checked" type="checkbox">
</div>
</div>

<div>
<button class="bigbutton edit" id="datasendtick" onClick="kuponok();"><div class="text"><?=getTranslation('mobilexportkuponguncelle20')?></div></button>
</div>

</div>

<input type="hidden" id="oynanamaz" value="<? if($oynanamaz) { echo "1"; } else { echo "0"; } ?>">

<input type="hidden" id="mbshata" value="<? if($mbshata) { echo "1"; } else { echo "0"; } ?>">

<input type="hidden" id="oranhata" value="<? if($oranhata) { echo "1"; } else { echo "0"; } ?>">

<input type="hidden" id="oranhatamaxoran" value="<? if($oranhatamaxoran) { echo "1"; } else { echo "0"; } ?>">

<input type="hidden" id="toplamoran" value="<?=$oran;?>">

<input type="hidden" id="canlivar" value="<? if($canlivar) {$cv = 1; echo "1"; } else { $cv=0; echo "0"; } ?>">

<input type="hidden" id="adonet" value="<? if($ub['alt_durum']>0) { ?>1<? } else { echo "0"; } ?>">



<? 

if(isset($_GET['after'])) { 

$gelenoran = gd("toplamoran");

if($gelenoran!=$oran) {

?>

<script> alert('<?=getTranslation('mobilexportkuponguncelle21')?>'); </script>

<? } } ?>



<script>
function kuponbahisgir(a){
if(a=="sil"){
	var suan = $("#kuponyatan").val();
	var toplam = suan.length;
	var res = suan.substr(0,(toplam-1));

	jQuery("#kuponyatan").val(res);
	jQuery("#kuponbahisigir").html(res);
	jQuery("#bahisgirin").html(res);
	jQuery("#bahisgirin2").html(res);
	
	var yansit = $("#kuponyatan").val()*$("#toplamoran").val();
	var yatani = $("#kuponyatan").val();
	if(yatani><?=userayar("aynikupon_max_tutar"); ?>) {
	alert('<?=getTranslation('mobilexportkuponguncelle22')?> <?=nf(userayar("aynikupon_max_tutar")); ?>');
	jQuery("#kuponyatan").val(<?=userayar("aynikupon_max_tutar");?>);
	golalen();
	} else { var tutar = nf(yansit); }
	jQuery("#tutarhesap").html(tutar);
	
} else {
	jQuery("#kuponyatan").val($("#kuponyatan").val()+a);
	jQuery("#kuponbahisigir").html($("#kuponyatan").val());
	jQuery("#bahisgirin").html($("#kuponyatan").val());
	jQuery("#bahisgirin2").html($("#kuponyatan").val());
	
	var yansit = $("#kuponyatan").val()*$("#toplamoran").val();
	var yatani = $("#kuponyatan").val();
	if(yatani><?=userayar("aynikupon_max_tutar"); ?>) {
	alert('<?=getTranslation('mobilexportkuponguncelle22')?> <?=nf(userayar("aynikupon_max_tutar")); ?>');
	jQuery("#kuponyatan").val(<?=userayar("aynikupon_max_tutar");?>);
	golalen();
	} else { var tutar = nf(yansit); }
	jQuery("#tutarhesap").html(tutar);
	
}
}

function changesumanmount(data){
	if(data==30){

	jQuery("#editor30").addClass('selected');
	jQuery("#editor50").removeClass('selected');
	jQuery("#editor100").removeClass('selected');
	jQuery("#editor999").removeClass('selected');
	jQuery('#kuponyatan').val(data);
	jQuery("#bahisgirin").html(data);
	jQuery("#bahisgirin2").html(data);
	
	var yansit = $("#kuponyatan").val()*$("#toplamoran").val();
	var yatani = $("#kuponyatan").val();
	if(yatani><?=userayar("aynikupon_max_tutar"); ?>) {
	alert('<?=getTranslation('mobilexportkuponguncelle22')?> <?=nf(userayar("aynikupon_max_tutar")); ?>');
	jQuery("#kuponyatan").val(<?=userayar("aynikupon_max_tutar");?>);
	golalen();
	} else { var tutar = nf(yansit); }
	jQuery("#tutarhesap").html(tutar);
	
	} else if(data==50){
	
	jQuery("#editor30").removeClass('selected');
	jQuery("#editor50").addClass('selected');
	jQuery("#editor100").removeClass('selected');
	jQuery("#editor999").removeClass('selected');
	jQuery('#kuponyatan').val(data);
	jQuery("#bahisgirin").html(data);
	jQuery("#bahisgirin2").html(data);
	
	var yansit = $("#kuponyatan").val()*$("#toplamoran").val();
	var yatani = $("#kuponyatan").val();
	if(yatani><?=userayar("aynikupon_max_tutar"); ?>) {
	alert('<?=getTranslation('mobilexportkuponguncelle22')?> <?=nf(userayar("aynikupon_max_tutar")); ?>');
	jQuery("#kuponyatan").val(<?=userayar("aynikupon_max_tutar");?>);
	golalen();
	} else { var tutar = nf(yansit); }
	jQuery("#tutarhesap").html(tutar);

	} else if(data==100){
	
	jQuery("#editor30").removeClass('selected');
	jQuery("#editor50").removeClass('selected');
	jQuery("#editor100").addClass('selected');
	jQuery("#editor999").removeClass('selected');
	jQuery('#kuponyatan').val(data);
	jQuery("#bahisgirin").html(data);
	jQuery("#bahisgirin2").html(data);
	
	var yansit = $("#kuponyatan").val()*$("#toplamoran").val();
	var yatani = $("#kuponyatan").val();
	if(yatani><?=userayar("aynikupon_max_tutar"); ?>) {
	alert('<?=getTranslation('mobilexportkuponguncelle22')?> <?=nf(userayar("aynikupon_max_tutar")); ?>');
	jQuery("#kuponyatan").val(<?=userayar("aynikupon_max_tutar");?>);
	golalen();
	} else { var tutar = nf(yansit); }
	jQuery("#tutarhesap").html(tutar);

	} else if(data==999){
	jQuery("#editor30").removeClass('selected');
	jQuery("#editor50").removeClass('selected');
	jQuery("#editor100").removeClass('selected');
	jQuery("#editor999").addClass('selected');
	jQuery('#kuponyatan').val("");
	jQuery("#bahisgirin").html("0");
	jQuery("#bahisgirin2").html("0");
	jQuery("#tutarhesap").html("0.00");
	}
}

function birle() {
$("#cupdate").val('1');
$("#avarey2").html('');
$("#avarey2").hide();
$("#avarey").show();
}

$(document).ready(function(e) {

$("#kuponyatan").click(function() { $("#kuponyatan").select(); });

$('#kuponisim').keypress(function(event){ var keycode = (event.keyCode ? event.keyCode : event.which); if(keycode == '13'){ 
$("#telefon").select();
}});

$('#telefon').keypress(function(event){ var keycode = (event.keyCode ? event.keyCode : event.which); if(keycode == '13'){ 
$("#kuponyatan").select();
}});

$('#kuponyatan').keypress(function(event){ var keycode = (event.keyCode ? event.keyCode : event.which); if(keycode == '13'){ 
kuponok();
}});

$(".kuponinput").focusin(function() { $("#cupdate").val('0'); }).focusout(function() { $("#cupdate").val('1'); });


function golalen() {
var yansit = $("#kuponyatan").val()*$("#toplamoran").val()
var tutar = nf(yansit);
$("#tutarhesap").html(tutar);
}

$("#kuponyatan").keyup(function(e) {
var yansit = $("#kuponyatan").val()*$("#toplamoran").val()
var yatani = $("#kuponyatan").val();

if(yatani><?=userayar("aynikupon_max_tutar"); ?>) {
alert('<?=getTranslation('mobilexportkuponguncelle22')?> <?=nf(userayar("aynikupon_max_tutar")); ?>');
$("#kuponyatan").val(0);
golalen();
} else { var tutar = nf(yansit); }
$("#tutarhesap").html(tutar);
});

});




function kuponok() {
	$("#cupdate").val('0');
	var rand = Math.random();
	$.get('../ajax.php?a=firstsec&rand='+rand+'',function(data) { });
	$("#counts").val(1);
	var oynanamaz = $("#oynanamaz").val();
	var mbshata = $("#mbshata").val();
	var kuponyatan = $("#kuponyatan").val();
	var adonet = $("#adonet").val();
	var oranhata = $("#oranhata").val();
	var oranhatamaxoran = $("#oranhatamaxoran").val();
	if(adonet=="1") { alert('<?=getTranslation('mobilexportkuponguncelle23')?>'); } else
	if(kuponyatan><?=$ub['bakiye'];?>) { alert('<?=getTranslation('mobilexportkuponguncelle24')?>'); $("#cupdate").val('1'); kuponguncelle(0); } else
	if(kuponyatan<<?=userayar('min_kupon_tutar');?> || kuponyatan<1) { alert('<?=getTranslation('mobilexportkuponguncelle25')?> <?=userayar('min_kupon_tutar'); ?>'); $("#cupdate").val('1'); kuponguncelle(0); } else
	if(oynanamaz==1) { alert('<?=getTranslation('mobilexportkuponguncelle26')?>'); $("#cupdate").val('1'); kuponguncelle(0); } else
	if(mbshata==1) { alert('<?=getTranslation('mobilexportkuponguncelle27')?> <?=$maxmbs['enmbs']-$toplammac;?> <?=getTranslation('mobilexportkuponguncelle28')?>'); $("#cupdate").val('1'); kuponguncelle(0); } else 
	if(oranhata==1) { alert('<?=getTranslation('mobilexportkuponguncelle29')?> <?=userayar('minoran');?> <?=getTranslation('mobilexportkuponguncelle30')?>'); $("#cupdate").val('1'); kuponguncelle(0); } else
	if(oranhatamaxoran==1) { alert('<?=getTranslation('mobilexportkuponguncelle31')?> <?=userayar('maxoran');?> <?=getTranslation('mobilexportkuponguncelle32')?>'); $("#cupdate").val('1'); kuponguncelle(0); } else
	{
	$("#cupdate").val('0');
	$(".kuponalt").slideUp('fast',function() { 
	$(".afterkupon").slideUp();
	var rand = Math.random();
	var telefon = $("#telefon").val();
	var kuponisim = $("#kuponisim").val();
	var toplamoran = $("#toplamoran").val();
	var canlidurum = $("#canlivar").val();
	<? if($canlivar) { ?>
	$("#ajax").slideDown('fast');
	$("#cupdate").val('0');
	var kontra = setInterval(function() { $("#cupdate").val('0'); console.log('cupdates'); },500);
	setTimeout(function() { kuponokson('<?=time();?>'); clearInterval(kontra); },<?=userayar('canli_sure'); ?>000);
	<? } else { ?>
	$("#ajax").slideDown('fast');
	$("#cupdate").val('0');
	kuponokson();
	<? } ?>
	});
	}
}

function kupontemizle() {
var rand = Math.random();
$("#cupdate").val('1');
$.get('export.php?a=kupontemizle&rand='+rand+'',function() { 
kuponguncelle(1);
kuponadet();
});	
}

function kupononaygoruntule() {
$.get('export.php?a=kupononaygoruntule',function(data) {
$("#avarey2").html(data);
$("#avarey2").show();
$("#avarey").hide();
});
}

function kuponokson(ts) {
	$("#cupdate").val('0');
	var rand = Math.random();
	var telefon = $("#telefon").val();
	var isim = $("#kuponisim").val();
	var toplamoran = $("#toplamoran").val();
	var tutar = $("#kuponyatan").val();
	var kazancver = $("#tutarhesap").val();
	$.ajax({
		url: "../ajax.php?a=kuponok&rand="+rand+"",
		type: "POST",
		data: "tutar="+tutar+"&kuponadi="+isim+"&telefon="+telefon+"&toplammac=<?=$toplammac;?>&cv=<?=$cv;?>&cc="+ts+"",
		success: function(data) {
			var datasss = $.parseJSON(data);
			if(data=="643") { alert('Küsüratlı Kupon Oynama Yasaklanmıştır.'); $("#cupdate").val('1'); kuponguncelle(0); } else
			if(datasss.status == 123) { alert(datasss.message); $("#cupdate").val('1'); kuponguncelle(0); } else
			if(data=="402") { alert('<?=getTranslation('mobilexportkuponguncelle33')?>'); $("#cupdate").val('1'); kuponguncelle(0); } else
			if(data=="404") { alert('<?=getTranslation('mobilexportkuponguncelle34')?>'); $("#cupdate").val('1'); kuponguncelle(0); } else
			if(data=="405") { alert('<?=getTranslation('mobilexportkuponguncelle35')?> ( <?=userayar('max_odeme'); ?> ) <?=getTranslation('mobilexportkuponguncelle36')?>'); $("#cupdate").val('1'); kuponguncelle(0); } else
			if(data=="406") { alert('<?=getTranslation('mobilexportkuponguncelle37')?> ( <?=userayar('tekmac_max_tutar'); ?> ) <?=getTranslation('mobilexportkuponguncelle36')?>'); $("#cupdate").val('1'); kuponguncelle(0); } else
			if(data=="200") {
				limitupdate();
				kupontemizle();
				$("#cupdate").val('0');
				kupononaygoruntule();
			}
			$(".kuponalt").slideDown('fast');
			$("#ajax").slideUp('fast');
			$("#livelock").fadeOut('slow');
		}
		});
}

</script>

</div>

<? } ?>



<? if($cv==1) { ?>

<input type="hidden" id="caola" value="1">

<? } ?>



<? }

if($a=="firstsec") {
	$_SESSION['ilk_zaman'] = time();
}



if($a=="kuponok") {

if(!isset($_SESSION['ilk_zaman'])) { 
echo "404";
exit();
} else {	
$ilk_zaman = $_SESSION['ilk_zaman'];
$fark = time()-$ilk_zaman;
}




$tutar = pd("tutar");

$kupon_yatan_bol = explode('.',$tutar);

if($kupon_yatan_bol[1]>0){
	$kuponda_kurus_var = 1;
} else {
	$kuponda_kurus_var = 0;
}

if($kuponda_kurus_var>0) { unset($_SESSION['ilk_zaman']); die("643"); exit(); }

$kuponadi = pd("kuponadi");

$telefon = pd("telefon");

$cdkontrol = sed_sql_query("select * from kupon where session_id='$session_id' and spor_tip='canli'");
if(sed_sql_numrows($cdkontrol)>0) { $cd = "1"; } else { $cd = "0"; }

$cdkontrolcanlibasket = sed_sql_query("select * from kupon where session_id='$session_id' and spor_tip='canlib'");
if(sed_sql_numrows($cdkontrolcanlibasket)>0) { $cdcanlibasket = "1"; } else { $cdcanlibasket = "0"; }

$cdkontrolcanlitenis = sed_sql_query("select * from kupon where session_id='$session_id' and spor_tip='canlit'");
if(sed_sql_numrows($cdkontrolcanlitenis)>0) { $cdcanlitenis = "1"; } else { $cdcanlitenis = "0"; }

$cdkontrolcanlivoleybol = sed_sql_query("select * from kupon where session_id='$session_id' and spor_tip='canliv'");
if(sed_sql_numrows($cdkontrolcanlivoleybol)>0) { $cdcanlivoleybol = "1"; } else { $cdcanlivoleybol = "0"; }

$cdkontrolcanlibuzhokeyi = sed_sql_query("select * from kupon where session_id='$session_id' and spor_tip='canlibuz'");
if(sed_sql_numrows($cdkontrolcanlibuzhokeyi)>0) { $cdcanlibuzhokeyi = "1"; } else { $cdcanlibuzhokeyi = "0"; }

$cdkontrolcanlimasatenis = sed_sql_query("select * from kupon where session_id='$session_id' and spor_tip='canlimt'");
if(sed_sql_numrows($cdkontrolcanlimasatenis)>0) { $cdcanlimasatenis = "1"; } else { $cdcanlimasatenis = "0"; }

$cdkontrol_basketbol = sed_sql_query("select * from kupon where session_id='$session_id' and spor_tip='basketbol'");
if(sed_sql_numrows($cdkontrol_basketbol)>0) { $cd_basketbol = "1"; } else { $cd_basketbol = "0"; }

$cdkontrol_tenis = sed_sql_query("select * from kupon where session_id='$session_id' and spor_tip='tenis'");
if(sed_sql_numrows($cdkontrol_tenis)>0) { $cd_tenis = "1"; } else { $cd_tenis = "0"; }

$cdkontrol_voleybol = sed_sql_query("select * from kupon where session_id='$session_id' and spor_tip='voleybol'");
if(sed_sql_numrows($cdkontrol_voleybol)>0) { $cd_voleybol = "1"; } else { $cd_voleybol = "0"; }

$cdkontrol_buzhokeyi = sed_sql_query("select * from kupon where session_id='$session_id' and spor_tip='buzhokeyi'");
if(sed_sql_numrows($cdkontrol_buzhokeyi)>0) { $cd_buzhokeyi = "1"; } else { $cd_buzhokeyi = "0"; }

$cdkontrol_masatenisi = sed_sql_query("select * from kupon where session_id='$session_id' and spor_tip='masatenisi'");
if(sed_sql_numrows($cdkontrol_masatenisi)>0) { $cd_masatenisi = "1"; } else { $cd_masatenisi = "0"; }

$cdkontrol_beyzbol = sed_sql_query("select * from kupon where session_id='$session_id' and spor_tip='beyzbol'");
if(sed_sql_numrows($cdkontrol_beyzbol)>0) { $cd_beyzbol = "1"; } else { $cd_beyzbol = "0"; }

$cdkontrol_rugby = sed_sql_query("select * from kupon where session_id='$session_id' and spor_tip='rugby'");
if(sed_sql_numrows($cdkontrol_rugby)>0) { $cd_rugby = "1"; } else { $cd_rugby = "0"; }

$cdkontrol_dovus = sed_sql_query("select * from kupon where session_id='$session_id' and spor_tip='dovus'");
if(sed_sql_numrows($cdkontrol_dovus)>0) { $cd_dovus = "1"; } else { $cd_dovus = "0"; }

$cdkontrol_futbol = sed_sql_query("select * from kupon where session_id='$session_id' and spor_tip='futbol'");
if(sed_sql_numrows($cdkontrol_futbol)>0) { $cd_futbol = "1"; } else { $cd_futbol = "0"; }

$cdkontrol_duello = sed_sql_query("select * from kupon where session_id='$session_id' and spor_tip='duello'");
if(sed_sql_numrows($cdkontrol_duello)>0) { $cd_duello = "1"; } else { $cd_duello = "0"; }


if($fark<1 && $cd=="1") { echo "404"; exit(); }

if($fark<1 && $cdcanlibasket=="1") { echo "404"; exit(); }

if($fark<1 && $cdcanlitenis=="1") { echo "404"; exit(); }

if($fark<1 && $cdcanlivoleybol=="1") { echo "404"; exit(); }

if($fark<1 && $cdcanlibuzhokeyi=="1") { echo "404"; exit(); }

if($fark<1 && $cdcanlimasatenis=="1") { echo "404"; exit(); }

$toplammac = pd("toplammac");

if($ub['bakiye']<$tutar || $tutar<1) { unset($_SESSION['ilk_zaman']); die("402"); exit(); }


if($cd=="1") {
$sor = sed_sql_query("select * from kupon where session_id='$session_id'");
while($row=sed_sql_fetcharray($sor)) {
if($row['spor_tip']=="canli") {

if($row['oran_tip']=="1X2|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="1X2|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="1X2|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Handikap 1:0|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Handikap 1:0|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Handikap 1:0|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Handikap 2:0|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Handikap 2:0|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Handikap 2:0|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Handikap 0:1|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Handikap 0:1|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Handikap 0:1|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Handikap 0:2|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Handikap 0:2|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Handikap 0:2|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Çifte Şans|1 ve X"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Çifte Şans|X ve 2"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Çifte Şans|1 ve 2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="1.Yarı Çifte Şans|1 ve X"){
	$sira_ver = 1;
} else if($row['oran_tip']=="1.Yarı Çifte Şans|X ve 2"){
	$sira_ver = 2;
} else if($row['oran_tip']=="1.Yarı Çifte Şans|1 ve 2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="1.Yarı 0.5 Gol Alt Üst|Alt 0.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="1.Yarı 0.5 Gol Alt Üst|Üst 0.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="1.Yarı 1.5 Gol Alt Üst|Alt 1.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="1.Yarı 1.5 Gol Alt Üst|Üst 1.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="1.Yarı 2.5 Gol Alt Üst|Alt 2.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="1.Yarı 2.5 Gol Alt Üst|Üst 2.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Toplam 0.5 Gol Alt Üst|Alt 0.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Toplam 0.5 Gol Alt Üst|Üst 0.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Toplam 1.5 Gol Alt Üst|Alt 1.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Toplam 1.5 Gol Alt Üst|Üst 1.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Toplam 2.5 Gol Alt Üst|Alt 2.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Toplam 2.5 Gol Alt Üst|Üst 2.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Toplam 3.5 Gol Alt Üst|Alt 3.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Toplam 3.5 Gol Alt Üst|Üst 3.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Toplam 4.5 Gol Alt Üst|Alt 4.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Toplam 4.5 Gol Alt Üst|Üst 4.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Toplam 5.5 Gol Alt Üst|Alt 5.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Toplam 5.5 Gol Alt Üst|Üst 5.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="2.Yarı 0.5 Gol Alt Üst|Alt 0.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="2.Yarı 0.5 Gol Alt Üst|Üst 0.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="2.Yarı 1.5 Gol Alt Üst|Alt 1.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="2.Yarı 1.5 Gol Alt Üst|Üst 1.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="2.Yarı 2.5 Gol Alt Üst|Alt 2.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="2.Yarı 2.5 Gol Alt Üst|Üst 2.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="2.Yarı 3.5 Gol Alt Üst|Alt 3.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="2.Yarı 3.5 Gol Alt Üst|Üst 3.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Karşılıklı Gol Olurmu ?|Evet"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Karşılıklı Gol Olurmu ?|Hayır"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Ev Sahibi Müsabakada Gol Atarmı ?|Evet"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Ev Sahibi Müsabakada Gol Atarmı ?|Hayır"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Deplasman Müsabakada Gol Atarmı ?|Evet"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Deplasman Müsabakada Gol Atarmı ?|Hayır"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Toplam Gol Tek / Çift|Çift"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Toplam Gol Tek / Çift|Tek"){
	$sira_ver = 2;
} else if($row['oran_tip']=="1.Yarı Tek / Çift|Çift"){
	$sira_ver = 1;
} else if($row['oran_tip']=="1.Yarı Tek / Çift|Tek"){
	$sira_ver = 2;
} else if($row['oran_tip']=="1.Yarı Karşılıklı Gol|Evet"){
	$sira_ver = 1;
} else if($row['oran_tip']=="1.Yarı Karşılıklı Gol|Hayır"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Maç Sonucu ve Karşılıklı Gol|Ev Gol Yiyerek Kazanır"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Maç Sonucu ve Karşılıklı Gol|Dep Gol Yiyerek Kazanır"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Maç Sonucu ve Karşılıklı Gol|Ev Gol Yemeden Kazanır"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Maç Sonucu ve Karşılıklı Gol|Dep Gol Yemeden Kazanır"){
	$sira_ver = 4;
} else if($row['oran_tip']=="Maç Sonucu ve Karşılıklı Gol|İki takım da gol atamaz"){
	$sira_ver = 5;
} else if($row['oran_tip']=="Maç Sonucu ve Karşılıklı Gol|İki takım da gol atar ve berabere biter"){
	$sira_ver = 6;
} else if($row['oran_tip']=="Ev Sahibi 0.5 Gol Alt Üst|Alt 0.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Ev Sahibi 0.5 Gol Alt Üst|Üst 0.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Ev Sahibi 1.5 Gol Alt Üst|Alt 1.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Ev Sahibi 1.5 Gol Alt Üst|Üst 1.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Ev Sahibi 2.5 Gol Alt Üst|Alt 2.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Ev Sahibi 2.5 Gol Alt Üst|Üst 2.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Deplasman 0.5 Gol Alt Üst|Alt 0.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Deplasman 0.5 Gol Alt Üst|Üst 0.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Deplasman 1.5 Gol Alt Üst|Alt 1.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Deplasman 1.5 Gol Alt Üst|Üst 1.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Deplasman 2.5 Gol Alt Üst|Alt 2.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Deplasman 2.5 Gol Alt Üst|Üst 2.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Toplam Kaç Gol Atılır ?|Gol Yok"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Toplam Kaç Gol Atılır ?|1 Gol"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Toplam Kaç Gol Atılır ?|2 Gol"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Toplam Kaç Gol Atılır ?|3 Gol"){
	$sira_ver = 4;
} else if($row['oran_tip']=="Toplam Kaç Gol Atılır ?|4 Gol"){
	$sira_ver = 5;
} else if($row['oran_tip']=="Toplam Kaç Gol Atılır ?|5 Gol"){
	$sira_ver = 6;
} else if($row['oran_tip']=="Toplam Kaç Gol Atılır ?|6 Gol"){
	$sira_ver = 7;
} else if($row['oran_tip']=="Toplam Kaç Gol Atılır ?|7 Gol"){
	$sira_ver = 8;
} else if($row['oran_tip']=="Toplam Kaç Gol Atılır ?|8 veya üstü"){
	$sira_ver = 9;
} else if($row['oran_tip']=="Ev Sahibi Toplam Kaç Gol Atar ?|Gol Yok"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Ev Sahibi Toplam Kaç Gol Atar ?|1 Gol"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Ev Sahibi Toplam Kaç Gol Atar ?|2 Gol"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Ev Sahibi Toplam Kaç Gol Atar ?|3 veya üstü"){
	$sira_ver = 4;
} else if($row['oran_tip']=="Deplasman Toplam Kaç Gol Atar ?|Gol Yok"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Deplasman Toplam Kaç Gol Atar ?|1 Gol"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Deplasman Toplam Kaç Gol Atar ?|2 Gol"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Deplasman Toplam Kaç Gol Atar ?|3 veya üstü"){
	$sira_ver = 4;
} else if($row['oran_tip']=="1.Yarı Skoru|0:0"){
	$sira_ver = 1;
} else if($row['oran_tip']=="1.Yarı Skoru|1:0"){
	$sira_ver = 2;
} else if($row['oran_tip']=="1.Yarı Skoru|1:1"){
	$sira_ver = 3;
} else if($row['oran_tip']=="1.Yarı Skoru|0:1"){
	$sira_ver = 4;
} else if($row['oran_tip']=="1.Yarı Skoru|2:0"){
	$sira_ver = 5;
} else if($row['oran_tip']=="1.Yarı Skoru|2:1"){
	$sira_ver = 6;
} else if($row['oran_tip']=="1.Yarı Skoru|2:2"){
	$sira_ver = 7;
} else if($row['oran_tip']=="1.Yarı Skoru|1:2"){
	$sira_ver = 8;
} else if($row['oran_tip']=="1.Yarı Skoru|0:2"){
	$sira_ver = 9;
} else if($row['oran_tip']=="1.Yarı Skoru|3:0"){
	$sira_ver = 10;
} else if($row['oran_tip']=="1.Yarı Skoru|3:1"){
	$sira_ver = 11;
} else if($row['oran_tip']=="1.Yarı Skoru|3:2"){
	$sira_ver = 12;
} else if($row['oran_tip']=="1.Yarı Skoru|3:3"){
	$sira_ver = 13;
} else if($row['oran_tip']=="1.Yarı Skoru|2:3"){
	$sira_ver = 14;
} else if($row['oran_tip']=="1.Yarı Skoru|1:3"){
	$sira_ver = 15;
} else if($row['oran_tip']=="1.Yarı Skoru|0:3"){
	$sira_ver = 16;
} else if($row['oran_tip']=="1.Yarı Skoru|4:0"){
	$sira_ver = 17;
} else if($row['oran_tip']=="1.Yarı Skoru|4:1"){
	$sira_ver = 18;
} else if($row['oran_tip']=="1.Yarı Skoru|4:2"){
	$sira_ver = 19;
} else if($row['oran_tip']=="1.Yarı Skoru|4:3"){
	$sira_ver = 20;
} else if($row['oran_tip']=="1.Yarı Skoru|4:4"){
	$sira_ver = 21;
} else if($row['oran_tip']=="1.Yarı Skoru|3:4"){
	$sira_ver = 22;
} else if($row['oran_tip']=="1.Yarı Skoru|2:4"){
	$sira_ver = 23;
} else if($row['oran_tip']=="1.Yarı Skoru|1:4"){
	$sira_ver = 24;
} else if($row['oran_tip']=="1.Yarı Skoru|0:4"){
	$sira_ver = 25;
} else if($row['oran_tip']=="Maç Skoru|0:0"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Maç Skoru|1:0"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Maç Skoru|1:1"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Maç Skoru|0:1"){
	$sira_ver = 4;
} else if($row['oran_tip']=="Maç Skoru|2:0"){
	$sira_ver = 5;
} else if($row['oran_tip']=="Maç Skoru|2:1"){
	$sira_ver = 6;
} else if($row['oran_tip']=="Maç Skoru|2:2"){
	$sira_ver = 7;
} else if($row['oran_tip']=="Maç Skoru|1:2"){
	$sira_ver = 8;
} else if($row['oran_tip']=="Maç Skoru|0:2"){
	$sira_ver = 9;
} else if($row['oran_tip']=="Maç Skoru|3:0"){
	$sira_ver = 10;
} else if($row['oran_tip']=="Maç Skoru|3:1"){
	$sira_ver = 11;
} else if($row['oran_tip']=="Maç Skoru|3:2"){
	$sira_ver = 12;
} else if($row['oran_tip']=="Maç Skoru|3:3"){
	$sira_ver = 13;
} else if($row['oran_tip']=="Maç Skoru|2:3"){
	$sira_ver = 14;
} else if($row['oran_tip']=="Maç Skoru|1:3"){
	$sira_ver = 15;
} else if($row['oran_tip']=="Maç Skoru|0:3"){
	$sira_ver = 16;
} else if($row['oran_tip']=="Maç Skoru|4:0"){
	$sira_ver = 17;
} else if($row['oran_tip']=="Maç Skoru|4:1"){
	$sira_ver = 18;
} else if($row['oran_tip']=="Maç Skoru|4:2"){
	$sira_ver = 19;
} else if($row['oran_tip']=="Maç Skoru|4:3"){
	$sira_ver = 20;
} else if($row['oran_tip']=="Maç Skoru|4:4"){
	$sira_ver = 21;
} else if($row['oran_tip']=="Maç Skoru|3:4"){
	$sira_ver = 22;
} else if($row['oran_tip']=="Maç Skoru|2:4"){
	$sira_ver = 23;
} else if($row['oran_tip']=="Maç Skoru|1:4"){
	$sira_ver = 24;
} else if($row['oran_tip']=="Maç Skoru|0:4"){
	$sira_ver = 25;
} else if($row['oran_tip']=="Ev Sahibi 1.Yarı 0.5 Gol Alt Üst|Alt 0.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Ev Sahibi 1.Yarı 0.5 Gol Alt Üst|Üst 0.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Ev Sahibi 1.Yarı 1.5 Gol Alt Üst|Alt 1.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Ev Sahibi 1.Yarı 1.5 Gol Alt Üst|Üst 1.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Ev Sahibi 1.Yarı 2.5 Gol Alt Üst|Alt 2.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Ev Sahibi 1.Yarı 2.5 Gol Alt Üst|Üst 2.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Deplasman 1.Yarı 0.5 Gol Alt Üst|Alt 0.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Deplasman 1.Yarı 0.5 Gol Alt Üst|Üst 0.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Deplasman 1.Yarı 1.5 Gol Alt Üst|Alt 1.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Deplasman 1.Yarı 1.5 Gol Alt Üst|Üst 1.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Deplasman 1.Yarı 2.5 Gol Alt Üst|Alt 2.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Deplasman 1.Yarı 2.5 Gol Alt Üst|Üst 2.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Ev Sahibi İlk Yarı Tam Gol Sayısı|Gol Yok"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Ev Sahibi İlk Yarı Tam Gol Sayısı|1 Gol"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Ev Sahibi İlk Yarı Tam Gol Sayısı|2 Gol"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Ev Sahibi İlk Yarı Tam Gol Sayısı|3 veya üstü"){
	$sira_ver = 4;
} else if($row['oran_tip']=="Ev Sahibi İkinci Yarı Tam Gol Sayısı|Gol Yok"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Ev Sahibi İkinci Yarı Tam Gol Sayısı|1 Gol"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Ev Sahibi İkinci Yarı Tam Gol Sayısı|2 Gol"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Ev Sahibi İkinci Yarı Tam Gol Sayısı|3 veya üstü"){
	$sira_ver = 4;
} else if($row['oran_tip']=="Deplasman İlk Yarı Tam Gol Sayısı|Gol Yok"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Deplasman İlk Yarı Tam Gol Sayısı|1 Gol"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Deplasman İlk Yarı Tam Gol Sayısı|2 Gol"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Deplasman İlk Yarı Tam Gol Sayısı|3 veya üstü"){
	$sira_ver = 4;
} else if($row['oran_tip']=="Deplasman İkinci Yarı Tam Gol Sayısı|Gol Yok"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Deplasman İkinci Yarı Tam Gol Sayısı|1 Gol"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Deplasman İkinci Yarı Tam Gol Sayısı|2 Gol"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Deplasman İkinci Yarı Tam Gol Sayısı|3 veya üstü"){
	$sira_ver = 4;
} else if($row['oran_tip']=="Herhangi Bir Takım 1 Gol Farkla Kazanirmi ?|Evet"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Herhangi Bir Takım 1 Gol Farkla Kazanirmi ?|Hayır"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Herhangi Bir Takım 2 Gol Farkla Kazanirmi ?|Evet"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Herhangi Bir Takım 2 Gol Farkla Kazanirmi ?|Hayır"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Herhangi Bir Takım 3 Gol Farkla Kazanirmi ?|Evet"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Herhangi Bir Takım 3 Gol Farkla Kazanirmi ?|Hayır"){
	$sira_ver = 2;
} else if($row['oran_tip']=="1.Yarı Sonucu|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="1.Yarı Sonucu|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="1.Yarı Sonucu|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="2.Yarı Sonucu|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="2.Yarı Sonucu|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="2.Yarı Sonucu|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="İlk Yarıda Kaç Gol Olur ?|Gol Yok"){
	$sira_ver = 1;
} else if($row['oran_tip']=="İlk Yarıda Kaç Gol Olur ?|1 Gol"){
	$sira_ver = 2;
} else if($row['oran_tip']=="İlk Yarıda Kaç Gol Olur ?|2 Gol"){
	$sira_ver = 3;
} else if($row['oran_tip']=="İlk Yarıda Kaç Gol Olur ?|3 veya üstü"){
	$sira_ver = 4;
} else if($row['oran_tip']=="2.Yarıda Toplam Kaç Gol Olur ?|Gol Yok"){
	$sira_ver = 1;
} else if($row['oran_tip']=="2.Yarıda Toplam Kaç Gol Olur ?|1 Gol"){
	$sira_ver = 2;
} else if($row['oran_tip']=="2.Yarıda Toplam Kaç Gol Olur ?|2 Gol"){
	$sira_ver = 3;
} else if($row['oran_tip']=="2.Yarıda Toplam Kaç Gol Olur ?|3 veya üstü"){
	$sira_ver = 4;
} else if($row['oran_tip']=="Müsabakada kaç gol atılır? (0-4)|0-1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Müsabakada kaç gol atılır? (0-4)|2-3"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Müsabakada kaç gol atılır? (0-4)|4 veya üstü"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Müsabakada kaç gol atılır? (0-5)|0-2"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Müsabakada kaç gol atılır? (0-5)|3-4"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Müsabakada kaç gol atılır? (0-5)|5 veya üstü"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Müsabakada kaç gol atılır? (0-6)|0-3"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Müsabakada kaç gol atılır? (0-6)|4-5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Müsabakada kaç gol atılır? (0-6)|6 veya üstü"){
	$sira_ver = 3;
} else if($row['oran_tip']=="1. yarıda 1.golü hangi takım atar?|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="1. yarıda 1.golü hangi takım atar?|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="1. yarıda 1.golü hangi takım atar?|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="1.golü hangi takım atar?|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="1.golü hangi takım atar?|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="1.golü hangi takım atar?|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="2.golü hangi takım atar?|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="2.golü hangi takım atar?|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="2.golü hangi takım atar?|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="3.golü hangi takım atar?|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="3.golü hangi takım atar?|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="3.golü hangi takım atar?|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="4.golü hangi takım atar?|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="4.golü hangi takım atar?|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="4.golü hangi takım atar?|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="5.golü hangi takım atar?|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="5.golü hangi takım atar?|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="5.golü hangi takım atar?|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="6.golü hangi takım atar?|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="6.golü hangi takım atar?|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="6.golü hangi takım atar?|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Toplam Sarı Kart 1.5 Alt/Üst|Üst 1.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Toplam Sarı Kart 1.5 Alt/Üst|Alt 1.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Toplam Sarı Kart 2.5 Alt/Üst|Üst 2.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Toplam Sarı Kart 2.5 Alt/Üst|Alt 2.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Toplam Sarı Kart 3.5 Alt/Üst|Üst 3.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Toplam Sarı Kart 3.5 Alt/Üst|Alt 3.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Toplam Sarı Kart 4.5 Alt/Üst|Üst 4.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Toplam Sarı Kart 4.5 Alt/Üst|Alt 4.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Kırmızı Kart Çıkarmı ?|Evet"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Kırmızı Kart Çıkarmı ?|Hayır"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Kaç Penaltı Olur ?|0"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Kaç Penaltı Olur ?|1"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Kaç Penaltı Olur ?|2 veya üstü"){
	$sira_ver = 3;
} else if($row['oran_tip']=="1.Takım Toplam Sarı Kart 1.5 Alt/Üst|Üst 1.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="1.Takım Toplam Sarı Kart 1.5 Alt/Üst|Alt 1.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="1.Takım Toplam Sarı Kart 2.5 Alt/Üst|Üst 2.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="1.Takım Toplam Sarı Kart 2.5 Alt/Üst|Alt 2.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="1.Takım Toplam Sarı Kart 3.5 Alt/Üst|Üst 3.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="1.Takım Toplam Sarı Kart 3.5 Alt/Üst|Alt 3.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="2.Takım Toplam Sarı Kart 1.5 Alt/Üst|Üst 1.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="2.Takım Toplam Sarı Kart 1.5 Alt/Üst|Alt 1.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="2.Takım Toplam Sarı Kart 2.5 Alt/Üst|Üst 2.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="2.Takım Toplam Sarı Kart 2.5 Alt/Üst|Alt 2.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="2.Takım Toplam Sarı Kart 3.5 Alt/Üst|Üst 3.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="2.Takım Toplam Sarı Kart 3.5 Alt/Üst|Alt 3.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Sarı Kart Tek/Çift|Çift"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Sarı Kart Tek/Çift|Tek"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Hangi Takım Çok Sarı Kart Yer ?|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Hangi Takım Çok Sarı Kart Yer ?|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Hangi Takım Çok Sarı Kart Yer ?|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Toplam Korner 5.5 Alt/Üst|Alt 5.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Toplam Korner 5.5 Alt/Üst|Üst 5.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Toplam Korner 6.5 Alt/Üst|Alt 6.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Toplam Korner 6.5 Alt/Üst|Üst 6.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Toplam Korner 7.5 Alt/Üst|Alt 7.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Toplam Korner 7.5 Alt/Üst|Üst 7.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Toplam Korner 8.5 Alt/Üst|Alt 8.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Toplam Korner 8.5 Alt/Üst|Üst 8.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Toplam Korner 9.5 Alt/Üst|Alt 9.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Toplam Korner 9.5 Alt/Üst|Üst 9.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Toplam Korner 10.5 Alt/Üst|Alt 10.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Toplam Korner 10.5 Alt/Üst|Üst 10.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Toplam Korner 11.5 Alt/Üst|Alt 11.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Toplam Korner 11.5 Alt/Üst|Üst 11.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Toplam Korner 12.5 Alt/Üst|Alt 12.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Toplam Korner 12.5 Alt/Üst|Üst 12.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Toplam Korner 13.5 Alt/Üst|Alt 13.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Toplam Korner 13.5 Alt/Üst|Üst 13.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Toplam Korner 14.5 Alt/Üst|Alt 14.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Toplam Korner 14.5 Alt/Üst|Üst 14.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Toplam Korner 15.5 Alt/Üst|Alt 15.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Toplam Korner 15.5 Alt/Üst|Üst 15.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="1.Takım Toplam Korner 2.5 Alt/Üst|Üst 2.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="1.Takım Toplam Korner 2.5 Alt/Üst|Alt 2.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="1.Takım Toplam Korner 3.5 Alt/Üst|Üst 3.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="1.Takım Toplam Korner 3.5 Alt/Üst|Alt 3.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="1.Takım Toplam Korner 4.5 Alt/Üst|Üst 4.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="1.Takım Toplam Korner 4.5 Alt/Üst|Alt 4.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="1.Takım Toplam Korner 5.5 Alt/Üst|Üst 5.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="1.Takım Toplam Korner 5.5 Alt/Üst|Alt 5.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="1.Takım Toplam Korner 6.5 Alt/Üst|Üst 6.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="1.Takım Toplam Korner 6.5 Alt/Üst|Alt 6.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="1.Takım Toplam Korner 7.5 Alt/Üst|Üst 7.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="1.Takım Toplam Korner 7.5 Alt/Üst|Alt 7.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="1.Takım Toplam Korner 8.5 Alt/Üst|Üst 8.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="1.Takım Toplam Korner 8.5 Alt/Üst|Alt 8.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="1.Takım Toplam Korner 9.5 Alt/Üst|Üst 9.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="1.Takım Toplam Korner 9.5 Alt/Üst|Alt 9.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="1.Takım Toplam Korner 10.5 Alt/Üst|Üst 10.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="1.Takım Toplam Korner 10.5 Alt/Üst|Alt 10.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="2.Takım Toplam Korner 2.5 Alt/Üst|Üst 2.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="2.Takım Toplam Korner 2.5 Alt/Üst|Alt 2.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="2.Takım Toplam Korner 3.5 Alt/Üst|Üst 3.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="2.Takım Toplam Korner 3.5 Alt/Üst|Alt 3.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="2.Takım Toplam Korner 4.5 Alt/Üst|Üst 4.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="2.Takım Toplam Korner 4.5 Alt/Üst|Alt 4.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="2.Takım Toplam Korner 5.5 Alt/Üst|Üst 5.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="2.Takım Toplam Korner 5.5 Alt/Üst|Alt 5.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="2.Takım Toplam Korner 6.5 Alt/Üst|Üst 6.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="2.Takım Toplam Korner 6.5 Alt/Üst|Alt 6.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="2.Takım Toplam Korner 7.5 Alt/Üst|Üst 7.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="2.Takım Toplam Korner 7.5 Alt/Üst|Alt 7.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="2.Takım Toplam Korner 8.5 Alt/Üst|Üst 8.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="2.Takım Toplam Korner 8.5 Alt/Üst|Alt 8.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="2.Takım Toplam Korner 9.5 Alt/Üst|Üst 9.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="2.Takım Toplam Korner 9.5 Alt/Üst|Alt 9.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="2.Takım Toplam Korner 10.5 Alt/Üst|Üst 10.5"){
	$sira_ver = 1;
} else if($row['oran_tip']=="2.Takım Toplam Korner 10.5 Alt/Üst|Alt 10.5"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Korner Tek/Çift|Çift"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Korner Tek/Çift|Tek"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Hangi Takım Daha Çok Korner Kullanır ?|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Hangi Takım Daha Çok Korner Kullanır ?|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Hangi Takım Daha Çok Korner Kullanır ?|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:0-0|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:0-0|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:0-0|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:1-0|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:1-0|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:1-0|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:0-1|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:0-1|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:0-1|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:1-1|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:1-1|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:1-1|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:2-0|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:2-0|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:2-0|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:0-2|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:0-2|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:0-2|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:2-1|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:2-1|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:2-1|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:1-2|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:1-2|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:1-2|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:3-0|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:3-0|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:3-0|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:0-3|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:0-3|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:0-3|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:2-2|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:2-2|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:2-2|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:1-3|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:1-3|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:1-3|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:3-1|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:3-1|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:3-1|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:4-0|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:4-0|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:4-0|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:0-4|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:0-4|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:0-4|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:5-0|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:5-0|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:5-0|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:0-5|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:0-5|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:0-5|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:4-1|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:4-1|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:4-1|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:1-4|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:1-4|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:1-4|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:3-2|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:3-2|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:3-2|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:2-3|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:2-3|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:2-3|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:6-0|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:6-0|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:6-0|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:0-6|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:0-6|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:0-6|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:5-1|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:5-1|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:5-1|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:1-5|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:1-5|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:1-5|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:4-2|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:4-2|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:4-2|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:2-4|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:2-4|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:2-4|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:3-3|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:3-3|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Kalan Süre Tahmini - skor:3-3|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Toplam 6.5 Gol Alt Üst|A"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Toplam 6.5 Gol Alt Üst|Ü"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Toplam 7.5 Gol Alt Üst|A"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Toplam 7.5 Gol Alt Üst|Ü"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Toplam 8.5 Gol Alt Üst|A"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Toplam 8.5 Gol Alt Üst|Ü"){
	$sira_ver = 2;
}

kuponda_canli_guncelle_sonkontrol($row['canli_event'],$row['oran_tip'],$sira_ver,$row['id']);	
}
}
}

if($cdcanlibasket=="1") {
$sor = sed_sql_query("select * from kupon where session_id='$session_id'");
while($row=sed_sql_fetcharray($sor)) {
if($row['spor_tip']=="canlib") {

$oran_tipi_bol = explode("|",$row['oran_tip']);
$sayi_bol_hadi = explode(" ",$oran_tipi_bol[1]);

if($row['oran_tip']=="1X2 (Uz. Hariç)|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="1X2 (Uz. Hariç)|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="1X2 (Uz. Hariç)|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="1X2(1.YARI)|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="1X2(1.YARI)|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="1X2(1.YARI)|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="1X2(2.YARI)|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="1X2(2.YARI)|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="1X2(2.YARI)|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="1X2(1.Çeyrek)|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="1X2(1.Çeyrek)|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="1X2(1.Çeyrek)|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="1X2(2.Çeyrek)|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="1X2(2.Çeyrek)|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="1X2(2.Çeyrek)|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="1X2(3.Çeyrek)|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="1X2(3.Çeyrek)|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="1X2(3.Çeyrek)|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="1X2(4.Çeyrek)|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="1X2(4.Çeyrek)|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="1X2(4.Çeyrek)|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Kim Kazanır (Uz. Dahil)|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Kim Kazanır (Uz. Dahil)|2"){
	$sira_ver = 2;
} else if($row['oran_tip']=="1.Çeyrek Kim Kazanır|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="1.Çeyrek Kim Kazanır|2"){
	$sira_ver = 2;
} else if($row['oran_tip']=="2.Çeyrek Kim Kazanır|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="2.Çeyrek Kim Kazanır|2"){
	$sira_ver = 2;
} else if($row['oran_tip']=="3.Çeyrek Kim Kazanır|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="3.Çeyrek Kim Kazanır|2"){
	$sira_ver = 2;
} else if($row['oran_tip']=="4.Çeyrek Kim Kazanır|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="4.Çeyrek Kim Kazanır|2"){
	$sira_ver = 2;
} else if($oran_tipi_bol[0]=="Toplam Skor Alt/Üst" && $sayi_bol_hadi[0]=="Alt"){
	$sira_ver = 1;
} else if($oran_tipi_bol[0]=="Toplam Skor Alt/Üst" && $sayi_bol_hadi[0]=="Üst"){
	$sira_ver = 2;
} else if($oran_tipi_bol[0]=="1.Çeyrek Toplam Alt/Üst" && $sayi_bol_hadi[0]=="Alt"){
	$sira_ver = 1;
} else if($oran_tipi_bol[0]=="1.Çeyrek Toplam Alt/Üst" && $sayi_bol_hadi[0]=="Üst"){
	$sira_ver = 2;
} else if($oran_tipi_bol[0]=="2.Çeyrek Toplam Alt/Üst" && $sayi_bol_hadi[0]=="Alt"){
	$sira_ver = 1;
} else if($oran_tipi_bol[0]=="2.Çeyrek Toplam Alt/Üst" && $sayi_bol_hadi[0]=="Üst"){
	$sira_ver = 2;
} else if($oran_tipi_bol[0]=="3.Çeyrek Toplam Alt/Üst" && $sayi_bol_hadi[0]=="Alt"){
	$sira_ver = 1;
} else if($oran_tipi_bol[0]=="3.Çeyrek Toplam Alt/Üst" && $sayi_bol_hadi[0]=="Üst"){
	$sira_ver = 2;
} else if($oran_tipi_bol[0]=="4.Çeyrek Toplam Alt/Üst" && $sayi_bol_hadi[0]=="Alt"){
	$sira_ver = 1;
} else if($oran_tipi_bol[0]=="4.Çeyrek Toplam Alt/Üst" && $sayi_bol_hadi[0]=="Üst"){
	$sira_ver = 2;
} else if($oran_tipi_bol[0]=="1.Takım Toplam Alt/Üst" && $sayi_bol_hadi[0]=="Alt"){
	$sira_ver = 1;
} else if($oran_tipi_bol[0]=="1.Takım Toplam Alt/Üst" && $sayi_bol_hadi[0]=="Üst"){
	$sira_ver = 2;
} else if($oran_tipi_bol[0]=="2.Takım Toplam Alt/Üst" && $sayi_bol_hadi[0]=="Alt"){
	$sira_ver = 1;
} else if($oran_tipi_bol[0]=="2.Takım Toplam Alt/Üst" && $sayi_bol_hadi[0]=="Üst"){
	$sira_ver = 2;
} else if($oran_tipi_bol[0]=="1.Takım 1.Yarı Toplam Alt/Üst" && $sayi_bol_hadi[0]=="Alt"){
	$sira_ver = 1;
} else if($oran_tipi_bol[0]=="2.Takım 1.Yarı Toplam Alt/Üst" && $sayi_bol_hadi[0]=="Üst"){
	$sira_ver = 2;
} else if($oran_tipi_bol[0]=="Handikap" && $sayi_bol_hadi[0]=="1"){
	$sira_ver = 1;
} else if($oran_tipi_bol[0]=="Handikap" && $sayi_bol_hadi[0]=="2"){
	$sira_ver = 2;
} else if($oran_tipi_bol[0]=="1.Yarı Handikap" && $sayi_bol_hadi[0]=="1"){
	$sira_ver = 1;
} else if($oran_tipi_bol[0]=="1.Yarı Handikap" && $sayi_bol_hadi[0]=="2"){
	$sira_ver = 2;
} else if($oran_tipi_bol[0]=="2.Yarı Handikap" && $sayi_bol_hadi[0]=="1"){
	$sira_ver = 1;
} else if($oran_tipi_bol[0]=="2.Yarı Handikap" && $sayi_bol_hadi[0]=="2"){
	$sira_ver = 2;
} else if($oran_tipi_bol[0]=="1.Çeyrek Handikap" && $sayi_bol_hadi[0]=="1"){
	$sira_ver = 1;
} else if($oran_tipi_bol[0]=="1.Çeyrek Handikap" && $sayi_bol_hadi[0]=="2"){
	$sira_ver = 2;
} else if($oran_tipi_bol[0]=="2.Çeyrek Handikap" && $sayi_bol_hadi[0]=="1"){
	$sira_ver = 1;
} else if($oran_tipi_bol[0]=="2.Çeyrek Handikap" && $sayi_bol_hadi[0]=="2"){
	$sira_ver = 2;
} else if($oran_tipi_bol[0]=="3.Çeyrek Handikap" && $sayi_bol_hadi[0]=="1"){
	$sira_ver = 1;
} else if($oran_tipi_bol[0]=="3.Çeyrek Handikap" && $sayi_bol_hadi[0]=="2"){
	$sira_ver = 2;
} else if($oran_tipi_bol[0]=="4.Çeyrek Handikap" && $sayi_bol_hadi[0]=="1"){
	$sira_ver = 1;
} else if($oran_tipi_bol[0]=="4.Çeyrek Handikap" && $sayi_bol_hadi[0]=="2"){
	$sira_ver = 2;
} else if($row['oran_tip']=="1.Yarı Toplam Tek/Çift|Tek"){
	$sira_ver = 1;
} else if($row['oran_tip']=="1.Yarı Toplam Tek/Çift|Çift"){
	$sira_ver = 2;
} else if($row['oran_tip']=="2.Yarı Toplam Tek/Çift|Tek"){
	$sira_ver = 1;
} else if($row['oran_tip']=="2.Yarı Toplam Tek/Çift|Çift"){
	$sira_ver = 2;
} else if($row['oran_tip']=="1.Çeyrek Toplam Tek/Çift|Tek"){
	$sira_ver = 1;
} else if($row['oran_tip']=="1.Çeyrek Toplam Tek/Çift|Çift"){
	$sira_ver = 2;
} else if($row['oran_tip']=="2.Çeyrek Toplam Tek/Çift|Tek"){
	$sira_ver = 1;
} else if($row['oran_tip']=="2.Çeyrek Toplam Tek/Çift|Çift"){
	$sira_ver = 2;
} else if($row['oran_tip']=="3.Çeyrek Toplam Tek/Çift|Tek"){
	$sira_ver = 1;
} else if($row['oran_tip']=="3.Çeyrek Toplam Tek/Çift|Çift"){
	$sira_ver = 2;
} else if($row['oran_tip']=="4.Çeyrek Toplam Tek/Çift|Tek"){
	$sira_ver = 1;
} else if($row['oran_tip']=="4.Çeyrek Toplam Tek/Çift|Çift"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Toplam Tek/Çift|Tek"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Toplam Tek/Çift|Çift"){
	$sira_ver = 2;
} else if($row['oran_tip']=="1.Yarı Kim Kazanır|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="1.Yarı Kim Kazanır|2"){
	$sira_ver = 2;
} else if($row['oran_tip']=="2.Yarı Kim Kazanır|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="2.Yarı Kim Kazanır|2"){
	$sira_ver = 2;
}

kuponda_canli_guncelleb($row['canli_event'],$row['oran_tip'],$sira_ver,$row['id']);
}
}
}

if($cdcanlitenis=="1") {
$sor = sed_sql_query("select * from kupon where session_id='$session_id'");
while($row=sed_sql_fetcharray($sor)) {
if($row['spor_tip']=="canlit") {

if($row['oran_tip']=="Kim Kazanır|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Kim Kazanır|2"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Set Bahisi|2:0"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Set Bahisi|2:1"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Set Bahisi|1:2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Set Bahisi|0:2"){
	$sira_ver = 4;
}

kuponda_canli_guncellet($row['canli_event'],$row['oran_tip'],$sira_ver,$row['id']);
}
}
}

if($cdcanlivoleybol=="1") {
$sor = sed_sql_query("select * from kupon where session_id='$session_id'");
while($row=sed_sql_fetcharray($sor)) {
if($row['spor_tip']=="canliv") {

$oran_tipi_bol = explode("|",$row['oran_tip']);
$sayi_bol_hadi = explode(" ",$oran_tipi_bol[1]);

if($row['oran_tip']=="Kim Kazanır|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Kim Kazanır|2"){
	$sira_ver = 2;
} else if($row['oran_tip']=="1.Seti Kim Kazanır ?|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="1.Seti Kim Kazanır ?|2"){
	$sira_ver = 2;
} else if($row['oran_tip']=="2.Seti Kim Kazanır ?|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="2.Seti Kim Kazanır ?|2"){
	$sira_ver = 2;
} else if($row['oran_tip']=="3.Seti Kim Kazanır ?|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="3.Seti Kim Kazanır ?|2"){
	$sira_ver = 2;
} else if($row['oran_tip']=="4.Seti Kim Kazanır ?|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="4.Seti Kim Kazanır ?|2"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Set bahisi (5 maç üzerinden)|3:0"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Set bahisi (5 maç üzerinden)|3:1"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Set bahisi (5 maç üzerinden)|3:2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Set bahisi (5 maç üzerinden)|2:3"){
	$sira_ver = 4;
} else if($row['oran_tip']=="Set bahisi (5 maç üzerinden)|1:3"){
	$sira_ver = 5;
} else if($row['oran_tip']=="Set bahisi (5 maç üzerinden)|0:3"){
	$sira_ver = 6;
} else if($row['oran_tip']=="Toplam Kaç Set Oynanır ?|3"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Toplam Kaç Set Oynanır ?|4"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Toplam Kaç Set Oynanır ?|5"){
	$sira_ver = 3;
} else if($oran_tipi_bol[0]=="1.Takım Toplam Sayı Alt/Üst" && $sayi_bol_hadi[0]=="Alt"){
	$sira_ver = 1;
} else if($oran_tipi_bol[0]=="1.Takım Toplam Sayı Alt/Üst" && $sayi_bol_hadi[0]=="Üst"){
	$sira_ver = 2;
} else if($oran_tipi_bol[0]=="2.Takım Toplam Sayı Alt/Üst" && $sayi_bol_hadi[0]=="Alt"){
	$sira_ver = 1;
} else if($oran_tipi_bol[0]=="2.Takım Toplam Sayı Alt/Üst" && $sayi_bol_hadi[0]=="Üst"){
	$sira_ver = 2;
} else if($oran_tipi_bol[0]=="1.Takım 1.Set Toplam Sayı Alt/Üst" && $sayi_bol_hadi[0]=="Alt"){
	$sira_ver = 1;
} else if($oran_tipi_bol[0]=="1.Takım 1.Set Toplam Sayı Alt/Üst" && $sayi_bol_hadi[0]=="Üst"){
	$sira_ver = 2;
} else if($oran_tipi_bol[0]=="2.Takım 1.Set Toplam Sayı Alt/Üst" && $sayi_bol_hadi[0]=="Alt"){
	$sira_ver = 1;
} else if($oran_tipi_bol[0]=="2.Takım 1.Set Toplam Sayı Alt/Üst" && $sayi_bol_hadi[0]=="Üst"){
	$sira_ver = 2;
} else if($oran_tipi_bol[0]=="1.Takım 2.Set Toplam Sayı Alt/Üst" && $sayi_bol_hadi[0]=="Alt"){
	$sira_ver = 1;
} else if($oran_tipi_bol[0]=="1.Takım 2.Set Toplam Sayı Alt/Üst" && $sayi_bol_hadi[0]=="Üst"){
	$sira_ver = 2;
} else if($oran_tipi_bol[0]=="2.Takım 2.Set Toplam Sayı Alt/Üst" && $sayi_bol_hadi[0]=="Alt"){
	$sira_ver = 1;
} else if($oran_tipi_bol[0]=="2.Takım 2.Set Toplam Sayı Alt/Üst" && $sayi_bol_hadi[0]=="Üst"){
	$sira_ver = 2;
} else if($oran_tipi_bol[0]=="1.Takım 3.Set Toplam Sayı Alt/Üst" && $sayi_bol_hadi[0]=="Alt"){
	$sira_ver = 1;
} else if($oran_tipi_bol[0]=="1.Takım 3.Set Toplam Sayı Alt/Üst" && $sayi_bol_hadi[0]=="Üst"){
	$sira_ver = 2;
} else if($oran_tipi_bol[0]=="2.Takım 3.Set Toplam Sayı Alt/Üst" && $sayi_bol_hadi[0]=="Alt"){
	$sira_ver = 1;
} else if($oran_tipi_bol[0]=="2.Takım 3.Set Toplam Sayı Alt/Üst" && $sayi_bol_hadi[0]=="Üst"){
	$sira_ver = 2;
} else if($oran_tipi_bol[0]=="1.Takım 4.Set Toplam Sayı Alt/Üst" && $sayi_bol_hadi[0]=="Alt"){
	$sira_ver = 1;
} else if($oran_tipi_bol[0]=="1.Takım 4.Set Toplam Sayı Alt/Üst" && $sayi_bol_hadi[0]=="Üst"){
	$sira_ver = 2;
} else if($oran_tipi_bol[0]=="2.Takım 4.Set Toplam Sayı Alt/Üst" && $sayi_bol_hadi[0]=="Alt"){
	$sira_ver = 1;
} else if($oran_tipi_bol[0]=="2.Takım 4.Set Toplam Sayı Alt/Üst" && $sayi_bol_hadi[0]=="Üst"){
	$sira_ver = 2;
} else if($oran_tipi_bol[0]=="Toplam Sayı Alt/Üst" && $sayi_bol_hadi[0]=="Alt"){
	$sira_ver = 1;
} else if($oran_tipi_bol[0]=="Toplam Sayı Alt/Üst" && $sayi_bol_hadi[0]=="Üst"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Toplam Sayı Tek/Çift|Tek"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Toplam Sayı Tek/Çift|Çift"){
	$sira_ver = 2;
} else if($row['oran_tip']=="1.Set Toplam Sayı Tek/Çift|Tek"){
	$sira_ver = 1;
} else if($row['oran_tip']=="1.Set Toplam Sayı Tek/Çift|Çift"){
	$sira_ver = 2;
} else if($row['oran_tip']=="2.Set Toplam Sayı Tek/Çift|Tek"){
	$sira_ver = 1;
} else if($row['oran_tip']=="2.Set Toplam Sayı Tek/Çift|Çift"){
	$sira_ver = 2;
} else if($row['oran_tip']=="3.Set Toplam Sayı Tek/Çift|Tek"){
	$sira_ver = 1;
} else if($row['oran_tip']=="3.Set Toplam Sayı Tek/Çift|Çift"){
	$sira_ver = 2;
} else if($row['oran_tip']=="4.Set Toplam Sayı Tek/Çift|Tek"){
	$sira_ver = 1;
} else if($row['oran_tip']=="4.Set Toplam Sayı Tek/Çift|Çift"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Müsabaka 5.Set Sürermi|Evet"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Müsabaka 5.Set Sürermi|Hayır"){
	$sira_ver = 2;
}

kuponda_canli_guncellev($row['canli_event'],$row['oran_tip'],$sira_ver,$row['id']);
}
}
}

if($cdcanlibuzhokeyi=="1") {
$sor = sed_sql_query("select * from kupon where session_id='$session_id'");
while($row=sed_sql_fetcharray($sor)) {
if($row['spor_tip']=="canlibuz") {

if($row['oran_tip']=="1X2|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="1X2|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="1X2|2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Cifte Sans|1X"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Cifte Sans|X2"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Cifte Sans|12"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Hangi periyod daha cok gol olur?|1.P"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Hangi periyod daha cok gol olur?|2.P"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Hangi periyod daha cok gol olur?|3.P"){
	$sira_ver = 3;
}

kuponda_canli_guncellebuz($row['canli_event'],$row['oran_tip'],$sira_ver,$row['id']);
}
}
}

if($cdcanlimasatenis=="1") {
$sor = sed_sql_query("select * from kupon where session_id='$session_id'");
while($row=sed_sql_fetcharray($sor)) {
if($row['spor_tip']=="canlimt") {

if($row['oran_tip']=="Kim Kazanır|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Kim Kazanır|2"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Set Bahisi|3:0"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Set Bahisi|3:1"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Set Bahisi|3:2"){
	$sira_ver = 3;
} else if($row['oran_tip']=="Set Bahisi|2:3"){
	$sira_ver = 4;
} else if($row['oran_tip']=="Set Bahisi|1:3"){
	$sira_ver = 5;
} else if($row['oran_tip']=="Set Bahisi|0:3"){
	$sira_ver = 6;
} else if($row['oran_tip']=="1.Seti Kim Kazanır|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="1.Seti Kim Kazanır|2"){
	$sira_ver = 2;
} else if($row['oran_tip']=="2.Seti Kim Kazanır|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="2.Seti Kim Kazanır|2"){
	$sira_ver = 2;
} else if($row['oran_tip']=="3.Seti Kim Kazanır|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="3.Seti Kim Kazanır|2"){
	$sira_ver = 2;
} else if($row['oran_tip']=="4.Seti Kim Kazanır|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="4.Seti Kim Kazanır|2"){
	$sira_ver = 2;
} else if($row['oran_tip']=="5.Seti Kim Kazanır|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="5.Seti Kim Kazanır|2"){
	$sira_ver = 2;
}

kuponda_canli_guncellemt($row['canli_event'],$row['oran_tip'],$sira_ver,$row['id']);
}
}
}






$macsiralama = sed_sql_query("select * from kupon where session_id='$session_id'");

while($ass=sed_sql_fetcharray($macsiralama)) {

if($ass['aktif']=="0") { unset($_SESSION['ilk_zaman']); die("404"); }$mac_siralamas = base64_encode("$ass[mac_db_id]|$ass[oran_tip]|$ass[spor_tip]");

$mac_siralama .= "".$mac_siralamas."|";

}$aynikupon = bilgi("select sum(tutar) as toplamyatan from kuponlar where mac_siralama='$mac_siralama' and user_id='$ub[id]'");

$aynikupontoplam = $aynikupon['toplamyatan'];

if(($aynikupontoplam)>userayar("aynikuponmaxi")) {
unset($_SESSION['ilk_zaman']);
die("13");

}



$toporan = 1;

$toplamoranbul = sed_sql_query("select oran,session_id from kupon where session_id='$session_id'");

while($toplamoranhesapla = sed_sql_fetcharray($toplamoranbul)) {

	$toporan = $toporan*$toplamoranhesapla['oran'];

}



$toplamoran = $toporan;



if(userayar('maxoran')=="") { $maxoran = 1000; } else { $maxoran = userayar('maxoran'); }

if($toplamoran>$maxoran) { $toplamoran = $maxoran; }



$kazanc = $toplamoran*$tutar;



if($kazanc>userayar('max_odeme')) { $kazanc = userayar('max_odeme'); }



$zaman = time();

$tarih = date("d.m.Y H:i:s");

$gunluk_tarih_ver = date("d.m.Y");



$sonkontrol = sed_sql_query("select session_id,aktif,mac_time from kupon where session_id='$session_id' and (aktif='0' or mac_time<$zaman)");

if(sed_sql_numrows($sonkontrol)>0) { unset($_SESSION['ilk_zaman']); die("404"); }

$sonkalan = sed_sql_query("select * from kupon where session_id='$session_id'");

if(sed_sql_numrows($sonkalan)<1) { unset($_SESSION['ilk_zaman']); die("404"); }



$baslatimebul = bilgi("select * from kupon where session_id='$session_id' and (spor_tip='basketbol' or spor_tip='futbol') order by mac_time asc limit 1");



$ipadres = $_SERVER['REMOTE_ADDR'];



$toplamibul = sed_sql_query("select * from kupon where session_id='$session_id'");

while($row_kontrols=sed_sql_fetcharray($toplamibul)) {

$oynanantoplammiktar = 0;
### BİR MAÇA MAKSİMUM YATIRILABİLİR -- BÜLTEN ###
if($row_kontrols['spor_tip']=="futbol" || $row_kontrols['spor_tip']=="basketbol" || $row_kontrols['spor_tip']=="tenis" || $row_kontrols['spor_tip']=="voleybol" || $row_kontrols['spor_tip']=="buzhokeyi" || $row_kontrols['spor_tip']=="masatenisi" || $row_kontrols['spor_tip']=="beyzbol" || $row_kontrols['spor_tip']=="rugby" || $row_kontrols['spor_tip']=="dovus"){

$sor_kupon_ic = sed_sql_query("SELECT kupon_id,ev_takim,konuk_takim FROM kupon_ic WHERE id!='' and (spor_tip='futbol' or spor_tip='basketbol' or spor_tip='tenis' or spor_tip='voleybol' or spor_tip='buzhokeyi' or spor_tip='masatenisi' or spor_tip='beyzbol' or spor_tip='rugby' or spor_tip='dovus') and ev_takim='$row_kontrols[ev_takim]' and konuk_takim='$row_kontrols[konuk_takim]'");

while($row_kupon_ic=sed_sql_fetcharray($sor_kupon_ic)) {

$sor_kuponlar = sed_sql_query("SELECT yatan FROM kuponlar WHERE id='$row_kupon_ic[kupon_id]' and user_id='$ub[id]'");

while($row_kuponlar=sed_sql_fetcharray($sor_kuponlar)) {

$oynanantoplammiktar = $oynanantoplammiktar+$row_kuponlar['yatan'];

}

}

$kalan_yatirilabilir_tutar = userayar('macbasitutarbulten')-$oynanantoplammiktar;
$tutarihesaplama_zamani = $kalan_yatirilabilir_tutar-$tutar;
if($tutarihesaplama_zamani<0){

$return = array('status' => 123,'message' => "".$row_kontrols['ev_takim']." - ".$row_kontrols['konuk_takim']." Bu Karşılaşmanın Olduğu Kupona En Fazla ".$kalan_yatirilabilir_tutar." TRY Yatırabilirsiniz.");
print_r(json_encode($return));
exit();

}
### BİR MAÇA MAKSİMUM YATIRILABİLİR -- BÜLTEN BİTİŞ - CANLI BAŞLANGIÇ ###
} else if($row_kontrols['spor_tip']=="canli" || $row_kontrols['spor_tip']=="canlib" || $row_kontrols['spor_tip']=="canlit" || $row_kontrols['spor_tip']=="canliv" || $row_kontrols['spor_tip']=="canlibuz" || $row_kontrols['spor_tip']=="canlimt"){

$sor_kupon_ic = sed_sql_query("SELECT kupon_id,ev_takim,konuk_takim FROM kupon_ic WHERE id!='' and (spor_tip='canli' or spor_tip='canlib' or spor_tip='canlit' or spor_tip='canliv' or spor_tip='canlibuz' or spor_tip='canlimt') and ev_takim='$row_kontrols[ev_takim]' and konuk_takim='$row_kontrols[konuk_takim]'");

while($row_kupon_ic=sed_sql_fetcharray($sor_kupon_ic)) {

$sor_kuponlar = sed_sql_query("SELECT yatan FROM kuponlar WHERE id='$row_kupon_ic[kupon_id]' and user_id='$ub[id]'");

while($row_kuponlar=sed_sql_fetcharray($sor_kuponlar)) {

$oynanantoplammiktar = $oynanantoplammiktar+$row_kuponlar['yatan'];

}

}

$kalan_yatirilabilir_tutar = userayar('macbasitutarcanli')-$oynanantoplammiktar;
$tutarihesaplama_zamani = $kalan_yatirilabilir_tutar-$tutar;
if($tutarihesaplama_zamani<0){

$return = array('status' => 123,'message' => "".$row_kontrols['ev_takim']." - ".$row_kontrols['konuk_takim']." Bu Karşılaşmanın Olduğu Kupona En Fazla ".$kalan_yatirilabilir_tutar." TRY Yatırabilirsiniz.");
print_r(json_encode($return));
exit();

}

}
### BİR MAÇA MAKSİMUM YATIRILABİLİR -- CANLI ###
}

$toplammac = sed_sql_numrows($toplamibul);

sed_sql_query("insert into kuponlar (id,user_id,username,oran,yatan,tutar,kupon_time,futbol,basketbol,tenis,voleybol,buzhokeyi,masatenisi,beyzbol,rugby,dovus,duello,canli,canlib,canlit,canliv,canlibuz,canlimt,toplam_mac,kupon_nots,durum,session_id,kupon_tarih,telefon,baslamatime,ipadres,mac_siralama,kupon_tarihi_belirle) values

('','$ub[id]','$ub[username]','$toplamoran','$tutar','$kazanc','$zaman','$cd_futbol','$cd_basketbol','$cd_tenis','$cd_voleybol','$cd_buzhokeyi','$cd_masatenisi','$cd_beyzbol','$cd_rugby','$cd_dovus','$cd_duello','$cd','$cdcanlibasket','$cdcanlitenis','$cdcanlivoleybol','$cdcanlibuzhokeyi','$cdcanlimasatenis','$toplammac','$kuponadi','1','$session_id','$tarih','$telefon','$baslatimebul[mac_time_kontrol]','$ipadres','$mac_siralama','$gunluk_tarih_ver')");

sed_sql_query("update kullanici set bakiye=bakiye-$tutar where id='$ub[id]'");


$kuponidbul = bilgi("select id,session_id,kupon_time from kuponlar where session_id='$session_id' order by id desc limit 1");

$kupon_id = $kuponidbul['id'];
$kupon_zaman = $kuponidbul['kupon_time'];

sed_sql_query("INSERT INTO hesap_hareket_gecici2 SET 
user_id='".$ub['id']."',
username='".$ub['username']."',
tip='cikar',
tutar = '".$tutar."',
onceki_tutar = '".$ub['bakiye']."',
aciklama = '".$kupon_id." numaralı kupon yatırıldı',
islemi_yapan = 'sistem',
zaman = '".$kupon_zaman."',
detay = '1'");

$sor = sed_sql_query("select * from kupon where session_id='$session_id'");

while($row=sed_sql_fetcharray($sor)) {
	
## KİTLENEN KODLAR ##
/*
if(userayar('orankoruma')=="1") {
	
$orani_kupon_icin_bul = $row['oran'];

$ayardaki = (float)userayar('orankorumamaxoran');

if($ayardaki < $orani_kupon_icin_bul)

$orani_kupon_icin_bul = $ayardaki;

$orani_kupona_isle = $orani_kupon_icin_bul;
	
} else if(userayar('orankoruma')=="0") {
	
$orani_kupona_isle = $row['oran'];
	
}
*/

$orani_kupon_icin_bul = $row['oran'];

$ayardaki = (float)userayar('orankorumamaxoran');

if($ayardaki < $orani_kupon_icin_bul)

$orani_kupon_icin_bul = $ayardaki;

$orani_kupona_isle = $orani_kupon_icin_bul;

## KİTLENEN KODLAR ##

$otbolu = explode("|",$row['oran_tip']);

$emaile_kupon_ic .= "Oran : $row[oran] ( $row[ev_takim] - vs - $row[konuk_takim] ) $otbolu[0] : $otbolu[1]

";

sed_sql_query("insert into kupon_ic (id,mbs,mac_kodu,ev_takim,konuk_takim,mac_db_id,mac_time,oran_val_id,oran_tip,oran_val,oran,session_id,spor_tip,kupon_id,user_id,username,canli_info,bulten,ilkgiris,sonucid) values ('','$row[mbs]','$row[mac_kodu]','$row[ev_takim]','$row[konuk_takim]','$row[mac_db_id]','$row[mac_time]','$row[oran_val_id]','$row[oran_tip]','$row[oran_val]','$orani_kupona_isle','$session_id','$row[spor_tip]','$kupon_id','$ub[id]','$ub[username]','$row[canli_info]','$row[bulten]','$row[ilkgiris]','$row[sonucid]')");

}



	//ceptelefonyap
$sonidbul = bilgi("select id from kuponlar where session_id='$session_id' order by id desc limit 1");

	if(strlen($telefon)>9) {
	
	mesajgonder($sonidbul['id'],$telefon);
	}
	

	

	// email gonder

	

	$pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';

	if(preg_match($pattern, userayar('email_adres')) === 1) {

$mesaji = "Kupon no: $sonidbul[id]

Toplam oran: $toplamoran

Yatırılan: $tutar

Kazanç: $kazanc

Kupon zamanı: ". date("d.m.Y H:i:s") ."



------------ Kupon içeriği --------------


".$emaile_kupon_ic."

------------ Kupon içeriği sonu ---------



".userayar('site_adi')." bu uygulamayı güvenliğiniz için geliştirmiştir.

";

		$headers = "From: SISTEM <>\r\n";

		$headers .= "Reply-To: \r\n";

		$headers .= "MIME-Version: 1.0\r\n";

		$headers .= "Content-Type: text/plain; charset=utf-8\r\n";

		mail(userayar('email_adres'),"Kupon no: $sonidbul[id]",$mesaji,$headers);
		
		
		/*$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->Username = 'destekkupon2@gmail.com';
$mail->Password = 'silifke985369';
$mail->SetFrom($mail->Username, 'ArenaBett');
$mail->AddAddress($ayar['email_adres'], 'gönderilen kişinin adı soyadı');
$mail->CharSet = 'UTF-8';
$mail->Subject = "Kupon Kodu : $sonidbul[id]";
$content = '<div style="background: #eee; padding: 10px; font-size: 14px">Bu bir test e-posta\'dır..</div>';
$mail->MsgHTML($mesaji);
if($mail->Send()) {
    // e-posta başarılı ile gönderildi
} else {
    // bir sorun var, sorunu ekrana bastıralım
    echo $mail->ErrorInfo;
}*/

	}




unset($_SESSION['ilk_zaman']);
die("200");

}

//mysqli_close($linkdatas);
?>