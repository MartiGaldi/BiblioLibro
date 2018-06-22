<?php 

require_once'inc.php';
include_once 'Entity/e_oggetto.php';

class e_utente extends e_oggetto{
    
    protected $nickname;
    protected $mail;
    protected $password;
    protected $info_utente
    
    function __construct(){
        parent::__construct();
    }
    
    function setNickname (string $nickname)
    {
        $this->nickname=$nickname;
    }
    
    function getNickname() : string
    {
        return $this->nickname;
    }
    
    function validazzioneNickName() : bool
    {
        if($this->nickname && preg_match('/^[[:alpha:]]{5,20}$/', $this->nickname)
            return true;
            else
                return false;
    }
    
    
    function setMail (string $mail)
    {
        $this->mail=$mail;
    }
    
    function getMail() : string
    {
        return $this->mail;
    }
    
    //metodo che verifica che la struttura dell'e-mail sia valida
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
    
    //metodo che verifica che che la password sia composta da caratteri alfanumerici
    //ed abbia la lunghezza almeno pari a 8 e massimo 20
    function validazionePassword() : bool {
        if($this->password && preg_match('/^[[:alpha:]]{8,20}$/', $this->password))
            return true;
        else
            return false;
    }
    
    function hashPassword () {
        $this->password=password_hash($this->password, PASSWORD_DEFAULT);
    }
    
    function verificaPassword () : bool {
        return password_verify($this->password, f_persistance::getIstance()->load(e_cliente::class, $this->id)->getPassword());
    }
    

    //restituisce le informazioni relative all'utente o null
    function getInfoUtente()
    {
        $info_utente = f_persistance::getIstance()->load(e_infoUtente::class, $this->id);
        if($info_utente)
            $this->info_utente = $info_utente;
        else
            $this->info_utente = new e_infoUtente();
        return $this->info_utente;
    }
    
    //impone le informazioni utente
    function setInfoUtente(e_infoUtente $info = null)
    {
        if(!$info)
            $info = new e_infoUtente();
        
         $info->setId($this->id);
         $this->info_utente = $info;
         
         if(!f_persistance::getInstance()->load(e_infoUtente::class, $this->id)) 
         {   //se le info non sono presenti vengono aggiunte nel db   
             f_persistance::getInstance()->store($this->info_utente);
         
         }
         
         else
         
         { //altrimenti vengono aggiornate
             f_persistence::getInstance()->update($this->info_utente);
             
         }
        
    }
    
    function __toString()
    {
        return "Nome: ".$this->nickname."\nId: ":$this->id;
    }
}

   
?>