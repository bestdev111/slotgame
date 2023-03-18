<ul class="level_1">
<?php
session_start();
include('db.php');

function getTranslation22($word, $lang = null){
$lang_ver = gd('user_dil_bul');
if($lang_ver=='') {
$languageFile = "languages_verss/tr.ini";
} else {
$languageFile = "languages_verss/".$lang_ver.".ini";
}
$translate = parse_ini_file($languageFile);
if (isset($translate[$word])) {
return $translate[$word];
}
return $translate[$word];
}

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
} else if($ulkeismi=="Bulgaristan"){
	$ulketranslate = "".getTranslation('ulke_isim_bulgaristan')."";
} else  if($ulkeismi=="Ürdün"){
	$ulketranslate = "".getTranslation('ulke_isim_urdun')."";
} else if($ulkeismi=="Belçika"){
	$ulketranslate = "".getTranslation('ulke_isim_belcika')."";
} else if($ulkeismi=="Kıbrıs Rum Kesimi"){
	$ulketranslate = "".getTranslation('ulke_isim_kibrisrumkesimi')."";
} else if($ulkeismi=="Hollanda"){
	$ulketranslate = "".getTranslation('ulke_isim_hollanda')."";
} else if($ulkeismi=="İsviçre"){
	$ulketranslate = "".getTranslation('ulke_isim_isvicre')."";
} else if($ulkeismi=="Tayland"){
	$ulketranslate = "".getTranslation('ulke_isim_tayland')."";
} else if($ulkeismi=="Gürcistan"){
	$ulketranslate = "".getTranslation('ulke_isim_gurcistan')."";
} else if($ulkeismi=="Çin"){
	$ulketranslate = "".getTranslation('ulke_isim_cin')."";
} else if($ulkeismi=="Kamboçya"){
	$ulketranslate = "".getTranslation('ulke_isim_kambocya')."";
} else if($ulkeismi=="Endonezya"){
	$ulketranslate = "".getTranslation('ulke_isim_endonezya')."";
} else if($ulkeismi=="Kore (Güney)"){
	$ulketranslate = "".getTranslation('ulke_isim_koreguney')."";
} else if($ulkeismi=="Birleşik Arap Emirlikleri"){
	$ulketranslate = "".getTranslation('ulke_isim_birlesikarapemirlikleri')."";
} else if($ulkeismi=="İskoçya"){
	$ulketranslate = "".getTranslation('ulke_isim_iskocya')."";
} else if($ulkeismi=="Bolivya"){
	$ulketranslate = "".getTranslation('ulke_isim_bolivya')."";
} else if($ulkeismi=="Bolivya"){
	$ulketranslate = "".getTranslation('ulke_isim_bolivya')."";
} else if($ulkeismi=="Dominik Cumhuriyeti"){
	$ulketranslate = "".getTranslation('ulke_isim_dominikcumhuriyeti')."";
} else if($ulkeismi=="Arnavutluk"){
	$ulketranslate = "".getTranslation('ulke_isim_arnavutluk')."";
} else if($ulkeismi=="Slovenya"){
	$ulketranslate = "".getTranslation('ulke_isim_slovenya')."";
} else if($ulkeismi=="Filistin"){
	$ulketranslate = "".getTranslation('ulke_isim_filistin')."";
} else if($ulkeismi=="Ermenistan"){
	$ulketranslate = "".getTranslation('ulke_isim_ermenistan')."";
} else if($ulkeismi=="Faroe Adaları"){
	$ulketranslate = "".getTranslation('ulke_isim_fareoadalari')."";
} else if($ulkeismi=="Kuzey İrlanda"){
	$ulketranslate = "".getTranslation('ulke_isim_kuzeyirlanda')."";
} else if($ulkeismi=="Güney Afrika"){
	$ulketranslate = "".getTranslation('ulke_isim_guneyafrika')."";
} else if($ulkeismi=="Bosna Hersek"){
	$ulketranslate = "".getTranslation('ulke_isim_bosnahersek')."";
} else if($ulkeismi=="Katar"){
	$ulketranslate = "".getTranslation('ulke_isim_katar')."";
} else if($ulkeismi=="Afrika"){
	$ulketranslate = "".getTranslation('ulke_isim_afrika')."";
} else if($ulkeismi=="Tanzanya"){
	$ulketranslate = "".getTranslation('ulke_isim_tanzanya')."";
} else if($ulkeismi=="Letonya"){
	$ulketranslate = "".getTranslation('ulke_isim_letonya')."";
} else if($ulkeismi=="Suudi Arabistan"){
	$ulketranslate = "".getTranslation('ulke_isim_suudiarabistan')."";
} else if($ulkeismi=="Özbekistan"){
	$ulketranslate = "".getTranslation('ulke_isim_ozbekistan')."";
} else if($ulkeismi=="Amerika"){
	$ulketranslate = "".getTranslation('ulke_isim_amarika')."";
} else if($ulkeismi=="Pakistan"){
	$ulketranslate = "".getTranslation('ulke_isim_pakistan')."";
} else if($ulkeismi=="Cebelitarık"){
	$ulketranslate = "".getTranslation('ulke_isim_cebelitarik')."";
} else if($ulkeismi=="Cezayir"){
	$ulketranslate = "".getTranslation('ulke_isim_cezayir')."";
} else if($ulkeismi=="Kuzey Makedonya"){
	$ulketranslate = "".getTranslation('ulke_isim_kuzeymakedonya')."";
} else if($ulkeismi=="Malezya"){
	$ulketranslate = "".getTranslation('ulke_isim_malezya')."";
} else if($ulkeismi=="Ekvator"){
	$ulketranslate = "".getTranslation('ulke_isim_ekvator')."";
} else if($ulkeismi=="Azerbaycan"){
	$ulketranslate = "".getTranslation('ulke_isim_azerbaycan')."";
} else
{
	$ulketranslate = $ulkeismi;
}

return $ulketranslate;
}

$gelen = gd('time');
$alt_durum_bul = gd('alt_durum_bul');
$alt_alt_durum_bul = gd('alt_alt_durum_bul');
$tip1 = gd('tip1');
$tip2 = gd('tip2');
$tip3 = gd('tip3');
$tip4 = gd('tip4');
$tip5 = gd('tip5');
$tip6 = gd('tip6');
$tip7 = gd('tip7');
$tip8 = gd('tip8');
if($gelen=="1"){
	$secilitarih = strtotime(date("Y-m-d 23:59:59"));
}
if($gelen=="3"){
	$secilitarih = time()+10800;
}
if($gelen=="24"){
	$secilitarih = time()+86400;
}
if($gelen=="3days"){
	$secilitarih = time()+259200;
}
if($gelen=="all"){
	$secilitarih = time()+2592000;
}
if(!$secilitarih){
	$secilitarih = time()+2592000;
}

$kayittime_ver = time()-300;

$futbolsayi_ver = sed_sql_fetchassoc(sed_sql_query("select COUNT(DISTINCT id) AS sayi from program_futbol where mac_time>'".time()."' AND mac_time<'".$secilitarih."' AND kayittime<$kayittime_ver AND bulten='hititbet' AND aktif='1'"));

$turkiyesayi_ver = sed_sql_fetchassoc(sed_sql_query("select COUNT(DISTINCT id) AS sayi from program_futbol where mac_time>'".time()."' AND mac_time<'".$secilitarih."' AND kayittime<$kayittime_ver AND kupa_ulke='Türkiye' AND aktif='1'"));

$ingilteresayi_ver = sed_sql_fetchassoc(sed_sql_query("select COUNT(DISTINCT id) AS sayi from program_futbol where mac_time>'".time()."' AND mac_time<'".$secilitarih."' AND kayittime<$kayittime_ver AND kupa_ulke='İngiltere' AND aktif='1'"));

$ispanyasayi_ver = sed_sql_fetchassoc(sed_sql_query("select COUNT(DISTINCT id) AS sayi from program_futbol where mac_time>'".time()."' AND mac_time<'".$secilitarih."' AND kayittime<$kayittime_ver AND kupa_ulke='İspanya' AND aktif='1'"));

$almanyasayi_ver = sed_sql_fetchassoc(sed_sql_query("select COUNT(DISTINCT id) AS sayi from program_futbol where mac_time>'".time()."' AND mac_time<'".$secilitarih."' AND kayittime<$kayittime_ver AND kupa_ulke='Almanya' AND aktif='1'"));

$italyasayi_ver = sed_sql_fetchassoc(sed_sql_query("select COUNT(DISTINCT id) AS sayi from program_futbol where mac_time>'".time()."' AND mac_time<'".$secilitarih."' AND kayittime<$kayittime_ver AND kupa_ulke='İtalya' AND aktif='1'"));

$fransasayi_ver = sed_sql_fetchassoc(sed_sql_query("select COUNT(DISTINCT id) AS sayi from program_futbol where mac_time>'".time()."' AND mac_time<'".$secilitarih."' AND kayittime<$kayittime_ver AND kupa_ulke='Fransa' AND aktif='1'"));

if(userayar('sporbulten')==0) {

$futbolsayi = "0";

$turkiyesayi = "0";

$ingilteresayi = "0";

$ispanyasayi = "0";

$almanyasayi = "0";

$italyasayi = "0";

$fransasayi = "0";

} else {

$futbolsayi = $futbolsayi_ver["sayi"];

$turkiyesayi = $turkiyesayi_ver["sayi"];

$ingilteresayi = $ingilteresayi_ver["sayi"];

$ispanyasayi = $ispanyasayi_ver["sayi"];

$almanyasayi = $almanyasayi_ver["sayi"];

$italyasayi = $italyasayi_ver["sayi"];

$fransasayi = $fransasayi_ver["sayi"];

}

?>

<li itemprop="" itemscope="" itemtype="">
<a data-qa="groupNavSports1" id="jq-navBlock-GROUP-FL1" href="javascript:;" onclick="toggleOrLoad(event,'start','FL1','GROUP','@GROUP_FL1/leftside/secondLevel?groupId=FL1&amp;type=start&amp;navType=GROUP&amp;slide=true', '1', '0', '#');return empty();" style="color:#fff;" class="nav_1 num_3 onss">
<span class="left" style="width:130px;"><object style="filter: brightness(4);height: 16px;margin-right: 5px;margin-top: 6px;float: left;" data="assets/img/favoriligler.svg" type="image/png"></object><?=getTranslation22('favoriulkeler')?></span>
</a>
</li>

<div class="e_active e_noCache " id="comp-GROUP_FL1" style="display: none;">
<ul class="level_2 hide" style="display: block;">
<li itemprop="" itemscope="" itemtype="">
<a data-qa="groupNavSports1" href="javascript:;" class="nav_1 num_3" onclick="favoriulkegetir(1);">
<span class="left"><object style="height: 20px;margin-right: 5px;margin-top: 5px;float: left;" data="assets/img/ulkeler/turkiye.png" type="image/png"></object><?=getTranslation('yeniyerler_kasa385')?></span>
<span class="num_r" style="display: block;color:#fff;"><?=$turkiyesayi;?></span>
</a>
</li>

<li itemprop="" itemscope="" itemtype="">
<a data-qa="groupNavSports1" href="javascript:;" class="nav_1 num_3" onclick="favoriulkegetir(2);">
<span class="left"><object style="height: 20px;margin-right: 5px;margin-top: 5px;float: left;" data="assets/img/ulkeler/ingiltere.png" type="image/png"></object><?=getTranslation('yeniyerler_kasa386')?></span>
<span class="num_r" style="display: block;color:#fff;"><?=$ingilteresayi;?></span>
</a>
</li>

<li itemprop="" itemscope="" itemtype="">
<a data-qa="groupNavSports1" href="javascript:;" class="nav_1 num_3" onclick="favoriulkegetir(3);">
<span class="left"><object style="height: 20px;margin-right: 5px;margin-top: 5px;float: left;" data="assets/img/ulkeler/ispanya.png" type="image/png"></object><?=getTranslation('yeniyerler_kasa387')?></span>
<span class="num_r" style="display: block;color:#fff;"><?=$ispanyasayi;?></span>
</a>
</li>

<li itemprop="" itemscope="" itemtype="">
<a data-qa="groupNavSports1" href="javascript:;" class="nav_1 num_3" onclick="favoriulkegetir(4);">
<span class="left"><object style="height: 20px;margin-right: 5px;margin-top: 5px;float: left;" data="assets/img/ulkeler/almanya.png" type="image/png"></object><?=getTranslation('yeniyerler_kasa388')?></span>
<span class="num_r" style="display: block;color:#fff;"><?=$almanyasayi;?></span>
</a>
</li>

<li itemprop="" itemscope="" itemtype="">
<a data-qa="groupNavSports1" href="javascript:;" class="nav_1 num_3" onclick="favoriulkegetir(5);">
<span class="left"><object style="height: 20px;margin-right: 5px;margin-top: 5px;float: left;" data="assets/img/ulkeler/italya.png" type="image/png"></object><?=getTranslation('yeniyerler_kasa389')?></span>
<span class="num_r" style="display: block;color:#fff;"><?=$italyasayi;?></span>
</a>
</li>

