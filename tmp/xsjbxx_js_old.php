<?php 
	include 'header.php';
	include 'conn.php';		
?>
<script type="text/javascript" src="js/xsjbxx_js.js"></script>

<br>
<b>������ѧԺ-��ѧ��ְҵ���Ĺ滮��</b><br><br>
<form id="" name="form" action="" method="post">

<?php
	$SQL="select bjmc from bjdmb where bzrzgh='$zgh' and find_in_set(nj,$njfw)";
	//echo $SQL."<br>";
	$bjmcs="''";
	$query=mysqli_query($conn,$SQL)or die("Error querying database0,not found,xsjbxx_js.php.");
	echo "<table class='border0'>";
	echo "<tr><td>ѧ��|����</td><td>ѧ��|����</td><td>ѧ��|����</td><td>ѧ��|����</td><td>ѧ��|����</td><td>ѧ��|����</td></tr>";
	echo "<tr>";
	while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)){
		$bjmcs=$bjmcs.",'".$row['bjmc']."'";
	}
	//echo $SQL."<br>";
	//$SQL="select concat(xh,'|',xm) xhxm,xzb from xsjbxxb where xzb in (select bjmc from bjdmb where bzrzgh='199900037' and find_in_set(nj,'2016,2015,2013'))";  //Ч�ʵ�
	$SQL="select concat(xh,'|',xm) xhxm,xh,xzb from xsjbxxb where xzb in ($bjmcs)";
	//echo $SQL."<br>";
	$query=mysqli_query($conn,$SQL)or die("Error querying database1,not found,xsjbxx_js.php.");;
	$count=0;
	while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)){
		$count=++$count;
		$xh=$row['xh'];
		$xhxm=$row['xhxm'];
		echo "<td><input type='button' id='id_' onClick=xhxmClicked('$xh') value='$xhxm' class='button2'></input></td>";
		if($count%6==0){
			echo "</tr><tr>";
		}
	}		

	echo "</tr></table><br>";
	echo "<div id='id_shuoming' class='id_shuoming'>˵����ͨ�����ѧ�����������������</div>";
	echo "<br><hr>";
	echo "<div id='id_sygh'>ѧ�����Ĺ滮</div>";


?>

</form>
<hr>
<?php 
	include 'footer.php';
?>
