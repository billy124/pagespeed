<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" 
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
      integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
      crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" 
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" 
      integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" 
      crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" 
crossorigin="anonymous"></script>



<?php

class TableDrawer{
    public $googleScoreObj;
    public $div;
    
    public function __construct($gObj) {
        $this->googleScoreObj=$gObj;
    }
    
    
    
    public function createProgressBar($percentage){
        
        switch($percentage){
            case $percentage<=50:
                $color="progress-bar-danger";
                break;
            case $percentage>=70:
                $color="progress-bar-success";
                break;
            case $percentage<70 && $percentage>50:
                $color="progress-bar-warning";
                break;
            default:
                echo "something went wrong";
                break;
        }
        
        $this->div='<div class="progress"><div class="progress-bar '.$color.'" role="progressbar" aria-valuenow="'.$percentage
                .'" aria-valuemin="0" aria-valuemax="100" style="width:'.$percentage.'%;">'.$percentage.'%</div></div>';
        return $this->div;
    }
    
    
    
    
    public function drawTable(){
        echo '<table style="width:100%">'
        .'<tr>'
                .'<th>'.$this->createProgressBar($this->googleScoreObj->mobileSpeed).'</th>'
                .'<th>'.$this->createProgressBar($this->googleScoreObj->desktopSpeed).'</th>'
                .'<th>'.$this->createProgressBar($this->googleScoreObj->usability).'</th>'
                .'<th><img src="data:image/jpeg;base64,'.$this->googleScoreObj->imageDesktop.'"></th>'
                .'<th><img src="data:image/jpeg;base64,'.$this->googleScoreObj->imageMobile.'"></th>'
                .'<th>'.$this->googleScoreObj->url.'</th>'
                .'<th>'
        .'</tr>'
        .'</table>';
        
    }
   
    
    
}
 