<?php

class Zend_View_Helper_SearchForm extends Zend_View_Helper_Abstract
{
    public function searchForm(Application_Form_Search $form)
    {
        if($form->processed) 
        {
        }
        else
        {
            return $form->render();
        }
    }
}
