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
        
        if( (int) $id = $this->getParam('id'))
        {
            $m_product  = new Application_Model_Product();
            $this->view->product = $m_product->getProductById($id, $lang);                    
        }
        else
        {
            die("ERROR");
        }
    }


}





