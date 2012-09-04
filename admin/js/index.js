	window.onload = function (){
		var logout = document.getElementById('logout');
		var deltheme = document.getElementsByName('deltheme');	//删除投票主题
		var delnotice = document.getElementsByName('delnotice');	//删除系统公告
		var noticeform = document.getElementsByName('noticeform')[0];	//添加系统公告表单
		var delguest = document.getElementsByName('delguest');	//删除留言
		//alert(noticeform);
		logout.onclick = function (){
			if(confirm('确定要退出吗?')){
				return true;
			}else{
				return false;
			}
		};
		
		//删除投票主题
		if(deltheme != undefined){
			for(var i=0;i<deltheme.length;i++){
				deltheme[i].onclick = function(){
					if(confirm("确定要删除投票主题?")){
						return true;
					}else{
						return false;
					}
				};				
			}
		}
		
		//删除系统公告
		if(delnotice != undefined){
			for(var i=0;i<delnotice.length;i++){
				delnotice[i].onclick = function(){
					if(confirm('确定要删除系统公告吗?')){
						return true;
					}else{
						return false;
					}
				};
			}
		}
		
		if(delguest != undefined){
			for(var i=0;i<delguest.length;i++){
				delguest[i].onclick = function (){
					if(confirm('确定要删除留言建议吗?')){
						return true;
					}else{
						return false;
					}
				};
			}
		}
		
		//添加系统公告表单验证
		if(noticeform != undefined){
			noticeform.onsubmit = function(){
				//alert(noticeform);
				if(noticeform.ntitle.value.length < 2 || noticeform.ntitle.value.length > 50){
					alert('公告标题长度不得小于2位或大于50位!');
					noticeform.ntitle.value = '';
					noticeform.ntitle.focus = '';
					return false;
				}
				
				if(/[<>\'\"\ \  ]/.test(noticeform.ntitle.value)){
					alert('标题不得包含非法字符!');
					noticeform.ntitle.value = '';
					noticeform.ntitle.focus = '';
					return false;
				}
				
				if(noticeform.ncontent.value.length < 10 || noticeform.ncontent.value.length > 255){
					alert('公告内容长度不得小于10位或大于255位!');
					noticeform.ncontent.value = '';
					noticeform.ncontent.focus = '';
					return false;					
				}
				
				return true;
			};
		}
	};