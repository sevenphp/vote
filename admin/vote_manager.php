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
	 
	 if(isset($_GET['page'])){	//为$_GET['page']做判断,
	 	$page = $_GET['page'];
	 	if(empty($page) || $page<0 || !is_numeric($page)){	//进行容错
	 		$page = 1;
	 	}else{
	 		$page = intval($_GET['page']);
	 	}
	 }else{
	 	$page = 1;
	 }
	 $pagelimit = 2;	//每分页显示10条数据
	 
	 $query = mysqlQuery("SELECT `vt_id` FROM `vt_theme`");
	 $counter = mysql_num_rows($query);		//总记录条数
	 
	 if($counter == 0){
	 	$pagenum = 1;	//如果没有数据,默认第一页
	 }else{
	 	$pagenum = ceil($counter/$pagelimit);		//总页数
	 }
	 
	 if($page > $pagenum){	//如果$_GET['page']传递的参数的值大于总页数,用总页数覆盖$_GET['page']传递的值
	 	$page = $pagenum;
	 }
	 $pag = ($page-1)*$pagelimit;	 
	 
	 //$sql = "select `tc_id`,`tc_username`,`tc_sex`,`tc_face` from `tc_user` order by tc_reg_time desc limit $pag,$pagelimit";
	 //$query = mysql_query($sql);
	$query = mysqlQuery("SELECT `vt_id`,`vt_title`,`vt_admin`,`vt_time` FROM `vt_theme` ORDER BY `vt_time` DESC LIMIT $pag,$pagelimit");
	 
	 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="styles/style.css" />
<link rel="stylesheet" type="text/css" href="styles/index.css" />
<link rel="stylesheet" type="text/css" href="styles/vote-manager.css" />
<link rel="stylesheet" type="text/css" href="styles/page_list_text.css" />
<script type="text/javascript" src="js/index.js"></script>
<title>后台管理--投票主题管理</title>
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
			<div id="vote_manager">
				<center>投票主题管理中心</center>
				<h4><a href="add_vote_theme.php">添加投票主题</a>&nbsp;&nbsp;<a href="add_vote_list.php">添加投票选项</a></h4>
				<table cellspacing="0" cellpadding="0" border="0">
					<tbody>
						<tr>
							<th>主题名称</th>
							<th>发布人</th>
							<th>发布时间</th>
							<th>操作</th>
						</tr>
						<?php 
							while(!!$rs = fetchArray($query)){
						?>
						<tr>
							<td><?php echo $rs['vt_title']; ?></td>
							<td><?php echo $rs['vt_admin']; ?></td>
							<td><?php echo $rs['vt_time']; ?></td>
							<td><a href="del_vote_theme.php?id=<?php echo $rs['vt_id']; ?>" name="deltheme">删除</a></td>
						</tr>
						<?php 
							}
						?>
					</tbody>
				</table>
			</div>
			<?php 
				pageListText('vote_manager.php', '?', $pagenum, $page);
			?>
		</div>
		<?php 
			include 'includes/footer.inc.php';
		?>
	</div>
</body>
</html>