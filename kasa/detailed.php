<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:../login.php"); exit(); }

if(isset($_GET['id'])) {
$id = gd("id");
$bayilerim = "".benimbayilerim($ub['id'])."";
$bayi_array = explode(",",$bayilerim);
if(!in_array($id,$bayi_array) || !is_numeric($id)) { die("<div class='bos'>Buna yetkili degilsiniz.</div>"); }
$_SESSION['edituser'] = $id;
header("Location:detailed.php");
}

if(isset($_GET['ok'])) {
rebuild($ub['id']);
}

if(gd("start")!=''){

$tarih_1_ver = basla_time(gd("start"));
$tarih_2_ver = bitir_time(gd("end"));

} else {

$tarih_1_ver = basla_time(date("d-m-Y",strtotime('Last Tuesday')));
$tarih_2_ver = bitir_time(date("d-m-Y",strtotime('Monday')));

}

$buhafta_tarih1 = date("d-m-Y",strtotime('Last Tuesday'));
$buhafta_tarih2 = date("d-m-Y",strtotime('Monday'));

$buay_tarih1 = date("01-m-Y");
$buay_tarih2 = date("d-m-Y");

$gecen_hafta_tarihle_1 = date("d-m-Y",strtotime('Last Tuesday'));
$gecen_hafta_tarihle_2 = date("d-m-Y",strtotime('Monday'));
$newDate = strtotime('-7 day',strtotime($gecen_hafta_tarihle_1));
$newDate2 = strtotime('-7 day',strtotime($gecen_hafta_tarihle_2));
$gecen_hafta_1_ver = date("d-m-Y",$newDate);
$gecen_hafta_2_ver = date("d-m-Y",$newDate2);

$kullanicibilgisi = bilgi("select * from kullanici where id='$_SESSION[edituser]' limit 1");

$kullanaktifuyesayisi = bilgi("SELECT COUNT(CASE WHEN id!='' THEN id END) as toplam_bulunan_uye FROM kullanici WHERE hesap_sahibi_id='$_SESSION[edituser]' and durum=1 and root=0");

$toplam_uye_bakiyesi = bilgi("SELECT SUM(CASE WHEN id!='' THEN bakiye END) as toplam_bakiye FROM kullanici WHERE hesap_sahibi_id='$_SESSION[edituser]' and durum=1");

$toplam_uye_casinobakiyesi = bilgi("SELECT SUM(CASE WHEN id!='' THEN casinobakiye END) as toplam_bakiye FROM kullanici WHERE hesap_sahibi_id='$_SESSION[edituser]' and durum=1");

?>
<?php include 'header.php'; ?>
<main class="main">
<ol class="breadcrumb mb-0">
<li class="breadcrumb-item"><?=getTranslation('superadmin61');?> : <?=$kullanicibilgisi['username'];?></li>
</ol>
<div class="alert alert-danger mb-0" id="error"></div>
<div class="alert alert-info mb-0" id="info"></div>
<div class="alert alert-success mb-0" id="success"></div>
<div class="container-fluid mt-2">
<div class="row">
<div class="card">

<div class="card-header">
<h4 id="cardinfo"><?=$kullanicibilgisi['username'];?> <small data-toggle="tooltip" title="" data-original-title="1 adet müşteri">(<?=$kullanicibilgisi['id'];?>)</small> </h4>
<div>
<a href="#" class="btn btn-danger" onclick="sifresifirla(<?=$kullanicibilgisi['id'];?>);" style="margin-top:4px"><?=getTranslation('superadmin121')?></a>
<a href="javascript:;" class="btn btn-danger" id="pasiflestirme" onclick="pasiflestir(<?=$kullanicibilgisi['id'];?>,0);" style="margin-top:4px;<? if($kullanicibilgisi['durum']==0){?>display:none;<? } ?>"><?=getTranslation('superadmin122')?></a>
<a href="javascript:;" class="btn btn-success" id="aktiflestirme" onclick="pasiflestir(<?=$kullanicibilgisi['id'];?>,1);" style="margin-top:4px;<? if($kullanicibilgisi['durum']==1){?>display:none;<? } ?>"><?=getTranslation('superadmin123')?></a>
<? if($ub['bayisilmeyetki']==1){ ?>
<a href="#" class="btn btn-danger" onclick="kullanicisil(<?=$kullanicibilgisi['id'];?>);" style="margin-top:4px"><?=getTranslation('superadmin124')?></a>
<? } ?>

