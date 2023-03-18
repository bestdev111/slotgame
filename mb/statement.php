<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); die(); exit(); }
if($ub['alt_durum']<1 && $ub['wkyetki']<1 && $ub['alt_alt_durum']<1 && $ub['sahip']=="0") { header("Location:home"); }

$gun_ver = date("d");
$ay_ver = date("m");
$yil_ver = date("Y");

$suanay_cikar = date("m");
$suanayveyil1_ver = date("01-m-Y");
$suanayveyil2_ver = date("31-m-Y");
$biray_cikar = date("m",strtotime("-1 month"));
$birayveyil1_ver = date("01-m-Y",strtotime("-1 month"));
$birayveyil2_ver = date("31-m-Y",strtotime("-1 month"));
$ikiay_cikar = date("m",strtotime("-2 month"));
$ikiayveyil1_ver = date("01-m-Y",strtotime("-2 month"));
$ikiayveyil2_ver = date("31-m-Y",strtotime("-2 month"));

if($suanay_cikar=="01"){ $suanay_ver = getTranslation('mobilay1'); } else 
if($suanay_cikar=="02"){ $suanay_ver = getTranslation('mobilay2'); } else 
if($suanay_cikar=="03"){ $suanay_ver = getTranslation('mobilay3'); } else 
if($suanay_cikar=="04"){ $suanay_ver = getTranslation('mobilay4'); } else 
if($suanay_cikar=="05"){ $suanay_ver = getTranslation('mobilay5'); } else 
if($suanay_cikar=="06"){ $suanay_ver = getTranslation('mobilay6'); } else 
if($suanay_cikar=="07"){ $suanay_ver = getTranslation('mobilay7'); } else 
if($suanay_cikar=="08"){ $suanay_ver = getTranslation('mobilay8'); } else 
if($suanay_cikar=="09"){ $suanay_ver = getTranslation('mobilay9'); } else 
if($suanay_cikar=="10"){ $suanay_ver = getTranslation('mobilay10'); } else 
if($suanay_cikar=="11"){ $suanay_ver = getTranslation('mobilay11'); } else 
if($suanay_cikar=="12"){ $suanay_ver = getTranslation('mobilay12'); }

if($biray_cikar=="01"){ $biray_ver = getTranslation('mobilay1'); } else 
if($biray_cikar=="02"){ $biray_ver = getTranslation('mobilay2'); } else 
if($biray_cikar=="03"){ $biray_ver = getTranslation('mobilay3'); } else 
if($biray_cikar=="04"){ $biray_ver = getTranslation('mobilay4'); } else 
if($biray_cikar=="05"){ $biray_ver = getTranslation('mobilay5'); } else 
if($biray_cikar=="06"){ $biray_ver = getTranslation('mobilay6'); } else 
if($biray_cikar=="07"){ $biray_ver = getTranslation('mobilay7'); } else 
if($biray_cikar=="08"){ $biray_ver = getTranslation('mobilay8'); } else 
if($biray_cikar=="09"){ $biray_ver = getTranslation('mobilay9'); } else 
if($biray_cikar=="10"){ $biray_ver = getTranslation('mobilay10'); } else 
if($biray_cikar=="11"){ $biray_ver = getTranslation('mobilay11'); } else 
if($biray_cikar=="12"){ $biray_ver = getTranslation('mobilay12'); }

if($ikiay_cikar=="01"){ $ikiay_ver = getTranslation('mobilay1'); } else 
if($ikiay_cikar=="02"){ $ikiay_ver = getTranslation('mobilay2'); } else 
if($ikiay_cikar=="03"){ $ikiay_ver = getTranslation('mobilay3'); } else 
if($ikiay_cikar=="04"){ $ikiay_ver = getTranslation('mobilay4'); } else 
if($ikiay_cikar=="05"){ $ikiay_ver = getTranslation('mobilay5'); } else 
if($ikiay_cikar=="06"){ $ikiay_ver = getTranslation('mobilay6'); } else 
if($ikiay_cikar=="07"){ $ikiay_ver = getTranslation('mobilay7'); } else 
if($ikiay_cikar=="08"){ $ikiay_ver = getTranslation('mobilay8'); } else 
if($ikiay_cikar=="09"){ $ikiay_ver = getTranslation('mobilay9'); } else 
if($ikiay_cikar=="10"){ $ikiay_ver = getTranslation('mobilay10'); } else 
if($ikiay_cikar=="11"){ $ikiay_ver = getTranslation('mobilay11'); } else 
if($ikiay_cikar=="12"){ $ikiay_ver = getTranslation('mobilay12'); }

?>
<?php include 'header.php'; ?>

<div id="page1" class="page top">
<div class="scroll_container" onscroll="scrollActions(this, true)">
<div class="scroll_wrapper" style="padding-top: 44px; padding-bottom: 44px;">


<div style="display:none;" id="appcontent2" class="appcontent">
<div>
<div class="bartitle"><div class="text"><?=getTranslation('mobilstatement1')?></div></div>

<div class="barmiddle">
<div class="label" style="width: 100px;min-width: 100px;background-color: #fff;overflow: hidden;text-overflow: ellipsis;"><?=getTranslation('mobilstatement2')?></div>
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
<div class="label" style="width: 100px;min-width: 100px;background-color: #fff;overflow: hidden;text-overflow: ellipsis;"><?=getTranslation('mobilstatement3')?></div>
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

