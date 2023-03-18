<?php
session_start();
include 'db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:login.php"); die(); exit(); }
if(userayar('casino_yetki')!='1') { header("Location: index.php"); }
?>
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/jquery-ui-1.8.21.custom.min.js"></script>
<script src="js/mousehold.js"></script>
<script>
var tumusecenegi = '<?=getTranslation('sports_5');?>';
var canliyazisi = '<?=getTranslation('yeniyerler_kasa375');?>';
var boskupon = '<?=getTranslation('yeniyerler_kasa400');?>';
var oyunekleme = '<?=getTranslation('yeniyerler_kasa401');?>';
var kuponnotu = '<?=getTranslation('kuponkuponadi');?>';
var kuponmiktar = '<?=getTranslation('printkupon19');?>';
var kuponolasi = '<?=getTranslation('printkupon24');?>';
var kupononaylama = '<?=getTranslation('sanalspor13');?>';
var seanskapanmistir = '<?=getTranslation('casinoicin399');?>';
var kupontemizleme = '<?=getTranslation('kupononaylama8');?>';
var onaylaniyorkupon = '<?=getTranslation('casinoicin400');?>';
var oyunbulunmuyor = '<?=getTranslation('casinoicin401');?>';
var maxbahis = '<?=getTranslation('casinoicin402');?>';
var minbahis = '<?=getTranslation('casinoicin403');?>';
var yapabilirsiniz = '<?=getTranslation('casinoicin404');?>';
var hatalar1 = '<?=getTranslation('casinoicin405');?>';
var hatalar2 = '<?=getTranslation('casinoicin406');?>';
var hatalar3 = '<?=getTranslation('casinoicin407');?>';
var hatalar4 = '<?=getTranslation('casinoicin408');?>';
var hatalar5 = '<?=getTranslation('casinoicin409');?>';
var hatalar6 = '<?=getTranslation('casinoicin410');?>';
var hatalar7 = '<?=getTranslation('casinoicin411');?>';
var hatalar8 = '<?=getTranslation('casinoicin412');?>';
var hatalar9 = '<?=getTranslation('casinoicin413');?>';
var hatalar10 = '<?=getTranslation('casinoicin414');?>';
var hatalar11 = '<?=getTranslation('casinoicin415');?>';
var hatalar12 = '<?=getTranslation('casinoicin416');?>';
var hatalar13 = '<?=getTranslation('casinoicin417');?>';
var hatalar14 = '<?=getTranslation('casinoicin418');?>';
var hatalar15 = '<?=getTranslation('casinoicin419');?>';
var hatalar16 = '<?=getTranslation('casinoicin420');?>';
var hatalar17 = '<?=getTranslation('casinoicin421');?>';
var hatalar18 = '<?=getTranslation('casinoicin422');?>';
var hatalar19 = '<?=getTranslation('casinoicin423');?>';
var hatalar20 = '<?=getTranslation('casinoicin424');?>';
var hatalar21 = '<?=getTranslation('casinoicin425');?>';
var hatalar22 = '<?=getTranslation('casinoicin426');?>';
var kabuledildi = '<?=getTranslation('casinoicin427');?>';
</script>
<link rel="stylesheet" type="text/css" href="casino/casino2.css?v=3.41.81596909550"/>
<link rel="stylesheet" href="casino/s4cYI.css?v=22001596909550" id="stylesheet">
<link rel="stylesheet" href="casino/casino.css?v=22001596909550" id="stylesheet">
<script src="casino/jquery-ui.min.js"></script>
<script src="casino/jquery.blockUI.js"></script>
<script src="https://cdn.jsdelivr.net/npm/clappr?latest/dist/clappr.min.js"></script>
<script src="casino/nanoplayer.4.min.js"></script>
<script src="casino/casino_yeniyaptim_2.js"></script>

