<?php
	require_once ('ini.php');

	$db = new Database();
	
	$items = $db->getJoinResult();

foreach ($items as $item){
	echo $item['catID'] .' ' .$item['name'] .' ' .$item['rfid'] .' ' . $item['status'] .' ' . $item['posttime'] . '</br>';
}

?>

