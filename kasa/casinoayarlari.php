<?php
session_start();
include '../db.php';

if (isset($_SESSION['betuser'])) {
    $user = $_SESSION['betuser'];
    $ayar = bilgi("select * from sistemayar where ayar_id=".$_SESSION['betuser']);
} else {
    header("Location:/login.php");
    die();
    exit();
}

if($ayar['casino_yetki']!='1') { header("Location:../"); }

if($ub['sahip']=="1") { } else if($ub['alt_alt_durum']>0) { } else if ($ub['alt_durum'] < 1 || $ub['sistemayarlaryetki'] == 0 || ($ub['alt_alt_durum'] > 0) || ($ub['sahip'] == "1")) {
    header("Location:index.php");
}


if (isset($_POST['submit'])) {

$ruletmin = pd("ruletmin");
$ruletmax = pd("ruletmax");
$ruletseans = pd("ruletseans");

$basmacamin = pd("basmacamin");
$basmacamax = pd("basmacamax");
$basmacakazanc = pd("basmacakazanc");
$basmacamaxoran = pd("basmacamaxoran");
$basmacaseviye = pd("basmacaseviye");

$pokermin = pd("pokermin");
$pokermax = pd("pokermax");
$pokerkazanc = pd("pokerkazanc");
$pokermaxoran = pd("pokermaxoran");
$pokerseviye = pd("pokerseviye");

$poker6min = pd("poker6min");
$poker6max = pd("poker6max");
$poker6kazanc = pd("poker6kazanc");
$poker6maxoran = pd("poker6maxoran");
$poker6seviye = pd("poker6seviye");

$bakaramin = pd("bakaramin");
$bakaramax = pd("bakaramax");
$bakarakazanc = pd("bakarakazanc");
$bakaramaxoran = pd("bakaramaxoran");
$bakaraseviye = pd("bakaraseviye");

$carkifelekmin = pd("carkifelekmin");
$carkifelekmax = pd("carkifelekmax");
$carkifelekkazanc = pd("carkifelekkazanc");
$carkifelekmaxoran = pd("carkifelekmaxoran");
$carkifelekseviye = pd("carkifelekseviye");

$zarmin = pd("zarmin");
$zarmax = pd("zarmax");
$zarkazanc = pd("zarkazanc");
$zarmaxoran = pd("zarmaxoran");
$zarseviye = pd("zarseviye");

$loto5min = pd("loto5min");
$loto5max = pd("loto5max");
$loto5kazanc = pd("loto5kazanc");
$loto5maxoran = pd("loto5maxoran");
$loto5seviye = pd("loto5seviye");

$loto6min = pd("loto6min");
$loto6max = pd("loto6max");
$loto6kazanc = pd("loto6kazanc");
$loto6maxoran = pd("loto6maxoran");
$loto6seviye = pd("loto6seviye");

$loto7min = pd("loto7min");
$loto7max = pd("loto7max");
$loto7kazanc = pd("loto7kazanc");
$loto7maxoran = pd("loto7maxoran");
$loto7seviye = pd("loto7seviye");

$kontrol = sed_sql_query("select * from sistemayar where ayar_id='$ub[id]'");

if (sed_sql_numrows($kontrol) > 0) {

sed_sql_query("update sistemayar set 
ruletmin = '".$ruletmin."',
ruletmax = '".$ruletmax."',
ruletseans = '".$ruletseans."',
casino_basmaca_minbahis = '".$basmacamin."',
casino_basmaca_maxbahis = '".$basmacamax."',
casino_basmaca_maxkazanc = '".$basmacakazanc."',
casino_basmaca_maxoran = '".$basmacamaxoran."',
casino_basmaca_seviye = '".$basmacaseviye."',
casino_poker_minbahis = '".$pokermin."',
casino_poker_maxbahis = '".$pokermax."',
casino_poker_maxkazanc = '".$pokerkazanc."',
casino_poker_maxoran = '".$pokermaxoran."',
casino_poker_seviye = '".$pokerseviye."',
casino_bakara_minbahis = '".$bakaramin."',
casino_bakara_maxbahis = '".$bakaramax."',
casino_bakara_maxkazanc = '".$bakarakazanc."',
casino_bakara_maxoran = '".$bakaramaxoran."',
casino_bakara_seviye = '".$bakaraseviye."',
casino_carkifelek_minbahis = '".$carkifelekmin."',
casino_carkifelek_maxbahis = '".$carkifelekmax."',
casino_carkifelek_maxkazanc = '".$carkifelekkazanc."',
casino_carkifelek_maxoran = '".$carkifelekmaxoran."',
casino_carkifelek_seviye = '".$carkifelekseviye."',
casino_zar_minbahis = '".$zarmin."',
casino_zar_maxbahis = '".$zarmax."',
casino_zar_maxkazanc = '".$zarkazanc."',
casino_zar_maxoran = '".$zarmaxoran."',
casino_zar_seviye = '".$zarseviye."',
casino_poker6_minbahis = '".$poker6min."',
casino_poker6_maxbahis = '".$poker6max."',
casino_poker6_maxkazanc = '".$poker6kazanc."',
casino_poker6_maxoran = '".$poker6maxoran."',
casino_poker6_seviye = '".$poker6seviye."',
casino_loto5_minbahis = '".$loto5min."',
casino_loto5_maxbahis = '".$loto5max."',
casino_loto5_maxkazanc = '".$loto5kazanc."',
casino_loto5_maxoran = '".$loto5maxoran."',
casino_loto5_seviye = '".$loto5seviye."',
casino_loto6_minbahis = '".$loto6min."',
casino_loto6_maxbahis = '".$loto6max."',
casino_loto6_maxkazanc = '".$loto6kazanc."',
casino_loto6_maxoran = '".$loto6maxoran."',
casino_loto6_seviye = '".$loto6seviye."',
casino_loto7_minbahis = '".$loto7min."',
casino_loto7_maxbahis = '".$loto7max."',
casino_loto7_maxkazanc = '".$loto7kazanc."',
casino_loto7_maxoran = '".$loto7maxoran."',
casino_loto7_seviye = '".$loto7seviye."'

where ayar_id='".$ub['id']."'");
header("Location:casinoayarlari.php?onay=1");

} else {
header("Location:casinoayarlari.php?onay=2");
}

}

$onaylandi = $_GET['onay'];
?>
<?php include 'header.php'; ?>

<main class="main">
<ol class="breadcrumb mb-0">
<li class="breadcrumb-item"><?=getTranslation('superadmin108')?></li>
</ol>
<div class="container-fluid mt-2">
<div class="row">
<div class="row">

<? if($onaylandi==1) { ?>
<div class="alert alert-success mb-0" id="success" style="display:block;"><?=getTranslation('yaziciayar37')?></div>
<? } else if($onaylandi==2) { ?>
<div class="alert alert-danger mb-0" id="error" style="display:block;"><?=getTranslation('yeniyerler_kasa338')?></div>
<? } ?>

<div class="col-sm-12">
<div class="card" style="overflow: auto;">
<div class="card-header"><?=getTranslation('yeniyerler_kasa339')?> </div>
<form name="bm20160601" id="bm20160601" action="" method="post" class="form">
<table class="tablesorter" style="width: 100%;margin:5px;">
<thead>
<tr>
<th><?=getTranslation('yeniyerler_kasa340')?></th>
<th><?=getTranslation('yeniyerler_kasa341')?></th>
<th><?=getTranslation('yeniyerler_kasa342')?></th>
<th><?=getTranslation('yeniyerler_kasa343')?></th>
<th><?=getTranslation('yeniyerler_kasa344')?></th>
<th><?=getTranslation('yeniyerler_kasa345')?></th>
</tr>
</thead>
<tbody>
<tr class="c" style="    border: 1px solid #c5c5c5;">
<td class="l"><?=getTranslation('yeniyerler_kasa331')?></td>
<td class="l"><input class="inputText" type="text" style="width: 100px" maxlength="9" name="basmacamin" value="<?=$ayar['casino_basmaca_minbahis'];?>"></td>
<td class="l"><input class="inputText" type="text" style="width: 100px" maxlength="9" name="basmacamax" value="<?=$ayar['casino_basmaca_maxbahis'];?>"></td>
<td class="l"><input class="inputText" type="text" style="width: 100px" maxlength="9" name="basmacakazanc" value="<?=$ayar['casino_basmaca_maxkazanc'];?>"></td>
<td class="l"><input class="inputText" type="text" style="width: 100px" maxlength="9" name="basmacamaxoran" value="<?=$ayar['casino_basmaca_maxoran'];?>"></td>
<td class="l"><select class="inputCombo chosen" name="basmacaseviye" style="width:215px;"> 
<option value="0" <? if($ayar['casino_basmaca_seviye']==0){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa347')?></option>
<option value="1" <? if($ayar['casino_basmaca_seviye']==1){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa348')?></option> 
<option value="2" <? if($ayar['casino_basmaca_seviye']==2){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa349')?></option> 
<option value="3" <? if($ayar['casino_basmaca_seviye']==3){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa350')?></option> 
<option value="4" <? if($ayar['casino_basmaca_seviye']==4){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa351')?></option> 
<option value="5" <? if($ayar['casino_basmaca_seviye']==5){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa352')?></option> 
</select></td>
</tr><tr class="c" style="    border: 1px solid #c5c5c5;">
<td class="l"><?=getTranslation('yeniyerler_kasa332')?></td>
<td class="l"><input class="inputText" type="text" style="width: 100px" maxlength="9" name="pokermin" value="<?=$ayar['casino_poker_minbahis'];?>"></td>
<td class="l"><input class="inputText" type="text" style="width: 100px" maxlength="9" name="pokermax" value="<?=$ayar['casino_poker_maxbahis'];?>"></td>
<td class="l"><input class="inputText" type="text" style="width: 100px" maxlength="9" name="pokerkazanc" value="<?=$ayar['casino_poker_maxkazanc'];?>"></td>
<td class="l"><input class="inputText" type="text" style="width: 100px" maxlength="9" name="pokermaxoran" value="<?=$ayar['casino_poker_maxoran'];?>"></td>
<td class="l"><select class="inputCombo chosen" name="pokerseviye" style="width:215px;"> 
<option value="0" <? if($ayar['casino_poker_seviye']==0){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa347')?></option>
<option value="1" <? if($ayar['casino_poker_seviye']==1){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa348')?></option> 
<option value="2" <? if($ayar['casino_poker_seviye']==2){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa349')?></option> 
<option value="3" <? if($ayar['casino_poker_seviye']==3){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa350')?></option> 
<option value="4" <? if($ayar['casino_poker_seviye']==4){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa351')?></option> 
<option value="5" <? if($ayar['casino_poker_seviye']==5){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa352')?></option> 
</select></td>
</tr><tr class="c" style="    border: 1px solid #c5c5c5;">
<td class="l"><?=getTranslation('yeniyerler_kasa336')?></td>
<td class="l"><input class="inputText" type="text" style="width: 100px" maxlength="9" name="poker6min" value="<?=$ayar['casino_poker6_minbahis'];?>"></td>
<td class="l"><input class="inputText" type="text" style="width: 100px" maxlength="9" name="poker6max" value="<?=$ayar['casino_poker6_maxbahis'];?>"></td>
<td class="l"><input class="inputText" type="text" style="width: 100px" maxlength="9" name="poker6kazanc" value="<?=$ayar['casino_poker6_maxkazanc'];?>"></td>
<td class="l"><input class="inputText" type="text" style="width: 100px" maxlength="9" name="poker6maxoran" value="<?=$ayar['casino_poker6_maxoran'];?>"></td>
<td class="l"><select class="inputCombo chosen" name="poker6seviye" style="width:215px;"> 
<option value="0" <? if($ayar['casino_poker6_seviye']==0){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa347')?></option>
<option value="1" <? if($ayar['casino_poker6_seviye']==1){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa348')?></option> 
<option value="2" <? if($ayar['casino_poker6_seviye']==2){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa349')?></option> 
<option value="3" <? if($ayar['casino_poker6_seviye']==3){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa350')?></option> 
<option value="4" <? if($ayar['casino_poker6_seviye']==4){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa351')?></option> 
<option value="5" <? if($ayar['casino_poker6_seviye']==5){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa352')?></option> 
</select></td>
</tr><tr class="c" style="    border: 1px solid #c5c5c5;">
<td class="l"><?=getTranslation('yeniyerler_kasa333')?></td>
<td class="l"><input class="inputText" type="text" style="width: 100px" maxlength="9" name="bakaramin" value="<?=$ayar['casino_bakara_minbahis'];?>"></td>
<td class="l"><input class="inputText" type="text" style="width: 100px" maxlength="9" name="bakaramax" value="<?=$ayar['casino_bakara_maxbahis'];?>"></td>
<td class="l"><input class="inputText" type="text" style="width: 100px" maxlength="9" name="bakarakazanc" value="<?=$ayar['casino_bakara_maxkazanc'];?>"></td>
<td class="l"><input class="inputText" type="text" style="width: 100px" maxlength="9" name="bakaramaxoran" value="<?=$ayar['casino_bakara_maxoran'];?>"></td>
<td class="l"><select class="inputCombo chosen" name="bakaraseviye" style="width:215px;"> 
<option value="0" <? if($ayar['casino_bakara_seviye']==0){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa347')?></option>
<option value="1" <? if($ayar['casino_bakara_seviye']==1){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa348')?></option> 
<option value="2" <? if($ayar['casino_bakara_seviye']==2){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa349')?></option> 
<option value="3" <? if($ayar['casino_bakara_seviye']==3){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa350')?></option> 
<option value="4" <? if($ayar['casino_bakara_seviye']==4){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa351')?></option> 
<option value="5" <? if($ayar['casino_bakara_seviye']==5){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa352')?></option> 
</select></td>
</tr><tr class="c" style="    border: 1px solid #c5c5c5;">
<td class="l"><?=getTranslation('yeniyerler_kasa334')?></td>
<td class="l"><input class="inputText" type="text" style="width: 100px" maxlength="9" name="carkifelekmin" value="<?=$ayar['casino_carkifelek_minbahis'];?>"></td>
<td class="l"><input class="inputText" type="text" style="width: 100px" maxlength="9" name="carkifelekmax" value="<?=$ayar['casino_carkifelek_maxbahis'];?>"></td>
<td class="l"><input class="inputText" type="text" style="width: 100px" maxlength="9" name="carkifelekkazanc" value="<?=$ayar['casino_carkifelek_maxkazanc'];?>"></td>
<td class="l"><input class="inputText" type="text" style="width: 100px" maxlength="9" name="carkifelekmaxoran" value="<?=$ayar['casino_carkifelek_maxoran'];?>"></td>
<td class="l"><select class="inputCombo chosen" name="carkifelekseviye" style="width:215px;"> 
<option value="0" <? if($ayar['casino_carkifelek_seviye']==0){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa347')?></option>
<option value="1" <? if($ayar['casino_carkifelek_seviye']==1){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa348')?></option> 
<option value="2" <? if($ayar['casino_carkifelek_seviye']==2){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa349')?></option> 
<option value="3" <? if($ayar['casino_carkifelek_seviye']==3){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa350')?></option> 
<option value="4" <? if($ayar['casino_carkifelek_seviye']==4){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa351')?></option> 
<option value="5" <? if($ayar['casino_carkifelek_seviye']==5){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa352')?></option> 
</select></td>
</tr><tr class="c" style="    border: 1px solid #c5c5c5;">
<td class="l"><?=getTranslation('yeniyerler_kasa335')?></td>
<td class="l"><input class="inputText" type="text" style="width: 100px" maxlength="9" name="zarmin" value="<?=$ayar['casino_zar_minbahis'];?>"></td>
<td class="l"><input class="inputText" type="text" style="width: 100px" maxlength="9" name="zarmax" value="<?=$ayar['casino_zar_maxbahis'];?>"></td>
<td class="l"><input class="inputText" type="text" style="width: 100px" maxlength="9" name="zarkazanc" value="<?=$ayar['casino_zar_maxkazanc'];?>"></td>
<td class="l"><input class="inputText" type="text" style="width: 100px" maxlength="9" name="zarmaxoran" value="<?=$ayar['casino_zar_maxoran'];?>"></td>
<td class="l"><select class="inputCombo chosen" name="zarseviye" style="width:215px;"> 
<option value="0" <? if($ayar['casino_zar_seviye']==0){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa347')?></option>
<option value="1" <? if($ayar['casino_zar_seviye']==1){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa348')?></option> 
<option value="2" <? if($ayar['casino_zar_seviye']==2){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa349')?></option> 
<option value="3" <? if($ayar['casino_zar_seviye']==3){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa350')?></option> 
<option value="4" <? if($ayar['casino_zar_seviye']==4){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa351')?></option> 
<option value="5" <? if($ayar['casino_zar_seviye']==5){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa352')?></option> 
</select></td>
</tr><tr class="c" style="    border: 1px solid #c5c5c5;">
<td class="l"><?=getTranslation('yeniyerler_kasa337')?> 5</td>
<td class="l"><input class="inputText" type="text" style="width: 100px" maxlength="9" name="loto5min" value="<?=$ayar['casino_loto5_minbahis'];?>"></td>
<td class="l"><input class="inputText" type="text" style="width: 100px" maxlength="9" name="loto5max" value="<?=$ayar['casino_loto5_maxbahis'];?>"></td>
<td class="l"><input class="inputText" type="text" style="width: 100px" maxlength="9" name="loto5kazanc" value="<?=$ayar['casino_loto5_maxkazanc'];?>"></td>
<td class="l"><input class="inputText" type="text" style="width: 100px" maxlength="9" name="loto5maxoran" value="<?=$ayar['casino_loto5_maxoran'];?>"></td>
<td class="l"><select class="inputCombo chosen" name="loto5seviye" style="width:215px;"> 
<option value="0" <? if($ayar['casino_loto5_seviye']==0){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa347')?></option>
<option value="1" <? if($ayar['casino_loto5_seviye']==1){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa348')?></option> 
<option value="2" <? if($ayar['casino_loto5_seviye']==2){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa349')?></option> 
<option value="3" <? if($ayar['casino_loto5_seviye']==3){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa350')?></option> 
<option value="4" <? if($ayar['casino_loto5_seviye']==4){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa351')?></option> 
<option value="5" <? if($ayar['casino_loto5_seviye']==5){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa352')?></option> 
</select></td>
</tr><tr class="c" style="    border: 1px solid #c5c5c5;">
<td class="l"><?=getTranslation('yeniyerler_kasa337')?> 6</td>
<td class="l"><input class="inputText" type="text" style="width: 100px" maxlength="9" name="loto6min" value="<?=$ayar['casino_loto6_minbahis'];?>"></td>
<td class="l"><input class="inputText" type="text" style="width: 100px" maxlength="9" name="loto6max" value="<?=$ayar['casino_loto6_maxbahis'];?>"></td>
<td class="l"><input class="inputText" type="text" style="width: 100px" maxlength="9" name="loto6kazanc" value="<?=$ayar['casino_loto6_maxkazanc'];?>"></td>
<td class="l"><input class="inputText" type="text" style="width: 100px" maxlength="9" name="loto6maxoran" value="<?=$ayar['casino_loto6_maxoran'];?>"></td>
<td class="l"><select class="inputCombo chosen" name="loto6seviye" style="width:215px;"> 
<option value="0" <? if($ayar['casino_loto6_seviye']==0){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa347')?></option>
<option value="1" <? if($ayar['casino_loto6_seviye']==1){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa348')?></option> 
<option value="2" <? if($ayar['casino_loto6_seviye']==2){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa349')?></option> 
<option value="3" <? if($ayar['casino_loto6_seviye']==3){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa350')?></option> 
<option value="4" <? if($ayar['casino_loto6_seviye']==4){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa351')?></option> 
<option value="5" <? if($ayar['casino_loto6_seviye']==5){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa352')?></option> 
</select></td>
</tr>
<tr class="c" style="    border: 1px solid #c5c5c5;">
<td class="l"><?=getTranslation('yeniyerler_kasa337')?> 7</td>
<td class="l"><input class="inputText" type="text" style="width: 100px" maxlength="9" name="loto7min" value="<?=$ayar['casino_loto7_minbahis'];?>"></td>
<td class="l"><input class="inputText" type="text" style="width: 100px" maxlength="9" name="loto7max" value="<?=$ayar['casino_loto7_maxbahis'];?>"></td>
<td class="l"><input class="inputText" type="text" style="width: 100px" maxlength="9" name="loto7kazanc" value="<?=$ayar['casino_loto7_maxkazanc'];?>"></td>
<td class="l"><input class="inputText" type="text" style="width: 100px" maxlength="9" name="loto7maxoran" value="<?=$ayar['casino_loto7_maxoran'];?>"></td>
<td class="l"><select class="inputCombo chosen" name="loto7seviye" style="width:215px;"> 
<option value="0" <? if($ayar['casino_loto7_seviye']==0){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa347')?></option>
<option value="1" <? if($ayar['casino_loto7_seviye']==1){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa348')?></option> 
<option value="2" <? if($ayar['casino_loto7_seviye']==2){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa349')?></option> 
<option value="3" <? if($ayar['casino_loto7_seviye']==3){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa350')?></option> 
<option value="4" <? if($ayar['casino_loto7_seviye']==4){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa351')?></option> 
<option value="5" <? if($ayar['casino_loto7_seviye']==5){ ?>selected="selected"<? } ?>><?=getTranslation('yeniyerler_kasa352')?></option> 
</select></td>
</tr>
<tr class="c" style="    border: 1px solid #c5c5c5;">
<td class="l"><?=getTranslation('yeniyerler_kasa229')?></td>
<td class="l"><input class="inputText" type="text" style="width: 100px" maxlength="9" name="ruletmin" value="<?=$ayar['ruletmin'];?>"></td>
<td class="l"><input class="inputText" type="text" style="width: 100px" maxlength="9" name="ruletmax" value="<?=$ayar['ruletmax'];?>"></td>
<td class="l" style="text-align:right;"><?=getTranslation('yeniyerler_kasa346')?> : </td>
<td class="l"><input class="inputText" type="text" style="width: 100px" maxlength="9" name="ruletseans" value="<?=$ayar['ruletseans'];?>"></td>
<td class="l"></td>
</tr>
<tr>
<td class="last" colspan="5"><input class="btn btn-large btn-primary" id="kaydet" type="submit" name="submit" value="<?=getTranslation('yaziciayar48')?>"></td>
</tr>
</tbody>
</table>
</form>

</div>
</div>

</div>
</div>
</div>
</main>

<script>
$(document).ready(function (e) {
$("#kaydet").click(function (e) {
self.document.newu.submit();
});
});
</script>

<?php include 'footer.php'; ?>

</body>
</html>