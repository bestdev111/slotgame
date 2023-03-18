<?php
session_start();
include './db.php';
if($ub['wkyetki']<2) { header("Location:kasa"); }
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:login.php"); die(); exit(); }

if(userayar('sanal_futbolv2')==0 && userayar('sanal_futbol')==0 && userayar('sanal_sampiyonlar')==0 && userayar('sanal_dunya')==0 && userayar('sanal_avrupa')==0 && userayar('sanal_basketbol')==0 && userayar('sanal_atyarisi')==0) { header("Location:spor-bahisleri"); }

?>
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/jquery-ui-1.8.21.custom.min.js"></script>
<script src="js/mousehold.js"></script>
<?php include 'header.php'; ?>

<style>
.secilmemistip {
	background-color: #fff;
	border-bottom: 1px solid #c8c8c8;
}
.secilmistip {
	background-color: #f74835 !important;
    border-bottom: 1px solid #f74835 !important;
}
.gizleme {
	display: none;
}
.active {
	display: block !important;
	line-height: 28px;
}
.sanal-sub {
	display: none;
}
.sanal-sub.active {
	display: table-row;
}
.oddline div.sanal-odd {
    padding: 5px;
}
.oddline div a:hover,
.oddline div.active a {
  color: #805826;
  background: #ffb74e;
  border-color: transparent;
}
.oddline div .action,
.oddline div > a > span {
  display: flex;
  align-items: center;
  float: right;
  overflow: hidden;
}
#main_wide iframe {
	width: 100%;
	max-width: 762px;
	height: 358px;
	margin: 0 auto;
}
.vtype-vbl .sanal-iframe-holder, .vtype-vbl iframe {
	width: 762px;
	height: 628px !important;
}
</style>

<div id="content" class="left">
<div id="main_wide" class="lwkSelector vtype-<? if($_GET['spid']=="vbl"){ ?>vbl<? } else { ?>vflm<? } ?>">

<? if($_GET['spid']=="vflm" && userayar('sanal_futbolv2')=="1"){ ?>
<iframe src="yeniajax/virtualgames.php?spid=vflm" frameborder="0" scrolling="no"></iframe>
<? } else if($_GET['spid']=="vfcc" && userayar('sanal_sampiyonlar')=="1"){ ?>
<iframe src="yeniajax/virtualgames.php?spid=vfcc" frameborder="0" scrolling="no"></iframe>
<? } else if($_GET['spid']=="vfct" && userayar('sanal_futbol')=="1"){ ?>
<iframe src="yeniajax/virtualgames.php?spid=vfct" frameborder="0" scrolling="no"></iframe>
<? } else if($_GET['spid']=="vfwc" && userayar('sanal_dunya')=="1"){ ?>
<iframe src="yeniajax/virtualgames.php?spid=vfwc" frameborder="0" scrolling="no"></iframe>
<? } else if($_GET['spid']=="vfec" && userayar('sanal_avrupa')=="1"){ ?>
<iframe src="yeniajax/virtualgames.php?spid=vfec" frameborder="0" scrolling="no"></iframe>
<? } else if($_GET['spid']=="vbl" && userayar('sanal_basketbol')=="1"){ ?>
<iframe src="yeniajax/virtualgames.php?spid=vbl" frameborder="0" scrolling="no"></iframe>
<? } else if($_GET['spid']=="vhc" && userayar('sanal_atyarisi')=="1"){ ?>
<iframe src="yeniajax/virtualgames.php?spid=vhc" frameborder="0" scrolling="no"></iframe>
<? } else if($_GET['spid']=="vdr" && userayar('sanal_kopek')=="1"){ ?>
<iframe src="yeniajax/virtualgames.php?spid=vdr" frameborder="0" scrolling="no"></iframe>
<? } else { ?>

<? if(userayar('sanal_futbolv2')=="0") { ?>
<iframe src="yeniajax/virtualgames.php?spid=vfct" frameborder="0" scrolling="no"></iframe>
<? } else if(userayar('sanal_futbol')=="0") { ?>
<iframe src="yeniajax/virtualgames.php?spid=vfcc" frameborder="0" scrolling="no"></iframe>
<? } else if(userayar('sanal_sampiyonlar')=="0") { ?>
<iframe src="yeniajax/virtualgames.php?spid=vfwc" frameborder="0" scrolling="no"></iframe>
<? } else if(userayar('sanal_dunya')=="0") { ?>
<iframe src="yeniajax/virtualgames.php?spid=vfec" frameborder="0" scrolling="no"></iframe>
<? } else if(userayar('sanal_avrupa')=="0") { ?>
<iframe src="yeniajax/virtualgames.php?spid=vbl" frameborder="0" scrolling="no"></iframe>
<? } else if(userayar('sanal_basketbol')=="0") { ?>
<iframe src="yeniajax/virtualgames.php?spid=vhc" frameborder="0" scrolling="no"></iframe>
<? } else if(userayar('sanal_atyarisi')=="0") { ?>
<iframe src="yeniajax/virtualgames.php?spid=vdr" frameborder="0" scrolling="no"></iframe>
<? } else { ?>
<iframe src="yeniajax/virtualgames.php?spid=vflm" frameborder="0" scrolling="no"></iframe>
<? } ?>

<? } ?>

