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
$toplams_limit = bilgi("SELECT SUM(CASE WHEN id!='' THEN alt_sinir END) as toplam_limit FROM kullanici WHERE hesap_sahibi_id='$ub[id]' and root='0'");
$alt_sinirini_bul = $ub['alt_sinir']-$toplams_limit['toplam_limit']-$toplam_kullanici-1;


if(isset($_POST['submit'])) {

$username = pd("user");
$password = pd("sifre");
$hatirlatmaad = pd("hatirlatmaad");
$websitesi = domain($_SERVER["SERVER_NAME"]);
$kontrol = sed_sql_query("select * from kullanici where username='$username'");
$zaman = time();

$bakiye = pd("bakiye");
$n_calisma_sekli = pd("n_calisma_sekli");
$n_komisyon = pd("n_komisyon");
$kazananyuzde = pd("kazananyuzde");
$canlioynama = pd("canlioynama");
$wkyetki = pd("wkyetki");
$altsinir = pd("alt_sinir");

$hesapla_limit = $admin_limiti-$toplams_limit['toplam_limit']-$altsinir;

if(strlen($username)<4) {
$onaylandi = 111;
} else if(sed_sql_numrows($kontrol)>0) { 
$onaylandi = 3;
} else if($wkyetki<1) {
	$onaylandi = 5;
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
n_calisma_sekli='".$n_calisma_sekli."',
n_komisyon='".$n_komisyon."',
kazananyuzde='".$kazananyuzde."',
canlioynama='".$canlioynama."',
wkyetki='".$wkyetki."',
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
$("#adduseradmin").addClass("activemnuitems");
</script>
<div class="z-right-container" id="maskcontainer">

<? if($onaylandi==1) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('adduseradmin1')?></div>
<? } else if($onaylandi==2) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('adduseradmin2')?></div>
<? } else if($onaylandi==3) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('adduseradmin3')?></div>
<? } else if($onaylandi==4) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('adduseradmin4')?></div>
<? } else if($onaylandi==5) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();"><?=getTranslation('adduseradmin5')?></div>
<? } else if($onaylandi==111) { ?>
<div class="infomsg" onclick="javascript:$(this).hide();">En az 4 Harfli Kullanıcı Adı Belirlemelisiniz.</div>
<? } ?>

<script type="text/javascript">
function Uyestep1(val){
if(val==0){
$('#sbayiac').hide();
$('#sbayiacs').hide();
$('#sbayiacs2').show();
}else if(val=="1"){
$('#csayfa').text('0');
$('#sbayiac').show();
$('#sbayiacs').show();
$('#sbayiacs2').hide();
}else{
$('#sbayiac').hide();
$('#sbayiacs').hide();
$('#sbayiacs2').show();
}
}

function Uyestep3(val){
	var sayiver = <?=$alt_sinirini_bul;?>-val;
$('#csayfa').text(val);
$('#sbayiac').show();
$('#csayfa2').text(sayiver);
}
</script>

<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']==0) { ?>

<div class="new_sheet cf panelHead" style="margin-top: 0px;height: 25px;line-height: 25px;text-align: center;background: #fff;border-bottom: 3px solid #ef8107;border-top: 3px solid #ef8107;"><?=getTranslation('adduseradmin6')?> <?=$admin_limiti;?> <?=getTranslation('adduseradmin7')?></div>
</div>

