var localStorageGetItem;
var localStorageSetItem;
var localStorageRemoveItem;
var localStorageClear;

try {
    window.localStorage.getItem("a");
	localStorageGetItem = function(key){return window.localStorage.getItem(key);};
	localStorageSetItem = function(key, val){try {window.localStorage.setItem(key,val);return true;} catch (e) {return false;}};
	localStorageRemoveItem = function(key){return window.localStorage.removeItem(key);};
	localStorageClear = function() {window.localStorage.clear();};
} catch (err){
	localStorageGetItem = function(){return null;};
	localStorageSetItem = function(){return false;};
	localStorageRemoveItem = function(){};
	localStorageClear = function(){};
}

function setCookie(name, value, expires, path, domain, secure) {
	document.cookie = name + '=' + value +
	(domain ? ';domain=' + domain : '') +
	(path ? ';path=' + path : '') +
	(expires ? ';expires=' + expires : '') +
	(secure ? ';secure' : '');
}

/**
 * Startet GA verzögert damit die GA cookies im AppMode
 * aus dem LocalStorage wiederhergestellt werden können.
 * Ansonsten würden User nicht wiedererkannt werden
 */
function enableGoogleAnalytics() {

	var gaCode = app.global['gaCode'];
	if (gaCode){
		var gaString = "(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)};i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga');";
		eval(gaString);

        // see branding.js
        gaCreate();
		ga('require', 'linkid', 'linkid.js');
		ga('require', 'displayfeatures');
		ga('send', 'pageview');

		window['gaUserLoginChecker'] = setInterval(checkForUserLoggedIn, 500);

        if (isAndroidAndNoApp()){
            ga('set', 'dimension6', 'Android no app');
        } else if (isAndroidNativeApp()){
            ga('set', 'dimension6', 'Android native app');
        } else if (isIosDevice()){
            if (app.scrollType == 'native'){
                ga('set', 'dimension6', 'iPhone native app');
            } else{
                ga('set', 'dimension6', 'iPhone no app');
            }
        }
	}

	if(window['notTrackedPages'])
		window['notTrackedPages'].forEach(function(page){
			trackPageView(page, true);
		});
	window['notTrackedPages'] = undefined;

	if(window['notTrackedEvents'])
		window['notTrackedEvents'].forEach(function(e){
			trackEvent(e['category'], e['action'], e['label'], e['value'], true);
		});
	window['notTrackedEvents'] = undefined;

	(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer', app.global['gtmCode']);
}

/**
 * Track events with google analytics
 * Also responsible for tracking REGISTER_SUCCESS_DURATION
 */
function trackEvent(category, action, opt_label, opt_value, doNotPush) {
	var ga = window['ga'];
	if(ga) {
		ga('send', 'event', category, action, opt_label, opt_value);
	} else if (!doNotPush){
		if (!window['notTrackedEvents'])
			window['notTrackedEvents'] = [];
		window['notTrackedEvents'].push({"category":category,"action":action,"label":opt_label,"value":opt_value});
	}
}

/**
 * Track pageviews with google analytics
 * Also responsible for tracking REGISTER_STARTED
 */
function trackPageView(page, doNotPush) {
	if (page.indexOf("login/register") > -1) {
		if (!window['registerStartTime']) {
			trackEvent("REGISTER_TRACKING", "REGISTER_STARTED");
			window['registerStartTime'] = new Date().getTime();
		}
	} else if (page.indexOf("/qr") > -1 && !window['qrAlreadyTracked']) {
		trackEvent("QR_CODE", page);
		window['qrAlreadyTracked'] = true;
	}

	var ga = window['ga'];
	if(ga) {
		ga('send', 'pageview', page);
	} else {
		if (!doNotPush){
			if (!window['notTrackedPages'])
				window['notTrackedPages'] = [];
			window['notTrackedPages'].push(page);
		}
	}
}

/**
 * Sets possible registration duration (without loading).
 * Does not get tracked because there might be some incorrect fields.
 */
window['trackRegisterDuration'] = function () {
	if (window['registerStartTime']) {
		window['registerDuration'] = new Date().getTime() - window['registerStartTime'];
	}
}

/**
 * Tracks successful registration including needed time to register
 */
window['trackRegisterSuccess'] = function () {
	if (window['registerStartTime']){
		if (!window['registerDuration']) {
			window['registerDuration'] = new Date().getTime() - window['registerStartTime'];
		}
		trackEvent("REGISTER_TRACKING", "REGISTER_SUCCESS_DURATION", window['registerDuration']/1000);
		if (window['Adjust']) {
			var adjustEvent = new AdjustEvent("adzij1");
			Adjust.trackEvent(adjustEvent);
		}
		window['registerStartTime'] = undefined;
		window['registerDuration'] = undefined;
		app.lastInputOnReg = undefined;
	}
}

/**
 * Tracks cancelled registration and the field that was last selected
 */
window['registerTrackCancel'] = function registerTrackCancel(field) {
	trackEvent("REGISTER_TRACKING", "REGISTER_CANCELED_DUE_TO_FIELD", field);
}

/**
 * Check app.global to set UserId until username is determined, then stop polling
 */
function checkForUserLoggedIn(){
	if (app['global']['loggedIn'] == 1 && app['global']['login'] != null && window['ga']) {
		ga('set', '&uid', app['global']['login']);
		window['trackRegisterSuccess']();
		clearInterval(window['gaUserLoginChecker']);
	}
}
