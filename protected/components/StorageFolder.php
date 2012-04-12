<?php

/**
 * Description of StorageFolder
 *
 * @author Danish Satkut
 */
class StorageFolder extends CApplicationComponent {
    private $_path = "C:/xampp/htdocs/working-sandbox/gitbox/protected/storage";
    private $_folder;
    
    public function __construct() {
        $this->_folder = CFile::set($this->_path);
    }
    
    public function getFolder() {
        return $this->_folder;
    }
}

?>
