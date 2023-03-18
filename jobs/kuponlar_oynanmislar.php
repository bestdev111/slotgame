<?php
session_start();
header('Content-type: application/json');
include 'xml.php';

$sor_bulten = sed_sql_query("select ev_takim,konuk_takim,mac_kodu,spor_tip,mac_time,mac_db_id from kupon_ic where kazanma='1' and (spor_tip='futbol' or spor_tip='basketbol' or spor_tip='tenis' or spor_tip='voleybol' or spor_tip='buzhokeyi' or spor_tip='masatenisi' or spor_tip='rugby') and ms='' group by mac_kodu order by id");

while($row_bulten=sed_sql_fetcharray($sor_bulten)) {

$json['veriler'][] = array(
"ev_takim"=>$row_bulten['ev_takim'],
"konuk_takim"=>$row_bulten['konuk_takim'],
"mac_kodu"=>$row_bulten['mac_kodu'],
"spor_tip"=>$row_bulten['spor_tip'],
"mac_time"=>$row_bulten['mac_time']
);

}

$sor_canli = sed_sql_query("select ev_takim,konuk_takim,mac_kodu,spor_tip,mac_time,mac_db_id from kupon_ic where kazanma='1' and (spor_tip='canli' or spor_tip='canlib' or spor_tip='canlit' or spor_tip='canliv' or spor_tip='canlibuz' or spor_tip='canlimt') and ms='' group by mac_db_id order by id");

while($row_canli=sed_sql_fetcharray($sor_canli)) {

if($row_canli['spor_tip']=="canli"){
	$mac_bilgisi = bilgi("SELECT eventid FROM canli_maclar WHERE id='".$row_canli['mac_db_id']."' limit 1");
	$mac_kodu_ver = $mac_bilgisi['eventid'];
} else if($row_canli['spor_tip']=="canlib"){
	$mac_bilgisi = bilgi("SELECT eventid FROM basketbol_canli_maclar WHERE id='".$row_canli['mac_db_id']."' limit 1");
	$mac_kodu_ver = $mac_bilgisi['eventid'];
} else if($row_canli['spor_tip']=="canlit"){
	$mac_bilgisi = bilgi("SELECT eventid FROM canli_maclar_tenis WHERE id='".$row_canli['mac_db_id']."' limit 1");
	$mac_kodu_ver = $mac_bilgisi['eventid'];
} else if($row_canli['spor_tip']=="canliv"){
	$mac_bilgisi = bilgi("SELECT eventid FROM canli_maclar_voleybol WHERE id='".$row_canli['mac_db_id']."' limit 1");
	$mac_kodu_ver = $mac_bilgisi['eventid'];
} else if($row_canli['spor_tip']=="canlibuz"){
	$mac_bilgisi = bilgi("SELECT eventid FROM canli_maclar_buzhokeyi WHERE id='".$row_canli['mac_db_id']."' limit 1");
	$mac_kodu_ver = $mac_bilgisi['eventid'];
} else if($row_canli['spor_tip']=="canlimt"){
	$mac_bilgisi = bilgi("SELECT eventid FROM canli_maclar_masatenis WHERE id='".$row_canli['mac_db_id']."' limit 1");
	$mac_kodu_ver = $mac_bilgisi['eventid'];
} else {
	$mac_bilgisi = bilgi("SELECT eventid FROM canli_maclar WHERE id='".$row_canli['mac_db_id']."' limit 1");
	$mac_kodu_ver = $mac_bilgisi['eventid'];
}

$json['veriler'][] = array(
"ev_takim"=>$row_canli['ev_takim'],
"konuk_takim"=>$row_canli['konuk_takim'],
"mac_kodu"=>$mac_kodu_ver,
"spor_tip"=>$row_canli['spor_tip'],
"mac_time"=>$row_canli['mac_time']
);

}

echo json_encode($json);