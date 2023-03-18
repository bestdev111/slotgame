<?php
session_start(); ob_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); die(); exit(); }
if($ub['kupon_yetki']!="1") { header("Location:index.php"); }
if($ub['adminpanel']=="1") { header("Location:admin"); }
// if($ub['id'] != 1) { header("Location:index.php"); exit();}
?>
<?php include 'header.php'; ?>
<style>
.itext-1 {
    color:#000!important;
    font-weight: bold;
}

.itext-2 {
    color:#5CB85C!important;
    font-weight: bold;
}

.itext-3 {
    color:#E66454!important;
    font-weight: bold;
}

.itext-4 {
    color:#444!important;
	text-decoration:line-through;
    font-weight: bold;
}
</style>

<main class="main">
<ol class="breadcrumb mb-0">
<li class="breadcrumb-item">Kupon Değiştirme</li>
</ol>
</div>
</div>

<div class="container-fluid mt-2">
<div class="row">
<div class="card">
<div class="card-block">
<div class="row">
<div class="form-group col-sm-12">
<label for="" style="float: left;margin-top: 6px;margin-right: 10px;">DEĞİŞTİRİLİCEK KUPON NO'SU</label>
<form method="get">
<input class="form-control" type="text" style="width: 70%;float: left;" placeholder="Kupon Numarası Giriniz." name="id" value="">
<input type="submit" class="btn btn-link btn-sm" style="float: left;margin-top: 4px;" value="KUPONU BUL">
</form>
</div>
</div>
</div>
</div>
</div>
</div>


