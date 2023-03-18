<?
session_start(); ob_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); die(); exit(); }
if($ub['kupon_yetki']!="1") { header("Location:index.php"); }
if($ub['adminpanel']=="1") { header("Location:admin"); }
// if($ub['id'] != 1) { header("Location:index.php"); exit();}
?>
<? include 'header.php'; ?>
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
<? include 'menu.php'; ?>

<script>
$("#kupondegistir").addClass("activemnuitems");
</script>

<div id="main" class="lwkSelector" style="width: 758px;">
<div id="live">
<div class="space_20"></div>
<div class="main_space" id="main_wide">
<table style="width:98%" class="filterTable">
<tbody>
<tr>
<form method="get">
<td class="filtersCell1 l" style="width:265px" nowrap="">
<strong style="font-weight:bold;color:#000"><?=getTranslation('kupondegistir1')?> </strong> <input class="inputText" type="text" style="width:90px" name="id" value="">
</td>
<td class="filtersCell1 l" style="width:175px" nowrap="">
<input type="submit" class="btn btn-primary thesearchbutton" style="<?=getTranslation('kupondegistir21')?>;" value="<?=getTranslation('kupondegistir2')?>">
</td>
</form>
</tr>
</tbody>
</table>

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

<table class="tablesorter">
<tbody>
<tr>
<th><?=getTranslation('kupondegistir4')?> <?=$id;?> <?=getTranslation('kupondegistir5')?></th>
</tr>
<tr>
<td style="text-align:center;font-weight:bold;">
<?=getTranslation('kupondegistir6')?>
<BR>
<?=getTranslation('kupondegistir7')?>
</td>
</tr>
</tbody>
</table>

<table id="tablesorter" class="tablesorter">
<thead>
<tr>
<th class="header"><?=getTranslation('kupondegistir8')?></th>
<th class="header"><?=getTranslation('kupondegistir9')?></th>
<th class="header"><?=getTranslation('kupondegistir10')?></th>
<th class="header"><?=getTranslation('kupondegistir11')?></th>
<th class="header"><?=getTranslation('kupondegistir12')?></th>
<th class="header"><?=getTranslation('kupondegistir13')?></th>
<th class="header"><?=getTranslation('kupondegistir14')?></th>
<th class="header"><?=getTranslation('kupondegistir15')?></th>
<th class="header"><?=getTranslation('kupondegistir16')?></th>
<th class="header"><?=getTranslation('kupondegistir17')?></th>
<th class="header"><?=getTranslation('kupondegistir18')?></th>
<? if($ub['id']=="1") { ?><th class="header"><?=getTranslation('kupondegistir19')?></th><? } ?>
<th class="header"><?=getTranslation('kupondegistir20')?></th>
</tr>
</thead>
<tbody>

<?
$sor = sed_sql_query("select * from kupon_ic where kupon_id='$id'");
while($row=sed_sql_fetcharray($sor)) { 
$ob = explode("|",$row['oran_tip']);

if($row['spor_tip']=="canli") { 
$infobol = explode("|",$row['canli_info']);
$zaman = "$infobol[0] <strong>($infobol[1])</strong>";

$canlibilgi = sed_sql_query("select * from canli_maclar where id='$row[mac_db_id]'");
if(mysql_num_rows($canlibilgi)>0) {
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

<tr style="text-align:center;" class="itext-<?=$row['kazanma'];?> c">
<td><?=$zaman;?></td>
<td><?=date("d.m H:i",$row['mac_time']); ?></td>
<td><?=ucfirst($row['spor_tip']); ?></td>
<td><?=$row['ev_takim']; ?><br>-<br><?=$row['konuk_takim']; ?></td>
<td><?=$ob[0];?></td>
<td><?=$ob[1];?><? if(!empty($row['oran_val'])) { echo "($row[oran_val])"; } ?></td>
<td><input type="text" class="editkupon" style="width:25px;color:#000;font-weight:bold;" id="edit_oran_<?=$row['id']; ?>" value="<?=nf($row['oran']); ?>"></td>
<td><?=$iy;?></td>
<td><?=$ms;?></td>
<td>
<select class="editkupon" id="edit_durum_<?=$row['id']; ?>" style="width:auto;">
<option value="1" <? if($row['kazanma']=="1") { echo "selected"; } ?>><?=getTranslation('kupondegistir29')?></option>
<option value="2" <? if($row['kazanma']=="2") { echo "selected"; } ?>><?=getTranslation('kupondegistir30')?></option>
<option value="3" <? if($row['kazanma']=="3") { echo "selected"; } ?>><?=getTranslation('kupondegistir31')?></option>
<option value="4" <? if($row['kazanma']=="4") { echo "selected"; } ?>><?=getTranslation('kupondegistir32')?></option>
</select>
</td>
<td><?=$macsonucu;?></td>
<? if($ub['id']=="1") { ?>
<td>
<? $giris = $row['ilkgiris']; if($giris=="0") { echo "Updated"; } else { $bekleme_suresi = $kupon_bilgi['kupon_time']-$row['ilkgiris']; echo $bekleme_suresi; } ?>
</td>
<? } ?>
<td><input type="button" class="editkupon editbutton" value="<?=getTranslation('kupondegistir33')?>" onClick="edit_satir('<?=$row['id']; ?>');"></td>
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

<table id="tablesorter" class="tablesorter">
<thead>
<tr>
<th class="header"><?=getTranslation('kupondegistir34')?></th>
<th class="header"><?=getTranslation('kupondegistir35')?></th>
<th class="header"><?=getTranslation('kupondegistir36')?></th>
<th class="header"><?=getTranslation('kupondegistir37')?></th>
<th class="header"><?=getTranslation('kupondegistir38')?></th>
<th class="header"><?=getTranslation('kupondegistir39')?></th>
<th class="header"><?=getTranslation('kupondegistir40')?></th>
<th class="header"><?=getTranslation('kupondegistir41')?></th>
</tr>
</thead>
<tbody>
<tr class="itext-<?=$kupon_bilgi['durum'];?> c">
<td style="text-align:center;"><? $ouserim = bilgi("select username from kullanici where id='$kupon_bilgi[user_id]'"); echo $ouserim['username']; ?></td>
<td style="text-align:center;"><?=$kupon_bilgi['username']; ?></td>
<td style="text-align:center;"><?=$kupon_bilgi['kupon_nots']; ?></td>
<td style="text-align:center;"><?=date("d.m.Y H:i:s",$kupon_bilgi['kupon_time']); ?></td>
<td style="text-align:center;"><?=nf($kupon_bilgi['oran']); ?></td>
<td style="text-align:center;"><?=nf($kupon_bilgi['yatan']); ?></td>
<td style="text-align:center;"><?=nf($kupon_bilgi['tutar']); ?></td>
<td style="text-align:center;" class='durum_<?=$kupon_bilgi['durum']?>'><?=durumnedir($kupon_bilgi['durum']); ?></td>
</tr>
</tbody>
</table>
<? } ?>
<? } ?>
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

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<? include 'footer.php'; ?>

</body>
</html>