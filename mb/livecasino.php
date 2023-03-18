<?php session_start();?>
<?PHP
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:../login.php"); die(); exit(); }
if(userayar('casino_yetki')!='1') { header("Location:/mb"); }
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
    <link href="/mb/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/mb/assets/fa/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/mb/assets/owl2/owl.carousel.min.css" />
    <link rel="stylesheet" href="/mb/assets/linear/style.css">
    <link href="/assets/range/css/bootstrap-slider.css" rel="stylesheet" media="screen">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.css" rel="stylesheet" media="screen">
    <link href="/mb/assets/plugins/toastr.min.css" rel="stylesheet" media="screen" />
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

    <div>
        <div class="mobWrapper">
            <script>
                var iscasino = true;
            </script>

            <div class="casinoBox">
                <div class="owl-carousel _1itemSlide mb-lg-3" id="sliderHome">
                    <div class="item">
                        <img src="/img/slider/casino/live1-1.jpg">
                    </div>
                    <div class="item">
                        <img src="/img/slider/casino/live2-1.jpg">
                    </div>
                </div>
                <div class="container">

                    <div class="mobFilterPanel d-flex flex-wrap overflow-hidden">
                        <div class="mobSearch">
                            <button><i class="btn btn-danger fas fa-search"></i><span>Ara</span></button>
                        </div>
                        <form action="/Casino/SearchLiveCasino" method="get" class="position-absolute" id="mobile-search">
                            <button class="btn btn-danger search-button"><i class="fas fa-search"></i></button>
                            <input type="text" name="k" value="" placeholder="Casino Ara" />
                            <button class="btn btn-secondary close-button"><i class="fas fa-times"></i></button>
                        </form>
                        <div class="w-100 caroList mb-3">
                            <div class="owl-carousel listCaro text-center csScroll" id="CasinoName">
                                <div class="item"><a href="/Casino/Live">Ana Sayfa</a></div>

                                <div class="item"><a href="/Casino/LiveCategory?c=RulletTables"> Rullet Masalar&#x131;</a></div>
                                <div class="item"><a href="/Casino/LiveCategory?c=BaccaratTables"> Baccarat Masalar&#x131;</a></div>
                                <div class="item"><a href="/Casino/LiveCategory?c=AllLobbyists"> T&#xFC;m Lobbyler</a></div>
                                <div class="item"><a href="/Casino/LiveCategory?c=BlackjackTables"> Blackjack Masalar&#x131;</a></div>
                                <div class="item"><a href="/Casino/LiveCategory?c=CasinoTexasHoldemTables"> Casino &amp; Texas Hold&#x27;em Masalar&#x131;</a></div>
                                <div class="item"><a href="/Casino/LiveCategory?c=DragonTigerTables"> Dragon Tiger Masalar&#x131;</a></div>

                            </div>
                        </div>
                    </div>
                    <span class="open-mobile-categories">Sağlayıcılar</span>
                    <a href="/Casino/FavoriteList?IsLive=true" class="d-flex align-items-center justify-content-center mobile-favourites">
            <i class="fa fa-star"></i>
            Favoriler
        </a>
                    <div class="caroBox mb-4">
                        <div class="h6">T&#xFC;m Lobbyler </div>
                        <div class="owl-carousel rowCaro">
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-lobby" onclick="OpenCasino('EVOLUTION-baccarat-lobby','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-lobby.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-lobby" onclick="OpenCasino('EVOLUTION-blackjack-lobby','False','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-lobby.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-poker-lobby" onclick="OpenCasino('EVOLUTION-poker-lobby','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-poker-lobby.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-roulette-lobby" onclick="OpenCasino('EVOLUTION-roulette-lobby','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-roulette-lobby.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-topgames-lobby" onclick="OpenCasino('EVOLUTION-topgames-lobby','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-topgames-lobby.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EZUGI-lobby" onclick="OpenCasino('EZUGI-lobby','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-lobby.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="VIVO-lobby-0" onclick="OpenCasino('VIVO-lobby-0','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-lobby-0.jpg"></a>
                            </div>

                        </div>
                    </div>
                    <div class="caroBox mb-4">
                        <div class="h6">Rullet Masalar&#x131;</div>
                        <div class="owl-carousel rowCaro">
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-americanroulette-AmericanTable001" onclick="OpenCasino('EVOLUTION-americanroulette-AmericanTable001','False','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-americanroulette-AmericanTable001.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-americanroulette-nvroruhz6teqkaop" onclick="OpenCasino('EVOLUTION-americanroulette-nvroruhz6teqkaop','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-americanroulette-nvroruhz6teqkaop.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-rng~roulette-rng~rt~european0" onclick="OpenCasino('EVOLUTION-rng~roulette-rng~rt~european0','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-rng~roulette-rng~rt~european0.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-rng~roulette-rng~rt~lightning" onclick="OpenCasino('EVOLUTION-rng~roulette-rng~rt~lightning','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-rng~roulette-rng~rt~lightning.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-roulette-01rb77cq1gtenhmo" onclick="OpenCasino('EVOLUTION-roulette-01rb77cq1gtenhmo','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-roulette-01rb77cq1gtenhmo.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-roulette-48z5pjps3ntvqc1b" onclick="OpenCasino('EVOLUTION-roulette-48z5pjps3ntvqc1b','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-roulette-48z5pjps3ntvqc1b.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-Roulette-7x0b1tgh7agmf6hv" onclick="OpenCasino('EVOLUTION-Roulette-7x0b1tgh7agmf6hv','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-Roulette-7x0b1tgh7agmf6hv.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-roulette-InstantRo0000001" onclick="OpenCasino('EVOLUTION-roulette-InstantRo0000001','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-roulette-InstantRo0000001.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-roulette-lkcbrbdckjxajdol" onclick="OpenCasino('EVOLUTION-roulette-lkcbrbdckjxajdol','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-roulette-lkcbrbdckjxajdol.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-roulette-lobby" onclick="OpenCasino('EVOLUTION-roulette-lobby','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-roulette-lobby.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-roulette-mdkqijp3dctrhnuv" onclick="OpenCasino('EVOLUTION-roulette-mdkqijp3dctrhnuv','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-roulette-mdkqijp3dctrhnuv.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-roulette-nvrokj666teqj3uj" onclick="OpenCasino('EVOLUTION-roulette-nvrokj666teqj3uj','False','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-roulette-nvrokj666teqj3uj.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-roulette-nvrollln6teqj4ks" onclick="OpenCasino('EVOLUTION-roulette-nvrollln6teqj4ks','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-roulette-nvrollln6teqj4ks.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-roulette-nvromrs56teqj5dt" onclick="OpenCasino('EVOLUTION-roulette-nvromrs56teqj5dt','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-roulette-nvromrs56teqj5dt.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-roulette-nvronp5a6teqj5xa" onclick="OpenCasino('EVOLUTION-roulette-nvronp5a6teqj5xa','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-roulette-nvronp5a6teqj5xa.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-roulette-nvrooqoy6teqj6nu" onclick="OpenCasino('EVOLUTION-roulette-nvrooqoy6teqj6nu','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-roulette-nvrooqoy6teqj6nu.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-roulette-nvropyy56teqj7gk" onclick="OpenCasino('EVOLUTION-roulette-nvropyy56teqj7gk','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-roulette-nvropyy56teqj7gk.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-roulette-nvroqh7f6teqj7qi" onclick="OpenCasino('EVOLUTION-roulette-nvroqh7f6teqj7qi','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-roulette-nvroqh7f6teqj7qi.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-roulette-nvrotzcs6teqkb5r" onclick="OpenCasino('EVOLUTION-roulette-nvrotzcs6teqkb5r','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-roulette-nvrotzcs6teqkb5r.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-roulette-nvrouze56teqkcsz" onclick="OpenCasino('EVOLUTION-roulette-nvrouze56teqkcsz','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-roulette-nvrouze56teqkcsz.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-roulette-nvroww6f6teqkdzh" onclick="OpenCasino('EVOLUTION-roulette-nvroww6f6teqkdzh','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-roulette-nvroww6f6teqkdzh.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-roulette-otctxzr5fjyggijz" onclick="OpenCasino('EVOLUTION-roulette-otctxzr5fjyggijz','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-roulette-otctxzr5fjyggijz.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-roulette-SpeedAutoRo00001" onclick="OpenCasino('EVOLUTION-roulette-SpeedAutoRo00001','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-roulette-SpeedAutoRo00001.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-roulette-vctlz20yfnmp1ylr" onclick="OpenCasino('EVOLUTION-roulette-vctlz20yfnmp1ylr','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-roulette-vctlz20yfnmp1ylr.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-roulette-wzg6kdkad1oe7m5k" onclick="OpenCasino('EVOLUTION-roulette-wzg6kdkad1oe7m5k','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-roulette-wzg6kdkad1oe7m5k.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EZUGI-AutomatedRoulette_221002" onclick="OpenCasino('EZUGI-AutomatedRoulette_221002','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-AutomatedRoulette_221002.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EZUGI-AutomatedRoulette_221004" onclick="OpenCasino('EZUGI-AutomatedRoulette_221004','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-AutomatedRoulette_221004.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EZUGI-AutomatedRoulette_5001" onclick="OpenCasino('EZUGI-AutomatedRoulette_5001','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-AutomatedRoulette_5001.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EZUGI-PrestigeAutoRoulette_221004" onclick="OpenCasino('EZUGI-PrestigeAutoRoulette_221004','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-PrestigeAutoRoulette_221004.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EZUGI-Roulette_221003" onclick="OpenCasino('EZUGI-Roulette_221003','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-Roulette_221003.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EZUGI-Roulette_221005" onclick="OpenCasino('EZUGI-Roulette_221005','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-Roulette_221005.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EZUGI-Roulette_501000" onclick="OpenCasino('EZUGI-Roulette_501000','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-Roulette_501000.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EZUGI-Roulette_601000" onclick="OpenCasino('EZUGI-Roulette_601000','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-Roulette_601000.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EZUGI-RoulettePortomaso_321000" onclick="OpenCasino('EZUGI-RoulettePortomaso_321000','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-RoulettePortomaso_321000.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EZUGI-RoulettePortomaso_611000" onclick="OpenCasino('EZUGI-RoulettePortomaso_611000','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-RoulettePortomaso_611000.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EZUGI-RoulettePortomaso_611001" onclick="OpenCasino('EZUGI-RoulettePortomaso_611001','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-RoulettePortomaso_611001.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EZUGI-RoulettePortomaso_611003" onclick="OpenCasino('EZUGI-RoulettePortomaso_611003','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-RoulettePortomaso_611003.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="Rou2af777sfa1lpw" onclick="OpenCasino('Rou2af777sfa1lpw','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/superspadegames_Rou2af777sfa1lpw.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="VIVO-roulette-1" onclick="OpenCasino('VIVO-roulette-1','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-roulette-1.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="VIVO-roulette-13" onclick="OpenCasino('VIVO-roulette-13','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-roulette-13.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="VIVO-roulette-167" onclick="OpenCasino('VIVO-roulette-167','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-roulette-167.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="VIVO-roulette-168" onclick="OpenCasino('VIVO-roulette-168','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-roulette-168.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="VIVO-roulette-177" onclick="OpenCasino('VIVO-roulette-177','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-roulette-177.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="VIVO-roulette-182" onclick="OpenCasino('VIVO-roulette-182','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-roulette-182.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="VIVO-roulette-183" onclick="OpenCasino('VIVO-roulette-183','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-roulette-183.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="VIVO-roulette-229" onclick="OpenCasino('VIVO-roulette-229','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-roulette-229.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="VIVO-roulette-230" onclick="OpenCasino('VIVO-roulette-230','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-roulette-230.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="VIVO-roulette-244" onclick="OpenCasino('VIVO-roulette-244','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-roulette-244.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="VIVO-roulette-245" onclick="OpenCasino('VIVO-roulette-245','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-roulette-245.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="VIVO-roulette-26" onclick="OpenCasino('VIVO-roulette-26','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-roulette-26.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="VIVO-roulette-36" onclick="OpenCasino('VIVO-roulette-36','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-roulette-36.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="VIVO-roulette-43" onclick="OpenCasino('VIVO-roulette-43','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-roulette-43.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="Rou3a2ahjrtya634" onclick="OpenCasino('Rou3a2ahjrtya634','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/superspadegames_Rou3a2ahjrtya634.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-rng~american~roulette-rng~rt~american0" onclick="OpenCasino('EVOLUTION-rng~american~roulette-rng~rt~american0','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-rng~american~roulette-rng~rt~american0.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-roulette-TRLRou0000000001" onclick="OpenCasino('EVOLUTION-roulette-TRLRou0000000001','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-roulette-TRLRou0000000001.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="WIREX-puntobanco-malta02170" onclick="OpenCasino('WIREX-puntobanco-malta02170','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/wirex_WIREX-puntobanco-malta02107.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="WIREX-roulette-blaze011" onclick="OpenCasino('WIREX-roulette-blaze011','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/wirex_WIREX-roulette-blaze011.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="WIREX-roulette-lumia01171" onclick="OpenCasino('WIREX-roulette-lumia01171','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/wirex_WIREX-roulette-lumia01108.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="WIREX-roulette-malta01169" onclick="OpenCasino('WIREX-roulette-malta01169','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/wirex_WIREX-roulette-malta01106.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="WIREX-roulette-mOracle172" onclick="OpenCasino('WIREX-roulette-mOracle172','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/wirex_WIREX-roulette-mOracle109.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="WIREX-roulette-mOracleVip173" onclick="OpenCasino('WIREX-roulette-mOracleVip173','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/wirex_WIREX-roulette-mOracleVip110.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="WIREX-roulette-qStudio" onclick="OpenCasino('WIREX-roulette-qStudio','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/wirex_WIREX-roulette-qStudio.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="7MOJOS-rl-2" onclick="OpenCasino('7MOJOS-rl-2','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/7mojos_7MOJOS-rl-2.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="7MOJOS-rl-3" onclick="OpenCasino('7MOJOS-rl-3','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/7mojos_7MOJOS-rl-3.jpg"></a>
                            </div>

                        </div>
                    </div>
                    <div class="caroBox mb-4">
                        <div class="h6">Baccarat Masalar&#x131;</div>
                        <div class="owl-carousel rowCaro">
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-60i0lcfx5wkkv3sy" onclick="OpenCasino('EVOLUTION-baccarat-60i0lcfx5wkkv3sy',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-60i0lcfx5wkkv3sy.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-k2oswnib7jjaaznw" onclick="OpenCasino('EVOLUTION-baccarat-k2oswnib7jjaaznw',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-k2oswnib7jjaaznw.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-leqhceumaq6qfoug" onclick="OpenCasino('EVOLUTION-baccarat-leqhceumaq6qfoug',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-leqhceumaq6qfoug.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-LightningBac0001" onclick="OpenCasino('EVOLUTION-baccarat-LightningBac0001',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-LightningBac0001.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-lobby" onclick="OpenCasino('EVOLUTION-baccarat-lobby',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-lobby.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-lv2kzclunt2qnxo5" onclick="OpenCasino('EVOLUTION-baccarat-lv2kzclunt2qnxo5',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-lv2kzclunt2qnxo5.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-n722xxh2sewbz3ve" onclick="OpenCasino('EVOLUTION-baccarat-n722xxh2sewbz3ve',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-n722xxh2sewbz3ve.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-n7ltqx5j25sr7xbe" onclick="OpenCasino('EVOLUTION-baccarat-n7ltqx5j25sr7xbe',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-n7ltqx5j25sr7xbe.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-n7wydq4gd3yaoxbt" onclick="OpenCasino('EVOLUTION-baccarat-n7wydq4gd3yaoxbt',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-n7wydq4gd3yaoxbt.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-ndgv45bghfuaaebf" onclick="OpenCasino('EVOLUTION-baccarat-ndgv45bghfuaaebf',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-ndgv45bghfuaaebf.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-ndgv76kehfuaaeec" onclick="OpenCasino('EVOLUTION-baccarat-ndgv76kehfuaaeec',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-ndgv76kehfuaaeec.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-ndgvs3tqhfuaadyg" onclick="OpenCasino('EVOLUTION-baccarat-ndgvs3tqhfuaadyg',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-ndgvs3tqhfuaadyg.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-ndgvwvgthfuaad3q" onclick="OpenCasino('EVOLUTION-baccarat-ndgvwvgthfuaad3q',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-ndgvwvgthfuaad3q.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-ndgvz5mlhfuaad6e" onclick="OpenCasino('EVOLUTION-baccarat-ndgvz5mlhfuaad6e',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-ndgvz5mlhfuaad6e.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-nmwde3fd7hvqhq43" onclick="OpenCasino('EVOLUTION-baccarat-nmwde3fd7hvqhq43',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-nmwde3fd7hvqhq43.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-nmwdzhbg7hvqh6a7" onclick="OpenCasino('EVOLUTION-baccarat-nmwdzhbg7hvqh6a7',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-nmwdzhbg7hvqh6a7.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-NoCommBac0000001" onclick="OpenCasino('EVOLUTION-baccarat-NoCommBac0000001',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-NoCommBac0000001.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-nvpg3bcbmn6f5gxz" onclick="OpenCasino('EVOLUTION-baccarat-nvpg3bcbmn6f5gxz',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-nvpg3bcbmn6f5gxz.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-nvpg4fsymn6f5hul" onclick="OpenCasino('EVOLUTION-baccarat-nvpg4fsymn6f5hul',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-nvpg4fsymn6f5hul.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-nvpg5dtemn6f5ik7" onclick="OpenCasino('EVOLUTION-baccarat-nvpg5dtemn6f5ik7',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-nvpg5dtemn6f5ik7.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-nvpg625pmn6f5jtv" onclick="OpenCasino('EVOLUTION-baccarat-nvpg625pmn6f5jtv',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-nvpg625pmn6f5jtv.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-nvpg6abmmn6f5i7r" onclick="OpenCasino('EVOLUTION-baccarat-nvpg6abmmn6f5i7r',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-nvpg6abmmn6f5i7r.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-nvpg723lmn6f5klm" onclick="OpenCasino('EVOLUTION-baccarat-nvpg723lmn6f5klm',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-nvpg723lmn6f5klm.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-nvpgz65fmn6f5gab" onclick="OpenCasino('EVOLUTION-baccarat-nvpgz65fmn6f5gab',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-nvpgz65fmn6f5gab.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-nvpha2samn6f5lbv" onclick="OpenCasino('EVOLUTION-baccarat-nvpha2samn6f5lbv',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-nvpha2samn6f5lbv.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-nvphb2l4mn6f5lyh" onclick="OpenCasino('EVOLUTION-baccarat-nvphb2l4mn6f5lyh',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-nvphb2l4mn6f5lyh.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-nvphczesmn6f5mpx" onclick="OpenCasino('EVOLUTION-baccarat-nvphczesmn6f5mpx',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-nvphczesmn6f5mpx.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-nvphecwbmn6f5nmz" onclick="OpenCasino('EVOLUTION-baccarat-nvphecwbmn6f5nmz',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-nvphecwbmn6f5nmz.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-nvphfegemn6f5oep" onclick="OpenCasino('EVOLUTION-baccarat-nvphfegemn6f5oep',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-nvphfegemn6f5oep.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-nvphghnxmn6f5o7o" onclick="OpenCasino('EVOLUTION-baccarat-nvphghnxmn6f5o7o',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-nvphghnxmn6f5o7o.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-nvphhjbymn6f5pz7" onclick="OpenCasino('EVOLUTION-baccarat-nvphhjbymn6f5pz7',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-nvphhjbymn6f5pz7.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-nvphihxxmn6f5qoy" onclick="OpenCasino('EVOLUTION-baccarat-nvphihxxmn6f5qoy',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-nvphihxxmn6f5qoy.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-nxpj4wumgclak2lx" onclick="OpenCasino('EVOLUTION-baccarat-nxpj4wumgclak2lx',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-nxpj4wumgclak2lx.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-nxpkul2hgclallno" onclick="OpenCasino('EVOLUTION-baccarat-nxpkul2hgclallno',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-nxpkul2hgclallno.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-nybej4kpzywe2zxy" onclick="OpenCasino('EVOLUTION-baccarat-nybej4kpzywe2zxy',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-nybej4kpzywe2zxy.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-nybejxlvzywe2zuo" onclick="OpenCasino('EVOLUTION-baccarat-nybejxlvzywe2zuo',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-nybejxlvzywe2zuo.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-o4kyj7tgpwqqy4m4" onclick="OpenCasino('EVOLUTION-baccarat-o4kyj7tgpwqqy4m4',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-o4kyj7tgpwqqy4m4.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-ob6zchb2bsorkfqo" onclick="OpenCasino('EVOLUTION-baccarat-ob6zchb2bsorkfqo',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-ob6zchb2bsorkfqo.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-obj64qcnqfunjelj" onclick="OpenCasino('EVOLUTION-baccarat-obj64qcnqfunjelj',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-obj64qcnqfunjelj.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-ocye2ju2bsoyq6vv" onclick="OpenCasino('EVOLUTION-baccarat-ocye2ju2bsoyq6vv',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-ocye2ju2bsoyq6vv.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-ocye5hmxbsoyrcii" onclick="OpenCasino('EVOLUTION-baccarat-ocye5hmxbsoyrcii',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-ocye5hmxbsoyrcii.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-ok37hvy3g7bofp4l" onclick="OpenCasino('EVOLUTION-baccarat-ok37hvy3g7bofp4l',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-ok37hvy3g7bofp4l.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-olwef4gsy4laaqr2" onclick="OpenCasino('EVOLUTION-baccarat-olwef4gsy4laaqr2',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-olwef4gsy4laaqr2.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-ovu5cwp54ccmymck" onclick="OpenCasino('EVOLUTION-baccarat-ovu5cwp54ccmymck',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-ovu5cwp54ccmymck.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-ovu5dsly4ccmynil" onclick="OpenCasino('EVOLUTION-baccarat-ovu5dsly4ccmynil',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-ovu5dsly4ccmynil.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-ovu5eja74ccmyoiq" onclick="OpenCasino('EVOLUTION-baccarat-ovu5eja74ccmyoiq',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-ovu5eja74ccmyoiq.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-ovu5fbxm4ccmypmb" onclick="OpenCasino('EVOLUTION-baccarat-ovu5fbxm4ccmypmb',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-ovu5fbxm4ccmypmb.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-ovu5fzje4ccmyqnr" onclick="OpenCasino('EVOLUTION-baccarat-ovu5fzje4ccmyqnr',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-ovu5fzje4ccmyqnr.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-ovu5h6b3ujb4y53w" onclick="OpenCasino('EVOLUTION-baccarat-ovu5h6b3ujb4y53w',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-ovu5h6b3ujb4y53w.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-oytmvb9m1zysmc44" onclick="OpenCasino('EVOLUTION-baccarat-oytmvb9m1zysmc44',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-oytmvb9m1zysmc44.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-SalPrivBac000001" onclick="OpenCasino('EVOLUTION-baccarat-SalPrivBac000001',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-SalPrivBac000001.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-zixzea8nrf1675oh" onclick="OpenCasino('EVOLUTION-baccarat-zixzea8nrf1675oh',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-zixzea8nrf1675oh.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-rng~baccarat-rngbaccarat00000" onclick="OpenCasino('EVOLUTION-rng~baccarat-rngbaccarat00000',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-rng~baccarat-rngbaccarat00000.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EZUGI-Baccarat_100" onclick="OpenCasino('EZUGI-Baccarat_100',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-Baccarat_100.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EZUGI-Baccarat_26100" onclick="OpenCasino('EZUGI-Baccarat_26100',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-Baccarat_26100.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EZUGI-Baccarat_26101" onclick="OpenCasino('EZUGI-Baccarat_26101',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-Baccarat_26101.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EZUGI-Baccarat_41100" onclick="OpenCasino('EZUGI-Baccarat_41100',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-Baccarat_41100.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EZUGI-Baccarat_41101" onclick="OpenCasino('EZUGI-Baccarat_41101',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-Baccarat_41101.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EZUGI-BaccaratKO_120" onclick="OpenCasino('EZUGI-BaccaratKO_120',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-BaccaratKO_120.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EZUGI-BaccaratQueenco_32100" onclick="OpenCasino('EZUGI-BaccaratQueenco_32100',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-BaccaratQueenco_32100.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EZUGI-BaccaratQueenco_32101" onclick="OpenCasino('EZUGI-BaccaratQueenco_32101',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-BaccaratQueenco_32101.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EZUGI-BaccaratSuperSix_130" onclick="OpenCasino('EZUGI-BaccaratSuperSix_130',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-BaccaratSuperSix_130.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="Bac3tbl3wzm1pacs" onclick="OpenCasino('Bac3tbl3wzm1pacs',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/superspadegames_Bac3tbl3wzm1pacs.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="Bacc5a7r5to2etrl" onclick="OpenCasino('Bacc5a7r5to2etrl',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/superspadegames_Bacc5a7r5to2etrl.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="Baccara2786tblew" onclick="OpenCasino('Baccara2786tblew',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/superspadegames_Baccara2786tblew.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="NcBaccbr5to22020" onclick="OpenCasino('NcBaccbr5to22020',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/superspadegames_NcBaccbr5to22020.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="NcBaccbr5to22021" onclick="OpenCasino('NcBaccbr5to22021',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/superspadegames_NcBaccbr5to22021.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="NcBaccbr5to2encb" onclick="OpenCasino('NcBaccbr5to2encb',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/superspadegames_NcBaccbr5to2encb.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="VIVO-baccarat-180" onclick="OpenCasino('VIVO-baccarat-180',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-baccarat-180.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="VIVO-baccarat-181" onclick="OpenCasino('VIVO-baccarat-181',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-baccarat-181.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="VIVO-baccarat-240" onclick="OpenCasino('VIVO-baccarat-240',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-baccarat-240.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="VIVO-baccarat-241" onclick="OpenCasino('VIVO-baccarat-241',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-baccarat-241.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="VIVO-baccarat-242" onclick="OpenCasino('VIVO-baccarat-242',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-baccarat-242.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="VIVO-baccarat-243" onclick="OpenCasino('VIVO-baccarat-243',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-baccarat-243.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="VIVO-baccarat-27" onclick="OpenCasino('VIVO-baccarat-27',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-baccarat-27.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="VIVO-baccarat-28" onclick="OpenCasino('VIVO-baccarat-28',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-baccarat-28.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="VIVO-baccarat-3" onclick="OpenCasino('VIVO-baccarat-3',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-baccarat-3.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-baccarat-gwbaccarat000001" onclick="OpenCasino('EVOLUTION-baccarat-gwbaccarat000001',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-gwbaccarat000001.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-rng~baccarat-rng~gwbaccarat00" onclick="OpenCasino('EVOLUTION-rng~baccarat-rng~gwbaccarat00',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-rng~baccarat-rng~gwbaccarat00.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-rng~baccarat-rng~lbaccarat000" onclick="OpenCasino('EVOLUTION-rng~baccarat-rng~lbaccarat000',False,'False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-rng~baccarat-rng~lbaccarat000.jpg"></a>
                            </div>

                        </div>
                    </div>
                    <div class="caroBox mb-4">
                        <div class="h6">Blackjack Masalar&#x131;</div>
                        <div class="owl-carousel rowCaro">
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-0mvn914lkmo9vaq8" onclick="OpenCasino('EVOLUTION-blackjack-0mvn914lkmo9vaq8','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-0mvn914lkmo9vaq8.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-1xwfnktjybsolkn6" onclick="OpenCasino('EVOLUTION-blackjack-1xwfnktjybsolkn6','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-1xwfnktjybsolkn6.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-9f4xhuhdd005xlbl" onclick="OpenCasino('EVOLUTION-blackjack-9f4xhuhdd005xlbl','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-9f4xhuhdd005xlbl.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-bghflgi59db7d7r2" onclick="OpenCasino('EVOLUTION-blackjack-bghflgi59db7d7r2','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-bghflgi59db7d7r2.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-cpxl81x0rgi34cmo" onclick="OpenCasino('EVOLUTION-blackjack-cpxl81x0rgi34cmo','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-cpxl81x0rgi34cmo.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-ejx1a04w4ben0mou" onclick="OpenCasino('EVOLUTION-blackjack-ejx1a04w4ben0mou','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-ejx1a04w4ben0mou.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-gazgtkid9h1b0dn9" onclick="OpenCasino('EVOLUTION-blackjack-gazgtkid9h1b0dn9','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-gazgtkid9h1b0dn9.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-gfzrqe4hqv24kukc" onclick="OpenCasino('EVOLUTION-blackjack-gfzrqe4hqv24kukc','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-gfzrqe4hqv24kukc.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-gkmq0o2hryjyqu30" onclick="OpenCasino('EVOLUTION-blackjack-gkmq0o2hryjyqu30','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-gkmq0o2hryjyqu30.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-h463tlq1rhl1lfr2" onclick="OpenCasino('EVOLUTION-blackjack-h463tlq1rhl1lfr2','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-h463tlq1rhl1lfr2.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-i5j1cyqhrypkih23" onclick="OpenCasino('EVOLUTION-blackjack-i5j1cyqhrypkih23','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-i5j1cyqhrypkih23.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-jhs44mm0v3fi3aux" onclick="OpenCasino('EVOLUTION-blackjack-jhs44mm0v3fi3aux','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-jhs44mm0v3fi3aux.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-k4r2ejwx4eqqb6tv" onclick="OpenCasino('EVOLUTION-blackjack-k4r2ejwx4eqqb6tv','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-k4r2ejwx4eqqb6tv.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-k4r2hyhw4eqqb6us" onclick="OpenCasino('EVOLUTION-blackjack-k4r2hyhw4eqqb6us','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-k4r2hyhw4eqqb6us.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-k4r2kvd34eqqb6vh" onclick="OpenCasino('EVOLUTION-blackjack-k4r2kvd34eqqb6vh','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-k4r2kvd34eqqb6vh.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-l4u6k47bk5faafkx" onclick="OpenCasino('EVOLUTION-blackjack-l4u6k47bk5faafkx','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-l4u6k47bk5faafkx.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-l4u6lqz3k5faafk7" onclick="OpenCasino('EVOLUTION-blackjack-l4u6lqz3k5faafk7','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-l4u6lqz3k5faafk7.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-l4u6m3qgk5faaflp" onclick="OpenCasino('EVOLUTION-blackjack-l4u6m3qgk5faaflp','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-l4u6m3qgk5faaflp.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-l5aug44hhzr3qvxs" onclick="OpenCasino('EVOLUTION-blackjack-l5aug44hhzr3qvxs','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-l5aug44hhzr3qvxs.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-l7fieyuccxiaef2k" onclick="OpenCasino('EVOLUTION-blackjack-l7fieyuccxiaef2k','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-l7fieyuccxiaef2k.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-l7fifq75cxiaef22" onclick="OpenCasino('EVOLUTION-blackjack-l7fifq75cxiaef22','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-l7fifq75cxiaef22.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-l7figflucxiaef3l" onclick="OpenCasino('EVOLUTION-blackjack-l7figflucxiaef3l','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-l7figflucxiaef3l.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-lnofn2yl756qaezm" onclick="OpenCasino('EVOLUTION-blackjack-lnofn2yl756qaezm','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-lnofn2yl756qaezm.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-lnofoyxv756qaezy" onclick="OpenCasino('EVOLUTION-blackjack-lnofoyxv756qaezy','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-lnofoyxv756qaezy.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-lnofpmm3756qae2c" onclick="OpenCasino('EVOLUTION-blackjack-lnofpmm3756qae2c','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-lnofpmm3756qae2c.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-lobby" onclick="OpenCasino('EVOLUTION-blackjack-lobby','False','True')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-lobby.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-m4lp4uqvtmdqqkzo" onclick="OpenCasino('EVOLUTION-blackjack-m4lp4uqvtmdqqkzo','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-m4lp4uqvtmdqqkzo.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-m4lp6khutmdqqk25" onclick="OpenCasino('EVOLUTION-blackjack-m4lp6khutmdqqk25','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-m4lp6khutmdqqk25.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-m4lp7ndztmdqqk3z" onclick="OpenCasino('EVOLUTION-blackjack-m4lp7ndztmdqqk3z','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-m4lp7ndztmdqqk3z.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-m4lqa3pvtmdqqk5b" onclick="OpenCasino('EVOLUTION-blackjack-m4lqa3pvtmdqqk5b','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-m4lqa3pvtmdqqk5b.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-m6wz34ftxyladk4d" onclick="OpenCasino('EVOLUTION-blackjack-m6wz34ftxyladk4d','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-m6wz34ftxyladk4d.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-m6wzqhdoxyladkqq" onclick="OpenCasino('EVOLUTION-blackjack-m6wzqhdoxyladkqq','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-m6wzqhdoxyladkqq.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-m6wzvco3xyladkvj" onclick="OpenCasino('EVOLUTION-blackjack-m6wzvco3xyladkvj','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-m6wzvco3xyladkvj.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-m6wzyzaoxyladkyv" onclick="OpenCasino('EVOLUTION-blackjack-m6wzyzaoxyladkyv','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-m6wzyzaoxyladkyv.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-mdkqdxtkdctrhnsx" onclick="OpenCasino('EVOLUTION-blackjack-mdkqdxtkdctrhnsx','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-mdkqdxtkdctrhnsx.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-mdkqfe74dctrhntj" onclick="OpenCasino('EVOLUTION-blackjack-mdkqfe74dctrhntj','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-mdkqfe74dctrhntj.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-mfvu6r2jvibqbxax" onclick="OpenCasino('EVOLUTION-blackjack-mfvu6r2jvibqbxax','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-mfvu6r2jvibqbxax.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-mfvvadncvibqbxbt" onclick="OpenCasino('EVOLUTION-blackjack-mfvvadncvibqbxbt','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-mfvvadncvibqbxbt.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-mi6vmbkjowfawnmj" onclick="OpenCasino('EVOLUTION-blackjack-mi6vmbkjowfawnmj','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-mi6vmbkjowfawnmj.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-mi6vna6sowfawnm2" onclick="OpenCasino('EVOLUTION-blackjack-mi6vna6sowfawnm2','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-mi6vna6sowfawnm2.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-mqi5c4kzfqcatulw" onclick="OpenCasino('EVOLUTION-blackjack-mqi5c4kzfqcatulw','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-mqi5c4kzfqcatulw.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-mqi5d7vvfqcatumk" onclick="OpenCasino('EVOLUTION-blackjack-mqi5d7vvfqcatumk','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-mqi5d7vvfqcatumk.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-mqi5dhhhfqcatul4" onclick="OpenCasino('EVOLUTION-blackjack-mqi5dhhhfqcatul4','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-mqi5dhhhfqcatul4.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-mqi5ds67fqcatumd" onclick="OpenCasino('EVOLUTION-blackjack-mqi5ds67fqcatumd','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-mqi5ds67fqcatumd.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-mrfykemt5slanyi5" onclick="OpenCasino('EVOLUTION-blackjack-mrfykemt5slanyi5','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-mrfykemt5slanyi5.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-mwpl22lktheqikxc" onclick="OpenCasino('EVOLUTION-blackjack-mwpl22lktheqikxc','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-mwpl22lktheqikxc.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-mwpllm2ctheqikns" onclick="OpenCasino('EVOLUTION-blackjack-mwpllm2ctheqikns','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-mwpllm2ctheqikns.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-mwplom52theqikpt" onclick="OpenCasino('EVOLUTION-blackjack-mwplom52theqikpt','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-mwplom52theqikpt.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-mwplrb43theqikrf" onclick="OpenCasino('EVOLUTION-blackjack-mwplrb43theqikrf','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-mwplrb43theqikrf.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-mwplwfiltheqikui" onclick="OpenCasino('EVOLUTION-blackjack-mwplwfiltheqikui','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-mwplwfiltheqikui.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-mwplyh47theqikvo" onclick="OpenCasino('EVOLUTION-blackjack-mwplyh47theqikvo','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-mwplyh47theqikvo.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-n5vyren2x4tqee7o" onclick="OpenCasino('EVOLUTION-blackjack-n5vyren2x4tqee7o','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-n5vyren2x4tqee7o.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-n5vyrmf3x4tqefga" onclick="OpenCasino('EVOLUTION-blackjack-n5vyrmf3x4tqefga','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-n5vyrmf3x4tqefga.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-n5vysairx4tqefzd" onclick="OpenCasino('EVOLUTION-blackjack-n5vysairx4tqefzd','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-n5vysairx4tqefzd.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-n5vysjolx4tqegbx" onclick="OpenCasino('EVOLUTION-blackjack-n5vysjolx4tqegbx','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-n5vysjolx4tqegbx.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nbjdukr7hawangge" onclick="OpenCasino('EVOLUTION-blackjack-nbjdukr7hawangge','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nbjdukr7hawangge.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nbjef7nohawangw2" onclick="OpenCasino('EVOLUTION-blackjack-nbjef7nohawangw2','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nbjef7nohawangw2.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nbjegfpahawangw7" onclick="OpenCasino('EVOLUTION-blackjack-nbjegfpahawangw7','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nbjegfpahawangw7.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nbjeglkqhawangxg" onclick="OpenCasino('EVOLUTION-blackjack-nbjeglkqhawangxg','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nbjeglkqhawangxg.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nbjettfehawanhes" onclick="OpenCasino('EVOLUTION-blackjack-nbjettfehawanhes','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nbjettfehawanhes.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nbjetztthawanhey" onclick="OpenCasino('EVOLUTION-blackjack-nbjetztthawanhey','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nbjetztthawanhey.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nc3u2l6y0khszjv7" onclick="OpenCasino('EVOLUTION-blackjack-nc3u2l6y0khszjv7','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nc3u2l6y0khszjv7.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-ndefkmdiofgqoavl" onclick="OpenCasino('EVOLUTION-blackjack-ndefkmdiofgqoavl','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-ndefkmdiofgqoavl.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-ndefnmxrofgqoayl" onclick="OpenCasino('EVOLUTION-blackjack-ndefnmxrofgqoayl','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-ndefnmxrofgqoayl.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-ndefqa2tofgqoa3e" onclick="OpenCasino('EVOLUTION-blackjack-ndefqa2tofgqoa3e','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-ndefqa2tofgqoa3e.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-ndeftrg3ofgqoa6g" onclick="OpenCasino('EVOLUTION-blackjack-ndeftrg3ofgqoa6g','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-ndeftrg3ofgqoa6g.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nep224c3xecqyyl4" onclick="OpenCasino('EVOLUTION-blackjack-nep224c3xecqyyl4','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nep224c3xecqyyl4.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nep22zrhxecqyyly" onclick="OpenCasino('EVOLUTION-blackjack-nep22zrhxecqyyly','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nep22zrhxecqyyly.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-ngx7r4osoqhqyen2" onclick="OpenCasino('EVOLUTION-blackjack-ngx7r4osoqhqyen2','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-ngx7r4osoqhqyen2.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-ngx7syvnoqhqyeov" onclick="OpenCasino('EVOLUTION-blackjack-ngx7syvnoqhqyeov','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-ngx7syvnoqhqyeov.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nhrk6zuazggqejda" onclick="OpenCasino('EVOLUTION-blackjack-nhrk6zuazggqejda','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nhrk6zuazggqejda.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nhrld2edzggqejgp" onclick="OpenCasino('EVOLUTION-blackjack-nhrld2edzggqejgp','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nhrld2edzggqejgp.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-njmog24wwxuad46r" onclick="OpenCasino('EVOLUTION-blackjack-njmog24wwxuad46r','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-njmog24wwxuad46r.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-njmogybuwxuad46n" onclick="OpenCasino('EVOLUTION-blackjack-njmogybuwxuad46n','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-njmogybuwxuad46n.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-njmoz4mqwxuad5ms" onclick="OpenCasino('EVOLUTION-blackjack-njmoz4mqwxuad5ms','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-njmoz4mqwxuad5ms.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-njmoz6m3wxuad5mv" onclick="OpenCasino('EVOLUTION-blackjack-njmoz6m3wxuad5mv','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-njmoz6m3wxuad5mv.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-njmoztxtwxuad5mg" onclick="OpenCasino('EVOLUTION-blackjack-njmoztxtwxuad5mg','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-njmoztxtwxuad5mg.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-njmozz5iwxuad5mn" onclick="OpenCasino('EVOLUTION-blackjack-njmozz5iwxuad5mn','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-njmozz5iwxuad5mn.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nkyivihc2jpbw4uy" onclick="OpenCasino('EVOLUTION-blackjack-nkyivihc2jpbw4uy','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nkyivihc2jpbw4uy.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nl7mfw3oy4xar22t" onclick="OpenCasino('EVOLUTION-blackjack-nl7mfw3oy4xar22t','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nl7mfw3oy4xar22t.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nl7mgk3hy4xar3ji" onclick="OpenCasino('EVOLUTION-blackjack-nl7mgk3hy4xar3ji','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nl7mgk3hy4xar3ji.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nl7mhbyly4xar32v" onclick="OpenCasino('EVOLUTION-blackjack-nl7mhbyly4xar32v','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nl7mhbyly4xar32v.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nl7mhvp3y4xar4kn" onclick="OpenCasino('EVOLUTION-blackjack-nl7mhvp3y4xar4kn','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nl7mhvp3y4xar4kn.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nohedgkjiypk7zja" onclick="OpenCasino('EVOLUTION-blackjack-nohedgkjiypk7zja','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nohedgkjiypk7zja.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nohegqjsiypk73ov" onclick="OpenCasino('EVOLUTION-blackjack-nohegqjsiypk73ov','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nohegqjsiypk73ov.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nohej3hriypk75yk" onclick="OpenCasino('EVOLUTION-blackjack-nohej3hriypk75yk','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nohej3hriypk75yk.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nohenl2miyplaad3" onclick="OpenCasino('EVOLUTION-blackjack-nohenl2miyplaad3','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nohenl2miyplaad3.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nrgrpgppsbsdh2s6" onclick="OpenCasino('EVOLUTION-blackjack-nrgrpgppsbsdh2s6','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nrgrpgppsbsdh2s6.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nrgrpjyysbsdh2vg" onclick="OpenCasino('EVOLUTION-blackjack-nrgrpjyysbsdh2vg','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nrgrpjyysbsdh2vg.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nrgrpmxusbsdh2wt" onclick="OpenCasino('EVOLUTION-blackjack-nrgrpmxusbsdh2wt','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nrgrpmxusbsdh2wt.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nrgrpo5nsbsdh2yn" onclick="OpenCasino('EVOLUTION-blackjack-nrgrpo5nsbsdh2yn','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nrgrpo5nsbsdh2yn.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nsxqkywul2nzcwwh" onclick="OpenCasino('EVOLUTION-blackjack-nsxqkywul2nzcwwh','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nsxqkywul2nzcwwh.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nsxqpyiol2nzcz6t" onclick="OpenCasino('EVOLUTION-blackjack-nsxqpyiol2nzcz6t','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nsxqpyiol2nzcz6t.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nu4r55nnmn6jgrco" onclick="OpenCasino('EVOLUTION-blackjack-nu4r55nnmn6jgrco','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nu4r55nnmn6jgrco.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nu4sd7vqmn6jguk4" onclick="OpenCasino('EVOLUTION-blackjack-nu4sd7vqmn6jguk4','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nu4sd7vqmn6jguk4.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nu4sfh6imn6jgvah" onclick="OpenCasino('EVOLUTION-blackjack-nu4sfh6imn6jgvah','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nu4sfh6imn6jgvah.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nu4sg4ofmn6jgv46" onclick="OpenCasino('EVOLUTION-blackjack-nu4sg4ofmn6jgv46','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nu4sg4ofmn6jgv46.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nveq65dtmn6n4mnd" onclick="OpenCasino('EVOLUTION-blackjack-nveq65dtmn6n4mnd','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nveq65dtmn6n4mnd.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nveq66tfmn6n4moi" onclick="OpenCasino('EVOLUTION-blackjack-nveq66tfmn6n4moi','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nveq66tfmn6n4moi.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nvph22xqmn6f554u" onclick="OpenCasino('EVOLUTION-blackjack-nvph22xqmn6f554u','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvph22xqmn6f554u.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nvph327amn6f56vj" onclick="OpenCasino('EVOLUTION-blackjack-nvph327amn6f56vj','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvph327amn6f56vj.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nvph542bmn6f6adk" onclick="OpenCasino('EVOLUTION-blackjack-nvph542bmn6f6adk','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvph542bmn6f6adk.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nvphwhh3mn6f52vh" onclick="OpenCasino('EVOLUTION-blackjack-nvphwhh3mn6f52vh','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvphwhh3mn6f52vh.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nvphxecbmn6f53iw" onclick="OpenCasino('EVOLUTION-blackjack-nvphxecbmn6f53iw','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvphxecbmn6f53iw.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nvphyyqemn6f54nt" onclick="OpenCasino('EVOLUTION-blackjack-nvphyyqemn6f54nt','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvphyyqemn6f54nt.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nvpia5irmn6f6cly" onclick="OpenCasino('EVOLUTION-blackjack-nvpia5irmn6f6cly','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvpia5irmn6f6cly.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nvpib5mlmn6f6dbu" onclick="OpenCasino('EVOLUTION-blackjack-nvpib5mlmn6f6dbu','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvpib5mlmn6f6dbu.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nvpic4khmn6f6dxy" onclick="OpenCasino('EVOLUTION-blackjack-nvpic4khmn6f6dxy','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvpic4khmn6f6dxy.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nvpidxmkmn6f6ekj" onclick="OpenCasino('EVOLUTION-blackjack-nvpidxmkmn6f6ekj','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvpidxmkmn6f6ekj.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nvpifs2amn6f6fvu" onclick="OpenCasino('EVOLUTION-blackjack-nvpifs2amn6f6fvu','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvpifs2amn6f6fvu.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nvpigomemn6f6gic" onclick="OpenCasino('EVOLUTION-blackjack-nvpigomemn6f6gic','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvpigomemn6f6gic.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nvpihmicmn6f6g6e" onclick="OpenCasino('EVOLUTION-blackjack-nvpihmicmn6f6g6e','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvpihmicmn6f6g6e.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nvpiiitomn6f6hsl" onclick="OpenCasino('EVOLUTION-blackjack-nvpiiitomn6f6hsl','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvpiiitomn6f6hsl.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nvpijy3gmn6f6ixs" onclick="OpenCasino('EVOLUTION-blackjack-nvpijy3gmn6f6ixs','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvpijy3gmn6f6ixs.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nvrm2po26teqi5p2" onclick="OpenCasino('EVOLUTION-blackjack-nvrm2po26teqi5p2','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrm2po26teqi5p2.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nvrm3nub6teqi6cv" onclick="OpenCasino('EVOLUTION-blackjack-nvrm3nub6teqi6cv','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrm3nub6teqi6cv.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nvrm4onw6teqi6xu" onclick="OpenCasino('EVOLUTION-blackjack-nvrm4onw6teqi6xu','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrm4onw6teqi6xu.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nvrm54e76teqi7uw" onclick="OpenCasino('EVOLUTION-blackjack-nvrm54e76teqi7uw','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrm54e76teqi7uw.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nvrn22dm6teqjrtw" onclick="OpenCasino('EVOLUTION-blackjack-nvrn22dm6teqjrtw','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrn22dm6teqjrtw.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nvrn3wsc6teqjsfu" onclick="OpenCasino('EVOLUTION-blackjack-nvrn3wsc6teqjsfu','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrn3wsc6teqjsfu.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nvrn4uia6teqjsx6" onclick="OpenCasino('EVOLUTION-blackjack-nvrn4uia6teqjsx6','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrn4uia6teqjsx6.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nvrn5qsm6teqjtio" onclick="OpenCasino('EVOLUTION-blackjack-nvrn5qsm6teqjtio','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrn5qsm6teqjtio.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nvrnagwo6teqjbcm" onclick="OpenCasino('EVOLUTION-blackjack-nvrnagwo6teqjbcm','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrnagwo6teqjbcm.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nvrnbgwq6teqjbwg" onclick="OpenCasino('EVOLUTION-blackjack-nvrnbgwq6teqjbwg','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrnbgwq6teqjbwg.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nvrncbps6teqjcjg" onclick="OpenCasino('EVOLUTION-blackjack-nvrncbps6teqjcjg','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrncbps6teqjcjg.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nvrndgch6teqjc77" onclick="OpenCasino('EVOLUTION-blackjack-nvrndgch6teqjc77','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrndgch6teqjc77.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nvrne6cb6teqjedg" onclick="OpenCasino('EVOLUTION-blackjack-nvrne6cb6teqjedg','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrne6cb6teqjedg.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nvrnedv66teqjdsl" onclick="OpenCasino('EVOLUTION-blackjack-nvrnedv66teqjdsl','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrnedv66teqjdsl.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nvrnf46f6teqjevo" onclick="OpenCasino('EVOLUTION-blackjack-nvrnf46f6teqjevo','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrnf46f6teqjevo.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nvrnhmaf6teqjfud" onclick="OpenCasino('EVOLUTION-blackjack-nvrnhmaf6teqjfud','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrnhmaf6teqjfud.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nvrni6m76teqjgs5" onclick="OpenCasino('EVOLUTION-blackjack-nvrni6m76teqjgs5','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrni6m76teqjgs5.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nvrnkby36teqjhil" onclick="OpenCasino('EVOLUTION-blackjack-nvrnkby36teqjhil','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrnkby36teqjhil.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nvrnlb7q6teqjh4c" onclick="OpenCasino('EVOLUTION-blackjack-nvrnlb7q6teqjh4c','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrnlb7q6teqjh4c.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nvrnmyun6teqji7p" onclick="OpenCasino('EVOLUTION-blackjack-nvrnmyun6teqji7p','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrnmyun6teqji7p.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nvrnnucn6teqjjqw" onclick="OpenCasino('EVOLUTION-blackjack-nvrnnucn6teqjjqw','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrnnucn6teqjjqw.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nvrno5iw6teqjkka" onclick="OpenCasino('EVOLUTION-blackjack-nvrno5iw6teqjkka','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrno5iw6teqjkka.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nvrnp3ts6teqjk5d" onclick="OpenCasino('EVOLUTION-blackjack-nvrnp3ts6teqjk5d','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrnp3ts6teqjk5d.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nvrnr4xp6teqjmff" onclick="OpenCasino('EVOLUTION-blackjack-nvrnr4xp6teqjmff','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrnr4xp6teqjmff.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nvrnvhmc6teqjofq" onclick="OpenCasino('EVOLUTION-blackjack-nvrnvhmc6teqjofq','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrnvhmc6teqjofq.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nvrnxy3i6teqjpv2" onclick="OpenCasino('EVOLUTION-blackjack-nvrnxy3i6teqjpv2','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrnxy3i6teqjpv2.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nvrnyx6n6teqjqk5" onclick="OpenCasino('EVOLUTION-blackjack-nvrnyx6n6teqjqk5','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrnyx6n6teqjqk5.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nvrnz6pm6teqjrcd" onclick="OpenCasino('EVOLUTION-blackjack-nvrnz6pm6teqjrcd','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrnz6pm6teqjrcd.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nvzbk5oh6teux5kg" onclick="OpenCasino('EVOLUTION-blackjack-nvzbk5oh6teux5kg','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvzbk5oh6teux5kg.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nvzbpog76teuybs7" onclick="OpenCasino('EVOLUTION-blackjack-nvzbpog76teuybs7','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvzbpog76teuybs7.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nvzbs4f46teuyeu6" onclick="OpenCasino('EVOLUTION-blackjack-nvzbs4f46teuyeu6','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvzbs4f46teuyeu6.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nvzbwb626teuyhs3" onclick="OpenCasino('EVOLUTION-blackjack-nvzbwb626teuyhs3','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvzbwb626teuyhs3.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nxh32gyqgcllxdji" onclick="OpenCasino('EVOLUTION-blackjack-nxh32gyqgcllxdji','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nxh32gyqgcllxdji.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nxh34kbygcllxe7m" onclick="OpenCasino('EVOLUTION-blackjack-nxh34kbygcllxe7m','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nxh34kbygcllxe7m.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nxh356xegcllxgmt" onclick="OpenCasino('EVOLUTION-blackjack-nxh356xegcllxgmt','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nxh356xegcllxgmt.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-nxh3ya7mgcllxbqv" onclick="OpenCasino('EVOLUTION-blackjack-nxh3ya7mgcllxbqv','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nxh3ya7mgcllxbqv.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-o3d9tx3u8kd0yawc" onclick="OpenCasino('EVOLUTION-blackjack-o3d9tx3u8kd0yawc','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-o3d9tx3u8kd0yawc.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-oa7fpshyqfueqxuj" onclick="OpenCasino('EVOLUTION-blackjack-oa7fpshyqfueqxuj','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-oa7fpshyqfueqxuj.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-oa7fvyaiqfueq5ob" onclick="OpenCasino('EVOLUTION-blackjack-oa7fvyaiqfueq5ob','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-oa7fvyaiqfueq5ob.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-obowksbdqfua65oq" onclick="OpenCasino('EVOLUTION-blackjack-obowksbdqfua65oq','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-obowksbdqfua65oq.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-obowkyf3qfua65uu" onclick="OpenCasino('EVOLUTION-blackjack-obowkyf3qfua65uu','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-obowkyf3qfua65uu.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-olbibp3fylzaxvhb" onclick="OpenCasino('EVOLUTION-blackjack-olbibp3fylzaxvhb','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-olbibp3fylzaxvhb.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-olbinkuoylzayeoj" onclick="OpenCasino('EVOLUTION-blackjack-olbinkuoylzayeoj','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-olbinkuoylzayeoj.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-olyp2b4qgnman3h6" onclick="OpenCasino('EVOLUTION-blackjack-olyp2b4qgnman3h6','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-olyp2b4qgnman3h6.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-olypz54qgnman3e5" onclick="OpenCasino('EVOLUTION-blackjack-olypz54qgnman3e5','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-olypz54qgnman3e5.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-oqic5sqbt25322zm" onclick="OpenCasino('EVOLUTION-blackjack-oqic5sqbt25322zm','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-oqic5sqbt25322zm.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-oqicznoauwbl46am" onclick="OpenCasino('EVOLUTION-blackjack-oqicznoauwbl46am','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-oqicznoauwbl46am.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-oqidcfpsuwbl5cqd" onclick="OpenCasino('EVOLUTION-blackjack-oqidcfpsuwbl5cqd','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-oqidcfpsuwbl5cqd.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-PowerInfiniteBJ1" onclick="OpenCasino('EVOLUTION-blackjack-PowerInfiniteBJ1','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-PowerInfiniteBJ1.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-psm2um7k4da8zwc2" onclick="OpenCasino('EVOLUTION-blackjack-psm2um7k4da8zwc2','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-psm2um7k4da8zwc2.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-qckwjf2o52r9ikeb" onclick="OpenCasino('EVOLUTION-blackjack-qckwjf2o52r9ikeb','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-qckwjf2o52r9ikeb.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-qlrc3fq3v7p6awm4" onclick="OpenCasino('EVOLUTION-blackjack-qlrc3fq3v7p6awm4','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-qlrc3fq3v7p6awm4.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-rdefcn4sffgo39l7" onclick="OpenCasino('EVOLUTION-blackjack-rdefcn4sffgo39l7','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-rdefcn4sffgo39l7.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-s63nx2mpdomgjagb" onclick="OpenCasino('EVOLUTION-blackjack-s63nx2mpdomgjagb','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-s63nx2mpdomgjagb.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-sni5cza6d1vvl50i" onclick="OpenCasino('EVOLUTION-blackjack-sni5cza6d1vvl50i','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-sni5cza6d1vvl50i.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-SpeedBlackjack01" onclick="OpenCasino('EVOLUTION-blackjack-SpeedBlackjack01','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-SpeedBlackjack01.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-SpeedBlackjack02" onclick="OpenCasino('EVOLUTION-blackjack-SpeedBlackjack02','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-SpeedBlackjack02.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-SpeedBlackjack03" onclick="OpenCasino('EVOLUTION-blackjack-SpeedBlackjack03','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-SpeedBlackjack03.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-SpeedBlackjack04" onclick="OpenCasino('EVOLUTION-blackjack-SpeedBlackjack04','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-SpeedBlackjack04.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-uwd2bl2khwcikjlz" onclick="OpenCasino('EVOLUTION-blackjack-uwd2bl2khwcikjlz','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-uwd2bl2khwcikjlz.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-xphpcthv8e6ivc16" onclick="OpenCasino('EVOLUTION-blackjack-xphpcthv8e6ivc16','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-xphpcthv8e6ivc16.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-xqyb2u7fqkexxpa0" onclick="OpenCasino('EVOLUTION-blackjack-xqyb2u7fqkexxpa0','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-xqyb2u7fqkexxpa0.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-xstnlyzrm345ev95" onclick="OpenCasino('EVOLUTION-blackjack-xstnlyzrm345ev95','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-xstnlyzrm345ev95.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-ylq4gmw8yl22u5dj" onclick="OpenCasino('EVOLUTION-blackjack-ylq4gmw8yl22u5dj','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-ylq4gmw8yl22u5dj.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-blackjack-z5pf5pichcsw3d2o" onclick="OpenCasino('EVOLUTION-blackjack-z5pf5pichcsw3d2o','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-z5pf5pichcsw3d2o.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-rng~blackjack-rng~bj~standard0" onclick="OpenCasino('EVOLUTION-rng~blackjack-rng~bj~standard0','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-rng~blackjack-rng~bj~standard0.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EZUGI-Blackjack_1" onclick="OpenCasino('EZUGI-Blackjack_1','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-Blackjack_1.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EZUGI-Blackjack_201" onclick="OpenCasino('EZUGI-Blackjack_201','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-Blackjack_201.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EZUGI-Blackjack_203" onclick="OpenCasino('EZUGI-Blackjack_203','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-Blackjack_203.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EZUGI-Blackjack_204" onclick="OpenCasino('EZUGI-Blackjack_204','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-Blackjack_204.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EZUGI-Blackjack_221" onclick="OpenCasino('EZUGI-Blackjack_221','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-Blackjack_221.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EZUGI-Blackjack_223" onclick="OpenCasino('EZUGI-Blackjack_223','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-Blackjack_223.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EZUGI-Blackjack_224" onclick="OpenCasino('EZUGI-Blackjack_224','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-Blackjack_224.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EZUGI-Blackjack_225" onclick="OpenCasino('EZUGI-Blackjack_225','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-Blackjack_225.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EZUGI-Blackjack_4" onclick="OpenCasino('EZUGI-Blackjack_4','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-Blackjack_4.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EZUGI-Blackjack_411" onclick="OpenCasino('EZUGI-Blackjack_411','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-Blackjack_411.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EZUGI-Blackjack_412" onclick="OpenCasino('EZUGI-Blackjack_412','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-Blackjack_412.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EZUGI-Blackjack_421" onclick="OpenCasino('EZUGI-Blackjack_421','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-Blackjack_421.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EZUGI-Blackjack_422" onclick="OpenCasino('EZUGI-Blackjack_422','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-Blackjack_422.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EZUGI-Blackjack_5" onclick="OpenCasino('EZUGI-Blackjack_5','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-Blackjack_5.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EZUGI-Blackjack_501" onclick="OpenCasino('EZUGI-Blackjack_501','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-Blackjack_501.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EZUGI-UnlimitedBlackjack_4151" onclick="OpenCasino('EZUGI-UnlimitedBlackjack_4151','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-UnlimitedBlackjack_4151.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EZUGI-UnlimitedBlackjack_5051" onclick="OpenCasino('EZUGI-UnlimitedBlackjack_5051','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-UnlimitedBlackjack_5051.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EZUGI-UnlimitedBlackjack_51" onclick="OpenCasino('EZUGI-UnlimitedBlackjack_51','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-UnlimitedBlackjack_51.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="VIVO-blackjack-16" onclick="OpenCasino('VIVO-blackjack-16','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-blackjack-16.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="VIVO-blackjack-18" onclick="OpenCasino('VIVO-blackjack-18','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-blackjack-18.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="1onmbjmk9gu5imkr" onclick="OpenCasino('1onmbjmk9gu5imkr','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/superspadegames_1onmbjmk9gu5imkr.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="7MOJOS-bj-1" onclick="OpenCasino('7MOJOS-bj-1','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/7mojos_7MOJOS-bj-1.jpg"></a>
                            </div>

                        </div>
                    </div>
                    <div class="caroBox mb-4">
                        <div class="h6">Dragon Tiger Masalar&#x131;</div>
                        <div class="owl-carousel rowCaro">
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-dragontiger-DragonTiger00001" onclick="OpenCasino('EVOLUTION-dragontiger-DragonTiger00001','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-dragontiger-DragonTiger00001.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-dragontiger-nvpgy6frmn6f5fhr" onclick="OpenCasino('EVOLUTION-dragontiger-nvpgy6frmn6f5fhr','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-dragontiger-nvpgy6frmn6f5fhr.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-rng~dragontiger-rng~dragontiger0" onclick="OpenCasino('EVOLUTION-rng~dragontiger-rng~dragontiger0','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-rng~dragontiger-rng~dragontiger0.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="Dt19er0d1t2iew37" onclick="OpenCasino('Dt19er0d1t2iew37','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/superspadegames_Dt19er0d1t2iew37.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="7MOJOS-dt-1" onclick="OpenCasino('7MOJOS-dt-1','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/7mojos_7MOJOS-dt-1.jpg"></a>
                            </div>

                        </div>
                    </div>
                    <div class="caroBox mb-4">
                        <div class="h6">Casino &amp; Texas Hold&#x27;em Masalar&#x131;</div>
                        <div class="owl-carousel rowCaro">
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-dhp-DHPTable00000001" onclick="OpenCasino('EVOLUTION-dhp-DHPTable00000001','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-dhp-DHPTable00000001.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EVOLUTION-dhp-nvrpjuts6teqkqrs" onclick="OpenCasino('EVOLUTION-dhp-nvrpjuts6teqkqrs','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-dhp-nvrpjuts6teqkqrs.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="EZUGI-CasinoHoldem_507000" onclick="OpenCasino('EZUGI-CasinoHoldem_507000','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-CasinoHoldem_507000.jpg"></a>
                            </div>
                            <div class="item">
                                <a data-toggle="modal" data-target="#SelectCasino" data-isfun="False" data-code="VIVO-casinoholdem-256" onclick="OpenCasino('VIVO-casinoholdem-256','False','False')"><img src="/mb/img/casino_loader2.gif" class="lazyCasino" data-src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-casinoholdem-256.jpg"></a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <section class="position-fixed mobile-categories categories">
                <span class="position-relative d-flex flex-column category-title">
        <span>Sağlayıcılar</span>
                <span class="position-absolute d-flex align-items-center justify-content-center fa fa-times close-mobile-categories"></span>
                </span>
                <div class="category-search">
                    <input id="category-search" placeholder="Sağlayıcılara Göre Arama" type="text">
                </div>
                <section class="category-list-container">
                    <div class="category-list">
                        <a href="/Casino/LiveDetail?c=betgames" class="category-item" data-title="betgames">
            <span class="ico-slots ico-slots-betgames">Betgames Tv</span>
        </a>
                        <a href="/Casino/LiveDetail?c=evolution" class="category-item" data-title="evolution">
            <span class="ico-slots ico-slots-evolution">Evolution</span>
        </a>
                        <a href="/Casino/LiveDetail?c=ezugi" class="category-item" data-title="ezugi">
            <span class="ico-slots ico-slots-ezugi">Ezugi</span>
        </a>
                        <a href="/Casino/LiveDetail?c=superspadegames" class="category-item" data-title="superspadegames">
            <span class="ico-slots ico-slots-superspadegames">Superspadegames</span>
        </a>
                        <a href="/Casino/LiveDetail?c=tvbet" class="category-item" data-title="tvbet">
            <span class="ico-slots ico-slots-tvbet">Tv Bet</span>
        </a>
                        <a href="/Casino/LiveDetail?c=vivo" class="category-item" data-title="vivo">
            <span class="ico-slots ico-slots-vivo">Vivo Games</span>
        </a>
                        <a href="/Casino/LiveDetail?c=wirex" class="category-item" data-title="wirex">
            <span class="ico-slots ico-slots-wirex">We Are Casino</span>
        </a>
                        <a href="/Casino/LiveDetail?c=7mojos" class="category-item" data-title="7mojos">
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
                        
                        
                        <div class="col bm8"><a href="/mb/live" style="text-decoration: none"><img src="/mb/img/tabbar/live.png"> <b>Canlı </b></a></div>
                        <div class="col bm4"><a href="/mb/livecasino" style="text-decoration: none"><img src="/mb/img/tabbar/casino.png"> <b>Casino</b></a></div>
                        <div class="col bm4"><a href="/mb/slots" style="text-decoration: none" ><img src="/mb/img/tabbar/casino.png"> <b>Slots</b></a></div>
                        <div class="col bm6"><a href="/mb/ticket" style="text-decoration: none"><img src="/mb/img/tabbar/tickets.png"> <b>Bahislerim</b>                            </a></div>
                        <div class="col bm5"><a href="/mb/account"style="text-decoration: none"><img src="/mb/img/tabbar/account.png"> <b>Hesabım</b><u><?=$bakiyesini_ver;?></u></a></div>
                        
                        <div class="col bm7 d-none"><a class="getKuponWindow"><img src="/mb/img/tabbar/editor.png"> <b>Bahis Kuponu</b> <u id="bCountBottom" style="display:none;"></u></a></div>
                        <div class="col bm2"><a href="/mb/editor"style="text-decoration: none"><img src="/mb/img/tabbar/editor.png"> <b>Bahis Kuponu</b></a></div>
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
    <script src="/mb/assets/bootstrap/js/popper.min.js"></script>
    <script src="/mb/assets/bootstrap/js/bootstrap.min.js"></script>

    
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