<div class="barmiddle">
<div class="label" style="width: 100px;min-width: 100px;background-color: #fff;overflow: hidden;text-overflow: ellipsis;"><?=getTranslation('mobilstatement4')?></div>
<div class="text">
<select name="status" id="islemtip" class="select" style="height: 30px;font-size: 16px;color: #3E3E40;margin-top: 7px;margin-bottom: 7px;">
<option value=""><?=getTranslation('mobilstatement5')?></option>
<option value="ekle"><?=getTranslation('mobilstatement6')?></option>
<option value="cikar"><?=getTranslation('mobilstatement7')?></option>
</select>
</div>
</div>

<div class="barbottom"><div class="text">
<input type="submit" class="submit" value="<?=getTranslation('mobilara')?>" style="padding-left: 33px;padding-right: 33px;font-weight: bold;border-radius: 0px;-webkit-appearance: none;white-space: pre-wrap;word-wrap: break-word;min-height: 34px;max-height: 42px;margin: 0 auto;display: block;font-size: 16px;background-color: #7c7c7c;border: 1px solid #7c7c7c;color: #fff;" onclick="hesapozetle(4);">
</div></div>
<div class="clear"></div>
</div>
<div class="contentbottom hidden"> </div>
<div class="spacer">&nbsp;</div>
</div>

<div id="appcontent1" class="appcontent">
<div>  </div>
<div class="betfilterbar">
<div id="preload1" class="cell w25 selected preload1" onclick="hesapozetle(1);"> <div class="text"><?=$suanay_ver;?></div></div>
<div id="preload2" class="cell w25  preload1" onclick="hesapozetle(2);"> <div class="text"><?=$biray_ver;?></div></div>
<div id="preload3" class="cell w25  preload1" onclick="hesapozetle(3);"> <div class="text"><?=$ikiay_ver;?></div></div>
<div id="preload4" class="cell w25  preload1" onclick="filtrele();"> <div class="text"><?=getTranslation('mobilstatement8')?></div></div>
</div>

<div id="hesapozeti"></div>

<div class="contentbottom hidden"> </div>
<div class="spacer">&nbsp;</div>
</div>

<input type="hidden" id="islemtip1" value="">

</div>
</div>
</div>

<script>
function hesapozetle(val) {
if(val==1){
	var islemtip = $("#islemtip1").val();
	$("#preload1").addClass("selected");
	$("#preload2").removeClass("selected");
	$("#preload3").removeClass("selected");
	$("#preload4").removeClass("selected");
	$.get('export.php?a=bakiyeraporum&tarih_ver=<?=$suanayveyil1_ver;?>&tarih_ver2=<?=$suanayveyil2_ver;?>&islemtip='+islemtip+'',function(data) {
	$("#hesapozeti").html(data);
	});
} else if(val==2){
	var islemtip = $("#islemtip1").val();
	$("#preload1").removeClass("selected");
	$("#preload2").addClass("selected");
	$("#preload3").removeClass("selected");
	$("#preload4").removeClass("selected");
	$.get('export.php?a=bakiyeraporum&tarih_ver=<?=$birayveyil1_ver;?>&tarih_ver2=<?=$birayveyil2_ver;?>&islemtip='+islemtip+'',function(data) {
	$("#hesapozeti").html(data);
	});
} else if(val==3){
	var islemtip = $("#islemtip1").val();
	$("#preload1").removeClass("selected");
	$("#preload2").removeClass("selected");
	$("#preload3").addClass("selected");
	$("#preload4").removeClass("selected");
	$.get('export.php?a=bakiyeraporum&tarih_ver=<?=$ikiayveyil1_ver;?>&tarih_ver2=<?=$ikiayveyil2_ver;?>&islemtip='+islemtip+'',function(data) {
	$("#hesapozeti").html(data);
	});
} else {
	var gun1 = $("#gun1").val();
	var ay1 = $("#ay1").val();
	var yil1 = $("#yil1").val();
	var gun2 = $("#gun2").val();
	var ay2 = $("#ay2").val();
	var yil2 = $("#yil2").val();
	var tarih_ver = ""+gun1+"-"+ay1+"-"+yil1+"";
	var tarih_ver2 = ""+gun2+"-"+ay2+"-"+yil2+"";
	var islemtip = $("#islemtip").val();
	$("#preload1").removeClass("selected");
	$("#preload2").removeClass("selected");
	$("#preload3").removeClass("selected");
	$("#preload4").addClass("selected");
	$("#appcontent1").show();
	$("#appcontent2").hide();
	$.get('export.php?a=bakiyeraporum&tarih_ver='+tarih_ver+'&tarih_ver2='+tarih_ver2+'&islemtip='+islemtip+'',function(data) {
	$("#hesapozeti").html(data);
	});
}



}
hesapozetle(1);
function filtrele(){
	$("#appcontent1").hide();
	$("#appcontent2").show();
	$("#preload1").removeClass("selected");
	$("#preload2").removeClass("selected");
	$("#preload3").removeClass("selected");
	$("#preload4").addClass("selected");
}
</script>

<?php include 'footer.php'; ?>

</body>
</html>