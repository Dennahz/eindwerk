<?php

class Application_Controller_Helper_Search extends Zend_Controller_Action_Helper_Abstract
{
    public function preDispatch()
    {
        $view = $this->getActionController()->view;
        $form = new Application_Form_Search();
        
        
        $request = $this->getActionController()->getRequest();
        
        
        if($request->isPost() && $request->getPost('search')) {            
            if($form->isValid($request->getPost())) {
                $data = $form->getValues();
                
                $keyword = $data['search'];
                
                
                 $request = $this->getActionController()->getRequest();
                    $urlOptions = array('controller' => 'overview', 
                    'action' => 'search',
                    'lang' => 'nl_BE',
                    'keyword' => $keyword);
                
                
                $redirector = new Zend_Controller_Action_Helper_Redirector();
                $redirector->gotoUrl('/nl_BE/search/' . $keyword);
                 
                 
            }
        }
    

    $view->searchForm = $form;
    }
}