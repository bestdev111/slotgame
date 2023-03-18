<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:login.php"); die(); exit(); }
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?=$ayar['site_adi']; ?></title>
<link href="style.css?r=<?=rand();?>" rel="stylesheet" type="text/css">
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/jquery-ui-1.8.21.custom.min.js"></script>
<script src="js/mousehold.js"></script>
</head>
<body class="scra">

<?php /*include 'ust3.php'; */?>

<div class="sporttitle" style="position: relative;">Kuponlarim </div>
	
<div class="infilter">
	<div class="filter">
		<ul>
			<li>
				<span>No</span>
				<input type="tel" class="input" id="k_kuponno" size="4" onChange="kupongetir(1);" style="width: 70px;">
				
			</li>
		<?
$dun = strtotime("-1 day");
?>
			<li>
				<span>İlk Tarih</span>
				<input type="text" class="input hasDatepicker" id="tarih1" name="tarih1" onChange="kupongetir(1);" autocomplete="off" value="<?=date("d-m-Y",$dun); ?>">
			</li>
			<li>
				<span>Son Tarih</span>
				<input autocomplete="off" type="text" class="input hasDatepicker" onChange="kupongetir(1);" id="tarih2" name="tarih2" value="<?=date("d-m-Y"); ?>">
			</li>
			
			<li>
<span>Durum</span>
<select class="input" id="k_durum" onChange="kupongetir(1);">
<option value="">Hepsi</option>
<option value="2">Kazandı</option>
<option value="3">Kaybetti</option>
<option value="1">Bahis Açık</option>
<option value="4">İptal</option>
</select>
</li>
<input type="hidden" id="order" value="id">
<input type="hidden" id="ascdesc" value="desc">
<input type="hidden" id="suanval" value="1">
</ul>
</div>
</div>

<div class="kaciklama">Kupon içeriği için lütfen kupon numarasına dokunun.</div>

<div id="kupons"></div>
<div class="kaciklama">
	<b>T/K</b> = Toplam Bahis/Kazanan Bahis<br>
	<b>O</b> = Toplam oran<br>
	<b>M</b> = Yatırılan miktar<br>
	<b>MK</b> = Muhtemel Kazanç<br>
	<b>K</b> = Kesin Kazanç<br>
	<b>D</b> = Durum
</div>



<script>
function asdes(order,as) {
$("#order").val(order);	
$("#ascdesc").val(as);
$("#suanval").val(1);
kupongetir(1);
}
function kupongetir(val, sayfaveri) {
if(val=="1") {
$("#suanval").val(1);
$("#kupons").html('');
}
var kupon_no = $("#k_kuponno").val();
var tarih1 = $("#tarih1").val();
var tarih2 = $("#tarih2").val();
var durum = $("#k_durum").val();
var rand = Math.random();
var order = $("#order").val();
var asde = $("#ascdesc").val();
var paging = $("#suanval").val();
$.get('../ajaxmobil.php?a=kuponlarim&sayfa='+sayfaveri+'&rand='+rand+'&kupon_no='+kupon_no+'&tarih1='+tarih1+'&tarih2='+tarih2+'&durum='+durum+'&order='+order+'&ascdesc='+asde+'',function(data) { $("#kupons").html(data); loadexit(); });
}
$(document).ready(function(e) {
kupongetir(1);
});
$(function () {
$("#tarih1, #tarih2").datepicker({
            dateFormat: 'dd-mm-yy', changeMonth: true, changeYear: true
        });
});
$(window).scroll(function(){
    if ($(window).scrollTop() >= 50) {
       $('.infiltre').addClass('fixeds');
    }
    else {
       $('.infiltre').removeClass('fixeds');
    }
});

$(window).scroll(function(){
if($(window).scrollTop() + $(window).height() >= $(document).height()) {
var kontrol = $("#footcontrol").val();
if(kontrol=="1") {
var suan = parseInt($("#suanval").val())+1;
$("#suanval").val(suan);
loadall();
kupongetir(0);
}
}
});

function loadall() {
$("#loadall").show();
$("body").css('overflow','hidden');
}
function loadexit() {
$("#loadall").hide();
$("body").css('overflow','auto');
}


</script>

</div>
</div>


<div class="clear"></div>
</div>

<? /*include 'alt.php';*/ ?>


</body>
</html>