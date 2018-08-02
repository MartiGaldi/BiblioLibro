<?php

class SmartyConfig
{
    static function configura() : Smarty
    { 
		//carca la classe smarty
        require('lib/Smarty/Smarty.class.php');
        
        $smarty = new Smarty();
        
		//imposta le variabili d'ambiente
        $smarty->setTemplateDir('smarty/templates');
        $smarty->setCompileDir('smarty/templates_c');
        $smarty->setCacheDir('smarty/cache');
        $smarty->setConfigDir('smarty/configs');
        
        return $smarty;  
    }   
}