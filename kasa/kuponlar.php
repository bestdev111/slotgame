<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); exit(); }

if(gd("start")>0){
$tarih1 = gd("start");
$tarih2 = gd("end");
} else {
$tarih1 = date("d-m-Y",strtotime('Last Tuesday'));
$tarih2 = date("d-m-Y",strtotime('Monday'));
}

$tarih_1_ver = basla_time($tarih1);
$tarih_2_ver = bitir_time($tarih2);

$durum = gd("ktip");

$userid = gd("userid");

$kuponno = gd("kid");

?>
<?php include 'header.php'; ?>

<main class="main">
<ol class="breadcrumb mb-0">
<li class="breadcrumb-item"><?=getTranslation('superadmin27')?></li>
</ol>
<div class="alert alert-danger mb-0" id="error"></div>
<div class="alert alert-info mb-0" id="info"></div>
<div class="alert alert-success mb-0" id="success"></div>
<div class="container-fluid mt-2">
<div class="row">
<div class="card">
<div class="card-header">
<?=getTranslation('superadmin27')?> : <?=$tarih1;?> - <?=$tarih2;?></div>
<div class="card-header">
<div class="row">
<form method="GET" action="">
<div class="col-sm-2">
<input type="text" class="form-control pickadate picker__input tcal tcalInput" id="start" name="start" autocomplete="off" value="
<? if($tarih1>0){ ?>
<?=$tarih1;?>
<? } else { ?>
<?=date("d-m-Y",strtotime('Last Tuesday')); ?>
<? } ?>
" size="7" style="text-align:center;">
</div>
<div class="col-sm-2">
<input type="text" class="form-control pickadate picker__input tcal tcalInput" id="end" name="end" autocomplete="off" value="
<? if($tarih2>0){ ?>
<?=$tarih2;?>
<? } else { ?>
<?=date("d-m-Y"); ?>
<? } ?>
" size="7" style="text-align:center;">
</div>
<div class="col-sm-2">
<input type="text" name="kid" id="kid" placeholder="<?=getTranslation('playerskuponno')?>" value="<? if($kuponno){ ?><?=$kuponno;?><? } ?>" class="form-control" autocomplete="off">
</div>

<?
$bayilerim = benimbayilerim($ub['id']);
?>
<div class="col-sm-2">
<select class="form-control" style="width:150px;" name="userid" id="userid">
<optgroup style="text-transform: uppercase;color:red;" label="<?=getTranslation('superadmin182')?>">
<option style="color:#000;text-transform: none;" value=""><?=getTranslation('tumhesaplar')?></option>
</optgroup>

<?
$sor = sed_sql_query("select * from kullanici where hesap_sahibi_id='".$ub['id']."' and root='0' order by id asc");
if(sed_sql_numrows($sor)>0) {
while($row=sed_sql_fetcharray($sor)) { ?>

<optgroup style="text-transform: uppercase;color:red;" label="<?=$row['username'];?>">
<option style="color:#000;text-transform: none;" <? if($userid=="".$row['id']."-plus"){ ?>selected<? } ?> value="<?=$row['id'];?>-plus"><?=getTranslation('tumhesaplar')?></option>
<option style="color:#000;text-transform: none;" <? if($userid==$row['id']){ ?>selected<? } ?> value="<?=$row['id'];?>"><?=$row['username']; ?></option>

<?
$sor2 = sed_sql_query("select username,id,wkyetki from kullanici where hesap_sahibi_id='".$row['id']."'");
if(sed_sql_numrows($sor2)>0) {
while($row2=sed_sql_fetcharray($sor2)) {
if($row2['wkyetki']==1){
$yetkilidir = "".$row2['id']."-plus";
} else {
$yetkilidir = $row2['id'];
}
?>
<option style="color:#000;text-transform: none;" <? if($userid==$yetkilidir){ ?>selected<? } ?> value="<?=$row2['id'];?><? if($row2['wkyetki']==1){ ?>-plus<? } ?>"> -> <?=$row2['username']; ?></option>
<? } ?>
<? } ?>

</optgroup>

<? } ?>
<? } ?>
</select>
</div>

