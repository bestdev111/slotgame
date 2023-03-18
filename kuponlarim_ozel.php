<?php
session_start();
include 'db.php';
if($ub['wkyetki']<2) { header("Location:kasa"); }
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:login.php"); die(); exit(); }
?>
<script>
function drop_menue(id){
jQuery("#menue_" + id).slideToggle("fast");
}
function close_menue(id){
jQuery("#" + id).mouseleave(function() {
jQuery("#menue_" + id).hide();
});
}
</script>
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/jquery-ui-1.8.21.custom.min.js"></script>
<script src="js/mousehold.js"></script>
<link rel="stylesheet" type="text/css" href="assets/css/css2.css">
<? include 'header.php'; ?>
<link rel="stylesheet" type="text/css" href="assets/YhgdfAS/YhgdfAS.css?v=3.4.8"/>
<script type="text/javascript" src="assets/YhgdfAS/YhgdfAS.js?v=3.4.8"></script>
<script>
var A_TCALCONF={'cssprefix':'tcal','months':['<?=getTranslation('tarihsecmeay_1');?>','<?=getTranslation('tarihsecmeay_2');?>','<?=getTranslation('tarihsecmeay_3');?>','<?=getTranslation('tarihsecmeay_4');?>','<?=getTranslation('tarihsecmeay_5');?>','<?=getTranslation('tarihsecmeay_6');?>','<?=getTranslation('tarihsecmeay_7');?>','<?=getTranslation('tarihsecmeay_8');?>','<?=getTranslation('tarihsecmeay_9');?>','<?=getTranslation('tarihsecmeay_10');?>','<?=getTranslation('tarihsecmeay_11');?>','<?=getTranslation('tarihsecmeay_12');?>'],'weekdays':['<?=getTranslation('tarihsecmegun_kisa_1');?>','<?=getTranslation('tarihsecmegun_kisa_2');?>','<?=getTranslation('tarihsecmegun_kisa_3');?>','<?=getTranslation('tarihsecmegun_kisa_4');?>','<?=getTranslation('tarihsecmegun_kisa_5');?>','<?=getTranslation('tarihsecmegun_kisa_6');?>','<?=getTranslation('tarihsecmegun_kisa_7');?>'],'longwdays':['<?=getTranslation('tarihsecmegun_1');?>','<?=getTranslation('tarihsecmegun_2');?>','<?=getTranslation('tarihsecmegun_3');?>','<?=getTranslation('tarihsecmegun_4');?>','<?=getTranslation('tarihsecmegun_5');?>','<?=getTranslation('tarihsecmegun_6');?>','<?=getTranslation('tarihsecmegun_7');?>'],'yearscroll':true,'weekstart':0,'prevyear':'Previous Year','nextyear':'Next Year','prevmonth':'Previous Month','nextmonth':'Next Month','format':'d-m-Y'};
</script>
<style>
.zindexyukselt {
    z-index: 33 !important;
}
#ui-datepicker-div .ui-state-hover a, .ui-state-hover a:hover, #ui-datepicker-div .ui-state-hover a:link, #ui-datepicker-div .ui-state-hover a:visited, #ui-datepicker-div .ui-state-active, #ui-datepicker-div .ui-widget-content .ui-state-active, #ui-datepicker-div .ui-widget-header .ui-state-active, #ui-datepicker-div .ui-state-active a, #ui-datepicker-div .ui-state-active a:link, #ui-datepicker-div .ui-state-active a:visited {
    color: #f74835 !important;
    border: 1px solid #fbd850;
    background: #fff url(players/img/ui-bg_glass_65_ffffff_1x400.png) 50% 50% repeat-x;
    font-weight: bold;
}
</style>
<div id="content" class="left">

