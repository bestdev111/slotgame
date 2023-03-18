<?php
if($ub['id']!=1) { header("Location:../index.php"); }
?>
<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no">
<meta name="theme-color" content="#ffffff">
<title>Partnerweb/Administrator</title>
<link href="Content/css/bootstrap.min.css?v=110520180210" rel="stylesheet">
<link href="Content/css/font-awesome.min.css?v=110520180210" rel="stylesheet">
<link href="Content/css/easy-autocomplete.min.css?v=110520180210" rel="stylesheet">
<link href="Content/css/default.css?v=110520180210" rel="stylesheet">
<link href="Content/css/default.date.css?v=110520180210" rel="stylesheet">
<link href="Content/css/style.css?v=110520180210" rel="stylesheet">
<link href="Content/css/paged-list.css?v=110520180210" rel="stylesheet">
<link href="Content/css/style-body.css?v=110520180210" rel="stylesheet">
<script src="Content/js/jquery.min.js?v=110520180210"></script>

</head>
<body class="navbar-fixed sidebar-nav fixed-nav">

<header class="navbar">
<div class="container-fluid">
<button class="navbar-toggler mobile-toggler hidden-lg-up" type="button">☰</button>
<a class="navbar-brand" href="#" style="background-size: 150px auto;background-image:url(Content/img/logoss.png);"></a>
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

<div class="sidebar">
<nav class="sidebar-nav">
<ul class="nav">

<li class="nav-item"> <a class="nav-link active-ps" href="sifredegistir.php"><i class="fa fa-cog"></i> <?=getTranslation('superadmin11')?></a> </li>

<li class="nav-item"> <a class="nav-link" href="index.php?logout=1" onClick="return confirm('<?=getTranslation('superadmin14')?>')"><i class="fa fa-sign-out"></i> <?=getTranslation('superadmin15')?></a> </li>

<li class="nav-item" style="background-color: #f00;"> <a class="nav-link" href="golduzenleme.php">Gol Düzenleme</a> </li>

<li class="nav-item nav-dropdown <?php if($_SERVER['PHP_SELF'] == "../admin/futbol.php" || $_SERVER['PHP_SELF'] == "../admin/basketbol.php" || $_SERVER['PHP_SELF'] == "../admin/tenis.php" || $_SERVER['PHP_SELF'] == "../admin/voleybol.php" || $_SERVER['PHP_SELF'] == "../admin/buzhokeyi.php" || $_SERVER['PHP_SELF'] == "../admin/masatenisi.php" || $_SERVER['PHP_SELF'] == "../admin/beyzbol.php" || $_SERVER['PHP_SELF'] == "../admin/rugby.php" || $_SERVER['PHP_SELF'] == "../admin/mma.php") { ?> open <?php } ?>">
<a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-user"></i> Bülten Sonuç</a>
<ul class="nav-dropdown-items">
<li class="nav-item"><a class="nav-link active-ps" href="futbol.php">Futbol</a></li>
<li class="nav-item"><a class="nav-link active-ps" href="basketbol.php">Basketbol</a></li>
<li class="nav-item"><a class="nav-link active-ps" href="tenis.php">Tenis</a></li>
<li class="nav-item"><a class="nav-link active-ps" href="voleybol.php">Voleybol</a></li>
<li class="nav-item"><a class="nav-link active-ps" href="buzhokeyi.php">Buz Hokeyi</a></li>
<li class="nav-item"><a class="nav-link active-ps" href="masatenisi.php">Masa Tenisi</a></li>
<li class="nav-item"><a class="nav-link active-ps" href="beyzbol.php">Beyzbol</a></li>
<li class="nav-item"><a class="nav-link active-ps" href="rugby.php">Rugby</a></li>
<li class="nav-item"><a class="nav-link active-ps" href="mma.php">MMA</a></li>
</ul>
</li>

<li class="nav-item"> <a class="nav-link active-ps" href="canlifutbol.php"><i class="fa fa-cog"></i> Canlı Futbol</a> </li>

<li class="nav-item"> <a class="nav-link active-ps" href="canlibasketbol.php"><i class="fa fa-cog"></i> Canlı Basketbol</a> </li>

<li class="nav-item"> <a class="nav-link active-ps" href="canlitenis.php"><i class="fa fa-cog"></i> Canlı Tenis</a> </li>

<li class="nav-item"> <a class="nav-link active-ps" href="canlivoleybol.php"><i class="fa fa-cog"></i> Canlı Voleybol</a> </li>

<li class="nav-item"> <a class="nav-link active-ps" href="canlibuzhokeyi.php"><i class="fa fa-cog"></i> Canlı Buz Hokeyi</a> </li>

<li class="nav-item"> <a class="nav-link active-ps" href="canlimtenis.php"><i class="fa fa-cog"></i> Canlı Masa Tenisi</a> </li>



</ul>
</nav>
</div>