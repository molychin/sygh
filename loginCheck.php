<?php 
	include("conn.php");

	$zgh=$_POST['zgh'];
	$mima=$_POST['mima'];
	$juese=$_POST['juese'];
	
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
		$SQL="select xh,xm,mima,nj from xsjbxxb where xh='$zgh'";
		//echo $SQL;		
		$query=mysqli_query($conn,$SQL);
		$row=mysqli_fetch_array($query,MYSQLI_ASSOC) or die('û�д��û���');
		$kuMima=$row['mima'];
		$xm=$row['xm'];		
		$nianji=$row['nj'];
		$qx='0';
	}else if($juese=='js'){
		$SQL="select zgh,xm,mima,qx,bm,bmdm from jsxxb where zgh='$zgh'";
		$query=mysqli_query($conn,$SQL);
		$row=mysqli_fetch_array($query,MYSQLI_ASSOC) or die('û�д��û���');
		$kuMima=$row['mima'];
		$xm=$row['xm'];	
		$qx=$row['qx'];
		$xy=$row['bm'];		
		$bmdm=$row['bmdm'];
	}

	//echo $zgh."----".$juese."-------".$qx;
	
	//����session
	session_start();
	$_SESSION['zgh']=$zgh;
	$_SESSION['juese']=$juese;
	$_SESSION['xm']=$xm;
	$_SESSION['dqxn']=$dqxn;
	$_SESSION['dqxq']=$dqxq;
	$_SESSION['njfw']=$njfw;
	$_SESSION['qx']=$qx;
	$_SESSION['count']=1;	//��ǰѧ������
	
	if($juese=='xs'){
		$_SESSION['nj']=$nianji;
	}
	
	if($mima==$kuMima){
		if($juese=='xs'){
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
	}else {
		echo "<script> alert('�û��������벻��ȷ��'); </script>";
		echo "<script> window.location.href='login.php' </script>";  		
	}
	
	//��ת������ҳ�棨�´��ѧ����
	//�ض�������� 
	//header("Location: http://bbs.lampbrother.net"); 
	//header("Location: jxrwb.php");
	//ȷ���ض���󣬺������벻�ᱻִ�� 
	//exit;	//ȷ���Ժ���벻�ٱ�ִ�У��޴���䣬������ִ�к�����䣻
?>  