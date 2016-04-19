<?php 
require_once ('ini.php');

$db = new Database();

$items = $db->getJoinResult();

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
            <a href="#" class="logo"><img src="img/logo.gif" width="101" height="29" alt="" /></a>
            <ul id="top-navigation">
                <li><a href="." class="active">RFID Tool Tracking Panel</a></li>
            </ul>
        </div>
        <div id="middle">
            <div id="left-column">
                <h3>Menu</h3>
                <ul class="nav">
                    <li><a href=".">Homepage</a></li>
                    <li><a href="index.php?action=logout">Logout</a></li>
                    <li><a href="cat.php">Category Management</a></li>
                    <li><a href="item.php">Item Management</a></li>
                </ul>
            </div>
            <div id="center-column">
                <div class="top-bar">
                    <a href=".?refresh=<?php echo rand()?>" class="button">Update Status </a>
                    <h1>Contents</h1>
                    <div class="breadcrumbs"><a href=".">Homepage</a> </div>
                </div>
                <div class="table">
                    <table class="listing tablesorter" id="myTable" cellpadding="0" cellspacing="0"><thead>
                        <tr>
                            <th>RFID</th>
                            <th>Name</th>
                            <th>CatID</th>
                            <th>Status</th>
                            <th>Last Updated Time</th>
                        </tr></thead><tbody>
                        <tr>                        <?php foreach ($items as $item){ ?>
                            <td class="style1"><?php echo $item['rfid']?></td>
                            <td class="style3"><?php echo $item['name']?></td>
                            <td class="style3"><?php echo $item['catID']?></td>
                           <td class="style3"><?php 
                            $k ='';
                            switch($item['status']){
                            case 'Lost': $k.='red'; break;
                            case 'Exist': $k.='green'; break;
                            case 'Suspended': $k.='blue'; break;
                            }

                            echo  '<'. $k .'>'. $item['status'] . '</'. $k .'>';
                            ?></td>
                            <td class="style3"><?php echo $item['posttime']?></td>

                        </tr>
                            <?php } ?>
                            </tbody>
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