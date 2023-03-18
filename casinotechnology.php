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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.css" rel="stylesheet">
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



    <div class="casinoGameDetail">
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
                    <div class="item"><a href="/egt">EGT</a></div>
                    <div class="item"><a href="/amatic">AMATIC</a></div>
                    <div class="item"><a href="/pragmatic">PRAGMATIC</a></div>
                    <div class="item"><a href="/playtech">PLAYTECH</a></div>
                    <div class="item"><a href="/gamomat">GAMOMAT</a></div>
                    <div class="item"><a href="/casinotechnology">CT-GAMES</a></div>
                    <div class="item"><a href="">ISOFTBET</a></div>
                    <div class="item"><a href="/wazdan">WAZDAN</a></div>
                </div>

            </div>

            <div class="caroBox csnGameList mb-4 ">
                <div class="h6">CT-GAMES </div>
                <div class="row">
                    
                                
                                <div class="item col-6 col-md-4 col-lg-2">
                                <a href="/Casino/Game?c=PRPLAY-vs20fruitsw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Skywind/ChaoJi888.jpg"></a>
                            </div>
                            <div class="item col-6 col-md-4 col-lg-2">
                                <a href="/Casino/Game?c=SMARTSOFT-Cappadocia_GamesLobby"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Skywind/DragonRichesSW.jpg"></a>
                            </div>
                            <div class="item col-6 col-md-4 col-lg-2">
                                <a href="/Casino/Game?c=SPRIBE-aviator"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Skywind/FengKuangMaJiang.jpg"></a>
                            </div>
                            <div class="item col-6 col-md-4 col-lg-2">
                                <a href="/Casino/Game?c=PRPLAY-vs20godiva"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Skywind/FuFishSW.jpg"></a>
                            </div>
                            <div class="item col-6 col-md-4 col-lg-2">
                                <a href="/Casino/Game?c=211"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Skywind/HeavenlyRulerSW.jpg"></a>
                            </div>
                            <div class="item col-6 col-md-4 col-lg-2">
                                <a href="/Casino/Game?c=BM-6087befc9e1ee6001afdf220"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Skywind/JinQianWa.jpg"></a>
                            </div>
                            <div class="item col-6 col-md-4 col-lg-2">
                                <a href="/Casino/Game?c=WZ-MagicHot4"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Skywind/LepryBunnyPatrickSW.jpg"></a>
                            </div>
                            <div class="item col-6 col-md-4 col-lg-2">
                                <a href="/Casino/Game?c=FILS-144"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Skywind/LongLongLong.jpg"></a>
                            </div>
                           <div class="item col-6 col-md-4 col-lg-2">
                                <a href="/Casino/Game?c=HB-AllAmericanPoker1Hand"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Skywind/ShenLongBaoShiSW.jpg"></a>
                            </div>
                            <div class="item col-6 col-md-4 col-lg-2">
                                <a href="/Casino/Game?c=PLAYSON-solar_king"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Skywind/SongCaiTongZiSW.jpg"></a>
                            </div>
                           <div class="item col-6 col-md-4 col-lg-2">
                                <a href="/Casino/Game?c=LEGA-TWOKICKS1C3"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Skywind/TripleMonkey.jpg"></a>
                            </div>
                            <div class="item col-6 col-md-4 col-lg-2">
                                <a href="/Casino/Game?c=NETENT-elements_not_mobile_sw"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Skywind/XingYunJinChanSW.jpg"></a>
                            </div>
                            <div class="item col-6 col-md-4 col-lg-2">
                                <a href="/Casino/Game?c=njoy-egypt"><img src="/img/casino_loader2.gif" class="lazyCasino" data-src="https://jackpotmatic.com/frontend/Jackpotmatic/ico/Skywind/ZhaoCaiTongZi.jpg"></a>
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

   
    <script src="/assets/owl2/owl.carousel.min.js"></script>
    <script src="/assets/range/bootstrap-slider.js"></script>
    <script src="/assets/plugins/toastr.min.js"></script>
    <script src="/assets/js/jquery.lazyload.min.js"></script>
    <script src="/assets/js/jquery.lazy.min.js"></script>

    <script src="/assets/Hub.js"></script>
    <script src="/assets/hammer.js"></script>
    <script src="/assets/jquery.hammer.js"></script>
    <script src="/assets/Custom.js"></script>



   
</body>

</html>