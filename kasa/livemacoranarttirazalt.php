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
$orderle = "FIELD(varoname, '1X2', 'Handikap 1:0', 'Handikap 2:0', 'Handikap 0:1', 'Handikap 0:2', 'Çifte Şans', '1.Yarı Çifte Şans', '1.Yarı Sonucu', '1.Yarı 0.5 Gol Alt Üst', '1.Yarı 1.5 Gol Alt Üst', '1.Yarı 2.5 Gol Alt Üst', 'Toplam 0.5 Gol Alt Üst', 'Toplam 1.5 Gol Alt Üst', 'Toplam 2.5 Gol Alt Üst', 'Toplam 3.5 Gol Alt Üst', 'Toplam 4.5 Gol Alt Üst', 'Toplam 5.5 Gol Alt Üst', '2.Yarı 0.5 Gol Alt Üst', '2.Yarı 1.5 Gol Alt Üst', '2.Yarı 2.5 Gol Alt Üst', '2.Yarı 3.5 Gol Alt Üst', '1.Yarı Karşılıklı Gol', 'Karşılıklı Gol Olurmu ?', 'Ev Sahibi Müsabakada Gol Atarmı ?', 'Deplasman Müsabakada Gol Atarmı ?', 'Toplam Gol Tek / Çift', '1.Yarı Tek / Çift', 'Ev Sahibi 0.5 Gol Alt Üst', 'Ev Sahibi 1.5 Gol Alt Üst', 'Ev Sahibi 2.5 Gol Alt Üst', 'Deplasman 0.5 Gol Alt Üst', 'Deplasman 1.5 Gol Alt Üst', 'Deplasman 2.5 Gol Alt Üst', 'İlk yarıda 1.golü hangi takım atar?', '1. yarıda 1.golü hangi takım atar?', 'İlk yarıda 2.golü hangi takım atar?', '1. yarıda 2.golü hangi takım atar?', '1.golü hangi takım atar?', '2.golü hangi takım atar?', '3.golü hangi takım atar?', '4.golü hangi takım atar?', '5.golü hangi takım atar?', '6.golü hangi takım atar?', 'Toplam Kaç Gol Atılır ?', 'Ev Sahibi Toplam Kaç Gol Atar ?', 'Deplasman Toplam Kaç Gol Atar ?', 'Ev Sahibi 1.Yarı 0.5 Gol Alt Üst', 'Ev Sahibi 1.Yarı 1.5 Gol Alt Üst', 'Ev Sahibi 1.Yarı 2.5 Gol Alt Üst', 'Deplasman 1.Yarı 0.5 Gol Alt Üst', 'Deplasman 1.Yarı 1.5 Gol Alt Üst', 'Deplasman 1.Yarı 2.5 Gol Alt Üst', 'Maç Sonucu ve Karşılıklı Gol', 'İlk Yarıda Kaç Gol Olur ?', 'Ev Sahibi İlk Yarı Tam Gol Sayısı', 'Ev sahibi İkinci Yarı Tam Gol Sayısı', 'Deplasman İlk Yarı Tam Gol Sayısı', 'Deplasman İkinci Yarı Tam Gol Sayısı', '2.Yarıda Toplam Kaç Gol Olur ?', 'Herhangi Bir Takım 1 Gol Farkla Kazanirmi ?', 'Herhangi Bir Takım 2 Gol Farkla Kazanirmi ?', 'Herhangi Bir Takım 3 Gol Farkla Kazanirmi ?', '2.Yarı Sonucu', 'Müsabakada kaç gol atılır? (0-4+)', 'Müsabakada kaç gol atılır? (0-5+)', 'Müsabakada kaç gol atılır? (0-6+)', '1.Yarı Skoru', 'Maç Skoru','Kalan Süre Tahmini - skor:0-0','Kalan Süre Tahmini - skor:1-0','Kalan Süre Tahmini - skor:0-1','Kalan Süre Tahmini - skor:1-1','Kalan Süre Tahmini - skor:2-0','Kalan Süre Tahmini - skor:0-2','Kalan Süre Tahmini - skor:2-1','Kalan Süre Tahmini - skor:1-2','Kalan Süre Tahmini - skor:3-0','Kalan Süre Tahmini - skor:0-3','Kalan Süre Tahmini - skor:2-2','Kalan Süre Tahmini - skor:1-3','Kalan Süre Tahmini - skor:4-0','Kalan Süre Tahmini - skor:5-0','Kalan Süre Tahmini - skor:4-1','Kalan Süre Tahmini - skor:3-2','Kalan Süre Tahmini - skor:3-3', 'Toplam Sarı Kart 1.5 Alt/Üst', 'Toplam Sarı Kart 2.5 Alt/Üst', 'Toplam Sarı Kart 3.5 Alt/Üst', 'Toplam Sarı Kart 4.5 Alt/Üst', 'Kirmizi kart cikar mi?', 'Kaç Penaltı Olur ?', '1.Takım Toplam Sarı Kart 1.5 Alt/Üst', '1.Takım Toplam Sarı Kart 2.5 Alt/Üst', '1.Takım Toplam Sarı Kart 3.5 Alt/Üst', '2.Takım Toplam Sarı Kart 1.5 Alt/Üst', '2.Takım Toplam Sarı Kart 2.5 Alt/Üst', '2.Takım Toplam Sarı Kart 3.5 Alt/Üst', 'Sarı Kart Tek/Çift', 'Hangi Takım Çok Sarı Kart Yer ?', 'Toplam Korner 5.5 Alt/Üst', 'Toplam Korner 6.5 Alt/Üst', 'Toplam Korner 7.5 Alt/Üst', 'Toplam Korner 8.5 Alt/Üst', 'Toplam Korner 9.5 Alt/Üst', 'Toplam Korner 10.5 Alt/Üst', 'Toplam Korner 11.5 Alt/Üst', 'Toplam Korner 12.5 Alt/Üst', 'Toplam Korner 13.5 Alt/Üst', 'Toplam Korner 14.5 Alt/Üst', 'Toplam Korner 15.5 Alt/Üst', '1.Takım Toplam Korner 2.5 Alt/Üst', '1.Takım Toplam Korner 3.5 Alt/Üst', '1.Takım Toplam Korner 4.5 Alt/Üst', '1.Takım Toplam Korner 5.5 Alt/Üst', '1.Takım Toplam Korner 6.5 Alt/Üst', '1.Takım Toplam Korner 7.5 Alt/Üst', '1.Takım Toplam Korner 8.5 Alt/Üst', '1.Takım Toplam Korner 9.5 Alt/Üst', '1.Takım Toplam Korner 10.5 Alt/Üst', '2.Takım Toplam Korner 2.5 Alt/Üst', '2.Takım Toplam Korner 3.5 Alt/Üst', '2.Takım Toplam Korner 4.5 Alt/Üst', '2.Takım Toplam Korner 5.5 Alt/Üst', '2.Takım Toplam Korner 6.5 Alt/Üst', '2.Takım Toplam Korner 7.5 Alt/Üst', '2.Takım Toplam Korner 8.5 Alt/Üst', '2.Takım Toplam Korner 9.5 Alt/Üst', '2.Takım Toplam Korner 10.5 Alt/Üst', 'Korner Tek/Çift', 'Hangi Takım Daha Çok Korner Kullanır ?', 'Kırmızı Kart Çıkarmı ?') ASC";

