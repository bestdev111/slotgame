<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); die(); exit(); }
if($ub['alt_durum']<1 && $ub['wkyetki']<1 && $ub['alt_alt_durum']<1 && $ub['sahip']=="0") { header("Location:index.php"); }
if($ub['adminpanel']=="1") { header("Location:admin"); }
rebuild($ub['id']);

?>
<?php include 'header.php'; ?>
<main class="main">
<ol class="breadcrumb mb-0">
<li class="breadcrumb-item"><?=getTranslation('yeniyerler_kasa182')?></li>
</ol>

<div class="container-fluid mt-2">
<div class="row">
<div class="row">
<div class="col-sm-12">
<div class="card">


<div class="card-header"><font style="float: left;margin-top: 7px;margin-right: 7px;"><?=getTranslation('ajaxoyunturleri1')?></font>

<select style="float: left;width:60%;" class="form-control" onChange="oyunturleri_canli($(this).val());">
<option value="1"><?=getTranslation('ajaxoyunturleri7')?></option>
<option value="2"><?=getTranslation('ajaxoyunturleri8')?></option>
<option value="3"><?=getTranslation('ajaxoyunturleri9')?></option>
<option value="4"><?=getTranslation('ajaxoyunturleri10')?></option>
<option value="5"><?=getTranslation('ajaxoyunturleri11')?></option>
<option value="6"><?=getTranslation('yeniyerler_kasa179')?></option>
</select>

</div>


<div class="card-block">
<div class="form-group" style="display: block;float: left;width: 100%;border-bottom: 1px solid #e4e5e6;">
<label for="" style="width: 50%;float: left;margin-top: 7px;"><?=getTranslation('ajaxoyunturleri2')?></label>
<div class="input-group" style="width: 50%;float: right;">
<div class="switch" style="width: 50%;float: left;text-align: left;"><?=getTranslation('ajaxoyunturleri3')?></div>
<div class="switch" style="width: 50%;float: left;text-align: left;"><?=getTranslation('ajaxoyunturleri4')?></div>
</div>
</div>

<div id="oyunturleri_canli"></div>

</div>
</div>
</div>
</div>
</div>
</div>

</main>

<input type="hidden" id="order" value="username">
<input type="hidden" id="ascdesc" value="asc">
<input type="hidden" id="defotime" value="<?=$ub['id']; ?>">

<script>
function oyunturleri_canli(tip) {
var rand = Math.random();
$.get('../ajax_superadmin.php?a=oyun_turleri_canli&tip='+tip+'&rand='+rand+'',function(data) { 
$("#oyunturleri_canli").html(data);
});	
}
$(document).ready(function(e) {
oyunturleri_canli(1);
});
</script>
<?php include 'footer.php'; ?>

</body>
</html>