<script>
var casinogamesseviye = {};
var casinogamesmaxod = {};
<? if(userayar('casino_basmaca')=="1"){ ?>
casinogamesseviye[8]=<?=userayar('casino_basmaca_seviye');?>;
casinogamesmaxod[8]=<?=userayar('casino_basmaca_maxoran');?>;
<? } ?>
<? if(userayar('casino_poker')=="1"){ ?>
casinogamesseviye[5]=<?=userayar('casino_poker_seviye');?>;
casinogamesmaxod[5]=<?=userayar('casino_poker_maxoran');?>;
<? } ?>
<? if(userayar('casino_bakara')=="1"){ ?>
casinogamesseviye[6]=<?=userayar('casino_bakara_seviye');?>;
casinogamesmaxod[6]=<?=userayar('casino_bakara_maxoran');?>;
<? } ?>
<? if(userayar('casino_carkifelek')=="1"){ ?>
casinogamesseviye[7]=<?=userayar('casino_carkifelek_seviye');?>;
casinogamesmaxod[7]=<?=userayar('casino_carkifelek_maxoran');?>;
<? } ?>
<? if(userayar('casino_zar')=="1"){ ?>
casinogamesseviye[10]=<?=userayar('casino_zar_seviye');?>;
casinogamesmaxod[10]=<?=userayar('casino_zar_maxoran');?>;
<? } ?>
<? if(userayar('casino_poker6')=="1"){ ?>
casinogamesseviye[12]=<?=userayar('casino_poker6_seviye');?>;
casinogamesmaxod[12]=<?=userayar('casino_poker6_maxoran');?>;
<? } ?>
<? if(userayar('casino_loto5')=="1"){ ?>
casinogamesseviye[3]=<?=userayar('casino_loto5_seviye');?>;
casinogamesmaxod[3]=<?=userayar('casino_loto5_maxoran');?>;
<? } ?>
<? if(userayar('casino_loto6')=="1"){ ?>
casinogamesseviye[9]=<?=userayar('casino_loto6_seviye');?>;
casinogamesmaxod[9]=<?=userayar('casino_loto6_maxoran');?>;
<? } ?>
<? if(userayar('casino_loto7')=="1"){ ?>
casinogamesseviye[1]=<?=userayar('casino_loto7_seviye');?>;
casinogamesmaxod[1]=<?=userayar('casino_loto7_maxoran');?>;
<? } ?>

