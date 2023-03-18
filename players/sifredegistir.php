<?
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); die(); exit(); }

// POST BAŞLANGIÇ //
if(isset($_POST['submit'])){

if($ub["password"] != $_POST["eskiparola"]) {
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
<? include 'menu.php'; ?>
<script>$("#sifredegistir").addClass("activemnuitems");</script>

<div id="main" class="lwkSelector" style="width: 786px;">
<div id="live">
<div class="space_20"></div>
<div class="main_space" id="main_wide">
<div class="z-right-container" id="maskcontainer">

<? if($onaylandi==1) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('playerssifre1')?></div>
<? } else if($onaylandi==2) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('playerssifre2')?></div>
<? } else if($onaylandi==3) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('playerssifre3')?></div>
<? } ?>

<form method="post" class="form">
<table class="tablesorter">
<thead>
<tr>
<th colspan="2"><?=getTranslation('playerssifre4')?></th>
</tr>
</thead>
<tbody>

<tr>
<td width="200"><?=getTranslation('playerssifre5')?></td>
<td>
<input type="text" class="inputText" style="width:250px" maxlength="12" name="eskiparola" id="eskiparola"> 
</td>
</tr>
<tr>
<td width="200"><?=getTranslation('playerssifre6')?></td>
<td>
<input type="text" class="inputText" style="width:250px" maxlength="12" name="yeniparola" name="yeniparola"> 
</td>
</tr>
<tr>
<td width="200"><?=getTranslation('playerssifre7')?></td>
<td>
<input type="text" class="inputText" style="width:250px" maxlength="12" name="yeniparola2" name="yeniparola2"> 
</td>
</tr>
<tr>
<td colspan="2">
<div class="notice info">
<ul class="list-unordered list-checked2">
<li><?=getTranslation('playerssifre8')?></li>
<li><?=getTranslation('playerssifre9')?></li>
<li><?=getTranslation('playerssifre10')?></li>
<li><?=getTranslation('playerssifre11')?></li>
<li><?=getTranslation('playerssifre12')?></li>
<li><?=getTranslation('playerssifre13')?></li>
</ul>
</div>
</td>
</tr>
<tr>
<td class="last" colspan="2">
<input type="submit" name="submit" class="btn btn-large btn-primary2" style="width:100%;" value="<?=getTranslation('playerssifre14')?>">
</td>
</tr>
</tbody>
</table>
</form>


</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<? include '../footer.php'; ?>

</body>
</html>