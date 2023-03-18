<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:login.php"); exit(); }
  ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="referrer" content="no-referrer">
    <title><? if(userayar('site_adi')!=''){ ?><?=userayar('site_adi');?><? } else { ?><?=$site_adi;?><? } ?> | <?=getTranslation('sporbahis')?></title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/fa/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/owl2/owl.carousel.min.css" />
    <link rel="stylesheet" href="/assets/linear/style.css">
    <link href="/assets/range/css/bootstrap-slider.css" rel="stylesheet" media="screen">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.css" rel="stylesheet" media="screen">
    <link href="/assets/plugins/toastr.min.css" rel="stylesheet" media="screen" />
    <link href="/mb/assets/css/style.css" rel="stylesheet" media="screen">
    <link href="/mb/assets/css/normalize.css" rel="stylesheet" media="screen">
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/assets/img/totobo.png">
    <link rel="icon" type="image/png" href="/mb/assets/img/apple-touch-icon-pict.png">
</head>

<body style="background-image: url('../img/main_bg.jpg');" class="mobBody">

    <div class="mobHeader">
        <div class="position-relative">
            <div class="row no-gutters">
                <div class="col d-flex align-items-center justify-content-center">
                    <div class="mobLogo">
                        <a href="/mb/home" class="pt-0"><img src="/mb/img/logo2.png?id2" width="133"></a>




                    </div>

                </div>

                <div class="col-auto">
                    <div class="mobRight">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="_Casino">
        <div class="mobWrapper">
            <script>
                var iscasino = true;
            </script>
            <div class="casinoGameDetail">
                <div class="owl-carousel _1itemSlide mb-lg-3" id="sliderHome">
                    <div class="item ">
                        <img src="/img/slider/casino/casino2-1.jpg">
                    </div>
                    <div class="item ">
                        <img src="/img/slider/casino/casino1-1.jpg">
                    </div>

                </div>
                <div class="container">
                    <div class="mobFilterPanel d-flex flex-wrap overflow-hidden">
                        
                        <div class="w-100 caroList mb-3">
                            <div class="owl-carousel listCaro text-center csScroll" id="CasinoName">
                                <div class="item "><a href="/mb/home">Ana Sayfa</a></div>

                    <div class="item "><a href="/mb/slots">Slot</a></div>
                    <div class="item "><a href="/mb/novomatic">NOVOMATIC</a></div>
                    <div class="item "><a href="/mb/egt">EGT</a></div>
                    <div class="item "><a href="/mb/amatic">AMATIC</a></div>
                    <div class="item "><a href="/mb/pragmatic">PRAGMATIC</a></div>
                    <div class="item "><a href="/mb/playtech">PLAYTECH</a></div>
                    <div class="item "><a href="/mb/gamomat">GAMOMAT</a></div>
                    <div class="item "><a href="/mb/netent"> NETENT</a></div>
                    <div class="item "><a href="/mb/casinotechnology">CT-GAMES</a></div>
                    <div class="item "><a href="/mb/skywind">SKYWIND</a></div>
                    <div class="item "><a href="/mb/kagaming">KA-GAMING</a></div>
                    <div class="item "><a href="/mb/isoftbet">ISOFTBET</a></div>
                    <div class="item "><a href="/mb/aristocrat">ARISTOCRAT</a></div>
                    <div class="item "><a href="/mb/wazdan">WAZDAN</a></div>

                            </div>
                        </div>
                    </div>
                    <div class="caroBox csnGameList mb-4 ">
                        <div class="h6">ARISTOCRAT</div>
                        <div class="row">
                             
                              
                                <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                                <a href="/Casino/Game?c=PRPLAY-vs20fruitsw"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Aristocrat/BigBenAT.jpg"></a>
                            </div>
                             <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                                <a href="/Casino/Game?c=SMARTSOFT-Cappadocia_GamesLobby"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Aristocrat/BigRedAT.jpg"></a>
                            </div>
                             <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                                <a href="/Casino/Game?c=SPRIBE-aviator"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Aristocrat/BuffaloAT.jpg"></a>
                            </div>
                             <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                                <a href="/Casino/Game?c=PRPLAY-vs20godiva"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Aristocrat/ChoySunDoaAT.jpg"></a>
                            </div>
                            <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                                <a href="/Casino/Game?c=211"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Aristocrat/DolphinsTreasureAT.jpg"></a>
                            </div>
                             <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                                <a href="/Casino/Game?c=BM-6087befc9e1ee6001afdf220"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Aristocrat/Dragons5AT.jpg"></a>
                            </div>
                             <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                                <a href="/Casino/Game?c=WZ-MagicHot4"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Aristocrat/Dragons50AT.jpg"></a>
                            </div>
                             <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                                <a href="/Casino/Game?c=FILS-144"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Aristocrat/FlameOfOlympusAT.jpg"></a>
                            </div>
                             <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                                <a href="/Casino/Game?c=HB-AllAmericanPoker1Hand"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Aristocrat/JaguarMistAT.jpg"></a>
                            </div>
                             <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Aristocrat/Lions50AT.jpg"></a>
                            </div>
                             <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Aristocrat/Lucky88AT.jpg"></a>
                            </div>
                             <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Aristocrat/LuckyCountAT.jpg"></a>
                            </div>
                             <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Aristocrat/MissKittyAT.jpg"></a>
                            </div>
                               <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                                <a href="/Casino/Game?c=SPRIBE-aviator"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Aristocrat/MoonFestivalAT.jpg"></a>
                            </div>
                             <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                                <a href="/Casino/Game?c=PRPLAY-vs20godiva"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Aristocrat/MoonFestivalAT.jpg"></a>
                            </div>
                             <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                                <a href="/Casino/Game?c=211"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Aristocrat/PelicanPeteAT.jpg"></a>
                            </div>
                             <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                                <a href="/Casino/Game?c=BM-6087befc9e1ee6001afdf220"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Aristocrat/PompeiiAT.jpg"></a>
                            </div>
                             <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                                <a href="/Casino/Game?c=WZ-MagicHot4"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Aristocrat/QueenOfTheNileIIAT.jpg"></a>
                            </div>
                             <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                                <a href="/Casino/Game?c=FILS-144"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Aristocrat/SilkRoadAT.jpg"></a>
                            </div>
                            <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                                <a href="/Casino/Game?c=HB-AllAmericanPoker1Hand"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Aristocrat/SunAndMoonAT.jpg"></a>
                            </div>
                             <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Aristocrat/TikiTorchAT.jpg"></a>
                            </div>
                             <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Aristocrat/WerewolfWildAT.jpg"></a>
                            </div>
                             <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Aristocrat/WildSplashAT.jpg"></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            

            <script>
                iscasino = true;
            </script>



            <div class="clr mb-1"></div>


            <div class="mobFooter">
                <hr />
                <p class="text-center">
                    <small>
                        Uyarı: Oyun oynamak ve bahis yapmak eğlenceli aynı zamanda kazançlı olabilir. Fakat her zaman kazanamayabilirsiniz. Lütfen bilinçli oynayınız.<br> Üyelik yaşı 18 ve üzeridir.
                    </small>
                </p>

                <div class="bottomMenu">
                    <div class="row no-gutters">
                        <div class="col bm1"><a href="/mb/home" style="text-decoration: none"><img src="/mb/img/tabbar/home.png"> <b>Ana Sayfa</b></a></div>
                        
                        
                        <div class="col bm8"><a href="/mb/live"style="text-decoration: none"><img src="/mb/img/tabbar/live.png"> <b>Canlı </b></a></div>
                        <div class="col bm4"><a href="/mb/livecasino" style="text-decoration: none"><img src="/mb/img/tabbar/casino.png"> <b>Casino</b></a></div>
                        
                        <div class="col bm4"><a href="/mb/slots" style="text-decoration: none" ><img src="/mb/img/tabbar/casino.png"> <b>Slots</b></a></div>
                        
                        <div class="col bm6"><a href="/mb/ticket"style="text-decoration: none"><img src="/mb/img/tabbar/tickets.png"> <b>Bahislerim</b>                            </a></div>
                        <div class="col bm5"><a href="/mb/account"style="text-decoration: none"><img src="/mb/img/tabbar/account.png"> <b>Hesabım</b><u><?=$bakiyesini_ver;?></u></a></div>
                        
                        <div class="col bm7 d-none"><a class="getKuponWindow"><img src="/mb/img/tabbar/editor.png"> <b>Bahis Kuponu</b> <u id="bCountBottom" style="display:none;"></u></a></div>
                        <div class="col bm2"><a href="/mb/editor"style="text-decoration: none"><img src="/mb/img/tabbar/editor.png"> <b>Bahis Kuponu</b></a></div>
                    </div>
                </div>
   
                </div>

            </div>

   

    <span class="position-fixed" id="back-to-top">
        <i class="fa fa-chevron-up"></i>
    </span>
    <input type="hidden" id="locker" autocomplete="off" value="0" />



    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="/assets/bootstrap/js/popper.min.js"></script>
    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>

    
    <script src="/mb/assets/owl2/owl.carousel.min.js"></script>
    <script src="/mb/assets/range/bootstrap-slider.js"></script>
    <script src='/mb/assets/js/jquery.fixer.js'></script>
    <script src="/mb/assets/plugins/toastr.min.js"></script>
    <script src="/mb/assets/js/jquery.lazyload.min.js"></script>
    <script src="/mb/assets/js/jquery.lazy.min.js"></script>

    <script src="/mb/assets/hammer.js"></script>
    <script src="/mb/assets/jquery.hammer.js"></script>
    <script src="/mb/assets/customMobile.js"></script>


    <script>
        var localizedData = {
            PasswordMatch: "&#x15E;ifreniz e&#x15F;le&#x15F;ti",
            PasswordWrong: "Şifreler eşleşmiyor",
            GetCouponHtmlText: '<p class="emptext text-center">Hen&#xFC;z bir bahis se&#xE7;ilmedi. Bahisleri se&#xE7;mek i&#xE7;in ilgili oran &#xFC;st&#xFC;ne t&#x131;klay&#x131;n&#x131;z.</p>',
            GetCouponUpdateError: '<span style="color:#f74835;padding-left: 2px;">Ula&#x15F;&#x131;lam&#x131;yor</span>',
            OpenBet: "A&#xE7;&#x131;k",
            WinBet: "Kazand&#x131;",
            LoseBet: "Kaybetti",
            SoldBet: "Sat&#x131;ld&#x131;",
            CancelBet: "&#x130;ptal Edildi",
            RefundBet: "Geri &#xD6;dendi",
            InvalidBet: "Ge&#xE7;ersiz",
            RejBet: "Reddedildi",
            Bets: "Bahisler",
            MaxCoef: "Maks. Oran",
            Pay: "&#xD6;dendi",
            MaxWin: "Maks. Kazan&#xE7;",
            BetCount: "Bahis Say&#x131;s&#x131;",
            Single: "Tekli",
            System: "Sistem",
            SingleBet: "Tekli Bahis",
            Combine: "Kombin",
            _CouponZero: "Bu bahis kuponunun yat&#x131;r&#x131;labilen gerekli toplam paras&#x131; minimum 1,25 TL olmal&#x131;d&#x131;r.",
            _lowBalance: "Maalesef bakiyeniz bu paray&#x131; yat&#x131;rmaya yetmiyor",
            _MenuMes: "Daha az goster",
            _Today: "Bug&#xFC;n",
            _Hourr: "saat",
            _Hour: "Saat",
            _Day: "g&#xFC;n",
            _LIVE: "LIVE",
            _TimeRemaining1: "Toplam + / -",
            _TotalTop: "Toplam Alt/&#xDC;st",
            _NormalTime: "Normal S&#xFC;rede",
            _OtherGroup: "di&#x11F;er grup",
            _YourCouponSuccessfully: "Kuponunuz ba&#x15F;ar&#x131;yla oynanm&#x131;&#x15F;t&#x131;r !",
            _SistemBet: "Bir sistem bahisi ile yapm&#x131;&#x15F; oldu&#x11F;unuz b&#xFC;t&#xFC;n bahisleriniz tutmasa bile kazanabilirsiniz. Bir sistem bahisi birka&#xE7; tane bahisin kombine edilmesinden olu&#x15F;ur. Kombinasyon imkanlar&#x131; bahis kuponunda g&#xF6;r&#xFC;nt&#xFC;lenmektedir. Bir sistem bahsi birka&#xE7; kombinasyon bahisinden olu&#x15F;ur. Se&#xE7;ilen kombinasyonlar&#x131;n say&#x131;s&#x131;na ba&#x11F;l&#x131; olarak, toplam bahise yat&#x131;r&#x131;lmas&#x131; gerekli miktar ve maksimum geri &#xF6;deme hesaplanmaktad&#x131;r.",
            _Guess: "Tahmin",
            _LiCombos: "li Kombineler",
            _LiCombos1: "li Kombine",
            _Bet: "Bahis",
            _Cancel: "&#x130;ptal",
            Couponwillcance: "Kupon iptal Edilecektir",
            CouponHasCancel: "Kupon iptal Edilmi&#x15F;tir.",
            CouponCantcanceled: "Kupon iptal edilemez",
            _AllMatchesLoaded: "B&#xFC;t&#xFC;n Kar&#x15F;&#x131;la&#x15F;malar Y&#xFC;klendi",
            _Desk: "Banko",
            _Combinations: "Kombinasyonlar&#x131;",
            _YourCouponCreated: "Kuponunuz ba&#x15F;ar&#x131; ile olu&#x15F;turulmu&#x15F;tur",
            _ThereIsAUserWithThisName: "Bu isimde bir kullan&#x131;c&#x131; bulunmaktad&#x131;r",
            _UserNameMustBeMinimum4Characters: "Kullan&#x131;c&#x131; Ismi minimum 4 Karakter olmal&#x131;d&#x131;r",
            _IfUouDoThis: "E&#x11F;er bu i&#x15F;lemi yaparsan&#x131;z kullan&#x131;c&#x131;n&#x131;n ba&#x11F;l&#x131; oldu&#x11F;u b&#xFC;t&#xFC;n hesaplar Kapat&#x131;lacakt&#x131;r.",
            _IfUouDoThis1: "E&#x11F;er bu i&#x15F;lemi yaparsan&#x131;z kullan&#x131;c&#x131;n&#x131;n ba&#x11F;l&#x131; oldu&#x11F;u b&#xFC;t&#xFC;n hesaplar A&#xE7;&#x131;lacakt&#x131;r.",
            _Yep: "Evet",
            _No: "Hay&#x131;r",
            _PleaseSelectUser: "L&#xFC;tfen kullanici secin ",
            _All: "T&#xFC;m&#xFC;",
            _TheTermYouAreLooking: "Arad&#x131;&#x11F;&#x131;n&#x131;z terim en az 3 karakter i&#xE7;ermelidir.",
            _Score: "Skor",
            _Live1: "live",
            _SistemBet: "Bir sistem bahisi ile yapm&#x131;&#x15F; oldu&#x11F;unuz b&#xFC;t&#xFC;n bahisleriniz tutmasa bile kazanabilirsiniz. Bir sistem bahisi birka&#xE7; tane bahisin kombine edilmesinden olu&#x15F;ur. Kombinasyon imkanlar&#x131; bahis kuponunda g&#xF6;r&#xFC;nt&#xFC;lenmektedir. Bir sistem bahsi birka&#xE7; kombinasyon bahisinden olu&#x15F;ur. Se&#xE7;ilen kombinasyonlar&#x131;n say&#x131;s&#x131;na ba&#x11F;l&#x131; olarak, toplam bahise yat&#x131;r&#x131;lmas&#x131; gerekli miktar ve maksimum geri &#xF6;deme hesaplanmaktad&#x131;r.",
            _TheGameDoesNot: "Oyun detay g&#xF6;sterimini desteklemiyor.",
            _halfLive: "Devre",
            _langSec: "tr",
            _currency: "TRY",
            _currencySym: "&#x20BA;",
            _UnauthorizedUser: "Yetkisiz Kullanıcı",
            _UserPassive: "Kullanıcı Pasif",
            _UserNameOrPassword: "Kullanıcı Adı veya Şifre Hatalı",
            _TransactionCompleted: "&#x130;&#x15F;lem Tamamland&#x131;",
            _UserNotFoundUnauthorizedTransaction: "Kullan&#x131;c&#x131; Bulunamad&#x131;. (Yetkisiz i&#x15F;lem)",
            _AddBalanceSuccessful: "Bakiye Ekleme i&#x15F;lemi Ba&#x15F;ar&#x131;l&#x131;",
            _BalanceExtractionSuccessful: "Bakiye &#xC7;&#x131;karma i&#x15F;lemi Ba&#x15F;ar&#x131;l&#x131;",
            _EnterCurrentBalance: "Ge&#xE7;erli bakiye giriniz",
            _ChildUserError: "Alt Kullan&#x131;c&#x131; Hatas&#x131;",
            _InsufficientBalance: "Bakiye Yetersiz",
            _SportsBalanceInsufficient: "Spor Bakiyesi Yetersiz",
            _CasinoBalanceInsufficient: "Casino Bakiyesi Yetersiz",
            _RegisteredUserName: "Kullan&#x131;c&#x131; Ad&#x131; Kay&#x131;tl&#x131;",
            _EMinCouponLimit: "Bu bahis kuponunun yat&#x131;r&#x131;labilen gerekli miktar minimum {0}  {1} olmal&#x131;d&#x131;r.",
            _EMaxCouponLimit: "Bu bahis kuponunun yat&#x131;r&#x131;labilen gerekli Maximum miktar {0} {1} olmal&#x131;d&#x131;r.",
            _EMinOddsLimit: "Bu bahis kuponunun yat&#x131;r&#x131;labilen gerekli toplam minimum  Oran {0} olmal&#x131;d&#x131;r.",
            _EMaxOddsLimit: "Bu bahis kuponunun yat&#x131;r&#x131;labilen gerekli Maximum Oran {0} olmal&#x131;d&#x131;r.",
            _EMaxProfit: "Bu bahis kuponunun yat&#x131;r&#x131;labilen gerekli Maximum Kazan&#xE7; {0}  {1} olmal&#x131;d&#x131;r.",
            AreYouSure: "Emin misiniz?",
            YourTransactionIsInProgressPleaseWait: "İşleminiz yapılıyor lütfen bekleyiniz",
            AreYouSureYouWantToReset: "Müşterinin şifresini sıfırlamak istediğinizden emin misiniz?",
            AsUpdated: " olarak güncellenmiştir.",
            Deactivate: "Pasifleştir",
            UserDisabled: "Kullanıcı Pasifleştirildi",
            Activate: "Aktifleştir",
            UserActivated: "Kullanıcı Aktifleştirildi",
            HowMuchLimitDoYouWantToIncrease: "Ne kadarlık limit arttırmak istiyorsunuz?",
            AreYouSureYouWantTo: "tutarında limit arttırmak istediğinizden emin misiniz?",
            PleaseEnterAValidValue: "Lütfen geçerli bir değer giriniz",
            HowMuchLimitDoYouWantToLower: "Ne kadarlık limit düşürmek istiyorsunuz?",
            AreYouSureYouWantToReduce: "tutarında limit düşürmek istediğinizden emin misiniz?",
            _MBSFootballError: "Futbol MBS Limitiniz {0}",
            _MBSBasketballError: "Basketboll MBS Limitiniz {0}",
            _MBSVolleybalError: "Voleybol MBS Limitiniz {0}",
            _MBSTennisError: "Tenis MBS Limitiniz {0}",
            _MBSHentbolError: "Hentbol MBS Limitiniz {0}",
            _MBSTTenisMBSError: "Masa Tenisi MBS Limitiniz {0}",




            //DataTable localize,

            _OnPage: "Sayfada",
            _Show: "Göster",
            _Record: "Kayıt",
            _ShowingBetween: "Aras&#x131; G&#xF6;steriliyor",
            _Search: "Ara",
            _And: "ve",
            _NoRecord: "Kay&#x131;t Yok",
            _Total: "Toplam",
            _RecordFiltered: "Kay&#x131;t Filtrelendi",
            _NoMatchingRecordFound: "E&#x15F;le&#x15F;en Kay&#x131;t Bulunamad&#x131;",
            _Excel: "Excel",
            _Print: "Yazdir",
            _ShowAll: "Tümünü Göster",
            _DataTablaLocalize: "Turkish.json"
        }
    </script>



    
</body>

</html>