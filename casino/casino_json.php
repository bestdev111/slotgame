<?php
$gameid = (int)$_GET['gameid'];

error_reporting(0);
header('Content-type: application/json'); 

function curlfonksiyon($adres){
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$adres);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 5);
return  curl_exec($ch);
curl_close($ch);
}
## YENİ RUN İD ##
$veriicerik = curlfonksiyon("https://betwingo.xyz/api/casino_json.php?gameid=".$gameid."");
echo $veriicerik;