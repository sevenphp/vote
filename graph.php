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
	 	$jieguo[] = $rsList['vt_count'];
	 	$xuanxiang[] = $rsList['vt_list'];
	 	$title = $rsList['vt_title'];
	 }
	 
	 //jpgraph
	 
	 function cbFmtPercentage($aVal){
	 	return sprintf("%.1f%%",1*$aVal);
	 }
	 
	 $graph = new Graph(600,300);
	 $graph->SetScale("textlin");
	 $graph->yaxis->scale->SetGrace(100);
	 $graph->img->SetMargin(40,30,30,40);
	 $graph->SetShadow();
	 $bar1 = new BarPlot($jieguo);
	 $graph->title->Set($title);
	 $graph->xaxis->SetTickLabels($xuanxiang);
	 $graph->title->SetFont(FF_SIMSUN);
	 $graph->xaxis->SetFont(FF_SIMSUN);
	 $bar1->value->SetFormatCallback("cbFmtPercentage");
	 $bar1->value->Show();
	 
	 $graph->Add($bar1);
	 
	 $graph->Stroke();	 
?>