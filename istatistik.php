<?php
session_start();
header("Content-type: text/html; charset=utf-8");
include 'db.php';
if(isset($_SESSION['betuser'])) { $user = $_SESSION['betuser']; } else { header("Location:login.php"); die(); exit(); }

$id = gd("id");
$macbilgi = bilgi("select * from program where id='$id'");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?=$macbilgi['ev_takim']; ?> - <?=$macbilgi['konuk_takim']; ?> Karşılaştırması</title>
</head>
<body style="font-family:Verdana; margin:0px; line-height:20px; font-size:11px; margin-top:-188px;">
<?

$rand = "hititbets";
$ch  = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://212.175.249.167/");
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_COOKIEJAR, ''.$rand.'.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, ''.$rand.'.txt');
curl_setopt($ch, CURLOPT_PROXY, '54.36.182.96:3128');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
$kaynak = curl_exec($ch);
$url2 = "http://212.175.249.167/HeadToHead.html?homeId=".$macbilgi['home_id']."&homeName=". str_replace(" ","%20",$macbilgi['ev_takim'])."&awayId=".$macbilgi['away_id']."&awayName=".str_replace(" ","%20",$macbilgi['konuk_takim'])."&seasonId=".$macbilgi['sezon_id']."&groupId=".$macbilgi['grup_id']."&sportTypeId=1";

curl_setopt($ch, CURLOPT_URL, $url2);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_COOKIEJAR, ''.$rand.'.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, ''.$rand.'.txt');
curl_setopt($ch, CURLOPT_PROXY, '54.36.182.96:3128');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
$kaynak2 = curl_exec($ch);

$o = array('HT','FT','color: #FFFF99;background: #006600;','Head to Head2','Last 10 Matches','Form','(Home)','(Away)','Point','General',"<td>".$macbilgi['ev_takim']."</td>","<td>".$macbilgi['konuk_takim']."</td>",'background: #FFFF99;','border: #cccccc solid 1px;','border:#000000 solid 1px;','HititBet');
$s = array('İY','MS','color: #FFF;background: #BC2121;','Geçmiş Karşılaşmalar','Son 10 Karşılaşma','Form Grafiği','(Ev Sahibi olduğu son maçlar)','(Deplasman olduğu son maçlar)','Puan Durumu','Genel Sıralama','<td style="color:#BC2121; font-weight:bold;">'.$macbilgi['ev_takim'].' (Ev Sahibi)</td>','<td style="color:#000; font-weight:bold;">'.$macbilgi['konuk_takim'].' (Deplasman)</td>','background: #f0f0f0;','border: #dddddd solid 1px;','border:#dddddd solid 1px;',userayar('site_adi'));

echo str_replace($o,$s,$kaynak2);

?>
</body>
</html>