<?php
//include_once ('/../jpgraph_scatter.php');
$dir=__FILE__;
$dir=explode("\\",$dir);
array_pop($dir);
array_pop($dir);
$dir=implode("\\",$dir);
include_once ($dir.'\jpgraph_scatter.php');

$datax=array();
$datay=array();

$datax = $this->data['dataX'];
$datay = $this->data['dataY'];


// Setup a basic graph
$graph = new Graph($this->width,$this->height,'auto');
$graph->SetScale($this->getValue("graphscale"));
//$graph->SetScale("linlin");
$x1=$this->getvalue('marginX1');
$y1=$this->getvalue('marginY1');
$x2=$this->getvalue('marginX2');
$y2=$this->getvalue('marginY2');

$graph->img->SetMargin($x1,$x2,$y1,$y2);		
$graph->SetShadow();
$graph->title->Set($this->title);
// Use a lot of grace to get large scales
$graph->yaxis->scale->SetGrace(50,10);
$graph->xaxis->scale->SetGrace(50,10);
// Make sure X-axis as at the bottom of the graph
$graph->xaxis->SetPos('min');

// Create the scatter plot
$sp1 = new ScatterPlot($datay,$datax);
$mark=$this->getMark($this->getValue("mark"));
if($mark!="")
    $sp1->mark->SetType($mark);

// Uncomment the following two lines to display the values
$sp1->value->Show();
$fontsize=$this->getvalue('fontsize');    
$fontfamily=$this->getvalue('fontfamily');
$fontfamily=$this->fontFamily($fontfamily);    
$fontstyle=$this->getvalue('fontstyle');
$fontstyle=$this->fontStyle($fontstyle);
$sp1->value->SetFont($fontfamily,$fontstyle,$fontsize);

//$sp1->value->SetFont(FF_FONT1,FS_BOLD);

// Specify the callback

$sp1->mark->SetCallback("FCallback");

// Setup the legend for plot
$legend=$this->getValue("legend");
if($legend!="")
$sp1->SetLegend($legend);

// Add the scatter plot to the graph
$graph->Add($sp1);

// ... and send to browser
if($this->saveas!=""){ 
    if(file_exists($this->saveas))
        unlink($this->saveas);
        $graph->Stroke($this->saveas);
}else{
        $graph->Stroke();
}



/** function **/
function FCallback($aVal) {
    // This callback will adjust the fill color and size of
    // the datapoint according to the data value according to
    if( $aVal < 30 ) $c = "blue";
    elseif( $aVal < 70 ) $c = "green";
    else $c="red";
    return array(floor($aVal/3),"",$c);
}

?>