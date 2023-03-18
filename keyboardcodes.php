<?php
session_start();
include 'db.php';
if($ub['wkyetki']<2) { header("Location:kasa"); }
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:login.php"); die(); exit(); }
?>
<link rel="stylesheet" type="text/css" href="assets/css/css.css">
<link rel="stylesheet" type="text/css" href="assets/css/jquery-datepicker-85474B510E464EAC1B819689D87D29B3.css">
<link rel="stylesheet" type="text/css" href="assets/css/ebet-D446D2F52DAC32FA5747B4596AA0359D.css?vs=1573248523">
<link rel="stylesheet" type="text/css" href="assets/css/paymentlist-69E6435F339C58D6AA7CF0F7C988C3D1.css">
<link rel="stylesheet" type="text/css" href="assets/css/slider-59A34BE099BA5AFA41C253AE1FE8E1C6.css">
<link rel="stylesheet" type="text/css" href="assets/css/live-FECB7CA271FA5B7F8137BB2E249B9366.css?vas=1573248523">
<link rel="stylesheet" type="text/css" href="assets/css/branding-7B04168329FD3CE12A8EAD629C35DF6F.css">
<link rel="stylesheet" type="text/css" href="assets/css/smallconference-AA563BD74DC2C3386DC37EB5B65A13E9.css">
<style type="text/css">#header .navheader {
    position: relative;
}.divDerbiBantSayac{font-size:20px;font-weight:bold;width:475px;height:44px;position:absolute;left:77px;top:12px;}
.divDerbiBantSayac span{font-size:25px;font-weight:bold;color:red;line-height:36px;letter-spacing:1px;}
.saat{left:90px}.dakika{left:170px}.saniye{left:230px}.pos{position:absolute;color:#fff;}
.headetlogo {
font-size: 41px;
    font-weight: bold;
    margin-top: 20px;
    color: #0e5a73;
  text-shadow: 0 1px 0 #ccc,
               0 2px 0 #c9c9c9,
               0 3px 0 #bbb,
               0 4px 0 #b9b9b9,
               0 5px 0 #aaa,
               0 6px 1px rgba(0,0,0,.1),
               0 0 5px rgba(0,0,0,.1),
               0 1px 3px rgba(0,0,0,.3),
               0 3px 5px rgba(0,0,0,.2),
               0 5px 10px rgba(0,0,0,.25),
               0 10px 10px rgba(0,0,0,.2),
               0 20px 20px rgba(0,0,0,.15);
}
#popup #heads, #popup_table #head, #popup_text #head, #lpage2 #head {
    height: 146px;
}

#heads {
    height: 115px;
    position: relative;
}
.betmatrix th, .betmatrix td {
    text-align: left;
}
#popup_text, #popup_text #container, #popup_text #content, #popup_text #main, #popup_text #head_main {
    width: 99%;
}
</style>
<style>
table.tablesorter {
    border-spacing: 0;
    width: 100%;
    text-align: left;
    font-size: 8pt;
    margin: 10px 0pt 15px;
}
table.tablesorter {
    border: solid #ccc 1px;
    -moz-border-radius: 6px;
    -webkit-border-radius: 6px;
    border-radius: 6px;
    -webkit-box-shadow: 0 1px 1px #ccc;
    -moz-box-shadow: 0 1px 1px #ccc;
    box-shadow: 0 1px 1px #ccc;
}
table.tablesorter td, table.tablesorter th {
    border-left: 1px solid #ccc;
    border-top: 1px solid #ccc;
    padding: 10px;
}

table.tablesorter th {
    text-align: center;
    color: #fff;
}

table.tablesorter th {
    background-color: #f74835;
}
table.tablesorter td:first-child, table.tablesorter th:first-child {
    border-left: none;
}
table.tablesorter th:first-child {
    -moz-border-radius: 6px 0 0 0;
    -webkit-border-radius: 6px 0 0 0;
    border-radius: 6px 0 0 0;
}
table.tablesorter th:last-child {
    -moz-border-radius: 0 6px 0 0;
    -webkit-border-radius: 0 6px 0 0;
    border-radius: 0 6px 0 0;
}

