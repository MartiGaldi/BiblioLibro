<?php

include_once "Entity/e_id.php";

class e_prenota extends e_id {
    
    private $priorita;
    private $nick_cliente;
    private $id_libro;
    
    function __constructor(){}
    
    function setPriorita (string $autore){
        $this->priorita=$priorita;
    }
    
    function getPriorita(){
        return $this->priorita;
    }
    
    function setNickCliente (string $nick_cliente){
        $this->nick_cliente=$nickcliente;
    }
    function getNickCliente(){
        return $this->nick_cliente;
    }
    function setIdLibro(int $id_libro){
        $this->id_libro=$id_libro;
    }
    function getIdLibro(){
        return $this->id_libro;
    }
}

?>