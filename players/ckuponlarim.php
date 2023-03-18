<?
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); die(); exit(); }
if(userayar('casino_yetki')<1) { header("Location:/players"); }
?>
<? include 'header.php'; ?>
<link rel="stylesheet" type="text/css" href="/casino/casino2.css?v=3.41.81597656120"/>
<? include 'menu.php'; ?>
<script>$("#ckuponlarim").addClass("activemnuitems");</script>

<div id="main" class="lwkSelector" style="width: 758px;">
<div id="live">
<div class="space_20"></div>
<div class="main_space" id="main_wide" style="margin-left: -20px;margin-top: -8px;">
<div id="comp-myContent" class="e_active e_noCache ">
<div id="mybettings" class="margin_r_12">
<div class="space_20"></div>
<div class="space clear"></div>
<div class="e_active e_noCache status"></div>
<div>

<table class="tab_box_2">
<tbody>	
<tr>
<td colspan="4" style="height: 32px;border: 1px solid #cccccc;width: 100%;display: block;">

<div class="tab_2_cont num_1" style="float:left">
<div class="drop_box" style="line-height: 25px;"><input type="text" class="inputText" placeHolder="<?=getTranslation('ajaxkupondegisim3')?>" id="k_kuponno" style="width: 70px;" size="4"></div>


<div class="drop_box">
<input type="text" style="width:58px;border: 1px solid #126f8e;line-height: 23px;" class="firstNameNew ng-invalid ng-invalid-required ng-valid-pattern ng-dirty placeholder tcal tcalInput" id="tarih1" name="tarih1" autocomplete="off" value="<?=date("d-m-Y",strtotime("-1 day")); ?>" size="7">
</div>

<div class="drop_box">
<input autocomplete="off" type="text" style="width:58px;border: 1px solid #126f8e;line-height: 23px;" class="firstNameNew ng-invalid ng-invalid-required ng-valid-pattern ng-dirty placeholder tcal tcalInput" id="tarih2" name="tarih2" value="<?=date("d-m-Y"); ?>" size="7">
</div>

<div class="drop_box">
<select class="inputCombo chosen" style="width: 100%;" id="k_durum">
<option value=""><?=getTranslation('selectoptionhepsi')?></option>
<option value="1"><?=getTranslation('selectoptionbekleyen')?></option>
<option value="2"><?=getTranslation('selectoptionkazanan')?></option>
<option value="3"><?=getTranslation('selectoptionkaybeden')?></option>
<option value="4"><?=getTranslation('selectoptioniptalolan')?></option>
<option value="5"><?=getTranslation('selectoptionodendi')?></option>
</select>
</div>

<div class="drop_box">
<select class="inputCombo chosen" style="width: 100%;" id="kupon_sure">
<option value="0"><?=getTranslation('selectoptiontumu')?></option>
<option value="1"><?=getTranslation('selectoptionson30dakika')?></option>
<option value="2"><?=getTranslation('selectoptionson1saat')?></option>
<option value="3"><?=getTranslation('selectoptionson3saat')?></option>
<option value="4"><?=getTranslation('selectoptionson6saat')?></option>
</select>	
</div>

<div class="drop_box" style="PADDING: 1px 10px 0px 10px;">
<button class="btn btn-primary" onclick="kupongetir(1,1);"><?=getTranslation('mobilara')?></button>
</div>

<input type="hidden" id="order" value="id">
<input type="hidden" id="ascdesc" value="desc">
<input type="hidden" id="suanval" value="1">

</div>
</td>
</tr>
</tbody>
</table>
</div>

<div class="space_9 clear"></div>
<div class="space_9 clear"></div>

<div id="kupons"></div>

<script>
var screenw = screen.width;

