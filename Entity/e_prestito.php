<?php

require_once "inc.php";

/**
 * La classe e_prestito contiene le informazioni riguardanti i prestiti ancora in corso.
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
	
	function validazioneUtentePrestito() : bool
    {
        if ($this->utentePrestito && preg_match("/^[a-zA-Z][a-zA-Z -]+$/", $this->utentePrestito)) // solo lettere e spazi
            return true;
        else
            return false;
    }
	
	  function validazioneLibroPrestito() : bool
    {
        if ($this->libroPrestito && preg_match("/^[a-zA-Z][a-zA-Z -]+$/", $this->libroPrestito)) // solo lettere e spazi
            return true;
        else
            return false;
    }
	
	function validazionePrenotazione() : bool
    {
        if ($this->prenotazione && preg_match("/^[a-zA-Z][a-zA-Z -]+$/", $this->prenotazione)) // solo lettere e spazi
            return true;
        else
            return false;
    }
}

?>