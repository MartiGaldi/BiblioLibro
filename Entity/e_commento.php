<?php

class e_commento extends e_oggetto {
    
    private $isbn;  //id libro commentato
    private $contenuto;  //testo commento 
    private $nick_cliente;  //l'utente che ha commentato
    
    function __constructor(int $id=null, string $isbn=null, string $contetuto = null, string $nicK_name ) {
        
        parent::__construct($id);
        $this->isbn=$isbn;
        $this->contetuto=$contenuto;
        $this->nick_name=$nick_name;   
    }
    
    function setIsbn (string $isbn){
        
        $this->isbn=$isbn;
    }
    
    function getIsbn() : string {
        
        return $this->isbn;
    }
    
    function setContenuto (string $contenuto){
        
        $this->contenuto=$contenuto;
    }
    
    function getContenuto() : string {
        
        return $this->contenuto;
    }
    
    
    function setNickcliente (string $nick_cliente){
        
        $this->nick_cliente=$nick_cliente;
    }
    
    function getNickcliente() : string{
        
        return $this->nick_cliente;
    }
    
}