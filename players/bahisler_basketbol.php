<?
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); die(); exit(); }
if($ub['alt_durum']<1 && $ub['wkyetki']<1 && $ub['alt_alt_durum']<1 && $ub['sahip']=="0") { header("Location:index.php"); }
if($ub['adminpanel']=="1") { header("Location:admin"); }
rebuild($ub['id']);
$spor_tip = $_GET['spor_tip'];
$mac_id = $_GET['id'];

// POST BAŞLANGIÇ //
if(isset($_POST['submit'])){
// FOREACH BAŞLANGIÇ //
foreach ($_POST['rid'] as $key => $value) {

$sor = sed_sql_query("select * from maclar_oranlar where mac_db_id='".$_POST['macdbid']."' and spor_tipi='basketbol' and oran_val_id='".$key."' and bayi_id='".$ub['id']."'");

if(sed_sql_numrows($sor)<1) {

sed_sql_query("INSERT INTO maclar_oranlar SET mac_db_id='".$_POST['macdbid']."', spor_tipi='basketbol', oran_val_id='".$key."', bayi_id = '".$ub['id']."', oran = '".$value."'");

} else {

sed_sql_query("update maclar_oranlar set oran = '".$value."' where mac_db_id='".$_POST['macdbid']."' and spor_tipi='basketbol' and oran_val_id='".$key."' and bayi_id='".$ub['id']."'");

}

// FOREACH BİTİŞ //
}

// POST BİTİŞ //

$onaylandi = 1;

}

?>
<? include 'header.php'; ?>
<? include 'menu.php'; ?>

<div id="main" class="lwkSelector" style="width: 758px;">
<div id="live">
<div class="space_20"></div>
<div class="main_space" id="main_wide">
<script>$('#acmen_9').addClass("active")</script>
<div class="z-right-container" id="maskcontainer">

<? $mb = bilgi("select * from program_basketbol where id='".$mac_id."'"); ?>

<table class="tablesorter">
<thead>
<tr>

<? if($onaylandi==1) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('playersbahislerbasketbol1')?></div>
<? } ?>

<th><a href="javascript:geridon();" style="float:left;margin-right:20px;" class="grid" title="<?=getTranslation('playersbahislerbasketbol12')?>"><img src="/players/img/help_back.png" border="0"></a> <?=getTranslation('playersbahislerbasketbol2')?> <?=$mb['mac_kodu'];?></th>
</tr>
</thead>
<tbody>
<tr>
<td>

<?