$sor2 = sed_sql_query("select * from canli_tip where id!='' group by varoname ORDER BY {$orderle}");
$spor_tip_ver = 'futbol';
} else if($spor_tip==2){
$orderle = "FIELD(varoname, '1X2','1X2(1.YARI)','1X2(2.YARI)','1X2(1.Çeyrek)','1X2(2.Çeyrek)','1X2(3.Çeyrek)','1X2(4.Çeyrek)','Kim Kazanır','1.Yarı Kim Kazanır','2.Yarı Kim Kazanır','1.Çeyrek Kim Kazanır','2.Çeyrek Kim Kazanır','3.Çeyrek Kim Kazanır','4.Çeyrek Kim Kazanır','Toplam Skor Alt/Üst','1.Takım Toplam Alt/Üst','2.Takım Toplam Alt/Üst','1.Takım 1.Yarı Toplam Alt/Üst','2.Takım 1.Yarı Toplam Alt/Üst','1.Çeyrek Toplam Alt/Üst','2.Çeyrek Toplam Alt/Üst','3.Çeyrek Toplam Alt/Üst','4.Çeyrek Toplam Alt/Üst','Handikap','1.Yarı Handikap','2.Yarı Handikap','1.Çeyrek Handikap','2.Çeyrek Handikap','3.Çeyrek Handikap','4.Çeyrek Handikap','Toplam Tek/Çift','1.Yarı Toplam Tek/Çift','2.Yarı Toplam Tek/Çift','1.Çeyrek Toplam Tek/Çift','2.Çeyrek Toplam Tek/Çift','3.Çeyrek Toplam Tek/Çift','4.Çeyrek Toplam Tek/Çift') ASC";

$sor2 = sed_sql_query("select * from basketbol_canli_tip where id!='' group by varoname ORDER BY {$orderle}");
$spor_tip_ver = 'basketbol';
} else if($spor_tip==3){
$orderle = "FIELD(varoname, 'Kim Kazanır', 'Set Bahisi') ASC";

$sor2 = sed_sql_query("select * from canli_tip_tenis where id!='' group by varoname ORDER BY {$orderle}");
$spor_tip_ver = 'tenis';
} else if($spor_tip==4){
$orderle = "FIELD(varoname, 'Kim Kazanır', '1.Seti Kim Kazanır ?', '2.Seti Kim Kazanır ?', '3.Seti Kim Kazanır ?', '4.Seti Kim Kazanır ?', 'Toplam Kaç Set Oynanır ?', 'Müsabaka 5.Set Sürermi', 'Set bahisi (5 maç üzerinden)', 'Toplam Sayı Tek/Çift', '1.Set Toplam Sayı Tek/Çift', '2.Set Toplam Sayı Tek/Çift', '3.Set Toplam Sayı Tek/Çift', '4.Set Toplam Sayı Tek/Çift', 'Toplam Sayı Alt/Üst', '1.Takım Toplam Sayı Alt/Üst', '2.Takım Toplam Sayı Alt/Üst', '1.Takım 1.Set Toplam Sayı Alt/Üst', '2.Takım 1.Set Toplam Sayı Alt/Üst', '1.Takım 2.Set Toplam Sayı Alt/Üst', '2.Takım 2.Set Toplam Sayı Alt/Üst', '1.Takım 3.Set Toplam Sayı Alt/Üst', '2.Takım 3.Set Toplam Sayı Alt/Üst', '1.Takım 4.Set Toplam Sayı Alt/Üst', '2.Takım 4.Set Toplam Sayı Alt/Üst') ASC";

$sor2 = sed_sql_query("select * from canli_tip_voleybol where id!='' group by varoname ORDER BY {$orderle}");
$spor_tip_ver = 'voleybol';
} else if($spor_tip==5){
$orderle = "FIELD(varoname, '1X2', 'Cifte Sans', 'Hangi periyod daha cok gol olur?') ASC";
$sor2 = sed_sql_query("select * from canli_tip_buzhokeyi where id!='' group by varoname ORDER BY {$orderle}");
$spor_tip_ver = 'buzhokeyi';
} else if($spor_tip==6){
$sor2 = sed_sql_query("select * from canli_tip_masatenis where id!='' group by varoname");
$spor_tip_ver = 'masatenis';
} else {
$orderle = "FIELD(varoname, '1X2', 'Handikap 1:0', 'Handikap 2:0', 'Handikap 0:1', 'Handikap 0:2', 'Çifte Şans', '1.Yarı Çifte Şans', '1.Yarı Sonucu', '1.Yarı 0.5 Gol Alt Üst', '1.Yarı 1.5 Gol Alt Üst', '1.Yarı 2.5 Gol Alt Üst', 'Toplam 0.5 Gol Alt Üst', 'Toplam 1.5 Gol Alt Üst', 'Toplam 2.5 Gol Alt Üst', 'Toplam 3.5 Gol Alt Üst', 'Toplam 4.5 Gol Alt Üst', 'Toplam 5.5 Gol Alt Üst', '2.Yarı 0.5 Gol Alt Üst', '2.Yarı 1.5 Gol Alt Üst', '2.Yarı 2.5 Gol Alt Üst', '2.Yarı 3.5 Gol Alt Üst', '1.Yarı Karşılıklı Gol', 'Karşılıklı Gol Olurmu ?', 'Ev Sahibi Müsabakada Gol Atarmı ?', 'Deplasman Müsabakada Gol Atarmı ?', 'Toplam Gol Tek / Çift', '1.Yarı Tek / Çift', 'Ev Sahibi 0.5 Gol Alt Üst', 'Ev Sahibi 1.5 Gol Alt Üst', 'Ev Sahibi 2.5 Gol Alt Üst', 'Deplasman 0.5 Gol Alt Üst', 'Deplasman 1.5 Gol Alt Üst', 'Deplasman 2.5 Gol Alt Üst', 'İlk yarıda 1.golü hangi takım atar?', '1. yarıda 1.golü hangi takım atar?', 'İlk yarıda 2.golü hangi takım atar?', '1. yarıda 2.golü hangi takım atar?', '1.golü hangi takım atar?', '2.golü hangi takım atar?', '3.golü hangi takım atar?', '4.golü hangi takım atar?', '5.golü hangi takım atar?', '6.golü hangi takım atar?', 'Toplam Kaç Gol Atılır ?', 'Ev Sahibi Toplam Kaç Gol Atar ?', 'Deplasman Toplam Kaç Gol Atar ?', 'Ev Sahibi 1.Yarı 0.5 Gol Alt Üst', 'Ev Sahibi 1.Yarı 1.5 Gol Alt Üst', 'Ev Sahibi 1.Yarı 2.5 Gol Alt Üst', 'Deplasman 1.Yarı 0.5 Gol Alt Üst', 'Deplasman 1.Yarı 1.5 Gol Alt Üst', 'Deplasman 1.Yarı 2.5 Gol Alt Üst', 'Maç Sonucu ve Karşılıklı Gol', 'İlk Yarıda Kaç Gol Olur ?', 'Ev Sahibi İlk Yarı Tam Gol Sayısı', 'Ev sahibi İkinci Yarı Tam Gol Sayısı', 'Deplasman İlk Yarı Tam Gol Sayısı', 'Deplasman İkinci Yarı Tam Gol Sayısı', '2.Yarıda Toplam Kaç Gol Olur ?', 'Herhangi Bir Takım 1 Gol Farkla Kazanirmi ?', 'Herhangi Bir Takım 2 Gol Farkla Kazanirmi ?', 'Herhangi Bir Takım 3 Gol Farkla Kazanirmi ?', '2.Yarı Sonucu', 'Müsabakada kaç gol atılır? (0-4+)', 'Müsabakada kaç gol atılır? (0-5+)', 'Müsabakada kaç gol atılır? (0-6+)', '1.Yarı Skoru', 'Maç Skoru','Kalan Süre Tahmini - skor:0-0','Kalan Süre Tahmini - skor:1-0','Kalan Süre Tahmini - skor:0-1','Kalan Süre Tahmini - skor:1-1','Kalan Süre Tahmini - skor:2-0','Kalan Süre Tahmini - skor:0-2','Kalan Süre Tahmini - skor:2-1','Kalan Süre Tahmini - skor:1-2','Kalan Süre Tahmini - skor:3-0','Kalan Süre Tahmini - skor:0-3','Kalan Süre Tahmini - skor:2-2','Kalan Süre Tahmini - skor:1-3','Kalan Süre Tahmini - skor:4-0','Kalan Süre Tahmini - skor:5-0','Kalan Süre Tahmini - skor:4-1','Kalan Süre Tahmini - skor:3-2','Kalan Süre Tahmini - skor:3-3', 'Toplam Sarı Kart 1.5 Alt/Üst', 'Toplam Sarı Kart 2.5 Alt/Üst', 'Toplam Sarı Kart 3.5 Alt/Üst', 'Toplam Sarı Kart 4.5 Alt/Üst', 'Kirmizi kart cikar mi?', 'Kaç Penaltı Olur ?', '1.Takım Toplam Sarı Kart 1.5 Alt/Üst', '1.Takım Toplam Sarı Kart 2.5 Alt/Üst', '1.Takım Toplam Sarı Kart 3.5 Alt/Üst', '2.Takım Toplam Sarı Kart 1.5 Alt/Üst', '2.Takım Toplam Sarı Kart 2.5 Alt/Üst', '2.Takım Toplam Sarı Kart 3.5 Alt/Üst', 'Sarı Kart Tek/Çift', 'Hangi Takım Çok Sarı Kart Yer ?', 'Toplam Korner 5.5 Alt/Üst', 'Toplam Korner 6.5 Alt/Üst', 'Toplam Korner 7.5 Alt/Üst', 'Toplam Korner 8.5 Alt/Üst', 'Toplam Korner 9.5 Alt/Üst', 'Toplam Korner 10.5 Alt/Üst', 'Toplam Korner 11.5 Alt/Üst', 'Toplam Korner 12.5 Alt/Üst', 'Toplam Korner 13.5 Alt/Üst', 'Toplam Korner 14.5 Alt/Üst', 'Toplam Korner 15.5 Alt/Üst', '1.Takım Toplam Korner 2.5 Alt/Üst', '1.Takım Toplam Korner 3.5 Alt/Üst', '1.Takım Toplam Korner 4.5 Alt/Üst', '1.Takım Toplam Korner 5.5 Alt/Üst', '1.Takım Toplam Korner 6.5 Alt/Üst', '1.Takım Toplam Korner 7.5 Alt/Üst', '1.Takım Toplam Korner 8.5 Alt/Üst', '1.Takım Toplam Korner 9.5 Alt/Üst', '1.Takım Toplam Korner 10.5 Alt/Üst', '2.Takım Toplam Korner 2.5 Alt/Üst', '2.Takım Toplam Korner 3.5 Alt/Üst', '2.Takım Toplam Korner 4.5 Alt/Üst', '2.Takım Toplam Korner 5.5 Alt/Üst', '2.Takım Toplam Korner 6.5 Alt/Üst', '2.Takım Toplam Korner 7.5 Alt/Üst', '2.Takım Toplam Korner 8.5 Alt/Üst', '2.Takım Toplam Korner 9.5 Alt/Üst', '2.Takım Toplam Korner 10.5 Alt/Üst', 'Korner Tek/Çift', 'Hangi Takım Daha Çok Korner Kullanır ?', 'Kırmızı Kart Çıkarmı ?') ASC";

$sor2 = sed_sql_query("select * from canli_tip where id!='' group by varoname ORDER BY {$orderle}");
$spor_tip_ver = 'futbol';
}

