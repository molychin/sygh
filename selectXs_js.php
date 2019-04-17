<?php 
	include 'header.php';
	include 'conn.php';		
?>
<script type="text/javascript" src="js/selectXs_js.js"></script>
<br>
<b>常熟理工学院-大学生职业生涯规划书</b><br><br>

<?php
	$SQL="select banji from sygh_qxfp where zgh=$zgh ";
	$query=mysql_query($SQL);
	if(!$query){
		echo "Error selected database: ".mysql_error();		
	}else{
		echo "<table class='border0'><tr><td>";
		while($row=mysql_fetch_array($query)){
			$banji=$row['banji'];

			echo "<table><tr><td>";			
			echo "<button onclick=showBjXs('$banji') class='banji_but'>班级：$banji</button>";
			echo "</td></tr><tr><td>";
			echo "<table id='$banji' class='xuesheng_table' class='border0'";
			$SQL1="select xh,xm from xsjbxxb where xzb='$banji'";
			$query1=mysql_query($SQL1);
			while($row1=mysql_fetch_array($query1)){
				$xuehao=$row1['xh'];
				$xingming=$row1['xm'];
				echo "<tr class='border0'><td align='left' class='border0'><button class='xuesheng_but' onclick=showXSXX('$xuehao')>$xuehao|$xingming</button></td></tr>";
			}			
			echo "</table>";
			echo "</td></tr></table>";
		}
		echo "</td width='800'><td>null</td>";
		echo "</td></tr></table>";
	}
?>

<?php 
	include 'footer.php';
?>