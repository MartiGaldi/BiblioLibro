<?php
class f_storico
{
	/**
     * Query che effettua il salvataggio di un prestito nella tabella prestito
     * @return string contenente la query sql
     */
    static function salvaStorico():string
    {
        return "INSERT INTO storico(id_storico, id_utente, id_libro, data_scadenza, id_prestito)
                VALUES(:id, :id_utente, :id_libro, :dataScadenza, :idPrestito)";
    }
    
    /**
     * Query che effettua l'aggiornamento di una prestito nella tabella prestito
     * @return string contenente la query sql
     */
    static function aggiornaStorico() : string
    {
        return "UPDATE storico
                SET id_storico = :id, id_utente = :id_utente, id_libro = :id_libro, data_scadenza = :dataScadenza
				WHERE id_storico= :id ;";
    }
    
    /**
     * Query per il caricamento di uno storico
     * @return string sql rappresentante la SELECT.
     */
    static function caricaStorico() : string
    {
        return "SELECT *
                FROM storico
                WHERE id_storico = :id;";
    }
    
    /**
     * Query che rimuove uno storico dalla tabella storico.
     * @return string contenente la query sql
     */
    static function rimuoviStorico() : string
    {
        return "DELETE
                FROM storico
                WHERE id_storico = :id ;";
    }
    
    
    /**
     * Associazione di un oggetto e_storico ai campi di una query sql per la tabella storico.
     * @param PDOStatement $stmt lo statement contenente i campi da riempire
     * @param e_storico $stor il prestito da cui prelevare i dati
     */
    static function bindValues(PDOStatement &$stmt, e_storico &$stor)
	{
        $stmt->bindValue('id', $stor->getId(), PDO::PARAM_INT);
        $stmt->bindValue(':id_utente', $stor->getUtentePrestito(), PDO::PARAM_INT);
        $stmt->bindValue(':id_libro', $stor->getLibroPrestito(), PDO::PARAM_INT);
        $stmt->bindValue(':dataScadenza', $stor->getDataScadenza(), PDO::PARAM_STR);
		$stmt->bindValue(':id_prestito', $stor->getIdPrestito(), PDO::PARAM_INT);
    }
}
?>