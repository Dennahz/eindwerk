<?php

class Application_Controller_Helper_Login extends Zend_Controller_Action_Helper_Abstract
{
    public function preDispatch()
    {
        $view = $this->getActionController()->view;
        $form = new Application_Form_Login();
        
        $request = $this->getActionController()->getRequest();
        
        if($request->isPost() && $request->getPost('submit')) {            
            if($form->isValid($request->getPost())) {
                $data = $form->getValues();
                
                $auth = Zend_Auth::getInstance();
                
                // Meegeven welke database driver we gebruiken.
                $authAdapter = new Zend_Auth_Adapter_DbTable(Zend_Registry::get('db'));
                
                $authAdapter->setTableName('user')
                        ->setIdentityColumn('username')
                        ->setCredentialColumn('password')
                        ->setIdentity($data['username'])
                        ->setCredential($data['password']);
                
                
                $result = $auth->authenticate($authAdapter);
                
                if($result->isValid())
                {
                    
                }
                else
                {
                    die("FOUT!!!!");
                }
               
                
                 $request = $this->getActionController()->getRequest();
                $urlOptions = array('controller' => 'index', 
                    'action' => 'index'
                    );
                
                $redirector = new Zend_Controller_Action_Helper_Redirector();
                $redirector->gotoRouteAndExit($urlOptions, null, false);
            }
        }
        
        
    
        /* $postParams = $this->getRequest()->getPost(); //$_POST
            if($this->view->form->isValid($postParams))
            {
                $params = $this->view->form->getValues();
                
                $auth = Zend_Auth::getInstance();
                
                //$registry = Zend_Registry::getInstance();


                // Meegeven welke database driver we gebruiken.
                $authAdapter = new Zend_Auth_Adapter_DbTable(Zend_Registry::get('db'));
                
                
                $authAdapter->setTableName('users') //Tabelnaam
                        ->setIdentityColumn('username') //Column for username
                        ->setCredentialColumn('password') //Column for password
                        ->setIdentity($params['login']) //Vergelijken met $_POST['login']
                        ->setCredential($params['password']); //Vergelijken met $_POST['password']
                
                //Login uitvoeren
                $result = $auth->authenticate($authAdapter);
                
                if($result->isValid())
                {
                    //Ingelogd.
                    echo 'U bent ingelogd';
                } */

    $view->loginForm = $form;
    }
}