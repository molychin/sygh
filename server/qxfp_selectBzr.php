<?php
	include '../conn.php';
	header('Content-type: text/html;charset=GB2312');	 //�˴��벻�ӣ���������룻
	
	$jsxydm=$_GET['jsxydm'];
	$bjmc=$_GET['bjmc'];
	//��ʾ��ʦѡ���
	echo "<select id='id_sel_bzr$bjmc' name='$bjmc'>";
	$SQL="select zgh,xm from jsxxb where bmdm='$jsxydm' order by xm";
	$query=mysqli_query($conn,$SQL) or die('Error querying database,qxfp_selectJs.php.');
	while ($row = mysql_fetch_array($query)){
		$zgh=$row['zgh'];
		$xm=$row['xm'];		
		echo "<option value='$zgh'>$zgh|$xm</option>";
	}
	echo "</select>";
?>