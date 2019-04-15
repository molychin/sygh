<html>
<head><title>
《大学生职业生涯规划书》模块
</title>
<meta http-equiv="content-type" content="text/html;charset=gb2312" />
<link href="css/molychin.css" type="text/css" rel="stylesheet" />
</head>
<body>
<script type="text/javascript" src="js/jquery.js"></script>
<div class="head_div">

<?php
	session_start();
	$zgh=$_SESSION['zgh'];
	$xm=$_SESSION['xm'];
	$dqxn=$_SESSION['dqxn'];
	$dqxq=$_SESSION['dqxq'];
	$juese=$_SESSION['juese'];
	
	echo "《大学生职业生涯规划书》模块 | 角色：$juese| 学号：$zgh | 姓名： $xm | 当前学年：$dqxn | 当前学期：$dqxq | <a href='help.php'>帮助</a> | <a href='logout.php'>注销 | </a>";
?>

<hr>
</div>

