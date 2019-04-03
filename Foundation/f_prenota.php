<?php

class f_prenota{
    /**
    * Query che effettua il salvataggio di una prenotazione nella tabella prenota
    * @return string contenente la query sql
    */
    static function salvaPrenota() : string
    {
        return "INSERT INTO prenota(id_prenota,data,nick_name_utente,id_libro,data_fine,acquisito,disp,prenota)
                VALUES(:id_prenota,:data,:nick_name,:id,:data_fine,:acquisito,:disp,:prenota)";
    }

    /**
    * Query che effettua l'aggiornamento di una prenotazione nella tabella prenota
    * @return string contenente la query sql 
    */
    static function aggiornaPrenota() : string
    {
        return "UPDATE prenota
                SET data = :data, nick_name_utente = :nick_name, id_libro = :id, data_fine = :data_fine, acquisito = :acquisito, disp = :disp
                WHERE id_prenota = :id_prenota;";
    }
    
    /**
    * Query per il caricamento di una prenotazione
    * @return string sql rappresentante la SELECT.
    */    
    static function caricaPrenota() : string 
    {
        return "SELECT *
                FROM prenota
                WHERE id_libro = :id";
    }
    
    /**
    * Query che rimuove una prenotazione dalla tabella prenota.
    * @return string contenente la query sql
    */
    static function rimuoviPrenota() : string
    {
        return "DELETE
                FROM prenota
                WHERE id_libro = :id";
    }
    
    /**
     * Cancella tutte le entry di una query. Usata a scopo di debug.
     * @param PDO $db
     */
   /* static function tabellaVuota (PDO &$database)
    {
        $database->beginTransaction();                         //inizio transazione
        $stmt = $database->prepare("TRUNCATE TABLE prenota;");    //prepara lo statement
        $stmt->execute();
        $database->commit();
    }*/
    
    /**
     * Associazione di un oggetto e_prenota ai campi di una query sql per la tabella prenota.
     * @param PDOStatement $stmt lo statement contenente i campi da riempire
     * @param e_prenota $pren la prenotazione da cui prelevare i dati
     */
    static function bindValues(PDOStatement &$stmt, e_prenota &$prenota)
    {
        $stmt->bindValue('id_prenota', $prenota->getIdprenota(), PDO::PARAM_INT);
        $stmt->bindValue('data', $prenota->getData(), PDO::PARAM_STR);
        $stmt->bindValue(':nick_name', $prenota->getNick(), PDO::PARAM_STR);
        $stmt->bindValue(':id', $prenota->getId(), PDO::PARAM_INT);
        $stmt->bindValue(':data_fine', $prenota->getDataFine(), PDO::PARAM_STR);
        $stmt->bindValue('acquisito', $prenota->getAcquisito(), PDO::PARAM_BOOL);
        $stmt->bindValue('disp', $prenota->getDisp(), PDO::PARAM_BOOL);
    }
    
    /**
     * Istanzia un oggetto e_prenota a partire dai valori di una tupla ricevuta dal dbms
     * @param array $ennupla la tupla ricevuta dal dbms
     * @return prenota l'oggetto e_prenota risultato dell'operazione
     */
    static function creaOggettoDaRiga($riga) : e_prenota
    {
        $prenota = new e_prenota();
        $prenota->setIdprenota($riga['id_prenota']);
        $prenota->setData($riga['data']);
        $prenota->setNickCliente($riga['nick_cliente']);
        $prenota->setId($riga['id_libro']);
        $prenota->setDataFine($riga['data_fine']);
        $prenota->setAcquisito($riga['acquisito']);
        $prenota->setDisp($riga['disp']);
        
        return $prenota;
    }
    
    static function contaNumero() : int
    {
        return "SELECT count (*)
                FROM prenota INNER JOIN prestito
                WHERE id_libro = :id_libro AND prenota.id_libro = prestito.id_libro;";
    }
}

?>