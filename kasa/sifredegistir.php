<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); exit(); }

// POST BAŞLANGIÇ //
if(isset($_POST['submit'])){

if($ub["password"] != $_POST["eskiparola"]) {
$onaylandi = 3;
} else if($_POST["yeniparola"] != $_POST["yeniparola2"]) {
$onaylandi = 2;
} else if($_POST["yeniparola"] == $_POST["yeniparola2"]) {
$sifredegistir = $_POST["yeniparola2"];
sed_sql_query("update kullanici set password = '".$sifredegistir."' where id='".$ub['id']."'");
$onaylandi = 1;
}

}

?>
<? include 'header.php'; ?>

<main class="main">
<ol class="breadcrumb mb-0">
<li class="breadcrumb-item"><?=getTranslation('superadmin108')?></li>
</ol>

<? if($onaylandi==1) { ?>
<div class="alert alert-success mb-0" id="success" style="display:block;"><?=getTranslation('superadmin109')?></div>
<? } else if($onaylandi==2) { ?>
<div class="alert alert-info mb-0" id="info" style="display:block;"><?=getTranslation('superadmin110')?></div>
<? } else if($onaylandi==3) { ?>
<div class="alert alert-danger mb-0" id="error" style="display:block;"><?=getTranslation('superadmin111')?></div>
<? } ?>

<div class="container-fluid mt-2">

<div class="row">
<div class="card">
<div class="card-header font-weight-bold"><?=getTranslation('superadmin112')?></div>
<div class="card-block">
<div class="row">
<div class="form-group col-sm-6">
<label for=""><?=getTranslation('superadmin113')?></label>
<input type="text" name="title" value="<?=$site_adi;?>" class="form-control" disabled="">
</div>
<div class="form-group col-sm-6">
<label for=""><?=getTranslation('superadmin114')?></label>
<input type="text" name="url" value="https://<?=$ub['websitesi'];?>" class="form-control" disabled="">
</div>
</div>
</div>
<div class="card-footer">
<button type="submit" class="btn btn-link btn-sm"><?=getTranslation('superadmin115')?></button>
</div>
</div>
<form method="post" class="form">
<div class="card">
<div class="card-header font-weight-bold"><?=getTranslation('superadmin116')?></div>
<div class="card-block">
<div class="row">
<div class="form-group col-sm-3">
<label for=""><?=getTranslation('superadmin80')?></label>
<input type="text" name="username" class="form-control" required="" value="<?=$ub['username'];?>" disabled="">
</div>
<div class="form-group col-sm-3">
<label for=""><?=getTranslation('superadmin117')?></label>
<input type="password" name="eskiparola" id="eskiparola" class="form-control" required="">
</div>
<div class="form-group col-sm-3">
<label for=""><?=getTranslation('superadmin118')?></label>
<input type="password" name="yeniparola" name="yeniparola" class="form-control" required="">
</div>
<div class="form-group col-sm-3">
<label for=""><?=getTranslation('superadmin119')?></label>
<input type="password" name="yeniparola2" name="yeniparola2" class="form-control" required="">
</div>
</div>
</div>
<div class="card-footer">
<button type="submit" name="submit" value="OK" class="btn btn-link btn-sm"><?=getTranslation('superadmin120')?></button>
</div>
</div>
</form>
</div>
</div>
</main>

<?php include 'footer.php'; ?>

</body>
</html>