<?php

require_once'inc.php';


class e_prenota extends e_oggetto {
    
    private $data;
    private $nick_cliente;
    private $isbn;
    private $data_fine;
    private $acquisito = false;
    private $disp = false;
    
    function __constructor(){}
    
    function setData (DateTime $data){
        $this->data=$data;
    }
    
    function getData() : DateTime {
        return $this->data;
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
    
    function setDataFine() {
        $this->data_fine = time + (3*24*60*60);
    }
    
    function getDataFine() : DateTime {
        return $this->date('Y/m/d', $data_fine);
    }
    
    function setAcquisito(bool $acquisito) {
        $this->acquisito=$acquisito;
    }
    
    function getAcquisito() : bool {
        return $this->acquisito;
    }
    
    function setDisp(bool $disp)
        {
            $numero=contaNumero();
            $num_copie= f_persistance::getIstance()->carica(e_libro::class, $this->id)->getNumCopie();
            
            if($num_copie<$numero)
                $disp=false;
                else
                    $disp=true;
        
        $this->disp=$disp;
        }
    
    function getDisp() : bool {
        return $this->disp;
    }
    
   
    /**
     * metodo che permette il controllo della prenotazione
     */
    function controllaPrenotazione(bool $acquisito)
    {
        if($acquisito == false)
           eliminaPrenotazione();
    }  
    
    /**
     * metodo che elimina la prenotazione se entro tre giorni il libro non viene ritirato
     */
    function eliminaPrenotazione(int $id, DateTime $data_fine){
        $data_odierna=time();
        if($data_odierna>$data_fine)
        {
            rimuoviPrenotazione();
        }
    }
}

?>