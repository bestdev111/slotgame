<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); die(); exit(); }
if($ub['alt_durum']<1) { header("Location:index.php"); }

?>
<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>

<div id="main" class="lwkSelector" style="width: 758px;">
<div id="live">
<div class="space_20"></div>
<div class="main_space" id="main_wide">
<script>$('#yogunluk').addClass("activemnuitems")</script>
<div class="z-right-container" id="maskcontainer">
<div class="widget">
<ol class="widget-list list-nostyle" id="B" style="padding: 0;">


<?

$liste = benimbayilerim($ub['id']);
$liste_ekle = "and k.user_id in ($liste)";

?>

<table class="tablesorter">
<thead>
<tr>
<th colspan="6"><?=getTranslation('yogunluk1')?> <FONT STYLE="COLOR: #7aff00;FONT-SIZE: 14px;"><?=getTranslation('yogunluk2')?></FONT> <?=getTranslation('yogunluk3')?></th>
</tr>

<?
$sor = sed_sql_query("select *,count(*) as totali, sum(k.yatan) as toplamyatan, sum(k.tutar) as toplamtutar, sum(k.toplam_mac) as toplammac from kuponlar k, kupon_ic ki where ki.spor_tip='futbol' and k.durum='1' and k.id=ki.kupon_id $liste_ekle group by ki.oran_val_id,ki.mac_db_id order by toplamyatan desc limit 15");
if(sed_sql_numrows($sor)<1) { echo "<div class='bos'>".getTranslation('yogunluk4')."</div>"; } else { ?>

<tr>
<th><?=getTranslation('yogunluk5')?></th>
<th style="text-align:left;"><?=getTranslation('yogunluk6')?></th>
<th><?=getTranslation('yogunluk7')?></th>
<th><?=getTranslation('yogunluk8')?></th>
<th><?=getTranslation('yogunluk9')?></th>
<th><?=getTranslation('yogunluk10')?></th>
</tr>
</thead>
<tbody>

<?
while($row=sed_sql_fetcharray($sor)) {
$ob = bilgi("select * from oran_val where id='$row[oran_val_id]'");
$ot = bilgi("select * from oran_tip where id='$ob[oran_tip]'");

//$adet = sed_sql_numrows(sed_sql_query("select * from kupon_ic ki, kuponlar k where ki.oran_val_id='$row[oran_val_id]' and ki.mac_db_id='$row[mac_db_id]' and k.durum='1' and k.id=ki.kupon_id"));
?>
<tr style="color:#000;" class="<?=$row['mac_db_id']; ?>">
<td style="text-align:center;"><?=date("d.m H:i:s",$row['mac_time']);?></td>
<td><? echo "$row[ev_takim] - $row[konuk_takim]"; ?></td>
<td style="text-align:center;"><?=$row['totali']; ?></td>
<td style="text-align:center;" class="alr"><?=nf($row['toplamyatan']); ?></td>
<td style="text-align:center;" class="alr"><?=nf($row['toplamtutar']); ?></td>
<td style="text-align:center;" class="alr"><strong><?=number_format($row['toplammac']/$row['totali'],2,".",".");?></strong> / kb</td>
</tr>
<? } ?>
</tbody>
</table>

<? } ?>

<table class="tablesorter">
<thead>
<tr>
<th colspan="5"><?=getTranslation('yogunluk1')?> <FONT STYLE="COLOR: #7aff00;FONT-SIZE: 14px;"><?=getTranslation('yogunluk11')?></FONT> <?=getTranslation('yogunluk12')?></th>
</tr>

<?
$sor = sed_sql_query("select *,count(*) as totali, sum(k.yatan) as toplamyatan, sum(k.tutar) as toplamtutar, sum(k.toplam_mac) as toplammac from kuponlar k, kupon_ic ki where ki.spor_tip='futbol' and k.durum='1' and k.id=ki.kupon_id $liste_ekle group by ki.oran_val_id,ki.mac_db_id order by totali desc limit 15");
if(sed_sql_numrows($sor)<1) { echo "<div class='bos'>Gösterilecek herhangi bir kayıt bulunamadı</div>"; } else { ?>

<tr>
<th style="text-align:left;"><?=getTranslation('yogunluk13')?></th>
<th><?=getTranslation('yogunluk14')?></th>
<th><?=getTranslation('yogunluk15')?></th>
<th><?=getTranslation('yogunluk16')?></th>
<th><?=getTranslation('yogunluk17')?></th>
</tr>
</thead>
<tbody>

<?
while($row=sed_sql_fetcharray($sor)) {
$ob = bilgi("select * from oran_val where id='$row[oran_val_id]'");
$ot = bilgi("select * from oran_tip where id='$ob[oran_tip]'");

//$adet = sed_sql_numrows(sed_sql_query("select * from kupon_ic ki, kuponlar k where ki.oran_val_id='$row[oran_val_id]' and ki.mac_db_id='$row[mac_db_id]' and k.durum='1' and k.id=ki.kupon_id"));
?>
<tr style="color:#000;" class="<?=$row['mac_db_id']; ?>">
<td><? echo "$row[ev_takim] - $row[konuk_takim]"; ?></td>
<td style="text-align:center;"><?=$row['totali']; ?></td>
<td style="text-align:center;"><?=nf($row['toplamyatan']); ?></td>
<td style="text-align:center;"><?=nf($row['toplamtutar']); ?></td>
<td style="text-align:center;"><strong><?=number_format($row['toplammac']/$row['totali'],2,".",".");?></strong> / kb</td>
</tr>
<? } ?>
</tbody>
</table>
<? } ?>

<script>
$(".kuponlar ul").mouseenter(function(e) {
    var idsi = $(this).attr('class');
	$("."+idsi+" li").css('color','#e8bf00');
	$("."+idsi+" li").css('text-shadow','0px 0px 10px #e8bf00');
	$("."+idsi+" li").css('background-color','#000');
}).mouseleave(function(e) {
	var idsi = $(this).attr('class');
    $("."+idsi+" li").css('color','#CCC');
	$("."+idsi+" li").css('text-shadow','none');
	$("."+idsi+" li").css('background-color','#111');
});;

</script>

</ol>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<?php include 'footer.php'; ?>

</body>
</html>