<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    public function _initSession()
    {
        Zend_Session::start();        
    }
    
    protected function _initRegisterControllerPlugins()
    {
        $this->bootstrap('frontcontroller');
        $front = $this->getresource('frontcontroller');
        
        $front->registerPlugin(new Dennis_Controller_Plugin_Translate());
        $front->registerPlugin(new Dennis_Controller_Plugin_Navigation());
        $front->registerPlugin(new Dennis_Auth_Acl());
        $front->registerPlugin(new Dennis_Auth_Auth());
    }
    
    protected function _initMyActionHelpers()
    {        
        $this->bootstrap('frontController');
        
        // search
        $search = Zend_Controller_Action_HelperBroker::getStaticHelper('Search');
        Zend_Controller_Action_HelperBroker::addHelper($search);
        
        // login
        $login  =   Zend_Controller_Action_HelperBroker::getStaticHelper('Login');
        Zend_Controller_Action_HelperBroker::addHelper($login);       
    }
    

    public function _initDbAdapter()
    {
        $this->bootstrap('db');
        $db = $this->getResource('db');
        //Maak een soort van globale variabele
        Zend_Registry::set('db', $db);
    }
    
    /**
     * Creates all custom routes
     * @return Zend_Controller_Router_Route
     */
    
    public function _initRouter(array $options = null)
    {
  
        $router = $this->getResource('frontcontroller')->getRouter();

        // add custom route
        // ':' before param = $_GET
        $router->addRoute('front', new Zend_Controller_Router_Route(':lang', array(
            'controller' => 'index',
            'action' => 'index',
            'lang' => 'lang'
        )));
                
         $router->addRoute('login', new Zend_Controller_Router_Route(':lang/login', array(
            'controller' => 'user',
            'action' => 'login'
        )));
         
         $router->addRoute('logout', new Zend_Controller_Router_Route(':lang/logout', array(
            'controller' => 'user',
            'action' => 'logout'
        )));
 
        $router->addRoute('page', new Zend_Controller_Router_Route(':lang/page/:slug', array(
            'controller' => 'page',
            'action' => 'view',
            'slug' => 'slug'
        )));
        
        $router->addRoute('product', new Zend_Controller_Router_Route(':lang/product/:slug', array(
            'controller' => 'overview',
            'action' => 'viewProduct',
            'slug' => 'slug'
        )));
        
        $router->addRoute('addtobasket', new Zend_Controller_Router_Route(':lang/addtobasket/:slug', array(
            'controller' => 'basket',
            'action' => 'additem',
            'slug' => 'slug'
        )));
        
        $router->addRoute('emptybasket', new Zend_Controller_Router_Route(':lang/emptybasket', array(
            'controller' => 'basket',
            'action' => 'emptybasket',
            
        )));
        
        $router->addRoute('product', new Zend_Controller_Router_Route(':lang/product/:slug', array(
            'controller' => 'overview',
            'action' => 'viewProduct',
            'slug' => 'slug'
        )));

        
   
    }
}

