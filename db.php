<?php
//error_reporting(0);
error_reporting(E_ALL ^ E_NOTICE);  

if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
  $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
}

//ini_set('memory_limit', '1024M');
//ini_set('memory_limit', '-1');
ini_set('memory_limit', '1000000000M');
date_default_timezone_set('Europe/Istanbul');
$tarih = date("Y-m-d H:i:s");

$cfg = array();
$sys = array();
$sys['request_uri'] = $_SERVER['REQUEST_URI'];  
$cfg['mysqlhost'] = 'localhost';	// Database host URL
$cfg['mysqluser'] = 'slotgame_toto';			// Database user
$cfg['mysqlpassword'] = 'VE07}UzY4}Qi';			// Database password
$cfg['mysqldb'] = 'slotgame_toto';		// Database name

$connection_id = sed_sql_connect($cfg['mysqlhost'], $cfg['mysqluser'], $cfg['mysqlpassword'], $cfg['mysqldb']);
unset($cfg['mysqlhost'], $cfg['mysqluser'], $cfg['mysqlpassword']);
sed_sql_set_charset($connection_id, 'utf8');

if (function_exists('mysqli_set_charset') === false) {

   function mysqli_set_charset($conn_id, $charset){
      return sed_sql_query($conn_id, 'SET NAMES "'.$charset.'"');
   }
}

/*******************************/

function sed_sql_affectedrows($conn_id = null) {  
  global $connection_id;   
  return is_null($conn_id) ? mysqli_affected_rows($connection_id) : mysqli_affected_rows($conn_id);
}

/*******************************/

function sed_sql_close($conn_id = null) { 
  global $connection_id; 
  return is_null($conn_id) ? mysqli_close($connection_id) : mysqli_close($conn_id); 
}

/*******************************/

function sed_sql_connect($host, $user, $pass, $db) {
	$conn_id = @mysqli_connect($host, $user, $pass) or sed_diefatal('Could not connect to database !<br />Please check your settings in the file datas/config.php<br />'.'MySQL error : '.sed_sql_error());
	$select = @mysqli_select_db($conn_id, $db) or sed_diefatal('Could not select the database !<br />Please check your settings in the file datas/config.php<br />'.'MySQL error : '.sed_sql_error());
	return($conn_id);
}

/*******************************/

function sed_sql_errno($conn_id = null) { 
  global $connection_id; 
  return is_null($conn_id) ? mysqli_errno($connection_id) : mysqli_errno($conn_id); 
}

/*******************************/

function sed_sql_error($conn_id = null) { 
  global $connection_id; 
  return is_null($conn_id) ? mysqli_error($connection_id) : mysqli_error($conn_id); 
}

/*******************************/

function sed_sql_fetcharray($res) {   
  return (@mysqli_fetch_array($res)); 
}

/*******************************/

function sed_sql_fetchassoc($res) {     
  return (@mysqli_fetch_assoc($res)); 
}

/*******************************/

function sed_sql_fetchrow($res) {     
  return (@mysqli_fetch_row($res)); 
}

/*******************************/

function sed_sql_fetchfield($res, $field_offset = 0)
	{ return (@mysqli_fetch_field($res)); }
		
/*******************************/

function sed_sql_numfields($res)
	{ return (@mysqli_num_fields($res)); }	

/*******************************/

function sed_sql_freeresult($res) { 
  return (@mysqli_free_result($res)); 
}

/*******************************/

function sed_sql_insertid($conn_id = null) { 
  global $connection_id; 
  return is_null($conn_id) ? mysqli_insert_id($connection_id) : mysqli_insert_id($conn_id);   
}

/*******************************/

function sed_sql_listtables($res, $conn_id = null) { 
 global $connection_id, $cfg;
 $conn_id = is_null($conn_id) ? $connection_id : $conn_id; 
 $res = sed_sql_query($conn_id, "SHOW TABLES FROM ".$res." "); 
 return($res);
}  

/*******************************/

function sed_sql_numrows($res) {  
  return (@mysqli_num_rows($res)); 
}

/*******************************/

function sed_sql_prep($res, $conn_id = null) {
  global $connection_id; 
  return is_null($conn_id) ? mysqli_real_escape_string($connection_id, $res) : mysqli_real_escape_string($conn_id, $res);  
}

/*******************************/

function sed_sql_query($query, $halterr = false, $conn_id = null)
	{
	global $connection_id, $ayar;

	$conn_id = is_null($conn_id) ? $connection_id : $conn_id; 

	if ($halterr)
    { $result = @mysqli_query($conn_id, $query) OR sed_diefatal('SQL error : '.sed_sql_error()); }
  else
    { $result = @mysqli_query($conn_id, $query); }
   return($result);
	}

/*******************************/

function sed_diefatal($text='Reason is unknown.', $title='Fatal error')
	{

	$disp .= "<div style=\"font:14px Segoe UI, Verdana, Arial; border:1px dashed #CCCCCC; padding:8px; margin:16px;\">";
	$disp .= "<strong><a href=\"".base_url()."\">Bir Hata Oluştu</a></strong><br />";
	$disp .= @date('Y-m-d H:i').' / '.$title.' : '.$text;
	$disp .= "</div>";
	die($disp);
	}
	
/*******************************/	
	
if (!function_exists('base_url')) {
    function base_url($atRoot=FALSE, $atCore=FALSE, $parse=FALSE){
        if (isset($_SERVER['HTTP_HOST'])) {
            $http = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
            $hostname = $_SERVER['HTTP_HOST'];
            $dir =  str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);

            $core = preg_split('@/@', str_replace($_SERVER['DOCUMENT_ROOT'], '', realpath(dirname(__FILE__))), NULL, PREG_SPLIT_NO_EMPTY);
            $core = $core[0];

            $tmplt = $atRoot ? ($atCore ? "%s://%s/%s/" : "%s://%s/") : ($atCore ? "%s://%s/%s/" : "%s://%s%s");
            $end = $atRoot ? ($atCore ? $core : $hostname) : ($atCore ? $core : $dir);
            $base_url = sprintf( $tmplt, $http, $hostname, $end );
        }
        else $base_url = 'https://slotgame.store';

        if ($parse) {
            $base_url = parse_url($base_url);
            if (isset($base_url['path'])) if ($base_url['path'] == '/') $base_url['path'] = '';
        }

        return $base_url;
    }
}	
	
/*******************************/

function sed_sql_result($res, $row, $col = 0) {  
  @mysqli_data_seek($res, $row);
  $result = sed_sql_fetcharray($res); 
  return($result[$col]);
}

/*******************************/

function sed_sql_set_charset($conn_id, $charset)
	{ return (mysqli_set_charset($conn_id, $charset)); }

/*******************************/

function sed_sql_rowcount($table)
	{
	$sqltmp = sed_sql_query("SELECT COUNT(*) FROM $table");
	return(sed_sql_result($sqltmp, 0, "COUNT(*)"));
	}




/*$linkdatas = mysql_connect("localhost","betwingo_1","-A1^($4KS-we") or die('<meta http-equiv="refresh" content="0;URL=/maintenance.php">');
mysql_select_db("betwingo_1");*/


/*  $conn = mysqli_connect("localhost","root","","bet");
   
   if (mysqli_connect_errno($conn)){
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
   } 
   mysqli_select_db("bet");
   mysqli_close($conn);*/

/*sed_sql_query("SET NAMES 'UTF8'");
sed_sql_query("SET character_set_connection = 'UTF8'");
sed_sql_query("SET character_set_client = 'UTF8'"); 
sed_sql_query("SET character_set_results = 'UTF8'");
*/

$page = $_SERVER['REQUEST_URI'];
if(strstr($page,"mobil")) { $dizin = "../sistem/oranserver"; } else { $dizin = "sistem/oranserver"; }


$api_settings = bilgi("select ayar_id,apiurl,futbol_live_xml_url from sistemayar where ayar_id='1' limit 1");
$api_url = $api_settings['apiurl'];
$api_gelecek_url = $api_settings['futbol_live_xml_url'];


function veri($url) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	$donen = curl_exec($ch);
	return $donen;	
}

function CasinoTurkcelestirme($msg){
$r = array('Perfect pair','Banker pair','Player pair','Either pair','Small','Big');
$rp = array('Kusursuz Per','Kurpiyer Per','Oyuncu Per','İkisinden biri Per','Küçük','Büyük');
return str_replace($r,$rp,$msg);
}

function secdata($string) {

/*if(@get_magic_quotes_gpc()) {
$string = stripslashes($string); }
elseif(!@get_magic_quotes_gpc()) {
$string = addslashes($string); }
$string = @mysqli_real_escape_string($string);*/
if (!function_exists('get_magic_quotes_gpc'))
{
	function get_magic_quotes_gpc(&$value) 
	{ 
		$value = stripslashes($value); 
	} 
	$gpc = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST); 
	array_walk_recursive($gpc, 'get_magic_quotes_gpc');  
}


return trim($string);
}
$update_css = "123123123";

function bilgi($str) { 
if(strstr($str,'limit')) {
$bilgi = sed_sql_fetchassoc(sed_sql_query($str)); 
} else {
$bilgi = sed_sql_fetchassoc(sed_sql_query("".$str." limit 1")); 
}
return $bilgi; 
}

function pd($str) { return secdata(htmlspecialchars(strip_tags($_POST[''.$str.'']))); }
function gd($str) { return secdata(htmlspecialchars(strip_tags($_GET[''.$str.'']))); }

function trn($str) {
	$o = array('"',']}',']',"'","&",'    ','(',')');
	$s = array('','','','','','','','');
	$ss = str_replace($o,$s,$str);
	return trim($ss);
}
function bol($bir,$iki,$sayi,$kaynak) {
$bol = explode($bir,$kaynak);
$bol = explode($iki,$bol[$sayi]);
$bol = $bol[0];
return $bol;	
}
function nfs($str) { return @number_format($str,2,",","."); }
function nfo($str) { return @number_format($str,2,".",""); }
function mikronf($str) { return @number_format($str,5,",","."); }
function nf($str) { return @number_format($str,2,".","."); }
function turkce_tarih($pul) {
$gunler = array('Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 
'Cuma', 'Cumartesi');
$aylar = array('', 'Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 
'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık');
return date("d ", $pul).$aylar[date("n", $pul)]." ".$gunler[date("w", $pul)];
}
function turkce_tarih_profil($pul) {
$gunler = array('Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi');
$aylar = array('', 'Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık');
return date("d ", $pul).$aylar[date("n", $pul)]." ".date("Y ", $pul)." ".$gunler[date("w", $pul)];
}
function turkce_tarih_kisa($pul) {
$gunler = array('Pzrgggggg', 'Pzt', 'Sal', 'Çar', 'Per', 'Cum', 'Cmt');
return $gunler[date("w", $pul)];
}


if(isset($_SESSION['betuser'])) {
$session_id = session_id();
$ub = bilgi("select * from kullanici where id='$_SESSION[betuser]' limit 1");
$dil_bilgisi22 = bilgi("select * from language_content where name='$ub[username]' limit 1");
if($ub['atdisari']=="1") { sed_sql_query("update kullanici set atdisari='0' where id='$ub[id]'"); session_unset(); }
if(strstr($ub['username'],"silindi")) { session_unset(); }
if($ub['id']=="" || $ub['password']!=$_SESSION['betpass'] || $ub['bulten']!=$_SESSION['girisbulten'] || $ub['durum']=="0") { session_unset(); header("Location:login.php"); }
$oanadres = $_SERVER['HTTP_REFERER'];
$oanip = $_SERVER['REMOTE_ADDR'];
$oantarayici = $_SERVER['HTTP_USER_AGENT'];
sed_sql_query("update kullanici set sonislem='".time()."',emailadres='$oanadres',oanip='$oanip',oantarayici='$oantarayici' where id='$ub[id]'");


if($ub['alt_durum']=="1" && $ub['alt_alt_durum']=="0"){


$kontrol = sed_sql_query("select * from sistemayar where ayar_id='$ub[id]' order by id desc");
if(sed_sql_numrows($kontrol)>0) {
$ayar = bilgi("select * from sistemayar where ayar_id='$ub[id]'");
} else {
$ayar = bilgi("select * from sistemayar where ayar_id='1'");
}


} else if($ub['wkyetki']=="1"){


$kontrol = sed_sql_query("select * from sistemayar where ayar_id='$ub[hesap_sahibi_id]' order by id desc");
if(sed_sql_numrows($kontrol)>0) {
$ayar = bilgi("select * from sistemayar where ayar_id='$ub[hesap_sahibi_id]'");
} else {
$ayar = bilgi("select * from sistemayar where ayar_id='1'");
}


} else if($ub['wkyetki']=="2"){


$kontrol = sed_sql_query("select * from sistemayar where ayar_id='$ub[hesap_sahibi_id]' order by id desc");
if(sed_sql_numrows($kontrol)>0) {
$ayar = bilgi("select * from sistemayar where ayar_id='$ub[hesap_sahibi_id]'");
} else {
$ayar = bilgi("select * from sistemayar where ayar_id='1'");
}


} else if($ub['wkyetki']=="3"){

$kontrol = sed_sql_query("select * from sistemayar where ayar_id='$ub[hesap_root_id]' order by id desc");
if(sed_sql_numrows($kontrol)>0) {
$ayar = bilgi("select * from sistemayar where ayar_id='$ub[hesap_root_id]'");
} else {
$ayar = bilgi("select * from sistemayar where ayar_id='1'");
}

} else {
$ayar = bilgi("select * from sistemayar where ayar_id='$ub[id]'");
}

} else {
$ayar = bilgi("select * from sistemayar where ayar_id='1'");
}


$logombul = $_SERVER['HTTP_HOST'];
$logobol = explode(".",$logombul);
if(@count($logobol)>2) { $logosu = $logobol[1]; } else { $logosu = $logobol[0]; }
$site_adi = ucfirst($logosu);
$site_adres = $_SERVER['HTTP_HOST'];
$ayar['site_adi'] = $site_adi;

function takimadikisalt($str) {
return ucwords(substr($str,0,20));	
}

function takimadikisaltkupon($str) {
return ucwords(substr($str,0,11));
}

function ulkeadikisalt($str) {
return ucwords(substr($str,0,8));	
}



function futboltumlig_gizlioran($oranvalid,$uid) {
global $ub;
if(file_exists("sistem/oranserver/".$uid."-futboltumligler.xml")) {
$kullan = "sistem/oranserver/".$uid."-futboltumligler.xml";
} 
if($kullan) {
$bukaynak = file_get_contents($kullan);
$xml = new SimpleXMLElement($bukaynak);
$gizli_arr = explode(",",$xml->gizli_oranvalid);
if(in_array($oranvalid,$gizli_arr)) { $varoname = 1; $donecek = ""; }
if(!$varoname) { $donecek = "checked"; } 
} else {
$donecek = "checked";
}
return $donecek;	
}


function futboltumlig_oran_duzenleme($oranvalid,$uid) {
global $ub;
if(file_exists("sistem/oranserver/".$uid."-futboltumligler.xml")) {
$kullan = "sistem/oranserver/".$uid."-futboltumligler.xml";
}
if($kullan) {
$bukaynak = file_get_contents($kullan);
$xml = new SimpleXMLElement($bukaynak);
$toplam_degisim = count($xml->degisimler->orandegis);
for($i=0; $i<$toplam_degisim; $i++) {
$satirvalid = $xml->degisimler->orandegis[$i]->oran_id;
$deger = $xml->degisimler->orandegis[$i]->oran_degisim;
if($satirvalid==$oranvalid) { $varoname = 1; $donecek = $deger; }
}
if(!$varoname) { $donecek = "0.00"; }
} else {
$donecek = "0.00";
}
return $donecek;	
}



function basketboltumlig_gizlioran($oranvalid,$uid) {
global $ub;
if(file_exists("sistem/oranserver/".$uid."-basketboltumligler.xml")) {
$kullan = "sistem/oranserver/".$uid."-basketboltumligler.xml";
} 
if($kullan) {
$bukaynak = file_get_contents($kullan);
$xml = new SimpleXMLElement($bukaynak);
$gizli_arr = explode(",",$xml->gizli_oranvalid);
if(in_array($oranvalid,$gizli_arr)) { $varoname = 1; $donecek = ""; }
if(!$varoname) { $donecek = "checked"; } 
} else {
$donecek = "checked";
}
return $donecek;	
}


function basketboltumlig_oran_duzenleme($oranvalid,$uid) {
global $ub;
if(file_exists("sistem/oranserver/".$uid."-basketboltumligler.xml")) {
$kullan = "sistem/oranserver/".$uid."-basketboltumligler.xml";
}
if($kullan) {
$bukaynak = file_get_contents($kullan);
$xml = new SimpleXMLElement($bukaynak);
$toplam_degisim = count($xml->degisimler->orandegis);
for($i=0; $i<$toplam_degisim; $i++) {
$satirvalid = $xml->degisimler->orandegis[$i]->oran_id;
$deger = $xml->degisimler->orandegis[$i]->oran_degisim;
if($satirvalid==$oranvalid) { $varoname = 1; $donecek = $deger; }
}
if(!$varoname) { $donecek = "0.00"; }
} else {
$donecek = "0.00";
}
return $donecek;	
}



function voleyboltumlig_gizlioran($oranvalid,$uid) {
global $ub;
if(file_exists("sistem/oranserver/".$uid."-voleyboltumligler.xml")) {
$kullan = "sistem/oranserver/".$uid."-voleyboltumligler.xml";
} 
if($kullan) {
$bukaynak = file_get_contents($kullan);
$xml = new SimpleXMLElement($bukaynak);
$gizli_arr = explode(",",$xml->gizli_oranvalid);
if(in_array($oranvalid,$gizli_arr)) { $varoname = 1; $donecek = ""; }
if(!$varoname) { $donecek = "checked"; } 
} else {
$donecek = "checked";
}
return $donecek;	
}



function voleyboltumlig_oran_duzenleme($oranvalid,$uid) {
global $ub;
if(file_exists("sistem/oranserver/".$uid."-voleyboltumligler.xml")) {
$kullan = "sistem/oranserver/".$uid."-voleyboltumligler.xml";
}
if($kullan) {
$bukaynak = file_get_contents($kullan);
$xml = new SimpleXMLElement($bukaynak);
$toplam_degisim = count($xml->degisimler->orandegis);
for($i=0; $i<$toplam_degisim; $i++) {
$satirvalid = $xml->degisimler->orandegis[$i]->oran_id;
$deger = $xml->degisimler->orandegis[$i]->oran_degisim;
if($satirvalid==$oranvalid) { $varoname = 1; $donecek = $deger; }
}
if(!$varoname) { $donecek = "0.00"; }
} else {
$donecek = "0.00";
}
return $donecek;	
}


function futbollig_gizlioran($oranvalid,$uid,$gelenlig) {
global $ub;
if(file_exists("sistem/oranserver/".$uid."-".$gelenlig."-futbollig.xml")) {
$kullan = "sistem/oranserver/".$uid."-".$gelenlig."-futbollig.xml";
} 
if($kullan) {
$bukaynak = file_get_contents($kullan);
$xml = new SimpleXMLElement($bukaynak);
$gizli_arr = explode(",",$xml->gizli_oranvalid);
if(in_array($oranvalid,$gizli_arr)) { $varoname = 1; $donecek = ""; }
if(!$varoname) { $donecek = "checked"; } 
} else {
$donecek = "checked";
}
return $donecek;	
}


function futbolmac_gizlioran($oranvalid,$uid,$gelenlig) {
global $ub;
if(file_exists("sistem/oranserver/".$uid."-".$gelenlig."-macduzenleme.xml")) {
$kullan = "sistem/oranserver/".$uid."-".$gelenlig."-macduzenleme.xml";
} 
if($kullan) {
$bukaynak = file_get_contents($kullan);
$xml = new SimpleXMLElement($bukaynak);
$gizli_arr = explode(",",$xml->gizli_oranvalid);
if(in_array($oranvalid,$gizli_arr)) { $varoname = 1; $donecek = ""; }
if(!$varoname) { $donecek = "checked"; } 
} else {
$donecek = "checked";
}
return $donecek;	
}


function futbolmac_oran_duzenleme($oranvalid,$uid,$gelenlig) {
global $ub;
if(file_exists("sistem/oranserver/".$uid."-".$gelenlig."-macduzenleme.xml")) {
$kullan = "sistem/oranserver/".$uid."-".$gelenlig."-macduzenleme.xml";
}
if($kullan) {
$bukaynak = file_get_contents($kullan);
$xml = new SimpleXMLElement($bukaynak);
$toplam_degisim = count($xml->degisimler->orandegis);
for($i=0; $i<$toplam_degisim; $i++) {
$satirvalid = $xml->degisimler->orandegis[$i]->oran_id;
$deger = $xml->degisimler->orandegis[$i]->oran_degisim;
if($satirvalid==$oranvalid) { $varoname = 1; $donecek = $deger; }
}
if(!$varoname) { $donecek = "0.00"; }
} else {
$donecek = "0.00";
}
return $donecek;	
}




function futbollig_oran_duzenleme($oranvalid,$uid,$gelenlig) {
global $ub;
if(file_exists("sistem/oranserver/".$uid."-".$gelenlig."-futbollig.xml")) {
$kullan = "sistem/oranserver/".$uid."-".$gelenlig."-futbollig.xml";
}
if($kullan) {
$bukaynak = file_get_contents($kullan);
$xml = new SimpleXMLElement($bukaynak);
$toplam_degisim = count($xml->degisimler->orandegis);
for($i=0; $i<$toplam_degisim; $i++) {
$satirvalid = $xml->degisimler->orandegis[$i]->oran_id;
$deger = $xml->degisimler->orandegis[$i]->oran_degisim;
if($satirvalid==$oranvalid) { $varoname = 1; $donecek = $deger; }
}
if(!$varoname) { $donecek = "0.00"; }
} else {
$donecek = "0.00";
}
return $donecek;	
}


function lig_sabitmbs($uid,$gelenlig) {
global $ub;
if(file_exists("sistem/oranserver/".$uid."-".$gelenlig."-futbollig.xml")) {
$kullan = "sistem/oranserver/".$uid."-".$gelenlig."-futbollig.xml"; }
if($kullan) {
$bukaynak = file_get_contents($kullan);
$xml = new SimpleXMLElement($bukaynak);
$sabitmbs = $xml->sabitmbs;
if($sabitmbs=="") { $donecek = "0"; } else { $donecek = $sabitmbs; }
} else {
$donecek = "0";
}
return $donecek;
}


function lig_gizlidurum($uid,$gelenlig) {
global $ub;
if(file_exists("sistem/oranserver/".$uid."-gizliligs.xml")) {
$kullan = "sistem/oranserver/".$uid."-gizliligs.xml"; }
if($kullan) {
$bukaynak = file_get_contents($kullan);
$xml = new SimpleXMLElement($bukaynak);
$gizliler = $xml->gizliligler;
$giz_arr = explode(",",$gizliler);
if(in_array($gelenlig,$giz_arr)) { $donecek = "0"; } else { $donecek = "1"; }
} else {
$donecek = "1";
}
return $donecek;
}


function mac_gizlidurum($uid,$gelenlig) {
global $ub;
if(file_exists("sistem/oranserver/".$uid."-gizlimacs.xml")) {
$kullan = "sistem/oranserver/".$uid."-gizlimacs.xml"; }
if($kullan) {
$bukaynak = file_get_contents($kullan);
$xml = new SimpleXMLElement($bukaynak);
$gizliler = $xml->gizliligler;
$giz_arr = explode(",",$gizliler);
if(in_array($gelenlig,$giz_arr)) { $donecek = "0"; } else { $donecek = "1"; }
} else {
$donecek = "1";
}
return $donecek;
}

function mac_sabitmbs($uid,$gelenlig) {
global $ub;
if(file_exists("sistem/oranserver/".$uid."-".$gelenlig."-macduzenleme.xml")) {
$kullan = "sistem/oranserver/".$uid."-".$gelenlig."-macduzenleme.xml"; }
if($kullan) {
$bukaynak = file_get_contents($kullan);
$xml = new SimpleXMLElement($bukaynak);
$sabitmbs = $xml->sabitmbs;
if($sabitmbs=="") { $donecek = "0"; } else { $donecek = $sabitmbs; }
} else {
$sorgu = mysqli_fetch_object(sed_sql_query("SELECT mbs FROM program WHERE id='$gelenlig'"));
$donecek = $sorgu->mbs;
}
return $donecek;
}



function gizli_lig_list() {
global $ub;
global $dizin;

$mac_bilgi_kendim = sed_sql_query("select * from program_lig_gizli where spor_tipi='futbol' and bayi_id='".$ub['id']."'");
$mac_bilgi_altim = sed_sql_query("select * from program_lig_gizli where spor_tipi='futbol' and bayi_id='".$ub['hesap_sahibi_id']."'");
$mac_bilgi_altiminalti = sed_sql_query("select * from program_lig_gizli where spor_tipi='futbol' and bayi_id='".$ub['hesap_root_id']."'");
$mac_bilgi_altiminalti_2 = sed_sql_query("select * from program_lig_gizli where spor_tipi='futbol' and bayi_id='".$ub['hesap_root_root_id']."'");
$mac_bilgi_kendim_toplam = sed_sql_numrows($mac_bilgi_kendim);
$mac_bilgi_altim_toplam = sed_sql_numrows($mac_bilgi_altim);
$mac_bilgi_altiminalti_toplam = sed_sql_numrows($mac_bilgi_altiminalti);
$mac_bilgi_altiminalti_toplam_2 = sed_sql_numrows($mac_bilgi_altiminalti_2);


if($mac_bilgi_kendim_toplam>0) {

while($row=sed_sql_fetcharray($mac_bilgi_kendim)) {
if(!empty($row['lig_adi'])) {
$ekle .= "'$row[lig_ulke] - $row[lig_adi]',";
}
}
$donecek = substr($ekle,0,-1);

} else if($mac_bilgi_altim_toplam>0) {

while($row=sed_sql_fetcharray($mac_bilgi_altim)) {
if(!empty($row['lig_adi'])) {
$ekle .= "'$row[lig_ulke] - $row[lig_adi]',";
}
}
$donecek = substr($ekle,0,-1);

} else if($mac_bilgi_altiminalti_toplam>0) {

while($row=sed_sql_fetcharray($mac_bilgi_altiminalti)) {
if(!empty($row['lig_adi'])) {
$ekle .= "'$row[lig_ulke] - $row[lig_adi]',";
}
}
$donecek = substr($ekle,0,-1);

} else if($mac_bilgi_altiminalti_toplam_2>0) {

while($row=sed_sql_fetcharray($mac_bilgi_altiminalti_2)) {
if(!empty($row['lig_adi'])) {
$ekle .= "'$row[lig_ulke] - $row[lig_adi]',";
}
}
$donecek = substr($ekle,0,-1);

}  else {
$donecek = "";
}
return $donecek;
}

