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
	 
	 //获取所有的投票主题
	 $query = mysqlQuery("SELECT `vt_id`,`vt_title` FROM `vt_theme`");
	 
	 //添加选项
	 if(!empty($_POST['addlist'])){
	 	
	 	//当没有选择主题时
	 	if(empty($_POST['theme'])){
	 		alertBack('请选择投票主题!');
	 	}
	 	
	 	$voteList = array();
	 	
	 	$voteList['vid'] = $_POST['theme'];
	 	$voteList['list'] = $_POST['list'];
	 	
	 	//根据id获取投票主题
	 	$rs = mysqlFetchArray("SELECT `vt_title` FROM `vt_theme` WHERE `vt_id`='{$voteList['vid']}'");
	 	$voteList['title'] = $rs['vt_title'];
	 	
	 	//print_r($voteList);
	 	//exit();
	 	
	 	//查询是否已经有该选项
	 	mysqlQuery("SELECT `vt_id` FROM `vt_list` WHERE `vt_list`='{$voteList['list']}' AND `vt_title`='{$voteList['title']}'");
	 	
	 	if(mysql_affected_rows() == 1){
	 		alertLocation('该投票主题中已经有该选项!请重新添加选项!','add_vote_list.php');
	 	}
	 	
	 	//将投票选项插入数据库
	 	mysqlQuery("INSERT INTO `vt_list`(
											 	`vt_vid`,
											 	`vt_title`,
											 	`vt_list`
										 ) 
								   VALUES(
								   				'{$voteList['vid']}',
											 	'{$voteList['title']}',
											 	'{$voteList['list']}'
										 )
	 			");
	 	
	 	if(mysql_affected_rows() == 1){
	 		mysql_close($conn);
	 		alertLocation('添加选项成功！','add_vote_list.php');
	 	}elseif(mysql_affected_rows() == 0){
	 		mysql_close($conn);
	 		alertBack('添加选项失败!');
	 	}
	 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="styles/style.css" />
	<link rel="stylesheet" type="text/css" href="styles/index.css" />
	<link rel="stylesheet" type="text/css" href="styles/add_vote_list.css" />
	<script type="text/javascript" src="js/add_vote_list.js"></script>
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
			<div id="add-list">
				<form action="" method="post">
					<select name="theme">
						<option value="0" selected="selected" >请选择主题</option>
						<?php 
							while(!!$rs = fetchArray($query)){
						?>
						<option value="<?php echo $rs['vt_id']; ?>"><?php echo $rs['vt_title']; ?></option>
						<?php 
							}
						?>
					</select>
					<label>投票选项:<input type="text" name="list" value="请输入投票选项" class="add"/></label>
					<input type="submit" name="addlist" value="添加选项" />&nbsp;&nbsp;<a href="javascript:;" onclick="history.back();">返回</a>
				</form>
			</div>
		</div>
		<?php 
			include 'includes/footer.inc.php';
		?>
	</div>
</body>
</html>