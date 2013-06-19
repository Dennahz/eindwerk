<?php

class Application_Model_Product extends Zend_Db_Table_Abstract
{
    protected $_primary =   'productId';
    protected $_name    =   'product';
    
    CONST STATUS    =   'ONLINE';
    
    
    public function getAllProducts($limit, Zend_Locale $locale)
    {
        $select = $this->select(Zend_Db_Table::SELECT_WITH_FROM_PART)
                ->setIntegrityCheck(false)
                ->distinct()
                ->join(array('l' => 'productLocale'),
                        'l.productId = product.productId',
                        array('product.productId AS productId', 'l.title AS productTitle', 'l.locale AS locale'))
                ->joinLeft(array('pp' => 'productPhoto'),
                        'pp.productId = product.productId',
                        array('pp.photoId'))
                ->joinLeft(array('p' => 'photo'),
                        'p.photoId = pp.photoId',
                        array('p.name AS photoFilename', 'p.type AS photoType'))                          
                ->where('l.locale = ?', $locale)
                ->limit($limit);

        return $this->fetchAll($select);
    }
    
    public function getProductsByKeyword($key, Zend_Locale $locale)
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
                        array('product.productId AS productId', 'product.price AS price', 'l.title AS title', 'l.content AS content', 'l.locale AS locale'))
                ->where('product.productId = ?', $id)
                ->where('l.locale = ?', $locale);
        
        return $this->fetchAll($select)->current();
    }



}

