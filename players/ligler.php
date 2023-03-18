<?
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
	$tipi = "futbol";
} else if($tip_ver == 2){
	$tipi = "basketbol";
} else if($tip_ver == 3){
	$tipi = "tenis";
} else if($tip_ver == 4){
	$tipi = "voleybol";
} else if($tip_ver == 5){
	$tipi = "buzhokeyi";
} else if($tip_ver == 6){
	$tipi = "hentbol";
}

$lig_bol = explode("|",$_POST['lig']);

$sor = sed_sql_query("select * from program_lig_gizli where lig_adi='".$lig_bol[1]."' and lig_ulke='".$lig_bol[0]."' and spor_tipi='".$tipi."' and bayi_id='".$ub['id']."'");

if(sed_sql_numrows($sor)<1 && $_POST['islem']==2) {

sed_sql_query("INSERT INTO program_lig_gizli SET lig_adi='".$lig_bol[1]."', lig_ulke='".$lig_bol[0]."', spor_tipi='".$tipi."', bayi_id = '".$ub['id']."', durum = '0'");

$islem_onay = 1;

} else if(sed_sql_numrows($sor)<1 && $_POST['islem']==1) {

$islem_onay = 3;

} else if($_POST['islem']==1) {

sed_sql_query("delete from program_lig_gizli where spor_tipi='".$tipi."' and lig_adi='".$lig_bol[1]."' and lig_ulke='".$lig_bol[0]."' and bayi_id='".$ub['id']."'");

$islem_onay = 2;

} else {

$islem_onay = 4;

}

// POST BİTİŞ //

}

if($spor_tip==1){
$sor2 = sed_sql_query("select * from program_futbol where id!='' group by ulkeadi");
$spor_tipi_secim = "program_futbol";
} else if($spor_tip==2){
$sor2 = sed_sql_query("select * from program_basketbol where id!='' group by ulkeadi");
$spor_tipi_secim = "program_basketbol";
} else if($spor_tip==3){
$sor2 = sed_sql_query("select * from program_tenis where id!='' group by ulkeadi");
$spor_tipi_secim = "program_tenis";
} else if($spor_tip==4){
$sor2 = sed_sql_query("select * from program_voleybol where id!='' group by ulkeadi");
$spor_tipi_secim = "program_voleybol";
} else if($spor_tip==5){
$sor2 = sed_sql_query("select * from program_buzhokeyi where id!='' group by ulkeadi");
$spor_tipi_secim = "program_buzhokeyi";
} else if($spor_tip==6){
$sor2 = sed_sql_query("select * from program_hentbol where id!='' group by ulkeadi");
$spor_tipi_secim = "program_hentbol";
}

$sor222 = sed_sql_query("select * from program_lig_gizli where bayi_id='".$ub['id']."' group by lig_adi order by FIELD(spor_tipi, 'futbol','basketbol','tenis','voleybol','buzhokeyi','hentbol') ASC");

?>
<? include 'header.php'; ?>
<? include 'menu.php'; ?>
<style>
span.sport-icon-big {
	width: 24px;
	display: inline-block;
	padding: 0px;
	height: 24px;
	vertical-align: text-top;
	background: url('/players/img/icon-sprite-sb.13.png') -18px -1px no-repeat;
}
.sport-icon-big.soccer { background-position: -18px -526px; }
.sport-icon-big.basketball {background-position: -18px -151px;}
.sport-icon-big.tennis { background-position: -18px -551px; }
.sport-icon-big.volleyball { background-position: -18px -601px; }
.sport-icon-big.hockey { background-position: -18px -426px; }
.sport-icon-big.handball { background-position: -18px -401px; }
</style>
<script>$("#ligler").addClass("activemnuitems");</script>

<div id="main" class="lwkSelector" style="width: 758px;">
<div id="live">
<div class="space_20"></div>
<div class="main_space" id="main_wide">
<div class="z-right-container" id="maskcontainer">

<table class="tablesorter">
<thead>
<tr>

