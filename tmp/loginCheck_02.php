<?php 
	include("conn.php");
?>

<?php
	$zgh=$_POST['zgh'];
	$mima=$_POST['mima'];
//echo $zgh;
	
	//��ȡ��ǰ�û�������Ϣ�����롢���š�Ȩ�ޡ������ȣ�
	$SQL="select mima,bm,qx,xm from jsxxb where zgh='$zgh'";
//echo $SQL;	
	$query=mysqli_query($conn,$SQL);
	$row=mysqli_fetch_array($query,MYSQLI_ASSOC) or die('û�д��û���');
	$kuMima=$row['mima'];
	$kkxy=$row['bm'];
	$qx=$row['qx'];
	$xm=$row['xm'];
	
	//��ȡ��ǰѧ�ꡢѧ��
	$SQL="select dqxnxq from systeminfo where bmmc='xueshengchu'";
	$query=mysqli_query($conn,$SQL);
	$row=mysqli_fetch_array($query,MYSQLI_ASSOC) or die('Error querying database.');	
	$dqxnxq=$row['dqxnxq'];
	$dqxn=substr($dqxnxq,0,9);
	$dqxq=substr($dqxnxq,strlen($dqxnxq)-1,1);
	
	//����session
	session_start();
	$_SESSION['zgh']=$zgh;
	$_SESSION['kkxy']=$kkxy;
	$_SESSION['qx']=$qx;
	$_SESSION['xm']=$xm;
	$_SESSION['dqxn']=$dqxn;
	$_SESSION['dqxq']=$dqxq;	

	if($mima==$kuMima){
		if($qx%2==0){
			echo "<script> window.location.href='qxfp.php'</script>"; 	//ת������Ա�û����棨Ȩ�޷��䣩��
		}else if($qx%3==0){
			echo "<script> window.location.href='jxrwb.php'</script>"; 	//ת�����������û����棨�´��ѧ���񣩣�
		}else if ($qx%5==0){
			echo "<script> window.location.href='show_jsjxrwb.php'</script>"; 	//ת���ον�ʦ���棨��ѧ������ʾ����
		}else if($qx%7==0){
			echo "<script> window.location.href='show_jxrwb.php'</script>"; 	//ת��ѧ��Ժ�����棨��ѧ������ʾ����
		}else{ 
			echo "error";
		}
	}else {
		echo "<script> alert('�û��������벻��ȷ��'); </script>";
		echo "<script> window.location.href='login.php' </script>";  		
		//header("Location: login.php");  //ʹ�ô˷�����������־����
		//exit;
	}

	//��ת������ҳ�棨�´��ѧ����
	//�ض�������� 
	//header("Location: http://bbs.lampbrother.net"); 
	//header("Location: jxrwb.php");
	//ȷ���ض���󣬺������벻�ᱻִ�� 
	//exit;	//ȷ���Ժ���벻�ٱ�ִ�У��޴���䣬������ִ�к�����䣻
?>  
