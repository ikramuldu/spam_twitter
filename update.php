<?php
include("functions.php");
include("const.php");
$cook=realpath("cookies/hucloslitr@throwam.com");
$ch=curl_init();
curl_setopt($ch, CURLOPT_USERAGENT, OPERA);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_COOKIESESSION,1);
curl_setopt($ch, CURLOPT_COOKIEFILE,$cook);
curl_setopt($ch, CURLOPT_COOKIEJAR,$cook);
/* profile
curl_setopt($ch,CURLOPT_URL,FAKEPIC.rand(0,50));
$page=curl_exec($ch);
preg_match('%imgurl=([^&]*)%',$page,$pic);
curl_setopt($ch,CURLOPT_URL,PPURL);
$page=curl_exec($ch);
preg_match('%<form .*</form>%',$page,$form);
splitForm($form[0],$action,$fields);
curl_setopt($ch,CURLOPT_URL,html_entity_decode($action));
curl_setopt($ch,CURLOPT_POST,1);
curl_custom_postfields($ch,$fields,['pic'=>$pic[1]]);
curl_exec($ch);
*/
/*   page like
$fp=fopen('page_link.txt','r');
while(fscanf($fp,"%s",$id)){
    curl_setopt($ch, CURLOPT_URL,URL.$id);
    $page=curl_exec($ch);
    preg_match('%[^"]*pageSuggestionsOnLiking[^"]*%',$page,$id);
    curl_setopt($ch, CURLOPT_URL,URL.html_entity_decode($id[0]));
    curl_exec($ch);
}
*/
/*  set bio
curl_setopt($ch,CURLOPT_URL,BIO);
$page=curl_exec($ch);
preg_match('%bio">([^<]*)%',$page,$bio);
$bio=substr($bio[1],0,100);
curl_setopt($ch,CURLOPT_URL,DETAILS);
$page=curl_exec($ch);
preg_match('%<form method="post" .*</form>%',$page,$form);
splitForm($form[0],$action,$fields);
$fields['bio']=$bio;
$fields['publish_to_feed']="";
curl_setopt($ch,CURLOPT_URL,URL.$action);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($fields));
curl_exec($ch);
*/
/*
curl_setopt($ch,CURLOPT_URL,POLITICS);
$page=curl_exec($ch);
preg_match('%<form method="post" .*</form>%',$page,$form);
splitForm($form[0],$action,$fields);
$fields['political[]']="democretic";
curl_setopt($ch,CURLOPT_URL,URL.$action);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($fields));
curl_exec($ch);
*/
/*
curl_setopt($ch,CURLOPT_URL,HOMETOWN);
$page=curl_exec($ch);
preg_match('%<form method="post" .*</form>%',$page,$form);
$form=explode("</form>",$form[0]);
splitForm($form[0],$action,$fields);
$fields['hometown[]']="california";
curl_setopt($ch,CURLOPT_URL,URL.$action);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($fields));
$page=curl_exec($ch);
preg_match('%<form method="post".*</form>%is',$page,$form);
$form=explode("</form>",$form[0]);
splitForm($form[0],$action,$fields);
preg_match('%<select .*</select>%',$form[0],$select);
$select=explode("<option",$select[0]);
$max=count($select);
preg_match('%value="([^"]*)%',$select[rand(1,$max-1)],$cityId);
$fields['add_ids[]']=$cityId[1];
unset($fields['hometown[]']);
curl_setopt($ch,CURLOPT_URL,URL.$action);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($fields));
$page=curl_exec($ch);
*/
/*
curl_setopt($ch,CURLOPT_URL,CURRENTCITY);
$page=curl_exec($ch);
preg_match('%<form method="post" .*</form>%',$page,$form);
$form=explode("</form>",$form[0]);
splitForm($form[0],$action,$fields);
$fields['current_city[]']="New York";
curl_setopt($ch,CURLOPT_URL,URL.$action);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($fields));
$page=curl_exec($ch);
preg_match('%<form method="post".*</form>%is',$page,$form);
$form=explode("</form>",$form[0]);
splitForm($form[0],$action,$fields);
preg_match('%<select .*</select>%',$form[0],$select);
$select=explode("<option",$select[0]);
$max=count($select);
preg_match('%value="([^"]*)%',$select[rand(1,$max-1)],$cityId);
$fields['add_ids[]']=$cityId[1];
unset($fields['current_city[]']);
curl_setopt($ch,CURLOPT_URL,URL.$action);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($fields));
$page=curl_exec($ch);
*/
/*
curl_setopt($ch,CURLOPT_URL,SKILLS);
$page=curl_exec($ch);
preg_match('%<form method="post" .*</form>%',$page,$form);
$form=explode("</form>",$form[0]);
splitForm($form[0],$action,$fields);
$fields['add_strs[0]']="programmer";
curl_setopt($ch,CURLOPT_URL,URL.$action);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($fields));
$page=curl_exec($ch);
preg_match('%<form method="post".*</form>%is',$page,$form);
$form=explode("</form>",$form[0]);
splitForm($form[0],$action,$fields);
preg_match('%<select .*</select>%',$form[0],$select);
$select=explode("<option",$select[0]);
$max=count($select);
preg_match('%value="([^"]*)%',$select[rand(1,$max-1)],$cityId);
$fields['add_ids[0]']=$cityId[1];
unset($fields['add_strs[0]']);
curl_setopt($ch,CURLOPT_URL,URL.$action);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($fields));
$page=curl_exec($ch);
*/
/*
curl_setopt($ch,CURLOPT_URL,"http://wwww.quotationspage.com/quote/".rand(1,10000).".html");
$page=curl_exec($ch);
preg_match('%<dt>([^<]*)%',$page,$quto);
curl_setopt($ch,CURLOPT_URL,QUOTES);
$page=curl_exec($ch);
preg_match('%<form method="post" .*</form>%',$page,$form);
$form=explode("</form>",$form[0]);
splitForm($form[0],$action,$fields);
$fields['quote']=$quto[1];
curl_setopt($ch,CURLOPT_URL,URL.$action);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($fields));
curl_exec($ch);
*/
/*
curl_setopt($ch,CURLOPT_URL,INTEREST);
$page=curl_exec($ch);
preg_match('%<form method="post" .*</form>%',$page,$form);
$form=explode("</form>",$form[0]);
splitForm($form[0],$action,$fields);
curl_setopt($ch,CURLOPT_URL,URL.$action);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($fields));
curl_exec($ch);
*/
/*
curl_setopt($ch,CURLOPT_URL,LANG);
$page=curl_exec($ch);
preg_match('%<form method="post" .*</form>%',$page,$form);
$form=explode("</form>",$form[0]);
splitForm($form[0],$action,$fields);
$fields['add_strs[0]']="php";
curl_setopt($ch,CURLOPT_URL,URL.$action);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($fields));
$page= curl_exec($ch);
preg_match('%<form method="post".*</form>%is',$page,$form);
$form=explode("</form>",$form[0]);
splitForm($form[0],$action,$fields);
preg_match('%<select .*</select>%',$form[0],$select);
$select=explode("<option",$select[0]);
$max=count($select);
preg_match('%value="([^"]*)%',$select[rand(1,$max-1)],$cityId);
$fields['add_ids[0]']=$cityId[1];
unset($fields['add_strs[0]']);
curl_setopt($ch,CURLOPT_URL,URL.$action);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($fields));
$page=curl_exec($ch);
*/
/*
curl_setopt($ch,CURLOPT_URL,GROUP);
$page=curl_exec($ch);
preg_match('%<form method="post" .*</form>%',$page,$form);
$form=explode("</form>",$form[0]);
splitForm($form[0],$action,$fields);
curl_setopt($ch,CURLOPT_URL,URL.$action);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($fields));
$page= curl_exec($ch);
*/
curl_close($ch);
?>