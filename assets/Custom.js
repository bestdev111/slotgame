$("#timeRange").slider({
    ticks: [0, 1, 2, 3, 4],
    ticks_labels: [localizedData._Today, `3 ${localizedData._Hourr}`, `24 ${localizedData._Hourr}`, `3 ${localizedData._Day}`, localizedData._All],
    min: 0,
    max: 4,
    step: 1,
});

function AddFavoritesCasino(e) {
    $.get("/Casino/FavoriteAddOrRemove?GameId=" + $(e).data("game"), function(d) {

        if ($(e).hasClass("far")) {
            $(e).removeClass("far");
            $(e).addClass("fas");
        } else {
            $(e).addClass("far");
            $(e).removeClass("fas");
        }
    })
}
$(document).ready(function() {

    $(".tglspan").on("click", function() {

        var txt = $(this).prev("._hdn").is(':visible') ? $(this).attr("data-text") : localizedData._MenuMes;
        $(this).closest("li").find(".tglspan").text(txt);

        $(this).closest("li").find("._hdn").slideToggle(200);
    });

    $(".sportsMenu").prepend('<ul class="spnB"><li class="spnnr"><i class="fas fa-spinner fa-spin"></i></li></ul>');

    $('.ancItem').append('<p class="text-right"><a class="totop" href="#top"><i class="fas fa-caret-up"></i> top</a></p>');





})





$(".searchBox .btn").click(function(e) {
    $(".searchBox").removeClass("pssv");
    var search = $("#SearchId").val();
    if (search != "")
        if (search.length >= 3)
            document.getElementById("FormSearch").submit();
        else {
            toastr.error(localizedData._TheTermYouAreLooking);
            e.preventDefault();
        }
    else
        return false;
});

$(".searchBox span").click(function() {
    $(".searchBox").addClass("pssv");
});


$(function() {
    $('[data-toggle="tooltip"]').tooltip()
})




$(".tgNext").click(function() {
    $(this).closest("tr").next("tr").find(".betListToggle").slideToggle("600", function() {});
    $(this).closest("tr").toggleClass("actvrow");
});


$(".acrTitle").click(function() {
    $(this).next(".acrdBox").slideToggle("600", function() {});
    // $(this).toggleClass("actv");


});



$('._1itemSlide').owlCarousel({
    loop: true,
    margin: 10,
    dots: true,
    autoplay: true,
    navigation: false,
    autoplayHoverPause: true,
    items: 1,

});


$('.rowCaro').owlCarousel({
    loop: $(".rowCaro .item").length > 6,
    margin: 10,
    dots: false,
    nav: true,
    navText: ["<i class='lnr lnr-chevron-left'></i>", "<i class='lnr lnr-chevron-right'></i>"],
    items: 6,
    slideBy: 5,
    responsive: {

        0: {
            items: 2
        },
        360: {
            items: 3,
            slideBy: 2,
        },
        768: {
            items: 5,
            slideBy: 3,
        },
        960: {
            items: 6,
            slideBy: 5,
        },
    }

});


$('.caro-rows .rowCaro').owlCarousel('destroy');
$('.caro-rows .rowCaro').owlCarousel({
    loop: $(".caro-rows .rowCaro .item").length > 6,
    margin: 5,
    dots: false,
    nav: true,
    navText: ["<i class='lnr lnr-chevron-left'></i>", "<i class='lnr lnr-chevron-right'></i>"],
    items: 6,
    slideBy: 5,
    responsive: {

        0: {
            items: 2
        },
        360: {
            items: 3,
            slideBy: 2,
        },
        768: {
            items: 5,
            slideBy: 3,
        },
        960: {
            items: 6,
            slideBy: 5,
        },
    }

});


$('.listCaro').owlCarousel({
    loop: $(".listCaro .item").length > 6,
    margin: 10,
    dots: false,
    nav: true,
    navText: ["<i class='lnr lnr-chevron-left'></i>", "<i class='lnr lnr-chevron-right'></i>"],
    items: 6,
    slideBy: 5,
    responsive: {

        0: {
            items: 2
        },
        360: {
            items: 3,
            slideBy: 2,
        },
        768: {
            items: 5,
            slideBy: 3,
        },
        960: {
            items: 6,
            slideBy: 5,
        },
    }

});

$('#CasinoName').owlCarousel('destroy');
$('#CasinoName').owlCarousel({
    loop: $("#CasinoName .item").length > 6,
    margin: 20,
    dots: false,
    nav: true,
    navText: ["<i class='lnr lnr-chevron-left'></i>", "<i class='lnr lnr-chevron-right'></i>"],
    autoWidth: true,
    slideBy: 5,
    responsive: {

        0: {
            items: 2
        },
        360: {
            items: 3,
            slideBy: 2,
        },
        768: {
            items: 5,
            slideBy: 3,
        },
        960: {
            items: 6,
            slideBy: 5,
        },
    }

});








$("#timeRange").change(function() {
    $(".sportsMenu").html('<ul class="spnB"><li class="spnnr"><i class="fas fa-spinner fa-spin"></i></li></ul>');
    GetSport();
});


$(".divclose").click(function() {
    $(this).closest(".modalTab").fadeOut(function() {
        $(this).remove();
    });
});



$(".pilbuttons a").click(function() {
    $(this).parent().find("a").removeClass("active");
    $(this).addClass("active");

    $(".mac_item .pilTable").removeClass("active");
    $(".mac_item .pilTable").attr("id", $(this).attr("data"));


});




//$(document).on('mouseenter', ".tdTipsTable .tdMac", function () {
//    var $this = $(this);
//    $this.tooltip({ title: $this.attr("data-tip"), placement: "bottom" });
//    $this.tooltip('show');
//});
//$(document).on('mouseleave', ".tdTipsTable .tdMac", function () {
//    var $this = $(this);
//    $this.tooltip({ title: '', placement: "bottom" });
//    $this.tooltip('hide');
//});







//#region String Op function
function TickConvertHour(val) {
    if (val == "0") {
        var d = new Date();
        var n = d.getHours();
        return (24 - n)
    }
    if (val == "1") {
        return "3"
    }
    if (val == "2") {
        return "24"
    }
    if (val == "3") {
        return "72"
    }
    if (val == "4") {
        return "0"
    }
}

function OPPSubstring(name) {
    return name.length > 17 ? name.substring(0, 17) + '...' : name;
}

function UndefChecker(data, type) {
    if (typeof data != 'undefined') {
        if (typeof data.oc_list.filter(function(a) {
                return a.oc_name == type
            })[0] != 'undefined') {
            let Type = data.oc_list.filter(function(a) {
                return a.oc_name == type
            })[0];
            var pointer = Type.oc_pointer.replaceAll("|", "").replaceAll(".", "");

            var Classupdown = CheckUpDownCouponClass(pointer, Type.oc_rate, 2);

            return '<span class="' + Classupdown + '">' + Type.oc_rate.toFixed(2) + '</span>';
        }
    }

    return "";
}

function UndefCheckerPointer(data, type, status) {
    if (typeof data != 'undefined') {
        if (typeof data.oc_list.filter(function(a) {
                return a.oc_name == type
            })[0] != 'undefined') {
            return status + '@' + data.oc_list.filter(function(a) {
                return a.oc_name == type
            })[0].oc_pointer;
        }
    }

    return "0";
}

function UndefCheckerForSpec(data, status) {
    if (typeof data != 'undefined') {
        return status + "@" + data.oc_pointer;
    }
    return "0"
}

function GetTotalScore(score) {
    var splitscore = score.split(';');
    var total = 0;
    for (var i = 0; i < splitscore.length; i++) {
        var period = splitscore[i].split(":");
        total += parseInt(period[0]) + parseInt(period[1]);
    }

    return total;

}
String.prototype.format = function() {
    a = this;
    for (k in arguments) {
        a = a.replace("{" + k + "}", arguments[k])
    }
    return a
}
$('#password, #confirm_password').on('keyup', function() {
    if ($('#password').val() == $('#confirm_password').val()) {
        $('#message').html(localizedData.PasswordMatch).css('color', 'green');
    } else
        $('#message').html(localizedData.PasswordWrong).css('color', 'red');
});