<? if($ub['alt_alt_durum']==0 && $ub['alt_durum']==1){ ?>
<? if($kullanicibilgisi['bayisilmeyetki']==1){ ?>
<a href="#" class="btn btn-danger" onclick="silmeyetkisi(<?=$kullanicibilgisi['id'];?>);" style="margin-top:4px"><?=getTranslation('bayisilmeyetki1')?></a>
<? } else if($kullanicibilgisi['bayisilmeyetki']==0){ ?>
<a href="#" class="btn btn-success" onclick="silmeyetkisi(<?=$kullanicibilgisi['id'];?>);" style="margin-top:4px"><?=getTranslation('bayisilmeyetki2')?></a>
<? } ?>
<? } ?>

<? if($kullanicibilgisi['alt_durum']==1 && $kullanicibilgisi['alt_alt_durum']==0){ ?>
<? if($kullanicibilgisi['kupon_yetki']==0){ ?>
<a href="javascript:;" class="btn btn-success" onclick="kupondegisimyetki(<?=$kullanicibilgisi["id"]?>,1);" style="margin-top:4px;"><?=getTranslation('yeniyerler_kasa303')?></a>
<? } else { ?>
<a href="javascript:;" class="btn btn-danger" onclick="kupondegisimyetki(<?=$kullanicibilgisi["id"]?>,0);" style="margin-top:4px;"><?=getTranslation('yeniyerler_kasa304')?></a>
<? } ?>

<? if($kullanicibilgisi['casino_yetki']==0){ ?>
<a href="javascript:;" class="btn btn-success" onclick="casinodegisimyetki(<?=$kullanicibilgisi["id"]?>,1);" style="margin-top:4px;"><?=getTranslation('yeniyerler_kasa305')?></a>
<? } else { ?>
<a href="javascript:;" class="btn btn-danger" onclick="casinodegisimyetki(<?=$kullanicibilgisi["id"]?>,0);" style="margin-top:4px;"><?=getTranslation('yeniyerler_kasa306')?></a>
<? } ?>

<? } ?>

</div>
</div>

<div class="card-block p-0">
<div class="table-responsive">
<table class="table table-striped mb-0">
<tbody>

<tr>
<th class="text-xs-right" style="width:16%"><?=getTranslation('yeniyerler_kasa307')?>:</th>
<?
$kullanici_bakiye_bol = explode(".",$kullanicibilgisi['bakiye']);
$kullanici_bakiye_kurus = substr($kullanici_bakiye_bol[1], 0, 2);
if($kullanici_bakiye_kurus>0){
$bakiyele = substr(nf($kullanici_bakiye_bol[0]), 0, -3);
$bakiyesini_ver = "".$bakiyele.".".$kullanici_bakiye_kurus."";
} else {
$bakiyele = substr(nf($kullanici_bakiye_bol[0]), 0, -3);
$bakiyesini_ver = "".$bakiyele.".00";
}
?>
<td style="width:16%"><code id="kasa"><?=$bakiyesini_ver;?></code> <a href="#" class="tag tag-danger" onclick="window.location.reload();"><?=getTranslation('yeniyerler_kasa308')?></a>
<br>
<a href="#" data-customerid=<?=$kullanicibilgisi["id"]?> data-islem="bakiyein" class="tag tag-success customer-payin-bakiye"><i class="fa fa-level-up"></i> <?=getTranslation('yeniyerler_kasa309')?></a>
<a href="#" data-customerid=<?=$kullanicibilgisi["id"]?> data-islem="bakiyeout" class="tag tag-danger customer-payout-bakiye"><i class="fa fa-level-down"></i> <?=getTranslation('superadmin63')?></a>
</td>
<th class="text-xs-right" style="width:16%"><?=getTranslation('yeniyerler_kasa310')?>:</th>
<?
$kullanici_bakiye_bol_casino = explode(".",$kullanicibilgisi['casinobakiye']);
$kullanici_bakiye_kurus_casino = substr($kullanici_bakiye_bol_casino[1], 0, 2);
if($kullanici_bakiye_kurus_casino>0){
$bakiyele_casino = substr(nf($kullanici_bakiye_bol_casino[0]), 0, -3);
$bakiyesini_ver_casino = "".$bakiyele_casino.".".$kullanici_bakiye_kurus_casino."";
} else {
$bakiyele_casino = substr(nf($kullanici_bakiye_bol_casino[0]), 0, -3);
$bakiyesini_ver_casino = "".$bakiyele_casino.".00";
}
?>
<td style="width:16%"><code id="kasacasino"><?=$bakiyesini_ver_casino;?></code>
<br>
<a href="#" data-customerid=<?=$kullanicibilgisi["id"]?> data-islem="casinobakiyein" class="tag tag-success customer-payin-casinobakiye"><i class="fa fa-level-up"></i> <?=getTranslation('yeniyerler_kasa309')?></a>
<a href="#" data-customerid=<?=$kullanicibilgisi["id"]?> data-islem="casinobakiyeout" class="tag tag-danger customer-payout-casinobakiye"><i class="fa fa-level-down"></i> <?=getTranslation('superadmin63')?></a>
</td>
<th class="text-xs-right" style="width:16%"><?=getTranslation('kuponlarimozel12')?>:</th>
<td style="width:16%" id="aktifpasif"><? if($kullanicibilgisi['durum']=="1") { ?><span class="text-success"><?=getTranslation('yeniyerler_kasa140')?></span><? } else if($kullanicibilgisi['durum']=="0") { ?><span class="text-danger"><?=getTranslation('yeniyerler_kasa141')?></span><? } ?></td>

