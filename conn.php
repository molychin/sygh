<?php
	$conn = @ mysql_connect("localhost", "root", "caca070706") or die("数据库链接错误");
	mysql_select_db("jwfzxt", $conn);	//必须首先选择数据库
	mysql_query("set names 'gbk'"); //使用GBK中文编码;
?>
