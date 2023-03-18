<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); exit(); }
if($ub['alt_alt_durum']=='1') { } else if($ayar['casino_yetki']!='1') { header("Location:../"); }
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
<link rel="stylesheet" href="casino/casino2.css">

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

$s_sor = sed_sql_query("select count(id) from kuponlar where id!='' $user_ekle and casino!='0' and kupon_time between '$tarih_1_ver' and '$tarih_2_ver' $kupon_ekle $durum_ekle and hesap_kesim_zaman=''") or trigger_error(mysql_error(),E_USER_ERROR);
$satir = sed_sql_result($s_sor,0);
sed_sql_freeresult($s_sor);
if($satir >0){
$baslama = ($gelen_sayfa > 1) ? (($gelen_sayfa -1) * $limit) : 0 ;
$sayfa_kac = $satir/$limit;
$sayfa_sayisi = ($satir % $limit != 0) ? intval($sayfa_kac)+1 : intval($sayfa_kac);
$basla=( $satir >= $baslama ) ? $baslama : 0 ;
unset( $sayfa_kac, $baslama );
$sqladder = "$user_ekle and casino!='0' and kupon_time between '$tarih_1_ver' and '$tarih_2_ver' $kupon_ekle $durum_ekle and hesap_kesim_zaman=''";
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
<td width="10%"><span class="tag tag-<? if($row['durum']==1){ ?>warning<? } else if($row['durum']==2){ ?>success<? } else if($row['durum']==3){ ?>danger<? } else if($row['durum']==4){ ?>info<? } ?>" style="width: 62px;text-align: center;"><?=durumnedir($row['durum']); ?></span></td>
<td width="10%"><? if($row['toplam_mac']=="1") { ?><?=getTranslation('superadmin47')?><? } else if($row['toplam_mac']=="2") { ?><?=getTranslation('superadmin48')?><? } else if($row['toplam_mac']=="3") { ?><?=getTranslation('superadmin49')?><? } else if($row['toplam_mac']>3) { ?><?=getTranslation('superadmin50')?><? } ?><br><code><?=$row['toplam_mac']; ?>/<?=$row['tutan']; ?></code></td>
</tr>

<? if($row['casino']==1){ ?>

<tr id="cdt_<?=$row['id']; ?>" style="display:none;">
<td colspan="9">
<table class="table mb-0">
<thead>
<tr>
<th width="10%"><?=getTranslation('yeniyerler_kasa221')?></th>
<th width="10%"><?=getTranslation('ajaxtumkuponlarim15')?></th>
<th width="10%"><?=getTranslation('hizligirissecim')?></th>
<th width="5%"><?=getTranslation('ajaxtumkuponlarim8')?></th>
<th width="5%"><?=getTranslation('ajaxtumkuponlarim19')?></th>
<th width="5%">#<?=getTranslation('hizligirissecim')?></th>
<th width="5%"><?=getTranslation('ajaxhesaprapor11')?></th>
</tr>
</thead>
<tbody>

<?

$sor2 = sed_sql_query("select * from kupon_ic_casino where kupon_id='$row[id]'");
while($row2=sed_sql_fetcharray($sor2)) {

if($row2['gameid']==1){
$oyun_isim = "Sayısal Loto 7";
} else if($row2['gameid']==3){
$oyun_isim = "Sayısal Loto 5";
} else if($row2['gameid']==5){
$oyun_isim = "Poker";
} else if($row2['gameid']==6){
$oyun_isim = "Bakara";
} else if($row2['gameid']==7){
$oyun_isim = "Çarkıfelek";
} else if($row2['gameid']==8){
$oyun_isim = "Basmaca";
} else if($row2['gameid']==9){
$oyun_isim = "Sayısal Loto 6";
} else if($row2['gameid']==10){
$oyun_isim = "Zar Düellosu";
} else if($row2['gameid']==12){
$oyun_isim = "6+ Poker";
}
?>

<tr>
<td width="10%"><?=$row2['roundid']; ?></td>
<td width="10%"><?=$oyun_isim;?></td>
<td width="10%"><?=$row2['secenek']; ?> </td>
<td width="10%"><span class="tag tag-<? if($row2['kazanma']==1){ ?>warning<? } else if($row2['kazanma']==2){ ?>success<? } else if($row2['kazanma']==3){ ?>danger<? } else if($row2['kazanma']==4){ ?>info<? } ?>" style="width: 62px;text-align: center;"><?=durumnedir($row2['kazanma']); ?></span></td>
<td width="10%"><code><?=nf($row2['oran']);?></code></td>

<td width="10%">

<? if($row2['gameid']==9){ ?>

<? if($row2['oddid']==553 || $row2['oddid']==554 || $row2['oddid']==555 || $row2['oddid']==559 || $row2['oddid']==560 || $row2['oddid']==561 || $row2['oddid']==562){ ?>
<? if($row2['sayi']==1 || $row2['sayi']==2 || $row2['sayi']==5 || $row2['sayi']==6 || $row2['sayi']==9){ $renk_ver = "red"; } else { $renk_ver = "blue"; } ?>

<div class="syslitem"><div class="lottery-item li-<?=$renk_ver;?>"><span><?=$row2['sayi'];?></span></div></div>

<? } else  if($row2['oddid']==556 || $row2['oddid']==557 || $row2['oddid']==558){ ?>
<? 
$sayi_bol_hadi = explode(',',$row2['sayi']);
if($sayi_bol_hadi[0]==1 || $sayi_bol_hadi[0]==2 || $sayi_bol_hadi[0]==5 || $sayi_bol_hadi[0]==6 || $sayi_bol_hadi[0]==9){ $renk_ver1 = "red"; } else { $renk_ver1 = "blue"; }
if($sayi_bol_hadi[1]==1 || $sayi_bol_hadi[1]==2 || $sayi_bol_hadi[1]==5 || $sayi_bol_hadi[1]==6 || $sayi_bol_hadi[1]==9){ $renk_ver2 = "red"; } else { $renk_ver2 = "blue"; }
?>

<div class="syslitem"><div class="lottery-item li-<?=$renk_ver1;?>"><span><?=$sayi_bol_hadi[0];?></span></div></div>
<div class="syslitem"><div class="lottery-item li-<?=$renk_ver2;?>"><span><?=$sayi_bol_hadi[1];?></span></div></div>

<? } ?>

<? } else if($row2['gameid']==1){ ?>

<? if($row2['oddid']==1 || $row2['oddid']==2){

if($row2['sayi']==1 || $row2['sayi']==3 || $row2['sayi']==5 || $row2['sayi']==8 || $row2['sayi']==10 || $row2['sayi']==12|| $row2['sayi']==13|| $row2['sayi']==15|| $row2['sayi']==17|| $row2['sayi']==20|| $row2['sayi']==22 || $row2['sayi']==24|| $row2['sayi']==26|| $row2['sayi']==27|| $row2['sayi']==29|| $row2['sayi']==32|| $row2['sayi']==34|| $row2['sayi']==36|| $row2['sayi']==37|| $row2['sayi']==39|| $row2['sayi']==41){ $renk_ver = "yellow"; } else { $renk_ver = "black"; }
?>

<div class="syslitem7s" style="display: block;float: left;margin-right: 1px;">
<div class="lottery-item li-<?=$renk_ver;?>" style="width: 24px;height: 24px;"><span><?=$row2['sayi'];?></span></div>
</div>

<? } else  if($row2['oddid']==3){

$sayi_bol_hadi = explode(',',$row2['sayi']);

if($sayi_bol_hadi[0]==1 || $sayi_bol_hadi[0]==3 || $sayi_bol_hadi[0]==5 || $sayi_bol_hadi[0]==8 || $sayi_bol_hadi[0]==10 || $sayi_bol_hadi[0]==12|| $sayi_bol_hadi[0]==13|| $sayi_bol_hadi[0]==15|| $sayi_bol_hadi[0]==17|| $sayi_bol_hadi[0]==20|| $sayi_bol_hadi[0]==22 || $sayi_bol_hadi[0]==24|| $sayi_bol_hadi[0]==26|| $sayi_bol_hadi[0]==27|| $sayi_bol_hadi[0]==29|| $sayi_bol_hadi[0]==32|| $sayi_bol_hadi[0]==34|| $sayi_bol_hadi[0]==36|| $sayi_bol_hadi[0]==37|| $sayi_bol_hadi[0]==39|| $sayi_bol_hadi[0]==41){ $renk_ver1 = "yellow"; } else { $renk_ver1 = "black"; }

if($sayi_bol_hadi[1]==1 || $sayi_bol_hadi[1]==3 || $sayi_bol_hadi[1]==5 || $sayi_bol_hadi[1]==8 || $sayi_bol_hadi[1]==10 || $sayi_bol_hadi[1]==12|| $sayi_bol_hadi[1]==13|| $sayi_bol_hadi[1]==15|| $sayi_bol_hadi[1]==17|| $sayi_bol_hadi[1]==20|| $sayi_bol_hadi[1]==22 || $sayi_bol_hadi[1]==24|| $sayi_bol_hadi[1]==26|| $sayi_bol_hadi[1]==27|| $sayi_bol_hadi[1]==29|| $sayi_bol_hadi[1]==32|| $sayi_bol_hadi[1]==34|| $sayi_bol_hadi[1]==36|| $sayi_bol_hadi[1]==37|| $sayi_bol_hadi[1]==39|| $sayi_bol_hadi[1]==41){ $renk_ver2 = "yellow"; } else { $renk_ver2 = "black"; }

?>

<div class="syslitem7s" style="display: block;float: left;margin-right: 1px;">
<div class="lottery-item li-<?=$renk_ver1;?>" style="width: 24px;height: 24px;"><span><?=$sayi_bol_hadi[0];?></span></div>
</div>
<div class="syslitem7s" style="display: block;float: left;margin-right: 1px;">
<div class="lottery-item li-<?=$renk_ver2;?>" style="width: 24px;height: 24px;"><span><?=$sayi_bol_hadi[1];?></span></div>
</div>

<? } else  if($row2['oddid']==4){

$sayi_bol_hadi = explode(',',$row2['sayi']);

if($sayi_bol_hadi[0]==1 || $sayi_bol_hadi[0]==3 || $sayi_bol_hadi[0]==5 || $sayi_bol_hadi[0]==8 || $sayi_bol_hadi[0]==10 || $sayi_bol_hadi[0]==12|| $sayi_bol_hadi[0]==13|| $sayi_bol_hadi[0]==15|| $sayi_bol_hadi[0]==17|| $sayi_bol_hadi[0]==20|| $sayi_bol_hadi[0]==22 || $sayi_bol_hadi[0]==24|| $sayi_bol_hadi[0]==26|| $sayi_bol_hadi[0]==27|| $sayi_bol_hadi[0]==29|| $sayi_bol_hadi[0]==32|| $sayi_bol_hadi[0]==34|| $sayi_bol_hadi[0]==36|| $sayi_bol_hadi[0]==37|| $sayi_bol_hadi[0]==39|| $sayi_bol_hadi[0]==41){ $renk_ver1 = "yellow"; } else { $renk_ver1 = "black"; }

if($sayi_bol_hadi[1]==1 || $sayi_bol_hadi[1]==3 || $sayi_bol_hadi[1]==5 || $sayi_bol_hadi[1]==8 || $sayi_bol_hadi[1]==10 || $sayi_bol_hadi[1]==12|| $sayi_bol_hadi[1]==13|| $sayi_bol_hadi[1]==15|| $sayi_bol_hadi[1]==17|| $sayi_bol_hadi[1]==20|| $sayi_bol_hadi[1]==22 || $sayi_bol_hadi[1]==24|| $sayi_bol_hadi[1]==26|| $sayi_bol_hadi[1]==27|| $sayi_bol_hadi[1]==29|| $sayi_bol_hadi[1]==32|| $sayi_bol_hadi[1]==34|| $sayi_bol_hadi[1]==36|| $sayi_bol_hadi[1]==37|| $sayi_bol_hadi[1]==39|| $sayi_bol_hadi[1]==41){ $renk_ver2 = "yellow"; } else { $renk_ver2 = "black"; }

if($sayi_bol_hadi[2]==1 || $sayi_bol_hadi[2]==3 || $sayi_bol_hadi[2]==5 || $sayi_bol_hadi[2]==8 || $sayi_bol_hadi[2]==10 || $sayi_bol_hadi[2]==12|| $sayi_bol_hadi[2]==13|| $sayi_bol_hadi[2]==15|| $sayi_bol_hadi[2]==17|| $sayi_bol_hadi[2]==20|| $sayi_bol_hadi[2]==22 || $sayi_bol_hadi[2]==24|| $sayi_bol_hadi[2]==26|| $sayi_bol_hadi[2]==27|| $sayi_bol_hadi[2]==29|| $sayi_bol_hadi[2]==32|| $sayi_bol_hadi[2]==34|| $sayi_bol_hadi[2]==36|| $sayi_bol_hadi[2]==37|| $sayi_bol_hadi[2]==39|| $sayi_bol_hadi[2]==41){ $renk_ver3 = "yellow"; } else { $renk_ver3 = "black"; }

?>

<div class="syslitem7s" style="display: block;float: left;margin-right: 1px;">
<div class="lottery-item li-<?=$renk_ver1;?>" style="width: 24px;height: 24px;"><span><?=$sayi_bol_hadi[0];?></span></div>
</div>
<div class="syslitem7s" style="display: block;float: left;margin-right: 1px;">
<div class="lottery-item li-<?=$renk_ver2;?>" style="width: 24px;height: 24px;"><span><?=$sayi_bol_hadi[1];?></span></div>
</div>
<div class="syslitem7s" style="display: block;float: left;margin-right: 1px;">
<div class="lottery-item li-<?=$renk_ver3;?>" style="width: 24px;height: 24px;"><span><?=$sayi_bol_hadi[2];?></span></div>
</div>

<? } else  if($row2['oddid']==5){

$sayi_bol_hadi = explode(',',$row2['sayi']);

if($sayi_bol_hadi[0]==1 || $sayi_bol_hadi[0]==3 || $sayi_bol_hadi[0]==5 || $sayi_bol_hadi[0]==8 || $sayi_bol_hadi[0]==10 || $sayi_bol_hadi[0]==12|| $sayi_bol_hadi[0]==13|| $sayi_bol_hadi[0]==15|| $sayi_bol_hadi[0]==17|| $sayi_bol_hadi[0]==20|| $sayi_bol_hadi[0]==22 || $sayi_bol_hadi[0]==24|| $sayi_bol_hadi[0]==26|| $sayi_bol_hadi[0]==27|| $sayi_bol_hadi[0]==29|| $sayi_bol_hadi[0]==32|| $sayi_bol_hadi[0]==34|| $sayi_bol_hadi[0]==36|| $sayi_bol_hadi[0]==37|| $sayi_bol_hadi[0]==39|| $sayi_bol_hadi[0]==41){ $renk_ver1 = "yellow"; } else { $renk_ver1 = "black"; }

if($sayi_bol_hadi[1]==1 || $sayi_bol_hadi[1]==3 || $sayi_bol_hadi[1]==5 || $sayi_bol_hadi[1]==8 || $sayi_bol_hadi[1]==10 || $sayi_bol_hadi[1]==12|| $sayi_bol_hadi[1]==13|| $sayi_bol_hadi[1]==15|| $sayi_bol_hadi[1]==17|| $sayi_bol_hadi[1]==20|| $sayi_bol_hadi[1]==22 || $sayi_bol_hadi[1]==24|| $sayi_bol_hadi[1]==26|| $sayi_bol_hadi[1]==27|| $sayi_bol_hadi[1]==29|| $sayi_bol_hadi[1]==32|| $sayi_bol_hadi[1]==34|| $sayi_bol_hadi[1]==36|| $sayi_bol_hadi[1]==37|| $sayi_bol_hadi[1]==39|| $sayi_bol_hadi[1]==41){ $renk_ver2 = "yellow"; } else { $renk_ver2 = "black"; }

if($sayi_bol_hadi[2]==1 || $sayi_bol_hadi[2]==3 || $sayi_bol_hadi[2]==5 || $sayi_bol_hadi[2]==8 || $sayi_bol_hadi[2]==10 || $sayi_bol_hadi[2]==12|| $sayi_bol_hadi[2]==13|| $sayi_bol_hadi[2]==15|| $sayi_bol_hadi[2]==17|| $sayi_bol_hadi[2]==20|| $sayi_bol_hadi[2]==22 || $sayi_bol_hadi[2]==24|| $sayi_bol_hadi[2]==26|| $sayi_bol_hadi[2]==27|| $sayi_bol_hadi[2]==29|| $sayi_bol_hadi[2]==32|| $sayi_bol_hadi[2]==34|| $sayi_bol_hadi[2]==36|| $sayi_bol_hadi[2]==37|| $sayi_bol_hadi[2]==39|| $sayi_bol_hadi[2]==41){ $renk_ver3 = "yellow"; } else { $renk_ver3 = "black"; }

if($sayi_bol_hadi[3]==1 || $sayi_bol_hadi[3]==3 || $sayi_bol_hadi[3]==5 || $sayi_bol_hadi[3]==8 || $sayi_bol_hadi[3]==10 || $sayi_bol_hadi[3]==12|| $sayi_bol_hadi[3]==13|| $sayi_bol_hadi[3]==15|| $sayi_bol_hadi[3]==17|| $sayi_bol_hadi[3]==20|| $sayi_bol_hadi[3]==22 || $sayi_bol_hadi[3]==24|| $sayi_bol_hadi[3]==26|| $sayi_bol_hadi[3]==27|| $sayi_bol_hadi[3]==29|| $sayi_bol_hadi[3]==32|| $sayi_bol_hadi[3]==34|| $sayi_bol_hadi[3]==36|| $sayi_bol_hadi[3]==37|| $sayi_bol_hadi[3]==39|| $sayi_bol_hadi[3]==41){ $renk_ver4 = "yellow"; } else { $renk_ver4 = "black"; }

?>

<div class="syslitem7s" style="display: block;float: left;margin-right: 1px;">
<div class="lottery-item li-<?=$renk_ver1;?>" style="width: 24px;height: 24px;"><span><?=$sayi_bol_hadi[0];?></span></div>
</div>
<div class="syslitem7s" style="display: block;float: left;margin-right: 1px;">
<div class="lottery-item li-<?=$renk_ver2;?>" style="width: 24px;height: 24px;"><span><?=$sayi_bol_hadi[1];?></span></div>
</div>
<div class="syslitem7s" style="display: block;float: left;margin-right: 1px;">
<div class="lottery-item li-<?=$renk_ver3;?>" style="width: 24px;height: 24px;"><span><?=$sayi_bol_hadi[2];?></span></div>
</div>
<div class="syslitem7s" style="display: block;float: left;margin-right: 1px;">
<div class="lottery-item li-<?=$renk_ver4;?>" style="width: 24px;height: 24px;"><span><?=$sayi_bol_hadi[3];?></span></div>
</div>

<? } else  if($row2['oddid']==81 || $row2['oddid']==82 || $row2['oddid']==83 || $row2['oddid']==84 || $row2['oddid']==85 || $row2['oddid']==86){

$sayi_bol_hadi = explode(',',$row2['sayi']);

if($sayi_bol_hadi[0]==1 || $sayi_bol_hadi[0]==3 || $sayi_bol_hadi[0]==5 || $sayi_bol_hadi[0]==8 || $sayi_bol_hadi[0]==10 || $sayi_bol_hadi[0]==12|| $sayi_bol_hadi[0]==13|| $sayi_bol_hadi[0]==15|| $sayi_bol_hadi[0]==17|| $sayi_bol_hadi[0]==20|| $sayi_bol_hadi[0]==22 || $sayi_bol_hadi[0]==24|| $sayi_bol_hadi[0]==26|| $sayi_bol_hadi[0]==27|| $sayi_bol_hadi[0]==29|| $sayi_bol_hadi[0]==32|| $sayi_bol_hadi[0]==34|| $sayi_bol_hadi[0]==36|| $sayi_bol_hadi[0]==37|| $sayi_bol_hadi[0]==39|| $sayi_bol_hadi[0]==41){ $renk_ver1 = "yellow"; } else { $renk_ver1 = "black"; }

if($sayi_bol_hadi[1]==1 || $sayi_bol_hadi[1]==3 || $sayi_bol_hadi[1]==5 || $sayi_bol_hadi[1]==8 || $sayi_bol_hadi[1]==10 || $sayi_bol_hadi[1]==12|| $sayi_bol_hadi[1]==13|| $sayi_bol_hadi[1]==15|| $sayi_bol_hadi[1]==17|| $sayi_bol_hadi[1]==20|| $sayi_bol_hadi[1]==22 || $sayi_bol_hadi[1]==24|| $sayi_bol_hadi[1]==26|| $sayi_bol_hadi[1]==27|| $sayi_bol_hadi[1]==29|| $sayi_bol_hadi[1]==32|| $sayi_bol_hadi[1]==34|| $sayi_bol_hadi[1]==36|| $sayi_bol_hadi[1]==37|| $sayi_bol_hadi[1]==39|| $sayi_bol_hadi[1]==41){ $renk_ver2 = "yellow"; } else { $renk_ver2 = "black"; }

if($sayi_bol_hadi[2]==1 || $sayi_bol_hadi[2]==3 || $sayi_bol_hadi[2]==5 || $sayi_bol_hadi[2]==8 || $sayi_bol_hadi[2]==10 || $sayi_bol_hadi[2]==12|| $sayi_bol_hadi[2]==13|| $sayi_bol_hadi[2]==15|| $sayi_bol_hadi[2]==17|| $sayi_bol_hadi[2]==20|| $sayi_bol_hadi[2]==22 || $sayi_bol_hadi[2]==24|| $sayi_bol_hadi[2]==26|| $sayi_bol_hadi[2]==27|| $sayi_bol_hadi[2]==29|| $sayi_bol_hadi[2]==32|| $sayi_bol_hadi[2]==34|| $sayi_bol_hadi[2]==36|| $sayi_bol_hadi[2]==37|| $sayi_bol_hadi[2]==39|| $sayi_bol_hadi[2]==41){ $renk_ver3 = "yellow"; } else { $renk_ver3 = "black"; }

if($sayi_bol_hadi[3]==1 || $sayi_bol_hadi[3]==3 || $sayi_bol_hadi[3]==5 || $sayi_bol_hadi[3]==8 || $sayi_bol_hadi[3]==10 || $sayi_bol_hadi[3]==12|| $sayi_bol_hadi[3]==13|| $sayi_bol_hadi[3]==15|| $sayi_bol_hadi[3]==17|| $sayi_bol_hadi[3]==20|| $sayi_bol_hadi[3]==22 || $sayi_bol_hadi[3]==24|| $sayi_bol_hadi[3]==26|| $sayi_bol_hadi[3]==27|| $sayi_bol_hadi[3]==29|| $sayi_bol_hadi[3]==32|| $sayi_bol_hadi[3]==34|| $sayi_bol_hadi[3]==36|| $sayi_bol_hadi[3]==37|| $sayi_bol_hadi[3]==39|| $sayi_bol_hadi[3]==41){ $renk_ver4 = "yellow"; } else { $renk_ver4 = "black"; }

if($sayi_bol_hadi[4]==1 || $sayi_bol_hadi[4]==3 || $sayi_bol_hadi[4]==5 || $sayi_bol_hadi[4]==8 || $sayi_bol_hadi[4]==10 || $sayi_bol_hadi[4]==12|| $sayi_bol_hadi[4]==13|| $sayi_bol_hadi[4]==15|| $sayi_bol_hadi[4]==17|| $sayi_bol_hadi[4]==20|| $sayi_bol_hadi[4]==22 || $sayi_bol_hadi[4]==24|| $sayi_bol_hadi[4]==26|| $sayi_bol_hadi[4]==27|| $sayi_bol_hadi[4]==29|| $sayi_bol_hadi[4]==32|| $sayi_bol_hadi[4]==34|| $sayi_bol_hadi[4]==36|| $sayi_bol_hadi[4]==37|| $sayi_bol_hadi[4]==39|| $sayi_bol_hadi[4]==41){ $renk_ver5 = "yellow"; } else { $renk_ver5 = "black"; }

if($sayi_bol_hadi[5]==1 || $sayi_bol_hadi[5]==3 || $sayi_bol_hadi[5]==5 || $sayi_bol_hadi[5]==8 || $sayi_bol_hadi[5]==10 || $sayi_bol_hadi[5]==12|| $sayi_bol_hadi[5]==13|| $sayi_bol_hadi[5]==15|| $sayi_bol_hadi[5]==17|| $sayi_bol_hadi[5]==20|| $sayi_bol_hadi[5]==22 || $sayi_bol_hadi[5]==24|| $sayi_bol_hadi[5]==26|| $sayi_bol_hadi[5]==27|| $sayi_bol_hadi[5]==29|| $sayi_bol_hadi[5]==32|| $sayi_bol_hadi[5]==34|| $sayi_bol_hadi[5]==36|| $sayi_bol_hadi[5]==37|| $sayi_bol_hadi[5]==39|| $sayi_bol_hadi[5]==41){ $renk_ver6 = "yellow"; } else { $renk_ver6 = "black"; }

if($sayi_bol_hadi[6]==1 || $sayi_bol_hadi[6]==3 || $sayi_bol_hadi[6]==5 || $sayi_bol_hadi[6]==8 || $sayi_bol_hadi[6]==10 || $sayi_bol_hadi[6]==12|| $sayi_bol_hadi[6]==13|| $sayi_bol_hadi[6]==15|| $sayi_bol_hadi[6]==17|| $sayi_bol_hadi[6]==20|| $sayi_bol_hadi[6]==22 || $sayi_bol_hadi[6]==24|| $sayi_bol_hadi[6]==26|| $sayi_bol_hadi[6]==27|| $sayi_bol_hadi[6]==29|| $sayi_bol_hadi[6]==32|| $sayi_bol_hadi[6]==34|| $sayi_bol_hadi[6]==36|| $sayi_bol_hadi[6]==37|| $sayi_bol_hadi[6]==39|| $sayi_bol_hadi[6]==41){ $renk_ver7 = "yellow"; } else { $renk_ver7 = "black"; }

?>

<div class="syslitem7s" style="display: block;float: left;margin-right: 1px;">
<div class="lottery-item li-<?=$renk_ver1;?>" style="width: 24px;height: 24px;"><span><?=$sayi_bol_hadi[0];?></span></div>
</div>
<div class="syslitem7s" style="display: block;float: left;margin-right: 1px;">
<div class="lottery-item li-<?=$renk_ver2;?>" style="width: 24px;height: 24px;"><span><?=$sayi_bol_hadi[1];?></span></div>
</div>
<div class="syslitem7s" style="display: block;float: left;margin-right: 1px;">
<div class="lottery-item li-<?=$renk_ver3;?>" style="width: 24px;height: 24px;"><span><?=$sayi_bol_hadi[2];?></span></div>
</div>
<div class="syslitem7s" style="display: block;float: left;margin-right: 1px;">
<div class="lottery-item li-<?=$renk_ver4;?>" style="width: 24px;height: 24px;"><span><?=$sayi_bol_hadi[3];?></span></div>
</div>
<div class="syslitem7s" style="display: block;float: left;margin-right: 1px;">
<div class="lottery-item li-<?=$renk_ver5;?>" style="width: 24px;height: 24px;"><span><?=$sayi_bol_hadi[4];?></span></div>
</div>
<div class="syslitem7s" style="display: block;float: left;margin-right: 1px;">
<div class="lottery-item li-<?=$renk_ver6;?>" style="width: 24px;height: 24px;"><span><?=$sayi_bol_hadi[5];?></span></div>
</div>
<div class="syslitem7s" style="display: block;float: left;margin-right: 1px;">
<div class="lottery-item li-<?=$renk_ver7;?>" style="width: 24px;height: 24px;"><span><?=$sayi_bol_hadi[6];?></span></div>
</div>

<? } ?>

<? } else if($row2['gameid']==3){ ?>

<? if($row2['oddid']==273 || $row2['oddid']==274 || $row2['oddid']==275 || $row2['oddid']==276){ ?>

<div class="syslitem">

<?
$sayila= $row2['sayi'];
$yenisayilar = explode(',',$sayila);
$sayila = 1;
foreach($yenisayilar as $sayilariyazdir){
$sayila++;
if($sayilariyazdir<10){ $renk_ver = "white"; } else
if($sayilariyazdir==10 || $sayilariyazdir==11 || $sayilariyazdir==12 || $sayilariyazdir==13 || $sayilariyazdir==14 || $sayilariyazdir==15 || $sayilariyazdir==16 || $sayilariyazdir==17 || $sayilariyazdir==18){ $renk_ver = "green"; } else
if($sayilariyazdir==19 || $sayilariyazdir==20 || $sayilariyazdir==21 || $sayilariyazdir==22 || $sayilariyazdir==23 || $sayilariyazdir==24 || $sayilariyazdir==25 || $sayilariyazdir==26 || $sayilariyazdir==27){ $renk_ver = "red"; } else
if($sayilariyazdir>27){ $renk_ver = "blue"; }
?>

<? if($sayila>1){ ?>
<div class="syslitem">
<? } ?>

<div class="lottery-item li-<?=$renk_ver;?>" style="float: left;margin-right: 2px;"><span><?=$sayilariyazdir;?></span></div>

<? if($sayila>1){ ?>
</div>
<? } ?>

<? } ?>

</div>

<? } ?>

<? } else if($row2['gameid']==8){ ?>

<? if($row2['oddid']==531 || $row2['oddid']==533){ ?>
<span class="diamonds"></span>
<span class="hearts"></span>
<? } else if($row2['oddid']==532 || $row2['oddid']==534){ ?>
<span class="clubs"></span>
<span class="spades"></span>
<? } else if($row2['oddid']==535){ ?>
<span class="clubs"></span>
<? } else if($row2['oddid']==536){ ?>
<span class="diamonds"></span>
<? } else if($row2['oddid']==537){ ?>
<span class="hearts"></span>
<? } else if($row2['oddid']==538){ ?>
<span class="spades"></span>
<? } else if($row2['oddid']==539){ ?>
<span class="clubs"></span>
<? } else if($row2['oddid']==540){ ?>
<span class="diamonds"></span>
<? } else if($row2['oddid']==541){ ?>
<span class="hearts"></span>
<? } else if($row2['oddid']==542){ ?>
<span class="spades"></span>
<? } ?>

<? } else if($row2['gameid']==7){ ?>

<? if($row2['oddid']==500){ ?>

<div class="felekitem"><div class="lottery-item li-<? if($row2['sayi']==1 || $row2['sayi']==4 || $row2['sayi']==7 || $row2['sayi']==10 || $row2['sayi']==13 || $row2['sayi']==16){ ?>black<? } else if($row2['sayi']==2 || $row2['sayi']==5 || $row2['sayi']==8 || $row2['sayi']==11 || $row2['sayi']==14 || $row2['sayi']==17){ ?>grey<? } else if($row2['sayi']==3 || $row2['sayi']==6 || $row2['sayi']==9 || $row2['sayi']==12 || $row2['sayi']==15 || $row2['sayi']==18){ ?>red<? } ?>"><span><?=$row2['sayi'];?></span></div></div>

<? } ?>

<? } else if($row2['gameid']==10){ ?>

<? if($row2['oddid']==594){ ?>

<span class="dice-item dice-<?=$row2['sayi'];?> dice-red" data-qa="area-game-item-1" style="width: 25px;height: 25px;float: left;"></span>

<? } else if($row2['oddid']==595){ ?>

<span class="dice-item dice-<?=$row2['sayi'];?> dice-blue" data-qa="area-game-item-1" style="width: 25px;height: 25px;float: left;"></span>

<? } else if($row2['oddid']==596){ ?>
<?
$sayilari_bol = explode(',',$row2['sayi']);
$sayi_1_ver = $sayilari_bol[0];
$sayi_2_ver = $sayilari_bol[1];
?>

<span class="dice-item dice-<?=$sayi_1_ver;?> dice-red" data-qa="area-game-item-1" style="width: 25px;height: 25px;float: left;"></span>
<span class="dice-item dice-<?=$sayi_2_ver;?> dice-blue" data-qa="area-game-item-1" style="width: 25px;height: 25px;float: left;"></span>

<? } ?>

<? } ?>

</td>

<td width="10%">

<? ## SONUÇ YERİ İÇİN ## ?>

<? if($row2['gameid']==8){ ?>

<? if($row2['oddid']==531){ ?>
<? if($row2['krupiyesimge']=="diamonds" || $row2['krupiyesimge']=="hearts"){ ?>
<span class="diamonds"></span>
<span class="hearts"></span>
<? } else if($row2['krupiyesimge']=="clubs" || $row2['krupiyesimge']=="spades"){ ?>
<span class="clubs"></span>
<span class="spades"></span>
<? } ?>

<? } else if($row2['oddid']==532){ ?>

<? if($row2['krupiyesimge']=="diamonds" || $row2['krupiyesimge']=="hearts"){ ?>
<span class="diamonds"></span>
<span class="hearts"></span>
<? } else if($row2['krupiyesimge']=="clubs" || $row2['krupiyesimge']=="spades"){ ?>
<span class="clubs"></span>
<span class="spades"></span>
<? } ?>

<? } else if($row2['oddid']==533){ ?>

<? if($row2['oyuncusimge']=="diamonds" || $row2['oyuncusimge']=="hearts"){ ?>
<span class="diamonds"></span>
<span class="hearts"></span>
<? } else if($row2['oyuncusimge']=="clubs" || $row2['oyuncusimge']=="spades"){ ?>
<span class="clubs"></span>
<span class="spades"></span>
<? } ?>

<? } else if($row2['oddid']==534){ ?>

<? if($row2['oyuncusimge']=="diamonds" || $row2['oyuncusimge']=="hearts"){ ?>
<span class="diamonds"></span>
<span class="hearts"></span>
<? } else if($row2['oyuncusimge']=="clubs" || $row2['oyuncusimge']=="spades"){ ?>
<span class="clubs"></span>
<span class="spades"></span>
<? } ?>

<? } else if($row2['oddid']==535 || $row2['oddid']==536 || $row2['oddid']==537 || $row2['oddid']==538){ ?>

<span class="<?=$row2['krupiyesimge'];?>"></span>

<? } else if($row2['oddid']==539 || $row2['oddid']==540 || $row2['oddid']==541 || $row2['oddid']==542){ ?>
<span class="<?=$row2['oyuncusimge'];?>"></span>

<? } else { ?>

<font style="top: 2.4px;position: relative;"><?=getTranslation('yeniyerler_kasa222')?>: <font style="text-transform: capitalize;"><?=$row2['krupiyekart'];?></font></font><span class="<?=$row2['krupiyesimge'];?>"></span>
<br>
<font style="top: 2.4px;position: relative;"><?=getTranslation('yeniyerler_kasa223')?>: <font style="text-transform: capitalize;"><?=$row2['oyuncukart'];?></font></font><span class="<?=$row2['oyuncusimge'];?>"></span>

<? } ?>

<? } else if($row2['gameid']==5){ ?>

<?=getTranslation('selectoptionkazanan')?> : <?=$row2['kazanmasekli'];?><br><?=getTranslation('yeniyerler_kasa224')?> : <?=$row2['kazananeller'];?>

<? } else if($row2['gameid']==6){ ?>

<div class="results-player-cards winner">
<span class="baccarat-results-winner player">O</span>
<span class="card <?=$row2['oyuncu_1_renk'];?>" data-qa="area-card-<?=$row2['oyuncu_1_renk'];?>"><b style="top: 2.4px;position: relative;"><?=$row2['oyuncu_1'];?></b><span class="<?=$row2['oyuncu_1_renk'];?>"></span></span>
<span class="card <?=$row2['oyuncu_2_renk'];?>" data-qa="area-card-<?=$row2['oyuncu_2_renk'];?>"><b style="top: 2.4px;position: relative;"><?=$row2['oyuncu_2'];?></b><span class="<?=$row2['oyuncu_2_renk'];?>"></span></span>
<? if($row2['oyuncu_3']!=''){ ?>
<span class="card <?=$row2['oyuncu_3_renk'];?>" data-qa="area-card-<?=$row2['oyuncu_3_renk'];?>"><b style="top: 2.4px;position: relative;"><?=$row2['oyuncu_3'];?></b><span class="<?=$row2['oyuncu_3_renk'];?>"></span></span>
<? } ?>
<span class="baccarat-result-score">(<?=$row2['skor_oyuncu'];?>)</span>
</div>

<div class="results-banker-cards lost">
<span class="baccarat-results-winner banker">K</span>
<span class="card <?=$row2['krupiye_1_renk'];?>" data-qa="area-card-<?=$row2['krupiye_1_renk'];?>"><b style="top: 2.4px;position: relative;"><?=$row2['krupiye_1'];?></b><span class="<?=$row2['krupiye_1_renk'];?>"></span></span>
<span class="card <?=$row2['krupiye_2_renk'];?>" data-qa="area-card-<?=$row2['krupiye_2_renk'];?>"><b style="top: 2.4px;position: relative;"><?=$row2['krupiye_2'];?></b><span class="<?=$row2['krupiye_2_renk'];?>"></span></span>
<? if($row2['oyuncu_3']!=''){ ?>
<span class="card <?=$row2['krupiye_3_renk'];?>" data-qa="area-card-<?=$row2['krupiye_3_renk'];?>"><b style="top: 2.4px;position: relative;"><?=$row2['krupiye_3'];?></b><span class="<?=$row2['krupiye_3_renk'];?>"></span></span>
<? } ?>
<span class="baccarat-result-score">(<?=$row2['skor_krupiye'];?>)</span>
</div>

<? } else if($row2['gameid']==7){ ?>

<? if($row2['kazanannumara']!=''){ ?><div class="lottery-item li-<?=$row2['kazananrenk'];?>"><span><?=$row2['kazanannumara'];?></span></div><? } ?>

<? } else if($row2['gameid']==10){ ?>

<span class="dice-item dice-<?=$row2['zar_1'];?> dice-red" data-qa="area-game-item-1" style="width: 25px;height: 25px;float: left;"></span>
<span class="dice-item dice-<?=$row2['zar_2'];?> dice-blue" data-qa="area-game-item-1" style="width: 25px;height: 25px;float: left;"></span>

<? } else if($row2['gameid']==12){ ?>

<?=getTranslation('selectoptionkazanan')?> : <? if($row2['kazananeller']=="split"){ ?><?=getTranslation('yeniyerler_kasa225')?><? } else if($row2['kazananeller']=="player"){ ?><?=getTranslation('yeniyerler_kasa223')?><? } else if($row2['kazananeller']=="dealer"){ ?><?=getTranslation('yeniyerler_kasa222')?><? } ?><br><?=getTranslation('yeniyerler_kasa224')?> : <?=$row2['kazanmasekli'];?>

<? } else if($row2['gameid']==3){ ?>

<div class="lottery-item li-<?=$row2['sayi_1_renk'];?>" style="float: left;margin-right: 2px;"><span><?=$row2['sayi_1'];?></span></div>
<div class="lottery-item li-<?=$row2['sayi_2_renk'];?>" style="float: left;margin-right: 2px;"><span><?=$row2['sayi_2'];?></span></div>
<div class="lottery-item li-<?=$row2['sayi_3_renk'];?>" style="float: left;margin-right: 2px;"><span><?=$row2['sayi_3'];?></span></div>
<div class="lottery-item li-<?=$row2['sayi_4_renk'];?>" style="float: left;margin-right: 2px;"><span><?=$row2['sayi_4'];?></span></div>
<div class="lottery-item li-<?=$row2['sayi_5_renk'];?>" style="float: left;margin-right: 2px;"><span><?=$row2['sayi_5'];?></span></div>

<? } else if($row2['gameid']==9){ ?>

<div class="results-player-cards" style="display: block;float: left;">
<span class="baccarat-results-winner player" style="display: block;float: left;margin-top: 6px;margin-right: 7px;">A</span>
<div class="syslitem" style="width: 75px;">
<div class="lottery-item li-<?=$row2['sayi_1_renk'];?>" style="display: block;float: left;margin-right: 4px;"><span><?=$row2['sayi_1'];?></span></div>
<div class="lottery-item li-<?=$row2['sayi_2_renk'];?>" style="display: block;float: left;"><span><?=$row2['sayi_2'];?></span></div>
</div>
</div>

<div class="results-banker-cards" style="clear: both;display: block;float: left">
<span class="baccarat-results-winner banker" style="display: block;float: left;margin-top: 6px;margin-right: 7px;">B</span>
<div class="syslitem" style="width: 75px;">
<div class="lottery-item li-<?=$row2['sayi_3_renk'];?>" style="display: block;float: left;margin-right: 4px;"><span><?=$row2['sayi_3'];?></span></div>
<div class="lottery-item li-<?=$row2['sayi_4_renk'];?>" style="display: block;float: left;"><span><?=$row2['sayi_4'];?></span></div>
</div>
</div>

<div class="results-banker-cards" style="clear: both;display: block;float: left">
<span class="baccarat-results-winner banker" style="display: block;float: left;margin-top: 6px;margin-right: 7px;">C</span>
<div class="syslitem" style="width: 75px;">
<div class="lottery-item li-<?=$row2['sayi_5_renk'];?>" style="display: block;float: left;margin-right: 4px;"><span><?=$row2['sayi_5'];?></span></div>
<div class="lottery-item li-<?=$row2['sayi_6_renk'];?>" style="display: block;float: left;"><span><?=$row2['sayi_6'];?></span></div>
</div>
</div>

<? } else if($row2['gameid']==1){ ?>

<div class="lottery-item li-<?=$row2['sayi_1_renk'];?>" style="float: left;margin-right: 2px;"><span><?=$row2['sayi_1'];?></span></div>
<div class="lottery-item li-<?=$row2['sayi_2_renk'];?>" style="float: left;margin-right: 2px;"><span><?=$row2['sayi_2'];?></span></div>
<div class="lottery-item li-<?=$row2['sayi_3_renk'];?>" style="float: left;margin-right: 2px;"><span><?=$row2['sayi_3'];?></span></div>
<div class="lottery-item li-<?=$row2['sayi_4_renk'];?>" style="float: left;margin-right: 2px;"><span><?=$row2['sayi_4'];?></span></div>
<div class="lottery-item li-<?=$row2['sayi_5_renk'];?>" style="float: left;margin-right: 2px;"><span><?=$row2['sayi_5'];?></span></div>
<div class="lottery-item li-<?=$row2['sayi_6_renk'];?>" style="float: left;margin-right: 2px;"><span><?=$row2['sayi_6'];?></span></div>
<div class="lottery-item li-<?=$row2['sayi_7_renk'];?>" style="float: left;margin-right: 2px;"><span><?=$row2['sayi_7'];?></span></div>

<? } ?>

<? ## SONUÇ YERİ İÇİN ## ?>

</td>

</tr>


<? } ?>

<? } else if($row['casino']==2){ ?>

<tr id="cdt_<?=$row['id']; ?>" style="display:none;">
<td colspan="9">
<table class="table mb-0">
<thead>
<tr>
<th style="text-align:center;"><?=getTranslation('ajaxtumkuponlarim15')?></th>
<th style="text-align:center;"><?=getTranslation('yeniyerler_kasa226')?></th>
<th style="text-align:center;"><?=getTranslation('hizligirissecim')?></th>
<th style="text-align:center;"><?=getTranslation('yeniyerler_kasa227')?></th>
<th style="text-align:center;"><?=getTranslation('ajaxtumkuponlarim12')?></th>
<th style="text-align:center;"><?=getTranslation('ajaxhesaprapor11')?></th>
<th style="text-align:center;"><?=getTranslation('yeniyerler_kasa228')?></th>
<th style="text-align:center;"><?=getTranslation('oran')?></th>
</tr>
</thead>
<tbody>

<?

$sor222 = sed_sql_query("select * from kupon_ic_rulet where kupon_id='$row[id]'");

while($row22=sed_sql_fetcharray($sor222)) {

if($row22['roundid']=="single" || $row22['roundid']=="zero"){
$oyun_isim = "".getTranslation('casinoicin433')."";
} else if($row22['roundid']=="multi4"){
$oyun_isim = "".getTranslation('casinoicin436')."";
} else if($row22['roundid']=="multi2"){
$oyun_isim = "".getTranslation('casinoicin434')."";
} else if($row22['roundid']=="line1" || $row22['roundid']=="line2" || $row22['roundid']=="line3"){
$oyun_isim = "".getTranslation('casinoicin442')."";
} else if($row22['roundid']=="1st12"){
$oyun_isim = "".getTranslation('casinoicin437')."";
} else if($row22['roundid']=="2nd12"){
$oyun_isim = "".getTranslation('casinoicin438')."";
} else if($row22['roundid']=="3rd12"){
$oyun_isim = "".getTranslation('casinoicin439')."";
} else if($row22['roundid']=="even"){
$oyun_isim = "".getTranslation('casinoicin446')."";
} else if($row22['roundid']=="odd"){
$oyun_isim = "".getTranslation('casinoicin445')."";
} else if($row22['roundid']=="red"){
$oyun_isim = "".getTranslation('casinoicin443')."";
} else if($row22['roundid']=="black"){
$oyun_isim = "".getTranslation('casinoicin444')."";
} else if($row22['roundid']=="1to18"){
$oyun_isim = "".getTranslation('casinoicin440')."";
} else if($row22['roundid']=="19to36"){
$oyun_isim = "".getTranslation('casinoicin441')."";
}

$oran_bol = explode('.',$row22['oran']);

?>

<tr>

<td style="text-align:center;"><?=getTranslation('yeniyerler_kasa229')?></td>

<td style="text-align:center;"><?=$row22['oddid']; ?></td>

<td style="text-align:center;"><?=$oyun_isim;?></td>

<td style="text-align:center;"><?=$row22['sayi']; ?></td>

<td style="text-align:center;"><?=nf($row22['grupid']);?></td>

<td style="text-align:center;"><? if($row22['kazanma']==4){ ?><span class="tag tag-success" style="width: 100px;text-align: center;"><?=getTranslation('yeniyerler_kasa230')?></span><? } else { ?><?=$row22['sonuc']; ?><? } ?></td>

<td style="text-align:center;"><? if($row22['kazanma']!=4){ ?><?=$row22['sonuczamani']; ?><? } ?></td>

<td style="text-align:center;">x <?=$oran_bol[0];?></td>

<td style="text-align:center;">
<span class="tag tag-<? if($row22['kazanma']==1){ ?>warning<? } else if($row22['kazanma']==2){ ?>success<? } else if($row22['kazanma']==3){ ?>danger<? } else if($row22['kazanma']==4){ ?>info<? } ?>" style="width: 62px;text-align: center;"><?=durumnedir($row22['kazanma']); ?></span>
</td>

</tr>

<? } ?>

<? } ?>

</tbody>
</table>
</td>

</tr>
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

<a class="btn btn-info m-0" href="casinokuponlar.php?start=<?=$_GET['start'];?>&end=<?=$_GET['end'];?>&kid=<?=$_GET['kid'];?>&userid=<?=$_GET['userid'];?>&ktip=<?=$_GET['ktip'];?>&sayfa=1"><?=getTranslation('ajaxtumkuponlarim30');?></a>

<a class="btn btn-info m-0" href="casinokuponlar.php?start=<?=$_GET['start'];?>&end=<?=$_GET['end'];?>&kid=<?=$_GET['kid'];?>&userid=<?=$_GET['userid'];?>&ktip=<?=$_GET['ktip'];?>&sayfa=<?=$_GET['sayfa']-1;?>" id="sayfaveri">« <?=getTranslation('ajaxtumkuponlarim31');?></a>

<? } ?>
<?
for($i=$alt; $i<=$ust ;$i++){
if($i != $gelen_sayfa ){ ?>
<a class="btn btn-info m-0" href="casinokuponlar.php?start=<?=$_GET['start'];?>&end=<?=$_GET['end'];?>&kid=<?=$_GET['kid'];?>&userid=<?=$_GET['userid'];?>&ktip=<?=$_GET['ktip'];?>&sayfa=<?=$i;?>" id="sayfaveri"><?=$i;?></a>
<? } else { ?>
<span class="btn btn-info m-0" style="background-color: #11c540;border-color: #11c540;"><?=$i;?></span>
<? } ?>
<? } if($gelen_sayfa < $sayfa_sayisi){ ?>

<a class="btn btn-info m-0" href="casinokuponlar.php?start=<?=$_GET['start'];?>&end=<?=$_GET['end'];?>&kid=<?=$_GET['kid'];?>&userid=<?=$_GET['userid'];?>&ktip=<?=$_GET['ktip'];?>&sayfa=<?=$_GET['sayfa']+1;?>" id="sayfaveri"><?=getTranslation('ajaxtumkuponlarim32');?> »</a>

<a class="btn btn-info m-0" href="casinokuponlar.php?start=<?=$_GET['start'];?>&end=<?=$_GET['end'];?>&kid=<?=$_GET['kid'];?>&userid=<?=$_GET['userid'];?>&ktip=<?=$_GET['ktip'];?>&sayfa=<?=$sayfa_sayisi;?>" id="sayfaveri"><?=getTranslation('ajaxtumkuponlarim33');?></a>

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

<script>
function kupon_iptal(id,tip) {
var tips = "";
if(tip==1){
	tips = "Betgames";
} else if(tip==2){
	tips = "Rulet";
}
if(confirm(''+tips+', '+id+' <?=getTranslation('ajaxtumkuponlarim36')?>')) {
var rand = Math.random();
$.get('/kasa/index.php?s=casinokuponiptal&id='+id+'&tip='+tip+'&rand='+rand+'',function(data) { 
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