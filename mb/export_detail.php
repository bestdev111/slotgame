<?php
session_start();
@header("Content-type: text/html; charset=utf-8");
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:login.php"); exit(); die(); }

$a = gd("a");

if($a=="futbol") {

$mac_db_id=gd("id");
$mb = bilgi("select * from program_futbol where id='$mac_db_id'");
$fark = $mb['mac_time']-time();
$gizli_oran_tips = gizli_oran_tips($mb['kupa_id'],$mb['id']);
if($gizli_oran_tips!="") { $gizli_ekle = "and oran_tip not in ($gizli_oran_tips)"; } else { $gizli_ekle = ""; }

function oranibuloran_futbol($oranid){
global $mb;
$oran = oranbulxxx_futbol($mb['id'],$oranid);
if($oran>0){
	return $oran;
} else {
	return '---';
}
}

function oranibulencode_futbol(){
global $mb;
$mbs = mbsver($mb['id'],$mb['mbs'],$mb['kupa_id']);
return "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$mbs|$mb[mac_time]|futbol";
}

$oranibulencode_futbol = oranibulencode_futbol();

$oran1 = oranbulxxx_futbol($mb['id'],179);
$oran2 = oranbulxxx_futbol($mb['id'],180);
$oran3 = oranbulxxx_futbol($mb['id'],181);
$oran4 = oranbulxxx_futbol($mb['id'],182);
$oran5 = oranbulxxx_futbol($mb['id'],183);
$oran6 = oranbulxxx_futbol($mb['id'],184);
$oran7 = oranbulxxx_futbol($mb['id'],185);
$oran8 = oranbulxxx_futbol($mb['id'],186);
$oran9 = oranbulxxx_futbol($mb['id'],187);
$oran10 = oranbulxxx_futbol($mb['id'],188);
$oran11 = oranbulxxx_futbol($mb['id'],189);
$oran12 = oranbulxxx_futbol($mb['id'],190);
$oran13 = oranbulxxx_futbol($mb['id'],191);
$oran14 = oranbulxxx_futbol($mb['id'],192);
$oran15 = oranbulxxx_futbol($mb['id'],193);
$oran16 = oranbulxxx_futbol($mb['id'],194);
$oran17 = oranbulxxx_futbol($mb['id'],195);
$oran18 = oranbulxxx_futbol($mb['id'],196);
$oran19 = oranbulxxx_futbol($mb['id'],197);
$oran20 = oranbulxxx_futbol($mb['id'],198);
$oran21 = oranbulxxx_futbol($mb['id'],199);
$oran22 = oranbulxxx_futbol($mb['id'],200);
$oran23 = oranbulxxx_futbol($mb['id'],201);
$oran24 = oranbulxxx_futbol($mb['id'],202);
$oran25 = oranbulxxx_futbol($mb['id'],203);
$oran26 = oranbulxxx_futbol($mb['id'],204);
$oran27 = oranbulxxx_futbol($mb['id'],205);
$oran28 = oranbulxxx_futbol($mb['id'],206);
$oran29 = oranbulxxx_futbol($mb['id'],207);
$oran30 = oranbulxxx_futbol($mb['id'],208);
$oran31 = oranbulxxx_futbol($mb['id'],209);
$oran32 = oranbulxxx_futbol($mb['id'],210);
$oran33 = oranbulxxx_futbol($mb['id'],211);
$oran34 = oranbulxxx_futbol($mb['id'],212);
$oran35 = oranbulxxx_futbol($mb['id'],213);
$oran36 = oranbulxxx_futbol($mb['id'],214);
$oran37 = oranbulxxx_futbol($mb['id'],215);
$oran38 = oranbulxxx_futbol($mb['id'],216);
$oran39 = oranbulxxx_futbol($mb['id'],217);
$oran40 = oranbulxxx_futbol($mb['id'],218);
$oran41 = oranbulxxx_futbol($mb['id'],219);
$oran42 = oranbulxxx_futbol($mb['id'],220);
$oran43 = oranbulxxx_futbol($mb['id'],221);
$oran44 = oranbulxxx_futbol($mb['id'],222);
$oran45 = oranbulxxx_futbol($mb['id'],223);
$oran46 = oranbulxxx_futbol($mb['id'],224);
$oran47 = oranbulxxx_futbol($mb['id'],225);
$oran48 = oranbulxxx_futbol($mb['id'],226);
$oran49 = oranbulxxx_futbol($mb['id'],227);
$oran50 = oranbulxxx_futbol($mb['id'],228);
$oran51 = oranbulxxx_futbol($mb['id'],229);
$oran52 = oranbulxxx_futbol($mb['id'],230);
$oran53 = oranbulxxx_futbol($mb['id'],231);
$oran54 = oranbulxxx_futbol($mb['id'],232);
$oran55 = oranbulxxx_futbol($mb['id'],233);
$oran56 = oranbulxxx_futbol($mb['id'],234);
$oran57 = oranbulxxx_futbol($mb['id'],235);
$oran58 = oranbulxxx_futbol($mb['id'],236);
$oran59 = oranbulxxx_futbol($mb['id'],237);
$oran60 = oranbulxxx_futbol($mb['id'],238);
$oran61 = oranbulxxx_futbol($mb['id'],239);
$oran62 = oranbulxxx_futbol($mb['id'],240);
$oran63 = oranbulxxx_futbol($mb['id'],241);
$oran64 = oranbulxxx_futbol($mb['id'],242);
$oran65 = oranbulxxx_futbol($mb['id'],243);
$oran66 = oranbulxxx_futbol($mb['id'],244);
$oran67 = oranbulxxx_futbol($mb['id'],245);
$oran68 = oranbulxxx_futbol($mb['id'],246);
$oran69 = oranbulxxx_futbol($mb['id'],247);
$oran70 = oranbulxxx_futbol($mb['id'],248);
$oran71 = oranbulxxx_futbol($mb['id'],249);
$oran72 = oranbulxxx_futbol($mb['id'],250);
$oran73 = oranbulxxx_futbol($mb['id'],251);
$oran74 = oranbulxxx_futbol($mb['id'],252);
$oran75 = oranbulxxx_futbol($mb['id'],253);
$oran76 = oranbulxxx_futbol($mb['id'],254);
$oran77 = oranbulxxx_futbol($mb['id'],255);
$oran78 = oranbulxxx_futbol($mb['id'],256);
$oran79 = oranbulxxx_futbol($mb['id'],257);
$oran80 = oranbulxxx_futbol($mb['id'],258);
$oran81 = oranbulxxx_futbol($mb['id'],259);
$oran82 = oranbulxxx_futbol($mb['id'],260);
$oran83 = oranbulxxx_futbol($mb['id'],261);
$oran84 = oranbulxxx_futbol($mb['id'],262);
$oran85 = oranbulxxx_futbol($mb['id'],263);
$oran86 = oranbulxxx_futbol($mb['id'],264);
$oran87 = oranbulxxx_futbol($mb['id'],265);
?>

<script>
function ozeloranlarigetir(){
	$('#normaloranlar').hide();
	$('#ozeloranlar').show();
	$('#hrefnormaller').removeClass('active');
	$('#hrefozeller').addClass('active');
}
function oranlargetir(){
	$('#normaloranlar').show();
	$('#ozeloranlar').hide();
	$('#hrefnormaller').addClass('active');
	$('#hrefozeller').removeClass('active');
}
</script>

<div style="text-align: center;font-weight: bold;color: #f64835;background-color: #fff;position: relative;z-index: 9999;" onclick="loadbulten2();"><?=getTranslation('exportlisteyedon')?></div>

<div class="odd singlebar barmiddle " style="<? if($mb['istatistik']>0){ ?>z-index: 100;position: absolute;<? } ?>">
<div id="e9441141" class="event match noborder">
<div class="hidden"><div colspan="11" class="c_comment"><div class="c_comment"></div><div class="c_pointer"></div></div></div>
<div class="event_wrapper">
<div class="datetime ">
<div class="favorites hidden"> <img src="assets/img/favorite0.png"> </div>
<div class="sportsIcon "><div class="icon"><div class="sports soccer"></div> </div></div>
<div class="date small ">
<div> <?=date("d.m H:i",$mb['mac_time']); ?> </div>
<img src="assets/img/live_rain.png" alt="" width="23" height="23" class="hidden">
<span class=""> <img src="assets/img/icon_live.png" alt="" width="24" height="12"> </span>
</div>
</div>
<div class="teamrows">
<div class="teamrow">
<div class="team"> <?=$mb['ev_takim'];?>  </div>
<div class="score">
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
</div>
</div>
<div class="teamrow">
<div class="team"> <?=$mb['konuk_takim'];?>  </div>
<div class="score">
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
</div>
</div>
</div>
<div class="hidden"> <div class="hidden">  </div></div>
<div class="hidden"></div>
<div class="placeholder "></div>
</div>
</div>
</div>

<? if($mb['istatistik']>0){ ?>
<iframe src="https://href.li/?https://cs.betradar.com/ls/widgets/?/totobo/tr/page/widgets_lmts#matchId=<?=$mb['istatistik'];?>" id="liveTrackerCenter" frameborder="0" scrolling="no" style="width: 100%;height: 340px;margin-top:-45px;" onload="resizeIframe(this)"></iframe>
<? } ?>

<? if(oranibuloran_futbol('1')>0 || oranibuloran_futbol('2')>0 || oranibuloran_futbol('3')>0 || oranibuloran_futbol('176')>0 || oranibuloran_futbol('177')>0 || oranibuloran_futbol('178')>0 || oranibuloran_futbol('61')>0 || oranibuloran_futbol('62')>0 || oranibuloran_futbol('4')>0 || oranibuloran_futbol('5')>0 || oranibuloran_futbol('6')>0 || oranibuloran_futbol('7')>0 || oranibuloran_futbol('8')>0 || oranibuloran_futbol('9')>0 || oranibuloran_futbol('10')>0 || oranibuloran_futbol('11')>0 || oranibuloran_futbol('12')>0 || oranibuloran_futbol('13')>0 || oranibuloran_futbol('14')>0 || oranibuloran_futbol('15')>0 || oranibuloran_futbol('27')>0 || oranibuloran_futbol('28')>0 || oranibuloran_futbol('65')>0 || oranibuloran_futbol('66')>0){ ?>

<div class="rsGroupHeader mdetails" onclick="minimizeRsGroup(this, &quot;rsg1&quot;)"><?=getTranslation('canlioransecenekmobil1')?></div>

<div id="rsg1" class="rsGroup" style="display: block;">
<? if(oranibuloran_futbol('1')>0 || oranibuloran_futbol('2')>0 || oranibuloran_futbol('3')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w25"><?=getTranslation('futboloran1')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton l <?=md5("1|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>1" <? if(oranibuloran_futbol('1')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>1,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|1|".oranibuloran_futbol('1').""); ?>', this);"<? } ?>> <div class="caption">1</div> <div class="quote"><?=oranibuloran_futbol('1');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("2|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>2" <? if(oranibuloran_futbol('2')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>2,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|2|".oranibuloran_futbol('2').""); ?>', this);"<? } ?>> <div class="caption">X</div> <div class="quote"><?=oranibuloran_futbol('2');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("3|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>3" <? if(oranibuloran_futbol('3')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>3,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|3|".oranibuloran_futbol('3').""); ?>', this);"<? } ?>> <div class="caption">2</div> <div class="quote"><?=oranibuloran_futbol('3');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>
<? if(oranibuloran_futbol('176')>0 || oranibuloran_futbol('177')>0 || oranibuloran_futbol('178')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w25"><?=getTranslation('futboloran58')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton l <?=md5("176|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>176" <? if(oranibuloran_futbol('176')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>176,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|176|".oranibuloran_futbol('176').""); ?>', this);"<? } ?>> <div class="caption">1X</div> <div class="quote"><?=oranibuloran_futbol('176');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("177|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>177" <? if(oranibuloran_futbol('177')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>177,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|177|".oranibuloran_futbol('177').""); ?>', this);"<? } ?>> <div class="caption">X2</div> <div class="quote"><?=oranibuloran_futbol('177');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("178|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>178" <? if(oranibuloran_futbol('178')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>178,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|178|".oranibuloran_futbol('178').""); ?>', this);"<? } ?>> <div class="caption">12</div> <div class="quote"><?=oranibuloran_futbol('178');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>
<? if(oranibuloran_futbol('61')>0 || oranibuloran_futbol('62')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran28')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("61|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>61" <? if(oranibuloran_futbol('61')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>61,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|61|".oranibuloran_futbol('61').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('oransecenek3')?></div> <div class="quote"><?=oranibuloran_futbol('61');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("62|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>62" <? if(oranibuloran_futbol('62')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>62,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|62|".oranibuloran_futbol('62').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('oransecenek4')?></div> <div class="quote"><?=oranibuloran_futbol('62');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>
<? if(oranibuloran_futbol('4')>0 || oranibuloran_futbol('5')>0 || oranibuloran_futbol('6')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w25"><?=getTranslation('futboloran2')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("4|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>4" <? if(oranibuloran_futbol('4')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>4,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|4|".oranibuloran_futbol('4').""); ?>', this);"<? } ?>> <div class="caption">1</div> <div class="quote"><?=oranibuloran_futbol('4');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("5|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>5" <? if(oranibuloran_futbol('5')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>5,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|5|".oranibuloran_futbol('5').""); ?>', this);"<? } ?>> <div class="caption">X</div> <div class="quote"><?=oranibuloran_futbol('5');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("6|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>6" <? if(oranibuloran_futbol('6')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>6,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|6|".oranibuloran_futbol('6').""); ?>', this);"<? } ?>> <div class="caption">2</div> <div class="quote"><?=oranibuloran_futbol('6');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>
<? if(oranibuloran_futbol('7')>0 || oranibuloran_futbol('8')>0 || oranibuloran_futbol('9')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w25"><?=getTranslation('futboloran3')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("7|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>7" <? if(oranibuloran_futbol('7')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>7,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|7|".oranibuloran_futbol('7').""); ?>', this);"<? } ?>> <div class="caption">1</div> <div class="quote"><?=oranibuloran_futbol('7');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("8|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>8" <? if(oranibuloran_futbol('8')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>8,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|8|".oranibuloran_futbol('8').""); ?>', this);"<? } ?>> <div class="caption">X</div> <div class="quote"><?=oranibuloran_futbol('8');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("9|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>9" <? if(oranibuloran_futbol('9')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>9,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|9|".oranibuloran_futbol('9').""); ?>', this);"<? } ?>> <div class="caption">2</div> <div class="quote"><?=oranibuloran_futbol('9');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>
<? if(oranibuloran_futbol('10')>0 || oranibuloran_futbol('11')>0 || oranibuloran_futbol('12')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w25"><?=getTranslation('futboloran4')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("10|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>10" <? if(oranibuloran_futbol('10')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>10,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|10|".oranibuloran_futbol('10').""); ?>', this);"<? } ?>> <div class="caption">1</div> <div class="quote"><?=oranibuloran_futbol('10');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("11|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>11" <? if(oranibuloran_futbol('11')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>11,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|11|".oranibuloran_futbol('11').""); ?>', this);"<? } ?>> <div class="caption">X</div> <div class="quote"><?=oranibuloran_futbol('11');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("12|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>12" <? if(oranibuloran_futbol('12')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>12,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|12|".oranibuloran_futbol('12').""); ?>', this);"<? } ?>> <div class="caption">2</div> <div class="quote"><?=oranibuloran_futbol('12');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>
<? if(oranibuloran_futbol('13')>0 || oranibuloran_futbol('14')>0 || oranibuloran_futbol('15')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w25"><?=getTranslation('futboloran5')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("13|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>13" <? if(oranibuloran_futbol('13')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>13,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|13|".oranibuloran_futbol('13').""); ?>', this);"<? } ?>> <div class="caption">1</div> <div class="quote"><?=oranibuloran_futbol('13');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("14|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>14" <? if(oranibuloran_futbol('14')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>14,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|14|".oranibuloran_futbol('14').""); ?>', this);"<? } ?>> <div class="caption">X</div> <div class="quote"><?=oranibuloran_futbol('14');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("15|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>15" <? if(oranibuloran_futbol('15')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>15,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|15|".oranibuloran_futbol('15').""); ?>', this);"<? } ?>> <div class="caption">2</div> <div class="quote"><?=oranibuloran_futbol('15');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>
<? if(oranibuloran_futbol('27')>0 || oranibuloran_futbol('28')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran10')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("27|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>27" <? if(oranibuloran_futbol('27')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>27,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|27|".oranibuloran_futbol('27').""); ?>', this);"<? } ?>> <div class="caption">1</div> <div class="quote"><?=oranibuloran_futbol('27');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("28|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>28" <? if(oranibuloran_futbol('28')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>28,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|28|".oranibuloran_futbol('28').""); ?>', this);"<? } ?>> <div class="caption">2</div> <div class="quote"><?=oranibuloran_futbol('28');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>
<? if(oranibuloran_futbol('65')>0 || oranibuloran_futbol('66')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran30')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("65|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>65" <? if(oranibuloran_futbol('65')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>65,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|65|".oranibuloran_futbol('65').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('oransecenek5')?></div> <div class="quote"><?=oranibuloran_futbol('65');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("66|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>66" <? if(oranibuloran_futbol('66')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>66,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|66|".oranibuloran_futbol('66').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('oransecenek6')?></div> <div class="quote"><?=oranibuloran_futbol('66');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>
</div>

<? } ?>