</tr>


<tr>
<th class="text-xs-right"><?=getTranslation('yeniyerler_kasa148')?>:</th>
<td id="kadi"><?=$kullanicibilgisi['username'];?></td>
<th class="text-xs-right"><?=getTranslation('superadmin125')?>:</th>
<td><?=$kullanicibilgisi['id'];?></td>
<th class="text-xs-right"><?=getTranslation('superadmin126')?>:</th>
<td><? echo date("d-m-Y H:i",$kullanicibilgisi['olusturma_zaman']);?></td>
</tr>


<? if($ub['wkyetki']<1){ ?>
<tr></tr>

<tr>
<th class="text-xs-right"><?=getTranslation('yeniyerler_kasa311')?>:</th>
<td>
<code id="limit"><?=$kullanicibilgisi['alt_sinir'];?></code>
<br>
<a href="#" data-customerid=<?=$kullanicibilgisi["id"]?> data-islem="in" class="tag tag-success customer-payin"><i class="fa fa-level-up"></i> <?=getTranslation('yeniyerler_kasa309')?></a>
<a href="#" data-customerid=<?=$kullanicibilgisi["id"]?> data-islem="out" class="tag tag-danger customer-payout"><i class="fa fa-level-down"></i> <?=getTranslation('superadmin63')?></a>
</td>
<th class="text-xs-right"><?=getTranslation('yeniyerler_kasa312')?>:</th>
<td><code id="abay"><?=$kullanaktifuyesayisi['toplam_bulunan_uye'];?></code></td>
<th class="text-xs-right"><?=getTranslation('yeniyerler_kasa313')?>:<br><?=getTranslation('yeniyerler_kasa132')?>:</th>
<td style="width:16%"><code id=""><?=nf($toplam_uye_bakiyesi['toplam_bakiye']); ?></code> <br><code><?=nf($toplam_uye_casinobakiyesi["toplam_bakiye"]);?></code></td>
</tr>

<? } ?>

<tr>
<th class="text-xs-right"><?=getTranslation('yeniyerler_kasa151')?>:</th>
<td id="notlar"><?=$kullanicibilgisi['hatirlatmaad'];?></td>
<th class="text-xs-right"><?=getTranslation('superadmin127')?>:</th>
<td id="benimid"><?=$kullanicibilgisi['username'];?></td>
<th class="text-xs-right"><?=getTranslation('superadmin128')?>:</th>
<td id="benimpas"><?=$kullanicibilgisi['password'];?></td>
</tr>

</tbody></table>
</div>
</div>


</div>

