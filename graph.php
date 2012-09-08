<?php
	/**
	 *@Author:       anshao
	 *@Date:         Sep 4, 2012
	 *@Encoding:     UTF-8
	 *@Link:         http://anshao.net
	 *@CopyRight:    Anshao
	 */
	 require 'includes/comm.inc.php';
	 
	 include 'src/jpgraph.php';
	 include 'src/jpgraph_bar.php';
	 
	 //读取对应id的选项内容
	 $queryList = mysqlQuery("SELECT `vt_title`,`vt_count`,`vt_list` FROM `vt_list` WHERE `vt_vid`='{$_GET['id']}'");
	 
	 while(!!$rsList = fetchArray($queryList)){
	 	$jieguoy[] = $rsList['vt_count'];
	 	$xuanxiangx[] = $rsList['vt_list'];
	 	$title = $rsList['vt_title'];
	 }
	 
	 //$data = array(18 ,23, 26 , 27 , 48 , 25 , 49); //模拟数据
	 $graph = new Graph(400 , 300);
	 $graph->SetScale("textlin"); //设置刻度模式
	 $graph->SetShadow(); //设置阴影
	 $graph->img->SetMargin(40 , 30 , 20 , 40) ;//设置边距
	 $barplot = new BarPlot($jieguoy);
	 $barplot->SetFillColor('blue') ; // 设置颜色
	 //$barplot->value->Show(); //设置显示数字
	 //$graph->xaxis->SetTickLabels($xuanxiangx);	//设置X轴标记
	 $graph->Add($barplot); //将柱形图添加到图像中
	 $graph->title->Set($title);	//设置主标题
	 $graph->title->SetFont(FF_SIMSUN , FS_BOLD);	//设置主标题字体
	 $graph->xaxis->title->SetFont(FF_SIMSUN,FS_BOLD,10);	//设置x轴标题字体
	 $graph->yaxis->title->SetFont(FF_SIMSUN,FS_BOLD,10);	//设置y轴标题字体
	 $graph->xaxis->title->Set("选项");	//设置x轴标题
	 $graph->yaxis->title->Set("获票总数"); //设置y轴标题
	 $graph->Stroke();	 //输出图像
	
?>