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
<div>
<div class="bartitle iconbar information"> <div class="text"><?=getTranslation('mobilsupport1')?></div></div>
<div class="barmiddle arrow iconbar help" onclick="getle('help')"> <div class="text"><?=getTranslation('mobilsupport2')?></div></div>
<div class="barmiddle arrow iconbar terms" onclick="getle('betting-glossary')"> <div class="text"><?=getTranslation('mobilsupport3')?></div></div>
<div class="barmiddle arrow iconbar contact" onclick="getle('contact')"> <div class="text"><?=getTranslation('mobilsupport4')?></div></div>
</div>
<div class="contentbottom hidden"> </div>
<div class="spacer">&nbsp;</div>
</div>
</div>
</div>
</div>

<?php include 'footer.php'; ?>

</body>
</html>