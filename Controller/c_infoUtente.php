<?php

require_once 'inc.php';

/**
* La classe c_infoUtente implementa la funzionalità 'Gestione Profilo': le sue funzioni infatti
* presentano/ricevono una form in cui l'utente inserirà informazioni su di se, come :
* - Nome e Cognome
* - Data di Nascita
* - Luogo di Nascita
* - Codice fiscale
* - Telefono
* - Sesso
* @package Controller
*/

class c_infoUtente
{ 
    /**
    * A seconda del tipo di metodo richiesto dal cliente, verranno attivate funzioni diverse.
    * In particolare:
    * - registra() salva su DB le informazioni inserite dall'utente.
    * - mostraFormInfoUtente() mostra all'utente la form in cui inserire i dati.
    */
    
    static function modificaInfo()
    { 
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        { 
            c_infoUtente::registra(); 
        }
        elseif ($_SERVER['REQUEST_METHOD'] == 'GET')
        {  
            c_infoUtente::mostraFormInfoUtente();  
        } 
    }
    
    
    
    /**
    * La funzione Registra permette di creare un nuovo oggetto info utente e salvarlo sul DB.
    */
    
    private function registra()
    {
        $v_infoUtente = new v_infoUtente();
        $Utente = c_sessione::getUtenteDaSessione();
        
        if(get_class($Utente)!= e_visitatore::class)
        {
            $InfoUtente= $v_infoUtente->creaInfoUtente();
            $Utente->setInfoUtente($InfoUtente);
            
            header('Location: /BiblioLibro/utente/profilo/'.$Utente->getId());
        }
        else
            $v_infoUtente->Errore ($utente, 'Sei un visitatore, non puoi registrare informazioni riservate agli utenti');    
    }
    
    
    
    /**
    * Mostra all'utente la form per la modifica delle informazioni. Se l'utente è Guest, verrà
    * reindirizzato ad un messaggio di errore.
    */
    
    private function mostraFormInfoUtente()
    {
        $v_infoUtente = new v_infoUtente();
        $Utente = c_sessione::getUtenteDaSessione();
        
        if(get_class($Utente)!= e_visitatore ::class)
        { 
            $v_infoUtente->mostraFormInfoUtente ($Utente);
        }
        
        else
            $v_infoUtente->Errore($Utente, 'Devi essere un utente per modificare le tue informazioni');        
    }
}
?>