<div class="modal fade modal-payin-bakiye" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-sm" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Kapat"> <span aria-hidden="true">&times;</span> </button>
<h4 class="modal-title"><?=getTranslation('yeniyerler_kasa314')?></h4>
</div>
<div class="modal-body">
<form id="payin-form-bakiye">
<input type="hidden" id="customerid" name="customerid" value="">
<input type="hidden" id="islem" name="islem" value="">
<input type="hidden" id="type" name="type" value="1">
<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa315')?></label>
<input type="number" min="1" name="limitstr" id="limitstr" class="form-control" placeholder="<?=getTranslation('yeniyerler_kasa322')?>" pattern="(0\.((0[1-9]{1})|([1-9]{1}([0-9]{1})?)))|(([1-9]+[0-9]*)(\.([0-9]{1,2}))?)" required>
</div>
<div class="form-group">
<button type="button" class="btn btn-block btn-success btn-payin-bakiye"><?=getTranslation('superadmin70')?></button>
</div>
</form>
</div>
</div>
</div>
</div>

<div class="modal fade modal-payout-bakiye" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-sm" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Kapat"> <span aria-hidden="true">&times;</span> </button>
<h4 class="modal-title"><?=getTranslation('yeniyerler_kasa316')?></h4>
</div>
<div class="modal-body">
<form id="payout-form-bakiye">
<input type="hidden" id="customerid" name="customerid" value="">
<input type="hidden" id="islem" name="islem" value="">
<input type="hidden" id="type" name="type" value="2">
<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa317')?></label>
<input type="number" min="1" name="limitstr" id="limitstr" class="form-control" placeholder="<?=getTranslation('yeniyerler_kasa323')?>" pattern="(0\.((0[1-9]{1})|([1-9]{1}([0-9]{1})?)))|(([1-9]+[0-9]*)(\.([0-9]{1,2}))?)" required>
</div>
<div class="form-group">
<button type="button" class="btn btn-block btn-danger btn-payout-bakiye"><?=getTranslation('superadmin70')?></button>
</div>
</form>
</div>
</div>
</div>
</div>

<div class="modal fade modal-payin-casinobakiye" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-sm" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Kapat"> <span aria-hidden="true">&times;</span> </button>
<h4 class="modal-title"><?=getTranslation('yeniyerler_kasa318')?></h4>
</div>
<div class="modal-body">
<form id="payin-form-casinobakiye">
<input type="hidden" id="customerid" name="customerid" value="">
<input type="hidden" id="islem" name="islem" value="">
<input type="hidden" id="type" name="type" value="1">
<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa315')?></label>
<input type="number" min="1" name="limitstr" id="limitstr" class="form-control" placeholder="<?=getTranslation('yeniyerler_kasa322')?>" pattern="(0\.((0[1-9]{1})|([1-9]{1}([0-9]{1})?)))|(([1-9]+[0-9]*)(\.([0-9]{1,2}))?)" required>
</div>
<div class="form-group">
<button type="button" class="btn btn-block btn-success btn-payin-casinobakiye"><?=getTranslation('superadmin70')?></button>
</div>
</form>
</div>
</div>
</div>
</div>

<div class="modal fade modal-payout-casinobakiye" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-sm" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Kapat"> <span aria-hidden="true">&times;</span> </button>
<h4 class="modal-title"><?=getTranslation('yeniyerler_kasa319')?></h4>
</div>
<div class="modal-body">
<form id="payout-form-casinobakiye">
<input type="hidden" id="customerid" name="customerid" value="">
<input type="hidden" id="islem" name="islem" value="">
<input type="hidden" id="type" name="type" value="2">
<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa317')?></label>
<input type="number" min="1" name="limitstr" id="limitstr" class="form-control" placeholder="<?=getTranslation('yeniyerler_kasa323')?>" pattern="(0\.((0[1-9]{1})|([1-9]{1}([0-9]{1})?)))|(([1-9]+[0-9]*)(\.([0-9]{1,2}))?)" required>
</div>
<div class="form-group">
<button type="button" class="btn btn-block btn-danger btn-payout-casinobakiye"><?=getTranslation('superadmin70')?></button>
</div>
</form>
</div>
</div>
</div>
</div>

