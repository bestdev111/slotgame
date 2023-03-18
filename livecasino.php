<?php
session_start();
include 'db.php';
if($ub['wkyetki']<2) { header("Location:kasa"); }
if(isset($_GET['logout'])) { 
sed_sql_query("delete from kupon where session_id='$session_id'");
session_unset(); }
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:login"); exit(); }
if($ub['adminpanel']=="1") { header("Location:admin"); }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title><? if(userayar('site_adi')!=''){ ?><?=userayar('site_adi');?><? } else { ?><?=$site_adi;?><? } ?> | <?=getTranslation('sporbahis')?></title>
    <meta name="referrer" content="no-referrer">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/fa/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/owl2/owl.carousel.min.css" />
    <link rel="stylesheet" href="/assets/linear/style.css">
    <link href="/assets/range/css/bootstrap-slider.css" rel="stylesheet">
    
    <link href="/assets/plugins/toastr.min.css" rel="stylesheet" />
    <link href="/assets/css/style.css" rel="stylesheet">

    <link rel="apple-touch-icon" href="/assets/img/totobo.png">
    <link rel="icon" type="image/png" href="mb/assets/img/apple-touch-icon-pict.png">
    <!-- Favicons -->
    <!-- Start of  Zendesk Widget script -->


</head>

<body style="background-image: url('img/main_bg.jpg');">
     <div class="siteHeader">
        <div class="container">
            <div class="hRow">
                <div class="row">
                    <div class="col-2">
                        <div class="siteLogo">
                            <a href="/"><img src="/img/logo2.png"></a>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="navMenu">

                            <div class="searchBox pssv">
                                <form method="post" action="/Search/SearchWeb" id="FormSearch">
                                    <div class="formElems">
                                        <input type="text" class="form-control" name="k" id="SearchId" placeholder="Ara...">
                                        <button class="btn"><i class="fas fa-search"></i></button>
                                        <span><i class="fas fa-times"></i></span>
                                    </div>
                                </form>
                            </div>

                            <ul>
                               
                                <li><a href="/spor-bahisleri">Spor Bahisleri</a></li>
                                <li><a href="/canli-bahis">Canl&#x131; Bahisler</a></li>
                                <li><a href="/livecasino">Casino</a></li>
                                <li><a href="/slots">Slots</a></li>
                                <li></li>
                                <li><a href="/sanal-spor">Sanal Spor</a></li>
                                
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="userRightMenu">
                            <a href="/Personel/Payment" class="sccs"><img src="/img/lg2.png" /><small>Hesabım</small></a>
                            <a href="/TicketList"><img src="/img/lg5.png" /><small>Bahislerim</small></a>
                            <div class="userBox">
                                <a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown">
                                    <i class="fas fa-user"></i> <small><?=ucfirst($ub['username']); ?></small>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <span class="bble"><i class="fas fa-caret-up"></i></span>
                                    <div class="userDets">
                                        <i class="fas fa-user"></i>
                                        <div>

                                            <span><a id="balance"><?=ucfirst($ub['username']); ?> </a></span>
                                        </div>
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

<span><?=getTranslation('sporbahis')?>:  <font id="bubakiye"><?=$bakiyesini_ver; ?></font> </span>
<span><?=getTranslation('yeniyerler_kasa384')?>:  <font id="balance2"><?=$bakiyesini_ver_casino; ?></font> </span>
</li>
                                       
                                    </div>
                                    <div class="loggedMenu">
                                        <a href="/statement"><img src="/img/lg1.png" />Hesap &#xD6;zeti</a>
                                        <a href="/Personel/Payment"><img src="/img/lg2.png" />Para Yat&#x131;rma</a>
                                        <a href="/Personel/Payout"><img src="/img/lg3.png" />Para &#xC7;ekme</a>
                                        
                                        <a href="/TicketList"><img src="/img/lg5.png" />Bahislerim</a>
                                        <a href="/players/mesajlar.php"><img src="/img/lg6.png" />Mesajlar</a>
                                        <a href="/players/sifredegistir.php"><img src="/img/lg8.png" />&#x15E;ifre ve G&#xFC;venlik</a>
                                        <a href="/mb/logout"><img src="/img/lg9.png" />&#xC7;&#x131;k&#x131;&#x15F;</a>
                                        <span> <?
