    //Main navigation
    $.navigation = $('nav > ul.nav');

	$.panelIconOpened = 'icon-arrow-up';
	$.panelIconClosed = 'icon-arrow-down';


'use strict';

/****
* MAIN NAVIGATION
*/

$(document).ready(function($){
	/*
	String.prototype.decodeHTML = function() {
		return $('<div>', {
			html: '' + this
		}).html()
	}

	var $main = $('main'),

		init = function() {
			$.getScript('Assets/js/app.js')
		},

		ajaxLoad = function(html) {
			document.title = html
				.match(/<title>(.*?)<\/title>/)[1]
				.trim()
				.decodeHTML()

			init()
		},

		loadPage = function(href) {
			$main.load(href + ' main>*', ajaxLoad)
		}

	init()

	$(window).on('popstate', function(e) {
		if (e.originalEvent.state !== null) {
			loadPage(location.href)
		}
	})

	$(document).on('click', '.active-ps', function() {
		var href = $(this).attr('href')

		if (href.indexOf(document.domain) > -1 ||
			href.indexOf(':') === -1) {
			history.pushState({}, '', href)
			loadPage(href)
			return false
		}
	})
	*/

	// Add class .active to current link
	/*
	$.navigation.find('a').each(function(){

		var cUrl = String(window.location);

		if (cUrl.substr(cUrl.length - 1) == '#') {
			cUrl = cUrl.slice(0,-1);
		}

		if ($($(this))[0].href==cUrl) {
			$(this).addClass('active');

			$(this).parents('ul').add(this).each(function(){
			    //$(this).parent().addClass('nt').addClass('open');
			});
		}
	});
	*/

	// Dropdown Menu
	$.navigation.on('click', 'a', function(e){

		if ($.ajaxLoad) {
			e.preventDefault();
		}

        if ($(this).hasClass('nav-dropdown-toggle')) {
			$(this).parent().removeClass('nt').toggleClass('open');
		}

	});

	function resizeBroadcast() {

		var timesRun = 0;
		var interval = setInterval(function(){
			timesRun += 1;
			if(timesRun === 5){
				clearInterval(interval);
			}
			window.dispatchEvent(new Event('resize'));
		}, 62.5);
	}

	/* ---------- Main Menu Open/Close, Min/Full ---------- */
	$('.navbar-toggler').click(function(){

		var bodyClass = localStorage.getItem('body-class');

		if ($(this).hasClass('layout-toggler') && $('body').hasClass('sidebar-off-canvas')) {
			$('body').toggleClass('sidebar-opened').parent().toggleClass('sidebar-opened');
			//resize charts
			resizeBroadcast();

		} else if ($(this).hasClass('layout-toggler') && ($('body').hasClass('sidebar-nav') || bodyClass == 'sidebar-nav')) {
			$('body').toggleClass('sidebar-nav');
			localStorage.setItem('body-class', 'sidebar-nav');
			if (bodyClass == 'sidebar-nav') {
				localStorage.clear();
			}
			//resize charts
			resizeBroadcast();
		} else {
			$('body').toggleClass('mobile-open');
		}
	});

	$('.aside-toggle').click(function(){
		$('body').toggleClass('aside-menu-open');

		//resize charts
		resizeBroadcast();
	});

	$('.sidebar-close').click(function(){
		$('body').toggleClass('sidebar-opened').parent().toggleClass('sidebar-opened');
	});

	/* ---------- Disable moving to top ---------- */
	$('a[href="#"][data-top!=true]').click(function(e){
		e.preventDefault();
	});

});

/****
* CARDS ACTIONS
*/

$(document).on('click', '.card-actions a', function(e){
	e.preventDefault();

	if ($(this).hasClass('btn-close')) {
		$(this).parent().parent().parent().fadeOut();
	} else if ($(this).hasClass('btn-minimize')) {
		var $target = $(this).parent().parent().next('.card-block');
		if (!$(this).hasClass('collapsed')) {
			$('i',$(this)).removeClass($.panelIconOpened).addClass($.panelIconClosed);
		} else {
			$('i',$(this)).removeClass($.panelIconClosed).addClass($.panelIconOpened);
		}

	} else if ($(this).hasClass('btn-setting')) {
		$('#myModal').modal('show');
	}

});

function init(url) {

	/* ---------- Tooltip ---------- */
	$('[rel="tooltip"],[data-rel="tooltip"]').tooltip({"placement":"bottom",delay: { show: 400, hide: 200 }});

	/* ---------- Popover ---------- */
	$('[rel="popover"],[data-rel="popover"],[data-toggle="popover"]').popover();

}
