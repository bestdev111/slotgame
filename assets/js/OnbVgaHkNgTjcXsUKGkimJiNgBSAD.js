 var Bahis = {
     oyunlar: {},
     diff: "0",
     idcol: {},
     sporlar: {
         1: 'Futbol',
         2: 'Tenis',
         3: 'Duello',
         4: 'Hentbol',
         5: 'Basketbol',
         6: 'Voleybol',
         24: 'Altın Liste'
     },
     Program: {
         data: {},
	 siraulke:{},
         bulten: {},
         listemodu: 0,
         myspid: 1,
         goldplay: 1,
         myuid: 0,
         mytime: 0,
         simdi: ServerTime.GetUnixTimeStamp(),
         bugunbitis: 0,
         yarinbitis: 0,
         tparam: {
             'start': 0,
             'end': 0
         },
         listetip: {
             0: "GENEL MAÇ LİSTESİ",
             1: "BÜLTEN MAÇ LISTESİ",
             2: "İDDAA MAÇ LİSTESİ"
         },
         Init: function() {
             Bahis.SaatSayac();
             return;
         },
         Umbs: function(a, b) {
             if (a > b) {
                 return a;
             }
             return b;
         },
         SetNow: function() {
             Bahis.Program.simdi = (ServerTime.GetTimeStamp());
         },
         FilterListMode: function(mod) {
             Bahis.Program.listemodu = mod;
         },
         FilterTimeMode: function(time) {
             Bahis.Program.mytime = time;
         },
         FilterSpidMode: function(spid) {
             Bahis.Program.myspid = spid;
         },
         FilterUidMode: function(uid) {
             Bahis.Program.myuid = uid;
         },
         ResetFilter: function(spid, mode) {
             $(".inputCombo.chosen").prop('selectedIndex', 0).trigger("liszt:updated");
             Bahis.Program.FilterUidMode(0);
             Bahis.Program.FilterTimeMode(0);
             Bahis.Program.FilterListMode(mode);
             Bahis.Program.FilterSpidMode(spid);
         },
         PrepareBetList: function() {
             Bahis.Program.SetNow();
             Bahis.Program.bulten = {};
             Bahis.Program.siraulke = {};
             Bahis.Program.GetDateParam(Bahis.Program.mytime);
             var $program = Bahis.Program.data.EVENTS;
             var $usirala = Bahis.Program.data.SIRALI;
	     if($usirala[Bahis.Program.myspid] && Bahis.Program.myspid!=5)
	     {
             Bahis.Program.siraulke = $usirala[Bahis.Program.myspid];
	     }else{
             Bahis.Program.siraulke = null;
	     }
	     if(Bahis.Program.myspid==24 && Bahis.Program.goldplay!=1)
	     {
	     $('#betsBox').empty().html('<div class="errormsg">HERHANGI BIR KAYIT BULUNAMADI.LUTFEN BAHIS ARAMA KRITERLERINIZI GOZDEN GECIRINIZ.</div>');
             return;
	     }
             for (var i in $program) {
                 if (($program[i].SPID == Bahis.Program.myspid || Bahis.Program.myspid==24 && $program[i].GOLD>0) && $program[i].STP > Bahis.Program.tparam['start'] && $program[i].STP <= Bahis.Program.tparam['end'] && (Bahis.Program.myuid == $program[i].UID || Bahis.Program.myuid == 0)) {
                     Bahis.Program.Aktar(i, $program[i]);
                 }
             }
             Bahis.Template.HtmlHazirla();
         },
         GetDateParam: function(v) {
             switch (v) {
                 case "0":
                     Bahis.Program.tparam['start'] = Bahis.Program.simdi;
                     Bahis.Program.tparam['end'] = Bahis.Program.simdi +
                         (86400 * 7);
                     break;
                 case "1":
                     Bahis.Program.tparam['start'] = Bahis.Program.simdi;
                     Bahis.Program.tparam['end'] = Bahis.Program.bugunbitis;
                     break;
                 case "2":
                     Bahis.Program.tparam['start'] = Bahis.Program.bugunbitis;
                     Bahis.Program.tparam['end'] = Bahis.Program.yarinbitis;
                     break;
                 case "3":
                     Bahis.Program.tparam['start'] = Bahis.Program.simdi;
                     Bahis.Program.tparam['end'] = Bahis.Program.simdi + 1800;
                     break;
                 case "4":
                     Bahis.Program.tparam['start'] = Bahis.Program.simdi;
                     Bahis.Program.tparam['end'] = Bahis.Program.simdi + 3600;
                     break;
                 case "5":
                     Bahis.Program.tparam['start'] = Bahis.Program.simdi;
                     Bahis.Program.tparam['end'] = Bahis.Program.simdi + 7200;
                     break;
                 case "6":
                     Bahis.Program.tparam['start'] = Bahis.Program.simdi;
                     Bahis.Program.tparam['end'] = Bahis.Program.simdi + 21600;
                     break;
                 case "7":
                     Bahis.Program.tparam['start'] = Bahis.Program.simdi;
                     Bahis.Program.tparam['end'] = Bahis.Program.simdi + 43200;
                     break;
                 default:
                     Bahis.Program.tparam['start'] = Bahis.Program.simdi;
                     Bahis.Program.tparam['end'] = Bahis.Program.simdi + (86400 * 7);
             }
             return;
         },
         BahisSay: function() {
             Bahis.Program.SetNow();
             var $program = Bahis.Program.data.EVENTS;
             var $bs = {
                 1: 0,
                 2: 0,
                 3: 0,
                 4: 0,
                 5: 0,
                 6: 0,
                 24: 0
             };
             for (var i in $program) {
                 if ($program[i].STP > Bahis.Program.simdi) {
                     $bs[$program[i].SPID]++;
		     if($program[i].GOLD>0)
		     {
			$bs[24]++;
		     }
                 }
             }
	     if(Bahis.Program.goldplay!=1)
	     {
	     $bs[24]=0;
	     }
             for (var i in $bs) {
                 $('.betcount_' + i).html($bs[i]);
             }
         },
         MacSec: function(macid) {
             Bahis.Program.bulten = {};
             Bahis.Program.SetNow();
             var $program = Bahis.Program.data.EVENTS;
             if (Bahis.Program.data.EVENTS[macid]) {
                 if (Bahis.Program.data.EVENTS[macid].STP > Bahis.Program.simdi) {
                     Bahis.Program.Aktar(macid, Bahis.Program.data.EVENTS[macid]);
                 }
             }
             Bahis.Template.HtmlHazirla();
         },
         Aktar: function(eventid, data) {
             if (Bahis.Program.listemodu == 1 && data.BKEY == 0) {
                 return;
             }
             if (Bahis.Program.listemodu == 2 && data.IKEY == 0) {
                 return;
             }

             if (!Bahis.Program.bulten[data.SPID]) {
                 Bahis.Program.bulten[data.SPID] = {
                     "COUNTRY": {}
                 };
             }
             if (!Bahis.Program.bulten[data.SPID].COUNTRY[data.UID]) {
                 Bahis.Program.bulten[data.SPID].COUNTRY[data.UID] = {
                     "NAME": Bahis.Program.data.SPIDS[data.SPID].COUNTRY[data.UID].NAME,
                     "SIRA": Bahis.Program.data.SPIDS[data.SPID].COUNTRY[data.UID].SIRA,
                     "LEAGUES": {}
                 };
             }
             if (!Bahis.Program.bulten[data.SPID].COUNTRY[data.UID].LEAGUES[data.LID]) {
                 Bahis.Program.bulten[data.SPID].COUNTRY[data.UID].LEAGUES[data.LID] = {
                     "NAME": Bahis.Program.data.SPIDS[data.SPID].COUNTRY[data.UID].LEAGUES[data.LID].NAME,
                     "PUANID": Bahis.Program.data.SPIDS[data.SPID].COUNTRY[data.UID].LEAGUES[data.LID].PUANID,
                     "EVENTS": {}
                 };
             }
             data.MBS = Bahis.Program.Umbs(User.Mbs, data.MBS);
             Bahis.Program.bulten[data.SPID].COUNTRY[data.UID].LEAGUES[data.LID].EVENTS[eventid] = data;
         }
     },
     Arama: function() {
         var searchstring = $('#searchinput').val();
         if (searchstring.length == 0) {
             $('#ac_results').hide();
             return;
         }
         var bulundu = false;
         var patt1 = new RegExp(searchstring, "ig");
         var $program = Bahis.Program.data.EVENTS;
         $html = [];
         $html.push('<div class="acTop"></div>');
         $html.push('<ul style="max-height: 180px; overflow: auto;">');
         if (Bahis.Program.listemodu <= 1) {
             for (var eid in $program) {
                 if ($program[eid].SPID == Bahis.Program.myspid && ($program[eid].HOME.match(patt1) || $program[eid].AWAY.match(patt1) || $program[eid].BKEY.match(patt1))) {
                     if (!bulundu) {
                         bulundu = true;
                     }
                     $html.push('<li class="ac_even ac_over">');
                     $html.push('<span onclick="javascript:Bahis.Program.MacSec(' +
                         eid + ');">' + Bahis.SetCode($program[eid].BKEY) + '-' + $program[eid].HOME + '-' + $program[eid].AWAY + '</span>');
                     $html.push('</li>');
                 }
             }
         }
         if (Bahis.Program.listemodu == 2) {
             for (var eid in $program) {
                 if (($program[eid].SPID == Bahis.Program.myspid && $program[eid].IKEY > 0) && ($program[eid].HOME.match(patt1) || $program[eid].AWAY.match(patt1) || $program[eid].IKEY.match(patt1))) {
                     if (!bulundu) {
                         bulundu = true;
                     }
                     $html.push('<li class="ac_even ac_over">');
                     $html.push('<span onclick="javascript:Bahis.Program.MacSec(' +
                         eid + ');">' + Bahis.SetCode($program[eid].IKEY) + '-' + $program[eid].HOME + '-' + $program[eid].AWAY + '</span>');
                     $html.push('</li>');
                 }
             }
         }
         if (!bulundu) {
             $html.push('<li>Sonuc bulunamadı</li>');
         }
         $html.push('</ul>');
         $html.push('<div class="acBottom"></div>');
         $('#ac_results').empty().html($html.join('')).show();
     },
     SetCode: function(code) {
         if (code <= 0) {
             return '***';
         }
         return code;
     },
     Stats: {
         Popup: function(radarid) {
             var popupwindow = window.open('https://href.li/?https://stats.betradar.com/s4/?clientid=35&matchid=' +radarid, 'Statistics', 'width=1020,height=700,screenX=10,left=10,screenY=10,top=10,toolbar=no,status=no,location=no,menubar=no,directories=no,scrollbars=needed,resizable=yes');
             popupwindow.focus();
         },
         Points: function(ligid, grid) {
             Page.BoxAjaxLoader('/_server/modules/stats.php?cmd=points&grid=' + grid + '&ligid=' +
                 ligid, 'PUAN DURUMU');
         },
         Comments: function(eid) {
             if ($('#details_grafik_comments_' + eid).text().length) {
                 $('#details_grafik_headtohead_' + eid).hide();
                 $('#details_odds_' + eid).hide();
                 $('#details_grafik_underover_' + eid).hide();
                 $('#details_grafik_comments_' + eid).show();
                 return;
             }
             var str = '<div class="detailHeader"> <div class="detailFilterShadow"></div> <div class="row2"> <div class="col"> <ul> <li><a class="active" href="javascript:;" onclick="Bahis.Stats.Comments(' +
                 eid + ');void(0);"> Notlar</a></li><li><a class="" href="javascript:;" onclick="Bahis.Stats.UnderOver(' +
                 eid + ');void(0);"> Alt/Üst Grafiği</a></li> <li><a class="" href="javascript:;" onclick="Bahis.Stats.HeadtoHead(' +
                 eid + ');void(0);"> Form Grafiği</a></li> <li><a class="" href="javascript:;" onclick="Bahis.Stats.ResetHeader(' +
                 eid + ');"> Oranlar</a></li> <div class="clear"></div> </ul> </div> <div class="clear"></div> </div> </div>';
             $('#details_' + eid).mask();
             $.get('/_server/modules/stats.php?cmd=comments&radarid=' +
                 Bahis.Program.data.EVENTS[eid].RADARID,
                 function(data) {
                     str += data;
                     $('#details_grafik_headtohead_' + eid).hide();
                     $('#details_odds_' + eid).hide();
                     $('#details_grafik_underover_' + eid).hide();
                     $('#details_grafik_comments_' + eid).html(str).show();
                     $('#details_' + eid).unmask();
                 });
         },
         UnderOver: function(eid) {
             if ($('#details_grafik_underover_' + eid).text().length) {
                 $('#details_grafik_headtohead_' + eid).hide();
                 $('#details_odds_' + eid).hide();
                 $('#details_grafik_comments_' + eid).hide();
                 $('#details_grafik_underover_' + eid).show();
                 return;
             }
             var str = '<div class="detailHeader"> <div class="detailFilterShadow"></div> <div class="row2"> <div class="col"> <ul> <li><a class="" href="javascript:;" onclick="Bahis.Stats.Comments(' +
                 eid + ');void(0);"> Notlar</a></li><li><a class="active" href="javascript:;" onclick="Bahis.Stats.UnderOver(' +
                 eid + ');void(0);"> Alt/Üst Grafiği</a></li> <li><a class="" href="javascript:;" onclick="Bahis.Stats.HeadtoHead(' +
                 eid + ');void(0);"> Form Grafiği</a></li> <li><a class="" href="javascript:;" onclick="Bahis.Stats.ResetHeader(' +
                 eid + ');"> Oranlar</a></li> <div class="clear"></div> </ul> </div> <div class="clear"></div> </div> </div>';
             $('#details_' + eid).mask();
             $.get('/_server/modules/stats.php?cmd=underover&radarid=' +
                 Bahis.Program.data.EVENTS[eid].RADARID,
                 function(data) {
                     str += data;
                     $('#details_grafik_headtohead_' + eid).hide();
                     $('#details_odds_' + eid).hide();
                     $('#details_grafik_comments_' + eid).hide();
                     $('#details_grafik_underover_' + eid).html(str).show();
                     $('#details_' + eid).unmask();
                 });
         },
         HeadtoHead: function(eid) {
             if ($('#details_grafik_headtohead_' + eid).text().length) {
                 $('#details_grafik_underover_' + eid).hide();
                 $('#details_grafik_comments_' + eid).hide();
                 $('#details_odds_' + eid).hide();
                 $('#details_grafik_headtohead_' + eid).show();
                 return;
             }
             var str = '<div class="detailHeader"> <div class="detailFilterShadow"></div> <div class="row2"> <div class="col"> <ul> <li><a class="" href="javascript:;" onclick="Bahis.Stats.Comments(' +
                 eid + ');void(0);"> Notlar</a></li><li><a class="" href="javascript:;" onclick="Bahis.Stats.UnderOver(' +
                 eid + ');void(0);"> Alt/Üst Grafiği</a></li> <li><a class="active" href="javascript:;" onclick="Bahis.Stats.HeadtoHead(' +
                 eid + ');void(0);"> Form Grafiği</a></li> <li><a class="" href="javascript:;" onclick="Bahis.Stats.ResetHeader(' +
                 eid + ');"> Oranlar</a></li> <div class="clear"></div> </ul> </div> <div class="clear"></div> </div> </div>';
             $('#details_' + eid).mask();
             $.get('/_server/modules/stats.php?cmd=headtohead&radarid=' +
                 Bahis.Program.data.EVENTS[eid].RADARID,
                 function(data) {
                     str += data;
                     $('#details_grafik_underover_' + eid).hide();
                     $('#details_odds_' + eid).hide();
                     $('#details_grafik_comments_' + eid).hide();
                     $('#details_grafik_headtohead_' + eid).html(str).show();
                     $('#details_' + eid).unmask();
                 });
         },
         LiveCenter: function(radarid) {
             Page.BoxFrameLoader("https://ls.betradar.com/ls/livescore/?/gamesassists/tr/page/sportcenter_custom/" +
                 radarid, 'CANLI MAÇ MERKEZİ', '720px', '425px');
         },
         ResetHeader: function(eid) {
             $('#details_grafik_headtohead_' + eid).hide();
             $('#details_grafik_underover_' + eid).hide();
             $('#details_grafik_comments_' + eid).hide();
             $('#details_odds_' + eid).show();
         },
     },
     SaatSayac: function() {
         $("span.lminute").each(function() {
             var str = $(this).html();
             var timeArr = str.split(':');
             if (timeArr.length == 2 && timeArr[0].length >= 2 && timeArr[1].length == 2) {
                 cd_seconds = parseInt(timeArr[1], 10);
                 cd_minutes = parseInt(timeArr[0], 10);
                 cd_seconds++;
                 if (cd_seconds > 59) {
                     cd_seconds = 0;
                     cd_minutes++
                 }
                 var lseconds = cd_seconds;
                 var lminutes = cd_minutes;
                 if (cd_minutes <= 9) lminutes = "0" + lminutes;
                 if (cd_seconds <= 9) lseconds = "0" + lseconds;
                 $(this).html(lminutes + ":" + lseconds);
             }
         });
         $("span.cdtime").each(function() {
             var str = $(this).html();
             var timeArr = str.split(':');
             cd_seconds = parseInt(timeArr[2], 10);
             cd_minutes = parseInt(timeArr[1], 10);
             cd_hours = parseInt(timeArr[0], 10);
             cd_seconds--;
             if (cd_seconds < 0) {
                 cd_seconds = 59;
                 cd_minutes--
             }
             if (cd_minutes < 0) {
                 cd_minutes = 59;
                 cd_hours--
             }
             if (cd_hours < 0) {
                 cd_hours = 0;
                 cd_minutes = 0;
                 cd_seconds = 0;
             }
             var lseconds = cd_seconds;
             var lminutes = cd_minutes;
             var lhours = cd_hours;
             if (lhours <= 9) lhours = "0" + lhours;
             if (lminutes <= 9) lminutes = "0" + lminutes;
             if (lseconds <= 9) lseconds = "0" + lseconds;
             $(this).html(lhours + ":" + lminutes + ":" +
                 lseconds);
         });
         setTimeout("Bahis.SaatSayac()", 1000);
     },
     Detay: {
         Goster: function(eid) {
             if ($("#details_" + eid).css('display') == 'block') {
                 $("#details_" + eid).hide();
                 return;
             }
             if (Bahis.Program.data.EVENTS[eid]) {
                 if (Bahis.Program.data.EVENTS[eid].SPID == 1) {
                     Bahis.Template.FutbolDetayHtml(Bahis.Program.data.EVENTS[eid]);
                 }
                 if (Bahis.Program.data.EVENTS[eid].SPID == 5) {
                     Bahis.Template.BasketDetayHtml(Bahis.Program.data.EVENTS[eid]);
                 }
                 return;
             }
             $.jgrowl('Bahis aktif değil ya da bahis bulunamadı.');
         }
     },
     SutunSay: function(odds) {
         var size = 0;
         for (var i in odds) {
             size++;
         }
         if (size == 1) {
             return 1;
         } else if (size % 2 == 0) {
             return 2;
         } else if (size % 3 == 0) {
             return 3;
         } else {
             return 3;
         }
     },
     Klavye: {
         key: {
             1: {
                 "oid": 1,
                 "sarmal": 1,
                 "idcol": 1
             },
             0: {
                 "oid": 1,
                 "sarmal": 2,
                 "idcol": 2
             },
             2: {
                 "oid": 1,
                 "sarmal": 3,
                 "idcol": 3
             },
             "H1": {
                 "oid": 2,
                 "sarmal": 1,
                 "idcol": 4
             },
             "H0": {
                 "oid": 2,
                 "sarmal": 2,
                 "idcol": 5
             },
             "H2": {
                 "oid": 2,
                 "sarmal": 3,
                 "idcol": 6
             },
             "HT01": {
                 "oid": 20,
                 "sarmal": 1,
                 "idcol": 57
             },
             "HT02": {
                 "oid": 20,
                 "sarmal": 2,
                 "idcol": 58
             },
             "HT11": {
                 "oid": 21,
                 "sarmal": 1,
                 "idcol": 59
             },
             "HT12": {
                 "oid": 21,
                 "sarmal": 2,
                 "idcol": 60
             },
             "HT1": {
                 "oid": 22,
                 "sarmal": 1,
                 "idcol": 61
             },
             "HT2": {
                 "oid": 22,
                 "sarmal": 2,
                 "idcol": 62
             },
             "HT31": {
                 "oid": 23,
                 "sarmal": 1,
                 "idcol": 63
             },
             "HT32": {
                 "oid": 23,
                 "sarmal": 2,
                 "idcol": 64
             },
             "T11": {
                 "oid": 27,
                 "sarmal": 1,
                 "idcol": 71
             },
             "T12": {
                 "oid": 27,
                 "sarmal": 2,
                 "idcol": 72
             },
             "T1": {
                 "oid": 28,
                 "sarmal": 1,
                 "idcol": 73
             },
             "T2": {
                 "oid": 28,
                 "sarmal": 2,
                 "idcol": 74
             },
             "T31": {
                 "oid": 29,
                 "sarmal": 1,
                 "idcol": 75
             },
             "T32": {
                 "oid": 29,
                 "sarmal": 2,
                 "idcol": 76
             },
             "T41": {
                 "oid": 30,
                 "sarmal": 1,
                 "idcol": 77
             },
             "T42": {
                 "oid": 30,
                 "sarmal": 2,
                 "idcol": 78
             },
             "T51": {
                 "oid": 31,
                 "sarmal": 1,
                 "idcol": 79
             },
             "T52": {
                 "oid": 31,
                 "sarmal": 2,
                 "idcol": 80
             },
             "L1": {
                 "oid": 45,
                 "sarmal": 1,
                 "idcol": 115
             },
             "L2": {
                 "oid": 45,
                 "sarmal": 2,
                 "idcol": 116
             },
             "B1": {
                 "oid": 54,
                 "sarmal": 1,
                 "idcol": 137
             },
             "B2": {
                 "oid": 54,
                 "sarmal": 2,
                 "idcol": 138
             },
             "GOL1": {
                 "oid": 73,
                 "sarmal": 1,
                 "idcol": 175
             },
             "GOL0": {
                 "oid": 73,
                 "sarmal": 2,
                 "idcol": 176
             },
             "GOL2": {
                 "oid": 73,
                 "sarmal": 3,
                 "idcol": 177
             },
             "A1": {
                 "oid": 48,
                 "sarmal": 1,
                 "idcol": 121
             },
             "A0": {
                 "oid": 48,
                 "sarmal": 2,
                 "idcol": 122
             },
             "A2": {
                 "oid": 48,
                 "sarmal": 3,
                 "idcol": 123
             },
             "G1": {
                 "oid": 19,
                 "sarmal": 1,
                 "idcol": 55
             },
             "G2": {
                 "oid": 19,
                 "sarmal": 2,
                 "idcol": 56
             },
             "D1": {
                 "oid": 18,
                 "sarmal": 1,
                 "idcol": 52
             },
             "D0": {
                 "oid": 18,
                 "sarmal": 2,
                 "idcol": 53
             },
             "D2": {
                 "oid": 18,
                 "sarmal": 3,
                 "idcol": 54
             },
             "C1": {
                 "oid": 16,
                 "sarmal": 1,
                 "idcol": 46
             },
             "C0": {
                 "oid": 16,
                 "sarmal": 2,
                 "idcol": 47
             },
             "C2": {
                 "oid": 16,
                 "sarmal": 3,
                 "idcol": 48
             },
             "HC1": {
                 "oid": 17,
                 "sarmal": 1,
                 "idcol": 49
             },
             "HC0": {
                 "oid": 17,
                 "sarmal": 2,
                 "idcol": 50
             },
             "HC2": {
                 "oid": 17,
                 "sarmal": 3,
                 "idcol": 51
             },
             "HH": {
                 "oid": 43,
                 "sarmal": 1,
                 "idcol": 104
             },
             "HD": {
                 "oid": 43,
                 "sarmal": 4,
                 "idcol": 105
             },
             "HA": {
                 "oid": 43,
                 "sarmal": 7,
                 "idcol": 106
             },
             "DH": {
                 "oid": 43,
                 "sarmal": 2,
                 "idcol": 107
             },
             "DD": {
                 "oid": 43,
                 "sarmal": 5,
                 "idcol": 108
             },
             "DA": {
                 "oid": 43,
                 "sarmal": 8,
                 "idcol": 109
             },
             "AH": {
                 "oid": 43,
                 "sarmal": 3,
                 "idcol": 110
             },
             "AD": {
                 "oid": 43,
                 "sarmal": 6,
                 "idcol": 111
             },
             "AA": {
                 "oid": 43,
                 "sarmal": 9,
                 "idcol": 112
             },
             "TB1": {
                 "oid": 137,
                 "sarmal": 1,
                 "idcol": 401
             },
             "TB0": {
                 "oid": 137,
                 "sarmal": 2,
                 "idcol": 402
             },
             "TB2": {
                 "oid": 137,
                 "sarmal": 3,
                 "idcol": 403
             },
             "ZH2": {
                 "oid": 100,
                 "sarmal": 1,
                 "idcol": 271
             },
             "ZH1": {
                 "oid": 100,
                 "sarmal": 2,
                 "idcol": 272
             },
             "ZA2": {
                 "oid": 100,
                 "sarmal": 3,
                 "idcol": 273
             },
             "ZA1": {
                 "oid": 100,
                 "sarmal": 4,
                 "idcol": 274
             }
         },
         FindIdcol: function(tercih) {
             if (Bahis.Klavye.key[tercih]) {
                 return true
             }
             return false
         },
         MacEkle: function(kod, tercih, sistem) {
             if (!Bahis.Klavye.FindIdcol(tercih)) {
                 alert("hatalı seçim yaptınız");
                 return
             }
             var oid = Bahis.Klavye.key[tercih].oid;
             var sarmal = Bahis.Klavye.key[tercih].sarmal;
             var idcol = Bahis.Klavye.key[tercih].idcol;
             var $program = Bahis.Program.data.EVENTS;
             var gonderid = "";
             if (sistem == 1) {
                 if (oid == 1) {
                     var bahis = Bahis.Program.data.EVENTS[Bahis.Program.data.BKEYS[kod]];
                     if (bahis.GAMES[oid]) {
                         tick.AddBet(bahis.EID, 0, bahis.GAMES[oid].ODDS[sarmal].ID, idcol, bahis.HOME + '-' +
                             bahis.AWAY, 0, bahis.GAMES[oid].ODDS[sarmal].RATE, oid, bahis.MBS, bahis.BKEY, bahis.SPID, bahis.STP, 0);
                         return;
                     }
                     return;
                 }
                 for (var eid in $program) {
                     if ($program[eid].BKEY == kod) {
                         gonderid = $program[eid];
                     }
                 }
             } else if (sistem == 2) {
                 if (oid == 1) {
                     var bahis = Bahis.Program.data.EVENTS[Bahis.Program.data.IKEYS[kod]];
                     if (bahis.GAMES[oid]) {
                         tick.AddBet(bahis.EID, 0, bahis.GAMES[oid].ODDS[sarmal].ID, idcol, bahis.HOME + '-' +
                             bahis.AWAY, 0, bahis.GAMES[oid].ODDS[sarmal].RATE, oid, bahis.MBS, bahis.BKEY, bahis.SPID, bahis.STP, 0);
                         return;
                     }
                     return;
                 }
                 for (var eid in $program) {
                     if ($program[eid].IKEY == kod) {
                         gonderid = $program[eid];
                     }
                 }
             }
             $.post('/v1/server/odds.php', {
                 eid: gonderid
             }, function(json) {
                 Bahissolo = json.results;
                 if (!Bahissolo.EID) {
                     $.jGrowl(kod + ' numaralı bahis bulunamadı!');
                     return
                 }
                 var bahis = Bahissolo.BKEY;
                 if (oid == 2 && Bahissolo.GAMES[9] && Bahissolo.GAMES[9].ODDS[sarmal].RATE > 1) {
                     tick.AddBet(Bahissolo.EID, 0, Bahissolo.GAMES[9].ODDS[sarmal].ID, idcol + 21, Bahissolo.HOME + ' - ' + Bahissolo.AWAY, 0, Bahissolo.GAMES[9].ODDS[sarmal].RATE, 9, Bahissolo.MBS, Bahissolo.BKEY, Bahissolo.SPID, Bahissolo.STP, 1);
                     return
                 }
                 if (Bahissolo.GAMES[oid]) {
                     if (Bahissolo.GAMES[oid].ODDS[sarmal].RATE < '1.00') {
                         alert("hatalı seçim yaptınız");
                         return;
                     } else {
         for (var vghv in Bahissolo.GAMES[oid].ODDS) {
	 if(Bahissolo.GAMES[oid].ODDS[vghv].IDC == idcol)
	 {
         tick.AddBet(Bahissolo.EID, 0, Bahissolo.GAMES[oid].ODDS[vghv].ID, idcol, Bahissolo.HOME + ' - ' + Bahissolo.AWAY, 0, Bahissolo.GAMES[oid].ODDS[vghv].RATE, oid, Bahissolo.MBS, Bahissolo.BKEY, Bahissolo.SPID, Bahissolo.STP, 1);
	return; 
	}
	}




                         return;
                     }
                 }
             });
             return
         },
         FormKontrol: function() {
             var klavyemackodu = $('#klavyemackodu').val().toUpperCase();
             var klavyetercih = $('#klavyetercih').val().toUpperCase();
             if (klavyemackodu != '' && klavyetercih == '') {
                 $('#klavyetercih').focus();
             }
             if (klavyemackodu == '' && klavyetercih != '') {
                 $('#klavyemackodu').focus();
             }
             if (klavyemackodu != '' && klavyetercih != '') {
                 if (klavyetercih == 'BM1' || klavyetercih == 'BM2' || klavyetercih == 'BN1' || klavyetercih == 'BN2' || klavyetercih == 'BV1' || klavyetercih == 'BV2' || klavyetercih == 'BHH' || klavyetercih == 'BAH' || klavyetercih == 'BHA' || klavyetercih == 'BAA') {
                     Bahis.Klavye.MacEkle(klavyemackodu, klavyetercih, 2);
                 } else {
                     Bahis.Klavye.MacEkle(klavyemackodu, klavyetercih, $('#klavyesistem').val());
                 }
                 $('#klavyetercih').val('');
                 $('#klavyemackodu').val('');
                 $('#klavyemackodu').focus();
             }
         },
         KeyboardFormKontrol: function() {
             var klavyemackodu = $('#keyboardmackodu').val().toUpperCase();
             var klavyetercih = $('#keyboardtercihkodu').val().toUpperCase();
             if (klavyemackodu == '' && klavyetercih == '') {
                 $('#keyboardtotalbet').focus();
             }
             if (klavyemackodu != '' && klavyetercih == '') {
                 $('#keyboardtercihkodu').focus();
             }
             if (klavyemackodu == '' && klavyetercih != '') {
                 $('#keyboardmackodu').focus();
             }
             if (klavyemackodu != '' && klavyetercih != '') {
                 if (klavyetercih == 'BM1' || klavyetercih == 'BM2' || klavyetercih == 'BN1' || klavyetercih == 'BN2' || klavyetercih == 'BV1' || klavyetercih == 'BV2' || klavyetercih == 'BHH' || klavyetercih == 'BAH' || klavyetercih == 'BHA' || klavyetercih == 'BAA') {
                     Bahis.Klavye.MacEkle(klavyemackodu, klavyetercih, 2);
                 } else {
                     Bahis.Klavye.MacEkle(klavyemackodu, klavyetercih, $('#keyboardsistem').val());
                 }
                 $('#keyboardmackodu').val('');
                 $('#keyboardtercihkodu').val('');
                 $('#keyboardmackodu').focus();
             }
         }
     }
 };