$gizli_oran_tips = gizli_oran_tips_basketbol($mb['kupa_id'],$mb['id']);
if($gizli_oran_tips!="") { $gizli_ekle = "and oran_val_id not in ($gizli_oran_tips)"; } else { $gizli_ekle = ""; }
$sor = sed_sql_query("select mac_db_id,oran_tip,durum,oran_val_id from oranlar_basketbol where mac_db_id='$mac_id' $gizli_ekle and durum='1' group by oran_tip order by oran_tip asc");
while($ass=sed_sql_fetchassoc($sor)) { 

$tip = bilgi("select id,tip_isim,tip_kodu from oran_tip_basketbol where id='$ass[oran_tip]'");

?>

<table class="tablesorter">
<tbody>
<tr>
<th class="l"> <a class="tipS" title="<?=getTranslation('boran'.$tip['id'].'')?>"><img src="/resources/themes/common/icons/16/info.png" alt="" align="absmiddle" style="margin-right:15px;"></a><?=getTranslation('boran'.$tip['id'].'')?></th>
<th width="80"><?=getTranslation('playersbahislerbasketbol3')?></th>
<th width="80"><?=getTranslation('playersbahislerbasketbol4')?></th>
<th width="120"><?=getTranslation('playersbahislerbasketbol5')?></th>
<th width="80"><?=getTranslation('playersbahislerbasketbol6')?></th>
</tr>

<form method="post">

<?
$sss = sed_sql_query("select mac_db_id,oran_tip,oran_val_id,oran,durum from oranlar_basketbol ora where mac_db_id='$mac_id' and durum='1' and oran_tip='$ass[oran_tip]' $gizli_ekle order by oran_val_id asc");
while($row=sed_sql_fetchassoc($sss)) { 
$oran_bilgi = bilgi("select id,oran_val,oran_tip from oran_val_basketbol where id='$row[oran_val_id]'");
$buoran = $row['oran'];
$oran_bilgi_2 = bilgi("select oran from maclar_oranlar where oran_val_id='".$oran_bilgi['id']."' and mac_db_id='".$mac_id."' and spor_tipi='basketbol' and bayi_id='".$ub['id']."'");

?>

<tr>
<td>

<? if($dil_bilgisi22['language']=='en'){ ?>


<? if($oran_bilgi['oran_val']=="E"){ ?>Y
<? } else if($oran_bilgi['oran_val']=="H"){ ?>N
<? } else if($oran_bilgi['oran_val']=="A"){ ?>U
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>O
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 and O
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 and O
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 and U
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 and U
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 and Y
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 and Y
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 and N
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 and N
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>No Goal
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>X and Y
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>D
<? } else if($oran_bilgi['oran_val']=="T"){ ?>S
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='de'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>J
<? } else if($oran_bilgi['oran_val']=="H"){ ?>K
<? } else if($oran_bilgi['oran_val']=="A"){ ?>N
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>T
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 und T
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 und T
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 und N
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 und N
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 und J
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 und J
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 und K
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 und K
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>Kein Ziel
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>X und J
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>P
<? } else if($oran_bilgi['oran_val']=="T"){ ?>E
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='ar'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>أجل
<? } else if($oran_bilgi['oran_val']=="H"){ ?>لا
<? } else if($oran_bilgi['oran_val']=="A"){ ?>أدنى
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>أعلى
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 وما فوق
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 وما فوق
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 و السفلى
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 و السفلى
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 و نعم
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 و نعم
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 و لا
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 و لا
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>لا هدف
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>س ونعم
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>زوجان
<? } else if($oran_bilgi['oran_val']=="T"){ ?>واحد
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else if($dil_bilgisi22['language']=='ru'){ ?>

<? if($oran_bilgi['oran_val']=="E"){ ?>да
<? } else if($oran_bilgi['oran_val']=="H"){ ?>нет
<? } else if($oran_bilgi['oran_val']=="A"){ ?>ниже
<? } else if($oran_bilgi['oran_val']=="Ü"){ ?>топ
<? } else if($oran_bilgi['oran_val']=="1 ve Ü"){ ?>1 и выше
<? } else if($oran_bilgi['oran_val']=="2 ve Ü"){ ?>2 и выше
<? } else if($oran_bilgi['oran_val']=="1 ve A"){ ?>1 и ниже
<? } else if($oran_bilgi['oran_val']=="2 ve A"){ ?>2 и ниже
<? } else if($oran_bilgi['oran_val']=="1 ve V"){ ?>1 и да
<? } else if($oran_bilgi['oran_val']=="2 ve V"){ ?>2 и да
<? } else if($oran_bilgi['oran_val']=="1 ve Y"){ ?>1 и нет
<? } else if($oran_bilgi['oran_val']=="2 ve Y"){ ?>2 и нет
<? } else if($oran_bilgi['oran_val']=="Gol Yok"){ ?>Нет цели
<? } else if($oran_bilgi['oran_val']=="X ve V"){ ?>Х и да
<? } else if($oran_bilgi['oran_val']=="Ç"){ ?>пара
<? } else if($oran_bilgi['oran_val']=="T"){ ?>один
<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

<? } else { ?>
<?=$oran_bilgi['oran_val'];?>
<? } ?>

</td>
<td class="c" style="text-align:center;"><?=nf($buoran+$oran_bilgi_2['oran']); ?></td>
<td class="c" style="text-align:center;"><b class=""><?=nf($buoran); ?></b></td>
<td class="c" style="text-align:center;">
<a class="btn btn-miin btn-danger" onclick="odchangeminus(<?=$oran_bilgi['id']; ?>);" style="padding: 2px;height: 17px;">-0.05</a>
:
<a class="btn btn-miin btn-info" onclick="odchangeplus(<?=$oran_bilgi['id']; ?>);" style="padding: 2px;height: 17px;">+0.05</a>
</td>

<td style="text-align:center;"><input readonly="readonly" class="inputText" id="chod_<?=$oran_bilgi['id']; ?>" type="text" name="rid[<?=$oran_bilgi['id']; ?>]" style="width: 70px" size="50" maxlength="8" value="<?if($oran_bilgi_2['oran']!=''){ ?><?=$oran_bilgi_2['oran'];?><? } else { ?>0.00<? } ?>"></td>

</tr>

<? } ?>

</tbody>
</table>

<? } ?>

</td>
</tr>
<tr>
<td>
<div class="notice info">
<ul class="list-unordered list-checked2">
<li><?=getTranslation('playersbahislerbasketbol7')?></li>
<li><?=getTranslation('playersbahislerbasketbol8')?></li>
<li><?=getTranslation('playersbahislerbasketbol9')?></li>
<li><?=getTranslation('playersbahislerbasketbol10')?></li>
</ul>
</div>
</td>
</tr>

<tr>
<td class="last">
<input hidden type="text" name="macdbid" value="<?=$mac_id; ?>">
<input class="btn btn-large btn-primary" type="submit" name="submit" value="<?=getTranslation('playersbahislerbasketbol11')?>">
<input class="btn btn-large btn-danger" type="button" value="<?=getTranslation('playersbahislerbasketbol12')?>" onclick="javascript:geridon();">
</td>
</tr>

</form>

</tbody>
</table>

<script>
function odchangeplus(i) {
	var suan = $("input[id=chod_"+i+"]").val();
	var yeni = parseFloat(Math.round(suan * 100) / 100+0.05).toFixed(2);
	$("input[id=chod_"+i+"]").val(yeni);
}
function odchangeminus(i) {
	var suan = $("input[id=chod_"+i+"]").val();
	var yeni = parseFloat(Math.round(suan * 100) / 100-0.05).toFixed(2);
	$("input[id=chod_"+i+"]").val(yeni);
}

$(".arti").mousehold(100, function(i){   
var idno = $(this).attr('id');
odchangeplus(idno);
})

$(".eksi").mousehold(100, function(i){   
var idno = $(this).attr('id');
odchangeminus(idno);
})
</script>

</div>
</div>
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