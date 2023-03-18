<?
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); die(); exit(); }
if($ub['alt_durum']<1 && $ub['wkyetki']<1 && $ub['alt_alt_durum']<1 && $ub['sahip']=="0") { header("Location:index.php"); }
if($ub['adminpanel']=="1") { header("Location:admin"); }

function domain($domain){
    preg_match('#(?:http://)?(?:www\.)?([a-zA-Z0-9\-\.]+)/?#is', $domain, $d);
    return $d[1];
}

$toplam_kullanici = sed_sql_numrows(sed_sql_query("select hesap_sahibi_id,root from kullanici where hesap_sahibi_id='$ub[id]' and root='0'"));
$admin_limiti = $ub['alt_sinir'];
$user_limiti = $ub['alt_sinir_2'];
$toplams_limit = bilgi("SELECT SUM(CASE WHEN id!='' THEN alt_sinir END) as toplam_limit FROM kullanici WHERE hesap_sahibi_id='$ub[id]' and root='0'");

if(isset($_POST['submit'])) {

$username = pd("user");
$password = pd("sifre");
$hatirlatmaad = pd("hatirlatmaad");
$websitesi = domain($_SERVER["SERVER_NAME"]);
$kontrol = sed_sql_query("select * from kullanici where username='$username'");
$altsinir = pd("alt_sinir");
$zaman = time();

$hesapla_limit = $user_limiti-$toplams_limit['toplam_limit']-$altsinir;

if(strlen($username)<4) {
$onaylandi = 111;
} else if(sed_sql_numrows($kontrol)>0) { 
$onaylandi = 3;
} else if(empty($password)) {
$onaylandi = 4;
} else if($hesapla_limit>-1) {

sed_sql_query("INSERT INTO kullanici SET 
username='".$username."',
password='".$password."',
hatirlatmaad='".$hatirlatmaad."',
hesap_sahibi_user='".$ub['username']."',
hesap_sahibi_id='".$ub['id']."',
hesap_root_id='".$ub['hesap_sahibi_id']."',
hesap_root_root_id='".$ub['hesap_root_id']."',
alt_durum='1',
alt_alt_durum='0',
kupon_yetki='1',
alt_sinir='".$altsinir."',
olusturma_zaman='".$zaman."',
websitesi='".$websitesi."'");

$onaylandi = 1;

} else {

$onaylandi = 2;

}

}
?>
<? include 'header.php'; ?>
<? include 'menu.php'; ?>
<div id="main" class="lwkSelector" style="width: 758px;">
<div id="live">
<div class="space_20"></div>
<div class="main_space" id="main_wide">
<script>
$("#addusersuper").addClass("activemnuitems");
</script>
<div class="z-right-container" id="maskcontainer">

<? if($onaylandi==1) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('playersaddusersuper1')?></div>
<? } else if($onaylandi==2) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('playersaddusersuper2')?></div>
<? } else if($onaylandi==3) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('playersaddusersuper3')?></div>
<? } else if($onaylandi==4) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('playersaddusersuper4')?></div>
<? } else if($onaylandi==111) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();">En az 4 Harfli Kullanıcı Adı Belirlemelisiniz.</div>
<? } ?>