<div class="modal fade modal-payin" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-sm" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Kapat"> <span aria-hidden="true">&times;</span> </button>
<h4 class="modal-title"><?=getTranslation('yeniyerler_kasa311')?></h4>
</div>
<div class="modal-body">
<form id="payin-form">
<input type="hidden" id="customerid" name="customerid" value="">
<input type="hidden" id="islem" name="islem" value="">
<input type="hidden" id="type" name="type" value="1">
<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa320')?></label>
<input type="number" min="1" name="limitstr" id="limitstr" class="form-control" placeholder="<?=getTranslation('yeniyerler_kasa324')?>" pattern="(0\.((0[1-9]{1})|([1-9]{1}([0-9]{1})?)))|(([1-9]+[0-9]*)(\.([0-9]{1,2}))?)" required>
</div>
<div class="form-group">
<button type="button" class="btn btn-block btn-success btn-payin"><?=getTranslation('superadmin70')?></button>
</div>
</form>
</div>
</div>
</div>
</div>

<div class="modal fade modal-payout" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-sm" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Kapat"> <span aria-hidden="true">&times;</span> </button>
<h4 class="modal-title"><?=getTranslation('yeniyerler_kasa311')?></h4>
</div>
<div class="modal-body">
<form id="payout-form">
<input type="hidden" id="customerid" name="customerid" value="">
<input type="hidden" id="islem" name="islem" value="">
<input type="hidden" id="type" name="type" value="2">
<div class="form-group">
<label for=""><?=getTranslation('yeniyerler_kasa321')?></label>
<input type="number" min="1" name="limitstr" id="limitstr" class="form-control" placeholder="<?=getTranslation('yeniyerler_kasa325')?>" pattern="(0\.((0[1-9]{1})|([1-9]{1}([0-9]{1})?)))|(([1-9]+[0-9]*)(\.([0-9]{1,2}))?)" required>
</div>
<div class="form-group">
<button type="button" class="btn btn-block btn-danger btn-payout"><?=getTranslation('superadmin70')?></button>
</div>
</form>
</div>
</div>
</div>
</div>


<div class="card">
<div class="card-header"><?=getTranslation('yeniyerler_kasa326')?></div>
<div class="card-header">
<form name="frm" id="frm" method="get" action="">
<div class="row">
<div class="col-sm-3">
<input type="text" class="form-control pickadate picker__input tcal tcalInput" id="start" name="start" autocomplete="off" 

value="

<? if(gd("start")!=''){ ?>

<?=gd("start");?>

<? } else { ?>

<?=date("d-m-Y",strtotime('Last Tuesday')); ?>

<? } ?>

" size="7" style="text-align:center;">
</div>
<div class="col-sm-3">
<input type="text" class="form-control pickadate picker__input tcal tcalInput" id="end" name="end" autocomplete="off" 

value="

<? if(gd("end")!=''){ ?>

<?=gd("end");?>

<? } else { ?>

<?=date("d-m-Y"); ?>

<? } ?>

" size="7" style="text-align:center;">
</div>
<div class="col-sm-2">
<input type="button" onclick="$('#frm').submit()" class="btn btn-success btn-block" value="<?=getTranslation('yeniyerler_kasa42')?>" style="margin-top:2px">
</div>
<div class="col-sm-4">
<a href="detailed.php?start=<?=$buhafta_tarih1;?>&end=<?=$buhafta_tarih2;?>&sayfa=1" class="btn btn-link" style="margin-top:2px"><?=getTranslation('yeniyerler_kasa43')?></a>
<a href="detailed.php?start=<?=$buay_tarih1;?>&end=<?=$buay_tarih2;?>&sayfa=1" class="btn btn-link" style="margin-top:2px"><?=getTranslation('yeniyerler_kasa44')?></a>
<a href="detailed.php?start=<?=$gecen_hafta_1_ver;?>&end=<?=$gecen_hafta_2_ver;?>&sayfa=1" class="btn btn-link" style="margin-top:2px"><?=getTranslation('yeniyerler_kasa45')?></a>
</div>
</div>
</form>
</div>
<div class="card-block p-0">
<div class="table-responsive">
<table class="table mb-0 table-hover">
<thead>
<tr>
<th><?=getTranslation('superadmin99')?></th>
<th><?=getTranslation('superadmin100')?></th>
<th><?=getTranslation('superadmin101')?></th>
<th><?=getTranslation('kuponlarimozel13')?></th>
</tr>
</thead>
<tbody>

