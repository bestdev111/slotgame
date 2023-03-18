<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:login.php"); exit(); }
?>
<?php include 'header.php'; ?>
<script>$("#baslikdivi").html('<span><?=getTranslation('mobilbettingglossary1')?></span>');</script>
<div id="page1" class="page top">
<div class="scroll_container" onscroll="scrollActions(this, true)">
<div class="scroll_wrapper" style="padding-top: 44px; padding-bottom: 44px;">
<div class="appcontent">
<div class="html">
<div id="betting-glossary" style="">
<br><h2 class="h1"><?=getTranslation('mobilbettingglossary1')?></h2><br>
<div class="cms_richtext">
<div>
<style type="text/css">
ul, li {     list-style: circle; } li {     background: url(../img/arrowR.png) right center no-repeat #fff;     background-size: 20px 20px;     border-top: 1px solid #dcdbdb;     list-style: none;     line-height: 32px;     padding-top: 0;     padding-left: 7px;     margin-left: -30pt; } a {text-decoration: none;     color: #00384e;}
</style>
</div>
<div>
<div>
<div>
<div><?=getTranslation('mobilbettingglossary2')?></div>
<div><?=getTranslation('mobilbettingglossary3')?></div>
<div><?=getTranslation('mobilbettingglossary4')?></div>
</div>
<div>
<div>
<ul>
<li><a href="#a0">1&nbsp;</a></li>
<li><a href="#a1">X&nbsp;</a></li>
<li><a href="#a2">2&nbsp;</a></li>
<li><a href="#a3">X:X&nbsp;</a></li>
<li><a href="#a4"><?=getTranslation('mobilbettingglossary5')?>&nbsp;</a></li>
<li><a href="#a5"><?=getTranslation('mobilbettingglossary6')?>&nbsp;</a></li>
<li><a href="#a6"><?=getTranslation('mobilbettingglossary7')?>&nbsp;</a></li>
<li><a href="#a7"><?=getTranslation('mobilbettingglossary8')?>&nbsp;</a></li>
<li><a href="#a8"><?=getTranslation('mobilbettingglossary9')?>&nbsp;</a></li>
<li><a href="#a9"><?=getTranslation('mobilbettingglossary10')?>&nbsp;</a></li>
<li><a href="#a10"><?=getTranslation('mobilbettingglossary11')?>&nbsp;</a></li>
<li><a href="#a11"><?=getTranslation('mobilbettingglossary12')?>&nbsp;</a></li>
<li><a href="#a12"><?=getTranslation('mobilbettingglossary13')?>&nbsp;</a></li>
<li><a href="#a13"><?=getTranslation('mobilbettingglossary14')?>&nbsp;</a></li>
<li><a href="#a14"><?=getTranslation('mobilbettingglossary15')?>&nbsp;</a></li>
<li><a href="#a15"><?=getTranslation('mobilbettingglossary16')?>&nbsp;</a></li>
<li><a href="#a16"><?=getTranslation('mobilbettingglossary17')?>&nbsp;</a></li>
<li><a href="#a17"><?=getTranslation('mobilbettingglossary18')?>&nbsp;</a></li>
<li><a href="#a18"><?=getTranslation('mobilbettingglossary19')?>&nbsp;</a></li>
<li><a href="#a19"><?=getTranslation('mobilbettingglossary20')?>&nbsp;</a></li>
<li><a href="#a20"><?=getTranslation('mobilbettingglossary21')?>&nbsp;</a></li>
<li><a href="#a21"><?=getTranslation('mobilbettingglossary22')?>&nbsp;</a></li>
<li><a href="#a22"><?=getTranslation('mobilbettingglossary23')?>&nbsp;</a></li>
<li><a href="#a23"><?=getTranslation('mobilbettingglossary24')?>&nbsp;</a></li>
<li><a href="#a24"><?=getTranslation('mobilbettingglossary25')?>&nbsp;</a></li>
<li><a href="#a25"><?=getTranslation('mobilbettingglossary26')?>&nbsp;</a></li>
<li><a href="#a26"><?=getTranslation('mobilbettingglossary27')?>&nbsp;</a></li>
<li><a href="#a27"><?=getTranslation('mobilbettingglossary28')?>&nbsp;</a></li>
<li><a href="#a28"><?=getTranslation('mobilbettingglossary29')?>&nbsp;</a></li>
<li><a href="#a29"><?=getTranslation('mobilbettingglossary30')?>&nbsp;</a></li>
<li><a href="#a30"><?=getTranslation('mobilbettingglossary31')?>&nbsp;</a></li>
<li><a href="#a31"><?=getTranslation('mobilbettingglossary32')?>&nbsp;</a></li>
<li><a href="#a32"><?=getTranslation('mobilbettingglossary33')?>&nbsp;</a></li>
<li><a href="#a33"><?=getTranslation('mobilbettingglossary34')?>&nbsp;</a></li>
<li><a href="#a34"><?=getTranslation('mobilbettingglossary35')?>&nbsp;</a></li>
<li><a href="#a35"><?=getTranslation('mobilbettingglossary36')?>&nbsp;</a></li>
<li><a href="#a36"><?=getTranslation('mobilbettingglossary37')?>&nbsp;</a></li>
<li><a href="#a37"><?=getTranslation('mobilbettingglossary38')?>&nbsp;</a></li>
<li><a href="#a38"><?=getTranslation('mobilbettingglossary39')?>&nbsp;</a></li>
<li><a href="#a39"><?=getTranslation('mobilbettingglossary40')?>&nbsp;</a></li>
<li><a href="#a40"><?=getTranslation('mobilbettingglossary41')?>&nbsp;</a></li>
<li><a href="#a41"><?=getTranslation('mobilbettingglossary42')?>&nbsp;</a></li>
<li><a href="#a42"><?=getTranslation('mobilbettingglossary43')?>&nbsp;</a></li>
<li><a href="#a43"><?=getTranslation('mobilbettingglossary44')?>&nbsp;</a></li>
<li><a href="#a44"><?=getTranslation('mobilbettingglossary45')?>&nbsp;</a></li>
<li><a href="#a45"><?=getTranslation('mobilbettingglossary46')?>&nbsp;</a></li>
</ul>
</div> <div><a name="a0"></a>&nbsp;<br> <h2>1</h2> <br>
<div> <div><?=getTranslation('mobilbettingglossary47')?></div> </div>
<div><a href="#top">↑ <?=getTranslation('mobilbettingglossary149')?> </a></div>
<a name="a1"></a>&nbsp;<br> <h2>X</h2> <br>
<div> <div><?=getTranslation('mobilbettingglossary48')?></div> </div>
<div><a href="#top">↑ <?=getTranslation('mobilbettingglossary149')?> </a></div>
<a name="a2"></a>&nbsp;<br> <h2>2</h2> <br>
<div> <div><?=getTranslation('mobilbettingglossary49')?></div> </div>
<div><a href="#top">↑ <?=getTranslation('mobilbettingglossary149')?> </a></div>
<a name="a3"></a>&nbsp;<br> <h2>X:X</h2> <br>
<div>
<div><?=getTranslation('mobilbettingglossary50')?></div>
<div><?=getTranslation('mobilbettingglossary51')?></div>
<div><?=getTranslation('mobilbettingglossary52')?></div>
</div>
<div><a href="#top">↑ <?=getTranslation('mobilbettingglossary149')?> </a></div>
<a name="a4"></a>&nbsp;<br> <h2><?=getTranslation('mobilbettingglossary5')?></h2> <br>
<div> <div><?=getTranslation('mobilbettingglossary53')?></div> </div>
<div><a href="#top">↑ <?=getTranslation('mobilbettingglossary149')?> </a></div>
<a name="a5"></a>&nbsp;<br> <h2><?=getTranslation('mobilbettingglossary6')?></h2> <br>
<div> <div><?=getTranslation('mobilbettingglossary54')?></div> </div>
<div><a href="#top">↑ <?=getTranslation('mobilbettingglossary149')?> </a></div>
<a name="a6"></a>&nbsp;<br> <h2><?=getTranslation('mobilbettingglossary7')?></h2> <br>
<div>
<div><?=getTranslation('mobilbettingglossary55')?></div>
<div><?=getTranslation('mobilbettingglossary56')?></div>
<div><?=getTranslation('mobilbettingglossary57')?></div>
<div><?=getTranslation('mobilbettingglossary58')?></div>
<div><?=getTranslation('mobilbettingglossary59')?></div>
<div><?=getTranslation('mobilbettingglossary60')?></div>
<div><?=getTranslation('mobilbettingglossary61')?></div>
<div><?=getTranslation('mobilbettingglossary62')?></div>
</div>
<div><a href="#top">↑ <?=getTranslation('mobilbettingglossary149')?> </a></div>
<a name="a7"></a>&nbsp;<br> <h2><?=getTranslation('mobilbettingglossary8')?></h2> <br>
<div>
<div><?=getTranslation('mobilbettingglossary63')?></div>
<div><?=getTranslation('mobilbettingglossary64')?></div>
<div><?=getTranslation('mobilbettingglossary65')?></div>
<div><?=getTranslation('mobilbettingglossary66')?></div>
<div><?=getTranslation('mobilbettingglossary67')?></div>
<div><?=getTranslation('mobilbettingglossary68')?></div>
<div><?=getTranslation('mobilbettingglossary69')?></div>
<div><?=getTranslation('mobilbettingglossary70')?></div>
<div><?=getTranslation('mobilbettingglossary71')?></div>
</div>
<div><a href="#top">↑ <?=getTranslation('mobilbettingglossary149')?> </a></div>
<a name="a8"></a>&nbsp;<br> <h2><?=getTranslation('mobilbettingglossary9')?></h2> <br>
<div> <div><?=getTranslation('mobilbettingglossary72')?></div> </div> 
<div><a href="#top">↑ <?=getTranslation('mobilbettingglossary149')?> </a></div>
<a name="a9"></a>&nbsp;<br> <h2><?=getTranslation('mobilbettingglossary10')?></h2> <br>
<div> <div><?=getTranslation('mobilbettingglossary73')?></div> </div>
<div><a href="#top">↑ <?=getTranslation('mobilbettingglossary149')?> </a></div>
<a name="a10"></a>&nbsp;<br> <h2><?=getTranslation('mobilbettingglossary11')?></h2> <br>
<div>
<div><?=getTranslation('mobilbettingglossary74')?></div> 
<div>&nbsp;</div>
<div><?=getTranslation('mobilbettingglossary75')?></div>
<div><?=getTranslation('mobilbettingglossary76')?>:</div>
<div><?=getTranslation('mobilbettingglossary77')?></div>
<div><?=getTranslation('mobilbettingglossary78')?>:</div>
<div><strong><?=getTranslation('mobilbettingglossary79')?></strong> - <?=getTranslation('mobilbettingglossary80')?></div>
<div><strong><?=getTranslation('mobilbettingglossary81')?></strong> - <?=getTranslation('mobilbettingglossary82')?></div>
<div><strong><?=getTranslation('mobilbettingglossary83')?></strong> - <?=getTranslation('mobilbettingglossary84')?></div>
<div><strong><?=getTranslation('mobilbettingglossary85')?></strong> - <?=getTranslation('mobilbettingglossary86')?></div>
<div><?=getTranslation('mobilbettingglossary87')?></div>
<div><?=getTranslation('mobilbettingglossary88')?></div>
</div>
<div><a href="#top">↑ <?=getTranslation('mobilbettingglossary149')?> </a></div>
<a name="a11"></a>&nbsp;<br> <h2><?=getTranslation('mobilbettingglossary12')?></h2> <br>
<div> <div><?=getTranslation('mobilbettingglossary89')?></div> </div>
<div><a href="#top">↑ <?=getTranslation('mobilbettingglossary149')?> </a></div>
<a name="a12"></a>&nbsp;<br> <h2><?=getTranslation('mobilbettingglossary13')?></h2> <br>
<div>
<div><?=getTranslation('mobilbettingglossary90')?></div>
<div><?=getTranslation('mobilbettingglossary91')?></div>
</div>
<div><a href="#top">↑ <?=getTranslation('mobilbettingglossary149')?> </a></div>
<a name="a13"></a>&nbsp;<br> <h2><?=getTranslation('mobilbettingglossary14')?></h2> <br>
<div>
<div><?=getTranslation('mobilbettingglossary92')?></div>
<div><?=getTranslation('mobilbettingglossary93')?></div>
</div>
<div><a href="#top">↑ <?=getTranslation('mobilbettingglossary149')?> </a></div>
<a name="a14"></a>&nbsp;<br> <h2><?=getTranslation('mobilbettingglossary15')?></h2> <br>
<div> <div><?=getTranslation('mobilbettingglossary94')?></div> </div>
<div><a href="#top">↑ <?=getTranslation('mobilbettingglossary149')?> </a></div>
<a name="a15"></a>&nbsp;<br> <h2><?=getTranslation('mobilbettingglossary16')?></h2> <br>
<div>
<div><?=getTranslation('mobilbettingglossary95')?></div>
<div><?=getTranslation('mobilbettingglossary96')?></div>
</div>
<div><a href="#top">↑ <?=getTranslation('mobilbettingglossary149')?> </a></div>
<a name="a16"></a>&nbsp;<br> <h2><?=getTranslation('mobilbettingglossary17')?></h2> <br>
<div>
<div><?=getTranslation('mobilbettingglossary97')?></div>
<div><?=getTranslation('mobilbettingglossary98')?></div>
</div>
<div><a href="#top">↑ <?=getTranslation('mobilbettingglossary149')?> </a></div>
<a name="a17"></a>&nbsp;<br> <h2><?=getTranslation('mobilbettingglossary18')?></h2> <br>
<div> <div><?=getTranslation('mobilbettingglossary99')?></div> </div>
<div><a href="#top">↑ <?=getTranslation('mobilbettingglossary149')?> </a></div>
<a name="a18"></a>&nbsp;<br> <h2><?=getTranslation('mobilbettingglossary19')?></h2> <br>
<div>
<div><?=getTranslation('mobilbettingglossary100')?></div>
<div><?=getTranslation('mobilbettingglossary101')?></div>
</div>
<div><a href="#top">↑ <?=getTranslation('mobilbettingglossary149')?> </a></div>
<a name="a19"></a>&nbsp;<br> <h2><?=getTranslation('mobilbettingglossary20')?></h2> <br>
<div> <div><?=getTranslation('mobilbettingglossary102')?></div> </div>
<div><a href="#top">↑ <?=getTranslation('mobilbettingglossary149')?> </a></div>
<a name="a20"></a>&nbsp;<br> <h2><?=getTranslation('mobilbettingglossary21')?></h2> <br>
<div> <div><?=getTranslation('mobilbettingglossary103')?></div> </div>
<div><a href="#top">↑ <?=getTranslation('mobilbettingglossary149')?> </a></div>
<a name="a21"></a>&nbsp;<br> <h2><?=getTranslation('mobilbettingglossary22')?></h2> <br>
<div> <div><?=getTranslation('mobilbettingglossary104')?></div> </div>
<div><a href="#top">↑ <?=getTranslation('mobilbettingglossary149')?> </a></div>
<a name="a22"></a>&nbsp;<br> <h2><?=getTranslation('mobilbettingglossary23')?></h2> <br>
<div> <div><?=getTranslation('mobilbettingglossary105')?></div> </div>
<div><a href="#top">↑ <?=getTranslation('mobilbettingglossary149')?> </a></div>
<a name="a23"></a>&nbsp;<br> <h2><?=getTranslation('mobilbettingglossary24')?></h2> <br>
<div>
<div><?=getTranslation('mobilbettingglossary106')?></div>
<div><?=getTranslation('mobilbettingglossary107')?></div>
<div><?=getTranslation('mobilbettingglossary108')?></div>
<div><?=getTranslation('mobilbettingglossary109')?></div>
<div><?=getTranslation('mobilbettingglossary110')?></div>
<div><?=getTranslation('mobilbettingglossary111')?></div>
</div>
<div><a href="#top">↑ <?=getTranslation('mobilbettingglossary149')?> </a></div>
<a name="a24"></a>&nbsp;<br> <h2><?=getTranslation('mobilbettingglossary25')?></h2> <br>
<div> <div><?=getTranslation('mobilbettingglossary112')?></div> </div>
<div><a href="#top">↑ <?=getTranslation('mobilbettingglossary149')?> </a></div>
<a name="a25"></a>&nbsp;<br> <h2><?=getTranslation('mobilbettingglossary26')?></h2> <br>
<div> <div><?=getTranslation('mobilbettingglossary113')?></div> </div>
<div><a href="#top">↑ <?=getTranslation('mobilbettingglossary149')?> </a></div>
<a name="a26"></a>&nbsp;<br> <h2><?=getTranslation('mobilbettingglossary27')?></h2> <br>
<div> <div><?=getTranslation('mobilbettingglossary114')?></div> </div>
<div><a href="#top">↑ <?=getTranslation('mobilbettingglossary149')?> </a></div>
<a name="a27"></a>&nbsp;<br> <h2><?=getTranslation('mobilbettingglossary28')?></h2> <br>
<div> <div><?=getTranslation('mobilbettingglossary115')?></div> </div>
<div><a href="#top">↑ <?=getTranslation('mobilbettingglossary149')?> </a></div>
<a name="a28"></a>&nbsp;<br> <h2><?=getTranslation('mobilbettingglossary29')?></h2> <br>
<div>
<div><?=getTranslation('mobilbettingglossary116')?></div>
<div><?=getTranslation('mobilbettingglossary117')?></div>
</div>
<div><a href="#top">↑ <?=getTranslation('mobilbettingglossary149')?> </a></div>
<a name="a29"></a>&nbsp;<br> <h2><?=getTranslation('mobilbettingglossary30')?></h2> <br>
<div> <div><?=getTranslation('mobilbettingglossary118')?></div> </div>
<div><a href="#top">↑ <?=getTranslation('mobilbettingglossary149')?> </a></div>
<a name="a30"></a>&nbsp;<br> <h2><?=getTranslation('mobilbettingglossary31')?></h2> <br>
<div> <div><?=getTranslation('mobilbettingglossary119')?></div> </div>
<div><a href="#top">↑ <?=getTranslation('mobilbettingglossary149')?> </a></div>
<a name="a31"></a>&nbsp;<br> <h2><?=getTranslation('mobilbettingglossary32')?></h2> <br>
<div> <div><?=getTranslation('mobilbettingglossary120')?></div> </div>
<div><a href="#top">↑ <?=getTranslation('mobilbettingglossary149')?> </a></div>
<a name="a32"></a>&nbsp;<br> <h2><?=getTranslation('mobilbettingglossary33')?></h2> <br>
<div>
<div><?=getTranslation('mobilbettingglossary121')?></div>
<div><?=getTranslation('mobilbettingglossary122')?></div>
</div>
<div><a href="#top">↑ <?=getTranslation('mobilbettingglossary149')?> </a></div>
<a name="a33"></a>&nbsp;<br> <h2><?=getTranslation('mobilbettingglossary34')?></h2> <br>
<div> <div><?=getTranslation('mobilbettingglossary123')?></div> </div>
<div><a href="#top">↑ <?=getTranslation('mobilbettingglossary149')?> </a></div>
<a name="a34"></a>&nbsp;<br> <h2><?=getTranslation('mobilbettingglossary35')?></h2> <br>
<div> <div><?=getTranslation('mobilbettingglossary124')?></div> </div>
<div><a href="#top">↑ <?=getTranslation('mobilbettingglossary149')?> </a></div>
<a name="a35"></a>&nbsp;<br> <h2><?=getTranslation('mobilbettingglossary36')?></h2> <br> 
<div> <div><?=getTranslation('mobilbettingglossary125')?></div> </div> 
<div><a href="#top">↑ <?=getTranslation('mobilbettingglossary149')?> </a></div>
<a name="a36"></a>&nbsp;<br> <h2><?=getTranslation('mobilbettingglossary37')?></h2> <br>
<div> <div><?=getTranslation('mobilbettingglossary126')?></div> </div>
<div><a href="#top">↑ <?=getTranslation('mobilbettingglossary149')?> </a></div>
<a name="a37"></a>&nbsp;<br> <h2><?=getTranslation('mobilbettingglossary38')?></h2> <br>
<div>
<div><?=getTranslation('mobilbettingglossary127')?></div>
<div><?=getTranslation('mobilbettingglossary128')?></div>
</div>
<div><a href="#top">↑ <?=getTranslation('mobilbettingglossary149')?> </a></div>
<a name="a38"></a>&nbsp;<br> <h2><?=getTranslation('mobilbettingglossary39')?></h2> <br>
<div>
<div><?=getTranslation('mobilbettingglossary129')?></div>
<div><?=getTranslation('mobilbettingglossary130')?>:</div>
<div><strong><?=getTranslation('mobilbettingglossary131')?></strong> - <?=getTranslation('mobilbettingglossary132')?></div>
<div><strong><?=getTranslation('mobilbettingglossary133')?></strong> - <?=getTranslation('mobilbettingglossary134')?></div>
<div><strong><?=getTranslation('mobilbettingglossary135')?></strong> - <?=getTranslation('mobilbettingglossary136')?></div>
<div><strong><?=getTranslation('mobilbettingglossary137')?></strong> - <?=getTranslation('mobilbettingglossary138')?></div>
<div><?=getTranslation('mobilbettingglossary139')?></div>
<div><?=getTranslation('mobilbettingglossary140')?></div>
</div>
<div><a href="#top">↑ <?=getTranslation('mobilbettingglossary149')?> </a></div>
<a name="a39"></a>&nbsp;<br> <h2><?=getTranslation('mobilbettingglossary40')?></h2> <br> 
<div> <div><?=getTranslation('mobilbettingglossary141')?></div> </div>
<div><a href="#top">↑ <?=getTranslation('mobilbettingglossary149')?> </a></div>
<a name="a40"></a>&nbsp;<br> <h2><?=getTranslation('mobilbettingglossary41')?></h2> <br>
<div> <div><?=getTranslation('mobilbettingglossary142')?></div> </div>
<div><a href="#top">↑ <?=getTranslation('mobilbettingglossary149')?> </a></div>
<a name="a41"></a>&nbsp;<br>
<h2><?=getTranslation('mobilbettingglossary42')?></h2>
<br>
<div> <div><?=getTranslation('mobilbettingglossary143')?></div> </div>
<div><a href="#top">↑ <?=getTranslation('mobilbettingglossary149')?> </a></div>
<a name="a42"></a>&nbsp;
<br> <h2><?=getTranslation('mobilbettingglossary43')?></h2> <br>
<div> <div><?=getTranslation('mobilbettingglossary144')?></div> </div>
<div><a href="#top">↑ <?=getTranslation('mobilbettingglossary149')?> </a></div>
<a name="a43"></a>&nbsp;
<br>
<h2><?=getTranslation('mobilbettingglossary44')?></h2>
<br>
<div> <div><?=getTranslation('mobilbettingglossary145')?></div> </div>
<div><a href="#top">↑ <?=getTranslation('mobilbettingglossary149')?> </a></div>
<a name="a44"></a>&nbsp;<br>
<h2><?=getTranslation('mobilbettingglossary45')?></h2>
<br>
<div>
<div><?=getTranslation('mobilbettingglossary146')?></div>
<div><?=getTranslation('mobilbettingglossary147')?></div>
</div>
<div><a href="#top">↑ <?=getTranslation('mobilbettingglossary149')?> </a></div>
<a name="a45"></a>&nbsp;<br>
<h2><?=getTranslation('mobilbettingglossary46')?></h2>
<br>
<div><div><?=getTranslation('mobilbettingglossary148')?></div></div>
<div><a href="#top">↑ <?=getTranslation('mobilbettingglossary149')?> </a></div>
</div>
</div>
</div>
</div>
</div>
	
	
	
</div>  </div><div class="contentbottom hidden"> </div><div class="spacer">&nbsp;</div></div>
</div>
</div>
</div>

<?php include 'footer.php'; ?>

</body>
</html>