<span id="mainPage">
<div class="e_active e_noCache margin_r_12" id="comp-selection">
<div class="space"></div>
<div class="e_active e_noCache jq-compound-event-block" id="budacount_1">

<div class="border_ccc" style="width: 100%;">

<div class="e_active" id="League1">
<div class="">



</div>
</div>
</div>
</div>
</div>
</span>
</div>
</div>

<div id="side" class="right">

<div id="editorForm">
<div class="slider_name top"><?=getTranslation('bahiskuponu')?>&nbsp;</div>

<div id="ticket">
<div id="ticket_body" style="display:block;">
<div class="slider"></div>
<div id="ticket_content">
<div class="ticketText" id="coupon"><div class="ticketText"><?=getTranslation('sanalmaclaricin10')?></div></div>
<div class="ticketText" id="coupon2" style="display:none;"></div>
</div>
</div>
</div>
</div>

<div id="leftSide">

<div id="casinoRightBox" class="asideBox">
<h1><?=getTranslation('sanalmaclaricin1')?></h1>
<ul>
<? if(userayar('sanal_futbolv2')=="1"){ ?>
<li id="sportip_vflm" class="line" style="background-color: #fff;border-bottom: 1px solid #c8c8c8;"><a href="sanal-spor?spid=vflm" class="nav_main_1 white"><?=getTranslation('sanalmaclaricin2')?></a></li>
<? } ?>
<? if(userayar('sanal_futbol')=="1"){ ?>
<li id="sportip_vfct" class="line" style="background-color: #fff;border-bottom: 1px solid #c8c8c8;"><a href="sanal-spor?spid=vfct" class="nav_main_1 white"><?=getTranslation('sanalmaclaricin3')?></a></li>
<? } ?>
<? if(userayar('sanal_sampiyonlar')=="1"){ ?>
<li id="sportip_vfcc" class="line" style="background-color: #fff;border-bottom: 1px solid #c8c8c8;"><a href="sanal-spor?spid=vfcc" class="nav_main_1 white"><?=getTranslation('sanalmaclaricin4')?></a></li>
<? } ?>
<? if(userayar('sanal_dunya')=="1"){ ?>
<li id="sportip_vfwc" class="line" style="background-color: #fff;border-bottom: 1px solid #c8c8c8;"><a href="sanal-spor?spid=vfwc" class="nav_main_1 white"><?=getTranslation('sanalmaclaricin5')?></a></li>
<? } ?>
<? if(userayar('sanal_avrupa')=="1"){ ?>
<li id="sportip_vfec" class="line" style="background-color: #fff;border-bottom: 1px solid #c8c8c8;"><a href="sanal-spor?spid=vfec" class="nav_main_1 white"><?=getTranslation('sanalmaclaricin6')?></a></li>
<? } ?>
<? if(userayar('sanal_basketbol')=="1"){ ?>
<li id="sportip_vbl" class="line" style="background-color: #fff;border-bottom: 1px solid #c8c8c8;"><a href="sanal-spor?spid=vbl" class="nav_main_1 white"><?=getTranslation('sanalmaclaricin7')?></a></li>
<? } ?>
<? if(userayar('sanal_atyarisi')=="1"){ ?>
<li id="sportip_vhc" class="line" style="background-color: #fff;border-bottom: 1px solid #c8c8c8;"><a href="sanal-spor?spid=vhc" class="nav_main_1 white"><?=getTranslation('sanalmaclaricin8')?></a></li>
<? } ?>
<? if(userayar('sanal_kopek')=="1"){ ?>
<li id="sportip_vdr" class="line" style="background-color: #fff;border-bottom: 1px solid #c8c8c8;"><a href="sanal-spor?spid=vdr" class="nav_main_1 white"><?=getTranslation('sanalmaclaricin9')?></a></li>
<? } ?>
</ul>
</div>

