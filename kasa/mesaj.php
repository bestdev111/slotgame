<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); die(); exit(); }
if($ub['alt_durum']<1 && $ub['wkyetki']<1 && $ub['alt_alt_durum']<1 && $ub['sahip']=="0") { header("Location:index.php"); }

$getle = gd("get");

if(isset($_GET['id'])) {
$id = gd("id");
$bayilerim = "".benimbayilerim($ub['id'])."";
$bayi_array = explode(",",$bayilerim);
if($ub['hesap_sahibi_id']==$id){  } else
if(!in_array($id,$bayi_array) || !is_numeric($id)) { die("<div class='bos'>Buna yetkili degilsiniz.</div>"); }
$_SESSION['gonderilicekkisi_mesaj'] = $id;
$_SESSION['gonderenkisi_mesaj'] = $ub['id'];
header("Location:mesaj.php");
}

if($getle=="mesajgir") {
$giden = gd("giden");
$mesaj = gd("mesaj");
$zaman = time();
$ipadres = $_SERVER['REMOTE_ADDR'];
sed_sql_query("insert into chat (id,gonderen_id,alan_id,zaman,ipadres,mesaj) values ('','$ub[id]','$giden','$zaman','$ipadres','$mesaj')");
}

?>
<?php include 'header.php'; ?>

<main class="main">
<ol class="breadcrumb mb-0">
<li class="breadcrumb-item"><?=getTranslation('mesajpaneli12')?></li>
</ol>

<div class="alert alert-danger mb-0" id="error"></div>
<div class="alert alert-info mb-0" id="info"></div>
<div class="alert alert-success mb-0" id="success"></div>

<div class="container-fluid mt-2">
<div class="row">
<div class="card">
<div class="card-header"> <?=getTranslation('mesajpaneli12')?> </div>
<div class="card-block p-0">
<div class="table-responsive">
<table class="table table-striped mb-0">
<tbody>

<tr>
<td>
<div id="alanes" style="padding: 5px 10px 5px;background-color: #FFF;height: 300px;overflow: auto;">

<?
$id = gd("id");

$sor = sed_sql_query("select * from chat where ((alan_id='".$_SESSION['gonderenkisi_mesaj']."' and gonderen_id='".$_SESSION['gonderilicekkisi_mesaj']."') or (alan_id='".$_SESSION['gonderilicekkisi_mesaj']."' and gonderen_id='".$_SESSION['gonderenkisi_mesaj']."')) and silindi='0'");

while($row=sed_sql_fetcharray($sor)) {

$gonbilgi = bilgi("select username,id from kullanici where id='$row[gonderen_id]'");

if($gonbilgi['id']!=$ub['id']) {

sed_sql_query("update chat set okundu='1' where id='$row[id]'");

}

?>

<div class="chatmesaj" style="width: 100%;padding-top: 10px;padding-bottom: 10px;">
<span style="<? if($gonbilgi['id']==$ub['id']) { ?>color:#BC2121;font-size: 15px;text-transform: uppercase;font-weight:bold;<? } else { ?> color:#555;font-size: 15px;text-transform: uppercase;font-weight:bold;<? } ?>"> <? if($gonbilgi['id']==$ub['id']) { ?><?=getTranslation('superadmin57')?><? } else { ?><?=$gonbilgi['username']; ?><? } ?> -> <font><?=date("d.m H:i",$row['zaman']); ?></font> : </span>
<span style="<? if($gonbilgi['id']==$ub['id']) { ?>color:#000;font-weight:bold;<? } else { ?> color:#000;font-weight:bold;<? } ?>"> <?=$row['mesaj']; ?></span>
</div>


<? } ?>

</div>
</td>
</tr>
</tbody>
<tr>
<td colspan="9">
<input type="text" class="inputText" style="width: 98%" id="mess" placeholder="<?=getTranslation('mesajpaneli13')?>">
</td>
</tr>

</table>
</div>
</div>
</div>
</div>
</div>
</main>

<script>
$('#mess').keypress(function(event){ var keycode = (event.keyCode ? event.keyCode : event.which); if(keycode == '13'){ 
var mesajim = $("#mess").val();
$("#mess").val('');
var rand = Math.random();
$.get('mesaj.php?get=mesajgir&mesaj='+mesajim+'&rand='+rand+'&giden=<?=$_SESSION['gonderilicekkisi_mesaj'];?>',function(data) { if(data=="5") { alert('Bir hata oluştu. Mesajınız gönderilemedi.'); } else {
$("#tablo").html('<div id="delay_layer" class="overlay_layer"><div class="innerWrap"><div class="contentBlock"><div class="headline"><?=getTranslation('mesajpaneli114')?> <span class="highlighted"><?=getTranslation('mesajpaneli115')?></span></div><div class="bodyText"><?=getTranslation('mesajpaneli116')?></div><div class="progressbar"><div class="progressbarInner"></div></div></div></div></div>');
setTimeout(function(){location.href="mesaj.php", 3000});
}
});
}});
var objDiv = document.getElementById("alanes");
objDiv.scrollTop = objDiv.scrollHeight;
</script>

<?php include 'footer.php'; ?>

</body>
</html>