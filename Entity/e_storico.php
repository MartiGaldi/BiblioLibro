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
	private $id;
	private $utenteStorico;
	private $libroStorico;
	private $dataScadenza;
	private $idPrestito;
	
	private $storico;
	
	
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
	
	function getUtenteStorico()
	{
		return $this->utenteStorico;
	}
	
	function setUtenteStorico ( $utenteStorico)
	{
        $this->utenteStorico = $utenteStorico;
    }
	
	function getLibroStorico()
	{
		return $this->libroStorico;
	}
	
	function setLibroStorico ( $libroStorico)
	{
        $this->libroStorico = $libroStorico;
    }
	
    public function getDataScadenza() : string
    {
        return $this->dataScadenza;
    }
	
    function setDataScadenza(string $dataScadenza)
    {
        $this->dataScadenza = $dataScadenza;
    }
	
	function getIdPrestito()
	{
		return $this->idPrestito;
	}
	
	function setIdPrestito ($idPrestito)
	{
        $this->idPrestito = $idPrestito;
    }
	
	/**
     * Funzione che verifica che il nome utente sia valido. Il nome dell'autore si intende valido se
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