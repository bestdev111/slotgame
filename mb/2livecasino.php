<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:login.php"); die(); exit(); }
if(userayar('casino_yetki')!='1') { header("Location:../mb"); }
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="format-detection" content="telephone=no">
    <meta name="robots" content="noindex">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <title><?=getTranslation('yeniyerler_kasa132')?></title>
    <style>
        .loading-page {
            padding-top: 5em;
        }

        .loader {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .loader>div>div {
            width: 11px;
            height: 11px;
            margin: 0 5px;
            background-color: #000;
        }
		@keyframes hello {
		0% {
			opacity: 0.1;
		}
		50% {
			opacity: 999.9;
		}
		100% {
			opacity: 0.1;
		}
		}
    </style>
    <style data-emotion="css"></style>
    <link rel="stylesheet" type="text/css" href="../casino/mobil/game.494bf0cf2cb388e00720.css?v=1598105991" data-link-css="">
    <link rel="stylesheet" type="text/css" href="../casino/mobil/2.494bf0cf2cb388e00720.css?v=1598105991">
    <link rel="stylesheet" type="text/css" href="../casino/mobil/13.494bf0cf2cb388e00720.css?v=1598105991">
    <link rel="stylesheet" type="text/css" href="../casino/mobil/17.494bf0cf2cb388e00720.css?v=1598105991">
    <link rel="stylesheet" type="text/css" href="../casino/mobil/9.494bf0cf2cb388e00720.css?v=1598105991">
	<link type="text/css" rel="stylesheet" href="assets/css/mobile4.css?v=1.1.431577471967"/>
    <style type="text/css">
	.tabs-bar-scrollable a 
	{
        color: #FFF;
        text-decoration: none;
	}
        .__react_component_tooltip {
            border-radius: 3px;
            display: inline-block;
            font-size: 13px;
            left: -999em;
            opacity: 0;
            padding: 8px 21px;
            position: fixed;
            pointer-events: none;
            transition: opacity 0.3s ease-out;
            top: -999em;
            visibility: hidden;
            z-index: 999;
        }

        .__react_component_tooltip.allow_hover,
        .__react_component_tooltip.allow_click {
            pointer-events: auto;
        }

        .__react_component_tooltip::before,
        .__react_component_tooltip::after {
            content: "";
            width: 0;
            height: 0;
            position: absolute;
        }

        .__react_component_tooltip.show {
            opacity: 0.9;
            margin-top: 0;
            margin-left: 0;
            visibility: visible;
        }

        .__react_component_tooltip.place-top::before {
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            bottom: -8px;
            left: 50%;
            margin-left: -10px;
        }

        .__react_component_tooltip.place-bottom::before {
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            top: -8px;
            left: 50%;
            margin-left: -10px;
        }

        .__react_component_tooltip.place-left::before {
            border-top: 6px solid transparent;
            border-bottom: 6px solid transparent;
            right: -8px;
            top: 50%;
            margin-top: -5px;
        }

        .__react_component_tooltip.place-right::before {
            border-top: 6px solid transparent;
            border-bottom: 6px solid transparent;
            left: -8px;
            top: 50%;
            margin-top: -5px;
        }

        .__react_component_tooltip .multi-line {
            display: block;
            padding: 2px 0;
            text-align: center;
        }
.games-navigation .tabs-bar-item {
    padding: .6em 1.7em;
}
.video {
    overflow: hidden;
padding: 0;
}
.casino-holder iframe {
    width: 100%;
    height: 280px;
    margin-top: -100px;
    display: block;
}
#casino-video .container
{

    height: calc(56vw);
}

.odd-item-dropdown
{

    display: none;
}


.casino-bet-open
{
    display: block;
    float: right;
    margin-right: 5px;
    margin-top: -17px;

}
.odd-item-info .odd-item-status, .odd-item-info .odd-value {
    margin-right: 3px;
}

.lottery-items {
  display: flex;
  flex-wrap: wrap; }

.lottery-items .lottery-item {
  width: 30px;
  height: 30px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #000;
  border-radius: 30px;
  margin: 5px;
  border: 1px solid #000;
  font-weight: 600;
  cursor: default; }

.casino-bet-items .lottery-items .lottery-item {
  cursor: pointer; }

.casino-cp .lottery-items .lottery-item {
  width: 26px;
  height: 26px;
  margin: 3px; }

.casino-cp .lottery-items {
  margin-left: -3px; }

.coupon-played .lottery-items {
  justify-content: center;
  max-width: unset !important; }

.coupon-played .lottery-items .lottery-item {
  width: 26px;
  height: 26px;
  margin: 1px; }

.lottery-item.li-black {
  background: #5b5b5b linear-gradient(180deg, #5b5b5b, #282828) !important;
  border-color: #282828 #282828 #1c1c1c !important;
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.33) !important;
  color: #fff !important; }

.lottery-item.li-grey {
  background: #5b5b5b linear-gradient(180deg, #5b5b5b, #282828) !important;
  border-color: #282828 #282828 #1c1c1c !important;
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.33) !important;
  color: #fff !important; }

.lottery-item.li-yellow {
  background: #ffad32 linear-gradient(180deg, #ffad32, #cc7a00) !important;
  border-color: #cc7a00 #cc7a00 #b36b00 !important;
  text-shadow: 0 1px 1px rgba(255, 255, 255, 0.33) !important;
  color: #333; }

.lottery-item.li-white {
  background: #f9f9f9 linear-gradient(180deg, #f9f9f9, #d6d6d6) !important;
  border-color: #d6d6d6 #d6d6d6 #cdcdcd !important;
  text-shadow: 0 1px 1px rgba(255, 255, 255, 0.23) !important;
  color: #333 !important; }

.lottery-item.li-green {
  background: #398f28 linear-gradient(180deg, #398f28, #193f11) !important;
  border-color: #193f11 #193f11 #122c0c !important;
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.33) !important;
  color: #fff !important; }

.lottery-item.li-red {
  background: #e52828 linear-gradient(180deg, #e52828, #961111) !important;
  border-color: #961111 #961111 #800f0f !important;
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.33) !important;
  color: #fff !important; }

.lottery-item.li-blue {
  background: #5990d8 linear-gradient(180deg, #5990d8, #193c6b) !important;
  border-color: #193c6b #193c6b #112948 !important;
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.56) !important;
  color: #fff !important; }

.lottery-selector {
  display: flex; 
}

.lottery-selector .lottery-item {
  width: 30px;
  height: 30px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #191919;
  border-radius: 30px;
  margin: 5px;
  border: 1px solid #000;
  font-weight: 600;
  cursor: pointer; 
}
.report {
    position: relative;
}
.report header {
    padding-left: 1em;
    padding-right: 1em;
}
.report .header-title {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: justify;
    -webkit-justify-content: space-between;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -webkit-flex-wrap: wrap;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -ms-flex-align: center;
    align-items: center;
}
.report .header-title h1 {
    font-size: 1.5em;
    margin-right: .5em;
}
.report  .header-filters-count-1.header-filters {
    width: 100%;
    margin-bottom: 16px;
}




.ui-datepicker {
    display: none;
    padding: .2em .2em 0;
    width: 17em;
    background-color: var(--dialog);
    color: var(--dialog-text);
    font-family: inherit;
    border-color: var(--border);
    border-radius: var(--border-radius-sm);
    border: 1px solid #b1b1b1;
}

.ui-datepicker .ui-datepicker-header,.ui-datepicker thead {
    padding: .2em 0;
    position: relative;
text-align: center;
    background-color: #f0f0f0;
    border-bottom: 1px solid #aeaeae;
    border-top-left-radius: .3rem;
    border-top-right-radius: .3rem;
    padding-top: 8px;
    position: relative;
}

.ui-datepicker .ui-datepicker-prev, .ui-datepicker .ui-datepicker-next {
height: 1.8em;
    position: absolute;
    top: 11px;
    width: 1.8em;
}

.ui-datepicker .ui-datepicker-prev-hover, .ui-datepicker .ui-datepicker-next-hover { top: 1px; }

.ui-datepicker .ui-datepicker-prev { left: 2px; }

.ui-datepicker .ui-datepicker-next { right: 2px; }

.ui-datepicker .ui-datepicker-prev-hover { left: 1px; }

.ui-datepicker .ui-datepicker-next-hover { right: 1px; }

.ui-datepicker .ui-datepicker-prev span, .ui-datepicker .ui-datepicker-next span {
    display: block;
    left: 50%;
    margin-left: -8px;
    margin-top: -8px;
    position: absolute;
    top: 50%;

}

.ui-datepicker .ui-datepicker-title {
    margin-top: 0;
    color: #000;
    font-weight: 700;
    font-size: .944rem;
    text-align: center;
}

.ui-datepicker .ui-datepicker-title select {
    font-size: 1em;
    margin: 1px 0;
}

.ui-datepicker select.ui-datepicker-month-year { width: 100%; }

.ui-datepicker select.ui-datepicker-month,
.ui-datepicker select.ui-datepicker-year { width: 49%; }

.ui-datepicker table {
    border-collapse: collapse;
    font-size: .9em;
    margin: 0 0 .4em;
    width: 100%;
}

.ui-datepicker th {
    border: 0;
    font-weight: bold;
    padding: .7em .3em;
    text-align: center;
}

.ui-datepicker td {
    border: 0;
    padding: 1px;
}

.ui-datepicker td span, .ui-datepicker td a {
    display: block;
    padding: .2em;
    text-align: right;
    text-decoration: none;
color: #000 !important;
    display: inline-block;
    line-height: 1.7rem;
    text-align: center;
}


.ui-datepicker td .ui-state-active
{
background-color: var(--secondary);
    color: #fff !important;
    border-radius: 5px;
}
.ui-datepicker .ui-datepicker-buttonpane {
    background-image: none;
    border-bottom: 0;
    border-left: 0;
    border-right: 0;
    margin: .7em 0 0 0;
    padding: 0 .2em;
}

.ui-datepicker .ui-datepicker-buttonpane button {
    cursor: pointer;
    float: right;
    margin: .5em .2em .4em;
    overflow: visible;
    padding: .2em .6em .3em .6em;
    width: auto;
}

.ui-datepicker .ui-datepicker-buttonpane button.ui-datepicker-current { float: left; }

/* with multiple calendars */

.ui-datepicker.ui-datepicker-multi { width: auto; }

.ui-datepicker-multi .ui-datepicker-group { float: left; }

.ui-datepicker-multi .ui-datepicker-group table {
    margin: 0 auto .4em;
    width: 95%;
}

.ui-datepicker-multi-2 .ui-datepicker-group { width: 50%; }

.ui-datepicker-multi-3 .ui-datepicker-group { width: 33.3%; }

.ui-datepicker-multi-4 .ui-datepicker-group { width: 25%; }

.ui-datepicker-multi .ui-datepicker-group-last .ui-datepicker-header { border-left-width: 0; }

.ui-datepicker-multi .ui-datepicker-group-middle .ui-datepicker-header { border-left-width: 0; }

.ui-datepicker-multi .ui-datepicker-buttonpane { clear: left; }

.ui-datepicker-row-break {
    clear: both;
    font-size: 0em;
    width: 100%;
}

/* RTL support */

.ui-datepicker-rtl { direction: rtl; }

.ui-datepicker-rtl .ui-datepicker-prev {
    left: auto;
    right: 2px;
}

.ui-datepicker-rtl .ui-datepicker-next {
    left: 2px;
    right: auto;
}

.ui-datepicker-rtl .ui-datepicker-prev:hover {
    left: auto;
    right: 1px;
}

.ui-datepicker-rtl .ui-datepicker-next:hover {
    left: 1px;
    right: auto;
}

.ui-datepicker-rtl .ui-datepicker-buttonpane { clear: right; }

.ui-datepicker-rtl .ui-datepicker-buttonpane button { float: left; }

.ui-datepicker-rtl .ui-datepicker-buttonpane button.ui-datepicker-current { float: right; }

.ui-datepicker-rtl .ui-datepicker-group { float: right; }

.ui-datepicker-rtl .ui-datepicker-group-last .ui-datepicker-header {
    border-left-width: 1px;
    border-right-width: 0;
}

.ui-datepicker-rtl .ui-datepicker-group-middle .ui-datepicker-header {
    border-left-width: 1px;
    border-right-width: 0;
}

/* IE6 IFRAME FIX (taken from datepicker 1.5.3 */

.ui-datepicker-cover {
    filter: mask(); /*must have*/
    height: 200px; /*must have*/
    left: -4px; /*must have*/
    position: absolute; /*must have*/
    top: -4px; /*must have*/
    width: 200px; /*must have*/
    z-index: -1; /*must have*/
}
.ui-datepicker-next {
    font-family: BetGamesIcons!important;
    speak: none;
    font-style: normal;
    font-weight: 400;
    font-variant: normal;
    text-transform: none;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
.ui-icon-circle-triangle-e {
    content: "\e901";
}
.bets-history-table-mobile .bet-item {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -webkit-flex-direction: column;
    -ms-flex-direction: column;
    flex-direction: column;
    -webkit-box-pack: center;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
    justify-content: center;
    margin-bottom: .3em;
    border: 1px solid var(--border);
    border-radius: var(--border-radius-sm);
    background: var(--reports);
    color: var(--reports-text);
    padding: 1em 1.3em .5em;
}
.bets-history-table-mobile .bet-main-details, .bets-history-table-mobile .bet-secondary-details {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
    -webkit-flex-direction: row;
    -ms-flex-direction: row;
    flex-direction: row;
    -webkit-box-pack: justify;
    -webkit-justify-content: space-between;
    -ms-flex-pack: justify;
    justify-content: space-between;
}
.bets-history-table-mobile .bet-odd-name-results {
    -webkit-box-flex: 1;
    -webkit-flex-grow: 1;
    -ms-flex-positive: 1;
    flex-grow: 1;
}
.bets-history-table-mobile .bet-odd-name {
    width: 90%;
    padding-bottom: .6em;
}
.game-result {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-flex-wrap: wrap;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -ms-flex-align: center;
    align-items: center;
    direction: ltr;
}
.results-player-cards {
    border: 1px solid transparent;
}
.results-player-cards:not(:last-child) {
    margin-right: .3em;
}
.results-player-name {
    text-transform: uppercase;
}
.winner {
    padding: .15em;
    border: 1px solid var(--success-text);
}
.bets-history-table-mobile .bet-secondary-details {
    font-size: .8em;
    -webkit-box-align: stretch;
    -webkit-align-items: stretch;
    -ms-flex-align: stretch;
    align-items: stretch;
    margin-top: 1em;
}
.bets-history-table-mobile .bet-run-id, .bets-history-table-mobile .bet-time {
    color: var(--text-alternate);
    -webkit-align-self: center;
    -ms-flex-item-align: center;
    align-self: center;
}

.bets-history-table-mobile .bet-time {
    -webkit-box-flex: 0;
    -webkit-flex-grow: 0;
    -ms-flex-positive: 0;
    flex-grow: 0;
    margin-right: .5em;
}
.bets-history-table-mobile .bet-run-id {
    -webkit-box-flex: 1;
    -webkit-flex-grow: 1;
    -ms-flex-positive: 1;
    flex-grow: 1;
    margin-right: .7em;
}
.bets-history-table-mobile .bet-amount, .bets-history-table-mobile .bet-amount-won {
    text-align: right;
    -webkit-box-flex: 0;
    -webkit-flex-grow: 0;
    -ms-flex-positive: 0;
    flex-grow: 0;
}
.bets-history-table-mobile .bet-amount {
    margin-right: 1.4em;
}
.bets-history-table-mobile .bet-amount-label {
    font-size: .7em;
    text-transform: uppercase;
    color: var(--text-alternate);
}
.bets-history-table-mobile .bet-amount-value {
    font-size: 1.15em;
    font-weight: 700;
}
.bet-lottery.betgames-icon {
    opacity: .5;
    line-height: 1.5;
    margin-right: .6em;
}

.message {
    text-align: center;
    font-weight: 400;
    font-size: 1.3em;
    padding: 1.7em .5em;
}
.empty-reports-message {
    color: var(--text-alternate);
}
.empty-reports-message .betgames-icon {
    display: block;
    font-size: 3.6em;
    opacity: .2;
    margin-bottom: .3em;
}
.empty-reports-title {
    font-weight: 700;
    font-size: 1.1em;
}
.statucasino-2 {
color: red !important;
}
.statucasino-1 {
color: green !important;
}
.statucasino-4 {
color: #35619a !important;
}

.game-result .side-bets {
clear: both;
    width: 100%;
    float: left;
    color: #000;
    margin-top: 2px;
    font-size: 12px;
}



.game-result .ball-item
{
width: 2.0em;
height: 2.0em;
}

.lobby {
background: rgb(238, 238, 238);
color: var(--lobby-text);
margin-bottom: 50px;
margin-top: 42px;
}
.lobby-list {
    max-width: 1260px;
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: start;
    -webkit-justify-content: flex-start;
    -ms-flex-pack: start;
    justify-content: flex-start;
    -webkit-flex-wrap: wrap;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-left: auto;
    margin-right: auto;
    padding: 10px;
}
.lobby-item-container {
    -webkit-box-flex: 0;
    -webkit-flex: 0 1 50%;
    -ms-flex: 0 1 50%;
    flex: 0 1 50%;
}
@media (max-width: 799px)
.lobby-item-container {
    -webkit-flex-basis: 50%;
    -ms-flex-preferred-size: 50%;
    flex-basis: 50%;
}
.lobby-item {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -webkit-flex-direction: column;
    -ms-flex-direction: column;
    flex-direction: column;
    -webkit-box-align: stretch;
    -webkit-align-items: stretch;
    -ms-flex-align: stretch;
    align-items: stretch;
    border-radius: 6px;
    -webkit-box-shadow: 0 2px 5px 0 var(--shadow-color);
    box-shadow: 0 2px 5px 0 var(--shadow-color);
    background: var(--lobby-item);
    margin: 5% 6%;
    color: inherit;
}
@media (max-width: 439px)
.lobby-item {
    margin-top: 3%;
    margin-bottom: 3%;
}
.lobby-item .game-image {
    position: relative;
    overflow: hidden;
    padding-top: 62.5%;
    border-top-left-radius: 6px;
    border-top-right-radius: 6px;
}
.lobby-item .game-image-11 {
    background: url(images/lobby-speedy7.fb6169c…jpg) top;
    background-size: cover;
}
.lobby-item .game-image-box, .lobby-item .play-button-box {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    position: absolute;
    top: 0;
}
.lobby-item .play-button-box {
    -webkit-box-align: center;
    -webkit-align-items: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: center;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
    justify-content: center;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,.6);
    opacity: 0;
    color: #fff;
    font-size: 4em;
    -webkit-transition: opacity .2s ease-out;
    -o-transition: opacity .2s ease-out;
    transition: opacity .2s ease-out;
}
.betgames-icon {
    font-family: BetGamesIcons!important;
    speak: none;
    font-style: normal;
    font-weight: 400;
    font-variant: normal;
    text-transform: none;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
.betgames-icon.play:before {
    content: "\e91e";
}
.lobby-item .game-image-box {
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -webkit-flex-direction: column;
    -ms-flex-direction: column;
    flex-direction: column;
    -webkit-box-pack: start;
    -webkit-justify-content: flex-start;
    -ms-flex-pack: start;
    justify-content: flex-start;
    -webkit-box-align: start;
    -webkit-align-items: flex-start;
    -ms-flex-align: start;
    align-items: flex-start;
    left: 0;
    right: 0;
    bottom: 0;
    direction: ltr;
}
.lobby-item .game-image-box, .lobby-item .play-button-box {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    position: absolute;
    top: 0;
}
.lobby-item .image-label {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -webkit-flex-direction: column;
    -ms-flex-direction: column;
    flex-direction: column;
    -webkit-box-pack: center;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
    justify-content: center;
    min-width: 18%;
    min-height: 15%;
    padding: 0 2.2%;
    margin-top: 3%;
    margin-left: 3%;
    border-radius: var(--border-radius-sm);
    text-align: center;
    background: #000;
    color: #fff;
}
.lobby-item .image-label.live {
    background: #d60000;
}
.lobby-item .game-name {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: center;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
    justify-content: center;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -ms-flex-align: center;
    align-items: center;
    height: 30px;
    font-family: var(--font-condensed);
    font-weight: 700;
}

.footer .text, .footer .count
{

font-family: 'Roboto Condensed', helvetica, sans-serif;
    box-sizing: initial;
}

.lobby-item .game-image-8 {
    background: url(../casino/mobil/lobby-8.jpg) top;
    background-size: cover;
}
.lobby-item .game-image-1 {
    background: url(../casino/mobil/lobby-1.jpg) top;
    background-size: cover;
}
.lobby-item .game-image-2 {
    background: url(../casino/mobil/lobby-2.jpg) top;
    background-size: cover;
}
.lobby-item .game-image-3 {
    background: url(../casino/mobil/lobby-3.jpg) top;
    background-size: cover;
}
.lobby-item .game-image-4 {
    background: url(../casino/mobil/lobby-4.jpg) top;
    background-size: cover;
}
.lobby-item .game-image-5 {
    background: url(../casino/mobil/lobby-5.jpg) top;
    background-size: cover;
}
.lobby-item .game-image-6 {
    background: url(../casino/mobil/lobby-6.jpg) top;
    background-size: cover;
}
.lobby-item .game-image-7 {
    background: url(../casino/mobil/lobby-7.jpg) top;
    background-size: cover;
}
.lobby-item .game-image-9 {
    background: url(../casino/mobil/lobby-9.jpg) top;
    background-size: cover;
}
.lobby-item .game-image-10 {
    background: url(../casino/mobil/lobby-10.jpg) top;
    background-size: cover;
}
.lobby-item .game-image-11 {
    background: url(../casino/mobil/lobby-11.jpg) top;
    background-size: cover;
}
.lobby-item .game-image-12 {
    background: url("../casino/mobil/lobby-12.jpg) top;
    background-size: cover;
}
.game-playing {
    position: absolute;
    left: 8px;
    top: 8px;
    color: #fff;
    display: flex;
    border-radius: 3px;
    overflow: hidden;
    z-index: 5;
    font-size: 8px;
}
.game-playing .game-live {
    background: #ef0f0f;
    height: 12px;
    padding: 0 5px;
    font-weight: 600;
}
.game-playing .game-run-id {
    background: rgba(0, 0, 0, 0.65);
    padding: 0 5px;
}
.footer {
    height: 4em !important;
}
</style>
<script>
var tumusecenegi = '<?=getTranslation('sports_5');?>';
var canliyazisi = '<?=getTranslation('yeniyerler_kasa375');?>';
var boskupon = '<?=getTranslation('yeniyerler_kasa400');?>';
var oyunekleme = '<?=getTranslation('yeniyerler_kasa401');?>';
var kuponnotu = '<?=getTranslation('kuponkuponadi');?>';
var kuponmiktar = '<?=getTranslation('printkupon19');?>';
var kuponolasi = '<?=getTranslation('printkupon24');?>';
var kupononaylama = '<?=getTranslation('sanalspor13');?>';
var seanskapanmistir = '<?=getTranslation('casinoicin399');?>';
var onaylaniyorkupon = '<?=getTranslation('casinoicin400');?>';
var oyunbulunmuyor = '<?=getTranslation('casinoicin401');?>';
var maxbahis = '<?=getTranslation('casinoicin402');?>';
var minbahis = '<?=getTranslation('casinoicin403');?>';
var yapabilirsiniz = '<?=getTranslation('casinoicin404');?>';
var hatalar1 = '<?=getTranslation('casinoicin405');?>';
var hatalar2 = '<?=getTranslation('casinoicin406');?>';
var hatalar3 = '<?=getTranslation('casinoicin407');?>';
var hatalar4 = '<?=getTranslation('casinoicin408');?>';
var hatalar5 = '<?=getTranslation('casinoicin409');?>';
var hatalar6 = '<?=getTranslation('casinoicin410');?>';
var hatalar7 = '<?=getTranslation('casinoicin411');?>';
var hatalar8 = '<?=getTranslation('casinoicin412');?>';
var hatalar9 = '<?=getTranslation('casinoicin413');?>';
var hatalar10 = '<?=getTranslation('casinoicin414');?>';
var hatalar11 = '<?=getTranslation('casinoicin415');?>';
var hatalar12 = '<?=getTranslation('casinoicin416');?>';
var hatalar13 = '<?=getTranslation('casinoicin417');?>';
var hatalar14 = '<?=getTranslation('casinoicin418');?>';
var hatalar15 = '<?=getTranslation('casinoicin419');?>';
var hatalar16 = '<?=getTranslation('casinoicin420');?>';
var hatalar17 = '<?=getTranslation('casinoicin421');?>';
var hatalar18 = '<?=getTranslation('casinoicin422');?>';
var hatalar19 = '<?=getTranslation('casinoicin423');?>';
var hatalar20 = '<?=getTranslation('casinoicin424');?>';
var hatalar21 = '<?=getTranslation('casinoicin425');?>';
var hatalar22 = '<?=getTranslation('casinoicin426');?>';
var kabuledildi = '<?=getTranslation('casinoicin427');?>';
</script>
<script type="text/javascript" src="../casino/mobil/jquery-1.6.4.js?v=3.4.8"></script>
<script src="../casino/jquery-ui.min.js"></script>
<script src="../casino/jquery.blockUI.js"></script>
</head>
<body style="background: rgb(238 238 238);">
<div class="root">
<div dir="" class="root-app mobile">

<?
## CASİNO BAKİYESİ ##
$kullanici_bakiye_bol_casino = explode(".",$ub['casinobakiye']);
$kullanici_bakiye_kurus_casino = substr($kullanici_bakiye_bol_casino[1], 0, 2);
if($kullanici_bakiye_kurus_casino>0){
$bakiyele_casino = substr(nf($kullanici_bakiye_bol_casino[0]), 0, -3);
$bakiyesini_ver_casino = "".$bakiyele_casino.".".$kullanici_bakiye_kurus_casino."";
} else {
$bakiyele_casino = substr(nf($kullanici_bakiye_bol_casino[0]), 0, -3);
$bakiyesini_ver_casino = "".$bakiyele_casino.".00";
}
?>

<nav class="top-navigation" data-qa="area-top-navigation">
<a data-qa="link-top-navigation-home" href="mb/" class="top-navigation-item item-home" target="_parent">
<span class="betgames-icon home"></span><span class="title"><?=getTranslation('superadmin2')?></span></a>

<a data-qa="link-top-navigation-history" class="top-navigation-item" href="#" onclick="getbethistory();">
<span class="betgames-icon history"></span><span class="title" style="display: block;"><?=getTranslation('mobilbahisgecmisi')?></span></a>

<div class="top-navigation-children"><strong class="balance-block">
<span class="text"><?=getTranslation('yeniyerler_kasa85')?>:</span>
<span class="balance" data-qa="text-balance-amount"><?=$bakiyesini_ver_casino; ?></span></strong></div>
</nav>







<nav class="games-navigation" data-qa="area-games-navigation" <? if($_GET['gameid']<1){ ?>style="display:none;"<? } ?>>
<div class="tabs">
<div class="tabs-bar">
<div class="tabs-bar-arrow left"   onclick="scrolltopnav('right','tabs-bar-item','tabs-bar-scrollable');" role="presentation" data-qa="button-tabs-bar-arrow-left"><span class="betgames-icon chevron-left"></span></div>
<div class="tabs-bar-scrollable right-arrow-visible" id="tabs-bar-scrollable" style="overflow: auto;">
<? if(userayar('casino_basmaca')=="1"){ ?>
<a id="tabbargame_8" class="tabs-bar-item" data-qa="button-game-menu-8" href="?gameid=8">
<div class="game-title" data-qa="area-game-menu-item-title"><span class="game-title-label"><?=getTranslation('yeniyerler_kasa331')?></span></div>
<div class="game-data is-live" data-qa="area-game-menu-item-status"><span class="time-string lminute" data-qa="text-time-string" id="casinodiv_8"><?=getTranslation('yeniyerler_kasa375')?></span></div>
</a>
<? } ?>
<? if(userayar('casino_poker')=="1"){ ?>
<a id="tabbargame_5" class="tabs-bar-item " data-qa="button-game-menu-5" href="?gameid=5">
<div class="game-title" data-qa="area-game-menu-item-title"><span class="game-title-label"><?=getTranslation('yeniyerler_kasa332')?></span></div>
<div class="game-data is-live" data-qa="area-game-menu-item-status"><span class="time-string lminute" data-qa="text-time-string" id="casinodiv_5"><?=getTranslation('yeniyerler_kasa375')?></span></div>
</a>
<? } ?>
<? if(userayar('casino_bakara')=="1"){ ?>
<a id="tabbargame_6" class="tabs-bar-item " data-qa="button-game-menu-6" href="?gameid=6">
<div class="game-title" data-qa="area-game-menu-item-title"><span class="game-title-label"><?=getTranslation('yeniyerler_kasa333')?></span></div>
<div class="game-data is-live" data-qa="area-game-menu-item-status"><span class="time-string lminute" data-qa="text-time-string" id="casinodiv_6"><?=getTranslation('yeniyerler_kasa375')?></span></div>
</a>
<? } ?>
<? if(userayar('casino_carkifelek')=="1"){ ?>
<a id="tabbargame_7" class="tabs-bar-item " data-qa="button-game-menu-7" href="?gameid=7">
<div class="game-title" data-qa="area-game-menu-item-title"><span class="game-title-label"><?=getTranslation('yeniyerler_kasa334')?></span></div>
<div class="game-data is-live" data-qa="area-game-menu-item-status"><span class="time-string lminute" data-qa="text-time-string" id="casinodiv_7"><?=getTranslation('yeniyerler_kasa375')?></span></div>
</a>
<? } ?>
<? if(userayar('casino_zar')=="1"){ ?>
<a id="tabbargame_10" class="tabs-bar-item " data-qa="button-game-menu-10" href="?gameid=10">
<div class="game-title" data-qa="area-game-menu-item-title"><span class="game-title-label"><?=getTranslation('yeniyerler_kasa335')?></span></div>
<div class="game-data is-live" data-qa="area-game-menu-item-status"><span class="time-string lminute" data-qa="text-time-string" id="casinodiv_10"><?=getTranslation('yeniyerler_kasa375')?></span></div>
</a>
<? } ?>
<? if(userayar('casino_poker6')=="1"){ ?>
<a id="tabbargame_12" class="tabs-bar-item " data-qa="button-game-menu-12" href="?gameid=12">
<div class="game-title" data-qa="area-game-menu-item-title"><span class="game-title-label"><?=getTranslation('yeniyerler_kasa336')?></span></div>
<div class="game-data is-live" data-qa="area-game-menu-item-status"><span class="time-string lminute" data-qa="text-time-string" id="casinodiv_12"><?=getTranslation('yeniyerler_kasa375')?></span></div>
</a>
<? } ?>
<? if(userayar('casino_loto5')=="1"){ ?>
<a id="tabbargame_3" class="tabs-bar-item " data-qa="button-game-menu-3" href="?gameid=3">
<div class="game-title" data-qa="area-game-menu-item-title"><span class="game-title-label"><?=getTranslation('yeniyerler_kasa337')?> 5</span></div>
<div class="game-data is-live" data-qa="area-game-menu-item-status"><span class="time-string lminute" data-qa="text-time-string" id="casinodiv_3"><?=getTranslation('yeniyerler_kasa375')?></span></div>
</a>
<? } ?>
<? if(userayar('casino_loto6')=="1"){ ?>
<a id="tabbargame_9" class="tabs-bar-item " data-qa="button-game-menu-9" href="?gameid=9">
<div class="game-title" data-qa="area-game-menu-item-title"><span class="game-title-label"><?=getTranslation('yeniyerler_kasa337')?> 6</span></div>
<div class="game-data is-live" data-qa="area-game-menu-item-status"><span class="time-string lminute" data-qa="text-time-string" id="casinodiv_9"><?=getTranslation('yeniyerler_kasa375')?></span></div>
</a>
<? } ?>
<? if(userayar('casino_loto7')=="1"){ ?>
<a id="tabbargame_1" class="tabs-bar-item " data-qa="button-game-menu-1" href="?gameid=1">
<div class="game-title" data-qa="area-game-menu-item-title"><span class="game-title-label"><?=getTranslation('yeniyerler_kasa337')?> 7</span></div>
<div class="game-data is-live" data-qa="area-game-menu-item-status"><span class="time-string lminute" data-qa="text-time-string" id="casinodiv_1"><?=getTranslation('yeniyerler_kasa375')?></span></div>
</a>
<? } ?>
</div>


		<div class="tabs-bar-arrow right" role="presentation" onclick="scrolltopnav('left','tabs-bar-item','tabs-bar-scrollable');" data-qa="button-tabs-bar-arrow-right"><span class="betgames-icon chevron-right"></span></div>




                    </div>
                </div>
            </nav>
            <main class="" <? if($_GET['gameid']<1){ ?>style="display:none;"<? } ?>>
                <section class="game-content">
                    <div data-qa="area-media-container" class="media-container default" style="height: calc(56vw);">
                        <div class="video casino-holder" data-qa="area-video-player">
<div id="casino-video" ></div>
		   <div class="casino-video-odds game-odds" id="game-odds-8">
				<div class="screen-odds-war video-odds">
					<div class="screen-odd-war main-dealer">
						<div class="screen-odd-item screen-odd-button" role="presentation" data-qa="528">
							<div class="screen-odd-label"><?=getTranslation('yeniyerler_kasa222')?></div>
							<div class="odd-value" data-qa="area-screen-odd-value"></div>
						</div>
					</div>
					<div class="screen-odd-war main-player">
						<div class="screen-odd-item screen-odd-button" role="presentation" data-qa="529">
							<div class="screen-odd-label"><?=getTranslation('yeniyerler_kasa223')?></div>
							<div class="odd-value" data-qa="area-screen-odd-value"></div>
						</div>
					</div>
					<div class="screen-odd-war main-war">
						<div class="screen-odd-item screen-odd-button" role="presentation" data-qa="530">
							<div class="screen-odd-label"><?=getTranslation('yeniyerler_kasa376')?></div>
							<div class="odd-value" data-qa="area-screen-odd-value"></div>
						</div>
					</div>
				</div>
			</div>

<div class="screen-odds-poker video-odds game-odds" id="game-odds-5">
			    <div class="screen-odd-poker player-1 bet-sum-right">
			        <div class="screen-odd-item screen-odd-button" role="presentation" data-qa="446">
			            <div class="odd-value" data-qa="area-screen-odd-value"></div>
			        </div>
			    </div>
			    <div class="screen-odd-poker player-2 bet-sum-right">
			        <div class="screen-odd-item screen-odd-button" role="presentation" data-qa="447">
			            <div class="odd-value" data-qa="area-screen-odd-value"></div>
			        </div>
			    </div>
			    <div class="screen-odd-poker player-3 bet-sum-right">
			        <div class="screen-odd-item screen-odd-button" role="presentation" data-qa="448">
			            <div class="odd-value" data-qa="area-screen-odd-value"></div>
			        </div>
			    </div>
			    <div class="screen-odd-poker player-4 bet-sum-left">
			        <div class="screen-odd-item screen-odd-button active" role="presentation" data-qa="449">
			            <div class="odd-value" data-qa="area-screen-odd-value"></div>
			        </div>
			    </div>
			    <div class="screen-odd-poker player-5 bet-sum-left">
			        <div class="screen-odd-item screen-odd-button" role="presentation" data-qa="450">
			            <div class="odd-value" data-qa="area-screen-odd-value"></div>
			        </div>
			    </div>
			    <div class="screen-odd-poker player-6 bet-sum-left">
			        <div class="screen-odd-item screen-odd-button" role="presentation" data-qa="451">
			            <div class="odd-value" data-qa="area-screen-odd-value"></div>
			        </div>
			    </div>
			</div>

			<div class="screen-odds-baccarat video-odds game-odds" id="game-odds-6">
			    <div class="screen-odd-baccarat main-player">
			        <div class="screen-odd-item screen-odd-button" role="presentation" data-qa="469">
			            <div class="odd-value" data-qa="area-screen-odd-value"></div>
			        </div>
			    </div><strong class="screen-odd-score score-player" data-qa="text-baccarat-score-player">0</strong>
			    <div class="screen-odd-baccarat main-banker">
			        <div class="screen-odd-item screen-odd-button" role="presentation" data-qa="470">
			            <div class="odd-value" data-qa="area-screen-odd-value"></div>
			        </div>
			    </div><strong class="screen-odd-score score-banker" data-qa="text-baccarat-score-banker">0</strong>
			    <div class="screen-odd-baccarat main-tie">
			        <div class="screen-odd-item screen-odd-button" role="presentation" data-qa="471">
			            <div class="odd-value" data-qa="area-screen-odd-value"></div>
			        </div>
			    </div>
			</div>
                        </div>
                    </div>
                </section>
<section class="betting-container" style="width: 100%;">
<div class="clear"></div>
<div class="casino-alt" style="width: 100%;margin-bottom: 70px;">
<div class="casino-bets odds-tabs" id="casino-bets"></div>
</div>



                   










                    <div class="bets-panel">
                        <div class="bet-slip mobile-betting fade-out" id="casinoslipbet">
                            <div class="bet-slip-type-label-container"></div>
                            <header class="panel-header bet-slip-header"><strong data-qa="label-bet-slip"><?=getTranslation('bahiskuponu')?></strong>
<span role="presentation" class="bet-slip-close betgames-icon closed" onclick="closebetslip();"></span>
</header>
                            <div class="bet-slip-empty betting-slip-content" data-qa="area-empty-bet-slip" id="casinopbetslip">
                               







                            </div>





                        </div>
                    </div>
                </section>
                <div class="sticky-betslip-button" role="presentation" data-qa="button-sticky-betslip-button" onclick="openbetcasinoslip();"><i class="betgames-icon betslip"></i>

		<div class="havebetslip"></div>
		</div>
            </main>

<div id="historylobby" class="lobby" <? if($_GET['gameid']>0){ ?>style="display:none;"<? } ?>>
<div class="lobby-list" data-qa="area-lobby">
<? if(userayar('casino_basmaca')=="1"){ ?>
<div data-qa="area-lobby-item-8" class="lobby-item-container"><a data-qa="link-lobby-item" class="lobby-item" href="?gameid=8">
<div class="game-image game-image-8">
<div class="play-button-box"><span class="betgames-icon play"></span></div>
<div class="game-image-box">
<div data-qa="area-lobby-item-timer" class="image-label live"><span class="time-string lminute" data-qa="text-time-string" id="casinodiv_8"><?=getTranslation('yeniyerler_kasa375')?></span></div>
</div>
</div>
<div data-qa="text-lobby-item-game-name" class="game-name"><?=getTranslation('yeniyerler_kasa331')?></div>
</a></div>
<? } ?>
<? if(userayar('casino_poker')=="1"){ ?>
<div data-qa="area-lobby-item-5" class="lobby-item-container"><a data-qa="link-lobby-item" class="lobby-item" href="?gameid=5">
<div class="game-image game-image-5">
<div class="play-button-box"><span class="betgames-icon play"></span></div>
<div class="game-image-box">
<div data-qa="area-lobby-item-timer" class="image-label live"><span class="time-string lminute" data-qa="text-time-string" id="casinodiv_5"><?=getTranslation('yeniyerler_kasa375')?></span></div>
</div>
</div>
<div data-qa="text-lobby-item-game-name" class="game-name"><?=getTranslation('yeniyerler_kasa332')?></div>
</a></div>
<? } ?>
<? if(userayar('casino_poker6')=="1"){ ?>
<div data-qa="area-lobby-item-12" class="lobby-item-container"><a data-qa="link-lobby-item" class="lobby-item" href="?gameid=12">
<div class="game-image game-image-12">
<div class="play-button-box"><span class="betgames-icon play"></span></div>
<div class="game-image-box">
<div data-qa="area-lobby-item-timer" class="image-label live"><span class="time-string lminute" data-qa="text-time-string" id="casinodiv_12"><?=getTranslation('yeniyerler_kasa375')?></span></div>
</div>
</div>
<div data-qa="text-lobby-item-game-name" class="game-name"><?=getTranslation('yeniyerler_kasa336')?></div>
</a></div>
<? } ?>
<? if(userayar('casino_bakara')=="1"){ ?>
<div data-qa="area-lobby-item-6" class="lobby-item-container"><a data-qa="link-lobby-item" class="lobby-item" href="?gameid=6">
<div class="game-image game-image-6">
<div class="play-button-box"><span class="betgames-icon play"></span></div>
<div class="game-image-box">
<div data-qa="area-lobby-item-timer" class="image-label live"><span class="time-string lminute" data-qa="text-time-string" id="casinodiv_6"><?=getTranslation('yeniyerler_kasa375')?></span></div>
</div>
</div>
<div data-qa="text-lobby-item-game-name" class="game-name"><?=getTranslation('yeniyerler_kasa333')?></div>
</a></div>
<? } ?>
<? if(userayar('casino_carkifelek')=="1"){ ?>
<div data-qa="area-lobby-item-7" class="lobby-item-container"><a data-qa="link-lobby-item" class="lobby-item" href="?gameid=7">
<div class="game-image game-image-7">
<div class="play-button-box"><span class="betgames-icon play"></span></div>
<div class="game-image-box">
<div data-qa="area-lobby-item-timer" class="image-label live"><span class="time-string lminute" data-qa="text-time-string" id="casinodiv_7"><?=getTranslation('yeniyerler_kasa375')?></span></div>
</div>
</div>
<div data-qa="text-lobby-item-game-name" class="game-name"><?=getTranslation('yeniyerler_kasa334')?></div>
</a></div>
<? } ?>
<? if(userayar('casino_zar')=="1"){ ?>
<div data-qa="area-lobby-item-10" class="lobby-item-container"><a data-qa="link-lobby-item" class="lobby-item" href="?gameid=10">
<div class="game-image game-image-10">
<div class="play-button-box"><span class="betgames-icon play"></span></div>
<div class="game-image-box">
<div data-qa="area-lobby-item-timer" class="image-label live"><span class="time-string lminute" data-qa="text-time-string" id="casinodiv_10"><?=getTranslation('yeniyerler_kasa375')?></span></div>
</div>
</div>
<div data-qa="text-lobby-item-game-name" class="game-name"><?=getTranslation('yeniyerler_kasa335')?></div>
</a></div>
<? } ?>
<? if(userayar('casino_loto5')=="1"){ ?>
<div data-qa="area-lobby-item-3" class="lobby-item-container"><a data-qa="link-lobby-item" class="lobby-item" href="?gameid=3">
<div class="game-image game-image-3">
<div class="play-button-box"><span class="betgames-icon play"></span></div>
<div class="game-image-box">
<div data-qa="area-lobby-item-timer" class="image-label live"><span class="time-string lminute" data-qa="text-time-string" id="casinodiv_3"><?=getTranslation('yeniyerler_kasa375')?></span></div>
</div>
</div>
<div data-qa="text-lobby-item-game-name" class="game-name"><?=getTranslation('yeniyerler_kasa337')?> 5</div>
</a></div>
<? } ?>
<? if(userayar('casino_loto6')=="1"){ ?>
<div data-qa="area-lobby-item-9" class="lobby-item-container"><a data-qa="link-lobby-item" class="lobby-item" href="?gameid=9">
<div class="game-image game-image-9">
<div class="play-button-box"><span class="betgames-icon play"></span></div>
<div class="game-image-box">
<div data-qa="area-lobby-item-timer" class="image-label live"><span class="time-string lminute" data-qa="text-time-string" id="casinodiv_9"><?=getTranslation('yeniyerler_kasa375')?></span></div>
</div>
</div>
<div data-qa="text-lobby-item-game-name" class="game-name"><?=getTranslation('yeniyerler_kasa337')?> 6</div>
</a></div>
<? } ?>
<? if(userayar('casino_loto7')=="1"){ ?>
<div data-qa="area-lobby-item-1" class="lobby-item-container"><a data-qa="link-lobby-item" class="lobby-item" href="?gameid=1">
<div class="game-image game-image-1">
<div class="play-button-box"><span class="betgames-icon play"></span></div>
<div class="game-image-box">
<div data-qa="area-lobby-item-timer" class="image-label live"><span class="time-string lminute" data-qa="text-time-string" id="casinodiv_1"><?=getTranslation('yeniyerler_kasa375')?></span></div>
</div>
</div>
<div data-qa="text-lobby-item-game-name" class="game-name"><?=getTranslation('yeniyerler_kasa337')?> 7</div>
</a></div>
<? } ?>
</div>
</div>

<div style="display: block;float: left;width: 100%;height: 10px;"></div>

<div class="bethistory" style="background: #FFF;border-bottom: 1px solid #5d5c5c;display:none;">
<section class="report">
<header>
<div class="header-title">
<h1><?=getTranslation('mobilbahisgecmisi')?></h1>
<button class="header-filters-toggle header-filters-count-1" type="button" data-qa="button-report-filter-toggler">
<span class="betgames-icon filter">
</span><?=getTranslation('yeniyerler_kasa377')?></button>
<div class="header-filters header-filters-count-1">
<input type="text" readonly="" name="datepicker-input" id="datepicker" value="<?=date('d.m.Y');?>" onchange="getbethistory();"></div>
</div>
</div>
</div>
</header>
<div class="bethistorybody"  style="display:none;margin-bottom: 60px;">
<div class="bets-history-tabs" data-qa="area-history-tabs" style="height: 50px;">
    <div class="tabs tabs-default">
        <div class="tabs-bar" style="background: #FFF;border-bottom: 1px solid #5d5c5c;">
            <div class="tabs-bar-scrollable right-arrow-visible">
                <div role="presentation" class="tabs-bar-item active" data-qa="button-history-tab-combinations" style="min-width: 70px;"  onclick="getbethistory();"> <?=getTranslation('selectoptionhepsi')?> </div>
				<div role="presentation" class="tabs-bar-item active" data-qa="button-history-tab-combinations" style="min-width: 70px;"  onclick="getbethistory(3);"> <?=getTranslation('selectoptionbekleyen')?> </div>
                <div role="presentation" class="tabs-bar-item " data-qa="button-history-tab-single" style="min-width: 83px;"  onclick="getbethistory(1);"> <?=getTranslation('selectoptionkazanan')?> </div>
                <div role="presentation" class="tabs-bar-item" data-qa="button-history-tab-subscriptions" style="min-width: 83px;"  onclick="getbethistory(2);"> <?=getTranslation('selectoptionkaybeden')?> </div>
            </div>
        </div>
    </div>
</div>







<div class="bets-history-table-mobile">





</div></div>
</section>
</div>
<script>
function getle(val){
	window.location.href=val;
}
</script>
<?
## BAKİYESİ ##
$kullanici_bakiye_bol = explode(".",$ub['bakiye']);
$kullanici_bakiye_kurus = substr($kullanici_bakiye_bol[1], 0, 2);
if($kullanici_bakiye_kurus>0){
$bakiyele = substr(nf($kullanici_bakiye_bol[0]), 0, -3);
$bakiyesini_ver = "".$bakiyele.".".$kullanici_bakiye_kurus."";
} else {
$bakiyele = substr(nf($kullanici_bakiye_bol[0]), 0, -3);
$bakiyesini_ver = "".$bakiyele.".00";
}
## CASİNO BAKİYESİ ##
$kullanici_bakiye_bol_casino = explode(".",$ub['casinobakiye']);
$kullanici_bakiye_kurus_casino = substr($kullanici_bakiye_bol_casino[1], 0, 2);
if($kullanici_bakiye_kurus_casino>0){
$bakiyele_casino = substr(nf($kullanici_bakiye_bol_casino[0]), 0, -3);
$bakiyesini_ver_casino = "".$bakiyele_casino.".".$kullanici_bakiye_kurus_casino."";
} else {
$bakiyele_casino = substr(nf($kullanici_bakiye_bol_casino[0]), 0, -3);
$bakiyesini_ver_casino = "".$bakiyele_casino.".00";
}
?>

<div class="appfooter" style="left: 0px; right: 0px; z-index: 100; position: fixed; bottom: 0px;">
    <div class="">
        <div id="oneColumnFooter" class="footer tabbar1 betslipImage">
            <div class="cell" style="width: 500px;"></div>
            <div id="footerHome" class="preload1 cell tbicon home" onclick="getle('home')">
                <div class="text"><?=getTranslation('mobilfooter1')?></div>
            </div>

            <? if(userayar('canlifutbol')!="1") { ?>
            <div id="footerLive" class="preload1 cell tbicon live" onclick="getle('liveengelli')">
                <div class="text"><?=getTranslation('mobilfooter2')?></div>
            </div>
            <? } else { ?>
            <div id="footerLive" class="preload1 cell tbicon live" onclick="getle('live')">
                <div class="text"><?=getTranslation('mobilfooter2')?></div>
            </div>
            <? } ?>
            <? if(userayar('casino_yetki')>0) { ?>
            <div id="footerCasino" class="preload1 cell tbicon casino selected" onclick="getle('livecasino')">
                <div class="text"><?=getTranslation('yeniyerler_kasa132')?></div>
                <div class="count private"><?=$bakiyesini_ver_casino; ?></div>
            </div>
            <? } ?>
            <div id="footerTicket" class="preload1 cell tbicon tickets" onclick="getle('ticket')">
                <div class="text"><?=getTranslation('mobilfooter4')?></div>
                <? if($toplams_bekleyen_kuponlarim['toplam_bekleyen']>0){ ?>
                <div class="count private"><?=$toplams_bekleyen_kuponlarim['toplam_bekleyen']; ?></div>
                <? } ?>
            </div>
            <div id="footerAccount" class="preload2 cell tbicon account" onclick="getle('account')">
                <div class="text"><?=getTranslation('mobilfooter5')?></div>
                <div id="bubakiye" class="count private"><?=$bakiyesini_ver; ?></div>
            </div>
            <div id="footerEditor" class="preload2 cell tbicon editor" onclick="getle('editor')">
                <div class="text"><?=getTranslation('mobilfooter6')?></div>
                <div id="kuponadedi" class="count private" style="display: none;">0</div>
            </div>
        </div>

        <div id="twoColumnFooter">
            <div id="footerLeft" class="footer tabbar1">
                <div class="cell" style="width: 500px;"></div>
                <div id="footerHome2" class="preload1 cell tbicon home selected" onclick="getle('home')">
                    <div class="text"><?=getTranslation('mobilfooter1')?></div>
                </div>
                <div id="footerSports2" class="preload1 cell tbicon sportbets" onclick="getle('sporbahisleri')">
                    <div class="text"><?=getTranslation('mobilfooter7')?></div>
                </div>
                <? if(userayar('canlifutbol')!="1") { ?>
                <div id="footerLive2" class="preload1 cell tbicon live" onclick="getle('liveengelli', 'none')">
                    <div class="text"><?=getTranslation('mobilfooter2')?></div>
                </div>
                <? } else { ?>
                <div id="footerLive2" class="preload1 cell tbicon live" onclick="getle('live', 'none')">
                    <div class="text"><?=getTranslation('mobilfooter2')?></div>
                </div>
                <? } ?>
                <div id="footerCasino2" class="preload1 cell tbicon casino" onclick="getle('casino/home')">
                    <div class="text"><?=getTranslation('mobilfooter3')?></div>
                </div>
            </div>

            <div id="footerRight" class="footer tabbar1">
                <div class="cell" style="width: 500px;"></div>
                <div id="footerTicket2" class="preload1 cell tbicon tickets" onclick="getle('ticket')">
                    <div class="text"><?=getTranslation('mobilfooter4')?></div>
                </div>
                <div id="footerAccount2" class="preload2 cell tbicon account" onclick="getle('account', 'none')">
                    <div class="text"><?=getTranslation('mobilfooter5')?></div>
                    <div id="bubakiye" class="count private"><?=$bakiyesini_ver;?></div>
                </div>
                <div id="footerEditor2" class="preload2 cell tbicon editor selected" onclick="getle('editor', 'none')">
                    <div class="text"><?=getTranslation('mobilfooter6')?></div>
                    <div id="kuponadedi" class="count private">0</div>
                </div>
            </div>
        </div>
    </div>
</div>


</div>
</div>
</body>







<script>
<? if($_GET['gameid']==8 && userayar('casino_basmaca')=="1"){ ?>
var _active_game = 8;
<? } else if($_GET['gameid']==5 && userayar('casino_poker')=="1"){ ?>
var _active_game = 5;
<? } else if($_GET['gameid']==6 && userayar('casino_bakara')=="1"){ ?>
var _active_game = 6;
<? } else if($_GET['gameid']==7 && userayar('casino_carkifelek')=="1"){ ?>
var _active_game = 7;
<? } else if($_GET['gameid']==10 && userayar('casino_zar')=="1"){ ?>
var _active_game = 10;
<? } else if($_GET['gameid']==12 && userayar('casino_poker6')=="1"){ ?>
var _active_game = 12;
<? } else if($_GET['gameid']==3 && userayar('casino_loto5')=="1"){ ?>
var _active_game = 3;
<? } else if($_GET['gameid']==9 && userayar('casino_loto6')=="1"){ ?>
var _active_game = 9;
<? } else if($_GET['gameid']==1 && userayar('casino_loto7')=="1"){ ?>
var _active_game = 1;
<? } else { ?>
<? if(userayar('casino_basmaca')=="1"){ ?>
var _active_game = 8;
<? } else if(userayar('casino_poker')=="1"){ ?>
var _active_game = 5;
<? } else if(userayar('casino_bakara')=="1"){ ?>
var _active_game = 6;
<? } else if(userayar('casino_carkifelek')=="1"){ ?>
var _active_game = 7;
<? } else if(userayar('casino_zar')=="1"){ ?>
var _active_game = 10;
<? } else if(userayar('casino_poker6')=="1"){ ?>
var _active_game = 12;
<? } else if(userayar('casino_loto5')=="1"){ ?>
var _active_game = 3;
<? } else if(userayar('casino_loto6')=="1"){ ?>
var _active_game = 9;
<? } else if(userayar('casino_loto7')=="1"){ ?>
var _active_game = 1;
<? } else { ?>
var _active_game = 0;
<? } ?>
<? } ?>

function scrolltopnav(drct,item,containsd)
{
var widthitm = $('.'+item).outerWidth();
if(drct=="right")
{
 document.getElementById(containsd).scrollLeft -= widthitm;
}else{
 document.getElementById(containsd).scrollLeft += widthitm;
}
}

$( document ).ready(function() {
$('#tabs-bar-scrollable').animate({scrollLeft: $('#tabbargame_'+_active_game+'').position().left}, 100);
});


  $( function() {
    $( "#datepicker" ).datepicker({dateFormat: 'dd.mm.yy',nextText: '<span class="betgames-icon chevron-right"></span>', prevText: '<span class="betgames-icon chevron-left"></span>'});
  } );

var casinogamesseviye = {};
var casinogamesmaxod = {};
<? if(userayar('casino_basmaca')=="1"){ ?>
casinogamesseviye[8]=<?=userayar('casino_basmaca_seviye');?>;
casinogamesmaxod[8]=<?=userayar('casino_basmaca_maxoran');?>;
<? } ?>
<? if(userayar('casino_poker')=="1"){ ?>
casinogamesseviye[5]=<?=userayar('casino_poker_seviye');?>;
casinogamesmaxod[5]=<?=userayar('casino_poker_maxoran');?>;
<? } ?>
<? if(userayar('casino_bakara')=="1"){ ?>
casinogamesseviye[6]=<?=userayar('casino_bakara_seviye');?>;
casinogamesmaxod[6]=<?=userayar('casino_bakara_maxoran');?>;
<? } ?>
<? if(userayar('casino_carkifelek')=="1"){ ?>
casinogamesseviye[7]=<?=userayar('casino_carkifelek_seviye');?>;
casinogamesmaxod[7]=<?=userayar('casino_carkifelek_maxoran');?>;
<? } ?>
<? if(userayar('casino_zar')=="1"){ ?>
casinogamesseviye[10]=<?=userayar('casino_zar_seviye');?>;
casinogamesmaxod[10]=<?=userayar('casino_zar_maxoran');?>;
<? } ?>
<? if(userayar('casino_poker6')=="1"){ ?>
casinogamesseviye[12]=<?=userayar('casino_poker6_seviye');?>;
casinogamesmaxod[12]=<?=userayar('casino_poker6_maxoran');?>;
<? } ?>
<? if(userayar('casino_loto5')=="1"){ ?>
casinogamesseviye[3]=<?=userayar('casino_loto5_seviye');?>;
casinogamesmaxod[3]=<?=userayar('casino_loto5_maxoran');?>;
<? } ?>
<? if(userayar('casino_loto6')=="1"){ ?>
casinogamesseviye[9]=<?=userayar('casino_loto6_seviye');?>;
casinogamesmaxod[9]=<?=userayar('casino_loto6_maxoran');?>;
<? } ?>
<? if(userayar('casino_loto7')=="1"){ ?>
casinogamesseviye[1]=<?=userayar('casino_loto7_seviye');?>;
casinogamesmaxod[1]=<?=userayar('casino_loto7_maxoran');?>;
<? } ?>

<? if($_GET['gameid']==8){ ?>
var max_amount = <?=userayar('casino_basmaca_maxbahis');?>;
var min_amount = <?=userayar('casino_basmaca_minbahis');?>;
var gain_max = <?=userayar('casino_basmaca_maxkazanc');?>;
<? } else if($_GET['gameid']==5){ ?>
var max_amount = <?=userayar('casino_poker_maxbahis');?>;
var min_amount = <?=userayar('casino_poker_minbahis');?>;
var gain_max = <?=userayar('casino_poker_maxkazanc');?>;
<? } else if($_GET['gameid']==6){ ?>
var max_amount = <?=userayar('casino_bakara_maxbahis');?>;
var min_amount = <?=userayar('casino_bakara_minbahis');?>;
var gain_max = <?=userayar('casino_bakara_maxkazanc');?>;
<? } else if($_GET['gameid']==7){ ?>
var max_amount = <?=userayar('casino_carkifelek_maxbahis');?>;
var min_amount = <?=userayar('casino_carkifelek_minbahis');?>;
var gain_max = <?=userayar('casino_carkifelek_maxkazanc');?>;
<? } else if($_GET['gameid']==10){ ?>
var max_amount = <?=userayar('casino_zar_maxbahis');?>;
var min_amount = <?=userayar('casino_zar_minbahis');?>;
var gain_max = <?=userayar('casino_zar_maxkazanc');?>;
<? } else if($_GET['gameid']==12){ ?>
var max_amount = <?=userayar('casino_poker6_maxbahis');?>;
var min_amount = <?=userayar('casino_poker6_minbahis');?>;
var gain_max = <?=userayar('casino_poker6_maxkazanc');?>;
<? } else if($_GET['gameid']==3){ ?>
var max_amount = <?=userayar('casino_loto5_maxbahis');?>;
var min_amount = <?=userayar('casino_loto5_minbahis');?>;
var gain_max = <?=userayar('casino_loto5_maxkazanc');?>;
<? } else if($_GET['gameid']==9){ ?>
var max_amount = <?=userayar('casino_loto6_maxbahis');?>;
var min_amount = <?=userayar('casino_loto6_minbahis');?>;
var gain_max = <?=userayar('casino_loto6_maxkazanc');?>;
<? } else if($_GET['gameid']==1){ ?>
var max_amount = <?=userayar('casino_loto7_maxbahis');?>;
var min_amount = <?=userayar('casino_loto7_minbahis');?>;
var gain_max = <?=userayar('casino_loto7_maxkazanc');?>;
<? } else { ?>
<? if(userayar('casino_basmaca')=="1"){ ?>
var max_amount = <?=userayar('casino_basmaca_maxbahis');?>;
var min_amount = <?=userayar('casino_basmaca_minbahis');?>;
var gain_max = <?=userayar('casino_basmaca_maxkazanc');?>;
<? } else if(userayar('casino_poker')=="1"){ ?>
var max_amount = <?=userayar('casino_poker_maxbahis');?>;
var min_amount = <?=userayar('casino_poker_minbahis');?>;
var gain_max = <?=userayar('casino_poker_maxkazanc');?>;
<? } else if(userayar('casino_bakara')=="1"){ ?>
var max_amount = <?=userayar('casino_bakara_maxbahis');?>;
var min_amount = <?=userayar('casino_bakara_minbahis');?>;
var gain_max = <?=userayar('casino_bakara_maxkazanc');?>;
<? } else if(userayar('casino_carkifelek')=="1"){ ?>
var max_amount = <?=userayar('casino_carkifelek_maxbahis');?>;
var min_amount = <?=userayar('casino_carkifelek_minbahis');?>;
var gain_max = <?=userayar('casino_carkifelek_maxkazanc');?>;
<? } else if(userayar('casino_zar')=="1"){ ?>
var max_amount = <?=userayar('casino_zar_maxbahis');?>;
var min_amount = <?=userayar('casino_zar_minbahis');?>;
var gain_max = <?=userayar('casino_zar_maxkazanc');?>;
<? } else if(userayar('casino_poker6')=="1"){ ?>
var max_amount = <?=userayar('casino_poker6_maxbahis');?>;
var min_amount = <?=userayar('casino_poker6_minbahis');?>;
var gain_max = <?=userayar('casino_poker6_maxkazanc');?>;
<? } else if(userayar('casino_loto5')=="1"){ ?>
var max_amount = <?=userayar('casino_loto5_maxbahis');?>;
var min_amount = <?=userayar('casino_loto5_minbahis');?>;
var gain_max = <?=userayar('casino_loto5_maxkazanc');?>;
<? } else if(userayar('casino_loto6')=="1"){ ?>
var max_amount = <?=userayar('casino_loto6_maxbahis');?>;
var min_amount = <?=userayar('casino_loto6_minbahis');?>;
var gain_max = <?=userayar('casino_loto6_maxkazanc');?>;
<? } else if(userayar('casino_loto7')=="1"){ ?>
var max_amount = <?=userayar('casino_loto7_maxbahis');?>;
var min_amount = <?=userayar('casino_loto7_minbahis');?>;
var gain_max = <?=userayar('casino_loto7_maxkazanc');?>;
<? } ?>
<? } ?>

if(_active_game==8){
$('#tabbargame_8').addClass('active');
$('#tabbargame_5').removeClass('active');
$('#tabbargame_6').removeClass('active');
$('#tabbargame_7').removeClass('active');
$('#tabbargame_10').removeClass('active');
$('#tabbargame_12').removeClass('active');
$('#tabbargame_3').removeClass('active');
$('#tabbargame_9').removeClass('active');
$('#tabbargame_1').removeClass('active');
} else if(_active_game==5){
$('#tabbargame_8').removeClass('active');
$('#tabbargame_5').addClass('active');
$('#tabbargame_6').removeClass('active');
$('#tabbargame_7').removeClass('active');
$('#tabbargame_10').removeClass('active');
$('#tabbargame_12').removeClass('active');
$('#tabbargame_3').removeClass('active');
$('#tabbargame_9').removeClass('active');
$('#tabbargame_1').removeClass('active');
} else if(_active_game==6){
$('#tabbargame_8').removeClass('active');
$('#tabbargame_5').removeClass('active');
$('#tabbargame_6').addClass('active');
$('#tabbargame_7').removeClass('active');
$('#tabbargame_10').removeClass('active');
$('#tabbargame_12').removeClass('active');
$('#tabbargame_3').removeClass('active');
$('#tabbargame_9').removeClass('active');
$('#tabbargame_1').removeClass('active');
} else if(_active_game==7){
$('#tabbargame_8').removeClass('active');
$('#tabbargame_5').removeClass('active');
$('#tabbargame_6').removeClass('active');
$('#tabbargame_7').addClass('active');
$('#tabbargame_10').removeClass('active');
$('#tabbargame_12').removeClass('active');
$('#tabbargame_3').removeClass('active');
$('#tabbargame_9').removeClass('active');
$('#tabbargame_1').removeClass('active');
} else if(_active_game==10){
$('#tabbargame_8').removeClass('active');
$('#tabbargame_5').removeClass('active');
$('#tabbargame_6').removeClass('active');
$('#tabbargame_7').removeClass('active');
$('#tabbargame_10').addClass('active');
$('#tabbargame_12').removeClass('active');
$('#tabbargame_3').removeClass('active');
$('#tabbargame_9').removeClass('active');
$('#tabbargame_1').removeClass('active');
} else if(_active_game==12){
$('#tabbargame_8').removeClass('active');
$('#tabbargame_5').removeClass('active');
$('#tabbargame_6').removeClass('active');
$('#tabbargame_7').removeClass('active');
$('#tabbargame_10').removeClass('active');
$('#tabbargame_12').addClass('active');
$('#tabbargame_3').removeClass('active');
$('#tabbargame_9').removeClass('active');
$('#tabbargame_1').removeClass('active');
} else if(_active_game==3){
$('#tabbargame_8').removeClass('active');
$('#tabbargame_5').removeClass('active');
$('#tabbargame_6').removeClass('active');
$('#tabbargame_7').removeClass('active');
$('#tabbargame_10').removeClass('active');
$('#tabbargame_12').removeClass('active');
$('#tabbargame_3').addClass('active');
$('#tabbargame_9').removeClass('active');
$('#tabbargame_1').removeClass('active');
} else if(_active_game==9){
$('#tabbargame_8').removeClass('active');
$('#tabbargame_5').removeClass('active');
$('#tabbargame_6').removeClass('active');
$('#tabbargame_7').removeClass('active');
$('#tabbargame_10').removeClass('active');
$('#tabbargame_12').removeClass('active');
$('#tabbargame_3').removeClass('active');
$('#tabbargame_9').addClass('active');
$('#tabbargame_1').removeClass('active');
} else if(_active_game==1){
$('#tabbargame_8').removeClass('active');
$('#tabbargame_5').removeClass('active');
$('#tabbargame_6').removeClass('active');
$('#tabbargame_7').removeClass('active');
$('#tabbargame_10').removeClass('active');
$('#tabbargame_12').removeClass('active');
$('#tabbargame_3').removeClass('active');
$('#tabbargame_9').removeClass('active');
$('#tabbargame_1').addClass('active');
}

var rand = Math.random();
$.get('../casino/casino_ajax.php?a=kupontemizle&rand='+rand+'',function() { });
var _update_coupon_time = 10000;
var _session_max = 0;
var max_odd = 1000.00;
var is_mobile = false;
var livescript_loaded = false;
var autoprint = false;
var jsdebug = false;
var devmode = false;
var is_root = false;
var can_edit_sports = true;
var theme_name = 'rakip';
var _version = '2200';
var bulten_style = 2;
var bulten_open_type = 'modal';
var session_id = '<?=$session_id;?>';
var _text = false;
var _active_tab = 0;
var _lottery_id = 0;
var _lottery_items = [];
var _video;
var player = false;
</script>
<script src="https://cdn.jsdelivr.net/npm/clappr?latest/dist/clappr.min.js"></script>
<script src="../casino/nanoplayer.5.min.js"></script>
<script src="../casino/casinomobile_yeniyaptim_2.js?v=1598105991"></script>