<?php 
	include 'header.php';
	include 'conn.php';		
?>
<script type="text/javascript" src="js/xsjbxx_js.js"></script>

<br>
<b>������ѧԺ-��ѧ��ְҵ���Ĺ滮��</b><br><br>
<form id="" name="form" action="save_js.php" method="post">

<?php
	$dqxn=$_SESSION['dqxn'];
	$dqxq=$_SESSION['dqxq'];
	$dqxnxq=$dqxn.'-'.$dqxq;	//��ǰѧ��ѧ�ڣ�2016-2017-2
	
	$SQL="select bjmc from bjdmb where bzrzgh='$zgh' and find_in_set(nj,$njfw)";
	$bjmcs="''";
	$query=mysqli_query($conn,$SQL)or die("Error querying database0,not found,xsjbxx_js1.php.");
	echo "<table class='border0'><tr><td valign='top'>";
	echo "<table class='border0'>";
	echo "<tr><td>ѧ��|����</td><td>ѧ��|����</td><td>ѧ��|����</td></tr>";
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

	//$SQL="select concat(xh,'|',xm) xhxm,xzb from xsjbxxb where xzb in (select bjmc from bjdmb where bzrzgh='199900037' and find_in_set(nj,'2016,2015,2013'))";  //Ч�ʵ�
	//$SQL="select concat(xh,'|',xm) xhxm,xh,xzb,(select jspybj from sygh_zysyghs where xh=xsjbxxb.xh)jspybj from xsjbxxb where xzb in ($bjmcs)";		//�����ִ���ٶȱȽ���
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
	echo "<div id='id_shuoming' class='id_shuoming'>˵����ͨ�����ѧ�����������������</div>";
	echo "<br><hr>";
	echo "<div id='id_sygh'>ѧ�����Ĺ滮";
	
	$SQL="select xh,xm,xb,csrq,zzmm,lxdh,jtzz,jtdh,yzbm from xsjbxxb where xh='$xsxh'";
	$query=mysqli_query($conn,$SQL);
	if(!$query){
		  echo "Error selected database: ".mysql_error();		
	}else{
		$row=mysqli_fetch_array($query,MYSQLI_ASSOC) or die('Error querying database1,xsjbxx_xs.php.');	
		$xb=$row['xb'];			//�Ա�
		$csrq=$row['csrq'];		//��������
		$zzmm=$row['zzmm'];		//������ò
		$lxdh=$row['lxdh'];		//��ϵ�绰
		$jtzz=$row['jtzz'];		//��ͥסַ
		$jtdh=$row['jtdh'];		//��ͥ�绰
		$yzbm=$row['yzbm'];		//��������

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
		echo "<tr><td align='left'>���ʱ�䣺$txsj</td></tr>";
		echo "		<tr><td><table class='border0 jbxx_div'><tr>";
		echo "			<td><table class='jbxx_div'><tr><td>ѧ�ţ�</td><td>$xsxh</td><td>������</td><td>$xm</td>";
		echo "					<td>�Ա�</td><td>$xb</td></tr>";
		echo "					<tr><td>�������£�</td><td>$csrq</td>";
		echo "					<td>��ϵ�绰��</td><td><input type='text' value='$lxdh' name='lianxidianhua' class='text_readonly' readonly /></td>";
		echo "					<td>������ò</td><td>$zzmm</td></tr>";
		echo "					<tr><td>��ͥסַ��</td><td colspan='3'><input type='text' value='$jtzz' name='jiatingzhuzhi' size='50' class='text_readonly' readonly /></td>";
		echo "					<td>��ͥ�绰��</td><td><input type='text' value='$jtdh' name='jiatingdianhua' class='text_readonly' readonly /></td></tr>";
		echo "					<tr><td>�������룺</td><td colspan='5'><input type='text' value='$yzbm' name='youzhengbianma' class='text_readonly' readonly /></td></tr>";
		echo "			</table></td>";
		echo "			<td><img src='stu_photos/$xsxh.jpg' class='img_photo' /></td>";
		echo "		</tr></table></td></tr>";
		
		echo "		<tr>";
		echo "			<td><div class='hideshow_div'><button type='button' id='but_zwms'>����/��ʾ</button>��������</div>
							<table id='tab_zwms'>";
		echo "			<tr><td rowspan='4'>��<br>��<br>��<br>��</td>
							<td>�Ը�</td><td><textarea name='xingge' rows='5' cols='105' class='text_readonly' readonly>$xingge</textarea></td></tr>";
		echo "			<tr><td>��Ȥ</td><td><textarea name='xingqu' rows='5' cols='105' class='text_readonly' readonly>$xingqu</textarea></td></tr>";
		echo "			<tr><td>�س�</td><td><textarea name='techang' rows='5' cols='105' class='text_readonly' readonly>$techang</textarea></td></tr>";
		echo "			<tr><td>����</td><td><textarea name='nengli' rows='5' cols='105' class='text_readonly' readonly>$nengli</textarea></td></tr>";
		echo "		</table></td></tr>";	

		echo "		<tr>";
		echo "		<td><div class='hideshow_div'><button type='button' id='but_swot'>����/��ʾ</button>SWOT����</div>
						<table id='tab_swot'>";
		echo "			<tr><td rowspan='4'>S<br>W<br>O<br>T<br>��<br>��</td>
						<td>S�����ƣ�</td><td>";
		echo "				<textarea name='youshi' rows='3' cols='90' class='text_readonly' readonly>$youshi</textarea></td></tr>";
		echo "			<tr><td>W�����ƣ�</td><td><textarea name='lieshi' rows='5' cols='90' class='text_readonly' readonly>$lieshi</textarea></td></tr>";
		echo "			<tr><td>O�����ٵĻ�����</td><td><textarea name='jiyu' rows='5' cols='90' class='text_readonly' readonly>$jiyu</textarea></td></tr>";
		echo "			<tr><td>T���ܵ�����в��</td><td><textarea name='weixie' rows='5' cols='90' class='text_readonly' readonly>$weixie</textarea></td></tr>";
		echo "		</table></td></tr>";
		
		echo "		<tr><td><div class='hideshow_div'><button type='button' id='but_jjls'>����/��ʾ</button>��ν�����ƻ���</div><table id='tab_jjls'>";
		echo "			<tr><td>��<br>��<br>��<br>��<br>��<br>��<br>��<br>��<br>��<br></td>";
		echo "				<td><textarea name='jjls' rows='9' cols='100' class='text_readonly' readonly>$jjls</textarea></td></tr>";
		echo "		</table></td></tr>";			
	
		echo "		<tr><td><div class='hideshow_div'><button type='button' id='but_cszy'>����/��ʾ</button>����µ�ְҵ����ְҵ���˲����ʵ�Ҫ��</div><table id='tab_cszy'>";
		echo "			<tr><td rowspan='4'>��<br>��<br>��<br>��<br>ְ<br>ҵ<br>��<br>��<br>ְ<br>ҵ<br>��<br>��<br>��<br>��<br>��<br>��<br>Ҫ<br>��</td>";
		echo "				<td><table><tr align='left'><td>ְҵһ��<br><input type='text' value='$zhiye1' name='zhiye1' size='50' class='text_readonly' readonly/></td></tr>";
		echo "					<tr align='left'><td>ְҵ��չ·�ߣ�<br><input type='text' value='$fzlx1' name='fzlx1' size='50' class='text_readonly' readonly/></td></tr>";
		echo "					<tr align='left'><td>���˲ŵ�����Ҫ������רҵ�ļ���ˮƽ:<br>";
		echo "						<textarea name='jnsp1' rows='9' cols='100' class='text_readonly' readonly>$jnsp1</textarea></td></tr>";
		echo "				</table></td></tr>";
		echo "			<tr><td><table><tr align='left'><td>ְҵ����<br><input type='text' value='$zhiye2' name='zhiye2' size='50' class='text_readonly' readonly/></td></tr>";
		echo "				<tr align='left'><td>ְҵ��չ·�ߣ�<br><input type='text' value='$fzlx2' name='fzlx2' size='50' class='text_readonly' readonly/></td></tr>";
		echo "				<tr align='left'><td>���˲ŵ�����Ҫ������רҵ�ļ���ˮƽ:<br>";
		echo "					<textarea name='jnsp2' rows='9' cols='100' class='text_readonly' readonly>$jnsp2</textarea></td></tr>";
		echo "			</table></td></tr>";
		echo "			<tr><td><table><tr align='left'><td>ְҵ����<br><input type='text' value='$zhiye3' name='zhiye3' size='50' class='text_readonly' readonly/></td></tr>";
		echo "				<tr align='left'><td>ְҵ��չ·�ߣ�<br><input type='text' value='$fzlx3' name='fzlx3' size='50' class='text_readonly' readonly/></td></tr>";
		echo "				<tr align='left'><td>���˲ŵ�����Ҫ������רҵ�ļ���ˮƽ:<br>";
		echo "					<textarea name='jnsp3' rows='9' cols='100' class='text_readonly' readonly>$jnsp3</textarea></td></tr>";
		echo "			</table></td></tr>";

		echo "		</table></td></tr>";		

		echo "		<tr><td><div class='hideshow_div'><button type='button' id='but_sygh'>����/��ʾ</button>ְҵ���ķ�չ�滮</div><table id='tab_sygh'>";
		echo "			<tr><td rowspan='4'>ְ<br>ҵ<br>��<br>��<br>��<br>չ<br>��<br>��<br>��<br>��<br>��<br>Ŀ<br>��<br>��<br>��<br>ʩ<br>��<br></td>";
		echo "				<td>��<br>ѧ<br>��<br>��<br></td><td>";
		echo "				<table>";
		echo "					<tr><td>��<br>һ<br>ѧ<br>��</td><td><textarea name='mbcs_n1' rows='9' cols='100' class='text_readonly' readonly>$mbcs_n1</textarea></td</tr>";
		echo "					<tr><td>��<br>��<br>ѧ<br>��</td><td><textarea name='mbcs_n2' rows='9' cols='100' class='text_readonly' readonly>$mbcs_n2</textarea></td</tr>";
		echo "					<tr><td>��<br>��<br>ѧ<br>��</td><td><textarea name='mbcs_n3' rows='9' cols='100' class='text_readonly' readonly>$mbcs_n3</textarea></td</tr>";
		echo "					<tr><td>��<br>��<br>ѧ<br>��</td><td><textarea name='mbcs_n4' rows='9' cols='100' class='text_readonly' readonly>$mbcs_n4</textarea></td</tr>";	
		echo "				</table></td></tr>";
		echo "			<tr><td></td><td>";
		echo "				<table>";
		echo "					<tr><td>��<br>��<br>��</td><td><textarea name='mbcs_n5' rows='9' cols='100' class='text_readonly' readonly>$mbcs_n5</textarea></td</tr>";
		echo "					<tr><td>ʮ<br>��<br>��</td><td><textarea name='mbcs_n10' rows='9' cols='100' class='text_readonly' readonly>$mbcs_n10</textarea></td</tr>";
		echo "				</table></td></tr>";
		echo "		</table></td></tr>";

		echo "		<tr><td><div class='hideshow_div'><button type='button' id='but_sszj'>����/��ʾ</button>ѧ��ʵʩ����ܽ�</div><table id='tab_sszj'>";
		echo "			<tr><td rowspan='2'>ѧ<br>��<br>ʵ<br>ʩ<br>��<br>��<br>��<br>��<br>";
		echo "					��<br>˼<br>��<br>��<br>��<br>��<br>��<br>��<br>ѧ<br>ϰ<br>��<br>��<br>��<br>��<br>";
		echo "					��<br>��<br>��<br>��<br>��<br>��<br>��<br>֤<br>��<br>��<br>)<br></td>";
		echo "				<td><table>";
		echo "					<tr><td>ʱ��</td><td>��������</td><td>����������ͽ���</td></tr>";
		echo "					<tr><td>��<br>һ<br>ѧ<br>��<br>ĩ</td><td><textarea name='sszj_zp1' rows='9' cols='70' class='text_readonly' readonly>$sszj_zp1</textarea></td><td>";
		echo "					<textarea name='sszj_jy1' rows='9' cols='30'>$sszj_jy1</textarea></td></tr>";
		echo "					<tr><td>��<br>��<br>ѧ<br>��<br>ĩ</td><td><textarea name='sszj_zp2' rows='9' cols='70' class='text_readonly' readonly>$sszj_zp2</textarea></td><td>";
		echo "					<textarea name='sszj_jy2' rows='9' cols='30'>$sszj_jy2</textarea></td></tr>";
		echo "					<tr><td>��<br>��<br>ѧ<br>��<br>ĩ</td><td><textarea name='sszj_zp3' rows='9' cols='70' class='text_readonly' readonly>$sszj_zp3</textarea></td><td>";
		echo "					<textarea name='sszj_jy3' rows='9' cols='30'>$sszj_jy3</textarea></td></tr>";
		echo "					<tr><td>��<br>��<br>ѧ<br>��<br>ĩ</td><td><textarea name='sszj_zp4' rows='9' cols='70' class='text_readonly' readonly>$sszj_zp4</textarea></td><td>";
		echo "					<textarea name='sszj_jy4' rows='9' cols='30'>$sszj_jy4</textarea></td></tr>";	
		echo "				</table></td></tr>";
		echo "		</table></td></tr>";

		echo "		<tr><td><div class='hideshow_div'><button type='button' id='but_pgtz'>����/��ʾ</button>��������</div><table id='tab_pgtz'>";
		echo "			<tr><td rowspan='4'>��<br>��<br>��<br>��</td>";
		echo "				<td>��<br>ѧ<br>��<br>��<br></td><td>";
		echo "				<table>";
		echo "					<tr><td>��<br>һ<br>ѧ<br>��</td><td><table>";
		echo "						<tr><td>Ŀ��ʵ�������<br><textarea name='pgtz_sxqk1' cols='100' rows='5' class='text_readonly' readonly>$pgtz_sxqk1</textarea></td></tr>";
		echo "						<tr><td>���������<br><textarea name='pgtz_tzqk1' cols='100' rows='5' class='text_readonly' readonly>$pgtz_tzqk1</textarea></td></tr>";
		echo "						<tr><td>������ָ�������<br><textarea name='pgtz_zdyj1' cols='100' rows='5'>$pgtz_zdyj1</textarea></td></tr>";
		echo "					</table></td</tr>";
		echo "					<tr><td>��<br>��<br>ѧ<br>��</td><td><table>";
		echo "						<tr><td>Ŀ��ʵ�������<br><textarea name='pgtz_sxqk2' cols='100' rows='5' class='text_readonly' readonly>$pgtz_sxqk2</textarea></td></tr>";
		echo "						<tr><td>���������<br><textarea name='pgtz_tzqk2' cols='100' rows='5' class='text_readonly' readonly>$pgtz_tzqk2</textarea></td></tr>";
		echo "						<tr><td>������ָ�������<br><textarea name='pgtz_zdyj2' cols='100' rows='5'>$pgtz_zdyj2</textarea></td></tr>";
		echo "					</table></td</tr>";
		echo "					<tr><td>��<br>��<br>ѧ<br>��</td><td><table>";
		echo "						<tr><td>Ŀ��ʵ�������<br><textarea name='pgtz_sxqk3' cols='100' rows='5' class='text_readonly' readonly>$pgtz_sxqk3</textarea></td></tr>";
		echo "						<tr><td>���������<br><textarea name='pgtz_tzqk3' cols='100' rows='5' class='text_readonly' readonly>$pgtz_tzqk3</textarea></td></tr>";
		echo "						<tr><td>������ָ�������<br><textarea name='pgtz_zdyj3' cols='100' rows='5'>$pgtz_zdyj3</textarea></td></tr>";
		echo "					</table></td</tr>";
		echo "					<tr><td>��<br>��<br>ѧ<br>��</td><td><table>";
		echo "						<tr><td>Ŀ��ʵ�������<br><textarea name='pgtz_sxqk4' cols='100' rows='5' class='text_readonly' readonly>$pgtz_sxqk4</textarea></td></tr>";
		echo "						<tr><td>���������<br><textarea name='pgtz_tzqk4' cols='100' rows='5' class='text_readonly' readonly>$pgtz_tzqk4</textarea></td></tr>";
		echo "						<tr><td>������ָ�������<br><textarea name='pgtz_zdyj4' cols='100' rows='5'>$pgtz_zdyj4</textarea></td></tr>";
		echo "					</table></td</tr>";	
		echo "				</table></td></tr>";
		echo "</table>";
		
		echo "<tr><td><input type='submit' value='��  ��' class='button' ></input></td></tr>";	
		echo "<tr><td id='id_shuoming_td'>";
		echo "<div id='id_shuoming_div'>
�����֪��<br>
1���˱��Ƕ�ѧ��ְҵ���ķ�չĿ�꼰ʵʩ����Ķ�̬��¼��<br>
2�����С����˻�����Ϣ�������������������� SWOT ������������ν�����ƻ��㡱��������µ�ְҵ����ְҵ���˲����ʵ�Ҫ�󡱺͡�ְҵ���ķ�չ�滮������������ѧ���ڵ�һѧ��ĩ֮ǰ��д������<br>
3����ְҵ���ķ�չ�滮�������ݳ���רҵѧϰ�滮���⣬��Ӧ�����Ļ�����������������ְҵ�������������´�ҵѵ���ȷ���Ĺ滮��<br>
4����ѧ��ʵʩ���������������������ѧ������Ӧѧ��ĩ֮ǰ��д������<br>
5�������Ρ�����Ա��ʦָ��ѧ��������д����ѧ��ÿ����д��ɺ���м�飬������Ӧ�������дָ������ͽ��顣<br>
6�� �����Ρ�����Ա��ʦӦ���ڶ�ѧ��ְҵ���Ĺ滮���׫д������л��ܣ�����ѧԺ��ҵ�����쵼С��㱨��<br>
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