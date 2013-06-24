<?php

class Zend_View_Helper_LoginForm extends Zend_View_Helper_Abstract
{
    public function loginForm(Application_Form_Login $form)
    {
        $auth = Zend_Auth::getInstance();
        if(!$auth->hasIdentity())
        {            
            return $form->render();
        }
        else
        {
            $translate = Zend_Registry::get('Zend_Translate');
            
            // Show who is loggedin.
            return $translate->translate('loggedinas') . ' ' . $auth->getIdentity();            
        }
    }
}
