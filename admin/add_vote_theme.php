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
	 
	 if(!empty($_POST['addtheme'])){
	 	$voteTheme = array();
	 	$voteTheme['title'] = mysql_real_escape_string($_POST['theme']);
	 	$voteTheme['admin'] = $_SESSION['user'];
	 	
	 	mysqlQuery("INSERT INTO `vt_theme`(
											 	`vt_title`,
											 	`vt_admin`,
											 	`vt_time`
	 									  ) 
	 								VALUES(
											 	'{$voteTheme['title']}',
											 	'{$voteTheme['admin']}',
											 	NOW())
									 	");
	 	
	 	if(mysql_affected_rows() == 1){
	 		mysql_close($conn);
	 		alertLocation('添加主题成功!', 'vote_manager.php');
	 	}elseif(mysql_affected_rows() == 0){
	 		mysql_close($conn);
	 		alertBack('添加主题失败!');
	 	}
	 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="styles/style.css" />
	<link rel="stylesheet" type="text/css" href="styles/index.css" />
	<link rel="stylesheet" type="text/css" href="styles/add_vote_theme.css" />
	<script type="text/javascript" src="js/add_vote_theme.js"></script>
	<title>添加投票主题</title>
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
			<div id="add-theme">
				<form action="" method="post">
					<label>投票主题:<input type="text" name="theme" value="请输入投票主题" class="add"/></label>
					<input type="submit" name="addtheme" value="添加主题" />&nbsp;&nbsp;<a href="javascript:;" onclick="history.back();">返回</a>
				</form>
			</div>
		</div>
		<?php 
			include 'includes/footer.inc.php';
		?>
	</div>
</body>
</html>