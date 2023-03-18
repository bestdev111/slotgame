<?php
session_start();
include '../db.php';
sed_sql_query("delete from kupon where session_id='$session_id'");
session_unset();
header("Location:/mb");
?>