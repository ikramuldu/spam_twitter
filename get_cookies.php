<?php
set_time_limit(1000);
include "functions.php";
include "const.php";
$mails=fopen("mail.txt","r");
while(fscanf($mails,"%s",$mailId)) {
    $cook='cookies/'.$mailId;
    if(!file_exists($cook)){
        $tf=fopen($cook,'w');
        fclose($tf);
    }
    $cook = realpath($cook);
    //initialise CURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_USERAGENT, OPERA);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_COOKIESESSION, 1);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cook);
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cook);
    //login page
    curl_setopt($ch, CURLOPT_URL, "https://mobile.twitter.com/");
    $page = curl_exec($ch);
    //submit form
    preg_match('%<form.*</form>%s',$page,$form);
    splitForm($form[0],$action,$fields);
    $fields["session[username_or_email]"]=$mailId;
    $fields["session[password]"]=$mailId."?";
    curl_setopt($ch,CURLOPT_URL,"https://mobile.twitter.com/sessions");
    curl_setopt($ch,CURLOPT_POST,1);
    curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($fields));
    echo curl_exec($ch);
    //log out
    curl_setopt($ch, CURLOPT_URL, "https://mobile.twitter.com/logout");
    $page = curl_exec($ch);
    preg_match('%<form.*</form>%s',$page,$form);
    splitForm($form[0],$action,$fields);
    curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($fields));
    echo curl_exec($ch);
    //check
    curl_setopt($ch, CURLOPT_URL, "https://mobile.twitter.com/");
    echo curl_exec($ch);
    curl_close($ch);
    exit();
}
?>