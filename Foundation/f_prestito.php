<?php
class f_prestito{
    /**
     * Query che effettua il salvataggio di un prestito nella tabella prestito
     * @return string contenente la query sql
     */
    static function salvaPrestito():string
    {
        return "INSERT INTO prestito(id,nick_cliente,data_inizio,data_fine,id_libro,prenotazione,rientro,storico)
                VALUES(:id,:nick_cliente,:data_inizio,:data_fine,:id_libro,:prenotazione,:rientro,:storico)";
    }
    
    /**
     * Query che effettua l'aggiornamento di una prestito nella tabella prestito
     * @return string contenente la query sql
     */
    static function aggiornaPrestito() : string
    {
        return "UPDATE prestito
                SET nick_cliente = :nick_cliente, data_inizio = :data_inizio, data_fine = :data_fine, id_libro = :id_libro, prenotazione = :prenotazione, rientro = :rientro, storico = :storico
                WHERE id = :id;";
    }
    
    /**
     * Query per il caricamento di un prestito
     * @return string sql rappresentante la SELECT.
     */
    static function caricaPrestito() : string
    {
        return "SELECT *
                FROM prestito
                WHERE id = :id;";
    }
    
    /**
     * Query che rimuove un prestito dalla tabella prestito.
     * @return string contenente la query sql
     */
    static function rimuoviPrestito() : string
    {
        return "DELETE
                FROM prestito
                WHERE id = :id;";
    }
    
    /**
     * Cancella tutte le entry di una query. Usata a scopo di debug.
     * @param PDO $db
     */
    static function tabellaVuota (PDO &$database)
    {
        $database->beginTransaction();                         //inizio transazione
        $stmt = $database->prepare("TRUNCATE TABLE prestito;");    //prepara lo statement
        $stmt->execute();
        $database->commit();
    }
    
    /**
     * Associazione di un oggetto e_prestito ai campi di una query sql per la tabella prenota.
     * @param PDOStatement $stmt lo statement contenente i campi da riempire
     * @param e_prestito $pres il prestito da cui prelevare i dati
     */
    static function bindValues(PDOStatement &$stmt, e_prestito &$pres){
        $stmt->bindValue('id', $pres->getId(), PDO::PARAM_INT);
        $stmt->bindValue(':nick_cliente', $pres->getNickCliente(), PDO::PARAM_STR);
        $stmt->bindValue(':data_inizio', $pres->getDataInizio(), PDO::PARAM_STR);
        $stmt->bindValue(':data_fine', $pres->getDataFine(), PDO::PARAM_STR);
        $stmt->bindValue(':id_libro', $pres->getIdLibro(), PDO::PARAM_INT);
        $stmt->bindValue('prenotazione', $pres->getPrenotazione(), PDO::PARAM_STR);
        $stmt->bindValue(':rientro', $pres->getRientro(), PDO::PARAM_BOOL);
        $stmt->bindValue(':storico', $pres->getStorico(), PDO::PARAM_BOOL);
    }
    
}

?>