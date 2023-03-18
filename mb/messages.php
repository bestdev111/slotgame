<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:login.php"); exit(); }

$getle = gd("get");

if(isset($_GET['id'])) {
$id = gd("id");
$bayilerim = "".benimbayilerim($ub['id'])."";
$bayi_array = explode(",",$bayilerim);
if($ub['hesap_sahibi_id']==$id){  } else
if(!in_array($id,$bayi_array) || !is_numeric($id)) { die("<div class='bos'>Buna yetkili degilsiniz.</div>"); }
$_SESSION['gonderilicekkisi_mesaj'] = $id;
$_SESSION['gonderenkisi_mesaj'] = $ub['id'];
header("Location:messages");
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

<div id="page1" class="page top">
<div class="scroll_container" onscroll="scrollActions(this, true)">
<div class="scroll_wrapper" style="padding-top: 44px; padding-bottom: 44px;">
<div class="appcontent">
<div>
<div class="barmiddle">

<div id="alanes" style="border-style: double;margin: 1em;padding: 5px 10px 5px;background-color: #FFF;height: 300px;overflow: auto;">
<?
$id = gd("id");

$sor = sed_sql_query("select * from chat where ((alan_id='".$_SESSION['gonderenkisi_mesaj']."' and gonderen_id='".$_SESSION['gonderilicekkisi_mesaj']."') or (alan_id='".$_SESSION['gonderilicekkisi_mesaj']."' and gonderen_id='".$_SESSION['gonderenkisi_mesaj']."')) and silindi='0'");

while($row=sed_sql_fetcharray($sor)) {

$gonbilgi = bilgi("select username,id from kullanici where id='$row[gonderen_id]'");

if($gonbilgi['id']!=$ub['id']) {

sed_sql_query("update chat set okundu='1' where id='$row[id]'");

}

?>

<div class="chatmesaj" style="<? if($gonbilgi['id']==$ub['id']) { ?>width: 100%;padding-top: 10px;padding-bottom: 10px;<? } else { ?>width: 100%;padding-top: 10px;padding-bottom: 10px;<? } ?>">
<span style="<? if($gonbilgi['id']==$ub['id']) { ?>color:#BC2121;font-size: 15px;text-transform: uppercase;font-weight:bold;<? } else { ?> color:#555;font-size: 15px;text-transform: uppercase;font-weight:bold;<? } ?>"> <? if($gonbilgi['id']==$ub['id']) { ?><?=getTranslation('superadmin57')?><? } else { ?><?=$gonbilgi['username']; ?><? } ?> -> <font><?=date("d.m H:i",$row['zaman']); ?></font></span>
<br>
<span style="<? if($gonbilgi['id']==$ub['id']) { ?>color:#000;font-weight:bold;<? } else { ?> color:#000;font-weight:bold;<? } ?>"><?=$row['mesaj']; ?></span>
</div>

<? } ?>

</div>

<input type="text" class="input pinput" style="width: 98%;margin: 1em;margin-top: -5px;" id="mess" placeholder="<?=getTranslation('mesajpaneli13')?>">

</div>
</div>
<div class="contentbottom hidden"> </div>
<div class="spacer">&nbsp;</div>
</div>
</div></div>
</div>

<script>
$('#mess').keypress(function(event){ var keycode = (event.keyCode ? event.keyCode : event.which); if(keycode == '13'){ 
var mesajim = $("#mess").val();
$("#mess").val('');
var rand = Math.random();
$.get('messages.php?get=mesajgir&mesaj='+mesajim+'&rand='+rand+'&giden=<?=$_SESSION['gonderilicekkisi_mesaj'];?>',function(data) { if(data=="5") { alert('<?=getTranslation('yeniyerler_kasa378')?>'); } else {
$("#tablo").html('<div class="lds-ring"><font style="position: absolute;margin-top: 35px;margin-left: -22px;font-size: 8px;font-weight: bold;">Yükleniyor</font><div></div><div></div><div></div></div>');
setTimeout(function(){location.href="messages.php", 3000});
}
});
}});
var objDiv = document.getElementById("alanes");
objDiv.scrollTop = objDiv.scrollHeight;
function hesabim(){
$.get('',function(data) {
$("#kupons").html(data);
});
}
hesabim();
</script>

<?php include 'footer.php'; ?>

</body>
</html>