<li itemprop="" itemscope="" itemtype="">
<a data-qa="groupNavSports1" href="javascript:;" class="nav_1 num_3" onclick="favoriulkegetir(6);">
<span class="left"><object style="height: 20px;margin-right: 5px;margin-top: 5px;float: left;" data="assets/img/ulkeler/fransa.png" type="image/png"></object><?=getTranslation('yeniyerler_kasa390')?></span>
<span class="num_r" style="display: block;color:#fff;"><?=$fransasayi;?></span>
</a>
</li>
</ul>
</div>

<li itemprop="" itemscope="" itemtype="">
<a data-qa="groupNavSports1" id="jq-navBlock-GROUP-1001" href="javascript:;" onclick="toggleOrLoad(event,'start','1001','GROUP','@GROUP_1001/leftside/secondLevel?groupId=1001&amp;type=start&amp;navType=GROUP&amp;slide=true', '1', '0', '#');return empty();" class="nav_1 num_3">

<span class="left">
<object style="filter: brightness(4);height: 16px;margin-right: 5px;margin-top: 6px;float: left;" data="assets/img/sporticons/icon_soccer-1165587A803228C95E3B32D052349A1D.png" type="image/png">
<img src="assets/img/sporticons/icon_other-7E3E90420F366D3CDC96F509D0CE5B06.png">
</object>
<?=getTranslation22('futbol')?></span>
<span class="num_r" style="display: block;color:#fff;">
<?=$futbolsayi;?>
</span>
<span class="num_r hide" style="height: 23px; display: none;">
<img src="assets/nav_1_all-4A430644A83268DDE67A775FFF533380.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'1001','GROUP','addAll','start');" onmouseover="jQuery(this).attr('src', '/img/nav/nav_1_all_on-DA946D8292F8BCF233AB366E54D7A85B.png');tip('Tümünü seç', 0)" onmouseout="jQuery(this).attr('src', '/img/nav/nav_1_all-4A430644A83268DDE67A775FFF533380.png');untip()" width="14" height="14">
<img src="assets/nav_1_none-647BF787ADCCF7A827C5570570AB14BA.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'1001','GROUP','removeAll','start');" onmouseover="jQuery(this).attr('src', '/img/nav/nav_1_none_on-CB579CBB8A7D41832A88823D9DE30CA7.png');tip('Seçimi temizle', 0)" onmouseout="jQuery(this).attr('src', '/img/nav/nav_1_none-647BF787ADCCF7A827C5570570AB14BA.png');untip()" width="12" height="14">
</span>
</a>
<div class="e_active e_noCache " id="comp-GROUP_1001" style="display: none;">
<ul class="level_2 hide" style="display: block;">
<? 

$order = "FIELD(kupa_ulke,'Dünya','Faroe Adaları','Suriye','Macaristan','Montenegro','Yunanistan','Ermenistan','İzlanda','Estonya','Sırbistan','Filistin','Güney Kore','Slovenya','İsrail','Beyaz Rusya','Vietnam','Bulgaristan','Hırvatistan','Kosova','Kosova (Kosova)','Portekiz','Avusturya','Slovakya','Litvanya','Türkmenistan','Ukrayna','Polonya','Rusya','Romanya','Finlandiya','Çek Cumhuriyeti','Polanya','Isvec','Danimarka','Hollanda','Fransa','Italya','Ispanya','İngiltere','Almanya','Turkiye') DESC";

$order2 = "FIELD(kupa_isim,'Bundesliga','2. Bundesliga','3. Liga','Bundesliga - Eşzamanlı özel bahisler','2. Bundesliga konferans - Özel bahisler','LaLiga','LaLiga2','Superligaen','1. Division','Kakkonen A','Kakkonen B','Kakkonen C','I Liga','II Liga','V-League','V-League 2','Premier League','National League','K League 1','K League 2') ASC";

$gizli_ligler = gizli_lig_list();

$gizli_maclar = gizli_mac_list();

if($gizli_ligler=="") { $gizli_lig_ekle = ""; } else { $gizli_lig_ekle = "and ulkeadi not in ($gizli_ligler)"; }

if($gizli_maclar=="") { $gizli_mac_ekle = ""; } else { $gizli_mac_ekle = "and id not in ($gizli_maclar)"; } 

$gizli_ekle = "$gizli_lig_ekle $gizli_mac_ekle";

$i=0;
$sor = sed_sql_query("select *,COUNT(DISTINCT id) AS sayi from program_futbol where mac_time>'".time()."' AND mac_time<'".$secilitarih."' AND bulten='hititbet' AND aktif='1' $gizli_ekle GROUP BY kupa_ulke order by {$order}");
while($row=sed_sql_fetcharray($sor)){
$i++
?>
<li itemprop="" itemscope="" itemtype="">
<a data-qa="groupNavSports2" id="jq-navBlock-LOBBY-<?=$row["kupa_id"];?>" href="javascript:;" onclick="jQuery('#comp-GROUP_<?=$row["kupa_id"];?>').toggle();return loadcountry('<?=codekupon("ulke=".$row["kupa_ulke"]);?>');" class="nav_2 num_2 ">
<span class="left"><?=ulkeismiduzenleme($row["kupa_ulke"]);?></span>
<span class="num_r">
<? if(userayar('sporbulten')==0) { ?>0<? } else { ?><?=$row["sayi"];?><? } ?>
</span>
<span class="num_r hide" style="height:23px">
<img src="assets/nav_2_all-1EB3909B4DBADC95B32C3E919E7BA3F7.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'1001','LOBBY','addAll','start');" onmouseover="jQuery(this).attr('src', '/img/nav/nav_2_all_on-972C4B8EF11E6597FD7E7105752821A5.png');tip('Tümünü seç', 0)" onmouseout="jQuery(this).attr('src', '/img/nav/nav_2_all-1EB3909B4DBADC95B32C3E919E7BA3F7.png');untip()" width="14" height="14">
<img src="assets/nav_2_none-3E93FD54FC3AB72287F4EDAC9454269A.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'1001','LOBBY','removeAll','start');" onmouseover="jQuery(this).attr('src', '/img/nav/nav_2_none_on-BE2689087277D3D2E7A74A46F3EEC371.png');tip('Seçimi temizle', 0)" onmouseout="jQuery(this).attr('src', '/img/nav/nav_2_none-3E93FD54FC3AB72287F4EDAC9454269A.png');untip()" width="12" height="14">
</span>
</a>
<ul class="e_active e_noCache level_3 hide" id="comp-GROUP_<?=$row["kupa_id"];?>" style="display: none;">

<?
$sor2 = sed_sql_query("select *,COUNT(DISTINCT id) AS sayim from program_futbol where mac_time>'".time()."' AND mac_time<'".$secilitarih."' AND bulten='hititbet' and kupa_ulke='".$row["kupa_ulke"]."' AND aktif='1' $gizli_ekle GROUP BY kupa_isim order by {$order2}");
while($row2=sed_sql_fetcharray($sor2)){
?>
<li itemprop="" itemscope="" itemtype="" id="coklu">
<a data-qa="groupNavSports3" id="jq-navBlock-GROUP-<?=$row2["kupa_id"];?>">
<label class="nav_3 num_2 container22">
<input style="display:none;" type="checkbox" onclick="sportsgetir('futbol');" value="<?=$row2["kupa_id"];?>">
<i class="checkmark"></i>
<span class="left"><?=$row2["kupa_isim"];?> </span>
<span class="num_r"><? if(userayar('sporbulten')==0) { ?>0<? } else { ?><?=$row2["sayim"];?><? } ?></span>
</label>
</a>
</li>
<? } ?>
</ul>
</li>
<? if($i==10){break;} } ?>
</ul>

<ul class="level_2 hide">

<? 
 $i=0;
$sor = sed_sql_query("select *,COUNT(DISTINCT id) AS sayi from program_futbol where mac_time>'".time()."' AND mac_time<'".$secilitarih."' AND bulten='hititbet' AND aktif='1' $gizli_ekle GROUP BY kupa_ulke order by {$order}");
while($row=sed_sql_fetcharray($sor)){
$i++;
if($i>10){
?>
<li itemprop="" itemscope="" itemtype="">
<a data-qa="groupNavSports2" id="jq-navBlock-LOBBY-<?=$row["kupa_id"];?>" href="javascript:;" onclick="jQuery('#comp-GROUP_<?=$row["kupa_id"];?>').toggle();return loadcountry('<?=codekupon("ulke=".$row["kupa_ulke"]);?>');" class="nav_2 num_2 ">
<span class="left"><?=ulkeismiduzenleme($row["kupa_ulke"]);?></span>
<span class="num_r">
<? if(userayar('sporbulten')==0) { ?>0<? } else { ?><?=$row["sayi"];?><? } ?>
</span>
<span class="num_r hide" style="height:23px">
<img src="assets/nav_2_all-1EB3909B4DBADC95B32C3E919E7BA3F7.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'1001','LOBBY','addAll','start');" onmouseover="jQuery(this).attr('src', '/img/nav/nav_2_all_on-972C4B8EF11E6597FD7E7105752821A5.png');tip('Tümünü seç', 0)" onmouseout="jQuery(this).attr('src', '/img/nav/nav_2_all-1EB3909B4DBADC95B32C3E919E7BA3F7.png');untip()" width="14" height="14">
<img src="assets/nav_2_none-3E93FD54FC3AB72287F4EDAC9454269A.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'1001','LOBBY','removeAll','start');" onmouseover="jQuery(this).attr('src', '/img/nav/nav_2_none_on-BE2689087277D3D2E7A74A46F3EEC371.png');tip('Seçimi temizle', 0)" onmouseout="jQuery(this).attr('src', '/img/nav/nav_2_none-3E93FD54FC3AB72287F4EDAC9454269A.png');untip()" width="12" height="14">
</span>
</a>
<ul class="e_active e_noCache level_3 hide" id="comp-GROUP_<?=$row["kupa_id"];?>" style="display: none;">
<?
$sor2 = sed_sql_query("select *,COUNT(DISTINCT id) AS sayim from program_futbol where mac_time>'".time()."' AND mac_time<'".$secilitarih."' AND bulten='hititbet' and kupa_ulke='".$row["kupa_ulke"]."' AND aktif='1' $gizli_ekle GROUP BY kupa_isim order by {$order2}");
while($row2=sed_sql_fetcharray($sor2)){
?>
<li itemprop="" itemscope="" itemtype="" id="coklu">
<a data-qa="groupNavSports3" id="jq-navBlock-GROUP-<?=$row2["kupa_id"];?>">
<label class="nav_3 num_2 container22">
<input style="display:none;" type="checkbox" onclick="sportsgetir('futbol');" value="<?=$row2["kupa_id"];?>">
<i class="checkmark"></i>
<span class="left"><?=$row2["kupa_isim"];?> </span>
<span class="num_r"><? if(userayar('sporbulten')==0) { ?>0<? } else { ?><?=$row2["sayim"];?><? } ?></span>
</label>
</a>
</li>
<? } ?>
</ul>
</li>

<?  } }?>

</ul>
<div data-qa="groupNavFurther" id="jq-further-1001" class="nav_2 further" onclick="toggleFurther('1001')">
<span class="">
<? $total = $i-10; if($total<10){$total=0; echo $total;}else{echo $total;}?> <?=getTranslation('yeniyerler_kasa391')?></span>
<span class="hide"><?=getTranslation('yeniyerler_kasa392')?></span>
</div>

</div>
</li>

