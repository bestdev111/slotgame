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
            <div class="casinoBox">
                <div class="owl-carousel _1itemSlide mb-lg-3" id="sliderHome">
                    <div class="item">
                        <img src="/img/slider/casino/casino2-1.jpg">
                    </div>
                    <div class="item">
                        <img src="/img/slider/casino/casino1-1.jpg">
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
                                <div class="item"><a href="/mb/home">Ana Sayfa</a></div>

                    <div class="item"><a href="/mb/slots">Slot</a></div>
                    <div class="item"><a href="/mb/novomatic">NOVOMATIC</a></div>
                    <div class="item"><a href="/mb/egt">EGT</a></div>
                    <div class="item"><a href="/mb/amatic">AMATIC</a></div>
                    <div class="item"><a href="/mb/pragmatic">PRAGMATIC</a></div>
                    <div class="item"><a href="/mb/playtech">PLAYTECH</a></div>
                    <div class="item"><a href="/mb/gamomat">GAMOMAT</a></div>
                    <div class="item"><a href="/mb/netent"> NETENT</a></div>
                    <div class="item"><a href="/mb/casinotechnology">CT-GAMES</a></div>
                    <div class="item"><a href="/mb/skywind">SKYWIND</a></div>
                    <div class="item"><a href="/mb/kagaming">KA-GAMING</a></div>
                    <div class="item"><a href="/mb/isoftbet">ISOFTBET</a></div>
                    <div class="item"><a href="/mb/aristocrat">ARISTOCRAT</a></div>
                    <div class="item"><a href="/mb/wazdan">WAZDAN</a></div>

                            </div>
                        </div>
                    </div>
                    <span class="open-mobile-categories">Sa&#x11F;lay&#x131;c&#x131;lar</span>
                    <a href="/Casino/FavoriteList?IsLive=false" class="d-flex align-items-center justify-content-center mobile-favourites">
            <i class="fa fa-star"></i>
            Favoriler
        </a>
                    <div class="caroBox mb-4">
                        <div class="h5"><b></b>NOVOMATİC</b></div>
                        <div class="owl-carousel rowCaro">
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs20fruitsw"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/ActionjokerGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SMARTSOFT-Cappadocia_GamesLobby"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/AfricansimbaGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SPRIBE-aviator"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/AfricanstampedeGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs20godiva"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/AgeofprivateersGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=211"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/AlchemistssecretGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BM-6087befc9e1ee6001afdf220"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/AlwayshotdeluxeGT.jpg"></a>
                            </div>
                            
                            <div class="item">
                                <a href="/Casino/Game?c=WZ-MagicHot4"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/AmazingsevensGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=FILS-144"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/AmazonsdiamondsGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=HB-AllAmericanPoker1Hand"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/AncientgoddessGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/ArivaarivaGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/AsgardsthunderGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/AsiandiamondsGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/AutodromoGT.jpg"></a>
                            </div>
                             <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/BankraidGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/BeachholidaysGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/BeautyofcleopatraGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/BeetlemaniaGT.jpg"></a>
                            </div>
                             <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/BlazingjollyGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/BlazingrichesGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/BookoffateGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/BookofmayaGT.jpg"></a>
                            </div>
                             <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/BookofraclassicGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/Bookofradeluxe6GT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/BookofradeluxeGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/BookoframagicGT.jpg"></a>
                            </div>
                             <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube//BookofstarsGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/BurningwildGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/CaptainventureGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/CashrunnerGT.jpg"></a>
                            </div>
                             <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/ChicagoGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/CindereelaGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/CoinofapolloGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/ColumbusdeluxeGT.jpg"></a>
                            </div>
                             <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/DolphinspearlclassicGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/DolphinspearldeluxeGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/DragonsdeepGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/DragonwarriorGT.jpg"></a>
                            </div>
                             <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/EmpirevGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/ExtremerichesGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/EyeofthedragonGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/EyeofthequeenGT.jpg"></a>
                            </div>
                             <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/FaustGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/FiftyfortunediceGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/FiftyfortunefruitsGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/FlamedancerGT.jpg"></a>
                            </div>
                             <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/FlamencorosesGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/FruitfarmGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/FruitmagicGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/FruitsnsevensdeluxeGT.jpg"></a>
                            </div>
                             <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/GoldenarkGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/GoldenreelGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/GorgeousgoddessGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/GorillaGT.jpg"></a>
                            </div>
                             <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/GrandslamcasinoGT.jpg"></a>
                            </div>
                             <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/GryphonsgolddeluxeGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/HelenaGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/HoffmeisterGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/HotcubesGT.jpg"></a>
                            </div>
                             <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/IndianspiritdeluxeGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/IslandheatGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/Jokeraction6GT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/JollyreelsGT.jpg"></a>
                            </div>
                             <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/JumpingjokersGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/KatanaGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/KingofcardsGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/KingsjesterGT.jpg"></a>
                            </div>
                             <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/LordoftheoceanGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/LordoftheoceanmagicGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/LovelymermaidGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/Luckyladyscharmdeluxe6GT.jpg"></a>
                            </div>
                             <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/LuckyladyscharmdeluxeGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/Magic81GT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/MagicwindowGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/MermaidspearldeluxeGT.jpg"></a>
                            </div>
                             <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/MysticsecretsGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/OceantaleGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/OrcaGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/PharaohsringGT.jpg"></a>
                            </div>
                             <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/PharaohstombGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/Plentyoffruit20GT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/Plentyoffruit40GT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/PlentyontwentyGT.jpg"></a>
                            </div>
                             <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/PlentyontwentyiihotGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/QueencleopatraGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/Redhot20GT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/Redhot40GT.jpg"></a>
                            </div>
                               <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/RedhotburningGT.jpg"></a>
                            </div>
                             <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/RedhotfruitsGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/RedladyGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/RoaringfortiesGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/RoaringwildsGT.jpg"></a>
                            </div>
                             <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/RoyallotusGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/Sizzling6GT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/SizzlinggemsGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/SizzlinghotdeluxeGT.jpg"></a>
                            </div>
                             <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/SuprahotGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/TotallywildGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/UltrahotdeluxeGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/XtrahotGT.jpg"></a>
                            </div>
                             
                    </div>
                    <div class="caroBox mb-4">
                        <div class="h5">EGT</div>
                        <div class="owl-carousel rowCaro">
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs5super7">
                                    <img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/ActionMoneyEGT.jpg"></a>
                
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs40wanderw"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/AgeOfTroyEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs4096magician"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/AlmightyRamsesIIEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243fortseren"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/AlohaPartyEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243dancingpar"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/AmazingAmazoniaEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/AmazonStoryEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/AmazonsBattleEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-uch"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/AztecGloryEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-ua"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/BigJourneyEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-rw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/BlueHeartEGT.jpg"></a>
                            </div>
              
              
              
              
              <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs5super7">
                                    <img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/BonusPokerEGT.jpg"></a>
                
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs40wanderw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/BookOfMagicEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs4096magician"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/BurningDice5EGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243fortseren"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/BurningDice40EGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243dancingpar"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/BurningDiceEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/BurningHeart5EGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/BurningHeart10EGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-uch"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/BurningHot6Reels5EGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-ua"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/BurningHot6Reels40EGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-rw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/BurningHot20EGT.jpg"></a>
                            </div>

                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs5super7">
                                    <img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/BurningHot40EGT.jpg"></a>
                
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs40wanderw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/BurningHot100EGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs4096magician"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/CaramelDiceEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243fortseren"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/CaramelHotEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243dancingpar"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/CashmirGoldEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/CasinoManiaEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/Cats100EGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-uch"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/CatsRoyalEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-ua"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/CoralIslandEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-rw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/CrazyBugsIIEGT.jpg"></a>
                            </div>
              
              
              
              
              <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs5super7">
                                    <img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/DarkQueenEGT.jpg"></a>
                
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs40wanderw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/DazzlingHot5EGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs4096magician"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/DazzlingHot20EGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243fortseren"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/Diamonds20EGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243dancingpar"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/Dice81EGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/DiceAndRoll40EGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/DiceAndRollEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-uch"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/DiceOfMagicEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-ua"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/DiceOfRaEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-rw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/DragonReelsEGT.jpg"></a>
                            </div>
              
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs5super7">
                                    <img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/DragonSpiritEGT.jpg"></a>
                
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs40wanderw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/EgyptSkyEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs4096magician"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/ExtraJokerEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243fortseren"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/ExtraStarsEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243dancingpar"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/ExtremelyHotEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/FastMoneyEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/FlamingDiceEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-uch"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/FlamingHotEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-ua"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/ForestBandEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-rw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/ForestTaleEGT.jpg"></a>
                            </div>
              
              
              
              
              <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs5super7">
                                    <img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/FortuneSpellsEGT.jpg"></a>
                
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs40wanderw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/FrogStoryEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs4096magician"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/FruitsKingdomEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243fortseren"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/GameOfLuckEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243dancingpar"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/GeniusOfLeonardoEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/GraceOfCleopatraEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/Great27EGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-uch"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/GreatAdventureEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-ua"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/GreatEgyptEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-rw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/GreatEmpireEGT.jpg"></a>
                            </div>

                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs5super7">
                                    <img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/HalloweenEGT.jpg"></a>
                
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs40wanderw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/Horses50EGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs4096magician"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/HotAndCashEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243fortseren"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/HotDice5EGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243dancingpar"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/IceDiceEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/ImperialDiceEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/ImperialWarsEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-uch"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/IncaGoldIIEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-ua"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/JacksOrBetterEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-rw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/JokerPokerEGT.jpg"></a>
                            </div>
              
              
              
              
              <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs5super7">
                                    <img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/JokerReels20EGT.jpg"></a>
                
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs40wanderw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/JuggleFruitsEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs4096magician"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/JungleAdventureEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243fortseren"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/KangarooLandEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243dancingpar"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/KenoEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/LegendaryRomeEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/LikeADiamonds20EGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-uch"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/LikeADiamonds40EGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-ua"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/LuckyAndWild20EGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-rw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/LuckyAndWild40EGT.jpg"></a>
                            </div>
              
                        
                        <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs5super7">
                                    <img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/LuckyBuzzEGT.jpg"></a>
                
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs40wanderw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/LuckyHotEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs4096magician"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/LuckyKing40EGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243fortseren"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/MagellanEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243dancingpar"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/MajesticForestEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/MayanSpiritEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/MegaCloverEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-uch"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/NeonDiceEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-ua"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/OceanRushEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-rw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/OilCompanyIIEGT.jpg"></a>
                            </div>

                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs5super7">
                                    <img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/OlympusGloryEGT.jpg"></a>
                
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs40wanderw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/PenguinStyleEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs4096magician"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/QueenOfRioEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243fortseren"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/RainbowDiceEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243dancingpar"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/RainbowQueenEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/RetroStyleEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/RichWorldEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-uch"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/RiseOfRaEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-ua"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/RollingDiceEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-rw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/RouteOfMexicoEGT.jpg"></a>
                            </div>
              
              
              
              
              <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs5super7">
                                    <img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/RoyalGardensEGT.jpg"></a>
                
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs40wanderw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/RoyalSecretsEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs4096magician"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/SavannasLifeEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243fortseren"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/SecretOfAlchemyEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243dancingpar"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/SecretsOfLondonEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/ShiningCrownEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/SpanishPassionsEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-uch"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/SpicyDiceEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-ua"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/SpicyFruitsEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-rw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/StoryOfAlexandrEGT.jpg"></a>
                            </div>
                        
                        <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs5super7">
                                    <img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/SummerBlissEGT.jpg"></a>
                
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs40wanderw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/SummerBlissEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs4096magician"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/Super20EGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243fortseren"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/SuperDice20EGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243dancingpar"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/SuperDice40EGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/SuperDice100EGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/SuperHot20EGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-uch"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/SuperHot40EGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-ua"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/SuperHot100EGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-rw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/SupremeDiceEGT.jpg"></a>
                            </div>
              
                        
                        <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs5super7">
                                    <img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/SupremeHotEGT.jpg"></a>
                
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs40wanderw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/SweetCheeseEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs4096magician"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/TheExplorersEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243fortseren"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/TwoDragonsEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243dancingpar"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/UltimateHotEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/VampireNightEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/VeneziaDoroEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-uch"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/VersaillesGoldEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-ua"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/VirtualRouletteEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-rw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/VolcanoWealthEGT.jpg"></a>
                            </div>

                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs5super7">
                                    <img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/WhiteWolfEGT.jpg"></a>
                
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs40wanderw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/Wins27EGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs4096magician"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/Wins81EGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243fortseren"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/WitchesCharmEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243dancingpar"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/WonderHeartEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/WonderTreeEGT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Egt/ZodiacWheelEGT.jpg"></a>
                            </div>
                            
                        
                    </div>
                    <div class="caroBox mb-6">
                        <div class="h5">AMATIC </div>
                        <div class="owl-carousel rowCaro">
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-sweetyhoneyfruity_mobile_html_sw"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/AdmiralNelsonAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-dazzle_not_mobile_sw"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/AllAmericanPokerAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=KA-LuckyCat"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/AllWaysFruitsAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BF-BFGa4508224-3475-11e6-ac61-9e71128cae77"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/AllWaysJokerAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-vegasnightlife_mobile_html_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/AllWaysWinAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-STARSTACKS2Q9"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/ArisingPhoenixAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-DRAGONSLOT5U5"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/AztecSecretAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EGP-slot.fluoParty"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/BeautyFairyAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-hotandwin"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/BeautyWarriorAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-spinsane_mobile_html_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/BellsOnFireAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=FAZI-HotStars"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/BellsOnFireHotAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=ENDORPHINA-endorphina2_LuxuryLife@ENDORPHINA"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/BillyonaireAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BM-5d5c05447c4c0b0016a7890f"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/BillysGameAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BETSOLUTION-5003_productid=1"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/BingoAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-MAGICGEMS8F2"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/BlueDolphinAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOPLAY-1614"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/BookOfAztecAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-joker_expand_40_mob"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/BookOfFortuneAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BELATRA-mars100"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/BookOfLordsAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=G208"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/BookOfPharaoAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=HB-SGNaughtySanta"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/BookOfQueenAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_queen_mega"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/CasanovaAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-41"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/CoolDiamonds2AM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243lionsgold"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/DeucesWildAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-45"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/DiamondCatsAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=CG-4004"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/DiamondMonkeyAM.jpg"></a>
                            </div>
                             
                             
                             <div class="item">
                                <a href="/Casino/Game?c=NETENT-sweetyhoneyfruity_mobile_html_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/DiamondsOnFireAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-dazzle_not_mobile_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/DragonsGiftAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=KA-LuckyCat"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/DragonsKingdomAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BF-BFGa4508224-3475-11e6-ac61-9e71128cae77"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/DragonsPearlAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-vegasnightlife_mobile_html_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/EnchantedCleopatraAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-STARSTACKS2Q9"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/EyeOfRaAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-DRAGONSLOT5U5"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/FireAndIceAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EGP-slot.fluoParty"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/FireQueenAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-hotandwin"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/FlyingDutchmanAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-spinsane_mobile_html_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/FortunasFruitsAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=FAZI-HotStars"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/FruitExpressAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=ENDORPHINA-endorphina2_LuxuryLife@ENDORPHINA"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/FruitPokerAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BM-5d5c05447c4c0b0016a7890f"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/GemStarAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BETSOLUTION-5003_productid=1"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/GoldenBookAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-MAGICGEMS8F2"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/GoldenJokerAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOPLAY-1614"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/GrandCasanovaAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-joker_expand_40_mob"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/GrandFruitsAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BELATRA-mars100"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/GrandTigerAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=G208"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/GrandXAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=HB-SGNaughtySanta"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/Hot7AM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_queen_mega"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/Hot7DiceAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-41"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/Hot27AM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243lionsgold"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/Hot40AM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-45"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/Hot81AM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=CG-4004"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/HotChoiceAM.jpg"></a>
                            </div>
                             
                             
                             <div class="item">
                                <a href="/Casino/Game?c=NETENT-sweetyhoneyfruity_mobile_html_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/HotDiamondsAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-dazzle_not_mobile_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/HotFruits20AM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=KA-LuckyCat"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/HotFruits100AM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BF-BFGa4508224-3475-11e6-ac61-9e71128cae77"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/HottestFruits20AM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-vegasnightlife_mobile_html_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/HottestFruits40AM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-STARSTACKS2Q9"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/JacksOrBetterAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-DRAGONSLOT5U5"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/JokerCardAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EGP-slot.fluoParty"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/JokerPokerAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-hotandwin"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/KingsCrownAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-spinsane_mobile_html_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/LaGranAventuraAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=FAZI-HotStars"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/LadyJokerAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=ENDORPHINA-endorphina2_LuxuryLife@ENDORPHINA"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/LovelyLadyAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BM-5d5c05447c4c0b0016a7890f"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/LuckyBellsAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BETSOLUTION-5003_productid=1"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/LuckyJoker5AM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-MAGICGEMS8F2"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/LuckyJoker20AM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOPLAY-1614"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/LuckyZodiacAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-joker_expand_40_mob"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/MagicForestAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BELATRA-mars100"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/MagicIdolAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=G208"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/MagicOwlAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=HB-SGNaughtySanta"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/MermaidsGoldAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_queen_mega"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/MerryFruitsAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-41"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/MultiWinAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243lionsgold"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/MultiWinTripleAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-45"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/PartyNightAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=CG-4004"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/PartyTimeAM.jpg"></a>
                            </div>
                             
                             
                             <div class="item">
                                <a href="/Casino/Game?c=NETENT-sweetyhoneyfruity_mobile_html_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/RedChilliAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-dazzle_not_mobile_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/RomanLegionAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=KA-LuckyCat"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/RouletteRoyalAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BF-BFGa4508224-3475-11e6-ac61-9e71128cae77"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/RoyalUnicornAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-vegasnightlife_mobile_html_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/SakuraFruitsAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-STARSTACKS2Q9"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/SakuraSecretAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-DRAGONSLOT5U5"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/TensOrBetterAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EGP-slot.fluoParty"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/TweetyBirdsAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-hotandwin"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/Ultra7AM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-spinsane_mobile_html_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/VampiresAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=FAZI-HotStars"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/Wild7AM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=ENDORPHINA-endorphina2_LuxuryLife@ENDORPHINA"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/WildDiamondsAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BM-5d5c05447c4c0b0016a7890f"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/WildDragonAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BETSOLUTION-5003_productid=1"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/WildRespinAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-MAGICGEMS8F2"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/WildSharkAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOPLAY-1614"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/WildStarsAM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-joker_expand_40_mob"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Amatic/WolfMoonAM.jpg"></a>
                            </div>
                            
                        </div>
                    </div>
                    <div class="caroBox mb-4">
                        <div class="h5">PRAGMATIC </div>
                        <div class="owl-carousel rowCaro">
                            <div class="item">
                                <a href="/Casino/Game?c=WOOHOO-1899"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Pragmatic/SweetBonanza.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=OT-5d47e944bcedef000179261e"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Pragmatic/SweetBonanzaXmas.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-1074"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Pragmatic/BonanzaGold.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOPLAY-5170"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Pragmatic/GreatRhinoPM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=OT-5ad87ffd407e8f01eb80849c"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Pragmatic/AncientEgyptPM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SG-C-TF01"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Pragmatic/AztecGemsPM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=OT-5ad87fe7407e8f01eb80849a"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Pragmatic/JokersJewelPM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=FAZI-TripleDice"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Pragmatic/Dragons888PM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=HELIOGAMING-heromillions"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Pragmatic/PekingLuckPM.jpg"></a>
                            </div>
                            
                        </div>
                    </div>
                    <div class="caroBox mb-4">
                        <div class="h5">PLAYTECH</div>
                        <div class="owl-carousel rowCaro">
                            <div class="item">
                                <a href="/Casino/Game?c=BM-5e732986ba03bd00171b05bb"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/AgeOfEgyptPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SMARTSOFT-VirtualClassicRoulette_Roulette"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/AgeOfGodsKingofOlympusPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BM-580dc69068712a00a9000018"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/AgeOfTheGodsGodOfStormsPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BM-5f3153ec737b43008ed75bb6"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/AnacondaWildPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-8045"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/ArcherPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BM-6087befc9e1ee6001afdf220"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/BaiShiPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-1036"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/BermudaTrianglePT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EGP-card.blackjack.normal"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/BerryBerryBonanzaPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-blackjack3_mobile_html_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/BonusBearsPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-60uch"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/BuffaloBlitzPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=new-classic-cherries"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/CaptainsTreasurePT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10egyptcls"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/CherryLovePT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-uch"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/ChineseKitchenPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=classic-cherries-evolution"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/ChristmasBellsJPPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-50"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/CoinCoinCoinPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BF-BFGhot-classic"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/Crazy7PT.jpg"></a>
                            </div>
                             
                             <div class="item">
                                <a href="/Casino/Game?c=BM-5e732986ba03bd00171b05bb"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/DesertTreasurePT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SMARTSOFT-VirtualClassicRoulette_Roulette"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/DolphinReefPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BM-580dc69068712a00a9000018"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/DragonChampionsPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BM-5f3153ec737b43008ed75bb6"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/EasterSurprisePT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-8045"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/EpicApePT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BM-6087befc9e1ee6001afdf220"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/FeiCuiGongZhuJPPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-1036"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/FountainOfYouthPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EGP-card.blackjack.normal"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/FunkyMonkeyJPPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-blackjack3_mobile_html_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/GeishaStoryPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-60uch"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/GoldenTourPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=new-classic-cherries"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/GreatBlueJPPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10egyptcls"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/GreatBluePT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-uch"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/HalloweenFortunePT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=classic-cherries-evolution"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/HighwayKingsPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-50"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/HotGemsPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BF-BFGhot-classic"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/IrishLuckPT.jpg"></a>
                            </div>
                             <div class="item">
                                <a href="/Casino/Game?c=BM-5e732986ba03bd00171b05bb"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/JackpotBellsPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SMARTSOFT-VirtualClassicRoulette_Roulette"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/JackpotBellsPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BM-580dc69068712a00a9000018"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/JacksOrBetterMHPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BM-5f3153ec737b43008ed75bb6"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/JacksOrBetterPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-8045"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/JiXiang8PT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BM-6087befc9e1ee6001afdf220"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/LieYanZuanShiPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-1036"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/MedusaMonstersPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EGP-card.blackjack.normal"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/MrCashbackPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-blackjack3_mobile_html_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/NianNianYouYuPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-60uch"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/NightOutPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=new-classic-cherries"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/PantherMoonPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10egyptcls"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/PrinceOfOlympusJPPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-uch"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/PurpleHotPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=classic-cherries-evolution"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/RockyPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-50"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/RomeAndGloryPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BF-BFGhot-classic"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/RouletteClassicPT.jpg"></a>
                            </div>
                             
                             <div class="item">
                                <a href="/Casino/Game?c=BM-5e732986ba03bd00171b05bb"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/RulerOfTheSkyJPPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SMARTSOFT-VirtualClassicRoulette_Roulette"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/RulersOfOlympusPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BM-580dc69068712a00a9000018"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/SafariHeatPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BM-5f3153ec737b43008ed75bb6"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/SantaSurprisePT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-8045"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/SherlockMysteryPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BM-6087befc9e1ee6001afdf220"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/SilentSamuraiPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-1036"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/SilverBulletPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EGP-card.blackjack.normal"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/SinbadsGoldenVoyagePT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-blackjack3_mobile_html_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/SunWukongPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-60uch"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/ThaiParadisePT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=new-classic-cherries"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/TigerClawPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10egyptcls"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/TrueLovePT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-uch"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/VacationStationDeluxePT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=classic-cherries-evolution"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/VacationStationPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-50"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/WaysOfPhoenixPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BF-BFGhot-classic"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/ZhaoCaiJinBaoPT.jpg"></a>
                            </div>
                              <div class="item">
                                <a href="/Casino/Game?c=classic-cherries-evolution"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/WildBeatsPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-50"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/WuLongPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BF-BFGhot-classic"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/WhiteKingPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-50"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/YunCongLongPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BF-BFGhot-classic"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Playtech/ZhaoCaiJinBaoJPPT.jpg"></a>
                            </div>
                        </div>
                    </div>
                    <div class="caroBox mb-4">
                        <div class="h5">GAMOMAT </div>
                        <div class="owl-carousel rowCaro">
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2087"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/AncientMagicGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2078"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/AncientRichesCasinoGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-POTSOLUCK4H6"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/AncientRichesCasinoRedHotFirepotGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2114"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/BeautifulNatureGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-84"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/BlackBeautyGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SPINMATIC-1730"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/BookOfMoorhuhnGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=VIBRAGAMING-SCRATCHCARDMULTINIVEL9A7"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/BookOfMoorhuhnGoldenNightsGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-96"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/BookOfRomeoAndJuliaGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2086"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/BookOfTheAgesGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-89"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/CrystalBallGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2094"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/CrystalBallGoldenNightsGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOPLAY-5491"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/CrystalBallRedHotFirepotGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2092"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/DiscOfAthenaGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2087"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/ExplodiacGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2078"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/ExplodiacRedHotFirepotGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-POTSOLUCK4H6"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/FancyFruitsGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2114"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/FancyFruitsGoldenNightsGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-84"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/FancyFruitsRedHotFirepotGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SPINMATIC-1730"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/ForeverDiamondsGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=VIBRAGAMING-SCRATCHCARDMULTINIVEL9A7"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/FruitManiaGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-96"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/FruitManiaGoldenNightsGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2086"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/FruitManiaRHFPGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-89"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/GatesOfPersiaGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2094"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/GlamorousTimesGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOPLAY-5491"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/GoldenTouchGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2092"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/KingAndQueenGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2087"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/KingOfTheJungleGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2078"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/KingOfTheJungleGoldenNightsGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-POTSOLUCK4H6"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/KingOfTheJungleRedHotFirepotGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2114"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/MaaaxDiamondsGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-84"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/MaaaxDiamondsGoldenNightsGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SPINMATIC-1730"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/MagicStoneGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=VIBRAGAMING-SCRATCHCARDMULTINIVEL9A7"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/MightyDragonGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-96"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/NightWolvesGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2086"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/OldFishermanGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-89"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/PhantomsMirrorGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2094"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/PharaosRichesGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOPLAY-5491"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/PharaosRichesGoldenNightsGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2092"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/PharaosRichesRedHotFirepotGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-84"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/RamsesBookGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SPINMATIC-1730"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/RamsesBookGoldenNightsGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=VIBRAGAMING-SCRATCHCARDMULTINIVEL9A7"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/RamsesBookRedHotFirepotGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-96"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/RoyalSevenGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2086"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/RoyalSevenGoldenNightsGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-89"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/RoyalSevenXXLGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2094"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/RoyalSevenXXLRHFPGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOPLAY-5491"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/SavannaMoonGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2092"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/SimplyTheBestGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2087"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/SuperDuperCherryGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2078"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/SuperDuperCherryRedHotFirepotGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-POTSOLUCK4H6"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/SuperDuperMoorhuhnGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2114"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/TheExpandableGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-84"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/TheLandOfHeroesGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SPINMATIC-1730"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/TheLandOfHeroesGoldenNightsGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=VIBRAGAMING-SCRATCHCARDMULTINIVEL9A7"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/TheMightyKingGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-96"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/WildRapaNuiGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2086"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/WildRubiesGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-89"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/WildRubiesGoldenNightsGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2094"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/WildsGoneWildGM.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOPLAY-5491"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Gamomat/XplodingPumpkinsGM.jpg"></a>
                            </div>
                            
                        </div>
                    </div>
                    <div class="caroBox mb-4">
                        <div class="h5">NETENT </div>
                        <div class="owl-carousel rowCaro">
                            <div class="item">
                                <a href="/Casino/Game?c=HELIOGAMING-lottorush"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Netent/CreatureFromTheBlackLagoonNET.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=HELIOGAMING-eurojackpot"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Netent/DazzleMeNET.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=HELIOGAMING-lottohero"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Netent/FlowersChristmasNET.jpg"></a>
                            </div>
                             <div class="item">
                                <a href="/Casino/Game?c=HELIOGAMING-lottorush"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Netent/FlowersNET.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=HELIOGAMING-eurojackpot"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Netent/FortuneRangersNET.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=HELIOGAMING-lottohero"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Netent/FruitShopChristmasNET.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=HELIOGAMING-lottorush"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Netent/FruitShopNET.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=HELIOGAMING-eurojackpot"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Netent/GoBananasNET.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=HELIOGAMING-lottohero"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Netent/GoldenGrimoireNET.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=HELIOGAMING-lottorush"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Netent/GrandSpinnSuperpotNET.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=HELIOGAMING-eurojackpot"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Netent/HalloweenJackNET.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=HELIOGAMING-lottohero"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Netent/JumanjiNET.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=HELIOGAMING-lottorush"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Netent/LightsNET.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=HELIOGAMING-eurojackpot"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Netent/NarcosNET.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=HELIOGAMING-lottohero"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Netent/ReelRush2NET.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=HELIOGAMING-lottorush"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Netent/SpaceWarsNET.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=HELIOGAMING-eurojackpot"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Netent/TheWolfsBaneNET.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=HELIOGAMING-lottohero"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Netent/TurnYourFortuneNET.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=HELIOGAMING-lottorush"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Netent/VikingsNET.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=HELIOGAMING-eurojackpot"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Netent/WildWaterNET.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=HELIOGAMING-lottohero"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Netent/WingsOfRichesNET.jpg"></a>
                            </div>
                        </div>
                    </div>
                    <div class="caroBox mb-4">
                        <div class="h5">CT-GAMES</div>
                        <div class="owl-carousel rowCaro">
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs20fruitsw"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/CasinoTechnology/AmericanGigoloCT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SMARTSOFT-Cappadocia_GamesLobby"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/CasinoTechnology/BananaPartyCT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SPRIBE-aviator"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/CasinoTechnology/BavarianForestCT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs20godiva"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/CasinoTechnology/BeetleStarCT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=211"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/CasinoTechnology/BigJokerCT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BM-6087befc9e1ee6001afdf220"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/CasinoTechnology/BrilliantsHotCT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=WZ-MagicHot4"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/CasinoTechnology/CloverPartyCT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=FILS-144"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/CasinoTechnology/CombatRomanceCT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=HB-AllAmericanPoker1Hand"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/CasinoTechnology/DesertTalesCT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/CasinoTechnology/EggAndRoosterCT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/CasinoTechnology/ForestNymphCT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/CasinoTechnology/FruitsOfDesireCT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/CasinoTechnology/FullOfLuckCT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs20fruitsw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/CasinoTechnology/FusionFruitBeatCT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SMARTSOFT-Cappadocia_GamesLobby"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/CasinoTechnology/GroovyAutomatCT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SPRIBE-aviator"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/CasinoTechnology/JadeHeavenCT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs20godiva"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/CasinoTechnology/LuckyCloverCT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=211"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/CasinoTechnology/MegaSlot40CT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BM-6087befc9e1ee6001afdf220"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/CasinoTechnology/MightyRexCT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=WZ-MagicHot4"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/CasinoTechnology/MiladyX2CT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=FILS-144"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/CasinoTechnology/NavyGirlCT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=HB-AllAmericanPoker1Hand"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/CasinoTechnology/PurpleHot2CT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/CasinoTechnology/ShiningJewels40CT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/CasinoTechnology/ShiningTreasuresCT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/CasinoTechnology/StarPartyCT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/CasinoTechnology/Treasure40CT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs20fruitsw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/CasinoTechnology/TreasureHillCT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SMARTSOFT-Cappadocia_GamesLobby"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/CasinoTechnology/TreasureKingdomCT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SPRIBE-aviator"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/CasinoTechnology/WetAndJuicyCT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs20godiva"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/CasinoTechnology/WildCloverCT.jpg"></a>
                            </div>
                            
                        </div>
                    </div>
                    <div class="caroBox mb-4">
                        <div class="h5">SKYWIND</div>
                        <div class="owl-carousel rowCaro">
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs20fruitsw"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Skywind/ChaoJi888.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SMARTSOFT-Cappadocia_GamesLobby"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Skywind/DragonRichesSW.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SPRIBE-aviator"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Skywind/FengKuangMaJiang.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs20godiva"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Skywind/FuFishSW.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=211"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Skywind/HeavenlyRulerSW.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BM-6087befc9e1ee6001afdf220"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Skywind/JinQianWa.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=WZ-MagicHot4"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Skywind/LepryBunnyPatrickSW.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=FILS-144"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Skywind/LongLongLong.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=HB-AllAmericanPoker1Hand"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Skywind/ShenLongBaoShiSW.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Skywind/SongCaiTongZiSW.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Skywind/TripleMonkey.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Skywind/XingYunJinChanSW.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Skywind/ZhaoCaiTongZi.jpg"></a>
                            </div>

                        </div>
                    </div>
                    <div class="caroBox mb-4">
                        <div class="h5">KA-GAMING</div>
                        <div class="owl-carousel rowCaro">
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs20fruitsw"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/AfricaRunKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SMARTSOFT-Cappadocia_GamesLobby"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/AresGodOfWarKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SPRIBE-aviator"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/BubbleDoubleKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs20godiva"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/BullStampedeKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=211"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/CaiYuanGuangJinKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BM-6087befc9e1ee6001afdf220"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/CaliforniaGoldRushKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=WZ-MagicHot4"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/CandyStormKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=FILS-144"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/ChiYouKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=HB-AllAmericanPoker1Hand"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/CocoricoKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/CrazyCircusKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/DajiKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/DragonBoatKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/DreamcatcherKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs20fruitsw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/EgyptianEmpressKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SMARTSOFT-Cappadocia_GamesLobby"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/EgyptianMythologyKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SPRIBE-aviator"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/FairyDustKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs20godiva"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/Fantasy777KA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=211"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/FarmManiaKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BM-6087befc9e1ee6001afdf220"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/Flaming7sKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=WZ-MagicHot4"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/FormosanBirdsKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=FILS-144"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/FourBeautiesKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=HB-AllAmericanPoker1Hand"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/GoldenShanghaiKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/HoroscopeKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/ImperialGirlsKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/JellyManiaKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/JokerSlotKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs20fruitsw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/JourneyToWestKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SMARTSOFT-Cappadocia_GamesLobby"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/LegendOfTheWhiteSnakeKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SPRIBE-aviator"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/LiveStreamingStarKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs20godiva"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/LostRealmKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=211"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/LotusLampKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BM-6087befc9e1ee6001afdf220"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/LotusLampKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=WZ-MagicHot4"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/MuscleCarsKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=FILS-144"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/NineLucksKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=HB-AllAmericanPoker1Hand"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/OriginOfFireKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/PartyGirlWaysKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/PinocchioKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/PolynesianKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/PrincessWenchengKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs20fruitsw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/QuickPlayJewelsKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SMARTSOFT-Cappadocia_GamesLobby"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/RaritiesKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SPRIBE-aviator"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/RedRidingHoodKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs20godiva"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/RobotsKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=211"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/Route66KA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BM-6087befc9e1ee6001afdf220"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/RoyalDemeanorKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=WZ-MagicHot4"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/ShoppingFiendKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=FILS-144"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/SnowLeopardsKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=HB-AllAmericanPoker1Hand"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/SpeakEasyKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/StockedBarKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/StonehengeKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/TheApesKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/TheKingOfDinosaursKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs20fruitsw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/TheNutCrackerKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SMARTSOFT-Cappadocia_GamesLobby"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/TripleDragonsKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SPRIBE-aviator"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/Vegas777KA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs20godiva"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/XElementsKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=211"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/YuGongKA.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BM-6087befc9e1ee6001afdf220"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/KaGaming/YunCaiTongZiKA.jpg"></a>
                            </div>
                           </div> 
                    </div>
                    <div class="caroBox mb-4">
                        <div class="h5">ISOFTBET</div>
                        <div class="owl-carousel rowCaro">
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs20fruitsw"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/isoftbet/AztecGoldMegawaysISB.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SMARTSOFT-Cappadocia_GamesLobby"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/isoftbet/FishingForGoldISB.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SPRIBE-aviator"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/isoftbet/GhostsNGoldISB.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs20godiva"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/isoftbet/HotSpinDeluxeISB.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=211"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/isoftbet/LostBoysLootISB.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BM-6087befc9e1ee6001afdf220"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/isoftbet/LuckyLeprechaunISB.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=WZ-MagicHot4"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/isoftbet/RacetrackRichesISB.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=FILS-144"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/isoftbet/SheriffOfNotinghamISB.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=HB-AllAmericanPoker1Hand"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/isoftbet/StacksOGoldISB.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/isoftbet/TheGoldenCityISB.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/isoftbet/WildApeISB.jpg"></a>
                            </div>
                            

                        </div>
                    </div>
                    <div class="caroBox mb-4">
                        <div class="h5">ARISTOCRAT</div>
                        <div class="owl-carousel rowCaro">
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs20fruitsw"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Aristocrat/BigBenAT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SMARTSOFT-Cappadocia_GamesLobby"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Aristocrat/BigRedAT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SPRIBE-aviator"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Aristocrat/BuffaloAT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs20godiva"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Aristocrat/ChoySunDoaAT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=211"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Aristocrat/DolphinsTreasureAT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BM-6087befc9e1ee6001afdf220"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Aristocrat/Dragons5AT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=WZ-MagicHot4"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Aristocrat/Dragons50AT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=FILS-144"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Aristocrat/FlameOfOlympusAT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=HB-AllAmericanPoker1Hand"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Aristocrat/JaguarMistAT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Aristocrat/Lions50AT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Aristocrat/Lucky88AT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Aristocrat/LuckyCountAT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Aristocrat/MissKittyAT.jpg"></a>
                            </div>
                               <div class="item">
                                <a href="/Casino/Game?c=SPRIBE-aviator"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Aristocrat/MoonFestivalAT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs20godiva"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Aristocrat/MoonFestivalAT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=211"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Aristocrat/PelicanPeteAT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BM-6087befc9e1ee6001afdf220"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Aristocrat/PompeiiAT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=WZ-MagicHot4"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Aristocrat/QueenOfTheNileIIAT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=FILS-144"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Aristocrat/SilkRoadAT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=HB-AllAmericanPoker1Hand"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Aristocrat/SunAndMoonAT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Aristocrat/TikiTorchAT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Aristocrat/WerewolfWildAT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Aristocrat/WildSplashAT.jpg"></a>
                            </div>
                            
                        </div>
                    </div>
                    <div class="caroBox mb-4">
                        <div class="h5">WAZDAN</div>
                        <div class="owl-carousel rowCaro">
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs20fruitsw"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Wazdan/CaptainSharkWD.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SMARTSOFT-Cappadocia_GamesLobby"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Wazdan/CorridaRomanceWD.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SPRIBE-aviator"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Wazdan/DemonJack27WD.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs20godiva"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Wazdan/FruitFiestaWD.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=211"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Wazdan/GreatBookOfMagicDeluxeWD.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BM-6087befc9e1ee6001afdf220"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Wazdan/GreatBookOfMagicWD.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=WZ-MagicHot4"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Wazdan/HighwayToHellDeluxeWD.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=FILS-144"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Wazdan/HighwayToHellWD.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=HB-AllAmericanPoker1Hand"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Wazdan/HotPartyWD.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Wazdan/LuckyFortuneWD.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Wazdan/LuckyQueenWD.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Wazdan/MagicHotWD.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Wazdan/MagicOfTheRingWD.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Wazdan/Sizzling777WD.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Wazdan/SuperHotWD.jpg"></a>
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
                         <a href="/mb/novomatic" class="category-item" data-title="novomatic">
            <span class="ico-slots ico-slots-novomatic">Novomatic</span>
        </a>
                        <a href="/mb/egt" class="category-item" data-title="egt">
            <span class="ico-slots ico-slots-egt">Egt</span>
        </a>
                        
                            
                            <a href="/mb/amatic" class="category-item" data-title="amatic">
            <span class="ico-slots ico-slots-amatic">Amatic</span>
        </a>
        
        <a href="/mb/pragmatic" class="category-item" data-title="pragmaticplay">
            <span class="ico-slots ico-slots-pragmaticplay">Pragmatic Play</span>
        </a>
        
        <a href="/mb/netent" class="category-item" data-title="netent">
            <span class="ico-slots ico-slots-netent">Netent</span>
        </a>
                 
                        
                        <a href="/mb/casinotechnology" class="category-item" data-title="casinotechgaming">
            <span class="ico-slots ico-slots-casinotechgaming">Casino Technology</span>
        </a>
                        
                        
                        
                        <a href="/mb/kagaming" class="category-item" data-title="kagaming">
            <span class="ico-slots ico-slots-kagaming">Kagaming</span>
        </a>
                        
                        
                        
                        <a href="/mb/aristocrat" class="category-item" data-title="aristocrat">
            <span class="ico-slots ico-slots-aristocrat">Aristocrat</span>
        </a>
                        
                        <a href="/mb/merkur" class="category-item" data-title="merkur">
            <span class="ico-slots ico-slots-merkur">Merkur</span>
        </a>
                        <a href="/mb/wazdan" class="category-item" data-title="wazdan">
            <span class="ico-slots ico-slots-wazdan">Wazdan</span>
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

    </div>
    
    <div class="modal fade" id="SystemTable" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-body calcNumbers" id="SystemModalBody">
                </div>


                <div class="modal-footer">
                    <button class="bttn bttn-large ios" data-dismiss="modal">Tamam <img src="/mb/img/arw2.png"></button>

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