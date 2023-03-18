const connection = new signalR.HubConnectionBuilder()
    .withUrl("/BettingHub").configureLogging(signalR.LogLevel.None)
    .build();
var w = null;
var LiveSubGames = new Array();
async function start() {
    try {
        await connection.start();
        var path = window.location.pathname;
        if (path == "/EventLive" || path == "/EventLive/Detail") {
            connection.invoke("AddGroup", "Live-" + LocationChecker());
            if (LiveSubGames.length > 0) {
                LiveSubGames.forEach(element => connection.invoke("AddGroup", "SubLive-" + element));
            }
            if (typeof(Worker) !== "undefined") {
                if (w == null) {
                    w = new Worker("/assets/Worker.js");
                    console.log("Service Worker registered!");
                }
                w.onmessage = function(event) {
                    if (window.location.pathname == "/EventLive") {
                        ClearClass();
                        // console.log("ClearClass");
                    }
                    setTimeout(CheckCouponRate(), 2);

                };
            } else {
                setTimeout(function() {
                    //ClearClass();
                    CheckCouponRate();
                }, 3000);
                console.log("Browser not supported!");
            }
        }
        SearchPageChecker();
    } catch (err) {
        console.log(err);
        setTimeout(start, 5000);
    }
};
$(function() {
    if (connection.state != "Connected") {
        start();
    }
})

function SearchPageChecker() {
    var searchpage = $("#hubSearchUpdate").val()
    if (typeof searchpage != "undefined") {
        setInterval(function() {
            ClearClass();

        }, 7000);
        if (searchpage.includes(",")) {
            searchpage.split(",").forEach(function(number) {

                connection.invoke("AddGroup", "Live-" + number);
            });
        } else {
            if (searchpage != "")
                connection.invoke("AddGroup", "Live-" + searchpage);
        }
    }
}
connection.onclose(start);
//#region Connection
connection.on("UpdateOdds", (data) => {

    var ocElement = document.querySelector("[pointerHub=\x27" + data.oc_pointer.replaceAll("|", "").replaceAll(".", "") + "\x27]");
    if (ocElement != null) {
        setTimeout(function() {
            UpdateOcValue(data.oc_pointer, data.oc_rate);
        }, 0);

    } else {
        setTimeout(function() {
            AddPointer(data.oc_pointer, data.oc_rate, data.oc_name);
        }, 0);
    }
});
connection.on("Event", (data) => {
    setTimeout(function() {
        UpdateEvent(data);
    }, 0);
});
connection.on("EventSub", (data) => {
    setTimeout(function() {
        UpdateSubEvent(data);
    }, 0);
});
connection.on("DeleteEventSub", (data) => {
    setTimeout(function() {
        $("#" + data).remove();
    }, 0);
});
connection.on("ScoreUpdate", async (data) => {
    setTimeout(function score() {
        ScoreUpdate(data);
    }, 0);
});
connection.on("UpdateUpDown", async (data) => {
    setTimeout(function() {
        UpDownUpdateder(data);
    }, 0);
});
connection.on("Hadicap", async (data) => {
    setTimeout(function UpdateUpDown() {
        HandicapUpdater(data);
    }, 0);

});
connection.on("DeleteOdds", async (data) => {

    setTimeout(function DeleteOdds() {
        RemoveOdds(data);
    }, 0);

});
connection.on("UpdateLock", async (data) => {
    //var ocElement = document.querySelector("[pointerHub=\x27" + data.oc_pointer.replaceAll("|", "").replaceAll(".", "") + "\x27]");
    //if (ocElement != null) {
    setTimeout(function UpdateLock() {
        DisabledOc(data.oc_pointer, data.oc_rate, data.oc_block);
    }, 0);
    //}
});
connection.on("UpdateEvent", async (data) => {
    // console.log("EndUpdate");
});
connection.on("RemoveEvent", (data) => {
    setTimeout(function RemoveEvent() {
        $("#gid" + data).remove();
    }, 0);
});
connection.on("NewEvent", (data) => {
    // console.log(data);
});
//#endregion
//#region Methods