function gizli_lig_listb() {
global $ub;
global $dizin;

$mac_bilgi_kendim = sed_sql_query("select * from program_lig_gizli where spor_tipi='basketbol' and bayi_id='".$ub['id']."'");
$mac_bilgi_altim = sed_sql_query("select * from program_lig_gizli where spor_tipi='basketbol' and bayi_id='".$ub['hesap_sahibi_id']."'");
$mac_bilgi_altiminalti = sed_sql_query("select * from program_lig_gizli where spor_tipi='basketbol' and bayi_id='".$ub['hesap_root_id']."'");
$mac_bilgi_altiminalti_2 = sed_sql_query("select * from program_lig_gizli where spor_tipi='basketbol' and bayi_id='".$ub['hesap_root_root_id']."'");
$mac_bilgi_kendim_toplam = sed_sql_numrows($mac_bilgi_kendim);
$mac_bilgi_altim_toplam = sed_sql_numrows($mac_bilgi_altim);
$mac_bilgi_altiminalti_toplam = sed_sql_numrows($mac_bilgi_altiminalti);
$mac_bilgi_altiminalti_toplam_2 = sed_sql_numrows($mac_bilgi_altiminalti_2);


if($mac_bilgi_kendim_toplam>0) {

while($row=sed_sql_fetcharray($mac_bilgi_kendim)) {
if(!empty($row['lig_adi'])) {
$ekle .= "'$row[lig_adi]',";
}
}
$donecek = substr($ekle,0,-1);

} else if($mac_bilgi_altim_toplam>0) {

while($row=sed_sql_fetcharray($mac_bilgi_altim)) {
if(!empty($row['lig_adi'])) {
$ekle .= "'$row[lig_adi]',";
}
}
$donecek = substr($ekle,0,-1);

} else if($mac_bilgi_altiminalti_toplam>0) {

while($row=sed_sql_fetcharray($mac_bilgi_altiminalti)) {
if(!empty($row['lig_adi'])) {
$ekle .= "'$row[lig_adi]',";
}
}
$donecek = substr($ekle,0,-1);

} else if($mac_bilgi_altiminalti_toplam_2>0) {

while($row=sed_sql_fetcharray($mac_bilgi_altiminalti_2)) {
if(!empty($row['lig_adi'])) {
$ekle .= "'$row[lig_adi]',";
}
}
$donecek = substr($ekle,0,-1);

}  else {
$donecek = "";
}
return $donecek;
}

function gizli_lig_listt() {
global $ub;
global $dizin;

$mac_bilgi_kendim = sed_sql_query("select * from program_lig_gizli where spor_tipi='tenis' and bayi_id='".$ub['id']."'");
$mac_bilgi_altim = sed_sql_query("select * from program_lig_gizli where spor_tipi='tenis' and bayi_id='".$ub['hesap_sahibi_id']."'");
$mac_bilgi_altiminalti = sed_sql_query("select * from program_lig_gizli where spor_tipi='tenis' and bayi_id='".$ub['hesap_root_id']."'");
$mac_bilgi_kendim_toplam = sed_sql_numrows($mac_bilgi_kendim);
$mac_bilgi_altim_toplam = sed_sql_numrows($mac_bilgi_altim);
$mac_bilgi_altiminalti_toplam = sed_sql_numrows($mac_bilgi_altiminalti);


if($mac_bilgi_kendim_toplam>0) {

while($row=sed_sql_fetcharray($mac_bilgi_kendim)) {
if(!empty($row['lig_adi'])) {
$ekle .= "'$row[lig_adi]',";
}
}
$donecek = substr($ekle,0,-1);

} else if($mac_bilgi_altim_toplam>0) {

while($row=sed_sql_fetcharray($mac_bilgi_altim)) {
if(!empty($row['lig_adi'])) {
$ekle .= "'$row[lig_adi]',";
}
}
$donecek = substr($ekle,0,-1);

} else if($mac_bilgi_altiminalti_toplam>0) {

while($row=sed_sql_fetcharray($mac_bilgi_altiminalti)) {
if(!empty($row['lig_adi'])) {
$ekle .= "'$row[lig_adi]',";
}
}
$donecek = substr($ekle,0,-1);

}  else {
$donecek = "";
}
return $donecek;
}

function gizli_lig_listv() {
global $ub;
global $dizin;

$mac_bilgi_kendim = sed_sql_query("select * from program_lig_gizli where spor_tipi='voleybol' and bayi_id='".$ub['id']."'");
$mac_bilgi_altim = sed_sql_query("select * from program_lig_gizli where spor_tipi='voleybol' and bayi_id='".$ub['hesap_sahibi_id']."'");
$mac_bilgi_altiminalti = sed_sql_query("select * from program_lig_gizli where spor_tipi='voleybol' and bayi_id='".$ub['hesap_root_id']."'");
$mac_bilgi_kendim_toplam = sed_sql_numrows($mac_bilgi_kendim);
$mac_bilgi_altim_toplam = sed_sql_numrows($mac_bilgi_altim);
$mac_bilgi_altiminalti_toplam = sed_sql_numrows($mac_bilgi_altiminalti);


if($mac_bilgi_kendim_toplam>0) {

while($row=sed_sql_fetcharray($mac_bilgi_kendim)) {
if(!empty($row['lig_adi'])) {
$ekle .= "'$row[lig_adi]',";
}
}
$donecek = substr($ekle,0,-1);

} else if($mac_bilgi_altim_toplam>0) {

while($row=sed_sql_fetcharray($mac_bilgi_altim)) {
if(!empty($row['lig_adi'])) {
$ekle .= "'$row[lig_adi]',";
}
}
$donecek = substr($ekle,0,-1);

} else if($mac_bilgi_altiminalti_toplam>0) {

while($row=sed_sql_fetcharray($mac_bilgi_altiminalti)) {
if(!empty($row['lig_adi'])) {
$ekle .= "'$row[lig_adi]',";
}
}
$donecek = substr($ekle,0,-1);

}  else {
$donecek = "";
}
return $donecek;
}

function gizli_lig_listbuz() {
global $ub;
global $dizin;

$mac_bilgi_kendim = sed_sql_query("select * from program_lig_gizli where spor_tipi='buzhokeyi' and bayi_id='".$ub['id']."'");
$mac_bilgi_altim = sed_sql_query("select * from program_lig_gizli where spor_tipi='buzhokeyi' and bayi_id='".$ub['hesap_sahibi_id']."'");
$mac_bilgi_altiminalti = sed_sql_query("select * from program_lig_gizli where spor_tipi='buzhokeyi' and bayi_id='".$ub['hesap_root_id']."'");
$mac_bilgi_kendim_toplam = sed_sql_numrows($mac_bilgi_kendim);
$mac_bilgi_altim_toplam = sed_sql_numrows($mac_bilgi_altim);
$mac_bilgi_altiminalti_toplam = sed_sql_numrows($mac_bilgi_altiminalti);


if($mac_bilgi_kendim_toplam>0) {

while($row=sed_sql_fetcharray($mac_bilgi_kendim)) {
if(!empty($row['lig_adi'])) {
$ekle .= "'$row[lig_adi]',";
}
}
$donecek = substr($ekle,0,-1);

} else if($mac_bilgi_altim_toplam>0) {

while($row=sed_sql_fetcharray($mac_bilgi_altim)) {
if(!empty($row['lig_adi'])) {
$ekle .= "'$row[lig_adi]',";
}
}
$donecek = substr($ekle,0,-1);

} else if($mac_bilgi_altiminalti_toplam>0) {

while($row=sed_sql_fetcharray($mac_bilgi_altiminalti)) {
if(!empty($row['lig_adi'])) {
$ekle .= "'$row[lig_adi]',";
}
}
$donecek = substr($ekle,0,-1);

}  else {
$donecek = "";
}
return $donecek;
}

function gizli_lig_listmasatenisi() {
global $ub;
global $dizin;

$mac_bilgi_kendim = sed_sql_query("select * from program_lig_gizli where spor_tipi='masatenisi' and bayi_id='".$ub['id']."'");
$mac_bilgi_altim = sed_sql_query("select * from program_lig_gizli where spor_tipi='masatenisi' and bayi_id='".$ub['hesap_sahibi_id']."'");
$mac_bilgi_altiminalti = sed_sql_query("select * from program_lig_gizli where spor_tipi='masatenisi' and bayi_id='".$ub['hesap_root_id']."'");
$mac_bilgi_kendim_toplam = sed_sql_numrows($mac_bilgi_kendim);
$mac_bilgi_altim_toplam = sed_sql_numrows($mac_bilgi_altim);
$mac_bilgi_altiminalti_toplam = sed_sql_numrows($mac_bilgi_altiminalti);


if($mac_bilgi_kendim_toplam>0) {

while($row=sed_sql_fetcharray($mac_bilgi_kendim)) {
if(!empty($row['lig_adi'])) {
$ekle .= "'$row[lig_adi]',";
}
}
$donecek = substr($ekle,0,-1);

} else if($mac_bilgi_altim_toplam>0) {

while($row=sed_sql_fetcharray($mac_bilgi_altim)) {
if(!empty($row['lig_adi'])) {
$ekle .= "'$row[lig_adi]',";
}
}
$donecek = substr($ekle,0,-1);

} else if($mac_bilgi_altiminalti_toplam>0) {

while($row=sed_sql_fetcharray($mac_bilgi_altiminalti)) {
if(!empty($row['lig_adi'])) {
$ekle .= "'$row[lig_adi]',";
}
}
$donecek = substr($ekle,0,-1);

}  else {
$donecek = "";
}
return $donecek;
}

function gizli_lig_listbeyzbol() {
global $ub;
global $dizin;

$mac_bilgi_kendim = sed_sql_query("select * from program_lig_gizli where spor_tipi='beyzbol' and bayi_id='".$ub['id']."'");
$mac_bilgi_altim = sed_sql_query("select * from program_lig_gizli where spor_tipi='beyzbol' and bayi_id='".$ub['hesap_sahibi_id']."'");
$mac_bilgi_altiminalti = sed_sql_query("select * from program_lig_gizli where spor_tipi='beyzbol' and bayi_id='".$ub['hesap_root_id']."'");
$mac_bilgi_kendim_toplam = sed_sql_numrows($mac_bilgi_kendim);
$mac_bilgi_altim_toplam = sed_sql_numrows($mac_bilgi_altim);
$mac_bilgi_altiminalti_toplam = sed_sql_numrows($mac_bilgi_altiminalti);


if($mac_bilgi_kendim_toplam>0) {

while($row=sed_sql_fetcharray($mac_bilgi_kendim)) {
if(!empty($row['lig_adi'])) {
$ekle .= "'$row[lig_adi]',";
}
}
$donecek = substr($ekle,0,-1);

} else if($mac_bilgi_altim_toplam>0) {

while($row=sed_sql_fetcharray($mac_bilgi_altim)) {
if(!empty($row['lig_adi'])) {
$ekle .= "'$row[lig_adi]',";
}
}
$donecek = substr($ekle,0,-1);

} else if($mac_bilgi_altiminalti_toplam>0) {

while($row=sed_sql_fetcharray($mac_bilgi_altiminalti)) {
if(!empty($row['lig_adi'])) {
$ekle .= "'$row[lig_adi]',";
}
}
$donecek = substr($ekle,0,-1);

}  else {
$donecek = "";
}
return $donecek;
}

function gizli_lig_listrugby() {
global $ub;
global $dizin;

$mac_bilgi_kendim = sed_sql_query("select * from program_lig_gizli where spor_tipi='rugby' and bayi_id='".$ub['id']."'");
$mac_bilgi_altim = sed_sql_query("select * from program_lig_gizli where spor_tipi='rugby' and bayi_id='".$ub['hesap_sahibi_id']."'");
$mac_bilgi_altiminalti = sed_sql_query("select * from program_lig_gizli where spor_tipi='rugby' and bayi_id='".$ub['hesap_root_id']."'");
$mac_bilgi_kendim_toplam = sed_sql_numrows($mac_bilgi_kendim);
$mac_bilgi_altim_toplam = sed_sql_numrows($mac_bilgi_altim);
$mac_bilgi_altiminalti_toplam = sed_sql_numrows($mac_bilgi_altiminalti);


if($mac_bilgi_kendim_toplam>0) {

while($row=sed_sql_fetcharray($mac_bilgi_kendim)) {
if(!empty($row['lig_adi'])) {
$ekle .= "'$row[lig_adi]',";
}
}
$donecek = substr($ekle,0,-1);

} else if($mac_bilgi_altim_toplam>0) {

while($row=sed_sql_fetcharray($mac_bilgi_altim)) {
if(!empty($row['lig_adi'])) {
$ekle .= "'$row[lig_adi]',";
}
}
$donecek = substr($ekle,0,-1);

} else if($mac_bilgi_altiminalti_toplam>0) {

while($row=sed_sql_fetcharray($mac_bilgi_altiminalti)) {
if(!empty($row['lig_adi'])) {
$ekle .= "'$row[lig_adi]',";
}
}
$donecek = substr($ekle,0,-1);

}  else {
$donecek = "";
}
return $donecek;
}

function gizli_lig_listdovus() {
global $ub;
global $dizin;

$mac_bilgi_kendim = sed_sql_query("select * from program_lig_gizli where spor_tipi='dovus' and bayi_id='".$ub['id']."'");
$mac_bilgi_altim = sed_sql_query("select * from program_lig_gizli where spor_tipi='dovus' and bayi_id='".$ub['hesap_sahibi_id']."'");
$mac_bilgi_altiminalti = sed_sql_query("select * from program_lig_gizli where spor_tipi='dovus' and bayi_id='".$ub['hesap_root_id']."'");
$mac_bilgi_kendim_toplam = sed_sql_numrows($mac_bilgi_kendim);
$mac_bilgi_altim_toplam = sed_sql_numrows($mac_bilgi_altim);
$mac_bilgi_altiminalti_toplam = sed_sql_numrows($mac_bilgi_altiminalti);


if($mac_bilgi_kendim_toplam>0) {

while($row=sed_sql_fetcharray($mac_bilgi_kendim)) {
if(!empty($row['lig_adi'])) {
$ekle .= "'$row[lig_adi]',";
}
}
$donecek = substr($ekle,0,-1);

} else if($mac_bilgi_altim_toplam>0) {

while($row=sed_sql_fetcharray($mac_bilgi_altim)) {
if(!empty($row['lig_adi'])) {
$ekle .= "'$row[lig_adi]',";
}
}
$donecek = substr($ekle,0,-1);

} else if($mac_bilgi_altiminalti_toplam>0) {

while($row=sed_sql_fetcharray($mac_bilgi_altiminalti)) {
if(!empty($row['lig_adi'])) {
$ekle .= "'$row[lig_adi]',";
}
}
$donecek = substr($ekle,0,-1);

}  else {
$donecek = "";
}
return $donecek;
}

function gizli_mac_list() {
global $ub;
global $dizin;

$mac_bilgi_kendim = sed_sql_query("select * from maclar_durum where spor_tipi='futbol' and bayi_id='".$ub['id']."'");
$mac_bilgi_altim = sed_sql_query("select * from maclar_durum where spor_tipi='futbol' and bayi_id='".$ub['hesap_sahibi_id']."'");
$mac_bilgi_altiminalti = sed_sql_query("select * from maclar_durum where spor_tipi='futbol' and bayi_id='".$ub['hesap_root_id']."'");
$mac_bilgi_altiminalti_2 = sed_sql_query("select * from maclar_durum where spor_tipi='futbol' and bayi_id='".$ub['hesap_root_root_id']."'");
$mac_bilgi_kendim_toplam = sed_sql_numrows($mac_bilgi_kendim);
$mac_bilgi_altim_toplam = sed_sql_numrows($mac_bilgi_altim);
$mac_bilgi_altiminalti_toplam = sed_sql_numrows($mac_bilgi_altiminalti);
$mac_bilgi_altiminalti_toplam_2 = sed_sql_numrows($mac_bilgi_altiminalti_2);


if($mac_bilgi_kendim_toplam>0) {

while($row=sed_sql_fetcharray($mac_bilgi_kendim)) {
if(!empty($row['mac_id'])) {
$ekle .= "$row[mac_id],";
}
}
$donecek = substr($ekle,0,-1);

} else if($mac_bilgi_altim_toplam>0) {

while($row=sed_sql_fetcharray($mac_bilgi_altim)) {
if(!empty($row['mac_id'])) {
$ekle .= "$row[mac_id],";
}
}
$donecek = substr($ekle,0,-1);

} else if($mac_bilgi_altiminalti_toplam>0) {

while($row=sed_sql_fetcharray($mac_bilgi_altiminalti)) {
if(!empty($row['mac_id'])) {
$ekle .= "$row[mac_id],";
}
}
$donecek = substr($ekle,0,-1);

} else if($mac_bilgi_altiminalti_toplam_2>0) {

while($row=sed_sql_fetcharray($mac_bilgi_altiminalti_2)) {
if(!empty($row['mac_id'])) {
$ekle .= "$row[mac_id],";
}
}
$donecek = substr($ekle,0,-1);

}  else {
$donecek = "";
}
return $donecek;
}

function gizli_mac_listb() {
global $ub;
global $dizin;

$mac_bilgi_kendim = sed_sql_query("select * from maclar_durum where spor_tipi='basketbol' and bayi_id='".$ub['id']."'");
$mac_bilgi_altim = sed_sql_query("select * from maclar_durum where spor_tipi='basketbol' and bayi_id='".$ub['hesap_sahibi_id']."'");
$mac_bilgi_altiminalti = sed_sql_query("select * from maclar_durum where spor_tipi='basketbol' and bayi_id='".$ub['hesap_root_id']."'");
$mac_bilgi_altiminalti_2 = sed_sql_query("select * from maclar_durum where spor_tipi='basketbol' and bayi_id='".$ub['hesap_root_root_id']."'");
$mac_bilgi_kendim_toplam = sed_sql_numrows($mac_bilgi_kendim);
$mac_bilgi_altim_toplam = sed_sql_numrows($mac_bilgi_altim);
$mac_bilgi_altiminalti_toplam = sed_sql_numrows($mac_bilgi_altiminalti);
$mac_bilgi_altiminalti_toplam_2 = sed_sql_numrows($mac_bilgi_altiminalti_2);


if($mac_bilgi_kendim_toplam>0) {

while($row=sed_sql_fetcharray($mac_bilgi_kendim)) {
if(!empty($row['mac_id'])) {
$ekle .= "$row[mac_id],";
}
}
$donecek = substr($ekle,0,-1);

} else if($mac_bilgi_altim_toplam>0) {

while($row=sed_sql_fetcharray($mac_bilgi_altim)) {
if(!empty($row['mac_id'])) {
$ekle .= "$row[mac_id],";
}
}
$donecek = substr($ekle,0,-1);

} else if($mac_bilgi_altiminalti_toplam>0) {

while($row=sed_sql_fetcharray($mac_bilgi_altiminalti)) {
if(!empty($row['mac_id'])) {
$ekle .= "$row[mac_id],";
}
}
$donecek = substr($ekle,0,-1);

} else if($mac_bilgi_altiminalti_toplam_2>0) {

while($row=sed_sql_fetcharray($mac_bilgi_altiminalti_2)) {
if(!empty($row['mac_id'])) {
$ekle .= "$row[mac_id],";
}
}
$donecek = substr($ekle,0,-1);

}  else {
$donecek = "";
}
return $donecek;
}

function gizli_oran_tips($kupa_id,$id) {
global $ub;
global $dizin;

$mac_bilgi_kendim = sed_sql_query("select * from oyunlar_normal where spor_tipi='futbol' and bayi_id='".$ub['id']."'");
$mac_bilgi_altim = sed_sql_query("select * from oyunlar_normal where spor_tipi='futbol' and bayi_id='".$ub['hesap_sahibi_id']."'");
$mac_bilgi_altiminalti = sed_sql_query("select * from oyunlar_normal where spor_tipi='futbol' and bayi_id='".$ub['hesap_root_id']."'");
$mac_bilgi_kendim_toplam = sed_sql_numrows($mac_bilgi_kendim);
$mac_bilgi_altim_toplam = sed_sql_numrows($mac_bilgi_altim);
$mac_bilgi_altiminalti_toplam = sed_sql_numrows($mac_bilgi_altiminalti);

if($mac_bilgi_kendim_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_kendim)) {
if(!empty($row['oran_tip_id'])) {
$ekle .= "$row[oran_tip_id],";
}
}
$donecek = substr($ekle,0,-1);
} else if($mac_bilgi_altim_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_altim)) {
if(!empty($row['oran_tip_id'])) {
$ekle .= "$row[oran_tip_id],";
}
}
$donecek = substr($ekle,0,-1);
} else if($mac_bilgi_altiminalti_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_altiminalti)) {
if(!empty($row['oran_tip_id'])) {
$ekle .= "$row[oran_tip_id],";
}
}
$donecek = substr($ekle,0,-1);
} else {
$donecek = "";
}
return $donecek;	
}


function gizli_oran_tips_basketbol($id) {
global $ub;
$mac_bilgi_kendim = sed_sql_query("select * from oyunlar_normal where spor_tipi='basketbol' and bayi_id='".$ub['id']."'");
$mac_bilgi_altim = sed_sql_query("select * from oyunlar_normal where spor_tipi='basketbol' and bayi_id='".$ub['hesap_sahibi_id']."'");
$mac_bilgi_altiminalti = sed_sql_query("select * from oyunlar_normal where spor_tipi='basketbol' and bayi_id='".$ub['hesap_root_id']."'");
$mac_bilgi_kendim_toplam = sed_sql_numrows($mac_bilgi_kendim);
$mac_bilgi_altim_toplam = sed_sql_numrows($mac_bilgi_altim);
$mac_bilgi_altiminalti_toplam = sed_sql_numrows($mac_bilgi_altiminalti);

if($mac_bilgi_kendim_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_kendim)) {
if(!empty($row['oran_tip_id'])) {
$ekle .= "$row[oran_tip_id],";
}
}
$donecek = substr($ekle,0,-1);
} else if($mac_bilgi_altim_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_altim)) {
if(!empty($row['oran_tip_id'])) {
$ekle .= "$row[oran_tip_id],";
}
}
$donecek = substr($ekle,0,-1);
} else if($mac_bilgi_altiminalti_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_altiminalti)) {
if(!empty($row['oran_tip_id'])) {
$ekle .= "$row[oran_tip_id],";
}
}
$donecek = substr($ekle,0,-1);
} else {
$donecek = "";
}
return $donecek;		
}

function gizli_oran_tips_tenis($id) {
global $ub;
$mac_bilgi_kendim = sed_sql_query("select * from oyunlar_normal where spor_tipi='tenis' and bayi_id='".$ub['id']."'");
$mac_bilgi_altim = sed_sql_query("select * from oyunlar_normal where spor_tipi='tenis' and bayi_id='".$ub['hesap_sahibi_id']."'");
$mac_bilgi_altiminalti = sed_sql_query("select * from oyunlar_normal where spor_tipi='tenis' and bayi_id='".$ub['hesap_root_id']."'");
$mac_bilgi_kendim_toplam = sed_sql_numrows($mac_bilgi_kendim);
$mac_bilgi_altim_toplam = sed_sql_numrows($mac_bilgi_altim);
$mac_bilgi_altiminalti_toplam = sed_sql_numrows($mac_bilgi_altiminalti);

if($mac_bilgi_kendim_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_kendim)) {
if(!empty($row['oran_tip_id'])) {
$ekle .= "$row[oran_tip_id],";
}
}
$donecek = substr($ekle,0,-1);
} else if($mac_bilgi_altim_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_altim)) {
if(!empty($row['oran_tip_id'])) {
$ekle .= "$row[oran_tip_id],";
}
}
$donecek = substr($ekle,0,-1);
} else if($mac_bilgi_altiminalti_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_altiminalti)) {
if(!empty($row['oran_tip_id'])) {
$ekle .= "$row[oran_tip_id],";
}
}
$donecek = substr($ekle,0,-1);
} else {
$donecek = "";
}
return $donecek;
}

function gizli_oran_tips_voleybol($id) {
global $ub;
$mac_bilgi_kendim = sed_sql_query("select * from oyunlar_normal where spor_tipi='voleybol' and bayi_id='".$ub['id']."'");
$mac_bilgi_altim = sed_sql_query("select * from oyunlar_normal where spor_tipi='voleybol' and bayi_id='".$ub['hesap_sahibi_id']."'");
$mac_bilgi_altiminalti = sed_sql_query("select * from oyunlar_normal where spor_tipi='voleybol' and bayi_id='".$ub['hesap_root_id']."'");
$mac_bilgi_kendim_toplam = sed_sql_numrows($mac_bilgi_kendim);
$mac_bilgi_altim_toplam = sed_sql_numrows($mac_bilgi_altim);
$mac_bilgi_altiminalti_toplam = sed_sql_numrows($mac_bilgi_altiminalti);

if($mac_bilgi_kendim_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_kendim)) {
if(!empty($row['oran_tip_id'])) {
$ekle .= "$row[oran_tip_id],";
}
}
$donecek = substr($ekle,0,-1);
} else if($mac_bilgi_altim_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_altim)) {
if(!empty($row['oran_tip_id'])) {
$ekle .= "$row[oran_tip_id],";
}
}
$donecek = substr($ekle,0,-1);
} else if($mac_bilgi_altiminalti_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_altiminalti)) {
if(!empty($row['oran_tip_id'])) {
$ekle .= "$row[oran_tip_id],";
}
}
$donecek = substr($ekle,0,-1);
} else {
$donecek = "";
}
return $donecek;	
}

