/*
$(document).ready(function(){   //没有起作用
		//自动执行
		//隐藏所有表格项
		$("#tab_zwms").toggle(3);
		$("#tab_swot").toggle(3);
		$("#tab_jjls").toggle(3);	
		$("#tab_cszy").toggle(3);	
		$("#tab_sygh").toggle(3);	
		$("#tab_sszj").toggle(3);		
		$("#tab_pgtz").toggle(3);		
		
		//自定义事件
		$("#but_zwms").click(function(){
			$("#tab_zwms").toggle(300);
		});
		
		$("#but_swot").click(function(){
			$("#tab_swot").toggle(300);
		});		

		$("#but_jjls").click(function(){
			$("#tab_jjls").toggle(300);
		});
		
		$("#but_cszy").click(function(){
			$("#tab_cszy").toggle(300);
		});
		
		$("#but_sygh").click(function(){
			$("#tab_sygh").toggle(300);
		});		

		$("#but_sszj").click(function(){
			$("#tab_sszj").toggle(300);
		});	

		$("#but_pgtz").click(function(){
			$("#tab_pgtz").toggle(300);
		});			
});
*/
function butBanjiClick(bjmc){
	console.log(bjmc);
	var urlStr="server/selectBj.php?bjmc="+bjmc;
		
	var	xmlhttp=new XMLHttpRequest();	
	xmlhttp.open("GET",urlStr,false);	//同步执行，适用于小型不繁忙的服务器运用
	xmlhttp.send();
	document.getElementById("id_div_bjmc").innerHTML=xmlhttp.responseText;
}

function xhxmClick(xh,count){
	var urlStr="server/server_show_xs.php?xh="+xh+"&count="+count;
		
	var	xmlhttp=new XMLHttpRequest();	
	xmlhttp.open("GET",urlStr,false);	//同步执行，适用于小型不繁忙的服务器运用
	xmlhttp.send();
	document.getElementById("id_sygh").innerHTML=xmlhttp.responseText;
}


