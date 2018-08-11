<?php

require_once "inc.php";

/**
 * La classe e_prestito contiene le informazioni riguardanti i prestiti ancora in corso.
 */

class e_prestito 
{
    protected $id;
    protected $nick_cliente;
    protected $data_inizio;
    protected $data_fine;
    protected $id_libro;
    protected $rientro = false;
    protected $storico = false;
    
    function __constructor(){}
    
	function getId() : int
    {
        if(!$this->id)
            return 0;
        else return $this->id;
    }
    
    /**
     * @param int $id l'identificativo dell'oggetto Entity
     */
    function setId(int $id)
    {
        $this->id=$id;
    }
	
    function setNick(string $nick_cliente)
    {
        $this->nick_cliente=$nick_cliente;
    }
    
    function getNick() : string {
        return $this->nick_cliente;
    }
 
    function setDataInizio(DateTime $data_inizio){
        $this->data_inizio=new DateTime($data_inizio);
    }
    
    function getDataInizio(bool $mostraFormato = null)
    {
        if($this->data_inizio)
        {
            $formato="Y-m-d";
            if($mostraFormato)
                $formato= "Y/m/d";
                return $this->data_inizio->format($formato);
        }
        else
            return NULL;
    }
    
    /**
     * Metodo che imposta la data fine in base alla durata del prestito per quel determinato libro.
     * consultazione = lo stesso giorno
     * periodo brene = dopo 7 giorni
     * periodo lungo = dopo 30 giorni
     */
    function setDataFine(DateTime $data_inizio, string $durata){
        if($durata=='consultaione')
            $this->$data_fine = $data_inizio;
        else
            if($durata=='breve')
                $data_fine = $data_inizio->add(new DateInterval('P7D'));
            else
                $data_fine = $data_inizio->add(new DateInterval('P30D'));
    }
    
    function getDataFine() : DataTime {
        return $this->data_fine;
    }
    
    function setIdLibro(string $id_libro)
        {
            $this->id_libro=$id_libro;
        }
            
    function getIdLibro() : string{
        return $this->id_libro;
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
    
    function recuperaPrenotazione()
    {
       $disp= f_persistance::getIstance()->carica(e_prenota::class, $this->id)->getDisp();
       
       if ($disp==true)
       {
        $acquisito = f_persistance::getIstance()->carica(e_prenota::class, $this->id)->getAcquisito();
        
        if($acquisito==true)
        {
            $nick_cliente= f_persistance::getIstance()->carica(e_prenota::class, $this->id)->getNickCliente();
            $id_libro= f_persistance::getIstance()->carica(e_prenota::class, $this->id)->getIdLibro();
            rimuoviPrenotazione();
        }
       } 
    else
        echo "Attualmente non sono disponibili copie per il prestito";
    }
    
    /**
     * Metodo che elimina il prestito nel caso in cui l'utente ha restituito il libro alla biblioteca.
     * Il prestito corrispondente viene spostato nella tabella storicoPrestito
     */
    function eliminaPrestito()
    {
        $storico = f_persistance::getIstance()->carica(e_storicoPrestito::class, $this->id)->getStorico;
        if($storico==true)
            rimuoviPrestito();
    }

}

?>