table.tablesorter th:only-child {
    -moz-border-radius: 6px 6px 0 0;
    -webkit-border-radius: 6px 6px 0 0;
    border-radius: 6px 6px 0 0;
}
.c {
    text-align: center!important;
}
.l {
    text-align: left!important;
}
table.tablesorter td, table.tablesorter th {
    border-left: 1px solid #ccc;
    border-top: 1px solid #ccc;
    padding: 10px;
}
table.tablesorter td:first-child, table.tablesorter th:first-child {
    border-left: none;
}
table.tablesorter tbody tr:nth-child(2n+1) td {
    background-color: #F0F0F6;
}
</style>
<div class="help cms_richtext"><br>
<h2 class="h1" style="margin-bottom: 0px;text-align:center;"><?=$site_adi;?> / <?=getTranslation('keyboardcodes1')?></h2>
<div id="help" style="padding-top: 0px;">
<div class="hr h_3 line_grey">&nbsp;
</div>
<div class="macro bg_grey main_space">
<div class="space">&nbsp;</div>
<div class="space">&nbsp;</div>
</div>
<div class="sag">
<table class="tablesorter" border="0" cellpadding="0" cellspacing="1" style="margin:0px;">

<?
$sor = sed_sql_query("select * from oran_tip_futbol where id!='' and id NOT IN (45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100) order by id asc");
while($row=sed_sql_fetcharray($sor)) { ?>

<thead>
<tr>
<th colspan="4"><?=getTranslation('foran'.$row['id'].'')?> <?=getTranslation('keyboardcodes2')?></th>
</tr>
<tr>
<th><?=getTranslation('keyboardcodes3')?></th>
<th><?=getTranslation('keyboardcodes4')?></th>
<th><?=getTranslation('keyboardcodes5')?></th>
<th><?=getTranslation('keyboardcodes6')?></th>
</tr>
</thead>
<tbody class="c">
<?
$s = sed_sql_query("select * from oran_val_futbol where oran_tip='$row[id]'");
while($ass=sed_sql_fetcharray($s)) { 

if($ub['wkyetki']==1){
	$tanimli = bilgi("select * from hizligiris where user_id='$ub[hesap_sahibi_id]' and oranvalid='$ass[id]'");
} else if($ub['wkyetki']==2){
	$tanimli = bilgi("select * from hizligiris where user_id='$ub[hesap_sahibi_id]' and oranvalid='$ass[id]'");
} else if($ub['wkyetki']==3){
	$tanimli = bilgi("select * from hizligiris where user_id='$ub[hesap_sahibi_id]' OR user_id='$ub[hesap_root_id]' and oranvalid='$ass[id]'");
} else {
	$tanimli = bilgi("select * from hizligiris where user_id='$ub[id]' and oranvalid='$ass[id]'");
}

if($tanimli['id']!="") { $tanimli_tus = $tanimli['yenitus']; } else { $tanimli_tus = ""; }

?>
<tr>
<td class="l"><?=getTranslation('foranaciklama'.$ass['id'].'')?></td>
<td><?=getTranslation('keyboardcodes7')?></td>
<td><? if($tanimli_tus!="") { ?> <?=$tanimli_tus;?> <? } else { ?><?=$ass['tus']; ?><? } ?></td>
<td>455 <? if($tanimli_tus!="") { ?> <?=$tanimli_tus;?> <? } else { ?><?=$ass['tus']; ?><? } ?></td>
</tr>
<? } ?>
</tbody>

<? } ?>

</table>
</div>
<div class="hr h_3 line_grey">&nbsp;</div>
<div class="space">&nbsp;</div>
<div class="space">&nbsp;</div>
<style>#static h1 {font-size: 100%;font-weight: bold;}</style>
<div id="static" class="macro main_space">
<div class="hr h_25 line_grey clear">&nbsp;</div>
</div>
<div class="space clear">&nbsp;</div>
</div>


</div>

<br>

</body>
</html>