function ConvertNumber(number, format) {
    var tail = format.lastIndexOf('.');
    number = number.toString();
    tail = tail > -1 ? format.substr(tail) : '';
    if (tail.length > 0) {
        if (tail.charAt(1) == '#') {
            tail = number.substr(number.lastIndexOf('.'), tail.length);
        }
    }
    number = number.replace(/\..*|[^0-9]/g, '').split('');
    format = format.replace(/\..*/g, '').split('');
    for (var i = format.length - 1; i > -1; i--) {
        if (format[i] == '#') {
            format[i] = number.pop()
        }
    }
    return number.join('') + format.join('') + tail;
}
//#endregion



function GetFootballSoon() {
    var html = '<tr><th class="text-left"></th><th class="text-center">---</th><th class="text-center">1</th><th class="text-center">X</th><th class="text-center">2</th><th class="text-right" colspan="3"></th></tr>';
    $.get("/EventLine/FootballSoon", function(result) {
        for (var i = 0; i < result.length; i++) {
            var link = "window.open('https://s5.sir.sportradar.com/betradar/" + localizedData._langSec + "/2/match/" + result[i].statisticUrl + "','', 'width=1078,height=768')";
            var opp_1 = result[i].opp_1_name.length > 17 ? result[i].opp_1_name.substring(0, 17) + '...' : result[i].opp_1_name;
            var opp_2 = result[i].opp_2_name.length > 17 ? result[i].opp_2_name.substring(0, 17) + '...' : result[i].opp_2_name;
            html += ' <tr id="_adn_fbc" class="macRow" data-eventId="' + result[i].betId + '">';
            html += ' <td class="tdMin _will text-left">' + result[i].startDateFormat + '</td>';
            html += ' <td class="tdMac text-center"><span>' + opp_1 + '</span><b>-</b> <span>' + opp_2 + '</span></td>';
            html += ' <td class="tdBet _1 text-center"  onclick="AddCoupon(this)" pointerHub="' + result[i].game_oc_list[0].oc_list[0].oc_pointer.replaceAll("|", "").replaceAll(".", "") + '" data-pointer="line@' + result[i].game_oc_list[0].oc_list[0].oc_pointer + '" data="1"><span>' + result[i].game_oc_list[0].oc_list[0].oc_rate.toFixed(2) + '</span></td>';
            html += ' <td class="tdBet _x text-center" onclick="AddCoupon(this)" pointerHub="' + result[i].game_oc_list[0].oc_list[1].oc_pointer.replaceAll("|", "").replaceAll(".", "") + '" data-pointer="line@' + result[i].game_oc_list[0].oc_list[1].oc_pointer + '" data="1"><span>' + result[i].game_oc_list[0].oc_list[1].oc_rate.toFixed(2) + '</span></td>';
            html += ' <td class="tdBet _2 text-center"  onclick="AddCoupon(this)" pointerHub="' + result[i].game_oc_list[0].oc_list[2].oc_pointer.replaceAll("|", "").replaceAll(".", "") + '" data-pointer="line@' + result[i].game_oc_list[0].oc_list[2].oc_pointer + '" data="1"><span>' + result[i].game_oc_list[0].oc_list[2].oc_rate.toFixed(2) + '</span></td>';
            html += ' <td class="td_iButs text-center" colspan="2">';
            html += `<a class="ibutRef"><i class="fas fa-user"></i></a> <a class="ibutRef ${SignalClass(result[i].statisticUrl)}"><i  class="fas fa-signal" onclick="${link}"></i></a></a> <a class="ibutRef">LIVE</a> </td>`;
            html += '<td class="tdBet  border-left text-center"><a href="javascript:GetLineOdds(' + result[i].betId + ')" style="color: inherit;" class="tgNext">+' + result[i].betCount + '</a></td>   <tr class="tglRow">  <td colspan="8"> <div class="betListToggle" id="line_' + result[i].betId + '" style="display:none"><img class="rounded mx-auto d-block" src="/img/loaderEvent.gif" /></tr></div>';
        }
        $("#footballSoon").html(html);
    }).done(function() {
        $(".tgNext").unbind();
        $(".tgNext").click(function() {

            $(this).closest("tr").next("tr").find(".betListToggle").slideToggle("600", function() {});
            $(this).closest("tr").toggleClass("actvrow");
        });
    })
}

function SignalClass(id) {
    if (id == "" || id == null)
        return "signalDisabled"
    return "";
}

function ReplaceAllGameDesk(desk) {
    return desk.replace("Devre arası", localizedData._halfLive).replace("devre arası", localizedData._halfLive).replace("Çeyrek", "P").replace("çeyrek", "P").replace(". Set", ".S").replace("İnning", "IN.").replace("inning", "IN.").replace("Inning", "IN.").replace("Raunt", "R").replace("çeyrek", "P").replace("raunt", "R").replace("frame", "F").replace("Frame", "F").replace("Uzatmalar", "UZ").replace("uzatmalar", "UZ").replace("Harita", "Map").replace("harita", "Map");
}

