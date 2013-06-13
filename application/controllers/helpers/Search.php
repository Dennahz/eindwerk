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
                // process data

                $form->processed = 1;
            }
        }
    

    $view->searchForm = $form;
    }
}