<div class="col-sm-2">
<select class="form-control" style="width:120px;" name="ktip" id="ktip">
<option value=""><?=getTranslation('superadmin29')?></option>
<option value="2" <? if($durum==2){ ?>selected<? } ?>><?=getTranslation('superadmin30')?></option>
<option value="3" <? if($durum==3){ ?>selected<? } ?>><?=getTranslation('superadmin31')?></option>
<option value="1" <? if($durum==1){ ?>selected<? } ?>><?=getTranslation('superadmin32')?></option>
<option value="4" <? if($durum==4){ ?>selected<? } ?>><?=getTranslation('superadmin33')?></option>
</select>
</div>

<div class="col-sm-2">
<input type="submit" class="btn btn-success btn-block" value="<?=getTranslation('superadmin51')?>" style="margin-top:2px">
</div>
</form>

</div>
</div>
<div class="card-block p-0">
<div class="table-responsive">
<table class="table mb-0">
<thead>
<tr>
<th width="5%">#</th>
<th width="10%"><?=getTranslation('superadmin34')?></th>
<th width="10%"><?=getTranslation('superadmin35')?></th>
<th width="10%"><?=getTranslation('superadmin36')?></th>
<th width="5%"><?=getTranslation('superadmin37')?></th>
<th width="5%"><?=getTranslation('superadmin38')?></th>
<th width="5%"><?=getTranslation('superadmin39')?></th>
<th width="5%"><?=getTranslation('superadmin40')?></th>
<th width="5%"><?=getTranslation('superadmin41')?></th>
</tr>
</thead>
<tbody id="calcall">
<?

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

$pageper = 25;
$gelen_sayfa = (isset($_GET['sayfa']) && $_GET['sayfa'] !='' ) ? intval($_GET['sayfa']) : 1;
$limit = $pageper;
$s_s = 10;

