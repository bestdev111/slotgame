<?
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); die(); exit(); }

// POST BAŞLANGIÇ //
if(isset($_POST['submit'])){

$herkupon_sms = $_POST["yazici"];
$yazici_tip = $_POST["yazicitip"];
$yazdirsor = $_POST["yazdirsor"];
$ayar_sekil = $_POST["ayar_sekil"];
$kesinti_goster = $_POST["kesintigoster"];
$ciktimesaj = $_POST["ciktimesaj"];

sed_sql_query("update kullanici set herkupon_sms = '".$herkupon_sms."',yazici_tip = '".$yazici_tip."',yazdirsor = '".$yazdirsor."',ayar_sekil = '".$ayar_sekil."',kesinti_goster = '".$kesinti_goster."',ciktimesaj = '".$ciktimesaj."' where id='".$ub['id']."'");
header("Refresh:0");
$onaylandi = 1;
}

?>
<? include 'header.php'; ?>
<? include 'menu.php'; ?>
<script>$("#yaziciayar").addClass("activemnuitems");</script>
<script type="text/javascript" src="/players/js/colorbox-min.js?v=3.4.8"></script>
<script type="text/javascript">
function TicketPreView(){
var template =$('#tickettemplate').val();
$.colorbox({
title:'Kupon Teması...',
photo:true,
href:'/players/img/print/tic_'+template+'.png',
overlayClose:false
});
}

function TicketPreViewTermal(){
$.colorbox({
title:'Termal Kupon Teması...',
photo:true,
href:'/players/img/print/tic_termal.png',
overlayClose:false
});
}

function moddegis(val){
if(val=="2"){
$('#stilid1').hide();
$('#stilid2').show();
$('#termalim').show();
} else if(val=="1"){
$('#stilid1').show();
$('#stilid2').hide();
$('#termalim').hide();
}
}
</script>

<div id="main" class="lwkSelector" style="width: 786px;">
<div id="live">
<div class="space_20"></div>
<div class="main_space" id="main_wide">
<div class="z-right-container" id="maskcontainer">

<? if($onaylandi==1) { ?>
<script>alert('<?=getTranslation('yaziciayar37')?>');</script>
<? } ?>

<form method="post" class="form">
<table class="tablesorter">
<thead>
<tr>
<th colspan="2"><?=getTranslation('yaziciayar1')?></th>
</tr>
</thead>
<tbody>
<tr>
<td width="200"><?=getTranslation('yaziciayar2')?></td>
<td>
<select class="inputCombo chosen chzn-done" onchange="moddegis(this.value);" name="yazici" style="width: 215px;">
<option value="1" <? if($ub['herkupon_sms']=="1") { echo "selected"; } ?>><?=getTranslation('yaziciayar3')?></option>
<option value="2" <? if($ub['herkupon_sms']=="2") { echo "selected"; } ?>><?=getTranslation('yaziciayar4')?></option>
</select>
&nbsp;&nbsp;&nbsp;

<a id="termalim" style="<? if($ub['herkupon_sms']=="1") { ?>display:none;<? } ?>" class="grid" href="javascript:TicketPreViewTermal();void(0);" title="Önizleme">
<img src="/players/img/print/img.png" alt="Önizleme" border="0">
</a>

</td>
</tr>


<tr id="stilid2" style="<? if($ub['herkupon_sms']=="1") { ?>display:none;<? } ?>">
<td width="200"><?=getTranslation('yaziciayar5')?></td>
<td><span class="itext-2"> <?=getTranslation('yaziciayar6')?></span></td>
</tr>

<tr id="stilid1" style="<? if($ub['herkupon_sms']=="2") { ?>display:none;<? } ?>">
<td width="200"><?=getTranslation('yaziciayar5')?></td>
<td>
<select class="inputCombo chosen chzn-done" name="yazicitip" style="width: 215px;" id="tickettemplate">
<option value="1" <? if($ub['yazici_tip']=="1") { echo "selected"; } ?>><?=getTranslation('yaziciayar38')?></option>
<option value="2" <? if($ub['yazici_tip']=="2") { echo "selected"; } ?>><?=getTranslation('yaziciayar39')?></option>
<option value="3" <? if($ub['yazici_tip']=="3") { echo "selected"; } ?>><?=getTranslation('yaziciayar40')?></option>
<option value="4" <? if($ub['yazici_tip']=="4") { echo "selected"; } ?>><?=getTranslation('yaziciayar41')?></option>
<option value="5" <? if($ub['yazici_tip']=="5") { echo "selected"; } ?>><?=getTranslation('yaziciayar42')?></option>
<option value="6" <? if($ub['yazici_tip']=="6") { echo "selected"; } ?>><?=getTranslation('yaziciayar43')?></option>
<option value="7" <? if($ub['yazici_tip']=="7") { echo "selected"; } ?>><?=getTranslation('yaziciayar44')?></option>
<option value="8" <? if($ub['yazici_tip']=="8") { echo "selected"; } ?>><?=getTranslation('yaziciayar45')?></option>
<option value="9" <? if($ub['yazici_tip']=="9") { echo "selected"; } ?>><?=getTranslation('yaziciayar46')?></option>
<option value="10" <? if($ub['yazici_tip']=="10") { echo "selected"; } ?>><?=getTranslation('yaziciayar47')?></option>
</select>
&nbsp;&nbsp;&nbsp;
<a class="grid" href="javascript:TicketPreView();void(0);" title="Önizleme">
<img src="/players/img/print/img.png" alt="Önizleme" border="0">
</a>
</td>
</tr>


