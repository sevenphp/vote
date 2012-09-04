<?php
	/**
	 *@Author:       anshao
	 *@Date:         Sep 4, 2012
	 *@Encoding:     UTF-8
	 *@Link:         http://anshao.net
	 *@CopyRight:    Anshao
	 */
	 require 'includes/comm.inc.php';
	 
	 //获取对应投票主题id的投票选项
	 if(isset($_GET['id']) && !empty($_GET['id'])){
	 	
	 	//判断是否存在该id对应的投票主题
	 	$rs = mysqlFetchArray("SELECT `vt_title` FROM `vt_theme` WHERE `vt_id`='{$_GET['id']}'");
	 	if(mysql_affected_rows() == 0){
	 		alertLocation('不存在该投票主题!', 'index.php');
	 	}
	 	
	 	//如果存在该id对应的投票主题,获取投票选项
	 	$queryList = mysqlQuery("SELECT
	 										`vt_id`, 
								 			`vt_vid`,
								 			`vt_list`,
								 			`vt_count` 
								 	FROM 
								 			`vt_list` 
								 WHERE 
								 			`vt_vid`='{$_GET['id']}'
								 ORDER BY
								 			`vt_id`
								 	DESC
	 							");
	 	
	 	
	 }
	 
	 //进行投票
	 if(!empty($_POST['vote'])){
	 	
	 	if(empty($_POST['list'])){
	 		alertBack('你没有选择投票选项,请选择!');	
	 	}
	 	
	 	$ipInfo = array();
	 	$ipInfo['title'] = mysql_real_escape_string($_POST['title']);
	 	$ipInfo['listid'] = mysql_real_escape_string($_POST['list']);
	 	$ipInfo['ip'] = mysql_real_escape_string($_SERVER['REMOTE_ADDR']);
	 	$ipInfo['themeid'] = $_POST['themeid'];
	 	mysqlQuery("INSERT INTO `vt_ip`(
										 	`vt_title`,
										 	`vt_listid`,
										 	`vt_ip`,
										 	`vt_time`
									   ) 
								 VALUES(
										 	'{$ipInfo['title']}',
										 	'{$ipInfo['listid']}',
										 	'{$ipInfo['ip']}',
										 	NOW()
									   )
				");
	 	
	 	if(mysql_affected_rows() == 1){
	 		mysqlQuery("UPDATE `vt_list` SET `vt_count`=`vt_count`+1 WHERE `vt_id`='{$ipInfo['listid']}'");
	 		mysql_close($conn);
	 		alertLocation('投票成功!', 'vote_detail.php?id='.$ipInfo['themeid']);
	 	}elseif(mysql_affected_rows() == 0){
	 		mysql_close($conn);
	 		alertBack('投票失败!');
	 	}
	 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="styles/style.css" />
<link rel="stylesheet" type="text/css" href="styles/index.css" />
<link rel="stylesheet" type="text/css" href="styles/vote_detail.css" />
<title>投票系统--投票</title>
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
			<div id="vote-detail">
				<h4><?php echo $rs['vt_title'];?></h4>
				<form action="" method="post">
					<input type="hidden" name="title" value="<?php echo $rs['vt_title'];?>" />
					<input type="hidden" name="themeid" value="<?php echo $_GET['id'];?>" />
					<table cellspacing="0" cellpadding="0" border="0">
						<tbody>
							<tr>
								<th>投票选项</th>
								<th class="count">投票结果</th>
							</tr>
							<?php 
								while(!!$rsList = fetchArray($queryList)){
							?>
							<tr>
								<td class="list"><input type="radio" name="list" value="<?php echo $rsList['vt_id']?>" /><?php echo $rsList['vt_list']?></td>
								<td class="count"><?php echo $rsList['vt_count']; ?>票</td>
							</tr>
							<?php 
								}
							?>
							<tr>
								<td class="subbtm" colspan="2"><input type="submit" name="vote" value="投票" /></td>
							</tr>
						</tbody>
					</table>
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