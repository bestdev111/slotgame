<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); exit(); }

?>
<?php include 'header.php'; ?>

<main class="main">
<ol class="breadcrumb mb-0">
<li class="breadcrumb-item"><?=getTranslation('superadmin97')?></li>
</ol>

<div class="alert alert-danger mb-0" id="error"></div>
<div class="alert alert-info mb-0" id="info"></div>
<div class="alert alert-success mb-0" id="success"></div>

<div class="container-fluid mt-2">
<div class="row">
<div class="card">
<div class="card-header"><?=getTranslation('superadmin97')?> <a href="javascript:void(0);" onclick="tableToExcel('table', 'Excel')">( <?=getTranslation('superadmin98')?> )</a></div>
<div class="card-block p-0">

<div class="table-responsive">
<table id="table" class="table mb-0">
<thead>
<tr>
<th><?=getTranslation('superadmin99')?></th>
<th><?=getTranslation('superadmin100')?></th>
<th><?=getTranslation('superadmin101')?></th>
<th><?=getTranslation('superadmin36')?></th>
</tr>
</thead>
<tbody>
<?
$bayilerinibul = benimbayilerim($ub['id']);
$pageper = 15;
$gelen_sayfa = (isset($_GET['sayfa']) && $_GET['sayfa'] !='' ) ? intval($_GET['sayfa']) : 1;
$limit = $pageper;
$s_s = 10;
$s_sor = sed_sql_query("select count(id) from hesap_hareket_gecici where user_id in ($bayilerinibul)") or trigger_error(sed_sql_error(),E_USER_ERROR);
$satir = sed_sql_result($s_sor,0);
sed_sql_freeresult($s_sor);
if($satir >0){
$baslama = ($gelen_sayfa > 1) ? (($gelen_sayfa -1) * $limit) : 0 ;
$sayfa_kac = $satir/$limit;
$sayfa_sayisi = ($satir % $limit != 0) ? intval($sayfa_kac)+1 : intval($sayfa_kac);
$basla=( $satir >= $baslama ) ? $baslama : 0 ;
unset( $sayfa_kac, $baslama );
$sor = sed_sql_query("select * from hesap_hareket_gecici where user_id in ($bayilerinibul) order by zaman desc limit $basla,$limit");
$i=1;
$style='';
while($ass=sed_sql_fetcharray($sor)) {
?>
<tr class="table-<? if($ass['tip']=="ekle"){ ?>success<? } else if($ass['tip']=="cikar"){ ?>danger<? } ?>">
<td><span class="tag tag-default"><?=getTranslation('superadmin102')?></span> <span class="tag tag-<? if($ass['tip']=="ekle"){ ?>success<? } else if($ass['tip']=="cikar"){ ?>danger<? } ?>"><? if($ass['tip']=="ekle"){ ?><?=getTranslation('superadmin103')?><? } else if($ass['tip']=="cikar"){ ?><?=getTranslation('superadmin104')?><? } ?></span></td>
<td><code>KB<?=$ass["user_id"];?></code> <?=$ass["username"];?> </td>
<td>
<? if($ass['tip']=="ekle"){ ?>
<code><?=$ass["onceki_tutar"];?></code> + <code><?=$ass["tutar"];?></code> = <code><?=$ass["tutar"]+$ass["onceki_tutar"];?></code>
<? } else if($ass['tip']=="cikar"){ ?>
<code><?=$ass["onceki_tutar"];?></code> - <code><?=$ass["tutar"];?></code> = <code><?=$ass["onceki_tutar"]-$ass["tutar"];?></code>
<? } ?>
</td>
<td><span title="" data-toggle="tooltip" data-original-title="0 Dakika önce"><?=date("d-m-Y H:i:s",$ass['zaman']);?></span></td>
</tr>
<?
$style = ($style=='') ? '2' : '';
$i++;
}
?>

</tbody>
<tfoot>

<? 
$hangi_sayfa= ($gelen_sayfa > 0)? $gelen_sayfa : 1 ;
?>
<tr>
<td colspan="4" class="text-xs-center">
<?
$alt= ($gelen_sayfa - $s_s);
if($sayfa_sayisi <= $s_s || $gelen_sayfa <= $s_s ) {$alt=1;} 
$ust= (($gelen_sayfa + $s_s)< $sayfa_sayisi ) ? ($gelen_sayfa + $s_s) : ($sayfa_sayisi);	
if($gelen_sayfa > 1 ){ ?>

<a class="btn btn-info m-0" href="limitlog.php?sayfa=1"><?=getTranslation('ajaxtumkuponlarim30');?></a>

<a class="btn btn-info m-0" href="limitlog.php?sayfa=<?=$_GET['sayfa']-1;?>" id="sayfaveri">« <?=getTranslation('ajaxtumkuponlarim31');?></a>

<? } ?>
<?
for($i=$alt; $i<=$ust ;$i++){
if($i != $gelen_sayfa ){ ?>
<a class="btn btn-info m-0" href="limitlog.php?sayfa=<?=$i;?>" id="sayfaveri"><?=$i;?></a>
<? } else { ?>
<span class="btn btn-info m-0" style="background-color: #11c540;border-color: #11c540;"><?=$i;?></span>
<? } ?>
<? } if($gelen_sayfa < $sayfa_sayisi){ ?>

<a class="btn btn-info m-0" href="limitlog.php?sayfa=<?=$_GET['sayfa']+1;?>" id="sayfaveri"><?=getTranslation('ajaxtumkuponlarim32');?> »</a>

<a class="btn btn-info m-0" href="limitlog.php?sayfa=<?=$sayfa_sayisi;?>" id="sayfaveri"><?=getTranslation('ajaxtumkuponlarim33');?></a>

<? } ?>
</td>
</tr>

</tfoot>
<? } else { ?>
<tr class="no-records-found"><td colspan="5"><?=getTranslation('superadmin46')?></td></tr>
<? } ?>
</table>
</div>
</div>
</div>
</div>
</div>
</main>
<script type="text/javascript">
var tableToExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById(table)
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
    window.location.href = uri + base64(format(template, ctx))
  }
})()
</script>

<?php include 'footer.php'; ?>

</body>
</html>