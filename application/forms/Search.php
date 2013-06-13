<?php

class Application_Form_Search extends Zend_Form
{
        public      $processed = false;        
        //protected   $translate = Zend_Registry::get('Zend_Translate');
        
        public function init()
        {
            
            
            $this->addElement('text', 'search', array(
            'label' => 'Zoeken',
            'required' => true,        
            ));        

            $this->addElement('submit', 'go', array(
                'label' => 'Zoeken',
            ));
        }
}




