<?php

class Application_Model_Page extends Zend_Db_Table_Abstract
{
    protected $_primary =   'pageId';
    protected $_name    =   'page';
    
    
    
    public function getPageById($id, Zend_Locale $lang)
    {
        $select = $this->select(Zend_Db_Table::SELECT_WITH_FROM_PART)
                ->setIntegrityCheck(false)
                ->joinLeft(array('l' => 'pageLocale'),
                        'l.pageId = page.pageId',
                        array('page.pageId AS pageId', 'l.title AS title', 'l.content AS content'))
                ->where('page.pageId = ?', $id)
                ->where('l.locale = ?', $lang);
        
     
        
        return $this->fetchAll($select)->current();
    }
    
    public function getMenu(Zend_Locale $lang)
    {
        $select = $this->select(Zend_Db_Table::SELECT_WITH_FROM_PART)
                ->setIntegrityCheck(false)
                ->join(array('l' => 'pageLocale'),
                        'l.pageId = page.pageId',
                        array('page.pageId AS pageId', 'l.title AS title', 'l.content AS content'))
                
                ->where('l.locale = ?', $lang);
        
        return $this->fetchAll($select);
        
    
    }


}

