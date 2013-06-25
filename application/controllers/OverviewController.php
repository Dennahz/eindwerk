<?php

class OverviewController extends Zend_Controller_Action
{
    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function searchAction()
    {
        $key = $this->getParam('keyword');   
        $lang = Zend_Registry::get('Zend_Locale');
        
        $m_product = new Application_Model_Product();       
        $this->view->result = $m_product->getProductsByKeyword($key, $lang);    
    }

    public function viewproductAction()
    {
        $lang = Zend_Registry::get('Zend_Locale');
        
        $slug = $this->getParam('slug');
        
        
        $m_product  = new Application_Model_Product();
        $product = $m_product->getProductBySlug($slug, $lang); 
        $this->view->product =   $product;
            
        
        $m_photo    = new Application_Model_Photo();
        $this->view->photos = $m_photo->getPhotoByProductId($product['productId'], $lang);
    }


}





