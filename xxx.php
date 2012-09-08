<?php
 include('src/jpgraph.php');	//src为jpgraph类库的根,自己根据情况修改
 include('src/jpgraph_bar.php');
 $data = array(18 ,23, 26 , 27 , 48 , 25 , 49); //模拟数据
 $graph = new Graph(400 , 300);
 $graph->SetScale("textlin"); //设置刻度模式
 $graph->SetShadow(); //设置阴影
 $graph->img->SetMargin(40 , 30 , 20 , 40) ;//设置边距
 $barplot = new BarPlot($data);
 $barplot->SetFillColor('blue') ; // 设置颜色
 $barplot->value->Show(); //设置显示数字
 $graph->Add($barplot); //将柱形图添加到图像中//设置标题和X-Y轴标题
 $graph->title->Set('测试柱形图');		//设置主标题
 $graph->xaxis->title->Set("月份");	//设置x轴标题
 $graph->yaxis->title->Set("总数(元)"); 	//设置y轴标题

 $graph->title->SetFont(FF_SIMSUN , FS_BOLD);	//设置主标题字体
 $graph->yaxis->title->SetFont(FF_SIMSUN , FS_BOLD);	//设置y轴标题字体
 $graph->xaxis->title->SetFont(FF_SIMSUN , FS_BOLD);	//设置x轴标题字体

 $graph->Stroke();
?>