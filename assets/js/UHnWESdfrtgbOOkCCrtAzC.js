function financialnumber(x) {
  return Number.parseFloat(x).toFixed(2);
}
function changedealerplayer(x) {
         x = x.replace('player', 'Oyuncu');
         x = x.replace('dealer', 'Kurpiye');
  return x;
}

var Lib = {
    Utils: {
        Date: {
            _months: ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'],
            _days: ['Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi'],
            ParseDataDate: function(d) {
                if(d != undefined) {
                    var t, x = [0, 0, 0];
                    if(d.toString().indexOf(' ') > -1) {
                        var p = d.toString().split(' ');
                        t = p[0].split('-');
                        x = p[1].split(':');
                        if(x.length < 3) x.push(0)
                    } else t = d.toString().split('-');
                    return new Date(t[0], t[1] - 1, t[2], x[0], x[1], x[2])
                }
            },
            FormatDate: function(d) {
                if(d != undefined) {
                    var t, s = '',
                        x = Lib.Utils.Date.ParseDataDate(d);
                    if(d.toString().indexOf(' ') > -1) {
                        var p = d.toString().split(' ');
                        t = p[0].split('-');
                        s = p[1].substring(0, 5)
                    } else t = d.toString().split('-');
                    return t[2] + ' ' + Lib.Utils.Date._months[t[1] - 1] + ' ' + t[0] + ', ' + Lib.Utils.Date._days[x.getDay()] + " " + s;
                }
            },
            FormatDateTime: function(dt) {
                return(dt.getDate() < 10 ? '0' : '') + dt.getDate() + '.' + (dt.getMonth() + 1 < 10 ? '0' : '') + (dt.getMonth() + 1) + '.' + dt.getFullYear() + ' ' + (dt.getHours() < 10 ? '0' : '') + dt.getHours() + ':' + (dt.getMinutes() < 10 ? '0' : '') + dt.getMinutes() + ':' + (dt.getSeconds() < 10 ? '0' : '') + dt.getSeconds()
            },
            FromTimestamp: function(t_timestamp) {
                return new Date(t_timestamp * 1000);
            },
            FormatTime: function(d) {
                return d.toString().substring(11, 16);
            },
            Parse: function(d) {
                if(d != undefined) {
                    var t = [0, 0, 0];
                    var x = [0, 0, 0];
                    if(d.toString().indexOf(' ') > -1) {
                        var p = d.toString().split(' ');
                        if(p[0].match(/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}/)) {
                            t = p[0].split('-');
                        } else if(p[0].match(/^[0-9]{2}\.[0-9]{2}\.[0-9]{4}/)) {
                            var tt = p[0].split('.');
                            t[0] = tt[2];
                            t[1] = tt[1];
                            t[2] = tt[0];
                        } else {
                            return false;
                        }
                        x = p[1].split(':');
                        if(x.length < 3) {
                            x.push(0)
                        }
                    } else {
                        t = d.toString().split('-');
                    }
                    return new Date(t[0], t[1] - 1, t[2], x[0], x[1], x[2])
                }
                return false;
            }
        },
        RandStr: function(len) {
            var str = "abcdefghiklmnopqrstuvwxyz";
            var rstr = '';
            for(var i = 0; i < len; i++) {
                var rnum = Math.floor(Math.random() * str.length);
                rstr += str.substring(rnum, rnum + 1);
            }
            return rstr;
        },
        NumberOnly: function(e) {
            var whichCode = (window.Event) ? e.which : e.keyCode;
            if(whichCode == 13) return true;
            if(whichCode > 57) return false;
            if(whichCode < 48 && whichCode > 13) return false;
        },
        IsEnter: function(e) {
            if(e.keyCode == 13) {
                return true;
            }
            return false;
        },
        Sprintf: function(string) {
            var args = Array.prototype.slice.call(arguments).splice(1);
            var counter = 0;
            for(var i = 0; i < args.length; i++) {
                var match = /%s|%d|%i|%f|%o/.exec(string);
                if(match) {
                    var index = match.index;
                    switch(match[0]) {
                        case '%s':
                            string = (typeof args[counter] == 'string') ? string.substr(0, index) + args[counter] + string.substr(index + 2) : string.substr(0, index) + NaN + string.substr(index + 2);
                            break;
                        case '%d':
                        case '%i':
                        case '%f':
                            string = (typeof args[counter] == 'number') ? string.substr(0, index) + args[counter] + string.substr(index + 2) : string.substr(0, index) + NaN + string.substr(index + 2);
                            break;
                        case '%o':
                            string = (typeof args[counter] == 'object') ? string.substr(0, index) + args[counter] + string.substr(index + 2) : string.substr(0, index) + NaN + string.substr(index + 2);
                            break;
                    }
                }
                counter++;
            }
            return string;
        },
        IsMobil: function() {
            if(navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/i) || navigator.userAgent.match(/Windows Phone/i)) {
                return true;
            } else {
                return false;
            }
        },
        LoadScript: function(url, callback) {
            var head = document.getElementsByTagName('head')[0];
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.src = url;
            script.onreadystatechange = callback;
            script.onload = callback;
            head.appendChild(script);
        },
        objSize: function(obj) {
            var count = 0;
            if(typeof obj == "object") {
                if(Object.keys) {
                    count = Object.keys(obj).length;
                } else if(window._) {
                    count = _.keys(obj).length;
                } else if(window.$) {
                    count = $.map(obj, function() {
                        return 1;
                    }).length;
                } else {
                    for(var key in obj)
                        if(obj.hasOwnProperty(key)) count++;
                }
            }
            return count;
        }
    }
};





