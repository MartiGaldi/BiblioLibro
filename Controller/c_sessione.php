<?php

require_once 'inc.php';

/**
 * La classe c_essione regola la sessione dell'utente nella navigazione dell'applicazione.
 * @author gruppo11
 * @package Controller
 */
 
class c_sessione
{
	/**
     * Funzione che da inizio alla sessione. 
     * @param e_utente $utente l'utente di cui memorizzare i dati
     */
    static function inizioSessione(e_utente &$utente)
    {
		
        session_start();
        // i suoi dati sono memorizzati all'interno della sessione
        $_SESSION['id'] =  $utente->getId();
        $_SESSION['nick'] = $utente->getNick();
        $_SESSION['tipo'] = lcfirst(substr(get_class($utente), 2));
    }
    
	/**
     * Restituisce l'utente della sessione corrispondente alla connessione che ha richiamato
     * il metodo. Se la sessione è attiva, restituirà l'utente corrispondente,
     * altrimenti restituirà un utente visitatore.
     * @return e_utente
     */
    static function getUtenteDaSessione() : e_utente
    {
        session_start();
         
        if(isset($_SESSION['id']))
        {
            $u_tipo= 'e_'.ucfirst($_SESSION['tipo']); 
            
               
            $utente = new $u_tipo();
            $utente->setId($_SESSION['id']);
            $utente->setNick($_SESSION['nick']);
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
        if(isset($_SESSION['amministratore']))
            return true;
            
        else 
            return false; 
    }
    
	/**
     * Imposta i privilegi di amministrazione.
     */
    static function setPrivilegiAmministratore()
    {
        $_SESSION['amministratore'] = true;
    }
    
	/**
     * Rimuove i privilegi di amministrazione.
     */
    static function rimuoviPrivilegiAmministratore()
    {
        session_start();
        
        unset($_SESSION['amministratore']);
    }
    
	/**
     * Termina una sessione.
     */
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
        if(isset($_COOKIE['installa']))
            return true;
            
        else
            return false;
                
    }
    
    static function unsetCookie()
    {
        setcookie('installa', 'ok', time()-3600);
    }
    
}