<? } else { ?>


<?
## ADMİN İLE BAYİ OLUŞTURMA TABLOSU ##
if($ub['alt_durum']>0) {
?>
<form method="post" name="newu">

<table class="tablesorter">
<thead>
<tr>
<th colspan="2"><?=getTranslation('adduseradmin27')?></th>
</tr>
</thead>
<tbody>
<tr>
<td width="250"><?=getTranslation('adduseradmin28')?> <span class="itext-2">*</span></td>
<td>
<input type="text" class="inputText" style="width:185px" name="user" id="ouser" onChange="userkontrol();">
<span class="itext-3" style="margin-left:15px;"><?=getTranslation('adduseradmin29')?></span>
</td>
</tr>
<tr>
<td width="250"><?=getTranslation('adduseradmin30')?> <span class="itext-2">*</span></td>
<td>
<input type="text" class="inputText" style="width:185px" name="sifre">
<span class="itext-3" style="margin-left:15px;"><?=getTranslation('adduseradmin31')?></span>
</td>
</tr>
<tr>
<td width="250"><?=getTranslation('adduseradmin32')?> </td>
<td>
<input type="text" class="inputText" style="width:185px" name="hatirlatmaad" id="huser" autocomplete="off">
<span class="itext-3" style="margin-left:15px;"><?=getTranslation('adduseradmin33')?></span>
</td>
</tr>
<tr>
<td width="250"><?=getTranslation('adduseradmin34')?> </td>
<td>
<input type="text" class="inputText" style="width:45px" name="bakiye" value="0"><span class="itext-3" style="margin-left:15px;"><?=getTranslation('parabirimi')?></span>
</td>
</tr>
<tr>
<td width="250"><?=getTranslation('adduseradmin35')?> </td>
<td>
<select class="inputCombo chosen" name="n_calisma_sekli">
<option value="2"><?=getTranslation('adduseradmin36')?></option>
<option value="1"><?=getTranslation('adduseradmin37')?></option>
</select>
</td>
</tr>
<tr>
<td width="250"><?=getTranslation('adduseradmin38')?> </td>
<td>
<input type="number" class="inputText" style="width:45px" name="n_komisyon" max="99" value="0">
<span class="itext-3" style="margin-left:15px;"><?=getTranslation('adduseradmin39')?></span>
</td>
</tr>
<tr>
<td width="250"><?=getTranslation('adduseradmin40')?> </td>
<td>
<input type="text" class="inputText" style="width:45px" name="kazananyuzde" value="5">
<span class="itext-3" style="margin-left:15px;"><?=getTranslation('adduseradmin41')?></span>
</td>
</tr>

<tr>
<td width="250"><?=getTranslation('adduseradmin42')?></td>
<td>
<select class="inputCombo chosen chzn-done" id="canlioynama" style="width: 195px;" name="canlioynama">
<option value="1"><?=getTranslation('adduseradmin43')?></option>
<option value="0"><?=getTranslation('adduseradmin44')?></option>
</select>
</td>
</tr>

<tr>
<td width="250"><?=getTranslation('adduseradmin45')?></td>
<td>
<span class="itext-3" style="margin-left:15px;"><?=getTranslation('adduseradmin46')?> ( <span style="color:red;"><?=$admin_limiti;?></span> ) / <?=getTranslation('adduseradmin47')?> ( <span style="color:red;"><?=$admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']; ?></span> )</span>
</td>
</tr>

<tr id="sbayiac" style="display: none;">
<td width="250"><?=getTranslation('adduseradmin48')?></td>
<td>
<select class="inputCombo chosen chzn-done" name="alt_sinir" onchange="Uyestep3(this.value);void(0);" style="width: 210px;">
<option value="0" selected="selected"><?=getTranslation('adduseradmin49')?></option>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>1){ ?><option value="1">1 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>2){ ?><option value="2">2 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>3){ ?><option value="3">3 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>4){ ?><option value="4">4 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>5){ ?><option value="5">5 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>6){ ?><option value="6">6 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>7){ ?><option value="7">7 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>8){ ?><option value="8">8 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>9){ ?><option value="9">9 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>10){ ?><option value="10">10 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>11){ ?><option value="11">11 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>12){ ?><option value="12">12 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>13){ ?><option value="13">13 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>14){ ?><option value="14">14 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>15){ ?><option value="15">15 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>16){ ?><option value="16">16 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>17){ ?><option value="17">17 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>18){ ?><option value="18">18 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>19){ ?><option value="19">19 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>20){ ?><option value="20">20 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>21){ ?><option value="21">21 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>22){ ?><option value="22">22 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>23){ ?><option value="23">23 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>24){ ?><option value="24">24 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>25){ ?><option value="25">25 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>26){ ?><option value="26">26 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>27){ ?><option value="27">27 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>28){ ?><option value="28">28 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>29){ ?><option value="29">29 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>30){ ?><option value="30">30 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>31){ ?><option value="31">31 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>32){ ?><option value="32">32 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>33){ ?><option value="33">33 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>34){ ?><option value="34">34 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>35){ ?><option value="35">35 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>36){ ?><option value="36">36 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>37){ ?><option value="37">37 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>38){ ?><option value="38">38 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>39){ ?><option value="39">39 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>40){ ?><option value="40">40 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>41){ ?><option value="41">41 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>42){ ?><option value="42">42 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>43){ ?><option value="43">43 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>44){ ?><option value="44">44 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>45){ ?><option value="45">45 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>46){ ?><option value="46">46 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>47){ ?><option value="47">47 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>48){ ?><option value="48">48 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>49){ ?><option value="49">49 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>50){ ?><option value="50">50 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>51){ ?><option value="51">51 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>52){ ?><option value="52">52 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>53){ ?><option value="53">53 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>54){ ?><option value="54">54 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>55){ ?><option value="55">55 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>56){ ?><option value="56">56 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>57){ ?><option value="57">57 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>58){ ?><option value="58">58 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>59){ ?><option value="59">59 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>60){ ?><option value="60">60 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>61){ ?><option value="61">61 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>62){ ?><option value="62">62 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>63){ ?><option value="63">63 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>64){ ?><option value="64">64 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>65){ ?><option value="66">66 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>66){ ?><option value="66">66 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>67){ ?><option value="67">67 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>68){ ?><option value="68">68 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>69){ ?><option value="69">69 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>70){ ?><option value="70">70 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>71){ ?><option value="71">71 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>72){ ?><option value="72">72 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>73){ ?><option value="73">73 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>74){ ?><option value="74">74 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>75){ ?><option value="77">77 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>76){ ?><option value="76">76 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>77){ ?><option value="77">77 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>78){ ?><option value="78">78 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>79){ ?><option value="79">79 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>80){ ?><option value="80">80 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>81){ ?><option value="81">81 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>82){ ?><option value="82">82 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>83){ ?><option value="83">83 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>84){ ?><option value="84">84 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>85){ ?><option value="88">88 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>86){ ?><option value="86">86 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>87){ ?><option value="87">87 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>88){ ?><option value="88">88 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>89){ ?><option value="89">89 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>90){ ?><option value="90">90 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>91){ ?><option value="91">91 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>92){ ?><option value="92">92 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>93){ ?><option value="93">93 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>94){ ?><option value="94">94 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>95){ ?><option value="99">99 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>96){ ?><option value="96">96 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>97){ ?><option value="97">97 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>98){ ?><option value="98">98 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>99){ ?><option value="99">99 <?=getTranslation('adduseradmin50')?></option><? } ?>
<? if($admin_limiti-$toplam_kullanici-$toplams_limit['toplam_limit']>100){ ?><option value="100">100 <?=getTranslation('adduseradmin50')?></option><? } ?>
</select>
<span class="itext-3" style="margin-left:15px;"><?=getTranslation('adduseradmin51')?></span>
</td>
</tr>

<tr id="sbayiacs" style="display: none;">
<td width="250"><?=getTranslation('adduseradmin52')?></td>
<td>
<span class="itext-3" style="margin-left:15px;"><?=getTranslation('adduseradmin53')?> <span id="csayfa" style="color: red;">1</span> <?=getTranslation('adduseradmin54')?> ( <span style="color: red;" id="csayfa2"><?=$alt_sinirini_bul;?></span> )</span>
</td>
</tr>

<tr>
<td width="250"><?=getTranslation('adduseradmin55')?></td>
<td>
<select class="inputCombo chosen chzn-done" id="wkyetki" onchange="Uyestep1(this.value);void(0);" style="width: 195px;" name="wkyetki">
<option selected value="0">----------------</option>
<? if($alt_sinirini_bul>0){ ?><option value="1"><?=getTranslation('adduseradmin56')?></option><? } ?>
<option value="2"><?=getTranslation('adduseradmin57')?></option>
<option value="3"><?=getTranslation('adduseradmin58')?></option>
</select>
<span class="itext-3" id="sbayiacs2" style="margin-left:15px;"><?=getTranslation('adduseradmin59')?> <span id="csayfas" style="color: red;">1</span> <?=getTranslation('adduseradmin60')?> ( <span style="color: red;"><?=$alt_sinirini_bul;?></span> )</span>
</td>
</tr>
<tr>
<td class="last" colspan="2">
<input type="submit" class="btn btn-large btn-primary" name="submit" value="<?=getTranslation('adduseradmin61')?>" id="kaydet">
</td>
</tr>
</tbody>
</table>
</form>
<script>
$(document).ready(function(e) {
    $("#kaydet").click(function(e) {
    var f = self.document.newu;
	if(f.user.value.length<2) { alertify.error('<?=getTranslation('adduseradmin62')?>'); f.user.select(); } else
	if(f.sifre.value.length<1) { alertify.error('<?=getTranslation('adduseradmin63')?>'); f.sifre.focus(); } else {
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

<table class="tablesorter">
<thead>
<tr>
<th colspan="2"><?=getTranslation('adduseradmin8')?></th>
</tr>
</thead>
<tbody>
<tr>
<td style="width:100px;"><?=getTranslation('adduseradmin9')?></td>
<td><?=getTranslation('adduseradmin10')?><br><br>
<i><?=getTranslation('adduseradmin11')?></i></td>
</tr>
<tr>
<td style="width:100px;"><?=getTranslation('adduseradmin12')?></td>
<td><?=getTranslation('adduseradmin13')?><br><br>
<i><?=getTranslation('adduseradmin14')?></i></td>
</tr>
<tr>
<td style="width:100px;"><?=getTranslation('adduseradmin15')?></td>
<td><?=getTranslation('adduseradmin16')?><br><br>
<i><?=getTranslation('adduseradmin17')?></i></td>
</tr>
</tbody>
</table>

<table class="tablesorter">
<thead>
<tr>
<th><?=getTranslation('adduseradmin18')?></th>
<th><?=getTranslation('adduseradmin19')?></th>
<th><?=getTranslation('adduseradmin20')?></th>
<th><?=getTranslation('adduseradmin21')?></th>
</tr>
</thead>
<tbody>
<tr>
<td><?=getTranslation('adduseradmin22')?></td>
<td class="c" style="text-align: center;"><img src="/players/img/check.png" alt="Yetkiler" border="0"></td>
<td class="c" style="text-align: center;"><img src="/players/img/check_2.png" alt="Yetkiler" border="0"></td>
<td class="c" style="text-align: center;"><img src="/players/img/check_2.png" alt="Yetkiler" border="0"></td>
</tr>
<tr>
<td><?=getTranslation('adduseradmin23')?></td>
<td class="c" style="text-align: center;"><img src="/players/img/check.png" alt="Yetkiler" border="0"></td>
<td class="c" style="text-align: center;"><img src="/players/img/check_2.png" alt="Yetkiler" border="0"></td>
<td class="c" style="text-align: center;"><img src="/players/img/check_2.png" alt="Yetkiler" border="0"></td>
</tr>
<tr>
<td><?=getTranslation('adduseradmin24')?></td>
<td class="c" style="text-align: center;"><img src="/players/img/check.png" alt="Yetkiler" border="0"></td>
<td class="c" style="text-align: center;"><img src="/players/img/check.png" alt="Yetkiler" border="0"></td>
<td class="c" style="text-align: center;"><img src="/players/img/check.png" alt="Yetkiler" border="0"></td>
</tr>
<tr>
<td><?=getTranslation('adduseradmin25')?></td>
<td class="c" style="text-align: center;"><img src="/players/img/check.png" alt="Yetkiler" border="0"></td>
<td class="c" style="text-align: center;"><img src="/players/img/check.png" alt="Yetkiler" border="0"></td>
<td class="c" style="text-align: center;"><img src="/players/img/check.png" alt="Yetkiler" border="0"></td>
</tr>
<tr>
<td><?=getTranslation('adduseradmin26')?></td>
<td class="c" style="text-align: center;"><img src="/players/img/check.png" alt="Yetkiler" border="0"></td>
<td class="c" style="text-align: center;"><img src="/players/img/check.png" alt="Yetkiler" border="0"></td>
<td class="c" style="text-align: center;"><img src="/players/img/check.png" alt="Yetkiler" border="0"></td>
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
</div>

<? include 'footer.php'; ?>

</body>
</html>