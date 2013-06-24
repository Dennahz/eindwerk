<?php

class Admin_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        $this->_helper->Layout()->setLayout('admin');
    }

    public function indexAction()
    {
        $limit = 0;
        $lang = Zend_Registry::get('Zend_Locale'); 
        
        // All products
        $m_product = new Application_Model_Product();
        $this->view->products = $m_product->getAllProducts($limit, $lang);
    }


}

