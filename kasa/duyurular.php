<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:login.php"); die(); exit(); }
if($ub['alt_durum']<1) { header("Location:index.php"); }

if(isset($_GET['s'])) {
$id = str_replace('idbulamazki','',base64_decode(gd("s")));
$bilgi = bilgi("select * from duyurular where id='$id'");
if($bilgi['user_id']==$ub['id']) { sed_sql_query("delete from duyurular where id='$id'"); } else { $onaylandi = 4; }
$onaylandi = 3;
}

if(isset($_POST['submit'])){
$mesaj = pd("mesaj");
$yayin = 1;
$zaman = time();

if($ub['id']=="1") {
	$user_profil = "Patron";
} else if($ub['alt_durum']>0 && $ub['alt_alt_durum']<1) {
	$user_profil = "Admin";
} else if($ub['alt_alt_durum']>0 && $ub['sahip']<1) {
	$user_profil = "Super Admin";
} else if($ub['sahip']>0) {
	$user_profil = "Joker Admin";
}

if(strlen($mesaj)>5) {

	sed_sql_query("INSERT INTO duyurular SET user_id='".$ub['id']."', username='".$ub['username']."', yayin='".$yayin."', mesaj = '".$mesaj."', zaman = '".$zaman."', user_profil = '".$user_profil."'");
	
	$onaylandi = 1;

} else {
	$onaylandi = 2;
}

}
?>
<?php include 'header.php'; ?>

<main class="main">
<ol class="breadcrumb mb-0">
<li class="breadcrumb-item"><?=getTranslation('yeniyerler_kasa34')?></li>
</ol>

<? if($onaylandi==1) { ?>
<div class="alert alert-success mb-0" id="success" style="display:block;"><?=getTranslation('playersduyurular1')?></div>
<? } else if($onaylandi==2) { ?>
<div class="alert alert-danger mb-0" id="error" style="display:block;"><?=getTranslation('playersduyurular2')?></div>
<? } else if($onaylandi==3) { ?>
<div class="alert alert-success mb-0" id="success" style="display:block;"><?=getTranslation('playersduyurular3')?></div>
<? } else if($onaylandi==4) { ?>
<div class="alert alert-info mb-0" id="info" style="display:block;"><?=getTranslation('yeniyerler_kasa355')?></div>
<? } ?>


<div class="container-fluid mt-2">
<div class="row">
<div class="row">

<div class="container-fluid mt-2">
<div class="row">
<div class="card">

<div class="card-header font-weight-bold"><?=getTranslation('playersduyurular5')?></div>
<div class="card-block">
<div class="row">
<form method="post">
<div class="form-group col-sm-12">
<label for="" style="float: left;margin-right: 10px;margin-top: 7px;"><?=getTranslation('playersduyurular6')?> :</label>
<input type="text" class="form-control" style="width: 75%;float: left;" name="mesaj" size="40" maxlength="255">
<button style="float: left;margin-top: 2px;" type="submit" class="btn btn-link btn-sm" name="submit"><?=getTranslation('playersduyurular7')?></button>
</div>
</form>

</div>
</div>
</div>
</div>
</div>
</div>



<div class="card">
<div class="card-block p-0">
<div class="table-responsive">
<table class="table mb-0 table-hover">
<thead>
<tr>
<th><?=getTranslation('playersduyurular8')?></th>
<th style="text-align:center;"><?=getTranslation('playersduyurular9')?></th>
<th width="24" style="text-align:center;"><?=getTranslation('bakiyeisleeylem')?></th>
</tr>
</thead>
<tbody>

<?
$sor = sed_sql_query("select * from duyurular where user_id='$ub[id]'");
while($row=sed_sql_fetcharray($sor)) {
?>

<tr style="font-weight:bold;">
<td><?=$row['mesaj']; ?></td>
<td style="text-align:center;"><?=date("d.m.Y H:i",$row['zaman']); ?></td>
<td width="24" style="text-align:center;">
<a class="grid" href="duyurular.php?s=<?=base64_encode("idbulamazki".$row['id']."");?>" title="<?=getTranslation('playersduyurular11')?>"><img src="/players/img/delete.png" alt="<?=getTranslation('playersduyurular11')?>" border="0"></a>
</td>
</tr>

<? } ?>

</tbody>
</table>
</div>
</div>
</div>

</div>
</div>
</div>
</main>

<?php include 'footer.php'; ?>

</body>
</html>