<?php
	include '../conn.php';
	header('Content-type: text/html;charset=GB2312');	 //此代码不加，会出现乱码；
	
	session_start();
	$bjmc=$_GET['bjmc'];
	$currentStudent=$_SESSION['count'];
	//echo $bjmc."-----".$currentStudent;
	
	$dqxn=$_SESSION['dqxn'];
	$dqxq=$_SESSION['dqxq'];
	$dqxnxq=$dqxn.'-'.$dqxq;	//当前学年学期：2016-2017-2
	
	echo "<table class='border0'>";
	echo "<tr><td>学号|姓名</td><td>学号|姓名</td><td>学号|姓名</td></tr>";
	$count=0;
	$rowcount=0;
	$SQL1="select concat(xs.xh,'|',xs.xm) xhxm,xs.xh,xs.xzb,sy.jspybj,sy.txsj from xsjbxxb xs,sygh_zysyghs sy where xzb='$bjmc' and xs.xh=sy.xh";
	//echo $SQL1;
	$query1=mysqli_query($conn,$SQL1)or die("Error querying database1,not found,xsjbxx_js2.php.");
		
	while($row1=mysqli_fetch_array($query1,MYSQLI_ASSOC)){
		$count=$count+1;
		$rowcount=$rowcount+1;
		$xh=$row1['xh'];
		$xhxm=$row1['xhxm'];
		$jspybj=$row1['jspybj'];
		$txsj=$row1['txsj'];

		if($currentStudent==$count){
			$xsxh=$xh;	
			$_SESSION['xsxh']=$xsxh;
		}
		if ($currentStudent==$count){
			$buttonType='button4';		
		}else if($jspybj==$dqxnxq){		
			$buttonType='button3';	
		}elseif($txsj==null){
			$buttonType='button5';
		}else{
			$buttonType='button2';			
		}
		
		echo "<td><input type='button' id='id_$xh' onClick=xhxmClick('$xh',$count) value='$xhxm' class='$buttonType'></input></td>";
		if($rowcount%3==0){
			echo "</tr><tr>";
		}
	}		

?>