function iOS() {
    return [
            'iPad Simulator',
            'iPhone Simulator',
            'iPod Simulator',
            'iPad',
            'iPhone',
            'iPod'
        ].includes(navigator.platform)
        // iPad on iOS 13 detection
        ||
        (navigator.userAgent.includes("Mac") && "ontouchend" in document)
}



$('._1itemSlide').owlCarousel({
    loop: true,
    margin: 10,
    dots: false,
    nav: false,
    items: 1,
    autoplayTimeout: 3000,
    autoplay: true,
    navText: ["<i class='lnr lnr-chevron-left'></i>", "<i class='lnr lnr-chevron-right'></i>"],
});
$(window).on('load', function() {
    $('#casinoCaroHome').owlCarousel({
        loop: true,
        margin: 15,
        autoWidth: true,
        dots: false,
        nav: false,
        items: 2,
        slideBy: 1,
        navText: ["<i class='lnr lnr-chevron-left'></i>", "<i class='lnr lnr-chevron-right'></i>"],
    });
});
$(window).scroll(function() {
    if ($(window).scrollTop() > 50) {
        $("#back-to-top").addClass('show');
    } else {
        $("#back-to-top").removeClass('show');
    }
});
$("#back-to-top").click(function() {
    $('html,body').animate({
        scrollTop: 0
    }, 500);
});
$(".mobSearch button").click(function() {
    $('#mobile-search').addClass('show');
});
$("#mobile-search .close-button").click(function(e) {
    e.preventDefault();
    $('#mobile-search').removeClass('show');
});

function reCreateCaro() {
    var owlBetC = $('.__BetsCaro');
    owlBetC.owlCarousel('destroy');
    owlBetC.owlCarousel({
        loop: false,
        margin: 10,
        nav: false,
        dots: false,
        touchDrag: false,
        mouseDrag: false,
        responsive: {
            0: {
                items: 1
            },
            400: {
                items: 1
            },
            460: {
                items: 2
            },

            768: {
                items: 3
            }
        },


    });
    //.on("dragged.owl.carousel", function (event) {

    //    console.log('event : ', event.relatedTarget['_drag']['direction']);
    //    if (event.relatedTarget['_drag']['direction'] == "left") {
    //        $(".customNextBtn").trigger("click");
    //    }
    //    if (event.relatedTarget['_drag']['direction'] == "right") {
    //        $(".customPrevBtn").trigger("click");
    //    }
    //});

    $('.customNextBtn').unbind("click");
    $('.customPrevBtn').unbind("click");

    $('.customNextBtn').click(function() {
        owlBetC.trigger('next.owl.carousel');
    });

    $('.customPrevBtn').click(function() {
        owlBetC.trigger('prev.owl.carousel', [300]);
    });

    var myOptions = {
        velocity: 0.1
    }
    owlBetC.hammer(myOptions).unbind("swipeleft");
    owlBetC.hammer(myOptions).on("swipeleft", function(ev) {
        $(".customNextBtn").trigger("click");
    });
    owlBetC.hammer(myOptions).unbind("swiperight");
    owlBetC.hammer(myOptions).on("swiperight", function(ev) {
        $(".customPrevBtn").trigger("click");
    });



}
window.addEventListener('load', function(event) {

    var owlBetC = $('.__BetsCaro');

    owlBetC.owlCarousel({
        loop: false,
        margin: 10,
        nav: false,
        dots: false,
        touchDrag: false,
        mouseDrag: false,
        responsive: {
            0: {
                items: 1
            },
            400: {
                items: 1
            },
            460: {
                items: 2
            },

            768: {
                items: 3
            }
        },


    });
    //.on("dragged.owl.carousel", function (event) {

    //    console.log('event : ', event.relatedTarget['_drag']['direction']);
    //    if (event.relatedTarget['_drag']['direction'] == "left") {
    //        $(".customNextBtn").trigger("click");
    //    }
    //    if (event.relatedTarget['_drag']['direction'] == "right") {
    //        $(".customPrevBtn").trigger("click");
    //    }
    //});



    $('.customNextBtn').click(function() {
        owlBetC.trigger('next.owl.carousel');
    });

    $('.customPrevBtn').click(function() {
        owlBetC.trigger('prev.owl.carousel', [300]);
    });

    var myOptions = {
        velocity: 0.1
    }
    owlBetC.hammer(myOptions).on("swipeleft", function(ev) {
        $(".customNextBtn").trigger("click");
    });
    owlBetC.hammer(myOptions).on("swiperight", function(ev) {
        $(".customPrevBtn").trigger("click");
    });




    $("#acceptLiveOddsCheckBox").on('change', function() {
        if ($(this).is(':checked')) {
            $(this).attr('value', 'true');
        } else {
            $(this).attr('value', 'false');
        }
    })

});

