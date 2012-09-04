	window.onload = function (){
		var fm = document.getElementsByTagName('form')[0];
		var list = document.getElementsByName('list')[0];

		
		list.onclick = function(){
			list.value = '';
			list.focus();
		};
		
/*		list.onblur = function(){
			list.value = '请输入投票选项';
		};*/
		

	};