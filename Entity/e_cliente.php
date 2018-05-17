<?php 

class e_cliente{
    private $nickname;
    private $mail;
    
    function __constructor(){}
    
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
}


?>