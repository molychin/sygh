<?php 
	include("conn.php");
?>

<?php
	$zgh=$_POST['zgh'];
	$mima=$_POST['mima'];
	$juese=$_POST['juese'];
	
	//��ȡ��ǰѧ�ꡢѧ��
	$SQL="select sygh_dqxnxq from systeminfo where bmmc='xueshengchu'";
	$query=mysqli_query($conn,$SQL);
	$row=mysqli_fetch_array($query,MYSQLI_ASSOC) or die('Error querying database.');	
	$dqxnxq=$row['sygh_dqxnxq'];
	$dqxn=substr($dqxnxq,0,9);
	$dqxq=substr($dqxnxq,strlen($dqxnxq)-1,1);
	
	
	//--��ȡ��ǰ�û�������Ϣ
	if($juese=='xs'){
		$SQL="select xh,xm,mima from xsjbxxb where xh='$zgh'";
		$query=mysqli_query($conn,$SQL);
		$row=mysqli_fetch_array($query,MYSQLI_ASSOC) or die('û�д��û���');
		$kuMima=$row['mima'];
		$xm=$row['xm'];		
	}else if($juese=='js'){
		$SQL="select zgh,xm,mima,sygh_qx from jsxxb where zgh='$zgh'";
		echo $SQL;
		$query=mysqli_query($conn,$SQL);
		$row=mysqli_fetch_array($query,MYSQLI_ASSOC) or die('û�д��û���');
		$kuMima=$row['mima'];
		$xm=$row['xm'];				
	}
	
	//����session
	session_start();
	$_SESSION['zgh']=$zgh;
	$_SESSION['juese']=$juese;
	$_SESSION['xm']=$xm;
	$_SESSION['dqxn']=$dqxn;
	$_SESSION['dqxq']=$dqxq;	

	if($mima==$kuMima){
		if($juese=='xs'){
			echo "<script> window.location.href='xsjbxx_xs.php'</script>"; 	//
		}else if($juese=='js'){
			echo "<script> window.location.href='selectXs_js.php'</script>"; 	//
		}else{
			echo "error";
		}
	}else {
		echo "<script> alert('�û��������벻��ȷ��'); </script>";
		echo "<script> window.location.href='login.php' </script>";  		
	}
?>  
