var registerApp = angular.module("registerApp", ["angular-momentjs", "restangular", "selectionModel"]);
registerApp.config(["$momentProvider", "RestangularProvider", "$locationProvider", function(a, g, k) {
    a.asyncLoading(!1).scriptUrl("js/moment-with-langs.min.js");
    k.html5Mode(!0)
}]);
registerApp.constant("resourceStoreConstants", {
    defaultHeaders: {
        "Cache-Control": "no-cache, no-store, max-age\x3d0, must-revalidate",
        "Content-Type": 'application/json; charset\x3d"utf-8"'
    }
});
registerApp.factory("CommonMethods", function() {
    var a = "",
        g = "";
    return {
        setCountry: function(k) {
            a = k
        },
        setBrazilMobileSelected: function(a) {
            g = a
        },
        phoneMobileCountryCodePattern: function() {
            var a = /^\+\d{1,3}$/;
            return {
                test: function(j) {
                    return "" == j ? !0 : a.test(j)
                }
            }
        },
        phoneMobilePattern: function() {
            var k = /\D/g,
                j = /^[123456789]{1}\d{5,13}$/,
                c = /^\d{4,12}$/,
                t = /^\d{10}$/;
            return {
                test: function(n) {
                    if ("" == n && "CO" == !a) return !0;
                    n = n.replace(k, "");
                    return g ? c.test(n) : "CO" == a ? t.test(n) : j.test(n)
                }
            }
        },
        phoneMobileAreaCodePattern: function() {
            var a =
                /^\d{2}$/;
            return {
                test: function(j) {
                    return "" == j ? !0 : a.test(j)
                }
            }
        }
    }
});
registerApp.controller("PhoneMobileVerificationController", ["$scope", "$sce", "$timeout", "$log", "$moment", "$http", "Restangular", "resourceStoreConstants", "$location", "$window", "CommonMethods", function(a, g, k, j, c, t, n, v, u, o, r) {
    n.one("spring/phoneMobileVerification/init").get().then(function(l) {
        a.language = l.language;
        a.mode = l.mode;
        c.locale(a.language);
        a.invalidVerificationCodeMessage = "";
        a.phoneMobileVerification = new function() {
            this.verificationCode = this.bonusCode = this.mobileNumber = this.mobileAreaCode = this.mobileCountryCode =
                this.country = ""
        };
        a.phoneMobileVerification.mobileCountryCode = l.phonePrefix;
        a.mobileAreaCodes = l.mobileAreaCodes;
        a.mobileCountryCodes = [];
        for (var j = l.mobileCountryCodes, g = 0; g < j.length; g++) a.mobileCountryCodes.push({
            value: "+" + j[g],
            label: "+" + j[g],
            selected: !1
        });
        a.selectedMobileCountryCode = [];
        a.selectedMobileCountryCode.push({
            value: l.phonePrefix,
            label: l.phonePrefix,
            selected: !0
        });
        a.selectedMobileAreaCode = [];
        l.phoneBrazilPrefix ? a.selectedMobileAreaCode.push({
            value: l.phoneBrazilPrefix,
            label: l.phoneBrazilPrefix,
            selected: !0
        }) : a.mobileAreaCodes && a.selectedMobileAreaCode.push({
            value: 11,
            label: 11,
            selected: !0
        });
        a.availablePaymentMethods = [];
        j = l.availablePaymentMethods;
        for (g = 0; g < j.length; g++) a.availablePaymentMethods.push({
            className: j[g]
        });
        a.loggedInUser = l.loggedInUser;
        r.setCountry(a.loggedInUser.country);
        a.phoneMobileVerification.mobileNumber = "";
        a.phoneMobileVerification.mobileNumber = l.phoneMobileWithoutPrefix;
        jQuery("#mobilePhone").val(l.phoneMobileWithoutPrefix);
        l.phoneMobileWithoutPrefix && a.regForm.mobilePhone.$setViewValue(l.phoneMobileWithoutPrefix);
        a.casino = "true" == u.search().isCasino ? "casino" : "";
        a.brazilSelected ? (a.mobileNumberDivClass = "col-lg-6 col-md-6 col-sm-6 col-xs-6", a.mobileNumberSelectDivClass = "col-lg-3 col-md-3 col-sm-3 col-xs-3") : (a.mobileNumberDivClass = "col-lg-8 col-md-8 col-sm-8 col-xs-8", a.mobileNumberSelectDivClass = "col-lg-4 col-md-4 col-sm-4 col-xs-4");
        a.registerForbidden = l.registerForbidden;
        a.registerForbidden && (a.globalErrorMessage = i18n("error.countryRestricted"), void 0 != l.countryRestrictedForwardingProposal && (a.globalErrorMessage +=
            " " + l.countryRestrictedForwardingProposal), a.globalErrorMessage += "\x3cbr/\x3e" + i18n("error.countryRestrictedLink"), a.hasError = !0);
        n.one("spring/register/countryData", a.loggedInUser.country).get().then(function(c) {
            k(function() {
                a.$apply(function() {
                    c.state && (a.selectedState = [], a.selectedState.push({
                        value: c.state.value,
                        label: c.state.label,
                        selected: !0
                    }))
                }, 200)
            }, function(a) {
                console.log("Error with status code while getting country data: ", a.status)
            })
        })
    }, function() {
        a.globalErrorMessage = i18n("error.technicalError");
        a.hasError = !0
    });
    a.phoneMobileVerificationPhoneMobileChanged = function() {
        if (a.phoneMobileVerification && a.phoneMobileVerification.mobileNumber && a.phoneMobileVerification.mobileCountryCode) {
            var c = a.phoneMobileVerification.mobileCountryCode;
            "+55" == a.phoneMobileVerification.mobileCountryCode && (c += a.phoneMobileVerification.mobileAreaCode);
            c += a.phoneMobileVerification.mobileNumber;
            o.showDelayLayer();
            n.one("spring/phoneMobileVerification/phoneMobileChanged/" + c).get().then(function(c) {
                a.regForm.mobilePhone.$setValidity("invalid", !0);
                for (var l = 0; l < c.details.length; l++) {
                    var g = c.details[l];
                    "phoneMobile" == g.field && (a.regForm.mobilePhone.$setValidity("invalid", !1), a.invalidPhoneMobileMessage = g.message)
                }
                c.errorMessage && (a.globalErrorMessage = c.errorMessage);
                o.hideDelayLayer()
            }, function(a) {
                o.hideDelayLayer();
                console.log("Error with status code while generating and sending verification code", a.status)
            })
        }
    };
    a.phoneMobileVerificationCodeChanged = function() {
        a.regForm.verificationCode.$setValidity("invalid", !0)
    };
    a.verify = function() {
        a.phoneMobileVerification &&
            (a.phoneMobileVerification.verificationCode && !a.regForm.$invalid) && (o.showDelayLayer(), n.one("spring/phoneMobileVerification/verify/" + a.phoneMobileVerification.verificationCode).get().then(function(c) {
                if (c.topLocationHref) o.top.location.href = c.topLocationHref;
                else {
                    for (var g = 0; g < c.details.length; g++) {
                        var j = c.details[g];
                        "verificationCode" == j.field && (a.regForm.verificationCode.$setValidity("invalid", !1), a.invalidVerificationCodeMessage = j.message)
                    }
                    o.hideDelayLayer()
                }
            }, function(a) {
                o.hideDelayLayer();
                console.log("Error with status code while generating and sending verification code",
                    a.status)
            }))
    };
    a.skip = function() {
        n.one("spring/phoneMobileVerification/skip").get().then(function(a) {
            o.top.location.href = a
        }, function(a) {
            console.log("Error with status code while generating and sending verification code", a.status)
        })
    };
    a.onResendPhoneVerificationCode = function() {
        o.showDelayLayer();
        n.one("spring/phoneMobileVerification/reSend").get().then(function() {
            o.hideDelayLayer()
        }, function(a) {
            o.hideDelayLayer();
            console.log("Error with status code while resending verification code", a.status)
        })
    };
    a.phoneMobileAreaCodePattern =
        r.phoneMobileAreaCodePattern();
    a.phoneMobileCountryCodePattern = r.phoneMobileCountryCodePattern();
    a.phoneMobilePattern = r.phoneMobilePattern(a);
    a.$watch("selectedMobileCountryCode", function(c) {
        void 0 != a.phoneMobileVerification && (void 0 !== c && void 0 !== c[0] && (a.phoneMobileVerification.mobileCountryCode = c[0].value, "+55" == a.phoneMobileVerification.mobileCountryCode ? (a.brazilMobileSelected = !0, a.mobileNumberDivClass = "col-lg-6 col-md-6 col-sm-6 col-xs-6", a.mobileNumberSelectDivClass = "col-lg-3 col-md-3 col-sm-3 col-xs-3") :
            (a.brazilMobileSelected = !1, a.mobileNumberDivClass = "col-lg-8 col-md-8 col-sm-8 col-xs-8", a.mobileNumberSelectDivClass = "col-lg-4 col-md-4 col-sm-4 col-xs-4")), a.phoneMobileVerificationPhoneMobileChanged())
    }, !0);
    a.$watch("selectedMobileAreaCode", function(c, g) {
        void 0 != a.phoneMobileVerification && (void 0 !== c && void 0 !== c[0] && (a.phoneMobileVerification.mobileAreaCode = c[0].value), g && a.phoneMobileVerificationPhoneMobileChanged())
    }, !0);
    a.$watch("brazilMobileSelected", function() {
        r.setBrazilMobileSelected(a.brazilMobileSelected)
    }, !0)
}]);
registerApp.controller("RegisterController", ["$scope", "$sce", "$timeout", "$log", "$moment", "$http", "Restangular", "resourceStoreConstants", "$location", "$window", "CommonMethods", function(a, g, k, j, c, t, n, v, u, o, r) {
    function l() {
        o.hideDelayLayer();
        a.prefillingData = !1
    }

    function w(b) {
        if ("+0" !== b.mobileCountryCode.value) {
            for (; 0 < a.selectedMobileCountryCode.length;) a.selectedMobileCountryCode.pop();
            a.selectedMobileCountryCode.push(b.mobileCountryCode)
        }
        for (; 0 < a.selectedCurrency.length;) a.selectedCurrency.pop();
        a.selectedCurrency.push(b.currency);
        a.states = [{
            value: -1,
            label: i18n("selectState"),
            selected: !0
        }];
        for (var c = b.states, d = 0; d < c.length; d++) a.states.push({
            value: c[d].value,
            label: c[d].label,
            selected: !1
        });
        a.selectedState = [];
        b.state && a.selectedState.push({
            value: b.state.value,
            label: b.state.label,
            selected: !0
        });
        a.issueCountries = [{
            value: -1,
            label: i18n("selectIssueLocation"),
            selected: !0
        }];
        c = b.countries;
        for (d = 0; d < c.length; d++) a.issueCountries.push({
            value: c[d].value,
            label: c[d].label,
            selected: !1
        });
        a.selectedDocumentIssueLocation = [];
        a.birthCities = [{
            value: -1,
            label: i18n("selectBirthCity"),
            selected: !0
        }];
        for (var h = b.birthCities, d = 0; d < h.length; d++) a.birthCities.push({
            value: h[d].label,
            label: h[d].value,
            selected: !1
        });
        a.cities = [{
            value: -1,
            label: i18n("selectIssueLocation"),
            selected: !0
        }];
        for (d = 0; d < h.length; d++) a.cities.push({
            value: h[d].label,
            label: h[d].value,
            selected: !1
        });
        a.birthCountries = [{
            value: -1,
            label: i18n("selectBirthCountry"),
            selected: !0
        }];
        for (d = 0; d < c.length; d++) a.birthCountries.push({
            value: c[d].value,
            label: c[d].label,
            selected: !1
        });
        a.selectedBirthPlace = [];
        a.showPepCheckbox = b.showPepCheckbox;
        b.showPepCheckbox || (a.user.politicallyExposedPerson = !1);
        if (a.user.externalIdentifierAsLogin && !a.loggedIn && !("reactivate" == a.mode || "complete" == a.mode)) a.regForm.taxNumber.$viewValue && 0 != a.regForm.taxNumber.$viewValue.length ? f(a.regForm.taxNumber, "taxNumberNew", a.user.taxNumber) : a.user.login.$viewValue && "" != a.user.login.$viewValue.length && f(a.regForm.login, "loginNew", a.user.login)
    }

    function q(a, c, d, h) {
        void 0 !== a && void 0 !== a[0] && h(a)
    }

    function s(a, c, d, h) {
        void 0 !== a &&
            void 0 !== a[0] && h(a)
    }

    function x() {
        var b = 31;
        "" != a.user.birthdayYear && "" != a.user.birthdayMonth && (b = c(), b.set("year", a.user.birthdayYear), b.set("month", a.user.birthdayMonth - 1), b = b.daysInMonth());
        a.birthdayDays = [{
            value: -1,
            label: i18n("selectDay"),
            selected: !0
        }];
        for (var p = 1; p <= b; p++) a.birthdayDays.push({
            value: p,
            label: p,
            selected: !1
        });
        a.user.birthdayDay > b && (a.selectedBirthdayDay = [])
    }

    function y() {
        var b = 31;
        "" != a.user.document.issueDateYear && "" != a.user.document.issueDateMonth && (b = c(), b.set("year", a.user.document.issueDateYear),
            b.set("month", a.user.document.issueDateMonth - 1), b = b.daysInMonth());
        a.user.document.issueDateDays = [{
            value: -1,
            label: i18n("selectDay"),
            selected: !0
        }];
        for (var p = 1; p <= b; p++) a.user.document.issueDateDays.push({
            value: p,
            label: p,
            selected: !1
        });
        a.user.document.issueDateDay > b && (a.selectedDocumentIssueDateDay = [])
    }

    function z() {
        var b = 31;
        "" != a.user.document.expirationDateYear && "" != a.user.document.expirationDateMonth && (b = c(), b.set("year", a.user.document.expirationDateYear), b.set("month", a.user.document.expirationDateMonth -
            1), b = b.daysInMonth());
        a.user.document.expirationDateDays = [{
            value: -1,
            label: i18n("selectDay"),
            selected: !0
        }];
        for (var p = 1; p <= b; p++) a.user.document.expirationDateDays.push({
            value: p,
            label: p,
            selected: !1
        });
        a.user.document.expirationDateDay > b && (a.selectedDocumentExpirationDateDay = [])
    }

    function f(b, c, d) {
        void 0 != b && b.$pristine && (void 0 != d ? b.$setViewValue(d) : b.$setViewValue(""));
        null != c && (a[c] = "")
    }

    function A() {
        f(a.regForm.firstName, "firstNameNew", a.user.firstName);
        f(a.regForm.middleName, "middleNameNew", a.user.middleName);
        f(a.regForm.lastName, "lastNameNew", a.user.lastName);
        f(a.regForm.lastName2, "lastName2New", a.user.lastName2);
        f(a.regForm.company, "companyNew", a.user.company);
        f(a.regForm.website, "websiteNew", a.user.website);
        f(a.regForm.birthdayDay, null, a.user.birthdayDay);
        f(a.regForm.birthdayMonth, null, a.user.birthdayMonth);
        f(a.regForm.birthdayYear, null, a.user.birthdayYear);
        f(a.regForm.login, "loginNew", a.user.login);
        f(a.regForm.email, "emailNew", a.user.email);
        f(a.regForm.password, null, a.user.password);
        f(a.regForm.country,
            null, a.user.country);
        f(a.regForm.currency, null, a.user.currency);
        f(a.regForm.street, "streetNew", a.user.street);
        f(a.regForm.zipCode, "zipCodeNew", a.user.zipCode);
        f(a.regForm.city, "cityNew", a.user.city);
        f(a.regForm.mobileCountryCode, null, a.user.mobileCountryCode);
        a.brazilMobileSelected && f(a.regForm.mobileAreaCode, null, a.user.mobileAreaCode);
        f(a.regForm.mobilePhone, "mobileNumberNew", a.user.mobileNumber);
        f(a.regForm.documentType, "documentType", a.user.document.type);
        f(a.regForm.documentIssueLocation, "documentIssueLocation",
            a.user.document.issueLocation);
        f(a.regForm.documentIssueDateDay, null, a.user.document.issueDateDay);
        f(a.regForm.documentIssueDateMonth, null, a.user.document.issueDateMonth);
        f(a.regForm.documentIssueDateYear, null, a.user.document.issueDateYear);
        f(a.regForm.documentExpirationDateDay, null, a.user.document.expirationDateDay);
        f(a.regForm.documentExpirationDateMonth, null, a.user.document.expirationDateMonth);
        f(a.regForm.documentExpirationDateYear, null, a.user.document.expirationDateYear);
        f(a.regForm.taxNumber,
            "taxNumberNew", a.user.taxNumber);
        f(a.regForm.nationality, "nationality", a.user.nationality);
        f(a.regForm.birthPlace, "birthPlaceClass", a.user.birthPlace);
        f(a.regForm.state, "stateClass", a.user.state);
        f(a.regForm.limitDaily, null, a.user.limitDaily);
        f(a.regForm.limitWeekly, null, a.user.limitWeekly);
        f(a.regForm.limitMonthly, null, a.user.limitMonthly);
        f(a.regForm.bonusPromoCodeValue, null, a.user.bonusPromoCode.value);
        a.brazilSelected && f(a.regForm.state, null, a.user.state)
    }

    function m(b, c, d, h) {
        "birthdayDayClass" !=
        d && (a.birthdayDayClass = "");
        "birthdayMonthClass" != d && (a.birthdayMonthClass = "");
        "birthdayYearClass" != d && (a.birthdayYearClass = "");
        "birthPlaceClass" != d && (a.birthPlaceClass = "");
        "countryClass" != d && (a.countryClass = "");
        "stateClass" != d && (a.stateClass = "");
        "cityClass" != d && (a.cityClass = "");
        "currencyClass" != d && (a.currencyClass = "");
        "mobileCodeClass" != d && (a.mobileCodeClass = "");
        "mobileAreaCodeClass" != d && (a.mobileAreaCodeClass = "");
        "documentTypeClass" != d && (a.documentTypeClass = "");
        "documentIssueLocationClass" != d && (a.documentIssueLocationClass =
            "");
        "documentIssueDateDayClass" != d && (a.documentIssueDateDayClass = "");
        "documentIssueDateMonthClass" != d && (a.documentIssueDateMonthClass = "");
        "documentIssueDateYearClass" != d && (a.documentIssueDateYearClass = "");
        "documentExpirationDateDayClass" != d && (a.documentExpirationDateDayClass = "");
        "documentExpirationDateMonthClass" != d && (a.documentExpirationDateMonthClass = "");
        "documentExpirationDateYearClass" != d && (a.documentExpirationDateYearClass = "");
        "nationalityClass" != d && (a.nationalityClass = "");
        "" === a[d] && "true" !=
            jQuery(b.target).attr("data-disabled") ? a[d] = "open" : (c.$setViewValue(h), a[d] = "")
    }
    n.setDefaultHeaders(v.defaultHeaders);
    a.hasError = !1;
    a.registerPossibleAt = c().add(5, "seconds");
    n.one("spring/register/init").get().then(function(b) {
        function p() {
            this.residentialCityCode = this.residentialDepartmentCode = this.issueLocation = this.number = this.type = "";
            this.issueDateDays = [];
            this.issueDateMonths = [];
            this.issueDateYears = [];
            this.expirationDateDays = [];
            this.expirationDateMonths = [];
            this.expirationDateYears = [];
            this.expirationDateDay =
                this.expirationDateMonth = this.expirationDateYear = this.issueDateDay = this.issueDateMonth = this.issueDateYear = ""
        }

        function d() {
            var a = u.search().rp;
            this.available = !!a;
            this.value = a ? a : ""
        }
        a.language = b.language;
        c.locale(a.language);
        a.bonusCountry = b.bonusCountry;
        a.user = new function() {
            this.salutation = "MALE";
            this.mobileNumber = this.mobileAreaCode = this.mobileCountryCode = this.country = this.currency = this.password = this.email = this.login = this.birthPlace = this.birthdayYear = this.birthdayMonth = this.birthdayDay = this.lastName2 =
                this.lastName = this.middleName = this.firstName = "";
            this.mobilePromo = !1;
            this.overEighteen = !0;
            this.politicallyExposedPerson = !1;
            this.city = this.zipCode = this.street = this.website = this.company = this.taxNumber = this.nationality = this.state = "";
            this.language = a.language;
            this.casino = u.search().isCasino;
            this.livescore = b.livescore;
            this.retailCustomer = b.retailCustomer;
            this.limitDaily = b.dailyDepositLimit;
            this.limitWeekly = b.weeklyDepositLimit;
            this.limitMonthly = b.monthlyDepositLimit;
            this.document = new p;
            this.bonusPromoCode =
                new d;
            this.mode = b.mode;
            this.withoutBirthdayFields = b.withoutBirthdayFields;
            this.allowAllContactMethods = b.allowAllContactMethods;
            this.externalIdentifierAsLogin = b.externalIdentifierAsLogin;
            this.generateLogin = b.generateLogin
        };
        a.prefillingData = !1;
        a.countries = [];
        for (var h = b.countries, e = 0; e < h.length; e++) a.countries.push({
            value: h[e].value,
            label: h[e].label,
            selected: !1
        });
        a.selectedCountry = [];
        a.nationalities = [];
        for (var f = b.nationalities, e = 0; e < f.length; e++) a.nationalities.push({
            value: f[e].value,
            label: f[e].label,
            selected: !1
        });
        a.selectedNationality = [];
        a.documentTypes = [];
        h = b.documentTypes;
        for (e = 0; e < h.length; e++) a.documentTypes.push({
            value: h[e].value,
            label: h[e].label,
            selected: 1 == h[e].value
        });
        a.selectedDocumentType = [];
        a.currencies = [];
        h = b.currencies;
        for (e = 0; e < h.length; e++) a.currencies.push({
            value: h[e].value,
            label: h[e].label,
            selected: !1
        });
        a.selectedCurrency = [];
        a.availablePaymentMethods = [];
        h = b.availablePaymentMethods;
        for (e = 0; e < h.length; e++) a.availablePaymentMethods.push({
            className: h[e]
        });
        a.mobileCountryCodes = [];
        h = b.mobileCountryCodes;
        for (e = 0; e < h.length; e++) a.mobileCountryCodes.push({
            value: "+" + h[e],
            label: "+" + h[e],
            selected: !1
        });
        a.selectedMobileCountryCode = [];
        a.mobileAreaCodes = [];
        h = [11, 12, 13, 14, 15, 16, 17, 18, 19, 21, 22, 24, 27, 28, 31, 32, 33, 34, 35, 37, 38, 41, 42, 43, 44, 45, 46, 47, 48, 49, 51, 53, 54, 55, 61, 62, 63, 64, 65, 66, 67, 68, 69, 71, 73, 74, 75, 77, 79, 81, 82, 83, 84, 85, 86, 87, 88, 89, 91, 92, 93, 94, 95, 96, 97, 98, 99];
        for (e = 0; e < h.length; e++) a.mobileAreaCodes.push({
            value: h[e],
            label: h[e],
            selected: !1
        });
        a.selectedMobileAreaCode = [];
        a.selectedMobileAreaCode.push({
            value: 11,
            label: 11,
            selected: !0
        });
        a.birthdayDays = [{
            value: -1,
            label: i18n("selectDay") + " *",
            selected: !0
        }];
        for (e = 1; 31 >= e; e++) a.birthdayDays.push({
            value: e,
            label: e,
            selected: !1
        });
        a.selectedBirthdayDay = [];
        var j = c.months();
        a.birthdayMonths = [{
            value: -1,
            label: i18n("selectMonth") + " *",
            selected: !0
        }];
        for (e = 1; e <= j.length; e++) a.birthdayMonths.push({
            value: e,
            label: j[e - 1],
            selected: !1
        });
        a.selectedBirthdayMonth = [];
        var h = c().subtract(b.minAge, "years").year(),
            m = c().subtract(99, "years").year();
        a.birthdayYears = [{
            value: -1,
            label: i18n("selectYear") +
                " *",
            selected: !0
        }];
        for (e = h; e >= m; e--) a.birthdayYears.push({
            value: e,
            label: e,
            selected: !1
        });
        a.selectedBirthdayYear = [];
        a.user.document.issueDateDays = [{
            value: -1,
            label: i18n("selectDay") + " *",
            selected: !0
        }];
        for (e = 1; 31 >= e; e++) a.user.document.issueDateDays.push({
            value: e,
            label: e,
            selected: !1
        });
        a.selectedDocumentIssueDateDay = [];
        a.user.document.issueDateMonths = [{
            value: -1,
            label: i18n("selectMonth") + " *",
            selected: !0
        }];
        for (e = 1; e <= j.length; e++) a.user.document.issueDateMonths.push({
            value: e,
            label: j[e - 1],
            selected: !1
        });
        a.selectedDocumentIssueDateMonth = [];
        h = c().year();
        m = c().subtract(99, "years").year();
        a.user.document.issueDateYears = [{
            value: -1,
            label: i18n("selectYear") + " *",
            selected: !0
        }];
        for (e = h; e >= m; e--) a.user.document.issueDateYears.push({
            value: e,
            label: e,
            selected: !1
        });
        a.selectedDocumentIssueDateYear = [];
        a.user.document.expirationDateDays = [{
            value: -1,
            label: i18n("selectDay") + " *",
            selected: !0
        }];
        for (e = 1; 31 >= e; e++) a.user.document.expirationDateDays.push({
            value: e,
            label: e,
            selected: !1
        });
        a.selectedDocumentExpirationDateDay = [];
        a.user.document.expirationDateMonths = [{
            value: -1,
            label: i18n("selectMonth") + " *",
            selected: !0
        }];
        for (e = 1; e <= j.length; e++) a.user.document.expirationDateMonths.push({
            value: e,
            label: j[e - 1],
            selected: !1
        });
        a.selectedDocumentExpirationDateMonth = [];
        h = c().add(10, "years").year();
        m = c().year();
        a.user.document.expirationDateYears = [{
            value: -1,
            label: i18n("selectYear") + " *",
            selected: !0
        }];
        for (e = m; e <= h; e++) a.user.document.expirationDateYears.push({
            value: e,
            label: e,
            selected: !1
        });
        a.selectedDocumentExpirationDateYear = [];
        a.residentialCities = [{
            value: -1,
            label: i18n("selectCity"),
            selected: !0
        }];
        a.birthCities = [];
        a.selectedCity = [];
        a.showCountrySelection = b.showCountrySelection;
        a.showCurrencySelection = b.showCurrencySelection;
        a.dMmYyyyShown = !b.country || "JP" !== b.country.value;
        a.inputType = "password";
        a.emailConfirm = "";
        a.casino = "true" == a.user.casino ? "casino" : "";
        a.bonusReachable = b.bonusCountry && "true" != a.user.casino;
        a.bonusReachable && (a.bonusAmountMulti = b.bonusAmount);
        a.selectedCountry.push(b.country);
        void 0 != b.nationality && a.selectedNationality.push(b.nationality);
        a.brazilSelected = "BR" == b.country;
        a.brazilMobileSelected = a.brazilSelected;
        a.user.mobileAreaCode = "11";
        a.brazilSelected ? (a.mobileNumberDivClass = "col-lg-6 col-md-6 col-sm-6 col-xs-6", a.mobileNumberSelectDivClass = "col-lg-3 col-md-3 col-sm-3 col-xs-3") : (a.mobileNumberDivClass = "col-lg-8 col-md-8 col-sm-8 col-xs-8", a.mobileNumberSelectDivClass = "col-lg-4 col-md-4 col-sm-4 col-xs-4");
        a.registerForbidden = b.registerForbidden;
        a.registerForbidden && (a.globalErrorMessage = i18n("error.countryRestricted"), void 0 != b.countryRestrictedForwardingProposal &&
            (a.globalErrorMessage += " " + b.countryRestrictedForwardingProposal), a.globalErrorMessage += "\x3cbr/\x3e" + i18n("error.countryRestrictedLink"), a.hasError = !0);
        a.tacText = g.trustAsHtml(b.tacText);
        a.gamblingText = g.trustAsHtml(b.gamblingText);
        a.loggedIn = b.userLoggedIn;
        a.prefilledEmail = null != b.livescoreEmail;
        a.mode = b.mode;
        if (a.loggedIn && ("normal" == a.mode || "retailAgencyRequest" == a.mode)) a.globalErrorMessage = i18n("error.alreadyLoggedIn"), a.hasError = !0;
        a.loggedInAffiliate = a.loggedIn && "affiliate" == a.mode;
        !a.loggedIn &&
            ("affiliate" == a.mode && b.geoCity && b.geoZipCode) && (a.user.city = b.geoCity, a.user.zipCode = b.geoZipCode);
        a.canRegister = !a.registerForbidden && (!a.loggedIn && "retailNewTeller" != a.mode || "affiliate" == a.mode || a.user.livescore || a.loggedIn && "retailNewTeller" == a.mode);
        a.canRegister = a.canRegister && !(b.hasOnlineTellerRole && ("affiliate" == a.mode || "normal" == a.mode));
        a.canRegister = a.canRegister && !(b.hasCustomerRole && "retailAgencyRequest" == a.mode);
        if (a.canRegister || "reactivate" == a.mode || "complete" == a.mode) a.user.livescore ?
            (a.user.login = b.loggedInUser.login, a.user.password = b.livescorePassword, a.prefilledEmail && (a.user.email = b.livescoreEmail)) : a.loggedIn && "retailNewTeller" != a.mode && (a.prefillingData = !0, o.showDelayLayer(), k(function() {
                a.$apply(function() {
                    a.user.retailCustomer = b.retailCustomer;
                    a.user.country = b.loggedInUser.contact.country || b.country;
                    a.user.state = b.loggedInUser.contact.region;
                    a.user.salutation = b.loggedInUser.contact.salutation || "MALE";
                    a.user.firstName = b.loggedInUser.contact.firstName;
                    a.user.middleName =
                        b.loggedInUser.contact.middleName;
                    a.user.lastName = b.loggedInUser.contact.lastName;
                    a.user.lastName2 = b.loggedInUser.contact.lastName2;
                    a.user.login = b.loggedInUser.login;
                    a.user.email = b.loggedInUser.contact.email;
                    a.user.password = b.retailCustomer ? "" : "12345678";
                    a.user.street = b.loggedInUser.contact.street;
                    a.user.zipCode = b.loggedInUser.contact.zipCode;
                    a.user.taxNumber = b.loggedInUser.externalIdentifier;
                    a.user.mobileNumber = b.loggedInUser.contact.phoneMobile;
                    a.user.document.number = b.loggedInUser.externalIdentifier;
                    var d = b.loggedInUser.contact.birthday;
                    d && (a.selectedBirthdayDay = [], a.selectedBirthdayDay.push({
                        value: c(d).date(),
                        label: c(d).date(),
                        selected: !0
                    }), a.selectedBirthdayMonth = [], a.selectedBirthdayMonth.push({
                        value: c(d).month() + 1,
                        label: j[c(d).month()],
                        selected: !0
                    }), a.selectedBirthdayYear = [], a.selectedBirthdayYear.push({
                        value: c(d).year(),
                        label: c(d).year(),
                        selected: !0
                    }));
                    for (; 0 < a.selectedCountry.length;) a.selectedCountry.pop();
                    for (a.selectedCountry.push({
                            value: b.loggedInUser.country,
                            label: b.loggedInUser.country,
                            selected: !0
                        }); 0 < a.selectedCurrency.length;) a.selectedCurrency.pop();
                    a.selectedCurrency.push({
                        value: b.loggedInUser.currency,
                        label: b.loggedInUser.currency,
                        selected: !0
                    });
                    if (null != b.loggedInUser.contact.nationality)
                        for (d = 0; d < f.length; d++)
                            if (b.loggedInUser.contact.nationality == f[d].value) {
                                a.selectedNationality.push({
                                    value: f[d].value,
                                    label: f[d].label,
                                    selected: !0
                                });
                                break
                            }
                    if (null != b.existingDoc) {
                        a.user.document.type = parseInt(b.existingDoc.type);
                        a.user.document.number = b.existingDoc.number;
                        a.user.document.issueLocation =
                            b.existingDoc.issueLocation;
                        a.user.document.residentialDepartmentCode = b.existingDoc.residentialDepartmentCode;
                        a.user.document.residentialCityCode = b.existingDoc.residentialCityCode;
                        a.user.document.issueDateYear = b.existingDoc.issueDateYear;
                        a.user.document.issueDateMonth = b.existingDoc.issueDateMonth;
                        a.user.document.issueDateDay = b.existingDoc.issueDateDay;
                        var e = b.documentTypes;
                        a.selectedDocumentType = [];
                        for (d = 0; d < e.length; d++)
                            if (e[d].value == b.existingDoc.type) {
                                a.selectedDocumentType.push({
                                    value: e[d].value,
                                    label: e[d].label,
                                    selected: !0
                                });
                                break
                            }
                        a.selectedDocumentIssueDateDay = [];
                        a.selectedDocumentIssueDateDay.push({
                            value: parseInt(b.existingDoc.issueDateDay),
                            label: parseInt(b.existingDoc.issueDateDay),
                            selected: !0
                        });
                        a.selectedDocumentIssueDateMonth = [];
                        a.selectedDocumentIssueDateMonth.push({
                            value: parseInt(b.existingDoc.issueDateMonth),
                            label: j[parseInt(b.existingDoc.issueDateMonth) - 1],
                            selected: !0
                        });
                        a.selectedDocumentIssueDateYear = [];
                        a.selectedDocumentIssueDateYear.push({
                            value: parseInt(b.existingDoc.issueDateYear),
                            label: b.existingDoc.issueDateYear,
                            selected: !0
                        });
                        a.user.document.expirationDateYear = b.existingDoc.expirationDateYear;
                        a.user.document.expirationDateMonth = b.existingDoc.expirationDateMonth;
                        a.user.document.expirationDateDay = b.existingDoc.expirationDateDay;
                        "2" == b.existingDoc.type && (a.user.birthPlace = b.loggedInUser.contact.birthCountry, a.selectedDocumentExpirationDateDay = [], a.selectedDocumentExpirationDateDay.push({
                            value: parseInt(b.existingDoc.expirationDateDay),
                            label: parseInt(b.existingDoc.expirationDateDay),
                            selected: !0
                        }), a.selectedDocumentExpirationDateMonth = [], a.selectedDocumentExpirationDateMonth.push({
                            value: parseInt(b.existingDoc.expirationDateMonth),
                            label: j[parseInt(b.existingDoc.expirationDateMonth) - 1],
                            selected: !0
                        }), a.selectedDocumentExpirationDateYear = [], a.selectedDocumentExpirationDateYear.push({
                            value: parseInt(b.existingDoc.expirationDateYear),
                            label: b.existingDoc.expirationDateYear,
                            selected: !0
                        }))
                    }
                    n.one("spring/register/countryData", a.user.country).get().then(function(d) {
                        k(function() {
                            a.$apply(function() {
                                w(d);
                                d.state && (a.selectedState = [], a.selectedState.push({
                                    value: d.state.value,
                                    label: d.state.label,
                                    selected: !0
                                }));
                                if (null != b.existingDoc) {
                                    a.selectedDocumentIssueLocation = [];
                                    a.selectedBirthPlace = [];
                                    if ("2" == a.user.document.type)
                                        for (var c = 0; c < a.issueCountries.length; c++) a.issueCountries[c].value == b.existingDoc.issueLocation ? a.selectedDocumentIssueLocation.push({
                                            value: a.issueCountries[c].value,
                                            label: a.issueCountries[c].label,
                                            selected: !0
                                        }) : a.issueCountries[c].value == a.user.birthPlace && a.selectedBirthPlace.push({
                                            value: a.issueCountries[c].value,
                                            label: a.issueCountries[c].label,
                                            selected: !0
                                        });
                                    else
                                        for (c = 0; c < a.cities.length; c++) a.cities[c].value == b.existingDoc.birthCity && a.selectedBirthPlace.push({
                                            value: a.cities[c].value,
                                            label: a.cities[c].label,
                                            selected: !0
                                        }), a.cities[c].value == b.existingDoc.issueLocation && a.selectedDocumentIssueLocation.push({
                                            value: a.cities[c].value,
                                            label: a.cities[c].label,
                                            selected: !0
                                        });
                                    a.$on("statesSetComplete", function() {
                                        a.selectedCity = [];
                                        for (var b = a.residentialCities, d = 0; d < b.length; d++)
                                            if (b[d].value == a.user.document.residentialCityCode) {
                                                a.selectedCity.push({
                                                    value: b[d].value,
                                                    label: b[d].label,
                                                    selected: !0
                                                });
                                                break
                                            }
                                        l()
                                    });
                                    for (c = 0; c < a.states.length; c++)
                                        if (a.states[c].value == a.user.document.residentialDepartmentCode) {
                                            a.selectedState.push({
                                                value: a.states[c].value,
                                                label: a.states[c].label,
                                                selected: !0
                                            });
                                            break
                                        }(0 == a.selectedState.length || -1 == a.selectedState[0]) && l()
                                } else l()
                            })
                        }, 200)
                    }, function(a) {
                        console.log("Error with status code while getting country data: ", a.status);
                        l()
                    })
                });
                150
            }))
    }, function() {
        a.globalErrorMessage = i18n("error.technicalError");
        a.hasError = !0
    });
    a.$watch("selectedCountry",
        function(b, c) {
            void 0 == a.user || a.prefillingData || q(b, c, a.user.country, function(b) {
                a.user.country = b[0].value;
                r.setCountry(a.user.country);
                a.dMmYyyyShown = "JP" !== a.user.country;
                a.brazilSelected = "BR" == a.user.country;
                b = a.user.country;
                void 0 == b || "" == b || n.one("spring/register/countryData", b).get().then(function(a) {
                    w(a)
                }, function(a) {
                    console.log("Error with status code while getting country data", a.status)
                })
            })
        }, !0);
    a.$watch("selectedNationality", function(b, c) {
        void 0 != a.user && q(b, c, a.user.nationality, function(b) {
            a.user.nationality =
                "-1" == b[0].value ? "" : b[0].value
        })
    }, !0);
    a.$watch("selectedBirthPlace", function(b, c) {
        void 0 != a.user && q(b, c, a.user.birthPlace, function(b) {
            a.user.birthPlace = "-1" == b[0].value ? "" : b[0].value
        })
    }, !0);
    a.$watch("selectedDocumentType", function(b, c) {
        void 0 == a.user || void 0 == a.user.document || s(b, c, a.user.document.type, function(b) {
            "-1" == b[0].value ? a.user.document.type = "" : (a.user.document.type = b[0].value, a.selectedBirthPlace = [], a.selectedDocumentIssueLocation = [])
        })
    }, !0);
    a.$watch("selectedDocumentIssueLocation", function(b,
        c) {
        void 0 == a.user || void 0 == a.user.document || s(b, c, a.user.document.issueLocation, function(b) {
            a.user.document.issueLocation = "-1" == b[0].value ? "" : b[0].value
        })
    }, !0);
    a.$watch("selectedDocumentIssueDateDay", function(b, c) {
        void 0 == a.user || void 0 == a.user.document || s(b, c, a.user.document.issueDateDay, function(b) {
            a.user.document.issueDateDay = "-1" == b[0].value ? "" : b[0].value
        })
    }, !0);
    a.$watch("selectedDocumentIssueDateMonth", function(b, c) {
        void 0 == a.user || void 0 == a.user.document || s(b, c, a.user.document.issueDateMonth,
            function(b) {
                "-1" == b[0].value ? a.user.document.issueDateMonth = "" : (a.user.document.issueDateMonth = b[0].value, y())
            })
    }, !0);
    a.$watch("selectedDocumentIssueDateYear", function(b, c) {
        void 0 == a.user || void 0 == a.user.document || s(b, c, a.user.document.issueDateYear, function(b) {
            "-1" == b[0].value ? a.user.document.issueDateYear = "" : (a.user.document.issueDateYear = b[0].value, y())
        })
    }, !0);
    a.$watch("selectedDocumentExpirationDateDay", function(b, c) {
        void 0 == a.user || void 0 == a.user.document || s(b, c, a.user.document.expirationDateDay,
            function(b) {
                a.user.document.expirationDateDay = "-1" == b[0].value ? "" : b[0].value
            })
    }, !0);
    a.$watch("selectedDocumentExpirationDateMonth", function(b, c) {
        void 0 == a.user || void 0 == a.user.document || s(b, c, a.user.document.expirationDateMonth, function(b) {
            "-1" == b[0].value ? a.user.document.expirationDateMonth = "" : (a.user.document.expirationDateMonth = b[0].value, z())
        })
    }, !0);
    a.$watch("selectedDocumentExpirationDateYear", function(b, c) {
        void 0 == a.user || void 0 == a.user.document || s(b, c, a.user.document.expirationDateYear, function(b) {
            "-1" ==
            b[0].value ? a.user.document.expirationDateYear = "" : (a.user.document.expirationDateYear = b[0].value, z())
        })
    }, !0);
    a.$watch("selectedState", function(b, c) {
        void 0 != a.user && q(b, c, a.user.state, function(b) {
            "-1" == b[0].value ? a.user.state = "" : (a.user.state = b[0].value, a.user.document.residentialDepartmentCode = a.user.state, n.one("spring/register/cityData/" + a.user.country + "/" + a.user.state).get().then(function(b) {
                if (0 < b.cities.length) {
                    a.residentialCities = [{
                        value: -1,
                        label: i18n("selectCity"),
                        selected: !0
                    }];
                    for (var d = 0; d <
                        b.cities.length; d++) a.residentialCities.push({
                        value: b.cities[d].label,
                        label: b.cities[d].value,
                        selected: !1
                    });
                    a.selectedCity = [];
                    b.city && a.selectedCity.push({
                        value: b.city.label,
                        label: b.city.value,
                        selected: !0
                    })
                }
                b.zipCode && (a.user.zipCode = b.zipCode);
                a.$emit("statesSetComplete")
            }, function(b) {
                console.log('Error with status code while getting city data for country "' + a.user.country + '" and department/state "' + a.user.state + '": ', b.status)
            }))
        })
    }, !0);
    a.$watch("selectedCity", function(b, c) {
        void 0 != a.user && q(b,
            c, a.user.city,
            function(b) {
                "-1" == b[0].value ? "" == a.user.zipCode : (a.user.city = b[0].value, a.user.document.residentialCityCode = a.user.city)
            })
    }, !0);
    a.$watch("selectedCurrency", function(b, c) {
        void 0 !== a.user && q(b, c, a.user.currency, function(b) {
            a.user.currency = b[0].value;
            if (a.bonusReachable) {
                b = 0;
                for (var c = a.user.currency, e = 0; e < a.bonusAmountMulti.entries.length; e++) {
                    var f = a.bonusAmountMulti.entries[e];
                    if (f.currency === c) {
                        b = f.value;
                        break
                    }
                }
                0 === b && (b = a.bonusAmountMulti.defaultValue, c = "EUR");
                switch (c) {
                    case "BRL":
                        b =
                            "R$" + b;
                        break;
                    case "PEN":
                        b = "S/" + b;
                        break;
                    case "USD":
                        b = "U$D " + b;
                        break;
                    case "COP":
                    case "CLP":
                    case "MXN":
                        b = "$" + b;
                        break;
                    default:
                        b += c
                }
                a.bonusAmountText = i18n("CO" === a.user.country ? "headWelcomeBonus" : "headCreateBonus").replace("{0}", b)
            }
        })
    }, !0);
    a.$watch("selectedMobileCountryCode", function(b, c) {
        void 0 != a.user && q(b, c, a.user.mobileCountryCode, function(b) {
            a.user.mobileCountryCode = b[0].value;
            "+55" == a.user.mobileCountryCode ? (a.brazilMobileSelected = !0, a.mobileNumberDivClass = "col-lg-6 col-md-6 col-sm-6 col-xs-6",
                a.mobileNumberSelectDivClass = "col-lg-3 col-md-3 col-sm-3 col-xs-3") : (a.brazilMobileSelected = !1, a.mobileNumberDivClass = "col-lg-8 col-md-8 col-sm-8 col-xs-8", a.mobileNumberSelectDivClass = "col-lg-4 col-md-4 col-sm-4 col-xs-4")
        })
    }, !0);
    a.$watch("selectedMobileAreaCode", function(b, c) {
        void 0 != a.user && q(b, c, a.user.mobileCountryCode, function(b) {
            a.user.mobileAreaCode = b[0].value
        })
    }, !0);
    a.$watch("selectedBirthdayDay", function(b, c) {
        void 0 != a.user && q(b, c, a.user.birthdayDay, function(b) {
            a.user.birthdayDay = "-1" ==
                b[0].value ? "" : b[0].value
        })
    }, !0);
    a.$watch("selectedBirthdayMonth", function(b, c) {
        void 0 != a.user && q(b, c, a.user.birthdayMonth, function(b) {
            "-1" == b[0].value ? a.user.birthdayMonth = "" : (a.user.birthdayMonth = b[0].value, x())
        })
    }, !0);
    a.$watch("selectedBirthdayYear", function(b, c) {
        void 0 != a.user && q(b, c, a.user.birthdayYear, function(b) {
            "-1" == b[0].value ? a.user.birthdayYear = "" : (a.user.birthdayYear = b[0].value, x())
        })
    }, !0);
    a.checkInvalidFields = function() {
        a.regForm.$invalid && (moment().isBefore(a.registerPossibleAt) ? (a.hasError = !0, a.globalErrorMessage = i18n("error.toFast")) : (a.hasError = !0, a.globalErrorMessage = i18n("error.standard"), A()))
    };
    a.register = function() {
        moment().isBefore(a.registerPossibleAt) ? (a.hasError = !0, a.globalErrorMessage = i18n("error.toFast")) : "" != a.emailConfirm ? (a.hasError = !0, a.globalErrorMessage = i18n("error.standard")) : a.regForm.$invalid ? a.globalErrorMessage = i18n("error.standard") : (o.showDelayLayer(), o.onRegisterFormSubmit(), n.one("spring/register/" + a.mode).post("user", a.user).then(function(b) {
            if (b.success) o.top.location.href =
                b.topLocationHref;
            else {
                a.hasError = !0;
                a.globalErrorMessage = b.errorMessage ? b.errorMessage : i18n("error.technicalError");
                A();
                for (var c = 0; c < b.details.length; c++) {
                    var d = b.details[c];
                    "firstName" == d.field && a.regForm.firstName.$setValidity("required", !1);
                    "lastName" == d.field && a.regForm.lastName.$setValidity("required", !1);
                    "company" == d.field && a.regForm.company.$setValidity("required", !1);
                    "website" == d.field && a.regForm.website.$setValidity("required", !1);
                    "birthday" == d.field && (a.regForm.birthdayDay.$setValidity("required", !1), a.regForm.birthdayMonth.$setValidity("required", !1), a.regForm.birthdayYear.$setValidity("required", !1));
                    if ("login" == d.field && a.regForm.login) {
                        var f = "pattern";
                        "" == a.user.login ? f = "required" : "loginunique" == d.type && (f = "loginunique");
                        a.regForm.login.$setValidity(f, !1)
                    }
                    "email" == d.field && (f = "pattern", "" == a.user.email ? f = "required" : "emailunique" == d.type && (f = "emailunique"), a.regForm.email.$setValidity(f, !1));
                    "password" == d.field && (f = "pattern", "" == a.user.password && (f = "required"), a.regForm.password.$setValidity(f, !1));
                    "country" == d.field && a.regForm.country.$setValidity("required", !1);
                    "currency" == d.field && a.regForm.currency.$setValidity("required", !1);
                    "street" == d.field && a.regForm.street.$setValidity("required", !1);
                    "zipCode" == d.field && a.regForm.zipCode.$setValidity("required", !1);
                    "city" == d.field && a.regForm.city.$setValidity("required", !1);
                    "phoneMobile" == d.field && ("" == a.user.mobileCountryCode && a.regForm.mobileCountryCode.$setValidity("required", !1), a.brazilMobileSelected && "" == a.user.mobileAreaCode && a.regForm.mobileAreaCode.$setValidity("required", !1), a.regForm.mobilePhone.$setValidity("required", !1));
                    "region" == d.field && a.regForm.state.$setValidity("required", !1);
                    "externalIdentifier" == d.field && a.regForm.taxNumber && a.regForm.taxNumber.$setValidity("required", !1);
                    "documentType" == d.field && a.regForm.documentType.$setValidity("required", !1);
                    "issueLocation" == d.field && a.regForm.documentIssueLocation.$setValidity("required", !1);
                    "nationality" == d.field && a.regForm.nationality.$setValidity("required", !1);
                    "birthCity" == d.field && a.regForm.birthPlace.$setValidity("required", !1);
                    "region" == d.field && a.regForm.state.$setValidity("required", !1);
                    "documentExpirationDateDay" == d.field && a.regForm.documentExpirationDateDay.$setValidity("required", !1);
                    "documentExpirationDateMonth" == d.field && a.regForm.documentExpirationDateMonth.$setValidity("required", !1);
                    "documentExpirationDateYear" == d.field && a.regForm.documentExpirationDateYear.$setValidity("required", !1);
                    "documentIssueDateDay" == d.field && a.regForm.documentIssueDateDay.$setValidity("required", !1);
                    "documentIssueDateMonth" == d.field &&
                        a.regForm.documentIssueDateMonth.$setValidity("required", !1);
                    "documentIssueDateYear" == d.field && a.regForm.documentIssueDateYear.$setValidity("required", !1);
                    "limitDaily" == d.field && a.regForm.limitDaily.$setValidity("inconsecutive", !1);
                    "limitWeekly" == d.field && a.regForm.limitWeekly.$setValidity("inconsecutive", !1);
                    "limitMonthly" == d.field && a.regForm.limitMonthly.$setValidity("inconsecutive", !1);
                    "bonusPromoCodeValue" === d.field && a.regForm.bonusPromoCodeValue.$setValidity("bonusPromoCodeValue", !1)
                }
                k(o.hideDelayLayer,
                    10)
            }
        }, function() {
            a.hasError = !0;
            a.globalErrorMessage = i18n("error.technicalError");
            o.hideDelayLayer()
        }))
    };
    var B = /^[^\d]{1,}$/;
    a.namePattern = {
        test: function(a) {
            return B.test(a)
        }
    };
    var C = /^[a-zA-Z_0-9\-\/]{5,25}$/;
    a.loginPattern = {
        test: function(b) {
            a.regForm.login.$setValidity("pattern", !0);
            return C.test(b)
        }
    };
    var D = /^([a-zA-Z0-9_\-])+(\.([a-zA-Z0-9_\-])+)*@((\[(((([0-1])?([0-9])?[0-9])|(2[0-4][0-9])|(2[0-5][0-5])))\.(((([0-1])?([0-9])?[0-9])|(2[0-4][0-9])|(2[0-5][0-5])))\.(((([0-1])?([0-9])?[0-9])|(2[0-4][0-9])|(2[0-5][0-5])))\.(((([0-1])?([0-9])?[0-9])|(2[0-4][0-9])|(2[0-5][0-5]))\]))|((([a-zA-Z0-9])+(([\-])+([a-zA-Z0-9])+)*\.)+([a-zA-Z])+(([\-])+([a-zA-Z0-9])+)*))$/;
    a.emailPattern = {
        test: function(b) {
            a.regForm.email.$setValidity("emailunique", !0);
            return D.test(b)
        }
    };
    var E = /^[A-Z]{2}$/,
        F = /^\d{2}$/;
    a.statePattern = {
        test: function(b) {
            return "CO" == a.user.country ? F.test(b) : E.test(b)
        }
    };
    var G = /^[A-Z]{2}$|^\d{5}\|\d{4}$/;
    a.birthPlacePattern = {
        test: function(a) {
            return G.test(a)
        }
    };
    var H = /^.{6,}$/,
        I = /^\d{6,11}$/;
    a.taxNumberPattern = {
        test: function(b) {
            nationalId = b.replace(/\s+/g, "");
            if ("BR" == a.user.country) {
                nationalId = nationalId.replace(/[^\d]+/g, "");
                if ("" == nationalId) return !1;
                b =
                    nationalId;
                if (11 != b.length || "00000000000" == b || "11111111111" == b || "22222222222" == b || "33333333333" == b || "44444444444" == b || "55555555555" == b || "66666666666" == b || "77777777777" == b || "88888888888" == b || "99999999999" == b) return !1;
                for (i = add = 0; 9 > i; i++) add += parseInt(b.charAt(i)) * (10 - i);
                rev = 11 - add % 11;
                if (10 == rev || 11 == rev) rev = 0;
                if (rev != parseInt(b.charAt(9))) return !1;
                for (i = add = 0; 10 > i; i++) add += parseInt(b.charAt(i)) * (11 - i);
                rev = 11 - add % 11;
                if (10 == rev || 11 == rev) rev = 0;
                if (rev != parseInt(b.charAt(10))) return !1
            } else return "CO" ==
                a.user.country ? I.test(nationalId) : H.test(b);
            return !0
        }
    };
    var J = /^.{8,}$/,
        K = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
    a.passwordPattern = {
        test: function(b) {
            return a.user && "CO" == a.user.country ? "reactivate" == a.mode || "complete" == a.mode ? !0 : K.test(b) : J.test(b)
        }
    };
    a.phoneMobilePattern = r.phoneMobilePattern(a);
    a.phoneMobileCountryCodePattern = r.phoneMobileCountryCodePattern();
    a.phoneMobileAreaCodePattern = r.phoneMobileAreaCodePattern();
    var L = /^.{1,}$/;
    a.streetPattern = {
        test: function(a) {
            return L.test(a)
        }
    };
    var M = /^.{1,}$/,
        N = /^\d{5}$/,
        O = /^\d{6}$/;
    a.zipCodePattern = {
        test: function(b) {
            var c = M;
            "DE" == a.user.country ? c = N : "CO" == a.user.country && (c = O);
            return c.test(b)
        }
    };
    var P = /^[^\d�]{1,}$/,
        Q = /^\d{5}\|\d{4}$/;
    a.cityPattern = {
        test: function(b) {
            return "CO" == a.user.country ? Q.test(b) : P.test(b)
        }
    };
    var R = /^\d{1}$/;
    a.documentTypePattern = {
        test: function(a) {
            return R.test(a)
        }
    };
    var S = /^[A-Z]{2}$|^\d{5}\|\d{4}$/;
    a.documentIssueLocationPattern = {
        test: function(a) {
            return S.test(a)
        }
    };
    var T = /^[A-Z]{2}$/;
    a.nationalityPattern = {
        test: function(a) {
            return T.test(a)
        }
    };
    a.generatePasswordAndFillFields = function() {
        var b = generateSecurePassword();
        a.inputType = "text";
        a.user.password = b
    };
    a.hidePassword = function() {
        "text" == a.inputType && "" == a.regForm.password.$viewValue && (a.inputType = "password")
    };
    a.tacClicked = function() {
        return a.tacAccepted ? "choice customCheckbox" : "choice customCheckbox invalid"
    };
    a.birthdayDayClass = "";
    a.birthdayMonthClass = "";
    a.birthdayYearClass = "";
    a.birthPlaceClass = "";
    a.countryClass = "";
    a.stateClass = "";
    a.cityClass = "";
    a.currencyClass = "";
    a.mobileCodeClass = "";
    a.mobileAreaCodeClass = "";
    a.documentTypeClass = "";
    a.documentIssueLocationClass = "";
    a.documentIssueDateDayClass = "";
    a.documentIssueDateMonthClass = "";
    a.documentIssueDateYearClass = "";
    a.documentExpirationDateDayClass = "";
    a.documentExpirationDateMonthClass = "";
    a.documentExpirationDateYearClass = "";
    a.nationalityClass = "";
    a.toggleBirthdayDayClass = function(b) {
        m(b, a.regForm.birthdayDay, "birthdayDayClass", a.user.birthdayDay)
    };
    a.toggleBirthdayMonthClass = function(b) {
        m(b, a.regForm.birthdayMonth, "birthdayMonthClass", a.user.birthdayMonth)
    };
    a.toggleBirthdayYearClass = function(b) {
        m(b, a.regForm.birthdayYear, "birthdayYearClass", a.user.birthdayYear)
    };
    a.toggleBirthPlaceClass = function(b) {
        m(b, a.regForm.birthPlace, "birthPlaceClass", a.user.birthPlace)
    };
    a.toggleCountryClass = function(b) {
        m(b, a.regForm.country, "countryClass", a.user.country)
    };
    a.toggleStateClass = function(b) {
        m(b, a.regForm.state, "stateClass", a.user.state)
    };
    a.toggleCityClass = function(b) {
        m(b, a.regForm.city, "cityClass", a.user.city)
    };
    a.toggleCurrencyClass = function(b) {
        m(b, a.regForm.currency,
            "currencyClass", a.user.currency)
    };
    a.toggleMobileCodeClass = function(b) {
        m(b, a.regForm.mobileCountryCode, "mobileCodeClass", a.user.mobileCountryCode)
    };
    a.toggleMobileAreaCodeClass = function(b) {
        m(b, a.regForm.mobileAreaCode, "mobileAreaCodeClass", a.user.mobileAreaCode)
    };
    a.toggleDocumentTypeClass = function(b) {
        m(b, a.regForm.documentType, "documentTypeClass", a.user.document.type)
    };
    a.toggleDocumentIssueLocationClass = function(b) {
        m(b, a.regForm.documentIssueLocation, "documentIssueLocationClass", a.user.document.issueLocation)
    };
    a.toggleDocumentIssueDateDayClass = function(b) {
        m(b, a.regForm.documentIssueDateDay, "documentIssueDateDayClass", a.user.document.issueDateDay)
    };
    a.toggleDocumentIssueDateMonthClass = function(b) {
        m(b, a.regForm.documentIssueDateMonth, "documentIssueDateMonthClass", a.user.document.issueDateMonth)
    };
    a.toggleDocumentIssueDateYearClass = function(b) {
        m(b, a.regForm.documentIssueDateYear, "documentIssueDateYearClass", a.user.document.issueDateYear)
    };
    a.toggleDocumentExpirationDateDayClass = function(b) {
        m(b, a.regForm.documentExpirationDateDay,
            "documentExpirationDateDayClass", a.user.document.expirationDateDay)
    };
    a.toggleDocumentExpirationDateMonthClass = function(b) {
        m(b, a.regForm.documentExpirationDateMonth, "documentExpirationDateMonthClass", a.user.document.expirationDateMonth)
    };
    a.toggleDocumentExpirationDateYearClass = function(b) {
        m(b, a.regForm.documentExpirationDateYear, "documentExpirationDateYearClass", a.user.document.expirationDateYear)
    };
    a.toggleNationalityClass = function(b) {
        m(b, a.regForm.nationality, "nationalityClass", a.user.nationality)
    };
    a.closeDropDowns = function() {
        a.birthdayDayClass = "";
        a.birthdayMonthClass = "";
        a.birthdayYearClass = "";
        a.birthPlaceClass = "";
        a.stateClass = "";
        a.cityClass = "";
        a.countryClass = "";
        a.currencyClass = "";
        a.mobileCodeClass = "";
        a.mobileAreaCodeClass = "";
        a.documentTypeClass = "";
        a.documentIssueLocationClass = "";
        a.documentIssueDateDayClass = "";
        a.documentIssueDateMonthClass = "";
        a.documentIssueDateYearClass = "";
        a.documentExpirationDateDayClass = "";
        a.documentExpirationDateMonthClass = "";
        a.documentExpirationDateYearClass = "";
        a.nationalityClass =
            ""
    };
    a.setFocusedField = function(a, c) {
        "true" != jQuery(a.target).attr("data-disabled") && n.one("spring/register/setFocused").post("field", c)
    };
    a.openLink = function(a) {
        o.top.location.href = a
    };
    a.checkMobilePromo = function() {
        a.user.mobilePromo = void 0 == a.regForm.mobilePhone.$viewValue || "" == a.regForm.mobilePhone.$viewValue || 0 == a.regForm.mobilePhone.$viewValue.length ? !1 : !0
    };
    a.firstNameNew = "new";
    a.setFirstNameBlur = function() {
        f(a.regForm.firstName, "firstNameNew", a.user.firstName)
    };
    a.middleNameNew = "new";
    a.setMiddleNameBlur =
        function() {
            f(a.regForm.middleName, "middleNameNew", a.user.middleName)
        };
    a.lastNameNew = "new";
    a.setLastNameBlur = function() {
        f(a.regForm.lastName, "lastNameNew", a.user.lastName)
    };
    a.lastName2New = "new";
    a.setLastName2Blur = function() {
        f(a.regForm.lastName2, "lastName2New", a.user.lastName2)
    };
    a.companyNew = "new";
    a.setCompanyBlur = function() {
        f(a.regForm.company, "companyNew", a.user.company)
    };
    a.websiteNew = "new";
    a.setWebsiteBlur = function() {
        f(a.regForm.website, "websiteNew", a.user.website)
    };
    a.loginNew = "new";
    a.setLoginBlur =
        function() {
            f(a.regForm.login, "loginNew", a.user.login)
        };
    a.emailNew = "new";
    a.setEmailBlur = function() {
        f(a.regForm.email, "emailNew", a.user.email)
    };
    a.taxNumberNew = "new";
    a.setTaxNumberBlur = function() {
        f(a.regForm.taxNumber, "taxNumberNew", a.user.taxNumber)
    };
    a.setPasswordBlur = function() {
        f(a.regForm.password, null, a.user.password)
    };
    a.streetNew = "new";
    a.setStreetBlur = function() {
        f(a.regForm.street, "streetNew", a.user.street)
    };
    a.zipCodeNew = "new";
    a.setZipCodeBlur = function() {
        f(a.regForm.zipCode, "zipCodeNew", a.user.zipCode)
    };
    a.cityNew = "new";
    a.setCityBlur = function() {
        f(a.regForm.city, "cityNew", a.user.city)
    };
    a.mobileNumberNew = "new";
    a.setMobileNumberBlur = function() {
        f(a.regForm.mobilePhone, "mobileNumberNew", a.user.mobileNumber)
    };
    a.getGlobelError = function() {
        return g.trustAsHtml(a.globalErrorMessage)
    };
    a.getAddictionText = function() {
        return a.gamblingText
    };
    a.toggleBonusCode = function() {
        !1 === a.user.bonusPromoCode.available && a.regForm.bonusPromoCodeValue.$setValidity("bonusPromoCodeValue", !0)
    }
}]);
registerApp.directive("ngLoginunique", ["Restangular", function(a) {
    return {
        require: "ngModel",
        link: function(g, k, j, c) {
            k.on("blur", function() {
                g.$apply(function() {
                    var j = k.val();
                    !c.$error.required && !c.$error.pattern ? a.one("spring/register/loginExists", j).get().then(function(a) {
                        c.$setValidity("loginunique", a.valid)
                    }) : c.$setValidity("loginunique", !0)
                })
            })
        }
    }
}]);
registerApp.directive("ngExternalidentifierunique", ["Restangular", function(a) {
    return {
        require: "ngModel",
        link: function(g, k, j, c) {
            k.on("blur", function() {
                g.$apply(function() {
                    k.val();
                    !c.$error.required && !c.$error.pattern ? a.one("spring/register/externalIdentifierExists").post("user", g.user).then(function(a) {
                        c.$setValidity("externalidentifierunique", a.valid)
                    }) : c.$setValidity("externalidentifierunique", !0)
                })
            })
        }
    }
}]);
registerApp.directive("ngEmailunique", ["Restangular", function(a) {
    return {
        require: "ngModel",
        link: function(g, k, j, c) {
            k.on("blur", function() {
                g.$apply(function() {
                    k.val();
                    !c.$error.required && !c.$error.pattern ? a.one("spring/register/emailExists").post("user", g.user).then(function(a) {
                        c.$setValidity("emailunique", a.valid)
                    }) : c.$setValidity("emailunique", !0)
                })
            })
        }
    }
}]);
registerApp.directive("ngLimit", ["Restangular", function(a) {
    return {
        require: "ngModel",
        link: function(g, k, j, c) {
            k.on("blur", function() {
                g.$apply(function() {
                    k.val();
                    a.one("spring/register/" + c.$name).post("user", g.user).then(function(a) {
                        c.$setValidity("invalid", a.valid)
                    })
                })
            })
        }
    }
}]);
registerApp.directive("ngLimitConsecutive", function() {
    return {
        require: "ngModel",
        link: function(a, g) {
            g.on("blur", function() {
                a.$apply(function() {
                    var g = parseFloat(a.regForm.limitDaily.$modelValue.replace(/,/g, "")),
                        j = parseFloat(a.regForm.limitWeekly.$modelValue.replace(/,/g, "")),
                        c = parseFloat(a.regForm.limitMonthly.$modelValue.replace(/,/g, "")),
                        g = g < j && j < c;
                    a.regForm.limitDaily.$setValidity("inconsecutive", g);
                    a.regForm.limitWeekly.$setValidity("inconsecutive", g);
                    a.regForm.limitMonthly.$setValidity("inconsecutive",
                        g)
                })
            })
        }
    }
});
registerApp.directive("ngBonuspromocode", ["Restangular", function(a) {
    return {
        require: "ngModel",
        link: function(g, k, j, c) {
            k.on("blur", function() {
                g.$apply(function() {
                    k.val();
                    !c.$error.required && !c.$error.pattern ? a.one("spring/register/bonusPromoCode").post("user", g.user).then(function(a) {
                        c.$setValidity("bonusPromoCodeValue", a.valid)
                    }) : c.$setValidity("bonusPromoCodeValue", !0)
                })
            })
        }
    }
}]);
registerApp.directive("ngRegisterInputDate", function() {
    return {
        require: "ngModel",
        link: function(a, g, k) {
            g.on("focus", function() {
                g.val("")
            });
            g.on("keypress", function(a) {
                var c = k.maxLength;
                c && g.val().length == c ? a.preventDefault() : void 0 !== a.keyCode ? (c = a.keyCode, 48 < c && 57 < c && a.preventDefault()) : a.preventDefault()
            });
            g.on("keyup", function(a) {
                var c = k.maxLength;
                a = a.key;
                if (!("Shift" == a || "Tab" == a)) {
                    a = g.val();
                    var t = !isNaN(a);
                    a.length == c && t && parseInt(a) >= k.min && parseInt(a) <= k.max && k.nextFieldName && jQuery("#" + k.nextFieldName).focus()
                }
            })
        }
    }
});