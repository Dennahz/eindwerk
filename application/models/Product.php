<?php

class Application_Model_Product extends Zend_Db_Table_Abstract
{
    protected $_primary =   'productId';
    protected $_name    =   'product';
    
    CONST STATUS    =   'ONLINE';
    
    
    public function getAllProducts($limit, $locale)
    {
        $select = $this->select(Zend_Db_Table::SELECT_WITH_FROM_PART)
                ->setIntegrityCheck(false)
                ->joinLeft(array('l' => 'productLocale'),
                        'l.productId = product.productId',
                        array('product.productId AS productId', 'l.title AS productTitle', 'l.locale AS locale'))
                ->where('l.locale = ?', $locale)
                ->limit($limit);
        
        return $this->fetchAll($select);
    }
    
    public function getProductsByKeyword($key, $locale)
    {
        $select = $this->select(Zend_Db_Table::SELECT_WITH_FROM_PART)
                ->setIntegrityCheck(false)
                ->joinLeft(array('l' => 'productLocale'),
                        'l.productId = product.productId',
                        array('product.productId AS productId', 'l.title AS title', 'l.teaser AS teaser', 'l.locale AS locale'))
                ->where('l.title = ?', $key)
                ->orwhere('l.content LIKE "%' . $key . '%"')
                ->where('l.locale = ?', $locale);
        
        return $this->fetchAll($select);
    }
    
    public function getProductById($id, Zend_Locale $locale)
    {
        $select = $this->select(Zend_Db_Table::SELECT_WITH_FROM_PART)
                ->setIntegrityCheck(false)
                ->joinLeft(array('l' => 'productLocale'),
                        'l.productId = product.productId',
                        array('product.productId AS productId', 'l.title AS title', 'l.content AS content', 'l.locale AS locale'))
                ->where('product.productId = ?', $id)
                ->where('l.locale = ?', $locale);
        
        return $this->fetchAll($select)->current();
    }


}

