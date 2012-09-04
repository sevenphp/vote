	window.onload = function (){
		var form = document.getElementsByTagName('form')[0];
		var theme = document.getElementsByName('theme')[0];
		
		theme.onclick = function(){
			theme.value = '';
			theme.focus();
		};
		
		form.onsubmit = function(){
			if(form.theme.value.length < 5 || form.theme.value.length > 30){
				alert('添加投票主题长度不得小于5位或大于30位!');
				form.theme.value = '';
				form.theme.focus();
				return false;
			}
			return true;
		};
	};