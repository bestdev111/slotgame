<?
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:../login.php"); die(); exit(); }
if($ub['alt_durum']<1 && $ub['wkyetki']<1 && $ub['alt_alt_durum']<1 && $ub['sahip']=="0") { header("Location:index.php"); }
if($ub['adminpanel']=="1") { header("Location:admin"); }
rebuild($ub['id']);
$userid = gd('userid');
$bilgi_ver = bilgi("select * from kullanici where id='$userid' AND hesap_sahibi_id='$ub[id]' limit 1");

?>
<? include 'header.php'; ?>
<? include 'menu.php'; ?>

<script>$("#profil").addClass("activemnuitems");</script>

<? if($bilgi_ver['id']>0){?>

<div id="main" class="lwkSelector" style="width: 786px;">
<div id="live">
<div class="space_20"></div>
<div class="main_space" id="main_wide">
<script>$('#acmen_7').addClass("active")</script>
<div class="z-right-container" id="maskcontainer">
<table class="tablesorter">
<thead>
<tr>
<th colspan="2"><?=getTranslation('playersprofil1')?></th>
</tr>
</thead>
<tbody>
<tr>
<td><?=getTranslation('playersprofil2')?></td>
<td><?=ucfirst($bilgi_ver['username']); ?></td>
</tr>
<tr>
<td><?=getTranslation('playersprofil3')?></td>
<td><?=$bilgi_ver['id']; ?></td>
</tr>
<tr>
<td width="300"><?=getTranslation('playersprofil4')?></td>
<td><span class="itext-3"><?=getTranslation('playersprofil5')?></span></td>
</tr>
<tr>
<td><?=getTranslation('playersprofil6')?></td>
<td><? 

if($bilgi_ver['id']=="1") { echo "Sistem Sahibi"; } else
if($bilgi_ver['hesap_root_root_id']=="") { echo "Patron Hesabı"; } else
if($bilgi_ver['wkdurum']=="1") { echo "Web Kullanıcı"; } else
if($bilgi_ver['alt_durum']<1) { echo "Bayi"; } else
if($bilgi_ver['alt_durum']>0 && $bilgi_ver['alt_alt_durum']<1) { echo "Admin"; } else
if($bilgi_ver['alt_alt_durum']>0 && $bilgi_ver['sahip']<1) { echo "Super Admin"; } else
if($bilgi_ver['sahip']>0) { echo "Joker Admin"; }

?></td>
</tr>
<tr>
<td><?=getTranslation('playersprofil7')?></td>
<td><?=turkce_tarih_profil($bilgi_ver['olusturma_zaman']); ?></td>
</tr>
<tr>
<td><?=getTranslation('playersprofil8')?></td>
<td><?=$bilgi_ver['alt_sinir']; ?> <?=getTranslation('playersprofil9')?></td>
</tr>
<tr>
<td><?=getTranslation('playersprofil10')?></td>
<td>3.8.91</td>
</tr>
<tr>
<td><?=getTranslation('playersprofil11')?></td>
<td>92714681907ace0d486dd4b27a3b7c90</td>
</tr>
<tr>
<td><?=getTranslation('playersprofil12')?></td>
<td>5 GB</td>
</tr>
<tr>
<td><?=getTranslation('playersprofil13')?></td>
<td>250 MB</td>
</tr>
<tr>
<td><?=getTranslation('playersprofil14')?></td>
<td> Intel(R) Core(TM) i7-3770 CPU @ 3.40GHz
</td>
</tr>
<tr>
<td><?=getTranslation('playersprofil15')?></td>
<td></td>
</tr>
<tr>
<td><?=getTranslation('playersprofil16')?></td>
<td>GenuineIntel
</td>
</tr>
<tr>
<td><?=getTranslation('playersprofil17')?></td>
<td></td>
</tr>
<tr>
<th colspan="2"><?=getTranslation('playersprofil18')?></th>
</tr>
<tr>
<td><?=getTranslation('playersprofil19')?></td>
<td><?=getTranslation('playersprofil20')?></td>
</tr>
<tr>
<td><?=getTranslation('playersprofil21')?></td>
<td><?=getTranslation('playersprofil22')?></td>
</tr>
<tr>
<td><?=getTranslation('playersprofil23')?></td>
<td><?=getTranslation('playersprofil24')?></td>
</tr>
<tr>
<td><?=getTranslation('playersprofil25')?></td>
<td><?=getTranslation('playersprofil26')?></td>
</tr>
<tr>
<td><?=getTranslation('playersprofil27')?></td>
<td><?=getTranslation('playersprofil28')?></td>
</tr>
<tr>
<td><?=getTranslation('playersprofil29')?></td>
<td><?=getTranslation('playersprofil30')?></td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>

<? } else { ?>

<div id="main" class="lwkSelector" style="width: 786px;">
<div id="live">
<div class="space_20"></div>
<div class="main_space" id="main_wide">
<script>$('#acmen_7').addClass("active")</script>
<div class="z-right-container" id="maskcontainer">
<table class="tablesorter">
<thead>
<tr>
<th colspan="2"><?=getTranslation('playersprofil1')?></th>
</tr>
</thead>
<tbody>
<tr>
<td><?=getTranslation('playersprofil2')?></td>
<td><?=ucfirst($ub['username']); ?></td>
</tr>
<tr>
<td><?=getTranslation('playersprofil3')?></td>
<td><?=$ub['id']; ?></td>
</tr>
<tr>
<td width="300"><?=getTranslation('playersprofil4')?></td>
<td><span class="itext-3"><?=getTranslation('playersprofil5')?></span></td>
</tr>
<tr>
<td><?=getTranslation('playersprofil6')?></td>
<td><? 

if($ub['id']=="1") { echo "Sistem Sahibi"; } else
if($ub['hesap_root_root_id']=="") { echo "Patron Hesabı"; } else
if($ub['wkdurum']=="1") { echo "Web Kullanıcı"; } else
if($ub['alt_durum']<1) { echo "Bayi"; } else
if($ub['alt_durum']>0 && $ub['alt_alt_durum']<1) { echo "Admin"; } else
if($ub['alt_alt_durum']>0 && $ub['sahip']<1) { echo "Super Admin"; } else
if($ub['sahip']>0) { echo "Joker Admin"; }

?></td>
</tr>
<tr>
<td><?=getTranslation('playersprofil7')?></td>
<td><?=turkce_tarih_profil($ub['olusturma_zaman']); ?></td>
</tr>
<tr>
<td><?=getTranslation('playersprofil8')?></td>
<td><?=$ub['alt_sinir']; ?> <?=getTranslation('playersprofil9')?></td>
</tr>
<tr>
<td><?=getTranslation('playersprofil10')?></td>
<td>3.8.91</td>
</tr>
<tr>
<td><?=getTranslation('playersprofil11')?></td>
<td>92714681907ace0d486dd4b27a3b7c90</td>
</tr>
<tr>
<td><?=getTranslation('playersprofil12')?></td>
<td>5 GB</td>
</tr>
<tr>
<td><?=getTranslation('playersprofil13')?></td>
<td>250 MB</td>
</tr>
<tr>
<td><?=getTranslation('playersprofil14')?></td>
<td> Intel(R) Core(TM) i7-3770 CPU @ 3.40GHz
</td>
</tr>
<tr>
<td><?=getTranslation('playersprofil15')?></td>
<td></td>
</tr>
<tr>
<td><?=getTranslation('playersprofil16')?></td>
<td>GenuineIntel
</td>
</tr>
<tr>
<td><?=getTranslation('playersprofil17')?></td>
<td></td>
</tr>
<tr>
<th colspan="2"><?=getTranslation('playersprofil18')?></th>
</tr>
<tr>
<td><?=getTranslation('playersprofil19')?></td>
<td><?=getTranslation('playersprofil20')?></td>
</tr>
<tr>
<td><?=getTranslation('playersprofil21')?></td>
<td><?=getTranslation('playersprofil22')?></td>
</tr>
<tr>
<td><?=getTranslation('playersprofil23')?></td>
<td><?=getTranslation('playersprofil24')?></td>
</tr>
<tr>
<td><?=getTranslation('playersprofil25')?></td>
<td><?=getTranslation('playersprofil26')?></td>
</tr>
<tr>
<td><?=getTranslation('playersprofil27')?></td>
<td><?=getTranslation('playersprofil28')?></td>
</tr>
<tr>
<td><?=getTranslation('playersprofil29')?></td>
<td><?=getTranslation('playersprofil30')?></td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>

<? } ?>

</div>
</div>
</div>
</div>

<? include 'footer.php'; ?>

</body>
</html>