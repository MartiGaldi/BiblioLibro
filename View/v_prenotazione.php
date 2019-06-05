<?php

require_once 'inc.php';
include_once 'View/v_oggetto.php';

/**
 * La classe v_prenotazione si occupa dell'input-output per quanto riguarda i dati riguardanti le prenotazioni.
 * @author gruppo 11
 * @package View
 */
 
class v_prenotazione extends v_oggetto
{
    
    function __construct()
    {
        parent::__construct();
        
    }
    
	/**
     * Mostra la pagina che consente la conferma della prenotazione
     * @param e_utente $utente l'utente della sessione
     * @param e_libro $libro il testo relativo alla prenotazione
     */
    
    function mostraConfermaPrenotazione(e_utente &$utente, e_libro &$libro) 
    {
        $this->smarty->registerObject('utente', $utente);
        $this->smarty->assign('libro', $libro);
        $this->smarty->assign('uTipo', lcfirst(substr(get_class($utente), 2)));
        $this->smarty->display('prenotazione/confermaPrenotazione.tpl');
    }
    
	/**
	 * funzione per validare o no la prenotazione
	 */
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
