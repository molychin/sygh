<?php 
	include 'header.php';
	include 'conn.php';		
?>
<script type="text/javascript" src="js/xsjbxx.js"></script>
<br>
<b>ѧ��������Ϣ��ʾ</b><br><br>
<form id="" name="form_xsjbxx" action="save_xsjbxx.php" method="post">

<?php
	//$SQL="select xh,xm,xb,csrq,zzmm,lxdh,jtzz,jtdh,yzbm from xsjbxxb_copy where xh=$zgh";
	$SQL="select xh,xm,xb,csrq,zzmm,lxdh,jtzz,jtdh,yzbm from xsjbxxb where xh=$zgh";
	$query=mysql_query($SQL);
	if(!$query){
		  echo "Error selected database: ".mysql_error();		
	}else{
		$row=mysql_fetch_array($query) or die('Error querying database.');	
		$xb=$row['xb'];			//�Ա�
		$csrq=$row['csrq'];		//��������
		$zzmm=$row['zzmm'];		//������ò
		$lxdh=$row['lxdh'];		//��ϵ�绰
		$jtzz=$row['jtzz'];		//��ͥסַ
		$jtdh=$row['jtdh'];		//��ͥ�绰
		$yzbm=$row['yzbm'];		//��������

		//echo $zgh.'/'.$xm.'/'.$csrq.'/'.$zzmm.'/'.$lxdh.'/'.$jtzz.'/'.$jtdh.'/'.$yzbm;
		
		//$SQL="select xh,xm,zwms_xg,zwms_xq,zwms_tc,zwms_nl from sygh_zysyghs where xh=$zgh";
		//$SQL="select xh,xm,zwms_xg,zwms_xq,zwms_tc,zwms_nl,swot_s,swot_w,swot_o,swot_t from sygh_zysyghs where xh=$zgh";
		$SQL="select xh,xm,zwms_xg,zwms_xq,zwms_tc,zwms_nl,swot_s,swot_w,swot_o,swot_t,jjlsbz from sygh_zysyghs where xh=$zgh";
		$query=mysql_query($SQL);
		$row=mysql_fetch_array($query) or die('Error querying database1.');
		$xingge=$row['zwms_xg'];
		$xingqu=$row['zwms_xq'];
		$techang=$row['zwms_tc'];
		$nengli=$row['zwms_nl'];
		$youshi=$row['swot_s'];
		$lieshi=$row['swot_w'];
		$jiyu=$row['swot_o'];
		$weixie=$row['swot_t'];
		$jjls=$row['jjlsbz'];
		
		
		echo "<table class='border0'>";
		echo "		<tr><td><table class='border0'><tr>";
		echo "			<td><table><tr><td>ѧ�ţ�</td><td>$zgh</td><td>������</td><td>$xm</td>";
		echo "					<td>�Ա�</td><td>$xb</td></tr>";
		echo "					<tr><td>�������£�</td><td>$csrq</td>";
		echo "					<td>��ϵ�绰��</td><td><input type='text' value='$lxdh' name='lianxidianhua' /></td>";
		echo "					<td>������ò</td><td>$zzmm</td></tr>";
		echo "					<tr><td>��ͥסַ��</td><td colspan='3'><input type='text' value='$jtzz' name='jiatingzhuzhi' size='50' /></td>";
		echo "					<td>��ͥ�绰��</td><td><input type='text' value='$jtdh' name='jiatingdianhua' /></td></tr>";
		echo "					<tr><td>�������룺</td><td colspan='5'><input type='text' value='$yzbm' name='youzhengbianma' /></td></tr>";
		echo "			</table></td>";
		echo "			<td><img src='stu_photos/$zgh.jpg' class='img_photo' /></td>";
		echo "		</tr></table></td></tr>";
		
		echo "		<tr>";
		echo "			<td>��������<button type='button' id='but_zwms'>����/��ʾ</button>
							<table id='tab_zwms'>";
		echo "			<tr><td rowspan='4'>��<br>��<br>��<br>��</td>
							<td>�Ը�</td><td><textarea name='xingge' rows='5' cols='105'>$xingge</textarea></td></tr>";
		echo "			<tr><td>��Ȥ</td><td><textarea name='xingqu' rows='5' cols='105'>$xingqu</textarea></td></tr>";
		echo "			<tr><td>�س�</td><td><textarea name='techang' rows='5' cols='105'>$techang</textarea></td></tr>";
		echo "			<tr><td>����</td><td><textarea name='nengli' rows='5' cols='105'>$nengli</textarea></td></tr>";
		echo "		</table></td></tr>";	

		echo "		<tr>";
		echo "		<td>SWOT����<button type='button' id='but_swot'>����/��ʾ</button>
						<table id='tab_swot'>";
		echo "			<tr><td rowspan='4'>S<br>W<br>O<br>T<br>��<br>��</td>
						<td>S�����ƣ�</td><td>";
		echo "				<textarea name='youshi' rows='3' cols='90'>$youshi</textarea></td></tr>";
		echo "			<tr><td>W�����ƣ�</td><td><textarea name='lieshi' rows='5' cols='90'>$lieshi</textarea></td></tr>";
		echo "			<tr><td>O�����ٵĻ�����</td><td><textarea name='jiyu' rows='5' cols='90'>$jiyu</textarea></td></tr>";
		echo "			<tr><td>T���ܵ�����в��</td><td><textarea name='weixie' rows='5' cols='90'>$weixie</textarea></td></tr>";
		echo "		</table></td></tr>";
		
		echo "		<tr><td>��ν�����ƻ���<button type='button' id='but_jjls'>����/��ʾ</button><table id='tab_jjls'>";
		echo "			<tr><td>��<br>��<br>��<br>��<br>��<br>��<br>��<br>��<br>��<br></td>";
		echo "				<td><textarea name='jjls' rows='9' cols='100'>$jjls</textarea></td></tr>";
		echo "		</table></td></tr>";		
		
	
		echo "		<tr><td>����µ�ְҵ<button type='button' id='but_cszy'>����/��ʾ</button><table id='tab_cszy'>";
		echo "			<tr><td rowspan='4'>��<br>��<br>��<br>��<br>ְ<br>ҵ<br>��<br>��<br>ְ<br>ҵ<br>��<br>��<br>��<br>��<br>��<br>��<br>Ҫ<br>��</td>";
		echo "				<td><table><tr align='left'><td>ְҵһ��<br><input type='text' value='' name='zhiye1' size='50' /></td></tr>";
		echo "					<tr align='left'><td>ְҵ��չ·�ߣ�<br><input type='text' value='' name='zhiye1' size='50' /></td></tr>";
		echo "					<tr align='left'><td>���˲ŵ�����Ҫ������רҵ�ļ���ˮƽ:<br>";
		echo "						<textarea name='xingge' rows='9' cols='100'></textarea></td></tr>";
		echo "				</table></td></tr>";
		echo "			<tr><td><table><tr align='left'><td>ְҵ����<br><input type='text' value='' name='zhiye1' size='50' /></td></tr>";
		echo "				<tr align='left'><td>ְҵ��չ·�ߣ�<br><input type='text' value='' name='zhiye1' size='50' /></td></tr>";
		echo "				<tr align='left'><td>���˲ŵ�����Ҫ������רҵ�ļ���ˮƽ:<br>";
		echo "					<textarea name='xingge' rows='9' cols='100'></textarea></td></tr>";
		echo "			</table></td></tr>";
		echo "			<tr><td><table><tr align='left'><td>ְҵ����<br><input type='text' value='' name='zhiye1' size='50' /></td></tr>";
		echo "				<tr align='left'><td>ְҵ��չ·�ߣ�<br><input type='text' value='' name='zhiye1' size='50' /></td></tr>";
		echo "				<tr align='left'><td>���˲ŵ�����Ҫ������רҵ�ļ���ˮƽ:<br>";
		echo "					<textarea name='xingge' rows='9' cols='100'></textarea></td></tr>";
		echo "			</table></td></tr>";
		echo "			<tr><td><table><tr align='left'><td>ְҵ�ģ�<br><input type='text' value='' name='zhiye1' size='50' /></td></tr>";
		echo "				<tr align='left'><td>ְҵ��չ·�ߣ�<br><input type='text' value='' name='zhiye1' size='50' /></td></tr>";
		echo "				<tr align='left'><td>���˲ŵ�����Ҫ������רҵ�ļ���ˮƽ:<br>";
		echo "					<textarea name='xingge' rows='9' cols='100'></textarea></td></tr>";
		echo "			</table></td></tr>";
		echo "		</table></td></tr>";		

		echo "		<tr><td>ְҵ���ķ�չ�滮<button type='button' id='but_sygh'>����/��ʾ</button><table id='tab_sygh'>";
		echo "			<tr><td rowspan='4'>ְ<br>ҵ<br>��<br>��<br>��<br>չ<br>��<br>��<br>��<br>��<br>��<br>Ŀ<br>��<br>��<br>��<br>ʩ<br>��<br></td>";
		echo "				<td>��<br>ѧ<br>��<br>��<br></td><td>";
		echo "				<table>";
		echo "					<tr><td>��<br>һ<br>ѧ<br>��</td><td><textarea name='xuenian1' rows='9' cols='100'></textarea></td</tr>";
		echo "					<tr><td>��<br>��<br>ѧ<br>��</td><td><textarea name='xuenian1' rows='9' cols='100'></textarea></td</tr>";
		echo "					<tr><td>��<br>��<br>ѧ<br>��</td><td><textarea name='xuenian1' rows='9' cols='100'></textarea></td</tr>";
		echo "					<tr><td>��<br>��<br>ѧ<br>��</td><td><textarea name='xuenian1' rows='9' cols='100'></textarea></td</tr>";	
		echo "				</table></td></tr>";
		echo "			<tr><td></td><td>";
		echo "				<table>";
		echo "					<tr><td>��<br>��<br>��</td><td><textarea name='xuenian1' rows='9' cols='100'></textarea></td</tr>";
		echo "					<tr><td>ʮ<br>��<br>��</td><td><textarea name='xuenian1' rows='9' cols='100'></textarea></td</tr>";
		echo "				</table></td></tr>";
		echo "		</table></td></tr>";

		echo "		<tr><td><table>";
		echo "			<tr><td rowspan='2'>ѧ<br>��<br>ʵ<br>ʩ<br>��<br>��<br>��<br>��<br>";
		echo "					��<br>˼<br>��<br>��<br>��<br>��<br>��<br>��<br>ѧ<br>ϰ<br>��<br>��<br>��<br>��<br>";
		echo "					��<br>��<br>��<br>��<br>��<br>��<br>��<br>֤<br>��<br>��<br>)<br></td>";
		echo "				<td><table>";
		echo "					<tr><td>ʱ��</td><td>��������</td><td>����������ͽ���</td></tr>";
		echo "					<tr><td>��<br>һ<br>ѧ<br>��<br>ĩ</td><td><textarea name='xuenian1' rows='9' cols='70'></textarea></td><td>";
		echo "					<textarea name='xuenian1' rows='9' cols='30'></textarea></td></tr>";
		echo "					<tr><td>��<br>��<br>ѧ<br>��<br>ĩ</td><td><textarea name='xuenian1' rows='9' cols='70'></textarea></td><td>";
		echo "					<textarea name='xuenian1' rows='9' cols='30'></textarea></td></tr>";
		echo "					<tr><td>��<br>��<br>ѧ<br>��<br>ĩ</td><td><textarea name='xuenian1' rows='9' cols='70'></textarea></td><td>";
		echo "					<textarea name='xuenian1' rows='9' cols='30'></textarea></td></tr>";
		echo "					<tr><td>��<br>��<br>ѧ<br>��<br>ĩ</td><td><textarea name='xuenian1' rows='9' cols='70'></textarea></td><td>";
		echo "					<textarea name='xuenian1' rows='9' cols='30'></textarea></td></tr>";	
		echo "				</table></td></tr>";
		echo "		</table></td></tr>";

		
		echo "<tr><td><input type='submit' value='��  ��'/></td></tr>";		
		echo "</table>";
	}



