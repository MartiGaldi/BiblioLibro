<?php

require_once'inc.php';

/**
 * La classe e_prenotazione caratterizza le prenotazioni effettuate dall'utente.
 * Se entro tre giorni da quando viene effettuata la prenotazione per un determinato libro,
 * l'utente non si reca in biblioteca per ritirarlo, la prenotazione viene eliminata. 
 * @author gruppo 11
 * @package Entity
 */

class e_prenotazione
{
	/** id prenotazione */
	private $id;
	/** id utente prenotazione */
	private $utentePrenotazione;
	/** id libro prenotazione */
	private $libroPrenotazione;
	/** data scadenza prenotazione */
	private $dataScadenza;
	
	function __construct(){}
	
	/**
     * Metodo che fornisce l'id della prenotazione
     * @return int l'id della prenotazione
     */
	function getId() : int {
        if(!$this->id)
            return 0;
        else return $this->id;
    }
    
	/**
     * @param int $id l'identificativo dell'oggetto Entity
     */
    function setId(int $id) {
        $this->id = $id;
    }
	
	/**
     * Metodo che fornisce l'id dell'utente relativo alla prenotazione
     * @return int l'id dell'utente relativo alla prenotazione
     */
	function getUtentePrenotazione()
	{
		return $this->utentePrenotazione;
	}
	
	/**
	 * metodo che imposta l'id dell'utente relativo alla prenotazione
	 * @param int $utentePrenotazione l'id dell'utente relativo alla prenotazione
	 */
	function setUtentePrenotazione ( $utentePrenotazione)
	{
        $this->utentePrenotazione = $utentePrenotazione;
    }
	
	/**
     * Metodo che fornisce l'id del libro relativo alla prenotazione
     * @return int l'id del libro relativo alla prenotazione
     */
	function getLibroPrenotazione()
	{
		return $this->libroPrenotazione;
	}
	
	/**
	 * metodo che imposta l'id del libro relativo alla prenotazione 
	 * @param int $libroPrenotazione l'id del libro relativo alla prenotazione
	 */
	function setLibroPrenotazione ( $libroPrenotazione)
	{
        $this->libroPrenotazione = $libroPrenotazione;
    }
	
	/**
	 * Metodo che fornisce la data di scadenza relativa alla prenotazione
     * @return string la data di scadenza della prenotazione
     */
    public function getDataScadenza() : string
    {
        return $this->dataScadenza;
    }
	
	/**
	 * metodo che imposta la data di scadenza relativa alla prenotazione
	 * @param string $dataScadenza la data di scadenza relativa alla prenotazione nel formato y-m-d
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