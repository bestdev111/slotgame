<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:login.php"); exit(); }

if(isset($_GET['language'])){

$bilgile = bilgi("select * from language_content where name='".$ub['username']."' limit 1");
if($bilgile['id']==''){
sed_sql_query("INSERT INTO language_content SET name='".$ub['username']."', language='".$_GET['language']."'");
} else {
sed_sql_query("update language_content set language='".$_GET['language']."' where name='".$ub['username']."'");
}
header("Location:preferences");
}

$dil_bilgisi = bilgi("select * from language_content where name='".$ub['username']."' limit 1");

?>
<?php include 'header.php'; ?>

<div id="page1" class="page top">
<div class="scroll_container" onscroll="scrollActions(this, true)">
<div class="scroll_wrapper" style="padding-top: 44px; padding-bottom: 44px;">
<div class="appcontent">
<div>
<div class="bartitle iconbar settings"><div class="text"><?=getTranslation('mobilpreferences1')?></div></div>
<div class="barmiddle arrow preload1" onclick="getpreferences('language');">
<div class="text"><?=getTranslation('mobilpreferences23')?></div>
<div class="value">

<? if($dil_bilgisi['language']=='tr'){?>
<div class="flag tr"><?=getTranslation('dilsecimi1')?></div>
<? }  else if($dil_bilgisi['language']=='en'){?>
<div class="flag en"><?=getTranslation('dilsecimi2')?></div>
<? } else if($dil_bilgisi['language']=='de'){?>
<div class="flag de"><?=getTranslation('dilsecimi3')?></div>
<? } else if($dil_bilgisi['language']=='ar'){?>
<div class="flag ar"><?=getTranslation('dilsecimi4')?></div>
<? } else if($dil_bilgisi['language']=='ru'){?>
<div class="flag ru"><?=getTranslation('dilsecimi5')?></div>
<? } else { ?>
<div class="flag tr"><?=getTranslation('dilsecimi1')?></div>
<? } ?>

</div>
</div>
<div class="barmiddle arrow preload1">
<div class="text"><?=getTranslation('mobilpreferences2')?></div>
<div class="value"><?=getTranslation('mobilpreferences3')?></div>
</div>
<div class="barmiddle arrow preload1">
<div class="text"><?=getTranslation('mobilpreferences4')?></div>
<div class="value"><?=getTranslation('mobilpreferences5')?><br><?=getTranslation('mobilpreferences6')?></div>
</div>
<div class="barmiddle arrow " onclick="getpreferences('limitsAndBlocks')">
<div class="text"><?=getTranslation('mobilpreferences7')?></div>
<div class="value"><?=getTranslation('mobilpreferences8')?></div>
</div>
</div>
<div class="contentbottom hidden"> </div>
<div class="spacer">&nbsp;</div>
</div>
</div></div>
</div>

<div id="page2" class="page top" style="display:none;">
<div class="scroll_container">
<div class="scroll_wrapper" style="padding-top: 44px; padding-bottom: 44px;">
<div class="appcontent">

<div onclick="getle('preferences?language=tr')" class="navitem arrow">
<div class="icon"><div style="background-color: transparent;background-repeat: no-repeat;height: 24px;width: 24px;display: block;padding: initial;" class="flag tr"></div></div>
<div class="text"><?=getTranslation('dilsecimi1')?></div>
</div>

<div onclick="getle('preferences?language=en')" class="navitem arrow">
<div class="icon"><div style="background-color: transparent;background-repeat: no-repeat;height: 24px;width: 24px;display: block;padding: initial;" class="flag en"></div></div>
<div class="text"><?=getTranslation('dilsecimi2')?></div>
</div>

<div onclick="getle('preferences?language=de')" class="navitem arrow">
<div class="icon"><div style="background-color: transparent;background-repeat: no-repeat;height: 24px;width: 24px;display: block;padding: initial;" class="flag de"></div></div>
<div class="text"><?=getTranslation('dilsecimi3')?></div>
</div>

