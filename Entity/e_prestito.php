<?php

require_once "inc.php";

/**
 * La classe e_prestito contiene le informazioni riguardanti i prestiti ancora in corso.
 * @author gruppo 11
 * @package Entity
 */
class e_prestito 
{
	/** id prestito */
	private $id;
	/** id utente prestito */
	private $utentePrestito;
	/** id libro prestito */
	private $libroPrestito;
	/** data scadenza prestito */
	private $dataScadenza;
	/** id prenotazione prestito */
	private $prenotazione;
	
	private $prestito;
	
	function __constructor(){}
    
	/**
     * Metodo che fornisce l'id del prestito
     * @return int l'id del prestito
     */
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
	
	/**
     * Metodo che fornisce l'id dell'utente relativo al prestito
     * @return int l'id dell'utente relativo al prestito
     */
	function getUtentePrestito()
	{
		return $this->utentePrestito;
	}
	
	/**
	 * metodo che imposta l'id dell'utente relativo al prestito
	 * @param int $utentePrestito l'id dell'utente relativo al prestito
	 */
	function setUtentePrestito ( $utentePrestito)
	{
        $this->utentePrestito = $utentePrestito;
    }
	
	/**
     * Funzione che verifica che il nome utente sia valido. Il nome dell'autore si intende valido se
     * contiene solamente lettere e spazi
     * @return bool true se il nome utente e' corretto, false altrimenti
     */
	function validazioneUtentePrestito() : bool
    {
        if ($this->utentePrestito && preg_match("/^[a-zA-Z][a-zA-Z -]+$/", $this->utentePrestito)) 
            return true;
        else
            return false;
    }
	
	/**
     * Metodo che fornisce l'id del libro relativo al prestito
     * @return int l'id del libro relativo al prestito
     */
	function getLibroPrestito()
	{
		return $this->libroPrestito;
	}
	
	/**
	 * metodo che imposta l'id del libro relativo al prestito
	 * @param int $libroPrestito l'id del libro relativo al prestito
	 */
	function setLibroPrestito ( $libroPrestito)
	{
        $this->libroPrestito = $libroPrestito;
    }
	
	/**
     * Funzione che verifica che il libro sia valido. Il libro si intende valido se
     * contiene solamente lettere e spazi
     * @return bool true se il libro e' corretto, false altrimenti
     */
	  function validazioneLibroPrestito() : bool
    {
        if ($this->libroPrestito && preg_match("/^[a-zA-Z][a-zA-Z -]+$/", $this->libroPrestito)) // solo lettere e spazi
            return true;
        else
            return false;
    }
	
	/**
     * Metodo che fornisce la data di scadenza relativa al prestito
     * @return string la data di scadenza del prestito
     */
    public function getDataScadenza() : string
    {
        return $this->dataScadenza;
    }
	
	/**
	 * metodo che imposta la data di scadenza relativa al prestito
	 * @param string $dataScadenza la data di scadenza relativa al prestito nel formato y-m-d
     */
    function setDataScadenza(string $dataScadenza)
    {
        $this->dataScadenza = $dataScadenza;
    }
	
	/**
     * Costruisce la data di scadenza sommando alla data attuale il numero di giorni in basa alla durata del libro relativo al prestito.
     * @param int $days i giorni da sommare alla data
     */
    function creaDataScadenza($durata)
    {
		if($durata=="lungo"){
		$days = "30";
		$date = new DateTime();
        $date->modify("+".$days."days");
        $this->dataScadenza = $date->format('y-m-d');}
		else if ($durata=="breve"){
			$days = "7";
			$date = new DateTime();
			$date->modify("+".$days."days");
			$this->dataScadenza = $date->format('y-m-d');}
		else {
		    $days = "1";
			$date = new DateTime();
			$date->modify("+".$days."days");
			$this->dataScadenza = $date->format('y-m-d');}
    }
	
	/**
	 * metodo che imposta l'id della prenotazione relativa al prestito 
	 * @param int $prenotazione l'id della prenotazione relativa al prestito
	 */
	function setPrenotazione ( $prenotazione)
	{
        $this->prenotazione = $prenotazione;
    }
	
	/**
     * Metodo che fornisce l'id della prenotazione relativa al prestito
     * @return int l'id della prenotazione relativa al prestito
     */
	function getPrenotazione()
	{
		return $this->prenotazione;
	}
	
	/**
     * Funzione che verifica che la prenotazione sia valida. La prenotazione si intende valida se
     * contiene solamente lettere e spazi
     * @return bool true se la prenotazione e' corretta, false altrimenti
     */
	function validazionePrenotazione() : bool
    {
        if ($this->prenotazione && preg_match("/^[a-zA-Z][a-zA-Z -]+$/", $this->prenotazione)) // solo lettere e spazi
            return true;
        else
            return false;
    }
}

?>