<?php
require_once('ini.php');
if (!isset($_SESSION['logined'])){
	header('location:/');
	die();
}

$db = new Database();
$catAry = $db->getCategories();
?>





<!DOCTYPE html>
<html>
<head>
    <title>RFID Tool Tracking Panel</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <link  href="css/admin.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="jquery-latest.js"></script>
    <script type="text/javascript"  src="jquery.tablesorter.min.js"></script>
    <script>
        $(document).ready(function(){ 
                $("#myTable").tablesorter(); 
            } 
        ); 
    </script>
</head>
<body>
    <div id="main">
        <div id="header">
            <a href="#" class="logo"><img src="img/logo.gif" width="110" alt="" /></a>
            <ul id="top-navigation">
                <li><a href="." class="active">RFID Tool Tracking Panel</a></li>
            </ul>
        </div>
        <div id="middle">
            <div id="left-column">
                <h3>Header</h3>
                <ul class="nav">
                    <li><a href=".">Homepage</a></li>
                    <li><a href="index.php?action=logout">Logout</a></li>
                    <li><a href="cat.php">Category Management</a></li>
                    <li><a href="item.php">Item Management</a></li>
                </ul>
            </div>
            <div id="center-column">
                <div class="top-bar">
                    <a href="#" onClick="MyWindow=window.open('catm.php?action=add','MyWindow','width=600,height=200'); return false;" class="button">Add a New Category</a>
                    <h1>Contents</h1>
                    <div class="breadcrumbs"><a href=".">Homepage</a> </div>
                </div>
                <div class="table">
                    <table class="listing tablesorter"  id="myTable" cellpadding="0" cellspacing="0">
                        <thead><tr>
                            <th>Name</th>
                            <th>Category ID</th>
                            <th>Total</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr></thead>
                        <tbody>
                        <?php
						$i=0; 
						foreach ($catAry as $cat){
							$alt='';
							$i++;
							if ($i%2==0){
								$alt = 'class = "alt"';
							}
							$del='';
							if ($cat['ttl']==0){
								$del = '<a href="#" onClick="MyWindow=window.open(\'catm.php?action=delete&catid='.$cat['catid'].'\',\'MyWindow\',\'width=600,height=200\'); return false;">remove</a>';
							} ?>
                        <tr> 

                            <td class="style1"><?php echo $cat['name']?></td>
                            <td class="style3"><?php echo $cat['catid']?></td>
                            <td class="style3"><?php echo $cat['ttl']?></td>
                            <td class="style3"><?php echo $cat['descs']?></td>
                            <td class="style2">
                            	
                        <a href="#" onClick="MyWindow=window.open('catm.php?action=edit&catid=<?php echo $cat['catid']?>','MyWindow','width=600,height=200'); return false;">edit</a></br>
                        <?php echo $del?>
                            </td>
                        </tr>
                            <?php } ?>
                        <tbody>
                    </table>
                </div>

            </div>
            <div id="right-column">
                <strong class="h">Quick Info</strong>
                <div class="box">Welcome.</div>
            </div>
        </div>
    </div>
</body>
</html>

