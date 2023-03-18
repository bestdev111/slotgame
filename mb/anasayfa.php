<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:login.php"); exit(); }
?>
<?php include 'header.php'; ?>

<div id="page1" class="page top">
<div class="scroll_container" style="min-height: 311px;">
<div class="scroll_wrapper" style="padding-top: 44px; padding-bottom: 44px;">
<div class="appcontent">
<div>  </div>
<div id="aramacubugu" class="filterbar showQuickFilter">
<form class="form" onclick="toggleQuickFilter();" onsubmit="search(this.elements[0].value); return false;" action="#" style="transition: 0s"> 
<input type="text" class="searchfield" onclick="disableQuickFilter()" placeholder="<?=getTranslation('mobilsearchfieldarama')?>" maxlength="68" onkeyup="updateSearch()">
<span><?=getTranslation('mobilara')?></span>
<div id="searchDeleteIcon" class="deleteIcon hidden" onclick="listelesene(2)">x</div>
<div id="suggestions" class="hidden"></div>
</form>

<div class="quickFilter">

<? if(userayar('sanal_futbolv2')>0 || userayar('sanal_futbol')>0 || userayar('sanal_sampiyonlar')>0 || userayar('sanal_dunya')>0 || userayar('sanal_avrupa')>0 || userayar('sanal_basketbol')>0 || userayar('sanal_atyarisi')>0) { ?>
<div class="icon " onclick="getle('/mb/sanal-spor')"><div class="filterIcon categories sanalQuickFilterIcon"></div><span><?=getTranslation('ajaxkupond20')?></span></div>
<? } ?>

<? if(userayar('casino_yetki')>0) { ?>
<div class="icon " onclick="getle('livecasino')"><div class="filterIcon categories casinoQuickFilterIcon"></div><span><?=getTranslation('yeniyerler_kasa132')?></span></div>
<? } ?>
<? if(userayar('casino_yetki')>0) { ?>
<div class="icon " onclick="getle('slots')"><div class="filterIcon categories casinoQuickFilterIcon"></div><span>Slots</span></div>
<? } ?>
<div class="icon " onclick="getle('today')"><div class="sports today"></div><span><?=getTranslation('mobilbugun')?></span></div>
<div class="icon " onclick="getle('sport99')"><div class="sports soccer"></div><span><?=getTranslation('mobilfutbol')?></span></div>
<? if(userayar('basketbol')=="1") { ?>
<div class="icon " onclick="getle('sport2')"><div class="sports basketball"></div><span><?=getTranslation('mobilbasketbol')?></span></div>
<? } ?>
<? if(userayar('tenis')=="1") { ?>
<div class="icon " onclick="getle('sport3')"><div class="sports tennis"></div><span><?=getTranslation('mobiltenis')?></span></div>
<? } ?>
<? if(userayar('voleybol')=="1") { ?>
<div class="icon " onclick="getle('sport4')"><div class="sports volleyball"></div><span><?=getTranslation('mobilvoleybol')?></span></div>
<? } ?>
<? if(userayar('buzhokeyi')=="1") { ?>
<div class="icon " onclick="getle('sport5')"><div class="sports ice-hockey"></div><span><?=getTranslation('mobilbuzhokeyi')?></span></div>
<? } ?>
<? if(userayar('masatenisi')=="1") { ?>
<div class="icon " onclick="getle('sport9')"><div class="sports table-tennis"></div><span><?=getTranslation('yeniyerler_kasa179')?></span></div>
<? } ?>
<? if(userayar('beyzbol')=="1") { ?>
<div class="icon " onclick="getle('sport10')"><div class="sports baseball"></div><span><?=getTranslation('yeniyerler_kasa197')?></span></div>
<? } ?>
<? if(userayar('rugby')=="1") { ?>
<div class="icon " onclick="getle('sport11')"><div class="sports rugby"></div><span><?=getTranslation('yeniyerler_kasa198')?></span></div>
<? } ?>
<? if(userayar('dovus')=="1") { ?>
<div class="icon " onclick="getle('sport12')"><div class="sports boxing"></div><span><?=getTranslation('yeniyerler_kasa199')?></span></div>
<? } ?>
</div>
</div>

