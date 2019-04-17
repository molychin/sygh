
<?php 
	$zgh=$_GET['zgh'];
	$juese=$_GET['js'];
	
	session_start();
	$_SESSION['zgh']=$zgh;
	$_SESSION['juese']=$juese;
	
	//echo $zgh."   ".$juese;
	echo "<script> window.location.href='loginCheck_network.php'</script>"; 
?>	