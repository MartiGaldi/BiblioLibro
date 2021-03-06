<?php
require_once 'inc.php';
include_once 'View/v_oggetto.php';

/**
 * La classe v_cerca si occupa dell'input-output per quanto riguarda la funzionalitą di ricerca
 * all'interno del catalogo.
 * @author gruppo 11
 * @package View
 */

class v_ricerca extends v_oggetto
{
    function __construct()
    {  
        parent::__construct(); 
    }
    
    
    /**
     * Restituisce il valore inserito dall'utente nella barra da ricerca. E' contenuto nell'array globale $_GET
     * @return string contenente il valore inserito dall'utente, se presente
     */
    
    function getValoreRicerca() : string
    {
        $string = "";
        if(isset($_REQUEST['str']))
        { 
			// se l'utente ha inviato tramite GET un valore di ricerca, si ricava la stringa
            $string = $_GET['str'];
        }
        return $string;  
    }
    
    
    /**
     * Ritorna la chiave scelta dall'utente nella ricerca avanzata, contenuta nell'array globale $_GET.
     * @return array avente come valore la chiave e il valore
     */
    
    function getKeyAndValue() : array
    {
        $key="";
        $value="";
        
        if($_GET['value'] == 'titolo' || $_GET['value'] == 'autore' || $_GET['value'] == 'nome')
			$value = ucfirst($_GET['value']);
        if($_GET['key'] == 'libro' || $_GET['key'] == 'utente'  )
            $key=ucfirst($_GET['key']);
        
        return array($key, $value);    
    }
    
    
    
    /**
     * Mostra i risultati della ricerca
     * @param e_utente $utente l'utente della sessione
     * @param array $array contenente i risultati della ricerca | NULL se nessun oggetto e' stato costruito
     * @param string $key la chiave di ricerca adoperata
     * @param string $string il dato ricercato dall'utente
     */
    
    function mostraRisultatoRicerca (e_utente &$utente, $array, string $key, string $value, string $string)
    {
        $this->smarty->assign('key', $key);
        $this->smarty->assign('value', $value);
        $this->smarty->assign('string', $string);
        
        $this->smarty->registerObject('utente', $utente);
        $this->smarty->assign('uTipo', lcfirst(substr(get_class($utente), 2)));
        
        $this->smarty->assign('array', $array);
        
        //mostro il contenuto della pagine
        $this->smarty->display('ricerca/ricerca.tpl');  
    }
    
    /**
	 * Mostra i risultati della ricerca avanzata
	 */
    function mostraRicercaAvanzata(e_utente &$utente)
    {
        $this->smarty->registerObject('utente', $utente);
        $this->smarty->assign('uTipo', lcfirst(substr(get_class($utente), 2)));
        
        //mostro il contenuto della pagine
        $this->smarty->display('ricerca/ricercaAvanzata.tpl');   
    }
}
?>