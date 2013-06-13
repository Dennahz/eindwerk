<?php


class Syntra_Controller_Plugin_Navigation extends Zend_Controller_Plugin_Abstract
{
    public function preDispatch(\Zend_Controller_Request_Abstract $request)
    {        
        
        $locale = Zend_Registry::get('Zend_Locale');
        $model = new Application_Model_Page();
        
        $pages = $model->getMenu($locale);
        
        $container = new Zend_Navigation();
        
        foreach($pages as $page)
        {
            $menu = new Zend_Navigation_Page_Mvc(
                    array(            
                        'label' => $page['title'],
                        //'controller' => 'Index',
                        'route' => 'page',
                        'params' => array('slug' => $page['slug'],
                                          'lang' => $locale)
            ));            
           
            $container->addPage($menu);
        }
        
        Zend_Registry::set('Zend_Navigation', $container);
    }
            
}

?>
