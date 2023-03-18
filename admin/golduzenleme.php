<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:../login.php"); die(); exit(); }
?>
<?php include 'header.php'; ?>

<main class="main">
<ol class="breadcrumb mb-0">
<li class="breadcrumb-item">Yanlış Sonuçlu Maç Düzenleme</li>
</ol>

<div class="container-fluid mt-2">
<div class="row">

<div class="card">
<div class="card-block">
<div class="row">
<div class="form-group col-sm-2">
<label for="">Tarih (Maç Tarihi)</label>
<select class="form-control" id="tarih" onChange="temizlef();">
<? for($i=3; $i>0; $i--) { 
$pul = strtotime("+".$i." days");
?>
<option value="<?=date("d.m.Y",$pul); ?>"><?=turkce_tarih($pul); ?> <?=date("Y",$pul);?></option>
<? } ?>

<? for($i=0; $i<32; $i++) { 
$pul = strtotime("-".$i." days");
?>
<option value="<?=date("d.m.Y",$pul); ?>" <? if(date("d.m.Y",$pul)==date("d.m.Y")) { echo "selected"; } ?>><?=turkce_tarih($pul); ?> <?=date("Y",$pul);?></option>
<? } ?>


</select>
</div>

<div class="form-group col-sm-2">
<label for="">Spor Tipi</label>
<select class="form-control" id="sportip" onChange="maclarigetir(this.value);">
<option value="">Seçiniz</option>
<option value="futbol">Futbol</option>
<option value="basketbol">Basketbol</option>
<option value="canli">Canlı Futbol</option>
<option value="canlib">Canlı Basketbol</option>
</select>
</div>

<div class="form-group col-sm-2">
<label for="">Maçın Olduğu</label>
<select class="form-control" id="macdbid" onChange="tahminlerigetir(this.value);">
<option value="">Spor tipi seçiniz</option>
</select>
</div>

<div class="form-group col-sm-2">
<label for="">Tahminin Olduğu</label>
<select class="form-control" id="oranvalid">
<option value="">Maç seçiniz</option>
</select>
</div>

<div class="form-group col-sm-2">
<label for="">Durumu</label>
<select class="form-control" id="durum">
<option value="">Tümü</option>
<option value="1">Bahis Açık</option>
<option value="2">Kazandı</option>
<option value="3">Kaybetti</option>
<option value="4">İptal</option>
</select>
</div>

<div class="form-group col-sm-2">
<label for="">En Az Oran</label>
<input type="text" class="form-control minnumber" id="enazoran" value="1.00">
</div>

</div>
</div>
<div class="card-footer">
<button type="button" class="btn btn-link btn-sm" onClick="raporla();">Raporla</button>
</div>
</div>

<div id="gelenkuponlar"></div>

<script>
function loadall() {
$("#loadall").show();
$("body").css('overflow','hidden');
}
function loadexit() {
$("#loadall").hide();
$("body").css('overflow','auto');
}
function raporla() {
loadall();
var rand = Math.random();
var tarih = $("#tarih").val();
var sportip = $("#sportip").val();
var macdbid = $("#macdbid").val();
var oranvalid = $("#oranvalid").val();
var durum = $("#durum").val();
var enazoran = $("#enazoran").val();
$.get('../ajax_players.php?a=analizle&tarih='+tarih+'&sportip='+sportip+'&macdbid='+macdbid+'&oranvalid='+oranvalid+'&durum='+durum+'&enazoran='+enazoran+'',
function(data) {
$("#gelenkuponlar").html(data);
loadexit();
});
	
}
function temizlef() {
$("#sportip").val('');
maclarigetir('');
tahminlerigetir('');
}
function maclarigetir(val) {
loadall();
$("#gelenkuponlar").html('');
tahminlerigetir('');
var rand = Math.random();
var tarih = $("#tarih").val();
$.get('../ajax_players.php?a=analiz_macgetir&sportip='+val+'&tarih='+tarih+'',function(data) {
$("#macdbid").html(data);
loadexit();
});
}
function tahminlerigetir(val) {
$("#gelenkuponlar").html('');
loadall();
var rand = Math.random();
var tarih = $("#tarih").val();
var mac = $("#macdbid").val();
var sportip = $("#sportip").val();
$.get('../ajax_players.php?a=analiz_tahmingetir&sportip='+sportip+'&tarih='+tarih+'&mac='+mac+'',function(data) {
$("#oranvalid").html(data);
loadexit();
});
}
</script>

</div>
</div>

</main>

<?php include 'footer.php'; ?>

</body>
</html>