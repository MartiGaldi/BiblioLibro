<?php

require_once'inc.php';

/**
 * La classe e_prenota caratterizza le prenotazioni effettuate dall'utente.
 * Se entro tre giorni da quando viene effettuata la prenotazione per un determinato libro,
 * l'utente non si reca in biblioteca per ritirarlo, la prenotazione viene eliminata. 
 */

class e_prenota
{
	private $id;
    private $id_prenota;
	private $nick_utente;
    private $data;
    private $data_fine;
    private $acquisito = false;
    private $disp = false;
	
	private $prenota;
    
    function __constructor(){}
    
	
	 function getId() : int {
        if(!$this->id)
            return 0;
        else return $this->id;
    }
    
    function setId(int $id) {
        $this->id = $id;
    }
	
	
	function getIdPrenota() : int
    {
        if(!$this->id_prenota)
            return 0;
        else return $this->id_prenota;
    }
    
    function setIdPrenota(int $id_prenota)
    {
        $this->id_prenota=$id_prenota;
    }
	
	
    function setNickUtente(string $nick_utente)
    {
        $this->nick_utente = $nick_utente;  
    }
        
    function getNickUtente() : string
    {
        return $this->nick_utente;
    }
	
    
	
	
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
	
	
	function getPrenota (){
		return $this->prenota;
	}
	
	function setPrenota ($prenota){
		$this->prenota = $prenota;
	}
}

?>