<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); exit(); }
?>
<?php include 'header.php'; ?>

<main class="main">
<ol class="breadcrumb mb-0">
<li class="breadcrumb-item">Canlı Basketbol Sonuç Giriş</li>
</ol>

<div class="container-fluid mt-2">
<div class="row">
<div class="card">
<div class="card-block p-0">

<div class="table-responsive">
<table id="table" class="table mb-0">

<?
$gecenler = time()-6000;
$sor = sed_sql_query("select * from kupon_ic where kazanma='1' and spor_tip='canlib' and mac_time<$gecenler group by mac_db_id order by mac_time asc");
if(sed_sql_numrows($sor)<1) { ?>

<table class="table table-striped mb-0">
<thead>
<tr>
<th style="width: 20%">Basket * Bahis</th>
<th style="width: 10%">Tarih</th>
<th style="width: 15%">1.Ç</th>
<th style="width: 15%">2.Ç</th>
<th style="width: 15%">3.Ç</th>
<th style="width: 15%">4.Ç</th>
<th style="width: 15%">UZT</th>
<th style="width: 5%">Kaydet</th>
</tr>
</thead>

<? } else { ?>

<table class="table table-striped mb-0">
<thead>
<tr>
<th style="width: 20%">Basket * Bahis</th>
<th style="width: 10%">Tarih</th>
<th style="width: 15%">1.Ç</th>
<th style="width: 15%">2.Ç</th>
<th style="width: 15%">3.Ç</th>
<th style="width: 15%">4.Ç</th>
<th style="width: 15%">UZT</th>
<th style="width: 5%">Kaydet</th>
</tr>
</thead>
<tbody>

<? while($row=sed_sql_fetcharray($sor)) { ?>

<tr id="sonucgiris_<?=$row['mac_db_id']; ?>">
<td><div style="min-width:190px"><?=$row['ev_takim']; ?> - <?=$row['konuk_takim']; ?></div></td>
<td><?=date("d-m-Y H:i",$row['mac_time']); ?></td>

<td class="tg-0ord">E:<input value="" style="width: 26px;" id="p1_home_<?=$row['mac_db_id']; ?>"> D:<input value="" id="p1_away_<?=$row['mac_db_id']; ?>" style="width: 26px;"></td>

<td class="tg-0ord">E:<input value="" style="width: 26px;" id="p2_home_<?=$row['mac_db_id']; ?>"> D:<input value="" id="p2_away_<?=$row['mac_db_id']; ?>" style="width: 26px;"></td>

<td class="tg-0ord">E:<input value="" style="width: 26px;" id="p3_home_<?=$row['mac_db_id']; ?>"> D:<input value="" id="p3_away_<?=$row['mac_db_id']; ?>" style="width: 26px;"></td>

<td class="tg-0ord">E:<input value="" style="width: 26px;" id="p4_home_<?=$row['mac_db_id']; ?>"> D:<input value="" id="p4_away_<?=$row['mac_db_id']; ?>" style="width: 26px;"></td>

<td class="tg-0ord">E:<input value="" style="width: 26px;" id="p5_home_<?=$row['mac_db_id']; ?>"> D:<input value="" id="p5_away_<?=$row['mac_db_id']; ?>" style="width: 26px;"></td>

<td style="text-align:center;">
<input type="button" class="btn btn-success m-0 customer-payin" value="Uygula" onClick="skorgir('<?=$row['mac_db_id']; ?>');">
<input type="button" class="btn btn-danger m-0 customer-payin" value="Ertele" onClick="ertele('<?=$row['mac_db_id']; ?>');">
</td>
</tr>

<? } ?>

</tbody>

<script>
function ertele(id) {
var rand = Math.random();
if(confirm('Bu maç ertelenecek. Onaylıyor musunuz?')) {
$.get('index.php?s=ertelecanlibasketbol&rand='+rand+'&macid='+id+'',function(data) {
alert('Maç Ertelendi');
$("#sonucgiris_"+id+"").remove();
});	
}
}

function skorgir(id) {
var p1_ev = $("#p1_home_"+id+"").val();
var p2_ev = $("#p2_home_"+id+"").val();
var p3_ev = $("#p3_home_"+id+"").val();
var p4_ev = $("#p4_home_"+id+"").val();
var p5_ev = $("#p5_home_"+id+"").val();
var p1_dep = $("#p1_away_"+id+"").val();
var p2_dep = $("#p2_away_"+id+"").val();
var p3_dep = $("#p3_away_"+id+"").val();
var p4_dep = $("#p4_away_"+id+"").val();
var p5_dep = $("#p5_away_"+id+"").val();
var rand = Math.random();

if(p1_ev=="" || p2_ev=="" || p3_ev=="" || p4_ev=="" || p1_dep=="" || p2_dep=="" || p3_dep=="" || p4_dep==""){
alert('Lütfen Boş Alan Bırakmayınız');
} else {

$.get('index.php?s=skorgircanlibasketbol&rand='+rand+'&macid='+id+'&p1_ev='+p1_ev+'&p2_ev='+p2_ev+'&p3_ev='+p3_ev+'&p4_ev='+p4_ev+'&p5_ev='+p5_ev+'&p1_dep='+p1_dep+'&p2_dep='+p2_dep+'&p3_dep='+p3_dep+'&p4_dep='+p4_dep+'&p5_dep='+p5_dep+'',function(data) {
alert('Sonuç Giriş Onaylandı');
$("#sonucgiris_"+id+"").remove();
});
}

}
</script>

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