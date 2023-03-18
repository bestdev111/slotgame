<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:login.php"); exit(); }
?>
<?php include 'header.php'; ?>

<div id="page1" class="page top">
<div class="scroll_container" onscroll="scrollActions(this, true)">
<div class="scroll_wrapper" style="padding-top: 44px; padding-bottom: 44px;">
<div class="appcontent">
<div class="html">
<div id="help" style="">
<br><h2 class="h1"><?=getTranslation('mobilhelp2')?></h2><br>
<div class="cms_richtext">
<div>
<style type="text/css"> ul, li {     list-style: none; } </style>
</div>
<div id="terms">
<div class="macro bg_grey main_space" style="margin-left: -5%;margin-right: -5%;">
<ul>     
<li><a href="#lost_password"><?=getTranslation('mobilhelp3')?>&nbsp;</a></li>
<li><a href="#lost_username"><?=getTranslation('mobilhelp4')?>&nbsp;</a></li>
<li><a href="#boni"><?=getTranslation('mobilhelp5')?>&nbsp;</a></li>
<li><a href="#payin_methods"><?=getTranslation('mobilhelp6')?>&nbsp;</a></li>
<li><a href="#fee"><?=getTranslation('mobilhelp7')?>&nbsp;</a></li>
<li><a href="#bank_transfer"><?=getTranslation('mobilhelp8')?>&nbsp;</a></li>
<li><a href="#payout"><?=getTranslation('mobilhelp9')?>&nbsp;</a></li>
<li><a href="#payout_without_fee"><?=getTranslation('mobilhelp10')?>&nbsp;</a></li>
<li><a href="#transfer_time"><?=getTranslation('mobilhelp11')?>&nbsp;</a></li>
<li><a href="#credit"><?=getTranslation('mobilhelp12')?>&nbsp;</a></li>
<li><a href="#max_win"><?=getTranslation('mobilhelp13')?>&nbsp;</a></li>
<li><a href="#min"><?=getTranslation('mobilhelp14')?>&nbsp;</a></li>
<li><a href="#bet_count"><?=getTranslation('mobilhelp15')?>&nbsp;</a></li>
<li><a href="#wettantrag"><?=getTranslation('mobilhelp16')?>&nbsp;</a></li>
<li><a href="#a0"><?=getTranslation('mobilhelp17')?>&nbsp;</a></li>
<li><a href="#happens"><?=getTranslation('mobilhelp18')?>&nbsp;</a></li>
<li><a href="#error"><?=getTranslation('mobilhelp19')?>&nbsp;</a></li>
<li><a href="#sportart"><?=getTranslation('mobilhelp20')?>&nbsp;</a></li>
<li><a href="#a1"><?=getTranslation('mobilhelp21')?>&nbsp;</a></li>
</ul>
</div>
<div><a name="lost_password"></a>&nbsp;<br>
<h2><?=getTranslation('mobilhelp3')?></h2>
<div>
<div><?=getTranslation('mobilhelp22')?></div>
<div><?=getTranslation('mobilhelp23')?></div>
<div><?=getTranslation('mobilhelp24')?></div>
<div><?=getTranslation('mobilhelp25')?></div>
</div>
<div><a href="#top">↑ <?=getTranslation('mobilhelp87')?> </a></div> <a name="lost_username"></a>&nbsp;<br>
<h2><?=getTranslation('mobilhelp4')?></h2>
<div>
<div><?=getTranslation('mobilhelp26')?></div>
<div><?=getTranslation('mobilhelp27')?></div>
<div><?=getTranslation('mobilhelp28')?></div>
<div><?=getTranslation('mobilhelp29')?></div>
</div>
<div><a href="#top">↑ <?=getTranslation('mobilhelp87')?> </a></div> <a name="boni"></a>&nbsp;<br>
<h2><?=getTranslation('mobilhelp5')?></h2>
<div>
<div><?=getTranslation('mobilhelp30')?></div>
<div><?=getTranslation('mobilhelp31')?></div>
</div>
<div><a href="#top">↑ <?=getTranslation('mobilhelp87')?> </a></div> <a name="payin_methods"></a>&nbsp;<br>
<h2><?=getTranslation('mobilhelp6')?></h2>
<br>
<div>
<div><?=getTranslation('mobilhelp32')?></div>
<div><?=getTranslation('mobilhelp33')?></div>
</div>
<div><a href="#top">↑ <?=getTranslation('mobilhelp87')?> </a></div> <a name="fee"></a>&nbsp;<br>
<h2><?=getTranslation('mobilhelp7')?></h2>
<div>
<div><?=getTranslation('mobilhelp34')?></div>
<div><?=getTranslation('mobilhelp35')?></div>
<div><?=getTranslation('mobilhelp36')?></div>
</div>
<div><a href="#top">↑ <?=getTranslation('mobilhelp87')?> </a></div> <a name="bank_transfer"></a>&nbsp;<br>
<h2><?=getTranslation('mobilhelp8')?></h2>
<div>
<div><?=getTranslation('mobilhelp37')?></div>
<div><?=getTranslation('mobilhelp38')?></div>
<div><?=getTranslation('mobilhelp39')?></div>
<div><?=getTranslation('mobilhelp40')?></div>
<div><?=getTranslation('mobilhelp41')?></div>
</div>
<div><a href="#top">↑ <?=getTranslation('mobilhelp87')?> </a></div> <a name="payout"></a>&nbsp;<br>
<h2><?=getTranslation('mobilhelp9')?></h2>
<div>
<div><?=getTranslation('mobilhelp42')?></div>
<div><?=getTranslation('mobilhelp43')?></div>
<div><?=getTranslation('mobilhelp44')?></div>
<div><?=getTranslation('mobilhelp45')?></div>
<div><?=getTranslation('mobilhelp46')?></div>
</div>
<div><a href="#top">↑ <?=getTranslation('mobilhelp87')?> </a></div> <a name="payout_without_fee"></a>&nbsp;<br>
<h2><?=getTranslation('mobilhelp10')?></h2>
<div>
<div><?=getTranslation('mobilhelp47')?></div>
<div><?=getTranslation('mobilhelp48')?></div>
<div><?=getTranslation('mobilhelp49')?></div>
</div> 
<div><a href="#top">↑ <?=getTranslation('mobilhelp87')?> </a></div> <a name="transfer_time"></a>&nbsp;<br>
<h2><?=getTranslation('mobilhelp11')?></h2>
<div>
<div><?=getTranslation('mobilhelp50')?></div>
<div><?=getTranslation('mobilhelp51')?></div>
<div><?=getTranslation('mobilhelp52')?></div>
</div>
<div><a href="#top">↑ <?=getTranslation('mobilhelp87')?> </a></div> <a name="credit"></a>&nbsp;<br>
<h2><?=getTranslation('mobilhelp12')?></h2>
<div>
<div><?=getTranslation('mobilhelp53')?></div>
<div><?=getTranslation('mobilhelp54')?></div>
</div>
<div><a href="#top">↑ <?=getTranslation('mobilhelp87')?> </a></div> <a name="max_win"></a>&nbsp;<br>
<h2><?=getTranslation('mobilhelp13')?></h2>
<div>
<div><?=getTranslation('mobilhelp55')?></div>
<div><?=getTranslation('mobilhelp56')?></div>
</div>
<div><a href="#top">↑ <?=getTranslation('mobilhelp87')?> </a></div> <a name="min"></a>&nbsp;<br>
<h2><?=getTranslation('mobilhelp14')?></h2>
<div>
<div><?=getTranslation('mobilhelp57')?></div>
<div><?=getTranslation('mobilhelp58')?></div>
</div> 
<div><a href="#top">↑ <?=getTranslation('mobilhelp87')?> </a></div> <a name="bet_count"></a>&nbsp;<br>
<h2><?=getTranslation('mobilhelp15')?></h2>
<div> <div><?=getTranslation('mobilhelp59')?></div> </div>
<div><a href="#top">↑ <?=getTranslation('mobilhelp87')?> </a></div> <a name="wettantrag"></a>&nbsp;<br>
<h2><?=getTranslation('mobilhelp16')?></h2>
<div> <div><?=getTranslation('mobilhelp60')?><br> <br> <strong><?=getTranslation('mobilhelp61')?>:</strong> <?=getTranslation('mobilhelp62')?><br> <br> <u><em><?=getTranslation('mobilhelp63')?></em></u>: <em><?=getTranslation('mobilhelp64')?></em></div> </div>
<div><a href="#top">↑ <?=getTranslation('mobilhelp87')?> </a></div> <a name="a0"></a>&nbsp;<br>
<h2><?=getTranslation('mobilhelp17')?></h2>
<div>
<p><?=getTranslation('mobilhelp65')?></p>
<div><u><em><?=getTranslation('mobilhelp66')?></em></u>: <em><?=getTranslation('mobilhelp67')?></em></div> 
</div>
<div><a href="#top">↑ <?=getTranslation('mobilhelp87')?> </a></div> <a name="happens"></a>&nbsp;<br>
<h2><?=getTranslation('mobilhelp18')?></h2>
<div>
<p><?=getTranslation('mobilhelp68')?></p>
<div><strong><?=getTranslation('mobilhelp69')?></strong>: <?=getTranslation('mobilhelp70')?></div>
<div><?=getTranslation('mobilhelp71')?></div>
<div>&nbsp;</div>
<div><strong><?=getTranslation('mobilhelp72')?></strong>: <?=getTranslation('mobilhelp73')?></div>
<div>&nbsp;</div>
<div><strong><?=getTranslation('mobilhelp74')?></strong>: <?=getTranslation('mobilhelp75')?></div>
<div><?=getTranslation('mobilhelp76')?></div>
</div> 
<div><a href="#top">↑ <?=getTranslation('mobilhelp87')?> </a></div> <a name="error"></a>&nbsp;<br>
<h2><?=getTranslation('mobilhelp19')?></h2>
<div>
<div><?=getTranslation('mobilhelp77')?>:</div>
<div>&nbsp;</div>
<div><strong><?=getTranslation('mobilhelp78')?></strong>: <?=getTranslation('mobilhelp79')?></div>
<div>&nbsp;</div>
<div><strong><?=getTranslation('mobilhelp80')?></strong>: <?=getTranslation('mobilhelp81')?></div>
<div>&nbsp;</div>
<div><strong><?=getTranslation('mobilhelp82')?></strong>: <?=getTranslation('mobilhelp83')?></div>
</div>
<div><a href="#top">↑ <?=getTranslation('mobilhelp87')?> </a></div> <a name="sportart"></a>&nbsp;<br>
<h2><?=getTranslation('mobilhelp20')?></h2> 
<div>
<div><?=getTranslation('mobilhelp84')?></div>
 </div>
<div><a href="#top">↑ <?=getTranslation('mobilhelp87')?> </a></div><a name="a1"></a>&nbsp;<br>
<h2><?=getTranslation('mobilhelp85')?></h2>
<div>
<div><?=getTranslation('mobilhelp86')?></div>
</div>
<div><a href="#top">↑ <?=getTranslation('mobilhelp87')?> </a></div>

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