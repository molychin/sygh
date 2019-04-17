function saveBzr(bjmcStr){
	//console.log(bjmcStr);
	var bjmc;
	var bjmc_array=bjmcStr.split(",");
	var post_str="";
	//console.log(bjmc_array);
	for (var i=1;i<bjmc_array.length;i++){
		bjmc=bjmc_array[i];
		bjmc_array[i]="id_sel_bzr"+bjmc_array[i];
		//console.log(bjmc_array[i]);
		var seleJsxy=document.getElementById(bjmc_array[i]);
		var jszgh=seleJsxy.options[seleJsxy.selectedIndex].value;
		if(jszgh!='000000000'){
			//console.log(bjmc,jszgh);	
			post_str=post_str+";"+bjmc+","+jszgh;
		}
	}	
	
	//console.log(post_str);
	//同步执行，适用于小型不繁忙的服务器运用
	var urlStr="server/save_qxfpbzr.php?post_str="+post_str;
	//console.log(urlStr)	;
	var	xmlhttp=new XMLHttpRequest();	
	xmlhttp.open("GET",urlStr,false);	
	xmlhttp.send();
	document.getElementById("div_test").innerHTML=xmlhttp.responseText;
	alert('保存成功');
}

function seleted_bm(bjmc){
	var divName="div_js"+bjmc;
	//console.log(divName);
	var selJsbm="id_sel_bm"+bjmc;
	//console.log(selJsbm);		
	var seleJsxy=document.getElementById(selJsbm);
	var jsxydm=seleJsxy.options[seleJsxy.selectedIndex].value;
	//console.log(jsxydm);
	var urlStr="server/qxfp_selectBzr.php?jsxydm="+jsxydm+"&bjmc="+bjmc;	

	var	xmlhttp=new XMLHttpRequest();	
	xmlhttp.open("GET",urlStr,false);	
	xmlhttp.send();
	document.getElementById(divName).innerHTML=xmlhttp.responseText;
	//alert('保存成功');
}