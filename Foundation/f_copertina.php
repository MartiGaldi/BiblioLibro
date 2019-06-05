<?php

/**
 * La classe f_copertina fornisce le query sql rispetto alla classe e_copertina.
 * @author gruppo 11
 * @package Foundation
 */
class f_copertina
{
    /**
     * Query che effettua il salvataggio di una copertina nella tabella copertina
     * @return string contenente la query sql
     */
    static function salvaCopertina() : string
    {
        return "INSERT INTO copertina(id,tipo,size,copertina)
                VALUES(:id, :tipo, :size, :copertina)";
    }
    
    /**
     * Carica una copertina dal database.
     * @return string la query sql per la SELECT
     */
    static function caricaCopertina() : string
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
                SET tipo = :tipo, size = :size, copertina = :copertina
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
     * Associazione di un oggetto e_copertina ai campi di una query sql per la tabella copertina.
     * @param PDOStatement $stmt lo statement contenente i campi da riempire
     * @param e_copertina $cop la copertina da cui prelevare i dati
     */
    static function bindValues(PDOStatement &$stmt, e_copertina &$cop)
    {
        $stmt->bindValue(':id', $cop->getId(), PDO::PARAM_INT);
        $stmt->bindValue(':tipo', $cop->getTipo(), PDO::PARAM_STR);
        $stmt->bindValue(':size', $cop->getSize(), PDO::PARAM_INT);
        $stmt->bindParam(':copertina', $cop->getCopertina(), PDO::PARAM_LOB);
    }
    
    /**
     * Crea una Entity da una riga del database
     * @param array $ennupla avente come indici i campi della tabella da cui e' stata prelevata l'entry
     * @return e_copertina l'oggetto e_copertina risultato dell'operazione
     */
    static function creaOggettoDaRiga($riga) : e_copertina
    {
        $copertina = new e_copertina();
        $copertina->setId($riga['id']);
        $copertina->setTipo($riga['tipo']);
        $copertina->setSize($riga['size']);
        $copertina->setCopertina($riga['copertina']);
        
        return $copertina;
    }
}
?>