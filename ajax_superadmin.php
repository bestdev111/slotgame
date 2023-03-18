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

$ustler = "SELECT k.hesap_sahibi_id as ust1 ,k2.hesap_sahibi_id as ust2 FROM kullanici as k  INNER JOIN kullanici as k2 ON k2.id = k.hesap_sahibi_id where k.id=".$_SESSION['betuser']."";
#echo $ustler;
$sor = sed_sql_query($ustler);
$r = sed_sql_fetchassoc($sor);
$_SESSION['ustler'] = array($r['ust1'],$r['ust2']);

if($a=="yasaklikelimesil") {
	$sql= "DELETE FROM yasak_kelimeler WHERE id =".gd('id');
	$sor = sed_sql_query($sql);
	if(!$sor) die($sql." - ".mysql_erorr());
}

if($a=="kupondegisimlog") {

$tarih1 = basla_time(gd("tarih1"));

$tarih2 = bitir_time(gd("tarih2"));

$kid = gd("kid");

if(!empty($kid)) { $kid_ekle = "and kupon_id='$kid'"; } else { $kid_ekle = ""; }

$pageper = 50;

$benimbayilerim = benimbayilerim($ub['id']);

$bayi_array = explode(",",$benimbayilerim);

$gelen_sayfa = (isset($_GET['sayfa']) && $_GET['sayfa'] !='' ) ? intval($_GET['sayfa']) : 1;

//Sayfada kaç kayıt görünecek
$limit = $pageper;

//Kaç sayfa öncesi ve sonrası görünecek
$s_s = 10;

/*------------------------------------
Alan Başlıklarını ve $sonuc['alan1'] 
kısımlarını kendinize göre değiştirin
-------------------------------------*/


$sqladder_sayfalama = "edit_user_id='".$ub['id']."' $kid_ekle and zaman between '$tarih1' and '$tarih2'";

$s_sor = sed_sql_query("select count(id) from kupon_data where $sqladder_sayfalama") or trigger_error(sed_sql_error(),E_USER_ERROR);

$satir = sed_sql_result($s_sor,0);

sed_sql_freeresult($s_sor);

if($satir >0){//sonuç varsa

$baslama = ($gelen_sayfa > 1) ? (($gelen_sayfa -1) * $limit) : 0 ;

$sayfa_kac = $satir/$limit;

$sayfa_sayisi = ($satir % $limit != 0) ? intval($sayfa_kac)+1 : intval($sayfa_kac);

$basla=( $satir >= $baslama ) ? $baslama : 0 ;

unset( $sayfa_kac, $baslama );

$sqladderone = "edit_user_id='".$ub['id']."' $kid_ekle and zaman between '$tarih1' and '$tarih2' order by zaman DESC limit $basla,$limit";

$sor = sed_sql_query("select * from kupon_data where $sqladderone");

$i=1;

$style='';

if(sed_sql_numrows($sor)<1) { ?>

<? } else { ?>

<div class="card-block p-0">
<div class="table-responsive">
<table class="table mb-0">

<thead>
<tr>
<th class="header" style="text-align: center;">#</th>
<th class="header" style="text-align: center;"><?=getTranslation('ajaxkupondegisim3')?></th>
<th class="header" style="text-align: center;"><?=getTranslation('ajaxkupondegisim4')?></th>
<th class="header" style="text-align: center;"><?=getTranslation('ajaxkupondegisim5')?></th>
<th class="header" style="text-align: center;"><?=getTranslation('ajaxkupondegisim6')?></th>
<th class="header" style="text-align: center;"><?=getTranslation('ajaxkupondegisim7')?></th>
<th class="header" style="text-align: center;"><?=getTranslation('ajaxkupondegisim8')?></th>
</tr>
</thead>
<tbody id="calcall">

<? $say=1; while($ass=sed_sql_fetcharray($sor)) { $say++;
$karsilasma_bilgi = bilgi("select * from kupon_ic where id='".$ass['kupon_ic_id']."' limit 1");
?>

<tr style="<? if ($say %2 != 0){ ?><? }else{ ?>background-color: #cfd8dc;<? } ?>">
<td style="text-align:center;"><?=$ass['id']; ?></td>
<td style="text-align:center;"><?=$ass['kupon_id']; ?></td>
<td style="text-align:center;"><?=$karsilasma_bilgi['ev_takim']; ?> - <?=$karsilasma_bilgi['konuk_takim']; ?></td>


<? if($ass['edit_oran']!=$ass['yeni_oran']) { ?>

<td style="text-align:center;color: #0074d9;"><?=getTranslation('ajaxkupondegisim9')?></td>

<td style="text-align:center;"><?=$ass['edit_oran'];?></td>

<td style="text-align:center;"><?=$ass['yeni_oran'];?></td>

<? } else { ?>

<td style="text-align:center;color:#f00;"><?=getTranslation('ajaxkupondegisim10')?></td>

<td style="text-align:center;"><? if($ass['edit_durum']==1){ ?><font style="color:#000;"><?=getTranslation('ajaxkupondegisim11')?></font><? } else if($ass['edit_durum']==2){ ?><font style="color:#42dc26;"><?=getTranslation('ajaxkupondegisim12')?></font><? } else if($ass['edit_durum']==3){ ?><font style="color:#f00;"><?=getTranslation('ajaxkupondegisim13')?></font><? } else if($ass['edit_durum']==4){ ?><font style="color:#0074df;"><?=getTranslation('ajaxkupondegisim14')?></font><? } ?></td>

<td style="text-align:center;"><? if($ass['yeni_durum']==1){ ?><font style="color:#000;"><?=getTranslation('ajaxkupondegisim11')?></font><? } else if($ass['yeni_durum']==2){ ?><font style="color:#42dc26;"><?=getTranslation('ajaxkupondegisim12')?></font><? } else if($ass['yeni_durum']==3){ ?><font style="color:#f00;"><?=getTranslation('ajaxkupondegisim13')?></font><? } else if($ass['yeni_durum']==4){ ?><font style="color:#0074df;"><?=getTranslation('ajaxkupondegisim14')?></font><? } ?></td>

<? } ?>

<td style="text-align:center;"><?=$ass['ipadres'];?></td>

<? } ?>

</tbody>

<tfoot>

<? 
$style = ($style=='') ? '2' : '';
$i++;
} ?>		

<? $hangi_sayfa= ($gelen_sayfa > 0)? $gelen_sayfa : 1 ; ?>

<tr>
<td colspan="9" class="text-xs-center">
<? 
$alt= ($gelen_sayfa - $s_s);
if($sayfa_sayisi <= $s_s || $gelen_sayfa <= $s_s ) {$alt=1;}
$ust= (($gelen_sayfa + $s_s)< $sayfa_sayisi ) ? ($gelen_sayfa + $s_s) : ($sayfa_sayisi);
?>
<? if($gelen_sayfa > 1 ){ ?>
<a style="margin: 0px 2px !important;" class="btn btn-info m-0" href="javascript:;" onclick="kuponraporgetir(1,1);" id="sayfaveri"><?=getTranslation('ajaxtumkuponlarim30');?></a>
<a style="margin: 0px 2px !important;" class="btn btn-info m-0" href="javascript:;" id="sayfaveri" onclick="kuponraporgetir(1,<?=($gelen_sayfa -1);?>);">« <?=getTranslation('ajaxtumkuponlarim31');?></a>
<? } ?>
<? for($i=$alt; $i<=$ust ;$i++){ ?>
<? if($i != $gelen_sayfa ){ ?>
<a style="margin: 0px 2px !important;" class="btn btn-info m-0" href="javascript:;" id="sayfaveri" onclick="kuponraporgetir(1,<?=$i;?>);"><?=$i;?></a>
<? } else { ?>
<span class="btn btn-info m-0" style="margin: 0px 2px !important;background-color: #11c540;border-color: #11c540;"><?=$i;?></span>
<? } ?>
<? } ?>
<? if($gelen_sayfa < $sayfa_sayisi){ ?>
<a style="margin: 0px 2px !important;" class="btn btn-info m-0" href="javascript:;" id="sayfaveri" onclick="kuponraporgetir(1,<?=($gelen_sayfa +1);?>);"><?=getTranslation('ajaxtumkuponlarim32');?> »</a>
<a style="margin: 0px 2px !important;" class="btn btn-info m-0" href="javascript:;" id="sayfaveri" onclick="kuponraporgetir(1,<?=$sayfa_sayisi;?>);"><?=getTranslation('ajaxtumkuponlarim33');?></a>
<? } ?>
</td></tr>

</div>
</div>
</div>
</div>
</span>

<? } ?>

<? }

if($a=="kuponduz") {

$kupon_id = gd("kupon_id");

$yenioran = gd("yenioran");

$yenidurum = gd("yenidurum");

$mevcutoran = gd("mevcutoran");

$mevcutdurum = gd("mevcutdurum");

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

if($a=="ligdurumdegis") {

$ulke = gd("ulke");
$lig = gd("lig");
$spor_tipi = gd("spor_tipi");

sed_sql_query("delete from program_lig_gizli where spor_tipi='".$spor_tipi."' and lig_adi='".$lig."' and lig_ulke='".$ulke."' and bayi_id='".$ub['id']."'");

}

if($a=="canlidurum_degis") {

$id = gd("id");
$sportipi = gd("sportipi");
$durum = gd("durum");

if($sportipi=="futbol" && $durum == 1){
sed_sql_query("delete from yasakcanli where spor_tipi='futbol' and eventid='".$id."' and bayi_id='".$ub['id']."'");
} else if($sportipi=="futbol" && $durum == 0){
sed_sql_query("INSERT INTO yasakcanli SET spor_tipi='futbol', eventid = '".$id."', bayi_id = '".$ub['id']."'");
} else if($sportipi=="basketbol" && $durum == 1){
sed_sql_query("delete from yasakcanli where spor_tipi='basketbol' and eventid='".$id."' and bayi_id='".$ub['id']."'");
} else if($sportipi=="basketbol" && $durum == 0){
sed_sql_query("INSERT INTO yasakcanli SET spor_tipi='basketbol', eventid = '".$id."', bayi_id = '".$ub['id']."'");
}

}

if($a=="canlibahisler") {

/* yasak kelimeler */ 
$whereyasak ="";
$sec = "SELECT * FROM yasak_kelimeler WHERE user_id IN (1,".$_SESSION['betuser'].",".implode(",", $_SESSION['ustler']).")";
$sor = sed_sql_query($sec);
while($r = sed_sql_fetchassoc($sor)) {
$whereyasak.= ' AND ev_takim not like "%'.$r['kelime'].'%" AND konuk_takim not like "%'.$r['kelime'].'%" ';
}
/* yasak kelimeler */

$sa = date("H:i");
$fark = time()-120;
$sor = sed_sql_query("select * from canli_maclar where songuncelleme>$fark and isibitti='0' {$whereyasak} group by eventid asc");
?>

<div class="container-fluid mt-2">
<div class="row">
<div class="card">
<div class="card-header">
<?=getTranslation('canlibahis')?>
<select class="inputCombo chosen" onchange="window.location.href='canlibahislerbasket.php';">
<option value="1" selected><?=getTranslation('ajaxcanlibahisler3')?></option>
<option value="2"><?=getTranslation('ajaxcanlibahisler4')?></option>
</select>
</div>
<div class="card-block p-0">
<div class="table-responsive">
<table class="table table-striped mb-0">
<thead>
<tr>
<th width="5%"><?=getTranslation('ajaxcanlibahisler5')?></th>
<th width="10%"><?=getTranslation('ajaxcanlibahisler6')?></th>
<th width="10%"><?=getTranslation('ajaxcanlibahisler7')?></th>
<th width="5%"><?=getTranslation('ajaxcanlibahisler8')?></th>
<th width="10%"><?=getTranslation('ajaxcanlibahisler9')?></th>
<th width="5%"><?=getTranslation('ajaxcanlibahisler10')?></th>
<th width="5%"><?=getTranslation('superadmin45')?></th>
</tr>
</thead>
<tbody id="liverunning1">

<?
$yeni = false;
$ulke = null;
while($row=sed_sql_fetcharray($sor)) {
$baslama_saat = strtotime($row['baslamasaat']);
$saat_ver = date("H:i",$baslama_saat);
$toplam = sed_sql_numrows($sor);

$bilgisi_getir_durum = bilgi("select * from yasakcanli where spor_tipi='futbol' and eventid='".$row['eventid']."' and bayi_id='".$ub['id']."'");
if($bilgisi_getir_durum['id']>0) { $bilgisini_ver_durum = 0; } else { $bilgisini_ver_durum = 1; }


?>

<tr id="livetr_<?=$row['eventid']; ?>">
<td class="c"><?=$saat_ver; ?></td>
<td><?="".substr($row['ev_takim'],0,15)." - ".substr($row['konuk_takim'],0,15).""; ?></td>
<td><?=$row['ulke']; ?> <? if($row['lig_adi']=="") { echo "Müsabaka bilgisi güncellendi."; } else { ?><?=$row['lig_adi']; ?><? } ?></td>
<td class="c"><?=$row['ev_skor']; ?>:<?=$row['konuk_skor']; ?></td>
<td class="c"><? if($row['devre']=="Devre Arası") { ?><?=getTranslation('ajaxkupond14')?><? } else if($row['devre']=="Bitti") { ?><?=getTranslation('canliyibolbasketekran10')?><? } else if($row['devre']=="İlk Yarı") { ?><?=getTranslation('ajaxkupond65')?><? } else if($row['devre']=="İkinci Yarı") { ?><?=getTranslation('ajaxkupond66')?><? } else if($row['devre']=="Henüz başlamadı") { ?><?=getTranslation('yeniyerler_kasa191')?><? } else if($row['devremi']=="1") { ?><?=getTranslation('ajaxkupond14')?><? } else if($row['dakika']=="") { ?><?=getTranslation('yeniyerler_kasa192')?><? } else { ?><?=getTranslation('yeniyerler_kasa192')?><? } ?></td>
<td class="c livetimer_true"><?=$row['dakika'];?> <?=getTranslation('ajaxcanlibahisler10')?></td>
<td class="c">
<? if($bilgisini_ver_durum==1){ ?>
<a class="grid" href="javascript:;" onclick="canlidurum_degis('<?=$row['eventid'];?>','futbol','0');"><img src="players/img/bahisler/status_1.png" border="0" id="liveimg_<?=$row['eventid']; ?>"></a>
<? } else { ?>
<a class="grid" href="javascript:;" onclick="canlidurum_degis('<?=$row['eventid'];?>','futbol','1');"><img src="players/img/bahisler/status_2.png" border="0" id="liveimg_<?=$row['eventid']; ?>"></a>
<? } ?>
</td>
</tr>

<? } ?>

</tbody>

</table>
</div>
</div>
</div>
</div>
</div>

<script>
function canlidurum_degis(id,sportipi,durum) {

var rand = Math.random();

$.get('../ajax_superadmin.php?a=canlidurum_degis&id='+id+'&sportipi=futbol&durum='+durum+'',function(data) {
	alert("<?=getTranslation('ajaxcanlibahisler14')?>");
});

}
</script>

<script>
$(document).ready(function(e) {
var maclist = setTimeout(function() { canlimaclist(0); },8000);
});
</script>

<? } 

if($a=="canlibahisler_2") {

/* yasak kelimeler */ 
$whereyasak ="";
$sec = "SELECT * FROM yasak_kelimeler WHERE user_id IN (1,".$_SESSION['betuser'].",".implode(",", $_SESSION['ustler']).")";
$sor = sed_sql_query($sec);
while($r = sed_sql_fetchassoc($sor)) {
$whereyasak.= ' AND ev_takim not like "%'.$r['kelime'].'%" AND konuk_takim not like "%'.$r['kelime'].'%" ';
}
/* yasak kelimeler */

$sa = date("H:i");
$fark = time()-120;
$sor = sed_sql_query("select * from basketbol_canli_maclar where songuncelleme>$fark and isibitti='0' {$whereyasak} group by eventid asc");
?>

<div class="container-fluid mt-2">
<div class="row">
<div class="card">
<div class="card-header">
<?=getTranslation('canlibahis')?>
<select class="inputCombo chosen" onchange="window.location.href='canlibahisler.php';">
<option value="1"><?=getTranslation('ajaxcanlibahisler3')?></option>
<option value="2" selected><?=getTranslation('ajaxcanlibahisler4')?></option>
</select>
</div>
<div class="card-block p-0">
<div class="table-responsive">
<table class="table table-striped mb-0">
<thead>
<tr>
<th width="5%"><?=getTranslation('ajaxcanlibahisler5')?></th>
<th width="10%"><?=getTranslation('ajaxcanlibahisler6')?></th>
<th width="10%"><?=getTranslation('ajaxcanlibahisler7')?></th>
<th width="5%"><?=getTranslation('ajaxcanlibahisler8')?></th>
<th width="10%"><?=getTranslation('ajaxcanlibahisler9')?></th>
<th width="5%"><?=getTranslation('ajaxcanlibahisler10')?></th>
<th width="5%"><?=getTranslation('superadmin45')?></th>
</tr>
</thead>
<tbody id="liverunning1">

<?
$yeni = false;
$ulke = null;
while($row=sed_sql_fetcharray($sor)) {
$baslama_saat = strtotime($row['baslamasaat']);
$saat_ver = date("H:i",$baslama_saat);
$toplam = sed_sql_numrows($sor);

$bilgisi_getir_durum = bilgi("select * from yasakcanli where spor_tipi='basketbol' and eventid='".$row['eventid']."' and bayi_id='".$ub['id']."'");
if($bilgisi_getir_durum['id']>0) { $bilgisini_ver_durum = 0; } else { $bilgisini_ver_durum = 1; }


?>

<tr id="livetr_<?=$row['eventid']; ?>">
<td><?=$saat_ver; ?></td>
<td><?="".substr($row['ev_takim'],0,15)." - ".substr($row['konuk_takim'],0,15).""; ?></td>
<td><?=$row['ulke']; ?> <? if($row['lig_adi']=="") { echo "Müsabaka bilgisi güncellendi."; } else { ?><?=$row['lig_adi']; ?><? } ?></td>
<td><?=$row['ev_skor']; ?>:<?=$row['konuk_skor']; ?></td>
<td class="c"><? if($row['period']=="Başlamadı") { ?><?=getTranslation('canliyibolbasketekran1')?><? } else if($row['period']=="1.Çeyrek") { ?><?=getTranslation('canliyibolbasketekran2')?><? } else if($row['period']=="2.Çeyrek") { ?><?=getTranslation('canliyibolbasketekran4')?><? } else if($row['period']=="3.Çeyrek") { ?><?=getTranslation('canliyibolbasketekran6')?><? } else if($row['period']=="4.Çeyrek") { ?><?=getTranslation('canliyibolbasketekran8')?><? } else if($row['period']=="1.Ara") { ?><?=getTranslation('canliyibolbasketekran3')?><? } else if($row['period']=="2.Ara") { ?><?=getTranslation('canliyibolbasketekran5')?><? } else if($row['period']=="3.Ara") { ?><?=getTranslation('canliyibolbasketekran7')?><? } else if($row['period']=="4.Ara") { ?><?=getTranslation('canliyibolbasketekran9')?><? } else if($row['period']=="STP") { ?><?=getTranslation('canliyibolbasketekran10')?><? } ?></td>
<td><?=$row['dakika'];?></td>
<td>

<? if($bilgisini_ver_durum==1){ ?>
<a class="grid" href="javascript:;" onclick="canlidurum_degis('<?=$row['eventid'];?>','basketbol','0');"><img src="players/img/bahisler/status_1.png" border="0" id="liveimg_<?=$row['eventid']; ?>"></a>
<? } else { ?>
<a class="grid" href="javascript:;" onclick="canlidurum_degis('<?=$row['eventid'];?>','basketbol','1');"><img src="players/img/bahisler/status_2.png" border="0" id="liveimg_<?=$row['eventid']; ?>"></a>
<? } ?>

</td>
</tr>

<? } ?>

<script>
function canlidurum_degis(id,sportipi,durum) {

var rand = Math.random();

$.get('../ajax_superadmin.php?a=canlidurum_degis&id='+id+'&sportipi=basketbol&durum='+durum+'',function(data) {
	alert("<?=getTranslation('ajaxcanlibahisler14')?>");
});

}
</script>

</tbody>

</table>
</div>
</div>
</div>
</div>
</div>

<script>
$(document).ready(function(e) {
var maclist = setTimeout(function() { canlimaclist(0); },8000);
});
</script>

<? }

if($a=="sistemdekiler"){

$fark = time()-100;
if($ub['id']==1){
$sor = sed_sql_query("select * from kullanici where sonislem>$fark and root='0' order by sonislem desc");
}else{
$sor = sed_sql_query("select * from kullanici where sonislem>$fark and root='0' and (hesap_sahibi_user='".$ub['id']."' or hesap_sahibi_id='".$ub['id']."' or hesap_root_id='".$ub['id']."' or hesap_root_root_id='".$ub['id']."') order by sonislem desc");
}
$toplam = sed_sql_numrows($sor);
?>

<div class="container-fluid mt-2">
<div class="row">
<div class="card">
<div class="card-header font-weight-bold" style="text-align:center;"><?=getTranslation('sistemdekiler4')?> ( <strong style="color:#f00;font-weight:bold;font-size:16px;"><?=$toplam;?></strong> ) <?=getTranslation('sistemdekiler5')?></div>
</div>
</div>
</div>

<div class="card-block p-0">
<div class="table-responsive">
<table class="table mb-0">

<thead>
<tr>
<th class="header" style="text-align: center;"><?=getTranslation('sistemdekiler6')?></th>
<th class="header" style="text-align: center;"><?=getTranslation('sistemdekiler7')?></th>
<th class="header" style="text-align: center;"><?=getTranslation('sistemdekiler8')?></th>
<th class="header" style="text-align: center;"><?=getTranslation('sistemdekiler9')?></th>
<th class="header" style="text-align: center;"><?=getTranslation('sistemdekiler10')?></th>
<th class="header" style="text-align: center;"><?=getTranslation('sistemdekiler11')?></th>
<th class="header" style="text-align: center;"><?=getTranslation('sistemdekiler12')?></th>
</tr>
</thead>
<tbody id="calcall">

<?
$say=1;
while($row=sed_sql_fetcharray($sor)) {
$say++;
?>

<tr class="c" style="<? if ($say %2 != 0){ ?><? }else{ ?>background-color: #cfd8dc;<? } ?>">

<td style="text-align:center"><?=$row['username']; ?></td>
<td style="text-align:center"><? 
if($row['id']=="1") { echo "Sistem Sahibi"; } else
if($row['hesap_root_root_id']=="") { echo "Patron Hesabı"; } else
if($row['wkyetki']=="3") { echo "Web Kullanıcı"; } else
if($row['wkyetki']=="2") { echo "Bayi"; } else
if($row['wkyetki']=="1") { echo "Süper Bayi"; } else
if($row['alt_durum']>0 && $row['alt_alt_durum']<1) { echo "Admin"; } else
if($row['alt_alt_durum']>0 && $row['sahip']<1) { echo "Super Admin"; } else
if($row['sahip']>0) { echo "Joker Admin"; }
?></td>
<td style="text-align:center"><?=$row['hesap_sahibi_user']; ?></td>
<td style="text-align:center"><?=date('d.m / H:i',$row['sonislem']);?></td>
<td style="text-align:center"><?=agent($row['oantarayici']); ?></td>
<td style="text-align:center"><a class="grid" href="https://ipinfo.io/<?=$row['oanip']; ?>" title="<?=getTranslation('sistemdekiler13')?>" rel="external">
<img src="players/img/bayiler/ip.png" alt="Detaylar" border="0">
</a></td>
<td style="text-align:center"><a href="sistemdekiler.php?islem=disariat&id=<?=$row['id']?>"><img src="players/img/bayiler/deleteyetki.png" alt="Dışarı At" border="0"></a></td>

</tr>
<? } ?>

<? }

if($a=="casinodallari") {

$id = gd("id");

$sor = sed_sql_query("select * from sistemayar where ayar_id='$id'");

if(sed_sql_numrows($sor)<1) { ?>

<div class="alert alert-danger mb-0" id="error" style="display:block;"><?=getTranslation('yeniyerler_kasa174')?> <a href="kasa/ayarlar.php"><?=getTranslation('yeniyerler_kasa175')?></a> </div>

<? } else { ?>

<script>

function asdes(order,as) {

$("#order").val(order);	

$("#ascdesc").val(as);

$("#suanval").val(1);

casinodallari(<?=$id;?>);

}

function casinodallaridurum(id,casinotipi,durum) {

var rand = Math.random();	

$.get('../ajax_superadmin.php?a=casinodallaridurumdegis&id='+id+'&casinotipi='+casinotipi+'&durum='+durum+'',function(data) { casinodallari('<?=$id;?>'); });

}

</script>

<div class="container-fluid mt-2">
<div class="row">
<div class="row">
<div class="col-sm-12">
<div class="card">
<div class="card-header"><?=getTranslation('yeniyerler_kasa330')?></div>
<div class="card-block">
<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 50%;float: left;margin-top: 7px;"><?=getTranslation('yeniyerler_kasa329')?></label>
<div class="input-group" style="width: 50%;float: right;">
<div class="switch" style="width: 50%;float: left;text-align: left;"><?=getTranslation('ajaxtumkuponlarim8')?></div>
<div class="switch" style="width: 50%;float: left;text-align: left;"><?=getTranslation('ajaxtumkuponlarim16')?></div>
</div>
</div>

<? while($row=sed_sql_fetcharray($sor)) { ?>

<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 50%;float: left;margin-top: 7px;"><?=getTranslation('yeniyerler_kasa331')?></label>
<div class="input-group" style="width: 50%;float: right;">
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($row['casino_basmaca']=="1") { 
$dur_casino_basmaca = 1;
?>
<img src="players/img/akfpsf_1.png" alt="Durum" border="0">
<? } else if($row['casino_basmaca']=="0") { 
$dur_casino_basmaca = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } else if($row['casino_basmaca']=="") { 
$dur_casino_basmaca = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } ?>
</div>
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($dur_casino_basmaca=="1") { ?>
<a href="javascript:;" onClick="casinodallaridurum('<?=$row['ayar_id']; ?>','casino_basmaca','0');"><font style="color:#f00;font-weight:bold;"><?=getTranslation('ajaxspordallaripasifet')?></font></a>
<? } else if($dur_casino_basmaca=="0") { ?>
<a href="javascript:;" onClick="casinodallaridurum('<?=$row['ayar_id']; ?>','casino_basmaca','1');"><font style="color:#0f8311;font-weight:bold;"><?=getTranslation('ajaxspordallariaktifet')?></font></a>
<? } ?>
</div>
</div>
</div>

<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 50%;float: left;margin-top: 7px;"><?=getTranslation('yeniyerler_kasa332')?></label>
<div class="input-group" style="width: 50%;float: right;">
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($row['casino_poker']=="1") { 
$dur_casino_poker = 1;
?>
<img src="players/img/akfpsf_1.png" alt="Durum" border="0">
<? } else if($row['casino_poker']=="0") { 
$dur_casino_poker = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } else if($row['casino_poker']=="") { 
$dur_casino_poker = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } ?>
</div>
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($dur_casino_poker=="1") { ?>
<a href="javascript:;" onClick="casinodallaridurum('<?=$row['ayar_id']; ?>','casino_poker','0');"><font style="color:#f00;font-weight:bold;"><?=getTranslation('ajaxspordallaripasifet')?></font></a>
<? } else if($dur_casino_poker=="0") { ?>
<a href="javascript:;" onClick="casinodallaridurum('<?=$row['ayar_id']; ?>','casino_poker','1');"><font style="color:#0f8311;font-weight:bold;"><?=getTranslation('ajaxspordallariaktifet')?></font></a>
<? } ?>
</div>
</div>
</div>

<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 50%;float: left;margin-top: 7px;"><?=getTranslation('yeniyerler_kasa333')?></label>
<div class="input-group" style="width: 50%;float: right;">
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($row['casino_bakara']=="1") { 
$dur_casino_bakara = 1;
?>
<img src="players/img/akfpsf_1.png" alt="Durum" border="0">
<? } else if($row['casino_bakara']=="0") { 
$dur_casino_bakara = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } else if($row['casino_bakara']=="") { 
$dur_casino_bakara = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } ?>
</div>
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($dur_casino_bakara=="1") { ?>
<a href="javascript:;" onClick="casinodallaridurum('<?=$row['ayar_id']; ?>','casino_bakara','0');"><font style="color:#f00;font-weight:bold;"><?=getTranslation('ajaxspordallaripasifet')?></font></a>
<? } else if($dur_casino_bakara=="0") { ?>
<a href="javascript:;" onClick="casinodallaridurum('<?=$row['ayar_id']; ?>','casino_bakara','1');"><font style="color:#0f8311;font-weight:bold;"><?=getTranslation('ajaxspordallariaktifet')?></font></a>
<? } ?>
</div>
</div>
</div>

<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 50%;float: left;margin-top: 7px;"><?=getTranslation('yeniyerler_kasa334')?></label>
<div class="input-group" style="width: 50%;float: right;">
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($row['casino_carkifelek']=="1") { 
$dur_casino_carkifelek = 1;
?>
<img src="players/img/akfpsf_1.png" alt="Durum" border="0">
<? } else if($row['casino_carkifelek']=="0") { 
$dur_casino_carkifelek = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } else if($row['casino_carkifelek']=="") { 
$dur_casino_carkifelek = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } ?>
</div>
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($dur_casino_carkifelek=="1") { ?>
<a href="javascript:;" onClick="casinodallaridurum('<?=$row['ayar_id']; ?>','casino_carkifelek','0');"><font style="color:#f00;font-weight:bold;"><?=getTranslation('ajaxspordallaripasifet')?></font></a>
<? } else if($dur_casino_carkifelek=="0") { ?>
<a href="javascript:;" onClick="casinodallaridurum('<?=$row['ayar_id']; ?>','casino_carkifelek','1');"><font style="color:#0f8311;font-weight:bold;"><?=getTranslation('ajaxspordallariaktifet')?></font></a>
<? } ?>
</div>
</div>
</div>

<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 50%;float: left;margin-top: 7px;"><?=getTranslation('yeniyerler_kasa335')?></label>
<div class="input-group" style="width: 50%;float: right;">
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($row['casino_zar']=="1") { 
$dur_casino_zar = 1;
?>
<img src="players/img/akfpsf_1.png" alt="Durum" border="0">
<? } else if($row['casino_zar']=="0") { 
$dur_casino_zar = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } else if($row['casino_zar']=="") { 
$dur_casino_zar = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } ?>
</div>
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($dur_casino_zar=="1") { ?>
<a href="javascript:;" onClick="casinodallaridurum('<?=$row['ayar_id']; ?>','casino_zar','0');"><font style="color:#f00;font-weight:bold;"><?=getTranslation('ajaxspordallaripasifet')?></font></a>
<? } else if($dur_casino_zar=="0") { ?>
<a href="javascript:;" onClick="casinodallaridurum('<?=$row['ayar_id']; ?>','casino_zar','1');"><font style="color:#0f8311;font-weight:bold;"><?=getTranslation('ajaxspordallariaktifet')?></font></a>
<? } ?>
</div>
</div>
</div>

<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 50%;float: left;margin-top: 7px;"><?=getTranslation('yeniyerler_kasa336')?></label>
<div class="input-group" style="width: 50%;float: right;">
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($row['casino_poker6']=="1") { 
$dur_casino_poker6 = 1;
?>
<img src="players/img/akfpsf_1.png" alt="Durum" border="0">
<? } else if($row['casino_poker6']=="0") { 
$dur_casino_poker6 = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } else if($row['casino_poker6']=="") { 
$dur_casino_poker6 = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } ?>
</div>
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($dur_casino_poker6=="1") { ?>
<a href="javascript:;" onClick="casinodallaridurum('<?=$row['ayar_id']; ?>','casino_poker6','0');"><font style="color:#f00;font-weight:bold;"><?=getTranslation('ajaxspordallaripasifet')?></font></a>
<? } else if($dur_casino_poker6=="0") { ?>
<a href="javascript:;" onClick="casinodallaridurum('<?=$row['ayar_id']; ?>','casino_poker6','1');"><font style="color:#0f8311;font-weight:bold;"><?=getTranslation('ajaxspordallariaktifet')?></font></a>
<? } ?>
</div>
</div>
</div>

<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 50%;float: left;margin-top: 7px;"><?=getTranslation('yeniyerler_kasa337')?> 5</label>
<div class="input-group" style="width: 50%;float: right;">
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($row['casino_loto5']=="1") { 
$dur_casino_loto5 = 1;
?>
<img src="players/img/akfpsf_1.png" alt="Durum" border="0">
<? } else if($row['casino_loto5']=="0") { 
$dur_casino_loto5 = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } else if($row['casino_loto5']=="") { 
$dur_casino_loto5 = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } ?>
</div>
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($dur_casino_loto5=="1") { ?>
<a href="javascript:;" onClick="casinodallaridurum('<?=$row['ayar_id']; ?>','casino_loto5','0');"><font style="color:#f00;font-weight:bold;"><?=getTranslation('ajaxspordallaripasifet')?></font></a>
<? } else if($dur_casino_loto5=="0") { ?>
<a href="javascript:;" onClick="casinodallaridurum('<?=$row['ayar_id']; ?>','casino_loto5','1');"><font style="color:#0f8311;font-weight:bold;"><?=getTranslation('ajaxspordallariaktifet')?></font></a>
<? } ?>
</div>
</div>
</div>

<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 50%;float: left;margin-top: 7px;"><?=getTranslation('yeniyerler_kasa337')?> 6</label>
<div class="input-group" style="width: 50%;float: right;">
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($row['casino_loto6']=="1") { 
$dur_casino_loto6 = 1;
?>
<img src="players/img/akfpsf_1.png" alt="Durum" border="0">
<? } else if($row['casino_loto6']=="0") { 
$dur_casino_loto6 = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } else if($row['casino_loto6']=="") { 
$dur_casino_loto6 = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } ?>
</div>
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($dur_casino_loto6=="1") { ?>
<a href="javascript:;" onClick="casinodallaridurum('<?=$row['ayar_id']; ?>','casino_loto6','0');"><font style="color:#f00;font-weight:bold;"><?=getTranslation('ajaxspordallaripasifet')?></font></a>
<? } else if($dur_casino_loto6=="0") { ?>
<a href="javascript:;" onClick="casinodallaridurum('<?=$row['ayar_id']; ?>','casino_loto6','1');"><font style="color:#0f8311;font-weight:bold;"><?=getTranslation('ajaxspordallariaktifet')?></font></a>
<? } ?>
</div>
</div>
</div>

<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 50%;float: left;margin-top: 7px;"><?=getTranslation('yeniyerler_kasa337')?> 7</label>
<div class="input-group" style="width: 50%;float: right;">
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($row['casino_loto7']=="1") { 
$dur_casino_loto7 = 1;
?>
<img src="players/img/akfpsf_1.png" alt="Durum" border="0">
<? } else if($row['casino_loto7']=="0") { 
$dur_casino_loto7 = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } else if($row['casino_loto7']=="") { 
$dur_casino_loto7 = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } ?>
</div>
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($dur_casino_loto7=="1") { ?>
<a href="javascript:;" onClick="casinodallaridurum('<?=$row['ayar_id']; ?>','casino_loto7','0');"><font style="color:#f00;font-weight:bold;"><?=getTranslation('ajaxspordallaripasifet')?></font></a>
<? } else if($dur_casino_loto7=="0") { ?>
<a href="javascript:;" onClick="casinodallaridurum('<?=$row['ayar_id']; ?>','casino_loto7','1');"><font style="color:#0f8311;font-weight:bold;"><?=getTranslation('ajaxspordallariaktifet')?></font></a>
<? } ?>
</div>
</div>
</div>

<? } ?>

</div>
</div>
</div>
</div>
</div>
</div>

<? } ?>

<? }

if($a=="ruletdali") {

$id = gd("id");

$sor = sed_sql_query("select * from sistemayar where ayar_id='$id'");

if(sed_sql_numrows($sor)<1) { ?>

<div class="alert alert-danger mb-0" id="error" style="display:block;"><?=getTranslation('yeniyerler_kasa174')?> <a href="kasa/ayarlar.php"><?=getTranslation('yeniyerler_kasa175')?></a></div>

<? } else { ?>

<script>

function asdes(order,as) {

$("#order").val(order);	

$("#ascdesc").val(as);

$("#suanval").val(1);

casinodallari(<?=$id;?>);

}

function casinodallaridurum(id,casinotipi,durum) {

var rand = Math.random();	

$.get('../ajax_superadmin.php?a=casinodallaridurumdegis&id='+id+'&casinotipi='+casinotipi+'&durum='+durum+'',function(data) { casinodallari('<?=$id;?>'); });

}

</script>

<div class="container-fluid mt-2">
<div class="row">
<div class="row">
<div class="col-sm-12">
<div class="card">
<div class="card-header"><?=getTranslation('yeniyerler_kasa17')?></div>
<div class="card-block">

<? while($row=sed_sql_fetcharray($sor)) { ?>

<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 50%;float: left;margin-top: 7px;"><?=getTranslation('yeniyerler_kasa229')?></label>
<div class="input-group" style="width: 50%;float: right;">
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($row['rulet_oynama']=="1") { ?>
<img src="players/img/akfpsf_1.png" alt="Durum" border="0">
<? } else if($row['rulet_oynama']=="0") { ?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } else if($row['rulet_oynama']=="") { ?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } ?>
</div>
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($row['rulet_oynama']=="1") { ?>
<a href="javascript:;" onClick="casinodallaridurum('<?=$row['ayar_id']; ?>','rulet_oynama','0');"><font style="color:#f00;font-weight:bold;"><?=getTranslation('ajaxspordallaripasifet')?></font></a>
<? } else if($row['rulet_oynama']=="0") { ?>
<a href="javascript:;" onClick="casinodallaridurum('<?=$row['ayar_id']; ?>','rulet_oynama','1');"><font style="color:#0f8311;font-weight:bold;"><?=getTranslation('ajaxspordallariaktifet')?></font></a>
<? } ?>
</div>
</div>
</div>

<? } ?>

</div>
</div>
</div>
</div>
</div>
</div>

<? } ?>

<? }

if($a=="ruletackapat") { ?>

<script>
function sistemayaryetkiduzenle(id,casinotipi,durum) {
var rand = Math.random();	
$.get('../ajax_superadmin.php?a=casinodallaridurumdegis&id='+id+'&casinotipi='+casinotipi+'&durum='+durum+'',function(data) { ruletliste(); });
}
</script>

<div class="container-fluid mt-2">
<div class="row">
<div class="row">
<div class="col-sm-12">
<div class="card">
<div class="card-header"><?=getTranslation('yeniyerler_kasa17')?></div>
<div class="card-block">

<?
$sor = sed_sql_query("select * from kullanici where hesap_sahibi_id='".$ub['id']."' and root='0' order by id asc");
while($row=sed_sql_fetcharray($sor)) {
$bilgi_getir = bilgi("SELECT rulet_yetki FROM sistemayar WHERE ayar_id='$row[id]'");
?>

<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 50%;float: left;margin-top: 7px;"><?=$row['username'];?> - <?=getTranslation('yeniyerler_kasa229')?></label>
<div class="input-group" style="width: 50%;float: right;">
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($bilgi_getir['rulet_yetki']=="1") { ?>
<img src="players/img/akfpsf_1.png" alt="Durum" border="0">
<? } else if($bilgi_getir['rulet_yetki']=="0") { ?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } else if($bilgi_getir['rulet_yetki']=="") { ?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } ?>
</div>
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($bilgi_getir['rulet_yetki']=="1") { ?>
<a href="javascript:;" onClick="sistemayaryetkiduzenle('<?=$row['id']; ?>','rulet_yetki','0');"><font style="color:#f00;font-weight:bold;"><?=getTranslation('ajaxspordallaripasifet')?></font></a>
<? } else if($bilgi_getir['rulet_yetki']=="0") { ?>
<a href="javascript:;" onClick="sistemayaryetkiduzenle('<?=$row['id']; ?>','rulet_yetki','1');"><font style="color:#0f8311;font-weight:bold;"><?=getTranslation('ajaxspordallariaktifet')?></font></a>
<? } ?>
</div>
</div>
</div>

<? } ?>

</div>
</div>
</div>
</div>
</div>
</div>

<? }

if($a=="spordallari") {

$id = gd("id");

$sor = sed_sql_query("select * from sistemayar where ayar_id='$id'");

if(sed_sql_numrows($sor)<1) { ?>

<div class="alert alert-danger mb-0" id="error" style="display:block;">
<?=getTranslation('yeniyerler_kasa174')?> - <a href="kasa/ayarlar.php"> <?=getTranslation('yeniyerler_kasa175')?></a></div>

<? } else { ?>

<script>

function asdes(order,as) {

$("#order").val(order);	

$("#ascdesc").val(as);

$("#suanval").val(1);

spordallari(<?=$id;?>);

}

function spordallaridurum(id,sportipi,durum) {

var rand = Math.random();	

$.get('../ajax_superadmin.php?a=spordallaridurumdegis&id='+id+'&sportipi='+sportipi+'&durum='+durum+'',function(data) { spordallari('<?=$id;?>'); });

}

</script>

<div class="container-fluid mt-2">
<div class="row">
<div class="row">
<div class="col-sm-12">
<div class="card">
<div class="card-header"><?=getTranslation('yeniyerler_kasa176')?></div>
<div class="card-block">
<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 50%;float: left;margin-top: 7px;"><?=getTranslation('ajaxspordallari2')?></label>
<div class="input-group" style="width: 50%;float: right;">
<div class="switch" style="width: 50%;float: left;text-align: left;"><?=getTranslation('ajaxspordallari3')?></div>
<div class="switch" style="width: 50%;float: left;text-align: left;"><?=getTranslation('ajaxspordallari4')?></div>
</div>
</div>

<?

while($row=sed_sql_fetcharray($sor)) {

?>

<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 50%;float: left;margin-top: 7px;color: #1102f5;"><?=getTranslation('yeniyerler_kasa177')?> <br><font style="color:#f00;"><?=getTranslation('yeniyerler_kasa178')?></font></label>
<div class="input-group" style="width: 50%;float: right;">
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? 
if($row['sporbulten']=="1") {
$dur_sporbulten = 1;
?>
<img src="players/img/akfpsf_1.png" alt="Durum" border="0">
<? } else if($row['sporbulten']=="0") {
$dur_sporbulten = 0; 
?> 
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } else if($row['sporbulten']=="") {
$dur_sporbulten = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } ?>
</div>
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($dur_sporbulten=="1") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','sporbulten','0');"><font style="color:#f00;font-weight:bold;"><?=getTranslation('ajaxspordallaripasifet')?></font></a>
<? } else if($dur_sporbulten=="0") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','sporbulten','1');"><font style="color:#0f8311;font-weight:bold;"><?=getTranslation('ajaxspordallariaktifet')?></font></a>
<? } ?>
</div>
</div>
</div>

<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 50%;float: left;margin-top: 7px;"><?=getTranslation('ajaxspordallaribasketbol')?></label>
<div class="input-group" style="width: 50%;float: right;">
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($row['basketbol']=="1") { 
$dur_basketbol = 1;
?>
<img src="players/img/akfpsf_1.png" alt="Durum" border="0">
<? } else if($row['basketbol']=="0") { 
$dur_basketbol = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } else if($row['basketbol']=="") { 
$dur_basketbol = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } ?>
</div>
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($dur_basketbol=="1") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','basketbol','0');"><font style="color:#f00;font-weight:bold;"><?=getTranslation('ajaxspordallaripasifet')?></font></a>
<? } else if($dur_basketbol=="0") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','basketbol','1');"><font style="color:#0f8311;font-weight:bold;"><?=getTranslation('ajaxspordallariaktifet')?></font></a>
<? } ?>
</div>
</div>
</div>

<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 50%;float: left;margin-top: 7px;"><?=getTranslation('ajaxspordallaritenis')?></label>
<div class="input-group" style="width: 50%;float: right;">
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($row['tenis']=="1") { 
$dur_tenis = 1;
?>
<img src="players/img/akfpsf_1.png" alt="Durum" border="0">
<? } else if($row['tenis']=="0") { 
$dur_tenis = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } else if($row['tenis']=="") { 
$dur_tenis = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } ?>
</div>
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($dur_tenis=="1") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','tenis','0');"><font style="color:#f00;font-weight:bold;"><?=getTranslation('ajaxspordallaripasifet')?></font></a>
<? } else if($dur_tenis=="0") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','tenis','1');"><font style="color:#0f8311;font-weight:bold;"><?=getTranslation('ajaxspordallariaktifet')?></font></a>
<? } ?>
</div>
</div>
</div>

<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 50%;float: left;margin-top: 7px;"><?=getTranslation('ajaxspordallarivoleybol')?></label>
<div class="input-group" style="width: 50%;float: right;">
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($row['voleybol']=="1") { 
$dur_voleybol = 1;
?>
<img src="players/img/akfpsf_1.png" alt="Durum" border="0">
<? } else if($row['voleybol']=="0") { 
$dur_voleybol = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } else if($row['voleybol']=="") { 
$dur_voleybol = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } ?>
</div>
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($dur_voleybol=="1") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','voleybol','0');"><font style="color:#f00;font-weight:bold;"><?=getTranslation('ajaxspordallaripasifet')?></font></a>
<? } else if($dur_voleybol=="0") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','voleybol','1');"><font style="color:#0f8311;font-weight:bold;"><?=getTranslation('ajaxspordallariaktifet')?></font></a>
<? } ?>
</div>
</div>
</div>

<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 50%;float: left;margin-top: 7px;"><?=getTranslation('ajaxspordallaribuzhokeyi')?></label>
<div class="input-group" style="width: 50%;float: right;">
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($row['buzhokeyi']=="1") { 
$dur_buzhokeyi = 1;
?>
<img src="players/img/akfpsf_1.png" alt="Durum" border="0">
<? } else if($row['buzhokeyi']=="0") { 
$dur_buzhokeyi = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } else if($row['buzhokeyi']=="") { 
$dur_buzhokeyi = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } ?>
</div>
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($dur_buzhokeyi=="1") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','buzhokeyi','0');"><font style="color:#f00;font-weight:bold;"><?=getTranslation('ajaxspordallaripasifet')?></font></a>
<? } else if($dur_buzhokeyi=="0") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','buzhokeyi','1');"><font style="color:#0f8311;font-weight:bold;"><?=getTranslation('ajaxspordallariaktifet')?></font></a>
<? } ?>
</div>
</div>
</div>

<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 50%;float: left;margin-top: 7px;"><?=getTranslation('yeniyerler_kasa179')?></label>
<div class="input-group" style="width: 50%;float: right;">
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($row['masatenis']=="1") { 
$dur_masatenis = 1;
?>
<img src="players/img/akfpsf_1.png" alt="Durum" border="0">
<? } else if($row['masatenis']=="0") { 
$dur_masatenis = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } else if($row['masatenis']=="") { 
$dur_masatenis = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } ?>
</div>
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($dur_masatenis=="1") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','masatenis','0');"><font style="color:#f00;font-weight:bold;"><?=getTranslation('ajaxspordallaripasifet')?></font></a>
<? } else if($dur_masatenis=="0") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','masatenis','1');"><font style="color:#0f8311;font-weight:bold;"><?=getTranslation('ajaxspordallariaktifet')?></font></a>
<? } ?>
</div>
</div>
</div>

<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 50%;float: left;margin-top: 7px;color: #1102f5;"><?=getTranslation('ajaxspordallaricanlibahisler')?> <br><font style="color:#f00;"><?=getTranslation('ajaxspordallaricanlibahisler1')?></font></label>
<div class="input-group" style="width: 50%;float: right;">
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($row['canlifutbol']=="1") { 
$dur_canlifutbol = 1;
?>
<img src="players/img/akfpsf_1.png" alt="Durum" border="0">
<? } else if($row['canlifutbol']=="0") { 
$dur_canlifutbol = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } else if($row['canlifutbol']=="") { 
$dur_canlifutbol = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } ?>
</div>
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($dur_canlifutbol=="1") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','canlifutbol','0');"><font style="color:#f00;font-weight:bold;"><?=getTranslation('ajaxspordallaripasifet')?></font></a>
<? } else if($dur_canlifutbol=="0") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','canlifutbol','1');"><font style="color:#0f8311;font-weight:bold;"><?=getTranslation('ajaxspordallariaktifet')?></font></a>
<? } ?>
</div>
</div>
</div>

<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 50%;float: left;margin-top: 7px;"><?=getTranslation('ajaxspordallaricanlibasketbol')?></label>
<div class="input-group" style="width: 50%;float: right;">
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($row['canlibasketbol']=="1") { 
$dur_canlibasketbol = 1;
?>
<img src="players/img/akfpsf_1.png" alt="Durum" border="0">
<? } else if($row['canlibasketbol']=="0") { 
$dur_canlibasketbol = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } else if($row['canlibasketbol']=="") { 
$dur_canlibasketbol = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } ?>
</div>
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($dur_canlibasketbol=="1") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','canlibasketbol','0');"><font style="color:#f00;font-weight:bold;"><?=getTranslation('ajaxspordallaripasifet')?></font></a>
<? } else if($dur_canlibasketbol=="0") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','canlibasketbol','1');"><font style="color:#0f8311;font-weight:bold;"><?=getTranslation('ajaxspordallariaktifet')?></font></a>
<? } ?>
</div>
</div>
</div>

<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 50%;float: left;margin-top: 7px;"><?=getTranslation('ajaxspordallaricanlitenis')?></label>
<div class="input-group" style="width: 50%;float: right;">
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($row['canlitenis']=="1") { 
$dur_canlitenis = 1;
?>
<img src="players/img/akfpsf_1.png" alt="Durum" border="0">
<? } else if($row['canlitenis']=="0") { 
$dur_canlitenis = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } else if($row['canlitenis']=="") { 
$dur_canlitenis = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } ?>
</div>
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($dur_canlitenis=="1") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','canlitenis','0');"><font style="color:#f00;font-weight:bold;"><?=getTranslation('ajaxspordallaripasifet')?></font></a>
<? } else if($dur_canlitenis=="0") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','canlitenis','1');"><font style="color:#0f8311;font-weight:bold;"><?=getTranslation('ajaxspordallariaktifet')?></font></a>
<? } ?>
</div>
</div>
</div>

<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 50%;float: left;margin-top: 7px;"><?=getTranslation('ajaxspordallaricanlivoleybol')?></label>
<div class="input-group" style="width: 50%;float: right;">
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($row['canlivoleybol']=="1") { 
$dur_canlivoleybol = 1;
?>
<img src="players/img/akfpsf_1.png" alt="Durum" border="0">
<? } else if($row['canlivoleybol']=="0") { 
$dur_canlivoleybol = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } else if($row['canlivoleybol']=="") { 
$dur_canlivoleybol = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } ?>
</div>
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($dur_canlivoleybol=="1") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','canlivoleybol','0');"><font style="color:#f00;font-weight:bold;"><?=getTranslation('ajaxspordallaripasifet')?></font></a>
<? } else if($dur_canlivoleybol=="0") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','canlivoleybol','1');"><font style="color:#0f8311;font-weight:bold;"><?=getTranslation('ajaxspordallariaktifet')?></font></a>
<? } ?>
</div>
</div>
</div>

<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 50%;float: left;margin-top: 7px;"><?=getTranslation('ajaxspordallaricanlibuzhokeyi')?></label>
<div class="input-group" style="width: 50%;float: right;">
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($row['canlibuzhokeyi']=="1") { 
$dur_canlibuzhokeyi = 1;
?>
<img src="players/img/akfpsf_1.png" alt="Durum" border="0">
<? } else if($row['canlibuzhokeyi']=="0") { 
$dur_canlibuzhokeyi = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } else if($row['canlibuzhokeyi']=="") { 
$dur_canlibuzhokeyi = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } ?>
</div>
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($dur_canlibuzhokeyi=="1") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','canlibuzhokeyi','0');"><font style="color:#f00;font-weight:bold;"><?=getTranslation('ajaxspordallaripasifet')?></font></a>
<? } else if($dur_canlibuzhokeyi=="0") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','canlibuzhokeyi','1');"><font style="color:#0f8311;font-weight:bold;"><?=getTranslation('ajaxspordallariaktifet')?></font></a>
<? } ?>
</div>
</div>
</div>

<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 50%;float: left;margin-top: 7px;"><?=getTranslation('yeniyerler_kasa180')?></label>
<div class="input-group" style="width: 50%;float: right;">
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($row['canlimasatenisi']=="1") { 
$dur_canlimasatenis = 1;
?>
<img src="players/img/akfpsf_1.png" alt="Durum" border="0">
<? } else if($row['canlimasatenisi']=="0") { 
$dur_canlimasatenis = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } else if($row['canlimasatenisi']=="") { 
$dur_canlimasatenis = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } ?>
</div>
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($dur_canlimasatenis=="1") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','canlimasatenisi','0');"><font style="color:#f00;font-weight:bold;"><?=getTranslation('ajaxspordallaripasifet')?></font></a>
<? } else if($dur_canlimasatenis=="0") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','canlimasatenisi','1');"><font style="color:#0f8311;font-weight:bold;"><?=getTranslation('ajaxspordallariaktifet')?></font></a>
<? } ?>
</div>
</div>
</div>





























<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 50%;float: left;margin-top: 7px;"><?=getTranslation('yeniyerler_kasa496')?></label>
<div class="input-group" style="width: 50%;float: right;">
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($row['sanal_futbolv2']=="1") { 
$dur_sanal_futbolv2 = 1;
?>
<img src="players/img/akfpsf_1.png" alt="Durum" border="0">
<? } else if($row['sanal_futbolv2']=="0") { 
$dur_sanal_futbolv2 = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } else if($row['sanal_futbolv2']=="") { 
$dur_sanal_futbolv2 = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } ?>
</div>
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($dur_sanal_futbolv2=="1") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','sanal_futbolv2','0');"><font style="color:#f00;font-weight:bold;"><?=getTranslation('ajaxspordallaripasifet')?></font></a>
<? } else if($dur_sanal_futbolv2=="0") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','sanal_futbolv2','1');"><font style="color:#0f8311;font-weight:bold;"><?=getTranslation('ajaxspordallariaktifet')?></font></a>
<? } ?>
</div>
</div>
</div>

<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 50%;float: left;margin-top: 7px;"><?=getTranslation('yeniyerler_kasa499')?></label>
<div class="input-group" style="width: 50%;float: right;">
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($row['sanal_futbol']=="1") { 
$dur_sanal_futbol = 1;
?>
<img src="players/img/akfpsf_1.png" alt="Durum" border="0">
<? } else if($row['sanal_futbol']=="0") { 
$dur_sanal_futbol = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } else if($row['sanal_futbol']=="") { 
$dur_sanal_futbol = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } ?>
</div>
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($dur_sanal_futbol=="1") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','sanal_futbol','0');"><font style="color:#f00;font-weight:bold;"><?=getTranslation('ajaxspordallaripasifet')?></font></a>
<? } else if($dur_sanal_futbol=="0") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','sanal_futbol','1');"><font style="color:#0f8311;font-weight:bold;"><?=getTranslation('ajaxspordallariaktifet')?></font></a>
<? } ?>
</div>
</div>
</div>

<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 50%;float: left;margin-top: 7px;"><?=getTranslation('yeniyerler_kasa500')?></label>
<div class="input-group" style="width: 50%;float: right;">
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($row['sanal_sampiyonlar']=="1") { 
$dur_sanal_sampiyonlar = 1;
?>
<img src="players/img/akfpsf_1.png" alt="Durum" border="0">
<? } else if($row['sanal_sampiyonlar']=="0") { 
$dur_sanal_sampiyonlar = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } else if($row['sanal_sampiyonlar']=="") { 
$dur_sanal_sampiyonlar = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } ?>
</div>
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($dur_sanal_sampiyonlar=="1") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','sanal_sampiyonlar','0');"><font style="color:#f00;font-weight:bold;"><?=getTranslation('ajaxspordallaripasifet')?></font></a>
<? } else if($dur_sanal_sampiyonlar=="0") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','sanal_sampiyonlar','1');"><font style="color:#0f8311;font-weight:bold;"><?=getTranslation('ajaxspordallariaktifet')?></font></a>
<? } ?>
</div>
</div>
</div>

<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 50%;float: left;margin-top: 7px;"><?=getTranslation('yeniyerler_kasa501')?></label>
<div class="input-group" style="width: 50%;float: right;">
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($row['sanal_dunya']=="1") { 
$dur_sanal_dunya = 1;
?>
<img src="players/img/akfpsf_1.png" alt="Durum" border="0">
<? } else if($row['sanal_dunya']=="0") { 
$dur_sanal_dunya = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } else if($row['sanal_dunya']=="") { 
$dur_sanal_dunya = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } ?>
</div>
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($dur_sanal_dunya=="1") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','sanal_dunya','0');"><font style="color:#f00;font-weight:bold;"><?=getTranslation('ajaxspordallaripasifet')?></font></a>
<? } else if($dur_sanal_dunya=="0") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','sanal_dunya','1');"><font style="color:#0f8311;font-weight:bold;"><?=getTranslation('ajaxspordallariaktifet')?></font></a>
<? } ?>
</div>
</div>
</div>

<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 50%;float: left;margin-top: 7px;"><?=getTranslation('yeniyerler_kasa502')?></label>
<div class="input-group" style="width: 50%;float: right;">
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($row['sanal_avrupa']=="1") { 
$dur_sanal_avrupa = 1;
?>
<img src="players/img/akfpsf_1.png" alt="Durum" border="0">
<? } else if($row['sanal_avrupa']=="0") { 
$dur_sanal_avrupa = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } else if($row['sanal_avrupa']=="") { 
$dur_sanal_avrupa = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } ?>
</div>
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($dur_sanal_avrupa=="1") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','sanal_avrupa','0');"><font style="color:#f00;font-weight:bold;"><?=getTranslation('ajaxspordallaripasifet')?></font></a>
<? } else if($dur_sanal_avrupa=="0") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','sanal_avrupa','1');"><font style="color:#0f8311;font-weight:bold;"><?=getTranslation('ajaxspordallariaktifet')?></font></a>
<? } ?>
</div>
</div>
</div>

<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 50%;float: left;margin-top: 7px;"><?=getTranslation('yeniyerler_kasa503')?></label>
<div class="input-group" style="width: 50%;float: right;">
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($row['sanal_basketbol']=="1") { 
$dur_sanal_basketbol = 1;
?>
<img src="players/img/akfpsf_1.png" alt="Durum" border="0">
<? } else if($row['sanal_basketbol']=="0") { 
$dur_sanal_basketbol = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } else if($row['sanal_basketbol']=="") { 
$dur_sanal_basketbol = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } ?>
</div>
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($dur_sanal_basketbol=="1") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','sanal_basketbol','0');"><font style="color:#f00;font-weight:bold;"><?=getTranslation('ajaxspordallaripasifet')?></font></a>
<? } else if($dur_sanal_basketbol=="0") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','sanal_basketbol','1');"><font style="color:#0f8311;font-weight:bold;"><?=getTranslation('ajaxspordallariaktifet')?></font></a>
<? } ?>
</div>
</div>
</div>

<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 50%;float: left;margin-top: 7px;"><?=getTranslation('yeniyerler_kasa504')?></label>
<div class="input-group" style="width: 50%;float: right;">
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($row['sanal_atyarisi']=="1") { 
$dur_sanal_atyarisi = 1;
?>
<img src="players/img/akfpsf_1.png" alt="Durum" border="0">
<? } else if($row['sanal_atyarisi']=="0") { 
$dur_sanal_atyarisi = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } else if($row['sanal_atyarisi']=="") { 
$dur_sanal_atyarisi = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } ?>
</div>
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($dur_sanal_atyarisi=="1") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','sanal_atyarisi','0');"><font style="color:#f00;font-weight:bold;"><?=getTranslation('ajaxspordallaripasifet')?></font></a>
<? } else if($dur_sanal_atyarisi=="0") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','sanal_atyarisi','1');"><font style="color:#0f8311;font-weight:bold;"><?=getTranslation('ajaxspordallariaktifet')?></font></a>
<? } ?>
</div>
</div>
</div>

<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 50%;float: left;margin-top: 7px;"><?=getTranslation('yeniyerler_kasa505')?></label>
<div class="input-group" style="width: 50%;float: right;">
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($row['sanal_kopek']=="1") { 
$dur_sanal_kopek = 1;
?>
<img src="players/img/akfpsf_1.png" alt="Durum" border="0">
<? } else if($row['sanal_kopek']=="0") { 
$dur_sanal_kopek = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } else if($row['sanal_kopek']=="") { 
$dur_sanal_kopek = 0;
?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } ?>
</div>
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($dur_sanal_kopek=="1") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','sanal_kopek','0');"><font style="color:#f00;font-weight:bold;"><?=getTranslation('ajaxspordallaripasifet')?></font></a>
<? } else if($dur_sanal_kopek=="0") { ?>
<a href="javascript:;" onClick="spordallaridurum('<?=$row['ayar_id']; ?>','sanal_kopek','1');"><font style="color:#0f8311;font-weight:bold;"><?=getTranslation('ajaxspordallariaktifet')?></font></a>
<? } ?>
</div>
</div>
</div>

<? } ?>

</div>
</div>
</div>
</div>
</div>
</div>

<? } ?>

<? }

if($a=="toplumbsdegis") {

$sportipi = gd("sportipi");

$mbs = gd("mbs");

if($sportipi=="sanalmbs"){
sed_sql_query("UPDATE sistemayar SET sanalmbs = '".$mbs."' WHERE ayar_id = '".$ub['id']."'");
} else if($sportipi=="futbolmbs"){
sed_sql_query("UPDATE sistemayar SET futbolmbs = '".$mbs."' WHERE ayar_id = '".$ub['id']."'");
} else if($sportipi=="basketmbs"){
sed_sql_query("UPDATE sistemayar SET basketmbs = '".$mbs."' WHERE ayar_id = '".$ub['id']."'");
} else if($sportipi=="tenismbs"){
sed_sql_query("UPDATE sistemayar SET tenismbs = '".$mbs."' WHERE ayar_id = '".$ub['id']."'");
} else if($sportipi=="voleybolmbs"){
sed_sql_query("UPDATE sistemayar SET voleybolmbs = '".$mbs."' WHERE ayar_id = '".$ub['id']."'");
} else if($sportipi=="buzhokeyimbs"){
sed_sql_query("UPDATE sistemayar SET buzhokeyimbs = '".$mbs."' WHERE ayar_id = '".$ub['id']."'");
} else if($sportipi=="masatenisimbs"){
sed_sql_query("UPDATE sistemayar SET masatenisimbs = '".$mbs."' WHERE ayar_id = '".$ub['id']."'");
} else if($sportipi=="beyzbolmbs"){
sed_sql_query("UPDATE sistemayar SET beyzbolmbs = '".$mbs."' WHERE ayar_id = '".$ub['id']."'");
} else if($sportipi=="rugbymbs"){
sed_sql_query("UPDATE sistemayar SET rugbymbs = '".$mbs."' WHERE ayar_id = '".$ub['id']."'");
} else if($sportipi=="dovusmbs"){
sed_sql_query("UPDATE sistemayar SET dovusmbs = '".$mbs."' WHERE ayar_id = '".$ub['id']."'");
} else if($sportipi=="canlifutbolmbs"){
sed_sql_query("UPDATE sistemayar SET canlifutbolmbs = '".$mbs."' WHERE ayar_id = '".$ub['id']."'");
} else if($sportipi=="canlibasketmbs"){
sed_sql_query("UPDATE sistemayar SET canlibasketmbs = '".$mbs."' WHERE ayar_id = '".$ub['id']."'");
} else if($sportipi=="canlitenismbs"){
sed_sql_query("UPDATE sistemayar SET canlitenismbs = '".$mbs."' WHERE ayar_id = '".$ub['id']."'");
} else if($sportipi=="canlivoleybolmbs"){
sed_sql_query("UPDATE sistemayar SET canlivoleybolmbs = '".$mbs."' WHERE ayar_id = '".$ub['id']."'");
} else if($sportipi=="canlibuzhokeyimbs"){
sed_sql_query("UPDATE sistemayar SET canlibuzhokeyimbs = '".$mbs."' WHERE ayar_id = '".$ub['id']."'");
} else if($sportipi=="canlimasatenisimbs"){
sed_sql_query("UPDATE sistemayar SET canlimasatenisimbs = '".$mbs."' WHERE ayar_id = '".$ub['id']."'");
}

}

if($a=="toplumbs") {

$sor = sed_sql_query("select * from sistemayar where ayar_id='".$ub['id']."'");

if(sed_sql_numrows($sor)<1) { ?>

<? } else { ?>

<script>

function asdes(order,as) {

$("#order").val(order);	

$("#ascdesc").val(as);

$("#suanval").val(1);

spordallari(<?=$id;?>);

}

function toplumbsdegis(sportipi,mbs,tip) {

var rand = Math.random();	

$.get('../ajax_superadmin.php?a=toplumbsdegis&sportipi='+sportipi+'&mbs='+mbs+'',function(data) { 
alert(''+tip+ ' <?=getTranslation('ajaxtoplumbs25')?> : ' +mbs+ ' <?=getTranslation('ajaxtoplumbs26')?>');
});

}

</script>

<div class="container-fluid mt-2">
<div class="row">
<div class="row">
<div class="col-sm-12">
<div class="card">
<div class="card-block">
<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 90%;float: left;margin-top: 7px;"><?=getTranslation('ajaxspordallari2')?></label>
<div class="input-group" style="width: 10%;float: right;"><div class="switch" style="float: left;text-align: left;"><?=getTranslation('ajaxtoplumbs5')?></div></div>
</div>

<?

while($row=sed_sql_fetcharray($sor)) {

?>


<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 90%;float: left;margin-top: 7px;"><?=getTranslation('ajaxtoplumbs6')?></label>
<div class="input-group" style="width: 10%;float: right;">
<div class="switch" style="float: left;text-align: left;">
<select class="inputCombo chosen" style="width: 100%;" id="sanalmbs" onchange="toplumbsdegis('sanalmbs',$(this).val(),'<?=getTranslation('ajaxtoplumbs6')?>');">
<option <? if($row['sanalmbs']=="1") { ?>selected<? } ?> value="1">1</option>
<option <? if($row['sanalmbs']=="2") { ?>selected<? } ?> value="2">2</option>
<option <? if($row['sanalmbs']=="3") { ?>selected<? } ?> value="3">3</option>
<option <? if($row['sanalmbs']=="4") { ?>selected<? } ?> value="4">4</option>
</select>
</div>
</div>
</div>

<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 90%;float: left;margin-top: 7px;"><?=getTranslation('ajaxtoplumbs7')?></label>
<div class="input-group" style="width: 10%;float: right;">
<div class="switch" style="float: left;text-align: left;">
<select class="inputCombo chosen" style="width: 100%;" id="futbolmbs" onchange="toplumbsdegis('futbolmbs',$(this).val(),'<?=getTranslation('ajaxtoplumbs7')?>');">
<option <? if($row['futbolmbs']=="1") { ?>selected<? } ?> value="1">1</option>
<option <? if($row['futbolmbs']=="2") { ?>selected<? } ?> value="2">2</option>
<option <? if($row['futbolmbs']=="3") { ?>selected<? } ?> value="3">3</option>
<option <? if($row['futbolmbs']=="4") { ?>selected<? } ?> value="4">4</option>
</select>
</div>
</div>
</div>

<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 90%;float: left;margin-top: 7px;"><?=getTranslation('ajaxtoplumbs8')?></label>
<div class="input-group" style="width: 10%;float: right;">
<div class="switch" style="float: left;text-align: left;">
<select class="inputCombo chosen" style="width: 100%;" id="basketmbs" onchange="toplumbsdegis('basketmbs',$(this).val(),'<?=getTranslation('ajaxtoplumbs8')?>');">
<option <? if($row['basketmbs']=="1") { ?>selected<? } ?> value="1">1</option>
<option <? if($row['basketmbs']=="2") { ?>selected<? } ?> value="2">2</option>
<option <? if($row['basketmbs']=="3") { ?>selected<? } ?> value="3">3</option>
<option <? if($row['basketmbs']=="4") { ?>selected<? } ?> value="4">4</option>
</select>
</div>
</div>
</div>

<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 90%;float: left;margin-top: 7px;"><?=getTranslation('ajaxtoplumbs9')?></label>
<div class="input-group" style="width: 10%;float: right;">
<div class="switch" style="float: left;text-align: left;">
<select class="inputCombo chosen" style="width: 100%;" id="tenismbs" onchange="toplumbsdegis('tenismbs',$(this).val(),'<?=getTranslation('ajaxtoplumbs9')?>');">
<option <? if($row['tenismbs']=="1") { ?>selected<? } ?> value="1">1</option>
<option <? if($row['tenismbs']=="2") { ?>selected<? } ?> value="2">2</option>
<option <? if($row['tenismbs']=="3") { ?>selected<? } ?> value="3">3</option>
<option <? if($row['tenismbs']=="4") { ?>selected<? } ?> value="4">4</option>
</select>
</div>
</div>
</div>

<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 90%;float: left;margin-top: 7px;"><?=getTranslation('ajaxtoplumbs10')?></label>
<div class="input-group" style="width: 10%;float: right;">
<div class="switch" style="float: left;text-align: left;">
<select class="inputCombo chosen" style="width: 100%;" id="voleybolmbs" onchange="toplumbsdegis('voleybolmbs',$(this).val(),'<?=getTranslation('ajaxtoplumbs10')?>');">
<option <? if($row['voleybolmbs']=="1") { ?>selected<? } ?> value="1">1</option>
<option <? if($row['voleybolmbs']=="2") { ?>selected<? } ?> value="2">2</option>
<option <? if($row['voleybolmbs']=="3") { ?>selected<? } ?> value="3">3</option>
<option <? if($row['voleybolmbs']=="4") { ?>selected<? } ?> value="4">4</option>
</select>
</div>
</div>
</div>

<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 90%;float: left;margin-top: 7px;"><?=getTranslation('ajaxtoplumbs11')?></label>
<div class="input-group" style="width: 10%;float: right;">
<div class="switch" style="float: left;text-align: left;">
<select class="inputCombo chosen" style="width: 100%;" id="buzhokeyimbs" onchange="toplumbsdegis('buzhokeyimbs',$(this).val(),'<?=getTranslation('ajaxtoplumbs11')?>');">
<option <? if($row['buzhokeyimbs']=="1") { ?>selected<? } ?> value="1">1</option>
<option <? if($row['buzhokeyimbs']=="2") { ?>selected<? } ?> value="2">2</option>
<option <? if($row['buzhokeyimbs']=="3") { ?>selected<? } ?> value="3">3</option>
<option <? if($row['buzhokeyimbs']=="4") { ?>selected<? } ?> value="4">4</option>
</select>
</div>
</div>
</div>

<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 90%;float: left;margin-top: 7px;"><?=getTranslation('yeniyerler_kasa179')?></label>
<div class="input-group" style="width: 10%;float: right;">
<div class="switch" style="float: left;text-align: left;">
<select class="inputCombo chosen" style="width: 100%;" id="masatenisimbs" onchange="toplumbsdegis('masatenisimbs',$(this).val(),'<?=getTranslation('ajaxtoplumbs12')?>');">
<option <? if($row['masatenisimbs']=="1") { ?>selected<? } ?> value="1">1</option>
<option <? if($row['masatenisimbs']=="2") { ?>selected<? } ?> value="2">2</option>
<option <? if($row['masatenisimbs']=="3") { ?>selected<? } ?> value="3">3</option>
<option <? if($row['masatenisimbs']=="4") { ?>selected<? } ?> value="4">4</option>
</select>
</div>
</div>
</div>

<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 90%;float: left;margin-top: 7px;"><?=getTranslation('yeniyerler_kasa197')?></label>
<div class="input-group" style="width: 10%;float: right;">
<div class="switch" style="float: left;text-align: left;">
<select class="inputCombo chosen" style="width: 100%;" id="beyzbolmbs" onchange="toplumbsdegis('beyzbolmbs',$(this).val(),'<?=getTranslation('ajaxtoplumbs12')?>');">
<option <? if($row['beyzbolmbs']=="1") { ?>selected<? } ?> value="1">1</option>
<option <? if($row['beyzbolmbs']=="2") { ?>selected<? } ?> value="2">2</option>
<option <? if($row['beyzbolmbs']=="3") { ?>selected<? } ?> value="3">3</option>
<option <? if($row['beyzbolmbs']=="4") { ?>selected<? } ?> value="4">4</option>
</select>
</div>
</div>
</div>

<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 90%;float: left;margin-top: 7px;"><?=getTranslation('yeniyerler_kasa198')?></label>
<div class="input-group" style="width: 10%;float: right;">
<div class="switch" style="float: left;text-align: left;">
<select class="inputCombo chosen" style="width: 100%;" id="rugbymbs" onchange="toplumbsdegis('rugbymbs',$(this).val(),'<?=getTranslation('ajaxtoplumbs12')?>');">
<option <? if($row['rugbymbs']=="1") { ?>selected<? } ?> value="1">1</option>
<option <? if($row['rugbymbs']=="2") { ?>selected<? } ?> value="2">2</option>
<option <? if($row['rugbymbs']=="3") { ?>selected<? } ?> value="3">3</option>
<option <? if($row['rugbymbs']=="4") { ?>selected<? } ?> value="4">4</option>
</select>
</div>
</div>
</div>

<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 90%;float: left;margin-top: 7px;"><?=getTranslation('yeniyerler_kasa199')?></label>
<div class="input-group" style="width: 10%;float: right;">
<div class="switch" style="float: left;text-align: left;">
<select class="inputCombo chosen" style="width: 100%;" id="dovusmbs" onchange="toplumbsdegis('dovusmbs',$(this).val(),'<?=getTranslation('ajaxtoplumbs12')?>');">
<option <? if($row['dovusmbs']=="1") { ?>selected<? } ?> value="1">1</option>
<option <? if($row['dovusmbs']=="2") { ?>selected<? } ?> value="2">2</option>
<option <? if($row['dovusmbs']=="3") { ?>selected<? } ?> value="3">3</option>
<option <? if($row['dovusmbs']=="4") { ?>selected<? } ?> value="4">4</option>
</select>
</div>
</div>
</div>

<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 90%;float: left;margin-top: 7px;"><?=getTranslation('ajaxtoplumbs13')?></label>
<div class="input-group" style="width: 10%;float: right;">
<div class="switch" style="float: left;text-align: left;">
<select class="inputCombo chosen" style="width: 100%;" id="canlifutbolmbs" onchange="toplumbsdegis('canlifutbolmbs',$(this).val(),'<?=getTranslation('ajaxtoplumbs13')?>');">
<option <? if($row['canlifutbolmbs']=="1") { ?>selected<? } ?> value="1">1</option>
<option <? if($row['canlifutbolmbs']=="2") { ?>selected<? } ?> value="2">2</option>
<option <? if($row['canlifutbolmbs']=="3") { ?>selected<? } ?> value="3">3</option>
<option <? if($row['canlifutbolmbs']=="4") { ?>selected<? } ?> value="4">4</option>
</select>
</div>
</div>
</div>

<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 90%;float: left;margin-top: 7px;"><?=getTranslation('ajaxtoplumbs14')?></label>
<div class="input-group" style="width: 10%;float: right;">
<div class="switch" style="float: left;text-align: left;">
<select class="inputCombo chosen" style="width: 100%;" id="canlibasketmbs" onchange="toplumbsdegis('canlibasketmbs',$(this).val(),'<?=getTranslation('ajaxtoplumbs14')?>');">
<option <? if($row['canlibasketmbs']=="1") { ?>selected<? } ?> value="1">1</option>
<option <? if($row['canlibasketmbs']=="2") { ?>selected<? } ?> value="2">2</option>
<option <? if($row['canlibasketmbs']=="3") { ?>selected<? } ?> value="3">3</option>
<option <? if($row['canlibasketmbs']=="4") { ?>selected<? } ?> value="4">4</option>
</select>
</div>
</div>
</div>

<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 90%;float: left;margin-top: 7px;"><?=getTranslation('ajaxtoplumbs15')?></label>
<div class="input-group" style="width: 10%;float: right;">
<div class="switch" style="float: left;text-align: left;">
<select class="inputCombo chosen" style="width: 100%;" id="canlitenismbs" onchange="toplumbsdegis('canlitenismbs',$(this).val(),'<?=getTranslation('ajaxtoplumbs15')?>');">
<option <? if($row['canlitenismbs']=="1") { ?>selected<? } ?> value="1">1</option>
<option <? if($row['canlitenismbs']=="2") { ?>selected<? } ?> value="2">2</option>
<option <? if($row['canlitenismbs']=="3") { ?>selected<? } ?> value="3">3</option>
<option <? if($row['canlitenismbs']=="4") { ?>selected<? } ?> value="4">4</option>
</select>
</div>
</div>
</div>

<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 90%;float: left;margin-top: 7px;"><?=getTranslation('ajaxtoplumbs16')?></label>
<div class="input-group" style="width: 10%;float: right;">
<div class="switch" style="float: left;text-align: left;">
<select class="inputCombo chosen" style="width: 100%;" id="canlivoleybolmbs" onchange="toplumbsdegis('canlivoleybolmbs',$(this).val(),'<?=getTranslation('ajaxtoplumbs16')?>');">
<option <? if($row['canlivoleybolmbs']=="1") { ?>selected<? } ?> value="1">1</option>
<option <? if($row['canlivoleybolmbs']=="2") { ?>selected<? } ?> value="2">2</option>
<option <? if($row['canlivoleybolmbs']=="3") { ?>selected<? } ?> value="3">3</option>
<option <? if($row['canlivoleybolmbs']=="4") { ?>selected<? } ?> value="4">4</option>
</select>
</div>
</div>
</div>

<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 90%;float: left;margin-top: 7px;"><?=getTranslation('ajaxtoplumbs17')?></label>
<div class="input-group" style="width: 10%;float: right;">
<div class="switch" style="float: left;text-align: left;">
<select class="inputCombo chosen" style="width: 100%;" id="canlibuzhokeyimbs" onchange="toplumbsdegis('canlibuzhokeyimbs',$(this).val(),'<?=getTranslation('ajaxtoplumbs17')?>');">
<option <? if($row['canlibuzhokeyimbs']=="1") { ?>selected<? } ?> value="1">1</option>
<option <? if($row['canlibuzhokeyimbs']=="2") { ?>selected<? } ?> value="2">2</option>
<option <? if($row['canlibuzhokeyimbs']=="3") { ?>selected<? } ?> value="3">3</option>
<option <? if($row['canlibuzhokeyimbs']=="4") { ?>selected<? } ?> value="4">4</option>
</select>
</div>
</div>
</div>

<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 90%;float: left;margin-top: 7px;"><?=getTranslation('yeniyerler_kasa180')?></label>
<div class="input-group" style="width: 10%;float: right;">
<div class="switch" style="float: left;text-align: left;">
<select class="inputCombo chosen" style="width: 100%;" id="canlimasatenisimbs" onchange="toplumbsdegis('canlimasatenisimbs',$(this).val(),'<?=getTranslation('ajaxtoplumbs18')?>');">
<option <? if($row['canlimasatenisimbs']=="1") { ?>selected<? } ?> value="1">1</option>
<option <? if($row['canlimasatenisimbs']=="2") { ?>selected<? } ?> value="2">2</option>
<option <? if($row['canlimasatenisimbs']=="3") { ?>selected<? } ?> value="3">3</option>
<option <? if($row['canlimasatenisimbs']=="4") { ?>selected<? } ?> value="4">4</option>
</select>
</div>
</div>
</div>

<? } ?>

<? } ?>

</div>
</div>
</div>
</div>
</div>
</div>

<? }

if($a=="mbsdegis") {

$id = gd("id");

$sportipi = gd("sportipi");

$mbs = gd("mbs");

## FUTBOL ##

if($sportipi=="futbol" && $mbs == 1){
sed_sql_query("delete from maclar_mbs where spor_tipi='futbol' and mac_id='".$id."' and bayi_id='".$ub['id']."'");
} else if($sportipi=="futbol"){

$farray2 = bilgi("SELECT mac_id, mbs FROM maclar_mbs WHERE spor_tipi='futbol' AND mac_id = '".$id."' AND bayi_id = '".$ub['id']."' AND mbs != '1'");

if($farray2['mac_id'] < 1){
sed_sql_query("INSERT INTO maclar_mbs SET spor_tipi='futbol', mac_id = '".$id."', bayi_id = '".$ub['id']."', mbs = '".$mbs."'");
}else{
sed_sql_query("UPDATE maclar_mbs SET mbs = '".$mbs."' WHERE mac_id = '".$id."' AND bayi_id = '".$ub['id']."' AND spor_tipi='futbol'");
}

}

## FUTBOL ##

## BASKETBOL ##

else if($sportipi=="basketbol" && $mbs == 1){
sed_sql_query("delete from maclar_mbs where spor_tipi='basketbol' and mac_id='".$id."' and bayi_id='".$ub['id']."'");
} else if($sportipi=="basketbol"){

$farray2 = bilgi("SELECT mac_id, mbs FROM maclar_mbs WHERE spor_tipi='basketbol' AND mac_id = '".$id."' AND bayi_id = '".$ub['id']."' AND mbs != '1'");

if($farray2['mac_id'] < 1){
sed_sql_query("INSERT INTO maclar_mbs SET spor_tipi='basketbol', mac_id = '".$id."', bayi_id = '".$ub['id']."', mbs = '".$mbs."'");
}else{
sed_sql_query("UPDATE maclar_mbs SET mbs = '".$mbs."' WHERE mac_id = '".$id."' AND bayi_id = '".$ub['id']."' AND spor_tipi='basketbol'");
}

}

## BASKETBOL ##

}

if($a=="sistemayaryetkidegis") {

$id = gd("id");
$yetki = gd("yetki");
sed_sql_query("update sistemayar set ayarkullan='$yetki' where ayar_id='$id'");

}

if($a=="kullanicikuponyetkidegis") {

$id = gd("id");
$yetki = gd("yetki");
sed_sql_query("update kullanici set kupon_yetki='$yetki' where id='$id'");

}

if($a=="kullanicicasinoyetkidegis") {

$id = gd("id");
$yetki = gd("yetki");
sed_sql_query("update kullanici set casino_yetki='$yetki' where id='$id'");
sed_sql_query("update sistemayar set casino_yetki='$yetki' where ayar_id='$id'");

}

if($a=="durumdegis_bahisler") {

$id = gd("id");

$sportipi = gd("sportipi");

$durum = gd("durum");

if($sportipi=="futbol" && $durum == 1){
sed_sql_query("delete from maclar_durum where spor_tipi='futbol' and mac_id='".$id."' and bayi_id='".$ub['id']."'");
} else if($sportipi=="futbol" && $durum == 0){
sed_sql_query("INSERT INTO maclar_durum SET spor_tipi='futbol', mac_id = '".$id."', bayi_id = '".$ub['id']."', durum = '0'");
} else if($sportipi=="basketbol" && $durum == 1){
sed_sql_query("delete from maclar_durum where spor_tipi='basketbol' and mac_id='".$id."' and bayi_id='".$ub['id']."'");
} else if($sportipi=="basketbol" && $durum == 0){
sed_sql_query("INSERT INTO maclar_durum SET spor_tipi='basketbol', mac_id = '".$id."', bayi_id = '".$ub['id']."', durum = '0'");
}

}

if($a=="bahisler") {

$spor_tip = gd("spor_tip");
$lig = gd('lig');
$pageper = 50;

if($lig!='0'){
	$lig_ekle = "AND kupa_isim='".$lig."'";
} else {
	$lig_ekle = "";
}

$gelen_sayfa = (isset($_GET['sayfa']) && $_GET['sayfa'] !='' ) ? intval($_GET['sayfa']) : 1;

//Sayfada kaç kayıt görünecek
$limit = $pageper;

//Kaç sayfa öncesi ve sonrası görünecek
$s_s = 10;

/*------------------------------------
Alan Başlıklarını ve $sonuc['alan1'] 
kısımlarını kendinize göre değiştirin
-------------------------------------*/

if($spor_tip==1){
$s_sor = sed_sql_query("select count(id) from program_futbol where id!=''") or trigger_error(sed_sql_error(),E_USER_ERROR);
} else if($spor_tip==2){
$s_sor = sed_sql_query("select count(id) from program_basketbol where id!=''") or trigger_error(sed_sql_error(),E_USER_ERROR);
} else if($spor_tip==3){
$s_sor = sed_sql_query("select count(id) from program_tenis where id!=''") or trigger_error(sed_sql_error(),E_USER_ERROR);
}

$satir = sed_sql_result($s_sor,0);

sed_sql_freeresult($s_sor);

if($satir >0){ //sonuç varsa

$baslama = ($gelen_sayfa > 1) ? (($gelen_sayfa -1) * $limit) : 0 ;

$sayfa_kac = $satir/$limit;

$sayfa_sayisi = ($satir % $limit != 0) ? intval($sayfa_kac)+1 : intval($sayfa_kac);

$basla=( $satir >= $baslama ) ? $baslama : 0 ;

unset( $sayfa_kac, $baslama );

if($spor_tip==1){
$sor = sed_sql_query("select * from program_futbol where id!='' $lig_ekle limit $basla,$limit");
$sor2 = sed_sql_query("select * from program_futbol where id!='' group by ulkeadi");
$spor_tipi_secim = "program_futbol";
} else if($spor_tip==2){
$sor = sed_sql_query("select * from program_basketbol where id!='' $lig_ekle limit $basla,$limit");
$sor2 = sed_sql_query("select * from program_basketbol where id!=''  group by ulkeadi");
$spor_tipi_secim = "program_basketbol";
} else if($spor_tip==3){
$sor = sed_sql_query("select * from program_tenis where id!='' $lig_ekle limit $basla,$limit");
$sor2 = sed_sql_query("select * from program_tenis where id!=''  group by ulkeadi");
$spor_tipi_secim = "program_tenis";
}

$i=1;

$style='';

if(sed_sql_numrows($sor)<1) { ?>

<table class="tablesorter">
<thead>
<tr>
<th colspan="6"><?=getTranslation('ajaxbahisler1')?></th>
</tr>
</thead>
<tbody>
<tr>
<td width="100"><?=getTranslation('ajaxbahisler2')?></td>
<td>
<select class="inputCombo" style="width:120px;" name="spid" onchange="bahisler($(this).val(),'0','1');">
<option value=""><?=getTranslation('ajaxbahisler3')?></option>
<option <? if($spor_tip==1){ ?>selected="selected" <? } ?> value="1"><?=getTranslation('ajaxbahisler4')?></option>
<option <? if($spor_tip==2){ ?>selected="selected" <? } ?> value="2"><?=getTranslation('ajaxbahisler5')?></option>
<option <? if($spor_tip==3){ ?>selected="selected" <? } ?> value="3"><?=getTranslation('tenis')?></option>
</select>
</td>
</tr>
</tbody>
</table>

<? } else { ?>

<style>
span.sport-icon-big {
	width: 24px;
	display: inline-block;
	padding: 0px;
	height: 24px;
	vertical-align: text-top;
	background: url('players/img/icon-sprite-sb.13.png') -18px -1px no-repeat;
}
.sport-icon-big.soccer { background-position: -18px -526px; }
.sport-icon-big.basketball {background-position: -18px -151px;}
</style>

<script>

function asdes(order,as) {

$("#order").val(order);	

$("#ascdesc").val(as);

$("#suanval").val(1);

bahisler(<?=$spor_tip;?>);

}

function mbsdegis(id,sportipi,mbs) {

var rand = Math.random();	

$.get('../ajax_superadmin.php?a=mbsdegis&id='+id+'&sportipi='+sportipi+'&mbs='+mbs+'',function(data) { alert("<?=getTranslation('yeniyerler_kasa184')?> : "+mbs+" <?=getTranslation('yeniyerler_kasa185')?>."); });

}

function durumdegis_bahisler(id,sportipi,durum) {

var rand = Math.random();

$.get('../ajax_superadmin.php?a=durumdegis_bahisler&id='+id+'&sportipi='+sportipi+'&durum='+durum+'',function(data) { 

if(durum==1){
	$("#aktif_pasif_buton_"+id).html('<a style="font-weight: bold;color: #f00;" href="javascript:;" onclick="durumdegis_bahisler(\''+id+'\',\''+sportipi+'\',\'0\');">Pasif Et</a>');
	$("#aktif_pasif_resim_"+id).html('<img src="players/img/bahisler/status_1.png" alt="Aktif" border="0">');
	alert("<?=getTranslation('yeniyerler_kasa186')?>");
} else if(durum==0){
	$("#aktif_pasif_buton_"+id).html('<a style="font-weight: bold;color: #0e8c06;" href="javascript:;" onclick="durumdegis_bahisler(\''+id+'\',\''+sportipi+'\',\'1\');">Aktif Et</a>');
	$("#aktif_pasif_resim_"+id).html('<img src="players/img/bahisler/status_2.png" alt="Pasif" border="0">');
	alert("<?=getTranslation('yeniyerler_kasa187')?>");
}



});

}

</script>

<div class="container-fluid mt-2">
<div class="row">
<div class="row">
<div class="col-sm-12">
<div class="card">


<div class="card-header"><font style="float: left;margin-top: 7px;margin-right: 7px;"><?=getTranslation('ajaxbahisler2')?></font>

<select style="float: left;width:12%;" class="form-control" name="spid" onchange="bahisler($(this).val(),'0','1');">
<option value=""><?=getTranslation('ajaxbahisler3')?></option>
<option <? if($spor_tip==1){ ?>selected="selected" <? } ?> value="1"><?=getTranslation('ajaxbahisler4')?></option>
<option <? if($spor_tip==2){ ?>selected="selected" <? } ?> value="2"><?=getTranslation('ajaxbahisler5')?></option>
<option <? if($spor_tip==3){ ?>selected="selected" <? } ?> value="3"><?=getTranslation('tenis')?></option>
</select>

<font style="float: left;margin-top: 7px;margin-right: 7px;margin-left: 7px;"><?=getTranslation('ajaxbahisler6')?></font>

<select style="float: left;width:60%;" class="form-control" name="lid" onchange="bahisler('<?=$spor_tip;?>',$(this).val());">
<option value="0"><?=getTranslation('ajaxbahisler7')?></option>
<? 
while($rows2=sed_sql_fetcharray($sor2)) { 
$toplams = bilgi("SELECT COUNT(CASE WHEN id!='' THEN id END) as toplam_bulunan_mac FROM $spor_tipi_secim WHERE kupa_isim='".$rows2['kupa_isim']."'");
?>
<option <? if($lig==$rows2['kupa_isim']){ ?>selected="selected" <? } ?> value="<?=$rows2['kupa_isim'];?>"><?=$rows2['kupa_ulke'];?>-<?=$rows2['kupa_isim'];?> (<?=$toplams['toplam_bulunan_mac'];?>)</option>
<? } ?>
</select>

</div>

<div class="card-block p-0">
<div class="table-responsive">
<table class="table table-striped mb-0">
<thead>
<tr>
<th style="width: 5%">#</th>
<th style="width: 30%"><?=getTranslation('kuponkuponbahis')?></th>
<th style="width: 5%;text-align:center;"><?=getTranslation('exportmbs')?></th>
<th style="width: 10%;text-align:center;"><?=getTranslation('printkupon10')?></th>
<th colspan="2" style="width: 10%;text-align:center;"><?=getTranslation('superadmin40')?></th>
<th style="width: 5%;text-align:center;"><?=getTranslation('ajaxkupondegisim5')?></th>
</tr>


<?

while($row=sed_sql_fetcharray($sor)) {

if($spor_tip==1){
$bilgisi_getir = bilgi("select * from maclar_mbs where spor_tipi='futbol' and mac_id='".$row['id']."' and bayi_id='".$ub['id']."'");
$bilgisi_getir_durum = bilgi("select * from maclar_durum where spor_tipi='futbol' and mac_id='".$row['id']."' and bayi_id='".$ub['id']."'");
$spor_tipi_ver = "futbol";
} else if($spor_tip==2){
$bilgisi_getir = bilgi("select * from maclar_mbs where spor_tipi='basketbol' and mac_id='".$row['id']."' and bayi_id='".$ub['id']."'");
$bilgisi_getir_durum = bilgi("select * from maclar_durum where spor_tipi='basketbol' and mac_id='".$row['id']."' and bayi_id='".$ub['id']."'");
$spor_tipi_ver = "basketbol";
} else if($spor_tip==3){
$bilgisi_getir = bilgi("select * from maclar_mbs where spor_tipi='tenis' and mac_id='".$row['id']."' and bayi_id='".$ub['id']."'");
$bilgisi_getir_durum = bilgi("select * from maclar_durum where spor_tipi='tenis' and mac_id='".$row['id']."' and bayi_id='".$ub['id']."'");
$spor_tipi_ver = "tenis";
}

if($bilgisi_getir['id']>0) { $bilgisini_ver = $bilgisi_getir['mbs']; } else { $bilgisini_ver = $row['mbs']; }
if($bilgisi_getir_durum['id']>0) { $bilgisini_ver_durum = $bilgisi_getir_durum['durum']; } else { $bilgisini_ver_durum = 1; }
?>

<tr>

<td><?=$row['mac_kodu'];?></td>

<td><?=$row['ev_takim'];?>-<?=$row['konuk_takim'];?></td>

<td style="text-align:center;">
<select class="inputCombo" onchange="mbsdegis('<?=$row['id'];?>','<?=$spor_tipi_ver;?>',$(this).val());">
<option value="1" <? if($bilgisini_ver==1){ ?>selected="selected" <? } ?>>1</option>
<option value="2" <? if($bilgisini_ver==2){ ?>selected="selected" <? } ?>>2</option>
<option value="3" <? if($bilgisini_ver==3){ ?>selected="selected" <? } ?>>3</option>
<option value="4" <? if($bilgisini_ver==4){ ?>selected="selected" <? } ?>>4</option>
</select>
</td>

<td style="text-align:center;"><? echo date("d-m H:i",$row['mac_time']);?></td>

<td style="text-align:center;" id="aktif_pasif_resim_<?=$row['id'];?>">
<? if($bilgisini_ver_durum==1){ ?>
<img src="players/img/bahisler/status_1.png" alt="Aktif" border="0">
<? } else { ?>
<img src="players/img/bahisler/status_2.png" alt="Pasif" border="0">
<? } ?>
</td>

<td style="text-align:center;" id="aktif_pasif_buton_<?=$row['id'];?>">
<? if($bilgisini_ver_durum==1){ ?>
<a style="font-weight: bold;color: #f00;" href="javascript:;" onclick="durumdegis_bahisler('<?=$row['id'];?>','<?=$spor_tipi_ver;?>','0');"><?=getTranslation('ajaxspordallaripasifet')?></a>
<? } else { ?>
<a style="font-weight: bold;color: #0e8c06;" href="javascript:;" onclick="durumdegis_bahisler('<?=$row['id'];?>','<?=$spor_tipi_ver;?>','1');"><?=getTranslation('ajaxspordallariaktifet')?></a>
<? } ?>
</td>

<td style="text-align:center;">
<a class="grid" href="bahisler_<?=$spor_tipi_ver;?>.php?spor_tip=<?=$spor_tipi_ver;?>&id=<?=$row['id'];?>" title="<?=getTranslation('ajaxbahisler23')?>">
<img src="players/img/bahisler/refresh.png" alt="<?=getTranslation('ajaxbahisler23')?>" border="0">
</a>
</td>

</tr>

<? } ?>

</tbody>

<tfoot>

<? $style = ($style=='') ? '2' : '';
$i++;

} ?>

<? 
		$hangi_sayfa= ($gelen_sayfa > 0)? $gelen_sayfa : 1 ;
		echo '<tr><td colspan="9" class="text-xs-center">';	
	
	
			$alt= ($gelen_sayfa - $s_s);
			if($sayfa_sayisi <= $s_s || $gelen_sayfa <= $s_s ) {$alt=1;} 
			$ust= (($gelen_sayfa + $s_s)< $sayfa_sayisi ) ? ($gelen_sayfa + $s_s) : ($sayfa_sayisi);	
			echo ($gelen_sayfa > 1 )? '<a style="margin: 0px 2px !important;" class="btn btn-info m-0" href="javascript:;" onclick="bahisler('.$spor_tip.',0,1);" id="sayfaveri">'.getTranslation('ajaxtumkuponlarim30').'</a><a style="margin: 0px 2px !important;" class="btn btn-info m-0" href="javascript:;" id="sayfaveri" onclick="bahisler('.$spor_tip.',0,'.($gelen_sayfa -1).');">« '.getTranslation('ajaxtumkuponlarim31').'</a>':' ';
			for($i=$alt; $i<=$ust ;$i++){		
				echo ($i != $gelen_sayfa ) ? '<a style="margin: 0px 2px !important;" class="btn btn-info m-0" href="javascript:;" id="sayfaveri" onclick="bahisler('.$spor_tip.',0,'.$i.');">'.$i.'</a>' : '<span class="btn btn-info m-0" style="margin: 0px 2px !important;background-color: #11c540;border-color: #11c540;">'.$i.'</span>';
				}
			echo ($gelen_sayfa < $sayfa_sayisi)? '<a style="margin: 0px 2px !important;" class="btn btn-info m-0" href="javascript:;" id="sayfaveri" onclick="bahisler('.$spor_tip.',0,'.($gelen_sayfa +1).');">'.getTranslation('ajaxtumkuponlarim32').' »</a><a style="margin: 0px 2px !important;" class="btn btn-info m-0" href="javascript:;" id="sayfaveri" onclick="bahisler('.$spor_tip.',0,'.$sayfa_sayisi.');">'.getTranslation('ajaxtumkuponlarim33').'</a>' :'';
			echo '</td></tr>';
?>

<? } else { ?>

<div class="container-fluid mt-2">
<div class="row">
<div class="row">
<div class="col-sm-12">
<div class="card">

<div class="card-header"><font style="float: left;margin-top: 7px;margin-right: 7px;"><?=getTranslation('ajaxbahisler2')?></font>
<select style="float: left;width:60%;" class="form-control" name="spid" onchange="bahisler($(this).val(),'0','1');">
<option value=""><?=getTranslation('ajaxbahisler3')?></option>
<option <? if($spor_tip==1){ ?>selected="selected" <? } ?> value="1"><?=getTranslation('ajaxbahisler4')?></option>
<option <? if($spor_tip==2){ ?>selected="selected" <? } ?> value="2"><?=getTranslation('ajaxbahisler5')?></option>
<option <? if($spor_tip==3){ ?>selected="selected" <? } ?> value="3"><?=getTranslation('tenis')?></option>
</select>

</div>

</div>
</div>
</div>
</div>
</div>

<? } ?>

</tfoot>

<? }

if($a=="oyunlari_degis_normal") {

$tip_isim = gd("tip_isim");

$oran_tip_id = gd("oran_tip_id");

$durum = gd("durum");

$spor_tipi = gd("spor_tipi");

if($spor_tipi=="futbol" && $durum == 1){
sed_sql_query("delete from oyunlar_normal where spor_tipi='futbol' and tip_isim='".$tip_isim."' and oran_tip_id='".$oran_tip_id."' and bayi_id='".$ub['id']."'");
} else if($spor_tipi=="futbol" && $durum == 0){
sed_sql_query("INSERT INTO oyunlar_normal SET spor_tipi='futbol', tip_isim = '".$tip_isim."', oran_tip_id = '".$oran_tip_id."', bayi_id = '".$ub['id']."', status = '1'");
} else if($spor_tipi=="basketbol" && $durum == 1){
sed_sql_query("delete from oyunlar_normal where spor_tipi='basketbol' and tip_isim='".$tip_isim."' and oran_tip_id='".$oran_tip_id."' and bayi_id='".$ub['id']."'");
} else if($spor_tipi=="basketbol" && $durum == 0){
sed_sql_query("INSERT INTO oyunlar_normal SET spor_tipi='basketbol', tip_isim = '".$tip_isim."', oran_tip_id = '".$oran_tip_id."', bayi_id = '".$ub['id']."', status = '1'");
} else if($spor_tipi=="tenis" && $durum == 1){
sed_sql_query("delete from oyunlar_normal where spor_tipi='tenis' and tip_isim='".$tip_isim."' and oran_tip_id='".$oran_tip_id."' and bayi_id='".$ub['id']."'");
} else if($spor_tipi=="tenis" && $durum == 0){
sed_sql_query("INSERT INTO oyunlar_normal SET spor_tipi='tenis', tip_isim = '".$tip_isim."', oran_tip_id = '".$oran_tip_id."', bayi_id = '".$ub['id']."', status = '1'");
} else if($spor_tipi=="voleybol" && $durum == 1){
sed_sql_query("delete from oyunlar_normal where spor_tipi='voleybol' and tip_isim='".$tip_isim."' and oran_tip_id='".$oran_tip_id."' and bayi_id='".$ub['id']."'");
} else if($spor_tipi=="voleybol" && $durum == 0){
sed_sql_query("INSERT INTO oyunlar_normal SET spor_tipi='voleybol', tip_isim = '".$tip_isim."', oran_tip_id = '".$oran_tip_id."', bayi_id = '".$ub['id']."', status = '1'");
} else if($spor_tipi=="buzhokeyi" && $durum == 1){
sed_sql_query("delete from oyunlar_normal where spor_tipi='buzhokeyi' and tip_isim='".$tip_isim."' and oran_tip_id='".$oran_tip_id."' and bayi_id='".$ub['id']."'");
} else if($spor_tipi=="buzhokeyi" && $durum == 0){
sed_sql_query("INSERT INTO oyunlar_normal SET spor_tipi='buzhokeyi', tip_isim = '".$tip_isim."', oran_tip_id = '".$oran_tip_id."', bayi_id = '".$ub['id']."', status = '1'");
} else if($spor_tipi=="hentbol" && $durum == 1){
sed_sql_query("delete from oyunlar_normal where spor_tipi='hentbol' and tip_isim='".$tip_isim."' and oran_tip_id='".$oran_tip_id."' and bayi_id='".$ub['id']."'");
} else if($spor_tipi=="hentbol" && $durum == 0){
sed_sql_query("INSERT INTO oyunlar_normal SET spor_tipi='hentbol', tip_isim = '".$tip_isim."', oran_tip_id = '".$oran_tip_id."', bayi_id = '".$ub['id']."', status = '1'");
}

}

if($a=="oyunlari_degis_canli") {

$tip_isim = gd("tip_isim");

$durum = gd("durum");

$spor_tipi = gd("spor_tipi");

if($spor_tipi=="futbol" && $durum == 1){
sed_sql_query("delete from oyunlar_canli where spor_tipi='futbol' and tip_isim='".$tip_isim."' and bayi_id='".$ub['id']."'");
} else if($spor_tipi=="futbol" && $durum == 0){
sed_sql_query("INSERT INTO oyunlar_canli SET spor_tipi='futbol', tip_isim = '".$tip_isim."', bayi_id = '".$ub['id']."', status = '1'");
} else if($spor_tipi=="basketbol" && $durum == 1){
sed_sql_query("delete from oyunlar_canli where spor_tipi='basketbol' and tip_isim='".$tip_isim."' and bayi_id='".$ub['id']."'");
} else if($spor_tipi=="basketbol" && $durum == 0){
sed_sql_query("INSERT INTO oyunlar_canli SET spor_tipi='basketbol', tip_isim = '".$tip_isim."', bayi_id = '".$ub['id']."', status = '1'");
} else if($spor_tipi=="tenis" && $durum == 1){
sed_sql_query("delete from oyunlar_canli where spor_tipi='tenis' and tip_isim='".$tip_isim."' and bayi_id='".$ub['id']."'");
} else if($spor_tipi=="tenis" && $durum == 0){
sed_sql_query("INSERT INTO oyunlar_canli SET spor_tipi='tenis', tip_isim = '".$tip_isim."', bayi_id = '".$ub['id']."', status = '1'");
} else if($spor_tipi=="voleybol" && $durum == 1){
sed_sql_query("delete from oyunlar_canli where spor_tipi='voleybol' and tip_isim='".$tip_isim."' and bayi_id='".$ub['id']."'");
} else if($spor_tipi=="voleybol" && $durum == 0){
sed_sql_query("INSERT INTO oyunlar_canli SET spor_tipi='voleybol', tip_isim = '".$tip_isim."', bayi_id = '".$ub['id']."', status = '1'");
} else if($spor_tipi=="buzhokeyi" && $durum == 1){
sed_sql_query("delete from oyunlar_canli where spor_tipi='buzhokeyi' and tip_isim='".$tip_isim."' and bayi_id='".$ub['id']."'");
} else if($spor_tipi=="buzhokeyi" && $durum == 0){
sed_sql_query("INSERT INTO oyunlar_canli SET spor_tipi='buzhokeyi', tip_isim = '".$tip_isim."', bayi_id = '".$ub['id']."', status = '1'");
} else if($spor_tipi=="masatenisi" && $durum == 1){
sed_sql_query("delete from oyunlar_canli where spor_tipi='masatenis' and tip_isim='".$tip_isim."' and bayi_id='".$ub['id']."'");
} else if($spor_tipi=="masatenisi" && $durum == 0){
sed_sql_query("INSERT INTO oyunlar_canli SET spor_tipi='masatenis', tip_isim = '".$tip_isim."', bayi_id = '".$ub['id']."', status = '1'");
}

}

if($a=="oyun_turleri_canli") {

$oyuntip = gd("tip");

if($oyuntip==1){

$orderle = "FIELD(varoname, '1X2', 'Handikap 1:0', 'Handikap 2:0', 'Handikap 0:1', 'Handikap 0:2', 'Çifte Şans', '1.Yarı Çifte Şans', '1.Yarı Sonucu', '1.Yarı 0.5 Gol Alt Üst', '1.Yarı 1.5 Gol Alt Üst', '1.Yarı 2.5 Gol Alt Üst', 'Toplam 0.5 Gol Alt Üst', 'Toplam 1.5 Gol Alt Üst', 'Toplam 2.5 Gol Alt Üst', 'Toplam 3.5 Gol Alt Üst', 'Toplam 4.5 Gol Alt Üst', 'Toplam 5.5 Gol Alt Üst', '2.Yarı 0.5 Gol Alt Üst', '2.Yarı 1.5 Gol Alt Üst', '2.Yarı 2.5 Gol Alt Üst', '2.Yarı 3.5 Gol Alt Üst', '1.Yarı Karşılıklı Gol', 'Karşılıklı Gol Olurmu ?', 'Ev Sahibi Müsabakada Gol Atarmı ?', 'Deplasman Müsabakada Gol Atarmı ?', 'Toplam Gol Tek / Çift', '1.Yarı Tek / Çift', 'Ev Sahibi 0.5 Gol Alt Üst', 'Ev Sahibi 1.5 Gol Alt Üst', 'Ev Sahibi 2.5 Gol Alt Üst', 'Deplasman 0.5 Gol Alt Üst', 'Deplasman 1.5 Gol Alt Üst', 'Deplasman 2.5 Gol Alt Üst', 'İlk yarıda 1.golü hangi takım atar?', '1. yarıda 1.golü hangi takım atar?', '1. yarıda 2.golü hangi takım atar?', '1.golü hangi takım atar?', '2.golü hangi takım atar?', '3.golü hangi takım atar?', '4.golü hangi takım atar?', '5.golü hangi takım atar?', '6.golü hangi takım atar?', 'Toplam Kaç Gol Atılır ?', 'Ev Sahibi Toplam Kaç Gol Atar ?', 'Deplasman Toplam Kaç Gol Atar ?', 'Ev Sahibi 1.Yarı 0.5 Gol Alt Üst', 'Ev Sahibi 1.Yarı 1.5 Gol Alt Üst', 'Ev Sahibi 1.Yarı 2.5 Gol Alt Üst', 'Deplasman 1.Yarı 0.5 Gol Alt Üst', 'Deplasman 1.Yarı 1.5 Gol Alt Üst', 'Deplasman 1.Yarı 2.5 Gol Alt Üst', 'Maç Sonucu ve Karşılıklı Gol', 'İlk Yarıda Kaç Gol Olur ?', 'Ev Sahibi İlk Yarı Tam Gol Sayısı', 'Ev sahibi İkinci Yarı Tam Gol Sayısı', 'Deplasman İlk Yarı Tam Gol Sayısı', 'Deplasman İkinci Yarı Tam Gol Sayısı', '2.Yarıda Toplam Kaç Gol Olur ?', 'Herhangi Bir Takım 1 Gol Farkla Kazanirmi ?', 'Herhangi Bir Takım 2 Gol Farkla Kazanirmi ?', 'Herhangi Bir Takım 3 Gol Farkla Kazanirmi ?', '2.Yarı Sonucu', 'Müsabakada kaç gol atılır? (0-4+)', 'Müsabakada kaç gol atılır? (0-5+)', 'Müsabakada kaç gol atılır? (0-6+)', '1.Yarı Skoru', 'Maç Skoru', 'Toplam Sarı Kart 1.5 Alt/Üst', 'Toplam Sarı Kart 2.5 Alt/Üst', 'Toplam Sarı Kart 3.5 Alt/Üst', 'Toplam Sarı Kart 4.5 Alt/Üst', 'Kirmizi kart cikar mi?', 'Kaç Penaltı Olur ?', '1.Takım Toplam Sarı Kart 1.5 Alt/Üst', '1.Takım Toplam Sarı Kart 2.5 Alt/Üst', '1.Takım Toplam Sarı Kart 3.5 Alt/Üst', '2.Takım Toplam Sarı Kart 1.5 Alt/Üst', '2.Takım Toplam Sarı Kart 2.5 Alt/Üst', '2.Takım Toplam Sarı Kart 3.5 Alt/Üst', 'Sarı Kart Tek/Çift', 'Hangi Takım Çok Sarı Kart Yer ?', 'Toplam Korner 5.5 Alt/Üst', 'Toplam Korner 6.5 Alt/Üst', 'Toplam Korner 7.5 Alt/Üst', 'Toplam Korner 8.5 Alt/Üst', 'Toplam Korner 9.5 Alt/Üst', 'Toplam Korner 10.5 Alt/Üst', 'Toplam Korner 11.5 Alt/Üst', 'Toplam Korner 12.5 Alt/Üst', 'Toplam Korner 13.5 Alt/Üst', 'Toplam Korner 14.5 Alt/Üst', 'Toplam Korner 15.5 Alt/Üst', '1.Takım Toplam Korner 2.5 Alt/Üst', '1.Takım Toplam Korner 3.5 Alt/Üst', '1.Takım Toplam Korner 4.5 Alt/Üst', '1.Takım Toplam Korner 5.5 Alt/Üst', '1.Takım Toplam Korner 6.5 Alt/Üst', '1.Takım Toplam Korner 7.5 Alt/Üst', '1.Takım Toplam Korner 8.5 Alt/Üst', '1.Takım Toplam Korner 9.5 Alt/Üst', '1.Takım Toplam Korner 10.5 Alt/Üst', '2.Takım Toplam Korner 2.5 Alt/Üst', '2.Takım Toplam Korner 3.5 Alt/Üst', '2.Takım Toplam Korner 4.5 Alt/Üst', '2.Takım Toplam Korner 5.5 Alt/Üst', '2.Takım Toplam Korner 6.5 Alt/Üst', '2.Takım Toplam Korner 7.5 Alt/Üst', '2.Takım Toplam Korner 8.5 Alt/Üst', '2.Takım Toplam Korner 9.5 Alt/Üst', '2.Takım Toplam Korner 10.5 Alt/Üst', 'Korner Tek/Çift', 'Hangi Takım Daha Çok Korner Kullanır ?', 'Kırmızı Kart Çıkarmı ?') ASC";

$sor = sed_sql_query("select * from canli_tip where id!='' group by varoname ORDER BY {$orderle}");

} else if($oyuntip==2){

$orderle = "FIELD(varoname, '1X2', '1X2(1.YARI)', '1X2(2.YARI)', '1X2(1.Çeyrek)', '1X2(2.Çeyrek)', '1X2(3.Çeyrek)', '1X2(4.Çeyrek)', 'Kim Kazanır', '1.Yarı Kim Kazanır', '2.Yarı Kim Kazanır', '1.Çeyrek Kim Kazanır', '2.Çeyrek Kim Kazanır', '3.Çeyrek Kim Kazanır', '4.Çeyrek Kim Kazanır', 'Toplam Skor Alt/Üst', '1.Çeyrek Toplam Alt/Üst', '2.Çeyrek Toplam Alt/Üst', '3.Çeyrek Toplam Alt/Üst', '4.Çeyrek Toplam Alt/Üst', '1.Takım Toplam Alt/Üst', '2.Takım Toplam Alt/Üst', '1.Takım 1.Yarı Toplam Alt/Üst', '2.Takım 1.Yarı Toplam Alt/Üst', 'Handikap', '1.Yarı Handikap', '2.Yarı Handikap', '1.Çeyrek Handikap', '2.Çeyrek Handikap', '3.Çeyrek Handikap', '4.Çeyrek Handikap', 'Toplam Tek/Çift', '1.Yarı Toplam Tek/Çift', '2.Yarı Toplam Tek/Çift', '1.Çeyrek Toplam Tek/Çift', '2.Çeyrek Toplam Tek/Çift', '3.Çeyrek Toplam Tek/Çift', '4.Çeyrek Toplam Tek/Çift') ASC";

$sor = sed_sql_query("select * from basketbol_canli_tip where id!='' group by varoname ORDER BY {$orderle}");

} else if($oyuntip==3){

$orderle = "FIELD(varoname, 'Kim Kazanır', 'Set Bahisi') ASC";

$sor = sed_sql_query("select * from canli_tip_tenis where id!='' group by varoname ORDER BY {$orderle}");

} else if($oyuntip==4){

$orderle = "FIELD(varoname, 'Kim Kazanır', '1.Seti Kim Kazanır ?', '2.Seti Kim Kazanır ?', '3.Seti Kim Kazanır ?', '4.Seti Kim Kazanır ?', 'Toplam Kaç Set Oynanır ?', 'Müsabaka 5.Set Sürermi', 'Set bahisi (5 maç üzerinden)', 'Toplam Sayı Tek/Çift', '1.Set Toplam Sayı Tek/Çift', '2.Set Toplam Sayı Tek/Çift', '3.Set Toplam Sayı Tek/Çift', '4.Set Toplam Sayı Tek/Çift', 'Toplam Sayı Alt/Üst', '1.Takım Toplam Sayı Alt/Üst', '2.Takım Toplam Sayı Alt/Üst', '1.Takım 1.Set Toplam Sayı Alt/Üst', '2.Takım 1.Set Toplam Sayı Alt/Üst', '1.Takım 2.Set Toplam Sayı Alt/Üst', '2.Takım 2.Set Toplam Sayı Alt/Üst', '1.Takım 3.Set Toplam Sayı Alt/Üst', '2.Takım 3.Set Toplam Sayı Alt/Üst', '1.Takım 4.Set Toplam Sayı Alt/Üst', '2.Takım 4.Set Toplam Sayı Alt/Üst') ASC";

$sor = sed_sql_query("select * from canli_tip_voleybol where id!='' group by varoname ORDER BY {$orderle}");

} else if($oyuntip==5){

$orderle = "FIELD(varoname, '1X2', 'Cifte Sans', 'Hangi periyod daha cok gol olur?') ASC";

$sor = sed_sql_query("select * from canli_tip_buzhokeyi where id!='' group by varoname ORDER BY {$orderle}");

} else if($oyuntip==6){

$sor = sed_sql_query("select * from canli_tip_masatenis where id!='' group by varoname order by id asc");

} else {

$orderle = "FIELD(varoname, '1X2', 'Handikap 1:0', 'Handikap 2:0', 'Handikap 0:1', 'Handikap 0:2', 'Çifte Şans', '1.Yarı Çifte Şans', '1.Yarı Sonucu', '1.Yarı 0.5 Gol Alt Üst', '1.Yarı 1.5 Gol Alt Üst', '1.Yarı 2.5 Gol Alt Üst', 'Toplam 0.5 Gol Alt Üst', 'Toplam 1.5 Gol Alt Üst', 'Toplam 2.5 Gol Alt Üst', 'Toplam 3.5 Gol Alt Üst', 'Toplam 4.5 Gol Alt Üst', 'Toplam 5.5 Gol Alt Üst', '2.Yarı 0.5 Gol Alt Üst', '2.Yarı 1.5 Gol Alt Üst', '2.Yarı 2.5 Gol Alt Üst', '2.Yarı 3.5 Gol Alt Üst', '1.Yarı Karşılıklı Gol', 'Karşılıklı Gol Olurmu ?', 'Ev Sahibi Müsabakada Gol Atarmı ?', 'Deplasman Müsabakada Gol Atarmı ?', 'Toplam Gol Tek / Çift', '1.Yarı Tek / Çift', 'Ev Sahibi 0.5 Gol Alt Üst', 'Ev Sahibi 1.5 Gol Alt Üst', 'Ev Sahibi 2.5 Gol Alt Üst', 'Deplasman 0.5 Gol Alt Üst', 'Deplasman 1.5 Gol Alt Üst', 'Deplasman 2.5 Gol Alt Üst', 'İlk yarıda 1.golü hangi takım atar?', '1. yarıda 1.golü hangi takım atar?', '1.golü hangi takım atar?', '2.golü hangi takım atar?', '3.golü hangi takım atar?', '4.golü hangi takım atar?', '5.golü hangi takım atar?', '6.golü hangi takım atar?', 'Toplam Kaç Gol Atılır ?', 'Ev Sahibi Toplam Kaç Gol Atar ?', 'Deplasman Toplam Kaç Gol Atar ?', 'Ev Sahibi 1.Yarı 0.5 Gol Alt Üst', 'Ev Sahibi 1.Yarı 1.5 Gol Alt Üst', 'Ev Sahibi 1.Yarı 2.5 Gol Alt Üst', 'Deplasman 1.Yarı 0.5 Gol Alt Üst', 'Deplasman 1.Yarı 1.5 Gol Alt Üst', 'Deplasman 1.Yarı 2.5 Gol Alt Üst', 'Maç Sonucu ve Karşılıklı Gol', 'İlk Yarıda Kaç Gol Olur ?', 'Ev Sahibi İlk Yarı Tam Gol Sayısı', 'Ev sahibi İkinci Yarı Tam Gol Sayısı', 'Deplasman İlk Yarı Tam Gol Sayısı', 'Deplasman İkinci Yarı Tam Gol Sayısı', '2.Yarıda Toplam Kaç Gol Olur ?', 'Herhangi Bir Takım 1 Gol Farkla Kazanirmi ?', 'Herhangi Bir Takım 2 Gol Farkla Kazanirmi ?', 'Herhangi Bir Takım 3 Gol Farkla Kazanirmi ?', '2.Yarı Sonucu', 'Müsabakada kaç gol atılır? (0-4+)', 'Müsabakada kaç gol atılır? (0-5+)', 'Müsabakada kaç gol atılır? (0-6+)', '1.Yarı Skoru', 'Maç Skoru') ASC";

$sor = sed_sql_query("select * from canli_tip where id!='' group by varoname ORDER BY {$orderle}");

}

if(sed_sql_numrows($sor)<1) { ?>

<? } else { ?>
<script>
function asdes(order,as) {
$("#order").val(order);	
$("#ascdesc").val(as);
$("#suanval").val(1);
oyunturleri_canli(1);
}
function oyunlari_degis_canli(tip_isim,durum,spor_tipi) {
var rand = Math.random();	
$.get('../ajax_superadmin.php?a=oyunlari_degis_canli&tip_isim='+tip_isim+'&durum='+durum+'&spor_tipi='+spor_tipi+'',function(data) { oyunturleri_canli(<?=$oyuntip;?>); });
}
</script>
<?

while($row=sed_sql_fetcharray($sor)) {

if($row['varoname']=="Müsabakada kaç gol atılır? (0-4+)"){
	$varoname_ver = "Müsabakada kaç gol atılır? (0-4 )";
} else if($row['varoname']=="Müsabakada kaç gol atılır? (0-5+)"){
	$varoname_ver = "Müsabakada kaç gol atılır? (0-5 )";
} else if($row['varoname']=="Müsabakada kaç gol atılır? (0-6+)"){
	$varoname_ver = "Müsabakada kaç gol atılır? (0-6 )";
} else {
	$varoname_ver = $row['varoname'];
}

if($oyuntip==1){

$bilgisi_getir = bilgi("select * from oyunlar_canli where spor_tipi='futbol' and tip_isim='".$varoname_ver."' and bayi_id='".$ub['id']."'");

$spor_tipi_ver = "futbol";

if($row['varoname']=="1X2"){
	$oran_isim_ver = getTranslation('futboloran1');
} else if($row['varoname']=="Kalan Süre Tahmini"){
	$oran_isim_ver = getTranslation('futboloran171');
} else if($row['varoname']=="Handikap 0:1"){
	$oran_isim_ver = getTranslation('futboloran2');
} else if($row['varoname']=="Handikap 1:0"){
	$oran_isim_ver = getTranslation('futboloran3');
} else if($row['varoname']=="Handikap 0:2"){
	$oran_isim_ver = getTranslation('futboloran4');
} else if($row['varoname']=="Handikap 2:0"){
	$oran_isim_ver = getTranslation('futboloran5');
} else if($row['varoname']=="1.Yarı Sonucu"){
	$oran_isim_ver = getTranslation('futboloran6');
} else if($row['varoname']=="2.Yarı Sonucu"){
	$oran_isim_ver = getTranslation('futboloran7');
} else if($row['varoname']=="1.Yarı Çifte Şans"){
	$oran_isim_ver = getTranslation('futboloran8');
} else if($row['varoname']=="1.Yarı Karşılıklı Gol"){
	$oran_isim_ver = getTranslation('futboloran9');
} else if($row['varoname']=="Beraberlikte İade"){
	$oran_isim_ver = getTranslation('futboloran10');
} else if($row['varoname']=="Toplam 0.5 Gol Alt Üst"){
	$oran_isim_ver = getTranslation('futboloran11');
} else if($row['varoname']=="Toplam 1.5 Gol Alt Üst"){
	$oran_isim_ver = getTranslation('futboloran12');
} else if($row['varoname']=="Toplam 2.5 Gol Alt Üst"){
	$oran_isim_ver = getTranslation('futboloran13');
} else if($row['varoname']=="Toplam 3.5 Gol Alt Üst"){
	$oran_isim_ver = getTranslation('futboloran14');
} else if($row['varoname']=="Toplam 4.5 Gol Alt Üst"){
	$oran_isim_ver = getTranslation('futboloran15');
} else if($row['varoname']=="Toplam 5.5 Gol Alt Üst"){
	$oran_isim_ver = getTranslation('futboloran16');
} else if($row['varoname']=="1.Yarı 0.5 Gol Alt Üst"){
	$oran_isim_ver = getTranslation('futboloran18');
} else if($row['varoname']=="1.Yarı 1.5 Gol Alt Üst"){
	$oran_isim_ver = getTranslation('futboloran19');
} else if($row['varoname']=="1.Yarı 2.5 Gol Alt Üst"){
	$oran_isim_ver = getTranslation('futboloran20');
} else if($row['varoname']=="1.Yarı Toplam Gol 3.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran21');
} else if($row['varoname']=="2.Yarı 0.5 Gol Alt Üst"){
	$oran_isim_ver = getTranslation('futboloran22');
} else if($row['varoname']=="2.Yarı 1.5 Gol Alt Üst"){
	$oran_isim_ver = getTranslation('futboloran23');
} else if($row['varoname']=="2.Yarı 2.5 Gol Alt Üst"){
	$oran_isim_ver = getTranslation('futboloran24');
} else if($row['varoname']=="2.Yarı 3.5 Gol Alt Üst"){
	$oran_isim_ver = getTranslation('futboloran25');
} else if($row['varoname']=="Ev Sahibi Müsabakada Gol Atarmı ?"){
	$oran_isim_ver = getTranslation('futboloran26');
} else if($row['varoname']=="Deplasman Müsabakada Gol Atarmı ?"){
	$oran_isim_ver = getTranslation('futboloran27');
} else if($row['varoname']=="Karşılıklı Gol Olurmu ?"){
	$oran_isim_ver = getTranslation('futboloran28');
} else if($row['varoname']=="​​​​​1.Yarı Tek / Çift"){
	$oran_isim_ver = getTranslation('futboloran29');
} else if($row['varoname']=="Toplam Gol Tek / Çift"){
	$oran_isim_ver = getTranslation('futboloran30');
} else if($row['varoname']=="Ev Sahibi Toplam Kaç Gol Atar ?"){
	$oran_isim_ver = getTranslation('futboloran31');
} else if($row['varoname']=="Deplasman Toplam Kaç Gol Atar ?"){
	$oran_isim_ver = getTranslation('futboloran32');
} else if($row['varoname']=="Ev Sahibi İlk Yarı Tam Gol Sayısı"){
	$oran_isim_ver = getTranslation('futboloran33');
} else if($row['varoname']=="Ev Sahibi İkinci Yarı Tam Gol Sayısı"){
	$oran_isim_ver = getTranslation('futboloran34');
} else if($row['varoname']=="Deplasman İlk Yarı Tam Gol Sayısı"){
	$oran_isim_ver = getTranslation('futboloran35');
} else if($row['varoname']=="Deplasman İkinci Yarı Tam Gol Sayısı"){
	$oran_isim_ver = getTranslation('futboloran36');
} else if($row['varoname']=="Ev Sahibi 1.Yarı 0.5 Gol Alt Üst"){
	$oran_isim_ver = getTranslation('futboloran37');
} else if($row['varoname']=="Ev Sahibi 1.Yarı 1.5 Gol Alt Üst"){
	$oran_isim_ver = getTranslation('futboloran38');
} else if($row['varoname']=="Deplasman 1.Yarı 0.5 Gol Alt Üst"){
	$oran_isim_ver = getTranslation('futboloran39');
} else if($row['varoname']=="Deplasman 1.Yarı 1.5 Gol Alt Üst"){
	$oran_isim_ver = getTranslation('futboloran40');
} else if($row['varoname']=="Evsahibi Toplam 1.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran41');
} else if($row['varoname']=="Deplasman Toplam 1.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran42');
} else if($row['varoname']=="​​​​​Evsahibi Her 2 yarıda Gol Atar ?"){
	$oran_isim_ver = getTranslation('futboloran43');
} else if($row['varoname']=="Deplasman Her 2 yarıda Gol Atar ?"){
	$oran_isim_ver = getTranslation('futboloran44');
} else if($row['varoname']=="Hangi Devrede Fazla Gol Olur"){
	$oran_isim_ver = getTranslation('futboloran45');
} else if($row['varoname']=="Evsahibi Hangi Devrede Fazla Gol Atar ?"){
	$oran_isim_ver = getTranslation('futboloran46');
} else if($row['varoname']=="Deplasman Hangi Devrede Fazla Gol Atar ?"){
	$oran_isim_ver = getTranslation('futboloran47');
} else if($row['varoname']=="Müsabakada kaç gol atılır? (0-4+)"){
	$oran_isim_ver = getTranslation('futboloran48');
} else if($row['varoname']=="Müsabakada kaç gol atılır? (0-5+)"){
	$oran_isim_ver = getTranslation('futboloran49');
} else if($row['varoname']=="Müsabakada kaç gol atılır? (0-6+)"){
	$oran_isim_ver = getTranslation('futboloran50');
} else if($row['varoname']=="Herhangi Bir Takım 1 Gol Farkla Kazanirmi ?"){
	$oran_isim_ver = getTranslation('futboloran51');
} else if($row['varoname']=="Herhangi Bir Takım 2 Gol Farkla Kazanirmi ?"){
	$oran_isim_ver = getTranslation('futboloran52');
} else if($row['varoname']=="Herhangi Bir Takım 3 Gol Farkla Kazanirmi ?"){
	$oran_isim_ver = getTranslation('futboloran53');
} else if($row['varoname']=="Maç Sonucu ve 2.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran54');
} else if($row['varoname']=="Maç Sonucu ve Karşılıklı Gol"){
	$oran_isim_ver = getTranslation('futboloran55');
} else if($row['varoname']=="İlk Yarı / Maç Sonucu"){
	$oran_isim_ver = getTranslation('futboloran56');
} else if($row['varoname']=="Maç Skoru"){
	$oran_isim_ver = getTranslation('futboloran57');
} else if($row['varoname']=="Çifte Şans"){
	$oran_isim_ver = getTranslation('futboloran58');
} else if($row['varoname']=="Toplam Sarı Kart 3.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran59');
} else if($row['varoname']=="Kırmızı Kart Çıkar mı?"){
	$oran_isim_ver = getTranslation('futboloran60');
} else if($row['varoname']=="Maçta Kaç Tane Penaltı Olur ?"){
	$oran_isim_ver = getTranslation('futboloran61');
} else if($row['varoname']=="1.Takim Sari Kart 1.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran62');
} else if($row['varoname']=="1.Takim Sari Kart 2.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran63');
} else if($row['varoname']=="1.Takim Sari Kart 3.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran64');
} else if($row['varoname']=="2.Takim Sari Kart 1.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran65');
} else if($row['varoname']=="2.Takim Sari Kart 2.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran66');
} else if($row['varoname']=="2.Takim Sari Kart 3.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran67');
} else if($row['varoname']=="Sarı Kart Toplam Tek/Çift"){
	$oran_isim_ver = getTranslation('futboloran68');
} else if($row['varoname']=="Hangi Takım Çok Sarı Kart Yer ?"){
	$oran_isim_ver = getTranslation('futboloran69');
} else if($row['varoname']=="Toplam Korner 5.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran70');
} else if($row['varoname']=="Toplam Korner 6.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran71');
} else if($row['varoname']=="Toplam Korner 7.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran72');
} else if($row['varoname']=="Toplam Korner 8.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran73');
} else if($row['varoname']=="Toplam Korner 9.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran74');
} else if($row['varoname']=="Toplam Korner 10.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran75');
} else if($row['varoname']=="Toplam Korner 11.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran76');
} else if($row['varoname']=="Toplam Korner 12.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran77');
} else if($row['varoname']=="Toplam Korner 13.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran78');
} else if($row['varoname']=="Toplam Korner 14.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran79');
} else if($row['varoname']=="Toplam Korner 15.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran80');
} else if($row['varoname']=="1.Takım Toplam Korner 2.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran81');
} else if($row['varoname']=="1.Takım Toplam Korner 3.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran82');
} else if($row['varoname']=="1.Takım Toplam Korner 4.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran83');
} else if($row['varoname']=="1.Takım Toplam Korner 5.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran84');
} else if($row['varoname']=="1.Takım Toplam Korner 6.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran85');
} else if($row['varoname']=="1.Takım Toplam Korner 7.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran86');
} else if($row['varoname']=="1.Takım Toplam Korner 8.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran87');
} else if($row['varoname']=="1.Takım Toplam Korner 9.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran88');
} else if($row['varoname']=="1.Takım Toplam Korner 10.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran89');
} else if($row['varoname']=="2.Takım Toplam Korner 2.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran90');
} else if($row['varoname']=="2.Takım Toplam Korner 3.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran91');
} else if($row['varoname']=="2.Takım Toplam Korner 4.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran92');
} else if($row['varoname']=="2.Takım Toplam Korner 5.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran93');
} else if($row['varoname']=="2.Takım Toplam Korner 6.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran94');
} else if($row['varoname']=="2.Takım Toplam Korner 7.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran95');
} else if($row['varoname']=="2.Takım Toplam Korner 8.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran96');
} else if($row['varoname']=="2.Takım Toplam Korner 9.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran97');
} else if($row['varoname']=="2.Takım Toplam Korner 10.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran98');
} else if($row['varoname']=="Korner Tek/Çift"){
	$oran_isim_ver = getTranslation('futboloran99');
} else if($row['varoname']=="Hangi Takım Çok Korner Kullanır ?"){
	$oran_isim_ver = getTranslation('futboloran100');
} else if($row['varoname']=="Maç Sonucu ve 3.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran101');
} else if($row['varoname']=="Ev Sahibi 0.5 Gol Alt Üst"){
	$oran_isim_ver = getTranslation('futboloran102');
} else if($row['varoname']=="Ev Sahibi 1.5 Gol Alt Üst"){
	$oran_isim_ver = getTranslation('futboloran103');
} else if($row['varoname']=="Ev Sahibi 2.5 Gol Alt Üst"){
	$oran_isim_ver = getTranslation('futboloran104');
} else if($row['varoname']=="Deplasman 0.5 Gol Alt Üst"){
	$oran_isim_ver = getTranslation('futboloran105');
} else if($row['varoname']=="Deplasman 1.5 Gol Alt Üst"){
	$oran_isim_ver = getTranslation('futboloran106');
} else if($row['varoname']=="Deplasman 2.5 Gol Alt Üst"){
	$oran_isim_ver = getTranslation('futboloran107');
} else if($row['varoname']=="Toplam Kaç Gol Atılır ?"){
	$oran_isim_ver = getTranslation('futboloran108');
} else if($row['varoname']=="1.Yarı Skoru"){
	$oran_isim_ver = getTranslation('futboloran109');
} else if($row['varoname']=="Ev Sahibi 1.Yarı 2.5 Gol Alt Üst"){
	$oran_isim_ver = getTranslation('futboloran110');
} else if($row['varoname']=="Deplasman 1.Yarı 2.5 Gol Alt Üst"){
	$oran_isim_ver = getTranslation('futboloran111');
} else if($row['varoname']=="İlk Yarıda Kaç Gol Olur ?"){
	$oran_isim_ver = getTranslation('futboloran112');
} else if($row['varoname']=="2.Yarıda Toplam Kaç Gol Olur ?"){
	$oran_isim_ver = getTranslation('futboloran113');
} else if($row['varoname']=="1. yarıda 1.golü hangi takım atar?"){
	$oran_isim_ver = getTranslation('futboloran114');
} else if($row['varoname']=="1. yarıda 2.golü hangi takım atar?"){
	$oran_isim_ver = getTranslation('futboloran115');
} else if($row['varoname']=="1.golü hangi takım atar?"){
	$oran_isim_ver = getTranslation('futboloran116');
} else if($row['varoname']=="2.golü hangi takım atar?"){
	$oran_isim_ver = getTranslation('futboloran117');
} else if($row['varoname']=="3.golü hangi takım atar?"){
	$oran_isim_ver = getTranslation('futboloran118');
} else if($row['varoname']=="4.golü hangi takım atar?"){
	$oran_isim_ver = getTranslation('futboloran119');
} else if($row['varoname']=="5.golü hangi takım atar?"){
	$oran_isim_ver = getTranslation('futboloran120');
} else if($row['varoname']=="6.golü hangi takım atar?"){
	$oran_isim_ver = getTranslation('futboloran121');
} else if($row['varoname']=="Toplam Sarı Kart 1.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran122');
} else if($row['varoname']=="Toplam Sarı Kart 2.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran123');
} else if($row['varoname']=="Toplam Sarı Kart 4.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran124');
} else if($row['varoname']=="Kırmızı Kart Çıkarmı ?"){
	$oran_isim_ver = getTranslation('futboloran125');
} else if($row['varoname']=="Kaç Penaltı Olur ?"){
	$oran_isim_ver = getTranslation('futboloran126');
} else if($row['varoname']=="1.Takım Toplam Sarı Kart 1.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran127');
} else if($row['varoname']=="1.Takım Toplam Sarı Kart 2.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran128');
} else if($row['varoname']=="1.Takım Toplam Sarı Kart 3.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran129');
} else if($row['varoname']=="2.Takım Toplam Sarı Kart 1.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran130');
} else if($row['varoname']=="2.Takım Toplam Sarı Kart 2.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran131');
} else if($row['varoname']=="2.Takım Toplam Sarı Kart 3.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran132');
} else if($row['varoname']=="Sarı Kart Tek/Çift"){
	$oran_isim_ver = getTranslation('futboloran133');
} else if($row['varoname']=="1.Takım Toplam Korner 2.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran134');
} else if($row['varoname']=="1.Takım Toplam Korner 3.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran135');
} else if($row['varoname']=="1.Takım Toplam Korner 4.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran136');
} else if($row['varoname']=="1.Takım Toplam Korner 5.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran137');
} else if($row['varoname']=="1.Takım Toplam Korner 6.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran138');
} else if($row['varoname']=="1.Takım Toplam Korner 7.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran139');
} else if($row['varoname']=="1.Takım Toplam Korner 8.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran140');
} else if($row['varoname']=="1.Takım Toplam Korner 9.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran141');
} else if($row['varoname']=="1.Takım Toplam Korner 10.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran142');
} else if($row['varoname']=="2.Takım Toplam Korner 2.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran143');
} else if($row['varoname']=="2.Takım Toplam Korner 3.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran144');
} else if($row['varoname']=="2.Takım Toplam Korner 4.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran145');
} else if($row['varoname']=="2.Takım Toplam Korner 5.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran146');
} else if($row['varoname']=="2.Takım Toplam Korner 6.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran147');
} else if($row['varoname']=="2.Takım Toplam Korner 7.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran148');
} else if($row['varoname']=="2.Takım Toplam Korner 8.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran149');
} else if($row['varoname']=="2.Takım Toplam Korner 9.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran150');
} else if($row['varoname']=="2.Takım Toplam Korner 10.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran151');
} else if($row['varoname']=="Korner Tek/Çift"){
	$oran_isim_ver = getTranslation('futboloran152');
} else if($row['varoname']=="Hangi Takım Daha Çok Korner Kullanır ?"){
	$oran_isim_ver = getTranslation('futboloran153');
} else if($row['varoname']=="Kalan Süre Tahmini - skor:0-0"){
	$oran_isim_ver = getTranslation('futboloran154');
} else if($row['varoname']=="Kalan Süre Tahmini - skor:1-0"){
	$oran_isim_ver = getTranslation('futboloran155');
} else if($row['varoname']=="Kalan Süre Tahmini - skor:0-1"){
	$oran_isim_ver = getTranslation('futboloran156');
} else if($row['varoname']=="Kalan Süre Tahmini - skor:1-1"){
	$oran_isim_ver = getTranslation('futboloran157');
} else if($row['varoname']=="Kalan Süre Tahmini - skor:2-0"){
	$oran_isim_ver = getTranslation('futboloran158');
} else if($row['varoname']=="Kalan Süre Tahmini - skor:0-2"){
	$oran_isim_ver = getTranslation('futboloran159');
} else if($row['varoname']=="Kalan Süre Tahmini - skor:2-1"){
	$oran_isim_ver = getTranslation('futboloran160');
} else if($row['varoname']=="Kalan Süre Tahmini - skor:1-2"){
	$oran_isim_ver = getTranslation('futboloran161');
} else if($row['varoname']=="Kalan Süre Tahmini - skor:3-0"){
	$oran_isim_ver = getTranslation('futboloran162');
} else if($row['varoname']=="Kalan Süre Tahmini - skor:0-3"){
	$oran_isim_ver = getTranslation('futboloran163');
} else if($row['varoname']=="Kalan Süre Tahmini - skor:2-2"){
	$oran_isim_ver = getTranslation('futboloran164');
} else if($row['varoname']=="Kalan Süre Tahmini - skor:1-3"){
	$oran_isim_ver = getTranslation('futboloran165');
} else if($row['varoname']=="Kalan Süre Tahmini - skor:4-0"){
	$oran_isim_ver = getTranslation('futboloran166');
} else if($row['varoname']=="Kalan Süre Tahmini - skor:5-0"){
	$oran_isim_ver = getTranslation('futboloran167');
} else if($row['varoname']=="Kalan Süre Tahmini - skor:4-1"){
	$oran_isim_ver = getTranslation('futboloran168');
} else if($row['varoname']=="Kalan Süre Tahmini - skor:3-2"){
	$oran_isim_ver = getTranslation('futboloran169');
} else if($row['varoname']=="Kalan Süre Tahmini - skor:3-3"){
	$oran_isim_ver = getTranslation('futboloran170');
} else {
	$oran_isim_ver = $row['varoname'];
}

} else if($oyuntip==2){

$bilgisi_getir = bilgi("select * from oyunlar_canli where spor_tipi='basketbol' and tip_isim='".$varoname_ver."' and bayi_id='".$ub['id']."'");

$spor_tipi_ver = "basketbol";

if($row['varoname']=="Kim Kazanır (Uz. Dahil)"){
	$oran_isim_ver = getTranslation('basketboloran1');
} else if($row['varoname']=="1X2 (Uz. Hariç)"){
	$oran_isim_ver = getTranslation('basketboloran2');
} else if($row['varoname']== "1X2(1.YARI)"){
	$oran_isim_ver = getTranslation('basketboloran3');
} else if($row['varoname']== "Toplam Skor Tek/Çift"){
	$oran_isim_ver = getTranslation('basketboloran4');
} else if($row['varoname']== "Toplam Skor Alt/Üst"){
	$oran_isim_ver = getTranslation('basketboloran5');
} else if($row['varoname']== "Handikap ( 1.YARI )"){
	$oran_isim_ver = getTranslation('basketboloran6');
} else if($row['varoname']== "Handikap"){
	$oran_isim_ver = getTranslation('basketboloran7');
} else if($row['varoname']== "1.Yarı / Maç Sonucu"){
	$oran_isim_ver = getTranslation('basketboloran8');
} else if($row['varoname']== "İki Devrede Kazanır"){
	$oran_isim_ver = getTranslation('basketboloran9');
} else if($row['varoname']== "Tüm Periyotları Kazanır"){
	$oran_isim_ver = getTranslation('basketboloran10');
} else if($row['varoname']== "1.Takım 1.Yarı Alt/Üst"){
	$oran_isim_ver = getTranslation('basketboloran11');
} else if($row['varoname']== "2.Takım 1.Yarı Alt/Üst"){
	$oran_isim_ver = getTranslation('basketboloran12');
} else if($row['varoname']== "1.Takım Alt/Üst"){
	$oran_isim_ver = getTranslation('basketboloran13');
} else if($row['varoname']== "2.Takım Alt/Üst"){
	$oran_isim_ver = getTranslation('basketboloran14');
} else if($row['varoname']== "1.Takım 1.Çeyrek Alt/Üst"){
	$oran_isim_ver = getTranslation('basketboloran15');
} else if($row['varoname']== "2.Takım 1.Çeyrek Alt/Üst"){
	$oran_isim_ver = getTranslation('basketboloran16');
} else if($row['varoname']== "1.Çeyrek Kim Kazanır"){
	$oran_isim_ver = getTranslation('basketboloran17');
} else if($row['varoname']== "1.Çeyrek Toplam Tek/Çift"){
	$oran_isim_ver = getTranslation('basketboloran18');
} else if($row['varoname']== "1.Yarı Toplam Tek/Çift"){
	$oran_isim_ver = getTranslation('basketboloran19');
} else if($row['varoname']== "1X2(2.YARI)"){
	$oran_isim_ver = getTranslation('basketboloran20');
} else if($row['varoname']== "1X2(1.Çeyrek)"){
	$oran_isim_ver = getTranslation('basketboloran21');
} else if($row['varoname']== "1X2(2.Çeyrek)"){
	$oran_isim_ver = getTranslation('basketboloran22');
} else if($row['varoname']== "1X2(3.Çeyrek)"){
	$oran_isim_ver = getTranslation('basketboloran23');
} else if($row['varoname']== "1X2(4.Çeyrek)"){
	$oran_isim_ver = getTranslation('basketboloran24');
} else if($row['varoname']== "2.Çeyrek Kim Kazanır"){
	$oran_isim_ver = getTranslation('basketboloran25');
} else if($row['varoname']== "3.Çeyrek Kim Kazanır"){
	$oran_isim_ver = getTranslation('basketboloran26');
} else if($row['varoname']== "4.Çeyrek Kim Kazanır"){
	$oran_isim_ver = getTranslation('basketboloran27');
} else if($row['varoname']== "1.Çeyrek Toplam Alt/Üst"){
	$oran_isim_ver = getTranslation('basketboloran28');
} else if($row['varoname']== "2.Çeyrek Toplam Alt/Üst"){
	$oran_isim_ver = getTranslation('basketboloran29');
} else if($row['varoname']== "3.Çeyrek Toplam Alt/Üst"){
	$oran_isim_ver = getTranslation('basketboloran30');
} else if($row['varoname']== "4.Çeyrek Toplam Alt/Üst"){
	$oran_isim_ver = getTranslation('basketboloran31');
} else if($row['varoname']== "1.Takım Toplam Alt/Üst"){
	$oran_isim_ver = getTranslation('basketboloran32');
} else if($row['varoname']== "2.Takım Toplam Alt/Üst"){
	$oran_isim_ver = getTranslation('basketboloran33');
} else if($row['varoname']== "1.Takım 1.Yarı Toplam Alt/Üst"){
	$oran_isim_ver = getTranslation('basketboloran34');
} else if($row['varoname']== "2.Takım 1.Yarı Toplam Alt/Üst"){
	$oran_isim_ver = getTranslation('basketboloran35');
} else if($row['varoname']== "1.Yarı Handikap"){
	$oran_isim_ver = getTranslation('basketboloran36');
} else if($row['varoname']== "2.Yarı Handikap"){
	$oran_isim_ver = getTranslation('basketboloran37');
} else if($row['varoname']== "1.Çeyrek Handikap"){
	$oran_isim_ver = getTranslation('basketboloran38');
} else if($row['varoname']== "2.Çeyrek Handikap"){
	$oran_isim_ver = getTranslation('basketboloran39');
} else if($row['varoname']== "3.Çeyrek Handikap"){
	$oran_isim_ver = getTranslation('basketboloran40');
} else if($row['varoname']== "4.Çeyrek Handikap"){
	$oran_isim_ver = getTranslation('basketboloran41');
} else if($row['varoname']== "2.Yarı Toplam Tek/Çift"){
	$oran_isim_ver = getTranslation('basketboloran42');
} else if($row['varoname']== "2.Çeyrek Toplam Tek/Çift"){
	$oran_isim_ver = getTranslation('basketboloran43');
} else if($row['varoname']== "3.Çeyrek Toplam Tek/Çift"){
	$oran_isim_ver = getTranslation('basketboloran44');
} else if($row['varoname']== "4.Çeyrek Toplam Tek/Çift"){
	$oran_isim_ver = getTranslation('basketboloran45');
} else if($row['varoname']== "Toplam Tek/Çift"){
	$oran_isim_ver = getTranslation('basketboloran46');
} else if($row['varoname']== "1.Yarı Kim Kazanır"){
	$oran_isim_ver = getTranslation('basketboloran47');
} else if($row['varoname']== "2.Yarı Kim Kazanır"){
	$oran_isim_ver = getTranslation('basketboloran48');
} else {
	$oran_isim_ver = $row['varoname'];
}

} else if($oyuntip==3){

$bilgisi_getir = bilgi("select * from oyunlar_canli where spor_tipi='tenis' and tip_isim='".$varoname_ver."' and bayi_id='".$ub['id']."'");

$spor_tipi_ver = "tenis";

if($row['varoname']=="Kim Kazanır"){
	$oran_isim_ver = getTranslation('tenisoran1');
} else if($row['varoname']=="Set Bahisi"){
	$oran_isim_ver = getTranslation('tenisoran2');
} else {
	$oran_isim_ver = $row['varoname'];
}

} else if($oyuntip==4){

$bilgisi_getir = bilgi("select * from oyunlar_canli where spor_tipi='voleybol' and tip_isim='".$varoname_ver."' and bayi_id='".$ub['id']."'");

$spor_tipi_ver = "voleybol";

if($row['varoname']=="Kim Kazanır"){
	$oran_isim_ver = getTranslation('voleyboloran1');
} else if($row['varoname']=="Set bahisi"){
	$oran_isim_ver = getTranslation('voleyboloran2');
} else if($row['varoname']=="Toplam Alt/Üst"){
	$oran_isim_ver = getTranslation('voleyboloran3');
} else if($row['varoname']=="5 Set Sürermi ?"){
	$oran_isim_ver = getTranslation('voleyboloran4');
} else if($row['varoname']=="1.Seti Kim Kazanır ?"){
	$oran_isim_ver = getTranslation('voleyboloran5');
} else if($row['varoname']=="2.Seti Kim Kazanır ?"){
	$oran_isim_ver = getTranslation('voleyboloran6');
} else if($row['varoname']=="3.Seti Kim Kazanır ?"){
	$oran_isim_ver = getTranslation('voleyboloran7');
} else if($row['varoname']=="4.Seti Kim Kazanır ?"){
	$oran_isim_ver = getTranslation('voleyboloran8');
} else if($row['varoname']=="Set bahisi (5 maç üzerinden)"){
	$oran_isim_ver = getTranslation('voleyboloran9');
} else if($row['varoname']=="Toplam Kaç Set Oynanır ?"){
	$oran_isim_ver = getTranslation('voleyboloran10');
} else if($row['varoname']=="1.Takım Toplam Sayı Alt/Üst"){
	$oran_isim_ver = getTranslation('voleyboloran11');
} else if($row['varoname']=="2.Takım Toplam Sayı Alt/Üst"){
	$oran_isim_ver = getTranslation('voleyboloran12');
} else if($row['varoname']=="1.Takım 1.Set Toplam Sayı Alt/Üst"){
	$oran_isim_ver = getTranslation('voleyboloran13');
} else if($row['varoname']=="2.Takım 1.Set Toplam Sayı Alt/Üst"){
	$oran_isim_ver = getTranslation('voleyboloran14');
} else if($row['varoname']=="1.Takım 2.Set Toplam Sayı Alt/Üst"){
	$oran_isim_ver = getTranslation('voleyboloran15');
} else if($row['varoname']=="2.Takım 2.Set Toplam Sayı Alt/Üst"){
	$oran_isim_ver = getTranslation('voleyboloran16');
} else if($row['varoname']=="1.Takım 3.Set Toplam Sayı Alt/Üst"){
	$oran_isim_ver = getTranslation('voleyboloran17');
} else if($row['varoname']=="2.Takım 3.Set Toplam Sayı Alt/Üst"){
	$oran_isim_ver = getTranslation('voleyboloran18');
} else if($row['varoname']=="1.Takım 4.Set Toplam Sayı Alt/Üst"){
	$oran_isim_ver = getTranslation('voleyboloran19');
} else if($row['varoname']=="2.Takım 4.Set Toplam Sayı Alt/Üst"){
	$oran_isim_ver = getTranslation('voleyboloran20');
} else if($row['varoname']=="Toplam Sayı Alt/Üst"){
	$oran_isim_ver = getTranslation('voleyboloran21');
} else if($row['varoname']=="Toplam Sayı Tek/Çift"){
	$oran_isim_ver = getTranslation('voleyboloran22');
} else if($row['varoname']=="1.Set Toplam Sayı Tek/Çift"){
	$oran_isim_ver = getTranslation('voleyboloran23');
} else if($row['varoname']=="2.Set Toplam Sayı Tek/Çift"){
	$oran_isim_ver = getTranslation('voleyboloran24');
} else if($row['varoname']=="3.Set Toplam Sayı Tek/Çift"){
	$oran_isim_ver = getTranslation('voleyboloran25');
} else if($row['varoname']=="4.Set Toplam Sayı Tek/Çift"){
	$oran_isim_ver = getTranslation('voleyboloran26');
} else if($row['varoname']=="Müsabaka 5.Set Sürermi"){
	$oran_isim_ver = getTranslation('voleyboloran27');
} else {
	$oran_isim_ver = $row['varoname'];
}

} else if($oyuntip==5){

$bilgisi_getir = bilgi("select * from oyunlar_canli where spor_tipi='buzhokeyi' and tip_isim='".$varoname_ver."' and bayi_id='".$ub['id']."'");

$spor_tipi_ver = "buzhokeyi";

if($row['varoname']=="Kim Kazanır"){
	$oran_isim_ver = getTranslation('buzhokeyioran1');
} else if($row['varoname']=="1X2"){
	$oran_isim_ver = getTranslation('buzhokeyioran2');
} else if($row['varoname']=="1.P Maç Sonucu"){
	$oran_isim_ver = getTranslation('buzhokeyioran3');
} else if($row['varoname']=="2.P Maç Sonucu"){
	$oran_isim_ver = getTranslation('buzhokeyioran4');
} else if($row['varoname']=="3.P Maç Sonucu"){
	$oran_isim_ver = getTranslation('buzhokeyioran5');
} else if($row['varoname']=="Cifte Sans"){
	$oran_isim_ver = getTranslation('buzhokeyioran6');
} else if($row['varoname']=="1.P Çifte Şans"){
	$oran_isim_ver = getTranslation('buzhokeyioran7');
} else if($row['varoname']=="2.P Çifte Şans"){
	$oran_isim_ver = getTranslation('buzhokeyioran8');
} else if($row['varoname']=="3.P Çifte Şans"){
	$oran_isim_ver = getTranslation('buzhokeyioran9');
} else if($row['varoname']=="Hangi periyod daha cok gol olur?"){
	$oran_isim_ver = getTranslation('buzhokeyioran10');
} else {
	$oran_isim_ver = $row['varoname'];
}

} else if($oyuntip==6){

$bilgisi_getir = bilgi("select * from oyunlar_canli where spor_tipi='masatenis' and tip_isim='".$varoname_ver."' and bayi_id='".$ub['id']."'");

$spor_tipi_ver = "masatenisi";

if($row['varoname']=="Kim Kazanır"){
	$oran_isim_ver = getTranslation('masatenisioran1');
} else if($row['varoname']=="Set Bahisi"){
	$oran_isim_ver = getTranslation('masatenisioran2');
} else if($row['varoname']=="1. ve 2.Seti Kim Kazanır ?"){
	$oran_isim_ver = getTranslation('masatenisioran3');
} else if($row['varoname']=="2. ve 3.Seti Kim Kazanır ?"){
	$oran_isim_ver = getTranslation('masatenisioran4');
} else if($row['varoname']=="1.Seti Kim Kazanır"){
	$oran_isim_ver = getTranslation('masatenisioran5');
} else if($row['varoname']=="Toplam Skor"){
	$oran_isim_ver = getTranslation('masatenisioran6');
} else if($row['varoname']=="2.Seti Kim Kazanır"){
	$oran_isim_ver = getTranslation('masatenisioran7');
} else if($row['varoname']=="3.Seti Kim Kazanır"){
	$oran_isim_ver = getTranslation('masatenisioran8');
} else if($row['varoname']=="4.Seti Kim Kazanır"){
	$oran_isim_ver = getTranslation('masatenisioran9');
} else if($row['varoname']=="5.Seti Kim Kazanır"){
	$oran_isim_ver = getTranslation('masatenisioran10');
} else {
	$oran_isim_ver = $row['varoname'];
}

} else {

$bilgisi_getir = bilgi("select * from oyunlar_canli where spor_tipi='futbol' and tip_isim='".$varoname_ver."' and bayi_id='".$ub['id']."'");

$spor_tipi_ver = "futbol";

if($row['varoname']=="1X2"){
	$oran_isim_ver = getTranslation('futboloran1');
} else if($row['varoname']=="Handikap 0:1"){
	$oran_isim_ver = getTranslation('futboloran2');
} else if($row['varoname']=="Handikap 1:0"){
	$oran_isim_ver = getTranslation('futboloran3');
} else if($row['varoname']=="Handikap 0:2"){
	$oran_isim_ver = getTranslation('futboloran4');
} else if($row['varoname']=="Handikap 2:0"){
	$oran_isim_ver = getTranslation('futboloran5');
} else if($row['varoname']=="1.Yarı Sonucu"){
	$oran_isim_ver = getTranslation('futboloran6');
} else if($row['varoname']=="2.Yarı Sonucu"){
	$oran_isim_ver = getTranslation('futboloran7');
} else if($row['varoname']=="1.Yarı Çifte Şans"){
	$oran_isim_ver = getTranslation('futboloran8');
} else if($row['varoname']=="1.Yarı Karşılıklı Gol"){
	$oran_isim_ver = getTranslation('futboloran9');
} else if($row['varoname']=="Beraberlikte İade"){
	$oran_isim_ver = getTranslation('futboloran10');
} else if($row['varoname']=="Toplam 0.5 Gol Alt Üst"){
	$oran_isim_ver = getTranslation('futboloran11');
} else if($row['varoname']=="Toplam 1.5 Gol Alt Üst"){
	$oran_isim_ver = getTranslation('futboloran12');
} else if($row['varoname']=="Toplam 2.5 Gol Alt Üst"){
	$oran_isim_ver = getTranslation('futboloran13');
} else if($row['varoname']=="Toplam 3.5 Gol Alt Üst"){
	$oran_isim_ver = getTranslation('futboloran14');
} else if($row['varoname']=="Toplam 4.5 Gol Alt Üst"){
	$oran_isim_ver = getTranslation('futboloran15');
} else if($row['varoname']=="Toplam 5.5 Gol Alt Üst"){
	$oran_isim_ver = getTranslation('futboloran16');
} else if($row['varoname']=="1.Yarı 0.5 Gol Alt Üst"){
	$oran_isim_ver = getTranslation('futboloran18');
} else if($row['varoname']=="1.Yarı 1.5 Gol Alt Üst"){
	$oran_isim_ver = getTranslation('futboloran19');
} else if($row['varoname']=="1.Yarı 2.5 Gol Alt Üst"){
	$oran_isim_ver = getTranslation('futboloran20');
} else if($row['varoname']=="1.Yarı Toplam Gol 3.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran21');
} else if($row['varoname']=="2.Yarı 0.5 Gol Alt Üst"){
	$oran_isim_ver = getTranslation('futboloran22');
} else if($row['varoname']=="2.Yarı 1.5 Gol Alt Üst"){
	$oran_isim_ver = getTranslation('futboloran23');
} else if($row['varoname']=="2.Yarı 2.5 Gol Alt Üst"){
	$oran_isim_ver = getTranslation('futboloran24');
} else if($row['varoname']=="2.Yarı 3.5 Gol Alt Üst"){
	$oran_isim_ver = getTranslation('futboloran25');
} else if($row['varoname']=="Ev Sahibi Müsabakada Gol Atarmı ?"){
	$oran_isim_ver = getTranslation('futboloran26');
} else if($row['varoname']=="Deplasman Müsabakada Gol Atarmı ?"){
	$oran_isim_ver = getTranslation('futboloran27');
} else if($row['varoname']=="Karşılıklı Gol Olurmu ?"){
	$oran_isim_ver = getTranslation('futboloran28');
} else if($row['varoname']=="​​​​​1.Yarı Tek / Çift"){
	$oran_isim_ver = getTranslation('futboloran29');
} else if($row['varoname']=="Toplam Gol Tek / Çift"){
	$oran_isim_ver = getTranslation('futboloran30');
} else if($row['varoname']=="Ev Sahibi Toplam Kaç Gol Atar ?"){
	$oran_isim_ver = getTranslation('futboloran31');
} else if($row['varoname']=="Deplasman Toplam Kaç Gol Atar ?"){
	$oran_isim_ver = getTranslation('futboloran32');
} else if($row['varoname']=="Ev Sahibi İlk Yarı Tam Gol Sayısı"){
	$oran_isim_ver = getTranslation('futboloran33');
} else if($row['varoname']=="Ev Sahibi İkinci Yarı Tam Gol Sayısı"){
	$oran_isim_ver = getTranslation('futboloran34');
} else if($row['varoname']=="Deplasman İlk Yarı Tam Gol Sayısı"){
	$oran_isim_ver = getTranslation('futboloran35');
} else if($row['varoname']=="Deplasman İkinci Yarı Tam Gol Sayısı"){
	$oran_isim_ver = getTranslation('futboloran36');
} else if($row['varoname']=="Ev Sahibi 1.Yarı 0.5 Gol Alt Üst"){
	$oran_isim_ver = getTranslation('futboloran37');
} else if($row['varoname']=="Ev Sahibi 1.Yarı 1.5 Gol Alt Üst"){
	$oran_isim_ver = getTranslation('futboloran38');
} else if($row['varoname']=="Deplasman 1.Yarı 0.5 Gol Alt Üst"){
	$oran_isim_ver = getTranslation('futboloran39');
} else if($row['varoname']=="Deplasman 1.Yarı 1.5 Gol Alt Üst"){
	$oran_isim_ver = getTranslation('futboloran40');
} else if($row['varoname']=="Evsahibi Toplam 1.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran41');
} else if($row['varoname']=="Deplasman Toplam 1.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran42');
} else if($row['varoname']=="​​​​​Evsahibi Her 2 yarıda Gol Atar ?"){
	$oran_isim_ver = getTranslation('futboloran43');
} else if($row['varoname']=="Deplasman Her 2 yarıda Gol Atar ?"){
	$oran_isim_ver = getTranslation('futboloran44');
} else if($row['varoname']=="Hangi Devrede Fazla Gol Olur"){
	$oran_isim_ver = getTranslation('futboloran45');
} else if($row['varoname']=="Evsahibi Hangi Devrede Fazla Gol Atar ?"){
	$oran_isim_ver = getTranslation('futboloran46');
} else if($row['varoname']=="Deplasman Hangi Devrede Fazla Gol Atar ?"){
	$oran_isim_ver = getTranslation('futboloran47');
} else if($row['varoname']=="Müsabakada kaç gol atılır? (0-4+)"){
	$oran_isim_ver = getTranslation('futboloran48');
} else if($row['varoname']=="Müsabakada kaç gol atılır? (0-5+)"){
	$oran_isim_ver = getTranslation('futboloran49');
} else if($row['varoname']=="Müsabakada kaç gol atılır? (0-6+)"){
	$oran_isim_ver = getTranslation('futboloran50');
} else if($row['varoname']=="Herhangi Bir Takım 1 Gol Farkla Kazanirmi ?"){
	$oran_isim_ver = getTranslation('futboloran51');
} else if($row['varoname']=="Herhangi Bir Takım 2 Gol Farkla Kazanirmi ?"){
	$oran_isim_ver = getTranslation('futboloran52');
} else if($row['varoname']=="Herhangi Bir Takım 3 Gol Farkla Kazanirmi ?"){
	$oran_isim_ver = getTranslation('futboloran53');
} else if($row['varoname']=="Maç Sonucu ve 2.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran54');
} else if($row['varoname']=="Maç Sonucu ve Karşılıklı Gol"){
	$oran_isim_ver = getTranslation('futboloran55');
} else if($row['varoname']=="İlk Yarı / Maç Sonucu"){
	$oran_isim_ver = getTranslation('futboloran56');
} else if($row['varoname']=="Maç Skoru"){
	$oran_isim_ver = getTranslation('futboloran57');
} else if($row['varoname']=="Çifte Şans"){
	$oran_isim_ver = getTranslation('futboloran58');
} else if($row['varoname']=="Toplam Sarı Kart 3.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran59');
} else if($row['varoname']=="Kırmızı Kart Çıkar mı?"){
	$oran_isim_ver = getTranslation('futboloran60');
} else if($row['varoname']=="Maçta Kaç Tane Penaltı Olur ?"){
	$oran_isim_ver = getTranslation('futboloran61');
} else if($row['varoname']=="1.Takim Sari Kart 1.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran62');
} else if($row['varoname']=="1.Takim Sari Kart 2.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran63');
} else if($row['varoname']=="1.Takim Sari Kart 3.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran64');
} else if($row['varoname']=="2.Takim Sari Kart 1.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran65');
} else if($row['varoname']=="2.Takim Sari Kart 2.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran66');
} else if($row['varoname']=="2.Takim Sari Kart 3.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran67');
} else if($row['varoname']=="Sarı Kart Toplam Tek/Çift"){
	$oran_isim_ver = getTranslation('futboloran68');
} else if($row['varoname']=="Hangi Takım Çok Sarı Kart Yer ?"){
	$oran_isim_ver = getTranslation('futboloran69');
} else if($row['varoname']=="Toplam Korner 5.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran70');
} else if($row['varoname']=="Toplam Korner 6.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran71');
} else if($row['varoname']=="Toplam Korner 7.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran72');
} else if($row['varoname']=="Toplam Korner 8.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran73');
} else if($row['varoname']=="Toplam Korner 9.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran74');
} else if($row['varoname']=="Toplam Korner 10.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran75');
} else if($row['varoname']=="Toplam Korner 11.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran76');
} else if($row['varoname']=="Toplam Korner 12.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran77');
} else if($row['varoname']=="Toplam Korner 13.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran78');
} else if($row['varoname']=="Toplam Korner 14.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran79');
} else if($row['varoname']=="Toplam Korner 15.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran80');
} else if($row['varoname']=="1.Takım Toplam Korner 2.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran81');
} else if($row['varoname']=="1.Takım Toplam Korner 3.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran82');
} else if($row['varoname']=="1.Takım Toplam Korner 4.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran83');
} else if($row['varoname']=="1.Takım Toplam Korner 5.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran84');
} else if($row['varoname']=="1.Takım Toplam Korner 6.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran85');
} else if($row['varoname']=="1.Takım Toplam Korner 7.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran86');
} else if($row['varoname']=="1.Takım Toplam Korner 8.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran87');
} else if($row['varoname']=="1.Takım Toplam Korner 9.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran88');
} else if($row['varoname']=="1.Takım Toplam Korner 10.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran89');
} else if($row['varoname']=="2.Takım Toplam Korner 2.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran90');
} else if($row['varoname']=="2.Takım Toplam Korner 3.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran91');
} else if($row['varoname']=="2.Takım Toplam Korner 4.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran92');
} else if($row['varoname']=="2.Takım Toplam Korner 5.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran93');
} else if($row['varoname']=="2.Takım Toplam Korner 6.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran94');
} else if($row['varoname']=="2.Takım Toplam Korner 7.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran95');
} else if($row['varoname']=="2.Takım Toplam Korner 8.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran96');
} else if($row['varoname']=="2.Takım Toplam Korner 9.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran97');
} else if($row['varoname']=="2.Takım Toplam Korner 10.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran98');
} else if($row['varoname']=="Korner Tek/Çift"){
	$oran_isim_ver = getTranslation('futboloran99');
} else if($row['varoname']=="Hangi Takım Çok Korner Kullanır ?"){
	$oran_isim_ver = getTranslation('futboloran100');
} else if($row['varoname']=="Maç Sonucu ve 3.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran101');
} else if($row['varoname']=="Ev Sahibi 0.5 Gol Alt Üst"){
	$oran_isim_ver = getTranslation('futboloran102');
} else if($row['varoname']=="Ev Sahibi 1.5 Gol Alt Üst"){
	$oran_isim_ver = getTranslation('futboloran103');
} else if($row['varoname']=="Ev Sahibi 2.5 Gol Alt Üst"){
	$oran_isim_ver = getTranslation('futboloran104');
} else if($row['varoname']=="Deplasman 0.5 Gol Alt Üst"){
	$oran_isim_ver = getTranslation('futboloran105');
} else if($row['varoname']=="Deplasman 1.5 Gol Alt Üst"){
	$oran_isim_ver = getTranslation('futboloran106');
} else if($row['varoname']=="Deplasman 2.5 Gol Alt Üst"){
	$oran_isim_ver = getTranslation('futboloran107');
} else if($row['varoname']=="Toplam Kaç Gol Atılır ?"){
	$oran_isim_ver = getTranslation('futboloran108');
} else if($row['varoname']=="1.Yarı Skoru"){
	$oran_isim_ver = getTranslation('futboloran109');
} else if($row['varoname']=="Ev Sahibi 1.Yarı 2.5 Gol Alt Üst"){
	$oran_isim_ver = getTranslation('futboloran110');
} else if($row['varoname']=="Deplasman 1.Yarı 2.5 Gol Alt Üst"){
	$oran_isim_ver = getTranslation('futboloran111');
} else if($row['varoname']=="İlk Yarıda Kaç Gol Olur ?"){
	$oran_isim_ver = getTranslation('futboloran112');
} else if($row['varoname']=="2.Yarıda Toplam Kaç Gol Olur ?"){
	$oran_isim_ver = getTranslation('futboloran113');
} else if($row['varoname']=="1. yarıda 1.golü hangi takım atar?"){
	$oran_isim_ver = getTranslation('futboloran114');
} else if($row['varoname']=="1. yarıda 2.golü hangi takım atar?"){
	$oran_isim_ver = getTranslation('futboloran115');
} else if($row['varoname']=="1.golü hangi takım atar?"){
	$oran_isim_ver = getTranslation('futboloran116');
} else if($row['varoname']=="2.golü hangi takım atar?"){
	$oran_isim_ver = getTranslation('futboloran117');
} else if($row['varoname']=="3.golü hangi takım atar?"){
	$oran_isim_ver = getTranslation('futboloran118');
} else if($row['varoname']=="4.golü hangi takım atar?"){
	$oran_isim_ver = getTranslation('futboloran119');
} else if($row['varoname']=="5.golü hangi takım atar?"){
	$oran_isim_ver = getTranslation('futboloran120');
} else if($row['varoname']=="6.golü hangi takım atar?"){
	$oran_isim_ver = getTranslation('futboloran121');
} else if($row['varoname']=="Toplam Sarı Kart 1.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran122');
} else if($row['varoname']=="Toplam Sarı Kart 2.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran123');
} else if($row['varoname']=="Toplam Sarı Kart 4.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran124');
} else if($row['varoname']=="Kırmızı Kart Çıkarmı ?"){
	$oran_isim_ver = getTranslation('futboloran125');
} else if($row['varoname']=="Kaç Penaltı Olur ?"){
	$oran_isim_ver = getTranslation('futboloran126');
} else if($row['varoname']=="1.Takım Toplam Sarı Kart 1.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran127');
} else if($row['varoname']=="1.Takım Toplam Sarı Kart 2.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran128');
} else if($row['varoname']=="1.Takım Toplam Sarı Kart 3.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran129');
} else if($row['varoname']=="2.Takım Toplam Sarı Kart 1.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran130');
} else if($row['varoname']=="2.Takım Toplam Sarı Kart 2.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran131');
} else if($row['varoname']=="2.Takım Toplam Sarı Kart 3.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran132');
} else if($row['varoname']=="Sarı Kart Tek/Çift"){
	$oran_isim_ver = getTranslation('futboloran133');
} else if($row['varoname']=="1.Takım Toplam Korner 2.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran134');
} else if($row['varoname']=="1.Takım Toplam Korner 3.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran135');
} else if($row['varoname']=="1.Takım Toplam Korner 4.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran136');
} else if($row['varoname']=="1.Takım Toplam Korner 5.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran137');
} else if($row['varoname']=="1.Takım Toplam Korner 6.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran138');
} else if($row['varoname']=="1.Takım Toplam Korner 7.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran139');
} else if($row['varoname']=="1.Takım Toplam Korner 8.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran140');
} else if($row['varoname']=="1.Takım Toplam Korner 9.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran141');
} else if($row['varoname']=="1.Takım Toplam Korner 10.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran142');
} else if($row['varoname']=="2.Takım Toplam Korner 2.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran143');
} else if($row['varoname']=="2.Takım Toplam Korner 3.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran144');
} else if($row['varoname']=="2.Takım Toplam Korner 4.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran145');
} else if($row['varoname']=="2.Takım Toplam Korner 5.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran146');
} else if($row['varoname']=="2.Takım Toplam Korner 6.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran147');
} else if($row['varoname']=="2.Takım Toplam Korner 7.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran148');
} else if($row['varoname']=="2.Takım Toplam Korner 8.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran149');
} else if($row['varoname']=="2.Takım Toplam Korner 9.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran150');
} else if($row['varoname']=="2.Takım Toplam Korner 10.5 Alt/Üst"){
	$oran_isim_ver = getTranslation('futboloran151');
} else if($row['varoname']=="Korner Tek/Çift"){
	$oran_isim_ver = getTranslation('futboloran152');
} else if($row['varoname']=="Hangi Takım Daha Çok Korner Kullanır ?"){
	$oran_isim_ver = getTranslation('futboloran153');
} else if($row['varoname']=="Kalan Süre Tahmini - skor:0-0"){
	$oran_isim_ver = getTranslation('futboloran154');
} else if($row['varoname']=="Kalan Süre Tahmini - skor:1-0"){
	$oran_isim_ver = getTranslation('futboloran155');
} else if($row['varoname']=="Kalan Süre Tahmini - skor:0-1"){
	$oran_isim_ver = getTranslation('futboloran156');
} else if($row['varoname']=="Kalan Süre Tahmini - skor:1-1"){
	$oran_isim_ver = getTranslation('futboloran157');
} else if($row['varoname']=="Kalan Süre Tahmini - skor:2-0"){
	$oran_isim_ver = getTranslation('futboloran158');
} else if($row['varoname']=="Kalan Süre Tahmini - skor:0-2"){
	$oran_isim_ver = getTranslation('futboloran159');
} else if($row['varoname']=="Kalan Süre Tahmini - skor:2-1"){
	$oran_isim_ver = getTranslation('futboloran160');
} else if($row['varoname']=="Kalan Süre Tahmini - skor:1-2"){
	$oran_isim_ver = getTranslation('futboloran161');
} else if($row['varoname']=="Kalan Süre Tahmini - skor:3-0"){
	$oran_isim_ver = getTranslation('futboloran162');
} else if($row['varoname']=="Kalan Süre Tahmini - skor:0-3"){
	$oran_isim_ver = getTranslation('futboloran163');
} else if($row['varoname']=="Kalan Süre Tahmini - skor:2-2"){
	$oran_isim_ver = getTranslation('futboloran164');
} else if($row['varoname']=="Kalan Süre Tahmini - skor:1-3"){
	$oran_isim_ver = getTranslation('futboloran165');
} else if($row['varoname']=="Kalan Süre Tahmini - skor:4-0"){
	$oran_isim_ver = getTranslation('futboloran166');
} else if($row['varoname']=="Kalan Süre Tahmini - skor:5-0"){
	$oran_isim_ver = getTranslation('futboloran167');
} else if($row['varoname']=="Kalan Süre Tahmini - skor:4-1"){
	$oran_isim_ver = getTranslation('futboloran168');
} else if($row['varoname']=="Kalan Süre Tahmini - skor:3-2"){
	$oran_isim_ver = getTranslation('futboloran169');
} else if($row['varoname']=="Kalan Süre Tahmini - skor:3-3"){
	$oran_isim_ver = getTranslation('futboloran170');
} else {
	$oran_isim_ver = $row['varoname'];
}

}

if($bilgisi_getir['status']=="1") { $bilgisini_ver = 0; } else { $bilgisini_ver = 1; }

?>

<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 50%;float: left;margin-top: 7px;"><?=$oran_isim_ver;?></label>
<div class="input-group" style="width: 50%;float: right;">
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($bilgisini_ver == 0) { ?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } else { ?>
<img src="players/img/akfpsf_1.png" alt="Durum" border="0">
<? } ?>
</div>
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($bilgisini_ver == 0) { ?>
<a href="javascript:;" onClick="oyunlari_degis_canli('<?=$row['varoname']; ?>','1','<?=$spor_tipi_ver;?>');"><font style="color:#0f8311;font-weight:bold;"><?=getTranslation('ajaxspordallariaktifet')?></font></a>
<? } else { ?>
<a href="javascript:;" onClick="oyunlari_degis_canli('<?=$row['varoname']; ?>','0','<?=$spor_tipi_ver;?>');"><font style="color:#f00;font-weight:bold;"><?=getTranslation('ajaxspordallaripasifet')?></font></a>
<? } ?>
</div>
</div>
</div>

<? } ?>

<? } ?>

<? }

if($a=="oyun_turleri") {

$oyuntip = gd("tip");

if($oyuntip==1){

$sor = sed_sql_query("select * from oran_tip_futbol where id!=''");

} else if($oyuntip==2){

$sor = sed_sql_query("select * from oran_tip_basketbol where id!=''");

} else if($oyuntip==3){

$sor = sed_sql_query("select * from oran_tip_tenis where id!=''");

} else if($oyuntip==4){

$sor = sed_sql_query("select * from oran_tip_voleybol where id!=''");

} else if($oyuntip==5){

$sor = sed_sql_query("select * from oran_tip_buzhokeyi where id!=''");

} else if($oyuntip==6){

$sor = sed_sql_query("select * from oran_tip_hentbol where id!=''");

} else {

$sor = sed_sql_query("select * from oran_tip_futbol where id!=''");

}

if(sed_sql_numrows($sor)<1) { ?>

<? } else { ?>

<script>
function asdes(order,as) {
$("#order").val(order);	
$("#ascdesc").val(as);
$("#suanval").val(1);
oyunturleri(1);
}
function oyunlari_degis_normal(tip_isim,oran_tip_id,durum,spor_tipi) {
var rand = Math.random();	
$.get('../ajax_superadmin.php?a=oyunlari_degis_normal&tip_isim='+tip_isim+'&oran_tip_id='+oran_tip_id+'&durum='+durum+'&spor_tipi='+spor_tipi+'',function(data) { oyunturleri(<?=$oyuntip;?>); });
}
</script>

<?

while($row=sed_sql_fetcharray($sor)) {

if($row['tip_isim']=="Müsabakada kaç gol atılır? (0-4+)"){
	$tip_isimle = "Müsabakada kaç gol atılır? (0-4 )";
} else if($row['tip_isim']=="Müsabakada kaç gol atılır? (0-5+)"){
	$tip_isimle = "Müsabakada kaç gol atılır? (0-5 )";
} else if($row['tip_isim']=="Müsabakada kaç gol atılır? (0-6+)"){
	$tip_isimle = "Müsabakada kaç gol atılır? (0-6 )";
} else {
	$tip_isimle = $row['tip_isim'];
}

if($oyuntip==1){

$bilgisi_getir = bilgi("select * from oyunlar_normal where spor_tipi='futbol' and tip_isim='".$tip_isimle."' and bayi_id='".$ub['id']."'");

$spor_tipi_ver = "futbol";

} else if($oyuntip==2){

$bilgisi_getir = bilgi("select * from oyunlar_normal where spor_tipi='basketbol' and tip_isim='".$tip_isimle."' and bayi_id='".$ub['id']."'");

$spor_tipi_ver = "basketbol";

} else if($oyuntip==3){

$bilgisi_getir = bilgi("select * from oyunlar_normal where spor_tipi='tenis' and tip_isim='".$tip_isimle."' and bayi_id='".$ub['id']."'");

$spor_tipi_ver = "tenis";

} else if($oyuntip==4){

$bilgisi_getir = bilgi("select * from oyunlar_normal where spor_tipi='voleybol' and tip_isim='".$tip_isimle."' and bayi_id='".$ub['id']."'");

$spor_tipi_ver = "voleybol";

} else if($oyuntip==5){

$bilgisi_getir = bilgi("select * from oyunlar_normal where spor_tipi='buzhokeyi' and tip_isim='".$tip_isimle."' and bayi_id='".$ub['id']."'");

$spor_tipi_ver = "buzhokeyi";

} else if($oyuntip==6){

$bilgisi_getir = bilgi("select * from oyunlar_normal where spor_tipi='hentbol' and tip_isim='".$tip_isimle."' and bayi_id='".$ub['id']."'");

$spor_tipi_ver = "hentbol";

} else {

$bilgisi_getir = bilgi("select * from oyunlar_normal where spor_tipi='futbol' and tip_isim='".$tip_isimle."' and bayi_id='".$ub['id']."'");

$spor_tipi_ver = "futbol";

}

if($bilgisi_getir['status']=="1") { $bilgisini_ver = 0; } else { $bilgisini_ver = 1; }

?>

<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 50%;float: left;margin-top: 7px;">
<? if($oyuntip==1){ ?>
<?=getTranslation('futboloran'.$row['id'].'')?>
<? } else if($oyuntip==2){ ?>
<?=getTranslation('basketboloran'.$row['id'].'')?>
<? } else if($oyuntip==3){ ?>
<?=getTranslation('tenisoran'.$row['id'].'')?>
<? } else if($oyuntip==4){ ?>
<?=getTranslation('voleyboloran'.$row['id'].'')?>
<? } else if($oyuntip==5){ ?>
<?=getTranslation('buzhokeyioran'.$row['id'].'')?>
<? } else if($oyuntip==6){ ?>
<?=getTranslation('hentboloran'.$row['id'].'')?>
<? } ?>
</label>
<div class="input-group" style="width: 50%;float: right;">
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($bilgisini_ver == 0) { ?>
<img src="players/img/akfpsf_2.png" alt="Durum" border="0">
<? } else { ?>
<img src="players/img/akfpsf_1.png" alt="Durum" border="0">
<? } ?>
</div>
<div class="switch" style="width: 50%;float: left;text-align: left;">
<? if($bilgisini_ver == 0) { ?>
<a href="javascript:;" onClick="oyunlari_degis_normal('<?=$row['tip_isim']; ?>','<?=$row['id']; ?>','1','<?=$spor_tipi_ver;?>');"><font style="color:#0f8311;font-weight:bold;"><?=getTranslation('ajaxspordallariaktifet')?></font></a>
<? } else { ?>
<a href="javascript:;" onClick="oyunlari_degis_normal('<?=$row['tip_isim']; ?>','<?=$row['id']; ?>','0','<?=$spor_tipi_ver;?>');"><font style="color:#f00;font-weight:bold;"><?=getTranslation('ajaxspordallaripasifet')?></font></a>
<? } ?>
</div>
</div>
</div>

<? } ?>

<? } ?>

<? }

if($a=="karalistegerial") {

$id = gd("id");

$bayilerim = benimbayilerim($ub['id']);

$bayi_array = explode(",",$bayilerim);
if(!in_array($id,$bayi_array)) { die("<div class='bos'>Cok guzel hareketler bunlar ;*</div>"); }

uyelerigerial($id);

if(file_exists("sistem/natoservers/hesap_sahibi_id_".$ub['id'].".xml")) {

unlink("sistem/natoservers/hesap_sahibi_id_".$ub['id'].".xml");

benimbayilerim($ub['id']);

}

}

if($a=="karaliste") {

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

$sor = sed_sql_query("select * from kullanici where hesap_sahibi_id='$id' and root='1' and sil='0' $ordered");

if(sed_sql_numrows($sor)<1) { ?>

<table class="tablesorter">
<tbody>
<tr>
<th><?=getTranslation('ajaxkaraliste1')?></th>
</tr>
</tbody></table>

<table class="tablesorter">
<thead>
<tr>
<th>#</th>
<th><?=getTranslation('ajaxkaraliste2')?></th>
<th><?=getTranslation('ajaxkaraliste3')?></th>
<th><?=getTranslation('ajaxkaraliste4')?></th>
<th><?=getTranslation('ajaxkaraliste5')?></th>
<th><?=getTranslation('ajaxkaraliste6')?></th>
<th><?=getTranslation('ajaxkaraliste7')?></th>
</tr>
</thead>
<tbody>
<tr>
<td colspan="9">
<div class="notice info">
<ul class="list-unordered list-checked2">
<li><?=getTranslation('ajaxkaraliste8')?></li>
<li><?=getTranslation('ajaxkaraliste9')?></li>
<li><?=getTranslation('ajaxkaraliste10')?></li>
<li><?=getTranslation('ajaxkaraliste11')?></li>
<li><?=getTranslation('ajaxkaraliste12')?></li>
<li><?=getTranslation('ajaxkaraliste13')?><?=$ub['alt_limit'];?><?=getTranslation('ajaxkaraliste14')?></li>

</ul>
</div>
</td>
</tr>
</tbody>
</table>

<? } else { 

$obilgi = bilgi("select * from kullanici where id='$id'");

?>

<script>

function asdes(order,as) {

$("#order").val(order);	

$("#ascdesc").val(as);

$("#suanval").val(1);

karaliste(<?=$id;?>);

}

function gerialkaraliste(id,uname) {

var rand = Math.random();

if(confirm(''+uname+' adlı kullanıcıyı ve ona bağlı alt kullanıcıları geri almak istediğinizden emin misiniz?')) {

$.get('../ajax_superadmin.php?a=karalistegerial&id='+id+'&rand='+rand+'',function(data) { $("#users").html(data); karaliste('<?=$id;?>'); });	

}	

}

</script>

<table class="tablesorter">
<tbody>
<tr>
<th><?=getTranslation('ajaxkaraliste1')?></th>
</tr>
</tbody></table>

<table class="tablesorter">
<thead>
<tr>
<th>#</th>
<th><?=getTranslation('ajaxkaraliste2')?></th>
<th><?=getTranslation('ajaxkaraliste3')?></th>
<th><?=getTranslation('ajaxkaraliste4')?></th>
<th><?=getTranslation('ajaxkaraliste5')?></th>
<th><?=getTranslation('ajaxkaraliste6')?></th>
<th><?=getTranslation('ajaxkaraliste7')?></th>
</tr>
</thead>
<tbody>

<?

while($row=sed_sql_fetcharray($sor)) {

$alttotal=sed_sql_numrows(sed_sql_query("select hesap_sahibi_id from kullanici where hesap_sahibi_id='$row[id]' and root='0'"));

?>


<tr class="c">

<td style="text-align:center"><?=$row['id']; ?></td>
<td style="text-align:center"><?=$row['username']; ?></td>
<td style="text-align:center"><?=$row['hatirlatmaad']; ?></td>
<td style="text-align:center"><?=hesap_tipi($row['id']); ?></td>
<td style="text-align:center"><?=nf($row['bakiye']); ?> <?=getTranslation('parabirimi')?></td>
<td style="text-align:center"><?=date("d.m.Y H:i:s",$row['silinme_tarihi']); ?></td>


<? if($ub['alt_sinir'] > $row['alt_sinir']) { ?>

<td style="text-align:center" width="16">
<a class="grid" title="<?=getTranslation('ajaxkaraliste15')?>" href="javascript:;" onClick="gerialkaraliste('<?=$row['id']; ?>','<?=$row['username']; ?>');">
<img src="players/img/gerial.png" style="width:70%;" alt="<?=getTranslation('ajaxkaraliste15')?>" border="0"></a>
</td>

<? } ?>

</tr>

<? } ?>


<tr>
<td colspan="9">
<div class="notice info">
<ul class="list-unordered list-checked2">
<li><?=getTranslation('ajaxkaraliste8')?></li>
<li><?=getTranslation('ajaxkaraliste9')?></li>
<li><?=getTranslation('ajaxkaraliste10')?></li>
<li><?=getTranslation('ajaxkaraliste11')?></li>
<li><?=getTranslation('ajaxkaraliste12')?></li>
<li><?=getTranslation('ajaxkaraliste13')?><?=$ub['alt_limit'];?><?=getTranslation('ajaxkaraliste14')?></li>

</ul>
</div>
</td>
</tr>
</tbody>
</table>

<? }

}

if($a=="girislog"){

$userid = gd("bayiadi");

$pageper = 50;

$benimbayilerim = benimbayilerim($ub['id']);

$bayi_array = explode(",",$benimbayilerim);


if(strstr($userid,"-plus")) { 

$idbul = explode("-",$userid); $idalti = $idbul[0]; 

$onunkiler = benimbayilerim($idalti);

$userid = $idalti;

} 

if(!empty($userid) && in_array($userid,$bayi_array)) { 

if($onunkiler) {

	$user_ekle = "user_id in ($onunkiler)";

} else {

	$user_ekle = "user_id='$userid'"; 

}

} else { 

$user_ekle = "user_id in ($benimbayilerim)"; 

}

$bayilerim = benimbayilerim($ub['id']);

$gelen_sayfa = (isset($_GET['sayfa']) && $_GET['sayfa'] !='' ) ? intval($_GET['sayfa']) : 1;

$limit = $pageper;

$s_s = 10;

$s_sor = sed_sql_query("select count(id) from login_data where $user_ekle") or trigger_error(sed_sql_error(),E_USER_ERROR);

$satir = sed_sql_result($s_sor,0);

sed_sql_freeresult($s_sor);

if($satir >0){//sonuç varsa

$baslama = ($gelen_sayfa > 1) ? (($gelen_sayfa -1) * $limit) : 0 ;

$sayfa_kac = $satir/$limit;

$sayfa_sayisi = ($satir % $limit != 0) ? intval($sayfa_kac)+1 : intval($sayfa_kac);

$basla=( $satir >= $baslama ) ? $baslama : 0 ;

unset( $sayfa_kac, $baslama );

$sor = sed_sql_query("select * from login_data where $user_ekle order by zaman desc limit $basla,$limit");

$i=1;

$style='';

$toplam = sed_sql_numrows($sor);

if(sed_sql_numrows($sor)<1) { ?>

<div class="space_9 clear"></div>

<div class="space_9 clear"></div>

<div class="new_sheet cf panelHead" style="margin-top: 0px;height: 25px;line-height: 25px;text-align: center;background: #fff;border-bottom: 3px solid #ef8107;border-top: 3px solid #ef8107;">
<?=getTranslation('ajaxgirislog1')?>
</div>

<? } else { ?>

<table class="tablesorter">
<tbody>
<tr>
<td>
<div class="notice info">
<ul class="list-unordered list-checked2">
<li style="color:#000"><?=getTranslation('ajaxgirislog2')?> : <strong style="color:#f00;font-weight:bold;font-size:15px;"><?=$toplam;?></strong></li>
</ul>
</div>
</td>
</tr>
</tbody>
</table>
<table id="tablesorter" class="tablesorter">
<thead>
<tr>
<th style="text-align:left;" class="header"><?=getTranslation('ajaxgirislog3')?></th>
<th class="header"><?=getTranslation('ajaxgirislog4')?></th>
<th class="header"><?=getTranslation('ajaxgirislog5')?></th>
<th class="header"><?=getTranslation('ajaxgirislog6')?></th>
<th class="header"></th>
</tr>
</thead>

<? while($row=sed_sql_fetcharray($sor)) { ?>

<tbody>
<tr>
<td><?=$row['login_user']; ?></td>
<td style="text-align:center"><?=getTranslation('ajaxgirislog7')?></td>
<td style="text-align:center"><?=date('d.m.Y H:i:s',$row['zaman']);?></td>
<td style="text-align:center"><?=$row['login_ip']; ?></td>
<td width="16">
<a target="_blank" class="grid" href="https://ipinfo.io/<?=$row['login_ip']; ?>" title="<?=getTranslation('ajaxgirislog8')?>" rel="external">
<img src="players/img/bayiler/ip.png" alt="<?=getTranslation('ajaxgirislog9')?>" border="0">
</a>
</td>
</tr>
</tbody>

<? } ?>

</table>

<div class="space_9"></div>
<div class="space"></div>

<span>
<div class="sheet_body_sub on cf">
<div class="main_box pager cf">
<div class="left" style="width: 100%">
<div class="div_center">


<? $style = ($style=='') ? '2' : '';
$i++; } ?>

<? 
		$hangi_sayfa= ($gelen_sayfa > 0)? $gelen_sayfa : 1 ;
		echo '<div class="inline" style="height: 38px;line-height: 24px;"><nav class="zipagin-light light-green">';	
	
	
			$alt= ($gelen_sayfa - $s_s);
			if($sayfa_sayisi <= $s_s || $gelen_sayfa <= $s_s ) {$alt=1;} 
			$ust= (($gelen_sayfa + $s_s)< $sayfa_sayisi ) ? ($gelen_sayfa + $s_s) : ($sayfa_sayisi);	
			echo ($gelen_sayfa > 1 )? '<a class="" href="javascript:;" onclick="girisloggetir(1,1);" id="sayfaveri">'.getTranslation('ajaxtumkuponlarim30').'</a><a class="" href="javascript:;" id="sayfaveri" onclick="girisloggetir(1,'.($gelen_sayfa -1).');">« '.getTranslation('ajaxtumkuponlarim31').'</a>':' ';
			for($i=$alt; $i<=$ust ;$i++){		
				echo ($i != $gelen_sayfa ) ? '<a class="" href="javascript:;" id="sayfaveri" onclick="girisloggetir(1,'.$i.');">'.$i.'</a>' : '<span>'.$i.'</span>';
				}
			echo ($gelen_sayfa < $sayfa_sayisi)? '<a class="" href="javascript:;" id="sayfaveri" onclick="girisloggetir(1,'.($gelen_sayfa +1).');">'.getTranslation('ajaxtumkuponlarim32').' »</a><a class="" href="javascript:;" id="sayfaveri" onclick="girisloggetir(1,'.$sayfa_sayisi.');">'.getTranslation('ajaxtumkuponlarim33').'</a>' :'';
			echo '</nav></div>';
?>

</div>
</div>
</div>
</div>
</span>

<? } else { ?>

<div class="space_9 clear"></div>

<div class="space_9 clear"></div>

<div class="new_sheet cf panelHead" style="margin-top: 0px;height: 25px;line-height: 25px;text-align: center;background: #fff;border-bottom: 3px solid #ef8107;border-top: 3px solid #ef8107;">
<?=getTranslation('ajaxgirislog1')?>
</div>

<? } ?>

<table class="tablesorter">
<tbody><tr>
<th><?=getTranslation('ajaxgirislog10')?></th>
</tr>
<tr>
<td></td>
</tr>
<tr>
<td>
<div class="notice info">
<ul class="list-unordered list-checked2">
<li><?=getTranslation('ajaxgirislog11')?></li>
<li><?=getTranslation('ajaxgirislog12')?></li>
<li><?=getTranslation('ajaxgirislog13')?></li>
</ul>
</div>
</td>
</tr>
</tbody>
</table>
</div>

<? }

if($a=="kuponraporlari") {

$tarih1 = basla_time(gd("tarih1"));

$tarih2 = bitir_time(gd("tarih2"));

$benimbayilerim = benimbayilerim($ub['id']);

$user_ekle = "user_id in ($benimbayilerim)"; 

if($hesapdurum=="1") { $hesap_ekle = "and hesap_kesim_zaman=''"; } else { $hesap_ekle = ""; }

$sqladderone = "$user_ekle and casino='0' and kupon_time between '$tarih1' and '$tarih2' group by user_id order by kupon_time asc";

$sor = sed_sql_query("select * from kuponlar where $sqladderone");

$sqladder = "$user_ekle and casino='0' and kupon_time between '$tarih1' and '$tarih2'";

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

$satir_toplam = $toplam_odenen['toplam']-$toplam_iptal['toplam']-$toplam_kazanan['toplam']-$toplam_devam['toplam'];

$satir_toplam_genel = $satir_toplam_genel+$satir_toplam;

if(sed_sql_numrows($sor)<1) { ?>

<div class="card-block p-0">
<div class="table-responsive">
<table class="table mb-0">
<thead>
<tr>
<th colspan="8">
<span class="tag tag-primary" style="width:100px;text-align:left"><?=getTranslation('yeniyerler_kasa50')?></span> <?=date("Y-m-d",$tarih1);?> - <?=date("Y-m-d",$tarih2);?><br>
<span class="tag tag-info" style="width:100px;text-align:left"><?=getTranslation('yeniyerler_kasa67')?></span> <span id="ta">0.00</span><br>
<span class="tag tag-warning" style="width:100px;text-align:left"><?=getTranslation('yeniyerler_kasa68')?></span> <span id="tcbk">0.00</span><br>
<span class="tag tag-danger" style="width:100px;text-align:left"><?=getTranslation('yeniyerler_kasa69')?></span> <span id="tky">0.00</span><br>
<span class="tag tag-success" style="width:100px;text-align:left"><?=getTranslation('yeniyerler_kasa70')?></span> <span id="tkaz">0.00</span><br>
<span class="tag tag-info" style="width:100px;text-align:left"><?=getTranslation('yeniyerler_kasa71')?></span> <span id="tiade">0.00</span><br>
<span class="tag tag-success" style="width:100px;text-align:left"><?=getTranslation('yeniyerler_kasa72')?></span> <span id="tres">0.00</span></th>
</tr>
<tr>
<th width="10%"><?=getTranslation('yeniyerler_kasa73')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa74')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa75')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa76')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa77')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa78')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa79')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa80')?></th>
</tr>
</thead>
<tbody id="calcall">

<? } else { ?>

<div class="card-block p-0">
<div class="table-responsive">
<table class="table mb-0">
<thead>
<tr>
<th colspan="8">
<span class="tag tag-primary" style="width:100px;text-align:left"><?=getTranslation('yeniyerler_kasa50')?></span> <?=date("Y-m-d",$tarih1);?> - <?=date("Y-m-d",$tarih2);?><br>
<span class="tag tag-info" style="width:100px;text-align:left"><?=getTranslation('yeniyerler_kasa67')?></span> <span id="ta"><?=nf($top_odenen-$top_iptal);?></span><br>
<span class="tag tag-warning" style="width:100px;text-align:left"><?=getTranslation('yeniyerler_kasa68')?></span> <span id="tcbk"><?=nf($top_devam);?></span><br>
<span class="tag tag-danger" style="width:100px;text-align:left"><?=getTranslation('yeniyerler_kasa69')?></span> <span id="tky"><?=nf($top_kaybeden);?></span><br>
<span class="tag tag-success" style="width:100px;text-align:left"><?=getTranslation('yeniyerler_kasa70')?></span> <span id="tkaz"><?=nf($top_kazanan);?></span><br>
<span class="tag tag-info" style="width:100px;text-align:left"><?=getTranslation('yeniyerler_kasa71')?></span> <span id="tiade"><?=nf($top_iptal);?></span><br>
<span class="tag tag-success" style="width:100px;text-align:left"><?=getTranslation('yeniyerler_kasa72')?></span> <span id="tres"><?=nf($satir_toplam_genel);?></span></th>
</tr>
<tr>
<th width="10%"><?=getTranslation('yeniyerler_kasa73')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa74')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa75')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa76')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa77')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa78')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa79')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa80')?></th>
</tr>
</thead>
<tbody id="calcall">

<? while($ass=sed_sql_fetcharray($sor)) { 

$sqladderbayi = "$user_ekle and casino='0' and kupon_time between '$tarih1' and '$tarih2' and user_id='$ass[user_id]'";

// toplam yatırılan

$toplam_odenen_bayi = bilgi("select SUM(yatan) as toplam from kuponlar where $sqladderbayi");

$toplam_odenen_adet_bayi = sed_sql_numrows(sed_sql_query("select * from kuponlar where $sqladderbayi"));

$top_odenen_bayi = $top_odenen+$toplam_odenen['toplam'];

$top_odenen_adet_bayi = $top_odenen_adet+$toplam_odenen_adet;

// toplam kazanan

$toplam_kazanan_bayi = bilgi("select SUM(tutar) as toplam from kuponlar where $sqladderbayi and durum='2'");

$toplam_kazanan_adet_bayi = sed_sql_numrows(sed_sql_query("select * from kuponlar where $sqladderbayi and durum='2'"));

$top_kazanan_bayi = $top_kazanan+$toplam_kazanan['toplam'];

$top_kazanan_adet_bayi = $top_kazanan_adet+$toplam_kazanan_adet;

// toplam kaybeden

$toplam_kaybeden_bayi = bilgi("select SUM(yatan) as toplam from kuponlar where $sqladderbayi and durum='3'");

$toplam_kaybeden_adet_bayi = sed_sql_numrows(sed_sql_query("select * from kuponlar where $sqladderbayi and durum='3'"));

$top_kaybeden_bayi = $top_kaybeden+$toplam_kaybeden['toplam'];

$top_kaybeden_adet_bayi = $top_kaybeden_adet+$toplam_kaybeden_adet;

// toplam devam

$toplam_devam_bayi = bilgi("select SUM(yatan) as toplam from kuponlar where $sqladderbayi and durum='1'");

$toplam_devam_adet_bayi = sed_sql_numrows(sed_sql_query("select * from kuponlar where $sqladderbayi and durum='1'"));

$top_devam_bayi = $top_devam+$toplam_devam['toplam'];

$top_devam_adet_bayi = $top_devam_adet+$toplam_devam_adet;

// toplam iptal

$toplam_iptal_bayi = bilgi("select SUM(yatan) as toplam from kuponlar where $sqladderbayi and durum='4'");

$toplam_iptal_adet_bayi = sed_sql_numrows(sed_sql_query("select * from kuponlar where $sqladderbayi and durum='4'"));

$top_iptal_bayi = $top_iptal+$toplam_iptal['toplam'];

$top_iptal_adet_bayi = $top_iptal_adet+$toplam_iptal_adet;

$satir_toplam_bayi = $toplam_odenen_bayi['toplam']-$toplam_iptal_bayi['toplam']-$toplam_kazanan_bayi['toplam']-$toplam_devam_bayi['toplam'];

?>

<tr>
<td width="10%"><code>BK<?=$ass['user_id']; ?></code></td>
<td width="10%"><a href="detailed.php?id=<?=$ass['user_id']; ?>" class="tag tag-success"><?=$ass['username']; ?></a></td>
<td width="10%"><code><?=$toplam_odenen_adet_bayi;?>/<?=nf($toplam_odenen_bayi['toplam']); ?></code></td>
<td width="10%"><code><?=$toplam_devam_adet_bayi;?>/<?=nf($toplam_devam_bayi['toplam']); ?></code></td>
<td width="10%"><code><?=$toplam_kaybeden_adet_bayi;?>/<?=nf($toplam_kaybeden_bayi['toplam']); ?></code></td>
<td width="10%"><code><?=$toplam_kazanan_adet_bayi;?>/<?=nf($toplam_kazanan_bayi['toplam']); ?></code></td>
<td width="10%"><code><?=$toplam_iptal_adet_bayi;?>/<?=nf($toplam_iptal_bayi['toplam']); ?></code></td>
<td width="10%"><code><? if($satir_toplam_bayi<0) { ?>-<? } ?><?=nf($satir_toplam_bayi);?></code></td>
</tr>

<? } ?>

<? } ?>

</tbody>
</table>
</div>
</div>

<? }

if($a=="bakiyeraporu") {

$tarih1 = basla_time(gd("tarih1"));

$tarih2 = bitir_time(gd("tarih2"));

$benimbayilerim = benimbayilerimkasa($ub['id']);

$user_ekle = "user_id in ($benimbayilerim)"; 

$sqladderone = "$user_ekle and user_id not in ($ub[id]) and zaman between '$tarih1' and '$tarih2' group by user_id";

$sor = sed_sql_query("select * from hesap_hareket where $sqladderone");

$sqladder = "$user_ekle and zaman between '$tarih1' and '$tarih2'";

$toplam_atilan = bilgi("select SUM(tutar) as toplam from hesap_hareket where $sqladder and username!='$ub[username]' and tip='ekle'");

$toplam_cekilen = bilgi("select SUM(tutar) as toplam from hesap_hareket where $sqladder and username!='$ub[username]' and tip='cikar'");

if(sed_sql_numrows($sor)<1) { ?>

<div class="card-block p-0">
<div class="table-responsive">
<table class="table mb-0">
<thead>
<tr>
<th colspan="8">
<span class="tag tag-primary" style="width:100px;text-align:left"><?=getTranslation('yeniyerler_kasa50')?></span> <?=date("Y-m-d",$tarih1);?> - <?=date("Y-m-d",$tarih2);?><br>
<span class="tag tag-info" style="width:100px;text-align:left"><?=getTranslation('yeniyerler_kasa67')?></span> <span id="ta">0.00</span><br>
<span class="tag tag-danger" style="width:100px;text-align:left"><?=getTranslation('yeniyerler_kasa82')?></span> <span id="tky">0.00</span><br>
<span class="tag tag-success" style="width:100px;text-align:left"><?=getTranslation('yeniyerler_kasa80')?></span> <span id="tres">0.00</span></th>
</tr>
<tr>
<th width="10%"><?=getTranslation('yeniyerler_kasa73')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa74')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa83')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa84')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa80')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa85')?></th>
</tr>
</thead>
<tbody id="calcall">

<? } else { ?>

<div class="card-block p-0">
<div class="table-responsive">
<table class="table mb-0">
<thead>
<tr>
<th colspan="8">
<span class="tag tag-primary" style="width:100px;text-align:left"><?=getTranslation('yeniyerler_kasa50')?></span> <?=date("Y-m-d",$tarih1);?> - <?=date("Y-m-d",$tarih2);?><br>
<span class="tag tag-info" style="width:100px;text-align:left"><?=getTranslation('yeniyerler_kasa67')?></span> <span id="ta"><?=nf($toplam_atilan['toplam']); ?></span><br>
<span class="tag tag-danger" style="width:100px;text-align:left"><?=getTranslation('yeniyerler_kasa82')?></span> <span id="tky"><?=nf($toplam_cekilen['toplam']); ?></span><br>
<span class="tag tag-success" style="width:100px;text-align:left"><?=getTranslation('yeniyerler_kasa80')?></span> <span id="tres"><? if($toplam_atilan['toplam']>$toplam_cekilen['toplam']){ ?><?=nf($toplam_atilan['toplam']-$toplam_cekilen['toplam']); ?><? } else { ?><?=nf($toplam_cekilen['toplam']-$toplam_atilan['toplam']); ?><? } ?></span></th>
</tr>
<tr>
<th width="10%"><?=getTranslation('yeniyerler_kasa73')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa74')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa83')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa84')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa80')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa85')?></th>
</tr>
</thead>
<tbody id="calcall">

<? while($ass=sed_sql_fetcharray($sor)) { 

$sqladderbayi = "$user_ekle and zaman between '$tarih1' and '$tarih2' and user_id='$ass[user_id]'";

$toplam_atilan_bayi = bilgi("select SUM(tutar) as toplam from hesap_hareket where $sqladderbayi and tip='ekle'");

$toplam_cekilen_bayi = bilgi("select SUM(tutar) as toplam from hesap_hareket where $sqladderbayi and tip='cikar'");

$satir_toplam_bayi = $toplam_atilan_bayi['toplam']-$toplam_cekilen_bayi['toplam'];

$kullanicibilgisi = bilgi("select bakiye from kullanici where id='$ass[user_id]'");

?>

<tr>
<td width="10%"><code>BK<?=$ass['user_id']; ?></code></td>
<td width="10%"><a href="detailed.php?id=<?=$ass['user_id']; ?>" class="tag tag-success"><?=$ass['username']; ?></a></td>
<td width="10%"><code><?=nf($toplam_atilan_bayi['toplam']); ?></code></td>
<td width="10%"><code><?=nf($toplam_cekilen_bayi['toplam']); ?></code></td>
<td width="10%"><code><?=nf($satir_toplam_bayi);?></code></td>
<td width="10%"><code><?=nf($kullanicibilgisi['bakiye']);?></code></td>
</tr>

<? } ?>

<? } ?>

</tbody>
</table>
</div>
</div>

<? }

if($a=="hesaprapor") {

$tarih1 = basla_time(gd("tarih1"));

$tarih2 = bitir_time(gd("tarih2"));

$datele_tarih1 = date("Y-m-d",$tarih1);

$datele_tarih2 = date("Y-m-d",$tarih2);

$sor = sed_sql_query("select * from kullanici where hesap_sahibi_id='".$ub['id']."' and root='0'");

$toplam_atilan_bakiye = bilgi("SELECT SUM(CASE WHEN id!='' THEN tutar END) as toplamatilanbakiye FROM hesap_hareket WHERE islemi_yapan='$ub[username]' and username!='$ub[username]' and tip='ekle' and zaman between '$tarih1' and '$tarih2'");

$toplam_cekilen_bakiye = bilgi("SELECT SUM(CASE WHEN id!='' THEN tutar END) as toplamcekilenbakiye FROM hesap_hareket WHERE islemi_yapan='$ub[username]' and username!='$ub[username]' and tip='cikar' and zaman between '$tarih1' and '$tarih2'");

?>

<div class="card-block p-0">
<div class="table-responsive">
<table class="table mb-0">
<thead>
<tr>
<th colspan="7">
<span class="tag tag-primary" style="width:100px;text-align:left"><?=getTranslation('yeniyerler_kasa50')?></span> <?=$datele_tarih1;?> - <?=$datele_tarih2;?><br>
<span class="tag tag-info" style="width:100px;text-align:left"><?=getTranslation('yeniyerler_kasa51')?></span> <span id="ta"><?=nf($toplam_atilan_bakiye['toplamatilanbakiye']);?></span><br>
<span class="tag tag-danger" style="width:100px;text-align:left"><?=getTranslation('yeniyerler_kasa52')?></span> <span id="tc"><?=nf($toplam_cekilen_bakiye['toplamcekilenbakiye']);?></span><br>
<span class="tag tag-success" style="width:100px;text-align:left"><?=getTranslation('yeniyerler_kasa53')?></span> <span id="tf">

<? if($toplam_atilan_bakiye['toplamatilanbakiye']>$toplam_cekilen_bakiye['toplamcekilenbakiye']){?>

<?=nf($toplam_atilan_bakiye['toplamatilanbakiye']-$toplam_cekilen_bakiye['toplamcekilenbakiye']);?>

<? } else { ?>

<?=nf($toplam_cekilen_bakiye['toplamcekilenbakiye']-$toplam_atilan_bakiye['toplamatilanbakiye']);?>

<? } ?>

</span></th>
</tr>
<tr>
<th width="10%"><?=getTranslation('yeniyerler_kasa54')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa55')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa56')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa57')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa58')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa59')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa60')?></th>
</tr>
</thead>
<tbody id="calcall">

<? while($row=sed_sql_fetcharray($sor)) { ?>

<?
$toplam_atilan_bakiye_user = bilgi("SELECT SUM(CASE WHEN id!='' THEN tutar END) as toplamatilanbakiye FROM hesap_hareket WHERE user_id='$row[id]' and islemi_yapan='$ub[username]' and tip='ekle' and zaman between '$tarih1' and '$tarih2'");

$toplam_cekilen_bakiye_user = bilgi("SELECT SUM(CASE WHEN id!='' THEN tutar END) as toplamcekilenbakiye FROM hesap_hareket WHERE user_id='$row[id]' and islemi_yapan='$ub[username]' and tip='cikar' and zaman between '$tarih1' and '$tarih2'");
?>

<tr>
<td width="10%"><a href="javascript:;" onclick="togledetail(<?=$row['id'];?>);"><code><i class="fa fa-eye"></i></code> <code>BK<?=$row['id'];?></code></a></td>
<td width="10%"><a href="detailed.php?id=<?=$row['id'];?>" class="tag tag-success"><?=$row['username'];?></a></td>
<td width="10%"><code><?=nf($toplam_atilan_bakiye_user['toplamatilanbakiye']);?></code></td>
<td width="10%"><code><?=nf($toplam_cekilen_bakiye_user['toplamcekilenbakiye']);?></code></td>
<td width="10%"><code>

<? if($toplam_atilan_bakiye_user['toplamatilanbakiye']>$toplam_cekilen_bakiye_user['toplamcekilenbakiye']){?>

<?=nf($toplam_atilan_bakiye_user['toplamatilanbakiye']-$toplam_cekilen_bakiye_user['toplamcekilenbakiye']);?>

<? } else { ?>

<?=nf($toplam_cekilen_bakiye_user['toplamcekilenbakiye']-$toplam_atilan_bakiye_user['toplamatilanbakiye']);?>

<? } ?>

</code></td>
<td width="10%"><code><?=nf($row['bakiye']);?></code></td>
<td><a href="javascript:;" class="tag tag-warning" onclick="removeamount(<?=$row['id'];?>);"> <i class="fa fa-money"></i> </a></td>
</tr>



<tr colspan="7" id="dets_<?=$row['id'];?>" style="display: none;">
<th width="10%"></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa61')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa62')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa63')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa64')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa65')?></th>
<th width="10%"></th>
</tr>

<? 
$iceriksor = sed_sql_query("select * from hesap_hareket where user_id='$row[id]' and islemi_yapan='$ub[username]' and tip IN ('ekle','cikar') and zaman between '$tarih1' and '$tarih2'");
while($arrow=sed_sql_fetcharray($iceriksor)) {
?>


<tr id="det_<?=$row['id'];?>" class="table-<? if($arrow['tip']=="cikar"){ ?>danger<? } else { ?>success<? } ?>" style="display: none;">
<td width="10%"><?=date("d-m-Y H:i",$arrow['zaman']);?></td>
<td><span class="tag tag-default"><?=getTranslation('yeniyerler_kasa66')?></span> <span class="tag tag-<? if($arrow['tip']=="cikar"){ ?>danger<? } else { ?>success<? } ?>"><? if($arrow['tip']=="cikar"){ ?><?=getTranslation('yeniyerler_kasa52')?><? } else { ?><?=getTranslation('yeniyerler_kasa51')?><? } ?></span></td>
<td><?=$arrow['username'];?> (BK<?=$arrow['user_id'];?>)</td>
<td><span class="amount"><code><? if($arrow['tip']=="cikar"){ ?>-<? } ?><?=nf($arrow['tutar']);?></code></span></td>
<td width="10%"><code><?=nf($arrow['onceki_tutar']);?></code></td>
<td width="10%"><code><? if($arrow['tip']=="cikar"){ ?><?=nf($arrow['onceki_tutar']-$arrow['tutar']);?><? } else { ?><?=nf($arrow['tutar']+$arrow['onceki_tutar']);?><? } ?></code></td>
<td width="10%"> </td>
</tr>

<? } ?>

<? } ?>

</tbody>
</table>
</div>
</div>

<? }

if($a=="hesapraporlar") {

$tarih1 = basla_time(gd("tarih1"));

$tarih2 = bitir_time(gd("tarih2"));

$datele_tarih1 = date("Y-m-d",$tarih1);

$datele_tarih2 = date("Y-m-d",$tarih2);

$userid = gd("userid");

$benimbayilerim = benimbayilerim($ub['id']);

$bayi_array = explode(",",$benimbayilerim);


if(strstr($userid,"-plus")) { 

$idbul = explode("-",$userid); $idalti = $idbul[0]; 

$onunkiler = benimbayilerim($idalti);

$userid = $idalti;

} 

if(!empty($userid) && in_array($userid,$bayi_array)) { 

if($onunkiler) {

	$user_ekle = "user_id in ($onunkiler)";

} else {

	$user_ekle = "user_id='$userid'"; 

}

} else { 

$user_ekle = "user_id in ($benimbayilerim)"; 

}

$sqladderone = "$user_ekle and casino='0' and kupon_time between '$tarih1' and '$tarih2' and hesap_kesim_zaman='' group by kupon_tarihi_belirle order by kupon_time asc";

$sor = sed_sql_query("select * from kuponlar where $sqladderone");

?>

<div class="card-block p-0">
<div class="table-responsive">
<table class="table mb-0">
<thead>
<tr>
<th colspan="7">
<span class="tag tag-primary" style="width:100px;text-align:left"><?=getTranslation('yeniyerler_kasa50')?></span> <?=$datele_tarih1;?> - <?=$datele_tarih2;?><br>
</th>
</tr>
<tr>
<th style="border-right: 1px solid #cfd8dc;"><?=getTranslation('ajaxhesaprapor2')?></th>
<th style="border-right: 1px solid #cfd8dc;text-align: center;"><?=getTranslation('ajaxhesaprapor3')?></th>
<th style="border-right: 1px solid #cfd8dc;text-align: center;"><?=getTranslation('ajaxhesaprapor4')?></th>
<th style="border-right: 1px solid #cfd8dc;text-align: center;"><?=getTranslation('ajaxhesaprapor5')?></th>
<th style="border-right: 1px solid #cfd8dc;text-align: center;"><?=getTranslation('ajaxhesaprapor4')?></th>
<th style="border-right: 1px solid #cfd8dc;text-align: center;"><?=getTranslation('ajaxhesaprapor7')?></th>
<th style="border-right: 1px solid #cfd8dc;text-align: center;"><?=getTranslation('ajaxhesaprapor4')?></th>
<th style="border-right: 1px solid #cfd8dc;text-align: center;"><?=getTranslation('ajaxhesaprapor9')?></th>
<th style="border-right: 1px solid #cfd8dc;text-align: center;"><?=getTranslation('ajaxhesaprapor4')?></th>
<th style="text-align: center;"><?=getTranslation('ajaxhesaprapor11')?></th>
</tr>
</thead>
<tbody id="calcall">

<? while($ass=sed_sql_fetcharray($sor)) {

$sqladder = "$user_ekle and casino='0' and kupon_time between '$tarih1' and '$tarih2' $hesap_ekle $satir_ekle $tip_ekle and kupon_tarihi_belirle='$ass[kupon_tarihi_belirle]'";

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


$satir_toplam = $toplam_odenen['toplam']-$toplam_iptal['toplam']-$toplam_kazanan['toplam']-$toplam_devam['toplam'];

$satir_toplam_genel = $satir_toplam_genel+$satir_toplam;

?>

<tr style="font-weight: bold;">
<td style="border-right: 1px solid #cfd8dc;color: #000 !important;"><?=$ass['kupon_tarih']; ?></td>
<td style="text-align:center;border-right: 1px solid #cfd8dc;color: #000 !important;"><?=nf($toplam_odenen['toplam']-$toplam_iptal['toplam']); ?></td>
<td style="text-align:center;border-right: 1px solid #cfd8dc;color: #000 !important;"><?=$toplam_odenen_adet;?></td>
<td style="text-align:center;border-right: 1px solid #cfd8dc;color: green!important;"><?=nf($toplam_kazanan['toplam']); ?></td>
<td style="text-align:center;border-right: 1px solid #cfd8dc;color: green!important;"><?=$toplam_kazanan_adet;?></td>
<td style="text-align:center;border-right: 1px solid #cfd8dc;color: red!important;"><?=nf($toplam_kaybeden['toplam']); ?></td>
<td style="text-align:center;border-right: 1px solid #cfd8dc;color: red!important;"><?=$toplam_kaybeden_adet;?></td>
<td style="text-align:center;border-right: 1px solid #cfd8dc;color: #000 !important;"><?=nf($toplam_devam['toplam']); ?></td>
<td style="text-align:center;border-right: 1px solid #cfd8dc;color: #000 !important;"><?=$toplam_devam_adet;?></td>
<td style="text-align:center;<? if($satir_toplam<0) { ?>color: red!important;<? } else { ?>color: green!important;<? } ?>"><?=nf($satir_toplam);?></td>
</tr>

<? } ?>

<tr style="font-weight: bold;">
<td style="border-right: 1px solid #cfd8dc;text-align:center;color: #000 !important;"><?=getTranslation('yeniyerler_kasa510')?></td>
<td style="border-right: 1px solid #cfd8dc;text-align:center;color: #000 !important;"><?=nf($top_odenen-$top_iptal);?></td>
<td style="border-right: 1px solid #cfd8dc;text-align:center;color: #000 !important;"><?=$top_odenen_adet;?></td>
<td style="border-right: 1px solid #cfd8dc;text-align:center;color: green!important;"><?=nf($top_kazanan);?></td>
<td style="border-right: 1px solid #cfd8dc;text-align:center;color: green!important;"><?=$top_kazanan_adet;?></td>
<td style="border-right: 1px solid #cfd8dc;text-align:center;color: red!important;"><?=nf($top_kaybeden);?></td>
<td style="border-right: 1px solid #cfd8dc;text-align:center;color: red!important;"><?=$top_kaybeden_adet;?></td>
<td style="border-right: 1px solid #cfd8dc;text-align:center;color: #000 !important;"><?=nf($top_devam);?></td>
<td style="border-right: 1px solid #cfd8dc;text-align:center;color: #000 !important;"><?=$top_devam_adet;?></td>
<td style="text-align:center;<? if($satir_toplam_genel<0) { ?>color: red!important;<? } else { ?>color: green!important;<? } ?>"><?=nf($satir_toplam_genel);?></td>
</tr>

</tbody>
</table>
</div>
</div>

<? }

if($a=="rapordetay") {

$tarih1 = basla_time(gd("tarih1"));

$tarih2 = bitir_time(gd("tarih2"));

$datele_tarih1 = date("Y-m-d",$tarih1);

$datele_tarih2 = date("Y-m-d",$tarih2);

$userid = gd("userid");

$benimbayilerim = benimbayilerim($ub['id']);

$bayi_array = explode(",",$benimbayilerim);


if(strstr($userid,"-plus")) { 

$idbul = explode("-",$userid); $idalti = $idbul[0]; 

$onunkiler = benimbayilerim($idalti);

$userid = $idalti;

} 

if(!empty($userid) && in_array($userid,$bayi_array)) { 

if($onunkiler) {

	$user_ekle = "user_id in ($onunkiler)";

} else {

	$user_ekle = "user_id='$userid'"; 

}

} else { 

$user_ekle = "user_id in ($benimbayilerim)"; 

}

$sqladderone = "$user_ekle and casino='0' and kupon_time between '$tarih1' and '$tarih2' and hesap_kesim_zaman='' group by username order by user_id asc";

$sor = sed_sql_query("select * from kuponlar where $sqladderone");

?>

<div class="card-block p-0">
<div class="table-responsive">
<table class="table mb-0">
<thead>
<tr>
<th colspan="7">
<span class="tag tag-primary" style="width:100px;text-align:left"><?=getTranslation('yeniyerler_kasa50')?></span> <?=$datele_tarih1;?> - <?=$datele_tarih2;?><br>
</th>
</tr>
<tr>
<th style="border-right: 1px solid #cfd8dc;"><?=getTranslation('yeniyerler_kasa55')?></th>
<th style="border-right: 1px solid #cfd8dc;"><?=getTranslation('yeniyerler_kasa54')?></th>
<th style="border-right: 1px solid #cfd8dc;text-align: center;"><?=getTranslation('yeniyerler_kasa67')?></th>
<th style="border-right: 1px solid #cfd8dc;text-align: center;"><?=getTranslation('ajaxhesaprapor4')?></th>
<th style="border-right: 1px solid #cfd8dc;text-align: center;"><?=getTranslation('yeniyerler_kasa70')?></th>
<th style="border-right: 1px solid #cfd8dc;text-align: center;"><?=getTranslation('ajaxhesaprapor4')?></th>
<th style="border-right: 1px solid #cfd8dc;text-align: center;"><?=getTranslation('yeniyerler_kasa69')?></th>
<th style="border-right: 1px solid #cfd8dc;text-align: center;"><?=getTranslation('ajaxhesaprapor4')?></th>
<th style="border-right: 1px solid #cfd8dc;text-align: center;"><?=getTranslation('yeniyerler_kasa71')?></th>
<th style="border-right: 1px solid #cfd8dc;text-align: center;"><?=getTranslation('ajaxhesaprapor4')?></th>
<th style="border-right: 1px solid #cfd8dc;text-align: center;"><?=getTranslation('yeniyerler_kasa72')?></th>
</tr>
</thead>
<tbody id="calcall">

<? while($ass=sed_sql_fetcharray($sor)) {

$sqladder = "$user_ekle and casino='0' and kupon_time between '$tarih1' and '$tarih2' $hesap_ekle $satir_ekle $tip_ekle and user_id='$ass[user_id]'";

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


$satir_toplam = $toplam_odenen['toplam']-$toplam_iptal['toplam']-$toplam_kazanan['toplam']-$toplam_devam['toplam'];

$satir_toplam_genel = $satir_toplam_genel+$satir_toplam;

$hesap_sahibi_bul = bilgi("select * from kullanici where id='$ass[user_id]'");

?>

<tr style="font-weight: bold;">
<td style="border-right: 1px solid #cfd8dc;color: #000 !important;"><a href="detailed.php?id=<?=$hesap_sahibi_bul['hesap_sahibi_id']; ?>" class="tag tag-warning" style="color: #000 !important;"><?=$hesap_sahibi_bul['hesap_sahibi_user']; ?></a></td>
<td style="border-right: 1px solid #cfd8dc;color: #000 !important;"><a href="detailed.php?id=<?=$ass['user_id']; ?>" class="tag tag-success"><?=$ass['username']; ?></a></td>
<td style="text-align:center;border-right: 1px solid #cfd8dc;color: #000 !important;"><?=nf($toplam_odenen['toplam']-$toplam_iptal['toplam']); ?></td>
<td style="text-align:center;border-right: 1px solid #cfd8dc;color: #000 !important;"><?=$toplam_odenen_adet;?></td>
<td style="text-align:center;border-right: 1px solid #cfd8dc;color: green!important;"><?=nf($toplam_kazanan['toplam']); ?></td>
<td style="text-align:center;border-right: 1px solid #cfd8dc;color: green!important;"><?=$toplam_kazanan_adet;?></td>
<td style="text-align:center;border-right: 1px solid #cfd8dc;color: red!important;"><?=nf($toplam_kaybeden['toplam']); ?></td>
<td style="text-align:center;border-right: 1px solid #cfd8dc;color: red!important;"><?=$toplam_kaybeden_adet;?></td>
<td style="text-align:center;border-right: 1px solid #cfd8dc;color: #000 !important;"><?=nf($toplam_iptal['toplam']); ?></td>
<td style="text-align:center;border-right: 1px solid #cfd8dc;color: #000 !important;"><?=$toplam_iptal_adet;?></td>
<td style="text-align:center;<? if($satir_toplam<0) { ?>color: red!important;<? } else { ?>color: green!important;<? } ?>"><?=nf($satir_toplam);?></td>
</tr>

<? } ?>

<?
$kalan_hesapla_30_bol = $satir_toplam_genel/100;
$kalan_hesapla_30 = $kalan_hesapla_30_bol*30;
$kalan_hesapla_70_bol = $satir_toplam_genel/100;
$kalan_hesapla_70 = $kalan_hesapla_70_bol*70;
?>

<tr style="font-weight: bold;">
<td colspan="4" style="border-right: 1px solid #cfd8dc;text-align:right;"></td>
<td colspan="1" style="border-right: 1px solid #cfd8dc;text-align:right;"><?=getTranslation('yeniyerler_kasa72')?> : </td>
<td colspan="1" style="border-right: 1px solid #cfd8dc;text-align:center;<? if($satir_toplam_genel<0) { ?>color: red!important;<? } else { ?>color: green!important;<? } ?>"><?=nf($satir_toplam_genel);?></td>
<td colspan="5"></td>
</tr>
<tr style="font-weight: bold;">
<td colspan="4" style="border-right: 1px solid #cfd8dc;text-align:right;"></td>
<td colspan="1" style="border-right: 1px solid #cfd8dc;text-align:right;"><?=getTranslation('yeniyerler_kasa72')?> (%30) : </td>
<td colspan="1" style="border-right: 1px solid #cfd8dc;text-align:center;<? if($kalan_hesapla_30<0) { ?>color: red!important;<? } else { ?>color: green!important;<? } ?>"><?=nf($kalan_hesapla_30);?></td>
<td colspan="5"></td>
</tr>
<tr style="font-weight: bold;">
<td colspan="4" style="border-right: 1px solid #cfd8dc;text-align:right;"></td>
<td colspan="1" style="border-right: 1px solid #cfd8dc;text-align:right;"><?=getTranslation('yeniyerler_kasa72')?> (%70) : </td>
<td colspan="1" style="border-right: 1px solid #cfd8dc;text-align:center;<? if($kalan_hesapla_70<0) { ?>color: red!important;<? } else { ?>color: green!important;<? } ?>"><?=nf($kalan_hesapla_70);?></td>
<td colspan="5"></td>
</tr>

</tbody>
</table>
</div>
</div>

<? }

if($a=="chesapraporlar") {

$tarih1 = basla_time(gd("tarih1"));

$tarih2 = bitir_time(gd("tarih2"));

$datele_tarih1 = date("Y-m-d",$tarih1);

$datele_tarih2 = date("Y-m-d",$tarih2);

$userid = gd("userid");

$benimbayilerim = benimbayilerim($ub['id']);

$bayi_array = explode(",",$benimbayilerim);


if(strstr($userid,"-plus")) { 

$idbul = explode("-",$userid); $idalti = $idbul[0]; 

$onunkiler = benimbayilerim($idalti);

$userid = $idalti;

} 

if(!empty($userid) && in_array($userid,$bayi_array)) { 

if($onunkiler) {

	$user_ekle = "user_id in ($onunkiler)";

} else {

	$user_ekle = "user_id='$userid'"; 

}

} else { 

$user_ekle = "user_id in ($benimbayilerim)"; 

}

$sqladderone = "$user_ekle and casino>0 and kupon_time between '$tarih1' and '$tarih2' and hesap_kesim_zaman='' group by kupon_tarihi_belirle order by kupon_time asc";

$sor = sed_sql_query("select * from kuponlar where $sqladderone");

?>

<div class="card-block p-0">
<div class="table-responsive">
<table class="table mb-0">
<thead>
<tr>
<th colspan="7">
<span class="tag tag-primary" style="width:100px;text-align:left"><?=getTranslation('yeniyerler_kasa50')?></span> <?=$datele_tarih1;?> - <?=$datele_tarih2;?><br>
</th>
</tr>
<tr>
<th style="border-right: 1px solid #cfd8dc;"><?=getTranslation('ajaxhesaprapor2')?></th>
<th style="border-right: 1px solid #cfd8dc;text-align: center;"><?=getTranslation('ajaxhesaprapor3')?></th>
<th style="border-right: 1px solid #cfd8dc;text-align: center;"><?=getTranslation('ajaxhesaprapor4')?></th>
<th style="border-right: 1px solid #cfd8dc;text-align: center;"><?=getTranslation('ajaxhesaprapor5')?></th>
<th style="border-right: 1px solid #cfd8dc;text-align: center;"><?=getTranslation('ajaxhesaprapor4')?></th>
<th style="border-right: 1px solid #cfd8dc;text-align: center;"><?=getTranslation('ajaxhesaprapor7')?></th>
<th style="border-right: 1px solid #cfd8dc;text-align: center;"><?=getTranslation('ajaxhesaprapor4')?></th>
<th style="border-right: 1px solid #cfd8dc;text-align: center;"><?=getTranslation('ajaxhesaprapor9')?></th>
<th style="border-right: 1px solid #cfd8dc;text-align: center;"><?=getTranslation('ajaxhesaprapor4')?></th>
<th style="text-align: center;"><?=getTranslation('ajaxhesaprapor11')?></th>
</tr>
</thead>
<tbody id="calcall">

<? while($ass=sed_sql_fetcharray($sor)) {

$sqladder = "$user_ekle and casino>0 and kupon_time between '$tarih1' and '$tarih2' $hesap_ekle $satir_ekle $tip_ekle and kupon_tarihi_belirle='$ass[kupon_tarihi_belirle]'";

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


$satir_toplam = $toplam_odenen['toplam']-$toplam_iptal['toplam']-$toplam_kazanan['toplam']-$toplam_devam['toplam'];

$satir_toplam_genel = $satir_toplam_genel+$satir_toplam;

?>

<tr style="font-weight: bold;">
<td style="border-right: 1px solid #cfd8dc;color: #000 !important;"><?=$ass['kupon_tarih']; ?></td>
<td style="text-align:center;border-right: 1px solid #cfd8dc;color: #000 !important;"><?=nf($toplam_odenen['toplam']-$toplam_iptal['toplam']); ?></td>
<td style="text-align:center;border-right: 1px solid #cfd8dc;color: #000 !important;"><?=$toplam_odenen_adet;?></td>
<td style="text-align:center;border-right: 1px solid #cfd8dc;color: green!important;"><?=nf($toplam_kazanan['toplam']); ?></td>
<td style="text-align:center;border-right: 1px solid #cfd8dc;color: green!important;"><?=$toplam_kazanan_adet;?></td>
<td style="text-align:center;border-right: 1px solid #cfd8dc;color: red!important;"><?=nf($toplam_kaybeden['toplam']); ?></td>
<td style="text-align:center;border-right: 1px solid #cfd8dc;color: red!important;"><?=$toplam_kaybeden_adet;?></td>
<td style="text-align:center;border-right: 1px solid #cfd8dc;color: #000 !important;"><?=nf($toplam_devam['toplam']); ?></td>
<td style="text-align:center;border-right: 1px solid #cfd8dc;color: #000 !important;"><?=$toplam_devam_adet;?></td>
<td style="text-align:center;<? if($satir_toplam<0) { ?>color: red!important;<? } else { ?>color: green!important;<? } ?>"><?=nf($satir_toplam);?></td>
</tr>

<? } ?>

<tr style="font-weight: bold;">
<td style="border-right: 1px solid #cfd8dc;text-align:center;color: #000 !important;"><?=getTranslation('yeniyerler_kasa510')?></td>
<td style="border-right: 1px solid #cfd8dc;text-align:center;color: #000 !important;"><?=nf($top_odenen-$top_iptal);?></td>
<td style="border-right: 1px solid #cfd8dc;text-align:center;color: #000 !important;"><?=$top_odenen_adet;?></td>
<td style="border-right: 1px solid #cfd8dc;text-align:center;color: green!important;"><?=nf($top_kazanan);?></td>
<td style="border-right: 1px solid #cfd8dc;text-align:center;color: green!important;"><?=$top_kazanan_adet;?></td>
<td style="border-right: 1px solid #cfd8dc;text-align:center;color: red!important;"><?=nf($top_kaybeden);?></td>
<td style="border-right: 1px solid #cfd8dc;text-align:center;color: red!important;"><?=$top_kaybeden_adet;?></td>
<td style="border-right: 1px solid #cfd8dc;text-align:center;color: #000 !important;"><?=nf($top_devam);?></td>
<td style="border-right: 1px solid #cfd8dc;text-align:center;color: #000 !important;"><?=$top_devam_adet;?></td>
<td style="text-align:center;<? if($satir_toplam_genel<0) { ?>color: red!important;<? } else { ?>color: green!important;<? } ?>"><?=nf($satir_toplam_genel);?></td>
</tr>

</tbody>
</table>
</div>
</div>

<? }

if($a=="crapordetay") {

$tarih1 = basla_time(gd("tarih1"));

$tarih2 = bitir_time(gd("tarih2"));

$datele_tarih1 = date("Y-m-d",$tarih1);

$datele_tarih2 = date("Y-m-d",$tarih2);

$userid = gd("userid");

$benimbayilerim = benimbayilerim($ub['id']);

$bayi_array = explode(",",$benimbayilerim);


if(strstr($userid,"-plus")) { 

$idbul = explode("-",$userid); $idalti = $idbul[0]; 

$onunkiler = benimbayilerim($idalti);

$userid = $idalti;

} 

if(!empty($userid) && in_array($userid,$bayi_array)) { 

if($onunkiler) {

	$user_ekle = "user_id in ($onunkiler)";

} else {

	$user_ekle = "user_id='$userid'"; 

}

} else { 

$user_ekle = "user_id in ($benimbayilerim)"; 

}

$sqladderone = "$user_ekle and casino>0 and kupon_time between '$tarih1' and '$tarih2' and hesap_kesim_zaman='' group by username order by user_id asc";

$sor = sed_sql_query("select * from kuponlar where $sqladderone");

?>

<div class="card-block p-0">
<div class="table-responsive">
<table class="table mb-0">
<thead>
<tr>
<th colspan="7">
<span class="tag tag-primary" style="width:100px;text-align:left"><?=getTranslation('yeniyerler_kasa50')?></span> <?=$datele_tarih1;?> - <?=$datele_tarih2;?><br>
</th>
</tr>
<tr>
<th style="border-right: 1px solid #cfd8dc;"><?=getTranslation('yeniyerler_kasa55')?></th>
<th style="border-right: 1px solid #cfd8dc;"><?=getTranslation('yeniyerler_kasa54')?></th>
<th style="border-right: 1px solid #cfd8dc;text-align: center;"><?=getTranslation('yeniyerler_kasa67')?></th>
<th style="border-right: 1px solid #cfd8dc;text-align: center;"><?=getTranslation('ajaxhesaprapor4')?></th>
<th style="border-right: 1px solid #cfd8dc;text-align: center;"><?=getTranslation('yeniyerler_kasa70')?></th>
<th style="border-right: 1px solid #cfd8dc;text-align: center;"><?=getTranslation('ajaxhesaprapor4')?></th>
<th style="border-right: 1px solid #cfd8dc;text-align: center;"><?=getTranslation('yeniyerler_kasa69')?></th>
<th style="border-right: 1px solid #cfd8dc;text-align: center;"><?=getTranslation('ajaxhesaprapor4')?></th>
<th style="border-right: 1px solid #cfd8dc;text-align: center;"><?=getTranslation('yeniyerler_kasa71')?></th>
<th style="border-right: 1px solid #cfd8dc;text-align: center;"><?=getTranslation('ajaxhesaprapor4')?></th>
<th style="border-right: 1px solid #cfd8dc;text-align: center;"><?=getTranslation('yeniyerler_kasa72')?></th>
</tr>
</thead>
<tbody id="calcall">

<? while($ass=sed_sql_fetcharray($sor)) {

$sqladder = "$user_ekle and casino>0 and kupon_time between '$tarih1' and '$tarih2' $hesap_ekle $satir_ekle $tip_ekle and user_id='$ass[user_id]'";

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


$satir_toplam = $toplam_odenen['toplam']-$toplam_iptal['toplam']-$toplam_kazanan['toplam']-$toplam_devam['toplam'];

$satir_toplam_genel = $satir_toplam_genel+$satir_toplam;

$hesap_sahibi_bul = bilgi("select * from kullanici where id='$ass[user_id]'");

?>

<tr style="font-weight: bold;">
<td style="border-right: 1px solid #cfd8dc;color: #000 !important;"><a href="detailed.php?id=<?=$hesap_sahibi_bul['hesap_sahibi_id']; ?>" class="tag tag-warning" style="color: #000 !important;"><?=$hesap_sahibi_bul['hesap_sahibi_user']; ?></a></td>
<td style="border-right: 1px solid #cfd8dc;color: #000 !important;"><a href="detailed.php?id=<?=$ass['user_id']; ?>" class="tag tag-success"><?=$ass['username']; ?></a></td>
<td style="text-align:center;border-right: 1px solid #cfd8dc;color: #000 !important;"><?=nf($toplam_odenen['toplam']-$toplam_iptal['toplam']); ?></td>
<td style="text-align:center;border-right: 1px solid #cfd8dc;color: #000 !important;"><?=$toplam_odenen_adet;?></td>
<td style="text-align:center;border-right: 1px solid #cfd8dc;color: green!important;"><?=nf($toplam_kazanan['toplam']); ?></td>
<td style="text-align:center;border-right: 1px solid #cfd8dc;color: green!important;"><?=$toplam_kazanan_adet;?></td>
<td style="text-align:center;border-right: 1px solid #cfd8dc;color: red!important;"><?=nf($toplam_kaybeden['toplam']); ?></td>
<td style="text-align:center;border-right: 1px solid #cfd8dc;color: red!important;"><?=$toplam_kaybeden_adet;?></td>
<td style="text-align:center;border-right: 1px solid #cfd8dc;color: #000 !important;"><?=nf($toplam_iptal['toplam']); ?></td>
<td style="text-align:center;border-right: 1px solid #cfd8dc;color: #000 !important;"><?=$toplam_iptal_adet;?></td>
<td style="text-align:center;<? if($satir_toplam<0) { ?>color: red!important;<? } else { ?>color: green!important;<? } ?>"><?=nf($satir_toplam);?></td>
</tr>

<? } ?>

<?
$kalan_hesapla_30_bol = $satir_toplam_genel/100;
$kalan_hesapla_30 = $kalan_hesapla_30_bol*30;
$kalan_hesapla_70_bol = $satir_toplam_genel/100;
$kalan_hesapla_70 = $kalan_hesapla_70_bol*70;
?>

<tr style="font-weight: bold;">
<td colspan="4" style="border-right: 1px solid #cfd8dc;text-align:right;"></td>
<td colspan="1" style="border-right: 1px solid #cfd8dc;text-align:right;"><?=getTranslation('yeniyerler_kasa72')?> : </td>
<td colspan="1" style="border-right: 1px solid #cfd8dc;text-align:center;<? if($satir_toplam_genel<0) { ?>color: red!important;<? } else { ?>color: green!important;<? } ?>"><?=nf($satir_toplam_genel);?></td>
<td colspan="5"></td>
</tr>
<tr style="font-weight: bold;">
<td colspan="4" style="border-right: 1px solid #cfd8dc;text-align:right;"></td>
<td colspan="1" style="border-right: 1px solid #cfd8dc;text-align:right;"><?=getTranslation('yeniyerler_kasa72')?> (%30) : </td>
<td colspan="1" style="border-right: 1px solid #cfd8dc;text-align:center;<? if($kalan_hesapla_30<0) { ?>color: red!important;<? } else { ?>color: green!important;<? } ?>"><?=nf($kalan_hesapla_30);?></td>
<td colspan="5"></td>
</tr>
<tr style="font-weight: bold;">
<td colspan="4" style="border-right: 1px solid #cfd8dc;text-align:right;"></td>
<td colspan="1" style="border-right: 1px solid #cfd8dc;text-align:right;"><?=getTranslation('yeniyerler_kasa72')?> (%70) : </td>
<td colspan="1" style="border-right: 1px solid #cfd8dc;text-align:center;<? if($kalan_hesapla_70<0) { ?>color: red!important;<? } else { ?>color: green!important;<? } ?>"><?=nf($kalan_hesapla_70);?></td>
<td colspan="5"></td>
</tr>

</tbody>
</table>
</div>
</div>

<? }

if($a=="removeamount") {

$id = gd("id");

if($id=="1" && $ub['id']!="1") { die("..."); }

$bayilerim = benimbayilerim($ub['id']);

$bayi_array = explode(",",$bayilerim);

if(!in_array($id,$bayi_array)) {

	die('<pre style="word-wrap: break-word; white-space: pre-wrap;">{"error":"Bu yetkiye MAALESEF sahip değilsiniz."}</pre>');

} else {
	
	$bilgisi = bilgi("select * from kullanici where id='$id'");
	
	if($bilgisi['bakiye']>0){
		
		sed_sql_query("INSERT INTO hesap_hareket SET user_id='".$id."',username='".$bilgisi['username']."',tip='cikar',tutar='".$bilgisi['bakiye']."',aciklama='Hesap Sıfırlandı',islemi_yapan='".$ub['username']."',zaman='".time()."',onceki_tutar='".$bilgisi['bakiye']."'");
		
		if($ub['wkyetki']==1){
			$kendibakiyemitopla = $ub['bakiye']+$bilgisi['bakiye'];
			sed_sql_query("update kullanici set bakiye='$kendibakiyemitopla' where id='$ub[id]'");
			sed_sql_query("update kullanici set bakiye='0' where id='$id'");
		} else {
			sed_sql_query("update kullanici set bakiye='0' where id='$id'");
		}
		
		die('101');
		
	} else {
	
		die('202');
	
	}

}

}

if($a=="casinoremoveamount") {

$id = gd("id");

if($id=="1" && $ub['id']!="1") { die("..."); }

$bayilerim = benimbayilerim($ub['id']);

$bayi_array = explode(",",$bayilerim);

if(!in_array($id,$bayi_array)) {

	die('<pre style="word-wrap: break-word; white-space: pre-wrap;">{"error":"Bu yetkiye MAALESEF sahip değilsiniz."}</pre>');

} else {
	
	$bilgisi = bilgi("select * from kullanici where id='$id'");
	
	if($bilgisi['casinobakiye']>0){
		
		sed_sql_query("INSERT INTO hesap_hareket SET user_id='".$id."',username='".$bilgisi['username']."',tip='casinocikar',tutar='".$bilgisi['casinobakiye']."',aciklama='Hesap Sıfırlandı',islemi_yapan='".$ub['username']."',zaman='".time()."',onceki_tutar='".$bilgisi['casinobakiye']."'");
		
		if($ub['wkyetki']==1){
			$kendibakiyemitoplac = $ub['casinobakiye']+$bilgisi['casinobakiye'];
			sed_sql_query("update kullanici set casinobakiye='$kendibakiyemitoplac' where id='$ub[id]'");
			sed_sql_query("update kullanici set casinobakiye='0' where id='$id'");
		} else {
			sed_sql_query("update kullanici set casinobakiye='0' where id='$id'");
		}
		
		die('101');
		
	} else {
	
		die('202');
	
	}

}

}

if($a=="casinohesaprapor") {

$tarih1 = basla_time(gd("tarih1"));

$tarih2 = bitir_time(gd("tarih2"));

$datele_tarih1 = date("Y-m-d",$tarih1);

$datele_tarih2 = date("Y-m-d",$tarih2);

$sor = sed_sql_query("select * from kullanici where hesap_sahibi_id='".$ub['id']."' and root='0'");

$toplam_atilan_bakiye = bilgi("SELECT SUM(CASE WHEN id!='' THEN tutar END) as toplamatilanbakiye FROM hesap_hareket WHERE islemi_yapan='$ub[username]' and username!='$ub[username]' and tip='casinoekle' and zaman between '$tarih1' and '$tarih2'");

$toplam_cekilen_bakiye = bilgi("SELECT SUM(CASE WHEN id!='' THEN tutar END) as toplamcekilenbakiye FROM hesap_hareket WHERE islemi_yapan='$ub[username]' and username!='$ub[username]' and tip='casinocikar' and zaman between '$tarih1' and '$tarih2'");

?>

<div class="card-block p-0">
<div class="table-responsive">
<table class="table mb-0">
<thead>
<tr>
<th colspan="7">
<span class="tag tag-primary" style="width:100px;text-align:left"><?=getTranslation('yeniyerler_kasa50')?></span> <?=$datele_tarih1;?> - <?=$datele_tarih2;?><br>
<span class="tag tag-info" style="width:100px;text-align:left"><?=getTranslation('yeniyerler_kasa51')?></span> <span id="ta"><?=nf($toplam_atilan_bakiye['toplamatilanbakiye']);?></span><br>
<span class="tag tag-danger" style="width:100px;text-align:left"><?=getTranslation('yeniyerler_kasa52')?></span> <span id="tc"><?=nf($toplam_cekilen_bakiye['toplamcekilenbakiye']);?></span><br>
<span class="tag tag-success" style="width:100px;text-align:left"><?=getTranslation('yeniyerler_kasa53')?></span> <span id="tf">

<? if($toplam_atilan_bakiye['toplamatilanbakiye']>$toplam_cekilen_bakiye['toplamcekilenbakiye']){?>

<?=nf($toplam_atilan_bakiye['toplamatilanbakiye']-$toplam_cekilen_bakiye['toplamcekilenbakiye']);?>

<? } else { ?>

<?=nf($toplam_cekilen_bakiye['toplamcekilenbakiye']-$toplam_atilan_bakiye['toplamatilanbakiye']);?>

<? } ?>

</span></th>
</tr>
<tr>
<th width="10%"><?=getTranslation('yeniyerler_kasa54')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa55')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa56')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa57')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa58')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa59')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa60')?></th>
</tr>
</thead>
<tbody id="calcall">

<? while($row=sed_sql_fetcharray($sor)) { ?>

<?
$toplam_atilan_bakiye_user = bilgi("SELECT SUM(CASE WHEN id!='' THEN tutar END) as toplamatilanbakiye FROM hesap_hareket WHERE user_id='$row[id]' and islemi_yapan='$ub[username]' and tip='casinoekle' and zaman between '$tarih1' and '$tarih2'");

$toplam_cekilen_bakiye_user = bilgi("SELECT SUM(CASE WHEN id!='' THEN tutar END) as toplamcekilenbakiye FROM hesap_hareket WHERE user_id='$row[id]' and islemi_yapan='$ub[username]' and tip='casinocikar' and zaman between '$tarih1' and '$tarih2'");
?>

<tr>
<td width="10%"><a href="javascript:;" onclick="togledetail(<?=$row['id'];?>);"><code><i class="fa fa-eye"></i></code> <code>BK<?=$row['id'];?></code></a></td>
<td width="10%"><a href="detailed.php?id=<?=$row['id'];?>" class="tag tag-success"><?=$row['username'];?></a></td>
<td width="10%"><code><?=nf($toplam_atilan_bakiye_user['toplamatilanbakiye']);?></code></td>
<td width="10%"><code><?=nf($toplam_cekilen_bakiye_user['toplamcekilenbakiye']);?></code></td>
<td width="10%"><code>

<? if($toplam_atilan_bakiye_user['toplamatilanbakiye']>$toplam_cekilen_bakiye_user['toplamcekilenbakiye']){?>

<?=nf($toplam_atilan_bakiye_user['toplamatilanbakiye']-$toplam_cekilen_bakiye_user['toplamcekilenbakiye']);?>

<? } else { ?>

<?=nf($toplam_cekilen_bakiye_user['toplamcekilenbakiye']-$toplam_atilan_bakiye_user['toplamatilanbakiye']);?>

<? } ?>

</code></td>
<td width="10%"><code><?=nf($row['casinobakiye']);?></code></td>
<td><a href="javascript:;" class="tag tag-warning" onclick="removeamount(<?=$row['id'];?>);"> <i class="fa fa-money"></i> </a></td>
</tr>



<tr colspan="7" id="dets_<?=$row['id'];?>" style="display: none;">
<th width="10%"></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa61')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa62')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa63')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa64')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa65')?></th>
<th width="10%"></th>
</tr>

<? 
$iceriksor = sed_sql_query("select * from hesap_hareket where user_id='$row[id]' and islemi_yapan='$ub[username]' and tip IN ('casinoekle','casinocikar') and zaman between '$tarih1' and '$tarih2'");
while($arrow=sed_sql_fetcharray($iceriksor)) {
?>


<tr id="det_<?=$row['id'];?>" class="table-<? if($arrow['tip']=="casinocikar"){ ?>danger<? } else { ?>success<? } ?>" style="display: none;">
<td width="10%"><?=date("d-m-Y H:i",$arrow['zaman']);?></td>
<td><span class="tag tag-default"><?=getTranslation('yeniyerler_kasa115')?></span> <span class="tag tag-<? if($arrow['tip']=="casinocikar"){ ?>danger<? } else { ?>success<? } ?>"><? if($arrow['tip']=="casinocikar"){ ?><?=getTranslation('yeniyerler_kasa116')?><? } else { ?><?=getTranslation('yeniyerler_kasa117')?><? } ?></span></td>
<td><?=$arrow['username'];?> (BK<?=$arrow['user_id'];?>)</td>
<td><span class="amount"><code><? if($arrow['tip']=="casinocikar"){ ?>-<? } ?><?=nf($arrow['tutar']);?></code></span></td>
<td width="10%"><code><?=nf($arrow['onceki_tutar']);?></code></td>
<td width="10%"><code><? if($arrow['tip']=="casinocikar"){ ?><?=nf($arrow['onceki_tutar']-$arrow['tutar']);?><? } else { ?><?=nf($arrow['tutar']+$arrow['onceki_tutar']);?><? } ?></code></td>
<td width="10%"> </td>
</tr>

<? } ?>

<? } ?>

</tbody>
</table>
</div>
</div>

<? }

if($a=="casinooyunhesaprapor") {

$tarih1 = basla_time(gd("tarih1"));

$tarih2 = bitir_time(gd("tarih2"));

$benimbayilerim = benimbayilerim($ub['id']);

$user_ekle = "user_id in ($benimbayilerim)"; 

if($hesapdurum=="1") { $hesap_ekle = "and hesap_kesim_zaman=''"; } else { $hesap_ekle = ""; }

$sqladderone = "$user_ekle and casino>0 and kupon_time between '$tarih1' and '$tarih2' group by user_id order by kupon_time asc";

$sor = sed_sql_query("select * from kuponlar where $sqladderone");

$sqladder = "$user_ekle and casino>0 and kupon_time between '$tarih1' and '$tarih2'";

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

$satir_toplam = $toplam_odenen['toplam']-$toplam_iptal['toplam']-$toplam_kazanan['toplam']-$toplam_devam['toplam'];

$satir_toplam_genel = $satir_toplam_genel+$satir_toplam;

if(sed_sql_numrows($sor)<1) { ?>

<div class="card-block p-0">
<div class="table-responsive">
<table class="table mb-0">
<thead>
<tr>
<th colspan="8">
<span class="tag tag-primary" style="width:100px;text-align:left"><?=getTranslation('yeniyerler_kasa50')?></span> <?=date("Y-m-d",$tarih1);?> - <?=date("Y-m-d",$tarih2);?><br>
<span class="tag tag-info" style="width:100px;text-align:left"><?=getTranslation('yeniyerler_kasa67')?></span> <span id="ta">0.00</span><br>
<span class="tag tag-warning" style="width:100px;text-align:left"><?=getTranslation('yeniyerler_kasa68')?></span> <span id="tcbk">0.00</span><br>
<span class="tag tag-danger" style="width:100px;text-align:left"><?=getTranslation('yeniyerler_kasa69')?></span> <span id="tky">0.00</span><br>
<span class="tag tag-success" style="width:100px;text-align:left"><?=getTranslation('yeniyerler_kasa70')?></span> <span id="tkaz">0.00</span><br>
<span class="tag tag-info" style="width:100px;text-align:left"><?=getTranslation('yeniyerler_kasa71')?></span> <span id="tiade">0.00</span><br>
<span class="tag tag-success" style="width:100px;text-align:left"><?=getTranslation('yeniyerler_kasa72')?></span> <span id="tres">0.00</span></th>
</tr>
<tr>
<th width="10%"><?=getTranslation('yeniyerler_kasa73')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa74')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa75')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa76')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa77')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa78')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa79')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa80')?></th>
</tr>
</thead>
<tbody id="calcall">

<? } else { ?>

<div class="card-block p-0">
<div class="table-responsive">
<table class="table mb-0">
<thead>
<tr>
<th colspan="8">
<span class="tag tag-primary" style="width:100px;text-align:left"><?=getTranslation('yeniyerler_kasa50')?></span> <?=date("Y-m-d",$tarih1);?> - <?=date("Y-m-d",$tarih2);?><br>
<span class="tag tag-info" style="width:100px;text-align:left"><?=getTranslation('yeniyerler_kasa67')?></span> <span id="ta"><?=nf($top_odenen-$top_iptal);?></span><br>
<span class="tag tag-warning" style="width:100px;text-align:left"><?=getTranslation('yeniyerler_kasa68')?></span> <span id="tcbk"><?=nf($top_devam);?></span><br>
<span class="tag tag-danger" style="width:100px;text-align:left"><?=getTranslation('yeniyerler_kasa69')?></span> <span id="tky"><?=nf($top_kaybeden);?></span><br>
<span class="tag tag-success" style="width:100px;text-align:left"><?=getTranslation('yeniyerler_kasa70')?></span> <span id="tkaz"><?=nf($top_kazanan);?></span><br>
<span class="tag tag-info" style="width:100px;text-align:left"><?=getTranslation('yeniyerler_kasa71')?></span> <span id="tiade"><?=nf($top_iptal);?></span><br>
<span class="tag tag-success" style="width:100px;text-align:left"><?=getTranslation('yeniyerler_kasa72')?></span> <span id="tres"><?=nf($satir_toplam_genel);?></span></th>
</tr>
<tr>
<th width="10%"><?=getTranslation('yeniyerler_kasa73')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa74')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa75')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa76')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa77')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa78')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa79')?></th>
<th width="10%"><?=getTranslation('yeniyerler_kasa80')?></th>
</tr>
</thead>
<tbody id="calcall">

<? while($ass=sed_sql_fetcharray($sor)) { 

$sqladderbayi = "$user_ekle and casino>0 and kupon_time between '$tarih1' and '$tarih2' and user_id='$ass[user_id]'";

// toplam yatırılan

$toplam_odenen_bayi = bilgi("select SUM(yatan) as toplam from kuponlar where $sqladderbayi");

$toplam_odenen_adet_bayi = sed_sql_numrows(sed_sql_query("select * from kuponlar where $sqladderbayi"));

$top_odenen_bayi = $top_odenen+$toplam_odenen['toplam'];

$top_odenen_adet_bayi = $top_odenen_adet+$toplam_odenen_adet;

// toplam kazanan

$toplam_kazanan_bayi = bilgi("select SUM(tutar) as toplam from kuponlar where $sqladderbayi and durum='2'");

$toplam_kazanan_adet_bayi = sed_sql_numrows(sed_sql_query("select * from kuponlar where $sqladderbayi and durum='2'"));

$top_kazanan_bayi = $top_kazanan+$toplam_kazanan['toplam'];

$top_kazanan_adet_bayi = $top_kazanan_adet+$toplam_kazanan_adet;

// toplam kaybeden

$toplam_kaybeden_bayi = bilgi("select SUM(yatan) as toplam from kuponlar where $sqladderbayi and durum='3'");

$toplam_kaybeden_adet_bayi = sed_sql_numrows(sed_sql_query("select * from kuponlar where $sqladderbayi and durum='3'"));

$top_kaybeden_bayi = $top_kaybeden+$toplam_kaybeden['toplam'];

$top_kaybeden_adet_bayi = $top_kaybeden_adet+$toplam_kaybeden_adet;

// toplam devam

$toplam_devam_bayi = bilgi("select SUM(yatan) as toplam from kuponlar where $sqladderbayi and durum='1'");

$toplam_devam_adet_bayi = sed_sql_numrows(sed_sql_query("select * from kuponlar where $sqladderbayi and durum='1'"));

$top_devam_bayi = $top_devam+$toplam_devam['toplam'];

$top_devam_adet_bayi = $top_devam_adet+$toplam_devam_adet;

// toplam iptal

$toplam_iptal_bayi = bilgi("select SUM(yatan) as toplam from kuponlar where $sqladderbayi and durum='4'");

$toplam_iptal_adet_bayi = sed_sql_numrows(sed_sql_query("select * from kuponlar where $sqladderbayi and durum='4'"));

$top_iptal_bayi = $top_iptal+$toplam_iptal['toplam'];

$top_iptal_adet_bayi = $top_iptal_adet+$toplam_iptal_adet;

$satir_toplam_bayi = $toplam_odenen_bayi['toplam']-$toplam_iptal_bayi['toplam']-$toplam_kazanan_bayi['toplam']-$toplam_devam_bayi['toplam'];

?>

<tr>
<td width="10%"><code>BK<?=$ass['user_id']; ?></code></td>
<td width="10%"><a href="detailed.php?id=<?=$ass['user_id']; ?>" class="tag tag-success"><?=$ass['username']; ?></a></td>
<td width="10%"><code><?=$toplam_odenen_adet_bayi;?>/<?=nf($toplam_odenen_bayi['toplam']); ?></code></td>
<td width="10%"><code><?=$toplam_devam_adet_bayi;?>/<?=nf($toplam_devam_bayi['toplam']); ?></code></td>
<td width="10%"><code><?=$toplam_kaybeden_adet_bayi;?>/<?=nf($toplam_kaybeden_bayi['toplam']); ?></code></td>
<td width="10%"><code><?=$toplam_kazanan_adet_bayi;?>/<?=nf($toplam_kazanan_bayi['toplam']); ?></code></td>
<td width="10%"><code><?=$toplam_iptal_adet_bayi;?>/<?=nf($toplam_iptal_bayi['toplam']); ?></code></td>
<td width="10%"><code><?=nf($satir_toplam_bayi);?></code></td>
</tr>

<? } ?>

<? } ?>

</tbody>
</table>
</div>
</div>

<? }

if($a=="komisyonraporu") {

$tarih1 = basla_time(gd("tarih1"));

$tarih2 = bitir_time(gd("tarih2"));

$benimbayilerim = benimbayilerim($ub['id']);

$user_ekle = "and user_id in ($benimbayilerim)";

$sqladderf = "kupon_time between '$tarih1' and '$tarih2' $user_ekle and hesap_kesim_zaman=''";

$sor = sed_sql_query("select * from kuponlar where $sqladderf group by user_id order by username asc");

if(sed_sql_numrows($sor)<1) { ?>

<? } else { ?>

<div class="card-block p-0">
<div class="table-responsive">
<table class="table mb-0">

<thead>
<tr>
<th class="header" style="border-right: 2px solid #cfd8dc;">Kullanıcı</th>
<th class="header" style="text-align: center;border-right: 2px solid #cfd8dc;">Kupon</th>
<th class="header" style="text-align: center;border-right: 2px solid #cfd8dc;">Ciro</th>
<th class="header" style="text-align: center;border-right: 2px solid #cfd8dc;">Kazandı</th>
<th class="header" style="text-align: center;border-right: 2px solid #cfd8dc;">Kaybetti</th>
<th class="header" style="text-align: center;border-right: 2px solid #cfd8dc;">Bekliyor</th>
<th class="header" style="text-align: center;border-right: 2px solid #cfd8dc;">Sonuç</th>
<th class="header" style="text-align: center;border-right: 2px solid #cfd8dc;">MARJ</th>
<th class="header" style="text-align: center;border-right: 2px solid #cfd8dc;">Kar</th>
<th class="header" style="text-align: center;border-right: 2px solid #cfd8dc;">Komisyon</th>
<th class="header" colspan="2" style="text-align: center;"></th>
</tr>
</thead>
<tbody id="calcall">

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

<tr class="itext-3 c" style="background-color: #ffffff;font-weight: bold;">
<td style="border-right: 2px solid #cfd8dc;"><?=$row['username']; ?></td>
<td style="border-right: 2px solid #cfd8dc;text-align: center;"><?=n($toplam_odenen_adet-$toplam_iptal_adet);?></td>
<td style="border-right: 2px solid #cfd8dc;text-align: center;"><?=nf($toplams['toplam_odenen']-$toplams['toplam_iptal']); ?></td>
<td style="border-right: 2px solid #cfd8dc;color: #05b105!important;text-align: center;"><?=nf($toplams['toplam_kazanan']); ?></td>
<td style="border-right: 2px solid #cfd8dc;color: #f00!important;text-align: center;"><?=nf($toplams['toplam_kaybeden']); ?></td>
<td style="border-right: 2px solid #cfd8dc;text-align: center;"><?=nf($toplams['toplam_devam']); ?></td>
<td style="border-right: 2px solid #cfd8dc;text-align: center;<? if($satir_toplam<0) { ?>color: #f00!important;<? } else { ?> color: #05b105!important;<? } ?>"><?=nf($satir_toplam);?></td>

<td style="border-right: 2px solid #cfd8dc;text-align: center;"><? 



if($teklibayi) { echo "Toplamda"; } else {

if($userim['n_calisma_sekli']=="1") { echo "".getTranslation('ajaxkomisyonraporu13')." %$userim[komisyon]"; } else

if($userim['n_calisma_sekli']=="2") { echo "".getTranslation('ajaxkomisyonraporu14')." %$userim[komisyon]"; }



if($userim['wkdurum']=="1") {echo "($userim[hesap_sahibi_user])"; } 

}

?></td>

<td style="border-right: 2px solid #cfd8dc;text-align: center;<? if($net<0) { ?>color: #f00!important;<? } else { ?>color: #05b105!important;<? } ?>"><?=nf($net);?></td>

<td style="border-right: 2px solid #cfd8dc;text-align: center;"><? 



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

<td width="16" style="border-right: 2px solid #cfd8dc;text-align: center;">
<a class="grid" href="profil.php?userid=<?=$userim['id'];?>" title="Düzenle">
<img src="players/img/members.png" alt="Düzenle" border="0">
</a>
</td>
<td width="16" style="text-align: center;">
<a class="grid" href="bayiduzenle.php?id=<?=$userim['id'];?>" title="Profil">
<img src="players/img/edit.png" alt="Profil" border="0">
</a>
</td>

</tr>

<? } ?>
</tbody>
<tfoot>
<tr class="itext-3 c" style="background-color: #cfd8dc;">
<th style="text-align: left;border-right: 2px solid #e4e5e6;"><?=getTranslation('ajaxkomisyonraporu15')?></th>
<th style="text-align: center;border-right: 2px solid #e4e5e6;"><?=n($top_odenen_adet-$top_iptal_adet);?></th>
<th style="text-align: center;border-right: 2px solid #e4e5e6;"><?=nf($top_odenen-$top_iptal);?></th>
<th style="text-align: center;border-right: 2px solid #e4e5e6;" class="itext-1"><?=nf($top_kazanan);?></th>
<th style="text-align: center;border-right: 2px solid #e4e5e6;color: #f00!important;"><?=nf($top_kaybeden);?></th>
<th style="text-align: center;border-right: 2px solid #e4e5e6;"><?=nf($top_devam);?></th>
<th style="text-align: center;border-right: 2px solid #e4e5e6;<? if($satir_toplam_genel<0) { ?>color: #f00!important;<? } else { ?>color: #05b105!important;<? } ?>"><?=nf($satir_toplam_genel);?></th>

<th style="text-align: center;border-right: 2px solid #e4e5e6;"><? if($teklibayi) { ?>



<?

if($ouser['n_calisma_sekli']=="1") { echo "Kasadan %$ouser[n_komisyon]"; } else

if($ouser['n_calisma_sekli']=="2") { echo "Yatandan %$ouser[n_komisyon]"; } 

?>



<? } ?></th>

<th style="text-align: center;border-right: 2px solid #e4e5e6;<? if($net_top<0) { ?>color: #f00!important;<? } else { ?>color: #05b105!important;<? } ?>"><?=nf($net_top);?></th>

<th style="text-align: center;border-right: 2px solid #e4e5e6;"><?



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



?></th>

<th style="text-align: center;" class="itext-1"></th>
<th style="text-align: center;" class="itext-1"></th>

</tr>
</tfoot>
</table>

<? } ?>

<? }

if($a=="bayidurumdegis") {

$id = gd("id");

$durum = gd("durum");

$bayilerim = "".benimbayilerim($ub['id']).",$id";

$bayi_array = explode(",",$bayilerim);

if(!in_array($id,$bayi_array)) { die("22"); }

bayidurumdegis($id,$durum);

}


if($a=="spordallaridurumdegis") {

$id = gd("id");

$sportipi = gd("sportipi");

$durum = gd("durum");

sed_sql_query("update sistemayar set $sportipi='$durum' where ayar_id='$id'");

}

if($a=="casinodallaridurumdegis") {

$id = gd("id");

$casinotipi = gd("casinotipi");

$durum = gd("durum");

sed_sql_query("update sistemayar set $casinotipi='$durum' where ayar_id='$id'");

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

if(sed_sql_numrows($sor)<1) { ?>

<table class="tablesorter">
<tbody><tr>
<th><?=getTranslation('ajaxusers1')?></th>
</tr>
<tr>
<td></td>
</tr>
<tr>
<td>
<div class="notice info">
<table class="tablesorter">
<tbody><tr>
<td><?=getTranslation('ajaxusers2')?></td>
<td>0</td>
<td><?=getTranslation('ajaxusers3')?></td>
<td>0</td>
<td><?=getTranslation('ajaxusers4')?></td>
<td>0</td>
<td><?=getTranslation('ajaxusers5')?></td>
<td>0</td>
</tr>
<tr>
<td><?=getTranslation('ajaxusers6')?></td>
<td>0</td>
<td><?=getTranslation('ajaxusers7')?></td>
<td>0</td>
<td><?=getTranslation('ajaxusers8')?></td>
<td>0</td>
<td><?=getTranslation('ajaxusers9')?></td>
<td>0.00</td>
</tr>
</tbody></table>
</div>
</td>
</tr>
</tbody></table>
<table class="tablesorter">
<thead>
<tr>
<th>#</th>
<th><?=getTranslation('ajaxusers10')?></th>
<th><?=getTranslation('ajaxusers11')?></th>
<th><?=getTranslation('ajaxusers12')?></th>
<th><?=getTranslation('ajaxusers13')?></th>
<th><?=getTranslation('ajaxusers14')?></th>
<th colspan="6"><?=getTranslation('ajaxusers15')?></th>
</tr>
</thead>
<tbody>
<tr><td colspan="13">
<div class="notice info">
<ul class="list-unordered list-checked2">
<li><?=getTranslation('ajaxusers16')?></li>
<li><?=getTranslation('ajaxusers17')?></li>
<li><?=getTranslation('ajaxusers18')?></li>
<li><?=getTranslation('ajaxusers19')?></li>
<li><?=getTranslation('ajaxusers20')?></li>
<li><?=getTranslation('ajaxusers21')?></li>
</ul>
</div>
</td>
</tr>
</tbody>
</table>

<? } else { 

$obilgi = bilgi("select * from kullanici where id='$id'");

$toplams = bilgi("SELECT COUNT(id) as toplam_kullanicim FROM kullanici WHERE hesap_sahibi_id='$id' and root='0'"); 

$toplams_superbayim = bilgi("SELECT COUNT(id) as toplam_superbayim FROM kullanici WHERE hesap_sahibi_id='$id' and root='0' and wkyetki='1'"); 

$toplams_bayim = bilgi("SELECT COUNT(id) as toplam_bayim FROM kullanici WHERE hesap_sahibi_id='$id' and root='0' and wkyetki='2'"); 

$toplams_musterim = bilgi("SELECT COUNT(id) as toplam_musterim FROM kullanici WHERE hesap_sahibi_id='$id' and root='0' and wkyetki='3'"); 

$toplams_pasifler = bilgi("SELECT COUNT(id) as toplam_pasifler FROM kullanici WHERE hesap_sahibi_id='$id' and root='0' and durum='0'"); 

$toplams_canliyasak = bilgi("SELECT COUNT(id) as toplam_canliyasak FROM kullanici WHERE hesap_sahibi_id='$id' and root='0' and canlioynama='0'"); 

$toplams_hareketsizhesap = bilgi("SELECT COUNT(id) as toplam_hareketsizhesap FROM kullanici WHERE hesap_sahibi_id='$id' and root='0' and sonislem=''"); 

$toplams_bakiyeler = bilgi("SELECT SUM(bakiye) as toplam_bakiyeler FROM kullanici WHERE hesap_sahibi_id='$id' and root='0'"); 

$toplams_bakiyeler_superbayiler = bilgi("SELECT SUM(bakiye) as toplam_bakiyeler_superbayi FROM kullanici WHERE hesap_root_id='$id' and root='0'");

if($ub["alt_durum"]=="1" && $ub["alt_alt_durum"]=="0"){
	$bakiyelerini_ver_toplam = nf($toplams_bakiyeler['toplam_bakiyeler']+$toplams_bakiyeler_superbayiler['toplam_bakiyeler_superbayi']);
} else {
	$bakiyelerini_ver_toplam = nf($toplams_bakiyeler['toplam_bakiyeler']);
}

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

$.get('../ajax_superadmin.php?a=bayidurumdegis&id='+id+'&durum='+durum+'',function(data) { bayiler('<?=$id;?>'); });

}

function bayisil(id,uname) {

var rand = Math.random();

if(confirm(''+uname+' <?=getTranslation('ajaxusers22')?>')) {

$.get('../ajax_superadmin.php?a=bayisil&id='+id+'&rand='+rand+'',function(data) { $("#users").html(data); bayiler('<?=$id;?>'); });	

}	

}

</script>

<table class="tablesorter">
<tbody><tr>
<th><?=getTranslation('ajaxusers1')?></th>
</tr>
<tr>
<td></td>
</tr>
<tr>
<td>
<div class="notice info">
<table class="tablesorter">
<tbody><tr>
<td><?=getTranslation('ajaxusers2')?></td>
<td><?=$toplams['toplam_kullanicim']; ?></td>
<td><?=getTranslation('ajaxusers3')?></td>
<td><?=$toplams_superbayim['toplam_superbayim']; ?></td>
<td><?=getTranslation('ajaxusers4')?></td>
<td><?=$toplams_bayim['toplam_bayim']; ?></td>
<td><?=getTranslation('ajaxusers5')?></td>
<td><?=$toplams_musterim['toplam_musterim']; ?></td>
</tr>
<tr>
<td><?=getTranslation('ajaxusers6')?></td>
<td><?=$toplams_pasifler['toplam_pasifler']; ?></td>
<td><?=getTranslation('ajaxusers7')?></td>
<td><?=$toplams_canliyasak['toplam_canliyasak']; ?></td>
<td><?=getTranslation('ajaxusers8')?></td>
<td><?=$toplams_hareketsizhesap['toplam_hareketsizhesap']; ?></td>
<td><?=getTranslation('ajaxusers9')?></td>
<td><?=$bakiyelerini_ver_toplam; ?></td>
</tr>
</tbody></table>
</div>
</td>
</tr>
</tbody></table>

<table class="tablesorter">
<thead>
<? if($id!=$ub['id']) { ?>
<tr>
<th colspan="12"><a href="javascript:javascript:bayiler('<?=$ub['id']; ?>');" style="float:left;margin-right:20px;" class="grid" title="Geri"><img src="img/help_back.png" border="0"></a> <font style="color:#fff;font-size:15px;">( <?=$obilgi['username']; ?> )</font> <?=getTranslation('ajaxusers24')?></th>
</tr>
<? } ?>
<tr>
<th>#</th>

<th><?=getTranslation('ajaxusers10')?></th>
<th><?=getTranslation('ajaxusers12')?></th>
<th><?=getTranslation('ajaxusers11')?></th>
<th><?=getTranslation('ajaxusers13')?></th>
<th><?=getTranslation('ajaxusers14')?></th>
<? if($ub['alt_durum']>0 && $ub['alt_alt_durum']==0) { ?>
<th colspan="6"><?=getTranslation('ajaxusers15')?></th>
<? } else if($ub['wkyetki']==1) { ?>
<th colspan="6"><?=getTranslation('ajaxusers15')?></th>
<? } else { ?>
<th colspan="5"><?=getTranslation('ajaxusers15')?></th>
<? } ?>

</tr>
</thead>
<tbody>

<?

while($row=sed_sql_fetcharray($sor)) {

$alttotal=sed_sql_numrows(sed_sql_query("select hesap_sahibi_id from kullanici where hesap_sahibi_id='$row[id]' and root='0'"));

$toplams_bakiyeleriniver = bilgi("SELECT SUM(bakiye) as toplam_bakiyesiniver FROM kullanici WHERE hesap_sahibi_id='$row[id]' and root='0'");

if($row["wkyetki"]==1){
	$bakiye_ver = nf($row['bakiye']+$toplams_bakiyeleriniver['toplam_bakiyesiniver']);
} else {
	$bakiye_ver = nf($row['bakiye']);
}

?>


<tr class="c">

<td style="text-align:center"><?=$row['id']; ?></td>
<td style="text-align:center"><?=$row['username']; ?></td>
<td style="text-align:center"><?=$row['hatirlatmaad']; ?></td>
<td style="text-align:center"><?=hesap_tipi($row['id']); ?></td>
<td style="text-align:center"><?=$bakiye_ver; ?> <?=getTranslation('parabirimi')?></td>
<td style="text-align:center"><? if($alttotal>0) { ?><a href="javascript:;" onClick="bayiler('<?=$row['id']; ?>');" class="redlink"><?=getTranslation('ajaxusers23')?> (<?=$alttotal?>)</a> <? } else { ?>---<? } ?></td>


<td style="text-align:center" width="16">
<? if($row['durum']=="1") { $dur = 1; echo "<img src='players/img/bayiler/status_1.png' title='".getTranslation('ajaxusers27')."' alt='Durum' border='0'>"; } else if($row['durum']=="0") { $dur = 0; echo "<img src='players/img/bayiler/status_2.png' title='".getTranslation('ajaxusers28')."' alt='Durum' border='0'>"; } ?>
</td>

<td style="text-align:center" width="40">

<? if($dur==1) { ?>
<a href="javascript:;" onClick="bayidurum('<?=$row['id']; ?>','0');"><font style="color:#f00;font-weight:bold;"><?=getTranslation('ajaxusers25')?></font></a>
<? } else if($dur==0) { ?>
<a href="javascript:;" onClick="bayidurum('<?=$row['id']; ?>','1');"><font style="color:#0f8311;font-weight:bold;"><?=getTranslation('ajaxusers26')?></font></a>
<? } ?>

</td>

<? if($ub['alt_durum']>0 && $ub['alt_alt_durum']==0) { ?>
<td width="16">
<a class="grid" href="bakiyeisleadmin.php?id=<?=$row['id']; ?>" title="<?=getTranslation('ajaxusers29')?>">
<img src="players/img/bayiler/money.png" alt="<?=getTranslation('ajaxusers29')?>" border="0">
</a>
</td>
<? } else if($ub['wkyetki']==1) { ?>
<td width="16">
<a class="grid" href="bakiye_isle.php?id=<?=$row['id']; ?>" title="<?=getTranslation('ajaxusers29')?>">
<img src="players/img/bayiler/money.png" alt="<?=getTranslation('ajaxusers29')?>" border="0">
</a>
</td>
<? } ?>


<td style="text-align:center" width="16">
<a class="grid" href="javascript:;" title="<?=getTranslation('ajaxusers30')?>" onClick="bayisil('<?=$row['id']; ?>','<?=$row['username']; ?>');" >
<img src="players/img/bayiler/deleteyetki.png" alt="<?=getTranslation('ajaxusers30')?>" border="0">
</a>
</td>


<? if($id!=$ub['id']) { ?> 

<td style="text-align:center" width="16"></td>

<? } else { ?>

<td style="text-align:center" width="16">
<a class="grid" href="userediting.php?id=<?=$row['id']; ?>" title="<?=getTranslation('ajaxusers31')?>"><img src="players/img/bayiler/edit.png" alt="Düzenle" border="0"></a>
</td>

<? } ?>



<td style="text-align:center" width="16">
<a class="grid" href="profil.php?userid=<?=$row['id']; ?>" title="<?=getTranslation('ajaxusers31')?>"><img src="players/img/bayiler/members.png" alt="Profil" border="0"></a>
</td>
</tr>



<? } ?>

<tr><td colspan="13">
<div class="notice info">
<ul class="list-unordered list-checked2">
<? if($ub['alt_durum']>0 && $ub['alt_alt_durum']==0) { ?>
<li><?=getTranslation('ajaxusers32')?></li>
<li><?=getTranslation('ajaxusers33')?></li>
<li><?=getTranslation('ajaxusers34')?></li>
<? } else if($ub['wkyetki']==1) { ?>
<li><?=getTranslation('ajaxusers35')?></li>
<? } else { ?>
<li><?=getTranslation('ajaxusers36')?></li>
<li><?=getTranslation('ajaxusers37')?></li>
<li><?=getTranslation('ajaxusers38')?></li>
<? } ?>
</ul>
</div>
</td>
</tr>
</tbody>
</table>

<? }

}

if($a=="tumkuponlarim") {

$kuponno = gd("kupon_no");

$tarih1 = basla_time(gd("tarih1"));

$tarih2 = bitir_time(gd("tarih2"));

$satir = gd("satir");

$durum = gd("durum");

$tip = gd("tip");

$order = gd("order");

$ascdesc = gd("ascdesc");

$pageper = 50;

if($ascdesc=="asc") { $yenidesk = "desc"; } else { $yenidesk = "asc"; }

$userid = gd("userid");


$benimbayilerim = benimbayilerim($ub['id']);

$bayi_array = explode(",",$benimbayilerim);





if(strstr($userid,"-plus")) { 

$idbul = explode("-",$userid); $idalti = $idbul[0]; 

$onunkiler = benimbayilerim($idalti);

$userid = $idalti;

} 





if(!empty($userid) && in_array($userid,$bayi_array)) { 

if($onunkiler) {

	$user_ekle = "and user_id in ($onunkiler)";

} else {

	$user_ekle = "and user_id='$userid'"; 

}

} else { 

$user_ekle = "and user_id in ($benimbayilerim)"; 

}





if(!empty($kuponno)) { $kupon_ekle = "and id='$kuponno'"; } else { $kupon_ekle = ""; }

if(!empty($satir)) {

if($satir=="kombine") { $satir_ekle = "and toplam_mac>1"; } else

if($satir==3) { $satir_ekle = "and toplam_mac>2"; } else

if($satir==1 || $satir==2) { $satir_ekle = "and toplam_mac='$satir'"; }	

} else {

$satir_ekle = "";	

}

if(!empty($durum)) { $durum_ekle = "and durum='$durum'"; } else { $durum_ekle = ""; }

if(!empty($tip)) {

if($tip=="1") { $tip_ekle = "and canli='1' and canlib='0' and futbol='0' and basketbol='0' and voleybol='0' and duello='0'"; } else

if($tip=="2") { $tip_ekle = "and canlib='1' and canli='0' and futbol='0' and basketbol='0' and voleybol='0' and duello='0'"; } else

if($tip=="3") { $tip_ekle = "and futbol='1' and canli='0' and canlib='0' and basketbol='0' and voleybol='0' and duello='0'"; } else

if($tip=="4") { $tip_ekle = "and basketbol='1' and canli='0' and canlib='0' and futbol='0' and voleybol='0' and duello='0'"; } else

if($tip=="5") { $tip_ekle = "and voleybol='1' and canli='0' and canlib='0' and futbol='0' and basketbol='0' and duello='0'"; }	else

if($tip=="6") { $tip_ekle = "and duello='1' and voleybol='0' and canli='0' and canlib='0' and futbol='0' and basketbol='0'"; }	else

if($tip=="7") { $tip_ekle = "and canli='3'"; }	

} else {

$tip_ekle = "";	

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


$sqladder_sayfalama = "$user_ekle and kupon_time between '$tarih1' and '$tarih2' $kupon_ekle $satir_ekle $durum_ekle $tip_ekle and hesap_kesim_zaman=''";

$s_sor = sed_sql_query("select count(id) from $tablo where id!='' $sqladder_sayfalama") or trigger_error(sed_sql_error(),E_USER_ERROR);

$satir = sed_sql_result($s_sor,0);

sed_sql_freeresult($s_sor);

if($satir >0){//sonuç varsa

$baslama = ($gelen_sayfa > 1) ? (($gelen_sayfa -1) * $limit) : 0 ;

$sayfa_kac = $satir/$limit;

$sayfa_sayisi = ($satir % $limit != 0) ? intval($sayfa_kac)+1 : intval($sayfa_kac);

$basla=( $satir >= $baslama ) ? $baslama : 0 ;

unset( $sayfa_kac, $baslama );


$sqladder = "$user_ekle and kupon_time between '$tarih1' and '$tarih2' $kupon_ekle $sahip_ekle $satir_ekle $durum_ekle $tip_ekle and hesap_kesim_zaman=''";


$sor = sed_sql_query("select * from kuponlar where id!='' $sqladder order by CAST($order AS UNSIGNED) $ascdesc limit $basla,$limit");

$i=1;

$style='';

$toplams_yatan_tl = bilgi("SELECT SUM(CASE WHEN id!='' THEN yatan END) as toplam_odenen_2 FROM kuponlar WHERE id!='' $sqladder");

$toplams_kazanan_tl = bilgi("SELECT SUM(CASE WHEN durum='2' THEN tutar END) as toplam_kazanan_2 FROM kuponlar WHERE id!='' $sqladder");

$toplams_bekleyen_tl = bilgi("SELECT SUM(CASE WHEN durum='2' AND odendi='0' THEN tutar END) as toplam_bekleyen_2 FROM kuponlar WHERE id!='' $sqladder");

$toplams_kupon = bilgi("SELECT COUNT(CASE WHEN id!='' THEN id END) as toplam_kupon FROM kuponlar WHERE id!='' $sqladder");

$toplams_kazanan = bilgi("SELECT COUNT(CASE WHEN durum='2' THEN id END) as toplam_kazanan FROM kuponlar WHERE id!='' $sqladder");

$toplams_kaybeden = bilgi("SELECT COUNT(CASE WHEN durum='3' THEN id END) as toplam_kaybeden FROM kuponlar WHERE id!='' $sqladder");

$toplams_bekleyen = bilgi("SELECT COUNT(CASE WHEN durum='1' THEN id END) as toplam_bekleyen FROM kuponlar WHERE id!='' $sqladder");

$toplams_iptal = bilgi("SELECT COUNT(CASE WHEN durum='4' THEN id END) as toplam_iptal FROM kuponlar WHERE id!='' $sqladder");

$toplams_canli = bilgi("SELECT COUNT(CASE WHEN canli='1' OR canlib='1' OR canlit='1' OR canliv='1' OR canlibuz='1' OR canlih='1' THEN id END) as toplam_canli FROM kuponlar WHERE id!='' $sqladder");

$toplams_normal = bilgi("SELECT COUNT(CASE WHEN futbol='1' OR basketbol='1' OR tenis='1' OR voleybol='1' OR buzhokeyi='1' OR hentbol='1' THEN id END) as toplam_normal FROM kuponlar WHERE id!='' $sqladder");

if(sed_sql_numrows($sor)<1) {  } else {

?>

<div class="space_9 clear"></div>
<div class="middle" style="text-align: center;background: #fff;margin-top: 4px;height: 71px;">
<div class="informer">
<a href="#">
<span class="title"><?=n($toplams_kupon['toplam_kupon']); ?></span>
<span class="text"><?=getTranslation('ajaxtumkuponlarim1')?></span>
</a>
</div>
<div class="informer">
<a href="#">
<span class="title"><?=n($toplams_kazanan['toplam_kazanan']); ?></span>
<span class="text"><?=getTranslation('ajaxtumkuponlarim2')?></span>
</a>
</div>
<div class="informer">
<a href="#">
<span class="title"><?=n($toplams_kaybeden['toplam_kaybeden']); ?></span>
<span class="text"><?=getTranslation('ajaxtumkuponlarim3')?></span>
</a>
</div>
<div class="informer">
<a href="#">
<span class="title"><?=n($toplams_bekleyen['toplam_devam']); ?></span>
<span class="text"><?=getTranslation('ajaxtumkuponlarim4')?></span>
</a>
</div>
<div class="informer">
<a href="#">
<span class="title"><?=n($toplams_iptal['toplam_iptal']); ?></span>
<span class="text"><?=getTranslation('ajaxtumkuponlarim5')?></span>
</a>
</div>
<div class="informer">
<a href="#">
<span class="title"><?=n($toplams_canli['toplam_canli']); ?></span>
<span class="text"><?=getTranslation('ajaxtumkuponlarim6')?></span>
</a>
</div>
<div class="informer">
<a href="#">
<span class="title"><?=n($toplams_normal['toplam_normal']); ?></span>
<span class="text"><?=getTranslation('ajaxtumkuponlarim7')?></span>
</a>
</div>
</div>

<div class="new_sheet cf panelHead">

<div class="sheet_c1 left" style="padding: 0px; width: 41px;"><a class=""><span class=""><?=getTranslation('ajaxtumkuponlarim8')?></span></a></div>

<div class="sheet_c1 left" style="padding: 0px;width: 77px;border-right: 1px solid #a8d3e6;text-align: center;"><a class=""><span class=""><?=getTranslation('ajaxtumkuponlarim9')?></span></a></div>

<div class="sheet_c1 left" style="padding: 0px;width: 92px;border-right: 1px solid #a8d3e6;text-align: center;"><a class=""><span class=""><?=getTranslation('ajaxtumkuponlarim10')?></span></a></div>

<div class="sheet_c1 left" style="padding: 0px;width: 88px;border-right: 1px solid #a8d3e6;text-align: center;"><a class=""><span class=""><?=getTranslation('ajaxtumkuponlarim11')?></span></a></div>

<div class="sheet_c1 left" style="padding: 0px;width: 88px;border-right: 1px solid #a8d3e6;text-align: center;"><a class=""><span class=""><?=getTranslation('ajaxtumkuponlarim12')?></span></a></div>	

<div class="sheet_c1 left" style="padding: 0px;width: 88px;border-right: 1px solid #a8d3e6;text-align: center;"><a class=""><span class=""><?=getTranslation('ajaxtumkuponlarim13')?></span></a></div>

<div class="sheet_c1 left" style="padding: 0px;width: 88px;border-right: 1px solid #a8d3e6;text-align: center;"><a class=""><span class=""><?=getTranslation('ajaxtumkuponlarim14')?></span></a></div>

<div class="sheet_c1 left" style="padding: 0px;width: 45px;border-right: 1px solid #a8d3e6;text-align: center;"><a class=""><span class=""><?=getTranslation('ajaxtumkuponlarim15')?></span></a></div>

<div class="sheet_c1 left" style="padding: 0px;width: 139px;border-right: 1px solid #a8d3e6;text-align: center;"><a class=""><span class=""><?=getTranslation('ajaxtumkuponlarim16')?></span></a></div>

</div>

<div class="tooltip" id="tooltip"></div>

<div class="space_9"></div>

<div class="new_sheet" style="margin-top: 0px;">

<?

while($row=sed_sql_fetcharray($sor)) { 
$canli_var = 0;
$hesap_sahibi_bul = bilgi("SELECT hesap_sahibi_user FROM kullanici WHERE username='$row[username]'");
$sor2 = sed_sql_query("select * from kupon_ic where kupon_id='$row[id]'");
while($row2=sed_sql_fetcharray($sor2)) {
if($row2['spor_tip']=="canli" || $row2['spor_tip']=="canlib" || $row2['spor_tip']=="canlit" || $row2['spor_tip']=="canliv" || $row2['spor_tip']=="canlibuz" || $row2['spor_tip']=="canlimt"){ $canli_var = 1; }
}
?>


<div class="header cf" id="kuponid_<?=$row['id']; ?>" style="color: #<? if($row['durum']==1){ ?>000<? } else if($row['durum']==2){ ?>89d047<? } else if($row['durum']==3){ ?>ff0404<? } else if($row['durum']==4){ ?>21a5d2<? } ?>;">
<div class="sheet_c2 pad_l_6 left" onmouseout="untip()" onmouseover="tip('<?=durumnedir($row['durum']); ?>', 0)" style="background: #<? if($row['durum']==1){ ?>f6f7f5<? } else if($row['durum']==2){ ?>89d047<? } else if($row['durum']==3){ ?>ff0404<? } else if($row['durum']==4){ ?>21a5d2<? } ?>;line-height: 29px;width: 25px;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">
<div class="marg_txt lightblue">
<? if($row['durum']==1){ ?>
<img title="Bekliyor" src="assets/img/ticket/ticket_3.png" alt="" width="9" height="9" style="width: 12px;height: 12px;vertical-align: middle;">
<? } else if($row['durum']==2){ ?>
<img title="Kazandı" src="assets/img/ticket/ticket_1.png" alt="" width="9" height="9" style="width: 12px;height: 12px;vertical-align: middle;">
<? } else if($row['durum']==3){ ?>
<img title="Kaybetti" src="assets/img/ticket/ticket_2.png" alt="" width="9" height="9" style="width: 12px;height: 12px;vertical-align: middle;">
<? } else if($row['durum']==4){ ?>
<img title="İptal Edildi" src="assets/img/ticket/ticket_4.png" alt="" width="9" height="9" style="width: 12px;height: 12px;vertical-align: middle;">
<? } ?>
</div>
</div>
<div class="sheet_c1 left" style="background: #<? if($row['durum']==1){ ?>f6f7f5<? } else if($row['durum']==2){ ?>89d047<? } else if($row['durum']==3){ ?>ff0404<? } else if($row['durum']==4){ ?>21a5d2<? } ?>;height: 31px;border-right: 1px solid #a8d3e6;">				
<div id="jq-<?=$row['id']; ?>" class="sheet_tab " style="margin: 6px 0 0 0px;" onclick="javascript:MyTicket.Report(<?=$row['id']; ?>);void(0);"><?=$row['id']; ?></div>
</div>

<div class="sheet_c2 pad_l_6 left" onmouseout="untip()" onmouseover="tip('<?=$hesap_sahibi_bul['hesap_sahibi_user'];?>(<?=$row['username']; ?>) <br> <?=getTranslation('ajaxtumkuponlarim17')?> : <?=$row['kupon_nots']; ?> ', 0)" style="width: 92px;background: #e9f5fb;height: 31px;overflow: hidden;    border-right: 1px solid #a8d3e6;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">
<b><? if($ub['wkyetki']==1 && $ub['alt_durum']==0){ ?><?=$row['username']; ?><? } else if($ub['username']!=$hesap_sahibi_bul['hesap_sahibi_user']){ ?><?=$hesap_sahibi_bul['hesap_sahibi_user'];?>(<?=$row['username']; ?>)<? } else if($ub['username']==$hesap_sahibi_bul['hesap_sahibi_user']){ ?><?=$row['username']; ?><? } ?></b>
</div>

<div class="sheet_c2 pad_l_6 left" onmouseout="untip()" onmouseover="tip('21-11-2019 15:10:30', 0)" style="width: 88px;height: 31px;    border-right: 1px solid #a8d3e6;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">
<b><?=date("d-m",$row['kupon_time']); ?></b>&nbsp;<?=date("H:i:s",$row['kupon_time']); ?>
</div>

<div class="sheet_c2 pad_l_6 left" onmouseout="untip()" onmouseover="tip('<?=getTranslation('ajaxtumkuponlarim18')?> : <?=nf($row['yatan']); ?> (K)', 0)" style="width: 88px;    border-right: 1px solid #a8d3e6;background: #e9f5fb;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">
<b><?=nf($row['yatan']); ?> (K)</b>
</div>

<div class="sheet_c2 pad_l_6 left" onmouseout="untip()" onmouseover="tip('T. <?=getTranslation('ajaxtumkuponlarim19')?> : <?=nf($row['oran']); ?>', 0)" style="width: 88px;    border-right: 1px solid #a8d3e6;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">
<b><?=nf($row['oran']); ?></b>
</div>

<div class="sheet_c2 pad_l_6 left" onmouseout="untip()" onmouseover="tip('Max. <?=getTranslation('ajaxtumkuponlarim20')?> : <?=nf($row['tutar']); ?> (K)', 0)" style="width: 88px;    border-right: 1px solid #a8d3e6;background: #e9f5fb;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">
<b><?=nf($row['tutar']); ?> (K)</b>
</div>

<div class="sheet_c2 pad_l_6 left" onmouseout="untip()" onmouseover="tip('<?=getTranslation('ajaxtumkuponlarim21')?> : <?=$row['toplam_mac']; ?> <br> <?=getTranslation('ajaxtumkuponlarim22')?> : <?=$row['tutan']; ?>', 0)" style="width: 45px;    border-right: 1px solid #a8d3e6;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">
<b><?=$row['toplam_mac']; ?>/<?=$row['tutan']; ?></b>
</div>

<div class="sheet_c2 pad_l_6 left" style="width: 27px;    border-right: 1px solid #a8d3e6;background: #e9f5fb;line-height: 41px;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">
<a class="grid" onmouseout="untip()" onmouseover="tip('<?=getTranslation('ajaxtumkuponlarim23')?>', 0)" href="javascript:;" onClick="kuponyazdir('<?=$row['id']; ?>');">
<img src="assets/img/ticket/print.png" border="0">
</a>
</div>

<div class="sheet_c2 pad_l_6 left" style="width: 27px;    border-right: 1px solid #a8d3e6;background: #e9f5fb;line-height: 41px;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">

<? 

$baslama = $row['baslamatime'];

$yatirma_zaman = $row['kupon_time'];

$gecen_zaman = time()-$yatirma_zaman;

$silme_sure = 5*60;

$suan = time();

$baslamavefark = $baslama-$suan;

$tarih_ver = date("Y.m.d");

$iptalsayisi = bilgi("SELECT COUNT(CASE WHEN id!='' THEN id END) as toplam_iptal_adet FROM iptal_listesi WHERE iptal_user_id='$ub[id]' and tarih='$tarih_ver'");

$toplam_iptal_adeti = $iptalsayisi['toplam_iptal_adet'];

if($canli_var!=1) {

if($ub['alt_durum']==0 && userayar('iptal_limit')>$toplam_iptal_adeti) {

if(

($row['canli']=="0" && $gecen_zaman<$silme_sure && $baslamavefark>0  && $row['durum']!="4") || 

($ub['alt_durum']>0 && $baslamavefark>0 && $row['durum']!="4") || 

($ub['alt_alt_durum']>0 && $row['durum']!="4") || ($ub['alt_durum']>0 && $row['durum']!="4") ) { 

?>

<a class="grid" onmouseout="untip()" onmouseover="tip('<?=getTranslation('ajaxtumkuponlarim24')?>', 0)" href="javascript:;" onclick="kupon_iptal('<?=$row['id']; ?>');" title="İptal">
<img src="assets/img/ticket/delete.png" alt="İptal" border="0">
</a>

<? } ?>

<? } ?>

<? } ?>

<?

if($ub['alt_durum']>0) {

if(

($row['canli']=="0" && $gecen_zaman<$silme_sure && $baslamavefark>0  && $row['durum']!="4") || 

($ub['alt_durum']>0 && $baslamavefark>0 && $row['durum']!="4") || 

($ub['alt_alt_durum']>0 && $row['durum']!="4") || ($ub['alt_durum']>0 && $row['durum']!="4") ) { 

?>

<a class="grid" onmouseout="untip()" onmouseover="tip('<?=getTranslation('ajaxtumkuponlarim24')?>', 0)" href="javascript:;" onclick="kupon_iptal('<?=$row['id']; ?>');" title="İptal">
<img src="assets/img/ticket/delete.png" alt="İptal" border="0">
</a>

<? } ?>

<? } ?>

</div>

<div class="sheet_c2 pad_l_6 left" style="width: 27px;    border-right: 1px solid #a8d3e6;background: #e9f5fb;line-height: 41px;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;"></div>

<div class="sheet_c2 pad_l_6 left" style="width: 27px;    border-right: 1px solid #a8d3e6;background: #e9f5fb;line-height: 41px;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;"></div>

<div class="sheet_c2 pad_l_6 left" style="width: 27px;    border-right: 1px solid #a8d3e6;background: #e9f5fb;line-height: 41px;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">
<a class="grid" onmouseout="untip()" onmouseover="tip('<?=getTranslation('ajaxtumkuponlarim25')?>', 0)" href="javascript:kupongoruntule('<?=$row['id']; ?>');" title="Görüntüle">
<img src="assets/img/ticket/sheet_zoom-1DDB2A5ADBB9A1DD91D6A0584C8AE0BE.png" alt="Görüntüle" border="0">
</a>
</div>

</div>

<? } ?>

<div class="space"></div>
<div class="space_9 clear"></div>

<div class="new_sheet cf panelHead" style="margin-top: -3px;">
<div class="sheet_c1 left" style="padding: 0px;width: 300px;border-right: 1px solid #a8d3e6;text-align: center;">
<a class="uline"><span class=""><?=getTranslation('ajaxtumkuponlarim34')?>:</span></a>
</div>

<div class="sheet_c1 left" onmouseout="untip()" onmouseover="tip('<?=getTranslation('ajaxtumkuponlarim26')?>: <?=nf($toplams_yatan_tl['toplam_odenen_2']); ?> (K)', 0)" style="padding: 0px;width: 88px;border-right: 1px solid #a8d3e6;text-align: center;">
<a class=""><span class=""><b><?=nf($toplams_yatan_tl['toplam_odenen_2']); ?> (K)</b></span></a>
</div>

<div class="sheet_c1 left" style="padding: 0px;width: 88px;border-right: 1px solid #a8d3e6;text-align: center;">
<a class="uline"><span class=""></span></a>
</div>

<div class="sheet_c1 left" onmouseout="untip()" onmouseover="tip('<?=getTranslation('ajaxtumkuponlarim27')?>: <?=nf($toplams_kazanan_tl['toplam_kazanan_2']); ?> (K)', 0)" style="padding: 0px;width: 88px;border-right: 1px solid #a8d3e6;text-align: center;">
<a class=""><span class=""><b><?=nf($toplams_kazanan_tl['toplam_kazanan_2']); ?> (K)</b></span></a>
</div>

<div class="sheet_c1 left" onmouseout="untip()" onmouseover="tip('<?=getTranslation('ajaxtumkuponlarim28')?>:<?=nf($toplams_bekleyen_tl['toplam_bekleyen_2']); ?> (K)', 0)" style="padding: 0px;width: 185px;border-right: 1px solid #a8d3e6;text-align: center;">
<a class=""><span class=""><?=getTranslation('ajaxtumkuponlarim35')?>: <b><?=nf($toplams_bekleyen_tl['toplam_bekleyen_2']); ?> (K)</b></span></a>
</div>

</div>

<div class="space_9"></div>
<div class="space"></div>

<span>
<div class="sheet_body_sub on cf">
<div class="main_box pager cf">
<div class="left" style="width: 100%">
<div class="div_center">

<? $style = ($style=='') ? '2' : '';

$i++;

} ?>
			

			<? 
		$hangi_sayfa= ($gelen_sayfa > 0)? $gelen_sayfa : 1 ;
		echo '<div class="inline" style="height: 38px;line-height: 24px;"><nav class="zipagin-light light-green">';	
	
	
			$alt= ($gelen_sayfa - $s_s);
			if($sayfa_sayisi <= $s_s || $gelen_sayfa <= $s_s ) {$alt=1;} 
			$ust= (($gelen_sayfa + $s_s)< $sayfa_sayisi ) ? ($gelen_sayfa + $s_s) : ($sayfa_sayisi);	
			echo ($gelen_sayfa > 1 )? '<a class="" href="javascript:;" onclick="kupongetir(1,1);" id="sayfaveri">'.getTranslation('ajaxtumkuponlarim30').'</a><a class="" href="javascript:;" id="sayfaveri" onclick="kupongetir(1,'.($gelen_sayfa -1).');">« '.getTranslation('ajaxtumkuponlarim31').'</a>':' ';
			for($i=$alt; $i<=$ust ;$i++){		
				echo ($i != $gelen_sayfa ) ? '<a class="" href="javascript:;" id="sayfaveri" onclick="kupongetir(1,'.$i.');">'.$i.'</a>' : '<span>'.$i.'</span>';
				}
			echo ($gelen_sayfa < $sayfa_sayisi)? '<a class="" href="javascript:;" id="sayfaveri" onclick="kupongetir(1,'.($gelen_sayfa +1).');">'.getTranslation('ajaxtumkuponlarim32').' »</a><a class="" href="javascript:;" id="sayfaveri" onclick="kupongetir(1,'.$sayfa_sayisi.');">'.getTranslation('ajaxtumkuponlarim33').'</a>' :'';
			echo '</nav></div>';
?>

</div>
</div>
</div>
</div>
</span>

<? } else { ?>

<div class="space_9 clear"></div>

<div class="space_9 clear"></div>

<div class="new_sheet cf panelHead" style="margin-top: 0px;text-align: center;border-top: 3px solid #ef8107;">
<?=getTranslation('ajaxtumkuponlarim29')?>
</div>

<? } ?>

<script>

function kupon_iptal(id) {

if(confirm(''+id+' <?=getTranslation('ajaxtumkuponlarim36')?>')) {

loadall();

var rand = Math.random();

$.get('../ajax.php?a=kuponiptal&id='+id+'&rand='+rand+'',function(data) { 

if(data=="401") { alert('<?=getTranslation('ajaxtumkuponlarim37')?>.'); } else

if(data=="404") { alert('<?=getTranslation('ajaxtumkuponlarim38')?>.'); } else

if(data=="405") { alert('<?=getTranslation('ajaxtumkuponlarim39')?>.'); } else {

kupongetir(5);

limitupdate();

}

});

}

}

</script>



<? }

if($a=="kuponlarim") {

$kuponno = gd("kupon_no");

$tarih1 = basla_time(gd("tarih1"));

$tarih2 = bitir_time(gd("tarih2"));

$satir = gd("satir");

$durum = gd("durum");

$tip = gd("tip");

$pageper = 50;

$kupon_sure = gd("kupon_sure");

$order = gd("order");

$ascdesc = gd("ascdesc");

if($ascdesc=="asc") { $yenidesk = "desc"; } else { $yenidesk = "asc"; }





if(!empty($kuponno)) { $kupon_ekle = "and id='$kuponno'"; } else { $kupon_ekle = ""; }

if(!empty($satir)) {

if($satir=="kombine") { $satir_ekle = "and toplam_mac>1"; } else

if($satir==3) { $satir_ekle = "and toplam_mac>2"; } else

if($satir==1 || $satir==2) { $satir_ekle = "and toplam_mac='$satir'"; }	

} else {

$satir_ekle = "";	

}

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

if(!empty($tip)) {

if($tip=="0") { $tip_ekle = ""; } else

if($tip=="1") { $tip_ekle = "and canli='1' and canlib='0' and canlit='0' and canliv='0' and canlibuz='0' and canlih='0' and futbol='0' and basketbol='0' and tenis='0' and voleybol='0' and buzhokeyi='0' and hentbol='0' and duello='0'"; } else

if($tip=="2") { $tip_ekle = "and canli='0' and canlib='1' and canlit='0' and canliv='0' and canlibuz='0' and canlih='0' and futbol='0' and basketbol='0' and tenis='0' and voleybol='0' and buzhokeyi='0' and hentbol='0' and duello='0'"; } else

if($tip=="3") { $tip_ekle = "and canli='0' and canlib='0' and canlit='1' and canliv='0' and canlibuz='0' and canlih='0' and futbol='0' and basketbol='0' and tenis='0' and voleybol='0' and buzhokeyi='0' and hentbol='0' and duello='0'"; } else

if($tip=="4") { $tip_ekle = "and canli='0' and canlib='0' and canlit='0' and canliv='1' and canlibuz='0' and canlih='0' and futbol='0' and basketbol='0' and tenis='0' and voleybol='0' and buzhokeyi='0' and hentbol='0' and duello='0'"; } else

if($tip=="5") { $tip_ekle = "and canli='0' and canlib='0' and canlit='0' and canliv='0' and canlibuz='1' and canlih='0' and futbol='0' and basketbol='0' and tenis='0' and voleybol='0' and buzhokeyi='0' and hentbol='0' and duello='0'"; } else

if($tip=="6") { $tip_ekle = "and canli='0' and canlib='0' and canlit='0' and canliv='0' and canlibuz='0' and canlih='1' and futbol='0' and basketbol='0' and tenis='0' and voleybol='0' and buzhokeyi='0' and hentbol='0' and duello='0'"; } else

if($tip=="7") { $tip_ekle = "and canli='0' and canlib='0' and canlit='0' and canliv='0' and canlibuz='0' and canlih='0' and futbol='1' and basketbol='0' and tenis='0' and voleybol='0' and buzhokeyi='0' and hentbol='0' and duello='0'"; } else

if($tip=="8") { $tip_ekle = "and canli='0' and canlib='0' and canlit='0' and canliv='0' and canlibuz='0' and canlih='0' and futbol='0' and basketbol='1' and tenis='0' and voleybol='0' and buzhokeyi='0' and hentbol='0' and duello='0'"; } else

if($tip=="9") { $tip_ekle = "and canli='0' and canlib='0' and canlit='0' and canliv='0' and canlibuz='0' and canlih='0' and futbol='0' and basketbol='0' and tenis='1' and voleybol='0' and buzhokeyi='0' and hentbol='0' and duello='0'"; } else

if($tip=="10") { $tip_ekle = "and canli='0' and canlib='0' and canlit='0' and canliv='0' and canlibuz='0' and canlih='0' and futbol='0' and basketbol='0' and tenis='0' and voleybol='1' and buzhokeyi='0' and hentbol='0' and duello='0'"; } else

if($tip=="11") { $tip_ekle = "and canli='0' and canlib='0' and canlit='0' and canliv='0' and canlibuz='0' and canlih='0' and futbol='0' and basketbol='0' and tenis='0' and voleybol='0' and buzhokeyi='1' and hentbol='0' and duello='0'"; } else

if($tip=="12") { $tip_ekle = "and canli='0' and canlib='0' and canlit='0' and canliv='0' and canlibuz='0' and canlih='0' and futbol='0' and basketbol='0' and tenis='0' and voleybol='0' and buzhokeyi='0' and hentbol='1' and duello='0'"; } else

if($tip=="13") { $tip_ekle = "and canli='3'"; }	

} else {

$tip_ekle = "";	

}

$bugun = date('d.m.Y H:i:s');
$yenitarih = strtotime('-30 minute',strtotime($bugun));
$yenitarih = date('d.m.Y H:i:s' ,$yenitarih );
$yenitarih2 = strtotime('-1 hour',strtotime($bugun));
$yenitarih2 = date('d.m.Y H:i:s' ,$yenitarih2 );
$yenitarih3 = strtotime('-3 hour',strtotime($bugun));
$yenitarih3 = date('d.m.Y H:i:s' ,$yenitarih3 );
$yenitarih4 = strtotime('-6 hour',strtotime($bugun));
$yenitarih4 = date('d.m.Y H:i:s' ,$yenitarih4 );

if(!empty($kupon_sure)) {

if($kupon_sure=="0") { $kupon_sure_ekle = ""; } else

if($kupon_sure=="1") { $kupon_sure_ekle = "and kupon_tarih > '$yenitarih'"; } else

if($kupon_sure=="2") { $kupon_sure_ekle = "and kupon_tarih > '$yenitarih2'"; } else 

if($kupon_sure=="3") { $kupon_sure_ekle = "and kupon_tarih > '$yenitarih3'"; } else

if($kupon_sure=="4") { $kupon_sure_ekle = "and kupon_tarih > '$yenitarih4'"; }

} else {

$kupon_sure_ekle = "";	

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

$sqladder_sayfalama = "and user_id='$ub[id]' and kupon_time between '$tarih1' and '$tarih2' $kupon_ekle $satir_ekle $durum_ekle $tip_ekle $kupon_sure_ekle and hesap_kesim_zaman=''";


$s_sor = sed_sql_query("select count(id) from $tablo where id!='' $sqladder_sayfalama") or trigger_error(sed_sql_error(),E_USER_ERROR);

$satir = sed_sql_result($s_sor,0);

sed_sql_freeresult($s_sor);

if($satir >0){//sonuç varsa

$baslama = ($gelen_sayfa > 1) ? (($gelen_sayfa -1) * $limit) : 0 ;

$sayfa_kac = $satir/$limit;

$sayfa_sayisi = ($satir % $limit != 0) ? intval($sayfa_kac)+1 : intval($sayfa_kac);

$basla=( $satir >= $baslama ) ? $baslama : 0 ;

unset( $sayfa_kac, $baslama );



$sqladder = "and user_id='$ub[id]' and kupon_time between '$tarih1' and '$tarih2' $kupon_ekle $sahip_ekle $satir_ekle $durum_ekle $tip_ekle $kupon_sure_ekle and hesap_kesim_zaman=''";

$sor = sed_sql_query("select * from kuponlar where id!='' $sqladder order by CAST($order AS UNSIGNED) $ascdesc limit $basla,$limit");

$i=1;

$style='';


$toplams_kupon = bilgi("SELECT COUNT(CASE WHEN id!='' THEN id END) as toplam_kupon FROM kuponlar WHERE id!='' $sqladder");

$toplams_kazanan = bilgi("SELECT COUNT(CASE WHEN durum='2' THEN id END) as toplam_kazanan FROM kuponlar WHERE id!='' $sqladder");

$toplams_kaybeden = bilgi("SELECT COUNT(CASE WHEN durum='3' THEN id END) as toplam_kaybeden FROM kuponlar WHERE id!='' $sqladder");

$toplams_bekleyen = bilgi("SELECT COUNT(CASE WHEN durum='1' THEN id END) as toplam_bekleyen FROM kuponlar WHERE id!='' $sqladder");

$toplams_iptal = bilgi("SELECT COUNT(CASE WHEN durum='4' THEN id END) as toplam_iptal FROM kuponlar WHERE id!='' $sqladder");

$toplams_canli = bilgi("SELECT COUNT(CASE WHEN canli='1' OR canlib='1' OR canlit='1' OR canliv='1' OR canlibuz='1' OR canlih='1' THEN id END) as toplam_canli FROM kuponlar WHERE id!='' $sqladder");

$toplams_normal = bilgi("SELECT COUNT(CASE WHEN futbol='1' OR basketbol='1' OR tenis='1' OR voleybol='1' OR buzhokeyi='1' OR hentbol='1' THEN id END) as toplam_normal FROM kuponlar WHERE id!='' $sqladder");

if(sed_sql_numrows($sor)<1) { echo "<div class='nokuponda'>Herhangi bir kupon bulunamadı.</div>"; } else {

?>

<div class="space_9 clear"></div>
<div class="middle" style="text-align: center;background: #fff;margin-top: 4px;height: 71px;">
<div class="informer">
<a href="#">
<span class="title"><?=n($toplams_kupon['toplam_kupon']); ?></span>
<span class="text">Toplam</span>
</a>
</div>
<div class="informer">
<a href="#">
<span class="title"><?=n($toplams_kazanan['toplam_kazanan']); ?></span>
<span class="text">Kazandı</span>
</a>
</div>
<div class="informer">
<a href="#">
<span class="title"><?=n($toplams_kaybeden['toplam_kaybeden']); ?></span>
<span class="text">Kaybetti</span>
</a>
</div>
<div class="informer">
<a href="#">
<span class="title"><?=n($toplams_bekleyen['toplam_devam']); ?></span>
<span class="text">Bekliyor</span>
</a>
</div>
<div class="informer">
<a href="#">
<span class="title"><?=n($toplams_iptal['toplam_iptal']); ?></span>
<span class="text">İptal</span>
</a>
</div>
<div class="informer">
<a href="#">
<span class="title"><?=n($toplams_canli['toplam_canli']); ?></span>
<span class="text">Canlı</span>
</a>
</div>
<div class="informer">
<a href="#">
<span class="title"><?=n($toplams_normal['toplam_normal']); ?></span>
<span class="text">Normal</span>
</a>
</div>
</div>

<div class="space_9 clear"></div>
<div class="new_sheet cf panelHead">
		
<div class="sheet_c1 left" style="padding: 0px; width: 41px;">
<a class=""><span class="">Durum</span></a>
</div>

<div class="sheet_c1 left" style="padding: 0px;width: 77px;border-right: 1px solid #a8d3e6;text-align: center;">
<a class=""><span class="">Kupon No</span></a>
</div>

<div class="sheet_c1 left" style="padding: 0px;width: 92px;border-right: 1px solid #a8d3e6;text-align: center;">
<a class=""><span class="">Kullanıcı</span></a>
</div>

<div class="sheet_c1 left" style="padding: 0px;width: 88px;border-right: 1px solid #a8d3e6;text-align: center;">
<a class=""><span class="">Tarih</span></a>
</div>

<div class="sheet_c1 left" style="padding: 0px;width: 88px;border-right: 1px solid #a8d3e6;text-align: center;">
<a class=""><span class="">Yatırılan</span></a>
</div>

<div class="sheet_c1 left" style="padding: 0px;width: 88px;border-right: 1px solid #a8d3e6;text-align: center;">
<a class=""><span class="">Toplam Oran</span></a>
</div>

<div class="sheet_c1 left" style="padding: 0px;width: 88px;border-right: 1px solid #a8d3e6;text-align: center;">
<a class=""><span class="">Max. Kazanç</span></a>
</div>

<div class="sheet_c1 left" style="padding: 0px;width: 45px;border-right: 1px solid #a8d3e6;text-align: center;">
<a class=""><span class="">Oyun</span></a>
</div>

<div class="sheet_c1 left" style="padding: 0px;width: 139px;border-right: 1px solid #a8d3e6;text-align: center;">
<a class=""><span class="">Eylemler</span></a>
</div>

</div>

<div class="space_9"></div>

<div class="new_sheet" style="margin-top: 0px;">

<?

while($row=sed_sql_fetcharray($sor)) { 
$canli_var = 0;
$sor2 = sed_sql_query("select * from kupon_ic where kupon_id='$row[id]'");
while($row2=sed_sql_fetcharray($sor2)) {
if($row2['spor_tip']=="canli" || $row2['spor_tip']=="canlib" || $row2['spor_tip']=="canlit" || $row2['spor_tip']=="canliv" || $row2['spor_tip']=="canlibuz" || $row2['spor_tip']=="canlimt"){ $canli_var = 1; }
}
?>

<div class="header cf" id="kuponid_<?=$row['id']; ?>" style="color: #<? if($row['durum']==1){ ?>000<? } else if($row['durum']==2){ ?>89d047<? } else if($row['durum']==3){ ?>ff0404<? } else if($row['durum']==4){ ?>21a5d2<? } ?>;">
<div class="sheet_c2 pad_l_6 left" onmouseout="untip()" onmouseover="tip('<?=durumnedir($row['durum']); ?>', 0)" style="background: #<? if($row['durum']==1){ ?>f6f7f5<? } else if($row['durum']==2){ ?>89d047<? } else if($row['durum']==3){ ?>ff0404<? } else if($row['durum']==4){ ?>21a5d2<? } ?>;line-height: 29px;width: 25px;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">
<div class="marg_txt lightblue">
<? if($row['durum']==1){ ?>
<img title="Bekliyor" src="assets/img/ticket/ticket_3.png" alt="" width="9" height="9" style="margin-top:9px;width: 12px;height: 12px;vertical-align: middle;">
<? } else if($row['durum']==2){ ?>
<img title="Kazandı" src="assets/img/ticket/ticket_1.png" alt="" width="9" height="9" style="margin-top:9px;width: 12px;height: 12px;vertical-align: middle;">
<? } else if($row['durum']==3){ ?>
<img title="Kaybetti" src="assets/img/ticket/ticket_2.png" alt="" width="9" height="9" style="margin-top:9px;width: 12px;height: 12px;vertical-align: middle;">
<? } else if($row['durum']==4){ ?>
<img title="İptal Edildi" src="assets/img/ticket/ticket_4.png" alt="" width="9" height="9" style="margin-top:9px;width: 12px;height: 12px;vertical-align: middle;">
<? } ?>
</div>
</div>
<div class="sheet_c1 left" style="background: #<? if($row['durum']==1){ ?>f6f7f5<? } else if($row['durum']==2){ ?>89d047<? } else if($row['durum']==3){ ?>ff0404<? } else if($row['durum']==4){ ?>21a5d2<? } ?>;height: 31px;border-right: 1px solid #a8d3e6;">				
<div id="jq-14036820453" class="sheet_tab " style="margin: 6px 0 0 0px;" onclick="kd<?=$row['id']; ?>('<?=$row['id']; ?>');"><?=$row['id']; ?></div>
</div>

<div class="sheet_c2 pad_l_6 left" onmouseout="untip()" onmouseover="tip('<?=$row['username']; ?> <br> Açıklama : <? if($row['kupon_nots']) { echo $row['kupon_nots']; }?>', 0)" style="width: 92px;background: #e9f5fb;height: 31px;overflow: hidden;    border-right: 1px solid #a8d3e6;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">
<b><?=$row['username']; ?></b>
</div>

<div class="sheet_c2 pad_l_6 left" onmouseout="untip()" onmouseover="tip('<?=date("d-m-Y H:i:s",$row['kupon_time']); ?>', 0)" style="width: 88px;height: 31px;    border-right: 1px solid #a8d3e6;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">
<b><?=date("d-m",$row['kupon_time']); ?></b>&nbsp;<?=date("H:i:s",$row['kupon_time']); ?>
</div>

<div class="sheet_c2 pad_l_6 left" onmouseout="untip()" onmouseover="tip('Yatırılan : <?=nf($row['yatan']); ?> (K)', 0)" style="width: 88px;    border-right: 1px solid #a8d3e6;background: #e9f5fb;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">
<b><?=nf($row['yatan']); ?> (K)</b>
</div>

<div class="sheet_c2 pad_l_6 left" onmouseout="untip()" onmouseover="tip('T. Oran : <?=nf($row['oran']); ?>', 0)" style="width: 88px;    border-right: 1px solid #a8d3e6;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">
<b><?=nf($row['oran']); ?></b>
</div>

<div class="sheet_c2 pad_l_6 left" onmouseout="untip()" onmouseover="tip('MAx. Kazanç : <?=nf($row['tutar']); ?> (K)', 0)" style="width: 88px;    border-right: 1px solid #a8d3e6;background: #e9f5fb;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">
<b><?=nf($row['tutar']); ?> (K)</b>
</div>

<div class="sheet_c2 pad_l_6 left" onmouseout="untip()" onmouseover="tip('Bahis : <?=$row['toplam_mac']; ?> <br> Tutan Bahis : <?=$row['tutan']; ?>', 0)" style="width: 45px;    border-right: 1px solid #a8d3e6;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">
<b><?=$row['toplam_mac']; ?>/<?=$row['tutan']; ?></b>
</div>

<div class="sheet_c2 pad_l_6 left" style="width: 27px;    border-right: 1px solid #a8d3e6;background: #e9f5fb;line-height: 41px;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">
<a class="grid" onmouseout="untip()" onmouseover="tip('Kuponu Yazdır', 0)" href="javascript:;" onClick="kuponyazdir('<?=$row['id']; ?>');"><img style="margin-top:6px;" src="/assets/img/ticket/print.png" border="0"></a>
</div>

<div class="sheet_c2 pad_l_6 left" style="width: 27px;    border-right: 1px solid #a8d3e6;background: #e9f5fb;line-height: 41px;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">

<? 

$baslama = $row['baslamatime'];

$yatirma_zaman = $row['kupon_time'];

$gecen_zaman = time()-$yatirma_zaman;

$silme_sure = 300;

$suan = time();

$baslamavefark = $baslama-$suan;

$tarih_ver = date("Y.m.d");

$iptalsayisi = bilgi("SELECT COUNT(CASE WHEN id!='' THEN id END) as toplam_iptal_adet FROM iptal_listesi WHERE iptal_user_id='$ub[id]' and tarih='$tarih_ver'");

$toplam_iptal_adeti = $iptalsayisi['toplam_iptal_adet'];

if($canli_var!=1) {

if($ub['alt_durum']==0 && userayar('iptal_limit')>$toplam_iptal_adeti) {

if(

($row['canli']=="0" && $gecen_zaman<$silme_sure && $baslamavefark>0  && $row['durum']!="4") || 

($ub['alt_durum']>0 && $baslamavefark>0 && $row['durum']!="4") || 

($ub['alt_alt_durum']>0 && $row['durum']!="4") || ($ub['alt_durum']>0 && $row['durum']!="4") ) { 

?>

<a class="grid" onmouseout="untip()" onmouseover="tip('Kuponu İptal Et', 0)" href="javascript:;" onclick="kupon_iptal('<?=$row['id']; ?>');" title="İptal">
<img src="assets/img/ticket/delete.png" alt="İptal" border="0">
</a>

<? } ?>

<? } ?>

<? } ?>

<?

if($canli_var!=1) {

if($ub['alt_durum']>0) {

if(

($row['canli']=="0" && $gecen_zaman<$silme_sure && $baslamavefark>0  && $row['durum']!="4") || 

($ub['alt_durum']>0 && $baslamavefark>0 && $row['durum']!="4") || 

($ub['alt_alt_durum']>0 && $row['durum']!="4") || ($ub['alt_durum']>0 && $row['durum']!="4") ) { 

?>

<a class="grid" onmouseout="untip()" onmouseover="tip('Kuponu İptal Et', 0)" href="javascript:;" onclick="kupon_iptal('<?=$row['id']; ?>');" title="İptal">
<img src="assets/img/ticket/delete.png" alt="İptal" border="0">
</a>

<? } ?>

<? } ?>

<? } ?>

</div>

<div class="sheet_c2 pad_l_6 left" style="width: 27px;    border-right: 1px solid #a8d3e6;background: #e9f5fb;line-height: 41px;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">

<? if($row['durum']=="2" && $row['odendi']=="0") { ?>

<i onclick="kupon_odendi('<?=$row['id']; ?>');" class="fa fa-dollar"></i>

<? } ?>

</div>

<div class="sheet_c2 pad_l_6 left" style="width: 27px;    border-right: 1px solid #a8d3e6;background: #e9f5fb;line-height: 41px;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;"></div>

<div class="sheet_c2 pad_l_6 left" style="width: 27px;    border-right: 1px solid #a8d3e6;background: #e9f5fb;line-height: 41px;height: 31px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;padding: 0;">
<a class="grid" onmouseout="untip()" onmouseover="tip('Kuponu Görüntüle', 0)" href="javascript:kupongoruntule('<?=$row['id']; ?>');" title="Görüntüle"><img src="/assets/img/ticket/sheet_zoom-1DDB2A5ADBB9A1DD91D6A0584C8AE0BE.png" style="margin-top:6px;" alt="Görüntüle" border="0"></a>
</div>

</div>

<? } ?>

</div>

<div class="space_9"></div>
<div class="space"></div>

<span>
<div class="sheet_body_sub on cf">
<div class="main_box pager cf">
<div class="left" style="width: 100%">
<div class="div_center">

<? $style = ($style=='') ? '2' : '';

$i++;

} ?>
			

			<? 
		$hangi_sayfa= ($gelen_sayfa > 0)? $gelen_sayfa : 1 ;
		echo '<div class="inline" style="height: 38px;line-height: 24px;"><nav class="zipagin-light light-green">';	
	
	
			$alt= ($gelen_sayfa - $s_s);
			if($sayfa_sayisi <= $s_s || $gelen_sayfa <= $s_s ) {$alt=1;} 
			$ust= (($gelen_sayfa + $s_s)< $sayfa_sayisi ) ? ($gelen_sayfa + $s_s) : ($sayfa_sayisi);	
			echo ($gelen_sayfa > 1 )? '<a class="" href="javascript:;" onclick="kupongetir(1,1);" id="sayfaveri">İlk Sayfa</a><a class="" href="javascript:;" id="sayfaveri" onclick="kupongetir(1,'.($gelen_sayfa -1).');">« Geri</a>':' ';
			for($i=$alt; $i<=$ust ;$i++){		
				echo ($i != $gelen_sayfa ) ? '<a class="" href="javascript:;" id="sayfaveri" onclick="kupongetir(1,'.$i.');">'.$i.'</a>' : '<span>'.$i.'</span>';
				}
			echo ($gelen_sayfa < $sayfa_sayisi)? '<a class="" href="javascript:;" id="sayfaveri" onclick="kupongetir(1,'.($gelen_sayfa +1).');">İleri »</a><a class="" href="javascript:;" id="sayfaveri" onclick="kupongetir(1,'.$sayfa_sayisi.');">Son Sayfa</a>' :'';
			echo '</nav></div>';
?>

</div>
</div>
</div>
</div>
</span>

<? } else { echo '<tr><td colspan="5" class="s_yok">Hiç Bir Sonuç Bulunamadı</td></tr></table>'; } ?>

</div>

<script>

function kupon_iptal(id) {

if(confirm(''+id+' Numaralı kuponu iptal etmek istediğinizden emin misiniz?')) {

loadall();

var rand = Math.random();

$.get('../ajax.php?a=kuponiptal&id='+id+'&rand='+rand+'',function(data) { 

if(data=="401") { alert('Bu kuponu iptal etmek için gereken yetkiye sahip değilsiniz.'); } else

if(data=="404") { alert('Bu kuponu iptal etmek için gereken süreyi aştınız.'); } else

if(data=="405") { alert('Günlük Kupon İptal Limitiniz Bitmiştir.'); } else {

kupongetir(5);

limitupdate();

}

});

}

}

function kupon_odendi(id) {

if(confirm(''+id+' Numaralı kupon ödendi olarak işaretlensin mi?')) {

loadall();

var rand = Math.random();

$.get('../ajax.php?a=kuponodendi&id='+id+'&rand='+rand+'',function(data) { 

if(data=="401") { alert('Bu kuponu iptal etmek için gereken yetkiye sahip değilsiniz.'); } else

if(data=="404") { alert('Bu kuponu iptal etmek için gereken süreyi aştınız.'); } else {

kupongetir(5);

limitupdate();

}

});

}

}

</script>



<? }
@ob_end_flush();
@ob_end_flush();

sed_sql_close($connection_id);
?>