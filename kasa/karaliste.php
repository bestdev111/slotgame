<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); exit(); }

?>
<?php include 'header.php'; ?>

<main class="main">
<ol class="breadcrumb mb-0">
<li class="breadcrumb-item"><?=getTranslation('superadmin91')?></li>
</ol>

<div class="alert alert-danger mb-0" id="error"></div>
<div class="alert alert-info mb-0" id="info"></div>
<div class="alert alert-success mb-0" id="success"></div>

<div class="container-fluid mt-2">
<div class="row">
<div class="card">
<div class="card-header"> <?=getTranslation('superadmin91')?> </div>
<div class="card-block p-0">
<div class="table-responsive">
<table class="table table-striped mb-0">
<thead>
<tr>
<th style="width: 5%"><?=getTranslation('superadmin45')?></th>
<th style="width: 35%"><?=getTranslation('superadmin52')?></th>
<th style="width: 30%"><?=getTranslation('superadmin60')?></th>
<th style="width: 15%"><?=getTranslation('superadmin54')?></th>
<th style="width: 15%"><?=getTranslation('superadmin61')?></th>
</tr>
</thead>
<tbody>

<?
$sor = sed_sql_query("select * from kullanici where hesap_sahibi_id='".$ub['id']."' and root='1' order by id asc");
while($row=sed_sql_fetcharray($sor)) {
$toplams_limit = bilgi("SELECT SUM(CASE WHEN id!='' THEN alt_sinir END) as toplam_limit FROM kullanici WHERE hesap_sahibi_id='$row[id]' and root='1'");
?>

<tr>
<td>
<div style="min-width:200px">
<a href="#" class="btn btn-success m-0 customer-payin" onclick="kullanicigerigetir(<?=$row['id'];?>);"><i class="fa fa-level-up"></i> <?=getTranslation('superadmin92')?></a>
</div>
</td>
<td><?=$row["username"]?> <br><font style="color:#f00;font-weight:500;"><?=getTranslation('superadmin93')?></font></td>
<td><?=$row["hatirlatmaad"]?></td>
<td><a href = "<?=$Adres?>/kupon-sorgula/<?=$row["id"]?>" class="btn btn-success btn-xs">KB<?=$row["id"]?></a></td>
<td><code><?=getTranslation('superadmin65')?>:<?=$row["alt_sinir"]?></code><br><code><?=getTranslation('superadmin66')?>:<?=$row["alt_sinir"]-$toplams_limit["toplam_limit"];?></code></td>
</tr>

<? } ?>

</tbody>
<tr>
<td colspan="9">
<ul class="pagination"></ul>
</td>
</tr>

</table>
</div>
</div>
</div>
</div>
</div>
</main>

<script>
function kullanicigerigetir(id) {
$('#success').hide();
$('#error').hide();
$('#info').show().html('<?=getTranslation('superadmin94')?>');

$.ajax({
url: "index.php?s=userediting",
type: "POST",
data: "islem=karalistepostgerigetir&id="+id+"",
success: function(data) {

if(data==22) {
	$('#info').hide();
	$('#success').hide();
	$('#error').show().html("<?=getTranslation('superadmin95')?>");
} else if(data==23) {
	$('#info').hide();
	$('#success').hide();
	$('#error').show().html("Limit Hatası Limitiniz Yetersiz!");
} else {
	$('#info').hide();
	$('#success').show().html("<?=getTranslation('superadmin96')?>");
	$('#error').hide();
	setTimeout(function(){location.href="karaliste.php", 3000});  
}

}
});

}
</script>

<?php include 'footer.php'; ?>

</body>
</html>