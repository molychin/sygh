<html>
<head><title>
����ѧ��ְҵ���Ĺ滮�顷ģ��
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
	
	echo "����ѧ��ְҵ���Ĺ滮�顷ģ�� | ��ɫ��$juese| ѧ�ţ�$zgh | ������ $xm | ��ǰѧ�꣺$dqxn | ��ǰѧ�ڣ�$dqxq | <a href='help.php'>����</a> | <a href='logout.php'>ע�� | </a>";
?>

<hr>
</div>

