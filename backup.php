<?php

require __DIR__.'/predis/autoload.php';
 

$single_server = array(
    'host' => '127.0.0.1',
    'port' => 6379,
    'database' => 0,
);

$client = new Predis\Client();

$value = $client->hget('API','pair_exchanges');
echo($value); 

$backData = file_get_contents('API.json');
//echo('data'.$backData);

?>