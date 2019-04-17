<?php
	$conn = @ mysqli_connect("localhost", "root", "cacalanii070706") or die("数据库链接错误");
	mysqli_select_db($conn,"jwfzxt");	//必须首先选择数据库
	mysqli_query($conn,"set names 'gbk'"); //使用GBK中文编码;
?>
