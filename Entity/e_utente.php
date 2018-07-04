<?php 

require_once'inc.php';
include_once 'Entity/e_oggetto.php';


/**
* La classe e_utente contiene tutti gli attributi e metodi base che sono adoperati da tutte
* le tipologie di utente (cliente, bibliotecario,visitatore).
* Contiene metodi per impostare, ottenere, validare i seguenti attributi:
* - mail: l'indirizzo utilizzato in fase di registrazione
* - password: la password per accedere nell'applicazione
* - info: oggetto e_InfoUtente contenente informazioni da modificare e visualizzabili nel profilo
* @author gruppo11
* @package Entity
*/

class e_utente extends e_oggetto{
    
    protected $mail;
    protected $password;
    protected $info_utente
    
    function __construct(){
        parent::__construct();
    }
    
    
    function setMail (string $mail)
    {
        $this->mail=$mail;
    }
    
    
    
    function getMail() : string
    {
        return $this->mail;
    }
    
    
    /** Metodo che verifica che la struttura dell'e-mail sia valida
     * @return bool true se l'email e' corretta, false altrimenti
     */
    function validazioneMail() : bool
    {
        if($this->mail && filter_var($this->mail, FILTER_VALIDATE_EMAIL))
            return true;
        
            else
                return false;
    }
    
    
    
    function setPassword (string $password)
    {
        $this->password=$password;
    }
    
    
    
    function getPassword() : string
    {
        return $this->password;
    }
    
    
    /* Metodo che verifica che la password sia corretta ovvero composta da caratteri alfanumerici
     *  ed abbia la lunghezza almeno pari a 8 e massimo 20
     *  @return bool true se la password è corretta, false altrimenti
     */
    function validazionePassword() : bool
    {
        if($this->password && preg_match('/^[[:alpha:]]{8,20}$/', $this->password))
            return true;
        
        else
            return false;
    }
    
    
    /**
     * Metodo che cripta la password
     */
    function hashPassword ()
    {
        $this->password=password_hash($this->password, PASSWORD_DEFAULT);
    }
    
    
    
    /**
    * Metodo che controlla se la password dell'oggetto sia corrispondente alla entry nel database
    * che contiene lo stesso id dell'oggetto che ha richiamato il metodo
    * @param string $password la password
    * @return bool
    */
    function verificaPassword () : bool
    {
        return password_verify($this->password, f_persistance::getIstance()->load(e_cliente::class, $this->id)->getPassword());
    }
    
    
    
    /**
     * restituisce le informazioni relative all'utente o null
     */
    function getInfoUtente()
    {
        $info_utente = f_persistance::getIstance()->load(e_infoUtente::class, $this->id);
        if($info_utente)
            $this->info_utente = $info_utente;
        else
            $this->info_utente = new e_infoUtente();
        return $this->info_utente;
    }
    
    /**
     * Imposta le informazioni dell'utente
     */
    function setInfoUtente(e_infoUtente $info = null)
    {
        if(!$info)
            $info = new e_infoUtente();
        
         $info->setId($this->id);
         $this->info_utente = $info;
         
         if(!f_persistance::getInstance()->carica(e_infoUtente::class, $this->id)) 
         {   //se le info non sono presenti vengono aggiunte nel db   
             f_persistance::getInstance()->salva($this->info_utente);
         
         }
         
         else
         
         { //altrimenti vengono aggiornate
             f_persistence::getInstance()->aggiorna($this->info_utente);
             
         }
        
    }
    
    function __toString()
    {
        return "Nome: ".$this->nickname."\nId: ":$this->id;
    }
}

   
?>