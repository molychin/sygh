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
	$qx=$_SESSION['qx'];
	$njfw="'".$_SESSION['njfw']."'";

	if($juese=='xs'){
		$juese_mc='ѧ��';
		$nianji=$_SESSION['nj'];
	}else if($juese=='js'){
		$bmdm=$_SESSION['bmdm'];
		if($qx%2==0){
			$juese_mc='����Ա';
		}else if($qx%3==0){
			$juese_mc='��������';			
		}else if($qx%5==0){
			$juese_mc='�ον�ʦ';
		}else if($qx%7==0){
			$juese_mc='ѧ��Ժ��';
		}else if($qx%11==0){
			$juese_mc='������';
		}else if($qx%13==0){
			$juese_mc='����Ա';
		}else{
			$juese_mc='��ͨ��ʦ';
		}
	}else{
		
	}
	echo "����ѧ��ְҵ���Ĺ滮�顷ģ�� | ��ɫ��$juese_mc| ѧ�ţ�$zgh | ������ $xm | ��ǰѧ�꣺$dqxn | ��ǰѧ�ڣ�$dqxq | <a href='help.php'>����</a> | <a href='logout.php'>ע�� | </a><br>";	

	if($juese=='js'){	
		if($qx%2==0){
			echo "| <a href='qxfp.php'>Ȩ�޷���</a> | <a href='qxfp_bzr.php'>���������</a> | <a href='xtcs.php'>ϵͳ��������</a> | <a href='insert_new_stu.php'>������������</a> |";
		}	
		if($qx%3==0 || $qx%7==0){
			echo "|<a href='show_xs.php'>�鿴������|</a>";
		}
		if($qx%3==0){
			echo "| <a href='qxfp_bzr.php'>���������</a> ";
		}
		if($qx%11==0){
			echo "| <a href='xsjbxx_js.php'>���������</a> |";
		}
	}
?>

<hr>
</div>

