<?php 
	include 'conn.php';	
	session_start();
	$zgh=$_SESSION['zgh'];		
	
	//echo "ok";
	//���¼�ͥסַ����Ϣ��
	$lxdh=$_POST['lianxidianhua'];
	$jtzz=$_POST['jiatingzhuzhi'];
	$jtdh=$_POST['jiatingdianhua'];
	$yzbm=$_POST['youzhengbianma'];	
	echo "$zgh / $lxdh / $jtzz / $jtdh / $yzbm";

	$SQL="update xsjbxxb set lxdh='$lxdh',jtzz='$jtzz',jtdh='$jtdh',yzbm='$yzbm' where xh='$zgh'";
	echo "SQL=$SQL"."<br>";
	$query=mysql_query($SQL);

	//������������	
	$xingge=$_POST['xingge'];
	$xingqu=$_POST['xingqu'];
	$techang=$_POST['techang'];
	$nengli=$_POST['nengli'];	
	echo "<hr>$xingge / $xingqu  / $techang / $nengli<hr>";
	
	//$SQL="update sygh_zysyghs set zwms_xg='$xingge',zwms_xq='$xingqu',zwms_tc='$techang',zwms_nl='$nengli' where xh='$zgh'";
	//echo "SQL =$SQL"."<br>";
	//$query=mysql_query($SQL);
	
	//����SWOT����
	$youshi=$_POST['youshi'];
	$lieshi=$_POST['lieshi'];
	$jiyu=$_POST['jiyu'];
	$weixie=$_POST['weixie'];
	echo "<hr>$youshi / $lieshi / $jiyu / $weixie";
	
	
	//������ν�����ƻ���
	$jjls=$_POST['jjls'];
	echo "<hr>$jjls";
	
	$SQL="update sygh_zysyghs set zwms_xg='$xingge',zwms_xq='$xingqu',zwms_tc='$techang',zwms_nl='$nengli',
		swot_s='$youshi',swot_w='$lieshi',swot_o='$jiyu',swot_t='$weixie',
		jjlsbz='$jjls'
		where xh='$zgh'";
	echo "SQL =$SQL"."<br>";
	$query=mysql_query($SQL);	
	
	
	
	
	
?>