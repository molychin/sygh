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
		echo "<script>alert('ϵͳ��������ɹ���);</script>";
	}
?>

<form action="" method="post">
<div><br>
�����������ݣ�δ��ɹ��ܣ� 
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