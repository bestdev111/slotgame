<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); die(); exit(); }
if($ub['alt_durum']<1 && $ub['wkyetki']<1 && $ub['alt_alt_durum']<1 && $ub['sahip']=="0") { header("Location:index.php"); }
if($ub['adminpanel']=="1") { header("Location:admin"); }
rebuild($ub['id']);
$spor_tip = $_GET['spor_tip'];
$mac_id = $_GET['id'];

// POST BAŞLANGIÇ //
if(isset($_POST['submit'])){
// FOREACH BAŞLANGIÇ //
foreach ($_POST['rid'] as $key => $value) {

$sor = sed_sql_query("select * from maclar_oranlar where mac_db_id='".$_POST['macdbid']."' and spor_tipi='tenis' and oran_val_id='".$key."' and bayi_id='".$ub['id']."'");

if(sed_sql_numrows($sor)<1) {

sed_sql_query("INSERT INTO maclar_oranlar SET mac_db_id='".$_POST['macdbid']."', spor_tipi='tenis', oran_val_id='".$key."', bayi_id = '".$ub['id']."', oran = '".$value."'");

} else {

sed_sql_query("update maclar_oranlar set oran = '".$value."' where mac_db_id='".$_POST['macdbid']."' and spor_tipi='tenis' and oran_val_id='".$key."' and bayi_id='".$ub['id']."'");

}

// FOREACH BİTİŞ //
}

// POST BİTİŞ //

$onaylandi = 1;

}

?>
<?php include 'header.php'; ?>

<main class="main">
<ol class="breadcrumb mb-0">
<li class="breadcrumb-item"><?=getTranslation('yeniyerler_kasa188')?></li>
</ol>

<?

if($spor_tip=="futbol"){
$mb = bilgi("select * from program_futbol where id='".$mac_id."'");
} else if($spor_tip=="basketbol"){
$mb = bilgi("select * from program_basketbol where id='".$mac_id."'");
} else if($spor_tip=="tenis"){
$mb = bilgi("select * from program_tenis where id='".$mac_id."'");
}

?>

<? if($onaylandi==1) { ?>
<div class="alert alert-success mb-0" id="success" style="display:block;"><?=getTranslation('yeniyerler_kasa189')?></div>
<? } ?>

<div class="container-fluid mt-2">
<div class="row">
<div class="row">
<form id="dealer-form" name="dealer-form" method="POST" action="">
<div class="col-sm-12">
<div class="card">
<div class="card-header"><?=getTranslation('yeniyerler_kasa190')?> / <?=$mb['ev_takim'];?>-<?=$mb['konuk_takim'];?></div>
<div class="card-block">

<style>
table.tablesorter {
    border: solid #ccc 1px;
    -moz-border-radius: 6px;
    -webkit-border-radius: 6px;
    border-radius: 6px;
    -webkit-box-shadow: 0 1px 1px #ccc;
    -moz-box-shadow: 0 1px 1px #ccc;
    box-shadow: 0 1px 1px #ccc;
width: 100%;
}
table.tablesorter tbody tr:nth-child(2n+1) td {
    background-color: #F0F0F6;
}
.fielditems li {
    color: #666666;
    list-style: none;
}
label {
    display: inline;
}

input, textarea {
    font-size: 11px;
    color: #666666;
    font-family: 'Roboto', Verdana, Arial, Helvetica, sans-serif;
    padding-left: 2px;
}

.inputCheck {
    font-family: verdana;
    font-size: 11px;
    color: #000000;
}


.last .input {
    float: right;
}



