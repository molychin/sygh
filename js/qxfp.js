//start

function selectJsxyClicked(){
	var seleJsxy=document.getElementById('id_selectJsxy');
	var jsxydm=seleJsxy.options[seleJsxy.selectedIndex].value;
	var urlStr="server/qxfp_selectJs.php?jsxydm="+jsxydm;
		
	var	xmlhttp=new XMLHttpRequest();	
	xmlhttp.open("GET",urlStr,false);	//ͬ��ִ�У�������С�Ͳ���æ�ķ���������
	xmlhttp.send();
	document.getElementById("div_qxfp_selectJs").innerHTML=xmlhttp.responseText;
}






