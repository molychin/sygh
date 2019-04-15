<?php 
	include("conn.php");
?>

<?php
	$zgh=$_POST['zgh'];
	$mima=$_POST['mima'];
	$juese=$_POST['juese'];
	
	//获取当前学年、学期
	$SQL="select sygh_dqxnxq from systeminfo where bmmc='xueshengchu'";
	$query=mysql_query($SQL);
	$row=mysql_fetch_array($query) or die('Error querying database.');	
	$dqxnxq=$row['sygh_dqxnxq'];
	$dqxn=substr($dqxnxq,0,9);
	$dqxq=substr($dqxnxq,strlen($dqxnxq)-1,1);
	
	
	//--获取当前用户基本信息
	if($juese=='xs'){
		$SQL="select xh,xm,mima from xsjbxxb where xh='$zgh'";
		$query=mysql_query($SQL);
		$row=mysql_fetch_array($query) or die('没有此用户！');
		$kuMima=$row['mima'];
		$xm=$row['xm'];		
	}else if($juese=='js'){
		$SQL="select zgh,xm,mima,sygh_qx from jsxxb where zgh='$zgh'";
		echo $SQL;
		$query=mysql_query($SQL);
		$row=mysql_fetch_array($query) or die('没有此用户！');
		$kuMima=$row['mima'];
		$xm=$row['xm'];				
	}
	
	//设置session
	session_start();
	$_SESSION['zgh']=$zgh;
	$_SESSION['juese']=$juese;
	$_SESSION['xm']=$xm;
	$_SESSION['dqxn']=$dqxn;
	$_SESSION['dqxq']=$dqxq;	

	if($mima==$kuMima){
		//echo "ok!$zgh$xm$juese";		
		if($juese=='xs'){
			echo "<script> window.location.href='xsjbxx_xs.php'</script>"; 	//
		}else if($juese=='js'){
			echo "<script> window.location.href='selectXs_js.php'</script>"; 	//
		}else{
			echo "error";
		}
	}else {
		echo "<script> alert('用户名或密码不正确！'); </script>";
		echo "<script> window.location.href='login.php' </script>";  		
	}

	//跳转到工作页面（下达教学任务）
	//重定向浏览器 
	//header("Location: http://bbs.lampbrother.net"); 
	//header("Location: jxrwb.php");
	//确保重定向后，后续代码不会被执行 
	//exit;	//确保以后代码不再被执行，无此语句，则会继续执行后面语句；
?>  