function UpdateEvent(data) {
    $("[data-update=1]").attr("data-update", 2)
    return new Promise(function(resolve, reject) {
        var oclist = data.game_oc_list;
        for (let i = 0; i < oclist.length; i++) {
            var detaillist = oclist[i].oc_list;
            for (let z = 0; z < detaillist.length; z++) {
                var ocElement = document.querySelector("[pointerHub=\x27" + detaillist[z].oc_pointer.replaceAll("|", "").replaceAll(".", "") + "\x27]");
                if (ocElement != null) {
                    var oc = detaillist[z];
                    if (oc.oc_block == true) {
                        setTimeout(DisabledOc(oc.oc_pointer, oc.oc_rate), 1);
                        ocElement.setAttribute("data-update", 1);
                    } else {
                        ocElement.setAttribute("data-update", 1);
                        // console.log(oc.oc_pointer + "--" + oc.oc_rate)
                        setTimeout(UpdateOcValueDetail(oc.oc_pointer, oc.oc_rate), 1);

                    }


                } else {
                    //  AddPointer(oc.oc_pointer, oc.oc_rate, oc.oc_name);

                }
            }


        }
        resolve("1");
    }).then(function() {

        $("[data-update=2]").hide();
        setTimeout(function() {
            ClearClass();
        }, 3000);
    })


}

function UpdateSubEvent(data) {
    $("[data-update=" + data.game_id + "-1]").attr("data-update", data.game_id + "-2")
    return new Promise(function(resolve, reject) {
        var oclist = data.game_oc_list;
        for (let i = 0; i < oclist.length; i++) {
            var detaillist = oclist[i].oc_list;
            for (let z = 0; z < detaillist.length; z++) {
                var ocElement = document.querySelector("[pointerHub=\x27" + detaillist[z].oc_pointer.replaceAll("|", "").replaceAll(".", "") + "\x27]");
                if (ocElement != null) {
                    var oc = detaillist[z];
                    if (oc.oc_block == true) {
                        setTimeout(DisabledOc(oc.oc_pointer, oc.oc_rate), 1);
                        ocElement.setAttribute("data-update", data.game_id + "-1");
                    } else {
                        ocElement.setAttribute("data-update", data.game_id + "-1");
                        // console.log(oc.oc_pointer + "--" + oc.oc_rate)
                        setTimeout(UpdateOcValueDetail(oc.oc_pointer, oc.oc_rate), 1);
                    }


                } else {
                    //  AddPointer(oc.oc_pointer, oc.oc_rate, oc.oc_name);

                }
            }


        }
        resolve("1");
    }).then(function() {

        $("[data-update=" + data.game_id + "-2]").hide();
        setTimeout(function() {
            ClearClass();
        }, 3000);
    })


}
var sporttimerList = [1, 2, 8, 7, 144, 85];

function LocationChecker() {
    var localtionSearc = window.location.search;
    return localtionSearc == "" ? "1" : localtionSearc.split("=")[1];

}

function ScoreUpdate(data) {
    var score = $("#" + data.gameId + "_score");
    var timer = $("#" + data.gameId + "_timer");
    var betCount = $("#" + data.gameId + "_count");

    if (typeof score != "undefined") {
        score.html(data.score);
    }
    if (typeof timer != "undefined") {
        if (sporttimerList.includes(data.sportId))
            if (data.game_desk == "Devre arası") {
                timer.html(localizedData._halfLive)
            } else {
                timer.html(((parseInt((data.time / 60))) + 1) + "'");
            }

        else
            timer.html(ReplaceAllGameDesk(data.game_desk));

    }
    if (typeof betCount != "undefined") {
        betCount.html("+" + data.betCount);
    }
}