if($_GET['sifirla'] == 1){
if($onaylandi != "yetkilidegilsiniz"){ sed_sql_query("delete from maclar_topluoranlar_canli where spor_tipi='".$spor_tip_ver."' and bayi_id='".$bayi_id_ver."'"); $onaylandi = 3; }
}

// POST BAŞLANGIÇ //
if(isset($_POST['submit'])){

if($onaylandi != "yetkilidegilsiniz"){

if($_POST['spor_tip']==1){
$spor_tip_ver2 = 'futbol';
} else if($_POST['spor_tip']==2){
$spor_tip_ver2 = 'basketbol';
} else if($_POST['spor_tip']==3){
$spor_tip_ver2 = 'tenis';
} else if($_POST['spor_tip']==4){
$spor_tip_ver2 = 'voleybol';
} else if($_POST['spor_tip']==5){
$spor_tip_ver2 = 'buzhokeyi';
} else if($_POST['spor_tip']==6){
$spor_tip_ver2 = 'masatenis';
} else {
$spor_tip_ver2 = 'futbol';
}

// FOREACH BAŞLANGIÇ //
foreach ($_POST['rid'] as $key => $value) {

$sor = sed_sql_query("select * from maclar_topluoranlar_canli where spor_tipi='".$spor_tip_ver2."' and tipismi='".$key."' and bayi_id='".$bayi_id_ver."'");

if(sed_sql_numrows($sor)<1) {

sed_sql_query("INSERT INTO maclar_topluoranlar_canli SET spor_tipi='".$spor_tip_ver2."', tipismi='".$key."', bayi_id = '".$bayi_id_ver."', oran = '".$value."'");
$onaylandi = 1;
} else {

sed_sql_query("update maclar_topluoranlar_canli set oran = '".$value."' where spor_tipi='".$spor_tip_ver2."' and tipismi='".$key."' and bayi_id='".$bayi_id_ver."'");
$onaylandi = 2;
}

// FOREACH BİTİŞ //
}

}

// POST BİTİŞ //
}

