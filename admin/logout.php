<?php
	/**
	 *@Author:       anshao
	 *@Date:         Sep 3, 2012
	 *@Encoding:     UTF-8
	 *@Link:         http://anshao.net
	 *@CopyRight:    Anshao
	 */
	 
	 require '../includes/comm.inc.php';
	 
	 setcookie('adminid','',time()-1);
	 session_destroy();
	 alertLocation('退出成功!', '../index.php');
?>