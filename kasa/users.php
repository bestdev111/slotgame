<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); exit(); }

$id = gd("id");

if($id>0){ $id = $id; } else { $id = $ub['id']; }

$yetkisinibul = bilgi("select * from kullanici where id='$id'");

if($id=="1" && $ub['id']!="1") { die("..."); }

$bayilerim = benimbayilerim($ub['id']);

$bayi_array = explode(",",$bayilerim);

if(!in_array($id,$bayi_array)) { die("<div class='bos'>Bu yetkiye <strong>MAALESEF</strong> sahip değilsiniz.</div>"); }

?>
<?php include 'header.php'; ?>

<?php if($yetkisinibul['alt_durum']==1 && $yetkisinibul['alt_alt_durum']==1){ ?>

<main class="main">
<ol class="breadcrumb mb-0">
<li class="breadcrumb-item"><?=getTranslation('yeniyerler_kasa120')?></li>
</ol>

<div class="alert alert-danger mb-0" id="error"></div>
<div class="alert alert-info mb-0" id="info"></div>
<div class="alert alert-success mb-0" id="success"></div>

<div class="container-fluid mt-2">
<div class="row">
<div class="card">
<div class="card-header"> <?=getTranslation('yeniyerler_kasa121')?> <a href="javascript:;" onClick="window.location.reload();" class="tag tag-danger update-all-balancesnew"><?=getTranslation('yeniyerler_kasa122')?></a> </div>
<div class="card-block p-0">
<input type="text" id="searchField" placeholder="<?=getTranslation('yeniyerler_kasa92')?>" class="form-control musteri-search-by p-1" onkeyup="musteri_arama_ekrani();">
<ul id="search_ver" style="display:none;position: absolute;z-index: 1000;float: left;min-width: 160px;padding: 5px 0;width: 96%;margin: 2px 0 0;list-style: none;font-size: 14px;text-align: left;background-color: #fff;border: 1px solid rgba(0, 0, 0, 0.15);border-radius: 4px;box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);background-clip: padding-box;"></ul>
<div style="position: absolute;z-index: 2;right: 2.5%;margin-right: 22px;top: 50px;height: 22px;color: #9f9f9f;padding: 10px 0 10px 20px;display:none;" id="searchdeleteicon" class="deleteIcon" onclick="listelesene(1)">x</div>
<div class="table-responsive">
<table class="table table-striped mb-0">
<thead>
<tr>
<th style="width: 0%"><?=getTranslation('yeniyerler_kasa123')?></th>
<th style="width: 20%"><?=getTranslation('yeniyerler_kasa124')?></th>
<th style="width: 20%"><?=getTranslation('yeniyerler_kasa125')?></th>
<th style="width: 20%"><?=getTranslation('yeniyerler_kasa126')?></th>
<th style="width: 20%"><?=getTranslation('yeniyerler_kasa127')?></th>
<th style="width: 20%"><?=getTranslation('yeniyerler_kasa73')?></th>
<th style="width: 20%"><?=getTranslation('yeniyerler_kasa128')?></th>
</tr>
</thead>
<tbody>

<?
$sor = sed_sql_query("select * from kullanici where hesap_sahibi_id='".$id."' and root='0' order by id asc");
while($row=sed_sql_fetcharray($sor)) {
$sistemayarkontrol = bilgi("select * from sistemayar where ayar_id='$row[id]'");
$toplams_limit = bilgi("SELECT SUM(CASE WHEN id!='' THEN alt_sinir END) as toplam_limit FROM kullanici WHERE hesap_sahibi_id='$row[id]' and root='0'");
$toplams_kullanici = bilgi("SELECT COUNT(CASE WHEN id!='' THEN id END) as toplam_kullanici FROM kullanici WHERE hesap_sahibi_id='$row[id]' and root='0'");

## BAKİYESİ ##
$kullanici_bakiye_bol = explode(".",$row['bakiye']);
$kullanici_bakiye_kurus = substr($kullanici_bakiye_bol[1], 0, 2);
if($kullanici_bakiye_kurus>0){
$bakiyele = substr(nf($kullanici_bakiye_bol[0]), 0, -3);
$bakiyesini_ver = "".$bakiyele.".".$kullanici_bakiye_kurus."";
} else {
$bakiyele = substr(nf($kullanici_bakiye_bol[0]), 0, -3);
$bakiyesini_ver = "".$bakiyele.".00";
}
## CASİNO BAKİYESİ ##
$kullanici_bakiye_bol_casino = explode(".",$row['casinobakiye']);
$kullanici_bakiye_kurus_casino = substr($kullanici_bakiye_bol_casino[1], 0, 2);
if($kullanici_bakiye_kurus_casino>0){
$bakiyele_casino = substr(nf($kullanici_bakiye_bol_casino[0]), 0, -3);
$bakiyesini_ver_casino = "".$bakiyele_casino.".".$kullanici_bakiye_kurus_casino."";
} else {
$bakiyele_casino = substr(nf($kullanici_bakiye_bol_casino[0]), 0, -3);
$bakiyesini_ver_casino = "".$bakiyele_casino.".00";
}

?>

<tr>
<td>
<div style="min-width:200px;">
<a href="detailed.php?id=<?=$row["id"]?>" class="btn btn-info m-0" title="<?=getTranslation('yeniyerler_kasa484')?>"><i class="fa fa-eye"></i></a>&nbsp;
<a href="users.php?id=<?=$row["id"]?>" class="btn btn-info m-0" title="<?=getTranslation('yeniyerler_kasa486')?>"><i class="fa fa-user"></i></a>&nbsp;
</div>
</td>
<td><?=$row["username"]?> <br><? if($row['durum']==1){ ?><font style="color:#05af40;font-weight:500;"><?=getTranslation('yeniyerler_kasa129')?></font><? } else if($row['durum']==0){ ?><font style="color:#f00;font-weight:500;"><?=getTranslation('yeniyerler_kasa130')?></font><? } ?></td>
<td>Admin</td>
<td><?=$row["hatirlatmaad"]?></td>
<td><?=getTranslation('yeniyerler_kasa131')?>:<code><?=$bakiyesini_ver;?></code> <br><?=getTranslation('yeniyerler_kasa132')?>:<code><?=$bakiyesini_ver_casino;?></code></td>
<td><?=getTranslation('yeniyerler_kasa133')?>:<code><?=$row["username"]?></code><br><?=getTranslation('yeniyerler_kasa134')?>:<code><?=$row["password"]?></code></td>
<td><code><?=getTranslation('superadmin65')?>:<?=$row["alt_sinir"]?></code><br><code><?=getTranslation('superadmin66')?>:<?=$row["alt_sinir"]-$toplams_limit["toplam_limit"]-$toplams_kullanici["toplam_kullanici"];?></code></td>
</tr>

<? } ?>

</tbody>
<tr>
<td colspan="9">
<ul class="pagination"></ul>
</td>
</tr>

</table>
</div>
</div>
</div>
</div>
</div>
</main>

<? } else if($yetkisinibul['alt_durum']==1 && $yetkisinibul['alt_alt_durum']==0){ ?>

<main class="main">
<ol class="breadcrumb mb-0">
<li class="breadcrumb-item"><?=getTranslation('yeniyerler_kasa120')?></li>
</ol>

<div class="alert alert-danger mb-0" id="error"></div>
<div class="alert alert-info mb-0" id="info"></div>
<div class="alert alert-success mb-0" id="success"></div>

<div class="container-fluid mt-2">
<div class="row">
<div class="card">
<div class="card-header"> <?=getTranslation('yeniyerler_kasa121')?> <a href="javascript:;" onClick="window.location.reload();" class="tag tag-danger update-all-balancesnew"><?=getTranslation('yeniyerler_kasa122')?></a> </div>
<div class="card-block p-0">
<input type="text" id="searchField" placeholder="<?=getTranslation('yeniyerler_kasa92')?>" class="form-control musteri-search-by p-1" onkeyup="musteri_arama_ekrani();">
<ul id="search_ver" style="display:none;position: absolute;z-index: 1000;float: left;min-width: 160px;padding: 5px 0;width: 96%;margin: 2px 0 0;list-style: none;font-size: 14px;text-align: left;background-color: #fff;border: 1px solid rgba(0, 0, 0, 0.15);border-radius: 4px;box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);background-clip: padding-box;"></ul>
<div style="position: absolute;z-index: 2;right: 2.5%;margin-right: 22px;top: 50px;height: 22px;color: #9f9f9f;padding: 10px 0 10px 20px;display:none;" id="searchdeleteicon" class="deleteIcon" onclick="listelesene(1)">x</div>
<div class="table-responsive">
<table class="table table-striped mb-0">
<thead>
<tr>
<th style="width: 0%"><?=getTranslation('yeniyerler_kasa123')?></th>
<th style="width: 20%"><?=getTranslation('yeniyerler_kasa124')?></th>
<th style="width: 20%"><?=getTranslation('yeniyerler_kasa125')?></th>
<th style="width: 20%"><?=getTranslation('yeniyerler_kasa126')?></th>
<th style="width: 20%"><?=getTranslation('yeniyerler_kasa127')?></th>
<th style="width: 20%"><?=getTranslation('yeniyerler_kasa73')?></th>
<th style="width: 20%"><?=getTranslation('yeniyerler_kasa128')?></th>
</tr>
</thead>
<tbody>

<?
$sor = sed_sql_query("select * from kullanici where hesap_sahibi_id='".$id."' and root='0' order by id asc");
while($row=sed_sql_fetcharray($sor)) {
$sistemayarkontrol = bilgi("select * from sistemayar where ayar_id='$row[id]'");
$toplams_limit = bilgi("SELECT SUM(CASE WHEN id!='' THEN alt_sinir END) as toplam_limit FROM kullanici WHERE hesap_sahibi_id='$row[id]' and root='0'");
$toplams_kullanici = bilgi("SELECT COUNT(CASE WHEN id!='' THEN id END) as toplam_kullanici FROM kullanici WHERE hesap_sahibi_id='$row[id]' and root='0'");


## BAKİYESİ ##
$kullanici_bakiye_bol = explode(".",$row['bakiye']);
$kullanici_bakiye_kurus = substr($kullanici_bakiye_bol[1], 0, 2);
if($kullanici_bakiye_kurus>0){
$bakiyele = substr(nf($kullanici_bakiye_bol[0]), 0, -3);
$bakiyesini_ver = "".$bakiyele.".".$kullanici_bakiye_kurus."";
} else {
$bakiyele = substr(nf($kullanici_bakiye_bol[0]), 0, -3);
$bakiyesini_ver = "".$bakiyele.".00";
}
## CASİNO BAKİYESİ ##
$kullanici_bakiye_bol_casino = explode(".",$row['casinobakiye']);
$kullanici_bakiye_kurus_casino = substr($kullanici_bakiye_bol_casino[1], 0, 2);
if($kullanici_bakiye_kurus_casino>0){
$bakiyele_casino = substr(nf($kullanici_bakiye_bol_casino[0]), 0, -3);
$bakiyesini_ver_casino = "".$bakiyele_casino.".".$kullanici_bakiye_kurus_casino."";
} else {
$bakiyele_casino = substr(nf($kullanici_bakiye_bol_casino[0]), 0, -3);
$bakiyesini_ver_casino = "".$bakiyele_casino.".00";
}

?>

<tr>
<td>
<div style="min-width:200px;">
<a href="detailed.php?id=<?=$row["id"]?>" class="btn btn-info m-0" title="<?=getTranslation('yeniyerler_kasa484')?>"><i class="fa fa-eye"></i></a>&nbsp;
<a href="detailedsettings.php?id=<?=$row["id"]?>" class="btn btn-info m-0" title="<?=getTranslation('yeniyerler_kasa485')?>"><i class="fa fa-cogs"></i></a>&nbsp;
<a href="users.php?id=<?=$row["id"]?>" class="btn btn-info m-0" title="<?=getTranslation('yeniyerler_kasa486')?>"><i class="fa fa-user"></i></a>&nbsp;
</div>
</td>
<td><?=$row["username"]?> <br><? if($row['durum']==1){ ?><font style="color:#05af40;font-weight:500;"><?=getTranslation('yeniyerler_kasa129')?></font><? } else if($row['durum']==0){ ?><font style="color:#f00;font-weight:500;"><?=getTranslation('yeniyerler_kasa130')?></font><? } ?></td>
<td><?=getTranslation('yeniyerler_kasa483')?></td>
<td><?=$row["hatirlatmaad"]?></td>
<td><?=getTranslation('yeniyerler_kasa131')?>:<code><?=$bakiyesini_ver;?></code> <br><?=getTranslation('yeniyerler_kasa132')?>:<code><?=$bakiyesini_ver_casino;?></code></td>
<td><?=getTranslation('yeniyerler_kasa133')?>:<code><?=$row["username"]?></code><br><?=getTranslation('yeniyerler_kasa134')?>:<code><?=$row["password"]?></code></td>
<td><code><?=getTranslation('superadmin65')?>:<?=$row["alt_sinir"]?></code><br><code><?=getTranslation('superadmin66')?>:<?=$row["alt_sinir"]-$toplams_limit["toplam_limit"]-$toplams_kullanici["toplam_kullanici"];?></code></td>
</tr>

<? } ?>

</tbody>
<tr>
<td colspan="9">
<ul class="pagination"></ul>
</td>
</tr>

</table>
</div>
</div>
</div>
</div>
</div>
</main>

<? } else if($yetkisinibul['wkyetki']==1){ ?>

<main class="main">
<ol class="breadcrumb mb-0">
<li class="breadcrumb-item"><?=getTranslation('yeniyerler_kasa135')?></li>
</ol>

<div class="alert alert-danger mb-0" id="error"></div>
<div class="alert alert-info mb-0" id="info"></div>
<div class="alert alert-success mb-0" id="success"></div>

<div class="container-fluid mt-2">
<div class="row">
<div class="card">
<div class="card-header"> <?=getTranslation('yeniyerler_kasa136')?> <a href="javascript:;" onClick="window.location.reload();" class="tag tag-danger update-all-balancesnew"><?=getTranslation('yeniyerler_kasa122')?></a> </div>
<div class="card-block p-0">
<div class="table-responsive">
<table class="table table-striped mb-0">
<thead>
<tr>
<th style="width: 0%"><?=getTranslation('yeniyerler_kasa123')?></th>
<th style="width: 15%"><?=getTranslation('yeniyerler_kasa124')?></th>
<th style="width: 15%"><?=getTranslation('yeniyerler_kasa126')?></th>
<th style="width: 10%"><?=getTranslation('yeniyerler_kasa137')?></th>
<th style="width: 16%"><?=getTranslation('yeniyerler_kasa138')?></th>
<th style="width: 16%"><?=getTranslation('yeniyerler_kasa127')?></th>
<th style="width: 16%"><?=getTranslation('yeniyerler_kasa139')?></th>
</tr>
</thead>
<tbody>

<?
$sor = sed_sql_query("select * from kullanici where hesap_sahibi_id='".$id."' and root='0' order by id asc");
while($row=sed_sql_fetcharray($sor)) {
$sistemayarkontrol = bilgi("select * from sistemayar where ayar_id='$row[id]'");
$toplams_limit = bilgi("SELECT SUM(CASE WHEN id!='' THEN alt_sinir END) as toplam_limit FROM kullanici WHERE hesap_sahibi_id='$row[id]' and root='0'");
$toplams_kullanici = bilgi("SELECT COUNT(CASE WHEN id!='' THEN id END) as toplam_kullanici FROM kullanici WHERE hesap_sahibi_id='$row[id]' and root='0'");


## BAKİYESİ ##
$kullanici_bakiye_bol = explode(".",$row['bakiye']);
$kullanici_bakiye_kurus = substr($kullanici_bakiye_bol[1], 0, 2);
if($kullanici_bakiye_kurus>0){
$bakiyele = substr(nf($kullanici_bakiye_bol[0]), 0, -3);
$bakiyesini_ver = "".$bakiyele.".".$kullanici_bakiye_kurus."";
} else {
$bakiyele = substr(nf($kullanici_bakiye_bol[0]), 0, -3);
$bakiyesini_ver = "".$bakiyele.".00";
}
## CASİNO BAKİYESİ ##
$kullanici_bakiye_bol_casino = explode(".",$row['casinobakiye']);
$kullanici_bakiye_kurus_casino = substr($kullanici_bakiye_bol_casino[1], 0, 2);
if($kullanici_bakiye_kurus_casino>0){
$bakiyele_casino = substr(nf($kullanici_bakiye_bol_casino[0]), 0, -3);
$bakiyesini_ver_casino = "".$bakiyele_casino.".".$kullanici_bakiye_kurus_casino."";
} else {
$bakiyele_casino = substr(nf($kullanici_bakiye_bol_casino[0]), 0, -3);
$bakiyesini_ver_casino = "".$bakiyele_casino.".00";
}

?>

<tr>
<td>
<div style="min-width:200px;">
<a href="detailed.php?id=<?=$row["id"]?>" class="btn btn-info m-0" title="<?=getTranslation('yeniyerler_kasa484')?>"><i class="fa fa-eye"></i></a>&nbsp;
</div>
</td>
<td><?=$row["username"]?></td>
<td><?=$row["hatirlatmaad"]?></td>
<td><a href="kuponlar.php?userid=<?=$row["id"]?>" class="btn btn-primary btn-xs">BK<?=$row["id"]?></a></td>
<td><?=$row["hesap_sahibi_user"]?></td>
<td><?=getTranslation('yeniyerler_kasa131')?>:<code><?=$bakiyesini_ver;?></code> <br><?=getTranslation('yeniyerler_kasa132')?>:<code><?=$bakiyesini_ver_casino;?></code></td>
<td><? if($row['durum']==1){ ?><font style="color:#05af40;font-weight:500;"><?=getTranslation('yeniyerler_kasa140')?></font><? } else if($row['durum']==0){ ?><font style="color:#f00;font-weight:500;"><?=getTranslation('yeniyerler_kasa141')?></font><? } ?></td>
</tr>

<? } ?>

</tbody>
<tr>
<td colspan="9">
<ul class="pagination"></ul>
</td>
</tr>

</table>
</div>
</div>
</div>
</div>
</div>
</main>

<? } ?>

<script>
function musteri_arama_ekrani() {
var karakter = $("#searchField").val().length;
if(karakter>1) { listelesene(0); } else { listelesene(1); }
}

function sistemayaryetki(id,yetki) {
$.get('../ajax_superadmin.php?a=sistemayaryetkidegis&id='+id+'&yetki='+yetki+'',function(data) {
alert('<?=getTranslation('yeniyerler_kasa142')?>');
window.location.reload();
});
}

function listelesene(val) {
if(val==1){
	$("#search_ver").css('display','none');
	$("#search_ver").html('');
	$("#searchdeleteicon").hide();
} else {
	var arananmusteri = $("#searchField").val();
	$.get('index.php?s=search_musteri&musteriadi='+arananmusteri+'',function(data) {
	$("#search_ver").html(data);
	$("#search_ver").css('display','block');
	$("#searchdeleteicon").show();
	});
}

}
</script>

<?php include 'footer.php'; ?>

</body>
</html>