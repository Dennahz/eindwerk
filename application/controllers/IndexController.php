<?php

class IndexController extends Zend_Controller_Action
{

    CONST LIMIT_CATS        =   5;
    CONST LIMIT_PRODUCTS    =   9;
    CONST LOCALE            =   'nl_BE'; // Totdat dat alle locale systeem op punt staat. 1 == NL, 2 == Engels, ... 
    
    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $lang = Zend_Registry::get('Zend_Locale');   
        
        
        
        // Get category's
        $m_cat = new Application_Model_Category();
        $this->view->cat = $m_cat->getAllCategorys(self::LIMIT_CATS, $lang);
        
        // Get random products
        $m_product = new Application_Model_Product();
        $this->view->product = $m_product->getAllProducts(self::LIMIT_PRODUCTS, $lang);
        
        
    }


}

