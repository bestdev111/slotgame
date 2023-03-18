<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:login.php"); exit(); }
?>
<?php include 'header.php'; ?>
<script>$("#baslikdivi").html('<span><?=getTranslation('mobilcontact1')?></span>');</script>
<div id="page1" class="page top">
<div class="scroll_container" onscroll="scrollActions(this, true)">
<div class="scroll_wrapper" style="padding-top: 44px; padding-bottom: 44px;">
<div class="appcontent">
<div class="hidden"></div>
<div class="hidden"></div>
<div class="hidden"></div>
<div><div class="bartitle iconbar contact"><div class="text"><?=getTranslation('mobilcontact1')?></div></div></div>
<div>
<div class="">
<div class="space_2">&nbsp;</div>
<div class="msgtext msgtextbg scrollTo" onclick="">
<div class="icons msg_warning"></div>
<div class="text"><?=getTranslation('mobilcontact2')?></div>
<div class="clear"></div>
<div class="text normal"> </div>
</div>
<div class=""></div>
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