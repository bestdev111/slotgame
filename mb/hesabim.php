<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:login.php"); exit(); }
?>
<?php include 'header.php'; ?>

<div id="page1" class="page top">
<div class="scroll_container" onscroll="scrollActions(this, true)">
<div class="scroll_wrapper" style="padding-top: 44px; padding-bottom: 44px;">
<div class="appcontent">
<div></div>
<div class="hidden">  </div>
<div class="accountOverview">
<div class="bartitle iconbar konto table">
<div class="row"><div class="text column">( <?=$ub['username'];?> / <?=$ub['id'];?> )</div></div>
<?
$loginsor = sed_sql_query("select * from login_data WHERE login_user='".$ub['username']."' ORDER BY id desc LIMIT 1");
$loginrow = sed_sql_fetcharray($loginsor);
?>
<div class="row"> <div class="lastLogin column"><?=getTranslation('songiris')?>: <?=date("d-m-Y H:i",$loginrow['zaman']);?></div></div>
</div>
<div class="barmiddle arrow iconbar account" onclick="getle('statement')"> <div class="text"><?=getTranslation('mobilhesabim1')?></div><div class="value pr_7"><?=nf($ub['bakiye']); ?></div></div>
<div class="barmiddle arrow preload2 iconbar tickets" onclick="getle('betdetails')"><div class="text"><?=getTranslation('mobilhesabim2')?></div> </div>
<div class="barmiddle arrow preload2 iconbar personal" onclick="getle('personalDetails')"><div class="text"><?=getTranslation('mobilhesabim3')?></div></div>
<div class="barmiddle arrow iconbar messages  " onclick="getle('messageslist')"><div class="text"><?=getTranslation('mobilhesabim4')?> </div></div>
<div class="barmiddle arrow iconbar settings" onclick="getle('preferences')"><div class="text"><?=getTranslation('mobilhesabim5')?></div></div>
<div class="barmiddle arrow preload2 iconbar security" onclick="getle('changePassword')"><div class="text"><?=getTranslation('mobilhesabim6')?></div></div>
<div class="barbottom arrow iconbar logout" onclick="getle('logout')"><div class="text"><?=getTranslation('mobilhesabim7')?></div></div>
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