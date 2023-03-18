<?php
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
canlimasateniskademe = '".$liveOddsHC."',
ayar_id = '".$ub['id']."'");

} else {

sed_sql_query("update sistemayar set 
canlifutbolkademe = '".$liveOddsFC."',
canlibasketbolkademe = '".$liveOddsBC."',
canliteniskademe = '".$liveOddsTC."',
canlivoleybolkademe = '".$liveOddsVC."',
canlibuzhokeyikademe = '".$liveOddsBBC."',
canlimasateniskademe = '".$liveOddsHC."'
where ayar_id='".$ub['id']."'");	

}

$onaylandi = 1;

}

$ayarbilgisi_ver = bilgi("select * from sistemayar where ayar_id='".$ub['id']."'");

?>
<?php include 'header.php'; ?>

<main class="main">
<ol class="breadcrumb mb-0">
<li class="breadcrumb-item">Toplu Oran Değişimi</li>
</ol>

<div class="container-fluid mt-2">
<div class="row">
<div class="row">

<div class="col-sm-12">
<div class="card">
<div class="card-header">CANLI ORANMETRE AYARLARI KADEME ' Lİ</div>
<div class="card-block">

<? if($onaylandi==1) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('playersoranmetre1')?></div>
<? } ?>

<form method="post" name="newu">


<div class="form-group">
<label for="">CANLI FUTBOL ORAN ARTTIR/AZALT :</label>
<div class="input-group">
<select name="liveOddsFC" class="form-control">
<option value="0" <? if($ayarbilgisi_ver['canlifutbolkademe']==0){ ?>selected<? } ?>><?=getTranslation('playersoranmetre11')?></option>
<option value="1" <? if($ayarbilgisi_ver['canlifutbolkademe']==1){ ?>selected<? } ?>><?=getTranslation('playersoranmetre12')?></option>
<option value="2" <? if($ayarbilgisi_ver['canlifutbolkademe']==2){ ?>selected<? } ?>><?=getTranslation('playersoranmetre13')?></option>
<option value="3" <? if($ayarbilgisi_ver['canlifutbolkademe']==3){ ?>selected<? } ?>><?=getTranslation('playersoranmetre14')?></option>
</select>
</div>
</div>

<div class="form-group">
<label for="">CANLI BASKETBOL ORAN ARTTIR/AZALT :</label>
<div class="input-group">
<select name="liveOddsBC" class="form-control">
<option value="0" <? if($ayarbilgisi_ver['canlibasketbolkademe']==0){ ?>selected<? } ?>><?=getTranslation('playersoranmetre11')?></option>
<option value="1" <? if($ayarbilgisi_ver['canlibasketbolkademe']==1){ ?>selected<? } ?>><?=getTranslation('playersoranmetre12')?></option>
<option value="2" <? if($ayarbilgisi_ver['canlibasketbolkademe']==2){ ?>selected<? } ?>><?=getTranslation('playersoranmetre13')?></option>
<option value="3" <? if($ayarbilgisi_ver['canlibasketbolkademe']==3){ ?>selected<? } ?>><?=getTranslation('playersoranmetre14')?></option>
</select>
</div>
</div>

<div class="form-group">
<label for="">CANLI TENİS ORAN ARTTIR/AZALT :</label>
<div class="input-group">
<select name="liveOddsTC" class="form-control">
<option value="0" <? if($ayarbilgisi_ver['canliteniskademe']==0){ ?>selected<? } ?>><?=getTranslation('playersoranmetre11')?></option>
<option value="1" <? if($ayarbilgisi_ver['canliteniskademe']==1){ ?>selected<? } ?>><?=getTranslation('playersoranmetre12')?></option>
<option value="2" <? if($ayarbilgisi_ver['canliteniskademe']==2){ ?>selected<? } ?>><?=getTranslation('playersoranmetre13')?></option>
<option value="3" <? if($ayarbilgisi_ver['canliteniskademe']==3){ ?>selected<? } ?>><?=getTranslation('playersoranmetre14')?></option>
</select>
</div>
</div>

<div class="form-group">
<label for="">CANLI VOLEYBOL ORAN ARTTIR/AZALT :</label>
<div class="input-group">
<select name="liveOddsVC" class="form-control">
<option value="0" <? if($ayarbilgisi_ver['canlivoleybolkademe']==0){ ?>selected<? } ?>><?=getTranslation('playersoranmetre11')?></option>
<option value="1" <? if($ayarbilgisi_ver['canlivoleybolkademe']==1){ ?>selected<? } ?>><?=getTranslation('playersoranmetre12')?></option>
<option value="2" <? if($ayarbilgisi_ver['canlivoleybolkademe']==2){ ?>selected<? } ?>><?=getTranslation('playersoranmetre13')?></option>
<option value="3" <? if($ayarbilgisi_ver['canlivoleybolkademe']==3){ ?>selected<? } ?>><?=getTranslation('playersoranmetre14')?></option>
</select>
</div>
</div>

<div class="form-group">
<label for="">CANLI BUZ HOKEYİ ORAN ARTTIR/AZALT :</label>
<div class="input-group">
<select name="liveOddsBBC" class="form-control">
<option value="0" <? if($ayarbilgisi_ver['canlibuzhokeyikademe']==0){ ?>selected<? } ?>><?=getTranslation('playersoranmetre11')?></option>
<option value="1" <? if($ayarbilgisi_ver['canlibuzhokeyikademe']==1){ ?>selected<? } ?>><?=getTranslation('playersoranmetre12')?></option>
<option value="2" <? if($ayarbilgisi_ver['canlibuzhokeyikademe']==2){ ?>selected<? } ?>><?=getTranslation('playersoranmetre13')?></option>
<option value="3" <? if($ayarbilgisi_ver['canlibuzhokeyikademe']==3){ ?>selected<? } ?>><?=getTranslation('playersoranmetre14')?></option>
</select>
</div>
</div>

<div class="form-group">
<label for="">CANLI MASA TENİS ORAN ARTTIR/AZALT :</label>
<div class="input-group">
<select name="liveOddsHC" class="form-control">
<option value="0" <? if($ayarbilgisi_ver['canlimasateniskademe']==0){ ?>selected<? } ?>><?=getTranslation('playersoranmetre11')?></option>
<option value="1" <? if($ayarbilgisi_ver['canlimasateniskademe']==1){ ?>selected<? } ?>><?=getTranslation('playersoranmetre12')?></option>
<option value="2" <? if($ayarbilgisi_ver['canlimasateniskademe']==2){ ?>selected<? } ?>><?=getTranslation('playersoranmetre13')?></option>
<option value="3" <? if($ayarbilgisi_ver['canlimasateniskademe']==3){ ?>selected<? } ?>><?=getTranslation('playersoranmetre14')?></option>
</select>
</div>
</div>

</div>

<tr>
<td style="text-align:center;" colspan="2">
<input class="btn btn-large btn-primary" type="submit" name="submit" style="width:100%;" value="<?=getTranslation('playersoranmetre9')?>" autocomplete="off">
</td>
</tr>
</div>
</div>
</form>



</div>
</div>
</div>
</main>

<?php include 'footer.php'; ?>

</body>
</html>