</div>

</div>

<script>
<? if($_GET['spid']=="vflm" && userayar('sanal_futbolv2')=="1"){ ?>
var _game = 'vflm';
<? } else if($_GET['spid']=="vfcc" && userayar('sanal_sampiyonlar')=="1"){ ?>
var _game = 'vfcc';
<? } else if($_GET['spid']=="vfct" && userayar('sanal_futbol')=="1"){ ?>
var _game = 'vfct';
<? } else if($_GET['spid']=="vfwc" && userayar('sanal_dunya')=="1"){ ?>
var _game = 'vfwc';
<? } else if($_GET['spid']=="vfec" && userayar('sanal_avrupa')=="1"){ ?>
var _game = 'vfec';
<? } else if($_GET['spid']=="vbl" && userayar('sanal_basketbol')=="1"){ ?>
var _game = 'vbl';
<? } else if($_GET['spid']=="vhc" && userayar('sanal_atyarisi')=="1"){ ?>
var _game = 'vhc';
<? } else if($_GET['spid']=="vdr" && userayar('sanal_kopek')=="1"){ ?>
var _game = 'vdr';
<? } else { ?>

<? if(userayar('sanal_futbolv2')=="1") { ?>
var _game = 'vflm';
<? } else if(userayar('sanal_futbol')=="1") { ?>
var _game = 'vfct';
<? } else if(userayar('sanal_sampiyonlar')=="1") { ?>
var _game = 'vfcc';
<? } else if(userayar('sanal_dunya')=="1") { ?>
var _game = 'vfwc';
<? } else if(userayar('sanal_avrupa')=="1") { ?>
var _game = 'vfec';
<? } else if(userayar('sanal_basketbol')=="1") { ?>
var _game = 'vbl';
<? } else if(userayar('sanal_atyarisi')=="1") { ?>
var _game = 'vhc';
<? } else if(userayar('sanal_kopek')=="1") { ?>
var _game = 'vdr';
<? } ?>

<? } ?>
var _version = '2';
$('#sportip_'+_game).addClass('secilmistip');
var _vItemID = 0;
function setVflStatus(status) {
	return;
	var season_name = status.season_name.split(' ');
	var matchday = status.match_day;
	$('#sanal-table-holder').html('<div id="preloader"><div class="cssload-loader"><div class="cssload-side"></div><div class="cssload-side"></div><div class="cssload-side"></div><div class="cssload-side"></div><div class="cssload-side"></div><div class="cssload-side"></div><div class="cssload-side"></div><div class="cssload-side"></div></div></div>');
	$.ajax({
		url: '?page=callback&action=virtual&version=2&spid=vfl&season='+season_name[2]+'&sid='+season_name[2]+'&week='+matchday,
		dataType: 'json',
		success: function(json) {
			$('#sanal-table-holder').html(json.html);
		}
	});
}
function setVflMatchday(status) {
	var season_name = status.season_name.split(' ');
	var matchday = status.match_day;
	$activeGame = 'Maç Sonucu';
	$('#sanal-table-holder').html('<div id="preloader"><div class="cssload-loader"><div class="cssload-side"></div><div class="cssload-side"></div><div class="cssload-side"></div><div class="cssload-side"></div><div class="cssload-side"></div><div class="cssload-side"></div><div class="cssload-side"></div><div class="cssload-side"></div></div></div>');
	$.ajax({
		url: '?page=callback&action=virtual&version=2&spid=vfl&season='+season_name[2]+'&sid='+season_name[2]+'&week='+matchday,
		dataType: 'json',
		success: function(json) {
			$('#sanal-table-holder').html(json.html);
		}
	});
}

