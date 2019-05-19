<?php

require_once 'inc.php';
include_once 'View/v_oggetto.php';

class v_prenotazione extends v_oggetto
{
    
    function __construct()
    {
        parent::__construct();
        
    }
    
    function mostraConfermaPrenotazione(e_utente &$utente, e_libro &$libro) 
    {
        $this->smarty->registerObject('utente', $utente);
        $this->smarty->assign('libro', $libro);
        $this->smarty->assign('uTipo', lcfirst(substr(get_class($utente), 2)));
        $this->smarty->display('prenotazione/confermaPrenotazione.tpl');
    }
    
    function validaScelta() : bool
    {
        if(isset($_POST['action']))
        {
            if($_POST['action']=='yes')
                return true;
            else
                return false;
        }
        else
            return false;
    }   
}