function gizli_oran_tips_buzhokeyi($id) {
global $ub;
$mac_bilgi_kendim = sed_sql_query("select * from oyunlar_normal where spor_tipi='buzhokeyi' and bayi_id='".$ub['id']."'");
$mac_bilgi_altim = sed_sql_query("select * from oyunlar_normal where spor_tipi='buzhokeyi' and bayi_id='".$ub['hesap_sahibi_id']."'");
$mac_bilgi_altiminalti = sed_sql_query("select * from oyunlar_normal where spor_tipi='buzhokeyi' and bayi_id='".$ub['hesap_root_id']."'");
$mac_bilgi_kendim_toplam = sed_sql_numrows($mac_bilgi_kendim);
$mac_bilgi_altim_toplam = sed_sql_numrows($mac_bilgi_altim);
$mac_bilgi_altiminalti_toplam = sed_sql_numrows($mac_bilgi_altiminalti);

if($mac_bilgi_kendim_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_kendim)) {
if(!empty($row['oran_tip_id'])) {
$ekle .= "$row[oran_tip_id],";
}
}
$donecek = substr($ekle,0,-1);
} else if($mac_bilgi_altim_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_altim)) {
if(!empty($row['oran_tip_id'])) {
$ekle .= "$row[oran_tip_id],";
}
}
$donecek = substr($ekle,0,-1);
} else if($mac_bilgi_altiminalti_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_altiminalti)) {
if(!empty($row['oran_tip_id'])) {
$ekle .= "$row[oran_tip_id],";
}
}
$donecek = substr($ekle,0,-1);
} else {
$donecek = "";
}
return $donecek;	
}

function gizli_oran_tips_hentbol($id) {
global $ub;
$mac_bilgi_kendim = sed_sql_query("select * from oyunlar_normal where spor_tipi='hentbol' and bayi_id='".$ub['id']."'");
$mac_bilgi_altim = sed_sql_query("select * from oyunlar_normal where spor_tipi='hentbol' and bayi_id='".$ub['hesap_sahibi_id']."'");
$mac_bilgi_altiminalti = sed_sql_query("select * from oyunlar_normal where spor_tipi='hentbol' and bayi_id='".$ub['hesap_root_id']."'");
$mac_bilgi_kendim_toplam = sed_sql_numrows($mac_bilgi_kendim);
$mac_bilgi_altim_toplam = sed_sql_numrows($mac_bilgi_altim);
$mac_bilgi_altiminalti_toplam = sed_sql_numrows($mac_bilgi_altiminalti);

if($mac_bilgi_kendim_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_kendim)) {
if(!empty($row['oran_tip_id'])) {
$ekle .= "$row[oran_tip_id],";
}
}
$donecek = substr($ekle,0,-1);
} else if($mac_bilgi_altim_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_altim)) {
if(!empty($row['oran_tip_id'])) {
$ekle .= "$row[oran_tip_id],";
}
}
$donecek = substr($ekle,0,-1);
} else if($mac_bilgi_altiminalti_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_altiminalti)) {
if(!empty($row['oran_tip_id'])) {
$ekle .= "$row[oran_tip_id],";
}
}
$donecek = substr($ekle,0,-1);
} else {
$donecek = "";
}
return $donecek;	
}

function dusenoranbulcanli($oran,$oranismi,$sportipi) {
global $ub;
$oransecenekbul = bilgi("select * from maclar_topluoranlar_canli where tipismi='$oranismi' and spor_tipi='$sportipi' and bayi_id='$ub[id]'");
$oransecenekbul_2 = bilgi("select * from maclar_topluoranlar_canli where tipismi='$oranismi' and spor_tipi='$sportipi' and bayi_id='$ub[hesap_sahibi_id]'");
$oransecenekbul_3 = bilgi("select * from maclar_topluoranlar_canli where tipismi='$oranismi' and spor_tipi='$sportipi' and bayi_id='$ub[hesap_root_id]'");
if($oransecenekbul['id']>1) {
	$oran_tamamla = $oran+$oransecenekbul['oran'];
	$donen = nf($oran_tamamla);
} else if($oransecenekbul_2['id']>1) {
	$oran_tamamla = $oran+$oransecenekbul_2['oran'];
	$donen = nf($oran_tamamla);
} else if($oransecenekbul_3['id']>1) {
	$oran_tamamla = $oran+$oransecenekbul_3['oran'];
	$donen = nf($oran_tamamla);
} else {
	$donen = nf($oran);
}
return $donen;
}

