<?php

/**
 * Adapter to the CHtml wrapper class for providing HTML5 related features.
 *
 * @author Danish Satkut
 */
class CHtml5 extends CHtml {
    /**
     * Creates a HTML5 email input type
     * 
     * @return string Html tag for the input type email
     */
    public static function activeEmailField($model, $attribute, $htmlOptions = array()) {
        parent::resolveNameId($model, $attribute, $htmlOptions);
        parent::clientChange('change', $htmlOptions);
        return parent::activeInputField('email', $model, $attribute, $htmlOptions);
    }
    
    /**
     * Creates a HTML5 url input type
     * 
     * @return string Html tag for the input type url
     */
    public static function activeUrlField($model, $attribute, $htmlOptions = array()) {
        parent::resolveNameId($model, $attribute, $htmlOptions);
        parent::clientChange('change', $htmlOptions);
        return parent::activeInputField('url', $model, $attribute, $htmlOptions);
    }
}

?>
