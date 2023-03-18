<?
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:login.php"); die(); exit(); }
if($ub['alt_durum']<1) { header("Location:index.php"); }

if(isset($_GET['s'])) {
$id = str_replace('idbulamazki','',base64_decode(gd("s")));
$bilgi = bilgi("select * from duyurular where id='$id'");
if($bilgi['user_id']==$ub['id']) { sed_sql_query("delete from duyurular where id='$id'"); } else { $onaylandi = 4; }
$onaylandi = 3;
}

if(isset($_POST['submit'])){
$mesaj = pd("mesaj");
$yayin = 1;
$zaman = time();

if($ub['id']=="1") {
	$user_profil = "Patron";
} else if($ub['alt_durum']>0 && $ub['alt_alt_durum']<1) {
	$user_profil = "Admin";
} else if($ub['alt_alt_durum']>0 && $ub['sahip']<1) {
	$user_profil = "Super Admin";
} else if($ub['sahip']>0) {
	$user_profil = "Joker Admin";
}

if(strlen($mesaj)>5) {

	sed_sql_query("INSERT INTO duyurular SET user_id='".$ub['id']."', username='".$ub['username']."', yayin='".$yayin."', mesaj = '".$mesaj."', zaman = '".$zaman."', user_profil = '".$user_profil."'");
	
	$onaylandi = 1;

} else {
	$onaylandi = 2;
}

}
?>
<? include 'header.php'; ?>
<? include 'menu.php'; ?>
<script>$("#duyurular").addClass("activemnuitems");</script>

<div id="main" class="lwkSelector" style="width: 758px;">
<div id="live">
<div class="space_20"></div>
<div class="main_space" id="main_wide">
<div class="z-right-container" id="maskcontainer">

<? if($onaylandi==1) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('playersduyurular1')?></div>
<? } else if($onaylandi==2) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('playersduyurular2')?></div>
<? } else if($onaylandi==3) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('playersduyurular3')?></div>
<? } else if($onaylandi==4) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('playersduyurular4')?></div>
<? } ?>

<form method="post">
<table class="tablesorter itext-3">
<thead>
<tr>
<th colspan="2"><?=getTranslation('playersduyurular5')?></th>
</tr>
</thead>
<tbody>
<tr>
<td><?=getTranslation('playersduyurular6')?> :</td>
<td><input type="text" class="inputText" name="mesaj" style="width: 98%" size="40" maxlength="255"></td>
</tr>
<tr>
<td class="last" colspan="2">
<input class="btn btn-large btn-primary" type="submit" name="submit" value="<?=getTranslation('playersduyurular7')?>">
</td>
</tr>
</tbody>
</table>
</form>

<table class="tablesorter">
<thead>
<tr>
<th><?=getTranslation('playersduyurular8')?></th>
<th width="114"><?=getTranslation('playersduyurular9')?></th>
<th width="24"></th>
</tr>
</thead>
<tbody>
<?
$sor = sed_sql_query("select * from duyurular where user_id='$ub[id]'");
if(sed_sql_numrows($sor)<1) { ?>
<tr>
<td colspan="4"  style="text-align:center;"><?=getTranslation('playersduyurular10')?></td>
</tr>
<? } else { ?>
<? while($row=mysql_fetch_array($sor)) { ?>
<tr style="font-weight:bold;">
<td><?=$row['mesaj']; ?></td>
<td style="text-align:center;"><?=date("d.m.Y H:i",$row['zaman']); ?></td>
<td width="24">
<a class="grid" href="duyurular.php?s=<?=base64_encode("idbulamazki".$row['id']."");?>" title="<?=getTranslation('playersduyurular11')?>"><img src="/players/img/delete.png" alt="<?=getTranslation('playersduyurular11')?>" border="0"></a>
</td>
</tr>
<? } ?>
<? } ?>
</tbody>
</table>

<table class="tablesorter">
<tbody><tr>
<th><?=getTranslation('playersduyurular12')?></th>
</tr>
<tr>
<td></td>
</tr>
<tr>
<td>
<div class="notice info">
<ul class="list-unordered list-checked2">
<li><?=getTranslation('playersduyurular13')?></li>
<li><?=getTranslation('playersduyurular14')?></li>
</ul>
</div>
</td>
</tr>
</tbody></table>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<? include 'footer.php'; ?>

</body>
</html>