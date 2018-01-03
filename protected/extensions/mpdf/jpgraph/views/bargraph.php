<?php
//require_once ('/../jpgraph_bar.php');
$dir=__FILE__;
$dir=explode("\\",$dir);
array_pop($dir);
array_pop($dir);
$dir=implode("\\",$dir);
include_once ($dir.'\jpgraph_bar.php');

$graph = new Graph($this->width,$this->height);
$scale=$this->getValue('graphscale'); 
$graph->SetScale($scale);

$graph->SetShadow();
$x1=$this->getvalue('marginX1');
$y1=$this->getvalue('marginY1');
$x2=$this->getvalue('marginX2');
$y2=$this->getvalue('marginY2');
$graph->img->SetMargin($x1,$x2,$y1,$y2);

$plot=array();
foreach($this->data as $data){
    $b1plot = new BarPlot($data['values']);    
    $b1plot->value->Show();
    if(isset($data['FillGradient']) && isset($data['FillGradient']['fromcolor']) && isset($data['FillGradient']['tocolor']))
        $b1plot->SetFillGradient($data['FillGradient']['fromcolor'],$data['FillGradient']['tocolor'],GRAD_VERT);
    $plotWeight=$this->getValue("plotWeight");                
    $b1plot->SetWeight($plotWeight);
    $plot[]=$b1plot;
}
// Create the grouped bar plot
if($this->type=="bar")
    $gbplot = new AccBarPlot($plot);
else if($this->type=="groupbar")
    $gbplot = new GroupBarPlot($plot);    

// ...and add it to the graPH
$plotWidth=$this->getvalue('plotWidth');
$gbplot->SetWidth($plotWidth);
$graph->Add($gbplot);

$graph->title->Set($this->title);
$xtitle=$this->getvalue('xtitle');
$ytitle=$this->getvalue('ytitle');
$graph->xaxis->title->Set($xtitle);
$graph->yaxis->title->Set($ytitle);


$fontsize=$this->getvalue('title_fontsize');    
$fontfamily=$this->getvalue('title_fontfamily');
$fontfamily=$this->fontFamily($fontfamily);    
$fontstyle=$this->getvalue('title_fontstyle');
$fontstyle=$this->fontStyle($fontstyle);
$tcolor=$this->getvalue('title_color');

$graph->title->SetColor($tcolor);
$graph->title->SetFont($fontfamily,$fontstyle,$fontsize);

//$graph->title->SetFont(FF_FONT1,FS_BOLD);
$fontsize=$this->getvalue('x_axis_fontsize');    
$fontfamily=$this->getvalue('x_axis_fontfamily');
$fontfamily=$this->fontFamily($fontfamily);    
$fontstyle=$this->getvalue('x_axis_fontstyle');
$fontstyle=$this->fontStyle($fontstyle);
$tcolor=$this->getvalue('x_axis_color');

//$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetColor($tcolor);
$graph->yaxis->title->SetFont($fontfamily,$fontstyle,$fontsize);

//$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
$fontsize=$this->getvalue('y_axis_fontsize');    
$fontfamily=$this->getvalue('y_axis_fontfamily');
$fontfamily=$this->fontFamily($fontfamily);    
$fontstyle=$this->getvalue('y_axis_fontstyle');
$fontstyle=$this->fontStyle($fontstyle);
$tcolor=$this->getvalue('y_axis_color');

//$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetColor($tcolor);
$graph->xaxis->title->SetFont($fontfamily,$fontstyle,$fontsize);

// Display the graph
if($this->saveas!=""){ 
    if(file_exists($this->saveas))
        unlink($this->saveas);
        $graph->Stroke($this->saveas);
}else{
        $graph->Stroke();
}

?>
