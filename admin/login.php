<?php
	/**
	 *@Author:       anshao
	 *@Date:         Sep 3, 2012
	 *@Encoding:     UTF-8
	 *@Link:         http://anshao.net
	 *@CopyRight:    Anshao
	 */
	 
	require '../includes/comm.inc.php';
	
	//登录
	if(!empty($_POST['login'])){
		$loginInfo = array();
		$loginInfo['user'] = checkUser($_POST['user'],2,20);
		$loginInfo['pass'] = checkPass($_POST['pass'], 2, 32);
		
		$rs = mysqlFetchArray("SELECT `vt_id` FROM
													`vt_admin` 
										  WHERE 
													`vt_admin_user`='{$loginInfo['user']}' 
											AND 
													`vt_admin_pass`='{$loginInfo['pass']}' 
										  LIMIT 	1
							");
		
		if(mysql_affected_rows() == 1){
			$_SESSION['user'] = $loginInfo['user'];
			//setcookie('adminid',$rs['vt_id']);
			mysql_close($conn);
			alertLocation('登录成功!', 'index.php');
		}elseif(mysql_affected_rows() == 0){
			mysql_close($conn);
			alertBack('登录失败!');
		}
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="styles/login.css" />
<title>Insert title here</title>
</head>
<body>
	<div id="login">
		<form action="" method="post">
			<dl>
				<dt>管理员登录</dt>
				<dd><label>用户名:<input type="text" name="user" /></label></dd>
				<dd><label>密&#12288;码:<input type="password" name="pass" /></label></dd>
				<dd class="subbtm"><input type="submit" name="login" value="登录" />&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="重置" /></dd>
			</dl>
		</form>
	</div>
</body>
</html>