$s_sor = sed_sql_query("select count(id) from kuponlar where id!='' $user_ekle and casino='0' and kupon_time between '$tarih_1_ver' and '$tarih_2_ver' $kupon_ekle $durum_ekle and hesap_kesim_zaman=''") or trigger_error(mysql_error(),E_USER_ERROR);
$satir = sed_sql_result($s_sor,0);
sed_sql_freeresult($s_sor);
if($satir >0){
$baslama = ($gelen_sayfa > 1) ? (($gelen_sayfa -1) * $limit) : 0 ;
$sayfa_kac = $satir/$limit;
$sayfa_sayisi = ($satir % $limit != 0) ? intval($sayfa_kac)+1 : intval($sayfa_kac);
$basla=( $satir >= $baslama ) ? $baslama : 0 ;
unset( $sayfa_kac, $baslama );
$sqladder = "$user_ekle and casino='0' and kupon_time between '$tarih_1_ver' and '$tarih_2_ver' $kupon_ekle $durum_ekle and hesap_kesim_zaman=''";
$sor = sed_sql_query("select * from kuponlar where id!='' $sqladder order by CAST(id AS UNSIGNED) DESC limit $basla,$limit");
$i=1;
$style='';
while($row=sed_sql_fetcharray($sor)) { ?>
<tr>
<td width="10%"><a href="#" onclick="radlo(<?=$row['id']; ?>);" class="btn btn-info m-0" title="Görüntüle"><i class="fa fa-eye"></i></a></td>
<td width="10%"><?=$row['id']; ?></td>
<td width="10%">BK<?=$row['user_id']; ?> (<?=$row['username']; ?>)</td>
<td width="10%"><?=date("d-m-Y H:i:s",$row['kupon_time']); ?></td>
<td width="10%"><code><?=nf($row['yatan']); ?></code></td>
<td width="10%"><code><?=nf($row['oran']); ?></code></td>
<td width="10%"><code><?=nf($row['tutar']); ?></code></td>
<td width="10%"><span class="tag tag-<? if($row['durum']==1){ ?>warning<? } else if($row['durum']==2){ ?>success<? } else if($row['durum']==3){ ?>danger<? } else if($row['durum']==4){ ?>info<? } ?>" style="width: 56px;text-align: center;"><?=durumnedir($row['durum']); ?></span></td>
<td width="10%"><? if($row['toplam_mac']=="1") { ?><?=getTranslation('superadmin47')?><? } else if($row['toplam_mac']=="2") { ?><?=getTranslation('superadmin48')?><? } else if($row['toplam_mac']=="3") { ?><?=getTranslation('superadmin49')?><? } else if($row['toplam_mac']>3) { ?><?=getTranslation('superadmin50')?><? } ?><br><code><?=$row['toplam_mac']; ?>/<?=$row['tutan']; ?></code></td>
</tr>

<? if($row['canli']==3){ ?>

<tr id="cdt_<?=$row['id']; ?>" style="display:none;">
<td colspan="9">
<table class="table mb-0">
<thead>
<tr>
<th width="10%"><?=getTranslation('yeniyerler_kasa511')?></th>
<th width="15%" style="text-align:left;"><?=getTranslation('yeniyerler_kasa512')?></th>
<th width="5%"><?=getTranslation('yeniyerler_kasa513')?></th>
<th width="5%"><?=getTranslation('yeniyerler_kasa514')?></th>
<th width="5%"><?=getTranslation('yeniyerler_kasa515')?></th>
<th width="5%"><?=getTranslation('yeniyerler_kasa516')?></th>
<th width="5%"><?=getTranslation('yeniyerler_kasa517')?></th>
<th width="5%"><?=getTranslation('yeniyerler_kasa518')?></th>
</tr>
</thead>
<tbody>

<?
$sor2 = sed_sql_query("select * from kupon_ic_sanal where kupon_id='$row[id]'");
while($row2=sed_sql_fetcharray($sor2)) {
?>

<tr>

<td width="10%"><? if($row2['spor_tip']=="vflm_v2") { ?><?=getTranslation('yeniyerler_kasa496')?>
<? } else if($row2['spor_tip']=="vfct_v2") { ?><?=getTranslation('yeniyerler_kasa499')?>
<? } else if($row2['spor_tip']=="vfcc_v2") { ?><?=getTranslation('yeniyerler_kasa500')?>
<? } else if($row2['spor_tip']=="vfwc_v2") { ?><?=getTranslation('yeniyerler_kasa501')?>
<? } else if($row2['spor_tip']=="vfec_v2") { ?><?=getTranslation('yeniyerler_kasa502')?>
<? } else if($row2['spor_tip']=="vbl_v2") { ?><?=getTranslation('yeniyerler_kasa503')?>
<? } else if($row2['spor_tip']=="vhc_v2") { ?><?=getTranslation('yeniyerler_kasa504')?>
<? } else if($row2['spor_tip']=="vdr_v2") { ?><?=getTranslation('yeniyerler_kasa505')?>
<? } ?></td>

<td width="15%"><?=$row2['ev_takim']; ?> - <?=$row2['konuk_takim']; ?></td>

<td><?=$row2['oran_tip']; ?></td>

<td><? if($row2['oran_val']=="u"){ ?>Alt<? } else if($row2['oran_val']=="o"){ ?>Üst<? } else { ?><?=$row2['oran_val']; ?><? } ?></td>

<td width="10%"><code><? $oranes = nf($row2['oran']); echo $oranes; ?></code></td>

<td width="10%"><code><? if($row2['kazanma']!="1") { ?><? if($row2['spor_tip']=="vhc_v2" || $row2['spor_tip']=="vdr_v2") { ?>Sonuçlandı<? } else { ?><?=$row2['ms_ev'];?> - <?=$row2['ms_dep'];?> (<?=$row2['iy_ev'];?> - <?=$row2['iy_dep'];?>)<? } ?><? } else { ?>&nbsp;<? } ?></code></td>

<td width="10%"><span class="tag tag-<? if($row2['kazanma']==1){ ?>warning<? } else if($row2['kazanma']==2){ ?>success<? } else if($row2['kazanma']==3){ ?>danger<? } else if($row2['kazanma']==4){ ?>info<? } ?>" style="width: 56px;text-align: center;"><?=durumnedir($row2['kazanma']); ?></span></td>

<td width="10%"><?=date("d-m H:i:s",$row2['mac_time']);?></td>

</tr>

<? } ?>

<tr>
<td width="10%">

<? 

$baslama = $row['baslamatime'];

$yatirma_zaman = $row['kupon_time'];

$gecen_zaman = time()-$yatirma_zaman;

$silme_sure = $ayar['iptal_sure']*60;

$suan = time();

$baslamavefark = $baslama-$suan;

$tarih_ver = date("Y.m.d");

$iptalsayisi = bilgi("SELECT COUNT(CASE WHEN id!='' THEN id END) as toplam_iptal_adet FROM iptal_listesi WHERE iptal_user_id='$ub[id]' and tarih='$tarih_ver'");

$toplam_iptal_adeti = $iptalsayisi['toplam_iptal_adet'];

if($ub['alt_durum']==0 && $ayar['iptal_limit']>$toplam_iptal_adeti) {

if(

($row['canli']=="0" && $gecen_zaman<$silme_sure && $baslamavefark>0  && $row['durum']!="4") || 

($ub['alt_durum']>0 && $baslamavefark>0 && $row['durum']!="4") || 

($ub['alt_alt_durum']>0 && $row['durum']!="4") || ($ub['alt_durum']>0 && $row['durum']!="4") ) { 

?>

<a href="javascript:;" onclick="kupon_iptal('<?=$row['id']; ?>');" class="tag tag-info kupon-cancel" style="text-align: center;"><?=getTranslation('ajaxtumkuponlarim24')?></a>

<? } ?>

<? } ?>

<?

if($ub['alt_durum']>0) {

if(

($row['canli']=="0" && $gecen_zaman<$silme_sure && $baslamavefark>0  && $row['durum']!="4") || 

($ub['alt_durum']>0 && $baslamavefark>0 && $row['durum']!="4") || 

($ub['alt_alt_durum']>0 && $row['durum']!="4") || ($ub['alt_durum']>0 && $row['durum']!="4") ) { 

?>

<a href="javascript:;" onclick="kupon_iptal('<?=$row['id']; ?>');" class="tag tag-info kupon-cancel" style="text-align: center;"><?=getTranslation('ajaxtumkuponlarim24')?></a>

<? } ?>

<? } ?>

</td>


<td width="10%"></td>
<td width="10%"></td>
<td width="10%"></td>
<td width="10%"></td>
<td width="10%"></td>
<td width="10%"></td>
</tr>
</tbody>
</table>
</td>

</tr>

<? } else { ?>

<tr id="cdt_<?=$row['id']; ?>" style="display:none;">
<td colspan="9">
<table class="table mb-0">
<thead>
<tr>
<th width="10%"><?=getTranslation('superadmin42')?></th>
<th width="10%"><?=getTranslation('superadmin41')?></th>
<th width="10%"><?=getTranslation('superadmin43')?></th>
<th width="5%"><?=getTranslation('superadmin40')?></th>
<th width="5%"><?=getTranslation('superadmin36')?></th>
<th width="5%"><?=getTranslation('superadmin44')?></th>
<th width="5%"><?=getTranslation('superadmin45')?></th>
</tr>
</thead>
<tbody>


<?

$sor2 = sed_sql_query("select * from kupon_ic where kupon_id='$row[id]'");
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

$canli_info_bol = explode('|',$row2['canli_info']);

?>

<tr>
<td width="10%"><?=$row2['ev_takim']; ?> - <?=$row2['konuk_takim']; ?></td>
<td width="10%">
<?=$secilen_translate;?>&nbsp;<b><?=$secilen_translate2;?> <? if($row2['oran_val']!=''){ ?><?=$row2['oran_val'];?><? } ?></b>
<? if($canli_info_bol[0]!=''){ ?>
<br>
<font style="font-weight: bold;"><?=$canli_info_bol[0];?></font> | <font style="font-weight: bold;"><?=$canli_info_bol[1];?></font> <?=getTranslation('yeniyerler_kasa212')?>
<? } ?>
</td>
<td width="10%"><code><? $oranes = nf($row2['oran']); echo $oranes; ?></code></td>
<td width="10%"><span class="tag tag-<? if($row2['kazanma']==1){ ?>warning<? } else if($row2['kazanma']==2){ ?>success<? } else if($row2['kazanma']==3){ ?>danger<? } else if($row2['kazanma']==4){ ?>info<? } ?>" style="width: 56px;text-align: center;"><?=durumnedir($row2['kazanma']); ?></span></td>
<td width="10%"><?=date("d-m H:i",$row2['mac_time']);?></td>
<td width="10%"><code><? if($row2['kazanma']!="1") { ?><?=$row2['ms']; ?> (<?=$row2['iy']; ?>)<? } else { ?>&nbsp;<? } ?></code></td>
<td width="10%">
<? if($ub['wkyetki']<1) { ?>
<a href="#" data-kuponid="<?=$row2['kupon_id']; ?>" data-kuponicid="<?=$row2['id']; ?>" data-islem="kupondegisim" data-durum="<?=$row2['kazanma']; ?>" class="btn btn-success m-0 customer-payin-kupondegisim"> <i class="fa fa-edit"></i> </a>
<? } ?>
</td>
</tr>
<? } ?>

<tr>
<td width="10%">

<? 

$baslama = $row['baslamatime'];

$yatirma_zaman = $row['kupon_time'];

$gecen_zaman = time()-$yatirma_zaman;

$silme_sure = $ayar['iptal_sure']*60;

$suan = time();

$baslamavefark = $baslama-$suan;

$tarih_ver = date("Y.m.d");

$iptalsayisi = bilgi("SELECT COUNT(CASE WHEN id!='' THEN id END) as toplam_iptal_adet FROM iptal_listesi WHERE iptal_user_id='$ub[id]' and tarih='$tarih_ver'");

$toplam_iptal_adeti = $iptalsayisi['toplam_iptal_adet'];

if($ub['alt_durum']==0 && $ayar['iptal_limit']>$toplam_iptal_adeti) {

if(

($row['canli']=="0" && $gecen_zaman<$silme_sure && $baslamavefark>0  && $row['durum']!="4") || 

($ub['alt_durum']>0 && $baslamavefark>0 && $row['durum']!="4") || 

($ub['alt_alt_durum']>0 && $row['durum']!="4") || ($ub['alt_durum']>0 && $row['durum']!="4") ) { 

?>

<a href="javascript:;" onclick="kupon_iptal('<?=$row['id']; ?>');" class="tag tag-info kupon-cancel" style="text-align: center;"><?=getTranslation('ajaxtumkuponlarim24')?></a>

<? } ?>

<? } ?>

<?

if($ub['alt_durum']>0) {

if(

($row['canli']=="0" && $gecen_zaman<$silme_sure && $baslamavefark>0  && $row['durum']!="4") || 

($ub['alt_durum']>0 && $baslamavefark>0 && $row['durum']!="4") || 

($ub['alt_alt_durum']>0 && $row['durum']!="4") || ($ub['alt_durum']>0 && $row['durum']!="4") ) { 

?>

<a href="javascript:;" onclick="kupon_iptal('<?=$row['id']; ?>');" class="tag tag-info kupon-cancel" style="text-align: center;"><?=getTranslation('ajaxtumkuponlarim24')?></a>

<? } ?>

<? } ?>

</td>


<td width="10%"></td>
<td width="10%"></td>
<td width="10%"></td>
<td width="10%"></td>
<td width="10%"></td>
<td width="10%"></td>
</tr>
</tbody>
</table>
</td>

</tr>

<? } ?>

<?
$style = ($style=='') ? '2' : '';
$i++;
}
?>
</tbody>

