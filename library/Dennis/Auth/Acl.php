<?php

class Dennis_Auth_Acl extends Zend_Controller_Plugin_Abstract
{
    public function preDispatch(\Zend_Controller_Request_Abstract $request)
    {
        $acl = new Zend_Acl();
        
        //$model_roles = new Application_Model_Roles();
        
        $roles = array('GUEST', 'USER', 'DEALER', 'ADMIN');    // Nu even vaste roles, maar kan ook uit de database.
        
        /* $model_controllers = new Application_Model_Controllers();
        $controllers = $model_controllers->getControllers(); */
        
        $controllers = array('Index', 'error', 'basket', 'order', 'overview', 'noaccess', 'admin:index', 'admin:product');
        
        foreach($roles as $role)
        {
            $acl->addRole($role);         
        }
        
        foreach($controllers as $controller)
        {
            //$acl->addResource($controller); kan ook
            $acl->add(new Zend_Acl_Resource($controller)); //Nieuwe resource toevoegen waar rechten aan toegevoegd kunnen worden
                        
        }          
        
          
        
        $acl->allow('ADMIN'); //Acces to everything, without controller specified
        $acl->allow('USER');
        $acl->allow('GUEST'); 
        
        
        /*$acl->allow('USER', 'Page'); //Normal user has no acces to admin panel            
        $acl->allow('USER', 'Users');            */
            
        Zend_Registry::set('Zend_Acl', $acl); 
    }    
}

?>