function get_matches(season_num, week, season_id, ids=null) {
	$('#sanal-table-holder').html('<div id="preloader"><div class="cssload-loader"><div class="cssload-side"></div><div class="cssload-side"></div><div class="cssload-side"></div><div class="cssload-side"></div><div class="cssload-side"></div><div class="cssload-side"></div><div class="cssload-side"></div><div class="cssload-side"></div></div></div>');
	$.ajax({
		url: 'yeniajax/sanalmaclar.php?version=2&season='+season_num+'&week='+week+'&sid='+season_id+'&spid='+_game+'&match_ids='+ids,
		dataType: 'json',
		success: function(json) {
			$('#sanal-table-holder').html(json.html);
			unblock($('#sanal-table-holder'));
			$('.sanal-iframe-holder iframe').show();
		}
	});
}

function get_horse_races(race_number, raceday_id) {
	$('#sanal-table-holder').html('<div id="preloader"><div class="cssload-loader"><div class="cssload-side"></div><div class="cssload-side"></div><div class="cssload-side"></div><div class="cssload-side"></div><div class="cssload-side"></div><div class="cssload-side"></div><div class="cssload-side"></div><div class="cssload-side"></div></div></div>');
	$.ajax({
		url: 'yeniajax/sanalmaclar.php?version=2&week='+race_number+'&season='+raceday_id+'&spid='+_game,
		dataType: 'json',
		success: function(json) {
			$('#sanal-table-holder').html(json.html);
			unblock($('#sanal-table-holder'));
			$('.sanal-iframe-holder iframe').show();
		}
	});
}

window.addEventListener('message', function(message){

	/* maç listesini yükle */
	console.log('message', message.data);
	if (typeof message.data.setVfMatches !== 'undefined') {
		var data = message.data.setVfMatches;
		get_matches(data.competition_nr, data.matchset_nr, data.competition_id, data.match_ids.join(','));
	} else if (typeof message.data.setVfecMatches !== 'undefined') {
		var data = message.data.setVfecMatches;
		get_matches(data.competition_nr, data.matchset_nr, data.competition_id, data.match_ids.join(','));
	} else if (typeof message.data.setVblMatchday !== 'undefined') {
		var data = message.data.setVblMatchday;
		get_matches(data.season_name, data.match_day, data.season_no);
	} else if (typeof message.data.setVhcRace !== 'undefined') {
		var data = message.data.setVhcRace;
		_vItemID = data.Raceday_id+'/'+data.Race_number;
		get_horse_races(data.Race_number, data.Raceday_id);
	} else if (typeof message.data.setVdrRace !== 'undefined') {
		var data = message.data.setVdrRace;
		_vItemID = data.Raceday_id+'/'+data.Race_number;
		get_horse_races(data.Race_number, data.Raceday_id);
	} else {

	}

});

function virtualremove() {
var rand = Math.random();
$("#cupdate").val('1');
$.get('ajax_asanal.php?a=virtualremove&rand='+rand+'',function() { 
$('#coupon').html('<div class="ticketText"><?=getTranslation('sanalmaclaricin10')?></div>');
$('.sanal-bet.on').removeClass('on');
});	
}

function removetekvirtual(id,mac_kodu) {
$.get('ajax_asanal.php?a=removetekvirtual&id='+id+'',function(data) {
	if(data=="1") {
		$.ajax({
		url: 'ajax_asanal.php?a=virtualcoupons',
		type: 'GET',
		dataType: 'json',
		success: function(json) {
			if (json.status == 'success') {
				$('#coupon').html(json.html);
				$('div[data-id="'+mac_kodu+'"] .sanal-bet').removeClass('on');
			}
		}
		});
	} else {
		$('#coupon').html('<div class="ticketText"><?=getTranslation('sanalmaclaricin10')?></div>');
		$('.sanal-bet.on').removeClass('on');
	}
});
}

