<?php

require_once "inc.php";

class e_prestito extends e_oggetto {
    
    private $nick_cliente;
    private $data_inizio;
    private $data_fine;
    private $attesa;
    private $isbn
    private $prenotazione;
    
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
    
    function getDataInizio() : DateTime{
        return $this->data_inizio;
    }
    
    function setDataFine(DateTime $data_inizio, string $durata){
        if($durata=='consultaione')
            $this->$data_fine = $data_inizio
        else
            if($durata=='breve')
                $data_fine = $data_inizio->add(new DateInterval('P7D'));
            else
                $data_fine = $data_inizio->add(new DateInterval('P30D'));
    }
    
    function getDataFine() : DataTime {
        return $this->data_fine
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
    
    /**
     * Restituisce le informazioni relative alla prenotazione
     */
    
    function getPrenotazione() {
        $acquisito = f_persistance::getIstance()->carica(e_prenota::class, $this->id)->getAcquisito();
        if($acquisito==true)
            $prenotazione = f_persistance::getIstance()->carica(e_prenota::class, $this->id);
            if($prenotazione)
                $this->prenotazione = $prenotazione;
            else
                $this->prenotazione = new e_prenota();
        return $this->prenotazione;
    }
        
}

?>