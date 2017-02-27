<?php

class TableDrawer{
    public $googleScoreObj;
    
    public function __construct($gObj) {
        $this->googleScoreObj=$gObj;
    }
    
    
    public function drawTable(){
        echo '<table style="width:100%">'
        .'<tr>'
                .'<th>'.$this->googleScoreObj->mobileSpeed.'</th>'
                .'<th>'.$this->googleScoreObj->desktopSpeed.'</th>'
                .'<th>'.$this->googleScoreObj->usability.'</th>'
                .'<th><img src="data:image/jpeg;base64,'.$this->googleScoreObj->imageDesktop.'"></th>'
                .'<th><img src="data:image/jpeg;base64,'.$this->googleScoreObj->imageMobile.'"></th>'
                .'<th>'.$this->googleScoreObj->url.'</th>'
                .'<th>'
        .'</tr>'
        .'</table>';
        //echo "<br>------echo image:<br>";
        //echo $this->googleScoreObj->imageDesktop;
        
    }
   
    
    
}
 