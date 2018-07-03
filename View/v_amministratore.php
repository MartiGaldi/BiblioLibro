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
            'nome' => true,
            'mail' => true,
            'password' => true,
            'tipo' => true
        );
    }
    
    /**
    * Ritorna la coppia utente-password inserita dall'amministratore nel login
    * @return array
    */
    
    function getUtente&Password(): array
    {
        if (isset($_POST['nome']) && isset($_POST['password']))
            return array($_POST['nome'],$_POST['password']);       
    }
    
    /**
    * Verifica che un utente abbia inserito i
    * @return true se non si sono commessi errori, false altrimenti
    */
    
    function loginValidata(e_utente $utente): bool
    {
        if($this->check['password']=$utente->validazionePassword() && $this->check['mail']=$utente->validazioneMail())
        {
            return true;   
        }
        else   
            return false;
    }
    
    /**
    * Mostra la pagina di login
    * @param bool $errore (facoltativo se è stato rilevato un errore)
    */
    
    function mostraLogin(bool $errore = NULL)
    {
        if(!$errore)       
            $errore = false;
            
            $utente = new e_visitatore();
            
            $this->smarty->registerObject('utente', $utente);
            
            $this->smarty->assign('uTipo', lcfirst(substr(get_class($utente), 1)));
            
            
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
        
        if (isset($_POST['tipo'])) {
            $tipo = 'e_' . ucfirst($_POST['tipo']);
            
            $user = new $tipo();
        } else
            $utente = new e_utente();
                
                if (isset($_POST['mail']))
                    $utente->setMail($_POST['mail']);
                if (isset($_POST['password']))
                    $utente->setPassword($_POST['password']);
                        
                return $tente;
    }
    
    /**
    * Mostra la pagina di registrazione
    * @param bool $errore (facoltativo se è stato rilevato un errore)
    */
    
    function mostraRegistrazione (bool $errore = NULL)
    {
        if (! $errore)
            $errore = false;
            
            $utente = new e_visitatore();
            
            $this->smarty->registerObject('utente', $utente);
            
            $this->smarty->assign('uTipo', lcfirst(substr(get_class($utente), 1)));
            
            
            $this->smarty->assign('errore', $errore);
            
            $this->smarty->assign('check', $this->check);
            
            
            $this->smarty->display('amministratore/registrazioneAmministratore.tpl');
    }
    
    /**
    * Mostra il pannello di amministrazione
    * @param e_utente $utente l'utente della sessione
    */
    
    function mostraPannello(e_utente &$utente)
    {
        $this->smarty->registerObject('utente', $utente);
        
        $this->smarty->assign('uTipo', lcfirst(substr(get_class($utente), 1)));
        
        
        $this->smarty->assign('check', $this->check);
        
        
        $this->smarty->display('amministratore/pannello.tpl');
    }
}

?>