$(function() {
    $('.rowCaro').owlCarousel({
        loop: true,
        margin: 10,
        dots: false,
        nav: false,
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

    $('._1itemSlide').owlCarousel({
        loop: true,
        margin: 10,
        dots: false,
        nav: false,
        items: 1,
        navText: ["<i class='lnr lnr-chevron-left'></i>", "<i class='lnr lnr-chevron-right'></i>"],
    });

    $('#casinoCaroHome').owlCarousel({
        loop: true,
        margin: 15,
        autoWidth: true,
        dots: false,
        nav: false,
        items: 2,
        slideBy: 1,
        navText: ["<i class='lnr lnr-chevron-left'></i>", "<i class='lnr lnr-chevron-right'></i>"],

    });
    $('.listCaro').owlCarousel({
        loop: false,
        margin: 10,
        dots: false,
        nav: false,
        autoWidth: true,
        navText: ["<i class='lnr lnr-chevron-left'></i>", "<i class='lnr lnr-chevron-right'></i>"],
        items: 6,
        slideBy: 5,
        responsive: {

            0: {
                items: 3
            },
            360: {
                items: 3,
                slideBy: 3,
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


    $('.sportsCaro').owlCarousel({
        loop: true,
        margin: 0,
        dots: false,
        autoWidth: true,
        nav: true,
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

});





$("#timeRange").change(function() {
    $(".sportsMenu").html('<ul class="spnB"><li class="spnnr"><i class="fas fa-spinner fa-spin"></i></li></ul>');
    GetSport();
});


$(".divclose").click(function() {
    $(this).closest(".modalTab").fadeOut();
});



$(".pilbuttons a").click(function() {
    $(this).parent().find("a").removeClass("active");
    $(this).addClass("active");

    $(".mac_item .pilTable").removeClass("active");
    $(".mac_item .pilTable").attr("id", $(this).attr("data"));


});



var activeMenu;
$(document).ready(function() {
    if (iscasino) {
        $('.bottomMenu').find('.bm8').removeClass('d-none');
        $('.bottomMenu').find('.bm3').addClass('d-none');
    }
    var mainpath = "";
    if (location.pathname.includes("/Casino/Live")) mainpath = "/Casino/Live";
    else mainpath = location.pathname.split('?')[0];
    //else mainpath = "/" + location.pathname.split('/')[1];
    $('.bottomMenu').find(iscasino ? '.bm2' : '.bm7').removeClass('d-none');
    $('a[href="' + mainpath + '"]').addClass('active');
    activeMenu = $('a[href="' + mainpath + '"]');
});
$(".getKuponWindow").click(function() {
    activeMenu.toggleClass('active');
    $(this).toggleClass("active");
    $(".kuponWindow").toggleClass("opened");
});

$(document).on('mouseenter', ".tdTipsTable .tdMac", function() {
    var $this = $(this);
    $this.tooltip({
        title: $this.attr("data-tip"),
        placement: "bottom"
    });
    $this.tooltip('show');
});
$(document).on('mouseleave', ".tdTipsTable .tdMac", function() {
    var $this = $(this);
    $this.tooltip({
        title: '',
        placement: "bottom"
    });
    $this.tooltip('hide');
});




LineSportList();
LiveSportList();
LastMinMenu();
TodayMenu();

function LineSportList() {
    var lineSportListCheck = $("#lineSportList").html();
    if (typeof lineSportListCheck == "undefined") return;
    $.get("/Menu/MobileSportListTop", function(data) {
        $("#lineSportList").html(data);
    }).done(function() {
        RelocationScroll();
    })
}

function TodayMenu() {
    var CheckTodayMenu = $("#TodayMenu").html();
    if (typeof CheckTodayMenu == "undefined") return;
    $.get("/Menu/MobileTodayPartial", function(data) {
        $("#TodayMenu").html(data);
    }).done(function() {
        RelocationScroll();
    })
}

function LastMinMenu() {
    var CheckLastMinMenu = $("#LastMinMenu").html();
    if (typeof CheckLastMinMenu == "undefined") return;
    $.get("/Menu/MobileLastMinPartial", function(data) {
        $("#LastMinMenu").html(data);
    }).done(function() {
        RelocationScroll();
    })
}

function LiveSportList() {
    var livelist = $("#liveSportList").html()
    if (typeof livelist == "undefined") return;
    $.get("/Menu/MobileLiveMenu", function(data) {
        $("#liveSportList").html(data);
    }).done(function() {
        RelocationScroll();
    })
}

function GetEventMainLineOddsGame(id) {

    $("#SubUpdateline").css("background", "#182128");
    $("#SubUpdateline").html('<img class="rounded mx-auto d-block _removeSpin" id="removeSpin" src="/assets/img/loaderSport.gif" />')
    $.post("/EventLine/DetailMobilePartial", {
        g: id
    }, function(data) {
        $("#SubUpdateline").html(data);
        $("#SubUpdateline").css("background", "");
    }).done(function() {
        $("#LineEventId").val(id);
        CheckBetActv();

    })
}

function GetEventLineSubGame(id) {
    $("#SubUpdateline").html('<img class="rounded mx-auto d-block _removeSpin" id="removeSpin"  src="/assets/img/loaderSport.gif" />');
    $("#SubUpdateline").css("background", "#182128");
    $.post("/EventLine/EventSubGame", {
        g: id
    }, function(data) {
        $("#SubUpdateline").html(data);
        $("#SubUpdateline").css("background", "");
    }).done(function() {
        $("#LineEventId").val(id);
        CheckBetActv();
    }).fail(function() {
        $("#SubUpdateline").html("");
        $("#SubUpdateline").css("background", "");
    })
}

function GetEventMainOddsGame(id) {
    var checkLive = $("#LiveEventId").val();
    if (typeof checkLive != "undefined") {
        connection.invoke("RemoveFromGroup", "SubLive-" + checkLive);
    }
    $("#SubUpdatelive").css("background", "#182128");
    $("#SubUpdatelive").html('<img class="rounded mx-auto d-block _removeSpin" id="removeSpin" src="/assets/img/loaderSport.gif" />')
    $.post("/EventLive/DetailMobilePartial", {
        g: id
    }, function(data) {
        $("#SubUpdatelive").html(data);
        $("#SubUpdatelive").css("background", "");
    }).done(function() {
        $("#LiveEventId").val(id);
        CheckBetActv();
        connection.invoke("AddGroup", "Live-" + id);
    })
}

function GetEventLiveSubGame(id) {
    var checkLive = $("#LiveEventId").val();
    if (typeof checkLive != "undefined") {
        connection.invoke("RemoveFromGroup", "Live-" + checkLive);
    }
    $("#SubUpdatelive").html('<img class="rounded mx-auto d-block _removeSpin" id="removeSpin"  src="/assets/img/loaderSport.gif" />');
    $("#SubUpdatelive").css("background", "#182128");
    $.post("/EventLive/EventSubGame", {
        g: id
    }, function(data) {

        $("#SubUpdatelive").html(data);
        $("#SubUpdatelive").css("background", "");
    }).done(function() {
        $("#LiveEventId").val(id);
        CheckBetActv();
        connection.invoke("AddGroup", "SubLive-" + id);
    }).fail(function() {
        $("#SubUpdatelive").html("");
        $("#SubUpdatelive").css("background", "");
    })
}

function GetMobilLiveEventList(id) {
    var check = $("#_Sportid").val();
    var checkLive = $("#LiveEventId").val();
    if (typeof checkLive != "undefined") {
        connection.invoke("RemoveFromGroup", "Live-" + checkLive);
    }
    if (typeof check != "undefined") {
        connection.invoke("RemoveFromGroup", "Live-" + check);
    }
    $.get("/EventLive/LiveListMobile?s=" + id, function(data) {
        $("#ovverrideLive").html(data);
        $("#ovverrideLive").addClass("eventBox");
        $(".mobileMenuSport").removeClass("ActvMS");
        $('[onclick="GetMobilLiveEventList(' + id + ')"]').addClass("ActvMS");
    }).done(function() {
        connection.invoke("AddGroup", "Live-" + id);
        reCreateCaro();
        Page = 2;
        Pagepost = true;
        CheckBetActv();
    });
}

function GetCountryListMobile(id) {
    if (window.location.pathname == "/") {
        location = "/Menu/GetCountryMobile?sportId=" + id + "&Home=true";
    } else {
        $.get("/Menu/GetCountryMobile?sportId=" + id, function(data) {
            $(".mobileMenuSport").removeClass("ActvMS");
            $('[onclick="GetCountryListMobile(' + id + ')"]').addClass("ActvMS");
            $("#MenuOverride").html(data);
        }).done(function() {
            $("#liveUrl").attr("href", "/EventLive/Index?s=" + id);
        })
    }
}

function ReloadCasinoScroll() {
    var ScrollPCasino = localStorage.getItem("Casino");
    var ScrollPCasinoLive = localStorage.getItem("Casino/Live");
    var loc = location.pathname;
    if (ScrollPCasinoLive !== null && loc.includes("Casino/Live")) {
        CasinoLivesidebar.scrollLeft = parseInt(ScrollPCasinoLive, 10);
    } else if (ScrollPCasino !== null && loc.includes("Casino")) {
        Casinosidebar.scrollLeft = parseInt(ScrollPCasino, 10);
    }
}

function RelocationScroll() {
    var ScrollP = localStorage.getItem("sidebar-scroll");
    var loc = location.pathname;
    if (ScrollP !== null && loc != "/") {
        sidebar.scrollLeft = parseInt(ScrollP, 10);
    }
}
var sidebar = document.querySelector(".mobMenuWrap");
var Casinosidebar = document.querySelector(".csScroll");
var CasinoLivesidebar = document.querySelector(".csScroll");
window.addEventListener("beforeunload", function(e) {
    if (location.pathname.includes("Casino/Live") && CasinoLivesidebar != null) localStorage.setItem("Casino/Live", CasinoLivesidebar.scrollLeft);
    else if (location.pathname.includes("Casino") && Casinosidebar != null) localStorage.setItem("Casino", Casinosidebar.scrollLeft);
    if (sidebar != null) localStorage.setItem("sidebar-scroll", sidebar.scrollLeft);
});
window.addEventListener('load', function(event) {

    var checkFirst = localStorage.getItem("liveClick");
    var locPath = window.location.pathname;
    if (checkFirst == null && locPath.includes("EventLive")) {
        localStorage.setItem("liveClick", "true");
        setTimeout(function() {
            $(".customNextBtn").trigger("click");

        }, 2000);
        setTimeout(function() {
            $(".customPrevBtn").trigger("click")

        }, 3000);
    }
    if (locPath.includes("EventLive")) {
        $('body').on('touchmove', function() {
            setTimeout(onScroll, 0)
        });
        $(window).on('scroll', function() {
            setTimeout(onScroll, 0)
        });

        function onScroll() {
            var check = $("#_Sportid").val();
            if (typeof check != "undefined") {
                if ($(window).scrollTop() > ($(document).height() - $(window).height()) - 150) {
                    if (Pagepost && $("#_BeforeLive").hasClass("_removeSpin") != true) {
                        $("#_BeforeLive").addClass("_removeSpin");
                        $.ajax({
                            url: "/EventLive/LiveListMobile?s=" + check + "&page=" + Page,
                            method: "get",
                            success: function(data) {
                                if ($.trim(data) == '') {
                                    Pagepost = false;
                                    $("#_BeforeLive").before(`<p class="text-center"> ${localizedData._AllMatchesLoaded}</p>`);
                                    $("#removeSpin").remove();
                                } else {
                                    $("#_BeforeLive").before(data);
                                    $("#_BeforeLive").removeClass("_removeSpin");
                                    Page++;
                                }
                            }
                        }).done(function() {
                            reCreateCaro();
                            CheckBetActv();
                            $(".lazy").lazyload();
                        });

                    }
                }
            }
        }

    }

    var g = $("#g").val();
    var hour = $("#hour").val();
    var c = $("#c").val();
    var t = $("#t").val();
    if (g != undefined || hour != undefined || c != undefined) {
        $('body').on('touchmove', function() {
            setTimeout(onScroll, 0)
        });
        $(window).on('scroll', function() {
            setTimeout(onScroll, 0)
        });

        function onScroll() {
            if ($(window).scrollTop() > ($(document).height() - $(window).height()) - 150) {
                if (Pagepost && $("#removeSpin").html() != "") {
                    g = g == undefined ? "" : g;
                    hour = hour == undefined ? "" : hour;
                    c = c == undefined ? "" : c;
                    $.ajax({
                        url: "/EventLine/MobileLineListPager?g=" + g + "&t=" + t + "&page=" + (Page - 1) + "&hour=" + hour + "&c=" + c,
                        method: "get",
                        beforeSend: function() {
                            $("#_BeforeLine").before('<img class="rounded mx-auto d-block _removeSpin" id="removeSpin" width="40" src="/assets/img/loader.gif" />');
                        },
                        success: function(data) {
                            if ($.trim(data) == '') {
                                Pagepost = false;
                                $("#_BeforeLine").before(`<p class="text-center"> ${localizedData._AllMatchesLoaded}</p>`);
                                $("._removeSpin").remove();
                            } else {
                                $("#_BeforeLine").before(data);
                                $("._removeSpin").remove();
                                Page++;
                            }
                        }
                    }).done(function() {
                        reCreateCaro();
                        CheckBetActv();
                        $(".lazy").lazyload();
                    });

                }
            }

        }

    }

    $('.lazyCasino').lazy({
        bind: "event",
        effect: "fadeIn",
        effectTime: 2000,
        threshold: 0,
        delay: 10
    });

});

var Page = 2;
var Pagepost = true;

function AddFavorites(gameId) {
    $.get("/Favorites/Add?GameId=" + gameId, function(d) {
        var fav = $("[onclick='AddFavorites(" + gameId + ")']");
        if (fav.hasClass("far")) {
            fav.removeClass("far");
            fav.addClass("fas");
        } else {
            fav.addClass("far");
            fav.removeClass("fas");
        }
    })
}

function AddFavoritesCasino(r, e) {
    $.get("/Casino/FavoriteAddOrRemove?GameId=" + e, function(d) {
        var pUpdate = $("[data-code='" + e + "']");
        console.log("[data-code='" + e + "']");
        pUpdate.attr("onclick", "");
        var EClass = $(r).hasClass("fas") ? "False" : "True";
        pUpdate.attr("onclick", "OpenCasino('" + e + "','" + pUpdate.attr("data-isfun") + "','" + EClass + "')");
        if ($(r).hasClass("far")) {
            $(r).removeClass("far");
            $(r).addClass("fas");
        } else {
            $(r).addClass("far");
            $(r).removeClass("fas");
        }
    })
}

function OpenCasinoPublic(code, fun) {
    $("#fun").hide();
    if (fun == "True") {
        $("#fun").show();
        $("#fun").attr("onclick", "CasinoUrl('/Casino/PublicGame?c=" + code + "&IsFun=true')");
    }
    $("#real").attr("onclick", "CasinoUrl('/Casino/PublicGame?c=" + code + "&IsFun=false')");
}

function OpenCasino(code, fun, fav) {
    $("#fun").hide();
    if (fav == "True") {
        $("#Favorites").removeClass("far");
        $("#Favorites").addClass("fas");
    } else {
        $("#Favorites").addClass("far");
        $("#Favorites").removeClass("fas");
    }
    $("#Favorites").attr("onclick", "");
    $("#Favorites").attr("onclick", "AddFavoritesCasino(this,'" + code + "')");
    $("#fun").hide();
    if (fun == "True") {
        $("#fun").show();
        $("#fun").attr("onclick", "CasinoUrl('/Casino/Game?c=" + code + "&IsFun=true')");
    }
    $("#real").attr("onclick", "CasinoUrl('/Casino/Game?c=" + code + "&IsFun=false')");
}

function CasinoUrl(url) {
    location.href = url;
}

//#region String Op function
function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + 'px';
}

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
    return name.length > 19 ? name.substring(0, 19) + '...' : name;
}

function UndefChecker(data, type) {
    if (typeof data != 'undefined') {
        if (typeof data.oc_list.filter(function(a) {
                return a.oc_name == type
            })[0] != 'undefined') {
            return '<span>' + data.oc_list.filter(function(a) {
                return a.oc_name == type
            })[0].oc_rate.toFixed(2) + '</span>';
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

function CheckBetActv() {
    for (var i = 0; i < Betobj.length; i++) {
        ReCreateActv(Betobj[i].Pointer);
    }
}
//#endregion
//#region Coupon
function CouponIsExactUpdate(id) {
    $.get("/Coupon/UpdateIsExact?id=" + id, function(data) {
        if (data != null) {
            CouponVisulation(data);
        }
    }).done(function() {

    })
}

function AddCoupon(pointer) {
    var selector = $(pointer).attr("data-pointer");
    if (selector == "0") return;
    if ($(pointer).hasClass("oddBtnDisabled")) return;
    //var locker = $("#locker").val();
    //if (locker == "1") { ArrayCouponList.push("AddCoupon"); ArrayAddCoupon.push(pointer); return; }
    //$("#locker").val("1");
    $("#CouponEvent").html('<img src="/assets/img/loaderSport.gif" />');
    $.get("/Coupon/AddCoupon?id=" + selector + "&Type=3&amount=" + amount, function(data) {
        CouponVisulation(data);
    }).done(function() {
        //$("#locker").val("0").trigger("change");
    })

}
var amount = 30;
var Betobj = [];

function CouponIsExactButtonCreate(event) {
    return '<u onclick="CouponIsExactUpdate(' + event.gameId + ')" class="' + (event.isExact ? "bankon" : "bankoff") + '">banko</u>';

}

function ReCreateActv(pointer) {

    var pointer = $("[pointerHub=\x27" + pointer + "\x27]");
    if (typeof pointer != "undefined") {
        var spanb = pointer.children("b");
        if (window.location.href == "/EventLive/Detail") {
            if (typeof spanb != "undefined") {
                spanb.addClass("actv");

            }
        } else {
            pointer.addClass("actv");
        }

    }
}
String.prototype.format = function() {
    a = this;
    for (k in arguments) {
        a = a.replace("{" + k + "}", arguments[k])
    }
    return a
}

function replaceAll(string) {
    var resutl = string.split(".").join("");
    resutl = resutl.split("|").join("");
    return resutl.split(",").join("");

}

function CouponVisulation(data) {
    var html = "";
    Betobj = [];
    $(".actv").removeClass("actv");
    BetCount = 0;
    if (typeof data != 'undefined') {
        if (data.systemCombineInfo != null)
            var bankoisCheck = data.systemCombineInfo.some(x => x.isSelect == true);
        // var bankoisCheck = data.couponDetail.some(x => x.isExact == true);
        for (let i = 0; i < data.couponDetail.length; i++) {
            var pointer = replaceAll(data.couponDetail[i].pointer);
            //var pointerClass = CheckUpDownCouponClass(pointer, data.couponDetail[i].oc_rate, 1);
            var ocRate = parseFloat(data.couponDetail[i].oc_rate.toFixed(2));
            var bankoClass = CouponIsExactButtonCreate(data.couponDetail[i])
            Betobj.push({
                Pointer: pointer,
                Rate: ocRate
            });
            html += '<div class="evnRow">';
            html += '<p><b>' + data.couponDetail[i].teams + '</b>' + (bankoisCheck ? bankoClass : "") + '</p>';
            html += '<p>' + data.couponDetail[i].group_name + ` ${localizedData._Guess} :` + data.couponDetail[i].oc_name + ' <span>';
            html += (data.couponDetail[i].error ? ('<img src="/img/warning_inline.gif" /> ' + localizedData.GetCouponUpdateError) : data.couponDetail[i].oc_rate.toFixed(2)) + '</span ></p > ';
            html += '<i class="removeBet lnr lnr-cross" onclick="CouponDelete(' + data.couponDetail[i].gameId + ')"></i>';
            html += '</div>';

            ReCreateActv(pointer);
        }
        if (data.count <= 1) {
            $("#couponSystemHeader").hide();
        }
        //$("#MaxCoef").hide();
        var systemTableHtml = "";
        var systemHeader = "";
        for (var i in data.systemCombineInfo) {
            var imgCheckbox = data.systemCombineInfo[i].isSelect ? '<img src="/assets/img/accept.png" style="width:24px"  />' : "";
            systemTableHtml += ' <div class="row no-gutters mb-1"><div class="col" onclick="CouponSystemSelect(' + data.systemCombineInfo[i].combine + ')">';
            systemTableHtml += ' <span class="SystemModalImg">' + imgCheckbox + '</span>';
            systemTableHtml += ' <span class="SystemModalText" >' + data.systemCombineInfo[i].combine + ` ${localizedData._LiCombos1}` + '</span>';
            systemTableHtml += '<span class="SystemModalCount" > ' + data.systemCombineInfo[i].combineCount + '</span > ';
            systemTableHtml += ' </div></div>';
            if (data.systemCombineInfo[i].isSelect) {
                BetCount += data.systemCombineInfo[i].combineCount;
                systemHeader += data.systemCombineInfo[i].combine + "li +";
            }
        }
        if (BetCount == 0) BetCount = 1;
        $("#BalancePad").find("*").removeClass("active");
        if (data.amount == 30)
            $("[data=pad_30]").addClass("active");
        else if (data.amount == 150)
            $("[data=pad_150]").addClass("active");
        else if (data.amount == 300)
            $("[data=pad_300]").addClass("active");
        else {
            $("[data=pad_0]").addClass("active");
            $("[data=pad_0]").html(data.amount);
            $("[data=pad_0]").attr("onclick", "UpdateBetAmount(" + data.amount + ")")
        }
        amount = data.amount;
        if (data.error != null) {
            var message = localizedData[data.error.messege];
            html += ' <div class="blankText h5 _blankCoupon"> <img src="/assets/img/error.png" />' + message.format(data.error.value, localizedData._currencySym) + '</div>';
        }

        if (data.couponDetail.length > 0) {
            $("._blankCoupon").hide();
            $("._Couponlist").show();
            $("#bCountBottom").show();
            $("#bCountBottom").html(data.couponDetail.length);
        } else {
            $("._blankCoupon").show();
            $("#bCountBottom").hide();
            $("._Couponlist").hide();
        }
        if (data.count > 1 || bankoisCheck)
            $("#couponSystemHeader").show();
        if (systemHeader != "") {
            $("#couponSystemHeader > small").html(systemHeader.slice(0, -1) + `${localizedData._Combinations}`);
            $("#MaxCoefVal").html(data.coef.toFixed(2));
            $("#MaxCoef").show();
        } else {
            $("#couponSystemHeader > small").html(data.count + `${localizedData._LiCombos1}`)
        }
        $("#SystemModalBody").html(systemTableHtml);
        $("#BetEventRow").html(html);
        $("#TBCount").html(data.couponDetail.length + "\xa0");
        $("#MaxCoefVal").html(data.coef.toFixed(2));
        $("#BetAmoun").html(BetCount + " x " + data.amount + " " + localizedData._currency + " = " + data.totalAmount + " " + localizedData._currency);
        $("#maxkazanc").html(data.amountOut + " " + localizedData._currency);
    }
}
var BetCount = 1;



window.addEventListener('load', function() {
    $(".lazy").lazyload();
    var CouponInterval = setInterval(function() {
        
    }, 8000)
    $(window).blur(function() {
        clearInterval(CouponInterval);
    });
    $(window).focus(function() {
        CheckCouponRate()
        CouponInterval = null;
        CouponInterval = setInterval(function() {
            CheckCouponRate()
        }, 10000)
    });
})



function BetSave() {
    if ($("#SendBetBT").attr("disabled") == "disabled") return;
    if ($("#TBCount").html() != "") {
        var bName = '<span id="BTNmae_">' + $("#BTNmae_").html() + '</span>';
        $("#SendBetBT").html(bName + '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <i class="fas fa-caret-right"></i>');
        $("#SendBetBT").attr("disabled", true);
        $.get("/Coupon/SaveCoupon?AcceptChange=" + $('#acceptLiveOddsCheckBox').val(), function(data, xhr) {

            if (data != null) {
                if (data.count == 0) {
                    $("._blankCoupon").before('<div class="blankText h5 _blankCoupon"> <img src="/assets/img/success.png" />' + localizedData._YourCouponCreated + ' </div>');
                }
                CouponVisulation(data);
            }
        }).done(function() {
            $("#SendBetBT").html(bName + '<i class="fas fa-caret-right"></i>');
            $("#SendBetBT").attr("disabled", false);
        }).always(function(jqXHR) {
            if (jqXHR.status == 401)
                location.href = "/Account/Login";
        });
    }
}

function PadCouponBalanceUpdaer(type) {
    var padval = $("#PadWrite").html().replace(",", ".").replace(localizedData._currency, "");
    if (type == 1) {
        UpdateBetAmount(padval);
    } else {
        var decval = (parseFloat(padval) / BetCount);
        UpdateBetAmount(decval);
    }
    $("#PadWrite").html("0,00 " + localizedData._currency);
    decwrite = false;
}
var decwrite = false

function BalancePad(val, loc) {
    var padval = "";
    if (loc == "a") {
        padval = $("#PadWrite2").html();
    } else {
        padval = $("#PadWrite").html();
    }
    padval = padval.replace(' ' + localizedData._currency, '');
    var result = "";
    if (val == ".") {
        decwrite = decwrite == true ? false : true;
        return;
    } else if (val == "C") {
        if (decwrite == true) {
            result += padval.split(',')[0] + ",";
            result += padval.split(',')[1].slice(0, -1);
        } else
            result = padval.split(',')[0].slice(0, -1) + "," + padval.split(',')[1];
    } else {
        if (decwrite == true) {
            result += padval.split(',')[0] + ",";
            result += padval.split(',')[1] + val;
        } else
            result = padval.split(',')[0] + val + "," + padval.split(',')[1];
    }
    result = result.startsWith("0") ? result.substring(1) : result;
    result = (result.split(",")[1].length > 2 ? result.split(",")[0] + "," + result.split(",")[1].substring(1) : result);
    if (loc == "a")
        $("#PadWrite2").html(result + " " + localizedData._currency);
    else
        $("#PadWrite").html(result + " " + localizedData._currency);
}

function AmountOutCalc() {
    var padval = $("#PadWrite2").html().replace(",", ".").replace(localizedData._currency, "");
    var coef = $("#MaxCoefVal").html().replace(",", ".");
    var deccoef = Number((parseFloat(coef)).toFixed(2));
    var parsePad = Number((parseFloat(padval)).toFixed(2));;
    UpdateBetAmount(parsePad / deccoef);
    $("#PadWrite2").html("0,00 " + localizedData._currency);
    decwrite = false;
}

function CouponSystemSelect(id) {

    $.get("/Coupon/SystemSelect?select=" + id, function(data) {
        if (data != null) {
            CouponVisulation(data);
        }
    }).done(function() {

    })
}

function CouponDelete(id) {
    $.get("/Coupon/DeleteEvent?id=" + id, function(data) {
        if (data != null) {
            CouponVisulation(data);
        }

    }).done(function() {})
}

function UpdateBetAmount(amount) {
    if (amount == -1) {
        $("[data-target=#calcModal]").click();
        return;
    }
    var amount1 = "";
    if (typeof amount == "number") {
        amount1 = amount.toString().includes(".") ? ConvertNumber(amount, ".##") : ConvertNumber(amount, ".00");
    } else {
        amount1 = amount.includes(".") ? ConvertNumber(amount, ".##") : ConvertNumber(amount, ".00");
    }
    $.get("/Coupon/UpdateAmount?amount=" + amount1, function(data) {
        if (data != null) {
            CouponVisulation(data);
        }
    }).done(function() {

    })
}

function DeleteAllBet() {

    $.get("/Coupon/DeleteAll", function(data) {
        $(".actv").removeClass("actv");
        CouponVisulation(data);
    }).done(function() {

    })
}
//#endregion

$('body').on('change keyup', '#category-search', function(e) {
    var _val = e.target.value.toLowerCase();
    $('.category-item').removeClass('d-none');
    $.each($('.category-item'), function(i, e) {
        if (String($(e).data('title')).indexOf(_val) == -1) {
            $(e).addClass('d-none');
        }
    });
});
$('body').on('click', '.open-mobile-categories', function(e) {
    $('.mobile-categories').addClass('active');
});
$('body').on('click', '.close-mobile-categories', function(e) {
    $('.mobile-categories').removeClass('active');
});
$('body').on('click', '.show-password', function(e) {
    e.preventDefault();
    $(this).toggleClass('show');
    if ($(this).hasClass('show')) {
        $('#fPassword').attr('type', 'text');
    } else {
        $('#fPassword').attr('type', 'password');
    }
});
$('body').on('click', '[data-js=secure-password]', function(e) {
    e.preventDefault();
    var _field = $('#fPassword');
    var dataSet = _field.attr('data-character-set').split(',');
    var possible = '';
    if ($.inArray('a-z', dataSet) >= 0) {
        possible += 'abcdefghijklmnopqrstuvwxyz';
    }
    if ($.inArray('A-Z', dataSet) >= 0) {
        possible += 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    }
    if ($.inArray('0-9', dataSet) >= 0) {
        possible += '0123456789';
    }
    if ($.inArray('#', dataSet) >= 0) {
        possible += '![]{}()%&*$#^<>~@|';
    }
    var text = '';
    for (var i = 0; i < _field.attr('data-size'); i++) {
        text += possible.charAt(Math.floor(Math.random() * possible.length));
    }
    _field.val(text).attr('type', 'text');
    $('.show-password').addClass('show');
});
$('body').on('click', '.bonus-toggle-button', function(e) {
    e.preventDefault();
    $(this).find('i').toggleClass('d-none');
    $(this).next().slideToggle();
});