<?php

class PageController extends Zend_Controller_Action
{
    public function init()
    {
        
    }

    public function indexAction()
    {
        // action body
    }

    public function viewAction()
    {
        // get slug from URL
        $slug = $this->getParam('slug');
          
        $lang = Zend_Registry::get('Zend_Locale');   
        $m_page = new Application_Model_Page();

        $content = $m_page->getPageBySlug($slug, $lang);      

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



