<?php

class Application_Model_Photo extends Zend_Db_Table_Abstract
{
    protected $_primary   =   'photoId';
    protected $_name      =   'photo';
    
    
    public function getPhotoByProductId($id, $lang)
    {
        $select = $this->select(Zend_Db_Table::SELECT_WITH_FROM_PART)
                ->setIntegrityCheck(false)
                ->joinLeft(array('pp' => 'productPhoto'),
                        'pp.photoId = photo.photoId',
                        array('pp.photoId', 'photo.name AS photoName', 'photo.type AS photoType'))
                ->where('pp.productId = ?', $id);
        
        return $this->select($select);                      
    }
    
}

