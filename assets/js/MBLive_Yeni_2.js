 var Live = {
     liveserver: '/ajax/ply.php',
     xmlserver: '/ajax/root_json.php',
     menuserver: '/ajax/root_liste_mobil.php',
     interval: null,
     refresh: 10 * 1000,
     oldscores: {},
     bets: {},
     premacht:1,
     genelgor:0,
     betse: {},
     webtype:"",
     betgame: {},
     myfavs : {},
     betsgameski : new Array(),
     country: {},
     maxliveodd: 0,
     countryhidemain: new Array(),
     countryhide: new Array(),
     countrycountbets: new Array(),
     livedata: {},
     basketo:{},
     fhirstmatch:0,
     livefavs: {},
     cks: 0,
     diff: 0,
     soundgoal: 1,
     showlines: 1,
     closesound: 0,
     showists: 0,
     lang:"tr",
     csb:"com",
     utc:0,
     lm: 90,
     serverdate: '0000-00-00 00:00:00',
     stamp: 0,
     spids: {
         4: {
             'spidid': 1,
             'spidname': 'FUTBOL',
             'active': '1',
	     'icontype':'soccer'	
         },
         7: {
             'spidid': 5,
             'spidname': 'BASKETBOL',
             'active': '1',
	     'icontype':'basketball'
         },
         5: {
             'spidid': 7,
             'spidname': 'TENİS',
             'active': '1',
	     'icontype':'tennis'
         },
         56: {
             'spidid': 22,
             'spidname': 'MASA TENİSİ',
             'active': '1',
	     'icontype':'mtennis'
         },
         18: {
             'spidid': 18,
             'spidname': 'VOLEYBOL',
             'active': '1',
	     'icontype':'mtennis'
         },
         12: {
             'spidid': 12,
             'spidname': 'BUZ HOKEYİ',
             'active': '1',
	     'icontype':'mtennis'
         }
     },
     orktr: 0,
     cborktr: 0,
     agames: {},
     idcol: {},
     tvip: '',
matchView: function(bgh)
{
$('#mobile_content .page').hide();
$('#LivesBox').show();
$('.footer .selected').removeClass('selected');
$('#footerLive').addClass('selected');
if(bgh=="1" && Live.fhirstmatch>0)
{
Live.Details.Open(Live.fhirstmatch);
}else{
Live.genelgor="1";
Live.Render();
Live.Details.Stop();
}
},
     Play: function() {
	if($.cookie("closesound"))
	{
	Live.closesound=$.cookie("closesound");
	if(Live.closesound=="1")
	{
	$('#showsound .soundcom span').addClass('sound5');
	$('#topsound').html('<a style="line-height: 18px;" onclick="javascript:Live.SoundChange(0);"><div class="soundcom"><span class="soundon"></span></div>Sesi Aç</a>');
	}
	}
	if($.cookie("soundgoal"))
	{
	Live.soundgoal=$.cookie("soundgoal");
	}
         Live.GetJsonGames();
          },
     Addfavevent: function(xc,hv) {
	if(xc=="rem")
	{
        delete Live.myfavs[hv];
	}else{
     	Live.myfavs[hv]=hv;
	}
	Live.Render();
     },
     adfavs: function(cv) {
         Live.livefavs[cv]=1;
	 $('#stars_'+cv).fadeOut();
	 document.getElementById("stars_"+cv).src="/resources/themes/common/icons/16/star_2.png";
	 $('#stars_'+cv).fadeIn();
	 if(Live.Details.data)
	 {
	 Live.Details.JsonParser(Live.Details.data);
	 }
     },
     Toogleliveist: function(vc) {
	if(Live.showists=="0")
	{
	$('.check_stat').addClass('on');
	Live.showists=1;
	}else{
	$('.check_stat').removeClass('on');
	Live.showists=0;
	}
     },
     SoundChars: function() {
	$("#dropsound").toggle();
     },
     SoundChange: function(x) {
	
     	},
	homeawaychange: function(h,a,o) {
        o = o.replace(h,'1.Takım ');
        o = o.replace(a,'2.Takım ');
        o = o.replace('  (Women) ',' ');
	return o;
     },
	homeawaysil: function(h,a,ox) {
        ox = ox.replace(h,'');
        ox = ox.replace(a,'');
        ox = ox.replace('  (Women) ','');
	return ox;
     },
     remfavs: function(cv) {
         Live.livefavs[cv]=false;
	 $('#stars_'+cv).fadeOut();
	 document.getElementById("stars_"+cv).src="/resources/themes/common/icons/16/star_4.png";
	 $('#stars_'+cv).fadeIn();
	 if(Live.Details.data)
	 {
	 Live.Details.JsonParser(Live.Details.data);
	 }
     },
     HideCountry: function() {
         for (var v in Live.countryhide) {
             $('#livecountryid_' + v).hide();
             $('#livecountrybetscount_' + v).text('(' + Live.countrycountbets[v] + ')').show();
             $('#livecountrytoogleclass_' + v).addClass("CountryOpenIcon");
         }
     },
     HideCountrymain: function() {
         for (var v in Live.countryhidemain) {
             $('#livecountryidmain_' + v).hide();
             $('#headctymain_' + v).addClass('collapsed');
         }
     },
     ToggleCountrymain: function(divid) {
         if (Live.countryhidemain[divid]) {
             delete Live.countryhidemain[divid];
             $('#livecountryidmain_' + divid).slideDown();
             $('#headctymain_' + divid).removeClass('collapsed');
         } else {
             $('#livecountryidmain_' + divid).slideUp();
             Live.countryhidemain[divid] = divid;
             $('#headctymain_' + divid).addClass('collapsed');
         }
     },
     ToggleCountry: function(divid) {
         if (Live.countryhide[divid]) {
             delete Live.countryhide[divid];
             $('#livecountryid_' + divid).show();
             $('#livecountrybetscount_' + divid).hide();
             $('#livecountrytoogleclass_' + divid).removeClass("CountryOpenIcon");
         } else {
             $('#livecountryid_' + divid).hide();
             $('#livecountrybetscount_' + divid).text('(' + Live.countrycountbets[divid] + ')').show();
             Live.countryhide[divid] = divid;
             $('#livecountrytoogleclass_' + divid).addClass("CountryOpenIcon");
         }
     },
     GetJson: function() {
         $.ajax({
             type: "GET",
             url: Live.menuserver + '?&cmd=main&spid=4,7&csb='+Live.csb+'&lang='+Live.lang+'&zfz=' + new Date().getTime(),
             dataType: "json",
             timeout: 10000,
             success: function(data) {
		 if(data.response)
		 {
		 Live.GetJsonGames(data);
		 }
                 Live.interval = window.setTimeout(Live.GetJson, 15 * 1000);
             },
             error: function(xhr, ajaxOptions, thrownError) {
                 if (xhr.statusText == "OK") {
                     Live.interval = window.setTimeout(Live.GetJson, 30 * 1000);
                 } else {
                     Live.interval = window.setTimeout(Live.GetJson, 30 * 1000);
                 }
             }
         });
     },
     GetJsonGames: function() {
         $.ajax({
             type: "GET",
             url: Live.menuserver + '?&cmd=main&spid=4,7&csb='+Live.csb+'&lang='+Live.lang+'&zfz=' + new Date().getTime(),
             dataType: "json",
             timeout: 15000,
             success: function(data) {
                 Live.Parsergames(data);
                 Live.interval = window.setTimeout(Live.GetJsonGames, 25 * 1000);
             },
             error: function(xhr, ajaxOptions, thrownError) {
                 if (xhr.statusText == "OK") {
                     Live.interval = window.setTimeout(Live.GetJsonGames, 30 * 1000);
                 } else {
                     Live.interval = window.setTimeout(Live.GetJsonGames, 30 * 1000);
                 }
             }
         });
     },
     GetToken: function() {
         $.ajax({
             type: "GET",
             url: Live.xmlserver + '?&cmd=token&csb='+Live.csb+'&zfz=' + new Date().getTime(),
             dataType: "json",
             timeout: 10000,
             success: function(data) {
             }
         });
     },
     Stop: function() {
         clearInterval(Live.interval);
         Live.livedata = {};
     },
     Parsergames: function(data) {
     $betsgam = {};
     $betsgameski = {};
     $boyunlar = {};
         $bets = {};
	 $countrys={};
         $country = {};
	 $countrys[4]={};
	 $countrys[7]={};
	 $countrys[5]={};
	 $countrys[56]={};
	 $countrys[18]={};
	 $countrys[12]={};
         var jsong = data;
	 $.each(jsong, function(m, p) {
	 if (Live.spids[p.spid] && Live.spids[p.spid].active==1) 
	 {
         var eid = parseInt(p.id);
         var hteam = p.h;
         var ateam = p.a;
         var team = p.tkm;
         var egamesd = p.live;
         var league = p.lname;
         var country = p.unamemobil;
         var reftimeutc = p.stps;
         var countrycode = p.unamemobil.toLowerCase();
         var countryid = parseInt(p.uid);
         var startdate = parseInt(p.stps);
         var datemk = p.tarih;
         var timemk = (parseInt(p.stps)*1000);
	 var radarid = p.radarid;
	 var redh_ver = p.redh;
	 var reda_ver = p.reda;
	 var matchsimulation = p.smid;
	 var leagueid = p.lid;
	 var sht = p.sht;
	 var red1team = 0;
	 var red2team = 0;
	 var status = 1;
	 var spid =parseInt(p.spid);
	 var tvid = p.tv;
	 var pid = parseInt(p.pid ? p.pid:'0');            
         $bets[eid] = {
		     eid:eid,
                     status: status,
                     pid: (p.pid ? p.pid:'0'),
                     team: team,
                     hteam: hteam,
                     ateam: ateam,
                     timemk: timemk,
                     league: league,
                     sht: sht,
		     red1t:red1team,
		     red2t:red2team,
                     country: country,
		     diftext:sht,
                     countryid: countryid,
                     radarid: radarid,
                     startdate: startdate,
		     datemk:datemk,
                     spid: p.spid,
                     diff: (p.dk ? p.dk:'0'),
                     sch: (p.sch ? p.sch:'0'),
                     sca: (p.sca ? p.sca:'0'),
                     isch: (p.isch ? p.isch:'0'),
                     isca: (p.isca ? p.isca:'0'),
					 redh: (redh_ver ? redh_ver:'0'),
					 reda: (reda_ver ? reda_ver:'0'),
                     ph: p.periodsh,
                     pa: p.periodsa,
		     periodtext:Live.GetPeriyod(spid, pid),
                     startdate: startdate,
                     running: p.run,
                     vc: p.tv,
                     videoid: p.tv,
                     matchsimulation: matchsimulation,
                     games: {}
                 };
                 if (Live.livedata[eid]) {
                     $bets[eid].status = Live.livedata[eid].status;
                 }
                 if (!$countrys[spid][countryid]) {
                     $countrys[spid][countryid] = {
                         countryname: country,
						 countryids: countryid,
                         bets: {}
                     };
                 }
                 $countrys[spid][countryid].bets[eid] = eid;
		 if(p.pid>0)
		 {
          	 $bets[eid].sch = p.sch;
                 $bets[eid].sca = p.sca;
                 }
	 $oyunlars = {};
	 $boyunlar[eid] = {};
	 $betsgameski[eid] = {};
 	 if (typeof p.live != 'undefined') {
 	 $.each(p.live, function(y, r) {
	 var gid = parseInt(r.tempid);
	 if (Live.agames[gid]) {
                             var bgid = parseInt(r.id);
                             var oyunad = r.N;
                             var statu = r.o;
                             var colum = r.games.length;
                             var oranlar = {};
                             var count = 0;
                                 $.each(r.games, function(kk, odds) {
                                     brid = parseInt(odds.Id);
                                     oran = parseFloat(odds.Odds).toFixed(2);
                                     ostatu = odds.Visible;
                                     tercih = odds.Name;
                                     tercihs = (odds.Name1x2 ? odds.Name1x2:odds.Name);
                                     if (ostatu) {
                                         oranlar[brid] = {
                                             brid: brid,
					     image: Live.Details.OddsArrows(eid,Live.agames[gid], brid,Live.OddsFixed(oran)),
                                             oran: Live.GetFixedrates(p.spid,oran),
                                             tercih: tercih,
                                             tercihs: tercihs,
                                             statu: ostatu
                                         };
                                         count++;
                                     }
                                 });
				if (!Live.Details.golbet[Live.agames[gid]]) {
                                 $oyunlars[Live.agames[gid]] = {
                                     bgid: bgid,
                                     gid: Live.agames[gid],
                                     oyunad: oyunad,
                                     statu: statu,
                                     colum: colum,
                                     count: count,
                                     oranlar: oranlar
                                 };
                             }
if($bets[eid])
{
$betsgam[eid] = $oyunlars;
$bets[eid].games=$oyunlars;
}
}
});
}
}
});
	 Live.betgame=$betsgam;
 	 Live.bets = $bets;
         Live.country = $countrys;
         Live.GetLiveData();
     },
     GetFixedrates: function(spid,rate) {
	if(spid==4)
	{
	rate = Live.OddsFixed(rate);
	}else if(spid==7){
	rate = Live.OddsFixedcb(rate);
	}else if(spid==5){
	rate = Live.OddsFixedct(rate);
	}else if(spid==18){
	rate = Live.OddsFixedcv(rate);
	}else if(spid==12){
	rate = Live.OddsFixedcbuz(rate);
	}else if(spid==56){
	rate = Live.OddsFixedcmt(rate);
	}else{
	rate = Live.OddsFixedcbd(rate);
	}



     return rate;
     },
     GetLiveData: function() {
         if (typeof Live.bets != 'undefined') {
             var rquery = '';
             for (var i in Live.bets) {
                 rquery += i + ',';
             }
             rquery = rquery.substring(0, (rquery.length - 1));
             var params = {
                 liveids: rquery,
                 cks: Live.cks,
                 parnt: '10831',
                 token: '82228824f5f57374559ed8fc69015733',
                 cmd: 'getlivedata'
             };
             $.post(Live.liveserver, params, function(json) {
                 if (json.success) {
                     jQuery.each(json.results, function(k, n) {
                         Live.livedata[n.liveid] = {
                             status: n.aktif
                         };
			 if(Live.bets[n.liveid])
			 {
                         Live.bets[n.liveid].status = n.aktif;
			 }
                     });
                    Live.RenderHome();Live.Render();
                 } else {
                     if (json.messages == 'CKS') {
                         Live.Stop();
                     }
                     $('#cbetnum').html('0');
                     $('#liveEventsRight').empty().html('<div class="kupon-bos" style="background-color:#FEC337"><div class="kupon-bos-text">Canlı Bahis Bulunmuyor</div></div>');
                 }
             }, 'json');
         }
     },
     FixTo: function(t) {
         return t.toString().length < 2 ? '0' + t : t;
     },
     FixDate: function(date) {
         var date = Lib.Utils.Date.ParseDataDate(date);
         date.setHours(date.getHours() + Live.diff);
         return date;
     },
     FixHours: function(date) {
         var date = new Date(date);
         return Live.FixTo(date.getHours()) + ':' + Live.FixTo(date.getMinutes());
     },
     FixTime: function(diff) {
    var minute = Live.FixTo(parseInt(Live.utc + diff / 60));
    var seconds = Live.FixTo(diff % 60);
    return minute;
	},
     FixMinute: function(diff) {
         var minute = Live.FixTo(parseInt(diff / 60));
         return minute;
     },
    Difference: function(a, b, c, d) {
    var add = 0;
    if (parseInt(c) > 0) {
        add = parseInt(c);
    }
    if (!b) return add;
    return ServerTime.GetUnixTimeStamp() - Math.round(d / 1000) + add;
    },
     GetPeriyod: function(spid, pid) {
        var periyodname = "";
         switch (spid) {
             case 4:
                 switch (pid) {
                     case 0:
                         periyodname = 'Başlamadı';
                         break;
                     case 1:
                         periyodname = '1.Devre';
                         break;
                     case 2:
                         periyodname = 'Devre Arası';
                         break;
                     case 3:
                         periyodname = '2.Devre';
                         break;
                     case 4:
                         periyodname = 'Uzatmaya Gitti';
                         break;
                     case 5:
                         periyodname = '1.Uzatmalar';
                         break;
                     case 6:
                         periyodname = 'Uzatma Arası';
                         break;
                     case 7:
                         periyodname = '2.Uzatmalar';
                         break;
                     case 8:
                         periyodname = 'Uzatmalar Bitti';
                         break;
                     case 9:
                         periyodname = 'Penaltılar';
                         break;
                     case 255:
                         periyodname = 'Bitti';
                         break;
                     default:
                         periyodname = 'Error';
                 }
                 break;
               case 7:
                 switch (pid) {
                     case 0:
                         periyodname = 'Başlamadı';
                         break;
                     case 1:
                         periyodname = '1.Çeyrek';
                         break;
                     case 2:
                         periyodname = '1. Duraklama';
                         break;
                     case 3:
                         periyodname = '2.Çeyrek';
                         break;
                     case 4:
                         periyodname = '2. Duraklama';
                         break;
                     case 5:
                         periyodname = '3.Çeyrek';
                         break;
                     case 6:
                         periyodname = '3. Duraklama';
                         break;
                     case 7:
                         periyodname = '4.Çeyrek';
                         break;
                     case 8:
                         periyodname = 'Duraklama';
                         break;
                     case 9:
                         periyodname = 'STP';
                         break;
                     case 10:
                         periyodname = 'UZTM';
                         break;
                     case 11:
                         periyodname = 'STP';
                         break;
                     case 255:
                         periyodname = 'Bitti';
                         break;
                     default:
                         periyodname = 'Error';
                 }
                 break;
		case 5:
                 switch (pid) {
                     case 0:
                         periyodname = 'Başlamadı';
                         break;
                     case 1:
                         periyodname = '1.Set';
                         break;
                     case 2:
                         periyodname = '2.Set';
                         break;
                     case 3:
                         periyodname = '3.Set';
                         break;
                     case 4:
                         periyodname = '4.Set';
                         break;
                     case 5:
                         periyodname = '5.Set';
                         break;
                     case 6:
                         periyodname = 'STP';
                         break;
                     case 255:
                         periyodname = 'Bitti';
                         break;
                     case 256:
                         periyodname = 'STP';
                         break;
                     default:
                         periyodname = 'Error';
                 }
                 break;
		case 56:
                 switch (pid) {
                     case 0:
                         periyodname = 'Başlamadı';
                         break;
                     case 1:
                         periyodname = '1.Set';
                         break;
                     case 2:
                         periyodname = '1.STP';
                         break;
                     case 3:
                         periyodname = '2.Set';
                         break;
                     case 4:
                         periyodname = '2.STP';
                         break;
                     case 5:
                         periyodname = '3.Set';
                         break;
                     case 6:
                         periyodname = '3.STP';
                         break;
                     case 7:
                         periyodname = '4.Set';
                         break;
                     case 8:
                         periyodname = '4.STP';
                         break;
                     case 9:
                         periyodname = '5.Set';
                         break;
                     case 10:
                         periyodname = '5.STP';
                         break;
                     case 11:
                         periyodname = '6.Set';
                         break;
                     case 12:
                         periyodname = '6.STP';
                         break;
                     case 13:
                         periyodname = '7.Set';
                         break;
                     case 14:
                         periyodname = '7.STP';
                         break;
                     case 255:
                         periyodname = 'Bitti';
                         break;
                     case 256:
                         periyodname = 'STP';
                         break;
                     default:
                         periyodname = 'Error';
                 }
                 break;
		case 18:
                 switch (pid) {
                     case 0:
                         periyodname = 'Başlamadı';
                         break;
                     case 1:
                         periyodname = '1.Set';
                         break;
                     case 2:
                         periyodname = '1.STP';
                         break;
                     case 3:
                         periyodname = '2.Set';
                         break;
                     case 4:
                         periyodname = '2.STP';
                         break;
                     case 5:
                         periyodname = '3.Set';
                         break;
                     case 6:
                         periyodname = '3.STP';
                         break;
                     case 7:
                         periyodname = '4.Set';
                         break;
                     case 8:
                         periyodname = '4.STP';
                         break;
                     case 9:
                         periyodname = '5.Set';
                         break;
                     case 10:
                         periyodname = '5.STP';
                         break;
                     case 11:
                         periyodname = '6.Set';
                         break;
                     case 12:
                         periyodname = '6.STP';
                         break;
                     case 13:
                         periyodname = '7.Set';
                         break;
                     case 14:
                         periyodname = '7.STP';
                         break;
                     case 255:
                         periyodname = 'Bitti';
                         break;
                     case 256:
                         periyodname = 'STP';
                         break;
                     default:
                         periyodname = 'Error';
                 }
                 break;
		case 12:
                 switch (pid) {
                     case 0:
                         periyodname = 'Başlamadı';
                         break;
                     case 1:
                         periyodname = '1.Period';
                         break;
                     case 2:
                         periyodname = '1.Ara';
                         break;
                     case 3:
                         periyodname = '2.Period';
                         break;
                     case 4:
                         periyodname = '2.Ara';
                         break;
                     case 5:
                         periyodname = '3.Period';
                         break;
                     case 6:
                         periyodname = '3.Ara';
                         break;
                     case 7:
                         periyodname = 'Bitti';
                         break;
                     case 255:
                         periyodname = 'Bitti';
                         break;
                     case 256:
                         periyodname = 'ARA';
                         break;
                     default:
                         periyodname = 'Error';
                 }
                 break;
         }
         return periyodname;
     },
     CheckGoal: function() {
         var textAnimationDuration = 3000;
         jQuery.each(Live.bets, function(k, v) {
             if (Live.oldscores[k]) {
                if ((v.sch != Live.oldscores[k].sch || v.sca != Live.oldscores[k].sca) && Live.oldscores[k].spid=="4") {
                     var eventRowSelector = 'jq-event-id-'+k+'-live';
		     $('#jq-event-id-'+k+'-live').fadeOut().fadeIn().fadeOut().fadeIn().fadeOut().fadeIn();
		     $('.goalcome').html('<div id="goalbox_highlight" class="jq-goalbox-highlight" style="display: block;"><div class="goalbox_all his_row ico_point">'+v.ateam+' <b style="font-size: 22px;margin-left: 10px;margin-right: 10px;">'+v.sch+':'+v.sca+'</b> '+v.ateam+'</div></div>');
                     window.setTimeout(function() {
                         $('.goalcome').html('');
                     }, 5000);
                 }
             }
             Live.oldscores[k] = {
                 sch: v.sch,
                 sca: v.sca
             };
         });
     },
     AnimateText: function(container, text, duration) {
         var stepDuration = duration / 6;
         Live.InsertAnimation(container, '<span class="TextAnimation" style="display:none;">' + text + '</span>').find('.TextAnimation').fadeIn(stepDuration).fadeOut(stepDuration).fadeIn(stepDuration).fadeOut(stepDuration).fadeIn(stepDuration).fadeOut(stepDuration);
     },
     InsertAnimation: function(eventRow, content) {
         var height = eventRow.height();
         var margin = height - 35;
         return eventRow.addClass('AnimationContainer').css('height', height).html('<div style="padding:' + margin + 'px 0 ' + margin + 'px 0;">' + content + '</div>');
     },
     RenderHome: function() {
        var eidsh = new Array();
        var tmph = [];
        var tmphmobilmb = "";
	var il=0;
	var marleft = 0;
  for (var n in Live.bets) {
if (Live.bets[n].status == 1 && Live.bets[n].spid=="4") {
il++;
tmphmobilmb+='<div class="data swiper-slide" id="" onclick="" data-index="'+il+'" style="width: 375px;">';
tmphmobilmb+='<div class="even ">';
tmphmobilmb+='<div id="e'+n+'" class="event match " onclick="go(\'sports/event/'+n+'\'); app.fromEventId = window.scrollY > 0 ? '+n+' : null;">';
tmphmobilmb+='<div class="event_wrapper">';
tmphmobilmb+='<div class="datetime ">';
tmphmobilmb+='<div class="sportsIcon " style="display:block;">';
tmphmobilmb+='<div class="icon">';
tmphmobilmb+='<div class="sports '+Live.spids[Live.bets[n].spid].icontype+'"></div>';
tmphmobilmb+='</div>';
tmphmobilmb+='</div>';
if (Live.bets[n].pid == 0) {
tmphmobilmb+='<div class="date small "><div> ' + Live.FixHours(Live.bets[n].startdate) + ' </div><img src="assets/img/icons/live_rain.png" alt="" width="23" height="23" class="hidden"><span class="">';
tmphmobilmb+='<img src="assets/img/icon_live.png" alt="" width="24" height="12"> </span></div></div>';
}else{
tmphmobilmb+='<div class="date standard ">';
tmphmobilmb+='<div> ' + (Live.bets[n].spid==4 ? Live.FixMinute(Live.bets[n].diff)+'\'':Live.bets[n].diff) + ' </div><img src="assets/img/icons/live_rain.png" alt="" width="23" height="23" class="hidden"><span class=""> <img src="assets/img/icon_liveRunning.png" alt="" width="24" height="12"> </span></div>';
tmphmobilmb+='</div>';
}
tmphmobilmb+='<div class="teamrows">';
tmphmobilmb+='<div class="teamrow">';
tmphmobilmb+='<div class="team"> '+Live.bets[n].hteam+' </div>';
tmphmobilmb+='<div class="score">';
tmphmobilmb+='<div class="bold"><span class="">'+Live.bets[n].sch+'</span></div>';
tmphmobilmb+='</div>';
tmphmobilmb+='</div>';
tmphmobilmb+='<div class="teamrow">';
tmphmobilmb+='<div class="team"> '+Live.bets[n].ateam+' </div>';
tmphmobilmb+='<div class="score">';
tmphmobilmb+='<div class="bold top"><span class="">'+Live.bets[n].sca+'</span></div>';
tmphmobilmb+='</div>';
tmphmobilmb+='</div>';
tmphmobilmb+='</div>';
tmphmobilmb+='<div onclick="mySwipe.next();" class="arrow swiper-button-next"></div>';
tmphmobilmb+='</div>';
tmphmobilmb+='</div>';
tmphmobilmb+='</div>';
tmphmobilmb+='<div class="navitem noborder w100 even" style="">';
		if(Live.bets[n].spid=="4")
		{
		tmphmobilmb+='<div class="cell rsDesc w25">Maç Sonucu</div>';
		}else{
		tmphmobilmb+='<div class="cell rsDesc w50">Kim Kazanır ?</div>';
		}
		if(Live.bets[n].spid=="4")
		{
		if(Live.bets[n].games && Live.bets[n].diff < Live.lm && Live.bets[n].pid < 4 && Live.bets[n].pid > 0){
		if(Live.bets[n].games[1] && Live.bets[n].games[1].count==3 && Live.bets[n].games[1].statu)
		{
		$.each(Live.bets[n].games[1].oranlar, function(h, o) {
		if(o.statu)
		{
		tmphmobilmb+='<div class="cell w25 rsBut">';
		tmphmobilmb+='<div class="qbutton l  ' +(thisbets[n] && thisbets[n][o.brid] ? 'selected' : '') +'" oddsid="'+o.brid+'" onclick="tickAddLiveMain('+n+','+Live.bets[n].games[1].bgid+','+o.brid+',1,this);void(0);" >';
		tmphmobilmb+='<div class="caption">'+o.tercih+'</div>';
		tmphmobilmb+='<div class="quote">'+o.oran+'</div>';
		tmphmobilmb+='</div>';
		tmphmobilmb+='</div>';
		}
		});
		} 	
		}
		}else{
		if(Live.bets[n].games){
		if(Live.bets[n].games[170] && Live.bets[n].games[170].count==2 && Live.bets[n].games[170].statu)
		{
		$.each(Live.bets[n].games[170].oranlar, function(h, o) {
		if(o.statu)
		{
		tmphmobilmb+='<div class="cell w25 rsBut">';
		tmphmobilmb+='<div class="qbutton l  ' +(thisbets[n] && thisbets[n][o.brid] ? 'selected' : '') +'" oddsid="'+o.brid+'" onclick="tickAddLiveMain('+n+','+Live.bets[n].games[170].bgid+','+o.brid+',170,this);void(0);" >';
		tmphmobilmb+='<div class="caption">'+o.tercih+'</div>';
		tmphmobilmb+='<div class="quote">'+o.oran+'</div>';
		tmphmobilmb+='</div>';
		tmphmobilmb+='</div>';
		}
		});
		}  	
		}
		}
tmphmobilmb+='<div class=""></div>';
tmphmobilmb+='</div>';
tmphmobilmb+='</div>';
}
if(il>5)
{
break;
}
}
tmphmobilmb+='';
var mobilpaginate = '<div class="currentView"></div><div class="'+(il<1 ? 'hidden':'')+'"></div><div class="'+(il<2 ? 'hidden':'')+'"></div><div class="'+(il<3 ? 'hidden':'')+'"></div><div class="'+(il<4 ? 'hidden':'')+'"></div><div class="'+(il<5 ? 'hidden':'')+'"></div>';
	if(Live.webtype == 'mobil')
	{
        $('.swipe-wrap').html(tmphmobilmb);
        $('.swipeNav').html(mobilpaginate);
if(window.mySwipe)
{
window.mySwipe.kill();
window.mySwipe.slide(1,400);
}
window.mySwipe = Swipe(document.getElementById('slider'), {
  startSlide: 1,
  speed: 750,
  auto: false,
  continuous: true
});
}
},
     FavsRender: function() {


	},
     Render: function() {
         var eids = new Array();
         var mobilgenesi = {};
         var mobilgenesib = {};
         var mobilgenesibas = {};
         var mobilgenesibasa = {};
         var mobilgenesimtenis = {};
         var mobilgenesimtenisa = {};
         var mobilgenesitenis = {};
         var mobilgenesitenisa = {};
         var mobilgenesivoleybol = {};
         var mobilgenesivoleybola = {};
         var mobilgenesibuzhokeyi = {};
         var mobilgenesibuzhokeyia = {};
         var eskioranlar = {};
         var tmp = [];
         var btmp = [];
         var btmpmobil = [];
         var exltmp = [];
         var mobilbasladi = '-';
         var mobilnexttime = '-';
	 var favexltmpmobil = [];
	 var nextlivemobil = [];
         var innerstats = [];
	 var mobilhtmlex ='';
	 var mp = '0';
         var c = 0;
         var ct = 0;
         var cb = 0;
         var cbs = 0;
         var bc = 0;
         var vc = 0;
         var buzc = 0;
	 var MyDiv1 = "";
	 livescorewrite(Live.bets);


         for (var cus in Live.country[56]) {
             var add = true;
             var favadd = true;
             var glcadd = true;
             var cc = 0;
             for (var k in Live.country[56][cus].bets) {
             if (Live.bets[k].status == 1) {

if(Live.myfavs[k])
{
mp = 2;
if (favadd) {
mobilgenesimtenis[mp] +='<div class="navtitle navsub ">';
mobilgenesimtenis[mp] +='<div class="tlsubitem">';
mobilgenesimtenis[mp] +='<div class="icon">';
mobilgenesimtenis[mp] +='<div class="sports_small table-tennis"></div>';
mobilgenesimtenis[mp] +='</div>';
mobilgenesimtenis[mp] +='<div class="text">' + Live.country[56][cus].countryname.toUpperCase() + '</div>';
mobilgenesimtenis[mp] +='</div>';
mobilgenesimtenis[mp] +='</div>';
favadd = false;
}
}else if (Live.bets[k].pid == 0) {
mp = 1;
if (glcadd) {
mobilgenesimtenis[mp] +='<div class="navtitle navsub ">';
mobilgenesimtenis[mp] +='<div class="tlsubitem">';
mobilgenesimtenis[mp] +='<div class="icon">';
mobilgenesimtenis[mp] +='<div class="sports_small table-tennis"></div>';
mobilgenesimtenis[mp] +='</div>';
mobilgenesimtenis[mp] +='<div class="text">' + Live.country[56][cus].countryname.toUpperCase() + '</div>';
mobilgenesimtenis[mp] +='</div>';
mobilgenesimtenis[mp] +='</div>';
glcadd = false;
}
}else{
mp = 0;
if (add) {
mobilgenesimtenis[mp] +='<div class="navtitle navsub ">';
mobilgenesimtenis[mp] +='<div class="tlsubitem">';
mobilgenesimtenis[mp] +='<div class="icon">';
mobilgenesimtenis[mp] +='<div class="sports_small table-tennis"></div>';
mobilgenesimtenis[mp] +='</div>';
mobilgenesimtenis[mp] +='<div class="text">' + Live.country[56][cus].countryname.toUpperCase() + '</div>';
mobilgenesimtenis[mp] +='</div>';
mobilgenesimtenis[mp] +='</div>';
add = false;
}
}
mobilgenesimtenis[mp]+='<div class="odd" id="bts_'+k+'">';
mobilgenesimtenis[mp]+='<div id="e'+k+'" class="event match " onclick="">';
mobilgenesimtenis[mp]+='<div class="hidden">';
mobilgenesimtenis[mp]+='<div colspan="11" class="c_comment">';
mobilgenesimtenis[mp]+='<div class="c_comment"></div>';
mobilgenesimtenis[mp]+='<div class="c_pointer"></div>';
mobilgenesimtenis[mp]+='</div>';
mobilgenesimtenis[mp]+='</div>';
mobilgenesimtenis[mp]+='<div class="event_wrapper">';
mobilgenesimtenis[mp]+='<div class="datetime loggedinLive">';
mobilgenesimtenis[mp]+='<div class="favorites "><img src="assets/img/favorite'+(Live.myfavs[k] ? '1':'0')+'.png" onclick="Live.Addfavevent(\''+(Live.myfavs[k] ? 'rem':'add')+'\','+k+');"></div>';
mobilgenesimtenis[mp]+='<div class="sportsIcon ">';
mobilgenesimtenis[mp]+='<div class="icon">';
mobilgenesimtenis[mp]+='<div class="sports basketball"></div>';
mobilgenesimtenis[mp]+='</div>';
mobilgenesimtenis[mp]+='</div>';

if (Live.bets[k].pid == 0) {
mobilgenesimtenis[mp]+='<div class="date small ">';
mobilgenesimtenis[mp]+='<div> '+ Live.FixHours(Live.bets[k].startdate) + ' </div><img src="assets/img/icons/live_rain.png" alt="" width="23" height="23" class="hidden"><span class=""> <img src="assets/img/icon_live.png" alt="" width="24" height="12"> </span></div>';
mobilgenesimtenis[mp]+='</div>';
}else{
mobilgenesimtenis[mp]+='<div class="date standard ">';
mobilgenesimtenis[mp]+='<div> '+Live.GetPeriyod(parseInt(Live.bets[k].spid), parseInt(Live.bets[k].pid))+' </div><img src="assets/img/icons/live_rain.png" alt="" width="23" height="23" class="hidden"><span class=""> <img src="assets/img/icon_liveRunning_red.gif" alt="" width="24" height="12"> </span></div>';
mobilgenesimtenis[mp]+='</div>';
}

mobilgenesimtenis[mp]+='<div class="teamrows"  onclick="Live.Details.Open('+k+'); app.fromEventId = window.scrollY > 0 ? '+k+' : null;">';
mobilgenesimtenis[mp]+='<div class="teamrow">';
mobilgenesimtenis[mp]+='<div class="team"> '+Live.bets[k].hteam+' '+(Live.bets[k].rch>0 ? '<img class="redCards" src="assets/img/scorebox/red-card.png" width="20" height="20">':'')+'</div>';
mobilgenesimtenis[mp]+='<div class="score">';
mobilgenesimtenis[mp]+='<div class="hidden"><span class=""></span></div>';
mobilgenesimtenis[mp]+='<div class="hidden"><span class=""></span></div>';
mobilgenesimtenis[mp]+='<div class="hidden"><span class=""></span></div>';
mobilgenesimtenis[mp]+='<div class="hidden"><span class="">' + Live.bets[k].isch + '</span></div>';
mobilgenesimtenis[mp]+='<div class="bold"><span class="">' + Live.bets[k].sch + '</span></div>';
mobilgenesimtenis[mp]+='<div class="hidden"><span class=""></span></div>';
mobilgenesimtenis[mp]+='<div class="hidden"><span class=""></span></div>';
mobilgenesimtenis[mp]+='</div>';
mobilgenesimtenis[mp]+='</div>';
mobilgenesimtenis[mp]+='<div class="teamrow">';
mobilgenesimtenis[mp]+='<div class="team"> '+Live.bets[k].ateam+' '+(Live.bets[k].rca>0 ? '<img class="redCards" src="assets/img/scorebox/red-card.png" width="20" height="20">':'')+'</div>';
mobilgenesimtenis[mp]+='<div class="score">';
mobilgenesimtenis[mp]+='<div class="hidden top"><span class=""></span></div>';
mobilgenesimtenis[mp]+='<div class="hidden top"><span class=""></span></div>';
mobilgenesimtenis[mp]+='<div class="hidden top"><span class=""></span></div>';
mobilgenesimtenis[mp]+='<div class="hidden top"><span class="">' + Live.bets[k].isca + '</span></div>';
mobilgenesimtenis[mp]+='<div class="bold top"><span class="">' + Live.bets[k].sca + '</span></div>';
mobilgenesimtenis[mp]+='<div class="hidden top"><span class=""></span></div>';
mobilgenesimtenis[mp]+='<div class="hidden top"><span class=""></span></div>';
mobilgenesimtenis[mp]+='</div>';
mobilgenesimtenis[mp]+='</div>';
mobilgenesimtenis[mp]+='</div>';
mobilgenesimtenis[mp]+='<div class="hidden">';
mobilgenesimtenis[mp]+='<div class="hidden"> </div>';
mobilgenesimtenis[mp]+='</div>';
mobilgenesimtenis[mp]+=''+(Live.bets[k].videoid>0 ? '<br><div class="icon" style="margin-top: 14px;"><div class="sports_small tv-show"></div></div>':'')+'';
mobilgenesimtenis[mp]+='<div class="hidden onlive"></div>';
mobilgenesimtenis[mp]+='</div>';
mobilgenesimtenis[mp]+='</div>';
mobilgenesimtenis[mp]+='</div>';  


mobilgenesimtenis[mp]+='<div class="navitem noborder w100 even" style="">';
if(Live.bets[k].games[170] && Live.bets[k].games[170].count==2 && Live.bets[k].games[170].statu)
{
mobilgenesimtenis[mp]+='<div class="cell rsDesc w50">'+Bahis.oyunlar[170].ad+'</div>';
$.each(Live.bets[k].games[170].oranlar, function(n, o) {
if(o.statu)
{
mobilgenesimtenis[mp]+='<div class="cell w25 rsBut">';

var qbut = CryptoJS.MD5(Bahis.oyunlar[170].ad+"|"+o.tercih+"|"+k);

mobilgenesimtenis[mp]+='<div class="'+k+' qbutton qbut-'+qbut+' '+o.image+'" oddsid="'+k+''+o.brid+'" onclick="canliekle('+k+''+o.brid+',\''+Bahis.oyunlar[170].ad+'\',\''+o.tercih+'\',\''+o.oran+'\',\''+k+'\',\''+Live.bets[k].spid+'\', this);void(0);">';


mobilgenesimtenis[mp]+='<div class="caption">'+o.tercih+'</div>';
mobilgenesimtenis[mp]+='<div class="quote">'+o.oran+'</div>';
mobilgenesimtenis[mp]+='</div>';
mobilgenesimtenis[mp]+='</div>';
}
});
}else{
mobilgenesimtenis[mp]+='<div class="cell rsDesc w50">Kim kazanır ?</div>';
mobilgenesimtenis[mp]+='<div class="cell w25 rsBut">';
mobilgenesimtenis[mp]+='<div class="qbutton l stopped">';
mobilgenesimtenis[mp]+='<div class="caption">0</div>';
mobilgenesimtenis[mp]+='<div class="quote">0.99</div>';
mobilgenesimtenis[mp]+='</div>';
mobilgenesimtenis[mp]+='</div>';
mobilgenesimtenis[mp]+='<div class="cell w25 rsBut">';
mobilgenesimtenis[mp]+='<div class="qbutton l stopped">';
mobilgenesimtenis[mp]+='<div class="caption">0</div>';
mobilgenesimtenis[mp]+='<div class="quote">0.99</div>';
mobilgenesimtenis[mp]+='</div>';
mobilgenesimtenis[mp]+='</div>';
mobilgenesimtenis[mp]+='</div>';
}
mobilgenesimtenis[mp]+='</div>';
cb++;
}
}
}

for (var cus in Live.country[5]) {
             var add = true;
             var favadd = true;
             var glcadd = true;
             var cc = 0;
             for (var k in Live.country[5][cus].bets) {
             if (Live.bets[k].status == 1) {

if(Live.myfavs[k])
{
mp = 2;
if (favadd) {
mobilgenesitenis[mp] +='<div class="navtitle navsub ">';
mobilgenesitenis[mp] +='<div class="tlsubitem">';
mobilgenesitenis[mp] +='<div class="icon">';
mobilgenesitenis[mp] +='<div class="sports_small tennis"></div>';
mobilgenesitenis[mp] +='</div>';
mobilgenesitenis[mp] +='<div class="text">' + Live.country[5][cus].countryname.toUpperCase() + '</div>';
mobilgenesitenis[mp] +='</div>';
mobilgenesitenis[mp] +='</div>';
favadd = false;
}
}else if (Live.bets[k].pid == 0) {
mp = 1;
if (glcadd) {
mobilgenesitenis[mp] +='<div class="navtitle navsub ">';
mobilgenesitenis[mp] +='<div class="tlsubitem">';
mobilgenesitenis[mp] +='<div class="icon">';
mobilgenesitenis[mp] +='<div class="sports_small tennis"></div>';
mobilgenesitenis[mp] +='</div>';
mobilgenesitenis[mp] +='<div class="text">' + Live.country[5][cus].countryname.toUpperCase() + '</div>';
mobilgenesitenis[mp] +='</div>';
mobilgenesitenis[mp] +='</div>';
glcadd = false;
}
}else{
mp = 0;
if (add) {
mobilgenesitenis[mp] +='<div class="navtitle navsub ">';
mobilgenesitenis[mp] +='<div class="tlsubitem">';
mobilgenesitenis[mp] +='<div class="icon">';
mobilgenesitenis[mp] +='<div class="sports_small tennis"></div>';
mobilgenesitenis[mp] +='</div>';
mobilgenesitenis[mp] +='<div class="text">' + Live.country[5][cus].countryname.toUpperCase() + '</div>';
mobilgenesitenis[mp] +='</div>';
mobilgenesitenis[mp] +='</div>';
add = false;
}
}
mobilgenesitenis[mp]+='<div class="odd" id="bts_'+k+'">';
mobilgenesitenis[mp]+='<div id="e'+k+'" class="event match " onclick="">';
mobilgenesitenis[mp]+='<div class="hidden">';
mobilgenesitenis[mp]+='<div colspan="11" class="c_comment">';
mobilgenesitenis[mp]+='<div class="c_comment"></div>';
mobilgenesitenis[mp]+='<div class="c_pointer"></div>';
mobilgenesitenis[mp]+='</div>';
mobilgenesitenis[mp]+='</div>';
mobilgenesitenis[mp]+='<div class="event_wrapper">';
mobilgenesitenis[mp]+='<div class="datetime loggedinLive">';
mobilgenesitenis[mp]+='<div class="favorites "><img src="assets/img/favorite'+(Live.myfavs[k] ? '1':'0')+'.png" onclick="Live.Addfavevent(\''+(Live.myfavs[k] ? 'rem':'add')+'\','+k+');"></div>';
mobilgenesitenis[mp]+='<div class="sportsIcon ">';
mobilgenesitenis[mp]+='<div class="icon">';
mobilgenesitenis[mp]+='<div class="sports basketball"></div>';
mobilgenesitenis[mp]+='</div>';
mobilgenesitenis[mp]+='</div>';

if (Live.bets[k].pid == 0) {
mobilgenesitenis[mp]+='<div class="date small ">';
mobilgenesitenis[mp]+='<div> '+ Live.FixHours(Live.bets[k].startdate) + ' </div><img src="assets/img/icons/live_rain.png" alt="" width="23" height="23" class="hidden"><span class=""> <img src="assets/img/icon_live.png" alt="" width="24" height="12"> </span></div>';
mobilgenesitenis[mp]+='</div>';
}else{
mobilgenesitenis[mp]+='<div class="date standard ">';
mobilgenesitenis[mp]+='<div> '+Live.GetPeriyod(parseInt(Live.bets[k].spid), parseInt(Live.bets[k].pid))+' </div><img src="assets/img/icons/live_rain.png" alt="" width="23" height="23" class="hidden"><span class=""> <img src="assets/img/icon_liveRunning_red.gif" alt="" width="24" height="12"> </span></div>';
mobilgenesitenis[mp]+='</div>';
}

mobilgenesitenis[mp]+='<div class="teamrows"  onclick="Live.Details.Open('+k+'); app.fromEventId = window.scrollY > 0 ? '+k+' : null;">';
mobilgenesitenis[mp]+='<div class="teamrow">';
mobilgenesitenis[mp]+='<div class="team"> '+Live.bets[k].hteam+' '+(Live.bets[k].rch>0 ? '<img class="redCards" src="assets/img/scorebox/red-card.png" width="20" height="20">':'')+'</div>';
mobilgenesitenis[mp]+='<div class="score">';
mobilgenesitenis[mp]+='<div class="hidden"><span class=""></span></div>';
mobilgenesitenis[mp]+='<div class="hidden"><span class=""></span></div>';
mobilgenesitenis[mp]+='<div class="hidden"><span class=""></span></div>';
mobilgenesitenis[mp]+='<div class="hidden"><span class="">' + Live.bets[k].isch + '</span></div>';
mobilgenesitenis[mp]+='<div class="bold"><span class="">' + Live.bets[k].sch + '</span></div>';
mobilgenesitenis[mp]+='<div class="hidden"><span class=""></span></div>';
mobilgenesitenis[mp]+='<div class="hidden"><span class=""></span></div>';
mobilgenesitenis[mp]+='</div>';
mobilgenesitenis[mp]+='</div>';
mobilgenesitenis[mp]+='<div class="teamrow">';
mobilgenesitenis[mp]+='<div class="team"> '+Live.bets[k].ateam+' '+(Live.bets[k].rca>0 ? '<img class="redCards" src="assets/img/scorebox/red-card.png" width="20" height="20">':'')+'</div>';
mobilgenesitenis[mp]+='<div class="score">';
mobilgenesitenis[mp]+='<div class="hidden top"><span class=""></span></div>';
mobilgenesitenis[mp]+='<div class="hidden top"><span class=""></span></div>';
mobilgenesitenis[mp]+='<div class="hidden top"><span class=""></span></div>';
mobilgenesitenis[mp]+='<div class="hidden top"><span class="">' + Live.bets[k].isca + '</span></div>';
mobilgenesitenis[mp]+='<div class="bold top"><span class="">' + Live.bets[k].sca + '</span></div>';
mobilgenesitenis[mp]+='<div class="hidden top"><span class=""></span></div>';
mobilgenesitenis[mp]+='<div class="hidden top"><span class=""></span></div>';
mobilgenesitenis[mp]+='</div>';
mobilgenesitenis[mp]+='</div>';
mobilgenesitenis[mp]+='</div>';
mobilgenesitenis[mp]+='<div class="hidden">';
mobilgenesitenis[mp]+='<div class="hidden"> </div>';
mobilgenesitenis[mp]+='</div>';
mobilgenesitenis[mp]+='<div class="arrow_blk_down" onclick="Live.Details.Open('+k+'); app.fromEventId = window.scrollY > 0 ? '+k+' : null;"></div>';
mobilgenesitenis[mp]+=''+(Live.bets[k].videoid>0 ? '<br><div class="icon" style="margin-top: 14px;"><div class="sports_small tv-show"></div></div>':'')+'';
mobilgenesitenis[mp]+='<div class="hidden onlive"></div>';
mobilgenesitenis[mp]+='</div>';
mobilgenesitenis[mp]+='</div>';
mobilgenesitenis[mp]+='</div>';  


mobilgenesitenis[mp]+='<div class="navitem noborder w100 even" style="">';
if(Live.bets[k].games[170] && Live.bets[k].games[170].count==2 && Live.bets[k].games[170].statu)
{
mobilgenesitenis[mp]+='<div class="cell rsDesc w50">'+Bahis.oyunlar[170].ad+'</div>';
$.each(Live.bets[k].games[170].oranlar, function(n, o) {
if(o.statu)
{
mobilgenesitenis[mp]+='<div class="cell w25 rsBut">';

var qbut = CryptoJS.MD5(Bahis.oyunlar[170].ad+"|"+o.tercih+"|"+k);

mobilgenesitenis[mp]+='<div class="'+k+' qbutton qbut-'+qbut+' '+o.image+'" oddsid="'+k+''+o.brid+'" onclick="canliekle('+k+''+o.brid+',\''+Bahis.oyunlar[170].ad+'\',\''+o.tercih+'\',\''+o.oran+'\',\''+k+'\',\''+Live.bets[k].spid+'\', this);void(0);">';


mobilgenesitenis[mp]+='<div class="caption">'+o.tercih+'</div>';
mobilgenesitenis[mp]+='<div class="quote">'+o.oran+'</div>';
mobilgenesitenis[mp]+='</div>';
mobilgenesitenis[mp]+='</div>';
}
});
}
mobilgenesitenis[mp]+='</div>';
cb++;
}
}
}

for (var cus in Live.country[7]) {
var add = true;
var favadd = true;
var glcadd = true;
var cc = 0;
for (var k in Live.country[7][cus].bets) {
if (Live.bets[k].status == 1) {

if(Live.myfavs[k])
{
mp = 2;
if (favadd) {
mobilgenesibas[mp] +='<div class="navtitle navsub ">';
mobilgenesibas[mp] +='<div class="tlsubitem">';
mobilgenesibas[mp] +='<div class="icon">';
mobilgenesibas[mp] +='<div class="sports_small basketball"></div>';
mobilgenesibas[mp] +='</div>';
mobilgenesibas[mp] +='<div class="text">' + Live.country[7][cus].countryname.toUpperCase() + '</div>';
mobilgenesibas[mp] +='</div>';
mobilgenesibas[mp] +='</div>';
favadd = false;
}
}else if (Live.bets[k].pid == 0) {
mp = 1;
if (glcadd) {
mobilgenesibas[mp] +='<div class="navtitle navsub ">';
mobilgenesibas[mp] +='<div class="tlsubitem">';
mobilgenesibas[mp] +='<div class="icon">';
mobilgenesibas[mp] +='<div class="sports_small basketball"></div>';
mobilgenesibas[mp] +='</div>';
mobilgenesibas[mp] +='<div class="text">' + Live.country[7][cus].countryname.toUpperCase() + '</div>';
mobilgenesibas[mp] +='</div>';
mobilgenesibas[mp] +='</div>';
glcadd = false;
}
}else{
mp = 0;
if (add) {
mobilgenesibas[mp] +='<div class="navtitle navsub ">';
mobilgenesibas[mp] +='<div class="tlsubitem">';
mobilgenesibas[mp] +='<div class="icon">';
mobilgenesibas[mp] +='<div class="sports_small basketball"></div>';
mobilgenesibas[mp] +='</div>';
mobilgenesibas[mp] +='<div class="text">' + Live.country[7][cus].countryname.toUpperCase() + '</div>';
mobilgenesibas[mp] +='</div>';
mobilgenesibas[mp] +='</div>';
add = false;
}
}
mobilgenesibas[mp]+='<div class="odd" id="bts_'+k+'">';
mobilgenesibas[mp]+='<div id="e'+k+'" class="event match " onclick="">';
mobilgenesibas[mp]+='<div class="hidden">';
mobilgenesibas[mp]+='<div colspan="11" class="c_comment">';
mobilgenesibas[mp]+='<div class="c_comment"></div>';
mobilgenesibas[mp]+='<div class="c_pointer"></div>';
mobilgenesibas[mp]+='</div>';
mobilgenesibas[mp]+='</div>';
mobilgenesibas[mp]+='<div class="event_wrapper">';
mobilgenesibas[mp]+='<div class="datetime loggedinLive">';
mobilgenesibas[mp]+='<div class="favorites "><img src="assets/img/favorite'+(Live.myfavs[k] ? '1':'0')+'.png" onclick="Live.Addfavevent(\''+(Live.myfavs[k] ? 'rem':'add')+'\','+k+');"></div>';
mobilgenesibas[mp]+='<div class="sportsIcon ">';
mobilgenesibas[mp]+='<div class="icon">';
mobilgenesibas[mp]+='<div class="sports basketball"></div>';
mobilgenesibas[mp]+='</div>';
mobilgenesibas[mp]+='</div>';

if (Live.bets[k].pid == 0) {
mobilgenesibas[mp]+='<div class="date small ">';
mobilgenesibas[mp]+='<div> '+ Live.FixHours(Live.bets[k].startdate) + ' </div><img src="assets/img/icons/live_rain.png" alt="" width="23" height="23" class="hidden"><span class=""> <img src="assets/img/icon_live.png" alt="" width="24" height="12"> </span></div>';
mobilgenesibas[mp]+='</div>';
}else{
mobilgenesibas[mp]+='<div class="date standard ">';
mobilgenesibas[mp]+='<div> '+Live.GetPeriyod(parseInt(Live.bets[k].spid), parseInt(Live.bets[k].pid))+' </div><img src="assets/img/icons/live_rain.png" alt="" width="23" height="23" class="hidden"><span class=""> <img src="assets/img/icon_liveRunning_red.gif" alt="" width="24" height="12"> </span></div>';
mobilgenesibas[mp]+='</div>';
}

mobilgenesibas[mp]+='<div class="teamrows"  onclick="Live.Details.Open('+k+'); app.fromEventId = window.scrollY > 0 ? '+k+' : null;">';
mobilgenesibas[mp]+='<div class="teamrow">';
mobilgenesibas[mp]+='<div class="team"> '+Live.bets[k].hteam+' '+(Live.bets[k].rch>0 ? '<img class="redCards" src="assets/img/scorebox/red-card.png" width="20" height="20">':'')+'</div>';
mobilgenesibas[mp]+='<div class="score">';
mobilgenesibas[mp]+='<div class="hidden"><span class=""></span></div>';
mobilgenesibas[mp]+='<div class="hidden"><span class=""></span></div>';
mobilgenesibas[mp]+='<div class="hidden"><span class=""></span></div>';
mobilgenesibas[mp]+='<div class="hidden"><span class="">' + Live.bets[k].isch + '</span></div>';
mobilgenesibas[mp]+='<div class="bold"><span class="">' + Live.bets[k].sch + '</span></div>';
mobilgenesibas[mp]+='<div class="hidden"><span class=""></span></div>';
mobilgenesibas[mp]+='<div class="hidden"><span class=""></span></div>';
mobilgenesibas[mp]+='</div>';
mobilgenesibas[mp]+='</div>';
mobilgenesibas[mp]+='<div class="teamrow">';
mobilgenesibas[mp]+='<div class="team"> '+Live.bets[k].ateam+' '+(Live.bets[k].rca>0 ? '<img class="redCards" src="assets/img/scorebox/red-card.png" width="20" height="20">':'')+'</div>';
mobilgenesibas[mp]+='<div class="score">';
mobilgenesibas[mp]+='<div class="hidden top"><span class=""></span></div>';
mobilgenesibas[mp]+='<div class="hidden top"><span class=""></span></div>';
mobilgenesibas[mp]+='<div class="hidden top"><span class=""></span></div>';
mobilgenesibas[mp]+='<div class="hidden top"><span class="">' + Live.bets[k].isca + '</span></div>';
mobilgenesibas[mp]+='<div class="bold top"><span class="">' + Live.bets[k].sca + '</span></div>';
mobilgenesibas[mp]+='<div class="hidden top"><span class=""></span></div>';
mobilgenesibas[mp]+='<div class="hidden top"><span class=""></span></div>';
mobilgenesibas[mp]+='</div>';
mobilgenesibas[mp]+='</div>';
mobilgenesibas[mp]+='</div>';
mobilgenesibas[mp]+='<div class="hidden">';
mobilgenesibas[mp]+='<div class="hidden"> </div>';
mobilgenesibas[mp]+='</div>';
mobilgenesibas[mp]+='<div class="arrow_blk_down" onclick="Live.Details.Open('+k+'); app.fromEventId = window.scrollY > 0 ? '+k+' : null;"></div>';
mobilgenesibas[mp]+=''+(Live.bets[k].videoid>0 ? '<br><div class="icon" style="margin-top: 14px;"><div class="sports_small tv-show"></div></div>':'')+'';
mobilgenesibas[mp]+='<div class="hidden onlive"></div>';
mobilgenesibas[mp]+='</div>';
mobilgenesibas[mp]+='</div>';
mobilgenesibas[mp]+='</div>';  


mobilgenesibas[mp]+='<div class="navitem noborder w100 even" style="">';
if(Live.bets[k].games[170] && Live.bets[k].games[170].count==2 && Live.bets[k].games[170].statu)
{
mobilgenesibas[mp]+='<div class="cell rsDesc w50">'+Bahis.oyunlar[170].ad+' (Uz. Dahil)</div>';
$.each(Live.bets[k].games[170].oranlar, function(n, o) {
if(o.statu)
{

var qbut = CryptoJS.MD5(Bahis.oyunlar[170].ad+" (Uz. Dahil)|"+o.tercih+"|"+k);

mobilgenesibas[mp]+='<div class="cell w25 rsBut">';
mobilgenesibas[mp]+='<div class="'+k+' qbutton qbut-'+qbut+' '+o.image+'" oddsid="'+k+''+o.brid+'" onclick="canliekle('+k+''+o.brid+',\''+Bahis.oyunlar[170].ad+' (Uz. Dahil)\',\''+o.tercih+'\',\''+o.oran+'\',\''+k+'\',\''+Live.bets[k].spid+'\', this);void(0);">';
mobilgenesibas[mp]+='<div class="caption">'+o.tercih+'</div>';
mobilgenesibas[mp]+='<div class="quote">'+o.oran+'</div>';
mobilgenesibas[mp]+='</div>';
mobilgenesibas[mp]+='</div>';
}
});
}
mobilgenesibas[mp]+='</div>';
cb++;
}
}
}


for (var cu in Live.country[4]) {
var add = true;
var favadd = true;
var glcadd = true;
var cc = 0;
for (var k in Live.country[4][cu].bets) {
if (Live.bets[k].status == 1) {
if(Live.myfavs[k])
{
mp = 2;
if (favadd) {
mobilgenesi[mp] +='<div class="navtitle navsub ">';
mobilgenesi[mp] +='<div class="tlsubitem">';
mobilgenesi[mp] +='<div class="icon">';
mobilgenesi[mp] +='<div class="sports_small soccer"></div><span class="countryIcon c' + Live.country[4][cu].countryids + '"></span>';
mobilgenesi[mp] +='</div>';
mobilgenesi[mp] +='<div class="text">' + Live.country[4][cu].countryname.toUpperCase() + '</div>';
mobilgenesi[mp] +='</div>';
mobilgenesi[mp] +='</div>';
favadd = false;
}
}else if (Live.bets[k].pid == 0) {
mp = 1;
if (glcadd) {
mobilgenesi[mp] +='<div class="navtitle navsub ">';
mobilgenesi[mp] +='<div class="tlsubitem">';
mobilgenesi[mp] +='<div class="icon">';
mobilgenesi[mp] +='<div class="sports_small soccer"></div><span class="countryIcon c' + Live.country[4][cu].countryids + '"></span>';
mobilgenesi[mp] +='</div>';
mobilgenesi[mp] +='<div class="text">' + Live.country[4][cu].countryname.toUpperCase() + '</div>';
mobilgenesi[mp] +='</div>';
mobilgenesi[mp] +='</div>';
glcadd = false;
}
}else{
mp = 0;
if (add) {
mobilgenesi[mp] +='<div class="navtitle navsub ">';
mobilgenesi[mp] +='<div class="tlsubitem">';
mobilgenesi[mp] +='<div class="icon">';
mobilgenesi[mp] +='<div class="sports_small soccer"></div><span class="countryIcon c' + Live.country[4][cu].countryids + '"></span>';
mobilgenesi[mp] +='</div>';
mobilgenesi[mp] +='<div class="text">' + Live.country[4][cu].countryname.toUpperCase() + '</div>';
mobilgenesi[mp] +='</div>';
mobilgenesi[mp] +='</div>';
add = false;
}
}

mobilgenesi[mp]+='<div class="odd" id="bts_'+k+'">';
mobilgenesi[mp]+='<div id="e'+k+'" class="event match " onclick="">';
mobilgenesi[mp]+='<div class="hidden">';
mobilgenesi[mp]+='<div colspan="11" class="c_comment">';
mobilgenesi[mp]+='<div class="c_comment"></div>';
mobilgenesi[mp]+='<div class="c_pointer"></div>';
mobilgenesi[mp]+='</div>';
mobilgenesi[mp]+='</div>';
mobilgenesi[mp]+='<div class="event_wrapper">';
mobilgenesi[mp]+='<div class="datetime loggedinLive">';
mobilgenesi[mp]+='<div class="favorites "><img src="assets/img/favorite'+(Live.myfavs[k] ? '1':'0')+'.png" onclick="Live.Addfavevent(\''+(Live.myfavs[k] ? 'rem':'add')+'\','+k+');"></div>';
mobilgenesi[mp]+='<div class="sportsIcon ">';
mobilgenesi[mp]+='<div class="icon">';
mobilgenesi[mp]+='<div class="sports soccer"></div>';
mobilgenesi[mp]+='</div>';
mobilgenesi[mp]+='</div>';

if (Live.bets[k].pid == 0) {
mobilgenesi[mp]+='<div class="date small ">';
mobilgenesi[mp]+='<div> '+ Live.bets[k].sht + ' </div><img src="assets/img/icons/live_rain.png" alt="" width="23" height="23" class="hidden"><span class=""> <img src="assets/img/icon_live.png" alt="" width="24" height="12"> </span></div>';
mobilgenesi[mp]+='</div>';
}else{
mobilgenesi[mp]+='<div class="date standard ">';
mobilgenesi[mp]+='<div> '+(Live.bets[k].pid=="2" ? 'Devre':''+Live.bets[k].diff+'\'')+' </div><img src="assets/img/icons/live_rain.png" alt="" width="23" height="23" class="hidden"><span class=""> <img src="assets/img/icon_liveRunning_red.gif" alt="" width="24" height="12"> </span></div>';
mobilgenesi[mp]+='</div>';
}

mobilgenesi[mp]+='<div class="teamrows" onclick="Live.Details.Open('+k+'); app.fromEventId = window.scrollY > 0 ? '+k+' : null;">';
mobilgenesi[mp]+='<div class="teamrow">';
mobilgenesi[mp]+='<div class="team"> '+Live.bets[k].hteam+' '+(Live.bets[k].redh>0 ? '<img class="redCards" src="/assets/img/red-card.png" width="20" height="20">':'')+'</div>';
mobilgenesi[mp]+='<div class="score">';
mobilgenesi[mp]+='<div class="hidden"><span class=""></span></div>';
mobilgenesi[mp]+='<div class="hidden"><span class=""></span></div>';
mobilgenesi[mp]+='<div class="hidden"><span class=""></span></div>';
mobilgenesi[mp]+='<div class="'+(Live.bets[k].pid>1 ? '':'hidden')+'"><span class="">' + Live.bets[k].isch + '</span></div>';
mobilgenesi[mp]+='<div class="bold"><span class="">' + Live.bets[k].sch + '</span></div>';
mobilgenesi[mp]+='<div class="hidden"><span class=""></span></div>';
mobilgenesi[mp]+='<div class="hidden"><span class=""></span></div>';
mobilgenesi[mp]+='</div>';
mobilgenesi[mp]+='</div>';
mobilgenesi[mp]+='<div class="teamrow">';
mobilgenesi[mp]+='<div class="team"> '+Live.bets[k].ateam+' '+(Live.bets[k].reda>0 ? '<img class="redCards" src="/assets/img/red-card.png" width="20" height="20">':'')+'</div>';
mobilgenesi[mp]+='<div class="score">';
mobilgenesi[mp]+='<div class="hidden top"><span class=""></span></div>';
mobilgenesi[mp]+='<div class="hidden top"><span class=""></span></div>';
mobilgenesi[mp]+='<div class="hidden top"><span class=""></span></div>';
mobilgenesi[mp]+='<div class="'+(Live.bets[k].pid>1 ? '':'hidden')+' top"><span class="">' + Live.bets[k].isca + '</span></div>';
mobilgenesi[mp]+='<div class="bold top"><span class="">' + Live.bets[k].sca + '</span></div>';
mobilgenesi[mp]+='<div class="hidden top"><span class=""></span></div>';
mobilgenesi[mp]+='<div class="hidden top"><span class=""></span></div>';
mobilgenesi[mp]+='</div>';
mobilgenesi[mp]+='</div>';
mobilgenesi[mp]+='</div>';
mobilgenesi[mp]+='<div class="hidden">';
mobilgenesi[mp]+='<div class="hidden"> </div>';
mobilgenesi[mp]+='</div>';
mobilgenesi[mp]+='<div class="arrow_blk_down" onclick="Live.Details.Open('+k+'); app.fromEventId = window.scrollY > 0 ? '+k+' : null;"></div>';
mobilgenesi[mp]+=''+(Live.bets[k].videoid>0 ? '<br><div class="icon" style="margin-top: 14px;"><div class="sports_small tv-show"></div></div>':'')+'';
mobilgenesi[mp]+='<div class="hidden onlive"></div>';
mobilgenesi[mp]+='</div>';
mobilgenesi[mp]+='</div>';
mobilgenesi[mp]+='</div>';  
if(Live.bets[k].games && Live.bets[k].diff < Live.lm && Live.bets[k].pid < 4 && Live.bets[k].pid > 0)
{
$.each(Live.bets[k].games, function(g, b) {
mobilgenesi[mp]+='<div class="navitem noborder w100 even" style="'+(Live.showlines==b.gid ? '':'display:none;')+'" id="navgameslive_'+b.gid+'">';
if(b.count>2)
{
mobilgenesi[mp]+='<div class="cell rsDesc w25">'+b.oyunad+'</div>';
}else if(b.count<3)
{
mobilgenesi[mp]+='<div class="cell rsDesc w50">'+b.oyunad+'</div>';
}
$.each(b.oranlar, function(n, o) {
if(o.statu && b.statu && Live.bets[k].games[1] && o.oran!='0.00')
{

var qbut = CryptoJS.MD5(b.oyunad+"|"+o.tercih+"|"+k);

mobilgenesi[mp]+='<div class="cell w25 rsBut">';
mobilgenesi[mp]+='<div class="'+k+' qbutton qbut-'+qbut+' '+o.image+'" oddsid="'+k+''+o.brid+'" onclick="canliekle('+k+''+o.brid+',\''+b.oyunad+'\',\''+o.tercih+'\',\''+o.oran+'\',\''+k+'\',\''+Live.bets[k].spid+'\', this);void(0);">';
mobilgenesi[mp]+='<div class="caption">'+(o.tercihs ? o.tercihs:o.tercih)+'</div>';
mobilgenesi[mp]+='<div class="quote">'+o.oran+'</div>';
mobilgenesi[mp]+='</div>';
mobilgenesi[mp]+='</div>';
}
});
mobilgenesi[mp]+='</div>';
mobilgenesi[mp]+='</div>';
});
}
c++;			
}
}
}

for (var cus in Live.country[18]) {
var add = true;
var favadd = true;
var glcadd = true;
var cc = 0;
for (var k in Live.country[18][cus].bets) {
if (Live.bets[k].status == 1) {

if(Live.myfavs[k])
{
mp = 2;
if (favadd) {
mobilgenesivoleybol[mp] +='<div class="navtitle navsub ">';
mobilgenesivoleybol[mp] +='<div class="tlsubitem">';
mobilgenesivoleybol[mp] +='<div class="icon">';
mobilgenesivoleybol[mp] +='<div class="sports_small volleyball"></div>';
mobilgenesivoleybol[mp] +='</div>';
mobilgenesivoleybol[mp] +='<div class="text">' + Live.country[18][cus].countryname.toUpperCase() + '</div>';
mobilgenesivoleybol[mp] +='</div>';
mobilgenesivoleybol[mp] +='</div>';
favadd = false;
}
}else if (Live.bets[k].pid == 0) {
mp = 1;
if (glcadd) {
mobilgenesivoleybol[mp] +='<div class="navtitle navsub ">';
mobilgenesivoleybol[mp] +='<div class="tlsubitem">';
mobilgenesivoleybol[mp] +='<div class="icon">';
mobilgenesivoleybol[mp] +='<div class="sports_small volleyball"></div>';
mobilgenesivoleybol[mp] +='</div>';
mobilgenesivoleybol[mp] +='<div class="text">' + Live.country[18][cus].countryname.toUpperCase() + '</div>';
mobilgenesivoleybol[mp] +='</div>';
mobilgenesivoleybol[mp] +='</div>';
glcadd = false;
}
}else{
mp = 0;
if (add) {
mobilgenesivoleybol[mp] +='<div class="navtitle navsub ">';
mobilgenesivoleybol[mp] +='<div class="tlsubitem">';
mobilgenesivoleybol[mp] +='<div class="icon">';
mobilgenesivoleybol[mp] +='<div class="sports_small volleyball"></div>';
mobilgenesivoleybol[mp] +='</div>';
mobilgenesivoleybol[mp] +='<div class="text">' + Live.country[18][cus].countryname.toUpperCase() + '</div>';
mobilgenesivoleybol[mp] +='</div>';
mobilgenesivoleybol[mp] +='</div>';
add = false;
}
}
mobilgenesivoleybol[mp]+='<div class="odd" id="bts_'+k+'">';
mobilgenesivoleybol[mp]+='<div id="e'+k+'" class="event match " onclick="">';
mobilgenesivoleybol[mp]+='<div class="hidden">';
mobilgenesivoleybol[mp]+='<div colspan="11" class="c_comment">';
mobilgenesivoleybol[mp]+='<div class="c_comment"></div>';
mobilgenesivoleybol[mp]+='<div class="c_pointer"></div>';
mobilgenesivoleybol[mp]+='</div>';
mobilgenesivoleybol[mp]+='</div>';
mobilgenesivoleybol[mp]+='<div class="event_wrapper">';
mobilgenesivoleybol[mp]+='<div class="datetime loggedinLive">';
mobilgenesivoleybol[mp]+='<div class="favorites "><img src="assets/img/favorite'+(Live.myfavs[k] ? '1':'0')+'.png" onclick="Live.Addfavevent(\''+(Live.myfavs[k] ? 'rem':'add')+'\','+k+');"></div>';
mobilgenesivoleybol[mp]+='<div class="sportsIcon ">';
mobilgenesivoleybol[mp]+='<div class="icon">';
mobilgenesivoleybol[mp]+='<div class="sports volleyball"></div>';
mobilgenesivoleybol[mp]+='</div>';
mobilgenesivoleybol[mp]+='</div>';

if (Live.bets[k].pid == 0) {
mobilgenesivoleybol[mp]+='<div class="date small ">';
mobilgenesivoleybol[mp]+='<div> '+ Live.FixHours(Live.bets[k].startdate) + ' </div><img src="assets/img/icons/live_rain.png" alt="" width="23" height="23" class="hidden"><span class=""> <img src="assets/img/icon_live.png" alt="" width="24" height="12"> </span></div>';
mobilgenesivoleybol[mp]+='</div>';
}else{
mobilgenesivoleybol[mp]+='<div class="date standard ">';
mobilgenesivoleybol[mp]+='<div> '+Live.GetPeriyod(parseInt(Live.bets[k].spid), parseInt(Live.bets[k].pid))+' </div><img src="assets/img/icons/live_rain.png" alt="" width="23" height="23" class="hidden"><span class=""> <img src="assets/img/icon_liveRunning_red.gif" alt="" width="24" height="12"> </span></div>';
mobilgenesivoleybol[mp]+='</div>';
}

mobilgenesivoleybol[mp]+='<div class="teamrows"  onclick="Live.Details.Open('+k+'); app.fromEventId = window.scrollY > 0 ? '+k+' : null;">';
mobilgenesivoleybol[mp]+='<div class="teamrow">';
mobilgenesivoleybol[mp]+='<div class="team"> '+Live.bets[k].hteam+' '+(Live.bets[k].rch>0 ? '<img class="redCards" src="assets/img/scorebox/red-card.png" width="20" height="20">':'')+'</div>';
mobilgenesivoleybol[mp]+='<div class="score">';
mobilgenesivoleybol[mp]+='<div class="hidden"><span class=""></span></div>';
mobilgenesivoleybol[mp]+='<div class="hidden"><span class=""></span></div>';
mobilgenesivoleybol[mp]+='<div class="hidden"><span class=""></span></div>';
mobilgenesivoleybol[mp]+='<div class="hidden"><span class="">' + Live.bets[k].isch + '</span></div>';
mobilgenesivoleybol[mp]+='<div class="bold"><span class="">' + Live.bets[k].sch + '</span></div>';
mobilgenesivoleybol[mp]+='<div class="hidden"><span class=""></span></div>';
mobilgenesivoleybol[mp]+='<div class="hidden"><span class=""></span></div>';
mobilgenesivoleybol[mp]+='</div>';
mobilgenesivoleybol[mp]+='</div>';
mobilgenesivoleybol[mp]+='<div class="teamrow">';
mobilgenesivoleybol[mp]+='<div class="team"> '+Live.bets[k].ateam+' '+(Live.bets[k].rca>0 ? '<img class="redCards" src="assets/img/scorebox/red-card.png" width="20" height="20">':'')+'</div>';
mobilgenesivoleybol[mp]+='<div class="score">';
mobilgenesivoleybol[mp]+='<div class="hidden top"><span class=""></span></div>';
mobilgenesivoleybol[mp]+='<div class="hidden top"><span class=""></span></div>';
mobilgenesivoleybol[mp]+='<div class="hidden top"><span class=""></span></div>';
mobilgenesivoleybol[mp]+='<div class="hidden top"><span class="">' + Live.bets[k].isca + '</span></div>';
mobilgenesivoleybol[mp]+='<div class="bold top"><span class="">' + Live.bets[k].sca + '</span></div>';
mobilgenesivoleybol[mp]+='<div class="hidden top"><span class=""></span></div>';
mobilgenesivoleybol[mp]+='<div class="hidden top"><span class=""></span></div>';
mobilgenesivoleybol[mp]+='</div>';
mobilgenesivoleybol[mp]+='</div>';
mobilgenesivoleybol[mp]+='</div>';
mobilgenesivoleybol[mp]+='<div class="hidden">';
mobilgenesivoleybol[mp]+='<div class="hidden"> </div>';
mobilgenesivoleybol[mp]+='</div>';
mobilgenesivoleybol[mp]+='<div class="arrow_blk_down" onclick="Live.Details.Open('+k+'); app.fromEventId = window.scrollY > 0 ? '+k+' : null;"></div>';
mobilgenesivoleybol[mp]+=''+(Live.bets[k].videoid>0 ? '<br><div class="icon" style="margin-top: 14px;"><div class="sports_small tv-show"></div></div>':'')+'';
mobilgenesivoleybol[mp]+='<div class="hidden onlive"></div>';
mobilgenesivoleybol[mp]+='</div>';
mobilgenesivoleybol[mp]+='</div>';
mobilgenesivoleybol[mp]+='</div>';  


mobilgenesivoleybol[mp]+='<div class="navitem noborder w100 even" style="">';
if(Live.bets[k].games[170] && Live.bets[k].games[170].count==2 && Live.bets[k].games[170].statu)
{
mobilgenesivoleybol[mp]+='<div class="cell rsDesc w50">'+Bahis.oyunlar[170].ad+'</div>';
$.each(Live.bets[k].games[170].oranlar, function(n, o) {
if(o.statu)
{

var qbut = CryptoJS.MD5(Bahis.oyunlar[170].ad+"|"+o.tercih+"|"+k);

mobilgenesivoleybol[mp]+='<div class="cell w25 rsBut">';
mobilgenesivoleybol[mp]+='<div class="'+k+' qbutton qbut-'+qbut+' '+o.image+'" oddsid="'+k+''+o.brid+'" onclick="canliekle('+k+''+o.brid+',\''+Bahis.oyunlar[170].ad+'\',\''+o.tercih+'\',\''+o.oran+'\',\''+k+'\',\''+Live.bets[k].spid+'\', this);void(0);">';
mobilgenesivoleybol[mp]+='<div class="caption">'+o.tercih+'</div>';
mobilgenesivoleybol[mp]+='<div class="quote">'+o.oran+'</div>';
mobilgenesivoleybol[mp]+='</div>';
mobilgenesivoleybol[mp]+='</div>';
}
});
}
mobilgenesivoleybol[mp]+='</div>';
cb++;
}
}
}

for (var cus in Live.country[12]) {
var add = true;
var favadd = true;
var glcadd = true;
var cc = 0;
for (var k in Live.country[12][cus].bets) {
if (Live.bets[k].status == 1) {

if(Live.myfavs[k])
{
mp = 2;
if (favadd) {
mobilgenesibuzhokeyi[mp] +='<div class="navtitle navsub ">';
mobilgenesibuzhokeyi[mp] +='<div class="tlsubitem">';
mobilgenesibuzhokeyi[mp] +='<div class="icon">';
mobilgenesibuzhokeyi[mp] +='<div class="sports_small ice-hockey"></div>';
mobilgenesibuzhokeyi[mp] +='</div>';
mobilgenesibuzhokeyi[mp] +='<div class="text">' + Live.country[12][cus].countryname.toUpperCase() + '</div>';
mobilgenesibuzhokeyi[mp] +='</div>';
mobilgenesibuzhokeyi[mp] +='</div>';
favadd = false;
}
}else if (Live.bets[k].pid == 0) {
mp = 1;
if (glcadd) {
mobilgenesibuzhokeyi[mp] +='<div class="navtitle navsub ">';
mobilgenesibuzhokeyi[mp] +='<div class="tlsubitem">';
mobilgenesibuzhokeyi[mp] +='<div class="icon">';
mobilgenesibuzhokeyi[mp] +='<div class="sports_small ice-hockey"></div>';
mobilgenesibuzhokeyi[mp] +='</div>';
mobilgenesibuzhokeyi[mp] +='<div class="text">' + Live.country[12][cus].countryname.toUpperCase() + '</div>';
mobilgenesibuzhokeyi[mp] +='</div>';
mobilgenesibuzhokeyi[mp] +='</div>';
glcadd = false;
}
}else{
mp = 0;
if (add) {
mobilgenesibuzhokeyi[mp] +='<div class="navtitle navsub ">';
mobilgenesibuzhokeyi[mp] +='<div class="tlsubitem">';
mobilgenesibuzhokeyi[mp] +='<div class="icon">';
mobilgenesibuzhokeyi[mp] +='<div class="sports_small ice-hockey"></div>';
mobilgenesibuzhokeyi[mp] +='</div>';
mobilgenesibuzhokeyi[mp] +='<div class="text">' + Live.country[12][cus].countryname.toUpperCase() + '</div>';
mobilgenesibuzhokeyi[mp] +='</div>';
mobilgenesibuzhokeyi[mp] +='</div>';
add = false;
}
}
mobilgenesibuzhokeyi[mp]+='<div class="odd" id="bts_'+k+'">';
mobilgenesibuzhokeyi[mp]+='<div id="e'+k+'" class="event match " onclick="">';
mobilgenesibuzhokeyi[mp]+='<div class="hidden">';
mobilgenesibuzhokeyi[mp]+='<div colspan="11" class="c_comment">';
mobilgenesibuzhokeyi[mp]+='<div class="c_comment"></div>';
mobilgenesibuzhokeyi[mp]+='<div class="c_pointer"></div>';
mobilgenesibuzhokeyi[mp]+='</div>';
mobilgenesibuzhokeyi[mp]+='</div>';
mobilgenesibuzhokeyi[mp]+='<div class="event_wrapper">';
mobilgenesibuzhokeyi[mp]+='<div class="datetime loggedinLive">';
mobilgenesibuzhokeyi[mp]+='<div class="favorites "><img src="assets/img/favorite'+(Live.myfavs[k] ? '1':'0')+'.png" onclick="Live.Addfavevent(\''+(Live.myfavs[k] ? 'rem':'add')+'\','+k+');"></div>';
mobilgenesibuzhokeyi[mp]+='<div class="sportsIcon ">';
mobilgenesibuzhokeyi[mp]+='<div class="icon">';
mobilgenesibuzhokeyi[mp]+='<div class="sports ice-hockey"></div>';
mobilgenesibuzhokeyi[mp]+='</div>';
mobilgenesibuzhokeyi[mp]+='</div>';

if (Live.bets[k].pid == 0) {
mobilgenesibuzhokeyi[mp]+='<div class="date small ">';
mobilgenesibuzhokeyi[mp]+='<div> '+ Live.FixHours(Live.bets[k].startdate) + ' </div><img src="assets/img/icons/live_rain.png" alt="" width="23" height="23" class="hidden"><span class=""> <img src="assets/img/icon_live.png" alt="" width="24" height="12"> </span></div>';
mobilgenesibuzhokeyi[mp]+='</div>';
}else{
mobilgenesibuzhokeyi[mp]+='<div class="date standard ">';
mobilgenesibuzhokeyi[mp]+='<div> '+Live.GetPeriyod(parseInt(Live.bets[k].spid), parseInt(Live.bets[k].pid))+' </div><img src="assets/img/icons/live_rain.png" alt="" width="23" height="23" class="hidden"><span class=""> <img src="assets/img/icon_liveRunning_red.gif" alt="" width="24" height="12"> </span></div>';
mobilgenesibuzhokeyi[mp]+='</div>';
}

mobilgenesibuzhokeyi[mp]+='<div class="teamrows"  onclick="Live.Details.Open('+k+'); app.fromEventId = window.scrollY > 0 ? '+k+' : null;">';
mobilgenesibuzhokeyi[mp]+='<div class="teamrow">';
mobilgenesibuzhokeyi[mp]+='<div class="team"> '+Live.bets[k].hteam+' '+(Live.bets[k].rch>0 ? '<img class="redCards" src="assets/img/scorebox/red-card.png" width="20" height="20">':'')+'</div>';
mobilgenesibuzhokeyi[mp]+='<div class="score">';
mobilgenesibuzhokeyi[mp]+='<div class="hidden"><span class=""></span></div>';
mobilgenesibuzhokeyi[mp]+='<div class="hidden"><span class=""></span></div>';
mobilgenesibuzhokeyi[mp]+='<div class="hidden"><span class=""></span></div>';
mobilgenesibuzhokeyi[mp]+='<div class="hidden"><span class="">' + Live.bets[k].isch + '</span></div>';
mobilgenesibuzhokeyi[mp]+='<div class="bold"><span class="">' + Live.bets[k].sch + '</span></div>';
mobilgenesibuzhokeyi[mp]+='<div class="hidden"><span class=""></span></div>';
mobilgenesibuzhokeyi[mp]+='<div class="hidden"><span class=""></span></div>';
mobilgenesibuzhokeyi[mp]+='</div>';
mobilgenesibuzhokeyi[mp]+='</div>';
mobilgenesibuzhokeyi[mp]+='<div class="teamrow">';
mobilgenesibuzhokeyi[mp]+='<div class="team"> '+Live.bets[k].ateam+' '+(Live.bets[k].rca>0 ? '<img class="redCards" src="assets/img/scorebox/red-card.png" width="20" height="20">':'')+'</div>';
mobilgenesibuzhokeyi[mp]+='<div class="score">';
mobilgenesibuzhokeyi[mp]+='<div class="hidden top"><span class=""></span></div>';
mobilgenesibuzhokeyi[mp]+='<div class="hidden top"><span class=""></span></div>';
mobilgenesibuzhokeyi[mp]+='<div class="hidden top"><span class=""></span></div>';
mobilgenesibuzhokeyi[mp]+='<div class="hidden top"><span class="">' + Live.bets[k].isca + '</span></div>';
mobilgenesibuzhokeyi[mp]+='<div class="bold top"><span class="">' + Live.bets[k].sca + '</span></div>';
mobilgenesibuzhokeyi[mp]+='<div class="hidden top"><span class=""></span></div>';
mobilgenesibuzhokeyi[mp]+='<div class="hidden top"><span class=""></span></div>';
mobilgenesibuzhokeyi[mp]+='</div>';
mobilgenesibuzhokeyi[mp]+='</div>';
mobilgenesibuzhokeyi[mp]+='</div>';
mobilgenesibuzhokeyi[mp]+='<div class="hidden">';
mobilgenesibuzhokeyi[mp]+='<div class="hidden"> </div>';
mobilgenesibuzhokeyi[mp]+='</div>';
mobilgenesibuzhokeyi[mp]+='<div class="arrow_blk_down" onclick="Live.Details.Open('+k+'); app.fromEventId = window.scrollY > 0 ? '+k+' : null;"></div>';
mobilgenesibuzhokeyi[mp]+=''+(Live.bets[k].videoid>0 ? '<br><div class="icon" style="margin-top: 14px;"><div class="sports_small tv-show"></div></div>':'')+'';
mobilgenesibuzhokeyi[mp]+='<div class="hidden onlive"></div>';
mobilgenesibuzhokeyi[mp]+='</div>';
mobilgenesibuzhokeyi[mp]+='</div>';
mobilgenesibuzhokeyi[mp]+='</div>';  


mobilgenesibuzhokeyi[mp]+='<div class="navitem noborder w100 even" style="">';
if(Live.bets[k].games[6024] && Live.bets[k].games[6024].statu)
{
mobilgenesibuzhokeyi[mp]+='<div class="cell rsDesc w50">'+Bahis.oyunlar[6024].ad+'</div>';
$.each(Live.bets[k].games[6024].oranlar, function(n, o) {
if(o.statu)
{

var qbut = CryptoJS.MD5(Bahis.oyunlar[6024].ad+"|"+o.tercih+"|"+k);

mobilgenesibuzhokeyi[mp]+='<div class="cell w25 rsBut">';
mobilgenesibuzhokeyi[mp]+='<div class="'+k+' qbutton qbut-'+qbut+' '+o.image+'" oddsid="'+k+''+o.brid+'" onclick="canliekle('+k+''+o.brid+',\''+Bahis.oyunlar[6024].ad+'\',\''+o.tercih+'\',\''+o.oran+'\',\''+k+'\',\''+Live.bets[k].spid+'\', this);void(0);">';
mobilgenesibuzhokeyi[mp]+='<div class="caption">'+o.tercih+'</div>';
mobilgenesibuzhokeyi[mp]+='<div class="quote">'+o.oran+'</div>';
mobilgenesibuzhokeyi[mp]+='</div>';
mobilgenesibuzhokeyi[mp]+='</div>';
}
});
}
mobilgenesibuzhokeyi[mp]+='</div>';
cb++;
}
}
}


if(mobilgenesi[0])
{
$('.evetnliveadded').html(mobilgenesi[0].replace('undefined', ''));
kuponguncelle();
}else{
$('.evetnliveadded').html('<div class="msg_groupError"><div class="space_2">&nbsp;</div><div class="msgtext Notice"><div class="text">Şu An Canlı Futbol Karşılaşması Bulunmamaktadır.</div></div></div>');
}

if(mobilgenesivoleybol[0])
{
$('.evetnliveaddedvoleybol').html(mobilgenesivoleybol[0].replace('undefined', ''));
kuponguncelle();
}else{
$('.evetnliveaddedvoleybol').html('<div class="msg_groupError"><div class="space_2">&nbsp;</div><div class="msgtext Notice"><div class="text">Şu An Canlı Voleybol Karşılaşması Bulunmamaktadır.</div></div></div>');
}

if(mobilgenesibuzhokeyi[0])
{
$('.evetnliveaddedbuzhokeyi').html(mobilgenesibuzhokeyi[0].replace('undefined', ''));
kuponguncelle();
}else{
$('.evetnliveaddedbuzhokeyi').html('<div class="msg_groupError"><div class="space_2">&nbsp;</div><div class="msgtext Notice"><div class="text">Şu An Canlı Buz Hokeyi Karşılaşması Bulunmamaktadır.</div></div></div>');
}

if(mobilgenesibas[0])
{
$('.evetnliveaddedbasket').html(mobilgenesibas[0].replace('undefined', ''));
kuponguncelle();
}else{
$('.evetnliveaddedbasket').html('<div class="msg_groupError"><div class="space_2">&nbsp;</div><div class="msgtext Notice"><div class="text">Şu An Canlı Basketbol Karşılaşması Bulunmamaktadır.</div></div></div>');
}

if(mobilgenesimtenis[0])
{
$('.evetnliveaddedmtennis').html(mobilgenesimtenis[0].replace('undefined', ''));
kuponguncelle();
}else{
$('.evetnliveaddedmtennis').html('<div class="msg_groupError"><div class="space_2">&nbsp;</div><div class="msgtext Notice"><div class="text">Şu An Canlı Masa Tenisi Karşılaşması Bulunmamaktadır.</div></div></div>');
}
if(mobilgenesitenis[0])
{
$('.evetnliveaddedtennis').html(mobilgenesitenis[0].replace('undefined', ''));
kuponguncelle();
}else{
$('.evetnliveaddedtennis').html('<div class="msg_groupError"><div class="space_2">&nbsp;</div><div class="msgtext Notice"><div class="text">Şu An Canlı Tenis Karşılaşması Bulunmamaktadır.</div></div></div>');
}


if(mobilgenesi[2] || mobilgenesib[2] || mobilgenesibas[2] || mobilgenesibasa[2] || mobilgenesitenis[2] || mobilgenesitenisa[2] || mobilgenesimtenis[2] || mobilgenesimtenisa[2])
{
var writefav = '';
if(mobilgenesi[2])
{
writefav+=mobilgenesi[2].replace('undefined', '');
}
if(mobilgenesib[2])
{
writefav+=mobilgenesib[2].replace('undefined', '');
}
if(mobilgenesibas[2])
{
writefav+=mobilgenesibas[2].replace('undefined', '');
}
if(mobilgenesibasa[2])
{
writefav+=mobilgenesibasa[2].replace('undefined', '');
}
if(mobilgenesitenis[2])
{
writefav+=mobilgenesitenis[2].replace('undefined', '');
}
if(mobilgenesitenisa[2])
{
writefav+=mobilgenesitenisa[2].replace('undefined', '');
}
if(mobilgenesimtenis[2])
{
writefav+=mobilgenesimtenis[2].replace('undefined', '');
}
if(mobilgenesimtenisa[2])
{
writefav+=mobilgenesimtenisa[2].replace('undefined', '');
}

$('.evetnliveaddedfav').empty().html(writefav.replace('undefined', ''));
}
if(Object.keys(Live.myfavs).length>0)
{
$(".myEventsHeader,.evetnliveaddedfav").show();
}else{
$(".myEventsHeader,.evetnliveaddedfav").hide();
}
        Live.HideCountry();
	Live.HideCountrymain();
        this.CheckGoal();
     },
     OddsFixed: function(rate) {
	 if(parseFloat(Live.maxliveodd)>0 && rate>parseFloat(Live.maxliveodd))
	 {
	 return parseFloat(Live.maxliveodd).toFixed(2);
	 }
         if (Live.orktr == 1) {
         if(rate> 55){
			 degisim = "50.00";
		 } else if(rate> 10){
			 degisim = parseFloat(rate - "3.50").toFixed(2);
		 } else if(rate> 5){
			 degisim = parseFloat(rate - "1.50").toFixed(2);
		 } else if(rate> 3){
			 degisim = parseFloat(rate - "0.30").toFixed(2);
		 } else if(rate> 2){
			 degisim = parseFloat(rate - "0.20").toFixed(2);
		 } else if(rate> 1.60 && rate < 2.01){
			 degisim = parseFloat(rate - "0.20").toFixed(2);
		 }  else {
			 degisim = parseFloat(rate).toFixed(2);
		 }
     } else if (Live.orktr == 2) {
         if(rate > 55){
			 degisim = "50.00";
		 } else if(rate > 10){
			 degisim = parseFloat(rate - "4.20").toFixed(2);
		 } else if(rate > 5){
			 degisim = parseFloat(rate - "1.70").toFixed(2);
		 } else if(rate > 3){
			 degisim = parseFloat(rate - "0.50").toFixed(2);
		 } else if(rate > 2){
			 degisim = parseFloat(rate - "0.40").toFixed(2);
		 } else if(rate > 1.60 && rate < 2.01){
			 degisim = parseFloat(rate - "0.30").toFixed(2);
		 } else if(rate > 1.30 && rate < 1.60){
			 degisim = parseFloat(rate - "0.30").toFixed(2);
		 } else {
			 degisim = parseFloat(rate).toFixed(2);
		 }
     } else if (Live.orktr == 3) {
         if(rate> 60){
			 degisim = "60.00";
		 } else if(rate> 10){
			 degisim =  parseFloat(rate - "4.30").toFixed(2);
		 } else if(rate> 5){
			 degisim =  parseFloat(rate - "1.80").toFixed(2);
		 } else if(rate> 3){
			 degisim =  parseFloat(rate - "0.60").toFixed(2);
		 } else if(rate> 2){
			 degisim =  parseFloat(rate - "0.50").toFixed(2);
		 } else if(rate> 1.00 && rate < 1.30){
			 degisim =  parseFloat(rate - "0.40").toFixed(2);
		 } else {
			 degisim =  parseFloat(rate).toFixed(2);
		 }
     } else {
			 degisim = rate;
     }
	 
         return degisim;
     },
     OddsFixedcbd: function(rate) {
	 if(parseFloat(Live.maxliveodd)>0 && rate>parseFloat(Live.maxliveodd))
	 {
	 return parseFloat(Live.maxliveodd).toFixed(2);
	 }
         if (Live.cbdorktr == 0 || rate < 1.20) {
             return rate;
         }
         if (rate < 10) {
             fl = Math.floor(rate);
             degisim = parseFloat(fl * Live.cbdorktr * 0.05).toFixed(2);
         } else if (rate >= 10 && rate <= 100) {
             fl = Math.floor(rate / 10);
             degisim = parseFloat(fl * Live.cbdorktr * 1).toFixed(2);
         } else {
             fl = Math.floor(rate / 100);
             degisim = parseFloat(fl * Live.cbdorktr * 5).toFixed(2);
         }
         rate = parseFloat(rate - degisim).toFixed(2);
         return rate;
     },   
     OddsFixedcb: function(rate) {
	 if(parseFloat(Live.maxliveodd)>0 && rate>parseFloat(Live.maxliveodd))
	 {
	 return parseFloat(Live.maxliveodd).toFixed(2);
	 }
         if (Live.cborktr == 1) {
         if(rate> 55){
			 degisim = "50.00";
		 } else if(rate> 10){
			 degisim = parseFloat(rate - "3.50").toFixed(2);
		 } else if(rate> 5){
			 degisim = parseFloat(rate - "1.50").toFixed(2);
		 } else if(rate> 3){
			 degisim = parseFloat(rate - "0.30").toFixed(2);
		 } else if(rate> 2){
			 degisim = parseFloat(rate - "0.20").toFixed(2);
		 } else if(rate> 1.60 && rate < 2.01){
			 degisim = parseFloat(rate - "0.20").toFixed(2);
		 }  else {
			 degisim = parseFloat(rate).toFixed(2);
		 }
     } else if (Live.cborktr == 2) {
         if(rate > 55){
			 degisim = "50.00";
		 } else if(rate > 10){
			 degisim = parseFloat(rate - "4.20").toFixed(2);
		 } else if(rate > 5){
			 degisim = parseFloat(rate - "1.70").toFixed(2);
		 } else if(rate > 3){
			 degisim = parseFloat(rate - "0.50").toFixed(2);
		 } else if(rate > 2){
			 degisim = parseFloat(rate - "0.40").toFixed(2);
		 } else if(rate > 1.60 && rate < 2.01){
			 degisim = parseFloat(rate - "0.30").toFixed(2);
		 } else if(rate > 1.30 && rate < 1.60){
			 degisim = parseFloat(rate - "0.30").toFixed(2);
		 } else {
			 degisim = parseFloat(rate).toFixed(2);
		 }
     } else if (Live.cborktr == 3) {
         if(rate> 60){
			 degisim = "60.00";
		 } else if(rate> 10){
			 degisim =  parseFloat(rate - "4.30").toFixed(2);
		 } else if(rate> 5){
			 degisim =  parseFloat(rate - "1.80").toFixed(2);
		 } else if(rate> 3){
			 degisim =  parseFloat(rate - "0.60").toFixed(2);
		 } else if(rate> 2){
			 degisim =  parseFloat(rate - "0.50").toFixed(2);
		 } else if(rate> 1.00 && rate < 1.30){
			 degisim =  parseFloat(rate - "0.40").toFixed(2);
		 } else {
			 degisim =  parseFloat(rate).toFixed(2);
		 }
     } else {
			 degisim = rate;
     }
         return degisim;
     },
	 OddsFixedct: function(rate) {
	 if(parseFloat(Live.maxliveodd)>0 && rate>parseFloat(Live.maxliveodd))
	 {
	 return parseFloat(Live.maxliveodd).toFixed(2);
	 }
         if (Live.ctorktr == 1) {
         if(rate> 55){
			 degisim = "50.00";
		 } else if(rate> 10){
			 degisim = parseFloat(rate - "3.50").toFixed(2);
		 } else if(rate> 5){
			 degisim = parseFloat(rate - "1.50").toFixed(2);
		 } else if(rate> 3){
			 degisim = parseFloat(rate - "0.30").toFixed(2);
		 } else if(rate> 2){
			 degisim = parseFloat(rate - "0.20").toFixed(2);
		 } else if(rate> 1.60 && rate < 2.01){
			 degisim = parseFloat(rate - "0.20").toFixed(2);
		 }  else {
			 degisim = parseFloat(rate).toFixed(2);
		 }
     } else if (Live.ctorktr == 2) {
         if(rate > 55){
			 degisim = "50.00";
		 } else if(rate > 10){
			 degisim = parseFloat(rate - "4.20").toFixed(2);
		 } else if(rate > 5){
			 degisim = parseFloat(rate - "1.70").toFixed(2);
		 } else if(rate > 3){
			 degisim = parseFloat(rate - "0.50").toFixed(2);
		 } else if(rate > 2){
			 degisim = parseFloat(rate - "0.40").toFixed(2);
		 } else if(rate > 1.60 && rate < 2.01){
			 degisim = parseFloat(rate - "0.30").toFixed(2);
		 } else if(rate > 1.30 && rate < 1.60){
			 degisim = parseFloat(rate - "0.30").toFixed(2);
		 } else {
			 degisim = parseFloat(rate).toFixed(2);
		 }
     } else if (Live.ctorktr == 3) {
         if(rate> 60){
			 degisim = "60.00";
		 } else if(rate> 10){
			 degisim =  parseFloat(rate - "4.30").toFixed(2);
		 } else if(rate> 5){
			 degisim =  parseFloat(rate - "1.80").toFixed(2);
		 } else if(rate> 3){
			 degisim =  parseFloat(rate - "0.60").toFixed(2);
		 } else if(rate> 2){
			 degisim =  parseFloat(rate - "0.50").toFixed(2);
		 } else if(rate> 1.00 && rate < 1.30){
			 degisim =  parseFloat(rate - "0.40").toFixed(2);
		 } else {
			 degisim =  parseFloat(rate).toFixed(2);
		 }
     } else {
			 degisim = rate;
     }
         return degisim;
     },
	 OddsFixedcv: function(rate) {
	 if(parseFloat(Live.maxliveodd)>0 && rate>parseFloat(Live.maxliveodd))
	 {
	 return parseFloat(Live.maxliveodd).toFixed(2);
	 }
         if (Live.cvorktr == 1) {
         if(rate> 55){
			 degisim = "50.00";
		 } else if(rate> 10){
			 degisim = parseFloat(rate - "3.50").toFixed(2);
		 } else if(rate> 5){
			 degisim = parseFloat(rate - "1.50").toFixed(2);
		 } else if(rate> 3){
			 degisim = parseFloat(rate - "0.30").toFixed(2);
		 } else if(rate> 2){
			 degisim = parseFloat(rate - "0.20").toFixed(2);
		 } else if(rate> 1.60 && rate < 2.01){
			 degisim = parseFloat(rate - "0.20").toFixed(2);
		 }  else {
			 degisim = parseFloat(rate).toFixed(2);
		 }
     } else if (Live.cvorktr == 2) {
         if(rate > 55){
			 degisim = "50.00";
		 } else if(rate > 10){
			 degisim = parseFloat(rate - "4.20").toFixed(2);
		 } else if(rate > 5){
			 degisim = parseFloat(rate - "1.70").toFixed(2);
		 } else if(rate > 3){
			 degisim = parseFloat(rate - "0.50").toFixed(2);
		 } else if(rate > 2){
			 degisim = parseFloat(rate - "0.40").toFixed(2);
		 } else if(rate > 1.60 && rate < 2.01){
			 degisim = parseFloat(rate - "0.30").toFixed(2);
		 } else if(rate > 1.30 && rate < 1.60){
			 degisim = parseFloat(rate - "0.30").toFixed(2);
		 } else {
			 degisim = parseFloat(rate).toFixed(2);
		 }
     } else if (Live.cvorktr == 3) {
         if(rate> 60){
			 degisim = "60.00";
		 } else if(rate> 10){
			 degisim =  parseFloat(rate - "4.30").toFixed(2);
		 } else if(rate> 5){
			 degisim =  parseFloat(rate - "1.80").toFixed(2);
		 } else if(rate> 3){
			 degisim =  parseFloat(rate - "0.60").toFixed(2);
		 } else if(rate> 2){
			 degisim =  parseFloat(rate - "0.50").toFixed(2);
		 } else if(rate> 1.00 && rate < 1.30){
			 degisim =  parseFloat(rate - "0.40").toFixed(2);
		 } else {
			 degisim =  parseFloat(rate).toFixed(2);
		 }
     } else {
			 degisim = rate;
     }
         return degisim;
     },
	 OddsFixedcbuz: function(rate) {
	 if(parseFloat(Live.maxliveodd)>0 && rate>parseFloat(Live.maxliveodd))
	 {
	 return parseFloat(Live.maxliveodd).toFixed(2);
	 }
         if (Live.cbuzorktr == 1) {
         if(rate> 55){
			 degisim = "50.00";
		 } else if(rate> 10){
			 degisim = parseFloat(rate - "3.50").toFixed(2);
		 } else if(rate> 5){
			 degisim = parseFloat(rate - "1.50").toFixed(2);
		 } else if(rate> 3){
			 degisim = parseFloat(rate - "0.30").toFixed(2);
		 } else if(rate> 2){
			 degisim = parseFloat(rate - "0.20").toFixed(2);
		 } else if(rate> 1.60 && rate < 2.01){
			 degisim = parseFloat(rate - "0.20").toFixed(2);
		 }  else {
			 degisim = parseFloat(rate).toFixed(2);
		 }
     } else if (Live.cbuzorktr == 2) {
         if(rate > 55){
			 degisim = "50.00";
		 } else if(rate > 10){
			 degisim = parseFloat(rate - "4.20").toFixed(2);
		 } else if(rate > 5){
			 degisim = parseFloat(rate - "1.70").toFixed(2);
		 } else if(rate > 3){
			 degisim = parseFloat(rate - "0.50").toFixed(2);
		 } else if(rate > 2){
			 degisim = parseFloat(rate - "0.40").toFixed(2);
		 } else if(rate > 1.60 && rate < 2.01){
			 degisim = parseFloat(rate - "0.30").toFixed(2);
		 } else if(rate > 1.30 && rate < 1.60){
			 degisim = parseFloat(rate - "0.30").toFixed(2);
		 } else {
			 degisim = parseFloat(rate).toFixed(2);
		 }
     } else if (Live.cbuzorktr == 3) {
         if(rate> 60){
			 degisim = "60.00";
		 } else if(rate> 10){
			 degisim =  parseFloat(rate - "4.30").toFixed(2);
		 } else if(rate> 5){
			 degisim =  parseFloat(rate - "1.80").toFixed(2);
		 } else if(rate> 3){
			 degisim =  parseFloat(rate - "0.60").toFixed(2);
		 } else if(rate> 2){
			 degisim =  parseFloat(rate - "0.50").toFixed(2);
		 } else if(rate> 1.00 && rate < 1.30){
			 degisim =  parseFloat(rate - "0.40").toFixed(2);
		 } else {
			 degisim =  parseFloat(rate).toFixed(2);
		 }
     } else {
			 degisim = rate;
     }
         return degisim;
     },
	 OddsFixedcmt: function(rate) {
	 if(parseFloat(Live.maxliveodd)>0 && rate>parseFloat(Live.maxliveodd))
	 {
	 return parseFloat(Live.maxliveodd).toFixed(2);
	 }
         if (Live.cmtorktr == 1) {
         if(rate> 55){
			 degisim = "50.00";
		 } else if(rate> 10){
			 degisim = parseFloat(rate - "3.50").toFixed(2);
		 } else if(rate> 5){
			 degisim = parseFloat(rate - "1.50").toFixed(2);
		 } else if(rate> 3){
			 degisim = parseFloat(rate - "0.30").toFixed(2);
		 } else if(rate> 2){
			 degisim = parseFloat(rate - "0.20").toFixed(2);
		 } else if(rate> 1.60 && rate < 2.01){
			 degisim = parseFloat(rate - "0.20").toFixed(2);
		 }  else {
			 degisim = parseFloat(rate).toFixed(2);
		 }
     } else if (Live.cmtorktr == 2) {
         if(rate > 55){
			 degisim = "50.00";
		 } else if(rate > 10){
			 degisim = parseFloat(rate - "4.20").toFixed(2);
		 } else if(rate > 5){
			 degisim = parseFloat(rate - "1.70").toFixed(2);
		 } else if(rate > 3){
			 degisim = parseFloat(rate - "0.50").toFixed(2);
		 } else if(rate > 2){
			 degisim = parseFloat(rate - "0.40").toFixed(2);
		 } else if(rate > 1.60 && rate < 2.01){
			 degisim = parseFloat(rate - "0.30").toFixed(2);
		 } else if(rate > 1.30 && rate < 1.60){
			 degisim = parseFloat(rate - "0.30").toFixed(2);
		 } else {
			 degisim = parseFloat(rate).toFixed(2);
		 }
     } else if (Live.cmtorktr == 3) {
         if(rate> 60){
			 degisim = "60.00";
		 } else if(rate> 10){
			 degisim =  parseFloat(rate - "4.30").toFixed(2);
		 } else if(rate> 5){
			 degisim =  parseFloat(rate - "1.80").toFixed(2);
		 } else if(rate> 3){
			 degisim =  parseFloat(rate - "0.60").toFixed(2);
		 } else if(rate> 2){
			 degisim =  parseFloat(rate - "0.50").toFixed(2);
		 } else if(rate> 1.00 && rate < 1.30){
			 degisim =  parseFloat(rate - "0.40").toFixed(2);
		 } else {
			 degisim =  parseFloat(rate).toFixed(2);
		 }
     } else {
			 degisim = rate;
     }
         return degisim;
     },

     Translate: function(text) {
         text = text.replace('Suspended', 'Askıya alındı');
         text = text.replace('Red card to', 'Kırmızı kart');
         text = text.replace('Yellow card to', 'Sarı kart');
         text = text.replace('Goal kick to', 'Kale vuruşu');
         text = text.replace('Corner to', 'Köşe vuruşu');
         text = text.replace('Halftime', 'Devre arası');
         text = text.replace('İlkyarı eklenen süre', 'IY Extra Süre');
         text = text.replace('Free kick to', 'Serbest vuruş');
         text = text.replace('Throw in to', 'Taç atışı');
         text = text.replace('1st Half', 'İlkyarı');
         text = text.replace('No clear indication of added time', 'Uzatma Gösteriliyor');
         text = text.replace('2nd Half', 'İkinci yarı');
         text = text.replace('Goal for', 'Gol');
         text = text.replace('Goal by', 'Gol');
         text = text.replace('added time', 'Extra Zaman');
         text = text.replace('minutes', 'dakika');
         text = text.replace('minute', 'dakika');
         text = text.replace('by penalty', 'penaltıdan atıldı');
         text = text.replace('scored by shot', 'şutla atıldı');
         text = text.replace('Players are coming out', 'Oyuncular sahaya çıkıyor');
         text = text.replace('Game about to start', 'Maç başlamak üzere');
         text = text.replace('Offside to', 'Ofsayt');
         text = text.replace('Substitution', 'Oyuncu degisikligi');
         text = text.replace('Finished', 'Sona erdi');
         text = text.replace('Regular time over', 'Normal süre sona erdi');
         text = text.replace('minutes', 'dakika');
         text = text.replace('by head', 'kafa vurusu');
         text = text.replace('Photo taking', 'Fotograf cektiriliyor');
         text = text.replace('National anthem singing', 'Ulusal marş okunuyor');
         text = text.replace('Shake hands', 'oyuncular tokalaşıyor');
         text = text.replace('by shot', 'Sutla atıldı');
         text = text.replace('goal kick', 'kale vuruşu');
         text = text.replace('Last to happen', 'son gerçekleşen olay');
         text = text.replace('Players lined up', 'Oyuncular sıra halinde diziliyor');
         text = text.replace('Penalty awarded to', 'Penaltı vuruşu');
         text = text.replace('Penalty missed', 'Penaltıyı atamadı');
         text = text.replace('penalty missed', 'Penaltıyı atamadı');
         text = text.replace('Kick-off', 'Başlama vuruşu');
         text = text.replace('First goalkeeper', 'İlk kale vuruşu');
         text = text.replace('First team to 3 Throw ins in 1st Half', '1.yarıda hangi takım 3 atışına daha önce ulaşır');
         text = text.replace('First team to 3 Throw ins in match', 'Karşılaşamda hangi takım 3 atışına daha önce ulaşır');
         text = text.replace('1st', '1.');
         text = text.replace('2nd', '2.');
         text = text.replace('3rd', '3.');
         text = text.replace('4th', '4.');
         text = text.replace('5th', '5.');
         text = text.replace('6th', '6.');
         text = text.replace('7th', '7.');
         text = text.replace('8th', '8.');
         text = text.replace('9th', '9.');
         text = text.replace('10th', '10.');
         text = text.replace('11th', '11.');
         text = text.replace('12th', '12.');
         text = text.replace('13th', '13.');
         text = text.replace('Extra Time over', 'Uzatmalar Bitti');
         return text
     },
     GameTranslate: function(text) {
         text = text.replace('Team 1 to win and both teams to score', 'Evsahibi kazanır ve iki takım da gol atar');
         text = text.replace('Team 2 to win and both teams to score', 'Deplasman kazanır ve iki takım da gol atar');
         text = text.replace('Team 1 to win to nil', 'Evsahibi gol yemeden kazanır');
         text = text.replace('Team 2 to win to nil', 'Deplasman gol yemeden kazanır');
         text = text.replace('Both teams not to score', 'İki takım da gol atamaz');
         text = text.replace('Both teams to score and the match to end in a draw', 'İki takım da gol atar ve maç berabere biter');
         text = text.replace('No goal', '0');
         text = text.replace('3 or more', '3 veya daha fazla gol');
         text = text.replace('Exactly 1 Goal', 'Tam 1 gol');
         text = text.replace('Exactly 2 Goals', 'Tam 2 gol');
         text = text.replace('Exactly 3 Goals', 'Tam 3 gol');
         text = text.replace('Exactly 4 Goals', 'Tam 4 gol');
         text = text.replace('Exactly 5 Goals', 'Tam 5 gol');
         text = text.replace('Exactly 6 Goals', 'Tam 6 gol');
         text = text.replace('Exactly 7 Goals', 'Tam 7 gol');
         text = text.replace('1 goal', 'Tam 1 gol');
         text = text.replace('2 goals', 'Tam 2 gol');
         text = text.replace('3 goals', 'Tam 3 gol');
         text = text.replace('4 goals', 'Tam 4 gol');
         text = text.replace('5 goals', 'Tam 5 gol');
         text = text.replace('6 goals', 'Tam 6 gol');
         text = text.replace('7 goals', 'Tam 7 gol');
         text = text.replace('8 or more Goals', '8 veya üstü gol');
         text = text.replace('Under', 'Alt');
         text = text.replace('Over', 'Ust');
         text = text.replace('Yes', 'Evet');
         text = text.replace('No', 'Hayır');
         text = text.replace('Odd', 'Tek');
         text = text.replace('Even', 'Cift');
         text = text.replace('Any other score', 'Başka bir sonuç');
         text = text.replace('1-0, 2-0 or 3-0', '1:0, 2:0 veya 3:0');
         text = text.replace('0-1, 0-2 or 0-3', '0:1, 0:2 veya 0:3');
         text = text.replace('4-0, 5-0 or 6-0', '4:0, 5:0 veya 6:0');
         text = text.replace('0-4, 0-5 or 0-6', '0:4, 0:5 veya 0:6');
         text = text.replace('2-1, 3-1 or 4-1', '2:1, 3:1 veya 4:1');
         text = text.replace('1-2, 1-3 or 1-4', '1:2, 1:3 veya 1:4');
         text = text.replace('3-2, 4-2, 4-3 or 5-1', '3:2, 4:2, 4:3 veya 5:1');
         text = text.replace('2-3, 2-4, 3-4 or 1-5', '2:3, 2:4, 3:4 ya da 1:5');
         text = text.replace('Team 1 to win by any other Score', 'Evsahibi başka bir skorla kazanır');
         text = text.replace('Team 2 to win by any other score', 'Deplasman başka bir skorla kazanır');
         text = text.replace('Draw', 'Berabere');
         text = text.replace(' or less', ' veya daha az');
         text = text.replace(' or more', ' veya üstü');
         text = text.replace(' to ', ' - ');
         text = text.replace(' by ', ' fark ');
         text = text.replace('Team 1 - win and over 2,5 combined goals scored in the game', 'Evsahibi kazanır ve Üst 2,5 Olur');
         text = text.replace('Team 2 - win and over 2,5 combined goals scored in the game', 'Deplasman kazanır ve Üst 2,5 Olur');
         text = text.replace('Team 1 - win and under 2,5 combined goals scored in the game', 'Evsahibi kazanır ve Alt 2,5 Olur');
         text = text.replace('Team 2 - win and under 2,5 combined goals scored in the game', 'Deplasman kazanır ve Alt 2,5 Olur');
         return text;
     },
     FindSwf: function(flash) {
         var swf;
         if (window.document[flash]) {
             swf = window.document[flash];
         }
         if (navigator.appName.indexOf("Microsoft Internet") == -1) {
             if (document.embeds && document.embeds[flash]) {
                 swf = document.embeds[flash];
             }
         } else {
             swf = document.getElementById(flash);
         }
         return swf;
     },
     Gol: function() {
	
     },
     DudukCal: function() {
	
     },
     DudukCalVoley: function() {
	
     },
     Search: function() {
         var searchstring = $('#livesearchinput').val();
         var c = 0;
         if (searchstring.length == 0) {
             $('#live_ac_results').hide();
             return;
         }
         var bulundu = false;
         var patt1 = new RegExp(searchstring, "ig");
         $html = [];
         $html.push('<div class="bartitle"><div class="text">Canlı</div></div>');
         for (var eid in Live.bets) {
             if (Live.bets[eid].status == 1 && (Live.bets[eid].hteam.match(patt1) || Live.bets[eid].ateam.match(patt1) || Live.bets[eid].country.match(patt1))) {
                 if (c < 9) {
                     $html.push('<div class="barbottom" onclick="go(\'sports/event/' + eid + '\'); app.fromEventId = window.scrollY > 0 ? ' + eid + ' : null;">');
                     $html.push('<div class="text">' + Live.bets[eid].hteam + '-' + Live.bets[eid].ateam + ' (' + Live.bets[eid].sch + ':' + Live.bets[eid].sca + ')</div>');
                     $html.push('</div>');
                 }
                 c++;
             }
         }
         if (!c) {
         $html.push('<div class="bartitle"><div class="text">Sonuç Bulunamadı</div></div>');
         }
         $html.push('<div class="barbottomright" onclick="hideSuggestionslive()"><input type="button" class="button" value="Kapat"></div>');
         $('.suggestionslive').empty().html($html.join('')).show();
     },
     Details: {
         pid: -1,
         eskioranlar: new Array(),
         kapatilanlar: new Array(),
         ehandler: null,
         openrgs: 1,
         ehandlerperiyod: 15000,
         eventid: 0,
         openrid: 0,
         openlives: 0,
         bahis: {},
	 lastminute : "00.00",
	 lastscore : {},
         oyunlar: {},
         sorter: {},
         radarpanel: false,
         animkey: '',
         grupid: 1,
         golbet: {},
         data: null,
	Closeb: function(liveid) {
             $("#futbollistheader .border_ccc").html('');
             $("#detail_"+liveid).slideUp('slow');
	     $("#statsdiv_"+liveid).hide();
	     Live.Details.eventid = 0;
	     this.Stop();
	      return;
	 },
         Open: function(liveid) {
	     if(!Live.bets[liveid])
	     {
		$('.liveoddstatsdebug').html('Bu bahis için oyunlar kapatılmıştır.');
		return;
	     }
	     $('#tvlooknow').hide().html('');
	     Live.Details.eventid = 0;
	     this.Stop();
	     $('.liveoddstats').empty();
	     $('#headerliveb').html(Live.bets[liveid].hteam+' vs '+Live.bets[liveid].ateam);
             this.grupid = 1;
             this.RemoveRadarPanel();
             if ($('#LiveContentDetails').css('display') == 'none') {
                 $('#LiveContentDetails').show('slow');
             }
var c = Live.bets[liveid].spid;

if(c=="4"){
$("#score-panel-1").show();
$("#score-panel-2").hide();
}

if(c=="7"){
$("#score-panel-1").hide();
$("#score-panel-2").show();
}

if(c=="5"){
$("#score-panel-1").hide();
$("#score-panel-2").show();
}

if(c=="18"){
$("#score-panel-1").hide();
$("#score-panel-2").show();
}

if(c=="12"){
$("#score-panel-1").hide();
$("#score-panel-2").show();
}

this.eventid = liveid;
Live.Details.openlives=0;
this.animkey = '';
this.pid = -1;
this.SetSoccerBoard(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
this.SetBasketBoard(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

if(Live.bets[liveid].videoid>0){
$("#gettvlist,#tvstamp").show();
document.getElementById('gettvlist').setAttribute('onclick','Live.Details.OpenRadarTv(\''+Live.bets[liveid].tv+'\');');
document.getElementById('tvstamp').setAttribute('onclick','Live.Details.OpenRadarTv(\''+Live.bets[liveid].tv+'\');');
}else{
$("#gettvlist,#tvstamp").hide();
document.getElementById('gettvlist').setAttribute('onclick','javascript:;');
document.getElementById('tvstamp').setAttribute('onclick','javascript:;');
}
             $("#historygeri").hide();
			 $("#historygeri2").show();
			 $("#page2").removeClass('hidden');
			 $("#page3a").addClass('hidden');
			 $(".jq-subheader-row .t_more_box").hide();
             $(".jq-subheader-row .ipe-InPlayScoreboardContainer_BG").hide();
             $(".jq-subheader-row .border_ccc").html('');
             $("#detail_"+liveid).slideToggle('slow');
	     $("#statsdiv_"+liveid).show();
             $('#LaugeName').text(Live.bets[liveid].country + ' ' + Live.bets[liveid].league);
             $('#eventComment_'+Live.Details.eventid+'').text(Live.bets[liveid].country + ' ' + Live.bets[liveid].league);
             $('#periodComment_'+Live.Details.eventid+'').text(Live.GetPeriyod(Live.bets[liveid].spid, Live.bets[liveid].pid));
             $('#homeTeam_'+Live.Details.eventid+',#statsHomeTeamBasketball_'+Live.Details.eventid+'').text(Live.bets[liveid].hteam);
             $('#awayTeam_'+Live.Details.eventid+',#statsAwayTeamBasketball_'+Live.Details.eventid+'').text(Live.bets[liveid].ateam);
             $('#score-panel-1 .live-overview-hometeam,#score-panel-2 .live-overview-hometeam').html(Live.bets[liveid].hteam);
             $('#score-panel-1 .live-overview-awayteam,#score-panel-2 .live-overview-awayteam').html(Live.bets[liveid].ateam);
             $('#score-panel-1 #periodComment,#score-panel-2 #periodComment').text(Live.GetPeriyod(Live.bets[liveid].spid, Live.bets[liveid].pid));
             $('#score-panel-1 .homegoals,#score-panel-2 .2homegoals').text(Live.bets[liveid].sch);
             $('#score-panel-1 .awaygoals,#score-panel-2 .2awaygoals').text(Live.bets[liveid].sca);
             $('#homeScore_'+Live.Details.eventid+'').text(Live.bets[liveid].sch);
             $('#awayScore_'+Live.Details.eventid+'').text(Live.bets[liveid].sca);
             $('#statsHomeTeam_'+Live.Details.eventid+'').text(Live.bets[liveid].hteam);
             $('#statsAwayTeam_'+Live.Details.eventid+'').text(Live.bets[liveid].ateam);
             $('#time').text('------');
             this.Play(Live.bets[liveid].spid);
         },
         StopHide: function() {
             if (this.ehandler) {
                 clearInterval(this.ehandler);
                 this.ehandler = null;
		$('#tvlooknow').hide().html('');
             }
             if (this.radarpanel) {
                 this.RemoveRadarPanel();
             }
             $('#LiveContentDetails').hide();
             $('#LivesBox').hide();
             $('#LiveDetailsBox').hide();
             $('#betsBox').show();
         },
         Play: function(spiddss) {
             this.JsonLoader(spiddss);
             this.eskioranlar = new Array();
             this.kapatilanlar = {"2":"2","3":"3","4":"4","5":"5","6":"6","7":"7","8":"8","9":"9","10":"10"};
             if (this.ehandler) {
                 clearInterval(this.ehandler); this.ehandler = null;
             }
             this.ehandler = setInterval('Live.Details.JsonLoader('+spiddss+')', this.ehandlerperiyod);
         },
         Stop: function() {
             clearInterval(this.ehandler);
             this.ehandler = null;
	     $('#tvlooknow').hide().html('');
         },
         Filter: function(grupid) {
             this.grupid = grupid;
             this.JsonParser(this.data);
         },
         RemoveRadarPanel: function() {
         this.radarpanel = false;
	 $("#animationloading").hide();
	 $("#noradars").show();
	 $(".livegamesboard .liveselect").removeClass('liveselect');
	 $("#getscoreboard").addClass('liveselect');
 	 var iframecontainer = document.getElementById("iframecontainer");
	 if(iframecontainer)
	 {
	 iframecontainer.innerHTML =' ';
	 }
 	 $('.live-tracker-wrap,.lmtContainer,#tvlooknow').hide();
         },
         CloseRadarPanel: function() {
         this.radarpanel = false;
	 $("#animationloading").hide();
	 $("#noradars").show();
	 $(".livegamesboard .liveselect").removeClass('liveselect');
	 $("#getscoreboard").addClass('liveselect');
 	 var iframecontainer = document.getElementById("iframecontainer");
	 iframecontainer.innerHTML =' ';
 	 $('.live-tracker-wrap,.lmtContainer,#tvlooknow').hide();

if(Live.bets[this.eventid].spid=="4"){
$("#score-panel-2").hide();
$("#score-panel-1").show();
}

if(Live.bets[this.eventid].spid=="7"){
$("#score-panel-1").hide();
$("#score-panel-2").show();
}

if(Live.bets[this.eventid].spid=="5"){
$("#score-panel-1").hide();
$("#score-panel-2").show();
}

if(Live.bets[this.eventid].spid=="56"){
$("#score-panel-1").hide();
$("#score-panel-2").show();
}

if(Live.bets[this.eventid].spid=="18"){
$("#score-panel-1").hide();
$("#score-panel-2").show();
}

if(Live.bets[this.eventid].spid=="12"){
$("#score-panel-1").hide();
$("#score-panel-2").show();
}

$('#lastComment,#eventcarthead').show();
},

OpenRadarTv: function(x) {
	 this.radarpanel = true;
	 $("#animationloading").hide();
	 var iframecontainer = document.getElementById("iframecontainer");
	 iframecontainer.innerHTML ='<div class="player" id="videoplayer" style="margin: 0px auto; height: 200px;margin-top: 98px;"><video controls="" style="width:100%;height: 100%;" id="plaIp"><source type="application/x-mpegURL" src="http://' + Live.tvip + '/hls-live/xmlive/_definst_/' + Live.bets[this.eventid].videoid + '/' + Live.bets[this.eventid].videoid + '.m3u8?refId=1"></video></div></div>';
	 $('.live-tracker-wrap,.lmtContainer').show();
	 $('#score-panel-1,#score-panel-2,#lastComment,#messagevent,#tvlooknow,#eventcarthead').hide();
	 $(".livegamesboard .liveselect").removeClass('liveselect');
	 $("#gettvlist").addClass('liveselect');
         },
         OpenAnimation: function() {
	 this.radarpanel = true;
	 if(this.bahis.radarid>0)
	 {
	 $("#animationloading").show();
	 var iframecontainer = document.getElementById("iframecontainer");
	 iframecontainer.innerHTML ='<iframe src="https://href.li/?https://cs.betradar.com/ls/widgets/?/totobo/tr/page/widgets_lmts#matchId='+this.bahis.radarid+'" id="liveTrackerCenter" frameborder="0" scrolling="no" style="width: 100%;height: 340px;" onload="resizeIframe(this)"></iframe>';
	 Live.Details.openrid=this.bahis.radarid;
	 $('.live-tracker-wrap,.lmtContainer').show();
	 $('#noradars').show();
	 } else if(this.animkey){
	 $("#animationloading").hide();
	 var iframecontainer = document.getElementById("iframecontainer");
	 iframecontainer.innerHTML ='<iframe src="https://href.li/?https://secure.mobile.bwin.performgroup.com/streaming/watch/event/index.html?userId=pauline&partnerId=1945&eventId='+this.animkey+'&streamOnly=true&statsswitch=true&homeTeam=' + Live.bets[this.eventid].hteam.replace(' ', '%c2%a0') + '&awayTeam=' + Live.bets[this.eventid].ateam.replace(' ', '%c2%a0') + '&width=320&height=180&lang=en&version=1.22&cssdiff=https://sports.m.bwin.com/assets/sports/simulation/styles/simulation.bundle.WsbHV8.css&locdiff=https://sports.m.bwin.com/assets/sports/simulation/localizations" id="liveTrackerCenter" frameborder="0" scrolling="no" style="width: 320px; height: 200px;" onload="resizeIframe(this)"></iframe>';
	 Live.Details.openrid=this.bahis.radarid;
	 $('.live-tracker-wrap,.lmtContainer').show();
	 $('#score-panel-1,#score-panel-2,#lastComment,#messagevent,#tvlooknow,#eventcarthead').hide();
	 }else{
	 $("#animationloading").hide();
         this.radarpanel = false;
 	 var iframecontainer = document.getElementById("iframecontainer");
	 iframecontainer.innerHTML =' ';
 	 $('.live-tracker-wrap,.lmtContainer,#tvlooknow').hide();
	 $('#score-panel-1,#score-panel-2,#lastComment,#messagevent,#eventcarthead').show();
	 }
	 $(".livegamesboard .liveselect").removeClass('liveselect');
	 $("#getanimation").addClass('liveselect');
         },
         CreateRadarPanel: function(x) {
             this.radarpanel = true;
             if (x == 1) {
	     var popupwindow=window.open('http://bahismarket.com/smilator.php?id='+this.bahis.radarid,'Smilator','width=1020,height=700,screenX=10,left=10,screenY=10,top=10,toolbar=no,status=no,location=no,menubar=no,directories=no,scrollbars=needed,resizable=yes');
	     popupwindow.focus();
             } else if (Live.bets[this.eventid].vc == 2) {
                 if (Lib.Utils.IsMobil()) {
                   //  $('#livescore-close').html('<div class="player" id="videoplayer" style="margin: 0px auto; height: 200px;"><video controls="" style="width:100%;height: 100%;" id="plaIp"><source type="application/x-mpegURL" src="http://' + Live.tvip + '/hls-live/xmlive/_definst_/' + Live.bets[this.eventid].videoid + '/' + Live.bets[this.eventid].videoid + '.m3u8?refId=1"></video></div></div>');
                 } else {
                   //  $('#livescore-close').html('<iframe class="livescoreframe36" src="/resources/swf/VideoPlayerLive.swf?x=0.6483037667376375&userID=0&videoID=' + Live.bets[this.eventid].videoid + '&matchName=CANLI YAYIN&startImmediately=false&width=500&height=225" id="livescoreframe" hspace="0" vspace="0" marginheight="0" marginwidth="0" scrolling="no" style="display: block;" frameborder="0"></iframe>');
                 }
             } else if (this.animkey) {
	     var popupwindow=window.open('http://bahismarket.com/performsmit.php?key=' + this.animkey + '&hteam=' + Live.bets[this.eventid].hteam.replace(' ', '%c2%a0') + '&ateam=' + Live.bets[this.eventid].ateam.replace(' ', '%c2%a0'),'Smilator','width=1020,height=700,screenX=10,left=10,screenY=10,top=10,toolbar=no,status=no,location=no,menubar=no,directories=no,scrollbars=needed,resizable=yes');
	     popupwindow.focus();
             } else {
                 this.radarpanel = false;
                 return;
             }
	     if(this.bahis.radarid>0)
	     {
             window.scoreboardId = this.bahis.radarid;
	     }
             if(this.animkey)
	     {
                 $(".goperform").show();
	     }
         },
         ChangeScoreBoard: function(x) {
                 this.CreateRadarPanel(x);
         },
         OpenStatics: function() {
	 var popupwindow=window.open('/_server/modules/stats.php?cmd=livestatss&rid='+this.bahis.radarid,'Statistics','width=1020,height=700,screenX=10,left=10,screenY=10,top=10,toolbar=no,status=no,location=no,menubar=no,directories=no,scrollbars=needed,resizable=yes');
	 popupwindow.focus();
         },
         SetSoccerBoard: function(a, b, c, d, e, f, g, h, i, j, k, l,oh,oa) {
             $('#statsPrevHomeGoals_'+Live.Details.eventid+'').text(a);
             $('#statsHomeGoals_'+Live.Details.eventid+'').text(b);
             $('#statsHomeCorners_'+Live.Details.eventid+',.cornerhome').text(c);
             $('#statsHomeYellowCards_'+Live.Details.eventid+',.yellowhome').text(d);
             $('#statsHomeRedCards_'+Live.Details.eventid+',.redhomes').text(e);
             $('#statsHomePenalties_'+Live.Details.eventid+',.hpenalts').text(f);
             $('#statsPrevAwayGoals_'+Live.Details.eventid+'').text(g);
             $('#statsAwayGoals_'+Live.Details.eventid+'').text(h);
             $('#statsAwayCorners_'+Live.Details.eventid+',.corneraway').text(i);
             $('#statsAwayYellowCards_'+Live.Details.eventid+',.yellowaway').text(j);
             $('#statsAwayRedCards_'+Live.Details.eventid+',.redaways').text(k);
             $('#statsAwayPenalties_'+Live.Details.eventid+',.apenalts').text(l);
             $('.offsideh').text(oh);
             $('.offsidea').text(oa);
         },
         SetBasketBoard: function(a, b, c, d, e, f, g, h, i, j, k, l) {
             $('#statsHomeCorners_'+Live.Details.eventid+',.1hpc').text(a);
             $('#statsHomeYellowCards_'+Live.Details.eventid+',.2hpc').text(b);
             $('#statsHomeRedCards_'+Live.Details.eventid+',.3hpc').text(c);
             $('#statsHomePenalties_'+Live.Details.eventid+',.4hpc').text(d);
             $('#statsHomeYellowCardshalf_'+Live.Details.eventid+'').text(a+b);
             $('#statsAwayYellowCardshalf_'+Live.Details.eventid+'').text(g+h);
             $('#statsAwayCorners_'+Live.Details.eventid+',.1apc').text(g);
             $('#statsAwayYellowCards_'+Live.Details.eventid+',.2apc').text(h);
             $('#statsAwayRedCards_'+Live.Details.eventid+',.3apc').text(i);
             $('#statsAwayPenalties_'+Live.Details.eventid+',.4apc').text(j);
             $('#stats4StQuarterAway2Goals_'+Live.Details.eventid+'').text(k);
             $('#stats4StQuarterAway3Goals_'+Live.Details.eventid+'').text(l);
         },
         SetBasketBoardVolley: function(a, b, c, d, e, g, h, i, j, k) {
             $('#statsHomeCorners_'+Live.Details.eventid+',.1hpc').text(a);
             $('#statsHomeYellowCards_'+Live.Details.eventid+',.2hpc').text(b);
             $('#statsHomeRedCards_'+Live.Details.eventid+',.3hpc').text(c);
             $('#statsHomePenalties_'+Live.Details.eventid+',.4hpc').text(d);
             $('#statsHomeYellowCardshalf_'+Live.Details.eventid+'').text(e);
             $('#statsAwayCorners_'+Live.Details.eventid+',.1apc').text(g);
             $('#statsAwayYellowCards_'+Live.Details.eventid+',.2apc').text(h);
             $('#statsAwayRedCards_'+Live.Details.eventid+',.3apc').text(i);
             $('#statsAwayPenalties_'+Live.Details.eventid+',.4apc').text(j);
             $('#stats4StQuarterAway2Goals_'+Live.Details.eventid+'').text(k);
         },
         SetBasketBoardtennis: function(a, b, c, g, h, i) {
             $('#statsHomeCorners_'+Live.Details.eventid+',.1hpc').text(a);
             $('#statsHomeYellowCards_'+Live.Details.eventid+',.2hpc').text(b);
             $('#statsHomeRedCards_'+Live.Details.eventid+',.3hpc').text(c);
             $('#statsHomePenalties_'+Live.Details.eventid+',.4hpc').hide();
             $('#statsHomeYellowCardshalf_'+Live.Details.eventid+'').hide();
             $('#statsAwayCorners_'+Live.Details.eventid+',.1apc').text(g);
             $('#statsAwayYellowCards_'+Live.Details.eventid+',.2apc').text(h);
             $('#statsAwayRedCards_'+Live.Details.eventid+',.3apc').text(i);
             $('#statsAwayPenalties_'+Live.Details.eventid+',.4apc').hide();
             $('#stats4StQuarterAway2Goals_'+Live.Details.eventid+'').hide();
         },
         JsonLoader: function(spidver) {
             var eventUrl = Live.xmlserver + "?cmd=details&eventid=" + this.eventid + "&sportipi=" + spidver;
             jQuery.ajax({
                 type: "GET",
                 url: eventUrl,
                 timeout: 10000,
                 dataType: "json",
                 success: function(data) {
                     Live.Details.data = data;
                     Live.Details.JsonParser(data);
                 },
             	 error: function(xhr, ajaxOptions, thrownError) {
                 if (xhr.statusText == "OK") {
                     window.setTimeout(this.JsonLoader, 30 * 1000);
                 } else {
                     window.setTimeout(this.JsonLoader, 15 * 1000);
                 }
             }
             });
         },
         JsonParser: function(data) {
		if(data.eid==0)
		{
		jQuery('.liveoddstatsdebug').html('Karşılaşma Sona Ermiştir.');
		return;
		}
             var $bahis = {};
             var $oyunlar = {};
             var $sorter = {};
             var e = this.eventid;
		if(data && Live.bets[this.eventid])
		{
             if (typeof data != 'undefined') {
                 $bahis.eid = parseInt(data.eid);
                 $bahis.lid = parseInt(data.lid);
                 $bahis.league = data.lig;
                 $bahis.country = data.ulke;
                 $bahis.spid = parseInt(data.spid);
                 $bahis.radarid = parseInt(data.radarid);
                 $bahis.home = data.h;
                 $bahis.away = data.a;
                 $bahis.tgol = 0;
  	     	if(data.pid>0 && $bahis.spid==7) {
	     	$bahis.diffs = data.dk;   
	     	$bahis.period = data.pid;   
	     	}else{
	     	$bahis.diffs = 0;   
	     	$bahis.period = 0;   
              	}
                $bahis.dks = data.dk;
		if($bahis.dks<2 && ($bahis.period==1 ||$bahis.period==3 ||$bahis.period==5 ||$bahis.period==7) && $bahis.spid==7)
		{
                $bahis.cyrk = 1;
		}else{
                $bahis.cyrk = 0;
		}

			if($bahis.radarid>0)
			{
			Live.bets[this.eventid].radarid=$bahis.radarid;
			}
                 	if (data.smid) {
                     	this.animkey = data.smid;
                 	}

			if($bahis.radarid>0)
			{
			document.getElementById('getanimation').setAttribute('onclick','Live.Details.OpenAnimation();');
			$("#getanimation").show();
			}else if(this.animkey) {
			document.getElementById('getanimation').setAttribute('onclick','Live.Details.OpenAnimation();');
			$("#getanimation").show();
                 	}else{
			document.getElementById('getanimation').setAttribute('onclick','');
			$("#getanimation").hide();
			}
		 if (parseInt(Live.bets[data.eid].diff) > parseInt(Live.lm) && data.spid==4) {
		 data.live={};
                 }

                 if (typeof data.live != 'undefined') {
                     $.each(data.live, function(k, r) {
                         var gid = parseInt(r.tempid);
                         if (Live.agames[gid]) {
                             var bgid = parseInt(r.id);
                             var oyunad = r.N;
                             var oyunkad = r.N;
                             var statu = r.o;
                             var colum = r.games.length;
                             var oranlar = {};
                             var count = 0;
                             if (Live.agames[gid] == 1 || Live.agames[gid] == 146 || Live.agames[gid] == 2 || Live.agames[gid] == 3 || Live.agames[gid] == 4 || Live.agames[gid] == 9 || Live.agames[gid] == 10 || Live.agames[gid] == 11 || Live.agames[gid] == 18 || Live.agames[gid] == 73 || Live.agames[gid] == 74 || Live.agames[gid] == 75 || Live.agames[gid] == 76 || Live.agames[gid] == 77 || Live.agames[gid] == 78 || Live.agames[gid] == 85 || Live.agames[gid] == 127 || Live.agames[gid] == 128) {
                                 if (colum == 3) {
                                     for (var i = 0; i < 3; ++i) {
                                         brid = parseInt(r.games[i].Id);
                                         oran = parseFloat(r.games[i].Odds).toFixed(2);
                                         ostatu = r.games[i].Visible;
                                         if (i == 0) {
                                             tercih = "1";
                                         } else if (i == 2) {
                                             tercih = "2";
                                         } else {
                                             tercih = r.games[i].Name;
                                         }
                                         if (ostatu) {
                                             oranlar[brid] = {
                                                 brid: brid,
                                                 oran: Live.GetFixedrates($bahis.spid,oran),
						 idc:Live.FindIdcol(Live.agames[gid], tercih),
                                                 tercih: tercih,
                                                 statu: ostatu
                                             };
                                             count++;
                                         }
                                     }
                                 }
                             } else if (Live.agames[gid] == 170) {
                                 if (colum == 2) {
                                     for (var i = 0; i < 2; ++i) {
                                         brid = parseInt(r.games[i].Id);
                                         oran = parseFloat(r.games[i].Odds).toFixed(2);
                                         ostatu = r.games[i].Visible;
                                         if (i == 0) {
                                             tercih = "1";
                                         } else {
                                             tercih = "2";
                                         }
                                         if (ostatu) {
                                             oranlar[brid] = {
                                                 brid: brid,
						 idc:Live.FindIdcol(Live.agames[gid], tercih),
                                                 oran:Live.GetFixedrates($bahis.spid,oran),
                                                 tercih: tercih,
                                                 statu: ostatu
                                             };
                                             count++;
                                         }
                                     }
                                 }
                             } else if (Live.agames[gid] == 16 || Live.agames[gid] == 17) {
                                 if (colum == 3) {
                                     for (var i = 0; i < 3; ++i) {
                                         brid = parseInt(r.games[i].Id);
                                         oran = parseFloat(r.games[i].Odds).toFixed(2);
                                         ostatu = r.games[i].Visible;
                                         if (i == 0) {
                                             tercih = "1 ve X";
                                         } else if (i == 1) {
                                             tercih = "X ve 2";
                                         } else {
                                             tercih = "1 ve 2";
                                         }
                                         if (ostatu) {
                                             oranlar[brid] = {
                                                 brid: brid,
                                                 oran: Live.GetFixedrates($bahis.spid,oran),
						 idc:Live.FindIdcol(Live.agames[gid], tercih),
                                                 tercih: tercih,
                                                 statu: ostatu
                                             };
                                             count++;
                                         }
                                     }
                                 }
                             }else if (Live.agames[gid] == 19 || Live.agames[gid] == 182 || Live.agames[gid] == 183 || Live.agames[gid] == 194 || Live.agames[gid] == 195 || Live.agames[gid] == 196 || Live.agames[gid] == 1500 || Live.agames[gid] == 1503 || Live.agames[gid] == 1505) {
                                 if (colum == 2) {
                                     for (var i = 0; i < 2; ++i) {
                                         brid = parseInt(r.games[i].Id);
                                         oran = parseFloat(r.games[i].Odds).toFixed(2);
                                         ostatu = r.games[i].Visible;
                                         if (i == 0) {
                                             tercih = "1";
                                         } else if (i == 1) {
                                             tercih = "2";
                                         }
                                         if (ostatu) {
                                             oranlar[brid] = {
						 idc:Live.FindIdcol(Live.agames[gid], tercih),
                                                 brid: brid,
                                                 oran: Live.GetFixedrates($bahis.spid,oran),
                                                 tercih: tercih,
                                                 statu: ostatu
                                             };
                                             count++;
                                         }
                                     }
                                 }
                             }else if (Live.agames[gid] == 184 || Live.agames[gid] == 185) {
                                 if (colum == 2) {
                                     for (var i = 0; i < 2; ++i) {
                                         brid = parseInt(r.games[i].Id);
                                         oran = parseFloat(r.games[i].Odds).toFixed(2);
                                         ostatu = r.games[i].Visible;
                                         tercih = Live.homeawaychange($bahis.home,$bahis.away,r.games[i].Name);
                                        
                                         if (ostatu) {
                                             oranlar[brid] = {
                                                 brid: brid,
						 idc:Live.FindIdcol(Live.agames[gid], tercih),
                                                 oran: Live.GetFixedrates($bahis.spid,oran),
                                                 tercih: tercih,
                                                 statu: ostatu
                                             };
                                             count++;
                                         }
                                     }
                                 }
                             }else if (Live.agames[gid] == 187) {
                                 if (colum == 12) {
                                     for (var i = 0; i < 12; ++i) {
                                         brid = parseInt(r.games[i].Id);
                                         oran = parseFloat(r.games[i].Odds).toFixed(2);
                                         ostatu = r.games[i].Visible;
                                          tercih = Live.homeawaychange($bahis.home,$bahis.away,r.games[i].Name);
                                        
                                         if (ostatu) {
                                             oranlar[brid] = {
                                                 brid: brid,
						 idc:Live.FindIdcol(Live.agames[gid], tercih),
                                                 oran: Live.GetFixedrates($bahis.spid,oran),
                                                 tercih: tercih,
                                                 statu: ostatu
                                             };
                                             count++;
                                         }
                                     }
                                 }
                             } else {
                                 $.each(r.games, function(kk, odds) {
                                     brid = parseInt(odds.Id);
                                     oran = parseFloat(odds.Odds).toFixed(2);
                                     ostatu = odds.Visible;
                                     tercih = odds.Name;
                                     if (Live.agames[gid] == 101 && tercih == 'Başka bir sonuç') {
                                         ostatu = false;
                                     }
                                     if ((Live.agames[gid] == 101 || Live.agames[gid] ==102) && tercih == 'Any other score') {
                                         ostatu = false;
                                     }
                                     if (Live.agames[gid] == 166 && (tercih == 'Team 1 to win by any other Score' || tercih == 'Team 2 to win by any other score')) {
                                         ostatu = false;
                                     }
				     if($bahis.cyrk==1 && $bahis.spid==7 && (Live.agames[gid]==196 ||Live.agames[gid]==195 ||Live.agames[gid]==194 ||Live.agames[gid]==182 ||Live.agames[gid]==185 ||Live.agames[gid]==181 ||Live.agames[gid]==180 ||Live.agames[gid]==165 ||Live.agames[gid]==164 ||Live.agames[gid]==163 || Live.agames[gid]==162))
				     {
                                     ostatu = false;
				     }

                                     if (ostatu) {
                                         oranlar[brid] = {
                                             brid: brid,
                                             oran: Live.GetFixedrates($bahis.spid,oran),
                                             tercih: tercih,
                                             statu: ostatu
                                         };
                                         count++;
                                     }
                                 });
                             }
                             if (!Live.Details.golbet[Live.agames[gid]]) {
				 var marketid = (Bahis.oyunlar[Live.agames[gid]]["grup"] ? Bahis.oyunlar[Live.agames[gid]]["grup"]:'1');
                                 $oyunlar[bgid] = {
                                     bgid: bgid,
                                     gid: Live.agames[gid],
                                     oyunad: oyunad,
                                     marketgrup: marketid,
                                     statu: statu,
                                     gstatu: statu,
                                     colum: colum,
                                     count: count,
                                     oranlar: oranlar
                                 };
				 if(!$sorter[marketid])
				 {
				 $sorter[marketid]={};
				 }

                                 $sorter[marketid][Live.agames[gid]] = bgid;


                             }
                         }
                     });
                 }
             }
		}
             if ($bahis.eid != this.eventid) {
                 return;
             }
             this.bahis = $bahis;
             this.oyunlar = $oyunlar;
             this.sorter = $sorter;
			 
			 if($bahis.radarid>1 && !this.radarpanel){
			Live.Details.OpenAnimation();
			}


             if ($bahis.eid == this.eventid) {
		 if($bahis.spid=="4")
		 {
                 this.ScoreParser(data);
		 }
		 if($bahis.spid=="7")
		 {
                 this.ScoreParserbasket(data);
		 }
		 if($bahis.spid=="5")
		 {
                 this.ScoreParsertennis(data);
		 }
		 if($bahis.spid=="56")
		 {
                 this.ScoreParsermtennis(data);
		 }
		 if($bahis.spid=="18")
		 {
                 this.ScoreParservoleybol(data);
		 }
		 if($bahis.spid=="12")
		 {
                 this.ScoreParsertennis(data);
		 }
                 var mesaj = [];
                 var mesajMobil = '';
                 var mesajMobillast = [];
                 var i = 0;
                 mesaj.push('<ul>');
                 $('#lastComment').html('&nbsp;');
                 $.each(data.Msg, function(a, b) {
                     dakika = 0;
                     if (b.dk) {
                         dakika = b.dk;
                     }
                     if (b.MessageType) {
                         MessageType = b.type;
                     }else{
		         MessageType = "";
		     }
                     text = Live.Translate(b.N);
		    if($bahis.spid=="4")
		    {
                     if (i < 1) {
mesajMobillast.push('<div class="eventpointDG"> ');
mesajMobillast.push('<div class="top center" style="width: 35px;float: left;"> ');
mesajMobillast.push('<div class="scIcon live-icon messages _0 _'+$bahis.spid+'_'+MessageType+'"></div> </div>'); 
mesajMobillast.push('<div class="top time" style="float: left;">'+dakika+'</div> ');
mesajMobillast.push('<div class="top" style="text-align: left;float: left;">' + text + '</div> ');
mesajMobillast.push('<span class="showEventPointsArrowDown" id="showhidemessage" style="cursor:default;padding: 0px;width: 33px;float: right;" ');
mesajMobillast.push('onclick="toggleScoreBoxEventPoints()"></span>'); 
mesajMobillast.push('</div>');
          }else{
mesajMobil+='<div class="scorebox eventpoint" style="width: 100%;display: block;">';
mesajMobil+='<div class="eventpointDG">';
mesajMobil+='<div class="top center" style="width: 35px;">';
mesajMobil+='<div class="scIcon live-icon messages _0 _'+$bahis.spid+'_'+MessageType+'"></div>';
mesajMobil+='</div>';
mesajMobil+='<div class="top time">'+dakika+'</div>';
mesajMobil+='<div class="top">' + text + '</div>';
mesajMobil+='</div>';
mesajMobil+='</div>';
}
               mesaj.push('<li>' + dakika + ' ' + text + '</li>');
			}
  	            if($bahis.spid=="7")
		    {
                     if (i == 0) {
                        // $('#lastComment').html(mesajMobillast);
                     }
                     mesaj.push('<li>' + text + '</li>');
			}
                     i++;
                 });
                 mesaj.push('</ul>');
                 $('#lastComment').empty().html(mesajMobillast.join(''));
                 $('#messagevent').empty();
                 $('#commentsContainer').empty();
                 if (i) {
                 $('#commentsContainer').html(mesaj.join(''));
                 $('#messagevent').html(mesajMobil);
                 }
             }

             if (Live.bets[this.eventid]) {
                 if (Live.bets[this.eventid].status != 1 || Live.bets[this.eventid].pid=="255") {
                     this.StopHide();
                     return;
                 }

		if($bahis.spid=="7")
		{
                 if (Live.bets[this.eventid].pid > 0 && Live.bets[this.eventid].pid < 8) {
                     this.Template.CreateTemplate($bahis, $oyunlar);
                     return;
                 }
		}
		 if($bahis.spid=="4")
		 {
                 
				 
				 if(Live.bets[this.eventid].pid==1){
				 
				 if (parseInt(Live.bets[this.eventid].diff) < parseInt(Live.lmy) && Live.bets[this.eventid].pid > 0  && Live.bets[this.eventid].pid < 4) {
                     this.Template.CreateTemplate($bahis, $oyunlar);
                     return;
                 }
				 
				 } else if (parseInt(Live.bets[this.eventid].diff) < parseInt(Live.lm) && Live.bets[this.eventid].pid > 0  && Live.bets[this.eventid].pid < 4) {
                     this.Template.CreateTemplate($bahis, $oyunlar);
                     return;
                 }
		}
             }
             this.CloseOdds();
             this.Template.CreateTemplate($bahis, $oyunlar);
             return;
         },
         ScoreParsertennis: function(data) {
             var $skor = {};
             if (typeof data != 'undefined') {
                 $skor.eid = parseInt(data.eid);
                 $skor.lid = parseInt(data.lid);
                 $skor.league = data.ulke + " " + data.lig;
                 $skor.spid = parseInt(data.spid);
                 $skor.pid = parseInt(data.pid);
                 $skor.radarid = parseInt(data.radarid);
                 $skor.home = '';
                 $skor.away = '';
             }
		$("#score-panel-1").hide();
		$("#score-panel-2").show();

             $skor.h = parseInt(data.sch);
             $skor.h1 = parseInt(data.periodsh[1]);
             $skor.h2 = parseInt(data.periodsh[2]);
             $skor.h3 = parseInt(data.periodsh[3]);
             $skor.h4 = parseInt(data.periodsh[4]);
             $skor.h5 = parseInt(data.periodsh[5]);
             $skor.h6 = parseInt(data.periodsh[6]);
             $skor.h7 = parseInt(data.periodsh[7]);
             $skor.a = parseInt(data.sca);
             $skor.a1 = parseInt(data.periodsa[1]);
             $skor.a2 = parseInt(data.periodsa[2]);
             $skor.a3 = parseInt(data.periodsa[3]);
             $skor.a4 = parseInt(data.periodsa[4]);
             $skor.a5 = parseInt(data.periodsa[5]);
             $skor.a6 = parseInt(data.periodsa[6]);
             $skor.a7 = parseInt(data.periodsa[7]);
             var periyod = Live.GetPeriyod(parseInt($skor.spid), parseInt($skor.pid));
             $('#score-panel-2 #time').text(periyod);
             $('#score-panel-2 .1hpc').text(($skor.h1 ? $skor.h1:'-'));
             $('#score-panel-2 .2hpc').text(($skor.h2 ? $skor.h2:'-'));
             $('#score-panel-2 .3hpc').text(($skor.h3 ? $skor.h3:'-'));
             $('#score-panel-2 .4hpc').text(($skor.h4 ? $skor.h4:'-'));
             $('#score-panel-2 .5hpc').text(($skor.h5 ? $skor.h5:'-'));
             $('#score-panel-2 .6hpc').text(($skor.h6 ? $skor.h6:'-'));
             $('#score-panel-2 .7hpc').text(($skor.h6 ? $skor.h7:'-'));

             $('#score-panel-2 .1apc').text(($skor.a1 ? $skor.a1:'-'));
             $('#score-panel-2 .2apc').text(($skor.a2 ? $skor.a2:'-'));
             $('#score-panel-2 .3apc').text(($skor.a3 ? $skor.a3:'-'));
             $('#score-panel-2 .4apc').text(($skor.a4 ? $skor.a4:'-'));
             $('#score-panel-2 .5apc').text(($skor.a5 ? $skor.a5:'-'));
             $('#score-panel-2 .6apc').text(($skor.a6 ? $skor.a6:'-'));
             $('#score-panel-2 .7apc').text(($skor.a7 ? $skor.a7:'-'));
	     if(data.gseri>5)
	     {
             $('#score-panel-2 .5hpc,#score-panel-2 .6hpc,#score-panel-2 .7hpc,#score-panel-2 .5apc,#score-panel-2 .6apc,#score-panel-2 .7apc').show();
	     }else{
             $('#score-panel-2 .5hpc,#score-panel-2 .6hpc,#score-panel-2 .7hpc,#score-panel-2 .5apc,#score-panel-2 .6apc,#score-panel-2 .7apc').hide();
	     }

	},
	ScoreParsermtennis: function(data) {
             var $skor = {};
             if (typeof data != 'undefined') {
                 $skor.eid = parseInt(data.eid);
                 $skor.lid = parseInt(data.lid);
                 $skor.league = data.ulke + " " + data.lig;
                 $skor.spid = parseInt(data.spid);
                 $skor.pid = parseInt(data.pid);
                 $skor.radarid = parseInt(data.radarid);
                 $skor.home = '';
                 $skor.away = '';
             }
		$("#score-panel-1").hide();
		$("#score-panel-2").show();

             $skor.h = parseInt(data.sch);
             $skor.h1 = parseInt(data.periodsh[1]);
             $skor.h2 = parseInt(data.periodsh[2]);
             $skor.h3 = parseInt(data.periodsh[3]);
             $skor.h4 = parseInt(data.periodsh[4]);
             $skor.h5 = parseInt(data.periodsh[5]);
			 
             $skor.a = parseInt(data.sca);
             $skor.a1 = parseInt(data.periodsa[1]);
             $skor.a2 = parseInt(data.periodsa[2]);
             $skor.a3 = parseInt(data.periodsa[3]);
             $skor.a4 = parseInt(data.periodsa[4]);
             $skor.a5 = parseInt(data.periodsa[5]);
             var periyod = Live.GetPeriyod(parseInt($skor.spid), parseInt($skor.pid));
             $('#score-panel-2 #time').text(periyod);
             $('#score-panel-2 .1hpc').text(($skor.h1 ? $skor.h1:'-'));
             $('#score-panel-2 .2hpc').text(($skor.h2 ? $skor.h2:'-'));
             $('#score-panel-2 .3hpc').text(($skor.h3 ? $skor.h3:'-'));
             $('#score-panel-2 .4hpc').text(($skor.h4 ? $skor.h4:'-'));
             $('#score-panel-2 .5hpc').text(($skor.h5 ? $skor.h5:'-'));

             $('#score-panel-2 .1apc').text(($skor.a1 ? $skor.a1:'-'));
             $('#score-panel-2 .2apc').text(($skor.a2 ? $skor.a2:'-'));
             $('#score-panel-2 .3apc').text(($skor.a3 ? $skor.a3:'-'));
             $('#score-panel-2 .4apc').text(($skor.a4 ? $skor.a4:'-'));
             $('#score-panel-2 .5apc').text(($skor.a5 ? $skor.a5:'-'))
             $('#score-panel-2 .5hpc').show();
             $('#score-panel-2 .5apc').show();
	},
	ScoreParservoleybol: function(data) {
             var $skor = {};
             if (typeof data != 'undefined') {
                 $skor.eid = parseInt(data.eid);
                 $skor.lid = parseInt(data.lid);
                 $skor.league = data.ulke + " " + data.lig;
                 $skor.spid = parseInt(data.spid);
                 $skor.pid = parseInt(data.pid);
                 $skor.radarid = parseInt(data.radarid);
                 $skor.home = '';
                 $skor.away = '';
             }
		$("#score-panel-1").hide();
		$("#score-panel-2").show();

             $skor.h = parseInt(data.sch);
             $skor.h1 = parseInt(data.periodsh[1]);
             $skor.h2 = parseInt(data.periodsh[2]);
             $skor.h3 = parseInt(data.periodsh[3]);
             $skor.h4 = parseInt(data.periodsh[4]);
             $skor.h5 = parseInt(data.periodsh[5]);
             $skor.a = parseInt(data.sca);
             $skor.a1 = parseInt(data.periodsa[1]);
             $skor.a2 = parseInt(data.periodsa[2]);
             $skor.a3 = parseInt(data.periodsa[3]);
             $skor.a4 = parseInt(data.periodsa[4]);
             $skor.a5 = parseInt(data.periodsa[5]);
             var periyod = Live.GetPeriyod(parseInt($skor.spid), parseInt($skor.pid));
             $('#score-panel-2 #time').text(periyod);
             $('#score-panel-2 .1hpc').text(($skor.h1 ? $skor.h1:'-'));
             $('#score-panel-2 .2hpc').text(($skor.h2 ? $skor.h2:'-'));
             $('#score-panel-2 .3hpc').text(($skor.h3 ? $skor.h3:'-'));
             $('#score-panel-2 .4hpc').text(($skor.h4 ? $skor.h4:'-'));
             $('#score-panel-2 .5hpc').text(($skor.h5 ? $skor.h5:'-'));

             $('#score-panel-2 .1apc').text(($skor.a1 ? $skor.a1:'-'));
             $('#score-panel-2 .2apc').text(($skor.a2 ? $skor.a2:'-'));
             $('#score-panel-2 .3apc').text(($skor.a3 ? $skor.a3:'-'));
             $('#score-panel-2 .4apc').text(($skor.a4 ? $skor.a4:'-'));
             $('#score-panel-2 .5apc').text(($skor.a5 ? $skor.a5:'-'));
			 
             $('#score-panel-2 .5hpc').show();
             $('#score-panel-2 .5apc').show();

	},
         ScoreParserbasket: function(data) {
             var $skor = {};
           if (typeof data != 'undefined') {
                 $skor.eid = parseInt(data.eid);
                 $skor.lid = parseInt(data.lid);
                 $skor.league = data.ulke + " " + data.lig;
                 $skor.spid = parseInt(data.spid);
                 $skor.pid = parseInt(data.pid);
                 $skor.radarid = parseInt(data.radarid);
                 $skor.home = '';
                 $skor.away = '';
             }
             $skor.h = parseInt(data.sch);
             $skor.h1 = parseInt(data.periodsh[1]);
             $skor.h2 = parseInt(data.periodsh[2]);
             $skor.h3 = parseInt(data.periodsh[3]);
             $skor.h4 = parseInt(data.periodsh[4]);
             $skor.a = parseInt(data.sca);
             $skor.a1 = parseInt(data.periodsa[1]);
             $skor.a2 = parseInt(data.periodsa[2]);
             $skor.a3 = parseInt(data.periodsa[3]);
             $skor.a4 = parseInt(data.periodsa[4]);
             $skor.ych = 0;
             $skor.yca = 0;
             $skor.rch = 0;
             $skor.rca = 0;
             $skor.crnh = 0;
             $skor.crna = 0;
             $skor.pnlth = 0;
             $skor.pnlta = 0;
             this.SetBasketBoard($skor.h1, $skor.h2, $skor.h3, $skor.h4, $skor.rch, $skor.ych, $skor.a1, $skor.a2, $skor.a3, $skor.a4, $skor.rca, $skor.yca);
             $skor.diff = data.dk;             
	     $skor.running = data.run;
             $skor.tvis = data.tvisible;
             $skor.pid = parseInt(data.pid);
             if (typeof $skor.pid == 'undefined') {
                 $skor.pid = 0;
             }
             $('#homeScore_'+Live.Details.eventid+',#score-panel-2 .2homegoals').text($skor.h);
             $('#awayScore_'+Live.Details.eventid+',#score-panel-2 .2awaygoals').text($skor.a);
             var periyod = Live.GetPeriyod(parseInt($skor.spid), parseInt($skor.pid));
		console.log(periyod);
             $('#score-panel-2 #periodComment').text(periyod);
             var minute = '< '+$skor.diff+' \'';
		Live.Details.lastminute=minute;
             $('#time_'+Live.Details.eventid+',#score-panel-2 #time').text(minute);
		Live.Details.lastscore =$skor;
             if (this.pid < 0) {
                 this.pid = $skor.pid;
             }
             if (this.pid != $skor.pid) {
                 this.pid = $skor.pid;
                 Live.DudukCalVoley();
             }
             if ($skor.pid == 255) {
                 this.Stop();
             }
         }, ScoreParser: function(data) {
             var $skor = {};
             if (typeof data.event != 'undefined') {
                 $skor.eid = parseInt(data.eid);
                 $skor.lid = parseInt(data.lid);
                 $skor.league = data.ulke + " " + data.lig;
                 $skor.spid = parseInt(data.spid);
                 $skor.radarid = parseInt(data.radarid);
                 $skor.home = '';
                 $skor.away = '';
             }
		$('#statsTable .basketball_scoreboards').hide();
		$('#statsTable .football_scoreboards').show();
             $skor.h = parseInt(data.sch);
             $skor.h1 = parseInt(data.isch);
             $skor.h2 = 0;
 
             $skor.a = parseInt(data.sca);
             $skor.a1 = parseInt(data.isca);
             $skor.a2 = 0;

             $skor.ych = parseInt(data.ycardh);
             $skor.yca = parseInt(data.ycarda);
             $skor.rch = parseInt(data.redh);
             $skor.rca = parseInt(data.reda);
             $skor.crnh = parseInt(data.crnh);
             $skor.crna =parseInt(data.crna);
             $skor.pnlth = parseInt(data.pnlth);
             $skor.pnlta = parseInt(data.pnlta);
             $skor.offsideh = 0;
             $skor.offsidea = 0;

             this.SetSoccerBoard($skor.h1, $skor.h2, $skor.crnh, $skor.ych, $skor.rch, $skor.pnlth, $skor.a1, $skor.a2, $skor.crna, $skor.yca, $skor.rca, $skor.pnlta,$skor.offsideh,$skor.offsidea);
             $skor.diff = Live.Difference(data.tvisible, data.run, data.secound, data.referedate);             
	     $skor.running = data.run;
             $skor.tvis = parseInt(data.tvisible);
             $skor.pid = parseInt(data.pid);
             if (typeof $skor.pid == 'undefined') {
                 $skor.pid = 0;
             }


	     if($skor.pid>2)
	     {
             $('#soccrht').text('IY '+$skor.h1+':'+$skor.a1+'');
	     }else{
             $('#soccrht').text('');
	     }

             $('#homeScore_'+Live.Details.eventid+',#score-panel-1 .homegoals').text($skor.h);
             $('#awayScore_'+Live.Details.eventid+',#score-panel-1 .awaygoals').text($skor.a);
             var periyod = Live.GetPeriyod($skor.spid, $skor.pid);
             $('#periodComment_'+Live.Details.eventid+',#score-panel-1 #periodComment').text(periyod);
		Live.Details.lastscore =$skor;
	     var minute = Live.FixTime($skor.diff);
             if (!$skor.running) {
                 minute = minute;
             }else{
                 minute = Live.FixTime($skor.diff+7);
	     }
		Live.Details.lastminute=minute;

	     if($skor.pid==2)
	     {
             $('#time_'+Live.Details.eventid+',#score-panel-1 #time').text('Devre');
	     }else{
             $('#time_'+Live.Details.eventid+',#score-panel-1 #time').text(minute+'\'');
	     }

             if (this.pid < 0) {
                 this.pid = $skor.pid;
             }
             if (this.pid != $skor.pid) {
                 this.pid = $skor.pid;
                 Live.DudukCal();
             }
             if ($skor.pid == 255) {
                 this.Stop();
             }
         },
         CloseOdds: function() {
             jQuery.each(this.oyunlar, function(i, r) {
                 r.statu = 0;
             });
         },
         OddsArrow: function(oranid, oran) {
             var arrow = "";
             if (this.eskioranlar[oranid]) {
                 if (oran < this.eskioranlar[oranid]) {
                     arrow = 'down tendown';
                 }
                 if (oran > this.eskioranlar[oranid]) {
                     arrow = 'up tendup';
                 }
             }
             this.eskioranlar[oranid] = oran;
             return arrow;
         },



OddsArrows: function(eid, oid,rid,or) {
var arrows = "";
if(!Live.betgame[eid]){ return "alfree"; }
if(!Live.betgame[eid][oid]){ return "closed"; }
if(!Live.betgame[eid][oid].oranlar[rid]){ return "closed"; }
if(parseFloat(Live.betgame[eid][oid].oranlar[rid].oran) < parseFloat(or)){ return "c_but_up tendup"; }
if(parseFloat(Live.betgame[eid][oid].oranlar[rid].oran) > parseFloat(or)){ return 'c_but_down tendown'; }
return "geris";
},
         Template: {
             CreateTemplate: function(bahisler, oyunlar) {
		 mobilehtml='<span></span>';
                 var playing = false;
		 var marketoyunlar = {};
		 var marketler = marketisimleri;
                 this.Header();
                 for (var nbi in Live.Details.sorter) {
		 var marketid = nbi;
                 for (var bki in Live.Details.sorter[nbi]) {
		 if(!marketoyunlar[nbi])
		 {
		 marketoyunlar[nbi]={};
		 }
		 marketoyunlar[nbi][bki]=Live.Details.oyunlar[Live.Details.sorter[nbi][bki]];
		 }
		 }

                 jQuery.each(marketisimleri, function(m, o) {
		 if(marketoyunlar[m])
		 {
		 mobilehtml += '<div class="rsGroupHeader mdetails '+(!Live.Details.kapatilanlar[m] ? '':'closed')+'" id="rsggm'+m+'" onclick="Live.Details.Template.Toggle(' + m + ');">'+o+' ('+Object.keys(marketoyunlar[m]).length+')</div>';
		 mobilehtml += '<div id="rsg'+m+'" class="rsGroup" style="'+(!Live.Details.kapatilanlar[m] ? '':'display:none;')+'">';
                  for (var mi in marketoyunlar[m]) {
			     if (!marketoyunlar[m][mi].gstatu || !marketoyunlar[m][mi].count>0) {
                                 Live.Details.Template.Suspended(marketoyunlar[m][mi].oyunad);
                             } else {
                                 Live.Details.Template.SetOdds(bahisler,marketoyunlar[m][mi]);
                             }
				playing = true;
		 }
		 }
		 mobilehtml += '</div>';
		 });
                 this.Footer();
                jQuery('.liveoddstats').empty().html(mobilehtml);		
				kuponguncelle();
                 if (!playing) {
                     this.Debug('Bahis oranları kapatıldı ya da oranlar güncelleniyor');
                 } else {
                     this.Debug('');
                 }
                 this.SetToggle();
		Live.Details.openlives=1;
		
             },
             Header: function() {
              mobilehtml += '<div class="pad-sm"><div id="live_bet_type_grid" class="fixture-grid">';
              html = '<div class="new_filtr_div bg3"><a class="new_filtr_item  ' + (Live.Details.grupid == 99 ? 'active' : ' ') + '" href="javascript:Live.Details.Filter(99);"><span class="new_filtr_item1"></span><span class="new_filtr_item2 ">FAVORİLER</span><span class="new_filtr_item3"></span><span class="clear"></span></a><a class="new_filtr_item  ' + (Live.Details.grupid == 1 ? 'active' : ' ') + '" href="javascript:Live.Details.Filter(1);"><span class="new_filtr_item1"></span><span class="new_filtr_item2 ">TUM OYUNLAR</span><span class="new_filtr_item3"></span><span class="clear"></span></a><a class="new_filtr_item ' + (Live.Details.grupid == 2 ? 'active' : ' ') + '" href="javascript:Live.Details.Filter(2);"><span class="new_filtr_item1"></span><span class="new_filtr_item2">ALT/ÜSTLER</span><span class="new_filtr_item3"></span><span class="clear"></span></a><a class="new_filtr_item ' + (Live.Details.grupid == 3 ? 'active' : ' ') + '" href="javascript:Live.Details.Filter(3);"><span class="new_filtr_item1"></span><span class="new_filtr_item2">SKOR BAHISLERI</span><span class="new_filtr_item3"></span><span class="clear"></span></a><a class="new_filtr_item ' + (Live.Details.grupid == 4 ? 'active' : ' ') + '" href="javascript:Live.Details.Filter(4);"><span class="new_filtr_item1"></span><span class="new_filtr_item2">ILK YARI</span><span class="new_filtr_item3"></span><span class="clear"></span></a><a class="new_filtr_item ' + (Live.Details.grupid == 5 ? 'active' : ' ') + '" href="javascript:Live.Details.Filter(5);"><span class="new_filtr_item1"></span><span class="new_filtr_item2">IKINCI YARI</span><span class="new_filtr_item3"></span><span class="clear"></span></a><a class="new_filtr_item ' + (Live.Details.grupid == 6 ? 'active' : ' ') + '" href="javascript:Live.Details.Filter(6);"><span class="new_filtr_item1"></span><span class="new_filtr_item2">GOL BAHISLERI</span><span class="new_filtr_item3"></span><span class="clear"></span></a></div>';
             },
             Footer: function() {
              mobilehtml += ' </div></div>';
             },
             FilterTable: function() {
                 mobilehtml += '';
                 html += '<div class="new_filtr_div bg3"><a class="new_filtr_item  ' + (Live.Details.grupid == 99 ? 'active' : ' ') + '" href="javascript:Live.Details.Filter(99);"><span class="new_filtr_item1"></span><span class="new_filtr_item2 ">FAVORİLER</span><span class="new_filtr_item3"></span><span class="clear"></span></a><a class="new_filtr_item  ' + (Live.Details.grupid == 1 ? 'active' : ' ') + '" href="javascript:Live.Details.Filter(1);"><span class="new_filtr_item1"></span><span class="new_filtr_item2 ">TUM OYUNLAR</span><span class="new_filtr_item3"></span><span class="clear"></span></a><a class="new_filtr_item ' + (Live.Details.grupid == 2 ? 'active' : ' ') + '" href="javascript:Live.Details.Filter(2);"><span class="new_filtr_item1"></span><span class="new_filtr_item2">ALT/ÜSTLER</span><span class="new_filtr_item3"></span><span class="clear"></span></a><a class="new_filtr_item ' + (Live.Details.grupid == 3 ? 'active' : ' ') + '" href="javascript:Live.Details.Filter(3);"><span class="new_filtr_item1"></span><span class="new_filtr_item2">SKOR BAHISLERI</span><span class="new_filtr_item3"></span><span class="clear"></span></a><a class="new_filtr_item ' + (Live.Details.grupid == 4 ? 'active' : ' ') + '" href="javascript:Live.Details.Filter(4);"><span class="new_filtr_item1"></span><span class="new_filtr_item2">İLKYARI</span><span class="new_filtr_item3"></span><span class="clear"></span></a><a class="new_filtr_item ' + (Live.Details.grupid == 5 ? 'active' : ' ') + '" href="javascript:Live.Details.Filter(5);"><span class="new_filtr_item1"></span><span class="new_filtr_item2">IKINCI YARI</span><span class="new_filtr_item3"></span><span class="clear"></span></a><a class="new_filtr_item ' + (Live.Details.grupid == 6 ? 'active' : ' ') + '" href="javascript:Live.Details.Filter(6);"><span class="new_filtr_item1"></span><span class="new_filtr_item2">GOL BAHISLERI</span><span class="new_filtr_item3"></span><span class="clear"></span></a></div>';
             },
             Debug: function(text) {
                 jQuery('.liveoddstatsdebug').html(text);
             },
             SetOdds: function(k, l) {
		var addm=true;
		var stunista="100";
		var oyunayirmas="1";
  		 if (l.gid == 166 || l.gid == 96 || l.gid == 97 || l.gid == 147 || l.gid == 139 || l.gid == 140 || l.gid == 141 || l.gid == 142 || l.gid == 187) {
                 sutun = 1;
		 stunista="100";
		 oyunayirmas="1";
                 } else if (l.gid == 88) {
                 sutun = 2;
		 stunista="25";
                 } else if (l.gid == 138) {
                 sutun = 1;
		 stunista="25";
                 } else if (l.gid == 20 || l.gid == 21 || l.gid == 22 || l.gid == 26 || l.gid == 27 || l.gid == 28 || l.gid == 29 || l.gid == 30 || l.gid == 31 || l.gid == 36 || l.gid == 37 || l.gid == 38 || l.gid == 39 || l.gid == 45 || l.gid == 56 || l.gid == 57 || l.gid == 58 || l.gid == 62 || l.gid == 63 || l.gid == 64 || l.gid == 129 || l.gid == 130 || l.gid == 131 || l.gid == 133 || l.gid == 134 || l.gid == 135 || l.gid == 139 || l.gid == 15000 || l.gid == 15001 || l.gid == 15002 || l.gid == 15003 || l.gid == 15004 || l.gid == 15005 || l.gid == 15006 || l.gid == 15007 || l.gid == 15008 || l.gid == 15009 || l.gid == 15010 || l.gid == 15011 || l.gid == 15012 || l.gid == 15013 || l.gid == 15014 || l.gid == 15017 || l.gid == 15018 || l.gid == 15019 || l.gid == 15020 || l.gid == 15021 || l.gid == 15022 || l.gid == 15025 || l.gid == 15026 || l.gid == 15027 || l.gid == 15028 || l.gid == 15029 || l.gid == 15030 || l.gid == 15031 || l.gid == 15032 || l.gid == 15033 || l.gid == 15034 || l.gid == 15035 || l.gid == 15036 || l.gid == 15037 || l.gid == 15038 || l.gid == 15039 || l.gid == 15040 || l.gid == 15041 || l.gid == 15042) {
                 sutun = 2;
		 stunista="25";
		 widthnewgame="25";
                 } else if (l.gid == 59 || l.gid == 32 || l.gid == 60 || l.gid == 61 || l.gid == 65 || l.gid == 66 || l.gid == 67 || l.gid == 21  || l.gid==144 || l.gid==145  || l.gid==57  || l.gid==58 || l.gid == 23 || l.gid == 24 || l.gid == 25 || l.gid == 44 || l.gid == 46 || l.gid == 47 || l.gid == 54 || l.gid == 55 || l.gid == 62 || l.gid == 63) {
                 sutun = 2;
		 stunista="50";
		 widthnewgame="50";
                 } else if (l.gid == 102 ||l.gid == 1511 ||l.gid == 1502 || l.gid == 101 || l.gid == 166) {
                     sutun = 2;
		     stunista="50";
                 } else if (l.count == 1) {
                     sutun = 1;
		     stunista="50";
                 } else if (l.count % 2 == 0) {
                     sutun = 2;
		     stunista="50";
                 } else if (l.count % 3 == 0) {
                     sutun = 3;
		     stunista="25";
		     oyunayirmas="2";
                 } else {
                     sutun = 3;
		     stunista="50";
		     oyunayirmas="2";
                 }
		var widthnewgame = "100";
		var addwidthnewgame = "";
		if(l.count>3 || l.gid==96 || l.gid==97 || l.gid==100 || l.gid==143 || l.gid==147 || l.gid==88 || l.gid==138 || l.gid==172){
		widthnewgame = "100";
		addwidthnewgame = '</div><div class="navitem noborder w100 odd">';
		}else if(l.gid == 20 || l.gid == 21 || l.gid == 22 || l.gid == 26 || l.gid == 27 || l.gid == 28 || l.gid == 29 || l.gid == 30 || l.gid == 31 || l.gid == 36 || l.gid == 37 || l.gid == 38 || l.gid == 39 || l.gid == 45 || l.gid == 56 || l.gid == 57 || l.gid == 58 || l.gid == 62 || l.gid == 63 || l.gid == 64 || l.gid == 129 || l.gid == 130 || l.gid == 131 || l.gid == 133 || l.gid == 134 || l.gid == 135 || l.gid == 139 || l.gid == 15000 || l.gid == 15001 || l.gid == 15002 || l.gid == 15003 || l.gid == 15004 || l.gid == 15005 || l.gid == 15006 || l.gid == 15007 || l.gid == 15008 || l.gid == 15009 || l.gid == 15010 || l.gid == 15011 || l.gid == 15012 || l.gid == 15013 || l.gid == 15014 || l.gid == 15017 || l.gid == 15018 || l.gid == 15019 || l.gid == 15020 || l.gid == 15021 || l.gid == 15022 || l.gid == 15025 || l.gid == 15026 || l.gid == 15027 || l.gid == 15028 || l.gid == 15029 || l.gid == 15030 || l.gid == 15031 || l.gid == 15032 || l.gid == 15033 || l.gid == 15034 || l.gid == 15035 || l.gid == 15036 || l.gid == 15037 || l.gid == 15038 || l.gid == 15039 || l.gid == 15040 || l.gid == 15041 || l.gid == 15042){
		widthnewgame = "25";
		}else if(l.count=="2"){
		widthnewgame = "50";
		}else if(l.count=="3"){
		widthnewgame = "25";
		stunista = "25";
		}
                var tr = 1;
                var image = "";
		mobilehtml += '<div id="bettype'+l.gid+'" class="navitem noborder w100 odd panel bet-type" style="">';
		mobilehtml += '<div class="cell rsDesc w'+widthnewgame+'">'+l.oyunad+'</div>'+addwidthnewgame;
		     jQuery.each(l.oranlar, function(a, b) {
                     image = Live.Details.OddsArrow(b.brid, b.oran);
if(b.oran>1){
Live.Details.Template.SetTd(b.brid, l.oyunad, b.oran, b.tercih, k.spid, image,l.gid,stunista,b.idc);
}else{
Live.Details.Template.SetTdsus(b.tercih, b.oran, sutun);
}
                     
			if (tr % sutun == 0) {
                 	 mobilehtml += '</div><div class="navitem noborder w100 even">';
			}
			tr++;
                 });
	        mobilehtml += '<div class=""></div></div>';
             },
             SetTd: function(orankodu, oyunad, oran, tercih, oyunspid, image,gid,stunista,idc) {
	     var oyungenis = "76";
	     var orangenis = "30";
	     var oranyuzde = stunista;
	     if(gid=="16" || gid=="17")
	     {
	     oyungenis = "84";
	     orangenis = "40";
	     }
	     if(gid=="138" || gid=="100")
	     {
	     oyungenis = "271";
	     oranyuzde = "100";
	     orangenis = "220";
	     }
	     if(gid=="166" || gid=="187" )
	     {
	     oyungenis = "228";
	     orangenis = "183";
	     oranyuzde = "100";
	     }
	     if(gid=="171" || gid=="180" || gid=="172" || gid=="184" || gid=="181" || gid=="186"|| gid=="97" || gid=="96" || gid=="88" || gid=="147" || gid=="139" || gid=="140" || gid=="141" || gid=="142")
	     {
	     oyungenis = "155";
	     orangenis = "112";
	     oranyuzde = "100";
	     }
	     if(gid=="200" || gid=="201" || gid=="63" || gid=="57"  || gid=="36" || gid=="37" || gid=="14" || gid=="38" || gid=="39" || gid=="20" || gid=="21" || gid=="22" || gid=="23" ||  gid=="26" || gid=="27" || gid=="28" || gid=="29" || gid=="30" || gid=="31" || gid=="32")
	     {
	     oyungenis = "115";
	     oranyuzde = "100";
	     orangenis = "70";
	     }
	     if(gid == 20 || gid == 21 || gid == 22 || gid == 57 || gid == 32 || gid == 58 || gid == 59 || gid == 60 || gid == 61 || gid == 62 || gid == 63 || gid == 64 || gid == 65 || gid == 66 || gid == 67 || gid == 23 || gid == 24 || gid == 25 || gid == 26 || gid == 27 || gid == 28 || gid == 29 || gid == 30 || gid == 31 || gid == 36 || gid == 37 || gid == 38 || gid == 39 || gid == 44 || gid == 45 || gid == 46 || gid == 47 || gid == 54 || gid == 55 || gid == 62 || gid == 63 || gid == 144 || gid == 145 || gid == 15000 || gid == 15001 || gid == 15002 || gid == 15003 || gid == 15004 || gid == 15005 || gid == 15006 || gid == 15007 || gid == 15008 || gid == 15009 || gid == 15010 || gid == 15011 || gid == 15012 || gid == 15013 || gid == 15014 || gid == 15017 || gid == 15018 || gid == 15019 || gid == 15020 || gid == 15021 || gid == 15022 || gid == 15025 || gid == 15026 || gid == 15027 || gid == 15028 || gid == 15029 || gid == 15030 || gid == 15031 || gid == 15032 || gid == 15033 || gid == 15034 || gid == 15035 || gid == 15036 || gid == 15037 || gid == 15038 || gid == 15039 || gid == 15040 || gid == 15041 || gid == 15042)
	     {
	     oranyuzde = "50";
	     }		 
		 
		 var qbut = CryptoJS.MD5(oyunad+"|"+(Bahis.idcol[idc] && Bahis.idcol[idc].kadtercih ? Bahis.idcol[idc].kadtercih:Live.GameTranslate(tercih))+"|"+Live.Details.eventid);
		 
 		mobilehtml += '<div class="cell w'+oranyuzde+' rsBut">';

 		mobilehtml += '<div class="'+Live.Details.eventid+' qbutton r qbut-'+qbut+' '+image+'" oddsid="'+Live.Details.eventid+''+orankodu+'_'+oyunad+'" onclick="javascript:canliekle(\''+Live.Details.eventid+''+orankodu+'_'+oyunad+'\',\''+oyunad+'\',\''+(Bahis.idcol[idc] && Bahis.idcol[idc].kadtercih ? Bahis.idcol[idc].kadtercih:Live.GameTranslate(tercih))+'\',\''+oran+'\',\''+Live.Details.eventid+'\',\''+oyunspid+'\', this);">';
 		mobilehtml += '<div class="caption">'+(Bahis.idcol[idc] && Bahis.idcol[idc].kadtercih ? Bahis.idcol[idc].kadtercih:Live.GameTranslate(tercih))+'</div>';
 		mobilehtml += '<div class="quote">' + oran + '</div>';
 		mobilehtml += '</div>';
 		mobilehtml += '</div>';
     	    },
			SetTdsus: function(tercih,oran) {
                 mobilehtml += '<div class="cell w25 rsBut"><div class="qbutton r"><div class="caption">' + Live.GameTranslate(tercih) + '</div><div class="quote">' + oran + '</div></div></div>';
             },
             Suspended: function(oyunad) {
 
 		mobilehtml += '<div class="navitem noborder w100 even" style="">';
 		mobilehtml += '<div class="cell rsDesc w50">'+oyunad+'</div>';
 		mobilehtml += '<div class="cell w50 rsBut">';
 		mobilehtml += '<div class="qbutton l stopped">';
 		mobilehtml += '<div class="caption">0</div>';
 		mobilehtml += '<div class="quote">0.99</div>';
 		mobilehtml += '</div>';
 		mobilehtml += '</div>';
 		mobilehtml += '</div>';

             },
             SetToggle: function() {
                 for (var v in Live.Details.kapatilanlar) {
                     jQuery('#rsg' + v).hide();
		     $('#rsggm' + v + '').addClass('closed');
                 }
             },
             Toggle: function(divid) {
                 $('#rsg' + divid).slideToggle();
                 if (Live.Details.kapatilanlar[divid]) {
                     delete Live.Details.kapatilanlar[divid];
			$('#rsggm' + divid + '').removeClass('closed');
                 } else {
                     Live.Details.kapatilanlar[divid] = divid;
		     $('#rsggm' + divid + '').addClass('closed');
                 }
             }
         }
     }
 };