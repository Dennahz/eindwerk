<?php

class OrderController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // Order 
        
        // Only users with access can be here, so no check needed. Thanks Zend_Auth/Acl!        
        $sessionDennis = new Zend_Session_NameSpace('sessionDennis');
        
        // Check if there is a basket
        if(!isset($sessionDennis->basket))
        {
            die("Geen mandje ?");
        }
        
        // Give content of basket
        $this->view->basket = $sessionDennis->basket;
    }

    public function orderAction()
    {
        // action body
    }


}



