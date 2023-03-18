<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:login.php"); exit(); }

$bugunu_ver = date("d-m-Y");
$birhafta_cikar = date("d-m-Y",strtotime("-7 days"));

$gun_ver = date("d");
$ay_ver = date("m");
$yil_ver = date("Y");
?>
<?php include 'header.php'; ?>
<script>$("#baslikdivi").html('<span><?=getTranslation('mobilticketheaderdiv')?></span>');</script>
<div id="page1" class="page top">
<div class="scroll_container">
<div class="scroll_wrapper" style="padding-top: 44px; padding-bottom: 44px;">

<div style="display:none;" id="appcontent2" class="appcontent">
<div>
<div class="bartitle"><div class="text"><?=getTranslation('mobilticket1')?></div></div>

<div class="barmiddle">
<div class="label" style="width: 100px;min-width: 100px;background-color: #fff;overflow: hidden;text-overflow: ellipsis;"><?=getTranslation('mobilticket2')?></div>
<div class="text">
<input type="text" style="height: 30px;font-size: 16px;color: #3E3E40;margin-top: 7px;margin-bottom: 7px;width: 95px;" id="k_kuponno" value="">
</div>
</div>
<div class="barmiddle">
<div class="label" style="width: 100px;min-width: 100px;background-color: #fff;overflow: hidden;text-overflow: ellipsis;"><?=getTranslation('mobilticket3')?></div>
<div class="text">
<select name="status" id="k_durum" class="select" style="height: 30px;font-size: 16px;color: #3E3E40;margin-top: 7px;margin-bottom: 7px;">
<option value="" selected="selected"><?=getTranslation('mobilticket4')?></option>
<option value="1"><?=getTranslation('mobilticket5')?></option>
<option value="2"><?=getTranslation('mobilticket6')?></option>
<option value="3"><?=getTranslation('mobilticket7')?></option>
<option value="4"><?=getTranslation('mobilticket8')?></option>
</select>
</div>
</div>
<div class="barmiddle">
<div class="label" style="width: 100px;min-width: 100px;background-color: #fff;overflow: hidden;text-overflow: ellipsis;"><?=getTranslation('mobilticket9')?></div>
<div class="text">
<select id="gun1" class="select selectdate" style="height: 30px;font-size: 16px;color: #3E3E40;margin-top: 7px;margin-bottom: 7px;">
<option <? if($gun_ver=="01"){ ?>selected<? } ?> value="01">1</option>
<option <? if($gun_ver=="02"){ ?>selected<? } ?> value="02">2</option>
<option <? if($gun_ver=="03"){ ?>selected<? } ?> value="03">3</option>
<option <? if($gun_ver=="04"){ ?>selected<? } ?> value="04">4</option>
<option <? if($gun_ver=="05"){ ?>selected<? } ?> value="05">5</option>
<option <? if($gun_ver=="06"){ ?>selected<? } ?> value="06">6</option>
<option <? if($gun_ver=="07"){ ?>selected<? } ?> value="07">7</option>
<option <? if($gun_ver=="08"){ ?>selected<? } ?> value="08">8</option>
<option <? if($gun_ver=="09"){ ?>selected<? } ?> value="09">9</option>
<option <? if($gun_ver=="10"){ ?>selected<? } ?> value="10">10</option>
<option <? if($gun_ver=="11"){ ?>selected<? } ?> value="11">11</option>
<option <? if($gun_ver=="12"){ ?>selected<? } ?> value="12">12</option>
<option <? if($gun_ver=="13"){ ?>selected<? } ?> value="13">13</option>
<option <? if($gun_ver=="14"){ ?>selected<? } ?> value="14">14</option>
<option <? if($gun_ver=="15"){ ?>selected<? } ?> value="15">15</option>
<option <? if($gun_ver=="16"){ ?>selected<? } ?> value="16">16</option>
<option <? if($gun_ver=="17"){ ?>selected<? } ?> value="17">17</option>
<option <? if($gun_ver=="18"){ ?>selected<? } ?> value="18">18</option>
<option <? if($gun_ver=="19"){ ?>selected<? } ?> value="19">19</option>
<option <? if($gun_ver=="20"){ ?>selected<? } ?> value="20">20</option>
<option <? if($gun_ver=="21"){ ?>selected<? } ?> value="21">21</option>
<option <? if($gun_ver=="22"){ ?>selected<? } ?> value="22">22</option>
<option <? if($gun_ver=="23"){ ?>selected<? } ?> value="23">23</option>
<option <? if($gun_ver=="24"){ ?>selected<? } ?> value="24">24</option>
<option <? if($gun_ver=="25"){ ?>selected<? } ?> value="25">25</option>
<option <? if($gun_ver=="26"){ ?>selected<? } ?> value="26">26</option>
<option <? if($gun_ver=="27"){ ?>selected<? } ?> value="27">27</option>
<option <? if($gun_ver=="28"){ ?>selected<? } ?> value="28">28</option>
<option <? if($gun_ver=="29"){ ?>selected<? } ?> value="29">29</option>
<option <? if($gun_ver=="30"){ ?>selected<? } ?> value="30">30</option>
<option <? if($gun_ver=="31"){ ?>selected<? } ?> value="31">31</option>
</select>
-
<select id="ay1" class="select selectdate" style="height: 30px;font-size: 16px;color: #3E3E40;margin-top: 7px;margin-bottom: 7px;">
<option <? if($ay_ver=="01"){ ?>selected<? } ?> value="01">1</option>
<option <? if($ay_ver=="02"){ ?>selected<? } ?> value="02">2</option>
<option <? if($ay_ver=="03"){ ?>selected<? } ?> value="03">3</option>
<option <? if($ay_ver=="04"){ ?>selected<? } ?> value="04">4</option>
<option <? if($ay_ver=="05"){ ?>selected<? } ?> value="05">5</option>
<option <? if($ay_ver=="06"){ ?>selected<? } ?> value="06">6</option>
<option <? if($ay_ver=="07"){ ?>selected<? } ?> value="07">7</option>
<option <? if($ay_ver=="08"){ ?>selected<? } ?> value="08">8</option>
<option <? if($ay_ver=="09"){ ?>selected<? } ?> value="09">9</option>
<option <? if($ay_ver=="10"){ ?>selected<? } ?> value="10">10</option>
<option <? if($ay_ver=="11"){ ?>selected<? } ?> value="11">11</option>
<option <? if($ay_ver=="12"){ ?>selected<? } ?> value="12">12</option>
</select>
-
<select id="yil1" class="select selectdate" style="height: 30px;font-size: 16px;color: #3E3E40;margin-top: 7px;margin-bottom: 7px;">
<option <? if($yil_ver=="2023"){ ?>selected<? } ?> value="2023">2023</option>
<option <? if($yil_ver=="2022"){ ?>selected<? } ?> value="2022">2022</option>
<option <? if($yil_ver=="2021"){ ?>selected<? } ?> value="2021">2021</option>
<option <? if($yil_ver=="2020"){ ?>selected<? } ?> value="2020">2020</option>
<option <? if($yil_ver=="2019"){ ?>selected<? } ?> value="2019">2019</option>
</select>
</div>
</div>
<div class="barmiddle">
<div class="label" style="width: 100px;min-width: 100px;background-color: #fff;overflow: hidden;text-overflow: ellipsis;"><?=getTranslation('mobilticket10')?></div>
<div class="text">
<select id="gun2" class="select selectdate" style="height: 30px;font-size: 16px;color: #3E3E40;margin-top: 7px;margin-bottom: 7px;">
<option <? if($gun_ver=="01"){ ?>selected<? } ?> value="01">1</option>
<option <? if($gun_ver=="02"){ ?>selected<? } ?> value="02">2</option>
<option <? if($gun_ver=="03"){ ?>selected<? } ?> value="03">3</option>
<option <? if($gun_ver=="04"){ ?>selected<? } ?> value="04">4</option>
<option <? if($gun_ver=="05"){ ?>selected<? } ?> value="05">5</option>
<option <? if($gun_ver=="06"){ ?>selected<? } ?> value="06">6</option>
<option <? if($gun_ver=="07"){ ?>selected<? } ?> value="07">7</option>
<option <? if($gun_ver=="08"){ ?>selected<? } ?> value="08">8</option>
<option <? if($gun_ver=="09"){ ?>selected<? } ?> value="09">9</option>
<option <? if($gun_ver=="10"){ ?>selected<? } ?> value="10">10</option>
<option <? if($gun_ver=="11"){ ?>selected<? } ?> value="11">11</option>
<option <? if($gun_ver=="12"){ ?>selected<? } ?> value="12">12</option>
<option <? if($gun_ver=="13"){ ?>selected<? } ?> value="13">13</option>
<option <? if($gun_ver=="14"){ ?>selected<? } ?> value="14">14</option>
<option <? if($gun_ver=="15"){ ?>selected<? } ?> value="15">15</option>
<option <? if($gun_ver=="16"){ ?>selected<? } ?> value="16">16</option>
<option <? if($gun_ver=="17"){ ?>selected<? } ?> value="17">17</option>
<option <? if($gun_ver=="18"){ ?>selected<? } ?> value="18">18</option>
<option <? if($gun_ver=="19"){ ?>selected<? } ?> value="19">19</option>
<option <? if($gun_ver=="20"){ ?>selected<? } ?> value="20">20</option>
<option <? if($gun_ver=="21"){ ?>selected<? } ?> value="21">21</option>
<option <? if($gun_ver=="22"){ ?>selected<? } ?> value="22">22</option>
<option <? if($gun_ver=="23"){ ?>selected<? } ?> value="23">23</option>
<option <? if($gun_ver=="24"){ ?>selected<? } ?> value="24">24</option>
<option <? if($gun_ver=="25"){ ?>selected<? } ?> value="25">25</option>
<option <? if($gun_ver=="26"){ ?>selected<? } ?> value="26">26</option>
<option <? if($gun_ver=="27"){ ?>selected<? } ?> value="27">27</option>
<option <? if($gun_ver=="28"){ ?>selected<? } ?> value="28">28</option>
<option <? if($gun_ver=="29"){ ?>selected<? } ?> value="29">29</option>
<option <? if($gun_ver=="30"){ ?>selected<? } ?> value="30">30</option>
<option <? if($gun_ver=="31"){ ?>selected<? } ?> value="31">31</option>
</select>
-
<select id="ay2" class="select selectdate" style="height: 30px;font-size: 16px;color: #3E3E40;margin-top: 7px;margin-bottom: 7px;">
<option <? if($ay_ver=="01"){ ?>selected<? } ?> value="01">1</option>
<option <? if($ay_ver=="02"){ ?>selected<? } ?> value="02">2</option>
<option <? if($ay_ver=="03"){ ?>selected<? } ?> value="03">3</option>
<option <? if($ay_ver=="04"){ ?>selected<? } ?> value="04">4</option>
<option <? if($ay_ver=="05"){ ?>selected<? } ?> value="05">5</option>
<option <? if($ay_ver=="06"){ ?>selected<? } ?> value="06">6</option>
<option <? if($ay_ver=="07"){ ?>selected<? } ?> value="07">7</option>
<option <? if($ay_ver=="08"){ ?>selected<? } ?> value="08">8</option>
<option <? if($ay_ver=="09"){ ?>selected<? } ?> value="09">9</option>
<option <? if($ay_ver=="10"){ ?>selected<? } ?> value="10">10</option>
<option <? if($ay_ver=="11"){ ?>selected<? } ?> value="11">11</option>
<option <? if($ay_ver=="12"){ ?>selected<? } ?> value="12">12</option>
</select>
-
<select id="yil2" class="select selectdate" style="height: 30px;font-size: 16px;color: #3E3E40;margin-top: 7px;margin-bottom: 7px;">
<option <? if($yil_ver=="2023"){ ?>selected<? } ?> value="2023">2023</option>
<option <? if($yil_ver=="2022"){ ?>selected<? } ?> value="2022">2022</option>
<option <? if($yil_ver=="2021"){ ?>selected<? } ?> value="2021">2021</option>
<option <? if($yil_ver=="2020"){ ?>selected<? } ?> value="2020">2020</option>
<option <? if($yil_ver=="2019"){ ?>selected<? } ?> value="2019">2019</option>
</select>
</div>
</div>
<div class="barbottom"><div class="text">
<input type="submit" class="submit" value="<?=getTranslation('mobilara')?>" style="padding-left: 33px;padding-right: 33px;font-weight: bold;border-radius: 0px;-webkit-appearance: none;white-space: pre-wrap;word-wrap: break-word;min-height: 34px;max-height: 42px;margin: 0 auto;display: block;font-size: 16px;background-color: #7c7c7c;border: 1px solid #7c7c7c;color: #fff;" onclick="loadkupons(5);">
</div></div>
<div class="clear"></div>
</div>
<div class="contentbottom hidden"> </div>
<div class="spacer">&nbsp;</div>
</div>

