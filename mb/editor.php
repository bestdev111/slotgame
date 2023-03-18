<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:login.php"); exit(); }
?>
<?php include 'header.php'; ?>

<div id="ajax" class="ajax" style="display:none;">
<div class="block fadein50" style="position: fixed;">&nbsp;</div>
<table width="100%" height="100%" style="position: fixed;">
<tbody><tr><td height="100%" align="center">
<div class="window fadein">
<div class="image">&nbsp;</div><div class="msg"><?=getTranslation('mobileditor1')?></div></div></td>
</tr></tbody></table>
</div>

<div id="overlay" class="ajax hidden">


<div class="overlayContentkuponadi hidden" id="overlayContent">
<div id="editorStakeInput">
<div class="bartitle iconbar konto"><div class="text"><?=getTranslation('mobileditor2')?>:<div id="kuponsahibigir" class="numpad-amount" style="display:inline"></div></div></div>
<div class="barmiddle center">
<button class="w25 active simple" onclick="kuponadigirharf('A');"><div class="text"><?=getTranslation('mobileditor3')?></div></button>
<button class="w25 active simple" onclick="kuponadigirharf('B');"><div class="text"><?=getTranslation('mobileditor4')?></div></button>
<button class="w25 active simple" onclick="kuponadigirharf('C');"><div class="text"><?=getTranslation('mobileditor5')?></div></button>
</div>
<div class="barmiddle center">
<button class="w25 active simple" onclick="kuponadigirharf('Ç');"><div class="text"><?=getTranslation('mobileditor6')?></div></button>
<button class="w25 active simple" onclick="kuponadigirharf('D');"><div class="text"><?=getTranslation('mobileditor7')?></div></button>
<button class="w25 active simple" onclick="kuponadigirharf('E');"><div class="text"><?=getTranslation('mobileditor8')?></div></button>
</div>
<div class="barmiddle center">
<button class="w25 active simple" onclick="kuponadigirharf('F');"><div class="text"><?=getTranslation('mobileditor9')?></div></button>
<button class="w25 active simple" onclick="kuponadigirharf('G');"><div class="text"><?=getTranslation('mobileditor10')?></div></button>
<button class="w25 active simple" onclick="kuponadigirharf('Ğ');"><div class="text"><?=getTranslation('mobileditor11')?></div></button>
</div>
<div class="barmiddle center">
<button class="w25 active simple" onclick="kuponadigirharf('H');"><div class="text"><?=getTranslation('mobileditor12')?></div></button>
<button class="w25 active simple" onclick="kuponadigirharf('I');"><div class="text"><?=getTranslation('mobileditor13')?></div></button>
<button class="w25 active simple" onclick="kuponadigirharf('İ');"><div class="text"><?=getTranslation('mobileditor14')?></div></button>
</div>
<div class="barmiddle center">
<button class="w25 active simple" onclick="kuponadigirharf('J');"><div class="text"><?=getTranslation('mobileditor15')?></div></button>
<button class="w25 active simple" onclick="kuponadigirharf('K');"><div class="text"><?=getTranslation('mobileditor16')?></div></button>
<button class="w25 active simple" onclick="kuponadigirharf('L');"><div class="text"><?=getTranslation('mobileditor17')?></div></button>
</div>
<div class="barmiddle center">
<button class="w25 active simple" onclick="kuponadigirharf('M');"><div class="text"><?=getTranslation('mobileditor18')?></div></button>
<button class="w25 active simple" onclick="kuponadigirharf('N');"><div class="text"><?=getTranslation('mobileditor19')?></div></button>
<button class="w25 active simple" onclick="kuponadigirharf('O');"><div class="text"><?=getTranslation('mobileditor20')?></div></button>
</div>
<div class="barmiddle center">
<button class="w25 active simple" onclick="kuponadigirharf('Ö');"><div class="text"><?=getTranslation('mobileditor21')?></div></button>
<button class="w25 active simple" onclick="kuponadigirharf('P');"><div class="text"><?=getTranslation('mobileditor22')?></div></button>
<button class="w25 active simple" onclick="kuponadigirharf('R');"><div class="text"><?=getTranslation('mobileditor23')?></div></button>
</div>
<div class="barmiddle center">
<button class="w25 active simple" onclick="kuponadigirharf('S');"><div class="text"><?=getTranslation('mobileditor24')?></div></button>
<button class="w25 active simple" onclick="kuponadigirharf('Ş');"><div class="text"><?=getTranslation('mobileditor25')?></div></button>
<button class="w25 active simple" onclick="kuponadigirharf('T');"><div class="text"><?=getTranslation('mobileditor26')?></div></button>
</div>
<div class="barmiddle center">
<button class="w25 active simple" onclick="kuponadigirharf('U');"><div class="text"><?=getTranslation('mobileditor27')?></div></button>
<button class="w25 active simple" onclick="kuponadigirharf('Ü');"><div class="text"><?=getTranslation('mobileditor28')?></div></button>
<button class="w25 active simple" onclick="kuponadigirharf('V');"><div class="text"><?=getTranslation('mobileditor29')?></div></button>
</div>
<div class="barmiddle center">
<button class="w25 active simple" onclick="kuponadigirharf('Y');"><div class="text"><?=getTranslation('mobileditor30')?></div></button>
<button class="w25 active simple" onclick="kuponadigirharf('Z');"><div class="text"><?=getTranslation('mobileditor31')?></div></button>
<button class="w25 active simple" onclick="kuponadigirharf('sil');"><div class="text"><?=getTranslation('mobileditor32')?></div></button>
</div>
</div>
<div class="stakeButton bigbutton_wrapper overlay">
<button class="bigbutton" onclick="settotalbetsamount();"><div class="text"><?=getTranslation('mobileditor33')?></div></button>
</div>
</div>

