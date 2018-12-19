<?php
class f_storico
{
    /**
     * Query che effettua il salvataggio di un prestito nella tabella storico_prestito
     * @return string contenente la query sql
     */
    static function salvaStoricoPrestito():string
    {
        return "INSERT INTO storico_prestito(id,nick_cliente,data_inizio,data_fine,id_libro,prenotazione,rientro,storico)
                VALUES(:id,:nick_cliente,:data_inizio,:data_fine,:id_libro,:prenotazione,:rientro,:storico)";
    }
    
    /**
     * Query che effettua l'aggiornamento di una prestito nella tabella storico_prestito
     * @return string contenente la query sql
     */
    static function aggiornaStoricoPrestito() : string
    {
        return "UPDATE storico_prestito
                SET nick_cliente = :nick_cliente, data_inizio = :data_inizio, data_fine = :data_fine, id_libro = :id_libro, prenotazione = :prenotazione, rientro = :rientro, storico = :storico
                WHERE id = :id;";
    }
    
    /**
     * Query per il caricamento di un prestito nello storico
     * @return string sql rappresentante la SELECT.
     */
    static function caricaStoricoPrestito() : string
    {
        return "SELECT *
                FROM storico_prestito
                WHERE id = :id;";
    }
    
    /**
     * Query che rimuove un prestito dalla tabella storico_prestito.
     * @return string contenente la query sql
     */
    static function rimuoviStoricoPrestito() : string
    {
        return "DELETE
                FROM storico_prestito
                WHERE id = :id;";
    }
    
    /**
     * Cancella tutte le entry di una query. Usata a scopo di debug.
     * @param PDO $db
     */
    static function tabellaVuota (PDO &$database)
    {
        $database->beginTransaction();                         //inizio transazione
        $stmt = $database->prepare("TRUNCATE TABLE storico_prestito;");    //prepara lo statement
        $stmt->execute();
        $database->commit();
    }
    
    /**
     * Associazione di un oggetto e_storicoPrestito ai campi di una query sql per la tabella prenota.
     * @param PDOStatement $stmt lo statement contenente i campi da riempire
     * @param e_prestito $pres il prestito da cui prelevare i dati
     */
    static function bindValues(PDOStatement &$stmt, e_prestito &$stor){
        $stmt->bindValue('id', $stor->getId(), PDO::PARAM_INT);
        $stmt->bindValue(':nick_cliente', $stor->getNickCliente(), PDO::PARAM_STR);
        $stmt->bindValue(':data_inizio', $stor->getDataInizio(), PDO::PARAM_STR);
        $stmt->bindValue(':data_fine', $stor->getDataFine(), PDO::PARAM_STR);
        $stmt->bindValue(':id_libro', $stor->getIdLibro(), PDO::PARAM_INT);
        $stmt->bindValue('prenotazione', $stor->getPrenotazione(), PDO::PARAM_STR);
        $stmt->bindValue(':rientro', $stor->getRientro(), PDO::PARAM_BOOL);
        $stmt->bindValue(':storico', $stor->getStorico(), PDO::PARAM_BOOL);
    }
    
}

?>