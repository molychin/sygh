<?php 
	include 'header.php';
	include 'conn.php';		

	$SQL="select dqxnxq,njfw from systeminfo where bmmc='xueshengchu'";
	
	if(isset($_POST['submitSave'])){
		$nj=$_POST['nianji'];
		$SQL="insert into sygh_zysyghs(xh,xm) select xh,xm from xsjbxxb where nj='$nj'";
		//echo $SQL."<br>";
		$query=mysqli_query($conn,$SQL) or die('Error querying database 2,insert_new_stu.php.');	
		echo "<script>alert('�������ݲ���ɹ���');</script>";		
	}
?>

<form action="" method="post">
<div><br>
������������
<div>
<table>
<tr align="left">
<td>�����꼶��<input type="text" name="nianji" value=""></td>
<td>˵����ָ����������ѧ���꼶������2016</td>
</tr>
</table>
<div>
<hr>
<input type="submit" name="submitSave" class="button" value="�� ��"></input>
<hr>
</div>
</form>

<?php 
	include 'footer.php';
?>