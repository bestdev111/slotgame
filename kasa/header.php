<?php
if($ub['wkyetki']>1) { header("Location:../index.php"); } else if($ub['id']==1) { header("Location:../admin"); }
$mesajvarmimenuicin = sed_sql_numrows(sed_sql_query("select okundu,alan_id,gonderen_id from chat where alan_id='$ub[id]' and okundu='0' group by gonderen_id"));
$dil_bilgisi = bilgi("select * from language_content where name='".$ub['username']."' limit 1");
?>
<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no">
<meta name="theme-color" content="#ffffff">
<title><?=getTranslation('yeniyerler_kasa1')?></title>
<link href="Content/css/bootstrap.min.css?v=110520180210" rel="stylesheet">
<link href="Content/css/font-awesome.min.css?v=110520180210" rel="stylesheet">
<link href="Content/css/easy-autocomplete.min.css?v=110520180210" rel="stylesheet">
<link href="Content/css/default.css?v=110520180210" rel="stylesheet">
<link href="Content/css/default.date.css?v=110520180210" rel="stylesheet">
<link href="Content/css/style.css?v=110520180210" rel="stylesheet">
<link href="Content/css/paged-list.css?v=110520180210" rel="stylesheet">
<link href="Content/css/style-body.css?v=110520180210" rel="stylesheet">
<script src="Content/js/jquery.min.js?v=110520180210"></script>

<link rel="stylesheet" type="text/css" href="tarihs/YhgdfAS.css?v=3.4.8"/>
<script type="text/javascript" src="tarihs/YhgdfAS.js?v=3.4.8"></script>

</head>

<script>
function geridon(){
javascript:history.go(-1);
}
</script>

<body class="navbar-fixed sidebar-nav fixed-nav">

<header class="navbar">
<div class="container-fluid">
<button class="navbar-toggler mobile-toggler hidden-lg-up" type="button">☰</button>
<a class="navbar-brand" href="#" style="background-size: 150px auto;background-image:url(Content/img/logots.png);"></a>
<ul class="nav navbar-nav hidden-md-down">
<li class="nav-item">
<a class="nav-link navbar-toggler layout-toggler" href="#">☰</a>
</li>
</ul>
<ul class="nav navbar-nav pull-xs-right hidden-xs-down">
<li class="nav-item px-1">
<span data-toggle="tooltip" data-placement="left"><?=getTranslation('superadmin1')?> <strong><?=$ub['username'];?></strong></span>
</li>
</ul>
</div>
</header>

