
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
    <title>Totobo</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="/mb/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/mb/assets/fa/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/mb/assets/owl2/owl.carousel.min.css" />
    <link rel="stylesheet" href="/mb/assets/linear/style.css">
    <link href="/mb/assets/range/css/bootstrap-slider.css" rel="stylesheet" media="screen">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.css" rel="stylesheet" media="screen">
    <link href="/mb/assets/plugins/toastr.min.css" rel="stylesheet" media="screen" />
    <link href="/mb/assets/css/style.css" rel="stylesheet" media="screen">
    <link href="/mb/assets/css/normalize.css" rel="stylesheet" media="screen">
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/mb/assets/img/apple-touch-icon-pict.png">
    <link rel="icon" href="/mb/assets/img/apple-touch-icon-pict.png">

</head>

<body class="mobBody">

    <div class="mobHeader">
        <div class="position-relative">
            <div class="row no-gutters">
                <div class="col d-flex align-items-center justify-content-center">
                    <div class="mobLogo">
                        <a href="/mb" class="pt-0"><img src="/img/logo2.png?id2" width="100"></a>




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
                var iscasino = false;
            </script>
            <div class="casinoBox">
                <div class="owl-carousel _1itemSlide mb-lg-3" id="sliderHome">
                    <div class="item">
                <img src="/img/slider/casino/slider.jpeg">
            </div>
            
             <div class="item">
                <img src="/img/slider/casino/slider1.jpeg">
            </div>
            
            <div class="item">
                <img src="/img/slider/casino/slider3.jpeg">
            </div>
            <div class="item">
                <img src="/img/slider/casino/slider4.jpeg">
            </div>
            <div class="item">
                <img src="/img/slider/casino/slider5.jpeg">
            </div>

        </div>

                <div class="container">

                    <div class="mobFilterPanel d-flex flex-wrap overflow-hidden">
                        <div class="mobSearch">
                            <button><i class="btn btn-danger fas fa-search"></i><span>Ara</span></button>
                        </div>
                        <form action="/Casino/SearchCasino" method="get" class="position-absolute" id="mobile-search">
                            <button class="btn btn-danger search-button"><i class="fas fa-search"></i></button>
                            <input type="text" name="k" value="" placeholder="Casino Ara" />
                            <button class="btn btn-secondary close-button"><i class="fas fa-times"></i></button>
                        </form>
                        <div class="w-100 caroList mb-3">
                            <div class="owl-carousel listCaro text-center csScroll" id="CasinoName">
                                <div class="item"><a href="/Casino">Ana Sayfa</a></div>

                                <div class="item"><a href="/Casino/Category?c=Slot">Slot</a></div>
                                <div class="item"><a href="/Casino/Category?c=blackjack">Blackjack</a></div>
                                <div class="item"><a href="/Casino/Category?c=Baccarat">Baccarat</a></div>
                                <div class="item"><a href="/Casino/Category?c=TABLE_GAME">Masa Oyunlar&#x131;</a></div>
                                <div class="item"><a href="/Casino/Category?c=Keno">Keno</a></div>
                                <div class="item"><a href="/Casino/Category?c=TABLE_ROULETTE_EUROPEAN">Rulet Avrupa</a></div>
                                <div class="item"><a href="/Casino/Category?c=3D Games">3D Oyunlar</a></div>
                                <div class="item"><a href="/Casino/Category?c=SCRACH_CARDS"> Kaz&#x131; Kazan</a></div>
                                <div class="item"><a href="/Casino/Category?c=TABLE_ROULETTE_AMERICAN">Rulet Amerikan</a></div>
                                <div class="item"><a href="/Casino/Category?c=Poker">Poker</a></div>
                                <div class="item"><a href="/Casino/Category?c=Book Of">Book Of</a></div>

                            </div>
                        </div>
                    </div>
                    <span class="open-mobile-categories">Sa&#x11F;lay&#x131;c&#x131;lar</span>
                    <a href="/Casino/FavoriteList?IsLive=false" class="d-flex align-items-center justify-content-center mobile-favourites">
            <i class="fa fa-star"></i>
            Favoriler
        </a>
                    <div class="caroBox mb-4">
                        <div class="h6">En &#xC7;ok Oynananlar </div>
                        <div class="owl-carousel rowCaro">
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('PRPLAY-vs20fruitsw','true')"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/pragmaticplay_PRPLAY-vs20fruitsw.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('SMARTSOFT-Cappadocia_GamesLobby','false')"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/smartsoft_SMARTSOFT-Cappadocia_GamesLobby.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('SPRIBE-aviator','false')"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/spribe_SPRIBE-aviator.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('PLAYSON-wild_burning_wins_5_mob','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/playson_PLAYSON-wild_burning_wins_5_mob.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('BM-58985095bf53460009000001','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/Booming_BM-58985095bf53460009000001.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('PLAYSON-3_fruits_win_10','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/playson_PLAYSON-3_fruits_win_10.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('3073','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/egt_3073_Zodiac_Wheel.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('BELATRA-night_racing','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/belatra_BELATRA-night_racing.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('VIBRAGAMING-PACHINKO2P90','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vibragaming_VIBRAGAMING-PACHINKO2P90.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('1652','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/egt_1652_Flaming_Hot.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('BETSOFT-402','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/betsoft_BETSOFT-402.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('CT-1130','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/casinotechgaming_CT-1130.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('3067','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/amatic_3067_Diamonds_on_Fire.jpg"></a>
                            </div>

                        </div>
                    </div>
                    <div class="caroBox mb-4">
                        <div class="h6">Yeni Oyunlar</div>
                        <div class="owl-carousel rowCaro">
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('PRPLAY-vs5super7','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/pragmaticplay_PRPLAY-vs5super7.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('PRPLAY-vs40wanderw','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/pragmaticplay_PRPLAY-vs40wanderw.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('PRPLAY-vs4096magician','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/pragmaticplay_PRPLAY-vs4096magician.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('PRPLAY-vs243fortseren','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/pragmaticplay_PRPLAY-vs243fortseren.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('PRPLAY-vs243dancingpar','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/pragmaticplay_PRPLAY-vs243dancingpar.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('PRPLAY-vs10bookoftut','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/pragmaticplay_PRPLAY-vs10bookoftut.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('7MOJOS-wb','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/7mojos_7MOJOS-wb.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('7MOJOS-uch','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/7mojos_7MOJOS-uch.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('7MOJOS-ua','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/7mojos_7MOJOS-ua.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('7MOJOS-rw','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/7mojos_7MOJOS-rw.jpg"></a>
                            </div>

                        </div>
                    </div>
                    <div class="caroBox mb-4">
                        <div class="h6">Slotlar </div>
                        <div class="owl-carousel rowCaro">
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('HB-SGCoyoteCrash','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/habanero_HB-SGCoyoteCrash.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('CG-1087','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/conceptgaming_CG-1087.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('BM-5c3f2c0897fe0e00116fe583','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/Booming_BM-5c3f2c0897fe0e00116fe583.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('KA-Leprechauns','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/kagaming_KA-Leprechauns.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('vikings','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/wearecasino_vikings.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('PLAYSON-diamond_fort_mob','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/playson_PLAYSON-diamond_fort_mob.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('NETENT-turnyourfortune_not_mobile_sw','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/netent_NETENT-turnyourfortune_not_mobile_sw.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('SMARTSOFT-Bank_Slots','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/smartsoft_SMARTSOFT-Bank_Slots.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('KA-Mushrooms','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/kagaming_KA-Mushrooms.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('FILS-16','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/fils_FILS-16.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('BELATRA-lt_shot','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/belatra_BELATRA-lt_shot.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('JUSTPLAY-1003','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/just_play_JUSTPLAY-1003.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('NETENT-sweetyhoneyfruity_not_mobile_sw','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/netent_NETENT-sweetyhoneyfruity_not_mobile_sw.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('FAZI-FluoHot5','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/fazi_FAZI-FluoHot5.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('PRPLAY-vs20wildpix','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/pragmaticplay_PRPLAY-vs20wildpix.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('ENDORPHINA-endorphina_Retromania@ENDORPHINA','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/endorphina_ENDORPHINA-endorphina_Retromania@ENDORPHINA.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('HB-TensorBetter100Hand','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/habanero_HB-TensorBetter100Hand.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('LEGA-AVECAESAR8R4','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/legaplay_LEGA-AVECAESAR8R4.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('FILS-75','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/fils_FILS-75.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('BETSOLUTION-6_productid=2','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/betsolution_BETSOLUTION-6.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('GFG-106','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/gamefishglobal_GFG-106.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('BOOONGO-14','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/booongo_BOOONGO-14.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('SMARTSOFT-Backgammon_BoardGames','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/smartsoft_SMARTSOFT-Backgammon_BoardGames.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('BM-5ff41d50efcba9001a85f940','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/Booming_BM-5ff41d50efcba9001a85f940.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('WZ-MagicFruits4Deluxe','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/wazdan_WZ-MagicFruits4Deluxe.jpg"></a>
                            </div>

                        </div>
                    </div>
                    <div class="caroBox mb-4">
                        <div class="h6">Masa Oyunlar&#x131; </div>
                        <div class="owl-carousel rowCaro">
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('GA-310','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/gameart_GA-310.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('SG-C-TF01','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/spadegaming_SG-C-TF01.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('OT-5ad87fe7407e8f01eb80849a','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/onetouch_OT-5ad87fe7407e8f01eb80849a.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('njoy-rlt_french','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/redrake_njoy-rlt_french.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('CG-1058','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/conceptgaming_CG-1058.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('OT-5d47e944bcedef000179261e','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/onetouch_OT-5d47e944bcedef000179261e.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('1X2-2067','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/1x2_1X2-2067.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('njoy-rlt_european','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/redrake_njoy-rlt_european.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('CG-1044','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/conceptgaming_CG-1044.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('njoy-rlt_vip','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/redrake_njoy-rlt_vip.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('OT-5b5988da4e07877dccf507ad','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/onetouch_OT-5b5988da4e07877dccf507ad.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('HB-TGBlackjackAmerican','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/habanero_HB-TGBlackjackAmerican.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('NETENT-roulette_s_mobile_html_sw','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/netent_NETENT-roulette_s_mobile_html_sw.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('HELIOGAMING-thedailyhero','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/heliogaming_HELIOGAMING-thedailyhero.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('WZ-CasinoRoulette','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/wazdan_WZ-CasinoRoulette.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('BELATRA-european_roulette','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/belatra_BELATRA-european_roulette.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('EVOPLAY-5553','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evoplay_EVOPLAY-5553.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('PRPLAY-bjma','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/pragmaticplay_PRPLAY-bjma.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('OT-5ad87ffd407e8f01eb80849c','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/onetouch_OT-5ad87ffd407e8f01eb80849c.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('PLAYSON-roulette_with_track','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/playson_PLAYSON-roulette_with_track.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('WOOHOO-1899','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/woohoo_WOOHOO-1899.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('EGP-cd.roulette.euro','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/egp_EGP-cd.roulette.euro.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('OT-5c91285cb932970001a9d8d5','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/onetouch_OT-5c91285cb932970001a9d8d5.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('1X2-1048','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/1x2_1X2-1048.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('HELIOGAMING-euromillions','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/heliogaming_HELIOGAMING-euromillions.jpg"></a>
                            </div>

                        </div>
                    </div>
                    <div class="caroBox mb-4">
                        <div class="h6">Klasik Oyunlar</div>
                        <div class="owl-carousel rowCaro">
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('7MOJOS-uch','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/7mojos_7MOJOS-uch.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('7MOJOS-60uch','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/7mojos_7MOJOS-60uch.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('BM-5e732986ba03bd00171b05bb','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/Booming_BM-5e732986ba03bd00171b05bb.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('PP-50','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/playpearls_PP-50.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('EGP-card.blackjack.normal','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/egp_EGP-card.blackjack.normal.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('SMARTSOFT-VirtualClassicRoulette_Roulette','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/smartsoft_SMARTSOFT-VirtualClassicRoulette_Roulette.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('PRPLAY-vs10egyptcls','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/pragmaticplay_PRPLAY-vs10egyptcls.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('NETENT-blackjack3_mobile_html_sw','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/netent_NETENT-blackjack3_mobile_html_sw.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('1X2-1036','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/1x2_1X2-1036.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('BM-6087befc9e1ee6001afdf220','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/Booming_BM-6087befc9e1ee6001afdf220.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('BM-580dc69068712a00a9000018','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/Booming_BM-580dc69068712a00a9000018.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('new-classic-cherries','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/wearecasino_new-classic-cherries.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('BF-BFGhot-classic','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/bfgames_BF-BFGhot-classic.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('classic-cherries-evolution','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/wearecasino_classic-cherries-evolution.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('1X2-8045','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/1x2_1X2-8045.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('BM-5f3153ec737b43008ed75bb6','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/Booming_BM-5f3153ec737b43008ed75bb6.jpg"></a>
                            </div>

                        </div>
                    </div>
                    <div class="caroBox mb-4">
                        <div class="h6">Kart Oyunlar&#x131; </div>
                        <div class="owl-carousel rowCaro">
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('1X2-2094','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/1x2_1X2-2094.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('1X2-2078','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/1x2_1X2-2078.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('1X2-2114','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/1x2_1X2-2114.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('VIBRAGAMING-SCRATCHCARDMULTINIVEL9A7','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vibragaming_VIBRAGAMING-SCRATCHCARDMULTINIVEL9A7.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('1X2-2092','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/1x2_1X2-2092.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('1X2-2086','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/1x2_1X2-2086.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('LEGA-POTSOLUCK4H6','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/legaplay_LEGA-POTSOLUCK4H6.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('SPINMATIC-1730','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/spinmatic_SPINMATIC-1730.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('EVOPLAY-5491','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evoplay_EVOPLAY-5491.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('1X2-2087','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/1x2_1X2-2087.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('PP-84','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/playpearls_PP-84.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('PP-89','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/playpearls_PP-89.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('PP-96','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/playpearls_PP-96.jpg"></a>
                            </div>

                        </div>
                    </div>
                    <div class="caroBox mb-4">
                        <div class="h6">Piyango Oyunlar&#x131;</div>
                        <div class="owl-carousel rowCaro">
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('HELIOGAMING-lottohero','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/heliogaming_HELIOGAMING-lottohero.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('HELIOGAMING-eurojackpot','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/heliogaming_HELIOGAMING-eurojackpot.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" onclick="OpenCasino('HELIOGAMING-lottorush','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/heliogaming_HELIOGAMING-lottorush.jpg"></a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <section class="position-fixed mobile-categories categories">
                <span class="position-relative d-flex flex-column category-title">
                    <span>Sa&#x11F;lay&#x131;c&#x131;lar</span>
                <span class="position-absolute d-flex align-items-center justify-content-center fa fa-times close-mobile-categories"></span>
                </span>
                <div class="category-search">
                    <input id="category-search" placeholder="Sa&#x11F;lay&#x131;c&#x131;lara G&#xF6;re Arama" type="text">
                </div>
                <section class="category-list-container">
                    <div class="category-list">
                        <a href="/Casino/Detail?c=egt" class="category-item" data-title="egt">
            <span class="ico-slots ico-slots-egt">Egt</span>
        </a>
                        <a href="/Casino/Detail?c=netent" class="category-item" data-title="netent">
            <span class="ico-slots ico-slots-netent">Netent</span>
        </a>
                        <a href="/Casino/Detail?c=wazdan" class="category-item" data-title="wazdan">
            <span class="ico-slots ico-slots-wazdan">Wazdan</span>
        </a>
                        <a href="/Casino/Detail?c=evoplay" class="category-item" data-title="evoplay">
            <span class="ico-slots ico-slots-evoplay">Evo Play</span>
        </a>
                        <a href="/Casino/Detail?c=smartsoft" class="category-item" data-title="smartsoft">
            <span class="ico-slots ico-slots-smartsoft">Smart Soft</span>
        </a>
                        <a href="/Casino/Detail?c=novomatic" class="category-item" data-title="novomatic">
            <span class="ico-slots ico-slots-novomatic">Novomatic</span>
        </a>
                        <a href="/Casino/Detail?c=pragmaticplay" class="category-item" data-title="pragmaticplay">
            <span class="ico-slots ico-slots-pragmaticplay">Pragmatic Play</span>
        </a>
                        <a href="/Casino/Detail?c=quickspin" class="category-item" data-title="quickspin">
            <span class="ico-slots ico-slots-quickspin">Quickspin</span>
        </a>
                        <a href="/Casino/Detail?c=microgaming" class="category-item" data-title="microgaming">
            <span class="ico-slots ico-slots-microgaming">Microgaming</span>
        </a>
                        <a href="/Casino/Detail?c=spinmatic" class="category-item" data-title="spinmatic">
            <span class="ico-slots ico-slots-spinmatic">Spinmatic</span>
        </a>
                        <a href="/Casino/Detail?c=Booming" class="category-item" data-title="Booming">
            <span class="ico-slots ico-slots-Booming">Booming Games</span>
        </a>
                        <a href="/Casino/Detail?c=betsolution" class="category-item" data-title="betsolution">
            <span class="ico-slots ico-slots-betsolution">Betsolutions</span>
        </a>
                        <a href="/Casino/Detail?c=amatic" class="category-item" data-title="amatic">
            <span class="ico-slots ico-slots-amatic">Amatic</span>
        </a>
                        <a href="/Casino/Detail?c=fazi" class="category-item" data-title="fazi">
            <span class="ico-slots ico-slots-fazi">Fazi </span>
        </a>
                        <a href="/Casino/Detail?c=betsoft" class="category-item" data-title="betsoft">
            <span class="ico-slots ico-slots-betsoft">Betsoft</span>
        </a>
                        <a href="/Casino/Detail?c=1x2" class="category-item" data-title="1x2">
            <span class="ico-slots ico-slots-1x2">1X2 Gaming</span>
        </a>
                        <a href="/Casino/Detail?c=augustgaming" class="category-item" data-title="augustgaming">
            <span class="ico-slots ico-slots-augustgaming">August Gaming</span>
        </a>
                        <a href="/Casino/Detail?c=belatra" class="category-item" data-title="belatra">
            <span class="ico-slots ico-slots-belatra">Belatra</span>
        </a>
                        <a href="/Casino/Detail?c=bfgames" class="category-item" data-title="bfgames">
            <span class="ico-slots ico-slots-bfgames">Beefee</span>
        </a>
                        <a href="/Casino/Detail?c=booongo" class="category-item" data-title="booongo">
            <span class="ico-slots ico-slots-booongo">Booongo</span>
        </a>
                        <a href="/Casino/Detail?c=casinotechgaming" class="category-item" data-title="casinotechgaming">
            <span class="ico-slots ico-slots-casinotechgaming">Casino Technology</span>
        </a>
                        <a href="/Casino/Detail?c=conceptgaming" class="category-item" data-title="conceptgaming">
            <span class="ico-slots ico-slots-conceptgaming">Concept Gaming</span>
        </a>
                        <a href="/Casino/Detail?c=egp" class="category-item" data-title="egp">
            <span class="ico-slots ico-slots-egp">Espresso Gaming</span>
        </a>
                        <a href="/Casino/Detail?c=endorphina" class="category-item" data-title="endorphina">
            <span class="ico-slots ico-slots-endorphina">Endorphina</span>
        </a>
                        <a href="/Casino/Detail?c=evenbet" class="category-item" data-title="evenbet">
            <span class="ico-slots ico-slots-evenbet">Evenbet</span>
        </a>
                        <a href="/Casino/Detail?c=fils" class="category-item" data-title="fils">
            <span class="ico-slots ico-slots-fils">Fils Games</span>
        </a>
                        <a href="/Casino/Detail?c=gameart" class="category-item" data-title="gameart">
            <span class="ico-slots ico-slots-gameart">Gameart</span>
        </a>
                        <a href="/Casino/Detail?c=gamefishglobal" class="category-item" data-title="gamefishglobal">
            <span class="ico-slots ico-slots-gamefishglobal">Gamefish Global</span>
        </a>
                        <a href="/Casino/Detail?c=gmw" class="category-item" data-title="gmw">
            <span class="ico-slots ico-slots-gmw">Gmw</span>
        </a>
                        <a href="/Casino/Detail?c=habanero" class="category-item" data-title="habanero">
            <span class="ico-slots ico-slots-habanero">Habanero</span>
        </a>
                        <a href="/Casino/Detail?c=heliogaming" class="category-item" data-title="heliogaming">
            <span class="ico-slots ico-slots-heliogaming">Heliogaming</span>
        </a>
                        <a href="/Casino/Detail?c=just_play" class="category-item" data-title="just_play">
            <span class="ico-slots ico-slots-just_play">Justplay</span>
        </a>
                        <a href="/Casino/Detail?c=kagaming" class="category-item" data-title="kagaming">
            <span class="ico-slots ico-slots-kagaming">Kagaming</span>
        </a>
                        <a href="/Casino/Detail?c=legaplay" class="category-item" data-title="legaplay">
            <span class="ico-slots ico-slots-legaplay">Legaplay</span>
        </a>
                        <a href="/Casino/Detail?c=Njoy Gaming" class="category-item" data-title="Njoy Gaming">
            <span class="ico-slots ico-slots-Njoy Gaming">Njoy Gaming</span>
        </a>
                        <a href="/Casino/Detail?c=onetouch" class="category-item" data-title="onetouch">
            <span class="ico-slots ico-slots-onetouch">Onetouch</span>
        </a>
                        <a href="/Casino/Detail?c=ortiz" class="category-item" data-title="ortiz">
            <span class="ico-slots ico-slots-ortiz">Ortiz Video Bingo Games</span>
        </a>
                        <a href="/Casino/Detail?c=platingaming" class="category-item" data-title="platingaming">
            <span class="ico-slots ico-slots-platingaming">Platin Gaming </span>
        </a>
                        <a href="/Casino/Detail?c=playpearls" class="category-item" data-title="playpearls">
            <span class="ico-slots ico-slots-playpearls">Playpearls</span>
        </a>
                        <a href="/Casino/Detail?c=playson" class="category-item" data-title="playson">
            <span class="ico-slots ico-slots-playson">Playson</span>
        </a>
                        <a href="/Casino/Detail?c=redrake" class="category-item" data-title="redrake">
            <span class="ico-slots ico-slots-redrake">Red Rake</span>
        </a>
                        <a href="/Casino/Detail?c=spadegaming" class="category-item" data-title="spadegaming">
            <span class="ico-slots ico-slots-spadegaming">Spadegaming</span>
        </a>
                        <a href="/Casino/Detail?c=spribe" class="category-item" data-title="spribe">
            <span class="ico-slots ico-slots-spribe">Spribe</span>
        </a>
                        <a href="/Casino/Detail?c=tgc" class="category-item" data-title="tgc">
            <span class="ico-slots ico-slots-tgc">Tgc (The Game Company)</span>
        </a>
                        <a href="/Casino/Detail?c=vibragaming" class="category-item" data-title="vibragaming">
            <span class="ico-slots ico-slots-vibragaming">Vibra Gaming</span>
        </a>
                        <a href="/Casino/Detail?c=wearecasino" class="category-item" data-title="wearecasino">
            <span class="ico-slots ico-slots-wearecasino">We Are Casino</span>
        </a>
                        <a href="/Casino/Detail?c=woohoo" class="category-item" data-title="woohoo">
            <span class="ico-slots ico-slots-woohoo">Woohogames</span>
        </a>
                        <a href="/Casino/Detail?c=igrosoft" class="category-item" data-title="igrosoft">
            <span class="ico-slots ico-slots-igrosoft">&#x130;grosoft</span>
        </a>
                        <a href="/Casino/Detail?c=igt" class="category-item" data-title="igt">
            <span class="ico-slots ico-slots-igt">&#x130;gt</span>
        </a>
                        <a href="/Casino/Detail?c=aristocrat" class="category-item" data-title="aristocrat">
            <span class="ico-slots ico-slots-aristocrat">Aristocrat</span>
        </a>
                        <a href="/Casino/Detail?c=scientific_games" class="category-item" data-title="scientific_games">
            <span class="ico-slots ico-slots-scientific_games">Scientific_Games</span>
        </a>
                        <a href="/Casino/Detail?c=apollo" class="category-item" data-title="apollo">
            <span class="ico-slots ico-slots-apollo">Apollo</span>
        </a>
                        <a href="/Casino/Detail?c=merkur" class="category-item" data-title="merkur">
            <span class="ico-slots ico-slots-merkur">Merkur</span>
        </a>
                        <a href="/Casino/Detail?c=ainsworth" class="category-item" data-title="ainsworth">
            <span class="ico-slots ico-slots-ainsworth">Ainsworth</span>
        </a>
                        <a href="/Casino/Detail?c=7mojos" class="category-item" data-title="7mojos">
            <span class="ico-slots ico-slots-7mojos">7Mojos</span>
        </a>

                    </div>
                </section>
            </section>
            <div class="modal fade" id="SelectCasino" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">

                        <div class="modal-body calcNumbers">
                            <i onclick="AddFavoritesCasino(this)" data-game="" id="Favorites" class="fa-star fa-2x FavCasino"></i>
                            <div class="row no-gutters mb-1">

                                <button class="bttn bttn-xl" onclick="" id="real" data-dismiss="modal">Ger&#xE7;ek para <img src="/mb/img/arw2.png"></button>
                                <button class="bttn bttn-xl" onclick="" id="fun" data-dismiss="modal">Oyun paras&#x131;<img src="/mb/img/arw2.png"></button>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <script>
                iscasino = true;
            </script>



            <div class="clr mb-1"></div>


            

                

            

                   
    
                
    <div class="modal fade" id="SystemTable" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-body calcNumbers" id="SystemModalBody">
                </div>


                
            </div>
        </div>
    </div>

<div class="bottomMenu">
                    <div class="row no-gutters">
                        <div class="col bm1"><a href="/mb"><img src="/mb/img/tabbar/home.png"> <b>Ana Sayfa</b></a></div>
                        
                        
                        <div class="col bm8"><a href="/mb/live"><img src="/mb/img/tabbar/live.png"> <b>Canlı </b></a></div>
                        <div class="col bm4"><a href="/mb/livecasino" ><img src="/mb/img/tabbar/casino.png"> <b>Casino</b></a></div>
                        <div class="col bm4"><a href="/mb/slots" ><img src="/mb/img/tabbar/casino.png"> <b>Slots</b></a></div>
                        <div class="col bm6"><a href="/mb/ticket"><img src="/mb/img/tabbar/tickets.png"> <b>Bahislerim</b>                            </a></div>
                        <div class="col bm5"><a href="/mb/account"><img src="/mb/img/tabbar/account.png"> <b>Hesabım</b><u><?=$bakiyesini_ver;?></u></a></div>
                        
                        <div class="col bm7 d-none"><a class="getKuponWindow"><img src="/mb/img/tabbar/editor.png"> <b>Bahis Kuponu</b> <u id="bCountBottom" style="display:none;"></u></a></div>
                        <div class="col bm2"><a href="/mb/editor"><img src="/mb/img/tabbar/editor.png"> <b>Bahis Kuponu</b></a></div>
                    </div>
                </div>
   



    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="/mb/assets/bootstrap/js/popper.min.js"></script>
    <script src="/mb/assets/bootstrap/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/microsoft-signalr/3.1.7/signalr.min.js"></script>
    <script src="/mb/assets/owl2/owl.carousel.min.js"></script>
    <script src="/mb/assets/range/bootstrap-slider.js"></script>
    <script src='/mb/assets/js/jquery.fixer.js'></script>
    <script src="/mb/assets/plugins/toastr.min.js"></script>
    <script src="/mb/assets/js/jquery.lazyload.min.js"></script>
    <script src="/mb/assets/js/jquery.lazy.min.js"></script>

    <script src="/mb/assets/hammer.js"></script>
    <script src="/mb/assets/jquery.hammer.js"></script>
    <script src="/mb/assets/customMobile.js"></script>


    


    
</body>

</html>