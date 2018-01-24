<?php
require __DIR__.'/predis/autoload.php';
 
$single_server = array(
    'host' => '127.0.0.1',
    'port' => 6379,
    'database' => 0,
);

$client = new Predis\Client();

$backData = file_get_contents('pricing.json');
$backData = str_replace('\\', '', $backData);

$client->hset('API','pricing',$backData);
$return = $client->hget('API','pricing');

echo($return);

?>