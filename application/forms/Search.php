<?php

class Application_Form_Search extends Zend_Form
{
        public $processed = false;

        public function init()
        {
            $this->addElement('text', 'search', array(
            'label' => 'Search',
            'required' => true,        
            ));        

            $this->addElement('submit', 'go', array(
                'label' => 'Search',
            ));
        }
}




