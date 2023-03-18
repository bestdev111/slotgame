<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); exit(); }

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

?>
<?php include 'header.php'; ?>

<main class="main">
<ol class="breadcrumb mb-0">
<li class="breadcrumb-item"><?=getTranslation('superadmin105')?></li>
</ol>

<div class="alert alert-danger mb-0" id="error"></div>
<div class="alert alert-info mb-0" id="info"></div>
<div class="alert alert-success mb-0" id="success"></div>

<div class="container-fluid mt-2">
<div class="row">
<div class="card">
<div class="card-header"><?=getTranslation('superadmin105')?></div>

<div class="card-header">
<div class="row">
<form method="GET" action="">
<div class="col-sm-3">
<input type="text" class="form-control pickadate picker__input tcal tcalInput" id="start" name="start" autocomplete="off" 

value="

<? if(gd("start")!=''){ ?>

<?=gd("start");?>

<? } else { ?>

<?=date("d-m-Y",strtotime('-1 Days')); ?>

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
<input type="submit" class="btn btn-success btn-block" value="<?=getTranslation('yeniyerler_kasa42')?>" style="margin-top:2px">
</div>
</form>

<div class="col-sm-4">
<a href="girislog.php?start=<?=$buhafta_tarih1;?>&end=<?=$buhafta_tarih2;?>" class="btn btn-link" style="margin-top:2px"><?=getTranslation('yeniyerler_kasa43')?></a>
<a href="girislog.php?start=<?=$buay_tarih1;?>&end=<?=$buay_tarih2;?>" class="btn btn-link" style="margin-top:2px"><?=getTranslation('yeniyerler_kasa44')?></a>
<a href="girislog.php?start=<?=$gecen_hafta_1_ver;?>&end=<?=$gecen_hafta_2_ver;?>" class="btn btn-link" style="margin-top:2px"><?=getTranslation('yeniyerler_kasa45')?></a>
</div>

</div>
</div>


<div class="card-block p-0">

<div class="table-responsive">
<table id="table" class="table mb-0">
<thead>
<tr>
<th><?=getTranslation('superadmin99')?></th>
<th><?=getTranslation('superadmin100')?></th>
<th><?=getTranslation('superadmin101')?></th>
<th><?=getTranslation('superadmin36')?></th>
</tr>
</thead>
<tbody>
<?
$benimbayilerim = benimbayilerim($ub['id']);

$user_ekle = "and user_id in ($benimbayilerim)";

if(gd("start")!='' || gd("end")!=''){

$tarih_1_ver = basla_time(gd("start"));
$tarih_2_ver = bitir_time(gd("end"));

} else {

$tarih_1_ver = basla_time(date("d-m-Y",strtotime('-1 Days')));
$tarih_2_ver = bitir_time(date("d-m-Y"));

}

$pageper = 25;
$gelen_sayfa = (isset($_GET['sayfa']) && $_GET['sayfa'] !='' ) ? intval($_GET['sayfa']) : 1;
$limit = $pageper;
$s_s = 10;
$s_sor = sed_sql_query("select count(id) from login_data where id!='' $user_ekle and zaman between '$tarih_1_ver' and '$tarih_2_ver'") or trigger_error(mysql_error(),E_USER_ERROR);
$satir = sed_sql_result($s_sor,0);
sed_sql_freeresult($s_sor);
if($satir >0){
$baslama = ($gelen_sayfa > 1) ? (($gelen_sayfa -1) * $limit) : 0 ;
$sayfa_kac = $satir/$limit;
$sayfa_sayisi = ($satir % $limit != 0) ? intval($sayfa_kac)+1 : intval($sayfa_kac);
$basla=( $satir >= $baslama ) ? $baslama : 0 ;
unset( $sayfa_kac, $baslama );
$sor = sed_sql_query("select * from login_data where id!='' $user_ekle and zaman between '$tarih_1_ver' and '$tarih_2_ver' order by zaman desc limit $basla,$limit");
$i=1;
$style='';
while($ass=sed_sql_fetcharray($sor)) {
?>
<tr class="table-1">
<td><span class="tag tag-success"><?=getTranslation('superadmin106')?></span></td>
<td><code>KB<?=$ass["user_id"];?></code> <?=$ass["login_user"];?> </td>
<td><code><?=$ass["login_ip"];?></code><a target="_blank" class="grid" href="https://ipinfo.io/<?=$ass['login_ip']; ?>" title="<?=getTranslation('superadmin107')?>" rel="external"><img src="/players/img/bayiler/ip.png" alt="<?=getTranslation('superadmin107')?>" border="0"></a></td>
<td><span title="" data-toggle="tooltip"><?=date("d-m-Y H:i:s",$ass['zaman']);?></span></td>
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
<td colspan="4" class="text-xs-center">
<?
$alt= ($gelen_sayfa - $s_s);
if($sayfa_sayisi <= $s_s || $gelen_sayfa <= $s_s ) {$alt=1;} 
$ust= (($gelen_sayfa + $s_s)< $sayfa_sayisi ) ? ($gelen_sayfa + $s_s) : ($sayfa_sayisi);	
if($gelen_sayfa > 1 ){ ?>

<a class="btn btn-info m-0" href="girislog.php?start=<?=$_GET['start'];?>&end=<?=$_GET['end'];?>&sayfa=1"><?=getTranslation('ajaxtumkuponlarim30');?></a>

<a class="btn btn-info m-0" href="girislog.php?start=<?=$_GET['start'];?>&end=<?=$_GET['end'];?>&sayfa=<?=$_GET['sayfa']-1;?>" id="sayfaveri">« <?=getTranslation('ajaxtumkuponlarim31');?></a>

<? } ?>
<?
for($i=$alt; $i<=$ust ;$i++){
if($i != $gelen_sayfa ){ ?>
<a class="btn btn-info m-0" href="girislog.php?start=<?=$_GET['start'];?>&end=<?=$_GET['end'];?>&sayfa=<?=$i;?>" id="sayfaveri"><?=$i;?></a>
<? } else { ?>
<span class="btn btn-info m-0" style="background-color: #11c540;border-color: #11c540;"><?=$i;?></span>
<? } ?>
<? } if($gelen_sayfa < $sayfa_sayisi){ ?>

<a class="btn btn-info m-0" href="girislog.php?start=<?=$_GET['start'];?>&end=<?=$_GET['end'];?>&sayfa=<?=$_GET['sayfa']+1;?>" id="sayfaveri"><?=getTranslation('ajaxtumkuponlarim32');?> »</a>

<a class="btn btn-info m-0" href="girislog.php?start=<?=$_GET['start'];?>&end=<?=$_GET['end'];?>&sayfa=<?=$sayfa_sayisi;?>" id="sayfaveri"><?=getTranslation('ajaxtumkuponlarim33');?></a>

<? } ?>
</td>
</tr>

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

<?php include 'footer.php'; ?>

</body>
</html>