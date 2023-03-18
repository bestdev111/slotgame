<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:login.php"); die(); exit(); }
?>
<?php include 'header.php'; ?>

<main class="main">
<ol class="breadcrumb mb-0">
<li class="breadcrumb-item"><?=getTranslation('mesajpaneli2')?></li>
</ol>

<div class="alert alert-danger mb-0" id="error"></div>
<div class="alert alert-info mb-0" id="info"></div>
<div class="alert alert-success mb-0" id="success"></div>

<div class="container-fluid mt-2">
<div class="row">
<div class="card">
<div class="card-header"> <?=getTranslation('mesajpaneli2')?> </div>
<div class="card-block p-0">
<div class="table-responsive">
<table class="table table-striped mb-0">
<thead>
<tr>
<th style="width: 10%"><?=getTranslation('superadmin45')?></th>
<th style="width: 40%"><?=getTranslation('superadmin52')?></th>
<th style="width: 40%"><?=getTranslation('superadmin53')?></th>
<th style="width: 15%"><?=getTranslation('superadmin54')?></th>
</tr>
</thead>
<tbody>

<?
$sor = sed_sql_query("select * from kullanici where (hesap_sahibi_id='$ub[id]' or id='$ub[hesap_sahibi_id]') and root='0' order by alt_alt_durum desc, username asc");
while($row=sed_sql_fetcharray($sor)) {
$sonislem = time()-$row['sonislem'];
$mesajvarmi = sed_sql_numrows(sed_sql_query("select okundu,alan_id,gonderen_id from chat where alan_id='$ub[id]' and gonderen_id='$row[id]' and okundu='0'"));
?>

<tr>
<td>
<div style="min-width:200px">
<a href="mesaj.php?id=<?=$row['id'];?>" class="btn btn-info m-0" title="<?=getTranslation('mesajpaneli5')?>"><?=getTranslation('mesajpaneli5')?></a>
</div>
</td>
<td><?=$row['username']; ?> <? if($mesajvarmi>0) { ?><span style="background-color: #f74835;border: none;color: white;padding: 4px 4px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;animation: hello 1.5s ease-in-out infinite;"><?=getTranslation('mesajpaneli3')?></span><? } ?> <? if($sonislem<60) { ?><br><span><?=getTranslation('mesajpaneli4')?></span><? } ?></td>


<td>
<? if($row['id']==$ub['hesap_sahibi_id']){ ?>
<font style="color:#f00;font-weight:bold;"><?=getTranslation('superadmin55')?></font>
<? } else { ?>
<? if($ub['wkyetki']==1){ ?>
<font style="color:#000;font-weight:bold;"><?=getTranslation('yeniyerler_kasa381')?></font>
<? } else if($ub['alt_durum']==1 && $ub['alt_alt_durum']==0){ ?>
<font style="color:#000;font-weight:bold;"><?=getTranslation('yeniyerler_kasa382')?></font>
<? } else { ?>
<font style="color:#000;font-weight:bold;"><?=getTranslation('superadmin56')?></font>
<? } ?>
<? } ?>
</td>


<td><a href="javascript:;" class="btn btn-success btn-xs">KB<?=$row["id"]?></a></td>
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

<?php include 'footer.php'; ?>

</body>
</html>