<?php
	$conn = @ mysqli_connect("localhost", "root", "cacalanii070706") or die("���ݿ����Ӵ���");
	mysqli_select_db($conn,"jwfzxt");	//��������ѡ�����ݿ�
	mysqli_query($conn,"set names 'gbk'"); //ʹ��GBK���ı���;
?>
