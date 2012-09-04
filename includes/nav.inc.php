<?php
	/**
	 *@Author:       anshao
	 *@Date:         Sep 3, 2012
	 *@Encoding:     UTF-8
	 *@Link:         http://anshao.net
	 *@CopyRight:    Anshao
	 */
	// require 'includes/comm.inc.php';
	//session_start();

?>
<div id="nav">
	<ul>
		<li>
			<a href="index.php">首页</a>
			<?php 
				if(isset($_SESSION['user'])){
			?>
			<a href="admin/index.php">后台首页</a>
			<?php 
				}
			?>
			<a href="guestbook.php">留言建议</a>
			<?php 
				if(!isset($_SESSION['user'])){
			?>
			<a href="admin/login.php">管理登录</a>
			<?php 
				}
			?>
		</li>
	</ul>
</div>