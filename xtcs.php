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
		echo "<script>alert('ϵͳ��������ɹ���');</script>";

		$_SESSION['dqxn']=substr($dqxnxq,0,9);
		$_SESSION['dqxq']=substr($dqxnxq,strlen($dqxnxq)-1,1);
	}
?>

<form action="" method="post">
<div><br>
ϵͳ��������
<div>
<table>
<tr align="left">
<td>��ǰѧ��ѧ�ڣ�<input type="text" name="xnxq" value="<?php echo $dqxnxq;?>"></td>
<td>˵����ָ����ǰѧ��ѧ�ڣ�����2015��2016��1ѧ�ڣ���Ϊ2015-2016-1</td>
</tr>
<tr align="left">
<td>�꼶��Χ��<input type="text" name="njfw" value="<?php echo $njfw;?>"></td>
<td>˵����ָ������д�����Ĺ滮�����꼶��Χ������2013,2014,2015</td>
</tr>
</table>
<div>
<hr>
<input type="submit" name="submitSave" class="button" value="�������"></input>
<hr>
</div>
</form>

<?php 
	include 'footer.php';
?>