?>
<? include 'header.php'; ?>
<script>
$("#livemacoranarttirazalt").addClass("active");
function tumunuesle(value){ $('.tumunueslesene').val(value); }
</script>

<main class="main">
<ol class="breadcrumb mb-0">
<li class="breadcrumb-item"><?=getTranslation('playersmacoranarttirazalt3')?></li>
</ol>

<? if($onaylandi==1) { ?>
<div class="alert alert-success mb-0" id="success" style="display:block;"><?=getTranslation('playersmacoranarttirazalt1')?></div>
<? } else if($onaylandi==2) { ?>
<div class="alert alert-success mb-0" id="success" style="display:block;"><?=getTranslation('playersmacoranarttirazalt2')?></div>
<? } else if($onaylandi==3) { ?>
<div class="alert alert-success mb-0" id="success" style="display:block;"><?=getTranslation('yeniyerler_kasa353')?></div>
<? } else if($onaylandi==4) { ?>
<div class="alert alert-success mb-0" id="danger" style="display:block;"><?=getTranslation('yeniyerler_kasa354')?></div>
<? } ?>

<div class="container-fluid mt-2">
<div class="row">
<div class="row">
<div class="col-sm-12">
<div class="card">

<form action="livemacoranarttirazalt.php?spor_tip=<?=$spor_tip;?>&bayisec=<?=$_GET['bayisec'];?>" method="post">