<tfoot>

<? 
$hangi_sayfa= ($gelen_sayfa > 0)? $gelen_sayfa : 1 ;
?>
<tr>
<td colspan="9" class="text-xs-center">
<?
$alt= ($gelen_sayfa - $s_s);
if($sayfa_sayisi <= $s_s || $gelen_sayfa <= $s_s ) {$alt=1;} 
$ust= (($gelen_sayfa + $s_s)< $sayfa_sayisi ) ? ($gelen_sayfa + $s_s) : ($sayfa_sayisi);	
if($gelen_sayfa > 1 ){ ?>

<a class="btn btn-info m-0" href="kuponlar.php?start=<?=$_GET['start'];?>&end=<?=$_GET['end'];?>&kid=<?=$_GET['kid'];?>&userid=<?=$_GET['userid'];?>&ktip=<?=$_GET['ktip'];?>&sayfa=1"><?=getTranslation('ajaxtumkuponlarim30');?></a>

<a class="btn btn-info m-0" href="kuponlar.php?start=<?=$_GET['start'];?>&end=<?=$_GET['end'];?>&kid=<?=$_GET['kid'];?>&userid=<?=$_GET['userid'];?>&ktip=<?=$_GET['ktip'];?>&sayfa=<?=$_GET['sayfa']-1;?>" id="sayfaveri">« <?=getTranslation('ajaxtumkuponlarim31');?></a>

<? } ?>
<?
for($i=$alt; $i<=$ust ;$i++){
if($i != $gelen_sayfa ){ ?>
<a class="btn btn-info m-0" href="kuponlar.php?start=<?=$_GET['start'];?>&end=<?=$_GET['end'];?>&kid=<?=$_GET['kid'];?>&userid=<?=$_GET['userid'];?>&ktip=<?=$_GET['ktip'];?>&sayfa=<?=$i;?>" id="sayfaveri"><?=$i;?></a>
<? } else { ?>
<span class="btn btn-info m-0" style="background-color: #11c540;border-color: #11c540;"><?=$i;?></span>
<? } ?>
<? } if($gelen_sayfa < $sayfa_sayisi){ ?>

<a class="btn btn-info m-0" href="kuponlar.php?start=<?=$_GET['start'];?>&end=<?=$_GET['end'];?>&kid=<?=$_GET['kid'];?>&userid=<?=$_GET['userid'];?>&ktip=<?=$_GET['ktip'];?>&sayfa=<?=$_GET['sayfa']+1;?>" id="sayfaveri"><?=getTranslation('ajaxtumkuponlarim32');?> »</a>

<a class="btn btn-info m-0" href="kuponlar.php?start=<?=$_GET['start'];?>&end=<?=$_GET['end'];?>&kid=<?=$_GET['kid'];?>&userid=<?=$_GET['userid'];?>&ktip=<?=$_GET['ktip'];?>&sayfa=<?=$sayfa_sayisi;?>" id="sayfaveri"><?=getTranslation('ajaxtumkuponlarim33');?></a>

<? } ?>
</td>
</tr>
<style>
.page-link, .pagination a {
    position: relative;
    float: left;
    padding: 0.5rem 0.75rem;
    margin-left: -1px;
    color: #20a8d8;
    text-decoration: none;
    background-color: #fff;
    border: 1px solid #ddd;
}
.page-link, .pagination span {
    position: relative;
    float: left;
    padding: 0.5rem 0.75rem;
    margin-left: -1px;
    color: #20a8d8;
    text-decoration: none;
    background-color: #cfd8dc;
    border: 1px solid #ddd;
}
</style>
<script>
function radlo(x){
$('#cdt_'+x).slideToggle();
}
</script>
</tfoot>
<? } else { ?>
<tr class="no-records-found"><td colspan="5"><?=getTranslation('superadmin46')?></td></tr>
<? } ?>

