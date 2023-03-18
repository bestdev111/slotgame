<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:login.php"); exit(); }
?>
<?php include 'header.php'; ?>

<style type="text/css">
@keyframes hello {
  0% {
    opacity: 0.1;
  }
  50% {
	opacity: 999.9;
  }
  100% {
    opacity: 0.1;
  }
}
</style>

<div id="page1" class="page top">
<div class="scroll_container" onscroll="scrollActions(this, true)">
<div class="scroll_wrapper" style="padding-top: 44px; padding-bottom: 44px;">
<div class="appcontent">
<div class="bartitle iconbar mydetails"> <div class="icon hidden"></div><div class="text"><?=getTranslation('mobilmesajlistesi_2')?></div></div>
<div>

<?
$sor = sed_sql_query("select * from kullanici where (hesap_sahibi_id='$ub[id]' or id='$ub[hesap_sahibi_id]') and root='0' order by alt_alt_durum desc, username asc");

while($row=sed_sql_fetcharray($sor)) {
$sonislem = time()-$row['sonislem'];
$mesajvarmi = sed_sql_numrows(sed_sql_query("select okundu,alan_id,gonderen_id from chat where alan_id='$ub[id]' and gonderen_id='$row[id]' and okundu='0'"));

?>

<div class="barmiddle">
<div class="text">
<?=$row['username']; ?> <? if($mesajvarmi>0) { ?><span style="background-color: #f74835;border: none;color: white;padding: 5px;text-align: center;text-decoration: none;display: inline-block;font-size: 13px;margin: 4px 2px;animation: hello 1.5s ease-in-out infinite;"><?=getTranslation('mesajpaneli3')?></span><? } ?>
</div>
<div class="value pr_7"><a style="text-decoration: none;" href="messages?id=<?=$row['id'];?>"><?=getTranslation('mesajpaneli5')?></a></div>
</div>

<? } ?>


</div>
<div class="contentbottom hidden"> </div>
<div class="spacer">&nbsp;</div>
</div>
</div></div>
</div>

<script>
function hesabim(){
$.get('',function(data) {
$("#kupons").html(data);
});
}
hesabim();
</script>

<?php include 'footer.php'; ?>

</body>
</html>