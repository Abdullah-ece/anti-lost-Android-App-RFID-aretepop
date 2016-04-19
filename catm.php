<?php
require ('ini.php');
$msg = '';
if ($_GET && $_GET['action']=='add'){
	render_add($msg);
}else if ($_GET && $_GET['action']=='edit' && $_GET['catid'] != ''){

	$db = new Database();
	$t = $db->getCategory($_GET['catid']);
	render_edit('Edit now',$t['catid'],$t['name'],$t['descs']);
}else if ($_GET&& $_GET['action'] == 'delete'  && $_GET['catid'] != ''){
	render_delete($_GET['catid']);
}else if (!$_POST){
	header('location:/');
	die();
}
?>




<?/*-------------edit post--------------------*/?>
<?php if($_POST && $_POST['action'] == 'edit'){
	if ($_POST['name'] != '' && $_POST['descs'] != ''){
		$db = new Database();
		$db ->editCategory($_POST['catid'],$_POST['name'],$_POST['descs']);
		$msg = '<script> alert("Success");setTimeout("window.close()", 500);</script>';
	}else{
		$msg = 'please enter the name and the description!';
	}
	render_edit($msg,$_POST['catid'],$_POST['name'],$_POST['descs']);

}
?>
<?/*--------------edit --------------------*/?>

<?php
	function render_edit($msg,$catid,$name='',$descs=''){
?>
Welcome to RFID Tool Tracking Panel!</br>
<?php echo $msg?></br>
<form  method="POST" action="/catm.php">
name<input name="name" type="text" value="<?php echo $name?>"></input></br>
description<input name="descs" type="text" value="<?php echo $descs?>"></input>
<input value="edit" type="hidden" name="action"></input>
<input value="<?php echo $catid?>" type="hidden" name="catid"></input>
<input type="submit"/>
</form>
<?php
}
?>





<?/*-------------delete post--------------------*/?>
<?php if($_GET && $_GET['action'] == 'delete' && isset($_GET['doublesure']) && $_GET['doublesure']=='yes'){
	$db = new Database();
	$db->deleteCategory($_GET['catid']);
?>
<script> alert("Success");setTimeout("window.close()", 500);</script>
<?php 
}
?>
<?/*--------------delete--------------------*/?>

<?php
	function render_delete($catid){
?>
Welcome to RFID Tool Tracking Panel!</br>
Are you sure to delete this item? Category ID is <?php echo $catid ?> </br>
<a href="/catm.php?action=delete&doublesure=yes&catid=<?php echo $catid ?>"> Yes </a> 

</br><a href="#" onclick="window.close()">No</a>
<?php
}
?>






<?/*-------------add post--------------------*/?>
<?php if($_POST && $_POST['action'] == 'add'){
	if ($_POST['name'] != '' && $_POST['descs'] != ''){
		$db = new Database();
		$db ->addCategory($_POST['name'],$_POST['descs']);
		$msg = '<script> alert("Success");setTimeout("window.close()", 500);</script>';
	}else{
		$msg = 'please enter the name and the description!';
	}
	render_add($msg,$_POST['name'],$_POST['descs']);

}
?>
<?/*--------------addd--------------------*/?>

<?php
	function render_add($msg,$name='',$descs=''){
?>
Welcome to RFID Tool Tracking Panel!</br>
<?php echo $msg?></br>
<form  method="POST" action="/catm.php">
name<input name="name" type="text" value="<?php echo $name?>"></input></br>
description<input name="descs" type="text" value="<?php echo $descs?>"></input>
<input value="add" type="hidden" name="action"></input>
<input type="submit"/>
</form>

</br><a href="#" onclick="window.close()">back</a>
<?php
}
?>

