<?php

class Application_Model_Locale extends Zend_Db_Table_Abstract
{
    protected $_primary =   'localeId';
    protected $_name    =   'locale';
    
    public function getAllLocales()
    {
        $select = $this->select();
        
        
        
        return $this->fetchAll($select);
    }


}

