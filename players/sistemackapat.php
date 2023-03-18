<?
session_start();
include '../db.php';
if (isset($_SESSION['betuser'])) {
$user = $_SESSION['betuser'];
$ayar = bilgi("select * from sistemayar where ayar_id=".$_SESSION['betuser']);
} else {
header("Location:/login.php");
die();
exit();
}

if ($ub['alt_durum'] < 1 || $ub['sistemayarlaryetki'] == 0 || ($ub['alt_alt_durum'] > 0) || ($ub['sahip'] == "1")) {
header("Location:spor-bahisleri");
}

if (isset($_POST['securecode'])) {
$bahis_basla = pd("bahis_basla");
$bahis_bitir = pd("bahis_bitir");
$kontrol = sed_sql_query("select * from sistemayar where ayar_id='$ub[id]'");

if (sed_sql_numrows($kontrol) == 0) {
sed_sql_query("INSERT INTO sistemayar SET bahis_basla = '".$bahis_basla."',bahis_bitir = '".$bahis_bitir."',ayar_id = '".$ub['id']."'");
} else {
sed_sql_query("update sistemayar set bahis_basla='".$bahis_basla."',bahis_bitir='".$bahis_bitir."' where ayar_id='".$ub['id']."'");	
}
header("Refresh:0");
$onaylandi = 1;

}

?>
<? include 'header.php'; ?>
<? include 'menu.php'; ?>
<script>$("#sistemackapat").addClass("activemnuitems");</script>

<div id="main" class="lwkSelector" style="width: 758px;">
<div id="live">
<div class="space_20"></div>
<div class="main_space" id="main_wide">
<div class="z-right-container" id="maskcontainer">

<? if($onaylandi==1) { ?>
<script>alert('<?=getTranslation('sistemackapat1')?>');</script>
<? } ?>

<form method="post" class="form" name="newu">
<table class="tablesorter">
<thead>
<tr>
<th colspan="2"><?=getTranslation('sistemackapat2')?></th>
</tr>
</thead>
<tbody>


