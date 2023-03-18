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
                    <div class="item">
                        <img src="/img/slider/casino/casino2-1.jpg">
                    </div>
                    <div class="item">
                        <img src="/img/slider/casino/casino1-1.jpg">
                    </div>

                </div>
                <div class="container">
                    <div class="mobFilterPanel d-flex flex-wrap overflow-hidden">
                        
                       
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
                    <div class="caroBox csnGameList mb-4 ">
                        <div class="h6">Novomatic </div>
                        <div class="row">
                            <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=1"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/ActionjokerGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=30"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/AfricansimbaGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=86"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/AfricanstampedeGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=87"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/AgeofprivateersGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=88"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/AlchemistssecretGT.jpg"></a>
                    </div>
                   <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=89"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/AlwayshotdeluxeGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=91"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/AmazingsevensGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=92"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/AmazonsdiamondsGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=93"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/AncientgoddessGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=94"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/ArivaarivaGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=95"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/AsgardsthunderGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=96"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/AsiandiamondsGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=97"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/AutodromoGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=98"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/BankraidGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=100"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/BeachholidaysGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=101"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/BeautyofcleopatraGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=102"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/BeetlemaniaGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=103"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/BlazingjollyGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=104"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/BlazingrichesGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=105"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/BookoffateGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=107"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/BookofmayaGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=108"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/BookofraclassicGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=109"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/Bookofradeluxe6GT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=110"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/BookofradeluxeGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=111"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/BookoframagicGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=112"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/BookofstarsGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=113"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/CaptainventureGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=114"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/CashrunnerGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=126"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/ChicagoGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=127"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/CindereelaGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=185"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/CoinofapolloGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=186"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/ColumbusdeluxeGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=187"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/DolphinspearlclassicGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=223"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/DolphinspearldeluxeGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=373"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/DragonsdeepGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=374"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/DragonwarriorGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=375"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/EmpirevGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=376"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/ExtremerichesGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=377"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/EyeofthedragonGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=378"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/EyeofthequeenGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=1551"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/FaustGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=1556"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/FiftyfortunediceGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=1557"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/FiftyfortunefruitsGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=3150"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/FlamedancerGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=3153"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/FlamencorosesGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=3154"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/FruitfarmGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=3158"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/FruitmagicGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=3208"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/FruitsnsevensdeluxeGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=3209"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/GoldenarkGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=3210"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/GoldenreelGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=3211"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/GorgeousgoddessGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=3217"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/GorillaGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=3219"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/GrandslamcasinoGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=4196"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/GryphonsgolddeluxeGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=4197"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/HelenaGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=4198"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/HoffmeisterGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=4271"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/HotcubesGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=4272"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/IndianspiritdeluxeGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=4378"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/IslandheatGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=4559"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/Jokeraction6GT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=4560"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/JollyreelsGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=4561"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/JumpingjokersGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=4562"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/KatanaGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=4571"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/KingofcardsGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=4572"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/KingsjesterGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=4574"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/LordoftheoceanGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=4605"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/LordoftheoceanmagicGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=4628"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/LovelymermaidGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=4629"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/Luckyladyscharmdeluxe6GT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=6657"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/LuckyladyscharmdeluxeGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=6805"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/Magic81GT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=6806"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/MagicwindowGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=6866"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/MermaidspearldeluxeGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=6869"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/MysticsecretsGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=6870"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/OceantaleGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=6871"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/OrcaGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=6872"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/PharaohsringGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=6873"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/PharaohstombGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=6874"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/Plentyoffruit20GT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=6875"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/Plentyoffruit40GT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=6876"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/PlentyontwentyGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=6877"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/PlentyontwentyiihotGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=6878"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/QueencleopatraGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=6916"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/Redhot20GT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=6918"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/Redhot40GT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=6919"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/RedhotburningGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=6920"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/RedhotfruitsGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=6921"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/RedladyGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=6922"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/RoaringfortiesGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=6923"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/RoaringwildsGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=6924"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/RoyallotusGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=6925"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/Sizzling6GT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=6990"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/SizzlinggemsGT.jpg"></a>
                    </div>
                     <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=6923"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/SizzlinghotdeluxeGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=6924"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/SuprahotGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=6925"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/TotallywildGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=6990"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/UltrahotdeluxeGT.jpg"></a>
                    </div>
                    <div class="item col-4 col-md-6 col-lg-4 col-xl-2">
                        <a href="/Casino/Game?c=6990"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Greentube/XtrahotGT.jpg"></a>
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