<div id="appcontent1" class="appcontent">
<div>  </div>
<div class="betfilterbar">
<div id="preloadtumu" class="cell w20 selected preload2" onclick="loadkupons(1);"> <div class="text w100"><?=getTranslation('mobilticket11')?></div></div>
<div id="preloadacik" class="cell w20  preload2" onclick="loadkupons(2);"> <div class="text w100"><?=getTranslation('mobilticket12')?></div></div>
<div id="preloadgalibiyet" class="cell w20  preload2" onclick="loadkupons(3);"> <div class="text w100"><?=getTranslation('mobilticket13')?></div></div>
<div id="preloadmaglubiyet" class="cell w20  preload2" onclick="loadkupons(4);"> <div class="text w100"><?=getTranslation('mobilticket14')?></div></div>
<div id="preloaddiger" class="cell w20  preload1" onclick="filtrele();"> <div class="text"><?=getTranslation('mobilticket15')?></div></div>
</div>

<div id="kupons"></div>

<div class="hidden"></div>
<div class="contentbottom hidden"> </div><div class="spacer">&nbsp;</div>
</div>

<div id="appcontent3" style="display:none;" class="appcontent"></div>

<div id="appcontent4" style="display:none;" class="appcontent"></div>


</div>
</div>
</div>

<input type="hidden" id="k_kuponno1" value="">

