<?PHP
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

$kuponalim = pd("kuponalim");
$max_satir = pd("max_satir");
$min_kupon_tutar = pd("min_kupon_tutar");
$aynikupon_max_tutar = pd("aynikupon_max_tutar");
$min_oran = pd("min_oran");
$maxoran = pd("maxoran");
$max_odeme = pd("max_odeme");
$tekmac_max_tutar = pd("tekmac_max_tutar");
$canli_sure = pd("canli_sure");
if($canli_sure<10){
	$canli_sure = 10;
	$hatavar = 1;
} else {
	$canli_sure = $canli_sure;
	$hatavar = 0;
}
$kupon_timeout = pd("kupon_timeout");
$kupon_timeout = ($kupon_timeout >= 120 ? $kupon_timeout : 300);

$bahiskombinasyonu = pd("bahiskombinasyonu");
$iptal_limit = pd("iptal_limit");

$iptal_sure = pd("iptal_sure");
$wattsap = pd("wattsap");
$wattsap_sayisi = strlen($wattsap);
if($wattsap!=0 && $wattsap_sayisi<11){
	$hatavar = 2;
}

$kontrol = sed_sql_query("select * from sistemayar where ayar_id='$ub[id]'");

if (sed_sql_numrows($kontrol) == 0 && $hatavar == 0) {

sed_sql_query("INSERT INTO sistemayar SET
kuponalim = '".$kuponalim."',
max_satir = '".$max_satir."',
min_kupon_tutar = '".$min_kupon_tutar."',
aynikupon_max_tutar = '".$aynikupon_max_tutar."',
min_oran = '".$min_oran."',
maxoran = '".$maxoran."',
max_odeme = '".$max_odeme."',
tekmac_max_tutar = '".$tekmac_max_tutar."',
canli_sure = '".$canli_sure."',
kupon_timeout = '".$kupon_timeout."',
bahiskombinasyonu = '".$bahiskombinasyonu."',
iptal_limit = '".$iptal_limit."',
iptal_sure = '".$iptal_sure."',
wattsap = '".$wattsap."',
ayar_id = '".$ub['id']."'");
header("Refresh:0");
$onaylandi = 1;
} else if ($hatavar == 0) {

sed_sql_query("update sistemayar set 
kuponalim = '".$kuponalim."',
max_satir = '".$max_satir."',
min_kupon_tutar = '".$min_kupon_tutar."',
aynikupon_max_tutar = '".$aynikupon_max_tutar."',
min_oran = '".$min_oran."',
maxoran = '".$maxoran."',
max_odeme = '".$max_odeme."',
tekmac_max_tutar = '".$tekmac_max_tutar."',
canli_sure = '".$canli_sure."',
kupon_timeout = '".$kupon_timeout."',
bahiskombinasyonu = '".$bahiskombinasyonu."',
iptal_limit = '".$iptal_limit."',
iptal_sure = '".$iptal_sure."',
wattsap = '".$wattsap."'
where ayar_id='".$ub['id']."'");
header("Refresh:0");
$onaylandi = 1;
} else if ($hatavar == 2) {
$onaylandi = 4;
} else {

sed_sql_query("update sistemayar set 
kuponalim = '".$kuponalim."',
max_satir = '".$max_satir."',
min_kupon_tutar = '".$min_kupon_tutar."',
aynikupon_max_tutar = '".$aynikupon_max_tutar."',
min_oran = '".$min_oran."',
maxoran = '".$maxoran."',
max_odeme = '".$max_odeme."',
tekmac_max_tutar = '".$tekmac_max_tutar."',
canli_sure = '".$canli_sure."',
kupon_timeout = '".$kupon_timeout."',
bahiskombinasyonu = '".$bahiskombinasyonu."',
iptal_limit = '".$iptal_limit."',
iptal_sure = '".$iptal_sure."',
wattsap = '".$wattsap."'
where ayar_id='".$ub['id']."'");
header("Refresh:0");
$onaylandi = 2;
}
}

if (isset($_POST['yasaklikelime'])) {
	$kelime = pd('kelime');
	$user_id = $_SESSION['betuser'];
	$ektarih = date("d.m.Y H:i:s");
	$sql = "INSERT INTO yasak_kelimeler (user_id,user_role,kelime,tarih) VALUES ('".$user_id."', '0', '".$kelime."','".$ektarih."')";
	if(strlen(trim($kelime))>2) {
		sed_sql_query($sql);
		header("Refresh:0");
		$onaylandi = 3;
	}
}

?>
<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>
<script>
$("#ayar").addClass("activemnuitems");
</script>
<div id="main" class="lwkSelector" style="width: 758px;">
<div id="live">
<div class="space_20"></div>
<div class="main_space" id="main_wide">
<script>$('#acmen_82').addClass("active")</script>
<div class="z-right-container" id="maskcontainer">

<? if($onaylandi==1) { ?>
<script>alert('<?=getTranslation('uyariayar1')?>.');</script>
<? } else if($onaylandi==2) { ?>
<script>alert('<?=getTranslation('uyariayar2')?>.');</script>
<? } else if($onaylandi==3) { ?>
<script>alert('<?=getTranslation('uyariayar3')?>.');</script>
<? } else if($onaylandi==4) { ?>
<script>alert('<?=getTranslation('uyariayar4')?>.');</script>
<? } ?>




<table class="tablesorter">
<thead>
<tr>
<th colspan="2"><?=getTranslation('ayardosyasi1')?></th>
</tr>
</thead>
<tbody>

<tr>
<td><?=getTranslation('ayardosyasi2')?></td>
<td>
<form name="kelime" method="post">
<input class="inputText" type="text" style="width: 200px" placeholder="Örnek: u19 veya u20" name="kelime" /> <input style="height: 26px;line-height: 0;" class="btn btn-primary" type="submit" name="yasaklikelime" value="<?=getTranslation('ayardosyasi38')?>">
<br>
<span class="itext-3"><?=getTranslation('ayardosyasi3')?>. <b><?=getTranslation('ayardosyasi4')?></b></span>
</form>
</td>
</tr>

<?
$sql = "SELECT * FROM yasak_kelimeler WHERE user_id = ".$_SESSION['betuser'] ."";
$sor = sed_sql_query($sql);
if (sed_sql_numrows($sor) > 0) {
echo "<tr>
<td>YASAKLADIĞINIZ KELİMELER</td>
<td>";
while ($r = sed_sql_fetchassoc($sor)) {
echo '<span style="border: 1px solid #00F;padding: 5px;margin: 3px;" class="itext-3">'. $r['kelime'] .' <b><a style="color:#f00;" href="javascript:void(0);" class="yskKelimeDeleteJS" data-id="'. $r['id'] .'">(Sil)</a></b></span>';
}
echo "</td>
</tr>";
}
?>


<form method="post" name="newu">
<tr>
<td><?=getTranslation('ayardosyasi39')?></td>
<td>
<select class="inputCombo chosen" name="kuponalim" style="width: 210px;"> 
<option <?if($ayar['kuponalim']=="1"){ ?>selected<? } ?> value="1"><?=getTranslation('ayardosyasi40')?></option> 
<option <?if($ayar['kuponalim']=="0"){ ?>selected<? } ?> value="0"><?=getTranslation('ayardosyasi41')?></option>
</select>
</td>
</tr>

<tr>
<td><?=getTranslation('ayardosyasi5')?></td>
<td>
<input type="text" class="inputText" name="max_satir" style="width: 200px" value="<?= $ayar['max_satir']; ?>">
</td>
</tr>

<tr>
<td><?=getTranslation('ayardosyasi6')?>:</td>
<td>
<select class="inputCombo chosen" name="min_oran" style="width: 210px;"> 
<option <?if($ayar['min_oran']=="1.01"){ ?>selected<? } else if($ayar['min_oran']=="") { ?>selected<? } ?> value="1.01">1.01</option> 
<option <?if($ayar['min_oran']=="1.02"){ ?>selected<? } ?> value="1.02">1.02</option> 
<option <?if($ayar['min_oran']=="1.03"){ ?>selected<? } ?> value="1.03">1.03</option> 
<option <?if($ayar['min_oran']=="1.04"){ ?>selected<? } ?> value="1.04">1.04</option> 
<option <?if($ayar['min_oran']=="1.05"){ ?>selected<? } ?> value="1.05">1.05</option> 
<option <?if($ayar['min_oran']=="1.06"){ ?>selected<? } ?> value="1.06">1.06</option>
<option <?if($ayar['min_oran']=="1.07"){ ?>selected<? } ?> value="1.07">1.07</option>
<option <?if($ayar['min_oran']=="1.08"){ ?>selected<? } ?> value="1.08">1.08</option>
<option <?if($ayar['min_oran']=="1.09"){ ?>selected<? } ?> value="1.09">1.09</option>
<option <?if($ayar['min_oran']=="1.10"){ ?>selected<? } ?> value="1.10">1.10</option>
<option <?if($ayar['min_oran']=="1.11"){ ?>selected<? } ?> value="1.11">1.11</option>
<option <?if($ayar['min_oran']=="1.12"){ ?>selected<? } ?> value="1.12">1.12</option>
<option <?if($ayar['min_oran']=="1.13"){ ?>selected<? } ?> value="1.13">1.13</option>
<option <?if($ayar['min_oran']=="1.14"){ ?>selected<? } ?> value="1.14">1.14</option>
<option <?if($ayar['min_oran']=="1.15"){ ?>selected<? } ?> value="1.15">1.15</option>
<option <?if($ayar['min_oran']=="1.16"){ ?>selected<? } ?> value="1.16">1.16</option>
<option <?if($ayar['min_oran']=="1.17"){ ?>selected<? } ?> value="1.17">1.17</option>
<option <?if($ayar['min_oran']=="1.18"){ ?>selected<? } ?> value="1.18">1.18</option>
<option <?if($ayar['min_oran']=="1.19"){ ?>selected<? } ?> value="1.19">1.19</option>
<option <?if($ayar['min_oran']=="1.20"){ ?>selected<? } ?> value="1.20">1.20</option>
<option <?if($ayar['min_oran']=="1.21"){ ?>selected<? } ?> value="1.21">1.21</option>
<option <?if($ayar['min_oran']=="1.22"){ ?>selected<? } ?> value="1.22">1.22</option>
<option <?if($ayar['min_oran']=="1.23"){ ?>selected<? } ?> value="1.23">1.23</option>
<option <?if($ayar['min_oran']=="1.24"){ ?>selected<? } ?> value="1.24">1.24</option>
<option <?if($ayar['min_oran']=="1.25"){ ?>selected<? } ?> value="1.25">1.25</option>
<option <?if($ayar['min_oran']=="1.26"){ ?>selected<? } ?> value="1.26">1.26</option>
<option <?if($ayar['min_oran']=="1.27"){ ?>selected<? } ?> value="1.27">1.27</option>
<option <?if($ayar['min_oran']=="1.28"){ ?>selected<? } ?> value="1.28">1.28</option>
<option <?if($ayar['min_oran']=="1.29"){ ?>selected<? } ?> value="1.29">1.29</option>
<option <?if($ayar['min_oran']=="1.30"){ ?>selected<? } ?> value="1.30">1.30</option>
<option <?if($ayar['min_oran']=="1.31"){ ?>selected<? } ?> value="1.31">1.31</option>
<option <?if($ayar['min_oran']=="1.32"){ ?>selected<? } ?> value="1.32">1.32</option>
<option <?if($ayar['min_oran']=="1.33"){ ?>selected<? } ?> value="1.33">1.33</option>
<option <?if($ayar['min_oran']=="1.34"){ ?>selected<? } ?> value="1.34">1.34</option>
<option <?if($ayar['min_oran']=="1.35"){ ?>selected<? } ?> value="1.35">1.35</option>
<option <?if($ayar['min_oran']=="1.36"){ ?>selected<? } ?> value="1.36">1.36</option>
<option <?if($ayar['min_oran']=="1.37"){ ?>selected<? } ?> value="1.37">1.37</option>
<option <?if($ayar['min_oran']=="1.38"){ ?>selected<? } ?> value="1.38">1.38</option>
<option <?if($ayar['min_oran']=="1.39"){ ?>selected<? } ?> value="1.39">1.39</option>
<option <?if($ayar['min_oran']=="1.40"){ ?>selected<? } ?> value="1.40">1.40</option>
<option <?if($ayar['min_oran']=="1.41"){ ?>selected<? } ?> value="1.41">1.41</option>
<option <?if($ayar['min_oran']=="1.42"){ ?>selected<? } ?> value="1.42">1.42</option>
<option <?if($ayar['min_oran']=="1.43"){ ?>selected<? } ?> value="1.43">1.43</option>
<option <?if($ayar['min_oran']=="1.44"){ ?>selected<? } ?> value="1.44">1.44</option>
<option <?if($ayar['min_oran']=="1.45"){ ?>selected<? } ?> value="1.45">1.45</option>
<option <?if($ayar['min_oran']=="1.46"){ ?>selected<? } ?> value="1.46">1.46</option>
<option <?if($ayar['min_oran']=="1.47"){ ?>selected<? } ?> value="1.47">1.47</option>
<option <?if($ayar['min_oran']=="1.48"){ ?>selected<? } ?> value="1.48">1.48</option>
<option <?if($ayar['min_oran']=="1.49"){ ?>selected<? } ?> value="1.49">1.49</option>
<option <?if($ayar['min_oran']=="1.50"){ ?>selected<? } ?> value="1.50">1.50</option>
<option <?if($ayar['min_oran']=="1.51"){ ?>selected<? } ?> value="1.51">1.51</option>
<option <?if($ayar['min_oran']=="1.52"){ ?>selected<? } ?> value="1.52">1.52</option>
<option <?if($ayar['min_oran']=="1.53"){ ?>selected<? } ?> value="1.53">1.53</option>
<option <?if($ayar['min_oran']=="1.54"){ ?>selected<? } ?> value="1.54">1.54</option>
<option <?if($ayar['min_oran']=="1.55"){ ?>selected<? } ?> value="1.55">1.55</option>
<option <?if($ayar['min_oran']=="1.56"){ ?>selected<? } ?> value="1.56">1.56</option>
<option <?if($ayar['min_oran']=="1.57"){ ?>selected<? } ?> value="1.57">1.57</option>
<option <?if($ayar['min_oran']=="1.58"){ ?>selected<? } ?> value="1.58">1.58</option>
<option <?if($ayar['min_oran']=="1.59"){ ?>selected<? } ?> value="1.59">1.59</option>
<option <?if($ayar['min_oran']=="1.60"){ ?>selected<? } ?> value="1.60">1.60</option>
<option <?if($ayar['min_oran']=="1.61"){ ?>selected<? } ?> value="1.61">1.61</option>
<option <?if($ayar['min_oran']=="1.62"){ ?>selected<? } ?> value="1.62">1.62</option>
<option <?if($ayar['min_oran']=="1.63"){ ?>selected<? } ?> value="1.63">1.63</option>
<option <?if($ayar['min_oran']=="1.64"){ ?>selected<? } ?> value="1.64">1.64</option>
<option <?if($ayar['min_oran']=="1.65"){ ?>selected<? } ?> value="1.65">1.65</option>
<option <?if($ayar['min_oran']=="1.66"){ ?>selected<? } ?> value="1.66">1.66</option>
<option <?if($ayar['min_oran']=="1.67"){ ?>selected<? } ?> value="1.67">1.67</option>
<option <?if($ayar['min_oran']=="1.68"){ ?>selected<? } ?> value="1.68">1.68</option>
<option <?if($ayar['min_oran']=="1.69"){ ?>selected<? } ?> value="1.69">1.69</option>
<option <?if($ayar['min_oran']=="1.70"){ ?>selected<? } ?> value="1.70">1.70</option>
<option <?if($ayar['min_oran']=="1.71"){ ?>selected<? } ?> value="1.71">1.71</option>
<option <?if($ayar['min_oran']=="1.72"){ ?>selected<? } ?> value="1.72">1.72</option>
<option <?if($ayar['min_oran']=="1.73"){ ?>selected<? } ?> value="1.73">1.73</option>
<option <?if($ayar['min_oran']=="1.74"){ ?>selected<? } ?> value="1.74">1.74</option>
<option <?if($ayar['min_oran']=="1.75"){ ?>selected<? } ?> value="1.75">1.75</option>
</select>
</td>
</tr>

<tr>
<td><?=getTranslation('ayardosyasi7')?></td>
<td>
<input type="text" class="inputText" name="min_kupon_tutar" style="width: 200px" value="<?= $ayar['min_kupon_tutar']; ?>">
</td>
</tr>

<tr>
<td><?=getTranslation('ayardosyasi8')?></td>
<td>
<input type="text" class="inputText" style="width: 200px" name="aynikupon_max_tutar" value="<?= $ayar['aynikupon_max_tutar']; ?>">
<span class="itext-3"><?=getTranslation('parabirimi')?></span>
</td>
</tr>

<tr>
<td><?=getTranslation('ayardosyasi9')?></td>
<td>
<input type="text" class="inputText" name="maxoran" style="width: 200px" value="<?= $ayar['maxoran']; ?>">
</td>
</tr>

<tr>
<td><?=getTranslation('ayardosyasi10')?></td>
<td>
<input type="text" class="inputText" name="max_odeme" style="width: 200px" value="<?= $ayar['max_odeme']; ?>">
<span class="itext-3"><?=getTranslation('parabirimi')?></span>
</td>
</tr>



<tr>
<td><?=getTranslation('ayardosyasi11')?></td>
<td>
<input type="text" class="inputText" style="width: 200px" name="tekmac_max_tutar" value="<?= $ayar['tekmac_max_tutar']; ?>">
<span class="itext-3"><?=getTranslation('parabirimi')?></span>
</td>
</tr>

<tr>
<td><?=getTranslation('ayardosyasi12')?></td>
<td>
<select class="inputCombo chosen" name="canli_sure" style="width: 210px;"> 
<option <?if($ayar['canli_sure']=="10"){ ?>selected<? } else if($ayar['canli_sure']=="") { ?>selected<? } ?> value="10">10 <?=getTranslation('ayardosyasi13')?></option> 
<option <?if($ayar['canli_sure']=="11"){ ?>selected<? } ?> value="11">11 <?=getTranslation('ayardosyasi13')?></option> 
<option <?if($ayar['canli_sure']=="12"){ ?>selected<? } ?> value="12">12 <?=getTranslation('ayardosyasi13')?></option> 
<option <?if($ayar['canli_sure']=="13"){ ?>selected<? } ?> value="13">13 <?=getTranslation('ayardosyasi13')?></option> 
<option <?if($ayar['canli_sure']=="14"){ ?>selected<? } ?> value="14">14 <?=getTranslation('ayardosyasi13')?></option> 
<option <?if($ayar['canli_sure']=="15"){ ?>selected<? } ?> value="15">15 <?=getTranslation('ayardosyasi13')?></option> 
<option <?if($ayar['canli_sure']=="16"){ ?>selected<? } ?> value="16">16 <?=getTranslation('ayardosyasi13')?></option>
<option <?if($ayar['canli_sure']=="17"){ ?>selected<? } ?> value="17">17 <?=getTranslation('ayardosyasi13')?></option>
<option <?if($ayar['canli_sure']=="18"){ ?>selected<? } ?> value="18">18 <?=getTranslation('ayardosyasi13')?></option>
<option <?if($ayar['canli_sure']=="19"){ ?>selected<? } ?> value="19">19 <?=getTranslation('ayardosyasi13')?></option>
<option <?if($ayar['canli_sure']=="20"){ ?>selected<? } ?> value="20">20 <?=getTranslation('ayardosyasi13')?></option>
</select>
</td>
</tr>

<tr>
<td><?=getTranslation('ayardosyasi')?>CANLI ONAY BEKLETME SURESI</td>
<td>
<input type="text" class="inputText" name="kupon_timeout" value="<?php echo (isset($ayar['kupon_timeout']) ? ($ayar['kupon_timeout'] >= 120 ? $ayar['kupon_timeout'] : 300) : 300); ?>">
<span class="itext-3"><?=getTranslation('ayardosyasi14')?></span>
<span class="itext-3"><?=getTranslation('ayardosyasi15')?></span>
</td>
</tr>

<tr>
<td><?=getTranslation('ayardosyasi16')?></td>
<td>
<select class="inputCombo chosen" name="bahiskombinasyonu" style="width: 210px;">
<option value="1" <? if($ayar['bahiskombinasyonu']==1){ ?> selected <? } ?>><?=getTranslation('ayardosyasi17')?></option>
<option value="2" <? if($ayar['bahiskombinasyonu']==2){ ?> selected <? } ?>><?=getTranslation('ayardosyasi18')?></option>
</select>
</td>
</tr>

<tr>
<td><?=getTranslation('ayardosyasi19')?></td>
<td>
<input type="text" class="inputText" style="width: 200px" name="iptal_limit" value="<?= $ayar['iptal_limit']; ?>">
<span class="itext-3"><?=getTranslation('ayardosyasi20')?></span>
</td>
</tr>

<tr>
<td><?=getTranslation('ayardosyasi21')?></td>
<td>
<input type="text" class="inputText" style="width: 200px" name="iptal_sure" value="<?= $ayar['iptal_sure']; ?>">
<span class="itext-3"><?=getTranslation('ayardosyasi37')?></span>
</td>
</tr>

<tr>
<td><?=getTranslation('ayardosyasi22')?></td>
<td>
<input class="inputText" type="text" name="wattsap" id="wattsap" style="width: 200px" maxlength="11" value="<?= $ayar['wattsap']; ?>">
<span class="itext-3"><?=getTranslation('ayardosyasi23')?></span>
</td>
</tr>

<tr>
<td class="last" colspan="2">
<input class="btn btn-large btn-primary" id="kaydet" type="submit" name="submit" value="<?=getTranslation('ayardosyasi24')?>">
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
<th><?=getTranslation('ayardosyasi25')?></th>
</tr>
<tr>
<td></td>
</tr>
<tr>
<td>
<div class="notice info">
<ul class="list-unordered list-checked2">
<li><?=getTranslation('ayardosyasi26')?></li>
<li><?=getTranslation('ayardosyasi27')?></li>
<li><?=getTranslation('ayardosyasi28')?></li>
<li><?=getTranslation('ayardosyasi29')?></li>
<li><?=getTranslation('ayardosyasi30')?></li>
<li><?=getTranslation('ayardosyasi31')?></li>
<li><?=getTranslation('ayardosyasi32')?></li>
<li><?=getTranslation('ayardosyasi33')?></li>
<li><?=getTranslation('ayardosyasi34')?></li>
<li><?=getTranslation('ayardosyasi35')?></li>
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

<script>
	$(document).on("click", ".yskKelimeDeleteJS", function (e){
		e.preventDefault();
		var self = $(this);
		var id = self.data("id");
		
		if (typeof(id) != "undefined") {
			if (confirm("<?=getTranslation('ayardosyasi36')?>")){
				$.get("../ajax.php?a=yasaklikelimesil&id=" + id, function(data) {
					var pr = self.parents("span");
					pr.remove();
				});
				
				return false;
			}
		}
	});
</script>

<?PHP include 'footer.php'; ?>
</body>
</html>