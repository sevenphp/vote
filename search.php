<?php
	/**
	 *@Author:       anshao
	 *@Date:         Sep 4, 2012
	 *@Encoding:     UTF-8
	 *@Link:         http://anshao.net
	 *@CopyRight:    Anshao
	 */
	 require 'includes/comm.inc.php';
	 
	 //获取搜索结果
	 if(!empty($_GET['search']) && !empty($_GET['keyword'])){
	 	$querySearch = mysqlQuery("SELECT 
								 			`vt_id`,
								 			`vt_title` 
								 	FROM 
								 			`vt_theme` 
								 	WHERE 
								 			`vt_title` 
								 	LIKE 
								 			'%{$_GET['keyword']}%' 
								 ORDER BY 
								 			`vt_time` 
								 	DESC
	 								");
	 	
	 }else{
	 	alertBack('非法参数!');
	 }
	 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="styles/style.css" />
<link rel="stylesheet" type="text/css" href="styles/index.css" />
<link rel="stylesheet" type="text/css" href="styles/search-detail.css" />
<title>投票系统--搜索详情</title>
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
			<div id="searchdetail">
				<h4>搜索[ <span class="blue"><?php echo $_GET['keyword']; ?></span> ]的所有结果</h4>
				<ul>
					<?php 
						if(mysql_affected_rows() == 0){
					?>
					<li>没有你要着的主题哦!请换个关键字吧!</li>
					<?php 
						}else{
							while(!!$rsSearch = fetchArray($querySearch)){
					?>
					<li><a href="vote_detail.php?id=<?php echo $rsSearch['vt_id']; ?>"><?php echo $rsSearch['vt_title'];?></a></li>
					<?php 
							}
						}
					?>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
		<?php 
			//pageListText(, $lj, $pagenum, $page)
		?>
		<?php 
			include 'includes/footer.inc.php';
		?>
	</div>
</body>
</html>