<?
$bayilerinibul = $_SESSION['edituser'];
$user_ekle = "user_id in ($bayilerinibul)";
$pageper = 20;
$gelen_sayfa = (isset($_GET['sayfa']) && $_GET['sayfa'] !='' ) ? intval($_GET['sayfa']) : 1;
$limit = $pageper;
$s_s = 10;
$sqladder_sayfalama = "$user_ekle and aciklama!='Müşteriye Aktarılan Bakiye' and zaman between '$tarih_1_ver' and '$tarih_2_ver'";
$s_sor = sed_sql_query("select count(id) from hesap_hareket where $sqladder_sayfalama") or trigger_error(sed_sql_error(),E_USER_ERROR);
$satir = sed_sql_result($s_sor,0);
sed_sql_freeresult($s_sor);
if($satir >0){
$baslama = ($gelen_sayfa > 1) ? (($gelen_sayfa -1) * $limit) : 0 ;
$sayfa_kac = $satir/$limit;
$sayfa_sayisi = ($satir % $limit != 0) ? intval($sayfa_kac)+1 : intval($sayfa_kac);
$basla=( $satir >= $baslama ) ? $baslama : 0 ;
unset( $sayfa_kac, $baslama );
$sqladderone = "$user_ekle and aciklama!='Müşteriye Aktarılan Bakiye' and zaman between '$tarih_1_ver' and '$tarih_2_ver' order by zaman desc limit $basla,$limit";
$sor = sed_sql_query("select * from hesap_hareket where $sqladderone");
$i=1;
$style='';
$toplam_odenen_miktar = bilgi("select SUM(tutar) as toplam from hesap_hareket where tip='ekle' and $sqladder_sayfalama");
$toplam_cekilen_miktar = bilgi("select SUM(tutar) as toplam from hesap_hareket where tip='cikar' and $sqladder_sayfalama");

$toplam_odenen_miktar_casino = bilgi("select SUM(tutar) as toplam from hesap_hareket where tip='casinoekle' and $sqladder_sayfalama");
$toplam_cekilen_miktar_casino = bilgi("select SUM(tutar) as toplam from hesap_hareket where tip='casinocikar' and $sqladder_sayfalama");

while($ass=sed_sql_fetcharray($sor)) {
$yetki_bulma = bilgi("select * from kullanici where id='".$ass['user_id']."' limit 1");
$sahip_bulma = bilgi("select * from kullanici where id='".$yetki_bulma['hesap_sahibi_id']."' limit 1");
?>

<tr class="table-<? if($ass['tip']=="casinoekle"){ ?>success<? } else if($ass['tip']=="casinocikar"){ ?>danger<? } else if($ass['tip']=="ekle"){ ?>success<? } else if($ass['tip']=="cikar"){ ?>danger<? } else if($ass['iptal']=="ekle"){ ?>success<? } ?>">
<td><span class="tag tag-default"><?=getTranslation('yeniyerler_kasa115')?></span> <span class="tag tag-<? if($ass['tip']=="ekle"){ ?>success<? } else if($ass['tip']=="casinoekle"){ ?>success<? } else if($ass['tip']=="casinocikar"){ ?>danger<? } else if($ass['tip']=="cikar"){ ?>danger<? } else if($ass['iptal']=="ekle"){ ?>success<? } ?>">
<? if($ass['tip']=="casinoekle"){ ?><?=getTranslation('yeniyerler_kasa327')?>
<? } else if($ass['tip']=="casinocikar"){ ?><?=getTranslation('yeniyerler_kasa328')?>
<? } else if($ass['tip']=="ekle"){ ?><?=getTranslation('superadmin133')?>
<? } else if($ass['tip']=="cikar"){ ?><?=getTranslation('superadmin134')?>
<? } else if($ass['tip']=="iptal"){ ?><?=getTranslation('superadmin133')?>
<? } ?></span></td>
<td><code>BK<?=$ass['id'];?></code> <?if($yetki_bulma['wkyetki']==3){ ?><?=$sahip_bulma['username'];?> -> <? } ?><?=$ass['username'];?></td>
<td><code><?=nf($ass['tutar']); ?></code></td>
<td><span title="" data-toggle="tooltip"><?=date("d-m-Y H:i:s",$ass['zaman']);?></span></td>
</tr>

<?
$style = ($style=='') ? '2' : '';
$i++;
}
?>

</tbody>
<tfoot>
<tr>
<td colspan="4" class="text-xs-center">
<?=getTranslation('superadmin135')?>: <code><?=nf($toplam_odenen_miktar['toplam']);?></code>
<?=getTranslation('superadmin136')?>: <code><? if($toplam_cekilen_miktar['toplam']>0){?>-<? } ?><?=nf($toplam_cekilen_miktar['toplam']);?></code>
<?=getTranslation('superadmin137')?>: <code>
<? if($toplam_odenen_miktar['toplam']>$toplam_cekilen_miktar['toplam']) { ?>
<?=nf($toplam_odenen_miktar['toplam']-$toplam_cekilen_miktar['toplam']); ?>
<? } else if($toplam_odenen_miktar['toplam']<$toplam_cekilen_miktar['toplam']) { ?>
<?=nf($toplam_cekilen_miktar['toplam']-$toplam_odenen_miktar['toplam']); ?>
<? } ?>
</code>
</td>
</tr>

<tr>
<td colspan="4" class="text-xs-center">
<?=getTranslation('yeniyerler_kasa132')?> <?=getTranslation('superadmin135')?>: <code><?=nf($toplam_odenen_miktar_casino['toplam']);?></code>
<?=getTranslation('yeniyerler_kasa132')?> <?=getTranslation('superadmin136')?>: <code><? if($toplam_cekilen_miktar_casino['toplam']>0){?>-<? } ?><?=nf($toplam_cekilen_miktar_casino['toplam']);?></code>
<?=getTranslation('superadmin137')?>: <code>
<? if($toplam_odenen_miktar_casino['toplam']>$toplam_cekilen_miktar_casino['toplam']) { ?>
<?=nf($toplam_odenen_miktar_casino['toplam']-$toplam_cekilen_miktar_casino['toplam']); ?>
<? } else if($toplam_odenen_miktar_casino['toplam']<$toplam_cekilen_miktar_casino['toplam']) { ?>
<?=nf($toplam_cekilen_miktar_casino['toplam']-$toplam_odenen_miktar_casino['toplam']); ?>
<? } ?>
</code>
</td>
</tr>


<? 
$hangi_sayfa= ($gelen_sayfa > 0)? $gelen_sayfa : 1 ;
?>
<tr>
<td colspan="4" class="text-xs-center">
<?
$alt= ($gelen_sayfa - $s_s);
if($sayfa_sayisi <= $s_s || $gelen_sayfa <= $s_s ) {$alt=1;} 
$ust= (($gelen_sayfa + $s_s)< $sayfa_sayisi ) ? ($gelen_sayfa + $s_s) : ($sayfa_sayisi);	
if($gelen_sayfa > 1 ){ ?>

<a class="btn btn-info m-0" href="detailed.php?start=<?=$_GET['start'];?>&end=<?=$_GET['end'];?>&sayfa=1"><?=getTranslation('ajaxtumkuponlarim30');?></a>

<a class="btn btn-info m-0" href="detailed.php?start=<?=$_GET['start'];?>&end=<?=$_GET['end'];?>&sayfa=<?=$_GET['sayfa']-1;?>" id="sayfaveri">« <?=getTranslation('ajaxtumkuponlarim31');?></a>

<? } ?>
<?
for($i=$alt; $i<=$ust ;$i++){
if($i != $gelen_sayfa ){ ?>
<a class="btn btn-info m-0" href="detailed.php?start=<?=$_GET['start'];?>&end=<?=$_GET['end'];?>&sayfa=<?=$i;?>" id="sayfaveri"><?=$i;?></a>
<? } else { ?>
<span class="btn btn-info m-0" style="background-color: #11c540;border-color: #11c540;"><?=$i;?></span>
<? } ?>
<? } if($gelen_sayfa < $sayfa_sayisi){ ?>

<a class="btn btn-info m-0" href="detailed.php?start=<?=$_GET['start'];?>&end=<?=$_GET['end'];?>&sayfa=<?=$_GET['sayfa']+1;?>" id="sayfaveri"><?=getTranslation('ajaxtumkuponlarim32');?> »</a>

<a class="btn btn-info m-0" href="detailed.php?start=<?=$_GET['start'];?>&end=<?=$_GET['end'];?>&sayfa=<?=$sayfa_sayisi;?>" id="sayfaveri"><?=getTranslation('ajaxtumkuponlarim33');?></a>

<? } ?>
</td>
</tr>

</tfoot>

<? } ?>

