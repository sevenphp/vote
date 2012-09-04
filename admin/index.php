<?php
	/**
	 *@Author:       anshao
	 *@Date:         Sep 3, 2012
	 *@Encoding:     UTF-8
	 *@Link:         http://anshao.net
	 *@CopyRight:    Anshao
	 */
	 require '../includes/comm.inc.php';
	 
	isAccess();
	 
	 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="styles/style.css" />
<link rel="stylesheet" type="text/css" href="styles/index.css" />
<script type="text/javascript" src="js/index.js"></script>
<title>后台管理--首页</title>
</head>
<body>
	<div id="container">
		<div id="logo">
			Logo
		</div>
		<?php 
			include 'includes/adminnav.inc.php';
		?>
		<div id="main">
			<?php 
				include 'includes/maintop.inc.php';
			?>
			<div id="main-bottom">
				<p>这是一个投票管理系统后台</p>
				<p>可以在这里</p>
				<ul>
					<li>添加投票主题</li>
					<li>添加投票选项</li>
					<li>删除投票主题</li>
					<li>管理留言记录</li>
					<li>添加系统公告</li>		
				</ul>

			</div>
		</div>
		<?php 
			include 'includes/footer.inc.php';
		?>
	</div>
</body>
</html>