<div class="betpanel">
<div class="bartitle iconbar mybets"><div class="text" style="animation: hello 1.5s ease-in-out infinite;font-weight: 700;color: #ff6c4f;"><?=getTranslation('mobilbahisusttaraf')?></div></div>
<div class="barmiddleleft arrow preload1 iconbar sport" onclick="getle('sporbahisleri')"> <div class="text"><?=getTranslation('mobilsporbahisleri')?></div></div>
<? if(userayar('canlifutbol')!="1") { ?>
<div class="barmiddleright arrow preload1 iconbar live" onclick="getle('liveengelli')"> <div class="text"><?=getTranslation('mobilcanlibahisler')?></div></div>
<div class="barmiddleleft arrow preload1 iconbar highlights" onclick="getle('liveengelli')"> <div class="text"><?=getTranslation('mobilhighlights')?></div></div>
<? } else { ?>
<div class="barmiddleright arrow preload1 iconbar live" onclick="getle('live')"> <div class="text"><?=getTranslation('mobilcanlibahisler')?></div></div>
<div class="barmiddleleft arrow preload1 iconbar highlights" onclick="getle('live')"> <div class="text"><?=getTranslation('mobilhighlights')?></div></div>
<? } ?>
<div class=" barmiddleright arrow preload2 iconbar favorites" onclick="getle('favorites')"> <div class="text"><?=getTranslation('mobilfavoriler')?></div></div>
<? if(userayar('canlifutbol')!="1") { ?>
<div class="barbottomleft arrow preload1 iconbar lastminute" onclick="getle('liveengelli')"> <div class="text"><?=getTranslation('mobilsondakika')?></div></div>
<? } else { ?>
<div class="barbottomleft arrow preload1 iconbar lastminute" onclick="getle('live')"> <div class="text"><?=getTranslation('mobilsondakika')?></div></div>
<? } ?>
<div class="barbottomright  arrow preload2 iconbar results" onclick="getle('results')"> <div class="text"><?=getTranslation('mobilsonuclar')?></div></div>


<? if(userayar('sanal_futbolv2')>0 || userayar('sanal_futbol')>0 || userayar('sanal_sampiyonlar')>0 || userayar('sanal_dunya')>0 || userayar('sanal_avrupa')>0 || userayar('sanal_basketbol')>0 || userayar('sanal_atyarisi')>0) { ?>
<div class="barbottomleft arrow preload1 iconbar sanals" onclick="getle('/mb/sanal-spor')"> <div class="text"><?=getTranslation('sanalspor')?></div></div>
<? } else { ?>
<div class="barmiddleright arrow preload1 iconbar live" onclick="getle('livetv')" <? if(userayar('rulet_oynama')>0 && userayar('rulet_yetki')>0) { ?>style="border-right: 1px solid #dcdbdb;"<? } else { ?>style="width: 100%;border-right: 1px solid #dcdbdb;"<? } ?>> <div class="text"><?=getTranslation('canlitv')?></div></div>
<? } ?>

<? if(userayar('rulet_oynama')>0 && userayar('rulet_yetki')>0) { ?>
<div class="barmiddleright arrow preload1 iconbar2 live" onclickk="getle('../rulets')"> <div class="text" >Editörün Seçimi (Yakında) </div></div>
<? } ?>


<div class="clear"></div>
</div>
<div class="betpanel">
<div class="bartitle iconbar mybets"><div class="text" style="animation: hello 1.5s ease-in-out infinite;font-weight: 700;color: #ff6c4f;">casino ve oyunlar</div></div>



<div class="barmiddleright arrow preload1 iconbar live" onclick="getle('livecasino')"> <div class="text">Canlı Casino</div></div>

<div class="barmiddleleft arrow preload1 iconbar casino" onclick="getle('slots')"> <div class="text">Slots</div></div>

<? if(userayar('sanal_futbolv2')>0 || userayar('sanal_futbol')>0 || userayar('sanal_sampiyonlar')>0 || userayar('sanal_dunya')>0 || userayar('sanal_avrupa')>0 || userayar('sanal_basketbol')>0 || userayar('sanal_atyarisi')>0) { ?>
<div class="barbottomleft arrow preload1 iconbar sanals" onclick="getle('/mb/sanal-spor')"> <div class="text"><?=getTranslation('sanalspor')?></div></div>
<? } else { ?>
<div class="barmiddleright arrow preload1 iconbar live" onclick="getle('livetv')" <? if(userayar('rulet_oynama')>0 && userayar('rulet_yetki')>0) { ?>style="border-right: 1px solid #dcdbdb;"<? } else { ?>style="width: 100%;border-right: 1px solid #dcdbdb;"<? } ?>> <div class="text" style="animation: hello 1.5s ease-in-out infinite;font-weight: 700;color: #ff6c4f;"><?=getTranslation('canlitv')?></div></div>
<? } ?>
<div class="barmiddleleft arrow preload1 iconbar casino"  onclick="getle('#')"> <div class="text" >Tombala</div></div>






<div class="clear"></div>
</div>
<div class="topeventsOnHome"><div class="bartitle iconbar sport"><div class="text" style="animation: hello 1.5s ease-in-out infinite;font-weight: 700;color: #ff6c4f;"><?=getTranslation('mobilyaklasan5oyun')?></div></div></div>

