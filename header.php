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
	$qx=$_SESSION['qx'];
	$njfw="'".$_SESSION['njfw']."'";

	if($juese=='xs'){
		$juese_mc='学生';
		$nianji=$_SESSION['nj'];
	}else if($juese=='js'){
		$bmdm=$_SESSION['bmdm'];
		if($qx%2==0){
			$juese_mc='管理员';
		}else if($qx%3==0){
			$juese_mc='教研主任';			
		}else if($qx%5==0){
			$juese_mc='任课教师';
		}else if($qx%7==0){
			$juese_mc='学工院长';
		}else if($qx%11==0){
			$juese_mc='班主任';
		}else if($qx%13==0){
			$juese_mc='辅导员';
		}else{
			$juese_mc='普通教师';
		}
	}else{
		
	}
	echo "《大学生职业生涯规划书》模块 | 角色：$juese_mc| 学号：$zgh | 姓名： $xm | 当前学年：$dqxn | 当前学期：$dqxq | <a href='help.php'>帮助</a> | <a href='logout.php'>注销 | </a><br>";	

	if($juese=='js'){	
		if($qx%2==0){
			echo "| <a href='qxfp.php'>权限分配</a> | <a href='qxfp_bzr.php'>分配班主任</a> | <a href='xtcs.php'>系统参数设置</a> | <a href='insert_new_stu.php'>增加新生数据</a> |";
		}	
		if($qx%3==0 || $qx%7==0){
			echo "|<a href='show_xs.php'>查看完成情况|</a>";
		}
		if($qx%3==0){
			echo "| <a href='qxfp_bzr.php'>分配班主任</a> ";
		}
		if($qx%11==0){
			echo "| <a href='xsjbxx_js.php'>班主任审核</a> |";
		}
	}
?>

<hr>
</div>

