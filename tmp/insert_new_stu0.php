<?php 
	include 'header.php';
	include 'conn.php';		

	$SQL="select dqxnxq,njfw from systeminfo where bmmc='xueshengchu'";
	//$query=mysqli_query($conn,$SQL) or die('Error querying database 1,xtcs.php.');		
/*	
	while($row = mysqli_fetch_array($query,MYSQLI_ASSOC)){
		$dqxnxq=$row['dqxnxq'];
		$njfw=$row['njfw'];
	}
*/	
	if(isset($_POST['submitSave'])){
		$dqxnxq=$_POST['xnxq'];	
		$njfw=$_POST['njfw'];
		
		$SQL="update systeminfo set dqxnxq='$dqxnxq',njfw='$njfw' where bmmc='xueshengchu'";
		//echo $SQL."<br>";
		//$query=mysqli_query($conn,$SQL) or die('Error querying database 2,xtcs.php.');	
		echo "<script>alert('绯荤粺鍙傛暟淇濆瓨鎴愬姛锛?);</script>";

		//$_SESSION['dqxn']=substr($dqxnxq,0,9);
		//$_SESSION['dqxq']=substr($dqxnxq,strlen($dqxnxq)-1,1);
	}
?>

<form action="" method="post">
<div><br>
新增新生数据
<div>
<table>
<tr align="left">
<td>新增年级：<input type="text" name="nianji" value=""></td>
<td>说明：指定需新增的学生年级，例如2016</td>
</tr>
</table>
<div>
<hr>
<input type="submit" name="submitSave" class="button" value="生成数据"></input>
<hr>
</div>
</form>

<?php 
	include 'footer.php';
?>