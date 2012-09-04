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
	 
	 if(isset($_GET['id']) && !empty($_GET['id'])){
	 	//判断是否存在提交的id对应的主题
	 	mysqlQuery("SELECT `vt_id` FROM `vt_theme` WHERE `vt_id`='{$_GET['id']}'"); 	
	 	if(mysql_affected_rows() == 0){
	 		alertBack('没有该投票主题!');
	 	}
	 	
	 	//删除对应id的主题记录
	 	mysqlQuery("DELETE FROM `vt_theme` WHERE `vt_id`='{$_GET['id']}'");
	 	
	 	if(mysql_affected_rows() == 1){
	 		//删除对应id的主题的所有选项记录
	 		mysqlQuery("DELETE FROM `vt_list` WHERE 'vt_vid'='{$_GET['id']}'");	

	 		if(mysql_affected_rows() == 1){
	 			mysql_close($conn);
	 			alertLocation('删除投票主题成功!', 'vote_manager.php');	 			
	 		}elseif(mysql_affected_rows() == 0){
	 			mysql_close($conn);
	 			alertLocation('删除主题选项失败!', 'vote_manager.php');
	 		}
	 	}elseif(mysql_affected_rows() == 0){
	 		mysql_close($conn);
	 		alertBack('删除投票主题失败!');
	 	}
	 }else{
	 	alertBack('非法参数!');
	 }
?>