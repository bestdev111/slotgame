<?php
$spid = @$_GET['spid'];
$version = @$_GET['version'];
$mobile = @$_GET['mobile'];

function curlfonksiyon($adres){
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$adres);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
return  curl_exec($ch);
curl_close($ch);
}

if($spid=="vfct"){

$verigetir = curlfonksiyon("https://betwingo.xyz/api/virtualgames.php?spid=vfct");

echo $verigetir;

} else if($spid=="vfcc"){

$verigetir = curlfonksiyon("https://betwingo.xyz/api/virtualgames.php?spid=vfcc");

echo $verigetir;

} else if($spid=="vfwc"){

$verigetir = curlfonksiyon("https://betwingo.xyz/api/virtualgames.php?spid=vfwc");

echo $verigetir;

} else if($spid=="vfec"){

$verigetir = curlfonksiyon("https://betwingo.xyz/api/virtualgames.php?spid=vfec");

echo $verigetir;

} else if($spid=="vflm"){

$verigetir = curlfonksiyon("https://betwingo.xyz/api/virtualgames.php?spid=vflm");

echo $verigetir;

} else if($spid=="vbl"){

$verigetir = curlfonksiyon("https://betwingo.xyz/api/virtualgames.php?spid=vbl");

echo $verigetir;

} else if($spid=="vhc"){

$verigetir = curlfonksiyon("https://betwingo.xyz/api/virtualgames.php?spid=vhc");

echo $verigetir;

} else if($spid=="vdr"){

$verigetir = curlfonksiyon("https://betwingo.xyz/api/virtualgames.php?spid=vdr");

echo $verigetir;

}