	$(document).ready(function(){
		//�Զ�ִ��
		//�������б����
		//����ʹ��jquery�﷨��
		$("#tab_zwms").toggle(3);
		$("#tab_swot").toggle(3);
		$("#tab_jjls").toggle(3);	
		$("#tab_cszy").toggle(3);	
		$("#tab_sygh").toggle(3);	
		$("#tab_sszj").toggle(3);		
		$("#tab_pgtz").toggle(3);		
		
		//�Զ����¼�
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