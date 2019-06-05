<?php
/**
 * La classe f_prestito fornisce query per gli oggetti e_prestito
 * @author gruppo 11
 * @package Foundation
 */
class f_prestito
{
    /**
     * Query che effettua il salvataggio di un prestito nella tabella prestito
     * @return string contenente la query sql
     */
    static function salvaPrestito():string
    {
        return "INSERT INTO prestito(id_prestito, id_utente, id_libro, data_scadenza, id_prenotazione)
                VALUES(:id, :id_utente, :id_libro, :dataScadenza, :id_prenotazione)";
    }
    
    /**
     * Query che effettua l'aggiornamento di una prestito nella tabella prestito
     * @return string contenente la query sql
     */
    static function aggiornaPrestito() : string
    {
        return "UPDATE prestito
                SET id_prestito = :id, id_utente = :id_utente, id_libro = :id_libro, data_scadenza = :dataScadenza, id_prenotazione = :id_prenotazione
				WHERE id_prestito= :id ;";
    }
    
    /**
     * Query per il caricamento di un prestito
     * @return string sql rappresentante la SELECT.
     */
    static function caricaPrestito() : string
    {
        return "SELECT *
                FROM prestito
                WHERE id_prestito = :id ;";
    }
	static function caricaPrestiti() : string
    {
        return "SELECT *
                FROM prestito
                WHERE LOCATE( :id , id_utente) > 0;";
    }
    
    /**
     * Query che rimuove un prestito dalla tabella prestito.
     * @return string contenente la query sql
     */
    static function rimuoviPrestito() : string
    {
        return "DELETE
                FROM prestito
                WHERE id_prestito = :id ;";
    }
    
    
    /**
     * Associazione di un oggetto e_prestito ai campi di una query sql per la tabella prenota.
     * @param PDOStatement $stmt lo statement contenente i campi da riempire
     * @param e_prestito $pres il prestito da cui prelevare i dati
     */
    static function bindValues(PDOStatement &$stmt, e_prestito &$pres)
	{
        $stmt->bindValue('id', $pres->getId(), PDO::PARAM_INT);
        $stmt->bindValue(':id_utente', $pres->getUtentePrestito(), PDO::PARAM_INT);
        $stmt->bindValue(':id_libro', $pres->getLibroPrestito(), PDO::PARAM_INT);
        $stmt->bindValue(':dataScadenza', $pres->getDataScadenza(), PDO::PARAM_STR);
		$stmt->bindValue(':id_prenotazione', $pres->getPrenotazione(), PDO::PARAM_INT);
    }
	
	/**
    * Istanzia un oggetto e_prestito a partire dai valori di una tupla ricevuta dal dbms
    * @param array $ennupla la tupla ricevuta dal dbms
    * @return prestito l'oggetto e_prestito risultato dell'operazione
    */
    static function creaOggettoDaRiga($riga) : e_prestito
    {
        // creazione dell'oggetto e_storico
        $prestito = new e_prestito();
        $prestito->setId($riga['id_prestito']);
        $prestito->setUtentePrestito($riga['id_utente']);
        $prestito->setLibroPrestito($riga['id_libro']);
        $prestito->setDataScadenza($riga['data_scadenza']);
        $prestito->setPrenotazione($riga['id_prestito']);
                   
        return $prestito;
    }
}

?>