function GetHomeLive() {
    $.get("/EventLive/HomeEvents", function(result) {
        var HtmlFootball = `<tr> <th class="text-left">${localizedData._Hour}</th><th class="text-center">---</th><th class="text-center">1</th><th class="text-center">X</th><th class="text-center">2</th><th class="text-right" colspan="3">${localizedData._TimeRemaining1} &nbsp;</th></tr>`;
        var HtmlBasketball = `<tr> <th class="text-left">${localizedData._Hour}</th><th class="text-center">---</th> <th class="text-center">1</th><th class="text-center">X</th> <th class="text-center">2</th> <th class="text-right" colspan="3">${localizedData._TimeRemaining1}  &nbsp;</th> </tr>`;
        var HtmlVolleyball = `<tr> <th class="text-left">${localizedData._Hour}</th><th class="text-center">---</th> <th class="text-center">1</th><th class="text-center">2</th> <th class="text-right" colspan="3">${localizedData._TotalTop}</th><th class="text-right" colspan="3">${localizedData._Score}  &nbsp;</th> </tr>`;
        var HtmlTennis = `<tr> <th class="text-left">${localizedData._Hour}</th><th class="text-center">---</th> <th class="text-center">1</th> <th class="text-center">2</th> <th class="text-right" colspan="3">${localizedData._TotalTop}</th><th class="text-right" colspan="3">${localizedData._Score}  &nbsp;</th> </tr>`;
        for (var i = 0; i < result.football.length; i++) {
            var footballdata = result.football[i];

            var GFDesk = footballdata.isHalfTime ? ReplaceAllGameDesk(footballdata.game_desk) : footballdata.timer + footballdata.extra_time + '\x27';
            var OCGroup = footballdata.game_oc_list.filter(function(a) {
                return a.group_id == "1"
            })[0]
            var OcGroup2 = footballdata.game_oc_list.filter(function(a) {
                return a.group_id == "17"
            })[0]
            HtmlFootball += '<tr id="' + footballdata.betId + '" class="macRow">    ';
            HtmlFootball += '<td class="tdMin">' + GFDesk + '</td>   ';
            HtmlFootball += '<td class="tdMac text-center"><span><a href="/EventLive/Detail?g=' + footballdata.betId + '" style="color: inherit;text-decoration: inherit;"> ' + OPPSubstring(footballdata.opp_1_name) + '</span><b>' + footballdata.score_full + '</b><span>' + OPPSubstring(footballdata.opp_2_name) + '</a></span></td>  ';
            HtmlFootball += '<td class="tdBet _1 text-center" onclick="AddCoupon(this)" pointerHub="' + UndefCheckerPointer(OCGroup, "1", "@").replace("@@", "").replaceAll("|", "").replaceAll(".", "") + '" data-pointer="' + UndefCheckerPointer(OCGroup, "1", "live") + '">' + UndefChecker(OCGroup, "1") + '</td>   ';

            HtmlFootball += '<td class="tdBet _x text-center" onclick="AddCoupon(this)"pointerHub="' + UndefCheckerPointer(OCGroup, "X", "@").replace("@@", "").replaceAll("|", "").replaceAll(".", "") + '"  data-pointer="' + UndefCheckerPointer(OCGroup, "X", "live") + '">' + UndefChecker(OCGroup, "X") + '</td>    ';

            HtmlFootball += '<td class="tdBet _2 text-center" onclick="AddCoupon(this)" pointerHub="' + UndefCheckerPointer(OCGroup, "2", "@").replace("@@", "").replaceAll("|", "").replaceAll(".", "") + '"  data-pointer="' + UndefCheckerPointer(OCGroup, "2", "live") + '">' + UndefChecker(OCGroup, "2") + '</td>    ';
            if (typeof OcGroup2 != 'undefined') {
                var UPORDOWN = OcGroup2.oc_list[0];
                var SplitData = UPORDOWN.oc_pointer.split('|');
                var UP = "";
                var DOWN = "";
                if (SplitData[2] == "9") {
                    UP = UPORDOWN;
                } else {
                    DOWN = UPORDOWN;
                }
                if (UP == "") {
                    UP = OcGroup2.oc_list.filter(function(a) {
                        return a.oc_pointer == SplitData[0] + '|' + SplitData[1] + '|' + "9" + '|' + SplitData[3]
                    })[0]
                }
                if (DOWN == "") {
                    DOWN = OcGroup2.oc_list.filter(function(a) {
                        return a.oc_pointer == SplitData[0] + '|' + SplitData[1] + '|' + "10" + '|' + SplitData[3]
                    })[0]
                }
                var ClassupCheck = CheckUpDownCouponClass(UndefCheckerForSpec(UP, "@").replace("@@", "").replaceAll("|", "").replaceAll(".", ""), typeof UP != "undefined" ? UP.oc_rate : "", 2);
                var ClassDownCheck = CheckUpDownCouponClass(UndefCheckerForSpec(DOWN, "@").replace("@@", "").replaceAll("|", "").replaceAll(".", ""), typeof DOWN != "undefined" ? DOWN.oc_rate : "", 2);
                HtmlFootball += '	<td class="td_rBet"><span> ' + SplitData[3] + '</span></td>';
                HtmlFootball += '	<td class="tdBet  _r1 ustalt text-center" onclick="AddCoupon(this)" pointerHub="' + UndefCheckerForSpec(UP, "@").replace("@@", "").replaceAll("|", "").replaceAll(".", "") + '" data-pointer="' + UndefCheckerForSpec(UP, "live") + '">' + (typeof UP != "undefined" ? ('<span class="' + ClassupCheck + '">' + UP.oc_rate.toFixed(2) + '</span>') : "") + '</td>';
                HtmlFootball += '	<td class="tdBet  _r2 ustalt text-center" onclick="AddCoupon(this)" pointerHub="' + UndefCheckerForSpec(DOWN, "@").replace("@@", "").replaceAll("|", "").replaceAll(".", "") + '" data-pointer="' + UndefCheckerForSpec(DOWN, "live") + '">' + (typeof DOWN != "undefined" ? ('<span class="' + ClassDownCheck + '">' + DOWN.oc_rate.toFixed(2) + '</span>') : "") + '</td>';
                HtmlFootball += '</tr> ';

            } else {
                HtmlFootball += '<td class="td_rBet"></td>	<td class="tdBet  _r1 ustalt text-center" data="+"></td><td class="tdBet  _r2 ustalt text-center" data="-"></td></tr> ';
            }

        }
        for (var i = 0; i < result.basketball.length; i++) {
            var basketballdata = result.basketball[i];
            var GFDesk = basketballdata.game_desk;
            var OCGroup = basketballdata.game_oc_list.filter(function(a) {
                return a.group_id == "2766"
            })[0]
            var OcGroup2 = basketballdata.game_oc_list.filter(function(a) {
                return a.group_id == "17"
            })[0]
            HtmlBasketball += '<tr id="' + basketballdata.betId + '" class="macRow">    ';
            HtmlBasketball += ' <td class="tdMin">' + GFDesk + '</td>';
            HtmlBasketball += '<td class="tdMac text-center"><span><a href="/EventLive/Detail?g=' + basketballdata.betId + '" style="color: inherit;text-decoration: inherit;"> ' + OPPSubstring(basketballdata.opp_1_name) + '</span><b>' + basketballdata.score_full + '</b><span>' + OPPSubstring(basketballdata.opp_2_name) + '</a></span></td>  ';
            HtmlBasketball += '<td class="tdBet _1 text-center" onclick="AddCoupon(this)" pointerHub="' + UndefCheckerPointer(OCGroup, "1 Normal Sürede", "@").replace("@@", "").replaceAll("|", "").replaceAll(".", "") + '" data-pointer="' + UndefCheckerPointer(OCGroup, "1 Normal Sürede", "live") + '">' + UndefChecker(OCGroup, "1 Normal Sürede") + '</td>   ';
            HtmlBasketball += '<td class="tdBet _x text-center"onclick="AddCoupon(this)" pointerHub="' + UndefCheckerPointer(OCGroup, "X Normal Sürede", "@").replace("@@", "").replaceAll("|", "").replaceAll(".", "") + '" data-pointer="' + UndefCheckerPointer(OCGroup, "X Normal Sürede", "live") + '">' + UndefChecker(OCGroup, "X Normal Sürede") + '</td>    ';
            HtmlBasketball += '<td class="tdBet _2 text-center" onclick="AddCoupon(this)" pointerHub="' + UndefCheckerPointer(OCGroup, "2 Normal Sürede", "@").replace("@@", "").replaceAll("|", "").replaceAll(".", "") + '" data-pointer="' + UndefCheckerPointer(OCGroup, "2 Normal Sürede", "live") + '">' + UndefChecker(OCGroup, "2 Normal Sürede") + '</td>    ';
            if (typeof OcGroup2 != 'undefined') {
                var UPORDOWN = OcGroup2.oc_list[0];
                var SplitData = UPORDOWN.oc_pointer.split('|');
                var UP = "";
                var DOWN = "";
                if (SplitData[2] == "9") {
                    UP = UPORDOWN;
                } else {
                    DOWN = UPORDOWN;
                }
                if (UP == "") {
                    UP = OcGroup2.oc_list.filter(function(a) {
                        return a.oc_pointer == SplitData[0] + '|' + SplitData[1] + '|' + "9" + '|' + SplitData[3]
                    })[0]
                }
                if (DOWN == "") {
                    DOWN = OcGroup2.oc_list.filter(function(a) {
                        return a.oc_pointer == SplitData[0] + '|' + SplitData[1] + '|' + "10" + '|' + SplitData[3]
                    })[0]
                }
                var ClassupCheck = CheckUpDownCouponClass(UndefCheckerForSpec(UP, "@").replace("@@", "").replaceAll("|", "").replaceAll(".", ""), typeof UP != "undefined" ? UP.oc_rate : "", 2);
                var ClassDownCheck = CheckUpDownCouponClass(UndefCheckerForSpec(DOWN, "@").replace("@@", "").replaceAll("|", "").replaceAll(".", ""), typeof DOWN != "undefined" ? DOWN.oc_rate : "", 2);
                HtmlBasketball += '	<td class="td_rBet"><span> ' + SplitData[3] + '</span></td>';
                HtmlBasketball += '	<td class="tdBet  _r1 ustalt text-center"onclick="AddCoupon(this)" pointerHub="' + UndefCheckerForSpec(UP, "@").replace("@@", "").replaceAll("|", "").replaceAll(".", "") + '" data-pointer="' + UndefCheckerForSpec(UP, "live") + '">' + (typeof UP != "undefined" ? ('<span class="' + ClassupCheck + '">' + UP.oc_rate.toFixed(2) + '</span>') : "") + '</td>';
                HtmlBasketball += '	<td class="tdBet  _r2 ustalt text-center" onclick="AddCoupon(this)" pointerHub="' + UndefCheckerForSpec(DOWN, "@").replace("@@", "").replaceAll("|", "").replaceAll(".", "") + '" data-pointer="' + UndefCheckerForSpec(DOWN, "live") + '">' + (typeof DOWN != "undefined" ? ('<span class="' + ClassDownCheck + '">' + DOWN.oc_rate.toFixed(2) + '</span>') : "") + '</td>';
                HtmlBasketball += '</tr> ';

            } else {
                HtmlBasketball += '<td class="td_rBet"></td>	<td class="tdBet  _r1 ustalt text-center" data="+"></td><td class="tdBet  _r2 ustalt text-center" data="-"></td></tr> ';
            }

        }
        for (var i = 0; i < result.volleyball.length; i++) {
            var volleyballdata = result.volleyball[i];
            var GFDesk = volleyballdata.game_desk;
            var OCGroup = volleyballdata.game_oc_list.filter(function(a) {
                return a.group_id == "1"
            })[0]
            var OcGroup2 = volleyballdata.game_oc_list.filter(function(a) {
                return a.group_id == "17"
            })[0]
            HtmlVolleyball += '<tr id="' + volleyballdata.betId + '" class="macRow">    ';
            HtmlVolleyball += ' <td class="tdMin">' + GFDesk + '</td>';
            HtmlVolleyball += '<td class="tdMac text-center"><span><a href="/EventLive/Detail?g=' + volleyballdata.betId + '" style="color: inherit;text-decoration: inherit;"> ' + OPPSubstring(volleyballdata.opp_1_name) + '</span><b>' + volleyballdata.score_full + '</b><span>' + OPPSubstring(volleyballdata.opp_2_name) + '</a></span></td>  ';
            HtmlVolleyball += '<td class="tdBet _1 text-center" onclick="AddCoupon(this)" pointerHub="' + UndefCheckerPointer(OCGroup, "1", "@").replace("@@", "").replaceAll("|", "").replaceAll(".", "") + '" data-pointer="' + UndefCheckerPointer(OCGroup, "1", "live") + '"   dataBetId="' + volleyballdata.betId + '">' + UndefChecker(OCGroup, "1") + '</td>   ';

            HtmlVolleyball += '<td class="tdBet _1 text-center" onclick="AddCoupon(this)" pointerHub="' + UndefCheckerPointer(OCGroup, "2", "@").replace("@@", "").replaceAll("|", "").replaceAll(".", "") + '" data-pointer="' + UndefCheckerPointer(OCGroup, "2", "live") + '"   dataBetId="' + volleyballdata.betId + '">' + UndefChecker(OCGroup, "2") + '</td>   ';
            if (typeof OcGroup2 != 'undefined') {
                var UPORDOWN = OcGroup2.oc_list[0];
                var SplitData = UPORDOWN.oc_pointer.split('|');
                var UP = "";
                var DOWN = "";
                if (SplitData[2] == "9") {
                    UP = UPORDOWN;
                } else {
                    DOWN = UPORDOWN;
                }
                if (UP == "") {
                    UP = OcGroup2.oc_list.filter(function(a) {
                        return a.oc_pointer == SplitData[0] + '|' + SplitData[1] + '|' + "9" + '|' + SplitData[3]
                    })[0]
                }
                if (DOWN == "") {
                    DOWN = OcGroup2.oc_list.filter(function(a) {
                        return a.oc_pointer == SplitData[0] + '|' + SplitData[1] + '|' + "10" + '|' + SplitData[3]
                    })[0]
                }
                var ClassupCheck = CheckUpDownCouponClass(UndefCheckerForSpec(UP, "@").replace("@@", "").replaceAll("|", "").replaceAll(".", ""), typeof UP != "undefined" ? UP.oc_rate : "", 2);
                var ClassDownCheck = CheckUpDownCouponClass(UndefCheckerForSpec(DOWN, "@").replace("@@", "").replaceAll("|", "").replaceAll(".", ""), typeof DOWN != "undefined" ? DOWN.oc_rate : "", 2);
                HtmlVolleyball += '	<td class="td_rBet"><span> ' + SplitData[3] + '</span></td>';
                HtmlVolleyball += '	<td class="tdBet  _r1 ustalt text-center" onclick="AddCoupon(this)" pointerHub="' + UndefCheckerForSpec(UP, "@").replace("@@", "").replaceAll("|", "").replaceAll(".", "") + '" data-pointer="' + UndefCheckerForSpec(UP, "live") + '">' + (typeof UP != "undefined" ? ('<span class="' + ClassupCheck + '">' + UP.oc_rate.toFixed(2) + '</span>') : "") + '</td>';
                HtmlVolleyball += '	<td class="tdBet  _r2 ustalt text-center" onclick="AddCoupon(this)" pointerHub="' + UndefCheckerForSpec(DOWN, "@").replace("@@", "").replaceAll("|", "").replaceAll(".", "") + '" data-pointer="' + UndefCheckerForSpec(DOWN, "live") + '">' + (typeof DOWN != "undefined" ? ('<span class="' + ClassDownCheck + '">' + DOWN.oc_rate.toFixed(2) + '</span>') : "") + '</td>';
                HtmlVolleyball += '	<td class="td_rBet"><span> ' + GetTotalScore(volleyballdata.score_period) + '</span></td>';
                HtmlVolleyball += '</tr> ';

            } else {
                HtmlVolleyball += '<td class="td_rBet"></td>	<td class="tdBet  _r1 ustalt text-center" data="+"></td><td class="tdBet  _r2 ustalt text-center" data="-"></td>	<td class="td_rBet"><span> ' + GetTotalScore(volleyballdata.score_period) + '</span></td></tr> ';
            }

        }
        for (var i = 0; i < result.tennis.length; i++) {
            var tennisdata = result.tennis[i];
            var GFDesk = tennisdata.game_desk;
            var OCGroup = tennisdata.game_oc_list.filter(function(a) {
                return a.group_id == "1"
            })[0]
            var OcGroup2 = tennisdata.game_oc_list.filter(function(a) {
                return a.group_id == "17"
            })[0]
            HtmlTennis += '<tr id="' + tennisdata.betId + '" class="macRow">    ';
            HtmlTennis += ' <td class="tdMin">' + GFDesk + '</td>';
            HtmlTennis += '<td class="tdMac text-center"><span><a href="/EventLive/Detail?g=' + tennisdata.betId + '" style="color: inherit;text-decoration: inherit;"> ' + OPPSubstring(tennisdata.opp_1_name) + '</span><b>' + tennisdata.score_full + '</b><span>' + OPPSubstring(tennisdata.opp_2_name) + '</a></span></td>  ';
            HtmlTennis += '<td class="tdBet _1 text-center" onclick="AddCoupon(this)"  pointerHub="' + UndefCheckerPointer(OCGroup, "1", "@").replace("@@", "").replaceAll("|", "").replaceAll(".", "") + '" data-pointer="' + UndefCheckerPointer(OCGroup, "1", "live") + '">' + UndefChecker(OCGroup, "1") + '</td>   ';
            HtmlTennis += '<td class="tdBet _2 text-center" onclick="AddCoupon(this)" pointerHub="' + UndefCheckerPointer(OCGroup, "2", "@").replace("@@", "").replaceAll("|", "").replaceAll(".", "") + '" data-pointer="' + UndefCheckerPointer(OCGroup, "2", "live") + '">' + UndefChecker(OCGroup, "2") + '</td>    ';
            if (typeof OcGroup2 != 'undefined') {
                var UPORDOWN = OcGroup2.oc_list[0];
                var SplitData = UPORDOWN.oc_pointer.split('|');
                var UP = "";
                var DOWN = "";
                if (SplitData[2] == "9") {
                    UP = UPORDOWN;
                } else {
                    DOWN = UPORDOWN;
                }
                if (UP == "") {
                    UP = OcGroup2.oc_list.filter(function(a) {
                        return a.oc_pointer == SplitData[0] + '|' + SplitData[1] + '|' + "9" + '|' + SplitData[3]
                    })[0]
                }
                if (DOWN == "") {
                    DOWN = OcGroup2.oc_list.filter(function(a) {
                        return a.oc_pointer == SplitData[0] + '|' + SplitData[1] + '|' + "10" + '|' + SplitData[3]
                    })[0]
                }
                var ClassupCheck = CheckUpDownCouponClass(UndefCheckerForSpec(UP, "@").replace("@@", "").replaceAll("|", "").replaceAll(".", ""), typeof UP != "undefined" ? UP.oc_rate : "", 2);
                var ClassDownCheck = CheckUpDownCouponClass(UndefCheckerForSpec(DOWN, "@").replace("@@", "").replaceAll("|", "").replaceAll(".", ""), typeof DOWN != "undefined" ? DOWN.oc_rate : "", 2);
                HtmlTennis += '	<td class="td_rBet"><span> ' + SplitData[3] + '</span></td>';
                HtmlTennis += '	<td class="tdBet  _r1 ustalt text-center" onclick="AddCoupon(this)" pointerHub="' + UndefCheckerForSpec(UP, "@").replace("@@", "").replaceAll("|", "").replaceAll(".", "") + '" data-pointer="' + UndefCheckerForSpec(UP, "live") + '">' + (typeof UP != "undefined" ? ('<span class="' + ClassupCheck + '">' + UP.oc_rate.toFixed(2) + '</span>') : "") + '</td>';
                HtmlTennis += '	<td class="tdBet  _r2 ustalt text-center" onclick="AddCoupon(this)" pointerHub="' + UndefCheckerForSpec(DOWN, "@").replace("@@", "").replaceAll("|", "").replaceAll(".", "") + '" data-pointer="' + UndefCheckerForSpec(DOWN, "live") + '">' + (typeof DOWN != "undefined" ? ('<span class="' + ClassDownCheck + '">' + DOWN.oc_rate.toFixed(2) + '</span>') : "") + '</td>';
                HtmlTennis += '	<td class="td_rBet"><span> ' + GetTotalScore(tennisdata.score_period) + '</span></td>';
                HtmlTennis += '</tr> ';

            } else {
                HtmlTennis += '<td class="td_rBet"></td>	<td class="tdBet  _r1 ustalt text-center" data="+"></td><td class="tdBet  _r2 ustalt text-center" data="-"></td><td class="td_rBet"><span> ' + GetTotalScore(tennisdata.score_period) + '</span></tr> ';
            }

        }
        $("#HomeLivefootball").html(HtmlFootball);
        $("#HomeLiveBasketball").html(HtmlBasketball);
        $("#HomeLiveVolleyball").html(HtmlVolleyball);
        $("#HomeLiveTennis").html(HtmlTennis);
    }).done(function() {
        for (var i = 0; i < Betobj.length; i++) {
            ReCreateActv(Betobj[i].Pointer);
        }
        setTimeout(function() {
            ClearClass();
        }, 4000);
    })
}
//#endregion
function EventLineList(id) {
    if (window.location.pathname == "/") {
        location = "/EventLine/Index?g=" + id + "&hour=" + TickConvertHour($("#timeRange").val());
    } else {
        var checkMod = $("#lineModal_" + id).html();
        if (typeof checkMod == "undefined") {
            $("#AddLine").before('<img id="Loader_Modal" class="rounded mx-auto d-block" style="margin-top: 20px;margin-bottom: 20px;" src="/img/loaderEvent.gif">');
            $.post("/EventLine/EventLinePageList", {
                g: id,
                hour: TickConvertHour($("#timeRange").val())
            }, function(data) {
                $("#AddLine").before(data);

            }).done(function() {
                $("#Loader_Modal").remove();
                $(".tgNext").unbind();
                $(".tgNext").click(function() {

                    $(this).closest("tr").next("tr").find(".betListToggle").slideToggle("600", function() {});
                    $(this).closest("tr").toggleClass("actvrow");
                });
                $(".divclose").click(function() {
                    $(this).closest(".modalTab").fadeOut(function() {
                        $(this).remove();
                    });
                });
            })
        } else {
            $("#lineModal_" + id).click().trigger("click");
        }

    }
}