<? if($tip1=="1") { ?>

<?

$gizli_ligler_basketbol = gizli_lig_listb();

$gizli_maclar_basketbol = gizli_mac_listb();

if($gizli_ligler_basketbol=="") { $gizli_lig_ekle_basketbol = ""; } else { $gizli_lig_ekle_basketbol = "and kupa_isim not in ($gizli_ligler_basketbol)"; }

if($gizli_maclar_basketbol=="") { $gizli_mac_ekle_basketbol = ""; } else { $gizli_mac_ekle_basketbol = "and id not in ($gizli_maclar_basketbol)"; } 

$gizli_ekle_basketbol = "$gizli_lig_ekle_basketbol $gizli_mac_ekle_basketbol";

$futbolsayi = sed_sql_fetchassoc(sed_sql_query("select COUNT(DISTINCT id) AS sayi from program_basketbol where mac_time>'".time()."' AND mac_time<'".$secilitarih."' AND bulten='hititbet' AND (kimkazanir!='0' or 1x2!='0' or handikap!='0' or altust!='0') AND aktif='1' $gizli_ekle_basketbol"));

?>
<li itemprop="" itemscope="" itemtype="">
<a data-qa="groupNavSports1" id="jq-navBlock-GROUP-2002" href="javascript:;" onclick="toggleOrLoad(event,'start','2002','GROUP','@GROUP_2002/leftside/secondLevel?groupId=2002&amp;type=start&amp;navType=GROUP&amp;slide=true', '1', '0', '#');return empty();" class="nav_1 num_3">

<span class="left">
<object style="filter: brightness(4);height: 16px;margin-right: 5px;margin-top: 6px;float: left;" data="assets/img/sporticons/icon_basketball-14F0349CADC3D7927A85A6B4AB7BF39D.png" type="image/png">
<img src="assets/img/sporticons/icon_other-7E3E90420F366D3CDC96F509D0CE5B06.png">
</object>
<?=getTranslation22('basketbol')?></span>
<span class="num_r" style="display: block;color:#fff;">
<? if(userayar('sporbulten')==0) { ?>0<? } else { ?><?=$futbolsayi["sayi"];?><? } ?>
</span>
<span class="num_r hide" style="height: 23px; display: none;">
<img src="assets/nav_1_all-4A430644A83268DDE67A775FFF533380.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'2002','GROUP','addAll','start');" onmouseover="jQuery(this).attr('src', '/img/nav/nav_1_all_on-DA946D8292F8BCF233AB366E54D7A85B.png');tip('Tümünü seç', 0)" onmouseout="jQuery(this).attr('src', '/img/nav/nav_1_all-4A430644A83268DDE67A775FFF533380.png');untip()" width="14" height="14">
<img src="assets/nav_1_none-647BF787ADCCF7A827C5570570AB14BA.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'2002','GROUP','removeAll','start');" onmouseover="jQuery(this).attr('src', '/img/nav/nav_1_none_on-CB579CBB8A7D41832A88823D9DE30CA7.png');tip('Seçimi temizle', 0)" onmouseout="jQuery(this).attr('src', '/img/nav/nav_1_none-647BF787ADCCF7A827C5570570AB14BA.png');untip()" width="12" height="14">
</span>
</a>
<div class="e_active e_noCache " id="comp-GROUP_2002"  style="display: none;">
<ul class="level_2 hide" style="display: block;">
<? 
 $i=0;
$sor = sed_sql_query("select *,COUNT(DISTINCT id) AS sayi from program_basketbol where mac_time>'".time()."' AND mac_time<'".$secilitarih."' AND bulten='hititbet' AND (kimkazanir!='0' or 1x2!='0' or handikap!='0' or altust!='0') AND aktif='1' $gizli_ekle_basketbol GROUP BY kupa_ulke ");
while($row=sed_sql_fetcharray($sor)){
$i++
?>
<li itemprop="" itemscope="" itemtype="">
<a data-qa="groupNavSports2" id="jq-navBlock-LOBBY-<?=$row["kupa_id"];?>" href="javascript:;" onclick="jQuery('#comp-GROUP_<?=$row["kupa_id"];?>').toggle();return loadcountrybasketball('<?=codekupon("ulke=".$row["kupa_ulke"]);?>');" class="nav_2 num_2 ">
<span class="left"><?=ulkeismiduzenleme($row["kupa_ulke"]);?></span>
<span class="num_r">
<? if(userayar('sporbulten')==0) { ?>0<? } else { ?><?=$row["sayi"];?><? } ?>
</span>
<span class="num_r hide" style="height:23px">
<img src="assets/nav_2_all-1EB3909B4DBADC95B32C3E919E7BA3F7.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'2002','LOBBY','addAll','start');" onmouseover="jQuery(this).attr('src', '/img/nav/nav_2_all_on-972C4B8EF11E6597FD7E7105752821A5.png');tip('Tümünü seç', 0)" onmouseout="jQuery(this).attr('src', '/img/nav/nav_2_all-1EB3909B4DBADC95B32C3E919E7BA3F7.png');untip()" width="14" height="14">
<img src="assets/nav_2_none-3E93FD54FC3AB72287F4EDAC9454269A.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'2002','LOBBY','removeAll','start');" onmouseover="jQuery(this).attr('src', '/img/nav/nav_2_none_on-BE2689087277D3D2E7A74A46F3EEC371.png');tip('Seçimi temizle', 0)" onmouseout="jQuery(this).attr('src', '/img/nav/nav_2_none-3E93FD54FC3AB72287F4EDAC9454269A.png');untip()" width="12" height="14">
</span>
</a>
<ul class="e_active e_noCache level_3 hide" id="comp-GROUP_<?=$row["kupa_id"];?>" style="display: none;">
<?
$sor2 = sed_sql_query("select *,COUNT(DISTINCT id) AS sayim from program_basketbol where mac_time>'".time()."' AND mac_time<'".$secilitarih."' AND bulten='hititbet' AND (kimkazanir!='0' or 1x2!='0' or handikap!='0' or altust!='0') and kupa_ulke='".$row["kupa_ulke"]."' AND aktif='1' $gizli_ekle_basketbol GROUP BY kupa_isim");
while($row2=sed_sql_fetcharray($sor2)){
?>
<li itemprop="" itemscope="" itemtype="" id="coklu">
<a data-qa="groupNavSports3" id="jq-navBlock-GROUP-<?=$row2["kupa_id"];?>">
<label class="nav_3 num_2 container22">
<input style="display:none;" type="checkbox" onclick="sportsgetir('basketbol');" value="<?=$row2["kupa_id"];?>">
<i class="checkmark"></i>
<span class="left"><?=$row2["kupa_isim"];?> </span>
<span class="num_r"><? if(userayar('sporbulten')==0) { ?>0<? } else { ?><?=$row2["sayim"];?><? } ?></span>
</label>
</a>
</li>
<? } ?>
</ul>
</li>
<? if($i==10){break;} } ?>
</ul>

<ul class="level_2 hide">

<? 
 $i=0;
$sor = sed_sql_query("select *,COUNT(DISTINCT id) AS sayi from program_basketbol where mac_time>'".time()."' AND mac_time<'".$secilitarih."' AND bulten='hititbet' AND (kimkazanir!='0' or 1x2!='0' or handikap!='0' or altust!='0') AND aktif='1' $gizli_ekle_basketbol GROUP BY kupa_ulke");
while($row=sed_sql_fetcharray($sor)){
$i++;
if($i>10){
?>
<li itemprop="" itemscope="" itemtype="">
<a data-qa="groupNavSports2" id="jq-navBlock-LOBBY-<?=$row["kupa_id"];?>" href="javascript:;" onclick="jQuery('#comp-GROUP_<?=$row["kupa_id"];?>').toggle();return loadcountrybasketball('<?=codekupon("ulke=".$row["kupa_ulke"]);?>');" class="nav_2 num_2 ">
<span class="left"><?=ulkeismiduzenleme($row["kupa_ulke"]);?></span>
<span class="num_r">
<? if(userayar('sporbulten')==0) { ?>0<? } else { ?><?=$row["sayi"];?><? } ?>
</span>
<span class="num_r hide" style="height:23px">
<img src="assets/nav_2_all-1EB3909B4DBADC95B32C3E919E7BA3F7.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'2002','LOBBY','addAll','start');" onmouseover="jQuery(this).attr('src', '/img/nav/nav_2_all_on-972C4B8EF11E6597FD7E7105752821A5.png');tip('Tümünü seç', 0)" onmouseout="jQuery(this).attr('src', '/img/nav/nav_2_all-1EB3909B4DBADC95B32C3E919E7BA3F7.png');untip()" width="14" height="14">
<img src="assets/nav_2_none-3E93FD54FC3AB72287F4EDAC9454269A.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'2002','LOBBY','removeAll','start');" onmouseover="jQuery(this).attr('src', '/img/nav/nav_2_none_on-BE2689087277D3D2E7A74A46F3EEC371.png');tip('Seçimi temizle', 0)" onmouseout="jQuery(this).attr('src', '/img/nav/nav_2_none-3E93FD54FC3AB72287F4EDAC9454269A.png');untip()" width="12" height="14">
</span>
</a>
<ul class="e_active e_noCache level_3 hide" id="comp-GROUP_<?=$row["kupa_id"];?>" style="display: none;">
<?
$sor2 = sed_sql_query("select *,COUNT(DISTINCT id) AS sayim from program_basketbol where mac_time>'".time()."' AND mac_time<'".$secilitarih."' AND bulten='hititbet' AND (kimkazanir!='0' or 1x2!='0' or handikap!='0' or altust!='0') and kupa_ulke='".$row["kupa_ulke"]."' AND aktif='1' $gizli_ekle_basketbol GROUP BY kupa_isim");
while($row2=sed_sql_fetcharray($sor2)){
?>
<li itemprop="" itemscope="" itemtype="" id="coklu">
<a data-qa="groupNavSports3" id="jq-navBlock-GROUP-<?=$row2["kupa_id"];?>">
<label class="nav_3 num_2 container22">
<input style="display:none;" type="checkbox" onclick="sportsgetir('basketbol');" value="<?=$row2["kupa_id"];?>">
<i class="checkmark"></i>
<span class="left"><?=$row2["kupa_isim"];?> </span>
<span class="num_r"><? if(userayar('sporbulten')==0) { ?>0<? } else { ?><?=$row2["sayim"];?><? } ?></span>
</label>
</a>
</li>
<? } ?>
</ul>
</li>

<?  } }?>

</ul>
<div data-qa="groupNavFurther" id="jq-further-2002" class="nav_2 further" onclick="toggleFurther('2002')">
<span class="">
<? $total = $i-10; if($total<10){$total=0; echo $total;}else{echo $total;}?> <?=getTranslation('yeniyerler_kasa391')?></span>
<span class="hide"><?=getTranslation('yeniyerler_kasa392')?></span>
</div>

</div>
</li>

<? } ?>

