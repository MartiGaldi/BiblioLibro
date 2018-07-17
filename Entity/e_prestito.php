<?php

require_once "inc.php";

class e_prestito extends e_oggetto {
    
    protected $nick_cliente;
    protected $data_inizio;
    protected $data_fine;
    protected $attesa;
    protected $isbn
    protected $prenotazione;
    protected $rientro = false;
    protected $storico = false;
    
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
    
    function getAttesa() : bool{
        return $this->attesa;
    }
    
    function setIsbn(string $isbn){
        $this->isbn=$isbn;
    }
    
    function getIsbn() : string{
        return $this->isbn;
    }
    
    function setRientro(DateTime $data_fine)
    {
        $data_f=$data_fine->getTimestamp();
        if(time()>=$data_f)
            $rientro=true;
            else
                $rientro=false;
    }
    
    function getRientro() : bool
    {
        return $this->rientro;
    }
    
    function setStorico(bool $storico) {
        $this->storico=$storico;
    }
    
    function getStorico() : bool {
        return $this->storico;
    }
    
    /**
     * Restituisce le informazioni relative alla prenotazione
     */
    
    function getPrenotazione()
    {
       $disp= f_persistance::getIstance()->carica(e_prenota::class, $this->id)->getDisp();
       
       if ($disp==true)
       {
        $acquisito = f_persistance::getIstance()->carica(e_prenota::class, $this->id)->getAcquisito();
        
        if($acquisito==true)
        {
            $prenotazione = f_persistance::getIstance()->carica(e_prenota::class, $this->id);
            if($prenotazione)
                $this->prenotazione = $prenotazione;
            else
                $this->prenotazione = new e_prenota();
        }
       }
        return $this->prenotazione; 
    else
        echo "Attualmente non sono disponibili copie per il prestito";
    }
    
    function eliminaPrestito()
    {
        $storico = f_persistance::getIstance()->carica(e_storicoPrestito::class, $this->id)->getStorico;
        if($storico==true)
            rimuoviPrestito();
    }

}

?>