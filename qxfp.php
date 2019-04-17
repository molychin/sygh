<?php
	include 'header.php';
	include 'conn.php';
	
	if(isset($_POST['add'])){	//增加角色；
		$zgh=$_POST['jiaoshi'];
		$qx=$_POST['juese'];
		$SQL="update jsxxb set qx=qx*$qx where zgh='$zgh'";	
		//echo $SQL;
		$result =mysqli_query($conn,$SQL) or die('Error querying database1.');			
	}else if(isset($_POST['delete'])){	//删除角色；
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
	<b>用户权限指定</b><br>
  <table>
    <tr>
      <th>教师学院</th>
      <th>教师姓名</th>
      <th>权限</th>
    </tr>
    <tr>
      <td><select id="id_selectJsxy" name="jsxy" onChange="selectJsxyClicked()">
<?php
	//显示教师学院，默认选中人文学院；
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
	//显示教师，默认显示人文学院教师；
	echo "<select id='id_selectJs' name='jiaoshi'>";
	$SQL="select zgh,xm from jsxxb where bm='人文学院' order by xm";
	$query=mysqli_query($conn,$SQL) or die('Error querying database1,qxfp.php.');
	while ($row = mysqli_fetch_array($query,MYSQLI_ASSOC)){
		$zgh=$row['zgh'];
		$xm=$row['xm'];		
		echo "<option value='$zgh'>$zgh|$xm</option>";
	}
	echo "</select>";
?>
		</div>	</td>
	  <td align='left'><input id='id_juese1' type='radio' checked="checked" value='3' name='juese' >教研主任</input><br><br>
		<input  id='id_juese2' type='radio'  value="7" name='juese'>学工院长</input><br><br>
		<input  id='id_juese3' type='radio'  value="2" name='juese'>系统管理员</input>
	  </td>
    </tr>
</table>
  
<br>
说明：教研主任可以分配、查看本学院的教学任务，查看教学班等信息；学工院长可以查看本学院的教学任务，查看教学班等信息。
<br><br>  
<div class="buttonBar">
<hr>    <input type="submit" name="add" value="增加角色" onClick="butAddClicked()" class="button">
	<input type="submit" name="delete" value="删除角色" onClick="butDelClicked()" class="button">
<hr>
</div>
<br>	<b>用户权限分配信息</b><br>
<table  id="id_tableQxfp">
	<thead><tr >
		<th>开课学院</th>
		<th>职工号</th> 
		<th>教师姓名</th>
		<th>权限</th>
		<th>选择</th>
	</tr></thead>
	<tbody>
<?php
	$SQL="SELECT bm,xm,zgh,qx FROM jsxxb where (qx%3=0 or qx%7=0 or qx%2=0) order by bm";
	$query=mysqli_query($conn,$SQL) or die('Error querying database,qxfp.php.');
	$num=0;
	while ($row = mysqli_fetch_array($query,MYSQLI_ASSOC)){
		$zgh=$row['zgh'];
		if($row['qx']%3==0){
			$StrQx='教研主任';
		}else if ($row['qx']%7==0){
			$StrQx='学工院长';
		}else if ($row['qx']%2==0){
			$StrQx='系统管理员';
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
