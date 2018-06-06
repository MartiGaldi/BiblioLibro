<?php

class e_commento {
    
    private $id;  // id commento
    private $isbn;  //id libro commentato
    private $contenuto;  //testo commento 
    private $nick_cliente;  //l'utente che ha commentato
    
    function __constructor(int $id=null, string $isbn=null, string $contetuto = null, string $nicK_name ) {
        
        $this->id=$id;
        $this->isbn=$isbn;
        $this->contetuto=$contenuto;
        $this->nick_name=$nick_name;   
    }
    
    
    function setId (int $id){
        
        $this->id=$id;
    }
    
    function getId() : int {
        
        return $this->id;
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