<tr>
<td><?=getTranslation('sistemackapat3')?></td>
<td>
<select class="inputCombo choiceChosen" style="width: 195px; height:30px;" name="bahis_bitir">
<option value="00:00" <? if($ayar['bahis_bitir']=="00:00") { echo "selected"; } ?>>00:00</option>
<option value="00:15" <? if($ayar['bahis_bitir']=="00:15") { echo "selected"; } ?>>00:15</option>
<option value="00:30" <? if($ayar['bahis_bitir']=="00:30") { echo "selected"; } ?>>00:30</option>
<option value="00:45" <? if($ayar['bahis_bitir']=="00:45") { echo "selected"; } ?>>00:45</option>
<option value="01:00" <? if($ayar['bahis_bitir']=="01:00") { echo "selected"; } ?>>01:00</option>
<option value="01:15" <? if($ayar['bahis_bitir']=="01:15") { echo "selected"; } ?>>01:15</option>
<option value="01:30" <? if($ayar['bahis_bitir']=="01:30") { echo "selected"; } ?>>01:30</option>
<option value="01:45" <? if($ayar['bahis_bitir']=="01:45") { echo "selected"; } ?>>01:45</option>
<option value="02:00" <? if($ayar['bahis_bitir']=="02:00") { echo "selected"; } ?>>02:00</option>
<option value="02:15" <? if($ayar['bahis_bitir']=="02:15") { echo "selected"; } ?>>02:15</option>
<option value="02:30" <? if($ayar['bahis_bitir']=="02:30") { echo "selected"; } ?>>02:30</option>
<option value="02:45" <? if($ayar['bahis_bitir']=="02:45") { echo "selected"; } ?>>02:45</option>
<option value="03:00" <? if($ayar['bahis_bitir']=="03:00") { echo "selected"; } ?>>03:00</option>
<option value="03:15" <? if($ayar['bahis_bitir']=="03:15") { echo "selected"; } ?>>03:15</option>
<option value="03:30" <? if($ayar['bahis_bitir']=="03:30") { echo "selected"; } ?>>03:30</option>
<option value="03:45" <? if($ayar['bahis_bitir']=="03:45") { echo "selected"; } ?>>03:45</option>
<option value="04:00" <? if($ayar['bahis_bitir']=="04:00") { echo "selected"; } ?>>04:00</option>
<option value="04:15" <? if($ayar['bahis_bitir']=="04:15") { echo "selected"; } ?>>04:15</option>
<option value="04:30" <? if($ayar['bahis_bitir']=="04:30") { echo "selected"; } ?>>04:30</option>
<option value="04:45" <? if($ayar['bahis_bitir']=="04:45") { echo "selected"; } ?>>04:45</option>
<option value="05:00" <? if($ayar['bahis_bitir']=="05:00") { echo "selected"; } ?>>05:00</option>
<option value="05:15" <? if($ayar['bahis_bitir']=="05:15") { echo "selected"; } ?>>05:15</option>
<option value="05:30" <? if($ayar['bahis_bitir']=="05:30") { echo "selected"; } ?>>05:30</option>
<option value="05:45" <? if($ayar['bahis_bitir']=="05:45") { echo "selected"; } ?>>05:45</option>
<option value="06:00" <? if($ayar['bahis_bitir']=="06:00") { echo "selected"; } ?>>06:00</option>
<option value="06:15" <? if($ayar['bahis_bitir']=="06:15") { echo "selected"; } ?>>06:15</option>
<option value="06:30" <? if($ayar['bahis_bitir']=="06:30") { echo "selected"; } ?>>06:30</option>
<option value="06:45" <? if($ayar['bahis_bitir']=="06:45") { echo "selected"; } ?>>06:45</option>
<option value="07:00" <? if($ayar['bahis_bitir']=="07:00") { echo "selected"; } ?>>07:00</option>
<option value="07:15" <? if($ayar['bahis_bitir']=="07:15") { echo "selected"; } ?>>07:15</option>
<option value="07:30" <? if($ayar['bahis_bitir']=="07:30") { echo "selected"; } ?>>07:30</option>
<option value="07:45" <? if($ayar['bahis_bitir']=="07:45") { echo "selected"; } ?>>07:45</option>
<option value="08:00" <? if($ayar['bahis_bitir']=="08:00") { echo "selected"; } ?>>08:00</option>
<option value="08:15" <? if($ayar['bahis_bitir']=="08:15") { echo "selected"; } ?>>08:15</option>
<option value="08:30" <? if($ayar['bahis_bitir']=="08:30") { echo "selected"; } ?>>08:30</option>
<option value="08:45" <? if($ayar['bahis_bitir']=="08:45") { echo "selected"; } ?>>08:45</option>
<option value="09:00" <? if($ayar['bahis_bitir']=="09:00") { echo "selected"; } ?>>09:00</option>
<option value="09:15" <? if($ayar['bahis_bitir']=="09:15") { echo "selected"; } ?>>09:15</option>
<option value="09:30" <? if($ayar['bahis_bitir']=="09:30") { echo "selected"; } ?>>09:30</option>
<option value="09:45" <? if($ayar['bahis_bitir']=="09:45") { echo "selected"; } ?>>09:45</option>
<option value="10:00" <? if($ayar['bahis_bitir']=="10:00") { echo "selected"; } ?>>10:00</option>
<option value="10:15" <? if($ayar['bahis_bitir']=="10:15") { echo "selected"; } ?>>10:15</option>
<option value="10:30" <? if($ayar['bahis_bitir']=="10:30") { echo "selected"; } ?>>10:30</option>
<option value="10:45" <? if($ayar['bahis_bitir']=="10:45") { echo "selected"; } ?>>10:45</option>
<option value="11:00" <? if($ayar['bahis_bitir']=="11:00") { echo "selected"; } ?>>11:00</option>
<option value="11:15" <? if($ayar['bahis_bitir']=="11:15") { echo "selected"; } ?>>11:15</option>
<option value="11:30" <? if($ayar['bahis_bitir']=="11:30") { echo "selected"; } ?>>11:30</option>
<option value="11:45" <? if($ayar['bahis_bitir']=="11:45") { echo "selected"; } ?>>11:45</option>
<option value="12:00" <? if($ayar['bahis_bitir']=="12:00") { echo "selected"; } ?>>12:00</option>
<option value="12:15" <? if($ayar['bahis_bitir']=="12:15") { echo "selected"; } ?>>12:15</option>
<option value="12:30" <? if($ayar['bahis_bitir']=="12:30") { echo "selected"; } ?>>12:30</option>
<option value="12:45" <? if($ayar['bahis_bitir']=="12:45") { echo "selected"; } ?>>12:45</option>
<option value="13:00" <? if($ayar['bahis_bitir']=="13:00") { echo "selected"; } ?>>13:00</option>
<option value="13:15" <? if($ayar['bahis_bitir']=="13:15") { echo "selected"; } ?>>13:15</option>
<option value="13:30" <? if($ayar['bahis_bitir']=="13:30") { echo "selected"; } ?>>13:30</option>
<option value="13:45" <? if($ayar['bahis_bitir']=="13:45") { echo "selected"; } ?>>13:45</option>
<option value="14:00" <? if($ayar['bahis_bitir']=="14:00") { echo "selected"; } ?>>14:00</option>
<option value="14:15" <? if($ayar['bahis_bitir']=="14:15") { echo "selected"; } ?>>14:15</option>
<option value="14:30" <? if($ayar['bahis_bitir']=="14:30") { echo "selected"; } ?>>14:30</option>
<option value="14:45" <? if($ayar['bahis_bitir']=="14:45") { echo "selected"; } ?>>14:45</option>
<option value="never" <? if($ayar['bahis_bitir']=="never") { echo "selected"; } ?>><?=getTranslation('sistemackapat4')?></option>
<option value="00" <? if($ayar['bahis_bitir']=="00") { echo "selected"; } ?>><?=getTranslation('sistemackapat5')?></option>
</select>
</td>
</tr>