<? if($ub['alt_alt_durum']>0) { // Super Admin ?>

<div class="sidebar">
<nav class="sidebar-nav">
<ul class="nav">
<li class="nav-item"> <a class="nav-link active-ps" href="index.php"><i class="fa fa-home"></i> <?=getTranslation('superadmin2')?></a> </li>

<li class="nav-item nav-dropdown">
<a class="nav-link nav-dropdown-toggle" href="#">
<? if($dil_bilgisi['language']=='tr'){?>
<img alt="flag" style="margin-top: -2px;" src="Content/flags/tr.png" width="25" height="25">
<? } else if($dil_bilgisi['language']=='en'){?>
<img alt="flag" style="margin-top: -2px;" src="Content/flags/en.png" width="25" height="25">
<? } else if($dil_bilgisi['language']=='de'){?>
<img alt="flag" style="margin-top: -2px;" src="Content/flags/de.png" width="25" height="25">
<? } else if($dil_bilgisi['language']=='ar'){?>
<img alt="flag" style="margin-top: -2px;" src="Content/flags/ar.png" width="25" height="25">
<? } else if($dil_bilgisi['language']=='ru'){?>
<img alt="flag" style="margin-top: -2px;" src="Content/flags/ru.png" width="25" height="25">
<? } else { ?>
<img alt="flag" style="margin-top: -2px;" src="Content/flags/tr.png" width="25" height="25">
<? } ?> <?=getTranslation('superadmin12')?></a>
<ul class="nav-dropdown-items">
<li class="nav-item"> <a class="nav-link active-ps" href="../spor-bahisleri?language=tr"><img src="Content/flags/tr.png" style="width: 18px;height: 20px;margin-top: -3px;" alt="flag"> <?=getTranslation('dilsecimi1')?> <? if($dil_bilgisi['language']=='tr'){?><font style="color:#f00;">(<?=getTranslation('superadmin13')?>)</font><? } ?></a> </li>
<li class="nav-item"> <a class="nav-link active-ps" href="../spor-bahisleri?language=en"><img src="Content/flags/en.png" style="width: 18px;height: 20px;margin-top: -3px;" alt="flag"> <?=getTranslation('dilsecimi2')?> <? if($dil_bilgisi['language']=='en'){?><font style="color:#f00;">(<?=getTranslation('superadmin13')?>)</font><? } ?></a> </li>
<li class="nav-item"> <a class="nav-link active-ps" href="../spor-bahisleri?language=de"><img src="Content/flags/de.png" style="width: 18px;height: 20px;margin-top: -3px;" alt="flag"> <?=getTranslation('dilsecimi3')?> <? if($dil_bilgisi['language']=='de'){?><font style="color:#f00;">(<?=getTranslation('superadmin13')?>)</font><? } ?></a> </li>
<li class="nav-item"> <a class="nav-link active-ps" href="../spor-bahisleri?language=ar"><img src="Content/flags/ar.png" style="width: 18px;height: 20px;margin-top: -3px;" alt="flag"> <?=getTranslation('dilsecimi4')?> <? if($dil_bilgisi['language']=='ar'){?><font style="color:#f00;">(<?=getTranslation('superadmin13')?>)</font><? } ?></a> </li>
<li class="nav-item"> <a class="nav-link active-ps" href="../spor-bahisleri?language=ru"><img src="Content/flags/ru.png" style="width: 18px;height: 20px;margin-top: -3px;" alt="flag"> <?=getTranslation('dilsecimi5')?> <? if($dil_bilgisi['language']=='ru'){?><font style="color:#f00;">(<?=getTranslation('superadmin13')?>)</font><? } ?></a> </li>
</ul>
</li>

<li class="nav-item nav-dropdown">
<a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-money"></i> <?=getTranslation('yeniyerler_kasa2')?></a>
<ul class="nav-dropdown-items">
<li class="nav-item"><a class="nav-link active-ps" href="hesapraporu.php"><?=getTranslation('yeniyerler_kasa4')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="kuponraporu.php"><?=getTranslation('yeniyerler_kasa5')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="bakiyeraporu.php"><?=getTranslation('yeniyerler_kasa6')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="casinohesapraporu.php"><?=getTranslation('yeniyerler_kasa7')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="casinooyunhesapraporu.php"><?=getTranslation('yeniyerler_kasa8')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="hesaprapor.php"><?=getTranslation('yeniyerler_kasa506')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="rapordetay.php"><?=getTranslation('yeniyerler_kasa507')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="chesaprapor.php"><?=getTranslation('yeniyerler_kasa508')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="crapordetay.php"><?=getTranslation('yeniyerler_kasa509')?></a></li>
</ul>
</li>

<li class="nav-item nav-dropdown">
<a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-user"></i> <?=getTranslation('yeniyerler_kasa9')?></a>
<ul class="nav-dropdown-items">
<li class="nav-item"><a class="nav-link active-ps" href="users.php"><?=getTranslation('yeniyerler_kasa10')?></a></li>

<? if($ub['sahip']=="1") { // Joker Admin ?>
<li class="nav-item"> <a class="nav-link active-ps" href="adduser2.php"><?=getTranslation('yeniyerler_kasa11')?></a> </li>
<? } else if($ub['alt_alt_durum']>0) { // Super Admin ?>
<li class="nav-item"> <a class="nav-link active-ps" href="adduser.php"><?=getTranslation('yeniyerler_kasa11')?></a> </li>
<? } ?>

<li class="nav-item"><a class="nav-link active-ps" href="girislog.php"><?=getTranslation('yeniyerler_kasa12')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="karaliste.php"><?=getTranslation('yeniyerler_kasa13')?></a></li>
</ul>
</li>

<li class="nav-item nav-dropdown">
<a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-cogs"></i> <?=getTranslation('yeniyerler_kasa18')?></a>
<ul class="nav-dropdown-items">
<li class="nav-item"><a class="nav-link active-ps" href="spordallari.php"><?=getTranslation('yeniyerler_kasa19')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="oyunlar.php"><?=getTranslation('yeniyerler_kasa20')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="canlioyunlar.php"><?=getTranslation('yeniyerler_kasa21')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="bahisler.php"><?=getTranslation('yeniyerler_kasa22')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="canlibahisler.php"><?=getTranslation('yeniyerler_kasa23')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="macoranarttirazalt.php"><?=getTranslation('yeniyerler_kasa24')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="toplumbs.php"><?=getTranslation('yeniyerler_kasa25')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="ligler.php"><?=getTranslation('yeniyerler_kasa27')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="canliligler.php"><?=getTranslation('yeniyerler_kasa482')?></a></li>
</ul>
</li>

<li class="nav-item nav-dropdown">
<a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-cogs"></i> <?=getTranslation('yeniyerler_kasa28')?></a>
<ul class="nav-dropdown-items">
<li class="nav-item"><a class="nav-link active-ps" href="ayarlar.php"><?=getTranslation('yeniyerler_kasa29')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="yogunluk.php"><?=getTranslation('yeniyerler_kasa30')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="kupondegisimlog.php"><?=getTranslation('yeniyerler_kasa31')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="sistemdekiler.php"><?=getTranslation('yeniyerler_kasa32')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="sistemackapat.php"><?=getTranslation('yeniyerler_kasa33')?></a></li>
</ul>
</li>

<li class="nav-item"><a class="nav-link active-ps" href="kuponlar.php"><i class="fa fa-ticket"></i> <?=getTranslation('yeniyerler_kasa35')?></a></li>

<li class="nav-item"><a class="nav-link active-ps" href="casinokuponlar.php"><i class="fa fa-ticket"></i> <?=getTranslation('yeniyerler_kasa36')?></a></li>

<li class="nav-item"> <a class="nav-link active-ps" href="mesajlar.php"><i class="fa fa-paper-plane"></i> <?=getTranslation('yeniyerler_kasa37')?> ( <? if($mesajvarmimenuicin>0) { ?><?=$mesajvarmimenuicin;?><? } else { ?>0<? } ?> )</a> </li>

<li class="nav-item"> <a class="nav-link active-ps" href="sifredegistir.php"><i class="fa fa-cog"></i> <?=getTranslation('yeniyerler_kasa38')?></a> </li>

<li class="nav-item"> <a class="nav-link" href="index.php?logout=1" onClick="return confirm('<?=getTranslation('yeniyerler_kasa40')?>')"><i class="fa fa-sign-out"></i> <?=getTranslation('yeniyerler_kasa39')?></a> </li>

</ul>
</nav>
</div>

<? } else if($ub['alt_durum']>0) { // Admin ?>

<div class="sidebar">
<nav class="sidebar-nav">
<ul class="nav">
<li class="nav-item"> <a class="nav-link active-ps" href="index.php"><i class="fa fa-home"></i> <?=getTranslation('yeniyerler_kasa3')?></a> </li>

<li class="nav-item nav-dropdown">
<a class="nav-link nav-dropdown-toggle" href="#">
<? if($dil_bilgisi['language']=='tr'){?>
<img alt="flag" style="margin-top: -2px;" src="Content/flags/tr.png" width="25" height="25">
<? } else if($dil_bilgisi['language']=='en'){?>
<img alt="flag" style="margin-top: -2px;" src="Content/flags/en.png" width="25" height="25">
<? } else if($dil_bilgisi['language']=='de'){?>
<img alt="flag" style="margin-top: -2px;" src="Content/flags/de.png" width="25" height="25">
<? } else if($dil_bilgisi['language']=='ar'){?>
<img alt="flag" style="margin-top: -2px;" src="Content/flags/ar.png" width="25" height="25">
<? } else if($dil_bilgisi['language']=='ru'){?>
<img alt="flag" style="margin-top: -2px;" src="Content/flags/ru.png" width="25" height="25">
<? } else { ?>
<img alt="flag" style="margin-top: -2px;" src="Content/flags/tr.png" width="25" height="25">
<? } ?> <?=getTranslation('superadmin12')?></a>
<ul class="nav-dropdown-items">
<li class="nav-item"> <a class="nav-link active-ps" href="../spor-bahisleri?language=tr"><img src="Content/flags/tr.png" style="width: 18px;height: 20px;margin-top: -3px;" alt="flag"> <?=getTranslation('dilsecimi1')?> <? if($dil_bilgisi['language']=='tr'){?><font style="color:#f00;">(<?=getTranslation('superadmin13')?>)</font><? } ?></a> </li>
<li class="nav-item"> <a class="nav-link active-ps" href="../spor-bahisleri?language=en"><img src="Content/flags/en.png" style="width: 18px;height: 20px;margin-top: -3px;" alt="flag"> <?=getTranslation('dilsecimi2')?> <? if($dil_bilgisi['language']=='en'){?><font style="color:#f00;">(<?=getTranslation('superadmin13')?>)</font><? } ?></a> </li>
<li class="nav-item"> <a class="nav-link active-ps" href="../spor-bahisleri?language=de"><img src="Content/flags/de.png" style="width: 18px;height: 20px;margin-top: -3px;" alt="flag"> <?=getTranslation('dilsecimi3')?> <? if($dil_bilgisi['language']=='de'){?><font style="color:#f00;">(<?=getTranslation('superadmin13')?>)</font><? } ?></a> </li>
<li class="nav-item"> <a class="nav-link active-ps" href="../spor-bahisleri?language=ar"><img src="Content/flags/ar.png" style="width: 18px;height: 20px;margin-top: -3px;" alt="flag"> <?=getTranslation('dilsecimi4')?> <? if($dil_bilgisi['language']=='ar'){?><font style="color:#f00;">(<?=getTranslation('superadmin13')?>)</font><? } ?></a> </li>
<li class="nav-item"> <a class="nav-link active-ps" href="../spor-bahisleri?language=ru"><img src="Content/flags/ru.png" style="width: 18px;height: 20px;margin-top: -3px;" alt="flag"> <?=getTranslation('dilsecimi5')?> <? if($dil_bilgisi['language']=='ru'){?><font style="color:#f00;">(<?=getTranslation('superadmin13')?>)</font><? } ?></a> </li>
</ul>
</li>

<li class="nav-item nav-dropdown">
<a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-money"></i> <?=getTranslation('yeniyerler_kasa2')?></a>
<ul class="nav-dropdown-items">
<li class="nav-item"><a class="nav-link active-ps" href="hesapraporu.php"><?=getTranslation('yeniyerler_kasa4')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="kuponraporu.php"><?=getTranslation('yeniyerler_kasa5')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="bakiyeraporu.php"><?=getTranslation('yeniyerler_kasa6')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="casinohesapraporu.php"><?=getTranslation('yeniyerler_kasa7')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="casinooyunhesapraporu.php"><?=getTranslation('yeniyerler_kasa8')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="hesaprapor.php"><?=getTranslation('yeniyerler_kasa507')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="rapordetay.php"><?=getTranslation('yeniyerler_kasa507')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="chesaprapor.php"><?=getTranslation('yeniyerler_kasa508')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="crapordetay.php"><?=getTranslation('yeniyerler_kasa509')?></a></li>
</ul>
</li>

<li class="nav-item nav-dropdown">
<a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-user"></i> <?=getTranslation('yeniyerler_kasa9')?></a>
<ul class="nav-dropdown-items">
<li class="nav-item"><a class="nav-link active-ps" href="users.php"><?=getTranslation('yeniyerler_kasa10')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="adduseradmin.php"><?=getTranslation('yeniyerler_kasa11')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="girislog.php"><?=getTranslation('yeniyerler_kasa12')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="karaliste.php"><?=getTranslation('yeniyerler_kasa13')?></a></li>
</ul>
</li>
<li class="nav-item nav-dropdown">
<a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-cogs"></i> <?=getTranslation('yeniyerler_kasa14')?></a>
<ul class="nav-dropdown-items">
<li class="nav-item"><a class="nav-link active-ps" href="casinodallari.php"><?=getTranslation('yeniyerler_kasa15')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="casinoayarlari.php"><?=getTranslation('yeniyerler_kasa16')?></a></li>
</ul>
</li>

<? if($ayar['rulet_yetki']>0) { ?>
<li class="nav-item"><a class="nav-link active-ps" href="ruletayarlar.php"><i class="fa fa-cogs"></i> <?=getTranslation('yeniyerler_kasa17')?></a></li>
<? } ?>

<li class="nav-item nav-dropdown">
<a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-cogs"></i> <?=getTranslation('yeniyerler_kasa18')?></a>
<ul class="nav-dropdown-items">
<li class="nav-item"><a class="nav-link active-ps" href="spordallari.php"><?=getTranslation('yeniyerler_kasa19')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="oyunlar.php"><?=getTranslation('yeniyerler_kasa20')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="canlioyunlar.php"><?=getTranslation('yeniyerler_kasa21')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="bahisler.php"><?=getTranslation('yeniyerler_kasa22')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="canlibahisler.php"><?=getTranslation('yeniyerler_kasa23')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="macoranarttirazalt.php"><?=getTranslation('yeniyerler_kasa24')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="livemacoranarttirazalt.php"><?=getTranslation('yeniyerler_kasa26')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="toplumbs.php"><?=getTranslation('yeniyerler_kasa25')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="ligler.php"><?=getTranslation('yeniyerler_kasa27')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="canliligler.php"><?=getTranslation('yeniyerler_kasa482')?></a></li>
</ul>
</li>

<? if($ub['sistemayarlaryetki']==1){ ?>
<li class="nav-item"><a class="nav-link active-ps" href="ayarlar.php"><i class="fa fa-cogs"></i> <?=getTranslation('yeniyerler_kasa29')?></a></li>
<? } ?>

<li class="nav-item"><a class="nav-link active-ps" href="kuponlar.php"><i class="fa fa-ticket"></i> <?=getTranslation('yeniyerler_kasa35')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="casinokuponlar.php"><i class="fa fa-ticket"></i> <?=getTranslation('yeniyerler_kasa36')?></a></li>
<li class="nav-item nav-dropdown">
<a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-cogs"></i> <?=getTranslation('yeniyerler_kasa28')?></a>
<ul class="nav-dropdown-items">

<li class="nav-item"><a class="nav-link active-ps" href="yogunluk.php"><?=getTranslation('yeniyerler_kasa30')?></a></li>
<? if($ub['kupon_yetki']=="1") { ?>
<li class="nav-item"><a class="nav-link active-ps" href="kupondegisimlog.php"><?=getTranslation('yeniyerler_kasa31')?></a></li>
<? } ?>
<li class="nav-item"><a class="nav-link active-ps" href="sistemdekiler.php"><?=getTranslation('yeniyerler_kasa32')?></a></li>

<li class="nav-item"><a class="nav-link active-ps" href="sistemackapat.php"><?=getTranslation('yeniyerler_kasa33')?></a></li>


<li class="nav-item"><a class="nav-link active-ps" href="duyurular.php"><?=getTranslation('yeniyerler_kasa34')?></a></li>

</ul>
</li>

<li class="nav-item"> <a class="nav-link active-ps" href="mesajlar.php"><i class="fa fa-paper-plane"></i> <?=getTranslation('yeniyerler_kasa37')?> ( <? if($mesajvarmimenuicin>0) { ?><?=$mesajvarmimenuicin;?><? } else { ?>0<? } ?> )</a> </li>

<li class="nav-item"><a class="nav-link active-ps" href="sifredegistir.php"><i class="fa fa-cog"></i> <?=getTranslation('yeniyerler_kasa38')?></a></li>

<li class="nav-item"> <a class="nav-link" href="index.php?logout=1" onClick="return confirm('<?=getTranslation('yeniyerler_kasa40')?>')"><i class="fa fa-sign-out"></i> <?=getTranslation('yeniyerler_kasa39')?></a> </li>

</ul>
</nav>
</div>

<? } else if($ub['wkyetki']=="1") { // Süper Bayi ?>

<div class="sidebar">
<nav class="sidebar-nav">
<ul class="nav">
<li class="nav-item"> <a class="nav-link active-ps" href="index.php"><i class="fa fa-home"></i> <?=getTranslation('superadmin2')?></a> </li>

<li class="nav-item nav-dropdown">
<a class="nav-link nav-dropdown-toggle" href="#">
<? if($dil_bilgisi['language']=='tr'){?>
<img alt="flag" style="margin-top: -2px;" src="Content/flags/tr.png" width="25" height="25">
<? } else if($dil_bilgisi['language']=='en'){?>
<img alt="flag" style="margin-top: -2px;" src="Content/flags/en.png" width="25" height="25">
<? } else if($dil_bilgisi['language']=='de'){?>
<img alt="flag" style="margin-top: -2px;" src="Content/flags/de.png" width="25" height="25">
<? } else if($dil_bilgisi['language']=='ar'){?>
<img alt="flag" style="margin-top: -2px;" src="Content/flags/ar.png" width="25" height="25">
<? } else if($dil_bilgisi['language']=='ru'){?>
<img alt="flag" style="margin-top: -2px;" src="Content/flags/ru.png" width="25" height="25">
<? } else { ?>
<img alt="flag" style="margin-top: -2px;" src="Content/flags/tr.png" width="25" height="25">
<? } ?> <?=getTranslation('superadmin12')?></a>
<ul class="nav-dropdown-items">
<li class="nav-item"> <a class="nav-link active-ps" href="../spor-bahisleri?language=tr"><img src="Content/flags/tr.png" style="width: 18px;height: 20px;margin-top: -3px;" alt="flag"> <?=getTranslation('dilsecimi1')?> <? if($dil_bilgisi['language']=='tr'){?><font style="color:#f00;">(<?=getTranslation('superadmin13')?>)</font><? } ?></a> </li>
<li class="nav-item"> <a class="nav-link active-ps" href="../spor-bahisleri?language=en"><img src="Content/flags/en.png" style="width: 18px;height: 20px;margin-top: -3px;" alt="flag"> <?=getTranslation('dilsecimi2')?> <? if($dil_bilgisi['language']=='en'){?><font style="color:#f00;">(<?=getTranslation('superadmin13')?>)</font><? } ?></a> </li>
<li class="nav-item"> <a class="nav-link active-ps" href="../spor-bahisleri?language=de"><img src="Content/flags/de.png" style="width: 18px;height: 20px;margin-top: -3px;" alt="flag"> <?=getTranslation('dilsecimi3')?> <? if($dil_bilgisi['language']=='de'){?><font style="color:#f00;">(<?=getTranslation('superadmin13')?>)</font><? } ?></a> </li>
<li class="nav-item"> <a class="nav-link active-ps" href="../spor-bahisleri?language=ar"><img src="Content/flags/ar.png" style="width: 18px;height: 20px;margin-top: -3px;" alt="flag"> <?=getTranslation('dilsecimi4')?> <? if($dil_bilgisi['language']=='ar'){?><font style="color:#f00;">(<?=getTranslation('superadmin13')?>)</font><? } ?></a> </li>
<li class="nav-item"> <a class="nav-link active-ps" href="../spor-bahisleri?language=ru"><img src="Content/flags/ru.png" style="width: 18px;height: 20px;margin-top: -3px;" alt="flag"> <?=getTranslation('dilsecimi5')?> <? if($dil_bilgisi['language']=='ru'){?><font style="color:#f00;">(<?=getTranslation('superadmin13')?>)</font><? } ?></a> </li>
</ul>
</li>

<li class="nav-item nav-dropdown">
<a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-money"></i> <?=getTranslation('yeniyerler_kasa2')?></a>
<ul class="nav-dropdown-items">
<li class="nav-item"><a class="nav-link active-ps" href="hesapraporu.php"><?=getTranslation('yeniyerler_kasa4')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="kuponraporu.php"><?=getTranslation('yeniyerler_kasa5')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="bakiyeraporu.php"><?=getTranslation('yeniyerler_kasa6')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="casinohesapraporu.php"><?=getTranslation('yeniyerler_kasa7')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="casinooyunhesapraporu.php"><?=getTranslation('yeniyerler_kasa8')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="hesaprapor.php"><?=getTranslation('yeniyerler_kasa506')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="rapordetay.php"><?=getTranslation('yeniyerler_kasa507')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="chesaprapor.php"><?=getTranslation('yeniyerler_kasa508')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="crapordetay.php"><?=getTranslation('yeniyerler_kasa509')?></a></li>
</ul>
</li>

<li class="nav-item nav-dropdown">
<a class="nav-link nav-dropdown-toggle" href="#" style="color: #f00;font-weight: bold;"><i class="fa fa-user"></i> <?=getTranslation('menuuyelik')?></a>
<ul class="nav-dropdown-items">
<li class="nav-item"><a class="nav-link active-ps" href="users.php"><?=getTranslation('menuuyelistesi')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="addusermusteri.php"><?=getTranslation('menuuyeolustur')?></a></li>
<li class="nav-item"><a class="nav-link active-ps" href="karaliste.php"><?=getTranslation('menukaraliste')?></a></li>
</ul>
</li>

<li class="nav-item"><a class="nav-link active-ps" href="kuponlar.php"><i class="fa fa-ticket"></i> <?=getTranslation('yeniyerler_kasa35')?></a></li>
<? if($ayar['casino_yetki']>0) { ?>
<li class="nav-item"><a class="nav-link active-ps" href="casinokuponlar.php"><i class="fa fa-ticket"></i> <?=getTranslation('yeniyerler_kasa36')?></a></li>
<? } ?>
<li class="nav-item"> <a class="nav-link active-ps" href="girislog.php"><i class="fa fa-list-alt"></i> <?=getTranslation('superadmin10')?></a> </li>

<li class="nav-item"> <a class="nav-link active-ps" href="mesajlar.php"><i class="fa fa-paper-plane"></i> <?=getTranslation('yeniyerler_kasa37')?> ( <? if($mesajvarmimenuicin>0) { ?><?=$mesajvarmimenuicin;?><? } else { ?>0<? } ?> )</a> </li>

<li class="nav-item"><a class="nav-link active-ps" href="sifredegistir.php"><i class="fa fa-cog"></i> <?=getTranslation('superadmin11')?></a></li>

<li class="nav-item"> <a class="nav-link" href="index.php?logout=1" onClick="return confirm('<?=getTranslation('superadmin14')?>')"><i class="fa fa-sign-out"></i> <?=getTranslation('superadmin15')?></a> </li>

</ul>
</nav>
</div>

<? } ?>

