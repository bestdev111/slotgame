<?
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:login.php"); die(); exit(); }
?>
<? include 'header.php'; ?>
<? include 'menu.php'; ?>
<script>$("#mesajlar").addClass("activemnuitems");</script>

<div id="main" class="lwkSelector" style="width: 758px;">
<div id="live">
<div class="space_20"></div>
<div class="main_space" id="main_wide">
<div class="z-right-container" id="maskcontainer">

<table class="tablesorter">
<thead>
<tr>
<th><?=getTranslation('mesajpaneli2')?></th>
<th width="24"></th>
</tr>
</thead>
<tbody>
<?
$sor = sed_sql_query("select * from kullanici where (hesap_sahibi_id='$ub[id]' or id='$ub[hesap_sahibi_id]') and root='0' order by alt_alt_durum desc, username asc");

while($row=sed_sql_fetcharray($sor)) {
$sonislem = time()-$row['sonislem'];
$mesajvarmi = sed_sql_numrows(sed_sql_query("select okundu,alan_id,gonderen_id from chat where alan_id='$ub[id]' and gonderen_id='$row[id]' and okundu='0'"));

?>

<tr style="font-weight:bold;">
<td><?=$row['username']; ?> <? if($mesajvarmi>0) { ?><span style="background-color: #f74835;border: none;color: white;padding: 4px 4px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;animation: hello 1.5s ease-in-out infinite;"><?=getTranslation('mesajpaneli3')?></span><? } ?> <? if($sonislem<60) { ?><span><?=getTranslation('mesajpaneli4')?></span><? } ?></td>
<td width="24">
<div class="ticket_button_flex big_but big_font">
<a class="roll_red" href="mesaj.php?id=<?=$row['id'];?>"><?=getTranslation('mesajpaneli5')?></a>
</div>
</td>
</tr>

<? } ?>

</tbody>
</table>

<table class="tablesorter">
<tbody><tr>
<th><?=getTranslation('mesajpaneli6')?></th>
</tr>
<tr>
<td></td>
</tr>
<tr>
<td>
<div class="notice info">
<ul class="list-unordered list-checked2">
<li><?=getTranslation('mesajpaneli7')?></li>
<li><?=getTranslation('mesajpaneli8')?> <font style="color:#f00;font-weight:bold;"><?=getTranslation('mesajpaneli5')?></font> <?=getTranslation('mesajpaneli9')?></li>
<li><?=getTranslation('mesajpaneli10')?></li>
<li><?=getTranslation('mesajpaneli11')?></li>
</ul>
</div>
</td>
</tr>
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

<? include '../footer.php'; ?>

</body>
</html>