<tr>
<td><?=getTranslation('sistemackapat6')?></td>
<td>
<select class="inputCombo choiceChosen" style="width: 195px; height:30px;" name="bahis_basla">
<option value="00:00" <? if($ayar['bahis_basla']=="00:00") { echo "selected"; } ?>>00:00</option>
<option value="00:15" <? if($ayar['bahis_basla']=="00:15") { echo "selected"; } ?>>00:15</option>
<option value="00:30" <? if($ayar['bahis_basla']=="00:30") { echo "selected"; } ?>>00:30</option>
<option value="00:45" <? if($ayar['bahis_basla']=="00:45") { echo "selected"; } ?>>00:45</option>
<option value="01:00" <? if($ayar['bahis_basla']=="01:00") { echo "selected"; } ?>>01:00</option>
<option value="01:15" <? if($ayar['bahis_basla']=="01:15") { echo "selected"; } ?>>01:15</option>
<option value="01:30" <? if($ayar['bahis_basla']=="01:30") { echo "selected"; } ?>>01:30</option>
<option value="01:45" <? if($ayar['bahis_basla']=="01:45") { echo "selected"; } ?>>01:45</option>
<option value="02:00" <? if($ayar['bahis_basla']=="02:00") { echo "selected"; } ?>>02:00</option>
<option value="02:15" <? if($ayar['bahis_basla']=="02:15") { echo "selected"; } ?>>02:15</option>
<option value="02:30" <? if($ayar['bahis_basla']=="02:30") { echo "selected"; } ?>>02:30</option>
<option value="02:45" <? if($ayar['bahis_basla']=="02:45") { echo "selected"; } ?>>02:45</option>
<option value="03:00" <? if($ayar['bahis_basla']=="03:00") { echo "selected"; } ?>>03:00</option>
<option value="03:15" <? if($ayar['bahis_basla']=="03:15") { echo "selected"; } ?>>03:15</option>
<option value="03:30" <? if($ayar['bahis_basla']=="03:30") { echo "selected"; } ?>>03:30</option>
<option value="03:45" <? if($ayar['bahis_basla']=="03:45") { echo "selected"; } ?>>03:45</option>
<option value="04:00" <? if($ayar['bahis_basla']=="04:00") { echo "selected"; } ?>>04:00</option>
<option value="04:15" <? if($ayar['bahis_basla']=="04:15") { echo "selected"; } ?>>04:15</option>
<option value="04:30" <? if($ayar['bahis_basla']=="04:30") { echo "selected"; } ?>>04:30</option>
<option value="04:45" <? if($ayar['bahis_basla']=="04:45") { echo "selected"; } ?>>04:45</option>
<option value="05:00" <? if($ayar['bahis_basla']=="05:00") { echo "selected"; } ?>>05:00</option>
<option value="05:15" <? if($ayar['bahis_basla']=="05:15") { echo "selected"; } ?>>05:15</option>
<option value="05:30" <? if($ayar['bahis_basla']=="05:30") { echo "selected"; } ?>>05:30</option>
<option value="05:45" <? if($ayar['bahis_basla']=="05:45") { echo "selected"; } ?>>05:45</option>
<option value="06:00" <? if($ayar['bahis_basla']=="06:00") { echo "selected"; } ?>>06:00</option>
<option value="06:15" <? if($ayar['bahis_basla']=="06:15") { echo "selected"; } ?>>06:15</option>
<option value="06:30" <? if($ayar['bahis_basla']=="06:30") { echo "selected"; } ?>>06:30</option>
<option value="06:45" <? if($ayar['bahis_basla']=="06:45") { echo "selected"; } ?>>06:45</option>
<option value="07:00" <? if($ayar['bahis_basla']=="07:00") { echo "selected"; } ?>>07:00</option>
<option value="07:15" <? if($ayar['bahis_basla']=="07:15") { echo "selected"; } ?>>07:15</option>
<option value="07:30" <? if($ayar['bahis_basla']=="07:30") { echo "selected"; } ?>>07:30</option>
<option value="07:45" <? if($ayar['bahis_basla']=="07:45") { echo "selected"; } ?>>07:45</option>
<option value="08:00" <? if($ayar['bahis_basla']=="08:00") { echo "selected"; } ?>>08:00</option>
<option value="08:15" <? if($ayar['bahis_basla']=="08:15") { echo "selected"; } ?>>08:15</option>
<option value="08:30" <? if($ayar['bahis_basla']=="08:30") { echo "selected"; } ?>>08:30</option>
<option value="08:45" <? if($ayar['bahis_basla']=="08:45") { echo "selected"; } ?>>08:45</option>
<option value="09:00" <? if($ayar['bahis_basla']=="09:00") { echo "selected"; } ?>>09:00</option>
<option value="09:15" <? if($ayar['bahis_basla']=="09:15") { echo "selected"; } ?>>09:15</option>
<option value="09:30" <? if($ayar['bahis_basla']=="09:30") { echo "selected"; } ?>>09:30</option>
<option value="09:45" <? if($ayar['bahis_basla']=="09:45") { echo "selected"; } ?>>09:45</option>
<option value="10:00" <? if($ayar['bahis_basla']=="10:00") { echo "selected"; } ?>>10:00</option>
<option value="10:15" <? if($ayar['bahis_basla']=="10:15") { echo "selected"; } ?>>10:15</option>
<option value="10:30" <? if($ayar['bahis_basla']=="10:30") { echo "selected"; } ?>>10:30</option>
<option value="10:45" <? if($ayar['bahis_basla']=="10:45") { echo "selected"; } ?>>10:45</option>
<option value="11:00" <? if($ayar['bahis_basla']=="11:00") { echo "selected"; } ?>>11:00</option>
<option value="11:15" <? if($ayar['bahis_basla']=="11:15") { echo "selected"; } ?>>11:15</option>
<option value="11:30" <? if($ayar['bahis_basla']=="11:30") { echo "selected"; } ?>>11:30</option>
<option value="11:45" <? if($ayar['bahis_basla']=="11:45") { echo "selected"; } ?>>11:45</option>
<option value="12:00" <? if($ayar['bahis_basla']=="12:00") { echo "selected"; } ?>>12:00</option>
<option value="12:15" <? if($ayar['bahis_basla']=="12:15") { echo "selected"; } ?>>12:15</option>
<option value="12:30" <? if($ayar['bahis_basla']=="12:30") { echo "selected"; } ?>>12:30</option>
<option value="12:45" <? if($ayar['bahis_basla']=="12:45") { echo "selected"; } ?>>12:45</option>
<option value="13:00" <? if($ayar['bahis_basla']=="13:00") { echo "selected"; } ?>>13:00</option>
<option value="13:15" <? if($ayar['bahis_basla']=="13:15") { echo "selected"; } ?>>13:15</option>
<option value="13:30" <? if($ayar['bahis_basla']=="13:30") { echo "selected"; } ?>>13:30</option>
<option value="13:45" <? if($ayar['bahis_basla']=="13:45") { echo "selected"; } ?>>13:45</option>
<option value="14:00" <? if($ayar['bahis_basla']=="14:00") { echo "selected"; } ?>>14:00</option>
<option value="14:15" <? if($ayar['bahis_basla']=="14:15") { echo "selected"; } ?>>14:15</option>
<option value="14:30" <? if($ayar['bahis_basla']=="14:30") { echo "selected"; } ?>>14:30</option>
<option value="14:45" <? if($ayar['bahis_basla']=="14:45") { echo "selected"; } ?>>14:45</option>
<option value="never" <? if($ayar['bahis_basla']=="never") { echo "selected"; } ?>><?=getTranslation('sistemackapat4')?></option>
<option value="24" <? if($ayar['bahis_basla']=="24") { echo "selected"; } ?>><?=getTranslation('sistemackapat5')?></option>
</select>
</td>
</tr>

<tr>
<td colspan="2">
<div class="notice info">
<ul class="list-unordered list-checked2">
<li><?=getTranslation('sistemackapat7')?> <strong style="font-weight:bold;color:#f00"><?=getTranslation('sistemackapat8')?></strong> <?=getTranslation('sistemackapat9')?></li>
<li><?=getTranslation('sistemackapat10')?> <strong style="font-weight:bold;color:#f00"><?=getTranslation('sistemackapat11')?></strong> <?=getTranslation('sistemackapat12')?></li>
<li><?=getTranslation('sistemackapat13')?></li>
<li><?=getTranslation('sistemackapat14')?></li>
<li><?=getTranslation('sistemackapat15')?></li>
<li><?=getTranslation('sistemackapat16')?></li>
</ul>
</div>
</td>
</tr>

<tr>
<td class="last" colspan="2">
<input type="button" class="btn btn-large btn-primary2" style="width:100%;" value="<?=getTranslation('sistemackapat17')?>" id="kaydet">
</td>
</tr>
<input type="hidden" name="securecode" value="<?= base64_encode(time()); ?>">
</form>
<script>
$(document).ready(function (e) {
$("#kaydet").click(function (e) {
self.document.newu.submit();
});
});
</script>
</tbody>
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