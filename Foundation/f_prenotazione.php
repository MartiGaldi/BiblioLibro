<?php

/**
 * La classe f_prenotazione fornisce query per gli oggetti e_prenotazione
 * @author gruppo 11
 * @package Foundation
 */
class f_prenotazione
{
    /**
     * Query che effettua il salvataggio di una prenotazione nella tabella prenotazione
     * @return string contenente la query sql
     */
    static function salvaPrenotazione() : string
    {
        return "INSERT INTO prenotazione(id_prenotazione, id_utente, id_libro , data_scadenza)
                VALUES(:id, :id_utente, :id_libro, :dataScadenza)";
    }

    /**
     * Query che effettua l'aggiornamento di una prenotazione nella tabella prenotazione
     * @return string contenente la query sql 
     */
    static function aggiornaPrenotazione() : string
    {
        return "UPDATE prenotazione
                SET id_prenotazione= :id, id_utente= :id_utente, id_libro = :id_libro, data_scadenza = :dataScadenza
                WHERE id_prenotazione = :id ;";
    }
    
    /**
     * Query per il caricamento di una prenotazione
     * @return string sql rappresentante la SELECT.
     */    
    static function caricaPrenotazione() : string 
    {
        return "SELECT *
                FROM prenotazione
                WHERE id_prenotazione = :id ";
    }
	
	/**
     * Query per il caricamento di più prenotazioni
     * @return string sql rappresentante la SELECT.
     */ 
	static function caricaPrenotazioni() : string 
    {
        return "SELECT *
                FROM prenotazione
                WHERE LOCATE( :id , id_utente) > 0";
    }
    
    /**
     * Query che rimuove una prenotazione dalla tabella prenotazione.
     * @return string contenente la query sql
     */
    static function rimuoviPrenotazione() : string
    {
        return "DELETE
                FROM prenotazione
                WHERE id_prenotazione = :id ; ";
    }
	
	/**
     * Controlla se la prenotazione è già presente
     * @return string la stringa sql pe l'EXISTS
     */
    /*static function prenotazioneEsistente() : string
    {
        return        "SELECT *
                       FROM prenotazione
                       WHERE id = :value; ";
    }*/
    
    
    /**
     * Associazione di un oggetto e_prenotazione ai campi di una query sql per la tabella prenotazione.
     * @param PDOStatement $stmt lo statement contenente i campi da riempire
     * @param e_prenotazione $prenotazione la prenotazione da cui prelevare i dati
     */
    static function bindValues(PDOStatement &$stmt, e_prenotazione &$prenotazione)
    {
		$stmt->bindValue(':id', $prenotazione->getId(), PDO::PARAM_INT);
        $stmt->bindValue(':id_utente', $prenotazione->getUtentePrenotazione(), PDO::PARAM_INT);
		$stmt->bindValue(':id_libro', $prenotazione->getLibroPrenotazione(), PDO::PARAM_INT);
        $stmt->bindValue(':dataScadenza', $prenotazione->getDataScadenza(), PDO::PARAM_STR);
    }
    
    /**
     * Istanzia un oggetto e_prenotazione a partire dai valori di una tupla ricevuta dal dbms
     * @param array $ennupla la tupla ricevuta dal dbms
     * @return prenota l'oggetto e_prenotazione risultato dell'operazione
     */
    static function creaOggettoDaRiga($riga) : e_prenotazione
    {
        $prenotazione = new e_prenotazione();
        $prenotazione->setId($riga['id_prenotazione']);
		$prenotazione->setUtentePrenotazione($riga['id_utente']);
		$prenotazione->setLibroPrenotazione($riga['id_libro']);
        $prenotazione->setDataScadenza($riga['data_scadenza']);
        
        return $prenotazione;
    }
    
}

?>