<? if($tip2=="1") { ?>


<?

$gizli_ligler_tenis = gizli_lig_listt();

if($gizli_ligler_tenis=="") { $gizli_lig_ekle_tenis = ""; } else { $gizli_lig_ekle_tenis = "and kupa_isim not in ($gizli_ligler_tenis)"; }

$gizli_ekle_tenis = "$gizli_lig_ekle_tenis";

$futbolsayi = sed_sql_fetchassoc(sed_sql_query("select COUNT(DISTINCT id) AS sayi from program_tenis where mac_time>'".time()."' AND mac_time<'".$secilitarih."' AND bulten='hititbet' AND (kimkazanir!='0' or setbahisi!='0') AND aktif='1' $gizli_ekle_tenis"));

?>
<li itemprop="" itemscope="" itemtype="">
<a data-qa="groupNavSports1" id="jq-navBlock-GROUP-3003" href="javascript:;" onclick="toggleOrLoad(event,'start','3003','GROUP','@GROUP_3003/leftside/secondLevel?groupId=3003&amp;type=start&amp;navType=GROUP&amp;slide=true', '1', '0', '#');return empty();" class="nav_1 num_3">

<span class="left">
<object style="filter: brightness(4);height: 16px;margin-right: 5px;margin-top: 6px;float: left;" data="assets/img/sporticons/icon_tennis-9E6E475D6D707CEB3220ED2675F53E26.png" type="image/png">
<img src="assets/img/sporticons/icon_other-7E3E90420F366D3CDC96F509D0CE5B06.png">
</object>
<?=getTranslation22('tenis')?></span>
<span class="num_r" style="display: block;color:#fff;">
<? if(userayar('sporbulten')==0) { ?>0<? } else { ?><?=$futbolsayi["sayi"];?><? } ?>
</span>
<span class="num_r hide" style="height: 23px; display: none;">
<img src="assets/nav_1_all-4A430644A83268DDE67A775FFF533380.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'3003','GROUP','addAll','start');" onmouseover="jQuery(this).attr('src', '/img/nav/nav_1_all_on-DA946D8292F8BCF233AB366E54D7A85B.png');tip('Tümünü seç', 0)" onmouseout="jQuery(this).attr('src', '/img/nav/nav_1_all-4A430644A83268DDE67A775FFF533380.png');untip()" width="14" height="14">
<img src="assets/nav_1_none-647BF787ADCCF7A827C5570570AB14BA.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'3003','GROUP','removeAll','start');" onmouseover="jQuery(this).attr('src', '/img/nav/nav_1_none_on-CB579CBB8A7D41832A88823D9DE30CA7.png');tip('Seçimi temizle', 0)" onmouseout="jQuery(this).attr('src', '/img/nav/nav_1_none-647BF787ADCCF7A827C5570570AB14BA.png');untip()" width="12" height="14">
</span>
</a>
<div class="e_active e_noCache " id="comp-GROUP_3003"  style="display: none;">
<ul class="level_2 hide" style="display: block;">
<? 
 $i=0;
$sor = sed_sql_query("select *,COUNT(DISTINCT id) AS sayi from program_tenis where mac_time>'".time()."' AND mac_time<'".$secilitarih."' AND bulten='hititbet' AND (kimkazanir!='0' or setbahisi!='0') AND aktif='1' $gizli_ekle_tenis GROUP BY kupa_ulke ");
while($row=sed_sql_fetcharray($sor)){
$i++
?>
<li itemprop="" itemscope="" itemtype="">
<a data-qa="groupNavSports2" id="jq-navBlock-LOBBY-<?=$row["kupa_id"];?>" href="javascript:;" onclick="jQuery('#comp-GROUP_<?=$row["kupa_id"];?>').toggle();return loadcountrytennis('<?=codekupon("ulke=".$row["kupa_ulke"]);?>');" class="nav_2 num_2 ">
<span class="left"><?=ulkeismiduzenleme($row["kupa_ulke"]);?></span>
<span class="num_r">
<? if(userayar('sporbulten')==0) { ?>0<? } else { ?><?=$row["sayi"];?><? } ?>
</span>
<span class="num_r hide" style="height:23px">
<img src="assets/nav_2_all-1EB3909B4DBADC95B32C3E919E7BA3F7.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'3003','LOBBY','addAll','start');" onmouseover="jQuery(this).attr('src', '/img/nav/nav_2_all_on-972C4B8EF11E6597FD7E7105752821A5.png');tip('Tümünü seç', 0)" onmouseout="jQuery(this).attr('src', '/img/nav/nav_2_all-1EB3909B4DBADC95B32C3E919E7BA3F7.png');untip()" width="14" height="14">
<img src="assets/nav_2_none-3E93FD54FC3AB72287F4EDAC9454269A.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'3003','LOBBY','removeAll','start');" onmouseover="jQuery(this).attr('src', '/img/nav/nav_2_none_on-BE2689087277D3D2E7A74A46F3EEC371.png');tip('Seçimi temizle', 0)" onmouseout="jQuery(this).attr('src', '/img/nav/nav_2_none-3E93FD54FC3AB72287F4EDAC9454269A.png');untip()" width="12" height="14">
</span>
</a>
<ul class="e_active e_noCache level_3 hide" id="comp-GROUP_<?=$row["kupa_id"];?>" style="display: none;">
<?
$sor2 = sed_sql_query("select *,COUNT(DISTINCT id) AS sayim from program_tenis where mac_time>'".time()."' AND mac_time<'".$secilitarih."' AND bulten='hititbet' AND (kimkazanir!='0' or setbahisi!='0') and kupa_ulke='".$row["kupa_ulke"]."' AND aktif='1' $gizli_ekle_tenis GROUP BY kupa_isim");
while($row2=sed_sql_fetcharray($sor2)){
?>
<li itemprop="" itemscope="" itemtype="" id="coklu">
<a data-qa="groupNavSports3" id="jq-navBlock-GROUP-<?=$row2["kupa_id"];?>">
<label class="nav_3 num_2 container22">
<input style="display:none;" type="checkbox" onclick="sportsgetir('tenis');" value="<?=$row2["kupa_id"];?>">
<i class="checkmark"></i>
<span class="left"><?=$row2["kupa_isim"];?> </span>
<span class="num_r"><? if(userayar('sporbulten')==0) { ?>0<? } else { ?><?=$row2["sayim"];?><? } ?></span>
</label>
</a>
</li>
<? } ?>
</ul>
</li>
<? if($i==10){break;} } ?>
</ul>

<ul class="level_2 hide">

<? 
 $i=0;
$sor = sed_sql_query("select *,COUNT(DISTINCT id) AS sayi from program_tenis where mac_time>'".time()."' AND mac_time<'".$secilitarih."' AND bulten='hititbet' AND (kimkazanir!='0' or setbahisi!='0') AND aktif='1' $gizli_ekle_tenis GROUP BY kupa_ulke");
while($row=sed_sql_fetcharray($sor)){
$i++;
if($i>10){
?>
<li itemprop="" itemscope="" itemtype="">
<a data-qa="groupNavSports2" id="jq-navBlock-LOBBY-<?=$row["kupa_id"];?>" href="javascript:;" onclick="jQuery('#comp-GROUP_<?=$row["kupa_id"];?>').toggle();return loadcountrytennis('<?=codekupon("ulke=".$row["kupa_ulke"]);?>');" class="nav_2 num_2 ">
<span class="left"><?=ulkeismiduzenleme($row["kupa_ulke"]);?></span>
<span class="num_r">
<? if(userayar('sporbulten')==0) { ?>0<? } else { ?><?=$row["sayi"];?><? } ?>
</span>
<span class="num_r hide" style="height:23px">
<img src="assets/nav_2_all-1EB3909B4DBADC95B32C3E919E7BA3F7.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'3003','LOBBY','addAll','start');" onmouseover="jQuery(this).attr('src', '/img/nav/nav_2_all_on-972C4B8EF11E6597FD7E7105752821A5.png');tip('Tümünü seç', 0)" onmouseout="jQuery(this).attr('src', '/img/nav/nav_2_all-1EB3909B4DBADC95B32C3E919E7BA3F7.png');untip()" width="14" height="14">
<img src="assets/nav_2_none-3E93FD54FC3AB72287F4EDAC9454269A.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'3003','LOBBY','removeAll','start');" onmouseover="jQuery(this).attr('src', '/img/nav/nav_2_none_on-BE2689087277D3D2E7A74A46F3EEC371.png');tip('Seçimi temizle', 0)" onmouseout="jQuery(this).attr('src', '/img/nav/nav_2_none-3E93FD54FC3AB72287F4EDAC9454269A.png');untip()" width="12" height="14">
</span>
</a>
<ul class="e_active e_noCache level_3 hide" id="comp-GROUP_<?=$row["kupa_id"];?>" style="display: none;">
<?
$sor2 = sed_sql_query("select *,COUNT(DISTINCT id) AS sayim from program_tenis where mac_time>'".time()."' AND mac_time<'".$secilitarih."' AND bulten='hititbet' AND (kimkazanir!='0' or setbahisi!='0') and kupa_ulke='".$row["kupa_ulke"]."' AND aktif='1' $gizli_ekle_tenis GROUP BY kupa_isim");
while($row2=sed_sql_fetcharray($sor2)){
?>
<li itemprop="" itemscope="" itemtype="" id="coklu">
<a data-qa="groupNavSports3" id="jq-navBlock-GROUP-<?=$row2["kupa_id"];?>">
<label class="nav_3 num_2 container22">
<input style="display:none;" type="checkbox" onclick="sportsgetir('tenis');" value="<?=$row2["kupa_id"];?>">
<i class="checkmark"></i>
<span class="left"><?=$row2["kupa_isim"];?> </span>
<span class="num_r"><? if(userayar('sporbulten')==0) { ?>0<? } else { ?><?=$row2["sayim"];?><? } ?></span>
</label>
</a>
</li>
<? } ?>
</ul>
</li>

<?  } }?>

</ul>
<div data-qa="groupNavFurther" id="jq-further-3003" class="nav_2 further" onclick="toggleFurther('3003')">
<span class="">
<? $total = $i-10; if($total<10){$total=0; echo $total;}else{echo $total;}?> <?=getTranslation('yeniyerler_kasa391')?></span>
<span class="hide"><?=getTranslation('yeniyerler_kasa392')?></span>
</div>

</div>
</li>

<? } ?>

<? if($tip3=="1") { ?>

<?
$futbolsayi = sed_sql_fetchassoc(sed_sql_query("select COUNT(DISTINCT id) AS sayi from program_voleybol where mac_time>'".time()."' AND mac_time<'".$secilitarih."' AND bulten='hititbet' AND aktif='1'"));

?>
<li itemprop="" itemscope="" itemtype="">
<a data-qa="groupNavSports1" id="jq-navBlock-GROUP-4004" href="javascript:;" onclick="toggleOrLoad(event,'start','4004','GROUP','@GROUP_4004/leftside/secondLevel?groupId=4004&amp;type=start&amp;navType=GROUP&amp;slide=true', '1', '0', '#');return empty();" class="nav_1 num_3">

<span class="left">
<object style="filter: brightness(4);height: 16px;margin-right: 5px;margin-top: 6px;float: left;" data="assets/img/sporticons/icon_volleyball-B1C0CF0EFEB3127D0B629E2BE70D337A.png" type="image/png">
<img src="assets/img/sporticons/icon_other-7E3E90420F366D3CDC96F509D0CE5B06.png">
</object>
<?=getTranslation22('voleybol')?></span>
<span class="num_r" style="display: block;color:#fff;">
<? if(userayar('sporbulten')==0) { ?>0<? } else { ?><?=$futbolsayi["sayi"];?><? } ?>
</span>
<span class="num_r hide" style="height: 23px; display: none;">
<img src="assets/nav_1_all-4A430644A83268DDE67A775FFF533380.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'4004','GROUP','addAll','start');" onmouseover="jQuery(this).attr('src', '/img/nav/nav_1_all_on-DA946D8292F8BCF233AB366E54D7A85B.png');tip('Tümünü seç', 0)" onmouseout="jQuery(this).attr('src', '/img/nav/nav_1_all-4A430644A83268DDE67A775FFF533380.png');untip()" width="14" height="14">
<img src="assets/nav_1_none-647BF787ADCCF7A827C5570570AB14BA.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'4004','GROUP','removeAll','start');" onmouseover="jQuery(this).attr('src', '/img/nav/nav_1_none_on-CB579CBB8A7D41832A88823D9DE30CA7.png');tip('Seçimi temizle', 0)" onmouseout="jQuery(this).attr('src', '/img/nav/nav_1_none-647BF787ADCCF7A827C5570570AB14BA.png');untip()" width="12" height="14">
</span>
</a>
<div class="e_active e_noCache " id="comp-GROUP_4004"  style="display: none;">
<ul class="level_2 hide" style="display: block;">
<? 
 $i=0;
$sor = sed_sql_query("select *,COUNT(DISTINCT id) AS sayi from program_voleybol where mac_time>'".time()."' AND mac_time<'".$secilitarih."' AND bulten='hititbet' AND aktif='1' GROUP BY kupa_ulke ");
while($row=sed_sql_fetcharray($sor)){
$i++
?>
<li itemprop="" itemscope="" itemtype="">
<a data-qa="groupNavSports2" id="jq-navBlock-LOBBY-<?=$row["kupa_id"];?>" href="javascript:;" onclick="jQuery('#comp-GROUP_<?=$row["kupa_id"];?>').toggle();return loadcountryvolleyball('<?=codekupon("ulke=".$row["kupa_ulke"]);?>');" class="nav_2 num_2 ">
<span class="left"><?=ulkeismiduzenleme($row["kupa_ulke"]);?></span>
<span class="num_r">
<? if(userayar('sporbulten')==0) { ?>0<? } else { ?><?=$row["sayi"];?><? } ?>
</span>
<span class="num_r hide" style="height:23px">
<img src="assets/nav_2_all-1EB3909B4DBADC95B32C3E919E7BA3F7.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'4004','LOBBY','addAll','start');" onmouseover="jQuery(this).attr('src', '/img/nav/nav_2_all_on-972C4B8EF11E6597FD7E7105752821A5.png');tip('Tümünü seç', 0)" onmouseout="jQuery(this).attr('src', '/img/nav/nav_2_all-1EB3909B4DBADC95B32C3E919E7BA3F7.png');untip()" width="14" height="14">
<img src="assets/nav_2_none-3E93FD54FC3AB72287F4EDAC9454269A.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'4004','LOBBY','removeAll','start');" onmouseover="jQuery(this).attr('src', '/img/nav/nav_2_none_on-BE2689087277D3D2E7A74A46F3EEC371.png');tip('Seçimi temizle', 0)" onmouseout="jQuery(this).attr('src', '/img/nav/nav_2_none-3E93FD54FC3AB72287F4EDAC9454269A.png');untip()" width="12" height="14">
</span>
</a>
<ul class="e_active e_noCache level_3 hide" id="comp-GROUP_<?=$row["kupa_id"];?>" style="display: none;">
<?
$sor2 = sed_sql_query("select *,COUNT(DISTINCT id) AS sayim from program_voleybol where mac_time>'".time()."' AND mac_time<'".$secilitarih."' AND bulten='hititbet' and kupa_ulke='".$row["kupa_ulke"]."' AND aktif='1' GROUP BY kupa_isim");
while($row2=sed_sql_fetcharray($sor2)){
?>
<li itemprop="" itemscope="" itemtype="" id="coklu">
<a data-qa="groupNavSports3" id="jq-navBlock-GROUP-<?=$row2["kupa_id"];?>">
<label class="nav_3 num_2 container22">
<input style="display:none;" type="checkbox" onclick="sportsgetir('voleybol');" value="<?=$row2["kupa_id"];?>">
<i class="checkmark"></i>
<span class="left"><?=$row2["kupa_isim"];?> </span>
<span class="num_r"><? if(userayar('sporbulten')==0) { ?>0<? } else { ?><?=$row2["sayim"];?><? } ?></span>
</label>
</a>
</li>
<? } ?>
</ul>
</li>
<? if($i==10){break;} } ?>
</ul>

<ul class="level_2 hide">

<? 
 $i=0;
$sor = sed_sql_query("select *,COUNT(DISTINCT id) AS sayi from program_voleybol where mac_time>'".time()."' AND mac_time<'".$secilitarih."' AND bulten='hititbet' AND aktif='1' GROUP BY kupa_ulke");
while($row=sed_sql_fetcharray($sor)){
$i++;
if($i>10){
?>
<li itemprop="" itemscope="" itemtype="">
<a data-qa="groupNavSports2" id="jq-navBlock-LOBBY-<?=$row["kupa_id"];?>" href="javascript:;" onclick="jQuery('#comp-GROUP_<?=$row["kupa_id"];?>').toggle();return loadcountryvolleyball('<?=codekupon("ulke=".$row["kupa_ulke"]);?>');" class="nav_2 num_2 ">
<span class="left"><?=ulkeismiduzenleme($row["kupa_ulke"]);?></span>
<span class="num_r">
<? if(userayar('sporbulten')==0) { ?>0<? } else { ?><?=$row["sayi"];?><? } ?>
</span>
<span class="num_r hide" style="height:23px">
<img src="assets/nav_2_all-1EB3909B4DBADC95B32C3E919E7BA3F7.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'4004','LOBBY','addAll','start');" onmouseover="jQuery(this).attr('src', '/img/nav/nav_2_all_on-972C4B8EF11E6597FD7E7105752821A5.png');tip('Tümünü seç', 0)" onmouseout="jQuery(this).attr('src', '/img/nav/nav_2_all-1EB3909B4DBADC95B32C3E919E7BA3F7.png');untip()" width="14" height="14">
<img src="assets/nav_2_none-3E93FD54FC3AB72287F4EDAC9454269A.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'4004','LOBBY','removeAll','start');" onmouseover="jQuery(this).attr('src', '/img/nav/nav_2_none_on-BE2689087277D3D2E7A74A46F3EEC371.png');tip('Seçimi temizle', 0)" onmouseout="jQuery(this).attr('src', '/img/nav/nav_2_none-3E93FD54FC3AB72287F4EDAC9454269A.png');untip()" width="12" height="14">
</span>
</a>
<ul class="e_active e_noCache level_3 hide" id="comp-GROUP_<?=$row["kupa_id"];?>" style="display: none;">
<?
$sor2 = sed_sql_query("select *,COUNT(DISTINCT id) AS sayim from program_voleybol where mac_time>'".time()."' AND mac_time<'".$secilitarih."' AND bulten='hititbet' and kupa_ulke='".$row["kupa_ulke"]."' AND aktif='1' GROUP BY kupa_isim");
while($row2=sed_sql_fetcharray($sor2)){
?>
<li itemprop="" itemscope="" itemtype="" id="coklu">
<a data-qa="groupNavSports3" id="jq-navBlock-GROUP-<?=$row2["kupa_id"];?>">
<label class="nav_3 num_2 container22">
<input style="display:none;" type="checkbox" onclick="sportsgetir('voleybol');" value="<?=$row2["kupa_id"];?>">
<i class="checkmark"></i>
<span class="left"><?=$row2["kupa_isim"];?> </span>
<span class="num_r"><? if(userayar('sporbulten')==0) { ?>0<? } else { ?><?=$row2["sayim"];?><? } ?></span>
</label>
</a>
</li>
<? } ?>
</ul>
</li>

<?  } }?>

</ul>
<div data-qa="groupNavFurther" id="jq-further-4004" class="nav_2 further" onclick="toggleFurther('4004')">
<span class="">
<? $total = $i-10; if($total<10){$total=0; echo $total;}else{echo $total;}?> <?=getTranslation('yeniyerler_kasa391')?></span>
<span class="hide"><?=getTranslation('yeniyerler_kasa392')?></span>
</div>

</div>
</li>

<? } ?>

