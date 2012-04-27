<?php

/**
 * FileUpload is the Form Model that provides file uploading capabilites.
 *
 * @author Danish Satkut
 * @author Bhavesh Prajapati
 */
class FileUpload extends CFormModel {
    /**
     * Currently we are using CUploadedFile for our object reference. This might
     * change to CFile.
     * 
     * @var File The file object reference.
     */
    public $file;
    
    public function rules() {
        return array(
            array('file', 'file', 
                'types'=>array('zip','doc','docx','jpeg','jpg','ppt','pptx', 'rar'), 
                'maxSize'=> 10 * 1024 * 1024),  // 10 MB
        );
    }
    
    public function attributeLabels() {
        array(
            'file' => 'File ',
        );
    }
}

?>
