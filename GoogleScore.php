<?php

    Class GoogleScore{
        public $mobileSpeed;
        public $desktopSpeed;
        public $usability; //mobile friendliness
        public $imageDesktop;
        public $imageMobile;
        public $url;
        
        public function __construct($mSpeed="", $dSpeed="", $mFrienliness="", $imageD="", $imageM="", $urlLink="") {
            $this->mobileSpeed=$mSpeed;
            $this->desktopSpeed=$dSpeed;
            $this->usability=$mFrienliness;
            $this->imageDesktop=$imageD;
            $this->imageMobile=$imageM;
            $this->url=$urlLink;
        }
        
        
    }

