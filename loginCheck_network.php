<script>
	if (window.top!=window.self){
		window.top.location="loginCheck_network.php";
	}
</script>

<?php 
	include("conn.php");

	session_start();	
	$zgh=$_SESSION['zgh'];		
	$juese=$_SESSION['juese'];
	
	//��ȡ��ǰѧ�ꡢѧ��
	$SQL="select sygh_dqxnxq,njfw from systeminfo where bmmc='xueshengchu'";
	$query=mysqli_query($conn,$SQL);
	$row=mysqli_fetch_array($query,MYSQLI_ASSOC) or die('Error querying database,loginCheck.php.');	
	$dqxnxq=$row['sygh_dqxnxq'];
	$dqxn=substr($dqxnxq,0,9);
	$dqxq=substr($dqxnxq,strlen($dqxnxq)-1,1);
	$njfw=$row['njfw'];	//�μӡ����Ĺ滮�����꼶��Χ��
	
	
	//--��ȡ��ǰ�û�������Ϣ
	if($juese=='xs'){
		$SQL="select xh,xm,nj from xsjbxxb where xh='$zgh'";
		//echo $SQL;		
		$query=mysqli_query($conn,$SQL);
		$row=mysqli_fetch_array($query,MYSQLI_ASSOC) or die('û�д��û���');
		$xm=$row['xm'];		
		$nianji=$row['nj'];
		$qx='0';
	}else if($juese=='js'){
		$SQL="select zgh,xm,qx,bm,bmdm from jsxxb where zgh='$zgh'";
		//echo $SQL;
		$query=mysqli_query($conn,$SQL);
		$row=mysqli_fetch_array($query,MYSQLI_ASSOC) or die('û�д��û���');
		$xm=$row['xm'];	
		$qx=$row['qx'];
		$xy=$row['bm'];		
		$bmdm=$row['bmdm'];
	}
	
	//����session
	$_SESSION['xm']=$xm;
	$_SESSION['dqxn']=$dqxn;
	$_SESSION['dqxq']=$dqxq;
	$_SESSION['njfw']=$njfw;
	$_SESSION['qx']=$qx;
	$_SESSION['count']=1;	//��ǰѧ������
	
	if($juese=='xs'){
		$_SESSION['nj']=$nianji;
		echo "<script> window.location.href='xsjbxx_xs.php'</script>"; 	//
	}else if($juese=='js'){		
			$_SESSION['xy']=$xy;	
			$_SESSION['bmdm']=$bmdm;
			
			if($qx%2==0){
				echo "<script> window.location.href='qxfp.php'</script>"; 	//ת������Ա�û����棨Ȩ�޷��䣩��
			}else if($qx%3==0){
				echo "<script> window.location.href='qxfp_bzr.php'</script>"; 	//ת���������ν��棨ָ��������/��ѧ������ʾ����
			}else if($qx%7==0){
				echo "<script> window.location.href='show_xs.php'</script>"; 	//ת��ѧ��Ժ�����棨�鿴����������
			}else if($qx%11==0){	//������
				echo "<script> window.location.href='xsjbxx_js.php'</script>"; 
			}else{
				echo "<br>�޷���Ȩ��";				
			}
	}		
	
	//��ת������ҳ�棨�´��ѧ����
	//�ض�������� 
	//header("Location: http://bbs.lampbrother.net"); 
	//header("Location: jxrwb.php");
	//ȷ���ض���󣬺������벻�ᱻִ�� 
	//exit;	//ȷ���Ժ���벻�ٱ�ִ�У��޴���䣬������ִ�к�����䣻
?>  



