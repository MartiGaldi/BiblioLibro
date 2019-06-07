<?php
require_once 'inc.php';
include_once 'View/v_oggetto.php';


/**
 * La classe v_storico si occupa dell'input-output per quanto riguarda i dati riguardanti gli storici.
 * @author gruppo 11
 * @package View
 */
class v_storico extends v_oggetto
{
    
    /**
     * Costruttore che inizializza il componente view e definisce l'array contenente gli errori
     * che possono essere commessi nella form di caricamento/modifica storici
     */
    
    function __construct()
    {
        parent::__construct();
        
       // l'array è istanziato con indici i campi delle varie form, i cui valori sono di default a false (no errori)
        $this->check = array(
			'idPrestito' => true
        );
    }
    
    

    /**
     * Funzione che crea un prestito storico a partire dagli input della form.
     * @return e_storico
     */
    
    function creaStorico() : e_storico
    {
        $storico = new e_storico();
		
		if(isset($_POST['idPrestito']))
            $storico->setIdPrestito(ucfirst($_POST['idPrestito']));
                    
        if (isset($_POST['idPrestito']))
        {
			$storico->setIdPrestito(ucfirst($_POST['idPrestito']));
        }     
        return $storico;
    }
    
    
    
    /**
     * Mostra la pagina che consente l'inserimento di uno storico da parte di un bibliotecario
     * @param e_utente $utente l'utente della sessione
     * @param bool $errore facoltativo, da impostare a true se il biblitecario ha inserito
     * un titolo di uno storico gia' inserito da lui
     */
    
    function mostraFormCarica (e_utente &$utente, bool $errore = NULL)
    {
        if (! $errore) 
           $errore = false;
            
            $this->smarty->registerObject('utente', $utente);
            $this->smarty->assign('uTipo', lcfirst(substr(get_class($utente), 2)));
            
            $this->smarty->assign('errore', $errore);
            $this->smarty->assign('check', $this->check);
            
            $this->smarty->display('storico/caricaStorico.tpl');   
    }
    
    
    
    /**
     * Mostra la pagina che consente la modifica di uno storico da parte di un bibliotecario
     * @param e_utente $utente l'utente della sessione
     * @param e_storico $storico lo storico da modificare
     * @param bool $error facoltativo, da impostare a true se l'utente ha inserito uno storico
     * gia' inserito
     */
    
    function mostraFormModifica (e_utente &$utente, e_storico &$storico, bool $errore= NULL)
    {
        if (! $errore)
        { $errore = false;}
            
            $this->smarty->registerObject('utente', $utente);
            $this->smarty->assign('storico', $storico);
                    
            $this->smarty->assign('uTipo', lcfirst(substr(get_class($utente), 2)));
            $this->smarty->assign('errore', $errore);
			$this->smarty->assign('check', $this->check);
                     
            $this->smarty->display('storico/modificaStorico.tpl');      
    }
    
    
    
    /**
     * Mostra la pagina che consente la rimozione di uno storico da parte di un bibliotecario
     * @param e_utente $utente: l'utente della sessione
     * @param e_storico $storico: lo storico da rimuovere
     */
    
    function mostraFormRimuovi(e_utente &$utente, e_storico &$storico)
    {
        $this->smarty->registerObject('utente', $utente);
        $this->smarty->assign('storico', $storico);
        
        $this->smarty->assign('uTipo', lcfirst(substr(get_class($utente), 2)));
        $this->smarty->display('storico/rimuoviStorico.tpl');
        
    }
    
    
    
    
    /**
     * Mostra il contenuto di uno storico.
     * @param e_utente $utente l'utente che sta visualizzando la pagina
     * @param e_storico $storico: lo storico da visualizzare
     */
    
    function mostraStorico(e_utente &$utente, e_storico &$storico, bool $mostra)
    {
        $this->smarty->registerObject('utente', $utente);
        $this->smarty->assign('storico', $storico);

        $this->smarty->assign('uTipo', lcfirst(substr(get_class($utente), 2)));
		$this->smarty->assign('mostra', $mostra);
        $this->smarty->display('storico/storico.tpl');  
    }
    
    
    
    /**
     * Funzione che controlla i campi della form per l'inserimento di uno storico
     * @return bool true se gli input sono corretti, false altrimenti
     */
    
    function validazioneCarica(e_storico &$storico) : bool
    {
        if($this->check['idPrestito']=$storico->validazioneIdPrestito())  
			return true;
        else
            return false;  
    }
    
    
    
    /**
     * Funzione che controlla i campi della form per la modifica di uno storico
     * @return bool true se gli input sono corretti, false altrimenti
     */
    function validazioneModifica(e_storico &$storico) : bool
    {
        if( $this->check['titolo']=$libro->validazioneTitolo() &&
			$this->check['genere']=$libro->validazioneGenere() && 			
			$this->check['autore']=$libro->validazioneAutore() && 
			$this->check['num_copie']=$libro->validazioneNumCopie() && 
			$this->check['isbn']=$libro->validazioneIsbn() && 
			$this->check['durata']=$libro->validazioneDurata() && 
			$this->check['descrizione']=$libro->validazioneDescrizione() )
            return true;
        
        else 
            return false;      
    }
    
    
    
    /**
     * Funzione che verifica se l'utente ha effettivamente richiesto la rimozione di uno storico
     * @return bool true se l'utente vuole rimuovere lo storico, false altrimenti
     */
    function validazioneRimuovi() : bool
    {
        if(isset($_POST['action']))
        {
            if($_POST['action']=='si')
                return true;
            else
                return false;       
        }
        else
            return false;   
    }
}
