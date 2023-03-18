<?
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); die(); exit(); }
if($ub['adminpanel']=="1") { header("Location:admin"); }

if(isset($_POST['gokey'])) {

sed_sql_query("delete from hizligiris where user_id='$ub[id]'");
$s = sed_sql_query("select * from oran_val_futbol");
while($ass=sed_sql_fetcharray($s)) { 
$tus = pd("tus_".$ass['id']."");
if($tus!="") {
sed_sql_query("insert into hizligiris (id,user_id,oranvalid,yenitus) values ('','$ub[id]','$ass[id]','$tus')");	
$var=1;
}
}

if($var) {
header("Location:hizligiris.php?ok=1");
} else {
header("Location:hizligiris.php");
}

}
?>
<? include 'header.php'; ?>
<? include 'menu.php'; ?>

<script>$("#hizligiris").addClass("activemnuitems");</script>

<div id="main" class="lwkSelector" style="width: 758px;">
<div id="live">
<div class="space_20"></div>
<div class="main_space" id="main_wide">
<div class="z-right-container" id="maskcontainer">

<table class="tablesorter">
<tbody>
<tr>
<th><?=getTranslation('playershizligiris1')?></th>
</tr>
<tr>
<td colspan="2">
<div class="notice info">
<ul class="list-unordered list-checked2">
<li><?=getTranslation('playershizligiris2')?></li>
<li><?=getTranslation('playershizligiris3')?></li>
</ul>
</div>
</td>
</tr>
</tbody>
</table>


<?
if(isset($_GET['ok'])) { ?>
<script>
$(document).ready(function(e) {
    failcont('<?=getTranslation('playershizligiris4')?>');
});
</script>
<? } ?>
<form method="post">
<table class="tablesorter" border="0" cellpadding="0" cellspacing="1" style="margin:0px;">
<?
$sor = sed_sql_query("select * from oran_tip_futbol where id!='' AND id NOT IN (45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100) order by id asc");
while($row=sed_sql_fetcharray($sor)) { ?>

<thead>
<tr><th colspan="5"><?=getTranslation('foran'.$row['id'].'')?> <?=getTranslation('playershizligiris5')?></th></tr>
<tr>
<th style="text-align:left;"><?=getTranslation('playershizligiris6')?></th>
<th style="text-align:left;"><?=getTranslation('playershizligiris7')?></th>
<th><?=getTranslation('playershizligiris8')?></th>
<th><?=getTranslation('playershizligiris9')?></th>
<th><?=getTranslation('playershizligiris10')?></th>
</tr>
</thead>
<tbody class="c">

<?
$s = sed_sql_query("select * from oran_val_futbol where oran_tip='$row[id]'");
while($ass=sed_sql_fetcharray($s)) { 

$tanimli = bilgi("select * from hizligiris where user_id='$ub[id]' and oranvalid='$ass[id]'");
if($tanimli['id']!="") { $tanimli_tus = $tanimli['yenitus']; } else { $tanimli_tus = ""; }

?>

<tr>
<td class="l"><?=getTranslation('foranaciklama'.$ass['id'].'')?></td>
<td><?=getTranslation('playershizligiris11')?></td>
<td style="text-align:center;"><?=$ass['tus']; ?></td>
<td style="text-align:center;"><?=getTranslation('playershizligiris12')?> <?=$ass['tus']; ?></td>
<td style="text-align:center;"><input type="text" style="width:25px;" class="input minnumber <? if($tanimli_tus!="") { echo "degisiminput"; } ?>" name="tus_<?=$ass['id']; ?>" value="<?=$tanimli_tus;?>"></td>
</tr>
<? } ?>
</tbody>
<? } ?>
<tr>
<td class="last" colspan="5" style="background-color: #f74835;text-align: right;">
<input type="hidden" name="gokey" value="2">
<input type="submit" class="btn btn-large btn-primary" value="Kaydet">
</td>
</tr>
</form>

</div>
</div>
</div>
</div>
</div>
</div>

</body>
</html>