function totalbet(data){
	jQuery('#fold').val(data);
	var yansit = data*$("#total-odd").val();
		if(data><?=userayar("sanal_maxtutar"); ?>) {
			failcont('Hata','<?=getTranslation('failconthata2')?> <?=userayar("sanal_maxtutar"); ?> TRY');
			$("#fold").val(1);
			var tutar = 1*$("#total-odd").html();
		} else {
			var tutar = nf(yansit);
		}
	$("#max-gain-total").html(tutar);
}

function totalbets() {
var yansit = $("#fold").val()*$("#total-odd").val();
var tutarbilgisi = $("#fold").val();
if(tutarbilgisi><?=userayar("sanal_maxtutar");?>) {
	failcont('Hata','<?=getTranslation('failconthata2')?> <?=userayar("sanal_maxtutar");?> TRY');
	$("#fold").val(1);
	var tutar = 1*$("#total-odd").html();
} else {
	var tutar = nf(yansit);
}
$("#max-gain-total").html(tutar);
}

function virtualonaygoruntule() {
$.get('ajax_asanal.php?a=virtualonaygoruntule',function(data) {
$("#coupon2").html(data);
$("#coupon2").show();
$("#coupon").hide();
});
}

function virtualcouponokey() {
$("#cupdate").val('0');
<? if($ub['alt_durum']>0) { ?>
failcont('hata','<?=getTranslation('failconthata3')?>'); $("#cupdate").val('1');
<? } else { ?>
var rand = Math.random();
var kuponyatan = $("#fold").val();
if(kuponyatan><?=$ub['bakiye'];?>) {
	failcont('Hata','<?=getTranslation('failconthata4')?>'); $("#cupdate").val('1');
} else if(kuponyatan<<?=userayar('sanal_mintutar');?> || kuponyatan<1) {
	failcont('Hata','<?=getTranslation('failconthata5')?> <?=userayar('sanal_mintutar');?> TRY'); $("#cupdate").val('1');
} else {
	$("#cupdate").val('0');
	var kuponisim = $("#title").val();
	$("#cupdate").val('0');
	$.ajax({
		url: "ajax_asanal.php?a=virtualokey&rand="+rand+"",
		type: "POST",
		data: "tutar="+kuponyatan+"&kuponadi="+kuponisim+"",
		success: function(data) {
			if(data=="1") {
				failcont('Hata','<?=getTranslation('failconthata7')?>'); $("#cupdate").val('1');
			} else if(data=="2") {
				failcont('Hata','<?=getTranslation('sanalmaclaricin11')?> : <?=userayar('sanal_maxoran');?>'); $("#cupdate").val('1');
			} else if(data=="3") {
				failcont('Hata','<?=getTranslation('sanalmaclaricin12')?> : <?=userayar('sanal_minoran');?>'); $("#cupdate").val('1');
			} else if(data=="4") {
				failcont('Hata','<?=getTranslation('sanalspor3')?> <?=getTranslation('casinoicin403')?> : <?=userayar('sanal_mbs');?>'); $("#cupdate").val('1');
			} else if(data=="643") {
				failcont('Hata','Küsüratlı Kupon Oynama Yasaklanmıştır.'); $("#cupdate").val('1');
			} else if(data=="644") {
				failcont('Hata','<?=getTranslation('failconthata4')?>'); $("#cupdate").val('1');
			} else if(data=="200") {
				limitupdate();
				$("#cupdate").val('0');
				virtualremove();
				virtualonaygoruntule();
			}
		}
		});
}
<? } ?>
}

function virtualbirle() {
$("#coupon2").html('');
$("#coupon2").hide();
$("#coupon").show();
}

function virtualyazdir() {
	$("#printerlock").html('<iframe src="printKupon.php?tip=sanal&son=1" style="width:0px; height:0px;"></iframe>'); 
}

