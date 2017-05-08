<?php
set_time_limit(1000);
include "functions.php";
include "const.php";
$cooks=scandir("cookies");
unset($cooks[0]);
unset($cooks[1]);
$count=0;
foreach ($cooks as $cook){
    $count++;
    //if($count<=1)continue;
    $cook = realpath("cookies/$cook");
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_USERAGENT, OPERA);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_COOKIESESSION, 1);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cook);
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cook);
    curl_setopt($ch, CURLOPT_URL, "https://mobile.twitter.com/");
    echo curl_exec($ch);
    curl_close($ch);
}
?>