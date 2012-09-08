<?php
	require_once ('src/jpgraph.php'); //载入基本类

	require_once ('src/jpgraph_bar.php'); //载入柱状图

	include_once('test_config.php'); //载入数据处理文件

	$graph=new Graph(900,500); //创建一个图表 指定大小

	$graph->SetScale("textlin"); //设置坐标刻度类型

	$graph->img->SetMargin(40,180,30,40);//设置统计图边距 左、右、上、下

	//$graph->SetMarginColor("lightblue");//设置画布背景色 淡蓝色

	//$graph->SetBackgroundImage('stship.jpg',BGIMG_COPY); //设置背景图片

	//$graph->img->SetAngle(45); //设置图形在图像中的角度

	//设置标题信息

 	$graph->title->Set('Wilr测试报表'); //设置统计图标题

	$graph->title->SetFont(FF_SIMSUN,FS_BOLD,20); //设置标题字体

	$graph->title->SetMargin(3);//设置标题的边距

	//设置X轴信息

	$graph->xaxis->title->Set('(单位:年)'); //标题

	$graph->xaxis->title->SetFont(FF_SIMSUN,FS_BOLD,10); //标题字体 大小

	$graph->xaxis->title->SetColor('black');//颜色

	$graph->xaxis->SetFont(FF_SIMSUN,FS_BOLD,10);//X轴刻度字体 大小

	$graph->xaxis->SetColor('black');//X轴刻度颜色

	$graph->xaxis->SetTickLabels($datax); //设置X轴标记

	$graph->xaxis->SetLabelAngle(0);//设置X轴的显示值的角度;

	//设置Y轴的信息

	$graph->yaxis->SetFont(FF_SIMSUN,FS_BOLD,10);//标题

	$graph->yaxis->SetColor('black');//颜色

	$graph->ygrid->SetColor('black@0.9');//X,y交叉表格颜色和透明度 @为程度值

	$graph->yaxis->scale->SetGrace(0);//设置Y轴显示值柔韧度(解释有点问题 呵呵 原谅)

	//设置数据

 	$bplot1 = new BarPlot($datay);

	$bplot2 = new BarPlot($number);

	//设置柱状图柱颜色和透明度

	$bplot1->SetFillColor('orange@0.4');

	$bplot2->SetFillColor('brown@0.4');

	//设置值显示

	$bplot1->value->Show(); //显示值

	$bplot1->value->SetFont(FF_SIMSUN,FS_BOLD,10);//显示字体大小

	$bplot1->value->SetAngle(90); //显示角度

	$bplot1->value->SetFormat('%0.2f'); //显示格式 0.2f:精确到小属数点后2位

	$bplot2->value->Show();

	$bplot2->value->SetFont(FF_SIMSUN,FS_BOLD,10);

	$bplot2->value->SetAngle(90);

	$bplot2->value->SetFormat('%0.0f');

	//设置图列标签

	$graph->legend->SetFillColor('lightblue@0.9');//设置图列标签背景颜色和透明度

	$graph->legend->Pos(0.01,0.12,"right","center");//位置

	$graph->legend->SetFont(FF_SIMSUN,FS_NORMAL,10);//显示字体 大小

	$bplot1->SetLegend('消费金额(单位:万元)');

	$bplot2->SetLegend('人数(单位:万人次)');

	//设置每个柱状图的颜色和阴影透明度

	$bplot1->SetShadow('black@0.4');

	$bplot2->SetShadow('black@0.4');

	//生成图列

	$gbarplot = new GroupBarPlot(array($bplot1,$bplot2));

	$gbarplot->SetWidth(0.5); //柱状的宽度

	$graph->Add($gbarplot);

	$graph->Stroke(); //输出图像
?>