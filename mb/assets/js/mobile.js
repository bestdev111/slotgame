function repeatStr(input, times) {
    let result = input.repeat(times);
    return result;
}
window.generateCasinoImages = function(a, c, b) {
    return '<img alt="' + a + '"  src="' + c + '">';
};


window.checkLoginOnGameLaunch = function(a) {
    if (!app.global.loggedIn) return event.stopPropagation(), go("login", {
        from: app.j()
    }, "none"), !1;
    var c = {};
    c.gameId = a;
    app.q();
    $.ajax({
        data: c,
        url: "ajax/casino/launchUrl",
        dataType: "json",
        contentType: "application/x-www-form-urlencoded",
        type: "POST",
        success: function(b) {
	if(b.error==1)
	{
	alert(b.url);
	}else{
        var popup = window.open(b.url, "_blank","casinovox", "toolbar=no,scrollbars=yes,resizable=yes");
	if (isPopupBlockerActivated(popup)) {
	alert("Lütfen tarayıcınızda Açılır pencerelere izin veriniz.");
	}
        }
        app.Z();
	}
    });
    return !0
};


window.isPopupBlockerActivated = function(popupWindow) {
    if (popupWindow) {
        if (/chrome/.test(navigator.userAgent.toLowerCase())) {
            try {
                popupWindow.focus();
            } catch (e) {
                return true;
            }
        } else {
            popupWindow.onload = function() {
                return (popupWindow.innerHeight > 0) === false;
            };
        }
    } else {
        return true;
    }
    return false;
}