</table>
</div>
</div>
</div>

</div>
</div>
</main>

<script>
function kupondegisimyetki(id,yetki) {
$.get('../ajax_superadmin.php?a=kullanicikuponyetkidegis&id='+id+'&yetki='+yetki+'',function(data) {
$('#success').show().html("<?=getTranslation('superadmin138');?>");
setTimeout('window.location.reload()', 3000);
});
}

function casinodegisimyetki(id,yetki) {
$.get('../ajax_superadmin.php?a=kullanicicasinoyetkidegis&id='+id+'&yetki='+yetki+'',function(data) {
$('#success').show().html("<?=getTranslation('superadmin138')?>");
setTimeout('window.location.reload()', 1000);
});
}

function sifresifirla(id) {
$('#success').hide();
$('#error').hide();
$('#info').show().html('<?=getTranslation('superadmin94');?>');

$.ajax({
url: "index.php?s=userediting",
type: "POST",
data: "islem=sifresifirla&id="+id+"",
success: function(data) {

if(data==1) {
	$('#info').hide();
	$('#success').show().html("<?=getTranslation('superadmin138');?>");
	$('#error').hide();
	setTimeout('window.location.reload()', 3000);
} else if(data==2) {
	$('#info').hide();
	$('#success').hide();
	$('#error').show().html("<?=getTranslation('superadmin95');?>");
}

}
});

}

