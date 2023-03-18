<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); exit(); }
?>
<?php include 'header.php'; ?>

<main class="main">
<ol class="breadcrumb mb-0">
<li class="breadcrumb-item">Canlı Futbol Sonuç Giriş</li>
</ol>

<div class="container-fluid mt-2">
<div class="row">
<div class="card">
<div class="card-block p-0">

<div class="table-responsive">
<table id="table" class="table mb-0">

<?
$gecenler = time()-6000;
$sor = sed_sql_query("select * from kupon_ic where kazanma='1' and spor_tip='canli' and mac_time<$gecenler group by mac_db_id order by mac_time asc");
if(sed_sql_numrows($sor)<1) { ?>

<thead>
<tr>
<th style="width: 20%">Futbol * Bahis</th>
<th style="width: 13%">Tarih</th>
<th style="width: 15%">İY</th>
<th style="width: 15%">MS</th>
<th style="width: 12%">Kaydet</th>
</tr>
</thead>

<? } else { ?>

<thead>
<tr>
<th style="width: 20%">Futbol * Bahis</th>
<th style="width: 10%;text-align: center;">Tarih</th>
<th style="width: 10%;text-align: center;">İY</th>
<th style="width: 10%;text-align: center;">MS</th>
<th style="text-align: center;">1</th>
<th style="text-align: center;">2</th>
<th style="text-align: center;">3</th>
<th style="text-align: center;">4</th>
<th style="text-align: center;">5</th>
<th style="text-align: center;">6</th>
<th style="width: 16%;text-align: center;">Kaydet</th>
</tr>
</thead>

<? while($row=sed_sql_fetcharray($sor)) { ?>

<tr id="sonucgiris_<?=$row['mac_db_id']; ?>">

<td><div style="min-width:190px"><?=$row['ev_takim']; ?> - <?=$row['konuk_takim']; ?></div></td>

<td style="text-align: center;"><?=date("d-m-Y",$row['mac_time']); ?><br><?=date("H:i",$row['mac_time']); ?></td>

<td class="tg-0ord">E:<input value="" style="width: 26px;text-align:center;" id="iy_skor_ev_<?=$row['mac_db_id']; ?>"> D:<input value="" id="iy_skor_dep_<?=$row['mac_db_id']; ?>" style="width: 26px;"></td>

<td class="tg-0ord">E:<input value="" style="width: 26px;text-align:center;" id="ms_skor_ev_<?=$row['mac_db_id']; ?>"> D:<input value="" id="ms_skor_dep_<?=$row['mac_db_id']; ?>" style="width: 26px;"></td>

<td style="text-align:center;" class="tg-0ord"><input value="" style="width: 26px;text-align:center;" id="1gol_<?=$row['mac_db_id']; ?>"></td>
<td style="text-align:center;" class="tg-0ord"><input value="" style="width: 26px;text-align:center;" id="2gol_<?=$row['mac_db_id']; ?>"></td>
<td style="text-align:center;" class="tg-0ord"><input value="" style="width: 26px;text-align:center;" id="3gol_<?=$row['mac_db_id']; ?>"></td>
<td style="text-align:center;" class="tg-0ord"><input value="" style="width: 26px;text-align:center;" id="4gol_<?=$row['mac_db_id']; ?>"></td>
<td style="text-align:center;" class="tg-0ord"><input value="" style="width: 26px;text-align:center;" id="5gol_<?=$row['mac_db_id']; ?>"></td>
<td style="text-align:center;" class="tg-0ord"><input value="" style="width: 26px;text-align:center;" id="6gol_<?=$row['mac_db_id']; ?>"></td>

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
$.get('index.php?s=ertelecanlifutbol&rand='+rand+'&macid='+id+'',function(data) {
alert('Maç Ertelendi');
$("#sonucgiris_"+id+"").remove();
});	
}
}

function skorgir(id) {
var iy_ev = $("#iy_skor_ev_"+id+"").val();
var iy_dep = $("#iy_skor_dep_"+id+"").val();
var ms_ev = $("#ms_skor_ev_"+id+"").val();
var ms_dep = $("#ms_skor_dep_"+id+"").val();

var gol_1 = $("#1gol_"+id+"").val();
var gol_2 = $("#2gol_"+id+"").val();
var gol_3 = $("#3gol_"+id+"").val();
var gol_4 = $("#4gol_"+id+"").val();
var gol_5 = $("#5gol_"+id+"").val();
var gol_6 = $("#6gol_"+id+"").val();

var rand = Math.random();

if(iy_ev=="" || iy_dep=="" || ms_ev=="" || ms_dep==""){
alert('Lütfen Boş Alan Bırakmayınız');
} else {

$.get('index.php?s=skorgircanlifutbol&rand='+rand+'&macid='+id+'&iy_ev='+iy_ev+'&iy_dep='+iy_dep+'&ms_ev='+ms_ev+'&ms_dep='+ms_dep+'&gol_1='+gol_1+'&gol_2='+gol_2+'&gol_3='+gol_3+'&gol_4='+gol_4+'&gol_5='+gol_5+'&gol_6='+gol_6+'',function(data) {
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