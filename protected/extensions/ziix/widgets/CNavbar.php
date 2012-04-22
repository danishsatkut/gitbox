<?php

/**
 * CNavbar creates a Bootstrap Navbar
 * 
 * This class is just a helper class hence all its methods are static.
 * 
 * @todo can make this a widget by implementing some properties to make this
 * navbar fixed or not. Something like that!
 * 
 * @todo New Idea! Make this a widget like CActiveForm. Allow the following methods to be called accordingly
 * Also allow creating form in the navbar -> later
 * 
 * @author Vivek
 * @author Danish Satkut
 */
class CNavbar extends CWidget {
    public $brand = null;
    public $responsive = true;
    
    public function init() {
        // Call the start of navbar here
        // Check of navbar is responsive
        echo $this->startNavbar();
        
        // Responsive collapsible navigation
        if(isset($this->brand)) {
            echo CHtml::link($this->brand['label'], $this->brand['url'], array('class'=>'brand'));
        }
        
        if($this->responsive) {
            echo $this->responsiveNav();
        }
        
        echo CHtml::openTag('nav');
    }
    
    public function run() {
        // Call the end of navbar
        echo CHtml::closeTag('nav');
        
        if($this->responsive) {
            echo $this->endResponsive();
        }
        
        echo $this->endNavbar();
    }
    
    private static function startNavbar() {
        $navbarStart = CHtml::openTag('div', array('class'=>'navbar navbar-fixed-top'));
        $navbarStart .= CHtml::opentag('div', array('class'=>'navbar-inner'));
        $navbarStart .= CHtml::opentag('div', array('class'=>'container'));
        return $navbarStart;
    }
    
    public static function responsiveNav() {
        // Display the button when the navbar is collapsed
        $navbarResponsive = CHtml::openTag('a', array(
                'class'=>'btn btn-navbar',
                'data-toggle'=>'collapse',
                'data-target'=>'.nav-collapse',
            ));

        // Display the button lines
        for($i = 0; $i < 3; $i++) {
            $navbarResponsive .= CHtml::openTag('span', array('class'=>'icon-bar'));
            $navbarResponsive .= CHtml::closeTag('span');
        }
        
        // Close the button
        $navbarResponsive .= CHtml::closeTag('a');
        
        $navbarResponsive .= CHtml::openTag('div', array('class'=>'nav-collapse'));
        
        return $navbarResponsive;
    }
    
    public static function endResponsive() {
        // Close nav-collapse
        $navbarResponsiveEnd .= CHtml::closeTag('div');
        return $navbarResponsiveEnd;
    }
    
    public static function endNavbar() {
        $navbarEnd = CHtml::closeTag('div');
        $navbarEnd .= CHtml::closeTag('div');
        $navbarEnd .= CHtml::closeTag('div');
        return $navbarEnd;
    }
}

?>
