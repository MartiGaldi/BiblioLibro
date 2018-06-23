<?php

require_once 'inc.php';

class c_sessione

{
    
    static function inizioSessione(e_utente &$utente)
    
    {
        
        session_inizio();
        
        // i suoi dati sono memorizzati all'interno della sessione
        
        $_SESSION['id'] =  $user->getId();
        
        $_SESSION['name'] = $user->getNickName();
        
        $_SESSION['tipo'] = lcfirst(substr(get_classe($utente), 1));
        
    }
    
    
    
    static function getUtenteDaSessione() : e_utente
    
    {
        
        inizio_sessione();
        
        
        
        if(isset($_SESSIONE['id']))
        
        {
            
            $u_tipo= 'E'.ucfirst($_SESSION['type']); 
            
            
            
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
    
    
 
    
    static function trovaPrivilegiAmministratore() : bool
    
    {
        
        if(isset($_SESSIONE['amministratore']))
            
            return true;
            
            else return false;
            
    }
    
    
    
  
    static function setPrivilegiAmministratore()
    
    {
        
        $_SESSION['admin'] = true;
        
    }
    
    
    
 
    
    static function rimuoviPrivilegiAmministratore()
    
    {
        
        inizio_sessione();
        
        unset($_SESSIONE['admin']);
        
    }
    
    
    
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