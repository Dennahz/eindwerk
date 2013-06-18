<?php

class Admin_Form_Addproduct extends Zend_Form
{
    protected $_locales = null;
    
    /**
     * Set Locales array
     * @param array $locales
     */
    
    public function setLocales($locales)
    {
        $this->_locales = $locales;
    }
    
    public function init()
    {
        $this->setMethod(Zend_Form::METHOD_POST);
        $this->setAttrib('enctype', Zend_Form::ENCTYPE_MULTIPART);
        
        $this->addElement('text', 'price', array(
            'label' => 'Prijs',
            'required' => true
        ));
        
        foreach($this->_locales as $locale)
        {           
            $this->addElement('text', 'title[' . $locale['localeId'] . ']', array(
            'label' => 'Titel ' . $locale['name'] . '',
            'required' => false,        
            ));        
            
            $this->addElement('text', 'teaser[' . $locale['localeId'] . ']', array(
            'label' => 'Teaser ' . $locale['name'] . '',
            'required' => false,        
            ));        
            
            $this->addElement('textarea', 'content[' . $locale['localeId'] . ']', array(
            'label' => 'Content ' . $locale['name'] . '',
            'required' => false,      
            'cols' => 40,
            'rows' => 5
            ));    

        }    
            
        $this->addElement('file', 'photo1', array(
            'label' => 'Foto 1',
            'required' => false
        ));
        
        $this->addElement('file', 'photo2', array(
            'label' => 'Foto 2',
            'required' => false
        ));
        
        $this->addElement('file', 'photo3', array(
            'label' => 'Foto 3',
            'required' => false
        ));
        
        $this->addElement('submit', 'Opslaan', array(
            'label' => 'save',
        ));
    }
}

