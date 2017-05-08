<?php
set_time_limit(1000000);
include "functions.php";
include "const.php";
$str="qwertyuiopasdfghjklmnbvcxz1234567890";
$handle = fopen ("php://stdin","r");
while(true){
    $mailId="";
    for($i=0;$i<8;$i++)$mailId.=$str[rand(0,35)];
    $mailId.="@cartelera.org";
    $cook='cookies/'.$mailId;
    if(!file_exists($cook)){
        $tf=fopen($cook,'w');
        fclose($tf);
    }
    $cook=realpath($cook);
    //initialise curl
    $ch=curl_init();
    curl_setopt($ch, CURLOPT_USERAGENT, CHROME);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_COOKIESESSION, 1);
    curl_setopt($ch, CURLOPT_COOKIEFILE,$cook);
    curl_setopt($ch, CURLOPT_COOKIEJAR,$cook);
    //get name
    while(!isset($name[1])) {
        $page = file_get_contents(FAKENAME);
        preg_match('%<h3>([^<]*)%', $page, $name);
    }
    $name=$name[1];
    //load page
    curl_setopt($ch,CURLOPT_URL,REG);
    do{$page=curl_exec($ch);}while($page==false);
    //submit form
    preg_match('%<form id="phx.*%s',$page,$form);
    $form=explode("</form>",$form[0]);
    splitForm($form[0],$action,$fields);
    $fields["user[name]"]=$name;
    $fields["user[email]"]=$mailId;
    $fields["user[user_password]"]=$mailId."?";
    curl_setopt($ch,CURLOPT_URL,html_entity_decode($action));
    curl_setopt($ch,CURLOPT_POST,1);
    curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($fields));
    do{$page=curl_exec($ch);}while($page==false);
    file_put_contents(DEB,$page);
    exit();
    //redirect
    curl_setopt($ch,CURLOPT_URL,PASS);
    do{$page=curl_exec($ch);}while($page==false);
    //phone number
    preg_match('%<form action.*</form>%s',$page,$form);
    splitForm($form[0],$action,$fields);
    $fields["country_code"]="880";
    $fields["phone_number"]="01939308467";
    var_dump1($fields);
    curl_setopt($ch,CURLOPT_URL,URL.html_entity_decode($action));
    curl_setopt($ch,CURLOPT_POST,1);
    curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($fields));
    do{$page=curl_exec($ch);}while($page==false);
    preg_match('%<form .*</form>%s',$page,$form);
    splitForm($form[0],$action,$fields);
    $fields["session[username_or_email]"]=$mailId;
    $fields["session[password]"]=$mailId."?";
    curl_setopt($ch,CURLOPT_URL,URL.html_entity_decode($action));
    curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($fields));
    do{$page=curl_exec($ch);}while($page==false);
    //get confirmation link
    $confLink=null;
    $md5=md5($mailId);
    while(!isset($confLink[0])){
        $page=file_get_contents("http://api.temp-mail.ru/request/mail/id/$md5/");
        preg_match('%[^"]*confirm_user_email[^"]*%',$page,$confLink);
    }
    curl_setopt($ch,CURLOPT_URL,html_entity_decode($confLink[0]));
    $page=curl_exec($ch);
    file_put_contents("result.html",$page);
    curl_close($ch);
    //confirmed
}
?>