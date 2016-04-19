<?php
	require_once ('ini.php');
	$db = new Database();
	$cats= $db->getCategories();



	if ($_GET && $_GET['action']=='delete' && $_GET['rfid'] !=''){
		$db->deleteItem($_GET['rfid']);
		header('location:item.php');die();
	}else if ($_GET && $_GET['action'] =='suspend' && $_GET['rfid'] !=''){
		$db->supsendItem($_GET['rfid']);
		header('location:item.php');die();
	}else if ($_GET && $_GET['action'] == 'unsuspend' && $_GET['rfid'] !=''){
		$db->existItem($_GET['rfid']);
		header('location:item.php');die();
	}else if ($_GET && $_GET['action'] == 'exist' && $_GET['rfid'] !=''){
		$db->existItem($_GET['rfid']); 
		header('location:item.php');die();
	}else if ($_GET && $_GET['action'] == 'lost' && $_GET['rfid'] !=''){
		$db->lostItem($_GET['rfid']);
		header('location:item.php');die();
	}else if ($_POST && $_POST['rfid']!=''  && $db->isItemExists($_POST['rfid'])){
		$msg = "Sorry.The RFID is already in used. Please change another one.";
	}else if ($_POST && $_POST['rfid'] != '' && !$db->isItemExists($_POST['rfid']) ){
		$db->addItem($_POST['rfid'],$_POST['catid']);
		$msg = '<script> alert("Success");setTimeout("window.close()", 500);</script>';
	}

?>
<?php echo $msg;?>
<form method="POST" action = "itemm.php">
RFID:<input type="text" name="rfid"></input></br>
Category:<select name="catid">
	<?php 
	foreach ($cats as $cat){  
		echo '<option value="'.$cat['catid'].'">'.$cat['name'].'</option>';
	} 
	?>
</select></br>

state:<select name="status">
  <option value="Exist">Exist</option>
  <option value="Suspend">Suspend</option>
  <option value="Lost">Lost</option>
</select></br>

<input type="submit"></br>
</form>


