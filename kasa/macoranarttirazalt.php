<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); die(); exit(); }
if($ub['alt_durum']<1 && $ub['wkyetki']<1 && $ub['alt_alt_durum']<1 && $ub['sahip']=="0") { header("Location:index.php"); }
if($ub['adminpanel']=="1") { header("Location:admin"); }
rebuild($ub['id']);

$spor_tip = $_GET['spor_tip'];

$bayi_id = $_GET['bayisec'];

if($bayi_id>0){
	$bayi_id_ver = $bayi_id;
	$bayilerim = "".benimbayilerim($ub['id'])."";
	$bayi_array = explode(",",$bayilerim);
	if(!in_array($bayi_id,$bayi_array) || !is_numeric($bayi_id)) { $onaylandi = "yetkilidegilsiniz"; }
} else {
	$bayi_id_ver = $ub['id'];
}

if($spor_tip==1){
$sor2 = sed_sql_query("select * from oran_tip_futbol where id!=''");
$spor_tip_ver = 'futbol';
} else if($spor_tip==2){
$sor2 = sed_sql_query("select * from oran_tip_basketbol where id!=''");
$spor_tip_ver = 'basketbol';
} else if($spor_tip==3){
$sor2 = sed_sql_query("select * from oran_tip_tenis where id!=''");
$spor_tip_ver = 'tenis';
} else if($spor_tip==4){
$sor2 = sed_sql_query("select * from oran_tip_voleybol where id!=''");
$spor_tip_ver = 'voleybol';
} else if($spor_tip==5){
$sor2 = sed_sql_query("select * from oran_tip_buzhokeyi where id!=''");
$spor_tip_ver = 'buzhokeyi';
} else if($spor_tip==6){
$sor2 = sed_sql_query("select * from oran_tip_hentbol where id!=''");
$spor_tip_ver = 'hentbol';
} else {
$sor2 = sed_sql_query("select * from oran_tip_futbol where id!=''");
$spor_tip_ver = 'futbol';
}

if($_GET['sifirla'] == 1){
if($onaylandi != "yetkilidegilsiniz"){ sed_sql_query("delete from maclar_topluoranlar where spor_tipi='".$spor_tip_ver."' and bayi_id='".$bayi_id_ver."'"); $onaylandi = 3; }
}

// POST BAŞLANGIÇ //
if(isset($_POST['submit'])){

if($onaylandi != "yetkilidegilsiniz"){

// FOREACH BAŞLANGIÇ //
foreach ($_POST['rid'] as $key => $value) {

$sor = sed_sql_query("select * from maclar_topluoranlar where spor_tipi='".$spor_tip_ver."' and oran_val_id='".$key."' and bayi_id='".$bayi_id_ver."'");

if(sed_sql_numrows($sor)<1) {

sed_sql_query("INSERT INTO maclar_topluoranlar SET spor_tipi='".$spor_tip_ver."', oran_val_id='".$key."', bayi_id = '".$bayi_id_ver."', oran = '".$value."'");
$onaylandi = 1;
} else {

sed_sql_query("update maclar_topluoranlar set oran = '".$value."' where spor_tipi='".$spor_tip_ver."' and oran_val_id='".$key."' and bayi_id='".$bayi_id_ver."'");
$onaylandi = 2;
}

// FOREACH BİTİŞ //
}

}

// POST BİTİŞ //
}

?>
<?php include 'header.php'; ?>
<script>
$("#macoranarttirazalt").addClass("active");
function tumunuesle(value){
	$('.tumunueslesene').val(value);
}
</script>

<main class="main">
<ol class="breadcrumb mb-0">
<li class="breadcrumb-item"><?=getTranslation('playersmacoranarttirazalt3')?></li>
</ol>


<? if($onaylandi==1) { ?>
<div class="alert alert-success mb-0" id="success" style="display:block;"><?=getTranslation('playersmacoranarttirazalt1')?></div>
<? } else if($onaylandi==2) { ?>
<div class="alert alert-success mb-0" id="success" style="display:block;"><?=getTranslation('playersmacoranarttirazalt2')?></div>
<? } ?>


<div class="container-fluid mt-2">
<div class="row">
<div class="row">
<div class="col-sm-12">
<div class="card">

<form action="macoranarttirazalt.php?spor_tip=<?=$spor_tip;?>&bayisec=<?=$_GET['bayisec'];?>" method="post">

<div class="card-header">