$loginsor = sed_sql_query("select * from login_data WHERE login_user='".$ub['username']."' ORDER BY id desc LIMIT 1");
$loginrow = sed_sql_fetcharray($loginsor);
?>
<?=getTranslation('songiris')?>: <?=date("d.m.Y H:i:s",$loginrow['zaman']);?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="casinoBox">
        <div class="owl-carousel _1itemSlide mb-3 d-lg-none" id="sliderHome">
            <div class="item">
                <img src="/img/slider/casino/live1-1.jpg">
            </div>
            <div class="item">
                <img src="/img/slider/casino/live2-1.jpg">
            </div>
        </div>
        <div class="container">

            <div class="owl-carousel _1itemSlide mb-3 d-none d-lg-block" id="sliderHome">
                <div class="item">
                    <img src="/img/slider/casino/live1-1.jpg">
                </div>
                <div class="item">
                    <img src="/img/slider/casino/live2-1.jpg">
                </div>
            </div>


            <div class="caroList mb-4">
                <div class="owl-carousel listCaro text-center">
                    <div class="item"><a href="/Casino">Ana Sayfa</a></div>

                    <div class="item"><a href="/Casino/LiveCategory?c=RulletTables"> Rullet Masalar&#x131;</a></div>
                    <div class="item"><a href="/Casino/LiveCategory?c=BaccaratTables"> Baccarat Masalar&#x131;</a></div>
                    <div class="item"><a href="/Casino/LiveCategory?c=AllLobbyists"> T&#xFC;m Lobbyler</a></div>
                    <div class="item"><a href="/Casino/LiveCategory?c=BlackjackTables"> Blackjack Masalar&#x131;</a></div>
                    <div class="item"><a href="/Casino/LiveCategory?c=CasinoTexasHoldemTables"> Casino &amp; Texas Hold&#x27;em Masalar&#x131;</a></div>
                    <div class="item"><a href="/Casino/LiveCategory?c=DragonTigerTables"> Dragon Tiger Masalar&#x131;</a></div>

                </div>

            </div>
            <div class="row">
                <div class="col-3">
                    <div class="position-relative w-100 h-100 d-flex">
                        <section class="position-absolute w-100 h-100 categories">
                            <span class="d-flex align-items-center justify-content-between category-title">
                            <span>Sağlayıcılar</span>
                            <a href="/Casino/FavoriteList?IsLive=true" class="d-flex align-items-center">
                                <i class="fa fa-star"></i>
                                Favoriler
                            </a>
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
                    </div>
                </div>
                <div class="col-9 caro-rows">
                    <div class="caroBox mb-4">
                        <div class="h6">T&#xFC;m Lobbyler</div>
                        <div class="owl-carousel rowCaro">
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-lobby"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-lobby.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-lobby"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-lobby.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-poker-lobby"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-poker-lobby.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-roulette-lobby"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-roulette-lobby.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-topgames-lobby"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-topgames-lobby.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EZUGI-lobby"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-lobby.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=VIVO-lobby-0"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-lobby-0.jpg"></a>
                            </div>

                        </div>
                    </div>
                    <div class="caroBox mb-4">
                        <div class="h6">Rullet Masalar&#x131;</div>
                        <div class="owl-carousel rowCaro">
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-americanroulette-AmericanTable001"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-americanroulette-AmericanTable001.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-americanroulette-nvroruhz6teqkaop"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-americanroulette-nvroruhz6teqkaop.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-rng~roulette-rng~rt~european0"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-rng~roulette-rng~rt~european0.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-rng~roulette-rng~rt~lightning"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-rng~roulette-rng~rt~lightning.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-roulette-01rb77cq1gtenhmo"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-roulette-01rb77cq1gtenhmo.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-roulette-48z5pjps3ntvqc1b"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-roulette-48z5pjps3ntvqc1b.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-Roulette-7x0b1tgh7agmf6hv"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-Roulette-7x0b1tgh7agmf6hv.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-roulette-InstantRo0000001"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-roulette-InstantRo0000001.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-roulette-lkcbrbdckjxajdol"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-roulette-lkcbrbdckjxajdol.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-roulette-lobby"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-roulette-lobby.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-roulette-mdkqijp3dctrhnuv"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-roulette-mdkqijp3dctrhnuv.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-roulette-nvrokj666teqj3uj"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-roulette-nvrokj666teqj3uj.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-roulette-nvrollln6teqj4ks"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-roulette-nvrollln6teqj4ks.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-roulette-nvromrs56teqj5dt"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-roulette-nvromrs56teqj5dt.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-roulette-nvronp5a6teqj5xa"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-roulette-nvronp5a6teqj5xa.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-roulette-nvrooqoy6teqj6nu"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-roulette-nvrooqoy6teqj6nu.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-roulette-nvropyy56teqj7gk"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-roulette-nvropyy56teqj7gk.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-roulette-nvroqh7f6teqj7qi"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-roulette-nvroqh7f6teqj7qi.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-roulette-nvrotzcs6teqkb5r"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-roulette-nvrotzcs6teqkb5r.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-roulette-nvrouze56teqkcsz"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-roulette-nvrouze56teqkcsz.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-roulette-nvroww6f6teqkdzh"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-roulette-nvroww6f6teqkdzh.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-roulette-otctxzr5fjyggijz"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-roulette-otctxzr5fjyggijz.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-roulette-SpeedAutoRo00001"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-roulette-SpeedAutoRo00001.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-roulette-vctlz20yfnmp1ylr"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-roulette-vctlz20yfnmp1ylr.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-roulette-wzg6kdkad1oe7m5k"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-roulette-wzg6kdkad1oe7m5k.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EZUGI-AutomatedRoulette_221002"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-AutomatedRoulette_221002.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EZUGI-AutomatedRoulette_221004"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-AutomatedRoulette_221004.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EZUGI-AutomatedRoulette_5001"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-AutomatedRoulette_5001.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EZUGI-PrestigeAutoRoulette_221004"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-PrestigeAutoRoulette_221004.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EZUGI-Roulette_221003"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-Roulette_221003.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EZUGI-Roulette_221005"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-Roulette_221005.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EZUGI-Roulette_501000"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-Roulette_501000.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EZUGI-Roulette_601000"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-Roulette_601000.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EZUGI-RoulettePortomaso_321000"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-RoulettePortomaso_321000.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EZUGI-RoulettePortomaso_611000"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-RoulettePortomaso_611000.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EZUGI-RoulettePortomaso_611001"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-RoulettePortomaso_611001.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EZUGI-RoulettePortomaso_611003"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-RoulettePortomaso_611003.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=Rou2af777sfa1lpw"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/superspadegames_Rou2af777sfa1lpw.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=VIVO-roulette-1"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-roulette-1.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=VIVO-roulette-13"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-roulette-13.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=VIVO-roulette-167"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-roulette-167.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=VIVO-roulette-168"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-roulette-168.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=VIVO-roulette-177"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-roulette-177.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=VIVO-roulette-182"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-roulette-182.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=VIVO-roulette-183"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-roulette-183.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=VIVO-roulette-229"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-roulette-229.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=VIVO-roulette-230"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-roulette-230.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=VIVO-roulette-244"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-roulette-244.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=VIVO-roulette-245"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-roulette-245.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=VIVO-roulette-26"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-roulette-26.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=VIVO-roulette-36"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-roulette-36.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=VIVO-roulette-43"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-roulette-43.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=Rou3a2ahjrtya634"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/superspadegames_Rou3a2ahjrtya634.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-rng~american~roulette-rng~rt~american0"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-rng~american~roulette-rng~rt~american0.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-roulette-TRLRou0000000001"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-roulette-TRLRou0000000001.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=WIREX-puntobanco-malta02170"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/wirex_WIREX-puntobanco-malta02107.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=WIREX-roulette-blaze011"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/wirex_WIREX-roulette-blaze011.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=WIREX-roulette-lumia01171"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/wirex_WIREX-roulette-lumia01108.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=WIREX-roulette-malta01169"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/wirex_WIREX-roulette-malta01106.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=WIREX-roulette-mOracle172"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/wirex_WIREX-roulette-mOracle109.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=WIREX-roulette-mOracleVip173"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/wirex_WIREX-roulette-mOracleVip110.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=WIREX-roulette-qStudio"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/wirex_WIREX-roulette-qStudio.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-rl-2"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/7mojos_7MOJOS-rl-2.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-rl-3"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/7mojos_7MOJOS-rl-3.jpg"></a>
                            </div>

                        </div>
                    </div>
                    <div class="caroBox mb-4">
                        <div class="h6">Baccarat Masalar&#x131;</div>
                        <div class="owl-carousel rowCaro">
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-60i0lcfx5wkkv3sy"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-60i0lcfx5wkkv3sy.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-k2oswnib7jjaaznw"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-k2oswnib7jjaaznw.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-leqhceumaq6qfoug"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-leqhceumaq6qfoug.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-LightningBac0001"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-LightningBac0001.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-lobby"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-lobby.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-lv2kzclunt2qnxo5"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-lv2kzclunt2qnxo5.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-n722xxh2sewbz3ve"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-n722xxh2sewbz3ve.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-n7ltqx5j25sr7xbe"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-n7ltqx5j25sr7xbe.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-n7wydq4gd3yaoxbt"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-n7wydq4gd3yaoxbt.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-ndgv45bghfuaaebf"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-ndgv45bghfuaaebf.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-ndgv76kehfuaaeec"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-ndgv76kehfuaaeec.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-ndgvs3tqhfuaadyg"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-ndgvs3tqhfuaadyg.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-ndgvwvgthfuaad3q"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-ndgvwvgthfuaad3q.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-ndgvz5mlhfuaad6e"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-ndgvz5mlhfuaad6e.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-nmwde3fd7hvqhq43"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-nmwde3fd7hvqhq43.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-nmwdzhbg7hvqh6a7"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-nmwdzhbg7hvqh6a7.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-NoCommBac0000001"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-NoCommBac0000001.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-nvpg3bcbmn6f5gxz"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-nvpg3bcbmn6f5gxz.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-nvpg4fsymn6f5hul"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-nvpg4fsymn6f5hul.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-nvpg5dtemn6f5ik7"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-nvpg5dtemn6f5ik7.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-nvpg625pmn6f5jtv"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-nvpg625pmn6f5jtv.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-nvpg6abmmn6f5i7r"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-nvpg6abmmn6f5i7r.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-nvpg723lmn6f5klm"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-nvpg723lmn6f5klm.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-nvpgz65fmn6f5gab"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-nvpgz65fmn6f5gab.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-nvpha2samn6f5lbv"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-nvpha2samn6f5lbv.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-nvphb2l4mn6f5lyh"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-nvphb2l4mn6f5lyh.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-nvphczesmn6f5mpx"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-nvphczesmn6f5mpx.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-nvphecwbmn6f5nmz"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-nvphecwbmn6f5nmz.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-nvphfegemn6f5oep"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-nvphfegemn6f5oep.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-nvphghnxmn6f5o7o"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-nvphghnxmn6f5o7o.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-nvphhjbymn6f5pz7"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-nvphhjbymn6f5pz7.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-nvphihxxmn6f5qoy"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-nvphihxxmn6f5qoy.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-nxpj4wumgclak2lx"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-nxpj4wumgclak2lx.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-nxpkul2hgclallno"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-nxpkul2hgclallno.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-nybej4kpzywe2zxy"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-nybej4kpzywe2zxy.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-nybejxlvzywe2zuo"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-nybejxlvzywe2zuo.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-o4kyj7tgpwqqy4m4"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-o4kyj7tgpwqqy4m4.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-ob6zchb2bsorkfqo"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-ob6zchb2bsorkfqo.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-obj64qcnqfunjelj"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-obj64qcnqfunjelj.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-ocye2ju2bsoyq6vv"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-ocye2ju2bsoyq6vv.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-ocye5hmxbsoyrcii"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-ocye5hmxbsoyrcii.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-ok37hvy3g7bofp4l"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-ok37hvy3g7bofp4l.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-olwef4gsy4laaqr2"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-olwef4gsy4laaqr2.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-ovu5cwp54ccmymck"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-ovu5cwp54ccmymck.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-ovu5dsly4ccmynil"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-ovu5dsly4ccmynil.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-ovu5eja74ccmyoiq"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-ovu5eja74ccmyoiq.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-ovu5fbxm4ccmypmb"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-ovu5fbxm4ccmypmb.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-ovu5fzje4ccmyqnr"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-ovu5fzje4ccmyqnr.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-ovu5h6b3ujb4y53w"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-ovu5h6b3ujb4y53w.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-oytmvb9m1zysmc44"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-oytmvb9m1zysmc44.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-SalPrivBac000001"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-SalPrivBac000001.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-zixzea8nrf1675oh"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-zixzea8nrf1675oh.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-rng~baccarat-rngbaccarat00000"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-rng~baccarat-rngbaccarat00000.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EZUGI-Baccarat_100"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-Baccarat_100.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EZUGI-Baccarat_26100"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-Baccarat_26100.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EZUGI-Baccarat_26101"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-Baccarat_26101.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EZUGI-Baccarat_41100"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-Baccarat_41100.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EZUGI-Baccarat_41101"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-Baccarat_41101.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EZUGI-BaccaratKO_120"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-BaccaratKO_120.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EZUGI-BaccaratQueenco_32100"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-BaccaratQueenco_32100.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EZUGI-BaccaratQueenco_32101"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-BaccaratQueenco_32101.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EZUGI-BaccaratSuperSix_130"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-BaccaratSuperSix_130.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=Bac3tbl3wzm1pacs"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/superspadegames_Bac3tbl3wzm1pacs.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=Bacc5a7r5to2etrl"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/superspadegames_Bacc5a7r5to2etrl.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=Baccara2786tblew"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/superspadegames_Baccara2786tblew.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NcBaccbr5to22020"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/superspadegames_NcBaccbr5to22020.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NcBaccbr5to22021"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/superspadegames_NcBaccbr5to22021.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NcBaccbr5to2encb"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/superspadegames_NcBaccbr5to2encb.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=VIVO-baccarat-180"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-baccarat-180.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=VIVO-baccarat-181"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-baccarat-181.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=VIVO-baccarat-240"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-baccarat-240.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=VIVO-baccarat-241"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-baccarat-241.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=VIVO-baccarat-242"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-baccarat-242.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=VIVO-baccarat-243"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-baccarat-243.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=VIVO-baccarat-27"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-baccarat-27.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=VIVO-baccarat-28"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-baccarat-28.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=VIVO-baccarat-3"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-baccarat-3.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-baccarat-gwbaccarat000001"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-baccarat-gwbaccarat000001.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-rng~baccarat-rng~gwbaccarat00"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-rng~baccarat-rng~gwbaccarat00.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-rng~baccarat-rng~lbaccarat000"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-rng~baccarat-rng~lbaccarat000.jpg"></a>
                            </div>

                        </div>
                    </div>
                    <div class="caroBox mb-4">
                        <div class="h6">Blackjack Masalar&#x131;</div>
                        <div class="owl-carousel rowCaro">
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-0mvn914lkmo9vaq8"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-0mvn914lkmo9vaq8.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-1xwfnktjybsolkn6"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-1xwfnktjybsolkn6.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-9f4xhuhdd005xlbl"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-9f4xhuhdd005xlbl.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-bghflgi59db7d7r2"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-bghflgi59db7d7r2.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-cpxl81x0rgi34cmo"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-cpxl81x0rgi34cmo.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-ejx1a04w4ben0mou"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-ejx1a04w4ben0mou.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-gazgtkid9h1b0dn9"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-gazgtkid9h1b0dn9.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-gfzrqe4hqv24kukc"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-gfzrqe4hqv24kukc.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-gkmq0o2hryjyqu30"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-gkmq0o2hryjyqu30.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-h463tlq1rhl1lfr2"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-h463tlq1rhl1lfr2.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-i5j1cyqhrypkih23"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-i5j1cyqhrypkih23.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-jhs44mm0v3fi3aux"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-jhs44mm0v3fi3aux.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-k4r2ejwx4eqqb6tv"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-k4r2ejwx4eqqb6tv.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-k4r2hyhw4eqqb6us"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-k4r2hyhw4eqqb6us.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-k4r2kvd34eqqb6vh"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-k4r2kvd34eqqb6vh.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-l4u6k47bk5faafkx"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-l4u6k47bk5faafkx.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-l4u6lqz3k5faafk7"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-l4u6lqz3k5faafk7.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-l4u6m3qgk5faaflp"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-l4u6m3qgk5faaflp.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-l5aug44hhzr3qvxs"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-l5aug44hhzr3qvxs.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-l7fieyuccxiaef2k"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-l7fieyuccxiaef2k.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-l7fifq75cxiaef22"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-l7fifq75cxiaef22.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-l7figflucxiaef3l"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-l7figflucxiaef3l.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-lnofn2yl756qaezm"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-lnofn2yl756qaezm.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-lnofoyxv756qaezy"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-lnofoyxv756qaezy.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-lnofpmm3756qae2c"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-lnofpmm3756qae2c.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-lobby"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-lobby.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-m4lp4uqvtmdqqkzo"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-m4lp4uqvtmdqqkzo.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-m4lp6khutmdqqk25"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-m4lp6khutmdqqk25.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-m4lp7ndztmdqqk3z"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-m4lp7ndztmdqqk3z.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-m4lqa3pvtmdqqk5b"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-m4lqa3pvtmdqqk5b.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-m6wz34ftxyladk4d"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-m6wz34ftxyladk4d.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-m6wzqhdoxyladkqq"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-m6wzqhdoxyladkqq.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-m6wzvco3xyladkvj"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-m6wzvco3xyladkvj.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-m6wzyzaoxyladkyv"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-m6wzyzaoxyladkyv.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-mdkqdxtkdctrhnsx"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-mdkqdxtkdctrhnsx.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-mdkqfe74dctrhntj"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-mdkqfe74dctrhntj.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-mfvu6r2jvibqbxax"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-mfvu6r2jvibqbxax.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-mfvvadncvibqbxbt"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-mfvvadncvibqbxbt.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-mi6vmbkjowfawnmj"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-mi6vmbkjowfawnmj.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-mi6vna6sowfawnm2"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-mi6vna6sowfawnm2.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-mqi5c4kzfqcatulw"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-mqi5c4kzfqcatulw.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-mqi5d7vvfqcatumk"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-mqi5d7vvfqcatumk.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-mqi5dhhhfqcatul4"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-mqi5dhhhfqcatul4.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-mqi5ds67fqcatumd"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-mqi5ds67fqcatumd.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-mrfykemt5slanyi5"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-mrfykemt5slanyi5.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-mwpl22lktheqikxc"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-mwpl22lktheqikxc.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-mwpllm2ctheqikns"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-mwpllm2ctheqikns.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-mwplom52theqikpt"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-mwplom52theqikpt.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-mwplrb43theqikrf"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-mwplrb43theqikrf.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-mwplwfiltheqikui"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-mwplwfiltheqikui.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-mwplyh47theqikvo"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-mwplyh47theqikvo.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-n5vyren2x4tqee7o"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-n5vyren2x4tqee7o.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-n5vyrmf3x4tqefga"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-n5vyrmf3x4tqefga.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-n5vysairx4tqefzd"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-n5vysairx4tqefzd.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-n5vysjolx4tqegbx"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-n5vysjolx4tqegbx.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nbjdukr7hawangge"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nbjdukr7hawangge.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nbjef7nohawangw2"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nbjef7nohawangw2.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nbjegfpahawangw7"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nbjegfpahawangw7.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nbjeglkqhawangxg"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nbjeglkqhawangxg.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nbjettfehawanhes"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nbjettfehawanhes.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nbjetztthawanhey"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nbjetztthawanhey.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nc3u2l6y0khszjv7"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nc3u2l6y0khszjv7.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-ndefkmdiofgqoavl"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-ndefkmdiofgqoavl.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-ndefnmxrofgqoayl"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-ndefnmxrofgqoayl.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-ndefqa2tofgqoa3e"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-ndefqa2tofgqoa3e.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-ndeftrg3ofgqoa6g"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-ndeftrg3ofgqoa6g.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nep224c3xecqyyl4"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nep224c3xecqyyl4.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nep22zrhxecqyyly"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nep22zrhxecqyyly.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-ngx7r4osoqhqyen2"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-ngx7r4osoqhqyen2.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-ngx7syvnoqhqyeov"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-ngx7syvnoqhqyeov.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nhrk6zuazggqejda"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nhrk6zuazggqejda.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nhrld2edzggqejgp"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nhrld2edzggqejgp.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-njmog24wwxuad46r"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-njmog24wwxuad46r.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-njmogybuwxuad46n"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-njmogybuwxuad46n.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-njmoz4mqwxuad5ms"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-njmoz4mqwxuad5ms.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-njmoz6m3wxuad5mv"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-njmoz6m3wxuad5mv.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-njmoztxtwxuad5mg"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-njmoztxtwxuad5mg.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-njmozz5iwxuad5mn"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-njmozz5iwxuad5mn.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nkyivihc2jpbw4uy"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nkyivihc2jpbw4uy.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nl7mfw3oy4xar22t"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nl7mfw3oy4xar22t.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nl7mgk3hy4xar3ji"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nl7mgk3hy4xar3ji.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nl7mhbyly4xar32v"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nl7mhbyly4xar32v.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nl7mhvp3y4xar4kn"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nl7mhvp3y4xar4kn.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nohedgkjiypk7zja"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nohedgkjiypk7zja.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nohegqjsiypk73ov"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nohegqjsiypk73ov.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nohej3hriypk75yk"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nohej3hriypk75yk.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nohenl2miyplaad3"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nohenl2miyplaad3.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nrgrpgppsbsdh2s6"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nrgrpgppsbsdh2s6.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nrgrpjyysbsdh2vg"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nrgrpjyysbsdh2vg.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nrgrpmxusbsdh2wt"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nrgrpmxusbsdh2wt.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nrgrpo5nsbsdh2yn"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nrgrpo5nsbsdh2yn.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nsxqkywul2nzcwwh"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nsxqkywul2nzcwwh.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nsxqpyiol2nzcz6t"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nsxqpyiol2nzcz6t.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nu4r55nnmn6jgrco"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nu4r55nnmn6jgrco.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nu4sd7vqmn6jguk4"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nu4sd7vqmn6jguk4.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nu4sfh6imn6jgvah"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nu4sfh6imn6jgvah.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nu4sg4ofmn6jgv46"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nu4sg4ofmn6jgv46.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nveq65dtmn6n4mnd"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nveq65dtmn6n4mnd.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nveq66tfmn6n4moi"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nveq66tfmn6n4moi.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nvph22xqmn6f554u"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvph22xqmn6f554u.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nvph327amn6f56vj"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvph327amn6f56vj.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nvph542bmn6f6adk"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvph542bmn6f6adk.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nvphwhh3mn6f52vh"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvphwhh3mn6f52vh.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nvphxecbmn6f53iw"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvphxecbmn6f53iw.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nvphyyqemn6f54nt"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvphyyqemn6f54nt.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nvpia5irmn6f6cly"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvpia5irmn6f6cly.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nvpib5mlmn6f6dbu"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvpib5mlmn6f6dbu.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nvpic4khmn6f6dxy"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvpic4khmn6f6dxy.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nvpidxmkmn6f6ekj"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvpidxmkmn6f6ekj.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nvpifs2amn6f6fvu"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvpifs2amn6f6fvu.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nvpigomemn6f6gic"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvpigomemn6f6gic.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nvpihmicmn6f6g6e"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvpihmicmn6f6g6e.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nvpiiitomn6f6hsl"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvpiiitomn6f6hsl.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nvpijy3gmn6f6ixs"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvpijy3gmn6f6ixs.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nvrm2po26teqi5p2"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrm2po26teqi5p2.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nvrm3nub6teqi6cv"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrm3nub6teqi6cv.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nvrm4onw6teqi6xu"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrm4onw6teqi6xu.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nvrm54e76teqi7uw"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrm54e76teqi7uw.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nvrn22dm6teqjrtw"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrn22dm6teqjrtw.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nvrn3wsc6teqjsfu"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrn3wsc6teqjsfu.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nvrn4uia6teqjsx6"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrn4uia6teqjsx6.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nvrn5qsm6teqjtio"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrn5qsm6teqjtio.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nvrnagwo6teqjbcm"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrnagwo6teqjbcm.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nvrnbgwq6teqjbwg"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrnbgwq6teqjbwg.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nvrncbps6teqjcjg"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrncbps6teqjcjg.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nvrndgch6teqjc77"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrndgch6teqjc77.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nvrne6cb6teqjedg"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrne6cb6teqjedg.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nvrnedv66teqjdsl"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrnedv66teqjdsl.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nvrnf46f6teqjevo"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrnf46f6teqjevo.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nvrnhmaf6teqjfud"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrnhmaf6teqjfud.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nvrni6m76teqjgs5"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrni6m76teqjgs5.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nvrnkby36teqjhil"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrnkby36teqjhil.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nvrnlb7q6teqjh4c"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrnlb7q6teqjh4c.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nvrnmyun6teqji7p"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrnmyun6teqji7p.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nvrnnucn6teqjjqw"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrnnucn6teqjjqw.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nvrno5iw6teqjkka"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrno5iw6teqjkka.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nvrnp3ts6teqjk5d"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrnp3ts6teqjk5d.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nvrnr4xp6teqjmff"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrnr4xp6teqjmff.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nvrnvhmc6teqjofq"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrnvhmc6teqjofq.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nvrnxy3i6teqjpv2"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrnxy3i6teqjpv2.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nvrnyx6n6teqjqk5"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrnyx6n6teqjqk5.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nvrnz6pm6teqjrcd"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvrnz6pm6teqjrcd.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nvzbk5oh6teux5kg"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvzbk5oh6teux5kg.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nvzbpog76teuybs7"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvzbpog76teuybs7.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nvzbs4f46teuyeu6"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvzbs4f46teuyeu6.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nvzbwb626teuyhs3"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nvzbwb626teuyhs3.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nxh32gyqgcllxdji"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nxh32gyqgcllxdji.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nxh34kbygcllxe7m"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nxh34kbygcllxe7m.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nxh356xegcllxgmt"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nxh356xegcllxgmt.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-nxh3ya7mgcllxbqv"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-nxh3ya7mgcllxbqv.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-o3d9tx3u8kd0yawc"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-o3d9tx3u8kd0yawc.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-oa7fpshyqfueqxuj"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-oa7fpshyqfueqxuj.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-oa7fvyaiqfueq5ob"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-oa7fvyaiqfueq5ob.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-obowksbdqfua65oq"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-obowksbdqfua65oq.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-obowkyf3qfua65uu"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-obowkyf3qfua65uu.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-olbibp3fylzaxvhb"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-olbibp3fylzaxvhb.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-olbinkuoylzayeoj"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-olbinkuoylzayeoj.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-olyp2b4qgnman3h6"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-olyp2b4qgnman3h6.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-olypz54qgnman3e5"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-olypz54qgnman3e5.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-oqic5sqbt25322zm"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-oqic5sqbt25322zm.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-oqicznoauwbl46am"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-oqicznoauwbl46am.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-oqidcfpsuwbl5cqd"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-oqidcfpsuwbl5cqd.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-PowerInfiniteBJ1"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-PowerInfiniteBJ1.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-psm2um7k4da8zwc2"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-psm2um7k4da8zwc2.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-qckwjf2o52r9ikeb"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-qckwjf2o52r9ikeb.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-qlrc3fq3v7p6awm4"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-qlrc3fq3v7p6awm4.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-rdefcn4sffgo39l7"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-rdefcn4sffgo39l7.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-s63nx2mpdomgjagb"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-s63nx2mpdomgjagb.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-sni5cza6d1vvl50i"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-sni5cza6d1vvl50i.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-SpeedBlackjack01"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-SpeedBlackjack01.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-SpeedBlackjack02"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-SpeedBlackjack02.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-SpeedBlackjack03"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-SpeedBlackjack03.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-SpeedBlackjack04"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-SpeedBlackjack04.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-uwd2bl2khwcikjlz"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-uwd2bl2khwcikjlz.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-xphpcthv8e6ivc16"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-xphpcthv8e6ivc16.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-xqyb2u7fqkexxpa0"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-xqyb2u7fqkexxpa0.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-xstnlyzrm345ev95"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-xstnlyzrm345ev95.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-ylq4gmw8yl22u5dj"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-ylq4gmw8yl22u5dj.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-blackjack-z5pf5pichcsw3d2o"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-blackjack-z5pf5pichcsw3d2o.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-rng~blackjack-rng~bj~standard0"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-rng~blackjack-rng~bj~standard0.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EZUGI-Blackjack_1"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-Blackjack_1.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EZUGI-Blackjack_201"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-Blackjack_201.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EZUGI-Blackjack_203"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-Blackjack_203.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EZUGI-Blackjack_204"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-Blackjack_204.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EZUGI-Blackjack_221"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-Blackjack_221.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EZUGI-Blackjack_223"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-Blackjack_223.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EZUGI-Blackjack_224"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-Blackjack_224.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EZUGI-Blackjack_225"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-Blackjack_225.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EZUGI-Blackjack_4"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-Blackjack_4.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EZUGI-Blackjack_411"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-Blackjack_411.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EZUGI-Blackjack_412"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-Blackjack_412.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EZUGI-Blackjack_421"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-Blackjack_421.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EZUGI-Blackjack_422"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-Blackjack_422.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EZUGI-Blackjack_5"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-Blackjack_5.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EZUGI-Blackjack_501"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-Blackjack_501.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EZUGI-UnlimitedBlackjack_4151"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-UnlimitedBlackjack_4151.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EZUGI-UnlimitedBlackjack_5051"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-UnlimitedBlackjack_5051.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EZUGI-UnlimitedBlackjack_51"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-UnlimitedBlackjack_51.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=VIVO-blackjack-16"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-blackjack-16.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=VIVO-blackjack-18"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-blackjack-18.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1onmbjmk9gu5imkr"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/superspadegames_1onmbjmk9gu5imkr.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-bj-1"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/7mojos_7MOJOS-bj-1.jpg"></a>
                            </div>

                        </div>
                    </div>
                    <div class="caroBox mb-4">
                        <div class="h6">Dragon Tiger Masalar&#x131;</div>
                        <div class="owl-carousel rowCaro">
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-dragontiger-DragonTiger00001"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-dragontiger-DragonTiger00001.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-dragontiger-nvpgy6frmn6f5fhr"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-dragontiger-nvpgy6frmn6f5fhr.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-rng~dragontiger-rng~dragontiger0"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-rng~dragontiger-rng~dragontiger0.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=Dt19er0d1t2iew37"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/superspadegames_Dt19er0d1t2iew37.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-dt-1"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/7mojos_7MOJOS-dt-1.jpg"></a>
                            </div>

                        </div>
                    </div>
                    <div class="caroBox mb-4">
                        <div class="h6">Casino &amp; Texas Hold&#x27;em Masalar&#x131;</div>
                        <div class="owl-carousel rowCaro">
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-dhp-DHPTable00000001"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-dhp-DHPTable00000001.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOLUTION-dhp-nvrpjuts6teqkqrs"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/evolution_EVOLUTION-dhp-nvrpjuts6teqkqrs.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EZUGI-CasinoHoldem_507000"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/ezugi_EZUGI-CasinoHoldem_507000.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=VIVO-casinoholdem-256"><img src="https://cdnawsplatinium.s3.eu-central-1.amazonaws.com/img/casino/vivo_VIVO-casinoholdem-256.jpg"></a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        iscasino = true;
    </script>




    <div class="clr mb-5"></div>

    <div class="footerBox">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="fTitle">Firma</div>
                    <div class="row">
                        <div class="col-4">
                            <ul class="fMenu">
                                <li><a href="#">Partner Program&#x131;</a></li>
                                <li><a href="#">Site Haritas&#x131;</a></li>
                                <li><a href="#">Totobo Platinium</a></li>
                            </ul>
                        </div>
                        <div class="col-4">
                            <ul class="fMenu">
                                <li><a href="#">&#x130;leti&#x15F;im</a></li>
                                <li><a href="#">K&#xFC;nye</a></li>
                                <li><a href="#">Genel &#x15E;irket &#x15E;artnamesi</a></li>
                            </ul>
                        </div>
                        <div class="col-4">
                            <ul class="fMenu">
                                <li><a href="#">Bonus</a></li>
                                <li><a href="#">&#xD6;deme Y&#xF6;ntemleri</a></li>
                                <li><a href="#">Sorumlu Oyun</a></li>
                            </ul>
                        </div>

                    </div>

                </div>

                <div class="col-md-6">
                    <div class="fTitle">&#xD6;deme Y&#xF6;ntemleri</div>
                    <div class="fPays">
                        <a href="#"><img src="/img/paysafe.png" width="148"></a>
                        <a href="#"><img src="/img/eco.png" width="70"></a>
                        <a href="#"><img src="/img/skrill.png" width="70"></a>
                    </div>
                </div>

            </div>

            <div class="footerText">
                <div>
                    Uyarı: Oyun oynamak ve bahis yapmak eğlenceli aynı zamanda kazançlı olabilir. Fakat her zaman kazanamayabilirsiniz. Lütfen bilinçli oynayınız.<br> Üyelik yaşı 18 ve üzeridir.<br>
                </div>
            </div>

        </div>

    </div>

    <input type="hidden" id="locker" autocomplete="off" value="0" />

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


    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="/assets/bootstrap/js/popper.min.js"></script>
    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/microsoft-signalr/3.1.7/signalr.min.js"></script>
    <script src="/assets/owl2/owl.carousel.min.js"></script>
    <script src="/assets/range/bootstrap-slider.js"></script>
    <script src="/assets/plugins/toastr.min.js"></script>
    <script src="/assets/js/jquery.lazyload.min.js"></script>
    <script src="/assets/js/jquery.lazy.min.js"></script>

    
    <script src="/assets/hammer.js"></script>
    <script src="/assets/jquery.hammer.js"></script>
    <script src="/assets/Custom.js"></script>



    
</body>

</html>