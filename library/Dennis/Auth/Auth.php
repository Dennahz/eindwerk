<?php

class Dennis_Auth_Auth extends Zend_Controller_Plugin_Abstract{
    
    public function preDispatch(\Zend_Controller_Request_Abstract $request)
    {
        $loginController = 'Users';
        $loginAction     = 'Login';
        $locale          = Zend_Registry::get('Zend_Locale');
        $auth            = Zend_Auth::getInstance();
        
        
     
                
                if($auth->hasIdentity())
                {
                    $registry = Zend_Registry::getInstance();
                    $acl = $registry->get('Zend_Acl');                    
                    $identity = $auth->getIdentity();
                    
                    $m_user = new Application_Model_User();
                    $user = $m_user->getUserByIdentity($identity);
                    Zend_Registry::set('user', $user);
                    
                    $role = $user->role;        
                    
                    
                    //Role is een veld binnen onze usertabel
                    if($request->getModuleName() !== 'default' && $request->getModuleName() !== NULL)
                    {
                        
                        
                        $isAllowed = $acl->isAllowed($role,
                                $request->getModuleName() .':'.
                                $request->getControllerName(),
                                $request->getActionName());
                    }
                    else
                    {
                        
                      $isAllowed = $acl->isAllowed($role,                                
                                $request->getControllerName(),
                                $request->getActionName());    
                      
                      
                      
                    }
                    
                    
                    //var_dump($isAllowed);
                    //die;
                    if(!$isAllowed)
                    {
                        $redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('redirector');
                        $redirector->gotoUrl('http://www.google.be');                        
                        
                    }
                    else
                    {
                       
                    }
                }                
                
    }
}

?>