function kupongoruntulecasino(id) {
$("#kuponid_"+id+"").addClass('itext-0');
$("#cboxOverlay").css('display','block');

if(screenw>600) {
$(".kuponici").css('top','75px');
$(".kuponici").css('left','175px');
$(".kuponici").css('position','fixed');
$(".kuponici").css('width','993px');
$(".kuponici").css('height','400px');
$(".kuponici").css('overflow','hidden');
$(".kuponici").css('opacity','1');
$(".kuponici").css('cursor','auto');
} else {
$(".kuponici").css('top','150px');
$(".kuponici").css('width','993px');
$(".kuponici").css('height','400px');
$(".kuponici").css('overflow','hidden');
$(".kuponici").css('opacity','1');
$(".kuponici").css('cursor','auto');
}

$(".kuponici").css('display','block');
$(".kuponici").html('<div id="delay_layer" class="overlay_layer"><div class="innerWrap"><div class="contentBlock" style="border: dashed;border-color: #f74835;"><div class="headline"><?=getTranslation('lutfen1')?> <span class="highlighted"><?=getTranslation('lutfen2')?></span></div><div class="bodyText"><?=getTranslation('lutfen3')?></div><div class="progressbar"><div class="progressbarInner"></div></div></div></div></div>');
var rand = Math.random();
$.get('../ajax_players.php?a=kupondd&id='+id+'&rand='+rand+'',function(data) { $(".kuponici").html(data); });
}

function kupongoruntulerulet(id) {
$("#kuponid_"+id+"").addClass('itext-0');
$("#cboxOverlay").css('display','block');

if(screenw>600) {
$(".kuponici").css('top','75px');
$(".kuponici").css('left','175px');
$(".kuponici").css('position','fixed');
$(".kuponici").css('width','993px');
$(".kuponici").css('height','400px');
$(".kuponici").css('overflow','hidden');
$(".kuponici").css('opacity','1');
$(".kuponici").css('cursor','auto');
} else {
$(".kuponici").css('top','150px');
$(".kuponici").css('width','993px');
$(".kuponici").css('height','400px');
$(".kuponici").css('overflow','hidden');
$(".kuponici").css('opacity','1');
$(".kuponici").css('cursor','auto');
}

$(".kuponici").css('display','block');
$(".kuponici").html('<div id="delay_layer" class="overlay_layer"><div class="innerWrap"><div class="contentBlock" style="border: dashed;border-color: #f74835;"><div class="headline"><?=getTranslation('lutfen1')?> <span class="highlighted"><?=getTranslation('lutfen2')?></span></div><div class="bodyText"><?=getTranslation('lutfen3')?></div><div class="progressbar"><div class="progressbarInner"></div></div></div></div></div>');
var rand = Math.random();
$.get('../ajax_players.php?a=kuponddd&id='+id+'&rand='+rand+'',function(data) { $(".kuponici").html(data); });
}

function kuponkapat() {
$(".kuponici").html(''); 
$("#cboxOverlay").css('display','none');
$(".kuponici").css('display','none');
$("body").css('overflow','auto');	
}
function kuponkapat2() {
$(".kuponici2").html('');
$(".kuponici2").css('display','none');
$(".kupongoruntule1").css('display','block');
$(".kupongoruntule2").css('display','none');
$(".kuponici").css('display','block');
$("body").css('overflow','auto');	
}
$(document).ready(function(e) {
kupongetir(1,1);
});
function asdes(order,as) {
$("#order").val(order);	
$("#ascdesc").val(as);
$("#suanval").val(1);
kupongetir(1,1);
}
function kupongetir(val, sayfaveri) {
if(val=="1") {
$("#suanval").val(1);
$("#kupons").html('<div id="delay_layer" class="overlay_layer"><div class="innerWrap"><div class="contentBlock"><div class="headline"><?=getTranslation('lutfen1')?> <span class="highlighted"><?=getTranslation('lutfen2')?></span></div><div class="bodyText"><?=getTranslation('lutfen3')?></div><div class="progressbar"><div class="progressbarInner"></div></div></div></div></div>');
}
var kupon_no = $("#k_kuponno").val();
var tarih1 = $("#tarih1").val();
var tarih2 = $("#tarih2").val();
var durum = $("#k_durum").val();
var kupon_sure = $("#kupon_sure").val();
var rand = Math.random();
var order = $("#order").val();
var asde = $("#ascdesc").val();
var paging = $("#suanval").val();
$.get('../ajax_players.php?a=ckuponlarim&sayfa='+sayfaveri+'&rand='+rand+'&kupon_no='+kupon_no+'&tarih1='+tarih1+'&tarih2='+tarih2+'&durum='+durum+'&kupon_sure='+kupon_sure+'&order='+order+'&ascdesc='+asde+'',function(data) {  $("#kupons").html(data); loadexit(); });
}
function loadall() {
$("#loadall").show();
$("body").css('overflow','hidden');
}
function loadexit() {
$("#loadall").hide();
$("body").css('overflow','auto');
}

