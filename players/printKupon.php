<?
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:login.php"); die(); exit(); }

if(isset($_GET['son'])) {
$sonkupon = bilgi("select * from kuponlar where session_id='$session_id' order by id desc limit 1");	
$id = $sonkupon['id'];
} else {
$id = gd("id");
}
if($ub['wkyetki']>1){

$kupon = bilgi("select * from kuponlar where id='$id' and user_id='$ub[id]'");

if(empty($kupon['id'])) {
	die("".getTranslation('printkupon1')."");
}

} else {

$benimbayi = benimbayilerim($ub['id']);
$kupon = bilgi("select * from kuponlar where id='$id' and user_id in ($benimbayi)");
if(empty($kupon['id']) && $ub['sahip']=="0") {
	die("".getTranslation('printkupon2')."");
}

}

$ubsi = bilgi("select * from kullanici where id='$kupon[user_id]'");
function yuzdele($str) {
if(strlen($str)==1) { $yuzdedondur = "0.0".$str.""; } else
if(strlen($str)==2) { $yuzdedondur = "0.".$str.""; }
return $yuzdedondur;
}


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8"/>
<title><?=getTranslation('printkupon3')?></title>

<? if($kupon['canli']==3){ ?>

<? if($ub['herkupon_sms']=="1") { ?>

<? if($ub['yazici_tip']=="10") { ?>
<style type="text/css">body{margin:0px;margin-left:22px;padding:0px;font-family:Calibri,sans-serif;font-size:12px;}div{margin:0px;padding:0px;}.bahiskuponu{width:230px;background:url(/players/img/print/ticket/10/logo.png) no-repeat center top;height:32px;font-weight:bold;text-align:center;font-size:18px;}cikticontainer{width:230px;padding:5px;}.bayi{float:left;width:86px;}.tarih{float:left;width:94px;text-align:right;}.kupon{width:180px;}.saat{float:left;width:30px;text-align:left;}.kupno{float:left;width:22px;}.takimlar{float:left;width:150px;}.tahmin{float:left;width:170px;margin-left:5px;overflow:hidden;}.oranlar{float:left;width:30px;text-align:left;font-weight:bold;}.topkolon{float:left;width:128px;}.topkolonb{float:left;width:74px;text-align:right;}.oyuncuname{float:left;width:64px;}.oyuncunamea{float:left;width:138px;text-align:right;}.toplama{float:left;width:108px;font-weight:bold;}.toplamtutar{float:left;width:94px;text-align:right;font-weight:bold;}.maxkazanc{float:left;width:108px;}.maxkazanctutar{float:left;width:94px;text-align:right;}.serino{width:230px;text-align:center;margin-top:6px;font-weight:bold;}.barkod{width:230px;text-align:center;}.baslik-a{margin-left:22px;margin-right:22px;}.baslik-b{width:230px;margin-top:6px;margin-bottom:6px;border-top:1px dotted black;border-bottom:1px dotted black;padding-top:4px;}.toplam{width:230px;padding-bottom:6px;border-bottom:1px dotted black;}</style>
</head>
<style type="text/css" media="print">
@page {
size: auto;   /* auto is the current printer page size */
margin: 0mm;  /* this affects the margin in the printer settings */
}
</style>

<body>
<div class="cikticontainer">
<div class="bahiskuponu"><?=getTranslation('printkupon3')?></div>
<div class="baslik-a">
<div style="display:table;">
<div class="bayi">B: 10792</div>
<div class="tarih"><?=date("d-m-Y H:i",$kupon['kupon_time']); ?></div>
</div>
<div class="kupon"><?=getTranslation('printkupon4')?>: <?=$kupon['id']; ?></div>
</div>
<div class="baslik-b">

<?
$sor = sed_sql_query("select * from kupon_ic_sanal where kupon_id='$id'");
while($row=sed_sql_fetcharray($sor)) {
?>
<div style="display:table;">
<div class="kupno" style="width:45px;">SANAL</div>
<div class="takimlar"><?=$row['ev_takim'];?> - <?=$row['konuk_takim'];?></div>
<div class="saat"><?=date("d.m H:i:s",$row['mac_time']); ?></div>
</div>
<div style="display:table;">
<div class="tahmin" style="width:192px;"><?=$row['oran_tip'];?> : <?=$row['oran_val'];?></div>
<div class="oranlar"><?=nf($row['oran']); ?></div>
</div>
<? } ?>

</div>
<div class="oynayan">
<div style="display:table;">
<div class="topkolon"><?=getTranslation('printkupon5')?></div>
<div class="topkolonb"><?=nf($kupon['oran']); ?></div>
</div>
<? if($ubsi['kesinti_goster']==1){ ?>
<div style="display:table;">
<div class="oyuncuname"><?=$ubsi['cikti_kesinti']; ?>% <?=getTranslation('printkupon6')?>:</div>
<div class="oyuncunamea">
<? 
if(!empty($ubsi['kazananyuzde'])) { $yuzdesi = yuzdele($ubsi['kazananyuzde']); 
$kesinti = $kupon['tutar']*$yuzdesi;
$gercektutar = $kupon['tutar']-$kesinti;
} else {
$gercektutar = $kupon['tutar'];	
}
echo nf($gercektutar); 
?> <?=getTranslation('parabirimi')?>
</div>
</div>
<? } ?>
</div>
<div class="toplam">
<div style="display:table;">
<div class="toplama"><?=getTranslation('printkupon7')?></div>
<div class="toplamtutar"><?=nf($kupon['yatan']); ?> <?=getTranslation('parabirimi')?></div>
</div>
<div style="display:table;">
<div class="maxkazanc"><?=getTranslation('printkupon8')?>:</div>
<div class="maxkazanctutar"><?=nf($kupon['tutar']); ?> <?=getTranslation('parabirimi')?></div>
</div>
</div>
<div class="serino">
||||| 672954D6-2954-CA295436 |||||
</div>
<div class="barkod"> <?=$ubsi['ciktimesaj']; ?> </div>
<div class="barkod">
</div>
</div>
<? } else if($ub['yazici_tip']=="9") { ?>
<style type="text/css">body{margin:0px;margin-left:22px;padding:0px;font-family:Calibri,sans-serif;font-size:12px;}div{margin:0px;padding:0px;}.bahiskuponu{width:230px;background:url(/players/img/print/ticket/9/logo.png) no-repeat center top;height:32px;line-height:32px;font-weight:bold;text-align:center;margin-bottom:10px;font-size:18px;}cikticontainer{width:230px;padding:5px;}.bayi{float:left;width:86px;}.tarih{float:left;width:94px;text-align:right;}.kupon{width:180px;}.saat{float:left;width:30px;text-align:left;}.kupno{float:left;width:22px;}.takimlar{float:left;width:150px;}.tahmin{float:left;width:170px;margin-left:5px;overflow:hidden;}.oranlar{float:left;width:30px;text-align:left;font-weight:bold;}.topkolon{float:left;width:128px;}.topkolonb{float:left;width:74px;text-align:right;}.oyuncuname{float:left;width:64px;}.oyuncunamea{float:left;width:138px;text-align:right;}.toplama{float:left;width:108px;font-weight:bold;}.toplamtutar{float:left;width:94px;text-align:right;font-weight:bold;}.maxkazanc{float:left;width:108px;}.maxkazanctutar{float:left;width:94px;text-align:right;}.serino{width:230px;text-align:center;margin-top:6px;font-weight:bold;}.barkod{width:230px;text-align:center;}.baslik-a{margin-left:22px;margin-right:22px;}.baslik-b{width:230px;margin-top:6px;margin-bottom:6px;border-top:1px solid black;border-bottom:1px solid black;padding-top:4px;}.toplam{width:230px;padding-bottom:6px;border-bottom:1px solid black;}</style>
  <style type="text/css" media="print">
        @page 
        {
            size: auto;   /* auto is the current printer page size */
            margin: 0mm;  /* this affects the margin in the printer settings */
        }
    </style>
</head>
<body>
<div class="cikticontainer">
<div class="bahiskuponu"><?=getTranslation('printkupon3')?></div>
<div class="baslik-a">
<div style="display:table;">
<div class="bayi">B: 10792</div>
<div class="tarih"><?=date("d-m-Y H:i",$kupon['kupon_time']); ?></div>
</div>
<div class="kupon"><?=getTranslation('printkupon4')?>: <?=$kupon['id']; ?></div>
</div>
<div class="baslik-b">

<?
$sor = sed_sql_query("select * from kupon_ic_sanal where kupon_id='$id'");
while($row=sed_sql_fetcharray($sor)) {
?>
<div style="display:table;">
<div class="kupno" style="width: 45px;">Sanal</div>
<div class="takimlar"><?=$row['ev_takim'];?> - <?=$row['konuk_takim'];?></div>
<div class="saat"><?=date("d.m H:i:s",$row['mac_time']); ?></div>
</div>
<div style="display:table;">
<div class="tahmin" style="width: 192px;"><?=$row['oran_tip'];?> : <?=$row['oran_val'];?></div>
<div class="oranlar"><?=nf($row['oran']); ?></div>
</div>
<? } ?>

</div>
<div class="oynayan">
<div style="display:table;">
<div class="topkolon"><?=getTranslation('printkupon5')?></div>
<div class="topkolonb"><?=nf($kupon['oran']); ?></div>
</div>
<? if($ubsi['kesinti_goster']==1){ ?>
<div style="display:table;">
<div class="oyuncuname">5% <?=getTranslation('printkupon6')?>:</div>
<div class="oyuncunamea">
<? 
if(!empty($ubsi['kazananyuzde'])) { $yuzdesi = yuzdele($ubsi['kazananyuzde']); 
$kesinti = $kupon['tutar']*$yuzdesi;
$gercektutar = $kupon['tutar']-$kesinti;
} else {
$gercektutar = $kupon['tutar'];	
}
echo nf($gercektutar); 
?> <?=getTranslation('parabirimi')?>
</div>
</div>
<? } ?>
</div>
<div class="toplam">
<div style="display:table;">
<div class="toplama"><?=getTranslation('printkupon7')?></div>
<div class="toplamtutar"><?=nf($kupon['yatan']); ?> <?=getTranslation('parabirimi')?></div>
</div>
<div style="display:table;">
<div class="maxkazanc"><?=getTranslation('printkupon8')?>:</div>
<div class="maxkazanctutar"><?=nf($kupon['tutar']); ?> <?=getTranslation('parabirimi')?></div>
</div>
</div>
<div class="serino">
||||| 672954D6-2954-CA295436 |||||
</div>
<div class="barkod">
<?=$ubsi['ciktimesaj']; ?> </div>
<div class="barkod">
</div>
</div>
<? } else if($ub['yazici_tip']=="8") { ?>
<link rel="stylesheet" type="text/css" media="screen, print" href="/players/img/print/ticket/8/init.css"/>
<link rel="stylesheet" type="text/css" media="screen, print" href="/players/img/print/ticket/8/print.css"/>
</head>
<body>
<div class="coupon">
<div class="coupon_box">
<div class="system">
<span><?=getTranslation('printkupon3')?></span> <span><?=date("d-m-Y H:i",$kupon['kupon_time']); ?></span>
</div>

<?
$sor = sed_sql_query("select * from kupon_ic_sanal where kupon_id='$id'");
while($row=sed_sql_fetcharray($sor)) {
?>
<h3 class="match">
<span class="number">Sanal</span> <?=$row['ev_takim'];?> - <?=$row['konuk_takim'];?>  <span class="label"><?=date("d.m H:i:s",$row['mac_time']); ?></span>
</h3>
<p class="bet">
<span><?=$row['oran_tip'];?> : <span class="rate"><?=$row['oran_val'];?> </span></span>
<span class="label"><?=nf($row['oran']); ?></span>
</p>
<? } ?>

</div>
<div class="coupon_box win_box">
<p class="bet"><span><?=getTranslation('printkupon4')?></span>
<span class="label"><?=$kupon['id']; ?></span>
</p>
<p class="bet"><span><?=getTranslation('printkupon9')?></span>
<span class="label"><?=nf($kupon['oran']); ?></span>
</p>
<p class="bet"><span><?=getTranslation('printkupon7')?></span>
<span class="label"><?=nf($kupon['yatan']); ?> <?=getTranslation('parabirimi')?></span>
</p>
<? if($ubsi['kesinti_goster']==1){ ?>
<p class="bet"><span>5% <?=getTranslation('printkupon6')?></span>
<span class="label"><? 
if(!empty($ubsi['kazananyuzde'])) { $yuzdesi = yuzdele($ubsi['kazananyuzde']); 
$kesinti = $kupon['tutar']*$yuzdesi;
$gercektutar = $kupon['tutar']-$kesinti;
} else {
$gercektutar = $kupon['tutar'];	
}
echo nf($gercektutar); 
?> <?=getTranslation('parabirimi')?></span>
</p>
<? } ?>
<p class="bet match"><span><?=getTranslation('printkupon8')?></span> <span class="label"><?=nf($kupon['tutar']); ?> <?=getTranslation('parabirimi')?></span></p>
</div>
</div>
<? } else if($ub['yazici_tip']=="7") { ?>
<style type="text/css">.f10{font-size:10px;}.f12{font-size:12px;}.bor{border:1px inset #000;}.ayrac{margin:2px;border-top:2px solid #000;}.c{text-align:center;}.b{font-weight:bold;}.fl{float:left;}.fr{float:right;}.code{float:left;margin-right:3px;}.bet{float:left;}.rate{float:right;}</style>
<div class="f12" style="width:230px;">
<div class="c f12 b"><div class="bet"><img src="/players/img/print/ticket/7/spid_1.png"></div><?=getTranslation('printkupon3')?> (<?=$kupon['id']; ?>) <div class="rate"><img src="/players/img/print/ticket/7/spid_1.png"></div><br> <?=getTranslation('printkupon10')?> :<?=date("d-m-Y H:i",$kupon['kupon_time']); ?></div>
<div class="ayrac"></div>

<?
$sor = sed_sql_query("select * from kupon_ic_sanal where kupon_id='$id'");
while($row=sed_sql_fetcharray($sor)) {
?>

<div class="code">Sanal-</div>
<div class="bet"><?=$row['ev_takim'];?> - <?=$row['konuk_takim'];?> </div>
<div class="rate"><?=nf($row['oran']); ?></div>
<div style="clear:both;"></div>
<div class="bet"><?=date("d.m H:i:s",$row['mac_time']); ?></div>
<div class="rate"><?=$row['oran_tip'];?> / <?=$row['oran_val'];?></div>
<div style="clear:both;"></div>
<div class="ayrac"></div>

<? } ?>

<div class="bet"><?=getTranslation('printkupon5')?>:</div><div class="rate"><?=nf($kupon['oran']); ?></div>
<div style="clear:both;"></div>
<div class="bet"><?=getTranslation('printkupon7')?>:</div><div class="rate"><?=nf($kupon['yatan']); ?> <?=getTranslation('parabirimi')?></div>
<div style="clear:both;"></div>
<? if($ubsi['kesinti_goster']==1){ ?>
<div class="bet">5% <?=getTranslation('printkupon6')?>:</div><div class="rate"><? 
if(!empty($ubsi['kazananyuzde'])) { $yuzdesi = yuzdele($ubsi['kazananyuzde']); 
$kesinti = $kupon['tutar']*$yuzdesi;
$gercektutar = $kupon['tutar']-$kesinti;
} else {
$gercektutar = $kupon['tutar'];	
}
echo nf($gercektutar); 
?> <?=getTranslation('parabirimi')?></div>
<div style="clear:both;"></div>
<? } ?>
<div class="bet"><?=getTranslation('printkupon8')?>:</div><div class="rate"><?=nf($kupon['tutar']); ?> <?=getTranslation('parabirimi')?></div>
<div style="clear:both;"></div>
<div class="ayrac"></div>
<div class="b" style="line-height:15px;text-align: center;font-size: 10pt;"><?=$ubsi['ciktimesaj']; ?></div>
<div class="c b f10"><br></div>
</div>
<? } else if($ub['yazici_tip']=="6") { ?>
<style>body{margin:0px;padding:0px;}</style>
</head>
<body>
<div style='clear:left; color:#707070; float:left; width:285px; font-size:11px; font-family:tahoma; font-weight:bold; margin-bottom:5px;margin-top:10px;'></div>
<div style='clear:left; color:#707070; float:left; width:285px; font-size:11px; font-family:tahoma; margin-bottom:5px;'>
<div style='float:left; width:140px;'><b><?=getTranslation('printkupon4')?> : </b> <?=$kupon['id']; ?> </div>
<div style='float:right; width:145px;'><b><?=getTranslation('printkupon10')?> : </b><?=date("d-m-Y H:i",$kupon['kupon_time']); ?>&nbsp;</div>
</div>


<div style=' width:270px;  height:1px; background:#999; margin:3px 0px; clear:left;'></div>
<div style='clear:left; padding:5px 0px; color:#707070;'>
<div style='float:left; width:25px; font-size:10px; font-family:tahoma; margin-bottom:5px; font-weight:bold;'><?=getTranslation('printkupon11')?></div>
<div style='float:left; width:160px; font-size:10px; font-family:tahoma; margin-bottom:5px; text-align:center;  font-weight:bold;'><?=getTranslation('printkupon12')?> </div>
<div style='float:left; width:40px; font-size:10px; font-family:tahoma; margin-bottom:5px; text-align:center; font-weight:bold;'><?=getTranslation('printkupon13')?> </div>
<div style='float:left; width:40px; font-size:10px; font-family:tahoma; margin-bottom:5px; text-align:center; font-weight:bold;'><?=getTranslation('printkupon9')?> </div>
</div>


<div style=' width:270px;  height:1px; background:#999; margin:5px 0px; clear:left;'></div>

<?
$sor = sed_sql_query("select * from kupon_ic_sanal where kupon_id='$id'");
while($row=sed_sql_fetcharray($sor)) {
?>

<div style=' clear:left; padding:5px 0px; width:270px;  margin-bottom:5px;margin-bottom:2px; color:#707070;'>
<div style='float:left; padding:3px; background:;'>
<div style='float:left; font-size:10px; font-family:tahoma;  width:42px; margin-bottom:5px;'>Sanal<br></div>
<div style='float:left; font-size:10px; font-family:tahoma;  width:140px; margin-bottom:5px;'><?=$row['ev_takim'];?> - <?=$row['konuk_takim'];?> <br> <?=date("d.m H:i:s",$row['mac_time']); ?></div>
<div style='float:left; font-size:10px; font-family:tahoma;  width:40px; text-align:center; margin-bottom:5px;'><?=$row['oran_tip'];?> / <?=$row['oran_val'];?> </div>
<div style='float:left; font-size:10px; font-family:tahoma;  width:40px; text-align:center; margin-bottom:5px;'><?=nf($row['oran']); ?></div>
</div>
</div>
<div style=' width:270px;  height:1px; background:#999; margin:5px 0px; clear:left;'></div>

<? } ?>


<div style='clear:left; font-weight:normal;  width:270px; font-family:Tahoma; font-size:10px;  padding:3px 0px 5px 0px; border-bottom:1px solid #999; margin-bottom:3px; color:#707070;'>
<b><?=getTranslation('printkupon7')?> :</b> <?=nf($kupon['yatan']); ?> <?=getTranslation('parabirimi')?> </div>
<div style='clear:left; font-weight:normal;  width:285px; font-family:Tahoma; font-size:10px;  padding:3px 0px 5px 0px; margin-bottom:15px; color:#707070;'>
<div style='float:left; width:140px;'><b><?=getTranslation('printkupon5')?> :</b> <?=nf($kupon['oran']); ?> </div>
<div style='float:right; width:145px;'><b><?=getTranslation('printkupon8')?> :</b> <?=nf($kupon['tutar']); ?> <?=getTranslation('parabirimi')?> </div>
</div>
<? if($ubsi['kesinti_goster']==1){ ?>
<div style='clear:left; font-weight:normal;  width:285px; font-family:Tahoma; font-size:10px;  padding:3px 0px 5px 0px; margin-bottom:15px; color:#707070;'>
<div style='float:left; width:140px;'><b>5% <?=getTranslation('printkupon6')?> :</b> <? 
if(!empty($ubsi['kazananyuzde'])) { $yuzdesi = yuzdele($ubsi['kazananyuzde']); 
$kesinti = $kupon['tutar']*$yuzdesi;
$gercektutar = $kupon['tutar']-$kesinti;
} else {
$gercektutar = $kupon['tutar'];	
}
echo nf($gercektutar); 
?> <?=getTranslation('parabirimi')?> </div></div>
<? } ?>
<div style='height:1px; width:270px; background:#999; margin:3px 0px; clear:left;'></div>
<div style='clear:left;  width:270px; text-align:center;  font-size:10px; font-family:tahoma;  padding:3px 0px 0px 0px; margin-bottom:3px; color:#707070;'></div>
<? } else if($ub['yazici_tip']=="5") { ?>
<style type="text/css">body{font-size:11px;font-family:verdana,sans-serif;}.bold{font-weight:700;}hr{color:#000;background-color:#000;height:2px;}</style>
</head>
<body>
<table border="0" cellpadding="0" cellspacing="0" width="300px">
<tr>
<td colspan="2" align="center" class="bold" style="padding:0px 0px 5px;"><?=getTranslation('printkupon3')?> (<?=$kupon['id']; ?>)</td>
</tr>
<tr>
<td colspan="2" align="center" class="bold" style="padding:0px 0px 5px;"><?=date("d-m-Y H:i",$kupon['kupon_time']); ?></td>
</tr>

<?
$sor = sed_sql_query("select * from kupon_ic_sanal where kupon_id='$id'");
while($row=sed_sql_fetcharray($sor)) {
?>

<tr>
<td colspan="2" align="left" class="bold" width="300px" style="padding:4px 0px 0px;">Sanal-<?=$row['ev_takim'];?> - <?=$row['konuk_takim'];?> </td>
</tr>
<tr>
<td colspan="2" class="bold"><?=date("d.m H:i:s",$row['mac_time']); ?></td>
</tr>
<tr>
<td align="left" width="170px" style="padding:4px 0px 0px;" class="bold"><?=$row['oran_tip'];?> : <?=$row['oran_val'];?> </td>
<td align="right" width="130px" style="padding-right:5px;" class="bold"><?=getTranslation('printkupon9')?> : <?=nf($row['oran']); ?></td>
</tr>
<tr>
<td colspan="2"><hr/></td>
</tr>

<? } ?>

<tr>
<td class="bold" colspan="2" style="padding:3px 0px;">
<div style="float:left; padding-right:100px;"><?=getTranslation('printkupon5')?></div>
<div style="float:right;padding-right:5px;"><?=nf($kupon['oran']); ?></div>
</td>
</tr>
<tr>
<td class="bold" colspan="2" style="padding:3px 0px;">
<div style="float:left; padding-right:100px;"><?=getTranslation('printkupon7')?></div>
<div style="float:right;padding-right:5px;"><?=nf($kupon['yatan']); ?> <?=getTranslation('parabirimi')?></div>
</td>
</tr>
<? if($ubsi['kesinti_goster']==1){ ?>
<tr>
<td class="bold" colspan="2" style="padding:3px 0px;">
<div style="float:left; padding-right:100px;">5% <?=getTranslation('printkupon6')?></div>
<div style="float:right;padding-right:5px;"><? 
if(!empty($ubsi['kazananyuzde'])) { $yuzdesi = yuzdele($ubsi['kazananyuzde']); 
$kesinti = $kupon['tutar']*$yuzdesi;
$gercektutar = $kupon['tutar']-$kesinti;
} else {
$gercektutar = $kupon['tutar'];	
}
echo nf($gercektutar); 
?> <?=getTranslation('parabirimi')?></div>
</td>
</tr>
<? } ?>
<tr>
<td class="bold" colspan="2" style="padding:3px 0px; border:dashed 1px #000000; border-left:0px; border-right:0px;">
<div style="float:left; padding-right:100px;"><?=getTranslation('printkupon8')?></div>
<div style="float:right;padding-right:5px;"><?=nf($kupon['tutar']); ?> <?=getTranslation('parabirimi')?></div>
</td>
</tr>
<tr>
<td class="bold" colspan="2" style="padding:3px 3px;text-align:center;"><span id="Label11" style="font-size:Smaller;"><?=$ubsi['ciktimesaj']; ?></span></td>
</tr>
</table>
<? } else if($ub['yazici_tip']=="4") { ?>
<link rel="stylesheet" href="/players/img/print/ticket/4/global.css" type="text/css">
</head>
</head>
<body>
<table cellspacing="0" cellpadding="0" border="0" style="border-width:0px;width:100%;border-collapse:collapse;">
<tr style="background-color:#E6E7E8;">
<td><img src="/players/img/print/ticket/4/ticket.png"/></td><td class="PO_Header" style="width:80%;"><?=getTranslation('printkupon3')?></td><td class="PO_HeaderTime" style="width:20%;"><?=date("d-m-Y H:i:s",$kupon['kupon_time']); ?></td>
</tr>
<tr>
<td align="Right" colspan="3"><a href="javascript: if (window.print) window.print();"><img src="/players/img/print/ticket/4/symbol_druck.gif" alt="" border="0"/></a></td>
</tr>
</table>
<br>
<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>
<td class="PT_ColHeader_BLTBR_normal" colspan="4"><b>&nbsp;<?=getTranslation('printkupon3')?> (ID#<?=$kupon['id']; ?>)</b></td>
</tr>
<tr>
<td width="25%" class="PT_Head_Beschr">&nbsp;<?=getTranslation('printkupon7')?></td>
<td width="25%" class="PT_Head_Wert_BR"><?=nf($kupon['yatan']); ?> <?=getTranslation('parabirimi')?>&nbsp;</td>
</tr>
<tr>
<td width="25%" class="PT_Head_Beschr">&nbsp;<?=getTranslation('printkupon9')?></td>
<td width="25%" class="PT_Head_Wert_BR"><?=nf($kupon['oran']); ?>&nbsp;</td>
</tr>
<tr>
<td width="25%" class="PT_Head_Beschr_BL">&nbsp;<?=getTranslation('printkupon14')?></td>
<td width="25%" class="PT_Head_Wert_BR">
&nbsp;</td>
<td width="25%" class="PT_Head_Beschr">&nbsp;<?=getTranslation('printkupon8')?></td>
<td width="25%" class="PT_Head_Wert_BR"><?=nf($kupon['tutar']); ?> <?=getTranslation('parabirimi')?>&nbsp;</td>
</tr>
<tr>
<td width="25%" class="PT_Head_Beschr_BL">&nbsp;<?=getTranslation('printkupon10')?></td>
<td width="25%" class="PT_Head_Wert_BR"><?=date("d-m-Y",$kupon['kupon_time']); ?>&nbsp;</td>
<td width="25%" class="PT_Head_Beschr">&nbsp;<?=getTranslation('printkupon17')?></td>
<td width="25%" class="PT_Head_Wert_BR"><?=date("H:i",$kupon['kupon_time']); ?>&nbsp;</td>
</tr>
<tr>
<td width="25%" class="PT_Head_Beschr_BL">&nbsp;<?=getTranslation('printkupon15')?></td>
<td width="25%" class="PT_Head_Wert_BR"><?=$ubsi['ciktimesaj']; ?>&nbsp;</td>
<? if($ubsi['kesinti_goster']==1){ ?>
<td width="25%" class="PT_Head_Beschr">&nbsp;5% <?=getTranslation('printkupon6')?>;</td>
<td width="25%" class="PT_Head_Wert_BR"><? 
if(!empty($ubsi['kazananyuzde'])) { $yuzdesi = yuzdele($ubsi['kazananyuzde']); 
$kesinti = $kupon['tutar']*$yuzdesi;
$gercektutar = $kupon['tutar']-$kesinti;
} else {
$gercektutar = $kupon['tutar'];	
}
echo nf($gercektutar); 
?> <?=getTranslation('parabirimi')?>&nbsp;</td>
<? } ?>
</tr>
<tr>
<td colspan="4">
<table cellSpacing="0" cellPadding="0" width="100%" border="0">
<tr>
<td class="PT_ColHeader_BLTBR_normal" align="center"><?=getTranslation('printkupon11')?></td>
<td class="PT_ColHeader_BTBR_normal">&nbsp;<?=getTranslation('printkupon12')?></td>
<td class="PT_ColHeader_BTBR_normal" align="center"><?=getTranslation('printkupon16')?></td>
<td class="PT_ColHeader_BTBR_normal" align="center"><?=getTranslation('printkupon13')?></td>
<td class="PT_ColHeader_BTBR_normal" align="center"><?=getTranslation('printkupon9')?></td>
<td class="PT_ColHeader_BTBR_normal" align="center"><?=getTranslation('printkupon10')?></td>
</tr>
<?
$sor = sed_sql_query("select * from kupon_ic_sanal where kupon_id='$id'");
while($row=sed_sql_fetcharray($sor)) {
?>
<tr class='PT_R_1'>
<td class="PT_Col_BLR_Center">Sanal</td>
<td class="PT_Col_BR">&#160;<?=$row['ev_takim'];?> - <?=$row['konuk_takim'];?> </td>
<td class="PT_Col_BR_Center"><?=$row['oran_tip'];?></td>
<td class="PT_Col_BR_Center"><?=$row['oran_val'];?></td>
<td class="PT_Col_BR_Center"><?=nf($row['oran']); ?></td>
<td class="PT_Col_BR_Center"><?=date("d.m H:i:s",$row['mac_time']); ?></td>
</tr><? } ?><tr>
<td class="PT_F" colspan="8"><img src="/players/img/print/ticket/4/dot.gif" height="1"></td>
</tr>
</table>
</td>
</tr>
</table>
<br>
<? } else if($ub['yazici_tip']=="3") { ?>
<style>body{font-size:13px;}</style>
</head>
<body>
<table width="640px" cellpadding="0" cellspacing="0">
<tr>
<td valign="top">
<table width="640px" cellpadding="0" cellspacing="0" style="border:1px solid #000; font-size:12px;">
<tr style="background:#ccc;">
<td align="center" style="border-bottom: 1px solid #000;"><?=getTranslation('printkupon18')?></td>
<td align="center" style="border-bottom: 1px solid #000;"><?=getTranslation('printkupon19')?></td>
<td align="center" style="border-bottom: 1px solid #000;"><?=getTranslation('printkupon9')?></td>
<td align="center" style="border-bottom: 1px solid #000;"><?=getTranslation('printkupon8')?></td>
<td align="center" style="border-bottom: 1px solid #000;"><?=getTranslation('printkupon10')?></td>
<td align="center" style="border-bottom: 1px solid #000;"><?=getTranslation('printkupon20')?></td>
</tr>
<tr>
<td align="center" style="border-bottom: 1px solid #000;"><?=$kupon['id']; ?></td>
<td align="center" style="border-bottom: 1px solid #000;"><?=nf($kupon['yatan']); ?> <?=getTranslation('parabirimi')?></td>
<td align="center" style="border-bottom: 1px solid #000;"><?=nf($kupon['oran']); ?></td>
<td align="center" style="border-bottom: 1px solid #000;"><?=nf($kupon['tutar']); ?> <?=getTranslation('parabirimi')?></td>
<td align="center" style="border-bottom: 1px solid #000;"><?=date("d-m-Y H:i",$kupon['kupon_time']); ?></td>
<td align="center" style="border-bottom: 1px solid #000;"><?=$ubsi['ciktimesaj']; ?></td>
</tr>
</table>
<br>
<table width="640px" cellpadding="0" cellspacing="0" style="border:1px solid #000; font-size:12px;">
<tr style="background:#ccc;">
<td align="center" style="border-bottom: 1px solid #000;"><?=getTranslation('printkupon11')?></td>
<td align="left" style="border-bottom: 1px solid #000;"><?=getTranslation('printkupon12')?></td>
<td align="center" style="border-bottom: 1px solid #000;"><?=getTranslation('printkupon16')?></td>
<td align="center" style="border-bottom: 1px solid #000;"><?=getTranslation('printkupon13')?></td>
<td align="center" style="border-bottom: 1px solid #000;"><?=getTranslation('printkupon9')?></td>
<td align="center" style="border-bottom: 1px solid #000;"><?=getTranslation('printkupon10')?></td>
</tr>

<?
$sor = sed_sql_query("select * from kupon_ic_sanal where kupon_id='$id'");
while($row=sed_sql_fetcharray($sor)) {
?>

<tr>
<td align="center">Sanal</td>
<td align="left"><?=$row['ev_takim'];?> - <?=$row['konuk_takim'];?> </td>
<td align="center" nowrap><?=$row['oran_tip'];?></td>
<td align="center" nowrap><?=$row['oran_val'];?></td>
<td align="center"><?=nf($row['oran']); ?></td>
<td align="center"><?=date("d.m H:i:s",$row['mac_time']); ?></td>
</tr>

<? } ?>

<tr>
<td colspan="7"><br>
<center>
<span style="font-size:11px"></span>
</center>
</td>
</tr>
</table>
</td>
</tr>
</table>
<? } else if($ub['yazici_tip']=="2") { ?>
<style type="text/css">tr{mso-height-source:auto;}col{mso-width-source:auto;}br{mso-data-placement:same-cell;}.style0{mso-number-format:General;text-align:general;vertical-align:bottom;white-space:nowrap;mso-rotate:0;mso-background-source:auto;mso-pattern:auto;color:black;font-size:11.0pt;font-weight:400;font-style:normal;text-decoration:none;font-family:Calibri,sans-serif;mso-font-charset:162;border:none;mso-protection:locked visible;mso-style-name:Normal;mso-style-id:0;}td{mso-style-parent:style0;padding-top:1px;padding-right:1px;padding-left:1px;mso-ignore:padding;color:black;font-size:11.0pt;font-weight:400;font-style:normal;text-decoration:none;font-family:Calibri,sans-serif;mso-font-charset:162;mso-number-format:General;text-align:general;vertical-align:bottom;border:none;mso-background-source:auto;mso-pattern:auto;mso-protection:locked visible;white-space:nowrap;mso-rotate:0;}.xl65{mso-style-parent:style0;font-family:Arial,sans-serif;mso-font-charset:162;border-top:none;border-right:none;border-bottom:none;border-left:.5pt solid windowtext;}.xl66{mso-style-parent:style0;font-family:Arial,sans-serif;mso-font-charset:162;}.xl67{mso-style-parent:style0;font-family:Arial,sans-serif;mso-font-charset:162;border-top:.5pt solid windowtext;border-right:none;border-bottom:none;border-left:none;}.xl68{mso-style-parent:style0;font-size:6.0pt;font-weight:700;font-family:Arial,sans-serif;mso-font-charset:162;}.xl69{mso-style-parent:style0;font-size:7.0pt;font-weight:700;font-family:Arial,sans-serif;mso-font-charset:162;vertical-align:top;}.xl70{mso-style-parent:style0;font-size:9.0pt;font-weight:700;font-family:Arial,sans-serif;mso-font-charset:162;mso-number-format:"\@";text-align:right;border-top:none;border-right:.5pt solid windowtext;border-bottom:none;border-left:none;}.xl71{mso-style-parent:style0;font-size:9.0pt;font-weight:700;font-family:Arial,sans-serif;mso-font-charset:162;mso-number-format:"\@";text-align:right;}.xl72{mso-style-parent:style0;font-size:8.0pt;font-weight:700;font-family:Arial,sans-serif;mso-font-charset:162;mso-number-format:"\@";text-align:right;border-top:.5pt dashed windowtext;border-right:.5pt solid windowtext;border-bottom:none;border-left:none;}.xl73{mso-style-parent:style0;font-size:8.0pt;font-weight:700;font-family:Arial,sans-serif;mso-font-charset:162;mso-number-format:"\@";text-align:right;border-top:none;border-right:none;border-bottom:.5pt dashed windowtext;border-left:none;}.xl74{mso-style-parent:style0;font-size:9.0pt;font-weight:700;font-style:italic;font-family:Arial,sans-serif;mso-font-charset:162;border-top:.5pt dashed windowtext;border-right:none;border-bottom:none;border-left:.5pt solid windowtext;}.xl75{mso-style-parent:style0;font-size:9.0pt;font-weight:700;font-style:italic;font-family:Arial,sans-serif;mso-font-charset:162;border-top:.5pt dashed windowtext;border-right:none;border-bottom:none;border-left:none;}.xl76{mso-style-parent:style0;font-size:9.0pt;font-weight:700;font-style:italic;font-family:Arial,sans-serif;mso-font-charset:162;border-top:none;border-right:none;border-bottom:none;border-left:.5pt solid windowtext;}.xl77{mso-style-parent:style0;font-size:9.0pt;font-weight:700;font-style:italic;font-family:Arial,sans-serif;mso-font-charset:162;}.xl78{mso-style-parent:style0;font-size:8.0pt;font-weight:700;font-family:Arial,sans-serif;mso-font-charset:162;text-align:center;border-top:.5pt solid windowtext;border-right:none;border-bottom:.5pt solid windowtext;border-left:.5pt solid windowtext;background:#BFBFBF;mso-pattern:black none;}.xl79{mso-style-parent:style0;font-size:8.0pt;font-weight:700;font-family:Arial,sans-serif;mso-font-charset:162;text-align:center;border-top:.5pt solid windowtext;border-right:none;border-bottom:.5pt solid windowtext;border-left:none;background:#BFBFBF;mso-pattern:black none;}.xl80{mso-style-parent:style0;font-size:8.0pt;font-weight:700;font-family:Arial,sans-serif;mso-font-charset:162;text-align:center;border-top:.5pt solid windowtext;border-right:.5pt solid windowtext;border-bottom:.5pt solid windowtext;border-left:none;background:#BFBFBF;mso-pattern:black none;}.xl81{mso-style-parent:style0;font-size:7.0pt;font-weight:700;font-family:Arial,sans-serif;mso-font-charset:162;mso-number-format:"\@";text-align:center;vertical-align:middle;border-top:.5pt dashed windowtext;border-right:none;border-bottom:none;border-left:.5pt solid windowtext;}.xl82{mso-style-parent:style0;font-size:7.0pt;font-weight:700;font-family:Arial,sans-serif;mso-font-charset:162;mso-number-format:"\@";text-align:center;vertical-align:middle;border-top:none;border-right:none;border-bottom:.5pt dashed windowtext;border-left:.5pt solid windowtext;}.xl83{mso-style-parent:style0;font-size:7.0pt;font-weight:700;font-style:italic;font-family:Arial,sans-serif;mso-font-charset:162;text-align:center;border-top:.5pt solid windowtext;border-right:none;border-bottom:none;border-left:.5pt solid windowtext;}.xl84{mso-style-parent:style0;font-size:7.0pt;font-weight:700;font-style:italic;font-family:Arial,sans-serif;mso-font-charset:162;text-align:center;border-top:.5pt solid windowtext;border-right:none;border-bottom:none;border-left:none;}.xl85{mso-style-parent:style0;font-size:7.0pt;font-weight:700;font-style:italic;font-family:Arial,sans-serif;mso-font-charset:162;text-align:center;border-top:.5pt solid windowtext;border-right:.5pt solid windowtext;border-bottom:none;border-left:none;}.xl86{mso-style-parent:style0;font-size:7.5pt;font-weight:700;font-family:Arial,sans-serif;mso-font-charset:162;vertical-align:justify;border-top:.5pt dashed windowtext;border-right:none;border-bottom:none;border-left:none;}.xl87{mso-style-parent:style0;font-size:7.5pt;font-weight:700;font-family:Arial,sans-serif;mso-font-charset:162;border-top:none;border-right:none;border-bottom:.5pt dashed windowtext;border-left:none;}.xl88{mso-style-parent:style0;font-size:7.0pt;font-weight:700;font-style:italic;font-family:Arial,sans-serif;mso-font-charset:162;border-top:.5pt solid windowtext;border-right:none;border-bottom:none;border-left:.5pt solid windowtext;}.xl89{mso-style-parent:style0;font-size:7.0pt;font-weight:700;font-style:italic;font-family:Arial,sans-serif;mso-font-charset:162;border-top:.5pt solid windowtext;border-right:none;border-bottom:none;border-left:none;}.xl90{mso-style-parent:style0;font-size:7.0pt;font-weight:700;font-family:Arial,sans-serif;mso-font-charset:162;border-top:none;border-right:none;border-bottom:.5pt solid windowtext;border-left:.5pt solid windowtext;}.xl91{mso-style-parent:style0;font-size:7.0pt;font-weight:700;font-family:Arial,sans-serif;mso-font-charset:162;border-top:none;border-right:none;border-bottom:.5pt solid windowtext;border-left:none;}.xl92{mso-style-parent:style0;font-size:7.0pt;font-weight:700;font-family:Arial,sans-serif;mso-font-charset:162;text-align:center;border-top:none;border-right:none;border-bottom:.5pt solid windowtext;border-left:none;}.xl93{mso-style-parent:style0;font-size:7.0pt;font-weight:700;font-family:Arial,sans-serif;mso-font-charset:162;text-align:center;border-top:none;border-right:.5pt solid windowtext;border-bottom:.5pt solid windowtext;border-left:none;}</style>
<script type="text/javascript">
function printPage(){if(window.print)window.print();}
</script>
</head>
<body link="blue" vlink="purple">
<table border=0 cellpadding=0 cellspacing=0 width=569 style='border-collapse:collapse;table-layout:fixed;width:427pt'>
<col width=32 style='mso-width-source:userset;mso-width-alt:1170;width:24pt'>
<col width=52 style='mso-width-source:userset;mso-width-alt:1901;width:39pt'>
<col width=72 style='mso-width-source:userset;mso-width-alt:2633;width:54pt'>
<col width=94 style='mso-width-source:userset;mso-width-alt:3437;width:71pt'>
<col width=63 style='mso-width-source:userset;mso-width-alt:2304;width:47pt'>
<col width=64 style='width:48pt'>
<col width=64 style='width:48pt'>
<col width=64 span=2 style='width:48pt'>
<tr height=20 style='height:15.0pt'>
<td height=20 width=32 style='height:15.0pt;width:24pt'></td>
<td width=52 style='width:39pt'></td>
<td width=72 style='width:54pt'></td>
<td width=94 style='width:71pt'></td>
<td width=63 style='width:47pt'></td>
<td width=64 style='width:48pt'></td>
<td width=64 style='width:48pt'></td>
<td width=64 style='width:48pt'></td>
<td width=64 style='width:48pt'></td>
</tr>
<tr height=20 style='height:15.0pt'>
<td colspan=5 height=20 class=xl78 style='border-right:.5pt solid black;height:15.0pt'><?=getTranslation('printkupon3')?></td>
<td class=xl65 style='border-left:none'>&nbsp;</td>
<td colspan=3 style='mso-ignore:colspan'></td>
</tr>
<tr height=20 style='height:15.0pt'>
<td colspan=3 height=20 class=xl88 style='height:15.0pt'><?=getTranslation('printkupon4')?> :<?=$kupon['id']; ?></td>
<td colspan=2 class=xl84 style='border-right:.5pt solid black'>B :10792</td>
<td class=xl65 style='border-left:none'>&nbsp;</td>
<td colspan=3 style='mso-ignore:colspan'></td>
</tr>
<tr height=20 style='height:15.0pt'>
<td colspan=3 height=20 class=xl90 style='height:15.0pt'><?=getTranslation('printkupon10')?> :<?=date("d-m-Y H:i",$kupon['kupon_time']); ?></td>
<td colspan=2 class=xl92 style='border-right:.5pt solid black'></td>
<td class=xl65 style='border-left:none'>&nbsp;</td>
<td colspan=3 style='mso-ignore:colspan'></td>
</tr>
<tr height=20 style='height:15.0pt'>
<td colspan=5 height=20 class=xl83 style='border-right:.5pt solid black;height:15.0pt'><?=getTranslation('printkupon20')?>:<?=$ubsi['ciktimesaj']; ?></td>
<td class=xl65 style='border-left:none'>&nbsp;</td>
<td colspan=3 style='mso-ignore:colspan'></td>
</tr>
<tr height=20 style='height:15.0pt'>
<td colspan=5 height=20 class=xl83 style='border-right:.5pt solid black;height:15.0pt'><?=getTranslation('printkupon21')?></td>
<td class=xl65 style='border-left:none'>&nbsp;</td>
<td colspan=3 style='mso-ignore:colspan'></td>
</tr>

<?
$sor = sed_sql_query("select * from kupon_ic_sanal where kupon_id='$id'");
while($row=sed_sql_fetcharray($sor)) {
?>

<tr height=29 style='mso-height-source:userset;height:21.75pt'>
<td rowspan=2 height=49 class=xl81 style='border-bottom:.5pt dashed black;height:36.75pt'>Sanal</td>
<td style="overflow: hidden;text-overflow: ellipsis;" colspan=3 class=xl86>&nbsp;&nbsp;<?=$row['ev_takim'];?> - <?=$row['konuk_takim'];?> </td>
<td class=xl72><?=date("d.m H:i:s",$row['mac_time']); ?></td>
<td class=xl65 style='border-left:none'>&nbsp;</td>
<td colspan=3 style='mso-ignore:colspan'></td>
</tr><tr height=20 style='height:15.0pt'>
<td colspan=3 height=20 class=xl87 style='height:15.0pt'><?=$row['oran_tip'];?> : <?=$row['oran_val'];?> </td>
<td class=xl73><?=nf($row['oran']); ?></td>
<td class=xl65>&nbsp;</td>
<td colspan=3 style='mso-ignore:colspan'></td>
</tr>

<? } ?>

<tr height=20 style='height:15.0pt'>
<td colspan=4 height=20 class=xl74 style='height:15.0pt'><?=getTranslation('printkupon5')?></td>
<td class=xl70><?=nf($kupon['oran']); ?></td>
<td class=xl66></td>
<td colspan=3 style='mso-ignore:colspan'></td>
</tr>
<tr height=20 style='height:15.0pt'>
<td colspan=4 height=20 class=xl76 style='height:15.0pt'><?=getTranslation('printkupon7')?></td>
<td class=xl71><?=nf($kupon['yatan']); ?> <?=getTranslation('parabirimi')?></td>
<td class=xl65>&nbsp;</td>
<td colspan=3 style='mso-ignore:colspan'></td>
</tr>
<? if($ubsi['kesinti_goster']==1){ ?>
<tr height=20 style='height:15.0pt'>
<td colspan=4 height=20 class=xl76 style='height:15.0pt'>5% <?=getTranslation('printkupon6')?></td>
<td class=xl71><? 
if(!empty($ubsi['kazananyuzde'])) { $yuzdesi = yuzdele($ubsi['kazananyuzde']); 
$kesinti = $kupon['tutar']*$yuzdesi;
$gercektutar = $kupon['tutar']-$kesinti;
} else {
$gercektutar = $kupon['tutar'];	
}
echo nf($gercektutar); 
?> <?=getTranslation('parabirimi')?></td>
<td class=xl65>&nbsp;</td>
<td colspan=3 style='mso-ignore:colspan'></td>
</tr>
<? } ?>
<tr height=20 style='height:15.0pt'>
<td colspan=4 height=20 class=xl76 style='height:15.0pt'><?=getTranslation('printkupon8')?></td>
<td class=xl70><?=nf($kupon['tutar']); ?> <?=getTranslation('parabirimi')?></td>
<td class=xl65 style='border-left:none'>&nbsp;</td>
<td colspan=3 style='mso-ignore:colspan'></td>
</tr>
<tr height=20 style='height:15.0pt'>
<td height=20 class=xl67 style='height:15.0pt'>&nbsp;</td>
<td class=xl67>&nbsp;</td>
<td class=xl67>&nbsp;</td>
<td class=xl67>&nbsp;</td>
<td class=xl67>&nbsp;</td>
<td class=xl66></td>
<td colspan=3 style='mso-ignore:colspan'></td>
</tr>
<tr height=20 style='height:15.0pt'>
<td height=20 class=xl68 style='height:15.0pt'></td>
<td class=xl68></td>
<td class=xl68></td>
<td class=xl68></td>
<td class=xl68></td>
<td class=xl66></td>
<td colspan=3 style='mso-ignore:colspan'></td>
</tr>
<tr height=20 style='height:15.0pt'>
<td height=20 class=xl69 style='height:15.0pt'></td>
<td class=xl69></td>
<td class=xl69></td>
<td class=xl69></td>
<td class=xl69></td>
<td class=xl66></td>
<td colspan=3 style='mso-ignore:colspan'></td>
</tr>
<tr height=20 style='height:15.0pt'>
<td height=20 class=xl69 style='height:15.0pt'></td>
<td class=xl69></td>
<td class=xl69></td>
<td class=xl69></td>
<td class=xl69></td>
<td class=xl66></td>
<td colspan=3 style='mso-ignore:colspan'></td>
</tr>
<tr height=20 style='height:15.0pt'>
<td height=20 class=xl69 style='height:15.0pt'></td>
<td class=xl69></td>
<td class=xl69></td>
<td class=xl69></td>
<td class=xl69></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<tr height=20 style='height:15.0pt'>
<td height=20 style='height:15.0pt'></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td colspan=3 style='mso-ignore:colspan'></td>
</tr>
<tr height=20 style='height:15.0pt'>
<td height=20 style='height:15.0pt'></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td colspan=2 style='mso-ignore:colspan'></td>
</tr>
<![if supportMisalignedColumns]>
<tr height=0 style='display:none'>
<td width=32 style='width:24pt'></td>
<td width=52 style='width:39pt'></td>
<td width=72 style='width:54pt'></td>
<td width=94 style='width:71pt'></td>
<td width=63 style='width:47pt'></td>
<td width=64 style='width:48pt'></td>
<td width=64 style='width:48pt'></td>
<td width=64 style='width:48pt'></td>
<td width=64 style='width:48pt'></td>
</tr>
<![endif]>
</table>
<? } else if($ub['yazici_tip']=="1") { ?>
<style type="text/css">.style1{width:100%;}</style>
</head>
<body style="font-size:11px; font-family:Verdana; margin:0px 0px 0px 0px">
<div align="left">
<div id="Panel2">
<table width="625px" border="1" style="border:#000000;">
<tr>
<td align="center" width="20%"><span id="Label1" style="font-weight:bold;"><?=getTranslation('printkupon4')?></span></td>
<td align="center" width="20%">
<span id="Label2" style="font-weight:bold;"><?=getTranslation('printkupon19')?></span>
</td>
<td align="center" width="20%">
<span id="Label3" style="font-weight:bold;"><?=getTranslation('printkupon9')?></span>
</td>
<td align="center" width="20%">
<span id="Label4" style="font-weight:bold;"><?=getTranslation('printkupon8')?></span>
</td>
<td align="center" width="20%">
<span id="Label5" style="font-weight:bold;"><?=getTranslation('printkupon10')?></span>
</td>
</tr>
<tr>
<td align="center">
<span id="Label6" style="font-size:Small;font-weight:bold;"><?=$kupon['id']; ?></span>
</td>
<td align="center">
<span id="Label7" style="font-size:Small;font-weight:bold;"><?=nf($kupon['yatan']); ?> <?=getTranslation('parabirimi')?></span>
</td>
<td align="center">
<span id="Label8" style="font-size:Small;font-weight:bold;"><?=nf($kupon['oran']); ?></span>
</td>
<td align="center">
<span id="Label9" style="font-size:Small;font-weight:bold;"><?=nf($kupon['tutar']); ?> <?=getTranslation('parabirimi')?></span>
</td>
<td align="center">
<span id="Label10" style="font-size:X-Small;font-weight:bold;"><?=date("d-m-Y H:i",$kupon['kupon_time']); ?></span>
</td>
</tr>
<tr>
<td align="center" colspan="5">
<table cellspacing="0" cellpadding="1" rules="cols" border="1" id="GridView1" style="color:Black;background-color:White;border-color:#999999;border-width:1px;border-style:Solid;font-family:Verdana;font-size:11px;width:625px;border-collapse:collapse;">
<tr align="center" style="color:Black;background-color:White;border-color:Black;border-width:1px;border-style:Solid;font-weight:bold;height:10px;">
<th scope="col"><?=getTranslation('printkupon11')?></th>
<th scope="col"><?=getTranslation('printkupon12')?></th>
<th scope="col"><?=getTranslation('printkupon16')?></th>
<th scope="col"><?=getTranslation('printkupon10')?></th>
<th scope="col"><?=getTranslation('printkupon9')?></th>
</tr>

<?
$sor = sed_sql_query("select * from kupon_ic_sanal where kupon_id='$id'");
while($row=sed_sql_fetcharray($sor)) {
?>

<tr align="center" style="height:10px;">
<td style="width:40px;">Sanal</td>
<td align="left" style="width:300px;"><?=$row['ev_takim'];?> - <?=$row['konuk_takim'];?> </td>
<td align="left" nowrap><?=$row['oran_tip'];?> : <?=$row['oran_val'];?>  </td>
<td style="width:100px;"><?=date("d.m H:i:s",$row['mac_time']); ?></td>
<td style="width:50px;"><?=nf($row['oran']); ?></td>
</tr>

<? } ?>

</table>
<span id="Label11" style="font-size:Smaller;"><?=$ubsi['ciktimesaj']; ?></span>
</td>
</tr>
</table>
</div>
</div>
<? } ?>

<? }
## TERMAL YAZICI AYAR YERİ ##
else if($ub['herkupon_sms']=="2") { ?>

<link href="/players/img/print/print.css?r=<?=rand();?>" rel="stylesheet" type="text/css">

<div class="printalan">
<div class="printbaslik"><?=$kupon['username']; ?></div>
<div class="printtarih"><?=date("d.m.Y H:i:s",$kupon['kupon_time']); ?></div>
<div class="printtarih"><?=getTranslation('printkupon4')?>: <strong><?=$id;?></strong></div>

<?
$sor = sed_sql_query("select * from kupon_ic_sanal where kupon_id='$id'");
while($row=sed_sql_fetcharray($sor)) {
?>
<div class="kuponline">
<div class="mac_tanim">SANAL <strong><?=$row['ev_takim'];?> - <?=$row['konuk_takim'];?> (<?=date("d.m H:i:s",$row['mac_time']); ?>)</strong><span><?="".number_format($row['oran'],2)."";?></span></div>
<div class="oranbilgileri"><?=$row['oran_tip'];?> : <?=$row['oran_val'];?></div>
<div class="clear"></div>
</div>
<? } ?>

<div class="oranlar">
<span><?=getTranslation('printkupon9')?></span>
<font><?=nf($kupon['oran']); ?></font>
<div class="clear"></div>
</div>
<div class="oranlar">
<span><?=getTranslation('printkupon22')?></span>
<font><?=nf($kupon['yatan']); ?></font>
<div class="clear"></div>
</div>

<? if(!empty($ubsi['kazananyuzde']) && $ubsi['kazananyuzde']!="0") { ?>

<div class="oranlar">
<span><?=getTranslation('printkupon23')?></span>
<font><? 
if(!empty($ubsi['kazananyuzde'])) { $yuzdesi = yuzdele($ubsi['kazananyuzde']); 
$kesinti = $kupon['tutar']*$yuzdesi;
$gercektutar = $kupon['tutar']-$kesinti;
} else {
$gercektutar = $kupon['tutar'];	
}
echo nf($gercektutar); 
?></font>
<div class="clear"></div>
</div>
<? } else { ?>
<div class="oranlar">
<span><?=getTranslation('printkupon24')?></span>
<font><?=nf($kupon['tutar']); ?></font>
<div class="clear"></div>
</div>
<? } ?>
</div>
<? } ?>

<? } else { ?>

<? if($ub['herkupon_sms']=="1") { ?>

<? if($ub['yazici_tip']=="10") { ?>
<style type="text/css">body{margin:0px;margin-left:22px;padding:0px;font-family:Calibri,sans-serif;font-size:12px;}div{margin:0px;padding:0px;}.bahiskuponu{width:230px;background:url(/players/img/print/ticket/10/logo.png) no-repeat center top;height:32px;font-weight:bold;text-align:center;font-size:18px;}cikticontainer{width:230px;padding:5px;}.bayi{float:left;width:86px;}.tarih{float:left;width:94px;text-align:right;}.kupon{width:180px;}.saat{float:left;width:30px;text-align:left;}.kupno{float:left;width:22px;}.takimlar{float:left;width:150px;}.tahmin{float:left;width:170px;margin-left:5px;overflow:hidden;}.oranlar{float:left;width:30px;text-align:left;font-weight:bold;}.topkolon{float:left;width:128px;}.topkolonb{float:left;width:74px;text-align:right;}.oyuncuname{float:left;width:64px;}.oyuncunamea{float:left;width:138px;text-align:right;}.toplama{float:left;width:108px;font-weight:bold;}.toplamtutar{float:left;width:94px;text-align:right;font-weight:bold;}.maxkazanc{float:left;width:108px;}.maxkazanctutar{float:left;width:94px;text-align:right;}.serino{width:230px;text-align:center;margin-top:6px;font-weight:bold;}.barkod{width:230px;text-align:center;}.baslik-a{margin-left:22px;margin-right:22px;}.baslik-b{width:230px;margin-top:6px;margin-bottom:6px;border-top:1px dotted black;border-bottom:1px dotted black;padding-top:4px;}.toplam{width:230px;padding-bottom:6px;border-bottom:1px dotted black;}</style>
</head>
<style type="text/css" media="print">
@page {
size: auto;   /* auto is the current printer page size */
margin: 0mm;  /* this affects the margin in the printer settings */
}
</style>

<body>
<div class="cikticontainer">
<div class="bahiskuponu"><?=getTranslation('printkupon3')?></div>
<div class="baslik-a">
<div style="display:table;">
<div class="bayi">B: 10792</div>
<div class="tarih"><?=date("d-m-Y H:i",$kupon['kupon_time']); ?></div>
</div>
<div class="kupon"><?=getTranslation('printkupon4')?>: <?=$kupon['id']; ?></div>
</div>
<div class="baslik-b">

<?
$sor = sed_sql_query("select * from kupon_ic where kupon_id='$id'");
while($row=sed_sql_fetcharray($sor)) { 
$ob = explode("|",$row['oran_tip']);

$secim_yapimi_kuponguncelle = $ob[0];
$secim_yapimi_kuponguncelle2 = $ob[1];

if($row['spor_tip']=="futbol") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('foran1');
} else if($secim_yapimi_kuponguncelle=="Handikap (0:1)"){
$secilen_translate = getTranslation('foran2');
} else if($secim_yapimi_kuponguncelle=="Handikap (1:0)"){
$secilen_translate = getTranslation('foran3');
} else if($secim_yapimi_kuponguncelle=="Handikap (0:2)"){
$secilen_translate = getTranslation('foran4');
} else if($secim_yapimi_kuponguncelle=="Handikap (2:0)"){
$secilen_translate = getTranslation('foran5');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 1.YARI )"){
$secilen_translate = getTranslation('foran6');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 2.YARI )"){
$secilen_translate = getTranslation('foran7');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Çifte Şans"){
$secilen_translate = getTranslation('foran8');
} else if($secim_yapimi_kuponguncelle=="1.YARI KG"){
$secilen_translate = getTranslation('foran9');
} else if($secim_yapimi_kuponguncelle=="Beraberlikte İade"){
$secilen_translate = getTranslation('foran10');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 0.5"){
$secilen_translate = getTranslation('foran11');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran12');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran13');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran14');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 4.5"){
$secilen_translate = getTranslation('foran15');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran16');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 0.5"){
$secilen_translate = getTranslation('foran18');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran19');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran20');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran21');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 0.5"){
$secilen_translate = getTranslation('foran22');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran23');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran24');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran25');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Gol Atarmı ?"){
$secilen_translate = getTranslation('foran26');
} else if($secim_yapimi_kuponguncelle=="Deplasman Gol Atarmı ?"){
$secilen_translate = getTranslation('foran27');
} else if($secim_yapimi_kuponguncelle=="Karşılıklı Gol"){
$secilen_translate = getTranslation('foran28');
} else if($secim_yapimi_kuponguncelle=="​​​​​1.Yarı Tek/Çift"){
$secilen_translate = getTranslation('foran29');
} else if($secim_yapimi_kuponguncelle=="Tek/Çift"){
$secilen_translate = getTranslation('foran30');
} else if($secim_yapimi_kuponguncelle=="Evsahibi Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran31');
} else if($secim_yapimi_kuponguncelle=="Deplasman Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran32');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran33');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 2.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran34');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran35');
} else if($secim_yapimi_kuponguncelle=="Deplasman 2.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran36');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı A/Ü 0.5"){
$secilen_translate = getTranslation('foran37');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı A/Ü 1.5"){
$secilen_translate = getTranslation('foran38');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı A/Ü 0.5"){
$secilen_translate = getTranslation('foran39');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı A/Ü 1.5"){
$secilen_translate = getTranslation('foran40');
} else if($secim_yapimi_kuponguncelle=="Evsahibi A/Ü 1.5"){
$secilen_translate = getTranslation('foran41');
} else if($secim_yapimi_kuponguncelle=="Deplasman A/Ü 1.5"){
$secilen_translate = getTranslation('foran42');
} else if($secim_yapimi_kuponguncelle=="​​​​​Evsahibi Her 2 yarıda Gol Atar ?"){
$secilen_translate = getTranslation('foran43');
} else if($secim_yapimi_kuponguncelle=="Deplasman Her 2 yarıda Gol Atar ?"){
$secilen_translate = getTranslation('foran44');
} else if($secim_yapimi_kuponguncelle=="Hangi Devrede Fazla Gol Olur"){
$secilen_translate = getTranslation('foran45');
} else if($secim_yapimi_kuponguncelle=="Evsahibi Hangi Devrede Fazla Gol Atar ?"){
$secilen_translate = getTranslation('foran46');
} else if($secim_yapimi_kuponguncelle=="Deplasman Hangi Devrede Fazla Gol Atar ?"){
$secilen_translate = getTranslation('foran47');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-4+)"){
$secilen_translate = getTranslation('foran48');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-5+)"){
$secilen_translate = getTranslation('foran49');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-6+)"){
$secilen_translate = getTranslation('foran50');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 1 gol farkla kazanır mı?"){
$secilen_translate = getTranslation('foran51');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 2 gol farkla kazanır mı?"){
$secilen_translate = getTranslation('foran52');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 3 gol farkla kazanır mı?"){
$secilen_translate = getTranslation('foran53');
} else if($secim_yapimi_kuponguncelle=="1X2 ve toplam gol sayısı"){
$secilen_translate = getTranslation('foran54');
} else if($secim_yapimi_kuponguncelle=="Maç sonucu ve karşılıklı goller"){
$secilen_translate = getTranslation('foran55');
} else if($secim_yapimi_kuponguncelle=="İlk Yarı / Maç Sonucu"){
$secilen_translate = getTranslation('foran56');
} else if($secim_yapimi_kuponguncelle=="Skor Bahsi (90 Dakika)"){
$secilen_translate = getTranslation('foran57');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('foran58');
} else if($secim_yapimi_kuponguncelle=="Toplam Sari Kart Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran59');
} else if($secim_yapimi_kuponguncelle=="Kirmizi kart cikar mi?"){
$secilen_translate = getTranslation('foran60');
} else if($secim_yapimi_kuponguncelle=="Macta kac tane penalti olur?"){
$secilen_translate = getTranslation('foran61');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran62');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran63');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran64');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran65');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran66');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran67');
} else if($secim_yapimi_kuponguncelle=="Sarı Kart Toplam Tek/Çift"){
$secilen_translate = getTranslation('foran68');
} else if($secim_yapimi_kuponguncelle=="Hangi Takım Çok Sarı Kart Yer ?"){
$secilen_translate = getTranslation('foran69');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran70');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 6.5"){
$secilen_translate = getTranslation('foran71');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 7.5"){
$secilen_translate = getTranslation('foran72');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 8.5"){
$secilen_translate = getTranslation('foran73');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 9.5"){
$secilen_translate = getTranslation('foran74');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 10.5"){
$secilen_translate = getTranslation('foran75');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 11.5"){
$secilen_translate = getTranslation('foran76');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 12.5"){
$secilen_translate = getTranslation('foran77');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 13.5"){
$secilen_translate = getTranslation('foran78');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 14.5"){
$secilen_translate = getTranslation('foran79');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 15.5"){
$secilen_translate = getTranslation('foran80');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran81');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran82');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 4.5"){
$secilen_translate = getTranslation('foran83');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran84');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 6.5"){
$secilen_translate = getTranslation('foran85');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 7.5"){
$secilen_translate = getTranslation('foran86');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 8.5"){
$secilen_translate = getTranslation('foran87');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 9.5"){
$secilen_translate = getTranslation('foran88');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 10.5"){
$secilen_translate = getTranslation('foran89');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran90');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran91');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 4.5"){
$secilen_translate = getTranslation('foran92');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran93');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 6.5"){
$secilen_translate = getTranslation('foran94');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 7.5"){
$secilen_translate = getTranslation('foran95');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 8.5"){
$secilen_translate = getTranslation('foran96');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 9.5"){
$secilen_translate = getTranslation('foran97');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 10.5"){
$secilen_translate = getTranslation('foran98');
} else if($secim_yapimi_kuponguncelle=="Korner Toplam Tek/Çift"){
$secilen_translate = getTranslation('foran99');
} else if($secim_yapimi_kuponguncelle=="Hangi Takım Çok Korner Kullanır ?"){
$secilen_translate = getTranslation('foran100');
}

} else if($row['spor_tip']=="basketbol") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ?"){
$secilen_translate = getTranslation('boran1');
} else if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('boran2');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 1.YARI )"){
$secilen_translate = getTranslation('boran3');
} else if($secim_yapimi_kuponguncelle=="Toplam Skor Tek/Çift"){
$secilen_translate = getTranslation('boran4');
} else if($secim_yapimi_kuponguncelle=="Toplam Skor Alt/Üst"){
$secilen_translate = getTranslation('boran5');
} else if($secim_yapimi_kuponguncelle=="Handikap ( 1.YARI )"){
$secilen_translate = getTranslation('boran6');
} else if($secim_yapimi_kuponguncelle=="Handikap"){
$secilen_translate = getTranslation('boran7');
} else if($secim_yapimi_kuponguncelle=="1.Yarı / MS"){
$secilen_translate = getTranslation('boran8');
} else if($secim_yapimi_kuponguncelle=="İki Devrede Kazanır"){
$secilen_translate = getTranslation('boran9');
} else if($secim_yapimi_kuponguncelle=="Tüm Periyotları Kazanır"){
$secilen_translate = getTranslation('boran10');
} else if($secim_yapimi_kuponguncelle=="1.Takım İY Alt/Üst"){
$secilen_translate = getTranslation('boran11');
} else if($secim_yapimi_kuponguncelle=="2.Takım İY Alt/Üst"){
$secilen_translate = getTranslation('boran12');
}

}  else if($row['spor_tip']=="tenis") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ?"){
$secilen_translate = getTranslation('toran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahsi"){
$secilen_translate = getTranslation('toran2');
} else if($secim_yapimi_kuponguncelle=="1.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('toran3');
} else if($secim_yapimi_kuponguncelle=="2.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('toran4');
} else if($secim_yapimi_kuponguncelle=="1.Oyuncu 1 Set Kazanır"){
$secilen_translate = getTranslation('toran5');
} else if($secim_yapimi_kuponguncelle=="2.Oyuncu 1 Set Kazanır"){
$secilen_translate = getTranslation('toran6');
}

} else if($row['spor_tip']=="voleybol") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ?"){
$secilen_translate = getTranslation('voran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahsi"){
$secilen_translate = getTranslation('voran2');
} else if($secim_yapimi_kuponguncelle=="Toplam Alt/Üst"){
$secilen_translate = getTranslation('voran3');
} else if($secim_yapimi_kuponguncelle=="5 Set Sürermi ?"){
$secilen_translate = getTranslation('voran4');
}

} else if($row['spor_tip']=="buzhokeyi") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('buzoran1');
} else if($secim_yapimi_kuponguncelle=="1.P 1X2"){
$secilen_translate = getTranslation('buzoran2');
} else if($secim_yapimi_kuponguncelle=="2.P 1X2"){
$secilen_translate = getTranslation('buzoran3');
} else if($secim_yapimi_kuponguncelle=="3.P 1X2"){
$secilen_translate = getTranslation('buzoran4');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('buzoran5');
} else if($secim_yapimi_kuponguncelle=="1.P Çifte Şans"){
$secilen_translate = getTranslation('buzoran6');
} else if($secim_yapimi_kuponguncelle=="2.P Çifte Şans"){
$secilen_translate = getTranslation('buzoran7');
} else if($secim_yapimi_kuponguncelle=="3.P Çifte Şans"){
$secilen_translate = getTranslation('buzoran8');
}

} else if($row['spor_tip']=="hentbol") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('horan1');
} else if($secim_yapimi_kuponguncelle=="Toplam Alt/Üst"){
$secilen_translate = getTranslation('horan2');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 1.YARI )"){
$secilen_translate = getTranslation('horan3');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Alt/Üst"){
$secilen_translate = getTranslation('horan4');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Tek/Çift"){
$secilen_translate = getTranslation('horan5');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Tek/Çift"){
$secilen_translate = getTranslation('horan6');
} else if($secim_yapimi_kuponguncelle=="Toplam Tek/Çift"){
$secilen_translate = getTranslation('horan7');
}

} else if($row['spor_tip']=="canli") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('fcanlioran1');
} else if($secim_yapimi_kuponguncelle=="Handikap 1:0"){
$secilen_translate = getTranslation('fcanlioran2');
} else if($secim_yapimi_kuponguncelle=="Handikap 2:0"){
$secilen_translate = getTranslation('fcanlioran3');
} else if($secim_yapimi_kuponguncelle=="Handikap 0:1"){
$secilen_translate = getTranslation('fcanlioran4');
} else if($secim_yapimi_kuponguncelle=="Handikap 0:2"){
$secilen_translate = getTranslation('fcanlioran5');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('fcanlioran6');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Çifte Şans"){
$secilen_translate = getTranslation('fcanlioran7');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran8');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran9');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran10');
} else if($secim_yapimi_kuponguncelle=="Toplam 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran11');
} else if($secim_yapimi_kuponguncelle=="Toplam 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran12');
} else if($secim_yapimi_kuponguncelle=="Toplam 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran13');
} else if($secim_yapimi_kuponguncelle=="Toplam 3.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran14');
} else if($secim_yapimi_kuponguncelle=="Toplam 4.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran15');
} else if($secim_yapimi_kuponguncelle=="Toplam 5.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran16');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran17');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran18');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran19');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 3.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran20');
} else if($secim_yapimi_kuponguncelle=="Karşılıklı Gol Olurmu ?"){
$secilen_translate = getTranslation('fcanlioran21');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Müsabakada Gol Atarmı ?"){
$secilen_translate = getTranslation('fcanlioran22');
} else if($secim_yapimi_kuponguncelle=="Deplasman Müsabakada Gol Atarmı ?"){
$secilen_translate = getTranslation('fcanlioran23');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Tek / Çift"){
$secilen_translate = getTranslation('fcanlioran24');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Tek / Çift"){
$secilen_translate = getTranslation('fcanlioran25');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Karşılıklı Gol"){
$secilen_translate = getTranslation('fcanlioran26');
} else if($secim_yapimi_kuponguncelle=="Maç Sonucu ve Karşılıklı Gol"){
$secilen_translate = getTranslation('fcanlioran27');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran28');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran29');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran30');
} else if($secim_yapimi_kuponguncelle=="Deplasman 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran31');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran32');
} else if($secim_yapimi_kuponguncelle=="Deplasman 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran33');
} else if($secim_yapimi_kuponguncelle=="Toplam Kaç Gol Atılır ?"){
$secilen_translate = getTranslation('fcanlioran34');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Toplam Kaç Gol Atar ?"){
$secilen_translate = getTranslation('fcanlioran35');
} else if($secim_yapimi_kuponguncelle=="Deplasman Toplam Kaç Gol Atar ?"){
$secilen_translate = getTranslation('fcanlioran36');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Skoru"){
$secilen_translate = getTranslation('fcanlioran37');
} else if($secim_yapimi_kuponguncelle=="Maç Skoru"){
$secilen_translate = getTranslation('fcanlioran38');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran39');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran40');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran41');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran42');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran43');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran44');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi İlk Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran45');
} else if($secim_yapimi_kuponguncelle=="Ev sahibi İkinci Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran46');
} else if($secim_yapimi_kuponguncelle=="Deplasman İlk Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran47');
} else if($secim_yapimi_kuponguncelle=="Deplasman İkinci Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran48');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 1 Gol Farkla Kazanirmi ?"){
$secilen_translate = getTranslation('fcanlioran49');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 2 Gol Farkla Kazanirmi ?"){
$secilen_translate = getTranslation('fcanlioran50');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 3 Gol Farkla Kazanirmi ?"){
$secilen_translate = getTranslation('fcanlioran51');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Sonucu"){
$secilen_translate = getTranslation('fcanlioran52');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Sonucu"){
$secilen_translate = getTranslation('fcanlioran53');
} else if($secim_yapimi_kuponguncelle=="İlk Yarıda Kaç Gol Olur ?"){
$secilen_translate = getTranslation('fcanlioran54');
} else if($secim_yapimi_kuponguncelle=="2.Yarıda Toplam Kaç Gol Olur ?"){
$secilen_translate = getTranslation('fcanlioran55');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-4+)"){
$secilen_translate = getTranslation('fcanlioran56');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-5+)"){
$secilen_translate = getTranslation('fcanlioran57');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-6+)"){
$secilen_translate = getTranslation('fcanlioran58');
} else if($secim_yapimi_kuponguncelle=="1. yarıda 1.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran59');
} else if($secim_yapimi_kuponguncelle=="1.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran60');
} else if($secim_yapimi_kuponguncelle=="2.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran61');
} else if($secim_yapimi_kuponguncelle=="3.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran62');
} else if($secim_yapimi_kuponguncelle=="4.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran63');
} else if($secim_yapimi_kuponguncelle=="5.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran64');
} else if($secim_yapimi_kuponguncelle=="6.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran65');
}

} else if($row['spor_tip']=="canlib") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('bcanlioran1');
} else if($secim_yapimi_kuponguncelle=="1X2(1.YARI)"){
$secilen_translate = getTranslation('bcanlioran2');
} else if($secim_yapimi_kuponguncelle=="1X2(2.YARI)"){
$secilen_translate = getTranslation('bcanlioran3');
} else if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran4');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran5');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran6');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran7');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran8');
} else if($secim_yapimi_kuponguncelle=="Toplam Skor Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran9');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran10');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran11');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran12');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran13');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran14');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran15');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran16');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran17');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran18');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran19');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran20');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran21');
} else if($secim_yapimi_kuponguncelle=="Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran22');
}

} else if($row['spor_tip']=="canlit") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
$secilen_translate = getTranslation('tcanlioran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahisi"){
$secilen_translate = getTranslation('tcanlioran2');
}

} else if($row['spor_tip']=="canliv") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
$secilen_translate = getTranslation('vcanlioran1');
} else if($secim_yapimi_kuponguncelle=="1.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran2');
} else if($secim_yapimi_kuponguncelle=="2.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran3');
} else if($secim_yapimi_kuponguncelle=="3.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran4');
} else if($secim_yapimi_kuponguncelle=="4.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran5');
} else if($secim_yapimi_kuponguncelle=="Set bahisi (5 maç üzerinden)"){
$secilen_translate = getTranslation('vcanlioran6');
} else if($secim_yapimi_kuponguncelle=="Toplam Kaç Set Oynanır ?"){
$secilen_translate = getTranslation('vcanlioran7');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran8');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran9');
} else if($secim_yapimi_kuponguncelle=="1.Takım 1.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran10');
} else if($secim_yapimi_kuponguncelle=="2.Takım 1.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran11');
} else if($secim_yapimi_kuponguncelle=="1.Takım 2.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran12');
} else if($secim_yapimi_kuponguncelle=="2.Takım 2.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran13');
} else if($secim_yapimi_kuponguncelle=="1.Takım 3.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran14');
} else if($secim_yapimi_kuponguncelle=="2.Takım 3.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran15');
} else if($secim_yapimi_kuponguncelle=="1.Takım 4.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran16');
} else if($secim_yapimi_kuponguncelle=="2.Takım 4.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran17');
} else if($secim_yapimi_kuponguncelle=="Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran18');
} else if($secim_yapimi_kuponguncelle=="Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran19');
} else if($secim_yapimi_kuponguncelle=="1.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran20');
} else if($secim_yapimi_kuponguncelle=="2.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran21');
} else if($secim_yapimi_kuponguncelle=="3.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran22');
} else if($secim_yapimi_kuponguncelle=="4.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran23');
} else if($secim_yapimi_kuponguncelle=="Müsabaka 5.Set Sürermi"){
$secilen_translate = getTranslation('vcanlioran24');
}

} else if($row['spor_tip']=="canlibuz") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('buzcanlioran1');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('buzcanlioran2');
} else if($secim_yapimi_kuponguncelle=="Cifte Sans"){
$secilen_translate = getTranslation('buzcanlioran2');
} else if($secim_yapimi_kuponguncelle=="Hangi periyod daha cok gol olur?"){
$secilen_translate = getTranslation('buzcanlioran3');
}

}

if($dil_bilgisi22['language']=='en'){

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "Y";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "N";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "U";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "O";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 and O";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 and O";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 and U";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 and U";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 and Y";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 and Y";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 and N";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 and N";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "No Goal";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "X and Y";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "D";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "S";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else if($dil_bilgisi22['language']=='de'){ 

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "J";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "K";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "N";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "T";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 und T";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 und T";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 und N";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 und N";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 und J";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 und J";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 und K";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 und K";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "Kein Ziel";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "X und J";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "P";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "E";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else if($dil_bilgisi22['language']=='ar'){ 

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "أجل";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "لا";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "أدنى";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "أعلى";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 وما فوق";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 وما فوق";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 و السفلى";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 و السفلى";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 و نعم";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 و نعم";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 و لا";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 و لا";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "لا هدف";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "س ونعم";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "زوجان";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "واحد";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else if($dil_bilgisi22['language']=='ru'){ 

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "да";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "нет";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "ниже";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "топ";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 и выше";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 и выше";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 и ниже";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 и ниже";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 и да";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 и да";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 и нет";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 и нет";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "Нет цели";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "Х и да";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "пара";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "один";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

?>
<div style="display:table;">
<div class="kupno" style="width:45px;"><?=$row['mac_kodu']; ?></div>
<div class="takimlar"><?=$row['ev_takim'];?> - <?=$row['konuk_takim'];?></div>
<div class="saat"><? if($row['spor_tip']!="canli" || $row['spor_tip']!="canlibasket") { ?><?=date("d.m H:i",$row['mac_time']); ?><? } ?></div>
</div>
<div style="display:table;">
<div class="tahmin" style="width:192px;"><?=$secilen_translate;?> : <?=$secilen_translate2;?> <? if(!empty($row['oran_val'])) { echo "($row[oran_val])"; } ?> </div>
<div class="oranlar"><?=nf($row['oran']); ?></div>
</div>
<? } ?>

</div>
<div class="oynayan">
<div style="display:table;">
<div class="topkolon"><?=getTranslation('printkupon5')?></div>
<div class="topkolonb"><?=nf($kupon['oran']); ?></div>
</div>
<? if($ubsi['kesinti_goster']==1){ ?>
<div style="display:table;">
<div class="oyuncuname"><?=$ubsi['cikti_kesinti']; ?>% <?=getTranslation('printkupon6')?>:</div>
<div class="oyuncunamea">
<? 
if(!empty($ubsi['kazananyuzde'])) { $yuzdesi = yuzdele($ubsi['kazananyuzde']); 
$kesinti = $kupon['tutar']*$yuzdesi;
$gercektutar = $kupon['tutar']-$kesinti;
} else {
$gercektutar = $kupon['tutar'];	
}
echo nf($gercektutar); 
?> <?=getTranslation('parabirimi')?>
</div>
</div>
<? } ?>
</div>
<div class="toplam">
<div style="display:table;">
<div class="toplama"><?=getTranslation('printkupon7')?></div>
<div class="toplamtutar"><?=nf($kupon['yatan']); ?> <?=getTranslation('parabirimi')?></div>
</div>
<div style="display:table;">
<div class="maxkazanc"><?=getTranslation('printkupon8')?>:</div>
<div class="maxkazanctutar"><?=nf($kupon['tutar']); ?> <?=getTranslation('parabirimi')?></div>
</div>
</div>
<div class="serino">
||||| 672954D6-2954-CA295436 |||||
</div>
<div class="barkod"> <?=$ubsi['ciktimesaj']; ?> </div>
<div class="barkod">
</div>
</div>
<? } else if($ub['yazici_tip']=="9") { ?>
<style type="text/css">body{margin:0px;margin-left:22px;padding:0px;font-family:Calibri,sans-serif;font-size:12px;}div{margin:0px;padding:0px;}.bahiskuponu{width:230px;background:url(/players/img/print/ticket/9/logo.png) no-repeat center top;height:32px;line-height:32px;font-weight:bold;text-align:center;margin-bottom:10px;font-size:18px;}cikticontainer{width:230px;padding:5px;}.bayi{float:left;width:86px;}.tarih{float:left;width:94px;text-align:right;}.kupon{width:180px;}.saat{float:left;width:30px;text-align:left;}.kupno{float:left;width:22px;}.takimlar{float:left;width:150px;}.tahmin{float:left;width:170px;margin-left:5px;overflow:hidden;}.oranlar{float:left;width:30px;text-align:left;font-weight:bold;}.topkolon{float:left;width:128px;}.topkolonb{float:left;width:74px;text-align:right;}.oyuncuname{float:left;width:64px;}.oyuncunamea{float:left;width:138px;text-align:right;}.toplama{float:left;width:108px;font-weight:bold;}.toplamtutar{float:left;width:94px;text-align:right;font-weight:bold;}.maxkazanc{float:left;width:108px;}.maxkazanctutar{float:left;width:94px;text-align:right;}.serino{width:230px;text-align:center;margin-top:6px;font-weight:bold;}.barkod{width:230px;text-align:center;}.baslik-a{margin-left:22px;margin-right:22px;}.baslik-b{width:230px;margin-top:6px;margin-bottom:6px;border-top:1px solid black;border-bottom:1px solid black;padding-top:4px;}.toplam{width:230px;padding-bottom:6px;border-bottom:1px solid black;}</style>
  <style type="text/css" media="print">
        @page 
        {
            size: auto;   /* auto is the current printer page size */
            margin: 0mm;  /* this affects the margin in the printer settings */
        }
    </style>
</head>
<body>
<div class="cikticontainer">
<div class="bahiskuponu"><?=getTranslation('printkupon3')?></div>
<div class="baslik-a">
<div style="display:table;">
<div class="bayi">B: 10792</div>
<div class="tarih"><?=date("d-m-Y H:i",$kupon['kupon_time']); ?></div>
</div>
<div class="kupon"><?=getTranslation('printkupon4')?>: <?=$kupon['id']; ?></div>
</div>
<div class="baslik-b">

<?
$sor = sed_sql_query("select * from kupon_ic where kupon_id='$id'");
while($row=sed_sql_fetcharray($sor)) { 
$ob = explode("|",$row['oran_tip']);

$secim_yapimi_kuponguncelle = $ob[0];
$secim_yapimi_kuponguncelle2 = $ob[1];

if($row['spor_tip']=="futbol") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('foran1');
} else if($secim_yapimi_kuponguncelle=="Handikap (0:1)"){
$secilen_translate = getTranslation('foran2');
} else if($secim_yapimi_kuponguncelle=="Handikap (1:0)"){
$secilen_translate = getTranslation('foran3');
} else if($secim_yapimi_kuponguncelle=="Handikap (0:2)"){
$secilen_translate = getTranslation('foran4');
} else if($secim_yapimi_kuponguncelle=="Handikap (2:0)"){
$secilen_translate = getTranslation('foran5');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 1.YARI )"){
$secilen_translate = getTranslation('foran6');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 2.YARI )"){
$secilen_translate = getTranslation('foran7');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Çifte Şans"){
$secilen_translate = getTranslation('foran8');
} else if($secim_yapimi_kuponguncelle=="1.YARI KG"){
$secilen_translate = getTranslation('foran9');
} else if($secim_yapimi_kuponguncelle=="Beraberlikte İade"){
$secilen_translate = getTranslation('foran10');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 0.5"){
$secilen_translate = getTranslation('foran11');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran12');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran13');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran14');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 4.5"){
$secilen_translate = getTranslation('foran15');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran16');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 0.5"){
$secilen_translate = getTranslation('foran18');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran19');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran20');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran21');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 0.5"){
$secilen_translate = getTranslation('foran22');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran23');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran24');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran25');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Gol Atarmı ?"){
$secilen_translate = getTranslation('foran26');
} else if($secim_yapimi_kuponguncelle=="Deplasman Gol Atarmı ?"){
$secilen_translate = getTranslation('foran27');
} else if($secim_yapimi_kuponguncelle=="Karşılıklı Gol"){
$secilen_translate = getTranslation('foran28');
} else if($secim_yapimi_kuponguncelle=="​​​​​1.Yarı Tek/Çift"){
$secilen_translate = getTranslation('foran29');
} else if($secim_yapimi_kuponguncelle=="Tek/Çift"){
$secilen_translate = getTranslation('foran30');
} else if($secim_yapimi_kuponguncelle=="Evsahibi Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran31');
} else if($secim_yapimi_kuponguncelle=="Deplasman Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran32');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran33');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 2.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran34');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran35');
} else if($secim_yapimi_kuponguncelle=="Deplasman 2.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran36');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı A/Ü 0.5"){
$secilen_translate = getTranslation('foran37');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı A/Ü 1.5"){
$secilen_translate = getTranslation('foran38');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı A/Ü 0.5"){
$secilen_translate = getTranslation('foran39');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı A/Ü 1.5"){
$secilen_translate = getTranslation('foran40');
} else if($secim_yapimi_kuponguncelle=="Evsahibi A/Ü 1.5"){
$secilen_translate = getTranslation('foran41');
} else if($secim_yapimi_kuponguncelle=="Deplasman A/Ü 1.5"){
$secilen_translate = getTranslation('foran42');
} else if($secim_yapimi_kuponguncelle=="​​​​​Evsahibi Her 2 yarıda Gol Atar ?"){
$secilen_translate = getTranslation('foran43');
} else if($secim_yapimi_kuponguncelle=="Deplasman Her 2 yarıda Gol Atar ?"){
$secilen_translate = getTranslation('foran44');
} else if($secim_yapimi_kuponguncelle=="Hangi Devrede Fazla Gol Olur"){
$secilen_translate = getTranslation('foran45');
} else if($secim_yapimi_kuponguncelle=="Evsahibi Hangi Devrede Fazla Gol Atar ?"){
$secilen_translate = getTranslation('foran46');
} else if($secim_yapimi_kuponguncelle=="Deplasman Hangi Devrede Fazla Gol Atar ?"){
$secilen_translate = getTranslation('foran47');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-4+)"){
$secilen_translate = getTranslation('foran48');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-5+)"){
$secilen_translate = getTranslation('foran49');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-6+)"){
$secilen_translate = getTranslation('foran50');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 1 gol farkla kazanır mı?"){
$secilen_translate = getTranslation('foran51');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 2 gol farkla kazanır mı?"){
$secilen_translate = getTranslation('foran52');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 3 gol farkla kazanır mı?"){
$secilen_translate = getTranslation('foran53');
} else if($secim_yapimi_kuponguncelle=="1X2 ve toplam gol sayısı"){
$secilen_translate = getTranslation('foran54');
} else if($secim_yapimi_kuponguncelle=="Maç sonucu ve karşılıklı goller"){
$secilen_translate = getTranslation('foran55');
} else if($secim_yapimi_kuponguncelle=="İlk Yarı / Maç Sonucu"){
$secilen_translate = getTranslation('foran56');
} else if($secim_yapimi_kuponguncelle=="Skor Bahsi (90 Dakika)"){
$secilen_translate = getTranslation('foran57');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('foran58');
} else if($secim_yapimi_kuponguncelle=="Toplam Sari Kart Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran59');
} else if($secim_yapimi_kuponguncelle=="Kirmizi kart cikar mi?"){
$secilen_translate = getTranslation('foran60');
} else if($secim_yapimi_kuponguncelle=="Macta kac tane penalti olur?"){
$secilen_translate = getTranslation('foran61');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran62');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran63');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran64');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran65');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran66');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran67');
} else if($secim_yapimi_kuponguncelle=="Sarı Kart Toplam Tek/Çift"){
$secilen_translate = getTranslation('foran68');
} else if($secim_yapimi_kuponguncelle=="Hangi Takım Çok Sarı Kart Yer ?"){
$secilen_translate = getTranslation('foran69');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran70');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 6.5"){
$secilen_translate = getTranslation('foran71');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 7.5"){
$secilen_translate = getTranslation('foran72');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 8.5"){
$secilen_translate = getTranslation('foran73');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 9.5"){
$secilen_translate = getTranslation('foran74');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 10.5"){
$secilen_translate = getTranslation('foran75');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 11.5"){
$secilen_translate = getTranslation('foran76');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 12.5"){
$secilen_translate = getTranslation('foran77');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 13.5"){
$secilen_translate = getTranslation('foran78');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 14.5"){
$secilen_translate = getTranslation('foran79');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 15.5"){
$secilen_translate = getTranslation('foran80');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran81');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran82');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 4.5"){
$secilen_translate = getTranslation('foran83');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran84');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 6.5"){
$secilen_translate = getTranslation('foran85');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 7.5"){
$secilen_translate = getTranslation('foran86');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 8.5"){
$secilen_translate = getTranslation('foran87');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 9.5"){
$secilen_translate = getTranslation('foran88');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 10.5"){
$secilen_translate = getTranslation('foran89');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran90');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran91');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 4.5"){
$secilen_translate = getTranslation('foran92');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran93');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 6.5"){
$secilen_translate = getTranslation('foran94');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 7.5"){
$secilen_translate = getTranslation('foran95');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 8.5"){
$secilen_translate = getTranslation('foran96');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 9.5"){
$secilen_translate = getTranslation('foran97');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 10.5"){
$secilen_translate = getTranslation('foran98');
} else if($secim_yapimi_kuponguncelle=="Korner Toplam Tek/Çift"){
$secilen_translate = getTranslation('foran99');
} else if($secim_yapimi_kuponguncelle=="Hangi Takım Çok Korner Kullanır ?"){
$secilen_translate = getTranslation('foran100');
}

} else if($row['spor_tip']=="basketbol") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ?"){
$secilen_translate = getTranslation('boran1');
} else if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('boran2');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 1.YARI )"){
$secilen_translate = getTranslation('boran3');
} else if($secim_yapimi_kuponguncelle=="Toplam Skor Tek/Çift"){
$secilen_translate = getTranslation('boran4');
} else if($secim_yapimi_kuponguncelle=="Toplam Skor Alt/Üst"){
$secilen_translate = getTranslation('boran5');
} else if($secim_yapimi_kuponguncelle=="Handikap ( 1.YARI )"){
$secilen_translate = getTranslation('boran6');
} else if($secim_yapimi_kuponguncelle=="Handikap"){
$secilen_translate = getTranslation('boran7');
} else if($secim_yapimi_kuponguncelle=="1.Yarı / MS"){
$secilen_translate = getTranslation('boran8');
} else if($secim_yapimi_kuponguncelle=="İki Devrede Kazanır"){
$secilen_translate = getTranslation('boran9');
} else if($secim_yapimi_kuponguncelle=="Tüm Periyotları Kazanır"){
$secilen_translate = getTranslation('boran10');
} else if($secim_yapimi_kuponguncelle=="1.Takım İY Alt/Üst"){
$secilen_translate = getTranslation('boran11');
} else if($secim_yapimi_kuponguncelle=="2.Takım İY Alt/Üst"){
$secilen_translate = getTranslation('boran12');
}

}  else if($row['spor_tip']=="tenis") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ?"){
$secilen_translate = getTranslation('toran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahsi"){
$secilen_translate = getTranslation('toran2');
} else if($secim_yapimi_kuponguncelle=="1.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('toran3');
} else if($secim_yapimi_kuponguncelle=="2.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('toran4');
} else if($secim_yapimi_kuponguncelle=="1.Oyuncu 1 Set Kazanır"){
$secilen_translate = getTranslation('toran5');
} else if($secim_yapimi_kuponguncelle=="2.Oyuncu 1 Set Kazanır"){
$secilen_translate = getTranslation('toran6');
}

} else if($row['spor_tip']=="voleybol") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ?"){
$secilen_translate = getTranslation('voran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahsi"){
$secilen_translate = getTranslation('voran2');
} else if($secim_yapimi_kuponguncelle=="Toplam Alt/Üst"){
$secilen_translate = getTranslation('voran3');
} else if($secim_yapimi_kuponguncelle=="5 Set Sürermi ?"){
$secilen_translate = getTranslation('voran4');
}

} else if($row['spor_tip']=="buzhokeyi") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('buzoran1');
} else if($secim_yapimi_kuponguncelle=="1.P 1X2"){
$secilen_translate = getTranslation('buzoran2');
} else if($secim_yapimi_kuponguncelle=="2.P 1X2"){
$secilen_translate = getTranslation('buzoran3');
} else if($secim_yapimi_kuponguncelle=="3.P 1X2"){
$secilen_translate = getTranslation('buzoran4');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('buzoran5');
} else if($secim_yapimi_kuponguncelle=="1.P Çifte Şans"){
$secilen_translate = getTranslation('buzoran6');
} else if($secim_yapimi_kuponguncelle=="2.P Çifte Şans"){
$secilen_translate = getTranslation('buzoran7');
} else if($secim_yapimi_kuponguncelle=="3.P Çifte Şans"){
$secilen_translate = getTranslation('buzoran8');
}

} else if($row['spor_tip']=="hentbol") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('horan1');
} else if($secim_yapimi_kuponguncelle=="Toplam Alt/Üst"){
$secilen_translate = getTranslation('horan2');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 1.YARI )"){
$secilen_translate = getTranslation('horan3');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Alt/Üst"){
$secilen_translate = getTranslation('horan4');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Tek/Çift"){
$secilen_translate = getTranslation('horan5');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Tek/Çift"){
$secilen_translate = getTranslation('horan6');
} else if($secim_yapimi_kuponguncelle=="Toplam Tek/Çift"){
$secilen_translate = getTranslation('horan7');
}

} else if($row['spor_tip']=="canli") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('fcanlioran1');
} else if($secim_yapimi_kuponguncelle=="Handikap 1:0"){
$secilen_translate = getTranslation('fcanlioran2');
} else if($secim_yapimi_kuponguncelle=="Handikap 2:0"){
$secilen_translate = getTranslation('fcanlioran3');
} else if($secim_yapimi_kuponguncelle=="Handikap 0:1"){
$secilen_translate = getTranslation('fcanlioran4');
} else if($secim_yapimi_kuponguncelle=="Handikap 0:2"){
$secilen_translate = getTranslation('fcanlioran5');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('fcanlioran6');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Çifte Şans"){
$secilen_translate = getTranslation('fcanlioran7');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran8');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran9');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran10');
} else if($secim_yapimi_kuponguncelle=="Toplam 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran11');
} else if($secim_yapimi_kuponguncelle=="Toplam 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran12');
} else if($secim_yapimi_kuponguncelle=="Toplam 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran13');
} else if($secim_yapimi_kuponguncelle=="Toplam 3.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran14');
} else if($secim_yapimi_kuponguncelle=="Toplam 4.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran15');
} else if($secim_yapimi_kuponguncelle=="Toplam 5.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran16');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran17');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran18');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran19');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 3.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran20');
} else if($secim_yapimi_kuponguncelle=="Karşılıklı Gol Olurmu ?"){
$secilen_translate = getTranslation('fcanlioran21');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Müsabakada Gol Atarmı ?"){
$secilen_translate = getTranslation('fcanlioran22');
} else if($secim_yapimi_kuponguncelle=="Deplasman Müsabakada Gol Atarmı ?"){
$secilen_translate = getTranslation('fcanlioran23');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Tek / Çift"){
$secilen_translate = getTranslation('fcanlioran24');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Tek / Çift"){
$secilen_translate = getTranslation('fcanlioran25');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Karşılıklı Gol"){
$secilen_translate = getTranslation('fcanlioran26');
} else if($secim_yapimi_kuponguncelle=="Maç Sonucu ve Karşılıklı Gol"){
$secilen_translate = getTranslation('fcanlioran27');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran28');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran29');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran30');
} else if($secim_yapimi_kuponguncelle=="Deplasman 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran31');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran32');
} else if($secim_yapimi_kuponguncelle=="Deplasman 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran33');
} else if($secim_yapimi_kuponguncelle=="Toplam Kaç Gol Atılır ?"){
$secilen_translate = getTranslation('fcanlioran34');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Toplam Kaç Gol Atar ?"){
$secilen_translate = getTranslation('fcanlioran35');
} else if($secim_yapimi_kuponguncelle=="Deplasman Toplam Kaç Gol Atar ?"){
$secilen_translate = getTranslation('fcanlioran36');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Skoru"){
$secilen_translate = getTranslation('fcanlioran37');
} else if($secim_yapimi_kuponguncelle=="Maç Skoru"){
$secilen_translate = getTranslation('fcanlioran38');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran39');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran40');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran41');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran42');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran43');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran44');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi İlk Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran45');
} else if($secim_yapimi_kuponguncelle=="Ev sahibi İkinci Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran46');
} else if($secim_yapimi_kuponguncelle=="Deplasman İlk Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran47');
} else if($secim_yapimi_kuponguncelle=="Deplasman İkinci Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran48');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 1 Gol Farkla Kazanirmi ?"){
$secilen_translate = getTranslation('fcanlioran49');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 2 Gol Farkla Kazanirmi ?"){
$secilen_translate = getTranslation('fcanlioran50');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 3 Gol Farkla Kazanirmi ?"){
$secilen_translate = getTranslation('fcanlioran51');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Sonucu"){
$secilen_translate = getTranslation('fcanlioran52');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Sonucu"){
$secilen_translate = getTranslation('fcanlioran53');
} else if($secim_yapimi_kuponguncelle=="İlk Yarıda Kaç Gol Olur ?"){
$secilen_translate = getTranslation('fcanlioran54');
} else if($secim_yapimi_kuponguncelle=="2.Yarıda Toplam Kaç Gol Olur ?"){
$secilen_translate = getTranslation('fcanlioran55');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-4+)"){
$secilen_translate = getTranslation('fcanlioran56');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-5+)"){
$secilen_translate = getTranslation('fcanlioran57');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-6+)"){
$secilen_translate = getTranslation('fcanlioran58');
} else if($secim_yapimi_kuponguncelle=="1. yarıda 1.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran59');
} else if($secim_yapimi_kuponguncelle=="1.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran60');
} else if($secim_yapimi_kuponguncelle=="2.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran61');
} else if($secim_yapimi_kuponguncelle=="3.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran62');
} else if($secim_yapimi_kuponguncelle=="4.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran63');
} else if($secim_yapimi_kuponguncelle=="5.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran64');
} else if($secim_yapimi_kuponguncelle=="6.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran65');
}

} else if($row['spor_tip']=="canlib") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('bcanlioran1');
} else if($secim_yapimi_kuponguncelle=="1X2(1.YARI)"){
$secilen_translate = getTranslation('bcanlioran2');
} else if($secim_yapimi_kuponguncelle=="1X2(2.YARI)"){
$secilen_translate = getTranslation('bcanlioran3');
} else if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran4');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran5');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran6');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran7');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran8');
} else if($secim_yapimi_kuponguncelle=="Toplam Skor Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran9');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran10');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran11');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran12');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran13');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran14');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran15');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran16');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran17');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran18');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran19');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran20');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran21');
} else if($secim_yapimi_kuponguncelle=="Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran22');
}

} else if($row['spor_tip']=="canlit") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
$secilen_translate = getTranslation('tcanlioran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahisi"){
$secilen_translate = getTranslation('tcanlioran2');
}

} else if($row['spor_tip']=="canliv") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
$secilen_translate = getTranslation('vcanlioran1');
} else if($secim_yapimi_kuponguncelle=="1.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran2');
} else if($secim_yapimi_kuponguncelle=="2.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran3');
} else if($secim_yapimi_kuponguncelle=="3.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran4');
} else if($secim_yapimi_kuponguncelle=="4.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran5');
} else if($secim_yapimi_kuponguncelle=="Set bahisi (5 maç üzerinden)"){
$secilen_translate = getTranslation('vcanlioran6');
} else if($secim_yapimi_kuponguncelle=="Toplam Kaç Set Oynanır ?"){
$secilen_translate = getTranslation('vcanlioran7');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran8');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran9');
} else if($secim_yapimi_kuponguncelle=="1.Takım 1.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran10');
} else if($secim_yapimi_kuponguncelle=="2.Takım 1.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran11');
} else if($secim_yapimi_kuponguncelle=="1.Takım 2.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran12');
} else if($secim_yapimi_kuponguncelle=="2.Takım 2.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran13');
} else if($secim_yapimi_kuponguncelle=="1.Takım 3.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran14');
} else if($secim_yapimi_kuponguncelle=="2.Takım 3.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran15');
} else if($secim_yapimi_kuponguncelle=="1.Takım 4.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran16');
} else if($secim_yapimi_kuponguncelle=="2.Takım 4.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran17');
} else if($secim_yapimi_kuponguncelle=="Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran18');
} else if($secim_yapimi_kuponguncelle=="Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran19');
} else if($secim_yapimi_kuponguncelle=="1.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran20');
} else if($secim_yapimi_kuponguncelle=="2.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran21');
} else if($secim_yapimi_kuponguncelle=="3.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran22');
} else if($secim_yapimi_kuponguncelle=="4.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran23');
} else if($secim_yapimi_kuponguncelle=="Müsabaka 5.Set Sürermi"){
$secilen_translate = getTranslation('vcanlioran24');
}

} else if($row['spor_tip']=="canlibuz") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('buzcanlioran1');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('buzcanlioran2');
} else if($secim_yapimi_kuponguncelle=="Cifte Sans"){
$secilen_translate = getTranslation('buzcanlioran2');
} else if($secim_yapimi_kuponguncelle=="Hangi periyod daha cok gol olur?"){
$secilen_translate = getTranslation('buzcanlioran3');
}

}

if($dil_bilgisi22['language']=='en'){

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "Y";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "N";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "U";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "O";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 and O";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 and O";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 and U";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 and U";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 and Y";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 and Y";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 and N";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 and N";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "No Goal";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "X and Y";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "D";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "S";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else if($dil_bilgisi22['language']=='de'){ 

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "J";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "K";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "N";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "T";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 und T";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 und T";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 und N";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 und N";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 und J";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 und J";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 und K";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 und K";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "Kein Ziel";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "X und J";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "P";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "E";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else if($dil_bilgisi22['language']=='ar'){ 

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "أجل";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "لا";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "أدنى";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "أعلى";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 وما فوق";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 وما فوق";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 و السفلى";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 و السفلى";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 و نعم";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 و نعم";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 و لا";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 و لا";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "لا هدف";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "س ونعم";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "زوجان";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "واحد";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else if($dil_bilgisi22['language']=='ru'){ 

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "да";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "нет";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "ниже";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "топ";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 и выше";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 и выше";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 и ниже";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 и ниже";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 и да";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 и да";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 и нет";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 и нет";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "Нет цели";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "Х и да";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "пара";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "один";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

?>
<div style="display:table;">
<div class="kupno" style="width: 45px;"><?=$row['mac_kodu']; ?></div>
<div class="takimlar"><?=$row['ev_takim'];?> - <?=$row['konuk_takim'];?></div>
<div class="saat"><? if($row['spor_tip']!="canli" || $row['spor_tip']!="canlibasket") { ?><?=date("d.m H:i",$row['mac_time']); ?><? } ?></div>
</div>
<div style="display:table;">
<div class="tahmin" style="width: 192px;"><?=$secilen_translate;?> : <?=$secilen_translate2;?> <? if(!empty($row['oran_val'])) { echo "($row[oran_val])"; } ?> </div>
<div class="oranlar"><?=nf($row['oran']); ?></div>
</div>
<? } ?>

</div>
<div class="oynayan">
<div style="display:table;">
<div class="topkolon"><?=getTranslation('printkupon5')?></div>
<div class="topkolonb"><?=nf($kupon['oran']); ?></div>
</div>
<? if($ubsi['kesinti_goster']==1){ ?>
<div style="display:table;">
<div class="oyuncuname">5% <?=getTranslation('printkupon6')?>:</div>
<div class="oyuncunamea">
<? 
if(!empty($ubsi['kazananyuzde'])) { $yuzdesi = yuzdele($ubsi['kazananyuzde']); 
$kesinti = $kupon['tutar']*$yuzdesi;
$gercektutar = $kupon['tutar']-$kesinti;
} else {
$gercektutar = $kupon['tutar'];	
}
echo nf($gercektutar); 
?> <?=getTranslation('parabirimi')?>
</div>
</div>
<? } ?>
</div>
<div class="toplam">
<div style="display:table;">
<div class="toplama"><?=getTranslation('printkupon7')?></div>
<div class="toplamtutar"><?=nf($kupon['yatan']); ?> <?=getTranslation('parabirimi')?></div>
</div>
<div style="display:table;">
<div class="maxkazanc"><?=getTranslation('printkupon8')?>:</div>
<div class="maxkazanctutar"><?=nf($kupon['tutar']); ?> <?=getTranslation('parabirimi')?></div>
</div>
</div>
<div class="serino">
||||| 672954D6-2954-CA295436 |||||
</div>
<div class="barkod">
<?=$ubsi['ciktimesaj']; ?> </div>
<div class="barkod">
</div>
</div>
<? } else if($ub['yazici_tip']=="8") { ?>
<link rel="stylesheet" type="text/css" media="screen, print" href="/players/img/print/ticket/8/init.css"/>
<link rel="stylesheet" type="text/css" media="screen, print" href="/players/img/print/ticket/8/print.css"/>
</head>
<body>
<div class="coupon">
<div class="coupon_box">
<div class="system">
<span><?=getTranslation('printkupon3')?></span> <span><?=date("d-m-Y H:i",$kupon['kupon_time']); ?></span>
</div>

<?
$sor = sed_sql_query("select * from kupon_ic where kupon_id='$id'");
while($row=sed_sql_fetcharray($sor)) { 
$ob = explode("|",$row['oran_tip']);

$secim_yapimi_kuponguncelle = $ob[0];
$secim_yapimi_kuponguncelle2 = $ob[1];

if($row['spor_tip']=="futbol") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('foran1');
} else if($secim_yapimi_kuponguncelle=="Handikap (0:1)"){
$secilen_translate = getTranslation('foran2');
} else if($secim_yapimi_kuponguncelle=="Handikap (1:0)"){
$secilen_translate = getTranslation('foran3');
} else if($secim_yapimi_kuponguncelle=="Handikap (0:2)"){
$secilen_translate = getTranslation('foran4');
} else if($secim_yapimi_kuponguncelle=="Handikap (2:0)"){
$secilen_translate = getTranslation('foran5');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 1.YARI )"){
$secilen_translate = getTranslation('foran6');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 2.YARI )"){
$secilen_translate = getTranslation('foran7');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Çifte Şans"){
$secilen_translate = getTranslation('foran8');
} else if($secim_yapimi_kuponguncelle=="1.YARI KG"){
$secilen_translate = getTranslation('foran9');
} else if($secim_yapimi_kuponguncelle=="Beraberlikte İade"){
$secilen_translate = getTranslation('foran10');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 0.5"){
$secilen_translate = getTranslation('foran11');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran12');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran13');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran14');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 4.5"){
$secilen_translate = getTranslation('foran15');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran16');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 0.5"){
$secilen_translate = getTranslation('foran18');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran19');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran20');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran21');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 0.5"){
$secilen_translate = getTranslation('foran22');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran23');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran24');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran25');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Gol Atarmı ?"){
$secilen_translate = getTranslation('foran26');
} else if($secim_yapimi_kuponguncelle=="Deplasman Gol Atarmı ?"){
$secilen_translate = getTranslation('foran27');
} else if($secim_yapimi_kuponguncelle=="Karşılıklı Gol"){
$secilen_translate = getTranslation('foran28');
} else if($secim_yapimi_kuponguncelle=="​​​​​1.Yarı Tek/Çift"){
$secilen_translate = getTranslation('foran29');
} else if($secim_yapimi_kuponguncelle=="Tek/Çift"){
$secilen_translate = getTranslation('foran30');
} else if($secim_yapimi_kuponguncelle=="Evsahibi Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran31');
} else if($secim_yapimi_kuponguncelle=="Deplasman Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran32');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran33');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 2.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran34');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran35');
} else if($secim_yapimi_kuponguncelle=="Deplasman 2.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran36');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı A/Ü 0.5"){
$secilen_translate = getTranslation('foran37');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı A/Ü 1.5"){
$secilen_translate = getTranslation('foran38');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı A/Ü 0.5"){
$secilen_translate = getTranslation('foran39');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı A/Ü 1.5"){
$secilen_translate = getTranslation('foran40');
} else if($secim_yapimi_kuponguncelle=="Evsahibi A/Ü 1.5"){
$secilen_translate = getTranslation('foran41');
} else if($secim_yapimi_kuponguncelle=="Deplasman A/Ü 1.5"){
$secilen_translate = getTranslation('foran42');
} else if($secim_yapimi_kuponguncelle=="​​​​​Evsahibi Her 2 yarıda Gol Atar ?"){
$secilen_translate = getTranslation('foran43');
} else if($secim_yapimi_kuponguncelle=="Deplasman Her 2 yarıda Gol Atar ?"){
$secilen_translate = getTranslation('foran44');
} else if($secim_yapimi_kuponguncelle=="Hangi Devrede Fazla Gol Olur"){
$secilen_translate = getTranslation('foran45');
} else if($secim_yapimi_kuponguncelle=="Evsahibi Hangi Devrede Fazla Gol Atar ?"){
$secilen_translate = getTranslation('foran46');
} else if($secim_yapimi_kuponguncelle=="Deplasman Hangi Devrede Fazla Gol Atar ?"){
$secilen_translate = getTranslation('foran47');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-4+)"){
$secilen_translate = getTranslation('foran48');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-5+)"){
$secilen_translate = getTranslation('foran49');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-6+)"){
$secilen_translate = getTranslation('foran50');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 1 gol farkla kazanır mı?"){
$secilen_translate = getTranslation('foran51');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 2 gol farkla kazanır mı?"){
$secilen_translate = getTranslation('foran52');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 3 gol farkla kazanır mı?"){
$secilen_translate = getTranslation('foran53');
} else if($secim_yapimi_kuponguncelle=="1X2 ve toplam gol sayısı"){
$secilen_translate = getTranslation('foran54');
} else if($secim_yapimi_kuponguncelle=="Maç sonucu ve karşılıklı goller"){
$secilen_translate = getTranslation('foran55');
} else if($secim_yapimi_kuponguncelle=="İlk Yarı / Maç Sonucu"){
$secilen_translate = getTranslation('foran56');
} else if($secim_yapimi_kuponguncelle=="Skor Bahsi (90 Dakika)"){
$secilen_translate = getTranslation('foran57');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('foran58');
} else if($secim_yapimi_kuponguncelle=="Toplam Sari Kart Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran59');
} else if($secim_yapimi_kuponguncelle=="Kirmizi kart cikar mi?"){
$secilen_translate = getTranslation('foran60');
} else if($secim_yapimi_kuponguncelle=="Macta kac tane penalti olur?"){
$secilen_translate = getTranslation('foran61');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran62');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran63');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran64');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran65');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran66');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran67');
} else if($secim_yapimi_kuponguncelle=="Sarı Kart Toplam Tek/Çift"){
$secilen_translate = getTranslation('foran68');
} else if($secim_yapimi_kuponguncelle=="Hangi Takım Çok Sarı Kart Yer ?"){
$secilen_translate = getTranslation('foran69');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran70');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 6.5"){
$secilen_translate = getTranslation('foran71');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 7.5"){
$secilen_translate = getTranslation('foran72');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 8.5"){
$secilen_translate = getTranslation('foran73');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 9.5"){
$secilen_translate = getTranslation('foran74');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 10.5"){
$secilen_translate = getTranslation('foran75');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 11.5"){
$secilen_translate = getTranslation('foran76');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 12.5"){
$secilen_translate = getTranslation('foran77');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 13.5"){
$secilen_translate = getTranslation('foran78');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 14.5"){
$secilen_translate = getTranslation('foran79');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 15.5"){
$secilen_translate = getTranslation('foran80');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran81');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran82');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 4.5"){
$secilen_translate = getTranslation('foran83');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran84');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 6.5"){
$secilen_translate = getTranslation('foran85');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 7.5"){
$secilen_translate = getTranslation('foran86');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 8.5"){
$secilen_translate = getTranslation('foran87');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 9.5"){
$secilen_translate = getTranslation('foran88');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 10.5"){
$secilen_translate = getTranslation('foran89');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran90');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran91');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 4.5"){
$secilen_translate = getTranslation('foran92');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran93');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 6.5"){
$secilen_translate = getTranslation('foran94');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 7.5"){
$secilen_translate = getTranslation('foran95');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 8.5"){
$secilen_translate = getTranslation('foran96');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 9.5"){
$secilen_translate = getTranslation('foran97');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 10.5"){
$secilen_translate = getTranslation('foran98');
} else if($secim_yapimi_kuponguncelle=="Korner Toplam Tek/Çift"){
$secilen_translate = getTranslation('foran99');
} else if($secim_yapimi_kuponguncelle=="Hangi Takım Çok Korner Kullanır ?"){
$secilen_translate = getTranslation('foran100');
}

} else if($row['spor_tip']=="basketbol") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ?"){
$secilen_translate = getTranslation('boran1');
} else if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('boran2');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 1.YARI )"){
$secilen_translate = getTranslation('boran3');
} else if($secim_yapimi_kuponguncelle=="Toplam Skor Tek/Çift"){
$secilen_translate = getTranslation('boran4');
} else if($secim_yapimi_kuponguncelle=="Toplam Skor Alt/Üst"){
$secilen_translate = getTranslation('boran5');
} else if($secim_yapimi_kuponguncelle=="Handikap ( 1.YARI )"){
$secilen_translate = getTranslation('boran6');
} else if($secim_yapimi_kuponguncelle=="Handikap"){
$secilen_translate = getTranslation('boran7');
} else if($secim_yapimi_kuponguncelle=="1.Yarı / MS"){
$secilen_translate = getTranslation('boran8');
} else if($secim_yapimi_kuponguncelle=="İki Devrede Kazanır"){
$secilen_translate = getTranslation('boran9');
} else if($secim_yapimi_kuponguncelle=="Tüm Periyotları Kazanır"){
$secilen_translate = getTranslation('boran10');
} else if($secim_yapimi_kuponguncelle=="1.Takım İY Alt/Üst"){
$secilen_translate = getTranslation('boran11');
} else if($secim_yapimi_kuponguncelle=="2.Takım İY Alt/Üst"){
$secilen_translate = getTranslation('boran12');
}

}  else if($row['spor_tip']=="tenis") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ?"){
$secilen_translate = getTranslation('toran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahsi"){
$secilen_translate = getTranslation('toran2');
} else if($secim_yapimi_kuponguncelle=="1.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('toran3');
} else if($secim_yapimi_kuponguncelle=="2.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('toran4');
} else if($secim_yapimi_kuponguncelle=="1.Oyuncu 1 Set Kazanır"){
$secilen_translate = getTranslation('toran5');
} else if($secim_yapimi_kuponguncelle=="2.Oyuncu 1 Set Kazanır"){
$secilen_translate = getTranslation('toran6');
}

} else if($row['spor_tip']=="voleybol") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ?"){
$secilen_translate = getTranslation('voran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahsi"){
$secilen_translate = getTranslation('voran2');
} else if($secim_yapimi_kuponguncelle=="Toplam Alt/Üst"){
$secilen_translate = getTranslation('voran3');
} else if($secim_yapimi_kuponguncelle=="5 Set Sürermi ?"){
$secilen_translate = getTranslation('voran4');
}

} else if($row['spor_tip']=="buzhokeyi") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('buzoran1');
} else if($secim_yapimi_kuponguncelle=="1.P 1X2"){
$secilen_translate = getTranslation('buzoran2');
} else if($secim_yapimi_kuponguncelle=="2.P 1X2"){
$secilen_translate = getTranslation('buzoran3');
} else if($secim_yapimi_kuponguncelle=="3.P 1X2"){
$secilen_translate = getTranslation('buzoran4');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('buzoran5');
} else if($secim_yapimi_kuponguncelle=="1.P Çifte Şans"){
$secilen_translate = getTranslation('buzoran6');
} else if($secim_yapimi_kuponguncelle=="2.P Çifte Şans"){
$secilen_translate = getTranslation('buzoran7');
} else if($secim_yapimi_kuponguncelle=="3.P Çifte Şans"){
$secilen_translate = getTranslation('buzoran8');
}

} else if($row['spor_tip']=="hentbol") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('horan1');
} else if($secim_yapimi_kuponguncelle=="Toplam Alt/Üst"){
$secilen_translate = getTranslation('horan2');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 1.YARI )"){
$secilen_translate = getTranslation('horan3');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Alt/Üst"){
$secilen_translate = getTranslation('horan4');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Tek/Çift"){
$secilen_translate = getTranslation('horan5');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Tek/Çift"){
$secilen_translate = getTranslation('horan6');
} else if($secim_yapimi_kuponguncelle=="Toplam Tek/Çift"){
$secilen_translate = getTranslation('horan7');
}

} else if($row['spor_tip']=="canli") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('fcanlioran1');
} else if($secim_yapimi_kuponguncelle=="Handikap 1:0"){
$secilen_translate = getTranslation('fcanlioran2');
} else if($secim_yapimi_kuponguncelle=="Handikap 2:0"){
$secilen_translate = getTranslation('fcanlioran3');
} else if($secim_yapimi_kuponguncelle=="Handikap 0:1"){
$secilen_translate = getTranslation('fcanlioran4');
} else if($secim_yapimi_kuponguncelle=="Handikap 0:2"){
$secilen_translate = getTranslation('fcanlioran5');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('fcanlioran6');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Çifte Şans"){
$secilen_translate = getTranslation('fcanlioran7');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran8');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran9');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran10');
} else if($secim_yapimi_kuponguncelle=="Toplam 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran11');
} else if($secim_yapimi_kuponguncelle=="Toplam 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran12');
} else if($secim_yapimi_kuponguncelle=="Toplam 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran13');
} else if($secim_yapimi_kuponguncelle=="Toplam 3.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran14');
} else if($secim_yapimi_kuponguncelle=="Toplam 4.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran15');
} else if($secim_yapimi_kuponguncelle=="Toplam 5.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran16');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran17');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran18');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran19');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 3.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran20');
} else if($secim_yapimi_kuponguncelle=="Karşılıklı Gol Olurmu ?"){
$secilen_translate = getTranslation('fcanlioran21');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Müsabakada Gol Atarmı ?"){
$secilen_translate = getTranslation('fcanlioran22');
} else if($secim_yapimi_kuponguncelle=="Deplasman Müsabakada Gol Atarmı ?"){
$secilen_translate = getTranslation('fcanlioran23');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Tek / Çift"){
$secilen_translate = getTranslation('fcanlioran24');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Tek / Çift"){
$secilen_translate = getTranslation('fcanlioran25');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Karşılıklı Gol"){
$secilen_translate = getTranslation('fcanlioran26');
} else if($secim_yapimi_kuponguncelle=="Maç Sonucu ve Karşılıklı Gol"){
$secilen_translate = getTranslation('fcanlioran27');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran28');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran29');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran30');
} else if($secim_yapimi_kuponguncelle=="Deplasman 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran31');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran32');
} else if($secim_yapimi_kuponguncelle=="Deplasman 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran33');
} else if($secim_yapimi_kuponguncelle=="Toplam Kaç Gol Atılır ?"){
$secilen_translate = getTranslation('fcanlioran34');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Toplam Kaç Gol Atar ?"){
$secilen_translate = getTranslation('fcanlioran35');
} else if($secim_yapimi_kuponguncelle=="Deplasman Toplam Kaç Gol Atar ?"){
$secilen_translate = getTranslation('fcanlioran36');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Skoru"){
$secilen_translate = getTranslation('fcanlioran37');
} else if($secim_yapimi_kuponguncelle=="Maç Skoru"){
$secilen_translate = getTranslation('fcanlioran38');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran39');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran40');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran41');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran42');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran43');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran44');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi İlk Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran45');
} else if($secim_yapimi_kuponguncelle=="Ev sahibi İkinci Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran46');
} else if($secim_yapimi_kuponguncelle=="Deplasman İlk Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran47');
} else if($secim_yapimi_kuponguncelle=="Deplasman İkinci Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran48');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 1 Gol Farkla Kazanirmi ?"){
$secilen_translate = getTranslation('fcanlioran49');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 2 Gol Farkla Kazanirmi ?"){
$secilen_translate = getTranslation('fcanlioran50');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 3 Gol Farkla Kazanirmi ?"){
$secilen_translate = getTranslation('fcanlioran51');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Sonucu"){
$secilen_translate = getTranslation('fcanlioran52');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Sonucu"){
$secilen_translate = getTranslation('fcanlioran53');
} else if($secim_yapimi_kuponguncelle=="İlk Yarıda Kaç Gol Olur ?"){
$secilen_translate = getTranslation('fcanlioran54');
} else if($secim_yapimi_kuponguncelle=="2.Yarıda Toplam Kaç Gol Olur ?"){
$secilen_translate = getTranslation('fcanlioran55');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-4+)"){
$secilen_translate = getTranslation('fcanlioran56');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-5+)"){
$secilen_translate = getTranslation('fcanlioran57');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-6+)"){
$secilen_translate = getTranslation('fcanlioran58');
} else if($secim_yapimi_kuponguncelle=="1. yarıda 1.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran59');
} else if($secim_yapimi_kuponguncelle=="1.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran60');
} else if($secim_yapimi_kuponguncelle=="2.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran61');
} else if($secim_yapimi_kuponguncelle=="3.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran62');
} else if($secim_yapimi_kuponguncelle=="4.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran63');
} else if($secim_yapimi_kuponguncelle=="5.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran64');
} else if($secim_yapimi_kuponguncelle=="6.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran65');
}

} else if($row['spor_tip']=="canlib") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('bcanlioran1');
} else if($secim_yapimi_kuponguncelle=="1X2(1.YARI)"){
$secilen_translate = getTranslation('bcanlioran2');
} else if($secim_yapimi_kuponguncelle=="1X2(2.YARI)"){
$secilen_translate = getTranslation('bcanlioran3');
} else if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran4');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran5');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran6');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran7');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran8');
} else if($secim_yapimi_kuponguncelle=="Toplam Skor Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran9');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran10');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran11');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran12');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran13');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran14');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran15');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran16');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran17');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran18');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran19');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran20');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran21');
} else if($secim_yapimi_kuponguncelle=="Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran22');
}

} else if($row['spor_tip']=="canlit") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
$secilen_translate = getTranslation('tcanlioran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahisi"){
$secilen_translate = getTranslation('tcanlioran2');
}

} else if($row['spor_tip']=="canliv") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
$secilen_translate = getTranslation('vcanlioran1');
} else if($secim_yapimi_kuponguncelle=="1.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran2');
} else if($secim_yapimi_kuponguncelle=="2.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran3');
} else if($secim_yapimi_kuponguncelle=="3.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran4');
} else if($secim_yapimi_kuponguncelle=="4.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran5');
} else if($secim_yapimi_kuponguncelle=="Set bahisi (5 maç üzerinden)"){
$secilen_translate = getTranslation('vcanlioran6');
} else if($secim_yapimi_kuponguncelle=="Toplam Kaç Set Oynanır ?"){
$secilen_translate = getTranslation('vcanlioran7');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran8');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran9');
} else if($secim_yapimi_kuponguncelle=="1.Takım 1.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran10');
} else if($secim_yapimi_kuponguncelle=="2.Takım 1.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran11');
} else if($secim_yapimi_kuponguncelle=="1.Takım 2.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran12');
} else if($secim_yapimi_kuponguncelle=="2.Takım 2.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran13');
} else if($secim_yapimi_kuponguncelle=="1.Takım 3.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran14');
} else if($secim_yapimi_kuponguncelle=="2.Takım 3.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran15');
} else if($secim_yapimi_kuponguncelle=="1.Takım 4.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran16');
} else if($secim_yapimi_kuponguncelle=="2.Takım 4.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran17');
} else if($secim_yapimi_kuponguncelle=="Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran18');
} else if($secim_yapimi_kuponguncelle=="Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran19');
} else if($secim_yapimi_kuponguncelle=="1.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran20');
} else if($secim_yapimi_kuponguncelle=="2.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran21');
} else if($secim_yapimi_kuponguncelle=="3.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran22');
} else if($secim_yapimi_kuponguncelle=="4.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran23');
} else if($secim_yapimi_kuponguncelle=="Müsabaka 5.Set Sürermi"){
$secilen_translate = getTranslation('vcanlioran24');
}

} else if($row['spor_tip']=="canlibuz") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('buzcanlioran1');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('buzcanlioran2');
} else if($secim_yapimi_kuponguncelle=="Cifte Sans"){
$secilen_translate = getTranslation('buzcanlioran2');
} else if($secim_yapimi_kuponguncelle=="Hangi periyod daha cok gol olur?"){
$secilen_translate = getTranslation('buzcanlioran3');
}

}

if($dil_bilgisi22['language']=='en'){

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "Y";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "N";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "U";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "O";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 and O";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 and O";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 and U";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 and U";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 and Y";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 and Y";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 and N";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 and N";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "No Goal";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "X and Y";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "D";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "S";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else if($dil_bilgisi22['language']=='de'){ 

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "J";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "K";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "N";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "T";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 und T";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 und T";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 und N";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 und N";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 und J";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 und J";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 und K";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 und K";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "Kein Ziel";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "X und J";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "P";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "E";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else if($dil_bilgisi22['language']=='ar'){ 

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "أجل";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "لا";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "أدنى";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "أعلى";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 وما فوق";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 وما فوق";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 و السفلى";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 و السفلى";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 و نعم";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 و نعم";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 و لا";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 و لا";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "لا هدف";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "س ونعم";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "زوجان";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "واحد";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else if($dil_bilgisi22['language']=='ru'){ 

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "да";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "нет";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "ниже";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "топ";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 и выше";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 и выше";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 и ниже";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 и ниже";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 и да";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 и да";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 и нет";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 и нет";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "Нет цели";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "Х и да";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "пара";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "один";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

?>
<h3 class="match">
<span class="number"><?=$row['mac_kodu']; ?></span> <?=$row['ev_takim'];?> - <?=$row['konuk_takim'];?>  <span class="label"><? if($row['spor_tip']!="canli" || $row['spor_tip']!="canlibasket") { ?><?=date("d-m H:i",$row['mac_time']); ?><? } ?></span>
</h3>
<p class="bet">
<span><?=$secilen_translate;?> : <span class="rate"><?=$secilen_translate2;?> <? if(!empty($row['oran_val'])) { echo "($row[oran_val])"; } ?> </span></span>
<span class="label"><?=nf($row['oran']); ?></span>
</p>
<? } ?>

</div>
<div class="coupon_box win_box">
<p class="bet"><span><?=getTranslation('printkupon4')?></span>
<span class="label"><?=$kupon['id']; ?></span>
</p>
<p class="bet"><span><?=getTranslation('printkupon9')?></span>
<span class="label"><?=nf($kupon['oran']); ?></span>
</p>
<p class="bet"><span><?=getTranslation('printkupon7')?></span>
<span class="label"><?=nf($kupon['yatan']); ?> <?=getTranslation('parabirimi')?></span>
</p>
<? if($ubsi['kesinti_goster']==1){ ?>
<p class="bet"><span>5% <?=getTranslation('printkupon6')?></span>
<span class="label"><? 
if(!empty($ubsi['kazananyuzde'])) { $yuzdesi = yuzdele($ubsi['kazananyuzde']); 
$kesinti = $kupon['tutar']*$yuzdesi;
$gercektutar = $kupon['tutar']-$kesinti;
} else {
$gercektutar = $kupon['tutar'];	
}
echo nf($gercektutar); 
?> <?=getTranslation('parabirimi')?></span>
</p>
<? } ?>
<p class="bet match"><span><?=getTranslation('printkupon8')?></span> <span class="label"><?=nf($kupon['tutar']); ?> <?=getTranslation('parabirimi')?></span></p>
</div>
</div>
<? } else if($ub['yazici_tip']=="7") { ?>
<style type="text/css">.f10{font-size:10px;}.f12{font-size:12px;}.bor{border:1px inset #000;}.ayrac{margin:2px;border-top:2px solid #000;}.c{text-align:center;}.b{font-weight:bold;}.fl{float:left;}.fr{float:right;}.code{float:left;margin-right:3px;}.bet{float:left;}.rate{float:right;}</style>
<div class="f12" style="width:230px;">
<div class="c f12 b"><div class="bet"><img src="/players/img/print/ticket/7/spid_1.png"></div><?=getTranslation('printkupon3')?> (<?=$kupon['id']; ?>) <div class="rate"><img src="/players/img/print/ticket/7/spid_1.png"></div><br> <?=getTranslation('printkupon10')?> :<?=date("d-m-Y H:i",$kupon['kupon_time']); ?></div>
<div class="ayrac"></div>

<?
$sor = sed_sql_query("select * from kupon_ic where kupon_id='$id'");
while($row=sed_sql_fetcharray($sor)) { 
$ob = explode("|",$row['oran_tip']);

$secim_yapimi_kuponguncelle = $ob[0];
$secim_yapimi_kuponguncelle2 = $ob[1];

if($row['spor_tip']=="futbol") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('foran1');
} else if($secim_yapimi_kuponguncelle=="Handikap (0:1)"){
$secilen_translate = getTranslation('foran2');
} else if($secim_yapimi_kuponguncelle=="Handikap (1:0)"){
$secilen_translate = getTranslation('foran3');
} else if($secim_yapimi_kuponguncelle=="Handikap (0:2)"){
$secilen_translate = getTranslation('foran4');
} else if($secim_yapimi_kuponguncelle=="Handikap (2:0)"){
$secilen_translate = getTranslation('foran5');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 1.YARI )"){
$secilen_translate = getTranslation('foran6');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 2.YARI )"){
$secilen_translate = getTranslation('foran7');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Çifte Şans"){
$secilen_translate = getTranslation('foran8');
} else if($secim_yapimi_kuponguncelle=="1.YARI KG"){
$secilen_translate = getTranslation('foran9');
} else if($secim_yapimi_kuponguncelle=="Beraberlikte İade"){
$secilen_translate = getTranslation('foran10');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 0.5"){
$secilen_translate = getTranslation('foran11');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran12');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran13');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran14');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 4.5"){
$secilen_translate = getTranslation('foran15');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran16');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 0.5"){
$secilen_translate = getTranslation('foran18');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran19');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran20');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran21');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 0.5"){
$secilen_translate = getTranslation('foran22');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran23');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran24');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran25');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Gol Atarmı ?"){
$secilen_translate = getTranslation('foran26');
} else if($secim_yapimi_kuponguncelle=="Deplasman Gol Atarmı ?"){
$secilen_translate = getTranslation('foran27');
} else if($secim_yapimi_kuponguncelle=="Karşılıklı Gol"){
$secilen_translate = getTranslation('foran28');
} else if($secim_yapimi_kuponguncelle=="​​​​​1.Yarı Tek/Çift"){
$secilen_translate = getTranslation('foran29');
} else if($secim_yapimi_kuponguncelle=="Tek/Çift"){
$secilen_translate = getTranslation('foran30');
} else if($secim_yapimi_kuponguncelle=="Evsahibi Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran31');
} else if($secim_yapimi_kuponguncelle=="Deplasman Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran32');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran33');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 2.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran34');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran35');
} else if($secim_yapimi_kuponguncelle=="Deplasman 2.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran36');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı A/Ü 0.5"){
$secilen_translate = getTranslation('foran37');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı A/Ü 1.5"){
$secilen_translate = getTranslation('foran38');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı A/Ü 0.5"){
$secilen_translate = getTranslation('foran39');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı A/Ü 1.5"){
$secilen_translate = getTranslation('foran40');
} else if($secim_yapimi_kuponguncelle=="Evsahibi A/Ü 1.5"){
$secilen_translate = getTranslation('foran41');
} else if($secim_yapimi_kuponguncelle=="Deplasman A/Ü 1.5"){
$secilen_translate = getTranslation('foran42');
} else if($secim_yapimi_kuponguncelle=="​​​​​Evsahibi Her 2 yarıda Gol Atar ?"){
$secilen_translate = getTranslation('foran43');
} else if($secim_yapimi_kuponguncelle=="Deplasman Her 2 yarıda Gol Atar ?"){
$secilen_translate = getTranslation('foran44');
} else if($secim_yapimi_kuponguncelle=="Hangi Devrede Fazla Gol Olur"){
$secilen_translate = getTranslation('foran45');
} else if($secim_yapimi_kuponguncelle=="Evsahibi Hangi Devrede Fazla Gol Atar ?"){
$secilen_translate = getTranslation('foran46');
} else if($secim_yapimi_kuponguncelle=="Deplasman Hangi Devrede Fazla Gol Atar ?"){
$secilen_translate = getTranslation('foran47');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-4+)"){
$secilen_translate = getTranslation('foran48');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-5+)"){
$secilen_translate = getTranslation('foran49');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-6+)"){
$secilen_translate = getTranslation('foran50');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 1 gol farkla kazanır mı?"){
$secilen_translate = getTranslation('foran51');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 2 gol farkla kazanır mı?"){
$secilen_translate = getTranslation('foran52');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 3 gol farkla kazanır mı?"){
$secilen_translate = getTranslation('foran53');
} else if($secim_yapimi_kuponguncelle=="1X2 ve toplam gol sayısı"){
$secilen_translate = getTranslation('foran54');
} else if($secim_yapimi_kuponguncelle=="Maç sonucu ve karşılıklı goller"){
$secilen_translate = getTranslation('foran55');
} else if($secim_yapimi_kuponguncelle=="İlk Yarı / Maç Sonucu"){
$secilen_translate = getTranslation('foran56');
} else if($secim_yapimi_kuponguncelle=="Skor Bahsi (90 Dakika)"){
$secilen_translate = getTranslation('foran57');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('foran58');
} else if($secim_yapimi_kuponguncelle=="Toplam Sari Kart Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran59');
} else if($secim_yapimi_kuponguncelle=="Kirmizi kart cikar mi?"){
$secilen_translate = getTranslation('foran60');
} else if($secim_yapimi_kuponguncelle=="Macta kac tane penalti olur?"){
$secilen_translate = getTranslation('foran61');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran62');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran63');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran64');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran65');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran66');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran67');
} else if($secim_yapimi_kuponguncelle=="Sarı Kart Toplam Tek/Çift"){
$secilen_translate = getTranslation('foran68');
} else if($secim_yapimi_kuponguncelle=="Hangi Takım Çok Sarı Kart Yer ?"){
$secilen_translate = getTranslation('foran69');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran70');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 6.5"){
$secilen_translate = getTranslation('foran71');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 7.5"){
$secilen_translate = getTranslation('foran72');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 8.5"){
$secilen_translate = getTranslation('foran73');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 9.5"){
$secilen_translate = getTranslation('foran74');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 10.5"){
$secilen_translate = getTranslation('foran75');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 11.5"){
$secilen_translate = getTranslation('foran76');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 12.5"){
$secilen_translate = getTranslation('foran77');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 13.5"){
$secilen_translate = getTranslation('foran78');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 14.5"){
$secilen_translate = getTranslation('foran79');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 15.5"){
$secilen_translate = getTranslation('foran80');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran81');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran82');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 4.5"){
$secilen_translate = getTranslation('foran83');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran84');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 6.5"){
$secilen_translate = getTranslation('foran85');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 7.5"){
$secilen_translate = getTranslation('foran86');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 8.5"){
$secilen_translate = getTranslation('foran87');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 9.5"){
$secilen_translate = getTranslation('foran88');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 10.5"){
$secilen_translate = getTranslation('foran89');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran90');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran91');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 4.5"){
$secilen_translate = getTranslation('foran92');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran93');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 6.5"){
$secilen_translate = getTranslation('foran94');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 7.5"){
$secilen_translate = getTranslation('foran95');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 8.5"){
$secilen_translate = getTranslation('foran96');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 9.5"){
$secilen_translate = getTranslation('foran97');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 10.5"){
$secilen_translate = getTranslation('foran98');
} else if($secim_yapimi_kuponguncelle=="Korner Toplam Tek/Çift"){
$secilen_translate = getTranslation('foran99');
} else if($secim_yapimi_kuponguncelle=="Hangi Takım Çok Korner Kullanır ?"){
$secilen_translate = getTranslation('foran100');
}

} else if($row['spor_tip']=="basketbol") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ?"){
$secilen_translate = getTranslation('boran1');
} else if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('boran2');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 1.YARI )"){
$secilen_translate = getTranslation('boran3');
} else if($secim_yapimi_kuponguncelle=="Toplam Skor Tek/Çift"){
$secilen_translate = getTranslation('boran4');
} else if($secim_yapimi_kuponguncelle=="Toplam Skor Alt/Üst"){
$secilen_translate = getTranslation('boran5');
} else if($secim_yapimi_kuponguncelle=="Handikap ( 1.YARI )"){
$secilen_translate = getTranslation('boran6');
} else if($secim_yapimi_kuponguncelle=="Handikap"){
$secilen_translate = getTranslation('boran7');
} else if($secim_yapimi_kuponguncelle=="1.Yarı / MS"){
$secilen_translate = getTranslation('boran8');
} else if($secim_yapimi_kuponguncelle=="İki Devrede Kazanır"){
$secilen_translate = getTranslation('boran9');
} else if($secim_yapimi_kuponguncelle=="Tüm Periyotları Kazanır"){
$secilen_translate = getTranslation('boran10');
} else if($secim_yapimi_kuponguncelle=="1.Takım İY Alt/Üst"){
$secilen_translate = getTranslation('boran11');
} else if($secim_yapimi_kuponguncelle=="2.Takım İY Alt/Üst"){
$secilen_translate = getTranslation('boran12');
}

}  else if($row['spor_tip']=="tenis") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ?"){
$secilen_translate = getTranslation('toran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahsi"){
$secilen_translate = getTranslation('toran2');
} else if($secim_yapimi_kuponguncelle=="1.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('toran3');
} else if($secim_yapimi_kuponguncelle=="2.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('toran4');
} else if($secim_yapimi_kuponguncelle=="1.Oyuncu 1 Set Kazanır"){
$secilen_translate = getTranslation('toran5');
} else if($secim_yapimi_kuponguncelle=="2.Oyuncu 1 Set Kazanır"){
$secilen_translate = getTranslation('toran6');
}

} else if($row['spor_tip']=="voleybol") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ?"){
$secilen_translate = getTranslation('voran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahsi"){
$secilen_translate = getTranslation('voran2');
} else if($secim_yapimi_kuponguncelle=="Toplam Alt/Üst"){
$secilen_translate = getTranslation('voran3');
} else if($secim_yapimi_kuponguncelle=="5 Set Sürermi ?"){
$secilen_translate = getTranslation('voran4');
}

} else if($row['spor_tip']=="buzhokeyi") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('buzoran1');
} else if($secim_yapimi_kuponguncelle=="1.P 1X2"){
$secilen_translate = getTranslation('buzoran2');
} else if($secim_yapimi_kuponguncelle=="2.P 1X2"){
$secilen_translate = getTranslation('buzoran3');
} else if($secim_yapimi_kuponguncelle=="3.P 1X2"){
$secilen_translate = getTranslation('buzoran4');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('buzoran5');
} else if($secim_yapimi_kuponguncelle=="1.P Çifte Şans"){
$secilen_translate = getTranslation('buzoran6');
} else if($secim_yapimi_kuponguncelle=="2.P Çifte Şans"){
$secilen_translate = getTranslation('buzoran7');
} else if($secim_yapimi_kuponguncelle=="3.P Çifte Şans"){
$secilen_translate = getTranslation('buzoran8');
}

} else if($row['spor_tip']=="hentbol") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('horan1');
} else if($secim_yapimi_kuponguncelle=="Toplam Alt/Üst"){
$secilen_translate = getTranslation('horan2');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 1.YARI )"){
$secilen_translate = getTranslation('horan3');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Alt/Üst"){
$secilen_translate = getTranslation('horan4');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Tek/Çift"){
$secilen_translate = getTranslation('horan5');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Tek/Çift"){
$secilen_translate = getTranslation('horan6');
} else if($secim_yapimi_kuponguncelle=="Toplam Tek/Çift"){
$secilen_translate = getTranslation('horan7');
}

} else if($row['spor_tip']=="canli") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('fcanlioran1');
} else if($secim_yapimi_kuponguncelle=="Handikap 1:0"){
$secilen_translate = getTranslation('fcanlioran2');
} else if($secim_yapimi_kuponguncelle=="Handikap 2:0"){
$secilen_translate = getTranslation('fcanlioran3');
} else if($secim_yapimi_kuponguncelle=="Handikap 0:1"){
$secilen_translate = getTranslation('fcanlioran4');
} else if($secim_yapimi_kuponguncelle=="Handikap 0:2"){
$secilen_translate = getTranslation('fcanlioran5');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('fcanlioran6');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Çifte Şans"){
$secilen_translate = getTranslation('fcanlioran7');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran8');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran9');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran10');
} else if($secim_yapimi_kuponguncelle=="Toplam 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran11');
} else if($secim_yapimi_kuponguncelle=="Toplam 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran12');
} else if($secim_yapimi_kuponguncelle=="Toplam 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran13');
} else if($secim_yapimi_kuponguncelle=="Toplam 3.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran14');
} else if($secim_yapimi_kuponguncelle=="Toplam 4.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran15');
} else if($secim_yapimi_kuponguncelle=="Toplam 5.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran16');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran17');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran18');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran19');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 3.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran20');
} else if($secim_yapimi_kuponguncelle=="Karşılıklı Gol Olurmu ?"){
$secilen_translate = getTranslation('fcanlioran21');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Müsabakada Gol Atarmı ?"){
$secilen_translate = getTranslation('fcanlioran22');
} else if($secim_yapimi_kuponguncelle=="Deplasman Müsabakada Gol Atarmı ?"){
$secilen_translate = getTranslation('fcanlioran23');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Tek / Çift"){
$secilen_translate = getTranslation('fcanlioran24');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Tek / Çift"){
$secilen_translate = getTranslation('fcanlioran25');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Karşılıklı Gol"){
$secilen_translate = getTranslation('fcanlioran26');
} else if($secim_yapimi_kuponguncelle=="Maç Sonucu ve Karşılıklı Gol"){
$secilen_translate = getTranslation('fcanlioran27');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran28');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran29');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran30');
} else if($secim_yapimi_kuponguncelle=="Deplasman 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran31');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran32');
} else if($secim_yapimi_kuponguncelle=="Deplasman 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran33');
} else if($secim_yapimi_kuponguncelle=="Toplam Kaç Gol Atılır ?"){
$secilen_translate = getTranslation('fcanlioran34');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Toplam Kaç Gol Atar ?"){
$secilen_translate = getTranslation('fcanlioran35');
} else if($secim_yapimi_kuponguncelle=="Deplasman Toplam Kaç Gol Atar ?"){
$secilen_translate = getTranslation('fcanlioran36');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Skoru"){
$secilen_translate = getTranslation('fcanlioran37');
} else if($secim_yapimi_kuponguncelle=="Maç Skoru"){
$secilen_translate = getTranslation('fcanlioran38');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran39');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran40');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran41');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran42');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran43');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran44');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi İlk Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran45');
} else if($secim_yapimi_kuponguncelle=="Ev sahibi İkinci Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran46');
} else if($secim_yapimi_kuponguncelle=="Deplasman İlk Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran47');
} else if($secim_yapimi_kuponguncelle=="Deplasman İkinci Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran48');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 1 Gol Farkla Kazanirmi ?"){
$secilen_translate = getTranslation('fcanlioran49');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 2 Gol Farkla Kazanirmi ?"){
$secilen_translate = getTranslation('fcanlioran50');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 3 Gol Farkla Kazanirmi ?"){
$secilen_translate = getTranslation('fcanlioran51');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Sonucu"){
$secilen_translate = getTranslation('fcanlioran52');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Sonucu"){
$secilen_translate = getTranslation('fcanlioran53');
} else if($secim_yapimi_kuponguncelle=="İlk Yarıda Kaç Gol Olur ?"){
$secilen_translate = getTranslation('fcanlioran54');
} else if($secim_yapimi_kuponguncelle=="2.Yarıda Toplam Kaç Gol Olur ?"){
$secilen_translate = getTranslation('fcanlioran55');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-4+)"){
$secilen_translate = getTranslation('fcanlioran56');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-5+)"){
$secilen_translate = getTranslation('fcanlioran57');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-6+)"){
$secilen_translate = getTranslation('fcanlioran58');
} else if($secim_yapimi_kuponguncelle=="1. yarıda 1.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran59');
} else if($secim_yapimi_kuponguncelle=="1.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran60');
} else if($secim_yapimi_kuponguncelle=="2.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran61');
} else if($secim_yapimi_kuponguncelle=="3.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran62');
} else if($secim_yapimi_kuponguncelle=="4.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran63');
} else if($secim_yapimi_kuponguncelle=="5.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran64');
} else if($secim_yapimi_kuponguncelle=="6.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran65');
}

} else if($row['spor_tip']=="canlib") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('bcanlioran1');
} else if($secim_yapimi_kuponguncelle=="1X2(1.YARI)"){
$secilen_translate = getTranslation('bcanlioran2');
} else if($secim_yapimi_kuponguncelle=="1X2(2.YARI)"){
$secilen_translate = getTranslation('bcanlioran3');
} else if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran4');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran5');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran6');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran7');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran8');
} else if($secim_yapimi_kuponguncelle=="Toplam Skor Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran9');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran10');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran11');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran12');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran13');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran14');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran15');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran16');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran17');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran18');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran19');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran20');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran21');
} else if($secim_yapimi_kuponguncelle=="Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran22');
}

} else if($row['spor_tip']=="canlit") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
$secilen_translate = getTranslation('tcanlioran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahisi"){
$secilen_translate = getTranslation('tcanlioran2');
}

} else if($row['spor_tip']=="canliv") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
$secilen_translate = getTranslation('vcanlioran1');
} else if($secim_yapimi_kuponguncelle=="1.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran2');
} else if($secim_yapimi_kuponguncelle=="2.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran3');
} else if($secim_yapimi_kuponguncelle=="3.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran4');
} else if($secim_yapimi_kuponguncelle=="4.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran5');
} else if($secim_yapimi_kuponguncelle=="Set bahisi (5 maç üzerinden)"){
$secilen_translate = getTranslation('vcanlioran6');
} else if($secim_yapimi_kuponguncelle=="Toplam Kaç Set Oynanır ?"){
$secilen_translate = getTranslation('vcanlioran7');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran8');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran9');
} else if($secim_yapimi_kuponguncelle=="1.Takım 1.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran10');
} else if($secim_yapimi_kuponguncelle=="2.Takım 1.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran11');
} else if($secim_yapimi_kuponguncelle=="1.Takım 2.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran12');
} else if($secim_yapimi_kuponguncelle=="2.Takım 2.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran13');
} else if($secim_yapimi_kuponguncelle=="1.Takım 3.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran14');
} else if($secim_yapimi_kuponguncelle=="2.Takım 3.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran15');
} else if($secim_yapimi_kuponguncelle=="1.Takım 4.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran16');
} else if($secim_yapimi_kuponguncelle=="2.Takım 4.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran17');
} else if($secim_yapimi_kuponguncelle=="Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran18');
} else if($secim_yapimi_kuponguncelle=="Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran19');
} else if($secim_yapimi_kuponguncelle=="1.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran20');
} else if($secim_yapimi_kuponguncelle=="2.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran21');
} else if($secim_yapimi_kuponguncelle=="3.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran22');
} else if($secim_yapimi_kuponguncelle=="4.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran23');
} else if($secim_yapimi_kuponguncelle=="Müsabaka 5.Set Sürermi"){
$secilen_translate = getTranslation('vcanlioran24');
}

} else if($row['spor_tip']=="canlibuz") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('buzcanlioran1');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('buzcanlioran2');
} else if($secim_yapimi_kuponguncelle=="Cifte Sans"){
$secilen_translate = getTranslation('buzcanlioran2');
} else if($secim_yapimi_kuponguncelle=="Hangi periyod daha cok gol olur?"){
$secilen_translate = getTranslation('buzcanlioran3');
}

}

if($dil_bilgisi22['language']=='en'){

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "Y";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "N";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "U";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "O";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 and O";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 and O";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 and U";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 and U";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 and Y";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 and Y";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 and N";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 and N";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "No Goal";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "X and Y";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "D";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "S";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else if($dil_bilgisi22['language']=='de'){ 

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "J";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "K";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "N";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "T";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 und T";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 und T";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 und N";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 und N";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 und J";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 und J";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 und K";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 und K";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "Kein Ziel";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "X und J";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "P";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "E";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else if($dil_bilgisi22['language']=='ar'){ 

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "أجل";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "لا";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "أدنى";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "أعلى";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 وما فوق";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 وما فوق";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 و السفلى";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 و السفلى";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 و نعم";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 و نعم";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 و لا";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 و لا";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "لا هدف";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "س ونعم";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "زوجان";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "واحد";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else if($dil_bilgisi22['language']=='ru'){ 

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "да";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "нет";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "ниже";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "топ";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 и выше";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 и выше";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 и ниже";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 и ниже";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 и да";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 и да";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 и нет";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 и нет";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "Нет цели";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "Х и да";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "пара";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "один";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

?>

<div class="code"><?=$row['mac_kodu']; ?>-</div>
<div class="bet"><?=$row['ev_takim'];?> - <?=$row['konuk_takim'];?> </div>
<div class="rate"><?=nf($row['oran']); ?></div>
<div style="clear:both;"></div>
<div class="bet"><? if($row['spor_tip']!="canli" || $row['spor_tip']!="canlibasket") { ?><?=date("d-m H:i",$row['mac_time']); ?><? } ?></div>
<div class="rate"><?=$secilen_translate;?> / <?=$secilen_translate2;?> <? if(!empty($row['oran_val'])) { echo "($row[oran_val])"; } ?></div>
<div style="clear:both;"></div>
<div class="ayrac"></div>

<? } ?>

<div class="bet"><?=getTranslation('printkupon5')?>:</div><div class="rate"><?=nf($kupon['oran']); ?></div>
<div style="clear:both;"></div>
<div class="bet"><?=getTranslation('printkupon7')?>:</div><div class="rate"><?=nf($kupon['yatan']); ?> <?=getTranslation('parabirimi')?></div>
<div style="clear:both;"></div>
<? if($ubsi['kesinti_goster']==1){ ?>
<div class="bet">5% <?=getTranslation('printkupon6')?>:</div><div class="rate"><? 
if(!empty($ubsi['kazananyuzde'])) { $yuzdesi = yuzdele($ubsi['kazananyuzde']); 
$kesinti = $kupon['tutar']*$yuzdesi;
$gercektutar = $kupon['tutar']-$kesinti;
} else {
$gercektutar = $kupon['tutar'];	
}
echo nf($gercektutar); 
?> <?=getTranslation('parabirimi')?></div>
<div style="clear:both;"></div>
<? } ?>
<div class="bet"><?=getTranslation('printkupon8')?>:</div><div class="rate"><?=nf($kupon['tutar']); ?> <?=getTranslation('parabirimi')?></div>
<div style="clear:both;"></div>
<div class="ayrac"></div>
<div class="b" style="line-height:15px;text-align: center;font-size: 10pt;"><?=$ubsi['ciktimesaj']; ?></div>
<div class="c b f10"><br></div>
</div>
<? } else if($ub['yazici_tip']=="6") { ?>
<style>body{margin:0px;padding:0px;}</style>
</head>
<body>
<div style='clear:left; color:#707070; float:left; width:285px; font-size:11px; font-family:tahoma; font-weight:bold; margin-bottom:5px;margin-top:10px;'></div>
<div style='clear:left; color:#707070; float:left; width:285px; font-size:11px; font-family:tahoma; margin-bottom:5px;'>
<div style='float:left; width:140px;'><b><?=getTranslation('printkupon4')?> : </b> <?=$kupon['id']; ?> </div>
<div style='float:right; width:145px;'><b><?=getTranslation('printkupon10')?> : </b><?=date("d-m-Y H:i",$kupon['kupon_time']); ?>&nbsp;</div>
</div>


<div style=' width:270px;  height:1px; background:#999; margin:3px 0px; clear:left;'></div>
<div style='clear:left; padding:5px 0px; color:#707070;'>
<div style='float:left; width:25px; font-size:10px; font-family:tahoma; margin-bottom:5px; font-weight:bold;'><?=getTranslation('printkupon11')?></div>
<div style='float:left; width:160px; font-size:10px; font-family:tahoma; margin-bottom:5px; text-align:center;  font-weight:bold;'><?=getTranslation('printkupon12')?> </div>
<div style='float:left; width:40px; font-size:10px; font-family:tahoma; margin-bottom:5px; text-align:center; font-weight:bold;'><?=getTranslation('printkupon13')?> </div>
<div style='float:left; width:40px; font-size:10px; font-family:tahoma; margin-bottom:5px; text-align:center; font-weight:bold;'><?=getTranslation('printkupon9')?> </div>
</div>


<div style=' width:270px;  height:1px; background:#999; margin:5px 0px; clear:left;'></div>

<?
$sor = sed_sql_query("select * from kupon_ic where kupon_id='$id'");
while($row=sed_sql_fetcharray($sor)) { 
$ob = explode("|",$row['oran_tip']);

$secim_yapimi_kuponguncelle = $ob[0];
$secim_yapimi_kuponguncelle2 = $ob[1];

if($row['spor_tip']=="futbol") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('foran1');
} else if($secim_yapimi_kuponguncelle=="Handikap (0:1)"){
$secilen_translate = getTranslation('foran2');
} else if($secim_yapimi_kuponguncelle=="Handikap (1:0)"){
$secilen_translate = getTranslation('foran3');
} else if($secim_yapimi_kuponguncelle=="Handikap (0:2)"){
$secilen_translate = getTranslation('foran4');
} else if($secim_yapimi_kuponguncelle=="Handikap (2:0)"){
$secilen_translate = getTranslation('foran5');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 1.YARI )"){
$secilen_translate = getTranslation('foran6');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 2.YARI )"){
$secilen_translate = getTranslation('foran7');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Çifte Şans"){
$secilen_translate = getTranslation('foran8');
} else if($secim_yapimi_kuponguncelle=="1.YARI KG"){
$secilen_translate = getTranslation('foran9');
} else if($secim_yapimi_kuponguncelle=="Beraberlikte İade"){
$secilen_translate = getTranslation('foran10');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 0.5"){
$secilen_translate = getTranslation('foran11');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran12');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran13');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran14');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 4.5"){
$secilen_translate = getTranslation('foran15');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran16');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 0.5"){
$secilen_translate = getTranslation('foran18');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran19');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran20');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran21');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 0.5"){
$secilen_translate = getTranslation('foran22');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran23');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran24');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran25');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Gol Atarmı ?"){
$secilen_translate = getTranslation('foran26');
} else if($secim_yapimi_kuponguncelle=="Deplasman Gol Atarmı ?"){
$secilen_translate = getTranslation('foran27');
} else if($secim_yapimi_kuponguncelle=="Karşılıklı Gol"){
$secilen_translate = getTranslation('foran28');
} else if($secim_yapimi_kuponguncelle=="​​​​​1.Yarı Tek/Çift"){
$secilen_translate = getTranslation('foran29');
} else if($secim_yapimi_kuponguncelle=="Tek/Çift"){
$secilen_translate = getTranslation('foran30');
} else if($secim_yapimi_kuponguncelle=="Evsahibi Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran31');
} else if($secim_yapimi_kuponguncelle=="Deplasman Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran32');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran33');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 2.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran34');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran35');
} else if($secim_yapimi_kuponguncelle=="Deplasman 2.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran36');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı A/Ü 0.5"){
$secilen_translate = getTranslation('foran37');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı A/Ü 1.5"){
$secilen_translate = getTranslation('foran38');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı A/Ü 0.5"){
$secilen_translate = getTranslation('foran39');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı A/Ü 1.5"){
$secilen_translate = getTranslation('foran40');
} else if($secim_yapimi_kuponguncelle=="Evsahibi A/Ü 1.5"){
$secilen_translate = getTranslation('foran41');
} else if($secim_yapimi_kuponguncelle=="Deplasman A/Ü 1.5"){
$secilen_translate = getTranslation('foran42');
} else if($secim_yapimi_kuponguncelle=="​​​​​Evsahibi Her 2 yarıda Gol Atar ?"){
$secilen_translate = getTranslation('foran43');
} else if($secim_yapimi_kuponguncelle=="Deplasman Her 2 yarıda Gol Atar ?"){
$secilen_translate = getTranslation('foran44');
} else if($secim_yapimi_kuponguncelle=="Hangi Devrede Fazla Gol Olur"){
$secilen_translate = getTranslation('foran45');
} else if($secim_yapimi_kuponguncelle=="Evsahibi Hangi Devrede Fazla Gol Atar ?"){
$secilen_translate = getTranslation('foran46');
} else if($secim_yapimi_kuponguncelle=="Deplasman Hangi Devrede Fazla Gol Atar ?"){
$secilen_translate = getTranslation('foran47');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-4+)"){
$secilen_translate = getTranslation('foran48');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-5+)"){
$secilen_translate = getTranslation('foran49');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-6+)"){
$secilen_translate = getTranslation('foran50');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 1 gol farkla kazanır mı?"){
$secilen_translate = getTranslation('foran51');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 2 gol farkla kazanır mı?"){
$secilen_translate = getTranslation('foran52');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 3 gol farkla kazanır mı?"){
$secilen_translate = getTranslation('foran53');
} else if($secim_yapimi_kuponguncelle=="1X2 ve toplam gol sayısı"){
$secilen_translate = getTranslation('foran54');
} else if($secim_yapimi_kuponguncelle=="Maç sonucu ve karşılıklı goller"){
$secilen_translate = getTranslation('foran55');
} else if($secim_yapimi_kuponguncelle=="İlk Yarı / Maç Sonucu"){
$secilen_translate = getTranslation('foran56');
} else if($secim_yapimi_kuponguncelle=="Skor Bahsi (90 Dakika)"){
$secilen_translate = getTranslation('foran57');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('foran58');
} else if($secim_yapimi_kuponguncelle=="Toplam Sari Kart Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran59');
} else if($secim_yapimi_kuponguncelle=="Kirmizi kart cikar mi?"){
$secilen_translate = getTranslation('foran60');
} else if($secim_yapimi_kuponguncelle=="Macta kac tane penalti olur?"){
$secilen_translate = getTranslation('foran61');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran62');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran63');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran64');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran65');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran66');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran67');
} else if($secim_yapimi_kuponguncelle=="Sarı Kart Toplam Tek/Çift"){
$secilen_translate = getTranslation('foran68');
} else if($secim_yapimi_kuponguncelle=="Hangi Takım Çok Sarı Kart Yer ?"){
$secilen_translate = getTranslation('foran69');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran70');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 6.5"){
$secilen_translate = getTranslation('foran71');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 7.5"){
$secilen_translate = getTranslation('foran72');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 8.5"){
$secilen_translate = getTranslation('foran73');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 9.5"){
$secilen_translate = getTranslation('foran74');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 10.5"){
$secilen_translate = getTranslation('foran75');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 11.5"){
$secilen_translate = getTranslation('foran76');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 12.5"){
$secilen_translate = getTranslation('foran77');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 13.5"){
$secilen_translate = getTranslation('foran78');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 14.5"){
$secilen_translate = getTranslation('foran79');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 15.5"){
$secilen_translate = getTranslation('foran80');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran81');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran82');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 4.5"){
$secilen_translate = getTranslation('foran83');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran84');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 6.5"){
$secilen_translate = getTranslation('foran85');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 7.5"){
$secilen_translate = getTranslation('foran86');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 8.5"){
$secilen_translate = getTranslation('foran87');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 9.5"){
$secilen_translate = getTranslation('foran88');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 10.5"){
$secilen_translate = getTranslation('foran89');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran90');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran91');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 4.5"){
$secilen_translate = getTranslation('foran92');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran93');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 6.5"){
$secilen_translate = getTranslation('foran94');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 7.5"){
$secilen_translate = getTranslation('foran95');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 8.5"){
$secilen_translate = getTranslation('foran96');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 9.5"){
$secilen_translate = getTranslation('foran97');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 10.5"){
$secilen_translate = getTranslation('foran98');
} else if($secim_yapimi_kuponguncelle=="Korner Toplam Tek/Çift"){
$secilen_translate = getTranslation('foran99');
} else if($secim_yapimi_kuponguncelle=="Hangi Takım Çok Korner Kullanır ?"){
$secilen_translate = getTranslation('foran100');
}

} else if($row['spor_tip']=="basketbol") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ?"){
$secilen_translate = getTranslation('boran1');
} else if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('boran2');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 1.YARI )"){
$secilen_translate = getTranslation('boran3');
} else if($secim_yapimi_kuponguncelle=="Toplam Skor Tek/Çift"){
$secilen_translate = getTranslation('boran4');
} else if($secim_yapimi_kuponguncelle=="Toplam Skor Alt/Üst"){
$secilen_translate = getTranslation('boran5');
} else if($secim_yapimi_kuponguncelle=="Handikap ( 1.YARI )"){
$secilen_translate = getTranslation('boran6');
} else if($secim_yapimi_kuponguncelle=="Handikap"){
$secilen_translate = getTranslation('boran7');
} else if($secim_yapimi_kuponguncelle=="1.Yarı / MS"){
$secilen_translate = getTranslation('boran8');
} else if($secim_yapimi_kuponguncelle=="İki Devrede Kazanır"){
$secilen_translate = getTranslation('boran9');
} else if($secim_yapimi_kuponguncelle=="Tüm Periyotları Kazanır"){
$secilen_translate = getTranslation('boran10');
} else if($secim_yapimi_kuponguncelle=="1.Takım İY Alt/Üst"){
$secilen_translate = getTranslation('boran11');
} else if($secim_yapimi_kuponguncelle=="2.Takım İY Alt/Üst"){
$secilen_translate = getTranslation('boran12');
}

}  else if($row['spor_tip']=="tenis") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ?"){
$secilen_translate = getTranslation('toran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahsi"){
$secilen_translate = getTranslation('toran2');
} else if($secim_yapimi_kuponguncelle=="1.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('toran3');
} else if($secim_yapimi_kuponguncelle=="2.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('toran4');
} else if($secim_yapimi_kuponguncelle=="1.Oyuncu 1 Set Kazanır"){
$secilen_translate = getTranslation('toran5');
} else if($secim_yapimi_kuponguncelle=="2.Oyuncu 1 Set Kazanır"){
$secilen_translate = getTranslation('toran6');
}

} else if($row['spor_tip']=="voleybol") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ?"){
$secilen_translate = getTranslation('voran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahsi"){
$secilen_translate = getTranslation('voran2');
} else if($secim_yapimi_kuponguncelle=="Toplam Alt/Üst"){
$secilen_translate = getTranslation('voran3');
} else if($secim_yapimi_kuponguncelle=="5 Set Sürermi ?"){
$secilen_translate = getTranslation('voran4');
}

} else if($row['spor_tip']=="buzhokeyi") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('buzoran1');
} else if($secim_yapimi_kuponguncelle=="1.P 1X2"){
$secilen_translate = getTranslation('buzoran2');
} else if($secim_yapimi_kuponguncelle=="2.P 1X2"){
$secilen_translate = getTranslation('buzoran3');
} else if($secim_yapimi_kuponguncelle=="3.P 1X2"){
$secilen_translate = getTranslation('buzoran4');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('buzoran5');
} else if($secim_yapimi_kuponguncelle=="1.P Çifte Şans"){
$secilen_translate = getTranslation('buzoran6');
} else if($secim_yapimi_kuponguncelle=="2.P Çifte Şans"){
$secilen_translate = getTranslation('buzoran7');
} else if($secim_yapimi_kuponguncelle=="3.P Çifte Şans"){
$secilen_translate = getTranslation('buzoran8');
}

} else if($row['spor_tip']=="hentbol") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('horan1');
} else if($secim_yapimi_kuponguncelle=="Toplam Alt/Üst"){
$secilen_translate = getTranslation('horan2');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 1.YARI )"){
$secilen_translate = getTranslation('horan3');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Alt/Üst"){
$secilen_translate = getTranslation('horan4');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Tek/Çift"){
$secilen_translate = getTranslation('horan5');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Tek/Çift"){
$secilen_translate = getTranslation('horan6');
} else if($secim_yapimi_kuponguncelle=="Toplam Tek/Çift"){
$secilen_translate = getTranslation('horan7');
}

} else if($row['spor_tip']=="canli") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('fcanlioran1');
} else if($secim_yapimi_kuponguncelle=="Handikap 1:0"){
$secilen_translate = getTranslation('fcanlioran2');
} else if($secim_yapimi_kuponguncelle=="Handikap 2:0"){
$secilen_translate = getTranslation('fcanlioran3');
} else if($secim_yapimi_kuponguncelle=="Handikap 0:1"){
$secilen_translate = getTranslation('fcanlioran4');
} else if($secim_yapimi_kuponguncelle=="Handikap 0:2"){
$secilen_translate = getTranslation('fcanlioran5');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('fcanlioran6');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Çifte Şans"){
$secilen_translate = getTranslation('fcanlioran7');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran8');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran9');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran10');
} else if($secim_yapimi_kuponguncelle=="Toplam 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran11');
} else if($secim_yapimi_kuponguncelle=="Toplam 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran12');
} else if($secim_yapimi_kuponguncelle=="Toplam 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran13');
} else if($secim_yapimi_kuponguncelle=="Toplam 3.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran14');
} else if($secim_yapimi_kuponguncelle=="Toplam 4.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran15');
} else if($secim_yapimi_kuponguncelle=="Toplam 5.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran16');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran17');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran18');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran19');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 3.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran20');
} else if($secim_yapimi_kuponguncelle=="Karşılıklı Gol Olurmu ?"){
$secilen_translate = getTranslation('fcanlioran21');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Müsabakada Gol Atarmı ?"){
$secilen_translate = getTranslation('fcanlioran22');
} else if($secim_yapimi_kuponguncelle=="Deplasman Müsabakada Gol Atarmı ?"){
$secilen_translate = getTranslation('fcanlioran23');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Tek / Çift"){
$secilen_translate = getTranslation('fcanlioran24');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Tek / Çift"){
$secilen_translate = getTranslation('fcanlioran25');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Karşılıklı Gol"){
$secilen_translate = getTranslation('fcanlioran26');
} else if($secim_yapimi_kuponguncelle=="Maç Sonucu ve Karşılıklı Gol"){
$secilen_translate = getTranslation('fcanlioran27');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran28');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran29');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran30');
} else if($secim_yapimi_kuponguncelle=="Deplasman 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran31');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran32');
} else if($secim_yapimi_kuponguncelle=="Deplasman 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran33');
} else if($secim_yapimi_kuponguncelle=="Toplam Kaç Gol Atılır ?"){
$secilen_translate = getTranslation('fcanlioran34');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Toplam Kaç Gol Atar ?"){
$secilen_translate = getTranslation('fcanlioran35');
} else if($secim_yapimi_kuponguncelle=="Deplasman Toplam Kaç Gol Atar ?"){
$secilen_translate = getTranslation('fcanlioran36');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Skoru"){
$secilen_translate = getTranslation('fcanlioran37');
} else if($secim_yapimi_kuponguncelle=="Maç Skoru"){
$secilen_translate = getTranslation('fcanlioran38');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran39');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran40');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran41');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran42');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran43');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran44');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi İlk Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran45');
} else if($secim_yapimi_kuponguncelle=="Ev sahibi İkinci Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran46');
} else if($secim_yapimi_kuponguncelle=="Deplasman İlk Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran47');
} else if($secim_yapimi_kuponguncelle=="Deplasman İkinci Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran48');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 1 Gol Farkla Kazanirmi ?"){
$secilen_translate = getTranslation('fcanlioran49');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 2 Gol Farkla Kazanirmi ?"){
$secilen_translate = getTranslation('fcanlioran50');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 3 Gol Farkla Kazanirmi ?"){
$secilen_translate = getTranslation('fcanlioran51');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Sonucu"){
$secilen_translate = getTranslation('fcanlioran52');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Sonucu"){
$secilen_translate = getTranslation('fcanlioran53');
} else if($secim_yapimi_kuponguncelle=="İlk Yarıda Kaç Gol Olur ?"){
$secilen_translate = getTranslation('fcanlioran54');
} else if($secim_yapimi_kuponguncelle=="2.Yarıda Toplam Kaç Gol Olur ?"){
$secilen_translate = getTranslation('fcanlioran55');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-4+)"){
$secilen_translate = getTranslation('fcanlioran56');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-5+)"){
$secilen_translate = getTranslation('fcanlioran57');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-6+)"){
$secilen_translate = getTranslation('fcanlioran58');
} else if($secim_yapimi_kuponguncelle=="1. yarıda 1.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran59');
} else if($secim_yapimi_kuponguncelle=="1.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran60');
} else if($secim_yapimi_kuponguncelle=="2.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran61');
} else if($secim_yapimi_kuponguncelle=="3.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran62');
} else if($secim_yapimi_kuponguncelle=="4.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran63');
} else if($secim_yapimi_kuponguncelle=="5.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran64');
} else if($secim_yapimi_kuponguncelle=="6.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran65');
}

} else if($row['spor_tip']=="canlib") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('bcanlioran1');
} else if($secim_yapimi_kuponguncelle=="1X2(1.YARI)"){
$secilen_translate = getTranslation('bcanlioran2');
} else if($secim_yapimi_kuponguncelle=="1X2(2.YARI)"){
$secilen_translate = getTranslation('bcanlioran3');
} else if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran4');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran5');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran6');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran7');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran8');
} else if($secim_yapimi_kuponguncelle=="Toplam Skor Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran9');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran10');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran11');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran12');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran13');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran14');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran15');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran16');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran17');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran18');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran19');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran20');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran21');
} else if($secim_yapimi_kuponguncelle=="Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran22');
}

} else if($row['spor_tip']=="canlit") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
$secilen_translate = getTranslation('tcanlioran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahisi"){
$secilen_translate = getTranslation('tcanlioran2');
}

} else if($row['spor_tip']=="canliv") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
$secilen_translate = getTranslation('vcanlioran1');
} else if($secim_yapimi_kuponguncelle=="1.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran2');
} else if($secim_yapimi_kuponguncelle=="2.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran3');
} else if($secim_yapimi_kuponguncelle=="3.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran4');
} else if($secim_yapimi_kuponguncelle=="4.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran5');
} else if($secim_yapimi_kuponguncelle=="Set bahisi (5 maç üzerinden)"){
$secilen_translate = getTranslation('vcanlioran6');
} else if($secim_yapimi_kuponguncelle=="Toplam Kaç Set Oynanır ?"){
$secilen_translate = getTranslation('vcanlioran7');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran8');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran9');
} else if($secim_yapimi_kuponguncelle=="1.Takım 1.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran10');
} else if($secim_yapimi_kuponguncelle=="2.Takım 1.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran11');
} else if($secim_yapimi_kuponguncelle=="1.Takım 2.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran12');
} else if($secim_yapimi_kuponguncelle=="2.Takım 2.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran13');
} else if($secim_yapimi_kuponguncelle=="1.Takım 3.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran14');
} else if($secim_yapimi_kuponguncelle=="2.Takım 3.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran15');
} else if($secim_yapimi_kuponguncelle=="1.Takım 4.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran16');
} else if($secim_yapimi_kuponguncelle=="2.Takım 4.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran17');
} else if($secim_yapimi_kuponguncelle=="Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran18');
} else if($secim_yapimi_kuponguncelle=="Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran19');
} else if($secim_yapimi_kuponguncelle=="1.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran20');
} else if($secim_yapimi_kuponguncelle=="2.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran21');
} else if($secim_yapimi_kuponguncelle=="3.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran22');
} else if($secim_yapimi_kuponguncelle=="4.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran23');
} else if($secim_yapimi_kuponguncelle=="Müsabaka 5.Set Sürermi"){
$secilen_translate = getTranslation('vcanlioran24');
}

} else if($row['spor_tip']=="canlibuz") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('buzcanlioran1');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('buzcanlioran2');
} else if($secim_yapimi_kuponguncelle=="Cifte Sans"){
$secilen_translate = getTranslation('buzcanlioran2');
} else if($secim_yapimi_kuponguncelle=="Hangi periyod daha cok gol olur?"){
$secilen_translate = getTranslation('buzcanlioran3');
}

}

if($dil_bilgisi22['language']=='en'){

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "Y";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "N";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "U";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "O";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 and O";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 and O";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 and U";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 and U";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 and Y";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 and Y";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 and N";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 and N";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "No Goal";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "X and Y";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "D";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "S";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else if($dil_bilgisi22['language']=='de'){ 

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "J";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "K";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "N";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "T";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 und T";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 und T";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 und N";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 und N";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 und J";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 und J";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 und K";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 und K";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "Kein Ziel";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "X und J";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "P";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "E";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else if($dil_bilgisi22['language']=='ar'){ 

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "أجل";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "لا";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "أدنى";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "أعلى";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 وما فوق";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 وما فوق";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 و السفلى";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 و السفلى";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 و نعم";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 و نعم";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 و لا";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 و لا";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "لا هدف";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "س ونعم";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "زوجان";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "واحد";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else if($dil_bilgisi22['language']=='ru'){ 

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "да";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "нет";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "ниже";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "топ";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 и выше";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 и выше";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 и ниже";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 и ниже";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 и да";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 и да";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 и нет";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 и нет";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "Нет цели";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "Х и да";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "пара";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "один";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

?>

<div style=' clear:left; padding:5px 0px; width:270px;  margin-bottom:5px;margin-bottom:2px; color:#707070;'>
<div style='float:left; padding:3px; background:;'>
<div style='float:left; font-size:10px; font-family:tahoma;  width:42px; margin-bottom:5px;'><?=$row['mac_kodu']; ?><br></div>
<div style='float:left; font-size:10px; font-family:tahoma;  width:140px; margin-bottom:5px;'><?=$row['ev_takim'];?> - <?=$row['konuk_takim'];?> <br> <? if($row['spor_tip']!="canli" || $row['spor_tip']!="canlibasket") { ?><?=date("d-m H:i",$row['mac_time']); ?><? } ?></div>
<div style='float:left; font-size:10px; font-family:tahoma;  width:40px; text-align:center; margin-bottom:5px;'><?=$secilen_translate;?> / <?=$secilen_translate2;?> <? if(!empty($row['oran_val'])) { echo "($row[oran_val])"; } ?> </div>
<div style='float:left; font-size:10px; font-family:tahoma;  width:40px; text-align:center; margin-bottom:5px;'><?=nf($row['oran']); ?></div>
</div>
</div>
<div style=' width:270px;  height:1px; background:#999; margin:5px 0px; clear:left;'></div>

<? } ?>


<div style='clear:left; font-weight:normal;  width:270px; font-family:Tahoma; font-size:10px;  padding:3px 0px 5px 0px; border-bottom:1px solid #999; margin-bottom:3px; color:#707070;'>
<b><?=getTranslation('printkupon7')?> :</b> <?=nf($kupon['yatan']); ?> <?=getTranslation('parabirimi')?> </div>
<div style='clear:left; font-weight:normal;  width:285px; font-family:Tahoma; font-size:10px;  padding:3px 0px 5px 0px; margin-bottom:15px; color:#707070;'>
<div style='float:left; width:140px;'><b><?=getTranslation('printkupon5')?> :</b> <?=nf($kupon['oran']); ?> </div>
<div style='float:right; width:145px;'><b><?=getTranslation('printkupon8')?> :</b> <?=nf($kupon['tutar']); ?> <?=getTranslation('parabirimi')?> </div>
</div>
<? if($ubsi['kesinti_goster']==1){ ?>
<div style='clear:left; font-weight:normal;  width:285px; font-family:Tahoma; font-size:10px;  padding:3px 0px 5px 0px; margin-bottom:15px; color:#707070;'>
<div style='float:left; width:140px;'><b>5% <?=getTranslation('printkupon6')?> :</b> <? 
if(!empty($ubsi['kazananyuzde'])) { $yuzdesi = yuzdele($ubsi['kazananyuzde']); 
$kesinti = $kupon['tutar']*$yuzdesi;
$gercektutar = $kupon['tutar']-$kesinti;
} else {
$gercektutar = $kupon['tutar'];	
}
echo nf($gercektutar); 
?> <?=getTranslation('parabirimi')?> </div></div>
<? } ?>
<div style='height:1px; width:270px; background:#999; margin:3px 0px; clear:left;'></div>
<div style='clear:left;  width:270px; text-align:center;  font-size:10px; font-family:tahoma;  padding:3px 0px 0px 0px; margin-bottom:3px; color:#707070;'></div>
<? } else if($ub['yazici_tip']=="5") { ?>
<style type="text/css">body{font-size:11px;font-family:verdana,sans-serif;}.bold{font-weight:700;}hr{color:#000;background-color:#000;height:2px;}</style>
</head>
<body>
<table border="0" cellpadding="0" cellspacing="0" width="300px">
<tr>
<td colspan="2" align="center" class="bold" style="padding:0px 0px 5px;"><?=getTranslation('printkupon3')?> (<?=$kupon['id']; ?>)</td>
</tr>
<tr>
<td colspan="2" align="center" class="bold" style="padding:0px 0px 5px;"><?=date("d-m-Y H:i",$kupon['kupon_time']); ?></td>
</tr>

<?
$sor = sed_sql_query("select * from kupon_ic where kupon_id='$id'");
while($row=sed_sql_fetcharray($sor)) { 
$ob = explode("|",$row['oran_tip']);

$secim_yapimi_kuponguncelle = $ob[0];
$secim_yapimi_kuponguncelle2 = $ob[1];

if($row['spor_tip']=="futbol") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('foran1');
} else if($secim_yapimi_kuponguncelle=="Handikap (0:1)"){
$secilen_translate = getTranslation('foran2');
} else if($secim_yapimi_kuponguncelle=="Handikap (1:0)"){
$secilen_translate = getTranslation('foran3');
} else if($secim_yapimi_kuponguncelle=="Handikap (0:2)"){
$secilen_translate = getTranslation('foran4');
} else if($secim_yapimi_kuponguncelle=="Handikap (2:0)"){
$secilen_translate = getTranslation('foran5');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 1.YARI )"){
$secilen_translate = getTranslation('foran6');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 2.YARI )"){
$secilen_translate = getTranslation('foran7');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Çifte Şans"){
$secilen_translate = getTranslation('foran8');
} else if($secim_yapimi_kuponguncelle=="1.YARI KG"){
$secilen_translate = getTranslation('foran9');
} else if($secim_yapimi_kuponguncelle=="Beraberlikte İade"){
$secilen_translate = getTranslation('foran10');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 0.5"){
$secilen_translate = getTranslation('foran11');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran12');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran13');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran14');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 4.5"){
$secilen_translate = getTranslation('foran15');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran16');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 0.5"){
$secilen_translate = getTranslation('foran18');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran19');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran20');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran21');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 0.5"){
$secilen_translate = getTranslation('foran22');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran23');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran24');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran25');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Gol Atarmı ?"){
$secilen_translate = getTranslation('foran26');
} else if($secim_yapimi_kuponguncelle=="Deplasman Gol Atarmı ?"){
$secilen_translate = getTranslation('foran27');
} else if($secim_yapimi_kuponguncelle=="Karşılıklı Gol"){
$secilen_translate = getTranslation('foran28');
} else if($secim_yapimi_kuponguncelle=="​​​​​1.Yarı Tek/Çift"){
$secilen_translate = getTranslation('foran29');
} else if($secim_yapimi_kuponguncelle=="Tek/Çift"){
$secilen_translate = getTranslation('foran30');
} else if($secim_yapimi_kuponguncelle=="Evsahibi Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran31');
} else if($secim_yapimi_kuponguncelle=="Deplasman Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran32');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran33');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 2.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran34');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran35');
} else if($secim_yapimi_kuponguncelle=="Deplasman 2.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran36');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı A/Ü 0.5"){
$secilen_translate = getTranslation('foran37');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı A/Ü 1.5"){
$secilen_translate = getTranslation('foran38');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı A/Ü 0.5"){
$secilen_translate = getTranslation('foran39');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı A/Ü 1.5"){
$secilen_translate = getTranslation('foran40');
} else if($secim_yapimi_kuponguncelle=="Evsahibi A/Ü 1.5"){
$secilen_translate = getTranslation('foran41');
} else if($secim_yapimi_kuponguncelle=="Deplasman A/Ü 1.5"){
$secilen_translate = getTranslation('foran42');
} else if($secim_yapimi_kuponguncelle=="​​​​​Evsahibi Her 2 yarıda Gol Atar ?"){
$secilen_translate = getTranslation('foran43');
} else if($secim_yapimi_kuponguncelle=="Deplasman Her 2 yarıda Gol Atar ?"){
$secilen_translate = getTranslation('foran44');
} else if($secim_yapimi_kuponguncelle=="Hangi Devrede Fazla Gol Olur"){
$secilen_translate = getTranslation('foran45');
} else if($secim_yapimi_kuponguncelle=="Evsahibi Hangi Devrede Fazla Gol Atar ?"){
$secilen_translate = getTranslation('foran46');
} else if($secim_yapimi_kuponguncelle=="Deplasman Hangi Devrede Fazla Gol Atar ?"){
$secilen_translate = getTranslation('foran47');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-4+)"){
$secilen_translate = getTranslation('foran48');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-5+)"){
$secilen_translate = getTranslation('foran49');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-6+)"){
$secilen_translate = getTranslation('foran50');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 1 gol farkla kazanır mı?"){
$secilen_translate = getTranslation('foran51');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 2 gol farkla kazanır mı?"){
$secilen_translate = getTranslation('foran52');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 3 gol farkla kazanır mı?"){
$secilen_translate = getTranslation('foran53');
} else if($secim_yapimi_kuponguncelle=="1X2 ve toplam gol sayısı"){
$secilen_translate = getTranslation('foran54');
} else if($secim_yapimi_kuponguncelle=="Maç sonucu ve karşılıklı goller"){
$secilen_translate = getTranslation('foran55');
} else if($secim_yapimi_kuponguncelle=="İlk Yarı / Maç Sonucu"){
$secilen_translate = getTranslation('foran56');
} else if($secim_yapimi_kuponguncelle=="Skor Bahsi (90 Dakika)"){
$secilen_translate = getTranslation('foran57');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('foran58');
} else if($secim_yapimi_kuponguncelle=="Toplam Sari Kart Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran59');
} else if($secim_yapimi_kuponguncelle=="Kirmizi kart cikar mi?"){
$secilen_translate = getTranslation('foran60');
} else if($secim_yapimi_kuponguncelle=="Macta kac tane penalti olur?"){
$secilen_translate = getTranslation('foran61');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran62');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran63');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran64');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran65');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran66');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran67');
} else if($secim_yapimi_kuponguncelle=="Sarı Kart Toplam Tek/Çift"){
$secilen_translate = getTranslation('foran68');
} else if($secim_yapimi_kuponguncelle=="Hangi Takım Çok Sarı Kart Yer ?"){
$secilen_translate = getTranslation('foran69');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran70');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 6.5"){
$secilen_translate = getTranslation('foran71');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 7.5"){
$secilen_translate = getTranslation('foran72');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 8.5"){
$secilen_translate = getTranslation('foran73');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 9.5"){
$secilen_translate = getTranslation('foran74');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 10.5"){
$secilen_translate = getTranslation('foran75');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 11.5"){
$secilen_translate = getTranslation('foran76');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 12.5"){
$secilen_translate = getTranslation('foran77');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 13.5"){
$secilen_translate = getTranslation('foran78');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 14.5"){
$secilen_translate = getTranslation('foran79');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 15.5"){
$secilen_translate = getTranslation('foran80');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran81');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran82');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 4.5"){
$secilen_translate = getTranslation('foran83');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran84');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 6.5"){
$secilen_translate = getTranslation('foran85');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 7.5"){
$secilen_translate = getTranslation('foran86');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 8.5"){
$secilen_translate = getTranslation('foran87');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 9.5"){
$secilen_translate = getTranslation('foran88');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 10.5"){
$secilen_translate = getTranslation('foran89');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran90');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran91');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 4.5"){
$secilen_translate = getTranslation('foran92');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran93');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 6.5"){
$secilen_translate = getTranslation('foran94');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 7.5"){
$secilen_translate = getTranslation('foran95');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 8.5"){
$secilen_translate = getTranslation('foran96');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 9.5"){
$secilen_translate = getTranslation('foran97');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 10.5"){
$secilen_translate = getTranslation('foran98');
} else if($secim_yapimi_kuponguncelle=="Korner Toplam Tek/Çift"){
$secilen_translate = getTranslation('foran99');
} else if($secim_yapimi_kuponguncelle=="Hangi Takım Çok Korner Kullanır ?"){
$secilen_translate = getTranslation('foran100');
}

} else if($row['spor_tip']=="basketbol") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ?"){
$secilen_translate = getTranslation('boran1');
} else if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('boran2');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 1.YARI )"){
$secilen_translate = getTranslation('boran3');
} else if($secim_yapimi_kuponguncelle=="Toplam Skor Tek/Çift"){
$secilen_translate = getTranslation('boran4');
} else if($secim_yapimi_kuponguncelle=="Toplam Skor Alt/Üst"){
$secilen_translate = getTranslation('boran5');
} else if($secim_yapimi_kuponguncelle=="Handikap ( 1.YARI )"){
$secilen_translate = getTranslation('boran6');
} else if($secim_yapimi_kuponguncelle=="Handikap"){
$secilen_translate = getTranslation('boran7');
} else if($secim_yapimi_kuponguncelle=="1.Yarı / MS"){
$secilen_translate = getTranslation('boran8');
} else if($secim_yapimi_kuponguncelle=="İki Devrede Kazanır"){
$secilen_translate = getTranslation('boran9');
} else if($secim_yapimi_kuponguncelle=="Tüm Periyotları Kazanır"){
$secilen_translate = getTranslation('boran10');
} else if($secim_yapimi_kuponguncelle=="1.Takım İY Alt/Üst"){
$secilen_translate = getTranslation('boran11');
} else if($secim_yapimi_kuponguncelle=="2.Takım İY Alt/Üst"){
$secilen_translate = getTranslation('boran12');
}

}  else if($row['spor_tip']=="tenis") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ?"){
$secilen_translate = getTranslation('toran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahsi"){
$secilen_translate = getTranslation('toran2');
} else if($secim_yapimi_kuponguncelle=="1.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('toran3');
} else if($secim_yapimi_kuponguncelle=="2.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('toran4');
} else if($secim_yapimi_kuponguncelle=="1.Oyuncu 1 Set Kazanır"){
$secilen_translate = getTranslation('toran5');
} else if($secim_yapimi_kuponguncelle=="2.Oyuncu 1 Set Kazanır"){
$secilen_translate = getTranslation('toran6');
}

} else if($row['spor_tip']=="voleybol") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ?"){
$secilen_translate = getTranslation('voran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahsi"){
$secilen_translate = getTranslation('voran2');
} else if($secim_yapimi_kuponguncelle=="Toplam Alt/Üst"){
$secilen_translate = getTranslation('voran3');
} else if($secim_yapimi_kuponguncelle=="5 Set Sürermi ?"){
$secilen_translate = getTranslation('voran4');
}

} else if($row['spor_tip']=="buzhokeyi") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('buzoran1');
} else if($secim_yapimi_kuponguncelle=="1.P 1X2"){
$secilen_translate = getTranslation('buzoran2');
} else if($secim_yapimi_kuponguncelle=="2.P 1X2"){
$secilen_translate = getTranslation('buzoran3');
} else if($secim_yapimi_kuponguncelle=="3.P 1X2"){
$secilen_translate = getTranslation('buzoran4');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('buzoran5');
} else if($secim_yapimi_kuponguncelle=="1.P Çifte Şans"){
$secilen_translate = getTranslation('buzoran6');
} else if($secim_yapimi_kuponguncelle=="2.P Çifte Şans"){
$secilen_translate = getTranslation('buzoran7');
} else if($secim_yapimi_kuponguncelle=="3.P Çifte Şans"){
$secilen_translate = getTranslation('buzoran8');
}

} else if($row['spor_tip']=="hentbol") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('horan1');
} else if($secim_yapimi_kuponguncelle=="Toplam Alt/Üst"){
$secilen_translate = getTranslation('horan2');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 1.YARI )"){
$secilen_translate = getTranslation('horan3');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Alt/Üst"){
$secilen_translate = getTranslation('horan4');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Tek/Çift"){
$secilen_translate = getTranslation('horan5');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Tek/Çift"){
$secilen_translate = getTranslation('horan6');
} else if($secim_yapimi_kuponguncelle=="Toplam Tek/Çift"){
$secilen_translate = getTranslation('horan7');
}

} else if($row['spor_tip']=="canli") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('fcanlioran1');
} else if($secim_yapimi_kuponguncelle=="Handikap 1:0"){
$secilen_translate = getTranslation('fcanlioran2');
} else if($secim_yapimi_kuponguncelle=="Handikap 2:0"){
$secilen_translate = getTranslation('fcanlioran3');
} else if($secim_yapimi_kuponguncelle=="Handikap 0:1"){
$secilen_translate = getTranslation('fcanlioran4');
} else if($secim_yapimi_kuponguncelle=="Handikap 0:2"){
$secilen_translate = getTranslation('fcanlioran5');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('fcanlioran6');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Çifte Şans"){
$secilen_translate = getTranslation('fcanlioran7');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran8');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran9');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran10');
} else if($secim_yapimi_kuponguncelle=="Toplam 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran11');
} else if($secim_yapimi_kuponguncelle=="Toplam 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran12');
} else if($secim_yapimi_kuponguncelle=="Toplam 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran13');
} else if($secim_yapimi_kuponguncelle=="Toplam 3.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran14');
} else if($secim_yapimi_kuponguncelle=="Toplam 4.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran15');
} else if($secim_yapimi_kuponguncelle=="Toplam 5.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran16');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran17');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran18');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran19');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 3.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran20');
} else if($secim_yapimi_kuponguncelle=="Karşılıklı Gol Olurmu ?"){
$secilen_translate = getTranslation('fcanlioran21');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Müsabakada Gol Atarmı ?"){
$secilen_translate = getTranslation('fcanlioran22');
} else if($secim_yapimi_kuponguncelle=="Deplasman Müsabakada Gol Atarmı ?"){
$secilen_translate = getTranslation('fcanlioran23');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Tek / Çift"){
$secilen_translate = getTranslation('fcanlioran24');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Tek / Çift"){
$secilen_translate = getTranslation('fcanlioran25');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Karşılıklı Gol"){
$secilen_translate = getTranslation('fcanlioran26');
} else if($secim_yapimi_kuponguncelle=="Maç Sonucu ve Karşılıklı Gol"){
$secilen_translate = getTranslation('fcanlioran27');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran28');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran29');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran30');
} else if($secim_yapimi_kuponguncelle=="Deplasman 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran31');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran32');
} else if($secim_yapimi_kuponguncelle=="Deplasman 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran33');
} else if($secim_yapimi_kuponguncelle=="Toplam Kaç Gol Atılır ?"){
$secilen_translate = getTranslation('fcanlioran34');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Toplam Kaç Gol Atar ?"){
$secilen_translate = getTranslation('fcanlioran35');
} else if($secim_yapimi_kuponguncelle=="Deplasman Toplam Kaç Gol Atar ?"){
$secilen_translate = getTranslation('fcanlioran36');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Skoru"){
$secilen_translate = getTranslation('fcanlioran37');
} else if($secim_yapimi_kuponguncelle=="Maç Skoru"){
$secilen_translate = getTranslation('fcanlioran38');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran39');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran40');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran41');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran42');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran43');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran44');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi İlk Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran45');
} else if($secim_yapimi_kuponguncelle=="Ev sahibi İkinci Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran46');
} else if($secim_yapimi_kuponguncelle=="Deplasman İlk Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran47');
} else if($secim_yapimi_kuponguncelle=="Deplasman İkinci Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran48');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 1 Gol Farkla Kazanirmi ?"){
$secilen_translate = getTranslation('fcanlioran49');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 2 Gol Farkla Kazanirmi ?"){
$secilen_translate = getTranslation('fcanlioran50');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 3 Gol Farkla Kazanirmi ?"){
$secilen_translate = getTranslation('fcanlioran51');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Sonucu"){
$secilen_translate = getTranslation('fcanlioran52');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Sonucu"){
$secilen_translate = getTranslation('fcanlioran53');
} else if($secim_yapimi_kuponguncelle=="İlk Yarıda Kaç Gol Olur ?"){
$secilen_translate = getTranslation('fcanlioran54');
} else if($secim_yapimi_kuponguncelle=="2.Yarıda Toplam Kaç Gol Olur ?"){
$secilen_translate = getTranslation('fcanlioran55');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-4+)"){
$secilen_translate = getTranslation('fcanlioran56');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-5+)"){
$secilen_translate = getTranslation('fcanlioran57');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-6+)"){
$secilen_translate = getTranslation('fcanlioran58');
} else if($secim_yapimi_kuponguncelle=="1. yarıda 1.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran59');
} else if($secim_yapimi_kuponguncelle=="1.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran60');
} else if($secim_yapimi_kuponguncelle=="2.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran61');
} else if($secim_yapimi_kuponguncelle=="3.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran62');
} else if($secim_yapimi_kuponguncelle=="4.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran63');
} else if($secim_yapimi_kuponguncelle=="5.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran64');
} else if($secim_yapimi_kuponguncelle=="6.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran65');
}

} else if($row['spor_tip']=="canlib") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('bcanlioran1');
} else if($secim_yapimi_kuponguncelle=="1X2(1.YARI)"){
$secilen_translate = getTranslation('bcanlioran2');
} else if($secim_yapimi_kuponguncelle=="1X2(2.YARI)"){
$secilen_translate = getTranslation('bcanlioran3');
} else if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran4');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran5');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran6');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran7');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran8');
} else if($secim_yapimi_kuponguncelle=="Toplam Skor Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran9');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran10');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran11');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran12');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran13');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran14');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran15');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran16');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran17');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran18');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran19');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran20');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran21');
} else if($secim_yapimi_kuponguncelle=="Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran22');
}

} else if($row['spor_tip']=="canlit") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
$secilen_translate = getTranslation('tcanlioran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahisi"){
$secilen_translate = getTranslation('tcanlioran2');
}

} else if($row['spor_tip']=="canliv") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
$secilen_translate = getTranslation('vcanlioran1');
} else if($secim_yapimi_kuponguncelle=="1.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran2');
} else if($secim_yapimi_kuponguncelle=="2.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran3');
} else if($secim_yapimi_kuponguncelle=="3.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran4');
} else if($secim_yapimi_kuponguncelle=="4.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran5');
} else if($secim_yapimi_kuponguncelle=="Set bahisi (5 maç üzerinden)"){
$secilen_translate = getTranslation('vcanlioran6');
} else if($secim_yapimi_kuponguncelle=="Toplam Kaç Set Oynanır ?"){
$secilen_translate = getTranslation('vcanlioran7');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran8');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran9');
} else if($secim_yapimi_kuponguncelle=="1.Takım 1.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran10');
} else if($secim_yapimi_kuponguncelle=="2.Takım 1.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran11');
} else if($secim_yapimi_kuponguncelle=="1.Takım 2.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran12');
} else if($secim_yapimi_kuponguncelle=="2.Takım 2.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran13');
} else if($secim_yapimi_kuponguncelle=="1.Takım 3.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran14');
} else if($secim_yapimi_kuponguncelle=="2.Takım 3.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran15');
} else if($secim_yapimi_kuponguncelle=="1.Takım 4.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran16');
} else if($secim_yapimi_kuponguncelle=="2.Takım 4.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran17');
} else if($secim_yapimi_kuponguncelle=="Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran18');
} else if($secim_yapimi_kuponguncelle=="Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran19');
} else if($secim_yapimi_kuponguncelle=="1.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran20');
} else if($secim_yapimi_kuponguncelle=="2.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran21');
} else if($secim_yapimi_kuponguncelle=="3.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran22');
} else if($secim_yapimi_kuponguncelle=="4.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran23');
} else if($secim_yapimi_kuponguncelle=="Müsabaka 5.Set Sürermi"){
$secilen_translate = getTranslation('vcanlioran24');
}

} else if($row['spor_tip']=="canlibuz") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('buzcanlioran1');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('buzcanlioran2');
} else if($secim_yapimi_kuponguncelle=="Cifte Sans"){
$secilen_translate = getTranslation('buzcanlioran2');
} else if($secim_yapimi_kuponguncelle=="Hangi periyod daha cok gol olur?"){
$secilen_translate = getTranslation('buzcanlioran3');
}

}

if($dil_bilgisi22['language']=='en'){

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "Y";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "N";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "U";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "O";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 and O";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 and O";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 and U";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 and U";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 and Y";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 and Y";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 and N";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 and N";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "No Goal";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "X and Y";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "D";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "S";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else if($dil_bilgisi22['language']=='de'){ 

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "J";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "K";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "N";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "T";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 und T";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 und T";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 und N";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 und N";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 und J";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 und J";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 und K";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 und K";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "Kein Ziel";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "X und J";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "P";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "E";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else if($dil_bilgisi22['language']=='ar'){ 

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "أجل";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "لا";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "أدنى";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "أعلى";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 وما فوق";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 وما فوق";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 و السفلى";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 و السفلى";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 و نعم";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 و نعم";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 و لا";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 و لا";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "لا هدف";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "س ونعم";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "زوجان";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "واحد";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else if($dil_bilgisi22['language']=='ru'){ 

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "да";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "нет";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "ниже";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "топ";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 и выше";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 и выше";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 и ниже";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 и ниже";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 и да";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 и да";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 и нет";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 и нет";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "Нет цели";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "Х и да";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "пара";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "один";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

?>

<tr>
<td colspan="2" align="left" class="bold" width="300px" style="padding:4px 0px 0px;"><?=$row['mac_kodu']; ?>-<?=$row['ev_takim'];?> - <?=$row['konuk_takim'];?> </td>
</tr>
<tr>
<td colspan="2" class="bold"><? if($row['spor_tip']!="canli" || $row['spor_tip']!="canlibasket") { ?><?=date("d-m H:i",$row['mac_time']); ?><? } ?></td>
</tr>
<tr>
<td align="left" width="170px" style="padding:4px 0px 0px;" class="bold"><?=$secilen_translate;?> : <?=$secilen_translate2;?> <? if(!empty($row['oran_val'])) { echo "($row[oran_val])"; } ?> </td>
<td align="right" width="130px" style="padding-right:5px;" class="bold"><?=getTranslation('printkupon9')?> : <?=nf($row['oran']); ?></td>
</tr>
<tr>
<td colspan="2"><hr/></td>
</tr>

<? } ?>

<tr>
<td class="bold" colspan="2" style="padding:3px 0px;">
<div style="float:left; padding-right:100px;"><?=getTranslation('printkupon5')?></div>
<div style="float:right;padding-right:5px;"><?=nf($kupon['oran']); ?></div>
</td>
</tr>
<tr>
<td class="bold" colspan="2" style="padding:3px 0px;">
<div style="float:left; padding-right:100px;"><?=getTranslation('printkupon7')?></div>
<div style="float:right;padding-right:5px;"><?=nf($kupon['yatan']); ?> <?=getTranslation('parabirimi')?></div>
</td>
</tr>
<? if($ubsi['kesinti_goster']==1){ ?>
<tr>
<td class="bold" colspan="2" style="padding:3px 0px;">
<div style="float:left; padding-right:100px;">5% <?=getTranslation('printkupon6')?></div>
<div style="float:right;padding-right:5px;"><? 
if(!empty($ubsi['kazananyuzde'])) { $yuzdesi = yuzdele($ubsi['kazananyuzde']); 
$kesinti = $kupon['tutar']*$yuzdesi;
$gercektutar = $kupon['tutar']-$kesinti;
} else {
$gercektutar = $kupon['tutar'];	
}
echo nf($gercektutar); 
?> <?=getTranslation('parabirimi')?></div>
</td>
</tr>
<? } ?>
<tr>
<td class="bold" colspan="2" style="padding:3px 0px; border:dashed 1px #000000; border-left:0px; border-right:0px;">
<div style="float:left; padding-right:100px;"><?=getTranslation('printkupon8')?></div>
<div style="float:right;padding-right:5px;"><?=nf($kupon['tutar']); ?> <?=getTranslation('parabirimi')?></div>
</td>
</tr>
<tr>
<td class="bold" colspan="2" style="padding:3px 3px;text-align:center;"><span id="Label11" style="font-size:Smaller;"><?=$ubsi['ciktimesaj']; ?></span></td>
</tr>
</table>
<? } else if($ub['yazici_tip']=="4") { ?>
<link rel="stylesheet" href="/players/img/print/ticket/4/global.css" type="text/css">
</head>
</head>
<body>
<table cellspacing="0" cellpadding="0" border="0" style="border-width:0px;width:100%;border-collapse:collapse;">
<tr style="background-color:#E6E7E8;">
<td><img src="/players/img/print/ticket/4/ticket.png"/></td><td class="PO_Header" style="width:80%;"><?=getTranslation('printkupon3')?></td><td class="PO_HeaderTime" style="width:20%;"><?=date("d-m-Y H:i:s",$kupon['kupon_time']); ?></td>
</tr>
<tr>
<td align="Right" colspan="3"><a href="javascript: if (window.print) window.print();"><img src="/players/img/print/ticket/4/symbol_druck.gif" alt="" border="0"/></a></td>
</tr>
</table>
<br>
<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>
<td class="PT_ColHeader_BLTBR_normal" colspan="4"><b>&nbsp;<?=getTranslation('printkupon3')?> (ID#<?=$kupon['id']; ?>)</b></td>
</tr>
<tr>
<td width="25%" class="PT_Head_Beschr">&nbsp;<?=getTranslation('printkupon7')?></td>
<td width="25%" class="PT_Head_Wert_BR"><?=nf($kupon['yatan']); ?> <?=getTranslation('parabirimi')?>&nbsp;</td>
</tr>
<tr>
<td width="25%" class="PT_Head_Beschr">&nbsp;<?=getTranslation('printkupon9')?></td>
<td width="25%" class="PT_Head_Wert_BR"><?=nf($kupon['oran']); ?>&nbsp;</td>
</tr>
<tr>
<td width="25%" class="PT_Head_Beschr_BL">&nbsp;<?=getTranslation('printkupon14')?></td>
<td width="25%" class="PT_Head_Wert_BR">
&nbsp;</td>
<td width="25%" class="PT_Head_Beschr">&nbsp;<?=getTranslation('printkupon8')?></td>
<td width="25%" class="PT_Head_Wert_BR"><?=nf($kupon['tutar']); ?> <?=getTranslation('parabirimi')?>&nbsp;</td>
</tr>
<tr>
<td width="25%" class="PT_Head_Beschr_BL">&nbsp;<?=getTranslation('printkupon10')?></td>
<td width="25%" class="PT_Head_Wert_BR"><?=date("d-m-Y",$kupon['kupon_time']); ?>&nbsp;</td>
<td width="25%" class="PT_Head_Beschr">&nbsp;<?=getTranslation('printkupon17')?></td>
<td width="25%" class="PT_Head_Wert_BR"><?=date("H:i",$kupon['kupon_time']); ?>&nbsp;</td>
</tr>
<tr>
<td width="25%" class="PT_Head_Beschr_BL">&nbsp;<?=getTranslation('printkupon15')?></td>
<td width="25%" class="PT_Head_Wert_BR"><?=$ubsi['ciktimesaj']; ?>&nbsp;</td>
<? if($ubsi['kesinti_goster']==1){ ?>
<td width="25%" class="PT_Head_Beschr">&nbsp;5% <?=getTranslation('printkupon6')?>;</td>
<td width="25%" class="PT_Head_Wert_BR"><? 
if(!empty($ubsi['kazananyuzde'])) { $yuzdesi = yuzdele($ubsi['kazananyuzde']); 
$kesinti = $kupon['tutar']*$yuzdesi;
$gercektutar = $kupon['tutar']-$kesinti;
} else {
$gercektutar = $kupon['tutar'];	
}
echo nf($gercektutar); 
?> <?=getTranslation('parabirimi')?>&nbsp;</td>
<? } ?>
</tr>
<tr>
<td colspan="4">
<table cellSpacing="0" cellPadding="0" width="100%" border="0">
<tr>
<td class="PT_ColHeader_BLTBR_normal" align="center"><?=getTranslation('printkupon11')?></td>
<td class="PT_ColHeader_BTBR_normal">&nbsp;<?=getTranslation('printkupon12')?></td>
<td class="PT_ColHeader_BTBR_normal" align="center"><?=getTranslation('printkupon16')?></td>
<td class="PT_ColHeader_BTBR_normal" align="center"><?=getTranslation('printkupon13')?></td>
<td class="PT_ColHeader_BTBR_normal" align="center"><?=getTranslation('printkupon9')?></td>
<td class="PT_ColHeader_BTBR_normal" align="center"><?=getTranslation('printkupon10')?></td>
</tr>
<?
$sor = sed_sql_query("select * from kupon_ic where kupon_id='$id'");
while($row=sed_sql_fetcharray($sor)) { 
$ob = explode("|",$row['oran_tip']);

$secim_yapimi_kuponguncelle = $ob[0];
$secim_yapimi_kuponguncelle2 = $ob[1];

if($row['spor_tip']=="futbol") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('foran1');
} else if($secim_yapimi_kuponguncelle=="Handikap (0:1)"){
$secilen_translate = getTranslation('foran2');
} else if($secim_yapimi_kuponguncelle=="Handikap (1:0)"){
$secilen_translate = getTranslation('foran3');
} else if($secim_yapimi_kuponguncelle=="Handikap (0:2)"){
$secilen_translate = getTranslation('foran4');
} else if($secim_yapimi_kuponguncelle=="Handikap (2:0)"){
$secilen_translate = getTranslation('foran5');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 1.YARI )"){
$secilen_translate = getTranslation('foran6');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 2.YARI )"){
$secilen_translate = getTranslation('foran7');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Çifte Şans"){
$secilen_translate = getTranslation('foran8');
} else if($secim_yapimi_kuponguncelle=="1.YARI KG"){
$secilen_translate = getTranslation('foran9');
} else if($secim_yapimi_kuponguncelle=="Beraberlikte İade"){
$secilen_translate = getTranslation('foran10');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 0.5"){
$secilen_translate = getTranslation('foran11');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran12');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran13');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran14');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 4.5"){
$secilen_translate = getTranslation('foran15');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran16');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 0.5"){
$secilen_translate = getTranslation('foran18');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran19');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran20');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran21');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 0.5"){
$secilen_translate = getTranslation('foran22');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran23');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran24');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran25');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Gol Atarmı ?"){
$secilen_translate = getTranslation('foran26');
} else if($secim_yapimi_kuponguncelle=="Deplasman Gol Atarmı ?"){
$secilen_translate = getTranslation('foran27');
} else if($secim_yapimi_kuponguncelle=="Karşılıklı Gol"){
$secilen_translate = getTranslation('foran28');
} else if($secim_yapimi_kuponguncelle=="​​​​​1.Yarı Tek/Çift"){
$secilen_translate = getTranslation('foran29');
} else if($secim_yapimi_kuponguncelle=="Tek/Çift"){
$secilen_translate = getTranslation('foran30');
} else if($secim_yapimi_kuponguncelle=="Evsahibi Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran31');
} else if($secim_yapimi_kuponguncelle=="Deplasman Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran32');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran33');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 2.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran34');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran35');
} else if($secim_yapimi_kuponguncelle=="Deplasman 2.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran36');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı A/Ü 0.5"){
$secilen_translate = getTranslation('foran37');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı A/Ü 1.5"){
$secilen_translate = getTranslation('foran38');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı A/Ü 0.5"){
$secilen_translate = getTranslation('foran39');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı A/Ü 1.5"){
$secilen_translate = getTranslation('foran40');
} else if($secim_yapimi_kuponguncelle=="Evsahibi A/Ü 1.5"){
$secilen_translate = getTranslation('foran41');
} else if($secim_yapimi_kuponguncelle=="Deplasman A/Ü 1.5"){
$secilen_translate = getTranslation('foran42');
} else if($secim_yapimi_kuponguncelle=="​​​​​Evsahibi Her 2 yarıda Gol Atar ?"){
$secilen_translate = getTranslation('foran43');
} else if($secim_yapimi_kuponguncelle=="Deplasman Her 2 yarıda Gol Atar ?"){
$secilen_translate = getTranslation('foran44');
} else if($secim_yapimi_kuponguncelle=="Hangi Devrede Fazla Gol Olur"){
$secilen_translate = getTranslation('foran45');
} else if($secim_yapimi_kuponguncelle=="Evsahibi Hangi Devrede Fazla Gol Atar ?"){
$secilen_translate = getTranslation('foran46');
} else if($secim_yapimi_kuponguncelle=="Deplasman Hangi Devrede Fazla Gol Atar ?"){
$secilen_translate = getTranslation('foran47');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-4+)"){
$secilen_translate = getTranslation('foran48');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-5+)"){
$secilen_translate = getTranslation('foran49');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-6+)"){
$secilen_translate = getTranslation('foran50');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 1 gol farkla kazanır mı?"){
$secilen_translate = getTranslation('foran51');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 2 gol farkla kazanır mı?"){
$secilen_translate = getTranslation('foran52');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 3 gol farkla kazanır mı?"){
$secilen_translate = getTranslation('foran53');
} else if($secim_yapimi_kuponguncelle=="1X2 ve toplam gol sayısı"){
$secilen_translate = getTranslation('foran54');
} else if($secim_yapimi_kuponguncelle=="Maç sonucu ve karşılıklı goller"){
$secilen_translate = getTranslation('foran55');
} else if($secim_yapimi_kuponguncelle=="İlk Yarı / Maç Sonucu"){
$secilen_translate = getTranslation('foran56');
} else if($secim_yapimi_kuponguncelle=="Skor Bahsi (90 Dakika)"){
$secilen_translate = getTranslation('foran57');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('foran58');
} else if($secim_yapimi_kuponguncelle=="Toplam Sari Kart Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran59');
} else if($secim_yapimi_kuponguncelle=="Kirmizi kart cikar mi?"){
$secilen_translate = getTranslation('foran60');
} else if($secim_yapimi_kuponguncelle=="Macta kac tane penalti olur?"){
$secilen_translate = getTranslation('foran61');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran62');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran63');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran64');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran65');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran66');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran67');
} else if($secim_yapimi_kuponguncelle=="Sarı Kart Toplam Tek/Çift"){
$secilen_translate = getTranslation('foran68');
} else if($secim_yapimi_kuponguncelle=="Hangi Takım Çok Sarı Kart Yer ?"){
$secilen_translate = getTranslation('foran69');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran70');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 6.5"){
$secilen_translate = getTranslation('foran71');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 7.5"){
$secilen_translate = getTranslation('foran72');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 8.5"){
$secilen_translate = getTranslation('foran73');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 9.5"){
$secilen_translate = getTranslation('foran74');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 10.5"){
$secilen_translate = getTranslation('foran75');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 11.5"){
$secilen_translate = getTranslation('foran76');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 12.5"){
$secilen_translate = getTranslation('foran77');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 13.5"){
$secilen_translate = getTranslation('foran78');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 14.5"){
$secilen_translate = getTranslation('foran79');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 15.5"){
$secilen_translate = getTranslation('foran80');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran81');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran82');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 4.5"){
$secilen_translate = getTranslation('foran83');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran84');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 6.5"){
$secilen_translate = getTranslation('foran85');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 7.5"){
$secilen_translate = getTranslation('foran86');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 8.5"){
$secilen_translate = getTranslation('foran87');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 9.5"){
$secilen_translate = getTranslation('foran88');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 10.5"){
$secilen_translate = getTranslation('foran89');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran90');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran91');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 4.5"){
$secilen_translate = getTranslation('foran92');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran93');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 6.5"){
$secilen_translate = getTranslation('foran94');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 7.5"){
$secilen_translate = getTranslation('foran95');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 8.5"){
$secilen_translate = getTranslation('foran96');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 9.5"){
$secilen_translate = getTranslation('foran97');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 10.5"){
$secilen_translate = getTranslation('foran98');
} else if($secim_yapimi_kuponguncelle=="Korner Toplam Tek/Çift"){
$secilen_translate = getTranslation('foran99');
} else if($secim_yapimi_kuponguncelle=="Hangi Takım Çok Korner Kullanır ?"){
$secilen_translate = getTranslation('foran100');
}

} else if($row['spor_tip']=="basketbol") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ?"){
$secilen_translate = getTranslation('boran1');
} else if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('boran2');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 1.YARI )"){
$secilen_translate = getTranslation('boran3');
} else if($secim_yapimi_kuponguncelle=="Toplam Skor Tek/Çift"){
$secilen_translate = getTranslation('boran4');
} else if($secim_yapimi_kuponguncelle=="Toplam Skor Alt/Üst"){
$secilen_translate = getTranslation('boran5');
} else if($secim_yapimi_kuponguncelle=="Handikap ( 1.YARI )"){
$secilen_translate = getTranslation('boran6');
} else if($secim_yapimi_kuponguncelle=="Handikap"){
$secilen_translate = getTranslation('boran7');
} else if($secim_yapimi_kuponguncelle=="1.Yarı / MS"){
$secilen_translate = getTranslation('boran8');
} else if($secim_yapimi_kuponguncelle=="İki Devrede Kazanır"){
$secilen_translate = getTranslation('boran9');
} else if($secim_yapimi_kuponguncelle=="Tüm Periyotları Kazanır"){
$secilen_translate = getTranslation('boran10');
} else if($secim_yapimi_kuponguncelle=="1.Takım İY Alt/Üst"){
$secilen_translate = getTranslation('boran11');
} else if($secim_yapimi_kuponguncelle=="2.Takım İY Alt/Üst"){
$secilen_translate = getTranslation('boran12');
}

}  else if($row['spor_tip']=="tenis") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ?"){
$secilen_translate = getTranslation('toran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahsi"){
$secilen_translate = getTranslation('toran2');
} else if($secim_yapimi_kuponguncelle=="1.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('toran3');
} else if($secim_yapimi_kuponguncelle=="2.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('toran4');
} else if($secim_yapimi_kuponguncelle=="1.Oyuncu 1 Set Kazanır"){
$secilen_translate = getTranslation('toran5');
} else if($secim_yapimi_kuponguncelle=="2.Oyuncu 1 Set Kazanır"){
$secilen_translate = getTranslation('toran6');
}

} else if($row['spor_tip']=="voleybol") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ?"){
$secilen_translate = getTranslation('voran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahsi"){
$secilen_translate = getTranslation('voran2');
} else if($secim_yapimi_kuponguncelle=="Toplam Alt/Üst"){
$secilen_translate = getTranslation('voran3');
} else if($secim_yapimi_kuponguncelle=="5 Set Sürermi ?"){
$secilen_translate = getTranslation('voran4');
}

} else if($row['spor_tip']=="buzhokeyi") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('buzoran1');
} else if($secim_yapimi_kuponguncelle=="1.P 1X2"){
$secilen_translate = getTranslation('buzoran2');
} else if($secim_yapimi_kuponguncelle=="2.P 1X2"){
$secilen_translate = getTranslation('buzoran3');
} else if($secim_yapimi_kuponguncelle=="3.P 1X2"){
$secilen_translate = getTranslation('buzoran4');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('buzoran5');
} else if($secim_yapimi_kuponguncelle=="1.P Çifte Şans"){
$secilen_translate = getTranslation('buzoran6');
} else if($secim_yapimi_kuponguncelle=="2.P Çifte Şans"){
$secilen_translate = getTranslation('buzoran7');
} else if($secim_yapimi_kuponguncelle=="3.P Çifte Şans"){
$secilen_translate = getTranslation('buzoran8');
}

} else if($row['spor_tip']=="hentbol") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('horan1');
} else if($secim_yapimi_kuponguncelle=="Toplam Alt/Üst"){
$secilen_translate = getTranslation('horan2');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 1.YARI )"){
$secilen_translate = getTranslation('horan3');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Alt/Üst"){
$secilen_translate = getTranslation('horan4');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Tek/Çift"){
$secilen_translate = getTranslation('horan5');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Tek/Çift"){
$secilen_translate = getTranslation('horan6');
} else if($secim_yapimi_kuponguncelle=="Toplam Tek/Çift"){
$secilen_translate = getTranslation('horan7');
}

} else if($row['spor_tip']=="canli") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('fcanlioran1');
} else if($secim_yapimi_kuponguncelle=="Handikap 1:0"){
$secilen_translate = getTranslation('fcanlioran2');
} else if($secim_yapimi_kuponguncelle=="Handikap 2:0"){
$secilen_translate = getTranslation('fcanlioran3');
} else if($secim_yapimi_kuponguncelle=="Handikap 0:1"){
$secilen_translate = getTranslation('fcanlioran4');
} else if($secim_yapimi_kuponguncelle=="Handikap 0:2"){
$secilen_translate = getTranslation('fcanlioran5');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('fcanlioran6');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Çifte Şans"){
$secilen_translate = getTranslation('fcanlioran7');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran8');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran9');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran10');
} else if($secim_yapimi_kuponguncelle=="Toplam 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran11');
} else if($secim_yapimi_kuponguncelle=="Toplam 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran12');
} else if($secim_yapimi_kuponguncelle=="Toplam 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran13');
} else if($secim_yapimi_kuponguncelle=="Toplam 3.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran14');
} else if($secim_yapimi_kuponguncelle=="Toplam 4.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran15');
} else if($secim_yapimi_kuponguncelle=="Toplam 5.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran16');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran17');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran18');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran19');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 3.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran20');
} else if($secim_yapimi_kuponguncelle=="Karşılıklı Gol Olurmu ?"){
$secilen_translate = getTranslation('fcanlioran21');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Müsabakada Gol Atarmı ?"){
$secilen_translate = getTranslation('fcanlioran22');
} else if($secim_yapimi_kuponguncelle=="Deplasman Müsabakada Gol Atarmı ?"){
$secilen_translate = getTranslation('fcanlioran23');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Tek / Çift"){
$secilen_translate = getTranslation('fcanlioran24');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Tek / Çift"){
$secilen_translate = getTranslation('fcanlioran25');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Karşılıklı Gol"){
$secilen_translate = getTranslation('fcanlioran26');
} else if($secim_yapimi_kuponguncelle=="Maç Sonucu ve Karşılıklı Gol"){
$secilen_translate = getTranslation('fcanlioran27');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran28');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran29');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran30');
} else if($secim_yapimi_kuponguncelle=="Deplasman 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran31');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran32');
} else if($secim_yapimi_kuponguncelle=="Deplasman 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran33');
} else if($secim_yapimi_kuponguncelle=="Toplam Kaç Gol Atılır ?"){
$secilen_translate = getTranslation('fcanlioran34');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Toplam Kaç Gol Atar ?"){
$secilen_translate = getTranslation('fcanlioran35');
} else if($secim_yapimi_kuponguncelle=="Deplasman Toplam Kaç Gol Atar ?"){
$secilen_translate = getTranslation('fcanlioran36');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Skoru"){
$secilen_translate = getTranslation('fcanlioran37');
} else if($secim_yapimi_kuponguncelle=="Maç Skoru"){
$secilen_translate = getTranslation('fcanlioran38');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran39');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran40');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran41');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran42');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran43');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran44');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi İlk Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran45');
} else if($secim_yapimi_kuponguncelle=="Ev sahibi İkinci Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran46');
} else if($secim_yapimi_kuponguncelle=="Deplasman İlk Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran47');
} else if($secim_yapimi_kuponguncelle=="Deplasman İkinci Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran48');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 1 Gol Farkla Kazanirmi ?"){
$secilen_translate = getTranslation('fcanlioran49');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 2 Gol Farkla Kazanirmi ?"){
$secilen_translate = getTranslation('fcanlioran50');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 3 Gol Farkla Kazanirmi ?"){
$secilen_translate = getTranslation('fcanlioran51');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Sonucu"){
$secilen_translate = getTranslation('fcanlioran52');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Sonucu"){
$secilen_translate = getTranslation('fcanlioran53');
} else if($secim_yapimi_kuponguncelle=="İlk Yarıda Kaç Gol Olur ?"){
$secilen_translate = getTranslation('fcanlioran54');
} else if($secim_yapimi_kuponguncelle=="2.Yarıda Toplam Kaç Gol Olur ?"){
$secilen_translate = getTranslation('fcanlioran55');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-4+)"){
$secilen_translate = getTranslation('fcanlioran56');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-5+)"){
$secilen_translate = getTranslation('fcanlioran57');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-6+)"){
$secilen_translate = getTranslation('fcanlioran58');
} else if($secim_yapimi_kuponguncelle=="1. yarıda 1.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran59');
} else if($secim_yapimi_kuponguncelle=="1.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran60');
} else if($secim_yapimi_kuponguncelle=="2.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran61');
} else if($secim_yapimi_kuponguncelle=="3.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran62');
} else if($secim_yapimi_kuponguncelle=="4.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran63');
} else if($secim_yapimi_kuponguncelle=="5.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran64');
} else if($secim_yapimi_kuponguncelle=="6.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran65');
}

} else if($row['spor_tip']=="canlib") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('bcanlioran1');
} else if($secim_yapimi_kuponguncelle=="1X2(1.YARI)"){
$secilen_translate = getTranslation('bcanlioran2');
} else if($secim_yapimi_kuponguncelle=="1X2(2.YARI)"){
$secilen_translate = getTranslation('bcanlioran3');
} else if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran4');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran5');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran6');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran7');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran8');
} else if($secim_yapimi_kuponguncelle=="Toplam Skor Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran9');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran10');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran11');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran12');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran13');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran14');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran15');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran16');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran17');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran18');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran19');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran20');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran21');
} else if($secim_yapimi_kuponguncelle=="Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran22');
}

} else if($row['spor_tip']=="canlit") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
$secilen_translate = getTranslation('tcanlioran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahisi"){
$secilen_translate = getTranslation('tcanlioran2');
}

} else if($row['spor_tip']=="canliv") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
$secilen_translate = getTranslation('vcanlioran1');
} else if($secim_yapimi_kuponguncelle=="1.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran2');
} else if($secim_yapimi_kuponguncelle=="2.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran3');
} else if($secim_yapimi_kuponguncelle=="3.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran4');
} else if($secim_yapimi_kuponguncelle=="4.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran5');
} else if($secim_yapimi_kuponguncelle=="Set bahisi (5 maç üzerinden)"){
$secilen_translate = getTranslation('vcanlioran6');
} else if($secim_yapimi_kuponguncelle=="Toplam Kaç Set Oynanır ?"){
$secilen_translate = getTranslation('vcanlioran7');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran8');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran9');
} else if($secim_yapimi_kuponguncelle=="1.Takım 1.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran10');
} else if($secim_yapimi_kuponguncelle=="2.Takım 1.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran11');
} else if($secim_yapimi_kuponguncelle=="1.Takım 2.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran12');
} else if($secim_yapimi_kuponguncelle=="2.Takım 2.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran13');
} else if($secim_yapimi_kuponguncelle=="1.Takım 3.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran14');
} else if($secim_yapimi_kuponguncelle=="2.Takım 3.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran15');
} else if($secim_yapimi_kuponguncelle=="1.Takım 4.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran16');
} else if($secim_yapimi_kuponguncelle=="2.Takım 4.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran17');
} else if($secim_yapimi_kuponguncelle=="Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran18');
} else if($secim_yapimi_kuponguncelle=="Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran19');
} else if($secim_yapimi_kuponguncelle=="1.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran20');
} else if($secim_yapimi_kuponguncelle=="2.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran21');
} else if($secim_yapimi_kuponguncelle=="3.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran22');
} else if($secim_yapimi_kuponguncelle=="4.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran23');
} else if($secim_yapimi_kuponguncelle=="Müsabaka 5.Set Sürermi"){
$secilen_translate = getTranslation('vcanlioran24');
}

} else if($row['spor_tip']=="canlibuz") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('buzcanlioran1');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('buzcanlioran2');
} else if($secim_yapimi_kuponguncelle=="Cifte Sans"){
$secilen_translate = getTranslation('buzcanlioran2');
} else if($secim_yapimi_kuponguncelle=="Hangi periyod daha cok gol olur?"){
$secilen_translate = getTranslation('buzcanlioran3');
}

}

if($dil_bilgisi22['language']=='en'){

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "Y";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "N";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "U";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "O";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 and O";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 and O";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 and U";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 and U";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 and Y";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 and Y";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 and N";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 and N";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "No Goal";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "X and Y";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "D";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "S";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else if($dil_bilgisi22['language']=='de'){ 

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "J";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "K";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "N";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "T";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 und T";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 und T";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 und N";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 und N";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 und J";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 und J";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 und K";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 und K";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "Kein Ziel";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "X und J";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "P";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "E";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else if($dil_bilgisi22['language']=='ar'){ 

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "أجل";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "لا";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "أدنى";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "أعلى";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 وما فوق";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 وما فوق";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 و السفلى";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 و السفلى";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 و نعم";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 و نعم";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 و لا";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 و لا";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "لا هدف";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "س ونعم";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "زوجان";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "واحد";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else if($dil_bilgisi22['language']=='ru'){ 

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "да";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "нет";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "ниже";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "топ";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 и выше";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 и выше";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 и ниже";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 и ниже";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 и да";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 и да";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 и нет";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 и нет";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "Нет цели";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "Х и да";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "пара";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "один";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

?>
<tr class='PT_R_1'>
<td class="PT_Col_BLR_Center"><?=$row['mac_kodu']; ?></td>
<td class="PT_Col_BR">&#160;<?=$row['ev_takim'];?> - <?=$row['konuk_takim'];?> </td>
<td class="PT_Col_BR_Center"><?=$secilen_translate;?></td>
<td class="PT_Col_BR_Center"><?=$secilen_translate2;?> <? if(!empty($row['oran_val'])) { echo "($row[oran_val])"; } ?></td>
<td class="PT_Col_BR_Center"><?=nf($row['oran']); ?></td>
<td class="PT_Col_BR_Center"><? if($row['spor_tip']!="canli" || $row['spor_tip']!="canlibasket") { ?><?=date("d-m H:i",$row['mac_time']); ?><? } ?></td>
</tr><? } ?><tr>
<td class="PT_F" colspan="8"><img src="/players/img/print/ticket/4/dot.gif" height="1"></td>
</tr>
</table>
</td>
</tr>
</table>
<br>
<? } else if($ub['yazici_tip']=="3") { ?>
<style>body{font-size:13px;}</style>
</head>
<body>
<table width="640px" cellpadding="0" cellspacing="0">
<tr>
<td valign="top">
<table width="640px" cellpadding="0" cellspacing="0" style="border:1px solid #000; font-size:12px;">
<tr style="background:#ccc;">
<td align="center" style="border-bottom: 1px solid #000;"><?=getTranslation('printkupon18')?></td>
<td align="center" style="border-bottom: 1px solid #000;"><?=getTranslation('printkupon19')?></td>
<td align="center" style="border-bottom: 1px solid #000;"><?=getTranslation('printkupon9')?></td>
<td align="center" style="border-bottom: 1px solid #000;"><?=getTranslation('printkupon8')?></td>
<td align="center" style="border-bottom: 1px solid #000;"><?=getTranslation('printkupon10')?></td>
<td align="center" style="border-bottom: 1px solid #000;"><?=getTranslation('printkupon20')?></td>
</tr>
<tr>
<td align="center" style="border-bottom: 1px solid #000;"><?=$kupon['id']; ?></td>
<td align="center" style="border-bottom: 1px solid #000;"><?=nf($kupon['yatan']); ?> <?=getTranslation('parabirimi')?></td>
<td align="center" style="border-bottom: 1px solid #000;"><?=nf($kupon['oran']); ?></td>
<td align="center" style="border-bottom: 1px solid #000;"><?=nf($kupon['tutar']); ?> <?=getTranslation('parabirimi')?></td>
<td align="center" style="border-bottom: 1px solid #000;"><?=date("d-m-Y H:i",$kupon['kupon_time']); ?></td>
<td align="center" style="border-bottom: 1px solid #000;"><?=$ubsi['ciktimesaj']; ?></td>
</tr>
</table>
<br>
<table width="640px" cellpadding="0" cellspacing="0" style="border:1px solid #000; font-size:12px;">
<tr style="background:#ccc;">
<td align="center" style="border-bottom: 1px solid #000;"><?=getTranslation('printkupon11')?></td>
<td align="left" style="border-bottom: 1px solid #000;"><?=getTranslation('printkupon12')?></td>
<td align="center" style="border-bottom: 1px solid #000;"><?=getTranslation('printkupon16')?></td>
<td align="center" style="border-bottom: 1px solid #000;"><?=getTranslation('printkupon13')?></td>
<td align="center" style="border-bottom: 1px solid #000;"><?=getTranslation('printkupon9')?></td>
<td align="center" style="border-bottom: 1px solid #000;"><?=getTranslation('printkupon10')?></td>
</tr>

<?
$sor = sed_sql_query("select * from kupon_ic where kupon_id='$id'");
while($row=sed_sql_fetcharray($sor)) { 
$ob = explode("|",$row['oran_tip']);

$secim_yapimi_kuponguncelle = $ob[0];
$secim_yapimi_kuponguncelle2 = $ob[1];

if($row['spor_tip']=="futbol") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('foran1');
} else if($secim_yapimi_kuponguncelle=="Handikap (0:1)"){
$secilen_translate = getTranslation('foran2');
} else if($secim_yapimi_kuponguncelle=="Handikap (1:0)"){
$secilen_translate = getTranslation('foran3');
} else if($secim_yapimi_kuponguncelle=="Handikap (0:2)"){
$secilen_translate = getTranslation('foran4');
} else if($secim_yapimi_kuponguncelle=="Handikap (2:0)"){
$secilen_translate = getTranslation('foran5');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 1.YARI )"){
$secilen_translate = getTranslation('foran6');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 2.YARI )"){
$secilen_translate = getTranslation('foran7');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Çifte Şans"){
$secilen_translate = getTranslation('foran8');
} else if($secim_yapimi_kuponguncelle=="1.YARI KG"){
$secilen_translate = getTranslation('foran9');
} else if($secim_yapimi_kuponguncelle=="Beraberlikte İade"){
$secilen_translate = getTranslation('foran10');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 0.5"){
$secilen_translate = getTranslation('foran11');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran12');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran13');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran14');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 4.5"){
$secilen_translate = getTranslation('foran15');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran16');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 0.5"){
$secilen_translate = getTranslation('foran18');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran19');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran20');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran21');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 0.5"){
$secilen_translate = getTranslation('foran22');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran23');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran24');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran25');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Gol Atarmı ?"){
$secilen_translate = getTranslation('foran26');
} else if($secim_yapimi_kuponguncelle=="Deplasman Gol Atarmı ?"){
$secilen_translate = getTranslation('foran27');
} else if($secim_yapimi_kuponguncelle=="Karşılıklı Gol"){
$secilen_translate = getTranslation('foran28');
} else if($secim_yapimi_kuponguncelle=="​​​​​1.Yarı Tek/Çift"){
$secilen_translate = getTranslation('foran29');
} else if($secim_yapimi_kuponguncelle=="Tek/Çift"){
$secilen_translate = getTranslation('foran30');
} else if($secim_yapimi_kuponguncelle=="Evsahibi Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran31');
} else if($secim_yapimi_kuponguncelle=="Deplasman Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran32');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran33');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 2.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran34');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran35');
} else if($secim_yapimi_kuponguncelle=="Deplasman 2.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran36');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı A/Ü 0.5"){
$secilen_translate = getTranslation('foran37');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı A/Ü 1.5"){
$secilen_translate = getTranslation('foran38');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı A/Ü 0.5"){
$secilen_translate = getTranslation('foran39');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı A/Ü 1.5"){
$secilen_translate = getTranslation('foran40');
} else if($secim_yapimi_kuponguncelle=="Evsahibi A/Ü 1.5"){
$secilen_translate = getTranslation('foran41');
} else if($secim_yapimi_kuponguncelle=="Deplasman A/Ü 1.5"){
$secilen_translate = getTranslation('foran42');
} else if($secim_yapimi_kuponguncelle=="​​​​​Evsahibi Her 2 yarıda Gol Atar ?"){
$secilen_translate = getTranslation('foran43');
} else if($secim_yapimi_kuponguncelle=="Deplasman Her 2 yarıda Gol Atar ?"){
$secilen_translate = getTranslation('foran44');
} else if($secim_yapimi_kuponguncelle=="Hangi Devrede Fazla Gol Olur"){
$secilen_translate = getTranslation('foran45');
} else if($secim_yapimi_kuponguncelle=="Evsahibi Hangi Devrede Fazla Gol Atar ?"){
$secilen_translate = getTranslation('foran46');
} else if($secim_yapimi_kuponguncelle=="Deplasman Hangi Devrede Fazla Gol Atar ?"){
$secilen_translate = getTranslation('foran47');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-4+)"){
$secilen_translate = getTranslation('foran48');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-5+)"){
$secilen_translate = getTranslation('foran49');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-6+)"){
$secilen_translate = getTranslation('foran50');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 1 gol farkla kazanır mı?"){
$secilen_translate = getTranslation('foran51');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 2 gol farkla kazanır mı?"){
$secilen_translate = getTranslation('foran52');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 3 gol farkla kazanır mı?"){
$secilen_translate = getTranslation('foran53');
} else if($secim_yapimi_kuponguncelle=="1X2 ve toplam gol sayısı"){
$secilen_translate = getTranslation('foran54');
} else if($secim_yapimi_kuponguncelle=="Maç sonucu ve karşılıklı goller"){
$secilen_translate = getTranslation('foran55');
} else if($secim_yapimi_kuponguncelle=="İlk Yarı / Maç Sonucu"){
$secilen_translate = getTranslation('foran56');
} else if($secim_yapimi_kuponguncelle=="Skor Bahsi (90 Dakika)"){
$secilen_translate = getTranslation('foran57');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('foran58');
} else if($secim_yapimi_kuponguncelle=="Toplam Sari Kart Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran59');
} else if($secim_yapimi_kuponguncelle=="Kirmizi kart cikar mi?"){
$secilen_translate = getTranslation('foran60');
} else if($secim_yapimi_kuponguncelle=="Macta kac tane penalti olur?"){
$secilen_translate = getTranslation('foran61');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran62');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran63');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran64');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran65');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran66');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran67');
} else if($secim_yapimi_kuponguncelle=="Sarı Kart Toplam Tek/Çift"){
$secilen_translate = getTranslation('foran68');
} else if($secim_yapimi_kuponguncelle=="Hangi Takım Çok Sarı Kart Yer ?"){
$secilen_translate = getTranslation('foran69');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran70');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 6.5"){
$secilen_translate = getTranslation('foran71');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 7.5"){
$secilen_translate = getTranslation('foran72');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 8.5"){
$secilen_translate = getTranslation('foran73');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 9.5"){
$secilen_translate = getTranslation('foran74');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 10.5"){
$secilen_translate = getTranslation('foran75');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 11.5"){
$secilen_translate = getTranslation('foran76');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 12.5"){
$secilen_translate = getTranslation('foran77');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 13.5"){
$secilen_translate = getTranslation('foran78');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 14.5"){
$secilen_translate = getTranslation('foran79');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 15.5"){
$secilen_translate = getTranslation('foran80');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran81');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran82');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 4.5"){
$secilen_translate = getTranslation('foran83');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran84');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 6.5"){
$secilen_translate = getTranslation('foran85');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 7.5"){
$secilen_translate = getTranslation('foran86');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 8.5"){
$secilen_translate = getTranslation('foran87');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 9.5"){
$secilen_translate = getTranslation('foran88');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 10.5"){
$secilen_translate = getTranslation('foran89');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran90');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran91');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 4.5"){
$secilen_translate = getTranslation('foran92');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran93');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 6.5"){
$secilen_translate = getTranslation('foran94');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 7.5"){
$secilen_translate = getTranslation('foran95');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 8.5"){
$secilen_translate = getTranslation('foran96');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 9.5"){
$secilen_translate = getTranslation('foran97');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 10.5"){
$secilen_translate = getTranslation('foran98');
} else if($secim_yapimi_kuponguncelle=="Korner Toplam Tek/Çift"){
$secilen_translate = getTranslation('foran99');
} else if($secim_yapimi_kuponguncelle=="Hangi Takım Çok Korner Kullanır ?"){
$secilen_translate = getTranslation('foran100');
}

} else if($row['spor_tip']=="basketbol") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ?"){
$secilen_translate = getTranslation('boran1');
} else if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('boran2');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 1.YARI )"){
$secilen_translate = getTranslation('boran3');
} else if($secim_yapimi_kuponguncelle=="Toplam Skor Tek/Çift"){
$secilen_translate = getTranslation('boran4');
} else if($secim_yapimi_kuponguncelle=="Toplam Skor Alt/Üst"){
$secilen_translate = getTranslation('boran5');
} else if($secim_yapimi_kuponguncelle=="Handikap ( 1.YARI )"){
$secilen_translate = getTranslation('boran6');
} else if($secim_yapimi_kuponguncelle=="Handikap"){
$secilen_translate = getTranslation('boran7');
} else if($secim_yapimi_kuponguncelle=="1.Yarı / MS"){
$secilen_translate = getTranslation('boran8');
} else if($secim_yapimi_kuponguncelle=="İki Devrede Kazanır"){
$secilen_translate = getTranslation('boran9');
} else if($secim_yapimi_kuponguncelle=="Tüm Periyotları Kazanır"){
$secilen_translate = getTranslation('boran10');
} else if($secim_yapimi_kuponguncelle=="1.Takım İY Alt/Üst"){
$secilen_translate = getTranslation('boran11');
} else if($secim_yapimi_kuponguncelle=="2.Takım İY Alt/Üst"){
$secilen_translate = getTranslation('boran12');
}

}  else if($row['spor_tip']=="tenis") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ?"){
$secilen_translate = getTranslation('toran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahsi"){
$secilen_translate = getTranslation('toran2');
} else if($secim_yapimi_kuponguncelle=="1.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('toran3');
} else if($secim_yapimi_kuponguncelle=="2.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('toran4');
} else if($secim_yapimi_kuponguncelle=="1.Oyuncu 1 Set Kazanır"){
$secilen_translate = getTranslation('toran5');
} else if($secim_yapimi_kuponguncelle=="2.Oyuncu 1 Set Kazanır"){
$secilen_translate = getTranslation('toran6');
}

} else if($row['spor_tip']=="voleybol") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ?"){
$secilen_translate = getTranslation('voran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahsi"){
$secilen_translate = getTranslation('voran2');
} else if($secim_yapimi_kuponguncelle=="Toplam Alt/Üst"){
$secilen_translate = getTranslation('voran3');
} else if($secim_yapimi_kuponguncelle=="5 Set Sürermi ?"){
$secilen_translate = getTranslation('voran4');
}

} else if($row['spor_tip']=="buzhokeyi") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('buzoran1');
} else if($secim_yapimi_kuponguncelle=="1.P 1X2"){
$secilen_translate = getTranslation('buzoran2');
} else if($secim_yapimi_kuponguncelle=="2.P 1X2"){
$secilen_translate = getTranslation('buzoran3');
} else if($secim_yapimi_kuponguncelle=="3.P 1X2"){
$secilen_translate = getTranslation('buzoran4');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('buzoran5');
} else if($secim_yapimi_kuponguncelle=="1.P Çifte Şans"){
$secilen_translate = getTranslation('buzoran6');
} else if($secim_yapimi_kuponguncelle=="2.P Çifte Şans"){
$secilen_translate = getTranslation('buzoran7');
} else if($secim_yapimi_kuponguncelle=="3.P Çifte Şans"){
$secilen_translate = getTranslation('buzoran8');
}

} else if($row['spor_tip']=="hentbol") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('horan1');
} else if($secim_yapimi_kuponguncelle=="Toplam Alt/Üst"){
$secilen_translate = getTranslation('horan2');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 1.YARI )"){
$secilen_translate = getTranslation('horan3');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Alt/Üst"){
$secilen_translate = getTranslation('horan4');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Tek/Çift"){
$secilen_translate = getTranslation('horan5');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Tek/Çift"){
$secilen_translate = getTranslation('horan6');
} else if($secim_yapimi_kuponguncelle=="Toplam Tek/Çift"){
$secilen_translate = getTranslation('horan7');
}

} else if($row['spor_tip']=="canli") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('fcanlioran1');
} else if($secim_yapimi_kuponguncelle=="Handikap 1:0"){
$secilen_translate = getTranslation('fcanlioran2');
} else if($secim_yapimi_kuponguncelle=="Handikap 2:0"){
$secilen_translate = getTranslation('fcanlioran3');
} else if($secim_yapimi_kuponguncelle=="Handikap 0:1"){
$secilen_translate = getTranslation('fcanlioran4');
} else if($secim_yapimi_kuponguncelle=="Handikap 0:2"){
$secilen_translate = getTranslation('fcanlioran5');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('fcanlioran6');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Çifte Şans"){
$secilen_translate = getTranslation('fcanlioran7');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran8');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran9');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran10');
} else if($secim_yapimi_kuponguncelle=="Toplam 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran11');
} else if($secim_yapimi_kuponguncelle=="Toplam 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran12');
} else if($secim_yapimi_kuponguncelle=="Toplam 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran13');
} else if($secim_yapimi_kuponguncelle=="Toplam 3.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran14');
} else if($secim_yapimi_kuponguncelle=="Toplam 4.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran15');
} else if($secim_yapimi_kuponguncelle=="Toplam 5.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran16');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran17');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran18');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran19');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 3.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran20');
} else if($secim_yapimi_kuponguncelle=="Karşılıklı Gol Olurmu ?"){
$secilen_translate = getTranslation('fcanlioran21');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Müsabakada Gol Atarmı ?"){
$secilen_translate = getTranslation('fcanlioran22');
} else if($secim_yapimi_kuponguncelle=="Deplasman Müsabakada Gol Atarmı ?"){
$secilen_translate = getTranslation('fcanlioran23');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Tek / Çift"){
$secilen_translate = getTranslation('fcanlioran24');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Tek / Çift"){
$secilen_translate = getTranslation('fcanlioran25');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Karşılıklı Gol"){
$secilen_translate = getTranslation('fcanlioran26');
} else if($secim_yapimi_kuponguncelle=="Maç Sonucu ve Karşılıklı Gol"){
$secilen_translate = getTranslation('fcanlioran27');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran28');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran29');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran30');
} else if($secim_yapimi_kuponguncelle=="Deplasman 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran31');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran32');
} else if($secim_yapimi_kuponguncelle=="Deplasman 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran33');
} else if($secim_yapimi_kuponguncelle=="Toplam Kaç Gol Atılır ?"){
$secilen_translate = getTranslation('fcanlioran34');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Toplam Kaç Gol Atar ?"){
$secilen_translate = getTranslation('fcanlioran35');
} else if($secim_yapimi_kuponguncelle=="Deplasman Toplam Kaç Gol Atar ?"){
$secilen_translate = getTranslation('fcanlioran36');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Skoru"){
$secilen_translate = getTranslation('fcanlioran37');
} else if($secim_yapimi_kuponguncelle=="Maç Skoru"){
$secilen_translate = getTranslation('fcanlioran38');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran39');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran40');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran41');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran42');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran43');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran44');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi İlk Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran45');
} else if($secim_yapimi_kuponguncelle=="Ev sahibi İkinci Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran46');
} else if($secim_yapimi_kuponguncelle=="Deplasman İlk Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran47');
} else if($secim_yapimi_kuponguncelle=="Deplasman İkinci Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran48');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 1 Gol Farkla Kazanirmi ?"){
$secilen_translate = getTranslation('fcanlioran49');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 2 Gol Farkla Kazanirmi ?"){
$secilen_translate = getTranslation('fcanlioran50');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 3 Gol Farkla Kazanirmi ?"){
$secilen_translate = getTranslation('fcanlioran51');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Sonucu"){
$secilen_translate = getTranslation('fcanlioran52');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Sonucu"){
$secilen_translate = getTranslation('fcanlioran53');
} else if($secim_yapimi_kuponguncelle=="İlk Yarıda Kaç Gol Olur ?"){
$secilen_translate = getTranslation('fcanlioran54');
} else if($secim_yapimi_kuponguncelle=="2.Yarıda Toplam Kaç Gol Olur ?"){
$secilen_translate = getTranslation('fcanlioran55');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-4+)"){
$secilen_translate = getTranslation('fcanlioran56');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-5+)"){
$secilen_translate = getTranslation('fcanlioran57');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-6+)"){
$secilen_translate = getTranslation('fcanlioran58');
} else if($secim_yapimi_kuponguncelle=="1. yarıda 1.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran59');
} else if($secim_yapimi_kuponguncelle=="1.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran60');
} else if($secim_yapimi_kuponguncelle=="2.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran61');
} else if($secim_yapimi_kuponguncelle=="3.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran62');
} else if($secim_yapimi_kuponguncelle=="4.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran63');
} else if($secim_yapimi_kuponguncelle=="5.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran64');
} else if($secim_yapimi_kuponguncelle=="6.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran65');
}

} else if($row['spor_tip']=="canlib") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('bcanlioran1');
} else if($secim_yapimi_kuponguncelle=="1X2(1.YARI)"){
$secilen_translate = getTranslation('bcanlioran2');
} else if($secim_yapimi_kuponguncelle=="1X2(2.YARI)"){
$secilen_translate = getTranslation('bcanlioran3');
} else if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran4');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran5');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran6');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran7');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran8');
} else if($secim_yapimi_kuponguncelle=="Toplam Skor Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran9');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran10');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran11');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran12');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran13');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran14');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran15');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran16');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran17');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran18');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran19');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran20');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran21');
} else if($secim_yapimi_kuponguncelle=="Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran22');
}

} else if($row['spor_tip']=="canlit") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
$secilen_translate = getTranslation('tcanlioran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahisi"){
$secilen_translate = getTranslation('tcanlioran2');
}

} else if($row['spor_tip']=="canliv") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
$secilen_translate = getTranslation('vcanlioran1');
} else if($secim_yapimi_kuponguncelle=="1.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran2');
} else if($secim_yapimi_kuponguncelle=="2.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran3');
} else if($secim_yapimi_kuponguncelle=="3.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran4');
} else if($secim_yapimi_kuponguncelle=="4.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran5');
} else if($secim_yapimi_kuponguncelle=="Set bahisi (5 maç üzerinden)"){
$secilen_translate = getTranslation('vcanlioran6');
} else if($secim_yapimi_kuponguncelle=="Toplam Kaç Set Oynanır ?"){
$secilen_translate = getTranslation('vcanlioran7');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran8');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran9');
} else if($secim_yapimi_kuponguncelle=="1.Takım 1.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran10');
} else if($secim_yapimi_kuponguncelle=="2.Takım 1.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran11');
} else if($secim_yapimi_kuponguncelle=="1.Takım 2.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran12');
} else if($secim_yapimi_kuponguncelle=="2.Takım 2.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran13');
} else if($secim_yapimi_kuponguncelle=="1.Takım 3.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran14');
} else if($secim_yapimi_kuponguncelle=="2.Takım 3.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran15');
} else if($secim_yapimi_kuponguncelle=="1.Takım 4.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran16');
} else if($secim_yapimi_kuponguncelle=="2.Takım 4.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran17');
} else if($secim_yapimi_kuponguncelle=="Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran18');
} else if($secim_yapimi_kuponguncelle=="Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran19');
} else if($secim_yapimi_kuponguncelle=="1.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran20');
} else if($secim_yapimi_kuponguncelle=="2.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran21');
} else if($secim_yapimi_kuponguncelle=="3.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran22');
} else if($secim_yapimi_kuponguncelle=="4.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran23');
} else if($secim_yapimi_kuponguncelle=="Müsabaka 5.Set Sürermi"){
$secilen_translate = getTranslation('vcanlioran24');
}

} else if($row['spor_tip']=="canlibuz") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('buzcanlioran1');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('buzcanlioran2');
} else if($secim_yapimi_kuponguncelle=="Cifte Sans"){
$secilen_translate = getTranslation('buzcanlioran2');
} else if($secim_yapimi_kuponguncelle=="Hangi periyod daha cok gol olur?"){
$secilen_translate = getTranslation('buzcanlioran3');
}

}

if($dil_bilgisi22['language']=='en'){

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "Y";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "N";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "U";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "O";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 and O";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 and O";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 and U";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 and U";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 and Y";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 and Y";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 and N";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 and N";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "No Goal";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "X and Y";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "D";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "S";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else if($dil_bilgisi22['language']=='de'){ 

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "J";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "K";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "N";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "T";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 und T";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 und T";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 und N";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 und N";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 und J";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 und J";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 und K";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 und K";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "Kein Ziel";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "X und J";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "P";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "E";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else if($dil_bilgisi22['language']=='ar'){ 

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "أجل";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "لا";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "أدنى";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "أعلى";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 وما فوق";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 وما فوق";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 و السفلى";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 و السفلى";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 و نعم";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 و نعم";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 و لا";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 و لا";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "لا هدف";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "س ونعم";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "زوجان";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "واحد";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else if($dil_bilgisi22['language']=='ru'){ 

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "да";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "нет";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "ниже";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "топ";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 и выше";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 и выше";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 и ниже";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 и ниже";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 и да";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 и да";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 и нет";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 и нет";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "Нет цели";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "Х и да";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "пара";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "один";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

?>

<tr>
<td align="center"><?=$row['mac_kodu']; ?></td>
<td align="left"><?=$row['ev_takim'];?> - <?=$row['konuk_takim'];?> </td>
<td align="center" nowrap><?=$secilen_translate;?></td>
<td align="center" nowrap><?=$secilen_translate2;?> <? if(!empty($row['oran_val'])) { echo "($row[oran_val])"; } ?></td>
<td align="center"><?=nf($row['oran']); ?></td>
<td align="center"><? if($row['spor_tip']!="canli" || $row['spor_tip']!="canlibasket") { ?><?=date("d-m H:i",$row['mac_time']); ?><? } ?></td>
</tr>

<? } ?>

<tr>
<td colspan="7"><br>
<center>
<span style="font-size:11px"></span>
</center>
</td>
</tr>
</table>
</td>
</tr>
</table>
<? } else if($ub['yazici_tip']=="2") { ?>
<style type="text/css">tr{mso-height-source:auto;}col{mso-width-source:auto;}br{mso-data-placement:same-cell;}.style0{mso-number-format:General;text-align:general;vertical-align:bottom;white-space:nowrap;mso-rotate:0;mso-background-source:auto;mso-pattern:auto;color:black;font-size:11.0pt;font-weight:400;font-style:normal;text-decoration:none;font-family:Calibri,sans-serif;mso-font-charset:162;border:none;mso-protection:locked visible;mso-style-name:Normal;mso-style-id:0;}td{mso-style-parent:style0;padding-top:1px;padding-right:1px;padding-left:1px;mso-ignore:padding;color:black;font-size:11.0pt;font-weight:400;font-style:normal;text-decoration:none;font-family:Calibri,sans-serif;mso-font-charset:162;mso-number-format:General;text-align:general;vertical-align:bottom;border:none;mso-background-source:auto;mso-pattern:auto;mso-protection:locked visible;white-space:nowrap;mso-rotate:0;}.xl65{mso-style-parent:style0;font-family:Arial,sans-serif;mso-font-charset:162;border-top:none;border-right:none;border-bottom:none;border-left:.5pt solid windowtext;}.xl66{mso-style-parent:style0;font-family:Arial,sans-serif;mso-font-charset:162;}.xl67{mso-style-parent:style0;font-family:Arial,sans-serif;mso-font-charset:162;border-top:.5pt solid windowtext;border-right:none;border-bottom:none;border-left:none;}.xl68{mso-style-parent:style0;font-size:6.0pt;font-weight:700;font-family:Arial,sans-serif;mso-font-charset:162;}.xl69{mso-style-parent:style0;font-size:7.0pt;font-weight:700;font-family:Arial,sans-serif;mso-font-charset:162;vertical-align:top;}.xl70{mso-style-parent:style0;font-size:9.0pt;font-weight:700;font-family:Arial,sans-serif;mso-font-charset:162;mso-number-format:"\@";text-align:right;border-top:none;border-right:.5pt solid windowtext;border-bottom:none;border-left:none;}.xl71{mso-style-parent:style0;font-size:9.0pt;font-weight:700;font-family:Arial,sans-serif;mso-font-charset:162;mso-number-format:"\@";text-align:right;}.xl72{mso-style-parent:style0;font-size:8.0pt;font-weight:700;font-family:Arial,sans-serif;mso-font-charset:162;mso-number-format:"\@";text-align:right;border-top:.5pt dashed windowtext;border-right:.5pt solid windowtext;border-bottom:none;border-left:none;}.xl73{mso-style-parent:style0;font-size:8.0pt;font-weight:700;font-family:Arial,sans-serif;mso-font-charset:162;mso-number-format:"\@";text-align:right;border-top:none;border-right:none;border-bottom:.5pt dashed windowtext;border-left:none;}.xl74{mso-style-parent:style0;font-size:9.0pt;font-weight:700;font-style:italic;font-family:Arial,sans-serif;mso-font-charset:162;border-top:.5pt dashed windowtext;border-right:none;border-bottom:none;border-left:.5pt solid windowtext;}.xl75{mso-style-parent:style0;font-size:9.0pt;font-weight:700;font-style:italic;font-family:Arial,sans-serif;mso-font-charset:162;border-top:.5pt dashed windowtext;border-right:none;border-bottom:none;border-left:none;}.xl76{mso-style-parent:style0;font-size:9.0pt;font-weight:700;font-style:italic;font-family:Arial,sans-serif;mso-font-charset:162;border-top:none;border-right:none;border-bottom:none;border-left:.5pt solid windowtext;}.xl77{mso-style-parent:style0;font-size:9.0pt;font-weight:700;font-style:italic;font-family:Arial,sans-serif;mso-font-charset:162;}.xl78{mso-style-parent:style0;font-size:8.0pt;font-weight:700;font-family:Arial,sans-serif;mso-font-charset:162;text-align:center;border-top:.5pt solid windowtext;border-right:none;border-bottom:.5pt solid windowtext;border-left:.5pt solid windowtext;background:#BFBFBF;mso-pattern:black none;}.xl79{mso-style-parent:style0;font-size:8.0pt;font-weight:700;font-family:Arial,sans-serif;mso-font-charset:162;text-align:center;border-top:.5pt solid windowtext;border-right:none;border-bottom:.5pt solid windowtext;border-left:none;background:#BFBFBF;mso-pattern:black none;}.xl80{mso-style-parent:style0;font-size:8.0pt;font-weight:700;font-family:Arial,sans-serif;mso-font-charset:162;text-align:center;border-top:.5pt solid windowtext;border-right:.5pt solid windowtext;border-bottom:.5pt solid windowtext;border-left:none;background:#BFBFBF;mso-pattern:black none;}.xl81{mso-style-parent:style0;font-size:7.0pt;font-weight:700;font-family:Arial,sans-serif;mso-font-charset:162;mso-number-format:"\@";text-align:center;vertical-align:middle;border-top:.5pt dashed windowtext;border-right:none;border-bottom:none;border-left:.5pt solid windowtext;}.xl82{mso-style-parent:style0;font-size:7.0pt;font-weight:700;font-family:Arial,sans-serif;mso-font-charset:162;mso-number-format:"\@";text-align:center;vertical-align:middle;border-top:none;border-right:none;border-bottom:.5pt dashed windowtext;border-left:.5pt solid windowtext;}.xl83{mso-style-parent:style0;font-size:7.0pt;font-weight:700;font-style:italic;font-family:Arial,sans-serif;mso-font-charset:162;text-align:center;border-top:.5pt solid windowtext;border-right:none;border-bottom:none;border-left:.5pt solid windowtext;}.xl84{mso-style-parent:style0;font-size:7.0pt;font-weight:700;font-style:italic;font-family:Arial,sans-serif;mso-font-charset:162;text-align:center;border-top:.5pt solid windowtext;border-right:none;border-bottom:none;border-left:none;}.xl85{mso-style-parent:style0;font-size:7.0pt;font-weight:700;font-style:italic;font-family:Arial,sans-serif;mso-font-charset:162;text-align:center;border-top:.5pt solid windowtext;border-right:.5pt solid windowtext;border-bottom:none;border-left:none;}.xl86{mso-style-parent:style0;font-size:7.5pt;font-weight:700;font-family:Arial,sans-serif;mso-font-charset:162;vertical-align:justify;border-top:.5pt dashed windowtext;border-right:none;border-bottom:none;border-left:none;}.xl87{mso-style-parent:style0;font-size:7.5pt;font-weight:700;font-family:Arial,sans-serif;mso-font-charset:162;border-top:none;border-right:none;border-bottom:.5pt dashed windowtext;border-left:none;}.xl88{mso-style-parent:style0;font-size:7.0pt;font-weight:700;font-style:italic;font-family:Arial,sans-serif;mso-font-charset:162;border-top:.5pt solid windowtext;border-right:none;border-bottom:none;border-left:.5pt solid windowtext;}.xl89{mso-style-parent:style0;font-size:7.0pt;font-weight:700;font-style:italic;font-family:Arial,sans-serif;mso-font-charset:162;border-top:.5pt solid windowtext;border-right:none;border-bottom:none;border-left:none;}.xl90{mso-style-parent:style0;font-size:7.0pt;font-weight:700;font-family:Arial,sans-serif;mso-font-charset:162;border-top:none;border-right:none;border-bottom:.5pt solid windowtext;border-left:.5pt solid windowtext;}.xl91{mso-style-parent:style0;font-size:7.0pt;font-weight:700;font-family:Arial,sans-serif;mso-font-charset:162;border-top:none;border-right:none;border-bottom:.5pt solid windowtext;border-left:none;}.xl92{mso-style-parent:style0;font-size:7.0pt;font-weight:700;font-family:Arial,sans-serif;mso-font-charset:162;text-align:center;border-top:none;border-right:none;border-bottom:.5pt solid windowtext;border-left:none;}.xl93{mso-style-parent:style0;font-size:7.0pt;font-weight:700;font-family:Arial,sans-serif;mso-font-charset:162;text-align:center;border-top:none;border-right:.5pt solid windowtext;border-bottom:.5pt solid windowtext;border-left:none;}</style>
<script type="text/javascript">
function printPage(){if(window.print)window.print();}
</script>
</head>
<body link="blue" vlink="purple">
<table border=0 cellpadding=0 cellspacing=0 width=569 style='border-collapse:collapse;table-layout:fixed;width:427pt'>
<col width=32 style='mso-width-source:userset;mso-width-alt:1170;width:24pt'>
<col width=52 style='mso-width-source:userset;mso-width-alt:1901;width:39pt'>
<col width=72 style='mso-width-source:userset;mso-width-alt:2633;width:54pt'>
<col width=94 style='mso-width-source:userset;mso-width-alt:3437;width:71pt'>
<col width=63 style='mso-width-source:userset;mso-width-alt:2304;width:47pt'>
<col width=64 style='width:48pt'>
<col width=64 style='width:48pt'>
<col width=64 span=2 style='width:48pt'>
<tr height=20 style='height:15.0pt'>
<td height=20 width=32 style='height:15.0pt;width:24pt'></td>
<td width=52 style='width:39pt'></td>
<td width=72 style='width:54pt'></td>
<td width=94 style='width:71pt'></td>
<td width=63 style='width:47pt'></td>
<td width=64 style='width:48pt'></td>
<td width=64 style='width:48pt'></td>
<td width=64 style='width:48pt'></td>
<td width=64 style='width:48pt'></td>
</tr>
<tr height=20 style='height:15.0pt'>
<td colspan=5 height=20 class=xl78 style='border-right:.5pt solid black;height:15.0pt'><?=getTranslation('printkupon3')?></td>
<td class=xl65 style='border-left:none'>&nbsp;</td>
<td colspan=3 style='mso-ignore:colspan'></td>
</tr>
<tr height=20 style='height:15.0pt'>
<td colspan=3 height=20 class=xl88 style='height:15.0pt'><?=getTranslation('printkupon4')?> :<?=$kupon['id']; ?></td>
<td colspan=2 class=xl84 style='border-right:.5pt solid black'>B :10792</td>
<td class=xl65 style='border-left:none'>&nbsp;</td>
<td colspan=3 style='mso-ignore:colspan'></td>
</tr>
<tr height=20 style='height:15.0pt'>
<td colspan=3 height=20 class=xl90 style='height:15.0pt'><?=getTranslation('printkupon10')?> :<?=date("d-m-Y H:i",$kupon['kupon_time']); ?></td>
<td colspan=2 class=xl92 style='border-right:.5pt solid black'></td>
<td class=xl65 style='border-left:none'>&nbsp;</td>
<td colspan=3 style='mso-ignore:colspan'></td>
</tr>
<tr height=20 style='height:15.0pt'>
<td colspan=5 height=20 class=xl83 style='border-right:.5pt solid black;height:15.0pt'><?=getTranslation('printkupon20')?>:<?=$ubsi['ciktimesaj']; ?></td>
<td class=xl65 style='border-left:none'>&nbsp;</td>
<td colspan=3 style='mso-ignore:colspan'></td>
</tr>
<tr height=20 style='height:15.0pt'>
<td colspan=5 height=20 class=xl83 style='border-right:.5pt solid black;height:15.0pt'><?=getTranslation('printkupon21')?></td>
<td class=xl65 style='border-left:none'>&nbsp;</td>
<td colspan=3 style='mso-ignore:colspan'></td>
</tr>

<?
$sor = sed_sql_query("select * from kupon_ic where kupon_id='$id'");
while($row=sed_sql_fetcharray($sor)) { 
$ob = explode("|",$row['oran_tip']);

$secim_yapimi_kuponguncelle = $ob[0];
$secim_yapimi_kuponguncelle2 = $ob[1];

if($row['spor_tip']=="futbol") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('foran1');
} else if($secim_yapimi_kuponguncelle=="Handikap (0:1)"){
$secilen_translate = getTranslation('foran2');
} else if($secim_yapimi_kuponguncelle=="Handikap (1:0)"){
$secilen_translate = getTranslation('foran3');
} else if($secim_yapimi_kuponguncelle=="Handikap (0:2)"){
$secilen_translate = getTranslation('foran4');
} else if($secim_yapimi_kuponguncelle=="Handikap (2:0)"){
$secilen_translate = getTranslation('foran5');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 1.YARI )"){
$secilen_translate = getTranslation('foran6');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 2.YARI )"){
$secilen_translate = getTranslation('foran7');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Çifte Şans"){
$secilen_translate = getTranslation('foran8');
} else if($secim_yapimi_kuponguncelle=="1.YARI KG"){
$secilen_translate = getTranslation('foran9');
} else if($secim_yapimi_kuponguncelle=="Beraberlikte İade"){
$secilen_translate = getTranslation('foran10');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 0.5"){
$secilen_translate = getTranslation('foran11');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran12');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran13');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran14');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 4.5"){
$secilen_translate = getTranslation('foran15');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran16');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 0.5"){
$secilen_translate = getTranslation('foran18');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran19');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran20');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran21');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 0.5"){
$secilen_translate = getTranslation('foran22');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran23');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran24');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran25');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Gol Atarmı ?"){
$secilen_translate = getTranslation('foran26');
} else if($secim_yapimi_kuponguncelle=="Deplasman Gol Atarmı ?"){
$secilen_translate = getTranslation('foran27');
} else if($secim_yapimi_kuponguncelle=="Karşılıklı Gol"){
$secilen_translate = getTranslation('foran28');
} else if($secim_yapimi_kuponguncelle=="​​​​​1.Yarı Tek/Çift"){
$secilen_translate = getTranslation('foran29');
} else if($secim_yapimi_kuponguncelle=="Tek/Çift"){
$secilen_translate = getTranslation('foran30');
} else if($secim_yapimi_kuponguncelle=="Evsahibi Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran31');
} else if($secim_yapimi_kuponguncelle=="Deplasman Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran32');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran33');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 2.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran34');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran35');
} else if($secim_yapimi_kuponguncelle=="Deplasman 2.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran36');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı A/Ü 0.5"){
$secilen_translate = getTranslation('foran37');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı A/Ü 1.5"){
$secilen_translate = getTranslation('foran38');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı A/Ü 0.5"){
$secilen_translate = getTranslation('foran39');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı A/Ü 1.5"){
$secilen_translate = getTranslation('foran40');
} else if($secim_yapimi_kuponguncelle=="Evsahibi A/Ü 1.5"){
$secilen_translate = getTranslation('foran41');
} else if($secim_yapimi_kuponguncelle=="Deplasman A/Ü 1.5"){
$secilen_translate = getTranslation('foran42');
} else if($secim_yapimi_kuponguncelle=="​​​​​Evsahibi Her 2 yarıda Gol Atar ?"){
$secilen_translate = getTranslation('foran43');
} else if($secim_yapimi_kuponguncelle=="Deplasman Her 2 yarıda Gol Atar ?"){
$secilen_translate = getTranslation('foran44');
} else if($secim_yapimi_kuponguncelle=="Hangi Devrede Fazla Gol Olur"){
$secilen_translate = getTranslation('foran45');
} else if($secim_yapimi_kuponguncelle=="Evsahibi Hangi Devrede Fazla Gol Atar ?"){
$secilen_translate = getTranslation('foran46');
} else if($secim_yapimi_kuponguncelle=="Deplasman Hangi Devrede Fazla Gol Atar ?"){
$secilen_translate = getTranslation('foran47');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-4+)"){
$secilen_translate = getTranslation('foran48');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-5+)"){
$secilen_translate = getTranslation('foran49');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-6+)"){
$secilen_translate = getTranslation('foran50');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 1 gol farkla kazanır mı?"){
$secilen_translate = getTranslation('foran51');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 2 gol farkla kazanır mı?"){
$secilen_translate = getTranslation('foran52');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 3 gol farkla kazanır mı?"){
$secilen_translate = getTranslation('foran53');
} else if($secim_yapimi_kuponguncelle=="1X2 ve toplam gol sayısı"){
$secilen_translate = getTranslation('foran54');
} else if($secim_yapimi_kuponguncelle=="Maç sonucu ve karşılıklı goller"){
$secilen_translate = getTranslation('foran55');
} else if($secim_yapimi_kuponguncelle=="İlk Yarı / Maç Sonucu"){
$secilen_translate = getTranslation('foran56');
} else if($secim_yapimi_kuponguncelle=="Skor Bahsi (90 Dakika)"){
$secilen_translate = getTranslation('foran57');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('foran58');
} else if($secim_yapimi_kuponguncelle=="Toplam Sari Kart Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran59');
} else if($secim_yapimi_kuponguncelle=="Kirmizi kart cikar mi?"){
$secilen_translate = getTranslation('foran60');
} else if($secim_yapimi_kuponguncelle=="Macta kac tane penalti olur?"){
$secilen_translate = getTranslation('foran61');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran62');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran63');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran64');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran65');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran66');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran67');
} else if($secim_yapimi_kuponguncelle=="Sarı Kart Toplam Tek/Çift"){
$secilen_translate = getTranslation('foran68');
} else if($secim_yapimi_kuponguncelle=="Hangi Takım Çok Sarı Kart Yer ?"){
$secilen_translate = getTranslation('foran69');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran70');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 6.5"){
$secilen_translate = getTranslation('foran71');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 7.5"){
$secilen_translate = getTranslation('foran72');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 8.5"){
$secilen_translate = getTranslation('foran73');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 9.5"){
$secilen_translate = getTranslation('foran74');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 10.5"){
$secilen_translate = getTranslation('foran75');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 11.5"){
$secilen_translate = getTranslation('foran76');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 12.5"){
$secilen_translate = getTranslation('foran77');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 13.5"){
$secilen_translate = getTranslation('foran78');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 14.5"){
$secilen_translate = getTranslation('foran79');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 15.5"){
$secilen_translate = getTranslation('foran80');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran81');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran82');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 4.5"){
$secilen_translate = getTranslation('foran83');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran84');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 6.5"){
$secilen_translate = getTranslation('foran85');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 7.5"){
$secilen_translate = getTranslation('foran86');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 8.5"){
$secilen_translate = getTranslation('foran87');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 9.5"){
$secilen_translate = getTranslation('foran88');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 10.5"){
$secilen_translate = getTranslation('foran89');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran90');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran91');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 4.5"){
$secilen_translate = getTranslation('foran92');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran93');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 6.5"){
$secilen_translate = getTranslation('foran94');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 7.5"){
$secilen_translate = getTranslation('foran95');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 8.5"){
$secilen_translate = getTranslation('foran96');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 9.5"){
$secilen_translate = getTranslation('foran97');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 10.5"){
$secilen_translate = getTranslation('foran98');
} else if($secim_yapimi_kuponguncelle=="Korner Toplam Tek/Çift"){
$secilen_translate = getTranslation('foran99');
} else if($secim_yapimi_kuponguncelle=="Hangi Takım Çok Korner Kullanır ?"){
$secilen_translate = getTranslation('foran100');
}

} else if($row['spor_tip']=="basketbol") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ?"){
$secilen_translate = getTranslation('boran1');
} else if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('boran2');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 1.YARI )"){
$secilen_translate = getTranslation('boran3');
} else if($secim_yapimi_kuponguncelle=="Toplam Skor Tek/Çift"){
$secilen_translate = getTranslation('boran4');
} else if($secim_yapimi_kuponguncelle=="Toplam Skor Alt/Üst"){
$secilen_translate = getTranslation('boran5');
} else if($secim_yapimi_kuponguncelle=="Handikap ( 1.YARI )"){
$secilen_translate = getTranslation('boran6');
} else if($secim_yapimi_kuponguncelle=="Handikap"){
$secilen_translate = getTranslation('boran7');
} else if($secim_yapimi_kuponguncelle=="1.Yarı / MS"){
$secilen_translate = getTranslation('boran8');
} else if($secim_yapimi_kuponguncelle=="İki Devrede Kazanır"){
$secilen_translate = getTranslation('boran9');
} else if($secim_yapimi_kuponguncelle=="Tüm Periyotları Kazanır"){
$secilen_translate = getTranslation('boran10');
} else if($secim_yapimi_kuponguncelle=="1.Takım İY Alt/Üst"){
$secilen_translate = getTranslation('boran11');
} else if($secim_yapimi_kuponguncelle=="2.Takım İY Alt/Üst"){
$secilen_translate = getTranslation('boran12');
}

}  else if($row['spor_tip']=="tenis") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ?"){
$secilen_translate = getTranslation('toran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahsi"){
$secilen_translate = getTranslation('toran2');
} else if($secim_yapimi_kuponguncelle=="1.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('toran3');
} else if($secim_yapimi_kuponguncelle=="2.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('toran4');
} else if($secim_yapimi_kuponguncelle=="1.Oyuncu 1 Set Kazanır"){
$secilen_translate = getTranslation('toran5');
} else if($secim_yapimi_kuponguncelle=="2.Oyuncu 1 Set Kazanır"){
$secilen_translate = getTranslation('toran6');
}

} else if($row['spor_tip']=="voleybol") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ?"){
$secilen_translate = getTranslation('voran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahsi"){
$secilen_translate = getTranslation('voran2');
} else if($secim_yapimi_kuponguncelle=="Toplam Alt/Üst"){
$secilen_translate = getTranslation('voran3');
} else if($secim_yapimi_kuponguncelle=="5 Set Sürermi ?"){
$secilen_translate = getTranslation('voran4');
}

} else if($row['spor_tip']=="buzhokeyi") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('buzoran1');
} else if($secim_yapimi_kuponguncelle=="1.P 1X2"){
$secilen_translate = getTranslation('buzoran2');
} else if($secim_yapimi_kuponguncelle=="2.P 1X2"){
$secilen_translate = getTranslation('buzoran3');
} else if($secim_yapimi_kuponguncelle=="3.P 1X2"){
$secilen_translate = getTranslation('buzoran4');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('buzoran5');
} else if($secim_yapimi_kuponguncelle=="1.P Çifte Şans"){
$secilen_translate = getTranslation('buzoran6');
} else if($secim_yapimi_kuponguncelle=="2.P Çifte Şans"){
$secilen_translate = getTranslation('buzoran7');
} else if($secim_yapimi_kuponguncelle=="3.P Çifte Şans"){
$secilen_translate = getTranslation('buzoran8');
}

} else if($row['spor_tip']=="hentbol") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('horan1');
} else if($secim_yapimi_kuponguncelle=="Toplam Alt/Üst"){
$secilen_translate = getTranslation('horan2');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 1.YARI )"){
$secilen_translate = getTranslation('horan3');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Alt/Üst"){
$secilen_translate = getTranslation('horan4');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Tek/Çift"){
$secilen_translate = getTranslation('horan5');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Tek/Çift"){
$secilen_translate = getTranslation('horan6');
} else if($secim_yapimi_kuponguncelle=="Toplam Tek/Çift"){
$secilen_translate = getTranslation('horan7');
}

} else if($row['spor_tip']=="canli") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('fcanlioran1');
} else if($secim_yapimi_kuponguncelle=="Handikap 1:0"){
$secilen_translate = getTranslation('fcanlioran2');
} else if($secim_yapimi_kuponguncelle=="Handikap 2:0"){
$secilen_translate = getTranslation('fcanlioran3');
} else if($secim_yapimi_kuponguncelle=="Handikap 0:1"){
$secilen_translate = getTranslation('fcanlioran4');
} else if($secim_yapimi_kuponguncelle=="Handikap 0:2"){
$secilen_translate = getTranslation('fcanlioran5');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('fcanlioran6');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Çifte Şans"){
$secilen_translate = getTranslation('fcanlioran7');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran8');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran9');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran10');
} else if($secim_yapimi_kuponguncelle=="Toplam 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran11');
} else if($secim_yapimi_kuponguncelle=="Toplam 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran12');
} else if($secim_yapimi_kuponguncelle=="Toplam 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran13');
} else if($secim_yapimi_kuponguncelle=="Toplam 3.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran14');
} else if($secim_yapimi_kuponguncelle=="Toplam 4.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran15');
} else if($secim_yapimi_kuponguncelle=="Toplam 5.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran16');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran17');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran18');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran19');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 3.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran20');
} else if($secim_yapimi_kuponguncelle=="Karşılıklı Gol Olurmu ?"){
$secilen_translate = getTranslation('fcanlioran21');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Müsabakada Gol Atarmı ?"){
$secilen_translate = getTranslation('fcanlioran22');
} else if($secim_yapimi_kuponguncelle=="Deplasman Müsabakada Gol Atarmı ?"){
$secilen_translate = getTranslation('fcanlioran23');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Tek / Çift"){
$secilen_translate = getTranslation('fcanlioran24');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Tek / Çift"){
$secilen_translate = getTranslation('fcanlioran25');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Karşılıklı Gol"){
$secilen_translate = getTranslation('fcanlioran26');
} else if($secim_yapimi_kuponguncelle=="Maç Sonucu ve Karşılıklı Gol"){
$secilen_translate = getTranslation('fcanlioran27');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran28');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran29');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran30');
} else if($secim_yapimi_kuponguncelle=="Deplasman 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran31');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran32');
} else if($secim_yapimi_kuponguncelle=="Deplasman 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran33');
} else if($secim_yapimi_kuponguncelle=="Toplam Kaç Gol Atılır ?"){
$secilen_translate = getTranslation('fcanlioran34');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Toplam Kaç Gol Atar ?"){
$secilen_translate = getTranslation('fcanlioran35');
} else if($secim_yapimi_kuponguncelle=="Deplasman Toplam Kaç Gol Atar ?"){
$secilen_translate = getTranslation('fcanlioran36');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Skoru"){
$secilen_translate = getTranslation('fcanlioran37');
} else if($secim_yapimi_kuponguncelle=="Maç Skoru"){
$secilen_translate = getTranslation('fcanlioran38');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran39');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran40');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran41');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran42');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran43');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran44');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi İlk Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran45');
} else if($secim_yapimi_kuponguncelle=="Ev sahibi İkinci Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran46');
} else if($secim_yapimi_kuponguncelle=="Deplasman İlk Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran47');
} else if($secim_yapimi_kuponguncelle=="Deplasman İkinci Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran48');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 1 Gol Farkla Kazanirmi ?"){
$secilen_translate = getTranslation('fcanlioran49');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 2 Gol Farkla Kazanirmi ?"){
$secilen_translate = getTranslation('fcanlioran50');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 3 Gol Farkla Kazanirmi ?"){
$secilen_translate = getTranslation('fcanlioran51');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Sonucu"){
$secilen_translate = getTranslation('fcanlioran52');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Sonucu"){
$secilen_translate = getTranslation('fcanlioran53');
} else if($secim_yapimi_kuponguncelle=="İlk Yarıda Kaç Gol Olur ?"){
$secilen_translate = getTranslation('fcanlioran54');
} else if($secim_yapimi_kuponguncelle=="2.Yarıda Toplam Kaç Gol Olur ?"){
$secilen_translate = getTranslation('fcanlioran55');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-4+)"){
$secilen_translate = getTranslation('fcanlioran56');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-5+)"){
$secilen_translate = getTranslation('fcanlioran57');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-6+)"){
$secilen_translate = getTranslation('fcanlioran58');
} else if($secim_yapimi_kuponguncelle=="1. yarıda 1.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran59');
} else if($secim_yapimi_kuponguncelle=="1.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran60');
} else if($secim_yapimi_kuponguncelle=="2.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran61');
} else if($secim_yapimi_kuponguncelle=="3.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran62');
} else if($secim_yapimi_kuponguncelle=="4.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran63');
} else if($secim_yapimi_kuponguncelle=="5.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran64');
} else if($secim_yapimi_kuponguncelle=="6.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran65');
}

} else if($row['spor_tip']=="canlib") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('bcanlioran1');
} else if($secim_yapimi_kuponguncelle=="1X2(1.YARI)"){
$secilen_translate = getTranslation('bcanlioran2');
} else if($secim_yapimi_kuponguncelle=="1X2(2.YARI)"){
$secilen_translate = getTranslation('bcanlioran3');
} else if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran4');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran5');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran6');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran7');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran8');
} else if($secim_yapimi_kuponguncelle=="Toplam Skor Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran9');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran10');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran11');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran12');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran13');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran14');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran15');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran16');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran17');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran18');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran19');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran20');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran21');
} else if($secim_yapimi_kuponguncelle=="Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran22');
}

} else if($row['spor_tip']=="canlit") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
$secilen_translate = getTranslation('tcanlioran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahisi"){
$secilen_translate = getTranslation('tcanlioran2');
}

} else if($row['spor_tip']=="canliv") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
$secilen_translate = getTranslation('vcanlioran1');
} else if($secim_yapimi_kuponguncelle=="1.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran2');
} else if($secim_yapimi_kuponguncelle=="2.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran3');
} else if($secim_yapimi_kuponguncelle=="3.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran4');
} else if($secim_yapimi_kuponguncelle=="4.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran5');
} else if($secim_yapimi_kuponguncelle=="Set bahisi (5 maç üzerinden)"){
$secilen_translate = getTranslation('vcanlioran6');
} else if($secim_yapimi_kuponguncelle=="Toplam Kaç Set Oynanır ?"){
$secilen_translate = getTranslation('vcanlioran7');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran8');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran9');
} else if($secim_yapimi_kuponguncelle=="1.Takım 1.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran10');
} else if($secim_yapimi_kuponguncelle=="2.Takım 1.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran11');
} else if($secim_yapimi_kuponguncelle=="1.Takım 2.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran12');
} else if($secim_yapimi_kuponguncelle=="2.Takım 2.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran13');
} else if($secim_yapimi_kuponguncelle=="1.Takım 3.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran14');
} else if($secim_yapimi_kuponguncelle=="2.Takım 3.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran15');
} else if($secim_yapimi_kuponguncelle=="1.Takım 4.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran16');
} else if($secim_yapimi_kuponguncelle=="2.Takım 4.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran17');
} else if($secim_yapimi_kuponguncelle=="Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran18');
} else if($secim_yapimi_kuponguncelle=="Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran19');
} else if($secim_yapimi_kuponguncelle=="1.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran20');
} else if($secim_yapimi_kuponguncelle=="2.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran21');
} else if($secim_yapimi_kuponguncelle=="3.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran22');
} else if($secim_yapimi_kuponguncelle=="4.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran23');
} else if($secim_yapimi_kuponguncelle=="Müsabaka 5.Set Sürermi"){
$secilen_translate = getTranslation('vcanlioran24');
}

} else if($row['spor_tip']=="canlibuz") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('buzcanlioran1');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('buzcanlioran2');
} else if($secim_yapimi_kuponguncelle=="Cifte Sans"){
$secilen_translate = getTranslation('buzcanlioran2');
} else if($secim_yapimi_kuponguncelle=="Hangi periyod daha cok gol olur?"){
$secilen_translate = getTranslation('buzcanlioran3');
}

}

if($dil_bilgisi22['language']=='en'){

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "Y";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "N";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "U";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "O";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 and O";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 and O";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 and U";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 and U";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 and Y";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 and Y";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 and N";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 and N";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "No Goal";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "X and Y";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "D";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "S";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else if($dil_bilgisi22['language']=='de'){ 

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "J";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "K";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "N";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "T";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 und T";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 und T";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 und N";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 und N";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 und J";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 und J";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 und K";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 und K";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "Kein Ziel";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "X und J";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "P";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "E";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else if($dil_bilgisi22['language']=='ar'){ 

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "أجل";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "لا";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "أدنى";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "أعلى";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 وما فوق";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 وما فوق";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 و السفلى";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 و السفلى";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 و نعم";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 و نعم";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 و لا";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 و لا";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "لا هدف";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "س ونعم";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "زوجان";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "واحد";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else if($dil_bilgisi22['language']=='ru'){ 

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "да";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "нет";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "ниже";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "топ";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 и выше";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 и выше";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 и ниже";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 и ниже";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 и да";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 и да";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 и нет";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 и нет";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "Нет цели";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "Х и да";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "пара";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "один";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

?>

<tr height=29 style='mso-height-source:userset;height:21.75pt'>
<td rowspan=2 height=49 class=xl81 style='border-bottom:.5pt dashed black;height:36.75pt'><?=$row['mac_kodu']; ?></td>
<td style="overflow: hidden;text-overflow: ellipsis;" colspan=3 class=xl86>&nbsp;&nbsp;<?=$row['ev_takim'];?> - <?=$row['konuk_takim'];?> </td>
<td class=xl72><? if($row['spor_tip']!="canli" || $row['spor_tip']!="canlibasket") { ?><?=date("d-m H:i",$row['mac_time']); ?><? } ?></td>
<td class=xl65 style='border-left:none'>&nbsp;</td>
<td colspan=3 style='mso-ignore:colspan'></td>
</tr><tr height=20 style='height:15.0pt'>
<td colspan=3 height=20 class=xl87 style='height:15.0pt'><?=$secilen_translate;?> : <?=$secilen_translate2;?>  <? if(!empty($row['oran_val'])) { echo "($row[oran_val])"; } ?></td>
<td class=xl73><?=nf($row['oran']); ?></td>
<td class=xl65>&nbsp;</td>
<td colspan=3 style='mso-ignore:colspan'></td>
</tr>

<? } ?>

<tr height=20 style='height:15.0pt'>
<td colspan=4 height=20 class=xl74 style='height:15.0pt'><?=getTranslation('printkupon5')?></td>
<td class=xl70><?=nf($kupon['oran']); ?></td>
<td class=xl66></td>
<td colspan=3 style='mso-ignore:colspan'></td>
</tr>
<tr height=20 style='height:15.0pt'>
<td colspan=4 height=20 class=xl76 style='height:15.0pt'><?=getTranslation('printkupon7')?></td>
<td class=xl71><?=nf($kupon['yatan']); ?> <?=getTranslation('parabirimi')?></td>
<td class=xl65>&nbsp;</td>
<td colspan=3 style='mso-ignore:colspan'></td>
</tr>
<? if($ubsi['kesinti_goster']==1){ ?>
<tr height=20 style='height:15.0pt'>
<td colspan=4 height=20 class=xl76 style='height:15.0pt'>5% <?=getTranslation('printkupon6')?></td>
<td class=xl71><? 
if(!empty($ubsi['kazananyuzde'])) { $yuzdesi = yuzdele($ubsi['kazananyuzde']); 
$kesinti = $kupon['tutar']*$yuzdesi;
$gercektutar = $kupon['tutar']-$kesinti;
} else {
$gercektutar = $kupon['tutar'];	
}
echo nf($gercektutar); 
?> <?=getTranslation('parabirimi')?></td>
<td class=xl65>&nbsp;</td>
<td colspan=3 style='mso-ignore:colspan'></td>
</tr>
<? } ?>
<tr height=20 style='height:15.0pt'>
<td colspan=4 height=20 class=xl76 style='height:15.0pt'><?=getTranslation('printkupon8')?></td>
<td class=xl70><?=nf($kupon['tutar']); ?> <?=getTranslation('parabirimi')?></td>
<td class=xl65 style='border-left:none'>&nbsp;</td>
<td colspan=3 style='mso-ignore:colspan'></td>
</tr>
<tr height=20 style='height:15.0pt'>
<td height=20 class=xl67 style='height:15.0pt'>&nbsp;</td>
<td class=xl67>&nbsp;</td>
<td class=xl67>&nbsp;</td>
<td class=xl67>&nbsp;</td>
<td class=xl67>&nbsp;</td>
<td class=xl66></td>
<td colspan=3 style='mso-ignore:colspan'></td>
</tr>
<tr height=20 style='height:15.0pt'>
<td height=20 class=xl68 style='height:15.0pt'></td>
<td class=xl68></td>
<td class=xl68></td>
<td class=xl68></td>
<td class=xl68></td>
<td class=xl66></td>
<td colspan=3 style='mso-ignore:colspan'></td>
</tr>
<tr height=20 style='height:15.0pt'>
<td height=20 class=xl69 style='height:15.0pt'></td>
<td class=xl69></td>
<td class=xl69></td>
<td class=xl69></td>
<td class=xl69></td>
<td class=xl66></td>
<td colspan=3 style='mso-ignore:colspan'></td>
</tr>
<tr height=20 style='height:15.0pt'>
<td height=20 class=xl69 style='height:15.0pt'></td>
<td class=xl69></td>
<td class=xl69></td>
<td class=xl69></td>
<td class=xl69></td>
<td class=xl66></td>
<td colspan=3 style='mso-ignore:colspan'></td>
</tr>
<tr height=20 style='height:15.0pt'>
<td height=20 class=xl69 style='height:15.0pt'></td>
<td class=xl69></td>
<td class=xl69></td>
<td class=xl69></td>
<td class=xl69></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<tr height=20 style='height:15.0pt'>
<td height=20 style='height:15.0pt'></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td colspan=3 style='mso-ignore:colspan'></td>
</tr>
<tr height=20 style='height:15.0pt'>
<td height=20 style='height:15.0pt'></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td colspan=2 style='mso-ignore:colspan'></td>
</tr>
<![if supportMisalignedColumns]>
<tr height=0 style='display:none'>
<td width=32 style='width:24pt'></td>
<td width=52 style='width:39pt'></td>
<td width=72 style='width:54pt'></td>
<td width=94 style='width:71pt'></td>
<td width=63 style='width:47pt'></td>
<td width=64 style='width:48pt'></td>
<td width=64 style='width:48pt'></td>
<td width=64 style='width:48pt'></td>
<td width=64 style='width:48pt'></td>
</tr>
<![endif]>
</table>
<? } else if($ub['yazici_tip']=="1") { ?>
<style type="text/css">.style1{width:100%;}</style>
</head>
<body style="font-size:11px; font-family:Verdana; margin:0px 0px 0px 0px">
<div align="left">
<div id="Panel2">
<table width="625px" border="1" style="border:#000000;">
<tr>
<td align="center" width="20%"><span id="Label1" style="font-weight:bold;"><?=getTranslation('printkupon4')?></span></td>
<td align="center" width="20%">
<span id="Label2" style="font-weight:bold;"><?=getTranslation('printkupon19')?></span>
</td>
<td align="center" width="20%">
<span id="Label3" style="font-weight:bold;"><?=getTranslation('printkupon9')?></span>
</td>
<td align="center" width="20%">
<span id="Label4" style="font-weight:bold;"><?=getTranslation('printkupon8')?></span>
</td>
<td align="center" width="20%">
<span id="Label5" style="font-weight:bold;"><?=getTranslation('printkupon10')?></span>
</td>
</tr>
<tr>
<td align="center">
<span id="Label6" style="font-size:Small;font-weight:bold;"><?=$kupon['id']; ?></span>
</td>
<td align="center">
<span id="Label7" style="font-size:Small;font-weight:bold;"><?=nf($kupon['yatan']); ?> <?=getTranslation('parabirimi')?></span>
</td>
<td align="center">
<span id="Label8" style="font-size:Small;font-weight:bold;"><?=nf($kupon['oran']); ?></span>
</td>
<td align="center">
<span id="Label9" style="font-size:Small;font-weight:bold;"><?=nf($kupon['tutar']); ?> <?=getTranslation('parabirimi')?></span>
</td>
<td align="center">
<span id="Label10" style="font-size:X-Small;font-weight:bold;"><?=date("d-m-Y H:i",$kupon['kupon_time']); ?></span>
</td>
</tr>
<tr>
<td align="center" colspan="5">
<table cellspacing="0" cellpadding="1" rules="cols" border="1" id="GridView1" style="color:Black;background-color:White;border-color:#999999;border-width:1px;border-style:Solid;font-family:Verdana;font-size:11px;width:625px;border-collapse:collapse;">
<tr align="center" style="color:Black;background-color:White;border-color:Black;border-width:1px;border-style:Solid;font-weight:bold;height:10px;">
<th scope="col"><?=getTranslation('printkupon11')?></th>
<th scope="col"><?=getTranslation('printkupon12')?></th>
<th scope="col"><?=getTranslation('printkupon16')?></th>
<th scope="col"><?=getTranslation('printkupon10')?></th>
<th scope="col"><?=getTranslation('printkupon9')?></th>
</tr>

<?
$sor = sed_sql_query("select * from kupon_ic where kupon_id='$id'");
while($row=sed_sql_fetcharray($sor)) { 
$ob = explode("|",$row['oran_tip']);

$secim_yapimi_kuponguncelle = $ob[0];
$secim_yapimi_kuponguncelle2 = $ob[1];

if($row['spor_tip']=="futbol") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('foran1');
} else if($secim_yapimi_kuponguncelle=="Handikap (0:1)"){
$secilen_translate = getTranslation('foran2');
} else if($secim_yapimi_kuponguncelle=="Handikap (1:0)"){
$secilen_translate = getTranslation('foran3');
} else if($secim_yapimi_kuponguncelle=="Handikap (0:2)"){
$secilen_translate = getTranslation('foran4');
} else if($secim_yapimi_kuponguncelle=="Handikap (2:0)"){
$secilen_translate = getTranslation('foran5');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 1.YARI )"){
$secilen_translate = getTranslation('foran6');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 2.YARI )"){
$secilen_translate = getTranslation('foran7');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Çifte Şans"){
$secilen_translate = getTranslation('foran8');
} else if($secim_yapimi_kuponguncelle=="1.YARI KG"){
$secilen_translate = getTranslation('foran9');
} else if($secim_yapimi_kuponguncelle=="Beraberlikte İade"){
$secilen_translate = getTranslation('foran10');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 0.5"){
$secilen_translate = getTranslation('foran11');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran12');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran13');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran14');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 4.5"){
$secilen_translate = getTranslation('foran15');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran16');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 0.5"){
$secilen_translate = getTranslation('foran18');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran19');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran20');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran21');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 0.5"){
$secilen_translate = getTranslation('foran22');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran23');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran24');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran25');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Gol Atarmı ?"){
$secilen_translate = getTranslation('foran26');
} else if($secim_yapimi_kuponguncelle=="Deplasman Gol Atarmı ?"){
$secilen_translate = getTranslation('foran27');
} else if($secim_yapimi_kuponguncelle=="Karşılıklı Gol"){
$secilen_translate = getTranslation('foran28');
} else if($secim_yapimi_kuponguncelle=="​​​​​1.Yarı Tek/Çift"){
$secilen_translate = getTranslation('foran29');
} else if($secim_yapimi_kuponguncelle=="Tek/Çift"){
$secilen_translate = getTranslation('foran30');
} else if($secim_yapimi_kuponguncelle=="Evsahibi Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran31');
} else if($secim_yapimi_kuponguncelle=="Deplasman Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran32');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran33');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 2.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran34');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran35');
} else if($secim_yapimi_kuponguncelle=="Deplasman 2.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran36');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı A/Ü 0.5"){
$secilen_translate = getTranslation('foran37');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı A/Ü 1.5"){
$secilen_translate = getTranslation('foran38');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı A/Ü 0.5"){
$secilen_translate = getTranslation('foran39');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı A/Ü 1.5"){
$secilen_translate = getTranslation('foran40');
} else if($secim_yapimi_kuponguncelle=="Evsahibi A/Ü 1.5"){
$secilen_translate = getTranslation('foran41');
} else if($secim_yapimi_kuponguncelle=="Deplasman A/Ü 1.5"){
$secilen_translate = getTranslation('foran42');
} else if($secim_yapimi_kuponguncelle=="​​​​​Evsahibi Her 2 yarıda Gol Atar ?"){
$secilen_translate = getTranslation('foran43');
} else if($secim_yapimi_kuponguncelle=="Deplasman Her 2 yarıda Gol Atar ?"){
$secilen_translate = getTranslation('foran44');
} else if($secim_yapimi_kuponguncelle=="Hangi Devrede Fazla Gol Olur"){
$secilen_translate = getTranslation('foran45');
} else if($secim_yapimi_kuponguncelle=="Evsahibi Hangi Devrede Fazla Gol Atar ?"){
$secilen_translate = getTranslation('foran46');
} else if($secim_yapimi_kuponguncelle=="Deplasman Hangi Devrede Fazla Gol Atar ?"){
$secilen_translate = getTranslation('foran47');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-4+)"){
$secilen_translate = getTranslation('foran48');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-5+)"){
$secilen_translate = getTranslation('foran49');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-6+)"){
$secilen_translate = getTranslation('foran50');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 1 gol farkla kazanır mı?"){
$secilen_translate = getTranslation('foran51');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 2 gol farkla kazanır mı?"){
$secilen_translate = getTranslation('foran52');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 3 gol farkla kazanır mı?"){
$secilen_translate = getTranslation('foran53');
} else if($secim_yapimi_kuponguncelle=="1X2 ve toplam gol sayısı"){
$secilen_translate = getTranslation('foran54');
} else if($secim_yapimi_kuponguncelle=="Maç sonucu ve karşılıklı goller"){
$secilen_translate = getTranslation('foran55');
} else if($secim_yapimi_kuponguncelle=="İlk Yarı / Maç Sonucu"){
$secilen_translate = getTranslation('foran56');
} else if($secim_yapimi_kuponguncelle=="Skor Bahsi (90 Dakika)"){
$secilen_translate = getTranslation('foran57');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('foran58');
} else if($secim_yapimi_kuponguncelle=="Toplam Sari Kart Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran59');
} else if($secim_yapimi_kuponguncelle=="Kirmizi kart cikar mi?"){
$secilen_translate = getTranslation('foran60');
} else if($secim_yapimi_kuponguncelle=="Macta kac tane penalti olur?"){
$secilen_translate = getTranslation('foran61');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran62');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran63');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran64');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran65');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran66');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran67');
} else if($secim_yapimi_kuponguncelle=="Sarı Kart Toplam Tek/Çift"){
$secilen_translate = getTranslation('foran68');
} else if($secim_yapimi_kuponguncelle=="Hangi Takım Çok Sarı Kart Yer ?"){
$secilen_translate = getTranslation('foran69');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran70');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 6.5"){
$secilen_translate = getTranslation('foran71');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 7.5"){
$secilen_translate = getTranslation('foran72');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 8.5"){
$secilen_translate = getTranslation('foran73');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 9.5"){
$secilen_translate = getTranslation('foran74');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 10.5"){
$secilen_translate = getTranslation('foran75');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 11.5"){
$secilen_translate = getTranslation('foran76');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 12.5"){
$secilen_translate = getTranslation('foran77');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 13.5"){
$secilen_translate = getTranslation('foran78');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 14.5"){
$secilen_translate = getTranslation('foran79');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 15.5"){
$secilen_translate = getTranslation('foran80');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran81');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran82');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 4.5"){
$secilen_translate = getTranslation('foran83');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran84');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 6.5"){
$secilen_translate = getTranslation('foran85');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 7.5"){
$secilen_translate = getTranslation('foran86');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 8.5"){
$secilen_translate = getTranslation('foran87');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 9.5"){
$secilen_translate = getTranslation('foran88');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 10.5"){
$secilen_translate = getTranslation('foran89');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran90');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran91');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 4.5"){
$secilen_translate = getTranslation('foran92');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran93');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 6.5"){
$secilen_translate = getTranslation('foran94');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 7.5"){
$secilen_translate = getTranslation('foran95');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 8.5"){
$secilen_translate = getTranslation('foran96');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 9.5"){
$secilen_translate = getTranslation('foran97');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 10.5"){
$secilen_translate = getTranslation('foran98');
} else if($secim_yapimi_kuponguncelle=="Korner Toplam Tek/Çift"){
$secilen_translate = getTranslation('foran99');
} else if($secim_yapimi_kuponguncelle=="Hangi Takım Çok Korner Kullanır ?"){
$secilen_translate = getTranslation('foran100');
}

} else if($row['spor_tip']=="basketbol") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ?"){
$secilen_translate = getTranslation('boran1');
} else if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('boran2');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 1.YARI )"){
$secilen_translate = getTranslation('boran3');
} else if($secim_yapimi_kuponguncelle=="Toplam Skor Tek/Çift"){
$secilen_translate = getTranslation('boran4');
} else if($secim_yapimi_kuponguncelle=="Toplam Skor Alt/Üst"){
$secilen_translate = getTranslation('boran5');
} else if($secim_yapimi_kuponguncelle=="Handikap ( 1.YARI )"){
$secilen_translate = getTranslation('boran6');
} else if($secim_yapimi_kuponguncelle=="Handikap"){
$secilen_translate = getTranslation('boran7');
} else if($secim_yapimi_kuponguncelle=="1.Yarı / MS"){
$secilen_translate = getTranslation('boran8');
} else if($secim_yapimi_kuponguncelle=="İki Devrede Kazanır"){
$secilen_translate = getTranslation('boran9');
} else if($secim_yapimi_kuponguncelle=="Tüm Periyotları Kazanır"){
$secilen_translate = getTranslation('boran10');
} else if($secim_yapimi_kuponguncelle=="1.Takım İY Alt/Üst"){
$secilen_translate = getTranslation('boran11');
} else if($secim_yapimi_kuponguncelle=="2.Takım İY Alt/Üst"){
$secilen_translate = getTranslation('boran12');
}

}  else if($row['spor_tip']=="tenis") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ?"){
$secilen_translate = getTranslation('toran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahsi"){
$secilen_translate = getTranslation('toran2');
} else if($secim_yapimi_kuponguncelle=="1.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('toran3');
} else if($secim_yapimi_kuponguncelle=="2.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('toran4');
} else if($secim_yapimi_kuponguncelle=="1.Oyuncu 1 Set Kazanır"){
$secilen_translate = getTranslation('toran5');
} else if($secim_yapimi_kuponguncelle=="2.Oyuncu 1 Set Kazanır"){
$secilen_translate = getTranslation('toran6');
}

} else if($row['spor_tip']=="voleybol") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ?"){
$secilen_translate = getTranslation('voran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahsi"){
$secilen_translate = getTranslation('voran2');
} else if($secim_yapimi_kuponguncelle=="Toplam Alt/Üst"){
$secilen_translate = getTranslation('voran3');
} else if($secim_yapimi_kuponguncelle=="5 Set Sürermi ?"){
$secilen_translate = getTranslation('voran4');
}

} else if($row['spor_tip']=="buzhokeyi") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('buzoran1');
} else if($secim_yapimi_kuponguncelle=="1.P 1X2"){
$secilen_translate = getTranslation('buzoran2');
} else if($secim_yapimi_kuponguncelle=="2.P 1X2"){
$secilen_translate = getTranslation('buzoran3');
} else if($secim_yapimi_kuponguncelle=="3.P 1X2"){
$secilen_translate = getTranslation('buzoran4');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('buzoran5');
} else if($secim_yapimi_kuponguncelle=="1.P Çifte Şans"){
$secilen_translate = getTranslation('buzoran6');
} else if($secim_yapimi_kuponguncelle=="2.P Çifte Şans"){
$secilen_translate = getTranslation('buzoran7');
} else if($secim_yapimi_kuponguncelle=="3.P Çifte Şans"){
$secilen_translate = getTranslation('buzoran8');
}

} else if($row['spor_tip']=="hentbol") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('horan1');
} else if($secim_yapimi_kuponguncelle=="Toplam Alt/Üst"){
$secilen_translate = getTranslation('horan2');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 1.YARI )"){
$secilen_translate = getTranslation('horan3');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Alt/Üst"){
$secilen_translate = getTranslation('horan4');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Tek/Çift"){
$secilen_translate = getTranslation('horan5');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Tek/Çift"){
$secilen_translate = getTranslation('horan6');
} else if($secim_yapimi_kuponguncelle=="Toplam Tek/Çift"){
$secilen_translate = getTranslation('horan7');
}

} else if($row['spor_tip']=="canli") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('fcanlioran1');
} else if($secim_yapimi_kuponguncelle=="Handikap 1:0"){
$secilen_translate = getTranslation('fcanlioran2');
} else if($secim_yapimi_kuponguncelle=="Handikap 2:0"){
$secilen_translate = getTranslation('fcanlioran3');
} else if($secim_yapimi_kuponguncelle=="Handikap 0:1"){
$secilen_translate = getTranslation('fcanlioran4');
} else if($secim_yapimi_kuponguncelle=="Handikap 0:2"){
$secilen_translate = getTranslation('fcanlioran5');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('fcanlioran6');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Çifte Şans"){
$secilen_translate = getTranslation('fcanlioran7');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran8');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran9');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran10');
} else if($secim_yapimi_kuponguncelle=="Toplam 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran11');
} else if($secim_yapimi_kuponguncelle=="Toplam 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran12');
} else if($secim_yapimi_kuponguncelle=="Toplam 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran13');
} else if($secim_yapimi_kuponguncelle=="Toplam 3.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran14');
} else if($secim_yapimi_kuponguncelle=="Toplam 4.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran15');
} else if($secim_yapimi_kuponguncelle=="Toplam 5.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran16');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran17');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran18');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran19');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 3.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran20');
} else if($secim_yapimi_kuponguncelle=="Karşılıklı Gol Olurmu ?"){
$secilen_translate = getTranslation('fcanlioran21');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Müsabakada Gol Atarmı ?"){
$secilen_translate = getTranslation('fcanlioran22');
} else if($secim_yapimi_kuponguncelle=="Deplasman Müsabakada Gol Atarmı ?"){
$secilen_translate = getTranslation('fcanlioran23');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Tek / Çift"){
$secilen_translate = getTranslation('fcanlioran24');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Tek / Çift"){
$secilen_translate = getTranslation('fcanlioran25');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Karşılıklı Gol"){
$secilen_translate = getTranslation('fcanlioran26');
} else if($secim_yapimi_kuponguncelle=="Maç Sonucu ve Karşılıklı Gol"){
$secilen_translate = getTranslation('fcanlioran27');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran28');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran29');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran30');
} else if($secim_yapimi_kuponguncelle=="Deplasman 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran31');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran32');
} else if($secim_yapimi_kuponguncelle=="Deplasman 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran33');
} else if($secim_yapimi_kuponguncelle=="Toplam Kaç Gol Atılır ?"){
$secilen_translate = getTranslation('fcanlioran34');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Toplam Kaç Gol Atar ?"){
$secilen_translate = getTranslation('fcanlioran35');
} else if($secim_yapimi_kuponguncelle=="Deplasman Toplam Kaç Gol Atar ?"){
$secilen_translate = getTranslation('fcanlioran36');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Skoru"){
$secilen_translate = getTranslation('fcanlioran37');
} else if($secim_yapimi_kuponguncelle=="Maç Skoru"){
$secilen_translate = getTranslation('fcanlioran38');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran39');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran40');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran41');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran42');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran43');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran44');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi İlk Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran45');
} else if($secim_yapimi_kuponguncelle=="Ev sahibi İkinci Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran46');
} else if($secim_yapimi_kuponguncelle=="Deplasman İlk Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran47');
} else if($secim_yapimi_kuponguncelle=="Deplasman İkinci Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran48');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 1 Gol Farkla Kazanirmi ?"){
$secilen_translate = getTranslation('fcanlioran49');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 2 Gol Farkla Kazanirmi ?"){
$secilen_translate = getTranslation('fcanlioran50');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 3 Gol Farkla Kazanirmi ?"){
$secilen_translate = getTranslation('fcanlioran51');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Sonucu"){
$secilen_translate = getTranslation('fcanlioran52');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Sonucu"){
$secilen_translate = getTranslation('fcanlioran53');
} else if($secim_yapimi_kuponguncelle=="İlk Yarıda Kaç Gol Olur ?"){
$secilen_translate = getTranslation('fcanlioran54');
} else if($secim_yapimi_kuponguncelle=="2.Yarıda Toplam Kaç Gol Olur ?"){
$secilen_translate = getTranslation('fcanlioran55');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-4+)"){
$secilen_translate = getTranslation('fcanlioran56');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-5+)"){
$secilen_translate = getTranslation('fcanlioran57');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-6+)"){
$secilen_translate = getTranslation('fcanlioran58');
} else if($secim_yapimi_kuponguncelle=="1. yarıda 1.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran59');
} else if($secim_yapimi_kuponguncelle=="1.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran60');
} else if($secim_yapimi_kuponguncelle=="2.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran61');
} else if($secim_yapimi_kuponguncelle=="3.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran62');
} else if($secim_yapimi_kuponguncelle=="4.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran63');
} else if($secim_yapimi_kuponguncelle=="5.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran64');
} else if($secim_yapimi_kuponguncelle=="6.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran65');
}

} else if($row['spor_tip']=="canlib") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('bcanlioran1');
} else if($secim_yapimi_kuponguncelle=="1X2(1.YARI)"){
$secilen_translate = getTranslation('bcanlioran2');
} else if($secim_yapimi_kuponguncelle=="1X2(2.YARI)"){
$secilen_translate = getTranslation('bcanlioran3');
} else if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran4');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran5');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran6');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran7');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran8');
} else if($secim_yapimi_kuponguncelle=="Toplam Skor Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran9');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran10');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran11');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran12');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran13');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran14');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran15');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran16');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran17');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran18');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran19');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran20');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran21');
} else if($secim_yapimi_kuponguncelle=="Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran22');
}

} else if($row['spor_tip']=="canlit") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
$secilen_translate = getTranslation('tcanlioran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahisi"){
$secilen_translate = getTranslation('tcanlioran2');
}

} else if($row['spor_tip']=="canliv") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
$secilen_translate = getTranslation('vcanlioran1');
} else if($secim_yapimi_kuponguncelle=="1.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran2');
} else if($secim_yapimi_kuponguncelle=="2.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran3');
} else if($secim_yapimi_kuponguncelle=="3.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran4');
} else if($secim_yapimi_kuponguncelle=="4.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran5');
} else if($secim_yapimi_kuponguncelle=="Set bahisi (5 maç üzerinden)"){
$secilen_translate = getTranslation('vcanlioran6');
} else if($secim_yapimi_kuponguncelle=="Toplam Kaç Set Oynanır ?"){
$secilen_translate = getTranslation('vcanlioran7');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran8');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran9');
} else if($secim_yapimi_kuponguncelle=="1.Takım 1.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran10');
} else if($secim_yapimi_kuponguncelle=="2.Takım 1.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran11');
} else if($secim_yapimi_kuponguncelle=="1.Takım 2.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran12');
} else if($secim_yapimi_kuponguncelle=="2.Takım 2.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran13');
} else if($secim_yapimi_kuponguncelle=="1.Takım 3.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran14');
} else if($secim_yapimi_kuponguncelle=="2.Takım 3.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran15');
} else if($secim_yapimi_kuponguncelle=="1.Takım 4.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran16');
} else if($secim_yapimi_kuponguncelle=="2.Takım 4.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran17');
} else if($secim_yapimi_kuponguncelle=="Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran18');
} else if($secim_yapimi_kuponguncelle=="Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran19');
} else if($secim_yapimi_kuponguncelle=="1.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran20');
} else if($secim_yapimi_kuponguncelle=="2.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran21');
} else if($secim_yapimi_kuponguncelle=="3.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran22');
} else if($secim_yapimi_kuponguncelle=="4.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran23');
} else if($secim_yapimi_kuponguncelle=="Müsabaka 5.Set Sürermi"){
$secilen_translate = getTranslation('vcanlioran24');
}

} else if($row['spor_tip']=="canlibuz") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('buzcanlioran1');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('buzcanlioran2');
} else if($secim_yapimi_kuponguncelle=="Cifte Sans"){
$secilen_translate = getTranslation('buzcanlioran2');
} else if($secim_yapimi_kuponguncelle=="Hangi periyod daha cok gol olur?"){
$secilen_translate = getTranslation('buzcanlioran3');
}

}

if($dil_bilgisi22['language']=='en'){

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "Y";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "N";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "U";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "O";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 and O";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 and O";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 and U";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 and U";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 and Y";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 and Y";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 and N";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 and N";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "No Goal";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "X and Y";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "D";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "S";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else if($dil_bilgisi22['language']=='de'){ 

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "J";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "K";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "N";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "T";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 und T";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 und T";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 und N";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 und N";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 und J";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 und J";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 und K";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 und K";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "Kein Ziel";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "X und J";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "P";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "E";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else if($dil_bilgisi22['language']=='ar'){ 

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "أجل";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "لا";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "أدنى";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "أعلى";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 وما فوق";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 وما فوق";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 و السفلى";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 و السفلى";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 و نعم";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 و نعم";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 و لا";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 و لا";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "لا هدف";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "س ونعم";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "زوجان";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "واحد";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else if($dil_bilgisi22['language']=='ru'){ 

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "да";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "нет";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "ниже";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "топ";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 и выше";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 и выше";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 и ниже";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 и ниже";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 и да";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 и да";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 и нет";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 и нет";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "Нет цели";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "Х и да";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "пара";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "один";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

?>

<tr align="center" style="height:10px;">
<td style="width:40px;"><?=$row['mac_kodu']; ?></td>
<td align="left" style="width:300px;"><?=$row['ev_takim'];?> - <?=$row['konuk_takim'];?> </td>
<td align="left" nowrap><?=$secilen_translate;?> : <?=$secilen_translate2;?>  <? if(!empty($row['oran_val'])) { echo "($row[oran_val])"; } ?> </td>
<td style="width:100px;"><? if($row['spor_tip']!="canli" || $row['spor_tip']!="canlibasket") { ?><?=date("d-m H:i",$row['mac_time']); ?><? } ?></td>
<td style="width:50px;"><?=nf($row['oran']); ?></td>
</tr>

<? } ?>

</table>
<span id="Label11" style="font-size:Smaller;"><?=$ubsi['ciktimesaj']; ?></span>
</td>
</tr>
</table>
</div>
</div>
<? } ?>

<? }
## TERMAL YAZICI AYAR YERİ ##
else if($ub['herkupon_sms']=="2") { ?>

<link href="/players/img/print/print.css?r=<?=rand();?>" rel="stylesheet" type="text/css">

<div class="printalan">
<div class="printbaslik"><?=$kupon['username']; ?></div>
<div class="printtarih"><?=date("d.m.Y H:i:s",$kupon['kupon_time']); ?></div>
<div class="printtarih"><?=getTranslation('printkupon4')?>: <strong><?=$id;?></strong></div>

<?
$sor = sed_sql_query("select * from kupon_ic where kupon_id='$id'");
while($row=sed_sql_fetcharray($sor)) { 

$ob = explode("|",$row['oran_tip']);

$secim_yapimi_kuponguncelle = $ob[0];
$secim_yapimi_kuponguncelle2 = $ob[1];

if($row['spor_tip']=="futbol") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('foran1');
} else if($secim_yapimi_kuponguncelle=="Handikap (0:1)"){
$secilen_translate = getTranslation('foran2');
} else if($secim_yapimi_kuponguncelle=="Handikap (1:0)"){
$secilen_translate = getTranslation('foran3');
} else if($secim_yapimi_kuponguncelle=="Handikap (0:2)"){
$secilen_translate = getTranslation('foran4');
} else if($secim_yapimi_kuponguncelle=="Handikap (2:0)"){
$secilen_translate = getTranslation('foran5');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 1.YARI )"){
$secilen_translate = getTranslation('foran6');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 2.YARI )"){
$secilen_translate = getTranslation('foran7');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Çifte Şans"){
$secilen_translate = getTranslation('foran8');
} else if($secim_yapimi_kuponguncelle=="1.YARI KG"){
$secilen_translate = getTranslation('foran9');
} else if($secim_yapimi_kuponguncelle=="Beraberlikte İade"){
$secilen_translate = getTranslation('foran10');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 0.5"){
$secilen_translate = getTranslation('foran11');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran12');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran13');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran14');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 4.5"){
$secilen_translate = getTranslation('foran15');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran16');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 0.5"){
$secilen_translate = getTranslation('foran18');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran19');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran20');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Gol Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran21');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 0.5"){
$secilen_translate = getTranslation('foran22');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran23');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran24');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Toplam Gol Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran25');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Gol Atarmı ?"){
$secilen_translate = getTranslation('foran26');
} else if($secim_yapimi_kuponguncelle=="Deplasman Gol Atarmı ?"){
$secilen_translate = getTranslation('foran27');
} else if($secim_yapimi_kuponguncelle=="Karşılıklı Gol"){
$secilen_translate = getTranslation('foran28');
} else if($secim_yapimi_kuponguncelle=="​​​​​1.Yarı Tek/Çift"){
$secilen_translate = getTranslation('foran29');
} else if($secim_yapimi_kuponguncelle=="Tek/Çift"){
$secilen_translate = getTranslation('foran30');
} else if($secim_yapimi_kuponguncelle=="Evsahibi Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran31');
} else if($secim_yapimi_kuponguncelle=="Deplasman Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran32');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran33');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 2.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran34');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran35');
} else if($secim_yapimi_kuponguncelle=="Deplasman 2.Yarı Kaç Gol Atar ?"){
$secilen_translate = getTranslation('foran36');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı A/Ü 0.5"){
$secilen_translate = getTranslation('foran37');
} else if($secim_yapimi_kuponguncelle=="Evsahibi 1.Yarı A/Ü 1.5"){
$secilen_translate = getTranslation('foran38');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı A/Ü 0.5"){
$secilen_translate = getTranslation('foran39');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı A/Ü 1.5"){
$secilen_translate = getTranslation('foran40');
} else if($secim_yapimi_kuponguncelle=="Evsahibi A/Ü 1.5"){
$secilen_translate = getTranslation('foran41');
} else if($secim_yapimi_kuponguncelle=="Deplasman A/Ü 1.5"){
$secilen_translate = getTranslation('foran42');
} else if($secim_yapimi_kuponguncelle=="​​​​​Evsahibi Her 2 yarıda Gol Atar ?"){
$secilen_translate = getTranslation('foran43');
} else if($secim_yapimi_kuponguncelle=="Deplasman Her 2 yarıda Gol Atar ?"){
$secilen_translate = getTranslation('foran44');
} else if($secim_yapimi_kuponguncelle=="Hangi Devrede Fazla Gol Olur"){
$secilen_translate = getTranslation('foran45');
} else if($secim_yapimi_kuponguncelle=="Evsahibi Hangi Devrede Fazla Gol Atar ?"){
$secilen_translate = getTranslation('foran46');
} else if($secim_yapimi_kuponguncelle=="Deplasman Hangi Devrede Fazla Gol Atar ?"){
$secilen_translate = getTranslation('foran47');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-4+)"){
$secilen_translate = getTranslation('foran48');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-5+)"){
$secilen_translate = getTranslation('foran49');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-6+)"){
$secilen_translate = getTranslation('foran50');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 1 gol farkla kazanır mı?"){
$secilen_translate = getTranslation('foran51');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 2 gol farkla kazanır mı?"){
$secilen_translate = getTranslation('foran52');
} else if($secim_yapimi_kuponguncelle=="Herhangi bir takım 3 gol farkla kazanır mı?"){
$secilen_translate = getTranslation('foran53');
} else if($secim_yapimi_kuponguncelle=="1X2 ve toplam gol sayısı"){
$secilen_translate = getTranslation('foran54');
} else if($secim_yapimi_kuponguncelle=="Maç sonucu ve karşılıklı goller"){
$secilen_translate = getTranslation('foran55');
} else if($secim_yapimi_kuponguncelle=="İlk Yarı / Maç Sonucu"){
$secilen_translate = getTranslation('foran56');
} else if($secim_yapimi_kuponguncelle=="Skor Bahsi (90 Dakika)"){
$secilen_translate = getTranslation('foran57');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('foran58');
} else if($secim_yapimi_kuponguncelle=="Toplam Sari Kart Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran59');
} else if($secim_yapimi_kuponguncelle=="Kirmizi kart cikar mi?"){
$secilen_translate = getTranslation('foran60');
} else if($secim_yapimi_kuponguncelle=="Macta kac tane penalti olur?"){
$secilen_translate = getTranslation('foran61');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran62');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran63');
} else if($secim_yapimi_kuponguncelle=="1.Takim Sari Kart Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran64');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 1.5"){
$secilen_translate = getTranslation('foran65');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran66');
} else if($secim_yapimi_kuponguncelle=="2.Takim Sari Kart Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran67');
} else if($secim_yapimi_kuponguncelle=="Sarı Kart Toplam Tek/Çift"){
$secilen_translate = getTranslation('foran68');
} else if($secim_yapimi_kuponguncelle=="Hangi Takım Çok Sarı Kart Yer ?"){
$secilen_translate = getTranslation('foran69');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran70');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 6.5"){
$secilen_translate = getTranslation('foran71');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 7.5"){
$secilen_translate = getTranslation('foran72');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 8.5"){
$secilen_translate = getTranslation('foran73');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 9.5"){
$secilen_translate = getTranslation('foran74');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 10.5"){
$secilen_translate = getTranslation('foran75');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 11.5"){
$secilen_translate = getTranslation('foran76');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 12.5"){
$secilen_translate = getTranslation('foran77');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 13.5"){
$secilen_translate = getTranslation('foran78');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 14.5"){
$secilen_translate = getTranslation('foran79');
} else if($secim_yapimi_kuponguncelle=="Toplam Korner Alt/Üst 15.5"){
$secilen_translate = getTranslation('foran80');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran81');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran82');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 4.5"){
$secilen_translate = getTranslation('foran83');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran84');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 6.5"){
$secilen_translate = getTranslation('foran85');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 7.5"){
$secilen_translate = getTranslation('foran86');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 8.5"){
$secilen_translate = getTranslation('foran87');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 9.5"){
$secilen_translate = getTranslation('foran88');
} else if($secim_yapimi_kuponguncelle=="1.Takım Korner Alt/Üst 10.5"){
$secilen_translate = getTranslation('foran89');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 2.5"){
$secilen_translate = getTranslation('foran90');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 3.5"){
$secilen_translate = getTranslation('foran91');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 4.5"){
$secilen_translate = getTranslation('foran92');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 5.5"){
$secilen_translate = getTranslation('foran93');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 6.5"){
$secilen_translate = getTranslation('foran94');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 7.5"){
$secilen_translate = getTranslation('foran95');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 8.5"){
$secilen_translate = getTranslation('foran96');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 9.5"){
$secilen_translate = getTranslation('foran97');
} else if($secim_yapimi_kuponguncelle=="2.Takım Korner Alt/Üst 10.5"){
$secilen_translate = getTranslation('foran98');
} else if($secim_yapimi_kuponguncelle=="Korner Toplam Tek/Çift"){
$secilen_translate = getTranslation('foran99');
} else if($secim_yapimi_kuponguncelle=="Hangi Takım Çok Korner Kullanır ?"){
$secilen_translate = getTranslation('foran100');
}

} else if($row['spor_tip']=="basketbol") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ?"){
$secilen_translate = getTranslation('boran1');
} else if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('boran2');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 1.YARI )"){
$secilen_translate = getTranslation('boran3');
} else if($secim_yapimi_kuponguncelle=="Toplam Skor Tek/Çift"){
$secilen_translate = getTranslation('boran4');
} else if($secim_yapimi_kuponguncelle=="Toplam Skor Alt/Üst"){
$secilen_translate = getTranslation('boran5');
} else if($secim_yapimi_kuponguncelle=="Handikap ( 1.YARI )"){
$secilen_translate = getTranslation('boran6');
} else if($secim_yapimi_kuponguncelle=="Handikap"){
$secilen_translate = getTranslation('boran7');
} else if($secim_yapimi_kuponguncelle=="1.Yarı / MS"){
$secilen_translate = getTranslation('boran8');
} else if($secim_yapimi_kuponguncelle=="İki Devrede Kazanır"){
$secilen_translate = getTranslation('boran9');
} else if($secim_yapimi_kuponguncelle=="Tüm Periyotları Kazanır"){
$secilen_translate = getTranslation('boran10');
} else if($secim_yapimi_kuponguncelle=="1.Takım İY Alt/Üst"){
$secilen_translate = getTranslation('boran11');
} else if($secim_yapimi_kuponguncelle=="2.Takım İY Alt/Üst"){
$secilen_translate = getTranslation('boran12');
}

}  else if($row['spor_tip']=="tenis") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ?"){
$secilen_translate = getTranslation('toran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahsi"){
$secilen_translate = getTranslation('toran2');
} else if($secim_yapimi_kuponguncelle=="1.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('toran3');
} else if($secim_yapimi_kuponguncelle=="2.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('toran4');
} else if($secim_yapimi_kuponguncelle=="1.Oyuncu 1 Set Kazanır"){
$secilen_translate = getTranslation('toran5');
} else if($secim_yapimi_kuponguncelle=="2.Oyuncu 1 Set Kazanır"){
$secilen_translate = getTranslation('toran6');
}

} else if($row['spor_tip']=="voleybol") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır ?"){
$secilen_translate = getTranslation('voran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahsi"){
$secilen_translate = getTranslation('voran2');
} else if($secim_yapimi_kuponguncelle=="Toplam Alt/Üst"){
$secilen_translate = getTranslation('voran3');
} else if($secim_yapimi_kuponguncelle=="5 Set Sürermi ?"){
$secilen_translate = getTranslation('voran4');
}

} else if($row['spor_tip']=="buzhokeyi") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('buzoran1');
} else if($secim_yapimi_kuponguncelle=="1.P 1X2"){
$secilen_translate = getTranslation('buzoran2');
} else if($secim_yapimi_kuponguncelle=="2.P 1X2"){
$secilen_translate = getTranslation('buzoran3');
} else if($secim_yapimi_kuponguncelle=="3.P 1X2"){
$secilen_translate = getTranslation('buzoran4');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('buzoran5');
} else if($secim_yapimi_kuponguncelle=="1.P Çifte Şans"){
$secilen_translate = getTranslation('buzoran6');
} else if($secim_yapimi_kuponguncelle=="2.P Çifte Şans"){
$secilen_translate = getTranslation('buzoran7');
} else if($secim_yapimi_kuponguncelle=="3.P Çifte Şans"){
$secilen_translate = getTranslation('buzoran8');
}

} else if($row['spor_tip']=="hentbol") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('horan1');
} else if($secim_yapimi_kuponguncelle=="Toplam Alt/Üst"){
$secilen_translate = getTranslation('horan2');
} else if($secim_yapimi_kuponguncelle=="1X2 ( 1.YARI )"){
$secilen_translate = getTranslation('horan3');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Toplam Alt/Üst"){
$secilen_translate = getTranslation('horan4');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Tek/Çift"){
$secilen_translate = getTranslation('horan5');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Tek/Çift"){
$secilen_translate = getTranslation('horan6');
} else if($secim_yapimi_kuponguncelle=="Toplam Tek/Çift"){
$secilen_translate = getTranslation('horan7');
}

} else if($row['spor_tip']=="canli") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('fcanlioran1');
} else if($secim_yapimi_kuponguncelle=="Handikap 1:0"){
$secilen_translate = getTranslation('fcanlioran2');
} else if($secim_yapimi_kuponguncelle=="Handikap 2:0"){
$secilen_translate = getTranslation('fcanlioran3');
} else if($secim_yapimi_kuponguncelle=="Handikap 0:1"){
$secilen_translate = getTranslation('fcanlioran4');
} else if($secim_yapimi_kuponguncelle=="Handikap 0:2"){
$secilen_translate = getTranslation('fcanlioran5');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('fcanlioran6');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Çifte Şans"){
$secilen_translate = getTranslation('fcanlioran7');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran8');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran9');
} else if($secim_yapimi_kuponguncelle=="1.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran10');
} else if($secim_yapimi_kuponguncelle=="Toplam 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran11');
} else if($secim_yapimi_kuponguncelle=="Toplam 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran12');
} else if($secim_yapimi_kuponguncelle=="Toplam 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran13');
} else if($secim_yapimi_kuponguncelle=="Toplam 3.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran14');
} else if($secim_yapimi_kuponguncelle=="Toplam 4.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran15');
} else if($secim_yapimi_kuponguncelle=="Toplam 5.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran16');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran17');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran18');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran19');
} else if($secim_yapimi_kuponguncelle=="2.Yarı 3.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran20');
} else if($secim_yapimi_kuponguncelle=="Karşılıklı Gol Olurmu ?"){
$secilen_translate = getTranslation('fcanlioran21');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Müsabakada Gol Atarmı ?"){
$secilen_translate = getTranslation('fcanlioran22');
} else if($secim_yapimi_kuponguncelle=="Deplasman Müsabakada Gol Atarmı ?"){
$secilen_translate = getTranslation('fcanlioran23');
} else if($secim_yapimi_kuponguncelle=="Toplam Gol Tek / Çift"){
$secilen_translate = getTranslation('fcanlioran24');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Tek / Çift"){
$secilen_translate = getTranslation('fcanlioran25');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Karşılıklı Gol"){
$secilen_translate = getTranslation('fcanlioran26');
} else if($secim_yapimi_kuponguncelle=="Maç Sonucu ve Karşılıklı Gol"){
$secilen_translate = getTranslation('fcanlioran27');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran28');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran29');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran30');
} else if($secim_yapimi_kuponguncelle=="Deplasman 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran31');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran32');
} else if($secim_yapimi_kuponguncelle=="Deplasman 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran33');
} else if($secim_yapimi_kuponguncelle=="Toplam Kaç Gol Atılır ?"){
$secilen_translate = getTranslation('fcanlioran34');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi Toplam Kaç Gol Atar ?"){
$secilen_translate = getTranslation('fcanlioran35');
} else if($secim_yapimi_kuponguncelle=="Deplasman Toplam Kaç Gol Atar ?"){
$secilen_translate = getTranslation('fcanlioran36');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Skoru"){
$secilen_translate = getTranslation('fcanlioran37');
} else if($secim_yapimi_kuponguncelle=="Maç Skoru"){
$secilen_translate = getTranslation('fcanlioran38');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran39');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran40');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi 1.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran41');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 0.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran42');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 1.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran43');
} else if($secim_yapimi_kuponguncelle=="Deplasman 1.Yarı 2.5 Gol Alt Üst"){
$secilen_translate = getTranslation('fcanlioran44');
} else if($secim_yapimi_kuponguncelle=="Ev Sahibi İlk Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran45');
} else if($secim_yapimi_kuponguncelle=="Ev sahibi İkinci Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran46');
} else if($secim_yapimi_kuponguncelle=="Deplasman İlk Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran47');
} else if($secim_yapimi_kuponguncelle=="Deplasman İkinci Yarı Tam Gol Sayısı"){
$secilen_translate = getTranslation('fcanlioran48');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 1 Gol Farkla Kazanirmi ?"){
$secilen_translate = getTranslation('fcanlioran49');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 2 Gol Farkla Kazanirmi ?"){
$secilen_translate = getTranslation('fcanlioran50');
} else if($secim_yapimi_kuponguncelle=="Herhangi Bir Takım 3 Gol Farkla Kazanirmi ?"){
$secilen_translate = getTranslation('fcanlioran51');
} else if($secim_yapimi_kuponguncelle=="1.Yarı Sonucu"){
$secilen_translate = getTranslation('fcanlioran52');
} else if($secim_yapimi_kuponguncelle=="2.Yarı Sonucu"){
$secilen_translate = getTranslation('fcanlioran53');
} else if($secim_yapimi_kuponguncelle=="İlk Yarıda Kaç Gol Olur ?"){
$secilen_translate = getTranslation('fcanlioran54');
} else if($secim_yapimi_kuponguncelle=="2.Yarıda Toplam Kaç Gol Olur ?"){
$secilen_translate = getTranslation('fcanlioran55');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-4+)"){
$secilen_translate = getTranslation('fcanlioran56');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-5+)"){
$secilen_translate = getTranslation('fcanlioran57');
} else if($secim_yapimi_kuponguncelle=="Müsabakada kaç gol atılır? (0-6+)"){
$secilen_translate = getTranslation('fcanlioran58');
} else if($secim_yapimi_kuponguncelle=="1. yarıda 1.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran59');
} else if($secim_yapimi_kuponguncelle=="1.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran60');
} else if($secim_yapimi_kuponguncelle=="2.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran61');
} else if($secim_yapimi_kuponguncelle=="3.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran62');
} else if($secim_yapimi_kuponguncelle=="4.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran63');
} else if($secim_yapimi_kuponguncelle=="5.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran64');
} else if($secim_yapimi_kuponguncelle=="6.golü hangi takım atar?"){
$secilen_translate = getTranslation('fcanlioran65');
}

} else if($row['spor_tip']=="canlib") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('bcanlioran1');
} else if($secim_yapimi_kuponguncelle=="1X2(1.YARI)"){
$secilen_translate = getTranslation('bcanlioran2');
} else if($secim_yapimi_kuponguncelle=="1X2(2.YARI)"){
$secilen_translate = getTranslation('bcanlioran3');
} else if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran4');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran5');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran6');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran7');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Kim Kazanır"){
$secilen_translate = getTranslation('bcanlioran8');
} else if($secim_yapimi_kuponguncelle=="Toplam Skor Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran9');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran10');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran11');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran12');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Toplam Alt/Üst"){
$secilen_translate = getTranslation('bcanlioran13');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran14');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran15');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran16');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Handikap"){
$secilen_translate = getTranslation('bcanlioran17');
} else if($secim_yapimi_kuponguncelle=="1.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran18');
} else if($secim_yapimi_kuponguncelle=="2.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran19');
} else if($secim_yapimi_kuponguncelle=="3.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran20');
} else if($secim_yapimi_kuponguncelle=="4.Çeyrek Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran21');
} else if($secim_yapimi_kuponguncelle=="Toplam Tek/Çift"){
$secilen_translate = getTranslation('bcanlioran22');
}

} else if($row['spor_tip']=="canlit") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
$secilen_translate = getTranslation('tcanlioran1');
} else if($secim_yapimi_kuponguncelle=="Set Bahisi"){
$secilen_translate = getTranslation('tcanlioran2');
}

} else if($row['spor_tip']=="canliv") {

if($secim_yapimi_kuponguncelle=="Kim Kazanır"){
$secilen_translate = getTranslation('vcanlioran1');
} else if($secim_yapimi_kuponguncelle=="1.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran2');
} else if($secim_yapimi_kuponguncelle=="2.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran3');
} else if($secim_yapimi_kuponguncelle=="3.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran4');
} else if($secim_yapimi_kuponguncelle=="4.Seti Kim Kazanır ?"){
$secilen_translate = getTranslation('vcanlioran5');
} else if($secim_yapimi_kuponguncelle=="Set bahisi (5 maç üzerinden)"){
$secilen_translate = getTranslation('vcanlioran6');
} else if($secim_yapimi_kuponguncelle=="Toplam Kaç Set Oynanır ?"){
$secilen_translate = getTranslation('vcanlioran7');
} else if($secim_yapimi_kuponguncelle=="1.Takım Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran8');
} else if($secim_yapimi_kuponguncelle=="2.Takım Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran9');
} else if($secim_yapimi_kuponguncelle=="1.Takım 1.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran10');
} else if($secim_yapimi_kuponguncelle=="2.Takım 1.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran11');
} else if($secim_yapimi_kuponguncelle=="1.Takım 2.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran12');
} else if($secim_yapimi_kuponguncelle=="2.Takım 2.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran13');
} else if($secim_yapimi_kuponguncelle=="1.Takım 3.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran14');
} else if($secim_yapimi_kuponguncelle=="2.Takım 3.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran15');
} else if($secim_yapimi_kuponguncelle=="1.Takım 4.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran16');
} else if($secim_yapimi_kuponguncelle=="2.Takım 4.Set Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran17');
} else if($secim_yapimi_kuponguncelle=="Toplam Sayı Alt/Üst"){
$secilen_translate = getTranslation('vcanlioran18');
} else if($secim_yapimi_kuponguncelle=="Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran19');
} else if($secim_yapimi_kuponguncelle=="1.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran20');
} else if($secim_yapimi_kuponguncelle=="2.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran21');
} else if($secim_yapimi_kuponguncelle=="3.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran22');
} else if($secim_yapimi_kuponguncelle=="4.Set Toplam Sayı Tek/Çift"){
$secilen_translate = getTranslation('vcanlioran23');
} else if($secim_yapimi_kuponguncelle=="Müsabaka 5.Set Sürermi"){
$secilen_translate = getTranslation('vcanlioran24');
}

} else if($row['spor_tip']=="canlibuz") {

if($secim_yapimi_kuponguncelle=="1X2"){
$secilen_translate = getTranslation('buzcanlioran1');
} else if($secim_yapimi_kuponguncelle=="Çifte Şans"){
$secilen_translate = getTranslation('buzcanlioran2');
} else if($secim_yapimi_kuponguncelle=="Cifte Sans"){
$secilen_translate = getTranslation('buzcanlioran2');
} else if($secim_yapimi_kuponguncelle=="Hangi periyod daha cok gol olur?"){
$secilen_translate = getTranslation('buzcanlioran3');
}

}

if($dil_bilgisi22['language']=='en'){

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "Y";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "N";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "U";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "O";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 and O";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 and O";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 and U";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 and U";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 and Y";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 and Y";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 and N";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 and N";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "No Goal";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "X and Y";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "D";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "S";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else if($dil_bilgisi22['language']=='de'){ 

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "J";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "K";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "N";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "T";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 und T";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 und T";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 und N";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 und N";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 und J";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 und J";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 und K";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 und K";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "Kein Ziel";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "X und J";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "P";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "E";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else if($dil_bilgisi22['language']=='ar'){ 

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "أجل";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "لا";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "أدنى";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "أعلى";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 وما فوق";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 وما فوق";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 و السفلى";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 و السفلى";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 و نعم";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 و نعم";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 و لا";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 و لا";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "لا هدف";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "س ونعم";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "زوجان";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "واحد";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else if($dil_bilgisi22['language']=='ru'){ 

if($secim_yapimi_kuponguncelle2=="E"){ $secilen_translate2 = "да";
} else if($secim_yapimi_kuponguncelle2=="H"){ $secilen_translate2 = "нет";
} else if($secim_yapimi_kuponguncelle2=="A"){ $secilen_translate2 = "ниже";
} else if($secim_yapimi_kuponguncelle2=="Ü"){ $secilen_translate2 = "топ";
} else if($secim_yapimi_kuponguncelle2=="1 ve Ü"){ $secilen_translate2 = "1 и выше";
} else if($secim_yapimi_kuponguncelle2=="2 ve Ü"){ $secilen_translate2 = "2 и выше";
} else if($secim_yapimi_kuponguncelle2=="1 ve A"){ $secilen_translate2 = "1 и ниже";
} else if($secim_yapimi_kuponguncelle2=="2 ve A"){ $secilen_translate2 = "2 и ниже";
} else if($secim_yapimi_kuponguncelle2=="1 ve V"){ $secilen_translate2 = "1 и да";
} else if($secim_yapimi_kuponguncelle2=="2 ve V"){ $secilen_translate2 = "2 и да";
} else if($secim_yapimi_kuponguncelle2=="1 ve Y"){ $secilen_translate2 = "1 и нет";
} else if($secim_yapimi_kuponguncelle2=="2 ve Y"){ $secilen_translate2 = "2 и нет";
} else if($secim_yapimi_kuponguncelle2=="Gol Yok"){ $secilen_translate2 = "Нет цели";
} else if($secim_yapimi_kuponguncelle2=="X ve V"){ $secilen_translate2 = "Х и да";
} else if($secim_yapimi_kuponguncelle2=="Ç"){ $secilen_translate2 = "пара";
} else if($secim_yapimi_kuponguncelle2=="T"){ $secilen_translate2 = "один";
} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

} else { 
$secilen_translate2 = $secim_yapimi_kuponguncelle2;
}

?>
<div class="kuponline">
<div class="mac_tanim"><?=$row['mac_kodu']; ?> <strong><? echo "$row[ev_takim] - $row[konuk_takim]"; ?> <? if($row['spor_tip']!="canli" || $row['spor_tip']!="canlibasket") { ?>(<?=date("d.m H:i",$row['mac_time']); ?>)<? } ?></strong><span><?="".number_format($row['oran'],2)."";?></span></div>
<div class="oranbilgileri"><?=$secilen_translate;?> : <?=$secilen_translate2;?> <? if(!empty($row['oran_val'])) { echo "($row[oran_val])"; } ?></div>
<div class="clear"></div>
</div>
<? } ?>

<div class="oranlar">
<span><?=getTranslation('printkupon9')?></span>
<font><?=nf($kupon['oran']); ?></font>
<div class="clear"></div>
</div>
<div class="oranlar">
<span><?=getTranslation('printkupon22')?></span>
<font><?=nf($kupon['yatan']); ?></font>
<div class="clear"></div>
</div>

<? if(!empty($ubsi['kazananyuzde']) && $ubsi['kazananyuzde']!="0") { ?>

<div class="oranlar">
<span><?=getTranslation('printkupon23')?></span>
<font><? 
if(!empty($ubsi['kazananyuzde'])) { $yuzdesi = yuzdele($ubsi['kazananyuzde']); 
$kesinti = $kupon['tutar']*$yuzdesi;
$gercektutar = $kupon['tutar']-$kesinti;
} else {
$gercektutar = $kupon['tutar'];	
}
echo nf($gercektutar); 
?></font>
<div class="clear"></div>
</div>
<? } else { ?>
<div class="oranlar">
<span><?=getTranslation('printkupon24')?></span>
<font><?=nf($kupon['tutar']); ?></font>
<div class="clear"></div>
</div>
<? } ?>
</div>
<? } ?>

<? } ?>

<script type="text/javascript">
setTimeout(function(){
window.print();
window.close();
}, 10);
</script>
</body>
</html>