function oranbulxxx_futbol($id,$oranvalid) {
global $ub;
global $dizin;
$oran_tip_bul = bilgi("select oran_tip from oran_val_futbol where id='$oranvalid'");
$oran = bilgi("SELECT
O1.oran + IF(MO1.oran IS NULL, 0, MO1.oran) + IF(MO2.oran IS NULL, 0, MO2.oran) + IF(MO3.oran IS NULL, 0, MO3.oran) + IF(MO4.oran IS NULL, 0, MO4.oran) AS oran,
O1.mac_db_id,
O1.oran_val_id,
O1.oran_tip,
TO1.oran as T1ORAN,
TO2.oran as T2ORAN,
TO3.oran as T3ORAN,
TO4.oran as T4ORAN,
YT1.oran_tip_id as YT1Tip,
YT2.oran_tip_id as YT2Tip,
YT3.oran_tip_id as YT3Tip,
YT4.oran_tip_id as YT4Tip
FROM oranlar_futbol AS O1 

LEFT OUTER JOIN maclar_oranlar AS MO1 ON MO1.mac_db_id = O1.mac_db_id AND MO1.oran_val_id = O1.oran_val_id AND MO1.bayi_id = '$ub[id]' AND MO1.spor_tipi = 'futbol'

LEFT OUTER JOIN maclar_oranlar AS MO2 ON MO2.mac_db_id = O1.mac_db_id AND MO2.oran_val_id = O1.oran_val_id AND MO2.bayi_id = '$ub[hesap_sahibi_id]' AND MO2.spor_tipi = 'futbol'

LEFT OUTER JOIN maclar_oranlar AS MO3 ON MO3.mac_db_id = O1.mac_db_id AND MO3.oran_val_id = O1.oran_val_id AND MO3.bayi_id = '$ub[hesap_root_id]' AND MO3.spor_tipi = 'futbol'

LEFT OUTER JOIN maclar_oranlar AS MO4 ON MO4.mac_db_id = O1.mac_db_id AND MO4.oran_val_id = O1.oran_val_id AND MO4.bayi_id = '$ub[hesap_root_root_id]' AND MO4.spor_tipi = 'futbol'

LEFT OUTER JOIN maclar_topluoranlar AS TO1 ON TO1.oran_val_id = '$oran_tip_bul[oran_tip]' AND TO1.bayi_id = '$ub[id]' AND TO1.spor_tipi = 'futbol'

LEFT OUTER JOIN maclar_topluoranlar AS TO2 ON TO2.oran_val_id = '$oran_tip_bul[oran_tip]' AND TO2.bayi_id = '$ub[hesap_sahibi_id]' AND TO2.spor_tipi = 'futbol'

LEFT OUTER JOIN maclar_topluoranlar AS TO3 ON TO3.oran_val_id = '$oran_tip_bul[oran_tip]' AND TO3.bayi_id = '$ub[hesap_root_id]' AND TO3.spor_tipi = 'futbol'

LEFT OUTER JOIN maclar_topluoranlar AS TO4 ON TO4.oran_val_id = '$oran_tip_bul[oran_tip]' AND TO4.bayi_id = '$ub[hesap_root_root_id]' AND TO4.spor_tipi = 'futbol'

LEFT OUTER JOIN oyunlar_normal AS YT1 ON YT1.oran_tip_id = '$oran_tip_bul[oran_tip]' AND YT1.bayi_id = '$ub[id]' AND YT1.spor_tipi = 'futbol'

LEFT OUTER JOIN oyunlar_normal AS YT2 ON YT2.oran_tip_id = '$oran_tip_bul[oran_tip]' AND YT2.bayi_id = '$ub[hesap_sahibi_id]' AND YT2.spor_tipi = 'futbol'

LEFT OUTER JOIN oyunlar_normal AS YT3 ON YT3.oran_tip_id = '$oran_tip_bul[oran_tip]' AND YT3.bayi_id = '$ub[hesap_root_id]' AND YT3.spor_tipi = 'futbol'

LEFT OUTER JOIN oyunlar_normal AS YT4 ON YT4.oran_tip_id = '$oran_tip_bul[oran_tip]' AND YT4.bayi_id = '$ub[hesap_root_root_id]' AND YT4.spor_tipi = 'futbol'

WHERE  O1.mac_db_id='$id' and O1.oran_val_id='$oranvalid'");

if($oran_tip_bul['oran_tip']==$oran['YT1Tip']) {

$donen = "-";
return $donen;

} else if($oran_tip_bul['oran_tip']==$oran['YT2Tip']) {

$donen = "-";
return $donen;

} else if($oran_tip_bul['oran_tip']==$oran['YT3Tip']) {

$donen = "-";
return $donen;

} else if($oran_tip_bul['oran_tip']==$oran['YT4Tip']) {

$donen = "-";
return $donen;

} else {

if($oran['T1ORAN']) {
	$oran_ver2 = $oran['T1ORAN'];
} else {
	$oran_ver2 = 0.00;
}

if($oran['T2ORAN']) {
	$oran_ver3 = $oran['T2ORAN'];
} else {
	$oran_ver3 = 0.00;
}

if($oran['T3ORAN']) {
	$oran_ver4 = $oran['T3ORAN'];
} else {
	$oran_ver4 = 0.00;
}

if($oran['T4ORAN']) {
	$oran_ver5 = $oran['T4ORAN'];
} else {
	$oran_ver5 = 0.00;
}

$donecek = $oran['oran']+$oran_ver2+$oran_ver3+$oran_ver4+$oran_ver5;

if($donecek=="" || $donecek<1.01) { $donen = "-"; } else { $donen = nf($donecek); }
return $donen;

}

}

function oranbulxxx_basketbol($id,$oranvalid) {
global $ub;
global $dizin;
$oran = bilgi("select oran,mac_db_id,oran_val_id from oranlar_basketbol where mac_db_id='$id' and oran_val_id='$oranvalid' ORDER BY id ASC");

$oran_bilgi_kendim = bilgi("select * from maclar_oranlar where spor_tipi='basketbol' and mac_db_id='".$id."' and oran_val_id='$oranvalid' and bayi_id='".$ub['id']."'");
$oran_bilgi_altim = bilgi("select * from maclar_oranlar where spor_tipi='basketbol' and mac_db_id='".$id."' and oran_val_id='$oranvalid' and bayi_id='".$ub['hesap_sahibi_id']."'");
$oran_bilgi_altiminalti = bilgi("select * from maclar_oranlar where spor_tipi='basketbol' and mac_db_id='".$id."' and oran_val_id='$oranvalid' and bayi_id='".$ub['hesap_root_id']."'");
$oran_bilgi_altiminalti_2 = bilgi("select * from maclar_oranlar where spor_tipi='basketbol' and mac_db_id='".$id."' and oran_val_id='$oranvalid' and bayi_id='".$ub['hesap_root_root_id']."'");

$oran_tip_bul = bilgi("select oran_tip from oran_val_basketbol where id='$oranvalid'");

$oran_bilgi_toplu_bir = bilgi("select * from maclar_topluoranlar where spor_tipi='basketbol' and oran_val_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['id']."'");
$oran_bilgi_toplu_iki = bilgi("select * from maclar_topluoranlar where spor_tipi='basketbol' and oran_val_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['hesap_sahibi_id']."'");
$oran_bilgi_toplu_uc = bilgi("select * from maclar_topluoranlar where spor_tipi='basketbol' and oran_val_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['hesap_root_id']."'");
$oran_bilgi_toplu_dort = bilgi("select * from maclar_topluoranlar where spor_tipi='basketbol' and oran_val_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['hesap_root_root_id']."'");

$yasakli_tip_bul_bir = bilgi("select oran_tip_id from oyunlar_normal where oran_tip_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['id']."' and spor_tipi='basketbol'");

$yasakli_tip_bul_iki = bilgi("select oran_tip_id from oyunlar_normal where oran_tip_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['hesap_sahibi_id']."' and spor_tipi='basketbol'");

$yasakli_tip_bul_uc = bilgi("select oran_tip_id from oyunlar_normal where oran_tip_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['hesap_root_id']."' and spor_tipi='basketbol'");

$yasakli_tip_bul_dort = bilgi("select oran_tip_id from oyunlar_normal where oran_tip_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['hesap_root_root_id']."' and spor_tipi='basketbol'");

if($oran_tip_bul['oran_tip']==$yasakli_tip_bul_bir['oran_tip_id']) {

$donen = "-";
return $donen;

} else if($oran_tip_bul['oran_tip']==$yasakli_tip_bul_iki['oran_tip_id']) {

$donen = "-";
return $donen;

} else if($oran_tip_bul['oran_tip']==$yasakli_tip_bul_uc['oran_tip_id']) {

$donen = "-";
return $donen;

} else if($oran_tip_bul['oran_tip']==$yasakli_tip_bul_dort['oran_tip_id']) {

$donen = "-";
return $donen;

} else {

if($oran_bilgi_kendim['id']>0) {
	$oran_ver = $oran_bilgi_kendim['oran'];
	$kullan = 1;
} else if($oran_bilgi_altim['id']>0) {
	$oran_ver = $oran_bilgi_altim['oran'];
	$kullan = 1;
} else if($oran_bilgi_altiminalti['id']>0) {
	$oran_ver = $oran_bilgi_altiminalti['oran'];
	$kullan = 1;
} else if($oran_bilgi_altiminalti_2['id']>0) {
	$oran_ver = $oran_bilgi_altiminalti_2['oran'];
	$kullan = 1;
}

if($oran_bilgi_toplu_bir['id']>0) {
	$oran_ver2 = $oran_bilgi_toplu_bir['oran'];
} else {
	$oran_ver2 = 0.00;
}

if($oran_bilgi_toplu_iki['id']>0) {
	$oran_ver3 = $oran_bilgi_toplu_iki['oran'];
} else {
	$oran_ver3 = 0.00;
}

if($oran_bilgi_toplu_uc['id']>0) {
	$oran_ver4 = $oran_bilgi_toplu_uc['oran'];
} else {
	$oran_ver4 = 0.00;
}

if($oran_bilgi_toplu_dort['id']>0) {
	$oran_ver5 = $oran_bilgi_toplu_uc['oran'];
} else {
	$oran_ver5 = 0.00;
}

if($kullan==1) {
$donecek = $oran['oran']+$oran_ver+$oran_ver2+$oran_ver3+$oran_ver4+$oran_ver5;
} else {
$donecek = $oran['oran']+$oran_ver2+$oran_ver3+$oran_ver4+$oran_ver5;
}

if($donecek=="" || $donecek<1.01) { $donen = "-"; } else { $donen = nf($donecek); }
return $donen;
}

}

function oranbulxxx_tenis($id,$oranvalid) {
global $ub;
global $dizin;
$oran = bilgi("select oran,mac_db_id,oran_val_id from oranlar_tenis where mac_db_id='$id' and oran_val_id='$oranvalid'");

$oran_bilgi_kendim = bilgi("select * from maclar_oranlar where spor_tipi='tenis' and mac_db_id='".$id."' and oran_val_id='$oranvalid' and bayi_id='".$ub['id']."'");
$oran_bilgi_altim = bilgi("select * from maclar_oranlar where spor_tipi='tenis' and mac_db_id='".$id."' and oran_val_id='$oranvalid' and bayi_id='".$ub['hesap_sahibi_id']."'");
$oran_bilgi_altiminalti = bilgi("select * from maclar_oranlar where spor_tipi='tenis' and mac_db_id='".$id."' and oran_val_id='$oranvalid' and bayi_id='".$ub['hesap_root_id']."'");
$oran_bilgi_altiminalti_2 = bilgi("select * from maclar_oranlar where spor_tipi='tenis' and mac_db_id='".$id."' and oran_val_id='$oranvalid' and bayi_id='".$ub['hesap_root_root_id']."'");

$oran_tip_bul = bilgi("select oran_tip from oran_val_tenis where id='$oranvalid'");

$oran_bilgi_toplu_bir = bilgi("select * from maclar_topluoranlar where spor_tipi='tenis' and oran_val_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['id']."'");
$oran_bilgi_toplu_iki = bilgi("select * from maclar_topluoranlar where spor_tipi='tenis' and oran_val_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['hesap_sahibi_id']."'");
$oran_bilgi_toplu_uc = bilgi("select * from maclar_topluoranlar where spor_tipi='tenis' and oran_val_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['hesap_root_id']."'");
$oran_bilgi_toplu_dort = bilgi("select * from maclar_topluoranlar where spor_tipi='tenis' and oran_val_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['hesap_root_root_id']."'");

$yasakli_tip_bul_bir = bilgi("select oran_tip_id from oyunlar_normal where oran_tip_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['id']."' and spor_tipi='tenis'");

$yasakli_tip_bul_iki = bilgi("select oran_tip_id from oyunlar_normal where oran_tip_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['hesap_sahibi_id']."' and spor_tipi='tenis'");

$yasakli_tip_bul_uc = bilgi("select oran_tip_id from oyunlar_normal where oran_tip_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['hesap_root_id']."' and spor_tipi='tenis'");

$yasakli_tip_bul_dort = bilgi("select oran_tip_id from oyunlar_normal where oran_tip_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['hesap_root_root_id']."' and spor_tipi='tenis'");

if($oran_tip_bul['oran_tip']==$yasakli_tip_bul_bir['oran_tip_id']) {

$donen = "-";
return $donen;

} else if($oran_tip_bul['oran_tip']==$yasakli_tip_bul_iki['oran_tip_id']) {

$donen = "-";
return $donen;

} else if($oran_tip_bul['oran_tip']==$yasakli_tip_bul_uc['oran_tip_id']) {

$donen = "-";
return $donen;

} else if($oran_tip_bul['oran_tip']==$yasakli_tip_bul_dort['oran_tip_id']) {

$donen = "-";
return $donen;

} else {if($oran_bilgi_kendim['id']>0) {
	$oran_ver = $oran_bilgi_kendim['oran'];
	$kullan = 1;
} else if($oran_bilgi_altim['id']>0) {
	$oran_ver = $oran_bilgi_altim['oran'];
	$kullan = 1;
} else if($oran_bilgi_altiminalti['id']>0) {
	$oran_ver = $oran_bilgi_altiminalti['oran'];
	$kullan = 1;
} else if($oran_bilgi_altiminalti_2['id']>0) {
	$oran_ver = $oran_bilgi_altiminalti_2['oran'];
	$kullan = 1;
}

if($oran_bilgi_toplu_bir['id']>0) {
	$oran_ver2 = $oran_bilgi_toplu_bir['oran'];
} else {
	$oran_ver2 = 0.00;
}

if($oran_bilgi_toplu_iki['id']>0) {
	$oran_ver3 = $oran_bilgi_toplu_iki['oran'];
} else {
	$oran_ver3 = 0.00;
}

if($oran_bilgi_toplu_uc['id']>0) {
	$oran_ver4 = $oran_bilgi_toplu_uc['oran'];
} else {
	$oran_ver4 = 0.00;
}

if($oran_bilgi_toplu_dort['id']>0) {
	$oran_ver5 = $oran_bilgi_toplu_uc['oran'];
} else {
	$oran_ver5 = 0.00;
}

if($kullan==1) {
$donecek = $oran['oran']+$oran_ver+$oran_ver2+$oran_ver3+$oran_ver4+$oran_ver5;
} else {
$donecek = $oran['oran']+$oran_ver2+$oran_ver3+$oran_ver4+$oran_ver5;
}

if($donecek=="" || $donecek<1.01) { $donen = "-"; } else { $donen = nf($donecek); }
return $donen;
}

}

function oranbulxxx_voleybol($id,$oranvalid) {
global $ub;
global $dizin;
$oran = bilgi("select oran,mac_db_id,oran_val_id from oranlar_voleybol where mac_db_id='$id' and oran_val_id='$oranvalid'");

$oran_bilgi_kendim = bilgi("select * from maclar_oranlar where spor_tipi='voleybol' and mac_db_id='".$id."' and oran_val_id='$oranvalid' and bayi_id='".$ub['id']."'");
$oran_bilgi_altim = bilgi("select * from maclar_oranlar where spor_tipi='voleybol' and mac_db_id='".$id."' and oran_val_id='$oranvalid' and bayi_id='".$ub['hesap_sahibi_id']."'");
$oran_bilgi_altiminalti = bilgi("select * from maclar_oranlar where spor_tipi='voleybol' and mac_db_id='".$id."' and oran_val_id='$oranvalid' and bayi_id='".$ub['hesap_root_id']."'");

$oran_tip_bul = bilgi("select oran_tip from oran_val_voleybol where id='$oranvalid'");

$oran_bilgi_toplu_bir = bilgi("select * from maclar_topluoranlar where spor_tipi='voleybol' and oran_val_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['id']."'");
$oran_bilgi_toplu_iki = bilgi("select * from maclar_topluoranlar where spor_tipi='voleybol' and oran_val_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['hesap_sahibi_id']."'");
$oran_bilgi_toplu_uc = bilgi("select * from maclar_topluoranlar where spor_tipi='voleybol' and oran_val_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['hesap_root_id']."'");

$yasakli_tip_bul_bir = bilgi("select oran_tip_id from oyunlar_normal where oran_tip_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['id']."' and spor_tipi='voleybol'");

$yasakli_tip_bul_iki = bilgi("select oran_tip_id from oyunlar_normal where oran_tip_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['hesap_sahibi_id']."' and spor_tipi='voleybol'");

$yasakli_tip_bul_uc = bilgi("select oran_tip_id from oyunlar_normal where oran_tip_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['hesap_root_id']."' and spor_tipi='voleybol'");

if($oran_tip_bul['oran_tip']==$yasakli_tip_bul_bir['oran_tip_id']) {

$donen = "-";
return $donen;

} else if($oran_tip_bul['oran_tip']==$yasakli_tip_bul_iki['oran_tip_id']) {

$donen = "-";
return $donen;

} else if($oran_tip_bul['oran_tip']==$yasakli_tip_bul_uc['oran_tip_id']) {

$donen = "-";
return $donen;

} else {

if($oran_bilgi_kendim['id']>0) {
	$oran_ver = $oran_bilgi_kendim['oran'];
	$kullan = 1;
} else if($oran_bilgi_altim['id']>0) {
	$oran_ver = $oran_bilgi_altim['oran'];
	$kullan = 1;
} else if($oran_bilgi_altiminalti['id']>0) {
	$oran_ver = $oran_bilgi_altiminalti['oran'];
	$kullan = 1;
}

if($oran_bilgi_toplu_bir['id']>0) {
	$oran_ver2 = $oran_bilgi_toplu_bir['oran'];
} else if($oran_bilgi_toplu_iki['id']>0) {
	$oran_ver2 = $oran_bilgi_toplu_iki['oran'];
} else if($oran_bilgi_toplu_uc['id']>0) {
	$oran_ver2 = $oran_bilgi_toplu_uc['oran'];
} else {
	$oran_ver2 = 0.00;
}

if($kullan==1) {
$donecek = $oran['oran']+$oran_ver+$oran_ver2;
} else {
$donecek = $oran['oran']+$oran_ver2;
}

if($donecek=="" || $donecek<1.01) { $donen = "-"; } else { $donen = nf($donecek); }
return $donen;
}

}

function oranbulxxx_buz($id,$oranvalid) {
global $ub;
global $dizin;
$oran = bilgi("select oran,mac_db_id,oran_val_id from oranlar_buzhokeyi where mac_db_id='$id' and oran_val_id='$oranvalid'");

$oran_bilgi_kendim = bilgi("select * from maclar_oranlar where spor_tipi='buzhokeyi' and mac_db_id='".$id."' and oran_val_id='$oranvalid' and bayi_id='".$ub['id']."'");
$oran_bilgi_altim = bilgi("select * from maclar_oranlar where spor_tipi='buzhokeyi' and mac_db_id='".$id."' and oran_val_id='$oranvalid' and bayi_id='".$ub['hesap_sahibi_id']."'");
$oran_bilgi_altiminalti = bilgi("select * from maclar_oranlar where spor_tipi='buzhokeyi' and mac_db_id='".$id."' and oran_val_id='$oranvalid' and bayi_id='".$ub['hesap_root_id']."'");

$oran_tip_bul = bilgi("select oran_tip from oran_val_buzhokeyi where id='$oranvalid'");

$oran_bilgi_toplu_bir = bilgi("select * from maclar_topluoranlar where spor_tipi='buzhokeyi' and oran_val_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['id']."'");
$oran_bilgi_toplu_iki = bilgi("select * from maclar_topluoranlar where spor_tipi='buzhokeyi' and oran_val_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['hesap_sahibi_id']."'");
$oran_bilgi_toplu_uc = bilgi("select * from maclar_topluoranlar where spor_tipi='buzhokeyi' and oran_val_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['hesap_root_id']."'");

$yasakli_tip_bul_bir = bilgi("select oran_tip_id from oyunlar_normal where oran_tip_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['id']."' and spor_tipi='buzhokeyi'");

$yasakli_tip_bul_iki = bilgi("select oran_tip_id from oyunlar_normal where oran_tip_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['hesap_sahibi_id']."' and spor_tipi='buzhokeyi'");

$yasakli_tip_bul_uc = bilgi("select oran_tip_id from oyunlar_normal where oran_tip_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['hesap_root_id']."' and spor_tipi='buzhokeyi'");

if($oran_tip_bul['oran_tip']==$yasakli_tip_bul_bir['oran_tip_id']) {

$donen = "-";
return $donen;

} else if($oran_tip_bul['oran_tip']==$yasakli_tip_bul_iki['oran_tip_id']) {

$donen = "-";
return $donen;

} else if($oran_tip_bul['oran_tip']==$yasakli_tip_bul_uc['oran_tip_id']) {

$donen = "-";
return $donen;

} else {

if($oran_bilgi_kendim['id']>0) {
	$oran_ver = $oran_bilgi_kendim['oran'];
	$kullan = 1;
} else if($oran_bilgi_altim['id']>0) {
	$oran_ver = $oran_bilgi_altim['oran'];
	$kullan = 1;
} else if($oran_bilgi_altiminalti['id']>0) {
	$oran_ver = $oran_bilgi_altiminalti['oran'];
	$kullan = 1;
}

if($oran_bilgi_toplu_bir['id']>0) {
	$oran_ver2 = $oran_bilgi_toplu_bir['oran'];
} else if($oran_bilgi_toplu_iki['id']>0) {
	$oran_ver2 = $oran_bilgi_toplu_iki['oran'];
} else if($oran_bilgi_toplu_uc['id']>0) {
	$oran_ver2 = $oran_bilgi_toplu_uc['oran'];
} else {
	$oran_ver2 = 0.00;
}

if($kullan==1) {
$donecek = $oran['oran']+$oran_ver+$oran_ver2;
} else {
$donecek = $oran['oran']+$oran_ver2;
}

if($donecek=="" || $donecek<1.01) { $donen = "-"; } else { $donen = nf($donecek); }
return $donen;
}

}

function oranbulxxx_hentbol($id,$oranvalid) {
global $ub;
global $dizin;
$oran = bilgi("select oran,mac_db_id,oran_val_id from oranlar_hentbol where mac_db_id='$id' and oran_val_id='$oranvalid'");

$oran_bilgi_kendim = bilgi("select * from maclar_oranlar where spor_tipi='hentbol' and mac_db_id='".$id."' and oran_val_id='$oranvalid' and bayi_id='".$ub['id']."'");
$oran_bilgi_altim = bilgi("select * from maclar_oranlar where spor_tipi='hentbol' and mac_db_id='".$id."' and oran_val_id='$oranvalid' and bayi_id='".$ub['hesap_sahibi_id']."'");
$oran_bilgi_altiminalti = bilgi("select * from maclar_oranlar where spor_tipi='hentbol' and mac_db_id='".$id."' and oran_val_id='$oranvalid' and bayi_id='".$ub['hesap_root_id']."'");

$oran_tip_bul = bilgi("select oran_tip from oran_val_hentbol where id='$oranvalid'");

$oran_bilgi_toplu_bir = bilgi("select * from maclar_topluoranlar where spor_tipi='hentbol' and oran_val_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['id']."'");
$oran_bilgi_toplu_iki = bilgi("select * from maclar_topluoranlar where spor_tipi='hentbol' and oran_val_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['hesap_sahibi_id']."'");
$oran_bilgi_toplu_uc = bilgi("select * from maclar_topluoranlar where spor_tipi='hentbol' and oran_val_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['hesap_root_id']."'");

$yasakli_tip_bul_bir = bilgi("select oran_tip_id from oyunlar_normal where oran_tip_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['id']."' and spor_tipi='hentbol'");

$yasakli_tip_bul_iki = bilgi("select oran_tip_id from oyunlar_normal where oran_tip_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['hesap_sahibi_id']."' and spor_tipi='hentbol'");

$yasakli_tip_bul_uc = bilgi("select oran_tip_id from oyunlar_normal where oran_tip_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['hesap_root_id']."' and spor_tipi='hentbol'");

if($oran_tip_bul['oran_tip']==$yasakli_tip_bul_bir['oran_tip_id']) {

$donen = "-";
return $donen;

} else if($oran_tip_bul['oran_tip']==$yasakli_tip_bul_iki['oran_tip_id']) {

$donen = "-";
return $donen;

} else if($oran_tip_bul['oran_tip']==$yasakli_tip_bul_uc['oran_tip_id']) {

$donen = "-";
return $donen;

} else {

if($oran_bilgi_kendim['id']>0) {
	$oran_ver = $oran_bilgi_kendim['oran'];
	$kullan = 1;
} else if($oran_bilgi_altim['id']>0) {
	$oran_ver = $oran_bilgi_altim['oran'];
	$kullan = 1;
} else if($oran_bilgi_altiminalti['id']>0) {
	$oran_ver = $oran_bilgi_altiminalti['oran'];
	$kullan = 1;
}

if($oran_bilgi_toplu_bir['id']>0) {
	$oran_ver2 = $oran_bilgi_toplu_bir['oran'];
} else if($oran_bilgi_toplu_iki['id']>0) {
	$oran_ver2 = $oran_bilgi_toplu_iki['oran'];
} else if($oran_bilgi_toplu_uc['id']>0) {
	$oran_ver2 = $oran_bilgi_toplu_uc['oran'];
} else {
	$oran_ver2 = 0.00;
}

if($kullan==1) {
$donecek = $oran['oran']+$oran_ver+$oran_ver2;
} else {
$donecek = $oran['oran']+$oran_ver2;
}

if($donecek=="" || $donecek<1.01) { $donen = "-"; } else { $donen = nf($donecek); }
return $donen;
}

}

function oranbul($id,$oranvalid) {
global $ub;
global $dizin;
$oran = bilgi("select oran,mac_db_id,oran_val_id,oran_tip from oranlar_futbol where mac_db_id='$id' and oran_val_id='$oranvalid'");
$mb = bilgi("select kupa_id,id from program_futbol where id='$id'");

$oran_bilgi_kendim = bilgi("select * from maclar_oranlar where spor_tipi='futbol' and mac_db_id='".$id."' and oran_val_id='$oranvalid' and bayi_id='".$ub['id']."'");
$oran_bilgi_altim = bilgi("select * from maclar_oranlar where spor_tipi='futbol' and mac_db_id='".$id."' and oran_val_id='$oranvalid' and bayi_id='".$ub['hesap_sahibi_id']."'");
$oran_bilgi_altiminalti = bilgi("select * from maclar_oranlar where spor_tipi='futbol' and mac_db_id='".$id."' and oran_val_id='$oranvalid' and bayi_id='".$ub['hesap_root_id']."'");
$oran_bilgi_altiminalti_2 = bilgi("select * from maclar_oranlar where spor_tipi='futbol' and mac_db_id='".$id."' and oran_val_id='$oranvalid' and bayi_id='".$ub['hesap_root_root_id']."'");

$oran_tip_bul = bilgi("select oran_tip from oran_val_futbol where id='$oranvalid'");

$oran_bilgi_toplu_bir = bilgi("select * from maclar_topluoranlar where spor_tipi='futbol' and oran_val_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['id']."'");
$oran_bilgi_toplu_iki = bilgi("select * from maclar_topluoranlar where spor_tipi='futbol' and oran_val_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['hesap_sahibi_id']."'");
$oran_bilgi_toplu_uc = bilgi("select * from maclar_topluoranlar where spor_tipi='futbol' and oran_val_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['hesap_root_id']."'");
$oran_bilgi_toplu_dort = bilgi("select * from maclar_topluoranlar where spor_tipi='futbol' and oran_val_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['hesap_root_root_id']."'");

if($oran_bilgi_kendim['id']>0) {
	$oran_ver = $oran_bilgi_kendim['oran'];
	$kullan = 1;
} else if($oran_bilgi_altim['id']>0) {
	$oran_ver = $oran_bilgi_altim['oran'];
	$kullan = 1;
} else if($oran_bilgi_altiminalti['id']>0) {
	$oran_ver = $oran_bilgi_altiminalti['oran'];
	$kullan = 1;
} else if($oran_bilgi_altiminalti_2['id']>0) {
	$oran_ver = $oran_bilgi_altiminalti_2['oran'];
	$kullan = 1;
}

if($oran_bilgi_toplu_bir['id']>0) {
	$oran_ver2 = $oran_bilgi_toplu_bir['oran'];
} else if($oran_bilgi_toplu_iki['id']>0) {
	$oran_ver2 = $oran_bilgi_toplu_iki['oran'];
} else if($oran_bilgi_toplu_uc['id']>0) {
	$oran_ver2 = $oran_bilgi_toplu_uc['oran'];
} else if($oran_bilgi_toplu_dort['id']>0) {
	$oran_ver2 = $oran_bilgi_toplu_dort['oran'];
} else {
	$oran_ver2 = 0.00;
}

if($kullan==1) {
$donecek = $oran['oran']+$oran_ver+$oran_ver2;
} else {
$donecek = $oran['oran']+$oran_ver2;
}

if($donecek=="" || $donecek<1.01) { $donen = "-"; } else { $donen = nf($donecek); }
return $donen;
}

function oranbul_lite($id,$oranvalid,$uid) {
$ub= bilgi("select * from kullanici where id='$uid'");

$oran = bilgi("select oran,mac_db_id,oran_val_id,oran_tip from oranlar_futbol where mac_db_id='$id' and oran_val_id='$oranvalid'");
$mb = bilgi("select kupa_id,id from program_futbol where id='$id'");

if(file_exists("sistem/oranserver/".$ub['id']."-".$id."-macduzenleme.xml")) {
$kullan = "sistem/oranserver/".$ub['id']."-".$id."-macduzenleme.xml";
$direkoran = 1;
} else
if(file_exists("sistem/oranserver/".$ub['id']."-futboltumligler.xml")) {
$kullan = "sistem/oranserver/".$ub['id']."-futboltumligler.xml";
} else
if(file_exists("sistem/oranserver/".$ub['id']."-".$mb['kupa_id']."-futbollig.xml")) {
$kullan = "sistem/oranserver/".$ub['id']."-".$mb['kupa_id']."-futbollig.xml";
} else

if(file_exists("sistem/oranserver/".$ub['hesap_sahibi_id']."-".$id."-macduzenleme.xml")) {
$kullan = "sistem/oranserver/".$ub['hesap_sahibi_id']."-".$id."-macduzenleme.xml";
$direkoran = 1;
} else
if(file_exists("sistem/oranserver/".$ub['hesap_sahibi_id']."-futboltumligler.xml")) {
$kullan = "sistem/oranserver/".$ub['hesap_sahibi_id']."-futboltumligler.xml";
} else
if(file_exists("sistem/oranserver/".$ub['hesap_sahibi_id']."-".$mb['kupa_id']."-futbollig.xml")) {
$kullan = "sistem/oranserver/".$ub['hesap_sahibi_id']."-".$mb['kupa_id']."-futbollig.xml";
} else

if(file_exists("sistem/oranserver/".$ub['hesap_root_id']."-".$id."-macduzenleme.xml")) {
$kullan = "sistem/oranserver/".$ub['hesap_root_id']."-".$id."-macduzenleme.xml";
$direkoran = 1;
} else
if(file_exists("sistem/oranserver/".$ub['hesap_root_id']."-futboltumligler.xml")) {
$kullan = "sistem/oranserver/".$ub['hesap_root_id']."-futboltumligler.xml";
} else
if(file_exists("sistem/oranserver/".$ub['hesap_root_id']."-".$mb['kupa_id']."-futbollig.xml")) {
$kullan = "sistem/oranserver/".$ub['hesap_root_id']."-".$mb['kupa_id']."-futbollig.xml";
}
if($kullan) {
$bukaynak = file_get_contents($kullan);
$xml = new SimpleXMLElement($bukaynak);
$gizo = $xml->gizli_oranvalid;
$gizli_list = explode(",",$gizo);
if(in_array($oran['oran_val_id'],$gizli_list)) {
$donecek = "";
} else {
$toplam_degisim = count($xml->degisimler->orandegis);
for($i=0; $i<$toplam_degisim; $i++) {
$satirvalid = $xml->degisimler->orandegis[$i]->oran_id;
$deger = (float)$xml->degisimler->orandegis[$i]->oran_degisim;
if($satirvalid==$oranvalid) { $varoname = 1; 

if($direkoran) {
$donecek = $deger;
} else {
$donecek = $oran['oran']+$deger; 
}
}
}
if(!$varoname) { $donecek = $oran['oran']; }
}
} else {
$donecek = $oran['oran'];
}
if($donecek=="" || $donecek<1.01) { $donen = "-"; } else { $donen = nf($donecek); }
return $donen;
}

function oranbulb_mobil_id($id,$oranvalid) {
global $ub;
global $dizin;
$oran = bilgi("select id from oranlar_basketbol where mac_db_id='$id' and oran_val_id='$oranvalid' ORDER BY id ASC");
$donen = $oran['id'];
return $donen;
}

function oranbulb($id,$oranid) {
global $ub;
global $dizin;
$oran = bilgi("select id,oran,mac_db_id,oran_tip,oran_val_id from oranlar_basketbol where mac_db_id='$id' and id='$oranid'");

$oran_bilgi_kendim = bilgi("select * from maclar_oranlar where spor_tipi='basketbol' and mac_db_id='".$id."' and oran_val_id='".$oran['id']."' and bayi_id='".$ub['id']."'");
$oran_bilgi_altim = bilgi("select * from maclar_oranlar where spor_tipi='basketbol' and mac_db_id='".$id."' and oran_val_id='".$oran['id']."' and bayi_id='".$ub['hesap_sahibi_id']."'");
$oran_bilgi_altiminalti = bilgi("select * from maclar_oranlar where spor_tipi='basketbol' and mac_db_id='".$id."' and oran_val_id='".$oran['id']."' and bayi_id='".$ub['hesap_root_id']."'");
$oran_bilgi_altiminalti_2 = bilgi("select * from maclar_oranlar where spor_tipi='basketbol' and mac_db_id='".$id."' and oran_val_id='".$oran['id']."' and bayi_id='".$ub['hesap_root_root_id']."'");

$oran_bilgi_toplu_bir = bilgi("select * from maclar_topluoranlar where spor_tipi='basketbol' and oran_val_id='".$oran['oran_tip']."' and bayi_id='".$ub['id']."'");
$oran_bilgi_toplu_iki = bilgi("select * from maclar_topluoranlar where spor_tipi='basketbol' and oran_val_id='".$oran['oran_tip']."' and bayi_id='".$ub['hesap_sahibi_id']."'");
$oran_bilgi_toplu_uc = bilgi("select * from maclar_topluoranlar where spor_tipi='basketbol' and oran_val_id='".$oran['oran_tip']."' and bayi_id='".$ub['hesap_root_id']."'");
$oran_bilgi_toplu_dort = bilgi("select * from maclar_topluoranlar where spor_tipi='basketbol' and oran_val_id='".$oran['oran_tip']."' and bayi_id='".$ub['hesap_root_root_id']."'");

if($oran_bilgi_kendim['id']>0) {
	$oran_ver = $oran_bilgi_kendim['oran'];
	$kullan = 1;
} else if($oran_bilgi_altim['id']>0) {
	$oran_ver = $oran_bilgi_altim['oran'];
	$kullan = 1;
} else if($oran_bilgi_altiminalti['id']>0) {
	$oran_ver = $oran_bilgi_altiminalti['oran'];
	$kullan = 1;
} else if($oran_bilgi_altiminalti_2['id']>0) {
	$oran_ver = $oran_bilgi_altiminalti_2['oran'];
	$kullan = 1;
}

if($oran_bilgi_toplu_bir['id']>0) {
	$oran_ver2 = $oran_bilgi_toplu_bir['oran'];
} else {
	$oran_ver2 = 0.00;
}

if($oran_bilgi_toplu_iki['id']>0) {
	$oran_ver3 = $oran_bilgi_toplu_iki['oran'];
} else {
	$oran_ver3 = 0.00;
}

if($oran_bilgi_toplu_uc['id']>0) {
	$oran_ver4 = $oran_bilgi_toplu_uc['oran'];
} else {
	$oran_ver4 = 0.00;
}

if($oran_bilgi_toplu_dort['id']>0) {
	$oran_ver5 = $oran_bilgi_toplu_uc['oran'];
} else {
	$oran_ver5 = 0.00;
}

if($kullan==1) {
$donecek = $oran['oran']+$oran_ver+$oran_ver2+$oran_ver3+$oran_ver4+$oran_ver5;
} else {
$donecek = $oran['oran']+$oran_ver2+$oran_ver3+$oran_ver4+$oran_ver5;
}

if($donecek=="" || $donecek<1.01) { $donen = "-"; } else { $donen = nf($donecek); }
return $donen;
}

function oranbult($id,$oranvalid) {
global $ub;
global $dizin;
$oran = bilgi("select oran,mac_db_id,oran_val_id from oranlar_tenis where mac_db_id='$id' and oran_val_id='$oranvalid'");

$oran_bilgi_kendim = bilgi("select * from maclar_oranlar where spor_tipi='tenis' and mac_db_id='".$id."' and oran_val_id='$oranvalid' and bayi_id='".$ub['id']."'");
$oran_bilgi_altim = bilgi("select * from maclar_oranlar where spor_tipi='tenis' and mac_db_id='".$id."' and oran_val_id='$oranvalid' and bayi_id='".$ub['hesap_sahibi_id']."'");
$oran_bilgi_altiminalti = bilgi("select * from maclar_oranlar where spor_tipi='tenis' and mac_db_id='".$id."' and oran_val_id='$oranvalid' and bayi_id='".$ub['hesap_root_id']."'");
$oran_bilgi_altiminalti_2 = bilgi("select * from maclar_oranlar where spor_tipi='tenis' and mac_db_id='".$id."' and oran_val_id='$oranvalid' and bayi_id='".$ub['hesap_root_root_id']."'");

$oran_tip_bul = bilgi("select oran_tip from oran_val_tenis where id='$oranvalid'");

$oran_bilgi_toplu_bir = bilgi("select * from maclar_topluoranlar where spor_tipi='tenis' and oran_val_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['id']."'");
$oran_bilgi_toplu_iki = bilgi("select * from maclar_topluoranlar where spor_tipi='tenis' and oran_val_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['hesap_sahibi_id']."'");
$oran_bilgi_toplu_uc = bilgi("select * from maclar_topluoranlar where spor_tipi='tenis' and oran_val_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['hesap_root_id']."'");
$oran_bilgi_toplu_dort = bilgi("select * from maclar_topluoranlar where spor_tipi='tenis' and oran_val_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['hesap_root_root_id']."'");

if($oran_bilgi_kendim['id']>0) {
	$oran_ver = $oran_bilgi_kendim['oran'];
	$kullan = 1;
} else if($oran_bilgi_altim['id']>0) {
	$oran_ver = $oran_bilgi_altim['oran'];
	$kullan = 1;
} else if($oran_bilgi_altiminalti['id']>0) {
	$oran_ver = $oran_bilgi_altiminalti['oran'];
	$kullan = 1;
} else if($oran_bilgi_altiminalti_2['id']>0) {
	$oran_ver = $oran_bilgi_altiminalti_2['oran'];
	$kullan = 1;
}

if($oran_bilgi_toplu_bir['id']>0) {
	$oran_ver2 = $oran_bilgi_toplu_bir['oran'];
} else {
	$oran_ver2 = 0.00;
}

if($oran_bilgi_toplu_iki['id']>0) {
	$oran_ver3 = $oran_bilgi_toplu_iki['oran'];
} else {
	$oran_ver3 = 0.00;
}

if($oran_bilgi_toplu_uc['id']>0) {
	$oran_ver4 = $oran_bilgi_toplu_uc['oran'];
} else {
	$oran_ver4 = 0.00;
}

if($oran_bilgi_toplu_dort['id']>0) {
	$oran_ver5 = $oran_bilgi_toplu_uc['oran'];
} else {
	$oran_ver5 = 0.00;
}

if($kullan==1) {
$donecek = $oran['oran']+$oran_ver+$oran_ver2+$oran_ver3+$oran_ver4+$oran_ver5;
} else {
$donecek = $oran['oran']+$oran_ver2+$oran_ver3+$oran_ver4+$oran_ver5;
}

if($donecek=="" || $donecek<1.01) { $donen = "-"; } else { $donen = nf($donecek); }
return $donen;
}

function oranbulv($id,$oranvalid) {
global $ub;
global $dizin;
$oran = bilgi("select oran,mac_db_id,oran_val_id from oranlar_voleybol where mac_db_id='$id' and oran_val_id='$oranvalid'");

$oran_bilgi_kendim = bilgi("select * from maclar_oranlar where spor_tipi='voleybol' and mac_db_id='".$id."' and oran_val_id='$oranvalid' and bayi_id='".$ub['id']."'");
$oran_bilgi_altim = bilgi("select * from maclar_oranlar where spor_tipi='voleybol' and mac_db_id='".$id."' and oran_val_id='$oranvalid' and bayi_id='".$ub['hesap_sahibi_id']."'");
$oran_bilgi_altiminalti = bilgi("select * from maclar_oranlar where spor_tipi='voleybol' and mac_db_id='".$id."' and oran_val_id='$oranvalid' and bayi_id='".$ub['hesap_root_id']."'");

$oran_tip_bul = bilgi("select oran_tip from oran_val_voleybol where id='$oranvalid'");

$oran_bilgi_toplu_bir = bilgi("select * from maclar_topluoranlar where spor_tipi='voleybol' and oran_val_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['id']."'");
$oran_bilgi_toplu_iki = bilgi("select * from maclar_topluoranlar where spor_tipi='voleybol' and oran_val_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['hesap_sahibi_id']."'");
$oran_bilgi_toplu_uc = bilgi("select * from maclar_topluoranlar where spor_tipi='voleybol' and oran_val_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['hesap_root_id']."'");

if($oran_bilgi_kendim['id']>0) {
	$oran_ver = $oran_bilgi_kendim['oran'];
	$kullan = 1;
} else if($oran_bilgi_altim['id']>0) {
	$oran_ver = $oran_bilgi_altim['oran'];
	$kullan = 1;
} else if($oran_bilgi_altiminalti['id']>0) {
	$oran_ver = $oran_bilgi_altiminalti['oran'];
	$kullan = 1;
}

if($oran_bilgi_toplu_bir['id']>0) {
	$oran_ver2 = $oran_bilgi_toplu_bir['oran'];
} else if($oran_bilgi_toplu_iki['id']>0) {
	$oran_ver2 = $oran_bilgi_toplu_iki['oran'];
} else if($oran_bilgi_toplu_uc['id']>0) {
	$oran_ver2 = $oran_bilgi_toplu_uc['oran'];
} else {
	$oran_ver2 = 0.00;
}

if($kullan==1) {
$donecek = $oran['oran']+$oran_ver+$oran_ver2;
} else {
$donecek = $oran['oran']+$oran_ver2;
}

if($donecek=="" || $donecek<1.01) { $donen = "-"; } else { $donen = nf($donecek); }
return $donen;
}

function oranbulbuz($id,$oranvalid) {
global $ub;
global $dizin;
$oran = bilgi("select oran,mac_db_id,oran_val_id from oranlar_buzhokeyi where mac_db_id='$id' and oran_val_id='$oranvalid'");

$oran_bilgi_kendim = bilgi("select * from maclar_oranlar where spor_tipi='buzhokeyi' and mac_db_id='".$id."' and oran_val_id='$oranvalid' and bayi_id='".$ub['id']."'");
$oran_bilgi_altim = bilgi("select * from maclar_oranlar where spor_tipi='buzhokeyi' and mac_db_id='".$id."' and oran_val_id='$oranvalid' and bayi_id='".$ub['hesap_sahibi_id']."'");
$oran_bilgi_altiminalti = bilgi("select * from maclar_oranlar where spor_tipi='buzhokeyi' and mac_db_id='".$id."' and oran_val_id='$oranvalid' and bayi_id='".$ub['hesap_root_id']."'");

$oran_tip_bul = bilgi("select oran_tip from oran_val_buzhokeyi where id='$oranvalid'");

$oran_bilgi_toplu_bir = bilgi("select * from maclar_topluoranlar where spor_tipi='buzhokeyi' and oran_val_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['id']."'");
$oran_bilgi_toplu_iki = bilgi("select * from maclar_topluoranlar where spor_tipi='buzhokeyi' and oran_val_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['hesap_sahibi_id']."'");
$oran_bilgi_toplu_uc = bilgi("select * from maclar_topluoranlar where spor_tipi='buzhokeyi' and oran_val_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['hesap_root_id']."'");

if($oran_bilgi_kendim['id']>0) {
	$oran_ver = $oran_bilgi_kendim['oran'];
	$kullan = 1;
} else if($oran_bilgi_altim['id']>0) {
	$oran_ver = $oran_bilgi_altim['oran'];
	$kullan = 1;
} else if($oran_bilgi_altiminalti['id']>0) {
	$oran_ver = $oran_bilgi_altiminalti['oran'];
	$kullan = 1;
}

if($oran_bilgi_toplu_bir['id']>0) {
	$oran_ver2 = $oran_bilgi_toplu_bir['oran'];
} else if($oran_bilgi_toplu_iki['id']>0) {
	$oran_ver2 = $oran_bilgi_toplu_iki['oran'];
} else if($oran_bilgi_toplu_uc['id']>0) {
	$oran_ver2 = $oran_bilgi_toplu_uc['oran'];
} else {
	$oran_ver2 = 0.00;
}

if($kullan==1) {
$donecek = $oran['oran']+$oran_ver+$oran_ver2;
} else {
$donecek = $oran['oran']+$oran_ver2;
}

if($donecek=="" || $donecek<1.01) { $donen = "-"; } else { $donen = nf($donecek); }
return $donen;
}

function oranbulh($id,$oranvalid) {
global $ub;
global $dizin;
$oran = bilgi("select oran,mac_db_id,oran_val_id from oranlar_hentbol where mac_db_id='$id' and oran_val_id='$oranvalid'");

$oran_bilgi_kendim = bilgi("select * from maclar_oranlar where spor_tipi='hentbol' and mac_db_id='".$id."' and oran_val_id='$oranvalid' and bayi_id='".$ub['id']."'");
$oran_bilgi_altim = bilgi("select * from maclar_oranlar where spor_tipi='hentbol' and mac_db_id='".$id."' and oran_val_id='$oranvalid' and bayi_id='".$ub['hesap_sahibi_id']."'");
$oran_bilgi_altiminalti = bilgi("select * from maclar_oranlar where spor_tipi='hentbol' and mac_db_id='".$id."' and oran_val_id='$oranvalid' and bayi_id='".$ub['hesap_root_id']."'");

$oran_tip_bul = bilgi("select oran_tip from oran_val_hentbol where id='$oranvalid'");

$oran_bilgi_toplu_bir = bilgi("select * from maclar_topluoranlar where spor_tipi='hentbol' and oran_val_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['id']."'");
$oran_bilgi_toplu_iki = bilgi("select * from maclar_topluoranlar where spor_tipi='hentbol' and oran_val_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['hesap_sahibi_id']."'");
$oran_bilgi_toplu_uc = bilgi("select * from maclar_topluoranlar where spor_tipi='hentbol' and oran_val_id='".$oran_tip_bul['oran_tip']."' and bayi_id='".$ub['hesap_root_id']."'");

if($oran_bilgi_kendim['id']>0) {
	$oran_ver = $oran_bilgi_kendim['oran'];
	$kullan = 1;
} else if($oran_bilgi_altim['id']>0) {
	$oran_ver = $oran_bilgi_altim['oran'];
	$kullan = 1;
} else if($oran_bilgi_altiminalti['id']>0) {
	$oran_ver = $oran_bilgi_altiminalti['oran'];
	$kullan = 1;
}

if($oran_bilgi_toplu_bir['id']>0) {
	$oran_ver2 = $oran_bilgi_toplu_bir['oran'];
} else if($oran_bilgi_toplu_iki['id']>0) {
	$oran_ver2 = $oran_bilgi_toplu_iki['oran'];
} else if($oran_bilgi_toplu_uc['id']>0) {
	$oran_ver2 = $oran_bilgi_toplu_uc['oran'];
} else {
	$oran_ver2 = 0.00;
}

if($kullan==1) {
$donecek = $oran['oran']+$oran_ver+$oran_ver2;
} else {
$donecek = $oran['oran']+$oran_ver2;
}

if($donecek=="" || $donecek<1.01) { $donen = "-"; } else { $donen = nf($donecek); }
return $donen;
}

function toplam_oran($id) {
return sed_sql_numrows(sed_sql_query("select mac_db_id from oranlar where mac_db_id='$id'"));	
}
function kupa_isim_temizle($str) {
$o = array(''.date("Y").'-'.date("Y",strtotime("+1 year")).'',''.date("Y").'',''.date("Y",strtotime("-1 year")).'','-');
$s = array('','','','');
return substr(str_replace($o,$s,$str),0,50);
}


function codekupon($str) { return sifrelemanti($str); } 
function encodekupon($str) { return sifrecozmanti($str); }
function codekupon2($str){
$str2 = base64_encode(gzcompress(serialize($str)));
return str_replace(array("+","/"),array("rakip","rivo"),$str2);
}
function encodekupon2($str){
$str2 = str_replace(array("rakip","rivo"),array("+","/"),$str);
return unserialize(gzuncompress(base64_decode($str2)));
}
function idcode($str) { return md5($str); }

function sifrelemanti($value) {
  $key = 'oplkjmnchnbmvkjhgdhsnb45362512214098****';
  $iv = @mcrypt_create_iv(
   @mcrypt_get_iv_size(@MCRYPT_RIJNDAEL_128, @MCRYPT_MODE_CBC),
   @MCRYPT_DEV_URANDOM
  );

  $encrypted = base64_encode(
   $iv .
   @mcrypt_encrypt(
    @MCRYPT_RIJNDAEL_128,
    hash('sha256', $key, true),
    $value,
    @MCRYPT_MODE_CBC,
    $iv
   )
  );
  return str_replace(array('+', '/'), array('-', '_'), $encrypted);
 }
 
 /*function sifrecozmanti($key, $payload) {
  $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
  $encrypted = openssl_encrypt($payload, 'aes-256-cbc', $key, 0, $iv);
  return base64_encode($encrypted . '::' . $iv);
}*/
 
 function sifrecozmanti($value) { 
  $key = 'oplkjmnchnbmvkjhgdhsnb45362512214098****';
  $data = base64_decode(str_replace(array('-', '_'), array('+', '/'), $value));
  $iv = substr($data, 0, @mcrypt_get_iv_size(@MCRYPT_RIJNDAEL_128, @MCRYPT_MODE_CBC));

  $decrypted = rtrim(
   @mcrypt_decrypt(
    @MCRYPT_RIJNDAEL_128,
    hash('sha256', $key, true),
    substr($data, @mcrypt_get_iv_size(@MCRYPT_RIJNDAEL_128, @MCRYPT_MODE_CBC)),
    @MCRYPT_MODE_CBC,
    $iv
   ),
   "\0"
  );
  return $decrypted;
 }
 
 /*function sifrelemanti($key, $garble) {
    list($encrypted_data, $iv) = explode('::', base64_decode($garble), 2);
    return openssl_decrypt($encrypted_data, 'aes-256-cbc', $key, 0, $iv);
}*/


function duellomu($macid,$tur)
{  
	$sor = sed_sql_query("select * from program where kupa_isim like '%Duello%' and  id='$macid'");
	$toplammac = sed_sql_numrows($sor);
	if($toplammac>0) { 
	
	return "Duello"; 
	
	}
	else
		return $tur; 
		

}


function maxkuponkontrol($session_id,$maxsatir) {
$toplammac = sed_sql_numrows(sed_sql_query("select * from kupon where session_id='$session_id'"));
if($toplammac==$maxsatir) { die("5"); }
}
function kuponda_ayni_kontrol($ev_takim,$konuk_takim,$id) {
global $session_id;
$kontrol = sed_sql_query("select ev_takim,konuk_takim,session_id,mac_db_id from kupon where (ev_takim like '%$ev_takim%' and konuk_takim like '%$konuk_takim%') and session_id='$session_id' and mac_db_id!='$id'");
if(sed_sql_numrows($kontrol)>0) {
	die("124");
}	
}

function kuponda_ayni_kontrolsanal($ev_takim,$konuk_takim,$id) {
global $session_id;
$kontrol = sed_sql_query("select ev_takim,konuk_takim,session_id,mac_db_id from kupongecicisanal where (ev_takim like '%$ev_takim%' or konuk_takim like '%$konuk_takim%') and session_id='$session_id' and mac_db_id!='$id'");
if(sed_sql_numrows($kontrol)>0) {
	die("124");
}	
}

function surekli_aski_durum($eventid) {
global $ub;
global $ayar;
global $dizin;


$bilgisi = bilgi("select suresiz,eventid,gelecek,dakika,devre,gol,isibitti from canli_maclar where eventid='$eventid'");
$suan = time();
$fark = abs($suan-$bilgisi['gol']);

if($bilgisi['isibitti']=="1") {
$donen = "1";
} else
if($fark<60) {
$donen = "1";
} else
if($bilgisi['gelecek']=="1" && $ayar['canlibaslamakupon']!=1) {
$donen = "1";
} else
if(($bilgisi['suresiz']=="1") || ($ub['canli_baslamadan']=="0" && $bilgisi['gelecek']=="1") || (is_numeric($bilgisi['dakika']) && $bilgisi['dakika']>userayar('canli_yayindan_kaldir'))) { 
$donen = "1"; 
} else
if(($bilgisi['devre']=="İlk Yarı" || $bilgisi['devre']=="1. Yarı") && is_numeric($bilgisi['dakika']) && $bilgisi['dakika']>userayar('canli_ilkyari_yayindan_kaldir')) {
$donen = "1";
} else
if((($bilgisi['devre']=="İkinci Yarı" || $bilgisi['devre']=="2. Yarı") || $bilgisi['devre']=="Devre Arası") && is_numeric($bilgisi['dakika']) && $bilgisi['dakika']>userayar('canli_yayindan_kaldir')) {
$donen = "1";
} else
if(file_exists("".$dizin."/".$ub['id']."-".$eventid."-surekliaski.canli")) {
$donen = "1"; 
} else
if(file_exists("".$dizin."/".$ub['hesap_sahibi_id']."-".$eventid."-surekliaski.canli")) {
$donen = "1"; 
} else
if(file_exists("".$dizin."/".$ub['hesap_root_id']."-".$eventid."-surekliaski.canli")) {
$donen = "1"; 
} else {
$donen = "0"; 
}
return $donen;
}

function benimbayilerimkasa($id) {
$sor = sed_sql_query("select hesap_sahibi_id,id from kullanici where hesap_sahibi_id='$id' and root='0'");
while($row=sed_sql_fetcharray($sor)) {
$list .= "$row[id],";
}
if($list=="") { $listele = $id; } else { $listele = "".$list.",".$id.""; }
return str_replace(",,",",","$listele");
}

function benimbayilerim($id) {
$sor = sed_sql_query("select hesap_sahibi_id,id from kullanici where hesap_sahibi_id='$id'");
while($row=sed_sql_fetcharray($sor)) {
$list .= "$row[id],";
$kontrol2 = sed_sql_query("select hesap_sahibi_id,id from kullanici where hesap_sahibi_id='$row[id]'");
if(sed_sql_numrows($kontrol2)>0) {
while($row2=sed_sql_fetcharray($kontrol2)) {
$list .= "$row2[id],";
$kontrol3 = sed_sql_query("select hesap_sahibi_id,id from kullanici where hesap_sahibi_id='$row2[id]'");
if(sed_sql_numrows($kontrol3)>0) {
while($row3=sed_sql_fetcharray($kontrol3)) {
$list .= "$row3[id],";
$kontrol4 = sed_sql_query("select hesap_sahibi_id,id from kullanici where hesap_sahibi_id='$row3[id]'");
if(sed_sql_numrows($kontrol4)>0) {
while($row4=sed_sql_fetcharray($kontrol4)) {
$list .= "$row4[id],";
$kontrol5 = sed_sql_query("select hesap_sahibi_id,id from kullanici where hesap_sahibi_id='$row4[id]'");
if(sed_sql_numrows($kontrol5)>0) {
while($row5=sed_sql_fetcharray($kontrol5)) {
$list .= "$row5[id],";
}
}
}
}
}
}
}
}
}
if($list=="") { $listele = $id; } else { $listele = "".$list.",".$id.""; }
return str_replace(",,",",","$listele");
}

function basla_time($id) {
$bol = explode("-",$id);
$donen = mktime(0,0,0,$bol[1],$bol[0],$bol[2]);
return $donen;
}
function bitir_time($id) {
$bol = explode("-",$id);
$donen = mktime(23,59,59,$bol[1],$bol[0],$bol[2]);
return $donen;
}
function durumnedir($id) {
	if($id=="1") { $donen = "".getTranslation('durumnedir1').""; } else
	if($id=="2") { $donen = "".getTranslation('durumnedir2').""; } else
	if($id=="3") { $donen = "".getTranslation('durumnedir3').""; } else
	if($id=="4") { $donen = "".getTranslation('durumnedir4').""; }
	return $donen;
}
function yuzde($a,$b){
	if(empty($a) || empty($b)) { $donecek = "0"; } else { 
    $c = $a / 100; 
	$donecek = "%".nf($b/$c)."";
	}
    return $donecek;
  } 
function users_baslik() {
global $ub;
if($ub['sahip']=="1") { $donecek = "Super Admin"; } else
if($ub['alt_alt_durum']>0) { $donecek = "Admin"; } else
if($ub['alt_durum']>0) { $donecek = "Bayi"; } else
if($ub['wkyetki']=="1") { $donecek = "Web Kullanıcı"; }
return $donecek;	
}
function hesap_tipi($id) {
$userbilgi = bilgi("select * from kullanici where id='$id'");
if($userbilgi['id']=="1") { $donen = "Sistem Sahibi"; } else
if($userbilgi['hesap_root_root_id']=="") { $donen = "Patron Hesabı"; } else
if($userbilgi['wkyetki']=="3") { $donen = "Müşteri"; } else
if($userbilgi['wkyetki']=="1") { $donen = "Süper Bayi"; } else
if($userbilgi['wkyetki']=="2") { $donen = "Bayi"; } else
if($userbilgi['alt_durum']>0 && $userbilgi['alt_alt_durum']<1) { $donen = "Admin"; } else
if($userbilgi['alt_alt_durum']>0 && $userbilgi['sahip']<1) { $donen = "Super Admin"; } else
if($userbilgi['sahip']>0) { $donen = "Joker Admin"; }
return $donen;
}
function bayidurumdegis($id,$durum) {
$altuyeleri = sed_sql_query("select * from kullanici where hesap_sahibi_id='$id'");
while($row=sed_sql_fetcharray($altuyeleri)) {
$rand = time();
sed_sql_query("update kullanici set durum='$durum' where id='$row[id]'");
$kontrol = sed_sql_query("select * from kullanici where hesap_sahibi_id='$row[id]'");
while($ass=sed_sql_fetcharray($kontrol)) {
bayidurumdegis($ass['id'],$durum);
}
}
sed_sql_query("update kullanici set durum='$durum' where id='$id'");
}

function uyelerisil($id) {
$altuyeleri = sed_sql_query("select * from kullanici where hesap_sahibi_id='$id'");
while($row=sed_sql_fetcharray($altuyeleri)) {
$rand = time();
sed_sql_query("update kullanici set root='1',silinme_tarihi='".time()."' where id='$row[id]'");
$kontrol = sed_sql_query("select * from kullanici where hesap_sahibi_id='$row[id]'");
while($ass=sed_sql_fetcharray($kontrol)) {
uyelerisil($ass['id']);
}
}
$bilgisi = bilgi("select * from kullanici where id='$id'");
$rand = time();
sed_sql_query("update kullanici set root='1',silinme_tarihi='".time()."' where id='$bilgisi[id]'");
}

function uyelerigerial($id) {
$altuyeleri = sed_sql_query("select * from kullanici where hesap_sahibi_id='$id'");
while($row=sed_sql_fetcharray($altuyeleri)) {
$rand = time();
sed_sql_query("update kullanici set root='0',silinme_tarihi='' where id='$row[id]'");
$kontrol = sed_sql_query("select * from kullanici where hesap_sahibi_id='$row[id]'");
while($ass=sed_sql_fetcharray($kontrol)) {
uyelerigerial($ass['id']);
}
}
$bilgisi = bilgi("select * from kullanici where id='$id'");
$rand = time();
sed_sql_query("update kullanici set root='0',silinme_tarihi='' where id='$bilgisi[id]'");
}

function rebuild($id) {

if(file_exists("caches/hesap_sahibi_id_".$id.".xml")) {
unlink("caches/hesap_sahibi_id_".$id.".xml");
benimbayilerim($id);
}

}

function hesap_hareket($tip,$username,$uid,$tutar,$aciklama) {
global $ub;
$uidbul = bilgi("select * from kullanici where id='$uid'");
if($tip=="ekle") {
	sed_sql_query("update kullanici set bakiye=bakiye+$tutar where id='$uid'");
} else
if($tip=="cikar") {
	
	sed_sql_query("update kullanici set bakiye=bakiye-$tutar where id='$uid'");
}
sed_sql_query("insert into hesap_hareket (id,user_id,username,tip,tutar,aciklama,islemi_yapan,zaman,onceki_tutar) values ('','$uid','$username','$tip','$tutar','$aciklama','$ub[username]','".time()."','$uidbul[bakiye]')");	
}


function hesap_hareketweb($tip,$username,$uid,$kendiid,$tutar,$aciklama) {
global $ub;
$uidbul = bilgi("select * from kullanici where id='$uid'");
if($tip=="ekle") {
	sed_sql_query("update kullanici set bakiye=bakiye+$tutar where id='$uid'");
	sed_sql_query("update kullanici set bakiye=bakiye-$tutar where id='$kendiid'");
} else if($tip=="cikar") {
	sed_sql_query("update kullanici set bakiye=bakiye-$tutar where id='$uid'");
	sed_sql_query("update kullanici set bakiye=bakiye+$tutar where id='$kendiid'");
}
sed_sql_query("insert into hesap_hareket (id,user_id,username,tip,tutar,aciklama,islemi_yapan,zaman,onceki_tutar) values ('','$uid','$username','$tip','$tutar','$aciklama','$ub[username]','".time()."','$uidbul[bakiye]')");	
}

function n($str) { return number_format($str,0,".","."); }
function carpan($yuzde) {
	$satir = str_replace('-','',strlen($yuzde));
	if($satir==1) {
		$donen = "0.0".$yuzde."";
	} else {
		$donen = "0.".$yuzde."";
	}
	return $donen;
}

function userayar($tip) {
global $ayar;
global $ub;
if($tip=="canlifutbol") {
	if($ub['ayar_sekil']=="1") { $donen = $ayar['canlifutbol']; } else if($ub['ayar_sekil']=="2") { $donen = $ub['canlifutbol']; }
} else if($tip=="basketbol") {
	if($ub['ayar_sekil']=="1") { $donen = $ayar['basketbol']; } else if($ub['ayar_sekil']=="2") { $donen = $ub['basketbol']; }
} else if($tip=="tenis") {
	if($ub['ayar_sekil']=="1") { $donen = $ayar['tenis']; } else if($ub['ayar_sekil']=="2") { $donen = $ub['tenis']; }
} else if($tip=="voleybol") {
	if($ub['ayar_sekil']=="1") { $donen = $ayar['voleybol']; } else if($ub['ayar_sekil']=="2") { $donen = $ub['voleybol']; }
} else if($tip=="buzhokeyi") {
	if($ub['ayar_sekil']=="1") { $donen = $ayar['buzhokeyi']; } else if($ub['ayar_sekil']=="2") { $donen = $ub['buzhokeyi']; }
} else if($tip=="masatenisi") {
	if($ub['ayar_sekil']=="1") { $donen = $ayar['masatenisi']; } else if($ub['ayar_sekil']=="2") { $donen = $ub['masatenisi']; }
} else if($tip=="rugby") {
	if($ub['ayar_sekil']=="1") { $donen = $ayar['rugby']; } else if($ub['ayar_sekil']=="2") { $donen = $ub['rugby']; }
} else if($tip=="rulet_oynama") {
	if($ub['ayar_sekil']=="1") { $donen = $ayar['rulet_oynama']; } else if($ub['ayar_sekil']=="2") { $donen = $ub['rulet_oynama']; }
} else if($tip=="sistemkapat") {
	$donen = $ayar['sistemkapat'];
} else if($tip=="kuponalim") {
	if($ub['ayar_sekil']=="1") { $donen = $ayar['kuponalim']; } else if($ub['ayar_sekil']=="2") { $donen = $ub['kuponalim']; }
} else if($tip=="canlibasketbol") {
	if($ub['ayar_sekil']=="1") { $donen = $ayar['canlibasketbol']; } else if($ub['ayar_sekil']=="2") { $donen = $ub['canlibasketbol']; }
} else if($tip=="canlitenis") {
	if($ub['ayar_sekil']=="1") { $donen = $ayar['canlitenis']; } else if($ub['ayar_sekil']=="2") { $donen = $ub['canlitenis']; }
} else if($tip=="canlivoleybol") {
	if($ub['ayar_sekil']=="1") { $donen = $ayar['canlivoleybol']; } else if($ub['ayar_sekil']=="2") { $donen = $ub['canlivoleybol']; }
} else if($tip=="canlibuzhokeyi") {
	if($ub['ayar_sekil']=="1") { $donen = $ayar['canlibuzhokeyi']; } else if($ub['ayar_sekil']=="2") { $donen = $ub['canlibuzhokeyi']; }
} else if($tip=="canlimasatenisi") {
	if($ub['ayar_sekil']=="1") { $donen = $ayar['canlimasatenisi']; } else if($ub['ayar_sekil']=="2") { $donen = $ub['canlimasatenisi']; }
} else if($tip=="casino_yetki") {
	if($ub['ayar_sekil']=="1") { $donen = $ayar['casino_yetki']; } else if($ub['ayar_sekil']=="2") { $donen = $ub['casino_yetki']; }
} else if($tip=="casino_basmaca") {
	$donen = $ayar['casino_basmaca'];
} else if($tip=="casino_basmaca_seviye") {
	$donen = $ayar['casino_basmaca_seviye'];
} else if($tip=="casino_basmaca_maxoran") {
	$donen = $ayar['casino_basmaca_maxoran'];
} else if($tip=="casino_poker") {
	$donen = $ayar['casino_poker'];
} else if($tip=="casino_poker_seviye") {
	$donen = $ayar['casino_poker_seviye'];
} else if($tip=="casino_poker_maxoran") {
	$donen = $ayar['casino_poker_maxoran'];
} else if($tip=="casino_bakara") {
	$donen = $ayar['casino_bakara'];
} else if($tip=="casino_bakara_seviye") {
	$donen = $ayar['casino_bakara_seviye'];
} else if($tip=="casino_bakara_maxoran") {
	$donen = $ayar['casino_bakara_maxoran'];
} else if($tip=="casino_carkifelek") {
	$donen = $ayar['casino_carkifelek'];
} else if($tip=="casino_carkifelek_seviye") {
	$donen = $ayar['casino_carkifelek_seviye'];
} else if($tip=="casino_carkifelek_maxoran") {
	$donen = $ayar['casino_carkifelek_maxoran'];
} else if($tip=="casino_zar") {
	$donen = $ayar['casino_zar'];
} else if($tip=="casino_zar_seviye") {
	$donen = $ayar['casino_zar_seviye'];
} else if($tip=="casino_zar_maxoran") {
	$donen = $ayar['casino_zar_maxoran'];
} else if($tip=="casino_poker6") {
	$donen = $ayar['casino_poker6'];
} else if($tip=="casino_poker6_seviye") {
	$donen = $ayar['casino_poker6_seviye'];
} else if($tip=="casino_poker6_maxoran") {
	$donen = $ayar['casino_poker6_maxoran'];
} else if($tip=="casino_loto5") {
	$donen = $ayar['casino_loto5'];
} else if($tip=="casino_loto5_seviye") {
	$donen = $ayar['casino_loto5_seviye'];
} else if($tip=="casino_loto5_maxoran") {
	$donen = $ayar['casino_loto5_maxoran'];
} else if($tip=="casino_loto6") {
	$donen = $ayar['casino_loto6'];
} else if($tip=="casino_loto6_seviye") {
	$donen = $ayar['casino_loto6_seviye'];
} else if($tip=="casino_loto6_maxoran") {
	$donen = $ayar['casino_loto6_maxoran'];
} else if($tip=="casino_loto7") {
	$donen = $ayar['casino_loto7'];
} else if($tip=="casino_loto7_seviye") {
	$donen = $ayar['casino_loto7_seviye'];
} else if($tip=="casino_loto7_maxoran") {
	$donen = $ayar['casino_loto7_maxoran'];
} else if($tip=="casino_basmaca_maxbahis") {
	$donen = $ayar['casino_basmaca_maxbahis'];
} else if($tip=="casino_basmaca_minbahis") {
	$donen = $ayar['casino_basmaca_minbahis'];
} else if($tip=="casino_basmaca_maxkazanc") {
	$donen = $ayar['casino_basmaca_maxkazanc'];
} else if($tip=="casino_poker_maxbahis") {
	$donen = $ayar['casino_poker_maxbahis'];
} else if($tip=="casino_poker_minbahis") {
	$donen = $ayar['casino_poker_minbahis'];
} else if($tip=="casino_poker_maxkazanc") {
	$donen = $ayar['casino_poker_maxkazanc'];
} else if($tip=="casino_bakara_maxbahis") {
	$donen = $ayar['casino_bakara_maxbahis'];
} else if($tip=="casino_bakara_minbahis") {
	$donen = $ayar['casino_bakara_minbahis'];
} else if($tip=="casino_bakara_maxkazanc") {
	$donen = $ayar['casino_bakara_maxkazanc'];
} else if($tip=="casino_carkifelek_maxbahis") {
	$donen = $ayar['casino_carkifelek_maxbahis'];
} else if($tip=="casino_carkifelek_minbahis") {
	$donen = $ayar['casino_carkifelek_minbahis'];
} else if($tip=="casino_carkifelek_maxkazanc") {
	$donen = $ayar['casino_carkifelek_maxkazanc'];
} else if($tip=="casino_zar_maxbahis") {
	$donen = $ayar['casino_zar_maxbahis'];
} else if($tip=="casino_zar_minbahis") {
	$donen = $ayar['casino_zar_minbahis'];
} else if($tip=="casino_zar_maxkazanc") {
	$donen = $ayar['casino_zar_maxkazanc'];
} else if($tip=="casino_poker6_maxbahis") {
	$donen = $ayar['casino_poker6_maxbahis'];
} else if($tip=="casino_poker6_minbahis") {
	$donen = $ayar['casino_poker6_minbahis'];
} else if($tip=="casino_poker6_maxkazanc") {
	$donen = $ayar['casino_poker6_maxkazanc'];
} else if($tip=="casino_loto5_maxbahis") {
	$donen = $ayar['casino_loto5_maxbahis'];
} else if($tip=="casino_loto5_minbahis") {
	$donen = $ayar['casino_loto5_minbahis'];
} else if($tip=="casino_loto5_maxkazanc") {
	$donen = $ayar['casino_loto5_maxkazanc'];
} else if($tip=="casino_loto6_maxbahis") {
	$donen = $ayar['casino_loto6_maxbahis'];
} else if($tip=="casino_loto6_minbahis") {
	$donen = $ayar['casino_loto6_minbahis'];
} else if($tip=="casino_loto6_maxkazanc") {
	$donen = $ayar['casino_loto6_maxkazanc'];
} else if($tip=="casino_loto7_maxbahis") {
	$donen = $ayar['casino_loto7_maxbahis'];
} else if($tip=="casino_loto7_minbahis") {
	$donen = $ayar['casino_loto7_minbahis'];
} else if($tip=="casino_loto7_maxkazanc") {
	$donen = $ayar['casino_loto7_maxkazanc'];
} else if($tip=="canlifutbolkademe") {
	$donen = $ayar['canlifutbolkademe'];
} else if($tip=="canlibasketbolkademe") {
	$donen = $ayar['canlibasketbolkademe'];
} else if($tip=="canliteniskademe") {
	$donen = $ayar['canliteniskademe'];
} else if($tip=="canlivoleybolkademe") {
	$donen = $ayar['canlivoleybolkademe'];
} else if($tip=="canlibuzhokeyikademe") {
	$donen = $ayar['canlibuzhokeyikademe'];
} else if($tip=="canlimasateniskademe") {
	$donen = $ayar['canlimasateniskademe'];
} else if($tip=="canli_ilkyari_yayindan_kaldir") {
	if($ub['ayar_sekil']=="1") { $donen = $ayar['canli_ilkyari_yayindan_kaldir']; } else if($ub['ayar_sekil']=="2") { $donen = $ub['canli_ilkyari_yayindan_kaldir']; }
} else if($tip=="canli_yayindan_kaldir") {
	if($ub['ayar_sekil']=="1") { $donen = $ayar['canli_yayindan_kaldir']; } else if($ub['ayar_sekil']=="2") { $donen = $ub['canli_yayindan_kaldir']; }
} else if($tip=="orankorumamaxoran") {
	if($ub['ayar_sekil']=="1") { $donen = $ayar['orankorumamaxoran']; } else if($ub['ayar_sekil']=="2") { $donen = $ub['orankorumamaxoran']; }
} else if($tip=="site_adi") {
	if($ub['ayar_sekil']=="1") { $donen = $ayar['site_adi']; } else if($ub['ayar_sekil']=="2") { $donen = $ub['site_adi']; }
} else if($tip=="rulet_yetki") {
	if($ub['ayar_sekil']=="1") { $donen = $ayar['rulet_yetki']; } else if($ub['ayar_sekil']=="2") { $donen = $ub['rulet_yetki']; }
} else if($tip=="futbolmbs") {
	if($ub['ayar_sekil']=="1") { $donen = $ayar['futbolmbs']; } else if($ub['ayar_sekil']=="2") { $donen = $ub['futbolmbs']; }
} else if($tip=="basketmbs") {
	if($ub['ayar_sekil']=="1") { $donen = $ayar['basketmbs']; } else if($ub['ayar_sekil']=="2") { $donen = $ub['basketmbs']; }
} else if($tip=="tenismbs") {
	if($ub['ayar_sekil']=="1") { $donen = $ayar['tenismbs']; } else if($ub['ayar_sekil']=="2") { $donen = $ub['tenismbs']; }
} else if($tip=="voleybolmbs") {
	if($ub['ayar_sekil']=="1") { $donen = $ayar['voleybolmbs']; } else if($ub['ayar_sekil']=="2") { $donen = $ub['voleybolmbs']; }
} else if($tip=="buzhokeyimbs") {
	if($ub['ayar_sekil']=="1") { $donen = $ayar['buzhokeyimbs']; } else if($ub['ayar_sekil']=="2") { $donen = $ub['buzhokeyimbs']; }
} else if($tip=="masatenisimbs") {
	if($ub['ayar_sekil']=="1") { $donen = $ayar['masatenisimbs']; } else if($ub['ayar_sekil']=="2") { $donen = $ub['masatenisimbs']; }
} else if($tip=="rugbymbs") {
	if($ub['ayar_sekil']=="1") { $donen = $ayar['rugbymbs']; } else if($ub['ayar_sekil']=="2") { $donen = $ub['rugbymbs']; }
} else if($tip=="iptal_limit") {
	if($ub['ayar_sekil']=="1") { $donen = $ayar['iptal_limit']; } else if($ub['ayar_sekil']=="2") { $donen = $ub['iptal_limit']; }
} else if($tip=="iptal_sure") {
	if($ub['ayar_sekil']=="1") { $donen = $ayar['iptal_sure']; } else if($ub['ayar_sekil']=="2") { $donen = $ub['iptal_sure']; }
} else if($tip=="futbol") {
	$donen = $ayar['futbol'];
} else if($tip=="min_kupon_tutar") {
	if($ub['ayar_sekil']=="1") { $donen = $ayar['min_kupon_tutar']; } else if($ub['ayar_sekil']=="2") { $donen = $ub['min_kupon_tutar']; }
} else if($tip=="maxoran") {
	if($ub['ayar_sekil']=="1") { $donen = $ayar['maxoran']; } else if($ub['ayar_sekil']=="2") { $donen = $ub['maxoran']; }
} else if($tip=="macbasitutarbulten") {
	if($ub['ayar_sekil']=="1") { $donen = $ayar['macbasitutarbulten']; } else if($ub['ayar_sekil']=="2") { $donen = $ub['macbasitutarbulten']; }
} else if($tip=="macbasitutarcanli") {
	if($ub['ayar_sekil']=="1") { $donen = $ayar['macbasitutarcanli']; } else if($ub['ayar_sekil']=="2") { $donen = $ub['macbasitutarcanli']; }
} else if($tip=="email_adres") {
	$donen = $ayar['email_adres'];
} else if($tip=="canlifutbolmbs") {
	if($ub['ayar_sekil']=="1") { $donen = $ayar['canlifutbolmbs']; } else if($ub['ayar_sekil']=="2") { $donen = $ub['canlifutbolmbs']; }
} else if($tip=="canlibasketmbs") {
	if($ub['ayar_sekil']=="1") { $donen = $ayar['canlibasketmbs']; } else if($ub['ayar_sekil']=="2") { $donen = $ub['canlibasketmbs']; }
} else if($tip=="canlitenismbs") {
	if($ub['ayar_sekil']=="1") { $donen = $ayar['canlitenismbs']; } else if($ub['ayar_sekil']=="2") { $donen = $ub['canlitenismbs']; }
} else if($tip=="canlivoleybolmbs") {
	if($ub['ayar_sekil']=="1") { $donen = $ayar['canlivoleybolmbs']; } else if($ub['ayar_sekil']=="2") { $donen = $ub['canlivoleybolmbs']; }
} else if($tip=="canlibuzhokeyimbs") {
	if($ub['ayar_sekil']=="1") { $donen = $ayar['canlibuzhokeyimbs']; } else if($ub['ayar_sekil']=="2") { $donen = $ub['canlibuzhokeyimbs']; }
} else if($tip=="canlimasatenisimbs") {
	if($ub['ayar_sekil']=="1") { $donen = $ayar['canlimasatenisimbs']; } else if($ub['ayar_sekil']=="2") { $donen = $ub['canlimasatenisimbs']; }
} else if($tip=="max_satir") {
	if($ub['ayar_sekil']=="1") { $donen = $ayar['max_satir']; } else if($ub['ayar_sekil']=="2") { $donen = $ub['max_satir']; }
} else if($tip=="min_kupon_tutar") {
	if($ub['ayar_sekil']=="1") { $donen = $ayar['min_kupon_tutar']; } else if($ub['ayar_sekil']=="2") { $donen = $ub['min_kupon_tutar']; }
} else if($tip=="minoran") {
	if($ub['ayar_sekil']=="1") { $donen = $ayar['min_oran']; } else if($ub['ayar_sekil']=="2") { $donen = $ub['min_oran']; }
} else if($tip=="canli_sure") {
	if($ub['ayar_sekil']=="1") { $donen = $ayar['canli_sure']; } else if($ub['ayar_sekil']=="2") { $donen = $ub['canli_sure']; }
} else if($tip=="max_odeme") {
	if($ub['ayar_sekil']=="1") { $donen = $ayar['max_odeme']; } else if($ub['ayar_sekil']=="2") { $donen = $ub['max_odeme']; }
} else if($tip=="tekmac_max_tutar") {
	if($ub['ayar_sekil']=="1") { $donen = $ayar['tekmac_max_tutar']; } else if($ub['ayar_sekil']=="2") { $donen = $ub['tekmac_max_tutar']; }
} else if($tip=="aynikupon_max_tutar") {
	if($ub['ayar_sekil']=="1") { $donen = $ayar['aynikupon_max_tutar']; } else if($ub['ayar_sekil']=="2") { $donen = $ub['aynikupon_max_tutar']; }
} else if($tip=="canli_max_tutar") {
	$donen = $ayar['canli_max_tutar'];
} else if($tip=="aynikuponmax") {
	$donen = $ayar['aynikuponmax'];
} else if($tip=="basketboltip") {
	$donen = $ayar['basketboltip'];
} else if($tip=="wattsap") {
	$donen = $ayar['wattsap'];
} else if($tip=="ruletmin") {
	$donen = $ayar['ruletmin'];
} else if($tip=="ruletmax") {
	$donen = $ayar['ruletmax'];
} else if($tip=="ruletseans") {
	$donen = $ayar['ruletseans'];
} else if($tip=="ayar_id") {
	$donen = $ayar['ayar_id'];
} else if($tip=="sporbulten") {
	if($ub['ayar_sekil']=="1") { $donen = $ayar['sporbulten']; } else if($ub['ayar_sekil']=="2") { $donen = $ub['sporbulten']; }
} else if($tip=="sanal_mintutar") {
	$donen = $ayar['sanal_mintutar'];
} else if($tip=="sanal_maxtutar") {
	$donen = $ayar['sanal_maxtutar'];
} else if($tip=="sanal_mbs") {
	$donen = $ayar['sanal_mbs'];
} else if($tip=="sanal_minoran") {
	$donen = $ayar['sanal_minoran'];
} else if($tip=="sanal_maxoran") {
	$donen = $ayar['sanal_maxoran'];
} else if($tip=="sanal_futbol") {
	$donen = $ayar['sanal_futbol'];
} else if($tip=="sanal_futbolv2") {
	$donen = $ayar['sanal_futbolv2'];
} else if($tip=="sanal_sampiyonlar") {
	$donen = $ayar['sanal_sampiyonlar'];
} else if($tip=="sanal_dunya") {
	$donen = $ayar['sanal_dunya'];
} else if($tip=="sanal_avrupa") {
	$donen = $ayar['sanal_avrupa'];
} else if($tip=="sanal_basketbol") {
	$donen = $ayar['sanal_basketbol'];
} else if($tip=="sanal_atyarisi") {
	$donen = $ayar['sanal_atyarisi'];
} else if($tip=="sanal_kopek") {
	$donen = $ayar['sanal_kopek'];
}
return $donen;
}

function mbsdurum($dosya) {
$xml = simplexml_load_file($dosya);
$sabitmbs = $xml->sabitmbs;
return $sabitmbs;
}

function mbsver($id,$mbs,$ligid) {
global $ayar;
global $ub;
global $dizin;

$mbs_bilgi_kendim = bilgi("select * from maclar_mbs where spor_tipi='futbol' and mac_id='".$id."' and bayi_id='".$ub['id']."'");
$mbs_bilgi_altim = bilgi("select * from maclar_mbs where spor_tipi='futbol' and mac_id='".$id."' and bayi_id='".$ub['hesap_sahibi_id']."'");
$mbs_bilgi_altiminalti = bilgi("select * from maclar_mbs where spor_tipi='futbol' and mac_id='".$id."' and bayi_id='".$ub['hesap_root_id']."'");
$mbs_bilgi_altiminalti_2 = bilgi("select * from maclar_mbs where spor_tipi='futbol' and mac_id='".$id."' and bayi_id='".$ub['hesap_root_root_id']."'");

if($mbs_bilgi_kendim['id']>0) {
	$mbs_ver = $mbs_bilgi_kendim['mbs'];
} else if($mbs_bilgi_altim['id']>0) {
	$mbs_ver = $mbs_bilgi_altim['mbs'];
} else if($mbs_bilgi_altiminalti['id']>0) {
	$mbs_ver = $mbs_bilgi_altiminalti['mbs'];
} else if($mbs_bilgi_altiminalti_2['id']>0) {
	$mbs_ver = $mbs_bilgi_altiminalti_2['mbs'];
}

if($mbs_ver) {
$macdurum = $mbs_ver;
$macvar=1;
}

if($macvar && $macdurum!="" && $macdurum!="0") {
	$donen = $macdurum;
} else if(userayar('futbolmbs')!="0") {
	$donen = userayar('futbolmbs');
} else {
	$donen = $mbs;
}
return $donen;
}

function mbsverb($id,$mbs) {
global $ayar;
if(userayar('basketmbs')!="0") { $donen = userayar('basketmbs'); } else { $donen = $mbs; }
return $donen;	
}

function mbsvert($id,$mbs) {
global $ayar;
if(userayar('tenismbs')!="0") { $donen = userayar('tenismbs'); } else { $donen = $mbs; }
return $donen;	
}

function mbsverv($id,$mbs) {
global $ayar;
if(userayar('voleybolmbs')!="0") { $donen = userayar('voleybolmbs'); } else { $donen = $mbs; }
return $donen;	
}

function mbsverbuz($id,$mbs) {
global $ayar;
if(userayar('buzhokeyimbs')!="0") { $donen = userayar('buzhokeyimbs'); } else { $donen = $mbs; }
return $donen;	
}

function mbsvermasatenisi($id,$mbs) {
global $ayar;
if(userayar('masatenisimbs')!="0") { $donen = userayar('masatenisimbs'); } else { $donen = $mbs; }
return $donen;	
}

function mbsverbeyzbol($id,$mbs) {
global $ayar;
if(userayar('beyzbolmbs')!="0") { $donen = userayar('beyzbolmbs'); } else { $donen = $mbs; }
return $donen;	
}

function mbsverrugby($id,$mbs) {
global $ayar;
if(userayar('rugbymbs')!="0") { $donen = userayar('rugbymbs'); } else { $donen = $mbs; }
return $donen;	
}

function mbsverdovus($id,$mbs) {
global $ayar;
if(userayar('dovusmbs')!="0") { $donen = userayar('dovusmbs'); } else { $donen = $mbs; }
return $donen;	
}


function padla($str) {
if(strlen($str)<2) { $donen = "0".$str.""; } else { $donen = $str; }
return $donen;	
}

function canlidaoran($oran) {
$orani = $oran;
global $ub;
global $dizin;
global $ayar;

if(userayar('canlifutbolkademe')==1){
	if($orani > 55){
		$orani = 50;
	} else if($orani > 10){
		$orani = $orani - 3.50;
	} else if($orani > 5){
		$orani = $orani - 1.50;
	} else if($orani > 3){
		$orani = $orani - 0.30;
	} else if($orani > 2){
		$orani = $orani - 0.20;
	} else if($orani > 1.60 && $orani < 2){
		$orani = $orani - 0.20;
	} else {
		$orani = $orani;
	}
} else if(userayar('canlifutbolkademe')==2){
	if($orani > 55){
		$orani = 50;
	} else if($orani > 10){
		$orani = $orani - 4.20;
	} else if($orani > 5){
		$orani = $orani - 1.70;
	} else if($orani > 3){
		$orani = $orani - 0.50;
	} else if($orani > 2){
		$orani = $orani - 0.40;
	} else if($orani > 1.60 && $orani < 2){
		$orani = $orani - 0.30;
	} else if($orani > 1.30 && $orani < 1.60){
		$orani = $orani - 0.30;
	} else {
		$orani = $orani;
	}
} else if(userayar('canlifutbolkademe')==3){
	if($orani > 60){
		$orani = 60;
	} else if($orani > 10){
		$orani = $orani - 4.30;
	} else if($orani > 5){
		$orani = $orani - 1.80;
	} else if($orani > 3){
		$orani = $orani - 0.60;
	} else if($orani > 2){
		$orani = $orani - 0.50;
	} else if($orani < 1.30){
		$orani = $orani - 0.40;
	} else {
		$orani = $orani;
	}
} else {
	$orani = $orani;
}

if($orani>userayar('orankorumamaxoran')){
	$orani = userayar('orankorumamaxoran');
}

$doneni = number_format($orani,2,".","");

if($doneni<1.01) { $doneni = "-"; }
return $doneni;
}

function canlidaoranb($oran) {
$orani = $oran;
global $ub;
global $dizin;
global $ayar;

if(userayar('canlibasketbolkademe')==1){
	if($orani > 55){
		$orani = 50;
	} else if($orani > 10){
		$orani = $orani - 3.50;
	} else if($orani > 5){
		$orani = $orani - 1.50;
	} else if($orani > 3){
		$orani = $orani - 0.30;
	} else if($orani > 2){
		$orani = $orani - 0.20;
	} else if($orani > 1.60 && $orani < 2){
		$orani = $orani - 0.20;
	} else {
		$orani = $orani;
	}
} else if(userayar('canlibasketbolkademe')==2){
	if($orani > 55){
		$orani = 50;
	} else if($orani > 10){
		$orani = $orani - 4.20;
	} else if($orani > 5){
		$orani = $orani - 1.70;
	} else if($orani > 3){
		$orani = $orani - 0.50;
	} else if($orani > 2){
		$orani = $orani - 0.40;
	} else if($orani > 1.60 && $orani < 2){
		$orani = $orani - 0.30;
	} else if($orani > 1.30 && $orani < 1.60){
		$orani = $orani - 0.30;
	} else {
		$orani = $orani;
	}
} else if(userayar('canlibasketbolkademe')==3){
	if($orani > 60){
		$orani = 60;
	} else if($orani > 10){
		$orani = $orani - 4.30;
	} else if($orani > 5){
		$orani = $orani - 1.80;
	} else if($orani > 3){
		$orani = $orani - 0.60;
	} else if($orani > 2){
		$orani = $orani - 0.50;
	} else if($orani > 1.00 && $orani < 1.30){
		$orani = $orani - 0.40;
	} else {
		$orani = $orani;
	}
} else {
	$orani = $orani;
}

if($orani>userayar('orankorumamaxoran')){
	$orani = userayar('orankorumamaxoran');
}

$doneni = number_format($orani,2,".","");

if($doneni<1.01) { $doneni = "-"; }
return $doneni;
}

function casinodaoran($oran,$gameid) {
global $ub;
global $dizin;
global $ayar;

if($gameid==8){
$seviye_ver = userayar('casino_basmaca_seviye');
$maxodd_ver = userayar('casino_basmaca_maxoran');
} else if($gameid==5){
$seviye_ver = userayar('casino_poker_seviye');
$maxodd_ver = userayar('casino_poker_maxoran');
} else if($gameid==6){
$seviye_ver = userayar('casino_bakara_seviye');
$maxodd_ver = userayar('casino_bakara_maxoran');
} else if($gameid==7){
$seviye_ver = userayar('casino_carkifelek_seviye');
$maxodd_ver = userayar('casino_carkifelek_maxoran');
} else if($gameid==10){
$seviye_ver = userayar('casino_zar_seviye');
$maxodd_ver = userayar('casino_zar_maxoran');
} else if($gameid==12){
$seviye_ver = userayar('casino_poker6_seviye');
$maxodd_ver = userayar('casino_poker6_maxoran');
} else if($gameid==3){
$seviye_ver = userayar('casino_loto5_seviye');
$maxodd_ver = userayar('casino_loto5_maxoran');
} else if($gameid==9){
$seviye_ver = userayar('casino_loto6_seviye');
$maxodd_ver = userayar('casino_loto6_maxoran');
} else if($gameid==1){
$seviye_ver = userayar('casino_loto7_seviye');
$maxodd_ver = userayar('casino_loto7_maxoran');
}

$odd = (float)$oran;

if ($oran < 10) {
$fl = floor($oran);
$degisim = (float)$fl * $seviye_ver * 0.05;
} else if ($oran >= 10 && $oran <= 100) {
$fl = floor($oran / 10);
$degisim = (float)$fl * $seviye_ver * 1;
} else {
$fl = floor($oran / 100);
$degisim = (float)$fl * $seviye_ver * 5;
}

$oran = (float)$oran - $degisim;

if($oran>$maxodd_ver && $maxodd_ver>0){
$oran = $maxodd_ver;
}

if($oran<1){
$sayi_ver_hadi = $odd;
} else {
$sayi_ver_hadi = $oran;
}

$doneni = number_format($sayi_ver_hadi,2,".","");

if($doneni<1.01) { $doneni = "0"; }
return $doneni;
}

function canlidaorant($oran) {
$orani = $oran;
global $ub;
global $dizin;
global $ayar;

if(userayar('canliteniskademe')==1){
	if($orani > 55){
		$orani = 50;
	} else if($orani > 10){
		$orani = $orani - 3.50;
	} else if($orani > 5){
		$orani = $orani - 1.50;
	} else if($orani > 3){
		$orani = $orani - 0.30;
	} else if($orani > 2){
		$orani = $orani - 0.20;
	} else if($orani > 1.60 && $orani < 2){
		$orani = $orani - 0.20;
	} else {
		$orani = $orani;
	}
} else if(userayar('canliteniskademe')==2){
	if($orani > 55){
		$orani = 50;
	} else if($orani > 10){
		$orani = $orani - 4.20;
	} else if($orani > 5){
		$orani = $orani - 1.70;
	} else if($orani > 3){
		$orani = $orani - 0.50;
	} else if($orani > 2){
		$orani = $orani - 0.40;
	} else if($orani > 1.60 && $orani < 2){
		$orani = $orani - 0.30;
	} else if($orani > 1.30 && $orani < 1.60){
		$orani = $orani - 0.30;
	} else {
		$orani = $orani;
	}
} else if(userayar('canliteniskademe')==3){
	if($orani > 60){
		$orani = 60;
	} else if($orani > 10){
		$orani = $orani - 4.30;
	} else if($orani > 5){
		$orani = $orani - 1.80;
	} else if($orani > 3){
		$orani = $orani - 0.60;
	} else if($orani > 2){
		$orani = $orani - 0.50;
	} else if($orani > 1.00 && $orani < 1.30){
		$orani = $orani - 0.40;
	} else {
		$orani = $orani;
	}
} else {
	$orani = $orani;
}

if($orani>userayar('orankorumamaxoran')){
	$orani = userayar('orankorumamaxoran');
}

$doneni = number_format($orani,2,".","");

if($doneni<1.01) { $doneni = "-"; }
return $doneni;
}

function canlidaoranv($oran) {
$orani = $oran;
global $ub;
global $dizin;
global $ayar;

if(userayar('canlivoleybolkademe')==1){
	if($orani > 55){
		$orani = 50;
	} else if($orani > 10){
		$orani = $orani - 3.50;
	} else if($orani > 5){
		$orani = $orani - 1.50;
	} else if($orani > 3){
		$orani = $orani - 0.30;
	} else if($orani > 2){
		$orani = $orani - 0.20;
	} else if($orani > 1.60 && $orani < 2){
		$orani = $orani - 0.20;
	} else {
		$orani = $orani;
	}
} else if(userayar('canlivoleybolkademe')==2){
	if($orani > 55){
		$orani = 50;
	} else if($orani > 10){
		$orani = $orani - 4.20;
	} else if($orani > 5){
		$orani = $orani - 1.70;
	} else if($orani > 3){
		$orani = $orani - 0.50;
	} else if($orani > 2){
		$orani = $orani - 0.40;
	} else if($orani > 1.60 && $orani < 2){
		$orani = $orani - 0.30;
	} else if($orani > 1.30 && $orani < 1.60){
		$orani = $orani - 0.30;
	} else {
		$orani = $orani;
	}
} else if(userayar('canlivoleybolkademe')==3){
	if($orani > 60){
		$orani = 60;
	} else if($orani > 10){
		$orani = $orani - 4.30;
	} else if($orani > 5){
		$orani = $orani - 1.80;
	} else if($orani > 3){
		$orani = $orani - 0.60;
	} else if($orani > 2){
		$orani = $orani - 0.50;
	} else if($orani > 1.00 && $orani < 1.30){
		$orani = $orani - 0.40;
	} else {
		$orani = $orani;
	}
} else {
	$orani = $orani;
}

if($orani>userayar('orankorumamaxoran')){
	$orani = userayar('orankorumamaxoran');
}

$doneni = number_format($orani,2,".","");

if($doneni<1.01) { $doneni = "-"; }
return $doneni;
}

function canlidaoranbuz($oran) {
$orani = $oran;
global $ub;
global $dizin;
global $ayar;

if(userayar('canlibuzhokeyikademe')==1){
	if($orani > 55){
		$orani = 50;
	} else if($orani > 10){
		$orani = $orani - 3.50;
	} else if($orani > 5){
		$orani = $orani - 1.50;
	} else if($orani > 3){
		$orani = $orani - 0.30;
	} else if($orani > 2){
		$orani = $orani - 0.20;
	} else if($orani > 1.60 && $orani < 2){
		$orani = $orani - 0.20;
	} else {
		$orani = $orani;
	}
} else if(userayar('canlibuzhokeyikademe')==2){
	if($orani > 55){
		$orani = 50;
	} else if($orani > 10){
		$orani = $orani - 4.20;
	} else if($orani > 5){
		$orani = $orani - 1.70;
	} else if($orani > 3){
		$orani = $orani - 0.50;
	} else if($orani > 2){
		$orani = $orani - 0.40;
	} else if($orani > 1.60 && $orani < 2){
		$orani = $orani - 0.30;
	} else if($orani > 1.30 && $orani < 1.60){
		$orani = $orani - 0.30;
	} else {
		$orani = $orani;
	}
} else if(userayar('canlibuzhokeyikademe')==3){
	if($orani > 60){
		$orani = 60;
	} else if($orani > 10){
		$orani = $orani - 4.30;
	} else if($orani > 5){
		$orani = $orani - 1.80;
	} else if($orani > 3){
		$orani = $orani - 0.60;
	} else if($orani > 2){
		$orani = $orani - 0.50;
	} else if($orani > 1.00 && $orani < 1.30){
		$orani = $orani - 0.40;
	} else {
		$orani = $orani;
	}
} else {
	$orani = $orani;
}

if($orani>userayar('orankorumamaxoran')){
	$orani = userayar('orankorumamaxoran');
}

$doneni = number_format($orani,2,".","");

if($doneni<1.01) { $doneni = "-"; }
return $doneni;
}

function canlidaoranmt($oran) {
$orani = $oran;
global $ub;
global $dizin;
global $ayar;

if(userayar('canlimasateniskademe')==1){
	if($orani > 55){
		$orani = 50;
	} else if($orani > 10){
		$orani = $orani - 3.50;
	} else if($orani > 5){
		$orani = $orani - 1.50;
	} else if($orani > 3){
		$orani = $orani - 0.30;
	} else if($orani > 2){
		$orani = $orani - 0.20;
	} else if($orani > 1.60 && $orani < 2){
		$orani = $orani - 0.20;
	} else {
		$orani = $orani;
	}
} else if(userayar('canlimasateniskademe')==2){
	if($orani > 55){
		$orani = 50;
	} else if($orani > 10){
		$orani = $orani - 4.20;
	} else if($orani > 5){
		$orani = $orani - 1.70;
	} else if($orani > 3){
		$orani = $orani - 0.50;
	} else if($orani > 2){
		$orani = $orani - 0.40;
	} else if($orani > 1.60 && $orani < 2){
		$orani = $orani - 0.30;
	} else if($orani > 1.30 && $orani < 1.60){
		$orani = $orani - 0.30;
	} else {
		$orani = $orani;
	}
} else if(userayar('canlimasateniskademe')==3){
	if($orani > 60){
		$orani = 60;
	} else if($orani > 10){
		$orani = $orani - 4.30;
	} else if($orani > 5){
		$orani = $orani - 1.80;
	} else if($orani > 3){
		$orani = $orani - 0.60;
	} else if($orani > 2){
		$orani = $orani - 0.50;
	} else if($orani > 1.00 && $orani < 1.30){
		$orani = $orani - 0.40;
	} else {
		$orani = $orani;
	}
} else {
	$orani = $orani;
}

if($orani>userayar('orankorumamaxoran')){
	$orani = userayar('orankorumamaxoran');
}

$doneni = number_format($orani,2,".","");

if($doneni<1.01) { $doneni = "-"; }
return $doneni;
}


function yukdurum($yukselis,$dusus) {
if($dusus==1) { $donen = "<font color=#F00 class='banayuk'>&#9660;</font>"; } else
if($yukselis==1) { $donen = "<font color=#a5d428 class='banayuk'>&#9650;</font>";
} else { 
$donen = ""; 
}
return $donen;
}

function canli_gizli_tipmi($id,$gelenid) {
$dosya = "".$gelenid."-canlibahis.xml";
if(file_exists("sistem/oranserver/".$dosya."")) {
$xml = simplexml_load_file("sistem/oranserver/".$dosya."");
$list = $xml->gizli_tips;
$bol = explode(",",$list);
if(in_array($id,$bol)) { $donen = ""; } else { $donen = "checked"; }
} else {
$donen = "checked";	
}
return $donen;
}

function canli_gizli_tipmi_tekmac($id,$gelenid,$eventid) {
$dosya = "".$gelenid."-".$eventid."-canlibahis.xml";
if(file_exists("sistem/oranserver/".$dosya."")) {
$xml = simplexml_load_file("sistem/oranserver/".$dosya."");
$list = $xml->gizli_tips;
$bol = explode(",",$list);
if(in_array($id,$bol)) { $donen = ""; } else { $donen = "checked"; }
} else {
$donen = "checked";	
}
return $donen;
}

function canli_gizli_tiplerim($eventid) {
global $ub;
global $dizin;

$mac_bilgi_kendim = sed_sql_query("select * from oyunlar_canli where spor_tipi='futbol' and bayi_id='".$ub['id']."'");
$mac_bilgi_altim = sed_sql_query("select * from oyunlar_canli where spor_tipi='futbol' and bayi_id='".$ub['hesap_sahibi_id']."'");
$mac_bilgi_altiminalti = sed_sql_query("select * from oyunlar_canli where spor_tipi='futbol' and bayi_id='".$ub['hesap_root_id']."'");
$mac_bilgi_kendim_toplam = sed_sql_numrows($mac_bilgi_kendim);
$mac_bilgi_altim_toplam = sed_sql_numrows($mac_bilgi_altim);
$mac_bilgi_altiminalti_toplam = sed_sql_numrows($mac_bilgi_altiminalti);

if($mac_bilgi_kendim_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_kendim)) {
if(!empty($row['tip_isim'])) {
$ekle .= "$row[tip_isim],";
}
}
$donecek = substr($ekle,0,-1);
} else if($mac_bilgi_altim_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_altim)) {
if(!empty($row['tip_isim'])) {
$ekle .= "$row[tip_isim],";
}
}
$donecek = substr($ekle,0,-1);
} else if($mac_bilgi_altiminalti_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_altiminalti)) {
if(!empty($row['tip_isim'])) {
$ekle .= "$row[tip_isim],";
}
}
$donecek = substr($ekle,0,-1);
} else {
$donecek = "";
}
return $donecek;	
}

function canli_gizli_tiplerimb($eventid) {
global $ub;
global $dizin;

$mac_bilgi_kendim = sed_sql_query("select * from oyunlar_canli where spor_tipi='basketbol' and bayi_id='".$ub['id']."'");
$mac_bilgi_altim = sed_sql_query("select * from oyunlar_canli where spor_tipi='basketbol' and bayi_id='".$ub['hesap_sahibi_id']."'");
$mac_bilgi_altiminalti = sed_sql_query("select * from oyunlar_canli where spor_tipi='basketbol' and bayi_id='".$ub['hesap_root_id']."'");
$mac_bilgi_kendim_toplam = sed_sql_numrows($mac_bilgi_kendim);
$mac_bilgi_altim_toplam = sed_sql_numrows($mac_bilgi_altim);
$mac_bilgi_altiminalti_toplam = sed_sql_numrows($mac_bilgi_altiminalti);

if($mac_bilgi_kendim_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_kendim)) {
if(!empty($row['tip_isim'])) {
$ekle .= "$row[tip_isim],";
}
}
$donecek = substr($ekle,0,-1);
} else if($mac_bilgi_altim_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_altim)) {
if(!empty($row['tip_isim'])) {
$ekle .= "$row[tip_isim],";
}
}
$donecek = substr($ekle,0,-1);
} else if($mac_bilgi_altiminalti_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_altiminalti)) {
if(!empty($row['tip_isim'])) {
$ekle .= "$row[tip_isim],";
}
}
$donecek = substr($ekle,0,-1);
} else {
$donecek = "";
}
return $donecek;	
}

function canli_gizli_tiplerimt($eventid) {
global $ub;
global $dizin;

$mac_bilgi_kendim = sed_sql_query("select * from oyunlar_canli where spor_tipi='tenis' and bayi_id='".$ub['id']."'");
$mac_bilgi_altim = sed_sql_query("select * from oyunlar_canli where spor_tipi='tenis' and bayi_id='".$ub['hesap_sahibi_id']."'");
$mac_bilgi_altiminalti = sed_sql_query("select * from oyunlar_canli where spor_tipi='tenis' and bayi_id='".$ub['hesap_root_id']."'");
$mac_bilgi_kendim_toplam = sed_sql_numrows($mac_bilgi_kendim);
$mac_bilgi_altim_toplam = sed_sql_numrows($mac_bilgi_altim);
$mac_bilgi_altiminalti_toplam = sed_sql_numrows($mac_bilgi_altiminalti);

if($mac_bilgi_kendim_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_kendim)) {
if(!empty($row['tip_isim'])) {
$ekle .= "$row[tip_isim],";
}
}
$donecek = substr($ekle,0,-1);
} else if($mac_bilgi_altim_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_altim)) {
if(!empty($row['tip_isim'])) {
$ekle .= "$row[tip_isim],";
}
}
$donecek = substr($ekle,0,-1);
} else if($mac_bilgi_altiminalti_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_altiminalti)) {
if(!empty($row['tip_isim'])) {
$ekle .= "$row[tip_isim],";
}
}
$donecek = substr($ekle,0,-1);
} else {
$donecek = "";
}
return $donecek;	
}

function canli_gizli_tiplerimv($eventid) {
global $ub;
global $dizin;

$mac_bilgi_kendim = sed_sql_query("select * from oyunlar_canli where spor_tipi='voleybol' and bayi_id='".$ub['id']."'");
$mac_bilgi_altim = sed_sql_query("select * from oyunlar_canli where spor_tipi='voleybol' and bayi_id='".$ub['hesap_sahibi_id']."'");
$mac_bilgi_altiminalti = sed_sql_query("select * from oyunlar_canli where spor_tipi='voleybol' and bayi_id='".$ub['hesap_root_id']."'");
$mac_bilgi_kendim_toplam = sed_sql_numrows($mac_bilgi_kendim);
$mac_bilgi_altim_toplam = sed_sql_numrows($mac_bilgi_altim);
$mac_bilgi_altiminalti_toplam = sed_sql_numrows($mac_bilgi_altiminalti);

if($mac_bilgi_kendim_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_kendim)) {
if(!empty($row['tip_isim'])) {
$ekle .= "$row[tip_isim],";
}
}
$donecek = substr($ekle,0,-1);
} else if($mac_bilgi_altim_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_altim)) {
if(!empty($row['tip_isim'])) {
$ekle .= "$row[tip_isim],";
}
}
$donecek = substr($ekle,0,-1);
} else if($mac_bilgi_altiminalti_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_altiminalti)) {
if(!empty($row['tip_isim'])) {
$ekle .= "$row[tip_isim],";
}
}
$donecek = substr($ekle,0,-1);
} else {
$donecek = "";
}
return $donecek;	
}

function canli_gizli_tiplerimbuz($eventid) {
global $ub;
global $dizin;

$mac_bilgi_kendim = sed_sql_query("select * from oyunlar_canli where spor_tipi='buzhokeyi' and bayi_id='".$ub['id']."'");
$mac_bilgi_altim = sed_sql_query("select * from oyunlar_canli where spor_tipi='buzhokeyi' and bayi_id='".$ub['hesap_sahibi_id']."'");
$mac_bilgi_altiminalti = sed_sql_query("select * from oyunlar_canli where spor_tipi='buzhokeyi' and bayi_id='".$ub['hesap_root_id']."'");
$mac_bilgi_kendim_toplam = sed_sql_numrows($mac_bilgi_kendim);
$mac_bilgi_altim_toplam = sed_sql_numrows($mac_bilgi_altim);
$mac_bilgi_altiminalti_toplam = sed_sql_numrows($mac_bilgi_altiminalti);

if($mac_bilgi_kendim_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_kendim)) {
if(!empty($row['tip_isim'])) {
$ekle .= "$row[tip_isim],";
}
}
$donecek = substr($ekle,0,-1);
} else if($mac_bilgi_altim_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_altim)) {
if(!empty($row['tip_isim'])) {
$ekle .= "$row[tip_isim],";
}
}
$donecek = substr($ekle,0,-1);
} else if($mac_bilgi_altiminalti_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_altiminalti)) {
if(!empty($row['tip_isim'])) {
$ekle .= "$row[tip_isim],";
}
}
$donecek = substr($ekle,0,-1);
} else {
$donecek = "";
}
return $donecek;	
}

function canli_sabit_oran_degisim($tip,$canlitipid,$gelenid) {
global $ub;

if(file_exists("sistem/oranserver/".$gelenid."-".$tip."-canlisabitoranlar.xml")) {
$xml = simplexml_load_file("sistem/oranserver/".$gelenid."-".$tip."-canlisabitoranlar.xml");
$toplam = count($xml->duzen);
for($i=0; $i<$toplam; $i++) {
$osatir_oran_tip = $xml->duzen[$i]->oran_tip;
$osatir_katsayi = (float)$xml->duzen[$i]->katsayi;
if($canlitipid==$osatir_oran_tip) { $donen = $osatir_katsayi; }
}	
} else {
$donen = "0.00";
}
return number_format($donen,2,".",".");	
}

function canli_sabit_oran_degisim_tekmac($tip,$canlitipid,$gelenid,$eventid) {
global $ub;
if(file_exists("sistem/oranserver/".$gelenid."-".$tip."-".$eventid."-canlisabitoranlar.xml")) {
$xml = simplexml_load_file("sistem/oranserver/".$gelenid."-".$tip."-".$eventid."-canlisabitoranlar.xml");
$toplam = count($xml->duzen);
for($i=0; $i<$toplam; $i++) {
$osatir_oran_tip = $xml->duzen[$i]->oran_tip;
$osatir_katsayi = (float)$xml->duzen[$i]->katsayi;
if($canlitipid==$osatir_oran_tip) { $donen = $osatir_katsayi; }
}	
} else {
$donen = "0.00";
}
return number_format($donen,2,".",".");	
}


function gizlicanlimaclist() {
global $ub;
global $dizin;

$mac_bilgi_kendim = sed_sql_query("select * from yasakcanli where spor_tipi='futbol' and bayi_id='".$ub['id']."'");
$mac_bilgi_altim = sed_sql_query("select * from yasakcanli where spor_tipi='futbol' and bayi_id='".$ub['hesap_sahibi_id']."'");
$mac_bilgi_altiminalti = sed_sql_query("select * from yasakcanli where spor_tipi='futbol' and bayi_id='".$ub['hesap_root_id']."'");
$mac_bilgi_kendim_toplam = sed_sql_numrows($mac_bilgi_kendim);
$mac_bilgi_altim_toplam = sed_sql_numrows($mac_bilgi_altim);
$mac_bilgi_altiminalti_toplam = sed_sql_numrows($mac_bilgi_altiminalti);

if($mac_bilgi_kendim_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_kendim)) {
if(!empty($row['eventid'])) {
$ekle .= "$row[eventid],";
}
}
$songizli = substr($ekle,0,-1);
$donen = "and eventid not in ($songizli)";
} else if($mac_bilgi_altim_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_altim)) {
if(!empty($row['eventid'])) {
$ekle .= "$row[eventid],";
}
}
$songizli = substr($ekle,0,-1);
$donen = "and eventid not in ($songizli)";
} else if($mac_bilgi_altiminalti_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_altiminalti)) {
if(!empty($row['eventid'])) {
$ekle .= "$row[eventid],";
}
}
$songizli = substr($ekle,0,-1);
$donen = "and eventid not in ($songizli)";
} else {
$donen = "";	
}
return $donen;	
}

function gizlicanlimaclistb() {
global $ub;
global $dizin;

$mac_bilgi_kendim = sed_sql_query("select * from yasakcanli where spor_tipi='basketbol' and bayi_id='".$ub['id']."'");
$mac_bilgi_altim = sed_sql_query("select * from yasakcanli where spor_tipi='basketbol' and bayi_id='".$ub['hesap_sahibi_id']."'");
$mac_bilgi_altiminalti = sed_sql_query("select * from yasakcanli where spor_tipi='basketbol' and bayi_id='".$ub['hesap_root_id']."'");
$mac_bilgi_kendim_toplam = sed_sql_numrows($mac_bilgi_kendim);
$mac_bilgi_altim_toplam = sed_sql_numrows($mac_bilgi_altim);
$mac_bilgi_altiminalti_toplam = sed_sql_numrows($mac_bilgi_altiminalti);

if($mac_bilgi_kendim_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_kendim)) {
if(!empty($row['eventid'])) {
$ekle .= "$row[eventid],";
}
}
$songizli = substr($ekle,0,-1);
$donen = "and eventid not in ($songizli)";
} else if($mac_bilgi_altim_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_altim)) {
if(!empty($row['eventid'])) {
$ekle .= "$row[eventid],";
}
}
$songizli = substr($ekle,0,-1);
$donen = "and eventid not in ($songizli)";
} else if($mac_bilgi_altiminalti_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_altiminalti)) {
if(!empty($row['eventid'])) {
$ekle .= "$row[eventid],";
}
}
$songizli = substr($ekle,0,-1);
$donen = "and eventid not in ($songizli)";
} else {
$donen = "";	
}
return $donen;	
}

function gizlicanlimaclistt() {
global $ub;
global $dizin;

$mac_bilgi_kendim = sed_sql_query("select * from yasakcanli where spor_tipi='tenis' and bayi_id='".$ub['id']."'");
$mac_bilgi_altim = sed_sql_query("select * from yasakcanli where spor_tipi='tenis' and bayi_id='".$ub['hesap_sahibi_id']."'");
$mac_bilgi_altiminalti = sed_sql_query("select * from yasakcanli where spor_tipi='tenis' and bayi_id='".$ub['hesap_root_id']."'");
$mac_bilgi_kendim_toplam = sed_sql_numrows($mac_bilgi_kendim);
$mac_bilgi_altim_toplam = sed_sql_numrows($mac_bilgi_altim);
$mac_bilgi_altiminalti_toplam = sed_sql_numrows($mac_bilgi_altiminalti);

if($mac_bilgi_kendim_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_kendim)) {
if(!empty($row['eventid'])) {
$ekle .= "$row[eventid],";
}
}
$songizli = substr($ekle,0,-1);
$donen = "and eventid not in ($songizli)";
} else if($mac_bilgi_altim_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_altim)) {
if(!empty($row['eventid'])) {
$ekle .= "$row[eventid],";
}
}
$songizli = substr($ekle,0,-1);
$donen = "and eventid not in ($songizli)";
} else if($mac_bilgi_altiminalti_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_altiminalti)) {
if(!empty($row['eventid'])) {
$ekle .= "$row[eventid],";
}
}
$songizli = substr($ekle,0,-1);
$donen = "and eventid not in ($songizli)";
} else {
$donen = "";	
}
return $donen;	
}

function gizlicanlimaclistv() {
global $ub;
global $dizin;

$mac_bilgi_kendim = sed_sql_query("select * from yasakcanli where spor_tipi='voleybol' and bayi_id='".$ub['id']."'");
$mac_bilgi_altim = sed_sql_query("select * from yasakcanli where spor_tipi='voleybol' and bayi_id='".$ub['hesap_sahibi_id']."'");
$mac_bilgi_altiminalti = sed_sql_query("select * from yasakcanli where spor_tipi='voleybol' and bayi_id='".$ub['hesap_root_id']."'");
$mac_bilgi_kendim_toplam = sed_sql_numrows($mac_bilgi_kendim);
$mac_bilgi_altim_toplam = sed_sql_numrows($mac_bilgi_altim);
$mac_bilgi_altiminalti_toplam = sed_sql_numrows($mac_bilgi_altiminalti);

if($mac_bilgi_kendim_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_kendim)) {
if(!empty($row['eventid'])) {
$ekle .= "$row[eventid],";
}
}
$songizli = substr($ekle,0,-1);
$donen = "and eventid not in ($songizli)";
} else if($mac_bilgi_altim_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_altim)) {
if(!empty($row['eventid'])) {
$ekle .= "$row[eventid],";
}
}
$songizli = substr($ekle,0,-1);
$donen = "and eventid not in ($songizli)";
} else if($mac_bilgi_altiminalti_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_altiminalti)) {
if(!empty($row['eventid'])) {
$ekle .= "$row[eventid],";
}
}
$songizli = substr($ekle,0,-1);
$donen = "and eventid not in ($songizli)";
} else {
$donen = "";	
}
return $donen;	
}

