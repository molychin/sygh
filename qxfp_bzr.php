<?php
	include 'header.php';
	include 'conn.php';
?>
<script type="text/javascript" src="js/qxfp_bzr.js?ver=1"></script>
<form id="id_formQxfpbzr" name="form_qxfp_bzr" action="" method="post">
<br>
<b>ָ��������/����Ա</b><br><br>
˵����ָ�����������/����Ա��
<br><br>
  <table>
    <tr>
	  <th>ѧԺ</th><th>�꼶</th><th>�༶����</th><th>רҵ</th><th>����</th><th>������/����Ա</th>
    </tr>
	
<?php
	$xy=$_SESSION['xy'];
	$njfw=$_SESSION['njfw'];
	$bjmcs='';

	if($qx%2==0){
		$SQL="select bjmc,zymc,nj,xymc,bzrzgh from bjdmb where find_in_set(nj,'$njfw') order by xymc,nj,bjmc";
	}else{
		$SQL="select bjmc,zymc,nj,xymc,bzrzgh from bjdmb where xymc='$xy' and find_in_set(nj,'$njfw') order by nj,bjmc";		
	}

	//echo $SQL;
	$query=mysqli_query($conn,$SQL);
	while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)){
		$bjmc=$row['bjmc'];
		$bjmcs=$bjmcs.','.$bjmc;
		$zymc=$row['zymc'];
		$nj=$row['nj'];
		$xymc=$row['xymc'];		
		$bzr_zgh=$row['bzrzgh'];		//������ְ���ţ�

		echo "<tr>";
		echo "<td>$xymc</td>";		
		echo "<td>$nj</td>";		
		echo "<td>$bjmc</td>";
		echo "<td>$zymc</td>";
		echo "<td>";
		
		//ѡ���ʦ���ţ�
		echo "<select id='id_sel_bm$bjmc' name='$bjmc' onchange=seleted_bm('$bjmc')> ";
		echo "<option value='$xy' selected>$xy</option>";

		$SQL1="select xydm,xymc from xydmb";
		$query1=mysqli_query($conn,$SQL1) or die('Error querying database,qxfp_bzr.php.');
		while ($row = mysqli_fetch_array($query1,MYSQLI_ASSOC)){
			$xydm=$row['xydm'];
			$xymc=$row['xymc'];		
			echo "<option value='$xydm'>$xymc</option>";				
		}		
		echo "</td><td>";
		
		//��ʾ��ʦ��Ĭ����ʾ����ѧԺ��ʦ��
		echo "<div id='div_js$bjmc'>";
		echo "<select id='id_sel_bzr$bjmc' name='$bjmc'>";
		$SQL1="select zgh,xm from bjdmb,jsxxb where bjdmb.bjdm='$bjmc' and bjdmb.bzrzgh=jsxxb.zgh";
		//echo $SQL1;
		$query1=mysqli_query($conn,$SQL1) or die('Error querying database,qxfp_bzr.php.');
		//echo $query1;
		if ($row=mysqli_fetch_array($query1,MYSQLI_ASSOC)){
			$js_zgh=$row['zgh'];
			$js_xm=$row['xm'];	
			echo "<option value='$js_zgh'>$js_zgh|$js_xm</option>";			
		}else{
			echo "<option value='000000000'>000000000|δָ��</option>";			
		}
			
		$SQL1="select zgh,xm from jsxxb where bm='$xy' order by xm";
		$query1=mysqli_query($conn,$SQL1) or die('Error querying database,qxfp_bzr.php.');
		while ($row = mysqli_fetch_array($query1,MYSQLI_ASSOC)){
			$js_zgh=$row['zgh'];
			$js_xm=$row['xm'];		
				echo "<option value='$js_zgh'>$js_zgh|$js_xm</option>";				
		}
		echo "</select></div></td></td></td>";
		echo "</tr>";
	}
?>	
</table> 

<div id="div_test"></div>
<br><br>  
<input type='button' class='button' onClick="saveBzr('<?php echo $bjmcs; ?>')" value='ָ��������'>

</form>

<br><br>
<?php 
	include 'footer.php';
?>
