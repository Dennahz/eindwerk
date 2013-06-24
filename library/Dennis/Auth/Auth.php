<?php

class Dennis_Auth_Auth extends Zend_Controller_Plugin_Abstract{
    
    public function preDispatch(\Zend_Controller_Request_Abstract $request)
    {
        $loginController = 'Users';
        $loginAction     = 'Login';
        $locale          = Zend_Registry::get('Zend_Locale');
        $auth            = Zend_Auth::getInstance();
        
        $registry = Zend_Registry::getInstance();
        $acl = $registry->get('Zend_Acl');
        
        if(!$auth->hasIdentity())
        {
            $role = "GUEST";
        }
        else
        {
            $acl = $registry->get('Zend_Acl');                    
            $identity = $auth->getIdentity();
                    
            $m_user = new Application_Model_User();
            $user = $m_user->getUserByIdentity($identity);
            Zend_Registry::set('user', $user);
                    
            $role = $user->role;     
        }
                
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

        if(!$isAllowed)
        {
            $urlOptions = array('controller' => 'user', 
                    'action' => 'login',
                    'lang' => 'nl_BE',
                    );
                
                $redirector = new Zend_Controller_Action_Helper_Redirector();
                $redirector->gotoRouteAndExit($urlOptions, null, false);                        
        }
        else
        {
                       
        }                  
    }
}

?>
