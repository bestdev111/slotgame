<?
session_start(); ob_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); die(); exit(); }
if($ub['wkdurum']!="0" || $ub['alt_durum']<1) { 
header("Location:index.php");
exit();
}
if($ub['adminpanel']=="1") { header("Location:admin"); }

if(gd('islem')=="disariat"){
	$fark = time()-101;
	$sorgu = sed_sql_query("UPDATE kullanici SET atdisari='1',sonislem='".$fark."' WHERE id ='".gd('id')."'")or die(sed_sql_error());
	if($sorgu){
		$onaylandi = 1;
	}else{
		$onaylandi = 2;
	}
}


?>
<? include 'header.php'; ?>
<? include 'menu.php'; ?>

<script>
$("#sistemdekiler2").addClass("activemnuitems");
</script>

<div id="main" class="lwkSelector" style="width: 758px;">
<div id="live">
<div class="space_20"></div>
<div class="main_space" id="main_wide">
<div class="z-right-container" id="maskcontainer">

<? if($onaylandi==1) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('sistemdekiler1')?></div>
<? } else if($onaylandi==2) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('sistemdekiler2')?></div>
<? } ?>


<div id="sistemdekiler"></div>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<script>
var xhr;
function loadall() {
$("#loadall").show();
$("body").css('overflow','hidden');
}
function loadexit() {
$("#loadall").hide();
$("body").css('overflow','auto');
}
setInterval(function() { 
sistemdekilergetir();
},10000);
function sistemdekilergetir() {
xhr = $.ajax({
	url: '../ajax_players.php?a=sistemdekiler',
	success: function(data) {
	$("#sistemdekiler").html(data); loadexit();
	}
	});
}
$(document).ready(function(e) {
sistemdekilergetir();
});


</script>

<? include 'footer.php'; ?>

</body>
</html>