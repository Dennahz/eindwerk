<?php

class PageController extends Zend_Controller_Action
{
    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function viewAction()
    {
        // get ID from URL
        $id = (int) $this->getParam('id');
        
        $lang = Zend_Registry::get('Zend_Locale');    
        
        $m_page = new Application_Model_Page();
        
        $content = $m_page->getPageById($id, $lang);      
        
        if($content !== NULL)
        {
            $this->view->content = $content;
        }
        else
        {
            // -> redirect to error page
        }
        
        
    }


}



