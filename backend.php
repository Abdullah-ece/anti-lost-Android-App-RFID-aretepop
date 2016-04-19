<?php
	require_once ('ini.php');
	$db = new Database();

	if ($_POST && $_POST['action'] !='' && $_POST['action'] =='first'){
		$db->resetAllItemsState();
	}else if ($_POST && $_POST['password']=='dsalkhzkjchaijstdgwquyhyedtwak;ldjsakdhsalkjd' && $_POST['json'] != ''){
		if ($db->getItemState($_POST['json'])!= false && $db->getItemState($_POST['json'])!= 'Suspended')
		
		$db->existItem($_POST['json']);
		//$json = $_POST['json'];
		//$json = '{"data":["0000000000000001","0000000000000002"]}';
		//$items = json_decode($json);
		//var_dump($items);
		//foreach ($items as $item){
			//echo ($item);
			//$db->existItem($item);
		//}
	}
?>