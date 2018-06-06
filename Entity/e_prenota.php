<?php

require_once'inc.php';


class e_prenota extends e_id {
    
    private $priorita;
    private $nick_cliente;
    private $id_libro;
    
    function __constructor(){}
    
    function setPriorita (int $priorita){
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
    
    function get_copie_disponibili (string $isbn) : bool {
       $numero = count (select *
                        from PRESTITO
                        where isbn = isbn_u)
                     
        if($n_copie<$numero)
             //return 1 (disponiile)
             return
             else 
                // return 0 (non disponibile)
                return
    }*/
    
    function mail_prenotazione(){
     
    }
    
    function prenotazione_effettuata(){
        //passaggio da prenotazione a prestito
        
    }   
}

?>