<? if($islem_onay==1) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('playersligler1')?></div>
<? } else if($islem_onay==2) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('playersligler2')?></div>
<? } else if($islem_onay==3) { ?>
<script>
alert('<?=getTranslation('playersligler3')?>');
</script>
<? } else if($islem_onay==4) { ?>
<script>
alert('<?=getTranslation('playersligler4')?>');
</script>
<? } ?>


<th colspan="6"><?=getTranslation('playersligler5')?></th>
</tr>
</thead>
<tbody>
<form action="ligler.php" method="post">
<tr>
<td width="100"><?=getTranslation('playersligler6')?></td>
<td>
<select class="inputCombo" style="width:120px;" name="spor_tip" id="spor_tip" onchange="window.location.href='ligler.php?spor_tip='+this.value+'';">
<option value=""><?=getTranslation('playersligler7')?></option>
<option <? if($spor_tip==1){ ?>selected<? } ?> value="1"><?=getTranslation('playersligler8')?></option>
<option <? if($spor_tip==2){ ?>selected<? } ?> value="2"><?=getTranslation('playersligler9')?></option>
<option <? if($spor_tip==3){ ?>selected<? } ?> value="3"><?=getTranslation('playersligler10')?></option>
<option <? if($spor_tip==4){ ?>selected<? } ?> value="4"><?=getTranslation('playersligler11')?></option>
<option <? if($spor_tip==5){ ?>selected<? } ?> value="5"><?=getTranslation('playersligler12')?></option>
<option <? if($spor_tip==6){ ?>selected<? } ?> value="6"><?=getTranslation('playersligler13')?></option>
</select>
</td>
<td width="100"><?=getTranslation('playersligler14')?></td>
<td>
<select class="inputCombo" style="width:275px;" name="lig" id="lig">
<? 
while($rows2=sed_sql_fetcharray($sor2)) { 
$toplams = bilgi("SELECT COUNT(CASE WHEN id!='' THEN id END) as toplam_bulunan_mac FROM $spor_tipi_secim WHERE kupa_isim='".$rows2['kupa_isim']."'");
?>
<option <? if($_POST['lig']==$rows2['kupa_isim']){ ?>selected="selected" <? } ?> value="<?=$rows2['kupa_ulke'];?>|<?=$rows2['kupa_isim'];?>"><?=$rows2['kupa_ulke'];?>-<?=$rows2['kupa_isim'];?> (<?=$toplams['toplam_bulunan_mac'];?>)</option>
<? } ?>
</select>
</td>
<td width="100"><?=getTranslation('playersligler15')?></td>
<td>
<select class="inputCombo" style="width:150px;" name="islem" id="islem">
<option value="0"><?=getTranslation('playersligler16')?></option>
<option value="1"><?=getTranslation('playersligler17')?></option>
<option value="2"><?=getTranslation('playersligler18')?></option>
</select>
</td>
</tr>
<tr>
<td class="last" colspan="6">
<input class="btn btn-small btn-primary" value="<?=getTranslation('playersligler19')?>" type="submit" name="submit">
</td>
</tr>
</form>
</tbody>
</table>

