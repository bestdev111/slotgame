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
<div id="static" class="sportbetGlossary">
<div class="space_20"></div>
<h1><?=getTranslation('bahissozlugu1')?></h1>
<div class="hr h_3 line_grey"></div>
<div class="space"></div>
<div class="space"></div>

<div class="macro main_space">
<div class="cms_richtext">
<div style="text-align: justify;"><?=$site_adi;?> <?=getTranslation('bahissozlugu2')?></div>
<div style="text-align: justify;">&nbsp;</div>
<div style="text-align: justify;"><?=getTranslation('bahissozlugu3')?></div>
<div style="text-align: justify;">&nbsp;</div>
<div style="text-align: justify;"><?=getTranslation('bahissozlugu4')?></div>
<div>&nbsp;</div>
</div>
<div id="help">
<div class="hr h_3 line_grey">&nbsp;</div>
<div class="macro bg_grey main_space">
<div class="space">&nbsp;</div>
<ul>
<li><a href="#a0"><?=getTranslation('bahissozlugu5')?>&nbsp;</a></li>
<li><a href="#a1"><?=getTranslation('bahissozlugu6')?>&nbsp;</a></li>
<li><a href="#a2"><?=getTranslation('bahissozlugu7')?>&nbsp;</a></li>
<li><a href="#a3"><?=getTranslation('bahissozlugu8')?>&nbsp;</a></li>
<li><a href="#a4"><?=getTranslation('bahissozlugu9')?>&nbsp;</a></li>
<li><a href="#a5"><?=getTranslation('bahissozlugu10')?>&nbsp;</a></li>
<li><a href="#a6"><?=getTranslation('bahissozlugu11')?>&nbsp;</a></li>
<li><a href="#a7"><?=getTranslation('bahissozlugu12')?>&nbsp;</a></li>
<li><a href="#a8"><?=getTranslation('bahissozlugu13')?>&nbsp;</a></li>
<li><a href="#a9"><?=getTranslation('bahissozlugu14')?>&nbsp;</a></li>
<li><a href="#a10"><?=getTranslation('bahissozlugu15')?>&nbsp;</a></li>
<li><a href="#a11"><?=getTranslation('bahissozlugu16')?>&nbsp;</a></li>
<li><a href="#a12"><?=getTranslation('bahissozlugu17')?>&nbsp;</a></li>
<li><a href="#a13"><?=getTranslation('bahissozlugu18')?>&nbsp;</a></li>
<li><a href="#a14"><?=getTranslation('bahissozlugu19')?>&nbsp;</a></li>
<li><a href="#a15"><?=getTranslation('bahissozlugu20')?>&nbsp;</a></li>
<li><a href="#a16"><?=getTranslation('bahissozlugu21')?>&nbsp;</a></li>
<li><a href="#a17"><?=getTranslation('bahissozlugu22')?>&nbsp;</a></li>
<li><a href="#a18"><?=getTranslation('bahissozlugu23')?>&nbsp;</a></li>
<li><a href="#a19"><?=getTranslation('bahissozlugu24')?>&nbsp;</a></li>
<li><a href="#a20"><?=getTranslation('bahissozlugu25')?>&nbsp;</a></li>
<li><a href="#a21"><?=getTranslation('bahissozlugu26')?>&nbsp;</a></li>
<li><a href="#a22"><?=getTranslation('bahissozlugu27')?>&nbsp;</a></li>
<li><a href="#a23"><?=getTranslation('bahissozlugu28')?>&nbsp;</a></li>
<li><a href="#a24"><?=getTranslation('bahissozlugu29')?>&nbsp;</a></li>
<li><a href="#a25"><?=getTranslation('bahissozlugu30')?>&nbsp;</a></li>
<li><a href="#a26"><?=getTranslation('bahissozlugu31')?>&nbsp;</a></li>
<li><a href="#a29"><?=getTranslation('bahissozlugu33')?>&nbsp;</a></li>
<li><a href="#a30"><?=getTranslation('bahissozlugu34')?>&nbsp;</a></li>
<li><a href="#a31"><?=getTranslation('bahissozlugu35')?>&nbsp;</a></li>
<li><a href="#a32"><?=getTranslation('bahissozlugu36')?>&nbsp;</a></li>
<li><a href="#a33"><?=getTranslation('bahissozlugu37')?>&nbsp;</a></li>
<li><a href="#a34"><?=getTranslation('bahissozlugu38')?>&nbsp;</a></li>
<li><a href="#a35"><?=getTranslation('bahissozlugu39')?>&nbsp;</a></li>
<li><a href="#a36"><?=getTranslation('bahissozlugu40')?>&nbsp;</a></li>
<li><a href="#a37"><?=getTranslation('bahissozlugu41')?>&nbsp;</a></li>
<li><a href="#a38">X&nbsp;</a></li>
<li><a href="#a39">0&nbsp;</a></li>
<li><a href="#a40">1&nbsp;</a></li>
<li><a href="#a41">2&nbsp;</a></li>
</ul>
<div class="space">&nbsp;</div>
</div>
<div class="hr h_3 line_grey">&nbsp;</div>
<div class="space">&nbsp;</div>
<div class="space">&nbsp;</div>
<style>
#static h1 {
	font-size: 100%;
	font-weight: bold;
}
</style>
<div id="static" class="macro main_space">
<a name="a0">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('bahissozlugu5')?></h2>
<br>
<div class="cms_richtext">
<div style="text-align: justify;"><?=getTranslation('bahissozlugu42')?></div>
<div>&nbsp;</div>
<div style="text-align: justify;"><?=getTranslation('bahissozlugu43')?></div>
<div>&nbsp;</div>
</div>
<div class="right main_space">
<a class="main_space" href="#top"><img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; top</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="a1">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('bahissozlugu6')?></h2>
<br>
<div class="cms_richtext">
<div><?=getTranslation('bahissozlugu44')?></div>
</div>
<div class="right main_space">
<a class="main_space" href="#top"><img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; top</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="a2">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('bahissozlugu7')?></h2>
<br>
<div class="cms_richtext">
<div><?=getTranslation('bahissozlugu45')?></div>
</div>
<div class="right main_space">
<a class="main_space" href="#top"><img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; top</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="a3">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('bahissozlugu8')?></h2>
<br>
<div class="cms_richtext">
<div><?=getTranslation('bahissozlugu46')?></div>
</div>
<div class="right main_space">
<a class="main_space" href="#top"><img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; top</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="a4">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('bahissozlugu9')?></h2>
<br>
<div class="cms_richtext">
<div><?=getTranslation('bahissozlugu47')?></div>
</div>
<div class="right main_space">
<a class="main_space" href="#top"><img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; top</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="a5">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('bahissozlugu10')?></h2>
<br>
<div class="cms_richtext">
<div><?=getTranslation('bahissozlugu48')?></div>
</div>
<div class="right main_space">
<a class="main_space" href="#top"><img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; top</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="a6">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('bahissozlugu11')?></h2>
<br>
<div class="cms_richtext">
<div style="text-align: justify;"><?=getTranslation('bahissozlugu49')?></div>
<div style="text-align: justify;">&nbsp;</div>
</div>
<div class="right main_space">
<a class="main_space" href="#top"><img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; top</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="a7">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('bahissozlugu12')?></h2>
<br>
<div class="cms_richtext">
<div><?=getTranslation('bahissozlugu50')?></div>
</div>
<div class="right main_space">
<a class="main_space" href="#top"><img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; top</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="a8">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('bahissozlugu13')?></h2>
<br>
<div class="cms_richtext">
<div style="text-align: justify;"><?=getTranslation('bahissozlugu51')?></div>
<div style="text-align: justify;"><?=getTranslation('bahissozlugu52')?></div>
<div style="text-align: justify;"><?=getTranslation('bahissozlugu53')?></div>
<div>&nbsp;</div>
</div>
<div class="right main_space">
<a class="main_space" href="#top"><img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; top</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="a9">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('bahissozlugu14')?></h2>
<br>
<div class="cms_richtext">
<div><?=getTranslation('bahissozlugu54')?></div>
<div>&nbsp;</div>
</div>
<div class="right main_space">
<a class="main_space" href="#top"><img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; top</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="a10">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('bahissozlugu15')?></h2>
<br>
<div class="cms_richtext">
<div><?=getTranslation('bahissozlugu55')?></div>
</div>
<div class="right main_space">
<a class="main_space" href="#top"><img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; top</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="a11">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('bahissozlugu16')?></h2>
<br>
<div class="cms_richtext">
<div><?=getTranslation('bahissozlugu56')?></div>
</div>
<div class="right main_space">
<a class="main_space" href="#top"><img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; top</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="a12">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('bahissozlugu17')?></h2>
<br>
<div class="cms_richtext">
<div><?=getTranslation('bahissozlugu57')?></div>
<div><?=getTranslation('bahissozlugu58')?>
<a target="_blank" href="https://www.totobo.com/tr/bahis-bonus/">https://www.totobo.com/tr/bahis-bonus/</a>
<?=getTranslation('bahissozlugu59')?>
</div>
<div>&nbsp;</div>
</div>
<div class="right main_space">
<a class="main_space" href="#top"><img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; top</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="a13">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('bahissozlugu18')?></h2>
<br>
<div class="cms_richtext">
<div><?=getTranslation('bahissozlugu60')?></div>
</div>
<div class="right main_space">
<a class="main_space" href="#top"><img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; top</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="a14">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('bahissozlugu19')?></h2>
<br>
<div class="cms_richtext">
<div style="text-align: justify;"><?=getTranslation('bahissozlugu61')?></div>
</div>
<div class="right main_space">
<a class="main_space" href="#top"><img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; top</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="a15">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('bahissozlugu20')?></h2>
<br>
<div class="cms_richtext">
<div style="text-align: justify;"><?=getTranslation('bahissozlugu62')?></div>
<div style="text-align: justify;">&nbsp;</div>
<div style="text-align: justify;"><?=getTranslation('bahissozlugu63')?></div>
<div>&nbsp;</div>
</div>
<div class="right main_space">
<a class="main_space" href="#top">
<img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; top
</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="a16">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('bahissozlugu21')?></h2>
<br>
<div class="cms_richtext">
<div><?=getTranslation('bahissozlugu64')?></div>
<div>&nbsp;</div>
</div>
<div class="right main_space">
<a class="main_space" href="#top">
<img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; top
</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="a17">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('bahissozlugu22')?></h2>
<br>
<div class="cms_richtext">
<div><?=getTranslation('bahissozlugu65')?></div>
</div>
<div class="right main_space">
<a class="main_space" href="#top">
<img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; top
</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="a18">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('bahissozlugu23')?></h2>
<br>
<div class="cms_richtext">
<div><?=getTranslation('bahissozlugu66')?></div>
</div>
<div class="right main_space">
<a class="main_space" href="#top">
<img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; top
</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="a19">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('bahissozlugu24')?></h2>
<br>
<div class="cms_richtext">
<div style="text-align: justify;"><?=getTranslation('bahissozlugu67')?></div>
<div>&nbsp;</div>
</div>
<div class="right main_space">
<a class="main_space" href="#top">
<img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; top
</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="a20">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('bahissozlugu25')?></h2>
<br>
<div class="cms_richtext">
<div style="text-align: justify;"><?=getTranslation('bahissozlugu68')?></div>
<div style="text-align: justify;"><?=getTranslation('bahissozlugu69')?></div>
<div><?=getTranslation('bahissozlugu70')?></div>
<div style="text-align: justify;"><?=getTranslation('bahissozlugu71')?> <a target="_blank" href="https://www.totobo.com/tr/bahis-bonus/">https://www.totobo.com/tr/bahis-bonus/ </a><?=getTranslation('bahissozlugu72')?></div>
<div>&nbsp;</div>
</div>
<div class="right main_space">
<a class="main_space" href="#top">
<img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; top
</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="a21">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('bahissozlugu26')?></h2>
<br>
<div class="cms_richtext">
<div style="text-align: justify;"><?=getTranslation('bahissozlugu73')?></div>
<div style="text-align: justify;"><?=getTranslation('bahissozlugu74')?></div>
<div>&nbsp;</div>
</div>
<div class="right main_space">
<a class="main_space" href="#top">
<img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; top
</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="a22">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('bahissozlugu27')?></h2>
<br>
<div class="cms_richtext">
<div><?=getTranslation('bahissozlugu75')?></div> 
<div><?=getTranslation('bahissozlugu76')?></div>
<div><?=getTranslation('bahissozlugu77')?></div>
<div>&nbsp;</div>
</div>
<div class="right main_space">
<a class="main_space" href="#top">
<img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; top
</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="a23">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('bahissozlugu28')?></h2>
<br>
<div class="cms_richtext">
<div style="text-align: justify;"><?=getTranslation('bahissozlugu78')?></div> 
<div>&nbsp;</div>
</div>
<div class="right main_space">
<a class="main_space" href="#top">
<img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; top
</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="a24">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('bahissozlugu29')?></h2>
<br>
<div class="cms_richtext">
<div style="text-align: justify;"><?=getTranslation('bahissozlugu79')?></div>
<div>&nbsp;</div>
</div>
<div class="right main_space">
<a class="main_space" href="#top">
<img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; top
</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="a25">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('bahissozlugu30')?></h2>
<br>
<div class="cms_richtext">
<div>Para yatırma Bonusu bkz.</div>
</div>
<div class="right main_space">
<a class="main_space" href="#top">
<img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; top
</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="a26">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('bahissozlugu31')?></h2>
<br>
<div class="cms_richtext">
<div style="text-align: justify;"><?=getTranslation('bahissozlugu80')?></div>
<div>&nbsp;</div>
</div>
<div class="right main_space">
<a class="main_space" href="#top">
<img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; top
</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="a29">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('bahissozlugu33')?></h2>
<br>
<div class="cms_richtext">
<div><?=getTranslation('bahissozlugu81')?></div>
</div>
<div class="right main_space">
<a class="main_space" href="#top">
<img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; top
</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="a30">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('bahissozlugu34')?></h2>
<br>
<div class="cms_richtext">
<div style="text-align: justify;"><?=getTranslation('bahissozlugu82')?></div>
<div>&nbsp;</div>
</div>
<div class="right main_space">
<a class="main_space" href="#top">
<img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; top
</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="a31">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('bahissozlugu35')?></h2>
<br>
<div class="cms_richtext">
<div><?=getTranslation('bahissozlugu83')?></div>
</div>
<div class="right main_space">
<a class="main_space" href="#top">
<img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; top
</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="a32">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('bahissozlugu36')?></h2>
<br>
<div class="cms_richtext">
<div style="text-align: justify;"><?=getTranslation('bahissozlugu84')?></div>
<div style="text-align: justify;"><?=getTranslation('bahissozlugu85')?></div>
<div>&nbsp;</div>
</div>
<div class="right main_space">
<a class="main_space" href="#top">
<img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; top
</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="a33">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('bahissozlugu37')?></h2>
<br>
<div class="cms_richtext">
<div><?=getTranslation('bahissozlugu86')?></div>
</div>
<div class="right main_space">
<a class="main_space" href="#top">
<img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; top
</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="a34">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('bahissozlugu38')?></h2>
<br>
<div class="cms_richtext">
<div style="text-align: justify;"><?=getTranslation('bahissozlugu87')?></div>
</div>
<div class="right main_space">
<a class="main_space" href="#top">
<img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; top
</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="a35">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('bahissozlugu39')?></h2>
<br>
<div class="cms_richtext">
<div><?=getTranslation('bahissozlugu88')?></div>
</div>
<div class="right main_space">
<a class="main_space" href="#top">
<img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; top
</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="a36">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('bahissozlugu40')?></h2>
<br>
<div class="cms_richtext">
<div style="text-align: justify;"><?=getTranslation('bahissozlugu89')?></div>
<div style="text-align: justify;">&nbsp;</div>
</div>
<div class="right main_space">
<a class="main_space" href="#top">
<img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; top
</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="a37">&nbsp;</a>
<br>
<h2 class="h1"><?=getTranslation('bahissozlugu41')?></h2>
<br>
<div class="cms_richtext">
<div><?=getTranslation('bahissozlugu90')?></div>
</div>
<div class="right main_space">
<a class="main_space" href="#top">
<img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; top
</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="a38">&nbsp;</a>
<br>
<h2 class="h1">X</h2>
<br>
<div class="cms_richtext">
<div><?=getTranslation('bahissozlugu91')?></div>
</div>
<div class="right main_space">
<a class="main_space" href="#top">
<img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; top
</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="a39">&nbsp;</a>
<br>
<h2 class="h1">0</h2>
<br>
<div class="cms_richtext">
<div><?=getTranslation('bahissozlugu92')?> X</div>
</div>
<div class="right main_space">
<a class="main_space" href="#top">
<img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; top
</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="a40">&nbsp;</a>
<br>
<h2 class="h1">1</h2>
<br>
<div class="cms_richtext">
<div><?=getTranslation('bahissozlugu93')?></div>
</div>
<div class="right main_space">
<a class="main_space" href="#top">
<img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; top
</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
<a name="a41">&nbsp;</a>
<br>
<h2 class="h1">2</h2>
<br>
<div class="cms_richtext">
<div><?=getTranslation('bahissozlugu94')?></div>
</div>
<div class="right main_space">
<a class="main_space" href="#top">
<img height="7" width="7" alt="" src="/cms/docroot/images/arrow_grey.gif">&nbsp; top
</a>
</div>
<div class="hr h_25 line_grey clear">&nbsp;</div>
</div>
<div class="space clear">&nbsp;</div>
</div>

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