<div onclick="getle('preferences?language=ar')" class="navitem arrow">
<div class="icon"><div style="background-color: transparent;background-repeat: no-repeat;height: 24px;width: 24px;display: block;padding: initial;" class="flag ar"></div></div>
<div class="text"><?=getTranslation('dilsecimi4')?></div>
</div>

<div onclick="getle('preferences?language=ru')" class="navitem arrow">
<div class="icon"><div style="background-color: transparent;background-repeat: no-repeat;height: 24px;width: 24px;display: block;padding: initial;" class="flag ru"></div></div>
<div class="text"><?=getTranslation('dilsecimi5')?></div>
</div>

<div class="contentbottom hidden"> </div>
<div class="spacer">&nbsp;</div>
</div>
</div>
</div>
</div>

<div id="page3" class="page top" style="display:none;">
<div class="scroll_container" onscroll="scrollActions(this, true)">
<div class="scroll_wrapper" style="padding-top: 44px; padding-bottom: 44px;">
<div class="appcontent">
<div>
<div class="bartitle"><div class="text"><?=getTranslation('mobilpreferences9')?></div></div>
<div class="barmiddle"><div class="text"><?=getTranslation('mobilpreferences10')?></div></div>
<div class="barmiddle"><div class="text"><?=getTranslation('mobilpreferences11')?></div> <div class="value"><?=userayar('max_satir'); ?> <?=getTranslation('ayardosyasi20')?></div></div>
<div class="barmiddle"><div class="text"><?=getTranslation('mobilpreferences12')?></div> <div class="value"><?=userayar('min_kupon_tutar'); ?></div></div>
<div class="barmiddle"><div class="text"><?=getTranslation('mobilpreferences13')?></div> <div class="value"><?=userayar('min_oran');?></div></div>
<div class="barmiddle"><div class="text"><?=getTranslation('mobilpreferences14')?></div> <div class="value"><?=userayar('maxoran'); ?></div></div>
<div class="barmiddle"><div class="text"><?=getTranslation('mobilpreferences15')?></div> <div class="value"><?=userayar('max_odeme'); ?></div></div>
<div class="barmiddle"><div class="text"><?=getTranslation('mobilpreferences16')?></div> <div class="value"><?=userayar('canli_max_tutar'); ?></div></div>
<div class="barmiddle"><div class="text"><?=getTranslation('mobilpreferences17')?></div> <div class="value"><?=userayar('tekmac_max_tutar'); ?></div></div>
<div class="barmiddle"><div class="text"><?=getTranslation('mobilpreferences18')?></div> <div class="value"><?=userayar('aynikupon_max_tutar'); ?></div></div>
<div class="barbottom"><div class="text"><?=getTranslation('mobilpreferences19')?></div> <div class="value"><?=userayar('aynikuponmax'); ?></div></div>
<div class="barbottom"><div class="text"><?=getTranslation('mobilpreferences20')?></div> <div class="value"><? if(userayar('sistemlikupon')==1){ ?><?=getTranslation('mobilpreferences21')?><? } else if(userayar('sistemlikupon')==2){ ?><?=getTranslation('mobilpreferences22')?><? } else { ?><?=getTranslation('mobilpreferences22')?><? } ?></div></div>
</div>
<div class="contentbottom hidden"> </div>
<div class="spacer">&nbsp;</div>
</div>
</div>
</div>
</div>

<script>
function getpreferences(val){
	if(val=="language"){
		$("#page1").hide();
		$("#page2").show();
		$("#page3").hide();
	} else if (val=="limitsAndBlocks"){
		$("#page1").hide();
		$("#page2").hide();
		$("#page3").show();
	}
}
function hesabim(){
$.get('',function(data) {
$("#kupons").html(data);
});
}
hesabim();
</script>

<?php include 'footer.php'; ?>

</body>
</html>