<tr>
<td width="200"><?=getTranslation('yaziciayar13')?></td>
<td>
<select class="inputCombo chosen chzn-done" style="width: 215px;" name="yazdirsor">
<option value="0" <? if($ub['yazdirsor']=="0") { echo "selected"; } ?>><?=getTranslation('yaziciayar14')?></option>
<option value="1" <? if($ub['yazdirsor']=="1") { echo "selected"; } ?>><?=getTranslation('yaziciayar15')?></option>
</select>
<span class="itext-2"><?=getTranslation('yaziciayar16')?></span>
</td>
</tr>
<tr>
<td width="200"><?=getTranslation('yaziciayar17')?></td>
<td>
<select class="inputCombo chosen chzn-done" style="width: 215px;" name="ayar_sekil">
<option value="1" <? if($ub['ayar_sekil']=="1") { echo "selected"; } ?>><?=getTranslation('yaziciayar18')?></option>
<option value="2" <? if($ub['ayar_sekil']=="2") { echo "selected"; } ?>><?=getTranslation('yaziciayar19')?></option>
</select>
<span class="itext-2"> <?=getTranslation('yaziciayar20')?></span>
</td>
</tr>
<tr>
<td width="200"><?=getTranslation('yaziciayar21')?></td>
<td>
<select class="inputCombo chosen chzn-done" name="kesintigoster" style="width: 215px;">
<option value="1" <? if($ub['kesinti_goster']=="1") { echo "selected"; } ?>><?=getTranslation('yaziciayar22')?></option>
<option value="2" <? if($ub['kesinti_goster']=="2") { echo "selected"; } ?>><?=getTranslation('yaziciayar23')?></option>
</select>
<span class="itext-2"> <?=getTranslation('yaziciayar24')?></span>
</td>
</tr>
<tr>
<td width="200"><?=getTranslation('yaziciayar25')?></td>
<td>
<input class="inputText" type="text" name="ciktimesaj" style="width: 98%" size="40" maxlength="60" placeholder="<?=getTranslation('yaziciayar26')?>" value="<?=$ub['ciktimesaj'];?>">
</td>
</tr>
<tr>
<td class="last" colspan="2">
<input class="btn btn-large btn-primary" type="submit" name="submit" value="<?=getTranslation('yaziciayar48')?>">
</td>
</tr>
</tbody>
</table>
</form>

<table class="tablesorter">
<tbody><tr>
<th><?=getTranslation('yaziciayar29')?></th>
</tr>
<tr>
<td></td>
</tr>
<tr>
<td>
<div class="notice info">
<ul class="list-unordered list-checked2">
<li><?=getTranslation('yaziciayar30')?></li>
<li><?=getTranslation('yaziciayar31')?></li>
<li><?=getTranslation('yaziciayar32')?></li>
<li><?=getTranslation('yaziciayar33')?></li>
<li><?=getTranslation('yaziciayar34')?></li>
<li><?=getTranslation('yaziciayar35')?></li>
<li><?=getTranslation('yaziciayar36')?></li>
</ul>
</div>
</td>
</tr>
</tbody></table>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>



<div id="cboxOverlay" style="display: none;"></div>
<div id="colorbox" class="" style="display: none;"><div id="cboxWrapper"><div><div id="cboxTopLeft" style="float: left;"></div><div id="cboxTopCenter" style="float: left;"></div><div id="cboxTopRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxMiddleLeft" style="float: left;"></div><div id="cboxContent" style="float: left;"><div id="cboxLoadedContent" style="width: 0px; height: 0px; overflow: hidden; float: left;"></div><div id="cboxLoadingOverlay" style="float: left;"></div><div id="cboxLoadingGraphic" style="float: left;"></div><div id="cboxTitle" style="float: left;"></div><div id="cboxCurrent" style="float: left;"></div><div id="cboxNext" style="float: left;"></div><div id="cboxPrevious" style="float: left;"></div><div id="cboxSlideshow" style="float: left;"></div><div id="cboxClose" style="float: left;"></div></div><div id="cboxMiddleRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxBottomLeft" style="float: left;"></div><div id="cboxBottomCenter" style="float: left;"></div><div id="cboxBottomRight" style="float: left;"></div></div></div><div style="position: absolute; width: 9999px; visibility: hidden; display: none;"></div></div>

<? include '../footer.php'; ?>

</body>
</html>