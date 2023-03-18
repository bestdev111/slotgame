<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Başlıksız Belge</title>
</head>

<body>
<?php
include 'xml.php';

$suan = date("H:i");

$sor = sed_sql_query("select * from sistemayar");
while($row=sed_sql_fetcharray($sor)) { 
$kapanis_bitir_ver = $row['bahis_bitir'];
$acilis_basla_ver = $row['bahis_basla'];

if($row['bahis_basla']=="never" && $row['bahis_bitir']=="never") {
sed_sql_query("update sistemayar set sistemkapat='0' where id='$row[id]'");
echo "$row[ayar_id] - Programsız - $suan<br>";
} else if($row['bahis_basla']=="never1" && $row['bahis_bitir']=="never1") {
sed_sql_query("update sistemayar set sistemkapat='1' where id='$row[id]'");
echo "<strong>$row[ayar_id] - Sistem Her Zaman kapalı</strong><br>";

} else {

if($suan>$row['bahis_bitir'] && $suan<$row['bahis_basla']) {
echo "<strong>$row[ayar_id] - Şu an kapalı - $suan - $row[bahis_bitir] : $row[bahis_basla]</strong><br>";
sed_sql_query("update sistemayar set sistemkapat='1' where id='$row[id]'");
} else {
echo "<strong>$row[ayar_id] - Şu an açık - $suan - $row[bahis_bitir] : $row[bahis_basla]</strong><br>";
sed_sql_query("update sistemayar set sistemkapat='0' where id='$row[id]'");
}

}

}

$bir_hafta_tarih = date('Y-m-d H:i:s',strtotime('-3 Day'));
$iki_gun_tarih = date('Y-m-d H:i:s',strtotime('-2 Day'));

###################### CANLI MAÇLAR MASA TENİSİ SİLME ####################
$sor_canlimaclarmt = sed_sql_query("select * from canli_maclar_masatenis where baslamasaat < '$bir_hafta_tarih' order by id");

while($row_canlimaclarmt=sed_sql_fetcharray($sor_canlimaclarmt)) {
	sed_sql_query("delete from canli_maclar_masatenis where id='$row_canlimaclarmt[id]' and eventid='$row_canlimaclarmt[eventid]' and baslamasaat < '$bir_hafta_tarih'");
}
###################### CANLI MAÇLAR MASA TENİSİ SİLME ####################

###################### CANLI MAÇLAR BUZ HOKEYİ SİLME ####################
$sor_canlimaclarbuz = sed_sql_query("select * from canli_maclar_buzhokeyi where baslamasaat < '$bir_hafta_tarih' order by id");

while($row_canlimaclarbuz=sed_sql_fetcharray($sor_canlimaclarbuz)) {
	sed_sql_query("delete from canli_maclar_buzhokeyi where id='$row_canlimaclarbuz[id]' and eventid='$row_canlimaclarbuz[eventid]' and baslamasaat < '$bir_hafta_tarih'");
}
###################### CANLI MAÇLAR BUZ HOKEYİ SİLME ####################

###################### CANLI MAÇLAR VOLEYBOL SİLME ####################
$sor_canlimaclarvoleybol = sed_sql_query("select * from canli_maclar_voleybol where baslamasaat < '$bir_hafta_tarih' order by id");

while($row_canlimaclarvoleybol=sed_sql_fetcharray($sor_canlimaclarvoleybol)) {
	sed_sql_query("delete from canli_maclar_voleybol where id='$row_canlimaclarvoleybol[id]' and eventid='$row_canlimaclarvoleybol[eventid]' and baslamasaat < '$bir_hafta_tarih'");
}
###################### CANLI MAÇLAR VOLEYBOL SİLME ####################

###################### CANLI MAÇLAR TENİS SİLME ####################
$sor_canlimaclartenis = sed_sql_query("select * from canli_maclar_tenis where baslamasaat < '$bir_hafta_tarih' order by id");

while($row_canlimaclartenis=sed_sql_fetcharray($sor_canlimaclartenis)) {
	sed_sql_query("delete from canli_maclar_tenis where id='$row_canlimaclartenis[id]' and eventid='$row_canlimaclartenis[eventid]' and baslamasaat < '$bir_hafta_tarih'");
}
###################### CANLI MAÇLAR TENİS SİLME ####################

###################### CANLI MAÇLAR BASKETBOL SİLME ####################
$sor_canlimaclarbasket = sed_sql_query("select * from basketbol_canli_maclar where baslamasaat < '$bir_hafta_tarih' order by id");

while($row_canlimaclarbasket=sed_sql_fetcharray($sor_canlimaclarbasket)) {
	sed_sql_query("delete from basketbol_canli_maclar where id='$row_canlimaclarbasket[id]' and eventid='$row_canlimaclarbasket[eventid]' and baslamasaat < '$bir_hafta_tarih'");
}
###################### CANLI MAÇLAR BASKETBOL SİLME ####################

###################### CANLI MAÇLAR FUTBOL SİLME ####################
$sor_canlimaclar = sed_sql_query("select * from canli_maclar where baslamasaat < '$iki_gun_tarih' and devre='Bitti' order by id");

while($row_canlimaclar=sed_sql_fetcharray($sor_canlimaclar)) {
	sed_sql_query("delete from canli_maclar where id='$row_canlimaclar[id]' and devre='Bitti' and eventid='$row_canlimaclar[eventid]' and baslamasaat < '$iki_gun_tarih'");
	sed_sql_query("delete from canli_gol_list where mac_db_id='$row_canlimaclar[id]' and eventid='$row_canlimaclar[eventid]'");
}
###################### CANLI MAÇLAR FUTBOL SİLME ####################

?>
</body>
</html>