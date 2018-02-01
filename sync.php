<?php
require __DIR__.'/predis/autoload.php';
$singleServerMaster = array(
    'host' => 'localhost',
    'port' => 6380,
    'database' => 0,
    //'password' => 'r0b0deckPublicred1s95321',
);

$singleServerSlave = array(
    'host' => 'localhost',
    'port' => 6379,
    'database' => 0,    
);

$client = new Predis\Client($singleServerMaster);
$clientSlave = new Predis\Client($singleServerSlave);

$allKeys = array('API','ARB','ARBI','CONST','DEPTH','PRICES','TICKER');

$clientSlave->flushdb();
foreach ($allKeys as $index => $rediskey) {	 	 
 	 echo($rediskey.' ');
 	 $haskAll = $client->hgetall($rediskey);
 	foreach ($haskAll as $hashKey => $hashValue) {	 		
 		$result = $clientSlave->hset($rediskey,$hashKey, $hashValue);
 		//if($result == 1) echo($rediskey.' '.$hashKey.' has been updated.');
 	}	 		 		
}
?>