<?php
	include '../conn.php';
	header('Content-type: text/html;charset=GB2312');	 //此代码不加，会出现乱码；
	
	session_start();
	$dqxn=$_SESSION['dqxn'];
	$dqxq=$_SESSION['dqxq'];		
	$postStr=$_GET['post_str'];

	$arrayBjmcJszgh=explode(';',$postStr);
	for($i=1;$i<count($arrayBjmcJszgh);$i++){
		$arrayTemp=explode(",",$arrayBjmcJszgh[$i]);
		$bjmc=$arrayTemp[0];
		$bzrzgh=$arrayTemp[1];
		$SQL="update bjdmb set bzrzgh='$bzrzgh' where bjmc='$bjmc'";
		$query=mysqli_query($conn,$SQL) or die('Error querying database1,save_qxfpbzr.php');
		$SQL="update jsxxb set qx=qx*11 where zgh='$bzrzgh' and qx%11!=0";
		//echo "<br>".$SQL."<br>";	
		$query=mysqli_query($conn,$SQL) or die('Error querying database2,save_qxfpbzr.php');	
	}
?>