function ReplaceAllGameDesk(desk) {
    return desk.replace("Devre arası", localizedData._halfLive).replace("devre arası", localizedData._halfLive).replace("Çeyrek", "P").replace("çeyrek", "P").replace(". Set", ".S").replace("İnning", "IN.").replace("inning", "IN.").replace("Inning", "IN.").replace("Raunt", "R").replace("çeyrek", "P").replace("raunt", "R").replace("frame", "F").replace("Frame", "F").replace("Uzatmalar", "Uz").replace("uzatmalar", "Uz").replace("Harita", "Map").replace("harita", "Map");
}

function RemoveOdds(data) {
    var split = data.split("-");
    if (split[1] == "1") {
        var Element = $("[data-update=" + split[0] + "11" + "]");
        var Element2 = $("[data-update=" + split[0] + "1X" + "]");
        var Element3 = $("[data-update=" + split[0] + "12" + "]");
        Element.html("");
        Element.attr("pointerHub", "");
        Element.attr("data-pointer", "");
        Element2.html("");
        Element2.attr("pointerHub", "");
        Element2.attr("data-pointer", "");
        Element3.html("");
        Element3.attr("pointerHub", "");
        Element3.attr("data-pointer", "");
    } else if (split[1] == "2766") {
        var Element = $("[data-update=" + split[0] + "27661" + "]");
        var Element2 = $("[data-update=" + split[0] + "2766X" + "]");
        var Element3 = $("[data-update=" + split[0] + "27662" + "]");
        Element.html("");
        Element.attr("pointerHub", "");
        Element.attr("data-pointer", "");
        Element2.html("");
        Element2.attr("pointerHub", "");
        Element2.attr("data-pointer", "");
        Element3.html("");
        Element3.attr("pointerHub", "");
        Element3.attr("data-pointer", "");
    } else if (split[1] == "8") {
        var Element = $("[data-update=" + split[0] + "81Х_" + "]");
        var Element2 = $("[data-update=" + split[0] + "812_" + "]");
        var Element3 = $("[data-update=" + split[0] + "82Х_" + "]");
        Element.html("");
        Element.attr("pointerHub", "");
        Element.attr("data-pointer", "");
        Element2.html("");
        Element2.attr("pointerHub", "");
        Element2.attr("data-pointer", "");
        Element3.html("");
        Element3.attr("pointerHub", "");
        Element3.attr("data-pointer", "");
    } else if (split[1] == "17") {
        var Element = $("[data-update=" + split[0] + "17up" + "]");
        var Element2 = $("[data-update=" + split[0] + "17down" + "]");
        var Element3 = $("[data-update=" + split[0] + "rate" + "]");
        Element.html("");
        Element.attr("pointerHub", "");
        Element.attr("data-pointer", "");
        Element2.html("");
        Element2.attr("pointerHub", "");
        Element2.attr("data-pointer", "");
        Element3.html("");
    } else if (split[1] == "2") {
        var Element = $("[data-update=" + split[0] + "2uph" + "]");
        var Element2 = $("[data-update=" + split[0] + "2downh" + "]");
        var Element3 = $("[data-update=" + split[0] + "rateh" + "]");
        Element.html("");
        Element.attr("pointerHub", "");
        Element.attr("data-pointer", "");
        Element2.html("");
        Element2.attr("pointerHub", "");
        Element2.attr("data-pointer", "");
        Element3.html("");
    }
}

