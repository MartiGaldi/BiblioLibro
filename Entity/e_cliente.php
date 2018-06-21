<?php 

require_once'inc.php';
include_once 'Entity/e_oggetto.php';

class e_cliente extends e_oggetto{
    
    protected $nickname;
    protected $mail;
    protected $password;
    protected $info_utente
    
    function __construct(){
        parent::__construct();
    }
    
    function setNickname (string $nickname) {
        $this->nickname=$nickname;
    }
    
    function getNickname(){
        return $this->nickname;
    }
    
    function setMail (string $mail){
        $this->mail=$mail;
    }
    
    function getMail(){
        return $this->mail;
    }
    
    function setPassword (string $password){
        $this->password=$password;
    }
    
    function getPassword(){
        return $this->password;
    }
    
    //metodo che verifica che la struttura dell'e-mail sia valida
    function validazioneMail() : bool {
        if($this->mail && filter_var($this->mail, FILTER_VALIDATE_EMAIL))
            return true;
        else
            return false;
    }
    
    //metodo che verifica che che la password sia composta da caratteri alfanumerici
    //ed abbia la lunghezza almeno pari a 8 e massimo 20
    function validazzionePassword() : bool {
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
    
    function validazzioneNickName() : bool {
        if($this->nickname && preg_match('/^[[:alpha:]]{5,20}$/', $this->nickname)
            return true;
            else
                return false;
    }
}

   
?>