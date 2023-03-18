<?php
session_start();

@header("Content-type: text/html; charset=utf-8");

include 'db.php';

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

die("".nf($ub['bakiye'])." TL");	

}

$ustler = "SELECT k.hesap_sahibi_id as ust1 ,k2.hesap_sahibi_id as ust2 FROM kullanici as k  INNER JOIN kullanici as k2 ON k2.id = k.hesap_sahibi_id where k.id=".$_SESSION['betuser']."";
#echo $ustler;
$sor = sed_sql_query($ustler);
$r = sed_sql_fetchassoc($sor);
$_SESSION['ustler'] = array($r['ust1'],$r['ust2']);

if($a=="livesearch_arama") {

$aranan_takim = gd("aranan_takim");

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

/* yasak kelimeler */ 
$whereyasak ="";
$sec = "SELECT * FROM yasak_kelimeler WHERE user_id IN (1,".$_SESSION['betuser'].",".implode(",", $_SESSION['ustler']).")";
$sor = sed_sql_query($sec);
while($r = sed_sql_fetchassoc($sor)) {
$whereyasak.= ' AND ev_takim not like "%'.$r['kelime'].'%" AND konuk_takim not like "%'.$r['kelime'].'%" ';
}
/* yasak kelimeler */

$sor = sed_sql_query("select * from program_futbol where id!='' $takim_ekle $gizli_ekle {$whereyasak} LIMIT 10");
if(sed_sql_numrows($sor)<1) { die("<div class='nosonuc'>".getTranslation('ajaxaradiginizbilgiyok')."</div>"); }
while($row=sed_sql_fetcharray($sor)) { ?>

<li class="uib-typeahead-match ng-scope">
<a href="javascript:;" onclick="jQuery('#searchField').focus();jQuery('#search_nav').toggleClass('on');aramagetir('<?=$row['id'];?>');listelesene(2);" class="ng-binding ng-scope" title="<?=$row['ev_takim'];?>-<?=$row['konuk_takim'];?>"><?=$row['ev_takim'];?><strong>-</strong> <?=$row['konuk_takim'];?></a>
</li>

<? } ?>

<? }

if($a=="livesearch_bulunan") {

$macdbid = gd("macdbid");

$sor = sed_sql_query("select * from program_futbol where id='$macdbid' LIMIT 1");
if(sed_sql_numrows($sor)<1) { die("<div class='nosonuc'>".getTranslation('ajaxaradiginizbilgiyok')."</div>"); }
while($row=sed_sql_fetcharray($sor)) { 

$ev_kazanc = oranbulxxx_futbol($row['id'],1);

$beraberlik = oranbulxxx_futbol($row['id'],2);

$konuk_kazanc = oranbulxxx_futbol($row['id'],3);

$ciftesans_1X = oranbulxxx_futbol($row['id'],176);

$ciftesans_X2 = oranbulxxx_futbol($row['id'],177);

$ciftesans_12 = oranbulxxx_futbol($row['id'],178);

$altust_25_alt = oranbulxxx_futbol($row['id'],33);

$altust_25_ust = oranbulxxx_futbol($row['id'],34);

$karsilikligol_var = oranbulxxx_futbol($row['id'],61);

$karsilikligol_yok = oranbulxxx_futbol($row['id'],62);

$mbs = mbsver($row['id'],$row['mbs'],$row['kupa_id']);

$encoded = "$row[id]|$row[ev_takim]|$row[konuk_takim]|$row[mac_kodu]|$mbs|$row[mac_time]|futbol";

?>

<span id="mainPage">
<div class="e_active e_noCache margin_r_12" id="comp-selection">
<div class="space"></div>
<div class="e_active e_noCache jq-compound-event-block" id="_program_blocks_compoundEventBlock_groupId_1201_type_UPCOMING">

<div class="border_ccc">
<div>
<div class="t_head cf">
<div class="fs_16 darkgrey pad_l_9 left"><div><?=getTranslation('futbol')?> - <?=$row['kupa_ulke']; ?></div></div>
<div class="t_head_but right">
<div class="more_types on">
<span class="ng-scope" id="opensubbet_<?=$row['kupa_id']; ?>" onclick="opensubbet('<?=$row['kupa_id']; ?>');" style="display: inline;margin-right: 12px;font-size: 11px;text-decoration: underline;cursor: pointer;"><?=getTranslation('bahisseceneklerinigoster')?></span>
<span class="ng-scope" id="slocesubbet_<?=$row['kupa_id']; ?>" onclick="slocesubbet('<?=$row['kupa_id']; ?>');" style="display: none;margin-right: 12px;font-size: 11px;text-decoration: underline;cursor: pointer;"><?=getTranslation('bahisseceneklerinigizle')?></span>
</div>
</div>
</div>
</div>
<div class="e_active jq-compound-event-block">
<div id="resultTypeFilter_<?=$row['kupa_id']; ?>_UPCOMING" class="resultTypeFilter type_box cf list_<?=$row['kupa_id']; ?>" style="display: none;">
<div class="type_but on" id="odseelctbut_1_<?=$row['kupa_id']; ?>" onclick="macsonucuac('<?=$row['kupa_id']; ?>');">
<div class="info cf"><span class="left"><?=getTranslation('tahminsecenegi')?></span>
<span class="info_but"><span class="bubble b_left top16 b_shad"><?=getTranslation('tahminsecenegiaciklama')?></span></span>
</div>
</div>
<div class="type_but" id="odseelctbut_16_<?=$row['kupa_id']; ?>" onclick="ciftesansac('<?=$row['kupa_id']; ?>');">
<div class="info cf"><span class="left"><?=getTranslation('tahminsecenegiciftesans')?></span>
<span class="info_but"><span class="bubble b_left top16 b_shad"><?=getTranslation('tahminsecenegiaciklamacs')?></span></span>
</div>
</div>
<div class="type_but " id="odseelctbut_28_<?=$row['kupa_id']; ?>" onclick="altustac('<?=$row['kupa_id']; ?>');">
<div class="info cf"><span class="left"><?=getTranslation('tahminsecenegialtust')?> 2.5</span>
<span class="info_but"><span class="bubble b_left top16 b_shad"><?=getTranslation('tahminsecenegiaciklamaau')?></span></span>
</div>
</div>
<div class="type_but" id="odseelctbut_45_<?=$row['kupa_id']; ?>" onclick="karsilikligolac('<?=$row['kupa_id']; ?>');">
<div class="info cf"><span class="left"><?=getTranslation('tahminsecenegikg')?></span>
<span class="info_but"><span class="bubble b_left top16 b_shad"><?=getTranslation('tahminsecenegiaciklamakg')?></span></span>
</div>
</div>
</div>
</div>

<div class="e_active" id="League<?=$row['kupa_id']; ?>">
<div class="">
<div class="e_active" id="comp-UPCOMING_HEADER_58349">
<div class="t_subhead cf">

<div class="grey_999 right cf" id="thebox_1_<?=$row['kupa_id']; ?>" style="margin-right: 77px">
<div class="w_39 left" style="min-height: 1px;">1</div>
<div class="w_39 left" style="min-height: 1px;">X</div>
<div class="w_39 left" style="min-height: 1px;">2</div>
</div>

<div class="grey_999 right cf" id="thebox_16_<?=$row['kupa_id']; ?>" style="margin-right: 81px;display:none">
<div class="w_39 left" style="min-height: 1px;">1X</div>
<div class="w_39 left" style="min-height: 1px;">X2</div>
<div class="w_39 left" style="min-height: 1px;">12</div>
</div>

<div class="grey_999 right cf" id="thebox_28_<?=$row['kupa_id']; ?>" style="margin-right: 80px;display:none">
<div class="w_39 left" style="min-height: 1px;">2.5</div>
<div class="w_39 left" style="min-height: 1px;">A</div>
<div class="w_39 left" style="min-height: 1px;">Ü</div>
</div>

<div class="grey_999 right cf" id="thebox_45_<?=$row['kupa_id']; ?>" style="margin-right: 80px;display:none">
<div class="w_39 left" style="min-height: 1px;">KG</div>
<div class="w_39 left" style="min-height: 1px;">E</div>
<div class="w_39 left" style="min-height: 1px;">H</div>
</div>

<div class="red pad_l_9" onmouseover="tip(jQuery(this).html(), 55, true)" onmouseout="untip()">
<span><?=$row['kupa_isim']; ?></span>
</div>
<div class="close_groups" onclick="toggleAndUpdate(event, '1301','GROUP')"></div>
</div>
</div>
<div class="e_active t_row jq-event-row-cont">
<div class="info">
<div class="w_30 align_c left over" style="" onmouseover="tip(this.firstChild.data, 6)">
</div>
<div class="w_40 bl align_c left timecell" style="width:78px;cursor:pointer;">
<div class="timeText2" title="<? echo date("Y-m-d H:i",$row['mac_time']); ?>"><? echo date("d.m",$row['mac_time']); ?> / <font style="font-weight:bold;"><?=date("H:i",$row['mac_time']); ?><font></div>
</div>
<div class="t_cell w_113 left" style="margin-left:5px;width:120px;cursor:pointer;"><span class="teamname"><?=$row['ev_takim'];?></span></div>
<div class="teamHelpWrap"><div class="t_cell w_113 left" style="width:135px;cursor:pointer;"><span class="teamname"><?=$row['konuk_takim'];?></span></div></div>

<div style="border: 1px solid #f74835;background-color: #ffc3bc;color: #000000;margin-top:3px;" class="mbs<?=$mbs;?>"><a href="javascript:;" class="ng-binding"><?=$mbs;?></a></div>

<div class="bl pad_2 left " id="realgames_1_<?=$row['kupa_id']; ?>">
<div class="qbut qbut-<?=idcode("$row[id]futbol1");?>" onclick="kupon('<?=codekupon("$encoded|1|$ev_kazanc"); ?>');"><?=$ev_kazanc;?></div>
<div class="qbut qbut-<?=idcode("$row[id]futbol2");?>" onclick="kupon('<?=codekupon("$encoded|2|$beraberlik"); ?>');"><?=$beraberlik;?></div>
<div class="qbut qbut-<?=idcode("$row[id]futbol3");?>" onclick="kupon('<?=codekupon("$encoded|3|$konuk_kazanc"); ?>');"><?=$konuk_kazanc;?></div>
</div>

<div class="bl pad_2 left " id="realgames_16_<?=$row['kupa_id']; ?>" style="display:none">
<div class="qbut qbut-<?=idcode("$row[id]futbol176");?>" onclick="kupon('<?=codekupon("$encoded|76|$ciftesans_1X"); ?>');"><?=$ciftesans_1X;?></div>
<div class="qbut qbut-<?=idcode("$row[id]futbol177");?>" onclick="kupon('<?=codekupon("$encoded|77|$ciftesans_X2"); ?>');"><?=$ciftesans_X2;?></div>
<div class="qbut qbut-<?=idcode("$row[id]futbol178");?>" onclick="kupon('<?=codekupon("$encoded|78|$ciftesans_12"); ?>');"><?=$ciftesans_12;?></div>
</div>

<div class="bl pad_2 left " id="realgames_28_<?=$row['kupa_id']; ?>" style="display:none">
<div style="position: relative;float: left;width: 37px;height: 18px;color: #000;font-size: 11px;line-height: 18px;text-align: center;margin: 1px;margin-top: 2px;">(2.5)</div>
<div class="qbut qbut-<?=idcode("$row[id]futbol33");?>" onclick="kupon('<?=codekupon("$encoded|33|$altust_25_alt"); ?>');"><?=$altust_25_alt;?></div>
<div class="qbut qbut-<?=idcode("$row[id]futbol34");?>" onclick="kupon('<?=codekupon("$encoded|34|$altust_25_ust"); ?>');"><?=$altust_25_ust;?></div>
</div>

<div class="bl pad_2 left " id="realgames_45_<?=$row['kupa_id']; ?>" style="display:none">
<div style="position: relative;float: left;width: 37px;height: 18px;color: #000;font-size: 11px;line-height: 18px;text-align: center;margin: 1px;margin-top: 2px;">(KG)</div>
<div class="qbut qbut-<?=idcode("$row[id]futbol61");?>" onclick="kupon('<?=codekupon("$encoded|61|$karsilikligol_var"); ?>');"><?=$karsilikligol_var;?></div>
<div class="qbut qbut-<?=idcode("$row[id]futbol62");?>" onclick="kupon('<?=codekupon("$encoded|62|$karsilikligol_yok"); ?>');"><?=$karsilikligol_yok;?></div>
</div>

<div class="bl pad_r_3 left">
<? if($row["istatistik"]!=0){ ?>
<div class="ibut " id="statistics-<?=$row["id"];?>-lastminute">
<a href="javascript:popup('https://s5.sir.sportradar.com/totobo/tr/2/match/<?=$row["istatistik"];?>','stats',1078,768);" class="stat" onmouseover="loadEventStatistics2(this, <?=$row["id"];?>, 'soccer', 'lastminute')" onmouseout="untooltipDelayed(this)"></a>
</div>
<? } else { ?>
<div class="ibut off" id="statistics-<?=$row["id"];?>-lastminute">
<div class="stat"></div>
</div>
<? } ?>
<div id="comp-eventTvButton-463-lastminute" class="e_active ibut off" e:url="@@eventTvButton-463-lastminute/program/eventTVButton2?eventId=463" e:hash="13sjxvy" e:interval="-1" e:next="-1">
<div class="tv">&nbsp;</div>
</div>
</div>
</div>
<div class="limits_hover ">
<div class="t_more bl align_c right" id="detayfutbolac<? if(isset($row["id"])) { echo $row["id"];}?>" style="" onclick="detayfutbolac(<? if(isset($row["id"])) { echo $row["id"];}?>);"><span><i class="fa fa-plus"></i></span></div>
<div class="t_more bl align_c right" id="detayfutbolkapat<? if(isset($row["id"])) { echo $row["id"];}?>" style="display:none;" onclick="detayfutbolkapat(<? if(isset($row["id"])) { echo $row["id"];}?>);"><span><i class="fa fa-close"></i></span></div>
<div id="comp-specialBetLayerCategoryPopup-<? if(isset($row["id"])) { echo $row["id"];}?>-lastminute" class="e_active jq-special-bet-layer-category-popup e_comp_ref" style="display:none;">
</div>
</div>
<div class="clear">
</div>
<div id="comp-sbLayer-<? if(isset($row["id"])) { echo $row["id"];}?>-lastminute" class="e_active jq-special-bet-layer e_comp_ref" style="display:none;">
<div class="t_more_box">
<div class="hr bg_toughgrey" style="margin-right: 30px;">
</div>
<div class="border_ccc" style="margin: 5px; padding: 18px; text-align: center;" id="loading<? if(isset($row["id"])) { echo $row["id"];}?>">
<img src="assets/loader-5EC8AAA4E74F0E0AD0FC5FF964B6DF96.gif" alt="" width="236" height="31">
</div>
<div id="prematchdetail<? if(isset($row["id"])) { echo $row["id"];}?>" style="display:none">
</div>
</div>
</div>
</div>
</div>
</div>
<div class="t_foot" style="border-top:none"></div>
<div class="space_15 shadow_bot_564"></div>
</div>
</div>

</div>
</span>

<script>
function detayfutbolac(matchid) {
jQuery('#comp-sbLayer-'+matchid+'-lastminute').show();
var rand = Math.random();
$.get('ajax.php?a=detailfutbol&rand='+rand+'&id='+matchid+'',function(data) {
jQuery('#prematchdetail'+matchid).show().html(data);
jQuery('#loading'+matchid).hide().html("");
jQuery('#detayfutbolkapat'+matchid).show();
jQuery('#detayfutbolac'+matchid).hide();
});
}

function detayfutbolkapat(matchid) {
jQuery('#prematchdetail'+matchid).hide().html("");
jQuery('#loading'+matchid).show();
jQuery('#comp-sbLayer-'+matchid+'-lastminute').hide();
jQuery('#detayfutbolkapat'+matchid).hide();
jQuery('#detayfutbolac'+matchid).show();
}
</script>

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

$ulkever = gd("ulke");

$ulkeverdim = gd("ulkeverdim");

$do_cache = 1;
$mikro = microtime();

$tarih = "";

if($tarih=="") {

$tarih_ekle = "";

} else {

$tarih_ekle = "and mac_tarih='$tarih'";	

}



$saat = gd("saat");

if(!empty($saat) and $saat!=0) { $carp = ($saat*60); $eksi = time()+$carp; $saat_ekle = "and mac_time<$eksi"; } elseif($saat==0){$saat_ekle = "";}else { $carp = (180*60); $eksi = time()+$carp; $saat_ekle = "and mac_time<$eksi";} 

$donecek = substr($ulkever,0,-1);

$ulke = $donecek;

if(!empty($ulke)) { $ulke_ekle = "and kupa_id in ($ulke)"; } else { $ulke_ekle = ""; }

if($ulkeverdim==1) {
	$ulke_ekle = "and kupa_ulke='Türkiye'";
} else if($ulkeverdim==2) {
	$ulke_ekle = "and kupa_ulke='İngiltere'";
} else if($ulkeverdim==3) {
	$ulke_ekle = "and kupa_ulke='İspanya'";
} else if($ulkeverdim==4) {
	$ulke_ekle = "and kupa_ulke='Almanya'";
} else if($ulkeverdim==5) {
	$ulke_ekle = "and kupa_ulke='İtalya'";
} else if($ulkeverdim==6) {
	$ulke_ekle = "and kupa_ulke='Fransa'";
}

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
$songuncellemever = $suan-3600;

$sqladder = "and kayittime<$kayittime_ver and bulten='hititbet' $tarih_ekle $saat_ekle $ulke_ekle $gizli_ekle and kupa_isim not like '%Duello%' {$whereyasak} and aktif='1'";
$sor = sed_sql_query("select * from program_futbol where id!='' $sqladder group by kupa_isim  order by mac_time asc ");
if(userayar('sporbulten')==0) { ?>
<div class="bos" style="text-align: center;font-weight: bold;margin: 10px;">Spor (bülten) bahisleri kapalıdır. Yöneticiniz ile görüşünüz.</div>
<? } else {

$say=1;
while($row=sed_sql_fetcharray($sor)) { 
$say++;
?>
<div class="e_active e_noCache jq-compound-event-block"  id="budacount_<?=$row['kupa_id']; ?>">

<div class="border_ccc">
<div>
<div class="t_head cf">
<div class="fs_16 darkgrey pad_l_9 left">
<div itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="#" itemprop="url"><span itemprop="title"><?=getTranslation('futbol')?></span></a> - <div itemprop="child" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb" style="display: inline;"><a href="#" itemprop="url"><span itemprop="title"><?=$row['kupa_isim'];?></span></a></div></div>
</div>

<div class="t_head_but right">
<div class="more_types on">
<span class="ng-scope" id="opensubbet_1" onclick="opensubbet('<?=$row['kupa_id'];?>');" style="display: inline;margin-right: 12px;font-size: 11px;text-decoration: underline;cursor: pointer;"><?=getTranslation('bahisseceneklerinigoster')?></span>
<span class="ng-scope" id="slocesubbet_1" onclick="slocesubbet('<?=$row['kupa_id'];?>');" style="display: none;margin-right: 12px;font-size: 11px;text-decoration: underline;cursor: pointer;"><?=getTranslation('bahisseceneklerinigizle')?></span>
</div>
</div>

</div>
</div>

<div class="e_active jq-compound-event-block">
<div id="resultTypeFilter_<?=$row['kupa_id'];?>_UPCOMING" class="resultTypeFilter type_box cf list_<?=$row['kupa_id'];?>" style="display: none;">
<div class="type_but on" id="odseelctbut_1_<?=$row['kupa_id'];?>" onclick="macsonucuac('<?=$row['kupa_id'];?>');">
<div class="info cf"><span class="left"><?=getTranslation('tahminsecenegi')?></span>
<span class="info_but"><span class="bubble b_left top16 b_shad"><?=getTranslation('tahminsecenegiaciklama')?></span></span>
</div>
</div>
<div class="type_but" id="odseelctbut_16_<?=$row['kupa_id'];?>" onclick="ciftesansac('<?=$row['kupa_id'];?>');">
<div class="info cf"><span class="left"><?=getTranslation('tahminsecenegiciftesans')?></span>
<span class="info_but"><span class="bubble b_left top16 b_shad"><?=getTranslation('tahminsecenegiaciklamacs')?></span></span>
</div>
</div>
<div class="type_but " id="odseelctbut_28_<?=$row['kupa_id'];?>" onclick="altustac('<?=$row['kupa_id'];?>');">
<div class="info cf"><span class="left"><?=getTranslation('tahminsecenegialtust')?> 2.5</span>
<span class="info_but"><span class="bubble b_left top16 b_shad"><?=getTranslation('tahminsecenegiaciklamaau')?></span></span>
</div>
</div>
</div>
</div>

<div class="e_active">
<?

$i = 1;
unset($ss);
unset($ass);
$ss = sed_sql_query("select 
PF.id AS id,
PF.mac_kodu AS mac_kodu,
PF.iddaa_kodu AS iddaa_kodu,
PF.mac_time AS mac_time,
PF.ev_takim AS ev_takim,
PF.konuk_takim AS konuk_takim,
PF.istatistik AS istatistik,
PF.mbs AS mbs,
PF.kupa_id AS kupa_id,
PF.istatistik AS istatistik,
PF.istatistik AS istatistik,
PF.istatistik AS istatistik,

PF.evoran + IF(MO1_EV.oran IS NULL, 0, MO1_EV.oran) + IF(MO2_EV.oran IS NULL, 0, MO2_EV.oran) + IF(MO3_EV.oran IS NULL, 0, MO3_EV.oran) + IF(MO4_EV.oran IS NULL, 0, MO4_EV.oran) + IF(TO1.oran IS NULL, 0, TO1.oran) + IF(TO2.oran IS NULL, 0, TO2.oran) + IF(TO3.oran IS NULL, 0, TO3.oran) + IF(TO4.oran IS NULL, 0, TO4.oran) AS evoran,

PF.beraberoran + IF(MO1_BER.oran IS NULL, 0, MO1_BER.oran) + IF(MO2_BER.oran IS NULL, 0, MO2_BER.oran) + IF(MO3_BER.oran IS NULL, 0, MO3_BER.oran) + IF(MO4_BER.oran IS NULL, 0, MO4_BER.oran) + IF(TO1.oran IS NULL, 0, TO1.oran) + IF(TO2.oran IS NULL, 0, TO2.oran) + IF(TO3.oran IS NULL, 0, TO3.oran) + IF(TO4.oran IS NULL, 0, TO4.oran) AS beraberoran,

PF.deporan + IF(MO1_DEP.oran IS NULL, 0, MO1_DEP.oran) + IF(MO2_DEP.oran IS NULL, 0, MO2_DEP.oran) + IF(MO3_DEP.oran IS NULL, 0, MO3_DEP.oran) + IF(MO4_DEP.oran IS NULL, 0, MO4_DEP.oran) + IF(TO1.oran IS NULL, 0, TO1.oran) + IF(TO2.oran IS NULL, 0, TO2.oran) + IF(TO3.oran IS NULL, 0, TO3.oran) + IF(TO4.oran IS NULL, 0, TO4.oran) AS deporan,

PF.cf1x + IF(CF1X_1.oran IS NULL, 0, CF1X_1.oran) + IF(CF1X_2.oran IS NULL, 0, CF1X_2.oran) + IF(CF1X_3.oran IS NULL, 0, CF1X_3.oran) + IF(CF1X_4.oran IS NULL, 0, CF1X_4.oran) + IF(TO1_CF.oran IS NULL, 0, TO1_CF.oran) + IF(TO2_CF.oran IS NULL, 0, TO2_CF.oran) + IF(TO3_CF.oran IS NULL, 0, TO3_CF.oran) + IF(TO4_CF.oran IS NULL, 0, TO4_CF.oran) AS cf1x,

PF.cfx2 + IF(CFX2_1.oran IS NULL, 0, CFX2_1.oran) + IF(CFX2_2.oran IS NULL, 0, CFX2_2.oran) + IF(CFX2_3.oran IS NULL, 0, CFX2_3.oran) + IF(CFX2_4.oran IS NULL, 0, CFX2_4.oran) + IF(TO1_CF.oran IS NULL, 0, TO1_CF.oran) + IF(TO2_CF.oran IS NULL, 0, TO2_CF.oran) + IF(TO3_CF.oran IS NULL, 0, TO3_CF.oran) + IF(TO4_CF.oran IS NULL, 0, TO4_CF.oran) AS cfx2,

PF.cf12 + IF(CF12_1.oran IS NULL, 0, CF12_1.oran) + IF(CF12_2.oran IS NULL, 0, CF12_2.oran) + IF(CF12_3.oran IS NULL, 0, CF12_3.oran) + IF(CF12_4.oran IS NULL, 0, CF12_4.oran) + IF(TO1_CF.oran IS NULL, 0, TO1_CF.oran) + IF(TO2_CF.oran IS NULL, 0, TO2_CF.oran) + IF(TO3_CF.oran IS NULL, 0, TO3_CF.oran) + IF(TO4_CF.oran IS NULL, 0, TO4_CF.oran) AS cf12,

PF.alt25 + IF(AU25A_1.oran IS NULL, 0, AU25A_1.oran) + IF(AU25A_2.oran IS NULL, 0, AU25A_2.oran) + IF(AU25A_3.oran IS NULL, 0, AU25A_3.oran) + IF(AU25A_4.oran IS NULL, 0, AU25A_4.oran) + IF(TO1_AU.oran IS NULL, 0, TO1_AU.oran) + IF(TO2_AU.oran IS NULL, 0, TO2_AU.oran) + IF(TO3_AU.oran IS NULL, 0, TO3_AU.oran) + IF(TO4_AU.oran IS NULL, 0, TO4_AU.oran) AS alt25,

PF.ust25 + IF(AU25U_1.oran IS NULL, 0, AU25U_1.oran) + IF(AU25U_2.oran IS NULL, 0, AU25U_2.oran) + IF(AU25U_3.oran IS NULL, 0, AU25U_3.oran) + IF(AU25U_4.oran IS NULL, 0, AU25U_4.oran) + IF(TO1_AU.oran IS NULL, 0, TO1_AU.oran) + IF(TO2_AU.oran IS NULL, 0, TO2_AU.oran) + IF(TO3_AU.oran IS NULL, 0, TO3_AU.oran) + IF(TO4_AU.oran IS NULL, 0, TO4_AU.oran) AS ust25,

YT1.oran_tip_id as YT1Tip,
YT2.oran_tip_id as YT2Tip,
YT3.oran_tip_id as YT3Tip,
YT4.oran_tip_id as YT4Tip,

YT1_CF.oran_tip_id as YT1Tip_CF,
YT2_CF.oran_tip_id as YT2Tip_CF,
YT3_CF.oran_tip_id as YT3Tip_CF,
YT4_CF.oran_tip_id as YT4Tip_CF,

YT1_AU.oran_tip_id as YT1Tip_AU,
YT2_AU.oran_tip_id as YT2Tip_AU,
YT3_AU.oran_tip_id as YT3Tip_AU,
YT4_AU.oran_tip_id as YT4Tip_AU

from program_futbol AS PF

LEFT OUTER JOIN maclar_oranlar AS MO1_EV ON MO1_EV.mac_db_id = PF.id AND MO1_EV.oran_val_id = 1 AND MO1_EV.bayi_id = '$ub[id]' AND MO1_EV.spor_tipi = 'futbol'
LEFT OUTER JOIN maclar_oranlar AS MO2_EV ON MO2_EV.mac_db_id = PF.id AND MO2_EV.oran_val_id = 1 AND MO2_EV.bayi_id = '$ub[hesap_sahibi_id]' AND MO2_EV.spor_tipi = 'futbol'
LEFT OUTER JOIN maclar_oranlar AS MO3_EV ON MO3_EV.mac_db_id = PF.id AND MO3_EV.oran_val_id = 1 AND MO3_EV.bayi_id = '$ub[hesap_root_id]' AND MO3_EV.spor_tipi = 'futbol'
LEFT OUTER JOIN maclar_oranlar AS MO4_EV ON MO4_EV.mac_db_id = PF.id AND MO4_EV.oran_val_id = 1 AND MO4_EV.bayi_id = '$ub[hesap_root_root_id]' AND MO4_EV.spor_tipi = 'futbol'

LEFT OUTER JOIN maclar_oranlar AS MO1_BER ON MO1_BER.mac_db_id = PF.id AND MO1_BER.oran_val_id = 2 AND MO1_BER.bayi_id = '$ub[id]' AND MO1_BER.spor_tipi = 'futbol'
LEFT OUTER JOIN maclar_oranlar AS MO2_BER ON MO2_BER.mac_db_id = PF.id AND MO2_BER.oran_val_id = 2 AND MO2_BER.bayi_id = '$ub[hesap_sahibi_id]' AND MO2_BER.spor_tipi = 'futbol'
LEFT OUTER JOIN maclar_oranlar AS MO3_BER ON MO3_BER.mac_db_id = PF.id AND MO3_BER.oran_val_id = 2 AND MO3_BER.bayi_id = '$ub[hesap_root_id]' AND MO3_BER.spor_tipi = 'futbol'
LEFT OUTER JOIN maclar_oranlar AS MO4_BER ON MO4_BER.mac_db_id = PF.id AND MO4_BER.oran_val_id = 2 AND MO4_BER.bayi_id = '$ub[hesap_root_root_id]' AND MO4_BER.spor_tipi = 'futbol'

LEFT OUTER JOIN maclar_oranlar AS MO1_DEP ON MO1_DEP.mac_db_id = PF.id AND MO1_DEP.oran_val_id = 3 AND MO1_DEP.bayi_id = '$ub[id]' AND MO1_DEP.spor_tipi = 'futbol'
LEFT OUTER JOIN maclar_oranlar AS MO2_DEP ON MO2_DEP.mac_db_id = PF.id AND MO2_DEP.oran_val_id = 3 AND MO2_DEP.bayi_id = '$ub[hesap_sahibi_id]' AND MO2_DEP.spor_tipi = 'futbol'
LEFT OUTER JOIN maclar_oranlar AS MO3_DEP ON MO3_DEP.mac_db_id = PF.id AND MO3_DEP.oran_val_id = 3 AND MO3_DEP.bayi_id = '$ub[hesap_root_id]' AND MO3_DEP.spor_tipi = 'futbol'
LEFT OUTER JOIN maclar_oranlar AS MO4_DEP ON MO4_DEP.mac_db_id = PF.id AND MO4_DEP.oran_val_id = 3 AND MO4_DEP.bayi_id = '$ub[hesap_root_root_id]' AND MO4_DEP.spor_tipi = 'futbol'

LEFT OUTER JOIN maclar_oranlar AS CF1X_1 ON CF1X_1.mac_db_id = PF.id AND CF1X_1.oran_val_id = 176 AND CF1X_1.bayi_id = '$ub[id]' AND CF1X_1.spor_tipi = 'futbol'
LEFT OUTER JOIN maclar_oranlar AS CF1X_2 ON CF1X_2.mac_db_id = PF.id AND CF1X_2.oran_val_id = 176 AND CF1X_2.bayi_id = '$ub[hesap_sahibi_id]' AND CF1X_2.spor_tipi = 'futbol'
LEFT OUTER JOIN maclar_oranlar AS CF1X_3 ON CF1X_3.mac_db_id = PF.id AND CF1X_3.oran_val_id = 176 AND CF1X_3.bayi_id = '$ub[hesap_root_id]' AND CF1X_3.spor_tipi = 'futbol'
LEFT OUTER JOIN maclar_oranlar AS CF1X_4 ON CF1X_4.mac_db_id = PF.id AND CF1X_4.oran_val_id = 176 AND CF1X_4.bayi_id = '$ub[hesap_root_root_id]' AND CF1X_4.spor_tipi = 'futbol'

LEFT OUTER JOIN maclar_oranlar AS CFX2_1 ON CFX2_1.mac_db_id = PF.id AND CFX2_1.oran_val_id = 177 AND CFX2_1.bayi_id = '$ub[id]' AND CFX2_1.spor_tipi = 'futbol'
LEFT OUTER JOIN maclar_oranlar AS CFX2_2 ON CFX2_2.mac_db_id = PF.id AND CFX2_2.oran_val_id = 177 AND CFX2_2.bayi_id = '$ub[hesap_sahibi_id]' AND CFX2_2.spor_tipi = 'futbol'
LEFT OUTER JOIN maclar_oranlar AS CFX2_3 ON CFX2_3.mac_db_id = PF.id AND CFX2_3.oran_val_id = 177 AND CFX2_3.bayi_id = '$ub[hesap_root_id]' AND CFX2_3.spor_tipi = 'futbol'
LEFT OUTER JOIN maclar_oranlar AS CFX2_4 ON CFX2_4.mac_db_id = PF.id AND CFX2_4.oran_val_id = 177 AND CFX2_4.bayi_id = '$ub[hesap_root_root_id]' AND CFX2_4.spor_tipi = 'futbol'

LEFT OUTER JOIN maclar_oranlar AS CF12_1 ON CF12_1.mac_db_id = PF.id AND CF12_1.oran_val_id = 178 AND CF12_1.bayi_id = '$ub[id]' AND CF12_1.spor_tipi = 'futbol'
LEFT OUTER JOIN maclar_oranlar AS CF12_2 ON CF12_2.mac_db_id = PF.id AND CF12_2.oran_val_id = 178 AND CF12_2.bayi_id = '$ub[hesap_sahibi_id]' AND CF12_2.spor_tipi = 'futbol'
LEFT OUTER JOIN maclar_oranlar AS CF12_3 ON CF12_3.mac_db_id = PF.id AND CF12_3.oran_val_id = 178 AND CF12_3.bayi_id = '$ub[hesap_root_id]' AND CF12_3.spor_tipi = 'futbol'
LEFT OUTER JOIN maclar_oranlar AS CF12_4 ON CF12_4.mac_db_id = PF.id AND CF12_4.oran_val_id = 178 AND CF12_4.bayi_id = '$ub[hesap_root_root_id]' AND CF12_4.spor_tipi = 'futbol'

LEFT OUTER JOIN maclar_oranlar AS AU25A_1 ON AU25A_1.mac_db_id = PF.id AND AU25A_1.oran_val_id = 33 AND AU25A_1.bayi_id = '$ub[id]' AND AU25A_1.spor_tipi = 'futbol'
LEFT OUTER JOIN maclar_oranlar AS AU25A_2 ON AU25A_2.mac_db_id = PF.id AND AU25A_2.oran_val_id = 33 AND AU25A_2.bayi_id = '$ub[hesap_sahibi_id]' AND AU25A_2.spor_tipi = 'futbol'
LEFT OUTER JOIN maclar_oranlar AS AU25A_3 ON AU25A_3.mac_db_id = PF.id AND AU25A_3.oran_val_id = 33 AND AU25A_3.bayi_id = '$ub[hesap_root_id]' AND AU25A_3.spor_tipi = 'futbol'
LEFT OUTER JOIN maclar_oranlar AS AU25A_4 ON AU25A_4.mac_db_id = PF.id AND AU25A_4.oran_val_id = 33 AND AU25A_4.bayi_id = '$ub[hesap_root_root_id]' AND AU25A_4.spor_tipi = 'futbol'

LEFT OUTER JOIN maclar_oranlar AS AU25U_1 ON AU25U_1.mac_db_id = PF.id AND AU25U_1.oran_val_id = 34 AND AU25U_1.bayi_id = '$ub[id]' AND AU25U_1.spor_tipi = 'futbol'
LEFT OUTER JOIN maclar_oranlar AS AU25U_2 ON AU25U_2.mac_db_id = PF.id AND AU25U_2.oran_val_id = 34 AND AU25U_2.bayi_id = '$ub[hesap_sahibi_id]' AND AU25U_2.spor_tipi = 'futbol'
LEFT OUTER JOIN maclar_oranlar AS AU25U_3 ON AU25U_3.mac_db_id = PF.id AND AU25U_3.oran_val_id = 34 AND AU25U_3.bayi_id = '$ub[hesap_root_id]' AND AU25U_3.spor_tipi = 'futbol'
LEFT OUTER JOIN maclar_oranlar AS AU25U_4 ON AU25U_4.mac_db_id = PF.id AND AU25U_4.oran_val_id = 34 AND AU25U_4.bayi_id = '$ub[hesap_root_root_id]' AND AU25U_4.spor_tipi = 'futbol'

LEFT OUTER JOIN maclar_topluoranlar AS TO1 ON TO1.oran_val_id = '1' AND TO1.bayi_id = '$ub[id]' AND TO1.spor_tipi = 'futbol'
LEFT OUTER JOIN maclar_topluoranlar AS TO2 ON TO2.oran_val_id = '1' AND TO2.bayi_id = '$ub[hesap_sahibi_id]' AND TO2.spor_tipi = 'futbol'
LEFT OUTER JOIN maclar_topluoranlar AS TO3 ON TO3.oran_val_id = '1' AND TO3.bayi_id = '$ub[hesap_root_id]' AND TO3.spor_tipi = 'futbol'
LEFT OUTER JOIN maclar_topluoranlar AS TO4 ON TO4.oran_val_id = '1' AND TO4.bayi_id = '$ub[hesap_root_root_id]' AND TO4.spor_tipi = 'futbol'

LEFT OUTER JOIN maclar_topluoranlar AS TO1_CF ON TO1_CF.oran_val_id = '58' AND TO1_CF.bayi_id = '$ub[id]' AND TO1_CF.spor_tipi = 'futbol'
LEFT OUTER JOIN maclar_topluoranlar AS TO2_CF ON TO2_CF.oran_val_id = '58' AND TO2_CF.bayi_id = '$ub[hesap_sahibi_id]' AND TO2_CF.spor_tipi = 'futbol'
LEFT OUTER JOIN maclar_topluoranlar AS TO3_CF ON TO3_CF.oran_val_id = '58' AND TO3_CF.bayi_id = '$ub[hesap_root_id]' AND TO3_CF.spor_tipi = 'futbol'
LEFT OUTER JOIN maclar_topluoranlar AS TO4_CF ON TO4_CF.oran_val_id = '58' AND TO4_CF.bayi_id = '$ub[hesap_root_root_id]' AND TO4_CF.spor_tipi = 'futbol'

LEFT OUTER JOIN maclar_topluoranlar AS TO1_AU ON TO1_AU.oran_val_id = '13' AND TO1_AU.bayi_id = '$ub[id]' AND TO1_AU.spor_tipi = 'futbol'
LEFT OUTER JOIN maclar_topluoranlar AS TO2_AU ON TO2_AU.oran_val_id = '13' AND TO2_AU.bayi_id = '$ub[hesap_sahibi_id]' AND TO2_AU.spor_tipi = 'futbol'
LEFT OUTER JOIN maclar_topluoranlar AS TO3_AU ON TO3_AU.oran_val_id = '13' AND TO3_AU.bayi_id = '$ub[hesap_root_id]' AND TO3_AU.spor_tipi = 'futbol'
LEFT OUTER JOIN maclar_topluoranlar AS TO4_AU ON TO4_AU.oran_val_id = '13' AND TO4_AU.bayi_id = '$ub[hesap_root_root_id]' AND TO4_AU.spor_tipi = 'futbol'

LEFT OUTER JOIN oyunlar_normal AS YT1 ON YT1.oran_tip_id = '1' AND YT1.bayi_id = '$ub[id]' AND YT1.spor_tipi = 'futbol'
LEFT OUTER JOIN oyunlar_normal AS YT2 ON YT2.oran_tip_id = '1' AND YT2.bayi_id = '$ub[hesap_sahibi_id]' AND YT2.spor_tipi = 'futbol'
LEFT OUTER JOIN oyunlar_normal AS YT3 ON YT3.oran_tip_id = '1' AND YT3.bayi_id = '$ub[hesap_root_id]' AND YT3.spor_tipi = 'futbol'
LEFT OUTER JOIN oyunlar_normal AS YT4 ON YT4.oran_tip_id = '1' AND YT4.bayi_id = '$ub[hesap_root_root_id]' AND YT4.spor_tipi = 'futbol'

LEFT OUTER JOIN oyunlar_normal AS YT1_CF ON YT1_CF.oran_tip_id = '58' AND YT1_CF.bayi_id = '$ub[id]' AND YT1_CF.spor_tipi = 'futbol'
LEFT OUTER JOIN oyunlar_normal AS YT2_CF ON YT2_CF.oran_tip_id = '58' AND YT2_CF.bayi_id = '$ub[hesap_sahibi_id]' AND YT2_CF.spor_tipi = 'futbol'
LEFT OUTER JOIN oyunlar_normal AS YT3_CF ON YT3_CF.oran_tip_id = '58' AND YT3_CF.bayi_id = '$ub[hesap_root_id]' AND YT3_CF.spor_tipi = 'futbol'
LEFT OUTER JOIN oyunlar_normal AS YT4_CF ON YT4_CF.oran_tip_id = '58' AND YT4_CF.bayi_id = '$ub[hesap_root_root_id]' AND YT4_CF.spor_tipi = 'futbol'

LEFT OUTER JOIN oyunlar_normal AS YT1_AU ON YT1_AU.oran_tip_id = '13' AND YT1_AU.bayi_id = '$ub[id]' AND YT1_AU.spor_tipi = 'futbol'
LEFT OUTER JOIN oyunlar_normal AS YT2_AU ON YT2_AU.oran_tip_id = '13' AND YT2_AU.bayi_id = '$ub[hesap_sahibi_id]' AND YT2_AU.spor_tipi = 'futbol'
LEFT OUTER JOIN oyunlar_normal AS YT3_AU ON YT3_AU.oran_tip_id = '13' AND YT3_AU.bayi_id = '$ub[hesap_root_id]' AND YT3_AU.spor_tipi = 'futbol'
LEFT OUTER JOIN oyunlar_normal AS YT4_AU ON YT4_AU.oran_tip_id = '13' AND YT4_AU.bayi_id = '$ub[hesap_root_root_id]' AND YT4_AU.spor_tipi = 'futbol'

where PF.id!='' $sqladder and PF.kupa_isim='$row[kupa_isim]' order by PF.mac_time asc");

while($ass=sed_sql_fetcharray($ss)){
$i++;

if($ass['YT1Tip'] > 0) {

$ev_kazanc = "-";
$beraberlik = "-";
$konuk_kazanc = "-";

} else if($ass['YT2Tip'] > 0) {

$ev_kazanc = "-";
$beraberlik = "-";
$konuk_kazanc = "-";

} else if($ass['YT3Tip'] > 0) {

$ev_kazanc = "-";
$beraberlik = "-";
$konuk_kazanc = "-";

} else if($ass['YT4Tip'] > 0) {

$ev_kazanc = "-";
$beraberlik = "-";
$konuk_kazanc = "-";

} else {

if($ass['evoran']=="0.00" || $ass['evoran']<1.01) { $ev_kazanc = "-"; } else { $ev_kazanc = nf($ass['evoran']); }
if($ass['beraberoran']=="0.00" || $ass['beraberoran']<1.01) { $beraberlik = "-"; } else { $beraberlik = nf($ass['beraberoran']); }
if($ass['deporan']=="0.00" || $ass['deporan']<1.01) { $konuk_kazanc = "-"; } else { $konuk_kazanc = nf($ass['deporan']); }

}

if($ass['YT1Tip_CF'] > 0) {

$ciftesans_1X = "-";
$ciftesans_X2 = "-";
$ciftesans_12 = "-";

} else if($ass['YT2Tip_CF'] > 0) {

$ciftesans_1X = "-";
$ciftesans_X2 = "-";
$ciftesans_12 = "-";

} else if($ass['YT3Tip_CF'] > 0) {

$ciftesans_1X = "-";
$ciftesans_X2 = "-";
$ciftesans_12 = "-";

} else if($ass['YT4Tip_CF'] > 0) {

$ciftesans_1X = "-";
$ciftesans_X2 = "-";
$ciftesans_12 = "-";

} else {

if($ass['cf1x']=="0.00" || $ass['cf1x']<1.01) { $ciftesans_1X = "-"; } else { $ciftesans_1X = nf($ass['cf1x']); }
if($ass['cfx2']=="0.00" || $ass['cfx2']<1.01) { $ciftesans_X2 = "-"; } else { $ciftesans_X2 = nf($ass['cfx2']); }
if($ass['cf12']=="0.00" || $ass['cf12']<1.01) { $ciftesans_12 = "-"; } else { $ciftesans_12 = nf($ass['cf12']); }

}

if($ass['YT1Tip_AU'] > 0) {

$altust_25_alt = "-";
$altust_25_ust = "-";

} else if($ass['YT2Tip_AU'] > 0) {

$altust_25_alt = "-";
$altust_25_ust = "-";

} else if($ass['YT3Tip_AU'] > 0) {

$altust_25_alt = "-";
$altust_25_ust = "-";

} else if($ass['YT4Tip_AU'] > 0) {

$altust_25_alt = "-";
$altust_25_ust = "-";

} else {

if($ass['alt25']=="0.00" || $ass['alt25']<1.01) { $altust_25_alt = "-"; } else { $altust_25_alt = nf($ass['alt25']); }
if($ass['ust25']=="0.00" || $ass['ust25']<1.01) { $altust_25_ust = "-"; } else { $altust_25_ust = nf($ass['ust25']); }

}

$mbs = mbsver($ass['id'],$ass['mbs'],$ass['kupa_id']);

$encoded = "$ass[id]|$ass[ev_takim]|$ass[konuk_takim]|$ass[mac_kodu]|$mbs|$ass[mac_time]|futbol";
?>
<div class="<? if ($i %2 != 0){ ?>even<? }else{ ?><? } ?>" >
<? if($i==2){?>
<div class="e_active" id="comp-UPCOMING_HEADER_<?=$row['kupa_id'];?>">

<div class="t_subhead cf">

<div class="grey_999 right cf" id="thebox_1_<?=$row['kupa_id'];?>" style="margin-right: 95px">
<div class="w_39 left" style="min-height: 1px;">1</div>
<div class="w_39 left" style="min-height: 1px;">X</div>
<div class="w_39 left" style="min-height: 1px;">2</div>
</div>

<div class="grey_999 right cf" id="thebox_16_<?=$row['kupa_id'];?>" style="margin-right: 100px;display:none">
<div class="w_39 left" style="min-height: 1px;">1X</div>
<div class="w_39 left" style="min-height: 1px;">X2</div>
<div class="w_39 left" style="min-height: 1px;">12</div>
</div>

<div class="grey_999 right cf" id="thebox_28_<?=$row['kupa_id'];?>" style="margin-right: 98px;display:none">
<div class="w_39 left" style="min-height: 1px;">2.5</div>
<div class="w_39 left" style="min-height: 1px;">A</div>
<div class="w_39 left" style="min-height: 1px;">Ü</div>
</div>

<div class="red pad_l_9" onmouseover="tip(jQuery(this).html(), 55, true)" onmouseout="untip()">
<span><?=$row['kupa_ulke'];?></span>
</div>
<div class="close_groups" onclick="toggleAndUpdate(event, '1301','GROUP')"></div>
</div>

</div>
<? } ?>
<div class="e_active t_row jq-event-row-cont" >
<div class="info">
<div class="w_30 align_c left over" style="" onmouseover="tip(this.firstChild.data, 6)" >
<? echo $GLOBALS["gunler"][date("N",$ass['mac_time'])];?>
</div>

<div class="w_35 align_center left over ng-binding" title="<?=date("Y-m-d H:i",$ass['mac_time']); ?>">&nbsp;<?=date("d.m",$ass['mac_time']); ?>&nbsp;/&nbsp;</div>

<div class="w_35 bl align_center left timecell"><div class="timeText2 ng-binding" style="font-weight: bold;"><?=date("H:i",$ass['mac_time']); ?></div></div>

<div class="t_cell w_113 left" style="width: 119px;margin-left:5px;cursor:pointer;"><span class="teamname"><?=$ass["ev_takim"];?></span></div>

<div class="teamHelpWrap" style="width: 119px;"><div class="t_cell w_113 left" style="cursor:pointer;"><span class="teamname"><?=$ass["konuk_takim"];?></span></div></div>

<div style="border: 1px solid #f74835;background-color: #ffc3bc;color: #000000;margin-top:3px;" class="mbs<?=$mbs;?>"><a href="javascript:;" class="ng-binding"><?=$mbs;?></a></div>

<div class="bl pad_2 left" id="realgames_1_<?=$row['kupa_id'];?>">
<div data-qa="oddsButton" class="qbut qbut-<?=md5("1X2|1|".$ass["id"]);?>" onclick="kupon('<?=codekupon("$encoded|1|$ev_kazanc"); ?>');"><?=$ev_kazanc;?></div>
<div data-qa="oddsButton" class="qbut qbut-<?=md5("1X2|X|".$ass["id"]);?>" onclick="kupon('<?=codekupon("$encoded|2|$beraberlik"); ?>');"><?=$beraberlik;?></div>
<div data-qa="oddsButton" class="qbut qbut-<?=md5("1X2|2|".$ass["id"]);?>" onclick="kupon('<?=codekupon("$encoded|3|$konuk_kazanc"); ?>');"><?=$konuk_kazanc;?></div>
</div>

<div class="bl pad_2 left " id="realgames_16_<?=$row['kupa_id'];?>" style="display:none">
<div data-qa="oddsButton" class="qbut qbut-<?=md5("Çifte Şans|1X|".$ass["id"]);?>" onclick="kupon('<?=codekupon("$encoded|76|$ciftesans_1X"); ?>');"><?=$ciftesans_1X;?></div>
<div data-qa="oddsButton" class="qbut qbut-<?=md5("Çifte Şans|X2|".$ass["id"]);?>" onclick="kupon('<?=codekupon("$encoded|77|$ciftesans_X2"); ?>');"><?=$ciftesans_X2;?></div>
<div data-qa="oddsButton" class="qbut qbut-<?=md5("Çifte Şans|12|".$ass["id"]);?>" onclick="kupon('<?=codekupon("$encoded|78|$ciftesans_12"); ?>');"><?=$ciftesans_12;?></div>
</div>

<div class="bl pad_2 left " id="realgames_28_<?=$row['kupa_id'];?>" style="display:none">
<div style="position: relative;float: left;width: 37px;height: 18px;color: #000;font-size: 11px;line-height: 18px;text-align: center;margin: 1px;margin-top: 2px;">(2.5)</div>
<div data-qa="oddsButton" class="qbut qbut-<?=md5("Toplam Gol Alt/Üst 2.5|A|".$ass["id"]);?>" onclick="kupon('<?=codekupon("$encoded|33|$altust_25_alt"); ?>');"><?=$altust_25_alt;?></div>
<div data-qa="oddsButton" class="qbut qbut-<?=md5("Toplam Gol Alt/Üst 2.5|Ü|".$ass["id"]);?>" onclick="kupon('<?=codekupon("$encoded|34|$altust_25_ust"); ?>');"><?=$altust_25_ust;?></div>
</div>

<div class="bl pad_r_3 left">
<div class="ibut">
<div class="user">
<div id="ratioHolder<?=$ass["id"];?>" style="display: none;">
</div>
</div>
</div>
<? if($ass["istatistik"]!=0){ ?>
<div class="ibut " id="statistics-<?=$ass["id"];?>-lastminute">
<a href="javascript:popup('https://s5.sir.sportradar.com/totobo/tr/2/match/<?=$ass["istatistik"];?>','stats',1078,768);" class="stat" onmouseover="loadEventStatistics2(this, <?=$row["id"];?>, 'soccer', 'lastminute')" onmouseout="untooltipDelayed(this)"></a>
</div>
<? } else { ?>
<div class="ibut off" id="statistics-<?=$ass["id"];?>-lastminute">
<div class="stat"></div>
</div>
<? } ?>
<div id="comp-eventTvButton-<?=$ass["id"];?>-lastminute" class="e_active ibut off" e:url="@@eventTvButton-<?=$ass["id"];?>-lastminute/program/eventTVButton2?eventId=<?=$ass["id"];?>" e:hash="13sjxvy" e:interval="-1" e:next="-1">
<div class="tv">&nbsp;</div>
</div>
</div>
</div>
<div class="limits_hover ">

<? 
$gizli_oran_tips = gizli_oran_tips($ass['kupa_id'],$ass['id']);
if($gizli_oran_tips!="") { $gizli_ekle = "and oran_tip not in ($gizli_oran_tips)"; } else { $gizli_ekle = ""; }
$sayi = sed_sql_numrows(sed_sql_query("select * from oranlar_futbol where mac_db_id='".$ass["id"]."' $gizli_ekle and durum='1' order by id asc"));
?>


<div data-qa="extraButton" class="t_more bl align_c right" id="detayfutbolac<? if(isset($ass["id"])) { echo $ass["id"];}?>" style="" onclick="detayfutbolac(<? if(isset($ass["id"])) { echo $ass["id"];}?>);">
<span>+<?=$sayi;?></span>
</div>

<div data-qa="extraButton" class="t_more bl align_c right" id="detayfutbolkapat<? if(isset($ass["id"])) { echo $ass["id"];}?>" style="display:none;" onclick="detayfutbolkapat(<? if(isset($ass["id"])) { echo $ass["id"];}?>);">
<span>-<?=$sayi;?></span>
</div>


<div id="comp-specialBetLayerCategoryPopup-<?=$ass["id"];?>-lastminute" class="e_active jq-special-bet-layer-category-popup e_comp_ref" style="display:none;">
</div>
</div>
<div class="clear">
</div>
<div id="comp-sbLayer-<?=$ass["id"];?>-lastminute" class="e_active jq-special-bet-layer e_comp_ref" style="display:none;">
<div class="t_more_box">
<div class="hr bg_toughgrey" style="margin-right: 30px;">
</div>
<div class="border_ccc" style="margin: 5px; padding: 18px; text-align: center;" id="loading<? if(isset($ass["id"])) { echo $ass["id"];}?>">
<img src="<? echo $theme_dir; ?>assets/loader-5EC8AAA4E74F0E0AD0FC5FF964B6DF96.gif" alt="" width="236" height="31">
</div>
<div id="prematchdetail<? if(isset($ass["id"])) { echo $ass["id"];}?>"  style="display:none">
</div>
</div>
</div>
</div>
</div>
<? } ?>
</div>
<div class="t_foot" style="border-top:none"></div>
<div class="space_15 shadow_bot_564"></div>
</div>
</div>
<? } ?>
<? } ?>

<? }

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

$ulkever = gd("ulke");

$do_cache = 1;
$mikro = microtime();

$tarih = "";

if($tarih=="") {

$tarih_ekle = "";

} else {

$tarih_ekle = "and mac_tarih='$tarih'";	

}



$saat = gd("saat");

if(!empty($saat) and $saat!=0) { $carp = ($saat*60); $eksi = time()+$carp; $saat_ekle = "and mac_time<$eksi"; } elseif($saat==0){$saat_ekle = "";}else { $carp = (180*60); $eksi = time()+$carp; $saat_ekle = "and mac_time<$eksi";} 

$donecek = substr($ulkever,0,-1);

$ulke = $donecek;

if(!empty($ulke)) { $ulke_ekle = "and kupa_id in ($ulke)"; } else { $ulke_ekle = ""; }

$bultentip = gd("bultentip");

$sasi=0;

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
$kayittime_ver = $suan-60;
$songuncellemever = $suan-3600;
$sqladder = "AND (kimkazanir!='0' or 1x2!='0' or handikap!='0' or altust!='0') and kayittime<$kayittime_ver and bulten='hititbet' $tarih_ekle $saat_ekle $ulke_ekle $gizli_ekle and kupa_isim not like '%Duello%' {$whereyasak} and aktif='1'";
$sor = sed_sql_query("select * from program_basketbol where id!='' $sqladder group by kupa_isim  order by mac_time asc ");
if(userayar('sporbulten')==0) { ?>
<div class="bos" style="text-align: center;font-weight: bold;margin: 10px;">Spor (bülten) bahisleri kapalıdır. Yöneticiniz ile görüşünüz.</div>
<? } else {

$say=1;
while($row=sed_sql_fetcharray($sor)) { 
$say++;
?>
<div class="e_active e_noCache jq-compound-event-block"  id="_program_blocks_compoundEventBlock_groupId_1201_type_UPCOMING">
<div class="border_ccc"><div>
<div class="t_head cf">
<div class="fs_16 darkgrey pad_l_9 left">
<div itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
<a href="#" itemprop="url"><span itemprop="title"><?=getTranslation('basketbol')?></span></a> - <div itemprop="child" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb" style="display: inline;"><a href="#" itemprop="url"><span itemprop="title"><?=$row['kupa_isim'];?></span></a></div>
</div>
</div>
</div>
</div>
<div class="e_active">
<?

$i = 1;
unset($ss);
unset($ass);
$ss = sed_sql_query("select * from program_basketbol where id!='' $sqladder and kupa_isim='$row[kupa_isim]' order by mac_time asc ");
while($ass=sed_sql_fetcharray($ss)){
$i++;

$h1_kazanc = oranbulxxx_basketbol($ass['id'],15);
$h2_kazanc = oranbulxxx_basketbol($ass['id'],16);

$h1_kazanc_id = oranbulb_mobil_id($ass['id'],15);
$h2_kazanc_id = oranbulb_mobil_id($ass['id'],16);

$handikap1_ver = bilgi("select oran_val_b from oranlar_basketbol where mac_db_id='$ass[id]' and oran_tip='7' and oran_val_id='15' ORDER BY id ASC");
$handikap2_ver = bilgi("select oran_val_b from oranlar_basketbol where mac_db_id='$ass[id]' and oran_tip='7' and oran_val_id='16' ORDER BY id ASC");

$mbs = mbsverb($ass['id'],$ass['mbs'],$ass['kupa_id']);

$encoded = "$ass[id]|$ass[ev_takim]|$ass[konuk_takim]|$ass[mac_kodu]|$mbs|$ass[mac_time]|basketbol";
?>
<div class="<? if ($i %2 != 0){ ?>even<? }else{ ?><? } ?>" >
<? if($i==2){?>
<div class="e_active" id="comp-UPCOMING_HEADER_<?=$row['kupa_id'];?>">
<div class="t_subhead cf">
<div class="grey_999 right cf" style="margin-right: 55px">
<div class="w_39 left" style="min-height: 1px;">H1</div>
<div class="w_39 left" style="min-height: 1px;">1</div>
<div class="w_39 left" style="min-height: 1px;">2</div>
<div class="w_39 left" style="min-height: 1px;">H2</div>
</div>
<div class="red pad_l_9" onmouseover="tip(jQuery(this).html(), 55, true)" onmouseout="untip()">
<span><?=$row['kupa_ulke'];?></span>
</div>
<div class="close_groups" onclick="toggleAndUpdate(event, '1301','GROUP')"></div>
</div>
</div>
<? } ?>
<div class="e_active t_row jq-event-row-cont" >
<div class="info">
<div class="w_30 align_c left over" style="" onmouseover="tip(this.firstChild.data, 6)" >
<? echo $GLOBALS["gunler"][date("N",$ass['mac_time'])];?>
</div>

<div class="w_35 align_center left over ng-binding" title="<?=date("Y-m-d H:i",$ass['mac_time']); ?>">&nbsp;<?=date("d.m",$ass['mac_time']); ?>&nbsp;/&nbsp;</div>

<div class="w_35 bl align_center left timecell"><div class="timeText2 ng-binding" style="font-weight: bold;"><?=date("H:i",$ass['mac_time']); ?></div></div>

<div class="t_cell w_113 left" style="width: 119px;margin-left:5px;cursor:pointer;"><span class="teamname"><?=$ass["ev_takim"];?></span></div>

<div class="teamHelpWrap" style="width: 119px;"><div class="t_cell w_113 left" style="cursor:pointer;"><span class="teamname"><?=$ass["konuk_takim"];?></span></div></div>

<div style="border: 1px solid #f74835;background-color: #ffc3bc;color: #000000;margin-top:3px;" class="mbs<?=$mbs;?>"><a href="javascript:;" class="ng-binding"><?=$mbs;?></a></div>

<div class="bl pad_2 left" style="width: 160px;padding-left: 10px;">
<div style="position: relative;float: left;width: 37px;height: 20px;color: #000;font-size: 11px;line-height: 24px;text-align: center;" <? if($handikap1_ver['oran_val_b']>0){?>title="Evsahibi takıma <?=$handikap1_ver['oran_val_b'];?> sayı averaj verilmiştir."<? } ?>><? if($handikap1_ver['oran_val_b']>0){?><span style="color:#f00;font-weight: bold;"><?=$handikap1_ver['oran_val_b'];?></span><? } else { ?>---<? } ?></div>
<div data-qa="oddsButton" class="qbut qbut-<?=md5("Handikap|1|".$handikap1_ver["oran_val_b"]."|".$ass["id"]);?>" class="bet" onClick="kupon('<?=codekupon("$encoded|$h1_kazanc_id|$h1_kazanc"); ?>');"><?=$h1_kazanc;?></div>
<div data-qa="oddsButton" class="qbut qbut-<?=md5("Handikap|2|".$handikap2_ver["oran_val_b"]."|".$ass["id"]);?>" class="bet" onClick="kupon('<?=codekupon("$encoded|$h2_kazanc_id|$h2_kazanc"); ?>');"><?=$h2_kazanc;?></div>
<div style="position: relative;float: left;width: 37px;height: 20px;color: #000;font-size: 11px;line-height: 24px;text-align: center;" <? if($handikap2_ver['oran_val_b']>0){?>title="Deplasman takıma <?=$handikap2_ver['oran_val_b'];?> sayı averaj verilmiştir."<? } ?>><? if($handikap2_ver['oran_val_b']>0){?><span style="color:#f00;font-weight: bold;"><?=$handikap2_ver['oran_val_b'];?></span><? } else { ?>---<? } ?></div>
</div>

<div class="bl pad_r_3 left">

<? if($ass["istatistik"]!=0){ ?>
<div class="ibut " id="statistics-<?=$ass["id"];?>-lastminute">
<a href="javascript:popup('https://s5.sir.sportradar.com/totobo/tr/2/match/<?=$ass["istatistik"];?>','stats',1078,768);" class="stat" onmouseover="loadEventStatistics2(this, <?=$row["id"];?>, 'soccer', 'lastminute')" onmouseout="untooltipDelayed(this)"></a>
</div>
<? } else { ?>
<div class="ibut off" id="statistics-<?=$ass["id"];?>-lastminute">
<div class="stat"></div>
</div>
<? } ?>

</div>
</div>
<div class="limits_hover ">

<? 
$gizli_oran_tips = gizli_oran_tips_basketbol($ass['id']);
if($gizli_oran_tips!="") { $gizli_ekle = "and oran_val_id not in ($gizli_oran_tips)"; } else { $gizli_ekle = ""; }
$sayi = sed_sql_numrows(sed_sql_query("select * from oranlar_basketbol where mac_db_id='".$ass["id"]."' $gizli_ekle and durum='1' order by id asc"));
?>

<div data-qa="extraButton" class="t_more bl align_c right" id="detaybasketbolac<? if(isset($ass["id"])) { echo $ass["id"];}?>" style="" onclick="detaybasketbolac(<? if(isset($ass["id"])) { echo $ass["id"];}?>);">
<span>+<?=$sayi;?></span>
</div>
<div data-qa="extraButton" class="t_more bl align_c right" id="detaybasketbolkapat<? if(isset($ass["id"])) { echo $ass["id"];}?>" style="display:none;" onclick="detaybasketbolkapat(<? if(isset($ass["id"])) { echo $ass["id"];}?>);">
<span>-<?=$sayi;?></span>
</div>
<div id="comp-specialBetLayerCategoryPopup-<?=$ass["id"];?>-lastminute" class="e_active jq-special-bet-layer-category-popup e_comp_ref" style="display:none;">
</div>
</div>
<div class="clear">
</div>
<div id="comp-sbLayer-<?=$ass["id"];?>-lastminute" class="e_active jq-special-bet-layer e_comp_ref" style="display:none;">
<div class="t_more_box">
<div class="hr bg_toughgrey" style="margin-right: 30px;">
</div>
<div class="border_ccc" style="margin: 5px; padding: 18px; text-align: center;" id="loading<? if(isset($ass["id"])) { echo $ass["id"];}?>">
<img src="<? echo $theme_dir; ?>assets/loader-5EC8AAA4E74F0E0AD0FC5FF964B6DF96.gif" alt="" width="236" height="31">
</div>
<div id="prematchdetail<? if(isset($ass["id"])) { echo $ass["id"];}?>"  style="display:none">
</div>
</div>
</div>
</div>
</div>
<? } ?>
</div>
<div class="t_foot" style="border-top:none"></div>
<div class="space_15 shadow_bot_564"></div>
</div>
</div>
<? } ?>
<? } ?>
<script>
function detaybasketbolac(matchid) {
jQuery('#comp-sbLayer-'+matchid+'-lastminute').show();
var rand = Math.random();
$.get('ajax.php?a=detailbasketbol&rand='+rand+'&id='+matchid+'',function(data) {
jQuery('#prematchdetail'+matchid).show().html(data);
jQuery('#loading'+matchid).hide().html("");
jQuery('#detaybasketbolkapat'+matchid).show();
jQuery('#detaybasketbolac'+matchid).hide();
});
}

function detaybasketbolkapat(matchid) {
jQuery('#prematchdetail'+matchid).hide().html("");
jQuery('#loading'+matchid).show();
jQuery('#comp-sbLayer-'+matchid+'-lastminute').hide();
jQuery('#detaybasketbolkapat'+matchid).hide();
jQuery('#detaybasketbolac'+matchid).show();
}
</script>


<? }

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

$ulkever = gd("ulke");

$do_cache = 1;
$mikro = microtime();

$tarih = "";

if($tarih=="") {

$tarih_ekle = "";

} else {

$tarih_ekle = "and mac_tarih='$tarih'";	

}



$saat = gd("saat");

if(!empty($saat) and $saat!=0) { $carp = ($saat*60); $eksi = time()+$carp; $saat_ekle = "and mac_time<$eksi"; } elseif($saat==0){$saat_ekle = "";}else { $carp = (180*60); $eksi = time()+$carp; $saat_ekle = "and mac_time<$eksi";} 

$donecek = substr($ulkever,0,-1);

$ulke = $donecek;

if(!empty($ulke)) { $ulke_ekle = "and kupa_id in ($ulke)"; } else { $ulke_ekle = ""; }

$bultentip = gd("bultentip");

$sasi=0;

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
$kayittime_ver = $suan-60;
$songuncellemever = $suan-3600;
$sqladder = "AND (kimkazanir!='0' or setbahisi!='0') and kayittime<$kayittime_ver and bulten='hititbet' $tarih_ekle $saat_ekle $ulke_ekle $gizli_ekle and kupa_isim not like '%Duello%' {$whereyasak} and aktif='1'";
$sor = sed_sql_query("select * from program_tenis where id!='' $sqladder group by kupa_isim  order by mac_time asc ");
if(userayar('sporbulten')==0) { ?>
<div class="bos" style="text-align: center;font-weight: bold;margin: 10px;">Spor (bülten) bahisleri kapalıdır. Yöneticiniz ile görüşünüz.</div>
<? } else {

$say=1;
while($row=sed_sql_fetcharray($sor)) { 
$say++;
?>
<div class="e_active e_noCache jq-compound-event-block"  id="_program_blocks_compoundEventBlock_groupId_1201_type_UPCOMING">
<div class="border_ccc"><div>
<div class="t_head cf">
<div class="fs_16 darkgrey pad_l_9 left">
<div itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
<a href="#" itemprop="url"><span itemprop="title"><?=getTranslation('tenis')?></span></a> - <div itemprop="child" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb" style="display: inline;"><a href="#" itemprop="url"><span itemprop="title"><?=$row['kupa_isim'];?></span></a></div>
</div>
</div>
</div>
</div>
<div class="e_active">
<?

$i = 1;
unset($ss);
unset($ass);
$ss = sed_sql_query("select * from program_tenis where id!='' $sqladder and kupa_isim='$row[kupa_isim]' order by mac_time asc ");
while($ass=sed_sql_fetcharray($ss)){
	$i++;
$ev_kazanc = oranbulxxx_tenis($ass['id'],1);

$konuk_kazanc = oranbulxxx_tenis($ass['id'],2);	

$mbs = mbsvert($ass['id'],$ass['mbs'],$ass['kupa_id']);

$encoded = "$ass[id]|$ass[ev_takim]|$ass[konuk_takim]|$ass[mac_kodu]|$mbs|$ass[mac_time]|tenis";
?>
<div class="<? if ($i %2 != 0){ ?>even<? }else{ ?><? } ?>" >
<? if($i==2){?>
<div class="e_active" id="comp-UPCOMING_HEADER_<?=$row['kupa_id'];?>">
<div class="t_subhead cf">
<div class="grey_999 right cf" style="margin-right: 88px">
<div class="w_39 left" style="min-height: 1px;">1</div>
<div class="w_39 left" style="min-height: 1px;">2</div>
</div>
<div class="red pad_l_9" onmouseover="tip(jQuery(this).html(), 55, true)" onmouseout="untip()">
<span><?=$row['kupa_ulke'];?></span>
</div>
<div class="close_groups" onclick="toggleAndUpdate(event, '1301','GROUP')"></div>
</div>
</div>
<? } ?>
<div class="e_active t_row jq-event-row-cont" >
<div class="info">
<div class="w_30 align_c left over" style="" onmouseover="tip(this.firstChild.data, 6)" >
<? echo $GLOBALS["gunler"][date("N",$ass['mac_time'])];?>
</div>

<div class="w_35 align_center left over ng-binding" title="<?=date("Y-m-d H:i",$ass['mac_time']); ?>">&nbsp;<?=date("d.m",$ass['mac_time']); ?>&nbsp;/&nbsp;</div>

<div class="w_35 bl align_center left timecell"><div class="timeText2 ng-binding" style="font-weight: bold;"><?=date("H:i",$ass['mac_time']); ?></div></div>

<div class="t_cell w_113 left" style="margin-left:5px;width: 130px;cursor:pointer;"><span class="teamname"><?=$ass["ev_takim"];?></span></div>

<div class="teamHelpWrap" style="width: 155px;"><div class="t_cell w_113 left" style="cursor:pointer;"><span class="teamname"><?=$ass["konuk_takim"];?></span></div></div>

<div style="border: 1px solid #f74835;background-color: #ffc3bc;color: #000000;margin-top:3px;" class="mbs<?=$mbs;?>"><a href="javascript:;" class="ng-binding"><?=$mbs;?></a></div>

<div class="bl pad_2 left ">
<div data-qa="oddsButton" class="qbut qbut-<?=md5("Kim Kazanır|1|".$ass["id"]);?>" class="bet" onClick="kupon('<?=codekupon("$encoded|1|$ev_kazanc"); ?>');"><?=$ev_kazanc;?></div>
<div data-qa="oddsButton" class="qbut qbut-<?=md5("Kim Kazanır|2|".$ass["id"]);?>" class="bet" onClick="kupon('<?=codekupon("$encoded|2|$konuk_kazanc"); ?>');"><?=$konuk_kazanc;?></div>
</div>

<div class="bl pad_r_3 left">
<div class="ibut">
<div class="user">
<div id="ratioHolder<?=$ass["id"];?>" style="display: none;">
</div>
</div>
</div>
<? if($ass["istatistik"]!=0){ ?>
<div class="ibut " id="statistics-<?=$ass["id"];?>-lastminute">
<a href="javascript:popup('https://s5.sir.sportradar.com/totobo/tr/2/match/<?=$ass["istatistik"];?>','stats',1078,768);" class="stat" onmouseover="loadEventStatistics2(this, <?=$row["id"];?>, 'soccer', 'lastminute')" onmouseout="untooltipDelayed(this)"></a>
</div>
<? } else { ?>
<div class="ibut off" id="statistics-<?=$ass["id"];?>-lastminute">
<div class="stat"></div>
</div>
<? } ?>
<div id="comp-eventTvButton-<?=$ass["id"];?>-lastminute" class="e_active ibut off" e:url="@@eventTvButton-<?=$ass["id"];?>-lastminute/program/eventTVButton2?eventId=<?=$ass["id"];?>" e:hash="13sjxvy" e:interval="-1" e:next="-1">
<div class="tv">&nbsp;</div>
</div>
</div>
</div>
<div class="limits_hover ">

<? 
$gizli_oran_tips = gizli_oran_tips_tenis($ass['id']);
if($gizli_oran_tips!="") { $gizli_ekle = "and oran_val_id not in ($gizli_oran_tips)"; } else { $gizli_ekle = ""; }
$sayi = sed_sql_numrows(sed_sql_query("select * from oranlar_tenis where mac_db_id='".$ass["id"]."' $gizli_ekle and durum='1' order by id asc"));
?>

<div data-qa="extraButton" class="t_more bl align_c right" id="detaytenisac<? if(isset($ass["id"])) { echo $ass["id"];}?>" style="" onclick="detaytenisac(<? if(isset($ass["id"])) { echo $ass["id"];}?>);">
<span>+<?=$sayi;?></span>
</div>
<div data-qa="extraButton" class="t_more bl align_c right" id="detayteniskapat<? if(isset($ass["id"])) { echo $ass["id"];}?>" style="display:none;" onclick="detayteniskapat(<? if(isset($ass["id"])) { echo $ass["id"];}?>);">
<span>-<?=$sayi;?></span>
</div>
<div id="comp-specialBetLayerCategoryPopup-<?=$ass["id"];?>-lastminute" class="e_active jq-special-bet-layer-category-popup e_comp_ref" style="display:none;">
</div>
</div>
<div class="clear">
</div>
<div id="comp-sbLayer-<?=$ass["id"];?>-lastminute" class="e_active jq-special-bet-layer e_comp_ref" style="display:none;">
<div class="t_more_box">
<div class="hr bg_toughgrey" style="margin-right: 30px;">
</div>
<div class="border_ccc" style="margin: 5px; padding: 18px; text-align: center;" id="loading<? if(isset($ass["id"])) { echo $ass["id"];}?>">
<img src="<? echo $theme_dir; ?>assets/loader-5EC8AAA4E74F0E0AD0FC5FF964B6DF96.gif" alt="" width="236" height="31">
</div>
<div id="prematchdetail<? if(isset($ass["id"])) { echo $ass["id"];}?>"  style="display:none">
</div>
</div>
</div>
</div>
</div>
<? } ?>
</div>
<div class="t_foot" style="border-top:none"></div>
<div class="space_15 shadow_bot_564"></div>
</div>
</div>
<? } ?>
<? } ?>
<script>
function detaytenisac(matchid) {
jQuery('#comp-sbLayer-'+matchid+'-lastminute').show();
var rand = Math.random();
$.get('ajax.php?a=detailtenis&rand='+rand+'&id='+matchid+'',function(data) {
jQuery('#prematchdetail'+matchid).show().html(data);
jQuery('#loading'+matchid).hide().html("");
jQuery('#detayteniskapat'+matchid).show();
jQuery('#detaytenisac'+matchid).hide();
});
}

function detayteniskapat(matchid) {
jQuery('#prematchdetail'+matchid).hide().html("");
jQuery('#loading'+matchid).show();
jQuery('#comp-sbLayer-'+matchid+'-lastminute').hide();
jQuery('#detayteniskapat'+matchid).hide();
jQuery('#detaytenisac'+matchid).show();
}
</script>
<? }

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

$ulkever = gd("ulke");

$do_cache = 1;
$mikro = microtime();

$tarih = "";

if($tarih=="") {

$tarih_ekle = "";

} else {

$tarih_ekle = "and mac_tarih='$tarih'";	

}



$saat = gd("saat");

if(!empty($saat) and $saat!=0) { $carp = ($saat*60); $eksi = time()+$carp; $saat_ekle = "and mac_time<$eksi"; } elseif($saat==0){$saat_ekle = "";}else { $carp = (180*60); $eksi = time()+$carp; $saat_ekle = "and mac_time<$eksi";} 

$donecek = substr($ulkever,0,-1);

$ulke = $donecek;

if(!empty($ulke)) { $ulke_ekle = "and kupa_id in ($ulke)"; } else { $ulke_ekle = ""; }

$bultentip = gd("bultentip");

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
$kayittime_ver = $suan-60;
$sqladder = "and kayittime<$kayittime_ver and bulten='hititbet' $tarih_ekle $saat_ekle $ulke_ekle $gizli_ekle and kupa_isim not like '%Duello%' {$whereyasak} and aktif='1'";
$sor = sed_sql_query("select * from program_voleybol where id!='' $sqladder group by kupa_isim  order by mac_time asc ");
if(userayar('sporbulten')==0) { ?>
<div class="bos" style="text-align: center;font-weight: bold;margin: 10px;">Spor (bülten) bahisleri kapalıdır. Yöneticiniz ile görüşünüz.</div>
<? } else {

$say=1;
while($row=sed_sql_fetcharray($sor)) { 
$say++;
?>
<div class="e_active e_noCache jq-compound-event-block"  id="_program_blocks_compoundEventBlock_groupId_1201_type_UPCOMING">
<div class="border_ccc"><div>
<div class="t_head cf">
<div class="fs_16 darkgrey pad_l_9 left">
<div itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
<a href="#" itemprop="url"><span itemprop="title"><?=getTranslation('voleybol')?></span></a> - <div itemprop="child" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb" style="display: inline;"><a href="#" itemprop="url"><span itemprop="title"><?=$row['kupa_isim'];?></span></a></div>
</div>
</div>
</div>
</div>
<div class="e_active">
<?

$i = 1;
unset($ss);
unset($ass);
$ss = sed_sql_query("select * from program_voleybol where id!='' $sqladder and kupa_isim='$row[kupa_isim]' order by mac_time asc ");
while($ass=sed_sql_fetcharray($ss)){
	$i++;
$ev_kazanc = oranbulxxx_voleybol($ass['id'],1);

$konuk_kazanc = oranbulxxx_voleybol($ass['id'],2);	

$mbs = mbsverv($ass['id'],$ass['mbs'],$ass['kupa_id']);

$encoded = "$ass[id]|$ass[ev_takim]|$ass[konuk_takim]|$ass[mac_kodu]|$mbs|$ass[mac_time]|voleybol";
?>
<div class="<? if ($i %2 != 0){ ?>even<? }else{ ?><? } ?>" >
<? if($i==2){?>
<div class="e_active" id="comp-UPCOMING_HEADER_<?=$row['kupa_id'];?>">
<div class="t_subhead cf">
<div class="grey_999 right cf" style="margin-right: 88px">
<div class="w_39 left" style="min-height: 1px;">1</div>
<div class="w_39 left" style="min-height: 1px;">2</div>
</div>
<div class="red pad_l_9" onmouseover="tip(jQuery(this).html(), 55, true)" onmouseout="untip()">
<span><?=$row['kupa_ulke'];?></span>
</div>
<div class="close_groups" onclick="toggleAndUpdate(event, '1301','GROUP')"></div>
</div>
</div>
<? } ?>
<div class="e_active t_row jq-event-row-cont" >
<div class="info">
<div class="w_30 align_c left over" style="" onmouseover="tip(this.firstChild.data, 6)" >
<? echo $GLOBALS["gunler"][date("N",$ass['mac_time'])];?>
</div>

<div class="w_35 align_center left over ng-binding" title="<?=date("Y-m-d H:i",$ass['mac_time']); ?>">&nbsp;<?=date("d.m",$ass['mac_time']); ?>&nbsp;/&nbsp;</div>

<div class="w_35 bl align_center left timecell"><div class="timeText2 ng-binding" style="font-weight: bold;"><?=date("H:i",$ass['mac_time']); ?></div></div>

<div class="t_cell w_113 left" style="margin-left:5px;width: 130px;cursor:pointer;"><span class="teamname"><?=$ass["ev_takim"];?></span></div>

<div class="teamHelpWrap" style="width: 155px;"><div class="t_cell w_113 left" style="cursor:pointer;"><span class="teamname"><?=$ass["konuk_takim"];?></span></div></div>

<div style="border: 1px solid #f74835;background-color: #ffc3bc;color: #000000;margin-top:3px;" class="mbs<?=$mbs;?>"><a href="javascript:;" class="ng-binding"><?=$mbs;?></a></div>

<div class="bl pad_2 left ">
<div data-qa="oddsButton" class="qbut qbut-<?=md5("Kim Kazanır|1|".$ass["id"]);?>" onClick="kupon('<?=codekupon("$encoded|1|$ev_kazanc"); ?>');"><?=$ev_kazanc;?></div>
<div data-qa="oddsButton" class="qbut qbut-<?=md5("Kim Kazanır|2|".$ass["id"]);?>" onClick="kupon('<?=codekupon("$encoded|2|$konuk_kazanc"); ?>');"><?=$konuk_kazanc;?></div>
</div>

<div class="bl pad_r_3 left">
<div class="ibut">
<div class="user">
<div id="ratioHolder<?=$ass["id"];?>" style="display: none;">
</div>
</div>
</div>
<? if($ass["istatistik"]!=0){ ?>
<div class="ibut " id="statistics-<?=$ass["id"];?>-lastminute">
<a href="javascript:popup('https://s5.sir.sportradar.com/totobo/tr/2/match/<?=$ass["istatistik"];?>','stats',1078,768);" class="stat" onmouseover="loadEventStatistics2(this, <?=$row["id"];?>, 'soccer', 'lastminute')" onmouseout="untooltipDelayed(this)"></a>
</div>
<? } else { ?>
<div class="ibut off" id="statistics-<?=$ass["id"];?>-lastminute">
<div class="stat"></div>
</div>
<? } ?>
<div id="comp-eventTvButton-<?=$ass["id"];?>-lastminute" class="e_active ibut off" e:url="@@eventTvButton-<?=$ass["id"];?>-lastminute/program/eventTVButton2?eventId=<?=$ass["id"];?>" e:hash="13sjxvy" e:interval="-1" e:next="-1">
<div class="tv">&nbsp;</div>
</div>
</div>
</div>
<div class="limits_hover ">

<? 
$gizli_oran_tips = gizli_oran_tips_voleybol($ass['id']);
if($gizli_oran_tips!="") { $gizli_ekle = "and oran_val_id not in ($gizli_oran_tips)"; } else { $gizli_ekle = ""; }
$sayi = sed_sql_numrows(sed_sql_query("select * from oranlar_voleybol where mac_db_id='".$ass["id"]."' $gizli_ekle and durum='1' order by id asc"));
?>

<div data-qa="extraButton" class="t_more bl align_c right" id="detayvoleybolac<? if(isset($ass["id"])) { echo $ass["id"];}?>" style="" onclick="detayvoleybolac(<? if(isset($ass["id"])) { echo $ass["id"];}?>);">
<span>+<?=$sayi;?></span>
</div>
<div data-qa="extraButton" class="t_more bl align_c right" id="detayvoleybolkapat<? if(isset($ass["id"])) { echo $ass["id"];}?>" style="display:none;" onclick="detayvoleybolkapat(<? if(isset($ass["id"])) { echo $ass["id"];}?>);">
<span>-<?=$sayi;?></span>
</div>
<div id="comp-specialBetLayerCategoryPopup-<?=$ass["id"];?>-lastminute" class="e_active jq-special-bet-layer-category-popup e_comp_ref" style="display:none;">
</div>
</div>
<div class="clear">
</div>
<div id="comp-sbLayer-<?=$ass["id"];?>-lastminute" class="e_active jq-special-bet-layer e_comp_ref" style="display:none;">
<div class="t_more_box">
<div class="hr bg_toughgrey" style="margin-right: 30px;">
</div>
<div class="border_ccc" style="margin: 5px; padding: 18px; text-align: center;" id="loading<? if(isset($ass["id"])) { echo $ass["id"];}?>">
<img src="<? echo $theme_dir; ?>assets/loader-5EC8AAA4E74F0E0AD0FC5FF964B6DF96.gif" alt="" width="236" height="31">
</div>
<div id="prematchdetail<? if(isset($ass["id"])) { echo $ass["id"];}?>"  style="display:none">
</div>
</div>
</div>
</div>
</div>
<? } ?>
</div>
<div class="t_foot" style="border-top:none"></div>
<div class="space_15 shadow_bot_564"></div>
</div>
</div>
<? } ?>
<? } ?>
<script>
function detayvoleybolac(matchid) {
jQuery('#comp-sbLayer-'+matchid+'-lastminute').show();
var rand = Math.random();
$.get('ajax.php?a=detailvoleybol&rand='+rand+'&id='+matchid+'',function(data) {
jQuery('#prematchdetail'+matchid).show().html(data);
jQuery('#loading'+matchid).hide().html("");
jQuery('#detayvoleybolkapat'+matchid).show();
jQuery('#detayvoleybolac'+matchid).hide();
});
}

function detayvoleybolkapat(matchid) {
jQuery('#prematchdetail'+matchid).hide().html("");
jQuery('#loading'+matchid).show();
jQuery('#comp-sbLayer-'+matchid+'-lastminute').hide();
jQuery('#detayvoleybolkapat'+matchid).hide();
jQuery('#detayvoleybolac'+matchid).show();
}
</script>
<? }

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

$ulkever = gd("ulke");

$do_cache = 1;
$mikro = microtime();

$tarih = "";

if($tarih=="") {

$tarih_ekle = "";

} else {

$tarih_ekle = "and mac_tarih='$tarih'";	

}



$saat = gd("saat");

if(!empty($saat) and $saat!=0) { $carp = ($saat*60); $eksi = time()+$carp; $saat_ekle = "and mac_time<$eksi"; } elseif($saat==0){$saat_ekle = "";}else { $carp = (180*60); $eksi = time()+$carp; $saat_ekle = "and mac_time<$eksi";} 

$donecek = substr($ulkever,0,-1);

$ulke = $donecek;

if(!empty($ulke)) { $ulke_ekle = "and kupa_id in ($ulke)"; } else { $ulke_ekle = ""; }

$bultentip = gd("bultentip");

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
$kayittime_ver = $suan-60;
$sqladder = "and kayittime<$kayittime_ver and bulten='hititbet' $tarih_ekle $saat_ekle $ulke_ekle $gizli_ekle and kupa_isim not like '%Duello%' {$whereyasak} and aktif='1'";
$sor = sed_sql_query("select * from program_buzhokeyi where id!='' $sqladder group by kupa_isim  order by mac_time asc ");
if(userayar('sporbulten')==0) { ?>
<div class="bos" style="text-align: center;font-weight: bold;margin: 10px;">Spor (bülten) bahisleri kapalıdır. Yöneticiniz ile görüşünüz.</div>
<? } else {

$say=1;
while($row=sed_sql_fetcharray($sor)) { 
$say++;
?>
<div class="e_active e_noCache jq-compound-event-block"  id="_program_blocks_compoundEventBlock_groupId_1201_type_UPCOMING">
<div class="border_ccc"><div>
<div class="t_head cf">
<div class="fs_16 darkgrey pad_l_9 left">
<div itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
<a href="#" itemprop="url"><span itemprop="title"><?=getTranslation('buzhokeyi')?></span></a> - <div itemprop="child" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb" style="display: inline;"><a href="#" itemprop="url"><span itemprop="title"><?=$row['kupa_isim'];?></span></a></div>
</div>
</div>
</div>
</div>
<div class="e_active">
<?

$i = 1;
unset($ss);
unset($ass);
$ss = sed_sql_query("select * from program_buzhokeyi where id!='' $sqladder and kupa_isim='$row[kupa_isim]' order by mac_time asc ");
while($ass=sed_sql_fetcharray($ss)){
	$i++;
$ev_kazanc = oranbulxxx_buz($ass['id'],17);

$beraberlik = oranbulxxx_buz($ass['id'],18);

$konuk_kazanc = oranbulxxx_buz($ass['id'],19);	

$mbs = mbsverbuz($ass['id'],$ass['mbs'],$ass['kupa_id']);

$encoded = "$ass[id]|$ass[ev_takim]|$ass[konuk_takim]|$ass[mac_kodu]|$mbs|$ass[mac_time]|buzhokeyi";
?>
<div class="<? if ($i %2 != 0){ ?>even<? }else{ ?><? } ?>" >
<? if($i==2){?>
<div class="e_active" id="comp-UPCOMING_HEADER_<?=$row['kupa_id'];?>">
<div class="t_subhead cf">
<div class="grey_999 right cf" style="margin-right: 85px">
<div class="w_39 left" style="min-height: 1px;">1</div>
<div class="w_39 left" style="min-height: 1px;">X</div>
<div class="w_39 left" style="min-height: 1px;">2</div>
</div>
<div class="red pad_l_9" onmouseover="tip(jQuery(this).html(), 55, true)" onmouseout="untip()">
<span><?=$row['kupa_ulke'];?></span>
</div>
<div class="close_groups" onclick="toggleAndUpdate(event, '1301','GROUP')"></div>
</div>
</div>
<? } ?>
<div class="e_active t_row jq-event-row-cont" >
<div class="info">
<div class="w_30 align_c left over" style="" onmouseover="tip(this.firstChild.data, 6)" >
<? echo $GLOBALS["gunler"][date("N",$ass['mac_time'])];?>
</div>

<div class="w_35 align_center left over ng-binding" title="<?=date("Y-m-d H:i",$ass['mac_time']); ?>">&nbsp;<?=date("d.m",$ass['mac_time']); ?>&nbsp;/&nbsp;</div>

<div class="w_35 bl align_center left timecell"><div class="timeText2 ng-binding" style="font-weight: bold;"><?=date("H:i",$ass['mac_time']); ?></div></div>

<div class="t_cell w_113 left" style="width: 119px;margin-left:5px;cursor:pointer;"><span class="teamname"><?=$ass["ev_takim"];?></span></div>

<div class="teamHelpWrap" style="width: 119px;"><div class="t_cell w_113 left" style="cursor:pointer;"><span class="teamname"><?=$ass["konuk_takim"];?></span></div></div>

<div style="border: 1px solid #f74835;background-color: #ffc3bc;color: #000000;margin-top:3px;" class="mbs<?=$mbs;?>"><a href="javascript:;" class="ng-binding"><?=$mbs;?></a></div>

<div class="bl pad_2 left ">
<div data-qa="oddsButton" class="qbut qbut-<?=md5("1X2|1|".$ass["id"]);?>" class="bet" onClick="kupon('<?=codekupon("$encoded|17|$ev_kazanc"); ?>');"><?=$ev_kazanc;?></div>
<div data-qa="oddsButton" class="qbut qbut-<?=md5("1X2|X|".$ass["id"]);?>" class="bet" onClick="kupon('<?=codekupon("$encoded|18|$beraberlik"); ?>');"><?=$beraberlik;?></div>
<div data-qa="oddsButton" class="qbut qbut-<?=md5("1X2|2|".$ass["id"]);?>" class="bet" onClick="kupon('<?=codekupon("$encoded|19|$konuk_kazanc"); ?>');"><?=$konuk_kazanc;?></div>
</div>

<div class="bl pad_r_3 left">
<div class="ibut">
<div class="user">
<div id="ratioHolder<?=$ass["id"];?>" style="display: none;">
</div>
</div>
</div>
<? if($ass["istatistik"]!=0){ ?>
<div class="ibut " id="statistics-<?=$ass["id"];?>-lastminute">
<a href="javascript:popup('https://s5.sir.sportradar.com/totobo/tr/2/match/<?=$ass["istatistik"];?>','stats',1078,768);" class="stat" onmouseover="loadEventStatistics2(this, <?=$row["id"];?>, 'soccer', 'lastminute')" onmouseout="untooltipDelayed(this)"></a>
</div>
<? } else { ?>
<div class="ibut off" id="statistics-<?=$ass["id"];?>-lastminute">
<div class="stat"></div>
</div>
<? } ?>
<div id="comp-eventTvButton-<?=$ass["id"];?>-lastminute" class="e_active ibut off" e:url="@@eventTvButton-<?=$ass["id"];?>-lastminute/program/eventTVButton2?eventId=<?=$ass["id"];?>" e:hash="13sjxvy" e:interval="-1" e:next="-1">
<div class="tv">&nbsp;</div>
</div>
</div>
</div>
<div class="limits_hover ">

<? 
$gizli_oran_tips = gizli_oran_tips_buzhokeyi($ass['id']);
if($gizli_oran_tips!="") { $gizli_ekle = "and oran_val_id not in ($gizli_oran_tips)"; } else { $gizli_ekle = ""; }
$sayi = sed_sql_numrows(sed_sql_query("select * from oranlar_buzhokeyi where mac_db_id='".$ass["id"]."' $gizli_ekle and durum='1' order by id asc"));
?>

<div data-qa="extraButton" class="t_more bl align_c right" id="detaybuzhokeyiac<? if(isset($ass["id"])) { echo $ass["id"];}?>" style="" onclick="detaybuzhokeyiac(<? if(isset($ass["id"])) { echo $ass["id"];}?>);">
<span>+<?=$sayi;?></span>
</div>
<div data-qa="extraButton" class="t_more bl align_c right" id="detaybuzhokeyikapat<? if(isset($ass["id"])) { echo $ass["id"];}?>" style="display:none;" onclick="detaybuzhokeyikapat(<? if(isset($ass["id"])) { echo $ass["id"];}?>);">
<span>-<?=$sayi;?></span>
</div>
<div id="comp-specialBetLayerCategoryPopup-<?=$ass["id"];?>-lastminute" class="e_active jq-special-bet-layer-category-popup e_comp_ref" style="display:none;">
</div>
</div>
<div class="clear">
</div>
<div id="comp-sbLayer-<?=$ass["id"];?>-lastminute" class="e_active jq-special-bet-layer e_comp_ref" style="display:none;">
<div class="t_more_box">
<div class="hr bg_toughgrey" style="margin-right: 30px;">
</div>
<div class="border_ccc" style="margin: 5px; padding: 18px; text-align: center;" id="loading<? if(isset($ass["id"])) { echo $ass["id"];}?>">
<img src="<? echo $theme_dir; ?>assets/loader-5EC8AAA4E74F0E0AD0FC5FF964B6DF96.gif" alt="" width="236" height="31">
</div>
<div id="prematchdetail<? if(isset($ass["id"])) { echo $ass["id"];}?>"  style="display:none">
</div>
</div>
</div>
</div>
</div>
<? } ?>
</div>
<div class="t_foot" style="border-top:none"></div>
<div class="space_15 shadow_bot_564"></div>
</div>
</div>
<? } ?>
<? } ?>
<script>
function detaybuzhokeyiac(matchid) {
jQuery('#comp-sbLayer-'+matchid+'-lastminute').show();
var rand = Math.random();
$.get('ajax.php?a=detailbuzhokeyi&rand='+rand+'&id='+matchid+'',function(data) {
jQuery('#prematchdetail'+matchid).show().html(data);
jQuery('#loading'+matchid).hide().html("");
jQuery('#detaybuzhokeyikapat'+matchid).show();
jQuery('#detaybuzhokeyiac'+matchid).hide();
});
}

function detaybuzhokeyikapat(matchid) {
jQuery('#prematchdetail'+matchid).hide().html("");
jQuery('#loading'+matchid).show();
jQuery('#comp-sbLayer-'+matchid+'-lastminute').hide();
jQuery('#detaybuzhokeyikapat'+matchid).hide();
jQuery('#detaybuzhokeyiac'+matchid).show();
}
</script>
<? }

if($a=="masatenisibulten") {

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

$ulkever = gd("ulke");

$do_cache = 1;
$mikro = microtime();

$tarih = "";

if($tarih=="") {

$tarih_ekle = "";

} else {

$tarih_ekle = "and mac_tarih='$tarih'";	

}



$saat = gd("saat");

if(!empty($saat) and $saat!=0) { $carp = ($saat*60); $eksi = time()+$carp; $saat_ekle = "and mac_time<$eksi"; } elseif($saat==0){$saat_ekle = "";}else { $carp = (180*60); $eksi = time()+$carp; $saat_ekle = "and mac_time<$eksi";} 

$donecek = substr($ulkever,0,-1);

$ulke = $donecek;

if(!empty($ulke)) { $ulke_ekle = "and kupa_id in ($ulke)"; } else { $ulke_ekle = ""; }

$bultentip = gd("bultentip");

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
$sqladder = "and kayittime<$kayittime_ver and bulten='hititbet' $tarih_ekle $saat_ekle $ulke_ekle $gizli_ekle and kupa_isim not like '%Duello%' {$whereyasak} and aktif='1'";
$sor = sed_sql_query("select * from program_masatenisi where id!='' $sqladder group by kupa_isim  order by mac_time asc ");
if(userayar('sporbulten')==0) { ?>
<div class="bos" style="text-align: center;font-weight: bold;margin: 10px;">Spor (bülten) bahisleri kapalıdır. Yöneticiniz ile görüşünüz.</div>
<? } else {

$say=1;
while($row=sed_sql_fetcharray($sor)) { 
$say++;
?>
<div class="e_active e_noCache jq-compound-event-block"  id="_program_blocks_compoundEventBlock_groupId_1201_type_UPCOMING">
<div class="border_ccc"><div>
<div class="t_head cf">
<div class="fs_16 darkgrey pad_l_9 left">
<div itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
<a href="#" itemprop="url"><span itemprop="title">Masa Tenisi</span></a> - <div itemprop="child" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb" style="display: inline;"><a href="#" itemprop="url"><span itemprop="title"><?=$row['kupa_isim'];?></span></a></div>
</div>
</div>
</div>
</div>
<div class="e_active">
<?

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
?>
<div class="<? if ($i %2 != 0){ ?>even<? }else{ ?><? } ?>" >
<? if($i==2){?>
<div class="e_active" id="comp-UPCOMING_HEADER_<?=$row['kupa_id'];?>">
<div class="t_subhead cf">
<div class="grey_999 right cf" style="margin-right: 20px">
<div class="w_39 left" style="min-height: 1px;">1</div>
<div class="w_39 left" style="min-height: 1px;">2</div>
</div>
<div class="red pad_l_9" onmouseover="tip(jQuery(this).html(), 55, true)" onmouseout="untip()">
<span><?=$row['kupa_ulke'];?></span>
</div>
<div class="close_groups" onclick="toggleAndUpdate(event, '1301','GROUP')"></div>
</div>
</div>
<? } ?>
<div class="e_active t_row jq-event-row-cont" >
<div class="info">
<div class="w_30 align_c left over" style="" onmouseover="tip(this.firstChild.data, 6)" >
<? echo $GLOBALS["gunler"][date("N",$ass['mac_time'])];?>
</div>

<div class="w_35 align_center left over ng-binding" title="<?=date("Y-m-d H:i",$ass['mac_time']); ?>">&nbsp;<?=date("d.m",$ass['mac_time']); ?>&nbsp;/&nbsp;</div>

<div class="w_35 bl align_center left timecell"><div class="timeText2 ng-binding" style="font-weight: bold;"><?=date("H:i",$ass['mac_time']); ?></div></div>

<div class="t_cell w_113 left" style="width: 177px;margin-left:5px;cursor:pointer;"><span class="teamname"><?=$ass["ev_takim"];?></span></div>

<div class="teamHelpWrap" style="width: 177px;"><div class="t_cell w_113 left" style="cursor:pointer;"><span class="teamname"><?=$ass["konuk_takim"];?></span></div></div>

<div style="border: 1px solid #f74835;background-color: #ffc3bc;color: #000000;margin-top:3px;" class="mbs<?=$mbs;?>"><a href="javascript:;" class="ng-binding"><?=$mbs;?></a></div>

<div class="bl pad_2 left ">
<div data-qa="oddsButton" class="qbut qbut-<?=md5("Kim Kazanır|1|".$ass["id"]);?>" class="bet" onClick="kupon('<?=codekupon("$encoded|1|$ev_kazanc"); ?>');"><?=$ev_kazanc;?></div>
<div data-qa="oddsButton" class="qbut qbut-<?=md5("Kim Kazanır|2|".$ass["id"]);?>" class="bet" onClick="kupon('<?=codekupon("$encoded|2|$konuk_kazanc"); ?>');"><?=$konuk_kazanc;?></div>
</div>

<div class="bl pad_r_3 left">
<? if($ass["istatistik"]!=0){ ?>
<div class="ibut " id="statistics-<?=$ass["id"];?>-lastminute">
<a href="javascript:popup('https://s5.sir.sportradar.com/totobo/tr/2/match/<?=$ass["istatistik"];?>','stats',1078,768);" class="stat" onmouseover="loadEventStatistics2(this, <?=$row["id"];?>, 'soccer', 'lastminute')" onmouseout="untooltipDelayed(this)"></a>
</div>
<? } else { ?>
<div class="ibut off" id="statistics-<?=$ass["id"];?>-lastminute"><div class="stat"></div></div>
<? } ?>
</div>
</div>
<div class="clear"></div>
</div>
</div>
<? } ?>
</div>
<div class="t_foot" style="border-top:none"></div>
<div class="space_15 shadow_bot_564"></div>
</div>
</div>
<? } ?>
<? } ?>

<? }

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

$ulkever = gd("ulke");

$do_cache = 1;
$mikro = microtime();

$tarih = "";

if($tarih=="") {

$tarih_ekle = "";

} else {

$tarih_ekle = "and mac_tarih='$tarih'";	

}



$saat = gd("saat");

if(!empty($saat) and $saat!=0) { $carp = ($saat*60); $eksi = time()+$carp; $saat_ekle = "and mac_time<$eksi"; } elseif($saat==0){$saat_ekle = "";}else { $carp = (180*60); $eksi = time()+$carp; $saat_ekle = "and mac_time<$eksi";} 

$donecek = substr($ulkever,0,-1);

$ulke = $donecek;

if(!empty($ulke)) { $ulke_ekle = "and kupa_id in ($ulke)"; } else { $ulke_ekle = ""; }

$bultentip = gd("bultentip");

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
$sqladder = "and kayittime<$kayittime_ver and bulten='hititbet' $tarih_ekle $saat_ekle $ulke_ekle $gizli_ekle and kupa_isim not like '%Duello%' {$whereyasak} and aktif='1'";
$sor = sed_sql_query("select * from program_beyzbol where id!='' $sqladder group by kupa_isim  order by mac_time asc ");
if(userayar('sporbulten')==0) { ?>
<div class="bos" style="text-align: center;font-weight: bold;margin: 10px;">Spor (bülten) bahisleri kapalıdır. Yöneticiniz ile görüşünüz.</div>
<? } else {

$say=1;
while($row=sed_sql_fetcharray($sor)) { 
$say++;
?>
<div class="e_active e_noCache jq-compound-event-block"  id="_program_blocks_compoundEventBlock_groupId_1201_type_UPCOMING">
<div class="border_ccc"><div>
<div class="t_head cf">
<div class="fs_16 darkgrey pad_l_9 left">
<div itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
<a href="#" itemprop="url"><span itemprop="title">Beyzbol</span></a> - <div itemprop="child" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb" style="display: inline;"><a href="#" itemprop="url"><span itemprop="title"><?=$row['kupa_isim'];?></span></a></div>
</div>
</div>
</div>
</div>
<div class="e_active">
<?

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
?>
<div class="<? if ($i %2 != 0){ ?>even<? }else{ ?><? } ?>" >
<? if($i==2){?>
<div class="e_active" id="comp-UPCOMING_HEADER_<?=$row['kupa_id'];?>">
<div class="t_subhead cf">
<div class="grey_999 right cf" style="margin-right: 20px">
<div class="w_39 left" style="min-height: 1px;">1</div>
<div class="w_39 left" style="min-height: 1px;">2</div>
</div>
<div class="red pad_l_9" onmouseover="tip(jQuery(this).html(), 55, true)" onmouseout="untip()">
<span><?=$row['kupa_ulke'];?></span>
</div>
<div class="close_groups" onclick="toggleAndUpdate(event, '1301','GROUP')"></div>
</div>
</div>
<? } ?>
<div class="e_active t_row jq-event-row-cont" >
<div class="info">
<div class="w_30 align_c left over" style="" onmouseover="tip(this.firstChild.data, 6)" >
<? echo $GLOBALS["gunler"][date("N",$ass['mac_time'])];?>
</div>

<div class="w_35 align_center left over ng-binding" title="<?=date("Y-m-d H:i",$ass['mac_time']); ?>">&nbsp;<?=date("d.m",$ass['mac_time']); ?>&nbsp;/&nbsp;</div>

<div class="w_35 bl align_center left timecell"><div class="timeText2 ng-binding" style="font-weight: bold;"><?=date("H:i",$ass['mac_time']); ?></div></div>

<div class="t_cell w_113 left" style="width: 177px;margin-left:5px;cursor:pointer;"><span class="teamname"><?=$ass["ev_takim"];?></span></div>

<div class="teamHelpWrap" style="width: 177px;"><div class="t_cell w_113 left" style="cursor:pointer;"><span class="teamname"><?=$ass["konuk_takim"];?></span></div></div>

<div style="border: 1px solid #f74835;background-color: #ffc3bc;color: #000000;margin-top:3px;" class="mbs<?=$mbs;?>"><a href="javascript:;" class="ng-binding"><?=$mbs;?></a></div>

<div class="bl pad_2 left ">
<div data-qa="oddsButton" class="qbut qbut-<?=md5("Kim Kazanır|1|".$ass["id"]);?>" class="bet" onClick="kupon('<?=codekupon("$encoded|1|$ev_kazanc"); ?>');"><?=$ev_kazanc;?></div>
<div data-qa="oddsButton" class="qbut qbut-<?=md5("Kim Kazanır|2|".$ass["id"]);?>" class="bet" onClick="kupon('<?=codekupon("$encoded|2|$konuk_kazanc"); ?>');"><?=$konuk_kazanc;?></div>
</div>

<div class="bl pad_r_3 left">
<? if($ass["istatistik"]!=0){ ?>
<div class="ibut " id="statistics-<?=$ass["id"];?>-lastminute">
<a href="javascript:popup('https://s5.sir.sportradar.com/totobo/tr/2/match/<?=$ass["istatistik"];?>','stats',1078,768);" class="stat" onmouseover="loadEventStatistics2(this, <?=$row["id"];?>, 'soccer', 'lastminute')" onmouseout="untooltipDelayed(this)"></a>
</div>
<? } else { ?>
<div class="ibut off" id="statistics-<?=$ass["id"];?>-lastminute"><div class="stat"></div></div>
<? } ?>
</div>
</div>
<div class="clear"></div>
</div>
</div>
<? } ?>
</div>
<div class="t_foot" style="border-top:none"></div>
<div class="space_15 shadow_bot_564"></div>
</div>
</div>
<? } ?>
<? } ?>

<? }

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

$ulkever = gd("ulke");

$do_cache = 1;
$mikro = microtime();

$tarih = "";

if($tarih=="") {

$tarih_ekle = "";

} else {

$tarih_ekle = "and mac_tarih='$tarih'";	

}



$saat = gd("saat");

if(!empty($saat) and $saat!=0) { $carp = ($saat*60); $eksi = time()+$carp; $saat_ekle = "and mac_time<$eksi"; } elseif($saat==0){$saat_ekle = "";}else { $carp = (180*60); $eksi = time()+$carp; $saat_ekle = "and mac_time<$eksi";} 

$donecek = substr($ulkever,0,-1);

$ulke = $donecek;

if(!empty($ulke)) { $ulke_ekle = "and kupa_id in ($ulke)"; } else { $ulke_ekle = ""; }

$bultentip = gd("bultentip");

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
$kayittime_ver = $suan-60;
$sqladder = "and kayittime<$kayittime_ver and bulten='hititbet' $tarih_ekle $saat_ekle $ulke_ekle $gizli_ekle and kupa_isim not like '%Duello%' {$whereyasak} and aktif='1'";
$sor = sed_sql_query("select * from program_rugby where id!='' $sqladder group by kupa_isim  order by mac_time asc ");
if(userayar('sporbulten')==0) { ?>
<div class="bos" style="text-align: center;font-weight: bold;margin: 10px;">Spor (bülten) bahisleri kapalıdır. Yöneticiniz ile görüşünüz.</div>
<? } else {

$say=1;
while($row=sed_sql_fetcharray($sor)) { 
$say++;
?>
<div class="e_active e_noCache jq-compound-event-block"  id="_program_blocks_compoundEventBlock_groupId_1201_type_UPCOMING">
<div class="border_ccc"><div>
<div class="t_head cf">
<div class="fs_16 darkgrey pad_l_9 left">
<div itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
<a href="#" itemprop="url"><span itemprop="title">Rugby</span></a> - <div itemprop="child" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb" style="display: inline;"><a href="#" itemprop="url"><span itemprop="title"><?=$row['kupa_isim'];?></span></a></div>
</div>
</div>
</div>
</div>
<div class="e_active">
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
<div class="<? if ($i %2 != 0){ ?>even<? }else{ ?><? } ?>" >
<? if($i==2){?>
<div class="e_active" id="comp-UPCOMING_HEADER_<?=$row['kupa_id'];?>">
<div class="t_subhead cf">
<div class="grey_999 right cf" style="margin-right: 20px">
<div class="w_39 left" style="min-height: 1px;">1</div>
<div class="w_39 left" style="min-height: 1px;">X</div>
<div class="w_39 left" style="min-height: 1px;">2</div>
</div>
<div class="red pad_l_9" onmouseover="tip(jQuery(this).html(), 55, true)" onmouseout="untip()">
<span><?=$row['kupa_ulke'];?></span>
</div>
<div class="close_groups" onclick="toggleAndUpdate(event, '1301','GROUP')"></div>
</div>
</div>
<? } ?>
<div class="e_active t_row jq-event-row-cont" >
<div class="info">
<div class="w_30 align_c left over" style="" onmouseover="tip(this.firstChild.data, 6)" >
<? echo $GLOBALS["gunler"][date("N",$ass['mac_time'])];?>
</div>

<div class="w_35 align_center left over ng-binding" title="<?=date("Y-m-d H:i",$ass['mac_time']); ?>">&nbsp;<?=date("d.m",$ass['mac_time']); ?>&nbsp;/&nbsp;</div>

<div class="w_35 bl align_center left timecell"><div class="timeText2 ng-binding" style="font-weight: bold;"><?=date("H:i",$ass['mac_time']); ?></div></div>

<div class="t_cell w_113 left" style="width: 158px;margin-left:5px;cursor:pointer;"><span class="teamname"><?=$ass["ev_takim"];?></span></div>

<div class="teamHelpWrap" style="width: 158px;"><div class="t_cell w_113 left" style="cursor:pointer;"><span class="teamname"><?=$ass["konuk_takim"];?></span></div></div>

<div style="border: 1px solid #f74835;background-color: #ffc3bc;color: #000000;margin-top:3px;" class="mbs<?=$mbs;?>"><a href="javascript:;" class="ng-binding"><?=$mbs;?></a></div>

<div class="bl pad_2 left ">
<div data-qa="oddsButton" class="qbut qbut-<?=md5("1X2|1|".$ass["id"]);?>" onClick="kupon('<?=codekupon("$encoded|1|$ev_kazanc"); ?>');"><?=$ev_kazanc;?></div>
<div data-qa="oddsButton" class="qbut qbut-<?=md5("1X2|X|".$ass["id"]);?>" onclick="kupon('<?=codekupon("$encoded|2|$beraberlik"); ?>');"><?=$beraberlik;?></div>
<div data-qa="oddsButton" class="qbut qbut-<?=md5("1X2|2|".$ass["id"]);?>" onClick="kupon('<?=codekupon("$encoded|3|$konuk_kazanc"); ?>');"><?=$konuk_kazanc;?></div>
</div>

<div class="bl pad_r_3 left">
<? if($ass["istatistik"]!=0){ ?>
<div class="ibut " id="statistics-<?=$ass["id"];?>-lastminute">
<a href="javascript:popup('https://s5.sir.sportradar.com/totobo/tr/2/match/<?=$ass["istatistik"];?>','stats',1078,768);" class="stat" onmouseover="loadEventStatistics2(this, <?=$row["id"];?>, 'soccer', 'lastminute')" onmouseout="untooltipDelayed(this)"></a>
</div>
<? } else { ?>
<div class="ibut off" id="statistics-<?=$ass["id"];?>-lastminute"><div class="stat"></div></div>
<? } ?>
</div>
</div>
<div class="clear"></div>
</div>
</div>
<? } ?>
</div>
<div class="t_foot" style="border-top:none"></div>
<div class="space_15 shadow_bot_564"></div>
</div>
</div>
<? } ?>
<? } ?>

<? }

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

$ulkever = gd("ulke");

$do_cache = 1;
$mikro = microtime();

$tarih = "";

if($tarih=="") {

$tarih_ekle = "";

} else {

$tarih_ekle = "and mac_tarih='$tarih'";	

}



$saat = gd("saat");

if(!empty($saat) and $saat!=0) { $carp = ($saat*60); $eksi = time()+$carp; $saat_ekle = "and mac_time<$eksi"; } elseif($saat==0){$saat_ekle = "";}else { $carp = (180*60); $eksi = time()+$carp; $saat_ekle = "and mac_time<$eksi";} 

$donecek = substr($ulkever,0,-1);

$ulke = $donecek;

if(!empty($ulke)) { $ulke_ekle = "and kupa_id in ($ulke)"; } else { $ulke_ekle = ""; }

$bultentip = gd("bultentip");

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
$kayittime_ver = $suan-60;
$sqladder = "and kayittime<$kayittime_ver and bulten='hititbet' $tarih_ekle $saat_ekle $ulke_ekle $gizli_ekle and kupa_isim not like '%Duello%' {$whereyasak} and aktif='1'";
$sor = sed_sql_query("select * from program_dovus where id!='' $sqladder group by kupa_isim  order by mac_time asc ");
if(userayar('sporbulten')==0) { ?>
<div class="bos" style="text-align: center;font-weight: bold;margin: 10px;">Spor (bülten) bahisleri kapalıdır. Yöneticiniz ile görüşünüz.</div>
<? } else {

$say=1;
while($row=sed_sql_fetcharray($sor)) { 
$say++;
?>
<div class="e_active e_noCache jq-compound-event-block"  id="_program_blocks_compoundEventBlock_groupId_1201_type_UPCOMING">
<div class="border_ccc"><div>
<div class="t_head cf">
<div class="fs_16 darkgrey pad_l_9 left">
<div itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
<a href="#" itemprop="url"><span itemprop="title">MMA</span></a> - <div itemprop="child" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb" style="display: inline;"><a href="#" itemprop="url"><span itemprop="title"><?=$row['kupa_isim'];?></span></a></div>
</div>
</div>
</div>
</div>
<div class="e_active">
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
<div class="<? if ($i %2 != 0){ ?>even<? }else{ ?><? } ?>" >
<? if($i==2){?>
<div class="e_active" id="comp-UPCOMING_HEADER_<?=$row['kupa_id'];?>">
<div class="t_subhead cf">
<div class="grey_999 right cf">
<div class="w_39 left" style="min-height: 1px;">1</div>
<div class="w_39 left" style="min-height: 1px;">X</div>
<div class="w_39 left" style="min-height: 1px;">2</div>
</div>
<div class="red pad_l_9" onmouseover="tip(jQuery(this).html(), 55, true)" onmouseout="untip()">
<span><?=$row['kupa_ulke'];?></span>
</div>
<div class="close_groups" onclick="toggleAndUpdate(event, '1301','GROUP')"></div>
</div>
</div>
<? } ?>
<div class="e_active t_row jq-event-row-cont" >
<div class="info">
<div class="w_30 align_c left over" style="" onmouseover="tip(this.firstChild.data, 6)" >
<? echo $GLOBALS["gunler"][date("N",$ass['mac_time'])];?>
</div>

<div class="w_35 align_center left over ng-binding" title="<?=date("Y-m-d H:i",$ass['mac_time']); ?>">&nbsp;<?=date("d.m",$ass['mac_time']); ?>&nbsp;/&nbsp;</div>

<div class="w_35 bl align_center left timecell"><div class="timeText2 ng-binding" style="font-weight: bold;"><?=date("H:i",$ass['mac_time']); ?></div></div>

<div class="t_cell w_113 left" style="width: 158px;margin-left:5px;cursor:pointer;"><span class="teamname"><?=$ass["ev_takim"];?></span></div>

<div class="teamHelpWrap" style="width: 175px;"><div class="t_cell w_113 left" style="cursor:pointer;"><span class="teamname"><?=$ass["konuk_takim"];?></span></div></div>

<div style="border: 1px solid #f74835;background-color: #ffc3bc;color: #000000;margin-top:3px;" class="mbs<?=$mbs;?>"><a href="javascript:;" class="ng-binding"><?=$mbs;?></a></div>

<div class="bl pad_2 left ">
<div data-qa="oddsButton" class="qbut qbut-<?=md5("1X2|1|".$ass["id"]);?>" onClick="kupon('<?=codekupon("$encoded|1|$ev_kazanc"); ?>');"><?=$ev_kazanc;?></div>
<div data-qa="oddsButton" class="qbut qbut-<?=md5("1X2|X|".$ass["id"]);?>" onclick="kupon('<?=codekupon("$encoded|2|$beraberlik"); ?>');"><?=$beraberlik;?></div>
<div data-qa="oddsButton" class="qbut qbut-<?=md5("1X2|2|".$ass["id"]);?>" onClick="kupon('<?=codekupon("$encoded|3|$konuk_kazanc"); ?>');"><?=$konuk_kazanc;?></div>
</div>
</div>
<div class="clear"></div>
</div>
</div>
<? } ?>
</div>
<div class="t_foot" style="border-top:none"></div>
<div class="space_15 shadow_bot_564"></div>
</div>
</div>
<? } ?>
<? } ?>

<? }

if($a=="kuponadetbul") {

$kupon_sayi_sor = sed_sql_query("select * from kupon where session_id='$session_id' order by id asc");
$toplammac = sed_sql_numrows($kupon_sayi_sor);
if($toplammac>0){
print "( ".$toplammac." )";
}else{
print "";
}

}

if($a=="add_virtual_bet") {

header('Content-type: application/json');

$karsilasma_bol = explode(' - ',pd("name"));
$mac_time = strtotime(pd("date"));
$oran_tip = pd("type");
$oran_val = pd("bet");
$oran = pd("odd");
$sezon = pd("season");
$hafta = pd("week");
$oyuntip = pd("game");
$version = pd("vtype");


if($oran<1.01) { die(); }

$suan = time();

if($oyuntip=="vhc" || $oyuntip=="vdr"){

$sezonid_bol = explode('-',pd("match_id"));
$sezonid = $sezonid_bol[0];
$mac_kodu = pd("player");
$ev_takim = pd("name");
$konuk_takim = "".pd("playerName")." (".pd("player").")";

$kontrol = sed_sql_query("select id from kupongecicisanal where session_id='$session_id' and sezon='$sezon' and hafta='$hafta'");

if(sed_sql_numrows($kontrol)<1) {

sed_sql_query("insert into kupongecicisanal (id,mac_kodu,ev_takim,konuk_takim,mac_time,oran_tip,oran_val,oran,sezonid,sezon,hafta,oyuntip,version,session_id,ilkgiris) 

values ('','$mac_kodu','$ev_takim','$konuk_takim','$mac_time','$oran_tip','$oran_val','$oran','$sezonid','$sezon','$hafta','$oyuntip','$version','$session_id','$suan')");

} else {

$kupondaki = sed_sql_fetchassoc($kontrol);

sed_sql_query("update kupongecicisanal set mac_kodu='$mac_kodu',konuk_takim='$konuk_takim',oran_tip='$oran_tip',oran_val='$oran_val',oran='$oran' where id='$kupondaki[id]'");

}

} else {

$sezonid = pd("season_id");
$mac_kodu = pd("match_id");
$ev_takim = $karsilasma_bol[0];
$konuk_takim = $karsilasma_bol[1];

$kontrol = sed_sql_query("select id from kupongecicisanal where session_id='$session_id' and mac_kodu='$mac_kodu'");

if(sed_sql_numrows($kontrol)<1) {

sed_sql_query("insert into kupongecicisanal (id,mac_kodu,ev_takim,konuk_takim,mac_time,oran_tip,oran_val,oran,sezonid,sezon,hafta,oyuntip,version,session_id,ilkgiris) 

values ('','$mac_kodu','$ev_takim','$konuk_takim','$mac_time','$oran_tip','$oran_val','$oran','$sezonid','$sezon','$hafta','$oyuntip','$version','$session_id','$suan')");

} else {

$kupondaki = sed_sql_fetchassoc($kontrol);

sed_sql_query("update kupongecicisanal set oran_tip='$oran_tip',oran_val='$oran_val',oran='$oran' where id='$kupondaki[id]'");

}

}

$oran = 1;
$htmlbilgisi = '';

$kontrol_maclar = sed_sql_query("select * from kupongecicisanal where session_id='$session_id'");

while($row=sed_sql_fetcharray($kontrol_maclar)) {
$oynanamaz = 0;
if($row['mac_time']<time()) { $oynanamaz = 1; }

if($row['oran_tip']=="Maç Sonucu"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin185')."";
} else if($row['oran_tip']=="Handikap (0:1)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin186')."";
} else if($row['oran_tip']=="Handikap (1:0)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin187')."";
} else if($row['oran_tip']=="Handikap (0:2)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin188')."";
} else if($row['oran_tip']=="Handikap (2:0)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin189')."";
} else if($row['oran_tip']=="Çifte Şans"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin190')."";
} else if($row['oran_tip']=="İlk Gol"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin191')."";
} else if($row['oran_tip']=="İki Takımda Gol atar"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin192')."";
} else if($row['oran_tip']=="Beraberlik-Bahis Yok"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin193')."";
} else if($row['oran_tip']=="Toplam Gol Tek/Çift"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin194')."";
} else if($row['oran_tip']=="En çok skor olacak yarı"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin195')."";
} else if($row['oran_tip']=="İlk yarı sonu"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin196')."";
} else if($row['oran_tip']=="İlk Yarı Çifte Şans"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin197')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Gol (0.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin198')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Gol (1.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin199')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Gol (2.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin200')."";
} else if($row['oran_tip']=="Toplam Gol (1.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin201')."";
} else if($row['oran_tip']=="Toplam Gol (2.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin202')."";
} else if($row['oran_tip']=="Toplam Gol (3.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin203')."";
} else if($row['oran_tip']=="Ev sahibi takım toplam gol (0.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin204')."";
} else if($row['oran_tip']=="Ev sahibi takım toplam gol (1.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin205')."";
} else if($row['oran_tip']=="Ev sahibi takım toplam gol (2.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin206')."";
} else if($row['oran_tip']=="Deplasman takımı toplam gol (0.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin207')."";
} else if($row['oran_tip']=="Deplasman takımı toplam gol (1.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin208')."";
} else if($row['oran_tip']=="Deplasman takımı toplam gol (2.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin209')."";
} else if($row['oran_tip']=="Ev sahibi takım gol sayısı"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin210')."";
} else if($row['oran_tip']=="Deplasman takımı gol sayısı"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin211')."";
} else if($row['oran_tip']=="İlk Yarı/Maç Sonucu"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin212')."";
} else if($row['oran_tip']=="Gol atacak takımlar"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin213')."";
} else if($row['oran_tip']=="Maç Sonucu ve Toplam Gol (1.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin214')."";
} else if($row['oran_tip']=="Maç Sonucu ve Toplam Gol (2.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin215')."";
} else if($row['oran_tip']=="Toplam Gol Sayısı"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin216')."";
} else if($row['oran_tip']=="Kesin Skor"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin217')."";
} else if($row['oran_tip']=="Maç Kazananı"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin22')."";
} else if($row['oran_tip']=="İlk Yarı Kazananı"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin23')."";
} else if($row['oran_tip']=="En Çok Sayı Yapılan Çeyrek"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin24')."";
} else if($row['oran_tip']=="Toplam Sayı (180.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin30')."";
} else if($row['oran_tip']=="Toplam Sayı (181.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin31')."";
} else if($row['oran_tip']=="Toplam Sayı (182.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin32')."";
} else if($row['oran_tip']=="Toplam Sayı (183.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin33')."";
} else if($row['oran_tip']=="Toplam Sayı (184.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin34')."";
} else if($row['oran_tip']=="Toplam Sayı (185.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin35')."";
} else if($row['oran_tip']=="Toplam Sayı (186.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin36')."";
} else if($row['oran_tip']=="Toplam Sayı (187.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin37')."";
} else if($row['oran_tip']=="Toplam Sayı (188.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin38')."";
} else if($row['oran_tip']=="Toplam Sayı (189.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin39')."";
} else if($row['oran_tip']=="Handikap (+1.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin40')."";
} else if($row['oran_tip']=="Handikap (+2.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin41')."";
} else if($row['oran_tip']=="Handikap (+3.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin42')."";
} else if($row['oran_tip']=="Handikap (+4.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin43')."";
} else if($row['oran_tip']=="Handikap (+5.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin44')."";
} else if($row['oran_tip']=="Handikap (+6.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin45')."";
} else if($row['oran_tip']=="Handikap (+7.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin46')."";
} else if($row['oran_tip']=="Handikap (+8.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin47')."";
} else if($row['oran_tip']=="Handikap (+9.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin48')."";
} else if($row['oran_tip']=="Handikap (+10.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin49')."";
} else if($row['oran_tip']=="Handikap (+11.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin50')."";
} else if($row['oran_tip']=="Handikap (+12.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin51')."";
} else if($row['oran_tip']=="Handikap (+13.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin52')."";
} else if($row['oran_tip']=="Handikap (+14.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin53')."";
} else if($row['oran_tip']=="Handikap (+15.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin54')."";
} else if($row['oran_tip']=="Handikap (+16.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin55')."";
} else if($row['oran_tip']=="Handikap (+17.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin56')."";
} else if($row['oran_tip']=="Handikap (+18.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin57')."";
} else if($row['oran_tip']=="Handikap (+19.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin58')."";
} else if($row['oran_tip']=="Handikap (-1.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin59')."";
} else if($row['oran_tip']=="Handikap (-2.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin60')."";
} else if($row['oran_tip']=="Handikap (-3.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin61')."";
} else if($row['oran_tip']=="Handikap (-4.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin62')."";
} else if($row['oran_tip']=="Handikap (-5.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin63')."";
} else if($row['oran_tip']=="Handikap (-6.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin64')."";
} else if($row['oran_tip']=="Handikap (-7.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin65')."";
} else if($row['oran_tip']=="Handikap (-8.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin66')."";
} else if($row['oran_tip']=="Handikap (-9.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin67')."";
} else if($row['oran_tip']=="Handikap (-10.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin68')."";
} else if($row['oran_tip']=="Handikap (-11.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin69')."";
} else if($row['oran_tip']=="Handikap (-12.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin70')."";
} else if($row['oran_tip']=="Handikap (-13.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin71')."";
} else if($row['oran_tip']=="Handikap (-14.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin72')."";
} else if($row['oran_tip']=="Handikap (-15.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin73')."";
} else if($row['oran_tip']=="Handikap (-16.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin74')."";
} else if($row['oran_tip']=="Handikap (-17.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin75')."";
} else if($row['oran_tip']=="Handikap (-18.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin76')."";
} else if($row['oran_tip']=="Handikap (-19.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin77')."";
} else if($row['oran_tip']=="X\'e İlk Kim Ulaşır (20)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin78')."";
} else if($row['oran_tip']=="X\'e İlk Kim Ulaşır (40)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin79')."";
} else if($row['oran_tip']=="X\'e İlk Kim Ulaşır (60)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin80')."";
} else if($row['oran_tip']=="Kazanma Aralığı (İlk Yarı)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin81')."";
} else if($row['oran_tip']=="Kazanma Aralığı (Uzatmalar Dahil)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin82')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (80.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin83')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (81.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin84')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (82.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin85')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (83.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin86')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (84.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin87')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (85.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin88')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (86.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin89')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (87.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin90')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (88.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin91')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (89.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin92')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (90.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin93')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (91.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin94')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (92.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin95')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (93.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin96')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (94.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin97')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (95.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin98')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (96.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin99')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (97.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin100')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (98.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin101')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (99.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin102')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (80.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin103')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (81.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin104')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (82.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin105')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (83.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin106')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (84.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin107')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (85.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin108')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (86.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin109')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (87.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin110')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (88.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin111')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (89.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin112')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (90.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin113')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (91.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin114')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (92.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin115')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (93.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin116')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (94.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin117')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (95.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin118')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (96.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin119')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (97.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin120')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (98.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin121')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (99.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin122')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+0.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin123')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+1.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin124')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+2.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin125')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+3.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin126')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+4.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin127')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+5.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin128')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+6.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin129')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+7.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin130')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+8.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin131')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+9.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin132')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+10.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin133')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+11.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin134')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+12.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin135')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+13.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin136')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+14.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin137')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+15.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin138')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+16.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin139')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+17.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin140')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+18.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin141')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+19.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin142')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+20.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin143')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-0.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin144')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-1.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin145')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-2.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin146')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-3.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin147')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-4.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin148')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-5.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin149')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-6.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin150')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-7.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin151')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-8.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin152')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-9.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin153')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-10.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin154')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-11.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin155')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-12.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin156')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-13.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin157')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-14.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin158')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-15.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin159')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-16.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin160')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-17.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin161')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-18.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin162')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-19.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin163')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-20.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin164')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (80.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin165')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (81.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin166')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (82.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin167')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (83.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin168')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (84.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin169')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (85.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin170')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (86.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin171')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (87.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin172')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (88.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin173')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (89.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin174')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (90.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin175')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (91.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin176')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (92.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin177')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (93.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin178')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (94.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin179')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (95.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin180')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (96.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin181')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (97.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin182')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (98.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin183')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (99.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin184')."";
} else if($row['oran_tip']=="Sıralı İkili"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin13')."";
} else if($row['oran_tip']=="Sırasız İkili"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin14')."";
} else if($row['oran_tip']=="Sıralı Üçlü"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin15')."";
} else if($row['oran_tip']=="Sırasız Üçlü"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin16')."";
} else if($row['oran_tip']=="Kazanır"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin17')."";
} else if($row['oran_tip']=="İlk İkiye Girer"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin18')."";
} else if($row['oran_tip']=="İlk Üçe Girer"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin19')."";
} else if($row['oran_tip']=="Evet"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin20')."";
} else if($row['oran_tip']=="Hayır"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin21')."";
} else {
	$tipismi_ver = $row['oran_tip'];
}

if($row['oran_val']=="Her ikisi de"){
	$valismi_ver = "".getTranslation('sanalmaclaricin218')."";
} else if($row['oran_val']=="Sadece ev sahibi takım"){
	$valismi_ver = "".getTranslation('sanalmaclaricin219')."";
} else if($row['oran_val']=="Sadece deplasman takımı"){
	$valismi_ver = "".getTranslation('sanalmaclaricin220')."";
} else if($row['oran_val']=="Hiçbiri"){
	$valismi_ver = "".getTranslation('sanalmaclaricin221')."";
} else if($row['oran_val']=="1 ve A"){
	$valismi_ver = "".getTranslation('sanalmaclaricin222')."";
} else if($row['oran_val']=="1 ve Ü"){
	$valismi_ver = "".getTranslation('sanalmaclaricin223')."";
} else if($row['oran_val']=="X ve A"){
	$valismi_ver = "".getTranslation('sanalmaclaricin224')."";
} else if($row['oran_val']=="X ve Ü"){
	$valismi_ver = "".getTranslation('sanalmaclaricin225')."";
} else if($row['oran_val']=="2 ve A"){
	$valismi_ver = "".getTranslation('sanalmaclaricin226')."";
} else if($row['oran_val']=="2 ve Ü"){
	$valismi_ver = "".getTranslation('sanalmaclaricin227')."";
} else if($row['oran_val']=="Diğer"){
	$valismi_ver = "".getTranslation('sanalmaclaricin228')."";
} else if($row['oran_val']=="HT 11+"){
	$valismi_ver = "".getTranslation('sanalmaclaricin229')."";
} else if($row['oran_val']=="HT 6-10"){
	$valismi_ver = "".getTranslation('sanalmaclaricin230')."";
} else if($row['oran_val']=="HT 1-5"){
	$valismi_ver = "".getTranslation('sanalmaclaricin231')."";
} else if($row['oran_val']=="AT 11+"){
	$valismi_ver = "".getTranslation('sanalmaclaricin232')."";
} else if($row['oran_val']=="AT 6-10"){
	$valismi_ver = "".getTranslation('sanalmaclaricin233')."";
} else if($row['oran_val']=="AT 1-5"){
	$valismi_ver = "".getTranslation('sanalmaclaricin234')."";
} else if($row['oran_val']=="1. Çeyrek"){
	$valismi_ver = "".getTranslation('devreler13')."";
} else if($row['oran_val']=="2. Çeyrek"){
	$valismi_ver = "".getTranslation('devreler15')."";
} else if($row['oran_val']=="3. Çeyrek"){
	$valismi_ver = "".getTranslation('devreler17')."";
} else if($row['oran_val']=="4. Çeyrek"){
	$valismi_ver = "".getTranslation('devreler19')."";
} else if($row['oran_val']=="Eşit"){
	$valismi_ver = "".getTranslation('oransecenek61')."";
} else if($row['oran_val']=="u"){ 
	$valismi_ver = "".getTranslation('oransecenek31')."";
} else if($row['oran_val']=="o"){ 
	$valismi_ver = "".getTranslation('oransecenek30')."";
} else if($row['oran_val']=="Alt"){ 
	$valismi_ver = "".getTranslation('oransecenek31')."";
} else if($row['oran_val']=="Üst"){ 
	$valismi_ver = "".getTranslation('oransecenek30')."";
} else if($row['oran_val']=="Evet"){
	$valismi_ver = "".getTranslation('oransecenek23')."";
} else if($row['oran_val']=="Hayır"){
	$valismi_ver = "".getTranslation('oransecenek24')."";
} else if($row['oran_val']=="Tek"){
	$valismi_ver = "".getTranslation('oransecenek28')."";
} else if($row['oran_val']=="Çift"){
	$valismi_ver = "".getTranslation('oransecenek29')."";
} else if($row['oran_val']=="İlk Yarı"){
	$valismi_ver = "".getTranslation('canlianlatimjs9')."";
} else if($row['oran_val']=="İkinci Yarı"){
	$valismi_ver = "".getTranslation('canlianlatimjs11')."";
} else {
	$valismi_ver = $row['oran_val'];
}

if($oynanamaz==1){
$tiplesene2 = '<img src="assets/checkbox_off-6939E0E58BF542C81AF0164F3FCBA7A2.png" width="11" height="11">';
$tiplesene = '<div class="tipp ">'.getTranslation('sanalmaclaricin235').' </div>';
} else {
$tiplesene2 = '<img src="assets/checkbox_on-40687EE54C4A0F6A6205CA304197C9E4.png" width="11" height="11">';
$tiplesene = '<div class="tipp ">'.$tipismi_ver.' / '.$valismi_ver.' </div>';
}

$oran = $oran*$row['oran'];

$htmlbilgisi = ''.$htmlbilgisi.'

<table class="event_head">
<tbody>
<tr style="text-align: center;">
<td>'.$row['sezon'].' / '.$row['hafta'].'</td>
</tr>
</tbody>
</table>
<table class="event">
<tbody>
<tr style="line-height: 2;">
<td class="pad_l_5"></td>
<td>&nbsp;'.$row['ev_takim'].' - '.$row['konuk_takim'].'</td>
<td class="close"><div class="cursor right" onclick="removetekvirtual('.$row['id'].','.$row['mac_kodu'].');"><img src="assets/event_close-AB28012D32BBAD5C4C6127F5396406AA.gif" width="11" height="11"></div></td>
</tr>
</tbody>
</table>
<table class="event">
<tbody>
<tr>
<td class="check"><div class="cursor">'.$tiplesene2.'</div></td>
<td>'.$tiplesene.'</td>
<td><div data-qa="betSlipOdds" class="quote">'.$row['oran'].'</div></td>
</tr>
</tbody>
</table>

';

$json_in_coupon[$row['id']][$row['oran_tip']] = array($row['oran_val']=>1);

}

$toplammac = sed_sql_numrows($kontrol_maclar);

if($toplammac>0){
$json = array(
'status'=>'success',
'html'=>'

<div class="kupon">

'.$htmlbilgisi.'

</div>

<div class="right"><a class="remove_all red align_r" href="javascript:;" id="sistemm1" onclick="virtualremove();" style="text-decoration:underline;">Tümünü sil</a></div>



<div class="kuponde">


<div class="space_3 clear"></div>
<div class="space_3 clear"></div>
<div class="space_3 clear"></div>
<div class="stakeButtons barmiddle center">
<a onclick="totalbet(30)" class="roll_red"><div role="button" class="stakeLevel  left">30</div></a>
<a onclick="totalbet(150)" class="roll_red"><div role="button" class="stakeLevel  left">150</div></a>
<a onclick="totalbet(300)" class="roll_red"><div role="button" class="stakeLevel  left">300</div></a>
<a onclick="totalbet(500)" class="roll_red"><div role="button" class="stakeLevel  left">500</div></a>
</div>

<div class="space_30 bg_midgrey"></div>

<div class="col bg_midgrey">
<div class="left">Kupon Adı</div>
<div class="right" style="margin-right:5px;">
<input type="text" class="input" name="title" id="title" value="">
</div>
<div class="clear"></div>
</div>

<div class="col bg_midgrey">
<div class="left">Toplam Oran</div>
<div class="right" style="margin-right:5px;"><span id="toplamoranhesap">'.nf($oran).'</span><input type="hidden" id="total-odd" value="'.$oran.'"></div>
<div class="clear"></div>
</div>

<div class="col bg_midgrey">
<div class="left">Bahis</div>
<div class="right" style="margin-right:5px;">
<input type="text" class="input" name="fold" value="0" id="fold" autocomplete="off" onkeyup="totalbets();">
</div>
<div class="clear"></div>
</div>

<div class="col bg_midgrey">
<div class="left">Olası Kazanç:</div>
<div class="right" style="margin-right:5px;" id="mkazanc"><span id="max-gain-total">0.00</span></div>
<div class="clear"></div>
</div>

<div class="space_3 clear"></div>
<div class="clear"></div>
<div class="space_9"></div>

<div class="ticket_button_flex big_but big_font">
<input type="hidden" name="coupon_type" value="virtual">
<a class="roll_red" href="javascript:;" onclick="virtualcouponokey();">Bahsini yap</a>
</div>
<div class="space_3"></div>

</div>

',
'in_coupon'=>$json_in_coupon
);
} else {
$json = array('status'=>'errors');
}

echo json_encode($json);

}

if($a=="virtualcoupons") {

header('Content-type: application/json');
$oran = 1;
$htmlbilgisi = '';

$kontrol_maclar = sed_sql_query("select * from kupongecicisanal where session_id='$session_id'");

if(sed_sql_numrows($kontrol_maclar)>0) {

while($row=sed_sql_fetcharray($kontrol_maclar)) {
$oynanamaz = 0;
if($row['mac_time']<time()) { $oynanamaz = 1; }

if($row['oran_tip']=="Maç Sonucu"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin185')."";
} else if($row['oran_tip']=="Handikap (0:1)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin186')."";
} else if($row['oran_tip']=="Handikap (1:0)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin187')."";
} else if($row['oran_tip']=="Handikap (0:2)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin188')."";
} else if($row['oran_tip']=="Handikap (2:0)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin189')."";
} else if($row['oran_tip']=="Çifte Şans"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin190')."";
} else if($row['oran_tip']=="İlk Gol"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin191')."";
} else if($row['oran_tip']=="İki Takımda Gol atar"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin192')."";
} else if($row['oran_tip']=="Beraberlik-Bahis Yok"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin193')."";
} else if($row['oran_tip']=="Toplam Gol Tek/Çift"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin194')."";
} else if($row['oran_tip']=="En çok skor olacak yarı"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin195')."";
} else if($row['oran_tip']=="İlk yarı sonu"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin196')."";
} else if($row['oran_tip']=="İlk Yarı Çifte Şans"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin197')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Gol (0.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin198')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Gol (1.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin199')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Gol (2.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin200')."";
} else if($row['oran_tip']=="Toplam Gol (1.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin201')."";
} else if($row['oran_tip']=="Toplam Gol (2.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin202')."";
} else if($row['oran_tip']=="Toplam Gol (3.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin203')."";
} else if($row['oran_tip']=="Ev sahibi takım toplam gol (0.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin204')."";
} else if($row['oran_tip']=="Ev sahibi takım toplam gol (1.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin205')."";
} else if($row['oran_tip']=="Ev sahibi takım toplam gol (2.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin206')."";
} else if($row['oran_tip']=="Deplasman takımı toplam gol (0.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin207')."";
} else if($row['oran_tip']=="Deplasman takımı toplam gol (1.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin208')."";
} else if($row['oran_tip']=="Deplasman takımı toplam gol (2.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin209')."";
} else if($row['oran_tip']=="Ev sahibi takım gol sayısı"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin210')."";
} else if($row['oran_tip']=="Deplasman takımı gol sayısı"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin211')."";
} else if($row['oran_tip']=="İlk Yarı/Maç Sonucu"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin212')."";
} else if($row['oran_tip']=="Gol atacak takımlar"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin213')."";
} else if($row['oran_tip']=="Maç Sonucu ve Toplam Gol (1.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin214')."";
} else if($row['oran_tip']=="Maç Sonucu ve Toplam Gol (2.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin215')."";
} else if($row['oran_tip']=="Toplam Gol Sayısı"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin216')."";
} else if($row['oran_tip']=="Kesin Skor"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin217')."";
} else if($row['oran_tip']=="Maç Kazananı"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin22')."";
} else if($row['oran_tip']=="İlk Yarı Kazananı"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin23')."";
} else if($row['oran_tip']=="En Çok Sayı Yapılan Çeyrek"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin24')."";
} else if($row['oran_tip']=="Toplam Sayı (180.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin30')."";
} else if($row['oran_tip']=="Toplam Sayı (181.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin31')."";
} else if($row['oran_tip']=="Toplam Sayı (182.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin32')."";
} else if($row['oran_tip']=="Toplam Sayı (183.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin33')."";
} else if($row['oran_tip']=="Toplam Sayı (184.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin34')."";
} else if($row['oran_tip']=="Toplam Sayı (185.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin35')."";
} else if($row['oran_tip']=="Toplam Sayı (186.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin36')."";
} else if($row['oran_tip']=="Toplam Sayı (187.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin37')."";
} else if($row['oran_tip']=="Toplam Sayı (188.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin38')."";
} else if($row['oran_tip']=="Toplam Sayı (189.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin39')."";
} else if($row['oran_tip']=="Handikap (+1.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin40')."";
} else if($row['oran_tip']=="Handikap (+2.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin41')."";
} else if($row['oran_tip']=="Handikap (+3.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin42')."";
} else if($row['oran_tip']=="Handikap (+4.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin43')."";
} else if($row['oran_tip']=="Handikap (+5.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin44')."";
} else if($row['oran_tip']=="Handikap (+6.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin45')."";
} else if($row['oran_tip']=="Handikap (+7.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin46')."";
} else if($row['oran_tip']=="Handikap (+8.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin47')."";
} else if($row['oran_tip']=="Handikap (+9.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin48')."";
} else if($row['oran_tip']=="Handikap (+10.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin49')."";
} else if($row['oran_tip']=="Handikap (+11.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin50')."";
} else if($row['oran_tip']=="Handikap (+12.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin51')."";
} else if($row['oran_tip']=="Handikap (+13.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin52')."";
} else if($row['oran_tip']=="Handikap (+14.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin53')."";
} else if($row['oran_tip']=="Handikap (+15.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin54')."";
} else if($row['oran_tip']=="Handikap (+16.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin55')."";
} else if($row['oran_tip']=="Handikap (+17.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin56')."";
} else if($row['oran_tip']=="Handikap (+18.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin57')."";
} else if($row['oran_tip']=="Handikap (+19.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin58')."";
} else if($row['oran_tip']=="Handikap (-1.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin59')."";
} else if($row['oran_tip']=="Handikap (-2.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin60')."";
} else if($row['oran_tip']=="Handikap (-3.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin61')."";
} else if($row['oran_tip']=="Handikap (-4.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin62')."";
} else if($row['oran_tip']=="Handikap (-5.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin63')."";
} else if($row['oran_tip']=="Handikap (-6.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin64')."";
} else if($row['oran_tip']=="Handikap (-7.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin65')."";
} else if($row['oran_tip']=="Handikap (-8.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin66')."";
} else if($row['oran_tip']=="Handikap (-9.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin67')."";
} else if($row['oran_tip']=="Handikap (-10.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin68')."";
} else if($row['oran_tip']=="Handikap (-11.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin69')."";
} else if($row['oran_tip']=="Handikap (-12.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin70')."";
} else if($row['oran_tip']=="Handikap (-13.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin71')."";
} else if($row['oran_tip']=="Handikap (-14.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin72')."";
} else if($row['oran_tip']=="Handikap (-15.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin73')."";
} else if($row['oran_tip']=="Handikap (-16.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin74')."";
} else if($row['oran_tip']=="Handikap (-17.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin75')."";
} else if($row['oran_tip']=="Handikap (-18.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin76')."";
} else if($row['oran_tip']=="Handikap (-19.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin77')."";
} else if($row['oran_tip']=="X\'e İlk Kim Ulaşır (20)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin78')."";
} else if($row['oran_tip']=="X\'e İlk Kim Ulaşır (40)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin79')."";
} else if($row['oran_tip']=="X\'e İlk Kim Ulaşır (60)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin80')."";
} else if($row['oran_tip']=="Kazanma Aralığı (İlk Yarı)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin81')."";
} else if($row['oran_tip']=="Kazanma Aralığı (Uzatmalar Dahil)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin82')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (80.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin83')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (81.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin84')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (82.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin85')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (83.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin86')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (84.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin87')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (85.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin88')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (86.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin89')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (87.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin90')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (88.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin91')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (89.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin92')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (90.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin93')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (91.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin94')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (92.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin95')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (93.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin96')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (94.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin97')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (95.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin98')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (96.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin99')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (97.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin100')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (98.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin101')."";
} else if($row['oran_tip']=="Ev Sahibi Takımın Toplam Sayısı (99.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin102')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (80.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin103')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (81.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin104')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (82.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin105')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (83.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin106')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (84.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin107')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (85.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin108')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (86.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin109')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (87.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin110')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (88.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin111')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (89.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin112')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (90.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin113')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (91.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin114')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (92.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin115')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (93.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin116')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (94.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin117')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (95.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin118')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (96.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin119')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (97.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin120')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (98.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin121')."";
} else if($row['oran_tip']=="Deplasman Takımın Toplam Sayısı (99.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin122')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+0.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin123')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+1.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin124')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+2.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin125')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+3.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin126')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+4.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin127')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+5.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin128')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+6.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin129')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+7.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin130')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+8.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin131')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+9.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin132')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+10.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin133')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+11.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin134')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+12.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin135')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+13.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin136')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+14.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin137')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+15.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin138')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+16.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin139')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+17.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin140')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+18.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin141')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+19.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin142')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (+20.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin143')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-0.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin144')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-1.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin145')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-2.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin146')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-3.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin147')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-4.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin148')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-5.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin149')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-6.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin150')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-7.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin151')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-8.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin152')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-9.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin153')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-10.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin154')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-11.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin155')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-12.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin156')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-13.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin157')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-14.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin158')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-15.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin159')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-16.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin160')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-17.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin161')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-18.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin162')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-19.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin163')."";
} else if($row['oran_tip']=="İlk Yarı Handikap (-20.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin164')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (80.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin165')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (81.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin166')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (82.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin167')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (83.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin168')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (84.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin169')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (85.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin170')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (86.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin171')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (87.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin172')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (88.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin173')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (89.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin174')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (90.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin175')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (91.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin176')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (92.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin177')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (93.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin178')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (94.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin179')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (95.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin180')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (96.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin181')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (97.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin182')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (98.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin183')."";
} else if($row['oran_tip']=="İlk Yarı Toplam Sayı (99.5)"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin184')."";
} else if($row['oran_tip']=="Sıralı İkili"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin13')."";
} else if($row['oran_tip']=="Sırasız İkili"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin14')."";
} else if($row['oran_tip']=="Sıralı Üçlü"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin15')."";
} else if($row['oran_tip']=="Sırasız Üçlü"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin16')."";
} else if($row['oran_tip']=="Kazanır"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin17')."";
} else if($row['oran_tip']=="İlk İkiye Girer"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin18')."";
} else if($row['oran_tip']=="İlk Üçe Girer"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin19')."";
} else if($row['oran_tip']=="Evet"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin20')."";
} else if($row['oran_tip']=="Hayır"){
	$tipismi_ver = "".getTranslation('sanalmaclaricin21')."";
} else {
	$tipismi_ver = $row['oran_tip'];
}

if($row['oran_val']=="Her ikisi de"){
	$valismi_ver = "".getTranslation('sanalmaclaricin218')."";
} else if($row['oran_val']=="Sadece ev sahibi takım"){
	$valismi_ver = "".getTranslation('sanalmaclaricin219')."";
} else if($row['oran_val']=="Sadece deplasman takımı"){
	$valismi_ver = "".getTranslation('sanalmaclaricin220')."";
} else if($row['oran_val']=="Hiçbiri"){
	$valismi_ver = "".getTranslation('sanalmaclaricin221')."";
} else if($row['oran_val']=="1 ve A"){
	$valismi_ver = "".getTranslation('sanalmaclaricin222')."";
} else if($row['oran_val']=="1 ve Ü"){
	$valismi_ver = "".getTranslation('sanalmaclaricin223')."";
} else if($row['oran_val']=="X ve A"){
	$valismi_ver = "".getTranslation('sanalmaclaricin224')."";
} else if($row['oran_val']=="X ve Ü"){
	$valismi_ver = "".getTranslation('sanalmaclaricin225')."";
} else if($row['oran_val']=="2 ve A"){
	$valismi_ver = "".getTranslation('sanalmaclaricin226')."";
} else if($row['oran_val']=="2 ve Ü"){
	$valismi_ver = "".getTranslation('sanalmaclaricin227')."";
} else if($row['oran_val']=="Diğer"){
	$valismi_ver = "".getTranslation('sanalmaclaricin228')."";
} else if($row['oran_val']=="HT 11+"){
	$valismi_ver = "".getTranslation('sanalmaclaricin229')."";
} else if($row['oran_val']=="HT 6-10"){
	$valismi_ver = "".getTranslation('sanalmaclaricin230')."";
} else if($row['oran_val']=="HT 1-5"){
	$valismi_ver = "".getTranslation('sanalmaclaricin231')."";
} else if($row['oran_val']=="AT 11+"){
	$valismi_ver = "".getTranslation('sanalmaclaricin232')."";
} else if($row['oran_val']=="AT 6-10"){
	$valismi_ver = "".getTranslation('sanalmaclaricin233')."";
} else if($row['oran_val']=="AT 1-5"){
	$valismi_ver = "".getTranslation('sanalmaclaricin234')."";
} else if($row['oran_val']=="1. Çeyrek"){
	$valismi_ver = "".getTranslation('devreler13')."";
} else if($row['oran_val']=="2. Çeyrek"){
	$valismi_ver = "".getTranslation('devreler15')."";
} else if($row['oran_val']=="3. Çeyrek"){
	$valismi_ver = "".getTranslation('devreler17')."";
} else if($row['oran_val']=="4. Çeyrek"){
	$valismi_ver = "".getTranslation('devreler19')."";
} else if($row['oran_val']=="Eşit"){
	$valismi_ver = "".getTranslation('oransecenek61')."";
} else if($row['oran_val']=="u"){ 
	$valismi_ver = "".getTranslation('oransecenek31')."";
} else if($row['oran_val']=="o"){ 
	$valismi_ver = "".getTranslation('oransecenek30')."";
} else if($row['oran_val']=="Evet"){
	$valismi_ver = "".getTranslation('oransecenek23')."";
} else if($row['oran_val']=="Hayır"){
	$valismi_ver = "".getTranslation('oransecenek24')."";
} else if($row['oran_val']=="Tek"){
	$valismi_ver = "".getTranslation('oransecenek28')."";
} else if($row['oran_val']=="Çift"){
	$valismi_ver = "".getTranslation('oransecenek29')."";
} else if($row['oran_val']=="İlk Yarı"){
	$valismi_ver = "".getTranslation('canlianlatimjs9')."";
} else if($row['oran_val']=="İkinci Yarı"){
	$valismi_ver = "".getTranslation('canlianlatimjs11')."";
} else {
	$valismi_ver = $row['oran_val'];
}

if($oynanamaz==1){
$tiplesene2 = '<img src="assets/checkbox_off-6939E0E58BF542C81AF0164F3FCBA7A2.png" width="11" height="11">';
$tiplesene = '<div class="tipp ">'.getTranslation('sanalmaclaricin235').' </div>';
} else {
$tiplesene2 = '<img src="assets/checkbox_on-40687EE54C4A0F6A6205CA304197C9E4.png" width="11" height="11">';
$tiplesene = '<div class="tipp ">'.$tipismi_ver.' / '.$valismi_ver.' </div>';
}

$oran = $oran*$row['oran'];

$htmlbilgisi = ''.$htmlbilgisi.'

<table class="event_head">
<tbody>
<tr style="text-align: center;">
<td>'.$row['sezon'].' / '.$row['hafta'].'</td>
</tr>
</tbody>
</table>
<table class="event">
<tbody>
<tr style="line-height: 2;">
<td class="pad_l_5"></td>
<td>&nbsp;'.$row['ev_takim'].' - '.$row['konuk_takim'].'</td>
<td class="close"><div class="cursor right" onclick="removetekvirtual('.$row['id'].','.$row['mac_kodu'].');"><img src="assets/event_close-AB28012D32BBAD5C4C6127F5396406AA.gif" width="11" height="11"></div></td>
</tr>
</tbody>
</table>
<table class="event">
<tbody>
<tr>
<td class="check"><div class="cursor">'.$tiplesene2.'</div></td>
<td>'.$tiplesene.'</td>
<td><div data-qa="betSlipOdds" class="quote">'.$row['oran'].'</div></td>
</tr>
</tbody>
</table>

';

$json_in_coupon[$row['id']][$row['oran_tip']] = array($row['oran_val']=>1);

}

$toplammac = sed_sql_numrows($kontrol_maclar);

$json = array(
'status'=>'success',
'html'=>'

<div class="kupon">

'.$htmlbilgisi.'

</div>

<div class="right"><a class="remove_all red align_r" href="javascript:;" id="sistemm1" onclick="virtualremove();" style="text-decoration:underline;">Tümünü sil</a></div>



<div class="kuponde">


<div class="space_3 clear"></div>
<div class="space_3 clear"></div>
<div class="space_3 clear"></div>
<div class="stakeButtons barmiddle center">
<a onclick="totalbet(30)" class="roll_red"><div role="button" class="stakeLevel  left">30</div></a>
<a onclick="totalbet(150)" class="roll_red"><div role="button" class="stakeLevel  left">150</div></a>
<a onclick="totalbet(300)" class="roll_red"><div role="button" class="stakeLevel  left">300</div></a>
<a onclick="totalbet(500)" class="roll_red"><div role="button" class="stakeLevel  left">500</div></a>
</div>

<div class="space_30 bg_midgrey"></div>

<div class="col bg_midgrey">
<div class="left">Kupon Adı</div>
<div class="right" style="margin-right:5px;">
<input type="text" class="input" name="title" id="title" value="">
</div>
<div class="clear"></div>
</div>

<div class="col bg_midgrey">
<div class="left">Toplam Oran</div>
<div class="right" style="margin-right:5px;"><span id="toplamoranhesap">'.nf($oran).'</span><input type="hidden" id="total-odd" value="'.$oran.'"></div>
<div class="clear"></div>
</div>

<div class="col bg_midgrey">
<div class="left">Bahis</div>
<div class="right" style="margin-right:5px;">
<input type="text" class="input" name="fold" value="0" id="fold" autocomplete="off" onkeyup="totalbets();">
</div>
<div class="clear"></div>
</div>

<div class="col bg_midgrey">
<div class="left">Olası Kazanç:</div>
<div class="right" style="margin-right:5px;" id="mkazanc"><span id="max-gain-total">0.00</span></div>
<div class="clear"></div>
</div>

<div class="space_3 clear"></div>
<div class="clear"></div>
<div class="space_9"></div>

<div class="ticket_button_flex big_but big_font">
<input type="hidden" name="coupon_type" value="virtual">
<a class="roll_red" href="javascript:;" onclick="virtualcouponokey();">Bahsini yap</a>
</div>
<div class="space_3"></div>

</div>

',
'in_coupon'=>$json_in_coupon
);

echo json_encode($json);

}

}

if($a=="virtualremove") {

sed_sql_query("delete from kupongecicisanal where session_id='$session_id'");

die("11");

}

if($a=="removetekvirtual") {
$id = gd("id");
sed_sql_query("delete from kupongecicisanal where session_id='$session_id' and id='$id'");
$toplam = sed_sql_query("select id from kupongecicisanal where session_id='$session_id'");
$toplammac = sed_sql_numrows($toplam);
if($toplammac>0){
die("1");
} else {
die("2");
}
}

if($a=="virtualokey") {

$tutar = pd("tutar");
$kuponadi = pd("kuponadi");

$kupon_yatan_bol = explode('.',$tutar);

if($kupon_yatan_bol[1]>0){
	$kuponda_kurus_var = 1;
} else {
	$kuponda_kurus_var = 0;
}

if($kuponda_kurus_var>0) { echo "643"; exit(); }

if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $tutar)) { echo "643"; exit(); }

if($tutar>$ub['bakiye']) { echo "644"; exit(); }

$toplamoranbul = sed_sql_query("select oran,session_id,mac_time from kupongecicisanal where session_id='$session_id'");
$toplammac = sed_sql_numrows($toplamoranbul);
$toporan = 1;
while($toplamoranhesapla = sed_sql_fetcharray($toplamoranbul)) {
	if($toplamoranhesapla['mac_time']<time()) { echo "1"; exit(); /*oynanamaz maç var*/ }
	$toporan = $toporan*$toplamoranhesapla['oran'];
}
$toplamoran = $toporan;
$kazanc = $toplamoran*$tutar;

if(userayar('sanal_mbs')>$toplammac) { echo "4"; exit(); }
if(userayar('sanal_maxoran')=="") { $maxoran = 500; } else { $maxoran = userayar('sanal_maxoran'); }
if(userayar('sanal_minoran')=="") { $minoran = 1; } else { $minoran = userayar('sanal_minoran'); }

if($toplamoran>$maxoran) { echo "2"; exit(); /*max oranı geçtiniz*/ }
if($toplamoran<$minoran) { echo "3"; exit(); /*min oranı geçemediniz*/ }

$zaman = time();

$tarih = date("d.m.Y H:i:s");

$gunluk_tarih_ver = date("d.m.Y");

$ipadres = $_SERVER['REMOTE_ADDR'];

sed_sql_query("insert into kuponlar (id,user_id,username,oran,yatan,tutar,kupon_time,canli,toplam_mac,kupon_nots,durum,session_id,kupon_tarih,ipadres,kupon_tarihi_belirle) values

('','$ub[id]','$ub[username]','$toplamoran','$tutar','$kazanc','$zaman','3','$toplammac','$kuponadi','1','$session_id','$tarih','$ipadres','$gunluk_tarih_ver')");

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
aciklama = '".$kupon_id." numaralı sanal kupon yatırıldı',
islemi_yapan = 'sistem',
zaman = '".$kupon_zaman."',
detay = '1'");

$sor = sed_sql_query("select * from kupongecicisanal where session_id='$session_id'");

while($row=sed_sql_fetcharray($sor)) {

$sportip_birlestir = "".$row['oyuntip']."_".$row['version']."";
$sezon_birlestir = "".$row['sezonid']."_".$row['hafta']."";

sed_sql_query("insert into kupon_ic_sanal (id,mac_kodu,ev_takim,konuk_takim,mac_time,oran_tip,oran_val,oran,session_id,spor_tip,kupon_id,user_id,username,ilkgiris,sezonid,sezon,hafta,sezon_hafta) values ('','$row[mac_kodu]','$row[ev_takim]','$row[konuk_takim]','$row[mac_time]','$row[oran_tip]','$row[oran_val]','$row[oran]','$session_id','$sportip_birlestir','$kupon_id','$ub[id]','$ub[username]','$row[ilkgiris]','$row[sezonid]','$row[sezon]','$row[hafta]','$sezon_birlestir')");

}
die("200");

}

if($a=="virtualonaygoruntule") {

$sonkupon = bilgi("select * from kuponlar where session_id='$session_id' and canli='3' order by id desc limit 1");

?>

<div style="font-size: 13px;font-weight: bold;color: #60b704;"><i class="fa fa-check" aria-hidden="true"></i> <?=getTranslation('kupononaylama1')?> ( <?=$sonkupon['id'];?> )</div>

<div style="font-size: 13px;text-align: left;margin: 3px;"><?=getTranslation('kupononaylama2')?></div>

<div style="font-size: 13px;text-align: left;margin: 3px;"><?=getTranslation('kupononaylama3')?> : <?=turkce_tarih($sonkupon['kupon_time']); ?> <?=date("H:i",$sonkupon['kupon_time']);?></div>

<div style="font-size: 13px;text-align: left;margin: 3px;"><?=getTranslation('kupononaylama4')?> : <?=nf($sonkupon['yatan']); ?> <?=getTranslation('parabirimi')?></div>

<div style="font-size: 13px;text-align: left;margin: 3px;"><?=getTranslation('kupononaylama5')?> : <?=nf($sonkupon['tutar']); ?> <?=getTranslation('parabirimi')?></div>

<div style="font-size: 13px;text-align: left;margin: 3px;"><?=getTranslation('kupononaylama6')?> : <?=nf($sonkupon['oran']); ?></div>

<div class="ticket_button_flex big_but big_font">
<a class="roll_red" href="javascript:;" onClick="virtualyazdir();"><?=getTranslation('kupononaylama7')?></a>
</div>

<div class="ticket_button_flex big_but big_font">
<a class="roll_red" href="javascript:;" onClick="virtualbirle();"><?=getTranslation('kupononaylama8')?></a>
</div>

<?

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

$kontrol = sed_sql_query("select mac_db_id,spor_tip,session_id,id from kupon where session_id='$session_id' and spor_tip='$spor_tip' and mac_db_id='$mac_db_id'");

if(sed_sql_numrows($kontrol)<1) {

sed_sql_query("insert into kupon (id,mbs,mac_kodu,ev_takim,konuk_takim,mac_db_id,mac_time,mac_time_kontrol,oran_val_id,oran_tip,oran_val,oran,session_id,spor_tip,oyun_tip,bulten,sonucid,ilkgiris) 

values ('','$mbs','$mac_kodu','$ev_takim','$konuk_takim','$mac_db_id','$mac_time','$mac_time','$oran_val_id','$oran_tip','$oranval','$oran','$session_id','$spor_tip','$oyun_tip','$bulten','$sonuc_id','$suan')");

die("201");

} else {

$kupondaki = sed_sql_fetchassoc($kontrol);

sed_sql_query("update kupon set oran_val_id='$oran_val_id',oran_tip='$oran_tip',oran='$oran',oran_val='$oranval' where id='$kupondaki[id]'");

die("200");

}

}

if($a=="kuponsil") {

$id = gd("id");

sed_sql_query("delete from kupon where id='$id' and session_id='$session_id'");	

}

if($a=="kupontemizle") {

sed_sql_query("delete from kupon where session_id='$session_id'");

die("11");

}



if($a=="kuponguncelle") {

if(userayar('sistemkapat')=="1" || userayar('kuponalim')=="0") { die("<div class='bos' style='text-align: center;font-weight: bold;margin: 5px;'>".getTranslation('sistemdebahislerkapali')."</div>"); }



?>

<script>

$(".corantable li").removeClass('secilicanli');

$(".qbut").removeClass('on');

$(".bm .bet").removeClass('secilicanli');

</script>

<?

$oran = 1;

$sor = sed_sql_query("select * from kupon where session_id='$session_id' order by id asc");

if(sed_sql_numrows($sor)<1) {

$bos = 1;

?>

<div class="ticketText"><?=getTranslation('kuponbos')?></div>

<div class="ticket_button_flex big_but big_font">
<a class="roll_red" href="javascript:;" onClick="sonkupon();"><?=getTranslation('sonkupon')?></a>
</div>

<? } else { ?>

<div class="kupon">

<? 

while($row=sed_sql_fetcharray($sor)) {

?>

<script>

var cbetsss = $("#<?=md5("$row[oran_tip]|$row[mac_db_id]"); ?>");

if(cbetsss.length>0) { cbetsss.addClass('on'); }

</script>

<?
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

<table class="event_head">
<tbody>
<tr>
<td class="pad_l_5"></td>
<td><?="".$row['ev_takim']." - ".$row['konuk_takim'].""; ?></td>
<td class="close">
<div class="cursor right" onclick="kuponsil('<?=$row['id']; ?>');">
<img src="assets/event_close-AB28012D32BBAD5C4C6127F5396406AA.gif" width="11" height="11">
</div>
</td>
</tr>
</tbody>
</table>
<table class="event">
<tbody>
<tr>
<td class="check">
<div class="cursor" ><img src="assets/checkbox_on-40687EE54C4A0F6A6205CA304197C9E4.png" width="11" height="11"></div>
<? if($row['mac_time']<time() && $row['spor_tip']!="canli" && $row['spor_tip']=="futbol") { $oynanamaz=1; ?>
<div class="fly_info_layer warn_b" style="margin-top: -35px">
<div class="text big left"><?=getTranslation('etkinlikbasladi')?></div>
<div class="but_close right" onclick="hideDetailMessages();"></div>
<div class="clear"></div>
</div>
<? } ?>

<? if($row['mac_time']<time() && $row['spor_tip']!="canlib" && $row['spor_tip']=="basketbol") { $oynanamaz=1; ?>
<div class="fly_info_layer warn_b" style="margin-top: -35px">
<div class="text big left"><?=getTranslation('etkinlikbasladi')?></div>
<div class="but_close right" onclick="hideDetailMessages();"></div>
<div class="clear"></div>
</div>
<? } ?>

<? if($row['mac_time']<time() && $row['spor_tip']!="canlit" && $row['spor_tip']=="tenis") { $oynanamaz=1; ?>
<div class="fly_info_layer warn_b" style="margin-top: -35px">
<div class="text big left"><?=getTranslation('etkinlikbasladi')?></div>
<div class="but_close right" onclick="hideDetailMessages();"></div>
<div class="clear"></div>
</div>
<? } ?>

<? if($row['mac_time']<time() && $row['spor_tip']!="canliv" && $row['spor_tip']=="voleybol") { $oynanamaz=1; ?>
<div class="fly_info_layer warn_b" style="margin-top: -35px">
<div class="text big left"><?=getTranslation('etkinlikbasladi')?></div>
<div class="but_close right" onclick="hideDetailMessages();"></div>
<div class="clear"></div>
</div>
<? } ?>

<? if($row['mac_time']<time() && $row['spor_tip']!="canlibuz" && $row['spor_tip']=="buzhokeyi") { $oynanamaz=1; ?>
<div class="fly_info_layer warn_b" style="margin-top: -35px">
<div class="text big left"><?=getTranslation('etkinlikbasladi')?></div>
<div class="but_close right" onclick="hideDetailMessages();"></div>
<div class="clear"></div>
</div>
<? } ?>

<? if($row['mac_time']<time() && $row['spor_tip']!="canlimt" && $row['spor_tip']=="masatenisi") { $oynanamaz=1; ?>
<div class="fly_info_layer warn_b" style="margin-top: -35px">
<div class="text big left"><?=getTranslation('etkinlikbasladi')?></div>
<div class="but_close right" onclick="hideDetailMessages();"></div>
<div class="clear"></div>
</div>
<? } ?>

<? if($row['mac_time']<time() && $row['spor_tip']=="beyzbol") { $oynanamaz=1; ?>
<div class="fly_info_layer warn_b" style="margin-top: -35px">
<div class="text big left"><?=getTranslation('etkinlikbasladi')?></div>
<div class="but_close right" onclick="hideDetailMessages();"></div>
<div class="clear"></div>
</div>
<? } ?>

<? if($row['mac_time']<time() && $row['spor_tip']=="rugby") { $oynanamaz=1; ?>
<div class="fly_info_layer warn_b" style="margin-top: -35px">
<div class="text big left"><?=getTranslation('etkinlikbasladi')?></div>
<div class="but_close right" onclick="hideDetailMessages();"></div>
<div class="clear"></div>
</div>
<? } ?>

<? if($row['mac_time']<time() && $row['spor_tip']=="dovus") { $oynanamaz=1; ?>
<div class="fly_info_layer warn_b" style="margin-top: -35px">
<div class="text big left"><?=getTranslation('etkinlikbasladi')?></div>
<div class="but_close right" onclick="hideDetailMessages();"></div>
<div class="clear"></div>
</div>
<? } ?>

<? if($row['mac_time']<time() && $row['spor_tip']=="canli") { $oynanamaz=1; ?>
<div class="fly_info_layer shut_b" style="margin-top: -35px">
<div class="text big left"><?=getTranslation('tahmingecicikapali')?></div>
<div class="but_close right" onclick="hideDetailMessages();"></div>
<div class="clear"></div>
</div>
<? } ?>

<? if($row['mac_time']<time() && $row['spor_tip']=="canlib") { $oynanamaz=1; ?>
<div class="fly_info_layer shut_b" style="margin-top: -35px">
<div class="text big left"><?=getTranslation('tahmingecicikapali')?></div>
<div class="but_close right" onclick="hideDetailMessages();"></div>
<div class="clear"></div>
</div>
<? } ?>

<? if($row['mac_time']<time() && $row['spor_tip']=="canlit") { $oynanamaz=1; ?>
<div class="fly_info_layer shut_b" style="margin-top: -35px">
<div class="text big left"><?=getTranslation('tahmingecicikapali')?></div>
<div class="but_close right" onclick="hideDetailMessages();"></div>
<div class="clear"></div>
</div>
<? } ?>

<? if($row['mac_time']<time() && $row['spor_tip']=="canliv") { $oynanamaz=1; ?>
<div class="fly_info_layer shut_b" style="margin-top: -35px">
<div class="text big left"><?=getTranslation('tahmingecicikapali')?></div>
<div class="but_close right" onclick="hideDetailMessages();"></div>
<div class="clear"></div>
</div>
<? } ?>

<? if($row['mac_time']<time() && $row['spor_tip']=="canlibuz") { $oynanamaz=1; ?>
<div class="fly_info_layer shut_b" style="margin-top: -35px">
<div class="text big left"><?=getTranslation('tahmingecicikapali')?></div>
<div class="but_close right" onclick="hideDetailMessages();"></div>
<div class="clear"></div>
</div>
<? } ?>

<? if($row['mac_time']<time() && $row['spor_tip']=="canlimt") { $oynanamaz=1; ?>
<div class="fly_info_layer shut_b" style="margin-top: -35px">
<div class="text big left"><?=getTranslation('tahmingecicikapali')?></div>
<div class="but_close right" onclick="hideDetailMessages();"></div>
<div class="clear"></div>
</div>
<? } ?>

<? if($row['aktif']=="0") { $oynanamaz = 1; ?>
<div class="fly_info_layer shut_b" style="margin-top: -35px">
<div class="text big left"><?=getTranslation('tahmingecicikapali')?></div>
<div class="but_close right" onclick="hideDetailMessages();"></div>
<div class="clear"></div>
</div>
<? } ?>

</td>
<td>
<div class="tipp "><?=$secilen_translate;?> / <?=$secilen_translate2;?> <? if($row['oran_val']!="") { echo "($row[oran_val])"; } ?></div>
</td>
<td>
<div data-qa="betSlipOdds" class="quote"><?=$row['oran']; ?></div>
</td>
</tr>

</tbody>
</table>

<?

$idcode = idcode("$row[mac_db_id]$row[spor_tip]$row[oran_val_id]");

?>

<script>

var cbet = jQuery(".qbut-<?=md5("$row[oran_tip]|$row[mac_db_id]"); ?>");

if(cbet.length>0) { cbet.addClass('on'); }

var cbet2 = jQuery(".qbut-<?=md5("$row[oran_val_id]|$row[mac_db_id]"); ?>");

if(cbet2.length>0) { cbet2.addClass('on'); }

var obet = jQuery(".qbut-<?=md5("$row[oran_tip]|$row[canli_event]"); ?>");

if(obet.length>0) { obet.addClass('on'); } else { jQuery(".morebet<?=$row['mac_db_id'];?>").addClass('on'); }

</script>

<? } ?>

</div>

<? } 



$toplammac = sed_sql_numrows($sor);

$maxmbs = bilgi("select MAX(mbs) as enmbs from kupon where session_id='$session_id'");

if($maxmbs['enmbs']>$toplammac) {

$mbshata = 1;

?>

<center style="font-size: 14px;margin: 5px;">
<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
<span class="red" style="color:#000;"><?=getTranslation('minimumbahis1')?> (<?=$maxmbs['enmbs']-$toplammac;?>)  <?=getTranslation('minimumbahis2')?></span>
</center>
<? } else if($oran>1 && $oran<userayar('minoran')) {

$oranhata = 1;

?>

<center style="font-size: 11px;margin: 1px;padding: 5px;border: 1px solid #f74835;background-color: #f74835;">
<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
<span class="red" style="color:#000;"><?=getTranslation('kuponenaz1')?> <strong>(<?=userayar('minoran');?>)</strong> <?=getTranslation('kuponenaz2')?></span>
</center>
<? } else if($oran>1 && $oran>userayar('maxoran')) {

$oranhatamaxoran = 1;

} ?>

<? if(!$bos) { ?>

<input type="hidden" id="counts" value="15" />

<div class="kuponalt">

<div class="right"><a class="remove_all red align_r" href="javascript:;"  id="sistemm1" onClick="kupontemizle();" style="text-decoration:underline;"><?=getTranslation('kupontumunusil')?></a></div>

<div class="kuponde">

<?



$kuponyatan = gd("kuponyatan");

if($kuponyatan=="undefined") { $kuponyatan=""; }



$telefon = gd("telefon");

if($telefon=="undefined") { $telefon = ""; }



$kuponisim = gd("kuponisim");

if($kuponisim=="undefined") { $kuponisim = ""; }

?>

<div class="space_3 clear"></div>
<div class="space_3 clear"></div>
<div class="space_3 clear"></div>
<div class="stakeButtons barmiddle center">
<a onclick="totalbet('30')" class="roll_red"><div role="button" class="stakeLevel  left"><?=getTranslation('kuponfiyatekle30')?></div></a>
<a onclick="totalbet('150')" class="roll_red"><div role="button" class="stakeLevel  left"><?=getTranslation('kuponfiyatekle150')?></div></a>
<a onclick="totalbet('300')" class="roll_red"><div role="button" class="stakeLevel  left"><?=getTranslation('kuponfiyatekle300')?></div></a>
<a onclick="totalbet('totals')" class="roll_red"><div role="button" id="customStake" class="stakeFour stakeLevel  left">...</div></a>
</div>

<div class="space_30 bg_midgrey"></div>

<div class="col bg_midgrey">
<div class="left"><?=getTranslation('kuponkuponadi')?></div>
<div class="right" style="margin-right:5px;">
<input type="text" id="kuponisim" value="<?=$kuponisim;?>" class="input" autocomplete="off">
</div>
<div class="clear"></div>
</div>

<div class="col bg_midgrey" style="display:none;">
<div class="left"><?=getTranslation('kuponkupontelefon')?></div>
<div class="right" style="margin-right:5px;">
<input type="text" id="telefon" value="<?=$telefon;?>" class="miktar" autocomplete="off" placeholder="05323332211" maxlength="11" onkeypress="return SadeceRakam(event);" onblur="SadeceRakamBlur(event,true);">
</div>
<div class="clear"></div>
</div>


<?

$maxodeme = userayar("max_odeme");

if($kuponyatan=="") { $kuponyatan = userayar('min_kupon_tutar'); }

?>

<div class="col bg_midgrey">
<div class="left"><?=getTranslation('kuponkupontoplamoran')?></div>
<div class="right" style="margin-right:5px;"><span id="toplamoranhesap"><?=nf($oran);?></span></div>
<div class="clear"></div>
</div>

<div class="col bg_midgrey">
<div class="left"><?=getTranslation('kuponkuponbahis')?></div>
<div class="right" style="margin-right:5px;">
<input type="text" class="input" id="kuponyatan" value="<?=$kuponyatan;?>" onkeypress="return SadeceRakam(event);" onblur="SadeceRakamBlur(event,true);">
</div>
<div class="clear"></div>
</div>

<div class="col bg_midgrey">
<div class="left"><?=getTranslation('kuponkuponmakskazanc')?>:</div>
<div class="right" style="margin-right:5px;" id="mkazanc"><span id="tutarhesap"><?=number_format($oran*$kuponyatan,2,".",","); ?></span></div>
<div class="clear"></div>
</div>

<div class="space_3 clear"></div>
<div class="clear"></div>
<div class="space_9"></div>


<div id="comp-alocb" class="e_active reducedQuotesTextBox">
<label class="reducedQuotes">
<input id="acceptLiveOddsCheckBox" onchange="toggleAcceptLiveOdds(this);" checked="checked" type="checkbox"><?=getTranslation('kuponkuponorandegisiklik')?>
</label>
	
</div>

<div class="ticket_button_flex big_but big_font">
<a class="roll_red" href="javascript:;" id="editorForm:reactionRepeat:0:cmdReaction" onClick="kuponok();"><?=getTranslation('kuponkuponbahsiniyap')?></a>
</div>
<div class="space_3"></div>

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

<script> failcont('<?=getTranslation('failconthata')?>','<?=getTranslation('failconthata1')?>'); </script>

<? } } ?>



<script>
function totalbet(data){
if(data=="totals"){
jQuery('#kuponyatan').click();
} else {
jQuery('#kuponyatan').val(data);
var yansit = $("#kuponyatan").val()*$("#toplamoran").val()
var yatani = $("#kuponyatan").val();
if(yatani><?=userayar("aynikupon_max_tutar"); ?>) {
failcont('<?=getTranslation('failconthata')?>','<?=getTranslation('failconthata2')?> <?=nf(userayar("aynikupon_max_tutar")); ?>');
$("#kuponyatan").val(0);
golalen();
} else { var tutar = nf(yansit); }
$("#tutarhesap").html(tutar);
}

}

function birle() {
$("#cupdate").val('1');
$("#kuponalan2").html('');
$("#kuponalan2").hide();
$("#kuponalan").show();
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
failcont('<?=getTranslation('failconthata')?>','<?=getTranslation('failconthata2')?> <?=nf(userayar("aynikupon_max_tutar")); ?>');
$("#kuponyatan").val(0);
golalen();
} else { var tutar = nf(yansit); }
$("#tutarhesap").html(tutar);
});

});




function kuponok() {
	$("#cupdate").val('0');
	var rand = Math.random();
	$.get('ajax.php?a=firstsec&rand='+rand+'',function(data) { });
	$("#counts").val(1);
	var oynanamaz = $("#oynanamaz").val();
	var mbshata = $("#mbshata").val();
	var kuponyatan = $("#kuponyatan").val();
	var adonet = $("#adonet").val();
	var oranhata = $("#oranhata").val();
	var oranhatamaxoran = $("#oranhatamaxoran").val();
	if(adonet=="1") { failcont('<?=getTranslation('failconthata')?>','<?=getTranslation('failconthata3')?>'); $("#cupdate").val('1'); } else
	if(kuponyatan><?=$ub['bakiye'];?>) { failcont('<?=getTranslation('failconthata')?>','<?=getTranslation('failconthata4')?>'); $("#cupdate").val('1'); kuponguncelle(0); } else
	if(kuponyatan<<?=userayar('min_kupon_tutar');?> || kuponyatan<1) { failcont('<?=getTranslation('failconthata')?>','<?=getTranslation('failconthata5')?> <?=userayar('min_kupon_tutar'); ?> <?=getTranslation('failconthata6')?>'); $("#cupdate").val('1'); kuponguncelle(0); } else
	if(oynanamaz==1) { failcont('<?=getTranslation('failconthata')?>','<?=getTranslation('failconthata7')?>'); $("#cupdate").val('1'); kuponguncelle(0); } else
	if(mbshata==1) { failcont('<?=getTranslation('failconthata')?>','<?=getTranslation('failconthata8')?> <?=$maxmbs['enmbs']-$toplammac;?> <?=getTranslation('failconthata9')?>'); $("#cupdate").val('1'); kuponguncelle(0); } else 
	if(oranhata==1) { failcont('<?=getTranslation('failconthata')?>','<?=getTranslation('failconthata10')?> <?=userayar('minoran');?> <?=getTranslation('failconthata11')?>'); $("#cupdate").val('1'); kuponguncelle(0); } else
	if(oranhatamaxoran==1) { failcont('<?=getTranslation('failconthata')?>','<?=getTranslation('failconthata12')?> <?=userayar('maxoran');?> <?=getTranslation('failconthata13')?>'); $("#cupdate").val('1'); kuponguncelle(0); } else
	{
	$("#cupdate").val('0');
	$(".kuponalt").slideUp('fast',function() { 
	var rand = Math.random();
	var telefon = $("#telefon").val();
	var kuponisim = $("#kuponisim").val();
	var toplamoran = $("#toplamoran").val();
	var canlidurum = $("#canlivar").val();
	<? if($canlivar) { ?>
	$("#livelock").fadeIn('fast');
	$("#delay_layer").slideDown('fast');
	$("#cupdate").val('0');
	var kontra = setInterval(function() { $("#cupdate").val('0'); console.log('cupdates'); },500);
	setTimeout(function() { kuponokson('<?=time();?>'); clearInterval(kontra); },<?=userayar('canli_sure'); ?>000);
	<? } else { ?>
	$("#cupdate").val('0');
	kuponokson();
	<? } ?>
	});
	}
}

function kupononaygoruntule() {
$.get('ajax.php?a=kupononaygoruntule',function(data) {
$("#kuponalan2").html(data);
$("#kuponalan2").show();
$("#kuponalan").hide();
});
}

function kuponokson(ts) {
	$("#cupdate").val('0');
	var rand = Math.random();
	var telefon = $("#telefon").val();
	var isim = $("#kuponisim").val();
	var toplamoran = $("#toplamoran").val();
	var tutar = $("#kuponyatan").val();
	$.ajax({
		url: "ajax.php?a=kuponok&rand="+rand+"",
		type: "POST",
		data: "tutar="+tutar+"&kuponadi="+isim+"&telefon="+telefon+"&toplammac=<?=$toplammac;?>&cv=<?=$cv;?>&cc="+ts+"",
		success: function(data) {
			var datasss = $.parseJSON(data);
			if(data=="643") { alert('Küsüratlı Kupon Oynama Yasaklanmıştır.'); $("#cupdate").val('1'); kuponguncelle(0); } else
			if(datasss.status == 123) { failcont('Hata',''+datasss.message+''); $("#cupdate").val('1'); kuponguncelle(0); } else
			if(data=="402") { failcont('<?=getTranslation('failconthata')?>','<?=getTranslation('failconthata14')?>'); $("#cupdate").val('1'); kuponguncelle(0); } else
			if(data=="404") { failcont('<?=getTranslation('failconthata')?>','<?=getTranslation('failconthata15')?>'); $("#cupdate").val('1'); kuponguncelle(0); } else
			if(data=="405") { failcont('<?=getTranslation('failconthata')?>','<?=getTranslation('failconthata16')?> <?=userayar('max_odeme'); ?> <?=getTranslation('failconthata17')?>'); $("#cupdate").val('1'); kuponguncelle(0); } else
			if(data=="406") { failcont('<?=getTranslation('failconthata')?>','<?=getTranslation('failconthata18')?> <?=userayar('tekmac_max_tutar'); ?> <?=getTranslation('failconthata17')?>'); $("#cupdate").val('1'); kuponguncelle(0); } else
			if(data=="200") {
				limitupdate();
				$("#cupdate").val('0');			
				<? if($ub['yazdirsor']=="1") { ?>
				if(confirm('<?=getTranslation('kuponkuponyazdirma')?>')) {
				kuponyazdir('son');
				}
				<? } ?>
				<? if($ub['otosil']=="0") { ?>
				$("#sistemm1").trigger('click');
				<? } ?>
				kupononaygoruntule();
			}
			$(".kuponalt").slideDown('fast');
			$("#delay_layer").slideUp('fast');
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

if($a=="kupononaygoruntule") {

$sonkupon = bilgi("select * from kuponlar where session_id='$session_id' order by id desc limit 1");

?>

<div style="font-size: 13px;font-weight: bold;color: #60b704;"><i class="fa fa-check" aria-hidden="true"></i> <?=getTranslation('kupononaylama1')?> ( <?=$sonkupon['id'];?> )</div>

<div style="font-size: 13px;text-align: left;margin: 3px;"><?=getTranslation('kupononaylama2')?></div>

<div style="font-size: 13px;text-align: left;margin: 3px;"><?=getTranslation('kupononaylama3')?> : <?=turkce_tarih($sonkupon['kupon_time']); ?> <?=date("H:i",$sonkupon['kupon_time']);?></div>

<div style="font-size: 13px;text-align: left;margin: 3px;"><?=getTranslation('kupononaylama4')?> : <?=nf($sonkupon['yatan']); ?> <?=getTranslation('parabirimi')?></div>

<div style="font-size: 13px;text-align: left;margin: 3px;"><?=getTranslation('kupononaylama5')?> : <?=nf($sonkupon['tutar']); ?> <?=getTranslation('parabirimi')?></div>

<div style="font-size: 13px;text-align: left;margin: 3px;"><?=getTranslation('kupononaylama6')?> : <?=nf($sonkupon['oran']); ?></div>

<div class="kupon">

<? 
$sor = sed_sql_query("select * from kupon_ic where kupon_id='$sonkupon[id]'");

while($row=sed_sql_fetcharray($sor)) {

$oranbilgi_bol = explode("|",$row['oran_tip']);

$secim_yapimi_kuponguncelle = $oranbilgi_bol[0];
$secim_yapimi_kuponguncelle2 = $oranbilgi_bol[1];

if($row['spor_tip']=="futbol") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('foran1');
} else if($secim_yapimi_kuponguncelle=="Handikap (0:1)"){
$secilen_translate = getTranslation('foran2');
} else if($secim_yapimi_kuponguncelle=="Handikap (1:0)"){
$secilen_translate = getTranslation('foran3');
} else if($secim_yapimi_kuponguncelle=="Handikap (0:2)"){
$secilen_translate = getTranslation('foran4');
} else if($secim_yapimi_kuponguncelle=="Handikap (2:0)"){
$secilen_translate = getTranslation('foran5');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 1.YARI )"){
$secilen_translate = getTranslation('foran6');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 2.YARI )"){
$secilen_translate = getTranslation('foran7');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Çifte Şans"){
$secilen_translate = getTranslation('foran8');
} else if($secim_yapimi_kuponguncelle=="1.YARI KG"){
$secilen_translate = getTranslation('foran9');
} else if($secim_yapimi_kuponguncelle=="Beraberlikte İade"){
$secilen_translate = getTranslation('foran10');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 0.5"){
$secilen_translate = getTranslation('foran11');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran12');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran13');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran14');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 4.5"){
$secilen_translate = getTranslation('foran15');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran16');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 0.5"){
$secilen_translate = getTranslation('foran18');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran19');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran20');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran21');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 0.5"){
$secilen_translate = getTranslation('foran22');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran23');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran24');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran25');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Gol Atarmı ?"){
$secilen_translate = getTranslation('foran26');
} else if($secim_yapimi_kuponguncelle=="Deplasman Gol Atarmı ?"){
$secilen_translate = getTranslation('foran27');
} else if($secim_yapimi_kuponguncelle=="Karşılıklı Gol"){
$secilen_translate = getTranslation('foran28');
} else if($secim_yapimi_kuponguncelle=="​​​​​1.Yarı Tek/Çift"){
$secilen_translate = getTranslation('foran29');
} else if($secim_yapimi_kuponguncelle=="Tek/Çift"){
$secilen_translate = getTranslation('foran30');
} else if($secim_yapimi_kuponguncelle=="Evsahibi Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran31');
} else if($secim_yapimi_kuponguncelle=="Deplasman Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran32');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran33');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 2.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran34');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran35');
} else if($secim_yapimi_kuponguncelle=="Deplasman 2.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran36');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı A/Ü 0.5"){
$secilen_translate = getTranslation('foran37');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı A/Ü 1.5"){
$secilen_translate = getTranslation('foran38');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı A/Ü 0.5"){
$secilen_translate = getTranslation('foran39');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı A/Ü 1.5"){
$secilen_translate = getTranslation('foran40');
} else if($secim_yapimi_kuponguncelle=="Evsahibi A/Ü 1.5"){
$secilen_translate = getTranslation('foran41');
} else if($secim_yapimi_kuponguncelle=="Deplasman A/Ü 1.5"){
$secilen_translate = getTranslation('foran42');
} else if($secim_yapimi_kuponguncelle=="​​​​​Evsahibi Her 2 yarıda Gol Atar ?"){
$secilen_translate = getTranslation('foran43');
} else if($secim_yapimi_kuponguncelle=="Deplasman Her 2 yarıda Gol Atar ?"){
$secilen_translate = getTranslation('foran44');
} else if($secim_yapimi_kuponguncelle=="Hangi Devrede Fazla Gol Olur"){
$secilen_translate = getTranslation('foran45');
} else if($secim_yapimi_kuponguncelle=="Evsahibi Hangi Devrede Fazla Gol Atar ?"){
$secilen_translate = getTranslation('foran46');
} else if($secim_yapimi_kuponguncelle=="Deplasman Hangi Devrede Fazla Gol Atar ?"){
$secilen_translate = getTranslation('foran47');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-4+)"){
$secilen_translate = getTranslation('foran48');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-5+)"){
$secilen_translate = getTranslation('foran49');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-6+)"){
$secilen_translate = getTranslation('foran50');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 1 gol farkla kazanır mı?"){
$secilen_translate = getTranslation('foran51');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 2 gol farkla kazanır mı?"){
$secilen_translate = getTranslation('foran52');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 3 gol farkla kazanır mı?"){
$secilen_translate = getTranslation('foran53');
} else if($secim_yapimi_kuponguncelle=="1X2 ve toplam gol sayısı"){
$secilen_translate = getTranslation('foran54');
} else if($secim_yapimi_kuponguncelle=="Maç sonucu ve karşılıklı goller"){
$secilen_translate = getTranslation('foran55');
} else if($secim_yapimi_kuponguncelle=="İlk Yarı / Maç Sonucu"){
$secilen_translate = getTranslation('foran56');
} else if($secim_yapimi_kuponguncelle=="Skor Bahsi (90 Dakika)"){
$secilen_translate = getTranslation('foran57');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('foran58');
} else if($secim_yapimi_kuponguncelle=="Toplam Sari Kart Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran59');
} else if($secim_yapimi_kuponguncelle=="Kirmizi kart cikar mi?"){
$secilen_translate = getTranslation('foran60');
} else if($secim_yapimi_kuponguncelle=="Macta kac tane penalti olur?"){
$secilen_translate = getTranslation('foran61');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran62');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran63');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran64');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran65');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran66');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran67');
} else if($secim_yapimi_kuponguncelle=="Sarı Kart Toplam Tek/Çift"){
$secilen_translate = getTranslation('foran68');
} else if($secim_yapimi_kuponguncelle=="Hangi Takım Çok Sarı Kart Yer ?"){
$secilen_translate = getTranslation('foran69');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran70');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 6.5"){
$secilen_translate = getTranslation('foran71');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 7.5"){
$secilen_translate = getTranslation('foran72');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 8.5"){
$secilen_translate = getTranslation('foran73');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 9.5"){
$secilen_translate = getTranslation('foran74');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 10.5"){
$secilen_translate = getTranslation('foran75');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 11.5"){
$secilen_translate = getTranslation('foran76');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 12.5"){
$secilen_translate = getTranslation('foran77');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 13.5"){
$secilen_translate = getTranslation('foran78');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 14.5"){
$secilen_translate = getTranslation('foran79');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 15.5"){
$secilen_translate = getTranslation('foran80');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran81');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran82');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 4.5"){
$secilen_translate = getTranslation('foran83');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran84');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 6.5"){
$secilen_translate = getTranslation('foran85');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 7.5"){
$secilen_translate = getTranslation('foran86');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 8.5"){
$secilen_translate = getTranslation('foran87');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 9.5"){
$secilen_translate = getTranslation('foran88');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 10.5"){
$secilen_translate = getTranslation('foran89');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran90');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran91');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 4.5"){
$secilen_translate = getTranslation('foran92');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran93');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 6.5"){
$secilen_translate = getTranslation('foran94');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 7.5"){
$secilen_translate = getTranslation('foran95');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 8.5"){
$secilen_translate = getTranslation('foran96');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 9.5"){
$secilen_translate = getTranslation('foran97');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 10.5"){
$secilen_translate = getTranslation('foran98');
} else if($secim_yapimi_kuponguncelle=="Korner Toplam Tek/Çift"){
$secilen_translate = getTranslation('foran99');
} else if($secim_yapimi_kuponguncelle=="Hangi Takım Çok Korner Kullanır ?"){
$secilen_translate = getTranslation('foran100');
}

} else if($row['spor_tip']=="basketbol") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ?"){
$secilen_translate = getTranslation('boran1');
} else if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('boran2');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 1.YARI )"){
$secilen_translate = getTranslation('boran3');
} else if($secim_yapimi_kuponguncelle=="Toplam Skor Tek/Çift"){
$secilen_translate = getTranslation('boran4');
} else if($secim_yapimi_kuponguncelle=="Toplam Skor Alt/Üst"){
$secilen_translate = getTranslation('boran5');
} else if($secim_yapimi_kuponguncelle=="Handikap ( 1.YARI )"){
$secilen_translate = getTranslation('boran6');
} else if($secim_yapimi_kuponguncelle=="Handikap"){
$secilen_translate = getTranslation('boran7');
} else if($secim_yapimi_kuponguncelle=="1.Yarı / MS"){
$secilen_translate = getTranslation('boran8');
} else if($secim_yapimi_kuponguncelle=="İki Devrede Kazanır"){
$secilen_translate = getTranslation('boran9');
} else if($secim_yapimi_kuponguncelle=="Tüm Periyotları Kazanır"){
$secilen_translate = getTranslation('boran10');
} else if($secim_yapimi_kuponguncelle=="1.Takım İY Alt/Üst"){
$secilen_translate = getTranslation('boran11');
} else if($secim_yapimi_kuponguncelle=="2.Takım İY Alt/Üst"){
$secilen_translate = getTranslation('boran12');
}

}  else if($row['spor_tip']=="tenis") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ?"){
$secilen_translate = getTranslation('toran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahsi"){
$secilen_translate = getTranslation('toran2');
} else if($secim_yapimi_kuponguncelle=="1.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('toran3');
} else if($secim_yapimi_kuponguncelle=="2.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('toran4');
} else if($secim_yapimi_kuponguncelle=="1.Oyuncu 1 Set Kazanır"){
$secilen_translate = getTranslation('toran5');
} else if($secim_yapimi_kuponguncelle=="2.Oyuncu 1 Set Kazanır"){
$secilen_translate = getTranslation('toran6');
}

} else if($row['spor_tip']=="voleybol") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ?"){
$secilen_translate = getTranslation('voran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahsi"){
$secilen_translate = getTranslation('voran2');
} else if($secim_yapimi_kuponguncelle=="Toplam Alt/Üst"){
$secilen_translate = getTranslation('voran3');
} else if($secim_yapimi_kuponguncelle=="5 Set Sürermi ?"){
$secilen_translate = getTranslation('voran4');
}

} else if($row['spor_tip']=="buzhokeyi") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('buzoran1');
} else if($secim_yapimi_kuponguncelle=="1.P 1X2"){
$secilen_translate = getTranslation('buzoran2');
} else if($secim_yapimi_kuponguncelle=="2.P 1X2"){
$secilen_translate = getTranslation('buzoran3');
} else if($secim_yapimi_kuponguncelle=="3.P 1X2"){
$secilen_translate = getTranslation('buzoran4');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('buzoran5');
} else if($secim_yapimi_kuponguncelle=="1.P Çifte Şans"){
$secilen_translate = getTranslation('buzoran6');
} else if($secim_yapimi_kuponguncelle=="2.P Çifte Şans"){
$secilen_translate = getTranslation('buzoran7');
} else if($secim_yapimi_kuponguncelle=="3.P Çifte Şans"){
$secilen_translate = getTranslation('buzoran8');
}

} else if($row['spor_tip']=="masatenisi" || $row['spor_tip']=="beyzbol" || $row['spor_tip']=="rugby" || $row['spor_tip']=="dovus") {

$secilen_translate = $secim_yapimi_kuponguncelle;

} else if($row['spor_tip']=="canli") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('fcanlioran1');
} else if($secim_yapimi_kuponguncelle=="Handikap 1:0"){
$secilen_translate = getTranslation('fcanlioran2');
} else if($secim_yapimi_kuponguncelle=="Handikap 2:0"){
$secilen_translate = getTranslation('fcanlioran3');
} else if($secim_yapimi_kuponguncelle=="Handikap 0:1"){
$secilen_translate = getTranslation('fcanlioran4');
} else if($secim_yapimi_kuponguncelle=="Handikap 0:2"){
$secilen_translate = getTranslation('fcanlioran5');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('fcanlioran6');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Çifte Şans"){
$secilen_translate = getTranslation('fcanlioran7');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran8');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran9');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran10');
} else if($secim_yapimi_kuponguncelle=="Toplam 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran11');
} else if($secim_yapimi_kuponguncelle=="Toplam 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran12');
} else if($secim_yapimi_kuponguncelle=="Toplam 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran13');
} else if($secim_yapimi_kuponguncelle=="Toplam 3.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran14');
} else if($secim_yapimi_kuponguncelle=="Toplam 4.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran15');
} else if($secim_yapimi_kuponguncelle=="Toplam 5.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran16');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran17');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran18');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran19');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 3.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran20');
} else if($secim_yapimi_kuponguncelle=="Karşılıklı Gol Olurmu ?"){
$secilen_translate = getTranslation('fcanlioran21');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Müsabakada Gol Atarmı ?"){
$secilen_translate = getTranslation('fcanlioran22');
} else if($secim_yapimi_kuponguncelle=="Deplasman Müsabakada Gol Atarmı ?"){
$secilen_translate = getTranslation('fcanlioran23');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Tek / Çift"){
$secilen_translate = getTranslation('fcanlioran24');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Tek / Çift"){
$secilen_translate = getTranslation('fcanlioran25');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Karşılıklı Gol"){
$secilen_translate = getTranslation('fcanlioran26');
} else if($secim_yapimi_kuponguncelle=="Maç Sonucu ve Karşılıklı Gol"){
$secilen_translate = getTranslation('fcanlioran27');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran28');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran29');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran30');
} else if($secim_yapimi_kuponguncelle=="Deplasman 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran31');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran32');
} else if($secim_yapimi_kuponguncelle=="Deplasman 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran33');
} else if($secim_yapimi_kuponguncelle=="Toplam Kaç Gol Atılır ?"){
$secilen_translate = getTranslation('fcanlioran34');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Toplam Kaç Gol Atar ?"){
$secilen_translate = getTranslation('fcanlioran35');
} else if($secim_yapimi_kuponguncelle=="Deplasman Toplam Kaç Gol Atar ?"){
$secilen_translate = getTranslation('fcanlioran36');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Skoru"){
$secilen_translate = getTranslation('fcanlioran37');
} else if($secim_yapimi_kuponguncelle=="Maç Skoru"){
$secilen_translate = getTranslation('fcanlioran38');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran39');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran40');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran41');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran42');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran43');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran44');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi İlk Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran45');
} else if($secim_yapimi_kuponguncelle=="Ev sahibi İkinci Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran46');
} else if($secim_yapimi_kuponguncelle=="Deplasman İlk Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran47');
} else if($secim_yapimi_kuponguncelle=="Deplasman İkinci Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran48');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 1 Gol Farkla Kazanirmi ?"){
$secilen_translate = getTranslation('fcanlioran49');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 2 Gol Farkla Kazanirmi ?"){
$secilen_translate = getTranslation('fcanlioran50');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 3 Gol Farkla Kazanirmi ?"){
$secilen_translate = getTranslation('fcanlioran51');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Sonucu"){
$secilen_translate = getTranslation('fcanlioran52');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Sonucu"){
$secilen_translate = getTranslation('fcanlioran53');
} else if($secim_yapimi_kuponguncelle=="İlk Yarıda Kaç Gol Olur ?"){
$secilen_translate = getTranslation('fcanlioran54');
} else if($secim_yapimi_kuponguncelle=="2.Yarıda Toplam Kaç Gol Olur ?"){
$secilen_translate = getTranslation('fcanlioran55');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-4+)"){
$secilen_translate = getTranslation('fcanlioran56');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-5+)"){
$secilen_translate = getTranslation('fcanlioran57');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-6+)"){
$secilen_translate = getTranslation('fcanlioran58');
} else if($secim_yapimi_kuponguncelle=="1. yarıda 1.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran59');
} else if($secim_yapimi_kuponguncelle=="1.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran60');
} else if($secim_yapimi_kuponguncelle=="2.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran61');
} else if($secim_yapimi_kuponguncelle=="3.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran62');
} else if($secim_yapimi_kuponguncelle=="4.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran63');
} else if($secim_yapimi_kuponguncelle=="5.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran64');
} else if($secim_yapimi_kuponguncelle=="6.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran65');
} else {
$secilen_translate = $secim_yapimi_kuponguncelle;
}

} else if($row['spor_tip']=="canlib") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('bcanlioran1');
} else if($secim_yapimi_kuponguncelle=="1X2(1.YARI)"){
$secilen_translate = getTranslation('bcanlioran2');
} else if($secim_yapimi_kuponguncelle=="1X2(2.YARI)"){
$secilen_translate = getTranslation('bcanlioran3');
} else if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran4');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran5');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran6');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran7');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran8');
} else if($secim_yapimi_kuponguncelle=="Toplam Skor Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran9');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran10');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran11');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran12');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran13');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran14');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran15');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran16');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran17');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran18');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran19');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran20');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran21');
} else if($secim_yapimi_kuponguncelle=="Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran22');
}

} else if($row['spor_tip']=="canlit") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
$secilen_translate = getTranslation('tcanlioran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahisi"){
$secilen_translate = getTranslation('tcanlioran2');
}

} else if($row['spor_tip']=="canliv") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
$secilen_translate = getTranslation('vcanlioran1');
} else if($secim_yapimi_kuponguncelle=="1.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran2');
} else if($secim_yapimi_kuponguncelle=="2.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran3');
} else if($secim_yapimi_kuponguncelle=="3.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran4');
} else if($secim_yapimi_kuponguncelle=="4.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran5');
} else if($secim_yapimi_kuponguncelle=="Set bahisi (5 maç üzerinden)"){
$secilen_translate = getTranslation('vcanlioran6');
} else if($secim_yapimi_kuponguncelle=="Toplam Kaç Set Oynanır ?"){
$secilen_translate = getTranslation('vcanlioran7');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran8');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran9');
} else if($secim_yapimi_kuponguncelle=="1.Takım 1.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran10');
} else if($secim_yapimi_kuponguncelle=="2.Takım 1.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran11');
} else if($secim_yapimi_kuponguncelle=="1.Takım 2.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran12');
} else if($secim_yapimi_kuponguncelle=="2.Takım 2.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran13');
} else if($secim_yapimi_kuponguncelle=="1.Takım 3.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran14');
} else if($secim_yapimi_kuponguncelle=="2.Takım 3.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran15');
} else if($secim_yapimi_kuponguncelle=="1.Takım 4.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran16');
} else if($secim_yapimi_kuponguncelle=="2.Takım 4.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran17');
} else if($secim_yapimi_kuponguncelle=="Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran18');
} else if($secim_yapimi_kuponguncelle=="Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran19');
} else if($secim_yapimi_kuponguncelle=="1.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran20');
} else if($secim_yapimi_kuponguncelle=="2.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran21');
} else if($secim_yapimi_kuponguncelle=="3.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran22');
} else if($secim_yapimi_kuponguncelle=="4.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran23');
} else if($secim_yapimi_kuponguncelle=="Müsabaka 5.Set Sürermi"){
$secilen_translate = getTranslation('vcanlioran24');
}

} else if($row['spor_tip']=="canlibuz") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('buzcanlioran1');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('buzcanlioran2');
} else if($secim_yapimi_kuponguncelle=="Cifte Sans"){
$secilen_translate = getTranslation('buzcanlioran2');
} else if($secim_yapimi_kuponguncelle=="Hangi periyod daha cok gol olur?"){
$secilen_translate = getTranslation('buzcanlioran3');
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

<table class="event_head">
<tbody>
<tr>
<td class="pad_l_5"></td>
<td><?=$row['ev_takim'];?><br><?=$row['konuk_takim'];?></td>
<td style="width:35px;"><?=date("d-m H:i",$row['mac_time']);?></td>
</tr>
</tbody>
</table>
<table class="event">
<tbody>
<tr>
<td class="check">
<div class="cursor"><img src="assets/checkbox_on-40687EE54C4A0F6A6205CA304197C9E4.png" width="11" height="11"></div>
</td>
<td>
<div class="tipp "><?=$secilen_translate;?>&nbsp;<?=$secilen_translate2;?>&nbsp;<? if($row['oran_val']!="") { echo "($row[oran_val])"; } ?></div>
</td>
<td>
<div data-qa="betSlipOdds" class="quote"><?=nf($row['oran']);?></div>
</td>
</tr>
</tbody>
</table>

<? } ?>

</div>

<div class="ticket_button_flex big_but big_font">
<a class="roll_red" href="javascript:;" onClick="kuponyazdir('son');"><?=getTranslation('kupononaylama7')?></a>
</div>

<div class="ticket_button_flex big_but big_font">
<a class="roll_red" href="javascript:;" onClick="birle();"><?=getTranslation('kupononaylama8')?></a>
</div>

<div class="ticket_button_flex big_but big_font">
<a class="roll_red" href="javascript:;" onClick="birle(); sonkupon(1);"><?=getTranslation('kupononaylama9')?></a>
</div>
<?

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
} else if($row['oran_tip']=="Toplam 0.5 Gol Alt Üst|A"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Toplam 0.5 Gol Alt Üst|Ü"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Toplam 1.5 Gol Alt Üst|A"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Toplam 1.5 Gol Alt Üst|Ü"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Toplam 2.5 Gol Alt Üst|A"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Toplam 2.5 Gol Alt Üst|Ü"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Toplam 3.5 Gol Alt Üst|A"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Toplam 3.5 Gol Alt Üst|Ü"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Toplam 4.5 Gol Alt Üst|A"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Toplam 4.5 Gol Alt Üst|Ü"){
	$sira_ver = 2;
} else if($row['oran_tip']=="Toplam 5.5 Gol Alt Üst|A"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Toplam 5.5 Gol Alt Üst|Ü"){
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
} else if($row['oran_tip']=="Karşılıklı Gol Olurmu ?|E"){
	$sira_ver = 1;
} else if($row['oran_tip']=="Karşılıklı Gol Olurmu ?|H"){
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
} else if($row['oran_tip']=="1. yarıda 2.golü hangi takım atar?|1"){
	$sira_ver = 1;
} else if($row['oran_tip']=="1. yarıda 2.golü hangi takım atar?|X"){
	$sira_ver = 2;
} else if($row['oran_tip']=="1. yarıda 2.golü hangi takım atar?|2"){
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

if($ass['aktif']=="0") { unset($_SESSION['ilk_zaman']); die("404"); }

$mac_siralamas = base64_encode("$ass[mac_db_id]|$ass[oran_tip]|$ass[spor_tip]");

$mac_siralama .= "".$mac_siralamas."|";

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

if($kazanc>userayar('max_odeme')) { echo "405"; exit(); }

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

if($toplammac==1 && $kazanc>userayar('tekmac_max_tutar')) { echo "406"; exit(); }

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

sed_sql_query("insert into kupon_ic (id,mbs,mac_kodu,ev_takim,konuk_takim,mac_db_id,mac_time,oran_val_id,oran_tip,oran_val,oran,session_id,spor_tip,kupon_id,user_id,username,canli_info,bulten,ilkgiris,sonucid) values ('','$row[mbs]','$row[mac_kodu]','$row[ev_takim]','$row[konuk_takim]','$row[mac_db_id]','$row[mac_time_kontrol]','$row[oran_val_id]','$row[oran_tip]','$row[oran_val]','$orani_kupona_isle','$session_id','$row[spor_tip]','$kupon_id','$ub[id]','$ub[username]','$row[canli_info]','$row[bulten]','$row[ilkgiris]','$row[sonucid]')");

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



function mesajuygun($str) {

$o = array('İ','Ş','Ü','Ğ','Ç','Ö','ı','ş','ü','ğ','ö','ç',' ');

$s = array('i','s','u','g','c','o','i','s','u','g','o','c','');

return strtoupper(str_replace($o,$s,$str));	

}

function sendRequest($site_name,$send_xml,$header_type) {

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL,$site_name);

            curl_setopt($ch, CURLOPT_POST, 1);

            curl_setopt($ch, CURLOPT_POSTFIELDS,$send_xml);

            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,1);

            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);

            curl_setopt($ch, CURLOPT_HTTPHEADER,$header_type);

            curl_setopt($ch, CURLOPT_HEADER, 0);

            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

            curl_setopt($ch, CURLOPT_TIMEOUT, 120);

            $result = curl_exec($ch);

            return $result;

}

function MesajPaneliGonder($request){
		$request = "data=" . base64_encode(json_encode($request));
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'http://api.mesajpaneli.com/json_api/');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1) ;
		curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		$result = curl_exec($ch);
		curl_close($ch);
		return json_decode(base64_decode($result),TRUE);
		}



function mesajgonder($kupon_id,$telefon) {

	

$kuponbilgi = bilgi("select * from kuponlar where id='$kupon_id'");

$sor = sed_sql_query("select * from kupon_ic where kupon_id='$kupon_id'");

while($row=sed_sql_fetcharray($sor)) {

if($row['spor_tip']=="futbol") { 

$oranval = bilgi("select * from oran_val where id='$row[oran_val_id]'");

$msgline .= "$row[ev_takim]-$row[konuk_takim]:$oranval[smskod](".nf($row['oran'])."),";

} else {

	$ob = explode("|",$row['oran_tip']);

	$msgline .="$row[ev_takim]-$row[konuk_takim]-$ob[0]:$ob[1](".nf($row['oran'])."),";

}

}

$o = array('(',')','-',' ');

$s = array('','','','');

$msg = mesajuygun(substr($msgline,0,-1))." O:".nf($kuponbilgi['oran'])." - Y: ".nf($kuponbilgi['yatan'])." - K: ".nf($kuponbilgi['tutar'])."";



$tel = str_replace($o,$s,$telefon);

if(strlen($tel)>10) { $tel = substr($tel,1,20); }



$xml = '

<mainbody> 

<header> 

<company></company> 

<usercode>5377392148</usercode> 

<password>102030botan</password> 

<startdate></startdate> 

<stopdate></stopdate> 

<repeatpermission>1</repeatpermission>

<type>1:n</type> 

<msgheader></msgheader> 

<priority>1</priority>

</header>

<bodysms>

<mp> 

<msg>'.$msg.'</msg> 

<no>'.$tel.'</no> 

</mp>

</bodysms>

</mainbody>

';



$ouser = bilgi("select * from kullanici where id='$kuponbilgi[user_id]'");



if($ouser['smsbakiye']>0) {
sed_sql_query("update kullanici set smsbakiye=smsbakiye-1 where id='$ouser[id]'"); 


$mesajData['user'] = array(
		'name' => '5377490207',
		'pass' => '102030'
		);
		$mesajData['msgBaslik'] = "";
		$mesajData['msgData'][] = array(
		'tel' => $tel,
		'msg' => $msg
		);
MesajPaneliGonder($mesajData);


}





}

if($a=="detailfutbol") {

$mac_db_id=gd("id");

$mb = bilgi("select * from program_futbol where id='$mac_db_id'");

$fark = $mb['mac_time']-time();

$gizli_oran_tips = gizli_oran_tips($mb['kupa_id'],$mb['id']);

if($gizli_oran_tips!="") { $gizli_ekle = "and oran_tip not in ($gizli_oran_tips)"; } else { $gizli_ekle = ""; }

?>

<div class="sp_bets" style="display:block;">
<div class="border_ccc" style="margin: 5px">

<?
$orderle = "FIELD(oran_tip, '1', '2', '3', '4', '5', '6', '7', '58', '8', '28', '9', '10', '11', '12', '13', '14', '15', '16', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '30', '29', '31', '32', '33', '34', '35', '36', '41', '42', '37', '38', '39', '40', '43', '44', '45', '46', '47', '48', '49', '50', '51', '52', '53', '54', '101', '55', '56', '57', '60', '61', '68', '69', '99', '100', '59', '62', '63', '64', '65', '66', '67', '70', '71', '72', '73', '74', '75', '76', '77', '78', '79', '80', '81', '82', '83', '84', '85', '86', '87', '88', '89', '90', '91', '92', '93', '94', '95', '96', '97', '98') ASC";

$sor = sed_sql_query("select mac_db_id,oran_tip,durum,oran_val_id from oranlar_futbol where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' group by oran_tip order by {$orderle}");
$i = 1;
while($ass=sed_sql_fetchassoc($sor)) { 
$i++;
$tip = bilgi("select id,tip_isim,tip_kodu from oran_tip_futbol where id='$ass[oran_tip]'");

?>

<div class="<? if ($i %2 != 0){ ?>bg_othergrey<? }else{ ?>bg_grey<? } ?>">
<? if($tip['tip_kodu']==9){?>	
<div class="e_active row  cf rs-row jq-result-set-row" >

<div class="left pad_l_9 "><?=getTranslation('futboloran'.$tip['id'].'')?>&nbsp;<img src="/img/help-4225AD162BB529F588A34386848CA945.gif" alt="" class="helpIcon jq-helpbutton" width="11" height="11">
</div>

<div class="right multiline">
<div class="cf resultLines">
<?

$sss = sed_sql_query("select mac_db_id,oran_tip,oran_val_id,oran,yapi,durum from oranlar_futbol ora where mac_db_id='$mac_db_id' and durum='1' and oran_tip='$ass[oran_tip]' $gizli_ekle order by (select yapi from oran_val_futbol ov where ov.id=ora.oran_val_id) asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_futbol where id='$row[oran_val_id]'");
$mbs = mbsver($mb['id'],$mb['mbs'],$mb['kupa_id']);
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$mbs|$mb[mac_time]|futbol";
$buoran = oranbulxxx_futbol($mb['id'],$row['oran_val_id']);

?>

<div class="sp_bets_cell cf" style="width:84px; ">
<div class="quote_txt align_c" style="width: 42px;">

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
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 2.5"){ ?>1 and O 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 2.5"){ ?>2 and O 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 2.5"){ ?>1 and U 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 2.5"){ ?>2 and U 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 3.5"){ ?>1 and O 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 3.5"){ ?>2 and O 3.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 3.5"){ ?>1 and U 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 3.5"){ ?>2 and U 3.5
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
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 2.5"){ ?>1 und T 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 2.5"){ ?>2 und T 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 2.5"){ ?>1 und N 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 2.5"){ ?>2 und N 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 3.5"){ ?>1 und T 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 3.5"){ ?>2 und T 3.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 3.5"){ ?>1 und N 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 3.5"){ ?>2 und N 3.5
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
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 2.5"){ ?>1 وما فوق 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 2.5"){ ?>2 وما فوق 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 2.5"){ ?>1 و السفلى 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 2.5"){ ?>2 و السفلى 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 3.5"){ ?>1 وما فوق 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 3.5"){ ?>2 وما فوق 3.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 3.5"){ ?>1 و السفلى 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 3.5"){ ?>2 و السفلى 3.5
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
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 2.5"){ ?>1 и выше 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 2.5"){ ?>2 и выше 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 2.5"){ ?>1 и ниже 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 2.5"){ ?>2 и ниже 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 3.5"){ ?>1 и выше 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 3.5"){ ?>2 и выше 3.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 3.5"){ ?>1 и ниже 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 3.5"){ ?>2 и ниже 3.5
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

</div>
<div data-qa="oddsButton" class="qbut qbut-<?=md5($row['oran_val_id']."|".$mb["id"]);?>  " onclick="kupon('<?=codekupon("$encoded|$row[oran_val_id]|$buoran"); ?>');"><?=nf($buoran); ?></div>
</div>
<? if($kz==3 or $kz==6){ ?>
</div>

<div class="cf resultLines">

<? } ?>
<? } ?>
</div>
</div>
</div>
<? } else if($tip['tip_kodu']==4){ ?>	
<div class="e_active row  cf rs-row jq-result-set-row" >

<div class="left pad_l_9 "><?=getTranslation('futboloran'.$tip['id'].'')?></div>
<div class="right multiline">

<div class="cf resultLines">
<?
$sss = sed_sql_query("select mac_db_id,oran_tip,oran_val_id,oran,yapi,durum from oranlar_futbol ora where mac_db_id='$mac_db_id' and durum='1' and oran_tip='$ass[oran_tip]' $gizli_ekle order by (select yapi from oran_val_futbol ov where ov.id=ora.oran_val_id) asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_futbol where id='$row[oran_val_id]'");
$mbs = mbsver($mb['id'],$mb['mbs'],$mb['kupa_id']);
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$mbs|$mb[mac_time]|futbol";
$buoran = oranbulxxx_futbol($mb['id'],$row['oran_val_id']);
?>
<div class="sp_bets_cell cf" style="width:84px; ">
<div class="quote_txt align_c" style="width: 42px;">

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
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 2.5"){ ?>1 and O 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 2.5"){ ?>2 and O 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 2.5"){ ?>1 and U 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 2.5"){ ?>2 and U 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 3.5"){ ?>1 and O 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 3.5"){ ?>2 and O 3.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 3.5"){ ?>1 and U 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 3.5"){ ?>2 and U 3.5
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
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 2.5"){ ?>1 und T 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 2.5"){ ?>2 und T 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 2.5"){ ?>1 und N 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 2.5"){ ?>2 und N 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 3.5"){ ?>1 und T 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 3.5"){ ?>2 und T 3.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 3.5"){ ?>1 und N 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 3.5"){ ?>2 und N 3.5
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
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 2.5"){ ?>1 وما فوق 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 2.5"){ ?>2 وما فوق 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 2.5"){ ?>1 و السفلى 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 2.5"){ ?>2 و السفلى 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 3.5"){ ?>1 وما فوق 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 3.5"){ ?>2 وما فوق 3.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 3.5"){ ?>1 و السفلى 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 3.5"){ ?>2 و السفلى 3.5
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
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 2.5"){ ?>1 и выше 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 2.5"){ ?>2 и выше 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 2.5"){ ?>1 и ниже 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 2.5"){ ?>2 и ниже 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 3.5"){ ?>1 и выше 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 3.5"){ ?>2 и выше 3.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 3.5"){ ?>1 и ниже 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 3.5"){ ?>2 и ниже 3.5
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

</div>
<div data-qa="oddsButton" class="qbut qbut-<?=md5($row['oran_val_id']."|".$mb["id"]);?>  " onclick="kupon('<?=codekupon("$encoded|$row[oran_val_id]|$buoran"); ?>');"><?=nf($buoran); ?></div>
</div>
<? } ?>



</div>



</div>
</div>
<? } else if($tip['tip_kodu']==6){ ?>	
<div class="e_active row  cf rs-row jq-result-set-row" >

<div class="left pad_l_9 "><?=getTranslation('futboloran'.$tip['id'].'')?></div>
<div class="right multiline">

<div class="cf resultLines">
<?
$sss = sed_sql_query("select mac_db_id,oran_tip,oran_val_id,oran,yapi,durum from oranlar_futbol ora where mac_db_id='$mac_db_id' and durum='1' and oran_tip='$ass[oran_tip]' $gizli_ekle order by (select yapi from oran_val_futbol ov where ov.id=ora.oran_val_id) asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_futbol where id='$row[oran_val_id]'");
$mbs = mbsver($mb['id'],$mb['mbs'],$mb['kupa_id']);
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$mbs|$mb[mac_time]|futbol";
$buoran = oranbulxxx_futbol($mb['id'],$row['oran_val_id']);
?>
<div class="sp_bets_cell cf" style="width:84px; ">
<div class="quote_txt align_c" style="width: 42px;">

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
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 2.5"){ ?>1 and O 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 2.5"){ ?>2 and O 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 2.5"){ ?>1 and U 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 2.5"){ ?>2 and U 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 3.5"){ ?>1 and O 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 3.5"){ ?>2 and O 3.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 3.5"){ ?>1 and U 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 3.5"){ ?>2 and U 3.5
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
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 2.5"){ ?>1 und T 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 2.5"){ ?>2 und T 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 2.5"){ ?>1 und N 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 2.5"){ ?>2 und N 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 3.5"){ ?>1 und T 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 3.5"){ ?>2 und T 3.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 3.5"){ ?>1 und N 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 3.5"){ ?>2 und N 3.5
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
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 2.5"){ ?>1 وما فوق 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 2.5"){ ?>2 وما فوق 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 2.5"){ ?>1 و السفلى 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 2.5"){ ?>2 و السفلى 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 3.5"){ ?>1 وما فوق 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 3.5"){ ?>2 وما فوق 3.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 3.5"){ ?>1 و السفلى 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 3.5"){ ?>2 و السفلى 3.5
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
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 2.5"){ ?>1 и выше 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 2.5"){ ?>2 и выше 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 2.5"){ ?>1 и ниже 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 2.5"){ ?>2 и ниже 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 3.5"){ ?>1 и выше 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 3.5"){ ?>2 и выше 3.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 3.5"){ ?>1 и ниже 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 3.5"){ ?>2 и ниже 3.5
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

</div>
<div data-qa="oddsButton" class="qbut qbut-<?=md5($row['oran_val_id']."|".$mb["id"]);?>  " onclick="kupon('<?=codekupon("$encoded|$row[oran_val_id]|$buoran"); ?>');"><?=nf($buoran); ?></div>
</div>
<? if($kz==2 or $kz==4){ ?>
</div>

<div class="cf resultLines">
<? } ?>
<? } ?>



</div>



</div>
</div>
<? } else if($tip['tip_kodu']==8){?>	
<div class="e_active row  cf rs-row jq-result-set-row" >

<div class="left pad_l_9 "><?=getTranslation('futboloran'.$tip['id'].'')?></div>
<div class="right multiline">

<div class="cf resultLines">
<?
$sss = sed_sql_query("select mac_db_id,oran_tip,oran_val_id,oran,yapi,durum from oranlar_futbol ora where mac_db_id='$mac_db_id' and durum='1' and oran_tip='$ass[oran_tip]' $gizli_ekle order by (select yapi from oran_val_futbol ov where ov.id=ora.oran_val_id) asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_futbol where id='$row[oran_val_id]'");
$mbs = mbsver($mb['id'],$mb['mbs'],$mb['kupa_id']);
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$mbs|$mb[mac_time]|futbol";
$buoran = oranbulxxx_futbol($mb['id'],$row['oran_val_id']);
?>
<div class="sp_bets_cell cf" style="width:84px; ">
<div class="quote_txt align_c" style="width: 42px;">

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
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 2.5"){ ?>1 and O 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 2.5"){ ?>2 and O 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 2.5"){ ?>1 and U 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 2.5"){ ?>2 and U 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 3.5"){ ?>1 and O 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 3.5"){ ?>2 and O 3.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 3.5"){ ?>1 and U 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 3.5"){ ?>2 and U 3.5
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
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 2.5"){ ?>1 und T 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 2.5"){ ?>2 und T 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 2.5"){ ?>1 und N 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 2.5"){ ?>2 und N 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 3.5"){ ?>1 und T 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 3.5"){ ?>2 und T 3.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 3.5"){ ?>1 und N 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 3.5"){ ?>2 und N 3.5
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
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 2.5"){ ?>1 وما فوق 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 2.5"){ ?>2 وما فوق 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 2.5"){ ?>1 و السفلى 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 2.5"){ ?>2 و السفلى 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 3.5"){ ?>1 وما فوق 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 3.5"){ ?>2 وما فوق 3.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 3.5"){ ?>1 و السفلى 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 3.5"){ ?>2 و السفلى 3.5
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
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 2.5"){ ?>1 и выше 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 2.5"){ ?>2 и выше 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 2.5"){ ?>1 и ниже 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 2.5"){ ?>2 и ниже 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 3.5"){ ?>1 и выше 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 3.5"){ ?>2 и выше 3.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 3.5"){ ?>1 и ниже 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 3.5"){ ?>2 и ниже 3.5
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

</div>
<div data-qa="oddsButton" class="qbut qbut-<?=md5($row['oran_val_id']."|".$mb["id"]);?>  " onclick="kupon('<?=codekupon("$encoded|$row[oran_val_id]|$buoran"); ?>');"><?=nf($buoran); ?></div>
</div>
<? if($kz==2 or $kz==4 or $kz==6){ ?>
</div>

<div class="cf resultLines">
<? } ?>
<? } ?>
</div>
</div>
</div>
<? }else if($tip['tip_kodu']>=10){?>	
<div class="e_active row  cf rs-row jq-result-set-row" >
<div class="left pad_l_9 " style="text-align: center;width: 100%;font-weight: bold;"><?=getTranslation('futboloran'.$tip['id'].'')?>&nbsp;<img src="/img/help-4225AD162BB529F588A34386848CA945.gif" alt="" class="helpIcon jq-helpbutton" width="11" height="11">
</div>
<br/>
<div class="cf resultLines" style="margin-left:25px;">
<?
$sss = sed_sql_query("select mac_db_id,oran_tip,oran_val_id,oran,yapi,durum from oranlar_futbol ora where mac_db_id='$mac_db_id' and durum='1' and oran_tip='$ass[oran_tip]' $gizli_ekle order by (select yapi from oran_val_futbol ov where ov.id=ora.oran_val_id) asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_futbol where id='$row[oran_val_id]'");
$mbs = mbsver($mb['id'],$mb['mbs'],$mb['kupa_id']);
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$mbs|$mb[mac_time]|futbol";
$buoran = oranbulxxx_futbol($mb['id'],$row['oran_val_id']);
?>
<div class="sp_bets_cell cf" style="width:124px;<? if($kz==1){?>border-left:none;<? } ?>">
<div class="quote_txt align_c" style="width: 82px;">

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
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 2.5"){ ?>1 and O 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 2.5"){ ?>2 and O 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 2.5"){ ?>1 and U 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 2.5"){ ?>2 and U 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 3.5"){ ?>1 and O 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 3.5"){ ?>2 and O 3.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 3.5"){ ?>1 and U 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 3.5"){ ?>2 and U 3.5
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
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 2.5"){ ?>1 und T 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 2.5"){ ?>2 und T 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 2.5"){ ?>1 und N 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 2.5"){ ?>2 und N 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 3.5"){ ?>1 und T 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 3.5"){ ?>2 und T 3.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 3.5"){ ?>1 und N 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 3.5"){ ?>2 und N 3.5
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 2.5"){ ?>1 وما فوق 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 2.5"){ ?>2 وما فوق 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 2.5"){ ?>1 و السفلى 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 2.5"){ ?>2 و السفلى 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 3.5"){ ?>1 وما فوق 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 3.5"){ ?>2 وما فوق 3.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 3.5"){ ?>1 و السفلى 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 3.5"){ ?>2 و السفلى 3.5
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
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 2.5"){ ?>1 и выше 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 2.5"){ ?>2 и выше 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 2.5"){ ?>1 и ниже 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 2.5"){ ?>2 и ниже 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 3.5"){ ?>1 и выше 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 3.5"){ ?>2 и выше 3.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 3.5"){ ?>1 и ниже 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 3.5"){ ?>2 и ниже 3.5
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

</div>
<div data-qa="oddsButton" class="qbut qbut-<?=md5($row['oran_val_id']."|".$mb["id"]);?>  " onclick="kupon('<?=codekupon("$encoded|$row[oran_val_id]|$buoran"); ?>');"><?=nf($buoran); ?></div>
</div>
<? if(($kz %4 == 0)){ $kz = 0; ?>
</div>
<div class="cf resultLines" style="margin-left:25px;">
<? } ?>
<? } ?>
</div>
</div>
<? }else if($tip['tip_kodu']==10){?>	
<div class="e_active row  cf rs-row jq-result-set-row" >
<div class="left pad_l_9 " style="text-align: center;width: 100%;font-weight: bold;"><?=getTranslation('futboloran'.$tip['id'].'')?>&nbsp;<img src="/img/help-4225AD162BB529F588A34386848CA945.gif" alt="" class="helpIcon jq-helpbutton" width="11" height="11">
</div>
<br/>
<div class="cf resultLines" style="margin-left:25px;">
<?
$sss = sed_sql_query("select mac_db_id,oran_tip,oran_val_id,oran,yapi,durum from oranlar_futbol ora where mac_db_id='$mac_db_id' and durum='1' and oran_tip='$ass[oran_tip]' $gizli_ekle order by (select yapi from oran_val_futbol ov where ov.id=ora.oran_val_id) asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_futbol where id='$row[oran_val_id]'");
$mbs = mbsver($mb['id'],$mb['mbs'],$mb['kupa_id']);
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$mbs|$mb[mac_time]|futbol";
$buoran = oranbulxxx_futbol($mb['id'],$row['oran_val_id']);
?>
<div class="sp_bets_cell cf" style="width:124px;<? if($kz==1){?>border-left:none;<? } ?>">
<div class="quote_txt align_c" style="width: 82px;">

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
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 2.5"){ ?>1 and O 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 2.5"){ ?>2 and O 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 2.5"){ ?>1 and U 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 2.5"){ ?>2 and U 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 3.5"){ ?>1 and O 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 3.5"){ ?>2 and O 3.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 3.5"){ ?>1 and U 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 3.5"){ ?>2 and U 3.5
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
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 2.5"){ ?>1 und T 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 2.5"){ ?>2 und T 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 2.5"){ ?>1 und N 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 2.5"){ ?>2 und N 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 3.5"){ ?>1 und T 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 3.5"){ ?>2 und T 3.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 3.5"){ ?>1 und N 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 3.5"){ ?>2 und N 3.5
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
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 2.5"){ ?>1 وما فوق 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 2.5"){ ?>2 وما فوق 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 2.5"){ ?>1 و السفلى 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 2.5"){ ?>2 و السفلى 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 3.5"){ ?>1 وما فوق 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 3.5"){ ?>2 وما فوق 3.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 3.5"){ ?>1 و السفلى 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 3.5"){ ?>2 و السفلى 3.5
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
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 2.5"){ ?>1 и выше 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 2.5"){ ?>2 и выше 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 2.5"){ ?>1 и ниже 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 2.5"){ ?>2 и ниже 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 3.5"){ ?>1 и выше 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 3.5"){ ?>2 и выше 3.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 3.5"){ ?>1 и ниже 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 3.5"){ ?>2 и ниже 3.5
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

</div>
<div data-qa="oddsButton" class="qbut qbut-<?=md5($row['oran_val_id']."|".$mb["id"]);?>  " onclick="kupon('<?=codekupon("$encoded|$row[oran_val_id]|$buoran"); ?>');"><?=nf($buoran); ?></div>
</div>
<? if(($kz %4 == 0)){ $kz = 0; ?>
</div>
<div class="cf resultLines" style="margin-left:25px;">
<? } ?>
<? } ?>
</div>
</div>
<? }else if($tip['tip_kodu']==5){?>	
<div class="e_active row  cf rs-row jq-result-set-row" >
<div class="left pad_l_9 " style="text-align: center;width: 100%;font-weight: bold;"><?=getTranslation('futboloran'.$tip['id'].'')?>&nbsp;<img src="/img/help-4225AD162BB529F588A34386848CA945.gif" alt="" class="helpIcon jq-helpbutton" width="11" height="11">
</div>
<br/>
<div class="cf resultLines">
<?
$sss = sed_sql_query("select mac_db_id,oran_tip,oran_val_id,oran,yapi,durum from oranlar_futbol ora where mac_db_id='$mac_db_id' and durum='1' and oran_tip='$ass[oran_tip]' $gizli_ekle order by (select yapi from oran_val_futbol ov where ov.id=ora.oran_val_id) asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_futbol where id='$row[oran_val_id]'");
$mbs = mbsver($mb['id'],$mb['mbs'],$mb['kupa_id']);
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$mbs|$mb[mac_time]|futbol";
$buoran = oranbulxxx_futbol($mb['id'],$row['oran_val_id']);
?>
<div class="sp_bets_cell cf" style="<? if($kz==5){ ?>width:75px;<? } else { ?>width:118px;<? } ?><? if($kz==1){ ?>border-left:none;<? } ?>">
<div class="quote_txt align_c" style="<? if($kz==5){ ?>width:30px;<? } else { ?>width: 78px;<? } ?>">

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
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 2.5"){ ?>1 and O 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 2.5"){ ?>2 and O 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 2.5"){ ?>1 and U 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 2.5"){ ?>2 and U 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 3.5"){ ?>1 and O 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 3.5"){ ?>2 and O 3.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 3.5"){ ?>1 and U 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 3.5"){ ?>2 and U 3.5
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
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 2.5"){ ?>1 und T 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 2.5"){ ?>2 und T 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 2.5"){ ?>1 und N 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 2.5"){ ?>2 und N 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 3.5"){ ?>1 und T 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 3.5"){ ?>2 und T 3.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 3.5"){ ?>1 und N 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 3.5"){ ?>2 und N 3.5
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
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 2.5"){ ?>1 وما فوق 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 2.5"){ ?>2 وما فوق 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 2.5"){ ?>1 و السفلى 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 2.5"){ ?>2 و السفلى 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 3.5"){ ?>1 وما فوق 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 3.5"){ ?>2 وما فوق 3.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 3.5"){ ?>1 و السفلى 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 3.5"){ ?>2 و السفلى 3.5
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
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 2.5"){ ?>1 и выше 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 2.5"){ ?>2 и выше 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 2.5"){ ?>1 и ниже 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 2.5"){ ?>2 и ниже 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 3.5"){ ?>1 и выше 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 3.5"){ ?>2 и выше 3.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 3.5"){ ?>1 и ниже 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 3.5"){ ?>2 и ниже 3.5
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

</div>
<div data-qa="oddsButton" class="qbut qbut-<?=md5($row['oran_val_id']."|".$mb["id"]);?>  " onclick="kupon('<?=codekupon("$encoded|$row[oran_val_id]|$buoran"); ?>');"><?=nf($buoran); ?></div>
</div>
<? } ?>
</div>
</div>
<? }else{ ?>				
<div class="e_active row  cf rs-row jq-result-set-row" >
<div class="left pad_l_9 "><?=getTranslation('futboloran'.$tip['id'].'')?></div>
<div class="right ">
<div class="cf resultLines">
<?
$sss = sed_sql_query("select mac_db_id,oran_tip,oran_val_id,oran,yapi,durum from oranlar_futbol ora where mac_db_id='$mac_db_id' and durum='1' and oran_tip='$ass[oran_tip]' $gizli_ekle order by (select yapi from oran_val_futbol ov where ov.id=ora.oran_val_id) asc");
while($row=sed_sql_fetchassoc($sss)) {
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_futbol where id='$row[oran_val_id]'");
$mbs = mbsver($mb['id'],$mb['mbs'],$mb['kupa_id']);
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$mbs|$mb[mac_time]|futbol";
$buoran = oranbulxxx_futbol($mb['id'],$row['oran_val_id']);
?>
<div class="sp_bets_cell cf" style="width:84px; " >
<div class="quote_txt align_c" style="width: 42px;">

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
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 2.5"){ ?>1 and O 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 2.5"){ ?>2 and O 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 2.5"){ ?>1 and U 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 2.5"){ ?>2 and U 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 3.5"){ ?>1 and O 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 3.5"){ ?>2 and O 3.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 3.5"){ ?>1 and U 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 3.5"){ ?>2 and U 3.5
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
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 2.5"){ ?>1 und T 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 2.5"){ ?>2 und T 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 2.5"){ ?>1 und N 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 2.5"){ ?>2 und N 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 3.5"){ ?>1 und T 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 3.5"){ ?>2 und T 3.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 3.5"){ ?>1 und N 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 3.5"){ ?>2 und N 3.5
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
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 2.5"){ ?>1 وما فوق 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 2.5"){ ?>2 وما فوق 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 2.5"){ ?>1 و السفلى 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 2.5"){ ?>2 و السفلى 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 3.5"){ ?>1 وما فوق 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 3.5"){ ?>2 وما فوق 3.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 3.5"){ ?>1 و السفلى 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 3.5"){ ?>2 و السفلى 3.5
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
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 2.5"){ ?>1 и выше 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 2.5"){ ?>2 и выше 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 2.5"){ ?>1 и ниже 2.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 2.5"){ ?>2 и ниже 2.5
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 3.5"){ ?>1 и выше 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 3.5"){ ?>2 и выше 3.5
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 3.5"){ ?>1 и ниже 3.5
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 3.5"){ ?>2 и ниже 3.5
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

</div>
<div data-qa="oddsButton" class="qbut qbut-<?=md5($row['oran_val_id']."|".$mb["id"]);?>  " onclick="kupon('<?=codekupon("$encoded|$row[oran_val_id]|$buoran"); ?>');"><?=nf($buoran); ?></div>
</div>
<? } ?>
</div>
</div>
</div>
<? } ?>
</div>
<? } ?>
</div>
</div>
<div class="t_more_foot align_c" onclick="detayfutbolkapat(<?=$mb['id'];?>);"><?=getTranslation('foran999')?></div>
<? }

if($a=="detailbasketbol") {

$mac_db_id=gd("id");

$mb = bilgi("select * from program_basketbol where id='$mac_db_id'");

$fark = $mb['mac_time']-time();

$gizli_oran_tips = gizli_oran_tips_basketbol($mb['id']);

if($gizli_oran_tips!="") { $gizli_ekle = "and oran_val_id not in ($gizli_oran_tips)"; } else { $gizli_ekle = ""; }

?>

<div class="sp_bets" style="display:block;">
<div class="border_ccc" style="margin: 5px">

<?

$orderle = "FIELD(oran_tip, '2', '3', '1', '17', '4', '19', '18', '9', '10', '6', '7', '15', '16', '11', '12', '13', '14', '5', '8') ASC";

$sor = sed_sql_query("select mac_db_id,oran_tip,durum from oranlar_basketbol where mac_db_id='$mac_db_id' and durum='1' $gizli_ekle group by oran_tip order by {$orderle}");

$i = 1;
while($ass=sed_sql_fetchassoc($sor)) { 
$i++;
$tip = bilgi("select id,tip_isim,tip_kodu from oran_tip_basketbol where id='$ass[oran_tip]'");

?>

<div class="<? if ($i %2 != 0){ ?>bg_othergrey<? }else{ ?>bg_grey<? } ?>">
<? if($tip['tip_isim']=="Toplam Skor Alt/Üst" || $tip['tip_isim']=="Handikap ( 1.YARI )" || $tip['tip_isim']=="Handikap" || $tip['tip_isim']=="1.Takım İY Alt/Üst" || $tip['tip_isim']=="2.Takım İY Alt/Üst" || $tip['tip_isim']=="1.Takım 1.Çeyrek Alt/Üst" || $tip['tip_isim']=="2.Takım 1.Çeyrek Alt/Üst" || $tip['tip_isim']=="1.Takım Alt/Üst" || $tip['tip_isim']=="2.Takım Alt/Üst"){ ?>

<div class="e_active row  cf rs-row jq-result-set-row" >
<div class="left pad_l_9 "><?=getTranslation('basketboloran'.$tip['id'].'')?></div>
<div class="right multiline">
<div class="cf resultLines">

<?
$sss = sed_sql_query("select id,mac_db_id,oran_tip,oran_val_id,oran,durum,oran_val_b from oranlar_basketbol where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' group by oran_val_b,oran_val_id order by id asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_basketbol where id='$row[oran_val_id]'");
$basketmbs_ver = userayar('basketmbs');
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$basketmbs_ver|$mb[mac_time]|basketbol";
$buoran = oranbulb($mac_db_id,$row['id']);
?>

<div class="sp_bets_cell cf" style="width:137px;">
<div class="quote_txt align_c" style="width: 82px;">

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

<? if($row['oran_val_b']!="") { ?>( <font style="color:#f00;font-weight: bold;"><?=$row['oran_val_b'];?></font> )<? } ?>

</div>
<div data-qa="oddsButton" class="qbut qbut-<?=md5($row['oran_val_id']."|".$mb["id"]);?>  " onclick="kupon('<?=codekupon("$encoded|$row[id]|$buoran"); ?>');"><?=nf($buoran); ?></div>
</div>

<? } ?>
</div>
</div>
</div>

<? } else if($tip['tip_kodu']==6){ ?>	
<div class="e_active row  cf rs-row jq-result-set-row" >
<div class="left pad_l_9 "><?=getTranslation('basketboloran'.$tip['id'].'')?></div>
<div class="right multiline">
<div class="cf resultLines">
<?
$sss = sed_sql_query("select id,mac_db_id,oran_tip,oran_val_id,oran,durum,oran_val_b from oranlar_basketbol where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' group by oran_val_id order by oran_val_id asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_basketbol where id='$row[oran_val_id]'");
$basketmbs_ver = userayar('basketmbs');
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$basketmbs_ver|$mb[mac_time]|basketbol";
$buoran = oranbulb($mac_db_id,$row['id']);
?>
<div class="sp_bets_cell cf" style="width:84px; ">
<div class="quote_txt align_c" style="width: 42px;">

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

</div>
<div data-qa="oddsButton" class="qbut qbut-<?=md5($row['oran_val_id']."|".$mb["id"]);?>  " onclick="kupon('<?=codekupon("$encoded|$row[id]|$buoran"); ?>');"><?=nf($buoran); ?></div>
</div>
<? if($kz==2 or $kz==4){ ?>
</div>

<div class="cf resultLines">
<? } ?>
<? } ?>



</div>



</div>
</div>
<? } else if($tip['tip_kodu']==4){ ?>
<div class="e_active row  cf rs-row jq-result-set-row" >
<div class="left pad_l_9 "><?=getTranslation('basketboloran'.$tip['id'].'')?></div>
<div class="right multiline">
<div class="cf resultLines">
<?
$sss = sed_sql_query("select id,mac_db_id,oran_tip,oran_val_id,oran,durum,oran_val_b from oranlar_basketbol where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' group by oran_val_id order by oran_val_id asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_basketbol where id='$row[oran_val_id]'");
$basketmbs_ver = userayar('basketmbs');
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$basketmbs_ver|$mb[mac_time]|basketbol";
$buoran = oranbulb($mac_db_id,$row['id']);
?>
<div class="sp_bets_cell cf" style="width:126.5px; ">
<div class="quote_txt align_c" style="width: 70px;">

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

 <? if($row['oran_val_b']!="") { echo "( <font style='color:#f00;font-weight:bold;'>$row[oran_val_b]</font> )"; } ?></div>
<div data-qa="oddsButton" class="qbut qbut-<?=md5($row['oran_val_id']."|".$mb["id"]);?>  " onclick="kupon('<?=codekupon("$encoded|$row[id]|$buoran"); ?>');"><?=nf($buoran); ?></div>
</div>
<? if($kz==2 or $kz==4){ ?>
</div>
<div class="cf resultLines">
<? } ?>
<? } ?>
</div>
</div>
</div>
<? } else { ?>				
<div class="e_active row  cf rs-row jq-result-set-row" >
<div class="left pad_l_9 "><?=getTranslation('basketboloran'.$tip['id'].'')?></div>
<div class="right ">
<div class="cf resultLines">
<?
$sss = sed_sql_query("select id,mac_db_id,oran_tip,oran_val_id,oran,durum,oran_val_b from oranlar_basketbol where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' order by id asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_basketbol where id='$row[oran_val_id]'");
$basketmbs_ver = userayar('basketmbs');
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$basketmbs_ver|$mb[mac_time]|basketbol";
$buoran = oranbulb($mac_db_id,$row['id']);
?>
<div class="sp_bets_cell cf" style="width:84px; " >
<div class="quote_txt align_c" style="width: 42px;">

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

 <? if($row['oran_val_b']!="") { echo "($row[oran_val_b])"; } ?></div>
<div data-qa="oddsButton" class="qbut qbut-<?=md5($row['oran_val_id']."|".$mb["id"]);?>  " onclick="kupon('<?=codekupon("$encoded|$row[id]|$buoran"); ?>');"><?=nf($buoran); ?></div>
</div>
<? } ?>
</div>
</div>
</div>
<? } ?>
</div>
<? } ?>
</div>
</div>
<div class="t_more_foot align_c" onclick="detaybasketbolkapat(<?=$mb['id'];?>);"><?=getTranslation('foran999')?></div>
<? }

if($a=="detailtenis") {

$mac_db_id=gd("id");

$mb = bilgi("select * from program_tenis where id='$mac_db_id'");

$fark = $mb['mac_time']-time();

$gizli_oran_tips = gizli_oran_tips_tenis($mb['id']);

if($gizli_oran_tips!="") { $gizli_ekle = "and oran_val_id not in ($gizli_oran_tips)"; } else { $gizli_ekle = ""; }

?>

<div class="sp_bets" style="display:block;">
<div class="border_ccc" style="margin: 5px">

<?

$orderle = "FIELD(oran_tip, '1', '3', '4', '5', '6', '2') ASC";

$sor = sed_sql_query("select mac_db_id,oran_tip,durum from oranlar_tenis where mac_db_id='$mac_db_id' and durum='1' $gizli_ekle group by oran_tip order by {$orderle}");

$i = 1;
while($ass=sed_sql_fetchassoc($sor)) { 
$i++;
$tip = bilgi("select id,tip_isim,tip_kodu from oran_tip_tenis where id='$ass[oran_tip]'");

?>

<div class="<? if ($i %2 != 0){ ?>bg_othergrey<? }else{ ?>bg_grey<? } ?>">
<? if($tip['tip_kodu']==6){ ?>	
<div class="e_active row  cf rs-row jq-result-set-row" >

<div class="left pad_l_9 "><?=getTranslation('tenisoran'.$tip['id'].'')?></div>
<div class="right multiline">

<div class="cf resultLines">
<?
$sss = sed_sql_query("select mac_db_id,oran_tip,oran_val_id,oran,durum from oranlar_tenis ora where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' order by (select yapi from oran_val_tenis ov where ov.id=ora.oran_val_id) asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_tenis where id='$row[oran_val_id]'");
$tenismbs_ver = userayar('tenismbs');
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$tenismbs_ver|$mb[mac_time]|tenis";
$buoran = oranbult($mac_db_id,$row['oran_val_id']);
?>
<div class="sp_bets_cell cf" style="width:84px; ">
<div class="quote_txt align_c" style="width: 42px;">

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

</div>
<div data-qa="oddsButton" class="qbut qbut-<?=md5($row['oran_val_id']."|".$mb["id"]);?>  " onclick="kupon('<?=codekupon("$encoded|$row[oran_val_id]|$buoran"); ?>');"><?=nf($buoran); ?></div>
</div>
<? if($kz==2 or $kz==4){ ?>
</div>

<div class="cf resultLines">
<? } ?>
<? } ?>



</div>



</div>
</div>
<? } else if($tip['tip_kodu']==4){ ?>
<div class="e_active row  cf rs-row jq-result-set-row" >

<div class="left pad_l_9 "><?=getTranslation('tenisoran'.$tip['id'].'')?></div>
<div class="right multiline">

<div class="cf resultLines">
<?
$sss = sed_sql_query("select mac_db_id,oran_tip,oran_val_id,oran,durum from oranlar_tenis ora where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' order by (select yapi from oran_val_tenis ov where ov.id=ora.oran_val_id) asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_tenis where id='$row[oran_val_id]'");
$tenismbs_ver = userayar('tenismbs');
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$tenismbs_ver|$mb[mac_time]|tenis";
$buoran = oranbult($mac_db_id,$row['oran_val_id']);
?>
<div class="sp_bets_cell cf" style="width:84px; ">
<div class="quote_txt align_c" style="width: 42px;">

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

</div>
<div data-qa="oddsButton" class="qbut qbut-<?=md5($row['oran_val_id']."|".$mb["id"]);?>  " onclick="kupon('<?=codekupon("$encoded|$row[oran_val_id]|$buoran"); ?>');"><?=nf($buoran); ?></div>
</div>
<? } ?>



</div>



</div>
</div>
<? } else { ?>				
<div class="e_active row  cf rs-row jq-result-set-row" >
<div class="left pad_l_9 "><?=getTranslation('tenisoran'.$tip['id'].'')?></div>
<div class="right ">
<div class="cf resultLines">
<?
$sss = sed_sql_query("select mac_db_id,oran_tip,oran_val_id,oran,durum from oranlar_tenis ora where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' order by (select yapi from oran_val_tenis ov where ov.id=ora.oran_val_id) asc");
while($row=sed_sql_fetchassoc($sss)) {
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_tenis where id='$row[oran_val_id]'");
$tenismbs_ver = userayar('tenismbs');
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$tenismbs_ver|$mb[mac_time]|tenis";
$buoran = oranbult($mac_db_id,$row['oran_val_id']);
?>
<div class="sp_bets_cell cf" style="width:84px; " >
<div class="quote_txt align_c" style="width: 42px;">

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

</div>
<div data-qa="oddsButton" class="qbut qbut-<?=md5($row['oran_val_id']."|".$mb["id"]);?>  " onclick="kupon('<?=codekupon("$encoded|$row[oran_val_id]|$buoran"); ?>');"><?=nf($buoran); ?></div>
</div>
<? } ?>
</div>
</div>
</div>
<? } ?>
</div>
<? } ?>
</div>
</div>
<div class="t_more_foot align_c" onclick="detayteniskapat(<?=$mb['id'];?>);"><?=getTranslation('foran999')?></div>
<? }

if($a=="detailvoleybol") {

$mac_db_id=gd("id");

$mb = bilgi("select * from program_voleybol where id='$mac_db_id'");

$fark = $mb['mac_time']-time();

$gizli_oran_tips = gizli_oran_tips_voleybol($mb['id']);

if($gizli_oran_tips!="") { $gizli_ekle = "and oran_val_id not in ($gizli_oran_tips)"; } else { $gizli_ekle = ""; }

?>

<div class="sp_bets" style="display:block;">
<div class="border_ccc" style="margin: 5px">

<?
$orderle = "FIELD(oran_tip, '1', '4', '3', '2') ASC";

$sor = sed_sql_query("select mac_db_id,oran_tip,durum from oranlar_voleybol where mac_db_id='$mac_db_id' and durum='1' $gizli_ekle group by oran_tip order by {$orderle}");

$i = 1;
while($ass=sed_sql_fetchassoc($sor)) { 
$i++;
$tip = bilgi("select id,tip_isim,tip_kodu from oran_tip_voleybol where id='$ass[oran_tip]'");

?>

<div class="<? if ($i %2 != 0){ ?>bg_othergrey<? }else{ ?>bg_grey<? } ?>">
<? if($tip['tip_kodu']==6){ ?>	
<div class="e_active row  cf rs-row jq-result-set-row" >
<div class="left pad_l_9 "><?=getTranslation('voleyboloran'.$tip['id'].'')?></div>
<div class="right multiline">

<div class="cf resultLines">
<?
$sss = sed_sql_query("select mac_db_id,oran_tip,oran_val_id,oran,durum,oran_val_v from oranlar_voleybol ora where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' order by (select yapi from oran_val_voleybol ov where ov.id=ora.oran_val_id) asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_voleybol where id='$row[oran_val_id]'");
$voleybolmbs_ver = userayar('voleybolmbs');
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$voleybolmbs_ver|$mb[mac_time]|voleybol";
$buoran = oranbulv($mac_db_id,$row['oran_val_id']);
?>
<div class="sp_bets_cell cf" style="width:84px; ">
<div class="quote_txt align_c" style="width: 42px;">


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

</div>
<div data-qa="oddsButton" class="qbut qbut-<?=md5($row['oran_val_id']."|".$mb["id"]);?>  " onclick="kupon('<?=codekupon("$encoded|$row[oran_val_id]|$buoran"); ?>');"><?=nf($buoran); ?></div>
</div>
<? if($kz==2 or $kz==4){ ?>
</div>

<div class="cf resultLines">
<? } ?>
<? } ?>
</div>
</div>
</div>
<? } else if($tip['tip_kodu']==4){ ?>
<div class="e_active row  cf rs-row jq-result-set-row" >
<div class="left pad_l_9 "><?=getTranslation('voleyboloran'.$tip['id'].'')?></div>
<div class="right multiline">
<div class="cf resultLines">
<?
$sss = sed_sql_query("select mac_db_id,oran_tip,oran_val_id,oran,durum,oran_val_v from oranlar_voleybol ora where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' order by (select yapi from oran_val_voleybol ov where ov.id=ora.oran_val_id) asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_voleybol where id='$row[oran_val_id]'");
$voleybolmbs_ver = userayar('voleybolmbs');
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$voleybolmbs_ver|$mb[mac_time]|voleybol";
$buoran = oranbulv($mac_db_id,$row['oran_val_id']);
?>
<div class="sp_bets_cell cf" style="width:126.5px; ">
<div class="quote_txt align_c" style="width: 70px;">


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

 <? if($row['oran_val_v']!="") { echo "( <font style='color:#f00;font-weight:bold;'>$row[oran_val_v]</font> )"; } ?></div>
<div data-qa="oddsButton" class="qbut qbut-<?=md5($row['oran_val_id']."|".$mb["id"]);?>  " onclick="kupon('<?=codekupon("$encoded|$row[oran_val_id]|$buoran"); ?>');"><?=nf($buoran); ?></div>
</div>
<? if($kz==2 or $kz==4){ ?>
</div>

<div class="cf resultLines">
<? } ?>
<? } ?>
</div>
</div>
</div>
<? } else { ?>				
<div class="e_active row  cf rs-row jq-result-set-row" >
<div class="left pad_l_9 "><?=getTranslation('voleyboloran'.$tip['id'].'')?></div>
<div class="right ">
<div class="cf resultLines">
<?
$sss = sed_sql_query("select mac_db_id,oran_tip,oran_val_id,oran,durum,oran_val_v from oranlar_voleybol ora where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' order by (select yapi from oran_val_voleybol ov where ov.id=ora.oran_val_id) asc");
while($row=sed_sql_fetchassoc($sss)) {
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_voleybol where id='$row[oran_val_id]'");
$voleybolmbs_ver = userayar('voleybolmbs');
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$voleybolmbs_ver|$mb[mac_time]|voleybol";
$buoran = oranbulv($mac_db_id,$row['oran_val_id']);
?>
<div class="sp_bets_cell cf" style="width:84px; " >
<div class="quote_txt align_c" style="width: 42px;">


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

 <? if($row['oran_val_v']!="") { echo "($row[oran_val_v])"; } ?></div>
<div data-qa="oddsButton" class="qbut qbut-<?=md5($row['oran_val_id']."|".$mb["id"]);?>  " onclick="kupon('<?=codekupon("$encoded|$row[oran_val_id]|$buoran"); ?>');"><?=nf($buoran); ?></div>
</div>
<? } ?>
</div>
</div>
</div>
<? } ?>
</div>
<? } ?>
</div>
</div>
<div class="t_more_foot align_c" onclick="detayvoleybolkapat(<?=$mb['id'];?>);"><?=getTranslation('foran999')?></div>
<? }

if($a=="detailbuzhokeyi") {

$mac_db_id=gd("id");

$mb = bilgi("select * from program_buzhokeyi where id='$mac_db_id'");

$fark = $mb['mac_time']-time();

$gizli_oran_tips = gizli_oran_tips_buzhokeyi($mb['id']);

if($gizli_oran_tips!="") { $gizli_ekle = "and oran_val_id not in ($gizli_oran_tips)"; } else { $gizli_ekle = ""; }

?>

<div class="sp_bets" style="display:block;">
<div class="border_ccc" style="margin: 5px">

<?
$orderle = "FIELD(oran_tip, '1', '2', '3', '4', '5', '6', '7', '8', '9') ASC";

$sor = sed_sql_query("select mac_db_id,oran_tip,durum from oranlar_buzhokeyi where mac_db_id='$mac_db_id' and durum='1' $gizli_ekle group by oran_tip order by {$orderle}");

$i = 1;
while($ass=sed_sql_fetchassoc($sor)) { 
$i++;
$tip = bilgi("select id,tip_isim,tip_kodu from oran_tip_buzhokeyi where id='$ass[oran_tip]'");

?>

<div class="<? if ($i %2 != 0){ ?>bg_othergrey<? }else{ ?>bg_grey<? } ?>">
<div class="e_active row  cf rs-row jq-result-set-row" >
<div class="left pad_l_9 "><?=getTranslation('buzhokeyioran'.$tip['id'].'')?></div>
<div class="right ">
<div class="cf resultLines">
<?
$sss = sed_sql_query("select mac_db_id,oran_tip,oran_val_id,oran,durum from oranlar_buzhokeyi ora where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' order by oran_val_id asc");
while($row=sed_sql_fetchassoc($sss)) {
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_buzhokeyi where id='$row[oran_val_id]'");
$buzhokeyimbs_ver = userayar('buzhokeyimbs');
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$buzhokeyimbs_ver|$mb[mac_time]|buzhokeyi";
$buoran = oranbulbuz($mac_db_id,$row['oran_val_id']);
?>
<div class="sp_bets_cell cf" style="width:84px; " >
<div class="quote_txt align_c" style="width: 42px;">

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

</div>
<div data-qa="oddsButton" class="qbut qbut-<?=md5($row['oran_val_id']."|".$mb["id"]);?>  " onclick="kupon('<?=codekupon("$encoded|$row[oran_val_id]|$buoran"); ?>');"><?=nf($buoran); ?></div>
</div>
<? } ?>
</div>
</div>
</div>
</div>
<? } ?>
</div>
</div>
<div class="t_more_foot align_c" onclick="detaybuzhokeyikapat(<?=$mb['id'];?>);"><?=getTranslation('foran999')?></div>
<? }

if($a=="detailhentbol") {

$mac_db_id=gd("id");

$mb = bilgi("select * from program_hentbol where id='$mac_db_id'");

$fark = $mb['mac_time']-time();

$gizli_oran_tips = gizli_oran_tips_hentbol($mb['id']);

if($gizli_oran_tips!="") { $gizli_ekle = "and oran_val_id not in ($gizli_oran_tips)"; } else { $gizli_ekle = ""; }

?>

<div class="sp_bets" style="display:block;">
<div class="border_ccc" style="margin: 5px">

<?
$orderle = "FIELD(oran_tip, '1', '3', '5', '6', '7', '4', '2') ASC";

$sor = sed_sql_query("select mac_db_id,oran_tip,durum from oranlar_hentbol where mac_db_id='$mac_db_id' and durum='1' $gizli_ekle group by oran_tip order by {$orderle}");

$i = 1;
while($ass=sed_sql_fetchassoc($sor)) { 
$i++;
$tip = bilgi("select id,tip_isim,tip_kodu from oran_tip_hentbol where id='$ass[oran_tip]'");

?>

<div class="<? if ($i %2 != 0){ ?>bg_othergrey<? }else{ ?>bg_grey<? } ?>">
<? if($tip['tip_kodu']==6){ ?>	
<div class="e_active row  cf rs-row jq-result-set-row" >
<div class="left pad_l_9 "><?=getTranslation('hentboloran'.$tip['id'].'')?></div>
<div class="right multiline">
<div class="cf resultLines">
<?
$sss = sed_sql_query("select mac_db_id,oran_tip,oran_val_id,oran,durum,oran_val_h from oranlar_hentbol ora where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' order by oran_val_id asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_hentbol where id='$row[oran_val_id]'");
$hentbolmbs_ver = userayar('hentbolmbs');
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$hentbolmbs_ver|$mb[mac_time]|hentbol";
$buoran = oranbulh($mac_db_id,$row['oran_val_id']);
?>
<div class="sp_bets_cell cf" style="width:84px; ">
<div class="quote_txt align_c" style="width: 42px;">

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

</div>
<div data-qa="oddsButton" class="qbut qbut-<?=md5($row['oran_val_id']."|".$mb["id"]);?>  " onclick="kupon('<?=codekupon("$encoded|$row[oran_val_id]|$buoran"); ?>');"><?=nf($buoran); ?></div>
</div>
<? if($kz==2 or $kz==4){ ?>
</div>
<div class="cf resultLines">
<? } ?>
<? } ?>
</div>
</div>
</div>
<? } else if($tip['tip_kodu']==4){ ?>
<div class="e_active row  cf rs-row jq-result-set-row" >
<div class="left pad_l_9 "><?=getTranslation('hentboloran'.$tip['id'].'')?></div>
<div class="right multiline">
<div class="cf resultLines">
<?
$sss = sed_sql_query("select mac_db_id,oran_tip,oran_val_id,oran,durum,oran_val_h from oranlar_hentbol ora where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' order by id DESC");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_hentbol where id='$row[oran_val_id]'");
$hentbolmbs_ver = userayar('hentbolmbs');
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$hentbolmbs_ver|$mb[mac_time]|hentbol";
$buoran = oranbulh($mac_db_id,$row['oran_val_id']);
?>
<div class="sp_bets_cell cf" style="width:126.5px; ">
<div class="quote_txt align_c" style="width: 70px;">

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

 <? if($row['oran_val_h']!="") { echo "( <font style='color:#f00;font-weight:bold;'>$row[oran_val_h]</font> )"; } ?></div>
<div data-qa="oddsButton" class="qbut qbut-<?=md5($row['oran_val_id']."|".$mb["id"]);?>  " onclick="kupon('<?=codekupon("$encoded|$row[oran_val_id]|$buoran"); ?>');"><?=nf($buoran); ?></div>
</div>
<? if($kz==2 or $kz==4){ ?>
</div>
<div class="cf resultLines">
<? } ?>
<? } ?>
</div>
</div>
</div>
<? } else { ?>				
<div class="e_active row  cf rs-row jq-result-set-row" >
<div class="left pad_l_9 "><?=getTranslation('hentboloran'.$tip['id'].'')?></div>
<div class="right ">
<div class="cf resultLines">
<?
$sss = sed_sql_query("select mac_db_id,oran_tip,oran_val_id,oran,durum,oran_val_h from oranlar_hentbol ora where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' order by oran_val_id asc");
while($row=sed_sql_fetchassoc($sss)) {
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_hentbol where id='$row[oran_val_id]'");
$hentbolmbs_ver = userayar('hentbolmbs');
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$hentbolmbs_ver|$mb[mac_time]|hentbol";
$buoran = oranbulh($mac_db_id,$row['oran_val_id']);
?>
<div class="sp_bets_cell cf" style="width:84px; " >
<div class="quote_txt align_c" style="width: 42px;">

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

</div>
<div data-qa="oddsButton" class="qbut qbut-<?=md5($row['oran_val_id']."|".$mb["id"]);?>  " onclick="kupon('<?=codekupon("$encoded|$row[oran_val_id]|$buoran"); ?>');"><?=nf($buoran); ?></div>
</div>
<? } ?>
</div>
</div>
</div>
<? } ?>
</div>
<? } ?>
</div>
</div>
<div class="t_more_foot align_c" onclick="detayhentbolkapat(<?=$mb['id'];?>);"><?=getTranslation('foran999')?></div>
<? }


if($a=="yasaklikelimesil") {
	$sql= "DELETE FROM yasak_kelimeler WHERE id =".gd('id');
	$sor = sed_sql_query($sql);
	if(!$sor) die($sql." - ".mysql_erorr());
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

$kontrol = sed_sql_query("select * from kupon where session_id='$session_id' and canli_event='$macbilgi[eventid]'");

if(sed_sql_numrows($kontrol)>0) {

$obilgi = sed_sql_fetcharray($kontrol);

sed_sql_query("delete from kupon where id='$obilgi[id]'");

}

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

if(!empty($oran_val) && !empty($oran)) {

sed_sql_query("insert into kupon (id,mbs,mac_kodu,ev_takim,konuk_takim,mac_db_id,mac_time,mac_time_kontrol,oran_val_id,oran_tip,oran,session_id,spor_tip,oyun_tip,canli_event,canli_info,aktif,ilkgiris) values 

('','$canlimbs','CNL','$macbilgi[ev_takim]','$macbilgi[konuk_takim]','$macbilgi[id]','$mactime','$mac_timele','$oranvalid','$orantips','".$oran."','$session_id','canli','canli','$macbilgi[eventid]','$canliinfo','1','$suan')");

die("1");

}

}

if($a=="kuponraporum") {

$tarih1_ver = gd("tarih1");
$tarih2_ver = gd("tarih2");

if($tarih1_ver==1 && $tarih2_ver==0){
	$tarih1 = basla_time(date('d-m-Y'));
	$tarih2 = bitir_time(date('d-m-Y'));
	$raporsayi_ver = 1;
} else if($tarih1_ver==2 && $tarih2_ver==0){
	$tarih1 = basla_time(date('d-m-Y',strtotime("-3 day")));
	$tarih2 = bitir_time(date('d-m-Y'));
	$raporsayi_ver = 1;
} else if($tarih1_ver==3 && $tarih2_ver==0){
	$tarih1 = basla_time(date('d-m-Y',strtotime("-7 day")));
	$tarih2 = bitir_time(date('d-m-Y'));
	$raporsayi_ver = 1;
} else if($tarih1_ver==4 && $tarih2_ver==0){
	$tarih1 = basla_time(date('d-m-Y',strtotime("-30 day")));
	$tarih2 = bitir_time(date('d-m-Y'));
	$raporsayi_ver = 1;
} else if($tarih1_ver==5 && $tarih2_ver==0){
	$tarih1 = basla_time(date('d-m-Y',strtotime("-90 day")));
	$tarih2 = bitir_time(date('d-m-Y'));
	$raporsayi_ver = 1;
} else {
	$tarih1 = basla_time(gd("tarih1"));
	$tarih2 = bitir_time(gd("tarih2"));
	$raporsayi_ver = 10;
}

$islemtip = gd("islemtip");

$userid = $ub['id'];

$pageper = gd("pageper");

$gelen_sayfa = (isset($_GET['sayfa']) && $_GET['sayfa'] !='' ) ? intval($_GET['sayfa']) : 1;

if(!empty($islemtip)) { $islemtip_ekle = "and tip='$islemtip'"; } else { $islemtip_ekle = ""; }

$limit = $pageper;

$s_s = 10;

$sqladder_sayfalama = "user_id='$userid' and zaman between '$tarih1' and '$tarih2' $islemtip_ekle";

$s_sor = sed_sql_query("select count(id) from hesap_hareket_gecici2 where $sqladder_sayfalama") or trigger_error(mysql_error(),E_USER_ERROR);

$satir = mysql_result($s_sor,0);

mysql_free_result($s_sor);

if($satir >0){

$baslama = ($gelen_sayfa > 1) ? (($gelen_sayfa -1) * $limit) : 0 ;

$sayfa_kac = $satir/$limit;

$sayfa_sayisi = ($satir % $limit != 0) ? intval($sayfa_kac)+1 : intval($sayfa_kac);

$basla=( $satir >= $baslama ) ? $baslama : 0 ;

unset( $sayfa_kac, $baslama );

$sqladderone = "user_id='$userid' and zaman between '$tarih1' and '$tarih2' $islemtip_ekle order by id DESC limit $basla,$limit";

$sor = sed_sql_query("select * from hesap_hareket_gecici2 where $sqladderone");

$i=1;

$style='';

if(sed_sql_numrows($sor)<1) { ?>

<div class="space_9 clear"></div>

<div class="space_9 clear"></div>

<div class="new_sheet cf panelHead" style="margin-top: 0px;height: 25px;line-height: 25px;text-align: center;background: #fff;border-bottom: 3px solid #ef8107;border-top: 3px solid #ef8107;">
<?=getTranslation('ajaxkuponraporlari1')?>
</div>

<? } else { ?>

<table class="table table-striped table-bordered table-list" style="background-color: #fff;">
<thead>
<tr>
<th class="ng-scope">İşlem tarihi</th>
<th class="ng-scope">İşlem Türü</th>
<th class="ng-scope">Açıklama</th>
<th class="ng-scope">Miktar</th>
<th class="ng-scope">Hesap bakiyesi</th>
</tr>
</thead>

<tbody>

<?
while($ass=sed_sql_fetcharray($sor)) {
$id_bul = explode(" ",$ass['aciklama']);
?>

<tr class="ng-scope highlight-<? if($ass['tip']=="ekle"){ ?>green<? } else if($ass['tip']=="cikar"){ ?>red<? } else if($ass['tip']=="iptal"){ ?>green<? } ?>">
<td class="ng-binding"><?=date("Y-m-d H:i:s",$ass['zaman']);?></td>
<td class="ng-binding"><? if($ass['tip']=="ekle"){ ?><?=getTranslation('ajaxkuponkazanci')?><? } else if($ass['tip']=="cikar"){ ?><?=getTranslation('ajaxyatirilankupon')?><? } else if($ass['tip']=="iptal"){ ?><?=getTranslation('ajaxkuponiptali')?><? } ?></td>
<td class="ng-binding"><?=$id_bul[0];?># <? if($ass['tip']=="ekle"){ ?><?=getTranslation('ajaxkuponkazandi')?><? } else if($ass['tip']=="cikar"){ ?><?=getTranslation('ajaxkuponyatirildi')?><? } else if($ass['tip']=="iptal"){ ?><?=getTranslation('ajaxkupongeriodendi')?><? } ?></td>
<td class="ng-binding"><?=nf($ass['tutar']); ?> </td>
<td class="ng-binding">
<? if($ass['tip']=="ekle") { ?>

<?=nf($ass['onceki_tutar']+$ass['tutar']); ?>

<? } else if($ass['tip']=="cikar") { ?>

<?=nf($ass['onceki_tutar']-$ass['tutar']); ?>

<? } else if($ass['tip']=="iptal") { ?>

<?=nf($ass['onceki_tutar']+$ass['tutar']); ?>

<? } ?>
</td>
</tr>

<? } ?>

</tbody>
</table>

<span>
<div class="sheet_body_sub on cf">
<div class="main_box pager cf">

<div class="left" style="width: 65%">
<div class="pager_2 right" style="float: left;">

<? 
$hangi_sayfa= ($gelen_sayfa > 0)? $gelen_sayfa : 1 ;
?>

<?
$alt= ($gelen_sayfa - $s_s);
if($sayfa_sayisi <= $s_s || $gelen_sayfa <= $s_s ) {$alt=1;} 
$ust= (($gelen_sayfa + $s_s)< $sayfa_sayisi ) ? ($gelen_sayfa + $s_s) : ($sayfa_sayisi);	
if($gelen_sayfa > 1 ){ ?>

<a class="" href="javascript:;" onclick="raporgetir(<?=$raporsayi_ver;?>,1);" style="width: 70px;"><?=getTranslation('ajaxtumkuponlarim30');?></a>

<a class="" href="javascript:;" onclick="raporgetir(<?=$raporsayi_ver;?>,<?=$gelen_sayfa -1;?>);" id="sayfaveri" style="width: 30px;"><?=getTranslation('ajaxtumkuponlarim31');?></a>

<? } ?>
<?
for($i=$alt; $i<=$ust ;$i++){
if($i != $gelen_sayfa ){ ?>

<a class="" href="javascript:;" onclick="raporgetir(<?=$raporsayi_ver;?>,<?=$i;?>);" id="sayfaveri"><?=$i;?></a>
<? } else { ?>
<a class="on"><?=$i;?></a>
<? } ?>
<? } if($gelen_sayfa < $sayfa_sayisi){ ?>

<a class="" href="javascript:;" onclick="raporgetir(<?=$raporsayi_ver;?>,<?=$gelen_sayfa+1;?>);" id="sayfaveri" style="width: 30px;"><?=getTranslation('ajaxtumkuponlarim32');?></a>

<a class="" href="javascript:;" onclick="raporgetir(<?=$raporsayi_ver;?>,<?=$sayfa_sayisi;?>);" id="sayfaveri" style="width: 70px;"><?=getTranslation('ajaxtumkuponlarim33');?></a>

<? } ?>

</div>
</div>

<div class="left" style="width: 30%">
<div class="pager_2 right">
<span class="left"><?=getTranslation('kuponlarimozel18')?></span>
<a href="javascript:;" onclick="kazananlar_islem(10);" id="pageper_10" class="<? if($pageper==10){ ?>on<? } ?>">10</a>	
<a href="javascript:;" onclick="kazananlar_islem(11);" id="pageper_20" class="<? if($pageper==20){ ?>on<? } ?>">20</a>	
<a href="javascript:;" onclick="kazananlar_islem(12);" id="pageper_30" class="<? if($pageper==30){ ?>on<? } ?>">30</a>
</div>
</div>
</div>
</div>
</span>

<? 
$style = ($style=='') ? '2' : '';
$i++;
} ?>		









<? } else { ?>

<div class="space_9 clear"></div>

<div class="space_9 clear"></div>

<div class="new_sheet cf panelHead" style="margin-top: 0px;height: 25px;line-height: 25px;text-align: center;background: #fff;border-bottom: 3px solid #ef8107;border-top: 3px solid #ef8107;">
<?=getTranslation('ajaxkuponraporlari1')?>
</div>

<? } ?>

</div>

<? }

if($a=="kuponlarim_ozel") {

$tarih1_ver = gd("tarih1");

$tarih2_ver = gd("tarih2");

$durum = gd("durum");

$pageper = gd("pageper");

if($tarih1_ver==1 && $tarih2_ver==0){
	$tarih1 = basla_time(date('d-m-Y'));
	$tarih2 = bitir_time(date('d-m-Y'));
} else if($tarih1_ver==2 && $tarih2_ver==0){
	$tarih1 = basla_time(date('d-m-Y',strtotime("-3 day")));
	$tarih2 = bitir_time(date('d-m-Y'));
} else if($tarih1_ver==3 && $tarih2_ver==0){
	$tarih1 = basla_time(date('d-m-Y',strtotime("-7 day")));
	$tarih2 = bitir_time(date('d-m-Y'));
} else if($tarih1_ver==4 && $tarih2_ver==0){
	$tarih1 = basla_time(date('d-m-Y',strtotime("-30 day")));
	$tarih2 = bitir_time(date('d-m-Y'));
} else if($tarih1_ver==5 && $tarih2_ver==0){
	$tarih1 = basla_time(date('d-m-Y',strtotime("-90 day")));
	$tarih2 = bitir_time(date('d-m-Y'));
} else {
	$tarih1 = basla_time(gd("tarih1"));
	$tarih2 = bitir_time(gd("tarih2"));
}

if(!empty($durum)) {

if($durum=="0") { $durum_ekle = ""; } else

if($durum=="1") { $durum_ekle = "and durum='1'"; } else

if($durum=="2") { $durum_ekle = "and durum='2'"; } else 

if($durum=="3") { $durum_ekle = "and durum='3'"; } else

if($durum=="4") { $durum_ekle = "and durum='4'"; }

} else {

$durum_ekle = "";	

}

$gelen_sayfa = (isset($_GET['sayfa']) && $_GET['sayfa'] !='' ) ? intval($_GET['sayfa']) : 1;

//Bağlanılacak Tablo
$tablo = 'kuponlar';

//Sayfada kaç kayıt görünecek
$limit = $pageper;

//Kaç sayfa öncesi ve sonrası görünecek
$s_s = 10;

/*------------------------------------
Alan Başlıklarını ve $sonuc['alan1'] 
kısımlarını kendinize göre değiştirin
-------------------------------------*/

$sqladder_sayfalama = "and casino!='1' and user_id='$ub[id]' and kupon_time between '$tarih1' and '$tarih2' $durum_ekle and hesap_kesim_zaman=''";


$s_sor = sed_sql_query("select count(id) from $tablo where id!='' $sqladder_sayfalama") or trigger_error(mysql_error(),E_USER_ERROR);

$satir = mysql_result($s_sor,0);

mysql_free_result($s_sor);

if($satir >0){//sonuç varsa

$baslama = ($gelen_sayfa > 1) ? (($gelen_sayfa -1) * $limit) : 0 ;

$sayfa_kac = $satir/$limit;

$sayfa_sayisi = ($satir % $limit != 0) ? intval($sayfa_kac)+1 : intval($sayfa_kac);

$basla=( $satir >= $baslama ) ? $baslama : 0 ;

unset( $sayfa_kac, $baslama );



$sqladder = "and casino!='1' and user_id='$ub[id]' and kupon_time between '$tarih1' and '$tarih2' $durum_ekle and hesap_kesim_zaman=''";

$sor = sed_sql_query("select * from kuponlar where id!='' $sqladder order by CAST(id AS UNSIGNED) DESC limit $basla,$limit");

$i=1;

$style='';


if(sed_sql_numrows($sor)<1) { ?>

<div class="pad_9">
<?=getTranslation('ajaxkuponlarimozel1')?>
<br>
<?=getTranslation('ajaxkuponlarimozel2')?>
</div>
<? } else {

while($row=sed_sql_fetcharray($sor)) { 
$sor2 = sed_sql_query("select * from kupon_ic where kupon_id='$row[id]'");
while($row2=sed_sql_fetcharray($sor2)) {
$canlibilgi = sed_sql_query("select * from canli_maclar where id='$row2[mac_db_id]'");
if(sed_sql_numrows($canlibilgi)>0) {
$bilgisi = sed_sql_fetcharray($canlibilgi);	
if($bilgisi['songuncelleme']<$farki) {} elseif($bilgisi['devremi']=="1") { } elseif($bilgisi['gelecek']=="1") { } else{
$canlivar = "<strong><img src=/img/live.gif /></strong>";
}}} 
?>

<div class="new_sheet ">
<div class="header cf">
<div class="sheet_c1 left">
<div id="jq-<?=$row['id']; ?>" class="sheet_tab " style="" onclick="ebetAccount.togTicketSummary(this, '<?=$row['id']; ?>')"><?=$row['id']; ?></div>
</div>
<div class="sheet_c2 pad_l_6 left"><b><?=date("d.m.Y",$row['kupon_time']); ?></b>&nbsp;<?=date("H:i",$row['kupon_time']); ?></div>
<div class="sheet_c3 bold left">
<? if($row['toplam_mac']=="1"&&$row['canli']=="1") { ?>
<?=getTranslation('ajaxkuponlarimozel3')?>
<? } else if($row['toplam_mac']=="1"&&$row['canlib']=="1") { ?>
<?=getTranslation('ajaxkuponlarimozel3')?>
<? } else if($row['toplam_mac']=="1"&&$row['canlit']=="1") { ?>
<?=getTranslation('ajaxkuponlarimozel3')?>
<? } else if($row['toplam_mac']=="1"&&$row['canliv']=="1") { ?>
<?=getTranslation('ajaxkuponlarimozel3')?>
<? } else if($row['toplam_mac']=="1"&&$row['canlibuz']=="1") { ?>
<?=getTranslation('ajaxkuponlarimozel3')?>
<? } else if($row['toplam_mac']=="1"&&$row['canlih']=="1") { ?>
<?=getTranslation('ajaxkuponlarimozel3')?>
<? } else if($row['toplam_mac']=="1"&&$row['futbol']=="1") { ?>
<?=getTranslation('ajaxkuponlarimozel4')?>
<? } else if($row['toplam_mac']=="1"&&$row['tenis']=="1") { ?>
<?=getTranslation('ajaxkuponlarimozel5')?>
<? } else if($row['toplam_mac']=="1"&&$row['voleybol']=="1") { ?>
<?=getTranslation('ajaxkuponlarimozel6')?>
<? } else if($row['toplam_mac']=="1"&&$row['buzhokeyi']=="1") { ?>
<?=getTranslation('ajaxkuponlarimozel7')?>
<? } else if($row['toplam_mac']=="1"&&$row['hentbol']=="1") { ?>
<?=getTranslation('ajaxkuponlarimozel8')?>
<? } else if($row['toplam_mac']=="1"&&$row['duello']=="1") { ?>
<?=getTranslation('ajaxkuponlarimozel9')?>
<? } else if($row['toplam_mac']=="1"&&$row['basketbol']=="1") { ?>
<?=getTranslation('ajaxkuponlarimozel10')?>
<? } else { ?>
<?=getTranslation('ajaxkuponlarimozel11')?>
<?  } ?>
</div>	
<div class="sheet_c4 bold left" style="width: 132px;">	
<?=getTranslation('ajaxkuponlarimozel12')?>&nbsp;<?=nf($row['yatan']); ?></div>
<div class="sheet_c5 left align_r" style="width: 152px;">
<div class="e_active e_noCache " id="comp-myBetsBuyBack-<?=$row['id']; ?>"></div>
</div>
</div>
<div class="sheet_body cf ">
<div class="sheet_body_cont cf"><div class="sheet_c1 left">
<div class="marg_txt lightred">
<img src="/img/p-5459177B437C1911EF8A808C92C8D7C5.gif" alt="" class="<? if($row['durum']==1){ ?>p_REJECTED<? } else if($row['durum']==2){ ?>p_PAYOUT<? } else if($row['durum']==3){ ?>p_LOST<? } else if($row['durum']==4){ ?>p_DELIVERED<? } ?>" width="9" height="9">
<span class="black" style="text-transform: capitalize;">
<? if($row['durum']==1){ ?><?=getTranslation('ajaxkuponlarimozel13')?>
<? } else if($row['durum']==2){ ?><?=getTranslation('ajaxkuponlarimozel14')?>
<? } else if($row['durum']==3){ ?><?=getTranslation('ajaxkuponlarimozel15')?>
<? } else if($row['durum']==4){ ?><?=getTranslation('ajaxkuponlarimozel16')?>
<? } ?>
</span>
</div>
</div>
<div class="left">

<?
$sor2 = sed_sql_query("select * from kupon_ic WHERE kupon_id='".$row['id']."'");
while($rowS=sed_sql_fetcharray($sor2)) {
$ob_bol = explode("|",$rowS['oran_tip']);

$secim_yapimi_kuponguncelle = $ob_bol[0];
$secim_yapimi_kuponguncelle2 = $ob_bol[1];

if($row['spor_tip']=="futbol") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('foran1');
} else if($secim_yapimi_kuponguncelle=="Handikap (0:1)"){
$secilen_translate = getTranslation('foran2');
} else if($secim_yapimi_kuponguncelle=="Handikap (1:0)"){
$secilen_translate = getTranslation('foran3');
} else if($secim_yapimi_kuponguncelle=="Handikap (0:2)"){
$secilen_translate = getTranslation('foran4');
} else if($secim_yapimi_kuponguncelle=="Handikap (2:0)"){
$secilen_translate = getTranslation('foran5');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 1.YARI )"){
$secilen_translate = getTranslation('foran6');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 2.YARI )"){
$secilen_translate = getTranslation('foran7');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Çifte Şans"){
$secilen_translate = getTranslation('foran8');
} else if($secim_yapimi_kuponguncelle=="1.YARI KG"){
$secilen_translate = getTranslation('foran9');
} else if($secim_yapimi_kuponguncelle=="Beraberlikte İade"){
$secilen_translate = getTranslation('foran10');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 0.5"){
$secilen_translate = getTranslation('foran11');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran12');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran13');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran14');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 4.5"){
$secilen_translate = getTranslation('foran15');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran16');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 0.5"){
$secilen_translate = getTranslation('foran18');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran19');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran20');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran21');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 0.5"){
$secilen_translate = getTranslation('foran22');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran23');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran24');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran25');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Gol Atarmı ?"){
$secilen_translate = getTranslation('foran26');
} else if($secim_yapimi_kuponguncelle=="Deplasman Gol Atarmı ?"){
$secilen_translate = getTranslation('foran27');
} else if($secim_yapimi_kuponguncelle=="Karşılıklı Gol"){
$secilen_translate = getTranslation('foran28');
} else if($secim_yapimi_kuponguncelle=="​​​​​1.Yarı Tek/Çift"){
$secilen_translate = getTranslation('foran29');
} else if($secim_yapimi_kuponguncelle=="Tek/Çift"){
$secilen_translate = getTranslation('foran30');
} else if($secim_yapimi_kuponguncelle=="Evsahibi Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran31');
} else if($secim_yapimi_kuponguncelle=="Deplasman Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran32');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran33');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 2.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran34');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran35');
} else if($secim_yapimi_kuponguncelle=="Deplasman 2.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran36');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı A/Ü 0.5"){
$secilen_translate = getTranslation('foran37');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı A/Ü 1.5"){
$secilen_translate = getTranslation('foran38');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı A/Ü 0.5"){
$secilen_translate = getTranslation('foran39');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı A/Ü 1.5"){
$secilen_translate = getTranslation('foran40');
} else if($secim_yapimi_kuponguncelle=="Evsahibi A/Ü 1.5"){
$secilen_translate = getTranslation('foran41');
} else if($secim_yapimi_kuponguncelle=="Deplasman A/Ü 1.5"){
$secilen_translate = getTranslation('foran42');
} else if($secim_yapimi_kuponguncelle=="​​​​​Evsahibi Her 2 yarıda Gol Atar ?"){
$secilen_translate = getTranslation('foran43');
} else if($secim_yapimi_kuponguncelle=="Deplasman Her 2 yarıda Gol Atar ?"){
$secilen_translate = getTranslation('foran44');
} else if($secim_yapimi_kuponguncelle=="Hangi Devrede Fazla Gol Olur"){
$secilen_translate = getTranslation('foran45');
} else if($secim_yapimi_kuponguncelle=="Evsahibi Hangi Devrede Fazla Gol Atar ?"){
$secilen_translate = getTranslation('foran46');
} else if($secim_yapimi_kuponguncelle=="Deplasman Hangi Devrede Fazla Gol Atar ?"){
$secilen_translate = getTranslation('foran47');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-4+)"){
$secilen_translate = getTranslation('foran48');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-5+)"){
$secilen_translate = getTranslation('foran49');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-6+)"){
$secilen_translate = getTranslation('foran50');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 1 gol farkla kazanır mı?"){
$secilen_translate = getTranslation('foran51');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 2 gol farkla kazanır mı?"){
$secilen_translate = getTranslation('foran52');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 3 gol farkla kazanır mı?"){
$secilen_translate = getTranslation('foran53');
} else if($secim_yapimi_kuponguncelle=="1X2 ve toplam gol sayısı"){
$secilen_translate = getTranslation('foran54');
} else if($secim_yapimi_kuponguncelle=="Maç sonucu ve karşılıklı goller"){
$secilen_translate = getTranslation('foran55');
} else if($secim_yapimi_kuponguncelle=="İlk Yarı / Maç Sonucu"){
$secilen_translate = getTranslation('foran56');
} else if($secim_yapimi_kuponguncelle=="Skor Bahsi (90 Dakika)"){
$secilen_translate = getTranslation('foran57');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('foran58');
} else if($secim_yapimi_kuponguncelle=="Toplam Sari Kart Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran59');
} else if($secim_yapimi_kuponguncelle=="Kirmizi kart cikar mi?"){
$secilen_translate = getTranslation('foran60');
} else if($secim_yapimi_kuponguncelle=="Macta kac tane penalti olur?"){
$secilen_translate = getTranslation('foran61');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran62');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran63');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran64');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran65');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran66');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran67');
} else if($secim_yapimi_kuponguncelle=="Sarı Kart Toplam Tek/Çift"){
$secilen_translate = getTranslation('foran68');
} else if($secim_yapimi_kuponguncelle=="Hangi Takım Çok Sarı Kart Yer ?"){
$secilen_translate = getTranslation('foran69');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran70');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 6.5"){
$secilen_translate = getTranslation('foran71');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 7.5"){
$secilen_translate = getTranslation('foran72');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 8.5"){
$secilen_translate = getTranslation('foran73');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 9.5"){
$secilen_translate = getTranslation('foran74');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 10.5"){
$secilen_translate = getTranslation('foran75');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 11.5"){
$secilen_translate = getTranslation('foran76');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 12.5"){
$secilen_translate = getTranslation('foran77');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 13.5"){
$secilen_translate = getTranslation('foran78');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 14.5"){
$secilen_translate = getTranslation('foran79');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 15.5"){
$secilen_translate = getTranslation('foran80');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran81');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran82');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 4.5"){
$secilen_translate = getTranslation('foran83');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran84');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 6.5"){
$secilen_translate = getTranslation('foran85');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 7.5"){
$secilen_translate = getTranslation('foran86');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 8.5"){
$secilen_translate = getTranslation('foran87');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 9.5"){
$secilen_translate = getTranslation('foran88');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 10.5"){
$secilen_translate = getTranslation('foran89');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran90');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran91');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 4.5"){
$secilen_translate = getTranslation('foran92');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran93');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 6.5"){
$secilen_translate = getTranslation('foran94');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 7.5"){
$secilen_translate = getTranslation('foran95');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 8.5"){
$secilen_translate = getTranslation('foran96');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 9.5"){
$secilen_translate = getTranslation('foran97');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 10.5"){
$secilen_translate = getTranslation('foran98');
} else if($secim_yapimi_kuponguncelle=="Korner Toplam Tek/Çift"){
$secilen_translate = getTranslation('foran99');
} else if($secim_yapimi_kuponguncelle=="Hangi Takım Çok Korner Kullanır ?"){
$secilen_translate = getTranslation('foran100');
}

} else if($row['spor_tip']=="basketbol") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ?"){
$secilen_translate = getTranslation('boran1');
} else if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('boran2');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 1.YARI )"){
$secilen_translate = getTranslation('boran3');
} else if($secim_yapimi_kuponguncelle=="Toplam Skor Tek/Çift"){
$secilen_translate = getTranslation('boran4');
} else if($secim_yapimi_kuponguncelle=="Toplam Skor Alt/Üst"){
$secilen_translate = getTranslation('boran5');
} else if($secim_yapimi_kuponguncelle=="Handikap ( 1.YARI )"){
$secilen_translate = getTranslation('boran6');
} else if($secim_yapimi_kuponguncelle=="Handikap"){
$secilen_translate = getTranslation('boran7');
} else if($secim_yapimi_kuponguncelle=="1.Yarı / MS"){
$secilen_translate = getTranslation('boran8');
} else if($secim_yapimi_kuponguncelle=="İki Devrede Kazanır"){
$secilen_translate = getTranslation('boran9');
} else if($secim_yapimi_kuponguncelle=="Tüm Periyotları Kazanır"){
$secilen_translate = getTranslation('boran10');
} else if($secim_yapimi_kuponguncelle=="1.Takım İY Alt/Üst"){
$secilen_translate = getTranslation('boran11');
} else if($secim_yapimi_kuponguncelle=="2.Takım İY Alt/Üst"){
$secilen_translate = getTranslation('boran12');
}

}  else if($row['spor_tip']=="tenis") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ?"){
$secilen_translate = getTranslation('toran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahsi"){
$secilen_translate = getTranslation('toran2');
} else if($secim_yapimi_kuponguncelle=="1.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('toran3');
} else if($secim_yapimi_kuponguncelle=="2.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('toran4');
} else if($secim_yapimi_kuponguncelle=="1.Oyuncu 1 Set Kazanır"){
$secilen_translate = getTranslation('toran5');
} else if($secim_yapimi_kuponguncelle=="2.Oyuncu 1 Set Kazanır"){
$secilen_translate = getTranslation('toran6');
}

} else if($row['spor_tip']=="voleybol") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ?"){
$secilen_translate = getTranslation('voran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahsi"){
$secilen_translate = getTranslation('voran2');
} else if($secim_yapimi_kuponguncelle=="Toplam Alt/Üst"){
$secilen_translate = getTranslation('voran3');
} else if($secim_yapimi_kuponguncelle=="5 Set Sürermi ?"){
$secilen_translate = getTranslation('voran4');
}

} else if($row['spor_tip']=="buzhokeyi") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('buzoran1');
} else if($secim_yapimi_kuponguncelle=="1.P 1X2"){
$secilen_translate = getTranslation('buzoran2');
} else if($secim_yapimi_kuponguncelle=="2.P 1X2"){
$secilen_translate = getTranslation('buzoran3');
} else if($secim_yapimi_kuponguncelle=="3.P 1X2"){
$secilen_translate = getTranslation('buzoran4');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('buzoran5');
} else if($secim_yapimi_kuponguncelle=="1.P Çifte Şans"){
$secilen_translate = getTranslation('buzoran6');
} else if($secim_yapimi_kuponguncelle=="2.P Çifte Şans"){
$secilen_translate = getTranslation('buzoran7');
} else if($secim_yapimi_kuponguncelle=="3.P Çifte Şans"){
$secilen_translate = getTranslation('buzoran8');
}

} else if($row['spor_tip']=="hentbol") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('horan1');
} else if($secim_yapimi_kuponguncelle=="Toplam Alt/Üst"){
$secilen_translate = getTranslation('horan2');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 1.YARI )"){
$secilen_translate = getTranslation('horan3');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Alt/Üst"){
$secilen_translate = getTranslation('horan4');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Tek/Çift"){
$secilen_translate = getTranslation('horan5');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Tek/Çift"){
$secilen_translate = getTranslation('horan6');
} else if($secim_yapimi_kuponguncelle=="Toplam Tek/Çift"){
$secilen_translate = getTranslation('horan7');
}

} else if($row['spor_tip']=="canli") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('fcanlioran1');
} else if($secim_yapimi_kuponguncelle=="Handikap 1:0"){
$secilen_translate = getTranslation('fcanlioran2');
} else if($secim_yapimi_kuponguncelle=="Handikap 2:0"){
$secilen_translate = getTranslation('fcanlioran3');
} else if($secim_yapimi_kuponguncelle=="Handikap 0:1"){
$secilen_translate = getTranslation('fcanlioran4');
} else if($secim_yapimi_kuponguncelle=="Handikap 0:2"){
$secilen_translate = getTranslation('fcanlioran5');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('fcanlioran6');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Çifte Şans"){
$secilen_translate = getTranslation('fcanlioran7');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran8');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran9');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran10');
} else if($secim_yapimi_kuponguncelle=="Toplam 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran11');
} else if($secim_yapimi_kuponguncelle=="Toplam 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran12');
} else if($secim_yapimi_kuponguncelle=="Toplam 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran13');
} else if($secim_yapimi_kuponguncelle=="Toplam 3.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran14');
} else if($secim_yapimi_kuponguncelle=="Toplam 4.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran15');
} else if($secim_yapimi_kuponguncelle=="Toplam 5.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran16');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran17');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran18');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran19');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 3.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran20');
} else if($secim_yapimi_kuponguncelle=="Karşılıklı Gol Olurmu ?"){
$secilen_translate = getTranslation('fcanlioran21');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Müsabakada Gol Atarmı ?"){
$secilen_translate = getTranslation('fcanlioran22');
} else if($secim_yapimi_kuponguncelle=="Deplasman Müsabakada Gol Atarmı ?"){
$secilen_translate = getTranslation('fcanlioran23');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Tek / Çift"){
$secilen_translate = getTranslation('fcanlioran24');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Tek / Çift"){
$secilen_translate = getTranslation('fcanlioran25');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Karşılıklı Gol"){
$secilen_translate = getTranslation('fcanlioran26');
} else if($secim_yapimi_kuponguncelle=="Maç Sonucu ve Karşılıklı Gol"){
$secilen_translate = getTranslation('fcanlioran27');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran28');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran29');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran30');
} else if($secim_yapimi_kuponguncelle=="Deplasman 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran31');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran32');
} else if($secim_yapimi_kuponguncelle=="Deplasman 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran33');
} else if($secim_yapimi_kuponguncelle=="Toplam Kaç Gol Atılır ?"){
$secilen_translate = getTranslation('fcanlioran34');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Toplam Kaç Gol Atar ?"){
$secilen_translate = getTranslation('fcanlioran35');
} else if($secim_yapimi_kuponguncelle=="Deplasman Toplam Kaç Gol Atar ?"){
$secilen_translate = getTranslation('fcanlioran36');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Skoru"){
$secilen_translate = getTranslation('fcanlioran37');
} else if($secim_yapimi_kuponguncelle=="Maç Skoru"){
$secilen_translate = getTranslation('fcanlioran38');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran39');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran40');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran41');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran42');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran43');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran44');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi İlk Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran45');
} else if($secim_yapimi_kuponguncelle=="Ev sahibi İkinci Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran46');
} else if($secim_yapimi_kuponguncelle=="Deplasman İlk Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran47');
} else if($secim_yapimi_kuponguncelle=="Deplasman İkinci Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran48');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 1 Gol Farkla Kazanirmi ?"){
$secilen_translate = getTranslation('fcanlioran49');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 2 Gol Farkla Kazanirmi ?"){
$secilen_translate = getTranslation('fcanlioran50');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 3 Gol Farkla Kazanirmi ?"){
$secilen_translate = getTranslation('fcanlioran51');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Sonucu"){
$secilen_translate = getTranslation('fcanlioran52');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Sonucu"){
$secilen_translate = getTranslation('fcanlioran53');
} else if($secim_yapimi_kuponguncelle=="İlk Yarıda Kaç Gol Olur ?"){
$secilen_translate = getTranslation('fcanlioran54');
} else if($secim_yapimi_kuponguncelle=="2.Yarıda Toplam Kaç Gol Olur ?"){
$secilen_translate = getTranslation('fcanlioran55');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-4+)"){
$secilen_translate = getTranslation('fcanlioran56');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-5+)"){
$secilen_translate = getTranslation('fcanlioran57');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-6+)"){
$secilen_translate = getTranslation('fcanlioran58');
} else if($secim_yapimi_kuponguncelle=="1. yarıda 1.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran59');
} else if($secim_yapimi_kuponguncelle=="1.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran60');
} else if($secim_yapimi_kuponguncelle=="2.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran61');
} else if($secim_yapimi_kuponguncelle=="3.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran62');
} else if($secim_yapimi_kuponguncelle=="4.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran63');
} else if($secim_yapimi_kuponguncelle=="5.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran64');
} else if($secim_yapimi_kuponguncelle=="6.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran65');
} else {
$secilen_translate = $secim_yapimi_kuponguncelle;
}

} else if($row['spor_tip']=="canlib") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('bcanlioran1');
} else if($secim_yapimi_kuponguncelle=="1X2(1.YARI)"){
$secilen_translate = getTranslation('bcanlioran2');
} else if($secim_yapimi_kuponguncelle=="1X2(2.YARI)"){
$secilen_translate = getTranslation('bcanlioran3');
} else if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran4');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran5');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran6');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran7');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran8');
} else if($secim_yapimi_kuponguncelle=="Toplam Skor Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran9');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran10');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran11');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran12');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran13');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran14');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran15');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran16');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran17');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran18');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran19');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran20');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran21');
} else if($secim_yapimi_kuponguncelle=="Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran22');
}

} else if($row['spor_tip']=="canlit") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
$secilen_translate = getTranslation('tcanlioran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahisi"){
$secilen_translate = getTranslation('tcanlioran2');
}

} else if($row['spor_tip']=="canliv") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
$secilen_translate = getTranslation('vcanlioran1');
} else if($secim_yapimi_kuponguncelle=="1.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran2');
} else if($secim_yapimi_kuponguncelle=="2.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran3');
} else if($secim_yapimi_kuponguncelle=="3.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran4');
} else if($secim_yapimi_kuponguncelle=="4.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran5');
} else if($secim_yapimi_kuponguncelle=="Set bahisi (5 maç üzerinden)"){
$secilen_translate = getTranslation('vcanlioran6');
} else if($secim_yapimi_kuponguncelle=="Toplam Kaç Set Oynanır ?"){
$secilen_translate = getTranslation('vcanlioran7');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran8');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran9');
} else if($secim_yapimi_kuponguncelle=="1.Takım 1.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran10');
} else if($secim_yapimi_kuponguncelle=="2.Takım 1.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran11');
} else if($secim_yapimi_kuponguncelle=="1.Takım 2.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran12');
} else if($secim_yapimi_kuponguncelle=="2.Takım 2.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran13');
} else if($secim_yapimi_kuponguncelle=="1.Takım 3.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran14');
} else if($secim_yapimi_kuponguncelle=="2.Takım 3.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran15');
} else if($secim_yapimi_kuponguncelle=="1.Takım 4.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran16');
} else if($secim_yapimi_kuponguncelle=="2.Takım 4.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran17');
} else if($secim_yapimi_kuponguncelle=="Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran18');
} else if($secim_yapimi_kuponguncelle=="Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran19');
} else if($secim_yapimi_kuponguncelle=="1.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran20');
} else if($secim_yapimi_kuponguncelle=="2.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran21');
} else if($secim_yapimi_kuponguncelle=="3.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran22');
} else if($secim_yapimi_kuponguncelle=="4.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran23');
} else if($secim_yapimi_kuponguncelle=="Müsabaka 5.Set Sürermi"){
$secilen_translate = getTranslation('vcanlioran24');
}

} else if($row['spor_tip']=="canlibuz") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('buzcanlioran1');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('buzcanlioran2');
} else if($secim_yapimi_kuponguncelle=="Cifte Sans"){
$secilen_translate = getTranslation('buzcanlioran2');
} else if($secim_yapimi_kuponguncelle=="Hangi periyod daha cok gol olur?"){
$secilen_translate = getTranslation('buzcanlioran3');
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
<div class="jq-event-row-cont">
<div class="cf" style="color:#<? if($rowS['kazanma']==1){ ?>000<? } else if($rowS['kazanma']==2){ ?>89d047<? } else if($rowS['kazanma']==3){ ?>ff0404<? } else if($rowS['kazanma']==4){ ?>21a5d2<? } ?>;">
<div class="cf">
<div class="vanish sheet_c2 pad_l_6 left">

<? if($rowS['spor_tip']=="canli" || $rowS['spor_tip']=="canlib" || $rowS['spor_tip']=="canlit" || $rowS['spor_tip']=="canliv" || $rowS['spor_tip']=="canlibuz" || $rowS['spor_tip']=="canlih"){ ?>
<a href="javascript:;" onmouseout="untip()"><img src="assets/img/icon_live-C541123BE97E361C9D556B5B502FECC9.gif?" alt="" style="margin: 5px 3px 0 0;  middle;float:left; " width="28" height="16"></a>
<? } ?>

<div class="overWhiteSpace elli" style="padding-right:2px;"><?=date("d.m",$rowS['mac_time']); ?>&nbsp;<?=date("H:i",$rowS['mac_time']); ?></div>
</div>
<div class="sheet_c3 left">
<div><?=$rowS['ev_takim'];?> - <?=$rowS['konuk_takim'];?> <br><? if($rowS['canli_info']!=''){?><?=getTranslation('ajaxkuponlarimozel17')?> - <?=$rowS['canli_info'];?><? } ?> </div>
</div>
<div class="sheet_c4 left cf">
<div class="item_1"><img src="assets/img/help-4225AD162BB529F588A34386848CA945.gif?" alt="" class="cursor jq-helpbutton" width="11" height="11"></div>
<div class="item_2"><?=$secilen_translate;?>&nbsp;( <?=$secilen_translate2;?> )</div>
</div>
<div class="vanish sheet_c5 align_r left"><?=$rowS['oran'];?></div>
<div class="sheet_c6 align_r pad_l_5 pad_r_6 left"><span onmouseout="untip()" onmouseover="tip('<?=$rowS['ms'];?> (<?=$rowS['iy'];?>)', 9)"><?=$rowS['ms'];?> (<?=$rowS['iy'];?>)</span></div>	
<div id="jq-85469472453" class="sheet_c7 cursor lupus left" style=""></div>	
</div>
</div>
<div class="tl_content hide" style="display: block;">
</div>
</div>	

<? } ?>

</div>
</div>
<div class="sheet_body_sub off hide cf ts_wrapper">
<div class="hr bg_toughgrey ie_w100 jq-lastLine" style="display: block;margin-left: width: 754px;"></div>	
<div class="sheet_c1 left tsElement_wrapper">
<div>
<div class="space_9"></div>
<div class="hr bg_toughgrey"></div>
<div class="space_6"></div>
</div>
<img class="tsElement" src="assets/img/matrix-D51DEC43CBCF1CC59E4CDB52ECDB1DFE.png">
<a class="tsElement" href="#"><?=getTranslation('ajaxkuponlarimozel18')?></a>
<div>
<div class="space_9"></div>
<div class="hr bg_toughgrey"></div>
<div class="space_6"></div>
</div>
<div onmouseover="tip_2('Bahis kuponu Mobil üzerinden yapıldı.', jQuery(this))" onmouseout="untip()" id="submitDevice" class="print web lh_18"><?=getTranslation('ajaxkuponlarimozel19')?></div>
<div>
<div class="space_9"></div>
<div class="hr bg_toughgrey"></div>
<div class="space_6"></div>
</div>
<a class="question roll_red tsElement" href="/iletisim"><?=getTranslation('ajaxkuponlarimozel20')?></a>
<div>
<div class="space_9"></div>
<div class="hr bg_toughgrey"></div>
<div class="space_6"></div>
</div>
<a class="print roll_red lh_18 tsElement" href="javascript:;" onclick="window.open('printKupon.php?id=<?=$row['id']; ?>','<?=getTranslation('ajaxkuponlarimozel21')?>','width=350, height=500, scrollbars=0');"><?=getTranslation('ajaxkuponlarimozel21')?></a>
<div>
<div class="space_9"></div>
<div class="hr bg_toughgrey"></div>
<div class="space_6"></div>
</div>
</div>
<div class="right">
<div class="sheet_sub_col cf"><div class="left"><?=getTranslation('ajaxkuponlarimozel22')?>:</div>
<div class="right"><?=$row['toplam_mac']; ?></div>
<div class="hr bg_toughgrey clear"></div>
<div class="left "><?=getTranslation('ajaxkuponlarimozel23')?>:</div>
<div class="right ">1&nbsp;x&nbsp;<?=nf($row['yatan']); ?> &nbsp;=&nbsp;<?=nf($row['yatan']); ?> </div>
<div class="hr bg_toughgrey clear"></div>	
<div class="left"><?=getTranslation('ajaxkuponlarimozel24')?>:&nbsp;</div>
<div class="right">&nbsp;<?=nf($row['oran']); ?></div>
<div class="hr bg_toughgrey clear"></div>
<div class="left"><?=getTranslation('ajaxkuponlarimozel25')?>:</div>
<div class="right">&nbsp;<?=nf($row['tutar']); ?> </div></div>
</div>
</div>
</div>

</div>

<? } ?>

<? $style = ($style=='') ? '2' : '';

$i++;

} ?>
			

			<? 
		$hangi_sayfa= ($gelen_sayfa > 0)? $gelen_sayfa : 1 ;
		echo '<div style="text-align:center;"><nav class="zipagin-light light-green">';	
	
	
			$alt= ($gelen_sayfa - $s_s);
			if($sayfa_sayisi <= $s_s || $gelen_sayfa <= $s_s ) {$alt=1;} 
			$ust= (($gelen_sayfa + $s_s)< $sayfa_sayisi ) ? ($gelen_sayfa + $s_s) : ($sayfa_sayisi);	
			echo ($gelen_sayfa > 1 )? '<a class="" href="javascript:;" onclick="kupongetir(1,1);" id="sayfaveri">'.getTranslation('ajaxtumkuponlarim30').'</a><a class="" href="javascript:;" id="sayfaveri" onclick="kupongetir(1,'.($gelen_sayfa -1).');">« '.getTranslation('ajaxtumkuponlarim31').'</a>':' ';
			for($i=$alt; $i<=$ust ;$i++){		
				echo ($i != $gelen_sayfa ) ? '<a class="" href="javascript:;" id="sayfaveri" onclick="kupongetir(1,'.$i.');">'.$i.'</a>' : '<span>'.$i.'</span>';
				}
			echo ($gelen_sayfa < $sayfa_sayisi)? '<a class="" href="javascript:;" id="sayfaveri" onclick="kupongetir(1,'.($gelen_sayfa +1).');">'.getTranslation('ajaxtumkuponlarim32').' »</a><a class="" href="javascript:;" id="sayfaveri" onclick="kupongetir(1,'.$sayfa_sayisi.');">'.getTranslation('ajaxtumkuponlarim33').'</a>' :'';
			echo '</nav></div>';
} else { ?>
<div class="pad_9">
<?=getTranslation('ajaxkuponlarimozel1')?>
<br>
<?=getTranslation('ajaxkuponlarimozel2')?>
</div>
<? } ?>
<script>

function kupon_iptal(id) {

if(confirm(''+id+' <?=getTranslation('ajaxnumaralikuponiptaletmek')?>')) {

loadall();

var rand = Math.random();

$.get('ajax.php?a=kuponiptal&id='+id+'&rand='+rand+'',function(data) { 

if(data=="401") { failcont('<?=getTranslation('failconthata')?>','<?=getTranslation('failconthata19')?>'); } else

if(data=="404") { failcont('<?=getTranslation('failconthata')?>','<?=getTranslation('failconthata20')?>'); } else {

kupongetir(5);

limitupdate();

}

});

}

}

function kupon_odendi(id) {

if(confirm(''+id+' <?=getTranslation('ajaxnumaralikuponuodendi')?>')) {

loadall();

var rand = Math.random();

$.get('ajax.php?a=kuponodendi&id='+id+'&rand='+rand+'',function(data) { 

if(data=="401") { failcont('<?=getTranslation('failconthata')?>','<?=getTranslation('failconthata19')?>'); } else

if(data=="404") { failcont('<?=getTranslation('failconthata')?>','<?=getTranslation('failconthata20')?>'); } else {

kupongetir(5);

limitupdate();

}

});

}

}

</script>



<? }

if($a=="kuponodendi") {

$id = gd("id");

$row = bilgi("select * from kuponlar where id='$id'");

$bayilerim = explode(",",benimbayilerim($ub['id']));

$user_id = $row['user_id'];

if(!in_array($user_id,$bayilerim)) { die("401"); }

sed_sql_query("update kuponlar set odendi='1' where id='$id'");

}

if($a=="bayidurumdegis") {

$id = gd("id");

$durum = gd("durum");

$bayilerim = "".benimbayilerim($ub['id']).",$id";

$bayi_array = explode(",",$bayilerim);

if(!in_array($id,$bayi_array)) { die("22"); }

bayidurumdegis($id,$durum);

}

if($a=="bayisil") {

$id = gd("id");

$bayilerim = benimbayilerim($ub['id']);

$bayi_array = explode(",",$bayilerim);
if($ub['bayisilmeyetki']!="1"){die("Bayi silme yetkiniz bulunmamakta");}
if(!in_array($id,$bayi_array)) { die("<div class='bos'>Cok guzel hareketler bunlar ;*</div>"); }

uyelerisil($id);

if(file_exists("sistem/natoservers/hesap_sahibi_id_".$ub['id'].".xml")) {

unlink("sistem/natoservers/hesap_sahibi_id_".$ub['id'].".xml");

benimbayilerim($ub['id']);

}

}


if($a=="bayisil_superbayi") {

$id = gd("id");

$bayilerim = benimbayilerim($ub['id']);

$bayi_array = explode(",",$bayilerim);
if($ub['bayisilmeyetki']!="1"){die("Bayi silme yetkiniz bulunmamakta");}
if(!in_array($id,$bayi_array)) { die("<div class='bos'>Cok guzel hareketler bunlar ;*</div>"); }

$bilgisi = bilgi("select * from kullanici where id='".gd('id')."'");
$rand = time();

sed_sql_query("update kullanici set bakiye=bakiye+$bilgisi[bakiye] where id='$bilgisi[hesap_sahibi_id]'");

sed_sql_query("update kullanici set root='1',silinme_tarihi='".time()."',silinirkenbakiye=bakiye,bakiye='0' where id='$bilgisi[id]'");


if(file_exists("sistem/natoservers/hesap_sahibi_id_".$ub['id'].".xml")) {

unlink("sistem/natoservers/hesap_sahibi_id_".$ub['id'].".xml");

benimbayilerim($ub['id']);

}

}


if($a=="bayisil_admin") {

$id = gd("id");

$bayilerim = benimbayilerim($ub['id']);

$bayi_array = explode(",",$bayilerim);
if($ub['bayisilmeyetki']!="1"){die("Bayi silme yetkiniz bulunmamakta");}
if(!in_array($id,$bayi_array)) { die("<div class='bos'>Cok guzel hareketler bunlar ;*</div>"); }



$altuyeleri = sed_sql_query("select * from kullanici where hesap_sahibi_id='".gd('id')."'");
while($row=sed_sql_fetcharray($altuyeleri)) {
$rand = time();
sed_sql_query("update kullanici set root='1',silinme_tarihi='".time()."' where id='$row[id]'");
$kontrol = sed_sql_query("select * from kullanici where hesap_sahibi_id='$row[id]'");
}
$bilgisi = bilgi("select * from kullanici where id='".gd('id')."'");
$rand = time();

sed_sql_query("update kullanici set root='1',silinme_tarihi='".time()."' where id='$bilgisi[id]'");

sed_sql_query("update kullanici set alt_sinir=alt_sinir+$bilgisi[alt_sinir] where id='$bilgisi[hesap_sahibi_id]'");


if(file_exists("sistem/natoservers/hesap_sahibi_id_".$ub['id'].".xml")) {

unlink("sistem/natoservers/hesap_sahibi_id_".$ub['id'].".xml");

benimbayilerim($ub['id']);

}

}


if($a=="bayisil_super") {

$id = gd("id");

$bayilerim = benimbayilerim($ub['id']);

$bayi_array = explode(",",$bayilerim);
if($ub['bayisilmeyetki']!="1"){die("Bayi silme yetkiniz bulunmamakta");}
if(!in_array($id,$bayi_array)) { die("<div class='bos'>Cok guzel hareketler bunlar ;*</div>"); }



$altuyeleri = sed_sql_query("select * from kullanici where hesap_sahibi_id='".gd('id')."'");
while($row=sed_sql_fetcharray($altuyeleri)) {
$rand = time();
sed_sql_query("update kullanici set root='1',silinme_tarihi='".time()."' where id='$row[id]'");
$kontrol = sed_sql_query("select * from kullanici where hesap_sahibi_id='$row[id]'");
}
$bilgisi = bilgi("select * from kullanici where id='".gd('id')."'");
$rand = time();
sed_sql_query("update kullanici set root='1',silinme_tarihi='".time()."' where id='$bilgisi[id]'");


if(file_exists("sistem/natoservers/hesap_sahibi_id_".$ub['id'].".xml")) {

unlink("sistem/natoservers/hesap_sahibi_id_".$ub['id'].".xml");

benimbayilerim($ub['id']);

}

}


if($a=="bayisil_patronjoker") {

$id = gd("id");

$bayilerim = benimbayilerim($ub['id']);

$bayi_array = explode(",",$bayilerim);
if($ub['bayisilmeyetki']!="1"){die("Bayi silme yetkiniz bulunmamakta");}
if(!in_array($id,$bayi_array)) { die("<div class='bos'>Cok guzel hareketler bunlar ;*</div>"); }



$altuyeleri = sed_sql_query("select * from kullanici where hesap_sahibi_id='".gd('id')."'");
while($row=sed_sql_fetcharray($altuyeleri)) {
$rand = time();
sed_sql_query("update kullanici set root='1',silinme_tarihi='".time()."' where id='$row[id]'");
$kontrol = sed_sql_query("select * from kullanici where hesap_sahibi_id='$row[id]'");
}
$bilgisi = bilgi("select * from kullanici where id='".gd('id')."'");
$rand = time();
sed_sql_query("update kullanici set root='1',silinme_tarihi='".time()."' where id='$bilgisi[id]'");


if(file_exists("sistem/natoservers/hesap_sahibi_id_".$ub['id'].".xml")) {

unlink("sistem/natoservers/hesap_sahibi_id_".$ub['id'].".xml");

benimbayilerim($ub['id']);

}

}





if($a=="bayiler") {

$id = gd("id");

if($id=="1" && $ub['id']!="1") { die("..."); }

$bayilerim = benimbayilerim($ub['id']);

$bayi_array = explode(",",$bayilerim);

if(!in_array($id,$bayi_array)) { die("<div class='bos'>Bu yetkiye <strong>MAALESEF</strong> sahip değilsiniz.</div>"); }





$order = gd("order");

$ascdesc = gd("ascdesc");



if($order=="bakiye") {

	$ordered = "order by CAST($order AS UNSIGNED) $ascdesc";

} else {

	$ordered = "order by $order $ascdesc";

}



if($ascdesc=="asc") { $neworder = "desc"; } else { $neworder = "asc"; }

$sor = sed_sql_query("select * from kullanici where hesap_sahibi_id='$id' and root='0' $ordered");

if(sed_sql_numrows($sor)<1) { echo "<div class='incont'><div class='warn'>Herhangi bir hesap bulunamadı</div></div>"; } else { 

$obilgi = bilgi("select * from kullanici where id='$id'");

?>

<script>

function asdes(order,as) {

$("#order").val(order);	

$("#ascdesc").val(as);

$("#suanval").val(1);

bayiler(<?=$id;?>);

}

function bayidurum(id,durum) {

var rand = Math.random();	

$.get('ajax.php?a=bayidurumdegis&id='+id+'&durum='+durum+'',function(data) { bayiler('<?=$id;?>'); });

}

function bayisil_superbayi(id,uname) {

var rand = Math.random();

if(confirm(''+uname+' adlı kullanıcıyı silmek istediğinizden emin misiniz?')) {

$.get('ajax.php?a=bayisil_superbayi&id='+id+'&rand='+rand+'',function(data) { $("#users").html(data); bayiler('<?=$id;?>'); });	

}	

}


function bayisil_admin(id,uname) {

var rand = Math.random();

if(confirm(''+uname+' adlı kullanıcıyı ve ona bağlı alt kullanıcıları (bayileri, web kullanıcılarını) silmek istediğinizden emin misiniz?')) {

$.get('ajax.php?a=bayisil_admin&id='+id+'&rand='+rand+'',function(data) { $("#users").html(data); bayiler('<?=$id;?>'); });	

}	

}


function bayisil_super(id,uname) {

var rand = Math.random();

if(confirm(''+uname+' adlı kullanıcıyı ve ona bağlı alt kullanıcıları (bayileri, web kullanıcılarını) silmek istediğinizden emin misiniz?')) {

$.get('ajax.php?a=bayisil_super&id='+id+'&rand='+rand+'',function(data) { $("#users").html(data); bayiler('<?=$id;?>'); });	

}	

}


function bayisil_patronjoker(id,uname) {

var rand = Math.random();

if(confirm(''+uname+' adlı kullanıcıyı ve ona bağlı alt kullanıcıları (bayileri, web kullanıcılarını) silmek istediğinizden emin misiniz?')) {

$.get('ajax.php?a=bayisil_patronjoker&id='+id+'&rand='+rand+'',function(data) { $("#users").html(data); bayiler('<?=$id;?>'); });	

}	

}


</script>

<? if($id!=$ub['id']) { ?>

<div class="incont">

<div class="warn">Şu anda <span style="color:#f00;font-weight:bold"><?=$obilgi['username']; ?></span> kullanıcısına ait kullanıcıları listeliyorsunuz.</div>

<div style="padding: 10px 5px 10px;"><a href="javascript:;" onClick="bayiler('<?=$ub['id']; ?>');" class="button" style="font-size:12px;">Geri Dön</a></div>

</div>


<? } ?>

<div class="incont">
	
<div id="ulist">


<table class="tablo" cellpadding="0" cellspacing="0">
	<tbody><tr class="head">
    	<td>Kullanıcı Adı</td>
       	<td>Hesap Tipi</td>
        <td class="alr">Limit</td>
        <td class="alc">Ağı</td>        
		<td class="alc">Oluşturma</td>
        <td class="alc">Son Görülme</td>
		<td class="alc">Limit İşlemi</td>
        <td class="alc">Durum</td>
        <td class="alc">Durum Değiştir</td>
        <td class="alc"></td>
    </tr>

<?

while($row=sed_sql_fetcharray($sor)) {

$alttotal=sed_sql_numrows(sed_sql_query("select hesap_sahibi_id from kullanici where hesap_sahibi_id='$row[id]' and root='0'"));

?>

<tr class="line">
    	<td><b><?=$row['username']; ?></b><span class="remem_name"><?=$row['hatirlatmaad']; ?></span></td>
       <td><?=hesap_tipi($row['id']); ?></td>
        <td style="width:100px; font-weight: bold; color:#BC2121;" class="alr"><?=nf($row['bakiye']); ?></td>
        <td style="width:130px;" class="alc">
		
		<? if($alttotal>0) { ?><a class="redlink" style="width: 50px;" href="javascript:;" onClick="bayiler('<?=$row['id']; ?>');">(<?=$alttotal?>)</a><? } else { echo "Bulunamadı"; } ?></td>        
		<td style="width:100px;" class="alc"><?=date("d.m H:i",$row['olusturma_zaman']); ?></td>
        <td style="width:100px;" class="alc"><? if(empty($row['sonislem'])) { echo "Hiç bir zaman"; } else { ?><?=date("d.m H:i",$row['sonislem']); ?><? } ?></td>
		<td style="width:100px;" class="alc"><? if($row['alt_durum']>0) { ?>Limit gerekmiyor<? } else 

if($id!=$ub['id']) { ?>Yetkiniz dışında<? } else

{ ?>

<a href="javascript:;" onClick="bakiye('ekle','<?=$row['id'];?>');" class="greenlink">Ekle</a>

<a href="javascript:;" onClick="bakiye('cikar','<?=$row['id']; ?>');" class="redlink">Çıkar</a>

<div class="bakiyedurum" id="b_<?=$row['id']; ?>">

<span><font color="white"><?=$row['username']; ?> kullanıcısı</span>

<span id="eklecikar_<?=$row['id']; ?>"></span></font>

<span style="color:#f00;font-weight:bold">Bakiyesi : <?=nf($row['bakiye']); ?> TL</span>

<input type="text" class="input" id="bakiye_<?=$row['id']; ?>" style="width:95%;">

<input type="hidden" id="bakiyedurum_<?=$row['id']; ?>" value=""> 

<font><input type="button" class="button min" value="İşle" onClick="nowbak('<?=$row['id']; ?>');"> &nbsp;&nbsp; <a href="javascript:;" onClick="$('#b_<?=$row['id'];?>').fadeOut();" class="redlink">Kapat</a></font>

</div>

</td>

<? } ?>
        <td style="width:50px;" class="alc" class="<? if($row['durum']=="1") { echo "kaz"; $dur = "Aktif"; } else if($row['durum']=="0") { echo "kay"; $dur = "Pasif"; } ?>"><strong><?=$dur;?></strong></b></td>
        <td style="width:90px;" class="alc"><? if($dur=="Aktif") { ?><a href="javascript:;" onClick="bayidurum('<?=$row['id']; ?>','0');" class="redlink">Durdur</a><? } else if($dur=="Pasif") { ?><a href="javascript:;" onClick="bayidurum('<?=$row['id']; ?>','1');" class="greenlink">Başlat</a><? } ?></td>    	
		<td style="width:160px;" class="alc">
        <? if($id!=$ub['id']) { ?> <a class="tablolink">Yetkin Dışı</a> <? } else { ?>
		<a href="#" onclick="document.location.href ='bayiduzenle.php?id=<?=$row['id']; ?>'" class="tablolink"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Düzenle</a>

<? } ?>

<?
if($ub['bayisilmeyetki']!="0"){

if($ub['sahip']=="1") { ?>
<a href="javascript:;" onClick="bayisil_patronjoker('<?=$row['id']; ?>','<?=$row['username']; ?>');" class="redlink"><i class="fa fa-window-close-o" aria-hidden="true"></i> Sil</a>
<? } else if($ub['alt_alt_durum']=="1") { ?>
<a href="javascript:;" onClick="bayisil_super('<?=$row['id']; ?>','<?=$row['username']; ?>');" class="redlink"><i class="fa fa-window-close-o" aria-hidden="true"></i> Sil</a>
<? } else if($ub['alt_durum']=="1") { ?>
<a href="javascript:;" onClick="bayisil_admin('<?=$row['id']; ?>','<?=$row['username']; ?>');" class="redlink"><i class="fa fa-window-close-o" aria-hidden="true"></i> Sil</a>
<? } else if($ub['wkyetki']=="1") { ?>
<a href="javascript:;" onClick="bayisil_superbayi('<?=$row['id']; ?>','<?=$row['username']; ?>');" class="redlink"><i class="fa fa-window-close-o" aria-hidden="true"></i> Sil</a>
<? } } else { ?>
<? } ?>







		        </td>
    </tr>
	
	<? } ?>
    </tbody></table>

<? }

}


if($a=="karaliste") {

$id = gd("id");

if(gd('islem')=="gerial_superbayi"){

sed_sql_query("UPDATE kullanici SET root='0',silinme_tarihi='' WHERE id ='".gd('id')."'")or die(mysql_error());


}


if(gd('islem')=="gerial_admin"){

$bilgisi = bilgi("select * from kullanici where id='".gd('id')."'");

$hesap_alt_sinir = $bilgisi['alt_sinir'];

$hesap_sahibi_kim_id = $bilgisi['hesap_sahibi_id'];

sed_sql_query("UPDATE kullanici SET root='0',silinme_tarihi='' WHERE id='".gd('id')."'")or die(mysql_error());

sed_sql_query("UPDATE kullanici SET alt_sinir=alt_sinir-$hesap_alt_sinir WHERE id='$hesap_sahibi_kim_id'")or die(mysql_error());

sed_sql_query("UPDATE kullanici SET root='0',silinme_tarihi='' WHERE hesap_sahibi_id='".gd('id')."'")or die(mysql_error());


}


if(gd('islem')=="gerial_super"){

sed_sql_query("UPDATE kullanici SET root='0',silinme_tarihi='' WHERE id='".gd('id')."'")or die(mysql_error());

sed_sql_query("UPDATE kullanici SET root='0',silinme_tarihi='' WHERE hesap_sahibi_id='".gd('id')."'")or die(mysql_error());

sed_sql_query("UPDATE kullanici SET root='0',silinme_tarihi='' WHERE hesap_root_id='".gd('id')."'")or die(mysql_error());


}


if(gd('islem')=="gerial_patronjoker"){

sed_sql_query("UPDATE kullanici SET root='0',silinme_tarihi='' WHERE id='".gd('id')."'")or die(mysql_error());

sed_sql_query("UPDATE kullanici SET root='0',silinme_tarihi='' WHERE hesap_sahibi_id='".gd('id')."'")or die(mysql_error());

sed_sql_query("UPDATE kullanici SET root='0',silinme_tarihi='' WHERE hesap_root_id='".gd('id')."'")or die(mysql_error());

sed_sql_query("UPDATE kullanici SET root='0',silinme_tarihi='' WHERE hesap_root_root_id='".gd('id')."'")or die(mysql_error());


}

if($id=="1" && $ub['id']!="1") { die("..."); }

$bayilerim = benimbayilerim($ub['id']);

$bayi_array = explode(",",$bayilerim);

if(!in_array($id,$bayi_array)) { die("<div class='bos'>Bu yetkiye <strong>MAALESEF</strong> sahip değilsiniz.</div>"); }





$order = gd("order");

$ascdesc = gd("ascdesc");



if($order=="bakiye") {

	$ordered = "order by CAST($order AS UNSIGNED) $ascdesc";

} else {

	$ordered = "order by $order $ascdesc";

}



if($ascdesc=="asc") { $neworder = "desc"; } else { $neworder = "asc"; }

$sor = sed_sql_query("select * from kullanici where hesap_sahibi_id='$id' and root='1' and sil='0' $ordered");

if(sed_sql_numrows($sor)<1) { ?>


<div class="incont">
<div style="color:#f00" class="warn">Kara Listeye Alınmış Üye Bulunamadı.</div>
</div>


<div class="incont">
<? if($ub['wkyetki']=="1") { ?>
<div class="warn" style="color:#f00">Kara Liste'ye Alınan Üyenin Limiti Sıfırlanır (Limit Yazan Yerdeki Limit Silinmeden Önceki Limit'dir) Geri Yükledikten Sonra Tekrar O Limiti Verebilirsiniz.</div>
<? } ?>
<div class="warn">Kara Liste'ye Alınan Üyeler 45 Gün İçerisinde Silinmektedir.</div>
<div class="warn">Kara Liste'deki Üyelerin Kuponları Herşeyi Sistemde Durmaktadır Üye Silindiğinde Tüm Kuponlarıda Silinmektedir.</div>
<div class="warn">Kara Liste'deki Üyeler 45 Gün Sonra Tamamen Silinmektedir ve Geri Dönüşü Olmamaktadır.</div>
<div class="warn">Bu Kural'lar Gereğince Tüm Sorumluluk Size Ait'tir Sorumluluk Kabül Edilmemektedir ve Geri Dönüşü Asla Yoktur...</div>
</div>


<? } else { 

$obilgi = bilgi("select * from kullanici where id='$id'");

?>

<script>

function asdes(order,as) {

$("#order").val(order);	

$("#ascdesc").val(as);

$("#suanval").val(1);

bayiler(<?=$id;?>);

}
</script>

<div class="incont">

<? if($ub['wkyetki']=="1") { ?>
<div class="warn" style="color:#f00">Kara Liste'ye Alınan Üyenin Limiti Sıfırlanır (Limit Yazan Yerdeki Limit Silinmeden Önceki Limit'dir) Geri Yükledikten Sonra Tekrar O Limiti Verebilirsiniz.</div>
<? } ?>


<div class="warn">Kara Liste'ye Alınan Üyeler 45 Gün İçerisinde Silinmektedir.</div>
<div class="warn">Kara Liste'deki Üyelerin Kuponları Herşeyi Sistemde Durmaktadır Üye Silindiğinde Tüm Kuponlarıda Silinmektedir.</div>
<div class="warn">Kara Liste'deki Üyeler 45 Gün Sonra Tamamen Silinmektedir ve Geri Dönüşü Olmamaktadır.</div>
<div class="warn">Bu Kural'lar Gereğince Tüm Sorumluluk Size Ait'tir Sorumluluk Kabül Edilmemektedir ve Geri Dönüşü Asla Yoktur...</div>
<div class="warn">Krediniz Eğer Kullanıcının Kredisinden Düşükse Kullanıcıyı Geri Yükleyemezsiniz...</div>
</div>

<div class="incont">
	
<div id="ulist">


<table class="tablo" cellpadding="0" cellspacing="0">
<tbody><tr class="head">
<td style="width:12%;">Kullanıcı Adı</td>
<td style="width:12%;">Hatırlatma Adı</td>
<td style="width:12%;">Hesap Tipi</td>
<td style="width:8%;">Limit</td>
<td style="width:12%;" class="alc">Silinme Tarihi</td>
<td style="width:8%;" class="alc">Kredisi</td>
<td style="width:25%;" class="alc">Sizin Krediniz</td>


<td class="alc"></td>



</tr>

<?

while($row=sed_sql_fetcharray($sor)) {

$alttotal=sed_sql_numrows(sed_sql_query("select hesap_sahibi_id from kullanici where hesap_sahibi_id='$row[id]' and root='0'"));

?>

<tr class="line">
<td><b><?=$row['username']; ?></b></td>
<td><b><span class="remem_name"><?=$row['hatirlatmaad']; ?></span></b></td>
<td><b><span class="remem_name"><?=hesap_tipi($row['id']); ?></span></b></td>

<? if($ub['wkyetki']=="1") { ?>
<td style="width:100px; font-weight: bold; color:#BC2121;"><?=nf($row['silinirkenbakiye']); ?></td>
<? } else { ?>
<td style="width:100px; font-weight: bold; color:#BC2121;"><?=nf($row['bakiye']); ?></td>
<? } ?>

<td style="width:100px;" class="alc"><?=date("d.m.Y H:i:s",$row['silinme_tarihi']); ?></td>
<td style="width:100px;" class="alc"><b><span class="remem_name"><?=$row['alt_sinir']; ?></span></b></td>

<td style="width:100px;" class="alc">
<b>


<? if($ub['alt_alt_durum']=="0" && $ub['alt_durum']=="1") {

$toplam_kullanici = sed_sql_numrows(sed_sql_query("select hesap_sahibi_id,root from kullanici where hesap_sahibi_id='$ub[id]' and root='0'"));

if($ub['alt_sinir'] > $row['alt_sinir']) {

?>

<span style="font-size: 11px;display: inherit;"> ( <?=$ub['alt_sinir']; ?> ) </span><span style="font-size: 11px;display: inherit;">Krediniz Bayiyi Geri Açmak İçin Yeterli</span>
<? } else { ?>
<span style="font-size: 11px;display: inherit;"> ( <?=$ub['alt_sinir']; ?> ) </span><span style="font-size: 11px;display: inherit;">Krediniz Bayiyi Geri Açamak İçin Yetersiz</span>
<? } ?>

<? } else if($ub['sahip']=="1") {

$toplam_kullanici = sed_sql_numrows(sed_sql_query("select hesap_sahibi_id,root from kullanici where hesap_sahibi_id='$ub[id]' and root='0'"));

if($ub['alt_sinir'] > $toplam_kullanici) {

?>

<span style="font-size: 11px;display: inherit;"> ( <?=$ub['alt_sinir']; ?> ) </span><span style="font-size: 11px;display: inherit;color: #BC2121;"> <?=$alt_sinirini_esle;?> </span> 
<span style="font-size: 11px;display: inherit;">Krediniz Bayiyi Geri Açmak İçin Yeterli</span>
<? } else { ?>
<span style="font-size: 11px;display: inherit;"> ( <?=$ub['alt_sinir']; ?> ) </span><span style="font-size: 11px;display: inherit;color: #BC2121;"> <?=$alt_sinirini_esle;?> </span>
<span style="font-size: 11px;display: inherit;">Krediniz Bayiyi Geri Açamak İçin Yetersiz</span>
<? } ?>

<? } else if($ub['wkyetki']=="1") {

$toplam_kullanici = sed_sql_numrows(sed_sql_query("select hesap_sahibi_id,root from kullanici where hesap_sahibi_id='$ub[id]' and root='0'"));

if($ub['alt_sinir'] > $toplam_kullanici) {

?>

<span style="font-size: 11px;display: inherit;"> ( <?=$ub['alt_sinir']; ?> ) </span><span style="font-size: 11px;display: inherit;color: #BC2121;"> <?=$alt_sinirini_esle;?> </span> 
<span style="font-size: 11px;display: inherit;">Krediniz Bayiyi Geri Açmak İçin Yeterli</span>
<? } else { ?>
<span style="font-size: 11px;display: inherit;"> ( <?=$ub['alt_sinir']; ?> ) </span><span style="font-size: 11px;display: inherit;color: #BC2121;"> <?=$alt_sinirini_esle;?> </span>
<span style="font-size: 11px;display: inherit;">Krediniz Bayiyi Geri Açamak İçin Yetersiz</span>
<? } ?>

<? } else if($ub['sahip']=="0" && $ub['alt_alt_durum']=="1") {

$toplam_kullanici = sed_sql_numrows(sed_sql_query("select hesap_sahibi_id,root from kullanici where hesap_sahibi_id='$ub[id]' and root='0'"));

if($ub['alt_sinir'] > $toplam_kullanici) {

?>

<span style="font-size: 11px;display: inherit;"> ( <?=$ub['alt_sinir']; ?> ) </span><span style="font-size: 11px;display: inherit;">Krediniz Bayiyi Geri Açmak İçin Yeterli</span>
<? } else { ?>
<span style="font-size: 11px;display: inherit;"> ( <?=$ub['alt_sinir']; ?> ) </span><span style="font-size: 11px;display: inherit;">Krediniz Bayiyi Geri Açamak İçin Yetersiz</span>
<? } ?>

<? } ?>



</b>
</td>	

<? 

$toplam_kullanici_bul_bakem = sed_sql_numrows(sed_sql_query("select hesap_sahibi_id,root from kullanici where hesap_sahibi_id='$ub[id]' and root='0'"));

if($ub['sahip']=="1" && $ub['alt_sinir']>$toplam_kullanici_bul_bakem) { ?>

<td style="width:160px;" class="alc">
<a class="tablolink" title="Geri Yükle" href="javascript:;" onClick="var onayla =confirm('Emin Misiniz?'); if(onayla) { $.ajax({url:'ajax.php?a=karaliste&islem=gerial_patronjoker&id=<?=$row['id']?>',success:function(data){location.reload();}}); }">
Geri Yükle</a>
</td>

<? } else if($ub['alt_alt_durum']=="1" && $ub['sahip']=="0" && $ub['alt_sinir']>$toplam_kullanici_bul_bakem) { ?>

<td style="width:160px;" class="alc">
<a class="tablolink" title="Geri Yükle" href="javascript:;" onClick="var onayla =confirm('Emin Misiniz?'); if(onayla) { $.ajax({url:'ajax.php?a=karaliste&islem=gerial_super&id=<?=$row['id']?>',success:function(data){location.reload();}}); }">
Geri Yükle</a>
</td>

<? } else if($ub['alt_alt_durum']=="0" && $ub['alt_durum']=="1" && $ub['alt_sinir'] > $row['alt_sinir']) { ?>


<td style="width:160px;" class="alc">
<a class="tablolink" title="Geri Yükle" href="javascript:;" onClick="var onayla =confirm('Emin Misiniz?'); if(onayla) { $.ajax({url:'ajax.php?a=karaliste&islem=gerial_admin&id=<?=$row['id']?>',success:function(data){location.reload();}}); }">
Geri Yükle</a>
</td>

<? } else if($ub['wkyetki']=="1" && $ub['alt_sinir']>$toplam_kullanici_bul_bakem) { ?>

<td style="width:160px;" class="alc">
<a class="tablolink" title="Geri Yükle" href="javascript:;" onClick="var onayla =confirm('Emin Misiniz?'); if(onayla) { $.ajax({url:'ajax.php?a=karaliste&islem=gerial_superbayi&id=<?=$row['id']?>',success:function(data){location.reload();}}); }">
Geri Yükle</a>
</td>

<? } ?>

</tr>

<? } ?>

</tbody>

</table>

<? }

}


if($a=="bayilerh") {

$id = gd("id");

if($id=="1" && $ub['id']!="1") { die("..."); }

$bayilerim = benimbayilerim($ub['id']);

$bayi_array = explode(",",$bayilerim);

if(!in_array($id,$bayi_array)) { die("<div class='bos'>Bu yetkiye <strong>MAALESEF</strong> sahip değilsiniz.</div>"); }





$order = gd("order");

$ascdesc = gd("ascdesc");



if($order=="bakiye") {

	$ordered = "order by CAST($order AS UNSIGNED) $ascdesc";

} else {

	$ordered = "order by $order $ascdesc";

}



if($ascdesc=="asc") { $neworder = "desc"; } else { $neworder = "asc"; }

$sor = sed_sql_query("select * from kullanici where hesap_sahibi_id='$id' and root='0' $ordered");

if(sed_sql_numrows($sor)<1) { echo "<div class='bos' style='text-align: center;font-weight: bold;margin: 5px;'>Herhangi bir hesap bulunamadı</div>"; } else { 

$obilgi = bilgi("select * from kullanici where id='$id'");

?>

<script>

function asdes(order,as) {

$("#order").val(order);	

$("#ascdesc").val(as);

$("#suanval").val(1);

bayiler(<?=$id;?>);

}

function bahisKapatin(id,duro,tip) {

	var rand = Math.random();

	$.get('ajax.php?a=bahiskapatin&id='+id+'&duro='+duro+'&rand='+rand+'&tip='+tip+'',function(data) { bayiler(<?=$id;?>); });	

}

</script>

<? if($id!=$ub['id']) { ?>

<div class="incont">

<div class="warn">Şu anda <span style="color:#f00;font-weight:bold"><?=$obilgi['username']; ?></span> kullanıcısına ait kullanıcıları listeliyorsunuz.</div>

<div style="padding: 10px 5px 10px;"><a href="javascript:;" onClick="bayiler('<?=$ub['id']; ?>');" class="button" style="font-size:12px;">Geri Dön</a></div>

</div>

<? } ?>

<div class="incont">
	
<div id="ulist">


<table class="tablo" cellpadding="0" cellspacing="0">
	<tbody><tr class="head">
    	<td>Tüm Bahisler</td>
       	<td>Basketbol</td>
        <td>Duello</td>
         <td>Canlı <?=getTranslation('futbol')?></td>
		  <td>Canlı Basketbol</td>
		   <td>Sanal</td>
		   <td><a href="javascript:;" onClick="asdes('username','<?=$neworder;?>');">Kullanıcı Adı</a></td>
		    <td><a href="javascript:;" onClick="asdes('olusturma_zaman','<?=$neworder;?>');">Oluşturma</a></td>
			 <td><a href="javascript:;" onClick="asdes('sonislem','<?=$neworder;?>');">Son Görülme</a></td>
    </tr>

<?

while($row=sed_sql_fetcharray($sor)) {

$alttotal=sed_sql_numrows(sed_sql_query("select hesap_sahibi_id from kullanici where hesap_sahibi_id='$row[id]' and root='0'"));

?>

<tr class="line">
    	<td><? if($row['futbol']=="1") { ?>

<a href="javascript:;" onClick="bahisKapatin('<?=$row['id']; ?>','0','futbol');" style="color:#F00;">Tümünü Kapat</a>

<? } else { ?>

<a href="javascript:;" onClick="bahisKapatin('<?=$row['id']; ?>','1','futbol');" style="color:#0C0;">Tümünü Aç</a>

<? } ?></td>

<td><? if($row['basketbol']=="1") { ?>

<a href="javascript:;" onClick="bahisKapatin('<?=$row['id']; ?>','0','basketbol');" style="color:#F00;">Kapat</a>

<? } else { ?>

<a href="javascript:;" onClick="bahisKapatin('<?=$row['id']; ?>','1','basketbol');" style="color:#0C0;">Aç</a>

<? } ?></td>
<td><? if($row['duello']=="1") { ?>

<a href="javascript:;" onClick="bahisKapatin('<?=$row['id']; ?>','0','duello');" style="color:#F00;">Kapat</a>

<? } else { ?>

<a href="javascript:;" onClick="bahisKapatin('<?=$row['id']; ?>','1','duello');" style="color:#0C0;">Aç</a>

<? } ?></td>
<td><? if($row['canli']=="1") { ?>

<a href="javascript:;" onClick="bahisKapatin('<?=$row['id']; ?>','0','canli');" style="color:#F00;">Kapat</a>

<? } else { ?>

<a href="javascript:;" onClick="bahisKapatin('<?=$row['id']; ?>','1','canli');" style="color:#0C0;">Aç</a>

<? } ?></td>
<td><? if($row['canlibasketbol']=="1") { ?>

<a href="javascript:;" onClick="bahisKapatin('<?=$row['id']; ?>','0','canlibasketbol');" style="color:#F00;">Kapat</a>

<? } else { ?>

<a href="javascript:;" onClick="bahisKapatin('<?=$row['id']; ?>','1','canlibasketbol');" style="color:#0C0;">Aç</a>

<? } ?></td>
<td><? if($row['sanal']=="1") { ?>

<a href="javascript:;" onClick="bahisKapatin('<?=$row['id']; ?>','0','sanal');" style="color:#F00;">Kapat</a>

<? } else { ?>

<a href="javascript:;" onClick="bahisKapatin('<?=$row['id']; ?>','1','sanal');" style="color:#0C0;">Aç</a>

<? } ?></td>
<td><?=$row['username']; ?></td>
<td><?=date("d.m H:i",$row['olusturma_zaman']); ?></td>
<td><? if(empty($row['sonislem'])) { echo "Hiç bir zaman"; } else { ?><?=date("d.m H:i",$row['sonislem']); ?><? } ?></td>

 </tr>

<? } ?>

 </tbody></table>

<? }

}



if($a=="bahiskapatin") {



$id = gd("id");	

$duro = gd("duro");

$tip = gd("tip");

$benimbayiler = benimbayilerim($ub['id']);

$bayi_array = explode(",",$benimbayiler);

$tip_array = array('futbol','basketbol','duello','canli','canlibasketbol');

if(in_array($id,$bayi_array) && in_array($tip,$tip_array)) {

	sed_sql_query("update kullanici set ".$tip."='$duro' where id='$id' or hesap_sahibi_id='$id'");	

}

}





if($a=="bakiyeislem") {

$tip = gd("tip");

$tutar = gd("tutar");	

$uid = gd("uid");

$benimbayiler = benimbayilerim($ub['id']);

$bayi_array = explode(",",$benimbayiler);

$ouser = bilgi("select * from kullanici where id='$uid'");



if(in_array($uid,$bayi_array)) {



if($ub['wkyetki']=="1" && $ouser['wkdurum']=="1") {



if($tip=='ekle' && $ub['bakiye']<$tutar) { die("304"); }

if($tip=='cikar' && $ouser['bakiye']<$tutar) { die("304"); }




if($tip=='ekle') {

hesap_hareket($tip,$ouser['username'],$uid,$tutar,"$ub[username] tarafından işlendi.");

hesap_hareket('cikar',$ub['username'],$ub['id'],$tutar,"$ouser[username] web kullanıcısına aktarıldı.");

} else

if($tip=='cikar') {

hesap_hareket($tip,$ouser['username'],$uid,$tutar,"$ub[username] tarafından işlendi.");

hesap_hareket('ekle',$ub['username'],$ub['id'],$tutar,"$ouser[username] web kullanıcısından geri alındı.");

}

} else {

hesap_hareket($tip,$ouser['username'],$uid,$tutar,"$ub[username] tarafından işlendi.");

}	

	die("200");

} else {

	die("400");

}

}









if($a=="rapordetay") {

$tarih1 = basla_time(gd("tarih1"));

$tarih2 = bitir_time(gd("tarih2"));

$satir = gd("satir");

$tip = gd("tip");

if(!empty($satir)) {

if($satir=="kombine") { $satir_ekle = "and toplam_mac>1"; } else

if($satir==3) { $satir_ekle = "and toplam_mac>2"; } else

if($satir==1 || $satir==2) { $satir_ekle = "and toplam_mac='$satir'"; }	

} else {

$satir_ekle = "";	

}

if(!empty($durum)) { $durum_ekle = "and durum='$durum'"; } else { $durum_ekle = ""; }

if(!empty($tip)) {

if($tip=="1") { $tip_ekle = "and canli='0'"; } else

if($tip=="2") { $tip_ekle = "and canli='1'"; }	

} else {

$tip_ekle = "";	

}

$useri = gd("useri");



if(!empty($useri)) {

$ouser = bilgi("select * from kullanici where id='$useri'");

if($ouser['wkyetki']=="1") {

$teklibayi = 1;

$benimbayiler = benimbayilerim($useri);

} else {

$benimbayiler = benimbayilerim($useri);

}

$user_ekle = "and user_id in ($benimbayiler)";

} else { 

$benimbayiler = benimbayilerim($ub['id']);

$user_ekle = "and user_id in ($benimbayiler)";

}



$genelbayilerim = benimbayilerim($ub['id']);

$bayi_array = explode(",",$genelbayilerim);



if(!in_array($useri,$bayi_array) && $useri!="") { die("<div class='bos'>Yetkisiz bir işlem.</div>"); }





$sqladderf = "kupon_time between '$tarih1' and '$tarih2' $user_ekle $tip_ekle $satir_ekle and hesap_kesim_zaman=''";





$sor = sed_sql_query("select * from kuponlar where $sqladderf group by user_id order by username asc");

if(sed_sql_numrows($sor)<1) { die("<div class='bos' style='text-align: center;font-weight: bold;margin: 5px;'>Herhangi bir sonuç bulunamadı</div>"); }

?>

<div id="grres">	
<table class="btablo" cellpadding="0" cellspacing="0">
	<tbody>
	
	<tr class="head">
		<td>Kullanıcı</td>
		<td class="alr">Yatırılan</td>
		<td class="alr">Kazanılan</td>
		<td class="alr">Kaybedilen</td>
		<td class="alr">Devam Eden</td>
		<td>Çalışma Şekli</td>
		<td class="alr">Komisyon</td>
		<td class="alr">Kasa</td>
		<td class="alr">Net</td>
	</tr>

<?

while($row=sed_sql_fetcharray($sor)) {



$userim = bilgi("select * from kullanici where id='$row[user_id]'");

	

$sqladder = "kupon_time between '$tarih1' and '$tarih2' and user_id='$row[user_id]' $tip_ekle $satir_ekle and hesap_kesim_zaman=''";



$toplams = bilgi("SELECT 

	   SUM(CASE WHEN id!='' THEN yatan END) as toplam_odenen,

	   COUNT(CASE WHEN id!='' THEN id END) as toplam_odenen_adet,

       SUM(CASE WHEN durum='2' THEN tutar END) as toplam_kazanan,

	   COUNT(CASE WHEN durum='2' THEN id END) as toplam_kazanan_adet,

	   SUM(CASE WHEN durum='3' THEN yatan END) as toplam_kaybeden,

	   COUNT(CASE WHEN durum='3' THEN id END) as toplam_kaybeden_adet,

	   SUM(CASE WHEN durum='1' THEN yatan END) as toplam_devam,

	   COUNT(CASE WHEN durum='1' THEN id END) as toplam_devam_adet,

	   SUM(CASE WHEN durum='4' THEN yatan END) as toplam_iptal,

	   COUNT(CASE WHEN durum='4' THEN id END) as toplam_iptal_adet

  FROM kuponlar WHERE $sqladder");



// toplam yatırılan

$toplam_odenen_adet = $toplams['toplam_odenen_adet'];

$top_odenen = $top_odenen+$toplams['toplam_odenen'];

$top_odenen_adet = $top_odenen_adet+$toplam_odenen_adet;

// toplam kazanan

$toplam_kazanan_adet = $toplams['toplam_kazanan_adet'];

$top_kazanan = $top_kazanan+$toplams['toplam_kazanan'];

$top_kazanan_adet = $top_kazanan_adet+$toplam_kazanan_adet;

// toplam kaybeden

$toplam_kaybeden_adet = $toplams['toplam_kaybeden_adet'];

$top_kaybeden = $top_kaybeden+$toplams['toplam_kaybeden'];

$top_kaybeden_adet = $top_kaybeden_adet+$toplam_kaybeden_adet;

// toplam devam

$toplam_devam_adet = $toplams['toplam_devam_adet'];

$top_devam = $top_devam+$toplams['toplam_devam'];

$top_devam_adet = $top_devam_adet+$toplam_devam_adet;

// toplam iptal

$toplam_iptal_adet = $toplams['toplam_iptal_adet'];

$top_iptal = $top_iptal+$toplams['toplam_iptal'];

$top_iptal_adet = $top_iptal_adet+$toplam_iptal_adet;





// toplamlar.

$satir_toplam = $toplams['toplam_odenen']-$toplams['toplam_iptal']-$toplams['toplam_kazanan']-$toplams['toplam_devam'];

$satir_toplam_genel = $satir_toplam_genel+$satir_toplam;



?>


<tr class="line ">
		<td><?=$row['username']; ?> </td>
		<td class="report alr"><span>(<?=n($toplam_odenen_adet-$toplam_iptal_adet);?>)</span> <?=nf($toplams['toplam_odenen']-$toplams['toplam_iptal']); ?></td>
		<td class="report alr green"><span>(<?=n($toplam_kazanan_adet);?>)</span> <?=nf($toplams['toplam_kazanan']); ?></td>
		<td class="report alr red"><span>(<?=n($toplam_kaybeden_adet);?>)</span> <?=nf($toplams['toplam_kaybeden']); ?></td>
		<td class="report alr"><span>(<?=n($toplam_devam_adet);?>)</span> <?=nf($toplams['toplam_devam']); ?></td>
				<td><? 



if($teklibayi) { echo "Toplamda"; } else {

if($userim['n_calisma_sekli']=="1") { echo "Kasadan %$userim[komisyon]"; } else

if($userim['n_calisma_sekli']=="2") { echo "Yatandan %$userim[komisyon]"; }



if($userim['wkdurum']=="1") {echo "($userim[hesap_sahibi_user])"; } 

}

?></td>
		<td class="report alr"><? 



if($userim['n_calisma_sekli']=="1" && $userim['n_komisyon']>0 && $satir_toplam>0) {

$yuzdecarp = carpan($userim['n_komisyon']);

$gelen = $satir_toplam*$yuzdecarp;

} else 

if($userim['n_calisma_sekli']=="2" && $userim['n_komisyon']>0 && $toplams['toplam_odenen']>0) {

$yuzdecarp = carpan($userim['n_komisyon']);

$gelen = $toplam_odenen['toplam']*$yuzdecarp;

} else 

if($userim['n_calisma_sekli']=="3" && $userim['n_komisyon']>0 && $toplams['toplam_kazanan']>0) {

$yuzdecarp = carpan($userim['n_komisyon']);

$gelen = $toplams['toplam_kazanan']*$yuzdecarp;

} else {

$gelen = "0";	

}

if($teklibayi) { echo "Toplamda"; } else {

echo nf($gelen);

}

$kom_top = $kom_top+$gelen;



$net = $satir_toplam-$gelen; 

$net_top = $net_top+$net;





?></td>
				<td class="report alr" style="<? if($net<0) { echo "color:#bc2121;font-weight:bold;"; } else { echo "color:#14892c;font-weight:bold;"; } ?>"><?=nf($net);?></td>
		<td class="report alr" style="<? if($net<0) { echo "color:#bc2121;font-weight:bold;"; } else { echo "color:#14892c;font-weight:bold;"; } ?>"><?=nf($net);?></td>
	</tr>


<? } ?>

<tr class="head">
		<td></td>
		<td class="report alr"><span>(<?=n($top_odenen_adet-$top_iptal_adet);?>)</span> <?=nf($top_odenen-$top_iptal);?></td>
		<td class="report alr"><span>(<?=n($top_kazanan_adet);?>)</span> <?=nf($top_kazanan);?></td>
		<td class="report alr"><span>(<?=n($top_kaybeden_adet);?>)</span> <?=nf($top_kaybeden);?></td>
		<td class="report alr"><span>(<?=n($top_devam_adet);?>)</span> <?=nf($top_devam);?></td>
				<td><? if($teklibayi) { ?>



<?

if($ouser['n_calisma_sekli']=="1") { echo "Kasadan %$ouser[n_komisyon]"; } else

if($ouser['n_calisma_sekli']=="2") { echo "Yatandan %$ouser[n_komisyon]"; } 

?>



<? } ?></td>
		<td class="report alr"><?



if($teklibayi) {

if($ouser['n_calisma_sekli']=="1" && $ouser['n_komisyon']>0 && $satir_toplam_genel>0) {

$yuzdecarp = carpan($ouser['n_komisyon']);

$gelen = $satir_toplam_genel*$yuzdecarp;

} else 

if($ouser['n_calisma_sekli']=="2" && $ouser['n_komisyon']>0 && ($top_odenen-$top_iptal)>0) {

$yuzdecarp = carpan($ouser['n_komisyon']);

$gelen = ($top_odenen-$top_iptal)*$yuzdecarp;

} else {

$gelen = "0";	

}

echo nf($gelen);

}



if($teklibayi) {

	$net_top = $satir_toplam_genel-$gelen;

}



?></td>
				<td class="report alr" style="<? if($net_top<0) {echo "color:#bc2121;font-weight:bold;"; } else { echo "color:#14892c;font-weight:bold;"; } ?>"><?=nf($net_top);?></td>
		<td class="report alr" style="<? if($net_top<0) {echo "color:#bc2121;font-weight:bold;"; } else { echo "color:#14892c;font-weight:bold;"; } ?>"><?=nf($net_top);?></td>
	</tr>


</tbody></table>


</div>
<? } 







if($a=="rapordetay22") {

$tarih1 = basla_time(gd("tarih1"));

$tarih2 = bitir_time(gd("tarih2"));

$satir = gd("satir");

$tip = gd("tip");

if(!empty($satir)) {

if($satir=="kombine") { $satir_ekle = "and toplam_mac>1"; } else

if($satir==3) { $satir_ekle = "and toplam_mac>2"; } else

if($satir==1 || $satir==2) { $satir_ekle = "and toplam_mac='$satir'"; }	

} else {

$satir_ekle = "";	

}

if(!empty($durum)) { $durum_ekle = "and durum='$durum'"; } else { $durum_ekle = ""; }

if(!empty($tip)) {

if($tip=="1") { $tip_ekle = "and canli='0'"; } else

if($tip=="2") { $tip_ekle = "and canli='1'"; }	

} else {

$tip_ekle = "";	

}

$useri = gd("useri");



if(!empty($useri)) {

$ouser = bilgi("select * from kullanici where id='$useri'");

if($ouser['wkyetki']=="1") {

$teklibayi = 1;


$benimbayiler = benimbayilerim($useri);

} else {

$benimbayiler = benimbayilerim($useri);

}

$user_ekle = "and user_id in ($benimbayiler)";

} else { 

$benimbayiler = benimbayilerim($ub['id']);

$user_ekle = "and user_id in ($benimbayiler)";

}



$genelbayilerim = benimbayilerim($ub['id']);

$bayi_array = explode(",",$genelbayilerim);



if(!in_array($useri,$bayi_array) && $useri!="") { die("<div class='bos'>Yetkisiz bir işlem.</div>"); }





$sqladderf = "kupon_time between '$tarih1' and '$tarih2' $user_ekle $tip_ekle $satir_ekle and hesap_kesim_zaman=''";





$sor = sed_sql_query("select * from kuponlar where $sqladderf group by user_id order by username asc");

if(sed_sql_numrows($sor)<1) { die("<div class='bos' style='text-align: center;font-weight: bold;margin: 5px;'>Herhangi bir sonuç bulunamadı</div>"); }

?>

<div class="kuponlar">

<ul class="head">

<li>Bayi</li>

<li class="alr">Ödenen</li>

<li class="alc">Adet</li>

<li class="alr">Kazanan</li>

<li class="alc">Adet</li>

<li class="alr">Kaybeden</li>

<li class="alc">Adet</li>

<li class="alr">Devam</li>

<li class="alc">Adet</li>

<li class="alr">Genel</li>

<li>Çalışma</li>

<li class="alr">Komisyon</li>

<li class="alr">Net</li>

</ul>

<?

while($row=sed_sql_fetcharray($sor)) {



$userim = bilgi("select * from kullanici where id='$row[user_id]'");

	

$sqladder = "kupon_time between '$tarih1' and '$tarih2' and user_id='$row[user_id]' $tip_ekle $satir_ekle and hesap_kesim_zaman=''";



// toplam yatırılan

$toplam_odenen = bilgi("select SUM(yatan) as toplam from kuponlar where $sqladder");

$toplam_odenen_adet = sed_sql_numrows(sed_sql_query("select * from kuponlar where $sqladder"));

$top_odenen = $top_odenen+$toplam_odenen['toplam'];

$top_odenen_adet = $top_odenen_adet+$toplam_odenen_adet;

// toplam kazanan

$toplam_kazanan = bilgi("select SUM(tutar) as toplam from kuponlar where $sqladder and durum='2'");

$toplam_kazanan_adet = sed_sql_numrows(sed_sql_query("select * from kuponlar where $sqladder and durum='2'"));

$top_kazanan = $top_kazanan+$toplam_kazanan['toplam'];

$top_kazanan_adet = $top_kazanan_adet+$toplam_kazanan_adet;

// toplam kaybeden

$toplam_kaybeden = bilgi("select SUM(yatan) as toplam from kuponlar where $sqladder and durum='3'");

$toplam_kaybeden_adet = sed_sql_numrows(sed_sql_query("select * from kuponlar where $sqladder and durum='3'"));

$top_kaybeden = $top_kaybeden+$toplam_kaybeden['toplam'];

$top_kaybeden_adet = $top_kaybeden_adet+$toplam_kaybeden_adet;

// toplam devam

$toplam_devam = bilgi("select SUM(yatan) as toplam from kuponlar where $sqladder and durum='1'");

$toplam_devam_adet = sed_sql_numrows(sed_sql_query("select * from kuponlar where $sqladder and durum='1'"));

$top_devam = $top_devam+$toplam_devam['toplam'];

$top_devam_adet = $top_devam_adet+$toplam_devam_adet;

// toplam iptal

$toplam_iptal = bilgi("select SUM(yatan) as toplam from kuponlar where $sqladder and durum='4'");

$toplam_iptal_adet = sed_sql_numrows(sed_sql_query("select * from kuponlar where $sqladder and durum='4'"));

$top_iptal = $top_iptal+$toplam_iptal['toplam'];

$top_iptal_adet = $top_iptal_adet+$toplam_iptal_adet;





// toplamlar.

$satir_toplam = $toplam_odenen['toplam']-$toplam_iptal['toplam']-$toplam_kazanan['toplam']-$toplam_devam['toplam'];

$satir_toplam_genel = $satir_toplam_genel+$satir_toplam;



?>

<ul>

<li class="bold"><?=$row['username']; ?></li>

<li class="bold alr"><?=nf($toplam_odenen['toplam']-$toplam_iptal['toplam']); ?></li>

<li class="bold alc"><?=n($toplam_odenen_adet-$toplam_iptal_adet);?></li>

<li class="kaz alr"><?=nf($toplam_kazanan['toplam']); ?></li>

<li class="kaz alc"><?=n($toplam_kazanan_adet);?></li>

<li class="kay alr"><?=nf($toplam_kaybeden['toplam']); ?></li>

<li class="kay alc"><?=n($toplam_kaybeden_adet);?></li>

<li class="devam alr"><?=nf($toplam_devam['toplam']); ?></li>

<li class="devam alc"><?=n($toplam_devam_adet);?></li>

<li class="alr <? if($satir_toplam<0) { echo "kay"; } else { echo "kaz"; } ?>"><?=nf($satir_toplam);?></li>

<li class="bold"><? 



if($teklibayi) { echo "Toplamda"; } else {

if($userim['n_calisma_sekli']=="1") { echo "Kasadan %$userim[komisyon]"; } else

if($userim['n_calisma_sekli']=="2") { echo "Yatandan %$userim[komisyon]"; }



if($userim['wkdurum']=="1") {echo "($userim[hesap_sahibi_user])"; } 

}

?></li>

<li class="bold alr"><? 



if($userim['n_calisma_sekli']=="1" && $userim['n_komisyon']>0 && $satir_toplam>0) {

$yuzdecarp = carpan($userim['n_komisyon']);

$gelen = $satir_toplam*$yuzdecarp;

} else 

if($userim['n_calisma_sekli']=="2" && $userim['n_komisyon']>0 && $toplam_odenen['toplam']>0) {

$yuzdecarp = carpan($userim['n_komisyon']);

$gelen = $toplam_odenen['toplam']*$yuzdecarp;

} else 

if($userim['n_calisma_sekli']=="3" && $userim['n_komisyon']>0 && $toplam_kazanan['toplam']>0) {

$yuzdecarp = carpan($userim['n_komisyon']);

$gelen = $toplam_kazanan['toplam']*$yuzdecarp;

} else {

$gelen = "0";	

}

if($teklibayi) { echo "Toplamda"; } else {

echo nf($gelen);

}

$kom_top = $kom_top+$gelen;



$net = $satir_toplam-$gelen; 

$net_top = $net_top+$net;





?></li>

<li class="alr <? if($net<0) { echo "kay"; } else { echo "kaz"; } ?>"><?=nf($net);?></li>

</ul>

<? } ?>

<ul class="toplamlar">

<li class="bold"><strong>Toplamlar</strong></li>

<li class="alr bold"><?=nf($top_odenen-$top_iptal);?></li>

<li class="alc bold"><?=n($top_odenen_adet-$top_iptal_adet);?></li>

<li class="alr kaz"><?=nf($top_kazanan);?></li>

<li class="alc kaz"><?=n($top_kazanan_adet);?></li>

<li class="alr kay"><?=nf($top_kaybeden);?></li>

<li class="alc kay"><?=n($top_kaybeden_adet);?></li>

<li class="alr devam"><?=nf($top_devam);?></li>

<li class="alc devam"><?=n($top_devam_adet);?></li>

<li class="alr <? if($satir_toplam_genel<0) {echo "kay"; } else { echo "kaz"; } ?>"><?=nf($satir_toplam_genel);?></li>

<li class="bold"><? if($teklibayi) { ?>



<?

if($ouser['n_calisma_sekli']=="1") { echo "Kasadan %$ouser[n_komisyon]"; } else

if($ouser['n_calisma_sekli']=="2") { echo "Yatandan %$ouser[n_komisyon]"; } 

?>



<? } ?></li>

<li class="alr bold"><?



if($teklibayi) {

if($ouser['n_calisma_sekli']=="1" && $ouser['n_komisyon']>0 && $satir_toplam_genel>0) {

$yuzdecarp = carpan($ouser['n_komisyon']);

$gelen = $satir_toplam_genel*$yuzdecarp;

} else 

if($ouser['n_calisma_sekli']=="2" && $ouser['n_komisyon']>0 && ($top_odenen-$top_iptal)>0) {

$yuzdecarp = carpan($ouser['n_komisyon']);

$gelen = ($top_odenen-$top_iptal)*$yuzdecarp;

} else {

$gelen = "0";	

}

echo nf($gelen);

}



if($teklibayi) {

	$net_top = $satir_toplam_genel-$gelen;

}



?></li>

<li class="alr <? if($net_top<0) {echo "kay"; } else { echo "kaz"; } ?>"><?=nf($net_top);?></li>

</ul>

</div>

<? } 











if($a=="komisyondetay") {

$tarih1 = basla_time(gd("tarih1"));

$tarih2 = bitir_time(gd("tarih2"));

$useri = gd("useri");

$benimbayiler = benimbayilerim($ub['id']);

$bayi_arr = explode(",",$benimbayiler);



if(!empty($useri) && in_array($useri,$bayi_arr)) {

$bayilist = benimbayilerim($useri);

$user_ekle = "and user_id in ($bayilist)";

} else {

$user_ekle = "and user_id in ($benimbayiler)";

}



$tip = gd("tip");



if($tip=="1") { $canli_durum = "0"; $tablom = "normal"; $yuzdeler = array('normal_tekmac_yuzde','normal_kombine_yuzde'); } else

if($tip=="2") { $canli_durum = "1"; $tablom = "canli";  $yuzdeler = array('canli_tekmac_yuzde','canli_kombine_yuzde'); }



?>

<? if($tip=="1") { ?>

<div class="boxbaslik">Normal Kuponlar için komisyon hesapları</div>

<? } else

if($tip=="2") { ?>

<div class="boxbaslik">Canlı Kuponlar için komisyon hesapları</div>

<? } ?>

<div class="kuponlar">

	<ul class="head">

    	<li>Kullanıcı</li>

        <li class="alr">Yatırılan</li>

        <li class="alr">Çalışma Şekli</li>

        <li class="alr">Tekli Yatan</li>

        <li class="alr">Tekli Kalan</li>

        <li class="alr">Tekli Komisyon</li>

        <li class="alr">Kombine Yatan</li>

        <li class="alr">Kombine Kalan</li>

        <li class="alr">Kombine Komisyon</li>

        <li class="alr">Zarar Dahil</li>

        <li class="alr">Zarar Hariç</li>

    </ul>

   

<?

$sor = sed_sql_query("select user_id,username from kuponlar where kupon_time between '$tarih1' and '$tarih2' $user_ekle and canli='$canli_durum' and hesap_kesim_zaman='' group by user_id order by username asc");

while($row=sed_sql_fetcharray($sor)) {

$ouser = bilgi("select * from kullanici where id='$row[user_id]'");



if($ouser['wkdurum']<1) {

$onun_altlari = benimbayilerim($ouser['id']);



$toplam_yatan = bilgi("select sum(yatan) as toplam from kuponlar where user_id in ($onun_altlari) and kupon_time between '$tarih1' and '$tarih2' and canli='$canli_durum' and hesap_kesim_zaman=''");



$tekli_toplam_yatan = bilgi("select sum(yatan) as toplam from kuponlar where user_id in ($onun_altlari) and kupon_time between '$tarih1' and '$tarih2' and toplam_mac<2 and canli='$canli_durum' and hesap_kesim_zaman=''");

$tekli_toplam_kazanan = bilgi("select sum(tutar) as toplam from kuponlar where user_id in ($onun_altlari) and kupon_time between '$tarih1' and '$tarih2' and toplam_mac<2 and canli='$canli_durum' and hesap_kesim_zaman='' and durum='2'");

$tekli_toplam_devam = bilgi("select sum(yatan) as toplam from kuponlar where user_id in ($onun_altlari) and kupon_time between '$tarih1' and '$tarih2' and toplam_mac<2 and canli='$canli_durum' and hesap_kesim_zaman='' and durum in (1,4)");

$tekli_kalan = $tekli_toplam_yatan['toplam']-$tekli_toplam_kazanan['toplam']-$tekli_toplam_devam['toplam'];



$kombine_toplam_yatan = bilgi("select sum(yatan) as toplam from kuponlar where user_id in ($onun_altlari) and kupon_time between '$tarih1' and '$tarih2' and toplam_mac>1 and canli='$canli_durum' and hesap_kesim_zaman=''");

$kombine_toplam_kazanan = bilgi("select sum(tutar) as toplam from kuponlar where user_id in ($onun_altlari) and kupon_time between '$tarih1' and '$tarih2' and toplam_mac>1 and canli='$canli_durum' and hesap_kesim_zaman='' and durum='2'");

$kombine_toplam_devam = bilgi("select sum(yatan) as toplam from kuponlar where user_id in ($onun_altlari) and kupon_time between '$tarih1' and '$tarih2' and toplam_mac>1 and canli='$canli_durum' and hesap_kesim_zaman='' and durum in (1,4)");

$kombine_kalan = $kombine_toplam_yatan['toplam']-$kombine_toplam_kazanan['toplam']-$kombine_toplam_devam['toplam'];







?>

	<ul class="durum_1">

    	<li><?=$row['username']; ?></li>

        <li class="alr"><?=nf($toplam_yatan['toplam']); ?></li>

        

        

        <li class="alr"><? if($ouser[''.$tablom.'_calisma_sekli']=="1") { echo "Kasaya Kalandan"; } else if($ouser[''.$tablom.'_calisma_sekli']=="2") { echo "Toplam Yatırılandan"; } else { echo "Ayarlanmamış"; } ?></li>

        

        <li class="alr"><?=nf($tekli_toplam_yatan['toplam']); ?></li>

        <li class="alr <? if($tekli_kalan<0) { echo "kay"; } else if($tekli_kalan>0) { echo "kaz"; } ?>"><?=nf($tekli_kalan);?></li>

        <li class="alr"><? if($ouser[''.$tablom.'_tekmac_yuzde']>0) { echo "%".$ouser[''.$tablom.'_tekmac_yuzde']." ("; 

		

		$tekli_carpan = carpan($ouser[''.$tablom.'_tekmac_yuzde']); 

		

		if($ouser[''.$tablom.'_calisma_sekli']=="1") {

			$tekli_komisyon = $tekli_kalan*$tekli_carpan;

			echo nf($tekli_komisyon);

		} else

		if($ouser[''.$tablom.'_calisma_sekli']=="2") {

			$tekli_komisyon = $tekli_toplam_yatan['toplam']*$tekli_carpan;

			echo nf($tekli_komisyon);

		} else {

			$tekli_komisyon = 0;

			echo "0.00";

		}

		} else { echo "(Ayarlanmamış"; } echo ")"; ?></li>



        

        <li class="alr"><?=nf($kombine_toplam_yatan['toplam']); ?></li>

        <li class="alr <? if($kombine_kalan<0) { echo "kay"; } else if($kombine_kalan>0) { echo "kaz"; } ?>"><?=nf($kombine_kalan);?></li>

        <li class="alr"><? if($ouser[''.$tablom.'_kombine_yuzde']>0) { echo "%".$ouser[''.$tablom.'_kombine_yuzde']." ("; 

		

		$kombine_carpan = carpan($ouser[''.$tablom.'_kombine_yuzde']); 

		

		if($ouser[''.$tablom.'_calisma_sekli']=="1") {

			$kombine_komisyon = $kombine_kalan*$kombine_carpan;

			echo nf($kombine_komisyon);

		} else

		if($ouser[''.$tablom.'_calisma_sekli']=="2") {

			$kombine_komisyon = $kombine_toplam_yatan['toplam']*$kombine_carpan;

			echo nf($kombine_komisyon);

		} else {

			$kombine_komisyon = 0;

			echo "0.00";

		}

		} else { echo "(Ayarlanmamış"; } echo ")"; ?></li>

        <?

		$zarar_dahil = $tekli_komisyon+$kombine_komisyon;

		if($tekli_komisyon<0 && $kombine_komisyon>0) {

			$zarar_haric = nf($kombine_komisyon);

		} else

		if($tekli_komisyon>0 && $kombine_komisyon<0) {

			$zarar_haric = nf($tekli_komisyon);	

		} else

		if($tekli_komisyon<0 && $kombine_komisyon<0) {

			$zarar_haric = "Külliyen Zarar";	

		} else {

			$zarar_haric = nf($tekli_komisyon+$kombine_komisyon);	

		}

		?>

        <li class="alr"><?=nf($zarar_dahil); ?></li>

        <li class="alr"><?=$zarar_haric; ?></li>

        <?

		unset($tekli_komisyon);

		unset($kombine_komisyon);

		?>

        

        

        

        

    </ul>

<? } ?>

<? } ?>

</div>







<?

}













if($a=="betmatik") {



$suan = time();



$kontrol_sql = sed_sql_query("select * from program where mac_time<$suan");

while($row=sed_sql_fetcharray($kontrol_sql)) {

sed_sql_query("delete from oranlar where mac_db_id='$row[id]'");

sed_sql_query("delete from program where id='$row[id]'");

}



$kontrol_sql = sed_sql_query("select * from programb where mac_time<$suan");

while($row=sed_sql_fetcharray($kontrol_sql)) {

sed_sql_query("delete from oranlarb where mac_db_id='$row[id]'");

sed_sql_query("delete from programb where id='$row[id]'");

}





$spor_tip = gd("st");

$tarih = gd("tarih");

$bahistip = gd("bahistip");

$arama = gd("arama");

if(!empty($arama)) { 

$arama_ekle = "and (ev_takim like '%$arama%' or konuk_takim like '%$arama%' or mac_kodu like '%$arama%' or iddaa_kodu like '%$arama%')"; 

$tarih;

} else { 

$arama_ekle = ""; 

}



$siralama = gd("siralama");



if($siralama==1) { $ordered = "order by mac_time asc"; } else

if($siralama==2) { $ordered = "order by mac_kodu asc"; } else

if($siralama==3) { $ordered = "order by ev_takim asc"; } else

if($siralama==4) { $ordered = "order by konuk_takim asc"; } else

if($siralama==5) { $ordered = "order by kupa_ulke asc"; }





if($spor_tip=="1") {

	

$gizli_ligler = gizli_lig_list();

$gizli_maclar = gizli_mac_list();



if($gizli_ligler=="") { $gizli_lig_ekle = ""; } else { $gizli_lig_ekle = "and ulkeadi not in ($gizli_ligler)"; }

if($gizli_maclar=="") { $gizli_mac_ekle = ""; } else { $gizli_mac_ekle = "and id not in ($gizli_maclar)"; } 



$gizli_ekle = "$gizli_lig_ekle $gizli_mac_ekle";



if($bahistip=="1") {

// futbol : maç sonucu bahisleri

?>

<table class="bm" cellpadding="0" cellspacing="0">

  <?

	/* yasak kelimeler */ 
		$whereyasak ="";
		$sec = "SELECT * FROM yasak_kelimeler WHERE user_id IN (1,".$_SESSION['betuser'].",".implode(",", $_SESSION['ustler']).")";
		$sor = sed_sql_query($sec);
		while($r = sed_sql_fetchassoc($sor)) {
			$whereyasak.= ' AND ev_takim not like "%'.$r['kelime'].'%" AND konuk_takim not like "%'.$r['kelime'].'%" ';
		}
	/* ./yasak kelimeler */
  
  $sor = sed_sql_query("select * from program where kupa_isim not like '%Duello%' {$whereyasak} and mac_tarih='$tarih' $arama_ekle $gizli_ekle group by kupa_isim $ordered");

  while($row=sed_sql_fetcharray($sor)) { ?>

  <tr class="bmhead">

    <th colspan="4"></th>

    <th colspan="3" class="alc">Maç Sonucu<br><span>90 dk. sonunda</span></th>

    <th colspan="3" class="alc">Çifte Şans<br><span>90 dk. sonunda</span></th>

    <th colspan="4" class="alc">Handikaplı<br><span>90 dk. sonunda</span></th>

    <th colspan="3" class="alc">Karşılıklı Gol<br><span>90 dk. sonunda</span></th>

  </tr>

  <tr class="bmod">

    <td colspan="4" style="text-align:left; color:#FFF; padding:5px 10px 5px;"><img src="ulkeler/<?=$row['kupa_ulke']; ?>.png" style="vertical-align:middle; height:12px; margin-bottom:2px; padding-right:2px;"> <?=$row['kupa_isim']; ?></td>

    <td>1</td>

    <td>X</td>

    <td>2</td>

    <td>1-0</td>

    <td>1-2</td>

    <td>0-2</td>

    <td style="text-align:right; width:80px; padding-right:6px;">Handikap</td>

    <td>1</td>

    <td>X</td>

    <td>2</td>

    <td>Var</td>

    <td>Yok</td>

    <td></td>

  </tr>

  <?

  $s = sed_sql_query("select * from program where kupa_isim='$row[kupa_isim]' and mac_tarih='$tarih' $arama_ekle $gizli_ekle $ordered");

  while($ass=sed_sql_fetcharray($s)) {

	  $ev = oranbul($ass['id'],1);

	  $beraberlik = oranbul($ass['id'],2);

	  $konuk = oranbul($ass['id'],3);

	  $cs1 = oranbul($ass['id'],31);

	  $cs0 = oranbul($ass['id'],32);

	  $cs2 = oranbul($ass['id'],33);

	  if($ev>$konuk) { 

	  $handikap = "Ev Sahibi +1"; 

	  $h1id = 23;

	  $h0id = 24;

	  $h2id = 25;

	  $h1 = oranbul($ass['id'],23);

	  $h0 = oranbul($ass['id'],24);

	  $h2 = oranbul($ass['id'],25);

	  } else

	  if($ev<$konuk) { 

	  $handikap = "Deplasman +1"; 

	  $h1id = 26;

	  $h0id = 27; 

	  $h2id = 28;

	  $h1 = oranbul($ass['id'],26);

	  $h0 = oranbul($ass['id'],27);

	  $h2 = oranbul($ass['id'],28);

	  }

	  

	  $var = oranbul($ass['id'],13);

	  $yok = oranbul($ass['id'],14);

	  $mbs = mbsver($ass['id'],$ass['mbs'],$ass['kupa_id']);

	  $encoded = "$ass[id]|$ass[ev_takim]|$ass[konuk_takim]|$ass[mac_kodu]|$mbs|$ass[mac_time]|futbol";

  ?>

  <tr class="musabaka">

    <td class="bmodac" style="width:40px;"><?=$ass['mac_kodu']; ?></td>

    <td class="bmodac"  style="width:100px;"><?=date("d.m H:i",$ass['mac_time']); ?></td>

    <td colspan="1" class="tdmus"><?="$ass[ev_takim] - $ass[konuk_takim]"; ?></td>

    <td class="bmodac"><img src="img/mbs_<?=mbsver($ass['id'],$ass['mbs'],$ass['kupa_id']); ?>.png" style="vertical-align:middle;"></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol1");?>" onClick="kupon('<?=codekupon("$encoded|1|$ev"); ?>');"><?=$ev;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol2");?>" onClick="kupon('<?=codekupon("$encoded|2|$beraberlik"); ?>');"><?=$beraberlik;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol3");?>" onClick="kupon('<?=codekupon("$encoded|3|$konuk"); ?>');"><?=$konuk;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol31");?>" onClick="kupon('<?=codekupon("$encoded|31|$cs1"); ?>');"><?=$cs1;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol32");?>" onClick="kupon('<?=codekupon("$encoded|32|$cs0"); ?>');"><?=$cs0;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol33");?>" onClick="kupon('<?=codekupon("$encoded|33|$cs2"); ?>');"><?=$cs2;?></td>

    <td class="bmodac" style="text-align:right; font-size:10px; color:#555;"><?=$handikap;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol".$h1id."");?>" onClick="kupon('<?=codekupon("$encoded|".$h1id."|$h1"); ?>');"><?=$h1;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol".$h0id."");?>" onClick="kupon('<?=codekupon("$encoded|".$h0id."|$h0"); ?>');"><?=$h0;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol".$h2id."");?>" onClick="kupon('<?=codekupon("$encoded|".$h2id."|$h2"); ?>');"><?=$h2;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol13");?>" onClick="kupon('<?=codekupon("$encoded|13|$var"); ?>');"><?=$var;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol14");?>" onClick="kupon('<?=codekupon("$encoded|14|$yok"); ?>');"><?=$yok;?></td>

    <td class="tdbet" style="font-size:10px;" onClick="mdf('<?=$ass['id']; ?>');">+</td>

  </tr>

  <? } ?>

  <? } ?>

</table>

<? } else 





// futbol : ilk yarı bahisleri

if($bahistip=="2") {

?>

<table class="bm" cellpadding="0" cellspacing="0">

  <?

  $sor = sed_sql_query("select * from program where kupa_isim not like '%Duello%' and mac_tarih='$tarih' $arama_ekle $gizli_ekle group by kupa_isim $ordered");

  while($row=sed_sql_fetcharray($sor)) { ?>

  <tr class="bmhead">

    <th colspan="4"></th>

    <th colspan="3" class="alc">İlk Yarı Sonucu<br><span>İlk Yarı Sonunda</span></th>

    <th colspan="3" class="alc">Çifte Şans<br><span>İlk Yarı Sonunda</span></th>

    <th colspan="2" class="alc">KG<br><span>İ-Y Sonunda</span></th>

    <th colspan="5" class="alc">İlk Yarı Alt/Üst<br><span>İlk Yarı Sonunda</span></th>

  </tr>

  <tr class="bmod">

    <td colspan="4" style="text-align:left; color:#FFF; padding:5px 10px 5px;"><img src="<?=$row['bayrak']; ?>" style="vertical-align:middle; height:12px; margin-bottom:2px; padding-right:2px;"> <?=$row['kupa_isim']; ?></td>

    <td>1</td>

    <td>X</td>

    <td>2</td>

    <td>1-0</td>

    <td>1-2</td>

    <td>0-2</td>

    <td>Var</td>

    <td>Yok</td>

    <td>Alt <span>0.5</span></td>

    <td>Üst <span>0.5</span></td>

    <td>Alt <span>1.5</span></td>

    <td>Üst <span>1.5</span></td>

    <td></td>

  </tr>

  <?

  $s = sed_sql_query("select * from program where kupa_isim='$row[kupa_isim]' and mac_tarih='$tarih' $arama_ekle $gizli_ekle $ordered");

  while($ass=sed_sql_fetcharray($s)) {

	  $ev = oranbul($ass['id'],10);

	  $beraberlik = oranbul($ass['id'],11);

	  $konuk = oranbul($ass['id'],12);

	  

	  $cs1 = oranbul($ass['id'],115);

	  $cs0 = oranbul($ass['id'],116);

	  $cs2 = oranbul($ass['id'],117);

	  

	  $var = oranbul($ass['id'],29);

	  $yok = oranbul($ass['id'],30);

	  

	  $alt = oranbul($ass['id'],15);

	  $ust = oranbul($ass['id'],16);

	  

	  $alt1 = oranbul($ass['id'],17);

	  $ust1 = oranbul($ass['id'],18);

	  

	  $mbs = mbsver($ass['id'],$ass['mbs'],$ass['kupa_id']);



	  $encoded = "$ass[id]|$ass[ev_takim]|$ass[konuk_takim]|$ass[mac_kodu]|$mbs|$ass[mac_time]|futbol";

  ?>

  <tr class="musabaka">

    <td class="bmodac" style="width:40px;"><?=$ass['mac_kodu']; ?></td>

    <td class="bmodac"  style="width:100px;"><?=date("d.m H:i",$ass['mac_time']); ?></td>

    <td colspan="1" class="tdmus"><?="$ass[ev_takim] - $ass[konuk_takim]"; ?></td>

    <td class="bmodac"><img src="img/mbs_<?=mbsver($ass['id'],$ass['mbs'],$ass['kupa_id']); ?>.png" style="vertical-align:middle;"></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol10");?>" onClick="kupon('<?=codekupon("$encoded|10|$ev"); ?>');"><?=$ev;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol11");?>" onClick="kupon('<?=codekupon("$encoded|11|$beraberlik"); ?>');"><?=$beraberlik;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol12");?>" onClick="kupon('<?=codekupon("$encoded|12|$konuk"); ?>');"><?=$konuk;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol115");?>" onClick="kupon('<?=codekupon("$encoded|115|$cs1"); ?>');"><?=$cs1;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol116");?>" onClick="kupon('<?=codekupon("$encoded|116|$cs0"); ?>');"><?=$cs0;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol117");?>" onClick="kupon('<?=codekupon("$encoded|117|$cs2"); ?>');"><?=$cs2;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol29");?>" onClick="kupon('<?=codekupon("$encoded|29|$var"); ?>');"><?=$var;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol30");?>" onClick="kupon('<?=codekupon("$encoded|30|$yok"); ?>');"><?=$yok;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol15");?>" onClick="kupon('<?=codekupon("$encoded|15|$alt"); ?>');"><?=$alt;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol16");?>" onClick="kupon('<?=codekupon("$encoded|16|$ust"); ?>');"><?=$ust;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol17");?>" onClick="kupon('<?=codekupon("$encoded|17|$alt1"); ?>');"><?=$alt1;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol28");?>" onClick="kupon('<?=codekupon("$encoded|28|$ust1"); ?>');"><?=$ust1;?></td>

    <td class="tdbet" style="font-size:10px;" onClick="mdf('<?=$ass['id']; ?>');">+</td>

  </tr>

  <? } ?>

  <? } ?>

</table>



<? } 





// futbol : alt üst bahisleri

if($bahistip=="3") {

?>

<table class="bm" cellpadding="0" cellspacing="0">

  <?

  $sor = sed_sql_query("select * from program where kupa_isim not like '%Duello%' and mac_tarih='$tarih' $arama_ekle $gizli_ekle group by kupa_isim $ordered");

  while($row=sed_sql_fetcharray($sor)) { ?>

  <tr class="bmhead">

    <th colspan="4"></th>

    <th colspan="6" class="alc">Toplam Gol Alt/Üst<br><span>90 dk. sonunda</span></th>

    <th colspan="4" class="alc">Toplam Gol Aralığı<br><span>90 dk. sonunda</span></th>

    <th colspan="4" class="alc">En Çok Gol Devresi<br><span>90 dk. sonunda</span></th>

  </tr>

  <tr class="bmod">

    <td colspan="4" style="text-align:left; color:#FFF; padding:5px 10px 5px;"><img src="<?=$row['bayrak']; ?>" style="vertical-align:middle; height:12px; margin-bottom:2px; padding-right:2px;"> <?=$row['kupa_isim']; ?></td>

    <td>Alt<span>1.5</span></td>

    <td>Üst<span>1.5</span></td>

    <td>Alt<span>2.5</span></td>

    <td>Üst<span>2.5</span></td>

    <td>Alt<span>3.5</span></td>

    <td>Üst<span>3.5</span></td>

    <td>0-1</td>

    <td>2-3</td>

    <td>4-5</td>

    <td>6+</td>

    <td>1.</td>

    <td>Eşit</td>

    <td>2.</td>

    <td></td>

  </tr>

  <?

  $s = sed_sql_query("select * from program where kupa_isim='$row[kupa_isim]' and mac_tarih='$tarih' $arama_ekle $gizli_ekle $ordered");

  while($ass=sed_sql_fetcharray($s)) {

	  

	  $a11 = oranbul($ass['id'],4);

	  $u11 = oranbul($ass['id'],5);

	  $a21 = oranbul($ass['id'],6);

	  $u21 = oranbul($ass['id'],7);

	  $a31 = oranbul($ass['id'],8);

	  $u31 = oranbul($ass['id'],9);

	  $gol01 = oranbul($ass['id'],50);

	  $gol23 = oranbul($ass['id'],51);

	  $gol45 = oranbul($ass['id'],52);

	  $gol6 = oranbul($ass['id'],53);

	  $ilk = oranbul($ass['id'],54);

	  $esit = oranbul($ass['id'],55);

	  $ikinci = oranbul($ass['id'],56);

	  $mbs = mbsver($ass['id'],$ass['mbs'],$ass['kupa_id']);

	  $encoded = "$ass[id]|$ass[ev_takim]|$ass[konuk_takim]|$ass[mac_kodu]|$mbs|$ass[mac_time]|futbol";

  ?>

  <tr class="musabaka">

    <td class="bmodac" style="width:40px;"><?=$ass['mac_kodu']; ?></td>

    <td class="bmodac"  style="width:100px;"><?=date("d.m H:i",$ass['mac_time']); ?></td>

    <td colspan="1" class="tdmus"><?="$ass[ev_takim] - $ass[konuk_takim]"; ?></td>

    <td class="bmodac"><img src="img/mbs_<?=mbsver($ass['id'],$ass['mbs'],$ass['kupa_id']); ?>.png" style="vertical-align:middle;"></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol4");?>" onClick="kupon('<?=codekupon("$encoded|4|$a11"); ?>');"><?=$a11;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol5");?>" onClick="kupon('<?=codekupon("$encoded|5|$u11"); ?>');"><?=$u11;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol6");?>" onClick="kupon('<?=codekupon("$encoded|6|$a21"); ?>');"><?=$a21;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol7");?>" onClick="kupon('<?=codekupon("$encoded|7|$u21"); ?>');"><?=$u21;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol8");?>" onClick="kupon('<?=codekupon("$encoded|8|$a31"); ?>');"><?=$a31;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol9");?>" onClick="kupon('<?=codekupon("$encoded|9|$u31"); ?>');"><?=$u31;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol50");?>" onClick="kupon('<?=codekupon("$encoded|50|$gol01"); ?>');"><?=$gol01;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol51");?>" onClick="kupon('<?=codekupon("$encoded|51|$gol23"); ?>');"><?=$gol23;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol52");?>" onClick="kupon('<?=codekupon("$encoded|52|$gol45"); ?>');"><?=$gol45;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol53");?>" onClick="kupon('<?=codekupon("$encoded|53|$gol6"); ?>');"><?=$gol6;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol54");?>" onClick="kupon('<?=codekupon("$encoded|54|$ilk"); ?>');"><?=$ilk;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol55");?>" onClick="kupon('<?=codekupon("$encoded|55|$esit"); ?>');"><?=$esit;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol56");?>" onClick="kupon('<?=codekupon("$encoded|56|$ikinci"); ?>');"><?=$ikinci;?></td>

    <td class="tdbet" style="font-size:10px;" onClick="mdf('<?=$ass['id']; ?>');">+</td>

  </tr>



  <? } ?>

  <? } ?>

</table>



<? } 



// futbol : alt üst bahisleri

if($bahistip=="4") {

?>

<table class="bm" cellpadding="0" cellspacing="0">

  <?

  $sor = sed_sql_query("select * from program where kupa_isim not like '%Duello%' and mac_tarih='$tarih' $arama_ekle $gizli_ekle group by kupa_isim $ordered");

  while($row=sed_sql_fetcharray($sor)) { ?>

  <tr class="bmhead">

    <th colspan="4"></th>

    <th colspan="9" class="alc">İlk Yarı / Maç Sonucu<br><span>90 dk. sonunda</span></th>

    <th colspan="3" class="alc">Beraberlikte İade<br><span>90 dk. sonunda</span></th>

  </tr>

  <tr class="bmod">

    <td colspan="4" style="text-align:left; color:#FFF; padding:5px 10px 5px;"><img src="<?=$row['bayrak']; ?>" style="vertical-align:middle; height:12px; margin-bottom:2px; padding-right:2px;"> <?=$row['kupa_isim']; ?></td>

    <td>1/1</td>

    <td>0/1</td>

    <td>2/1</td>

    <td>1/0</td>

    <td>0/0</td>

    <td>2/0</td>

    <td>1/2</td>

    <td>0/2</td>

    <td>2/2</td>

    <td>1</td>

    <td>2</td>

    <td></td>

  </tr>

  <?

  $s = sed_sql_query("select * from program where kupa_isim='$row[kupa_isim]' and mac_tarih='$tarih' $arama_ekle $gizli_ekle $ordered");

  while($ass=sed_sql_fetcharray($s)) {

	  

	  $im11 = oranbul($ass['id'],69);	

	  $im01 = oranbul($ass['id'],70); 

	  $im21 = oranbul($ass['id'],71);

	  $im10 = oranbul($ass['id'],72); 

	  $im00 = oranbul($ass['id'],73);

	  $im20 = oranbul($ass['id'],74);

	  $im12 = oranbul($ass['id'],75);

	  $im02 = oranbul($ass['id'],76);

	  $im22 = oranbul($ass['id'],77);

	  

	  $bi1 = oranbul($ass['id'],42);

	  $bi2 = oranbul($ass['id'],43);

	  $mbs = mbsver($ass['id'],$ass['mbs'],$ass['kupa_id']);

	  

	  $encoded = "$ass[id]|$ass[ev_takim]|$ass[konuk_takim]|$ass[mac_kodu]|$mbs|$ass[mac_time]|futbol";

  ?>

  <tr class="musabaka">

    <td class="bmodac" style="width:40px;"><?=$ass['mac_kodu']; ?></td>

    <td class="bmodac"  style="width:100px;"><?=date("d.m H:i",$ass['mac_time']); ?></td>

    <td colspan="1" class="tdmus"><?="$ass[ev_takim] - $ass[konuk_takim]"; ?></td>

    <td class="bmodac"><img src="img/mbs_<?=mbsver($ass['id'],$ass['mbs'],$ass['kupa_id']); ?>.png" style="vertical-align:middle;"></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol69");?>" onClick="kupon('<?=codekupon("$encoded|69|$im11"); ?>');"><?=$im11;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol70");?>" onClick="kupon('<?=codekupon("$encoded|70|$im01"); ?>');"><?=$im01;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol71");?>" onClick="kupon('<?=codekupon("$encoded|71|$im21"); ?>');"><?=$im21;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol72");?>" onClick="kupon('<?=codekupon("$encoded|72|$im10"); ?>');"><?=$im10;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol73");?>" onClick="kupon('<?=codekupon("$encoded|73|$im00"); ?>');"><?=$im00;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol74");?>" onClick="kupon('<?=codekupon("$encoded|74|$im20"); ?>');"><?=$im20;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol75");?>" onClick="kupon('<?=codekupon("$encoded|75|$im12"); ?>');"><?=$im12;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol76");?>" onClick="kupon('<?=codekupon("$encoded|76|$im02"); ?>');"><?=$im02;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol77");?>" onClick="kupon('<?=codekupon("$encoded|77|$im22"); ?>');"><?=$im22;?></td>

    

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol42");?>" onClick="kupon('<?=codekupon("$encoded|42|$bi1"); ?>');"><?=$bi1;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol43");?>" onClick="kupon('<?=codekupon("$encoded|43|$bi2"); ?>');"><?=$bi2;?></td>

    

    <td class="tdbet" style="font-size:10px;" onClick="mdf('<?=$ass['id']; ?>');">+</td>

  </tr>



  <? } ?>

  <? } ?>

</table>

<? } ?>





<? } else 

// futbol sonuc

// duello başlangıc

if($spor_tip==2) {

	

	$s = sed_sql_query("select * from program where kupa_isim like '%Duello%' $gizli_ekle $ordered");

if(sed_sql_numrows($s)<1) { die("<div class='bos' style='text-align: center;font-weight: bold;margin: 5px;'>Herhangi bir Duello müsabakası bulunamadı</div>"); }

?>



<table class="bm" cellpadding="0" cellspacing="0">

  <tr class="bmhead">

    <th colspan="4"></th>

    <th colspan="3" class="alc">Maç Sonucu<br><span>90 dk. sonunda</span></th>

    <th colspan="3" class="alc">Çifte Şans<br><span>90 dk. sonunda</span></th>

    <th colspan="4" class="alc">Handikaplı<br><span>90 dk. sonunda</span></th>

    <th colspan="2" class="alc">Beraberliksiz<br><span>Beraberlikde İade</span></th>

  </tr>

  <tr class="bmod">

    <td colspan="4" style="text-align:left; color:#FFF; padding:5px 10px 5px;">Duello Müsabakaları</td>

    <td>1</td>

    <td>X</td>

    <td>2</td>

    <td>1-0</td>

    <td>1-2</td>

    <td>0-2</td>

    <td style="text-align:right; width:80px; padding-right:6px;">Handikap</td>

    <td>1</td>

    <td>X</td>

    <td>2</td>

    <td>1</td>

    <td>2</td>

  </tr>

  <?

  

  while($ass=sed_sql_fetcharray($s)) {

	  $ev = oranbul($ass['id'],1);

	  $beraberlik = oranbul($ass['id'],2);

	  $konuk = oranbul($ass['id'],3);

	  $cs1 = oranbul($ass['id'],31);

	  $cs0 = oranbul($ass['id'],32);

	  $cs2 = oranbul($ass['id'],33);

	  if($ev>$konuk) { 

	  $handikap = "Ev Sahibi +1"; 

	  $h1id = 23;

	  $h0id = 24;

	  $h2id = 25;

	  $h1 = oranbul($ass['id'],23);

	  $h0 = oranbul($ass['id'],24);

	  $h2 = oranbul($ass['id'],25);

	  } else

	  if($ev<$konuk) { 

	  $handikap = "Deplasman +1"; 

	  $h1id = 26;

	  $h0id = 27; 

	  $h2id = 28;

	  $h1 = oranbul($ass['id'],26);

	  $h0 = oranbul($ass['id'],27);

	  $h2 = oranbul($ass['id'],28);

	  }

	  

	  $bi1 = oranbul($ass['id'],42);

	  $bi2 = oranbul($ass['id'],43);

	  $mbs = mbsver($ass['id'],$ass['mbs'],$ass['kupa_id']);

	  

	  $encoded = "$ass[id]|$ass[ev_takim]|$ass[konuk_takim]|$ass[mac_kodu]|$mbs|$ass[mac_time]|futbol";

  ?>

  <tr class="musabaka">

    <td class="bmodac" style="width:40px;"><?=$ass['mac_kodu']; ?></td>

    <td class="bmodac"  style="width:100px;"><?=date("d.m H:i",$ass['mac_time']); ?></td>

    <td colspan="1" class="tdmus"><?="$ass[ev_takim] - $ass[konuk_takim]"; ?></td>

    <td class="bmodac"><img src="img/mbs_<?=mbsver($ass['id'],$ass['mbs'],$ass['kupa_id']); ?>.png" style="vertical-align:middle;"></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol1");?>" onClick="kupon('<?=codekupon("$encoded|1|$ev"); ?>');"><?=$ev;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol2");?>" onClick="kupon('<?=codekupon("$encoded|2|$beraberlik"); ?>');"><?=$beraberlik;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol3");?>" onClick="kupon('<?=codekupon("$encoded|3|$konuk"); ?>');"><?=$konuk;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol31");?>" onClick="kupon('<?=codekupon("$encoded|31|$cs1"); ?>');"><?=$cs1;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol32");?>" onClick="kupon('<?=codekupon("$encoded|32|$cs0"); ?>');"><?=$cs0;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol33");?>" onClick="kupon('<?=codekupon("$encoded|33|$cs2"); ?>');"><?=$cs2;?></td>

    <td class="bmodac" style="text-align:right; font-size:10px; color:#555;"><?=$handikap;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol".$h1id."");?>" onClick="kupon('<?=codekupon("$encoded|".$h1id."|$h1"); ?>');"><?=$h1;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol".$h0id."");?>" onClick="kupon('<?=codekupon("$encoded|".$h0id."|$h0"); ?>');"><?=$h0;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol".$h2id."");?>" onClick="kupon('<?=codekupon("$encoded|".$h2id."|$h2"); ?>');"><?=$h2;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol42");?>" onClick="kupon('<?=codekupon("$encoded|42|$bi1"); ?>');"><?=$bi1;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]futbol43");?>" onClick="kupon('<?=codekupon("$encoded|43|$bi2"); ?>');"><?=$bi2;?></td>

  </tr>

  <? } ?>

</table>

<? } 

// duello sonuc

// basketbol start

if($spor_tip==3) {

?>



<?



if($ayar['basketboltip']=="sistem") {

$sor = sed_sql_query("select * from programb where mac_tarih='$tarih' and iddaa_kodu='' group by kupa_isim $ordered");

} else {

$sor = sed_sql_query("select * from programb where mac_tarih='$tarih' and bulten='iddaabasket' group by kupa_isim $ordered");

}



if(sed_sql_numrows($sor)<1) { die("<div class='bos' style='text-align: center;font-weight: bold;margin: 5px;'>Herhangi bir kayıt bulunamadı</div>"); } ?>

<table class="bm" cellpadding="0" cellspacing="0">

  <?

  while($row=sed_sql_fetcharray($sor)) { 

  ?>

  <tr class="bmhead">

    <th colspan="4"></th>

    <th colspan="2" class="alc">Sonuç<br><span>Uzatmalar Dahil</span></th>

    <th colspan="3" class="alc">Top. Puan Alt/Üst<br><span>Uzatmalar Dahil</span></th>

    <th colspan="5" class="alc">İlk Yarı Alt/Üst<br><span>Sadece İlk Yarı</span></th>

  </tr>

  <tr class="bmod">

    <td colspan="4" style="text-align:left; color:#FFF; padding:5px 10px 5px;"><img src="<?=$row['bayrak']; ?>" style="vertical-align:middle; height:12px; margin-bottom:2px; padding-right:2px;"> <?=$row['kupa_isim']; ?></td>

    <td>1</td>

    <td>2</td>

    <td style="width:40px; padding-right:6px;">Puan</td>

    <td>Alt</td>

    <td>Üst</td>

    <td style="width:40px; padding-right:6px;">Puan</td>

    <td>Alt</td>

    <td>Üst</td>

  </tr>

  <?

  $s = sed_sql_query("select * from programb where kupa_isim='$row[kupa_isim]' and mac_tarih='$tarih' $ordered");

  while($ass=sed_sql_fetcharray($s)) {

	  

	  $ev = oranbulb($ass['id'],1);

	  $konuk = oranbulb($ass['id'],2);

	  

	

	  

	$alt = oranbulb($ass['id'],21);

	$ust = oranbulb($ass['id'],22);

		

 	if($alt=="-" || $ust=="-") { 

	$oval = '-';

	} else {

	$ooran = bilgi("select * from oranlarb where mac_db_id='$ass[id]' and oran_val_id='21'"); 

	$oval = $ooran['oran_val_b']; 

	}

	

	

	$iy_alt = oranbulb($ass['id'],19);

	$iy_ust = oranbulb($ass['id'],20);

		

 	if($iy_alt=="-" || $iy_ust=="-") { 

	$iy_oval = '-';

	} else {

	$iy_ooran = bilgi("select * from oranlarb where mac_db_id='$ass[id]' and oran_val_id='19'"); 

	$iy_oval = $iy_ooran['oran_val_b']; 

	}

	  

	  

	  

	  $encoded = "$ass[id]|$ass[ev_takim]|$ass[konuk_takim]|$ass[mac_kodu]|$ayar[basketmbs]|$ass[mac_time]|basketbol";

  ?>

  <tr class="musabaka">

    <td class="bmodac" style="width:40px;"><?=$ass['mac_kodu']; ?></td>

    <td class="bmodac"  style="width:100px;"><?=date("d.m H:i",$ass['mac_time']); ?></td>

    <td colspan="1" class="tdmus"><?="$ass[ev_takim] - $ass[konuk_takim]"; ?></td>

    <td class="bmodac"><img src="img/mbs_<?=mbsverb($ass['id'],$ass['mbs'],$ass['kupa_id']); ?>.png" style="vertical-align:middle;"></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]basketbol1");?>" onClick="kupon('<?=codekupon("$encoded|1|$ev"); ?>');"><?=$ev;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]basketbol2");?>" onClick="kupon('<?=codekupon("$encoded|2|$konuk"); ?>');"><?=$konuk;?></td>

    <td class="bmodac" style="font-size:11px; color:#888;"><?=$oval;?></td>



    <td class="tdbet bet" id="<?=idcode("$ass[id]basketbol21");?>" onClick="kupon('<?=codekupon("$encoded|21|$alt"); ?>');"><?=$alt;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]basketbol22");?>" onClick="kupon('<?=codekupon("$encoded|22|$ust"); ?>');"><?=$ust;?></td>

    

    <td class="bmodac" style="font-size:11px; color:#888;"><?=$iy_oval;?></td>

	<td class="tdbet bet" id="<?=idcode("$ass[id]basketbol19");?>" onClick="kupon('<?=codekupon("$encoded|19|$iy_alt"); ?>');"><?=$iy_alt;?></td>

    <td class="tdbet bet" id="<?=idcode("$ass[id]basketbol20");?>" onClick="kupon('<?=codekupon("$encoded|20|$iy_ust"); ?>');"><?=$iy_ust;?></td>

  </tr>

  <? } ?>

  <? } ?>

</table>

<? } 

// basketbol bitti

// canlıya gel babacan

else

if($spor_tip==4) {

?>

<div id="canliup">



</div>



<script>

$(document).ready(function(e) {

var rand = Math.random();

$.get('ajax.php?a=canliup&rand='+rand+'',function(data) { $("#canliup").html(data); });

});

</script>



<? } ?>



<? }

if($a=="canlilistesi") {

?>

<div class="incont">
<div style="color:#f00" class="warn">Aktif oynanan maçlar</div>
</div>

<?

$fark = time()-120;

$sor = sed_sql_query("select * from canli_maclar where songuncelleme>$fark and gelecek='0' order by id desc");

if(sed_sql_numrows($sor)<1) { echo "<div class='bos' style='text-align: center;font-weight: bold;margin: 10px;'>Herhangi bir canlı müsabaka bulunamadı</div>"; } else { ?>

<div class="incont">
	
<div id="ulist">

<table class="tablo" cellpadding="0" cellspacing="0">
<tbody>
<tr class="head">
<td>Dakika</td>
<td>Devre</td>
<td>Ev Sahibi</td>
<td>Skor</td>
<td>Deplasman</td>
<td>Düzen</td>
<td>Sürekli Askı</td>
<td>Maçı Gizle</td>
<td>Oran Düzenle</td>
</tr>

<?

if(file_exists("sistem/oranserver/".$ub['id']."-gizlicanlimaclar.xml")) {

$xml = simplexml_load_file("sistem/oranserver/".$ub['id']."-gizlicanlimaclar.xml");

$suangizliler = $xml->gizlimacids;

$bunubol = explode(",",$suangizliler);

$gizlivarmi = 1;

} else {

$gizlivarmi = 0;	

}

while($row=sed_sql_fetcharray($sor)) { 

if($gizlivarmi==1 && in_array($row['eventid'],$bunubol)) {

$bugizli = 1;	

} else {

$bugizli = 0;	

}

if(file_exists("sistem/oranserver/".$ub['id']."-".$row['eventid']."-surekliaski.canli")) {

$surekli_aski = 1;

} else {

$surekli_aski = 0;	

}

if(

file_exists("sistem/oranserver/".$ub['id']."-".$row['eventid']."-canlimbs.canli") ||

file_exists("sistem/oranserver/".$ub['id']."-ik-".$row['eventid']."-canlisabitoranlar.xml") ||

file_exists("sistem/oranserver/".$ub['id']."-cb-".$row['eventid']."-canlisabitoranlar.xml") ||

file_exists("sistem/oranserver/".$ub['id']."-iy-".$row['eventid']."-canlisabitoranlar.xml"))

{

$duzenleme = 1;

} else {

$duzenleme = 0;	

}

?>


<tr class="line">

<td><b><? if($row['devremi']=="1") { echo "Devre"; } else { echo $row['dakika']; } ?></b></td>

<td><b><?=$row['devre']; ?></b></td>

<td><b><?=$row['ev_takim']; ?></b></td>

<td><b><?="$row[ev_skor]:$row[konuk_skor]"; ?></b></td>

<td><b><?=$row['konuk_takim']; ?></b></td>

<td><b><? if($duzenleme==1) { echo "<font color=#00CC00><strong>Var</strong></font>"; } else { echo "<font color=#FF0000><strong>Yok</strong></font>"; } ?></b></td>

<td><b>

<? if($surekli_aski==0) { ?>

<a href="javascript:;" onClick="surekli_aski('<?=$row['eventid']; ?>');" class="redli" style="font-weight:bold;">Sürekli Askı</a>

<? } else { ?>

<a href="javascript:;" onClick="surekli_aski('<?=$row['eventid']; ?>');" class="greenli" style="font-weight:bold;">Normale Dön</a>

<? } ?>

</b></td>

<td><b>

<? if($bugizli==1) { ?>

<a href="javascript:;" onClick="maci_gizle('<?=$row['eventid']; ?>');" class="greenli" style="font-weight:bold;">Maçı Göster</a>

<? } else { ?>

<a href="javascript:;" onClick="maci_gizle('<?=$row['eventid']; ?>');" class="redli" style="font-weight:bold;">Maçı Gizle</a>

<? } ?>

</b></td>

<td><b>

<?

if((is_numeric($row['dakika']) && $row['dakika']<86) || !is_numeric($row['dakika'])) { ?>

<a href="oranduzenleme.php?secim=15&eventid=<?=$row['eventid']; ?>" class="greenli" style="font-weight:bold;">Düzenle</a>

<? } else { echo "<strong>Bitmek üzere</strong>"; } ?>

</b></td>

 </tr>

<? } ?>

</tbody></table>

<? } ?>

<script>

function surekli_aski(eventid) {

var rand = Math.random();	

$.get('ajax.php?a=surekliaski&eventid='+eventid+'',function(data) { updateCanlilist(); });

}

function maci_gizle(eventid) {

var rand = Math.random();	

$.get('ajax.php?a=macigizle&eventid='+eventid+'',function(data) { updateCanlilist(); });

}

</script>

<? }

if($a=="macigizle") {

$eventid = gd("eventid");

if(file_exists("sistem/oranserver/".$ub['id']."-gizlicanlimaclar.xml")) {

$xml = simplexml_load_file("sistem/oranserver/".$ub['id']."-gizlicanlimaclar.xml");

$suangizliler = $xml->gizlimacids;

$bunubol = explode(",",$suangizliler);

if(in_array($eventid,$bunubol)) {

$sonhali = str_replace($eventid,'',$suangizliler);

$icerik = '<?xml version="1.0"?>

<gizliler>

<gizlimacids>'.$sonhali.'</gizlimacids>

</gizliler>

';

} else {

$bundasonhal = str_replace(",,",",",$suangizliler);

$icerik = '<?xml version="1.0"?>

<gizliler>

<gizlimacids>'.$bundasonhal.','.$eventid.'</gizlimacids>

</gizliler>

';

}

$acma = fopen("sistem/oranserver/".$ub['id']."-gizlicanlimaclar.xml","w");

fwrite($acma,$icerik);

fclose($acma);	

} else {

$icerik = '<?xml version="1.0"?>

<gizliler>

<gizlimacids>'.$eventid.'</gizlimacids>

</gizliler>

';

$acma = fopen("sistem/oranserver/".$ub['id']."-gizlicanlimaclar.xml","w");

fwrite($acma,$icerik);

fclose($acma);

}

}

if($a=="surekliaski") {

$eventid = gd("eventid");

if(file_exists("sistem/oranserver/".$ub['id']."-".$eventid."-surekliaski.canli")) {

unlink("sistem/oranserver/".$ub['id']."-".$eventid."-surekliaski.canli");

} else {

$acma = fopen("sistem/oranserver/".$ub['id']."-".$eventid."-surekliaski.canli","w");

fwrite($acma,'ok');

fclose($acma);

}

}

if($a=="sonkupon") {

$sonkupon = bilgi("select * from kuponlar where session_id='$session_id' order by id desc limit 1");

if($sonkupon['id']=="") { die("23"); } else { sed_sql_query("delete from kupon where session_id='$session_id'"); }

$sor = sed_sql_query("select * from kupon_ic where kupon_id='$sonkupon[id]'");

while($row=sed_sql_fetcharray($sor)) {

$suan = time();

if($row['spor_tip']=="canli" || $row['spor_tip']=="canlib" || $row['spor_tip']=="canlit" || $row['spor_tip']=="canliv" || $row['spor_tip']=="canlibuz" || $row['spor_tip']=="canlih") {

## CANLI MAÇ BULUNUYOR ##
echo "403";
## CANLI MAÇ BULUNUYOR BİTİŞ ##

} else if($row['mac_time']>$suan) {

sed_sql_query("insert into kupon (id,mbs,mac_kodu,ev_takim,konuk_takim,mac_db_id,mac_time,mac_time_kontrol,oran_val_id,oran_tip,oran_val,oran,session_id,spor_tip,canli_info,bulten,sonucid) values 

('','$row[mbs]','$row[mac_kodu]','$row[ev_takim]','$row[konuk_takim]','$row[mac_db_id]','$row[mac_time]','$row[mac_time]','$row[oran_val_id]','$row[oran_tip]','$row[oran_val]','$row[oran]','$session_id','$row[spor_tip]','$row[canli_info]','$row[bulten]','$row[sonucid]')");

} else {
## MAÇ ZAMANI GEÇMİŞ ##
echo "23";
## MAÇ ZAMANI GEÇMİŞ BİTİŞ ##
}

}

##KUPON İDSİ GİRİLMİŞ SON KUPON YERİ BİTİŞ ##

}

if($a=="analiz_macgetir") {

$sportip = gd("sportip");

$baslangic = tarihtotime_start(gd("tarih"));

$bitis = tarihtotime_end(gd("tarih"));

$benimkiler = benimbayilerim($ub['id']);

if($sportip=="") {
die('<option value="">Spor tipi seçiniz</option>');
}

$sor = sed_sql_query("select * from kupon_ic where spor_tip='$sportip' and mac_time between '$baslangic' and '$bitis' and user_id in ($benimkiler) group by ev_takim,konuk_takim order by ev_takim asc");

if(sed_sql_numrows($sor)<1) {

echo '<option value="">Maç bulunamadı</option>';

} else {

echo '<option value="">Maç seçiniz</option>';

while($row=sed_sql_fetcharray($sor)) {

?>

<option value="<?="$row[ev_takim]|$row[konuk_takim]";?>"><?="$row[ev_takim] - $row[konuk_takim]"; ?></option>

<? } } ?>

<? } 

if($a=="analiz_tahmingetir") {

$sportip = gd("sportip");

$baslangic = tarihtotime_start(gd("tarih"));

$bitis = tarihtotime_end(gd("tarih"));

$benimkiler = benimbayilerim($ub['id']);

$mac = gd("mac");

$macbol = explode("|",$mac);

$ev_takim = $macbol[0];

$konuk_takim = $macbol[1];

$sor = sed_sql_query("select * from kupon_ic where spor_tip='$sportip' and mac_time between '$baslangic' and '$bitis' and ev_takim='$ev_takim' and konuk_takim='$konuk_takim' and user_id in ($benimkiler) group by oran_tip order by oran_tip asc");

if(sed_sql_numrows($sor)<1) {

echo '<option value="">Maç seçiniz</option>';

} else {

echo '<option value="">Tahmin Seçiniz</option>';

while($row=sed_sql_fetcharray($sor)) {

$otbol = explode("|",$row['oran_tip']);

?>

<option value="<?=base64_encode($row['oran_tip']); ?>"><?="$otbol[0] - $otbol[1]"; ?> <? if(!empty($row['oran_val'])) { echo "($row[oran_val])"; } ?></option>

<? } } ?>

<? } 

if($a=="analizle") {

$baslangic = tarihtotime_start(gd("tarih"));

$bitis = tarihtotime_end(gd("tarih"));

$benimkiler = benimbayilerim($ub['id']);

$sportip = gd("sportip");

$macdbid = gd("macdbid");

$macbol = explode("|",$macdbid);

$oranvalid = base64_decode(gd("oranvalid"));

$durum = gd("durum");

$enazoran = gd("enazoran");

if($enazoran=="") { $enazoran = "1"; }

if($oranvalid=="") { $oranvalidekle = ""; } else { $oranvalidekle = "and oran_tip='$oranvalid'"; }

if(empty($sportip) || empty($macdbid)) { die("<div class='bos'>Lütfen <strong>Spor Tip</strong> bölümünden başlayarak tüm alanları sırasıyla seçiniz</div>"); }

if($durum=="") { $durum_ekle = ""; } else { $durum_ekle = "and k.durum='$durum'"; }

$sor = sed_sql_query("select * from kupon_ic where mac_time between '$baslangic' and '$bitis' and spor_tip='$sportip' and ev_takim='$macbol[0]' and konuk_takim='$macbol[1]' ".$oranvalidekle." and oran>$enazoran and user_id in ($benimkiler) order by id desc");

$bilgisi = sed_sql_fetcharray($sor);

if(sed_sql_numrows($sor)<1) { echo "<div class='bos' style='text-align: center;font-weight: bold;margin: 10px;'>Herhangi bir sonuç bulunamadı</div>"; } else {

?>

<? if($ub['id']=="1") { 

?>

<form method="post">

<div class="boxcontent">

<div class="formbaslik">Kuponları ortak düzenle</div>

<div class="form">

<ul>

<li class="one">İlk Yarı</li>

<li><input type="text" class="input" id="duzen_iy" value="<?=$bilgisi['iy']; ?>"></li>

</ul>

<ul>

<li class="one">Maç Sonucu</li>

<li><input type="text" class="input" id="duzen_ms" value="<?=$bilgisi['ms']; ?>"></li>

</ul>

<ul>

<li class="one">Sabit Oran</li>

<li><input type="text" class="input" id="duzen_ortakoran" value="<? if($oranvalid!="") { echo "1"; } else { echo "0"; } ?>"></li>

</ul>

<ul>

<li class="one">Tercih</li>

<li><input type="text" class="input" id="duzen_orantip" value="<? if($oranvalid!="") { echo $bilgisi['oran_tip']; } else { echo ""; } ?>"></li>

</ul>

<ul>

<li class="one">Oran Değiştir</li>

<li><select class="input" id="duzen_orandegis">

<option value="0">Hayır</option>

<option value="1">Evet</option>

</select></li>

</ul>

<ul>

<li class="one">Durum Değiştir</li>

<li><select class="input" id="duzen_durum">

<option value="1">Bahis açık (Yeniden hesapla)</option>

<option value="2">Kazandı</option>

<option value="3">Kaybetti</option>

<option value="4">İptal</option>

</select></li>

</ul>

<ul>

<li></li>

<li><input type="button" onClick="allduzenle();" class="button" value="Güncelle"></li>

<input type="hidden" id="duzen_macdbid" value="<?="$macbol[0]|$macbol[1]"; ?>">

<input type="hidden" id="duzen_sportip" value="<?=$sportip;?>">

<input type="hidden" id="duzen_startfi" value="<?=$baslangic;?>|<?=$bitis;?>">

</ul>

</div>

</div>

<script>

function allduzenle() {

	if(confirm('Emin misin?')) {

	var rand = Math.random();

	var iy = $("#duzen_iy").val();

	var ms = $("#duzen_ms").val();

	var ortakoran = $("#duzen_ortakoran").val();

	var orantip = $("#duzen_orantip").val();

	var orandegis = $("#duzen_orandegis").val();

	var durum = $("#duzen_durum").val();

	var macdbid = $("#duzen_macdbid").val();

	var kuponids = $("#duzen_kupon_ids").val();

	var sportip = $("#duzen_sportip").val()

	var baslabit = $("#duzen_startfi").val();
	
	$.ajax({
		url: 'ajax.php?a=analizduzelt&iy='+iy+'&ms='+ms+'&ortakoran='+ortakoran+'&orantip='+orantip+'&orandegis='+orandegis+'&durum='+durum+'&macdbid='+macdbid+'&sportip='+sportip+'&baslabit='+baslabit+'',
		type:"POST",
		data: "kuponids="+kuponids+"",
		success: function(data) {
		raporla();	
		}
		});

	}

}

</script>

<? } ?>

<div class="formbaslik" style="border-radius:0px;">Seçtiğiniz kriterlere uygun kupon(lar) bulundu</div>

<div class="kuponlar">

<ul class="head">

<li>No</li>

<li>Durum</li>

<li>Bayi</li>

<li>Tarih</li>

<li>Maç</li>

<li class="alr">Yatırılan</li>

<li class="alr">Toplam Oran</li>

<li class="alr">Olası Kazanç</li>

<li>Tip</li>

</ul>

<? 

$sor = sed_sql_query("select * from kupon_ic where mac_time between '$baslangic' and '$bitis' and spor_tip='$sportip' and ev_takim='$macbol[0]' and konuk_takim='$macbol[1]' ".$oranvalidekle." and oran>$enazoran and user_id in ($benimkiler) order by id desc");

while($row=sed_sql_fetcharray($sor)) { 

$kupon_ids .= "$row[kupon_id],";

$kup_bilgi = bilgi("select * from kuponlar where id='$row[kupon_id]'");

?>

<ul class="durum_<?=$row['kazanma']; ?>">

<li style="cursor:pointer;" onClick="kupond('<?=$row['kupon_id']; ?>');"><img src="img/gordum.png" style="height:10px; display:none; vertical-align:middle; margin-bottom:2px;" id="gordum_<?=$row['kupon_id']; ?>"> <?=$row['kupon_id']; ?></li>

<li><?=durumnedir($kup_bilgi['durum']); ?> <? if($kup_bilgi['odendi']=="1") { ?>, Ödendi.<? } ?></li>

<li><?=$row['username']; ?></li>

<li><?=date("d.m.Y H:i:s",$kup_bilgi['kupon_time']); ?></li>

<li><?=$kup_bilgi['toplam_mac']; ?></li>

<li class="alr"><?=nf($kup_bilgi['yatan']); ?></li>

<li class="alr"><?=nf($kup_bilgi['oran']); ?></li>

<li class="alr"><?=nf($kup_bilgi['tutar']); ?></li>

<li><? if($kup_bilgi['canli']=="1") { echo "Canlı"; } else {echo "Normal"; } ?></li>

</ul>

<? } ?>

</div>

<? if($ub['id']=="1") { ?>

<input type="hidden" id="duzen_kupon_ids" value="<?=substr($kupon_ids,0,-1); ?>">

</form>

<? } ?>

<? } ?>

<? }

if($a=="analizduzelt") {

$iy = gd("iy");

$ms = gd("ms");

$ortakoran = gd("ortakoran");

$orantip = gd("orantip");

$orandegis = gd("orandegis");

$durum = gd("durum");

$macdbid = gd("macdbid");

$sportip = gd("sportip");

$kuponids = pd("kuponids");

$macbol = explode("|",$macdbid);

$baslabit = explode("|",gd("baslabit"));

$basla = $baslabit[0];

$bitir = $baslabit[1];

if($orandegis==1) { $orandegis_ekle = ",oran='$ortakoran'"; } else { $orandegis_ekle = ""; }

if(!empty($orantip)) { $orantip_ekle = "and oran_tip='$orantip'"; } else { $orantip_ekle = ""; }

sed_sql_query("update kupon_ic set iy='$iy',ms='$ms',kazanma='$durum'".$orandegis_ekle." where spor_tip='".$sportip."' and ev_takim='$macbol[0]' and konuk_takim='$macbol[1]' ".$orantip_ekle." and mac_time between '$basla' and '$bitir' and kazanma!='4'"); 

$kuponlar = explode(",",$kuponids);

for($i=0; $i<count($kuponlar); $i++) {

kupon_hesapla($kuponlar[$i]);

}

}

if($a=="kuponduz") {

$kupon_id = gd("kupon_id");

$yenioran = gd("yenioran");

$yenidurum = gd("yenidurum");

$mevcutoran = gd("mevcutoran");

$line_id = gd("idob");

$bayilerim = explode(",",benimbayilerim($ub['id']));

$zaman = time();

$ipadres = $_SERVER['REMOTE_ADDR'];

$kupon_bilgi = bilgi("select * from kuponlar where id='$kupon_id' limit 1");

if(empty($kupon_bilgi['id'])) { die("2"); } else

if(!in_array($kupon_bilgi['user_id'],$bayilerim)) { die("2"); } else {

sed_sql_query("update kupon_ic set oran='$yenioran',kazanma='$yenidurum' where id='$line_id'");

if($mevcutoran!=$yenioran || $mevcutdurum!=$yenidurum) {

sed_sql_query("insert into kupon_data (id,kupon_id,kupon_ic_id,edit_user,edit_user_id,edit_oran,edit_durum,yeni_oran,yeni_durum,zaman,ipadres) values

('','$kupon_id','$line_id','$ub[username]','$ub[id]','$mevcutoran','$mevcutdurum','$yenioran','$yenidurum','$zaman','$ipadres')");

}

kupon_hesapla($kupon_id);

die("1");

}

}

if($a=="hizligiris") {

$kodyapi = gd("ky");

$mackodus = gd("mackodu");

$secims = gd("secim");

$total = "$mackodus$secims";

$mackodu = substr($total,0,4);

$secim = substr($total,3,99);

$gizli_ligler = gizli_lig_list();

$gizli_maclar = gizli_mac_list();

if($gizli_ligler=="") { $gizli_lig_ekle = ""; } else { $gizli_lig_ekle = "and ulkeadi not in ($gizli_ligler)"; }

if($gizli_maclar=="") { $gizli_mac_ekle = ""; } else { $gizli_mac_ekle = "and id not in ($gizli_maclar)"; } 

$gizli_ekle = "$gizli_lig_ekle $gizli_mac_ekle";

$macbilgi = bilgi("select * from program where iddaa_kodu='$mackodu' $gizli_ekle");

if($macbilgi['id']=="") { die("5"); }

$sorgu = sed_sql_query("select * from hizligiris where (user_id='$ub[id]' or user_id='$ub[hesap_sahibi_id]' or user_id='$ub[hesap_root_id]') and yenitus='$secims'");

$sorgu_normal = sed_sql_query("select * from oran_val where tus='$secims'");

if(sed_sql_numrows($sorgu)>0) {

$bilgisi = sed_sql_fetcharray($sorgu);

$oran_val_id = $bilgisi['oranvalid'];

} else

if(sed_sql_numrows($sorgu_normal)>0) {

$bilgisi = sed_sql_fetcharray($sorgu_normal);

$oran_val_id = $bilgisi['id'];

}

if($oran_val_id) {

$mbs = mbsver($macbilgi['id'],$macbilgi['mbs'],$macbilgi['kupa_id']);

$encoded = "$macbilgi[id]|$macbilgi[ev_takim]|$macbilgi[konuk_takim]|$macbilgi[mac_kodu]|$mbs|$macbilgi[mac_time]|futbol";

if($oran_val_id=="23" || $oran_val_id=="26") {

$orani = oranbul($macbilgi['id'],23);

$orani2 = oranbul($macbilgi['id'],26);

$ici = "

kupon('".codekupon("".$encoded."|23|".$orani."")."');

kupon('".codekupon("".$encoded."|26|".$orani2."")."');

";

} else if($oran_val_id=="24" || $oran_val_id=="27") {

$orani = oranbul($macbilgi['id'],24);

$orani2 = oranbul($macbilgi['id'],27);

$ici = "

kupon('".codekupon("".$encoded."|24|".$orani."")."');

kupon('".codekupon("".$encoded."|27|".$orani2."")."');

";

} else if($oran_val_id=="25" || $oran_val_id=="28") {

$orani = oranbul($macbilgi['id'],25);

$orani2 = oranbul($macbilgi['id'],28);

$ici = "

kupon('".codekupon("".$encoded."|25|".$orani."")."');

kupon('".codekupon("".$encoded."|28|".$orani2."")."');

";

} else {

$orani = oranbul($macbilgi['id'],$oran_val_id);

$ici = "kupon('".codekupon("".$encoded."|".$oran_val_id."|".$orani."")."');";

}

$donen = "

<script>

$(document).ready(function() {

".$ici."

});

</script>

";

echo $donen;

} else {

die("5");	

}

}

if($a=="smslist") {

?>

<div class="boxbaslik">SMS Sistemi</div>

<div class="boxcontent">

<div class="form">

<ul>

<li class="one">Mevcut Bakiyeniz</li>

<li><strong><? if($ub['smsbakiye']<1) { echo "Hiç bakiyeniz yoktur."; } else { echo $ub['smsbakiye']; } ?></strong></li>

</ul>

</div>

</div>

<?

$sor = sed_sql_query("select * from kullanici where hesap_sahibi_id='$ub[id]' and root='0'");

if(sed_sql_numrows($sor)>0) { ?>

<div class="boxbaslik">Anlık SMS Durumları</div>



<div class="bulten">

<ul class="starter">

<li>Kullanıcı Adı</li>

<li>SMS Yetkisi</li>

<li>SMS Kontörü</li>

<li>Kontör Yükle</li>

<li>Yetki Değiştir</li>

</ul>

<?

while($row=sed_sql_fetcharray($sor)) { ?>

<ul>

<li><?=$row['username']; ?></li>

<li><? if($row['smsdurum']=="1") { echo "<strong>Gönderebilir</strong>"; } else { echo "Gönderemez"; } ?></li>

<li><?=$row['smsbakiye']; ?></li>

<li><input type="text" class="editkupon" style="padding:2px; border-radius:3px;" value="0" id="kolon_<?=$row['id'];?>"> <input type="button" class="editkupon editbutton sons" value="Ekle" onClick="sms_guncelle('ekle',<?=$row['id'];?>);"> <input onClick="sms_guncelle('cikar',<?=$row['id'];?>);" type="button" class="editkupon editbutton sons" value="Çıkar" style="margin-left:5px;"></li>

<li><? if($row['smsdurum']=="1") { ?><a href="javascript:;" onClick="sms_durum_degis('2','<?=$row['id'];?>');" class="redli">Kapalı Yap</a><? } else { ?><a href="javascript:;" onClick="sms_durum_degis('1','<?=$row['id'];?>');" class="greenli">Açık Yap</a><? } ?></li>

</ul>

<? } ?>

</div>

<? } ?>



<script>

function sms_guncelle(tip,id) {

var rand = Math.random();	

var tutars = $("#kolon_"+id+"").val();

loadgir('smslist');

$.get('ajax.php?a=smsguncelle&tip='+tip+'&id='+id+'&tutar='+tutars+'',function(data) {

if(data=="4") {

smsliste();	

} else

if(data=="201") { 

failcont('<?=getTranslation('failconthata')?>','<?=getTranslation('failconthata21')?>');

smsliste();

} else

if(data=="401") {

failcont('<?=getTranslation('failconthata')?>','<?=getTranslation('failconthata22')?>');	

smsliste();

} else

if(data=="405") {

failcont('<?=getTranslation('failconthata')?>','<?=getTranslation('failconthata23')?>');	

smsliste();

} else

if(data=="301") {

failcont('<?=getTranslation('failconthata')?>','<?=getTranslation('failconthata24')?>');	

smsliste();

} else

if(data=="302") {

failcont('<?=getTranslation('failconthata')?>','<?=getTranslation('failconthata25')?>');	

smsliste();

} else

if(data=="200") {

failcont('<?=getTranslation('failconthata')?>','<?=getTranslation('failconthata26')?>');	

smsliste();

}

});	

}

function sms_durum_degis(durum,user_id) {

var rand = Math.random();

loadgir('smslist');

$.get('ajax.php?a=smsdurumdegis&userid='+user_id+'&durum='+durum+'',function(data) { smsliste(); });	

}

</script>

<? }

if($a=="smsdurumdegis") {

$user_id = gd("userid");

$bayilerim = explode(",",benimbayilerim($ub['id']));

if(!in_array($user_id,$bayilerim)) { die(""); }

$durum = gd("durum");

sed_sql_query("update kullanici set smsdurum='$durum' where id='$user_id'");

}

if($a=="smsguncelle") {

$tip = gd("tip");

$user_id = gd("id");

$tutar = gd("tutar");

if($tutar!="0" && $tutar!="" && $tutar!="undefined") {

$bayilerim = explode(",",benimbayilerim($ub['id']));

if(!in_array($user_id,$bayilerim)) { die("201"); }

if($ub['smsdurum']!=1) { die("401"); }

if($tip!='ekle' && $tip!='cikar') { die("405"); }

$user_bilgi = bilgi("select * from kullanici where id='$user_id'");

$user_bakiye = $user_bilgi['smsbakiye'];

$admin_bakiye = $ub['smsbakiye'];

if($tip=="ekle" && $tutar>$admin_bakiye) { die("301"); }

if($tip=="cikar" && $tutar>$user_bakiye) { die("302"); }

if($tip=="ekle") {

	sed_sql_query("update kullanici set smsbakiye=smsbakiye+$tutar where id='$user_id'");

	sed_sql_query("update kullanici set smsbakiye=smsbakiye-$tutar where id='$ub[id]'");

	die("200");

} else

if($tip=="cikar") {

	sed_sql_query("update kullanici set smsbakiye=smsbakiye-$tutar where id='$user_id'");

	sed_sql_query("update kullanici set smsbakiye=smsbakiye+$tutar where id='$ub[id]'");

	die("200");

}

} else {

die("4");	

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

$kontrol = sed_sql_query("select * from kupon where session_id='$session_id' and canli_event='$macbilgi[eventid]'");

if(sed_sql_numrows($kontrol)>0) {

$obilgi = sed_sql_fetcharray($kontrol);

sed_sql_query("delete from kupon where id='$obilgi[id]'");

}

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

if(!empty($oran_val) && !empty($oran)) {

$canlibasketmbs = userayar('canlibasketmbs');

sed_sql_query("insert into kupon (id,mbs,mac_kodu,ev_takim,konuk_takim,mac_db_id,mac_time,mac_time_kontrol,oran_val_id,oran_tip,oran,session_id,spor_tip,oyun_tip,canli_event,canli_info,aktif,ilkgiris) values 

('','$canlibasketmbs','CNLB','$macbilgi[ev_takim]','$macbilgi[konuk_takim]','$macbilgi[id]','$mactime','$mac_timele','$oranvalid','$orantips','".$oran."','$session_id','canlib','canlib','$macbilgi[eventid]','$canliinfo','1','$suan')");

die("1");

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

$kontrol = sed_sql_query("select * from kupon where session_id='$session_id' and canli_event='$macbilgi[eventid]'");

if(sed_sql_numrows($kontrol)>0) {

$obilgi = sed_sql_fetcharray($kontrol);

sed_sql_query("delete from kupon where id='$obilgi[id]'");

}

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

if(!empty($oran_val) && !empty($oran)) {

$canlitenismbs = userayar('canlitenismbs');

sed_sql_query("insert into kupon (id,mbs,mac_kodu,ev_takim,konuk_takim,mac_db_id,mac_time,mac_time_kontrol,oran_val_id,oran_tip,oran,session_id,spor_tip,oyun_tip,canli_event,canli_info,aktif,ilkgiris) values 

('','$canlitenismbs','CNLT','$macbilgi[ev_takim]','$macbilgi[konuk_takim]','$macbilgi[id]','$mactime','$mac_timele','$oranvalid','$orantips','".$oran."','$session_id','canlit','canlit','$macbilgi[eventid]','$canliinfo','1','$suan')");

die("1");

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

$kontrol = sed_sql_query("select * from kupon where session_id='$session_id' and canli_event='$macbilgi[eventid]'");

if(sed_sql_numrows($kontrol)>0) {

$obilgi = sed_sql_fetcharray($kontrol);

sed_sql_query("delete from kupon where id='$obilgi[id]'");

}

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

if(!empty($oran_val) && !empty($oran)) {

$canlivoleybolmbs = userayar('canlivoleybolmbs');

sed_sql_query("insert into kupon (id,mbs,mac_kodu,ev_takim,konuk_takim,mac_db_id,mac_time,mac_time_kontrol,oran_val_id,oran_tip,oran,session_id,spor_tip,oyun_tip,canli_event,canli_info,aktif,ilkgiris) values 

('','$canlivoleybolmbs','CNLV','$macbilgi[ev_takim]','$macbilgi[konuk_takim]','$macbilgi[id]','$mactime','$mac_timele','$oranvalid','$orantips','".$oran."','$session_id','canliv','canliv','$macbilgi[eventid]','$canliinfo','1','$suan')");

die("1");

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

$kontrol = sed_sql_query("select * from kupon where session_id='$session_id' and canli_event='$macbilgi[eventid]'");

if(sed_sql_numrows($kontrol)>0) {

$obilgi = sed_sql_fetcharray($kontrol);

sed_sql_query("delete from kupon where id='$obilgi[id]'");

}

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

if(!empty($oran_val) && !empty($oran)) {

$canlibuzhokeyimbs = userayar('canlibuzhokeyimbs');

sed_sql_query("insert into kupon (id,mbs,mac_kodu,ev_takim,konuk_takim,mac_db_id,mac_time,mac_time_kontrol,oran_val_id,oran_tip,oran,session_id,spor_tip,oyun_tip,canli_event,canli_info,aktif,ilkgiris) values 

('','$canlibuzhokeyimbs','CNLBUZ','$macbilgi[ev_takim]','$macbilgi[konuk_takim]','$macbilgi[id]','$mactime','$mac_timele','$oranvalid','$orantips','".$oran."','$session_id','canlibuz','canlibuz','$macbilgi[eventid]','$canliinfo','1','$suan')");

die("1");

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

function aralik($girdi) { 

    $saniye = 1; 

    $dakika = 60; 

    $saat   = 3600; 

    $gun    = 86400; 

    $cikti = ""; 

    # Don't touch, only watch 

    for ($i=0;($i*$gun)<=$girdi;$i++) { $toplamgun = $i; } 

    if  ( $toplamgun > 0 ) { 

        $girdi = $girdi - ($gun*$toplamgun); 

        $cikti .= "$toplamgun gün "; 

    } 

    for ($i=0;($i*$saat)<=$girdi;$i++) { $toplamsaat = $i; } 

    if  ( $toplamsaat > 0 ) { 

        $girdi = $girdi - ($saat*$toplamsaat); 

        $cikti .= "$toplamsaat saat "; 

    } 

    for ($i=0;($i*$dakika)<=$girdi;$i++) { $toplamdakika = $i; } 

    if  ( $toplamdakika > 0 ) { 

        $girdi = $girdi - ($dakika*$toplamdakika); 

        $cikti .= "$toplamdakika dakika "; 

    } 

    if  ( $girdi > 0 ) {     

        $cikti .= "$girdi saniye"; 

    } 

    return $cikti; 

}

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
sed_sql_query("delete from oranlar_hentbol where mac_db_id='$row6[id]'");
sed_sql_query("delete from program_hentbol where id='$row6[id]'");
}
sed_sql_query("delete from oranlar_futbol where oran='0.00'");
sed_sql_query("delete from oranlar_basketbol where oran='0.00'");
sed_sql_query("delete from oranlar_tenis where oran='0.00'");
sed_sql_query("delete from oranlar_voleybol where oran='0.00'");
sed_sql_query("delete from oranlar_buzhokeyi where oran='0.00'");
sed_sql_query("delete from oranlar_hentbol where oran='0.00'");

?>

<span id="mainPage">
<div class="e_active e_noCache margin_r_12" id="comp-selection">
<div class="space"></div>
<div class="e_active e_noCache jq-compound-event-block" id="budacount_1">

<div class="border_ccc">
<div>
<div class="t_head cf">
<div class="fs_16 darkgrey pad_l_9 left"><div><?=getTranslation('futbol')?> - <?=getTranslation('yaklasan')?></div></div>
<div class="t_head_but right">
<div class="more_types on">
<span class="ng-scope" id="opensubbet_1" onclick="opensubbet('1');" style="display: inline;margin-right: 12px;font-size: 11px;text-decoration: underline;cursor: pointer;"><?=getTranslation('bahisseceneklerinigoster')?></span>
<span class="ng-scope" id="slocesubbet_1" onclick="slocesubbet('1');" style="display: none;margin-right: 12px;font-size: 11px;text-decoration: underline;cursor: pointer;"><?=getTranslation('bahisseceneklerinigizle')?></span>
</div>
</div>
</div>
</div>
<div class="e_active jq-compound-event-block">
<div id="resultTypeFilter_1_UPCOMING" class="resultTypeFilter type_box cf list_1" style="display: none;">
<div class="type_but on" id="odseelctbut_1_1" onclick="macsonucuac('1');">
<div class="info cf"><span class="left"><?=getTranslation('tahminsecenegi')?></span>
<span class="info_but"><span class="bubble b_left top16 b_shad"><?=getTranslation('tahminsecenegiaciklama')?></span></span>
</div>
</div>
<div class="type_but" id="odseelctbut_16_1" onclick="ciftesansac('1');">
<div class="info cf"><span class="left"><?=getTranslation('tahminsecenegiciftesans')?></span>
<span class="info_but"><span class="bubble b_left top16 b_shad"><?=getTranslation('tahminsecenegiaciklamacs')?></span></span>
</div>
</div>
<div class="type_but " id="odseelctbut_28_1" onclick="altustac('1');">
<div class="info cf"><span class="left"><?=getTranslation('tahminsecenegialtust')?> 2.5</span>
<span class="info_but"><span class="bubble b_left top16 b_shad"><?=getTranslation('tahminsecenegiaciklamaau')?></span></span>
</div>
</div>
</div>
</div>

<div class="e_active" id="League1">
<div class="">
<div class="e_active" id="comp-UPCOMING_HEADER_58349">
<div class="t_subhead cf">

<div class="grey_999 right cf" id="thebox_1_1" style="margin-right: 95px">
<div class="w_39 left" style="min-height: 1px;">1</div>
<div class="w_39 left" style="min-height: 1px;">X</div>
<div class="w_39 left" style="min-height: 1px;">2</div>
</div>

<div class="grey_999 right cf" id="thebox_16_1" style="margin-right: 100px;display:none">
<div class="w_39 left" style="min-height: 1px;">1X</div>
<div class="w_39 left" style="min-height: 1px;">X2</div>
<div class="w_39 left" style="min-height: 1px;">12</div>
</div>

<div class="grey_999 right cf" id="thebox_28_1" style="margin-right: 98px;display:none">
<div class="w_39 left" style="min-height: 1px;">2.5</div>
<div class="w_39 left" style="min-height: 1px;">A</div>
<div class="w_39 left" style="min-height: 1px;">Ü</div>
</div>

<div class="red pad_l_9" onmouseover="tip(jQuery(this).html(), 55, true)" onmouseout="untip()"></div>
<div class="close_groups" onclick="toggleAndUpdate(event, '1301','GROUP')"></div>
</div>
</div>

<?
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
$whereyasak.= ' AND ev_takim not like "%'.$r['kelime'].'%" AND konuk_takim not like "%'.$r['kelime'].'%" ';
}
/* yasak kelimeler */
$kayittime_ver = $suan-300;
$songuncellemever = time()-900;

$sqladder = "and kayittime<$kayittime_ver and bulten='hititbet' $gizli_ekle and kupa_isim not like '%Duello%' {$whereyasak} and aktif='1'";
$sor = sed_sql_query("select * from program_futbol where id!='' $sqladder order by mac_time asc LIMIT 25");
if(userayar('sporbulten')==0) { ?>
<div class="bos" style="text-align: center;font-weight: bold;margin: 10px;">Spor (bülten) bahisleri kapalıdır. Yöneticiniz ile görüşünüz.</div>
<? } else {

if(sed_sql_numrows($sor)<1) { echo "<div class='bos' style='text-align: center;font-weight: bold;margin: 10px;'>".getTranslation('musabakabulunmadi')."</div>"; }
$say=1;
while($row=sed_sql_fetcharray($sor)) { 
$say++;
$ev_kazanc = oranbulxxx_futbol($row['id'],1);

$beraberlik = oranbulxxx_futbol($row['id'],2);

$konuk_kazanc = oranbulxxx_futbol($row['id'],3);	

$ciftesans_1X = oranbulxxx_futbol($row['id'],176);

$ciftesans_X2 = oranbulxxx_futbol($row['id'],177);

$ciftesans_12 = oranbulxxx_futbol($row['id'],178);

$altust_25_alt = oranbulxxx_futbol($row['id'],33);

$altust_25_ust = oranbulxxx_futbol($row['id'],34);

$mbs = mbsver($row['id'],$row['mbs'],$row['kupa_id']);

$encoded = "$row[id]|$row[ev_takim]|$row[konuk_takim]|$row[mac_kodu]|$mbs|$row[mac_time]|futbol";
?>


<div class="<? if ($say %2 != 0){ ?><? }else{ ?>even<? } ?>">

<div class="e_active t_row jq-event-row-cont" >
<div class="info">

<div class="w_30 align_c left over" style="" onmouseover="tip(this.firstChild.data, 6)" >
<? echo $GLOBALS["gunler"][date("N",$row['mac_time'])];?>
</div>

<div class="w_35 align_center left over ng-binding" title="<?=date("Y-m-d H:i",$row['mac_time']); ?>">&nbsp;<?=date("d.m",$row['mac_time']); ?>&nbsp;/&nbsp;</div>

<div class="w_35 bl align_center left timecell"><div class="timeText2 ng-binding" style="font-weight: bold;"><?=date("H:i",$row['mac_time']); ?></div></div>

<div class="t_cell w_113 left" style="width: 119px;margin-left:5px;cursor:pointer;"><span class="teamname"><?=$row["ev_takim"];?></span></div>

<div class="teamHelpWrap" style="width: 119px;"><div class="t_cell w_113 left" style="cursor:pointer;"><span class="teamname"><?=$row["konuk_takim"];?></span></div></div>

<div style="border: 1px solid #f74835;background-color: #ffc3bc;color: #000000;margin-top:3px;" class="mbs<?=$mbs;?>"><a href="javascript:;" class="ng-binding"><?=$mbs;?></a></div>

<div class="bl pad_2 left " id="realgames_1_1">
<div data-qa="oddsButton" class="qbut qbut-<?=md5("1X2|1|".$row["id"]);?>" onclick="kupon('<?=codekupon("$encoded|1|$ev_kazanc"); ?>');"><?=$ev_kazanc;?></div>
<div data-qa="oddsButton" class="qbut qbut-<?=md5("1X2|X|".$row["id"]);?>" onclick="kupon('<?=codekupon("$encoded|2|$beraberlik"); ?>');"><?=$beraberlik;?></div>
<div data-qa="oddsButton" class="qbut qbut-<?=md5("1X2|2|".$row["id"]);?>" onclick="kupon('<?=codekupon("$encoded|3|$konuk_kazanc"); ?>');"><?=$konuk_kazanc;?></div>
</div>

<div class="bl pad_2 left " id="realgames_16_1" style="display:none">
<div data-qa="oddsButton" class="qbut qbut-<?=md5("Çifte Şans|1X|".$row["id"]);?>" onclick="kupon('<?=codekupon("$encoded|76|$ciftesans_1X"); ?>');"><?=$ciftesans_1X;?></div>
<div data-qa="oddsButton" class="qbut qbut-<?=md5("Çifte Şans|X2|".$row["id"]);?>" onclick="kupon('<?=codekupon("$encoded|77|$ciftesans_X2"); ?>');"><?=$ciftesans_X2;?></div>
<div data-qa="oddsButton" class="qbut qbut-<?=md5("Çifte Şans|12|".$row["id"]);?>" onclick="kupon('<?=codekupon("$encoded|78|$ciftesans_12"); ?>');"><?=$ciftesans_12;?></div>
</div>

<div class="bl pad_2 left " id="realgames_28_1" style="display:none">
<div style="position: relative;float: left;width: 37px;height: 18px;color: #000;font-size: 11px;line-height: 18px;text-align: center;margin: 1px;margin-top: 2px;">(2.5)</div>
<div data-qa="oddsButton" class="qbut qbut-<?=md5("Toplam Gol Alt/Üst 2.5|A|".$row["id"]);?>" onclick="kupon('<?=codekupon("$encoded|33|$altust_25_alt"); ?>');"><?=$altust_25_alt;?></div>
<div data-qa="oddsButton" class="qbut qbut-<?=md5("Toplam Gol Alt/Üst 2.5|Ü|".$row["id"]);?>" onclick="kupon('<?=codekupon("$encoded|34|$altust_25_ust"); ?>');"><?=$altust_25_ust;?></div>
</div>

<div class="bl pad_r_3 left">
<div class="ibut">
<div class="user">
<div id="ratioHolder<?=$row["id"];?>" style="display: none;">
</div>
</div>
</div>


<? if($row["istatistik"]!=0){ ?>
<div class="ibut " id="statistics-<?=$row["id"];?>-lastminute">
<a href="javascript:popup('https://s5.sir.sportradar.com/totobo/tr/2/match/<?=$row["istatistik"];?>','stats',1078,768);" class="stat" onmouseover="loadEventStatistics2(this, <?=$row["id"];?>, 'soccer', 'lastminute')" onmouseout="untooltipDelayed(this)"></a>
</div>
<? } else { ?>
<div class="ibut off" id="statistics-<?=$row["id"];?>-lastminute">
<div class="stat"></div>
</div>
<? } ?>


<div id="comp-eventTvButton-<?=$row["id"];?>-lastminute" class="e_active ibut off" e:url="@@eventTvButton-<?=$row["id"];?>-lastminute/program/eventTVButton2?eventId=<?=$row["id"];?>" e:hash="13sjxvy" e:interval="-1" e:next="-1">
<div class="tv">&nbsp;</div>
</div>

</div>
</div>
<div class="limits_hover ">

<? 
$gizli_oran_tips = gizli_oran_tips($row['kupa_id'],$row['id']);
if($gizli_oran_tips!="") { $gizli_ekle = "and oran_tip not in ($gizli_oran_tips)"; } else { $gizli_ekle = ""; }
$sayi = sed_sql_numrows(sed_sql_query("select * from oranlar_futbol where mac_db_id='".$row["id"]."' $gizli_ekle and durum='1' order by id asc"));
?>

<div data-qa="extraButton" class="t_more bl align_c right" id="detayfutbolac<? if(isset($row["id"])) { echo $row["id"];}?>" style="" onclick="detayfutbolac(<? if(isset($row["id"])) { echo $row["id"];}?>);">
<span>+<?=$sayi;?></span>
</div>
<div data-qa="extraButton" class="t_more bl align_c right" id="detayfutbolkapat<? if(isset($row["id"])) { echo $row["id"];}?>" style="display:none;" onclick="detayfutbolkapat(<? if(isset($row["id"])) { echo $row["id"];}?>);">
<span>-<?=$sayi;?></span>
</div>
<div id="comp-specialBetLayerCategoryPopup-<?=$row["id"];?>-lastminute" class="e_active jq-special-bet-layer-category-popup e_comp_ref" style="display:none;">
</div>

</div>

<div class="clear">
</div>

<div id="comp-sbLayer-<?=$row["id"];?>-lastminute" class="e_active jq-special-bet-layer e_comp_ref" style="display:none;">
<div class="t_more_box">
<div class="hr bg_toughgrey" style="margin-right: 30px;">
</div>
<div class="border_ccc" style="margin: 5px; padding: 18px; text-align: center;" id="loading<? if(isset($row["id"])) { echo $row["id"];}?>">
<img src="assets/loader-5EC8AAA4E74F0E0AD0FC5FF964B6DF96.gif" alt="" width="236" height="31">
</div>
<div id="prematchdetail<? if(isset($row["id"])) { echo $row["id"];}?>"  style="display:none">
</div>
</div>

</div>
</div>

</div>

<? 

if($i==10){break;}

}

}

?>

<div class="t_foot">
</div>
</div>
<div class="space_15 shadow_bot_564">
</div>

</div>

<script>
function detayfutbolac(matchid) {
jQuery('#comp-sbLayer-'+matchid+'-lastminute').show();
var rand = Math.random();
$.get('ajax.php?a=detailfutbol&rand='+rand+'&id='+matchid+'',function(data) {
jQuery('#prematchdetail'+matchid).show().html(data);
jQuery('#loading'+matchid).hide().html("");
jQuery('#detayfutbolkapat'+matchid).show();
jQuery('#detayfutbolac'+matchid).hide();
});
}

function detayfutbolkapat(matchid) {
jQuery('#prematchdetail'+matchid).hide().html("");
jQuery('#loading'+matchid).show();
jQuery('#comp-sbLayer-'+matchid+'-lastminute').hide();
jQuery('#detayfutbolkapat'+matchid).hide();
jQuery('#detayfutbolac'+matchid).show();
}
</script>

<? }

@ob_end_flush();
@ob_end_flush();

sed_sql_close($connection_id);
?>