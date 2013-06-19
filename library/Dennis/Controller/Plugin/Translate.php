<?php


/**
 * Description of Translate
 *
 * @author webmaster
 */
class Dennis_Controller_Plugin_Translate extends Zend_Controller_Plugin_Abstract
{
    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
        $lang = $request->getParam('lang');
        if(empty($lang))
        {
            $lang = 'nl_BE';            
        }
        else
        {
            $lang = $request->getParam('lang');
        }
        
        $locale = new Zend_Locale($lang);
        
        //Maak beschikbaar voor alle Zend componenten, overal beschikbaar
        Zend_Registry::set('Zend_Locale', $locale);
                
        
        $translate = new Zend_Translate('array', array('yes' => 'ja', $locale)); //Verwacht sowieso 1 input, vandaar array.
        
        $model = new Application_Model_Translate();
        
        //Haal alle vertalingen op voor de huidige 'locale' (uit db)
        $translations = $model->getTranslationByLocale($locale);
        
        // Alle vertalingen toevoegen aan het translate object
        foreach($translations as $translation)
        {
            $t = array($translation->tag => $translation->translation);
            $translate->addTranslation($t, $locale);
        }
        
        
        //Maak overal beschikbaar
        Zend_Registry::set('Zend_Translate', $translate);
    }
}

?>