$(function() {

		$.ajax({
			url: 'ajax_asanal.php?a=virtualcoupons',
			type: 'GET',
			dataType: 'json',
			success: function(json) {
				if (json.status == 'success') {
					$('#coupon').html(json.html);
				}
			}
		});

	/* bahis yap */
	$('body').on('click', '.sanal-bet:not(.passive)', function() {
		$bet = $(this);
		$('div[data-id="'+$bet.attr("data-id")+'"] .sanal-bet.on').removeClass('on');
		$('div[data-id="'+$bet.attr("data-id")+'"] .sanal-bet[data-type="'+$bet.attr("data-type")+'"][data-bet="'+$bet.attr("data-bet")+'"]').addClass('on');
		
											if(_game=="vhc" || _game=="vdr"){
		$.ajax({
			url: 'ajax_asanal.php?a=add_virtual_bet',
			type: 'POST',
			data: {
				match_id: $bet.closest("virtuallers").attr("data-id"),
				season: $bet.closest("virtuallers").attr("data-s"),
				week: $bet.closest("virtuallers").attr("data-w"),
				game: _game == 'vflbb' ? 'vfl' : _game,
				type: $bet.attr("data-type"),
				bet: $bet.attr("data-bet"),
				odd: $bet.attr("data-odd"),
				name: $bet.closest("virtuallers").attr("data-name"),
				vtype: 'v'+_version,
				season_id: $bet.closest("virtuallers").attr("data-season"),
				player: $bet.closest("virtuallers").attr("data-player"),
				playerName: $bet.closest("virtuallers").attr("data-playerName"),
				date: $bet.closest("virtuallers").attr("data-date"),
			},
			dataType: 'json',
			success: function(json) {
				if (json.status == 'success') {
					$('#coupon').html(json.html);
				} else if (json.status == 'errors') {
					$('#coupon').html('<div class="ticketText"><?=getTranslation('sanalmaclaricin10')?></div>');
				} else {
					failcont('Hata',json.message);
				}
			}
		});
		
											} else {
		
		$.ajax({
			url: 'ajax_asanal.php?a=add_virtual_bet',
			type: 'POST',
			data: {
				match_id: $bet.attr("data-id"),
				season: $bet.attr("data-s"),
				week: $bet.attr("data-w"),
				game: _game == 'vflbb' ? 'vfl' : _game,
				type: $bet.attr("data-type"),
				bet: $bet.attr("data-bet"),
				odd: $bet.attr("data-odd"),
				name: $bet.attr("data-name"),
				vtype: 'v'+_version,
				season_id: $bet.attr("data-season"),
				player: $bet.attr("data-player"),
				playerName: $bet.attr("data-playerName"),
				date: $bet.attr("data-date"),
			},
			dataType: 'json',
			success: function(json) {
				if (json.status == 'success') {
					$('#coupon').html(json.html);
				} else if (json.status == 'errors') {
					$('#coupon').html('<div class="ticketText"><?=getTranslation('sanalmaclaricin10')?></div>');
				} else {
					failcont('Hata',json.message);
				}
			}
		});
		
											}
	
	});

	/* more - click */
	$('body').on('click', '.sanal-more', function() {
		$ths = $(this);
		$match_id = $(this).closest('div').attr("data-id");
		$('#sanal-sub-'+$match_id).toggleClass('active');
	});

	/* istatistik - click */
	$('body').on('click', '.sanal-stats', function() {
		if (_game == 'vhc' || _game == 'vdr') {
			window.open('https://rgs.betradar.com/'+_game+'/statistic/fixtures/446/tr/'+_vItemID+'/style:newbetboo','popUpWindow','height=639,width=606,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');
		} else {
			$ths = $(this);
			$season_id = $ths.closest('table').attr("data-season");
			block($ths);
			$match_id = $(this).closest('tr').attr("data-id");
			$.ajax({
				url: '?page=callback&action=virtual_uids&match_id='+$match_id,
				dataType: 'json',
				success: function(json) {
					unblock($ths);
					window.open('https://s5.sir.sportradar.com/betradarvg/tr/1/season/'+$season_id+'/h2h/'+json.home+'/'+json.away+'','popUpWindow','height=768,width=1024,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');

				}
			});
		}
	});

});
</script>

<?php include 'footer.php'; ?>

</body>
</html>