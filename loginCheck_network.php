<script>
	if (window.top!=window.self){
		window.top.location="loginCheck_network.php";
	}
</script>

<?php 
	include("conn.php");

	session_start();	
	$zgh=$_SESSION['zgh'];		
	$juese=$_SESSION['juese'];
	
	//获取当前学年、学期
	$SQL="select sygh_dqxnxq,njfw from systeminfo where bmmc='xueshengchu'";
	$query=mysqli_query($conn,$SQL);
	$row=mysqli_fetch_array($query,MYSQLI_ASSOC) or die('Error querying database,loginCheck.php.');	
	$dqxnxq=$row['sygh_dqxnxq'];
	$dqxn=substr($dqxnxq,0,9);
	$dqxq=substr($dqxnxq,strlen($dqxnxq)-1,1);
	$njfw=$row['njfw'];	//参加《生涯规划》的年级范围；
	
	
	//--获取当前用户基本信息
	if($juese=='xs'){
		$SQL="select xh,xm,nj from xsjbxxb where xh='$zgh'";
		//echo $SQL;		
		$query=mysqli_query($conn,$SQL);
		$row=mysqli_fetch_array($query,MYSQLI_ASSOC) or die('没有此用户！');
		$xm=$row['xm'];		
		$nianji=$row['nj'];
		$qx='0';
	}else if($juese=='js'){
		$SQL="select zgh,xm,qx,bm,bmdm from jsxxb where zgh='$zgh'";
		//echo $SQL;
		$query=mysqli_query($conn,$SQL);
		$row=mysqli_fetch_array($query,MYSQLI_ASSOC) or die('没有此用户！');
		$xm=$row['xm'];	
		$qx=$row['qx'];
		$xy=$row['bm'];		
		$bmdm=$row['bmdm'];
	}
	
	//设置session
	$_SESSION['xm']=$xm;
	$_SESSION['dqxn']=$dqxn;
	$_SESSION['dqxq']=$dqxq;
	$_SESSION['njfw']=$njfw;
	$_SESSION['qx']=$qx;
	$_SESSION['count']=1;	//当前学生计数
	
	if($juese=='xs'){
		$_SESSION['nj']=$nianji;
		echo "<script> window.location.href='xsjbxx_xs.php'</script>"; 	//
	}else if($juese=='js'){		
			$_SESSION['xy']=$xy;	
			$_SESSION['bmdm']=$bmdm;
			
			if($qx%2==0){
				echo "<script> window.location.href='qxfp.php'</script>"; 	//转至管理员用户界面（权限分配）；
			}else if($qx%3==0){
				echo "<script> window.location.href='qxfp_bzr.php'</script>"; 	//转至教研主任界面（指定班主任/教学任务显示）；
			}else if($qx%7==0){
				echo "<script> window.location.href='show_xs.php'</script>"; 	//转至学工院长界面（查看审核情况）；
			}else if($qx%11==0){	//班主任
				echo "<script> window.location.href='xsjbxx_js.php'</script>"; 
			}else{
				echo "<br>无访问权限";				
			}
	}		
	
	//跳转到工作页面（下达教学任务）
	//重定向浏览器 
	//header("Location: http://bbs.lampbrother.net"); 
	//header("Location: jxrwb.php");
	//确保重定向后，后续代码不会被执行 
	//exit;	//确保以后代码不再被执行，无此语句，则会继续执行后面语句；
?>  