function AddPointer(ocpointer, ocrate, oc_name) {
    var splitData = ocpointer.split("|");
    if (splitData[1] == "1") {
        var Element = $("[data-update=" + splitData[0] + splitData[1] + oc_name.replace(" Normal Sürede", "") + "]");
        if (typeof Element != "undefined") {
            Element.attr("pointerHub", ocpointer.replaceAll("|", "").replaceAll(".", ""));
            Element.attr("data-pointer", "live@" + ocpointer);
            Element.html("<span class='_Rate bet_up'>" + ocrate.toFixed(2) + "</span>");
            //console.log("-----------pointerHub"+ ocpointer.replaceAll("|", "").replaceAll(".", ""));
        }
    }
    if (splitData[1] == "8") {
        var name = "";
        if (splitData[2] == "4") {
            name = "1Х_";
        }
        if (splitData[2] == "5") {
            name = "12_";
        }
        if (splitData[2] == "6") {
            name = "2Х_";
        }
        var Element = $("[data-update=" + splitData[0] + splitData[1] + name + "]");
        if (typeof Element != "undefined") {
            Element.attr("pointerHub", ocpointer.replaceAll("|", "").replaceAll(".", ""));
            Element.attr("data-pointer", "live@" + ocpointer);
            Element.html("<span class='_Rate bet_up'>" + ocrate.toFixed(2) + "</span>");

            // console.log("-----------pointerHub" + ocpointer.replaceAll("|", "").replaceAll(".", ""));
        }
    }

}

function CheckPageOcPointer(ocPointerId) {
    return UndefinedChecker($("[pointerHub=" + ocPointerId.replaceAll("|", "").replaceAll(".", "") + "]").html());
}

function UpDownUpdateder(OcGroup2) {
    return new Promise(function(resolve, reject) {
        var thenVal = false;
        for (let i = 0; i < OcGroup2.oc_list.length; i++) {
            var ocElement = document.querySelector("[pointerHub=\x27" + OcGroup2.oc_list[i].oc_pointer.replaceAll("|", "").replaceAll(".", "") + "\x27]");
            if (ocElement != null) {
                UpdateOcValue(OcGroup2.oc_list[i].oc_pointer, OcGroup2.oc_list[i].oc_rate);
                thenVal = true;

            }
        }
        resolve(thenVal);
    }).then(function(val) {
        if (val != true) {

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
            var ElementUP = $("[data-update=" + SplitData[0] + "17up" + "]");
            var ElementDown = $("[data-update=" + SplitData[0] + "17down" + "]");
            var ElementRate = $("[data-update=" + SplitData[0] + "rate" + "]");
            if (typeof ElementUP != "undefined") {
                ElementUP.attr("pointerHub", UP.oc_pointer.replaceAll("|", "").replaceAll(".", ""));
                ElementUP.attr("data-pointer", "live@" + UP.oc_pointer);
                ElementUP.html("<span class='_Rate bet_up'>" + UP.oc_rate.toFixed(2) + "</span>");

                ElementDown.attr("pointerHub", DOWN.oc_pointer.replaceAll("|", "").replaceAll(".", ""));
                ElementDown.attr("data-pointer", "live@" + DOWN.oc_pointer);
                ElementDown.html("<span class='_Rate bet_up'>" + DOWN.oc_rate.toFixed(2) + "</span>");
                ElementRate.html("<span>" + SplitData[3] + "</span>")

            }
        }
    })

}

