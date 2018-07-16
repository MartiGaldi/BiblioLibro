<?php

class f_copertina{
    /**
     * Query che effettua il salvataggio di una copertina nella tabella copertina
     * @return string contenente la query sql
     */
    static function salvaCopertina() : string
    {
        return "INSERT INTO copertina(id,tipo,size,immagine)
                VALUES(:id,:tipo,:size,:immagine)";
    }
    
    /**
     * Carica una copertina dal database.
     * @return string la query sql per la SELECT
     */
    static function recuperaCopertina() : string
    {
        return "SELECT *
                FROM copertina
                WHERE id = :id;";
    }
    
    /**
     * Query che effettua l'aggiornamento di una copertia nella tabella copertina
     * @return string contenente la query sql
     */
    static function aggiornaCopertina() : string
    {
        return "UPDATE copertina
                SET tipo = :tipo, size = :size, immagine = :immagine
                WHERE id = :id;";
    }
    
    /**
     * Elimina una copertina dal database .
     * @return string contenente la query sql
     */
    static function rimuoviCopertina() : string
    {
        return "DELETE 
                FROM copertina
                WHERE id = :id;";
    }
    
    /**
     * Cancella tutte le entry di una query. Usata a scopo di debug.
     * @param PDO $db
     */
    static function tabellaVuota (PDO &$database)
    {
        $database->beginTransaction();                         //inizio transazione
        $stmt = $database->prepare("TRUNCATE TABLE copertina;");    //prepara lo statement
        $stmt->execute();
        $database->commit();
    }
    
    /**
     * Associazione di un oggetto e_copertina ai campi di una query sql per la tabella copertina.
     * @param PDOStatement $stmt lo statement contenente i campi da riempire
     * @param e_copertina $cop la copertina da cui prelevare i dati
     */
    static function bindValues(PDOStatement &$stmt, e_copertina &$cop)
    {
        $stmt->bindValue(':id', $cop->getId(), PDO::PARAM_INT);
        $stmt->bindValue(':tipo', $cop->getTipo(), PDO::PARAM_STR);
        $stmt->bindValue(':size', $cop->getSize(), PDO::PARAM_INT);
        $stmt->bindParam(':immagine', $cop->getImmagine(), PDO::PARAM_STR);
    }
    
    /**
     * Crea una Entity da una riga del database
     * @param array $ennupla avente come indici i campi della tabella da cui e' stata prelevata l'entry
     * @return e_copertina l'oggetto e_copertina risultato dell'operazione
     */
    static function creaOggettoDaDB($ennupla) : e_copertina
    {
        $copertina = new e_copertina();
        $copertina->setId($ennupla['id']);
        $copertina->setTipo($ennupla['tipo']);
        $copertina->setSize($ennupla['size']);
        $copertina->setImmagine($ennupla['immagine']);
        
        return $copertina;
    }
}
?>