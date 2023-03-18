var casinobetsin = new Object();
var casibostema ='<div class="coupon-empty"><strong>'+boskupon+'</strong><span class="text-muted">'+oyunekleme+'</span></div>';
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
var casinocserver="confirmcoupon"
var casinofilespath="casino/casino.php"



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
		$('.casino-holder').prepend('<iframe src="https://href.li/?https://webiframe.betgames.tv/#/auth?apiUrl=https%3A%2F%2Fgame3.betgames.tv&partnerCode=olybet&partnerToken=-&language=en&timezone=3&pageName='+_active_game+'" allowtransparency="true" frameborder="0" scrolling="no" onload="$(\'.nest5-wrapper\').hide(); $(this).css(\'opacity\', 1); casino_bet_ajax();" style="opacity: 0;"></iframe>');

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
$('.casino-tabs .active').removeClass('active');
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
					$alt = $alt + '<span role="presentation" data-type="dice" data-qa="button-game-item-select-'+data.number+'" style="margin-right: 6px;margin-top: 3px;" onclick="addnumberbet(this);" data-odid="0" class="game-item-select" data-color="dice-red" data-id="'+data.id+'" data-num="'+data.number+'"><span class="game-item"><span class="dice-item dice-'+data.number+' dice-red" data-qa="area-game-item-'+data.number+'"></span></span></span>';
					}else{
					$alt = $alt + '<div onclick="addnumberbet(this);" data-odid="0" class="lottery-item li-'+data.color+'" data-color="'+data.color+'" data-id="'+data.id+'" data-num="'+data.number+'"><span>'+data.number+'</span></div>';
					}
				});
				$alt = $alt+'</div></div>';
			}
			/* bahis gruplarını döndür */
			$groups = '<div class="casino-groups" data-game="'+_active_game+'">';
			$tabs = '<div class="casino-tabs-holder"><div class="casino-tabs"><div class="casino-tab '+(_active_tab == 0 ? 'active' : '')+'"  id="tab_0"  onclick="changetab(0);" data-id="0"><span>'+tumusecenegi+'</span></div>'
			$.each(json.game.bets,function(key, data) {
				$html = '<div class="casino-tab '+(_active_tab == data.id ? 'active' : '')+'" data-id="'+data.id+'" id="tab_'+data.id+'" onclick="changetab('+data.id+');" ><span>'+_text.oddGroups_dil[data.id]+'</span></div>';
				$tabs = $tabs + $html;
				/* bahis grubunu ayarla */
				$html = '<div class="casino-bet-group" id="tabgroup_'+data.id+'" data-id="'+data.id+'">' + $html;
				$.each(data.odds, function(key, odds) {
					if (odds.itemsCount > 0) {
						$selector = '<div class="lottery-selector">';
						for($i = 1; $i<=odds.itemsCount; $i++) {
							if(_active_game==10)
							{
							$selector = $selector + '<div class="dice-item" data-i="'+$i+'"></div>';
							}else{
							$selector = $selector + '<div class="lottery-item" data-i="'+$i+'"></div>';
							}

						}
						$selector = $selector + '<div class="lottery-confirm"><button type="button" class="btn btn-sm btn-dark" onclick="onfinishbalselect('+odds.id+');" data-odid="'+odds.id+'" disabled>Onayla</button> <a href="javascript:clearaddnumberbet();">Vazgeç</a></div>';
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
					$html = $html + '<div data-itemcount="'+odds.itemsCount+'" id="thegame_'+odds.id+'" class="casino-bet '+(odds.itemsCount > 0 ? 'openable' : '')+'" data-odds="'+odds.value.toFixed(2)+'" data-gameid="'+_active_game+'" data-id="'+odds.id+'" data-grupid="'+data.id+'" data-roundid="'+json.game.run_id+'" '+(odds.itemsCount > 0 ? '' : 'onclick="casinoaddselect(this);"')+' ><div class="casino-bet-top" '+(odds.itemsCount > 0 ? 'onclick="casinoaddopenwon('+odds.id+');"' : '')+'><span class="casino-bet-title">'+_text.odds_dil[odds.id]+''+extraklubs+'</span>'
					+'<span class="casino-bet-value">'+casinoorktder(_active_game,odds.value).toFixed(2)+'</span>'
					+(odds.itemsCount > 0 ? '<span class="casino-bet-open"><i class="betgames-icon chevron-down"></i></span>' : '')
					+'</div><div class="casino-bet-alt" id="openid_'+odds.id+'">'
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
			$('#casino-bets').html($tabs + $groups);
			check_odds_active(json.game.bets);
			unblock($('#casino-bets'));
		}
	});
}



function casinoaddopenwon(er)
{
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
casinobetnum=1;
casinocouponloader();
UpdateOddscasino();
}


function casino_refresh() {
	/* casinoyu yenile */
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
function casinocouponloader()
{
$htmlcasino = [];
if(casinobetnum>0)
{
             $htmlcasino.push('<div class="betting-slip-content">');
             $htmlcasino.push('<form method="post" id="betting-form">');
             $htmlcasino.push('<div class="casino-cp">');
             $htmlcasino.push('<div class="cp-game">');
             $htmlcasino.push('<span class="game-name">');
             $htmlcasino.push(''+casinobetsin.gname+' <span class="badge badge-dark text-danger bet-timeleft">'+(casinobetsin.timeleftgame!=0 && casinobetsin.timeleftgame!="" ? casinobetsin.timeleftgame:''+canliyazisi+'')+'</span>');
             $htmlcasino.push('</span>');
             $htmlcasino.push('</div>');
             $htmlcasino.push('<div class="cp-bet">');
             $htmlcasino.push('<span class="bet-name">'+casinobetsin.odname2+'</span>');
             $htmlcasino.push('<span class="slip-odd odd-lock"> '+(casinobetsin.image ? casinobetsin.image:'')+' '+financial(casinobetsin.odds)+'</span>');
             $htmlcasino.push('</div>');
             $htmlcasino.push('</div>');
		if(casinobetsin.extraball)
		{
             $htmlcasino.push('<div class="lottery-items">');
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
		if(casinobetsin.oldround && casinobetsin.round!=casinobetsin.oldround)
		{
             $htmlcasino.push('<div class="mbs-error">'+seanskapanmistir+' : '+casinobetsin.round+'</div>');
		}
             $htmlcasino.push('<div class="coupon-fresh">');
             $htmlcasino.push('<span class="coupon-count">Toplam 1 müsabaka</span>');
             $htmlcasino.push('<span class="delete-coupon btn btn-sm btn-success" data-type="casino" onclick="celarcasinocoupon();">'+kupontemizleme+'</span>');
             $htmlcasino.push('</div>');
             $htmlcasino.push('<div class="slip-alt">');
             $htmlcasino.push('<ul class="slip-input">');
             $htmlcasino.push('<li>');
             $htmlcasino.push('<span>'+kuponnotu+':</span>');
             $htmlcasino.push('<span><input type="text" name="title" id="kuponisim" value=""></span>');
             $htmlcasino.push('</li>');
             $htmlcasino.push('<li>');
             $htmlcasino.push('<span>'+kuponmiktar+':</span>');
             $htmlcasino.push('<span>');
             $htmlcasino.push('<input maxlength="7" id="amount" value="'+totalcasinobet+'" onfocus="this.value=\'\'" onblur="totalcasinobet=String(this.value);casinoSetTotalSum();" type="text" class="bahis-say-not">');
             $htmlcasino.push('</span>');
             $htmlcasino.push('</li>');
             $htmlcasino.push('<li>');
             $htmlcasino.push('<span>&nbsp;</span>');
             $htmlcasino.push('<span>');
             $htmlcasino.push('<ul class="slip-i-ul">');
             $htmlcasino.push('<li onclick="addcasinoamount(5);">5</li>');
             $htmlcasino.push('<li onclick="addcasinoamount(10);">10</li>');
             $htmlcasino.push('<li onclick="addcasinoamount(50);">50</li>');
             $htmlcasino.push('<li onclick="addcasinoamount(100);">100</li>');
             $htmlcasino.push('</ul>');
             $htmlcasino.push('</span>');
             $htmlcasino.push('</li>');
             $htmlcasino.push('<li><span>'+kuponolasi+':</span><span><span id="max-gain">'+totalcasinobet+'</span></span></li>');
             $htmlcasino.push('</ul>');
             $htmlcasino.push('<div class="cp-button">');
             $htmlcasino.push('<input type="hidden" name="coupon_type" value="casino">');
             $htmlcasino.push('<button type="button" data-qa="button-place-bet" class="btn btn-mini btn-info" onclick="sendcasinocoupon();" style="width: 95%;height: 30px !important;">'+kupononaylama+'</button>');
             $htmlcasino.push('</div>');
             $htmlcasino.push('</div>');
             $htmlcasino.push('</form>');
             $htmlcasino.push('</div>');
     $('.betting-slip-content').html($htmlcasino.join(''));
	casinoSetTotalSum();
}else{
$('.betting-slip-content').html(casibostema);
}
}


function sendcasinocoupon(){

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
url: "casino/casino_ajax.php?a=kuponok&rand="+rand+"",
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
     failcont('KUPON HATA RAPORU', error);
 }





function casinoSetTotalSum()
{
totalcasinowin = parseFloat(totalcasinobet * casinobetsin.odds).toFixed(2);
$('#max-gain').html(totalcasinowin);
}

function addcasinoamount(casamount)
{
$("#amount").val(casamount);
totalcasinobet=casamount;
casinoSetTotalSum();
}


function celarcasinocoupon()
{
var rand = Math.random();
$.get('casino/casino_ajax.php?a=kupontemizle&rand='+rand+'',function() { });	
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


$('.lottery-items .lottery-item').click(function() {

		$bet_id = $(this).closest('.casino-bet').attr("data-id");
		$item_count = $(this).closest('.casino-bet').attr("data-itemcount");
		if ($bet_id != _lottery_id) {
			_lottery_items = [];
			_lottery_id = $bet_id;
			$('.lottery-selector .lottery-item').attr("class", "lottery-item").html('').removeAttr("data-num");
			$('.lottery-selector button').prop("disabled", true);
		}

		$lottery = $(this).attr("data-id");

		/* var mı? */
		$mevcut = -1;
		if (_lottery_items.length > 0) {
			$.each(_lottery_items, function(key, data) {
				if (data.id == $lottery) {
					$mevcut = key;
				}
			});
		}

		if ($bet_id == '596') {
			if ($(this).closest('.blue-dices').length > 0) {
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
		if ($bet_id == '596' && $(this).closest('.blue-dices').length == 0) {
			var tmp = [];
			tmp.push({ color: $(this).attr("data-color"), id: $(this).attr("data-id"), number: $(this).attr("data-num") });
			if (_lottery_items.length > 0)
				tmp.push(_lottery_items[0]);
			_lottery_items = tmp;
		} else {
			_lottery_items.push({ color: $(this).attr("data-color"), id: $(this).attr("data-id"), number: $(this).attr("data-num") });
		}


		/* sayı tamamlandıysa */
		if ($item_count == _lottery_items.length) {
			$(this).closest('.casino-bet').find('.lottery-confirm button').removeAttr("disabled");
		} else {
			$(this).closest('.casino-bet').find('.lottery-confirm button').prop("disabled", true);
		}
		/* döndür */
		$holder = $(this).closest('.casino-bet').find('.lottery-selector');
		$holder.find('.lottery-item').attr("class", "lottery-item").html('').removeAttr("data-num");
		$.each(_lottery_items, function(key, data) {
			if (data.id != null) {
				$holder.find('.lottery-item:eq('+key+')').attr("data-num", data.number).html('<span>'+data.number+'</span>').addClass('li-'+data.color);
			}
		});
	});

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

function UpdateOddscasino()
{
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
				casinobetsin.image="<img src=\"assets/img/live/suspended.gif\">";
				casinobetsin.odds="1.00";
				} else if(json.game.bets.status!="active"){
				casinobetsin.image="<img src=\"assets/img/live/suspended.gif\">";
				casinobetsin.odds="1.00";
				} else if(json.game.bets.value>casinobetsin.odds){
				casinobetsin.image="<img src=\"assets/img/live/oddsUp.gif\">";
				casinobetsin.odds=casinoorktder(_active_game,json.game.bets.value);
				} else if(json.game.bets.value<casinobetsin.odds){
				casinobetsin.image="<img src=\"assets/img/live/oddsDown.gif\">";
				casinobetsin.odds=casinoorktder(_active_game,json.game.bets.value);
				}
				}
			casinocouponloader();
			}

		});
}