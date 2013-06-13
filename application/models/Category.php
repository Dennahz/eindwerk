<?php

class Application_Model_Category extends Zend_Db_Table_Abstract
{
    protected $_primary =   'categoryId';
    protected $_name    =   'category';
    
    public function getAllCategorys($limit, $locale)
    {
        $select = $this->select(Zend_Db_Table::SELECT_WITH_FROM_PART)
                ->setIntegrityCheck(false)
                ->joinLeft(array('l' => 'categoryLocale'),
                        'category.categoryId = l.categoryId',
                        array('category.categoryId AS categoryId', 'l.name AS categoryName'))
                ->where('l.locale = ?', $locale)
                ->limit($limit);            
      
        return $this->fetchAll($select);
        }


}

