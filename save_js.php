<?php
	include 'conn.php';
	header('Content-type: text/html;charset=GB2312');	 //此代码不加，会出现乱码；
	
	session_start();
	$dqxn=$_SESSION['dqxn'];
	$dqxq=$_SESSION['dqxq'];
	$dqxnxq=$dqxn.'-'.$dqxq;
	$zgh=$_SESSION['zgh'];
	$jsxm=$_SESSION['xm'];
	$xsxh=$_SESSION['xsxh'];
	$xsnj=$_SESSION['xsnj'];

	$_SESSION['count']=$_SESSION['count']+1;
	$qianming="\r\n班主任：".$jsxm.date("Y-m-d");
	
	$sszj_jy1=$_POST['sszj_jy1'];
	$sszj_jy2=$_POST['sszj_jy2'];
	$sszj_jy3=$_POST['sszj_jy3'];
	$sszj_jy4=$_POST['sszj_jy4'];	
	$pgtz_zdyj1=$_POST['pgtz_zdyj1'];
	$pgtz_zdyj2=$_POST['pgtz_zdyj2'];
	$pgtz_zdyj3=$_POST['pgtz_zdyj3'];
	$pgtz_zdyj4=$_POST['pgtz_zdyj4'];
		
	$xuenian=$dqxn-$xsnj+1;
	if ($xuenian==1){
		$sszj_jy1=$sszj_jy1.$qianming;
		$pgtz_zdyj1=$pgtz_zdyj1.$qianming;	
	}else if($xuenian==2){
		$sszj_jy2=$sszj_jy2.$qianming;
		$pgtz_zdyj2=$pgtz_zdyj2.$qianming;		
	}else if($xuenian==3){
		$sszj_jy3=$sszj_jy3.$qianming;
		$pgtz_zdyj3=$pgtz_zdyj3.$qianming;			
	}else if($xuenian==4){
		$sszj_jy4=$sszj_jy4.$qianming;
		$pgtz_zdyj4=$pgtz_zdyj4.$qianming;			
	}else{
		//--------------
	}
	
	$SQL="update sygh_zysyghs set sszj_jy1='$sszj_jy1',sszj_jy2='$sszj_jy2',sszj_jy3='$sszj_jy3',sszj_jy4='$sszj_jy4',
		pgtz_zdyj1='$pgtz_zdyj1',pgtz_zdyj2='$pgtz_zdyj2',pgtz_zdyj3='$pgtz_zdyj3',pgtz_zdyj4='$pgtz_zdyj4',
		jspybj='$dqxnxq'
		where xh='$xsxh'";
	$query=mysqli_query($conn,$SQL) or die('Error querying database1,save_qxfpbzr.php');	
?>

<script type="text/javascript">
	alert('修改数据保存成功');
	window.location.href="xsjbxx_js.php";		
</script>