<? if(oranibuloran_futbol('33')>0 || oranibuloran_futbol('34')>0 || oranibuloran_futbol('131')>0 || oranibuloran_futbol('132')>0 || oranibuloran_futbol('133')>0 || oranibuloran_futbol('134')>0 || oranibuloran_futbol('135')>0 || oranibuloran_futbol('266')>0 || oranibuloran_futbol('267')>0 || oranibuloran_futbol('268')>0 || oranibuloran_futbol('269')>0 || oranibuloran_futbol('270')>0 || oranibuloran_futbol('30')>0 || oranibuloran_futbol('29')>0 || oranibuloran_futbol('32')>0 || oranibuloran_futbol('31')>0 || oranibuloran_futbol('36')>0 || oranibuloran_futbol('35')>0 || oranibuloran_futbol('38')>0 || oranibuloran_futbol('37')>0 || oranibuloran_futbol('40')>0 || oranibuloran_futbol('39')>0){ ?>

<div class="rsGroupHeader mdetails closed" onclick="minimizeRsGroup(this, &quot;rsg3&quot;)"><?=getTranslation('canlioransecenekmobil2')?></div>

<div id="rsg3" class="rsGroup" style="display:none;">
<? if(oranibuloran_futbol('33')>0 || oranibuloran_futbol('34')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran13')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("34|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>34" <? if(oranibuloran_futbol('34')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>34,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|34|".oranibuloran_futbol('34').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('34');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("33|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>33" <? if(oranibuloran_futbol('33')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>33,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|33|".oranibuloran_futbol('33').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('33');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>
<? if(oranibuloran_futbol('131')>0 || oranibuloran_futbol('132')>0 || oranibuloran_futbol('133')>0 || oranibuloran_futbol('134')>0 || oranibuloran_futbol('135')>0){ ?>

<div class="navitem odd"> <div class="w100 center text small bold" style="height:22px;"><?=getTranslation('futboloran54')?></div></div>

<div class="navitem noborder w100 odd" style="">
<div class="cell w50">
<div style="border-left: 1px solid #d7dcde;" class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("131|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>131" <? if(oranibuloran_futbol('131')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>131,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|131|".oranibuloran_futbol('131').""); ?>', this);"<? } ?>> <div class="caption">1 <?=getTranslation('vesecenegi')?> +2.5</div> <div class="quote"><?=oranibuloran_futbol('131');?></div></div>
</div>
<div class="cell w50">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("132|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>132" <? if(oranibuloran_futbol('132')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>132,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|132|".oranibuloran_futbol('132').""); ?>', this);"<? } ?>> <div class="caption">2 <?=getTranslation('vesecenegi')?> +2.5</div> <div class="quote"><?=oranibuloran_futbol('132');?></div></div>
</div>
</div>

<div class="navitem noborder w100 odd" style="">
<div class="cell w50">
<div style="border-left: 1px solid #d7dcde;" class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("133|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>133" <? if(oranibuloran_futbol('133')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>133,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|133|".oranibuloran_futbol('133').""); ?>', this);"<? } ?>> <div class="caption">1 <?=getTranslation('vesecenegi')?> -2.5</div> <div class="quote"><?=oranibuloran_futbol('133');?></div></div>
</div>
<div class="cell w50">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("134|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>134" <? if(oranibuloran_futbol('134')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>134,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|134|".oranibuloran_futbol('134').""); ?>', this);"<? } ?>> <div class="caption">2 <?=getTranslation('vesecenegi')?> -2.5</div> <div class="quote"><?=oranibuloran_futbol('134');?></div></div>
</div>
</div>

<div class="navitem noborder w100 odd" style="">
<div class="cell w100">
<div style="border-left: 1px solid #d7dcde;" class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("135|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>135" <? if(oranibuloran_futbol('135')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>135,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|135|".oranibuloran_futbol('135').""); ?>', this);"<? } ?>> <div class="caption">X</div> <div class="quote"><?=oranibuloran_futbol('135');?></div></div>
</div>
</div>
<? } ?>
<? if(oranibuloran_futbol('266')>0 || oranibuloran_futbol('267')>0 || oranibuloran_futbol('268')>0 || oranibuloran_futbol('269')>0 || oranibuloran_futbol('270')>0){ ?>

<div class="navitem odd"> <div class="w100 center text small bold" style="height:22px;"><?=getTranslation('futboloran101')?></div></div>

<div class="navitem noborder w100 odd" style="">
<div class="cell w50">
<div style="border-left: 1px solid #d7dcde;" class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("266|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>266" <? if(oranibuloran_futbol('266')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>266,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|266|".oranibuloran_futbol('266').""); ?>', this);"<? } ?>> <div class="caption">1 <?=getTranslation('vesecenegi')?> +3.5</div> <div class="quote"><?=oranibuloran_futbol('266');?></div></div>
</div>
<div class="cell w50">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("267|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>267" <? if(oranibuloran_futbol('267')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>267,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|267|".oranibuloran_futbol('267').""); ?>', this);"<? } ?>> <div class="caption">2 <?=getTranslation('vesecenegi')?> +3.5</div> <div class="quote"><?=oranibuloran_futbol('267');?></div></div>
</div>
</div>

<div class="navitem noborder w100 odd" style="">
<div class="cell w50">
<div style="border-left: 1px solid #d7dcde;" class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("268|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>268" <? if(oranibuloran_futbol('268')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>268,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|268|".oranibuloran_futbol('268').""); ?>', this);"<? } ?>> <div class="caption">1 <?=getTranslation('vesecenegi')?> -3.5</div> <div class="quote"><?=oranibuloran_futbol('268');?></div></div>
</div>
<div class="cell w50">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("269|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>269" <? if(oranibuloran_futbol('269')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>269,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|269|".oranibuloran_futbol('269').""); ?>', this);"<? } ?>> <div class="caption">2 <?=getTranslation('vesecenegi')?> -3.5</div> <div class="quote"><?=oranibuloran_futbol('269');?></div></div>
</div>
</div>

<div class="navitem noborder w100 odd" style="">
<div class="cell w100">
<div style="border-left: 1px solid #d7dcde;" class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("270|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>270" <? if(oranibuloran_futbol('270')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>270,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|270|".oranibuloran_futbol('270').""); ?>', this);"<? } ?>> <div class="caption">X</div> <div class="quote"><?=oranibuloran_futbol('270');?></div></div>
</div>
</div>
<? } ?>


<? if(oranibuloran_futbol('30')>0 || oranibuloran_futbol('29')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran11')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("30|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>30" <? if(oranibuloran_futbol('30')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>30,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|30|".oranibuloran_futbol('30').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('30');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("29|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>29" <? if(oranibuloran_futbol('29')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>29,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|29|".oranibuloran_futbol('29').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('29');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('32')>0 || oranibuloran_futbol('31')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran12')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("32|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>32" <? if(oranibuloran_futbol('32')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>32,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|32|".oranibuloran_futbol('32').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('32');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("31|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>31" <? if(oranibuloran_futbol('31')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>31,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|31|".oranibuloran_futbol('31').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('31');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('36')>0 || oranibuloran_futbol('35')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran14')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("36|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>36" <? if(oranibuloran_futbol('36')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>36,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|36|".oranibuloran_futbol('36').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('36');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("35|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>35" <? if(oranibuloran_futbol('35')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>35,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|35|".oranibuloran_futbol('35').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('35');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('38')>0 || oranibuloran_futbol('37')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran15')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("38|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>38" <? if(oranibuloran_futbol('38')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>38,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|38|".oranibuloran_futbol('38').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('38');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("37|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>37" <? if(oranibuloran_futbol('37')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>37,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|37|".oranibuloran_futbol('37').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('37');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('40')>0 || oranibuloran_futbol('39')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran16')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("40|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>40" <? if(oranibuloran_futbol('40')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>40,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|40|".oranibuloran_futbol('40').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('40');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("39|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>39" <? if(oranibuloran_futbol('39')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>39,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|39|".oranibuloran_futbol('39').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('39');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

</div>

<? } ?>

<? if(oranibuloran_futbol('136')>0 || oranibuloran_futbol('137')>0 || oranibuloran_futbol('138')>0 || oranibuloran_futbol('139')>0 || oranibuloran_futbol('140')>0 || oranibuloran_futbol('141')>0 || oranibuloran_futbol('142')>0 || oranibuloran_futbol('143')>0 || oranibuloran_futbol('144')>0 || oranibuloran_futbol('145')>0 || oranibuloran_futbol('146')>0 || oranibuloran_futbol('147')>0 || oranibuloran_futbol('148')>0 || oranibuloran_futbol('149')>0 || oranibuloran_futbol('150')>0 || oranibuloran_futbol('151')>0 || oranibuloran_futbol('152')>0 || oranibuloran_futbol('153')>0 || oranibuloran_futbol('154')>0 || oranibuloran_futbol('155')>0 || oranibuloran_futbol('156')>0 || oranibuloran_futbol('157')>0 || oranibuloran_futbol('158')>0 || oranibuloran_futbol('159')>0 || oranibuloran_futbol('160')>0 || oranibuloran_futbol('161')>0 || oranibuloran_futbol('162')>0 || oranibuloran_futbol('163')>0 || oranibuloran_futbol('164')>0 || oranibuloran_futbol('165')>0 || oranibuloran_futbol('166')>0 || oranibuloran_futbol('167')>0 || oranibuloran_futbol('168')>0 || oranibuloran_futbol('169')>0 || oranibuloran_futbol('170')>0 || oranibuloran_futbol('171')>0 || oranibuloran_futbol('172')>0 || oranibuloran_futbol('173')>0 || oranibuloran_futbol('174')>0 || oranibuloran_futbol('175')>0){ ?>

<div class="rsGroupHeader mdetails closed" onclick="minimizeRsGroup(this, &quot;rsg7&quot;)"><?=getTranslation('canlioransecenekmobil3')?></div>

<div id="rsg7" class="rsGroup" style="display:none;">

<? if(oranibuloran_futbol('136')>0 || oranibuloran_futbol('137')>0 || oranibuloran_futbol('138')>0 || oranibuloran_futbol('139')>0 || oranibuloran_futbol('140')>0 || oranibuloran_futbol('141')>0){ ?>

<div class="navitem odd"> <div class="w100 center text small bold" style="height:22px;"><?=getTranslation('futboloran55')?></div></div>

<div class="navitem noborder w100 odd" style="">
<div class="cell w50">
<div style="border-left: 1px solid #d7dcde;" class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("136|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>136" <? if(oranibuloran_futbol('136')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>136,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|136|".oranibuloran_futbol('136').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('oransecenek17')?></div> <div class="quote"><?=oranibuloran_futbol('136');?></div></div>
</div>
<div class="cell w50">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("137|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>137" <? if(oranibuloran_futbol('137')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>137,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|137|".oranibuloran_futbol('137').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('oransecenek18')?></div> <div class="quote"><?=oranibuloran_futbol('137');?></div></div>
</div>
</div>

<div class="navitem noborder w100 odd" style="">
<div class="cell w50">
<div style="border-left: 1px solid #d7dcde;" class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("138|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>138" <? if(oranibuloran_futbol('138')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>138,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|138|".oranibuloran_futbol('138').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('oransecenek19')?></div> <div class="quote"><?=oranibuloran_futbol('138');?></div></div>
</div>
<div class="cell w50">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("139|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>139" <? if(oranibuloran_futbol('139')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>139,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|139|".oranibuloran_futbol('139').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('oransecenek20')?></div> <div class="quote"><?=oranibuloran_futbol('139');?></div></div>
</div>
</div>

<div class="navitem noborder w100 odd" style="">
<div class="cell w50">
<div style="border-left: 1px solid #d7dcde;" class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("140|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>140" <? if(oranibuloran_futbol('140')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>140,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|140|".oranibuloran_futbol('140').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('oransecenek21')?></div> <div class="quote"><?=oranibuloran_futbol('140');?></div></div>
</div>
<div class="cell w50">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("141|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>141" <? if(oranibuloran_futbol('141')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>141,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|141|".oranibuloran_futbol('141').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('oransecenek22')?></div> <div class="quote"><?=oranibuloran_futbol('141');?></div></div>
</div>
</div>
<? } ?>

<? if(oranibuloran_futbol('142')>0 || oranibuloran_futbol('143')>0 || oranibuloran_futbol('144')>0 || oranibuloran_futbol('145')>0 || oranibuloran_futbol('146')>0 || oranibuloran_futbol('147')>0 || oranibuloran_futbol('148')>0 || oranibuloran_futbol('149')>0 || oranibuloran_futbol('150')>0){ ?>

<div class="navitem odd"> <div class="w100 center text small bold" style="height:22px;"><?=getTranslation('futboloran56')?></div></div>

<div class="navitem noborder w100 odd" style="">
<div class="cell w50">
<div style="border-left: 1px solid #d7dcde;" class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("142|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>142" <? if(oranibuloran_futbol('142')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>142,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|142|".oranibuloran_futbol('142').""); ?>', this);"<? } ?>> <div class="caption">1/1</div> <div class="quote"><?=oranibuloran_futbol('142');?></div></div>
</div>
<div class="cell w50">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("143|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>143" <? if(oranibuloran_futbol('143')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>143,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|143|".oranibuloran_futbol('143').""); ?>', this);"<? } ?>> <div class="caption">X/1</div> <div class="quote"><?=oranibuloran_futbol('143');?></div></div>
</div>
</div>

<div class="navitem noborder w100 odd" style="">
<div class="cell w50">
<div style="border-left: 1px solid #d7dcde;" class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("144|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>144" <? if(oranibuloran_futbol('144')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>144,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|144|".oranibuloran_futbol('144').""); ?>', this);"<? } ?>> <div class="caption">2/1</div> <div class="quote"><?=oranibuloran_futbol('144');?></div></div>
</div>
<div class="cell w50">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("145|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>145" <? if(oranibuloran_futbol('145')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>145,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|145|".oranibuloran_futbol('145').""); ?>', this);"<? } ?>> <div class="caption">1/X</div> <div class="quote"><?=oranibuloran_futbol('145');?></div></div>
</div>
</div>

<div class="navitem noborder w100 odd" style="">
<div class="cell w50">
<div style="border-left: 1px solid #d7dcde;" class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("146|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>146" <? if(oranibuloran_futbol('146')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>146,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|146|".oranibuloran_futbol('146').""); ?>', this);"<? } ?>> <div class="caption">X/X</div> <div class="quote"><?=oranibuloran_futbol('146');?></div></div>
</div>
<div class="cell w50">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("147|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>147" <? if(oranibuloran_futbol('147')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>147,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|147|".oranibuloran_futbol('147').""); ?>', this);"<? } ?>> <div class="caption">2/X</div> <div class="quote"><?=oranibuloran_futbol('147');?></div></div>
</div>
</div>

<div class="navitem noborder w100 odd" style="">
<div class="cell w50">
<div style="border-left: 1px solid #d7dcde;" class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("148|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>148" <? if(oranibuloran_futbol('148')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>148,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|148|".oranibuloran_futbol('148').""); ?>', this);"<? } ?>> <div class="caption">1/2</div> <div class="quote"><?=oranibuloran_futbol('148');?></div></div>
</div>
<div class="cell w50">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("149|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>149" <? if(oranibuloran_futbol('149')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>149,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|149|".oranibuloran_futbol('149').""); ?>', this);"<? } ?>> <div class="caption">X/2</div> <div class="quote"><?=oranibuloran_futbol('149');?></div></div>
</div>
</div>

<div class="navitem noborder w100 odd" style="">
<div class="cell w100">
<div style="border-left: 1px solid #d7dcde;" class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("150|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>150" <? if(oranibuloran_futbol('150')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>150,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|150|".oranibuloran_futbol('150').""); ?>', this);"<? } ?>> <div class="caption">2/2</div> <div class="quote"><?=oranibuloran_futbol('150');?></div></div>
</div>
</div>
<? } ?>

<? if(oranibuloran_futbol('151')>0 || oranibuloran_futbol('152')>0 || oranibuloran_futbol('153')>0 || oranibuloran_futbol('154')>0 || oranibuloran_futbol('155')>0 || oranibuloran_futbol('156')>0 || oranibuloran_futbol('157')>0 || oranibuloran_futbol('158')>0 || oranibuloran_futbol('159')>0 || oranibuloran_futbol('160')>0 || oranibuloran_futbol('161')>0 || oranibuloran_futbol('162')>0 || oranibuloran_futbol('163')>0 || oranibuloran_futbol('164')>0 || oranibuloran_futbol('165')>0 || oranibuloran_futbol('166')>0 || oranibuloran_futbol('167')>0 || oranibuloran_futbol('168')>0 || oranibuloran_futbol('169')>0 || oranibuloran_futbol('170')>0 || oranibuloran_futbol('171')>0 || oranibuloran_futbol('172')>0 || oranibuloran_futbol('173')>0 || oranibuloran_futbol('174')>0 || oranibuloran_futbol('175')>0){ ?>

<div class="navitem odd"> <div class="w100 center text small bold" style="height:22px;"><?=getTranslation('futboloran57')?></div></div>

<div class="navitem noborder w100 odd" style="">
<div class="cell w50">
<div style="border-left: 1px solid #d7dcde;" class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("151|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>151" <? if(oranibuloran_futbol('151')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>151,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|151|".oranibuloran_futbol('151').""); ?>', this);"<? } ?>> <div class="caption">0-0</div> <div class="quote"><?=oranibuloran_futbol('151');?></div></div>
</div>
<div class="cell w50">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("152|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>152" <? if(oranibuloran_futbol('152')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>152,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|152|".oranibuloran_futbol('152').""); ?>', this);"<? } ?>> <div class="caption">1-0</div> <div class="quote"><?=oranibuloran_futbol('152');?></div></div>
</div>
</div>

<div class="navitem noborder w100 odd" style="">
<div class="cell w50">
<div style="border-left: 1px solid #d7dcde;" class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("153|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>153" <? if(oranibuloran_futbol('153')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>153,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|153|".oranibuloran_futbol('153').""); ?>', this);"<? } ?>> <div class="caption">1-1</div> <div class="quote"><?=oranibuloran_futbol('153');?></div></div>
</div>
<div class="cell w50">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("154|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>154" <? if(oranibuloran_futbol('154')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>154,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|154|".oranibuloran_futbol('154').""); ?>', this);"<? } ?>> <div class="caption">0-1</div> <div class="quote"><?=oranibuloran_futbol('154');?></div></div>
</div>
</div>

<div class="navitem noborder w100 odd" style="">
<div class="cell w50">
<div style="border-left: 1px solid #d7dcde;" class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("155|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>155" <? if(oranibuloran_futbol('155')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>155,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|155|".oranibuloran_futbol('155').""); ?>', this);"<? } ?>> <div class="caption">2-0</div> <div class="quote"><?=oranibuloran_futbol('155');?></div></div>
</div>
<div class="cell w50">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("156|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>156" <? if(oranibuloran_futbol('156')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>156,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|156|".oranibuloran_futbol('156').""); ?>', this);"<? } ?>> <div class="caption">2-1</div> <div class="quote"><?=oranibuloran_futbol('156');?></div></div>
</div>
</div>

<div class="navitem noborder w100 odd" style="">
<div class="cell w50">
<div style="border-left: 1px solid #d7dcde;" class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("157|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>157" <? if(oranibuloran_futbol('157')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>157,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|157|".oranibuloran_futbol('157').""); ?>', this);"<? } ?>> <div class="caption">2-2</div> <div class="quote"><?=oranibuloran_futbol('157');?></div></div>
</div>
<div class="cell w50">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("158|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>158" <? if(oranibuloran_futbol('158')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>158,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|158|".oranibuloran_futbol('158').""); ?>', this);"<? } ?>> <div class="caption">1-2</div> <div class="quote"><?=oranibuloran_futbol('158');?></div></div>
</div>
</div>

<div class="navitem noborder w100 odd" style="">
<div class="cell w50">
<div style="border-left: 1px solid #d7dcde;" class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("159|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>159" <? if(oranibuloran_futbol('159')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>159,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|159|".oranibuloran_futbol('159').""); ?>', this);"<? } ?>> <div class="caption">0-2</div> <div class="quote"><?=oranibuloran_futbol('159');?></div></div>
</div>
<div class="cell w50">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("160|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>160" <? if(oranibuloran_futbol('160')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>160,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|160|".oranibuloran_futbol('160').""); ?>', this);"<? } ?>> <div class="caption">3-0</div> <div class="quote"><?=oranibuloran_futbol('160');?></div></div>
</div>
</div>

<div class="navitem noborder w100 odd" style="">
<div class="cell w50">
<div style="border-left: 1px solid #d7dcde;" class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("161|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>161" <? if(oranibuloran_futbol('161')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>161,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|161|".oranibuloran_futbol('161').""); ?>', this);"<? } ?>> <div class="caption">3-1</div> <div class="quote"><?=oranibuloran_futbol('161');?></div></div>
</div>
<div class="cell w50">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("162|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>162" <? if(oranibuloran_futbol('162')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>162,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|162|".oranibuloran_futbol('162').""); ?>', this);"<? } ?>> <div class="caption">3-2</div> <div class="quote"><?=oranibuloran_futbol('162');?></div></div>
</div>
</div>

<div class="navitem noborder w100 odd" style="">
<div class="cell w50">
<div style="border-left: 1px solid #d7dcde;" class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("163|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>163" <? if(oranibuloran_futbol('163')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>163,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|163|".oranibuloran_futbol('163').""); ?>', this);"<? } ?>> <div class="caption">3-3</div> <div class="quote"><?=oranibuloran_futbol('163');?></div></div>
</div>
<div class="cell w50">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("164|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>164" <? if(oranibuloran_futbol('164')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>164,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|164|".oranibuloran_futbol('164').""); ?>', this);"<? } ?>> <div class="caption">2-3</div> <div class="quote"><?=oranibuloran_futbol('164');?></div></div>
</div>
</div>

<div class="navitem noborder w100 odd" style="">
<div class="cell w50">
<div style="border-left: 1px solid #d7dcde;" class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("165|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>165" <? if(oranibuloran_futbol('165')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>165,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|165|".oranibuloran_futbol('165').""); ?>', this);"<? } ?>> <div class="caption">1-3</div> <div class="quote"><?=oranibuloran_futbol('165');?></div></div>
</div>
<div class="cell w50">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("166|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>166" <? if(oranibuloran_futbol('166')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>166,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|166|".oranibuloran_futbol('166').""); ?>', this);"<? } ?>> <div class="caption">0-3</div> <div class="quote"><?=oranibuloran_futbol('166');?></div></div>
</div>
</div>

<div class="navitem noborder w100 odd" style="">
<div class="cell w50">
<div style="border-left: 1px solid #d7dcde;" class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("167|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>167" <? if(oranibuloran_futbol('167')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>167,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|167|".oranibuloran_futbol('167').""); ?>', this);"<? } ?>> <div class="caption">4-0</div> <div class="quote"><?=oranibuloran_futbol('167');?></div></div>
</div>
<div class="cell w50">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("168|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>168" <? if(oranibuloran_futbol('168')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>168,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|168|".oranibuloran_futbol('168').""); ?>', this);"<? } ?>> <div class="caption">4-1</div> <div class="quote"><?=oranibuloran_futbol('168');?></div></div>
</div>
</div>

<div class="navitem noborder w100 odd" style="">
<div class="cell w50">
<div style="border-left: 1px solid #d7dcde;" class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("169|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>169" <? if(oranibuloran_futbol('169')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>169,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|169|".oranibuloran_futbol('169').""); ?>', this);"<? } ?>> <div class="caption">4-2</div> <div class="quote"><?=oranibuloran_futbol('169');?></div></div>
</div>
<div class="cell w50">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("170|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>170" <? if(oranibuloran_futbol('170')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>170,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|170|".oranibuloran_futbol('170').""); ?>', this);"<? } ?>> <div class="caption">4-3</div> <div class="quote"><?=oranibuloran_futbol('170');?></div></div>
</div>
</div>

<div class="navitem noborder w100 odd" style="">
<div class="cell w50">
<div style="border-left: 1px solid #d7dcde;" class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("171|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>171" <? if(oranibuloran_futbol('171')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>171,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|171|".oranibuloran_futbol('171').""); ?>', this);"<? } ?>> <div class="caption">4-4</div> <div class="quote"><?=oranibuloran_futbol('171');?></div></div>
</div>
<div class="cell w50">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("172|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>172" <? if(oranibuloran_futbol('172')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>172,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|172|".oranibuloran_futbol('172').""); ?>', this);"<? } ?>> <div class="caption">3-4</div> <div class="quote"><?=oranibuloran_futbol('172');?></div></div>
</div>
</div>

<div class="navitem noborder w100 odd" style="">
<div class="cell w50">
<div style="border-left: 1px solid #d7dcde;" class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("173|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>173" <? if(oranibuloran_futbol('173')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>173,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|173|".oranibuloran_futbol('173').""); ?>', this);"<? } ?>> <div class="caption">2-4</div> <div class="quote"><?=oranibuloran_futbol('173');?></div></div>
</div>
<div class="cell w50">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("174|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>174" <? if(oranibuloran_futbol('174')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>174,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|174|".oranibuloran_futbol('174').""); ?>', this);"<? } ?>> <div class="caption">1-4</div> <div class="quote"><?=oranibuloran_futbol('174');?></div></div>
</div>
</div>

<div class="navitem noborder w100 odd" style="">
<div class="cell w100">
<div style="border-left: 1px solid #d7dcde;" class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("175|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>175" <? if(oranibuloran_futbol('175')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>175,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|175|".oranibuloran_futbol('175').""); ?>', this);"<? } ?>> <div class="caption">0-4</div> <div class="quote"><?=oranibuloran_futbol('175');?></div></div>
</div>
</div>
<? } ?>

</div>

<? } ?>

<? if(oranibuloran_futbol('16')>0 || oranibuloran_futbol('17')>0 || oranibuloran_futbol('18')>0 || oranibuloran_futbol('22')>0 || oranibuloran_futbol('23')>0 || oranibuloran_futbol('24')>0 || oranibuloran_futbol('42')>0 || oranibuloran_futbol('41')>0 || oranibuloran_futbol('44')>0 || oranibuloran_futbol('43')>0 || oranibuloran_futbol('46')>0 || oranibuloran_futbol('45')>0 || oranibuloran_futbol('48')>0 || oranibuloran_futbol('47')>0 || oranibuloran_futbol('63')>0 || oranibuloran_futbol('64')>0 || oranibuloran_futbol('25')>0 || oranibuloran_futbol('26')>0){ ?>


<div class="rsGroupHeader mdetails closed" onclick="minimizeRsGroup(this, &quot;rsg5&quot;)"><?=getTranslation('canlioransecenekmobil4')?></div>

<div id="rsg5" class="rsGroup" style="display:none;">

<? if(oranibuloran_futbol('16')>0 || oranibuloran_futbol('17')>0 || oranibuloran_futbol('18')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w25"><?=getTranslation('futboloran6')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("16|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>16" <? if(oranibuloran_futbol('16')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>16,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|16|".oranibuloran_futbol('16').""); ?>', this);"<? } ?>> <div class="caption">1</div> <div class="quote"><?=oranibuloran_futbol('16');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("17|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>17" <? if(oranibuloran_futbol('17')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>17,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|17|".oranibuloran_futbol('17').""); ?>', this);"<? } ?>> <div class="caption">X</div> <div class="quote"><?=oranibuloran_futbol('17');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("18|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>18" <? if(oranibuloran_futbol('18')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>18,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|18|".oranibuloran_futbol('18').""); ?>', this);"<? } ?>> <div class="caption">2</div> <div class="quote"><?=oranibuloran_futbol('18');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('22')>0 || oranibuloran_futbol('23')>0 || oranibuloran_futbol('24')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w25"><?=getTranslation('futboloran8')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("22|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>22" <? if(oranibuloran_futbol('22')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>22,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|22|".oranibuloran_futbol('22').""); ?>', this);"<? } ?>> <div class="caption">1X</div> <div class="quote"><?=oranibuloran_futbol('22');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("23|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>23" <? if(oranibuloran_futbol('23')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>23,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|23|".oranibuloran_futbol('23').""); ?>', this);"<? } ?>> <div class="caption">X2</div> <div class="quote"><?=oranibuloran_futbol('23');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("24|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>24" <? if(oranibuloran_futbol('24')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>24,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|24|".oranibuloran_futbol('24').""); ?>', this);"<? } ?>> <div class="caption">12</div> <div class="quote"><?=oranibuloran_futbol('24');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('42')>0 || oranibuloran_futbol('41')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran18')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("42|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>42" <? if(oranibuloran_futbol('42')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>42,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|42|".oranibuloran_futbol('42').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('42');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("41|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>41" <? if(oranibuloran_futbol('41')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>41,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|41|".oranibuloran_futbol('41').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('41');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('44')>0 || oranibuloran_futbol('43')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran19')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("44|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>44" <? if(oranibuloran_futbol('44')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>44,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|44|".oranibuloran_futbol('44').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('44');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("43|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>43" <? if(oranibuloran_futbol('43')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>43,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|43|".oranibuloran_futbol('43').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('43');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('46')>0 || oranibuloran_futbol('45')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran20')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("46|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>46" <? if(oranibuloran_futbol('46')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>46,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|46|".oranibuloran_futbol('46').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('46');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("45|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>45" <? if(oranibuloran_futbol('45')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>45,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|45|".oranibuloran_futbol('45').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('45');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('48')>0 || oranibuloran_futbol('47')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran21')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("48|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>48" <? if(oranibuloran_futbol('48')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>48,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|48|".oranibuloran_futbol('48').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('48');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("47|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>47" <? if(oranibuloran_futbol('47')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>47,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|47|".oranibuloran_futbol('47').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('47');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('63')>0 || oranibuloran_futbol('64')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran29')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("63|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>63" <? if(oranibuloran_futbol('63')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>63,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|63|".oranibuloran_futbol('63').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('oransecenek5')?></div> <div class="quote"><?=oranibuloran_futbol('63');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("64|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>64" <? if(oranibuloran_futbol('64')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>64,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|64|".oranibuloran_futbol('64').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('oransecenek6')?></div> <div class="quote"><?=oranibuloran_futbol('64');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('25')>0 || oranibuloran_futbol('26')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran9')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("25|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>25" <? if(oranibuloran_futbol('25')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>25,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|25|".oranibuloran_futbol('25').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('oransecenek3')?></div> <div class="quote"><?=oranibuloran_futbol('25');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("26|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>26" <? if(oranibuloran_futbol('26')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>26,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|26|".oranibuloran_futbol('26').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('oransecenek4')?></div> <div class="quote"><?=oranibuloran_futbol('26');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

</div>

<? } ?>

<? if(oranibuloran_futbol('19')>0 || oranibuloran_futbol('20')>0 || oranibuloran_futbol('21')>0 || oranibuloran_futbol('50')>0 || oranibuloran_futbol('49')>0 || oranibuloran_futbol('52')>0 || oranibuloran_futbol('51')>0 || oranibuloran_futbol('54')>0 || oranibuloran_futbol('53')>0 || oranibuloran_futbol('56')>0 || oranibuloran_futbol('55')>0){ ?>


<div class="rsGroupHeader mdetails closed" onclick="minimizeRsGroup(this, &quot;rsg6&quot;)"><?=getTranslation('canlioransecenekmobil5')?></div>

<div id="rsg6" class="rsGroup" style="display: none;">

<? if(oranibuloran_futbol('19')>0 || oranibuloran_futbol('20')>0 || oranibuloran_futbol('21')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w25"><?=getTranslation('futboloran7')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("19|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>19" <? if(oranibuloran_futbol('19')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>19,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|19|".oranibuloran_futbol('19').""); ?>', this);"<? } ?>> <div class="caption">1</div> <div class="quote"><?=oranibuloran_futbol('19');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("20|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>20" <? if(oranibuloran_futbol('20')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>20,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|20|".oranibuloran_futbol('20').""); ?>', this);"<? } ?>> <div class="caption">X</div> <div class="quote"><?=oranibuloran_futbol('20');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("21|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>21" <? if(oranibuloran_futbol('21')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>21,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|21|".oranibuloran_futbol('21').""); ?>', this);"<? } ?>> <div class="caption">2</div> <div class="quote"><?=oranibuloran_futbol('21');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('50')>0 || oranibuloran_futbol('49')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran22')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("50|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>50" <? if(oranibuloran_futbol('50')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>50,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|50|".oranibuloran_futbol('50').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('50');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("49|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>49" <? if(oranibuloran_futbol('49')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>49,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|49|".oranibuloran_futbol('49').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('49');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('52')>0 || oranibuloran_futbol('51')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran23')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("52|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>52" <? if(oranibuloran_futbol('52')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>52,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|52|".oranibuloran_futbol('52').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('52');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("51|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>51" <? if(oranibuloran_futbol('51')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>51,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|51|".oranibuloran_futbol('51').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('51');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('54')>0 || oranibuloran_futbol('53')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran24')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("54|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>54" <? if(oranibuloran_futbol('54')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>54,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|54|".oranibuloran_futbol('54').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('54');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("53|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>53" <? if(oranibuloran_futbol('53')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>53,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|53|".oranibuloran_futbol('53').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('53');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('56')>0 || oranibuloran_futbol('55')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran25')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("56|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>56" <? if(oranibuloran_futbol('56')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>56,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|56|".oranibuloran_futbol('56').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('56');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("55|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>55" <? if(oranibuloran_futbol('55')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>55,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|55|".oranibuloran_futbol('55').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('55');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

</div>

<? } ?>

<? if(oranibuloran_futbol('67')>0 || oranibuloran_futbol('68')>0 || oranibuloran_futbol('69')>0 || oranibuloran_futbol('70')>0 || oranibuloran_futbol('57')>0 || oranibuloran_futbol('58')>0 || oranibuloran_futbol('100')>0 || oranibuloran_futbol('99')>0 || oranibuloran_futbol('103')>0 || oranibuloran_futbol('104')>0 || oranibuloran_futbol('110')>0 || oranibuloran_futbol('111')>0 || oranibuloran_futbol('112')>0 || oranibuloran_futbol('92')>0 || oranibuloran_futbol('91')>0 || oranibuloran_futbol('94')>0 || oranibuloran_futbol('93')>0 || oranibuloran_futbol('75')>0 || oranibuloran_futbol('76')>0 || oranibuloran_futbol('77')>0 || oranibuloran_futbol('78')>0 || oranibuloran_futbol('79')>0 || oranibuloran_futbol('80')>0 || oranibuloran_futbol('81')>0 || oranibuloran_futbol('82')>0){ ?>

<div class="rsGroupHeader mdetails closed" onclick="minimizeRsGroup(this, &quot;rsg8&quot;)"><?=getTranslation('canlioransecenekmobil7')?></div>

<div id="rsg8" class="rsGroup" style="display: none;">

<? if(oranibuloran_futbol('67')>0 || oranibuloran_futbol('68')>0 || oranibuloran_futbol('69')>0 || oranibuloran_futbol('70')>0){ ?>

<div class="navitem odd"> <div class="w100 center text small bold" style="height:22px;"><?=getTranslation('futboloran31')?></div></div>

<div class="navitem noborder w100 odd" style="">
<div class="cell w50">
<div style="border-left: 1px solid #d7dcde;" class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("67|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>67" <? if(oranibuloran_futbol('67')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>67,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|67|".oranibuloran_futbol('67').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('oransecenek21')?></div> <div class="quote"><?=oranibuloran_futbol('67');?></div></div>
</div>
<div class="cell w50">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("68|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>68" <? if(oranibuloran_futbol('68')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>68,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|68|".oranibuloran_futbol('68').""); ?>', this);"<? } ?>> <div class="caption">1</div> <div class="quote"><?=oranibuloran_futbol('68');?></div></div>
</div>
</div>

<div class="navitem noborder w100 odd" style="">
<div class="cell w50">
<div style="border-left: 1px solid #d7dcde;" class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("69|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>69" <? if(oranibuloran_futbol('69')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>69,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|69|".oranibuloran_futbol('69').""); ?>', this);"<? } ?>> <div class="caption">2</div> <div class="quote"><?=oranibuloran_futbol('69');?></div></div>
</div>
<div class="cell w50">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("70|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>70" <? if(oranibuloran_futbol('70')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>70,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|70|".oranibuloran_futbol('70').""); ?>', this);"<? } ?>> <div class="caption">3+</div> <div class="quote"><?=oranibuloran_futbol('70');?></div></div>
</div>
</div>
<? } ?>

<? if(oranibuloran_futbol('57')>0 || oranibuloran_futbol('58')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran26')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("57|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>57" <? if(oranibuloran_futbol('57')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>57,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|57|".oranibuloran_futbol('57').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('oransecenek3')?></div> <div class="quote"><?=oranibuloran_futbol('57');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("58|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>58" <? if(oranibuloran_futbol('58')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>58,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|58|".oranibuloran_futbol('58').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('oransecenek4')?></div> <div class="quote"><?=oranibuloran_futbol('58');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('100')>0 || oranibuloran_futbol('99')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran41')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("100|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>100" <? if(oranibuloran_futbol('100')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>100,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|100|".oranibuloran_futbol('100').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('100');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("99|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>99" <? if(oranibuloran_futbol('99')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>99,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|99|".oranibuloran_futbol('99').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('99');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('103')>0 || oranibuloran_futbol('104')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran43')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("103|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>103" <? if(oranibuloran_futbol('103')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>103,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|103|".oranibuloran_futbol('103').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('oransecenek3')?></div> <div class="quote"><?=oranibuloran_futbol('103');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("104|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>104" <? if(oranibuloran_futbol('104')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>104,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|104|".oranibuloran_futbol('104').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('oransecenek4')?></div> <div class="quote"><?=oranibuloran_futbol('104');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('110')>0 || oranibuloran_futbol('111')>0 || oranibuloran_futbol('112')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w25"><?=getTranslation('futboloran46')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("110|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>110" <? if(oranibuloran_futbol('110')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>110,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|110|".oranibuloran_futbol('110').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('oransecenek7')?></div> <div class="quote"><?=oranibuloran_futbol('110');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("111|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>111" <? if(oranibuloran_futbol('111')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>111,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|111|".oranibuloran_futbol('111').""); ?>', this);"<? } ?>> <div class="caption">X</div> <div class="quote"><?=oranibuloran_futbol('111');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("112|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>112" <? if(oranibuloran_futbol('112')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>112,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|112|".oranibuloran_futbol('112').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('oransecenek8')?></div> <div class="quote"><?=oranibuloran_futbol('112');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('92')>0 || oranibuloran_futbol('91')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran37')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("92|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>92" <? if(oranibuloran_futbol('92')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>92,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|92|".oranibuloran_futbol('92').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('92');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("91|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>91" <? if(oranibuloran_futbol('91')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>91,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|91|".oranibuloran_futbol('91').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('91');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('94')>0 || oranibuloran_futbol('93')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran38')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("94|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>94" <? if(oranibuloran_futbol('94')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>94,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|94|".oranibuloran_futbol('94').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('94');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("93|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>93" <? if(oranibuloran_futbol('93')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>93,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|93|".oranibuloran_futbol('93').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('93');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('75')>0 || oranibuloran_futbol('76')>0 || oranibuloran_futbol('77')>0 || oranibuloran_futbol('78')>0){ ?>

<div class="navitem odd"> <div class="w100 center text small bold" style="height:22px;"><?=getTranslation('futboloran33')?></div></div>

<div class="navitem noborder w100 odd" style="">
<div class="cell w50">
<div style="border-left: 1px solid #d7dcde;" class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("75|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>75" <? if(oranibuloran_futbol('75')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>75,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|75|".oranibuloran_futbol('75').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('oransecenek21')?></div> <div class="quote"><?=oranibuloran_futbol('75');?></div></div>
</div>
<div class="cell w50">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("76|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>76" <? if(oranibuloran_futbol('76')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>76,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|76|".oranibuloran_futbol('76').""); ?>', this);"<? } ?>> <div class="caption">1</div> <div class="quote"><?=oranibuloran_futbol('76');?></div></div>
</div>
</div>

<div class="navitem noborder w100 odd" style="">
<div class="cell w50">
<div style="border-left: 1px solid #d7dcde;" class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("77|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>77" <? if(oranibuloran_futbol('77')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>77,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|77|".oranibuloran_futbol('77').""); ?>', this);"<? } ?>> <div class="caption">2</div> <div class="quote"><?=oranibuloran_futbol('77');?></div></div>
</div>
<div class="cell w50">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("78|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>78" <? if(oranibuloran_futbol('78')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>78,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|78|".oranibuloran_futbol('78').""); ?>', this);"<? } ?>> <div class="caption">3+</div> <div class="quote"><?=oranibuloran_futbol('78');?></div></div>
</div>
</div>
<? } ?>

<? if(oranibuloran_futbol('79')>0 || oranibuloran_futbol('80')>0 || oranibuloran_futbol('81')>0 || oranibuloran_futbol('82')>0){ ?>

<div class="navitem odd"> <div class="w100 center text small bold" style="height:22px;"><?=getTranslation('futboloran34')?></div></div>

<div class="navitem noborder w100 odd" style="">
<div class="cell w50">
<div style="border-left: 1px solid #d7dcde;" class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("79|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>79" <? if(oranibuloran_futbol('79')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>79,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|79|".oranibuloran_futbol('79').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('oransecenek21')?></div> <div class="quote"><?=oranibuloran_futbol('79');?></div></div>
</div>
<div class="cell w50">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("80|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>80" <? if(oranibuloran_futbol('80')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>80,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|80|".oranibuloran_futbol('80').""); ?>', this);"<? } ?>> <div class="caption">1</div> <div class="quote"><?=oranibuloran_futbol('80');?></div></div>
</div>
</div>

<div class="navitem noborder w100 odd" style="">
<div class="cell w50">
<div style="border-left: 1px solid #d7dcde;" class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("81|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>81" <? if(oranibuloran_futbol('81')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>81,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|81|".oranibuloran_futbol('81').""); ?>', this);"<? } ?>> <div class="caption">2</div> <div class="quote"><?=oranibuloran_futbol('81');?></div></div>
</div>
<div class="cell w50">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("82|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>82" <? if(oranibuloran_futbol('82')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>82,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|82|".oranibuloran_futbol('82').""); ?>', this);"<? } ?>> <div class="caption">3+</div> <div class="quote"><?=oranibuloran_futbol('82');?></div></div>
</div>
</div>
<? } ?>

</div>

<? } ?>

<? if(oranibuloran_futbol('71')>0 || oranibuloran_futbol('72')>0 || oranibuloran_futbol('73')>0 || oranibuloran_futbol('74')>0 || oranibuloran_futbol('59')>0 || oranibuloran_futbol('60')>0 || oranibuloran_futbol('102')>0 || oranibuloran_futbol('101')>0 || oranibuloran_futbol('105')>0 || oranibuloran_futbol('106')>0 || oranibuloran_futbol('113')>0 || oranibuloran_futbol('114')>0 || oranibuloran_futbol('115')>0 || oranibuloran_futbol('96')>0 || oranibuloran_futbol('95')>0 || oranibuloran_futbol('98')>0 || oranibuloran_futbol('97')>0 || oranibuloran_futbol('83')>0 || oranibuloran_futbol('84')>0 || oranibuloran_futbol('85')>0 || oranibuloran_futbol('86')>0 || oranibuloran_futbol('87')>0 || oranibuloran_futbol('88')>0 || oranibuloran_futbol('89')>0 || oranibuloran_futbol('90')>0){ ?>

<div class="rsGroupHeader mdetails closed" onclick="minimizeRsGroup(this, &quot;rsg9&quot;)"><?=getTranslation('canlioransecenekmobil8')?></div>

<div id="rsg9" class="rsGroup" style="display:none;">

<? if(oranibuloran_futbol('71')>0 || oranibuloran_futbol('72')>0 || oranibuloran_futbol('73')>0 || oranibuloran_futbol('74')>0){ ?>

<div class="navitem odd"> <div class="w100 center text small bold" style="height:22px;"><?=getTranslation('futboloran32')?></div></div>

<div class="navitem noborder w100 odd" style="">
<div class="cell w50">
<div style="border-left: 1px solid #d7dcde;" class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("71|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>71" <? if(oranibuloran_futbol('71')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>71,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|71|".oranibuloran_futbol('71').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('oransecenek21')?></div> <div class="quote"><?=oranibuloran_futbol('71');?></div></div>
</div>
<div class="cell w50">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("72|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>72" <? if(oranibuloran_futbol('72')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>72,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|72|".oranibuloran_futbol('72').""); ?>', this);"<? } ?>> <div class="caption">1</div> <div class="quote"><?=oranibuloran_futbol('72');?></div></div>
</div>
</div>

<div class="navitem noborder w100 odd" style="">
<div class="cell w50">
<div style="border-left: 1px solid #d7dcde;" class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("73|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>73" <? if(oranibuloran_futbol('73')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>73,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|73|".oranibuloran_futbol('73').""); ?>', this);"<? } ?>> <div class="caption">2</div> <div class="quote"><?=oranibuloran_futbol('73');?></div></div>
</div>
<div class="cell w50">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("74|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>74" <? if(oranibuloran_futbol('74')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>74,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|74|".oranibuloran_futbol('74').""); ?>', this);"<? } ?>> <div class="caption">3+</div> <div class="quote"><?=oranibuloran_futbol('74');?></div></div>
</div>
</div>
<? } ?>

<? if(oranibuloran_futbol('59')>0 || oranibuloran_futbol('60')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran27')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("59|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>59" <? if(oranibuloran_futbol('59')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>59,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|59|".oranibuloran_futbol('59').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('oransecenek3')?></div> <div class="quote"><?=oranibuloran_futbol('59');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("60|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>60" <? if(oranibuloran_futbol('60')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>60,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|60|".oranibuloran_futbol('60').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('oransecenek4')?></div> <div class="quote"><?=oranibuloran_futbol('60');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('102')>0 || oranibuloran_futbol('101')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran42')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("102|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>102" <? if(oranibuloran_futbol('102')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>102,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|102|".oranibuloran_futbol('102').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('102');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("101|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>101" <? if(oranibuloran_futbol('101')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>101,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|101|".oranibuloran_futbol('101').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('101');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('105')>0 || oranibuloran_futbol('106')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran44')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("105|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>105" <? if(oranibuloran_futbol('105')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>105,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|105|".oranibuloran_futbol('105').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('oransecenek3')?></div> <div class="quote"><?=oranibuloran_futbol('105');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("106|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>106" <? if(oranibuloran_futbol('106')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>106,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|106|".oranibuloran_futbol('106').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('oransecenek4')?></div> <div class="quote"><?=oranibuloran_futbol('106');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('113')>0 || oranibuloran_futbol('114')>0 || oranibuloran_futbol('115')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w25"><?=getTranslation('futboloran47')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("113|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>113" <? if(oranibuloran_futbol('113')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>113,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|113|".oranibuloran_futbol('113').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('oransecenek7')?></div> <div class="quote"><?=oranibuloran_futbol('113');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("114|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>114" <? if(oranibuloran_futbol('114')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>114,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|114|".oranibuloran_futbol('114').""); ?>', this);"<? } ?>> <div class="caption">X</div> <div class="quote"><?=oranibuloran_futbol('114');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("115|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>115" <? if(oranibuloran_futbol('115')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>115,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|115|".oranibuloran_futbol('115').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('oransecenek8')?></div> <div class="quote"><?=oranibuloran_futbol('115');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('96')>0 || oranibuloran_futbol('95')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran39')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("96|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>96" <? if(oranibuloran_futbol('96')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>96,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|96|".oranibuloran_futbol('96').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('96');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("95|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>95" <? if(oranibuloran_futbol('95')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>95,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|95|".oranibuloran_futbol('95').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('95');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('98')>0 || oranibuloran_futbol('97')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran40')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("98|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>98" <? if(oranibuloran_futbol('98')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>98,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|98|".oranibuloran_futbol('98').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('98');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("97|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>97" <? if(oranibuloran_futbol('97')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>97,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|97|".oranibuloran_futbol('97').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('97');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('83')>0 || oranibuloran_futbol('84')>0 || oranibuloran_futbol('85')>0 || oranibuloran_futbol('86')>0){ ?>

<div class="navitem odd"> <div class="w100 center text small bold" style="height:22px;"><?=getTranslation('futboloran35')?></div></div>

<div class="navitem noborder w100 odd" style="">
<div class="cell w50">
<div style="border-left: 1px solid #d7dcde;" class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("83|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>83" <? if(oranibuloran_futbol('83')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>83,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|83|".oranibuloran_futbol('83').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('oransecenek21')?></div> <div class="quote"><?=oranibuloran_futbol('83');?></div></div>
</div>
<div class="cell w50">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("84|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>84" <? if(oranibuloran_futbol('84')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>84,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|84|".oranibuloran_futbol('84').""); ?>', this);"<? } ?>> <div class="caption">1</div> <div class="quote"><?=oranibuloran_futbol('84');?></div></div>
</div>
</div>

<div class="navitem noborder w100 odd" style="">
<div class="cell w50">
<div style="border-left: 1px solid #d7dcde;" class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("85|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>85" <? if(oranibuloran_futbol('85')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>85,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|85|".oranibuloran_futbol('85').""); ?>', this);"<? } ?>> <div class="caption">2</div> <div class="quote"><?=oranibuloran_futbol('85');?></div></div>
</div>
<div class="cell w50">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("86|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>86" <? if(oranibuloran_futbol('86')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>86,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|86|".oranibuloran_futbol('86').""); ?>', this);"<? } ?>> <div class="caption">3+</div> <div class="quote"><?=oranibuloran_futbol('86');?></div></div>
</div>
</div>
<? } ?>

<? if(oranibuloran_futbol('87')>0 || oranibuloran_futbol('88')>0 || oranibuloran_futbol('89')>0 || oranibuloran_futbol('90')>0){ ?>

<div class="navitem odd"> <div class="w100 center text small bold" style="height:22px;"><?=getTranslation('futboloran36')?></div></div>

<div class="navitem noborder w100 odd" style="">
<div class="cell w50">
<div style="border-left: 1px solid #d7dcde;" class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("87|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>87" <? if(oranibuloran_futbol('87')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>87,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|87|".oranibuloran_futbol('87').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('oransecenek21')?></div> <div class="quote"><?=oranibuloran_futbol('87');?></div></div>
</div>
<div class="cell w50">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("88|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>88" <? if(oranibuloran_futbol('88')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>88,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|88|".oranibuloran_futbol('88').""); ?>', this);"<? } ?>> <div class="caption">1</div> <div class="quote"><?=oranibuloran_futbol('88');?></div></div>
</div>
</div>

<div class="navitem noborder w100 odd" style="">
<div class="cell w50">
<div style="border-left: 1px solid #d7dcde;" class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("89|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>89" <? if(oranibuloran_futbol('89')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>89,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|89|".oranibuloran_futbol('89').""); ?>', this);"<? } ?>> <div class="caption">2</div> <div class="quote"><?=oranibuloran_futbol('89');?></div></div>
</div>
<div class="cell w50">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("90|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>90" <? if(oranibuloran_futbol('90')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>90,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|90|".oranibuloran_futbol('90').""); ?>', this);"<? } ?>> <div class="caption">3+</div> <div class="quote"><?=oranibuloran_futbol('90');?></div></div>
</div>
</div>
<? } ?>

</div>

<? } ?>

<? if(oranibuloran_futbol('107')>0 || oranibuloran_futbol('108')>0 || oranibuloran_futbol('109')>0 || oranibuloran_futbol('116')>0 || oranibuloran_futbol('117')>0 || oranibuloran_futbol('118')>0 || oranibuloran_futbol('119')>0 || oranibuloran_futbol('120')>0 || oranibuloran_futbol('121')>0 || oranibuloran_futbol('122')>0 || oranibuloran_futbol('123')>0 || oranibuloran_futbol('124')>0 || oranibuloran_futbol('125')>0 || oranibuloran_futbol('126')>0 || oranibuloran_futbol('127')>0 || oranibuloran_futbol('128')>0 || oranibuloran_futbol('129')>0 || oranibuloran_futbol('130')>0){ ?>

<div class="rsGroupHeader mdetails closed" onclick="minimizeRsGroup(this, &quot;rsg4&quot;)"><?=getTranslation('canlioransecenekmobil6')?></div>

<div id="rsg4" class="rsGroup" style="display:none;">

<? if(oranibuloran_futbol('107')>0 || oranibuloran_futbol('108')>0 || oranibuloran_futbol('109')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w25"><?=getTranslation('futboloran45')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("107|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>107" <? if(oranibuloran_futbol('107')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>107,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|107|".oranibuloran_futbol('107').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('oransecenek7')?></div> <div class="quote"><?=oranibuloran_futbol('107');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("108|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>108" <? if(oranibuloran_futbol('108')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>108,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|108|".oranibuloran_futbol('108').""); ?>', this);"<? } ?>> <div class="caption">X</div> <div class="quote"><?=oranibuloran_futbol('108');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("109|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>109" <? if(oranibuloran_futbol('109')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>109,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|109|".oranibuloran_futbol('109').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('oransecenek8')?></div> <div class="quote"><?=oranibuloran_futbol('109');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('116')>0 || oranibuloran_futbol('117')>0 || oranibuloran_futbol('118')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w25"><?=getTranslation('futboloran48')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("116|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>116" <? if(oranibuloran_futbol('116')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>116,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|116|".oranibuloran_futbol('116').""); ?>', this);"<? } ?>> <div class="caption">0-1</div> <div class="quote"><?=oranibuloran_futbol('116');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("117|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>117" <? if(oranibuloran_futbol('117')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>117,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|117|".oranibuloran_futbol('117').""); ?>', this);"<? } ?>> <div class="caption">2-3</div> <div class="quote"><?=oranibuloran_futbol('117');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("118|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>118" <? if(oranibuloran_futbol('118')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>118,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|118|".oranibuloran_futbol('118').""); ?>', this);"<? } ?>> <div class="caption">4+</div> <div class="quote"><?=oranibuloran_futbol('118');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('119')>0 || oranibuloran_futbol('120')>0 || oranibuloran_futbol('121')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w25"><?=getTranslation('futboloran49')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("119|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>119" <? if(oranibuloran_futbol('119')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>119,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|119|".oranibuloran_futbol('119').""); ?>', this);"<? } ?>> <div class="caption">0-2</div> <div class="quote"><?=oranibuloran_futbol('119');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("120|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>120" <? if(oranibuloran_futbol('120')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>120,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|120|".oranibuloran_futbol('120').""); ?>', this);"<? } ?>> <div class="caption">3-4</div> <div class="quote"><?=oranibuloran_futbol('120');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("121|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>121" <? if(oranibuloran_futbol('121')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>121,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|121|".oranibuloran_futbol('121').""); ?>', this);"<? } ?>> <div class="caption">5+</div> <div class="quote"><?=oranibuloran_futbol('121');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('122')>0 || oranibuloran_futbol('123')>0 || oranibuloran_futbol('124')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w25"><?=getTranslation('futboloran50')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("122|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>122" <? if(oranibuloran_futbol('122')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>122,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|122|".oranibuloran_futbol('122').""); ?>', this);"<? } ?>> <div class="caption">0-3</div> <div class="quote"><?=oranibuloran_futbol('122');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("123|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>123" <? if(oranibuloran_futbol('123')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>123,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|123|".oranibuloran_futbol('123').""); ?>', this);"<? } ?>> <div class="caption">4-5</div> <div class="quote"><?=oranibuloran_futbol('123');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("124|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>124" <? if(oranibuloran_futbol('124')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>124,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|124|".oranibuloran_futbol('124').""); ?>', this);"<? } ?>> <div class="caption">6+</div> <div class="quote"><?=oranibuloran_futbol('124');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('125')>0 || oranibuloran_futbol('126')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran51')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("125|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>125" <? if(oranibuloran_futbol('125')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>125,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|125|".oranibuloran_futbol('125').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('oransecenek3')?></div> <div class="quote"><?=oranibuloran_futbol('125');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("126|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>126" <? if(oranibuloran_futbol('126')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>126,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|126|".oranibuloran_futbol('126').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('oransecenek4')?></div> <div class="quote"><?=oranibuloran_futbol('126');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('127')>0 || oranibuloran_futbol('128')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran52')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("127|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>127" <? if(oranibuloran_futbol('127')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>127,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|127|".oranibuloran_futbol('127').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('oransecenek3')?></div> <div class="quote"><?=oranibuloran_futbol('127');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("128|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>128" <? if(oranibuloran_futbol('128')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>128,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|128|".oranibuloran_futbol('128').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('oransecenek4')?></div> <div class="quote"><?=oranibuloran_futbol('128');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('129')>0 || oranibuloran_futbol('130')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran53')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("129|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>129" <? if(oranibuloran_futbol('129')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>129,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|129|".oranibuloran_futbol('129').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('oransecenek3')?></div> <div class="quote"><?=oranibuloran_futbol('129');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("130|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>130" <? if(oranibuloran_futbol('130')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>130,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|130|".oranibuloran_futbol('130').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('oransecenek4')?></div> <div class="quote"><?=oranibuloran_futbol('130');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

</div>

<? } ?>

<? if($oran1>0 || $oran2>0 || $oran3>0 || $oran4>0 || $oran5>0 || $oran6>0 || $oran7>0 || $oran8>0 || $oran9>0 || $oran10>0 || $oran11>0 || $oran12>0 || $oran13>0 || $oran14>0 || $oran15>0 || $oran16>0 || $oran17>0 || $oran18>0 || $oran19>0 || $oran20>0 || $oran21>0 || $oran22>0 || $oran23>0 || $oran24>0 || $oran25>0 || $oran26>0 || $oran27>0 || $oran28>0 || $oran29>0 || $oran30>0 || $oran31>0 || $oran32>0 || $oran33>0 || $oran34>0 || $oran35>0 || $oran36>0 || $oran37>0 || $oran38>0 || $oran39>0 || $oran40>0 || $oran41>0 || $oran42>0 || $oran43>0 || $oran44>0 || $oran45>0 || $oran46>0 || $oran47>0 || $oran48>0 || $oran49>0 || $oran50>0 || $oran51>0 || $oran52>0 || $oran53>0 || $oran54>0 || $oran55>0 || $oran56>0 || $oran57>0 || $oran58>0 || $oran59>0 || $oran60>0 || $oran61>0 || $oran62>0 || $oran63>0 || $oran64>0 || $oran65>0 || $oran66>0 || $oran67>0 || $oran68>0 || $oran69>0 || $oran70>0 || $oran71>0 || $oran72>0 || $oran73>0 || $oran74>0 || $oran75>0 || $oran76>0 || $oran77>0 || $oran78>0 || $oran79>0 || $oran80>0 || $oran81>0 || $oran82>0 || $oran83>0 || $oran84>0 || $oran85>0 || $oran86>0 || $oran87>0){ ?>

<div class="rsGroupHeader mdetails" onclick="minimizeRsGroup(this, &quot;rsg11&quot;)"><?=getTranslation('canlioransecenekmobil10')?></div>

<div id="rsg11" class="rsGroup" style="display: block;">

<? if(oranibuloran_futbol('183')>0 || oranibuloran_futbol('184')>0 || oranibuloran_futbol('185')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w25"><?=getTranslation('futboloran61')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("183|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>183" <? if(oranibuloran_futbol('183')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>183,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|183|".oranibuloran_futbol('183').""); ?>', this);"<? } ?>> <div class="caption">0</div> <div class="quote"><?=oranibuloran_futbol('183');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("184|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>184" <? if(oranibuloran_futbol('184')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>184,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|184|".oranibuloran_futbol('184').""); ?>', this);"<? } ?>> <div class="caption">1</div> <div class="quote"><?=oranibuloran_futbol('184');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("185|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>185" <? if(oranibuloran_futbol('185')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>185,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|185|".oranibuloran_futbol('185').""); ?>', this);"<? } ?>> <div class="caption">2+</div> <div class="quote"><?=oranibuloran_futbol('185');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('181')>0 || oranibuloran_futbol('182')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran60')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("181|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>181" <? if(oranibuloran_futbol('181')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>181,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|181|".oranibuloran_futbol('181').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('oransecenek3')?></div> <div class="quote"><?=oranibuloran_futbol('181');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("182|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>182" <? if(oranibuloran_futbol('182')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>182,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|182|".oranibuloran_futbol('182').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('oransecenek4')?></div> <div class="quote"><?=oranibuloran_futbol('182');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('200')>0 || oranibuloran_futbol('201')>0 || oranibuloran_futbol('202')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w25"><?=getTranslation('futboloran69')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("200|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>200" <? if(oranibuloran_futbol('200')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>200,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|200|".oranibuloran_futbol('200').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('canlioransecenek7')?></div> <div class="quote"><?=oranibuloran_futbol('200');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("201|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>201" <? if(oranibuloran_futbol('201')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>201,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|201|".oranibuloran_futbol('201').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('oransecenek61')?></div> <div class="quote"><?=oranibuloran_futbol('201');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("202|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>202" <? if(oranibuloran_futbol('202')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>202,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|202|".oranibuloran_futbol('202').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('canlioransecenek8')?></div> <div class="quote"><?=oranibuloran_futbol('202');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('179')>0 || oranibuloran_futbol('180')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran59')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("179|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>179" <? if(oranibuloran_futbol('179')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>179,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|179|".oranibuloran_futbol('179').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('179');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("180|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>180" <? if(oranibuloran_futbol('180')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>180,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|180|".oranibuloran_futbol('180').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('180');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('198')>0 || oranibuloran_futbol('199')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran68')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("198|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>198" <? if(oranibuloran_futbol('198')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>198,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|198|".oranibuloran_futbol('198').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('oransecenek5')?></div> <div class="quote"><?=oranibuloran_futbol('198');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("199|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>199" <? if(oranibuloran_futbol('199')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>199,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|199|".oranibuloran_futbol('199').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('oransecenek6')?></div> <div class="quote"><?=oranibuloran_futbol('199');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('186')>0 || oranibuloran_futbol('187')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran62')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("186|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>186" <? if(oranibuloran_futbol('186')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>186,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|186|".oranibuloran_futbol('186').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('186');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("187|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>187" <? if(oranibuloran_futbol('187')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>187,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|187|".oranibuloran_futbol('187').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('187');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('188')>0 || oranibuloran_futbol('189')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran63')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("188|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>188" <? if(oranibuloran_futbol('188')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>188,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|188|".oranibuloran_futbol('188').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('188');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("189|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>189" <? if(oranibuloran_futbol('189')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>189,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|189|".oranibuloran_futbol('189').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('189');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('190')>0 || oranibuloran_futbol('191')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran64')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("190|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>190" <? if(oranibuloran_futbol('190')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>190,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|190|".oranibuloran_futbol('190').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('190');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("191|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>191" <? if(oranibuloran_futbol('191')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>191,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|191|".oranibuloran_futbol('191').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('191');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('192')>0 || oranibuloran_futbol('193')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran65')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("192|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>192" <? if(oranibuloran_futbol('192')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>192,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|192|".oranibuloran_futbol('192').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('192');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("193|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>193" <? if(oranibuloran_futbol('193')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>193,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|193|".oranibuloran_futbol('193').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('193');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('194')>0 || oranibuloran_futbol('195')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran66')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("194|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>194" <? if(oranibuloran_futbol('194')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>194,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|194|".oranibuloran_futbol('194').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('194');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("195|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>195" <? if(oranibuloran_futbol('195')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>195,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|195|".oranibuloran_futbol('195').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('195');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('196')>0 || oranibuloran_futbol('197')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran67')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("196|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>196" <? if(oranibuloran_futbol('196')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>196,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|196|".oranibuloran_futbol('196').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('196');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("197|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>197" <? if(oranibuloran_futbol('197')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>197,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|197|".oranibuloran_futbol('197').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('197');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('203')>0 || oranibuloran_futbol('204')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran70')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("203|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>203" <? if(oranibuloran_futbol('203')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>203,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|203|".oranibuloran_futbol('203').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('203');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("204|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>204" <? if(oranibuloran_futbol('204')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>204,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|204|".oranibuloran_futbol('204').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('204');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('205')>0 || oranibuloran_futbol('206')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran71')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("205|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>205" <? if(oranibuloran_futbol('205')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>205,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|205|".oranibuloran_futbol('205').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('205');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("206|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>206" <? if(oranibuloran_futbol('206')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>206,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|206|".oranibuloran_futbol('206').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('206');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('207')>0 || oranibuloran_futbol('208')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran72')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("207|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>207" <? if(oranibuloran_futbol('207')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>207,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|207|".oranibuloran_futbol('207').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('207');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("208|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>208" <? if(oranibuloran_futbol('208')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>208,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|208|".oranibuloran_futbol('208').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('208');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('209')>0 || oranibuloran_futbol('210')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran73')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("209|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>209" <? if(oranibuloran_futbol('209')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>209,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|209|".oranibuloran_futbol('209').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('209');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("210|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>210" <? if(oranibuloran_futbol('210')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>210,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|210|".oranibuloran_futbol('210').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('210');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('211')>0 || oranibuloran_futbol('212')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran74')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("211|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>211" <? if(oranibuloran_futbol('211')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>211,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|211|".oranibuloran_futbol('211').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('211');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("212|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>212" <? if(oranibuloran_futbol('212')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>212,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|212|".oranibuloran_futbol('212').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('212');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('213')>0 || oranibuloran_futbol('214')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran75')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("213|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>213" <? if(oranibuloran_futbol('213')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>213,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|213|".oranibuloran_futbol('213').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('213');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("214|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>214" <? if(oranibuloran_futbol('214')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>214,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|214|".oranibuloran_futbol('214').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('214');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('215')>0 || oranibuloran_futbol('216')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran76')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("215|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>215" <? if(oranibuloran_futbol('215')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>215,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|215|".oranibuloran_futbol('215').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('215');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("216|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>216" <? if(oranibuloran_futbol('216')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>216,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|216|".oranibuloran_futbol('216').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('216');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('217')>0 || oranibuloran_futbol('218')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran77')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("217|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>217" <? if(oranibuloran_futbol('217')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>217,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|217|".oranibuloran_futbol('217').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('217');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("218|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>218" <? if(oranibuloran_futbol('218')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>218,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|218|".oranibuloran_futbol('218').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('218');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('219')>0 || oranibuloran_futbol('220')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran78')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("219|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>219" <? if(oranibuloran_futbol('219')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>219,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|219|".oranibuloran_futbol('219').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('219');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("220|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>220" <? if(oranibuloran_futbol('220')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>220,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|220|".oranibuloran_futbol('220').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('220');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('221')>0 || oranibuloran_futbol('222')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran79')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("221|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>221" <? if(oranibuloran_futbol('221')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>221,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|221|".oranibuloran_futbol('221').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('221');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("222|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>222" <? if(oranibuloran_futbol('222')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>222,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|222|".oranibuloran_futbol('222').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('222');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('223')>0 || oranibuloran_futbol('224')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran80')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("223|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>223" <? if(oranibuloran_futbol('223')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>223,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|223|".oranibuloran_futbol('223').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('223');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("224|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>224" <? if(oranibuloran_futbol('224')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>224,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|224|".oranibuloran_futbol('224').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('224');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('261')>0 || oranibuloran_futbol('262')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran99')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("261|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>261" <? if(oranibuloran_futbol('261')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>261,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|261|".oranibuloran_futbol('261').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('oransecenek5')?></div> <div class="quote"><?=oranibuloran_futbol('261');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("262|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>262" <? if(oranibuloran_futbol('262')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>262,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|262|".oranibuloran_futbol('262').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('oransecenek6')?></div> <div class="quote"><?=oranibuloran_futbol('262');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('263')>0 || oranibuloran_futbol('264')>0 || oranibuloran_futbol('265')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w25"><?=getTranslation('futboloran100')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("263|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>263" <? if(oranibuloran_futbol('263')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>263,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|263|".oranibuloran_futbol('263').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('canlioransecenek7')?></div> <div class="quote"><?=oranibuloran_futbol('263');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("264|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>264" <? if(oranibuloran_futbol('264')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>264,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|264|".oranibuloran_futbol('264').""); ?>', this);"<? } ?>> <div class="caption">X</div> <div class="quote"><?=oranibuloran_futbol('264');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("265|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>265" <? if(oranibuloran_futbol('265')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>265,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|265|".oranibuloran_futbol('265').""); ?>', this);"<? } ?>> <div class="caption"><?=getTranslation('canlioransecenek8')?></div> <div class="quote"><?=oranibuloran_futbol('265');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('225')>0 || oranibuloran_futbol('226')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran81')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("225|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>225" <? if(oranibuloran_futbol('225')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>225,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|225|".oranibuloran_futbol('225').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('225');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("226|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>226" <? if(oranibuloran_futbol('226')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>226,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|226|".oranibuloran_futbol('226').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('226');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('227')>0 || oranibuloran_futbol('228')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran82')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("227|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>227" <? if(oranibuloran_futbol('227')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>227,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|227|".oranibuloran_futbol('227').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('227');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("228|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>228" <? if(oranibuloran_futbol('228')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>228,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|228|".oranibuloran_futbol('228').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('228');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('229')>0 || oranibuloran_futbol('230')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran83')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("229|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>229" <? if(oranibuloran_futbol('229')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>229,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|229|".oranibuloran_futbol('229').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('229');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("230|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>230" <? if(oranibuloran_futbol('230')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>230,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|230|".oranibuloran_futbol('230').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('230');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('231')>0 || oranibuloran_futbol('232')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran84')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("231|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>231" <? if(oranibuloran_futbol('231')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>231,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|231|".oranibuloran_futbol('231').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('231');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("232|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>232" <? if(oranibuloran_futbol('232')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>232,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|232|".oranibuloran_futbol('232').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('232');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('233')>0 || oranibuloran_futbol('234')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran85')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("233|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>233" <? if(oranibuloran_futbol('233')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>233,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|233|".oranibuloran_futbol('233').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('233');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("234|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>234" <? if(oranibuloran_futbol('234')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>234,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|234|".oranibuloran_futbol('234').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('234');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('235')>0 || oranibuloran_futbol('236')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran86')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("235|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>235" <? if(oranibuloran_futbol('235')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>235,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|235|".oranibuloran_futbol('235').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('235');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("236|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>236" <? if(oranibuloran_futbol('236')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>236,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|236|".oranibuloran_futbol('236').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('236');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('237')>0 || oranibuloran_futbol('238')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran87')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("237|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>237" <? if(oranibuloran_futbol('237')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>237,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|237|".oranibuloran_futbol('237').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('237');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("238|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>238" <? if(oranibuloran_futbol('238')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>238,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|238|".oranibuloran_futbol('238').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('238');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('239')>0 || oranibuloran_futbol('240')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran88')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("239|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>239" <? if(oranibuloran_futbol('239')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>239,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|239|".oranibuloran_futbol('239').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('239');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("240|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>240" <? if(oranibuloran_futbol('240')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>240,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|240|".oranibuloran_futbol('240').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('240');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('241')>0 || oranibuloran_futbol('242')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran89')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("241|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>241" <? if(oranibuloran_futbol('241')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>241,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|241|".oranibuloran_futbol('241').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('241');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("242|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>242" <? if(oranibuloran_futbol('242')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>242,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|242|".oranibuloran_futbol('242').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('242');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('243')>0 || oranibuloran_futbol('244')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran90')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("243|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>243" <? if(oranibuloran_futbol('243')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>243,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|243|".oranibuloran_futbol('243').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('243');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("244|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>244" <? if(oranibuloran_futbol('244')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>244,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|244|".oranibuloran_futbol('244').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('244');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('245')>0 || oranibuloran_futbol('246')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran91')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("245|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>245" <? if(oranibuloran_futbol('245')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>245,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|245|".oranibuloran_futbol('245').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('245');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("246|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>246" <? if(oranibuloran_futbol('246')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>246,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|246|".oranibuloran_futbol('246').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('246');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('247')>0 || oranibuloran_futbol('248')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran92')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("247|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>247" <? if(oranibuloran_futbol('247')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>247,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|247|".oranibuloran_futbol('247').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('247');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("248|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>248" <? if(oranibuloran_futbol('248')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>248,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|248|".oranibuloran_futbol('248').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('248');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('249')>0 || oranibuloran_futbol('250')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran93')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("249|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>249" <? if(oranibuloran_futbol('249')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>249,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|249|".oranibuloran_futbol('249').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('249');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("250|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>250" <? if(oranibuloran_futbol('250')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>250,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|250|".oranibuloran_futbol('250').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('250');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('251')>0 || oranibuloran_futbol('252')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran94')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("251|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>251" <? if(oranibuloran_futbol('251')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>251,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|251|".oranibuloran_futbol('251').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('251');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("252|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>252" <? if(oranibuloran_futbol('252')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>252,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|252|".oranibuloran_futbol('252').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('252');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('253')>0 || oranibuloran_futbol('254')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran95')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("253|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>253" <? if(oranibuloran_futbol('253')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>253,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|253|".oranibuloran_futbol('253').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('253');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("254|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>254" <? if(oranibuloran_futbol('254')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>254,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|254|".oranibuloran_futbol('254').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('254');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('255')>0 || oranibuloran_futbol('256')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran96')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("255|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>255" <? if(oranibuloran_futbol('255')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>255,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|255|".oranibuloran_futbol('255').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('255');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("256|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>256" <? if(oranibuloran_futbol('256')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>256,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|256|".oranibuloran_futbol('256').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('256');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('257')>0 || oranibuloran_futbol('258')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran97')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("257|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>257" <? if(oranibuloran_futbol('257')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>257,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|257|".oranibuloran_futbol('257').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('257');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("258|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>258" <? if(oranibuloran_futbol('258')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>258,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|258|".oranibuloran_futbol('258').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('258');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

<? if(oranibuloran_futbol('259')>0 || oranibuloran_futbol('260')>0){ ?>
<div class="navitem noborder w100 odd" style="">
<div class="cell rsDesc w50"><?=getTranslation('futboloran98')?></div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton s <?=md5("259|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>259" <? if(oranibuloran_futbol('259')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>259,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|259|".oranibuloran_futbol('259').""); ?>', this);"<? } ?>> <div class="caption">+</div> <div class="quote"><?=oranibuloran_futbol('259');?></div></div>
</div>
<div class="cell w25 rsBut">
<div class="<?=$mb["mac_kodu"];?> qbutton m <?=md5("260|".$mb["mac_kodu"]);?>" oddsid="<?=$mb["mac_kodu"];?>260" <? if(oranibuloran_futbol('260')>0){ ?>onclick="kupon(<?=$mb["mac_kodu"];?>260,<?=$mb["mac_kodu"];?>,'<?=codekupon("$oranibulencode_futbol|260|".oranibuloran_futbol('260').""); ?>', this);"<? } ?>> <div class="caption">-</div> <div class="quote"><?=oranibuloran_futbol('260');?></div></div>
</div>
<div class=""></div>
</div>
<? } ?>

</div>
<? } 
$sor = sed_sql_query("select oran_val_id,mac_kodu from kupon where session_id='$session_id' and spor_tip='futbol'");

while($row=sed_sql_fetcharray($sor)) { ?>

<script>
$("div[oddsid='<?=$row['mac_kodu'];?><?=$row['oran_val_id'];?>']").addClass('selected');
</script>

<? } ?>

<? }

if($a=="basketbol") {

$mac_db_id=gd("id");

$mb = bilgi("select * from program_basketbol where id='$mac_db_id'");

$fark = $mb['mac_time']-time();

$gizli_oran_tips = gizli_oran_tips_basketbol($mb['id']);

if($gizli_oran_tips!="") { $gizli_ekle = "and oran_tip not in ($gizli_oran_tips)"; } else { $gizli_ekle = ""; }

?>

<div style="text-align: center;font-weight: bold;color: #f64835;background-color: #fff;position: relative;z-index: 9999;" onclick="loadbulten2();"><?=getTranslation('exportlisteyedon')?></div>

<div class="odd singlebar barmiddle " style="<? if($mb['istatistik']>0){ ?>z-index: 100;position: absolute;<? } ?>">
<div id="e9441141" class="event match noborder">
<div class="hidden"><div colspan="11" class="c_comment"><div class="c_comment"></div><div class="c_pointer"></div></div></div>
<div class="event_wrapper">
<div class="datetime ">
<div class="favorites hidden"> <img src="assets/img/favorite0.png"> </div>
<div class="sportsIcon "><div class="icon"><div class="sports soccer"></div> </div></div>
<div class="date small ">
<div> <?=date("d.m H:i",$mb['mac_time']); ?> </div>
<img src="assets/img/live_rain.png" alt="" width="23" height="23" class="hidden">
<span class=""> <img src="assets/img/icon_live.png" alt="" width="24" height="12"> </span>
</div>
</div>
<div class="teamrows">
<div class="teamrow">
<div class="team"> <?=$mb['ev_takim'];?>  </div>
<div class="score">
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
</div>
</div>
<div class="teamrow">
<div class="team"> <?=$mb['konuk_takim'];?>  </div>
<div class="score">
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
</div>
</div>
</div>
<div class="hidden"> <div class="hidden">  </div></div>
<div class="hidden"></div>
<div class="placeholder "></div>
</div>
</div>
</div>

<? if($mb['istatistik']>0){ ?>
<iframe src="https://href.li/?https://cs.betradar.com/ls/widgets/?/totobo/tr/page/widgets_lmts#matchId=<?=$mb['istatistik'];?>" id="liveTrackerCenter" frameborder="0" scrolling="no" style="width: 100%;height: 340px;margin-top:-45px;" onload="resizeIframe(this)"></iframe>
<? } ?>

<div id="anabahisler" class="rsGroupHeader mdetails" onclick="minimizeRsGroup(this, &quot;rsg1&quot;)"><?=getTranslation('canlioransecenekmobil1')?></div>

<div id="rsg1" class="rsGroup" style="display: block;">

<?

$orderle = "FIELD(oran_tip, '1', '2', '4', '7', '5') ASC";

$sor = sed_sql_query("select mac_db_id,oran_tip,durum from oranlar_basketbol where mac_db_id='$mac_db_id' and durum='1' and oran_tip IN (1,2,4,5,7) $gizli_ekle group by oran_tip order by {$orderle}");
$toplamoran = sed_sql_numrows($sor);
?>
<? if($toplamoran==0) { ?><script>jQuery('#anabahisler').hide();jQuery('#rsg1').hide();</script><? } ?>
<?
$i = 1;
while($ass=sed_sql_fetchassoc($sor)) {
$i++;
$tip = bilgi("select id,tip_isim,tip_kodu from oran_tip_basketbol where id='$ass[oran_tip]'");
?>
<? if($tip['tip_kodu']==3) { ?>	
<div class="navitem noborder w100 odd" style=""> <div class="cell rsDesc w25"><?=getTranslation('basketboloran'.$tip['id'].'')?></div>
<?
$sss = sed_sql_query("select id,mac_db_id,oran_tip,oran_val_id,oran,durum,oran_val_b from oranlar_basketbol where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' group by oran_val_id order by oran_val_id asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_basketbol where id='$row[oran_val_id]'");
$mbs = mbsverb($mb['id'],$mb['mbs'],$mb['kupa_id']);
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$mbs|$mb[mac_time]|basketbol";
$buoran = oranbulb($mac_db_id,$row['id']);
?>
<div class="cell w25 rsBut"> <div class="<?=$mb["mac_kodu"];?> qbutton <?=md5($row['oran_val_id']."|".$mb["id"]);?>  " oddsid="<?=$mb["mac_kodu"];?><?=$row["id"];?>" onclick="kupon(<?=$mb["mac_kodu"];?><?=$row["id"];?>,<?=$mb["mac_kodu"];?>,'<?=codekupon("$encoded|$row[id]|$buoran"); ?>', this);"> <div class="caption"><? if($oran_bilgi['oran_val']=="E"){ ?><?=getTranslation('oransecenek3')?><? } else if($oran_bilgi['oran_val']=="H"){ ?><?=getTranslation('oransecenek4')?><? } else if($oran_bilgi['oran_val']=="A"){ ?><?=getTranslation('oransecenek2')?><? } else if($oran_bilgi['oran_val']=="Ü"){ ?><?=getTranslation('oransecenek1')?><? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?><?=getTranslation('oransecenek21')?><? } else if($oran_bilgi['oran_val']=="X ve V"){ ?><?=getTranslation('oransecenek22')?><? } else if($oran_bilgi['oran_val']=="Ç"){ ?><?=getTranslation('oransecenek5')?><? } else if($oran_bilgi['oran_val']=="T"){ ?><?=getTranslation('oransecenek6')?><? } else { ?><?=$oran_bilgi['oran_val'];?><? } ?> <? if($row['oran_val_b']!="") { echo "( <font style='color:#f00;font-weight:bold;'>$row[oran_val_b]</font> )"; } ?></div> <div class="quote"><?=nf($buoran); ?></div></div></div>
<? } ?>
<div class=""></div>
</div>
<? } else if($tip['tip_kodu']==2) { ?>
<div class="navitem noborder w100 odd" style=""> <div class="cell rsDesc w50"><?=getTranslation('basketboloran'.$tip['id'].'')?></div>
<?
$sss = sed_sql_query("select id,mac_db_id,oran_tip,oran_val_id,oran,durum,oran_val_b from oranlar_basketbol where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' group by oran_val_id order by oran_val_id asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_basketbol where id='$row[oran_val_id]'");
$mbs = mbsverb($mb['id'],$mb['mbs'],$mb['kupa_id']);
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$mbs|$mb[mac_time]|basketbol";
$buoran = oranbulb($mac_db_id,$row['id']);
?>
<div class="cell w25 rsBut"> <div class="<?=$mb["mac_kodu"];?> qbutton <?=md5($row['oran_val_id']."|".$mb["id"]);?>  " oddsid="<?=$mb["mac_kodu"];?><?=$row["id"];?>" onclick="kupon(<?=$mb["mac_kodu"];?><?=$row["id"];?>,<?=$mb["mac_kodu"];?>,'<?=codekupon("$encoded|$row[id]|$buoran"); ?>', this);"> <div class="caption"><? if($oran_bilgi['oran_val']=="E"){ ?><?=getTranslation('oransecenek3')?><? } else if($oran_bilgi['oran_val']=="H"){ ?><?=getTranslation('oransecenek4')?><? } else if($oran_bilgi['oran_val']=="A"){ ?><?=getTranslation('oransecenek2')?><? } else if($oran_bilgi['oran_val']=="Ü"){ ?><?=getTranslation('oransecenek1')?><? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?><?=getTranslation('oransecenek21')?><? } else if($oran_bilgi['oran_val']=="X ve V"){ ?><?=getTranslation('oransecenek22')?><? } else if($oran_bilgi['oran_val']=="Ç"){ ?><?=getTranslation('oransecenek5')?><? } else if($oran_bilgi['oran_val']=="T"){ ?><?=getTranslation('oransecenek6')?><? } else { ?><?=$oran_bilgi['oran_val'];?><? } ?> <? if($row['oran_val_b']!="") { echo "( <font style='color:#f00;font-weight:bold;'>$row[oran_val_b]</font> )"; } ?></div> <div class="quote"><?=nf($buoran); ?></div></div></div>
<? } ?>
<div class=""></div>
</div>
<? } else if($tip['tip_kodu']==4) { ?>
<div class="navitem odd"> <div class="w100 center text small bold" style="height:22px;"><?=getTranslation('basketboloran'.$tip['id'].'')?></div></div>
<div class="navitem noborder w100 odd">
<?
$sss = sed_sql_query("select id,mac_db_id,oran_tip,oran_val_id,oran,durum,oran_val_b from oranlar_basketbol where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' group by oran_val_b,oran_val_id order by id asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_basketbol where id='$row[oran_val_id]'");
$mbs = mbsverb($mb['id'],$mb['mbs'],$mb['kupa_id']);
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$mbs|$mb[mac_time]|basketbol";
$buoran = oranbulb($mac_db_id,$row['id']);
?>

<div class="cell w50"> <div <? if($kz==1 || $kz==3 || $kz==5 || $kz==7 || $kz==9 || $kz==11 || $kz==13 || $kz==15 || $kz==17 || $kz==19 || $kz==21 || $kz==23 || $kz==25 || $kz==27 || $kz==29 || $kz==31 || $kz==33 || $kz==35 || $kz==37 || $kz==39){ ?>style="border-left: 1px solid #d7dcde;"<? } ?> class="<?=$mb["mac_kodu"];?> qbutton <?=md5($row['oran_val_id']."|".$mb["id"]);?>  " oddsid="<?=$mb["mac_kodu"];?><?=$row["id"];?>" onclick="kupon(<?=$mb["mac_kodu"];?><?=$row["id"];?>,<?=$mb["mac_kodu"];?>,'<?=codekupon("$encoded|$row[id]|$buoran"); ?>', this);"> <div class="caption"><? if($oran_bilgi['oran_val']=="E"){ ?><?=getTranslation('oransecenek3')?><? } else if($oran_bilgi['oran_val']=="H"){ ?><?=getTranslation('oransecenek4')?><? } else if($oran_bilgi['oran_val']=="A"){ ?><?=getTranslation('oransecenek2')?><? } else if($oran_bilgi['oran_val']=="Ü"){ ?><?=getTranslation('oransecenek1')?><? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?><?=getTranslation('oransecenek21')?><? } else if($oran_bilgi['oran_val']=="X ve V"){ ?><?=getTranslation('oransecenek22')?><? } else if($oran_bilgi['oran_val']=="Ç"){ ?><?=getTranslation('oransecenek5')?><? } else if($oran_bilgi['oran_val']=="T"){ ?><?=getTranslation('oransecenek6')?><? } else { ?><?=$oran_bilgi['oran_val'];?><? } ?> <? if($row['oran_val_b']!="") { echo "( <font style='color:#f00;font-weight:bold;'>$row[oran_val_b]</font> )"; } ?></div> <div class="quote"><?=nf($buoran); ?></div></div></div>
<? if($kz==2 || $kz==4 || $kz==6 || $kz==8 || $kz==10 || $kz==12 || $kz==14 || $kz==16 || $kz==18 || $kz==20 || $kz==22 || $kz==24 || $kz==26 || $kz==28 || $kz==30 || $kz==32 || $kz==34 || $kz==36 || $kz==38 || $kz==40){ ?>
</div>
<div class="navitem noborder w100 odd">
<? } ?>
<? } ?>
</div>
<div class=""></div>
<? } ?>

<? } ?>

</div>

<div id="birinciyaribahisleri" class="rsGroupHeader mdetails closed" onclick="minimizeRsGroup(this, &quot;rsg5&quot;)"><?=getTranslation('canlioransecenekmobil4')?></div>

<div id="rsg5" class="rsGroup" style="display: none;">

<?

$orderle = "FIELD(oran_tip, '3','19','6') ASC";

$sor = sed_sql_query("select mac_db_id,oran_tip,durum from oranlar_basketbol where mac_db_id='$mac_db_id' and durum='1' and oran_tip IN (3,6,19) $gizli_ekle group by oran_tip order by {$orderle}");
$toplamoran = sed_sql_numrows($sor);
?>
<? if($toplamoran==0) { ?><script>jQuery('#birinciyaribahisleri').hide();jQuery('#rsg5').hide();</script><? } ?>
<?
$i = 1;
while($ass=sed_sql_fetchassoc($sor)) {
$i++;
$tip = bilgi("select id,tip_isim,tip_kodu from oran_tip_basketbol where id='$ass[oran_tip]'");
?>
<? if($tip['tip_kodu']==3) { ?>	
<div class="navitem noborder w100 odd" style=""> <div class="cell rsDesc w25"><?=getTranslation('basketboloran'.$tip['id'].'')?></div>
<?
$sss = sed_sql_query("select id,mac_db_id,oran_tip,oran_val_id,oran,durum,oran_val_b from oranlar_basketbol where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' group by oran_val_id order by oran_val_id asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_basketbol where id='$row[oran_val_id]'");
$mbs = mbsverb($mb['id'],$mb['mbs'],$mb['kupa_id']);
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$mbs|$mb[mac_time]|basketbol";
$buoran = oranbulb($mac_db_id,$row['id']);
?>
<div class="cell w25 rsBut"> <div class="<?=$mb["mac_kodu"];?> qbutton <?=md5($row['oran_val_id']."|".$mb["id"]);?>  " oddsid="<?=$mb["mac_kodu"];?><?=$row["id"];?>" onclick="kupon(<?=$mb["mac_kodu"];?><?=$row["id"];?>,<?=$mb["mac_kodu"];?>,'<?=codekupon("$encoded|$row[id]|$buoran"); ?>', this);"> <div class="caption"><? if($oran_bilgi['oran_val']=="E"){ ?><?=getTranslation('oransecenek3')?><? } else if($oran_bilgi['oran_val']=="H"){ ?><?=getTranslation('oransecenek4')?><? } else if($oran_bilgi['oran_val']=="A"){ ?><?=getTranslation('oransecenek2')?><? } else if($oran_bilgi['oran_val']=="Ü"){ ?><?=getTranslation('oransecenek1')?><? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?><?=getTranslation('oransecenek21')?><? } else if($oran_bilgi['oran_val']=="X ve V"){ ?><?=getTranslation('oransecenek22')?><? } else if($oran_bilgi['oran_val']=="Ç"){ ?><?=getTranslation('oransecenek5')?><? } else if($oran_bilgi['oran_val']=="T"){ ?><?=getTranslation('oransecenek6')?><? } else { ?><?=$oran_bilgi['oran_val'];?><? } ?> <? if($row['oran_val_b']!="") { echo "( <font style='color:#f00;font-weight:bold;'>$row[oran_val_b]</font> )"; } ?></div> <div class="quote"><?=nf($buoran); ?></div></div></div>
<? } ?>
<div class=""></div>
</div>
<? } else if($tip['tip_kodu']==2) { ?>
<div class="navitem noborder w100 odd" style=""> <div class="cell rsDesc w50"><?=getTranslation('basketboloran'.$tip['id'].'')?></div>
<?
$sss = sed_sql_query("select id,mac_db_id,oran_tip,oran_val_id,oran,durum,oran_val_b from oranlar_basketbol where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' group by oran_val_id order by oran_val_id asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_basketbol where id='$row[oran_val_id]'");
$mbs = mbsverb($mb['id'],$mb['mbs'],$mb['kupa_id']);
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$mbs|$mb[mac_time]|basketbol";
$buoran = oranbulb($mac_db_id,$row['id']);
?>
<div class="cell w25 rsBut"> <div class="<?=$mb["mac_kodu"];?> qbutton <?=md5($row['oran_val_id']."|".$mb["id"]);?>  " oddsid="<?=$mb["mac_kodu"];?><?=$row["id"];?>" onclick="kupon(<?=$mb["mac_kodu"];?><?=$row["id"];?>,<?=$mb["mac_kodu"];?>,'<?=codekupon("$encoded|$row[id]|$buoran"); ?>', this);"> <div class="caption"><? if($oran_bilgi['oran_val']=="E"){ ?><?=getTranslation('oransecenek3')?><? } else if($oran_bilgi['oran_val']=="H"){ ?><?=getTranslation('oransecenek4')?><? } else if($oran_bilgi['oran_val']=="A"){ ?><?=getTranslation('oransecenek2')?><? } else if($oran_bilgi['oran_val']=="Ü"){ ?><?=getTranslation('oransecenek1')?><? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?><?=getTranslation('oransecenek21')?><? } else if($oran_bilgi['oran_val']=="X ve V"){ ?><?=getTranslation('oransecenek22')?><? } else if($oran_bilgi['oran_val']=="Ç"){ ?><?=getTranslation('oransecenek5')?><? } else if($oran_bilgi['oran_val']=="T"){ ?><?=getTranslation('oransecenek6')?><? } else { ?><?=$oran_bilgi['oran_val'];?><? } ?> <? if($row['oran_val_b']!="") { echo "( <font style='color:#f00;font-weight:bold;'>$row[oran_val_b]</font> )"; } ?></div> <div class="quote"><?=nf($buoran); ?></div></div></div>
<? } ?>
<div class=""></div>
</div>
<? } else if($tip['tip_kodu']==4) { ?>
<div class="navitem odd"> <div class="w100 center text small bold" style="height:22px;"><?=getTranslation('basketboloran'.$tip['id'].'')?></div></div>
<div class="navitem noborder w100 odd">
<?
$sss = sed_sql_query("select id,mac_db_id,oran_tip,oran_val_id,oran,durum,oran_val_b from oranlar_basketbol where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' group by oran_val_b,oran_val_id order by id asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_basketbol where id='$row[oran_val_id]'");
$mbs = mbsverb($mb['id'],$mb['mbs'],$mb['kupa_id']);
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$mbs|$mb[mac_time]|basketbol";
$buoran = oranbulb($mac_db_id,$row['id']);
?>

<div class="cell w50"> <div <? if($kz==1 || $kz==3 || $kz==5 || $kz==7 || $kz==9 || $kz==11 || $kz==13 || $kz==15 || $kz==17 || $kz==19 || $kz==21 || $kz==23 || $kz==25 || $kz==27 || $kz==29 || $kz==31 || $kz==33 || $kz==35 || $kz==37 || $kz==39){ ?>style="border-left: 1px solid #d7dcde;"<? } ?> class="<?=$mb["mac_kodu"];?> qbutton <?=md5($row['oran_val_id']."|".$mb["id"]);?>  " oddsid="<?=$mb["mac_kodu"];?><?=$row["id"];?>" onclick="kupon(<?=$mb["mac_kodu"];?><?=$row["id"];?>,<?=$mb["mac_kodu"];?>,'<?=codekupon("$encoded|$row[id]|$buoran"); ?>', this);"> <div class="caption"><? if($oran_bilgi['oran_val']=="E"){ ?><?=getTranslation('oransecenek3')?><? } else if($oran_bilgi['oran_val']=="H"){ ?><?=getTranslation('oransecenek4')?><? } else if($oran_bilgi['oran_val']=="A"){ ?><?=getTranslation('oransecenek2')?><? } else if($oran_bilgi['oran_val']=="Ü"){ ?><?=getTranslation('oransecenek1')?><? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?><?=getTranslation('oransecenek21')?><? } else if($oran_bilgi['oran_val']=="X ve V"){ ?><?=getTranslation('oransecenek22')?><? } else if($oran_bilgi['oran_val']=="Ç"){ ?><?=getTranslation('oransecenek5')?><? } else if($oran_bilgi['oran_val']=="T"){ ?><?=getTranslation('oransecenek6')?><? } else { ?><?=$oran_bilgi['oran_val'];?><? } ?> <? if($row['oran_val_b']!="") { echo "( <font style='color:#f00;font-weight:bold;'>$row[oran_val_b]</font> )"; } ?></div> <div class="quote"><?=nf($buoran); ?></div></div></div>
<? if($kz==2 || $kz==4 || $kz==6 || $kz==8 || $kz==10 || $kz==12 || $kz==14 || $kz==16 || $kz==18 || $kz==20 || $kz==22 || $kz==24 || $kz==26 || $kz==28 || $kz==30 || $kz==32 || $kz==34 || $kz==36 || $kz==38 || $kz==40){ ?>
</div>
<div class="navitem noborder w100 odd">
<? } ?>
<? } ?>
</div>
<div class=""></div>
<? } ?>

<? } ?>

</div>

<div id="ceyrekbahisleri" class="rsGroupHeader mdetails closed" onclick="minimizeRsGroup(this, &quot;rsg13&quot;)"><?=getTranslation('canlioransecenekmobil11')?></div>

<div id="rsg13" class="rsGroup" style="display: none;">

<?

$orderle = "FIELD(oran_tip, '17','18') ASC";

$sor = sed_sql_query("select mac_db_id,oran_tip,durum from oranlar_basketbol where mac_db_id='$mac_db_id' and durum='1' and oran_tip IN (17,18) $gizli_ekle group by oran_tip order by {$orderle}");
$toplamoran = sed_sql_numrows($sor);
?>
<? if($toplamoran==0) { ?><script>jQuery('#ceyrekbahisleri').hide();jQuery('#rsg13').hide();</script><? } ?>
<?
$i = 1;
while($ass=sed_sql_fetchassoc($sor)) {
$i++;
$tip = bilgi("select id,tip_isim,tip_kodu from oran_tip_basketbol where id='$ass[oran_tip]'");

?>
<? if($tip['tip_kodu']==2) { ?>
<div class="navitem noborder w100 odd" style=""> <div class="cell rsDesc w50"><?=getTranslation('basketboloran'.$tip['id'].'')?></div>
<?
$sss = sed_sql_query("select id,mac_db_id,oran_tip,oran_val_id,oran,durum,oran_val_b from oranlar_basketbol where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' group by oran_val_id order by oran_val_id asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_basketbol where id='$row[oran_val_id]'");
$mbs = mbsverb($mb['id'],$mb['mbs'],$mb['kupa_id']);
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$mbs|$mb[mac_time]|basketbol";
$buoran = oranbulb($mac_db_id,$row['id']);
?>
<div class="cell w25 rsBut"> <div class="<?=$mb["mac_kodu"];?> qbutton <?=md5($row['oran_val_id']."|".$mb["id"]);?>  " oddsid="<?=$mb["mac_kodu"];?><?=$row["id"];?>" onclick="kupon(<?=$mb["mac_kodu"];?><?=$row["id"];?>,<?=$mb["mac_kodu"];?>,'<?=codekupon("$encoded|$row[id]|$buoran"); ?>', this);"> <div class="caption"><? if($oran_bilgi['oran_val']=="E"){ ?><?=getTranslation('oransecenek3')?><? } else if($oran_bilgi['oran_val']=="H"){ ?><?=getTranslation('oransecenek4')?><? } else if($oran_bilgi['oran_val']=="A"){ ?><?=getTranslation('oransecenek2')?><? } else if($oran_bilgi['oran_val']=="Ü"){ ?><?=getTranslation('oransecenek1')?><? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?><?=getTranslation('oransecenek21')?><? } else if($oran_bilgi['oran_val']=="X ve V"){ ?><?=getTranslation('oransecenek22')?><? } else if($oran_bilgi['oran_val']=="Ç"){ ?><?=getTranslation('oransecenek5')?><? } else if($oran_bilgi['oran_val']=="T"){ ?><?=getTranslation('oransecenek6')?><? } else { ?><?=$oran_bilgi['oran_val'];?><? } ?> <? if($row['oran_val_b']!="") { echo "( <font style='color:#f00;font-weight:bold;'>$row[oran_val_b]</font> )"; } ?></div> <div class="quote"><?=nf($buoran); ?></div></div></div>
<? } ?>
<div class=""></div>
</div>
<? } ?>

<? } ?>

</div>

<div id="evsahibibahisleri" class="rsGroupHeader mdetails closed" onclick="minimizeRsGroup(this, &quot;rsg8&quot;)"><?=getTranslation('canlioransecenekmobil7')?></div>

<div id="rsg8" class="rsGroup" style="display: none;">

<?

$orderle = "FIELD(oran_tip, '13','15','11') ASC";

$sor = sed_sql_query("select mac_db_id,oran_tip,durum from oranlar_basketbol where mac_db_id='$mac_db_id' and durum='1' and oran_tip IN (11,13,15) $gizli_ekle group by oran_tip order by {$orderle}");
$toplamoran = sed_sql_numrows($sor);
?>
<? if($toplamoran==0) { ?><script>jQuery('#evsahibibahisleri').hide();jQuery('#rsg8').hide();</script><? } ?>
<?
$i = 1;
while($ass=sed_sql_fetchassoc($sor)) {
$i++;
$tip = bilgi("select id,tip_isim,tip_kodu from oran_tip_basketbol where id='$ass[oran_tip]'");
?>
<? if($tip['tip_kodu']==4) { ?>
<div class="navitem odd"> <div class="w100 center text small bold" style="height:22px;"><?=getTranslation('basketboloran'.$tip['id'].'')?></div></div>
<div class="navitem noborder w100 odd">
<?
$sss = sed_sql_query("select id,mac_db_id,oran_tip,oran_val_id,oran,durum,oran_val_b from oranlar_basketbol where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' group by oran_val_b,oran_val_id order by id asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_basketbol where id='$row[oran_val_id]'");
$mbs = mbsverb($mb['id'],$mb['mbs'],$mb['kupa_id']);
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$mbs|$mb[mac_time]|basketbol";
$buoran = oranbulb($mac_db_id,$row['id']);
?>

<div class="cell w50"> <div <? if($kz==1 || $kz==3 || $kz==5 || $kz==7 || $kz==9 || $kz==11 || $kz==13 || $kz==15 || $kz==17 || $kz==19 || $kz==21 || $kz==23 || $kz==25 || $kz==27 || $kz==29 || $kz==31 || $kz==33 || $kz==35 || $kz==37 || $kz==39){ ?>style="border-left: 1px solid #d7dcde;"<? } ?> class="<?=$mb["mac_kodu"];?> qbutton <?=md5($row['oran_val_id']."|".$mb["id"]);?>  " oddsid="<?=$mb["mac_kodu"];?><?=$row["id"];?>" onclick="kupon(<?=$mb["mac_kodu"];?><?=$row["id"];?>,<?=$mb["mac_kodu"];?>,'<?=codekupon("$encoded|$row[id]|$buoran"); ?>', this);"> <div class="caption"><? if($oran_bilgi['oran_val']=="E"){ ?><?=getTranslation('oransecenek3')?><? } else if($oran_bilgi['oran_val']=="H"){ ?><?=getTranslation('oransecenek4')?><? } else if($oran_bilgi['oran_val']=="A"){ ?><?=getTranslation('oransecenek2')?><? } else if($oran_bilgi['oran_val']=="Ü"){ ?><?=getTranslation('oransecenek1')?><? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?><?=getTranslation('oransecenek21')?><? } else if($oran_bilgi['oran_val']=="X ve V"){ ?><?=getTranslation('oransecenek22')?><? } else if($oran_bilgi['oran_val']=="Ç"){ ?><?=getTranslation('oransecenek5')?><? } else if($oran_bilgi['oran_val']=="T"){ ?><?=getTranslation('oransecenek6')?><? } else { ?><?=$oran_bilgi['oran_val'];?><? } ?> <? if($row['oran_val_b']!="") { echo "( <font style='color:#f00;font-weight:bold;'>$row[oran_val_b]</font> )"; } ?></div> <div class="quote"><?=nf($buoran); ?></div></div></div>
<? if($kz==2 || $kz==4 || $kz==6 || $kz==8 || $kz==10 || $kz==12 || $kz==14 || $kz==16 || $kz==18 || $kz==20 || $kz==22 || $kz==24 || $kz==26 || $kz==28 || $kz==30 || $kz==32 || $kz==34 || $kz==36 || $kz==38 || $kz==40){ ?>
</div>
<div class="navitem noborder w100 odd">
<? } ?>
<? } ?>
</div>
<div class=""></div>
<? } ?>

<? } ?>

</div>

<div id="deplasmanbahisleri" class="rsGroupHeader mdetails closed" onclick="minimizeRsGroup(this, &quot;rsg9&quot;)"><?=getTranslation('canlioransecenekmobil8')?></div>

<div id="rsg9" class="rsGroup" style="display: none;">

<?

$orderle = "FIELD(oran_tip, '14','16','12') ASC";

$sor = sed_sql_query("select mac_db_id,oran_tip,durum from oranlar_basketbol where mac_db_id='$mac_db_id' and durum='1' and oran_tip IN (12,14,16) $gizli_ekle group by oran_tip order by {$orderle}");
$toplamoran = sed_sql_numrows($sor);
?>
<? if($toplamoran==0) { ?><script>jQuery('#deplasmanbahisleri').hide();jQuery('#rsg9').hide();</script><? } ?>
<?
$i = 1;
while($ass=sed_sql_fetchassoc($sor)) {
$i++;
$tip = bilgi("select id,tip_isim,tip_kodu from oran_tip_basketbol where id='$ass[oran_tip]'");
?>
<? if($tip['tip_kodu']==4) { ?>
<div class="navitem odd"> <div class="w100 center text small bold" style="height:22px;"><?=getTranslation('basketboloran'.$tip['id'].'')?></div></div>
<div class="navitem noborder w100 odd">
<?
$sss = sed_sql_query("select id,mac_db_id,oran_tip,oran_val_id,oran,durum,oran_val_b from oranlar_basketbol where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' group by oran_val_b,oran_val_id order by id asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_basketbol where id='$row[oran_val_id]'");
$mbs = mbsverb($mb['id'],$mb['mbs'],$mb['kupa_id']);
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$mbs|$mb[mac_time]|basketbol";
$buoran = oranbulb($mac_db_id,$row['id']);
?>

<div class="cell w50"> <div <? if($kz==1 || $kz==3 || $kz==5 || $kz==7 || $kz==9 || $kz==11 || $kz==13 || $kz==15 || $kz==17 || $kz==19 || $kz==21 || $kz==23 || $kz==25 || $kz==27 || $kz==29 || $kz==31 || $kz==33 || $kz==35 || $kz==37 || $kz==39){ ?>style="border-left: 1px solid #d7dcde;"<? } ?> class="<?=$mb["mac_kodu"];?> qbutton <?=md5($row['oran_val_id']."|".$mb["id"]);?>  " oddsid="<?=$mb["mac_kodu"];?><?=$row["id"];?>" onclick="kupon(<?=$mb["mac_kodu"];?><?=$row["id"];?>,<?=$mb["mac_kodu"];?>,'<?=codekupon("$encoded|$row[id]|$buoran"); ?>', this);"> <div class="caption"><? if($oran_bilgi['oran_val']=="E"){ ?><?=getTranslation('oransecenek3')?><? } else if($oran_bilgi['oran_val']=="H"){ ?><?=getTranslation('oransecenek4')?><? } else if($oran_bilgi['oran_val']=="A"){ ?><?=getTranslation('oransecenek2')?><? } else if($oran_bilgi['oran_val']=="Ü"){ ?><?=getTranslation('oransecenek1')?><? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?><?=getTranslation('oransecenek21')?><? } else if($oran_bilgi['oran_val']=="X ve V"){ ?><?=getTranslation('oransecenek22')?><? } else if($oran_bilgi['oran_val']=="Ç"){ ?><?=getTranslation('oransecenek5')?><? } else if($oran_bilgi['oran_val']=="T"){ ?><?=getTranslation('oransecenek6')?><? } else { ?><?=$oran_bilgi['oran_val'];?><? } ?> <? if($row['oran_val_b']!="") { echo "( <font style='color:#f00;font-weight:bold;'>$row[oran_val_b]</font> )"; } ?></div> <div class="quote"><?=nf($buoran); ?></div></div></div>
<? if($kz==2 || $kz==4 || $kz==6 || $kz==8 || $kz==10 || $kz==12 || $kz==14 || $kz==16 || $kz==18 || $kz==20 || $kz==22 || $kz==24 || $kz==26 || $kz==28 || $kz==30 || $kz==32 || $kz==34 || $kz==36 || $kz==38 || $kz==40){ ?>
</div>
<div class="navitem noborder w100 odd">
<? } ?>
<? } ?>
</div>
<div class=""></div>
<? } ?>

<? } ?>

</div>

<div id="digerbahisler" class="rsGroupHeader mdetails closed" onclick="minimizeRsGroup(this, &quot;rsg11&quot;)"><?=getTranslation('canlioransecenekmobil9')?></div>

<div id="rsg11" class="rsGroup" style="display: none;">

<?

$orderle = "FIELD(oran_tip, '9','10','8') ASC";

$sor = sed_sql_query("select mac_db_id,oran_tip,durum from oranlar_basketbol where mac_db_id='$mac_db_id' and durum='1' and oran_tip IN (8,9,10) $gizli_ekle group by oran_tip order by {$orderle}");
$toplamoran = sed_sql_numrows($sor);
?>
<? if($toplamoran==0) { ?><script>jQuery('#digerbahisler').hide();jQuery('#rsg11').hide();</script><? } ?>
<?
$i = 1;
while($ass=sed_sql_fetchassoc($sor)) {
$i++;
$tip = bilgi("select id,tip_isim,tip_kodu from oran_tip_basketbol where id='$ass[oran_tip]'");
?>
<? if($tip['tip_kodu']==2) { ?>
<div class="navitem noborder w100 odd" style=""> <div class="cell rsDesc w50"><?=getTranslation('basketboloran'.$tip['id'].'')?></div>
<?
$sss = sed_sql_query("select id,mac_db_id,oran_tip,oran_val_id,oran,durum,oran_val_b from oranlar_basketbol where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' group by oran_val_id order by oran_val_id asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_basketbol where id='$row[oran_val_id]'");
$mbs = mbsverb($mb['id'],$mb['mbs'],$mb['kupa_id']);
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$mbs|$mb[mac_time]|basketbol";
$buoran = oranbulb($mac_db_id,$row['id']);
?>
<div class="cell w25 rsBut"> <div class="<?=$mb["mac_kodu"];?> qbutton <?=md5($row['oran_val_id']."|".$mb["id"]);?>  " oddsid="<?=$mb["mac_kodu"];?><?=$row["id"];?>" onclick="kupon(<?=$mb["mac_kodu"];?><?=$row["id"];?>,<?=$mb["mac_kodu"];?>,'<?=codekupon("$encoded|$row[id]|$buoran"); ?>', this);"> <div class="caption"><? if($oran_bilgi['oran_val']=="E"){ ?><?=getTranslation('oransecenek3')?><? } else if($oran_bilgi['oran_val']=="H"){ ?><?=getTranslation('oransecenek4')?><? } else if($oran_bilgi['oran_val']=="A"){ ?><?=getTranslation('oransecenek2')?><? } else if($oran_bilgi['oran_val']=="Ü"){ ?><?=getTranslation('oransecenek1')?><? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?><?=getTranslation('oransecenek21')?><? } else if($oran_bilgi['oran_val']=="X ve V"){ ?><?=getTranslation('oransecenek22')?><? } else if($oran_bilgi['oran_val']=="Ç"){ ?><?=getTranslation('oransecenek5')?><? } else if($oran_bilgi['oran_val']=="T"){ ?><?=getTranslation('oransecenek6')?><? } else { ?><?=$oran_bilgi['oran_val'];?><? } ?> <? if($row['oran_val_b']!="") { echo "( <font style='color:#f00;font-weight:bold;'>$row[oran_val_b]</font> )"; } ?></div> <div class="quote"><?=nf($buoran); ?></div></div></div>
<? } ?>
<div class=""></div>
</div>
<? } else { ?>
<div class="navitem odd"> <div class="w100 center text small bold" style="height:22px;"><?=$tip['tip_isim'];?></div></div>
<div class="navitem noborder w100 odd">
<?
$sss = sed_sql_query("select id,mac_db_id,oran_tip,oran_val_id,oran,durum,oran_val_b from oranlar_basketbol where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' group by oran_val_id order by oran_val_id asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_basketbol where id='$row[oran_val_id]'");
$mbs = mbsverb($mb['id'],$mb['mbs'],$mb['kupa_id']);
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$mbs|$mb[mac_time]|basketbol";
$buoran = oranbulb($mac_db_id,$row['id']);
?>
<div class="cell w50"> <div <? if($kz==1 || $kz==3 || $kz==5 || $kz==7 || $kz==9 || $kz==11 || $kz==13 || $kz==15 || $kz==17 || $kz==19 || $kz==21 || $kz==23 || $kz==25 || $kz==27 || $kz==29 || $kz==31 || $kz==33 || $kz==35 || $kz==37 || $kz==39){ ?>style="border-left: 1px solid #d7dcde;"<? } ?> class="<?=$mb["mac_kodu"];?> qbutton <?=md5($row['oran_val_id']."|".$mb["id"]);?>  " oddsid="<?=$mb["mac_kodu"];?><?=$row["id"];?>" onclick="kupon(<?=$mb["mac_kodu"];?><?=$row["id"];?>,<?=$mb["mac_kodu"];?>,'<?=codekupon("$encoded|$row[id]|$buoran"); ?>', this);"> <div class="caption"><? if($oran_bilgi['oran_val']=="E"){ ?><?=getTranslation('oransecenek3')?><? } else if($oran_bilgi['oran_val']=="H"){ ?><?=getTranslation('oransecenek4')?><? } else if($oran_bilgi['oran_val']=="A"){ ?><?=getTranslation('oransecenek2')?><? } else if($oran_bilgi['oran_val']=="Ü"){ ?><?=getTranslation('oransecenek1')?><? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?><?=getTranslation('oransecenek21')?><? } else if($oran_bilgi['oran_val']=="X ve V"){ ?><?=getTranslation('oransecenek22')?><? } else if($oran_bilgi['oran_val']=="Ç"){ ?><?=getTranslation('oransecenek5')?><? } else if($oran_bilgi['oran_val']=="T"){ ?><?=getTranslation('oransecenek6')?><? } else { ?><?=$oran_bilgi['oran_val'];?><? } ?> <? if($row['oran_val_b']!="") { echo "( <font style='color:#f00;font-weight:bold;'>$row[oran_val_b]</font> )"; } ?></div> <div class="quote"><?=nf($buoran); ?></div></div></div>
<? if($kz==2 || $kz==4 || $kz==6 || $kz==8 || $kz==10 || $kz==12 || $kz==14 || $kz==16 || $kz==18 || $kz==20 || $kz==22 || $kz==24 || $kz==26 || $kz==28 || $kz==30 || $kz==32 || $kz==34 || $kz==36 || $kz==38 || $kz==40){ ?>
</div>
<div class="navitem noborder w100 odd">
<? } ?>
<? } ?>
</div>
<div class=""></div>
<? } ?>

<? } ?>

</div>

<?

$sor = sed_sql_query("select oran_val_id,mac_kodu from kupon where session_id='$session_id' and spor_tip='basketbol'");

while($row=sed_sql_fetcharray($sor)) {

?>

<script>
$("div[oddsid='<?=$row['mac_kodu'];?><?=$row['oran_val_id'];?>']").addClass('selected');
</script>

<? } ?>

<? }

if($a=="tenis") {

$mac_db_id=gd("id");

$mb = bilgi("select * from program_tenis where id='$mac_db_id'");

$fark = $mb['mac_time']-time();

$gizli_oran_tips = gizli_oran_tips_tenis($mb['id']);

if($gizli_oran_tips!="") { $gizli_ekle = "and oran_tip not in ($gizli_oran_tips)"; } else { $gizli_ekle = ""; }

?>

<div style="text-align: center;font-weight: bold;color: #f64835;background-color: #fff;position: relative;z-index: 9999;" onclick="loadbulten2();"><?=getTranslation('exportlisteyedon')?></div>

<div class="odd singlebar barmiddle " style="<? if($mb['istatistik']>0){ ?>z-index: 100;position: absolute;<? } ?>">
<div id="e9441141" class="event match noborder">
<div class="hidden"><div colspan="11" class="c_comment"><div class="c_comment"></div><div class="c_pointer"></div></div></div>
<div class="event_wrapper">
<div class="datetime ">
<div class="favorites hidden"> <img src="assets/img/favorite0.png"> </div>
<div class="sportsIcon "><div class="icon"><div class="sports soccer"></div> </div></div>
<div class="date small ">
<div> <?=date("d.m H:i",$mb['mac_time']); ?> </div>
<img src="assets/img/live_rain.png" alt="" width="23" height="23" class="hidden">
<span class=""> <img src="assets/img/icon_live.png" alt="" width="24" height="12"> </span>
</div>
</div>
<div class="teamrows">
<div class="teamrow">
<div class="team"> <?=$mb['ev_takim'];?>  </div>
<div class="score">
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
<div class="hidden"> <span class=""></span></div>
</div>
</div>
<div class="teamrow">
<div class="team"> <?=$mb['konuk_takim'];?>  </div>
<div class="score">
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
<div class="hidden top"> <span class=""></span></div>
</div>
</div>
</div>
<div class="hidden"> <div class="hidden">  </div></div>
<div class="hidden"></div>
<div class="placeholder "></div>
</div>
</div>
</div>

<? if($mb['istatistik']>0){ ?>
<iframe src="https://href.li/?https://cs.betradar.com/ls/widgets/?/totobo/tr/page/widgets_lmts#matchId=<?=$mb['istatistik'];?>" id="liveTrackerCenter" frameborder="0" scrolling="no" style="width: 100%;height: 340px;margin-top:-50px;" onload="resizeIframe(this)"></iframe>
<? } ?>

<div id="rsg1" class="rsGroup" style="display: block;">

<?
$orderle = "FIELD(oran_tip, '1', '3', '4', '5', '6', '2') ASC";

$sor = sed_sql_query("select mac_db_id,oran_tip,durum from oranlar_tenis where mac_db_id='$mac_db_id' and durum='1' $gizli_ekle group by oran_tip order by {$orderle}");

$i = 1;
while($ass=sed_sql_fetchassoc($sor)) { 
$i++;
$tip = bilgi("select id,tip_isim,tip_kodu from oran_tip_tenis where id='$ass[oran_tip]'");

?>
<? if($tip['tip_kodu']==3) { ?>	
<div class="navitem noborder w100 odd" style=""> <div class="cell rsDesc w25"><?=getTranslation('tenisoran'.$tip['id'].'')?></div>
<?
$sss = sed_sql_query("select id,mac_db_id,oran_tip,oran_val_id,oran,durum from oranlar_tenis ora where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' order by (select yapi from oran_val_tenis ov where ov.id=ora.oran_val_id) asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_tenis where id='$row[oran_val_id]'");
$mbs = mbsvert($mb['id'],$mb['mbs'],$mb['kupa_id']);
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$mbs|$mb[mac_time]|tenis";
$buoran = oranbult($mac_db_id,$row['oran_val_id']);
?>
<div class="cell w25 rsBut"> <div class="<?=$mb["mac_kodu"];?> qbutton <?=md5($row['oran_val_id']."|".$mb["id"]);?>  " oddsid="<?=$mb["mac_kodu"];?><?=$row["oran_val_id"];?>" onclick="kupon(<?=$mb["mac_kodu"];?><?=$row["oran_val_id"];?>,<?=$mb["mac_kodu"];?>,'<?=codekupon("$encoded|$row[oran_val_id]|$buoran"); ?>', this);"> <div class="caption"><? if($oran_bilgi['oran_val']=="E"){ ?><?=getTranslation('oransecenek3')?><? } else if($oran_bilgi['oran_val']=="H"){ ?><?=getTranslation('oransecenek4')?><? } else if($oran_bilgi['oran_val']=="A"){ ?><?=getTranslation('oransecenek2')?><? } else if($oran_bilgi['oran_val']=="Ü"){ ?><?=getTranslation('oransecenek1')?><? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?><?=getTranslation('oransecenek21')?><? } else if($oran_bilgi['oran_val']=="X ve V"){ ?><?=getTranslation('oransecenek22')?><? } else if($oran_bilgi['oran_val']=="Ç"){ ?><?=getTranslation('oransecenek5')?><? } else if($oran_bilgi['oran_val']=="T"){ ?><?=getTranslation('oransecenek6')?><? } else { ?><?=$oran_bilgi['oran_val'];?><? } ?></div> <div class="quote"><?=nf($buoran); ?></div></div></div>
<? } ?>
<div class=""></div>
</div>
<? } else if($tip['tip_kodu']==2) { ?>
<div class="navitem noborder w100 odd" style=""> <div class="cell rsDesc w50"><?=getTranslation('tenisoran'.$tip['id'].'')?></div>
<?
$sss = sed_sql_query("select id,mac_db_id,oran_tip,oran_val_id,oran,durum from oranlar_tenis ora where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' order by (select yapi from oran_val_tenis ov where ov.id=ora.oran_val_id) asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_tenis where id='$row[oran_val_id]'");
$mbs = mbsvert($mb['id'],$mb['mbs'],$mb['kupa_id']);
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$mbs|$mb[mac_time]|tenis";
$buoran = oranbult($mac_db_id,$row['oran_val_id']);
?>
<div class="cell w25 rsBut"> <div class="<?=$mb["mac_kodu"];?> qbutton <?=md5($row['oran_val_id']."|".$mb["id"]);?>  " oddsid="<?=$mb["mac_kodu"];?><?=$row["oran_val_id"];?>" onclick="kupon(<?=$mb["mac_kodu"];?><?=$row["oran_val_id"];?>,<?=$mb["mac_kodu"];?>,'<?=codekupon("$encoded|$row[oran_val_id]|$buoran"); ?>', this);"> <div class="caption"><? if($oran_bilgi['oran_val']=="E"){ ?><?=getTranslation('oransecenek3')?><? } else if($oran_bilgi['oran_val']=="H"){ ?><?=getTranslation('oransecenek4')?><? } else if($oran_bilgi['oran_val']=="A"){ ?><?=getTranslation('oransecenek2')?><? } else if($oran_bilgi['oran_val']=="Ü"){ ?><?=getTranslation('oransecenek1')?><? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?><?=getTranslation('oransecenek21')?><? } else if($oran_bilgi['oran_val']=="X ve V"){ ?><?=getTranslation('oransecenek22')?><? } else if($oran_bilgi['oran_val']=="Ç"){ ?><?=getTranslation('oransecenek5')?><? } else if($oran_bilgi['oran_val']=="T"){ ?><?=getTranslation('oransecenek6')?><? } else { ?><?=$oran_bilgi['oran_val'];?><? } ?></div> <div class="quote"><?=nf($buoran); ?></div></div></div>
<? } ?>
<div class=""></div>
</div>
<? } else if($tip['tip_kodu']==4) { ?>
<div class="navitem odd"> <div class="w100 center text small bold" style="height:22px;"><?=getTranslation('tenisoran'.$tip['id'].'')?></div></div>
<div class="navitem noborder w100 odd">
<?
$sss = sed_sql_query("select id,mac_db_id,oran_tip,oran_val_id,oran,durum from oranlar_tenis ora where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' order by (select yapi from oran_val_tenis ov where ov.id=ora.oran_val_id) asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_tenis where id='$row[oran_val_id]'");
$mbs = mbsvert($mb['id'],$mb['mbs'],$mb['kupa_id']);
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$mbs|$mb[mac_time]|tenis";
$buoran = oranbult($mac_db_id,$row['oran_val_id']);
?>
<div class="cell w50"> <div <? if($kz==1 or $kz==3){ ?>style="border-left: 1px solid #d7dcde;"<? } ?>class="<?=$mb["mac_kodu"];?> qbutton <?=md5($row['oran_val_id']."|".$mb["id"]);?>  " oddsid="<?=$mb["mac_kodu"];?><?=$row["oran_val_id"];?>" onclick="kupon(<?=$mb["mac_kodu"];?><?=$row["oran_val_id"];?>,<?=$mb["mac_kodu"];?>,'<?=codekupon("$encoded|$row[oran_val_id]|$buoran"); ?>', this);"> <div class="caption"><? if($oran_bilgi['oran_val']=="E"){ ?><?=getTranslation('oransecenek3')?><? } else if($oran_bilgi['oran_val']=="H"){ ?><?=getTranslation('oransecenek4')?><? } else if($oran_bilgi['oran_val']=="A"){ ?><?=getTranslation('oransecenek2')?><? } else if($oran_bilgi['oran_val']=="Ü"){ ?><?=getTranslation('oransecenek1')?><? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?><?=getTranslation('oransecenek21')?><? } else if($oran_bilgi['oran_val']=="X ve V"){ ?><?=getTranslation('oransecenek22')?><? } else if($oran_bilgi['oran_val']=="Ç"){ ?><?=getTranslation('oransecenek5')?><? } else if($oran_bilgi['oran_val']=="T"){ ?><?=getTranslation('oransecenek6')?><? } else { ?><?=$oran_bilgi['oran_val'];?><? } ?></div> <div class="quote"><?=nf($buoran); ?></div></div></div>
<? if($kz==2 or $kz==4){ ?>
</div>
<div class="navitem noborder w100 odd">
<? } ?>
<? } ?>
</div>
<div class=""></div>
</div>
<? } else { ?>
<div class="navitem odd"> <div class="w100 center text small bold" style="height:22px;"><?=getTranslation('tenisoran'.$tip['id'].'')?></div></div>
<div class="navitem noborder w100 odd">
<?
$sss = sed_sql_query("select id,mac_db_id,oran_tip,oran_val_id,oran,durum from oranlar_tenis ora where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' order by (select yapi from oran_val_tenis ov where ov.id=ora.oran_val_id) asc");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_tenis where id='$row[oran_val_id]'");
$mbs = mbsvert($mb['id'],$mb['mbs'],$mb['kupa_id']);
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$mbs|$mb[mac_time]|tenis";
$buoran = oranbult($mac_db_id,$row['oran_val_id']);
?>
<div class="cell w50"> <div class="<?=$mb["mac_kodu"];?> qbutton <?=md5($row['oran_val_id']."|".$mb["id"]);?>  " oddsid="<?=$mb["mac_kodu"];?><?=$row["oran_val_id"];?>" onclick="kupon(<?=$mb["mac_kodu"];?><?=$row["oran_val_id"];?>,<?=$mb["mac_kodu"];?>,'<?=codekupon("$encoded|$row[oran_val_id]|$buoran"); ?>', this);"> <div class="caption"><? if($oran_bilgi['oran_val']=="E"){ ?><?=getTranslation('oransecenek3')?><? } else if($oran_bilgi['oran_val']=="H"){ ?><?=getTranslation('oransecenek4')?><? } else if($oran_bilgi['oran_val']=="A"){ ?><?=getTranslation('oransecenek2')?><? } else if($oran_bilgi['oran_val']=="Ü"){ ?><?=getTranslation('oransecenek1')?><? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?><?=getTranslation('oransecenek21')?><? } else if($oran_bilgi['oran_val']=="X ve V"){ ?><?=getTranslation('oransecenek22')?><? } else if($oran_bilgi['oran_val']=="Ç"){ ?><?=getTranslation('oransecenek5')?><? } else if($oran_bilgi['oran_val']=="T"){ ?><?=getTranslation('oransecenek6')?><? } else { ?><?=$oran_bilgi['oran_val'];?><? } ?></div> <div class="quote"><?=nf($buoran); ?></div></div></div>
<? if($kz==2 or $kz==4 or $kz==6 or $kz==8 or $kz==10 or $kz==12 or $kz==14 or $kz==16 or $kz==18 or $kz==20){ ?>
</div>
<div class="navitem noborder w100 odd">
<? } ?>
<? } ?>
</div>
<div class=""></div>
</div>
<? } ?>
<? } ?>

<?

$sor = sed_sql_query("select oran_val_id,mac_kodu from kupon where session_id='$session_id' and spor_tip='tenis'");

while($row=sed_sql_fetcharray($sor)) {

?>

<script>$("div[oddsid='<?=$row['mac_kodu'];?><?=$row['oran_val_id'];?>']").addClass('selected');</script>

<? } ?>

<? }

if($a=="voleybol") {

$mac_db_id=gd("id");
$mb = bilgi("select * from program_voleybol where id='$mac_db_id'");
$fark = $mb['mac_time']-time();
$gizli_oran_tips = gizli_oran_tips_voleybol($mb['id']);
if($gizli_oran_tips!="") { $gizli_ekle = "and oran_val_id not in ($gizli_oran_tips)"; } else { $gizli_ekle = ""; }
?>

<div id="details_odds_<?=$mb['mac_kodu'];?>" style="display:block;">
<table class="bulletin-event-detail-table" cellpadding="0" cellspacing="0">
<tbody>

<?
$orderle = "FIELD(oran_tip, '1', '4', '3', '2') ASC";

$sor = sed_sql_query("select mac_db_id,oran_tip,durum from oranlar_voleybol where mac_db_id='$mac_db_id' and durum='1' $gizli_ekle group by oran_tip order by {$orderle}");

$i = 1;
while($ass=sed_sql_fetchassoc($sor)) { 
$i++;
$tip = bilgi("select id,tip_isim,tip_kodu from oran_tip_voleybol where id='$ass[oran_tip]'");

?>
<? if($tip['tip_kodu']==3){ ?>
<tr class="navigations"><td colspan="6"><?=getTranslation('voleyboloran'.$tip['id'].'')?></td></tr>
<tr></tr>
<tr>

<?
$sss = sed_sql_query("select mac_db_id,oran_tip,oran_val_id,oran,durum,oran_val_v from oranlar_voleybol ora where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' order by (select yapi from oran_val_voleybol ov where ov.id=ora.oran_val_id) asc");
while($row=sed_sql_fetchassoc($sss)) {
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_voleybol where id='$row[oran_val_id]'");
$voleybolmbs_ver = userayar('voleybolmbs');
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$voleybolmbs_ver|$mb[mac_time]|voleybol";
$buoran = oranbulv($mac_db_id,$row['oran_val_id']);
?>

<td colspan="2" class="rate qbut-<?=md5($row['oran_val_id']."|".$mb["id"]);?>  " onclick="kupon('<?=codekupon("$encoded|$row[oran_val_id]|$buoran"); ?>');">
<span style="float: left;margin-left: 8px;"><b><? if($oran_bilgi['oran_val']=="E"){ ?><?=getTranslation('oransecenek3')?><? } else if($oran_bilgi['oran_val']=="H"){ ?><?=getTranslation('oransecenek4')?><? } else if($oran_bilgi['oran_val']=="A"){ ?><?=getTranslation('oransecenek2')?><? } else if($oran_bilgi['oran_val']=="Ü"){ ?><?=getTranslation('oransecenek1')?><? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?><?=getTranslation('oransecenek21')?><? } else if($oran_bilgi['oran_val']=="X ve V"){ ?><?=getTranslation('oransecenek22')?><? } else if($oran_bilgi['oran_val']=="Ç"){ ?><?=getTranslation('oransecenek5')?><? } else if($oran_bilgi['oran_val']=="T"){ ?><?=getTranslation('oransecenek6')?><? } else { ?><?=$oran_bilgi['oran_val'];?><? } ?></b> <? if($row['oran_val_v']!="") { echo "($row[oran_val_v])"; } ?></span>
<span style="float: right;margin-right: 8px;"><?=nf($buoran); ?></span>
</td>

<? } ?>
</tr>
<tr></tr>
<? } else { ?>
<tr class="navigations"><td colspan="6"><?=getTranslation('voleyboloran'.$tip['id'].'')?></td></tr>
<tr></tr>
<tr>

<?
$sss = sed_sql_query("select mac_db_id,oran_tip,oran_val_id,oran,durum,oran_val_v from oranlar_voleybol ora where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' order by (select yapi from oran_val_voleybol ov where ov.id=ora.oran_val_id) asc");
while($row=sed_sql_fetchassoc($sss)) {
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_voleybol where id='$row[oran_val_id]'");
$voleybolmbs_ver = userayar('voleybolmbs');
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$voleybolmbs_ver|$mb[mac_time]|voleybol";
$buoran = oranbulv($mac_db_id,$row['oran_val_id']);
?>

<td colspan="3" class="rate qbut-<?=md5($row['oran_val_id']."|".$mb["id"]);?>  " onclick="kupon('<?=codekupon("$encoded|$row[oran_val_id]|$buoran"); ?>');">
<span style="float: left;margin-left: 8px;"><b><? if($oran_bilgi['oran_val']=="E"){ ?><?=getTranslation('oransecenek3')?><? } else if($oran_bilgi['oran_val']=="H"){ ?><?=getTranslation('oransecenek4')?><? } else if($oran_bilgi['oran_val']=="A"){ ?><?=getTranslation('oransecenek2')?><? } else if($oran_bilgi['oran_val']=="Ü"){ ?><?=getTranslation('oransecenek1')?><? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?><?=getTranslation('oransecenek21')?><? } else if($oran_bilgi['oran_val']=="X ve V"){ ?><?=getTranslation('oransecenek22')?><? } else if($oran_bilgi['oran_val']=="Ç"){ ?><?=getTranslation('oransecenek5')?><? } else if($oran_bilgi['oran_val']=="T"){ ?><?=getTranslation('oransecenek6')?><? } else { ?><?=$oran_bilgi['oran_val'];?><? } ?></b> <? if($row['oran_val_v']!="") { echo "($row[oran_val_v])"; } ?></span>
<span style="float: right;margin-right: 8px;"><?=nf($buoran); ?></span>
</td>

<? } ?>
</tr>
<tr></tr>
<? } ?>

<? } ?>
</tbody>
</table>
</div>
<? } 

if($a=="buzhokeyi") {

$mac_db_id=gd("id");

$mb = bilgi("select * from program_buzhokeyi where id='$mac_db_id'");

$fark = $mb['mac_time']-time();

$gizli_oran_tips = gizli_oran_tips_buzhokeyi($mb['id']);

if($gizli_oran_tips!="") { $gizli_ekle = "and oran_val_id not in ($gizli_oran_tips)"; } else { $gizli_ekle = ""; }

?>

<div id="details_odds_<?=$mb['mac_kodu'];?>" style="display:block;">
<table class="bulletin-event-detail-table" cellpadding="0" cellspacing="0">
<tbody>

<?
$orderle = "FIELD(oran_tip, '1', '2', '3', '4', '5', '6', '7', '8') ASC";

$sor = sed_sql_query("select mac_db_id,oran_tip,durum from oranlar_buzhokeyi where mac_db_id='$mac_db_id' and durum='1' $gizli_ekle group by oran_tip order by {$orderle}");

$i = 1;
while($ass=sed_sql_fetchassoc($sor)) { 
$i++;
$tip = bilgi("select id,tip_isim,tip_kodu from oran_tip_buzhokeyi where id='$ass[oran_tip]'");

?>

<tr class="navigations"><td colspan="6"><?=getTranslation('buzhokeyioran'.$tip['id'].'')?></td></tr>
<tr></tr>
<tr>

<?
$sss = sed_sql_query("select mac_db_id,oran_tip,oran_val_id,oran,durum from oranlar_buzhokeyi ora where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' order by oran_val_id asc");
while($row=sed_sql_fetchassoc($sss)) {
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_buzhokeyi where id='$row[oran_val_id]'");
$buzhokeyimbs_ver = userayar('buzhokeyimbs');
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$buzhokeyimbs_ver|$mb[mac_time]|buzhokeyi";
$buoran = oranbulbuz($mac_db_id,$row['oran_val_id']);
?>

<td colspan="2" class="rate qbut-<?=md5($row['oran_val_id']."|".$mb["id"]);?>  " onclick="kupon('<?=codekupon("$encoded|$row[oran_val_id]|$buoran"); ?>');">
<span style="float: left;margin-left: 8px;"><b><? if($oran_bilgi['oran_val']=="E"){ ?><?=getTranslation('oransecenek3')?><? } else if($oran_bilgi['oran_val']=="H"){ ?><?=getTranslation('oransecenek4')?><? } else if($oran_bilgi['oran_val']=="A"){ ?><?=getTranslation('oransecenek2')?><? } else if($oran_bilgi['oran_val']=="Ü"){ ?><?=getTranslation('oransecenek1')?><? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?><?=getTranslation('oransecenek21')?><? } else if($oran_bilgi['oran_val']=="X ve V"){ ?><?=getTranslation('oransecenek22')?><? } else if($oran_bilgi['oran_val']=="Ç"){ ?><?=getTranslation('oransecenek5')?><? } else if($oran_bilgi['oran_val']=="T"){ ?><?=getTranslation('oransecenek6')?><? } else { ?><?=$oran_bilgi['oran_val'];?><? } ?></b></span>
<span style="float: right;margin-right: 8px;"><?=nf($buoran); ?></span>
</td>

<? } ?>
</tr>
<tr></tr>
<? } ?>
</tbody>
</table>
</div>
<? } 

if($a=="hentbol") {

$mac_db_id=gd("id");

$mb = bilgi("select * from program_hentbol where id='$mac_db_id'");

$fark = $mb['mac_time']-time();

$gizli_oran_tips = gizli_oran_tips_hentbol($mb['id']);

if($gizli_oran_tips!="") { $gizli_ekle = "and oran_val_id not in ($gizli_oran_tips)"; } else { $gizli_ekle = ""; }

?>

<div id="details_odds_<?=$mb['mac_kodu'];?>" style="display:block;">
<table class="bulletin-event-detail-table" cellpadding="0" cellspacing="0">
<tbody>

<?
$orderle = "FIELD(oran_tip, '1', '3', '5', '6', '7', '4', '2') ASC";

$sor = sed_sql_query("select mac_db_id,oran_tip,durum from oranlar_hentbol where mac_db_id='$mac_db_id' and durum='1' $gizli_ekle group by oran_tip order by {$orderle}");

$i = 1;
while($ass=sed_sql_fetchassoc($sor)) { 
$i++;
$tip = bilgi("select id,tip_isim,tip_kodu from oran_tip_hentbol where id='$ass[oran_tip]'");

?>

<? if($tip['tip_kodu']==3) { ?>

<tr class="navigations"><td colspan="6"><?=getTranslation('hentboloran'.$tip['id'].'')?></td></tr>
<tr></tr>
<tr>

<?
$sss = sed_sql_query("select mac_db_id,oran_tip,oran_val_id,oran,durum,oran_val_h from oranlar_hentbol ora where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' order by id DESC");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_hentbol where id='$row[oran_val_id]'");
$hentbolmbs_ver = userayar('hentbolmbs');
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$hentbolmbs_ver|$mb[mac_time]|hentbol";
$buoran = oranbulh($mac_db_id,$row['oran_val_id']);
?>

<td colspan="2" class="rate qbut-<?=md5($row['oran_val_id']."|".$mb["id"]);?>  " onclick="kupon('<?=codekupon("$encoded|$row[oran_val_id]|$buoran"); ?>');">
<span style="float: left;margin-left: 8px;"><b><? if($oran_bilgi['oran_val']=="E"){ ?><?=getTranslation('oransecenek3')?><? } else if($oran_bilgi['oran_val']=="H"){ ?><?=getTranslation('oransecenek4')?><? } else if($oran_bilgi['oran_val']=="A"){ ?><?=getTranslation('oransecenek2')?><? } else if($oran_bilgi['oran_val']=="Ü"){ ?><?=getTranslation('oransecenek1')?><? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?><?=getTranslation('oransecenek21')?><? } else if($oran_bilgi['oran_val']=="X ve V"){ ?><?=getTranslation('oransecenek22')?><? } else if($oran_bilgi['oran_val']=="Ç"){ ?><?=getTranslation('oransecenek5')?><? } else if($oran_bilgi['oran_val']=="T"){ ?><?=getTranslation('oransecenek6')?><? } else { ?><?=$oran_bilgi['oran_val'];?><? } ?></b> <? if($row['oran_val_h']!="") { echo "($row[oran_val_h])"; } ?></span>
<span style="float: right;margin-right: 8px;"><?=nf($buoran); ?></span>
</td>

<? } ?>
</tr>
<tr></tr>
<? } else if($tip['tip_kodu']==4) { ?>

<tr class="navigations"><td colspan="6"><?=getTranslation('hentboloran'.$tip['id'].'')?></td></tr>
<tr></tr>
<tr>

<?
$sss = sed_sql_query("select mac_db_id,oran_tip,oran_val_id,oran,durum,oran_val_h from oranlar_hentbol ora where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' order by id DESC");
$kz=0;
while($row=sed_sql_fetchassoc($sss)) {
$kz++;
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_hentbol where id='$row[oran_val_id]'");
$hentbolmbs_ver = userayar('hentbolmbs');
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$hentbolmbs_ver|$mb[mac_time]|hentbol";
$buoran = oranbulh($mac_db_id,$row['oran_val_id']);
?>

<td colspan="3" class="rate qbut-<?=md5($row['oran_val_id']."|".$mb["id"]);?>  " onclick="kupon('<?=codekupon("$encoded|$row[oran_val_id]|$buoran"); ?>');">
<span style="float: left;margin-left: 8px;"><b><? if($oran_bilgi['oran_val']=="E"){ ?><?=getTranslation('oransecenek3')?><? } else if($oran_bilgi['oran_val']=="H"){ ?><?=getTranslation('oransecenek4')?><? } else if($oran_bilgi['oran_val']=="A"){ ?><?=getTranslation('oransecenek2')?><? } else if($oran_bilgi['oran_val']=="Ü"){ ?><?=getTranslation('oransecenek1')?><? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?><?=getTranslation('oransecenek21')?><? } else if($oran_bilgi['oran_val']=="X ve V"){ ?><?=getTranslation('oransecenek22')?><? } else if($oran_bilgi['oran_val']=="Ç"){ ?><?=getTranslation('oransecenek5')?><? } else if($oran_bilgi['oran_val']=="T"){ ?><?=getTranslation('oransecenek6')?><? } else { ?><?=$oran_bilgi['oran_val'];?><? } ?></b> <? if($row['oran_val_h']!="") { echo "($row[oran_val_h])"; } ?></span>
<span style="float: right;margin-right: 8px;"><?=nf($buoran); ?></span>
</td>

<? } ?>
</tr>
<tr></tr>
<? } else { ?>				

<tr class="navigations"><td colspan="6"><?=getTranslation('hentboloran'.$tip['id'].'')?></td></tr>
<tr></tr>
<tr>

<?
$sss = sed_sql_query("select mac_db_id,oran_tip,oran_val_id,oran,durum,oran_val_h from oranlar_hentbol ora where mac_db_id='$mac_db_id' $gizli_ekle and durum='1' and oran_tip='$ass[oran_tip]' order by oran_val_id asc");
while($row=sed_sql_fetchassoc($sss)) {
$oran_bilgi = bilgi("select id,oran_val,yapi from oran_val_hentbol where id='$row[oran_val_id]'");
$hentbolmbs_ver = userayar('hentbolmbs');
$encoded = "$mb[id]|$mb[ev_takim]|$mb[konuk_takim]|$mb[mac_kodu]|$hentbolmbs_ver|$mb[mac_time]|hentbol";
$buoran = oranbulh($mac_db_id,$row['oran_val_id']);
?>

<td colspan="3" class="rate qbut-<?=md5($row['oran_val_id']."|".$mb["id"]);?>  " onclick="kupon('<?=codekupon("$encoded|$row[oran_val_id]|$buoran"); ?>');">
<span style="float: left;margin-left: 8px;"><b><? if($oran_bilgi['oran_val']=="E"){ ?><?=getTranslation('oransecenek3')?><? } else if($oran_bilgi['oran_val']=="H"){ ?><?=getTranslation('oransecenek4')?><? } else if($oran_bilgi['oran_val']=="A"){ ?><?=getTranslation('oransecenek2')?><? } else if($oran_bilgi['oran_val']=="Ü"){ ?><?=getTranslation('oransecenek1')?><? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?><?=getTranslation('oransecenek21')?><? } else if($oran_bilgi['oran_val']=="X ve V"){ ?><?=getTranslation('oransecenek22')?><? } else if($oran_bilgi['oran_val']=="Ç"){ ?><?=getTranslation('oransecenek5')?><? } else if($oran_bilgi['oran_val']=="T"){ ?><?=getTranslation('oransecenek6')?><? } else { ?><?=$oran_bilgi['oran_val'];?><? } ?></b></span>
<span style="float: right;margin-right: 8px;"><?=nf($buoran); ?></span>
</td>

<? } ?>
</tr>
<tr></tr>
<? } ?>

<? } ?>
</tbody>
</table>
</div>
<? } ?>

