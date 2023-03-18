<?
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:../login.php"); die(); exit(); }
if($ub['alt_durum']<1 && $ub['wkyetki']<1 && $ub['alt_alt_durum']<1 && $ub['sahip']=="0") { header("Location:index.php"); }
if($ub['adminpanel']=="1") { header("Location:admin"); }

?>
<? include 'header.php'; ?>
<? include 'menu.php'; ?>
<script>$("#karaliste").addClass("activemnuitems");</script>

<div id="main" class="lwkSelector" style="width: 758px;">
<div id="live">
<div class="space_20"></div>
<div class="main_space" id="main_wide">
<div class="z-right-container" id="maskcontainer">

<? if(isset($_GET['aktif'])) { ?>

<div class="infomsg"><?=getTranslation('karaliste1')?><br></div>

<? } if(isset($_GET['hata'])) { ?>

<div class="infomsg"><?=getTranslation('karaliste2')?><br></div>

<? } ?>


<div id="users"></div>

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
function karaliste(id) {
//loadgir('users');
var rand = Math.random();
var order = $("#order").val();
var ascdesc = $("#ascdesc").val();
$.get('../ajax_players.php?a=karaliste&id='+id+'&rand='+rand+'&order='+order+'&ascdesc='+ascdesc+'',function(data) { 
$("#users").html(data);
});	
}
$(document).ready(function(e) {
karaliste('<?=$ub['id']; ?>');
});
</script>
<? include 'footer.php'; ?>

</body>
</html>