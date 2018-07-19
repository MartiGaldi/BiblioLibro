<?php

require_once'inc.php';
include_once 'Entity/e_oggetto.php';

/**
 * La classe e_prenota caratterizza le prenotazioni effettuate dall'utente.
 * Se entro tre giorni da quando viene effettuata la prenotazione per un determinato libro,
 * l'utente non si reca il biblioteca per prendere il libro,
 * la prenotazione viene eliminata. 
 */

class e_prenota extends e_oggetto {
    
    private $data;
    private $nick_cliente;
    private $id_libro;
    private $data_fine;
    private $acquisito = false;
    private $disp = false;
    
    function __constructor(){}
    
    function setData (DateTime $data){
        $this->data=new DateTime($data);
    }
    
    function getData(bool $mostraFormato = null)
    {
        if($this->data)
        {
            $formato="Y-m-d";
            if($mostraFormato)
                $formato= "Y/m/d";
            return $this->data->format($formato);
        }
        else
            return NULL;
    }
    
    
    function setNickCliente (string $nick_cliente){
        $this->nick_cliente=$nick_cliente;
    }
    
    function getNickCliente() : string{
        return $this->nick_cliente;
    }
    
    function setIdLibro(string $id_libro){
        $this->id_libro=$id_libro;
    }
    
    function getIdLibro() : string {
        return $this->id_libro;
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
    
    /**
     * Metodo che permette di verificare se un testo è presente oppure no nella biblioteca
     */
    function setDisp(bool $disp)
        {
            $numero=contaNumero();
            $num_copie= f_persistance::getIstance()->carica(e_libro::class, $this->id)->getNumCopie();
            
            if($num_copie<=$numero)
                $disp=false;
            else
                $disp=true;
        
        $this->disp=$disp;
        }
    
    function getDisp() : bool {
        return $this->disp;
    }
    
   
    /**
     * Metodo che permette il controllo della prenotazione
     */
    function controllaPrenotazione(bool $acquisito)
    {
        if($acquisito == false)
           eliminaPrenotazione();
    }  
    
    /**
     * Metodo che elimina la prenotazione se entro tre giorni il libro non viene ritirato
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