<? if($_GET['gameid']==8){ ?>
var max_amount = <?=userayar('casino_basmaca_maxbahis');?>;
var min_amount = <?=userayar('casino_basmaca_minbahis');?>;
var gain_max = <?=userayar('casino_basmaca_maxkazanc');?>;
<? } else if($_GET['gameid']==5){ ?>
var max_amount = <?=userayar('casino_poker_maxbahis');?>;
var min_amount = <?=userayar('casino_poker_minbahis');?>;
var gain_max = <?=userayar('casino_poker_maxkazanc');?>;
<? } else if($_GET['gameid']==6){ ?>
var max_amount = <?=userayar('casino_bakara_maxbahis');?>;
var min_amount = <?=userayar('casino_bakara_minbahis');?>;
var gain_max = <?=userayar('casino_bakara_maxkazanc');?>;
<? } else if($_GET['gameid']==7){ ?>
var max_amount = <?=userayar('casino_carkifelek_maxbahis');?>;
var min_amount = <?=userayar('casino_carkifelek_minbahis');?>;
var gain_max = <?=userayar('casino_carkifelek_maxkazanc');?>;
<? } else if($_GET['gameid']==10){ ?>
var max_amount = <?=userayar('casino_zar_maxbahis');?>;
var min_amount = <?=userayar('casino_zar_minbahis');?>;
var gain_max = <?=userayar('casino_zar_maxkazanc');?>;
<? } else if($_GET['gameid']==12){ ?>
var max_amount = <?=userayar('casino_poker6_maxbahis');?>;
var min_amount = <?=userayar('casino_poker6_minbahis');?>;
var gain_max = <?=userayar('casino_poker6_maxkazanc');?>;
<? } else if($_GET['gameid']==3){ ?>
var max_amount = <?=userayar('casino_loto5_maxbahis');?>;
var min_amount = <?=userayar('casino_loto5_minbahis');?>;
var gain_max = <?=userayar('casino_loto5_maxkazanc');?>;
<? } else if($_GET['gameid']==9){ ?>
var max_amount = <?=userayar('casino_loto6_maxbahis');?>;
var min_amount = <?=userayar('casino_loto6_minbahis');?>;
var gain_max = <?=userayar('casino_loto6_maxkazanc');?>;
<? } else if($_GET['gameid']==1){ ?>
var max_amount = <?=userayar('casino_loto7_maxbahis');?>;
var min_amount = <?=userayar('casino_loto7_minbahis');?>;
var gain_max = <?=userayar('casino_loto7_maxkazanc');?>;
<? } else { ?>
<? if(userayar('casino_basmaca')=="1"){ ?>
var max_amount = <?=userayar('casino_basmaca_maxbahis');?>;
var min_amount = <?=userayar('casino_basmaca_minbahis');?>;
var gain_max = <?=userayar('casino_basmaca_maxkazanc');?>;
<? } else if(userayar('casino_poker')=="1"){ ?>
var max_amount = <?=userayar('casino_poker_maxbahis');?>;
var min_amount = <?=userayar('casino_poker_minbahis');?>;
var gain_max = <?=userayar('casino_poker_maxkazanc');?>;
<? } else if(userayar('casino_bakara')=="1"){ ?>
var max_amount = <?=userayar('casino_bakara_maxbahis');?>;
var min_amount = <?=userayar('casino_bakara_minbahis');?>;
var gain_max = <?=userayar('casino_bakara_maxkazanc');?>;
<? } else if(userayar('casino_carkifelek')=="1"){ ?>
var max_amount = <?=userayar('casino_carkifelek_maxbahis');?>;
var min_amount = <?=userayar('casino_carkifelek_minbahis');?>;
var gain_max = <?=userayar('casino_carkifelek_maxkazanc');?>;
<? } else if(userayar('casino_zar')=="1"){ ?>
var max_amount = <?=userayar('casino_zar_maxbahis');?>;
var min_amount = <?=userayar('casino_zar_minbahis');?>;
var gain_max = <?=userayar('casino_zar_maxkazanc');?>;
<? } else if(userayar('casino_poker6')=="1"){ ?>
var max_amount = <?=userayar('casino_poker6_maxbahis');?>;
var min_amount = <?=userayar('casino_poker6_minbahis');?>;
var gain_max = <?=userayar('casino_poker6_maxkazanc');?>;
<? } else if(userayar('casino_loto5')=="1"){ ?>
var max_amount = <?=userayar('casino_loto5_maxbahis');?>;
var min_amount = <?=userayar('casino_loto5_minbahis');?>;
var gain_max = <?=userayar('casino_loto5_maxkazanc');?>;
<? } else if(userayar('casino_loto6')=="1"){ ?>
var max_amount = <?=userayar('casino_loto6_maxbahis');?>;
var min_amount = <?=userayar('casino_loto6_minbahis');?>;
var gain_max = <?=userayar('casino_loto6_maxkazanc');?>;
<? } else if(userayar('casino_loto7')=="1"){ ?>
var max_amount = <?=userayar('casino_loto7_maxbahis');?>;
var min_amount = <?=userayar('casino_loto7_minbahis');?>;
var gain_max = <?=userayar('casino_loto7_maxkazanc');?>;
<? } ?>
<? } ?>


var _update_coupon_time = 10000;
var _session_max = 0;
var max_odd = 1000.00;
var is_mobile = false;
var livescript_loaded = false;
var autoprint = false;
var jsdebug = false;
var devmode = false;
var is_root = false;
var can_edit_sports = true;
var theme_name = 'rakip';
var _version = '2200';
var bulten_style = 2;
var bulten_open_type = 'modal';
</script>

<?php include 'header.php'; ?>