function checkShowTooltip(text,len){
	if(len == undefined)
		return true;
	if(!text)
		return false;
	var max = 0;
	var lines = jQuery("<div>"+text+"</div>").html().split(/<br[^>]*>/gi);
	for(i=0;i<lines.length;i++)
		max = Math.max(max,jQuery.trim(lines[i]).replace(/\s+/g, ' ').length);

	return max >= len;
}

function WatchCasinoVideo(id,round,video) {

$(".kupongoruntule2").css('display','block');
$(".kupongoruntule").css('display','none');

if(screenw>600) {
$(".kuponici2").css('padding-bottom','42px');
$(".kuponici2").css('padding-right','42px');
$(".kuponici2").css('top','75px');
$(".kuponici2").css('left','454px');
$(".kuponici2").css('position','fixed');
$(".kuponici2").css('width','400px');
$(".kuponici2").css('height','255px');
$(".kuponici2").css('overflow','hidden');
} else {
$(".kuponici2").css('top','150px');
$(".kuponici2").css('width','993px');
$(".kuponici2").css('height','400px');
$(".kuponici2").css('overflow','hidden');
$(".kuponici2").css('opacity','1');
$(".kuponici2").css('cursor','auto');
}

$(".kuponici").css('display','none');
$(".kuponici2").css('display','block');
$(".kuponici2").html('<div id="cboxWrapper" style="height: 256px;width: 400px;border: 20px #0009 solid;"><div style="clear: left;"><div id="cboxMiddleLeft" style=""></div><div id="cboxContent" style="float: left; width: 400px; height: 255px;"><div id="cboxLoadedContent" style="width: 400px;overflow: auto;height: 230px;"><div class="archive-player"><video class="is-playing" controls="" controlslist="nodownload" playsinline="" disablepictureinpicture="" style="width: 400px;height: 225px;" autoplay=""><source src="'+video+'" type="video/mp4"></video></div></div><div id="cboxLoadingOverlay" style="float: left; display: none;"></div><div id="cboxLoadingGraphic" style="float: left; display: none;"></div><div id="cboxTitle" style="float: left; display: block;">'+round+' <?=getTranslation('yeniyerler_kasa456')?>.</div><div id="cboxCurrent" style="float: left; display: none;"></div><div id="cboxNext" style="float: left; display: none;"></div><div id="cboxPrevious" style="float: left; display: none;"></div><div id="cboxSlideshow" style="float: left; display: none;"></div><div onclick="kuponkapat2();" id="cboxClose" style="float: left;"></div></div><div id="cboxMiddleRight" style="float: left; height: 255px;"></div></div><div style="clear: left;"><div id="cboxBottomLeft" style="float: left;"></div><div id="cboxBottomCenter" style="float: left; width: 400px;"></div><div id="cboxBottomRight" style="float: left;"></div></div></div>');
}
</script>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<? include '../footer.php'; ?>


</body>
</html>