<?php
	/**
	 *@Author:       anshao
	 *@Date:         Sep 4, 2012
	 *@Encoding:     UTF-8
	 *@Link:         http://anshao.net
	 *@CopyRight:    Anshao
	 */
	 require 'includes/comm.inc.php';
	 
	 //添加留言
	 if(!empty($_POST['guest'])){
	 	$guestInfo = array();
	 	$guestInfo['title'] = mysql_real_escape_string(chkNtitle($_POST['title'],2,50));
	 	$guestInfo['content'] = mysql_real_escape_string(chkNcontent($_POST['content'],10,255));
	 	
	 	mysqlQuery("INSERT INTO `vt_guest`(`vt_title`,`vt_content`,`vt_ip`,`vt_time`) VALUES('{$guestInfo['title']}','{$guestInfo['content']}','{$_SERVER['REMOTE_ADDR']}',NOW())");
	 	
	 	if(mysql_affected_rows() == 1){
	 		mysql_close($conn);
	 		alertLocation('留言成功!谢谢!', 'index.php');
	 	}else{
	 		mysql_close($conn);
	 		alertBack('留言失败!');
	 	}
	 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="styles/style.css" />
<link rel="stylesheet" type="text/css" href="styles/index.css" />
<link rel="stylesheet" type="text/css" href="styles/guestbook.css" />

<title>投票系统--留言建议</title>
</head>
<body>
	<div id="container">
		<div id="logo">
			Logo
		</div>
		<?php 
			include 'includes/nav.inc.php';
		?>
		<div id="main">
			<div id="main-top">
				<p>欢迎游客(Ip:<span class="blue"><?php echo $_SERVER['REMOTE_ADDR']; ?></span>),现在时间是:<span class="blue"><?php echo date('Y-m-d',time())?></span></p>
			</div>
			<div id="addguest">
				<form action="" method="post" name="guestform">
					<dl>
						<dt>添加留言建议</dt>
						<dd><label>留言标题:<input type="text" name="title" class="title"/></label></dd>
						<dd><label>留言内容:<textarea name="content"></textarea></label></dd>
						<dd><input type="submit" name="guest" value="添加留言" /></dd>
						<dd><a href="javascript:;" onclick="history.go(-1);">返回</a></dd>
					</dl>
				</form>
			</div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
		<?php 
			include 'includes/footer.inc.php';
		?>
	</div>
</body>
</html>