//#region OddsTable
function GetSubGameOdds(id) {
    if (id != 1) {
        var val = $("#GameLive").val();
        connection.invoke("RemoveFromGroup", "SubLive-" + val);
        connection.invoke("RemoveFromGroup", "Live-" + val);
        $("#inbets").html('<img class="mx-auto d-block"  style="padding:50px" src="/img/loaderEvent.gif" />')
        $.post("/EventLive/EventSubGame", {
            g: id
        }, function(data) {
            //$("#sub_game-" + id).html(data);

            $("#inbets").html(data);
            LiveSubGames.push(id);
            connection.invoke("AddGroup", "SubLive-" + id);
        }).done(function() {
            //setTimeout($(".acrTitle").unbind(), 0);
            //$(".acrTitle").click(function () {
            //    setTimeout($(this).next(".acrdBox").slideToggle("600", function () { }), 0)
            //    setTimeout($(this).toggleClass("actv"), 0)

            //});
        }).fail(function() {
            $("#inbets").html("");
        })
    }
    if (!$('.tab-' + id).hasClass('actv')) {
        $('.acrTitle').removeClass('actv');
        $('.tab-' + id).addClass('actv');
        //$('.accordion-container > .acrdion > .acrdBox:not(#sub_game-' + id + ')').css('display', 'none');
        //$('#sub_game-' + id).css('display', 'block');
    }
}

