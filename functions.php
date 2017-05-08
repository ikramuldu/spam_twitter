<?php
function var_dump1(&$x){
    echo '<pre>';
    var_dump($x);
    echo'</pre>';
}
function splitForm($form,&$action,&$fields){
    if(count($fields)>0)unset($fields);
    $form=explode('<input ',$form);
    preg_match('%action="([^"]*)"%',$form[0],$match);
    $action=$match[1];
    $sz=count($form);
    for($i=1;$i<$sz;$i++){
        preg_match('%name="([^"]*)"%',$form[$i],$name);
        preg_match('%value="([^"]*)"%',$form[$i],$value);
        if(!isset($name[1]))continue;
        if(!isset($value[1]))$value[1]="";
        $fields[$name[1]]=$value[1];
    }
}
function curl_custom_postfields($ch, array $assoc = array(), array $files = array()) {
    $boundary = "---------------------7d01ecf406a6";
    foreach ($assoc as $k => $v)
        $body[] = "--{$boundary}\r\nContent-Disposition: form-data; name=\"{$k}\"\r\n\r\n{$v}";
    foreach ($files as $k => $v)
        $body[] =  "--{$boundary}\r\nContent-Disposition: form-data; name=\"{$k}\"; filename=\"img.jpg\"\r\nContent-Type: image/jpeg\r\n\r\n".file_get_contents($v);
    // add final boundary
    $body[] = "--{$boundary}--\r\n";
    curl_setopt($ch,CURLOPT_POSTFIELDS,implode("\r\n", $body));
    curl_setopt($ch,CURLOPT_HTTPHEADER,["Content-Type: multipart/form-data; boundary={$boundary}"]);
}

?>