<? if($tip4=="1") { ?>

<?
$futbolsayi = sed_sql_fetchassoc(sed_sql_query("select COUNT(DISTINCT id) AS sayi from program_buzhokeyi where mac_time>'".time()."' AND mac_time<'".$secilitarih."' AND bulten='hititbet' AND aktif='1'"));

?>
<li itemprop="" itemscope="" itemtype="">
<a data-qa="groupNavSports1" id="jq-navBlock-GROUP-5005" href="javascript:;" onclick="toggleOrLoad(event,'start','5005','GROUP','@GROUP_5005/leftside/secondLevel?groupId=5005&amp;type=start&amp;navType=GROUP&amp;slide=true', '1', '0', '#');return empty();" class="nav_1 num_3">

<span class="left">
<object style="filter: brightness(4);height: 16px;margin-right: 5px;margin-top: 6px;float: left;" data="assets/img/sporticons/icon_ice-hockey-BC31DBA3F14652F2DA362723E8D8C866.png" type="image/png">
<img src="assets/img/sporticons/icon_other-7E3E90420F366D3CDC96F509D0CE5B06.png">
</object>
<?=getTranslation22('buzhokeyi')?></span>
<span class="num_r" style="display: block;color:#fff;">
<? if(userayar('sporbulten')==0) { ?>0<? } else { ?><?=$futbolsayi["sayi"];?><? } ?>
</span>
<span class="num_r hide" style="height: 23px; display: none;">
<img src="assets/nav_1_all-4A430644A83268DDE67A775FFF533380.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'5005','GROUP','addAll','start');" onmouseover="jQuery(this).attr('src', 'assets/img/nav/nav_1_all_on-DA946D8292F8BCF233AB366E54D7A85B.png');tip('Tümünü seç', 0)" onmouseout="jQuery(this).attr('src', 'assets/img/nav/nav_1_all-4A430644A83268DDE67A775FFF533380.png');untip()" width="14" height="14">
<img src="assets/nav_1_none-647BF787ADCCF7A827C5570570AB14BA.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'5005','GROUP','removeAll','start');" onmouseover="jQuery(this).attr('src', 'assets/img/nav/nav_1_none_on-CB579CBB8A7D41832A88823D9DE30CA7.png');tip('Seçimi temizle', 0)" onmouseout="jQuery(this).attr('src', 'assets/img/nav/nav_1_none-647BF787ADCCF7A827C5570570AB14BA.png');untip()" width="12" height="14">
</span>
</a>
<div class="e_active e_noCache " id="comp-GROUP_5005"  style="display: none;">
<ul class="level_2 hide" style="display: block;">
<? 
 $i=0;
$sor = sed_sql_query("select *,COUNT(DISTINCT id) AS sayi from program_buzhokeyi where mac_time>'".time()."' AND bulten='hititbet' AND aktif='1' GROUP BY kupa_ulke ");
while($row=sed_sql_fetcharray($sor)){
$i++
?>
<li itemprop="" itemscope="" itemtype="">
<a data-qa="groupNavSports2" id="jq-navBlock-LOBBY-<?=$row["kupa_id"];?>" href="javascript:;" onclick="jQuery('#comp-GROUP_<?=$row["kupa_id"];?>').toggle();return loadcountrybuzhokeyi('<?=codekupon2("ulke=".$row["kupa_ulke"]);?>');" class="nav_2 num_2 ">
<span class="left"><?=ulkeismiduzenleme($row["kupa_ulke"]);?></span>
<span class="num_r">
<? if(userayar('sporbulten')==0) { ?>0<? } else { ?><?=$row["sayi"];?><? } ?>
</span>
<span class="num_r hide" style="height:23px">
<img src="assets/nav_2_all-1EB3909B4DBADC95B32C3E919E7BA3F7.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'5005','LOBBY','addAll','start');" onmouseover="jQuery(this).attr('src', 'assets/img/nav/nav_2_all_on-972C4B8EF11E6597FD7E7105752821A5.png');tip('Tümünü seç', 0)" onmouseout="jQuery(this).attr('src', 'assets/img/nav/nav_2_all-1EB3909B4DBADC95B32C3E919E7BA3F7.png');untip()" width="14" height="14">
<img src="assets/nav_2_none-3E93FD54FC3AB72287F4EDAC9454269A.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'5005','LOBBY','removeAll','start');" onmouseover="jQuery(this).attr('src', 'assets/img/nav/nav_2_none_on-BE2689087277D3D2E7A74A46F3EEC371.png');tip('Seçimi temizle', 0)" onmouseout="jQuery(this).attr('src', 'assets/img/nav/nav_2_none-3E93FD54FC3AB72287F4EDAC9454269A.png');untip()" width="12" height="14">
</span>
</a>
<ul class="e_active e_noCache level_3 hide" id="comp-GROUP_<?=$row["kupa_id"];?>" style="display: none;">
<?
$sor2 = sed_sql_query("select *,COUNT(DISTINCT id) AS sayim from program_buzhokeyi where mac_time>'".time()."' AND bulten='hititbet' and kupa_ulke='".$row["kupa_ulke"]."' AND aktif='1' GROUP BY kupa_isim");
while($row2=sed_sql_fetcharray($sor2)){
?>
<li itemprop="" itemscope="" itemtype="" id="coklu">
<a data-qa="groupNavSports3" id="jq-navBlock-GROUP-<?=$row2["kupa_id"];?>">
<label class="nav_3 num_2 container22">
<input style="display:none;" type="checkbox" onclick="sportsgetir('buzhokeyi');" value="<?=$row2["kupa_id"];?>">
<i class="checkmark"></i>
<span class="left"><?=$row2["kupa_isim"];?> </span>
<span class="num_r"><? if(userayar('sporbulten')==0) { ?>0<? } else { ?><?=$row2["sayim"];?><? } ?></span>
</label>
</a>
</li>
<? } ?>
</ul>
</li>
<? if($i==10){break;} } ?>
</ul>

<ul class="level_2 hide">

<? 
 $i=0;
$sor = sed_sql_query("select *,COUNT(DISTINCT id) AS sayi from program_buzhokeyi where mac_time>'".time()."' AND bulten='hititbet' AND aktif='1' GROUP BY kupa_ulke");
while($row=sed_sql_fetcharray($sor)){
$i++;
if($i>10){
?>
<li itemprop="" itemscope="" itemtype="">
<a data-qa="groupNavSports2" id="jq-navBlock-LOBBY-<?=$row["kupa_id"];?>" href="javascript:;" onclick="jQuery('#comp-GROUP_<?=$row["kupa_id"];?>').toggle();return loadcountrybuzhokeyi('<?=codekupon2("ulke=".$row["kupa_ulke"]);?>');" class="nav_2 num_2 ">
<span class="left"><?=ulkeismiduzenleme($row["kupa_ulke"]);?></span>
<span class="num_r">
<? if(userayar('sporbulten')==0) { ?>0<? } else { ?><?=$row["sayi"];?><? } ?>
</span>
<span class="num_r hide" style="height:23px">
<img src="assets/nav_2_all-1EB3909B4DBADC95B32C3E919E7BA3F7.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'5005','LOBBY','addAll','start');" onmouseover="jQuery(this).attr('src', 'assets/img/nav/nav_2_all_on-972C4B8EF11E6597FD7E7105752821A5.png');tip('Tümünü seç', 0)" onmouseout="jQuery(this).attr('src', 'assets/img/nav/nav_2_all-1EB3909B4DBADC95B32C3E919E7BA3F7.png');untip()" width="14" height="14">
<img src="assets/nav_2_none-3E93FD54FC3AB72287F4EDAC9454269A.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'5005','LOBBY','removeAll','start');" onmouseover="jQuery(this).attr('src', 'assets/img/nav/nav_2_none_on-BE2689087277D3D2E7A74A46F3EEC371.png');tip('Seçimi temizle', 0)" onmouseout="jQuery(this).attr('src', 'assets/img/nav/nav_2_none-3E93FD54FC3AB72287F4EDAC9454269A.png');untip()" width="12" height="14">
</span>
</a>
<ul class="e_active e_noCache level_3 hide" id="comp-GROUP_<?=$row["kupa_id"];?>" style="display: none;">
<?
$sor2 = sed_sql_query("select *,COUNT(DISTINCT id) AS sayim from program_buzhokeyi where mac_time>'".time()."' AND bulten='hititbet' and kupa_ulke='".$row["kupa_ulke"]."' AND aktif='1' GROUP BY kupa_isim");
while($row2=sed_sql_fetcharray($sor2)){
?>
<li itemprop="" itemscope="" itemtype="" id="coklu">
<a data-qa="groupNavSports3" id="jq-navBlock-GROUP-<?=$row2["kupa_id"];?>">
<label class="nav_3 num_2 container22">
<input style="display:none;" type="checkbox" onclick="sportsgetir('buzhokeyi');" value="<?=$row2["kupa_id"];?>">
<i class="checkmark"></i>
<span class="left"><?=$row2["kupa_isim"];?> </span>
<span class="num_r"><? if(userayar('sporbulten')==0) { ?>0<? } else { ?><?=$row2["sayim"];?><? } ?></span>
</label>
</a>
</li>
<? } ?>
</ul>
</li>

<?  } }?>

</ul>
<div data-qa="groupNavFurther" id="jq-further-5005" class="nav_2 further" onclick="toggleFurther('5005')">
<span class="">
<? $total = $i-10; if($total<10){$total=0; echo $total;}else{echo $total;}?> <?=getTranslation('yeniyerler_kasa391')?></span>
<span class="hide"><?=getTranslation('yeniyerler_kasa392')?></span>
</div>

</div>
</li>

<? } ?>