<select class="inputCombo" style="width: 15%;float: left;" id="bayisec" onchange="window.location.href='macoranarttirazalt.php?spor_tip=<?=$spor_tip;?>&bayisec='+this.value+'';">
<option value="0">-- <?=getTranslation('tumhesaplar')?> --</option>
<?
$sor_kullanici = sed_sql_query("select * from kullanici where hesap_sahibi_id='".$ub['id']."' and root='0' order by id asc");
while($row_kullanici=sed_sql_fetcharray($sor_kullanici)) {
$bilgisi_getir_bayi = bilgi("select id from oyunlar_normal where spor_tipi='".$spor_tip_ver."' and bayi_id='".$row_kullanici['id']."'");
$bilgisi_getir2_bayi = bilgi("select id from maclar_topluoranlar where spor_tipi = '".$spor_tip_ver."' and bayi_id='".$row_kullanici['id']."'");
?>
<option value="<?=$row_kullanici['id'];?>" <? if($bayi_id==$row_kullanici['id']){ ?>selected<? } ?>><?=$row_kullanici['username']; ?><? if($bilgisi_getir_bayi['id']>0 || $bilgisi_getir2_bayi['id']>0){ ?> (<?=getTranslation('yeniyerler_kasa193')?>)<? } ?></option>
<? } ?>
</select>

<font style="float: left;margin-right: 10px;margin-left: 10px;"><a href="javascript:;" onclick="window.location.href='macoranarttirazalt.php?spor_tip=<?=$spor_tip;?>&bayisec=<?=$_GET['bayisec'];?>&sifirla=1';" class="btn btn-success"><?=getTranslation('yeniyerler_kasa194')?></a></font>

<font style="float: left;margin-right: 7px;"><?=getTranslation('playersmacoranarttirazalt4')?></font>

<select class="inputcombo" style="width:25%;float: left;" name="spor_tip" id="spor_tip" onchange="window.location.href='macoranarttirazalt.php?spor_tip='+this.value+'&bayisec=<?=$_GET['bayisec'];?>';">
<option <? if($spor_tip==1){ ?>selected<? } ?> value="1"><?=getTranslation('playersmacoranarttirazalt5')?></option>
<option <? if($spor_tip==2){ ?>selected<? } ?> value="2"><?=getTranslation('playersmacoranarttirazalt6')?></option>
<option <? if($spor_tip==3){ ?>selected<? } ?> value="3"><?=getTranslation('playersmacoranarttirazalt7')?></option>
<option <? if($spor_tip==4){ ?>selected<? } ?> value="4"><?=getTranslation('playersmacoranarttirazalt8')?></option>
<option <? if($spor_tip==5){ ?>selected<? } ?> value="5"><?=getTranslation('playersmacoranarttirazalt9')?></option>
<option <? if($spor_tip==6){ ?>selected<? } ?> value="6"><?=getTranslation('playersmacoranarttirazalt10')?></option>
</select>

<font style="float: left;margin-right: 7px;margin-left: 7px;"><?=getTranslation('yeniyerler_kasa195')?></font>

<select class="inputcombo" style="width: 15%;float: left;" onchange="tumunuesle(this.value);">
<option selected value=""><?=getTranslation('playersmacoranarttirazalt12')?></option>
<option value="-0.50">-0.50</option>
<option value="-0.45">-0.45</option>
<option value="-0.40">-0.40</option>
<option value="-0.35">-0.35</option>
<option value="-0.30">-0.30</option>
<option value="-0.25">-0.25</option>
<option value="-0.20">-0.20</option>
<option value="-0.15">-0.15</option>
<option value="-0.10">-0.10</option>
<option value="-0.05">-0.05</option>
<option value="0.00">0.00</option>
<option value="0.05">+0.05</option>
<option value="0.10">+0.10</option>
<option value="0.15">+0.15</option>
<option value="0.20">+0.20</option>
<option value="0.25">+0.25</option>
<option value="0.30">+0.30</option>
<option value="0.35">+0.35</option>
<option value="0.40">+0.40</option>
<option value="0.45">+0.45</option>
<option value="0.50">+0.50</option>
</select>

</div>

<div class="card-block p-0">
<div class="table-responsive">
<table class="table table-striped mb-0">
<thead>

