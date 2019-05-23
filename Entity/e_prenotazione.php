<?php

require_once'inc.php';

/**
 * La classe e_prenota caratterizza le prenotazioni effettuate dall'utente.
 * Se entro tre giorni da quando viene effettuata la prenotazione per un determinato libro,
 * l'utente non si reca in biblioteca per ritirarlo, la prenotazione viene eliminata. 
 */

class e_prenotazione
{
	/*private $id; //libro
    private $id_prenotazione;
	private $id_utente;
    private $data;
    private $data_fine;
    private $acquisito = false;
    private $disp = false;
	
	private $prenotazione;
    
    function __constructor(){}
    
	
	 function getId() : int {
        if(!$this->id)
            return 0;
        else return $this->id;
    }
    
    function setId(int $id) {
        $this->id = $id;
    }
	
	
	function getIdPrenotazione() : int
    {
        if(!$this->id_prenotazione)
            return 0;
        else return $this->id_prenotazione;
    }
    
    function setIdPrenotazione(int $id_prenotazione)
    {
        $this->id_prenotazione=$id_prenotazione;
    }
	
	
    function setIdUtente(e_utente $id_utente)
    {
        $this->id_utente = $id_utente;  
    }
        
    function getIdUtente() : e_utente
    {
        return $this->id_utente;
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
   /* function setDataFine(date $data_fine) {
        $this->data_fine = $data_fine;
    }
    
    function getDataFine() : date {
        return $this->$data_fine;
    }*/
	
	
	
   /* function setAcquisito(bool $acquisito) {
        $this->acquisito=$acquisito;
    }
    
    function getAcquisito() : bool {
        return $this->acquisito;
    }
    
    /**
     * Metodo che permette di verificare se un testo è presente oppure no nella biblioteca
     */
   /** function setDisp(bool $disp)
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
    /*function controllaPrenotazione(bool $acquisito)
    {
        if($acquisito == false)
           eliminaPrenotazione();
    }  
    
    /**
     * Metodo che elimina la prenotazione se entro tre giorni il libro non viene ritirato
     */
   /* function eliminaPrenotazione(int $id, DateTime $data_fine){
        $data_odierna=time();
        if($data_odierna>$data_fine)
        {
            rimuoviPrenotazione();
        }
    }
	
	
	function getPrenotazione (){
		return $this->prenotazione;
	}
	
	function setPrenotazione ($prenotazione){
		$this->prenotazione = $prenotazione;
	}
}*/
	private $utentePrenotazione;
	private $libroPrenotazione;
	private $dataScadenza;
	
	function __construct(){}
	
	function getUtentePrenotazione() : e_utente
	{
		return $this->utentePrenotazione;
	}
	
	function setUtentePrenotazione (e_utente $utentePrenotazione)
	{
        $this->utentePrenotazione = $utentePrenotazione;
    }
	
	function getLibroPrenotazione() : e_libro
	{
		return $this->libroPrenotazione;
	}
	
	function setLibroPrenotazione (e_libro $libroPrenotazione)
	{
        $this->libroPrenotazione = $libroPrenotazione;
    }
	
	/**
     * @return string la data di scadenza della prenotazione
     */
    public function getDataScadenza() : string
    {
        return $this->dataScadenza;
    }
	/**
     * @param string $dataScadenza la data di scadenza nel formato y-m-d
     */
    function setDataScadenza(string $dataScadenza)
    {
        $this->dataScadenza = $dataScadenza;
    }
	
	/**
     * Costruisce la data di scadenza sommando alla data attuale il numero di giorni passati alla funzione.
     * @param int $days i giorni da sommare alla data
     */
    function creaDataScadenza()
    {
		$days = "3";
        $date = new DateTime();
        $date->modify("+".$days."days");
        $this->dataScadenza = $date->format('y-m-d');
    }
	
	/**
     * Verifica che la prenotazione sia valido.
     * @return bool true se l'associazione e' valida, false altrimenti
     */
    function isValid(): bool
    {
        if ($this->utentePrenotazione->getId() != $this->utentePrenotazione->getId())
        {
            if (is_a($this->getUtentePrenotazione(), e_utente::class))
            {
                if(is_a($this->getUtentePrenotazione(), e_visitatore::class))
                    return false;
                else
                    return true;
            }
            else
                return false;
        } 
        else
            return false;
    }
	
	 /**
     * Verifica che la prenotazione esiste gia
     * @return bool true se la prenotazione esiste, false altrimenti
     */
    function esiste() : bool
    {
        $utentePrenotazioneId = $this->utentePrenotazione->getId();
        $libroPrenotazioneId = $this->libroPrenotazione->getId();
        
        if(f_persistance::getInstance()->esiste(e_prenotazione::class, f_target::ESISTE_PRENOTAZIONE, $utentePrenotazioneId, $libroPrenotazioneId))
            return true;
        else 
            return false;
    }
	}
?>