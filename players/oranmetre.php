<?
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); die(); exit(); }
if($ub['alt_durum']<1 && $ub['wkyetki']<1 && $ub['alt_alt_durum']<1 && $ub['sahip']=="0") { header("Location:index.php"); }
if($ub['adminpanel']=="1") { header("Location:admin"); }
rebuild($ub['id']);

if(isset($_POST['submit'])){

$liveOddsFC = pd("liveOddsFC");
$liveOddsBC = pd("liveOddsBC");
$liveOddsTC = pd("liveOddsTC");
$liveOddsVC = pd("liveOddsVC");
$liveOddsBBC = pd("liveOddsBBC");
$liveOddsHC = pd("liveOddsHC");

$kontrol = sed_sql_query("select * from sistemayar where ayar_id='$ub[id]'");

if (sed_sql_numrows($kontrol) == 0) {

sed_sql_query("INSERT INTO sistemayar SET
canlifutbolkademe = '".$liveOddsFC."',
canlibasketbolkademe = '".$liveOddsBC."',
canliteniskademe = '".$liveOddsTC."',
canlivoleybolkademe = '".$liveOddsVC."',
canlibuzhokeyikademe = '".$liveOddsBBC."',
canlihentbolkademe = '".$liveOddsHC."',
ayar_id = '".$ub['id']."'");

} else {

sed_sql_query("update sistemayar set 
canlifutbolkademe = '".$liveOddsFC."',
canlibasketbolkademe = '".$liveOddsBC."',
canliteniskademe = '".$liveOddsTC."',
canlivoleybolkademe = '".$liveOddsVC."',
canlibuzhokeyikademe = '".$liveOddsBBC."',
canlihentbolkademe = '".$liveOddsHC."'
where ayar_id='".$ub['id']."'");	

}

$onaylandi = 1;

}

$ayarbilgisi_ver = bilgi("select * from sistemayar where ayar_id='".$ub['id']."'");

?>
<? include 'header.php'; ?>
<? include 'menu.php'; ?>

<script>$("#oranmetre").addClass("activemnuitems");</script>

<div id="main" class="lwkSelector" style="width: 758px;">
<div id="live">
<div class="space_20"></div>
<div class="main_space" id="main_wide">
<script>$('#acmen_9').addClass("active")</script>
<div class="z-right-container" id="maskcontainer">


<table class="tablesorter itext-3" border="0" cellspacing="1" cellpadding="0">
<thead>
<tr>

<? if($onaylandi==1) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('playersoranmetre1')?></div>
<? } ?>

<th colspan="2"><?=getTranslation('playersoranmetre2')?></th>
</tr>
</thead>
<form method="post" name="newu">
<tbody>
<tr>
<td style="font-size:15px;width:4000px;"><?=getTranslation('playersoranmetre3')?> :</td>
<td style="width:790px;">

<table class="tablesorter itext-3" width="100%" style="border-collapse: collapse">
<tbody style="text-align:center;">
<tr>
<td><strong><?=getTranslation('playersoranmetre10')?></strong></td>
</tr>
<tr>
<td>
<select name="liveOddsFC" style="width: 137px;" class="inputText chzn-done">
<option value="0" <? if($ayarbilgisi_ver['canlifutbolkademe']==0){ ?>selected<? } ?>><?=getTranslation('playersoranmetre11')?></option>
<option value="1" <? if($ayarbilgisi_ver['canlifutbolkademe']==1){ ?>selected<? } ?>><?=getTranslation('playersoranmetre12')?></option>
<option value="2" <? if($ayarbilgisi_ver['canlifutbolkademe']==2){ ?>selected<? } ?>><?=getTranslation('playersoranmetre13')?></option>
<option value="3" <? if($ayarbilgisi_ver['canlifutbolkademe']==3){ ?>selected<? } ?>><?=getTranslation('playersoranmetre14')?></option>
</select>
</td>
</tr>
</tbody>
</table>
</td>
</tr>


<tr>
<td style="font-size:15px;"><?=getTranslation('playersoranmetre4')?> :</td>
<td>
<table class="tablesorter itext-3" width="100%" style="border-collapse: collapse">
<tbody style="text-align:center;">
<tr>
<td><strong><?=getTranslation('playersoranmetre10')?></strong></td>
</tr>
<tr>
<td>
<select name="liveOddsBC" style="width: 137px;" class="inputText chzn-done">
<option value="0" <? if($ayarbilgisi_ver['canlibasketbolkademe']==0){ ?>selected<? } ?>><?=getTranslation('playersoranmetre11')?></option>
<option value="1" <? if($ayarbilgisi_ver['canlibasketbolkademe']==1){ ?>selected<? } ?>><?=getTranslation('playersoranmetre12')?></option>
<option value="2" <? if($ayarbilgisi_ver['canlibasketbolkademe']==2){ ?>selected<? } ?>><?=getTranslation('playersoranmetre13')?></option>
<option value="3" <? if($ayarbilgisi_ver['canlibasketbolkademe']==3){ ?>selected<? } ?>><?=getTranslation('playersoranmetre14')?></option>
</select>
</td>
</tr>
</tbody>
</table>
</td>
</tr>

<tr>
<td style="font-size:15px;"><?=getTranslation('playersoranmetre5')?> :</td>
<td>
<table class="tablesorter itext-3" width="100%" style="border-collapse: collapse">
<tbody style="text-align:center;">
<tr>
<td><strong><?=getTranslation('playersoranmetre10')?></strong></td>
</tr>
<tr>
<td>
<select name="liveOddsTC" style="width: 137px;" class="inputText chzn-done">
<option value="0" <? if($ayarbilgisi_ver['canliteniskademe']==0){ ?>selected<? } ?>><?=getTranslation('playersoranmetre11')?></option>
<option value="1" <? if($ayarbilgisi_ver['canliteniskademe']==1){ ?>selected<? } ?>><?=getTranslation('playersoranmetre12')?></option>
<option value="2" <? if($ayarbilgisi_ver['canliteniskademe']==2){ ?>selected<? } ?>><?=getTranslation('playersoranmetre13')?></option>
<option value="3" <? if($ayarbilgisi_ver['canliteniskademe']==3){ ?>selected<? } ?>><?=getTranslation('playersoranmetre14')?></option>
</select>
</td>
</tr>
</tbody>
</table>
</td>
</tr>

<tr>
<td style="font-size:15px;"><?=getTranslation('playersoranmetre6')?> :</td>
<td>
<table class="tablesorter itext-3" width="100%" style="border-collapse: collapse">
<tbody style="text-align:center;">
<tr>
<td><strong><?=getTranslation('playersoranmetre10')?></strong></td>
</tr>
<tr>
<td>
<select name="liveOddsVC" style="width: 137px;" class="inputText chzn-done">
<option value="0" <? if($ayarbilgisi_ver['canlivoleybolkademe']==0){ ?>selected<? } ?>><?=getTranslation('playersoranmetre11')?></option>
<option value="1" <? if($ayarbilgisi_ver['canlivoleybolkademe']==1){ ?>selected<? } ?>><?=getTranslation('playersoranmetre12')?></option>
<option value="2" <? if($ayarbilgisi_ver['canlivoleybolkademe']==2){ ?>selected<? } ?>><?=getTranslation('playersoranmetre13')?></option>
<option value="3" <? if($ayarbilgisi_ver['canlivoleybolkademe']==3){ ?>selected<? } ?>><?=getTranslation('playersoranmetre14')?></option>
</select>
</td>
</tr>
</tbody>
</table>
</td>
</tr>

<tr>
<td style="font-size:15px;"><?=getTranslation('playersoranmetre7')?> :</td>
<td>
<table class="tablesorter itext-3" width="100%" style="border-collapse: collapse">
<tbody style="text-align:center;">
<tr>
<td><strong><?=getTranslation('playersoranmetre10')?></strong></td>
</tr>
<tr>
<td>
<select name="liveOddsBBC" style="width: 137px;" class="inputText chzn-done">
<option value="0" <? if($ayarbilgisi_ver['canlibuzhokeyikademe']==0){ ?>selected<? } ?>><?=getTranslation('playersoranmetre11')?></option>
<option value="1" <? if($ayarbilgisi_ver['canlibuzhokeyikademe']==1){ ?>selected<? } ?>><?=getTranslation('playersoranmetre12')?></option>
<option value="2" <? if($ayarbilgisi_ver['canlibuzhokeyikademe']==2){ ?>selected<? } ?>><?=getTranslation('playersoranmetre13')?></option>
<option value="3" <? if($ayarbilgisi_ver['canlibuzhokeyikademe']==3){ ?>selected<? } ?>><?=getTranslation('playersoranmetre14')?></option>
</select>
</td>
</tr>
</tbody>
</table>
</td>
</tr>

<tr>
<td style="font-size:15px;"><?=getTranslation('playersoranmetre8')?> :</td>
<td>
<table class="tablesorter itext-3" width="100%" style="border-collapse: collapse">
<tbody style="text-align:center;">
<tr>
<td><strong><?=getTranslation('playersoranmetre10')?></strong></td>
</tr>
<tr>
<td>
<select name="liveOddsHC" style="width: 137px;" class="inputText chzn-done">
<option value="0" <? if($ayarbilgisi_ver['canlihentbolkademe']==0){ ?>selected<? } ?>><?=getTranslation('playersoranmetre11')?></option>
<option value="1" <? if($ayarbilgisi_ver['canlihentbolkademe']==1){ ?>selected<? } ?>><?=getTranslation('playersoranmetre12')?></option>
<option value="2" <? if($ayarbilgisi_ver['canlihentbolkademe']==2){ ?>selected<? } ?>><?=getTranslation('playersoranmetre13')?></option>
<option value="3" <? if($ayarbilgisi_ver['canlihentbolkademe']==3){ ?>selected<? } ?>><?=getTranslation('playersoranmetre14')?></option>
</select>
</td>
</tr>
</tbody>
</table>
</td>
</tr>

<tr>
<td style="text-align:center;" colspan="2">
<input class="btn btn-large btn-primary2" type="submit" name="submit" style="width:100%;" value="<?=getTranslation('playersoranmetre9')?>" autocomplete="off">
</td>
</tr>
</tbody>
</form>
</table>




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