<? if($tip5=="1") { ?>

<?
$futbolsayi = sed_sql_fetchassoc(sed_sql_query("select COUNT(DISTINCT id) AS sayi from program_masatenisi where mac_time>'".time()."' AND mac_time<'".$secilitarih."' AND bulten='hititbet' AND aktif='1'"));

?>
<li itemprop="" itemscope="" itemtype="">
<a data-qa="groupNavSports1" id="jq-navBlock-GROUP-6006" href="javascript:;" onclick="toggleOrLoad(event,'start','6006','GROUP','@GROUP_6006/leftside/secondLevel?groupId=6006&amp;type=start&amp;navType=GROUP&amp;slide=true', '1', '0', '#');return empty();" class="nav_1 num_3">

<span class="left">
<object style="filter: brightness(4);height: 16px;margin-right: 5px;margin-top: 6px;float: left;" data="assets/img/sporticons/icon_table-tennis-3C22DB5DFDF81D0ECFBA3103C0F9F9B7.png" type="image/png">
<img src="assets/img/sporticons/icon_other-7E3E90420F366D3CDC96F509D0CE5B06.png">
</object>
<?=getTranslation('yeniyerler_kasa179')?></span>
<span class="num_r" style="display: block;color:#fff;">
<? if(userayar('sporbulten')==0) { ?>0<? } else { ?><?=$futbolsayi["sayi"];?><? } ?>
</span>
<span class="num_r hide" style="height: 23px; display: none;">
<img src="assets/nav_1_all-4A430644A83268DDE67A775FFF533380.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'6006','GROUP','addAll','start');" onmouseover="jQuery(this).attr('src', 'assets/img/nav/nav_1_all_on-DA946D8292F8BCF233AB366E54D7A85B.png');tip('Tümünü seç', 0)" onmouseout="jQuery(this).attr('src', 'assets/img/nav/nav_1_all-4A430644A83268DDE67A775FFF533380.png');untip()" width="14" height="14">
<img src="assets/nav_1_none-647BF787ADCCF7A827C5570570AB14BA.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'6006','GROUP','removeAll','start');" onmouseover="jQuery(this).attr('src', 'assets/img/nav/nav_1_none_on-CB579CBB8A7D41832A88823D9DE30CA7.png');tip('Seçimi temizle', 0)" onmouseout="jQuery(this).attr('src', 'assets/img/nav/nav_1_none-647BF787ADCCF7A827C5570570AB14BA.png');untip()" width="12" height="14">
</span>
</a>
<div class="e_active e_noCache " id="comp-GROUP_6006"  style="display: none;">
<ul class="level_2 hide" style="display: block;">
<? 
 $i=0;
$sor = sed_sql_query("select *,COUNT(DISTINCT id) AS sayi from program_masatenisi where mac_time>'".time()."' AND bulten='hititbet' AND aktif='1' GROUP BY kupa_ulke ");
while($row=sed_sql_fetcharray($sor)){
$i++
?>
<li itemprop="" itemscope="" itemtype="">
<a data-qa="groupNavSports2" id="jq-navBlock-LOBBY-<?=$row["kupa_id"];?>" href="javascript:;" onclick="jQuery('#comp-GROUP_<?=$row["kupa_id"];?>').toggle();return loadcountryhentbol('<?=codekupon2("ulke=".$row["kupa_ulke"]);?>');" class="nav_2 num_2 ">
<span class="left"><?=ulkeismiduzenleme($row["kupa_ulke"]);?></span>
<span class="num_r">
<? if(userayar('sporbulten')==0) { ?>0<? } else { ?><?=$row["sayi"];?><? } ?>
</span>
<span class="num_r hide" style="height:23px">
<img src="assets/nav_2_all-1EB3909B4DBADC95B32C3E919E7BA3F7.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'6006','LOBBY','addAll','start');" onmouseover="jQuery(this).attr('src', 'assets/img/nav/nav_2_all_on-972C4B8EF11E6597FD7E7105752821A5.png');tip('Tümünü seç', 0)" onmouseout="jQuery(this).attr('src', 'assets/img/nav/nav_2_all-1EB3909B4DBADC95B32C3E919E7BA3F7.png');untip()" width="14" height="14">
<img src="assets/nav_2_none-3E93FD54FC3AB72287F4EDAC9454269A.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'6006','LOBBY','removeAll','start');" onmouseover="jQuery(this).attr('src', 'assets/img/nav/nav_2_none_on-BE2689087277D3D2E7A74A46F3EEC371.png');tip('Seçimi temizle', 0)" onmouseout="jQuery(this).attr('src', 'assets/img/nav/nav_2_none-3E93FD54FC3AB72287F4EDAC9454269A.png');untip()" width="12" height="14">
</span>
</a>
<ul class="e_active e_noCache level_3 hide" id="comp-GROUP_<?=$row["kupa_id"];?>" style="display: none;">
<?
$sor2 = sed_sql_query("select *,COUNT(DISTINCT id) AS sayim from program_masatenisi where mac_time>'".time()."' AND bulten='hititbet' and kupa_ulke='".$row["kupa_ulke"]."' AND aktif='1' GROUP BY kupa_isim");
while($row2=sed_sql_fetcharray($sor2)){
?>
<li itemprop="" itemscope="" itemtype="" id="coklu">
<a data-qa="groupNavSports3" id="jq-navBlock-GROUP-<?=$row2["kupa_id"];?>">
<label class="nav_3 num_2 container22">
<input style="display:none;" type="checkbox" onclick="sportsgetir('masatenisi');" value="<?=$row2["kupa_id"];?>">
<i class="checkmark"></i>
<span class="left"><?=$row2["kupa_isim"];?> </span>
<span class="num_r"><? if(userayar('sporbulten')==0) { ?>0<? } else { ?><?=$row2["sayim"];?><? } ?></span>
</label>
</a>
</li>
<? } ?>
</ul>
</li>
<? if($i==10){break;} } ?>
</ul>

<ul class="level_2 hide">

<? 
 $i=0;
$sor = sed_sql_query("select *,COUNT(DISTINCT id) AS sayi from program_masatenisi where mac_time>'".time()."' AND bulten='hititbet' AND aktif='1' GROUP BY kupa_ulke");
while($row=sed_sql_fetcharray($sor)){
$i++;
if($i>10){
?>
<li itemprop="" itemscope="" itemtype="">
<a data-qa="groupNavSports2" id="jq-navBlock-LOBBY-<?=$row["kupa_id"];?>" href="javascript:;" onclick="jQuery('#comp-GROUP_<?=$row["kupa_id"];?>').toggle();return loadcountryhentbol('<?=codekupon2("ulke=".$row["kupa_ulke"]);?>');" class="nav_2 num_2 ">
<span class="left"><?=ulkeismiduzenleme($row["kupa_ulke"]);?></span>
<span class="num_r">
<? if(userayar('sporbulten')==0) { ?>0<? } else { ?><?=$row["sayi"];?><? } ?>
</span>
<span class="num_r hide" style="height:23px">
<img src="assets/nav_2_all-1EB3909B4DBADC95B32C3E919E7BA3F7.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'6006','LOBBY','addAll','start');" onmouseover="jQuery(this).attr('src', 'assets/img/nav/nav_2_all_on-972C4B8EF11E6597FD7E7105752821A5.png');tip('Tümünü seç', 0)" onmouseout="jQuery(this).attr('src', 'assets/img/nav/nav_2_all-1EB3909B4DBADC95B32C3E919E7BA3F7.png');untip()" width="14" height="14">
<img src="assets/nav_2_none-3E93FD54FC3AB72287F4EDAC9454269A.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'6006','LOBBY','removeAll','start');" onmouseover="jQuery(this).attr('src', 'assets/img/nav/nav_2_none_on-BE2689087277D3D2E7A74A46F3EEC371.png');tip('Seçimi temizle', 0)" onmouseout="jQuery(this).attr('src', 'assets/img/nav/nav_2_none-3E93FD54FC3AB72287F4EDAC9454269A.png');untip()" width="12" height="14">
</span>
</a>
<ul class="e_active e_noCache level_3 hide" id="comp-GROUP_<?=$row["kupa_id"];?>" style="display: none;">
<?
$sor2 = sed_sql_query("select *,COUNT(DISTINCT id) AS sayim from program_masatenisi where mac_time>'".time()."' AND bulten='hititbet' and kupa_ulke='".$row["kupa_ulke"]."' AND aktif='1' GROUP BY kupa_isim");
while($row2=sed_sql_fetcharray($sor2)){
?>
<li itemprop="" itemscope="" itemtype="" id="coklu">
<a data-qa="groupNavSports3" id="jq-navBlock-GROUP-<?=$row2["kupa_id"];?>">
<label class="nav_3 num_2 container22">
<input style="display:none;" type="checkbox" onclick="sportsgetir('masatenisi');" value="<?=$row2["kupa_id"];?>">
<i class="checkmark"></i>
<span class="left"><?=$row2["kupa_isim"];?> </span>
<span class="num_r"><? if(userayar('sporbulten')==0) { ?>0<? } else { ?><?=$row2["sayim"];?><? } ?></span>
</label>
</a>
</li>
<? } ?>
</ul>
</li>

<?  } }?>

</ul>
<div data-qa="groupNavFurther" id="jq-further-6006" class="nav_2 further" onclick="toggleFurther('6006')">
<span class="">
<? $total = $i-10; if($total<10){$total=0; echo $total;}else{echo $total;}?> <?=getTranslation('yeniyerler_kasa391')?></span>
<span class="hide"><?=getTranslation('yeniyerler_kasa392')?></span>
</div>

</div>
</li>

<? } ?>

