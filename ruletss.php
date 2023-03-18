<?php
session_start();
include 'db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:login.php"); die(); exit(); }
if($ub['wkyetki']<2) { header("Location:kasa"); }
if(userayar('rulet_oynama')!='1') { header("Location:/"); }
?>
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/jquery-ui-1.8.21.custom.min.js"></script>
<script src="js/mousehold.js"></script>

<? include 'header.php'; ?>
<link rel="stylesheet" href="assets/rulet/rulet.css">
<link rel="stylesheet" href="assets/rulet/fontawesome-all.min.css">
<div class="main-cols" style="width: 99%;margin-left: 1%;">

<script>
var ruletdil1 = "<?=getTranslation('yeniyerler_kasa375')?> <?=getTranslation('yeniyerler_kasa229')?>";
var ruletdil2 = "<?=getTranslation('yeniyerler_kasa457')?>";
var ruletdil3 = "<?=getTranslation('yeniyerler_kasa458')?>";
var ruletdil4 = "<?=getTranslation('yeniyerler_kasa459')?>";
var ruletdil5 = "<?=getTranslation('yeniyerler_kasa460')?>";
var ruletdil6 = "<?=getTranslation('yeniyerler_kasa461')?>";
var ruletdil7 = "<?=getTranslation('yeniyerler_kasa462')?>";
var ruletdil8 = "<?=getTranslation('yeniyerler_kasa463')?>";
var ruletdil9 = "<?=getTranslation('yeniyerler_kasa464')?>";
var ruletdil10 = "<?=getTranslation('yeniyerler_kasa465')?>";
var ruletdil11 = "<?=getTranslation('yeniyerler_kasa466')?>";
var ruletdil12 = "<?=getTranslation('yeniyerler_kasa467')?>";
var ruletdil13 = "<?=getTranslation('yeniyerler_kasa468')?>";
var ruletdil14 = "<?=getTranslation('yeniyerler_kasa469')?>";
var ruletdil15 = "<?=getTranslation('yeniyerler_kasa470')?>";
var ruletdil16 = "<?=getTranslation('yeniyerler_kasa471')?>";
var ruletdil17 = "<?=getTranslation('yeniyerler_kasa472')?>";
var ruletdil18 = "<?=getTranslation('yeniyerler_kasa473')?>";
var ruletdil19 = "<?=getTranslation('kupononaylama8')?>";//kuponu temizle
var ruletdil20 = "<?=getTranslation('yeniyerler_kasa474')?>";
var ruletdil21 = "<?=getTranslation('yeniyerler_kasa475')?>";
var ruletdil22 = "<?=getTranslation('yeniyerler_kasa476')?>";
var ruletdil23 = "<?=getTranslation('yeniyerler_kasa477')?>";
var ruletdil24 = "<?=getTranslation('yeniyerler_kasa478')?>";
var ruletdil25 = "<?=getTranslation('yeniyerler_kasa479')?>";
var ruletdil26 = "<?=getTranslation('yeniyerler_kasa480')?>";
var ruletdil27 = "<?=getTranslation('yeniyerler_kasa481')?>";

var max_amount = 1000;
var gain_max = 15000;
var _update_coupon_time = 10000;
var _session_max = 1800;
var max_odd = 1000.00;
var is_mobile = false;
var livescript_loaded = false;
var autoprint = false;
var jsdebug = false;
var devmode = false;
var is_root = false;
var can_edit_sports = true;
var theme_name = 'default';
var _version = '2.055';
var bulten_style = 0;
var bulten_open_type = 'modal';
var balanceText = '';
var _lsound = 0;
</script>

<div class="right-col">
		<script>
var rouletteOptions = {
	tokens: {"1":"red","5":"green","10":"blue","25":"purple","50":"yellow","100":"brown","250":"orange","500":"darkgrey"},
	games: {"single":"<?=getTranslation('casinoicin433')?>","multi2":"<?=getTranslation('casinoicin434')?>","multi3":"<?=getTranslation('casinoicin435')?>","multi4":"<?=getTranslation('casinoicin436')?>","1st12":"<?=getTranslation('casinoicin437')?>","2nd12":"<?=getTranslation('casinoicin438')?>","3rd12":"<?=getTranslation('casinoicin439')?>","1to18":"<?=getTranslation('casinoicin440')?>","19to36":"<?=getTranslation('casinoicin441')?>","line1":"<?=getTranslation('casinoicin442')?>","line2":"<?=getTranslation('casinoicin442')?>","line3":"<?=getTranslation('casinoicin442')?>","red":"<?=getTranslation('casinoicin443')?>","black":"<?=getTranslation('casinoicin444')?>","odd":"<?=getTranslation('casinoicin445')?>","even":"<?=getTranslation('casinoicin446')?>"}}
