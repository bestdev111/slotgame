<?php
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
        else $base_url = 'https://slotgame.store/';

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
	{ return (@mysqli_set_charset($conn_id, $charset)); }

/*******************************/

function sed_sql_rowcount($table)
	{
	$sqltmp = sed_sql_query("SELECT COUNT(*) FROM $table");
	return(sed_sql_result($sqltmp, 0, "COUNT(*)"));
	}

?>