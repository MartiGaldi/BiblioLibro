<?php

class f_prenota{
    /**
    * Query che effettua il salvataggio di una prenotazione nella tabella prenota
    * @return string contenente la query sql
    */
    static function salvaPrenotazione() : string
    {
        return "INSERT INTO prenota(id,data,nick_cliente,isbn,data_fine,acquisito,disp)
                VALUES(:id,:data,:nick_cliente,:isbn,:data_fine,:acquisito,:disp)";
    }

    /**
    * Query che effettua l'aggiornamento di una prenotazione nella tabella prenota
    * @return string contenente la query sql 
    */
    static function aggiornaPrenotazione() : string
    {
        return "UPDATE prenotazione
                SET data = :data, nick_cliente = :nick_cliente, isbn = :isbn, data_fine = :data_fine, acquisito = :acquisito, disp = :disp
                WHERE id = :id;";
    }
    
    /**
    * Query per il caricamento di una prenotazione
    * @return string sql rappresentante la SELECT.
    */    
    static function caricaPrenotazione() : string 
    {
        return "SELECT *
                FROM prenotazione
                WHERE id = :id;";
    }
    
    /**
    * Query che rimuove una prenotazione dalla tabella prenota.
    * @return string contenente la query sql
    */
    static function rimuoviPrenotazione() : string
    {
        return "DELETE
                FROM prenotazione
                WHERE id = :id;";
    }
    
    /**
     * Cancella tutte le entry di una query. Usata a scopo di debug.
     * @param PDO $db
     */
    static function tabellaVuota (PDO &$database)
    {
        $database->beginTransaction();                         //inizio transazione
        $stmt = $database->prepare("TRUNCATE TABLE prenota;");    //prepara lo statement
        $stmt->execute();
        $database->commit();
    }
    
    /**
     * Associazione di un oggetto e_prenota ai campi di una query sql per la tabella prenota.
     * @param PDOStatement $stmt lo statement contenente i campi da riempire
     * @param e_prenota $pren la prenotazione da cui prelevare i dati
     */
    static function bindValues(PDOStatement &$stmt, e_prenota &$pren)
    {
        $stmt->bindValue('id', $pren->getId(), PDO::PARAM_INT);
        $stmt->bindValue('data', $pren->getData(), PDO::PARAM_STR);
        $stmt->bindValue(':nick_cliente', $pren->getNickCliente(), PDO::PARAM_STR);
        $stmt->bindValue(':isbn', $pren->getIsbn(), PDO::PARAM_STR);
        $stmt->bindValue(':data_fine', $pren->getDataFine(), PDO::PARAM_STR);
        $stmt->bindValue('acquisito', $pren->getAcquisito(), PDO::PARAM_BOOL);
        $stmt->bindValue('disp', $pren->getDisp(), PDO::PARAM_BOOL);
    }
    
    /**
     * Istanzia un oggetto e_prenota a partire dai valori di una tupla ricevuta dal dbms
     * @param array $ennupla la tupla ricevuta dal dbms
     * @return prenota l'oggetto e_prenota risultato dell'operazione
     */
    static function creaOggettoDaDB($ennupla)
    {
        // creazione dell'oggetto e_libro
        $prenota = new e_prenota();
        $prenota->setId($ennupla['id']);
        $prenota->setData($ennupla['data']);
        $prenota->setNickCliente($ennupla['nick_cliente']);
        $prenota->setIsbn($ennupla['isbn']);
        $prenota->setDataFine($ennupla['data_fine']);
        $prenota->setAcquisito($ennupla['acquisito']);
        $prenota->setDisp($ennupla['disp']);
        
        return $prenota;
    }
    
    static function contaNumero() : int
    {
        return "SELECT count (*)
                FROM prenota INNER JOIN prestito
                WHERE isbn = :isbn AND prenota.isbn = prestito.isbn;";
    }
}

?>