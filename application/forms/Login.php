<?php

class Application_Form_Login extends Zend_Form
{
    public $processed = false;   
    
    public function init()
    {
        $this->addElement('text', 'username', array(
            'label' => 'login.username',
            'required' => true,        
            ));        
        
        $this->addElement('password', 'password', array(
            'label' => 'login.password',
            'required' => true,        
            ));        

            $this->addElement('submit', 'submit', array(
                'label' => 'login.submit',
            ));
    }


}