<script>
function karsilasmabulunmadi() {
$(".karsilasmabulunmadi").removeClass('hidden');
}
function karsilasmakapat() {
$(".karsilasmabulunmadi").addClass('hidden');
}

function detaygetir(sportip,id) {
$("#appcontent4").show();
$("#appcontent4").html('<div class="spinner" style="text-align:center;"><img src="assets/img/loading_x6_blueto.gif" class="loading" onload="displayImage(this)"></div>');
$("#appcontent3").hide();
$.get('export.php?a=detaygetir&sportip='+sportip+'&id='+id+'',function(data) {
$("#appcontent4").html(data);
});
}
function loadbulten2() {
$("#appcontent3").show();
$("#appcontent4").hide();
$("#appcontent4").html('');
}

function loadkupons(val) {
var rand = Math.random();
$("#kupons").html('<div class="spinner" style="text-align:center;"><img src="assets/img/loading_x6_blueto.gif" class="loading" onload="displayImage(this)"></div>');
if(val==1){
var kupon_no = $("#k_kuponno1").val();
var tarih1 = $("#tarih11").val();
var tarih2 = $("#tarih22").val();
var durum = 0;
$("#preloadtumu").addClass("selected");
$("#preloadacik").removeClass("selected");
$("#preloadgalibiyet").removeClass("selected");
$("#preloadmaglubiyet").removeClass("selected");
$("#preloaddiger").removeClass("selected");
$.get('export.php?a=kuponlarim&rand='+rand+'&kupon_no='+kupon_no+'&tarih1=<?=$birhafta_cikar;?>&tarih2=<?=$bugunu_ver;?>&durum='+durum+'',function(data) {
$("#kupons").html(data);
});
} else if(val==2){
var kupon_no = $("#k_kuponno1").val();
var tarih1 = $("#tarih11").val();
var tarih2 = $("#tarih22").val();
var durum = 1;
$("#preloadtumu").removeClass("selected");
$("#preloadacik").addClass("selected");
$("#preloadgalibiyet").removeClass("selected");
$("#preloadmaglubiyet").removeClass("selected");
$("#preloaddiger").removeClass("selected");
$.get('export.php?a=kuponlarim&rand='+rand+'&kupon_no='+kupon_no+'&tarih1=<?=$birhafta_cikar;?>&tarih2=<?=$bugunu_ver;?>&durum='+durum+'',function(data) {
$("#kupons").html(data);
});
} else if(val==3){
var kupon_no = $("#k_kuponno1").val();
var tarih1 = $("#tarih11").val();
var tarih2 = $("#tarih22").val();
var durum = 2;
$("#preloadtumu").removeClass("selected");
$("#preloadacik").removeClass("selected");
$("#preloadgalibiyet").addClass("selected");
$("#preloadmaglubiyet").removeClass("selected");
$("#preloaddiger").removeClass("selected");
$.get('export.php?a=kuponlarim&rand='+rand+'&kupon_no='+kupon_no+'&tarih1=<?=$birhafta_cikar;?>&tarih2=<?=$bugunu_ver;?>&durum='+durum+'',function(data) {
$("#kupons").html(data);
});
} else if(val==4){
var kupon_no = $("#k_kuponno1").val();
var tarih1 = $("#tarih11").val();
var tarih2 = $("#tarih22").val();
var durum = 3;
$("#preloadtumu").removeClass("selected");
$("#preloadacik").removeClass("selected");
$("#preloadgalibiyet").removeClass("selected");
$("#preloadmaglubiyet").addClass("selected");
$("#preloaddiger").removeClass("selected");
$.get('export.php?a=kuponlarim&rand='+rand+'&kupon_no='+kupon_no+'&tarih1=<?=$birhafta_cikar;?>&tarih2=<?=$bugunu_ver;?>&durum='+durum+'',function(data) {
$("#kupons").html(data);
});
} else {
var kupon_no = $("#k_kuponno").val();
var gun1 = $("#gun1").val();
var ay1 = $("#ay1").val();
var yil1 = $("#yil1").val();
var gun2 = $("#gun2").val();
var ay2 = $("#ay2").val();
var yil2 = $("#yil2").val();
var tarih1 = ""+gun1+"-"+ay1+"-"+yil1+"";
var tarih2 = ""+gun2+"-"+ay2+"-"+yil2+"";
var durum = $("#k_durum").val();
$("#appcontent1").show();
$("#appcontent2").hide();
$("#appcontent3").hide();
$.get('export.php?a=kuponlarim&rand='+rand+'&kupon_no='+kupon_no+'&tarih1='+tarih1+'&tarih2='+tarih2+'&durum='+durum+'',function(data) {
$("#kupons").html(data);
});
}
}
loadkupons(1);
function filtrele(){
	$("#appcontent1").hide();
	$("#appcontent2").show();
	$("#appcontent3").hide();
	$("#preloadtumu").removeClass("selected");
	$("#preloadacik").removeClass("selected");
	$("#preloadgalibiyet").removeClass("selected");
	$("#preloadmaglubiyet").removeClass("selected");
	$("#preloaddiger").addClass("selected");
}
</script>
</div>
</div>

<?php include 'footer.php'; ?>

</body>
</html>