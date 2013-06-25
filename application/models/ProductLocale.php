<?php

class Application_Model_ProductLocale extends Zend_Db_Table_Abstract
{
    protected $_primary =   'productLocaleId';
    protected $_name    =   'productLocale';
    
    public function addProductLocale($params, $id)
    {
        // Params for productLocale
        $content = array('productId' => $id,
                         'locale' => 'nl_BE',
                         'slug' => $params['slug'],
                         'title' => $params['title'],
                         'teaser' => $params['teaser'],
                         'content' => $params['content'],
                         'translated' => 'YES');
        
        $insert = $this->insert($content);
    }
   
    public function editProductLocale($id, $params)
    {
        // Params for productLocale
        $content = array('productId' => $id,
                         'locale' => 'nl_BE',
                         'slug' => $params['slug'],
                         'title' => $params['title'],
                         'teaser' => $params['teaser'],
                         'content' => $params['content'],
                         'translated' => 'YES');
        
        $where = $this->getAdapter()->quoteInto('productId = ?', $id); 
        $update = $this->update($content, $where);
     }
    
    public function deleteProductLocale($id)
    {
        $where = $this->getAdapter()->quoteInto('productId = ?', $id); 
        $delete = $this->delete($where);
    }

}