function GetLiveMainOdds(id) {
    if (id != 1) {
        var val = $("#GameLive").val();
        connection.invoke("RemoveFromGroup", "SubLive-" + val);
        connection.invoke("RemoveFromGroup", "Live-" + val);
        $("#inbets").html('<img class="mx-auto d-block" style="padding:50px"  src="/img/loaderEvent.gif" />')
        $.post("/EventLive/DetailPartial", {
            g: id
        }, function(data) {
            //$("#sub_game-" + id).html(data);
            $("#inbets").html(data);
            LiveSubGames.push(id);
            connection.invoke("AddGroup", "Live-" + id);
        }).done(function() {
            //setTimeout($(".acrTitle").unbind(), 0);
            //$(".acrTitle").click(function () {
            //    setTimeout($(this).next(".acrdBox").slideToggle("600", function () { }), 0)
            //    setTimeout($(this).toggleClass("actv"), 0)

            //});
        }).fail(function() {
            $("#inbets").html("");
        })
    }
    if (!$('.tab-' + id).hasClass('actv')) {
        $('.acrTitle').removeClass('actv');
        $('.tab-' + id).addClass('actv');
        //$('.accordion-container > .acrdion > .acrdBox:not(#sub_game-' + id + ')').css('display', 'none');
        //$('#sub_game-' + id).css('display', 'block');
    }
}

function GetLineOdds(id) {
    $.post("/EventLine/GameDetailOdds", {
        g: id
    }, function(data) {
        $("#line_" + id).html(data);

    }).done(function() {
        $(".acrTitle").unbind();
        $(".acrTitle").click(function() {
            $(this).next(".acrdBox").slideToggle("600", function() {});
            $(this).toggleClass("actv");
        });
    })
}

function GetLineOddsHighlight(id) {
    $.post("/EventLine/GameDetailOdds", {
        g: id
    }, function(data) {
        $("#line1_" + id).html(data);

    }).done(function() {
        $(".acrTitle").unbind();
        $(".acrTitle").click(function() {
            $(this).next(".acrdBox").slideToggle("600", function() {});
            $(this).toggleClass("actv");
        });
    })
}

function GetLineSubOdds(id) {
    $.post("/EventLine/EventSubGame", {
        g: id
    }, function(data) {
        $("#sub_line_" + id).html(data);
    }).done(function() {
        $(".acrTitle").unbind();
        $(".acrTitle").click(function() {
            $(this).next(".acrdBox").slideToggle("600", function() {});
            $(this).toggleClass("actv");
        });
    })
}

function HigtlightsPartial() {
    $.get("/EventLine/Highlights", function(data) {
        $("#Highlights").html(data);
    }).done(function() {
        $(".tabfilter").click(function() {
            $(this).closest("ul").find(".tabfilter").removeClass("_on");
            $(this).addClass("_on");
        });
        $(".tgNext").unbind();
        $(".tgNext").click(function() {

            $(this).closest("tr").next("tr").find(".betListToggle").slideToggle("600", function() {});
            $(this).closest("tr").toggleClass("actvrow");
        });
        for (var i = 0; i < Betobj.length; i++) {
            ReCreateActv(Betobj[i].Pointer);
        }
    })
}

//#endregion
//#region Menu All function
function GetChampionship(sportId, CountryId) {

    //$("._ulke#cntid_" + CountryId + " > a").after("<ul></ul>");
    $("#spid_" + sportId + " #cntid_" + CountryId + " >a").after('<ul class="showdd"></ul>');



    $.get("/Menu/GetChampionship?SportId=" + sportId + "&CountryId=" + CountryId + "&hour=" + TickConvertHour($("#timeRange").val()), function(result) {
        lig = "";
        for (var i = 0; i < result.length; i++) {
            lig += '<li><label><input type="checkbox" id="tour_' + result[i].championshipId + '" onclick="EventLineList(' + result[i].championshipId + ')" >' + result[i].championshipName + '</label> <small class="cnt">' + result[i].championshipCount + '</small></li>';
        }

        $("#spid_" + sportId + " #cntid_" + CountryId + " >ul").html(lig);
        $("#spid_" + sportId + " #cntid_" + CountryId + " >ul").parent().toggleClass("opend");
        $("#spid_" + sportId + " #cntid_" + CountryId + " >ul").slideToggle("600", function() {});


    }).done(function() {


        $("#spid_" + sportId + " #cntid_" + CountryId + " .spnB").remove();

        $("#spid_" + sportId + " #cntid_" + CountryId + " >a").click(function() {


            $(this).next("ul").parent().toggleClass("opend");
            $(this).next("ul").slideToggle("600", function() {});



        });
    });





}

