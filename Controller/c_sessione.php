<?php

require_once 'inc.php';

/**

* La classe CSession regola la sessione dell'utente nella navigazione dell'applicazione.

* Le sue funzionalità permettono di iniziare, terminare e riprendere una sessione di un particolare

* utente, costruendo/ricostruendo i suoi parametri principali (quali nome, tipologia...)

*/

class c_sessione

{
    
    /**
    
    * Funzione che da inizio alla sessione. I dati dell'utente come id, nome, e tipologia di
    
    * utente sono salvati all'interno dell'array session.
    
    * @param EUser $user l'utente di cui memorizzare i dati
    
    */
    
    static function inizioSessione(e_utente &$utente)
    
    {
        
        session_inizio();
        
        // i suoi dati sono memorizzati all'interno della sessione
        
        $_SESSION['id'] =  $user->getId();
        
        $_SESSION['name'] = $user->getNickName();
        
        $_SESSION['tipo'] = lcfirst(substr(get_classe($utente), 1));
        
    }
    
    
    
    /**
    
    * Restituisce l'utente della sessione corrispondente alla connessione che ha richiamato
    
    * il metodo. Se la sessione è effettivamente attiva, restituirà l'utente corrispondente,
    
    * altrimenti restituirà un semplice utente guest.
    
    * @return EUser
    
    */
    
    static function getUtenteDaSessione() : e_utente
    
    {
        
        inizio_sessione();
        
        
        
        if(isset($_SESSIONE['id']))
        
        {
            
            $u_tipo= 'E'.ucfirst($_SESSION['type']); // determina la entity della tipologia di utente
            
            
            
            $utente = new $u_tipo();
            
            $utente->setId($_SESSIONE['id']);
            
            $utente->setNickName($_SESSIONE['nome']);
            
        }
        
        else
        
        {
            
            $utente = new e_visitatore();
            
        }
        
        return $utente;
        
        
        
    }
    
    
    
    /**
    
    * Controlla se i privilegi di amministrazione siano presenti nella sessione
    
    * @return bool true se l'utente ha i privilegi di amministrazione, false altrimenti
    
    */
    
    static function trovaPrivilegiAmministratore() : bool
    
    {
        
        if(isset($_SESSIONE['amministratore']))
            
            return true;
            
            else return false;
            
    }
    
    
    
    /**
    
    * Imposta i privilegi di amministrazione. Da chiamare solo dopo che e' stata attivata la sessione
    
    */
    
    static function setPrivilegiAmministratore()
    
    {
        
        $_SESSION['admin'] = true;
        
    }
    
    
    
    /**
    
    * Rimuove i privilegi di amministrazione.
    
    */
    
    static function rimuoviPrivilegiAmministratore()
    
    {
        
        inizio_sessione();
        
        unset($_SESSIONE['admin']);
        
    }
    
    /**
    
    * Termina una sessione.
    
    */
    
    static function terminaSessione()
    
    {
        
        inizio_sessione(); // recupera i parametri di sessione
        
        
        
        unset_sessione(); // rimuove le variabili di sessione
        
        
        
        termina_sessione(); // distrugge la sessione
        
    }
    
    
    
    static function populateApplication()
    
    {
        
        setcookie('install', 'ok', time()+3600);
        
    }
    
    
    
    static function checkPopulateApplication() : bool
    
    {
        
        if(isset($_COOKIE['install']))
            
            return true;
            
            else
                
                return false;
                
    }
    
    
    
    static function unsetCookie()
    
    {
        
        setcookie('install', 'ok', time()-3600);
        
    }
    
}