<?php

class Zend_View_Helper_LoginForm extends Zend_View_Helper_Abstract
{
    public function loginForm(Application_Form_Login $form)
    {
        if($form->processed) 
        {
        }
        else
        {
            return $form->render();
        }
    }
}
