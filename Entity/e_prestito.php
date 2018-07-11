<?php

require_once "inc.php";

class e_prestito extends e_oggetto {
    
    private $nick_cliente;
    private $data_inizio;
    private $data_fine;
    private $attesa;
    private $isbn
    
    function __constructor(){}
    
    function setNickCliente(string $nick_cliente){
        $this->nick_cliente=$nick_cliente;
    }
    
    function getNickCliente() : string {
        return $this->nick_cliente;
    }
 
    function setDataInizio(DateTime $data_inizio){
        $this->data_inizio=$data_inizio;
    }
    
    function getDataInizio(){
        return $this->data_inizio;
    }
    
    function setDataFine(DateTime $data_inizio, string $durata){
        if($durata=='consultaione')
            $data_fine=
    }
    
    function setAttesa(bool $attesa){
        $this->attesa=$attesa;
    }
    
    function getAttesa(){
        return $this->attesa;
    }
    
    function setIsbn(int $isbn){
        $this->isbn=$isbn;
    }
    
    function getIsbn(){
        return $this->isbn;
    }
    
    function prestito_effettuato(){
        return
    }
        
    function controlla_scadenza(){
        return
    }
        
    function mail_prestito(){
        return
    }
        
    function mail_sollecito(){
        return
    }
    
}

?>