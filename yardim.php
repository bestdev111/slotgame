<?php
session_start();
include 'db.php';
if($ub['wkyetki']<2) { header("Location:kasa"); }
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:login.php"); die(); exit(); }
?>
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/jquery-ui-1.8.21.custom.min.js"></script>
<script src="js/mousehold.js"></script>
<link rel="stylesheet" type="text/css" href="assets/css/css2.css">
<?php include 'header.php'; ?>

<div id="content" class="left">
<div id="main_wide">
<div class="help cms_richtext">
<br>
<h2 class="h1"><?=getTranslation('yardimphp1')?></h2>
<br>
<div class="cms_richtext"></div>
<div id="help">
<div class="hr h_3 line_grey">&nbsp;</div>
<div class="macro bg_grey main_space">
<div class="space">&nbsp;</div>
<ul>
<li><a href="<?=$sys['request_uri']?>#lost_password"><?=getTranslation('yardimphp2')?>&nbsp;</a></li>
<li><a href="<?=$sys['request_uri']?>#lost_username"><?=getTranslation('yardimphp3')?>&nbsp;</a></li>
<li><a href="<?=$sys['request_uri']?>#boni"><?=getTranslation('yardimphp4')?>&nbsp;</a></li>
<li><a href="<?=$sys['request_uri']?>#payin_methods"><?=getTranslation('yardimphp5')?>&nbsp;</a></li>
<li><a href="<?=$sys['request_uri']?>#fee"><?=getTranslation('yardimphp6')?>&nbsp;</a></li>
<li><a href="<?=$sys['request_uri']?>#bank_transfer"><?=getTranslation('yardimphp7')?>&nbsp;</a></li>
<li><a href="<?=$sys['request_uri']?>#payout"><?=getTranslation('yardimphp8')?>&nbsp;</a></li>
<li><a href="<?=$sys['request_uri']?>#payout_without_fee"><?=getTranslation('yardimphp9')?>&nbsp;</a></li>
<li><a href="<?=$sys['request_uri']?>#transfer_time"><?=getTranslation('yardimphp10')?>&nbsp;</a></li>
<li><a href="<?=$sys['request_uri']?>#credit"><?=getTranslation('yardimphp11')?>&nbsp;</a></li>
<li><a href="<?=$sys['request_uri']?>#max_win"><?=getTranslation('yardimphp12')?>&nbsp;</a></li>
<li><a href="<?=$sys['request_uri']?>#min"><?=getTranslation('yardimphp13')?>&nbsp;</a></li>
<li><a href="<?=$sys['request_uri']?>#bet_count"><?=getTranslation('yardimphp14')?>&nbsp;</a></li>
<li><a href="<?=$sys['request_uri']?>#wettantrag"><?=getTranslation('yardimphp15')?>&nbsp;</a></li>
<li><a href="<?=$sys['request_uri']?>#a0"><?=getTranslation('yardimphp16')?>&nbsp;</a></li>
<li><a href="<?=$sys['request_uri']?>#happens"><?=getTranslation('yardimphp17')?>&nbsp;</a></li>
<li><a href="<?=$sys['request_uri']?>#error"><?=getTranslation('yardimphp18')?>&nbsp;</a></li>
<li><a href="<?=$sys['request_uri']?>#sportart"><?=getTranslation('yardimphp19')?>&nbsp;</a></li>
<li><a href="<?=$sys['request_uri']?>#a1"><?=getTranslation('yardimphp20')?>&nbsp;</a></li>
</ul>
<div class="space">&nbsp;</div>
</div>
<div class="hr h_3 line_grey">&nbsp;</div>
<div class="space">&nbsp;</div>
<div class="space">&nbsp;</div><style>
#static h1 {
	font-size: 100%;
	font-weight: bold;
}
</style>
<div id="static" class="macro main_space">
<a name="lost_password">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('yardimphp2')?></h2>
<br>
<div class="cms_richtext">
<div><?=getTranslation('yardimphp22')?></div>
<div><?=getTranslation('yardimphp23')?></div>
<div><?=getTranslation('yardimphp24')?></div>
<div><?=getTranslation('yardimphp25')?></div>
</div>
<div class="right main_space">
<a class="main_space" href="#top">
<img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; <?=getTranslation('yardimphp21')?>
</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="lost_username">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('yardimphp3')?></h2>
<br>
<div class="cms_richtext">
<div>
<font face="Tahoma">
<span style="font-size: 12px;"><?=getTranslation('yardimphp26')?></span>
</font>
</div>
<div>
<font face="Tahoma"><?=getTranslation('yardimphp27')?></font>
</div>
<div>
<font face="Tahoma"><?=getTranslation('yardimphp28')?></font>
</div>
<div>
<font face="Tahoma"><?=getTranslation('yardimphp29')?></font>
</div>
</div>
<div class="right main_space">
<a class="main_space" href="#top">
<img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; <?=getTranslation('yardimphp21')?>
</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="boni">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('yardimphp4')?></h2>
<br>
<div class="cms_richtext">
<div>
<font face="Tahoma"><?=getTranslation('yardimphp30')?></font>
</div>
<div>
<font face="Tahoma"><?=getTranslation('yardimphp31')?></font>
</div>
</div>
<div class="right main_space">
<a class="main_space" href="#top">
<img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; <?=getTranslation('yardimphp21')?>
</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="payin_methods">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('yardimphp5')?></h2>
<br>
<div class="cms_richtext">
<div>
<font face="Tahoma"><span style="font-size: 12px;"><?=getTranslation('yardimphp32')?></span></font>
</div>
<div>
<font face="Tahoma"><?=getTranslation('yardimphp33')?></font>
</div>
</div>
<div class="right main_space">
<a class="main_space" href="#top">
<img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; <?=getTranslation('yardimphp21')?>
</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="fee">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('yardimphp6')?></h2>
<br>
<div class="cms_richtext">
<div>
<font face="Tahoma"><span style="font-size: 12px;"><?=getTranslation('yardimphp34')?></span></font>
</div>
<div>
<font face="Tahoma"><?=getTranslation('yardimphp35')?></font>
</div>
<div>
<font face="Tahoma"><?=getTranslation('yardimphp36')?></font>
</div>
</div>
<div class="right main_space">
<a class="main_space" href="#top">
<img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; <?=getTranslation('yardimphp21')?>
</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="bank_transfer">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('yardimphp7')?></h2>
<br>
<div class="cms_richtext">
<div>
<font face="Tahoma"><?=getTranslation('yardimphp37')?></font>
</div>
<div>
<font face="Tahoma"><?=getTranslation('yardimphp38')?></font>
</div>
<div>
<font face="Tahoma"><?=getTranslation('yardimphp39')?></font>
</div>
<div>
<font face="Tahoma"><?=getTranslation('yardimphp40')?></font>
</div>
<div>
<font face="Tahoma"><?=getTranslation('yardimphp41')?></font>
</div>
</div>
<div class="right main_space">
<a class="main_space" href="#top">
<img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; <?=getTranslation('yardimphp21')?>
</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="payout">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('yardimphp8')?></h2>
<br>
<div class="cms_richtext">
<div>
<font face="Tahoma"><?=getTranslation('yardimphp42')?></font>
</div>
<div>
<font face="Tahoma"><?=getTranslation('yardimphp43')?></font>
</div>
<div>
<font face="Tahoma"><?=getTranslation('yardimphp44')?></font>
</div>
<div>
<font face="Tahoma"><?=getTranslation('yardimphp45')?></font>
</div>
<div>
<font face="Tahoma"><?=getTranslation('yardimphp46')?></font>
</div>
</div>
<div class="right main_space">
<a class="main_space" href="#top">
<img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; <?=getTranslation('yardimphp21')?>
</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="payout_without_fee">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('yardimphp9')?></h2>
<br>
<div class="cms_richtext">
<div><?=getTranslation('yardimphp47')?></div>
<div><?=getTranslation('yardimphp48')?></div>
<div><?=getTranslation('yardimphp49')?></div>
</div>
<div class="right main_space">
<a class="main_space" href="#top">
<img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; <?=getTranslation('yardimphp21')?>
</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="transfer_time">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('yardimphp10')?></h2>
<br>
<div class="cms_richtext">
<div><font face="Tahoma"><?=getTranslation('yardimphp50')?></font></div>
<div><font face="Tahoma"><?=getTranslation('yardimphp51')?></font></div>
<div><font face="Tahoma"><?=getTranslation('yardimphp52')?></font></div>
</div>
<div class="right main_space">
<a class="main_space" href="#top">
<img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; <?=getTranslation('yardimphp21')?>
</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="credit">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('yardimphp11')?></h2>
<br>
<div class="cms_richtext">
<div>
<font face="Tahoma"><?=getTranslation('yardimphp53')?></font>
</div>
<div>
<font face="Tahoma"><?=getTranslation('yardimphp54')?></font>
</div>
</div>
<div class="right main_space">
<a class="main_space" href="#top">
<img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; <?=getTranslation('yardimphp21')?>
</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="max_win">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('yardimphp12')?></h2>
<br>
<div class="cms_richtext">
<div><font face="Tahoma"><?=getTranslation('yardimphp55')?></font></div>
<div><font face="Tahoma"><?=getTranslation('yardimphp56')?></font></div>
</div>
<div class="right main_space">
<a class="main_space" href="#top">
<img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; <?=getTranslation('yardimphp21')?>
</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="min">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('yardimphp13')?></h2>
<br>
<div class="cms_richtext">
<div><font face="Tahoma"><?=getTranslation('yardimphp57')?></font></div>
<div><font face="Tahoma"><?=getTranslation('yardimphp58')?></font></div>
</div>
<div class="right main_space">
<a class="main_space" href="#top">
<img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; <?=getTranslation('yardimphp21')?>
</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="bet_count">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('yardimphp14')?></h2>
<br>
<div class="cms_richtext">
<div><font face="Tahoma"><?=getTranslation('yardimphp59')?></font></div>
</div>
<div class="right main_space">
<a class="main_space" href="#top">
<img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; <?=getTranslation('yardimphp21')?>
</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="wettantrag">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('yardimphp15')?></h2>
<br>
<div class="cms_richtext">
<div>
<?=getTranslation('yardimphp60')?>
<br>
<br>
<?=getTranslation('yardimphp61')?>
<br>
<br>
<?=getTranslation('yardimphp62')?>
</div>
</div>
<div class="right main_space">
<a class="main_space" href="#top">
<img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; <?=getTranslation('yardimphp21')?>
</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="a0">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('yardimphp16')?></h2>
<br>
<div class="cms_richtext">
<p style="color: black;"><?=getTranslation('yardimphp63')?></p>
<div><?=getTranslation('yardimphp64')?></div>
<div><?=getTranslation('yardimphp65')?></div>
</div>
<div class="right main_space">
<a class="main_space" href="#top">
<img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; <?=getTranslation('yardimphp21')?>
</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="happens">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('yardimphp17')?></h2>
<br>
<div class="cms_richtext">
<p style="color: black;"><?=getTranslation('yardimphp66')?></p>
<div><?=getTranslation('yardimphp67')?></div>
<div><?=getTranslation('yardimphp68')?></div>
<div><?=getTranslation('yardimphp69')?></div>
<div><?=getTranslation('yardimphp70')?></div>
<div><?=getTranslation('yardimphp71')?></div>
</div>
<div class="right main_space">
<a class="main_space" href="#top">
<img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; <?=getTranslation('yardimphp21')?>
</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="error">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('yardimphp18')?></h2>
<br>
<div class="cms_richtext">
<div><?=getTranslation('yardimphp72')?></div>
<div><?=getTranslation('yardimphp73')?></div>
<div><?=getTranslation('yardimphp74')?></div>
<div><?=getTranslation('yardimphp75')?></div>
</div>
<div class="right main_space">
<a class="main_space" href="#top">
<img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; <?=getTranslation('yardimphp21')?>
</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="sportart">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('yardimphp19')?></h2>
<br>
<div class="cms_richtext">
<div><font face="Tahoma"><?=getTranslation('yardimphp76')?></font></div>
</div>
<div class="right main_space">
<a class="main_space" href="#top">
<img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; <?=getTranslation('yardimphp21')?>
</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="a1">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('yardimphp20')?></h2>
<br>
<div class="cms_richtext">
<div>&nbsp;<?=getTranslation('yardimphp77')?></div>
</div>
<div class="right main_space">
<a class="main_space" href="#top">
<img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; <?=getTranslation('yardimphp21')?>
</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
</div>
<div class="space clear">&nbsp;</div>
</div>
</div>
</div>
<div id="tooltip_3" class="layerClass">
<table>
<tbody>
<tr><td id="tooltip_3_tl"></td><td id="tooltip_3_tr"></td></tr>
<tr><td id="tooltip_3_bl"></td><td id="tooltip_3_br"></td></tr>
</tbody>
</table>
</div>
</div>

<?php include 'sag.php'; ?>

</div>
</div>
</div>
</div>
</div>
</div>

<?php include 'footer.php'; ?>
</body>
</html>