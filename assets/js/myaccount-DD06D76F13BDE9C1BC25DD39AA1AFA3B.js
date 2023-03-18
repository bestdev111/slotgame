var ebetAccount = {
		getTicketListUrl: function(){
			this.openTicketSummaries = {};
			this.openTicketRows = {};
			return jQuery("#comp-myContent").attr("e:url");
		},
		
		getBonusOverviewUrl: function(){
			return jQuery("#comp-bonusOverviewList").attr("e:url");
		},
		
		getBonusFilterUrl: function(){
			return jQuery("#comp-bonusFilter").attr("e:url");
		},
		
		getBonusUpdateUrl: function(){
			return "accounting2/bonus/update";
		},
		
		
		getParamListFromUrl: function(url){
			if (url.indexOf("?") == -1){
				return "";
			}
			else{
				return url.substr(url.indexOf("?") + 1);
			}

		},
		
		getUrlWithoutParamList: function(url){
			if (url.indexOf("?") == -1){
				return url;
			}else{
				//incl question mark
				return url.substr(0, url.indexOf("?") + 1);
			}
		},
		
		changePage: function(currentPage, chosenPage) {
			showDelayLayer();
			var url = this.getTicketListUrl();
			var newParamList = this.getParamListFromUrl(url).replace("currentPage=" + currentPage, "currentPage=" + chosenPage);
			RefreshHandler.complete(this.getUrlWithoutParamList(url) + newParamList);
		},	
		
		changeBetsPerPage: function(currentPage, entriesPerPage, newEntriesPerPage) {
			showDelayLayer();
			var url = this.getTicketListUrl();
			var newParamList = this.getParamListFromUrl(url).replace("currentPage=" + currentPage, "currentPage=1").replace("entriesPerPage=" + entriesPerPage, "entriesPerPage=" + newEntriesPerPage);
			RefreshHandler.complete(this.getUrlWithoutParamList(url) + newParamList);
		},
		
		delSelection: function(daysBack, layerTitle, layerTitle2, layerTxt, cancelBtnTxt, confBtnTxt) {
			var url = this.getTicketListUrl();
			var paramList = this.getParamListFromUrl(url);
			showConfLayer(layerTitle, layerTitle2, layerTxt, cancelBtnTxt, confBtnTxt)
			.then(function(val) {
				if (val) {
					showDelayLayer();
					RefreshHandler.completeOrUpdate(RefreshHandler.urlComplete, ["/ticket2/delTickets?" + paramList + "&daysBack=" + daysBack, url])
				}
				return val;
			});
		},	

		cancelPayment: function(paymentId, layerTitle, layerTitle2, layerTxt, cancelBtnTxt, confBtnTxt) {
			var url = this.getTicketListUrl();
			showConfLayer(layerTitle, layerTitle2, layerTxt, cancelBtnTxt, confBtnTxt)
			.then(function(val) {
				if (val) {
					showDelayLayer();
					RefreshHandler.completeOrUpdate(RefreshHandler.urlComplete, ["/accounting2/cancelPayment?paymentId=" + paymentId, url])
				}
				return val;
			});			
		},
		
		buybackTicket: function(buybackValue, ticketId, skipDelay) {
			showDelayLayer();
			RefreshHandler.nav("@layer/ticket2/buybackTicket?buybackValue=" + buybackValue + "&ticketId=" + ticketId + "&skipDelay=" + (skipDelay ? "true" : "false"));
		},

		cancelTicket: function(ticketId, ticketStatus, layerTitle, layerTitle2, layerTxt, cancelBtnTxt, confBtnTxt) {
			var url = this.getTicketListUrl();
			var paramList = this.getParamListFromUrl(url);
			showConfLayer(layerTitle, layerTitle2, layerTxt, cancelBtnTxt, confBtnTxt)
			.then(function(val) {
				if (val) {
					showDelayLayer();
					RefreshHandler.completeOrUpdate(RefreshHandler.urlComplete, ["/ticket2/cancelTicket?" + paramList + "&ticketId=" + ticketId + "&ticketStatus=" + ticketStatus, url])
				}
				return val;
			});
		},
		
		changePeriod: function(time, newTime, currentPage) {
			var url = this.getTicketListUrl();
			var newParamList = this.getParamListFromUrl(url).replace("time=" + time, "time=" + newTime).replace("currentPage=" + currentPage, "currentPage=1");
			RefreshHandler.complete(this.getUrlWithoutParamList(url) + newParamList);
		},
		
		changeUser: function(user, newUser, currentPage) {
			var url = this.getTicketListUrl();
			var newParamList = this.getParamListFromUrl(url).replace("selectedLogin=" + user, "selectedLogin=" + newUser).replace("selectedLogin=null", "selectedLogin=" + newUser).replace("currentPage=" + currentPage, "currentPage=1");
			RefreshHandler.complete(this.getUrlWithoutParamList(url) + newParamList);
		},
		
		changeToTimechoose: function(time, currentPage, paramList) {
			var url = this.getTicketListUrl();
			var newParamList = this.getParamListFromUrl(url).replace("time=" + time, "time=TIMECHOOSE").replace("currentPage=" + currentPage, "currentPage=1");
			RefreshHandler.complete(this.getUrlWithoutParamList(url) + newParamList);
		},
		
		
		
		bonusUpdate : function (updateUrl, updateParams){
			var index = updateUrl.indexOf('?');
			var url = updateUrl;
			if (index == -1){
				url += '?';
			}else if (index != updateUrl.length-1){
				url += '&';
			}
			url = url + jQuery.param(updateParams);
			RefreshHandler.nav( url , null, function(){
				hideDelayLayer();
			});
			
			/**
			var urls = new Array();
			urls[0] = this.getUrlWithoutParamList(this.getBonusFilterUrl());
			urls[1] = this.getUrlWithoutParamList(this.getBonusOverviewUrl());
			
			RefreshHandler.nav(url, null);
			 */
		},
		
		changeBonusOverview  : function (updateParams){
			var url = this.getBonusUpdateUrl() + '?' + jQuery.param(updateParams);
			var urls = new Array();
			urls[0] = this.getUrlWithoutParamList(this.getBonusOverviewUrl());
			urls[1] = this.getUrlWithoutParamList(this.getBonusFilterUrl());
			
			RefreshHandler.nav(url, null, function(){
				RefreshHandler.completeOrUpdate(RefreshHandler.urlComplete, urls);
				hideDelayLayer();
			});
		},
	
		changeBonus: function( bonusId )
		{
			var url = this.getBonusOverviewUrl();
			var newParamList = this.getParamListFromUrl(url).replace("currentPage="+currentPage, "currentPage=1").replace("bonusId="+bonusId, "bonusId="+newBonusId).replace("bonusId=-1", "bonusId="+newBonusId);
			RefreshHandler.complete(this.getUrlWithoutParamList(url) + newParamList);	
			
			var filterUrl = this.getBonusFilterUrl();
			var newFilterParamList = this.getParamListFromUrl(filterUrl).replace("bonusId="+bonusId, "bonusId="+newBonusId).replace("bonusId=-1", "bonusId="+newBonusId);
			RefreshHandler.complete(this.getUrlWithoutParamList(filterUrl) + newFilterParamList);	
		},
		
		
		
		changeTimeChosen: function(paramList, currentPage, url) {
			var datepickerTo = jQuery('#datepickerTo');
			var datepickerFrom = jQuery('#datepickerFrom');
			if (datepickerTo != undefined && datepickerFrom != undefined) {
				if (datepickerFrom.val().length > 0 && datepickerTo.val().length > 0) {
					showDelayLayer();
					var newParamList = paramList.replace("currentPage=" + currentPage, "currentPage=1");;
					var dateFromIndex = newParamList.indexOf("&dateFrom=");
					if (dateFromIndex !== -1){
						var endIndex = newParamList.indexOf("&",dateFromIndex+1)
						newParamList = newParamList.substring(0,dateFromIndex) + newParamList.substring(endIndex, newParamList.length);
					}
					newParamList = newParamList + "&dateFrom=" + datepickerFrom.val();
					var dateToIndex = newParamList.indexOf("&dateTo=");
					if (dateToIndex !== -1){
						var endIndex = newParamList.indexOf("&",dateToIndex+1)
						newParamList = newParamList.substring(0,dateToIndex) + newParamList.substring(endIndex, newParamList.length);
					}
					newParamList = newParamList + "&dateTo=" + datepickerTo.val();
					RefreshHandler.complete(url + newParamList);								
				}
			}
		},
		
		changeStatus: function(status, newStatus, currentPage) {
			var url = this.getTicketListUrl();
			var newParamList = this.getParamListFromUrl(url).replace("currentPage=" + currentPage, "currentPage=1");
			if (newParamList.indexOf("status")>-1)
				newParamList = newParamList.replace("status=" + status, "status=" + newStatus);
			else newParamList = newParamList.concat("&status=" + newStatus);
			RefreshHandler.complete(this.getUrlWithoutParamList(url) + newParamList);
		},
		
		updateOrder: function(newOrder, order, desc, currentPage) {
			// Falls newOrder = order -> desc/asc toggeln
			// sonst order �ndern.
			var url = this.getTicketListUrl();
			var newParamList = this.getParamListFromUrl(url);
			if (newOrder == order) {
				newParamList = newParamList.replace("desc=" + desc, "desc=" + !desc).replace("currentPage=" + currentPage, "currentPage=1");
			}
			else {
				newParamList = newParamList.replace("order=" + order, "order=" + newOrder).replace("desc=" + desc, "desc=true").replace("currentPage=" + currentPage, "currentPage=1");
			}
			RefreshHandler.complete(this.getUrlWithoutParamList(url) + newParamList);
		},
		
		updateDelRequest: function(delRequest) {
//			newParamList = this.getParamListFromUrl(this.getTicketListUrl()).replace("delRequest=" + delRequest, "delRequest=" + !delRequest);
//			RefreshHandler.complete("@infoBlock/ticket2/infoBlock?" + newParamList);
			jQuery("#comp-myContent").find(".info_bar").show();
		},
		
		ieInputFieldChange: function(inputValue, currentPage, numPages, keyCode){
			if(/MSIE (\d+\.\d+);/.test(navigator.userAgent) && keyCode == 13) 
				ebetAccount.inputFieldChange(inputValue, currentPage, numPages);
		},
		
		inputFieldChange: function(inputValue, currentPage, numPages){
			if(0 < inputValue && inputValue < numPages+1)
				ebetAccount.changePage(currentPage, inputValue);
		},
		
		loadDatepicker: function(locale, oldTimeParam, currentPage) {
			var datepickerTo = jQuery('#datepickerTo');
			var datepickerFrom = jQuery('#datepickerFrom');
			var url = this.getTicketListUrl();
			var newParamList = this.getParamListFromUrl(url).replace("time=" + oldTimeParam, "time=TIMECHOOSE").replace("currentPage=" + currentPage, "currentPage=1");
			url = this.getUrlWithoutParamList(url);
			if (datepickerTo != undefined && datepickerFrom != undefined) {
				datepickerTo.datepicker(jQuery.extend({},
						jQuery.datepicker.regional[locale], {
			    	            onSelect: function(date) {
			    	            	ebetAccount.changeTimeChosen(newParamList, currentPage, url);
			    	            }
			    	    }));
				datepickerFrom.datepicker(jQuery.extend({},
						jQuery.datepicker.regional[locale], {
			    	            onSelect: function(date) {
			    	            	ebetAccount.changeTimeChosen(newParamList, currentPage, url);
			    	            }
			    	    }));
			}
		},
		rejectTicket: function(ticketId) {
			RefreshHandler.nav("/layer/rejectTicket?ticketId=" + ticketId)
		},
		
		acceptTicket: function(ticketId) {
			RefreshHandler.nav("/layer/acceptTicket?ticketId=" + ticketId)
		},
		openTicketRows : {},
		
		togLineStyle: function(this_obj, betId){
			jQuery(this_obj).parent().parent().find('.hr').toggle().parent().parent().find('.sheet_body').toggleClass('on').toggle().find('.sheet_body_sub').toggleClass('hide');
			
			var line = jQuery(this_obj).parent().parent().next().next();
			if (line.attr("style")){
				line.removeAttr("style");
			} else{
				line.css("margin-left", "-93px");
				line.css("width", "754px");
			}
			
			if (this.openTicketRows[betId] == undefined){
				this.openTicketRows[betId] = '#jq-' + betId;
			}else{
				this.openTicketRows[betId] = undefined;
			}
		},
		
		openTicketSummaries : {},
		togTicketSummary: function(this_obj, ticketId){
			jQuery(this_obj).toggleClass('on').parent().parent().parent().find('.sheet_body').toggleClass('on').find('.sheet_body_sub').toggle().parent().find('.ie_w100.hide').toggle();
			if (this.openTicketSummaries[ticketId] == undefined){
				this.openTicketSummaries[ticketId] = '#jq-' + ticketId;
			}else{
				this.openTicketSummaries[ticketId] = undefined;
			}
		},
		
		updateTogTicketSummaries: function(){
			for (var id in this.openTicketSummaries){
				if (id!=undefined && this.openTicketSummaries[id]!=undefined){
					jQuery(this.openTicketSummaries[id]).toggleClass('on').parent().parent().parent().find('.sheet_body').toggleClass('on').find('.sheet_body_sub').toggle().parent().find('.ie_w100.hide').toggle();
				}
			}
			
			for (var id in this.openTicketRows){
				if (id!=undefined && this.openTicketRows[id] !=undefined){
					var node = jQuery(this.openTicketRows[id]);
					node.toggleClass('on').parent().parent().find('.hr').toggle().parent().parent().find('.sheet_body').toggleClass('on').toggle().find('.sheet_body_sub').toggleClass('hide');
					var line = node.parent().parent().next().next();
					line.css("margin-left", "-93px");
					line.css("width", "754px");
				}
			}
		},
		
		toggleTicketRow: function(this_obj){
			jQuery(this_obj).toggleClass('on').parent().parent().find('.hr').toggle().parent().parent().find('.sheet_body').toggleClass('on').toggle().find('.sheet_body_sub').toggleClass('hide');
		}
};
var casinoAccount = {
		getFilterUrl: function(){
			return jQuery("#comp-caFilter").attr("e:url");
		},
		getCasinoContentUrl: function(){
			return jQuery("#comp-casinoContent").attr("e:url");
		},
		getParamListFromUrl: function(url) {
			if (url.indexOf("?") == -1){
				return "";
			}
			else{
				return url.substr(url.indexOf("?") + 1);
			}
		},
		getUrlWithoutParamList: function(url) {
			if (url.indexOf("?") == -1){
				return url;
			}else{
				//incl question mark
				return url.substr(0, url.indexOf("?") + 1);
			}
		},
		loadDatepicker: function(locale, oldTimeParam, currentPage) {
			var datepickerTo = jQuery('#datepickerTo');
			var datepickerFrom = jQuery('#datepickerFrom');
			var url = this.getFilterUrl();
			var newParamList = this.getParamListFromUrl(url).replace(/time=(TIME[0-9]+)/, "time=TIMECHOOSE").replace("currentPage=" + currentPage, "currentPage=1");
			url = this.getUrlWithoutParamList(this.getCasinoContentUrl());
			if (datepickerTo != undefined && datepickerFrom != undefined) {
				datepickerTo.datepicker(jQuery.extend({},
						jQuery.datepicker.regional[locale], {
			    	            onSelect: function(date) {
			    	            	casinoAccount.changeTimeChosen(newParamList, currentPage, url);
			    	            }
			    	    }));
				datepickerFrom.datepicker(jQuery.extend({},
						jQuery.datepicker.regional[locale], {
			    	            onSelect: function(date) {
			    	            	casinoAccount.changeTimeChosen(newParamList, currentPage, url);
			    	            }
			    	    }));
			}
		},
		changeTimeChosen: function(paramList, currentPage, url) {
			var datepickerTo = jQuery('#datepickerTo');
			var datepickerFrom = jQuery('#datepickerFrom');
			if (datepickerTo != undefined && datepickerFrom != undefined) {
				if (datepickerFrom.val().length > 0 && datepickerTo.val().length > 0) {
					showDelayLayer();
					var newParamList = paramList.replace("currentPage=" + currentPage, "currentPage=1");;
					var dateFromIndex = newParamList.indexOf("&dateFrom=");
					if (dateFromIndex !== -1){
						var endIndex = newParamList.indexOf("&",dateFromIndex+1)
						newParamList = newParamList.substring(0,dateFromIndex) + newParamList.substring(endIndex, newParamList.length);
					}
					newParamList = newParamList + "&dateFrom=" + datepickerFrom.val();
					var dateToIndex = newParamList.indexOf("&dateTo=");
					if (dateToIndex !== -1){
						var endIndex = newParamList.indexOf("&",dateToIndex+1)
						newParamList = newParamList.substring(0,dateToIndex) + newParamList.substring(endIndex, newParamList.length);
					}
					newParamList = newParamList + "&dateTo=" + datepickerTo.val();
					RefreshHandler.complete(url + newParamList);								
				}
			}
		},
		changePeriod: function(time, newTime, currentPage) {
			var url = this.getCasinoContentUrl();
			var newParamList = this.getParamListFromUrl(url).replace("time=" + time, "time=" + newTime).replace("currentPage=" + currentPage, "currentPage=1");
			RefreshHandler.complete(this.getUrlWithoutParamList(url) + newParamList);
		},
		changeToTimechoose: function() {
			var url = this.getCasinoContentUrl();
			var newParamList = this.getParamListFromUrl(url).replace(/time=(TIME[0-9]+)/, "time=TIMECHOOSE").replace(/currentPage=[0-9]+/, "currentPage=1");
			RefreshHandler.complete(this.getUrlWithoutParamList(url) + newParamList);
		},
		changeTransactionsPerPage: function(newEntriesPerPage) {
			showDelayLayer();
			var url = this.getCasinoContentUrl();
			var newParamList = this.getParamListFromUrl(url).replace(/currentPage=[0-9]+/, "currentPage=1").replace(/entriesPerPage=(10|20|30)/, "entriesPerPage=" + newEntriesPerPage);
			RefreshHandler.complete(this.getUrlWithoutParamList(url) + newParamList);
		},
		changePage: function(chosenPage) {
			showDelayLayer();
			var url = this.getCasinoContentUrl();
			var newParamList = this.getParamListFromUrl(url).replace(/currentPage=[0-9]+/, "currentPage=" + chosenPage);
			RefreshHandler.complete(this.getUrlWithoutParamList(url) + newParamList);
		}
}