<div id="yaklasanmaclar"></div>

<div class="accountpanel">
<div class="bartitle iconbar konto"><div class="text" style="animation: hello 1.5s ease-in-out infinite;font-weight: 700;color: #ff6c4f;"><?=getTranslation('mobilhesabim')?></div></div>
<div class="barbottomleft arrow  iconbar payin" onclick="getle('ticket')"> <div class="text"><?=getTranslation('mobilbahisgecmisi')?></div></div>
<div class="barmiddleright arrow  iconbar myaccount" onclick="getle('account')"> <div class="text"><?=getTranslation('mobilhesabim')?></div></div>
<? if(userayar('wattsap')!=0){ ?>
<div class="barbottomleft arrow iconbar whatsapp" onclick="callwhatsap();" style="width:100%;"> <div class="text"><?=getTranslation('mobilwhatsappdestek')?></div></div>
<? } ?>
<div class="clear"></div>
</div>

<div class="informationpanel">
<div class="bartitle iconbar konto information"><div class="text" style="animation: hello 1.5s ease-in-out infinite;font-weight: 700;color: #ff6c4f;"><?=getTranslation('mobilbilgi')?></div></div>
<div class="barmiddleleft arrow  iconbar terms" onclick="getle('information')"> <div class="text"><?=getTranslation('mobilgenelsirketsartnamesi')?></div></div>
<div class="barmiddleleft arrow hidden iconbar bonus" onclick="getle('bonusconditions')"> <div class="text"><?=getTranslation('mobilbonus')?></div></div>
<div class="barmiddleright arrow iconbar information" onclick="getle('support')"> <div class="text"><?=getTranslation('mobildestek')?></div></div>
<div class="barbottomleft arrow iconbar contact" onclick="getle('contact')"> <div class="text"><?=getTranslation('mobililetisim')?></div></div>
<div class="barbottomright arrow iconbar logout last" onclick="getle('logout')"> <div class="text"><?=getTranslation('mobilhesabim7')?></div></div>
<div class="clear"></div>



<?
$loginsor = sed_sql_query("select * from login_data WHERE login_user='".$ub['username']."' ORDER BY id desc LIMIT 1");
$loginrow = sed_sql_fetcharray($loginsor);
?>
<div> <div class="link">( <?=getTranslation('songiris')?>: <?=date("d-m-Y H:i",$loginrow['zaman']);?> )</div> </div>

<div class="clear"></div>
</div>
<br>
<div class="contentbottom hidden"> </div>
<div class="hidden">  </div>
<div class="spacer">&nbsp;</div>
</div>

<div id="loadbulten"></div>


</div>
</div>
</div>

<script>
window.toggleQuickFilter = function() {
$(".filterbar").toggleClass("showQuickFilter");
};
window.disableQuickFilter = function() {
setTimeout(function() {
$(".filterbar").removeClass("showQuickFilter")
}, 100)
};

function updateSearch() {
var karakter = $(".searchField").val().length;
if(karakter>1) { listelesene(0); } else { listelesene(1); }
}
function listelesene(val) {
if(val==1){
	$("#suggestions").addClass('hidden');
	$("#searchDeleteIcon").addClass('hidden');
	$("#suggestions").html('');
} else if(val==2){
	$("#suggestions").addClass('hidden');
	$("#searchDeleteIcon").addClass('hidden');
	$("#suggestions").html('');
	$(".searchField").val('');
} else {
	var aranan_takim = $(".searchField").val();
	$.get('export.php?a=livesearch_arama&sportip=1&aranan_takim='+aranan_takim+'',function(data) {
	$("#suggestions").removeClass('hidden');
	$("#searchDeleteIcon").removeClass('hidden');
	$("#suggestions").html(data);
	});
}

}

function loadbultenyaklasan() {
var rand = Math.random();
$.get('export.php?a=yaklasanmaclar&rand='+rand+'',function(data) {
$("#yaklasanmaclar").html(data);
kuponguncelle(1);
});
}
loadbultenyaklasan();
function detaygetir(sportip,id) {
$("#loadbulten").html('<div class="spinner" style="text-align:center;"><img src="assets/img/loading_x6_blueto.gif" class="loading" onload="displayImage(this)"></div>');
$(".appcontent").hide();
$.get('export_detail.php?a=futbol&id='+id+'',function(data) {
$("#loadbulten").html(data);
});
}
function loadbulten2() {
$("#loadbulten").html('');
$(".appcontent").show();
loadbultenyaklasan();
}
</script>
<div id="live">

</div>
</div>
</div>
<?php include 'livechat.php'; ?>

<?php include 'footer.php'; ?>

</body>
</html>