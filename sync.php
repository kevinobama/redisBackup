<?php
require __DIR__.'/predis/autoload.php';
//redis-cli -h 54.238.155.92 -p 6379 -a r0b0deckPublicred1s95321 
$singleServerMaster = array(
    'host' => '54.238.155.92',
    'port' => 6379,
    'database' => 0,
    'password' => 'r0b0deckPublicred1s95321',
);

$singleServerSlave = array(
    'host' => 'localhost',
    'port' => 6379,
    'database' => 1,    
);

$client = new Predis\Client($singleServerMaster);
$clientSlave = new Predis\Client($singleServerSlave);

$allKeys = $client->keys('*');
print_r($allKeys);
foreach ($allKeys as $key => $rediskey) {
	 //echo($rediskey);
	 if(strpos($rediskey,'laravel') === false) {
	 	$allHashKeys = $client->hgetall($rediskey);
	 	foreach ($allHashKeys as $hashKey => $hashValue) {
	 		 //$clientSlave->hset($hashKey,$hashValue);
	 		echo('hashKey='.$hashKey."   ");
	 	}
	 	//print_r($allHashKeys);	 	
	 	echo('data='.$rediskey."   ");
	 } 
}

//echo($return);


?>