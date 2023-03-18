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
<div class="bartitle iconbar mydetails"> <div class="icon hidden"></div><div class="text"><?=getTranslation('mobilpersonaldetails1')?></div></div>
<div>
<div class="barmiddle"><div class="text"><?=getTranslation('mobilpersonaldetails2')?></div><div class="value pr_7"><?=$ub['username'];?></div></div>
<div class="barmiddle"><div class="text"><?=getTranslation('mobilpersonaldetails3')?></div><div class="value pr_7"><?=$ub['hatirlatmaad'];?></div></div>
<div class="barmiddle"><div class="text"><?=getTranslation('mobilpersonaldetails4')?></div><div class="value pr_7"><?=$ub['id'];?></div></div>
<div class="barmiddle"><div class="text"><?=getTranslation('mobilpersonaldetails5')?></div><div class="value pr_7"><?=getTranslation('mobilpersonaldetails13')?></div></div>
<div class="barbottom"><div class="text"><?=getTranslation('mobilpersonaldetails6')?></div><div class="value pr_7">--</div></div>
</div>
<div class="bartitle iconbar contactdetails">
<div class="icon hidden"></div>
<div class="text"><?=getTranslation('mobilpersonaldetails7')?></div>
</div>
<div><div class="barbottom"><div class="text"><?=getTranslation('mobilpersonaldetails8')?></div><div class="value pr_7">--</div></div></div>
<div><div class="barbottom"><div class="text"><?=getTranslation('mobilpersonaldetails9')?></div><div class="value pr_7">--</div></div></div>
<div><div class="barbottom"><div class="text"><?=getTranslation('mobilpersonaldetails10')?></div><div class="value pr_7">--</div></div></div>
<div><div class="barbottom"><div class="text"><?=getTranslation('mobilpersonaldetails11')?></div><div class="value pr_7"><?=getTranslation('mobilpersonaldetails12')?></div></div></div>
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