function Getcountry(sportID) {
    var lenght = 0;
    $.get("/Menu/GetCountry?SportId=" + sportID + "&hour=" + TickConvertHour($("#timeRange").val()), function(result) {
        lenght = result.length;
        if (!$(".hasChild#spid_" + sportID + ">.liChild>li").hasClass("_ulke")) {
            for (var i = 0; i < result.length; i++) {

                $(".level0 >.liChild").html();
                cntitem = "";
                cntitem += '<li class="hasChild level1 _ulke" id="cntid_' + result[i].countryId + '" data="' + result[i].countryId + '" data-index="' + (i + 1) + '">';
                cntitem += '<small class="cnt">' + result[i].countryCount + '</small><a><span class="mr-1"><img src="https://cdn.incub.space/data/flags/v1/' + result[i].countryId + '.png"></span>' + result[i].countryName + '</a>';
                cntitem += '</li>';
                $(".hasChild#spid_" + sportID + ">.liChild").append(cntitem);
            }

            //$(".hasChild#spid_" + sportID + ">.liChild").prepend('<div class="spnB"><span class="spnnr"><i class="fas fa-spinner fa-spin"></i></span></div>');

        }

    }).done(function() {
        $(".hasChild#spid_" + sportID + " .spnB").remove();



        $(".hasChild#spid_" + sportID + ">.liChild").parent().toggleClass("opend");
        $(".hasChild#spid_" + sportID + ">.liChild").slideToggle("600", function() {});




        idx_first = $('.level1:first-child').attr("data-index");
        idx_last = $('.level1:last-child').attr("data-index");
        li_mns = idx_last - idx_first;
        if ((li_mns) > 10) {
            $('.level1[data-index="10"]').addClass("hasNext");
            $('.level1[data-index="10"]').nextAll('.level1').wrapAll('<li class="li_more"><ul class="_hdn subUl"></ul></li>');

            $(".hasChild#spid_" + sportID + ">.liChild .li_more").append('<span class="tglspan" data-text="' + (lenght - 10) + ` ${localizedData._OtherGroup}">` + (lenght - 10) + ` ${localizedData._OtherGroup}</span>`);


            $(".hasChild#spid_" + sportID + ">.liChild .li_more .tglspan").on("click", function() {

                var txt = $(this).prev("._hdn").is(':visible') ? $(this).attr("data-text") : localizedData._MenuMes;
                $(this).closest("li").find(".tglspan").text(txt);

                $(this).closest("li").find("._hdn").slideToggle(200);
            });
        }



        $("._ulke >a").click(function() {

            if ($(this).next("ul").length > 0) {
                //$(this).next("ul").toggleClass("showd");


            } else {
                $(this).after('<div class="spnB"><span class="spnnr"><i class="fas fa-spinner fa-spin"></i></span></div>');
                cntID = $(this).parent().attr("data");
                sportId = sportID;
                GetChampionship(sportId, cntID);
            }

        });





    })



}

function GetSport() {
    var lenght = 0;
    $.get("/Menu/Getsports?hour=" + TickConvertHour($("#timeRange").val()), function(result) {
        lenght = result.length;
        for (var i = 0; i < result.length; i++) {
            litem = '';
            litem += '<li class="hasChild level0" data-sport="' + result[i].sportId + '" id="spid_' + result[i].sportId + '" data-index="' + (i + 1) + '">';
            litem += '	<a><span class="nvicn"><img src="/img/sports/' + result[i].sportId + '.png"></span>' + result[i].sportName + '<small class="cnt">' + result[i].sporCount + '</small></a>';
            litem += '	<ul class="liChild">';
            litem += '	</ul>';
            litem += '</li>';

            $(".sportsMenu").append(litem);

        }


    }).done(function() {

        $(".sportsMenu .spnB").remove();

        idx_first = $('.sportsMenu>li:first-child').attr("data-index");
        idx_last = $('.sportsMenu>li:last-child').attr("data-index");
        li_mns = idx_last - idx_first;
        if ((li_mns) > 10) {
            $('.sportsMenu>li[data-index="10"]').addClass("hasNext");
            $('.sportsMenu>li[data-index="10"]').nextAll('.level0').wrapAll('<li class="li_more"><ul class="_hdn subUl"></ul></li>');
            $('.sportsMenu .li_more').append('<span class="tglspan" data-text="' + (lenght - 10) + ` ${localizedData._OtherGroup}">` + (lenght - 10) + ` ${localizedData._OtherGroup}</span>`);
            $(".sportsMenu .tglspan").on("click", function() {
                var txt = $(this).prev("._hdn").is(':visible') ? $(this).attr("data-text") : localizedData._MenuMes;
                $(this).closest("li").find(".tglspan").text(txt);
                $(this).closest("li").find("._hdn").slideToggle(200);
            });
        }


        $(".level0 >a").click(function() {


            if ($(this).parent().find(".liChild>li").hasClass("_ulke")) {
                $(this).parent().find(".spnB").remove();
                $(this).parent().find(".liChild").toggleClass("opend");
                $(this).parent().find(".liChild").slideToggle("600", function() {});
            } else {
                $(this).after('<div class="spnB"><span class="spnnr"><i class="fas fa-spinner fa-spin"></i></span></div>');
                spid = $(this).parent().attr("data-sport");
                Getcountry(spid);

            }
        });







    })
}

//#endregion


//region Coupon

var ArrayUpdateBetType = [];
var ArrayEventIsActive = [];
var ArrayAddCoupon = [];
var ArrayCouponDelete = [];
var ArrayBetAmount = [];
var ArrayCouponList = [];
var ArrayCouponSystemSelect = [];
var ArrayCouponIsExactUpdate = [];

window.addEventListener('load', function() {
    $(".lazy").lazyload();
    $("#locker").on("change", function() {
        if ($("#locker").val() != 1) {
            if (ArrayCouponList.length != 0) {
                var func = ArrayCouponList[0];
                ArrayCouponList.splice(0, 1);
                if (func == "CheckCouponRate") {

                    return;
                }
                if (func == "UpdateBetAmount") {
                    UpdateBetAmount(ArrayBetAmount[0]);
                    ArrayBetAmount.splice(0, 1);
                    return;
                }
                
                if (func == "DeleteAllBet") {
                    DeleteAllBet();
                    return;
                }
                if (func == "BetSave") {
                    BetSave(1);
                    return;
                }
                if (func == "UpdateBetType") {
                    UpdateBetType(ArrayUpdateBetType[0]);
                    ArrayUpdateBetType.splice(0, 1);
                    return;
                }
                if (func == "CouponSystemSelect") {
                    CouponSystemSelect(ArrayCouponSystemSelect[0]);
                    ArrayCouponSystemSelect.splice(0, 1);
                    return;
                }
                if (func == "CouponIsExactUpdate") {
                    CouponIsExactUpdate(ArrayCouponIsExactUpdate[0]);
                    ArrayCouponIsExactUpdate.splice(0, 1);
                    return;
                }
                if (func == "EventIsActive") {
                    EventIsActive(ArrayEventIsActive[0]);
                    ArrayEventIsActive.splice(0, 1);
                    return;
                }
                if (func == "CouponDelete") {
                    CouponDelete(ArrayCouponDelete[0]);
                    ArrayCouponDelete.splice(0, 1);
                    return;
                }
                if (func == "AddCoupon") {
                    AddCoupon(ArrayAddCoupon[0]);
                    ArrayAddCoupon.splice(0, 1);
                    return;
                }
            }
        }
    })


    $('.lazyCasino').lazy({
        bind: "event",
        effect: "fadeIn",
        effectTime: 2000,
        threshold: 0,
        delay: 10
    });


    $('.sportsCaro').owlCarousel({
        loop: true,
        dots: false,
        autoWidth: true,
        nav: true,
        autoHeight: true,
        navText: ["<i class='lnr lnr-chevron-left'></i>", "<i class='lnr lnr-chevron-right'></i>"],
        items: 8,
        slideBy: 5,
        responsive: {

            0: {
                items: 2
            },
            360: {
                items: 3,
                slideBy: 2,
            },
            768: {
                items: 5,
                slideBy: 3,
            },
            960: {
                items: 8,
                slideBy: 5,
            },
        }

    });
})

