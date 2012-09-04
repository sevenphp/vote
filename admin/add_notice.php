<?php
	/**
	 *@Author:       anshao
	 *@Date:         Sep 4, 2012
	 *@Encoding:     UTF-8
	 *@Link:         http://anshao.net
	 *@CopyRight:    Anshao
	 */
	 require '../includes/comm.inc.php';
	 
	 isAccess();
	 
	 //添加系统公告
	 if(!empty($_POST['notice'])){
	 	$noticeInfo = array();
	 	$noticeInfo['title'] = mysql_real_escape_string(chkNtitle($_POST['ntitle'],2,50));
	 	$noticeInfo['content'] = mysql_real_escape_string(chkNcontent($_POST['ncontent'],10,255));
	 	
	 	mysqlQuery("INSERT INTO `vt_notice`(
											 	`vt_title`,
											 	`vt_content`,
											 	`vt_admin`,
											 	`vt_time`
											) 
									VALUES(
											 	'{$noticeInfo['title']}',
											 	'{$noticeInfo['content']}',
											 	'{$_SESSION['user']}',
											 	NOW()
											)
					");
	 	
	 	if(mysql_affected_rows() == 1){
	 		mysql_close($conn);
	 		alertLocation('添加系统公告成功!', 'notice_manager.php');
	 	}elseif(mysql_affected_rows() == 0){
	 		mysql_close($conn);
	 		alertBack('添加系统公告失败!');
	 	}
	 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="styles/style.css" />
<link rel="stylesheet" type="text/css" href="styles/index.css" />
<link rel="stylesheet" type="text/css" href="styles/add-notice.css" />
<script type="text/javascript" src="js/index.js"></script>
<title>后台管理--公告管理</title>
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
			<div id="add-notice">
				<form action="" method="post" name="noticeform">
					<dl>
						<dt>添加系统公告</dt>
						<dd><label>公告标题:<input type="text" name="ntitle" class="title"/></label></dd>
						<dd><label>公告内容:<textarea name="ncontent"></textarea></label></dd>
						<dd><input type="submit" name="notice" value="添加公告" /></dd>
						<dd><a href="javascript:;" onclick="history.go(-1);">返回</a></dd>
					</dl>
				</form>
			</div>
		</div>
		<?php 
			include 'includes/footer.inc.php';
		?>
	</div>
</body>
</html>