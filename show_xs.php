<?php 
	include 'header.php';
	include 'conn.php';		
?>
<script type="text/javascript" src="js/show_xs.js"></script>

<br>
<b>常熟理工学院-大学生职业生涯规划书</b><br><br>
<form id="" name="form" action="" method="post">

<?php
	$dqxn=$_SESSION['dqxn'];
	$dqxq=$_SESSION['dqxq'];
	$dqxnxq=$dqxn.'-'.$dqxq;	//当前学年学期：2016-2017-2
	//echo $dqxnxq;
	$xy=$_SESSION['xy'];
	$njfw=$_SESSION['njfw'];
	
	//echo "xy=".$xy."<br>njfw=".$njfw;	
	
	$SQL="select bjmc from bjdmb where find_in_set(nj,'$njfw') and xymc='$xy'";
	//echo $SQL;
	$query=mysqli_query($conn,$SQL)or die("Error querying database0,not found,xsjbxx_js1.php.");
	echo "<table class='border0'><tr><td valign='top'>";
	echo "<table class='border0'><tr><td><table><tr>";
	$count=0;
	$currentStudent=$_SESSION['count'];
	$rowcount=0;
	
	while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)){
		$bjmc=$row['bjmc'];
		echo "<td><button type='button' id='id_but_$bjmc' onclick=butBanjiClick('$bjmc')>$bjmc</button></td>";	
		$rowcount=$rowcount+1;
		if($rowcount%6==0){
			echo "</tr><tr>";
		}
	}
	echo "</tr></table></td></tr>";
	echo "<tr border=0><td border=0><table class='border0'><tr><td><div id='id_div_bjmc'></div></td></tr></table></td></tr></table></td>";
	echo "<td rowspan=2><div id='id_sygh' align='left' width='800'>";
	echo "<img src='img/8-46-06.png'/><img src='img/8-46-13.png'/><img src='img/8-46-20.png'/>";
	echo "</div></td></tr></table>";	
		
?>

</form><hr>
<?php 
	include 'footer.php';
?>