var Server = {
    Init: function() {
        $.ajaxSetup({
            cache: false
        });
        User.ShowHideBalance();
        
        $(".message").live('click', function() {
            $(this).fadeOut();
        });
        $('a[rel="external"]').live('click', function() {
            this.target = "_blank";
        });
    },
    Ctrl: function(key, callback, args) {
        $(document).keydown(function(e) {
            if(!args) args = [];
            if(e.keyCode == key.charCodeAt(0) && e.ctrlKey) {
                callback.apply(this, args);
                return false;
            }
        });
    },
    CheckConsole: function() {
        if(window.console && (window.console.firebug || window.console.exception)) {
            $('html').remove();
            window.top.location = '/index.php?cmd=logout';
        }
    }
};
var User = {
    ptip: 0,
    parnt: 0,
    token: 'FFFFFFFFFFFFF',
    mbs: 0,
    userserver: '/v1/server/usr.php',
    Logout: function() {
        jConfirm('Çıkış yapmak istediginizden emin misiniz?', 'ÇIKIŞ EKRANI', function(r) {
            if(r) {
                window.top.location = '/index.php?cmd=logout';
            }
        });
    },
    CheckPopupMessages: function() {
        var params = {
            cmd: 'popup'
        };
        $.post(this.userserver, params, function(data) {
            if(data.success) {
                Page.HelpBox(2, data.results);
            }
        }, "json");
    },
    RPopup: function(popid) {
        var params = {
            cmd: 'rpopup',
            popid: popid
        };
        $.post(this.userserver, params);
    },
    ShowHideBalance: function() {
        $('#pageHeaderUserStatusUserInfoMoney').mouseover(function() {
            $('#pageHeaderUserStatusUserInfoMoney').html($('#mybalance').text());
        }).mouseout(function() {
            $('#pageHeaderUserStatusUserInfoMoney').html('XXX.XX');
        });
    },
    BalanceText: function(balance) {
        $('#mybalance').text(balance);
    }
};
var MyTicket = {
    Lang: {
        _itext: {
            1: 'Kazandı',
            2: 'Kaybetti',
            3: 'Bekliyor',
            4: 'İptal'
        },
        _yesno: {
            1: 'Evet',
            2: 'Hayır'
        },
    },
    Print: function(id) {
        var url = '/_server/wdkps.php?cmd=print&tid=' + id;
        Page.Popup(url, 'print', 700, 600, 300, 300);
        return;
    },
    Details: {
        _tid: 0,
        _cache: {},
        Load: function() {
            Page.ShowBoxLoading();
            var params = {
                cmd: 'details',
                tid: MyTicket.Details._tid
            };
            jQuery.post('/_server/user_server.php?s=' + User.ptip + '.php', params, function(json) {
                if(json.success) {
			if(json.tip=="9")
			{
                    MyTicket.Details.CasinoRender(json.results);
			}else{
                    MyTicket.Details._cache[MyTicket.Details._tid] = json.results;
                    MyTicket.Details.Render();
			}

                } else {
                    Page.HideBoxLoading();
                    jAlert(json.messages, json.title);
                }
            }, "json");
        },
        Show: function(id) {
            MyTicket.Details._tid = id;
            if(MyTicket.Details._cache[id]) {
                MyTicket.Details.Render();
                return;
            }
            MyTicket.Details.Load();
        },
        openlivedetails: function(x) {
	$( "#ticdet_"+x ).toggle();
        },
        CasinoRender: function(data) {
            var $data = data;
            var tmp = [];
            tmp.push('<table class="tablesorter" id="TdaHS54">');
            tmp.push('<thead>');
            tmp.push('<tr>');
            tmp.push('<th>Seans Kodu</th>');
            tmp.push('<th>Oyun</th>');
            tmp.push('<th>Seçim</th>');
            tmp.push('<th>Oran</th>');
            tmp.push('<th>Canlı</th>');
            tmp.push('<th>Durum</th>');
            tmp.push('<th>#Seçim</th>');
            tmp.push('<th>Sonuç</th>');
            tmp.push('<th> </th>');
            tmp.push('</tr>');
            tmp.push('</thead>');
            tmp.push('<tbody>');
           for(var i in $data.details) {
                var v = $data.details[i];
                tmp.push('<tr class="itext-' + v.statu + ' c">');
                tmp.push('<td>' + v.bahiskodu + '</td>');
                tmp.push('<td>' + v.oyunad + '</td>');
                tmp.push('<td>' + v.tercih + ' '+(v.orankodu=="494" || v.orankodu=="495" || v.orankodu=="496" || v.orankodu=="497" || v.orankodu=="498" || v.orankodu=="499" ? '<br>('+(v.acikkart+1)+'. Kart)':'' )+'</td>');
                tmp.push('<td>' + financialnumber(v.oran) + '</td>');
                tmp.push('<td class="itext-1">Evet</td>');
                tmp.push('<td><img src="/resources/themes/common/icons/16/ticket_' + v.statu + '.png" alt="Statu" border="0" />'+(v.videourl ? '<img onclick="MyTicket.Details.WatchCasinoVideo(\'' + MyTicket.Details._tid + '\',\'' + v.bahiskodu + '\',\''+v.videourl+'\');" src="/v2/csy/tvliste.png" alt="İzle" border="0" style="width: 17px;vertical-align: sub;cursor: pointer;">':'')+'</td>');
 		var stmb="";
		var exwitdk="";
		if(v.oyunkodu=="8")
		{
		if(v.suits)
		{
		for (i = 0; i < v.suits.length; i++) {
		stmb+='<span class="'+v.suits[i]+'"></span>';
		}
		}
                tmp.push('<td class="card">'+stmb+'</td>');
		if(v.sonuc) {
                tmp.push('<td class="card" style="text-align: left;">Kurpiye:'+v.sonuc.card_dealer.score+'<span class="'+v.sonuc.card_dealer.suit+'"></span><br>Oyuncu:'+v.sonuc.card_player.score+'<span class="'+v.sonuc.card_player.suit+'"></span></td>');
		}else{
                tmp.push('<td></td>');
		}
		}else if(v.oyunkodu=="10")
		{
		if(v.ex)
		{
		for (i = 0; i < v.ex.length; i++) {
		stmb+='<span class="dice-item dice-'+v.ex[i].number+' '+v.ex[i].color+'" data-qa="area-game-item-1" style="width: 25px;height: 25px;float: left;"></span>';
		}
		}
                tmp.push('<td class="card">'+stmb+'</td>');
		if(v.sonuc) {
                tmp.push('<td class="card" style="text-align: left;width: 66px;"><span class="dice-item dice-'+v.sonuc[0].number+' dice-red" data-qa="area-game-item-1" style="width: 25px;height: 25px;float: left;"></span><span class="dice-item dice-'+v.sonuc[1].number+' dice-blue" data-qa="area-game-item-1"  style="width: 25px;height: 25px;float: left;"></span></td>');
		}else{
                tmp.push('<td></td>');
		}
		}else if(v.oyunkodu=="7")
		{
		if(v.ex)
		{
		for (i = 0; i < v.ex.length; i++) {
		stmb+='<div class="felekitem"><div class="lottery-item li-'+v.ex[i].color+'"><span>'+v.ex[i].number+'</span></div></div>';
		}
		}
                tmp.push('<td class="card">'+stmb+'</td>');
		if(v.sonuc) {
                tmp.push('<td class="felekitem" style="text-align: left;width: 66px;"><div class="lottery-item li-'+v.sonuc[0].color+'"><span>'+v.sonuc[0].number+'</span></div></td>');
		}else{
                tmp.push('<td></td>');
		}
		}else if(v.oyunkodu=="3")
		{
		if(v.ex)
		{
		exwitdk='style="width: '+(v.ex.length*28)+'px;"';
		for (i = 0; i < v.ex.length; i++) {
		stmb+='<div class="syslitem"><div class="lottery-item li-'+v.ex[i].color+'" style="float: left;margin-right: 2px;"><span>'+v.ex[i].number+'</span></div>';
		}
		}
                tmp.push('<td class="card" '+exwitdk+'>'+stmb+'</td>');
		if(v.sonuc) {
                tmp.push('<td class="syslitem" style="text-align: left;width: 140px;">');
		for (ics = 0; ics < v.sonuc.length; ics++) {
                tmp.push('<div class="lottery-item li-'+v.sonuc[ics].color+'" style="float: left;margin-right: 2px;"><span>'+v.sonuc[ics].number+'</span></div>');
		}
                tmp.push('</td>');
		}else{
                tmp.push('<td></td>');
		}
		}else if(v.oyunkodu=="6")
		{
		if(v.suits)
		{
		for (i = 0; i < v.suits.length; i++) {
		stmb+='<span class="'+v.suits[i]+'"></span>';
		}
		}
                tmp.push('<td class="card">'+stmb+'</td>');
		if(v.sonuc) {
                tmp.push('<td class="bakaracards" style="text-align: left;width: 130px;">');
                tmp.push('<div class="results-player-cards winner">');
                tmp.push('<span class="baccarat-results-winner player">O</span>');
		for (ib = 0; ib < v.sonuc.results.situation.player.length; ib++) {
                tmp.push('<span class="card '+v.sonuc.results.situation.player[ib].suit+'" data-qa="area-card-'+v.sonuc.results.situation.player[ib].suit+'"><b>'+v.sonuc.results.situation.player[ib].value+'</b><span class="'+v.sonuc.results.situation.player[ib].suit+'"></span></span>');
		}
                tmp.push('<span class="baccarat-result-score">('+v.sonuc.results.score.player+')</span>');
                tmp.push('</div>');
                tmp.push('<div class="results-banker-cards lost">');
                tmp.push('<span class="baccarat-results-winner banker">K</span>');
		for (ib = 0; ib < v.sonuc.results.situation.banker.length; ib++) {
                tmp.push('<span class="card '+v.sonuc.results.situation.banker[ib].suit+'" data-qa="area-card-'+v.sonuc.results.situation.banker[ib].suit+'"><b>'+v.sonuc.results.situation.banker[ib].value+'</b><span class="'+v.sonuc.results.situation.banker[ib].suit+'"></span></span>');
		}
                tmp.push('<span class="baccarat-result-score">('+v.sonuc.results.score.banker+')</span>');
                tmp.push('</div>');
		tmp.push('</td>');
		}else{
                tmp.push('<td></td>');
		}
		}if(v.oyunkodu=="5" || v.oyunkodu=="12")
		{
		stmb="";
		if(v.sonuc)
		{
		for (i = 0; i < v.sonuc.results.winners.length; i++) {
		stmb+=v.sonuc.results.winners[i]+',';
		}
		}
                tmp.push('<td class="card"></td>');
		if(v.sonuc) {
                tmp.push('<td class="card" style="text-align: left;">Kazanan : '+v.sonuc.results.combination_name+'<br>Kazanan Eller : '+changedealerplayer(stmb)+'</td>');
		}else{
                tmp.push('<td></td>');
		}
		}else if(v.oyunkodu=="9")
		{
		if(v.ex)
		{
		for (i = 0; i < v.ex.length; i++) {
		stmb+='<div class="syslitem"><div class="lottery-item li-'+v.ex[i].color+'"><span>'+v.ex[i].number+'</span></div></div>';
		}
		}
                tmp.push('<td class="card">'+stmb+'</td>');
		if(v.sonuc) {
                tmp.push('<td class="card" style="text-align: left;width: 90px;">');
                tmp.push('<div class="results-player-cards" style="display: block;float: left;">');
                tmp.push('<span class="baccarat-results-winner player" style="display: block;float: left;margin-top: 6px;margin-right: 7px;">A</span>');
                tmp.push('<div class="syslitem" style="width: 75px;"><div class="lottery-item li-'+v.sonuc[0].color+'" style="display: block;float: left;margin-right: 4px;"><span>'+v.sonuc[0].number+'</span></div><div class="lottery-item li-'+v.sonuc[1].color+'" style="display: block;float: left;"><span>'+v.sonuc[1].number+'</span></div></div>');
                tmp.push('</div>');
                tmp.push('<div class="results-banker-cards" style="clear: both;display: block;float: left">');
                tmp.push('<span class="baccarat-results-winner banker" style="display: block;float: left;margin-top: 6px;margin-right: 7px;">B</span>');
                tmp.push('<div class="syslitem" style="width: 75px;"><div class="lottery-item li-'+v.sonuc[2].color+'" style="display: block;float: left;margin-right: 4px;"><span>'+v.sonuc[2].number+'</span></div><div class="lottery-item li-'+v.sonuc[3].color+'" style="display: block;float: left;"><span>'+v.sonuc[3].number+'</span></div></div>');
                tmp.push('</div>');
                tmp.push('<div class="results-banker-cards" style="clear: both;display: block;float: left">');
                tmp.push('<span class="baccarat-results-winner banker" style="display: block;float: left;margin-top: 6px;margin-right: 7px;">C</span>');
                tmp.push('<div class="syslitem" style="width: 75px;"><div class="lottery-item li-'+v.sonuc[4].color+'" style="display: block;float: left;margin-right: 4px;"><span>'+v.sonuc[4].number+'</span></div><div class="lottery-item li-'+v.sonuc[5].color+'" style="display: block;float: left;"><span>'+v.sonuc[5].number+'</span></div></div>');
                tmp.push('</div>');
                tmp.push('</td>');
		}else{
                tmp.push('<td></td>');
		}
		}else if(v.oyunkodu=="1")
		{
		if(v.ex)
		{
		exwitdk='style="width: '+(v.ex.length*28)+'px;"';
		for (i = 0; i < v.ex.length; i++) {
		stmb+='<div class="syslitem7s" style="display: block;float: left;margin-right: 1px;"><div class="lottery-item li-'+v.ex[i].color+'" style="width: 24px;height: 24px;"><span>'+v.ex[i].number+'</span></div></div>';
		}
		}
                tmp.push('<td class="card" '+exwitdk+'>'+stmb+'</td>');
		if(v.sonuc) {
                tmp.push('<td class="syslitem7s" style="text-align: left;width: 198px;">');
		for (ics = 0; ics < v.sonuc.length; ics++) {
                tmp.push('<div class="lottery-item li-'+v.sonuc[ics].color+'" style="float: left;margin-right: 2px;"><span>'+v.sonuc[ics].number+'</span></div>');
		}
                tmp.push('</td>');
		}else{
                tmp.push('<td></td>');
		}
		}else{
             //   tmp.push('<td></td>');
		}
                tmp.push('<td class="l">'+($data.owner==1 && v.ft!="İADE" ? '<img onclick="MyTicket.HelpQuestion('+MyTicket.Details._tid+','+v.bahiskodu+',\''+v.oyunad + ' - ' + v.tercih +'\',' + v.bahiskodu + ');" style="cursor:pointer;" class="tooltip" src="/resources/themes/common/icons/16/remove.png" title="Maçı Düzenle" border="0" />':'--')+'</td>');
                tmp.push('</tr>');
	    }
            tmp.push('<tr>');
            tmp.push('<td colspan="13">');
            tmp.push('<table class="tablesorter">');
            tmp.push('<tr><td>MIKTAR</td><td><strong>' + $data.amount + '</strong></td><td>TOPLAM ORAN</td><td><strong>' + $data.trate + '</strong></td><td>KAZANC</td><td><strong>' + $data.win + '</strong></td><td>DURUM</td><td><strong>' + MyTicket.Lang._itext[$data.statu] + '</strong></td></tr>');
            tmp.push('</table>');
            tmp.push('</td>');
            tmp.push('</tr>');
            if(User.ptip <= 3) {
                tmp.push('<tr>');
                tmp.push('<td colspan="12"><div class="notice info"><p><strong>Onay Tarihi:</strong>' + $data.date + ' <strong>İp Adresi:</strong>' + $data.ip + ' <strong>Açıklamalar:</strong>' + $data.notlar + '</p></div></td>');
                tmp.push('</tr>');
            } else if(User.ptip == 4) {
                tmp.push('<tr>');
                tmp.push('<td colspan="12"><div class="notice info"><p><strong>Onay Tarihi:</strong>' + $data.date + ' <strong>İp Adresi:</strong>' + $data.ip + '</p></div></td>');
                tmp.push('</tr>');
            } else {
                tmp.push('<tr>');
                tmp.push('<td colspan="12"><div class="notice info"><p><strong>Onay Tarihi:</strong>' + $data.date + '</p></div></td>');
                tmp.push('</tr>');
            }
            tmp.push('</tbody>');
            tmp.push('</table>');
            $.colorbox({
                title: MyTicket.Details._tid + ' Nolu Kupon Bilgileri',
                html: tmp.join('')
            });
            $('#ticket_' + MyTicket.Details._tid).attr("class", "itext-0");



	},
WatchCasinoVideo: function (id,round,video) {
var tmp = [];
tmp.push('<div class="archive-player"><video class="is-playing" controls="" controlslist="nodownload" playsinline="" disablepictureinpicture="" style="width: 400px;height: 225px;" autoplay><source src="'+video+'" type="video/mp4"></video></div>');
$.colorbox({
title : round+' Seans Videosu İzleniyor.', 
html : tmp.join(''), 
onClosed : function() {
MyTicket.Details.Show(id);
},
onComplete: function() {
$(".chosen").chosen({
disable_search_threshold: 5,
browser_supported: function() {
return _logged_mobile==1?false:true;
}
});
$.colorbox.resize();
}
});






	},
        Render: function() {
            var $data = MyTicket.Details._cache[MyTicket.Details._tid];
            var tmp = [];
            tmp.push('<table class="tablesorter" id="TdaHS54">');
            tmp.push('<thead>');
            tmp.push('<tr>');
            tmp.push('<th></th>');
            tmp.push('<th>Kod</th>');
            tmp.push('<th>Müsabaka</th>');
            tmp.push('<th>Tarih</th>');
            tmp.push('<th>Oyun</th>');
            tmp.push('<th>Tercih</th>');
            tmp.push('<th>Oran</th>');
            tmp.push('<th>Canlı</th>');
            tmp.push('<th>Durum</th>');
            tmp.push('<th>Dk/Sk</th>');
            tmp.push('<th>Skor</th>');
            tmp.push('<th> </th>');
            tmp.push('</tr>');
            tmp.push('</thead>');
            tmp.push('<tbody>');
            for(var i in $data.details) {
                var v = $data.details[i];
                tmp.push('<tr class="itext-' + v.r + ' c">');
                tmp.push('<td><img src="/resources/themes/common/spid/spid_' + v.spid + '.png" style="    width: 16px;"></td>');
                tmp.push('<td>&nbsp;&nbsp;' + (v.code == 0 ? v.betid : v.code) + '</td>');
                tmp.push('<td class="l" '+(v.iyinfo || v.msinfo ? 'onclick="MyTicket.Details.openlivedetails('+i+');" style="cursor: pointer;"':'')+'>'+(v.iyinfo || v.msinfo ? '<img style="width: 16px;" src="/resources/themes/v1/images/arrowdown.png">':'')+'' + v.home + ' - ' + v.away + '</td>');
                tmp.push('<td>' + v.date + '</td>');
                tmp.push('<td>' + (v.hdc ? v.oyun + ' ' + v.hdc : v.oyun) + '</td>');
                tmp.push('<td>' + v.tercih + '</td>');
                tmp.push('<td>' + v.rate + '</td>');
                tmp.push('<td class="itext-' + v.l + '">' + MyTicket.Lang._yesno[v.l] + '</td>');
                tmp.push('<td><img src="/resources/themes/common/icons/16/ticket_' + v.r + '.png" alt="Statu" border="0" /></td>');
                tmp.push('<td class="l">' + v.dakika + ' ' + v.skor + '</td>');
                tmp.push('<td '+(v.iyinfo || v.msinfo ? 'onclick="MyTicket.Details.openlivedetails('+i+');" style="cursor: pointer;"':'')+'>');
                tmp.push('' + (v.ft == null ? '--' : v.ft) + '</td>');
                tmp.push('<td class="l">'+($data.owner==1 && v.ft!="İADE" ? '<img onclick="MyTicket.HelpQuestion('+MyTicket.Details._tid+','+i+',\''+v.home + ' - ' + v.away +'\',' + v.r + ');" style="cursor:pointer;" class="tooltip" src="/resources/themes/common/icons/16/remove.png" title="Maçı Düzenle" border="0" />':'--')+'</td>');
                tmp.push('</tr>');
		if(v.iyinfo || v.msinfo)
		{
                tmp.push('<tr id="ticdet_'+i+'" style="display:none;"><td colspan="12">');
		if(v.iyinfo)
		{
                tmp.push('<span style="display: block;float: left;width: 50%;"><b>İY GOLLERİ</b><br>');
                for(var ili in v.iyinfo) {
                tmp.push('' + v.iyinfo[ili] + '<br>');
		}
                tmp.push('</span>');
		}
		if(v.msinfo)
		{
                tmp.push('<span style="display: block;float: left;width: 50%;"><b>MS GOLLERİ</b><br>');
                for(var ili in v.msinfo) {
                tmp.push('' + v.msinfo[ili] + '<br>');
		}
                tmp.push('</span>');
		}
                tmp.push('</tr>');
		}
            }
            tmp.push('<tr>');
            tmp.push('<td colspan="13">');
            tmp.push('<table class="tablesorter">');
            tmp.push('<tr><td>MIKTAR</td><td><strong>' + $data.amount + '</strong></td><td>TOPLAM ORAN</td><td><strong>' + $data.trate + '</strong></td><td>KAZANC</td><td><strong>' + $data.win + '</strong></td><td>DURUM</td><td><strong>' + MyTicket.Lang._itext[$data.statu] + '</strong></td></tr>');
            if($data.system) {
                tmp.push('<tr><td>MISLI</td><td><strong>' + $data.misli + '</strong></td><td>SISTEM</td><td><strong>' + $data.system + '</strong></td><td>TOPLAM KUPON</td><td><strong>' + $data.tc + '</strong></td><td>KAZANAN KUPON</td><td><strong>' + $data.wtc + '</strong></td></tr>');
            }
            tmp.push('</table>');
            tmp.push('</td>');
            tmp.push('</tr>');
            if(User.ptip <= 3) {
                tmp.push('<tr>');
                tmp.push('<td colspan="12"><div class="notice info"><p><strong>Onay Tarihi:</strong>' + $data.date + ' <strong>İp Adresi:</strong>' + $data.ip + ' <strong>Açıklamalar:</strong>' + $data.notlar + '</p></div></td>');
                tmp.push('</tr>');
            } else if(User.ptip == 4) {
                tmp.push('<tr>');
                tmp.push('<td colspan="12"><div class="notice info"><p><strong>Onay Tarihi:</strong>' + $data.date + ' <strong>İp Adresi:</strong>' + $data.ip + '</p></div></td>');
                tmp.push('</tr>');
            } else {
                tmp.push('<tr>');
                tmp.push('<td colspan="12"><div class="notice info"><p><strong>Onay Tarihi:</strong>' + $data.date + '</p></div></td>');
                tmp.push('</tr>');
            }
            tmp.push('</tbody>');
            tmp.push('</table>');
            $.colorbox({
                title: MyTicket.Details._tid + ' Nolu Kupon Bilgileri',
                html: tmp.join('')
            });
            $('#ticket_' + MyTicket.Details._tid).attr("class", "itext-0");
        }
    },








HelpQuestion: function (coupon_id,macid,mac,statu) {
var tmp = [];
tmp.push('<table class="tablesorter" id="otherDetailsTable" style="width:400px;height:230px;margin:0;">');
tmp.push('<thead><tr><th colspan="2">'+ coupon_id +' - '+mac+' Düzenleniyor.</th></tr></thead>');
tmp.push('<tbody>');
tmp.push('<tr>');
tmp.push('<td style="width:30%;vertical-align:top">İşleminiz nedir?</td>');
tmp.push('<td style="width:70%;vertical-align:top">');
tmp.push('<div>');
tmp.push('<input type="hidden" name="couponId" value="'+ coupon_id +'" />');
tmp.push('<select id="couponNotificationType" name="type" class="inputCombo chosen" style="width:98%;">');
if(statu!=1)
{
tmp.push('<option value="1">Kazandı Yap</option>');
}
if(statu!=2)
{
tmp.push('<option value="2">Kaybetti Yap</option>');
}
if(statu!=4)
{
tmp.push('<option value="4">İade Et</option>');
}
tmp.push('</select>');
tmp.push('</div>');
tmp.push('<div id="otherDetails">');
tmp.push('Bu bölümde yaptığınız düzenleme kupona anında etki etmektedir.<br><br>Kazanmış kuponda maçı kaybetti veya iade ederseniz kullanıcı bakiyesinden kazanç geri çekilerek kupon yeniden hesaplanacaktır.');
tmp.push('<br><br>İade Edilen Maç Geri Alınamamaktadır. Lütfen Bu Bölümü Kullanırken Dikkat Ediniz.<br><br> Yapılan İşlem Sadece Bu Kupon İçin Geçerlidir.</div>');
tmp.push('<div style="width:98%;">');
tmp.push('<input type="submit" class="btn btn-small btn-primary" style="float:right;margin-top:10px;" value="Gönder" onclick="notificationSend('+coupon_id+','+macid+',couponNotificationType.value);">');
tmp.push('</div>');
tmp.push('</td>');
tmp.push('</tr>');
tmp.push('</tbody>');
tmp.push('</table>');
tmp.push('<script type="text/javascript">');
tmp.push('function notificationSend(id,macid,statu) {');
tmp.push('Page.ShowBoxLoading();');
tmp.push('var params = {');
tmp.push('cmd: \'sonucduzelt\',');
tmp.push('id: id,');
tmp.push('macid: macid,');
tmp.push('statu: statu');
tmp.push('};');
tmp.push('jQuery.ajax({');
tmp.push('url: \'/_server/user_server.php?s=3.php\',');
tmp.push('type: \'POST\',');
tmp.push('dataType: \'json\',');
tmp.push('data: params,');
tmp.push('timeout: 50000,');
tmp.push('complete: function() {},');
tmp.push('success: function(data) {');
tmp.push('if(data.success) {');
tmp.push('$.colorbox({');
tmp.push('title: id + \' Nolu Bahis Sonuc Düzeltme\',');
tmp.push('onClosed : function() {');
tmp.push('delete MyTicket.Details._cache[id];');
tmp.push('MyTicket.Details.Show(id);');
tmp.push('},');
tmp.push('html: data.results');
tmp.push('});');
tmp.push('} else {');
tmp.push('Page.HideBoxLoading();');
tmp.push('$.jGrowl(data.messages);');
tmp.push('}');
tmp.push('},');
tmp.push('error: function(response, status) {');
tmp.push('Page.HideBoxLoading();');
tmp.push('var mesaj = (status == \'timeout\') ? \'Zaman Asimi\' : \'Teknik bir hata olustu: Tür: \' + status;');
tmp.push('$.jGrowl(mesaj);');
tmp.push('}');
tmp.push('});');
tmp.push('}');
tmp.push('</script>');

$.colorbox({
title : coupon_id+' Nolu Kupona Ait Maç Düzenleme?', 
html : tmp.join(''), 
onClosed : function() {
delete MyTicket.Details._cache[coupon_id]
MyTicket.Details.Show(coupon_id);
},
onComplete: function() {
$(".chosen").chosen({
disable_search_threshold: 5,
browser_supported: function() {
return _logged_mobile==1?false:true;
}
});
$.colorbox.resize();
}
});
    },
    Cancel: function(id) {
        jConfirm('Kuponu iptal etmek istediğinizden emin misiniz?', 'KUPONU İPTAL EKRANI', function(r) {
            if(r) {
                $('#maskcontainer').mask('Tahmin iptal ediliyor.');
                var params = {
                    cmd: 'H85vR',
                    tid: id
                };
                jQuery.ajax({
                    url: '/_server/user_server.php?s=' + User.ptip + '.php',
                    type: 'POST',
                    dataType: 'json',
                    data: params,
                    timeout: 50000,
                    complete: function() {},
                    success: function(data) {
                        $('#maskcontainer').unmask();
                        if(data.success) {
                            $('#ticket_' + id).animate({
                                opacity: 0.3
                            }, 300).animate({
                                opacity: 1
                            }, 300).animate({
                                opacity: 0.3
                            }, 300).animate({
                                opacity: 1
                            }, 300).animate({
                                opacity: 0.3
                            }, 300).fadeOut();
                            $.jGrowl(data.results, {
                                sticky: true,
                                header: data.title
                            });
                        } else {
                            $.jGrowl(data.messages, {
                                sticky: true,
                                header: data.title
                            });
                        }
                    },
                    error: function(response, status) {
                        $('#maskcontainer').unmask();
                        var mesaj = (status == 'timeout') ? 'Zaman Asimi' : 'Teknik bir hata olustu: Tür: ' + status;
                        $.jGrowl(mesaj);
                    }
                });
            }
        });
    },
    RTC: function(id) {
        jConfirm('Müsabakayı iptal etmek istediğinizden emin misiniz?', 'MAÇ İPTAL EKRANI', function(r) {
            if(r) {
                $('#TdaHS54').mask('Oran iptal ediliyor.Lütfen bekleyiniz');
                var params = {
                    cmd: 'H85ATD',
                    rid: id,
                    kid: kid
                };
                jQuery.ajax({
                    url: '/_server/user_server.php?s=' + User.ptip + '.php',
                    type: 'POST',
                    dataType: 'json',
                    data: params,
                    timeout: 50000,
                    complete: function() {},
                    success: function(data) {
                        delete MyTicket.Details._cache[MyTicket.Details._tid];
                        $('#TdaHS54').unmask();
                        if(data.success) {
                            $.jGrowl(data.results, {
                                sticky: true,
                                header: data.title
                            });
                        } else {
                            $.jGrowl(data.messages, {
                                sticky: true,
                                header: data.title
                            });
                        }
                    },
                    error: function(response, status) {
                        $('#TdaHS54').unmask();
                        var mesaj = (status == 'timeout') ? 'Zaman Asimi' : 'Teknik bir hata olustu: Tür: ' + status;
                        $.jGrowl(mesaj);
                    }
                });
            }
        });
    },
    Report: function(id) {
        Page.ShowBoxLoading();
        var params = {
            cmd: 'gY80vK',
            id: id
        };
        jQuery.ajax({
            url: '/_server/user_server.php?s=' + User.ptip + '.php',
            type: 'POST',
            dataType: 'json',
            data: params,
            timeout: 50000,
            complete: function() {},
            success: function(data) {
                if(data.success) {
                    $.colorbox({
                        title: id + ' Nolu Kuponun Hesap Hareketleri',
                        html: data.results
                    });
                } else {
                    Page.HideBoxLoading();
                    $.jGrowl(data.messages);
                }
            },
            error: function(response, status) {
                Page.HideBoxLoading();
                var mesaj = (status == 'timeout') ? 'Zaman Asimi' : 'Teknik bir hata olustu: Tür: ' + status;
                $.jGrowl(mesaj);
            }
        });
    },
    TVReport: function(id) {
        Page.ShowBoxLoading();
        var params = {
            cmd: 'KBV585Xr',
            id: id
        };
        jQuery.ajax({
            url: '/_server/user_server.php?s=' + User.ptip + '.php',
            type: 'POST',
            dataType: 'json',
            data: params,
            timeout: 50000,
            complete: function() {},
            success: function(data) {
                if(data.success) {
                    $.colorbox({
                        title: id + ' Nolu Biletin Hesap Hareketleri',
                        html: data.results
                    });
                } else {
                    Page.HideBoxLoading();
                    $.jGrowl(data.messages);
                }
            },
            error: function(response, status) {
                Page.HideBoxLoading();
                var mesaj = (status == 'timeout') ? 'Zaman Asimi' : 'Teknik bir hata olustu: Tür: ' + status;
                $.jGrowl(mesaj);
            }
        });
    },
    Pay: function(id, status) {
        if(status == 1) {
            $.jGrowl('Bu kuponun ödemesi zaten yapılmıştır', {
                sticky: true,
                header: 'ÖDEME HATASI'
            });
            return;
        }
        jConfirm('Kuponun ödemesini yapmak istediğinizden emin misiniz?', 'ÖDEME ONAY EKRANI', function(r) {
            if(r) {
                Page.ShowBoxLoading('Kupon ödemesi işleniyor...');
                var params = {
                    cmd: 'YTbgTe',
                    tid: id
                };
                Form.PostJSON('/_server/user_server.php?s=' + User.ptip + '.php', params, MyTicket.PayCallback);
            }
        });
    },
    PayCallback: function(json) {
        Page.HideBoxLoading();
        if(json.success) {
            $('#ticketpay_' + json.results.ticketid).html('<img src="/resources/themes/common/icons/16/ticketpay_1.png" alt="Ödendi" border="0" />');
            jAlert(json.results.messages, json.title);
        } else {
            jAlert(json.messages, json.title);
        }
    },
    tv: {
        _tid: 0,
        _cache: {},
        Load: function() {
            Page.ShowBoxLoading();
            var params = {
                cmd: 'GTV54Hb',
                tid: MyTicket.tv._tid
            };
            jQuery.post('/_server/user_server.php?s=' + User.ptip + '.php', params, function(json) {
                if(json.success) {
                    MyTicket.tv._cache[MyTicket.tv._tid] = json.results;
                    MyTicket.tv.Render();
                } else {
                    Page.HideBoxLoading();
                    jAlert(json.messages, json.title);
                }
            }, "json");
        },
        Show: function(tid) {
            MyTicket.tv._tid = tid;
            if(MyTicket.tv._cache[tid]) {
                MyTicket.tv.Render();
                return;
            }
            MyTicket.tv.Load();
        },
        Render: function() {
            var $data = MyTicket.tv._cache[MyTicket.tv._tid];
            var tmp = [];
            tmp.push('<table class="tablesorter" border="0" cellpadding="0" cellspacing="1">');
            tmp.push('<tbody>');
            tmp.push('<tr class="l">');
            tmp.push('<td>TARIH</td>');
            tmp.push('<td>' + $data.date + '</td>');
            tmp.push('</tr>');
            tmp.push('<tr class="l">');
            tmp.push('<td>DURUM</td>');
            tmp.push('<td class="itext-' + $data.statu + '">' + MyTicket.Lang._itext[$data.statu].toUpperCase() + '</td>');
            tmp.push('</tr>');
            tmp.push('<tr class="l">');
            tmp.push('<td>OYUN</td>');
            tmp.push('<td>' + $data.gname.toUpperCase() + '</td>');
            tmp.push('</tr>');
            tmp.push('<tr class="l">');
            tmp.push('<td>TOPLAR</td>');
            tmp.push('<td>' + $data.toplar + '</td>');
            tmp.push('</tr>');
            tmp.push('<tr class="l">');
            tmp.push('<td>SONUCLAR</td>');
            tmp.push('<td>' + $data.gtoplar + '</td>');
            tmp.push('</tr>');
            tmp.push('<tr class="l">');
            tmp.push('<td>MIKTAR</td>');
            tmp.push('<td>' + $data.amount + '</td>');
            tmp.push('</tr>');
            tmp.push('<tr class="l">');
            tmp.push('<td>ORAN</td>');
            tmp.push('<td>' + $data.rate + '</td>');
            tmp.push('</tr>');
            tmp.push('<tr class="l">');
            tmp.push('<td>KAZANC</td>');
            tmp.push('<td>' + $data.win + '</td>');
            tmp.push('</tr>');
            tmp.push('</tbody>');
            tmp.push('</table>');
            $.colorbox({
                title: MyTicket.tv._tid + ' Nolu Oyun Tv Kuponu',
                html: tmp.join('')
            });
            $('#ticket_' + MyTicket.tv._tid).attr("class", "itext-0");
        }
    },
    vfl: {
        _tid: 0,
        _cache: {},
        Load: function() {
            Page.ShowBoxLoading();
            var params = {
                cmd: 'KN12TYb',
                tid: MyTicket.vfl._tid
            };
            jQuery.post('/_server/user_server.php?s=' + User.ptip + '.php', params, function(json) {
                if(json.success) {
                    MyTicket.vfl._cache[MyTicket.vfl._tid] = json.results;
                    MyTicket.vfl.Render();
                } else {
                    Page.HideBoxLoading();
                    jAlert(json.messages, json.title);
                }
            }, "json");
        },
        Show: function(tid) {
            MyTicket.vfl._tid = tid;
            if(MyTicket.vfl._cache[tid]) {
                MyTicket.vfl.Render();
                return;
            }
            MyTicket.vfl.Load();
        },
        Render: function() {
            var $data = MyTicket.vfl._cache[MyTicket.vfl._tid];
            var tmp = [];
            tmp.push('<table class="tablesorter direct-rtl" border="0" cellpadding="0" cellspacing="1">');
            tmp.push('<thead>');
            tmp.push('<tr>');
            tmp.push('<th></th>');
            tmp.push('<th>Kod</th>');
            tmp.push('<th>Evsahibi</th>');
            tmp.push('<th>Deplasman</th>');
            tmp.push('<th>Oyun</th>');
            tmp.push('<th>Tercih</th>');
            tmp.push('<th>Oran</th>');
            tmp.push('<th>Hafta</th>');
            tmp.push('<th>Durum</th>');
            tmp.push('<th>Skor</th>');
            tmp.push('<th></th>');
            tmp.push('</tr>');
            tmp.push('</thead>');
            tmp.push('<tbody>');
            for(var i in $data.details) {
                var v = $data.details[i];
                tmp.push('<tr class="itext-' + v.r + ' c">');
                tmp.push('<td><img src="/resources/themes/common/spid/spid_1.png"></td>');
                tmp.push('<td>&nbsp;&nbsp;' + v.eid + '</td>');
                tmp.push('<td>' + v.home + '</td>');
                tmp.push('<td>' + v.away + '</td>');
                tmp.push('<td>' + (v.hdc ? v.oyun + ' ' + v.hdc : v.oyun) + '</td>');
                tmp.push('<td>' + v.tercih + '</td>');
                tmp.push('<td>' + v.rate + '</td>');
                tmp.push('<td>' + v.hafta + '</td>');
                tmp.push('<td>' + MyTicket.Lang._itext[v.r] + '</td>');
                tmp.push('<td class="l">' + v.skor + '</td>');
                tmp.push('<td style="background:url(/resources/themes/v1/images/istatistik.png) no-repeat center center;cursor:pointer;width:20px;" onclick="Page.Popup(\'https://vfl.betradar.com/s4/?clientid=569&amp;language=en&amp;matchid=' + v.eid + '\');void(0);"></td>');
                tmp.push('</tr>');
            }
            tmp.push('</tbody>');
            tmp.push('</table>');
            tmp.push('<div class="middle"><div class="informer"> <a href="#"> <span class="title">' + $data.amount + '</span> <span class="text">MIKTAR</span> </a> </div> <div class="informer"> <a href="#"> <span class="title">' + $data.trate + '</span> <span class="text">TOPLAMORAN</span> </a> </div> <div class="informer"> <a href="#"> <span class="title">' + $data.win + '</span> <span class="text">KAZANC</span> </a> </div> <div class="informer"> <a href="#"> <span class="title">' + MyTicket.Lang._itext[$data.statu] + '</span> <span class="text">DURUM</span> </a> </div> </div>');
            tmp.push('<p style="text-align:left;text-indent:20px;background-color:#303;padding:6px;color:#fff;font-weight:bold;font-size:14px;">Tarih: ' + $data.date + '</p>');
            $.colorbox({
                title: MyTicket.vfl._tid + ' Nolu Sanal Futbol Kuponu',
                html: tmp.join('')
            });
            $('#ticket_' + MyTicket.vfl._tid).attr("class", "itext-0");
        }
    }
};
var Page = {
    div: {
        0: 'main_container',
        1: 'maskcontainer',
        2: 'ajax_alan'
    },
    pagedeep: 0,
    mainurl: {},
    Init: function() {},
    Save: function(url) {
        Page.SetLink(url);
    },
    SetLink: function(url) {
        if(Page.mainurl[Page.pagedeep] != url) {
            Page.pagedeep++;
            Page.mainurl[Page.pagedeep] = url;
        }
    },
    DeleteLink: function(pagedeep) {
        delete Page.mainurl[pagedeep];
    },
    GetLink: function(url) {
        Page.SetLink(url);
        Page.GetLoader(Page.mainurl[Page.pagedeep]);
    },
    Back: function() {
        if(Page.pagedeep > 1) {
            Page.DeleteLink(Page.pagedeep);
            Page.pagedeep--;
            Page.GetLoader(Page.mainurl[Page.pagedeep]);
        }
        return;
    },
    GetLoader: function(url, divid) {
        divid = (typeof divid == "undefined") ? 1 : divid;
        jQuery('#' + Page.div[divid]).mask('Sayfa yükleniyor.');
        url = url + '&returnajax=1&nocache=' + (new Date()).getTime();
        jQuery.get(url, function(data) {
            jQuery('#' + Page.div[divid]).html(data);
            jQuery('#' + Page.div[divid]).unmask();
            $(".chosen").chosen({
                disable_search_threshold: 10
            });
        });
    },
    RefreshLink: function() {
        Page.GetLoader(Page.mainurl[Page.pagedeep]);
    },
    ShowBoxLoading: function(str) {
        str = (typeof str == "undefined") ? '' : '<span class="itext-3 c">' + str + '<span>';
        $.colorbox({
            title: 'Yükleniyor...',
            html: '<div style="display:block;width:178px;height:105px;background:#fff url(/resources/themes/common/icons/loading/loading_overlay.gif) no-repeat center center;">' + str + '</div>',
            overlayClose: false
        });
    },
    HideBoxLoading: function() {
        $.colorbox.close();
    },
    BoxGetLink: function(url) {
        Page.GetLoader(url, 2);
    },
    BoxAjaxLoader: function(url, title, width, height) {
        this.ShowBoxLoading();
        jQuery.get(url, function(response) {
            $.colorbox({
                title: title,
                width: width,
                height: height,
                html: response
            });
        });
    },
    BoxFrameLoader: function(url, title, width, height) {
        title = (typeof title == "undefined") ? '' : title;
        width = (typeof width == "undefined") ? '80%' : width;
        height = (typeof height == "undefined") ? '85%' : height;
        $.colorbox({
            iframe: true,
            width: width,
            height: height,
            top: 20,
            scrolling: true,
            title: title,
            'href': url
        });
    },
    Popup: function(url, name, width, height, top, left, status) {
        if((typeof name) == "undefined") {
            name = "popup_" +
                Lib.Utils.RandStr(8);
        }
        if((typeof width) == "undefined") width = 760;
        if((typeof height) == "undefined") height = 540;
        if((typeof top) == "undefined") top = 10;
        if((typeof left) == "undefined") left = 50;
        if((typeof status) == "undefined") status = "yes";
        var params = "toolbar,scrollbars,resizable" + ",width=" + width + ",height=" + height + ",top=" + top + ",left=" + left + ",status=" + status;
        var popwin = window.open(url, name, params);
        popwin.focus();
    },
    ConfirmGetLink: function(confirm, url) {
        jConfirm(confirm, 'ONAY EKRANI', function(r) {
            if(r) {
                Page.GetLink(url);
            }
        });
    },
    ConfirmGo: function(confirm, url) {
        jConfirm(confirm, 'ONAY EKRANI', function(r) {
            if(r) {
                window.top.location = url;
            }
        });
    },
    HelpBox: function(type, content) {
        $.colorbox({
            html: '<div id="dvHelpBoxTemplate" class="type' + type + '">' + content + '</div>',
            escKey: false,
            overlayClose: false,
            onLoad: function() {
                $('#cboxClose').remove();
            }
        });
    }
};
var Form = {
    Submit: function(formname, divid) {
        divid = (typeof divid == "undefined") ? 1 : divid;
        var form = jQuery('#' + formname);
        var data = jQuery(form).serialize();
        var url = jQuery(form).attr("action");
        var method = jQuery(form).attr("method");
        data = data + '&returnajax=1&nocache=' + (new Date()).getTime();
        if(method == 'get' && divid == 1) {
            Page.SetLink(url + '?' + data);
        }
        jQuery('#' + Page.div[divid]).mask('İşleminiz gerçekleştiriliyor bekleyiniz.');
        jQuery.ajax({
            url: url,
            type: method,
            dataType: 'text',
            data: data,
            timeout: 50000,
            complete: function() {},
            success: function(data) {
                jQuery('#' + Page.div[divid]).html(data);
                jQuery('#' + Page.div[divid]).unmask();
                if(divid > 1) {
                    $.colorbox.resize();
                }
                $(".chosen").chosen({
                    disable_search_threshold: 10
                });
            },
            error: function(response, status) {
                var mesaj = (status == 'timeout') ? 'Zaman Asimi' : 'Tanimlanamayan Hata';
                jAlert(mesaj, '', 'HATA RAPORU');
                jQuery('#' + Page.div[divid]).unmask();
            }
        });
    },
    Confirm: function(form) {
        jConfirm('Eylemi uygulamak istediginizden eminmisiniz?', 'ONAY EKRANI', function(r) {
            if(r) {
                Form.Submit(form);
            }
        });
    },
    Checkall: function(form, check) {
        for(var i = 0; i < form.elements.length; i++) {
            if(form.elements[i].type == 'checkbox') {
                form.elements[i].checked = check;
            }
        }
    },
    PostJSON: function(url, data, callback) {
        jQuery.post(url, data, callback, "json");
    }
};
var ServerTime = {
    _diff: 0,
    _interval: null,
    _tstamp: 0,
    Render: function() {
        ServerTime._tstamp++;
        var cTime = new Date();
        var sTime = new Date(cTime.setMilliseconds(cTime.getMilliseconds() - ServerTime._diff));
        $('#tarih').html(Lib.Utils.Date.FormatDateTime(sTime));
        $('#tarihbar').html(Lib.Utils.Date.FormatDateTime(sTime).split(' ')[1]);
    },
    Start: function(t) {
        if(this._interval) {
            clearInterval(this._interval);
            this._diff = 0;
        }
        var sTime = Lib.Utils.Date.ParseDataDate(t);
        var cTime = new Date();
        this._diff = cTime - sTime;
        $('#tarih').html(Lib.Utils.Date.FormatDateTime(sTime)).show();
        this._interval = setInterval(this.Render, 1000);
    },
    Stop: function() {
        clearInterval(this._interval);
    },
    GetDate: function() {
        var cTime = new Date();
        cTime.setMilliseconds(cTime.getMilliseconds() - this._diff);
        return cTime;
    },
    GetUnixTimeStamp: function() {
        var cTime = new Date();
        var sTime = new Date(cTime.setMilliseconds(cTime.getMilliseconds() - ServerTime._diff));
        return Math.round(sTime.getTime() / 1000);
    },
    GetTimeStamp: function() {
        return ServerTime._tstamp;
    },
    GetHumanTime: function(t_date) {
        var date = Lib.Utils.Date.Parse(t_date);
        var strTime = (date.getHours().toString().length > 1 ? date.getHours() : "0" + date.getHours()) + ":" + (date.getMinutes().toString().length > 1 ? date.getMinutes() : "0" + date.getMinutes()) + ":" + (date.getSeconds().toString().length > 1 ? date.getSeconds() : "0" + date.getSeconds());
        var strDate = (date.getDate().toString().length > 1 ? date.getDate() : "0" + date.getDate()) + "." + ((date.getMonth() + 1).toString().length > 1 ? (date.getMonth() + 1) : "0" + (date.getMonth() + 1)) + "." + date.getFullYear() + ' ' + strTime;
        var dif = ServerTime.getDate().getTime() - date.getTime();
        var digit = Math.floor(dif / 31536000000);
        if(digit > 0) {
            return {
                htime: digit + " yıl önce",
                date: strDate
            };
        }
        digit = Math.floor(dif / 2592000000);
        if(digit > 0) {
            return {
                htime: digit + " ay önce",
                date: strDate
            };
        }
        digit = Math.floor(dif / 604800000);
        if(digit > 0) {
            return {
                htime: digit + " hafta önce",
                date: strDate
            };
        }
        digit = Math.floor(dif / 86400000);
        if(digit > 0) {
            if(digit == 1) {
                return {
                    htime: "dün",
                    date: strDate
                };
            }
            return {
                htime: digit + " gün önce",
                date: strDate
            };
        }
        digit = Math.floor(dif / 3600000);
        if(digit > 0) {
            return {
                htime: digit + " saat önce",
                date: strDate
            };
        }
        digit = Math.floor(dif / 60000);
        if(digit > 0) {
            return {
                htime: digit + " dakika önce",
                date: strDate
            };
        }
        digit = Math.floor(dif / 1000);
        return {
            htime: digit + " saniye önce",
            date: strDate
        };
    }
};
var isNN = (navigator.appName.indexOf("Netscape") != -1);

function autoTab(input, len, e) {
    var keyCode = (isNN) ? e.which : e.keyCode;
    var filter = (isNN) ? [0, 8, 9] : [0, 8, 9, 16, 17, 18, 37, 38, 39, 40, 46];
    if(input.value.length >= len && !containsElement(filter, keyCode)) {
        input.value = input.value.slice(0, len);
        input.form[(getIndex(input) + 1) % input.form.length].focus();
    }

    function containsElement(arr, ele) {
        var found = false,
            index = 0;
        while(!found && index < arr.length)
            if(arr[index] == ele)
                found = true;
            else
                index++;
        return found;
    }

    function getIndex(input) {
        var index = -1,
            i = 0,
            found = false;
        while(i < input.form.length && index == -1)
            if(input.form[i] == input) index = i;
            else i++;
        return index;
    }
    return true;
}
$(document).ready(function() {
    Server.Init();
    Server.Ctrl('L', function(s) {
        User.Logout();
    });
});