<? if(sed_sql_numrows($sor222)<1) { ?>

<table class="tablesorter">
<thead>
<tr>
<th colspan="1"></th>
<th><?=getTranslation('playersligler20')?></th>
<th width="40"><?=getTranslation('playersligler21')?></th>
<th width="40"><?=getTranslation('playersligler22')?></th>
</tr>
</thead>
<tbody>

<tr>
<td width="20" colspan="4" style="text-align:center;"><?=getTranslation('playersligler23')?></td>
</tr>

</tbody>
</table>

<? } else { ?>

<table class="tablesorter">
<thead>
<tr>
<th colspan="1"></th>
<th><?=getTranslation('playersligler20')?></th>
<th width="40"><?=getTranslation('playersligler21')?></th>
<th width="40"><?=getTranslation('playersligler22')?></th>
</tr>
</thead>
<tbody>

<? while($row=sed_sql_fetcharray($sor222)) { ?>

<tr id="<?=$row['lig_ulke'];?>_<?=$row['lig_adi'];?>">
<td width="20" style="text-align:center;">
<? if($row['spor_tipi']=="futbol"){ ?>
<span class="sport-icon-big soccer"></span>
<? } else if($row['spor_tipi']=="basketbol"){ ?>
<span class="sport-icon-big basketball"></span>
<? } else if($row['spor_tipi']=="tenis"){ ?>
<span class="sport-icon-big tennis"></span>
<? } else if($row['spor_tipi']=="voleybol"){ ?>
<span class="sport-icon-big volleyball"></span>
<? } else if($row['spor_tipi']=="buzhokeyi"){ ?>
<span class="sport-icon-big hockey"></span>
<? } else if($row['spor_tipi']=="hentbol"){ ?>
<span class="sport-icon-big handball"></span>
<? } ?>
</td>
<td><?=$row['lig_ulke'];?>-<?=$row['lig_adi'];?></td>
<td><img src="/players/img/akfpsf_2.png" alt="Pasif" border="0"></td>
<td>

<? if($row['spor_tipi']=="futbol"){ ?>
<a style="font-weight: bold;color: #0e8c06;" href="javascript:;" onclick="ligdurumdegis('<?=$row['lig_ulke'];?>','<?=$row['lig_adi'];?>','futbol');"><?=getTranslation('ajaxspordallariaktifet')?></a>
<? } else if($row['spor_tipi']=="basketbol"){ ?>
<a style="font-weight: bold;color: #0e8c06;" href="javascript:;" onclick="ligdurumdegis('<?=$row['lig_ulke'];?>','<?=$row['lig_adi'];?>','basketbol');"><?=getTranslation('ajaxspordallariaktifet')?></a>
<? } else if($row['spor_tipi']=="tenis"){ ?>
<a style="font-weight: bold;color: #0e8c06;" href="javascript:;" onclick="ligdurumdegis('<?=$row['lig_ulke'];?>','<?=$row['lig_adi'];?>','tenis');"><?=getTranslation('ajaxspordallariaktifet')?></a>
<? } else if($row['spor_tipi']=="voleybol"){ ?>
<a style="font-weight: bold;color: #0e8c06;" href="javascript:;" onclick="ligdurumdegis('<?=$row['lig_ulke'];?>','<?=$row['lig_adi'];?>','voleybol');"><?=getTranslation('ajaxspordallariaktifet')?></a>
<? } else if($row['spor_tipi']=="buzhokeyi"){ ?>
<a style="font-weight: bold;color: #0e8c06;" href="javascript:;" onclick="ligdurumdegis('<?=$row['lig_ulke'];?>','<?=$row['lig_adi'];?>','buzhokeyi');"><?=getTranslation('ajaxspordallariaktifet')?></a>
<? } else if($row['spor_tipi']=="hentbol"){ ?>
<a style="font-weight: bold;color: #0e8c06;" href="javascript:;" onclick="ligdurumdegis('<?=$row['lig_ulke'];?>','<?=$row['lig_adi'];?>','hentbol');"><?=getTranslation('ajaxspordallariaktifet')?></a>
<? } ?>

</td>
</tr>

<? } ?>

</tbody>
</table>

<? } ?>

<table class="tablesorter">
<tbody><tr>
<th><?=getTranslation('playersligler24')?></th>
</tr>
<tr>
<td></td>
</tr>
<tr>
<td>
<div class="notice info">
<ul class="list-unordered list-checked2">
<li><?=getTranslation('playersligler25')?></li>
<li><?=getTranslation('playersligler26')?></li>
<li><?=getTranslation('playersligler27')?></li>
<li><?=getTranslation('playersligler28')?></li>
<li><?=getTranslation('playersligler29')?></li>
</ul>
</div>
</td>
</tr>
</tbody></table>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<script>

function ligdurumdegis(ulke,lig,spor_tipi) {
var rand = Math.random();
$.get('../ajax_players.php?a=ligdurumdegis&ulke='+ulke+'&lig='+lig+'&spor_tipi='+spor_tipi+'',function(data) {
	alert("<?=getTranslation('playersligler30')?>");
	 var val = "ligler.php";
	 window.location.href=val;
});
}
</script>

<? include 'footer.php'; ?>

</body>
</html>