var klasPlayer;
</script>
<style type="text/css">
#playerDiv { width: auto !important; height: auto !important; position: absolute !important; }
.rulet-video:before {
	content: "";
    display: block;
    padding-top: 56.2%;
}
.player-controls { position: absolute; bottom: 0; left: 0; right: 0; top: 0; }
.controlBottom { position: absolute; bottom: 0; left: 0; right: 0; display: flex; align-items: center; justify-content: flex-end; height: 40px; background: rgb(0 88 43); padding-right: 10px; }
.controlBottom i { color: #fff; width: 36px; height: 40px; display: flex; align-items: center; justify-content: center; font-size: 14px; cursor: pointer; opacity: 0.7; }
.controlBottom i:hover { opacity: 1; }
.controlBottom span { flex: 1; padding-left: 10px; color: #ffffff; font-size: 11px; font-weight: 600; text-align: left; }
.controlBottom i.fa-volume-mute { color: #eb0f0f; }
.videoFS { position: fixed; top: 0; left: 0; bottom: 0; right: 0; z-index: 5000; }
</style>
<script src=//demo.nanocosmos.de/nanoplayer/api/release/nanoplayer.4.min.js?20200330></script>

<div class="flex-fix">
<div id="roulette"></div>
</div>

</div>
</div>
</div>

<script src="assets/rulet/react.production.min.js"></script>
<script src="assets/rulet/react-dom.production.min.js"></script>
<script src="assets/rulet/roulette-react_1_y.js?v=2.055s"></script>

<div class="container" style="width: 90%;margin-left: 5%;display: block;">
<div class="home-left">
<div class="nasil-oynanir">
<div class="nasil-oynanir-title"><?=getTranslation('yeniyerler_kasa402')?></div>
<div class="no-content">

<div class="no-item">
<div class="no-title"><span><?=getTranslation('yeniyerler_kasa403')?></span><i class="fa fa-angle-down"></i></div>
<ol class="no-desc">
<li><?=getTranslation('yeniyerler_kasa404')?></li>
<li><?=getTranslation('yeniyerler_kasa405')?></li>
<li><?=getTranslation('yeniyerler_kasa406')?></li>
<li><?=getTranslation('yeniyerler_kasa407')?></li>
<li><?=getTranslation('yeniyerler_kasa408')?></li>
</ol>
</div>

<div class="no-item">
<div class="no-title"><span><?=getTranslation('yeniyerler_kasa409')?></span><i class="fa fa-angle-down"></i></div>
<ol class="no-desc">
<li><?=getTranslation('yeniyerler_kasa410')?></li>
<li><?=getTranslation('yeniyerler_kasa411')?></li>
<li><?=getTranslation('yeniyerler_kasa412')?></li>
<li><?=getTranslation('yeniyerler_kasa413')?></li>
<li><?=getTranslation('yeniyerler_kasa414')?></li>
</ol>
</div>

<div class="no-item">
<div class="no-title"><span><?=getTranslation('yeniyerler_kasa415')?></span><i class="fa fa-angle-down"></i></div>
<ol class="no-desc">
<li><?=getTranslation('yeniyerler_kasa416')?></li>
<li><?=getTranslation('yeniyerler_kasa417')?></li>
<li><?=getTranslation('yeniyerler_kasa418')?></li>
<li><?=getTranslation('yeniyerler_kasa419')?></li>
<li><?=getTranslation('yeniyerler_kasa420')?></li>
</ol>
</div>

<div class="no-item">
<div class="no-title"><span><?=getTranslation('yeniyerler_kasa421')?></span><i class="fa fa-angle-down"></i></div>
<ol class="no-desc">
<li><?=getTranslation('yeniyerler_kasa422')?></li>
<li><?=getTranslation('yeniyerler_kasa423')?></li>
<li><?=getTranslation('yeniyerler_kasa424')?></li>
<li><?=getTranslation('yeniyerler_kasa425')?></li>
<li><?=getTranslation('yeniyerler_kasa426')?></li>
</ol>
</div>

<div class="no-item">
<div class="no-title"><span><?=getTranslation('yeniyerler_kasa427')?></span><i class="fa fa-angle-down"></i></div>
<ol class="no-desc">
<li><?=getTranslation('yeniyerler_kasa428')?></li>
<li><?=getTranslation('yeniyerler_kasa429')?></li>
<li><?=getTranslation('yeniyerler_kasa430')?></li>
<li><?=getTranslation('yeniyerler_kasa431')?></li>
<li><?=getTranslation('yeniyerler_kasa432')?></li>
</ol>
</div>

<div class="no-item">
<div class="no-title"><span><?=getTranslation('yeniyerler_kasa433')?></span><i class="fa fa-angle-down"></i></div>
<ol class="no-desc">
<li><?=getTranslation('yeniyerler_kasa434')?></li>
<li><?=getTranslation('yeniyerler_kasa435')?></li>
<li><?=getTranslation('yeniyerler_kasa436')?></li>
<li><?=getTranslation('yeniyerler_kasa437')?></li>
<li><?=getTranslation('yeniyerler_kasa438')?></li>
</ol>
</div>

<div class="no-item">
<div class="no-title"><span><?=getTranslation('yeniyerler_kasa439')?></span><i class="fa fa-angle-down"></i></div>
<ol class="no-desc">
<li><?=getTranslation('yeniyerler_kasa440')?></li>
<li><?=getTranslation('yeniyerler_kasa441')?></li>
<li><?=getTranslation('yeniyerler_kasa442')?></li>
<li><?=getTranslation('yeniyerler_kasa443')?></li>
<li><?=getTranslation('yeniyerler_kasa444')?></li>
<li><?=getTranslation('yeniyerler_kasa445')?></li>
</ol>
</div>

<div class="no-item">
<div class="no-title"><span><?=getTranslation('yeniyerler_kasa446')?></span><i class="fa fa-angle-down"></i></div>
<ol class="no-desc">
<li><?=getTranslation('yeniyerler_kasa447')?></li>
<li><?=getTranslation('yeniyerler_kasa448')?></li>
<li><?=getTranslation('yeniyerler_kasa449')?></li>
<li><?=getTranslation('yeniyerler_kasa450')?></li>
<li><?=getTranslation('yeniyerler_kasa451')?></li>
<li><?=getTranslation('yeniyerler_kasa452')?></li>
<li><?=getTranslation('yeniyerler_kasa453')?></li>
</ol>
</div>
</div>
</div>
</div>
<div class="home-right">&nbsp;</div>
</div>
<script>
function coupon_position() {}
function couponbakiye(bakiye) { $('#balance2').html(bakiye); }

$(function() {
	$('.no-title').click(function() {
		$item = $(this).closest('.no-item');
		if ($item.hasClass('active')) {
			$item.removeClass('active');
		} else {
			$('.no-content .no-item.active').removeClass('active');
			$item.addClass('active');
		}
	});

	function iOS() {

		var iDevices = [
			'iPad Simulator',
			'iPhone Simulator',
			'iPod Simulator',
			'iPad',
			'iPhone',
			'iPod'
		];

		if (!!navigator.platform) {
			while (iDevices.length) {
				if (navigator.platform === iDevices.pop()){ return true; }
			}
		}

		return false;
	}
	$('#video-vol').click(function() {

		if ($(this).hasClass('fa-volume')) {
			$(this).removeClass('fa-volume').addClass('fa-volume-mute');
			klasPlayer.mute();
		} else {
			$(this).removeClass('fa-volume-mute').addClass('fa-volume');
			klasPlayer.unmute();

		}
	});
	$('#video-fs').click(function() {
		if (iOS()) {
			if ($('#tmb-player').hasClass('videoFS')) {
				$('#tmb-player').removeClass('videoFS');
			} else {
				$('#tmb-player').addClass('videoFS');
			}
		} else {
			if (
					document.fullscreenElement ||
					document.webkitFullscreenElement ||
					document.mozFullScreenElement ||
					document.msFullscreenElement
				) {
					if (document.exitFullscreen) {
						document.exitFullscreen();
					} else if (document.mozCancelFullScreen) {
						document.mozCancelFullScreen();
					} else if (document.webkitExitFullscreen) {
						document.webkitExitFullscreen();
					} else if (document.msExitFullscreen) {
						document.msExitFullscreen();
					}
				} else {
					element = $('#tmb-player').get(0);
					if (element.requestFullscreen) {
						element.requestFullscreen();
					} else if (element.mozRequestFullScreen) {
						element.mozRequestFullScreen();
					} else if (element.webkitRequestFullscreen) {
						element.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
					} else if (element.msRequestFullscreen) {
						element.msRequestFullscreen();
					}
				}
		}
	});
});
</script>
<?php include 'footer.php'; ?>

</body>
</html>