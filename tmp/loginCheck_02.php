<?php 
	include("conn.php");
?>

<?php
	$zgh=$_POST['zgh'];
	$mima=$_POST['mima'];
//echo $zgh;
	
	//获取当前用户基本信息：密码、部门、权限、姓名等；
	$SQL="select mima,bm,qx,xm from jsxxb where zgh='$zgh'";
//echo $SQL;	
	$query=mysqli_query($conn,$SQL);
	$row=mysqli_fetch_array($query,MYSQLI_ASSOC) or die('没有此用户！');
	$kuMima=$row['mima'];
	$kkxy=$row['bm'];
	$qx=$row['qx'];
	$xm=$row['xm'];
	
	//获取当前学年、学期
	$SQL="select dqxnxq from systeminfo where bmmc='xueshengchu'";
	$query=mysqli_query($conn,$SQL);
	$row=mysqli_fetch_array($query,MYSQLI_ASSOC) or die('Error querying database.');	
	$dqxnxq=$row['dqxnxq'];
	$dqxn=substr($dqxnxq,0,9);
	$dqxq=substr($dqxnxq,strlen($dqxnxq)-1,1);
	
	//设置session
	session_start();
	$_SESSION['zgh']=$zgh;
	$_SESSION['kkxy']=$kkxy;
	$_SESSION['qx']=$qx;
	$_SESSION['xm']=$xm;
	$_SESSION['dqxn']=$dqxn;
	$_SESSION['dqxq']=$dqxq;	

	if($mima==$kuMima){
		if($qx%2==0){
			echo "<script> window.location.href='qxfp.php'</script>"; 	//转至管理员用户界面（权限分配）；
		}else if($qx%3==0){
			echo "<script> window.location.href='jxrwb.php'</script>"; 	//转至教研主任用户界面（下达教学任务）；
		}else if ($qx%5==0){
			echo "<script> window.location.href='show_jsjxrwb.php'</script>"; 	//转至任课教师界面（教学任务显示）；
		}else if($qx%7==0){
			echo "<script> window.location.href='show_jxrwb.php'</script>"; 	//转至学工院长界面（教学任务显示）；
		}else{ 
			echo "error";
		}
	}else {
		echo "<script> alert('用户名或密码不正确！'); </script>";
		echo "<script> window.location.href='login.php' </script>";  		
		//header("Location: login.php");  //使用此方法，不会出现警告框；
		//exit;
	}

	//跳转到工作页面（下达教学任务）
	//重定向浏览器 
	//header("Location: http://bbs.lampbrother.net"); 
	//header("Location: jxrwb.php");
	//确保重定向后，后续代码不会被执行 
	//exit;	//确保以后代码不再被执行，无此语句，则会继续执行后面语句；
?>  
