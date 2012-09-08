<?php
	/**
	 *@Author:       anshao
	 *@Date:         Sep 3, 2012
	 *@Encoding:     UTF-8
	 *@Link:         http://anshao.net
	 *@CopyRight:    Anshao
	 */
	 require 'includes/comm.inc.php';
	 
	 //显示投票主题
	 //$queryTheme = mysqlQuery("SELECT `vt_id`,`vt_title`,`vt_time` FROM `vt_theme`");
	 $queryTheme = mysqlQuery("SELECT `vt_id`,`vt_title`,`vt_time` FROM `vt_theme` ORDER BY `vt_id` DESC");
	 
	 //显示系统公告
	 $queryNotice = mysqlQuery("SELECT `vt_title`,`vt_content` FROM `vt_notice` ORDER BY `vt_id` DESC LIMIT 6");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="styles/style.css" />
<link rel="stylesheet" type="text/css" href="styles/index.css" />
<script type="text/javascript" src="js/index.js"></script>
<title>投票系统--首页</title>
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
			<div id="main-left">
				<dl id="gonggao">
					<dt>最新公告</dt>
					<marquee scrollamount="1" scrolldelay="40" direction="up" width="200" height="140" onMouseOver="this.stop()" onMouseOut="this.start()">
					<?php 
						while(!!$rsNotice = fetchArray($queryNotice)){
					?>
					<dd><a href="javascript:;" title="<?php echo $rsNotice['vt_content'];?>"><?php echo mb_substr($rsNotice['vt_title'], 0,12,'utf-8').'...';?></a></dd>
					<?php 
						}
					?>
					</marquee>
				</dl>
				<dl id="contact">
					<dt>联系我们</dt>
					<dd>Name:Anshao</dd>
					<dd>Tel:020-11101010</dd>
					<dd>Mail:root@anshao.net</dd>
				</dl>
			</div>
			<div id="main-mid">
				<table cellspacing="0" cellpadding="0" border="0">
					<tbody>
						<tr>
							<th class="voteid">ID</th>
							<th class="votetitle">投票主题</th>
							<th class="votetime">发表时间</th>
							<th><a href="javascript:;"><img src="images/more.gif" alt="" title="" /></a></th>
						</tr>
						<?php 
							while(!!$rsTheme = fetchArray($queryTheme)){
						?>
						<tr>
							<td class="voteid"><?php echo $rsTheme['vt_id']; ?></td>
							<td class="votetitle"><a href="vote_detail.php?id=<?php echo $rsTheme['vt_id'];?>"><?php echo mb_substr($rsTheme['vt_title'], 0,18,'UTF-8'); ?></a></td>
							<td class="votetime"><?php $str = explode(' ',$rsTheme['vt_time']); echo $str[0];?></td>
							<td class="voters"><a href="graph.php?id=<?php echo $rsTheme['vt_id'];?>">结果</a></td>
						</tr>
						<?php 
							}
						?>					
					</tbody>
				</table>
			</div>
			<div id="main-right">
				<form action="search.php" method="get" name="searchform">
					<dl id="search">
						<dt>搜索主题</dt>
						<dd><input type="text" name="keyword" value="搜索主题" class="keyword"/></dd>
						<dd><input type="submit" name="search" value="搜索" class="sub"/></dd>
					</dl>
				</form>
				<dl id="down">
					<dt>相关下载</dt>
					<dd>
					
					</dd>
				</dl>
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