<script>
var A_TCALCONF={'cssprefix':'tcal','months':['<?=getTranslation('tarihsecmeay_1');?>','<?=getTranslation('tarihsecmeay_2');?>','<?=getTranslation('tarihsecmeay_3');?>','<?=getTranslation('tarihsecmeay_4');?>','<?=getTranslation('tarihsecmeay_5');?>','<?=getTranslation('tarihsecmeay_6');?>','<?=getTranslation('tarihsecmeay_7');?>','<?=getTranslation('tarihsecmeay_8');?>','<?=getTranslation('tarihsecmeay_9');?>','<?=getTranslation('tarihsecmeay_10');?>','<?=getTranslation('tarihsecmeay_11');?>','<?=getTranslation('tarihsecmeay_12');?>'],'weekdays':['<?=getTranslation('tarihsecmegun_kisa_1');?>','<?=getTranslation('tarihsecmegun_kisa_2');?>','<?=getTranslation('tarihsecmegun_kisa_3');?>','<?=getTranslation('tarihsecmegun_kisa_4');?>','<?=getTranslation('tarihsecmegun_kisa_5');?>','<?=getTranslation('tarihsecmegun_kisa_6');?>','<?=getTranslation('tarihsecmegun_kisa_7');?>'],'longwdays':['<?=getTranslation('tarihsecmegun_1');?>','<?=getTranslation('tarihsecmegun_2');?>','<?=getTranslation('tarihsecmegun_3');?>','<?=getTranslation('tarihsecmegun_4');?>','<?=getTranslation('tarihsecmegun_5');?>','<?=getTranslation('tarihsecmegun_6');?>','<?=getTranslation('tarihsecmegun_7');?>'],'yearscroll':true,'weekstart':0,'prevyear':'Previous Year','nextyear':'Next Year','prevmonth':'Previous Month','nextmonth':'Next Month','format':'d-m-Y'};
</script>