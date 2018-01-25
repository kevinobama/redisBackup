<?php
require __DIR__.'/predis/autoload.php';

$parameters = ['tcp://localhost?alias=master', 'tcp://localhost'];
$options    = ['replication' => true];

$client = new Predis\Client($parameters, $options);

// $allKeys = $client->keys('*');
// print_r($allKeys);
// foreach ($allKeys as $key => $rediskey) {
// 	 if(strpos($rediskey,'laravel') === false) {
// 	 	$allHashKeys = $client->hgetall($rediskey);
// 	 	echo('data='.$rediskey."   ");
// 	 } 
// }
?>