<? while($row=sed_sql_fetcharray($sor2)) { 
$bilgi_bul = bilgi("select id,oran from maclar_topluoranlar where oran_val_id='".$row['id']."' and spor_tipi = '".$spor_tip_ver."' and bayi_id='".$bayi_id_ver."'");
if($bilgi_bul['id']<1){ $daha_yok = 1; }
?>

<tr class="c">
<? if($spor_tip==1){ ?>
<td class="l" colspan="3"><?=getTranslation('foran'.$row['id'].'')?></td>
<? } else if($spor_tip==2){ ?>
<td class="l" colspan="3"><?=getTranslation('boran'.$row['id'].'')?></td>
<? } else if($spor_tip==3){ ?>
<td class="l" colspan="3"><?=getTranslation('toran'.$row['id'].'')?></td>
<? } else if($spor_tip==4){ ?>
<td class="l" colspan="3"><?=getTranslation('voran'.$row['id'].'')?></td>
<? } else if($spor_tip==5){ ?>
<td class="l" colspan="3"><?=getTranslation('buzoran'.$row['id'].'')?></td>
<? } else if($spor_tip==6){ ?>
<td class="l" colspan="3"><?=getTranslation('horan'.$row['id'].'')?></td>
<? } else { ?>
<td class="l" colspan="3"><?=getTranslation('foran'.$row['id'].'')?></td>
<? } ?>

<td>
<select class="inputCombo chosen tumunueslesene" style="width: 100%;" id="<?=$row['id'];?>" name="rid[<?=$row['id']; ?>]">
<option <? if($bilgi_bul['oran']=="-0.50"){ ?>selected<? } ?> value="-0.50">-0.50</option>
<option <? if($bilgi_bul['oran']=="-0.45"){ ?>selected<? } ?> value="-0.45">-0.45</option>
<option <? if($bilgi_bul['oran']=="-0.40"){ ?>selected<? } ?> value="-0.40">-0.40</option>
<option <? if($bilgi_bul['oran']=="-0.35"){ ?>selected<? } ?> value="-0.35">-0.35</option>
<option <? if($bilgi_bul['oran']=="-0.30"){ ?>selected<? } ?> value="-0.30">-0.30</option>
<option <? if($bilgi_bul['oran']=="-0.25"){ ?>selected<? } ?> value="-0.25">-0.25</option>
<option <? if($bilgi_bul['oran']=="-0.20"){ ?>selected<? } ?> value="-0.20">-0.20</option>
<option <? if($bilgi_bul['oran']=="-0.15"){ ?>selected<? } ?> value="-0.15">-0.15</option>
<option <? if($bilgi_bul['oran']=="-0.10"){ ?>selected<? } ?> value="-0.10">-0.10</option>
<option <? if($bilgi_bul['oran']=="-0.05"){ ?>selected<? } ?> value="-0.05">-0.05</option>
<option <? if($bilgi_bul['oran']=="0.00"){ ?>selected<? } ?><? if($daha_yok==1){ ?>selected<? } ?> value="0.00">0.00</option>
<option <? if($bilgi_bul['oran']=="0.05"){ ?>selected<? } ?> value="0.05">+0.05</option>
<option <? if($bilgi_bul['oran']=="0.10"){ ?>selected<? } ?> value="0.10">+0.10</option>
<option <? if($bilgi_bul['oran']=="0.15"){ ?>selected<? } ?> value="0.15">+0.15</option>
<option <? if($bilgi_bul['oran']=="0.20"){ ?>selected<? } ?> value="0.20">+0.20</option>
<option <? if($bilgi_bul['oran']=="0.25"){ ?>selected<? } ?> value="0.25">+0.25</option>
<option <? if($bilgi_bul['oran']=="0.30"){ ?>selected<? } ?> value="0.30">+0.30</option>
<option <? if($bilgi_bul['oran']=="0.35"){ ?>selected<? } ?> value="0.35">+0.35</option>
<option <? if($bilgi_bul['oran']=="0.40"){ ?>selected<? } ?> value="0.40">+0.40</option>
<option <? if($bilgi_bul['oran']=="0.45"){ ?>selected<? } ?> value="0.45">+0.45</option>
<option <? if($bilgi_bul['oran']=="0.50"){ ?>selected<? } ?> value="0.50">+0.50</option>
</select>
</td>

</tr>

<? } ?>

<tr>
<td class="last" colspan="6">
<input class="btn btn-small btn-primary" style="float: right;" value="<?=getTranslation('playersmacoranarttirazalt13')?>" type="submit" name="submit">
</td>
</tr>
</form>

</thead>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

</main>

<?php include 'footer.php'; ?>

</body>
</html>