<? if(userayar('casino_basmaca')=="0" && userayar('casino_poker')=="0" && userayar('casino_bakara')=="0" && userayar('casino_carkifelek')=="0" && userayar('casino_zar')=="0" && userayar('casino_poker6')=="0" && userayar('casino_loto5')=="0" && userayar('casino_loto6')=="0" && userayar('casino_loto7')=="0"){ ?>
HATA
<? } else { ?>

<div id="head">
<div id="navbar">
<ul id="content" style="display: flex;width: auto;height: 44px;padding: 0;flex: 1 0;justify-content: center;">
<? if(userayar('casino_basmaca')=="1"){ ?>
<li class="first">
<a class="nss-reg" href="livecasino.php?gameid=8"><?=getTranslation('yeniyerler_kasa331')?>
<br><span class="darkGradient lminute" id="casinodiv_8" style="position: absolute;font-size: 9px;font-weight: 700;color: #000;background-color: #fff;padding: 3px 5px;border-radius: 2px;left: 30%;top: -15px;box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.4);"></span></a>
</li>
<? } ?>
<? if(userayar('casino_poker')=="1"){ ?>
<li class="first">
<a style="display: flex;align-items: center;height: 100%;width: 100%;padding: 0 15px;color: #063448;" class="nss-reg" href="livecasino.php?gameid=5"><?=getTranslation('yeniyerler_kasa332')?><br><span class="darkGradient lminute" id="casinodiv_5" style="position: absolute;font-size: 9px;font-weight: 700;color: #000;background-color: #fff;padding: 3px 5px;border-radius: 2px;left: 30%;top: -15px;box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.4);"></span></a>
</li>
<? } ?>
<? if(userayar('casino_bakara')=="1"){ ?>
<li class="first">
<a style="display: flex;align-items: center;height: 100%;width: 100%;padding: 0 15px;color: #063448;" class="nss-reg" href="livecasino.php?gameid=6"><?=getTranslation('yeniyerler_kasa333')?><br><span class="darkGradient lminute" id="casinodiv_6" style="position: absolute;font-size: 9px;font-weight: 700;color: #000;background-color: #fff;padding: 3px 5px;border-radius: 2px;left: 30%;top: -15px;box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.4);"></span></a>
</li>
<? } ?>
<? if(userayar('casino_carkifelek')=="1"){ ?>
<li class="first">
<a style="display: flex;align-items: center;height: 100%;width: 100%;padding: 0 15px;color: #063448;" class="nss-reg" href="livecasino.php?gameid=7"><?=getTranslation('yeniyerler_kasa334')?><br><span class="darkGradient lminute" id="casinodiv_7" style="position: absolute;font-size: 9px;font-weight: 700;color: #000;background-color: #fff;padding: 3px 5px;border-radius: 2px;left: 30%;top: -15px;box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.4);"></span></a>
</li>
<? } ?>
<? if(userayar('casino_zar')=="1"){ ?>
<li class="first">
<a style="display: flex;align-items: center;height: 100%;width: 100%;padding: 0 15px;color: #063448;" class="nss-reg" href="livecasino.php?gameid=10"><?=getTranslation('yeniyerler_kasa335')?><br><span class="darkGradient lminute" id="casinodiv_10" style="position: absolute;font-size: 9px;font-weight: 700;color: #000;background-color: #fff;padding: 3px 5px;border-radius: 2px;left: 30%;top: -15px;box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.4);"></span></a>
</li>
<? } ?>
<? if(userayar('casino_poker6')=="1"){ ?>
<li class="first">
<a style="display: flex;align-items: center;height: 100%;width: 100%;padding: 0 15px;color: #063448;" class="nss-reg" href="livecasino.php?gameid=12"><?=getTranslation('yeniyerler_kasa336')?><br><span class="darkGradient lminute" id="casinodiv_12" style="position: absolute;font-size: 9px;font-weight: 700;color: #000;background-color: #fff;padding: 3px 5px;border-radius: 2px;left: 30%;top: -15px;box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.4);"></span></a>
</li>
<? } ?>
<? if(userayar('casino_loto5')=="1"){ ?>
<li class="first">
<a style="display: flex;align-items: center;height: 100%;width: 100%;padding: 0 15px;color: #063448;" class="nss-reg" href="livecasino.php?gameid=3"><?=getTranslation('yeniyerler_kasa337')?> 5<br><span class="darkGradient lminute" id="casinodiv_3" style="position: absolute;font-size: 9px;font-weight: 700;color: #000;background-color: #fff;padding: 3px 5px;border-radius: 2px;left: 30%;top: -15px;box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.4);"></span></a>
</li>
<? } ?>
<? if(userayar('casino_loto6')=="1"){ ?>
<li class="first">
<a style="display: flex;align-items: center;height: 100%;width: 100%;padding: 0 15px;color: #063448;" class="nss-reg" href="livecasino.php?gameid=9"><?=getTranslation('yeniyerler_kasa337')?> 6<br><span class="darkGradient lminute" id="casinodiv_9" style="position: absolute;font-size: 9px;font-weight: 700;color: #000;background-color: #fff;padding: 3px 5px;border-radius: 2px;left: 30%;top: -15px;box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.4);"></span></a>
</li>
<? } ?>
<? if(userayar('casino_loto7')=="1"){ ?>
<li class="first">
<a style="display: flex;align-items: center;height: 100%;width: 100%;padding: 0 15px;color: #063448;" class="nss-reg" href="livecasino.php?gameid=1"><?=getTranslation('yeniyerler_kasa337')?> 7<br><span class="darkGradient lminute" id="casinodiv_1" style="position: absolute;font-size: 9px;font-weight: 700;color: #000;background-color: #fff;padding: 3px 5px;border-radius: 2px;left: 30%;top: -15px;box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.4);"></span></a>
</li>
<? } ?>
</ul>
</div>
</div>

<div id="mainTab" style="width: 100%;padding-left: 10px;" class="dec">
<div class="left-panel">

<div class="casino-holder">
		<div class="nest5-wrapper">
			<div id="nest5"></div>
		</div>
		<div class="casino-video" style="width: 100%;">
			<div class="game-playing"><span class="game-live"><?=getTranslation('yeniyerler_kasa375')?></span><span class="game-run-id"></span></div>

			<div id="casino-video"></div>
			<div class="casino-video-odds game-odds" id="game-odds-8">
				<div class="screen-odds-war video-odds">
					<div class="screen-odd-war main-dealer">
						<div class="screen-odd-item screen-odd-button" role="presentation" data-qa="528">
							<div class="screen-odd-label"><?=getTranslation('yeniyerler_kasa222')?></div>
							<div class="odd-value" data-qa="area-screen-odd-value"></div>
						</div>
					</div>
					<div class="screen-odd-war main-player">
						<div class="screen-odd-item screen-odd-button" role="presentation" data-qa="529">
							<div class="screen-odd-label"><?=getTranslation('yeniyerler_kasa223')?></div>
							<div class="odd-value" data-qa="area-screen-odd-value"></div>
						</div>
					</div>
					<div class="screen-odd-war main-war">
						<div class="screen-odd-item screen-odd-button" role="presentation" data-qa="530">
							<div class="screen-odd-label"><?=getTranslation('yeniyerler_kasa376')?></div>
							<div class="odd-value" data-qa="area-screen-odd-value"></div>
						</div>
					</div>
				</div>
			</div>









		<div class="screen-odds-poker video-odds game-odds" id="game-odds-5">
			    <div class="screen-odd-poker player-1 bet-sum-right">
			        <div class="screen-odd-item screen-odd-button" role="presentation" data-qa="446">
			            <div class="odd-value" data-qa="area-screen-odd-value"></div>
			        </div>
			    </div>
			    <div class="screen-odd-poker player-2 bet-sum-right">
			        <div class="screen-odd-item screen-odd-button" role="presentation" data-qa="447">
			            <div class="odd-value" data-qa="area-screen-odd-value"></div>
			        </div>
			    </div>
			    <div class="screen-odd-poker player-3 bet-sum-right">
			        <div class="screen-odd-item screen-odd-button" role="presentation" data-qa="448">
			            <div class="odd-value" data-qa="area-screen-odd-value"></div>
			        </div>
			    </div>
			    <div class="screen-odd-poker player-4 bet-sum-left">
			        <div class="screen-odd-item screen-odd-button active" role="presentation" data-qa="449">
			            <div class="odd-value" data-qa="area-screen-odd-value"></div>
			        </div>
			    </div>
			    <div class="screen-odd-poker player-5 bet-sum-left">
			        <div class="screen-odd-item screen-odd-button" role="presentation" data-qa="450">
			            <div class="odd-value" data-qa="area-screen-odd-value"></div>
			        </div>
			    </div>
			    <div class="screen-odd-poker player-6 bet-sum-left">
			        <div class="screen-odd-item screen-odd-button" role="presentation" data-qa="451">
			            <div class="odd-value" data-qa="area-screen-odd-value"></div>
			        </div>
			    </div>
			</div>

			<div class="screen-odds-baccarat video-odds game-odds" id="game-odds-6">
			    <div class="screen-odd-baccarat main-player">
			        <div class="screen-odd-item screen-odd-button" role="presentation" data-qa="469">
			            <div class="odd-value" data-qa="area-screen-odd-value"></div>
			        </div>
			    </div><strong class="screen-odd-score score-player" data-qa="text-baccarat-score-player">0</strong>
			    <div class="screen-odd-baccarat main-banker">
			        <div class="screen-odd-item screen-odd-button" role="presentation" data-qa="470">
			            <div class="odd-value" data-qa="area-screen-odd-value"></div>
			        </div>
			    </div><strong class="screen-odd-score score-banker" data-qa="text-baccarat-score-banker">0</strong>
			    <div class="screen-odd-baccarat main-tie">
			        <div class="screen-odd-item screen-odd-button" role="presentation" data-qa="471">
			            <div class="odd-value" data-qa="area-screen-odd-value"></div>
			        </div>
			    </div>
			</div>
</div>

</div>

<div class="clear"></div>

<div class="casino-alt">
		<div class="casino-bets" id="casino-bets">
		</div>


<div class="casino-coupon">
<div id="coupon" data-type="casino" style="position: relative; zoom: 1;">
<div class="coupon-panel">
<div class="betting-slip-head"><strong><?=getTranslation('yeniyerler_kasa399')?></strong></div>

<div class="betting-slip-content">
<div class="coupon-empty">
<i class="fal fa-file"></i>
<strong><?=getTranslation('yeniyerler_kasa400')?></strong>
<span class="text-muted"><?=getTranslation('yeniyerler_kasa401')?></span>
</div>
</div>

</div>
</div>
</div>
</div>
<div class="clear"></div>

</div>
</div>
</div>

<? } ?>

