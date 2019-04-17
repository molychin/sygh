<?php 
	include 'conn.php';	
	
	session_start();
	$zgh=$_SESSION['zgh'];		
	
	//更新家庭住址等信息；
	$lxdh=$_POST['lianxidianhua'];
	$jtzz=$_POST['jiatingzhuzhi'];
	$jtdh=$_POST['jiatingdianhua'];
	$yzbm=$_POST['youzhengbianma'];	
	//echo "$zgh / $lxdh / $jtzz / $jtdh / $yzbm";
	$SQL="update xsjbxxb set lxdh='$lxdh',jtzz='$jtzz',jtdh='$jtdh',yzbm='$yzbm' where xh='$zgh'";
	$query=mysqli_query($conn,$SQL);	

	//更新自我描述	
	$xingge=$_POST['xingge'];
	$xingqu=$_POST['xingqu'];
	$techang=$_POST['techang'];
	$nengli=$_POST['nengli'];	
	//echo "<hr>$xingge / $xingqu  / $techang / $nengli<hr>";	
	
	//更新SWOT分析
	$youshi=$_POST['youshi'];
	$lieshi=$_POST['lieshi'];
	$jiyu=$_POST['jiyu'];
	$weixie=$_POST['weixie'];
	//echo "<hr>$youshi / $lieshi / $jiyu / $weixie";	
	
	//更新如何解决劣势或不足
	$jjls=$_POST['jjls'];
	
	//更新想从事的职业及该职业对人才素质的要求
	$zhiye1=$_POST['zhiye1'];	
	$fzlx1=$_POST['fzlx1'];		
	$jnsp1=$_POST['jnsp1'];	
	$zhiye2=$_POST['zhiye2'];	
	$fzlx2=$_POST['fzlx2'];		
	$jnsp2=$_POST['jnsp2'];	
	$zhiye3=$_POST['zhiye3'];	
	$fzlx3=$_POST['fzlx3'];		
	$jnsp3=$_POST['jnsp3'];	
	
	//职业生涯发展规划
	$mbcs_n1=$_POST['mbcs_n1'];
	$mbcs_n2=$_POST['mbcs_n2'];
	$mbcs_n3=$_POST['mbcs_n3'];
	$mbcs_n4=$_POST['mbcs_n4'];
	$mbcs_n5=$_POST['mbcs_n5'];
	$mbcs_n10=$_POST['mbcs_n10'];
	
	//学年实施情况总结
	$sszj_zp1=$_POST['sszj_zp1'];
	$sszj_zp2=$_POST['sszj_zp2'];
	$sszj_zp3=$_POST['sszj_zp3'];
	$sszj_zp4=$_POST['sszj_zp4'];
	
	//评估调整
	$pgtz_sxqk1=$_POST['pgtz_sxqk1'];
	$pgtz_tzqk1=$_POST['pgtz_tzqk1'];
	$pgtz_zdyj1=$_POST['pgtz_zdyj1'];
	$pgtz_sxqk2=$_POST['pgtz_sxqk2'];
	$pgtz_tzqk2=$_POST['pgtz_tzqk2'];
	$pgtz_zdyj2=$_POST['pgtz_zdyj2'];
	$pgtz_sxqk3=$_POST['pgtz_sxqk3'];
	$pgtz_tzqk3=$_POST['pgtz_tzqk3'];
	$pgtz_zdyj3=$_POST['pgtz_zdyj3'];
	$pgtz_sxqk4=$_POST['pgtz_sxqk4'];
	$pgtz_tzqk4=$_POST['pgtz_tzqk4'];
	$pgtz_zdyj4=$_POST['pgtz_zdyj4'];		
		
	$SQL="update sygh_zysyghs  set zwms_xg='$xingge',zwms_xq='$xingqu',zwms_tc='$techang',zwms_nl='$nengli',
			swot_s='$youshi',swot_w='$lieshi',swot_o='$jiyu',swot_t='$weixie',jjlsbz='$jjls',
			zyyq_zy1='$zhiye1',zyyq_fz1='$fzlx1',zyyq_yq1='$jnsp1', zyyq_zy2='$zhiye2',zyyq_fz2='$fzlx2',zyyq_yq2='$jnsp2', 
			zyyq_zy3='$zhiye3',zyyq_fz3='$fzlx3',zyyq_yq3='$jnsp3', 
			mbcs_n1='$mbcs_n1',mbcs_n2='$mbcs_n2',mbcs_n3='$mbcs_n3',mbcs_n4='$mbcs_n4',mbcs_n5='$mbcs_n5',mbcs_n10='$mbcs_n10',
			sszj_zp1='$sszj_zp1',sszj_zp2='$sszj_zp2',sszj_zp3='$sszj_zp3',sszj_zp4='$sszj_zp4',
			pgtz_sxqk1='$pgtz_sxqk1',pgtz_tzqk1='$pgtz_tzqk1',pgtz_zdyj1='$pgtz_zdyj1',
			pgtz_sxqk2='$pgtz_sxqk2',pgtz_tzqk2='$pgtz_tzqk2',pgtz_zdyj2='$pgtz_zdyj2',
			pgtz_sxqk3='$pgtz_sxqk3',pgtz_tzqk3='$pgtz_tzqk3',pgtz_zdyj3='$pgtz_zdyj3',
			pgtz_sxqk4='$pgtz_sxqk4',pgtz_tzqk4='$pgtz_tzqk4',pgtz_zdyj4='$pgtz_zdyj4',
			txsj=curdate()
		where xh='$zgh'";		
		
	$query=mysqli_query($conn,$SQL);		
?>

<script type="text/javascript">
	alert('修改数据保存成功');
	window.location.href="xsjbxx_xs.php";		
</script>