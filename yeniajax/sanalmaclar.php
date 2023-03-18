<?php
session_start();
include "../db.php";
header('Content-type: application/json');

function curlfonksiyon($adres){
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$adres);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 50);
return  curl_exec($ch);
curl_close($ch);
}

$spid = $_GET['spid'];
$version = $_GET['version'];
$sezon = $_GET['season'];
$hafta = $_GET['week'];
$sezonid = $_GET['sid'];
$match_ids = $_GET['match_ids'];

$bilgidili = bilgi("select * from language_content where name='".$ub['username']."' limit 1");

if($version==2){

if($spid=="vdr"){

$veriicerik = curlfonksiyon("https://betwingo.xyz/api/sanalmaclar.php?version=2&lng=".$bilgidili['language']."&week=".$hafta."&season=".$sezon."&spid=vdr");

echo $veriicerik;

} else if($spid=="vhc"){

$veriicerik = curlfonksiyon("https://betwingo.xyz/api/sanalmaclar.php?version=2&lng=".$bilgidili['language']."&week=".$hafta."&season=".$sezon."&spid=vhc");

echo $veriicerik;

} else if($spid=="vbl"){

$veriicerik = curlfonksiyon("https://betwingo.xyz/api/sanalmaclar.php?version=2&lng=".$bilgidili['language']."&season=".$sezon."&week=".$hafta."&sid=".$sezonid."&spid=vbl&match_ids=".$match_ids."");

echo $veriicerik;

} else if($spid=="vfct"){

$veriicerik = curlfonksiyon("https://betwingo.xyz/api/sanalmaclar.php?version=2&lng=".$bilgidili['language']."&season=".$sezon."&week=".$hafta."&sid=".$sezonid."&spid=vfct&match_ids=".$match_ids."");

echo $veriicerik;

} else if($spid=="vfec"){

$veriicerik = curlfonksiyon("https://betwingo.xyz/api/sanalmaclar.php?version=2&lng=".$bilgidili['language']."&season=".$sezon."&week=".$hafta."&sid=".$sezonid."&spid=vfec&match_ids=".$match_ids."");

echo $veriicerik;

} else if($spid=="vfwc"){

$veriicerik = curlfonksiyon("https://betwingo.xyz/api/sanalmaclar.php?version=2&lng=".$bilgidili['language']."&season=".$sezon."&week=".$hafta."&sid=".$sezonid."&spid=vfwc&match_ids=".$match_ids."");

echo $veriicerik;

} else if($spid=="vfcc"){

$veriicerik = curlfonksiyon("https://betwingo.xyz/api/sanalmaclar.php?version=2&lng=".$bilgidili['language']."&season=".$sezon."&week=".$hafta."&sid=".$sezonid."&spid=vfcc&match_ids=".$match_ids."");

echo $veriicerik;

} else {

$veriicerik = curlfonksiyon("https://betwingo.xyz/api/sanalmaclar.php?version=2&lng=".$bilgidili['language']."&season=".$sezon."&week=".$hafta."&sid=".$sezonid."&spid=vflm&match_ids=".$match_ids."");

echo $veriicerik;

}

}

?>