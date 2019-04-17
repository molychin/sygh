<?php 
	include 'header.php';
	include 'conn.php';		
?>
<script type="text/javascript" src="js/xsjbxx_js.js"></script>

<br>
<b>常熟理工学院-大学生职业生涯规划书</b><br><br>
<form id="" name="form" action="" method="post">

<?php
	$SQL="select bjmc from bjdmb where bzrzgh='$zgh' and find_in_set(nj,$njfw)";
	//echo $SQL."<br>";
	$bjmcs="''";
	$query=mysqli_query($conn,$SQL)or die("Error querying database0,not found,xsjbxx_js.php.");
	echo "<table class='border0'>";
	echo "<tr><td>学号|姓名</td><td>学号|姓名</td><td>学号|姓名</td><td>学号|姓名</td><td>学号|姓名</td><td>学号|姓名</td></tr>";
	echo "<tr>";
	while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)){
		$bjmcs=$bjmcs.",'".$row['bjmc']."'";
	}
	//echo $SQL."<br>";
	//$SQL="select concat(xh,'|',xm) xhxm,xzb from xsjbxxb where xzb in (select bjmc from bjdmb where bzrzgh='199900037' and find_in_set(nj,'2016,2015,2013'))";  //效率低
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
	echo "<div id='id_shuoming' class='id_shuoming'>说明：通过点击学生姓名进行审核评价</div>";
	echo "<br><hr>";
	echo "<div id='id_sygh'>学生生涯规划</div>";


?>

</form>
<hr>
<?php 
	include 'footer.php';
?>