<div class="overlayContentbahisgir hidden" id="overlayContent">
<div id="editorStakeInput">
<div class="bartitle iconbar konto"><div class="text"><?=getTranslation('mobileditor34')?>:<div id="kuponbahisigir" class="numpad-amount" style="display:inline">0</div> </div></div>
<div class="barmiddle center">
<button class="w25 active simple" onclick="kuponbahisgir(1);"><div class="text">1</div></button>
<button class="w25 active simple" onclick="kuponbahisgir(2);"><div class="text">2</div></button>
<button class="w25 active simple" onclick="kuponbahisgir(3);"><div class="text">3</div></button>
</div>
<div class="barmiddle center">
<button class="w25 active simple" onclick="kuponbahisgir(4);"><div class="text">4</div></button>
<button class="w25 active simple" onclick="kuponbahisgir(5);"><div class="text">5</div></button>
<button class="w25 active simple" onclick="kuponbahisgir(6);"><div class="text">6</div></button>
</div>
<div class="barmiddle center">
<button class="w25 active simple" onclick="kuponbahisgir(7);"><div class="text">7</div></button>
<button class="w25 active simple" onclick="kuponbahisgir(8);"><div class="text">8</div></button>
<button class="w25 active simple" onclick="kuponbahisgir(9);"><div class="text">9</div></button>
</div>
<div class="barmiddle center">
<button class="w25 active simple" onclick="kuponbahisgir('.');"><div class="text">.</div></button>
<button class="w25 active simple" onclick="kuponbahisgir(0);"><div class="text">0</div></button>
<button class="w25 active simple" onclick="kuponbahisgir('sil');"><div class="text"><?=getTranslation('mobileditor32')?></div></button>
</div>
</div>
<div class="stakeButton bigbutton_wrapper overlay">
<button class="bigbutton" onclick="settotalbetsamount2();"><div class="text"><?=getTranslation('mobileditor33')?></div></button>
</div>
</div>


</div>

<div id="page1" class="page top">
<div class="scroll_container" onscroll="scrollActions(this, true)">
<div class="scroll_wrapper" style="padding-top: 44px; padding-bottom: 44px;">
<div class="appcontent">
<div>  </div>

<div id="avarey2" class="avarey" style="display:none;"></div>
<div id="avarey" class="avarey"></div>

<div class="contentbottom hidden"> </div>
<div class="spacer">&nbsp;</div>
</div>
</div>
</div>
</div>

<script>
function limitupdate() {
	var rand = Math.random();
	$.get('../ajax.php?a=limitupdate&rand='+rand+'',function(data) { $("#bubakiye").html(data); });
}

window.settotalbetsamount = function() {
	$('#overlay').addClass('hidden');
	$(".overlayContentkuponadi").addClass('hidden');
	var suan = $("#kuponisim").val();
	var toplam = suan.length;
	if(toplam==0){
	$("#kuponadigirin").html("<?=getTranslation('mobileditor35')?>");
	}
};

window.settotalbetsamount2 = function() {
	$('#overlay').addClass('hidden');
	$(".overlayContentbahisgir").addClass('hidden');
	var suan = $("#kuponyatan").val();
	var toplam = suan.length;
	if(toplam==0){
	$("#bahisgirin").html("0");
	$("#bahisgirin2").html("0.00");
	}
};

window.kuponadigirharf = function(a) {
if(a=="sil"){
	var suan = $("#kuponisim").val();
	var toplam = suan.length;
	var res = suan.substr(0,(toplam-1));

	$("#kuponisim").val(res);
	$("#kuponsahibigir").html(res);
	$("#kuponadigirin").html(res);
} else {
	$("#kuponisim").val($("#kuponisim").val()+a);
	$("#kuponsahibigir").html($("#kuponisim").val());
	$("#kuponadigirin").html($("#kuponisim").val());
}
};

window.kuponadigir= function() {
$('#overlay').removeClass('hidden');
$(".overlayContentkuponadi").removeClass('hidden');
}

window.bahisgir= function() {
$('#overlay').removeClass('hidden');
$(".overlayContentbahisgir").removeClass('hidden');
}

function sonkupon() {
var rand = Math.random();
$.get('../ajax.php?a=sonkupon&kuponid=0&rand='+rand+'',function(data) { 
if(data=="404") { alert('<?=getTranslation('mobileditor36')?>'); }
else if(data=="403") { alert('Canlı Maçlar Geri Yüklenemez.'); kupontemizle_editor(); }
else if(data=="402") { alert('<?=getTranslation('mobileditor36')?>'); }
else if(data=="23") { alert('<?=getTranslation('mobileditor36')?>'); } else {
kuponguncelle(); 
}
});
}

function kupontemizle_editor() {
var rand = Math.random();
$("#cupdate").val('1');
$.get('export.php?a=kupontemizle&rand='+rand+'',function() { 
kuponguncelle(1);
kuponadet();
});	
}
</script>

<?php include 'footer.php'; ?>

</body>
</html>