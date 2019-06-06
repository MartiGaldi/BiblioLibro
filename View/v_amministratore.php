<?php

require_once 'inc.php';
include_once 'View/v_oggetto.php';

/**
 * La classe v_amministatore effettua l'input-output per quanto riguarda il pannello di amministrazione
 author Gruppo 11
 * @author gruppo 11
 * @package View
 */

class v_amministratore extends v_oggetto
{
	
    function __construct()   
    {
        parent::__construct();
                
        $this->check = array(
            'nick1' => true,
            'mail1' => true,
            'password1' => true,
            'tipo1' => true,
			
			'nick' => true,
            'mail' => true,
            'password' => true,
            'tipo' => true,
			'nome' => true,
			'cognome' => true,
			'dtNasc' => true,
			'lgNasc' => true,
			'via' => true,
			'citta' => true,
			'cap' => true
        );
    }
    
    /**
     * Ritorna la coppia nick-password inserita dall'amministratore nel login
     * @return array
     */
    
    function getNickEPassword() : array
    {
        if (isset($_POST['nick1']) && isset($_POST['password1']))
            return array($_POST['nick1'],$_POST['password1']);       
    }
    
    /**
     * Verifica che un utente abbia inserito i dati corretti
     * @return true se non si sono commessi errori, false altrimenti
     */
    
    function validazioneIscrizione(e_utente $utente): bool
    {
        if($this->check['nick1']=$utente->validazioneNick() && $this->check['password1']=$utente->validazionePassword())
            return true;   
        else   
            return false;
    }
    
    /**
     * Mostra la pagina di login
     */
    
    function mostraLogin(bool $errore = NULL)
    {
        if(!$errore)       
            $errore = false;
            
            $utente = new e_visitatore();
            
            $this->smarty->registerObject('utente', $utente);
            $this->smarty->assign('uTipo', lcfirst(substr(get_class($utente), 2)));
            $this->smarty->assign('errore', $errore);
            $this->smarty->assign('check', $this->check);
            
            
            $this->smarty->display('amministratore/loginAmministratore.tpl');
    }
    
    /**
     * Funzione che permette la creazione di utente con i valori prelevati da una form
     * @return e_utente l'utente ottenuto dai campi della form
     */
    
    function creaUtente(): e_utente
    {
        $utente;
        
        if (isset($_POST['tipo1']))
		{
            $tipo = 'e_' . ucfirst($_POST['tipo1']);
            $utente = new $tipo();
        } 
		else
            $utente = new e_utente();
                
				if (isset($_POST['nick1']))
					$utente->setNick($_POST['nick1']);
                if (isset($_POST['mail1']))
                    $utente->setMail($_POST['mail1']);
                if (isset($_POST['password1']))
                    $utente->setPassword($_POST['password1']);
                        
                return $utente;
    }
    
    /**
     * Mostra la pagina di registrazione
     * @param bool $errore (facoltativo se è stato rilevato un errore)
     */
    
    function mostraIscrizione (bool $errore = NULL)
    {
        if (! $errore)
            $errore = false;
            
            $utente = new e_visitatore();
            
            $this->smarty->registerObject('utente', $utente);
            $this->smarty->assign('uTipo', lcfirst(substr(get_class($utente), 2)));
            $this->smarty->assign('errore', $errore);
            $this->smarty->assign('check', $this->check);
            $this->smarty->display('amministratore/registraAmministratore.tpl');
    }
    
    /**
     * Mostra il pannello di amministrazione
     * @param e_utente $utente l'utente della sessione
     */
    
    function mostraPannello(e_utente &$utente)
    {
        $this->smarty->registerObject('utente', $utente);
        $this->smarty->assign('uTipo', lcfirst(substr(get_class($utente), 2)));
        $this->smarty->assign('check', $this->check);
        $this->smarty->display('amministratore/pannello.tpl');
    }
	
	/**
     * Funzione che permette la creazione di utente con i valori prelevati da una form
     * @return e_utente l'utente ottenuto dai campi della form
     */
	function creaUtente1() : e_utente
    { 
        $utente;
        if(isset($_POST['tipo']))
        { 
            $tipo = 'e_'.lcfirst($_POST['tipo']);
            $utente = new $tipo(); 
        }
        else
            $utente = new e_utente();
           
		   
		if(isset($_POST['nick']))
            $utente->setNick($_POST['nick']);
		
        if(isset($_POST['mail']))
            $utente->setMail($_POST['mail']);
                    
        if(isset($_POST['password']))
            $utente->setPassword($_POST['password']);
		
		if(isset($_POST['nome']))
            $utente->setNome($_POST['nome']);
		
		if(isset($_POST['cognome']))
            $utente->setCognome($_POST['cognome']);
		
		if(isset($_POST['dtNasc']))
            $utente->setDtNasc($_POST['dtNasc']);
		
		if(isset($_POST['lgNasc']))
            $utente->setLgNasc($_POST['lgNasc']);
		
		if(isset($_POST['via']))
            $utente->setVia($_POST['via']);
		
		if(isset($_POST['citta']))
            $utente->setCitta($_POST['citta']);
		
		if(isset($_POST['cap']))
            $utente->setCap($_POST['cap']);
                        
    return $utente;                
    }
	
	
	
}

?>