</table>
</div>
</div>
</div>
</div>
</div>
</main>

<div class="modal fade modal-payin-kupondegisim" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-sm" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Kapat"> <span aria-hidden="true">&times;</span> </button>
<h4 class="modal-title"><?=getTranslation('yeniyerler_kasa213')?></h4>
</div>
<div class="modal-body">
<form id="payin-form-kupondegisim">
<input type="hidden" id="kuponid" name="kuponid" value="">
<input type="hidden" id="kuponicid" name="kuponicid" value="">
<input type="hidden" id="islem" name="islem" value="">
<input type="hidden" id="durum" name="durum" value="">
<input type="hidden" id="type" name="type" value="1">
<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa214')?></label>
<select id="cdurum" name="cdurum" class="form-control" style="width: 98%;">
<option value="2"><?=getTranslation('yeniyerler_kasa215')?></option>
<option value="3"><?=getTranslation('yeniyerler_kasa216')?></option>
<option value="4"><?=getTranslation('yeniyerler_kasa217')?></option>
</select>
<br>
<div id="otherDetails"><?=getTranslation('yeniyerler_kasa218')?><br>
<?=getTranslation('yeniyerler_kasa219')?><br>
<?=getTranslation('yeniyerler_kasa220')?>
</div>
</div>
<div class="form-group">
<button type="button" class="btn btn-block btn-success btn-payin-kupondegisim"><?=getTranslation('superadmin70')?></button>
</div>
</form>
</div>
</div>
</div>
</div>

<script>
function kupon_iptal(id) {
if(confirm(''+id+' <?=getTranslation('ajaxtumkuponlarim36')?>')) {
var rand = Math.random();
$.get('/kasa/index.php?s=kuponiptal&id='+id+'&rand='+rand+'',function(data) { 
if(data=="401") {
$('#error').show().html("<?=getTranslation('ajaxtumkuponlarim37')?>");
$('#info').hide();
$('#success').hide();
} else if(data=="404") {
$('#error').show().html("<?=getTranslation('ajaxtumkuponlarim38')?>");
$('#info').hide();
$('#success').hide();
} else if(data=="405") {
$('#error').show().html("<?=getTranslation('ajaxtumkuponlarim39')?>");
$('#info').hide();
$('#success').hide();
} else {
$('#info').hide();
$('#success').show().html("<?=getTranslation('superadmin96')?>");
$('#error').hide();
window.location.reload();
}
});
}
}
</script>

<?php include 'footer.php'; ?>

</body>
</html>