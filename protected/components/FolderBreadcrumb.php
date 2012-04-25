<?php

Yii::import('zii.widgets.CBreadcrumbs');

/**
 * Provides the breadcrumb view for the folder hierarchy. It overrides CBreadcrumbs
 * in order to use markup and styles from Bootstrap.
 *
 * @author Bhavesh Prajapati
 */
class FolderBreadcrumb extends CBreadcrumbs{
    public $tagName = "ul";
    public $htmlOptions = array('class'=>'breadcrumb');
    public $separator = '<span class="divider">></span>';
    // public $homeLink = Yii::app()->request->baseUrl . '/home';
    // public $homeLink = CHtml::link('Home',Yii::app()->baseUrl . '/home');
    
    
    
    public function run() {
        echo CHtml::openTag($this->tagName,$this->htmlOptions)."\n";
        $links = '';
        if($this->homeLink!==false) {
            if(count($this->links) === 0) {
                // If current page is home
                $this->links[] = 'All files and folders';
            } else {
                // If current page is other than home
                $this->links['All files and folders']=$this->homeLink;
            }
        }
            
        
        // reverse the link array before using it
        $this->links = array_reverse($this->links);
        
        foreach($this->links as $label=>$url)
        {
            if(is_string($label) || is_array($url)) {
                // non-leaf node
                $currentLink = '<li>';
                $currentLink .= CHtml::link($this->encodeLabel ? CHtml::encode($label) : $label, $url);
                $currentLink .= $this->separator;
            }
            else {
                // leaf node
                $currentLink = '<li class="active">';
                $currentLink .= ($this->encodeLabel ? CHtml::encode($url) : $url);
            }
            $currentLink .= '</li>';
            
            $links .= $currentLink;
        }
        // echo implode($this->separator,$links);
        echo $links;
        echo CHtml::closeTag($this->tagName);
    }
}

?>
