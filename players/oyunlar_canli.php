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
<script>$("#oyunlar_canli").addClass("activemnuitems");</script>

<div id="main" class="lwkSelector" style="width: 758px;">
<div id="live">
<div class="space_20"></div>
<div class="main_space" id="main_wide">
<div class="z-right-container" id="maskcontainer">

<table class="tablesorter">
<tbody><tr>
<th><font style="float:left;"><?=getTranslation('ajaxoyunturleri5')?></font> <font style="float:right;"><?=getTranslation('ajaxoyunturleri6')?> : 
<select class="inputCombo chosen" onChange="oyunturleri_canli($(this).val());">
<option value="1"><?=getTranslation('ajaxoyunturleri7')?></option>
<option value="2"><?=getTranslation('ajaxoyunturleri8')?></option>
<option value="3"><?=getTranslation('ajaxoyunturleri9')?></option>
<option value="4"><?=getTranslation('ajaxoyunturleri10')?></option>
<option value="5"><?=getTranslation('ajaxoyunturleri11')?></option>
<option value="6"><?=getTranslation('ajaxoyunturleri12')?></option>
</select>
</font></th>
</tr>
<tr>
<td>
<div class="notice info">
<ul class="list-unordered list-checked2">
<li><?=getTranslation('ajaxoyunturleri_canli1')?></li>
<li><?=getTranslation('ajaxoyunturleri_canli2')?></li>
<li><?=getTranslation('ajaxoyunturleri_canli3')?></li>
</ul>
</div>
</td>
</tr>
</tbody></table>


<div id="oyunturleri_canli"></div>

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
function oyunturleri_canli(tip) {
$("#oyunturleri_canli").html('<div id="delay_layer" class="overlay_layer"><div class="innerWrap"><div class="contentBlock"><div class="headline"><?=getTranslation('lutfen1')?> <span class="highlighted"><?=getTranslation('lutfen2')?></span></div><div class="bodyText"><?=getTranslation('lutfen3')?></div><div class="progressbar"><div class="progressbarInner"></div></div></div></div></div>');
var rand = Math.random();
$.get('../ajax_players.php?a=oyun_turleri_canli&tip='+tip+'&rand='+rand+'',function(data) { 
$("#oyunturleri_canli").html(data);
});	
}
$(document).ready(function(e) {
oyunturleri_canli(1);
});
</script>
<? include 'footer.php'; ?>

</body>
</html>