<?php
// $fp = fsockopen("localhost", 8888, $errno, $errstr, 30);
// if (!$fp) {
//     echo "$errstr ($errno)<br />\n";
// } else {
//     fwrite($fp, "You message");
//     while (!feof($fp)) {
//         echo fgets($fp, 128);
//     }
//     fclose($fp);
// }



 
  
    if(!$fp=fsockopen('127.0.0.1',8888,$errstr,$errno,30))
    {
        trigger_error('Error opening socket',E_USER_ERROR);
    }

    $message='data';
    // write message to socket server
    fputs($fp,$message);
    // get server response
    $ret=fgets($fp,1024);
    // close socket connection
    fclose($fp);
    echo '<h1>You entered the following message in lowercase :'.$ret.'</h1>';
     
 

 curl -v -H "X-Proxy-URL: http://www.baidu.com" http://localhost:9007/proxy.php
