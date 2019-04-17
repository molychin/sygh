<?php
	session_start();
	session_unset();	//释放所有session内存变量；
	session_destroy();	//删除session文件；
	//echo "<script>window.close();</script>";
	echo "<script> window.location.href='login.php'</script>"; 
?>