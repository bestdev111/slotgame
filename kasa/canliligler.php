<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:../login.php"); die(); exit(); }
if($ub['alt_durum']<1 && $ub['wkyetki']<1 && $ub['alt_alt_durum']<1 && $ub['sahip']=="0") { header("Location:index.php"); }
if($ub['adminpanel']=="1") { header("Location:admin"); }
rebuild($ub['id']);

$spor_tip = $_GET['spor_tip'];

// POST BAŞLANGIÇ //
if(isset($_POST['submit'])){

$tip_ver = $_POST['spor_tip'];
if($tip_ver == 1){
	$tipi = "cfutbol";
}

$lig_bol = explode("|",$_POST['lig']);

$sor = sed_sql_query("select * from program_lig_gizli where lig_adi='".$lig_bol[1]."' and lig_ulke='".$lig_bol[0]."' and lig_id='".$lig_bol[2]."' and spor_tipi='".$tipi."' and bayi_id='".$ub['id']."'");

if(sed_sql_numrows($sor)<1 && $_POST['islem']==2) {

sed_sql_query("INSERT INTO program_lig_gizli SET lig_adi='".$lig_bol[1]."', lig_ulke='".$lig_bol[0]."', lig_id='".$lig_bol[2]."', spor_tipi='".$tipi."', bayi_id = '".$ub['id']."', durum = '0'");

$islem_onay = 1;

} else if(sed_sql_numrows($sor)<1 && $_POST['islem']==1) {

$islem_onay = 3;

} else if($_POST['islem']==1) {

sed_sql_query("delete from program_lig_gizli where spor_tipi='".$tipi."' and lig_adi='".$lig_bol[1]."' and lig_ulke='".$lig_bol[0]."' and lig_id='".$lig_bol[2]."' and bayi_id='".$ub['id']."'");

$islem_onay = 2;

} else {

$islem_onay = 4;

}

// POST BİTİŞ //

}

$fark = time()-240;

if($spor_tip==1){
$sor2 = sed_sql_query("select * from canli_maclar where id!='' and songuncelleme>$fark and isibitti='0' group by lig_adi");
$spor_tipi_secim = "canli_maclar";
}

$sor222 = sed_sql_query("select * from program_lig_gizli where bayi_id='".$ub['id']."' group by lig_adi order by FIELD(spor_tipi, 'cfutbol','cbasketbol','ctenis','cvoleybol','cbuzhokeyi','cmasatenisi') ASC");

?>
<?php include 'header.php'; ?>
<style>
span.sport-icon-big {
	width: 24px;
	display: inline-block;
	padding: 0px;
	height: 24px;
	vertical-align: text-top;
	background: url('players/img/icon-sprite-sb.13.png') -18px -1px no-repeat;
}
.sport-icon-big.soccer { background-position: -18px -526px; }
.sport-icon-big.basketball {background-position: -18px -151px;}
.sport-icon-big.tennis { background-position: -18px -551px; }
.sport-icon-big.volleyball { background-position: -18px -601px; }
.sport-icon-big.hockey { background-position: -18px -426px; }
.sport-icon-big.handball { background-position: -18px -401px; }
</style>

<main class="main">
<ol class="breadcrumb mb-0">
<li class="breadcrumb-item"><?=getTranslation('playersligler5')?></li>
</ol>


<? if($islem_onay==1) { ?>
<div class="alert alert-success mb-0" id="success" style="display:block;"><?=getTranslation('playersligler1')?></div>
<? } else if($islem_onay==2) { ?>
<div class="alert alert-success mb-0" id="success" style="display:block;"><?=getTranslation('playersligler2')?></div>
<? } else if($islem_onay==3) { ?>
<div class="alert alert-danger mb-0" id="error" style="display:block;"><?=getTranslation('playersligler3')?>.</div>
<? } else if($islem_onay==4) { ?>
<div class="alert alert-info mb-0" id="info" style="display:block;"><?=getTranslation('playersligler4')?></div>
<? } ?>

<div class="container-fluid mt-2">
<div class="row">

<form action="canliligler.php" method="post">


