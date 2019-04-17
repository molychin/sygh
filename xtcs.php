<?php 
	include 'header.php';
	include 'conn.php';		

	$SQL="select sygh_dqxnxq,njfw from systeminfo where bmmc='xueshengchu'";
	$query=mysqli_query($conn,$SQL) or die('Error querying database 1,xtcs.php.');		
	while($row = mysqli_fetch_array($query,MYSQLI_ASSOC)){
		$dqxnxq=$row['sygh_dqxnxq'];
		$njfw=$row['njfw'];
	}
	
	if(isset($_POST['submitSave'])){
		$dqxnxq=$_POST['xnxq'];	
		$njfw=$_POST['njfw'];
		
		$SQL="update systeminfo set sygh_dqxnxq='$dqxnxq',njfw='$njfw' where bmmc='xueshengchu'";
		$query=mysqli_query($conn,$SQL) or die('Error querying database 2,xtcs.php.');	
		echo "<script>alert('系统参数保存成功！');</script>";

		$_SESSION['dqxn']=substr($dqxnxq,0,9);
		$_SESSION['dqxq']=substr($dqxnxq,strlen($dqxnxq)-1,1);
	}
?>

<form action="" method="post">
<div><br>
系统参数设置
<div>
<table>
<tr align="left">
<td>当前学年学期：<input type="text" name="xnxq" value="<?php echo $dqxnxq;?>"></td>
<td>说明：指定当前学年学期，例如2015至2016第1学期，则为2015-2016-1</td>
</tr>
<tr align="left">
<td>年级范围：<input type="text" name="njfw" value="<?php echo $njfw;?>"></td>
<td>说明：指定需填写《生涯规划》的年级范围，例如2013,2014,2015</td>
</tr>
</table>
<div>
<hr>
<input type="submit" name="submitSave" class="button" value="保存参数"></input>
<hr>
</div>
</form>

<?php 
	include 'footer.php';
?>