function gizlicanlimaclistbuz() {
global $ub;
global $dizin;

$mac_bilgi_kendim = sed_sql_query("select * from yasakcanli where spor_tipi='buzhokeyi' and bayi_id='".$ub['id']."'");
$mac_bilgi_altim = sed_sql_query("select * from yasakcanli where spor_tipi='buzhokeyi' and bayi_id='".$ub['hesap_sahibi_id']."'");
$mac_bilgi_altiminalti = sed_sql_query("select * from yasakcanli where spor_tipi='buzhokeyi' and bayi_id='".$ub['hesap_root_id']."'");
$mac_bilgi_kendim_toplam = sed_sql_numrows($mac_bilgi_kendim);
$mac_bilgi_altim_toplam = sed_sql_numrows($mac_bilgi_altim);
$mac_bilgi_altiminalti_toplam = sed_sql_numrows($mac_bilgi_altiminalti);

if($mac_bilgi_kendim_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_kendim)) {
if(!empty($row['eventid'])) {
$ekle .= "$row[eventid],";
}
}
$songizli = substr($ekle,0,-1);
$donen = "and eventid not in ($songizli)";
} else if($mac_bilgi_altim_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_altim)) {
if(!empty($row['eventid'])) {
$ekle .= "$row[eventid],";
}
}
$songizli = substr($ekle,0,-1);
$donen = "and eventid not in ($songizli)";
} else if($mac_bilgi_altiminalti_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_altiminalti)) {
if(!empty($row['eventid'])) {
$ekle .= "$row[eventid],";
}
}
$songizli = substr($ekle,0,-1);
$donen = "and eventid not in ($songizli)";
} else {
$donen = "";	
}
return $donen;	
}

