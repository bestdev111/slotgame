<?php
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
<?php include 'header.php'; ?>

<main class="main">
<ol class="breadcrumb mb-0">
<li class="breadcrumb-item"><?=getTranslation('menusistemackapat')?></li>
</ol>

<? if($onaylandi==1) { ?>
<div class="alert alert-success mb-0" id="success" style="display:block;"><?=getTranslation('yaziciayar37')?></div>
<? } ?>

<div class="container-fluid mt-2">
<div class="row">
<div class="col-sm-12">
<div class="card">
<div class="card-header font-weight-bold"><?=getTranslation('ayardosyasi25')?></div>
<div class="card-block">
<div class="row">
<div style="margin-bottom: 0;" class="form-group col-sm-12"><label for=""><?=getTranslation('sistemackapat7')?> <strong style="font-weight:bold;color:#f00"><?=getTranslation('sistemackapat8')?></strong> <?=getTranslation('sistemackapat9')?></label></div>
<div style="margin-bottom: 0;" class="form-group col-sm-12"><label for=""><?=getTranslation('sistemackapat10')?> <strong style="font-weight:bold;color:#f00"><?=getTranslation('sistemackapat11')?></strong> <?=getTranslation('sistemackapat12')?></label></div>
<div style="margin-bottom: 0;" class="form-group col-sm-12"><label for=""><?=getTranslation('sistemackapat13')?></label></div>
<div style="margin-bottom: 0;" class="form-group col-sm-12"><label for=""><?=getTranslation('sistemackapat14')?></label></div>
<div style="margin-bottom: 0;" class="form-group col-sm-12"><label for=""><?=getTranslation('sistemackapat15')?></label></div>
<div style="margin-bottom: 0;" class="form-group col-sm-12"><label for=""><?=getTranslation('sistemackapat16')?></label></div>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="container-fluid mt-2">
<div class="row">
<div class="col-sm-12">
<div class="card">
<div class="card-block">
<div class="row">
<form method="post" class="form" name="newu">
<div class="form-group col-sm-6">
<label for=""><?=getTranslation('sistemackapat3')?></label>
<select class="form-control" name="bahis_bitir">
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
</div>
<div class="form-group col-sm-6">
<label for=""><?=getTranslation('sistemackapat6')?></label>
<select class="form-control" name="bahis_basla">
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
</div>
</div>
</div>
<div class="card-footer">
<button type="submit" name="submit" value="OK" id="kaydet" class="btn btn-link btn-sm"><?=getTranslation('sistemackapat17')?></button>
</div>
<input type="hidden" name="securecode" value="<?= base64_encode(time()); ?>">
</form>
</div>
</div>
</div>
</div>

<script>
$(document).ready(function (e) {
$("#kaydet").click(function (e) {
self.document.newu.submit();
});
});
</script>

<?php include 'footer.php'; ?>

</body>
</html>