<?php 
	include 'header.php';
	include 'conn.php';		

	$SQL="select dqxnxq,njfw from systeminfo where bmmc='xueshengchu'";
	
	if(isset($_POST['submitSave'])){
		$dqxnxq=$_POST['xnxq'];	
		$njfw=$_POST['njfw'];
		
		$SQL="update systeminfo set dqxnxq='$dqxnxq',njfw='$njfw' where bmmc='xueshengchu'";
		//echo $SQL."<br>";
		//$query=mysqli_query($conn,$SQL) or die('Error querying database 2,xtcs.php.');	
		echo "<script>alert('系统参数保存成功＿);</script>";
	}
?>

<form action="" method="post">
<div><br>
新增新生数据（未完成功能） 
<div>
<table>
<tr align="left">
<td>新增年级：<input type="text" name="nianji" value=""></td>
<td>说明：指定需新增的学生年级，例如2016</td>
</tr>
</table>
<div>
<hr>
<input type="submit" name="submitSave" class="button" value="提 交"></input>
<hr>
</div>
</form>

<?php 
	include 'footer.php';
?>