<?php

require_once "inc.php";

/**
 * La classe e_prestito contiene le informazioni riguardanti i prestiti ancora in corso.
 * @author gruppo 11
 * @package Entity
 */
class e_prestito 
{
	private $id;
	private $utentePrestito;
	private $libroPrestito;
	private $dataScadenza;
	private $prenotazione;
	
	private $prestito;
	
	function __constructor(){}
    
	function getId() : int
    {
        if(!$this->id)
            return 0;
        else return $this->id;
    }
    
    function setId(int $id)
    {
        $this->id=$id;
    }
	
	function getUtentePrestito()
	{
		return $this->utentePrestito;
	}
	
	function setUtentePrestito ( $utentePrestito)
	{
        $this->utentePrestito = $utentePrestito;
    }
	
	function getLibroPrestito()
	{
		return $this->libroPrestito;
	}
	
	function setLibroPrestito ( $libroPrestito)
	{
        $this->libroPrestito = $libroPrestito;
    }
	
    public function getDataScadenza() : string
    {
        return $this->dataScadenza;
    }
	
    function setDataScadenza(string $dataScadenza)
    {
        $this->dataScadenza = $dataScadenza;
    }
	
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
	
	function setPrenotazione ( $prenotazione)
	{
        $this->prenotazione = $prenotazione;
    }
	
	function getPrenotazione()
	{
		return $this->prenotazione;
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