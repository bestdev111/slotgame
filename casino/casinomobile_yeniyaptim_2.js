var casinobetsin = new Object();
var casibostema =' <div class="betgames-icon betslip-empty"></div><div><div class="bet-slip-empty-title">'+boskupon+'</div><div class="bet-slip-empty-info">'+oyunekleme+'</div></div><footer><div class="bet-slip-form" id="betslipalert"></div></footer>';
var casinobetnum = 0;
var casinotans = new Object();
var casrefreshtime = 10 * 1000;
var casinobetsgames = {};
var casinoactiveround = "";
var totalcasinobet = "0.00";
var totalcasinorate = "0.00";
var totalcasinowin = "0.00";
var casinonote = "0.00";
var casinosend=false;
var casinocserver="confirmcoupon";
var casinofilespath="../casino/casino.php";
var getuserpath="../ajax_players.php";

var klasPlayer;
var klasConfig;

var block = function(element) {
    if (typeof element === 'undefined')
        $.blockUI({ message: false });
    else {
        if (typeof element === 'object')
            element.block({ message: false });
        else
            $(element).block({ message: false });
    }
}
var unblock = function(element) {
    if (typeof element === 'undefined')
        $.unblockUI({ message: false });
    else {
        if (typeof element === 'object')
            element.unblock();
        else
            $(element).unblock();
    }
}

function financialnumber(x) {
  return Number.parseFloat(x).toFixed(2);
}
function changedealerplayer(x) {
         x = x.replace('player', 'Oyuncu');
         x = x.replace('dealer', 'Kurpiye');
  return x;
}



function arrayarama(aray,veri) {
		for (is = 0; is < aray.length; is++) {
		if(aray[is]==parseInt(veri)) {
		return "1";
		}else if(aray[is]==veri) {
		return "1";
		}
		}
return "0";
}






