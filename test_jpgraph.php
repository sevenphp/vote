<?php
require_once ('src/jpgraph.php');
require_once ('src/jpgraph_line.php');
 
$ydata = array(11,3,8,12,5,1,9,13,5,7);
$y2data = array(354,200,265,99,111,91,198,225,293,251);
 
// 创建图表并制定X、Y轴的刻度种类
$width=550;$height=400;
$graph = new Graph(550,400);
$graph->SetScale('textlin');
$graph->SetY2Scale('lin');
$graph->SetShadow();
 
// 调整图形留白的尺寸
$graph->SetMargin(50,150,60,80);
 
// 创建两个线性图形
$lineplot=new LinePlot($ydata);
$lineplot2=new LinePlot($y2data);
 
// 将图形添加到图表中
$graph->Add($lineplot);
$graph->AddY2($lineplot2);
$lineplot2->SetColor('orange');
$lineplot2->SetWeight(2);
 
// 调整轴的颜色
$graph->y2axis->SetColor('darkred');
$graph->yaxis->SetColor('blue');
 
$graph->title->SetFont(FF_ARIAL, FS_BOLD, 14);
$graph->title->Set('Using JpGraph Library');
$graph->title->SetMargin(10);
 
$graph->subtitle->SetFont(FF_ARIAL, FS_BOLD, 10);
$graph->subtitle->Set('(common objects)');
 
$graph->xaxis->title->SetFont(FF_ARIAL, FS_BOLD, 10);
$graph->xaxis->title->Set('X-title');
$graph->yaxis->title->SetFont(FF_ARIAL, FS_BOLD, 10);
$graph->yaxis->title->Set('Y-title');
 
// 设置模型的颜色
$lineplot->SetColor('blue');
$lineplot->SetWeight(2);
$lineplot2->SetColor('darkred');
$lineplot2->SetWeight(2);
 
// 设置模型的文本说明
$lineplot->SetLegend('Plot 1');
$lineplot2->SetLegend('Plot 2');
 
// 调整其位置
$graph->legend->SetPos(0.05,0.5,'right','center');
 
// 显示图表
$graph->Stroke();
?>