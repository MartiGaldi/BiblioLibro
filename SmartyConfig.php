<?php

class SmartyConfig
{
    static function configura() : Smarty
    { 
        require('lib/Smarty/Smarty.class.php');
        
        $smarty = new Smarty();
        
        $smarty->setTemplateDir('smarty/templates');
        $smarty->setCompileDir('smarty/templates_c');
        $smarty->setCacheDir('smarty/cache');
        $smarty->setConfigDir('smarty/configs');
        
        return $smarty;  
    }   
}