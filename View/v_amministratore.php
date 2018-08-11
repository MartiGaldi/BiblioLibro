<?php

require_once 'inc.php';
include_once 'View/v_oggetto.php';

/**
* La classe v_amministatore effettua l'input-output per quanto riguarda il pannello di amministrazione
*/

class v_amministratore extends v_oggetto
{
    function __construct()   
    {
        parent::__construct();
                
        $this->check = array(
            'nick' => true,
            'mail' => true,
            'password' => true,
            'tipo' => true
        );
    }
    
    /**
    * Ritorna la coppia mail-password inserita dall'amministratore nel login
    * @return array
    */
    
    function getMailEPassword() : array
    {
        if (isset($_POST['mail']) && isset($_POST['password']))
            return array($_POST['mail'],$_POST['password']);       
    }
    
    /**
    * Verifica che un utente abbia inserito i
    * @return true se non si sono commessi errori, false altrimenti
    */
    
    function validazioneIscrizione(e_utente $utente): bool
    {
        if($this->check['mail']=$utente->validazioneMail() && $this->check['password']=$utente->validazionePassword())
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
    * @return e_utent l'utente ottenuto dai campi della form
    */
    
    function creaUtente(): e_utente
    {
        $utente;
        
        if (isset($_POST['tipo']))
		{
            $tipo = 'e_' . ucfirst($_POST['tipo']);
            $utente = new $tipo();
        } 
		else
            $utente = new e_utente();
                
				if (isset($_POST['nick']))
					$utente->setNick($_POST['nick']);
                if (isset($_POST['mail']))
                    $utente->setMail($_POST['mail']);
                if (isset($_POST['password']))
                    $utente->setPassword($_POST['password']);
                        
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
}

?>