function BetSave(locker) {
    if (locker != 1) {
        if ($("#SendBetBT").attr("disabled") == "disabled") return;
    }
    if ($("#TBCount").html() != "") {
        var bName = '<span id="BTNmae_">' + $("#BTNmae_").html() + '</span>';
        $("#SendBetBT").html(bName + '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <i class="fas fa-caret-right"></i>');
        $("#SendBetBT").attr("disabled", true);
        var locker = $("#locker").val();
        if (locker == "1") {
            ArrayCouponList.push("BetSave");
            return;
        }
        $("#locker").val(1);

        $.get("/Coupon/SaveCoupon?AcceptChange=" + $('#acceptLiveOddsCheckBox').val(), function(data) {
            if (data != null) {
                if (data.count == 0 && data.couponDetail.length == 0) {
                    toastr.success(localizedData._YourCouponSuccessfully);
                }
                CouponVisulation(data);
            }
        }).done(function() {
            $("#locker").val("0").trigger("change");
            $("#SendBetBT").html(bName + '<i class="fas fa-caret-right"></i>');
            $("#SendBetBT").attr("disabled", false);
        })
    }
}

function DeleteAllBet() {
    var locker = $("#locker").val();
    if (locker == "1") {
        ArrayCouponList.push("DeleteAllBet");
        return;
    }
    $.get("/Coupon/DeleteAll", function(data) {
        $(".actv").removeClass("actv");
        CouponVisulation(data);
    }).done(function() {
        $("#locker").val("0").trigger("change");
    })
}



window.addEventListener('load', function() {
    var path = location.pathname;
    if (path.includes("EventLive") || path.includes("EventLine")) {
        $(".panelBox.make-me-sticky").removeClass("make-me-sticky");
    }
    if (window.location.pathname != "/EventLive" || window.location.pathname != "/EventLive/Detail") {
        var CouponInterval = setInterval(function() {
          
        }, 20000)
        $(window).blur(function() {
            clearInterval(CouponInterval);
        });
        
    }
    $("#acceptLiveOddsCheckBox").on('change', function() {
        if ($(this).is(':checked')) {
            $(this).attr('value', 'true');
        } else {
            $(this).attr('value', 'false');
        }
    })
})

function UpdateBetAmount(amount) {
    var amount2 = amount.replaceAll(",", ".");
    var locker = $("#locker").val();
    if (locker == "1") {
        ArrayCouponList.push("UpdateBetAmount");
        ArrayBetAmount.push(amount2);
        return;
    }
    $("#locker").val("1");
    var amount1 = "";
    if (typeof amount2 == "number") {
        amount1 = amount2.toString().includes(".") ? ConvertNumber(amount2, ".##") : ConvertNumber(amount2, ".00");
    } else {
        amount1 = amount2.includes(".") ? ConvertNumber(amount2, ".##") : ConvertNumber(amount2, ".00");
    }
    $.get("/Coupon/UpdateAmount?amount=" + amount1, function(data) {
        if (data != null) {
            CouponVisulation(data, true);
        }
    }).done(function() {
        $("#locker").val("0").trigger("change");
    })
}
$("#bahis#maxkazanc").keypress(function(event) {
    if (event.which == 8 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46)
        return true;

    else if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57))
        event.preventDefault();
    //var val = $("#bahis").val().replace(/[^\d.]|\.(?=.*\.)/g);
    //var convert = parseInt(val).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
    //$("#bahis").val(convert);

})
$("#bahis").on("focusout keydown", function(e) {
    if (e.type == "focusout" || e.keyCode == 13 || e.which == 13) {
        UpdateBetAmount($("#bahis").val());
    }
})


$('.btRts > input').on("click", function() {
    $("#bahis").val($(this).attr("data"))
    $('.btRts > input').removeClass("actv");
    $(this).addClass("actv");
    UpdateBetAmount($(this).attr("data"));
})
$('#betTab > a').on("click", function() {
    $('#betTab > a').removeClass("actv");
    var id = $(this).attr("id");
    $(this).addClass("actv");
    UpdateBetType(id);

})

function UpdateBetType(id) {
    var locker = $("#locker").val();
    if (locker == "1") {
        ArrayCouponList.push("UpdateBetType");
        ArrayUpdateBetType.push(id);
        return;
    }
    $("#locker").val("1");
    $.get("/Coupon/UpdateType?type=" + id, function(data) {
        if (data != null) {
            CouponVisulation(data);
        }
    }).done(function() {
        $("#locker").val("0").trigger("change");
    })
}

function CouponDelete(id) {
    var locker = $("#locker").val();
    if (locker == "1") {
        ArrayCouponList.push("CouponDelete");
        ArrayCouponDelete.push(id);
        return;
    }
    $("#locker").val("1");
    $.get("/Coupon/DeleteEvent?id=" + id, function(data) {
        if (data != null) {

            CouponVisulation(data);
        }

    }).done(function() {
        $("#locker").val("0").trigger("change");
    })
}

function EventIsActive(data) {
    var id = $(data).attr("dataB");
    var status = $(data).prop('checked');
    var locker = $("#locker").val();
    if (locker == "1") {
        ArrayCouponList.push("EventIsActive");
        ArrayEventIsActive.push(data);
        return;
    }
    $("#locker").val("1");
    $.get("/Coupon/IsActiveUpdate?id=" + id + "&active=" + status, function(data) {
        if (data != null) {
            CouponVisulation(data);
        }

    }).done(function() {
        $("#locker").val("0").trigger("change");
    })
}
var Betobj = new Array();

function CheckUpDownCouponClass(point, rate, type) {
    var pointer;
    if (type == 1) {
        pointer = $("[pointerCoupon=" + point + "]");
    } else {
        pointer = $("[pointerHub=" + point + "]");
    }
    if (typeof pointer != "undefined") {

        var htmlpointer = pointer.html();
        var pointchild = pointer.children("span").html();
        var checkData = type == 1 ? htmlpointer : pointchild;
        if (typeof checkData != "undefined") {
            var couponrate = parseFloat(parseFloat(checkData).toFixed(2));
            var newRate = parseFloat(parseFloat(rate).toFixed(2));
            if (newRate > couponrate) {
                return " bet_up";
            } else if (newRate < couponrate) {
                return " bet_down";
            }
        }
        return "";
    }
    return "";
}

function ReCreateActv(pointer) {

    var pointer = $("[pointerHub=" + pointer + "]");
    if (typeof pointer != "undefined") {
        var spancheck = pointer.children("span");
        var spanb = pointer.children("b");
        if (typeof spancheck != "undefined") {
            spancheck.addClass("actv");

        }
        if (typeof spanb != "undefined") {
            spanb.addClass("actv");
        }
    }
}

function CouponBetOddsUpdate(point, Rate) {
    var ClearPoint = point.replaceAll("|", "").replaceAll(".", "");
    var Search = Betobj.filter(function(item) {
        return (item.Pointer == ClearPoint);
    })[0];
    if (typeof Search == "undefined") {
        return false;
    }
    var parseRate = parseFloat(Rate);
    var parseSearch = parseFloat(Search.Rate);
    var pointer = $("[pointerCoupon=" + ClearPoint + "]");
    if (typeof pointer != "undefined" && typeof Search != "undefined") {
        if (parseRate > parseSearch) {

            pointer.addClass(" bet_up");
        } else if (parseRate < parseSearch) {
            pointer.addClass(" bet_down");

        }
    }

}
$("#maxkazanc").on("focusout keydown onmouseover", function(e) {
    if (e.type == "focusout" || e.keyCode == 13 || e.which == 13) {
        var coef = $("#bahisadetoran").html().replace(",", ".");
        var padval = $("#maxkazanc").val().replace(",", ".");
        var deccoef = Number((parseFloat(coef)).toFixed(2));
        var parsePad = Number((parseFloat(padval)).toFixed(2));
        UpdateBetAmount(Math.round(parsePad / deccoef).toString());
    }
})


