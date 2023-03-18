<?php
session_start();
include '../db.php';

if (isset($_SESSION['betuser'])) {
    $user = $_SESSION['betuser'];
    $ayar = bilgi("select * from sistemayar where ayar_id=".$_SESSION['betuser']);
} else {
    header("Location:../login.php");
    die();
    exit();
}

if($ub['sahip']=="1") {
	
}

else if($ub['alt_alt_durum']>0) {
	
}

else if ($ub['alt_durum'] < 1 || $ub['sistemayarlaryetki'] == 0 || ($ub['alt_alt_durum'] > 0) || ($ub['sahip'] == "1")) {
    header("Location:index.php");
}

if (isset($_POST['submit'])) {

$canlifutbol = pd("canlifutbol");
$canli_ilkyari_yayindan_kaldir = pd("canli_ilkyari_yayindan_kaldir");
$canli_yayindan_kaldir = pd("canli_yayindan_kaldir");
$orankorumamaxoranver = pd("orankorumamaxoran");
$kuponalim = pd("kuponalim");


if($orankorumamaxoranver==9999){
	$orankorumamaxoran = pd("elilegirilendeger");
} else {
	$orankorumamaxoran = pd("orankorumamaxoran");
}

$kontrol = sed_sql_query("select * from sistemayar where ayar_id='$ub[id]'");

if (sed_sql_numrows($kontrol) == 0) {

sed_sql_query("INSERT INTO sistemayar SET
canlifutbol = '".$canlifutbol."',
canli_ilkyari_yayindan_kaldir = '".$canli_ilkyari_yayindan_kaldir."',
canli_yayindan_kaldir = '".$canli_yayindan_kaldir."',
kuponalim = '".$kuponalim."',
orankorumamaxoran = '".$orankorumamaxoran."',
ayar_id = '".$ub['id']."'");
header("Refresh:0");
$onaylandi = 1;
} else {

sed_sql_query("update sistemayar set 
canlifutbol = '".$canlifutbol."',
canli_ilkyari_yayindan_kaldir = '".$canli_ilkyari_yayindan_kaldir."',
canli_yayindan_kaldir = '".$canli_yayindan_kaldir."',
kuponalim = '".$kuponalim."',
orankorumamaxoran = '".$orankorumamaxoran."'
where ayar_id='".$ub['id']."'");
header("Refresh:0");
$onaylandi = 1;
}
}

?>
<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>
<script>
$("#ayar2").addClass("activemnuitems");
</script>
<div id="main" class="lwkSelector" style="width: 758px;">
<div id="live">
<div class="space_20"></div>
<div class="main_space" id="main_wide">
<script>$('#acmen_82').addClass("active")</script>
<div class="z-right-container" id="maskcontainer">

<script>
function degerver(val){
	if(val==9999){
		$('#eldegeri').show();
		$('#eldegeri2').show();
	} else {
		$('#eldegeri').hide();
		$('#eldegeri2').hide();
	}
}
</script>

<? if($onaylandi==1) { ?>
<script>alert('<?=getTranslation('playersayar21')?>');</script>
<? } ?>

<form method="post" name="newu">
<table class="tablesorter">
<thead>
<tr>
<th colspan="2"><?=getTranslation('playersayar22')?></th>
</tr>
</thead>
<tbody>
<tr>
<td><?=getTranslation('playersayar23')?></td>
<td>
<select class="inputCombo chosen" name="canlifutbol" style="width: 95px;">
<option value="1" <? if($ayar['canlifutbol']==1){ ?> selected <? } ?>><?=getTranslation('playersayar24')?></option>
<option value="2" <? if($ayar['canlifutbol']==2){ ?> selected <? } ?>><?=getTranslation('playersayar25')?></option>
</select>
</td>
</tr>

<tr>
<td><?=getTranslation('playersayar26')?></td>
<td>
<select class="inputCombo chosen" name="orankorumamaxoran" onchange="degerver(this.value);void(0);" style="width: 95px;">
<option value="1" <? if($ayar['orankorumamaxoran']==1){ ?> selected <? } ?>>1</option>
<option value="2" <? if($ayar['orankorumamaxoran']==2){ ?> selected <? } ?>>2</option>
<option value="3" <? if($ayar['orankorumamaxoran']==3){ ?> selected <? } ?>>3</option>
<option value="4" <? if($ayar['orankorumamaxoran']==4){ ?> selected <? } ?>>4</option>
<option value="5" <? if($ayar['orankorumamaxoran']==5){ ?> selected <? } ?>>5</option>
<option value="6" <? if($ayar['orankorumamaxoran']==6){ ?> selected <? } ?>>6</option>
<option value="7" <? if($ayar['orankorumamaxoran']==7){ ?> selected <? } ?>>7</option>
<option value="8" <? if($ayar['orankorumamaxoran']==8){ ?> selected <? } ?>>8</option>
<option value="9" <? if($ayar['orankorumamaxoran']==9){ ?> selected <? } ?>>9</option>
<option value="10" <? if($ayar['orankorumamaxoran']==10){ ?> selected <? } ?>>10</option>
<option value="11" <? if($ayar['orankorumamaxoran']==11){ ?> selected <? } ?>>11</option>
<option value="12" <? if($ayar['orankorumamaxoran']==12){ ?> selected <? } ?>>12</option>
<option value="13" <? if($ayar['orankorumamaxoran']==13){ ?> selected <? } ?>>13</option>
<option value="14" <? if($ayar['orankorumamaxoran']==14){ ?> selected <? } ?>>14</option>
<option value="15" <? if($ayar['orankorumamaxoran']==15){ ?> selected <? } ?>>15</option>
<option value="16" <? if($ayar['orankorumamaxoran']==16){ ?> selected <? } ?>>16</option>
<option value="17" <? if($ayar['orankorumamaxoran']==17){ ?> selected <? } ?>>17</option>
<option value="18" <? if($ayar['orankorumamaxoran']==18){ ?> selected <? } ?>>18</option>
<option value="19" <? if($ayar['orankorumamaxoran']==19){ ?> selected <? } ?>>19</option>
<option value="20" <? if($ayar['orankorumamaxoran']==20){ ?> selected <? } ?>>20</option>
<option value="22" <? if($ayar['orankorumamaxoran']==22){ ?> selected <? } ?>>22</option>
<option value="22" <? if($ayar['orankorumamaxoran']==22){ ?> selected <? } ?>>22</option>
<option value="23" <? if($ayar['orankorumamaxoran']==23){ ?> selected <? } ?>>23</option>
<option value="24" <? if($ayar['orankorumamaxoran']==24){ ?> selected <? } ?>>24</option>
<option value="25" <? if($ayar['orankorumamaxoran']==25){ ?> selected <? } ?>>25</option>
<option value="26" <? if($ayar['orankorumamaxoran']==26){ ?> selected <? } ?>>26</option>
<option value="27" <? if($ayar['orankorumamaxoran']==27){ ?> selected <? } ?>>27</option>
<option value="28" <? if($ayar['orankorumamaxoran']==28){ ?> selected <? } ?>>28</option>
<option value="29" <? if($ayar['orankorumamaxoran']==29){ ?> selected <? } ?>>29</option>
<option value="30" <? if($ayar['orankorumamaxoran']==30){ ?> selected <? } ?>>30</option>
<option value="33" <? if($ayar['orankorumamaxoran']==33){ ?> selected <? } ?>>33</option>
<option value="32" <? if($ayar['orankorumamaxoran']==32){ ?> selected <? } ?>>32</option>
<option value="33" <? if($ayar['orankorumamaxoran']==33){ ?> selected <? } ?>>33</option>
<option value="34" <? if($ayar['orankorumamaxoran']==34){ ?> selected <? } ?>>34</option>
<option value="35" <? if($ayar['orankorumamaxoran']==35){ ?> selected <? } ?>>35</option>
<option value="36" <? if($ayar['orankorumamaxoran']==36){ ?> selected <? } ?>>36</option>
<option value="37" <? if($ayar['orankorumamaxoran']==37){ ?> selected <? } ?>>37</option>
<option value="38" <? if($ayar['orankorumamaxoran']==38){ ?> selected <? } ?>>38</option>
<option value="39" <? if($ayar['orankorumamaxoran']==39){ ?> selected <? } ?>>39</option>
<option value="40" <? if($ayar['orankorumamaxoran']==40){ ?> selected <? } ?>>40</option>
<option value="44" <? if($ayar['orankorumamaxoran']==44){ ?> selected <? } ?>>44</option>
<option value="42" <? if($ayar['orankorumamaxoran']==42){ ?> selected <? } ?>>42</option>
<option value="43" <? if($ayar['orankorumamaxoran']==43){ ?> selected <? } ?>>43</option>
<option value="44" <? if($ayar['orankorumamaxoran']==44){ ?> selected <? } ?>>44</option>
<option value="45" <? if($ayar['orankorumamaxoran']==45){ ?> selected <? } ?>>45</option>
<option value="46" <? if($ayar['orankorumamaxoran']==46){ ?> selected <? } ?>>46</option>
<option value="47" <? if($ayar['orankorumamaxoran']==47){ ?> selected <? } ?>>47</option>
<option value="48" <? if($ayar['orankorumamaxoran']==48){ ?> selected <? } ?>>48</option>
<option value="49" <? if($ayar['orankorumamaxoran']==49){ ?> selected <? } ?>>49</option>
<option value="50" <? if($ayar['orankorumamaxoran']==50){ ?> selected <? } ?>>50</option>
<option value="55" <? if($ayar['orankorumamaxoran']==55){ ?> selected <? } ?>>55</option>
<option value="52" <? if($ayar['orankorumamaxoran']==52){ ?> selected <? } ?>>52</option>
<option value="53" <? if($ayar['orankorumamaxoran']==53){ ?> selected <? } ?>>53</option>
<option value="54" <? if($ayar['orankorumamaxoran']==54){ ?> selected <? } ?>>54</option>
<option value="55" <? if($ayar['orankorumamaxoran']==55){ ?> selected <? } ?>>55</option>
<option value="56" <? if($ayar['orankorumamaxoran']==56){ ?> selected <? } ?>>56</option>
<option value="57" <? if($ayar['orankorumamaxoran']==57){ ?> selected <? } ?>>57</option>
<option value="58" <? if($ayar['orankorumamaxoran']==58){ ?> selected <? } ?>>58</option>
<option value="59" <? if($ayar['orankorumamaxoran']==59){ ?> selected <? } ?>>59</option>
<option value="60" <? if($ayar['orankorumamaxoran']==60){ ?> selected <? } ?>>60</option>
<option value="66" <? if($ayar['orankorumamaxoran']==66){ ?> selected <? } ?>>66</option>
<option value="62" <? if($ayar['orankorumamaxoran']==62){ ?> selected <? } ?>>62</option>
<option value="63" <? if($ayar['orankorumamaxoran']==63){ ?> selected <? } ?>>63</option>
<option value="64" <? if($ayar['orankorumamaxoran']==64){ ?> selected <? } ?>>64</option>
<option value="65" <? if($ayar['orankorumamaxoran']==65){ ?> selected <? } ?>>65</option>
<option value="66" <? if($ayar['orankorumamaxoran']==66){ ?> selected <? } ?>>66</option>
<option value="67" <? if($ayar['orankorumamaxoran']==67){ ?> selected <? } ?>>67</option>
<option value="68" <? if($ayar['orankorumamaxoran']==68){ ?> selected <? } ?>>68</option>
<option value="69" <? if($ayar['orankorumamaxoran']==69){ ?> selected <? } ?>>69</option>
<option value="70" <? if($ayar['orankorumamaxoran']==70){ ?> selected <? } ?>>70</option>
<option value="77" <? if($ayar['orankorumamaxoran']==77){ ?> selected <? } ?>>77</option>
<option value="72" <? if($ayar['orankorumamaxoran']==72){ ?> selected <? } ?>>72</option>
<option value="73" <? if($ayar['orankorumamaxoran']==73){ ?> selected <? } ?>>73</option>
<option value="74" <? if($ayar['orankorumamaxoran']==74){ ?> selected <? } ?>>74</option>
<option value="75" <? if($ayar['orankorumamaxoran']==75){ ?> selected <? } ?>>75</option>
<option value="76" <? if($ayar['orankorumamaxoran']==76){ ?> selected <? } ?>>76</option>
<option value="77" <? if($ayar['orankorumamaxoran']==77){ ?> selected <? } ?>>77</option>
<option value="78" <? if($ayar['orankorumamaxoran']==78){ ?> selected <? } ?>>78</option>
<option value="79" <? if($ayar['orankorumamaxoran']==79){ ?> selected <? } ?>>79</option>
<option value="80" <? if($ayar['orankorumamaxoran']==80){ ?> selected <? } ?>>80</option>
<option value="88" <? if($ayar['orankorumamaxoran']==88){ ?> selected <? } ?>>88</option>
<option value="82" <? if($ayar['orankorumamaxoran']==82){ ?> selected <? } ?>>82</option>
<option value="83" <? if($ayar['orankorumamaxoran']==83){ ?> selected <? } ?>>83</option>
<option value="84" <? if($ayar['orankorumamaxoran']==84){ ?> selected <? } ?>>84</option>
<option value="85" <? if($ayar['orankorumamaxoran']==85){ ?> selected <? } ?>>85</option>
<option value="86" <? if($ayar['orankorumamaxoran']==86){ ?> selected <? } ?>>86</option>
<option value="87" <? if($ayar['orankorumamaxoran']==87){ ?> selected <? } ?>>87</option>
<option value="88" <? if($ayar['orankorumamaxoran']==88){ ?> selected <? } ?>>88</option>
<option value="89" <? if($ayar['orankorumamaxoran']==89){ ?> selected <? } ?>>89</option>
<option value="90" <? if($ayar['orankorumamaxoran']==90){ ?> selected <? } ?>>90</option>
<option value="99" <? if($ayar['orankorumamaxoran']==99){ ?> selected <? } ?>>99</option>
<option value="92" <? if($ayar['orankorumamaxoran']==92){ ?> selected <? } ?>>92</option>
<option value="93" <? if($ayar['orankorumamaxoran']==93){ ?> selected <? } ?>>93</option>
<option value="94" <? if($ayar['orankorumamaxoran']==94){ ?> selected <? } ?>>94</option>
<option value="95" <? if($ayar['orankorumamaxoran']==95){ ?> selected <? } ?>>95</option>
<option value="96" <? if($ayar['orankorumamaxoran']==96){ ?> selected <? } ?>>96</option>
<option value="97" <? if($ayar['orankorumamaxoran']==97){ ?> selected <? } ?>>97</option>
<option value="98" <? if($ayar['orankorumamaxoran']==98){ ?> selected <? } ?>>98</option>
<option value="99" <? if($ayar['orankorumamaxoran']==99){ ?> selected <? } ?>>99</option>
<option value="100" <? if($ayar['orankorumamaxoran']==100){ ?> selected <? } ?>>100</option>
<option value="9999" <? if($ayar['orankorumamaxoran']>100){ ?> selected <? } ?>><?=getTranslation('playersayar27')?></option>

</select>

<input <? if($ayar['orankorumamaxoran']<101){ ?>style="width:45px;display:none;"<? } else { ?>style="width:45px;"<? } ?> id="eldegeri" type="text" class="inputText"  name="elilegirilendeger" value="<? if($ayar['orankorumamaxoran']<101){ ?>101<? } else { ?><?=$ayar['orankorumamaxoran'];?><? } ?>"><span <? if($ayar['orankorumamaxoran']<101){ ?>style="display:none;"<? } ?> id="eldegeri2" class="itext-3"><?=getTranslation('playersayar28')?></span>

<br>
<span class="itext-3"><?=getTranslation('playersayar29')?></span>
</td>
</tr>

<tr>
<td><?=getTranslation('playersayar210')?></td>
<td><span class="itext-3"><?=getTranslation('playersayar211')?></span></td>
</tr>

<tr>
<td><?=getTranslation('playersayar212')?></td>
<td>
<select class="inputCombo chosen" name="canli_ilkyari_yayindan_kaldir" style="width: 95px;">
<? for ($i = 1; $i < 46; $i++) { ?>
<option value="<?= $i; ?>" <? if ($ayar['canli_ilkyari_yayindan_kaldir'] == $i) { echo "selected"; } ?>><?= $i; ?>.<?=getTranslation('playersayar213')?></option>
<? } ?>
<option value="75" <? if ($ayar['canli_ilkyari_yayindan_kaldir'] == 75) { echo "selected"; } ?>><?=getTranslation('playersayar214')?></option>
</select>
</td>
</tr>

<tr>
<td><?=getTranslation('playersayar215')?></td>
<td>
<select class="inputCombo chosen" name="canli_yayindan_kaldir" style="width: 95px;">
<? for ($i = 45; $i < 91; $i++) { ?>
<option value="<?= $i; ?>" <? if ($ayar['canli_yayindan_kaldir'] == $i) { echo "selected"; } ?>><?= $i; ?>.<?=getTranslation('playersayar213')?></option>
<? } ?>
<option value="125" <? if ($ayar['canli_yayindan_kaldir'] == 125) { echo "selected"; } ?>><?=getTranslation('playersayar214')?></option>
</select>
</td>
</tr>

<tr>
<td><?=getTranslation('ayardosyasi39')?></td>
<td>
<select class="inputCombo chosen" name="kuponalim" style="width: 95px;"> 
<option <?if($ayar['kuponalim']=="1"){ ?>selected<? } ?> value="1"><?=getTranslation('ayardosyasi40')?></option> 
<option <?if($ayar['kuponalim']=="0"){ ?>selected<? } ?> value="0"><?=getTranslation('ayardosyasi41')?></option>
</select>
</td>
</tr>

<tr>
<td><?=getTranslation('playersayar216')?></td>
<td><span class="itext-3"><?=getTranslation('playersayar217')?></span></td>
</tr>

<tr>
<td class="last" colspan="2">
<input class="btn btn-large btn-primary" id="kaydet" type="submit" name="submit" value="<?=getTranslation('playersayar218')?>">
</td>
</tr>
</tbody>
</table>
</form>

<script>
$(document).ready(function (e) {
$("#kaydet").click(function (e) {
self.document.newu.submit();
});
});
</script>

<table class="tablesorter">
<tbody><tr>
<th><?=getTranslation('playersayar219')?></th>
</tr>
<tr>
<td></td>
</tr>
<tr>
<td>
<div class="notice info">
<ul class="list-unordered list-checked2">
<li><?=getTranslation('playersayar220')?></li>
<li><?=getTranslation('playersayar221')?></li>
<li><?=getTranslation('playersayar222')?></li>
<li><?=getTranslation('playersayar223')?></li>
<li><?=getTranslation('playersayar224')?></li>
<li><?=getTranslation('playersayar225')?></li>
<li><?=getTranslation('playersayar226')?></li>
<li><?=getTranslation('playersayar227')?></li>
<li><?=getTranslation('playersayar228')?></li>
<li><?=getTranslation('playersayar229')?></li>
</ul>
</div>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>

</div>
</div>
</div>

<?php include 'footer.php'; ?>
</body>
</html>