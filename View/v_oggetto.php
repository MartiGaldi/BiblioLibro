<?php

/**
 * La classe v_oggetto contiene gli attributi e le funzioni base adoperati in tutto il package View:
 * -Metodo per la visualizzazione di una pagina di errore
 * -Istanzia l'oggetto Smarty adoperato alla visualizzazione dei template .tpl.
 */

class v_oggetto
{
    /** l'oggetto smarty incaricato di visualizzare i template */
    
    protected $smarty;
    
    
    /** un array avente come indice i campi delle form di cui controllare gli errori. Ogni classe lo definira' secondo le sue esigenze */
    
    protected $check;
    
    
    protected function __construct()
    {
        $this->smarty = SmartyConfig::configura();
        // l'array � istanziato con indici i campi delle varie form
    }
    
    /**
     * Mostra una pagina di errore, 
     * funzione da richiamare se un utente sta visualizzando una pagina che non risulta essere di sua competenza
     * @param e_utente $utente l'utente della sessione
     * @param string $errore il messaggio di errore da visualizzare
     */
    
    function Errore(e_utente &$utente, string $errore)
    {
        $this->smarty->registerObject('utente', $utente);
        $this->smarty->assign('uTipo', lcfirst(substr(get_class($utente), 2)));
        $this->smarty->assign('errore', $errore);
        $this->smarty->display('Errore.tpl');
    }
	
	/**
     * Mostra una pagina di avviso, 
     * @param e_utente $utente l'utente della sessione
     * @param string $avviso il messaggio di avviso da visualizzare
     */
	function Avviso(e_utente &$utente, string $avviso)
    {
        $this->smarty->registerObject('utente', $utente);
        $this->smarty->assign('uTipo', lcfirst(substr(get_class($utente), 2)));
        $this->smarty->assign('avviso', $avviso);
        $this->smarty->display('Avviso.tpl');
    }
}

?>