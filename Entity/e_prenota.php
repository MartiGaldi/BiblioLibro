<?php

require_once'inc.php';


class e_prenota extends e_oggetto {
    
    private $data;
    private $priorità;
    private $nick_cliente;
    private $isbn;
    
    function __constructor(){}
    
    function setData (DateTime $data){
        $this->data=$data;
    }
    
    function getData() : DateTime {
        return $this->data;
    }
    
    function setPriorità(int $priorità) {
        $this->prestito=$prestito;
    }
    
    function getPriorità() : int {
        return $this->priorità;
    }
    
    function setNickCliente (string $nick_cliente){
        $this->nick_cliente=$nickcliente;
    }
    
    function getNickCliente() : string{
        return $this->nick_cliente;
    }
    
    function setIsbn(string $isbn){
        $this->isbn=$isbn;
    }
    
    function getIsbn() : string {
        return $this->isbn;
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