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
<div class="html">
<div id="terms" style="">
<br>
<h2 class="h1"><?=getTranslation('mobilinformation1')?>:</h2>
<br>
<div class="cms_richtext">
<div id="agb">
<div class="macro bg_grey main_space">
<div class="space">&nbsp;</div>
<ul><li><a href="#agb_I"><?=getTranslation('mobilinformation2')?></a></li></ul>
<div class="space">&nbsp;</div>
</div>
<div class="hr line_grey">&nbsp;</div>
<div class="space">&nbsp;</div>
<div class="space">&nbsp;</div>
<div class="macro main_space">
<a name="agb_I"></a>
<h3><strong><?=getTranslation('mobilinformation2')?></strong></h3>
<ol>
<br>
<li><?=getTranslation('mobilinformation3')?></li>
<li><?=getTranslation('mobilinformation4')?></li>
<li><?=getTranslation('mobilinformation5')?></li>
<li><?=getTranslation('mobilinformation6')?></li>
<li><?=getTranslation('mobilinformation7')?></li>
<li><?=getTranslation('mobilinformation8')?></li>
<li><?=getTranslation('mobilinformation9')?></li>
<li><?=getTranslation('mobilinformation10')?></li>
</ol>
</div>
<div class="space clear">&nbsp;</div>
</div>
</div>

</div>
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