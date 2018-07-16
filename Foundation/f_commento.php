<?php

class f_commento{
    /**
     * Query che effettua il salvataggio di un commento nella tabella commento
     * @return string contenente la query sql
     */
    static function salvaCommento() : string
    {
        return "INSERT INTO commento(id,isbn,contenuto,nick_cliente)
                VALUES(:id,:isbn,:contenuto,:nick_cliente)";
    }
    
    /**
     * Carica un commento dal database.
     * @return string la query sql per la SELECT
     */
    static function caricaCommento() : string
    {
        return "SELECT *
                FROM commento
                where id = :id;"; //query sql
    }
    
     /**
      * Query che effettua l'aggiornamento di un commento nella tabella commento
      * @return string contenente la query sql 
      */
    static function aggiornaCommento() : string
    {
        return "UPDATE commento
                SET isbn = :isbn, contenuto = :contenuto, nick_cliente = :nick_cliente
                WHERE id = :id ;";
    }
    
    /**
     * Elimina un commento dal database .
     * @return string contenente la query sql
     */
    static function eliminaCommento() : string
    {
        return "DELETE
                FROM commento
                WHERE id = :id ;"; //query sql
    }
      
    /**
     * Cancella tutte le entry di una query. Usata a scopo di debug.
     * @param PDO $db
     */
    static function tabellaVuota (PDO &$database)
    {
        $database->beginTransaction();                         //inizio transazione
        $stmt = $database->prepare("TRUNCATE TABLE commento;");    //prepara lo statement
        $stmt->execute();
        $database->commit();
    }
    
    /**
     * Associazione di un oggetto e_commento ai campi di una query sql per la tabella commento.
     * @param PDOStatement $stmt lo statement contenente i campi da riempire
     * @param e_commento $commento il commento da cui prelevare i dati
     */
    static function bindValues(PDOStatement &$stmt, e_commento &$commento){
        $stmt->bindValue('id', $lib->getId(), PDO::PARAM_INT);
        $stmt->bindValue(':isbn', $lib->getIsbn(), PDO::PARAM_STR);
        $stmt->bindValue(':contenuto', $lib->getContenuto(), PDO::PARAM_STR);
        $stmt->bindValue(':nick_cliente', $lib->getNickcliente(), PDO::PARAM_STR);
    }
    
    /**
      * Crea una Entity da una riga del database
      * @param array $ennupla avente come indici i campi della tabella da cui e' stata prelevata l'entry
      * @return e_commento l'oggetto e_commento risultato dell'operazione
      */
    static function creaOggettoDaDB($ennupla) : e_copertina
    {
        $commento = new e_commento();
        $commento->setId($ennupla['id']);
        $commento->setIsbn($ennupla['isbn']);
        $commento->setContenuto($ennupla['contenuto']);
        $commento->setNickCliente($ennupla['nick_cliente']);
        
        return $commento;
    }
}
?>