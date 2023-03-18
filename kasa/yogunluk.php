<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:../login.php"); die(); exit(); }
if($ub['alt_durum']<1) { header("Location:index.php"); }

?>
<?php include 'header.php'; ?>

<?
$liste = benimbayilerim($ub['id']);
$liste_ekle = "and k.user_id in ($liste)";
?>

<main class="main">
<ol class="breadcrumb mb-0">
<li class="breadcrumb-item"><?=getTranslation('menuyogunlukanalizi')?>
</ol>
<div class="container-fluid mt-2">
<div class="row">
<div class="row">

<div class="col-sm-6">
<div class="card">
<div class="card-header"><?=getTranslation('yogunluk1')?> <FONT STYLE="COLOR: #f00;FONT-SIZE: 14px;"><?=getTranslation('yogunluk2')?></FONT> <?=getTranslation('yogunluk3')?></div>
<div class="card-block p-0">
<div class="table-responsive">

<?
$sorx = sed_sql_query("select *,count(*) as totali, sum(k.yatan) as toplamyatan, sum(k.tutar) as toplamtutar, sum(k.toplam_mac) as toplammac from kuponlar k, kupon_ic ki where ki.spor_tip='futbol' and k.durum='1' and k.id=ki.kupon_id $liste_ekle group by ki.oran_val_id,ki.mac_db_id order by toplamyatan desc limit 15");
?>

<table class="table mb-0">
<thead>
<tr>
<th width="15%"><?=getTranslation('yogunluk5')?></th>
<th width="65%"><?=getTranslation('yogunluk6')?></th>
<th width="5%" style="text-align:center;"><?=getTranslation('yogunluk7')?></th>
<th width="5%" style="text-align:center;"><?=getTranslation('yogunluk8')?></th>
<th width="5%" style="text-align:center;"><?=getTranslation('yogunluk9')?></th>
<th width="5%" style="text-align:center;"><?=getTranslation('yogunluk10')?></th>
</tr>
</thead>
<tbody id="calcall">

<?php
while($row=sed_sql_fetcharray($sorx)) {
@$ob = bilgi("select * from oran_val where id='".$row['oran_val_id']."'");
@$ot = bilgi("select * from oran_tip where id='".$ob['oran_tip']."'");
?>
<tr>
<td width="15%"><?=date("d.m H:i:s",$row['mac_time']);?></td>
<td width="65%"><?=$row['ev_takim'];?> - <?=$row['konuk_takim'];?></td>
<td width="5%" style="text-align:center;"><?=$row['totali']; ?></td>
<td width="5%" style="text-align:center;"><code><?=nf($row['toplamyatan']); ?></code></td>
<td width="5%" style="text-align:center;"><code><?=nf($row['toplamtutar']); ?></code></td>
<td width="5%" style="text-align:center;"><?=number_format($row['toplammac']/$row['totali'],2,".",".");?></strong> / kb</td>
</tr>
<? } ?>

</tbody>
</table>
</div>
</div>
</div>
</div>

<div class="col-sm-6">
<div class="card">
<div class="card-header"><?=getTranslation('yogunluk1')?> <FONT STYLE="COLOR: #f00;FONT-SIZE: 14px;"><?=getTranslation('yogunluk11')?></FONT> <?=getTranslation('yogunluk12')?></div>
<div class="card-block p-0">
<div class="table-responsive">

<?
$sorz = sed_sql_query("select *,count(*) as totali, sum(k.yatan) as toplamyatan, sum(k.tutar) as toplamtutar, sum(k.toplam_mac) as toplammac from kuponlar k, kupon_ic ki where ki.spor_tip='futbol' and k.durum='1' and k.id=ki.kupon_id $liste_ekle group by ki.oran_val_id,ki.mac_db_id order by totali desc limit 15");
?>

<table class="table mb-0">
<thead>
<tr>
<th width="65%"><?=getTranslation('yogunluk6')?></th>
<th width="5%" style="text-align:center;"><?=getTranslation('yogunluk7')?></th>
<th width="5%" style="text-align:center;"><?=getTranslation('yogunluk8')?></th>
<th width="5%" style="text-align:center;"><?=getTranslation('yogunluk9')?></th>
<th width="5%" style="text-align:center;"><?=getTranslation('yogunluk10')?></th>
</tr>
</thead>
<tbody id="calcall">

<?
while($row=sed_sql_fetcharray($sorz)) {
@$ob = bilgi("select * from oran_val where id='$row[oran_val_id]'");
@$ot = bilgi("select * from oran_tip where id='$ob[oran_tip]'");
?>
<tr>
<td width="65%"><?=$row['ev_takim'];?> - <?=$row['konuk_takim'];?></td>
<td width="5%" style="text-align:center;"><?=$row['totali']; ?></td>
<td width="5%" style="text-align:center;"><code><?=nf($row['toplamyatan']); ?></code></td>
<td width="5%" style="text-align:center;"><code><?=nf($row['toplamtutar']); ?></code></td>
<td width="5%" style="text-align:center;"><?=number_format($row['toplammac']/$row['totali'],2,".",".");?></strong> / kb</td>
</tr>
<? } ?>

</tbody>
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