<script>
<? if($_GET['gameid']==8 && userayar('casino_basmaca')=="1"){ ?>
var _active_game = 8;
<? } else if($_GET['gameid']==5 && userayar('casino_poker')=="1"){ ?>
var _active_game = 5;
<? } else if($_GET['gameid']==6 && userayar('casino_bakara')=="1"){ ?>
var _active_game = 6;
<? } else if($_GET['gameid']==7 && userayar('casino_carkifelek')=="1"){ ?>
var _active_game = 7;
<? } else if($_GET['gameid']==10 && userayar('casino_zar')=="1"){ ?>
var _active_game = 10;
<? } else if($_GET['gameid']==12 && userayar('casino_poker6')=="1"){ ?>
var _active_game = 12;
<? } else if($_GET['gameid']==3 && userayar('casino_loto5')=="1"){ ?>
var _active_game = 3;
<? } else if($_GET['gameid']==9 && userayar('casino_loto6')=="1"){ ?>
var _active_game = 9;
<? } else if($_GET['gameid']==1 && userayar('casino_loto7')=="1"){ ?>
var _active_game = 1;
<? } else { ?>
<? if(userayar('casino_basmaca')=="1"){ ?>
var _active_game = 8;
<? } else if(userayar('casino_poker')=="1"){ ?>
var _active_game = 5;
<? } else if(userayar('casino_bakara')=="1"){ ?>
var _active_game = 6;
<? } else if(userayar('casino_carkifelek')=="1"){ ?>
var _active_game = 7;
<? } else if(userayar('casino_zar')=="1"){ ?>
var _active_game = 10;
<? } else if(userayar('casino_poker6')=="1"){ ?>
var _active_game = 12;
<? } else if(userayar('casino_loto5')=="1"){ ?>
var _active_game = 3;
<? } else if(userayar('casino_loto6')=="1"){ ?>
var _active_game = 9;
<? } else if(userayar('casino_loto7')=="1"){ ?>
var _active_game = 1;
<? } ?>
<? } ?>
celarcasinocoupon();
var session_id = '<?=$session_id;?>';
var _text = false;
var _active_tab = 0;
var _lottery_id = 0;
var _lottery_items = [];
var _video;
var player = false;
</script>

<?php include 'footer.php'; ?>

</body>
</html>