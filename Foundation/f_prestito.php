<?php
class f_prestito
{
    /**
     * Query che effettua il salvataggio di un prestito nella tabella prestito
     * @return string contenente la query sql
     */
    static function salvaPrestito():string
    {
        return "INSERT INTO prestito(id_prestito, id_utente, id_libro, data_scadenza)
                VALUES(:id, :id_utente, :id_libro, :dataScadenza)";
    }
    
    /**
     * Query che effettua l'aggiornamento di una prestito nella tabella prestito
     * @return string contenente la query sql
     */
    static function aggiornaPrestito() : string
    {
        return "UPDATE prestito
                SET id_prestito = :id, id_utente = :id_utente, id_libro = :id_libro, data_scadenza = :dataScadenza
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
                WHERE id_prestito = :id;";
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
    }
}

?>