function pasiflestir(id,durum) {
$('#success').hide();
$('#error').hide();
$('#info').show().html('<?=getTranslation('superadmin94');?>');

$.ajax({
url: "index.php?s=userediting",
type: "POST",
data: "islem=kullanicidurumdegis&id="+id+"&durum="+durum+"",
success: function(data) {

if(data==22) {
	$('#info').hide();
	$('#success').hide();
	$('#error').show().html("<?=getTranslation('superadmin95');?>");
} else {
	$('#info').hide();
	$('#success').show().html("<?=getTranslation('superadmin138');?>");
	$('#error').hide();
	setTimeout('window.location.reload()', 2000);
}

}
});

}

function kullanicisil(id) {
$('#success').hide();
$('#error').hide();
$('#info').show().html('<?=getTranslation('superadmin94');?>');

$.ajax({
url: "index.php?s=userediting",
type: "POST",
data: "islem=karalistepost&id="+id+"",
success: function(data) {

if(data==22) {
	$('#info').hide();
	$('#success').hide();
	$('#error').show().html("<?=getTranslation('superadmin95');?>");
} else if(data==23) {
	$('#info').hide();
	$('#success').hide();
	$('#error').show().html("<?=getTranslation('bayisilmeyetkiyok');?>");
} else {
	$('#info').hide();
	$('#success').show().html("<?=getTranslation('superadmin96');?>");
	$('#error').hide();
	setTimeout(function(){location.href="users.php", 3000});  
}

}
});

}

<? if($ub['alt_alt_durum']==0 && $ub['alt_durum']==1){ ?>
function silmeyetkisi(id) {
$('#success').hide();
$('#error').hide();
$('#info').show().html('<?=getTranslation('superadmin94');?>');

$.ajax({
url: "index.php?s=userediting",
type: "POST",
data: "islem=silmeyetkipost&id="+id+"",
success: function(data) {

if(data==22) {
	$('#info').hide();
	$('#success').hide();
	$('#error').show().html("<?=getTranslation('superadmin95');?>");
} else {
	$('#info').hide();
	$('#success').show().html("<?=getTranslation('superadmin96');?>");
	$('#error').hide();
	setTimeout(function(){location.href="detailed.php", 3000});  
}

}
});

}
<? } ?>
</script>
<?php include 'footer.php'; ?>

</body>
</html>