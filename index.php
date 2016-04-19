<?php
session_start();
$msg = 'Please login before continue:';
if ($_GET && $_GET['action'] == 'logout'){
	session_destroy();
	$msg = 'Logout!</br>Please login before continue:';
}else if (isset($_SESSION['logined'])){
	header('location:/panel.php');
	die();
}else if ($_POST && $_POST['ac']=='bird' && $_POST['password']=='lok' && !isset($_SESSION['logined'])){
	$_SESSION['logined'] = true;
	header('location:/panel.php');
	die();
}else if ($_POST){
	$msg = 'Wrong Password!</br>Please login before continue:';
}
?>



<!DOCTYPE html>
<html>
<head>
    <title>RFID Tool Tracking Panel</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <link  href="css/admin.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="main">
        <div id="header">
            <a href="#" class="logo"><img src="img/logo.gif" width="110"  alt="" /></a>
            <ul id="top-navigation">
                <li><a href="#" class="active">Homepage</a></li>
            </ul>
        </div>
        <div id="middle">
            <div id="left-column">
                <h3>Action</h3>
                <ul class="nav">
                    <li><a href=".">Login</a></li>
                </ul>
            </div>
            <div id="center-column">
                <div class="top-bar">
                    <h1>Contents</h1>
                    <div class="breadcrumbs"><a href="#">Panel</a> / <a href="#">Login Page</a></div>
                </div>

                 <form  method="POST" action="/index.php">
                    <div class="table">
                        <table class="listing form" cellpadding="0" cellspacing="0">
                            <tr>
                                <th class="full" colspan="2">Welcome to RFID Tool Tracking Panel!</br><?php echo $msg?></br></th>
                            </tr>
                            <tr>
                                <td width="172"><strong>Account Name</strong></td>
                                <td><input type="text" name="ac" class="text" /></td>
                            </tr>
                            <tr>
                                <td><strong>Password</strong></td>
                                <td><input type="password" name="password" class="text" /></td>
                            </tr>
                        </table>
                    </div>
                <input class="button" type="submit"/>
                </form>
            </div>
            <div id="right-column">
                <strong class="h">Quick Info</strong>
                <div class="box">Please login before continue.</div>
            </div>
        </div>
    </div>
</body>
</html>