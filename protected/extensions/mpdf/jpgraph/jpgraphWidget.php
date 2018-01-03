<?php
class jpgraphWidget extends CWidget{
    public $type;//radar, scatter

    public $title;//="GRAPH TITLE";
    public $subtitle;//="GRAPH SUB-TITLE";
    public $width=400;
    public $height=400;
    public $properties=array();                            
    public $defaultproperties=array();                               

    public $data;//values,fillcolor,legend, setfill (true or false)), fillsize, colorsize, color
    public $datalabel;
    public $saveas="";
    public function init(){       
        $this->loadJPgraph();                    
    }

    
    public function loadJPgraph(){
        include_once ('jpgraph.php');
    }
    
    public function run(){
        if($this->type=="radar"){
            $this->setRadardefaultvalus();
            include_once "views/radargraph.php";
        }else if($this->type=="scatter"){
           $this->setScatterdefaultvalus();
            include_once "views/scattergraph.php";
        }else if($this->type=="bar" || $this->type=="groupbar"){
           $this->setBardefaultvalus();
            include_once "views/bargraph.php";
        }
    }

    public function setMark(RadarPlot $plot,$dgraph){
        if(isset($dgraph['mark'])){
            $type=$this->getMark($dgraph['mark']);
            if($type==MARK_IMG_SBALL){
                $plot->mark->SetType(MARK_IMG_SBALL,'red');
            }else
                $plot->mark->SetType($type);                                
        }
        return $plot;   
    }

    public function getvalue($key){
            return isset($this->properties[$key]) && $this->properties[$key]!=""?$this->properties[$key]:$this->defaultproperties[$key];
    }

    public function fontStyle($font){
        if($font=="B")
            return FS_BOLD;
        else if($font=="I")
            return FS_ITALIC;
        else if($font=="N")
            return FS_NORMAL;                        
    }
    
    public function fontFamily($font){
        if($font=="FF_FONT1")
            return FF_FONT1;
        else if($font=="FF_VERDANA")
            return FF_VERDANA;                                    
    }
    
    public function getMark($key){
        if($key=="MARK_IMG_SBALL")
            return MARK_IMG_SBALL;
        else if($key=="MARK_SQUARE")
            return MARK_SQUARE;
        else if($key=="MARK_UTRIANGLE")
            return MARK_UTRIANGLE;
        else if($key=="MARK_DIAMOND")
            return MARK_DIAMOND;
        else if($key=="MARK_CIRCLE")
            return MARK_CIRCLE;
        else if($key=="MARK_CROSS")
            return MARK_CROSS;
        else if($key=="MARK_FILLEDCIRCLE")
            return MARK_FILLEDCIRCLE;
        else if($key=="MARK_STAR")
            return MARK_STAR;
        else if($key=="MARK_X")
            return MARK_X;                                                                                  else if($key=="MARK_LEFTTRIANGLE")
            return MARK_LEFTTRIANGLE;
        else if($key=="MARK_RIGHTTRIANGLE")
            return MARK_RIGHTTRIANGLE;
        else if($key=="MARK_FLASH")
            return MARK_FLASH;     
        else
            return "";                                                   
    }
    
    public function setRadardefaultvalus(){
        $this->defaultproperties=array(
                        'posX'=>0.5,
                        'posY'=>0.6,
                        'title_color'=>'black',
                        'title_fontsize'=>12,
                        'title_fontfamily'=>"FF_VERDANA",
                        'title_fontstyle'=>'N',
                        'subtitle_color'=>'black',                        
                        'subtitle_fontsize'=>10,
                        'subtitle_fontfamily'=>"FF_VERDANA",
                        'subtitle_fontstyle'=>"I",
                        
                        'axis_color'=>'darkgray',//'darkgray',
                        'axis_size'=>'0.9',//0.0-1
                        'axis_weight'=>'1',
                        'axis_fontfamily'=>"FF_VERDANA",
                        'axis_fontstyle'=>"N",
                        'axis_fontsize'=>8,
                        
                        'grid_color'=>'darkgray',
                        'grid_size'=>'0.6',
                        'grid_weight'=>'1',
                        'grid_linestyle'=>'', //solid,dashed,dotted        
                        'graph_color'=>''  
                        );                        
    }
    
    public function setScatterdefaultvalus(){
        //$graph->img->SetMargin(40,100,40,40);		
        $this->defaultproperties=array(
                        'marginX1'=>40,
                        'marginX2'=>100,
                        'marginY1'=>40,
                        'marginY2'=>40,
                        'mark'=>'MARK_FILLEDCIRCLE',
                        'legend'=>'',
                        'graphscale'=>"intlin",//linlin
                        'color'=>'black',                        
                        'fontsize'=>10,
                        'fontfamily'=>"FF_VERDANA",
                        'fontstyle'=>"B",                                                
        );
    }
    
    public function setBardefaultvalus(){
        $this->defaultproperties=array(
                        'plotWeight'=>1,
                        'plotWidth'=>'0.6',
                        'xtitle'=>"",
                        'ytitle'=>"",
                        'marginX1'=>40,
                        'marginX2'=>100,
                        'marginY1'=>40,
                        'marginY2'=>40,        
                        'graphscale'=>"textlin",
                        
                        'title_color'=>'#444444',
                        'title_fontsize'=>12,
                        'title_fontfamily'=>"FF_VERDANA",
                        'title_fontstyle'=>'N',
                                                
                        'x_axis_color'=>'#444444',//'darkgray',                        
                        'x_axis_fontfamily'=>"FF_VERDANA",
                        'x_axis_fontstyle'=>"B",
                        'x_axis_fontsize'=>8,
                        
                        'y_axis_color'=>'#444444',//'darkgray',
                        'y_axis_fontfamily'=>"FF_VERDANA",
                        'y_axis_fontstyle'=>"B",
                        'y_axis_fontsize'=>8,
        );
    }    
}
?>
