<?php

class Dennis_Auth_Acl extends Zend_Controller_Plugin_Abstract
{
    public function preDispatch(\Zend_Controller_Request_Abstract $request)
    {
        $acl = new Zend_Acl();
        
        $model_roles = new Application_Model_Roles();
        $roles = $model_roles->getRoles();
        
        
        //$roles = array('GUEST', 'USER', 'ADMIN');    
        
        $model_controllers = new Application_Model_Controllers();
        $controllers = $model_controllers->getControllers();
        //$controllers = array('Users', 'index', 'Page', 'error', 'noaccess', 'Admin:index');
        
        foreach($roles as $role)
        {
            $acl->addRole($role['name']);         
        }
        
        foreach($controllers as $controller)
        {
            //$acl->addResource($controller); kan ook
            $acl->add(new Zend_Acl_Resource($controller['name'])); //Nieuwe resource toevoegen waar rechten aan toegevoegd kunnen worden
                        
        }          
        
            
        $model_rights = new Application_Model_Rights();
        $rights = $model_rights->getAllRights();
        
        
        
          
        
        $acl->allow('ADMIN'); //Acces to everything, without controller specified
        $acl->deny('USER');  //Deny acces to everything, without controller specified
        
        
        /*$acl->allow('USER', 'Page'); //Normal user has no acces to admin panel            
        $acl->allow('USER', 'Users');            */
            
        Zend_Registry::set('Zend_Acl', $acl); 
    }    
}

?>
