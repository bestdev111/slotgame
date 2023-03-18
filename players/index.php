<?php
session_start();
include '../db.php';
if(isset($_GET['logout'])) { 
sed_sql_query("delete from kupon where session_id='$session_id'");
session_unset(); }
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:../login.php"); exit(); }

?>
<?php include './header.php'; ?>
<?php include 'menu.php'; ?>

<div id="main" class="lwkSelector" style="width: 758px;">
<div id="live">
<div class="space_20"></div>
<div class="main_space" id="main_wide">
</div>
</div>
</div>

</div>
</div>
</div>

<?php include 'footer.php'; ?>

</body>
</html>