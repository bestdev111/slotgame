<?php
date_default_timezone_set('Europe/Istanbul');
set_time_limit(0);
include 'singledb.php';

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
$proxyip_a="193.169.1.179:3128";

/*function secdata($string) {
if(get_magic_quotes_gpc()) {
$string = stripslashes($string); }
elseif(!get_magic_quotes_gpc()) {
$string = addslashes($string); }
$string = @mysql_real_escape_string($string);
return trim($string);
}*/

if (get_magic_quotes_gpc()) 
{ 
    function secdata(&$value) 
    { 
        $value = stripslashes($value); 
    } 
    $gpc = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST); 
    array_walk_recursive($gpc, 'secdata'); 
}

function pd($str) { return secdata(htmlspecialchars(strip_tags($_POST[''.$str.'']))); }
function gd($str) { return secdata(htmlspecialchars(strip_tags($_GET[''.$str.'']))); }


function temizle($str) {
	$o = array('&','[',']');
	$s = array('','','');
	return str_replace($o,$s,$str);	
}

?>