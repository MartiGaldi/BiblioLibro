<?php

require_once 'inc.php';

/**
 * La classe e_storicoPrestito estende la classe e_oggetto e rappresenta
 * i prestiti storici (conclusi) associati ad un determinato libro.
 * @package Entity
 * @author gruppo 11
 */

class e_storico
{
	/** id storico */
	private $id;
	/** id utente storico */
	private $utenteStorico;
	/** id libro storico */
	private $libroStorico;
	/** data scadenza storico */
	private $dataScadenza;
	/** id prestito storico */
	private $idPrestito;
	
	private $storico;
	
	
	function __constructor(){}
    
	/**
     * Metodo che fornisce l'id dello storico
     * @return int l'id dello storico
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
     * Metodo che fornisce l'id dell'utente relativo allo storico
     * @return int l'id dell'utente relativo allo storico
     */
	function getUtenteStorico()
	{
		return $this->utenteStorico;
	}
	
	/**
	 * metodo che imposta l'id dell'utente relativo allo storico
	 * @param int $utenteStorico l'id dell'utente relativo allo storico
	 */
	function setUtenteStorico ( $utenteStorico)
	{
        $this->utenteStorico = $utenteStorico;
    }
	
	/**
     * Funzione che verifica che il nome utente sia valido. Il nome dell'utente si intende valido se
     * contiene solamente lettere e spazi
     * @return bool true se il nome utente e' corretto, false altrimenti
     */
	function validazioneUtenteStorico() : bool
    {
        if ($this->utenteStorico && preg_match("/^[a-zA-Z][a-zA-Z -]+$/", $this->utenteStorico)) // solo lettere e spazi
            return true;
        else
            return false;
    }
	
	/**
     * Metodo che fornisce l'id del libro relativo allo storico
     * @return int l'id del libro relativo allo storico
     */
	function getLibroStorico()
	{
		return $this->libroStorico;
	}
	
	/**
	 * metodo che imposta l'id del libro relativo allo storico 
	 * @param int $libroStorico l'id del libro relativo allo storico
	 */
	function setLibroStorico ( $libroStorico)
	{
        $this->libroStorico = $libroStorico;
    }
	
	/**
     * Funzione che verifica che il libro sia valido. Il libro si intende valido se
     * contiene solamente lettere e spazi
     * @return bool true se il libro e' corretto, false altrimenti
     */
	  function validazioneLibroStorico() : bool
    {
        if ($this->libroStorico && preg_match("/^[a-zA-Z][a-zA-Z -]+$/", $this->libroStorico)) // solo lettere e spazi
            return true;
        else
            return false;
    }
	
	/**
     * Metodo che fornisce la data di scadenza del prestito relativo allo storico
     * @return string la data di scadenza del prestito relativo allo storico
     */
    public function getDataScadenza() : string
    {
        return $this->dataScadenza;
    }
	
	/**
	 * metodo che imposta la data di scadenza del prestito relativo allo storico
	 * @param string $dataScadenza la data di scadenza del prestito relativo allo storico nel formato y-m-d
     */
    function setDataScadenza(string $dataScadenza)
    {
        $this->dataScadenza = $dataScadenza;
    }
	
	/**
     * Metodo che fornisce l'id del prestito relativo allo storico
     * @return int l'id del prestito relativo allo storico
     */
	function getIdPrestito()
	{
		return $this->idPrestito;
	}
	
	/**
	 * metodo che imposta l'id del prestito relativo allo storico 
	 * @param int $idPrestito l'id del prestito relativo allo storico
	 */
	function setIdPrestito ($idPrestito)
	{
        $this->idPrestito = $idPrestito;
    }
	
	/**
     * Funzione che verifica che l'id prestito sia valido. L'id prestito si intende valido se
     * contiene solamente lettere e spazi
     * @return bool true se l'id prestito e' corretto, false altrimenti
     */
	function validazioneIdPrestito() : bool
    {
        if ($this->idPrestito && preg_match("/^[a-zA-Z][a-zA-Z -]+$/", $this->idPrestito)) // solo lettere e spazi
            return true;
        else
            return false;
    }
}
?>