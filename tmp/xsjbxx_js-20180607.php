<?php 
	include 'header.php';
	include 'conn.php';		
?>
<script type="text/javascript" src="js/xsjbxx_js.js"></script>

<br>
<b>常熟理工学院-大学生职业生涯规划书</b><br><br>
<form id="" name="form" action="save_js.php" method="post">

<?php
	$dqxn=$_SESSION['dqxn'];
	$dqxq=$_SESSION['dqxq'];
	$dqxnxq=$dqxn.'-'.$dqxq;	//当前学年学期：2016-2017-2
	
	$SQL="select bjmc from bjdmb where bzrzgh='$zgh' and find_in_set(nj,$njfw)";
	$bjmcs="''";
	$query=mysqli_query($conn,$SQL)or die("Error querying database0,not found,xsjbxx_js1.php.");
	echo "<table class='border0'><tr><td valign='top'>";
	echo "<table class='border0'>";
	echo "<tr><td>学号|姓名</td><td>学号|姓名</td><td>学号|姓名</td></tr>";
	$count=0;
	$currentStudent=$_SESSION['count'];
	
	while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)){
		$rowcount=0;
		//$bjmcs=$bjmcs.",'".$row['bjmc']."'";
		$bjmc=$row['bjmc'];
		$SQL1="select concat(xs.xh,'|',xs.xm) xhxm,xs.xh,xs.xzb,sy.jspybj,sy.txsj from xsjbxxb xs,sygh_zysyghs sy where xzb='$bjmc' and xs.xh=sy.xh";
		$query1=mysqli_query($conn,$SQL1)or die("Error querying database1,not found,xsjbxx_js2.php.");
		echo "<tr><td colspan=3>$bjmc</td></tr><tr>";
		
	//}

	//$SQL="select concat(xh,'|',xm) xhxm,xzb from xsjbxxb where xzb in (select bjmc from bjdmb where bzrzgh='199900037' and find_in_set(nj,'2016,2015,2013'))";  //效率低
	//$SQL="select concat(xh,'|',xm) xhxm,xh,xzb,(select jspybj from sygh_zysyghs where xh=xsjbxxb.xh)jspybj from xsjbxxb where xzb in ($bjmcs)";		//此语句执行速度比较慢
	//--$SQL1="select concat(xs.xh,'|',xs.xm) xhxm,xs.xh,xs.xzb,sy.jspybj from xsjbxxb xs,sygh_zysyghs sy where xzb in ($bjmcs) and xs.xh=sy.xh";
	//--$query1=mysqli_query($conn,$SQL)or die("Error querying database1,not found,xsjbxx_js.php.");

	while($row1=mysqli_fetch_array($query1,MYSQLI_ASSOC)){
		$count=$count+1;
		$rowcount=$rowcount+1;
		$xh=$row1['xh'];
		$xhxm=$row1['xhxm'];
		$jspybj=$row1['jspybj'];
		$txsj=$row1['txsj'];

		if($currentStudent==$count){
			$xsxh=$xh;	
			$_SESSION['xsxh']=$xsxh;
		}
		if ($currentStudent==$count){
			$buttonType='button4';		
		}else if($jspybj==$dqxnxq){		
			$buttonType='button3';	
		}elseif($txsj==null){
			$buttonType='button5';
		}else{
			$buttonType='button2';			
		}
		
		echo "<td><input type='button' id='id_$xh' onClick=xhxmClicked('$xh',$count) value='$xhxm' class='$buttonType'></input></td>";
		if($rowcount%3==0){
			echo "</tr><tr>";
		}
	}		
}
	
	echo "</tr></table><td><td valign='top'>";
	echo "<div id='id_shuoming' class='id_shuoming'>说明：通过点击学生姓名进行审核评价</div>";
	echo "<br><hr>";
	echo "<div id='id_sygh'>学生生涯规划";
	
	$SQL="select xh,xm,xb,csrq,zzmm,lxdh,jtzz,jtdh,yzbm from xsjbxxb where xh='$xsxh'";
	$query=mysqli_query($conn,$SQL);
	if(!$query){
		  echo "Error selected database: ".mysql_error();		
	}else{
		$row=mysqli_fetch_array($query,MYSQLI_ASSOC) or die('Error querying database1,xsjbxx_xs.php.');	
		$xb=$row['xb'];			//性别
		$csrq=$row['csrq'];		//出生日期
		$zzmm=$row['zzmm'];		//政治面貌
		$lxdh=$row['lxdh'];		//联系电话
		$jtzz=$row['jtzz'];		//家庭住址
		$jtdh=$row['jtdh'];		//家庭电话
		$yzbm=$row['yzbm'];		//邮政编码

		$SQL="select xh,xm,zwms_xg,zwms_xq,zwms_tc,zwms_nl,swot_s,swot_w,swot_o,swot_t,jjlsbz,zyyq_zy1,zyyq_fz1,zyyq_yq1,zyyq_zy2,zyyq_fz2,zyyq_yq2,
			zyyq_zy3,zyyq_fz3,zyyq_yq3,zyyq_zy4,zyyq_fz4,zyyq_yq4,mbcs_n1,mbcs_n2,mbcs_n3,mbcs_n4,mbcs_n5,mbcs_n10,
			sszj_zp1,sszj_zp2,sszj_zp3,sszj_zp4,sszj_jy1,sszj_jy2,sszj_jy3,sszj_jy4,
			pgtz_sxqk1,pgtz_tzqk1,pgtz_zdyj1,pgtz_sxqk2,pgtz_tzqk2,pgtz_zdyj2,pgtz_sxqk3,pgtz_tzqk3,pgtz_zdyj3,pgtz_sxqk4,pgtz_tzqk4,pgtz_zdyj4,txsj
			from sygh_zysyghs where xh='$xsxh'";
		//echo $SQL."<br>";	
		
		$query=mysqli_query($conn,$SQL);
		$row=mysqli_fetch_array($query,MYSQLI_ASSOC) or die('Error querying database2,xsjbxx_xs.php.');
		$xm=$row['xm'];
		$xingge=$row['zwms_xg'];
		$xingqu=$row['zwms_xq'];
		$techang=$row['zwms_tc'];
		$nengli=$row['zwms_nl'];
		$youshi=$row['swot_s'];
		$lieshi=$row['swot_w'];
		$jiyu=$row['swot_o'];
		$weixie=$row['swot_t'];
		$jjls=$row['jjlsbz'];
		$zhiye1=$row['zyyq_zy1'];
		$fzlx1=$row['zyyq_fz1'];
		$jnsp1=$row['zyyq_yq1'];
		$zhiye1=$row['zyyq_zy1'];
		$fzlx1=$row['zyyq_fz1'];
		$jnsp1=$row['zyyq_yq1'];
		$zhiye1=$row['zyyq_zy1'];
		$fzlx1=$row['zyyq_fz1'];
		$jnsp1=$row['zyyq_yq1'];
		$zhiye1=$row['zyyq_zy1'];
		$fzlx1=$row['zyyq_fz1'];
		$jnsp1=$row['zyyq_yq1'];
		$zhiye2=$row['zyyq_zy2'];
		$fzlx2=$row['zyyq_fz2'];
		$jnsp2=$row['zyyq_yq2'];
		$zhiye3=$row['zyyq_zy3'];
		$fzlx3=$row['zyyq_fz3'];
		$jnsp3=$row['zyyq_yq3'];
		$mbcs_n1=$row['mbcs_n1'];
		$mbcs_n2=$row['mbcs_n2'];
		$mbcs_n3=$row['mbcs_n3'];
		$mbcs_n4=$row['mbcs_n4'];
		$mbcs_n5=$row['mbcs_n5'];
		$mbcs_n10=$row['mbcs_n10'];
		$sszj_zp1=$row['sszj_zp1'];
		$sszj_zp2=$row['sszj_zp2'];
		$sszj_zp3=$row['sszj_zp3'];
		$sszj_zp4=$row['sszj_zp4'];	
		$sszj_jy1=$row['sszj_jy1'];
		$sszj_jy2=$row['sszj_jy2'];
		$sszj_jy3=$row['sszj_jy3'];
		$sszj_jy4=$row['sszj_jy4'];		
		
		$pgtz_sxqk1=$row['pgtz_sxqk1'];
		$pgtz_tzqk1=$row['pgtz_tzqk1'];
		$pgtz_zdyj1=$row['pgtz_zdyj1'];
		$pgtz_sxqk2=$row['pgtz_sxqk2'];
		$pgtz_tzqk2=$row['pgtz_tzqk2'];
		$pgtz_zdyj2=$row['pgtz_zdyj2'];
		$pgtz_sxqk3=$row['pgtz_sxqk3'];
		$pgtz_tzqk3=$row['pgtz_tzqk3'];
		$pgtz_zdyj3=$row['pgtz_zdyj3'];
		$pgtz_sxqk4=$row['pgtz_sxqk4'];
		$pgtz_tzqk4=$row['pgtz_tzqk4'];
		$pgtz_zdyj4=$row['pgtz_zdyj4'];
		
		$txsj=$row['txsj'];
		
		echo "<table class='border0'>";
		echo "<tr><td align='left'>填表时间：$txsj</td></tr>";
		echo "		<tr><td><table class='border0 jbxx_div'><tr>";
		echo "			<td><table class='jbxx_div'><tr><td>学号：</td><td>$xsxh</td><td>姓名：</td><td>$xm</td>";
		echo "					<td>性别：</td><td>$xb</td></tr>";
		echo "					<tr><td>出生年月：</td><td>$csrq</td>";
		echo "					<td>联系电话：</td><td><input type='text' value='$lxdh' name='lianxidianhua' class='text_readonly' readonly /></td>";
		echo "					<td>政治面貌</td><td>$zzmm</td></tr>";
		echo "					<tr><td>家庭住址：</td><td colspan='3'><input type='text' value='$jtzz' name='jiatingzhuzhi' size='50' class='text_readonly' readonly /></td>";
		echo "					<td>家庭电话：</td><td><input type='text' value='$jtdh' name='jiatingdianhua' class='text_readonly' readonly /></td></tr>";
		echo "					<tr><td>邮政编码：</td><td colspan='5'><input type='text' value='$yzbm' name='youzhengbianma' class='text_readonly' readonly /></td></tr>";
		echo "			</table></td>";
		echo "			<td><img src='stu_photos/$xsxh.jpg' class='img_photo' /></td>";
		echo "		</tr></table></td></tr>";
		
		echo "		<tr>";
		echo "			<td><div class='hideshow_div'><button type='button' id='but_zwms'>隐藏/显示</button>自我描述</div>
							<table id='tab_zwms'>";
		echo "			<tr><td rowspan='4'>自<br>我<br>描<br>述</td>
							<td>性格</td><td><textarea name='xingge' rows='5' cols='105' class='text_readonly' readonly>$xingge</textarea></td></tr>";
		echo "			<tr><td>兴趣</td><td><textarea name='xingqu' rows='5' cols='105' class='text_readonly' readonly>$xingqu</textarea></td></tr>";
		echo "			<tr><td>特长</td><td><textarea name='techang' rows='5' cols='105' class='text_readonly' readonly>$techang</textarea></td></tr>";
		echo "			<tr><td>能力</td><td><textarea name='nengli' rows='5' cols='105' class='text_readonly' readonly>$nengli</textarea></td></tr>";
		echo "		</table></td></tr>";	

		echo "		<tr>";
		echo "		<td><div class='hideshow_div'><button type='button' id='but_swot'>隐藏/显示</button>SWOT分析</div>
						<table id='tab_swot'>";
		echo "			<tr><td rowspan='4'>S<br>W<br>O<br>T<br>分<br>析</td>
						<td>S（优势）</td><td>";
		echo "				<textarea name='youshi' rows='3' cols='90' class='text_readonly' readonly>$youshi</textarea></td></tr>";
		echo "			<tr><td>W（劣势）</td><td><textarea name='lieshi' rows='5' cols='90' class='text_readonly' readonly>$lieshi</textarea></td></tr>";
		echo "			<tr><td>O（面临的机遇）</td><td><textarea name='jiyu' rows='5' cols='90' class='text_readonly' readonly>$jiyu</textarea></td></tr>";
		echo "			<tr><td>T（受到的威胁）</td><td><textarea name='weixie' rows='5' cols='90' class='text_readonly' readonly>$weixie</textarea></td></tr>";
		echo "		</table></td></tr>";
		
		echo "		<tr><td><div class='hideshow_div'><button type='button' id='but_jjls'>隐藏/显示</button>如何解决劣势或不足</div><table id='tab_jjls'>";
		echo "			<tr><td>如<br>何<br>解<br>决<br>劣<br>势<br>或<br>不<br>足<br></td>";
		echo "				<td><textarea name='jjls' rows='9' cols='100' class='text_readonly' readonly>$jjls</textarea></td></tr>";
		echo "		</table></td></tr>";			
	
		echo "		<tr><td><div class='hideshow_div'><button type='button' id='but_cszy'>隐藏/显示</button>想从事的职业及该职业对人才素质的要求</div><table id='tab_cszy'>";
		echo "			<tr><td rowspan='4'>想<br>从<br>事<br>的<br>职<br>业<br>及<br>该<br>职<br>业<br>对<br>人<br>才<br>素<br>质<br>的<br>要<br>求</td>";
		echo "				<td><table><tr align='left'><td>职业一：<br><input type='text' value='$zhiye1' name='zhiye1' size='50' class='text_readonly' readonly/></td></tr>";
		echo "					<tr align='left'><td>职业发展路线：<br><input type='text' value='$fzlx1' name='fzlx1' size='50' class='text_readonly' readonly/></td></tr>";
		echo "					<tr align='left'><td>对人才的素质要求及所需专业的技能水平:<br>";
		echo "						<textarea name='jnsp1' rows='9' cols='100' class='text_readonly' readonly>$jnsp1</textarea></td></tr>";
		echo "				</table></td></tr>";
		echo "			<tr><td><table><tr align='left'><td>职业二：<br><input type='text' value='$zhiye2' name='zhiye2' size='50' class='text_readonly' readonly/></td></tr>";
		echo "				<tr align='left'><td>职业发展路线：<br><input type='text' value='$fzlx2' name='fzlx2' size='50' class='text_readonly' readonly/></td></tr>";
		echo "				<tr align='left'><td>对人才的素质要求及所需专业的技能水平:<br>";
		echo "					<textarea name='jnsp2' rows='9' cols='100' class='text_readonly' readonly>$jnsp2</textarea></td></tr>";
		echo "			</table></td></tr>";
		echo "			<tr><td><table><tr align='left'><td>职业三：<br><input type='text' value='$zhiye3' name='zhiye3' size='50' class='text_readonly' readonly/></td></tr>";
		echo "				<tr align='left'><td>职业发展路线：<br><input type='text' value='$fzlx3' name='fzlx3' size='50' class='text_readonly' readonly/></td></tr>";
		echo "				<tr align='left'><td>对人才的素质要求及所需专业的技能水平:<br>";
		echo "					<textarea name='jnsp3' rows='9' cols='100' class='text_readonly' readonly>$jnsp3</textarea></td></tr>";
		echo "			</table></td></tr>";

		echo "		</table></td></tr>";		

		echo "		<tr><td><div class='hideshow_div'><button type='button' id='but_sygh'>隐藏/显示</button>职业生涯发展规划</div><table id='tab_sygh'>";
		echo "			<tr><td rowspan='4'>职<br>业<br>生<br>涯<br>发<br>展<br>规<br>划<br>（<br>具<br>体<br>目<br>标<br>和<br>措<br>施<br>）<br></td>";
		echo "				<td>大<br>学<br>阶<br>段<br></td><td>";
		echo "				<table>";
		echo "					<tr><td>第<br>一<br>学<br>年</td><td><textarea name='mbcs_n1' rows='9' cols='100' class='text_readonly' readonly>$mbcs_n1</textarea></td</tr>";
		echo "					<tr><td>第<br>二<br>学<br>年</td><td><textarea name='mbcs_n2' rows='9' cols='100' class='text_readonly' readonly>$mbcs_n2</textarea></td</tr>";
		echo "					<tr><td>第<br>三<br>学<br>年</td><td><textarea name='mbcs_n3' rows='9' cols='100' class='text_readonly' readonly>$mbcs_n3</textarea></td</tr>";
		echo "					<tr><td>第<br>四<br>学<br>年</td><td><textarea name='mbcs_n4' rows='9' cols='100' class='text_readonly' readonly>$mbcs_n4</textarea></td</tr>";	
		echo "				</table></td></tr>";
		echo "			<tr><td></td><td>";
		echo "				<table>";
		echo "					<tr><td>五<br>年<br>内</td><td><textarea name='mbcs_n5' rows='9' cols='100' class='text_readonly' readonly>$mbcs_n5</textarea></td</tr>";
		echo "					<tr><td>十<br>年<br>内</td><td><textarea name='mbcs_n10' rows='9' cols='100' class='text_readonly' readonly>$mbcs_n10</textarea></td</tr>";
		echo "				</table></td></tr>";
		echo "		</table></td></tr>";

		echo "		<tr><td><div class='hideshow_div'><button type='button' id='but_sszj'>隐藏/显示</button>学年实施情况总结</div><table id='tab_sszj'>";
		echo "			<tr><td rowspan='2'>学<br>年<br>实<br>施<br>情<br>况<br>总<br>结<br>";
		echo "					（<br>思<br>想<br>政<br>治<br>方<br>面<br>、<br>学<br>习<br>、<br>生<br>活<br>、<br>";
		echo "					获<br>得<br>的<br>技<br>术<br>技<br>能<br>证<br>书<br>等<br>)<br></td>";
		echo "				<td><table>";
		echo "					<tr><td>时间</td><td>个人自评</td><td>班主任意见和建议</td></tr>";
		echo "					<tr><td>第<br>一<br>学<br>年<br>末</td><td><textarea name='sszj_zp1' rows='9' cols='70' class='text_readonly' readonly>$sszj_zp1</textarea></td><td>";
		echo "					<textarea name='sszj_jy1' rows='9' cols='30'>$sszj_jy1</textarea></td></tr>";
		echo "					<tr><td>第<br>二<br>学<br>年<br>末</td><td><textarea name='sszj_zp2' rows='9' cols='70' class='text_readonly' readonly>$sszj_zp2</textarea></td><td>";
		echo "					<textarea name='sszj_jy2' rows='9' cols='30'>$sszj_jy2</textarea></td></tr>";
		echo "					<tr><td>第<br>三<br>学<br>年<br>末</td><td><textarea name='sszj_zp3' rows='9' cols='70' class='text_readonly' readonly>$sszj_zp3</textarea></td><td>";
		echo "					<textarea name='sszj_jy3' rows='9' cols='30'>$sszj_jy3</textarea></td></tr>";
		echo "					<tr><td>第<br>四<br>学<br>年<br>末</td><td><textarea name='sszj_zp4' rows='9' cols='70' class='text_readonly' readonly>$sszj_zp4</textarea></td><td>";
		echo "					<textarea name='sszj_jy4' rows='9' cols='30'>$sszj_jy4</textarea></td></tr>";	
		echo "				</table></td></tr>";
		echo "		</table></td></tr>";

		echo "		<tr><td><div class='hideshow_div'><button type='button' id='but_pgtz'>隐藏/显示</button>评估调整</div><table id='tab_pgtz'>";
		echo "			<tr><td rowspan='4'>评<br>估<br>调<br>整</td>";
		echo "				<td>大<br>学<br>阶<br>段<br></td><td>";
		echo "				<table>";
		echo "					<tr><td>第<br>一<br>学<br>年</td><td><table>";
		echo "						<tr><td>目标实现情况：<br><textarea name='pgtz_sxqk1' cols='100' rows='5' class='text_readonly' readonly>$pgtz_sxqk1</textarea></td></tr>";
		echo "						<tr><td>调整情况：<br><textarea name='pgtz_tzqk1' cols='100' rows='5' class='text_readonly' readonly>$pgtz_tzqk1</textarea></td></tr>";
		echo "						<tr><td>班主任指导意见：<br><textarea name='pgtz_zdyj1' cols='100' rows='5'>$pgtz_zdyj1</textarea></td></tr>";
		echo "					</table></td</tr>";
		echo "					<tr><td>第<br>二<br>学<br>年</td><td><table>";
		echo "						<tr><td>目标实现情况：<br><textarea name='pgtz_sxqk2' cols='100' rows='5' class='text_readonly' readonly>$pgtz_sxqk2</textarea></td></tr>";
		echo "						<tr><td>调整情况：<br><textarea name='pgtz_tzqk2' cols='100' rows='5' class='text_readonly' readonly>$pgtz_tzqk2</textarea></td></tr>";
		echo "						<tr><td>班主任指导意见：<br><textarea name='pgtz_zdyj2' cols='100' rows='5'>$pgtz_zdyj2</textarea></td></tr>";
		echo "					</table></td</tr>";
		echo "					<tr><td>第<br>三<br>学<br>年</td><td><table>";
		echo "						<tr><td>目标实现情况：<br><textarea name='pgtz_sxqk3' cols='100' rows='5' class='text_readonly' readonly>$pgtz_sxqk3</textarea></td></tr>";
		echo "						<tr><td>调整情况：<br><textarea name='pgtz_tzqk3' cols='100' rows='5' class='text_readonly' readonly>$pgtz_tzqk3</textarea></td></tr>";
		echo "						<tr><td>班主任指导意见：<br><textarea name='pgtz_zdyj3' cols='100' rows='5'>$pgtz_zdyj3</textarea></td></tr>";
		echo "					</table></td</tr>";
		echo "					<tr><td>第<br>四<br>学<br>年</td><td><table>";
		echo "						<tr><td>目标实现情况：<br><textarea name='pgtz_sxqk4' cols='100' rows='5' class='text_readonly' readonly>$pgtz_sxqk4</textarea></td></tr>";
		echo "						<tr><td>调整情况：<br><textarea name='pgtz_tzqk4' cols='100' rows='5' class='text_readonly' readonly>$pgtz_tzqk4</textarea></td></tr>";
		echo "						<tr><td>班主任指导意见：<br><textarea name='pgtz_zdyj4' cols='100' rows='5'>$pgtz_zdyj4</textarea></td></tr>";
		echo "					</table></td</tr>";	
		echo "				</table></td></tr>";
		echo "</table>";
		
		echo "<tr><td><input type='submit' value='提  交' class='button' ></input></td></tr>";	
		echo "<tr><td id='id_shuoming_td'>";
		echo "<div id='id_shuoming_div'>
填表须知：<br>
1、此表是对学生职业生涯发展目标及实施情况的动态记录。<br>
2、表中“个人基本信息”、“自我描述”、“ SWOT 分析”、“如何解决劣势或不足”、“想从事的职业及该职业对人才素质的要求”和“职业生涯发展规划”等内容须由学生于第一学年末之前填写完整。<br>
3、“职业生涯发展规划”的内容除了专业学习规划以外，还应包括文化修养、素质提升、职业能力锻炼、创新创业训练等方面的规划。<br>
4、“学年实施情况”、“评估调整”由学生在相应学年末之前填写完整。<br>
5、班主任、辅导员老师指导学生认真填写。在学生每次填写完成后进行检查，并在相应表格中填写指导意见和建议。<br>
6、 班主任、辅导员老师应定期对学生职业生涯规划书的撰写情况进行汇总，并向学院就业工作领导小组汇报。<br>
</div>";
		echo "</td></tr>";
		echo "</table>";	
	
	echo "</div>";	
	echo "</td></tr></table><br>";
	echo "<div id='id_div_test'></div>";
	}
?>

</form><hr>
<?php 
	include 'footer.php';
?>