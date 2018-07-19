<?php

require_once 'inc.php';

class c_sessione

{
    
    static function inizioSessione(e_utente &$utente)
    
    {
        
        session_start();
        
        // i suoi dati sono memorizzati all'interno della sessione
        
        $_SESSION['id'] =  $utente->getId();
        
        $_SESSION['nickname'] = $utente->getNickName();
        
        $_SESSION['tipo'] = lcfirst(substr(get_class($utente), 2));
        
    }
    
    
    
    static function getUtenteDaSessione() : e_utente
    
    {
        
        session_start();
        
        
        
        if(isset($_SESSION['id']))
        
        {
            
            $u_tipo= 'e_'.ucfirst($_SESSION['tipo']); 
            
            
            
            $utente = new $u_tipo();
            
            $utente->setId($_SESSION['id']);
            
            $utente->setNickName($_SESSION['nickname']);
            
        }
        
        else
        
        {
            
            $utente = new e_visitatore();
            
        }
        
        return $utente;
        
        
        
    }
    
    
 
    
    static function trovaPrivilegiAmministratore() : bool
    
    {
        
        if(isset($_SESSION['amministratore']))
            
            return true;
            
        else 
            return false;
            
    }
    
    
    
  
    static function setPrivilegiAmministratore()
    
    {
        
        $_SESSION['amministratore'] = true;
        
    }
    
    
    
 
    
    static function rimuoviPrivilegiAmministratore()
    
    {
        
        session_start();
        
        unset($_SESSION['amministratore']);
        
    }
    
    
    
    static function terminaSessione()
    
    {
        
        session_start(); // recupera i parametri di sessione
        
        
        
        session_unset(); // rimuove le variabili di sessione
        
        
        
        session_destroy(); // distrugge la sessione
        
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