window.lazyLoading = function() {
    window.setTimeout(function() {
        function a() {
            function e() {
                c()
            }
            var f;
            jQuery(".gameRow").scroll(function() {
                clearTimeout(f);
                f = setTimeout(e, 150)
            })
        }

        function c() {
            for (var e = 0; e < d.length; e++) {
                var f = d[e].getBoundingClientRect();
                0 <= f.bottom && 0 <= f.right && f.top <= (window.innerHeight || document.documentElement.clientHeight) && f.left <= (window.innerWidth || document.documentElement.clientWidth) && d[e].getAttribute("data-src") && (d[e].src = d[e].getAttribute("data-src"), d[e].removeAttribute("data-src"))
            }
            b()
        }

        function b() {
            d = Array.prototype.filter.call(d, function(e) {
                return e.getAttribute("data-src")
            })
        }
        var d = jQuery(".lazy");
        c();
        window.addEventListener("scroll", function() {
            function e() {
                c()
            }
            var f;
            jQuery(window).on("scroll", function() {
                clearTimeout(f);
                f = setTimeout(e, 150)
            })
        }, !1);
        window.addEventListener("resize", c, !1);
        jQuery(".gameRow").scroll(function() {
            a()
        })
    }, 500)
};
function changelop(x)
{
if(x=="other")
{
$("#menu_container_1").toggle();
return;
}
$(".appcontent .oddlists").hide();
$(".appcontent #lop_"+x).show();
$(".betfilterbar .selected").removeClass('selected');
if(x==3 || x==4 ||x==5)
{
$(".betfilterbar #changeloops_other").addClass('selected');
}else{
$(".betfilterbar #changeloops_"+x).addClass('selected');
}
$("#menu_container_1").hide();
openloop=x;
}
    function LiveA() {
         $.ajax({
             type: "GET",
             url: 'ajax/sports/livebets?zfz=' + new Date().getTime(),
             dataType: "json",
             timeout: 15000,
             success: function(data) {
                 LiveParser(data);
                 Liveinterval = window.setTimeout(LiveA, 25 * 1000);
             },
             error: function(xhr, ajaxOptions, thrownError) {
                 if (xhr.statusText == "OK") {
                     Liveinterval  = window.setTimeout(LiveA, 30 * 1000);
                 } else {
                     Liveinterval  = window.setTimeout(LiveA, 30 * 1000);
                 }
             }
         });
    }
    function getlivedata() {
	     var params={};
             $.post('ajax/sports/livebets?page=livedata', params, function(json) {
                 if (json.success) {
                     jQuery.each(json.results, function(k, n) {
			 if(Livebets[k])
			 {
                         Livebets[k].status = 0;
			 }
                     });
		    LiveRender();
                 } else {
                     if (json.messages == 'CKS') {
                         Live.Stop();
                     }
                 }
             }, 'json');
    }
    function LiveParser(data) {
     $betsgam = {};
     $betsgameski = {};
     $boyunlar = {};
     $bets = {};
     $countrys={};
     $country = {};
if(data)
{
$.each(data, function(m, p) {
if (Livespids[p.spid] && Livespids[p.spid].active!=2 && (p.smid || p.radarid)) {
         var eid = parseInt(p.id);
         var hteam = p.h;
         var ateam = p.a;
         var team = p.tkm;
         var egamesd = p.live;
         var league = p.lname;
         var country = p.uname;
         var countrycode = p.uname.toLowerCase();
         var countryid = parseInt(p.uid);
         var startdate = parseInt(p.stps);
         var datemk = p.tarih;
         var timemk = (parseInt(p.stps)*1000);
	 var radarid = p.radarid;
	 var matchsimulation = p.smid;
	 var leagueid = p.lid;
	 var sht = p.sht;
	 var red1team = p.redh;
	 var red2team = p.reda;
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
		     datemk:datemk,
                     spid: p.spid,
                     diff: (p.dk ? p.dk:'0'),
                     sch: (p.sch ? p.sch:'0'),
                     sca: (p.sca ? p.sca:'0'),
                     isch: (p.isch ? p.isch:'0'),
                     isca: (p.isca ? p.isca:'0'),
                     ph: p.periodsh,
                     pa: p.periodsa,
		     periodtext:LiveGetPeriyod(spid, pid),
                     startdate: startdate,
                     running: p.run,
                     vc: p.tv,
                     videoid: p.tv,
                     matchsimulation: matchsimulation,
                     games: {}
                 };


                 if (!$countrys[spid]) {
                     $countrys[spid] = {};
                 }

                 if (!$countrys[spid][countryid]) {
                     $countrys[spid][countryid] = {
                         countryname: country,
                         l: {}
                     };
                 }
		 if(!$countrys[spid][countryid].l[leagueid])
		 {
		  $countrys[spid][countryid].l[leagueid]={bets: {},lname:league}
		 }
		 $countrys[spid][countryid].l[leagueid].bets[eid] = eid;
	 $oyunlars = {};
	 $boyunlar[eid] = {};
	 $betsgameski[eid] = {};
	if (typeof p.live != 'undefined') {
 	$.each(p.live, function(y, r) {
	var gid = parseInt(r.tempid);
	if (Liveagames[gid]) {
                             var bgid = parseInt(r.id);
                             var oyunad = (Bahis.oyunlar[Liveagames[gid]].ad) ? Bahis.oyunlar[Liveagames[gid]].ad : r.N;
                             var statu = r.o;
                             var colum = r.games.length;
                             var oranlar = {};
                             var count = 0;
	    		     $.each(r.games, function(kk, odds) {
                                     brid = parseInt(odds.Id);
                                     oran = parseFloat(odds.Odds).toFixed(2);
                                     ostatu = odds.Visible;
                                     egrid = odds.EGID;
                                     tercih = odds.Name;
				     if (ostatu==1 || ostatu==true) {
                                         oranlar[brid] = {
                                             brid: brid,
					     image: LiveOddsArrows(eid,Liveagames[gid], brid,LiveOddsFixed(oran)),
                                             oran: LiveOddsFixed(oran,spid),
					     name1x2:(odds.Name1x2 ? odds.Name1x2:tercih),
                                             tercih: tercih,
                                             idc: findidcol(Liveagames[gid],tercih),
                                             egrid: egrid,
                                             statu: ostatu
                                         };
                                         count++;
                                     }

			      });
                           $oyunlars[Liveagames[gid]] = {
                                     bgid: bgid,
                                     gid: Liveagames[gid],
                                     oyunad: oyunad,
                                     statu: statu,
                                     colum: colum,
                                     count: count,
                                     oranlar: oranlar
                                 };
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
}
Livebets = $bets;
betgameseski = $betsgam;
Livecountry = $countrys;
getlivedata();
}

function changelivespid(z)
{
$('.appcontent .evetnliveadded').hide();
$('#livefilterq .icon').removeClass("selected");
$('#iconsstar_'+z).addClass("selected");
$('#liveevents_'+z).show();
secildispid=z;
changelop(1);
}

function removelivespid()
{
$('.appcontent .evetnliveadded').show();
$('#livefilterq .icon').removeClass("selected");
secildispid=null;
changelop(1);
}




function togleotherbets(z)
{
if(!ontoglebet[z])
{
ontoglebet[z]=true;
}else{
delete ontoglebet[z];
}
LiveRender();
}




function LiveRender()
{
var eids = new Array();
var tmp = [];
var tmphead = [];
var addnames = [];
var gamecount={};
var cusu = [];
var gmcnt=0;
Betgroups[1] = 1; 
Betgroups[170] = 1; 
Betgroups[42] = 1; 
Betgroups[172] = 2; 
Betgroups[26] = 2; 
Betgroups[27] = 2; 
Betgroups[28] = 2; 
Betgroups[29] = 2; 
Betgroups[30] = 2; 
Betgroups[31] = 2; 
Betgroups[32] = 2; 


Betgroups[2] = 3; 
Betgroups[3] = 3; 
Betgroups[9] = 3; 
Betgroups[10] = 3;

 
Betgroups[20] = 4; 
Betgroups[21] = 4; 
Betgroups[22] = 4; 
Betgroups[23] = 4; 

Betgroups[36] = 5; 
Betgroups[37] = 5; 
Betgroups[38] = 5; 
Betgroups[39] = 5;
Betgroups[73] = 6;
Betgroups[74] = 6;
Betgroups[75] = 6;
Betgroups[76] = 6; 
Betgroups[77] = 6; 
Betgroups[85] = 6; 
Betgroups[127] = 6; 
Betgroups[128] = 6; 

if(window.localStorage.getItem("livefav"))
{
Livemyfavs=JSON.parse(window.localStorage.getItem("livefav"));
}else{
Livemyfavs=Livemyfavs;
}


var countryforhead = [];


if(Livecountry)
{


countryforhead.push('<li class="tab-bar-item" data-menu-item-id="1">');
countryforhead.push('<a onclick="getincountry(1);">');
countryforhead.push('<span class="icon"><span class="countryIcon c1"></span></span><span class="title">Hepsi</span>');
countryforhead.push('</a>');
countryforhead.push('</li>');






for (var cu in Livecountry) {
if(!cusu[cu])
{
tmphead.push('<div class="icon '+(secildispid==Livespids[cu].spidid ? 'selected':'')+'" id="iconsstar_'+Livespids[cu].spidid+'" onclick="changelivespid('+Livespids[cu].spidid+');"><div class="sports '+Livespids[cu].icontype+'"></div><span>'+gametours[Livespids[cu].spidid]+'</span></div>');
cusu[cu]=[];
}


if(!tmp[cu])
{
	tmp[cu]=[];
	tmp[cu]["F"]=[];
	tmp[cu]["N"]=[];
	tmp[cu]["S"]=[];
}

for (var cus in Livecountry[cu]) {


countryforhead.push('<li class="tab-bar-item" data-menu-item-id="'+cus+'">');
countryforhead.push('<a onclick="getincountry('+cus+');">');
countryforhead.push('<span class="icon"><span class="countryIcon c'+cus+'"></span></span><span class="title">'+Livecountry[cu][cus].countryname+'</span>');
countryforhead.push('</a>');
countryforhead.push('</li>');



for (var ld in Livecountry[cu][cus].l) {
var addul = true;
var addulnost = true;
var addulf = true;
var favadd = true;
var bili=0;
for (var n in Livecountry[cu][cus].l[ld].bets) {
	if(Livemyfavs[n])
	{
	addnames=tmp[cu]["F"];
	}else if(Livebets[n].pid == 0)
	{
	addnames=tmp[cu]["S"];
	}else{
	addnames=tmp[cu]["N"];
	}
	bili++;
	if (addul && !Livemyfavs[n] && Livebets[n].pid>0) {
	addnames.push('<div class="navtitle navsub ">');
	addnames.push('<div class="tlsubitem">');
	addnames.push('<div class="icon"><div class="sports_small '+Livespids[cu].icontype+'"></div><span class="countryIcon c'+cus+'"></span>');
	addnames.push('</div><div class="text">'+Livecountry[cu][cus].countryname+'/'+Livecountry[cu][cus].l[ld].lname+'</div>');
	addnames.push('</div></div>');
	addul=false;
	bili=0;
	}
	if (addulnost && !Livemyfavs[n] && Livebets[n].pid==0) {
	addnames.push('<div class="navtitle navsub ">');
	addnames.push('<div class="tlsubitem">');
	addnames.push('<div class="icon"><div class="sports_small '+Livespids[cu].icontype+'"></div><span class="countryIcon c'+cus+'"></span>');
	addnames.push('</div><div class="text">'+Livecountry[cu][cus].countryname+'/'+Livecountry[cu][cus].l[ld].lname+'</div>');
	addnames.push('</div></div>');
	addulnost=false;
	bili=0;
	}
	gmcnt++;
	addnames.push('<div class="'+(bili > 0 == 0 ? 'odd':'even')+'" id="liveevent_'+gmcnt+'">');
	addnames.push('<div id="e'+n+'" class="event match " >');
	addnames.push('<div class="hidden"><div colspan="11" class="c_comment"><div class="c_comment"></div>');
	addnames.push('<div class="c_pointer"></div></div></div><div class="event_wrapper">');
	addnames.push('<div class="datetime loggedinLive"><div class="favorites ">');
	addnames.push('<img src="./img/favorite'+(Livemyfavs[n] ? '1':'0')+'.png" onclick="toggleFavorite2('+n+');"> </div>');
	addnames.push('<div class="sportsIcon "><div class="icon"></div></div>');
	if(Livebets[n].spid==4)
	{
	addnames.push('<div class="date standard " onclick="go(\'sports/event/livedetail/'+n+'/'+(Livebets[n].vc>1 ? Livebets[n].vc:'0')+'\'); app.fromEventId = window.scrollY > 0 ? '+n+' : null;"><div> '+(Livebets[n].pid==0 ? Livebets[n].sht:(Livebets[n].pid==2 ? 'Devre':Livebets[n].diff+'\''))+' </div>');
	}else{
	addnames.push('<div class="date standard " onclick="go(\'sports/event/livedetail/'+n+'/'+(Livebets[n].vc>1 ? Livebets[n].vc:'0')+'\'); app.fromEventId = window.scrollY > 0 ? '+n+' : null;"><div> '+(Livebets[n].pid==0 ? Livebets[n].sht:Livebets[n].periodtext)+' </div>');
	}
	addnames.push('<img src="./img/icons/live_rain.png" alt="" width="23" height="23" class="hidden">');
	addnames.push('<img src="./img/icons/live_darkness.png" alt="" width="23" height="23" class="hidden"><span class="">');
	addnames.push('<img src="img/icon_liveRunning_red.gif" alt="" width="24" height="12"> </span></div></div><div class="teamrows" onclick="go(\'sports/event/livedetail/'+n+'/'+(Livebets[n].vc>1 ? Livebets[n].vc:'0')+'\'); app.fromEventId = window.scrollY > 0 ? '+n+' : null;">');
	addnames.push('<div class="teamrow"><div class="team"> '+Livebets[n].hteam+' '+repeatStr('<img class="redCards" src="img/scorebox/red-card.png" width="20" height="20">',Livebets[n].red1t)+'</div>');
	addnames.push('<div class="score">');
	if(Livebets[n].spid==7)
	{
	addnames.push('<div class="'+(Livebets[n].pid>1 ? '':'hidden')+' top"><span class="">'+Livebets[n].ph[1]+'</span></div>');
	addnames.push('<div class="'+(Livebets[n].pid>3 ? '':'hidden')+' top"><span class="">'+Livebets[n].ph[2]+'</span></div>');
	addnames.push('<div class="'+(Livebets[n].pid>5 ? '':'hidden')+' top"><span class="">'+Livebets[n].ph[3]+'</span></div>');
	addnames.push('<div class="'+(Livebets[n].pid>7 ? '':'hidden')+' top"><span class="">'+Livebets[n].ph[4]+'</span></div>');
	}
	if(Livebets[n].spid==5)
	{
	addnames.push('<div class="'+(Livebets[n].pid>0 && Livebets[n].pid!=6 ? '':'hidden')+' top"><span class="">'+Livebets[n].ph[1]+'</span></div>');
	addnames.push('<div class="'+(Livebets[n].pid>1 && Livebets[n].pid!=6 ? '':'hidden')+' top"><span class="">'+Livebets[n].ph[2]+'</span></div>');
	addnames.push('<div class="'+(Livebets[n].pid>2 && Livebets[n].pid!=6 ? '':'hidden')+' top"><span class="">'+Livebets[n].ph[3]+'</span></div>');
	addnames.push('<div class="'+(Livebets[n].pid>3 && Livebets[n].pid!=6 ? '':'hidden')+' top"><span class="">'+Livebets[n].ph[4]+'</span></div>');
	}
	if(Livebets[n].spid==44)
	{
	addnames.push('<div class="'+(Livebets[n].pid>0 && Livebets[n].pid!=6 ? '':'hidden')+' top"><span class="">'+Livebets[n].ph[1]+'</span></div>');
	addnames.push('<div class="'+(Livebets[n].pid>2 && Livebets[n].pid!=6 ? '':'hidden')+' top"><span class="">'+Livebets[n].ph[2]+'</span></div>');
	addnames.push('<div class="'+(Livebets[n].pid>4 && Livebets[n].pid!=6 ? '':'hidden')+' top"><span class="">'+Livebets[n].ph[3]+'</span></div>');
	}
	addnames.push('<div class="'+(Livebets[n].pid>2 && Livebets[n].spid==4 ? '':'hidden')+'"><span class="">'+Livebets[n].isch+'</span></div>');
	addnames.push('<div class="bold"><span class="">'+Livebets[n].sch+'</span></div>');
	addnames.push('<div class="hidden"><span class=""></span></div>');
	addnames.push('<div class="hidden"><span class=""></span>');
	addnames.push('</div></div></div><div class="teamrow"><div class="team"> '+Livebets[n].ateam+' '+repeatStr('<img class="redCards" src="img/scorebox/red-card.png" width="20" height="20">',Livebets[n].red2t)+'</div>');
	addnames.push('<div class="score">');
	if(Livebets[n].spid==7)
	{
	addnames.push('<div class="'+(Livebets[n].pid>1 ? '':'hidden')+' top"><span class="">'+Livebets[n].pa[1]+'</span></div>');
	addnames.push('<div class="'+(Livebets[n].pid>3 ? '':'hidden')+' top"><span class="">'+Livebets[n].pa[2]+'</span></div>');
	addnames.push('<div class="'+(Livebets[n].pid>5 ? '':'hidden')+' top"><span class="">'+Livebets[n].pa[3]+'</span></div>');
	addnames.push('<div class="'+(Livebets[n].pid>7 ? '':'hidden')+' top"><span class="">'+Livebets[n].pa[4]+'</span></div>');
	}
	if(Livebets[n].spid==5)
	{
	addnames.push('<div class="'+(Livebets[n].pid>0 && Livebets[n].pid!=6 ? '':'hidden')+' top"><span class="">'+Livebets[n].pa[1]+'</span></div>');
	addnames.push('<div class="'+(Livebets[n].pid>1 && Livebets[n].pid!=6 ? '':'hidden')+' top"><span class="">'+Livebets[n].pa[2]+'</span></div>');
	addnames.push('<div class="'+(Livebets[n].pid>2 && Livebets[n].pid!=6 ? '':'hidden')+' top"><span class="">'+Livebets[n].pa[3]+'</span></div>');
	addnames.push('<div class="'+(Livebets[n].pid>3 && Livebets[n].pid!=6 ? '':'hidden')+' top"><span class="">'+Livebets[n].pa[4]+'</span></div>');
	}
	if(Livebets[n].spid==44)
	{
	addnames.push('<div class="'+(Livebets[n].pid>0 && Livebets[n].pid!=6 ? '':'hidden')+' top"><span class="">'+Livebets[n].pa[1]+'</span></div>');
	addnames.push('<div class="'+(Livebets[n].pid>2 && Livebets[n].pid!=6 ? '':'hidden')+' top"><span class="">'+Livebets[n].pa[2]+'</span></div>');
	addnames.push('<div class="'+(Livebets[n].pid>4 && Livebets[n].pid!=6 ? '':'hidden')+' top"><span class="">'+Livebets[n].pa[3]+'</span></div>');
	}
	addnames.push('<div class="'+(Livebets[n].pid>2 && Livebets[n].spid==4 ? '':'hidden')+' top"><span class="">'+Livebets[n].isca+'</span></div>');
	addnames.push('<div class="bold top"><span class="">'+Livebets[n].sca+'</span></div>');
	addnames.push('<div class="hidden top"><span class=""></span></div>');
	addnames.push('<div class="hidden top"><span class=""></span></div>');
	addnames.push('</div></div></div><div class="hidden"><div class="hidden">');
	addnames.push('</div></div><div class="'+(ontoglebet[n] ? 'arrow_grey_up':'arrow_blk_down')+'" onclick="togleotherbets('+n+')"></div><div class="hidden onlive"></div></div></div>');
	addnames.push('</div><div class="'+(ontoglebet[n] ? '':'odlistbeting')+'" id="otherbets_'+n+'">');
	if(Livespids[cu].spidid==1)
	{
	if(Livebets[n].games && Livebets[n].diff <= lmdiff && Livebets[n].pid < 4 && (Livebets[n].pid > 0 || Livepremacht=="1") && Livebets[n].status==1){
	$.each(Livebets[n].games, function(u, g) {
	if(g.statu  && g.count>0)
	{
	if(!gamecount[Betgroups[g.gid]])
	{
	gamecount[Betgroups[g.gid]]=1;
	}else{
	gamecount[Betgroups[g.gid]]++;
	}
	addnames.push('<div class="navitem noborder w100 odd oddlists" id="lop_'+Betgroups[g.gid]+'" style="'+(openloop==Betgroups[g.gid] ? '':'display:none;')+'">');
	addnames.push('<div class="cell rsDesc '+(g.count==2 ? 'w50':'w25')+'">'+g.oyunad+'</div>');
	$.each(g.oranlar, function(y, o) {
	if(o.statu && o.oran>1 && g.statu)
	{
	addnames.push('<div class="cell w25 rsBut"><div class="qbutton l '+o.image+'"   oddsid="'+o.brid+'" onclick="toggleResult('+o.brid+', this,'+n+','+o.oran+','+g.gid+',\''+o.idc+'\',1,\''+Livebets[n].hteam+' - '+Livebets[n].ateam+'\','+Livebets[n].startdate+','+Livespids[cu].spidid+',\'\','+(o.egrid ? o.egrid:g.bgid)+',\''+o.tercih+'\')">');
	addnames.push('<div class="caption">'+o.name1x2+'</div><div class="quote">'+o.oran+'</div></div></div>');
	}else{
	addnames.push('<div class="cell w25 rsBut"><div class="qbutton l stoped"   oddsid="'+o.brid+'">');
	addnames.push('<div class="caption">'+o.name1x2+'</div><div class="quote">0.99</div></div></div>');
	}
	});
	addnames.push('</div>');
	}
	});
	}
	addnames.push('</div>');
	}else{
	$.each(Livebets[n].games, function(u, g) {
	if(g.statu  && Livebets[n].running=="true" && g.count>0 && Livebets[n].status==1)
	{
	if(!gamecount[Betgroups[g.gid]])
	{
	gamecount[Betgroups[g.gid]]=1;
	}else{
	gamecount[Betgroups[g.gid]]++;
	}
	addnames.push('<div class="navitem noborder w100 odd oddlists" id="lop_'+Betgroups[g.gid]+'" style="'+(openloop==Betgroups[g.gid] ? '':'display:none;')+'">');
	addnames.push('<div class="cell rsDesc '+(g.count==2 ? 'w50':'w25')+'">'+g.oyunad+'</div>');
	$.each(g.oranlar, function(y, o) {
	if(o.statu && o.oran>1 && g.statu)
	{
	addnames.push('<div class="cell w25 rsBut"><div class="qbutton l '+o.image+'"   oddsid="'+o.brid+'" onclick="toggleResult('+o.brid+', this,'+n+','+o.oran+','+g.gid+',\''+o.idc+'\',1,\''+Livebets[n].hteam+' - '+Livebets[n].ateam+'\','+Livebets[n].startdate+','+Livespids[cu].spidid+',\'\','+(o.egrid ? o.egrid:g.bgid)+',\''+o.tercih+'\')">');
	addnames.push('<div class="caption">'+o.name1x2+'</div><div class="quote">'+o.oran+'</div></div></div>');
	}else{
	addnames.push('<div class="cell w25 rsBut"><div class="qbutton l stoped"   oddsid="'+o.brid+'">');
	addnames.push('<div class="caption">'+o.name1x2+'</div><div class="quote">0.99</div></div></div>');
	}
	});
	addnames.push('</div>');
	}
	});
	addnames.push('</div>');
	}
}
}
}
}
}

if(gamecount)
{
for(var gv in gamecount)
{
$('#gamecount_'+gv).html(gamecount[gv]);
}
}





// $('#countrylivealls').html(countryforhead.join(''));

$('#livefilterq').html(tmphead.join(''));
favorilerim="";
bekleyengelecek="";
if(tmp[4])
{
if(Object.keys(tmp[4]["N"]).length>0)
{
$('#liveevents_1').html(tmp[4]["N"].join(''));
}
if(Object.keys(tmp[4]["S"]).length>0)
{
bekleyengelecek+=tmp[4]["S"].join('');
}
if(tmp[4]["F"])
{
favorilerim+=tmp[4]["F"].join('');
}
}





if(tmp[44])
{
if(Object.keys(tmp[44]["N"]).length>0)
{
$('#liveevents_3').html(tmp[44]["N"].join(''));
}
if(Object.keys(tmp[44]["S"]).length>0)
{
bekleyengelecek+=tmp[44]["S"].join('');
}
if(tmp[44]["F"])
{
favorilerim+=tmp[44]["F"].join('');
}
}



if(tmp[7])
{
if(Object.keys(tmp[7]["N"]).length>0)
{
$('#liveevents_5').html(tmp[7]["N"].join(''));
}
if(Object.keys(tmp[7]["S"]).length>0)
{
bekleyengelecek+=tmp[7]["S"].join('');
}
if(Object.keys(tmp[7]["F"]).length>0)
{
favorilerim+=tmp[7]["F"].join('');
}
}
if(tmp[5])
{
if(Object.keys(tmp[5]["N"]).length>0)
{
$('#liveevents_7').html(tmp[5]["N"].join(''));
}
if(Object.keys(tmp[5]["S"]).length>0)
{
bekleyengelecek+=tmp[5]["S"].join('');
}
if(Object.keys(tmp[5]["F"]).length>0)
{
favorilerim+=tmp[5]["F"].join('');
}
}
if(tmp[18])
{
if(Object.keys(tmp[18]["N"]).length>0)
{
$('#liveevents_6').html(tmp[18]["N"].join(''));
}
if(Object.keys(tmp[18]["S"]).length>0)
{
bekleyengelecek+=tmp[18]["S"].join('');
}
if(Object.keys(tmp[18]["F"]).length>0)
{
favorilerim+=tmp[18]["F"].join('');
}
}
if(tmp[56])
{
if(Object.keys(tmp[56]["N"]).length>0)
{
$('#liveevents_22').html(tmp[56]["N"].join(''));
}
if(Object.keys(tmp[56]["S"]).length>0)
{
bekleyengelecek+=tmp[56]["S"].join('');
}
if(Object.keys(tmp[56]["F"]).length>0)
{
favorilerim+=tmp[56]["F"].join('');
}
}
$('.evetnliveaddednewxt').html(bekleyengelecek);
if(favorilerim)
{
$('.myEventsHeader').show();
$('.evetnliveaddedfav').html(favorilerim);
}else{
$('.myEventsHeader').hide();
$('.evetnliveaddedfav').html('');
}





if($('#liveevent_1'))
{
var oldHTML = $('#liveevent_1').innerHTML;
}




}


function LiveOddsArrows(eid, oid,rid,or) {
             var arrows = "";
	     if(!betgameseski[eid])
	     {
		return "alfree";
	     }

	     if(!betgameseski[eid][oid])
	     {
		return "closed";
	     }
	     if(!betgameseski[eid][oid].oranlar[rid])
	     {
		return "closed";
	     }
	     if(parseFloat(betgameseski[eid][oid].oranlar[rid].oran) > parseFloat(or))
	     {
		return "c_but_up tendup";
	     }

 	     if(parseFloat(betgameseski[eid][oid].oranlar[rid].oran) < parseFloat(or))
	     {
		return 'c_but_down tendown';
	     }
	    return "geris";
}
function LiveOddsFixed(rate,spid) {
	if(spid==7)
	{
	var liveorks=Liveborktr;
	}else{
	var liveorks=Liveorktr;
	}

         if (liveorks < 1 || rate < 1.20) {
             return rate;
         }
         if (rate < 10) {
             fl = Math.floor(rate);
             degisim = parseFloat(fl * liveorks * 0.05).toFixed(2);
         } else if (rate >= 10 && rate <= 100) {
             fl = Math.floor(rate / 10);
             degisim = parseFloat(fl * liveorks * 1).toFixed(2);
         } else {
             fl = Math.floor(rate / 100);
             degisim = parseFloat(fl * liveorks * 5).toFixed(2);
         }
         rate = parseFloat(rate-degisim).toFixed(2);
	 return rate;
}

function findidcol(g,t)
{
     if (!Bahis.liveidcol[g]) return 0;
	if(Bahis.liveidcol[g].type=="dynamic")
	{
	return "dyn";
	}

     for (var v in Bahis.liveidcol[g]) {
         if (Bahis.liveidcol[g][v].replace(/\s/g, '') == t.replace(/\s/g, '')) {
             return v;
         }
	}



}
function LiveGetPeriyod(spid,pid)
{
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
                         periyodname = 'Devre';
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
                         periyodname = 'SON';
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
                         periyodname = '1/4';
                         break;
                     case 2:
                         periyodname = 'Ara';
                         break;
                     case 3:
                         periyodname = '2/4';
                         break;
                     case 4:
                         periyodname = 'Ara';
                         break;
                     case 5:
                         periyodname = '3/4';
                         break;
                     case 6:
                         periyodname = 'Ara';
                         break;
                     case 7:
                         periyodname = '4/4';
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
                         periyodname = 'SON';
                         break;
                     default:
                         periyodname = 'Error';
                 }
                 break;
		case 44:
                 switch (pid) {
                     case 0:
                         periyodname = 'Başlamadı';
                         break;
                     case 1:
                         periyodname = '1/3';
                         break;
                     case 2:
                         periyodname = 'Ara';
                         break;
                     case 3:
                         periyodname = '2/3';
                         break;
                     case 4:
                         periyodname = 'Ara';
                         break;
                     case 5:
                         periyodname = '3/3';
                         break;
                     case 6:
                         periyodname = 'Ara';
                         break;
                     case 7:
                         periyodname = 'UZTM';
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
                         periyodname = 'SON';
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
                         periyodname = 'DURDU';
                         break;
                     case 255:
                         periyodname = 'SON';
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
                         periyodname = '1.S';
                         break;
                     case 2:
                         periyodname = '1.STP';
                         break;
                     case 3:
                         periyodname = '2.S';
                         break;
                     case 4:
                         periyodname = '2.STP';
                         break;
                     case 5:
                         periyodname = '3.S';
                         break;
                     case 6:
                         periyodname = '3.STP';
                         break;
                     case 7:
                         periyodname = '4.S';
                         break;
                     case 8:
                         periyodname = '4.STP';
                         break;
                     case 9:
                         periyodname = '5.S';
                         break;
                     case 10:
                         periyodname = '5.STP';
                         break;
                     case 11:
                         periyodname = '6.S';
                         break;
                     case 12:
                         periyodname = '6.STP';
                         break;
                     case 13:
                         periyodname = '7.S';
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
         }
         return periyodname;


}

(function() {
    var j = void 0,
        l = !0,
        m = null,
        o = !1;

    function t() {
        return function() {}
    }

    function u(a) {
        return function() {
            return a
        }
    }
    window.redirectToDesktop = function() {
        location.href = "/"
    };
    window.resetInternational = t();
    window.odssdown={};
    var v = [];
    window.startLiveChat = function() {
    
    };
    window.gaCreate = function() {


    };
    var w, y, z, D;
    try {
        window.localStorage.getItem("a"), w = function(a) {
            return window.localStorage.getItem(a)
        }, y = function(a, b) {
            try {
                return window.localStorage.setItem(a, b), l
            } catch (c) {
                return o
            }
        }, z = function(a) {
            return window.localStorage.removeItem(a)
        }, D = function() {
            window.localStorage.clear()
        }
    } catch (aa) {
        w = u(m), y = u(o), z = t(), D = t()
    }

    function ba() {
    

		  
    }
    var tickochecked=1;
    window.Oran_Kabul_Kontrol = function() {
     if ($('#ochecked').get(0).checked) {
         $.cookie("ochecked", 1, {expires: 1});
         tickochecked = 1;
     } else {
         $.cookie("ochecked", 0, {expires: 1});
         tickochecked = 0;
     }
 }
    function G(a, b, c, d, f) {
        var g = window.ga;
        if(g) g("send", "event", a, b, c, d);
        else if(!f) window.notTrackedEvents || (window.notTrackedEvents = []), window.notTrackedEvents.push({
            category: a,
            action: b,
            label: c,
            value: d
        })
    }
    function F(a, b) {
        if(-1 < a.indexOf("login/register")) {
            if(!window.registerStartTime) G("REGISTER_TRACKING", "REGISTER_STARTED"), window.registerStartTime = (new Date).getTime()
        } else if(-1 < a.indexOf("/qr") && !window.qrAlreadyTracked) G("QR_CODE", a), window.qrAlreadyTracked = l;
        var c = window.ga;
        if(c) c("send", "pageview", a);
        else if(!b) window.notTrackedPages || (window.notTrackedPages = []), window.notTrackedPages.push(a)
    }
    window.trackRegisterDuration = function() {
        window.registerStartTime && (window.registerDuration = (new Date).getTime() - window.registerStartTime)
    };
    window.trackRegisterSuccess = function() {
        if(window.registerStartTime) {
            window.registerDuration || (window.registerDuration = (new Date).getTime() - window.registerStartTime);
            G("REGISTER_TRACKING", "REGISTER_SUCCESS_DURATION", window.registerDuration / 1E3);
            if(window.Adjust) {
                var a = new AdjustEvent("adzij1");
                Adjust.qe(a)
            }
            window.registerStartTime = j;
            window.registerDuration = j;
            app.aa = j
        }
    };
    window.registerTrackCancel = function(a) {
        G("REGISTER_TRACKING", "REGISTER_CANCELED_DUE_TO_FIELD", a)
    };

    function ca() {
        1 == app.global.loggedIn && app.global.login != m && window.ga && (ga("set", "&uid", app.global.login), window.trackRegisterSuccess(), clearInterval(window.gaUserLoginChecker))
    };
    window.setAppLoadedStatus("mobile_js_start");
    window.A = 0;
    window.B = 0;
    window.C = 0;
    var K = m;
    window.isBusy = function() {
        return app.Oa || 0 != app.I || 0 != $("#ajax:visible").length || app.u || app.Ra
    };
    window.waitForNotBusy = function(a) {
        isBusy() ? app.Pa.push(a) : setTimeout(a, 0)
    };
    window.pb = w("timeZone");
    window.Ca = 0;
    window.scan = function(a) {
        var b = app.global;
        app.info("scan: " + a);
        if("0" == a) {
            if(b.loggedIn) {
                window.Ca++;
                var c = window.Ca;
                showDialog("Sie werden in 5 Sekunden abgemeldet, wenn Ihre Karte nicht vor der Kamera liegt.");
                window.setTimeout(function() {
                    c == window.Ca && (hideDialog(), go("logout"))
                }, 5E3)
            }
        } else {
            if("string" == typeof a) {
                var d = a.indexOf(" ");
                if(-1 != d) {
                    var f = a.substring(0, d),
                        a = a.substring(d + 1);
                    window.Ca++;
                    hideDialog();
                    f != b.login && (app.info("scan login: user '" + f + "' pass '" + a + "'"), b.loggedIn != m && go("logout"),
                        go("login", {
                            username: f,
                            password: a
                        }));
                    return
                }
            }
            app.error("invalid scan code: '" + a + "'")
        }
    };
    window.i18n = function(a) {
        var b = arguments;
        if("string" != typeof app.global.language || !(app.global.language in translation)) app.global.language = "de";
        var c = translation[app.global.language][a];
        c || (c = translation.en[a], c || (c = translation.de[a]) || (c = "?" + a + "?"));
        1 < b.length && (c = c.replace(/{(\d+)}/g, function(a, c) {
            return b[1 * c + 1]
        }));
        if(c.indexOf("0,choice,1")) {
            var d = c.substring(c.lastIndexOf("#") + 1, c.lastIndexOf("|1<"));
            1 < b.length && (d = c.substring(c.lastIndexOf("<") + 1, c.lastIndexOf("}")));
            c = c.replace(/{(.*)}/g, d)
        }
        return c
    };
    var L = o;
    window.stressTest = function() {
        L = l;
        window.alert = function(a) {
            app.info("alert: " + a)
        };
        window.confirm = function(a) {
            var b = 0 == Math.floor(2 * Math.random());
            app.info("confirm: " + a + " = " + b);
            return b
        };
        window.showDialog = function(a, b, c) {
            b == m && (b = {
                "0": "OK"
            });
            c != m && c(b[Math.floor(Math.random() * b.length)])
        };
        app.info("alert und confirm \u00fcberschrieben f\u00fcr stresstest: F5 dr\u00fccken nach dem test! stop() beendet den test");
        window.stop = function() {
            L = o
        };
        M()
    };
    window.goConfirmed = function(a) {
        showDialog(i18n("common.externalUrl"), {
            cancel: i18n("common.cancel"),
            "continue": i18n("common.continue")
        }, function(b) {
            if("continue" == b) window.location.href = a
        }, "dialogGoConfirmed")
    };
    window.scrollToAnchor = function(a) {
        a = $(a);
        a.length ? $("html, body").animate({
            scrollTop: a.offset().top - 44
        }, 500) : window.scrollTo(0, document.body.scrollHeight)
    };

    function M() {
        var a = $(app.page.pa[app.page.H] + " [onclick]").add(".appheader [onclick]").add(".appfooter [onclick]"),
            a = $(a[Math.floor(Math.random() * a.length)]);
        !a.hasClass("hidden") && "go('logout')" != a.attr("onclick") && 1 > app.I && a.click();
        L == l && window.setTimeout(M, 100)
    }
    window.errorMsg = function(a) {
        if(a != m && "" != a) return htmlTagOpen("div", {
            "class": "inlineerror scrollTo2"
        }) + a + htmlTagClose("div")
    };
    window.errorMsgNewReg = function(a) {
        if(a != m && "" != a) return htmlTagOpen("div", {
            "class": "error"
        }) + a + htmlTagClose("div")
    };
    window.errorMsgPayment = function(a, b) {
        if(a != m && "" != a && b != m && "" != b) {
            var c = JSON.parse(b);
            if(c[a] != m) return htmlTagOpen("div", {
                "class": "error"
            }) + c[a] + htmlTagClose("div")
        }
    };
    window.createCheckbox = function(a, b) {
        b.type = "checkbox";
        a && (b.checked = "true");
        return htmlTag("input", b)
    };
    window.createRadio = function(a, b) {
        b.type = "radio";
        a && (b.checked = "true");
        return htmlTag("input", b)
    };
    window.selectInput = function() {
        if("undefined" != typeof event) {
            var a = $("input", $(event.target).closest("div[onclick]"));
            event.target != a[0] && ("checkbox" == a.attr("type") ? a.attr("checked", !a.attr("checked")) : a.focus())
        }
    };
    window.htmlTag = function(a, b) {
        var c = "<" + a,
            d;
        for(d in b) "checked" == d && "true" == b[d] ? c += " checked" : b[d] != j && (c += " " + d + '="' + b[d] + '"');
        return c + "/>"
    };
    window.htmlTagOpen = function(a, b) {
        var c = "<" + a,
            d;
        for(d in b) c += " " + d + '="' + b[d] + '"';
        return c + ">"
    };
    window.htmlTagClose = function(a) {
        return "</" + a + ">"
    };
    window.submitCancelWrapVisibility = function(a, b) {
        var c = $(".submitCancelWrap");
        0 < c.length && (c.hasClass("hidden") ? c.removeClass("hidden") : $(a).parent().is(c) && c.addClass("hidden"));
        b && app.ua(app.i(app.a))
    };
    window.animateElement = function(a, b, c, d, f, g) {
        (function(a, c, b, d, f, g) {
            function r() {
                r != m && (c[0].removeEventListener("webkitAnimationEnd", r, o), c[0].removeEventListener("webkitTransitionEnd", r, o), c.remove(), r = m)
            }
            c[0].addEventListener("webkitAnimationEnd", r, o);
            c[0].addEventListener("webkitTransitionEnd", r, o);
            setTimeout(r, 500);
            setTimeout(function() {
                    g && a.hide();
                    var r = "translate3d(" + b + "px," + d + "px,0)";
                    "number" == typeof f && 0 <= f && 1 >= f && (r += " scale(" + f + ")");
                    c.css({
                        transform: r,
                        "-webkit-transform": r,
                        opacity: "0.5"
                    })
                },
                25)
        })(a, function(a, c) {
            "number" != typeof c && (c = 0.5);
            var a = $(a),
                b = a.clone();
            b.css({
                position: "absolute",
                "z-index": "999",
                margin: "0",
                width: a.width() + "px",
                height: a.height() + "px",
                top: a.offset().top + "px",
                left: a.offset().left + "px",
                transition: c + "s linear all",
                "-webkit-transition": c + "s linear all"
            });
            $("body").append(b);
            return b
        }(a, f), b, c, d, g)
    };
    window.animateOddButton = function(a) {
        var b = $(a).offset(),
            c = $((app.a ? "#twoColumnFooter" : "#oneColumnFooter") + " .editor"),
            d = c.offset().left - b.left,
            b = c.offset().top - b.top;
        animateElement(a, d, b, 0.5, 0.33, o)
    };
    window.animateBetCountIcon = function() {
        var a = $((app.a ? "#twoColumnFooter" : "#oneColumnFooter") + " .editorCount"),
            b = "1" == a.text();
        animateElement(a, 0, 30, m, 0.2, b)
    };


window.getodupdown= function(eid,id,od,st) {
var oid=eid+id;
var gonder="s";
if(alllives[oid])
{
if(alllives[oid]<od)
{
gonder="tendup";
}else if(alllives[oid]>od)
{
gonder="tendown";
}else{
}
}
alllives[oid]=od;
if(st!="stopped")
{
return gonder;
}
}



var tickbetnum = 0;
var thisbets = new Object();
var bostemamobil ='<div class=""><div class="space_2">&nbsp;</div><div class="msgtext msgtextbg scrollTo"><div class="icons msg_warning"></div><div class="hidden"></div><div class="hidden"></div><div class="text" onclick="go(\'sports/all\', \'none\')">Kuponunuz henüz boş. Bahis ekleyebilirsiniz.</div></div><div class=""></div></div>';
var ticktotalbet=0;
var toplamkupon=1;
var ticktotalrate=1;
var ticktotalwin=0;
var ticktoplambedels=0;
var ticksystem = 1;
var activesystem = 0;
var ticksecilisistem = new Array();
var totalbanko=0;
var mno = 1.05;
var duello = 2;
var inlive = false;
var outlive = false;
var inbasketo = false;
var outbasketo = false;
var induello = false;
var outduello = false;
var innowplay = false;
var outnowplay = false;
var ochecked = 0;
var ticklastticketsc = new Object();
var tickeskioranlar = new Array();

window.showcalcbar= function() {
initEditorStake();
clearwindowbet();
$('#overlayContent').html('<div id="editorStakeInput"><div class="bartitle iconbar konto"><div class="text">Tutar:<div class="numpad-amount" style="display:inline">'+formatMoney(window.amount)+'</div></div></div><div class="barmiddle center"><button class="w25 active simple" onclick="editorStakeButtonPressed(1);"><div class="text">1</div></button><button class="w25 active simple" onclick="editorStakeButtonPressed(\'2\');"><div class="text">2</div></button><button class="w25 active simple" onclick="editorStakeButtonPressed(\'3\');"><div class="text">3</div></button></div><div class="barmiddle center noborder"><button class="w25 active simple" onclick="editorStakeButtonPressed(\'4\');"><div class="text">4</div></button><button class="w25 active simple" onclick="editorStakeButtonPressed(\'5\');"><div class="text">5</div></button><button class="w25 active simple" onclick="editorStakeButtonPressed(\'6\');"><div class="text">6</div></button></div><div class="barmiddle center noborder"><button class="w25 active simple" onclick="editorStakeButtonPressed(\'7\');"><div class="text">7</div></button><button class="w25 active simple" onclick="editorStakeButtonPressed(\'8\');"><div class="text">8</div></button><button class="w25 active simple" onclick="editorStakeButtonPressed(\'9\');"><div class="text">9</div></button></div><div class="barbottom center noborder"><button class="w25 active simple" onclick="editorStakeButtonPressed(\'.\');"><div class="text">.</div></button><button class="w25 active simple" onclick="editorStakeButtonPressed(\'0\');"><div class="text">0</div></button><button class="w25 active simple" onclick="editorStakeButtonPressed(\'K\');"><div class="text">C</div></button></div></div><div class="stakeButton bigbutton_wrapper overlay"><button class="bigbutton" onclick="settotalbetsamount();"><div class="text">Toplam bahis olarak yerleştir</div></button></div>');
$('#overlay').removeClass('hidden');
}

window.tickSelectSystem = function(n) {
     if (ticksecilisistem[n]) {
         delete ticksecilisistem[n];
         activesystem--;
     } else if (activesystem >= 4) {
         alert('Sistem oyunu için en fazla 4 farklı kombinasyon seçebilirsiniz');
     } else {
         ticksecilisistem[n] = n;
         activesystem++;
     }
 }


window.clearaleditor= function() {
window.amount = 0;
ticktotalbet=0;
toplamkupon=1;
ticktotalrate=1;
ticktotalwin=0;
ticktoplambedels=0;
tickbetnum = 0;
totalbanko=0;
}




function clearwindowbet()
{
window.amount = 0;
}



window.settotalbetsamount= function() {
ticktotalbet=String(window.amount);ticketupdate('1');hideOverlayse();
}

window.changesumanmount= function(a) {
ticktotalbet=String(a);ticketupdate('1');
}



    window.hideOverlayse = function() {
        $("#overlay").addClass("hidden");
    };
function hesapla(x,y) {
if(x==y)
{
return 1;
}
var n =x;
var r =y;
var fakt = n;
for (var i = n - 1; i >= 1; i--)
{
fakt = fakt * i;
}
var fakt2 = r;
for (var i = r - 1; i >= 1; i--)
{
fakt2 = fakt2 * i;
}
var number;
number = n - r;
var fakt1 = number;
for (var i = number - 1; i >= 1; i--)
{
fakt1 = fakt1 * i;
}
fakt1 = fakt2 * fakt1;
var kombinasyon = fakt / fakt1;
return kombinasyon;
}


window.showsystembar=function() {
var sistemhtml = "";
var eklekupon=0;
if(totalbanko>1)
{
eklekupon=1;
}else{
eklekupon=0;
}

if ((tickbetnum-totalbanko+eklekupon) > 3 && (tickbetnum-totalbanko+eklekupon) <= 10 && ticksystem == 1) {
for (i = 3; i <= (tickbetnum-totalbanko+eklekupon); i++) {
     sistemhtml+='<div class="editorCombiLength barmiddle" onclick="tickSelectSystem(' +i + ');ticketupdate(1);showsystembar();">';
     sistemhtml+='<div class="icon">';
	if (ticksecilisistem[i]) {
     sistemhtml+='<div class="sports checkmark"></div>';
	}else{
     sistemhtml+='<div class="sports blank"></div>';
	}
     sistemhtml+='</div>';
     sistemhtml+='<div class="text w100">' + i + 'li kombine</div>';
     sistemhtml+='<div class="value">';
     sistemhtml+='<div class="count">'+hesapla((tickbetnum-totalbanko+eklekupon),i)+'</div>';
     sistemhtml+='</div>';
     sistemhtml+='</div>';
}
}
     sistemhtml+='<div class="stakeButton bigbutton_wrapper overlay"><button class="bigbutton" onclick="hideOverlayse()"><div class="text">Tamam</div></button></div>';
     $('#overlayContent').html(sistemhtml);
     $('#overlay').removeClass('hidden');
}


function K(a){a+="";""==a&&(a="0");$(".numpad-amount").html(formatMoney(a));window.amount=a}
window.formatMoney=function(a){var currencyGrouping="TL",c=Math.floor(1*a)+"",a=Math.round(100*a)%100,a=Math.abs(a);for(1==(a+"").length&&(a="0"+a);;){var e=c,c=c.replace(/(\d+)(\d\d\d)/,"$1$2");if(c==e)break}return c+'.'+a};

window.amount = 0;
	window.ReadCookie = function() {
        if ($.cookie("coupon") != null) {
         thisbets = JSON.parse($.cookie("coupon"));
         tickbetnum = JSON.parse($.cookie("countcoupon"));
         }
 	}




 window.ComboList = function(superset, size,bankos) {
     var result = [];
     if (superset.length < size) {
         return result;
     }
     var done = false;
     var current_combo, distance_back, new_last_index;
     var indexes = [];
     var indexes_last = size - 1;
     var superset_last = superset.length - 1;
     for (var i = 0; i < size; ++i) {
         indexes[i] = i;
     }
     while (!done) {
         current_combo = [];
         for (i = 0; i < size; ++i) {
             current_combo.push(superset[indexes[i]]);
         }
         if (bankos) {
         var bankos_len = bankos.length;
         for (i = 0; i < bankos_len; ++i) {
             current_combo.push(bankos[i]);
	 }
         }
         result.push(current_combo);
         if (indexes[indexes_last] == superset_last) {
             done = true;
             for (i = indexes_last - 1; i > -1; --i) {
                 distance_back = indexes_last - i;
                 new_last_index = indexes[indexes_last - distance_back] +
                     distance_back + 1;
                 if (new_last_index <= superset_last) {
                     indexes[indexes_last] = new_last_index;
                     done = false;
                     break;
                 }
             }
             if (!done) {
                 ++indexes[indexes_last - distance_back];
                 --distance_back;
                 for (; distance_back; --distance_back) {
                     indexes[indexes_last - distance_back] = indexes[
                         indexes_last - distance_back - 1] + 1;
                 }
             }
         } else {
             ++indexes[indexes_last]
         }
     }
     return result;
 }
 window.KomboOdds = function(sets) {
     var result = [];
     var len = sets.length;
     var product;
     var toplam = 0
     for (var i = 0; i < len; ++i) {
         product = 1;
         inner_len = sets[i].length;
         for (var j = 0; j < inner_len; ++j) {
             product *= sets[i][j];
         }
         toplam += product;
         result.push(product);
     }
     return (toplam);
 }
 window.Kombowins = function(sets) {
     var combowin = 0;
     var result = [];
     var len = sets.length;
     var product;
     var toplam = 0
     for (var i = 0; i < len; ++i) {
         product = 1;
         inner_len = sets[i].length;
         for (var j = 0; j < inner_len; ++j) {
             product *= sets[i][j];
         }
         toplam += (ticktotalbet*product);
         result.push(product);
     }
     return toplam;
 }
 window.UpdateSystem = function() {
     var thisbetnums = 0;
     var thisbetnumsbanko = 0;
     var bankoodsi=1;
     if (!activesystem) {
         UnsetSystem();
         return
     }
     if (activesystem) {
         toplamkupon = 0;
         ticktotalrates = 0;
         var cos;
         var odds = new Array();
         var oddsbanko = new Array();
         for (var vl in thisbets) {
             for (var vl2 in thisbets[vl]) {
		 if(thisbets[vl][vl2].banko)
		 {
                 oddsbanko.push(thisbets[vl][vl2]['oran']);
		 thisbetnumsbanko++;
		 bankoodsi=parseFloat(bankoodsi*thisbets[vl][vl2]['oran']);
		 }else{
                 odds.push(thisbets[vl][vl2]['oran']);
		 thisbetnums++;
		 }
             }
         }
         for (var i in ticksecilisistem) {
             if (i > thisbetnums) {
                 delete ticksecilisistem[i];
                 activesystem--;
             }
             cos = ComboList(odds, i);
             cosw = ComboList(oddsbanko, i);
             ticktotalwins += parseFloat(Kombowins(cos));
             ticktotalrates += parseFloat(KomboOdds(cos)*bankoodsi);
             toplamkupon += cos.length;
         }
     }
 }
 window.UnsetSystem = function() {
     toplambedel = '0.00';
     toplamkupon = 1;
     activesystem = 0;
     ticksecilisistem = new Array();
 }




window.setbankothis = function(vl,vls,fd) {
if(thisbets[vl][vls].banko==1)
{
delete thisbets[vl][vls].banko;
}else{
thisbets[vl][vls].banko=fd;
}
ticketupdate();
}


 window.ticketupdate = function(ids) {
       if(Object.keys(thisbets).length<1)
       {
       ReadCookie();
       }
	var kamount = "";
        var x = 0;
	ticktotalrate = 1;
	ticktotalwins=0;
	totalbanko=0;
	inlive = false;
	outlive = false;
	inbasketo = false;
	outbasketo = false;
	induello = false;
	outduello = false;
	innowplay = false;
	outnowplay = false;
	UpdateSystem();
        var yds = "<div class=\"hidden\"  onclick=\"javascript:;\"></div>";
        for (var vl in thisbets) {
	if(thisbets[vl])
	{
	for (var vl2 in thisbets[vl]) {
        x++;
             var islive = false;
             var isduello = false;
             var isvfl = false;
             var image = SetImage(vl, vl2, thisbets[vl][vl2].oran);
yds += '<div class="editem removeWrapper" onclick="">';
yds += '<div class="text matchname">'+(thisbets[vl][vl2].banko ? '(B) ':'')+''+thisbets[vl][vl2].bahis+'</div>';
if (Object.keys(thisbets).length >= 4 && Object.keys(thisbets).length <= 10 && ticksystem == 1 && toplamkupon>1) {
if(thisbets[vl][vl2].banko)
{
totalbanko++;
yds += '<div class="visible bank '+(thisbets[vl][vl2].banko ? '1':'0')+'" onclick="setbankothis('+vl+','+vl2+',0);">Banko</div>';
}else{
yds += '<div class="visible bank '+(thisbets[vl][vl2].banko ? '1':'0')+'" onclick="setbankothis('+vl+','+vl2+',1);">Banko</div>';
}
}else{
yds += '<div class="invisible bank" onclick=";">Banko</div>';
}
	yds += '<div class="comment">'+thisbets[vl][vl2].oyunad+'</div>';
	yds += '<div class="removeButton" onclick="javascript:DeleteBet('+vl+');"> <img src="img/remove_slim_blue.png" alt="" width="10" height="10"> </div>';
	yds += '</div>';
	yds += '<div class="edsubitem odd"><div class="text w100"><div class="hidden"></div>'+thisbets[vl][vl2].tercih+' '+(thisbets[vl][vl2].hdc ? thisbets[vl][vl2].hdc:'')+'</div> <div class="value '+image+' '+(thisbets[vl][vl2].oran<1.01 && !image ? 'paused':'')+'">'+parseFloat(thisbets[vl][vl2].oran).toFixed(2)+'</div> '+(image=="paused" || thisbets[vl][vl2].oran<1.01 ? '<div class="inlineerror scrollTo2">Bu tahmin şu an kapalı.</div>':'')+' </div>';
	ticktotalrate=(ticktotalrate*thisbets[vl][vl2].oran);
             if (thisbets[vl][vl2]['canli'] > 0) {
                 islive = true;
                 inlive = true;
             } else {
                 outlive = true;
             }
             if (thisbets[vl][vl2].spid == 32) {
                 isvfl = true;
                 inbasketo = true;
             } else if (thisbets[vl][vl2].spid == 5) {
                 outbasketo = true;
             }
	}
	}
        }
yds +='<div>';
if(toplamkupon==1)
{
ticktotalrate = parseFloat(ticktotalrate).toFixed(2);
ticktotalwin = parseFloat(ticktotalrate) * parseFloat(ticktotalbet);
ticktotalwin = parseFloat(ticktotalwin).toFixed(2);
ticktoplambedels = parseFloat(ticktotalbet).toFixed(2);
if(x>"1")
{
var kuponadisi = x+" li Kombine";
}else{
var kuponadisi = "Tekli Bahis";
}
}else if(toplamkupon>1)
{
ticktotalrate = parseFloat(ticktotalrates).toFixed(2);
ticktoplambedels = parseFloat(ticktotalbet * toplamkupon).toFixed(2);
ticktotalwin = parseFloat(ticktotalwins).toFixed(2);
var mesaisi = "";
for(var m in ticksecilisistem)
{
mesaisi+=m+'\'li';
}
var kuponadisi = mesaisi+" Kombineler "+(totalbanko>0 ? '('+totalbanko+' Banko)':'')+" "+x+"= "+toplamkupon;
}
if ((x-totalbanko) > 3 && (x-totalbanko) <= 10 && ticksystem == 1) {
yds +='<div>';
yds +='<div class="bartitle arrow iconbar system" onclick="javascript:showsystembar();">';
yds +='<div class="text">Sistem</div>';
yds +='<div class="value">'+kuponadisi+'</div>';
yds +='</div>';
yds +='</div>';
}
yds+='<div class="stakeButtons center barmiddle"><button class="w25 active '+(ticktotalbet==30 ? 'selected':'')+'" onclick="changesumanmount(30);"><div class="text">30</div></button><button class="w25 active '+(ticktotalbet==50 ? 'selected':'')+'" onclick="changesumanmount(50);"><div class="text">50</div></button><button class="w25 active '+(ticktotalbet==100 ? 'selected':'')+'" onclick="changesumanmount(100);"><div class="text">100</div></button>';
if(ticktotalbet>0 && ticktotalbet!=30 && ticktotalbet!=50 && ticktotalbet!=100)
{
yds+='<button class="w25 active selected" onclick="javascript:showcalcbar();"><div class="text">'+ticktotalbet+'</div></button></div>';
}else{
yds+='<button class="w25 active " onclick="javascript:showcalcbar();"><div class="text">...</div></button></div>';
}
yds+='<div class="barmiddle small arrow noborder withlabel">';
yds+='<div class="text">Bahis</div>';
yds+='<div class="value" onclick="javascript:showcalcbar();"><span class=""><span id="toplamkupons">'+toplamkupon+'</span> x '+ticktotalbet+'&nbsp;TL = </span><span id="toplambedels">'+ticktoplambedels+'</span>&nbsp;TL </div>';
yds+='</div>';
yds+='<div class="barbottom small withlabel" style="display:table;">';
yds+='<div class="text">Maks. Oran</div>';
yds+='<div class="value" id="trate">'+ticktotalrate+'</div>';
yds+='</div>';
yds+='<div class="barbottom small withlabel hidden" style="display:table;">';
yds+='<div class="text">Toplam bahis</div>';
yds+='<div class="value" id="toplambedel">'+ticktotalbet+'</div>';
yds+='</div>';


yds+='<div class="barbottom small withlabel" style="display:table;">';
yds+='<div class="text">Maks. Kazanç</div>';
yds+='<div class="value" id="twin">'+ticktotalwin+'</div>';
yds+='</div>';

if(addbonus==1 && toplamkupon==1 && x>=5)
{
var bonusu = parseFloat(ticktotalwin/100*5);
var totalbonuslu = parseFloat(ticktotalwin)+parseFloat(bonusu);
yds+='<div class="barbottom small withlabel" style="display:table;">';
yds+='<div class="text">5% Bonus Dahil</div>';
yds+='<div class="value" id="twins">'+parseFloat(totalbonuslu).toFixed(2)+'</div>';
yds+='</div>';
}

yds+='<div class="hidden" style="display:table;">';
yds+='<div class="text"></div>';
yds+='<div class="value"></div>';
yds+='</div>';
yds+='<div class="barbottom small withlabel" style="display:table;" onclick="Oran_Kabul_Kontrol();">';
yds+='<div class="text">Değişen Oranları Kabul Et</div>';
yds+='<div class="value"><input name="ochecked" class="checkbox checkboxBig" value="1" id="ochecked" type="checkbox" onclick="Oran_Kabul_Kontrol();" checked></div>';
yds+='</div>';
yds+='</div>';
yds+='<div><button class="bigbutton edit" id="datasendtick" onclick="tickSendData();"><div class="text">Bahsini yap</div></button></div>';

if(addbonus==1 && toplamkupon==1)
{
yds+='<div class="bartitle"><div class="text">Daha fazla kombine edin - Daha fazla kazanın!</div>';
yds+='<div class="icon right" onclick=""></div></div>';
yds+='<div class="halfsize barbottom">';
if(x<5)
{
yds+='<div class="text">'+(5-x)+' Tahmin seçin ve 5% Bonusu garatileyin!</div>';
}else if(x>=5)
{
yds+='<div class="text">Tebrikler Bu Kuponda + 5% Bonus Alacaksınız!</div>';
}
yds+='<div class="icon">';
yds+='<div class="sports blank"></div></div></div>';
}



	if(x>0)
	{
	$('.editorCount').html(x).removeClass('hidden');
	$('.edtitle').removeClass('hidden');
	$('#kuponheaders').html('<div class="edtitle bartitle"> <div class="text" id="cbetnum">'+x+' Tahmin</div> <div class="value clearValue" onclick="clearEditor()"> <div class="text">Sil</div></div> </div>').removeClass('hidden');
	$('#kuponuma').html(yds);
	}else{
	$('.editorCount').addClass('hidden');
	$('.edtitle').addClass('hidden');
	$('#kuponheaders').addClass('hidden');
	$('#kuponuma').html(bostemamobil);
	clearaleditor();
	}
	tickbetnum = x;
	$('#cbetnum').html(x+' Tahmin');
        SetCookie();
        };

 	window.RemoveSelect = function(id) {
     	for (var vl in thisbets[id]) {
        $("div[oddsid='" + vl + "']").removeClass('selected');
     	}
 	}



        window.DeleteBet= function(id) {
        RemoveSelect(id);
        delete thisbets[id];
        SetCookie();
        ticketupdate('1');
       };

       window.DeleteBetAll= function() {
        for (var vl in thisbets) {
	if(thisbets[vl])
	{
        RemoveSelect(vl);
        delete thisbets[vl];
	}
	}
       tickbetnum=0;
       SetCookie();
       ticketupdate('1');
       };



var ticksend = false;
window.showtickalert = function(x) {
 showDialog("<div id='depositAfterLoginDialog'><div class='sub'>UYARI</div>"+x+"</div>", {ok: "Tamam"})
}
window.MbsKontrol = function() {
     var mbs = 1;
     for (var vl in thisbets) {
         for (var vl2 in thisbets[vl]) {
             if (thisbets[vl][vl2]['mbs'] > mbs) {
                 mbs = thisbets[vl][vl2]['mbs'];
             }
         }
     }
     return mbs;
 }





window.RefreshTicket = function() {
         setInterval('tickUpdateOdds()', 15000);
}


window.tickUpdateOdds = function() {
     tickrquery = '';
     if (tickbetnum == 0) {
         oldodds = {};
         return;
     }
     if (ticksend) {
         return;
     }
     var l = 0;
     for (var vl in thisbets) {
         for (vl2 in thisbets[vl]) {
             if (thisbets[vl][vl2]['canli'] > 0) {
                 tickrquery += vl + ',' + thisbets[vl][vl2]['canli'] + ',' +vl2 + '|';
                 l++;
                 if (Livebets[vl]) {
                     if (Livebets[vl].status != 1) {
                         delete thisbets[vl];
                     }
                 } else {
                     delete thisbets[vl];
                 }
             }
         }
     }
     if (l == 0) {
         return;
     }
     tickrquery = tickrquery.substring(0, (tickrquery.length - 1));
     var params = {
         cmd: 'results',
         query: tickrquery
     };

     $.ajax({
         type: "GET",
         url: 'ajax/sports/livebets?page=liveondet&zfz=' + new Date().getTime(),
         data: params,
         dataType: "json",
         success: function(json) {
          for (var ok in json) {
                 var buspid = json[ok].spid;
                 var orankodu = json[ok].RID;
                 var open = json[ok].Open;
		 var odds = parseFloat(json[ok].Odds).toFixed(2);
		 if (typeof open == 'undefined') open ='False';
                 if (isNaN(odds)) odds = '1.00';
		if (open != '1') {
		    oldodds[orankodu] = '1.00';
                 } else {
                    oldodds[orankodu] = LiveOddsFixed(odds,buspid);
                 }
	  }
         }
     });
ticketupdate('1');
}

window.SetImage = function(bahiskodu, orankodu, oran) {
     if (typeof oldodds[orankodu] == 'undefined') {
         return '';
     }
     if (oldodds[orankodu] == '1.00') {
         thisbets[bahiskodu][orankodu]['oran'] = '1.00';
         return 'paused';
     }
     if (oldodds[orankodu] == oran) {
         return '';
     }

     if (oldodds[orankodu] > oran) {
         thisbets[bahiskodu][orankodu]['oran'] = oldodds[orankodu];
         return 'tendup';
     }
     if (oldodds[orankodu] < oran) {
         thisbets[bahiskodu][orankodu]['oran'] = oldodds[orankodu];
         return 'tendown';
     }
}




$(document).ready(function() {
RefreshTicket();
});




window.tickYazdirTema = function(ticketid, amount, trate, win, bc, misli,system,bets) {

     var htmlmobil = '';
     htmlmobil+='<div>';
     htmlmobil+='<div class="">';
     htmlmobil+='<div class="space_2">&nbsp;</div>';
     htmlmobil+='<div class="msgtext msgtextbg scrollTo">';
     htmlmobil+='<div class="icons msg_info"></div>';
     htmlmobil+='<div class="hidden"></div>';
     htmlmobil+='<div class="hidden"></div>';
     htmlmobil+='<div class="text">Kuponunuz kabul edildi. Bol Şanslar!</div>';
     htmlmobil+='</div>';
     htmlmobil+='<div class=""></div>';
     htmlmobil+='</div>';
     htmlmobil+='</div>';
     htmlmobil+='<div class="bartitle bartitlebutton">';
     htmlmobil+='<div class="icon hidden"></div>';
     htmlmobil+='<div class="text">Kupon '+ticketid+'</div>';
     htmlmobil+='</div>';
     htmlmobil+='<div>';
     htmlmobil+='<div class="barmiddle">';
     htmlmobil+='<div class="text">Durum</div>';
     htmlmobil+='<div class="value pr_7" style="float:right;">';
     htmlmobil+='<div class="cell" style="text-transform:capitalize">';
     htmlmobil+='<div class="ticketstatus DELIVERED"></div> açık</div>';
     htmlmobil+='</div>';
     htmlmobil+='</div>';
     htmlmobil+='<div class="barmiddle">';
     htmlmobil+='<div class="text">Tarih</div>';
     htmlmobil+='<div class="value pr_7">Bugün '+new Date().getHours().toFixed(2)+':'+new Date().getMinutes().toFixed(2)+'</div>';
     htmlmobil+='</div>';
     htmlmobil+='<div class="barmiddle ">';
     htmlmobil+='<div class="text">Bahis</div>';
     htmlmobil+='<div class="value pr_7">' +parseFloat(amount).toFixed(2) +'</div>';
     htmlmobil+='</div>';
     htmlmobil+='<div class="barmiddle ">';
     htmlmobil+='<div class="text">Maks. Kazanç</div>';
     htmlmobil+='<div class="value pr_7">' +parseFloat(win).toFixed(2) + '</div>';
     htmlmobil+='</div>';
     htmlmobil+='<div class="barmiddle ">';
     htmlmobil+='<div class="text">Maks. Oran</div>';
     htmlmobil+='<div class="value pr_7">' + parseFloat(trate).toFixed(2) + '</div>';
     htmlmobil+='</div>';
     htmlmobil+='<div class="barmiddle hidden">';
     htmlmobil+='<div class="text">Bonus Çevrimini sayılayan tutar</div>';
     htmlmobil+='<div class="value pr_7"></div>';
     htmlmobil+='</div>';
     htmlmobil+='<div class="barmiddle" onclick="">';
     htmlmobil+='<div class="text">Sistem';
     htmlmobil+='</div>';
     htmlmobil+='<div class="value pr_7">' + system + '</div>';
     htmlmobil+='</div>';
     htmlmobil+='</div>';
for (tis in bets)
{
if(bets[tis].canli>0)
{
htmlmobil+='<div class="ticketitem even" onclick="go(\'sports/event/livedetail/'+tis+'/0\');">';
htmlmobil+='<div class="label date">'+bets[tis].bttimes+'</div>';
}else{
htmlmobil+='<div class="ticketitem even" onclick="go(\'sports/event/getodds/'+bets[tis].spid+'/'+tis+'\');">';
htmlmobil+='<div class="label date">'+bets[tis].bttimes+'</div>';
}
     htmlmobil+='<div class="text">';
     htmlmobil+='<span>'+bets[tis].bahis+'</span><br>';
if(bets[tis].canli>0)
{
     htmlmobil+='<span class="normal">'+bets[tis].sch+':'+bets[tis].sca+' Bahis anıdaki skor</span>';
}
     htmlmobil+='</div></div>';
     htmlmobil+='<div class="ticketsubitem even pad">';
     htmlmobil+='<div class="label"></div>';
     htmlmobil+='<div class="text OPEN">'+bets[tis].oyunkad+'&nbsp;'+bets[tis].ktercih+'</div>';
     htmlmobil+='<div class="value OPEN">'+parseFloat(bets[tis].oran).toFixed(2)+'</div>';
     htmlmobil+='</div>';
     htmlmobil+='<div class="clear barfinish even"></div>';
     htmlmobil+='<div>';

}
     htmlmobil+='<div class="bigbutton_wrapper"><button class="bigbutton" onclick="javascript:tickLastTicket();"><div class="text">Kuponu tekrar kullan</div></button></div>';
     htmlmobil+='</div>';
     htmlmobil+='<div> </div>';
     htmlmobil+='<div style="text-align: center; width: 100%;" class="contentbottom hidden">';
     htmlmobil+='<div class="bar arrow" onclick=""> </div>';
     htmlmobil+='<div class="contentbottomtext" style="padding-bottom: 50px;"> </div>';
     htmlmobil+='</div>';
     htmlmobil+='<div class="spacer">&nbsp;</div>';
     $('#kuponuma').html(htmlmobil);
     $('.editorCount').text('0').hide();
 }

window.tickSendData = function() {
     if (ticksend) {
         return;
     }
     if (!tickbetnum) {
        showtickalert('Oyun kuponunuzda maç bulunmamaktadır');
        return;
     }

     if (ticktotalrate < mno) {
        showtickalert('Kupon Minimum '+mno+' Oran Olmalıdır.');
        return;
     }

     if (ticktotalbet < minsum && toplamkupon <= 1) {
         showtickalert('Minimum oyun miktarı ' + minsum +' kredi olmalıdır');
         return;
     }

     if (ticktotalbet > maxsum) {
         showtickalert('Maksimum kupon bedeli ' + maxsum +' kredi olmalıdır');
         return;
     }
     if (tickbetnum > maxbet) {
         showtickalert('En fazla ' + maxbet +' oyun kabul edilmektedir');
         return;
     }

     if (ticktotalrate > maxrate) {
         showtickalert('Maksimum kupon oranı ' + maxrate +' limitini geçemez');
         return;
     }

     if (ticktotalwin > maxwin) {
         showtickalert('Maksimum kazancınız ' + maxwin +' Kredi limitini geçemez');
         return;
     }

     if (kombinasyon == 2 && inlive && outlive) {
         showtickalert('Canlı oyunlarla normal oyunlar kombine edilemezler. Lütfen seçimlerinizi gözden geçiriniz.');
         return;
     }

     if (inbasketo && outbasketo) {
         showtickalert('Basketbol Özel ile Normal Basketbol oyunlar kombine edilemezler. Lütfen seçimlerinizi gözden geçiriniz.');
         return;
     }


     var mbs = MbsKontrol();
     var dahaekle = mbs - tickbetnum;
     if (tickbetnum < mbs) {
         showtickalert('Minimum oyun sayısı yetersiz. En az ' + dahaekle +' oyun daha eklemelisiniz');
         return;
     }

     app.q();
     ticksend = true;
     var secimler = {};
     var sistemler = {};
     var dsistemler = {};
     var eventodds = [];
     var eventoddsbanko = [];
     var i = 0;
     for (var vl in thisbets) {
         for (var vl2 in thisbets[vl]) {
             	 secimler[vl2] = {
                 bahiskodu: vl,
                 canli: thisbets[vl][vl2]['canli'],
                 orankodu: vl2,
                 oran: thisbets[vl][vl2]['oran'],
                 bahis: thisbets[vl][vl2]['bahis'],
                 oyunad: thisbets[vl][vl2]['oyunad'],
                 oyunkad: thisbets[vl][vl2]['oyunkad'],
                 tercih: thisbets[vl][vl2]['tercih'],
                 ktercih: thisbets[vl][vl2]['ktercih'],
                 oyunkodu: thisbets[vl][vl2]['oyunkodu'],
                 banko: thisbets[vl][vl2]['banko'],
                 spid: thisbets[vl][vl2]['spid'],
		 stp: thisbets[vl][vl2]['date'],                 
		 hdc: thisbets[vl][vl2]['hdc'],
		 radarid: thisbets[vl][vl2]['radarid'],
		 idcol: thisbets[vl][vl2]['idcol'],
		 checkcode: thisbets[vl][vl2]['kontrolkodu']
             };
if(!thisbets[vl][vl2]['banko'])
{
eventodds.push(vl);
i++;
}else{
eventoddsbanko.push(vl);
}
}
}

     for (var i in ticksecilisistem) {
         sistemler[i] = i;
         dsistemler[i] = ComboList(eventodds, i,eventoddsbanko);
     }


     var params = {
         orktr: Liveorktr,
         amount: ticktotalbet,
         cmd: 'confirm',
	 cbonus : addbonus,
	 thismobile : 2,
         ochecked: tickochecked,
	 tkupon : toplamkupon,
	 dsystemler: dsistemler,
         systemler: sistemler,
         secimler: secimler
     };


	$.ajax({
            url: "sendeditor",
            dataType: "json",
            contentType: "application/x-www-form-urlencoded",
            data: params,
            type: "POST",
            success: function(json) {
	    if (json.success) {
             ticklastticketsc = JSON.stringify(thisbets);
	     DeleteBetAll();
	     app.Z();
	     ticksend = false;
             tickYazdirTema(json.results.ticketid, json.results.amount,json.results.trate, json.results.win, json.results.bc, json.results.misli, json.results.system, json.results.bets);             ticksend = false;
	     absa=$(".account .count");
	     absa.html(json.results.balance);
       	  } else {
             ticksend = false;
	     showtickalert(json.messages);
	    app.Z();
            }
            }
        });
};


    window.tickLastTicket = function() {
    if(ticklastticketsc)
    {
    thisbets=JSON.parse(ticklastticketsc);
        SetCookie();
        ticketupdate('1');
    }
    }


    window.toggleResult = function(a, b,eid,rate,gameid,idc,mbs,team,stp,spid,spc,live,ktercih) {
	var oncesi ="0";
        if (rate<1.01) {
         return;
        }
	if(thisbets[eid])
	{
	if (thisbets[eid][a]) {
            oncesi = 1;
        }
	RemoveSelect(eid);
	DeleteBet(eid);
	}
	 if(oncesi!=1){
    	 thisbets[eid] = new Object();
         thisbets[eid][a] = new Object();
         thisbets[eid][a]['bahiskodu'] = eid;
         thisbets[eid][a]['oyunkodu'] = gameid;
         thisbets[eid][a]['orankodu'] = a;
         thisbets[eid][a]['oyunad'] = Bahis.oyunlar[gameid].ad;
         thisbets[eid][a]['oyunkad'] = Bahis.oyunlar[gameid].kad;
         thisbets[eid][a]['tercih'] = (Bahis.idcol[idc] ? Bahis.idcol[idc].tercih:ktercih);
         thisbets[eid][a]['ktercih'] = (Bahis.idcol[idc] ? Bahis.idcol[idc].ktercih:ktercih);
         thisbets[eid][a]['idcol'] = idc;
         thisbets[eid][a]['bahis'] = team;
         thisbets[eid][a]['hdc'] = spc;
         thisbets[eid][a]['date'] = stp;
         thisbets[eid][a]['oran'] = rate;
         thisbets[eid][a]['mbs'] = mbs;
         thisbets[eid][a]['spid'] = spid;
         thisbets[eid][a]['canli'] = live;
         thisbets[eid][a]['trch'] = (Bahis.idcol[idc] ? Bahis.idcol[idc].ktercih:ktercih);
         thisbets[eid][a]['dyn'] = idc;
         $(b).addClass("selected");
         app.D && go("editor", "none");
         app.Wa = l;
         eBetFeatures && "1" == eBetFeatures.mobileBetAnimations && window.setTimeout(function() {
            $(b).hasClass("selected") ? animateOddButton(b) : animateBetCountIcon()
         }, 10);
	 }
	 ticketupdate();
	 SetCookie();
        app.Y("editor");
        hideAjax()
    };

    window.SetCookie= function() {
       $.cookie("coupon", JSON.stringify(thisbets), {expires: 1, path: "/"});
       $.cookie("countcoupon", tickbetnum, {expires: 1, path: "/"});
    };


    window.toggleTicketNotification = function(a) {
        go({
            toggleTicketNotification: a
        }, "none");
        app.hb()
    };



    function N(a) {
        return a ? a.replace(/[&\/#,+()$~%'":*?<>{}]/g, "") : ""
    }
    window.search = function(a, b) {
        if(a = $.trim(a)) eBetFeatures && "1" == eBetFeatures.searchMobileSanitize && (a = N(a)), a = encodeURIComponent(a.replace(/[%\.\:\/ ]+/g, " ")), go("sports/search/" + (b == j ? "" : b + "/") + a)
    };
    window.hideSuggestions = function() {
        app.b("input.searchfield").val("");
        app.b("#searchDeleteIcon").addClass("hidden");
        app.b("#suggestions").addClass("hidden");
        window.setTimeout(function() {
            toggleQuickFilter()
        }, 50)
    };
    window.updateSearch = function() {
        var a = app.b("input.searchfield").val();
        eBetFeatures && "1" == eBetFeatures.searchMobileSanitize && (a = encodeURIComponent(N(a)));
        $.ajax({
            url: "ajax/searchSuggestions?searchText=" + a,
            success: function(a) {
                a = a[a.length - 1];
                if(10 == a.length) {
                    var c = 1 == a[7] || 1 == a[8];
                    setVisibilityStatus(app.b("#suggestions"), !c);
                    setVisibilityStatus(app.b("#searchDeleteIcon"), !c);
                    c = app.b("#suggestions .bartitle");
                    2 == c.length && (setVisibilityStatus($(c[0]), 0 == a[7]), setVisibilityStatus($(c[1]), 0 == a[8]));
                    for(c =
                        1; c <= app.b("#suggestions .barbottom").length; c++) setSuggestionRow(c - 1, a[c])
                }
            }
        })
    };

    window.updateSearchlive = function() {
        var a = $(".filterbarlive input.searchfield").val();
         if (a.length < 3) {
             return;
         }
         var c = 0;
         var bulundu = false;
         var patt1 = new RegExp(a, "ig");
         $html = [];
	 if(Livebets)
	 {
         for (var eid in Livebets) {
         if (Livebets[eid].status == 1 && (Livebets[eid].hteam.match(patt1) || Livebets[eid].ateam.match(patt1) || Livebets[eid].country.match(patt1))) {
	 $html.push('<div class="barbottom" onclick="go(\'sports/event/livedetail/'+eid+'/0\'); app.fromEventId = window.scrollY > 0 ? '+eid+' : null;">');
	 $html.push('<div class="text">'+Livebets[eid].hteam+'-'+Livebets[eid].ateam+'</div>');
	 $html.push('</div>');
	 c++;
	 }
	 }
	 }
	 if(c>0)
	 {
         $html.push('<div class="barbottomright" onclick="hideSuggestionslive()"><input type="button" class="button" value="Kapat" onclick="hideSuggestionslive()"></div>');
	 $(".livesuggestions").empty().html($html.join('')).show();
	 }
    };
    window.setVisibilityStatus = function(a, b) {
        b ? a.addClass("hidden") : a.removeClass("hidden")
    };
    window.setSuggestionRow = function(a, b) {
        var c = $(app.b("#suggestions .barbottom")[a]);
        "" == b ? c.addClass("hidden") : c.removeClass("hidden");
	var h = b.split("|");
        c.find(".text").text(h[2]);
        c.attr("onclick", "go('sports/event/getodds/"+h[0]+"/"+h[1]+"'); app.fromEventId = window.scrollY > 0 ? "+h[1]+" : null;")
    };
    window.png = function(a, b) {
        var c = b.lastIndexOf("/");
        0 != c && (b = b.substring(c + 1));
        return htmlTag("div", {
            "class": a + " " + b
        })
    };
    window.redCards = function(a, b) {
        for(var c = "", d = 1; d <= b; d++) c += htmlTag("img", {
            "class": a && b == d ? "blink redCards" : "redCards",
            src: "img/scorebox/red-card.png",
            width: "20",
            height: "20"
        });
        return c
    };
    window.submitForm = function(a, b) {
        var c = window.event && app.O(window.event.target),
            d = "none",
            f = l;
        "string" == typeof b && (d = b);
        "boolean" == typeof b && (f = b);
        var g = {},
            c = app.i(c);
        0 <= c.indexOf("?") && (g = app.wc(c), c = c.substring(0, c.indexOf("?")));
        a.onsubmit = u(o);
        for(var h = 0; h < a.elements.length; h++) {
            var k = a.elements[h];
            if("INPUT" == k.tagName && "radio" == k.type) {
                if(k.checked) g[k.name] = k.value
            } else if("INPUT" == k.tagName && "checkbox" == k.type) g[k.name] = k.checked ? 1 : 0;
            else if("_url" == k.name) c = k.value;
            else if("" != k.name) g[k.name] =
                k.value
        }
        if(g.submitted != j && "false" == g.storeOnly) app.q(), g.submitted = "true";
        "personalDetails" == c && app.q();
        if("function" == typeof b && !b(a, c, g)) return o;
        "payout/select" == c && "BANK" == g.type && (window.PAYOUT_BANK_PARAMS = g);
        "login/register" == c && "" != g["birthday.day"] && "" == g["birthday.month"] && (g["birthday.month"] = -1);
        f ? go(c, g, d, o) : $.ajax({
            url: "ajax/" + c,
            dataType: "json",
            contentType: "application/x-www-form-urlencoded",
            data: g,
            type: "POST",
            success: t()
        });
        app.w = m;
        return o
    };
    window.editorReact = function(a) {
        "REMOVE_NON_OPEN" == a ? go({
            reaction: a
        }, "skip") : (app.q(), go({
            reaction: a
        }, "skip", o))
    };
    window.toggleFavorite = function(a) {
        window.notification.Ha();
        app.q();
        go({
            toggleId: a
        })
    };
    window.toggleFavorite2 = function(b) {
	   if(!Livemyfavs[b])
	   {
	   Livemyfavs[b]=true;
	   }else{
	   delete Livemyfavs[b];
	   }
	   y("livefav",JSON.stringify(Livemyfavs));
	   LiveRender();
    };
    window.toggleBetMatrix = function(a, b) {
        var c = app.ba.indexOf(b); - 1 < c ? app.ba.splice(c, 1) : app.ba.push(b);
        go();
        stopEventPropagation(a)
    };
    window.stopEventPropagation = function(a) {
        (a || window.event).stopPropagation()
    };

    function O(a, b) {
        go("ticket/list", {
            MODE: "buyback",
            buyBackValue: b,
            ticketId: a,
            skipDelay: window.skipDelayForCashOutTicketId === a,
            showAjax: l
        }, "skip", o);
        window.skipDelayForCashOutTicketId = a
    }
    window.buybackTicket = function(a, b, c) {
        showDialog(i18n("ticket.doYouWantToBuybackTicket", c), {
            yes: i18n("common.Yes"),
            no: i18n("common.No")
        }, function(c) {
            "yes" == c && O(a, b)
        }, "dialogBuyBack")
    };
    window.showBuyBackSkipDelayDialog = function(a, b, c) {
        window.setTimeout(function() {
            showDialog(a, {
                yes: i18n("common.Yes"),
                no: i18n("common.No")
            }, function(a) {
                "yes" == a && O(b, c)
            }, "dialogBuyBackSkipDelay")
        }, 700)
    };
    window.cashoutTicket = function(a) {
        var b = {};
        b.ticketId = a;
        $.ajax({
            url: "ajax/ticket/updatedBuyBack",
            dataType: "json",
            contentType: "application/x-www-form-urlencoded",
            data: b,
            type: "POST",
            success: function(c) {
                0 < c.value ? showDialog(i18n("ticket.doYouWantToCashoutTicket", c.valueWithCurrency), {
                    yes: i18n("common.Yes"),
                    no: i18n("common.No")
                }, function(b) {
                    "yes" == b && O(a, c.value)
                }, "dialogCashout") : showDialog(i18n("ticket.buyback.currentlyNotPossible"), m, m, "dialogBuyBackNotPossible")
            }
        })
    };
    window.animateCashoutFilling = function(a, b) {
        if(!(-0.001 < b && 0.001 > b)) {
            window.Ta = window.Ta || {};
            var c = window.Ta["" + a] || 0;
            if(!(0 > c)) {
                var d = document.querySelector(app.g("ticket/list") + " #cashoutButton" + a + " .filling");
                d.style.transitionDuration = "0s";
                d.style.width = 100 * c + "%";
                window.Ta["" + a] = b;
                setTimeout(function() {
                    d.style.transitionDuration = "2s";
                    d.style.width = 0 > b ? 0 : 100 * b + "%"
                }, 200)
            }
        }
    };
    window.animateCashoutButton = function(a) {
        var a = $(app.g("ticket/list") + " #cashoutButton" + a).parent(),
            b = a.offset(),
            c = $(".footer .account"),
            d = c.offset().left - b.left - a.width() / 4,
            b = c.offset().top - b.top;
        animateElement(a, d, b, 0.4, 0.4, l)
    };
    window.animateCashoutButtonDrain = function(a) {
        animateCashoutFilling(a, -1);
        setTimeout(function() {
            animateCashoutButton(a);
            app.M = l
        }, 2E3)
    };
    window.cancelTicket = function(a) {
        showDialog(i18n("ticketlistbean.CancelConfirm"), {
            yes: i18n("common.Yes"),
            no: i18n("common.No")
        }, function(b) {
            "yes" == b && go("ticket/list", {
                MODE: "cancel",
                ticketId: a
            })
        }, "dialogCancelTicket")
    };
    window.reuseTicket = function(a, b) {
        b ? go("editor", {
            reuseTicketId: a,
            reuseSharedTicket: l
        }) : go("editor", {
            reuseTicketId: a
        })
    };
    window.Ja = ["0"];
    window.toggleTicketDetail = function(a,c) {
	$(".appcontent #cpdiv_"+a).toggleClass('hidden');
	if(c)
	{
	var jsonverileri = JSON.parse(c);
	var canlianlikgonder = 0;
	if(jsonverileri)
	{
	for(var i = 0, l = jsonverileri.length; i < l; i++) {
	canlianlikgonder=1;
	}
	if(canlianlikgonder==1)
	{
	// gethowticket(a,jsonverileri);
	}
	}
	}
    };
     window.gethowticket = function(a,c) {
	 $.ajax({
            url: "ajax/matchonline",
            dataType: "json",
            contentType: "application/x-www-form-urlencoded",
            data: {
                couponId: a,
                events: c
            },
            type: "POST",
            success: function(bc) {
	    if(bc)
	    {
	    $.each(bc, function(m, p) {
	    if(m!="kid"){
	    if(p.TM)
	    {
	    $(".appcontent #evdate_"+m).html('<i>'+p.TM+'\'</i>');
	    }
	    $(".appcontent #scr_"+m).html('<i class="blinks" style="color:#1cbd00;">'+p.MS+'\'</i>');
	    if(p.D==1)
	    {
	    $("#kid_"+a+"_scr_"+m).html("<i class='blinks'><img style='margin-top: -4px;' src='img/win.gif'></i>");
	    }else if(p.D==2)
	    {
	    $("#kid_"+a+"_scr_"+m).html("<i class='blinks'><img style='margin-top: -4px;' src='img/lost.gif'></i>");
	    }else{
	    $("#kid_"+a+"_scr_"+m).html("<i class=''><img style='margin-top: -2px;' src='img/cpnwaiting.png'></i>");
	    }
	    }
	    });
	    }
            }
        });
	var divacikmi=$("#cpdiv_"+a).is(":visible");
	if(divacikmi)
	{
	setTimeout(function(){ gethowticket(a,c); }, 15000);
	}
    };
    window.loginCheck = function() {
        var a = w("username"),
            b = w("password");
        a != m && b != m && window.setTimeout(function() {
            go("login", {
                username: a,
                password: b
            }, "skip")
        }, 0);
        return ""
    };
    window.showPassword = function(a) {
        a = $(a).prev("input");
        "password" == a.prop("type") ? a.prop("type", "text") : a.prop("type", "password")
    };
    window.checkInput = function(a) {
        window.setTimeout(function() {
            var b = $(a).val();
            $(a).siblings(".clear").first().toggleClass("hidden", "" == b || !$(a).is(":focus"));
            $(a).toggleClass("active", !("" == b || !$(a).is(":focus")))
        }, 200)
    };
    window.clearInput = function(a) {
        $(a).siblings("input").first().val("").removeClass("active");
        $(a).addClass("hidden")
    };
    window.initialCheckLogin = function() {
        window.setTimeout(function() {
            ("cover" == $('input[name="username"]').css("background-size") && "cover" == $('input[type="password"]').css("background-size") || navigator.userAgent.match("CriOS")) && $("#loginButton").addClass("active")
        }, 1200)
    };
    window.checkLogin = function() {
        var a = $('.top input[name="username"]').val(),
            b = $('.top input[type="password"]').val();
        $("#loginButton").toggleClass("active", "" != a && "" != b)
    };
    window.loginCallback = function(a, b, c) {
        1 != c.save ? (z("username"), z("password")) : (y("username", c.username), y("password", c.password));
        return l
    };
    window.removeAutologinData = function() {
        z("username");
        z("password")
    };
    window.changeAutologinPassword = function(a, b) {
        y("username", a);
        y("password", b)
    };
    window.selectDate = function(a, b, c, d, f, g) {
        f == j && (f = (new Date).getFullYear());
        g == j && (g = (new Date).getFullYear() - 3);
        b = "" + selectBox(a + ".day", b, 1, 31, j, o, "select selectdate");
        b = b + "." + selectBox(a + ".month", c, 1, 12, j, o, "select selectdate");
        return b = b + "." + selectBox(a + ".year", d, f, g, j, o, "select selectdate")
    };
    window.selectExpirationDate = function(a, b, c, d) {
        var f = (new Date).getFullYear(),
            g = f + 10,
            a = "" + selectBox(a, c, 1, 12, j, o, "select selectdate");
        return a = a + " / " + selectBox(b, d, f, g, j, o, "select selectdate")
    };
    window.selectDateNewReg = function(a, b, c, d, f, g, h) {
        f == j && (f = (new Date).getFullYear());
        g == j && (g = (new Date).getFullYear() - 3);
        b = '<div class="col-xs-4"><div class="wrap">' + selectBox(a + ".day", b, 1, 31, j, o, "select selectdate customSelect", l, o, a + "Day", h);
        b = b + '</div></div><div class="col-xs-4"><div class="wrap">' + selectBox(a + ".month", c, 1, 12, j, o, "select selectdate customSelect", l, o, a + "Month", h);
        b = b + '</div></div><div class="col-xs-4"><div class="wrap">' + selectBox(a + ".year", d, f, g, j, o, "select selectdate customSelect",
            l, o, a + "Year", h);
        return b + "</div></div>"
    };
    window.selectBox = function(a, b, c, d, f, g, h, k, q, p, s) {
        h == j && (h = "select");
        h = '<select name="' + a + '" class="' + h + '"';
        f != j && 0 < f.length && (h += ' onchange="' + f + '"', q || window.setTimeout(f, 0));
        s && (h += " disabled");
        p && (h += ' data-qa="' + p + '" id="' + p + '"');
        h += ">";
        g && (h += '<option value="">' + i18n("edituser.PleaseSelect") + "</option>");
        if("number" == typeof c)
            if(d < c)
                for(f = c; f >= d; f--) h += '<option value="' + f + '"', b == f && (h += ' selected="selected"'), h += ">" + f + "</option>";
            else
                for(f = c; f <= d; f++) h += '<option value="' + f + '"', b == f && (h += ' selected="selected"'),
                    h += ">" + f + "</option>";
        else if(c instanceof Array)
            for(f = 0; f < c.length; f++) {
                var n = c[f];
                n instanceof Object ? (d = Object.keys(n)[0], h += '<option value="' + d + '"', b == n && (h += ' selected="selected"'), h += ">" + n[d] + "</option>") : (h += '<option value="' + n + '"', b == n && (h += ' selected="selected"'), h += ">" + n + "</option>")
            } else
                for(n in c) h += '<option value="' + n + '"', b == n && (h += ' selected="selected"'), h += ">" + c[n] + "</option>";
        h += "</select>";
        k && (h += "<script>$('select[name=\"" + a + "\"]').customSelect()<\/script>");
        return h
    };
    window.initOddEven = function() {
        window.Aa = 0
    };
    window.addScriptTag = function(a, b) {
        if(!(self.D && "1" == eBetFeatures.retailNoTracking)) {
            var c = document.getElementById("trackingPixel" + b);
            c && document.head.removeChild(c);
            c = document.createElement("script");
            c.setAttribute("src", a);
            c.setAttribute("type", "text/javascript");
            c.setAttribute("id", "trackingPixel" + b);
            document.head.appendChild(c)
        }
    };
    window.toggleOddEven = function() {
        window.Aa++;
        return getOddEven()
    };
    window.getOddEven = function() {
        return 1 == window.Aa % 2 ? "odd" : "even"
    };
    window.toggleFirst = function() {
        window.Aa++
    };
    window.getFirst = function(a, b) {
        return 0 == window.Aa ? a : b
    };
    window.img = function(a, b, c) {
        a = {
            src: "img/" + a,
            alt: ""
        };
        b && (a.width = b);
        c && (a.height = c);
        return htmlTag("img", a)
    };
    window.center_icon = function(a, b) {
        return '<div style="width:20px;margin-left:50%;"><div class="' + a + '" style="margin-left:-' + b + 'px;"></div></div>'
    };
    window.editorRowAction = function(a, b) {
        go("editor", b, "slideup");
        app.a && setTimeout(function() {
            go(app.page.f)
        }, 100);
        a = a || window.event;
        a.stopPropagation()
    };
    window.deletePaymentData = function(a) {
        $("#dr_" + a).attr("value", l);
        $("#pr_" + a).attr("value", o)
    };
    window.submitPaymentForm = function(a, b) {
        var c = b != j ? "_" + b : "";
        "true" == $("#dr" + c).attr("value") ? showDialog(i18n("payment.DeleteConfirm", m), {
            yes: i18n("common.Yes"),
            no: i18n("common.No")
        }, function(b) {
            "no" == b ? ($("#dr" + c).attr("value", o), $("#pr" + c).attr("value", l), $("#del" + c).removeClass("selected")) : submitForm(a)
        }, "dialogPaymentDelete") : submitForm(a)
    };
    window.paymentSelectType = function(a, b, c, d, f) {
        paymentReSelectType(a, b, c, d, f, 1)
    };
    window.paymentReSelectType = function(a, b, c, d, f, g) {
        1 == g && ($("input[name ='paymentType']").attr("value", a), $("input[name ='paymentUrl']").attr("value", c), c = $(".paymentTypeConditions.payment" + a).html(), "" != c ? ($(".paymentConditions").html(c), $(".paymentConditionsFor").html(b), $(".paymentConditionsBlock").css("display", "")) : $(".paymentConditionsBlock").css("display", "none"), a = $(".paymentTypeButton.payment" + a), paymentToggleButton(a, ".paymentTypeButton"), 1 == f ? ($(".payinAmount").css("display", "none"), $(".payoutAmount").css("display",
            "none")) : ($(".payinAmount").css("display", "table"), $(".payoutAmount").css("display", "table")))
    };
    window.payinSelectAmount = function(a) {
        $(app.g(app.a ? app.page.d : app.page.f) + " input[name ='paymentAmount']").attr("value", a);
        $(".showAmountDisplay").html(formatMoney(a));
        a = $(".payinAmountButton.payin" + a);
        paymentToggleButton(a, ".payinAmountButton");
        $(".paymentTypeMin")
    };
    window.buildPaysafePin = function() {
        for(var a = "", b, c = 1; 5 > c; c++) b = $("input[name ='paysafePin" + c + "']"), a += b.attr("value");
        $("input[name ='securityCode']").attr("value", a)
    };
    window.paysafePinField = function(a) {
        var b = $("input[name ='paysafePin" + a + "']").attr("value").length;
        4 == b && 4 > a && $("input[name ='paysafePin" + (a + 1) + "']").focus();
        0 == b && 1 < a && $("input[name ='paysafePin" + (a - 1) + "']").focus()
    };
    window.payinSelectRedeemBonus = function(a, b) {
        var c = $("input[name ='redeemBonus" + a + "']"),
            d = "checked" === c.attr("checked");
        $("input[name *='redeemBonus']").removeAttr("checked");
        d && c.attr("checked", "checked");
        $("input[name ='payinRedeemBonus']").attr("value", d);
        $("input[name ='payinRedeemBonusType']").attr("value", d ? a : "");
        $("input[name ='bonusActionId']").attr("value", b)
    };
    window.payinSelectSaveData = function(a) {
        var b = $("#savePaymentData");
        $("#" + a).attr("value", "checked" == b.attr("checked") ? l : o)
    };
    window.paymentToggleButton = function(a, b) {
        $(b).removeClass("selected");
        $(a).addClass("selected")
    };
    window.paymentRequest = function() {
        var a = $("input[name ='paymentUrl']").attr("value"),
            b = $("input[name ='paymentType']").attr("value"),
            c = app.a ? app.page.d : app.page.f,
            d = $(app.g(c) + " input[name ='paymentAmount']").attr("value");
        window.amount = d;
        go(c, {
            type: b,
            action: "selectType",
            amountDisplay: d,
            url: a
        })
    };
    window.resendEmailConfirm = function() {
        $.ajax({
            url: "ajax/email/resendConfirm",
            contentType: "application/x-www-form-urlencoded",
            type: "POST"
        })
    };
    window.payinExternalGo = function(a, b, c, d, f) {
        if(a) {
            a = f !== j && f.target !== j ? 'target="' + f.target + '" ' : "";
            b = d ? $('<form method="post" ' + a + 'action="' + b + '" accept-charset="UTF-8"></form>') : $('<form method="post" ' + a + 'action="' + b + '"></form>');
            for(key in c) b.append('<input type="hidden" name="' + key + '" value="' + c[key] + '"></input>');
            $("body").append(b);
            b.submit()
        } else {
            d = -1 === b.indexOf("?") ? "?" : "&";
            a = "";
            f = l;
            for(key in c) f ? f = o : a += "&", a += key + "=" + c[key];
            c = b + ("" !== a ? d + a : "");
            isAndroidNativeApp() ? window.open(c, "_self",
                "location=no, toolbar=no") : window.location.href = c
        }
    };
    window.payinBicSelectBox = function(a, b) {
        var c = '<select name="bic" class="select">',
            d;
        for(d in a) c += '<option value="' + d + '"', b == d && (c += ' selected="selected"'), c += ">" + a[d] + "</option>";
        return c + "</select>"
    };
    window.toggleIbanCalculatorAction = function() {
        var a = app.b("#ibanCalculator", app.page.d),
            b = app.b("#ibanCalculatorTitle", app.page.d);
        a.hasClass("hidden") ? (a.removeClass("hidden"), b.removeClass("arrow").addClass("arrowdown"), document.getElementById("payoutSubmit").setAttribute("type", "button")) : (a.addClass("hidden"), b.removeClass("arrowdown").addClass("arrow"), document.getElementById("payoutSubmit").setAttribute("type", "submit"))
    };
    window.ibanCountryChanged = function(a, b) {
        var c = $("select[name=ibanCountries]").val();
        "undefined" != typeof a && a != c && ($("input[name='ibanCountry']").attr("value", c), b && go({
            ibanCountry: c
        }))
    };
    window.ibanCountriesSelectBox = function(a, b, c) {
        var c = '<select name="ibanCountries" class="select" onchange="ibanCountryChanged(\'' + b + "'," + c + ');" >',
            d;
        for(d in a) c += '<option value="' + d + '"', b == d && (c += ' selected="selected"'), c += ">" + a[d] + "</option>";
        return c + "</select>"
    };
    window.ibanForm = function(a) {
        $("input[name='paymentRequest']").attr("value", "false");
        $("input[name='ibanCalculatorOpen']").attr("value", "true");
        "undefined" != typeof a && submitForm(a.form)
    };
    window.bicCandidateSelectBox = function(a, b) {
        var c = '<select name="selectedBic" class="select">',
            d;
        for(d in a) c += '<option value="' + d + '"', b == d && (c += ' selected="selected"'), c += ">" + a[d] + "</option>";
        return c + "</select>"
    };
    window.paymentFooter = function(a) {
        var b = "<ul>",
            c;
        for(c in a) b += "<li>", b += '<span class="' + a[c] + '"></span>', b += "</li>";
        return b + "</ul>"
    };
    window.payinBanks = function(a, b) {
        var c = "",
            d;
        for(d in a) var f = a[d],
            c = c + (payinBanksOpen(i18n("payment.payin.bank.BankAccount")) + (b ? payinBanksMiddle(i18n("payment.payin.bank.Currency"), f.currency, 'depositBTCurrency"') : "") + payinBanksMiddle(i18n("payment.payout.bank.AccountHolder"), f.depositor, 'depositBTAccountHolder"') + payinBanksMiddle(i18n("payment.payin.bank.Bank"), f.bank, "depositBTBank") + payinBanksMiddle("BIC/SWIFT", f.bic, "depositBTBic") + payinBanksMiddle(i18n("payment.payin.bank.IBAN"), f.iban, "depositBTIban") +
                payinBanksClose(i18n("payment.Subject"), f.subject, "depositBTPaymentSubject"));
        return c
    };
    window.payinBanksOpen = function(a) {
        return '<div class="bartitle"><div class="text">' + a + "</div></div>"
    };
    window.payinBanksMiddle = function(a, b, c) {
        return '<div class="barmiddle"><div class="text">' + a + '</div><div class="value pr_7" data-qa="' + c + '">' + b + "</div></div>"
    };
    window.payinBanksClose = function(a, b, c) {
        return '<div class="barbottom"><div class="text">' + a + '</div><div class="value pr_7" data-qa="' + c + '">' + b + "</div></div>"
    };
    window.addBitcoinValidationScript = u('<script type="text/javascript" src="js/wallet-address-validator.min.js">/**/<\/script>');
    window.validateBitcoinAddress = function() {
        var a = jQuery('form[name="payoutCubits"] input[name="no"]'),
            b = WAValidator.validate(a.val(), "bitcoin");
        b ? jQuery("#errorAddress").hide() : (jQuery("#errorAddress").show(), a.focus());
        return b
    };
    window.payoutCurrencies = function(a, b) {
        return selectBox("currency", a, JSON.parse(b))
    };
    window.payoutSupportedAmounts = function(a) {
        a = JSON.parse(a);
        return selectBox("accountNo", j, a, j, j, l)
    };
    var P = "";
    window.paykasaVoucherSelected = function(a) {
        a == j || "" == a ? (jQuery("#selectedPaykasa").val(""), jQuery("#paykasaVoucher").addClass("hidden"), jQuery("#no").val("")) : (jQuery("#selectedPaykasa").val(a), jQuery("#paykasaVoucher").removeClass("hidden"));
        a != P && (P = a, submitForm(document.getElementById("paykasaForm")))
    };
    window.payinSupportedAmounts = function(a, b) {
        var c = JSON.parse(a);
        jQuery("#paymentRequest").val("false");
        var d;
        d = '<select name="selectedPaykasa" class="select" onchange="paykasaVoucherSelected(this.value);">' + ('<option value="">' + i18n("edituser.PleaseSelect") + "</option>");
        for(var f in c) d += '<option value="' + f + '"', b == f && (d += ' selected="selected"'), d += ">" + c[f] + "</option>";
        if(b == j || "" == b) P = "";
        return d + "</select>"
    };
    window.formatMoney = function(a) {
        var b = app.global,
            c = Math.floor(1 * a) + "",
            a = Math.round(100 * a) % 100,
            a = Math.abs(a);
        for(1 == (a + "").length && (a = "0" + a);;) {
            var d = c,
                c = c.replace(/(\d+)(\d\d\d)/, "$1" + b.currencyGrouping + "$2");
            if(c == d) break
        }
        return b.currencyPrefix + c + b.currencyDecimal + a + " " + b.currencyPostfix
    };
    window.generateAccountTypeForProvider = function(a, b) {
        var c = JSON.parse(b);
        return selectBox(a, j, c, j, j, o)
    };
    window.generateElectronicBankSelection = function(a) {
        a = JSON.parse(a);
        return selectBox("bankName", j, a, j, j, o)
    };
    window.generateBrazilianStatesSelection = function(a, b) {
        var c = JSON.parse(a);
        return selectBox("customerState", b, c, j, j, o)
    };
    var Q = 0;
    window.initTopEventSlider = function() {
        eBetFeatures && 0 < parseInt(eBetFeatures.magnoliaSlideshowMobile) && (0 >= jQuery(".slideshowData .data").length ? jQuery(".slideshowData").remove() : jQuery(".slideshowData .data").unwrap());
        addSwipeNav();
        for(var a = 0; a <= app.b().find(".swipe-wrap .data").index(); a++) $(app.b().find(".swipe-wrap .data").get(a)).attr("data-index", a);
        a = app.b().find("#slider");
        if(0 != a.length && !a.hasClass("init")) a.addClass("init"), window.changeSlide = function() {
            var a = app.b().find(".data[style*='translate(0px, 0px)']").index();
            app.b().find(".swipeNav div").removeClass("currentView");
            $(app.b().find(".swipeNav div").get(a)).addClass("currentView")
        }, a = "-1" != app.L("selectedSliderEvent"), Swipe(app.b().find("#slider"), {
            startSlide: a ? app.L("selectedSliderEvent") : "0",
            auto: a ? 0 : "5000",
            callback: changeSlide
        }), changeSlide()
    };
    window.addSwipeNav = function() {
        var a = jQuery(app.g() + " .swipeNav");
        if(a) {
            var b = parseInt(a.attr("navamount"), 10),
                c = jQuery(a + ".data[style*='translate(0px, 0px)']").index();
            a.empty();
            for(var d = 0; d < b; d++) c == d ? a.append("<div class='currentView'></div>") : a.append("<div></div>")
        }
    };
    window.initEditorStake = function() {
        app.Y();
        R(0);
        Q = 0
    };

    function R(a) {
        a += "";
        "" == a && (a = "0");
        $(".numpad-amount").html(formatMoney(a));
        window.amount = a
    }
    window.showLiveOddsChangesLayer = function() {
        showDialog(i18n("ticket.editor.acceptOddsChangesConfirmation"), {
            yes: i18n("common.Yes"),
            no: i18n("common.No")
        }, function(a) {
            "yes" == a ? go("editor", {
                accepted: "true",
                showErrors: "false"
            }) : (jQuery("#reducedQuotesCheckBox_layer").prop("checked", o), go("editor", {
                accepted: "false",
                showErrors: "false"
            }))
        }, "dialogShowLiveOddsChanges")
    };
    window.acceptLiveOddsChanges = function(a) {
        a ? showLiveOddsChangesLayer() : go("editor", {
            accepted: "false",
            showErrors: "false"
        })
    };
    window.editorStakeButtonPressed = function(a) {
        Q = "" + Q;
        if(0 <= a && 9 >= a) /\.\d\d/.test(Q) || (Q += a + "");
        else switch (a) {
            case ".":
                /\./.test(Q) || (Q += ".");
                break;
            case "K":
                Q = Q.substring(0, Q.length - (/\.$/.test(Q) ? 2 : 1)), "" == Q && (Q = "0")
        }
        R(1 * Q)
    };
    window.clearEditor = function() {
        showDialog(i18n("ticket.doYouWantTodeleteAllBetsFromBetSlip"), {
            yes: i18n("common.Yes"),
            no: i18n("common.No")
        }, function(a) {
            "yes" == a && DeleteBetAll()
        }, "dialogClearEditor")
    };
    window.hideDialog = function() {
        $("#dialog").addClass("hidden");
        app.z = o
    };
    window.changeSalutation = function(a) {
        var b = document.getElementById("salutation");
        if(a != b.value) b.value = a, $(b).parent().find(".salutationBtn").toggleClass("selected")
    };
    window.showAsOverlay = function(a, b) {
        if(b) $("#overlayContent").empty(), window.overlayElements = window.overlayElements || [], window.overlayElements.push(a), document.getElementById("overlay").onclick = hideOverlay, document.getElementById("overlayContent").onclick = function(a) {
            a.stopPropagation()
        }
    };
    window.showOverlayElements = function(a) {
        if(window.overlayElements) {
            for(var b = 0; b < window.overlayElements.length; b++) $(window.overlayElements[b]).appendTo("#overlayContent");
            $("#overlay").removeClass("hidden");
            window.overlayElements = j;
            app.cb = a
        } else app.cb == a && $("#overlay").addClass("hidden")
    };
    window.hideOverlay = function() {
        $("#overlay").addClass("hidden");
        window.overlayElements = j;
        go(j, "skip")
    };
    window.S = [];
    window.Fd = function() {
        if(0 < window.S.length) {
            if(jQuery("#dialog").hasClass("hidden") && (0 != app.page.N.indexOf("layer") || app.page.N == app.page.f)) {
                for(var a, b = 0; 5 >= b && !(a = window.S.findIndex(function(a) {
                        return -1 < a[0].indexOf("hasPrio" + b)
                    }), -1 < a); b++);
                a = -1 < a ? window.S.splice(a, 1)[0] : window.S.pop();
                da.apply(m, a)
            }
        } else window.clearInterval(window.lb), window.lb = o
    };
    window.showDialog = function(a, b, c, d) {
        console.log("showDialog called with msg " + a.substr(0, 40) + "...");
        0 == window.S.filter(function(c) {
            return c[0] == a
        }).length && window.S.push(arguments);
        if(!window.lb) window.lb = window.setInterval(window.Fd, 1E3)
    };

    function da(a, b, c, d) {
        function f(a, c, b, d) {
            a.click(function() {
                app.z = o;
                if(!g && (c(b), !d)) {
                    g = l;
                    var a = $("#dialog");
                    a.attr("data-qa", m);
                    a.addClass("fadeout");
                    window.dialogFadeOutTimer = window.setTimeout(function() {
                        a.addClass("hidden");
                        window.setTimeout(function() {
                            a.removeClass("fadeout")
                        }, 100)
                    }, 600)
                }
            })
        }
        stopDialogFadeOut();
        "string" == typeof b && (b = {
            dialogButton: b
        });
        var g = o;
        $("#dialog .msg").html(a);
        d && $("#dialog").attr("data-qa", d);
        a = $("#dialog .options");
        a.empty();
        b == m && (b = {
            ok: "OK"
        });
        c == m && (c = t());
        for(var h in b) {
            d =
                $("<button/>");
            d.attr("data-qa", h);
            d.attr("class", h);
            d.addClass("w100 simple");
            d.click(function() {
                $(this).addClass("selected")
            });
            b[h].id && d.attr("id", b[h].id);
            if(b[h].F) {
                var k = $("<img/>");
                k.attr("src", b[h].F);
                k.appendTo(d)
            }
            k = $("<div/>");
            k.text(b[h].text || b[h]);
            k.appendTo(d);
            k.addClass("text");
            d.appendTo(a);
            f(d, c, h, b[h].Id)
        }
        $("#dialog").removeClass("hidden");
        $("#dialog .window").addClass("fadein").removeClass("hidden");
        app.z = l
    }
    window.stopDialogFadeOut = function() {
        clearInterval(window.dialogFadeOutTimer);
        $("#dialog").removeClass("fadeout");
        $("#dialog").removeClass("hidden")
    };
    window.showFancyDialog = function(a, b, c, d, f) {
        showDialog("<div class='title'>" + a + "</div><div class='sub'>" + b + "</div>" + c, d, f)
    };
    window.setFooterBalanceVisible = function(a) {
        y("hideFooterBalance", a ? 0 : 1)
    };
    window.isFooterBalanceVisible = function() {
        return 1 != w("hideFooterBalance")
    };
    window.toggleFooterBalanceVisible = function() {
        var a = isFooterBalanceVisible();
        setFooterBalanceVisible(!a);
        app.hb()
    };
    window.playSounds = function(a, b) {
        if("native" == app.j) {
            var c = app.fb[a],
                d = b == m ? 0 : b.length;
            c == j ? app.fb[a] = d : c != d && (app.fb[a]++, c = app.ne[b.substring(b.length - 1)], c != j && isSoundEnabled() == l && nativeCall("playSound", [c]))
        }
    };
    window.setSoundEnabled = function(a) {
        y("disableSound", a ? 0 : 1)
    };
    window.isSoundEnabled = function() {
        return 1 != w("disableSound")
    };
    window.toggleSoundEnabled = function() {
        var a = isSoundEnabled();
        setSoundEnabled(!a);
        app.hb()
    };
    window.contactCategoryChanged = function(a) {
        var b = $("select[name=category]").val(),
            c = $('input[name="mail"]').val();
        zendeskDefaultCatorIssue();
        b != a && go({
            category: b,
            mail: c
        })
    };
    window.zendeskDefaultCatorIssue = function() {
    


    };
    window.deactivationReasonChanged = function(a) {
        var b = $("select[name=reason]").val();
        b != a && go({
            reason: b
        })
    };
    window.countryChanged = function(a) {
        var b = $("select[name=country]").val(),
            c = $("input[name=street]").val(),
            d = $("input[name=addressAddon]").val(),
            f = $("input[name=city]").val(),
            g = $("input[name=zipCode]").val();
        b != a && go({
            country: b,
            street: c,
            addressAddon: d,
            city: f,
            zipCode: g,
            countryChange: "true"
        })
    };
    window.newCountryChanged = function(a) {
        var b = $("select[name=country]").val();
        b != m && b != a && go({
            country: b
        })
    };
    window.phonePrefixChanged = function(a) {
        var b = $("select[name=phonePrefix]").val();
        b != m && b != a && go({
            phonePrefix: b
        })
    };
    window.zipCodeChanged = function(a) {
        var b = $("input[name=zipCode]").val(),
            c = $("input[name=salutation]").val(),
            d = $("input[name=firstName]").val(),
            f = $("input[name=lastName]").val(),
            g = $("input[name=street]").val(),
            h = $("input[name=city]").val();
        b != m && b != a && go({
            salutation: c,
            firstName: d,
            lastName: f,
            street: g,
            city: h,
            zipCode: b
        })
    };
    window.italianBirthCountryChanged = function(a) {
        var b = $("select[name=birthCountry]").val(),
            c = $("input[name=city]").val();
        b != m && b != a && ("IT" != b && ($("select[name=birthRegion]").attr("enabled", o), $("select[name=birthCity]").attr("enabled", o)), go({
            city: c,
            birthCountry: b
        }))
    };
    window.regionChanged = function(a) {
        var b = $("select[name=region]").val();
        b != m && "" != b && b != a && (app.q(), a = {
            region: b
        }, createOptionsFromForm("#registration :input", "region", a), go(a))
    };
    window.birthRegionChanged = function(a) {
        var b = $("select[name=birthRegion]").val();
        b != m && b != a && go({
            birthRegion: b
        })
    };
    window.registerDocumentTypeChanged = function(a) {
        var b = $("select[name=documentType]").val();
        b != a && (a = {
            documentType: b
        }, createOptionsFromForm("#registration :input", "documentType", a), go(a))
    };
    window.createOptionsFromForm = function(a, b, c) {
        $(a).filter(function() {
            return "hidden" != $(this).attr("type") && $(this).attr("name") != b
        }).each(function() {
            c[$(this).attr("name")] = $(this).attr("value")
        })
    };
    window.canTakePicture = o;
    var U = [],
        V = o;
    window.documentTypeChanged = function(a) {
        var b = $("select[name=referenceHeader]").val();
        jQuery('[name="referenceHeader"] option:first-child').attr("disabled", l);
        var c = "0" == b;
        if(app.D) {
            var d = !!$('[name="userDocument"]').val();
            $(".fileUploadBtn.scan").toggleClass("mobileButtonDisabled", c && !window.canTakePicture);
            $(".fileUploadBtn.upload").toggleClass("mobileButtonDisabled", c || !d)
        } else checkIfUploadable(), !c && window.canTakePicture && $(".fileUploadBtn.scan").removeClass("mobileButtonDisabled");
        $(".takePicture").toggleClass("mobileButtonDisabled",
            c);
        b != m && "" != b && b != a && go({
            documentType: b
        })
    };
    window.documentUploadChanged = function() {
        V = o;
        var a = $("#uploadForm .textfield").val();
        a && $("#uploadForm .selectedFile").text(a.substring(a.lastIndexOf("\\") + 1));
        checkIfUploadable()
    };
    window.documentUploadingProcess = function(a) {
        V ? window.retail.uploadDocumentScan() : ($(".submit.fileUploadBtn").removeAttr("onclick"), $(".submit.fileUploadBtn").addClass("selected"), $(".submit.fileUploadBtn").text(i18n("common.processing")), document.getElementById(a).submit())
    };
    window.paymentMethodChanged = function(a) {
        var b = $("select[name=type]").val();
        b != m && b != a && go("payin/firstDeposit", {
            type: b
        })
    };
    window.updateLostForm = function() {
        var a = $("select[name='type'] option:selected").attr("value"),
            b = "sms" == a ? i18n("lost.type.sms") : i18n("lost.type.email");
        $("label[for='emailOrPhoneNumber']").text(b);
        document.getElementsByName("emailOrPhoneNumber")[0].type = "sms" == a ? "tel" : "email"
    };
    window.checkIfUploadable = function() {
        var a = "image/jpeg,image/pjpeg,image/png,image/x-png,image/tiff,image/gif,image/bmp".split(","),
            b = $('[name="userDocument"]')[0],
            b = b && b.files && b.files[0],
            a = 0 == $('[name="referenceHeader"] option:selected').index() || !b || 8388608 < b.size || -1 == a.indexOf(b.type);
        $('[name="sysType"] option:first').prop("disabled", l);
        $(".fileUploadBtn").toggleClass("mobileButtonDisabled", !V && a)
    };
    window.footer = function(a, b) {
        if(b == j) {
            if("sports" == a || "login" == a || "ticket" == a || "bonusconditions" == a || "account" == a || "editor" == a || "payin" == a || "payout" == a) return ""
        } else if("account" == b) {
            if("account" != a && "payin" != a && "payout" != a) return ""
        } else if(a != b) return "";
        return " selected"
    };
    window.J = {
        Lb: 0,
        Mb: 0,
        Kc: function() {
            window.J.Fc();
            window.J.Bc()
        },
        Fc: function() {
            var a = $(".appfooter .account .count");
            if(a.length) {
                var b = parseFloat(window.J.Lb) || 0,
                    c = parseFloat(a.html().replace(",", "."));
                window.J.Lb = c;
                var d = 0 === c % 1;
                d && (b = Math.round(b), c = Math.round(c));
                c !== b && a.prop("Counter", b).animate({
                    Counter: c
                }, {
                    duration: 2E3,
                    easing: "swing",
                    step: function(a) {
                        $(this).text(a.toFixed(d ? 0 : 2))
                    }
                })
            }
        },
        Bc: function() {
            var a = $(".appfooter .buyback.count");
            if(a.length) {
                var b = parseInt(window.J.Mb) || 0,
                    c = parseInt(a.html());
                window.J.Mb = c;
                c > b && a.fadeOut(500).fadeIn(500).fadeOut(500).fadeIn(500)
            }
        }
    };
    window.ensureValidInput = function(a, b, c) {
        if(window.event) a = window.event.keyCode;
        else if(a) a = a.which;
        else return l;
        if(47 < a && 58 > a || c && (65 >= a && 90 <= a || 97 >= a && 122 <= a) || a == b) return l;
        for(b = [8, 10, 13, 0]; 0 < b.length;)
            if(a == b.pop()) return l;
        return o
    };
    window.switchEditable = function(a) {
        $("#personalDetails div." + a + ">div").toggleClass("hidden");
        $("#personalDetails div." + a + ">div input").focus();
        $("#personalDetails .submitCancelWrap").removeClass("hidden")
    };
    window.addCrazyEgg = u('<script type="text/javascript">\tsetTimeout(function(){var a=document.createElement("script"); var b=document.getElementsByTagName("script")[0]; a.src="crazy.js?"+Math.floor(new Date().getTime()/3600000); a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);<\/script>');
    window.vsOnLoad = function(a) {
        app.global.vsToken && a.setUserToken(app.global.vsToken)
    };
    window.vsLoginRequired = function(a) {
        console.log("VS login required");
        app.global.vsToken ? (console.log("VS login required SET USER TOKEN: " + app.global.vsToken), a.setUserToken(app.global.vsToken)) : (console.log("VS login required GO LOGIN"), go("login", {
            from: "/virtualsports"
        }, "none"), app.a && (ea(), go("home", {
            from: "/virtualsports"
        }, "none")))
    };
    window.showMentalAssessmentDialog = function() {
        fa()
    };

    function ha() {
        return '            <div class="content mentalassessment" data-before="">                <h1 class="layerSlogan">                    <span>' + i18n("mentalassessmentlayer.header") + '</span>                </h1>                <div class="topicContent">                    <div class="textWrap">                        <h4>' + i18n("mentalassessmentlayer.subtext") + '</h4>                        <div class="question_group">                            <div class="question">' + i18n("mentalassessmentlayer.q1") +
            '</div>                            <div class="answer checkbox"><span></span></div>                        </div>                        <div class="question_group">                            <div class="question">' + i18n("mentalassessmentlayer.q2") + '</div>                            <div class="answer checkbox"><span></span></div>                        </div>                        <div class="question_group">                            <div class="question">' + i18n("mentalassessmentlayer.q3") + '</div>                            <div class="answer checkbox"><span></span></div>                        </div>                    </div>                </div>            </div>        '
    }

    function ia() {
        return '            <button class="w100 simple mentalassessment button submit">                <div class="text">' + i18n("mentalassessmentlayer.okay") + "</div>            </button>        "
    }

    function fa() {
        var a = i18n("mentalassessmentlayer.yes"),
            b = i18n("mentalassessmentlayer.no");
        stopDialogFadeOut();
        $("#dialog .msg").html(ha);
        $("#dialog .options").html(ia);
        $(".mentalassessment .checkbox span").html(b);
        var c = app.P;
        if(c == j || -1 != c.indexOf("layer")) c = app.page.N;
        if(c == j || -1 != c.indexOf("layer")) c = "home";
        $(".content.mentalassessment").data("before", c);
        $(".mentalassessment.button.submit").click(ja);
        $(".mentalassessment .checkbox").click(function() {
            var c = $(this);
            c.toggleClass("checked");
            c.hasClass("checked") ?
                c.find("span").html(a) : c.find("span").html(b);
            ka()
        });
        $("#dialog").removeClass("hidden");
        $("#dialog .window").addClass("fadein").removeClass("hidden");
        app.z = l
    }

    function ka() {
        var a = $(".mentalassessment.button.submit");
        0 === $(".mentalassessment .checkbox.checked").length ? (a.removeClass("disabled"), a.click(ja)) : a.hasClass("disabled") || (a.addClass("disabled"), a.click(function(a) {
            a.stopPropagation()
        }))
    }

    function ja() {
        $.ajax({
            type: "POST",
            dataType: "json",
            contentType: "application/x-www-form-urlencoded",
            url: "ajax/accept/mentalAssessment",
            ob: la()
        })
    }

    function la() {
        app.z = o;
        var a = $("#dialog");
        a.attr("data-qa", m);
        a.addClass("fadeout");
        window.dialogFadeOutTimer = window.setTimeout(function() {
            a.addClass("hidden");
            a.removeClass("fadeout")
        }, 650);
        "login/registerActivate" != app.t() && go($(".content.mentalassessment").data("before"))
    }
    window.shouldDisplayAstropayField = function(a, b) {
        var c = JSON.parse(b);
        return eBetFeatures && "0" == eBetFeatures.useAstropayCashout2ApiMobile || c[a] != j
    };
    window.updateBankSelection = function(a) {
        var b = $("select[name=bankName]").val(),
            a = b === j || "" === b || !b.match(a),
            b = $("input[name=customerNumber]");
        a && b.val("");
        b.prop("disabled", a)
    };
    window.showVirtualSportsWelcomeDialog = function(a, b, c) {
        1 != app.L("vsLayer") && (showDialog("<div class='centered_dialog'><div class='title'>" + a + "</div><div class='sub'>" + b + "</div>" + c + "</div>"), app.nc("vsLayer", 1, 1051200))
    };
    window.redirectLoginToOtherBrand = function(a, b, c) {
        var d = document.createElement("div");
        d.innerHTML = '<form action="' + a + b + '" name="redirectLogin" method="post" style="display:none;"><input type="text" name="password" value="' + c + '" /></form>';
        document.body.appendChild(d);
        console.log("redirecting " + b + " to " + a);
        document.forms.redirectLogin.submit()
    };
    window.showRedirectWelcomeLayer = function() {
        var a = "<div class='centered_dialog'><div class='title'>" + i18n("head.Welcome") + "</div><div class='sub'>" + i18n("movedCustomerLayer.subtext") + "<img src='img/nice-highres.png' style='width:120px;margin:10px;'></div>" + i18n("movedCustomerLayer.line1") + "</div>";
        showDialog(a, m, function() {
            app.nc("FROM_OTHER_BRANDING", "false");
            y("redirectWelcomeLayerShown", "true")
        })
    };
    window.isPropertiesFieldValid = function(a, b, c) {
        a = JSON.parse(a);
        return a[b] !== j && a[b] == c
    };
    window.showTrustedDomainDialog = function(a, b, c, d) {
        a = "<div class='centered_dialog'><div class='title'>" + a + "</div><div>" + b + "</div></div>";
        c = {
            ok: c,
            cancel: i18n("common.cancel")
        };
        showDialog(a, c, function(a) {
            "ok" == a && go("/trustedDomain?url=" + encodeURIComponent(d))
        })
    };
    window.initVirtualSports = function(a, b) {
        for(console.log("initVirtualSports"); document.getElementById("virtualSportsScript");) document.body.removeChild(document.getElementById("virtualSportsScript"));
        var c = document.createElement("script");
        c.id = "virtualSportsScript";
        var d = app.global.language;
        "rs" == d ? d = "srl" : "pt" == d && (d = "br");
        c.src = "https://vsw" + (a ? "staging" : "") + ".betradar.com/ls/mobile/?/" + b + "/" + d + "/page/vsmobile";
        c.onload = function() {
            var a = {
                onLoad: vsOnLoad,
                loginRequired: vsLoginRequired,
                topHeaderHeight: 43,
                bottomFooterHeight: 0,
                betSelectionMode: "all",
                useBrowserHistoryAPI: o,
                displayMode: "fixed",
                persistSelections: l,
                showUnsupportedDeviceWarning: o
            };
            app.global.vsRefId != j && (a.referrer = app.global.vsRefId);
            window.vsmobile.init("#vsm_app_container", a)
        };
        document.body.appendChild(c);
        jQuery("body").addClass("virtualSports");
        jQuery(".page").addClass("hidden")
    };

    function ea() {
        console.log("removeVirtualSportsStyles");
        jQuery("body").removeClass("virtualSports");
        app.a && app.b(j, app.page.d).removeClass("hidden")
    }
    window.desktop = function(a) {
        app.b("input").is(":checked") && y("desktop", a ? 1 : 0);
        a ? redirectToDesktop() : (a = w("noDesktopPage") || "home", z("noDesktopPage"), go(a));
        return o
    };

    function ma(a, b) {
        for(var c = [], d = 0; d < a.length; d++) {
            var f = a[d],
                g = [];
            g[0] = f.title;
            g[1] = f.action;
            g[2] = f.image;
            g[3] = f.value;
            c[d] = g
        }
        nativeCall("changeTabs", [c, b])
    }

    function na() {
        jQuery(".blink").toggleClass("placeholder");
        window.setTimeout(na, 1E3)
    }
    na();
    window.toggleScoreBoxEventPoints = function() {
        go({
            toggleEventPoints: l
        })
    };
    window.hideScoreBoxEventPoints = function() {
        go({
            hideAllEventPoints: l
        })
    };
    window.selectAccount = function() {
        var a = jQuery("select[name='account']").val();
        go({
            account: a
        })
    };
    window.isAndroidNativeApp = function() {
        return "android" == w("nativeApp") || "android" == window.nativeAppOs || app.e.client && "android" == app.e.client.substr(0, 7) ? (y("nativeApp", "android"), l) : o
    };
    window.isAndroidAndNoApp = function() {
        return app.wb && !isAndroidNativeApp()
    };
    window.isIosDevice = function() {
        return -1 < app.K || "native" == app.j
    };
    window.newAndroidAppVersionReady = function() {
        var a = app.e.client,
            b;
        for(b in v)
            if(v[b] == a) return l;
        return o
    };
    window.deleteUserMessage = function(a) {
        showDialog(i18n("user.message.removeDialog"), {
            yes: i18n("common.Yes"),
            no: i18n("common.No")
        }, function(b) {
            "yes" == b && (app.q(), go(app.a ? app.page.d : app.page.f, {
                removeId: a
            }, o))
        }, "dialogDeleteUserMessage")
    };
    window.hideTitan = function(a, b) {
        app.b().removeClass("hidden");
        $(a).addClass("hidden");
        go("home");
        b && go(b)
    };
    window.backButtonEnabled = function() {
        return app.e.livescore ? "sports/livescore" != app.nextPage : "home" != app.nextPage
    };
    window.scrollActions = function(a, b) {
        if(!("" != app.mode || app == j)) {
            var c = b ? app.page.d : app.page.f,
                d = app.page.W[c];
            if(d) {
                var f = document.getElementById("endlessScroll_backToTop"),
                    g = app.a ? a : window;
                0 == $(g).scrollTop() ? (f.classList.remove("fadeIn"), f.classList.add("fadeOut")) : (f.classList.remove("fadeOut"), f.classList.add("fadeIn"));
                c = app.g(c);
                if($(g).scrollTop() + $(window).height() + 250 >= $(c + " .appcontent").height() && !d.ib && d.V < d.total) d.ib = d.V + d.Sa, go({
                    Wd: d.ib
                }, "skip")
            }
        }
    };
    window.backToTop = function() {
        (app.a ? $(".page.top .scroll_container") : $("html, body")).animate({
            scrollTop: 0
        }, 500);
        var a = document.getElementById("endlessScroll_backToTop");
        a.classList.remove("fadeIn");
        a.classList.add("fadeOut")
    };
    var oa;
    window.changeBonusView = function() {
        selId = $("select").find(":selected").val();
        selId != oa && (oa = selId, go("account/bonus", {
            selection: selId
        }))
    };
    window.trackOutboundLink = function(a) {
        G("outbound", "click", a, {
            hitCallback: function() {
                document.location = a
            }
        })
    };
    window.updateMetaInformation = function(a, b) {
        app.e.livescore && (b = a = "");
        var c = $("meta[name='description']");
        document.title = a;
        c.length ? c.attr("content", b) : $("head").append('<meta name="description" content="' + b + '">')
    };
    window.updateCanonical = function(a) {
        if(!app.e.livescore) {
            var b = $("link[rel='canonical']");
            a ? b.length ? b.attr("href", a) : $("head").append('<link rel="canonical" href="' + a + '">') : b.remove()
        }
    };
    window.openCasinoDialog = function(a) {
        var b = "";
        "native" == app.j ? b = "native" : 1 == app.K && (b = "webapp");
        var c = createCasinoLink(a, b);
        showDialog(i18n("home.externalLink.popupText"), {
            no: i18n("common.No"),
            yes: i18n("common.Yes")
        }, function(a) {
            "yes" == a && c()
        }, "dialogOpenCasino")
    };
    window.createCasinoLink = function(a) {
        return function() {
            window.open("https://" + a, "_blank")
        }
    };
    window.deactivate2Fa = function() {
        showDialog(i18n("login.2fa.confirmDialog"), {
            deactivate: i18n("login.2fa.btnDeactive"),
            cancel: i18n("login.2fa.btnCancel")
        }, function(a) {
            "deactivate" == a && go("/account/loginApproval", {
                toggleActivationOf2FA: "true"
            })
        }, "dialogDeactivate2Fa")
    };
    window.dataURItoBlob = function(a) {
        for(var a = atob(a.split(",")[1]), b = [], c = 0; c < a.length; c++) b.push(a.charCodeAt(c));
        return new Blob([new Uint8Array(b)], {
            type: "image/jpeg"
        })
    };
    window.showSharebetslipDialog = function(a, b, c, d, f, g) {
        $.ajax({
            type: "POST",
            url: "https://graph.facebook.com?id=" + c + "&scrape=true",
            ob: function(a) {
                console.log("Force Facebook Rescrape success", a)
            },
            error: function(a) {
                console.log("Force Facebook Rescrape error", a)
            }
        });
        var a = isAndroidNativeApp() || isAndroidAndNoApp() || isIosDevice(),
            h = !isIosDevice() && document.queryCommandSupported("copy"),
            k = {};
        a && (k.whatsapp = {
            text: "WhatsApp",
            F: "../img/share/whatsapp.png"
        });
        k.facebook = {
            text: "Facebook",
            F: "../img/share/facebook.png"
        };
        k.twitter = {
            text: "Twitter",
            F: "../img/share/twitter.png"
        };
        k.googleplus = {
            text: "Google+",
            F: "../img/share/google.png"
        };
        k.pinterest = {
            text: "Pinterest",
            F: "../img/share/pinterest.png"
        };
        k.download = {
            text: i18n("shareBetslip.Download"),
            F: "../img/share/download.png"
        };
        k.link = {
            text: i18n("shareBetslip.Link"),
            F: "../img/share/link.png",
            id: "copyLink",
            Id: !h
        };
        k.cancel = i18n("common.cancel");
        $("#dialog").hasClass("clicked") && showDialog(i18n("shareBetslip.shareViaDialogMessage") + "...", k, function(a) {
            $("#dialog").removeClass("clicked");
            "cancel" == a ? $(document.body).removeClass("noScroll") : pa(a, c, d, f, g, b, h)
        }, "dialogShareBetslip")
    };

    function qa(a, b) {
        for(var c = window.atob(a.substring(a.indexOf(";base64,") + 8)), d = new Uint8Array(c.length), f = 0, g = c.length; f < g; ++f) d[f] = c.charCodeAt(f);
        return new Blob([d.buffer], {
            type: b
        })
    }
    window.uploadBase64Image = function(a) {
        $("#dialog").addClass("clicked");
        if(eBetFeatures && "1" != eBetFeatures.shareBetslipImage) go(app.a ? app.page.d : app.page.f, {
            shareBetslipDialog: l
        }, o);
        else {
            app.q();
            for(var b = document.querySelectorAll(".header.betslipImage," + app.g("editor") + " .betslipImage, .footer.betslipImage"), c = "", d = 0; d < b.length; d++) c += b[d].outerHTML;
            var f = document.createElement("div");
            f.id = "betslipImageWrapper";
            b = document.createElement("div");
            b.innerHTML = c;
            c = b.getElementsByClassName("private");
            for(d =
                0; d < c.length; d++) c[d].innerHTML = c[d].innerHTML.replace(/[0-9]/g, "X");
            document.getElementById("themeBackground").classList.add("activeBetslipImage");
            f.appendChild(b);
            document.body.appendChild(f);
            var d = b.offsetHeight,
                c = Math.min(d, 500),
                g = 1.91 * d;
            b.style.width = c + "px";
            f.style.width = g + "px";
            window.html2canvas(f, {
                height: d,
                width: g,
                onrendered: function(c) {
                    document.body.removeChild(f);
                    document.getElementById("themeBackground").classList.remove("activeBetslipImage");
                    c = c.toDataURL("image/jpeg");
                    jQuery.ajax({
                        url: "ajax/uploadSharedBetslip",
                        dataType: "json",
                        contentType: "application/x-www-form-urlencoded",
                        data: {
                            ticketId: a,
                            sharedBetslipBase64: c
                        },
                        type: "POST",
                        success: function(a) {
                            a.success ? console.log("successfully uploaded betslip image") : console.log("betslip image upload not successfull");
                            go(app.a ? app.page.d : app.page.f, {
                                shareBetslipDialog: l
                            }, o)
                        },
                        error: function(a) {
                            console.log("error while uploading betslip image", a)
                        }
                    })
                }
            })
        }
    };
    window.downloadBase64Image = function(a) {
        for(var b = document.querySelectorAll(".header.betslipImage," + app.g("editor") + " .betslipImage, .footer.betslipImage"), c = "", d = 0; d < b.length; d++) c += b[d].outerHTML;
        var f = document.createElement("div");
        f.id = "betslipImage";
        f.innerHTML = c;
        b = f.getElementsByClassName("private");
        for(d = 0; d < b.length; d++) b[d].innerHTML = b[d].innerHTML.replace(/[0-9]/g, "X");
        document.getElementById("themeBackground").classList.add("activeBetslipImage");
        document.body.appendChild(f);
        d = isIosDevice() ?
            f.offsetHeight : app.a ? f.offsetHeight - 2 : f.offsetHeight - 8;
        b = Math.min(d, 500);
        f.style.width = b + "px";
        window.html2canvas(f, {
            height: d,
            width: b,
            onrendered: function(c) {
                document.body.removeChild(f);
                document.getElementById("themeBackground").classList.remove("activeBetslipImage");
                var c = c.toDataURL("image/jpeg"),
                    b = i18n("accounting.workflow.TICKET") + " " + a + ".jpg";
                ra(b, c)
            }
        })
    };

    function ra(a, b) {
        var c = b,
            d = document.createElement("a");
        d.style = "display: none";
        d.Ud = a;
        if(!isIosDevice()) var f = qa(b, "image/jpeg"),
            c = window.URL.createObjectURL(f);
        d.href = c;
        document.body.appendChild(d);
        d.click();
        setTimeout(function() {
            document.body.removeChild(d);
            isIosDevice() || window.URL.revokeObjectURL(c)
        }, 100)
    }

    function pa(a, b, c, d, f, g, h) {
        var k = "",
            q = "",
            b = b + ("?utm_medium=mobile&utm_campaign=betsharing_single" + sa(a));
        "twitter" == a ? (q = "Twitter Betshare", b += "&utm_source=twitter_" + app.global.language, k = "...", h = 112, b = (c + d).length > h ? c.substring(0, h - k.length - d.length) + k + " " + b + " - " + d : c + " " + b + " - " + d, k = "https://twitter.com/intent/tweet?text=" + encodeURIComponent(b)) : "facebook" == a ? (q = "Facebook Betshare", b += "&utm_source=facebook_" + app.global.language, k = "https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(b)) :
            "pinterest" == a ? (q = "Pinterest Betshare", k = "...", h = 499, a = c + " " + d, a.length > h && (a = c.substring(0, h - k.length - d.length) + k + " " + d), b += "&utm_source=pinterest_" + app.global.language, k = "https://www.pinterest.com/pin/create/button/?url=" + encodeURIComponent(b) + "&media=" + encodeURIComponent(f) + "&description=" + encodeURIComponent(a)) : "googleplus" == a ? (q = "Googleplus Betshare", b += "&utm_source=googleplus_" + app.global.language, k = "https://plus.google.com/share?url=" + encodeURIComponent(b)) : "whatsapp" == a ? (q = "WhatsApp Betshare",
                b += "&utm_source=whatsapp_" + app.global.language, k = "WhatsApp://send?text=" + encodeURIComponent(c + " " + b)) : "download" == a ? (q = "Download image", downloadBase64Image(g), G("affiliateId", "294352")) : "link" == a && (q = "Copy Link", c = jQuery("#copyLink"), d = jQuery("<div>", {
                "class": "copyLinkAreaWrap"
            }), b = jQuery("<textarea>", {
                "class": "copyLinkArea",
                value: b,
                readonly: "readonly"
            }), b.bind("touchstart click", function() {
                this.focus();
                this.setSelectionRange(0, this.value.length)
            }), c.replaceWith(d.append(b)), b.click(), h && (document.execCommand("copy"),
                d.replaceWith(c)));
        $(document.body).removeClass("noScroll");
        if(k) b = document.createElement("a"), b.href = k, b.target = "_blank", b.click();
        G("Social Betsharing Button", "Share", q)
    }

    function qa(a, b) {
        for(var c = window.atob(a.substring(a.indexOf(";base64,") + 8)), d = new Uint8Array(c.length), f = 0, g = c.length; f < g; ++f) d[f] = c.charCodeAt(f);
        return new Blob([d.buffer], {
            type: b
        })
    }
    window.downloadPageAsPdf = function(a, b) {
        var c = $(app.g(a || "account/statement") + " .scroll_container").clone().css({
            position: "fixed",
            top: 0,
            left: 0,
            width: "500px",
            padding: 0,
            height: "auto",
            backgroundColor: "white"
        });
        c.appendTo($("body"));
        window.html2canvas(c, {
            width: c.outerWidth(),
            height: c.outerHeight(),
            onrendered: function(a) {
                c.remove();
                var f = a.toDataURL("image/jpeg", 0.92),
                    a = 100 * a.height / a.width,
                    g = Math.max(a + 10, 297),
                    g = new jsPDF("p", "mm", [g, 210]);
                g.addImage(f, "JPG", 55, 5, 100, a);
                navigator.userAgent.match("CriOS") ?
                    g.output("dataurlnewwindow") : g.save(b + ".pdf")
            }
        })
    };
    window.printBetslip = function(a) {
        ta() && jQuery.ajax({
            url: "ajax/native/print/" + a,
            dataType: "text",
            success: function(a) {
                ua(a);
                W(2500)
            },
            error: function() {
                W(150)
            }
        })
    };
    window.printProcess = function(a, b) {
        ta() && jQuery.ajax({
            url: "ajax/native/print/process/" + a + "/" + b,
            dataType: "text",
            success: function(a) {
                ua(a);
                W(2500)
            },
            error: function() {
                W(150)
            }
        })
    };

    function ta() {
        if(app.gb) return console.log("app still printing ..."), o;
        app.gb = l;
        jQuery("#printBtn").addClass("selected");
        return l
    }

    function W(a) {
        window.setTimeout(function() {
            app.gb = o;
            jQuery("#printBtn").removeClass("selected")
        }, a)
    }

    function ua(a) {
        if(a.startsWith("ERROR")) console.log("Couldn't print");
        else if(console.log("Got print process data:", a), a = JSON.parse(a), a.success) {
            var b = {
                type: "PRINT_STRING"
            };
            b.data = a.printText;
            X(b)
        } else console.log("Couldn't print")
    }

    function sa(a) {
        var b = "";
        eBetFeatures && "1" == eBetFeatures.sharedLinksWithAffiliateID && (b = "", "twitter" == a ? b = "287452" : "facebook" == a ? b = "287352" : "pinterest" == a ? b = "287552" : "googleplus" == a ? b = "287652" : "whatsapp" == a ? b = "239752" : "link" == a && (b = "294452"), b = "&utm_affiliateid=" + b + "&affiliateId=" + b);
        return b
    }
    window.initServiceWorker = function() {
   
    };
    window.notification = {};
    window.notification.Ub = o;
    window.notification.vb = o;
    window.notification.xa = l;
    window.notification.showRegisterDialog = function() {
        app.supportsNotifications && !window.notification.Ub && !window.notification.vb && !(1 == sessionStorage.noNotifications || "denied" == window.Notification.je) && navigator.serviceWorker.ready.then(function(a) {
            a.pushManager.getSubscription().then(function(a) {
                a || setTimeout(function() {
                    window.notification.vb = l;
                    showDialog(i18n("notifications.registerDevice"), {
                        yes: i18n("common.Yes"),
                        later: i18n("common.NotNow"),
                        no: i18n("common.No")
                    }, function(a) {
                        "yes" == a ? window.notification.Ha() :
                            "no" == a && (sessionStorage.noNotifications = 1)
                    }, "dialogRegisterDevice")
                }, 1E3)
            })
        })
    };
    window.notification.register = function(a) {
        app.supportsNotifications && "0" != eBetFeatures.mobileNotifications && ("showRegisterDialog" === a ? window.notification.showRegisterDialog() : "unsubscribe" === a ? window.notification.sc() : "subscribe" === a && window.notification.Ha())
    };
    window.notification.Ha = function() {
        app.supportsNotifications && navigator.serviceWorker.ready.then(function(a) {
            console.log("serviceworker ready for subscription", a);
            (navigator.serviceWorker.controller || a.active).postMessage({
                login: app.global.login
            });
            a.pushManager.subscribe({
                userVisibleOnly: l
            }).then(function(a) {
                console.log("subscription was successful", a);
                window.notification.Ub = l;
                return window.notification.Ad(a)
            })["catch"](function(a) {
                "denied" === window.Notification.permission ? console.log("Permission for Notifications was denied") :
                    console.log("Unable to subscribe to push", a)
            })
        })
    };
    window.notification.Ad = function(a) {
        a = window.notification.ec(a);
        window.notification.ca(a.substr(40), "ANDROID_CHROME")
    };
    window.notification.ec = function(a) {
        if(0 !== a.endpoint.indexOf("https://android.googleapis.com/gcm/send")) return a.endpoint;
        var b = a.endpoint;
        a.subscriptionId && -1 === a.endpoint.indexOf(a.subscriptionId) && (b = a.endpoint + "/" + a.subscriptionId);
        return b
    };
    window.notification.sc = function() {
        app.supportsWebWorkerAndIsAndroidChrome && navigator.serviceWorker.ready.then(function(a) {
            console.log("serviceworker ready for unsubscription", a);
            a.pushManager.getSubscription().then(function(a) {
                $.ajax({
                    data: {
                        deviceToken: a ? window.notification.ec(a).substr(40) : "",
                        pushNotificationChannel: "ANDROID_CHROME"
                    },
                    url: "ajax/native/unregisterDevice",
                    context: window,
                    global: o,
                    async: o,
                    success: function() {
                        jQuery("input[name=MOBILE_NOTIFICATIONS]").prop("checked", o);
                        console.log("successfully unsubscribed from chrome push notifications")
                    }
                });
                if(a) a.unsubscribe().then(function() {
                    console.log("successfully unsubscribed from chrome push notifications")
                })["catch"](function(a) {
                    console.log("Unsubscription error: ", a)
                })
            })["catch"](function(a) {
                console.error("Error thrown while unsubscribing from push messaging.", a)
            })
        })
    };
    window.notification.Bb = function() {
        if("true" == window.nativeApp) {
            if(window.Vd && "1" == eBetFeatures.livescoreNotifications && window.pd) "android" == window.nativeAppOs ? pushNotification.sd(window.notification.ad, window.notification.Yb, {
                    senderID: "59128740929",
                    ecb: "window['notification'].livescoreNotificationReceivedAndroid"
                }) : pushNotification.sd(window.notification.bd, window.notification.Yb, {
                    badge: "true",
                    sound: "true",
                    alert: "true",
                    ecb: "window['notification'].livescoreNotificationReceivedIOS"
                }), window.notification.xa =
                o
        } else window.Notification && app.supportsWebWorkerAndIsAndroidChrome && ("granted" == window.Notification.permission ? window.notification.Ha() : "denied" == window.Notification.permission && window.notification.sc()), window.notification.xa = o
    };
    window.notification.ca = function(a, b) {
        $.ajax({
            data: {
                deviceToken: a,
                pushNotificationChannel: b
            },
            url: "ajax/native/registerDevice",
            context: window,
            global: o,
            async: o,
            success: function(a) {
                a.success ? (jQuery("input[name=MOBILE_NOTIFICATIONS]").prop("checked", l), console.log("successfully subscribed to push notifications (" + b + ")")) : console.log("error while subscribing to push notifications (" + b + "): " + a.message)
            }
        })
    };
    window.notification.bd = function(a) {
        window.notification.ca(a, "IOS_LIVESCORE")
    };
    window.notification.ad = function(a) {
        "OK" != a && console.log("Push Notification Registration Result: " + a)
    };
    window.notification.Yb = function(a) {
        console.log("Failed to register for Push Notifications: ", a)
    };
    window.notification.ge = function(a) {
        console.log("PN event received", a);
        if(a.alert && "1" == a.Mc) window.notification.Xb(a.alert, a.action);
        else if(a.action) window.location.hash = a.action
    };
    window.notification.fe = function(a) {
        console.log("PN event received", a);
        switch (a.event) {
            case "registered":
                0 < a.rd.length ? window.notification.ca(a.rd, "ANDROID_LIVESCORE") : console.log("Empty Push Notification RegId", a);
                break;
            case "message":
                if(a.Mc) window.notification.Xb(a.eb.message, a.eb.action);
                else if(a.eb.action) window.location.hash = a.eb.action;
                break;
            case "error":
                console.log("PN Error: " + a.ie);
                break;
            default:
                console.log("PN Unknown, an event was received and we do not know what it is")
        }
    };
    window.notification.Xb = function(a, b) {
        showDialog(a, {
            "0": i18n("common.View"),
            1: i18n("common.Cancel")
        }, function(a) {
            0 == a && go(b)
        })
    };
    window.requestVerificationCode = function() {
        go("/account/requestVerificationCode", {
            sendCode: "true",
            verificationCode: app.b(".jq-enterCode", "account/requestVerificationCode").val(),
            trustDevice: app.b(".trustDevice", "account/requestVerificationCode").is(":checked")
        }, o)
    };
    window.Ba = {};
    window.minimizeRsGroup = function(a, b) {
        jQuery(a).toggleClass("closed");
        window.Ba[b] = !jQuery(a).hasClass("closed");
        jQuery(app.g() + " #" + b).slideToggle()
    };
    window.getTitle = function(a, b) {
        if(!app.a) return a;
        if(app.vd == b) b ? app.rb = a : app.qb = a;
        return b ? app.rb : app.qb
    };
    window.deleteZopimUserData = function() {
        window.$zopim && window.$zopim.livechat && ($zopim.livechat.setName("Unknown User"), $zopim.livechat.setEmail(""))
    };
    window.openLiveChat = function() {
        var a = setInterval(function() {
            window.$zopim && window.$zopim.livechat && $zopim.livechat.setOnConnected(function() {
                startLiveChat();
                clearInterval(a)
            })
        }, 500)
    };
    window.showDepositAfterLoginDialog = function(a, b, c) {
        app.D || (a = "<div id='depositAfterLoginDialog'><div class='title'>" + a + "</div><div class='sub'>" + b + "</div>" + c + "</div>", b = {
            deposit: i18n("depositAfterLogin.depositNow"),
            nothanks: i18n("depositAfterLogin.no")
        }, showDialog(a, b, function(a) {
            "deposit" == a ? go("/payin") : go("home")
        }))
    };
    window.showMobileAgreementDialog = function(a, b, c) {
        if(!app.ed) {
            var d = "<div id='mobileAgreementDialog' class='hasPrio2'><div class='title'>" + a + "</div><div class='sub'>" + b + "</div>" + c + "</div>",
                f = {
                    yes: i18n("cLayer.confirm.yes")
                }; - 1 == window.location.hash.indexOf("functionalities") && window.setTimeout(function() {
                showDialog(d, f, mobileAgreementConfirm)
            }, 100)
        }
    };
    window.handleFunctionalities = function() {
        go("functionalities")
    };
    window.mobileAgreementConfirm = function(a) {
        if("yes" == a) app.ed = l, go("/functionalities", {
            confirmed: "true"
        })
    };
    window.showLogoutLayerDialog = function(a, b, c) {
        showDialog("<div id='depositAfterLoginDialog'><div class='title'>" + a + "</div><div class='sub'>" + b + "</div>" + c + "</div>", {
            ok: "ok"
        })
    };
    window.showChoosePasswordDialog = function() {
        var a = '        <div id="choosePasswordDialog">            <div class="title">                <span>' + i18n("layer.passwordExpired.title1") + "</span>                <span>" + i18n("layer.passwordExpired.title2") + '</span>            </div>            <div class="content">                <span>' + i18n("layer.passwordExpired.body") + "</span>            </div>        </div>    ",
            b = {
                yes: i18n("layer.passwordExpired.yes"),
                no: i18n("layer.passwordExpired.no")
            };
        showDialog(a,
            b,
            function(a) {
                go("yes" === a ? "account/setPassword" : "home")
            })
    };
    window.showPasswordExpiredDialog = function() {
        var a = '        <div id="passwordExpiredDialog">            <div class="title">                <span>' + i18n("layer.passwordExpired.title1") + "</span>                <span>" + i18n("layer.passwordExpired.title2") + '</span>            </div>            <div class="content">                <span>' + i18n("layer.passwordExpired.body") + "</span>            </div>        </div>    ";
        showDialog(a, {
                change: i18n("layer.passwordExpired.yes"),
                ignore: i18n("layer.passwordExpired.no")
            },
            function(a) {
                if("change" === a || "ignore" === a) {
                    var c = "change" === a ? "account/changePassword" : "home";
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        contentType: "application/x-www-form-urlencoded",
                        url: "ajax/action/passwordExpiredSubmit",
                        success: function() {
                            "home" !== c && go("home");
                            go(c)
                        }
                    })
                }
            });
        setTimeout(function() {
            $(".msg div").is("#passwordExpiredDialog") && $(".options").addClass("passwordExpired")
        }, 10)
    };
    window.promptUserToChangeDialog = function() {
        var a = '        <div id="promptUserToChangeDialog">            <div class="title">                <span>' + i18n("layer.promptUserToChange.title1") + "</span>                <span>" + i18n("layer.promptUserToChange.title2") + '</span>            </div>            <div class="content">                <span>' + i18n("layer.promptUserToChange.body") + "</span>            </div>        </div>    ";
        showDialog(a, {
            change: i18n("layer.promptUserToChange.button")
        }, function(a) {
            "change" ==
            a && (go("personalDetails"), app.a && go("home"))
        })
    };
    window.confirmLimitIncreaseDialog = function(a) {
        a = '        <div id="confirmLimitIncreaseDialog">            <div class="title">                <span>' + i18n("layer.confirmLimitIncrease.title") + '</span>            </div>            <div class="content">                <span>' + a + "</span>            </div>        </div>    ";
        showDialog(a, {
            yes: i18n("common.Yes"),
            no: i18n("common.No")
        }, function(a) {
            go("accept/confirmLimitIncrease", {
                confirm: "yes" == a ? l : o
            }, "skip", o);
            setTimeout(function() {
                go("home")
            }, 100)
        })
    };
    window.showAcceptPrivacyPolicyDialog = function() {
        if(app.od) go("/home");
        else {
            var a = '        <div id="acceptPrivacyPolicyDialog" class="hasPrio1">            <div class="title">                <span>' + i18n("layer.privacyPolicyUpdate.title1") + "</span>                <span>" + i18n("layer.privacyPolicyUpdate.title2") + '</span>            </div>            <div class="content">                <span>' + i18n("layer.privacyPolicyUpdate.body1") + "</span>            </div>        </div>    ";
            showDialog(a, {
                    accept: i18n("layer.privacyPolicyUpdate.accept")
                },
                function(a) {
                    "accept" === a && $.ajax({
                        type: "POST",
                        dataType: "json",
                        contentType: "application/x-www-form-urlencoded",
                        url: "ajax/action/acceptPrivacyPolicyUpdateSubmit",
                        success: function() {
                            app.od = l;
                            app.global.layerUrl = j;
                            go("home")
                        }
                    })
                })
        }
    };

    function Y() {
        var a = new Uint8Array(1);
        if(window.crypto && window.crypto.Ya) return window.crypto.Ya(a), a[0];
        return window.ac && window.ac.Ya ? (window.ac.Ya(a), a[0]) : Math.floor(255 * Math.random())
    }

    function Z(a) {
        var b = Y() % a.length;
        return a[b]
    }
    window.isLandscapeMode = function() {
        return window.innerHeight < window.innerWidth
    };
    window.changeClass = function() {
        $(document.body).toggleClass("noScroll");
        isLandscapeMode() ? ($("#shareBetwindow").addClass("overlayLandscape"), $("#shareBetwindow").removeClass("overlayPortrait")) : ($("#shareBetwindow").addClass("overlayPortrait"), $("#shareBetwindow").removeClass("overlayLandscape"))
    };
    window.generatePasswordAndFillFields = function() {
        var a, b, c = o;
        for(a = ""; !c;) {
            b = [];
            for(var d = c = j, f = j, g = "! ? _".split(" "), d = "a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z".split(","), f = "0,1,2,3,4,5,6,7,8,9".split(","), c = 0; 8 > c; c += 1) b[c] = 0 === Y() % 2 ? Z(d).toUpperCase() : Z(d);
            d = Y() % 8;
            for(c = 0; c < d; c += 1) b[Y() % 8 - 1] = Z(f);
            f = Y() % 8;
            for(c = 0; c < f; c += 1) b[Y() % 8 - 1] = Z(g);
            g = c = o;
            f = j;
            for(f = 0; f < b.length; f += 1) "a" <= b[f] && "z" >= b[f] || "A" <= b[f] && "Z" >= b[f] ? c = l : g =
                l;
            c = c && g
        }
        for(c = 0; c < b.length; c += 1) a += b[c];
        b = app.g("login/register");
        c = "password";
        g = "passwordConfirm";
        0 == jQuery(b + " [name=" + c + "]").length && (c = "NewPassword", g = "PasswordRepetition");
        jQuery(b + " [name=" + c + "]")[0].type = "text";
        jQuery(b + " [name=" + c + "]").val(a);
        jQuery(b + " [name=" + g + "]").val(a);
        document.queryCommandSupported("copy") && (jQuery(b + " [name=" + c + "]").select(), document.execCommand("copy"))
    };
    window.hidePassword = function(a) {
        if("text" == a[0].type && "" == a.val()) a[0].type = "password"
    };
    window.deleteOldTickets = function() {
        showDialog(i18n("ticketlist.deleteOnlyTickets", "30"), {
            yes: i18n("common.Yes"),
            no: i18n("common.No")
        }, function(a) {
            "yes" == a && go("ticket/list", {
                MODE: "deleteOldTickets"
            }, o)
        }, "dialogDeleteOldTickets")
    };
    window.adjustSelector = function(a, b, c, d) {
        var f = restoreBetSelector(b),
            g = f[c + "Index"],
            g = "+" == d ? Math.min(g + 1, f[c].length - 1) : Math.max(g - 1, 0);
        f[c + "Index"] = g;
        a = $(a).closest(".betSelector");
        a.find("." + c + "Score .value").html(restoreBetSelectorSide(b, c));
        b = restoreBetSelectorMiddle(b);
        a.find(".betResult").html(b)
    };
    window.betSelector = {};
    window.restoreBetSelector = function(a, b, c) {
        var d = betSelector[a];
        d || (d = {
            expanded: o,
            left: b ? b.split(",") : [],
            leftIndex: 0,
            right: c ? c.split(",") : [],
            rightIndex: 0
        }, betSelector[a] = d);
        return d
    };
    window.restoreBetSelectorSide = function(a, b) {
        var c = restoreBetSelector(a);
        return c[b][c[b + "Index"]]
    };
    window.restoreBetSelectorMiddle = function(a) {
        var b = restoreBetSelector(a),
            c = b.left[b.leftIndex] + ":" + b.right[b.rightIndex],
            a = (a = function(a, c) {
                var b = app.ia.resultSetMultipleRow,
                    h = parseInt(b.resultSetId),
                    k = app.page.data[app.page.f];
                for(i in k) {
                    var q = k[i];
                    if("resultSetMultipleRow" == q[0] && a == q[h + 1]) {
                        var p = ["r1_caption", "r2_caption"];
                        for(i = 0; i < p.length; i++) {
                            var s = b[p[i]].split(".").map(Number);
                            if(q[s[0] + 1][s[1]] == c) return b = q.slice(), b.shift(), b
                        }
                    }
                }
            }(a, c)) ? app.Ia.resultSetMultipleRow.apply(this, a) : "";
        return $(a).find(".caption").filter(function() {
            return $(this).text().trim() ==
                c
        }).closest(".cell").wrap("<p>").parent().html()
    };
    window.trackVisit = function(a, b) {
        sessionStorage.getItem("visitTracked") || (sessionStorage.setItem("visitTracked", l), G(a, "VISIT", b))
    };
    window.betSelectorExpanded = function(a) {
        return restoreBetSelector(a).expanded
    };
    window.betSelectorToggle = function(a, b) {
        restoreBetSelector(a).expanded = b;
        app.b(".betSelectorToggle-" + a).find(".show_more").toggleClass("hidden", b);
        app.b(".betSelectorToggle-" + a).find(".show_less").toggleClass("hidden", !b);
        app.b(".betSelectorLine-" + a).toggleClass("hidden", !b)
    };
    window.formatTime = function(a) {
        var b = Math.floor(a / 3600),
            a = a % 3600,
            c = Math.floor(a / 60),
            a = a % 60;
        return (10 > b ? "0" : "") + b + (":" + (10 > c ? "0" : "") + c) + (":" + (10 > a ? "0" : "") + a)
    };
    var va = {};
    window.updateSessionTimeIndicator = function(a, b) {
        clearTimeout(va[a]);
        if(b) {
            var c = arguments;
            va[a] = setTimeout(function() {
                updateSessionTimeIndicator.apply(this, c)
            }, 500);
            var d = formatTime(Math.floor(((new Date).getTime() - b) / 1E3));
            $("." + a).text(d);
            return d
        }
    };
    window.createQuickFilter = function(a, b) {
        if(!a[0]) return "";
        for(var c = '<div class="quickFilter' + (b ? " casinoIcon" : "") + '">', d = o, f = 0; f < a.length - 1 && a[f]; f += 2) {
            var g = app.t(),
                h = -1 < g.indexOf(a[f]),
                hys = "Bugün",
                g = "today" == a[f + 1] && -1 < g.indexOf("today");
            h && (d = l);
            c += '<div class="icon ' + (h || g ? "selected" : "") + '" onclick="go(\'' + ("sports/" + (h ? a[f].split("/")[0] : a[f])) + "', 'none')\">";
            c += '<div class="sports ' + a[f + 1] + '"></div>';
            c += "<span>" +(gametours[a[f].split("/")[2]] ? gametours[a[f].split("/")[2]]:hys)+ "</span>";
            c += "</div>"
        }
        d ? setTimeout(restoreQuickFilterStatus, 1) : setTimeout(function() {
            $(".filterbar.showQuickFilter").bind("touchend",
                function(a) {
                    a.stopPropagation()
                })
        }, 1);
        return c + "</div>"
    };
    document.addEventListener("keydown", function(a) {
        107 == a.keyCode && (a.preventDefault(), a = jQuery(".form.quickSearch"), a.addClass("active"), a.children().eq(0).focus())
    });
    window.quickSearch = function(a) {
        hideQuickSearch();
        search(a)
    };
    window.hideQuickSearch = function() {
        var a = jQuery(".form.quickSearch"),
            b = a.children().eq(0);
        a.removeClass("active");
        b.val("");
        b.blur()
    };
    window.restoreQuickFilterStatus = function() {
        $(".filterbar.showQuickFilter").bind("touchend", function(a) {
            a.stopPropagation()
        });
        $(app.g() + " .filterbar .quickFilter").bind("scroll", function(a) {
            window.gc = a.target.scrollLeft
        });
        window.gc && $(app.g() + " .filterbar .quickFilter").scrollLeft(window.gc);
        if(-1 < app.t().indexOf("sports/search")) window.Ea = j;
        setTimeout(function() {
            $(".filterbar .form").css("transition", "")
        }, 100);
        window.Ea == j && ($(app.g() + " .filterbar").removeClass("showQuickFilter"), setTimeout(function() {
            $(".filterbar").addClass("showQuickFilter");
            window.Ea = l
        }, 1500))
    };
    window.copyBtcAddress = function(a) {
        a.addClass("selected");
        var b = jQuery("#btcAddress");
        if(navigator.userAgent.match(/ipad|ipod|iphone/i)) {
            var c = b.get(0),
                d = c.contentEditable,
                f = c.readOnly;
            c.contentEditable = l;
            c.readOnly = o;
            var g = document.createRange();
            g.selectNodeContents(c);
            var h = window.getSelection();
            h.removeAllRanges();
            h.addRange(g);
            c.setSelectionRange(0, 999999);
            c.contentEditable = d;
            c.readOnly = f
        } else b.select();
        document.execCommand("copy");
        b.blur();
        window.setTimeout(function() {
            a.removeClass("selected")
        }, 250)
    };
    window.loadLicenseLogo = function(a, b) {
        if(a) {
            var c = document.createElement("script");
            c.src = "https://" + b + ".snippet.antillephone.com/apg-seal.js";
            document.getElementsByTagName("head")[0].appendChild(c)
        }
    };
    window.toggleQuickFilter = function() {
        if(!(window.event && 30 < window.event.offsetX)) $(app.g() + " .filterbar").toggleClass("showQuickFilter"), window.Ea = $(app.g() + " .filterbar").hasClass("showQuickFilter"), window.Ea ? setTimeout(function() {
            document.activeElement.blur()
        }, 50) : $(app.g() + " .filterbar input.searchfield").focus()
    };




    window.toggleQuickFilterLive = function() {
        if(!(window.event && 30 < window.event.offsetX)) $(".filterbarlive").toggleClass("showQuickFilter"), window.Ea = $(".filterbarlive").hasClass("showQuickFilter"), window.Ea ? setTimeout(function() {
            document.activeElement.blur();
        }, 50) : $(".filterbarlive input.searchfield").focus()
    };



    window.disableQuickFilter = function() {
        window.event && 30 < window.event.offsetX || setTimeout(function() {
            $(app.g() + " .filterbar").removeClass("showQuickFilter")
        }, 100)
    };
    window.disableQuickFilterlive = function() {
        window.event && 30 < window.event.offsetX || setTimeout(function() {
            $(".filterbarlive").removeClass("showQuickFilter")
        }, 100)
    };
    touchstart = function(a) {
        window.T = {
            time: a.timeStamp,
            x: a.changedTouches[0].screenX,
            y: a.changedTouches[0].screenY
        };
        window.pe = a.changedTouches[0]
    };
    touchendSingleSwipe = function(a) {
        if(!app.a) {
            var a = {
                    time: a.timeStamp,
                    x: a.changedTouches[0].screenX,
                    y: a.changedTouches[0].screenY
                },
                b = a.time - window.T.time,
                c = a.x - window.T.x;
            100 < Math.abs(c) && 500 > b && Math.abs(c) > 3 * Math.abs(a.y - window.T.y) && app.Ld(0 > c)
        }
    };
    touchendDoubleSwipe = function(a) {
        var b = {
                time: a.timeStamp,
                x: a.changedTouches[0].screenX,
                y: a.changedTouches[0].screenY
            },
            c = b.time - window.T.time,
            d = b.x - window.T.x;
        if(100 < Math.abs(d) && 1E3 > c && Math.abs(b.y - window.T.y) < Math.abs(d) && 200 > Math.abs(window.Md - a.timeStamp)) b = {
            type: "SWIPE"
        }, b.direction = 0 > d ? "left" : "right", X(b);
        window.Md = a.timeStamp
    };
    window.addEventListener("touchstart", touchstart, o);
    window.addEventListener("touchend", touchendSingleSwipe, o);
    window.addEventListener("touchend", touchendDoubleSwipe, o);

    function X(a) {
        window.parent.postMessage(a, "*")
    }

    function wa() {
        $("#uploadForm .textfield").val("");
        window.documentUploadChanged();
        window.takePicture().done(function(a) {
            console.info("got picture data of length", a.length);
            V = a;
            window.documentTypeChanged()
        }).fail(function(a) {
            console.info("error", a);
            V = o;
            window.documentTypeChanged()
        })
    }
    window.takePictureForUpload = wa;
    window.retail = {
        Db: "",
        s: "",
        uploadDocumentScan: function() {
            function a(a, c) {
                app.Z();
                go("userDocumentUpload?level=" + a + "&message=" + c)
            }
            app.q();
            $.ajax({
                url: "/ajax/retailUploadDocument",
                contentType: "application/x-www-form-urlencoded",
                type: "POST",
                data: {
                    sysType: $('[name="referenceHeader"]').val(),
                    image: V || $('[name="userDocument"]').val()
                },
                success: function() {
                    a("INFO", "user.document.upload.success")
                },
                error: function() {
                    a("ERROR", "user.document.upload.error")
                }
            })
        },
        resetDocumentScan: function() {
            V = o;
            window.documentTypeChanged(0)
        },
        startDocumentScan: function() {
            window.retail.Tb() ? X({
                info: i18n("retail.scanDocument"),
                message: "startDocumentScan"
            }) : (V = o, window.documentTypeChanged(), wa())
        },
        dc: function(a) {
            event.stopPropagation();
            a = a.key;
            a = "Enter" == a ? "OKAY" : a;
            a = "Backspace" == a ? "C" : a;
            ("OKAY" == a || "C" == a || 0 <= a && 9 >= a) && window.retail.pinButtonPressed(a)
        },
        mb: function(a) {
            app.global.loggedIn ? (app.da(), y("scannedCard", a)) : ($("input[name=username]").val(a), window.retail.Db = a, window.retail.s = "", $("#pinDialog #pinStars").text(""), $("#pinDialog").removeClass("hidden"),
                $("#pinDialog .window").addClass("fadein").removeClass("hidden"), app.z = l, document.addEventListener("keyup", window.retail.dc))
        },
        Sb: function() {
            document.removeEventListener("keyup", window.retail.dc);
            app.z = o;
            var a = $("#pinDialog");
            a.addClass("fadeout");
            window.setTimeout(function() {
                a.addClass("hidden");
                a.removeClass("fadeout")
            }, 650)
        },
        pinButtonPressed: function(a) {
            "OKAY" == a ? (window.retail.Sb(), window.retail.$b(window.retail.Db, window.retail.s)) : "C" == a ? window.retail.s = window.retail.s.substring(0, window.retail.s.length -
                1) : 8 > window.retail.s.length && (window.retail.s += a);
            $("#pinDialog #pinStars").text(Array(window.retail.s.length + 1).join("*"))
        },
        se: function() {
            window.retail.mc--;
            $("#logoutWarning").html(i18n("retailApp.cardRemovedLogoutIn", window.retail.mc));
            0 >= window.retail.mc && clearInterval(window.retail.he)
        },
        $b: function(a, b) {
            a && 0 < a.length && a != app.global.login && (app.global.login != j && a != app.global.login ? (y("LOGIN_AFTER_LOGOUT", a), y("PASSWORD_AFTER_LOGOUT", b), go("logout")) : go("login", {
                username: a,
                password: b
            }))
        },
        qd: function(a) {
            if("onDocumentScanned" ==
                a.data.message) a = a.data.image, $('[name="userDocument"]').val(a || ""), window.documentTypeChanged();
            else if("PING" == a.data.message) window.parent.postMessage("PONG", "*");
            else {
                var b = a.data.type;
                if(-1 < ["MOBILE_ONLINETELLER_DEPOSIT", "MOBILE_CUSTOMER_CONTINUE_REGISTRATION", "SERVICE_APP_CUSTOMER_LOGIN"].indexOf(b)) {
                    var b = "MOBILE_ONLINETELLER_DEPOSIT" == b,
                        c = a.data.login,
                        d = a.data.password;
                    app.global.login != j && c == app.global.login ? b && go("payin") : d == j && a.data.isPinRequired ? window.retail.mb(c) : (b && y("GO_TO_PAGE_AFTER_LOGIN",
                        "payin"), window.retail.$b(a.data.login, a.data.password))
                } else "CONNECTED_TAG_ID" == b ? app != j && a.data.CONNECTED_TAG_ID != app.global.login && (window.retail.mb(a.data.CONNECTED_TAG_ID), go("logout")) : "NO_TAG_CONNECTED" == b ? "1" == app.global.loggedIn && window.retail.Tb() ? app.da() : window.retail.Sb() : "LOGOUT_CUSTOMER" == b && window.Rd != j && app.global.login && go("logout")
            }
        },
        Tb: function() {
            return app.k("Kiosk/")
        }
    };
    window.generateColombianDocumentTypesSelection = function(a, b) {
        var c = JSON.parse(a);
        return selectBox("code", b, c, j, j, o)
    };
    window.addEventListener("message", window.retail.qd, o);
    window.setAppLoadedStatus("mobile_js_end");
    /iP(hone|ad|od)/.test(navigator.userAgent) || window.navigator.mediaDevices && window.navigator.mediaDevices.enumerateDevices && window.navigator.mediaDevices.enumerateDevices().then(function(a) {
        a.forEach(function(a) {
            if("videoinput" == a.kind) {
                if(!window.canTakePicture) console.info("can take pictures"), window.canTakePicture = l;
                U.unshift(a.deviceId)
            }
        })
    });
    window.takePicture = function() {
        function a() {
            try {
                q.srcObject.getVideoTracks()[0].stop()
            } catch (a) {}
            q.srcObject = m
        }

        function b(c) {
            h.show();
            a();
            navigator.mediaDevices.getUserMedia({
                audio: o,
                video: {
                    deviceId: U[c],
                    width: {
                        ideal: 1920
                    },
                    height: {
                        ideal: 1080
                    }
                }
            }).then(function(a) {
                h.hide();
                console.info("takePicture: got stream", a);
                q.srcObject = a;
                k.load()
            })["catch"](function(a) {
                document.body = f.get(0);
                console.info("takePicture rejected: ", a.message);
                d.reject(a.message)
            })
        }

        function c(a, d) {
            try {
                b(0)
            } catch (f) {
                console.log("camera open failed, retrying...",
                    d, f), 3 > d++ && window.setTimeout(function() {
                    c(a, d)
                }, 250)
            }
        }
        var d = jQuery.Deferred();
        if(!("mediaDevices" in navigator)) return d.reject("no mediaDevices support"), d;
        if(!U.length) return d.reject("no cameras found"), d;
        var f = jQuery("body");
        f.remove();
        var g = jQuery("<body>").attr("id", "takePicture"),
            h = jQuery("<div class='processing'></div>");
        h.appendTo(g);
        document.body = g.get(0);
        var k = jQuery("<video>");
        k.attr("poster", "/img/icon_blank.png");
        k.attr("autoplay", "autoplay");
        k.attr("muted", "muted");
        k.click(function() {
            function c() {
                if("" ==
                    n.attr("src")) n.hide();
                else {
                    var a = window.innerWidth,
                        b = window.innerHeight,
                        d = q.videoWidth,
                        f = q.videoHeight,
                        g = a / d,
                        h = b / f,
                        k = Math.min(g, h),
                        p = 0,
                        r = 0;
                    g < h ? r = (b - f * k) / 2 : p = (a - d * k) / 2;
                    n.width(d).height(f);
                    H.style.zoom = k;
                    I.style.left = p + "px";
                    I.style.top = r + "px";
                    n.show()
                }
            }

            function b() {
                window.onresize = window.onorientationchange = m;
                g.remove();
                document.body = f.get(0);
                n.remove();
                a()
            }

            function x() {
                var a = p.hasClass("pos1");
                p.hasClass("pos2");
                p.removeClass("pos1");
                p.removeClass("pos2");
                a ? p.addClass("pos2") : p.addClass("pos1")
            }
            h.show();
            q.pause();
            k.hide();
            p.remove();
            s.remove();
            n.remove();
            n.attr("src", "");
            var H = n.get(0),
                I = s.get(0);
            n.appendTo(s);
            s.appendTo(g);
            window.onresize = window.onorientationchange = c;
            c();
            window.setTimeout(function() {
                var a = document.createElement("canvas");
                a.width = q.videoWidth;
                a.height = q.videoHeight;
                a.getContext("2d").drawImage(q, 0, 0, a.width, a.height);
                a = a.toDataURL("image/png");
                n.attr("src", a);
                c();
                k.hide();
                h.hide();
                p.appendTo(g)
            }, 0);
            n.click(x);
            p.click(x);
            jQuery("<div>").attr("class", "green").click(function(a) {
                g.fadeOut(500,
                    function() {
                        b();
                        var a = n.attr("src");
                        a && a.startsWith("data:image/png;base64,") ? d.resolve(a) : d.reject("no png image data");
                        n.attr("src", "")
                    });
                a.stopPropagation()
            }).appendTo(p);
            jQuery("<div>").attr("class", "yellow").click(function(a) {
                s.remove();
                p.remove();
                k.show();
                q.play();
                a.stopPropagation()
            }).appendTo(p);
            jQuery("<div>").attr("class", "red").click(function(a) {
                g.fadeOut(500, function() {
                    b();
                    d.reject("red")
                });
                a.stopPropagation()
            }).appendTo(p)
        });
        k.appendTo(g);
        var q = k.get(0);
        c(0);
        window.openCamera = b;
        var p =
            jQuery("<div>").addClass("controls").addClass("pos1"),
            s = jQuery("<div>"),
            n = jQuery("<img>");
        return d
    };
    window.setAppLoadedStatus("nav_js_start");
    window.$ = window.jQuery;
    $(function() {
        var a = {};
        window.setAppLoadedStatus("nav_js_jQueryInit");
        var b = window.jQuery;
        jQuery.extend(a, {
            e: {},
            mode: "",
            ab: "",
            cb: o,
            Sd: o,
            va: 0,
            u: o,
            Ua: o,
            nextPage: "",
            aa: j,
            M: l,
            ja: 0,
            ha: o,
            Ga: o,
            qc: o,
            fd: m,
            Jb: l,
            Kb: l,
            hasFocus: o,
            K: -1,
            uc: o,
            wa: o,
            Eb: l,
            wb: o,
            Fb: o,
            webkit: o,
            j: "fixed",
            R: o,
            Fa: o,
            Wa: o,
            Lc: o,
            w: m,
            P: m,
            Hb: m,
            ce: m,
            be: l,
            Ma: {},
            Ac: o,
            $d: 0,
            ba: [],
            le: ["home/desktop"],
            Wc: "de,en,it,fr,tr,rs,ru,pl,pt,es".split(","),
            a: o,
            za: [],
            D: o,
            gb: o,
            z: o,
            Za: j,
            Wb: 0,
            Ra: o,
            Oa: l,
            ma: j,
            Pa: [],
            tb: o,
            la: 0,
            I: 0,
            Qa: 0,
            sb: 0,
            ub: 0,
            o: o,
            Na: "start",
            fb: {},
            gd: {
                MODE: 0,
                password: 0,
                submitted: 0,
                storeOnly: 0
            },
            page: {
                pa: ["#page1", "#page2"],
                Cc: ["#page1a", "#page2a"],
                bjk: ["#page1a", "#page3a"],
                H: 0,
                ka: 0,
                f: "home",
                d: "login",
                qb: "",
                rb: "",
                ic: 0,
                N: m,
                W: {},
                scroll: {},
                data: {},
                update: {},
                version: {}
            },
            p: {
                Va: o,
                ra: m,
                La: m
            },
            ia: {},
            qa: "none hidden in out top reverse slide fade dissolve flip slideup slidedown scroll swap cube pop slow",
            Q: {
                yb: [/^ticket\/\d+$/, /^account\/lasttransactions$/, /^account\/markapproved$/],
                zb: /@{((?:[^{}]+|{[^{}]+})+)}/,
                Zc: /[\r\n]+/g,
                Jd: /\s{2,}/g
            },
            global: {},
            Ia: {
                endlessScroll: function() {
                    var a = document.getElementById("endlessScroll_backToTop");
                    a && a.classList.remove("deactivated");
                    return ""
                },
                global: u(""),
                forcelogout: u(""),
                redirect: u(""),
                tableStart: function(a) {
                    return htmlTagOpen("table", {
                        "class": a
                    })
                },
                tableEnd: function() {
                    return htmlTagClose("table")
                },
                tableRowStart: function(a) {
                    return htmlTagOpen("tr", {
                        "class": a
                    })
                },
                tableRowEnd: function() {
                    return htmlTagClose("tr")
                },
                tableCell: function(a, b, f) {
                    b = {
                        "class": b
                    };
                    1 != f && (b.colspan = f);
                    return htmlTagOpen("td", b) + a + "</td>"
                },
                formOpen: function(a) {
                    return htmlTagOpen("form", {
                        onsubmit: "submitForm(this); return false;",
                        action: "#",
                        name: "form",
                        "class": "form",
                        id: a,
                        novalidate: "novalidate"
                    })
                },
                formOpenFileUpload: function(a, b) {
                    return htmlTagOpen("form", {
                        onsubmit: "submitForm(this); return false;",
                        action: b,
                        name: "uploadform",
                        "class": "form",
                        id: a,
                        enctype: "multipart/form-data",
                        method: "post"
                    })
                },
                formClose: function() {
                    return htmlTagClose("form")
                },
                divOpen: function(a, b, f) {
                    return htmlTagOpen("div", {
                        "class": b,
                        id: a,
                        onclick: f
                    })
                },
                divClose: function() {
                    return htmlTagClose("div")
                },
                rsGroupOpen: function(a, b, f) {
                    window.Ba != j && window.Ba[a] != j &&
                        (f = !window.Ba[a]);
                    a = '"' + a + '"';
                    return "<div class='rsGroupHeader mdetails" + (f ? " closed" : "") + "' onclick='minimizeRsGroup(this, " + a + ")'>" + b + "</div>" + ("<div id=" + a + " class='rsGroup'" + (f ? " style='display:none;'>" : ">"))
                },
                rsGroupClose: u("</div>")
            },
            Qd: {
                fixed: "iPhone OS 5,iPhone OS 6,iPhone OS 7,iPhone OS 8,iPhone OS 9,Desire HD,HTC_DesireHD".split(",")
            },
            te: function() {
                b("#reload").html("<span style='border:2px solid " + (a.M ? "green" : "red") + "'>reload</span>")
            },
            Zb: function(c) {
                "native" == a.e.scroll && nativeCall("setLoaded");
                a.M = o;
                b("#loading").html('<table width="100%" height="100%"><tr><td style="text-align:center;padding-top:140px;color:#ffffff">' + c + "</td></tr></table>");
                return o
            },
            Sc: function() {
                window.setAppLoadedStatus("nav_js_app.init");
                b.each(location.search.substring(1).split(/&/g), function(c, b) {
                    var g = b.split(/=/);
                    a.e[decodeURIComponent(g[0])] = decodeURIComponent(g[1])
                });
                var c = a.Xa();
                c && c.addEventListener("updateready", function() {
                    a.uc = l
                }, o);
                if(window.getTemplateMapping) a.ia = getTemplateMapping();
                else return a.Zb("");
                if("http:" == location.href.substring(0, 5)) return location.href = "https:" + location.href.substring(5), o;
                c = a.e.nativever;
                if(c != j && 1 > c) return a.Zb(i18n("mobile.native.toold"));
                a.webkit = a.k("WebKit");
                a.Eb = a.k("Chrome");
                a.wb = a.k("Android");
                a.supportsWebWorkerAndIsAndroidChrome = "serviceWorker" in navigator && a.Eb && isAndroidAndNoApp();
                a.supportsNotifications = a.supportsWebWorkerAndIsAndroidChrome && window.Notification;
                a.j = -1 != window.location.href.indexOf("native") ? "native" : a.k(a.Qd.fixed) ? "fixed" : 800 <= a.Pc() ? "fixed" :
                    "fixed";
                if(a.e.scroll) a.j = a.e.scroll;
                if("true" == a.e.notimer) a.M = o;
                if("native" == a.j) b(".appheader,.appfooter").hide(), b.ajax({
                    url: "ajax/native",
                    success: function(c) {
                        "register" == c ? y("deviceToken", a.e.deviceToken) : z("deviceToken")
                    },
                    context: window,
                    global: o,
                    async: o
                });
                else if(a.k("iPhone") || a.k("iPod"))
                    if(window.navigator.standalone === l) {
                        y("installed", "true");
                        a.K = 1;
                        if(c = w("currentPage")) window.location.hash = c;
                        if("entered" != window.name) a.Ac = l, window.name = "entered";
                        c = document.createElement("style");
                        c.type =
                            "text/css";
                        c.innerHTML = ".page { padding-top:14px; } .header { max-height:58px; } .appheader > div { padding-top:14px;}";
                        document.head.appendChild(c);
                        if(a.Vc()) a.wa = l, a.X(), b(window).resize(a.X).focusin(a.focusin).focusout(a.focusout)
                    } else a.j = "fixed", a.K = 0;
                else a.K = -1;
                b.ajaxSetup({
                    cache: o,
                    global: o,
                    context: a,
                    dataType: "json",
                    contentType: "application/json",
                    beforeSend: a.xc,
                    complete: a.yc,
                    error: a.zc
                });
                b("#page1")[0].addEventListener != j && (b("#page1")[0].addEventListener("webkitAnimationEnd", a.G, l), b("#page1")[0].addEventListener("webkitTransitionEnd",
                    a.G, l), b("#page2")[0].addEventListener("webkitAnimationEnd", a.G, l), b("#page2")[0].addEventListener("webkitTransitionEnd", a.G, l), b("#page1a")[0].addEventListener("webkitAnimationEnd", a.G, l), b("#page1a")[0].addEventListener("webkitTransitionEnd", a.G, l), b("#page2a")[0].addEventListener("webkitAnimationEnd", a.G, l), b("#page2a")[0].addEventListener("webkitTransitionEnd", a.G, l));
                a.e.iframe && b("body").addClass("iframe");
                "fixed" == a.j ? (c = b(".appheader,.appfooter"), c.css("left", "0px"), c.css("right", "0px"), c.css("z-index",
                    "100"), c.css("position", "fixed"), b(".appheader").css("top", "0px"), b(".appfooter").css("bottom", "0px"), a.e.iframe || b(".scroll_wrapper").css("padding-top", "44px").css("padding-bottom", "44px"), b(".block, #ajax table, #dialog table").css("position", "fixed")) : "native" == a.j ? (b(".block, #ajax table, #dialog table").css("position", "fixed"), b(".page").css("top", "0px"), b(".page").css("min-height", "100%")) : (b(".appheader").css("position", "static"), b(".appfooter").remove(), b(".page").css("top", "44px"));
                window.go =
                    a.go;
                window.onhashchange = a.bb;
                window.showAjax = a.q;
                window.hideAjax = a.Z;
                window.fadeoutAjax = a.Ib;
                window.historyback = function() {
                    if(!a.z && !a.R) {
                        a.mode = "";
                        if(a.a && a.O(b(window.event.target))) a.nextPage = a.page.d;
                        "payin/firstDeposit" == a.i() ? go("home") : a.a && -1 != a.nextPage.indexOf("account/") ? go("/account/") : !a.a && ("account/requestVerificationCode" == a.nextPage || "account/loginApproval" == a.nextPage) ? go("/account/") : "home" == a.nextPage ? go({}, "slide reverse slow") : (a.nb = l, history.go(-1))
                    }
                };
                window.addEventListener("orientationchange",
                    a.U, o);
                window.addEventListener("resize", a.U, o);
                a.U();
                a.md();
                a.compile();
                return l
            },
            X: function() {
                a.wa && (a.hasFocus ? body.classList.add("iosAppModeInputFocused") : body.classList.remove("iosAppModeInputFocused"))
            },
            focusin: function() {
                a.hasFocus = l;
                a.X()
            },
            focusout: function() {
                a.hasFocus = o;
                setTimeout(function() {
                    a.X()
                }, 0)
            },
            yd: function() {
                a.yd = t();
                a.X();
                b(".page").each(function(a, b) {
                    b.addEventListener("touchstart", function() {
                        if(0 >= b.scrollTop) b.scrollTop = 1;
                        if(b.scrollTop + b.offsetHeight >= b.scrollHeight) b.scrollTop =
                            b.scrollHeight - b.offsetHeight - 1
                    }, o)
                });
                setInterval(function() {
                    window.scrollActions()
                }, 200)
            },
            k: function(a) {
                if("string" == typeof a) return -1 != window.navigator.userAgent.search(a);
                for(var b = 0; b < a.length; b++)
                    if(-1 != window.navigator.userAgent.search(a[b])) return l;
                return o
            },
            Gd: function() {
                if(!("t/" == a.i().substr(0, 2) || "android" == a.i().substr(0, 7)) && !a.e.livescore && "false" !== a.L("install"))
                    if(newAndroidAppVersionReady()) {
                        var c = "mobile.install.android.update";
                        "-" != c && (c = c + "<br/><br/>" + img("android/download.png",
                            43, 46), showDialog(c, {
                            update: "mobile.install.android.update.button"
                        }, function(a) {
                            "update" == a && go("android-update")
                        }, "dialogUpdate"))
                    } else if(isAndroidAndNoApp()) {
                    if(showAndroidMessage() && !(50 > screen.height - document.documentElement.clientHeight) && (c = i18n("mobile.install.android.popup"), "-" != c)) {
                        var c = c + "<br/><br/>" + img("android/download.png", 43, 46),
                            b = i18n("mobile.install.android.homescreen.popup");
                        "-" != b && navigator.userAgent.match("Chrome") ? showDialog(c, {
                            android: i18n("mobile.install.button"),
                            homescreen: i18n("mobile.install.android.addToHomescreen"),
                            hide: i18n("mobile.install.android.hide"),
                            cancel: i18n("common.Cancel")
                        }, function(c) {
                            "android" == c && go("android");
                            "homescreen" == c && a.pc(b, "android");
                            "hide" == c && go("android?install=false")
                        }, "dialogAndroidApp") : showDialog(c, {
                            android: i18n("mobile.install.button"),
                            hide: i18n("mobile.install.android.hide"),
                            cancel: i18n("common.Cancel")
                        }, function(a) {
                            "android" == a && go("android");
                            "hide" == a && go("android?install=false")
                        }, "dialogAndroidApp")
                    }
                } else 0 == a.K && "native" != a.j && "false" != a.e.install && -1 != Object.prototype.toString.call(window.HTMLElement).indexOf("Constructor") &&
                    !navigator.userAgent.match("CriOS") && "ios" != window.nativAppOs && (c = i18n("mobile.install.popup"), a.pc(c, "ios"))
            },
            pc: function(a, d) {
                var f = "android" == d ? "#installAndroid" : "#install";
                "-" != a && (b(f + " .msg2").html(a), b(f).click(function() {
                    b(f).addClass("hidden")
                }), b(f).removeClass("hidden"))
            },
            Hd: function() {
                showFancyDialog(i18n("livescore.register.message.title"), i18n("livescore.register.message.sub"), "", {
                        "0": i18n("livescore.register.join"),
                        1: i18n("livescore.register.dontShowAgain"),
                        2: i18n("common.Cancel")
                    },
                    function(a) {
                        0 == a && go("login");
                        1 == a && y("lsRegDialog", "0")
                    })
            },
            ca: function() {
                if(!("native" != a.j || 1 == a.global.registeredDevice)) {
                    var c = w("deviceToken");
                    c != m && b.ajax({
                        data: {
                            deviceToken: c
                        },
                        url: "ajax/native/showDeviceRegisterDialog",
                        success: function(d) {
                            if("1" == d && !a.Ua) a.Ua = l, showDialog(i18n("native.registerDevice"), {
                                yes: i18n("common.Yes"),
                                later: i18n("common.NotNow"),
                                no: i18n("common.No")
                            }, function(a) {
                                "yes" == a ? b.ajax({
                                        data: {
                                            deviceToken: c
                                        },
                                        url: "ajax/native/registerDevice",
                                        context: window,
                                        global: o,
                                        async: o
                                    }) :
                                    "no" == a && b.ajax({
                                        url: "ajax/native/blockDialogForDevice",
                                        context: window,
                                        global: o,
                                        async: o
                                    })
                            }, "dialogRegisterDevice")
                        },
                        context: window,
                        global: o,
                        async: o
                    })
                }
            },
            hb: function() {
                a.na(a.b(), a.page.f + a.m(), o, "none");
                a.ea()
            },
            Ab: function(c) {
                function b(a, d) {
                    c != a && window.setTimeout(function() {
                        go(a, d)
                    }, 0)
                }
                var f = a.global.layerUrl;
                f && "/" == f.substring(0, 1) && (f = f.substring(1));
                if("true" != a.e.demo && !a.Fb && 1 == 1 * a.global.desktop && 0 == 1 * a.global.newDesktopDetection && (a.Fb = l, 0 != w("desktop"))) {
                    c = app.page.f;
                    "home/desktop" != c &&
                        y("noDesktopPage", c);
                    b("home/desktop");
                    return
                }
                if(0 == a.global.approved && 0 != a.global.active || a.global.showLastTransactions != j && 1 == a.global.showLastTransactions)
                    if(1 == a.global.swiss) b("account/swiss");
                    else {
                        var f = o,
                            g;
                        for(g in a.Q.yb)
                            if(a.Q.yb[g].test(c)) {
                                f = l;
                                break
                            } f || go("account/lasttransactions")
                    }
                else !("functionalities" == c && "layer/mobileAgreement" == f) && !("privacy-policy" == c && "layer/acceptPrivacyPolicyUpdate" == f) && f && c != f && f != window.Ec ? (window.Ec = f, b(a.global.layerUrl)) : 1 == 1 * a.global.deliverTicketAfterLogin &&
                    a.global.loggedIn ? (a.global.deliverTicketAfterLogin = 0, b("editor", {
                        reaction: "DELIVER"
                    })) : 1 == 1 * a.global.deliverTicketAfterLogin && window.setTimeout(function() {
                        go("editor", {
                            reaction: "DELIVER"
                        })
                    }, 0)
            },
            Qc: function() {
                return "number" == typeof window.innerWidth ? [window.innerWidth, window.innerHeight] : document.documentElement && (document.documentElement.clientWidth || document.documentElement.clientHeight) ? [document.documentElement.clientWidth, document.documentElement.clientHeight] : document.body && (document.body.clientWidth ||
                    document.body.clientHeight) ? [document.body.clientWidth, document.body.clientHeight] : [0, 0]
            },
            Pc: function() {
                var c = a.Qc();
                return c[0] < c[1] ? c[1] : c[0]
            },
            Uc: function() {
                return "native" == a.j || a.k("iPhone|iPod")
            },
            Vc: function() {
                return a.k("iPhone OS") && !a.k("Safari")
            },
            Pb: function() {
                var a = location.hash.substr(1);
                "!" == a.substr(0, 1) && (a = a.substr(1));
                return a
            },
            i: function(c) {
                if(c) return a.page.d;
                c = a.Pb();
                return a.ta() ? c.substr(3) : c
            },
            ta: function() {
                var c = a.Pb();
                if("/" == c.substr(2, 1)) return c.substr(0, 2)
            },
            Oc: function() {
                var c =
                    a.global.language || a.ta() || app.L("language") || navigator.language || navigator.ue,
                    c = c.substr(0, 2);
                return -1 == a.Wc.indexOf(c) ? "en" : c
            },
            fa: function(c) {
                if(!a.o && !a.h(c) && !a.u) location.hash = "#" + a.Oc() + "/" + c
            },
            t: function(c) {
                return a.h(c) ? a.page.d : a.page.f
            },
            jb: function(c) {
                a.h(c) ? a.page.d = c : a.page.f = c
            },
            Nd: function(c, b) {
                var f = 0,
                    g = c[b.current],
                    h = [{}, {}, {}, {}, {}];
                h[0].title = i18n("footer.home");
                h[0].action = "home";
                h[0].image = "home";
                h[0].value = -1;
                "sports" == g && (f = 1);
                h[1].title = i18n("site.bets");
                h[1].action = "sports/all";
                h[1].image = "sports";
                h[1].value = -1;
                if(a.global.loggedIn) {
                    "ticket" == g && (f = 2);
                    h[2].title = i18n("site.myBets");
                    h[2].action = "ticket/list";
                    h[2].image = "ticket";
                    h[2].value = 0 < a.global.ticketCount ? a.global.ticketCount : -1;
                    if("account" == g || "payin" == g || "payout" == g) f = 3;
                    h[3].title = i18n("site.account");
                    h[3].action = "account";
                    h[3].image = "EUR" == a.global.currency ? "euro" : "account";
                    h[3].value = isFooterBalanceVisible() ? a.global.accountBalance : -1
                } else "login" == g && (f = 2), h[2].title = i18n("site.login"), h[2].action = "login", h[2].image =
                    "login", h[2].value = -1, "information" == g && (f = 3), h[3].title = i18n("footer.info"), h[3].action = "information", h[3].image = "information", h[3].value = -1;
                "editor" == g && (f = 4);
                h[4].title = i18n("footer.betSlip");
                h[4].action = "editor";
                h[4].image = "editor";
                h[4].value = 0 < a.global.editorCount ? a.global.editorCount : -1;
                if("native" == a.j && a.w == m) a.Za = h, a.Wb = f, ma(h, f)
            },
            hc: function() {
                "native" == a.j && a.Za && ma(a.Za, a.Wb)
            },
            xc: function(c, b) {
                if(this != window && 0 != b.url.indexOf("http")) a.I++, a.Oa = l
            },
            yc: function(c, b) {
                if(!(a.o || this == window))
                    if(a.I--,
                        a.ma && clearTimeout(a.ma), a.ma = setTimeout(function() {
                            if(0 == a.I) {
                                a.ma = j;
                                a.Oa = o;
                                var c = a.Pa;
                                a.Pa = [];
                                for(var b in c) c[b]()
                            }
                        }, 250), "success" == b && a.la++, a.uc && "v" == ("" + a.global.version).substr(0, 1) && "v" == ("" + window.version).substr(0, 1) && a.global.version != window.version) {
                        var f = a.Xa();
                        f != j && f.status == f.UPDATEREADY && f.swapCache();
                        window.location.reload()
                    }
            },
            zc: function(c, b, f) {
                if(!(a.o || this == window) && !a.u)
                    if(a.ea(), a.Z(), a.nb) a.info("ajax error skipped!");
                    else if(0 != c.status)
                    if(0 == a.la) a.da();
                    else {
                        var g = "",
                            h = "";
                        f == j ? (g = c.status, h = c.statusText) : (g = b, h = f);
                        a.error("ajax request failed: " + g + " " + h + "!");
                        console.log("Request:", c);
                        console.log("Error:", f)
                    }
            },
            q: function() {
                if(a.tb) a.R = l, b("#ajax .msg").html(i18n("site.pleaseWait")), b("#ajax").removeClass("hidden"), window.setTimeout(function() {
                    a.R && (b("#ajax .window").addClass("fadein").removeClass("hidden"), window.setTimeout(function() {
                        a.R && b("#ajax .block").addClass("fadein50").removeClass("hidden")
                    }, 1E3))
                }, 750)
            },
            Z: function() {
                a.R = o;
                b("#ajax, #ajax .window, #ajax .block").addClass("hidden")
            },
            Ib: function() {
                b("#ajax .image").addClass("check");
                b("#ajax .msg").html(i18n("ticket.betSlipAccepted"));
                window.setTimeout(function() {
                    a.R = o;
                    b("#ajax .window").fadeOut(1E3, function() {
                        b("#ajax .window").fadeIn(0);
                        b("#ajax, #ajax .window, #ajax .block").addClass("hidden");
                        b("#ajax .image").removeClass("check")
                    })
                }, 1E3)
            },
            wd: function() {
                var c = w("scannedCard");
                c ? (z("scannedCard"), location.href = "#c/" + c) : (a.ja++, a.Ga = o, a.qc = o, a.M ? a.Ka(a.ja) : a.bb(), window.initServiceWorker())
            },
            setTimeout: function(c, b) {
                b == j && (b =
                    a.page.f + a.m());
                var f = a.page.update[b];
                f == j && (f = 2E3);
                0 < f && window.setTimeout(c, f)
            },
            ea: function() {
                a.ja++;
                var c = a.ja;
                a.M && a.setTimeout(function() {
                    a.Ga = o;
                    a.Ka(c)
                })
            },
            Ka: function(c) {
                if(!(a.o || a.ja != c) && a.M) {
                    if(!(0 == a.la && 0 != a.I)) {
                        if(a.Ga) {
                            a.qc = l;
                            return
                        }
                        if(!(document.activeElement != j && "INPUT" == document.activeElement.nodeName)) {
                            "logout" == a.i() ? a.navigate("", {
                                auto: 1
                            }, "skip", l) : (a.navigate(a.i(), {
                                auto: 1
                            }, "skip", l), a.setTimeout(function() {
                                a.Ka(c)
                            }));
                            return
                        }
                    }
                    window.setTimeout(function() {
                        a.Ka(c)
                    }, 1E3)
                }
            },
            G: function() {
                if(!a.p.Va) a.p.Va =
                    l, a.p.ra != m && a.p.La != m && a.xb(a.p.ra, a.p.La)
            },
            xb: function(c, d) {
                c.removeClass(a.qa);
                c.addClass("hidden");
                d.removeClass(a.qa);
                d.addClass("top");
                b("body").removeClass("animating");
                a.Ra = o
            },
            animate: function(c, d, f, g) {
                if("skip" != d) {
                    d == j && (d = "slide");
                    a.a && -1 < d.indexOf("slide") && 0 > d.indexOf("slideup") && 0 > d.indexOf("slidedown") && (d = -1 < d.indexOf("reverse") ? "slideup" : "slidedown");
                    var h = a.b(j, g);
                    a.h(g) ? (a.page.ka++, a.page.ka %= 2) : (a.page.H++, a.page.H %= 2);
                    var k = a.b(j, g);
                    a.p.Va = o;
                    a.p.ra = h;
                    a.p.La = k;
                    c = a.m(g, c);
                    f && a.page.data[g +
                        c] != j ? (a.na(k, g + c, o, d), a.Z()) : (a.q(), a.Da("content", "", g));
                    b("body").addClass("animating");
                    a.Ra = l;
                    h.removeClass(a.qa);
                    k.removeClass(a.qa);
                    k.show();
                    h.addClass(d + " out");
                    k.addClass(d + " top in");
                    ("none" == d || b.browser.mozilla) && a.xb(a.p.ra, a.p.La)
                }
            },
            U: function() {
                var c = w("showTwoColumnVersion");
                if(!("0" == c || a.e.livescore || "true" == a.L("FROM_OTHER_BRANDING")))
                    if(c = 630 < window.innerWidth || "1" == c, a.a != c) a.a = c, a.a ? (jQuery("body").addClass("twocol"), a.za = "android,account,bonus,bonusconditions,betting-glossary,ChampionsChallenge,contact,editor,firstPayin,functionalities,help,howto,imprint,information,limitsAndBlocks,continueLogin,login,News+Updates,payin,payment-methods,payout,personalDetails,preferences,privacy-policy,responsibility,support,terms,ticket,userDocumentUpload,usermessage".split(","),
                        c = a.i(), a.h(a.page.f) ? (go(a.page.f), go("home")) : c.startsWith("t/") ? go(c) : go(a.page.d)) : (jQuery("body").removeClass("twocol"), a.za = []), a.tc()
            },
            O: function(a) {
                return 0 < b(a).parents(".pagea").length
            },
            h: function(c) {
                if(!c) return o;
                for(var b = 0; b < a.za.length; b++)
                    if(-1 < c.indexOf(a.za[b])) return l;
                return o
            },
            g: function(c) {
                return c && a.h(c) ? a.page.Cc[a.page.ka] : a.page.pa[a.page.H]
            },
            b: function(c, d) {
                return c == j ? b(a.g(d)) : b(c, a.g(d))
            },
            oa: function(a, b, f, g) {
                for(var h in b)
                    if(typeof f[b[h]] == a) return f[b[h]];
                return g
            },
            wc: function(a) {
                for(var b = {}, a = a.substring(a.indexOf("?") + 1).split("&"), f = 0; f < a.length; f++) {
                    var g = a[f].split("=");
                    b[decodeURIComponent(g[0])] = decodeURIComponent(g[1])
                }
                return b
            },
            go: function() {
                if(!a.o)
                    if(a.z) a.hc();
                    else {
                        a.U();
                        var c = o;
                        if(window.event && a.a) var d = b(window.event.target),
                            c = c | a.O(d),
                            c = c | (0 < d.parents("#overlay").length && a.cb);
                            var f = a.oa("object", [0, 1], arguments, {}),
                            g = a.oa("boolean", [0, 1, 2, 3], arguments, l) != o,
                            h = a.oa("string", [0], arguments, a.i(c)),
                            k = a.oa("string", [1, 2, 3], arguments, j);
                        if(a.a &&
                            a.h(h) && "functionalities" == app.t()) a.hc();
                        else if(c = a.i(c), !(c == a.global.layerUrl && h.substr(0, a.global.layerUrl.length) != a.global.layerUrl || "account/swiss" == c && 1 == a.global.swiss && "account/markapproved" != h.substr(0, 20)))
                            if(a.Rb(), a.u) a.navigate(h, f, k, g);
                            else if(!a.D || !("payin" == h || "payout" == h)) {
                            a.h(h) ? a.ab = "" : a.mode = ""; - 1 < h.indexOf("login/register") && setTimeout(function() {
                                b("input,select").focus(function() {
                                    a.aa = jQuery(this).attr("name")
                                })
                            }, 3E3);
                            a.Lc = o;
                            c = window.event;
                            if(c != j && "click" == c.type) {
                                var d =
                                    b(c.target),
                                    q = d.closest("[onclick]");
                                if(0 != q.length && !q.hasClass("noselect")) {
                                    q.hasClass("tbicon") ? q.addClass("selected") : (q.toggleClass("selected"), window.setTimeout(function() {
                                        q.removeClass("selected")
                                    }, 200));
                                    window.setTimeout(function() {
                                        a.ua(h, f, k, g)
                                    }, 10);
                                    return
                                }
                            }
                            a.ua(h, f, k, g);
                            a.oc()
                        }
                    }
            },
            ua: function(c, b, f, g) {
                a.Jb = l;
                a.nb = o;
                (c != a.t(c) || b && b.showAjax) && a.q();
                a.Hb = a.w;
                a.w = m;
                a.navigate(c, b, f, g);
                a.i() != c && ("/" == c.substring(0, 1) && (c = c.substring(1)), a.fa(c))
            },
            bb: function() {
                if(!a.o) {
                    var c = a.i();
                    if(window.PAYOUT_BANK_PARAMS &&
                        "payout" == c) c = window.PAYOUT_BANK_PARAMS, window.PAYOUT_BANK_PARAMS.redirected = l, go("payout/select", {
                        type: c.type,
                        action: "selectType",
                        amountDisplay: c.amount,
                        url: "payout/bank"
                    });
                    else if(a.global.language != a.ta() || a.page.f != c && (!a.a || a.page.d != c)) a.Jb = l, a.nb = o, a.Vb = l, a.mode = "", hideDialog(), b(document.body).removeClass("noScroll"), a.navigate(c, {}, "slide reverse", l)
                }
            },
            bc: function() {
                a.bb();
                window.setTimeout(a.bc, 333)
            },
            sa: function(c, b) {
                return (a.h(c) ? a.page.d : a.page.f) + a.m(c, b)
            },
            navigate: function(c, d, f, g) {
                if(!a.o) {
                    a.Ga =
                        l;
                    a.fd = new Date;
                    "/" == c.substring(0, 1) && (c = c.substring(1));
                    if(a.Kb) {
                        a.Kb = o;
                        if(!navigator.cookieEnabled) return alert("Sie m\u00fcssen Cookies aktiviert haben!"), o;
                        if(a.Ic(c)) return
                    }
                    if(c == m || "" == c) c = app.e.livescore ? "sports/livescore" : "home";
                    var h = a.sa(c);
                    d == m && (d = {});
                    "userDocumentUpload" == c && window.canTakePicture && (d.canTakePicture = 1);
                    if(!a.u) {
                        a.Dd(c, d);
                        if(!a.h(c)) a.nextPage = c;
                        if(a.Hc(c)) return
                    }
                    if(a.t(c) == m) a.jb(c);
                    else if(!a.u) a.kd(), a.page.N = a.t(c), a.jb(c), h != a.sa(c, d) && a.animate(d, f, g, c);
                    ("" == a.i() ||
                        a.h(c)) && a.fa(a.page.f);
                    if(d.removeId) a.ya = a.ya || {}, a.ya[d.removeId] = l;
                    a.cd(a.b(j, c), c, d, g, a.u);
                    c = b(a.page.pa[a.page.H]).find(".scroll_container");
                    d = c.height() < b(window).height() && "fixed" == a.j;
                    c.css("min-height", d ? b(window).height() - 50 : "");
                    b(a.page.pa[a.page.H]).find(".contentbottomtext").css("padding-bottom", d ? "50px" : "")
                }
            },
            Hc: function(c) {
                return a.ya && c.match("usermessage/[0-9]") && a.ya[c.substr(12, c.length)] ? (history.go(-2), a.go("account", "slide reverse"), l) : o
            },
            Pd: function() {
                if("1" == eBetFeatures.testAppTitle) document.title =
                    "test";
                else {
                    var c = i18n("share.ogTitle");
                    if(document.title == c || document.title == j || 0 >= document.title.length) document.title = a.e.livescore ? "" : i18n("share.ogTitle")
                }
            },
            Nb: {
                home: ["home"],
                live: ["sports/live"],
                sportbets: ["sports/all"],
                casino: ["casino/home"],
                highlights: ["highlights"],
                favorites: ["sports/favorites"],
                login: ["login"],
                tickets: ["ticket/list"],
                account: ["account", "bonusconditions"],
                information: ["information"],
                preferences: ["preferences"],
                editor: ["editor"]
            },
            Ob: {
                home: ["sports/livescore"],
                live: ["sports/livescorerunning"],
                favorites: ["sports/favorites"],
                login: ["login"],
                valve: ["preferences"]
            },
            tc: function() {
                for(footerItem in a.e.livescore ? a.Ob : a.Nb) {
                    var c = a.e.livescore ? a.Ob[footerItem] : a.Nb[footerItem];
                    for(i in c) {
                        var d = c[i];
                        if(a.page.f.replace(/\/$/, "") == d || a.a && a.page.d.replace(/\/$/, "") == d) {
                            b(".appfooter ." + footerItem).addClass("selected");
                            break
                        } else b(".appfooter ." + footerItem).removeClass("selected")
                    }
                }
                jQuery(".footer .editorCount").hasClass("hidden") ? jQuery(".footer .editor").removeClass("orange") : jQuery(".footer .editor").addClass("orange")
            },
            $c: function(c) {
                var d = b(this).attr("href");
                if("#top" == d) a.zd(a.O(c.target));
                else if("#" == d.substring(0, 1)) a.lc(b('a[name="' + d.substring(1) + '"]'));
                else return l;
                return o
            },
            L: function(a, b) {
                if(!b) b = document.cookie;
                for(var f = b.split("; "), g = 0; g < f.length; g++) {
                    var h = f[g].split("=");
                    if(h[0] == a) return h[1]
                }
                return m
            },
            nc: function(a, b, f, g) {
                a = a + "=" + b;
                f && ("number" === typeof f && (f = new Date((new Date).getTime() + 6E4 * f)), a += ";expires=" + f.toUTCString());
                g && (a += ";path=" + g);
                document.cookie = a
            },
            Yd: function() {
                for(var a = document.cookie.split("; "),
                        b = [], f = 0; f < a.length; f++) b[b.length] = a[f].split("=")[0];
                return b
            },
            Cd: function(c, b) {
                c != b && (a.fa(a.i()), a.a && go(a.page.f))
            },
            Od: function() {
                var c = a.e.livescore ? "" : i18n("share.ogDescription"),
                    d = b("meta[name='description']"),
                    f = b("meta[property='og\\:description']");
                b("meta[property='og\\:title']").attr("content", a.e.livescore ? "" : i18n("share.ogTitle"));
                0 >= d.length ? b("head").append('<meta name="description" content="' + c + '">') : (d.attr("content") == f.attr("content") || d.attr("content") == j || 0 >= d.attr("content").length) &&
                    d.attr("content", c);
                f.attr("content", c)
            },
            Ed: function(a) {
                if(window.pb != a) window.pb = a, y("timeZone", a)
            },
            Cb: function(c) {
                a.ae = ["home"];
                resetInternational();
                a.Ua = o;
                z("username");
                z("password");
                var b = a.page,
                    f = b.data[c];
                b.data = {};
                b.data[c] = f;
                f = b.scroll[c];
                b.scroll = {};
                b.scroll[c] = f;
                f = b.update[c];
                b.update = {};
                b.update[c] = f;
                f = b.version[c];
                b.version = {};
                b.version[c] = f;
                deleteZopimUserData();
                a.da()
            },
            Gc: function() {
                for(var a = ["kd_token", "USER_DEVICE_ID", "hardwareCode"], b = document.cookie.split("; "), f = 0; f < b.length; f++) {
                    for(var g =
                            0, h = 0; h < a.length; h++) - 1 < b[f].indexOf(a[h]) && (g = 1);
                    if(!g)
                        for(g = window.location.hostname.split("."); 0 < g.length;) {
                            var h = encodeURIComponent(b[f].split(";")[0].split("=")[0]) + "=; expires=Thu, 01-Jan-1970 00:00:01 GMT; domain=" + g.join(".") + " ;path=",
                                k = location.pathname.split("/");
                            for(document.cookie = h + "/"; 0 < k.length;) document.cookie = h + k.join("/"), k.pop();
                            g.shift()
                        }
                }
            },
            Ic: function(a) {
                var d = w("username"),
                    f = w("password");
                if(d != m && f != m) {
                    var g = o;
                    b.ajax({
                        url: "ajax/loggedin",
                        success: function(a) {
                            0 == a && (g = l)
                        },
                        context: window,
                        global: o,
                        async: o
                    });
                    if(g != o) {
                        if(a == m || "" == a) a = "home";
                        go("login", {
                            username: d,
                            password: f,
                            from: a,
                            save: 1
                        }, "skip");
                        return l
                    }
                }
                return "" != a ? (go(a), l) : o
            },
            da: function(c) {
                z("page");
                z("currentPage");
                z("cookie");
                z("session");
                var b = w("LOGIN_AFTER_LOGOUT"),
                    f = w("PASSWORD_AFTER_LOGOUT"),
                    g = w("GO_TO_PAGE_AFTER_LOGIN");
                D();
                b && y("LOGIN_AFTER_LOGOUT", b);
                f && y("PASSWORD_AFTER_LOGOUT", f);
                g && y("GO_TO_PAGE_AFTER_LOGIN", g);
                document.cookie = "JSESSIONID=0; expires=" + (new Date(0)).toGMTString() + "; path=/";
                a.Gc();
                a.o = l;
                location.href =
                    c || "/" + location.search
            },
            Tc: function() {
                a.ub = a.Qa;
                var c = a.page;
                c.data = {};
                c.scroll = {};
                c.update = {};
                c.version = {};
                a.rc();
                go()
            },
            Dc: function() {
                var c = a.Xa();
                if(c && window.version != a.global.version) try {
                    c.update()
                } catch (b) {}
            },
            vc: function() {
                0 != a.la ? a.ld() : window.setTimeout(a.vc, 250)
            },
            ld: function() {
                b("#page1,#page2,#page1a,#page2a").removeClass("placeholder");
                b("#loading").fadeOut(1800, function() {
                    b("#loading").remove()
                });
                a.tb = l;
                a.D && "1" == eBetFeatures.retailNoTracking || ba();
                "simple" != a.j && b("head").append('<link type="text/css" rel="stylesheet" href="css/ani.css"/>'); -
                1 == a.K && a.bc();
                "native" == a.j && nativeCall("setLoaded");
                window.setAppLoadedStatus("appLoaded");
                "userDocumentUpload" != a.i() && ("0" == eBetFeatures.nativeAddToHomescreen || !app.supportsWebWorkerAndIsAndroidChrome) && app.Gd();
                "1" == a.e.livescore && !a.global.loggedIn && "0" != w("lsRegDialog") && app.Hd();
                "1" == eBetFeatures.mobileTheme && a.dd();
                a.a && go(a.page.d)
            },
            jd: function(c) {
                y("currentPage", c);
                var d = a.i(),
                    f = a.b(".scrollTo2:visible:first", c);
                0 == f.length && (f = a.b(".scrollTo:visible:first", c));
                if((!a.a || !a.h(c)) && !app.page.W[c]) {
                    var g =
                    document.getElementById("endlessScroll_backToTop");
                    g && g.classList.add("deactivated")
                }
                window.addMessageToLog("navigated to " + d);
                (a.Fa = 0 < f.length && -1 == d.indexOf("ticket/list")) ? a.kc(f): !app.page.W[c] && a.Hb != c && !a.k("iPhone OS 6") && !a.k("iPhone OS 7") && !a.k("iPhone OS 8") && !a.k("iPhone OS 9") && a.scrollTo(0, app.h(c));
                a.b("a", c).click(a.$c);
                a.rc();
                K = m;
                if(d != a.P) a.P = d;
                if("1" == a.global.loggedIn) {
                    if(window.ga && !window.sessionIdTracked && (c = a.global.encryptedSessionId)) window.sessionIdTracked = l, ga("set", "dimension7",
                        c);
                    window.notification.xa && window.notification.Bb()
                }
                if(window.PAYOUT_BANK_PARAMS && window.PAYOUT_BANK_PARAMS.redirected) c = window.PAYOUT_BANK_PARAMS, b("select[name ='ibanCountries'] option").removeAttr("selected"), b("select[name ='ibanCountries'] option[value='" + c.ibanCountry + "']").attr("selected", l), b("input[name ='bankName']").attr("value", c.bankName), b("input[name ='bic']").attr("value", c.bic), b("input[name ='iban']").attr("value", c.iban), window.PAYOUT_BANK_PARAMS = j;
                "true" == a.L("FROM_OTHER_BRANDING") &&
                    "true" != w("redirectWelcomeLayerShown") && showRedirectWelcomeLayer()
            },
            cc: function(c, d) {
                0 < b(a.g() + " #slider").length && setTimeout(function() {
                    initTopEventSlider()
                }, a.a ? 100 : 0);
                if(!a.me) {
                    "editor/delivered" == c && "/editor/delivered" != a.Na ? a.Ib() : a.Z();
                    var f = o;
                    if(a.w == m || a.w != d) f = l, a.w = d, a.jd(c, d);
                    a.D && "login/registerActivate" == a.page.N && "editor" == a.page.d && setTimeout(function() {
                        b(".pagea.top .appcontent > div:first-child").before('<div class="msgtext msgtextbg scrollTo"><div class="icons msg_warning"></div><div class="hidden"></div><div class="text">' +
                            i18n("register.Success.docUpload") + "</div></div>")
                    }, 500);
                    a.tc();
                    a.Rc();
                    "virtualsports" != c && window.vsmobile && window.vsmobile.instance && (console.log("leaveVirtualSports"), ea(), window.vsmobile && (console.log("vsmobile destroy"), window.vsmobile.instance.destroy()));
                    var g = a.h(c);
                    showOverlayElements(g);
                    if(a.Wa || !f && "" == a.m(c) && !a.Fa) a.Wa = o, f = a.page.scroll[c], f == j && (f = 0), (0 != window.pageXOffset || window.pageYOffset != f) && a.scrollTo(f, g);
                    g = K;
                    g != m && (f = a.b(g, c), 0 != f.length && toggleEditorRowAction(g, f.prev()[0]));
                    document.querySelector(".footer") && FastClick.attach(document.querySelector(".footer"));
                    a.oc(); - 1 < a.m(c).indexOf("showFullTopList") && scrollToAnchor("#" + a.m(c));
                    "home" == c && (g = document.querySelector(".topEventsBox")) && g.addEventListener("touchend", function(a) {
                        a.stopPropagation()
                    });
		    if(c=="sports/live")
		    {
		//	console.log(a.P);
		//	$("#page1,#page2").html(page1alive);
		    }

                    a.Vb && a.fromEventId && a.xd();
                    a.Vb = o
                }
            },
            oc: function() {
                a.e.livescore || (b("meta[property='og:title']").attr("content", a.global.ogTitle), b("meta[property='title']").attr("content", a.global.ogTitle), b("meta[property='og:url']").attr("content",
                    document.URL), b("meta[property='og:description']").attr("content", a.global.ogDescription), b("meta[property='description']").attr("content", a.global.ogDescription), b("meta[property='og:image']").attr("content", a.global.ogImgPath))
            },
            Rc: function() {
    



            },
            Gb: function() {
                b(".chat").addClass("hidden");
                b(".livechat").addClass("hidden")
            },
            kb: function() {
                document.querySelector(".icon.logo img").src = "img/chat.png";
                document.querySelector(".icon.logo img").style.paddingTop ="5px";
                document.querySelector(".icon.logo").onclick = function() {
                    window.$zopim && window.$zopim.livechat && $zopim.livechat.window.show()
                }
            },
            Bd: function() {
                document.querySelector(".icon.logo img").src = "img/logo.png";
                document.querySelector(".icon.logo img").style.paddingTop = "";
                document.querySelector(".icon.logo").onclick = function() {
                    go("home")
                }
            },
            kd: function() {
                a.Kd();
                var c = a.b('input[name="storeOnly"]');
                0 != c.length && "false" == c.attr("value") && (c.attr("value", "true"), submitForm(c.closest("form")[0], o), a.Y());
                if(a.aa !=
                    j && -1 < a.Na.indexOf("/login/register") && "terms" != a.nextPage && 0 > a.nextPage.indexOf("login/register")) "firstPayin" != a.page.f && "firstPayin" != a.page.d && registerTrackCancel(a.aa), a.aa = j;
                if(app.Uc() && ("ticket/list" == a.i() && "ticket/list" != a.P || "payment-methods" == a.i() && "payout" == a.P || "payin" == a.P)) b(".appcontent").css({
                    height: "100vh",
                    overflow: "hidden"
                }), b(".appcontent").on("touchstart", function() {
                    b(".appcontent").css({
                        height: "initial",
                        overflow: "initial"
                    })
                });
                a.jc()
            },
            jc: function() {
                var c = a.i();
                if("" == a.m(c)) a.page.scroll[c] =
                    window.pageYOffset
            },
            Kd: function() {
                a.va++
            },
            rc: function() {
                a.va++;
                a.Qb(1, 0, a.va)
            },
            Qb: function(c, d, f) {
                if(!(a.o || a.va != f) && !a.global.layerUrl) {
                    var g = 0;
                    if(0 < a.I) g = 250;
                    else {
                        var h = " .preload" + c + ":not(.hidden)",
                            h = b(".appfooter " + h + ", " + a.g() + " " + h);
                        if(0 == h.length) return;
                        d >= h.length ? (c++, d = 0) : (h = b(h[d]), a.u = l, h.click(), a.u = o, d++)
                    }
                    window.setTimeout(function() {
                        a.Qb(c, d, f)
                    }, g)
                }
            },
            Xa: function() {
                var a = b("html").attr("manifest");
                return a == j || "" == a ? j : window.applicationCache
            },
            md: function() {
                a.vc()
            },
            zd: function(c) {
                a.scrollTo(0,
                    c)
            },
            kc: function(c) {
                a.lc(c, window.innerHeight / 2 - c.height() / 2)
            },
            lc: function(c, d) {
                if(0 != c.length) {
                    c = b(c[0]);
                    d == j && (d = 0);
                    var f = a.O(c);
                    a.wa && (d -= app.b(j, f ? a.page.d : a.page.f).scrollTop() - 52);
                    a.scrollTo(Math.max(0, Math.floor(c.position().top - d)), f)
                }
            },
            scrollTo: function(c, b) {
                window.setTimeout(function() {
                    if(b) {
                        var f = document.querySelector(a.g(a.page.d) + " .scroll_container");
                        if(f) f.scrollTop = c
                    } else document.body.scrollTop = c, window.scrollTo(0, c)
                }, "sports/livescore" == a.page.f ? 500 : 0)
            },
            xd: function() {
                var c = setInterval(function() {
                    a.kc(jQuery("#e" +
                        a.fromEventId));
                    console.log("trying to scroll to " + a.fromEventId);
                    if(0 < window.scrollY) a.fromEventId = j, clearInterval(c)
                }, 100)
            },
            re: t(),
            Zd: function() {
                var c = {};
                for(key in a.nd) c[key] = a.nd[key];
                return c
            },
            m: function(c, b) {
                var f = a.a && a.h(c) ? a.ab : a.mode;
                return b == j || 0 == Object.keys(b).length ?
                    "" != f ? "" + f : "" : b.MODE != j ? "" + b.MODE : ""
            },
            Dd: function(c, b) {
                var f = a.m(c, b);
                a.h(c) ? a.ab = f : a.mode = f
            },
            Xd: function(a) {
                var b = {};
                if(a == j) return b;
                a.MODE != j && (b.MODE = a.MODE);
                return b
            },
            Y: function(c) {
                c || (c = a.page.f + a.m());
                delete a.page.version[c];
                delete a.page.update[c];
                delete a.page.data[c];
                delete a.page.scroll[c]
            },
            na: function(c, d, f, g) {
                a.vd = a.h(d);
                var c = a.page.data[d],
                    h = "",
                    k = "",
                    q = "";
                if(c == j) a.error("applyTemplates: data of url '" + d + "' not found!");
                else {
                    for(var p = 0; p < c.length; p++) {
                        var s = c[p].slice(),
                            n = s.shift();
                        if(a.Ia[n] == j) a.error("template '" + n + "' not found!");
                        else {
                            "footer" == n && a.Nd(s, a.ia[n]);
                            var r = a.Ia[n].apply(this, s);
                            if("header" == n) {
                                if("native" == a.j && a.w == m) {
                                    var s = s.shift(),
                                        n = backButtonEnabled(),
                                        E = i18n("common.Back");
                                    nativeCall("setHeader", [s, n, E, g])
                                }
                                h += r;
                                window.$a && (h = h.replace("img/logo.png", "img/chat.png"))
                            } else "footer" == n ? q += r : k += r
                        }
                    }
                    a.Da("header", h);
                    "virtualSports" != d && (k += '<div class="spacer">&nbsp;</div>');
                    a.Da("footer", q);
                    a.Da("content", k, d);
                    f && (f = a.g(d), a.cc(a.t(d), d, f, b(f)))
                }
		var full_url = document.URL;
		var url_array = full_url.split('#');
		var last_segment = url_array[url_array.length-1];
		// console.log(last_segment);
		if(last_segment=="tr/sports/live")
		{
		$("#page3a").attr("class", "page top");
		removelivespid();
		}else{
		$("#page3a").attr("class", "page top hidden");
		}

            },
            cd: function(c,d, f, g, h) {
                if(!a.o) {
                    var k = d.match("^c/([0-9A-F]+)$");
                    if(k) window.retail.mb(k[1]), app.ua("home");
                    else {
                        a.Ab(d);
                        var k = (new Date).getTime(),
                            q = a.sa(d, f);
                        if(!h && !("login" == d && "from" in f)) {
                            var p = "/" + d,
                                s = a.m(d, f);
                            s && (p += "/" + s);
                            if(f && "login/register" != d) {
                                var s = l,
                                    n;
                                for(n in f) n in a.gd || (p += (s ? "?" : "&") + n + "=" + f[n], s = o)
                            }
                            n = a.Na;
                            p = "/" + d; - 1 < p.indexOf("password", p.indexOf("?")) && (p = p.substring(0, p.indexOf("?")));
                            if(n != p) a.Na = p, F(p, o)
                        }
                        f.cv = window.version;
                        f.c = k;
                        "native" == a.j && (f.n = "1");
                        a.e.livescore && (f.l = "1");
                        a.D &&
                            (f.r = "1");
                        a.ba.length && (f.openedEvents = a.ba.toString());
                        if(h) {
                            if(a.page.data[q] != j) return;
                            f.plr = l
                        } else {
                            if(!g) a.ha = o;
                            if(a.ha && a.page.data[q] == j) a.ha = o;
                            if(a.ha) {
                                a.ha = o;
                                a.na(c, q, l, "none");
                                a.ea();
                                return
                            }
                        }
                        k = a.page.version[q];
                        g && k != j && (f.v = k);
                        (k = a.ta()) && k != a.global.language && (f.newLanguage = k);
                        a.Qa++;
                        var r = a.Qa; - 1 != app.page.N.indexOf("sports/event/") && -1 != d.indexOf("sports/search/") && (d += (-1 != d.indexOf("?") ? "&" : "?") + "fromDetail");
                        k = d;
                        if((n = "password" in f || "NewPassword" in f) && f.username) k += "?username=" +
                            encodeURI(f.username), f.username = j;
                        (p = a.page.W[k]) && !f.endlessScroll && (f.endlessScroll = p.ib || p.V);
                        if(p && f.endlessScroll < p.Sa) f.endlessScroll = p.Sa;
                        b.ajax({
                            url: "ajax/" + k,
                            async: "logout" != k,
                            dataType: "json",
                            data: f,
                            contentType: "application/x-www-form-urlencoded",
                            type: n ? "POST" : "GET",
                            success: function(k, n, p) {
                                -1 != p.getAllResponseHeaders().indexOf("x-logout") && (a.fa("sessionTimeout"), window.setTimeout(function() {
                                    window.location.reload()
                                }, 500));
                                (n = p.getResponseHeader("x-password-changed")) && window.parent.postMessage({
                                    type: "x-password-changed",
                                    login: n,
                                    password: f.NewPassword
                                }, window.origin);
                                if(!(r < a.ub)) "logout" == d && b("#pinDialog").hasClass("hidden") && window.location.reload(), n = o, r <= a.sb && (n = l), a.sb = r, a.hd(d, f, k, q, g, h ? l : n, n, c)
                            }
                        })
                    }
                }
            },
            hd: function(c, d, f, g, h, k, q, p) {
                if(!a.o) {
                    a.jc();
                    "logout" == c && a.Cb(g);
                    a.a && !k && !a.h(c) && "login/registerActivate" != a.page.d && ("logout" == c || a.global.loggedIn && ("login" == a.page.d || -1 < a.page.d.indexOf("login/"))) && go("editor");
                    if("editor" == c && a.a) {
                        if("editor" == a.page.d && (new Date).getTime() < a.page.ic) return;
                        if(d.ke !=
                            j) a.page.ic = (new Date).getTime() + 3E3
                    }
                    var s = function() {
                        d.callFunction && window[d.callFunction].apply(this, d.callFunctionArgs.split(/\s*,\s*/))
                    };
                    if(d.v == f || f == +f) a.ea(), a.Fa = l, a.cc(a.t(c), c), a.Fa = o, s();
                    else {
                        var n = f.shift(),
                            r = a.page.version[g];
                        h || (n = 0, r = j);
                        if(!(0 != n && r != j && n == r)) {
                            for(var E = 1E3 * f.shift(), r = 0; r < f.length; r++) {
                                var x = f[r];
                                if("object" == typeof x && "redirect" == x[0]) {
                                    k && !q && a.error("preload darf kein redirect machen!");
                                    a.h(c) && !a.h(x[1]) && go("editor");
                                    a.page.version[g] = n;
                                    c = x[1];
                                    "/" == c.substring(0,
                                        1) && (c = c.substring(1));
                                    if("http" == c.substring(0, 4)) {
                                        a.da(a.ud(c));
                                        return
                                    }
                                    g = c + a.m(c);
                                    n = x[2];
                                    a.w = m;
                                    a.jb(c);
                                    a.fa(c);
                                    break
                                }
                            }
                            a.page.version[g] = n;
                            a.page.update[g] = E;
                            a.page.data[g] = f;
                            for(r = 0; r < f.length; r++)
                                if(n = f[r], "object" == typeof n && "endlessScroll" == n[0] && !k) {
                                    E = a.page.W;
                                    x = n[1];
                                    if(E[g] && x < E[g].V) x = E[g].V;
                                    E[g] = {
                                        V: x,
                                        total: n[2],
                                        Sa: n[3]
                                    }
                                } if(!k || q) {
                                for(r = 0; r < f.length; r++) {
                                    n = f[r];
                                    if("object" == typeof n && "global" == n[0]) {
                                        var k = app.ia.global,
                                            q = app.global.language,
                                            H;
                                        for(H in k) app.global[H] = n[1 * k[H] + 1];
                                        a.Cd(q, app.global.language);
                                        a.Ed(app.global.pb);
                                        a.Dc();
                                        app.global.login && d.password && 1 == d.save && changeAutologinPassword(app.global.login, d.password)
                                    }
                                    "object" == typeof n && "forcelogout" == n[0] && a.Cb(g)
                                }
                                a.Ab(c);
                                a.ca();
                                a.sa(c, d) == g && (a.na(p, g, l, "none"), a.ea());
                                h || a.Y(g);
                                a.Pd();
                                a.Od();
                                s();
                                if(!a.o) {
                                    var I = w("GO_TO_PAGE_AFTER_LOGIN"),
                                        f = w("LOGIN_AFTER_LOGOUT"),
                                        g = w("PASSWORD_AFTER_LOGOUT");
                                    f ? (z("LOGIN_AFTER_LOGOUT"), z("PASSWORD_AFTER_LOGOUT"), go("login", {
                                        username: f,
                                        password: g
                                    })) : I != j ? (z("GO_TO_PAGE_AFTER_LOGIN"), setTimeout(function() {
                                            go(I)
                                        },
                                        1E3)) : a.a && "login/registerActivate" == a.page.d && "fillRegister" != a.page.f ? go("fillRegister") : a.a && !d.auto && !a.h(c) && b("#overlay").hasClass("hidden") && ("editor" == a.page.d || "ticket/list" == a.page.d || "login" == a.page.d) && "functionalities" != a.page.f && go(a.page.d)
                                }
                            }
                        }
                    }
                }
            },
            ud: function(a) {
                if(isAndroidNativeApp()) {
                    var b = app.e.demo,
                        f = app.e.client,
                        g = app.e.scroll,
                        h = document.createElement("a");
                    h.href = a;
                    h.search = "?demo=" + b + "&client=" + f + "&scroll=" + g;
                    return h
                }
                return a
            },
            dd: function() {
                b.ajax({
                    url: "ajax/getThemeBackground",
                    headers: {
                        Accept: "text/plain; charset=utf-8",
                        "Content-Type": "text/plain; charset=utf-8"
                    },
                    success: function(b) {
                        if(b && b.success) {
                            var d = new Image;
                            d.onload = function() {
                                document.getElementById("themeBackground").style.backgroundImage = "url('" + this.src + "')";
                                a.Rb()
                            };
                            d.src = b.backgroundImg
                        }
                    }
                })
            },
            Rb: function() {
                "home" == a.i() ? (document.body.classList.add("themeBackground"), document.body.classList.remove("notheme")) : document.body.classList.add("notheme")
            },
            Da: function(c, d, f) {
                if("footer" == c) b(".appfooter").html(d), window.J.Kc();
                else if("header" == c) b(".appheader").html(d);
                else {
                    var c = a.b(".app" + c + ":first", f),
                    g = b(".lmtContainer", c);
                    g.appendTo(".parkplatz");
                    c.html(d);
                    g && !a.h(f) && a.Jc(g, c)
                }
            },
            Jc: function(f, g) {
                var h = b(".lmtContainer", g);
                h.length && 0 < window.scoreboardId ? f.length && window.scoreboardIdOld == window.scoreboardId ? h.replaceWith(f) : (window.scoreboardIdOld = window.scoreboardId, eBetFeatures && "1" == eBetFeatures.useBetradarScoreboard && window.SRLive && (window.SRLive.addWidget("widgets.lmts", {
                    showScoreboard: app.global.livescore,
                    showMomentum: "1",
                    showMomentum2: "1",
                    momentum2_type: "line",
                    momentum2_showArea: "1",
                    showPitch: "1",
                    showSidebar: false,
                    showGoalscorers: false,
                    sidebarLayout: "dynamic",
                    collapse_enabled: "1",
                    collapse_startCollapsed: false,
                    matchId: window.scoreboardId,
                    showTitle: false,
                    container: ".lmtContainer"
                }), window.SRLive.languages.change("rs" != a.global.language ? a.global.language : "sr"))) : window.scoreboardIdOld = 0;
                b(".parkplatz").html("");
},
            Ld: function(b) {
                var d = a.a && window.event && app.O(window.event.target),
                    d = a.i(d),
                    f = b ? "slide slow" : "slide reverse slow";
                b ? "home" == d ? go("sports/live", f) : "sports/live" == d ? go(a.global.loggedIn ? "ticket/list" : "login", f) : "ticket/list" == d ? go("account", f) : "login" == d ? "1" == eBetFeatures.blockComponents ? go("information", f) : go("bonusconditions", f) : ("account" == d || "bonusconditions" == d || "information" ==
                    d) && go("editor", f) : "sports/live" == d ? go("home", f) : "ticket/list" == d || "login" == d ? go("sports/live", f) : "bonusconditions" == d || "information" == d ? go("login", f) : "account" == d ? go("ticket/list", f) : "editor" == d && go(a.global.loggedIn ? "account" : "1" == eBetFeatures.blockComponents ? "information" : "bonusconditions", f)
            },
            td: function(b, d, f) {
                b = b.replace(/\\'/g, "'");
                return b.replace(/([^a-zA-Z0-9_]+|^)(_[a-zA-Z0-9_]+)/g, function(b, c, k) {
                    k = k.substring(1);
                    if(d[k] == j) return a.Ma[f + "." + k] = o, c + "'[" + f + "." + k + "]'";
                    a.Ma[f + "." + k] = l;
                    return c +
                        "a[" + d[k].replace(".", "][") + "]"
                })
            },
            fc: function(c, d) {
                var f = b(d),
                    g = unescape(b(b("<div></div>").html(f.clone().removeAttr("id"))).html()).replace(/'/g, "\\'").replace(/&amp;/g, "&").replace(/&gt;/g, ">").replace(/&lt;/g, "<").replace(/&quot;/g, '"').replace(a.Q.Zc, " "),
                    f = f.attr("id").substr(4),
                    h = 0,
                    k = "var a=arguments;var f=window.app.format;return ''",
                    q = a.ia[f];
                if(q == j) a.error("template compiler: mapping for template '" + f + "' not found!");
                else {
                    for(; 0 < g.length;) {
                        var p = g.search(a.Q.zb);
                        if(-1 == p) break;
                        var s = g.match(a.Q.zb),
                            k = k + ("+'" + g.substr(0, p) + "'"),
                            g = g.substr(p + s[0].length);
                        s[1] == j ? a.error("template compiler: '{" + s[0] + "}' is not valid!") : k += "+f(" + a.td(s[1], q, f) + ")";
                        h++;
                        if(150 == h) {
                            a.error("template parsing error!");
                            break
                        }
                    }
                    k = (k + ("+'" + g + "';")).replace(a.Q.Jd, " ");
                    try {
                        a.Ia[f] = new Function(k)
                    } catch (n) {
                        a.info("Syntax Error processing " + f + ":" + n + " fnk:" + k)
                    }
                }
            },
            compile: function() {
                b("#templates > div").each(a.fc);
                b("#templates2 > div").each(a.fc);
                for(var c in a.Ma) a.Ma[c] || a.error("template compiler: '" + c + "' not found!");
                b("#templates").remove();
                b("#templates2").remove()
            },
            Nc: function(a) {
                return a == j ? "" : a
            },
            Td: 0,
            error: function(a) {
                window.console != j && window.console.info != j && window.console.info(a.replace(/<[^<>]*>/g, ""))
            },
            info: function(a) {
                window.console != j && window.console.info != j && window.console.info(a.replace(/<[^<>]*>/g, ""))
            },
            dir: t()
        });
        a.info = a.info;
        a.error = a.error;
        a.format = a.Nc;
        a.forceReload = a.Y;
        a.getScrollType = function() {
            return a.j
        };
        a.enableRetailMode = function() {
            a.D = l;
            jQuery("body").addClass("retail");
            a.U();
            a.Tc()
        };
        window.app = a;
        a.Sc() != o &&
            a.wd()
    });
    document.addEventListener("deviceready", function() {
        console.log("[Cordova | " + window.nativeAppOs + "] deviceready!");
        if("true" == window.nativeApp && (window.nfc.oe() && window.cordova.exec(window.nfc.ob, window.nfc.error, "NfcPlugin", "INIT", []), window.pushNotification = window.plugins.pd, "1" == app.global.loggedIn && window.notification.xa && window.notification.Bb(), w("PN_Action") && window.notification.ee(), navigator.splashscreen && navigator.splashscreen.hide(), window.Adjust)) {
            var a;
            "1" == eBetFeatures.livescoreAdjustProduction ? (a =
                new window.AdjustConfig("zbyqpsayltkh", window.AdjustConfig.EnvironmentProduction), a.setLogLevel(window.AdjustConfig.LogLevelWarn)) : (a = new window.AdjustConfig("zbyqpsayltkh", window.AdjustConfig.EnvironmentSandbox), a.setLogLevel(window.AdjustConfig.LogLevelVerbose));
            window.Adjust.create(a);
            a = new window.AdjustEvent("33qlo9");
            window.Adjust.trackEvent(a)
        }
    });
    document.addEventListener("resume", function() {
        console.log("[Cordova | " + window.nativeAppOs + "] app resumed!");
        "true" == window.nativeApp && window.cordova && window.cordova.exec(window.nfc.ob, window.nfc.error, "NfcPlugin", "INIT", [])
    }, o);
    window.setAppLoadedStatus("nav_js_end");
    window.goLoggedIn = function(a, b) {
        app.global.loggedIn ? go(a, {
            from: b
        }) : go("login", {
            from: b
        })
    };
})()