<div id="main_wide">
<div class="e_active e_noCache " id="comp-myContent">
<div id="mybettings" class="margin_r_12">
<div class="space_20"></div>
<div class="space clear"></div>
<div class="e_active e_noCache status" id="_common_errorMessage"></div>
<div>
<div>
<table class="tab_box_2">
<tbody>
<tr>
<td id="sayi_7_durum" class="tab_2_select on"><a href="javascript:;" onclick="kupon_islem(7);"><?=getTranslation('kuponlarimozel1')?></a></td>
<td id="sayi_8_durum" class="tab_2_select"><a href="javascript:;" onclick="kupon_islem(8);"><?=getTranslation('kuponlarimozel2')?></a></td>
<td id="sayi_9_durum" class="tab_2_select"><a href="javascript:;" onclick="kupon_islem(9);"><?=getTranslation('kuponlarimozel3')?></a></td>
<td id="sayi_10_durum" class="tab_2_select"><a href="javascript:;" onclick="kupon_islem(10);"><?=getTranslation('kuponlarimozel4')?></a></td>
<td id="sayi_11_durum" class="tab_2_select"><a href="javascript:;" onclick="kupon_islem(11);"><?=getTranslation('kuponlarimozel5')?></a></td>
<td class="tab_2_empty">&nbsp;</td>
</tr>
<tr>
<td colspan="6" style="height: 32px; border: 1px solid #cccccc;">
<div class="tab_2_cont num_1" style="float:left'">
<div class="drop_box">
<div class="drop_layer" id="drop_layer">
<div id="drop_1" class="box_main left button_drop grey" onclick="drop_menue('drop_1');" onmouseout="close_menue('drop_1')">
<div id="ust_tarafi_aciklama" class="drop_title"><?=getTranslation('kuponlarimozel6')?></div>

<div class="drop_down">
<div class="hide" id="menue_drop_1" style="display: none;">
<div><a class="grey" href="javascript:;" onclick="kupon_islem(1);"><?=getTranslation('kuponlarimozel6')?></a></div>
<div><a class="grey" href="javascript:;" onclick="kupon_islem(2);"><?=getTranslation('kuponlarimozel7')?></a></div>
<div><a class="grey" href="javascript:;" onclick="kupon_islem(3);"><?=getTranslation('kuponlarimozel8')?></a></div>
<div><a class="grey" href="javascript:;" onclick="kupon_islem(4);"><?=getTranslation('kuponlarimozel9')?></a></div>
<div><a class="grey" href="javascript:;" onclick="kupon_islem(5);"><?=getTranslation('kuponlarimozel10')?></a></div>
<div><a class="grey" href="javascript:;" onclick="kupon_islem(6);"><?=getTranslation('kuponlarimozel11')?></a></div>

</div>
</div>
</div>
</div>

<div id="datepicker" style="display:none;float:right; text-transform: capitalize;">

<input type="text" style="height: 25px;width: 92px;" class="firstNameNew ng-invalid ng-invalid-required ng-valid-pattern ng-dirty placeholder inputText tcal tcalInput" id="datepickerFrom" name="datepickerFrom" autocomplete="off" value="<?=date("d-m-Y",strtotime('Last Tuesday')); ?>" size="7">

<input type="text" style="height: 25px;width: 92px;" class="firstNameNew ng-invalid ng-invalid-required ng-valid-pattern ng-dirty placeholder inputText tcal tcalInput" id="datepickerTo" name="datepickerTo" autocomplete="off" value="<?=date("d-m-Y"); ?>" size="7">

<button class="btn btn-primary" onclick="raporgetir(10);"><?=getTranslation('mobilara')?></button>

</div>

</div>
</div>
</td>
</tr>
</tbody>
</table>
</div>
<div class="space_9 clear"></div>
<div class="new_sheet cf panelHead">
<div class="sheet_c1 left"><a class=""><span class=""><?=getTranslation('kuponlarimozel12')?></span></a></div>
<div class="sheet_c2 pad_l_6 left"><a class=""><span class="down"><?=getTranslation('kuponlarimozel13')?></span></a></div>
<div class="sheet_c3 left"><?=getTranslation('kuponlarimozel14')?></div>
<div class="sheet_c4 left"><div class="left"><?=getTranslation('kuponlarimozel15')?></div></div>
<div class="sheet_c5 align_r left"><?=getTranslation('kuponlarimozel16')?></div>
<div class="sheet_c6 pad_l_5 align_r left"><?=getTranslation('kuponlarimozel17')?></div>
</div>
<div class="space_9"></div>

<div id="kuponlar_getir"></div>

