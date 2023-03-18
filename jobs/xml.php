<?php
error_reporting(0);
//date_default_timezone_set('Asia/Kuwait');
set_time_limit(0);
include 'singledb.php'; 
/*$linkmysql = mysql_connect($dbhost,$dbuser,$dbpass);
mysql_select_db($dbname);

sed_sql_query("SET NAMES 'UTF8'");
sed_sql_query("SET character_set_connection = 'UTF8'");
sed_sql_query("SET character_set_client = 'UTF8'");
sed_sql_query("SET character_set_results = 'UTF8'");*/
function trn($str) {
	$o = array('"',']}',']',"'","&",'    ','(',')');
	$s = array('','','','','','','','');
	$ss = str_replace($o,$s,$str);
	return trim($ss);
}
function bilgi($str) { $bilgi = sed_sql_fetcharray(sed_sql_query($str)); return $bilgi; }
function bol($bir,$iki,$sayi,$kaynak) {
$bol = explode($bir,$kaynak);
$bol = explode($iki,$bol[$sayi]);
$bol = $bol[0];
return $bol;	
}

function secdata($string) {
if(@get_magic_quotes_gpc()) {
$string = stripslashes($string); }
elseif(!@get_magic_quotes_gpc()) {
$string = addslashes($string); }
$string = @mysql_real_escape_string($string);
return trim($string);
}
function pd($str) { return secdata(htmlspecialchars(strip_tags($_POST[''.$str.'']))); }
function gd($str) { return secdata(htmlspecialchars(strip_tags($_GET[''.$str.'']))); }


function temizle($str) {
	$o = array('&','[',']');
	$s = array('','','');
	return str_replace($o,$s,$str);	
}

?>