function CouponSystemSelect(id) {
    var locker = $("#locker").val();
    if (locker == "1") {
        ArrayCouponList.push("CouponSystemSelect");
        ArrayCouponSystemSelect.push(id);
        return;
    }
    $("#locker").val("1");
    $.get("/Coupon/SystemSelect?select=" + id, function(data) {
        if (data != null) {
            CouponVisulation(data);
        }
    }).done(function() {
        $("#locker").val("0").trigger("change");
    })
}

function CouponIsExactUpdate(id) {
    var locker = $("#locker").val();
    if (locker == "1") {
        ArrayCouponList.push("CouponIsExactUpdate");
        ArrayCouponIsExactUpdate.push(id);
        return;
    }
    $("#locker").val("1");
    $.get("/Coupon/UpdateIsExact?id=" + id, function(data) {
        if (data != null) {
            CouponVisulation(data);
        }
    }).done(function() {
        $("#locker").val("0").trigger("change");
    })
}

function CouponIsExactButtonCreate(event) {
    return '<img src="/assets/img/' + (event.isExact ? "bankon" : "bankoff") + '.gif" onclick="CouponIsExactUpdate(' + event.gameId + ')" style="padding-right:3px;cursor:pointer;" />';

}
var systemCoupontooltip = `<i class="fas fa-question-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="${localizedData._SistemBet}"></i>`;
var Betobj2 = [];

function CouponVisulation(data, upprice) {
    var html = "";
    Betobj2 = [];
    $(".actv").removeClass("actv");
    var loca = location.pathname;
    if (typeof data != 'undefined') {
        for (let i = 0; i < data.couponDetail.length; i++) {
            var pointer = data.couponDetail[i].pointer.replaceAll("|", "").replaceAll(".", "");
            var pointerClass = CheckUpDownCouponClass(pointer, data.couponDetail[i].oc_rate, 1);
            var ocRate = parseFloat(data.couponDetail[i].oc_rate.toFixed(2));
            if (loca == "/EventLive" || loca == "/Search/SearchWeb") {
                UpdateOcValue(pointer, data.couponDetail[i].oc_rate);
            } else {
                if (data.couponDetail[i].isLive && loca == "/")
                    UpdateOcValue(pointer, data.couponDetail[i].oc_rate);
                else if ((data.couponDetail[i].pointer.split("|")[1] == "1" && data.couponDetail[i].isSub == false) && (loca == "/" || loca == "/EventLine" || loca == "/EventLine/Index" || loca == "/Search/SearchWeb"))
                    UpdateOcValue(pointer, data.couponDetail[i].oc_rate);
                else
                    UpdateOcValueDetail(pointer, data.couponDetail[i].oc_rate)
            }
            Betobj2.push({
                Pointer: pointer,
                Rate: ocRate,
                Error: data.couponDetail[i].error
            });
            ReCreateActv(pointer);
            // console.log(pointerClass);
            html += '<div class="betItem" id="_gs_fcb">';
            html += '<div class="betRow betTitle">' + (data.couponType == 3 ? CouponIsExactButtonCreate(data.couponDetail[i]) : "") + ' ' + data.couponDetail[i].teams + '<span class="itmClose" onclick="CouponDelete(' + data.couponDetail[i].gameId + ')">';
            html += '<i class="fas fa-times"></i></span></div><div class="betRow">';
            html += '<input type="checkbox" onclick="EventIsActive(this)" dataB="' + data.couponDetail[i].gameId + '" ' + (data.couponDetail[i].isActive ? "checked=\"\"" : "") + '> ' + data.couponDetail[i].group_name + ` ${localizedData._Guess} :` + data.couponDetail[i].oc_name;
            html += '<span class="_Rate' + pointerClass + '" pointerCoupon="' + pointer + '">' + (data.couponDetail[i].error ? ('<img src="/img/warning_inline.gif" />' + localizedData.GetCouponUpdateError) : data.couponDetail[i].oc_rate.toFixed(2)) + '</span>&nbsp;<i class="spinfor"></i></div></div>';
        }
        var SystemSelect = $("#SystemCouponSelector");
        SystemSelect.hide();
        if (data.couponType == 3) {
            var systemTableHtml = "<tbody>";
            for (var i in data.systemCombineInfo) {
                var imgCheckbox = data.systemCombineInfo[i].isSelect ? "checkbox_on" : "checkbox_off";
                systemTableHtml += ' <tr>';
                systemTableHtml += ' <td><img src="/assets/img/' + imgCheckbox + '.png" onclick="CouponSystemSelect(' + data.systemCombineInfo[i].combine + ')" /></td>';
                systemTableHtml += ' <td>' + data.systemCombineInfo[i].combine + ` ${localizedData._LiCombos1} (` + data.systemCombineInfo[i].combineCount + ` ${localizedData.Bets})  </td>`;
                systemTableHtml += ' <td>' + systemCoupontooltip + '</td></tr>';
            }
            systemTableHtml += "</tbody>";
            SystemSelect.html(systemTableHtml);
            SystemSelect.show();
        }
        if (data.error != null) {
            var message = localizedData[data.error.messege];

            toastr.error((message).format(data.error.value, localizedData._currencySym));
        }
        if (upprice)
            $("#bahis").val(data.amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
        $("#TBCount").html("(" + data.couponDetail.length + ")");
        if ($("#maxkazanc").val() != data.amountOut)
            $("#maxkazanc").val(data.amountOut);
        $('#betTab > a').removeClass("actv");
        $('#betTab > #' + data.couponType).addClass("actv");
        $('.btRts > input').removeClass("actv");
        $('.btRts > [data="' + data.amount.toFixed(2) + '"]').addClass("actv");
        if (data.couponType == 1 || data.couponType == 3) {
            $(".CouponCD").show();
        } else {
            $(".CouponCD").hide();
        }
        if (data.couponDetail.length > 0) {
            $("#BetShow").show();
            $("#CouponEvent").html(html);
        } else {
            $("#BetShow").hide();
            $("#TBCount").html("");
            $("#CouponEvent").html(localizedData.GetCouponHtmlText);
        }
        $("#bahisadet").html(data.count);
        $("#bahisadetoran").html(data.coef.toFixed(2));
        $("#bahistotal").html(data.totalAmount);
        setTimeout(function() {
            ClearClass();
        }, 3000);
        $('[data-toggle="tooltip"]').tooltip();
        Betobj2.forEach(function(item, index) {
            if (item.Error != true)
                CouponBetOddsUpdate(item.Pointer, item.Rate)
            if (index == Betobj2.length - 1) {
                Betobj = Betobj2;

            }
        })
    }
}

function AddCoupon(pointer) {
    var selector = $(pointer).attr("data-pointer");
    if (selector == "0" || selector == "") return;
    if ($(pointer).hasClass("oddBtnDisabled")) return;
    var locker = $("#locker").val();
    if (locker == "1") {
        ArrayCouponList.push("AddCoupon");
        ArrayAddCoupon.push(pointer);
        return;
    }
    $("#locker").val("1");
    $("#CouponEvent").html('<img src="/assets/img/loaderSport.gif" />');
    $.get("/Coupon/AddCoupon?id=" + selector + "&Type=" + $(".betTabs").children('.actv').attr("id") + "&amount=" + ConvertNumber($("#bahis").val(), ".##"), function(data) {
        CouponVisulation(data);
    }).done(function() {
        $("#locker").val("0").trigger("change");
    })

}



//#endregion






$('body').on('click', '.cBTabitem button', function(e) {
    e.preventDefault();
    $('.cBTabitem button').removeClass('active');
    $(this).addClass('active');
    $('.cInstBets-tab').addClass('d-none');
    $('.cInstBets-tab').eq($(this).parent().index()).removeClass('d-none');
});


$('body').on('change keyup', '#category-search', function(e) {
    var _val = e.target.value.toLowerCase();
    $('.category-item').removeClass('d-none');
    $.each($('.category-item'), function(i, e) {
        if (String($(e).data('title')).indexOf(_val) == -1) {
            $(e).addClass('d-none');
        }
    });
});
$(".mobSearch button").click(function() {
    $('#mobile-search').addClass('show');
});
$("#mobile-search .close-button").click(function(e) {
    e.preventDefault();
    $('#mobile-search').removeClass('show');
});