?>


</form>
<hr><div align='left'>
�����֪��<br>
1���˱��Ƕ�ѧ��ְҵ���ķ�չĿ�꼰ʵʩ����Ķ�̬��¼��<br>
2�����С����˻�����Ϣ�������������������� SWOT ������������ν�����ƻ��㡱��������µ�ְҵ����ְҵ���˲����ʵ�Ҫ�󡱺͡�ְҵ���ķ�չ�滮������������ѧ���ڵ�һѧ��ĩ֮ǰ��д������<br>
3����ְҵ���ķ�չ�滮�������ݳ���רҵѧϰ�滮���⣬��Ӧ�����Ļ�����������������ְҵ�������������´�ҵѵ���ȷ���Ĺ滮��<br>
4����ѧ��ʵʩ���������������������ѧ������Ӧѧ��ĩ֮ǰ��д������<br>
5�������Ρ�����Ա��ʦָ��ѧ��������д����ѧ��ÿ����д��ɺ���м�飬������Ӧ�������дָ������ͽ��顣<br>
6�� �����Ρ�����Ա��ʦӦ���ڶ�ѧ��ְҵ���Ĺ滮���׫д������л��ܣ�����ѧԺ��ҵ�����쵼С��㱨��<br>
</div><hr>
<?php 
	include 'footer.php';
?>
