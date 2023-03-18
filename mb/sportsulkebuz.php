<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:login.php"); exit(); }
if(userayar('buzhokeyi')!="1") { header("Location:/mb"); }
?>
<?php include 'header.php'; ?>


<style>
.country-icon{width:16px;height:16px;background-color:#adadad;background-image:url(/resources/flags.svg);background-size:646px 68px;background-repeat:no-repeat;border:1px solid #adadad;border-radius:38px}.c11{background-position:0 0}.c68{background-position:-17px 0}.c69{background-position:-34px 0}.c71{background-position:-51px 0}.c60{background-position:-68px 0}.c74{background-position:-85px 0}.c38{background-position:-102px 0}.c75{background-position:-119px 0}.c76{background-position:-136px 0}.c234{background-position:-153px 0}.c235{background-position:-170px 0}.c8{background-position:-187px 0}.c77{background-position:-204px 0}.c78{background-position:-221px 0}.c79{background-position:-238px 0}.c81{background-position:-255px 0}.c55{background-position:-272px 0}.c35{background-position:-289px 0}.c82{background-position:-306px 0}.c84{background-position:-323px 0}.c44{background-position:-340px 0}.c86{background-position:-357px 0}.c33{background-position:-374px 0}.c63{background-position:-391px 0}.c94{background-position:-408px 0}.c96{background-position:-425px 0}.c56{background-position:-442px 0}.c57{background-position:-459px 0}.c45{background-position:-476px 0}.c104{background-position:-493px 0}.c106{background-position:-510px 0}.c93{background-position:-527px 0}.c58{background-position:-544px 0}.c13{background-position:-561px 0}.c108{background-position:-578px 0}.c109{background-position:-595px 0}.c110{background-position:-612px 0}.c111{background-position:-629px 0}.c219{background-position:0 -17px}.c14{background-position:-17px -17px}.c61{background-position:-34px -17px}.c7{background-position:-51px -17px}.c123{background-position:-68px -17px}.c15{background-position:-85px -17px}.c16{background-position:-102px -17px}.c186{background-position:-119px -17px}.c122{background-position:-136px -17px}.c17{background-position:-153px -17px}.c125{background-position:-170px -17px}.c18{background-position:-187px -17px}.c220{background-position:-204px -17px}.c127{background-position:-221px -17px}.c130{background-position:-238px -17px}.c131{background-position:-255px -17px}.c36{background-position:-272px -17px}.c132{background-position:-289px -17px}.c133{background-position:-306px -17px}.c134{background-position:-323px -17px}.c135{background-position:-340px -17px}.c136{background-position:-357px -17px}.c23{background-position:-374px -17px}.c49{background-position:-391px -17px}.c62{background-position:-408px -17px}.c20{background-position:-425px -17px}.c138{background-position:-442px -17px}.c52{background-position:-459px -17px}.c139{background-position:-476px -17px}.c176{background-position:-493px -17px}.c141{background-position:-510px -17px}.c50{background-position:-527px -17px}.c142{background-position:-544px -17px}.c145{background-position:-561px -17px}.c150{background-position:-578px -17px}.c151{background-position:-595px -17px}.c152{background-position:-612px -17px}.c66{background-position:-629px -17px}.c159{background-position:0 -34px}.c154{background-position:-17px -34px}.c43{background-position:-34px -34px}.c162{background-position:-51px -34px}.c163{background-position:-68px -34px}.c232{background-position:-85px -34px}.c165{background-position:-102px -34px}.c166{background-position:-119px -34px}.c167{background-position:-136px -34px}.c173{background-position:-153px -34px}.c174{background-position:-170px -34px}.c9,.c233{background-position:-187px -34px}.c21{background-position:-204px -34px}.c228{background-position:-221px -34px}.c179{background-position:-238px -34px}.c182{background-position:-255px -34px}.c48{background-position:-272px -34px}.c59{background-position:-289px -34px}.c184{background-position:-306px -34px}.c22{background-position:-323px -34px}.c37{background-position:-340px -34px}.c185{background-position:-357px -34px}.c24{background-position:-374px -34px}.c25{background-position:-391px -34px}.c201{background-position:-408px -34px}.c202{background-position:-425px -34px}.c112{background-position:-442px -34px}.c189{background-position:-459px -34px}.c191{background-position:-476px -34px}.c26{background-position:-493px -34px}.c29{background-position:-510px -34px}.c30{background-position:-527px -34px}.c32,.c231{background-position:-544px -34px}.c54{background-position:-561px -34px}.c51{background-position:-578px -34px}.c27{background-position:-595px -34px}.c197{background-position:-612px -34px}.c42{background-position:-629px -34px}.c198{background-position:0 -51px}.c28{background-position:-17px -51px}.c204{background-position:-34px -51px}.c206{background-position:-51px -51px}.c210{background-position:-68px -51px}.c213{background-position:-85px -51px}.c12{background-position:-102px -51px}.c214{background-position:-119px -51px}.c31{background-position:-136px -51px}.c53{background-position:-153px -51px}.c19{background-position:-170px -51px}.c39{background-position:-187px -51px}.c47{background-position:-204px -51px}.c221{background-position:-221px -51px}.c65{background-position:-238px -51px}.c224{background-position:-255px -51px}.c64{background-position:-272px -51px}.c6,.c227{background-position:-289px -51px}.c105{background-position:-323px -51px}.c192{background-position:-340px -51px}
</style>

<div id="page1" class="page top">
<div class="scroll_container" style="min-height: 311px;">
<div class="scroll_wrapper" style="padding-top: 44px; padding-bottom: 44px;">
<div class="appcontent">
<div>  </div>
<div id="aramacubugu" class="filterbar showQuickFilter">
<form class="form" onclick="if('today') toggleQuickFilter()" onsubmit="search(this.elements[0].value); return false;" action="#" style="transition: 0s"> 
<input type="text" class="searchfield" onfocus="disableQuickFilter()" placeholder="<?=getTranslation('mobilsearchfieldarama')?>" maxlength="68" onkeyup="updateSearch()">
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
<div class="icon " onclick="getle('todayt')"><div class="sports today"></div><span><?=getTranslation('mobilbugun')?></span></div>
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
<div class="icon selected" onclick="getle('sport5')"><div class="sports ice-hockey"></div><span><?=getTranslation('mobilbuzhokeyi')?></span></div>
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

<div class=" navitem arrow" onclick="getle('live')"> <div class="icon"> <div class="sports live"></div> <span class="hidden c "></span> </div> <div class="text"><?=getTranslation('mobilsportsulkecanli')?></div><div class="value"><div class="count normal hidden">&gt;</div></div></div>

<div class=" navitem arrow" onclick="getle('todayt')"> <div class="icon"> <div class="sports today"></div> <span class="hidden c "></span> </div> <div class="text"><?=getTranslation('mobilsportsulkebugun')?></div><div class="value"><div class="count normal hidden">&gt;</div></div></div>

<div class=" navitem arrow" onclick="getle('live')"> <div class="icon"> <div class="sports highlights"></div> <span class="hidden c "></span> </div> <div class="text"><?=getTranslation('mobilsportsulkehighlights')?></div><div class="value"><div class="count normal hidden">&gt;</div></div></div>

<div class=" navitem arrow" onclick="getle('live')"> <div class="icon"> <div class="sports lastminute"></div> <span class="hidden c "></span> </div> <div class="text"><?=getTranslation('mobilsportsulkesondakika')?></div><div class="value"><div class="count normal hidden">&gt;</div></div></div>

<div id="loadbultenulkeler"></div>

<div class="contentbottom hidden"> </div>
<div class="hidden">  </div>
<div class="spacer">&nbsp;</div>
</div>
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
function loadbultenulkeler() {
$("#loadbultenulkeler").html('<div id="loading" class="old"><div class="spinner"><img src="assets/loading2.svg" class="loading" onload="displayImage(this)"></div><div class="logo"></div></div>');
$.get('export.php?a=buzhokeyiulkeler',function(data) {
$("#loadbultenulkeler").html(data);
});
}
loadbultenulkeler();
</script>
</div>
</div>

<?php include 'footer.php'; ?>

</body>
</html>