function HandicapUpdater(OcGroup2) {
    return new Promise(function(resolve, reject) {
        var thenVal = false;
        for (let i = 0; i < OcGroup2.oc_list.length; i++) {
            var ocElement = document.querySelector("[pointerHub=\x27" + OcGroup2.oc_list[i].oc_pointer.replaceAll("|", "").replaceAll(".", "") + "\x27]");
            if (ocElement != null) {
                UpdateOcValue(OcGroup2.oc_list[i].oc_pointer, OcGroup2.oc_list[i].oc_rate);
                thenVal = true;
            }
        }
        resolve(thenVal);
    }).then(function(val) {
        if (val == true) {
            return false;
        }
        var UPORDOWN = OcGroup2.oc_list[0];
        var SplitData = UPORDOWN.oc_pointer.split('|');
        var UP = "";
        var DOWN = "";
        var query = SplitData[2] == "8" ? "7" : "8";
        if (SplitData[3].includes("-")) {
            DOWN = UPORDOWN;
        } else {
            UP = UPORDOWN;
        }
        if (UP == "") {
            UP = OcGroup2.oc_list.filter(function(a) {
                return a.oc_pointer == SplitData[0] + '|' + SplitData[1] + '|' + query + '|' + SplitData[3].replace("-", "")
            })[0]
        }
        if (DOWN == "") {
            DOWN = OcGroup2.oc_list.filter(function(a) {
                return a.oc_pointer == SplitData[0] + '|' + SplitData[1] + '|' + query + '|-' + SplitData[3]
            })[0]
        }
        var ElementUP = $("[data-update=" + SplitData[0] + "2uph" + "]");
        var ElementDown = $("[data-update=" + SplitData[0] + "2downh" + "]");
        var ElementRate = $("[data-update=" + SplitData[0] + "rateh" + "]");
        if (typeof ElementUP != "undefined" && typeof UP != "undefined") {
            ElementUP.attr("pointerHub", UP.oc_pointer.replaceAll("|", "").replaceAll(".", ""));
            ElementUP.attr("data-pointer", "live@" + UP.oc_pointer);
            ElementUP.html("<span class='_Rate bet_up'>" + UP.oc_rate.toFixed(2) + "</span>");
        }
        if (typeof ElementDown != "undefined" && typeof DOWN != "undefined") {
            ElementDown.attr("pointerHub", DOWN.oc_pointer.replaceAll("|", "").replaceAll(".", ""));
            ElementDown.attr("data-pointer", "live@" + DOWN.oc_pointer);
            ElementDown.html("<span class='_Rate bet_up'>" + DOWN.oc_rate.toFixed(2) + "</span>");
            ElementRate.html("<span>" + SplitData[3] + "</span>")
        }

    })

}

function UndefinedChecker(Val) {
    if (typeof Val === "undefined") {
        return false;
    }
    return true;
}

function GetOcElement(ocPointerId) {
    var ocElement = $("[pointerHub=" + ocPointerId.replaceAll("|", "").replaceAll(".", "") + "]");
    return ocElement;
}

function UpdateOcValueDetail(ocPointerId, ocRate) {
    var ocElement = GetOcElement(ocPointerId);
    //console.log(ocPointerId);
    // console.log(ocRate);
    ocElement.show();
    ocElement.removeClass(DisabledClass);
    var rate = parseFloat(parseFloat(ocRate).toFixed(2));
    var htmldata = ocElement.children("b").children("small").html();
    CouponBetOddsUpdate(ocPointerId, rate);
    var UcRateParse = 1;
    if (typeof htmldata == "undefined") {
        ocElement.html("<b><small>1</small></b>");
        ocElement = GetOcElement(ocPointerId);
    } else {
        UcRateParse = parseFloat(ocElement.children("b").children("small").html().replace(",", "."));
    }
    if (rate > UcRateParse) {
        // console.log(rate + " ->- " + UcRateParse + " Bet_Up");
        ocElement.children("b").children("small").html(rate.toFixed(2));
        ocElement.children("b").addClass(OcUpClass);

    } else if (rate < UcRateParse) {
        // console.log(parseFloat(rate) + " -<- " + UcRateParse + " Bet_down");
        ocElement.children("b").children("small").html(rate.toFixed(2));
        ocElement.children("b").addClass(OcDownClass);

    }


    //  IsUpdate(ocElement);
}

function UpdateOcValue(ocPointerId, ocRate) {
    var ocElement = GetOcElement(ocPointerId);
    ocElement.removeClass(DisabledClass);
    var rate = parseFloat(parseFloat(ocRate).toFixed(2));
    var htmldata = ocElement.children("span").html();
    CouponBetOddsUpdate(ocPointerId, rate);
    var UcRateParse = 1;
    if (typeof htmldata == "undefined") {
        ocElement.html("<span>1</span>");
        ocElement = GetOcElement(ocPointerId);
    } else {
        UcRateParse = parseFloat(ocElement.children("span").html().replace(",", "."));
    }
    if (rate == UcRateParse) {
        return false;
    } else if (rate > UcRateParse) {
        // console.log(rate + " ->- " + UcRateParse + " Bet_Up");
        ocElement.children("span").html(rate.toFixed(2));
        ocElement.children("span").addClass(OcUpClass);


    } else if (rate < UcRateParse) {
        // console.log(parseFloat(rate) + " -<- " + UcRateParse + " Bet_down");
        ocElement.children("span").html(rate.toFixed(2));
        ocElement.children("span").addClass(OcDownClass);

    }


    //  IsUpdate(ocElement);
}