table.tablesorter th {
    background-color: #2a7394;
    background-image: -webkit-gradient(linear,left top,left bottom,from(#2a7394),to(#3c7c98));
    background-image: -webkit-linear-gradient(top,#2a7394,#436d80);
    -webkit-box-shadow: 0 1px 0 rgb(42, 115, 148) inset;
    -moz-box-shadow: 0 1px 0 rgba(255,255,255,.8) inset;
    box-shadow: 0 1px 0 rgb(42, 115, 148) inset;
    border-top: none;
    text-shadow: 0 1px 0 rgb(0, 0, 0);
    color: #FFF;
}
</style>

<?

$gizli_oran_tips = gizli_oran_tips_tenis($mb['kupa_id'],$mb['id']);
if($gizli_oran_tips!="") { $gizli_ekle = "and oran_val_id not in ($gizli_oran_tips)"; } else { $gizli_ekle = ""; }
$sor = sed_sql_query("select mac_db_id,oran_tip,durum,oran_val_id from oranlar_tenis where mac_db_id='$mac_id' $gizli_ekle and durum='1' group by oran_tip order by oran_tip asc");
while($ass=sed_sql_fetchassoc($sor)) { 

$tip = bilgi("select id,tip_isim,tip_kodu from oran_tip_tenis where id='$ass[oran_tip]'");

?>

<table class="tablesorter">
<tbody><tr>
<th class="l"><?=getTranslation('tenisoran'.$tip['id'].'')?></th>
<th width="80"><?=getTranslation('playersbahislerbasketbol3')?></th>
<th width="80"><?=getTranslation('playersbahislerbasketbol4')?></th>
<th width="120"><?=getTranslation('playersbahislerbasketbol5')?></th>
<th width="80"><?=getTranslation('playersbahislerbasketbol6')?></th>
</tr>

<form method="post">

<?
$sss = sed_sql_query("select mac_db_id,oran_tip,oran_val_id,oran,durum from oranlar_tenis ora where mac_db_id='$mac_id' and durum='1' and oran_tip='$ass[oran_tip]' $gizli_ekle order by (select yapi from oran_val_tenis ov where ov.id=ora.oran_val_id) asc");
while($row=sed_sql_fetchassoc($sss)) { 
$oran_bilgi = bilgi("select id,oran_val,yapi,oran_tip from oran_val_tenis where id='$row[oran_val_id]'");
$buoran = $row['oran'];
$oran_bilgi_2 = bilgi("select oran from maclar_oranlar where oran_val_id='".$oran_bilgi['id']."' and mac_db_id='".$mac_id."' and spor_tipi='tenis' and bayi_id='".$ub['id']."'");

?>

<tr>
<td>

<? if($oran_bilgi['oran_val']=="E"){ ?><?=getTranslation('oransecenek3')?>
<? } else if($oran_bilgi['oran_val']=="H"){ ?><?=getTranslation('oransecenek4')?>
<? } else if($oran_bilgi['oran_val']=="A"){ ?><?=getTranslation('oransecenek2')?>
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?><?=getTranslation('oransecenek1')?>
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 2.5"){ ?><?=getTranslation('oransecenek9')?>
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 2.5"){ ?><?=getTranslation('oransecenek10')?>
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 2.5"){ ?><?=getTranslation('oransecenek11')?>
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 2.5"){ ?><?=getTranslation('oransecenek12')?>
<? } else if($oran_bilgi['oran_val']=="1 ve Üst 3.5"){ ?><?=getTranslation('oransecenek13')?>
<? } else if($oran_bilgi['oran_val']=="2 ve Üst 3.5"){ ?><?=getTranslation('oransecenek14')?>
<? } else if($oran_bilgi['oran_val']=="1 ve Alt 3.5"){ ?><?=getTranslation('oransecenek15')?>
<? } else if($oran_bilgi['oran_val']=="2 ve Alt 3.5"){ ?><?=getTranslation('oransecenek16')?>
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?><?=getTranslation('oransecenek17')?>
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?><?=getTranslation('oransecenek18')?>
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?><?=getTranslation('oransecenek19')?>
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?><?=getTranslation('oransecenek20')?>
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?><?=getTranslation('oransecenek21')?>
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?><?=getTranslation('oransecenek22')?>
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?><?=getTranslation('oransecenek5')?>
<? } else if($oran_bilgi['oran_val']=="T"){ ?><?=getTranslation('oransecenek6')?>
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

</td>
<td class="c" style="text-align:center;"><?=nf($buoran+$oran_bilgi_2['oran']); ?></td>
<td class="c" style="text-align:center;"><b class=""><?=nf($buoran); ?></b></td>
<td class="c" style="text-align:center;">
<a href="javascript:;" class="tag tag-danger dealer-increase-limit" onclick="odchangeminus(<?=$oran_bilgi['id']; ?>);"><i class="fa fa-level-down"></i> -0.05</a>
<a href="javascript:;" class="tag tag-success dealer-increase-limit" onclick="odchangeplus(<?=$oran_bilgi['id']; ?>);"><i class="fa fa-level-up"></i> +0.05</a>
</td>

<td style="text-align:center;"><input readonly="readonly" class="inputText" id="chod_<?=$oran_bilgi['id']; ?>" type="text" name="rid[<?=$oran_bilgi['id']; ?>]" style="width: 70px" size="50" maxlength="8" value="<?if($oran_bilgi_2['oran']!=''){ ?><?=$oran_bilgi_2['oran'];?><? } else { ?>0.00<? } ?>"></td>

</tr>

<? } ?>

</tbody>
</table>

<? } ?>

</td>
</tr>

<tr>
<td class="last">
<input hidden type="text" name="macdbid" value="<?=$mac_id; ?>">
<input class="btn btn-large btn-primary" type="submit" name="submit" value="<?=getTranslation('playersbahislerbasketbol11')?>">
<input class="btn btn-large btn-danger" type="button" value="<?=getTranslation('playersbahislerbasketbol12')?>" onclick="javascript:geridon();">
</td>
</tr>

</form>

</tbody>
</table>

<script>
function odchangeplus(i) {
	var suan = $("input[id=chod_"+i+"]").val();
	var yeni = parseFloat(Math.round(suan * 100) / 100+0.05).toFixed(2);
	$("input[id=chod_"+i+"]").val(yeni);
}
function odchangeminus(i) {
	var suan = $("input[id=chod_"+i+"]").val();
	var yeni = parseFloat(Math.round(suan * 100) / 100-0.05).toFixed(2);
	$("input[id=chod_"+i+"]").val(yeni);
}

$(".arti").mousehold(100, function(i){   
var idno = $(this).attr('id');
odchangeplus(idno);
})

$(".eksi").mousehold(100, function(i){   
var idno = $(this).attr('id');
odchangeminus(idno);
})
</script>

</main>

<?php include 'footer.php'; ?>

</body>
</html>