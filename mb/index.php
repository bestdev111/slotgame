<?php

include '../db.php';

?>
<?php include 'header.php'; ?>
<link rel="stylesheet" href="/assets/owl2/owl.carousel.min.css" />
<link href="/assets/range/css/bootstrap-slider.css" rel="stylesheet" media="screen">

    
<div id="page1" class="page top">
<div class="scroll_container" style="min-height: 311px;">
<div class="scroll_wrapper" style="padding-top: 44px; padding-bottom: 44px;">
<div class="appcontent">
<div>  </div>


             <div class="owl-carousel _1itemSlide mb-lg-3" id="sliderHome">
                    <div class="item">
                        <img src="assets/img/slider-gif.gif">
                    </div>
                    <div class="item">
                        <img src="assets/img/slider-gif.gif">
                    </div>
                </div>
                    <div class="owl-nav disabled">
                        <div class="owl-prev">
                            <i class="lnr lnr-chevron-left"></i>
                            </div>
                            <div class="owl-next">
                                <i class="lnr lnr-chevron-right"></i>
                                </div>
                                </div
                                >
                                <div class="owl-dots disabled"></div></div>






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


<div class="barmiddleright arrow preload1 iconbar2 live" onclickk="getle('../rulets')"> <div class="text" >Editörün Seçimi (Yakında) </div></div>



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


<div class="informationpanel">
<div class="bartitle iconbar konto information"><div class="text" style="animation: hello 1.5s ease-in-out infinite;font-weight: 700;color: #ff6c4f;"><?=getTranslation('mobilbilgi')?></div></div>
<div class="barmiddleleft arrow  iconbar terms" onclick="getle('information')"> <div class="text"><?=getTranslation('mobilgenelsirketsartnamesi')?></div></div>
<div class="barmiddleleft arrow hidden iconbar bonus" onclick="getle('bonusconditions')"> <div class="text"><?=getTranslation('mobilbonus')?></div></div>
<div class="barmiddleright arrow iconbar information" onclick="getle('support')"> <div class="text"><?=getTranslation('mobildestek')?></div></div>
<div class="barbottomleft arrow iconbar contact" onclick="getle('register')"> <div class="text">KAYIT OL</div></div>
<div class="barbottomright arrow iconbar logout last" onclick="getle('login')"> <div class="text">GIRIŞ YAP</div></div>
<div class="clear"></div>




<div class="clear"></div>
</div>
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
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
   <script src="/mb/assets/owl2/owl.carousel.min.js"></script>
    <script src="/mb/assets/range/bootstrap-slider.js"></script>
    <script src="/mb/assets/customMobile.js"></script>
    

<?php include 'footera.php'; ?>

</body>
</html>