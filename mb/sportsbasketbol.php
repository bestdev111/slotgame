<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:login.php"); exit(); }
if(userayar('basketbol')!="1") { header("Location:mb"); }
?>
<?php include 'header.php'; ?>

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
<div class="icon " onclick="getle('../sanal-spor')"><div class="filterIcon categories sanalQuickFilterIcon"></div><span><?=getTranslation('ajaxkupond20')?></span></div>
<? } ?>
<? if(userayar('casino_yetki')>0) { ?>
<div class="icon " onclick="getle('livecasino')"><div class="filterIcon categories casinoQuickFilterIcon"></div><span><?=getTranslation('yeniyerler_kasa132')?></span></div>
<? } ?>
<? if(userayar('rulet_oynama')>0 && userayar('rulet_yetki')>0) { ?>
<div class="icon " onclick="getle('../rulets')"><div class="filterIcon categories casinoQuickFilterIcon2"></div><span><?=getTranslation('yeniyerler_kasa229')?></span></div>
<? } ?>
<div class="icon " onclick="getle('todayb')"><div class="sports today"></div><span><?=getTranslation('mobilbugun')?></span></div>
<div class="icon " onclick="getle('sport99')"><div class="sports soccer"></div><span><?=getTranslation('mobilfutbol')?></span></div>
<? if(userayar('basketbol')=="1") { ?>
<div class="icon selected" onclick="getle('sport2')"><div class="sports basketball"></div><span><?=getTranslation('mobilbasketbol')?></span></div>
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

<div id="loadbulten"></div>

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
	$.get('export.php?a=livesearch_arama&sportip=2&aranan_takim='+aranan_takim+'',function(data) {
	$("#suggestions").removeClass('hidden');
	$("#searchDeleteIcon").removeClass('hidden');
	$("#suggestions").html(data);
	});
}

}
function loadbulten2() {
$("#loadbulten").html('<div id="loading" class="old"><div class="spinner"><img src="assets/loading2.svg" class="loading" onload="displayImage(this)"></div><div class="logo"></div></div>');
$(".filterbar").show();
loadbulten();
}
function loadbulten() {
$("#loadbulten").html('<div id="loading" class="old"><div class="spinner"><img src="assets/loading2.svg" class="loading" onload="displayImage(this)"></div><div class="logo"></div></div>');
$.get('export.php?a=basketbolbulten&ulke=<?=$_GET['ulke'];?>',function(data) {
$("#loadbulten").html(data);
});
}
loadbulten();
function detaygetir(sportip,id) {
$("#loadbulten").html('<div id="loading" class="old"><div class="spinner"><img src="assets/loading2.svg" class="loading" onload="displayImage(this)"></div><div class="logo"></div></div>');
$(".filterbar").hide();
$.get('export_detail.php?a=basketbol&id='+id+'',function(data) {
$("#loadbulten").html(data);
});
}
</script>
</div>
</div>

<?php include 'footer.php'; ?>

</body>
</html>