<? if($tip6=="1") { ?>

<?
$futbolsayi = sed_sql_fetchassoc(sed_sql_query("select COUNT(DISTINCT id) AS sayi from program_beyzbol where mac_time>'".time()."' AND mac_time<'".$secilitarih."' AND bulten='hititbet' AND aktif='1'"));

?>
<li itemprop="" itemscope="" itemtype="">
<a data-qa="groupNavSports1" id="jq-navBlock-GROUP-7007" href="javascript:;" onclick="toggleOrLoad(event,'start','7007','GROUP','@GROUP_7007/leftside/secondLevel?groupId=7007&amp;type=start&amp;navType=GROUP&amp;slide=true', '1', '0', '#');return empty();" class="nav_1 num_3">

<span class="left">
<object style="filter: brightness(4);height: 16px;margin-right: 5px;margin-top: 6px;float: left;" data="assets/img/sporticons/icon_baseball-FA0C2D5160A8EF9580D37F08DC96D517.png" type="image/png">
<img src="assets/img/sporticons/icon_other-7E3E90420F366D3CDC96F509D0CE5B06.png">
</object>
<?=getTranslation('yeniyerler_kasa197')?></span>
<span class="num_r" style="display: block;color:#fff;">
<? if(userayar('sporbulten')==0) { ?>0<? } else { ?><?=$futbolsayi["sayi"];?><? } ?>
</span>
<span class="num_r hide" style="height: 23px; display: none;">
<img src="assets/nav_1_all-4A430644A83268DDE67A775FFF533380.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'7007','GROUP','addAll','start');" onmouseover="jQuery(this).attr('src', 'assets/img/nav/nav_1_all_on-DA946D8292F8BCF233AB366E54D7A85B.png');tip('Tümünü seç', 0)" onmouseout="jQuery(this).attr('src', 'assets/img/nav/nav_1_all-4A430644A83268DDE67A775FFF533380.png');untip()" width="14" height="14">
<img src="assets/nav_1_none-647BF787ADCCF7A827C5570570AB14BA.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'7007','GROUP','removeAll','start');" onmouseover="jQuery(this).attr('src', 'assets/img/nav/nav_1_none_on-CB579CBB8A7D41832A88823D9DE30CA7.png');tip('Seçimi temizle', 0)" onmouseout="jQuery(this).attr('src', 'assets/img/nav/nav_1_none-647BF787ADCCF7A827C5570570AB14BA.png');untip()" width="12" height="14">
</span>
</a>
<div class="e_active e_noCache " id="comp-GROUP_7007"  style="display: none;">
<ul class="level_2 hide" style="display: block;">
<? 
 $i=0;
$sor = sed_sql_query("select *,COUNT(DISTINCT id) AS sayi from program_beyzbol where mac_time>'".time()."' AND bulten='hititbet' AND aktif='1' GROUP BY kupa_ulke ");
while($row=sed_sql_fetcharray($sor)){
$i++
?>
<li itemprop="" itemscope="" itemtype="">
<a data-qa="groupNavSports2" id="jq-navBlock-LOBBY-<?=$row["kupa_id"];?>" href="javascript:;" onclick="jQuery('#comp-GROUP_<?=$row["kupa_id"];?>').toggle();return loadcountryhentbol('<?=codekupon2("ulke=".$row["kupa_ulke"]);?>');" class="nav_2 num_2 ">
<span class="left"><?=ulkeismiduzenleme($row["kupa_ulke"]);?></span>
<span class="num_r">
<? if(userayar('sporbulten')==0) { ?>0<? } else { ?><?=$row["sayi"];?><? } ?>
</span>
<span class="num_r hide" style="height:23px">
<img src="assets/nav_2_all-1EB3909B4DBADC95B32C3E919E7BA3F7.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'7007','LOBBY','addAll','start');" onmouseover="jQuery(this).attr('src', 'assets/img/nav/nav_2_all_on-972C4B8EF11E6597FD7E7105752821A5.png');tip('Tümünü seç', 0)" onmouseout="jQuery(this).attr('src', 'assets/img/nav/nav_2_all-1EB3909B4DBADC95B32C3E919E7BA3F7.png');untip()" width="14" height="14">
<img src="assets/nav_2_none-3E93FD54FC3AB72287F4EDAC9454269A.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'7007','LOBBY','removeAll','start');" onmouseover="jQuery(this).attr('src', 'assets/img/nav/nav_2_none_on-BE2689087277D3D2E7A74A46F3EEC371.png');tip('Seçimi temizle', 0)" onmouseout="jQuery(this).attr('src', 'assets/img/nav/nav_2_none-3E93FD54FC3AB72287F4EDAC9454269A.png');untip()" width="12" height="14">
</span>
</a>
<ul class="e_active e_noCache level_3 hide" id="comp-GROUP_<?=$row["kupa_id"];?>" style="display: none;">
<?
$sor2 = sed_sql_query("select *,COUNT(DISTINCT id) AS sayim from program_beyzbol where mac_time>'".time()."' AND bulten='hititbet' and kupa_ulke='".$row["kupa_ulke"]."' AND aktif='1' GROUP BY kupa_isim");
while($row2=sed_sql_fetcharray($sor2)){
?>
<li itemprop="" itemscope="" itemtype="" id="coklu">
<a data-qa="groupNavSports3" id="jq-navBlock-GROUP-<?=$row2["kupa_id"];?>">
<label class="nav_3 num_2 container22">
<input style="display:none;" type="checkbox" onclick="sportsgetir('beyzbol');" value="<?=$row2["kupa_id"];?>">
<i class="checkmark"></i>
<span class="left"><?=$row2["kupa_isim"];?> </span>
<span class="num_r"><? if(userayar('sporbulten')==0) { ?>0<? } else { ?><?=$row2["sayim"];?><? } ?></span>
</label>
</a>
</li>
<? } ?>
</ul>
</li>
<? if($i==10){break;} } ?>
</ul>

<ul class="level_2 hide">

<? 
 $i=0;
$sor = sed_sql_query("select *,COUNT(DISTINCT id) AS sayi from program_beyzbol where mac_time>'".time()."' AND bulten='hititbet' AND aktif='1' GROUP BY kupa_ulke");
while($row=sed_sql_fetcharray($sor)){
$i++;
if($i>10){
?>
<li itemprop="" itemscope="" itemtype="">
<a data-qa="groupNavSports2" id="jq-navBlock-LOBBY-<?=$row["kupa_id"];?>" href="javascript:;" onclick="jQuery('#comp-GROUP_<?=$row["kupa_id"];?>').toggle();return loadcountryhentbol('<?=codekupon2("ulke=".$row["kupa_ulke"]);?>');" class="nav_2 num_2 ">
<span class="left"><?=ulkeismiduzenleme($row["kupa_ulke"]);?></span>
<span class="num_r">
<? if(userayar('sporbulten')==0) { ?>0<? } else { ?><?=$row["sayi"];?><? } ?>
</span>
<span class="num_r hide" style="height:23px">
<img src="assets/nav_2_all-1EB3909B4DBADC95B32C3E919E7BA3F7.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'7007','LOBBY','addAll','start');" onmouseover="jQuery(this).attr('src', 'assets/img/nav/nav_2_all_on-972C4B8EF11E6597FD7E7105752821A5.png');tip('Tümünü seç', 0)" onmouseout="jQuery(this).attr('src', 'assets/img/nav/nav_2_all-1EB3909B4DBADC95B32C3E919E7BA3F7.png');untip()" width="14" height="14">
<img src="assets/nav_2_none-3E93FD54FC3AB72287F4EDAC9454269A.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'7007','LOBBY','removeAll','start');" onmouseover="jQuery(this).attr('src', 'assets/img/nav/nav_2_none_on-BE2689087277D3D2E7A74A46F3EEC371.png');tip('Seçimi temizle', 0)" onmouseout="jQuery(this).attr('src', 'assets/img/nav/nav_2_none-3E93FD54FC3AB72287F4EDAC9454269A.png');untip()" width="12" height="14">
</span>
</a>
<ul class="e_active e_noCache level_3 hide" id="comp-GROUP_<?=$row["kupa_id"];?>" style="display: none;">
<?
$sor2 = sed_sql_query("select *,COUNT(DISTINCT id) AS sayim from program_beyzbol where mac_time>'".time()."' AND bulten='hititbet' and kupa_ulke='".$row["kupa_ulke"]."' AND aktif='1' GROUP BY kupa_isim");
while($row2=sed_sql_fetcharray($sor2)){
?>
<li itemprop="" itemscope="" itemtype="" id="coklu">
<a data-qa="groupNavSports3" id="jq-navBlock-GROUP-<?=$row2["kupa_id"];?>">
<label class="nav_3 num_2 container22">
<input style="display:none;" type="checkbox" onclick="sportsgetir('beyzbol');" value="<?=$row2["kupa_id"];?>">
<i class="checkmark"></i>
<span class="left"><?=$row2["kupa_isim"];?> </span>
<span class="num_r"><? if(userayar('sporbulten')==0) { ?>0<? } else { ?><?=$row2["sayim"];?><? } ?></span>
</label>
</a>
</li>
<? } ?>
</ul>
</li>

<?  } }?>

</ul>
<div data-qa="groupNavFurther" id="jq-further-7007" class="nav_2 further" onclick="toggleFurther('7007')">
<span class="">
<? $total = $i-10; if($total<10){$total=0; echo $total;}else{echo $total;}?> <?=getTranslation('yeniyerler_kasa391')?></span>
<span class="hide"><?=getTranslation('yeniyerler_kasa392')?></span>
</div>

</div>
</li>

<? } ?>

<? if($tip7=="1") { ?>

<?
$futbolsayi = sed_sql_fetchassoc(sed_sql_query("select COUNT(DISTINCT id) AS sayi from program_rugby where mac_time>'".time()."' AND mac_time<'".$secilitarih."' AND bulten='hititbet' AND aktif='1'"));

?>
<li itemprop="" itemscope="" itemtype="">
<a data-qa="groupNavSports1" id="jq-navBlock-GROUP-8008" href="javascript:;" onclick="toggleOrLoad(event,'start','8008','GROUP','@GROUP_8008/leftside/secondLevel?groupId=8008&amp;type=start&amp;navType=GROUP&amp;slide=true', '1', '0', '#');return empty();" class="nav_1 num_3">

<span class="left">
<object style="filter: brightness(4);height: 16px;margin-right: 5px;margin-top: 6px;float: left;" data="assets/img/sporticons/icon_rugby-EAFAD8E8DF09A025EB9841104534CD6F.png" type="image/png">
<img src="assets/img/sporticons/icon_other-7E3E90420F366D3CDC96F509D0CE5B06.png">
</object>
<?=getTranslation('yeniyerler_kasa198')?></span>
<span class="num_r" style="display: block;color:#fff;">
<? if(userayar('sporbulten')==0) { ?>0<? } else { ?><?=$futbolsayi["sayi"];?><? } ?>
</span>
<span class="num_r hide" style="height: 23px; display: none;">
<img src="assets/nav_1_all-4A430644A83268DDE67A775FFF533380.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'8008','GROUP','addAll','start');" onmouseover="jQuery(this).attr('src', 'assets/img/nav/nav_1_all_on-DA946D8292F8BCF233AB366E54D7A85B.png');tip('Tümünü seç', 0)" onmouseout="jQuery(this).attr('src', 'assets/img/nav/nav_1_all-4A430644A83268DDE67A775FFF533380.png');untip()" width="14" height="14">
<img src="assets/nav_1_none-647BF787ADCCF7A827C5570570AB14BA.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'8008','GROUP','removeAll','start');" onmouseover="jQuery(this).attr('src', 'assets/img/nav/nav_1_none_on-CB579CBB8A7D41832A88823D9DE30CA7.png');tip('Seçimi temizle', 0)" onmouseout="jQuery(this).attr('src', 'assets/img/nav/nav_1_none-647BF787ADCCF7A827C5570570AB14BA.png');untip()" width="12" height="14">
</span>
</a>
<div class="e_active e_noCache " id="comp-GROUP_8008"  style="display: none;">
<ul class="level_2 hide" style="display: block;">
<? 
 $i=0;
$sor = sed_sql_query("select *,COUNT(DISTINCT id) AS sayi from program_rugby where mac_time>'".time()."' AND bulten='hititbet' AND aktif='1' GROUP BY kupa_ulke ");
while($row=sed_sql_fetcharray($sor)){
$i++
?>
<li itemprop="" itemscope="" itemtype="">
<a data-qa="groupNavSports2" id="jq-navBlock-LOBBY-<?=$row["kupa_id"];?>" href="javascript:;" onclick="jQuery('#comp-GROUP_<?=$row["kupa_id"];?>').toggle();return loadcountryhentbol('<?=codekupon2("ulke=".$row["kupa_ulke"]);?>');" class="nav_2 num_2 ">
<span class="left"><?=ulkeismiduzenleme($row["kupa_ulke"]);?></span>
<span class="num_r">
<? if(userayar('sporbulten')==0) { ?>0<? } else { ?><?=$row["sayi"];?><? } ?>
</span>
<span class="num_r hide" style="height:23px">
<img src="assets/nav_2_all-1EB3909B4DBADC95B32C3E919E7BA3F7.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'8008','LOBBY','addAll','start');" onmouseover="jQuery(this).attr('src', 'assets/img/nav/nav_2_all_on-972C4B8EF11E6597FD7E7105752821A5.png');tip('Tümünü seç', 0)" onmouseout="jQuery(this).attr('src', 'assets/img/nav/nav_2_all-1EB3909B4DBADC95B32C3E919E7BA3F7.png');untip()" width="14" height="14">
<img src="assets/nav_2_none-3E93FD54FC3AB72287F4EDAC9454269A.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'8008','LOBBY','removeAll','start');" onmouseover="jQuery(this).attr('src', 'assets/img/nav/nav_2_none_on-BE2689087277D3D2E7A74A46F3EEC371.png');tip('Seçimi temizle', 0)" onmouseout="jQuery(this).attr('src', 'assets/img/nav/nav_2_none-3E93FD54FC3AB72287F4EDAC9454269A.png');untip()" width="12" height="14">
</span>
</a>
<ul class="e_active e_noCache level_3 hide" id="comp-GROUP_<?=$row["kupa_id"];?>" style="display: none;">
<?
$sor2 = sed_sql_query("select *,COUNT(DISTINCT id) AS sayim from program_rugby where mac_time>'".time()."' AND bulten='hititbet' and kupa_ulke='".$row["kupa_ulke"]."' AND aktif='1' GROUP BY kupa_isim");
while($row2=sed_sql_fetcharray($sor2)){
?>
<li itemprop="" itemscope="" itemtype="" id="coklu">
<a data-qa="groupNavSports3" id="jq-navBlock-GROUP-<?=$row2["kupa_id"];?>">
<label class="nav_3 num_2 container22">
<input style="display:none;" type="checkbox" onclick="sportsgetir('rugby');" value="<?=$row2["kupa_id"];?>">
<i class="checkmark"></i>
<span class="left"><?=$row2["kupa_isim"];?> </span>
<span class="num_r"><? if(userayar('sporbulten')==0) { ?>0<? } else { ?><?=$row2["sayim"];?><? } ?></span>
</label>
</a>
</li>
<? } ?>
</ul>
</li>
<? if($i==10){break;} } ?>
</ul>

<ul class="level_2 hide">

<? 
 $i=0;
$sor = sed_sql_query("select *,COUNT(DISTINCT id) AS sayi from program_rugby where mac_time>'".time()."' AND bulten='hititbet' AND aktif='1' GROUP BY kupa_ulke");
while($row=sed_sql_fetcharray($sor)){
$i++;
if($i>10){
?>
<li itemprop="" itemscope="" itemtype="">
<a data-qa="groupNavSports2" id="jq-navBlock-LOBBY-<?=$row["kupa_id"];?>" href="javascript:;" onclick="jQuery('#comp-GROUP_<?=$row["kupa_id"];?>').toggle();return loadcountryhentbol('<?=codekupon2("ulke=".$row["kupa_ulke"]);?>');" class="nav_2 num_2 ">
<span class="left"><?=ulkeismiduzenleme($row["kupa_ulke"]);?></span>
<span class="num_r">
<? if(userayar('sporbulten')==0) { ?>0<? } else { ?><?=$row["sayi"];?><? } ?>
</span>
<span class="num_r hide" style="height:23px">
<img src="assets/nav_2_all-1EB3909B4DBADC95B32C3E919E7BA3F7.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'8008','LOBBY','addAll','start');" onmouseover="jQuery(this).attr('src', 'assets/img/nav/nav_2_all_on-972C4B8EF11E6597FD7E7105752821A5.png');tip('Tümünü seç', 0)" onmouseout="jQuery(this).attr('src', 'assets/img/nav/nav_2_all-1EB3909B4DBADC95B32C3E919E7BA3F7.png');untip()" width="14" height="14">
<img src="assets/nav_2_none-3E93FD54FC3AB72287F4EDAC9454269A.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'8008','LOBBY','removeAll','start');" onmouseover="jQuery(this).attr('src', 'assets/img/nav/nav_2_none_on-BE2689087277D3D2E7A74A46F3EEC371.png');tip('Seçimi temizle', 0)" onmouseout="jQuery(this).attr('src', 'assets/img/nav/nav_2_none-3E93FD54FC3AB72287F4EDAC9454269A.png');untip()" width="12" height="14">
</span>
</a>
<ul class="e_active e_noCache level_3 hide" id="comp-GROUP_<?=$row["kupa_id"];?>" style="display: none;">
<?
$sor2 = sed_sql_query("select *,COUNT(DISTINCT id) AS sayim from program_rugby where mac_time>'".time()."' AND bulten='hititbet' and kupa_ulke='".$row["kupa_ulke"]."' AND aktif='1' GROUP BY kupa_isim");
while($row2=sed_sql_fetcharray($sor2)){
?>
<li itemprop="" itemscope="" itemtype="" id="coklu">
<a data-qa="groupNavSports3" id="jq-navBlock-GROUP-<?=$row2["kupa_id"];?>">
<label class="nav_3 num_2 container22">
<input style="display:none;" type="checkbox" onclick="sportsgetir('rugby');" value="<?=$row2["kupa_id"];?>">
<i class="checkmark"></i>
<span class="left"><?=$row2["kupa_isim"];?> </span>
<span class="num_r"><? if(userayar('sporbulten')==0) { ?>0<? } else { ?><?=$row2["sayim"];?><? } ?></span>
</label>
</a>
</li>
<? } ?>
</ul>
</li>

<?  } }?>

</ul>
<div data-qa="groupNavFurther" id="jq-further-8008" class="nav_2 further" onclick="toggleFurther('8008')">
<span class="">
<? $total = $i-10; if($total<10){$total=0; echo $total;}else{echo $total;}?> <?=getTranslation('yeniyerler_kasa391')?></span>
<span class="hide"><?=getTranslation('yeniyerler_kasa392')?></span>
</div>

</div>
</li>

<? } ?>

