<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:login.php"); exit(); }
?>
<?php include 'header.php'; ?>

<div id="page1" class="page top">
<div class="scroll_container" style="min-height: 311px;">
<div class="scroll_wrapper" style="padding-top: 44px; padding-bottom: 44px;">
<div class="appcontent">
<div>  </div>

<div id="loadresultstipler"></div>

<div class="contentbottom hidden"> </div>
<div class="hidden">  </div>
<div class="spacer">&nbsp;</div>
</div>
</div>
</div>
</div>

<script>
function loadtipler() {
$.get('export.php?a=results',function(data) {
$("#loadresultstipler").html(data);
});
}
loadtipler();
</script>
</div>
</div>

<?php include 'footer.php'; ?>

</body>
</html>