function getbethistory(cv)
{
$('#historylobby').hide();
if(cv)
{
var statu=cv;
}else{
var statu="";
}
var bethtmlslip="";
var dateslip = document.getElementById("datepicker").value;
$('.bethistorybody .bets-history-table-mobile').html('<img src="casino/ajax-loader.gif" style="margin-right: auto;margin-left: auto;display: block;margin-top: 14px;">');
$.ajax({
			url: ''+getuserpath+'?a=bethistory',
			type: 'POST',
			data: { date: dateslip,statu:statu},
			dataType: 'json',
			success: function(json) {
if (json.bets) {
$.each(json.bets,function(key, data) {
 for(var i in data.bets) {
bethtmlslip+='<div class="bet-item statucasino-'+data.statu+'" data-qa="area-bet-item-'+data.kid+'">';
bethtmlslip+='<div class="bet-main-details">';
bethtmlslip+='<div data-qa="icon-bet-item-game-'+data.bets[i].oyunkodu+'" class="bet-lottery betgames-icon game-'+data.bets[i].oyunkodu+'"></div>';
bethtmlslip+='<div class="bet-odd-name-results">';
bethtmlslip+='<div class="bet-odd-name" data-qa="area-bet-item-name">'+data.bets[i].tercih+'</div>';
 		var stmb="";
		var exwitdk="";
		if(data.bets[i].oyunkodu=="8")
		{
		if(data.bets[i].suits)
		{
		bethtmlslip+='<div class="game-result" style="margin-bottom: 4px;border-bottom: 1px solid #c7c7c7;padding-bottom: 5px;">';
		for (is = 0; is < data.bets[i].suits.length; is++) {
		bethtmlslip+='<span class="card '+data.bets[i].suits[is]+'" data-qa="area-card-clubs"><span class="'+data.bets[i].suits[is]+'"></span></span>';
		}
		bethtmlslip+='</div>';
		}
		if(data.bets[i].sonuc) {
		bethtmlslip+='<div class="game-result">';
		bethtmlslip+='<span class="results-player-cards '+(data.bets[i].sonuc.winner=='player' ? 'winner':'')+'"><span class="results-player-name">O:</span><span class="card '+data.bets[i].sonuc.card_player.suit+'" data-qa="area-card-'+data.bets[i].sonuc.card_player.suit+'">'+data.bets[i].sonuc.card_player.value+'<span class="'+data.bets[i].sonuc.card_player.suit+'"></span></span></span>';
		bethtmlslip+='<span class="results-player-cards '+(data.bets[i].sonuc.winner=='dealer' ? 'winner':'')+'"><span class="results-player-name">K:</span><span class="card '+data.bets[i].sonuc.card_dealer.suit+'" data-qa="area-card-clubs">'+data.bets[i].sonuc.card_dealer.value+'<span class="'+data.bets[i].sonuc.card_dealer.suit+'"></span></span></span>';
		bethtmlslip+='</div>';
		}
		}else if(data.bets[i].oyunkodu=="10")
		{
		if(data.bets[i].ex)
		{
		bethtmlslip+='<div class="game-result" style="margin-bottom: 4px;border-bottom: 1px solid #c7c7c7;padding-bottom: 5px;">';
		for (is = 0; is < data.bets[i].ex.length; is++) {
		bethtmlslip+='<span class="dice-item dice-'+data.bets[i].ex[is].number+' '+data.bets[i].ex[is].color+'" data-qa="area-game-item-'+data.bets[i].ex[is].number+'" style="margin-right: 5px;"></span>';
		}
		bethtmlslip+='</div>';
		}
		if(data.bets[i].sonuc) {
		bethtmlslip+='<div class="game-result">';
		bethtmlslip+='<span class="dice-item dice-'+data.bets[i].sonuc[0].number+' dice-red" data-qa="area-game-item-'+data.bets[i].sonuc[0].number+'" style="margin-right: 5px;"></span>';
		bethtmlslip+='<span class="dice-item dice-'+data.bets[i].sonuc[1].number+' dice-blue" data-qa="area-game-item-'+data.bets[i].sonuc[1].number+'" style="margin-right: 5px;"></span>';
		bethtmlslip+='</div>';
		}
		}else if(data.bets[i].oyunkodu=="7")
		{
		if(data.bets[i].ex)
		{
		bethtmlslip+='<div class="game-result" style="margin-bottom: 4px;border-bottom: 1px solid #c7c7c7;padding-bottom: 5px;">';
		for (is = 0; is < data.bets[i].ex.length; is++) {
		bethtmlslip+='<span class="wheel-item '+data.bets[i].ex[is].color+'" data-qa="area-game-item-'+data.bets[i].ex[is].number+'"><span class="wheel-circle">'+data.bets[i].ex[is].number+'</span></span>';
		}
		bethtmlslip+='</div>';
		}
		if(data.bets[i].sonuc) {
		bethtmlslip+='<div class="game-result">';
		bethtmlslip+='<span class="wheel-item '+data.bets[i].sonuc[0].color+'" data-qa="area-game-item-'+data.bets[i].sonuc[0].number+'"><span class="wheel-circle">'+data.bets[i].sonuc[0].number+'</span></span>';
		bethtmlslip+='</div>';
		}
		}else if(data.bets[i].oyunkodu=="3" || data.bets[i].oyunkodu=="9" || data.bets[i].oyunkodu=="1")
		{
		if(data.bets[i].ex)
		{
		bethtmlslip+='<div class="game-result" style="margin-bottom: 4px;border-bottom: 1px solid #c7c7c7;padding-bottom: 5px;">';
		for (is = 0; is < data.bets[i].ex.length; is++) {
		bethtmlslip+='<span class="ball-item '+data.bets[i].ex[is].color+'" data-qa="area-game-item-'+data.bets[i].ex[is].number+'" style="margin-right: 2px;">'+data.bets[i].ex[is].number+'</span>';
		}
		bethtmlslip+='</div>';
		}
		if(data.bets[i].sonuc) {
		bethtmlslip+='<div class="game-result">';
		for (ics = 0; ics < data.bets[i].sonuc.length; ics++) {
		bethtmlslip+='<span class="ball-item '+data.bets[i].sonuc[ics].color+'" data-qa="area-game-item-'+data.bets[i].sonuc[ics].number+'" style="margin-right: 2px;">'+data.bets[i].sonuc[ics].number+'</span>';
		}
		bethtmlslip+='</div>';
		}
		}else if(data.bets[i].oyunkodu=="6")
		{
		if(data.bets[i].sonuc) {
		bethtmlslip+='<div class="game-result">';
		bethtmlslip+='<span class="results-player-cards '+(data.bets[i].sonuc.results.winner=='player' ? 'winner':'')+'">';
		bethtmlslip+='<span class="results-player-name" style="color: #fff;background: #0078de;padding: 2px;border-radius: 4px;">O:</span>';
		for (ib = 0; ib < data.bets[i].sonuc.results.situation.player.length; ib++) {
		bethtmlslip+='<span class="card '+data.bets[i].sonuc.results.situation.player[ib].suit+'" data-qa="area-card-'+data.bets[i].sonuc.results.situation.player[ib].suit+'">'+data.bets[i].sonuc.results.situation.player[ib].value+'<span class="'+data.bets[i].sonuc.results.situation.player[ib].suit+'"></span></span>';
		}
		bethtmlslip+='</span>';
		bethtmlslip+='<span class="results-player-cards '+(data.bets[i].sonuc.results.winner=='banker' ? 'winner':'')+'">';
		bethtmlslip+='<span class="results-player-name"  style="color: #fff;background: #0078de;padding: 2px;border-radius: 4px;">K:</span>';
		for (ibp = 0; ibp < data.bets[i].sonuc.results.situation.banker.length; ibp++) {
		bethtmlslip+='<span class="card '+data.bets[i].sonuc.results.situation.banker[ibp].suit+'" data-qa="area-card-'+data.bets[i].sonuc.results.situation.banker[ibp].suit+'">'+data.bets[i].sonuc.results.situation.banker[ibp].value+'<span class="'+data.bets[i].sonuc.results.situation.banker[ibp].suit+'"></span></span>';
		}
		bethtmlslip+='</span>';
		var sbht="";
		for (sdb = 0; sdb < data.bets[i].sonuc.results.side_bets_names.length; sdb++) {
		sbht+= data.bets[i].sonuc.results.side_bets_names[sdb]+',';
		}
		bethtmlslip+='<span class="side-bets">'+sbht.substring(0, sbht.length - 1)+'</span>';
		bethtmlslip+='</div>';
		}
		}else if(data.bets[i].oyunkodu=="5")
		{
		if(data.bets[i].sonuc) {
		bethtmlslip+='<div class="game-result">';
		$.each(data.bets[i].sonuc.situation.players,function(pokerkey, pokerdata) {
		bethtmlslip+='<span class="results-player-cards '+(arrayarama(data.bets[i].sonuc.results.winners,pokerkey)=="1" ? 'winner':'')+'" style="margin: .2em;">';
		bethtmlslip+='<span class="results-player-name" style="color: #fff;background: #0078de;padding: 2px;border-radius: 4px;">'+pokerkey+':</span>';
		for (ibc = 0; ibc < pokerdata.length; ibc++) {
		bethtmlslip+='<span class="card '+pokerdata[ibc].suit+'" data-qa="area-card-'+pokerdata[ibc].suit+'">'+pokerdata[ibc].value+'<span class="'+pokerdata[ibc].suit+'"></span></span>';
		}
		bethtmlslip+='</span>';
		});
		bethtmlslip+='<span class="results-player-cards" style="margin: .2em;">';
		bethtmlslip+='<span class="results-player-name" style="color: #fff;background: #0078de;padding: 2px;border-radius: 4px;">K:</span>';
		for (ibc = 0; ibc < data.bets[i].sonuc.situation.table_cards.length; ibc++) {
		bethtmlslip+='<span class="card '+data.bets[i].sonuc.situation.table_cards[ibc].suit+'" data-qa="area-card-'+data.bets[i].sonuc.situation.table_cards[ibc].suit+'">'+data.bets[i].sonuc.situation.table_cards[ibc].value+'<span class="'+data.bets[i].sonuc.situation.table_cards[ibc].suit+'"></span></span>';
		}
		bethtmlslip+='</span>';
		bethtmlslip+='<span class="side-bets">'+data.bets[i].sonuc.results.combination_name+'</span>';
		bethtmlslip+='</div>';
		}
		}else if(data.bets[i].oyunkodu=="12")
		{
		if(data.bets[i].sonuc) {
		bethtmlslip+='<div class="game-result">';
		bethtmlslip+='<span class="results-player-cards '+(arrayarama(data.bets[i].sonuc.results.winners,'player')=="1" ? 'winner':'')+'" style="margin: .2em;">';
		bethtmlslip+='<span class="results-player-name" style="color: #fff;background: #0078de;padding: 2px;border-radius: 4px;">O:</span>';
		for (ibc = 0; ibc < data.bets[i].sonuc.situation.players.player.length; ibc++) {
		bethtmlslip+='<span class="card '+data.bets[i].sonuc.situation.players.player[ibc].suit+'" data-qa="area-card-'+data.bets[i].sonuc.situation.players.player[ibc].suit+'">'+data.bets[i].sonuc.situation.players.player[ibc].value+'<span class="'+data.bets[i].sonuc.situation.players.player[ibc].suit+'"></span></span>';
		}
		bethtmlslip+='</span>';
		bethtmlslip+='<span class="results-player-cards '+(arrayarama(data.bets[i].sonuc.results.winners,'dealer')=="1" ? 'winner':'')+'" style="margin: .2em;">';
		bethtmlslip+='<span class="results-player-name" style="color: #fff;background: #0078de;padding: 2px;border-radius: 4px;">K:</span>';
		for (ibc = 0; ibc < data.bets[i].sonuc.situation.players.dealer.length; ibc++) {
		bethtmlslip+='<span class="card '+data.bets[i].sonuc.situation.players.dealer[ibc].suit+'" data-qa="area-card-'+data.bets[i].sonuc.situation.players.dealer[ibc].suit+'">'+data.bets[i].sonuc.situation.players.dealer[ibc].value+'<span class="'+data.bets[i].sonuc.situation.players.dealer[ibc].suit+'"></span></span>';
		}
		bethtmlslip+='</span>';
		bethtmlslip+='<span class="results-player-cards '+(arrayarama(data.bets[i].sonuc.results.winners,'split')=="1" ? 'winner':'')+'" style="margin: .2em;clear: both;display: block;float: left;width: 100%;">';
		bethtmlslip+='<span class="results-player-name" style="color: #fff;background: #0078de;padding: 2px;border-radius: 4px;">M:</span>';
		for (ibc = 0; ibc < data.bets[i].sonuc.situation.table_cards.length; ibc++) {
		bethtmlslip+='<span class="card '+data.bets[i].sonuc.situation.table_cards[ibc].suit+'" data-qa="area-card-'+data.bets[i].sonuc.situation.table_cards[ibc].suit+'">'+data.bets[i].sonuc.situation.table_cards[ibc].value+'<span class="'+data.bets[i].sonuc.situation.table_cards[ibc].suit+'"></span></span>';
		}
		bethtmlslip+='</span>';
		bethtmlslip+='<span class="side-bets">'+data.bets[i].sonuc.results.combination_name+'</span>';
		bethtmlslip+='</div>';
		}
		}
bethtmlslip+='</div>';
bethtmlslip+='<div class="bet-odd-value" data-qa="area-bet-item-odd-value">'+financialnumber(data.bets[i].oran)+'</div>';
bethtmlslip+='</div>';
bethtmlslip+='<div class="bet-secondary-details">';
bethtmlslip+='<div class="bet-time">'+data.bets[i].bttimes+'</div>';
bethtmlslip+='<div class="bet-run-id" data-qa="area-bet-item-draw-code"><div>'+data.kid+'</div>  <div>'+data.bets[i].bahiskodu+'</div></div>';
bethtmlslip+='<div class="bet-amount">';
bethtmlslip+='<div class="bet-amount-label">Miktar</div>';
bethtmlslip+='<div class="bet-amount-value " '+(data.statu==2 ? 'style="color:red;"':'')+' data-qa="area-bet-item-amount">'+data.amount+'</div>';
bethtmlslip+='</div>';
bethtmlslip+='<div class="bet-amount-won">';
bethtmlslip+='<div class="bet-amount-label">Kazanç</div>';
bethtmlslip+='<div class="bet-amount-value bet-status-lost '+(data.statu==1 ? 'won':'')+'" data-qa="text-bet-item-amount-won">'+(data.statu==1 || data.statu==4 ? data.win:'0.00')+'</div>';
bethtmlslip+='</div>';
bethtmlslip+='</div>';
bethtmlslip+='</div>';
}
});
$('.bethistorybody .bets-history-table-mobile').html(bethtmlslip);
}else{
$('.bethistorybody .bets-history-table-mobile').html('<div class="message empty-reports-message" data-qa="container-empty-report"><span class="betgames-icon calendar-empty"></span><p class="empty-reports-title">Bu tarih için bahsiniz yok</p><p>Tarihi değiştirin veya şimdi bahis yapın.</p></div>');
}
}
});











_casino_refresh_timeout="";
_active_game=0;


$('main').html('');
$('.bethistory,.bethistorybody').show();







$('.tabs-bar-scrollable .active').removeClass('active');
}