<div class="card-header">

<select class="inputCombo" style="width: 15%;float: left;" id="bayisec" onchange="window.location.href='livemacoranarttirazalt.php?spor_tip=<?=$spor_tip;?>&bayisec='+this.value+'';">
<option value="0">-- <?=getTranslation('tumhesaplar')?> --</option>
<?
$sor_kullanici = sed_sql_query("select * from kullanici where hesap_sahibi_id='".$ub['id']."' and root='0' order by id asc");
while($row_kullanici=sed_sql_fetcharray($sor_kullanici)) {
$bilgisi_getir_bayi = bilgi("select id from oyunlar_canli where spor_tipi='".$spor_tip_ver."' and bayi_id='".$row_kullanici['id']."'");
$bilgisi_getir2_bayi = bilgi("select id from maclar_topluoranlar_canli where spor_tipi = '".$spor_tip_ver."' and bayi_id='".$row_kullanici['id']."'");
?>
<option value="<?=$row_kullanici['id'];?>" <? if($bayi_id==$row_kullanici['id']){ ?>selected<? } ?>><?=$row_kullanici['username']; ?><? if($bilgisi_getir_bayi['id']>0 || $bilgisi_getir2_bayi['id']>0){ ?> (özelleştirildi)<? } ?></option>
<? } ?>
</select>