<? if($user_limiti-$toplams_limit['toplam_limit']==0) { ?>

<div class="new_sheet cf panelHead" style="margin-top: 0px;height: 25px;line-height: 25px;text-align: center;background: #fff;border-bottom: 3px solid #ef8107;border-top: 3px solid #ef8107;"><?=getTranslation('playersaddusersuper5')?> <?=$user_limiti;?> <?=getTranslation('playersaddusersuper6')?></div>
</div>

<? } else { ?>


<?
## SÜPER ADMİN İLE ADMİN OLUŞTURMA TABLOSU ##
if($ub['alt_alt_durum']>0) {
?>
<form method="post" name="newu">

<table class="tablesorter">
<thead>
<tr>
<th colspan="2"><?=getTranslation('playersaddusersuper7')?></th>
</tr>
</thead>
<tbody>
<tr>
<td width="250"><?=getTranslation('playersaddusersuper8')?> <span class="itext-2">*</span></td>
<td>
<input type="text" class="inputText" style="width:185px" name="user" id="ouser" onChange="userkontrol();">
<span class="itext-3" style="margin-left:15px;"><?=getTranslation('playersaddusersuper9')?></span>
</td>
</tr>
<tr>
<td width="250"><?=getTranslation('playersaddusersuper10')?> <span class="itext-2">*</span></td>
<td>
<input type="text" class="inputText" style="width:185px" name="sifre">
<span class="itext-3" style="margin-left:15px;"><?=getTranslation('playersaddusersuper11')?></span>
</td>
</tr>
<tr>
<td width="250"><?=getTranslation('playersaddusersuper12')?> </td>
<td>
<input type="text" class="inputText" style="width:185px" name="hatirlatmaad" id="huser" autocomplete="off">
<span class="itext-3" style="margin-left:15px;"><?=getTranslation('playersaddusersuper13')?></span>
</td>
</tr>
<tr>
<td width="250"><?=getTranslation('playersaddusersuper14')?></td>
<td>
<span class="itext-3" style="margin-left:15px;"><?=getTranslation('playersaddusersuper15')?> ( <span style="color:red;"><?=$admin_limiti;?></span> ) / <?=getTranslation('playersaddusersuper16')?> ( <span style="color:red;"><?=$admin_limiti-$toplam_kullanici;?></span> )</span>
</td>
</tr>
<tr>
<td width="250"><?=getTranslation('playersaddusersuper17')?></td>
<td>
<span class="itext-3" style="margin-left:15px;"><?=getTranslation('playersaddusersuper15')?> ( <span style="color:red;"><?=$user_limiti;?></span> ) / <?=getTranslation('playersaddusersuper16')?> ( <span style="color:red;"><?=$user_limiti-$toplams_limit['toplam_limit']; ?></span> )</span>
</td>
</tr>
<tr>
<td width="250"><?=getTranslation('playersaddusersuper18')?></td>
<td>
<select class="inputCombo chosen chzn-done" name="alt_sinir" style="width: 195px;">
<option value="0"><?=getTranslation('playersaddusersuper19')?></option>
<? if($user_limiti-$toplams_limit['toplam_limit']>0){ ?><option value="1">1 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>1){ ?><option value="2">2 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>2){ ?><option value="3">3 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>3){ ?><option value="4">4 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>4){ ?><option value="5" selected="selected">5 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>5){ ?><option value="6">6 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>6){ ?><option value="7">7 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>7){ ?><option value="8">8 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>8){ ?><option value="9">9 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>9){ ?><option value="10">10 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>10){ ?><option value="11">11 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>11){ ?><option value="12">12 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>12){ ?><option value="13">13 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>13){ ?><option value="14">14 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>14){ ?><option value="15">15 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>15){ ?><option value="16">16 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>16){ ?><option value="17">17 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>17){ ?><option value="18">18 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>18){ ?><option value="19">19 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>19){ ?><option value="20">20 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>20){ ?><option value="21">21 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>21){ ?><option value="22">22 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>22){ ?><option value="23">23 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>23){ ?><option value="24">24 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>24){ ?><option value="25">25 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>25){ ?><option value="26">26 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>26){ ?><option value="27">27 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>27){ ?><option value="28">28 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>28){ ?><option value="29">29 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>29){ ?><option value="30">30 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>30){ ?><option value="31">31 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>31){ ?><option value="32">32 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>32){ ?><option value="33">33 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>33){ ?><option value="34">34 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>34){ ?><option value="35">35 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>35){ ?><option value="36">36 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>36){ ?><option value="37">37 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>37){ ?><option value="38">38 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>38){ ?><option value="39">39 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>39){ ?><option value="40">40 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>40){ ?><option value="41">41 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>41){ ?><option value="42">42 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>42){ ?><option value="43">43 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>43){ ?><option value="44">44 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>44){ ?><option value="45">45 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>45){ ?><option value="46">46 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>46){ ?><option value="47">47 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>47){ ?><option value="48">48 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>48){ ?><option value="49">49 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>49){ ?><option value="50">50 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>50){ ?><option value="51">51 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>51){ ?><option value="52">52 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>52){ ?><option value="53">53 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>53){ ?><option value="54">54 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>54){ ?><option value="55">55 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>55){ ?><option value="56">56 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>56){ ?><option value="57">57 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>57){ ?><option value="58">58 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>58){ ?><option value="59">59 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>59){ ?><option value="60">60 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>60){ ?><option value="61">61 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>61){ ?><option value="62">62 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>62){ ?><option value="63">63 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>63){ ?><option value="64">64 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>64){ ?><option value="66">66 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>65){ ?><option value="66">66 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>66){ ?><option value="67">67 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>67){ ?><option value="68">68 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>68){ ?><option value="69">69 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>69){ ?><option value="70">70 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>70){ ?><option value="71">71 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>71){ ?><option value="72">72 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>72){ ?><option value="73">73 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>73){ ?><option value="74">74 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>74){ ?><option value="77">77 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>75){ ?><option value="76">76 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>76){ ?><option value="77">77 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>77){ ?><option value="78">78 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>78){ ?><option value="79">79 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>79){ ?><option value="80">80 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>80){ ?><option value="81">81 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>81){ ?><option value="82">82 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>82){ ?><option value="83">83 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>83){ ?><option value="84">84 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>84){ ?><option value="88">88 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>85){ ?><option value="86">86 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>86){ ?><option value="87">87 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>87){ ?><option value="88">88 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>88){ ?><option value="89">89 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>89){ ?><option value="90">90 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>90){ ?><option value="91">91 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>91){ ?><option value="92">92 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>92){ ?><option value="93">93 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>93){ ?><option value="94">94 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>94){ ?><option value="99">99 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>95){ ?><option value="96">96 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>96){ ?><option value="97">97 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>97){ ?><option value="98">98 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>98){ ?><option value="99">99 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
<? if($user_limiti-$toplams_limit['toplam_limit']>99){ ?><option value="100">100 <?=getTranslation('playersaddusersuper20')?></option><? } ?>
</select>
<span class="itext-3" style="margin-left:15px;"><?=getTranslation('playersaddusersuper21')?></span>
</td>
</tr>
<tr>
<td class="last" colspan="2">
<input type="submit" class="btn btn-large btn-primary" name="submit" value="<?=getTranslation('playersaddusersuper22')?>" id="kaydet">
</td>
</tr>
</tbody>
</table>
</form>
<script>
$(document).ready(function(e) {
    $("#kaydet").click(function(e) {
    var f = self.document.newu;
	if(f.user.value.length<2) { alertify.error('<?=getTranslation('playersaddusersuper23')?>'); f.user.select(); } else
	if(f.sifre.value.length<1) { alertify.error('<?=getTranslation('playersaddusersuper24')?>'); f.sifre.focus(); } else {
	f.submit();
	}
    });
});
</script>
<? } ?>
<script>
$(document).ready(function(e) {
    $("input").attr('autocomplete','off');
});
</script>
<? } ?>


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