<div class="card">
<div class="card-block">
<div class="row">
<div class="form-group col-sm-2">
<label for=""><?=getTranslation('playersligler6')?></label>
<select class="form-control" name="spor_tip" id="spor_tip" onchange="window.location.href='canliligler.php?spor_tip='+this.value+'';">
<option value=""><?=getTranslation('playersligler32')?></option>
<option <? if($spor_tip==1){ ?>selected<? } ?> value="1">Futbol</option>
</select>
</div>
<div class="form-group col-sm-7">
<label for=""><?=getTranslation('playersligler14')?></label>
<select class="form-control" name="lig" id="lig">
<?
$toplam = sed_sql_numrows($sor2);
if($toplam>0){
while($rows2=sed_sql_fetcharray($sor2)) {
$toplams = bilgi("SELECT COUNT(CASE WHEN id!='' THEN id END) as toplam_bulunan_mac FROM $spor_tipi_secim WHERE lig_adi='".$rows2['lig_adi']."' and songuncelleme>$fark and isibitti='0'");
?>
<option <? if($_POST['lig']==$rows2['lig_adi']){ ?>selected="selected" <? } ?> value="<?=$rows2['ulke'];?>|<?=$rows2['lig_adi'];?>|<?=$rows2['lig_id'];?>"><?=$rows2['ulke'];?>-<?=$rows2['lig_adi'];?> (<?=$toplams['toplam_bulunan_mac'];?>)</option>
<? } ?>
<? } else { ?>
<option value=""><?=getTranslation('playersligler31')?></option>
<? } ?>
</select>
</div>
<div class="form-group col-sm-3">
<label for=""><?=getTranslation('playersligler15')?></label>
<select class="form-control" name="islem" id="islem">
<option value="0"><?=getTranslation('playersligler16')?></option>
<option value="1"><?=getTranslation('playersligler17')?></option>
<option value="2"><?=getTranslation('playersligler18')?></option>
</select>
</div>
</div>
</div>
<div class="card-footer">
<button type="submit" class="btn btn-link btn-sm" name="submit"><?=getTranslation('playersligler19')?></button>
</div>
</div>
</form>

<? if(sed_sql_numrows($sor222)<1) { ?>

<div class="card">
<div class="card-block p-0">
<div class="table-responsive">
<table class="table mb-0">

<thead>
<tr>
<th class="header" style="text-align: center;width: 10%;"><?=getTranslation('playersmacoranarttirazalt4')?></th>
<th class="header" style="text-align: left;"><?=getTranslation('playersligler20')?></th>
<th class="header" style="text-align: center;width: 10%;"><?=getTranslation('playersligler21')?></th>
<th class="header" style="text-align: center;width: 10%;"><?=getTranslation('playersligler22')?></th>
</tr>
</thead>
<tbody id="calcall">
<tr class="table-success"><td width="20" colspan="4" style="text-align:center;"><?=getTranslation('playersligler23')?></td></tr>
</tbody>
</table>
</div>
</div>
</div>

<? } else { ?>

<div class="card">
<div class="card-block p-0">
<div class="table-responsive">
<table class="table mb-0">

<thead>
<tr>
<th class="header" style="text-align: center;width: 10%;"><?=getTranslation('playersmacoranarttirazalt4')?></th>
<th class="header" style="text-align: left;"><?=getTranslation('playersligler20')?></th>
<th class="header" style="text-align: center;width: 10%;"><?=getTranslation('playersligler21')?></th>
<th class="header" style="text-align: center;width: 10%;"><?=getTranslation('playersligler22')?></th>
</tr>
</thead>
<tbody id="calcall">

<? while($row=sed_sql_fetcharray($sor222)) { ?>

<tr class="table-success" id="<?=$row['lig_ulke'];?>_<?=$row['lig_adi'];?>">

<td style="text-align: center;">
<? if($row['spor_tipi']=="cfutbol"){ ?><span class="sport-icon-big soccer"></span><? } ?>
</td>

<td style="text-align: left;"> <?=$row['lig_ulke'];?>-<?=$row['lig_adi'];?> </td>

<td style="text-align: center;"><img src="/players/img/akfpsf_2.png" alt="Pasif" border="0"></td>


<td style="text-align: center;">

<? if($row['spor_tipi']=="cfutbol"){ ?>
<a style="font-weight: bold;color: #0e8c06;" href="javascript:;" onclick="ligdurumdegis('<?=$row['lig_ulke'];?>','<?=$row['lig_adi'];?>','cfutbol');"><?=getTranslation('ajaxspordallariaktifet')?></a>
<? } ?>

</td>

</tr>

<? } ?>

</tbody>
</table>
</div>
</div>
</div>

<? } ?>

</div>
</div>

</main>

<script>
function ligdurumdegis(ulke,lig,spor_tipi) {
var rand = Math.random();
$.get('../ajax_players.php?a=ligdurumdegis&ulke='+ulke+'&lig='+lig+'&spor_tipi='+spor_tipi+'',function(data) {
	alert("<?=getTranslation('playersligler30')?>");
	 var val = "canliligler.php";
	 window.location.href=val;
});
}
</script>

<?php include 'footer.php'; ?>

</body>
</html>