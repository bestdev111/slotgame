<?
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); die(); exit(); }
if($ub['alt_durum']<1 && $ub['wkyetki']<1 && $ub['alt_alt_durum']<1 && $ub['sahip']=="0") { header("Location:index.php"); }
if($ub['adminpanel']=="1") { header("Location:admin"); }
rebuild($ub['id']);

?>
<? include 'header.php'; ?>
<? include 'menu.php'; ?>
<script>$("#canlibahisler").addClass("activemnuitems");</script>

<div id="main" class="lwkSelector" style="width: 758px;">
<div id="live">
<div class="space_20"></div>
<div class="main_space" id="main_wide">
<div class="z-right-container" id="maskcontainer">


<div id="bahisler"></div>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<input type="hidden" id="order" value="username">
<input type="hidden" id="ascdesc" value="asc">
<input type="hidden" id="defotime" value="<?=$ub['id']; ?>">

<script>
function canlimaclist(val) {
var rand = Math.random();
var reqs = $.ajax({
url: '../ajax_players.php?a=canlibahisler&rand=' + rand,
error: function (data) {
},
success: function (data) {
$("#bahisler").html(data);
},
timeout: 10000
});
}
$(document).ready(function(e) {
canlimaclist(1);
});
</script>
<? include 'footer.php'; ?>

</body>
</html>