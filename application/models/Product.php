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
                        array('product.productId AS productId', 'product.price AS productPrice', 'l.title AS productTitle', 'l.locale AS locale'))
                ->joinLeft(array('pp' => 'productPhoto'),
                        'pp.productId = product.productId',
                        array('pp.photoId'))
                ->joinLeft(array('p' => 'photo'),
                        'p.photoId = pp.photoId',
                        array('p.name AS photoFilename', 'p.type AS photoType'))                          
                ->where('l.locale = ?', $locale)
                ->limit($limit)
                ->group('product.productId');

        return $this->fetchAll($select);
    }
    
    public function getProductsByKeyword($key, Zend_Locale $locale)
    {
        $select = $this->select(Zend_Db_Table::SELECT_WITH_FROM_PART)
                ->setIntegrityCheck(false)
                ->joinLeft(array('l' => 'productLocale'),
                        'l.productId = product.productId',
                        array('product.productId AS productId', 'l.title AS title', 'l.teaser AS teaser', 'l.locale AS locale'))
                ->joinLeft(array('pp' => 'productPhoto'),
                        'pp.productId = product.productId',
                        array('pp.photoId'))
                ->joinLeft(array('p' => 'photo'),
                        'p.photoId = pp.photoId',
                        array('p.name AS photoName', 'p.type AS photoType'))     
                ->where('l.title = ?', $key)
                ->orwhere('l.content LIKE "%' . $key . '%"')
                ->where('l.locale = ?', $locale)
                ->group('product.productId');
        
        return $this->fetchAll($select);
    }
    
    public function getProductById($id, Zend_Locale $locale)
    {
        $select = $this->select(Zend_Db_Table::SELECT_WITH_FROM_PART)
                ->setIntegrityCheck(false)
                ->joinLeft(array('l' => 'productLocale'),
                        'l.productId = product.productId',
                        array('product.productId AS productId', 'product.price AS price', 'l.title AS title', 'l.content AS content', 'l.locale AS locale'))
                ->joinLeft(array('pp' => 'productPhoto'),
                        'pp.productId = product.productId',
                        array('pp.photoId'))
                ->joinLeft(array('p' => 'photo'),
                        'p.photoId = pp.photoId',
                        array('p.name AS photoFilename', 'p.type AS photoType'))  
                ->where('product.productId = ?', $id)
                ->where('l.locale = ?', $locale)
                ->group('product.productId');
 
        
        return $this->fetchAll($select)->current();
    }
    
    public function getProductBySlug($slug, Zend_Locale $locale)
    {
        $select = $this->select(Zend_Db_Table::SELECT_WITH_FROM_PART)
                ->setIntegrityCheck(false)
                ->join(array('l' => 'productLocale'),
                        'l.productId = product.productId',
                        array('product.productId AS productId', 'product.price AS price', 'l.slug', 'l.title AS title', 'l.content AS content', 'l.locale AS locale'))
                ->joinLeft(array('pp' => 'productPhoto'),
                        'pp.productId = product.productId',
                        array('pp.photoId'))
                ->joinLeft(array('p' => 'photo'),
                        'p.photoId = pp.photoId',
                        array('p.name AS photoFilename', 'p.type AS photoType'))  
                ->where('l.slug = ?', $slug)
                ->where('l.locale = ?', $locale)
                ->group('product.productId');
 
        return $this->fetchAll($select)->current();
    }
    
    public function addNewProduct($params)
    {
        // Params for table 'product'
        $product = array('label' => null,
                         'status' => $params['status'],
                         'price' => $params['price']);
                
        $insert = $this->insert($product);
        return $insert;
    }
    
    public function deleteProduct($id)
    {
        $where = $this->getAdapter()->quoteInto('productId = ?', $id); 
        $delete = $this->delete($where);
    }
}