function gizlicanlimaclistmt() {
global $ub;
global $dizin;

$mac_bilgi_kendim = sed_sql_query("select * from yasakcanli where spor_tipi='masatenis' and bayi_id='".$ub['id']."'");
$mac_bilgi_altim = sed_sql_query("select * from yasakcanli where spor_tipi='masatenis' and bayi_id='".$ub['hesap_sahibi_id']."'");
$mac_bilgi_altiminalti = sed_sql_query("select * from yasakcanli where spor_tipi='masatenis' and bayi_id='".$ub['hesap_root_id']."'");
$mac_bilgi_kendim_toplam = sed_sql_numrows($mac_bilgi_kendim);
$mac_bilgi_altim_toplam = sed_sql_numrows($mac_bilgi_altim);
$mac_bilgi_altiminalti_toplam = sed_sql_numrows($mac_bilgi_altiminalti);

if($mac_bilgi_kendim_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_kendim)) {
if(!empty($row['eventid'])) {
$ekle .= "$row[eventid],";
}
}
$songizli = substr($ekle,0,-1);
$donen = "and eventid not in ($songizli)";
} else if($mac_bilgi_altim_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_altim)) {
if(!empty($row['eventid'])) {
$ekle .= "$row[eventid],";
}
}
$songizli = substr($ekle,0,-1);
$donen = "and eventid not in ($songizli)";
} else if($mac_bilgi_altiminalti_toplam>0) {
while($row=sed_sql_fetcharray($mac_bilgi_altiminalti)) {
if(!empty($row['eventid'])) {
$ekle .= "$row[eventid],";
}
}
$songizli = substr($ekle,0,-1);
$donen = "and eventid not in ($songizli)";
} else {
$donen = "";	
}
return $donen;	
}