function DisabledOc(ocPointerId, ocRate) {
    var ocElement = GetOcElement(ocPointerId);
    ocElement.show();
    ocElement.addClass(DisabledClass);
    ocElement.children("span").html(ocRate);
}

function ClearClass() {
    $(".bet_down").removeClass("bet_down");
    $(".bet_up").removeClass("bet_up");
}

const DisabledClass = "oddBtnDisabled";
const OcUpClass = "bet_up";
const OcDownClass = "bet_down";
const ActiveClass = "actv";
const ClassRemoverTime = 2000;
//#endregion



function EventHubUpdater() {
    const DisabledClass = "oddBtnDisabled";
    const OcUpClass = "bet_up";
    const OcDownClass = "bet_down";
    const ActiveClass = "actv";
    const ClassRemoverTime = 2000;

    function CheckPageSport(sportId) {
        return UndefinedChecker($("#_sport-" + sportId).html());
    }

    function CheckPageCountry(countryId) {
        return UndefinedChecker($("#_country-" + countryId).html());
    }

    function CheckPageOcGroup(ocGroupId, eventId) {
        return UndefinedChecker($("[data-OCGroup=" + ocGroupId + "_" + eventId + "]").html());
    }

    function CheckPageOcPointer(ocPointerId) {
        return UndefinedChecker($("[pointerHub=" + ocPointerId.replaceAll("|", "").replaceAll(".", "") + "]").html());
    }

    function IsUpdate(xElement) {
        xElement.attr("data-IsUpdate", 2);
    }

    function UpdateOcValue(ocPointerId, ocRate) {
        var ocElement = GetOcElement(ocPointerId);
        ocElement.removeClass(DisabledClass);
        var UcRateParse = parseFloat(ocElement.children("span").html());
        if (parseFloat(ocRate) > UcRateParse) {
            //console.log(parseFloat(ocRate) + " ->- " + UcRateParse + " Bet_Up");
            ocElement.children("span").html(ocRate);
            ocElement.children("span").addClass(OcUpClass);
            ClassRemover(ocElement, OcUpClass)
        } else if (parseFloat(ocRate) < UcRateParse) {
            ocElement.children("span").html(ocRate);
            ocElement.children("span").addClass(OcDownClass);
            // console.log(parseFloat(ocRate) + " -<- " + UcRateParse + " Bet_down")
            ClassRemover(ocElement, OcDownClass);
        }
        IsUpdate(ocElement);
    }

    function DisabledOc(ocPointerId, ocRate, status) {
        var ocElement = GetOcElement(ocPointerId);
        if (status == true) {
            ocElement.removeClass(DisabledClass);
            ocElement.children("span").html(ocRate);
            return true;
        }
        ocElement.addClass(DisabledClass);
        ocElement.children("span").html(ocRate);
    }

    function GetOcElement(ocPointerId) {
        var ocElement = $("[pointerHub=" + ocPointerId.replaceAll("|", "").replaceAll(".", "") + "]");
        return ocElement;
    }
    async function ClassRemover(xElement, removeClass) {
        await new Promise(r => setTimeout(r, ClassRemoverTime));
        xElement.children("span").removeClass(removeClass);
    }

    function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }

    function UndefinedChecker(Val) {
        if (typeof Val === "undefined") {
            return false;
        }
        return true;
    }




    return {
        CheckSportId: CheckPageSport,
        CheckCountryId: CheckPageCountry,
        CheckPageOcPointer: CheckPageOcPointer,
        UpdateOcValue: UpdateOcValue,
        DisabledOc: DisabledOc

    }
}

const container = EventHubUpdater();