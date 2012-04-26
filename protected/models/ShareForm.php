<?php

/**
 * ShareForm is data-structure for keeping the user share data. 
 * It is used by the share action of virtualFolder
 *
 * @author Danish Satkut
 */
class ShareForm extends CFormModel {
    public $email;
    
    /**
     * Declaration of validation rules
     * 
     * The email field is required. 
     */
    public function rules() {
        return array(
            array('email', 'required'),
            array('email', 'email'),
            array('email', 'different', 'from'=>Yii::app()->user->getState('email')),
            array('email', 'exist', 'className'=>'User', 'attributeName'=>'email'),
        );
    }
    
    /**
     * Attribute labels for the fields.
     *  
     */
    public function attributeLabels() {
        return array(
            'email' => 'Email Address ',
        );
    }
    
    /**
     * Inline validator different
     * 
     * Checks whether the email address provided is same as current email address.
     */
    public function different($attribute, $params) {
        if(!$this->hasErrors()) {
            if($this->email == $params['from']) {
                $this->addError('email', 'Cannot share with yourself!');
            }
        }
    }
}

?>
