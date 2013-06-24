<?php

class Admin_ProductController extends Zend_Controller_Action
{
    public function init()
    {
        $this->_helper->Layout()->setLayout('admin');
    }

    public function indexAction()
    {
        // action body
    }
    
    public function addproductAction()
    {
        $m_locale = new Application_Model_Locale();
        
        $locales = $m_locale->getAllLocales();
        
        /* Create form with all locales.
        $form = new admin_Form_Addproduct(array('locales' => $locales)); */
        
        // Get form
        $form = new admin_Form_Addproduct();
        $this->view->form = $form;
        
        if($this->getRequest()->getPost())
        {  
            $postParams = $this->getRequest()->getPost(); //$_POST
            if($this->view->form->isValid($postParams))
            {             
                /* I know this isn't the best way of doing this... */
                $m_product = new Application_Model_Product();
                $insert = $m_product->addNewProduct($postParams);
                $id = $m_product->getAdapter()->lastInsertId();
                
                $m_productLocale = new Application_Model_ProductLocale();
                $insert2 = $m_productLocale->addProductLocale($postParams, $id);
                
                $this->_redirect($this->view->url(array('controller' => 'index', 'action' => 'index', 'params' => array())));

            }
        }
    }
    
    public function deleteAction()
    {
        $id = $this->getParam('id');
        
        $m_product = new Application_Model_Product();
        $delete = $m_product->deleteProduct($id);
        
        $m_productLocale = new Application_Model_ProductLocale();
        $delete2 = $m_productLocale->deleteProductLocale($id);
        
        $this->_redirect($this->view->url(array('controller' => 'index', 'action' => 'index', 'params' => array())));
    }


}

