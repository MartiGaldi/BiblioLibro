<?php
require_once 'inc.php';
include_once 'View/v_oggetto.php';

/**
* La classe v_utente si occupa dell'input-output per quanto riguarda la gestione di un utente.
* In particolare:
* - Costruisce da una form un oggetto e_utente e ne verifica la validità
* - Permette al client di visualizzare pagine relative all'utente (accedi-registrati-profilo)
* @package View
*/

class v_utente extends v_oggetto
{
    
    function __construct()
    {
        parent::__construct();

        
        $this->check = array(
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
    * Funzione che permette la creazione di utente con i valori prelevati da una form
    * @return e_utente l'utente ottenuto dai campi della form
    */
    
    function creaUtente() : e_utente
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
   
    
    
    /**
    * Verifica che un utente abbia rispettato i vincoli per l'inserimento dei parametri di login
    * @return true se non si sono commessi errori, false altrimenti
    */
    function validazioneLogin(e_utente $utente): bool
    {
        if($this->check['mail']=$utente->validazioneMail() && $this->check['password']=$utente->validazionePassword())
            return true;
        
        else
            return false;    
    }
    
    
    function validazioneIscrizione(e_utente $utente): bool
    {
        if($this->check['nick_name']=$utente->validazioneNick() && 
            $this->check['mail']=$utente->validazioneMail() && 
            $this->check['password']=$utente->validazionePassword() &&
			$this->check['nome']=$utente->validazioneNome() && 
			$this->check['cognome']=$utente->validazioneCognome() && 
			//$this->check['dtNasc']=$utente->validazioneDtNasc() && 
			$this->check['lgNasc']=$utente->validazioneLgNasc() &&
			$this->check['via']=$utente->validazioneVia() && 
			$this->check['citta']=$utente->validazioneCitta() && 
			$this->check['cap']=$utente->validazioneCap() )
			{
				return true;
			}
        else
            return false;
    }
   
    
    /**
    * Mostra il profilo di un utente.
    * @param e_utente $profiloUtente: l'utente di cui visualizzare il profilo
    * @param e_utente $Utente: l'utente che ha effettuato l'accesso alla sessione
    * @param string $contenuto: il contenuto da visualizzare nel profilo (Libri)
    * @param array $array: l'array del contenuto da visualizzare
    */
    
    function mostraProfilo (e_utente &$profiloUtente, e_utente &$Utente, bool $haPrenota, bool $haPrestito, bool $haStorico, string $content, array $array = NULL)
    {
        $this->smarty->assign('content', $content);
        $this->smarty->registerObject('utente', $Utente);
        $this->smarty->assign('uTipo', lcfirst(substr(get_class($User), 2)));
        
        $this->smarty->registerObject('profilo', $profiloUtente);
        $this->smarty->assign('pTipo', lcfirst(substr(get_class($profiloUtente), 2)));
      
		$this->smarty->assign('haPrestito', $haPrestito);
        $this->smarty->assign('haPrenota', $haPrenota);
		$this->smarty->assign('haStorico', $haStorico);
		
        $this->smarty->assign('array', $array);
        
        $this->smarty->display('utente/profilo.tpl'); 
    }
    
    
    
    /**
    * Mostra la pagina di login
    * @param bool $errore: facoltativo se è stato rilevato un errore
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
            
            $this->smarty->display('utente/login.tpl');
    }
    
    
    
    /**
    * Mostra la pagina di iscrizione
    * @param bool $error: facoltativo se e' stato rilevato un errore
    */
    
    function mostraIscrizione(bool $errore = NULL)
    {
        if (! $errore) 
        {$errore = false;}
            
            $utente = new e_visitatore(); 
			
            $this->smarty->registerObject('utente', $utente);
            $this->smarty->assign('uTipo', lcfirst(substr(get_class($utente), 2)));

            $this->smarty->assign('errore', $errore);
            $this->smarty->assign('check', $this->check);

            $this->smarty->display('utente/registra.tpl'); 
    }
    
    
    /**
    * Mostra la pagina che consente la rimozione di un utente
    * @param e_utente $utente: l'utente della sessione
    * @param e_utente $rimuovi: se l'utente che ha richiesto la rimozione e' un bibliotecario
    */
    
    function mostraFormRimuovi (e_utente &$utente, e_utente &$rimuovi = null)
    {
        $this->smarty->registerObject('utente', $utente);
        $this->smarty->assign('uTipo', lcfirst(substr(get_class($utente), 2)));
        
        if($rimuovi)
        {  
            $setRimuoviUtente = true;
            $this->smarty->assign('rNick', $rimuovi->getNick());
            $this->smarty->assign('rId', $rimuovi->getId());
        }
        else
        {
            $this->smarty->assign('rNick', NULL);
            $this->smarty->assign('rId', NULL);
        }
        
        $this->smarty->display('utente/rimuoviUtente.tpl');
    }  
}
