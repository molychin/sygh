<?php
	include 'header.php';
	include 'conn.php';
	
	if(isset($_POST['add'])){	//���ӽ�ɫ��
		$zgh=$_POST['jiaoshi'];
		$qx=$_POST['juese'];
		$SQL="update jsxxb set qx=qx*$qx where zgh='$zgh'";	
		//echo $SQL;
		$result =mysqli_query($conn,$SQL) or die('Error querying database1.');			
	}else if(isset($_POST['delete'])){	//ɾ����ɫ��
		$array_zgh=$_POST['checkbox'];
		for($i=0;$i<count($array_zgh);$i++){
			$SQL="update jsxxb set qx=5 where zgh='$array_zgh[$i]'";
			$result =mysqli_query($conn,$SQL) or die('Error querying database2.');	
		}		
	}

?>
<script type="text/javascript" src="js/qxfp.js?ver=1"></script>
<form id="id_formQxfp" name="form1" action="" method="post">
<br>
	<b>�û�Ȩ��ָ��</b><br>
  <table>
    <tr>
      <th>��ʦѧԺ</th>
      <th>��ʦ����</th>
      <th>Ȩ��</th>
    </tr>
    <tr>
      <td><select id="id_selectJsxy" name="jsxy" onChange="selectJsxyClicked()">
<?php
	//��ʾ��ʦѧԺ��Ĭ��ѡ������ѧԺ��
	$SQL="select xymc,xydm from xydmb where sfjsbm='1' order by xydm";
	$query=mysqli_query($conn,$SQL) or die("Error querying database0,not found,qxfp.php.");
	while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)){
		$xymc=$row['xymc'];
		$xydm=$row['xydm'];
		echo "<option value='$xydm'>$xymc</option>";	
	}
?>
      </select></td>
      <td><div id="div_qxfp_selectJs">
<?php
	//��ʾ��ʦ��Ĭ����ʾ����ѧԺ��ʦ��
	echo "<select id='id_selectJs' name='jiaoshi'>";
	$SQL="select zgh,xm from jsxxb where bm='����ѧԺ' order by xm";
	$query=mysqli_query($conn,$SQL) or die('Error querying database1,qxfp.php.');
	while ($row = mysqli_fetch_array($query,MYSQLI_ASSOC)){
		$zgh=$row['zgh'];
		$xm=$row['xm'];		
		echo "<option value='$zgh'>$zgh|$xm</option>";
	}
	echo "</select>";
?>
		</div>	</td>
	  <td align='left'><input id='id_juese1' type='radio' checked="checked" value='3' name='juese' >��������</input><br><br>
		<input  id='id_juese2' type='radio'  value="7" name='juese'>ѧ��Ժ��</input><br><br>
		<input  id='id_juese3' type='radio'  value="2" name='juese'>ϵͳ����Ա</input>
	  </td>
    </tr>
</table>
  
<br>
˵�����������ο��Է��䡢�鿴��ѧԺ�Ľ�ѧ���񣬲鿴��ѧ�����Ϣ��ѧ��Ժ�����Բ鿴��ѧԺ�Ľ�ѧ���񣬲鿴��ѧ�����Ϣ��
<br><br>  
<div class="buttonBar">
<hr>    <input type="submit" name="add" value="���ӽ�ɫ" onClick="butAddClicked()" class="button">
	<input type="submit" name="delete" value="ɾ����ɫ" onClick="butDelClicked()" class="button">
<hr>
</div>
<br>	<b>�û�Ȩ�޷�����Ϣ</b><br>
<table  id="id_tableQxfp">
	<thead><tr >
		<th>����ѧԺ</th>
		<th>ְ����</th> 
		<th>��ʦ����</th>
		<th>Ȩ��</th>
		<th>ѡ��</th>
	</tr></thead>
	<tbody>
<?php
	$SQL="SELECT bm,xm,zgh,qx FROM jsxxb where (qx%3=0 or qx%7=0 or qx%2=0) order by bm";
	$query=mysqli_query($conn,$SQL) or die('Error querying database,qxfp.php.');
	$num=0;
	while ($row = mysqli_fetch_array($query,MYSQLI_ASSOC)){
		$zgh=$row['zgh'];
		if($row['qx']%3==0){
			$StrQx='��������';
		}else if ($row['qx']%7==0){
			$StrQx='ѧ��Ժ��';
		}else if ($row['qx']%2==0){
			$StrQx='ϵͳ����Ա';
		}		
?>
  <tr id='<?php echo $num;?>'> 
	<td id='id_tdKkxy<?php echo $num;?>' name='kkxy'><?php echo $row['bm'];?></td>
	<td id='id_tdZgh<?php echo $num;?>' name='zgh'><?php echo $row['zgh'];?></td> 
	<td id='id_tdJsxm<?php echo $num;?>' name='jsxm'><?php echo $row['xm'];?></td>
	<td id='id_tdQx<?php echo $num;?>' name='qx'><?php echo $StrQx; ?></td>
	<td id='id_tdCheck<?php echo $num;?>' name='check'><input type='checkbox' id='checkbox<?php echo $num;?>' name='checkbox[]' value='<?php echo $zgh;?>'></td> 
  </tr>
<?php 
	$num++;
	} 
?>  
<tbody></table>
</form>
<br><br>
<?php 
	include 'footer.php';
?>
