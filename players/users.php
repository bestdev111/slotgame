<?php
session_start();
include '../db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:/login.php"); die(); exit(); }
if($ub['alt_durum']<1 && $ub['wkyetki']<1 && $ub['alt_alt_durum']<1 && $ub['sahip']=="0") { header("Location:index.php"); }
if($ub['adminpanel']=="1") { header("Location:admin"); }
rebuild($ub['id']);

if($_GET['tumuyeler']=="0") {

$altuyeleri = sed_sql_query("select * from kullanici where hesap_sahibi_id='$ub[id]'");
while($row=sed_sql_fetcharray($altuyeleri)) {
$rand = time();
sed_sql_query("update kullanici set durum='0' where id='$row[id]'");
$kontrol = sed_sql_query("select * from kullanici where hesap_sahibi_id='$row[id]' and wkyetki='3'");
while($ass=sed_sql_fetcharray($kontrol)) {
bayidurumdegis($ass['id'],'0');
}
}

} else if($_GET['tumuyeler']=="1") {

$altuyeleri = sed_sql_query("select * from kullanici where hesap_sahibi_id='$ub[id]'");
while($row=sed_sql_fetcharray($altuyeleri)) {
$rand = time();
sed_sql_query("update kullanici set durum='1' where id='$row[id]'");
$kontrol = sed_sql_query("select * from kullanici where hesap_sahibi_id='$row[id]' and wkyetki='3'");
while($ass=sed_sql_fetcharray($kontrol)) {
bayidurumdegis($ass['id'],'1');
}
}

}

?>
<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>

<div id="main" class="lwkSelector" style="width: 758px;">
<div id="live">
<div class="space_20"></div>
<div class="main_space" id="main_wide">
<script>
$("#users2").addClass("activemnuitems");
</script>
<div class="z-right-container" id="maskcontainer">


<div id="users"></div>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
<input type="hidden" id="order" value="username">
<input type="hidden" id="ascdesc" value="asc">
<input type="hidden" id="defotime" value="<?=$ub['id']; ?>">

<script>
function tumuyeleripasifle(val) {
$.get('users.php?tumuyeler='+val+'',function(data) {
bayiler('<?=$ub['id']; ?>');
});
}
function bayiler(id) {
var rand = Math.random();
var order = $("#order").val();
var ascdesc = $("#ascdesc").val();
$.get('../ajax_players.php?a=bayiler&id='+id+'&rand='+rand+'&order='+order+'&ascdesc='+ascdesc+'',function(data) { 
$("#users").html(data);
});	
}
$(document).ready(function(e) {
bayiler('<?=$ub['id']; ?>');
});
</script>
<?php include 'footer.php'; ?>

</body>
</html>