function casino_second($elem)
{
    $('#content .lminute, .bet-timeleft').each(function() {
        $elem = $(this);
        var clock = $elem.html();
        if (clock.indexOf(":") < 1)
            return;
        var times = clock.split(":");
        var minute = Math.ceil(times[0]);
        var second = Math.ceil(times[1]);
		if (second == 1 && minute == 0) {
			$elem.addClass('text-danger').html('CANLI');
			if ($elem.hasClass('bet-timeleft'))
				update_coupon_interval();
			return;
		} else {
			if ($elem.hasClass('bet-timeleft'))
				clearTimeout(_update_coupon_timeout);
		}
        if (second == 0) {
            second = 59;
            minute = minute-1;
        } else {
            second = second-1;
        }
        if (second < 10)
            second = '0'+second;
        if (minute < 10)
            minute = '0'+minute;
	if(second) {
        $elem.html(minute+':'+second);
	}
    });
}
function get_casino_bets() {
	$('#casino-bets').html('');
	/* 3 oyun için yayın getir, diğerleri için iframe */
	$('.game-odds').hide();
	$('.nest5-wrapper').show();
	if ([5,6,8].indexOf(_active_game) === -1) {
		$('.casino-video').hide();
		$('.casino-holder > iframe').remove();
		$('.casino-holder').prepend('<iframe id="casinoholderframe" style="height: calc(100vw);" src="https://href.li/?https://webiframe.betgames.tv/#/auth?apiUrl=https%3A%2F%2Fgame3.betgames.tv&partnerCode=olybet&partnerToken=-&language=en&timezone=3&pageName='+_active_game+'" allowtransparency="true" frameborder="0" scrolling="no" onload="$(\'.nest5-wrapper\').hide(); $(this).css(\'opacity\', 1); casino_bet_ajax();" style="opacity: 0;"></iframe>');
		$('#casino-video').html('');
	} else {
		$('.casino-video').show();
		$('.casino-holder > iframe').remove();
		/* yayını getir */
		$('#casino-video').html('');
		$('#casino-video, .game-odds, .game-playing').hide();
		$.ajax({
			url: ''+casinofilespath+'?action=casino_stream&game_id=' + _active_game,
			dataType: 'json',
			success: function(json) {
				_video = document.getElementById('casino-video');
				casino_bet_ajax();
				if (typeof json.stream_name === 'object') {

					var strim = json.stream_name.stream[3];
					$.getJSON('https://bintu.nanocosmos.de/stream/' + strim.id, function(result) {
						klasConfig =  {
							source: {
								h5live: {
	                server: {
	                    websocket: "wss://bintu-h5live-secure.nanocosmos.de:443/h5live/authstream/stream.mp4",
	                    progressive: "https://bintu-h5live-secure.nanocosmos.de:443/h5live/authhttp/stream.mp4",
	                    hls: "https://bintu-h5live-secure.nanocosmos.de:443/h5live/authhttp/playlist.m3u8"
	                },
	                rtmp: result.playout.rtmp[0],
	                security: strim.security,
	                params: {}
								}
							},
							playback: {
								autoplay: true,
								automute: false,
								muted: false,
								flashplayer: "//demo.nanocosmos.de/nanoplayer/nano.player.swf"
							},
							style: {
								displayMutedAutoplay: true,
								controls: false
							}
						};
						var $html = '<div id="playerDiv" style="width: 100%;height: 420px;position: relative !important; top: 0; left: 0; right: 0; bottom: 0; -webkit-animation-fill-mode: both; animation-fill-mode: both;"></div>';
						$('#casino-video').html($html);

						klasPlayer = new NanoPlayer('playerDiv');
						klasPlayer.setup(klasConfig).then(function (klasConfig) {
							console.log('setup ok with config: ' + JSON.stringify(klasConfig));
						}, function (error) {
							console.log(error);
						});
					});

					return;
				}
				//console.log(json.stream_name);
			        player = new Clappr.Player({
			        source: json.stream_name,
			        parentId: "#casino-video",
			        autoPlay: true,
			        width: '100%',
			        height: '100%',
			        playback: {
			          playInline: true
			        },
			        actualLiveTime: false,
			        strings: {
			          'tr-TR': {
			            'live': 'CANLI',
			            'back_to_live': 'CANLI YAYINA GERİ DÖN',
			            'playback_not_supported': 'Tarayıcınız bu ortamı oynatamıyor. Lütfen farklı bir tarayıcı ile tekrar deneyin'
			          }
			        },
			        language: 'tr-TR',
			        position: 'top-left',
			        events: {
				    	onError: function(e) {
				    		errorFunc();
				    	},
						onReady: function() {

					}
			        }
			      });


			}
		});
	}
}




