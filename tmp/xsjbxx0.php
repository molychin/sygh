<?php 
	include 'header.php';
	include 'conn.php';		
?>
<script type="text/javascript" src=""></script>
<br>
<b>ѧ��������Ϣ��ʾ</b><br><br>
<form id="" name="form1" action="" method="post">

<?php
	$SQL="select xh,xm,xb,csrq,zzmm,lxdh,jtzz,jtdh,yzbm from xsjbxxb_copy where xh=$zgh";
	$query=mysql_query($SQL);
	$row=mysql_fetch_array($query) or die('Error querying database.');	
	$xb=$row['xb'];
	$csrq=$row['csrq'];
	$zzmm=$row['zzmm'];
	$lxdh=$row['lxdh'];
	$jtzz=$row['jtzz'];
	$jtdh=$row['jtdh'];
	$yzbm=$row['yzbm'];

	//echo $zgh.'/'.$xm.'/'.$csrq.'/'.$zzmm.'/'.$lxdh.'/'.$jtzz.'/'.$jtdh.'/'.$yzbm;
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
	
	echo "<tr><td><input type='submit' value='��  ��'/></td></tr>";
	
	echo "		<tr><td><table>";
	echo "			<tr><td rowspan='4'>��<br>��<br>��<br>��</td><td>�Ը�</td><td><textarea name='xingge' rows='3' cols='100'></textarea></td></tr>";
	echo "			<tr><td>��Ȥ</td><td><textarea name='xingqu' rows='3' cols='100'></textarea></td></tr>";
	echo "			<tr><td>�س�</td><td><textarea name='techang' rows='3' cols='100'></textarea></td></tr>";
	echo "			<tr><td>����</td><td><textarea name='nengli' rows='3' cols='100'></textarea></td></tr>";
	echo "		</table></td></tr>";

	echo "		<tr><td><table>";
	echo "			<tr><td rowspan='4'>S<br>W<br>O<br>T<br>��<br>��</td><td>S�����ƣ�</td><td>";
	echo "				<textarea name='xingge' rows='3' cols='90'></textarea></td></tr>";
	echo "			<tr><td>W�����ƣ�</td><td><textarea name='xingqu' rows='3' cols='90'></textarea></td></tr>";
	echo "			<tr><td>O�����ٵĻ�����</td><td><textarea name='techang' rows='3' cols='90'></textarea></td></tr>";
	echo "			<tr><td>T���ܵ�����в��</td><td><textarea name='nengli' rows='3' cols='90'></textarea></td></tr>";
	echo "		</table></td></tr>";

	echo "		<tr><td><table>";
	echo "			<tr><td>��<br>��<br>��<br>��<br>��<br>��<br>��<br>��<br>��<br></td>";
	echo "				<td><textarea name='xingge' rows='9' cols='100'></textarea></td></tr>";
	echo "		</table></td></tr>";

	echo "		<tr><td><table>";
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
	
	echo "		<tr><td><table>";
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

	echo "		<tr><td><table>";
	echo "			<tr><td rowspan='4'>��<br>��<br>��<br>��</td>";
	echo "				<td>��<br>ѧ<br>��<br>��<br></td><td>";
	echo "				<table>";
	echo "					<tr><td>��<br>һ<br>ѧ<br>��</td><td><table>";
	echo "						<tr><td>Ŀ��ʵ�������<br><textarea name='' cols='100' rows='5'></textarea></td></tr>";
	echo "						<tr><td>���������<br><textarea name='' cols='100' rows='5'></textarea></td></tr>";
	echo "						<tr><td>������ָ�������<br><textarea name='' cols='100' rows='5'></textarea></td></tr>";
	echo "					</table></td</tr>";
	echo "					<tr><td>��<br>��<br>ѧ<br>��</td><td><table>";
	echo "						<tr><td>Ŀ��ʵ�������<br><textarea name='' cols='100' rows='5'></textarea></td></tr>";
	echo "						<tr><td>���������<br><textarea name='' cols='100' rows='5'></textarea></td></tr>";
	echo "						<tr><td>������ָ�������<br><textarea name='' cols='100' rows='5'></textarea></td></tr>";
	echo "					</table></td</tr>";
	echo "					<tr><td>��<br>��<br>ѧ<br>��</td><td><table>";
	echo "						<tr><td>Ŀ��ʵ�������<br><textarea name='' cols='100' rows='5'></textarea></td></tr>";
	echo "						<tr><td>���������<br><textarea name='' cols='100' rows='5'></textarea></td></tr>";
	echo "						<tr><td>������ָ�������<br><textarea name='' cols='100' rows='5'></textarea></td></tr>";
	echo "					</table></td</tr>";
	echo "					<tr><td>��<br>��<br>ѧ<br>��</td><td><table>";
	echo "						<tr><td>Ŀ��ʵ�������<br><textarea name='' cols='100' rows='5'></textarea></td></tr>";
	echo "						<tr><td>���������<br><textarea name='' cols='100' rows='5'></textarea></td></tr>";
	echo "						<tr><td>������ָ�������<br><textarea name='' cols='100' rows='5'></textarea></td></tr>";
	echo "					</table></td</tr>";	
	echo "				</table></td></tr>";

	echo "		</table></td></tr>";
	 
	echo "</table>";


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
