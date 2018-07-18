<?php

class f_infoLibro{
    
    /**
     * Salva una e_infoLibro nel database
     * @param PDO $database la connessione verso il dbms
     * @return string la query sql per la INSERT
     */
    static function salvaInfoLibro():string
    {
        return "INSERT INTO infoLibro(id,isbn,descrizione)
                VALUES(:id,:isbn,:descrizione)";
    }
    
    /**
     * Carica info_libro dal database.
     * @return string la query sql per la SELECT
     */
    static function caricaInfoLibro() : string
    {
        return "SELECT *
                FROM infoLibro
                where id = :id;"; //query sql
    }
    
    /**
     * Query che effettua l'aggiornamento delle info di un libro nella tabella infoLibro
     * @return string contenente la query sql
     */
    static function aggiornaInfoLibro() : string
    {
        return "UPDATE infoLibro
                SET isbn = :isbn, descrizione = :descrizione
                WHERE id = :id;";
    }
    
    /**
     * Elimina le info di un libro dal database .
     * @param PDO $database la connessione al dbms
     * @param int $isbn il libro da eliminare
     */
    static function eliminaInfoLibro() : string
    {
        return "DELETE
                FROM infoLibro
                WHERE id = :id ;"; //query sql
    }
    
    /**
     * Cancella tutte le entry di una query. Usata a scopo di debug.
     * @param PDO $db
     */
    static function tabellaVuota (PDO &$database)
    {
        $database->beginTransaction();                         //inizio transazione
        $stmt = $database->prepare("TRUNCATE TABLE infoLibro;");    //prepara lo statement
        $stmt->execute();
        $database->commit();
    }
    
    /**
     * Associa ai campi della query i corrispondenti attributi dell'oggetto e_infoLibro.
     * @param PDOStatement $stmt da cui prelevare i campi
     * @param e_infoLibro $infl da cui prelevare gli attributi
     */
    static function bindValues(PDOStatement &$stmt, e_infoLibro &$infl)
    {
        $stmt->bindValue(':id', $infl->getId(), PDO::PARAM_INT);
        if($infl->getIsbn())
            $stmt->bindValue(':isbn', $infl->getIsbn, PDO::PARAM_STR);
        else
            $stmt->bindValue(':isbn', 'NULL', PDO::PARAM_STR);
        if($infl->getDescrizione())
            $stmt->bindValue(':descrizione', $infl->getDescrizione(), PDO::PARAM_STR);
        else
            $stmt->bindValue(':descrizione', 'NULL', PDO::PARAM_STR);
    }
    
    /**
     * Istanzia un oggetto e_infoLibro a partire dai valori di una tupla ricevuta dal dbms
     * @param array $ennupla la tupla ricevuta dal dbms
     * @return infoLibro l'oggetto e_infoLibro risultato dell'operazione
     */
    static function creaOggettoDaDB($ennupla)
    {
        // creazione dell'oggetto e_infoLibro
        $info_libro = new e_infoLibro();
        
        $info_libro->setId($ennupla['id']);
        
        if($ennupla['isbn']!='NULL')
            $info_libro->setIsbn($ennupla['isbn']);
        if($ennupla['descrizione']!='NULL')
            $info_libro->setDescrizione($ennupla['descrizione']);

        return $info_libro;
    }
    
}

?>