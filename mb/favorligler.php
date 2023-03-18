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
<form class="form" onclick="if('today') toggleQuickFilter()" onsubmit="search(this.elements[0].value); return false;" action="#" style="transition: 0s"> 
<input type="text" class="searchfield" onfocus="disableQuickFilter()" placeholder="<?=getTranslation('mobilsearchfieldarama')?>" maxlength="68" onkeyup="updateSearch()">
<span><?=getTranslation('mobilara')?></span>
<div id="searchDeleteIcon" class="deleteIcon hidden" onclick="listelesene(2)">x</div>
<div id="suggestions" class="hidden"></div>
</form>

<div class="quickFilter">

<div class="icon selected" onclick="getle('today')"><div class="sports today"></div><span><?=getTranslation('mobilbugun')?></span></div>
<div class="icon " onclick="getle('sport99')"><div class="sports soccer"></div><span><?=getTranslation('mobilfutbol')?></span></div>
<div class="icon " onclick="getle('sport2')"><div class="sports basketball"></div><span><?=getTranslation('mobilbasketbol')?></span></div>
<div class="icon " onclick="getle('sport3')"><div class="sports tennis"></div><span><?=getTranslation('mobiltenis')?></span></div>
<div class="icon " onclick="getle('sport4')"><div class="sports volleyball"></div><span><?=getTranslation('mobilvoleybol')?></span></div>
<div class="icon " onclick="getle('sport5')"><div class="sports ice-hockey"></div><span><?=getTranslation('mobilbuzhokeyi')?></span></div>
<div class="icon " onclick="getle('sport6')"><div class="sports handball"></div><span><?=getTranslation('mobilhentbol')?></span></div>

</div>
</div>

<div id="loadbultenbugun"></div>

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
function loadbultenbugun() {
$("#loadbultenbugun").html('<div class="spinner" style="text-align:center;"><img src="assets/img/loading_x6_blueto.gif" class="loading" onload="displayImage(this)"></div>');
var rand = Math.random();
$.get('export.php?a=futbolfavoriulkeler&rand='+rand+'',function(data) {
$("#loadbultenbugun").html(data);
});
}
loadbultenbugun();
</script>
</div>
</div>

<?php include 'footer.php'; ?>

</body>
</html>