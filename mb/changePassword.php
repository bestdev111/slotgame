<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); die(); exit(); }

// POST BAŞLANGIÇ //
if(isset($_POST['submit'])){

if($_POST["eskiparola"]=="") {
$onaylandi = 4;
} else if($_POST["yeniparola"]=="") {
$onaylandi = 5;
} else if($_POST["yeniparola2"]=="") {
$onaylandi = 6;
} else if($ub["password"] != $_POST["eskiparola"]) {
$onaylandi = 3;
} else if($_POST["yeniparola"] != $_POST["yeniparola2"]) {
$onaylandi = 2;
} else if($_POST["yeniparola"] == $_POST["yeniparola2"]) {
$sifredegistir = $_POST["yeniparola2"];
sed_sql_query("update kullanici set password = '".$sifredegistir."' where id='".$ub['id']."'");
$onaylandi = 1;
}

}

?>
<? include 'header.php'; ?>
<script>$("#baslikdivi").html('<span><?=getTranslation('mobilchangepasswordheaderdiv')?></span>');</script>

<? if($onaylandi==1) { ?>
<script>
alert('<?=getTranslation('mobilchangepassword1')?> <?=getTranslation('yeniyerler_kasa374')?>');
window.location.href='logout';
</script>
<? } else if($onaylandi==2) { ?>
<script>
alert('<?=getTranslation('mobilchangepassword2')?>');
</script>
<? } else if($onaylandi==3) { ?>
<script>
alert('<?=getTranslation('mobilchangepassword3')?>');
</script>
<? } else if($onaylandi==4) { ?>
<script>
alert('<?=getTranslation('mobilchangepassword4')?>');
</script>
<? } else if($onaylandi==5) { ?>
<script>
alert('<?=getTranslation('mobilchangepassword5')?>');
</script>
<? } else if($onaylandi==6) { ?>
<script>
alert('<?=getTranslation('mobilchangepassword6')?>');
</script>
<? } ?>

<div id="page1" class="page top">
<div class="scroll_container" onscroll="scrollActions(this, true)">
<div class="scroll_wrapper" style="padding-top: 44px; padding-bottom: 44px;">
<div class="appcontent">
<div class="" id="registrationPage" onclick="">
<div class="" id="registrationWrap" onclick="">
<form method="post" class="form" id="registration">
<div class="hidden"><input type="hidden" name="checkRequest" value="true"></div>
<div class="hidden"><input type="hidden" name="storeOnly" value="false"></div>
<div class="formGroup" id="" onclick="">
<div class="col-xs-12">
<div class="title hidden"></div>
<div class="wrap" id="changePasswordOldPassword">
<input type="password" onkeyup="checkInput(this)" class="" maxlength="12" placeholder="<?=getTranslation('mobilchangepassword7')?>" name="eskiparola" id="eskiparola">
<div class="show-password" onclick="showPassword(this)"></div>
<div style="right:65px;" class="clear hidden" onclick="clearInput(this)"></div>
<div></div>
</div>
</div>
</div>
<div class="formGroup" id="" onclick="">
<div class="col-xs-12">
<div class="title hidden"></div>
<div class="wrap" id="changePasswordNewPassword">
<input type="password" onkeyup="checkInput(this)" class="" placeholder="<?=getTranslation('mobilchangepassword8')?>" maxlength="12" name="yeniparola" name="yeniparola">
<div class="show-password" onclick="showPassword(this)"></div>
<div style="right:65px;" class="clear hidden" onclick="clearInput(this)"></div>
<div></div>
</div>
</div>
</div>
<div class="formGroup" id="" onclick="">
<div class="col-xs-12">
<div class="title hidden"></div>
<div class="wrap" id="changePasswordPasswordRepetition">
<input type="password" onkeyup="checkInput(this)" class="" placeholder="<?=getTranslation('mobilchangepassword9')?>" maxlength="12" name="yeniparola2" name="yeniparola2">
<div class="show-password" onclick="showPassword(this)"></div>
<div style="right:65px;" class="clear hidden" onclick="clearInput(this)"></div>
<div></div>
</div>
</div>
</div>
<div class="formGroup" id="" onclick="">
<div class="col-xs-12">
<div class="generatePassword"><span class="icon"></span><span class="text" onclick="generatePasswordAndFillFields()"><?=getTranslation('mobilchangepassword10')?></span></div>
</div>
</div>
<div>
<div class="wrap cancel">
<input type="button" class="submit simple" onclick="getle('account');" value="<?=getTranslation('mobilchangepassword12')?>">
<input type="submit" name="submit" class="submit" value="<?=getTranslation('mobilchangepassword11')?>">
</div>
</div>
</form>
</div>
</div>
<div class="contentbottom hidden"> </div>
<div class="spacer">&nbsp;</div>
</div>
</div>
</div>
</div>

<script>
window.showPassword = function(a) {
        a = $(a).prev("input");
        "password" == a.prop("type") ? a.prop("type", "text") : a.prop("type", "password")
    };
window.clearInput = function(a) {
$(a).siblings("input").first().val("").removeClass("active");
$(a).addClass("hidden")
};
window.checkInput = function(a) {
window.setTimeout(function() {
var b = $(a).val();
$(a).siblings(".clear").first().toggleClass("hidden", "" == b || !$(a).is(":focus"));
$(a).toggleClass("active", !("" == b || !$(a).is(":focus")))
}, 200)
};
</script>

<?php include 'footer.php'; ?>

</body>
</html>