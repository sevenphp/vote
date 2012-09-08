<?php
	/**
	*@Author:       anshao
	*@Date:         2012-9-8
	*@Encoding:     UTF-8
	*@Link:         http://anshao.net
	*@CopyRight:    Anshao
	**/
	$dbConn=mysql_connect("localhost","root","shao520");

	if(!$dbConn){
		echo '数据库通信失败';
	}
	
	mysql_select_db("jpgraph");

	mysql_query("set names 'utf8'",$dbConn);

	$sql= " SELECT * FROM jpg_temp";

	$result=mysql_query($sql,$dbConn);

	$rowCount=mysql_num_rows($result);

	$datay=array();

	$datax=array();

	$number=array();

	while (!!$row=mysql_fetch_array($result)){

		$datay[]=$row["money"];

		$datax[]=$row["year"];

		$number[]=$row["number"];

	}

//echo each($datay);

//print_r($datay);

	mysql_close($dbConn);
?>