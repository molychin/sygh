<?php 
	include 'header.php';
	include 'conn.php';		
?>
<script type="text/javascript" src="js/xsjbxx.js"></script>
<br>
<b>常熟理工学院-大学生职业生涯规划书</b><br><br>
<form id="" name="form_xsjbxx" action="save_xsjbxx.php" method="post">

<?php
	//$SQL="select xh,xm,xb,csrq,zzmm,lxdh,jtzz,jtdh,yzbm from xsjbxxb_copy where xh=$zgh";
	$SQL="select xh,xm,xb,csrq,zzmm,lxdh,jtzz,jtdh,yzbm from xsjbxxb where xh=$zgh";
	$query=mysql_query($SQL);
	if(!$query){
		  echo "Error selected database: ".mysql_error();		
	}else{
		$row=mysql_fetch_array($query) or die('Error querying database.');	
		$xb=$row['xb'];			//性别
		$csrq=$row['csrq'];		//出生日期
		$zzmm=$row['zzmm'];		//政治面貌
		$lxdh=$row['lxdh'];		//联系电话
		$jtzz=$row['jtzz'];		//家庭住址
		$jtdh=$row['jtdh'];		//家庭电话
		$yzbm=$row['yzbm'];		//邮政编码

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
		echo "		<tr><td><table class='border0 jbxx_div'><tr>";
		echo "			<td><table class='jbxx_div'><tr><td>学号：</td><td>$zgh</td><td>姓名：</td><td>$xm</td>";
		echo "					<td>性别：</td><td>$xb</td></tr>";
		echo "					<tr><td>出生年月：</td><td>$csrq</td>";
		echo "					<td>联系电话：</td><td><input type='text' value='$lxdh' name='lianxidianhua' /></td>";
		echo "					<td>政治面貌</td><td>$zzmm</td></tr>";
		echo "					<tr><td>家庭住址：</td><td colspan='3'><input type='text' value='$jtzz' name='jiatingzhuzhi' size='50' /></td>";
		echo "					<td>家庭电话：</td><td><input type='text' value='$jtdh' name='jiatingdianhua' /></td></tr>";
		echo "					<tr><td>邮政编码：</td><td colspan='5'><input type='text' value='$yzbm' name='youzhengbianma' /></td></tr>";
		echo "			</table></td>";
		echo "			<td><img src='stu_photos/$zgh.jpg' class='img_photo' /></td>";
		echo "		</tr></table></td></tr>";
		
		echo "		<tr>";
		echo "			<td><div class='hideshow_div'><button type='button' id='but_zwms'>隐藏/显示</button>自我描述</div>
							<table id='tab_zwms'>";
		echo "			<tr><td rowspan='4'>自<br>我<br>描<br>述</td>
							<td>性格</td><td><textarea name='xingge' rows='5' cols='105'>$xingge</textarea></td></tr>";
		echo "			<tr><td>兴趣</td><td><textarea name='xingqu' rows='5' cols='105'>$xingqu</textarea></td></tr>";
		echo "			<tr><td>特长</td><td><textarea name='techang' rows='5' cols='105'>$techang</textarea></td></tr>";
		echo "			<tr><td>能力</td><td><textarea name='nengli' rows='5' cols='105'>$nengli</textarea></td></tr>";
		echo "		</table></td></tr>";	

		echo "		<tr>";
		echo "		<td><div class='hideshow_div'><button type='button' id='but_swot'>隐藏/显示</button>SWOT分析</div>
						<table id='tab_swot'>";
		echo "			<tr><td rowspan='4'>S<br>W<br>O<br>T<br>分<br>析</td>
						<td>S（优势）</td><td>";
		echo "				<textarea name='youshi' rows='3' cols='90'>$youshi</textarea></td></tr>";
		echo "			<tr><td>W（劣势）</td><td><textarea name='lieshi' rows='5' cols='90'>$lieshi</textarea></td></tr>";
		echo "			<tr><td>O（面临的机遇）</td><td><textarea name='jiyu' rows='5' cols='90'>$jiyu</textarea></td></tr>";
		echo "			<tr><td>T（受到的威胁）</td><td><textarea name='weixie' rows='5' cols='90'>$weixie</textarea></td></tr>";
		echo "		</table></td></tr>";
		
		echo "		<tr><td><div class='hideshow_div'><button type='button' id='but_jjls'>隐藏/显示</button>如何解决劣势或不足</div><table id='tab_jjls'>";
		echo "			<tr><td>如<br>何<br>解<br>决<br>劣<br>势<br>或<br>不<br>足<br></td>";
		echo "				<td><textarea name='jjls' rows='9' cols='100'>$jjls</textarea></td></tr>";
		echo "		</table></td></tr>";		
		
	
		echo "		<tr><td><div class='hideshow_div'><button type='button' id='but_cszy'>隐藏/显示</button>想从事的职业及该职业对人才素质的要求</div><table id='tab_cszy'>";
		echo "			<tr><td rowspan='4'>想<br>从<br>事<br>的<br>职<br>业<br>及<br>该<br>职<br>业<br>对<br>人<br>才<br>素<br>质<br>的<br>要<br>求</td>";
		echo "				<td><table><tr align='left'><td>职业一：<br><input type='text' value='' name='zhiye1' size='50' /></td></tr>";
		echo "					<tr align='left'><td>职业发展路线：<br><input type='text' value='' name='fzlx1' size='50' /></td></tr>";
		echo "					<tr align='left'><td>对人才的素质要求及所需专业的技能水平:<br>";
		echo "						<textarea name='jnsp1' rows='9' cols='100'></textarea></td></tr>";
		echo "				</table></td></tr>";
		echo "			<tr><td><table><tr align='left'><td>职业二：<br><input type='text' value='' name='zhiye2' size='50' /></td></tr>";
		echo "				<tr align='left'><td>职业发展路线：<br><input type='text' value='' name='fzlx2' size='50' /></td></tr>";
		echo "				<tr align='left'><td>对人才的素质要求及所需专业的技能水平:<br>";
		echo "					<textarea name='jnsp2' rows='9' cols='100'></textarea></td></tr>";
		echo "			</table></td></tr>";
		echo "			<tr><td><table><tr align='left'><td>职业三：<br><input type='text' value='' name='zhiye3' size='50' /></td></tr>";
		echo "				<tr align='left'><td>职业发展路线：<br><input type='text' value='' name='fzlx3' size='50' /></td></tr>";
		echo "				<tr align='left'><td>对人才的素质要求及所需专业的技能水平:<br>";
		echo "					<textarea name='jnsp3' rows='9' cols='100'></textarea></td></tr>";
		echo "			</table></td></tr>";
		echo "			<tr><td><table><tr align='left'><td>职业四：<br><input type='text' value='' name='zhiye4' size='50' /></td></tr>";
		echo "				<tr align='left'><td>职业发展路线：<br><input type='text' value='' name='fzlx4' size='50' /></td></tr>";
		echo "				<tr align='left'><td>对人才的素质要求及所需专业的技能水平:<br>";
		echo "					<textarea name='jnsp4' rows='9' cols='100'></textarea></td></tr>";
		echo "			</table></td></tr>";
		echo "		</table></td></tr>";		

		echo "		<tr><td><div class='hideshow_div'><button type='button' id='but_sygh'>隐藏/显示</button>职业生涯发展规划</div><table id='tab_sygh'>";
		echo "			<tr><td rowspan='4'>职<br>业<br>生<br>涯<br>发<br>展<br>规<br>划<br>（<br>具<br>体<br>目<br>标<br>和<br>措<br>施<br>）<br></td>";
		echo "				<td>大<br>学<br>阶<br>段<br></td><td>";
		echo "				<table>";
		echo "					<tr><td>第<br>一<br>学<br>年</td><td><textarea name='xuenian1' rows='9' cols='100'></textarea></td</tr>";
		echo "					<tr><td>第<br>二<br>学<br>年</td><td><textarea name='xuenian2' rows='9' cols='100'></textarea></td</tr>";
		echo "					<tr><td>第<br>三<br>学<br>年</td><td><textarea name='xuenian3' rows='9' cols='100'></textarea></td</tr>";
		echo "					<tr><td>第<br>四<br>学<br>年</td><td><textarea name='xuenian4' rows='9' cols='100'></textarea></td</tr>";	
		echo "				</table></td></tr>";
		echo "			<tr><td></td><td>";
		echo "				<table>";
		echo "					<tr><td>五<br>年<br>内</td><td><textarea name='xuenian5' rows='9' cols='100'></textarea></td</tr>";
		echo "					<tr><td>十<br>年<br>内</td><td><textarea name='xuenian6' rows='9' cols='100'></textarea></td</tr>";
		echo "				</table></td></tr>";
		echo "		</table></td></tr>";

		echo "		<tr><td><div class='hideshow_div'><button type='button' id='but_sszj'>隐藏/显示</button>学年实施情况总结</div><table id='tab_sszj'>";
		echo "			<tr><td rowspan='2'>学<br>年<br>实<br>施<br>情<br>况<br>总<br>结<br>";
		echo "					（<br>思<br>想<br>政<br>治<br>方<br>面<br>、<br>学<br>习<br>、<br>生<br>活<br>、<br>";
		echo "					获<br>得<br>的<br>技<br>术<br>技<br>能<br>证<br>书<br>等<br>)<br></td>";
		echo "				<td><table>";
		echo "					<tr><td>时间</td><td>个人自评</td><td>班主任意见和建议</td></tr>";
		echo "					<tr><td>第<br>一<br>学<br>年<br>末</td><td><textarea name='xs_xuenian1' rows='9' cols='70'></textarea></td><td>";
		echo "					<textarea name='js_xuenian1' rows='9' cols='30' readonly class='jsjy_textarea'></textarea></td></tr>";
		echo "					<tr><td>第<br>二<br>学<br>年<br>末</td><td><textarea name='xs_xuenian2' rows='9' cols='70'></textarea></td><td>";
		echo "					<textarea name='js_xuenian2' rows='9' cols='30' readonly class='jsjy_textarea'></textarea></td></tr>";
		echo "					<tr><td>第<br>三<br>学<br>年<br>末</td><td><textarea name='xs_xuenian3' rows='9' cols='70'></textarea></td><td>";
		echo "					<textarea name='js_xuenian3' rows='9' cols='30' readonly class='jsjy_textarea'></textarea></td></tr>";
		echo "					<tr><td>第<br>四<br>学<br>年<br>末</td><td><textarea name='xs_xuenian4' rows='9' cols='70'></textarea></td><td>";
		echo "					<textarea name='js_xuenian4' rows='9' cols='30' readonly class='jsjy_textarea'></textarea></td></tr>";	
		echo "				</table></td></tr>";
		echo "		</table></td></tr>";

		echo "		<tr><td><div class='hideshow_div'><button type='button' id='but_pgtz'>隐藏/显示</button>评估调整</div><table id='tab_pgtz'>";
		echo "			<tr><td rowspan='4'>评<br>估<br>调<br>整</td>";
		echo "				<td>大<br>学<br>阶<br>段<br></td><td>";
		echo "				<table>";
		echo "					<tr><td>第<br>一<br>学<br>年</td><td><table>";
		echo "						<tr><td>目标实现情况：<br><textarea name='xxqk1' cols='100' rows='5'></textarea></td></tr>";
		echo "						<tr><td>调整情况：<br><textarea name='tzqk1' cols='100' rows='5'></textarea></td></tr>";
		echo "						<tr><td>班主任指导意见：<br><textarea name='zdyj1' cols='100' rows='5'></textarea></td></tr>";
		echo "					</table></td</tr>";
		echo "					<tr><td>第<br>二<br>学<br>年</td><td><table>";
		echo "						<tr><td>目标实现情况：<br><textarea name='xxqk2' cols='100' rows='5'></textarea></td></tr>";
		echo "						<tr><td>调整情况：<br><textarea name='tzqk2' cols='100' rows='5'></textarea></td></tr>";
		echo "						<tr><td>班主任指导意见：<br><textarea name='zdyj2' cols='100' rows='5'></textarea></td></tr>";
		echo "					</table></td</tr>";
		echo "					<tr><td>第<br>三<br>学<br>年</td><td><table>";
		echo "						<tr><td>目标实现情况：<br><textarea name='xxqk3' cols='100' rows='5'></textarea></td></tr>";
		echo "						<tr><td>调整情况：<br><textarea name='tzqk3' cols='100' rows='5'></textarea></td></tr>";
		echo "						<tr><td>班主任指导意见：<br><textarea name='zdyj3' cols='100' rows='5'></textarea></td></tr>";
		echo "					</table></td</tr>";
		echo "					<tr><td>第<br>四<br>学<br>年</td><td><table>";
		echo "						<tr><td>目标实现情况：<br><textarea name='xxqk4' cols='100' rows='5'></textarea></td></tr>";
		echo "						<tr><td>调整情况：<br><textarea name='tzqk4' cols='100' rows='5'></textarea></td></tr>";
		echo "						<tr><td>班主任指导意见：<br><textarea name='zdyj4' cols='100' rows='5'></textarea></td></tr>";
		echo "					</table></td</tr>";	
		echo "				</table></td></tr>";
		echo "</table>";
		
		echo "<tr><td><input type='submit' value='提  交' class='button'></input></td></tr>";	
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
	}

?>

</form>
<hr>
<?php 
	include 'footer.php';
?>