function canli_mbs_degisim($eventid) {
global $ub;
if(file_exists("sistem/oranserver/".$ub['id']."-".$eventid."-canlimbs.canli")) {
if($verisi = file_get_contents("sistem/oranserver/".$ub['id']."-".$eventid."-canlimbs.canli")) {
$donen = $verisi;
} else {
$donen = "0";	
}
} else {
$donen = "0";	
}
return $donen;	
}

function canli_mbs_ver($eventid) {
global $ub;
global $ayar;
global $dizin;

if(file_exists("".$dizin."/".$ub['id']."-".$eventid."-canlimbs.canli")) {
$kullan = "".$dizin."/".$ub['id']."-".$eventid."-canlimbs.canli";
} else
if(file_exists("".$dizin."/".$ub['hesap_sahibi_id']."-".$eventid."-canlimbs.canli")) {
$kullan = "".$dizin."/".$ub['hesap_sahibi_id']."-".$eventid."-canlimbs.canli";
} else
if(file_exists("".$dizin."/".$ub['hesap_root_id']."-".$eventid."-canlimbs.canli")) {
$kullan = "".$dizin."/".$ub['hesap_root_id']."-".$eventid."-canlimbs.canli";
}

if($kullan) {
if($verisi = file_get_contents("sistem/oranserver/".$ub['id']."-".$eventid."-canlimbs.canli")) {
$donen = $verisi;
} else {
$donen = userayar('canlifutbolmbs');
}
} else {
$donen = userayar('canlifutbolmbs');	
}
return $donen;
}

function tarihtotime_start($tarih) {
$bol = explode(".",$tarih);
$start = mktime(0,0,0,$bol[1],$bol[0],$bol[2]);	
return $start;	
}
function tarihtotime_end($tarih) {
$bol = explode(".",$tarih);
$start = mktime(23,59,59,$bol[1],$bol[0],$bol[2]);	
return $start;	
}



function kupon_hesapla($id) {
$kupon_bilgi = bilgi("select * from kuponlar where id='$id' and casino='0'");
$oran = 1;

if($kupon_bilgi["durum"] == 4)
{
	$bayi = $kupon_bilgi["user_id"];
	$miktar = $kupon_bilgi["yatan"];
	sed_sql_query("update kullanici set bakiye=bakiye-$miktar where id='$bayi'");
	
}


$sor = sed_sql_query("select kazanma,oran from kupon_ic where kupon_id='$id'");
while($row=sed_sql_fetcharray($sor)) {
if($row['kazanma']!="4") {
	$oran = $oran*$row['oran'];
}
}
$yeni_oran = $oran;
$userbilgi = bilgi("select id,hesap_sahibi_id,hesap_root_id from kullanici where id='$kupon_bilgi[user_id]'");
$userayar = bilgi("select ayar_id,maxoran from sistemayar where (ayar_id='$userbilgi[id]' or ayar_id='$userbilgi[hesap_sahibi_id]' or ayar_id='$userbilgi[hesap_root_id]')");
if($userayar['maxoran']=="") { $maxoran = 1000; } else { $maxoran = $userayar['maxoran']; }
if($yeni_oran>$maxoran) { $yenioran = $maxoran; $oran = $maxoran; }
$yeni_tutar = $kupon_bilgi['yatan']*$oran;

$toplam_mac = 0;
$toplam_acik = 0;
$toplam_kazanan = 0;
$toplam_kaybeden = 0;
$toplam_iptal = 0;
$toplam_sorgusu = sed_sql_query("select kazanma from kupon_ic where kupon_id='$id'");
while($asso=sed_sql_fetcharray($toplam_sorgusu)) {	
	if($asso['kazanma']=="1") { $toplam_acik = $toplam_acik+1; } else
	if($asso['kazanma']=="2") { $toplam_kazanan = $toplam_kazanan+1; } else
	if($asso['kazanma']=="3") { $toplam_kaybeden = $toplam_kaybeden+1; } else
	if($asso['kazanma']=="4") { $toplam_iptal = $toplam_iptal+1; }
}
$toplam_mac = sed_sql_numrows($toplam_sorgusu);
sed_sql_query("update kuponlar set tutan='$toplam_kazanan' where id='$id' and casino='0'");



if($toplam_mac==$toplam_iptal) { $durum = 4; } else
if($toplam_kaybeden>0) { $durum = 3; } else
if($toplam_acik<1) { $durum = 2; } else { $durum = 1; }
if($durum==1 && $kupon_bilgi['bakiye_aktarim']==1) {
sed_sql_query("update kullanici set bakiye=bakiye-$kupon_bilgi[tutar] where id='$kupon_bilgi[user_id]'");	
$bakiye_aktarim = "0";
} else
if($durum==2 && $kupon_bilgi['bakiye_aktarim']==0) {
sed_sql_query("update kullanici set bakiye=bakiye+$yeni_tutar where id='$kupon_bilgi[user_id]'");	
$bakiye_aktarim = "1";
} else
if($durum==2 && $kupon_bilgi['bakiye_aktarim']==1) {
sed_sql_query("update kullanici set bakiye=bakiye-$kupon_bilgi[tutar] where id='$kupon_bilgi[user_id]'");	
sed_sql_query("update kullanici set bakiye=bakiye+$yeni_tutar where id='$kupon_bilgi[user_id]'");	
$bakiye_aktarim = "1";
} else
if($durum==3 && $kupon_bilgi['bakiye_aktarim']==1) {
sed_sql_query("update kullanici set bakiye=bakiye-$kupon_bilgi[tutar] where id='$kupon_bilgi[user_id]'");	
$bakiye_aktarim = "0";	
} else
if($durum==4 && $kupon_bilgi['bakiye_aktarim']==1) {
sed_sql_query("update kullanici set bakiye=bakiye-$kupon_bilgi[tutar] where id='$kupon_bilgi[user_id]'");	
sed_sql_query("update kullanici set bakiye=bakiye+$kupon_bilgi[yatan] where id='$kupon_bilgi[user_id]'");	
$bakiye_aktarim = "0";
} else 
if($durum==4 && $kupon_bilgi['bakiye_aktarim']==0) {
sed_sql_query("update kullanici set bakiye=bakiye+$kupon_bilgi[yatan] where id='$kupon_bilgi[user_id]'");	
$bakiye_aktarim = "0";
} else {
$bakiye_aktarim = $kupon_bilgi['bakiye_aktarim'];	
}
sed_sql_query("update kuponlar set oran='$yeni_oran',tutar='$yeni_tutar',durum='$durum',bakiye_aktarim='$bakiye_aktarim' where id='$id' and casino='0'");		
}

