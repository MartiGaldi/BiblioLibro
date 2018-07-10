<?php


class Installazione
{
    /**
    * Effettua l'installazione dell'applicazione
    */
    
    static function effettuaInstallazione()
    {
        if($_SERVER['REQUEST_METHOD']=='GET')
        {
            Installazione::mostraForm();
            return false;
        }
        
        else{
            $var = Installazione::installa();
            return $var;
        }   
    }
    
    
    
    /**
    * Funzione che mostra la form per inserire i dati dell'installazione, ovvero i parametri di
    * configurazione del dbms locale per la creazione del database. Se la versione di PHP installata
    * sulla macchina e' minore della 7.0.0 , verrà visualizzato un messaggio di errore.
    */
    
    private function mostraForm()
    {
        $smarty = SmartyConfig::configura();
        $versione = true; // variabile booleana che verifica se la versione di php installata sulla macchina e' sufficiente
        
        if(version_compare(PHP_VERSION, '7.0.0', '<'))
            $versione = false;
        
            $smarty->assign('versione', $versione);
            $smarty->display('installa.tpl');    
    }
    
    

    
    /**
    * Funzione che installa l'applicazione a partire dai dati inseriti dall'utente.
    */
    private function installa()
    { 
        try
        {
            $indirizzo = 'localhost'; // l'installazione e' in default in localhost
            
            // costruzione parametri di accesso
            $admin = $_POST['admin'];
            $pass = $_POST['pwd'];
            $database = $_POST['database'];
            $db = new PDO("mysql:host=$indirizzo;", $admin, $pass); // tentativo di connessione al dbms (default: mysql)
            $db->iniziaTransazione); // inizia la transazione
            
            $query = 'DROP DATABASE IF EXISTS ' . $database . ';
                      CREATE DATABASE ' . $database . ' ;
                      USE ' . $database . ';'; // costruisce il database
            
            
            
            $query = $query . file_get_contents('tabella.sql'); // aggiunge tabelle alla query
            $db->exec($query);
            $db->commit();
            
            
            //costruisce il file config.inc.php
            $file = fopen('config.inc.php', 'w');
            $script = '<?php $indirizzo= \'localhost\'; $database= \'' . $database . '\'; $admin= \'' . $admin . '\';$pass= \'' . $pass . '\'; ?>';
            fwrite($file, $script);
            fclose($file);
            
            $db=null;
            
            return true;
            
        }
        
        catch (PDOException $e)
        {
            echo "Errore : " . $e->getMessage();
            $db->rollBack();
            die;
            return false;
        }
    } 
}
