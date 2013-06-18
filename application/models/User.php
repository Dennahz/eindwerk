<?php

class Application_Model_User extends Zend_Db_Table_Abstract
{
    protected $_primary =   'userId';
    protected $_name    =   'user';
    
    public function getUserByIdentity($identity)
    {
        $select = $this->select()
                ->where('username = ?', $identity);
        
        return $this->fetchAll($select)->current();
    }


}

