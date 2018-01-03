<?php
$dir=__FILE__;
$dir=explode("\\",$dir);
array_pop($dir);
array_pop($dir);
$dir=implode("\\",$dir);
include_once ($dir.'\jpgraph_radar.php');

$graph = new RadarGraph ($this->width,$this->height); 
/** set title **/
if($this->title!=""){

    $fontcolor=$this->getvalue('title_color');
    $fontsize=$this->getvalue('title_fontsize');
            
    $fontfamily=$this->getvalue('title_fontfamily');
    $fontfamily=$this->fontFamily($fontfamily);    
    $fontstyle=$this->getvalue('title_fontstyle');
    $fontstyle=$this->fontStyle($fontstyle);
                        
    $graph->title->Set($this->title);
    $graph->title->SetColor($fontcolor);
    
    $graph->title->SetFont($fontfamily,$fontstyle,$fontsize);
}
if($this->subtitle!=""){

    $fontcolor=$this->getvalue('subtitle_color');
    $fontsize=$this->getvalue('subtitle_fontsize');
            
    $fontfamily=$this->getvalue('subtitle_fontfamily');
    $fontfamily=$this->fontFamily($fontfamily);    
    $fontstyle=$this->getvalue('subtitle_fontstyle');
    $fontstyle=$this->fontStyle($fontstyle);
                        
    $graph->subtitle->Set($this->subtitle);
    $graph->subtitle->SetColor($fontcolor);
    $graph->subtitle->SetFont($fontfamily,$fontstyle,$fontsize);
}

/** SET LINE STYLE **/
if(isset($this->properties['grid_linestyle']) && $this->properties['grid_linestyle']!="")
    $graph->grid->SetLineStyle($this->properties['grid_linestyle']);
    
/** SET POSITION **/    
$posX=$this->getvalue('posX');
    
$posY=$this->getvalue('posY');            
$graph->SetPos($posX,$posY);
    
    
/** SET DATA LABEL **/
if(is_array($this->datalabel) && count($this->datalabel)>0){
$graph->SetTitles($this->datalabel);
$graph->SetCenter(0.5,0.55);
$graph->HideTickMarks(); 
}

/** GRAPH COLOR **/
if(isset($this->properties['graph_color']) && $this->properties['graph_color']!="")
    $graph->SetColor($this->properties['graph_color']);

/** AXIS COLOR AND SIZE **/
if(isset($this->properties['axis_color']) || isset($this->properties['axis_size'])){
    $size=isset($this->properties['axis_size']) && $this->properties['axis_size']!=""?$this->properties['axis_size']:$this->defaultproperties['axis_size'];
    $color=isset($this->properties['axis_color']) && $this->properties['axis_color']!=""?$this->properties['axis_color']:$this->defaultproperties['axis_color'];        
    $graph->axis->SetColor("$color@$size");    
}
$weight=$this->getvalue('axis_weight');
$graph->axis->SetWeight($weight);

$fontsize=$this->getvalue('axis_fontsize');    
$fontfamily=$this->getvalue('axis_fontfamily');
$fontfamily=$this->fontFamily($fontfamily);    
$fontstyle=$this->getvalue('axis_fontstyle');
$fontstyle=$this->fontStyle($fontstyle);
$graph->axis->SetFont($fontfamily,$fontstyle,$fontsize);

/** GRID COLOR AND SIZE **/
if(isset($this->properties['grid_color']) || isset($this->properties['grid_size'])){
    $size=isset($this->properties['grid_size']) && $this->properties['grid_size']!=""?$this->properties['grid_size']:$this->defaultproperties['grid_size'];
    $color=isset($this->properties['grid_color']) && $this->properties['grid_color']!=""?$this->properties['grid_color']:$this->defaultproperties['grid_color'];    
    //$graph->grid->SetColor('red@1.0);
    $graph->grid->SetColor("$color@$size");
}

$weight=$this->getvalue('grid_weight');
$graph->grid->SetWeight($weight);

if(isset($this->properties['graph_shadow']) && $this->properties['graph_shadow']==true)
    $graph->SetShadow(); 
$graph->grid->Show();


/**  ASSIGN DATA **/
if(is_array($this->data)){
foreach($this->data as $dgraph){
    $graph->SetGridDepth(DEPTH_BACK);
    $plot = new RadarPlot($dgraph['values']);
    
    /** data graph color and size **/
    if(isset($dgraph['color']) && trim($dgraph['color']!="")){
        $size='0.7';
        if(isset($dgraph['colorsize']) && trim($dgraph['colorsize'])!="")
            $size=$dgraph['colorsize'];
        $plot->SetColor($dgraph['color'].'@'.$size);                
    }
    
    /** data graph fill color and size **/
    if(isset($dgraph['fillcolor']) && trim($dgraph['fillcolor']!="")){
        $size='0.7';
        if(isset($dgraph['fillsize']) && trim($dgraph['fillsize'])!="")
            $size=$dgraph['fillsize'];
            $plot->SetFillColor($dgraph['fillcolor'].'@'.$size);
    }
    if(isset($dgraph['setFill']) && $dgraph['setFill']==false){
        $plot->SetFill(false);    
        }

    /** data graph line size **/
    if(isset($dgraph['lineWeight']) && trim($dgraph['lineWeight']!="")){
        $plot->SetLineWeight($dgraph['lineWeight']);
    }
        /** data graph line size **/
    if(isset($dgraph['legend']) && trim($dgraph['legend']!="")){
        $plot->SetLegend($dgraph["legend"]);
    }    
    $plot=$this->setMark($plot,$dgraph);
        
    $graph->Add($plot);    
}
}

    //$filename=Yii::app()->basePath."/../graphimage/1.jpg";
    if($this->saveas!=""){ 
        if(file_exists($this->saveas))
            unlink($this->saveas);
        $graph->Stroke($this->saveas);
    }else{
        $graph->Stroke();
    }
?>