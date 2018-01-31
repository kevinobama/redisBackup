<?php
require __DIR__.'/predis/autoload.php';
//redis-cli -h 54.238.155.92 -p 6379 -a r0b0deckPublicred1s95321 
//54.238.128.48
//54.238.155.92
$singleServerMaster = array(
    'host' => 'localhost',
    'port' => 6380,
    'database' => 0,
    //'password' => 'r0b0deckPublicred1s95321',
);

$singleServerSlave = array(
    'host' => 'localhost',
    'port' => 6379,
    'database' => 1,    
);

$client = new Predis\Client($singleServerMaster);
$clientSlave = new Predis\Client($singleServerSlave);

$allKeys = $client->keys('*');
//print_r($allKeys);
$clientSlave->flushdb();
foreach ($allKeys as $index => $rediskey) {
	 //echo($rediskey);
	//if($index==1 || $index == 3) {
	 if(strpos($rediskey,'laravel') === false) {
	 	 $haskAll = $client->hgetall($rediskey);
	 	foreach ($haskAll as $hashKey => $hashValue) {	 		
	 		$result = $clientSlave->hset($rediskey,$hashKey, $hashValue);
	 		if($result == 1) echo($rediskey.' '.$hashKey.' has been updated.');
	 	}	 	
	 	//echo('data='.$rediskey."   ");
	 }		
	//}	
}

//echo($return);


?>