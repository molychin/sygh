<?php
	$conn = @ mysql_connect("localhost", "root", "caca070706") or die("���ݿ����Ӵ���");
	mysql_select_db("jwfzxt", $conn);	//��������ѡ�����ݿ�
	mysql_query("set names 'gbk'"); //ʹ��GBK���ı���;
?>
