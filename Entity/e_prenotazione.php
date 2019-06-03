<?php

require_once'inc.php';

/**
 * La classe e_prenota caratterizza le prenotazioni effettuate dall'utente.
 * Se entro tre giorni da quando viene effettuata la prenotazione per un determinato libro,
 * l'utente non si reca in biblioteca per ritirarlo, la prenotazione viene eliminata. 
 */

class e_prenotazione
{
	private $id;
	private $utentePrenotazione;
	private $libroPrenotazione;
	private $dataScadenza;
	
	function __construct(){}
	
	function getId() : int {
        if(!$this->id)
            return 0;
        else return $this->id;
    }
    
    function setId(int $id) {
        $this->id = $id;
    }
	
	function getUtentePrenotazione()
	{
		return $this->utentePrenotazione;
	}
	
	function setUtentePrenotazione ( $utentePrenotazione)
	{
        $this->utentePrenotazione = $utentePrenotazione;
    }
	
	function getLibroPrenotazione()
	{
		return $this->libroPrenotazione;
	}
	
	function setLibroPrenotazione ( $libroPrenotazione)
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