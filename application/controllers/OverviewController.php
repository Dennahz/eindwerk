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
        $lang = $this->getParam('lang');
        
        $m_product = new Application_Model_Product();       
        $this->view->result = $m_product->getProductsByKeyword($key, $lang);    
    }


}



