<?php

/**
 * CActiveFormHtml5 supports additional HTML5 elements for form
 *
 * @author Danish Satkut
 */
class CActiveFormHtml5 extends CActiveForm {
    /**
     * Wrapper for CHtml5::activeEmailField
     */
    public function emailField($model, $attribute, $htmlOptions = array()) {
        return CHtml5::activeEmailField($model, $attribute, $htmlOptions);
    }
    
    /**
     * Wrapper for CHtml5::activeUrlField 
     */
    public function urlField($model, $attribute, $htmlOptions = array()) {
        return CHtml5::activeUrlField($model, $attribute, $htmlOptions);
    }
}

?>
