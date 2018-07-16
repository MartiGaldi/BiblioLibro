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
    
    
    static function contaNumero() : int
    {
        return "SELECT count (*)
                FROM PRESTITO
                WHERE isbn = :isbn;";
    }
}

?>