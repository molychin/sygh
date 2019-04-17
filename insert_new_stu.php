<?php 
	include 'header.php';
	include 'conn.php';		

	$SQL="select dqxnxq,njfw from systeminfo where bmmc='xueshengchu'";
	
	if(isset($_POST['submitSave'])){
		$nj=$_POST['nianji'];
		$SQL="insert into sygh_zysyghs(xh,xm) select xh,xm from xsjbxxb where nj='$nj'";
		//echo $SQL."<br>";
		$query=mysqli_query($conn,$SQL) or die('Error querying database 2,insert_new_stu.php.');	
		echo "<script>alert('新生数据插入成功。');</script>";		
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
<input type="submit" name="submitSave" class="button" value="提 交"></input>
<hr>
</div>
</form>

<?php 
	include 'footer.php';
?>