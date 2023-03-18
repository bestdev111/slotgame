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
<!DOYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

     <title><? if(userayar('site_adi')!=''){ ?><?=userayar('site_adi');?><? } else { ?><?=$site_adi;?><? } ?> | <?=getTranslation('sporbahis')?></title>
    <meta name="referrer" content="no-referrer">
    <link rel="preconne" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/fa/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/owl2/owl.carousel.min.css" />
    <link rel="stylesheet" href="/assets/linear/style.css">
    <link href="/assets/range/css/bootstrap-slider.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.css" rel="stylesheet">
    <link href="/assets/plugins/toastr.min.css" rel="stylesheet" />
    <link href="/assets/css/style.css" rel="stylesheet">
    
    <link rel="apple-touch-icon" href="/assets/img/totobo.png">
    <link rel="icon" type="image/png" href="mb/assets/img/apple-touch-icon-pi.png">
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
                                <form method="post" aion="/Search/SearchWeb" id="FormSearch">
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
                                <li>                          </li>
                                <li><a href="/sanal-spor">Sanal Spor</a></li>
                                
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="userRightMenu">
                            <a href="/players/" class="sccs"><img src="/img/lg2.png" /><small>Hesabım</small></a>
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
$loginsor = sed_sql_query("sele * from login_data WHERE login_user='".$ub['username']."' ORDER BY id desc LIMIT 1");
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
                <img src="/img/slider/casino/casino2-1.jpg">
            </div>
            <div class="item">
                <img src="/img/slider/casino/casino1-1.jpg">
            </div>

        </div>
        <div class="container">

            <div class="owl-carousel _1itemSlide mb-3 d-none d-lg-block" id="sliderHome">
                <div class="item">
                    <img src="/img/slider/casino/casino2-1.jpg">
                </div>
                <div class="item">
                    <img src="/img/slider/casino/casino1-1.jpg">
                </div>
            </div>
            <div class="caroList mb-4">
                <div class="owl-carousel listCaro text-center">
                    <div class="item"><a href="/">Ana Sayfa</a></div>

                    <div class="item"><a href="/slots">Slot</a></div>
                    <div class="item"><a href="/novomatic">NOVOMATIC</a></div>
                    <div class="item"><a href="/praatic">PRAATIC</a></div>
                    <div class="item"><a href="/egt">EGT</a></div>
                    <div class="item"><a href="/amatic">AMATIC</a></div>
                    <div class="item"><a href="/playtech">PLAYTECH</a></div>
                    <div class="item"><a href="/gamomat">GAMOMAT</a></div>
                    <div class="item"><a href="/casinotechnology">CT-GAMES</a></div>
                    <div class="item"><a href="/isoftbet">ISOFTBET</a></div>
                    <div class="item"><a href="/wazdan">WAZDAN</a></div>

                </div>

            </div>
            
            <div class="row">
                <div class="col-3">
                    <div class="position-relative w-100 h-100 d-flex">
                        <seion class="position-absolute w-100 h-100 categories">
                            <span class="d-flex align-items-center justify-content-between category-title">
                            <span>Sağlayıcılar</span>
                            
                            </span>
                            <div class="category-search">
                                <input id="category-search" placeholder="Sağlayıcılara Göre Arama" type="text">
                            </div>
                            <seion class="category-list-container">
                                <div class="category-list">
                                    <a href="/novomatic" class="category-item" data-title="novomatic">
            <span class="ico-slots ico-slots-novomatic">Novomatic</span>
        </a>
                                    <a href="/" class="category-item" data-title="">
            <span class="ico-slots ico-slots-"></span>
        </a>
        <a href="/amatic" class="category-item" data-title="amatic">
            <span class="ico-slots ico-slots-amatic">Amatic</span>
        </a>
                                    
                                    <a href="/praatic" class="category-item" data-title="netent">
            <span class="ico-slots ico-slots-praaticplay">Praatic Play</span>
        </a>              
                                    
                                    <a href="/casinotechnology" class="category-item" data-title="casinotechgaming">
            <span class="ico-slots ico-slots-casinotechgaming">Casino Technology</span>
        </a>
                                    
                                   
                                    
                                    <a href="/games" class="category-item" data-title="-games">
            <span class="ico-slots ico-slots-conceptgaming">-games</span>
        </a>
                                   
                                                   
                                    <a href="/merkur" class="category-item" data-title="merkur">
            <span class="ico-slots ico-slots-merkur">Merkur</span>
        </a>
                                   <a href="/wazdan" class="category-item" data-title="wazdan">
            <span class="ico-slots ico-slots-wazdan">Wazdan</span>
        </a>
                                    

                                </div>
                            </seion>
                            <br/><br/>
                           <seion class="position-absolute w-100 h-100 categories">
                            <span class="d-flex align-items-center justify-content-between category-title">
                            <span>&nbsp;&nbsp;&nbsp;CANLI CASINO OYUNLARI<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OYNA</span>
                            
                            </span>
                            
                        <seion class="category-list-container">
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
                                    <a href="/Casino/LiveDetail?c=7mojos" class="category-item" data-title="praatic">
            <span class="ico-slots ico-slots-praaticplay">7Mojos</span>
        </a>
                                </div>
                            </seion>
                    </div>
                </div>
                
                <div class="col-9 caro-rows">
                    <div class="caroBox mb-4">
                        <div class="h5"><b></b><a href ="/novomatic">NOVOMATİC</b></a></div>
                        <div class="owl-carousel rowCaro">
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs20fruitsw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Actionjoker.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SMARTSOFT-Cappadocia_GamesLobby"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Africansimba.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SPRIBE-aviator"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Africanstampede.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs20godiva"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Ageofprivateers.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=211"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Alchemistssecret.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BM-6087befc9e1ee6001afdf220"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Alwayshotdeluxe.jpg"></a>
                            </div>
                            
                            <div class="item">
                                <a href="/Casino/Game?c=WZ-MagicHot4"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Amazingsevens.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=FILS-144"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Amazonsdiamonds.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=HB-AllAmericanPoker1Hand"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Ancientgoddess.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Arivaariva.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Asgardsthunder.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Asiandiamonds.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Autodromo.jpg"></a>
                            </div>
                             <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Bankraid.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Beachholidays.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Beautyofcleopatra.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Beetlemania.jpg"></a>
                            </div>
                             <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Blazingjolly.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Blazingriches.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Bookoffate.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Bookofmaya.jpg"></a>
                            </div>
                             <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Bookofraclassic.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Bookofradeluxe6.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Bookofradeluxe.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Bookoframagic.jpg"></a>
                            </div>
                             <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico//Bookofstars.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Burningwild.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Captainventure.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Cashrunner.jpg"></a>
                            </div>
                             <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Chicago.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Cindereela.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Coinofapollo.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Columbusdeluxe.jpg"></a>
                            </div>
                             <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Dolphinspearlclassic.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Dolphinspearldeluxe.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Dragonsdeep.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Dragonwarrior.jpg"></a>
                            </div>
                             <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Empirev.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Extremeriches.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Eyeofthedragon.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Eyeofthequeen.jpg"></a>
                            </div>
                             <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Faust.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Fiftyfortunedice.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Fiftyfortunefruits.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Flamedancer.jpg"></a>
                            </div>
                             <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Flamencoroses.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Fruitfarm.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Fruitmagic.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Fruitsnsevensdeluxe.jpg"></a>
                            </div>
                             <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Goldenark.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Goldenreel.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Gorgeousgoddess.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Gorilla.jpg"></a>
                            </div>
                             <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Grandslamcasino.jpg"></a>
                            </div>
                             <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Gryphonsgolddeluxe.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Helena.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Hoffmeister.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Hotcubes.jpg"></a>
                            </div>
                             <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Indianspiritdeluxe.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Islandheat.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Jokeraction6.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Jollyreels.jpg"></a>
                            </div>
                             <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Jumpingjokers.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Katana.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Kingofcards.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Kingsjester.jpg"></a>
                            </div>
                             <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Lordoftheocean.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Lordoftheoceanmagic.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Lovelymermaid.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Luckyladyscharmdeluxe6.jpg"></a>
                            </div>
                             <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Luckyladyscharmdeluxe.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Magic81.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Magicwindow.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Mermaidspearldeluxe.jpg"></a>
                            </div>
                             <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Mysticsecrets.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Oceantale.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Orca.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Pharaohsring.jpg"></a>
                            </div>
                             <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Pharaohstomb.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Plentyoffruit20.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Plentyoffruit40.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Plentyontwenty.jpg"></a>
                            </div>
                             <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Plentyontwentyiihot.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Queencleopatra.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Redhot20.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Redhot40.jpg"></a>
                            </div>
                               <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Redhotburning.jpg"></a>
                            </div>
                             <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Redhotfruits.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Redlady.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Roaringforties.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Roaringwilds.jpg"></a>
                            </div>
                             <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Royallotus.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Sizzling6.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Sizzlinggems.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Sizzlinghotdeluxe.jpg"></a>
                            </div>
                             <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Suprahot.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Totallywild.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Ultrahotdeluxe.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Xtrahot.jpg"></a>
                            </div>
                             
                    </div>
                    <div class="caroBox mb-4">
                        <div class="h5"></div>
                        <div class="owl-carousel rowCaro">
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs5super7">
                                    <img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/ActionMoney.jpg"></a>
                
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs40wanderw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/AgeOfTroy.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs4096magician"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/AlmightyRamsesII.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243fortseren"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/AlohaParty.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243dancingpar"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/AmazingAmazonia.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/AmazonStory.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/AmazonsBattle.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-uch"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/AztecGlory.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-ua"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/BigJourney.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-rw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/BlueHeart.jpg"></a>
                            </div>
              
              
              
              
              <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs5super7">
                                    <img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/BonusPoker.jpg"></a>
                
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs40wanderw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/BookOfMagic.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs4096magician"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/BurningDice5.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243fortseren"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/BurningDice40.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243dancingpar"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/BurningDice.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/BurningHeart5.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/BurningHeart10.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-uch"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/BurningHot6Reels5.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-ua"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/BurningHot6Reels40.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-rw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/BurningHot20.jpg"></a>
                            </div>

                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs5super7">
                                    <img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/BurningHot40.jpg"></a>
                
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs40wanderw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/BurningHot100.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs4096magician"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/CaramelDice.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243fortseren"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/CaramelHot.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243dancingpar"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/CashmirGold.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/CasinoMania.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Cats100.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-uch"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/CatsRoyal.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-ua"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/CoralIsland.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-rw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/CrazyBugsII.jpg"></a>
                            </div>
              
              
              
              
              <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs5super7">
                                    <img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/DarkQueen.jpg"></a>
                
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs40wanderw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/DazzlingHot5.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs4096magician"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/DazzlingHot20.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243fortseren"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Diamonds20.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243dancingpar"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Dice81.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/DiceAndRoll40.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/DiceAndRoll.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-uch"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/DiceOfMagic.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-ua"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/DiceOfRa.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-rw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/DragonReels.jpg"></a>
                            </div>
              
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs5super7">
                                    <img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/DragonSpirit.jpg"></a>
                
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs40wanderw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/EgyptSky.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs4096magician"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/ExtraJoker.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243fortseren"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/ExtraStars.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243dancingpar"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/ExtremelyHot.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/FastMoney.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/FlamingDice.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-uch"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/FlamingHot.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-ua"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/ForestBand.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-rw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/ForestTale.jpg"></a>
                            </div>
              
              
              
              
              <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs5super7">
                                    <img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/FortuneSpells.jpg"></a>
                
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs40wanderw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/FrogStory.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs4096magician"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/FruitsKingdom.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243fortseren"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/GameOfLuck.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243dancingpar"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/GeniusOfLeonardo.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/GraceOfCleopatra.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Great27.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-uch"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/GreatAdventure.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-ua"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/GreatEgypt.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-rw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/GreatEmpire.jpg"></a>
                            </div>

                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs5super7">
                                    <img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Halloween.jpg"></a>
                
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs40wanderw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Horses50.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs4096magician"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/HotAndCash.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243fortseren"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/HotDice5.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243dancingpar"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/IceDice.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/ImperialDice.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/ImperialWars.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-uch"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/IncaGoldII.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-ua"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/JacksOrBetter.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-rw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/JokerPoker.jpg"></a>
                            </div>
              
              
              
              
              <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs5super7">
                                    <img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/JokerReels20.jpg"></a>
                
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs40wanderw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/JuggleFruits.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs4096magician"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/JungleAdventure.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243fortseren"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/KangarooLand.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243dancingpar"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Keno.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/LegendaryRome.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/LikeADiamonds20.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-uch"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/LikeADiamonds40.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-ua"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/LuckyAndWild20.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-rw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/LuckyAndWild40.jpg"></a>
                            </div>
              
                        
                        <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs5super7">
                                    <img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/LuckyBuzz.jpg"></a>
                
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs40wanderw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/LuckyHot.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs4096magician"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/LuckyKing40.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243fortseren"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Magellan.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243dancingpar"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/MajesticForest.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/MayanSpirit.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/MegaClover.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-uch"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/NeonDice.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-ua"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/OceanRush.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-rw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/OilCompanyII.jpg"></a>
                            </div>

                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs5super7">
                                    <img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/OlympusGlory.jpg"></a>
                
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs40wanderw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/PenguinStyle.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs4096magician"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/QueenOfRio.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243fortseren"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/RainbowDice.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243dancingpar"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/RainbowQueen.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/RetroStyle.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/RichWorld.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-uch"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/RiseOfRa.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-ua"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/RollingDice.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-rw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/RouteOfMexico.jpg"></a>
                            </div>
              
              
              
              
              <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs5super7">
                                    <img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/RoyalGardens.jpg"></a>
                
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs40wanderw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/RoyalSecrets.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs4096magician"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/SavannasLife.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243fortseren"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/SecretOfAlchemy.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243dancingpar"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/SecretsOfLondon.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/ShiningCrown.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/SpanishPassions.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-uch"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/SpicyDice.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-ua"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/SpicyFruits.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-rw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/StoryOfAlexandr.jpg"></a>
                            </div>
                        
                        <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs5super7">
                                    <img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/SummerBliss.jpg"></a>
                
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs40wanderw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/SummerBliss.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs4096magician"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Super20.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243fortseren"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/SuperDice20.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243dancingpar"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/SuperDice40.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/SuperDice100.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/SuperHot20.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-uch"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/SuperHot40.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-ua"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/SuperHot100.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-rw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/SupremeDice.jpg"></a>
                            </div>
              
                        
                        <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs5super7">
                                    <img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/SupremeHot.jpg"></a>
                
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs40wanderw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/SweetCheese.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs4096magician"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/TheExplorers.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243fortseren"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/TwoDragons.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243dancingpar"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/UltimateHot.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/VampireNight.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/VeneziaDoro.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-uch"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/VersaillesGold.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-ua"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/VirtualRoulette.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-rw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/VolcanoWealth.jpg"></a>
                            </div>

                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs5super7">
                                    <img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/WhiteWolf.jpg"></a>
                
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs40wanderw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Wins27.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs4096magician"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Wins81.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243fortseren"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/WitchesCharm.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243dancingpar"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/WonderHeart.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/WonderTree.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10bookoftut"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/ZodiacWheel.jpg"></a>
                            </div>
                            
                        
                    </div>
                    <div class="caroBox mb-6">
                        <div class="h5">AMATIC </div>
                        <div class="owl-carousel rowCaro">
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-sweetyhoneyfruity_mobile_html_sw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/AdmiralNelson.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-dazzle_not_mobile_sw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/AllAmericanPoker.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=KA-LuckyCat"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/AllWaysFruits.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BF-BFGa4508224-3475-11e6-ac61-9e71128cae77"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/AllWaysJoker.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-vegasnightlife_mobile_html_sw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/AllWaysWin.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-STARSTACKS2Q9"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/ArisingPhoenix.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-DRAGONSLOT5U5"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/AztecSecret.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EGP-slot.fluoParty"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/BeautyFairy.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-hotandwin"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/BeautyWarrior.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-spinsane_mobile_html_sw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/BellsOnFire.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=FAZI-HotStars"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/BellsOnFireHot.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=ENDORPHINA-endorphina2_LuxuryLife@ENDORPHINA"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Billyonaire.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BM-5d5c05447c4c0b0016a7890f"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/BillysGame.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BETSOLUTION-5003_produid=1"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Bingo.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-MAGICGEMS8F2"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/BlueDolphin.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOPLAY-1614"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/BookOfAztec.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-joker_expand_40_mob"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/BookOfFortune.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BELATRA-mars100"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/BookOfLords.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=G208"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/BookOfPharao.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=HB-SGNaughtySanta"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/BookOfQueen.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_queen_mega"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Casanova.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-41"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/CoolDiamonds2.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243lionsgold"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/DeucesWild.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-45"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/DiamondCats.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=CG-4004"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/DiamondMonkey.jpg"></a>
                            </div>
                             
                             
                             <div class="item">
                                <a href="/Casino/Game?c=NETENT-sweetyhoneyfruity_mobile_html_sw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/DiamondsOnFire.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-dazzle_not_mobile_sw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/DragonsGift.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=KA-LuckyCat"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/DragonsKingdom.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BF-BFGa4508224-3475-11e6-ac61-9e71128cae77"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/DragonsPearl.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-vegasnightlife_mobile_html_sw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/EnchantedCleopatra.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-STARSTACKS2Q9"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/EyeOfRa.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-DRAGONSLOT5U5"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/FireAndIce.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EGP-slot.fluoParty"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/FireQueen.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-hotandwin"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/FlyingDutchman.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-spinsane_mobile_html_sw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/FortunasFruits.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=FAZI-HotStars"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/FruitExpress.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=ENDORPHINA-endorphina2_LuxuryLife@ENDORPHINA"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/FruitPoker.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BM-5d5c05447c4c0b0016a7890f"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/GemStar.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BETSOLUTION-5003_produid=1"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/GoldenBook.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-MAGICGEMS8F2"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/GoldenJoker.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOPLAY-1614"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/GrandCasanova.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-joker_expand_40_mob"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/GrandFruits.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BELATRA-mars100"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/GrandTiger.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=G208"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/GrandX.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=HB-SGNaughtySanta"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Hot7.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_queen_mega"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Hot7Dice.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-41"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Hot27.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243lionsgold"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Hot40.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-45"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Hot81.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=CG-4004"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/HotChoice.jpg"></a>
                            </div>
                             
                             
                             <div class="item">
                                <a href="/Casino/Game?c=NETENT-sweetyhoneyfruity_mobile_html_sw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/HotDiamonds.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-dazzle_not_mobile_sw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/HotFruits20.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=KA-LuckyCat"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/HotFruits100.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BF-BFGa4508224-3475-11e6-ac61-9e71128cae77"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/HottestFruits20.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-vegasnightlife_mobile_html_sw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/HottestFruits40.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-STARSTACKS2Q9"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/JacksOrBetter.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-DRAGONSLOT5U5"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/JokerCard.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EGP-slot.fluoParty"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/JokerPoker.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-hotandwin"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/KingsCrown.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-spinsane_mobile_html_sw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/LaGranAventura.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=FAZI-HotStars"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/LadyJoker.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=ENDORPHINA-endorphina2_LuxuryLife@ENDORPHINA"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/LovelyLady.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BM-5d5c05447c4c0b0016a7890f"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/LuckyBells.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BETSOLUTION-5003_produid=1"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/LuckyJoker5.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-MAGICGEMS8F2"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/LuckyJoker20.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOPLAY-1614"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/LuckyZodiac.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-joker_expand_40_mob"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/MagicForest.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BELATRA-mars100"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/MagicIdol.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=G208"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/MagicOwl.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=HB-SGNaughtySanta"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/MermaidsGold.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_queen_mega"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/MerryFruits.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-41"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/MultiWin.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs243lionsgold"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/MultiWinTriple.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-45"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/PartyNight.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=CG-4004"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/PartyTime.jpg"></a>
                            </div>
                             
                             
                             <div class="item">
                                <a href="/Casino/Game?c=NETENT-sweetyhoneyfruity_mobile_html_sw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/RedChilli.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-dazzle_not_mobile_sw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/RomanLegion.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=KA-LuckyCat"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/RouletteRoyal.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BF-BFGa4508224-3475-11e6-ac61-9e71128cae77"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/RoyalUnicorn.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-vegasnightlife_mobile_html_sw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/SakuraFruits.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-STARSTACKS2Q9"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/SakuraSecret.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-DRAGONSLOT5U5"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/TensOrBetter.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EGP-slot.fluoParty"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/TweetyBirds.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-hotandwin"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Ultra7.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-spinsane_mobile_html_sw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Vampires.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=FAZI-HotStars"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Wild7.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=ENDORPHINA-endorphina2_LuxuryLife@ENDORPHINA"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/WildDiamonds.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BM-5d5c05447c4c0b0016a7890f"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/WildDragon.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BETSOLUTION-5003_produid=1"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/WildRespin.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-MAGICGEMS8F2"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/WildShark.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOPLAY-1614"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/WildStars.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-joker_expand_40_mob"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/WolfMoon.jpg"></a>
                            </div>
                            
                        </div>
                    </div>
                    <div class="caroBox mb-4">
                        <div class="h5">PRAGATIC </div>
                        <div class="owl-carousel rowCaro">
                            <div class="item">
                                <a href="/Casino/Game?c=WOOHOO-1899"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/SweetBonanza.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=OT-5d47e944bcedef000179261e"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/SweetBonanzaXmas.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-1074"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/BonanzaGold.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOPLAY-5170"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/GreatRhino.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=OT-5ad87ffd407e8f01eb80849c"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/AncientEgypt.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SG-C-TF01"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/AztecGems.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=OT-5ad87fe7407e8f01eb80849a"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/JokersJewel.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=FAZI-TripleDice"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Dragons888.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=HELIOGAMING-heromillions"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/PekingLuck.jpg"></a>
                            </div>
                            
                        </div>
                    </div>
                    <div class="caroBox mb-4">
                        <div class="h5">PLAYTECH</div>
                        <div class="owl-carousel rowCaro">
                            <div class="item">
                                <a href="/Casino/Game?c=BM-5e732986ba03bd00171b05bb"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/AgeOfEgypt.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SMARTSOFT-VirtualClassicRoulette_Roulette"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/AgeOfGodsKingofOlympus.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BM-580dc69068712a00a9000018"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/AgeOfTheGodsGodOfStorms.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BM-5f3153ec737b43008ed75bb6"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/AnacondaWild.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-8045"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Archer.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BM-6087befc9e1ee6001afdf220"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/BaiShi.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-1036"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/BermudaTriangle.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EGP-card.blackjack.normal"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/BerryBerryBonanza.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-blackjack3_mobile_html_sw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/BonusBears.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-60uch"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/BuffaloBlitz.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=new-classic-cherries"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/CaptainsTreasurePT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10egyptcls"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/CherryLove.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-uch"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/ChineseKitchen.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=classic-cherries-evolution"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/ChristmasBellsJP.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-50"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/CoinCoinCoin.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BF-BFGhot-classic"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Crazy7.jpg"></a>
                            </div>
                             
                             <div class="item">
                                <a href="/Casino/Game?c=BM-5e732986ba03bd00171b05bb"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/DesertTreasure.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SMARTSOFT-VirtualClassicRoulette_Roulette"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/DolphinReef.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BM-580dc69068712a00a9000018"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/DragonChampions.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BM-5f3153ec737b43008ed75bb6"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/EasterSurprise.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-8045"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/EpicApe.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BM-6087befc9e1ee6001afdf220"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/FeiCuiGongZhuJP.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-1036"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/FountainOfYouth.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EGP-card.blackjack.normal"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/FunkyMonkeyJP.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-blackjack3_mobile_html_sw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/GeishaStory.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-60uch"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/GoldenTour.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=new-classic-cherries"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/GreatBlueJP.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10egyptcls"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/GreatBlue.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-uch"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/HalloweenFortune.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=classic-cherries-evolution"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/HighwayKings.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-50"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/HotGems.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BF-BFGhot-classic"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/IrishLuck.jpg"></a>
                            </div>
                             <div class="item">
                                <a href="/Casino/Game?c=BM-5e732986ba03bd00171b05bb"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/JackpotBells.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SMARTSOFT-VirtualClassicRoulette_Roulette"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/JackpotBells.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BM-580dc69068712a00a9000018"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/JacksOrBetterMH.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BM-5f3153ec737b43008ed75bb6"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/JacksOrBetter.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-8045"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/JiXiang8PT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BM-6087befc9e1ee6001afdf220"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/LieYanZuanShi.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-1036"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/MedusaMonstersPT.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EGP-card.blackjack.normal"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/MrCashback.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-blackjack3_mobile_html_sw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/NianNianYouYu.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-60uch"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/NightOut.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=new-classic-cherries"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/PantherMoon.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10egyptcls"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/PrinceOfOlympusJP.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-uch"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/PurpleHot.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=classic-cherries-evolution"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Rocky.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-50"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/RomeAndGlory.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BF-BFGhot-classic"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/RouletteClassic.jpg"></a>
                            </div>
                             
                             <div class="item">
                                <a href="/Casino/Game?c=BM-5e732986ba03bd00171b05bb"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/RulerOfTheSkyJP.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SMARTSOFT-VirtualClassicRoulette_Roulette"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/RulersOfOlympus.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BM-580dc69068712a00a9000018"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/SafariHeat.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BM-5f3153ec737b43008ed75bb6"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/SantaSurprise.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-8045"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/SherlockMystery.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BM-6087befc9e1ee6001afdf220"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/SilentSamurai.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-1036"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/SilverBullet.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EGP-card.blackjack.normal"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/SinbadsGoldenVoyage.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-blackjack3_mobile_html_sw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/SunWukong.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-60uch"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/ThaiParadise.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=new-classic-cherries"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/TigerClaw.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs10egyptcls"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/TrueLove.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=7MOJOS-uch"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/VacationStationDeluxe.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=classic-cherries-evolution"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/VacationStation.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-50"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/WaysOfPhoenix.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BF-BFGhot-classic"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/ZhaoCaiJinBao.jpg"></a>
                            </div>
                              <div class="item">
                                <a href="/Casino/Game?c=classic-cherries-evolution"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/WildBeats.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-50"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/WuLong.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BF-BFGhot-classic"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/WhiteKing.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-50"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/YunCongLong.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BF-BFGhot-classic"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/ZhaoCaiJinBaoJP.jpg"></a>
                            </div>
                        </div>
                    </div>
                    <div class="caroBox mb-4">
                        <div class="h5">GAMOMAT </div>
                        <div class="owl-carousel rowCaro">
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2087"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/AncientMagic.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2078"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/AncientRichesCasino.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-POTSOLUCK4H6"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/AncientRichesCasinoRedHotFirepot.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2114"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/BeautifulNature.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-84"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/BlackBeauty.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SPINMATIC-1730"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/BookOfMoorhuhn.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=VIBRAGAMING-SCRATCHCARDMULTINIVEL9A7"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/BookOfMoorhuhnGoldenNights.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-96"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/BookOfRomeoAndJulia.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2086"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/BookOfTheAges.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-89"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/CrystalBall.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2094"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/CrystalBallGoldenNights.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOPLAY-5491"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/CrystalBallRedHotFirepot.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2092"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/DiscOfAthena.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2087"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Explodiac.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2078"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/ExplodiacRedHotFirepot.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-POTSOLUCK4H6"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/FancyFruits.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2114"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/FancyFruitsGoldenNights.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-84"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/FancyFruitsRedHotFirepot.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SPINMATIC-1730"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/ForeverDiamonds.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=VIBRAGAMING-SCRATCHCARDMULTINIVEL9A7"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/FruitMania.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-96"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/FruitManiaGoldenNights.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2086"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/FruitManiaRHFP.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-89"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/GatesOfPersia.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2094"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/GlamorousTimes.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOPLAY-5491"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/GoldenTouch.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2092"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/KingAndQueen.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2087"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/KingOfTheJungle.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2078"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/KingOfTheJungleGoldenNights.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-POTSOLUCK4H6"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/KingOfTheJungleRedHotFirepot.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2114"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/MaaaxDiamonds.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-84"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/MaaaxDiamondsGoldenNights.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SPINMATIC-1730"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/MagicStone.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=VIBRAGAMING-SCRATCHCARDMULTINIVEL9A7"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/MightyDragon.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-96"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/NightWolves.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2086"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/OldFisherman.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-89"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/PhantomsMirror.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2094"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/PharaosRiches.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOPLAY-5491"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/PharaosRichesGoldenNights.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2092"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/PharaosRichesRedHotFirepot.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-84"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/RamsesBook.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SPINMATIC-1730"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/RamsesBookGoldenNights.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=VIBRAGAMING-SCRATCHCARDMULTINIVEL9A7"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/RamsesBookRedHotFirepot.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-96"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/RoyalSeven.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2086"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/RoyalSevenGoldenNights.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-89"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/RoyalSevenXXL.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2094"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/RoyalSevenXXLRHFP.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOPLAY-5491"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/SavannaMoon.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2092"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/SimplyTheBest.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2087"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/SuperDuperCherry.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2078"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/SuperDuperCherryRedHotFirepot.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-POTSOLUCK4H6"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/SuperDuperMoorhuhn.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2114"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/TheExpandable.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-84"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/TheLandOfHeroes.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SPINMATIC-1730"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/TheLandOfHeroesGoldenNights.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=VIBRAGAMING-SCRATCHCARDMULTINIVEL9A7"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/TheMightyKing.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-96"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/WildRapaNui.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2086"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/WildRubies.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PP-89"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/WildRubiesGoldenNights.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=1X2-2094"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/WildsGoneWild.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=EVOPLAY-5491"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/XplodingPumpkins.jpg"></a>
                            </div>
                            
                        </div>
                    </div>
                    
                    </div>
                    <div class="caroBox mb-4">
                        <div class="h5">-GAMES</div>
                        <div class="owl-carousel rowCaro">
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs20fruitsw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/AmericanGigolo.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SMARTSOFT-Cappadocia_GamesLobby"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/BananaParty.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SPRIBE-aviator"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/BavarianForest.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs20godiva"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/BeetleStar.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=211"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/BigJoker.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BM-6087befc9e1ee6001afdf220"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/BrilliantsHot.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=WZ-MagicHot4"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/CloverParty.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=FILS-144"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/CombatRomance.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=HB-AllAmericanPoker1Hand"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/DesertTales.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/EggAndRooster.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/ForestNymph.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/FruitsOfDesire.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/FullOfLuck.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs20fruitsw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/FusionFruitBeat.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SMARTSOFT-Cappadocia_GamesLobby"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/GroovyAutomat.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SPRIBE-aviator"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/JadeHeaven.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs20godiva"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/LuckyClover.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=211"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/MegaSlot40.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BM-6087befc9e1ee6001afdf220"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/MightyRex.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=WZ-MagicHot4"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/MiladyX2.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=FILS-144"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/NavyGirl.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=HB-AllAmericanPoker1Hand"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/PurpleHot2.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/ShiningJewels40.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/ShiningTreasures.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/StarParty.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Treasure40.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs20fruitsw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/TreasureHill.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SMARTSOFT-Cappadocia_GamesLobby"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/TreasureKingdom.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SPRIBE-aviator"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/WetAndJuicy.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs20godiva"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/WildClover.jpg"></a>
                            </div>
                            
                        </div>
                    </div>
                    
                    
                    <div class="caroBox mb-4">
                        <div class="h5">ISOFTBET</div>
                        <div class="owl-carousel rowCaro">
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs20fruitsw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/AztecGoldMegaways.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SMARTSOFT-Cappadocia_GamesLobby"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/FishingForGold.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SPRIBE-aviator"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/GhostsNGold.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs20godiva"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/HotSpinDeluxe.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=211"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/LostBoysLoot.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BM-6087befc9e1ee6001afdf220"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/LuckyLeprechaun.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=WZ-MagicHot4"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/RacetrackRiches.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=FILS-144"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/SheriffOfNotingham.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=HB-AllAmericanPoker1Hand"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/StacksOGold.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/TheGoldenCity.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/WildApe.jpg"></a>
                            </div>
                            

                        </div>
                    </div>
                    
                    <div class="caroBox mb-4">
                        <div class="h5">WAZDAN</div>
                        <div class="owl-carousel rowCaro">
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs20fruitsw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/CaptainShark.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SMARTSOFT-Cappadocia_GamesLobby"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/CorridaRomance.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=SPRIBE-aviator"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/DemonJack27.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PRPLAY-vs20godiva"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/FruitFiesta.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=211"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/GreatBookOfMagicDeluxe.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=BM-6087befc9e1ee6001afdf220"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/GreatBookOfMagic.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=WZ-MagicHot4"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/HighwayToHellDeluxe.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=FILS-144"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/HighwayToHell.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=HB-AllAmericanPoker1Hand"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/HotParty.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/LuckyFortune.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/LuckyQueen.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/MagicHot.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/MagicOfTheRing.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/Sizzling777.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.net/frontend/euroslots/ico/SuperHot.jpg"></a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





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
                        <a href="#"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="/img/paysafe.png" width="148"></a>
                        <a href="#"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="/img/eco.png" width="70"></a>
                        <a href="#"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="/img/skrill.png" width="70"></a>
                    </div>
                </div>

            </div>

            <div class="footerText">
                <div>
                    Uyarı: Oyun oynamak ve bahis yaak eğlenceli aynı zamanda kazançlı olabilir. Fakat her zaman kazanamayabilirsiniz. Lütfen bilinçli oynayınız.<br> Üyelik yaşı 18 ve üzeridir.<br>
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
            _SistemBet: "Bir sistem bahisi ile ya&#x131;&#x15F; oldu&#x11F;unuz b&#xFC;t&#xFC;n bahisleriniz tutmasa bile kazanabilirsiniz. Bir sistem bahisi birka&#xE7; tane bahisin kombine edilmesinden olu&#x15F;ur. Kombinasyon imkanlar&#x131; bahis kuponunda g&#xF6;r&#xFC;nt&#xFC;lenmektedir. Bir sistem bahsi birka&#xE7; kombinasyon bahisinden olu&#x15F;ur. Se&#xE7;ilen kombinasyonlar&#x131;n say&#x131;s&#x131;na ba&#x11F;l&#x131; olarak, toplam bahise yat&#x131;r&#x131;lmas&#x131; gerekli miktar ve maksimum geri &#xF6;deme hesaplanmaktad&#x131;r.",
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
            _UserNameMustBeMinimum4Charaers: "Kullan&#x131;c&#x131; Ismi minimum 4 Karakter olmal&#x131;d&#x131;r",
            _IfUouDoThis: "E&#x11F;er bu i&#x15F;lemi yaparsan&#x131;z kullan&#x131;c&#x131;n&#x131;n ba&#x11F;l&#x131; oldu&#x11F;u b&#xFC;t&#xFC;n hesaplar Kapat&#x131;lacakt&#x131;r.",
            _IfUouDoThis1: "E&#x11F;er bu i&#x15F;lemi yaparsan&#x131;z kullan&#x131;c&#x131;n&#x131;n ba&#x11F;l&#x131; oldu&#x11F;u b&#xFC;t&#xFC;n hesaplar A&#xE7;&#x131;lacakt&#x131;r.",
            _Yep: "Evet",
            _No: "Hay&#x131;r",
            _PleaseSeleUser: "L&#xFC;tfen kullanici secin ",
            _All: "T&#xFC;m&#xFC;",
            _TheTermYouAreLooking: "Arad&#x131;&#x11F;&#x131;n&#x131;z terim en az 3 karakter i&#xE7;ermelidir.",
            _Score: "Skor",
            _Live1: "live",
            _SistemBet: "Bir sistem bahisi ile ya&#x131;&#x15F; oldu&#x11F;unuz b&#xFC;t&#xFC;n bahisleriniz tutmasa bile kazanabilirsiniz. Bir sistem bahisi birka&#xE7; tane bahisin kombine edilmesinden olu&#x15F;ur. Kombinasyon imkanlar&#x131; bahis kuponunda g&#xF6;r&#xFC;nt&#xFC;lenmektedir. Bir sistem bahsi birka&#xE7; kombinasyon bahisinden olu&#x15F;ur. Se&#xE7;ilen kombinasyonlar&#x131;n say&#x131;s&#x131;na ba&#x11F;l&#x131; olarak, toplam bahise yat&#x131;r&#x131;lmas&#x131; gerekli miktar ve maksimum geri &#xF6;deme hesaplanmaktad&#x131;r.",
            _TheGameDoesNot: "Oyun detay g&#xF6;sterimini desteklemiyor.",
            _halfLive: "Devre",
            _langSec: "tr",
            _currency: "TRY",
            _currencySym: "&#x20BA;",
            _UnauthorizedUser: "Yetkisiz Kullanıcı",
            _UserPassive: "Kullanıcı Pasif",
            _UserNameOrPassword: "Kullanıcı Adı veya Şifre Hatalı",
            _TransaionCompleted: "&#x130;&#x15F;lem Tamamland&#x131;",
            _UserNotFoundUnauthorizedTransaion: "Kullan&#x131;c&#x131; Bulunamad&#x131;. (Yetkisiz i&#x15F;lem)",
            _AddBalanceSuccessful: "Bakiye Ekleme i&#x15F;lemi Ba&#x15F;ar&#x131;l&#x131;",
            _BalanceExtraionSuccessful: "Bakiye &#xC7;&#x131;karma i&#x15F;lemi Ba&#x15F;ar&#x131;l&#x131;",
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
            YourTransaionIsInProgressPleaseWait: "İşleminiz yapılıyor lütfen bekleyiniz",
            AreYouSureYouWantToReset: "Müşterinin şifresini sıfırlamak istediğinizden emin misiniz?",
            AsUpdated: " olarak güncellenmiştir.",
            Deaivate: "Pasifleştir",
            UserDisabled: "Kullanıcı Pasifleştirildi",
            Aivate: "Aktifleştir",
            UserAivated: "Kullanıcı Aktifleştirildi",
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