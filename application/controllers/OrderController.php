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
        
        $this->view->message = 'Uw bestelling is opgeslagen, u krijgt bevestiging binnen de 24u';
        
        $tr = new Zend_Mail_Transport_Smtp('relay.skynet.be');
        Zend_Mail::setDefaultTransport($tr);
        
        // Dit is absoluut niet de netste manier (understatement), normaal komen mail templates uit de db.
        $html = '<html>';
        $html .= '<head></head>';
        $html .= '<body>';
        $html .= '<h1>Bestelling bij webshop</h1>';
        $html .= 'Windows bladiebla'; 
        
        $mail = new Zend_Mail();
        $mail->setBodyText('Schakel HTML in om deze mail te lezen.');
        $mail->setBodyHtml($html);
        $mail->setFrom('dennis@dirksma.nl', 'Webshop');
        $mail->addTo('dennis@dirksma.nl', 'Naam');
        $mail->setSubject('Uw bestelling bij webshop');
        $mail->send();
        //$this->view->message = 'Er is iets fout gegaan, probeer het later nog eens.';
        
        
    }

    public function orderAction()
    {
        // Get basket from session
        $sessionDennis = new Zend_Session_NameSpace('sessionDennis');        
        $basket = $sessionDennis->basket;
        
        
        
    }


}



