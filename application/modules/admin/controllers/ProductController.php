<?php

class Admin_ProductController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }
    
    public function addproductAction()
    {
        $m_locale = new Application_Model_Locale();
        
        $locales = $m_locale->getAllLocales();
        
        $form = new admin_Form_Addproduct(array('locales' => $locales));
        $this->view->form = $form;
        
        if($this->getRequest()->getPost())
        {  
            $postParams = $this->getRequest()->getPost(); //$_POST
            if($this->view->form->isValid($postParams))
            {
                var_dump($postParams);
                
                
                $m_product = new Application_Model_Product();
                $insert = $m_product->addNewProduct($params);
                
                foreach($locales as $locale)
                {
                    // Process input by locale_id
                }               
                
                echo '<pre>';
                die(var_dump($params));
                echo '</pre>';
            }
        }
    }


}