<span>
<div class="sheet_body_sub on cf">
<div class="main_box pager cf">
<div class="left" style="width: 30%">
<div class="pager_2"></div>
</div>
<div class="left" style="width: 40%">
<div class="div_center hide">	
<div class="inline">
<div class="left pad_t_12">&nbsp;</div>
<!--<div class="left pager_1"><a href="javascript:ebetAccount.changePage('1', '1')" class=" on">1</a></div>-->
<div class="left pad_t_12">&nbsp;</div>
</div>
</div>
</div>	
<div class="left" style="width: 30%">
<div class="pager_2 right">
<span class="left"><?=getTranslation('kuponlarimozel18')?></span>
<a href="javascript:;" onclick="kupon_islem(12);" id="pageper_10" class=" on">10</a>	
<a href="javascript:;" onclick="kupon_islem(13);" id="pageper_20" class="">20</a>	
<a href="javascript:;" onclick="kupon_islem(14);" id="pageper_30" class="">30</a>
</div>
</div>
</div>
</div>
</span>
<div class="space"></div>
<div class="grey_ccc align_c">* <?=getTranslation('kuponlarimozel19')?></div>
<div id="tooltip_10">
<div id="tooltip_10_a"></div>
<div id="tooltip_10_b"></div>
</div>
<div class="sheet_body_cont cf legendBox" style="margin-bottom:5px">
<div class="left">
<div class="legend" style="width:101px;"><?=getTranslation('kuponlarimozel20')?>:</div>
<div class="blue cf legend"><?=getTranslation('kuponlarimozel21')?></div>
<div class="green cf legend"><?=getTranslation('kuponlarimozel22')?></div>
 <div class="red cf legend"><?=getTranslation('kuponlarimozel23')?></div>
<div class="dark-blue cf legend"><?=getTranslation('kuponlarimozel24')?></div>
<div class="grey cf legend"><?=getTranslation('kuponlarimozel25')?></div>
<div class="grey cf legend"><?=getTranslation('kuponlarimozel26')?></div>
<div class="grey cf legend"><?=getTranslation('kuponlarimozel27')?></div>
<div class="black cf legend"><?=getTranslation('kuponlarimozel28')?></div>
</div>
</div>
</div>
</div>
</div>

</div>
</div>

<?php include 'sag.php'; ?>

<input type="hidden" id="kupon_tarih1" value="1">
<input type="hidden" id="kupon_tarih2" value="0">
<input type="hidden" id="kupon_durum" value="0">
<input type="hidden" id="kupon_pageper" value="10">