<? if($tip8=="1") { ?>

<?
$futbolsayi = sed_sql_fetchassoc(sed_sql_query("select COUNT(DISTINCT id) AS sayi from program_dovus where mac_time>'".time()."' AND mac_time<'".$secilitarih."' AND bulten='hititbet' AND aktif='1'"));

?>
<li itemprop="" itemscope="" itemtype="">
<a data-qa="groupNavSports1" id="jq-navBlock-GROUP-9009" href="javascript:;" onclick="toggleOrLoad(event,'start','9009','GROUP','@GROUP_9009/leftside/secondLevel?groupId=9009&amp;type=start&amp;navType=GROUP&amp;slide=true', '1', '0', '#');return empty();" class="nav_1 num_3">

<span class="left">
<object style="filter: brightness(4);height: 16px;margin-right: 5px;margin-top: 6px;float: left;" data="assets/img/sporticons/icon_boxing-C61807E6FE8E177FB0AB5E83FD22330B.png" type="image/png">
<img src="assets/img/sporticons/icon_other-7E3E90420F366D3CDC96F509D0CE5B06.png">
</object>
<?=getTranslation('yeniyerler_kasa199')?></span>
<span class="num_r" style="display: block;color:#fff;">
<? if(userayar('sporbulten')==0) { ?>0<? } else { ?><?=$futbolsayi["sayi"];?><? } ?>
</span>
<span class="num_r hide" style="height: 23px; display: none;">
<img src="assets/nav_1_all-4A430644A83268DDE67A775FFF533380.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'9009','GROUP','addAll','start');" onmouseover="jQuery(this).attr('src', 'assets/img/nav/nav_1_all_on-DA946D8292F8BCF233AB366E54D7A85B.png');tip('Tümünü seç', 0)" onmouseout="jQuery(this).attr('src', 'assets/img/nav/nav_1_all-4A430644A83268DDE67A775FFF533380.png');untip()" width="14" height="14">
<img src="assets/nav_1_none-647BF787ADCCF7A827C5570570AB14BA.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'9009','GROUP','removeAll','start');" onmouseover="jQuery(this).attr('src', 'assets/img/nav/nav_1_none_on-CB579CBB8A7D41832A88823D9DE30CA7.png');tip('Seçimi temizle', 0)" onmouseout="jQuery(this).attr('src', 'assets/img/nav/nav_1_none-647BF787ADCCF7A827C5570570AB14BA.png');untip()" width="12" height="14">
</span>
</a>
<div class="e_active e_noCache " id="comp-GROUP_9009"  style="display: none;">
<ul class="level_2 hide" style="display: block;">
<? 
 $i=0;
$sor = sed_sql_query("select *,COUNT(DISTINCT id) AS sayi from program_dovus where mac_time>'".time()."' AND bulten='hititbet' AND aktif='1' GROUP BY kupa_ulke ");
while($row=sed_sql_fetcharray($sor)){
$i++
?>
<li itemprop="" itemscope="" itemtype="">
<a data-qa="groupNavSports2" id="jq-navBlock-LOBBY-<?=$row["kupa_id"];?>" href="javascript:;" onclick="jQuery('#comp-GROUP_<?=$row["kupa_id"];?>').toggle();return loadcountryhentbol('<?=codekupon2("ulke=".$row["kupa_ulke"]);?>');" class="nav_2 num_2 ">
<span class="left"><?=ulkeismiduzenleme($row["kupa_ulke"]);?></span>
<span class="num_r">
<? if(userayar('sporbulten')==0) { ?>0<? } else { ?><?=$row["sayi"];?><? } ?>
</span>
<span class="num_r hide" style="height:23px">
<img src="assets/nav_2_all-1EB3909B4DBADC95B32C3E919E7BA3F7.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'9009','LOBBY','addAll','start');" onmouseover="jQuery(this).attr('src', 'assets/img/nav/nav_2_all_on-972C4B8EF11E6597FD7E7105752821A5.png');tip('Tümünü seç', 0)" onmouseout="jQuery(this).attr('src', 'assets/img/nav/nav_2_all-1EB3909B4DBADC95B32C3E919E7BA3F7.png');untip()" width="14" height="14">
<img src="assets/nav_2_none-3E93FD54FC3AB72287F4EDAC9454269A.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'9009','LOBBY','removeAll','start');" onmouseover="jQuery(this).attr('src', 'assets/img/nav/nav_2_none_on-BE2689087277D3D2E7A74A46F3EEC371.png');tip('Seçimi temizle', 0)" onmouseout="jQuery(this).attr('src', 'assets/img/nav/nav_2_none-3E93FD54FC3AB72287F4EDAC9454269A.png');untip()" width="12" height="14">
</span>
</a>
<ul class="e_active e_noCache level_3 hide" id="comp-GROUP_<?=$row["kupa_id"];?>" style="display: none;">
<?
$sor2 = sed_sql_query("select *,COUNT(DISTINCT id) AS sayim from program_dovus where mac_time>'".time()."' AND bulten='hititbet' and kupa_ulke='".$row["kupa_ulke"]."' AND aktif='1' GROUP BY kupa_isim");
while($row2=sed_sql_fetcharray($sor2)){
?>
<li itemprop="" itemscope="" itemtype="" id="coklu">
<a data-qa="groupNavSports3" id="jq-navBlock-GROUP-<?=$row2["kupa_id"];?>">
<label class="nav_3 num_2 container22">
<input style="display:none;" type="checkbox" onclick="sportsgetir('dovus');" value="<?=$row2["kupa_id"];?>">
<i class="checkmark"></i>
<span class="left"><?=$row2["kupa_isim"];?> </span>
<span class="num_r"><? if(userayar('sporbulten')==0) { ?>0<? } else { ?><?=$row2["sayim"];?><? } ?></span>
</label>
</a>
</li>
<? } ?>
</ul>
</li>
<? if($i==10){break;} } ?>
</ul>

<ul class="level_2 hide">

<? 
 $i=0;
$sor = sed_sql_query("select *,COUNT(DISTINCT id) AS sayi from program_dovus where mac_time>'".time()."' AND bulten='hititbet' AND aktif='1' GROUP BY kupa_ulke");
while($row=sed_sql_fetcharray($sor)){
$i++;
if($i>10){
?>
<li itemprop="" itemscope="" itemtype="">
<a data-qa="groupNavSports2" id="jq-navBlock-LOBBY-<?=$row["kupa_id"];?>" href="javascript:;" onclick="jQuery('#comp-GROUP_<?=$row["kupa_id"];?>').toggle();return loadcountryhentbol('<?=codekupon2("ulke=".$row["kupa_ulke"]);?>');" class="nav_2 num_2 ">
<span class="left"><?=ulkeismiduzenleme($row["kupa_ulke"]);?></span>
<span class="num_r">
<? if(userayar('sporbulten')==0) { ?>0<? } else { ?><?=$row["sayi"];?><? } ?>
</span>
<span class="num_r hide" style="height:23px">
<img src="assets/nav_2_all-1EB3909B4DBADC95B32C3E919E7BA3F7.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'9009','LOBBY','addAll','start');" onmouseover="jQuery(this).attr('src', 'assets/img/nav/nav_2_all_on-972C4B8EF11E6597FD7E7105752821A5.png');tip('Tümünü seç', 0)" onmouseout="jQuery(this).attr('src', 'assets/img/nav/nav_2_all-1EB3909B4DBADC95B32C3E919E7BA3F7.png');untip()" width="14" height="14">
<img src="assets/nav_2_none-3E93FD54FC3AB72287F4EDAC9454269A.png" alt="" class="margin_t_7" onclick="toggleAllAndUpdate(event,'9009','LOBBY','removeAll','start');" onmouseover="jQuery(this).attr('src', 'assets/img/nav/nav_2_none_on-BE2689087277D3D2E7A74A46F3EEC371.png');tip('Seçimi temizle', 0)" onmouseout="jQuery(this).attr('src', 'assets/img/nav/nav_2_none-3E93FD54FC3AB72287F4EDAC9454269A.png');untip()" width="12" height="14">
</span>
</a>
<ul class="e_active e_noCache level_3 hide" id="comp-GROUP_<?=$row["kupa_id"];?>" style="display: none;">
<?
$sor2 = sed_sql_query("select *,COUNT(DISTINCT id) AS sayim from program_dovus where mac_time>'".time()."' AND bulten='hititbet' and kupa_ulke='".$row["kupa_ulke"]."' AND aktif='1' GROUP BY kupa_isim");
while($row2=sed_sql_fetcharray($sor2)){
?>
<li itemprop="" itemscope="" itemtype="" id="coklu">
<a data-qa="groupNavSports3" id="jq-navBlock-GROUP-<?=$row2["kupa_id"];?>">
<label class="nav_3 num_2 container22">
<input style="display:none;" type="checkbox" onclick="sportsgetir('dovus');" value="<?=$row2["kupa_id"];?>">
<i class="checkmark"></i>
<span class="left"><?=$row2["kupa_isim"];?> </span>
<span class="num_r"><? if(userayar('sporbulten')==0) { ?>0<? } else { ?><?=$row2["sayim"];?><? } ?></span>
</label>
</a>
</li>
<? } ?>
</ul>
</li>

<?  } }?>

</ul>
<div data-qa="groupNavFurther" id="jq-further-9009" class="nav_2 further" onclick="toggleFurther('9009')">
<span class="">
<? $total = $i-10; if($total<10){$total=0; echo $total;}else{echo $total;}?> <?=getTranslation('yeniyerler_kasa391')?></span>
<span class="hide"><?=getTranslation('yeniyerler_kasa392')?></span>
</div>

</div>
</li>

<? } ?>

</ul>
