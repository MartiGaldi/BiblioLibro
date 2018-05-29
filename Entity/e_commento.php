<?php

require_once'inc.php';

class e_commento extends e_id {
    private $contenuto;
    private $nick_cliente;
    
    function __constructor(){}
    
    function setContenuto (string $contenuto){
        $this->contenuto=$contenuto;
    }
    
    function getContenuto(){
        return $this->contenuto;
    }
    
    function setNickcliente (string $nick_cliente){
        $this->nick_cliente=$nick_cliente;
    }
    
    function getNickcliente(){
        return $this->nick_cliente;
    }
}