<script>
function kupon_islem(val){
	if(val==1){
		$("#kupon_tarih1").val(1);
		$("#kupon_tarih2").val(0);
		$("#ust_tarafi_aciklama").html("<?=getTranslation('kuponlarimozel6')?>");
		kupongetir(1);
	} else if(val==2){
		$("#kupon_tarih1").val(2);
		$("#kupon_tarih2").val(0);
		$("#ust_tarafi_aciklama").html("<?=getTranslation('kuponlarimozel7')?>");
		kupongetir(1);
	} else if(val==3){
		$("#kupon_tarih1").val(3);
		$("#kupon_tarih2").val(0);
		$("#ust_tarafi_aciklama").html("<?=getTranslation('kuponlarimozel8')?>");
		kupongetir(1);
	} else if(val==4){
		$("#kupon_tarih1").val(4);
		$("#kupon_tarih2").val(0);
		$("#ust_tarafi_aciklama").html("<?=getTranslation('kuponlarimozel9')?>");
		kupongetir(1);
	} else if(val==5){
		$("#kupon_tarih1").val(5);
		$("#kupon_tarih2").val(0);
		$("#ust_tarafi_aciklama").html("<?=getTranslation('kuponlarimozel10')?>");
		kupongetir(1);
	} else if(val==6){
		$("#kupon_tarih1").val(3);
		$("#kupon_tarih2").val(0);
		$("#ust_tarafi_aciklama").html("<?=getTranslation('kuponlarimozel11')?>");
		$("#datepicker").toggle();
	} else if(val==7){
		$("#kupon_durum").val(0);
		$("#sayi_7_durum").addClass("on");
		$("#sayi_8_durum").removeClass("on");
		$("#sayi_9_durum").removeClass("on");
		$("#sayi_10_durum").removeClass("on");
		$("#sayi_11_durum").removeClass("on");
		kupongetir(1);
	} else if(val==8){
		$("#kupon_durum").val(1);
		$("#sayi_7_durum").removeClass("on");
		$("#sayi_8_durum").addClass("on");
		$("#sayi_9_durum").removeClass("on");
		$("#sayi_10_durum").removeClass("on");
		$("#sayi_11_durum").removeClass("on");
		kupongetir(1);
	} else if(val==9){
		$("#kupon_durum").val(2);
		$("#sayi_7_durum").removeClass("on");
		$("#sayi_8_durum").removeClass("on");
		$("#sayi_9_durum").addClass("on");
		$("#sayi_10_durum").removeClass("on");
		$("#sayi_11_durum").removeClass("on");
		kupongetir(1);
	} else if(val==10){
		$("#kupon_durum").val(3);
		$("#sayi_7_durum").removeClass("on");
		$("#sayi_8_durum").removeClass("on");
		$("#sayi_9_durum").removeClass("on");
		$("#sayi_10_durum").addClass("on");
		$("#sayi_11_durum").removeClass("on");
		kupongetir(1);
	} else if(val==11){
		$("#kupon_durum").val(4);
		$("#sayi_7_durum").removeClass("on");
		$("#sayi_8_durum").removeClass("on");
		$("#sayi_9_durum").removeClass("on");
		$("#sayi_10_durum").removeClass("on");
		$("#sayi_11_durum").addClass("on");
		kupongetir(1);
	} else if(val==12){
		$("#kupon_pageper").val(10);
		$("#pageper_10").addClass("on");
		$("#pageper_20").removeClass("on");
		$("#pageper_30").removeClass("on");
		kupongetir(1);
	} else if(val==13){
		$("#kupon_pageper").val(20);
		$("#pageper_10").removeClass("on");
		$("#pageper_20").addClass("on");
		$("#pageper_30").removeClass("on");
		kupongetir(1);
	} else if(val==14){
		$("#kupon_pageper").val(30);
		$("#pageper_10").removeClass("on");
		$("#pageper_20").removeClass("on");
		$("#pageper_30").addClass("on");
		kupongetir(1);
	}
}
function kupongetir_2(val, sayfaveri) {
if(val=="1") {
$("#suanval").val(1);
$("#kuponlar_getir").html('<div id="delay_layer" class="overlay_layer"><div class="innerWrap"><div class="contentBlock"><div class="headline"><?=getTranslation('lutfen1')?> <span class="highlighted"><?=getTranslation('lutfen2')?></span></div><div class="bodyText"><?=getTranslation('lutfen3')?></div><div class="progressbar"><div class="progressbarInner"></div></div></div></div></div>');
}
var tarih1 = $("#datepickerFrom").val();
var tarih2 = $("#datepickerTo").val();
var durum = $("#kupon_durum").val();
var pageper = $("#kupon_pageper").val();
var rand = Math.random();
$.get('ajax.php?a=kuponlarim_ozel&sayfa='+sayfaveri+'&rand='+rand+'&pageper='+pageper+'&tarih1='+tarih1+'&tarih2='+tarih2+'&durum='+durum+'',function(data) { $("#kuponlar_getir").html(data); loadexit(); });
}
function kupongetir(val, sayfaveri) {
if(val=="1") {
$("#suanval").val(1);
$("#kuponlar_getir").html('<div id="delay_layer" class="overlay_layer"><div class="innerWrap"><div class="contentBlock"><div class="headline"><?=getTranslation('lutfen1')?> <span class="highlighted"><?=getTranslation('lutfen2')?></span></div><div class="bodyText"><?=getTranslation('lutfen3')?></div><div class="progressbar"><div class="progressbarInner"></div></div></div></div></div>');
}
var tarih1 = $("#kupon_tarih1").val();
var tarih2 = $("#kupon_tarih2").val();
var durum = $("#kupon_durum").val();
var pageper = $("#kupon_pageper").val();
var rand = Math.random();
$.get('ajax.php?a=kuponlarim_ozel&sayfa='+sayfaveri+'&rand='+rand+'&pageper='+pageper+'&tarih1='+tarih1+'&tarih2='+tarih2+'&durum='+durum+'',function(data) { $("#kuponlar_getir").html(data); loadexit(); });
}
$(document).ready(function(e) {
kupongetir(1);
});
</script>
<?php include 'footer.php'; ?>
</body>
</html>