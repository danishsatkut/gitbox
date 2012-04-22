<?php

Yii::import('zii.widgets.CMenu');

/**
 * CNav creates a Bootstrap nav element
 *
 * @author Vivek Rathod
 * @author Danish Satkut
 */
class CNav extends CMenu {
    /**
     * Overrides the method in CMenu to provide adding icons and caret to the
     * menu items
     * 
     * @param item array Each list item
     */
    protected function renderMenuItem($item) {
        $labelWithIcon = $item['label'];
        $iconPath = null;
        
        // Check whether label is present
        if(isset($item['icon'])) {
            
            // Check whether icon path exists
            if(isset($item['icon']['path'])) {
                $iconPath = 'background-image: url(' . $item['icon']['path'] . ')';
            }
            
            // create the icon element with class and path
            $labelWithIcon = CHtml::tag('i', array(
                            'class'=>$item['icon']['class'],
                            'style'=>$iconPath,
                            ), 
                    '') . " " . $item['label'];
            
            // add caret if set
            if(isset($item['caret']) && $item['caret'] === true) {
                $labelWithIcon .= '<b class="caret"></b>';
            }
        }
        
        // add a wrapper if available and create a link, else create a span
        if(isset($item['url']))
        {
            $label=$this->linkLabelWrapper===null ? $labelWithIcon : '<'.$this->linkLabelWrapper.'>'.$labelWithIcon.'</'.$this->linkLabelWrapper.'>';
            return CHtml::link($label,$item['url'],isset($item['linkOptions']) ? $item['linkOptions'] : array());
        } else {
            return CHtml::tag('span',isset($item['linkOptions']) ? $item['linkOptions'] : array(), $labelWithIcon);
        }
    }
}

?>