function replaceAll (find, replace,str,find2s,replace2s) {
var donen="";
    donen = str.replace(new RegExp(find.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&'), 'g'), replace);
	if(find2s && replace2s)
	{
    donen = donen.replace(new RegExp(find2s.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&'), 'g'), replace2s);
	}
	return donen;
};

function changetab(tabid)
{
if(tabid==0)
{
$('.casino-groups .casino-bet-group').show();
}else{
$('.casino-groups .casino-bet-group').hide();
$('#tabgroup_'+tabid).show();
}
$('.tabs-bar-scrollable .active').removeClass('active');
$('#tab_'+tabid).addClass('active');
_active_tab=tabid;
}
function casino_bet_ajax() {
var extraklubs="";
	$.ajax({
		url: ''+casinofilespath+'?action=casino_bets&game_id=' + _active_game,
		dataType: 'json',
		success: function(json) {
			$holder = $('#casino-bets');
			  $('#casino-video, .game-playing').show();
			  $('#game-odds-'+_active_game).stop().fadeIn();
			/* run ID */
			$('.game-run-id').html('#'+json.game.run_id);

			/* alt bahisler var mı? */
			if (json.game.items.length > 0) {
				$alt = '<div class="casino-bet-items"><div class="lottery-items">';
				$.each(json.game.items, function(key, data) {
					if(data.color=="dice")
					{
					$alt = $alt + '<span role="presentation" data-type="dice" data-qa="button-game-item-select-'+data.number+'" style="" onclick="addnumberbet(this);" data-odid="0" class="game-item-select" data-color="dice-red" data-id="'+data.id+'" data-num="'+data.number+'"><span class="game-item"><span class="dice-item dice-'+data.number+' dice-red" data-qa="area-game-item-'+data.number+'"></span></span></span>';
					}else{
					$alt = $alt + '<div onclick="addnumberbet(this);" data-odid="0" class="lottery-item li-'+data.color+'" data-color="'+data.color+'" data-id="'+data.id+'" data-num="'+data.number+'"><span>'+data.number+'</span></div>';
					}
				});
				$alt = $alt+'</div></div>';
			}
			/* bahis gruplarını döndür */
			$groups = '<div class="odds-tabs game-'+_active_game+'" data-qa="area-odds-tabs"><div class="casino-groups" data-game="'+_active_game+'">';
			$tabs = '<div class="tabs tabs-default"><div class="tabs-bar-arrow left"  onclick="scrolltopnav(\'right\',\'casino-tab\',\'scrooloddtabs\');"><span class="betgames-icon chevron-left"></span></div><div class="tabs-bar-arrow right" onclick="scrolltopnav(\'left\',\'casino-tab\',\'scrooloddtabs\');"><span class="betgames-icon chevron-right"></span></div><div class="tabs-bar-scrollable right-arrow-visible" id="scrooloddtabs" style="overflow: auto;margin-left: 26px;">'
			$tabsclose = '</div></div>'
			$.each(json.game.bets,function(key, data) {
			  if(_active_tab<1)
			  {
			  _active_tab=data.id;
			  }
				$html = '<div class="casino-tab tabs-bar-item '+(_active_tab == data.id ? 'active' : '')+'" data-id="'+data.id+'" id="tab_'+data.id+'" onclick="changetab('+data.id+');" ><span>'+_text.oddGroups_dil[data.id]+'</span></div>';
				$tabs = $tabs + $html;
				/* bahis grubunu ayarla */
				$html = '<div class="casino-bet-group odds-list" id="tabgroup_'+data.id+'" data-id="'+data.id+'" '+(_active_tab!=data.id ? 'style="display:none;"':'')+'>';
				$.each(data.odds, function(key, odds) {
					if (odds.itemsCount > 0) {
						$selector = '<div class="lottery-selector game-items-selected">';
						for($i = 1; $i<=odds.itemsCount; $i++) {
							if(_active_game==10)
							{
							$selector = $selector + '<div class="dice-item game-item" data-i="'+$i+'"></div>';
							}else{
							$selector = $selector + '<div class="lottery-item game-item" data-i="'+$i+'"></div>';
							}

						}
						$selector = $selector + '<div class="lottery-confirm odd-item-dropdown-actions"><button type="button" class="odd-item-dropdown-confirm btn btn-sm btn-dark" onclick="onfinishbalselect('+odds.id+');" data-odid="'+odds.id+'" disabled>Onayla</button> <a class="button-odd-item-dropdown-cancel" href="javascript:clearaddnumberbet();">Vazgeç</a></div>';
						$selector = $selector + '</div>';
					} else
						$selector = '';

					if (json.game.items.length > 0) {
						if (odds.id == 595) {
							$alt_print = replaceAll('dice-red','dice-blue',$alt);
						}else{
							$alt_print = $alt;
						}
					}
					extraklubs="";
					if (odds.suits.length > 0) {
					$.each(odds.suits, function(suits, sts) {
					extraklubs+='<span class="card '+sts+' with-background" data-qa="area-card-'+sts+'"><span class="'+sts+'"></span></span>';
					});
					}
					$html = $html + '<div data-itemcount="'+odds.itemsCount+'" id="thegame_'+odds.id+'" class="casino-bet odd-item '+(odds.itemsCount > 0 ? 'openable' : '')+'" data-odds="'+odds.value.toFixed(2)+'" data-gameid="'+_active_game+'" data-id="'+odds.id+'" data-grupid="'+data.id+'" data-roundid="'+json.game.run_id+'" '+(odds.itemsCount > 0 ? '' : 'onclick="casinoaddselect(this);"')+' ><div class="casino-bet-top odd-item-info" '+(odds.itemsCount > 0 ? 'onclick="casinoaddopenwon('+odds.id+');"' : '')+' style="display: flex;"><span class="casino-bet-title odd-name"  style="padding-left: 6px;"><span class="odd-title" data-qa="text-odd-item-title">'+_text.odds_dil[odds.id]+''+extraklubs+'</span></span>'
					+'<span class="casino-bet-value odd-value">'+casinoorktder(_active_game,odds.value).toFixed(2)+'</span>'
					+(odds.itemsCount > 0 ? '<span class="casino-bet-open"><i class="betgames-icon chevron-down"></i></span>' : '')
					+'</div><div class="clear"></div><div class="casino-bet-alt odd-item-dropdown" id="openid_'+odds.id+'">'
					+(odds.itemsCount > 0 ? $alt_print.replace('gameids', 'gamenumber_'+odds.id) : '')
					+(odds.id == 596 ? replaceAll('dice-red','dice-blue',$alt_print,'casino-bet-items','casino-bet-items blue-dices') : '')
					+ $selector
					+'</div></div>';

				});
				$html = $html + '</div>';
				$groups = $groups + $html;
			});
			$tabs = $tabs + '</div></div>';
			$groups = $groups + '</div>';
			/* yazdır */
			$('#casino-bets').html($tabs + $tabsclose + $groups);
			check_odds_active(json.game.bets);
			unblock($('#casino-bets'));
		}
	});
}



function casinoaddopenwon(er)
{
var acikmidiv = $('#openid_'+er).is(":visible"); 
if(acikmidiv)
{
$('#openid_'+er).toggle();
return;
}
$('.casino-bet-group .casino-bet-alt').hide();
$('#openid_'+er).toggle();
}


function casinoorktder(gameid,rate)
{
	 var gelenseviye = parseFloat(casinogamesseviye[gameid] ? casinogamesseviye[gameid]:'0');
	 var gelenmaxod = parseFloat(casinogamesmaxod[gameid] ? casinogamesmaxod[gameid]:'0');
	 var odd = parseFloat(rate);
         if (rate < 10) {
             fl = Math.floor(rate);
             degisim = parseFloat(fl * gelenseviye * 0.05);
         } else if (rate >= 10 && rate <= 100) {
             fl = Math.floor(rate / 10);
             degisim = parseFloat(fl * gelenseviye * 1);
         } else {
             fl = Math.floor(rate / 100);
             degisim = parseFloat(fl * gelenseviye * 5);
         }
         rate = parseFloat(rate - degisim);
	 if(rate>gelenmaxod && gelenmaxod>0)
	 {
         rate = gelenmaxod;
	 }
	 if(rate<1)
	 {
         return odd;
	 }else{
         return rate;
	 }
}



var _casino_refresh_timeout = false;
function check_odds_active(odds,roundid) {
	/* oranları yenile */
casinobetsgames = odds;
casinoactiveround = roundid;
	$.each(odds, function(key, bets) {
		$.each(bets.odds, function(odd_key, odd) {
			$betbolcas = $('.casino-bet[data-id="'+odd.id+'"]');
			$inVideo = $('.game-odds .screen-odd-item[data-qa="'+odd.id+'"]');
			if (odd.status != 'active') {
				if(odd.status=="won")
				{
				$betbolcas.find('.casino-bet-value').html('<div data-qa="text-odd-status" class="odd-status odd-item-status won">KAZANDI</div>');
				}else if(odd.status=="lost"){
				$betbolcas.find('.casino-bet-value').html('<div data-qa="text-odd-status" class="odd-status odd-item-status lost">KAYBETTİ</div>');
				}else{
				$betbolcas.find('.casino-bet-value').html('<i class="betgames-icon lock"></i>');
				}
				$inVideo.find('.odd-value').html('<i class="betgames-icon lock"></i>');
				$inVideo.addClass('disabled');
				$betbolcas.attr('data-odds', '');
				$betbolcas.attr('data-roundid', roundid);
				if ($betbolcas.find('.blockUI').length == 0)
				block($betbolcas.addClass('passive'));
			} else {
				$betbolcas.find('.casino-bet-value').html(casinoorktder(_active_game,odd.value).toFixed(2));
				$betbolcas.attr('data-roundid', roundid);
				$betbolcas.attr('data-odds', casinoorktder(_active_game,odd.value).toFixed(2));
				$inVideo.removeClass('disabled');
				$inVideo.find('.odd-value').html(casinoorktder(_active_game,odd.value).toFixed(2));
				if ($betbolcas.find('.blockUI').length > 0)
				unblock($betbolcas.removeClass('passive'));
			}
		});
	});

}
function casinoaddselect(e,extras=false) {
if (casinosend) {
return;
}
var gameid= e.getAttribute("data-gameid");
var roundid= e.getAttribute("data-roundid");
var oddid= e.getAttribute("data-id");
var grupid= e.getAttribute("data-grupid");
var odd= e.getAttribute("data-odds");
if(!odd)
{
return;
}
casinobetsin=new Object();
casinobetsin['round']=roundid;
casinobetsin['odid']=oddid;
casinobetsin['grupid']=grupid;
casinobetsin['gameid']=gameid;
casinobetsin['odds']=odd;
casinobetsin['timeleftgame']="0";
casinobetsin['odname']=_text.odds[oddid];
casinobetsin['odname2']=_text.odds_dil[oddid];
casinobetsin['gname']=_text.gameNames[gameid];
if(extras)
{
casinobetsin['extraball']=extras;
}
$('.bets-panel .bet-slip').removeClass('fade-out').addClass('fade-in');
$("html, body").animate({ scrollTop: 0 }, "slow");
casinobetnum=1;
casinocouponloader();
UpdateOddscasino();
}

function closebetslip()
{
$('.bets-panel .bet-slip').removeClass('fade-in').addClass('fade-out');
}








function casino_refresh() {
	/* casinoyu yenile */
	if(_active_game<1)
	{
	return;
	}
	$.ajax({
		url: ''+casinofilespath+'?action=casino_refresh&game_id='+_active_game,
		dataType: 'json',
		success: function(json) {
			/* listeyi yenile */
			$.each(json.list, function(key, data) {
			if(data.timeLeft)
			{
			$('#casinodiv_'+data.id).html(data.timeLeft);
			}else{
			$('#casinodiv_'+data.id).html('<i style="color: red;font-size: 9px;">'+canliyazisi+'</i>');
			}
				$tab = $('.casinolist a[data-id="'+data.id+'"]');

				/* sekme canlı gösteriyor, ama süre var */
				if ($tab.find('b').hasClass('text-danger') && data.secondsLeft > 0 && [5,6,8].indexOf(data.id) === -1) {
					$tab.find('b').html(data.timeLeft).removeClass('text-danger');
				}

			});
			/* oranları yenile */
			check_odds_active(json.game.bets,json.game.run_id);
			$('.game-run-id').html('#'+json.game.run_id);
			_casino_refresh_timeout = setTimeout(function() { casino_refresh(); }, 2000);

		}
	});

}


function openbetcasinoslip() {
if($('.bets-panel .bet-slip').hasClass('fade-in'))
{
$('.bets-panel .bet-slip').removeClass('fade-in').addClass('fade-out');
}else{
$('.bets-panel .bet-slip').removeClass('fade-out').addClass('fade-in');
$("html, body").animate({ scrollTop: 0 }, "slow");
}
}

function openbetcasinoslipauto() {
if($('.bets-panel .bet-slip').hasClass('fade-in'))
{
$('.bets-panel .bet-slip').removeClass('fade-in').addClass('fade-out');
}
}





function casinocouponloader()
{
$htmlcasino = [];
if(casinobetnum>0)
{

$(".place-bet-button").removeClass('disabled');
$(".betting-slip-content").removeClass('bet-slip-empty');
		$htmlcasino.push('<div class="selected-odds-list" data-qa="area-bet-slip-selected-odds-list">');
		$htmlcasino.push('<div class="selected-odd" data-qa="area-selected-odd-528">');
		$htmlcasino.push('<div class="selected-odd-header"><span class="selected-odd-game-info">');
		$htmlcasino.push('<strong data-qa="text-selected-odd-game-name">'+casinobetsin.gname+'</strong>');
		$htmlcasino.push('<span class="selected-odd-timer" data-qa="area-selected-odd-timer">');
		$htmlcasino.push('<span class="time-string  bet-timeleft" data-qa="text-time-string">'+(casinobetsin.timeleftgame!=0 && casinobetsin.timeleftgame!="" ? casinobetsin.timeleftgame:'CANLI')+'</span></span></span>');
		$htmlcasino.push('<span data-qa="button-clear-selected-odd" role="presentation" class="selected-odd-clear betgames-icon closed" onclick="celarcasinocoupon();"></span></div>');
		$htmlcasino.push('<div class="selected-odd-info"><span data-qa="text-selected-odd-name">'+casinobetsin.odname2+'<span class="cards-group"></span></span>');
		$htmlcasino.push('<div class="selected-odd-value"><strong class="" data-qa="text-selected-odd-value">'+(casinobetsin.image ? casinobetsin.image:'')+' '+financial(casinobetsin.odds)+'</strong></div>');
		$htmlcasino.push('</div>');
		if(casinobetsin.extraball)
		{
                $htmlcasino.push('<div class="lottery-items selected-odd-items">');
	        $.each(casinobetsin.extraball, function(key, data) {
		if(casinobetsin.gameid=="10")
		{
                $htmlcasino.push('<div class="dice-item dice-'+data.number+' '+data.color+'" data-num="'+data.number+'"></div>');
		}else if(casinobetsin.gameid=="7")
		{
                $htmlcasino.push('<div class="lottery-item li-'+data.color+'" style="background: '+data.color+' !important;border: none !important;border-radius: 0;" data-num="'+data.number+'"><span style="background: #fff;width: 24px;height: 24px;border-radius: 24px;color: #000;display: flex;align-items: center;justify-content: center;">'+data.number+'</span></div>');
		}else{
                $htmlcasino.push('<div class="lottery-item li-'+data.color+'" data-num="'+data.number+'">'+data.number+'</div>');
		}
		});
                $htmlcasino.push('</div>');
		}
		$htmlcasino.push('</div>');
		$htmlcasino.push('</div>');
		$htmlcasino.push('<footer>');
		if(casinobetsin.oldround && casinobetsin.round!=casinobetsin.oldround)
		{
                $htmlcasino.push('<div class="mbs-error"><div class="selected-odd-message" data-qa="text-selected-odd-message">'+casinobetsin.oldround+' '+seanskapanmistir+' - '+casinobetsin.round+'</div>');
		}
		$htmlcasino.push('<div class="bet-slip-form" id="betslipalert"></div>');
		$htmlcasino.push('<div class="bet-slip-form">');
		$htmlcasino.push('<div class="bet-slip-limits"><span>'+kuponnotu+'</span></div>');
		$htmlcasino.push('<div class="bet-slip-input-container"><input type="text" name="title" class="bet-slip-input" id="kuponisim" value=""></div>');
		$htmlcasino.push('<div class="bet-slip-limits"><span>'+kuponmiktar+'</span></div>');
		$htmlcasino.push('<div class="bet-slip-input-container"><input data-qa="input-bet-slip-amount" id="amount" value="'+totalcasinobet+'" onfocus="this.value=\'\'" onblur="totalcasinobet=String(this.value);casinoSetTotalSum();" type="text" inputmode="decimal" class="bet-slip-input" placeholder="0.00" maxlength="22" value="0.00"></div>');
		$htmlcasino.push('<div class="bet-slip-amounts">');
		$htmlcasino.push('<button data-qa="button-bet-slip-amount-1" onclick="changetotalbets(1);" class="bet-slip-amount-button" type="button">+1</button>');
		$htmlcasino.push('<button data-qa="button-bet-slip-amount-3" onclick="changetotalbets(3);" class="bet-slip-amount-button" type="button">+3</button>');
		$htmlcasino.push('<button data-qa="button-bet-slip-amount-5" onclick="changetotalbets(5);" class="bet-slip-amount-button" type="button">+5</button>');
		$htmlcasino.push('<button data-qa="button-bet-slip-amount-10" onclick="changetotalbets(10);" class="bet-slip-amount-button" type="button">+10</button>');
		$htmlcasino.push('<button data-qa="button-bet-slip-amount-50" onclick="changetotalbets(50);" class="bet-slip-amount-button" type="button">+50</button>');
		$htmlcasino.push('<button data-qa="button-bet-slip-amount-100" onclick="changetotalbets(100);" class="bet-slip-amount-button" type="button">+100</button>');
		$htmlcasino.push('<button data-qa="button-bet-slip-amount-clear"  onclick="changetotalbets(0);" class="bet-slip-amount-button clear" type="button">C</button></div>');
		$htmlcasino.push('</div>');
		$htmlcasino.push('<div class="_2qtcGvjc33NQUNf6zumhCo"><span data-qa="label-possible-win">'+kuponolasi+'</span>');
		$htmlcasino.push('<span data-qa="text-bet-slip-possible-win" id="max-gain">'+totalcasinowin+'</span></div><button type="button" data-qa="button-place-bet"  onclick="sendcasinocoupon();" id="bahisionayla" class="place-bet-button">'+kupononaylama+'</button>');
		$htmlcasino.push('</footer>');

     $('.betting-slip-content').html($htmlcasino.join(''));
     $('.havebetslip').html('<div class="notification-dot" data-qa="area-notification-dot"></div>');
	casinoSetTotalSum();
}else{
$('.havebetslip').html('');
$(".betting-slip-content").addClass('bet-slip-empty');
$(".place-bet-button").removeClass('disabled');
$('.betting-slip-content').html(casibostema);
}
}




function sendcasinocoupon(){
$('#bahisionayla').html('<font style="animation: hello 1.5s ease-in-out infinite;font-weight:bold">'+onaylaniyorkupon+'...</font>');
if (casinosend) {
return;
}

if (casinobetsin.odds == '0.00' || casinobetsin.odds == '1.00') {
return;
}

if (!casinobetnum) {
casPopupError(''+oyunbulunmuyor+'');
return;
}

if (max_amount<totalcasinobet) {
casPopupError(''+maxbahis+' '+max_amount+' '+yapabilirsiniz+'');
return;
}

if (min_amount>totalcasinobet) {
casPopupError(''+minbahis+' '+min_amount+' '+yapabilirsiniz+'');
return;
}

var rand = Math.random();
var isim = $("#kuponisim").val();
var tutar = $("#amount").val();
casinosend=true;
block($('#coupon'));
$.ajax({
url: "../casino/casino_ajax.php?a=kuponok&rand="+rand+"",
type: "POST",
data: "tutar="+tutar+"&kuponadi="+isim+"",
success: function(data) {
if(data=="403") {
casPopupError(''+hatalar1+'');
setTimeout(function(){ casinocouponloader(); }, 5000);
unblock($('#coupon'));
casinosend = false;
} else if(data=="404") {
casPopupError(''+hatalar2+'');
setTimeout(function(){ casinocouponloader(); }, 5000);
unblock($('#coupon'));
casinosend = false;
} else if(data=="410") {
casPopupError(''+hatalar3+'');
setTimeout(function(){ casinocouponloader(); }, 5000);
unblock($('#coupon'));
casinosend = false;
} else if(data=="411") {
casPopupError(''+hatalar4+'');
setTimeout(function(){ casinocouponloader(); }, 5000);
unblock($('#coupon'));
casinosend = false;
} else if(data=="412") {
casPopupError(''+hatalar5+'');
setTimeout(function(){ casinocouponloader(); }, 5000);
unblock($('#coupon'));
casinosend = false;
} else if(data=="413") {
casPopupError(''+hatalar6+'');
setTimeout(function(){ casinocouponloader(); }, 5000);
unblock($('#coupon'));
casinosend = false;
} else if(data=="414") {
casPopupError(''+hatalar7+'');
setTimeout(function(){ casinocouponloader(); }, 5000);
unblock($('#coupon'));
casinosend = false;
} else if(data=="415") {
casPopupError(''+hatalar8+'');
setTimeout(function(){ casinocouponloader(); }, 5000);
unblock($('#coupon'));
casinosend = false;
} else if(data=="416") {
casPopupError(''+hatalar9+'');
setTimeout(function(){ casinocouponloader(); }, 5000);
unblock($('#coupon'));
casinosend = false;
} else if(data=="417") {
casPopupError(''+hatalar10+'');
setTimeout(function(){ casinocouponloader(); }, 5000);
unblock($('#coupon'));
casinosend = false;
} else if(data=="418") {
casPopupError(''+hatalar11+'');
setTimeout(function(){ casinocouponloader(); }, 5000);
unblock($('#coupon'));
casinosend = false;
} else if(data=="420") {
casPopupError(''+hatalar12+'');
setTimeout(function(){ casinocouponloader(); }, 5000);
unblock($('#coupon'));
casinosend = false;
} else if(data=="421") {
casPopupError(''+hatalar13+'');
setTimeout(function(){ casinocouponloader(); }, 5000);
unblock($('#coupon'));
casinosend = false;
} else if(data=="422") {
casPopupError(''+hatalar14+'');
setTimeout(function(){ casinocouponloader(); }, 5000);
unblock($('#coupon'));
casinosend = false;
} else if(data=="423") {
casPopupError(''+hatalar15+'');
setTimeout(function(){ casinocouponloader(); }, 5000);
unblock($('#coupon'));
casinosend = false;
} else if(data=="424") {
casPopupError(''+hatalar16+'');
setTimeout(function(){ casinocouponloader(); }, 5000);
unblock($('#coupon'));
casinosend = false;
} else if(data=="425") {
casPopupError(''+hatalar17+'');
setTimeout(function(){ casinocouponloader(); }, 5000);
unblock($('#coupon'));
casinosend = false;
} else if(data=="426") {
casPopupError(''+hatalar18+'');
setTimeout(function(){ casinocouponloader(); }, 5000);
unblock($('#coupon'));
casinosend = false;
} else if(data=="427") {
casPopupError(''+hatalar19+'');
setTimeout(function(){ casinocouponloader(); }, 5000);
unblock($('#coupon'));
casinosend = false;
} else if(data=="428") {
casPopupError(''+hatalar20+'');
setTimeout(function(){ casinocouponloader(); }, 5000);
unblock($('#coupon'));
casinosend = false;
} else if(data=="430") {
casPopupError(''+hatalar21+'');
setTimeout(function(){ casinocouponloader(); }, 5000);
unblock($('#coupon'));
casinosend = false;
} else if(data=="988") {
casPopupError(''+hatalar22+'');
setTimeout(function(){ casinocouponloader(); }, 5000);
unblock($('#coupon'));
casinosend = false;
} else if(data!="404") {
celarcasinocoupon();
$('.betting-slip-content').html('<div class="notification-container" style="opacity: 1;width: 93%;"><div class="notification notification-success"><span class="notification-icon betgames-icon check"></span><span class="notification-message" data-qa="text-bet-slip-notification">'+kabuledildi+'</span></div></div>');
setTimeout(function(){ casinocouponloader(); }, 5000);
unblock($('#coupon'));
casinosend = false;
_lottery_items = '';
} 
}
});

}








function casPopupError (error) {
         $('#betslipalert').html('<div class="mbs-error"><div class="selected-odd-message" data-qa="text-selected-odd-message" style="color:red;">'+error+'</div>').fadeOut(20000);
}



function changetotalbets(x)
{
if(x==0)
{
totalcasinobet=0;
}else{
if(totalcasinobet>0)
{
totalcasinobet=totalcasinobet;
}else{
totalcasinobet=0;
}
totalcasinobet = parseFloat(totalcasinobet+x);
}
casinoSetTotalSum();
}


function casinoSetTotalSum()
{
totalcasinowin = parseFloat(totalcasinobet * casinobetsin.odds).toFixed(2);
$('#max-gain').html(totalcasinowin);
$('#amount').val(totalcasinobet);
}

function addcasinoamount(casamount)
{
$("#amount").val(casamount);
totalcasinobet=casamount;
casinoSetTotalSum();
}


function celarcasinocoupon(){
var rand = Math.random();
$.get('../casino/casino_ajax.php?a=kupontemizle&rand='+rand+'',function() { });	
casinobetsin = {};
casinobetnum = 0;
totalcasinobet="0.00";
totalcasinowin="0.00";
casinocouponloader();
}


function onfinishbalselect(odid)
{
var $ongamed = document.getElementById('thegame_'+odid);
casinoaddselect($ongamed,_lottery_items);
}



function clearaddnumberbet()
{
_lottery_items = [];
$('.lottery-selector .dice-item').attr("class", 'dice-item').html('').removeAttr("data-num");
$('.lottery-selector .lottery-item').attr("class", 'lottery-item').html('').removeAttr("data-num");
}

function addnumberbet(yh)
{
		$bet_id = $(yh).closest('.casino-bet').attr("data-id");
		$item_count = $(yh).closest('.casino-bet').attr("data-itemcount");
if ($bet_id == '596' || $bet_id == '595' || $bet_id == '594') {
var itamneme ='dice-item';
}else{
var itamneme ='lottery-item';
}
		if ($bet_id != _lottery_id) {
			_lottery_items = [];
			_lottery_id = $bet_id;
			$('.lottery-selector .'+itamneme).attr("class", itamneme).html('').removeAttr("data-num");
			$('.lottery-selector button').prop("disabled", true);
		}

		$lottery = $(yh).attr("data-id");
		$mevcut = -1;
		if (_lottery_items.length > 0) {
			$.each(_lottery_items, function(key, data) {
				if (data.id == $lottery) {
					$mevcut = key;
				}
			});
		}

		if ($bet_id == '596') {
			if ($(yh).closest('.blue-dices').length > 0) {
				if (typeof _lottery_items[0] === 'undefined') {
					_lottery_items.push({ id: null });
				}
				_lottery_items = _lottery_items.splice(0, 1);
			} else {
				if (typeof _lottery_items[1] === 'undefined')
					_lottery_items.push({ id: null });
				_lottery_items = _lottery_items.splice(1, 1);
			}
		} else {
			if ($mevcut > -1) {
				_lottery_items.splice($mevcut, 1);
			} else {
				/* uzunluk */
				if (_lottery_items.length >= $item_count) {
					_lottery_items.splice(0, 1);
				}
			}
		}
		/* ekle */
		if ($bet_id == '596' && $(yh).closest('.blue-dices').length == 0) {
			var tmp = [];
			tmp.push({ color: $(yh).attr("data-color"), id: $(yh).attr("data-id"), number: $(yh).attr("data-num") });
			if (_lottery_items.length > 0)
				tmp.push(_lottery_items[0]);
			_lottery_items = tmp;
		} else {
			_lottery_items.push({ color: $(yh).attr("data-color"), id: $(yh).attr("data-id"), number: $(yh).attr("data-num") });
		}
		/* sayı tamamlandıysa */
		if ($item_count == _lottery_items.length) {
			$(yh).closest('.casino-bet').find('.lottery-confirm button').removeAttr("disabled");
		} else {
			$(yh).closest('.casino-bet').find('.lottery-confirm button').prop("disabled", true);
		}
		/* döndür */

		$holder = $(yh).closest('.casino-bet').find('.lottery-selector');
		$holder.find('.'+itamneme).attr("class", itamneme).html('').removeAttr("data-num");
		$.each(_lottery_items, function(key, data) {
			if (data.id != null) {
			if ($bet_id == '596' || $bet_id == '595' || $bet_id == '594') {
				$holder.find('.dice-item:eq('+key+')').attr("class", 'dice-item dice-'+data.number+' '+data.color).attr("data-color", data.color).attr("data-num", data.number);
			}else{
				$holder.find('.lottery-item:eq('+key+')').attr("data-color", data.color).attr("data-num", data.number).html('<span>'+data.number+'</span>').addClass('li-'+data.color);

			}
			}
		});
}










$(function() {
	/* video içi orana tıklama */
	$('.game-odds .screen-odd-item').click(function() {
		$id = $(this).attr("data-qa");
		$('.casino-bet[data-id="'+$id+'"] .casino-bet-top').click();
	});

	/* video ses aç / kapat */
	$('.video-mute').click(function() {
		$muted = $(this).attr("data-muted") == "1" ? true : false;
		if ($muted) {
			$(this).attr("data-muted", "0").find('i').removeClass('fa-volume-mute').addClass('fa-volume');
			klasPlayer.mute();
			_video.muted = false;
		} else {
			$(this).attr("data-muted", "1").find('i').removeClass('fa-volume').addClass('fa-volume-mute');
			klasPlayer.unmute();
			_video.muted = true;
		}
	});

	_casino_refresh_timeout = setTimeout(function() { casino_refresh(); }, 3000);

	_update_coupon_timeout = false;
	_update_coupon_time = 2000;

	/* loto itemlerine tıkla */



	/* oran grupları click */


$('.casino-tabs .casino-tab').click(function() {
		$group_id = $(this).attr("data-id");
		if ($group_id == 0) {
			$('.casino-bet-group').show();
			$('.casino-bet-group .casino-tab').show();
		} else {
			$('.casino-bet-group').hide();
			$('.casino-bet-group .casino-tab').hide();
		}

		$('.casino-bet-group[data-id="'+$group_id+'"]').show();

		$('.casino-tabs .casino-tab.active').removeClass('active');
		$(this).addClass('active');
		return false;
	});
	$('.casino-tabs .casino-tab').click()

	/* oyun click */
	$('.casinolist a').click(function() {
		if ($(this).hasClass('active')) return false;
		$('.casinolist a.active').removeClass('active');
		_active_game = Math.ceil($(this).addClass('active').attr("data-id"));
		_active_tab = 0;
		get_casino_bets();
		return false;
	});

	/* geri sayım */
	setInterval(function() { casino_second(); }, 1000);

	/* casino - seçimli bahis onayla */



$('.casino-bet:not(.passive) .lottery-confirm button').click(function() {

	$bet = $(this).closest('.casino-bet');
		$.ajax({
			url: ''+casinofilespath+'?page=callback',
			type: 'POST',
			data: { action: 'coupon', do: 'add_casino_bet', game: _active_game, bet: $bet.attr("data-id"), items: _lottery_items },
			dataType: 'json',
			success: function(json) {
				if (json.status != 'success') {
					swal.fire(json.message, '', 'error');
				} else {
					$('#coupon').html(json.html);
					$('.bar-odd').html($('#total-odd').text());
					$('.bar-mcount').html('1 bahis');
				}
			}
		});
	});

	/* casino - bahis yap / aç kapa */

$('.casino-bet:not(.passive) .casino-bet-top').click(function() {

		$bet = $(this).closest('.casino-bet');

		/* açılır mı? */
		if ($bet.hasClass('openable')) {
			/* alt bahisleri aç */
			if ($bet.hasClass('opened')) {
				$bet.removeClass('opened').find('.casino-bet-open i').addClass('fa-angle-down').removeClass('fa-angle-up');
			} else {
				/* diğer bahisleri kapat */
				$('.casino-bet.opened').removeClass('opened').find('.casino-bet-open i').removeClass('fa-angle-up').addClass('fa-angle-down');
				$bet.addClass('opened').find('.casino-bet-open i').removeClass('fa-angle-down').addClass('fa-angle-up');
			}
		} else {
			$.ajax({
				url: ''+casinofilespath+'?page=callback',
				type: 'POST',
				data: { action: 'coupon', do: 'add_casino_bet', game: _active_game, bet: $bet.attr("data-id") },
				dataType: 'json',
				success: function(json) {
					if (json.status != 'success') {
						swal.fire(json.message, '', 'error');
					} else {
						$('#coupon').html(json.html);
						$('.bar-odd').html($('#total-odd').text());
						$('.bar-mcount').html('1 bahis');
					}
				}
			});
		}
	});

	/* ilk olarak çeviriler */
	$.ajax({
		url: ''+casinofilespath+'?action=casino_translations',
		dataType: 'json',
		success: function(json) {
			if (json.status != 'success') {
				swal.fire(json.message, '', 'error');
			} else {
				_text = json.translations;
				get_casino_bets();
			}
		}
	});
casinocouponloader();
setInterval('UpdateOddscasino()', casrefreshtime);
});


function financial(x) {
  return Number.parseFloat(x).toFixed(2);
}

function UpdateOddscasino(){
if(casinobetnum==0)
{
return;
}
		$.ajax({
			url: ''+casinofilespath+'?page=callback',
			type: 'GET',
			data: { action: 'coupon', do: 'add_casino_bet', game: _active_game, session_id: session_id, round: casinobetsin['round'],odid: casinobetsin['odid'],grupid: casinobetsin['grupid'],gameid: casinobetsin['gameid'],odds: casinobetsin['odds'],timeleftgame: casinobetsin['timeleftgame'], odname: casinobetsin['odname'], gname: casinobetsin['gname'], items: _lottery_items },
			dataType: 'json',
			success: function(json) {
				if (json.status != 'success') {
				return;
				}else{
				if((json.game.game_id=="1" || json.game.game_id=="9" || json.game.game_id=="3" || json.game.game_id=="10") && json.game.secleft>0){
				casinobetsin.timeleftgame=json.game.goleft;
				} else {
				casinobetsin.timeleftgame=0;
				}
				if(casinobetsin.round!=json.game.run_id){
				casinobetsin.oldround=casinobetsin.round;
				casinobetsin.round=json.game.run_id;
				}
				if(json.game.game_id=="7" && json.game.bets.id=="500" && json.game.bets.sayi==0){
				casinobetsin.image="<img src=\"/assets/img/live/suspended.gif\">";
				casinobetsin.odds="1.00";
				} else if(json.game.bets.status!="active"){
				casinobetsin.image="<img src=\"/assets/img/live/suspended.gif\">";
				casinobetsin.odds="1.00";
				} else if(json.game.bets.value>casinobetsin.odds){
				casinobetsin.image="<img src=\"/assets/img/live/oddsUp.gif\">";
				casinobetsin.odds=casinoorktder(_active_game,json.game.bets.value);
				} else if(json.game.bets.value<casinobetsin.odds){
				casinobetsin.image="<img src=\"/assets/img/live/oddsDown.gif\">";
				casinobetsin.odds=casinoorktder(_active_game,json.game.bets.value);
				}
				}
			casinocouponloader();
			}

		});
}