<font style="float: left;margin-right: 10px;margin-left: 10px;"><a href="javascript:;" onclick="window.location.href='livemacoranarttirazalt.php?spor_tip=<?=$spor_tip;?>&bayisec=<?=$_GET['bayisec'];?>&sifirla=1';" class="btn btn-success"><?=getTranslation('yeniyerler_kasa194')?></a></font>

<font style="float: left;margin-right: 7px;"><?=getTranslation('playersmacoranarttirazalt4')?></font>

<select class="inputCombo" style="width:25%;float: left;" name="spor_tip" id="spor_tip" onchange="window.location.href='livemacoranarttirazalt.php?spor_tip='+this.value+'&bayisec=<?=$_GET['bayisec'];?>';">
<option <? if($spor_tip==1){ ?>selected<? } ?> value="1"><?=getTranslation('playersmacoranarttirazalt5')?></option>
<option <? if($spor_tip==2){ ?>selected<? } ?> value="2"><?=getTranslation('playersmacoranarttirazalt6')?></option>
<option <? if($spor_tip==3){ ?>selected<? } ?> value="3"><?=getTranslation('playersmacoranarttirazalt7')?></option>
<option <? if($spor_tip==4){ ?>selected<? } ?> value="4"><?=getTranslation('playersmacoranarttirazalt8')?></option>
<option <? if($spor_tip==5){ ?>selected<? } ?> value="5"><?=getTranslation('playersmacoranarttirazalt9')?></option>
<option <? if($spor_tip==6){ ?>selected<? } ?> value="6"><?=getTranslation('yeniyerler_kasa179')?></option>
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
$bilgi_bul = bilgi("select id,oran from maclar_topluoranlar_canli where tipismi='".$row['varoname']."' and spor_tipi = '".$spor_tip_ver."' and bayi_id='".$bayi_id_ver."'");
if($bilgi_bul['id']<1){ $daha_yok = 1; }
?>

<tr class="c">
<td style="text-align:left;" colspan="3"><?=$row['varoname'];?></td>
<td>
<select class="inputCombo chosen tumunueslesene" style="width: 100%;" id="<?=$row['varoname'];?>" name="rid[<?=$row['varoname']; ?>]">
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