<? 
if(isset($_GET['id'])) {
$bayilerim = explode(",",benimbayilerim($ub['id']));
$id = gd("id");
$ipadres = $_SERVER['REMOTE_ADDR'];
$kupon_bilgi = bilgi("select * from kuponlar where id='$id'");
if(empty($kupon_bilgi['id'])) { ?>

<div class="space_9 clear"></div>

<div class="space_9 clear"></div>

<div class="new_sheet cf panelHead" style="margin-top: 0px;height: 25px;line-height: 25px;text-align: center;background: #fff;border-bottom: 3px solid #ef8107;border-top: 3px solid #ef8107;"><?=getTranslation('kupondegistir3')?></div>

<? } else if(!in_array($kupon_bilgi['user_id'],$bayilerim)) { echo "<div class='bos'>Yetkiniz olmayan bir kupona müdahale etmeye çalıştınız. Bu girişiminiz <strong style='color:#FFF;'>($ipadres)</strong> kaydedildi.</div>";
} else {
?>

<div class="container-fluid mt-2">
<div class="row">
<div class="card">

<div class="card-header">
<div class="row"> ŞUANDA ( <?=$id;?> ) NOLU KUPONA MÜDAHALE EDİYORSUNUZ. <font style="color:#f00;font-size:13px;float:right;"><?=getTranslation('kupondegistir7')?></font></div>
</div>

<div class="card-block p-0">
<div class="table-responsive">
<table class="table mb-0">

<thead>
<tr>
<th class="header" style="border-right: 2px solid #cfd8dc;">Zaman</th>
<th class="header" style="text-align: center;border-right: 2px solid #cfd8dc;">Maç Zamanı</th>
<th class="header" style="text-align: center;border-right: 2px solid #cfd8dc;">Spor</th>
<th class="header" style="text-align: center;border-right: 2px solid #cfd8dc;">Müsabaka</th>
<th class="header" style="text-align: center;border-right: 2px solid #cfd8dc;">Tahmin</th>
<th class="header" style="text-align: center;border-right: 2px solid #cfd8dc;">Tercih</th>
<th class="header" style="text-align: center;border-right: 2px solid #cfd8dc;">Oran</th>
<th class="header" style="text-align: center;border-right: 2px solid #cfd8dc;">1.Yarı</th>
<th class="header" style="text-align: center;border-right: 2px solid #cfd8dc;">Skor</th>
<th class="header" style="text-align: center;border-right: 2px solid #cfd8dc;">Durum</th>
<th class="header" style="text-align: center;border-right: 2px solid #cfd8dc;">Maç</th>
<th class="header" style="text-align: center;">Düzenle</th>
</tr>
</thead>
<tbody id="calcall">

<?
$sor = sed_sql_query("select * from kupon_ic where kupon_id='$id'");
while($row=sed_sql_fetcharray($sor)) { 
$ob = explode("|",$row['oran_tip']);

if($row['spor_tip']=="canli") { 
$infobol = explode("|",$row['canli_info']);
$zaman = "$infobol[0] <strong>($infobol[1])</strong>";

$canlibilgi = sed_sql_query("select * from canli_maclar where id='$row[mac_db_id]'");
if(sed_sql_numrows($canlibilgi)>0) {
$bilgisi = sed_sql_fetcharray($canlibilgi);	
$iy = "$bilgisi[iy_ev]-$bilgisi[iy_konuk]*";
$ms = "$bilgisi[ev_skor]-$bilgisi[konuk_skor]*";
$farki = time()-30;
if($bilgisi['songuncelleme']<$farki) {
$macsonucu = "".getTranslation('kupondegistir42').""; } else
if($bilgisi['devremi']=="1") {
$macsonucu = "".getTranslation('kupondegistir22').""; } else {
$macsonucu = "".getTranslation('kupondegistir23')." <strong>$bilgisi[dakika]".getTranslation('canlidkicin')."</strong>";
}
} else {
$iy = $row['iy'];
$ms = $row['ms'];
$macsonucu = "".getTranslation('kupondegistir24')."";
}
} else {
if($row['mac_time']<time()) { 
$macsonucu = "".getTranslation('kupondegistir25')." <strong>(".date("H:i",$row['mac_time']).")</strong>"; 
} else 
if($row['ertelendi']=="1") {
$macsonucu = "<strong>".getTranslation('kupondegistir26')."</strong>"; 	
} else {
$macsonucu = "".getTranslation('kupondegistir27')." <strong>".date("d.m H:i",$row['mac_time'])."</strong>"; 
}
$zaman = date("d.m H:i",$kb['kupon_time']);	
$iy = $row['iy'];
$ms = $row['ms'];
}

if($row['kazanma']!="1") { $macsonucu = "".getTranslation('kupondegistir28').""; }

if($iy=="") { $iy= "-"; }
if($ms=="") { $ms= "-"; }

?>

<tr class="table itext-<?=$row['kazanma'];?> c">

<td style="border-right: 2px solid #cfd8dc;"><?=$zaman;?></td>

<td style="text-align: center;border-right: 2px solid #cfd8dc;"><?=date("d.m H:i",$row['mac_time']); ?></td>

<td style="text-align: center;border-right: 2px solid #cfd8dc;"><?=ucfirst($row['spor_tip']); ?></td>

<td style="text-align: center;border-right: 2px solid #cfd8dc;"><?=$row['ev_takim']; ?><br>-<br><?=$row['konuk_takim']; ?></td>

<td style="text-align: center;border-right: 2px solid #cfd8dc;"><?=$ob[0];?></td>

<td style="text-align: center;border-right: 2px solid #cfd8dc;"><?=$ob[1];?><? if(!empty($row['oran_val'])) { echo "($row[oran_val])"; } ?></td>

<td style="text-align: center;border-right: 2px solid #cfd8dc;"><input type="text" class="form-control" style="width:55px;color:#000;font-weight:bold;" id="edit_oran_<?=$row['id']; ?>" value="<?=nf($row['oran']); ?>"></td>

<td style="text-align: center;border-right: 2px solid #cfd8dc;"><?=$iy;?></td>

<td style="text-align: center;border-right: 2px solid #cfd8dc;"><?=$ms;?></td>

<td style="text-align: center;border-right: 2px solid #cfd8dc;">
<select class="form-control" id="edit_durum_<?=$row['id']; ?>" style="width:auto;">
<option value="1" <? if($row['kazanma']=="1") { echo "selected"; } ?>><?=getTranslation('kupondegistir29')?></option>
<option value="2" <? if($row['kazanma']=="2") { echo "selected"; } ?>><?=getTranslation('kupondegistir30')?></option>
<option value="3" <? if($row['kazanma']=="3") { echo "selected"; } ?>><?=getTranslation('kupondegistir31')?></option>
<option value="4" <? if($row['kazanma']=="4") { echo "selected"; } ?>><?=getTranslation('kupondegistir32')?></option>
</select>
</td>

<td style="text-align: center;border-right: 2px solid #cfd8dc;"><?=$macsonucu;?></td>

<? if($ub['id']=="1") { ?>
<td style="text-align: center;border-right: 2px solid #cfd8dc;">
<? $giris = $row['ilkgiris']; if($giris=="0") { echo "Updated"; } else { $bekleme_suresi = $kupon_bilgi['kupon_time']-$row['ilkgiris']; echo $bekleme_suresi; } ?>
</td>
<? } ?>

<td style="text-align: center;"><input type="button" class="editkupon editbutton" value="<?=getTranslation('kupondegistir33')?>" onClick="edit_satir('<?=$row['id']; ?>');"></td>

</tr>

<input type="hidden" id="mevcut_oran_<?=$row['id']; ?>" value="<?=nf($row['oran']); ?>">
<input type="hidden" id="mevcut_durum_<?=$row['id']; ?>" value="<?=$row['kazanma']; ?>">

<? } ?>

</tbody>
</table>

<script>
function edit_satir(id) {
	loadall();
	var yeni_oran = $("#edit_oran_"+id+"").val();
	var yeni_durum = $("#edit_durum_"+id+"").val();
	var mevcut_oran = $("#mevcut_oran_"+id+"").val();
	var mevcut_durum = $("#mevcut_durum_"+id+"").val();
	var rand = Math.random();
	$.get('../ajax_players.php?a=kuponduz&kupon_id=<?=$kupon_bilgi['id'];?>&yenioran='+yeni_oran+'&yenidurum='+yeni_durum+'&mevcutoran='+mevcut_oran+'&mevcutdurum='+mevcut_durum+'&rand='+rand+'&idob='+id+'',function(data) {  
	if(data=="1") { self.location.href='kupondegistir.php?id=<?=$kupon_bilgi['id']; ?>'; } else
	if(data=="2") { msg('faildurum','Bir hata oluştu. Satır düzenlenemedi.'); }
	});
}

</script>

<table class="table mb-0">

<thead>
<tr>
<th class="header" style="border-right: 2px solid #cfd8dc;">Kullanıcı Adı</th>
<th class="header" style="text-align: center;border-right: 2px solid #cfd8dc;">Kuponu Yapan</th>
<th class="header" style="text-align: center;border-right: 2px solid #cfd8dc;">Kupon Sahibi</th>
<th class="header" style="text-align: center;border-right: 2px solid #cfd8dc;">Kupon Tarihi</th>
<th class="header" style="text-align: center;border-right: 2px solid #cfd8dc;">Toplam Oran</th>
<th class="header" style="text-align: center;border-right: 2px solid #cfd8dc;">Yatırılan Tutar</th>
<th class="header" style="text-align: center;border-right: 2px solid #cfd8dc;">Kazanç</th>
<th class="header" style="text-align: center;">Kupon Durumu</th>
</tr>
</thead>
<tbody id="calcall">

<tbody>
<tr class="itext-<?=$kupon_bilgi['durum'];?> c">
<td style="border-right: 2px solid #cfd8dc;"><? $ouserim = bilgi("select username from kullanici where id='$kupon_bilgi[user_id]'"); echo $ouserim['username']; ?></td>
<td style="text-align: center;border-right: 2px solid #cfd8dc;"><?=$kupon_bilgi['username']; ?></td>
<td style="text-align:center;border-right: 2px solid #cfd8dc;"><?=$kupon_bilgi['kupon_nots']; ?></td>
<td style="text-align:center;border-right: 2px solid #cfd8dc;"><?=date("d.m.Y H:i:s",$kupon_bilgi['kupon_time']); ?></td>
<td style="text-align:center;border-right: 2px solid #cfd8dc;"><?=nf($kupon_bilgi['oran']); ?></td>
<td style="text-align:center;border-right: 2px solid #cfd8dc;"><?=nf($kupon_bilgi['yatan']); ?></td>
<td style="text-align:center;border-right: 2px solid #cfd8dc;"><?=nf($kupon_bilgi['tutar']); ?></td>
<td style="text-align:center;" class='durum_<?=$kupon_bilgi['durum']?>'><?=durumnedir($kupon_bilgi['durum']); ?></td>
</tr>
</tbody>
</table>

<? } ?>
<? } ?>

<div class="space_9"></div>
<div class="space"></div>


</div></div></div>

</div>
</div>
</div>

<script>
function loadall() {
$("#loadall").show();
$("body").css('overflow','hidden');
}
function loadexit() {
$("#loadall").hide();
$("body").css('overflow','auto');
}
</script>
<?php include 'footer.php'; ?>

</body>
</html>