function kupon_hesapla_casino($id) {
$kupon_bilgi = bilgi("select * from kuponlar where id='$id' and casino='1'");
$oran = 1;

if($kupon_bilgi["durum"] == 4)
{
	$bayi = $kupon_bilgi["user_id"];
	$miktar = $kupon_bilgi["yatan"];
	sed_sql_query("update kullanici set casinobakiye=casinobakiye-$miktar where id='$bayi'");
	
}


$sor = sed_sql_query("select kazanma,oran from kupon_ic_casino where kupon_id='$id'");
while($row=sed_sql_fetcharray($sor)) {
if($row['kazanma']!="4") {
	$oran = $oran*$row['oran'];
}
}
$yeni_oran = $oran;
$userbilgi = bilgi("select id,hesap_sahibi_id,hesap_root_id from kullanici where id='$kupon_bilgi[user_id]'");
$yeni_tutar = $kupon_bilgi['yatan']*$oran;

$toplam_mac = 0;
$toplam_acik = 0;
$toplam_kazanan = 0;
$toplam_kaybeden = 0;
$toplam_iptal = 0;
$toplam_sorgusu = sed_sql_query("select kazanma from kupon_ic_casino where kupon_id='$id'");
while($asso=sed_sql_fetcharray($toplam_sorgusu)) {	
	if($asso['kazanma']=="1") { $toplam_acik = $toplam_acik+1; } else
	if($asso['kazanma']=="2") { $toplam_kazanan = $toplam_kazanan+1; } else
	if($asso['kazanma']=="3") { $toplam_kaybeden = $toplam_kaybeden+1; } else
	if($asso['kazanma']=="4") { $toplam_iptal = $toplam_iptal+1; }
}
$toplam_mac = sed_sql_numrows($toplam_sorgusu);
sed_sql_query("update kuponlar set tutan='$toplam_kazanan' where id='$id' and casino='1'");



if($toplam_mac==$toplam_iptal) { $durum = 4; } else
if($toplam_kaybeden>0) { $durum = 3; } else
if($toplam_acik<1) { $durum = 2; } else { $durum = 1; }
if($durum==1 && $kupon_bilgi['bakiye_aktarim']==1) {
sed_sql_query("update kullanici set casinobakiye=casinobakiye-$kupon_bilgi[tutar] where id='$kupon_bilgi[user_id]'");	
$bakiye_aktarim = "0";
} else
if($durum==2 && $kupon_bilgi['bakiye_aktarim']==0) {
sed_sql_query("update kullanici set casinobakiye=casinobakiye+$yeni_tutar where id='$kupon_bilgi[user_id]'");	
$bakiye_aktarim = "1";
} else
if($durum==2 && $kupon_bilgi['bakiye_aktarim']==1) {
sed_sql_query("update kullanici set casinobakiye=casinobakiye-$kupon_bilgi[tutar] where id='$kupon_bilgi[user_id]'");	
sed_sql_query("update kullanici set casinobakiye=casinobakiye+$yeni_tutar where id='$kupon_bilgi[user_id]'");	
$bakiye_aktarim = "1";
} else
if($durum==3 && $kupon_bilgi['bakiye_aktarim']==1) {
sed_sql_query("update kullanici set casinobakiye=casinobakiye-$kupon_bilgi[tutar] where id='$kupon_bilgi[user_id]'");	
$bakiye_aktarim = "0";	
} else
if($durum==4 && $kupon_bilgi['bakiye_aktarim']==1) {
sed_sql_query("update kullanici set casinobakiye=casinobakiye-$kupon_bilgi[tutar] where id='$kupon_bilgi[user_id]'");	
sed_sql_query("update kullanici set casinobakiye=casinobakiye+$kupon_bilgi[yatan] where id='$kupon_bilgi[user_id]'");	
$bakiye_aktarim = "0";
} else 
if($durum==4 && $kupon_bilgi['bakiye_aktarim']==0) {
sed_sql_query("update kullanici set casinobakiye=casinobakiye+$kupon_bilgi[yatan] where id='$kupon_bilgi[user_id]'");	
$bakiye_aktarim = "0";
} else {
$bakiye_aktarim = $kupon_bilgi['bakiye_aktarim'];	
}
sed_sql_query("update kuponlar set oran='$yeni_oran',tutar='$yeni_tutar',durum='$durum',bakiye_aktarim='$bakiye_aktarim' where id='$id' and casino='1'");		
}

function kupon_hesapla_rulet($id) {
$kupon_bilgi = bilgi("select * from kuponlar where id='$id' and casino='2'");
$oran = 0;
$tutacak_bakiye = 0;
$yeni_bakiye = 0;

if($kupon_bilgi["durum"] == 4){
	$bayi = $kupon_bilgi["user_id"];
	$miktar = $kupon_bilgi["yatan"];
	sed_sql_query("update kullanici set casinobakiye=casinobakiye-$miktar where id='$bayi'");
}


$sor = sed_sql_query("select id,editdurum,kazanma,grupid,oran from kupon_ic_rulet where kupon_id='$id'");
while($row=sed_sql_fetcharray($sor)) {
if($row['kazanma']<3) {
	$oran = $oran+$row['oran'];
	$yeni_bakiye = $row['grupid']*$row['oran'];
	$tutacak_bakiye = $tutacak_bakiye+$yeni_bakiye;
}
if($row['kazanma']==4 && $row['editdurum']==0) {
	$tutar_geri_ver = $row['grupid'];
	sed_sql_query("update kullanici set casinobakiye=casinobakiye+$tutar_geri_ver where id='$kupon_bilgi[user_id]'");
	sed_sql_query("update kupon_ic_rulet set editdurum='1' where id='$row[id]'");
}
}
$yeni_oran = $oran;
$userbilgi = bilgi("select id,hesap_sahibi_id,hesap_root_id from kullanici where id='$kupon_bilgi[user_id]'");
$yeni_tutar = $tutacak_bakiye;

$toplam_mac = 0;
$toplam_acik = 0;
$toplam_kazanan = 0;
$toplam_kaybeden = 0;
$toplam_iptal = 0;
$toplam_sorgusu = sed_sql_query("select kazanma from kupon_ic_rulet where kupon_id='$id'");
while($asso=sed_sql_fetcharray($toplam_sorgusu)) {	
	if($asso['kazanma']=="1") { $toplam_acik = $toplam_acik+1; } else
	if($asso['kazanma']=="2") { $toplam_kazanan = $toplam_kazanan+1; } else
	if($asso['kazanma']=="3") { $toplam_kaybeden = $toplam_kaybeden+1; } else
	if($asso['kazanma']=="4") { $toplam_iptal = $toplam_iptal+1; }
}
$toplam_mac = sed_sql_numrows($toplam_sorgusu);

if($toplam_mac==$toplam_iptal) {
	$durum = 4;
} else if($toplam_acik==0 && $toplam_kazanan>0) {
	$durum = 2;
} else if($toplam_acik==0 && $toplam_kazanan==0 && $toplam_kaybeden>0) {
	$durum = 3;
} else {
	$durum = 1;
}

if($durum==1 && $kupon_bilgi['bakiye_aktarim']==1) {
sed_sql_query("update kullanici set casinobakiye=casinobakiye-$kupon_bilgi[tutar] where id='$kupon_bilgi[user_id]'");	
$bakiye_aktarim = "0";
} else if($durum==2 && $kupon_bilgi['bakiye_aktarim']==0) {
sed_sql_query("update kullanici set casinobakiye=casinobakiye+$yeni_tutar where id='$kupon_bilgi[user_id]'");	
$bakiye_aktarim = "1";
} else if($durum==2 && $kupon_bilgi['bakiye_aktarim']==1) {
sed_sql_query("update kullanici set casinobakiye=casinobakiye-$kupon_bilgi[tutar] where id='$kupon_bilgi[user_id]'");	
sed_sql_query("update kullanici set casinobakiye=casinobakiye+$yeni_tutar where id='$kupon_bilgi[user_id]'");	
$bakiye_aktarim = "1";
} else if($durum==3 && $kupon_bilgi['bakiye_aktarim']==1) {
sed_sql_query("update kullanici set casinobakiye=casinobakiye-$kupon_bilgi[tutar] where id='$kupon_bilgi[user_id]'");	
$bakiye_aktarim = "0";	
} else if($durum==4 && $kupon_bilgi['bakiye_aktarim']==1) {
sed_sql_query("update kullanici set casinobakiye=casinobakiye-$kupon_bilgi[tutar] where id='$kupon_bilgi[user_id]'");	
sed_sql_query("update kullanici set casinobakiye=casinobakiye+$kupon_bilgi[yatan] where id='$kupon_bilgi[user_id]'");	
$bakiye_aktarim = "0";
} else if($durum==4 && $kupon_bilgi['bakiye_aktarim']==0) {
sed_sql_query("update kullanici set casinobakiye=casinobakiye+$kupon_bilgi[yatan] where id='$kupon_bilgi[user_id]'");	
$bakiye_aktarim = "0";
} else {
$bakiye_aktarim = $kupon_bilgi['bakiye_aktarim'];	
}
sed_sql_query("update kuponlar set oran='$yeni_oran',tutar='$yeni_tutar',tutan='$toplam_kazanan',durum='$durum',bakiye_aktarim='$bakiye_aktarim' where id='$id' and casino='2'");		
}

function kuponda_casino_sonkontrol($gameid,$roundid,$oddid,$kuponid) {
$kaynak = veri("http://slotgame.store/casino/casino_json.php?gameid=".$gameid);
$verileri = json_decode($kaynak);

foreach($verileri as $veri){

$round_sayi_ver = $veri->run_id;
$round_sayi_ver_next = $veri->run_id_next;
$seconds_ver = $veri->seconds;
if($gameid==7 && $seconds_ver<1){
sed_sql_query("update kupon_casino set roundid='$round_sayi_ver_next',eskiroundid='$round_sayi_ver' where id='$kuponid'");
} else if($gameid==10 && $seconds_ver<1){
sed_sql_query("update kupon_casino set roundid='$round_sayi_ver_next',eskiroundid='$round_sayi_ver' where id='$kuponid'");
} else if($gameid==3 && $seconds_ver<1){
sed_sql_query("update kupon_casino set roundid='$round_sayi_ver_next',eskiroundid='$round_sayi_ver' where id='$kuponid'");
} else if($gameid==9 && $seconds_ver<1){
sed_sql_query("update kupon_casino set roundid='$round_sayi_ver_next',eskiroundid='$round_sayi_ver' where id='$kuponid'");
} else if($gameid==1 && $seconds_ver<1){
sed_sql_query("update kupon_casino set roundid='$round_sayi_ver_next',eskiroundid='$round_sayi_ver' where id='$kuponid'");
} else if($round_sayi_ver>$roundid){
sed_sql_query("update kupon_casino set roundid='$round_sayi_ver',eskiroundid='$roundid' where id='$kuponid'");
}

foreach($veri->oranlar as $oranlar){
$oranid = $oranlar->id;
if($oranid==$oddid) {
$xml_oran = (float)$oranlar->value;
$aktifmi = $oranlar->status;
$bulunan_oran = casinodaoran($xml_oran,$gameid);
}

}

}

if($aktifmi!="active" || $bulunan_oran=="" || empty($bulunan_oran) || $bulunan_oran=="0" || $bulunan_oran=="1" || $bulunan_oran=="1.00") { $hatavar = 1; }
if($gameid==8 || $gameid==5 || $gameid==6) {
	if($seconds_ver<3 || $seconds_ver>23) {
		sed_sql_query("update kupon_casino set aktif='0',oran='$bulunan_oran' where id='$kuponid'");
	}
} else if($gameid==12) {
	if($seconds_ver<3) {
		sed_sql_query("update kupon_casino set aktif='0',oran='$bulunan_oran' where id='$kuponid'");
	}
} else if(!$bulunan_oran || $hatavar==1) {
sed_sql_query("update kupon_casino set aktif='0',oran='$bulunan_oran' where id='$kuponid'");
} else {
sed_sql_query("update kupon_casino set aktif='1',oran='$bulunan_oran' where id='$kuponid'");	
}

}

function kuponda_canli_guncelle_sonkontrol($eventid,$orantip,$orankac,$kuponid) {
global $api_url;
global $api_gelecek_url;
$ob = explode("|",$orantip);
$mb = bilgi("select aktif,devre,eventid,gelecek from canli_maclar where eventid='$eventid'");
$surekli_aski = surekli_aski_durum($eventid);
$devre = $mb['devre'];
$gelecek = $mb['gelecek'];

$kaynak = veri("http://slotgame.store/jobs/iplibwinler/jsonlar/futbol_json.php?eventid=".$eventid);
$maclar = json_decode($kaynak);

foreach($maclar as $match){

foreach($match->oranlar as $oranlar){
$tip_isim = $oranlar->detay;
if($tip_isim==$ob[0]) {
$oran_adi_sira_ver = "oran_adi_".$orankac."";
$oran_sira_ver = "oran".$orankac."";
$gosterim_sira_ver = "visible".$orankac."";
$xml_oran = (float)$oranlar->$oran_sira_ver;
$gosterim = (float)$oranlar->$gosterim_sira_ver;
$bulunan_oran_ver = $xml_oran;
$bulunan_oran = dusenoranbulcanli($bulunan_oran_ver,$tip_isim,"futbol");
}

}

}

if($bulunan_oran=="" || empty($bulunan_oran) || $bulunan_oran=="-") { $hatavar = 1; }
if(!$bulunan_oran || $mb['aktif']==0 || $surekli_aski==1 || $gosterim==0 || $hatavar==1) {
sed_sql_query("update kupon set aktif='0' where id='$kuponid'");
} else {
sed_sql_query("update kupon set aktif='1',oran='$bulunan_oran' where id='$kuponid'");	
}

}

function kuponda_canli_guncelleb($eventid,$orantip,$orankac,$kuponid) {
global $api_url;
global $api_gelecek_url;
$ob = explode("|",$orantip);
$mb = bilgi("select aktif,devre,eventid,gelecek from basketbol_canli_maclar where eventid='$eventid'");
$surekli_aski = surekli_aski_durum($eventid);
$devre = $mb['devre'];
$gelecek = $mb['gelecek'];


$kaynak = veri("http://slotgame.store/jobs/iplibwinler/jsonlar/basketbol_json.php?eventid=".$eventid);
$maclar = json_decode($kaynak);

foreach($maclar as $match){

foreach($match->oranlar as $oranlar){
$tip_isim = $oranlar->detay;
if($tip_isim==$ob[0]) {
$oran_adi_sira_ver = "oran_adi_".$orankac."";
$oran_sira_ver = "oran".$orankac."";
$gosterim_sira_ver = "visible".$orankac."";
$xml_oran = (float)$oranlar->$oran_sira_ver;
$gosterim = (float)$oranlar->$gosterim_sira_ver;
$xml_oran_adi = $oranlar->$oran_adi_sira_ver;
$bulunan_oran_ver = $xml_oran;
$bulunan_oran = dusenoranbulcanli($bulunan_oran_ver,$tip_isim,"basketbol");
}

}

}

if($bulunan_oran=="" || empty($bulunan_oran) || $bulunan_oran=="-") { $hatavar = 1; }
if(!$bulunan_oran || $mb['aktif']==0 || $surekli_aski==1 || $gosterim==0 || $hatavar==1) {
sed_sql_query("update kupon set aktif='0',oran_tip='".$ob[0]."|".$xml_oran_adi."' where id='$kuponid'");
} else {
sed_sql_query("update kupon set aktif='1',oran='$bulunan_oran',oran_tip='".$ob[0]."|".$xml_oran_adi."' where id='$kuponid'");	
}

}

function kuponda_canli_guncellet($eventid,$orantip,$orankac,$kuponid) {
global $api_url;
global $api_gelecek_url;
$ob = explode("|",$orantip);
$mb = bilgi("select aktif,devre,eventid,gelecek from canli_maclar_tenis where eventid='$eventid'");
$surekli_aski = surekli_aski_durum($eventid);
$devre = $mb['devre'];
$gelecek = $mb['gelecek'];


$kaynak = veri("http://slotgame.store/jobs/iplibwinler/jsonlar/tenis_json.php?eventid=".$eventid);
$maclar = json_decode($kaynak);

foreach($maclar as $match){

foreach($match->oranlar as $oranlar){
$tip_isim = $oranlar->detay;
if($tip_isim==$ob[0]) {
$oran_adi_sira_ver = "oran_adi_".$orankac."";
$oran_sira_ver = "oran".$orankac."";
$gosterim_sira_ver = "visible".$orankac."";
$xml_oran = (float)$oranlar->$oran_sira_ver;
$gosterim = (float)$oranlar->$gosterim_sira_ver;
$xml_oran_adi = $oranlar->$oran_adi_sira_ver;
$bulunan_oran_ver = $xml_oran;
$bulunan_oran = dusenoranbulcanli($bulunan_oran_ver,$tip_isim,"tenis");
}

}

}

if($bulunan_oran=="" || empty($bulunan_oran) || $bulunan_oran=="-") { $hatavar = 1; }
if(!$bulunan_oran || $mb['aktif']==0 || $surekli_aski==1 || $gosterim==0 || $hatavar==1) {
sed_sql_query("update kupon set aktif='0',oran_tip='".$ob[0]."|".$xml_oran_adi."' where id='$kuponid'");
} else {
sed_sql_query("update kupon set aktif='1',oran='$bulunan_oran',oran_tip='".$ob[0]."|".$xml_oran_adi."' where id='$kuponid'");	
}

}

function kuponda_canli_guncellev($eventid,$orantip,$orankac,$kuponid) {
global $api_url;
global $api_gelecek_url;
$ob = explode("|",$orantip);
$mb = bilgi("select aktif,devre,eventid,gelecek from canli_maclar_voleybol where eventid='$eventid'");
$surekli_aski = surekli_aski_durum($eventid);
$devre = $mb['devre'];
$gelecek = $mb['gelecek'];


$kaynak = veri("http://slotgame.store/jobs/iplibwinler/jsonlar/voleybol_json.php?eventid=".$eventid);
$maclar = json_decode($kaynak);

foreach($maclar as $match){

foreach($match->oranlar as $oranlar){
$tip_isim = $oranlar->detay;
if($tip_isim==$ob[0]) {
$oran_adi_sira_ver = "oran_adi_".$orankac."";
$oran_sira_ver = "oran".$orankac."";
$gosterim_sira_ver = "visible".$orankac."";
$xml_oran = (float)$oranlar->$oran_sira_ver;
$gosterim = (float)$oranlar->$gosterim_sira_ver;
$xml_oran_adi = $oranlar->$oran_adi_sira_ver;
$bulunan_oran_ver = $xml_oran;
$bulunan_oran = dusenoranbulcanli($bulunan_oran_ver,$tip_isim,"voleybol");
}

}

}

if($bulunan_oran=="" || empty($bulunan_oran) || $bulunan_oran=="-") { $hatavar = 1; }
if(!$bulunan_oran || $mb['aktif']==0 || $surekli_aski==1 || $gosterim==0 || $hatavar==1) {
sed_sql_query("update kupon set aktif='0',oran_tip='".$ob[0]."|".$xml_oran_adi."' where id='$kuponid'");
} else {
sed_sql_query("update kupon set aktif='1',oran='$bulunan_oran',oran_tip='".$ob[0]."|".$xml_oran_adi."' where id='$kuponid'");	
}

}

function kuponda_canli_guncellebuz($eventid,$orantip,$orankac,$kuponid) {
global $api_url;
global $api_gelecek_url;
$ob = explode("|",$orantip);
$mb = bilgi("select aktif,devre,eventid,gelecek from canli_maclar_buzhokeyi where eventid='$eventid'");
$surekli_aski = surekli_aski_durum($eventid);
$devre = $mb['devre'];
$gelecek = $mb['gelecek'];


$kaynak = veri("http://slotgame.store/jobs/iplibwinler/jsonlar/buzhokeyi_json.php?eventid=".$eventid);
$maclar = json_decode($kaynak);

foreach($maclar as $match){

foreach($match->oranlar as $oranlar){
$tip_isim = $oranlar->detay;
if($tip_isim==$ob[0]) {
$oran_adi_sira_ver = "oran_adi_".$orankac."";
$oran_sira_ver = "oran".$orankac."";
$gosterim_sira_ver = "visible".$orankac."";
$xml_oran = (float)$oranlar->$oran_sira_ver;
$gosterim = (float)$oranlar->$gosterim_sira_ver;
$xml_oran_adi = $oranlar->$oran_adi_sira_ver;
$bulunan_oran_ver = $xml_oran;
$bulunan_oran = dusenoranbulcanli($bulunan_oran_ver,$tip_isim,"buzhokeyi");
}

}

}

if($bulunan_oran=="" || empty($bulunan_oran) || $bulunan_oran=="-") { $hatavar = 1; }
if(!$bulunan_oran || $mb['aktif']==0 || $surekli_aski==1 || $gosterim==0 || $hatavar==1) {
sed_sql_query("update kupon set aktif='0',oran_tip='".$ob[0]."|".$xml_oran_adi."' where id='$kuponid'");
} else {
sed_sql_query("update kupon set aktif='1',oran='$bulunan_oran',oran_tip='".$ob[0]."|".$xml_oran_adi."' where id='$kuponid'");	
}

}

function kuponda_canli_guncellemt($eventid,$orantip,$orankac,$kuponid) {
global $api_url;
global $api_gelecek_url;
$ob = explode("|",$orantip);
$mb = bilgi("select aktif,devre,eventid,gelecek from canli_maclar_masatenis where eventid='$eventid'");
$surekli_aski = surekli_aski_durum($eventid);
$devre = $mb['devre'];
$gelecek = $mb['gelecek'];


$kaynak = veri("http://slotgame.store/jobs/iplibwinler/jsonlar/masatenis_json.php?eventid=".$eventid);
$maclar = json_decode($kaynak);

foreach($maclar as $match){

foreach($match->oranlar as $oranlar){
$tip_isim = $oranlar->detay;
if($tip_isim==$ob[0]) {
$oran_adi_sira_ver = "oran_adi_".$orankac."";
$oran_sira_ver = "oran".$orankac."";
$gosterim_sira_ver = "visible".$orankac."";
$xml_oran = (float)$oranlar->$oran_sira_ver;
$gosterim = (float)$oranlar->$gosterim_sira_ver;
$xml_oran_adi = $oranlar->$oran_adi_sira_ver;
$bulunan_oran_ver = $xml_oran;
$bulunan_oran = dusenoranbulcanli($bulunan_oran_ver,$tip_isim,"masatenis");
}

}

}

if($bulunan_oran=="" || empty($bulunan_oran) || $bulunan_oran=="-") { $hatavar = 1; }
if(!$bulunan_oran || $mb['aktif']==0 || $surekli_aski==1 || $gosterim==0 || $hatavar==1) {
sed_sql_query("update kupon set aktif='0',oran_tip='".$ob[0]."|".$xml_oran_adi."' where id='$kuponid'");
} else {
sed_sql_query("update kupon set aktif='1',oran='$bulunan_oran',oran_tip='".$ob[0]."|".$xml_oran_adi."' where id='$kuponid'");	
}

}

function lig_adi_ver($str) {
	$bilgi = bilgi("select * from program_lig where id='$str' order by lig_adi desc");
	if($bilgi['lig_ulke']!="") { $kupa_ulke = $bilgi['lig_ulke']; } else { $kupa_ulke = $bilgi['ulke_adi_or']; }
	if(empty($bilgi['lig_adi'])) { $donen = "$kupa_ulke - $bilgi[lig_adi_or]"; } else { $donen = "$kupa_ulke - $bilgi[lig_adi]"; }
	return $donen;
}



function lig_adi_ver_voleybol($str) {
	$bilgi = bilgi("select * from program_ligv where id='$str' order by lig_adi desc");
	if($bilgi['lig_ulke']!="") { $kupa_ulke = $bilgi['lig_ulke']; } else { $kupa_ulke = $bilgi['ulke_adi_or']; }
	if(empty($bilgi['lig_adi'])) { $donen = "$kupa_ulke - $bilgi[lig_adi_or]"; } else { $donen = "$kupa_ulke - $bilgi[lig_adi]"; }
	return $donen;
}


function canlitipid($s1,$s2){

$bak = bilgi("select id from canli_tip where tip_isim='$s1' and varoname='$s2' order by id desc");
if($bak['id'] > 0)
return $bak['id'];
else
sed_sql_query("insert into canli_tip (tip_isim,varoname) values ('$s1','$s2')");
return sed_sql_insertid();

}

function canlitipidbasket($s1,$s2){

$bak = bilgi("select id from basketbol_canli_tip where tip_isim='$s1' and varoname='$s2' order by id desc");
if($bak['id'] > 0)
return $bak['id'];
else
sed_sql_query("insert into basketbol_canli_tip (tip_isim,varoname) values ('$s1','$s2')");
return sed_sql_insertid();

}

function canlitipidtenis($s1,$s2){

$bak = bilgi("select id from canli_tip_tenis where tip_isim='$s1' and varoname='$s2' order by id desc");
if($bak['id'] > 0)
return $bak['id'];
else
sed_sql_query("insert into canli_tip_tenis (tip_isim,varoname) values ('$s1','$s2')");
return sed_sql_insertid();

}

function canlitipidvoleybol($s1,$s2){

$bak = bilgi("select id from canli_tip_voleybol where tip_isim='$s1' and varoname='$s2' order by id desc");
if($bak['id'] > 0)
return $bak['id'];
else
sed_sql_query("insert into canli_tip_voleybol (tip_isim,varoname) values ('$s1','$s2')");
return sed_sql_insertid();

}

function canlitipidbuz($s1,$s2){

$bak = bilgi("select id from canli_tip_buzhokeyi where tip_isim='$s1' and varoname='$s2' order by id desc");
if($bak['id'] > 0)
return $bak['id'];
else
sed_sql_query("insert into canli_tip_buzhokeyi (tip_isim,varoname) values ('$s1','$s2')");
return sed_sql_insertid();

}


function aktifbilgi($ney)
{
	$tarih = date("Y-m-d H:i:s");
	$sez = sed_sql_query("select * from programsanal where mac_tarih >'$tarih' order by mac_tarih ASC LIMIT 0,1");
	$tmm = sed_sql_fetcharray($sez);
	if($ney =="1")
	return $tmm["sezon"];
	else
	return $tmm["hafta"];
}

function getTranslation($word, $lang = null){
$bilgile = bilgi("select * from kullanici where id='".$_SESSION['betuser']."' limit 1");
$bilgileri = bilgi("select * from language_content where name='".$bilgile['username']."' limit 1");
$lang_ver = $bilgileri['language'];
if($lang_ver=='') {
$languageFile = "languages_verss/tr.ini";
} else {
$languageFile = "languages_verss/".$lang_ver.".ini";
}
$translate = parse_ini_file($languageFile);
if (isset($translate[$word])) {
return $translate[$word];
}
return $translate[$word];
}

?>