<?php 

class f_libro{
    
    /**
    * Salva una e_libro nel database
    * @param PDO $database la connessione verso il dbms
    * @return string la query sql per la INSERT
    */
    static function salvaLibro() : string
    {
        return "INSERT INTO libro(id,num_copie,titolo,autore,durata,genere)
                VALUES(:id,:num_copie,:titolo,:autore,:durata,:genere)";
    }
        
    /**
    * Carica un libro dal database.
    * @return string la query sql per la SELECT
    */
    static function caricaLibro() : string
    {
        return "SELECT libro.*
                FROM libro
                where libro.id = :id;"; //query sql
    }   
        
    /**
     * Query che effettua l'aggiornamento del libro nella tabella libro
     * @return string contenente la query sql
     */
    static function aggiornaLibro() : string
    {
        return "UPDATE libro
                SET num_copie = :num_copie, titolo = :titolo, autore = :autore, durata = :durata, genere = :genere
                WHERE id = :id ;";
    }
        
    /**
    * Elimina un libro dal database .
    * @param PDO $database la connessione al dbms
    * @param int $id il libro da eliminare
    */
    static function eliminaLibro() : string
    {
        return "DELETE
                FROM libro
                WHERE id = :id ;"; //query sql
    }
        
        
    /**
    * Cancella tutte le entry di una query. Usata a scopo di debug.
    * @param PDO $db
    */
    static function tabellaVuota (PDO &$database)
    {
        $database->beginTransaction();                         //inizio transazione
        $stmt = $database->prepare("TRUNCATE TABLE libro;");    //prepara lo statement
        $stmt->execute();
        $database->commit();
    }
        
    static function ricercaLibroDaTitolo() : string
    {
        return "SELECT libro.*
                FROM libro
                WHERE LOCATE( :titolo , libro.titolo) > 0;";
    }
        
        
    static function ricercaLibroDaAutore() : string
    {
        return "SELECT libro.*
                FROM libro
                WHERE LOCATE( :autore , libro.autore) > 0;";
    }
    
    /**
    * Associa ai campi della query i corrispondenti attributi dell'oggetto e_libro.
    * @param PDOStatement $stmt da cui prelevare i campi
    * @param e_libro $lib da cui prelevare gli attributi
    */
    static function bindValues(PDOStatement &$stmt, e_libro &$lib){
        $stmt->bindValue(':num_copie', $lib->getNumCopie(), PDO::PARAM_INT);
        $stmt->bindValue(':titolo', $lib->getTitolo(), PDO::PARAM_STR);
        $stmt->bindValue(':autore', $lib->getAutore(), PDO::PARAM_STR);
        $stmt->bindValue(':durata', $lib->getDurata(), PDO::PARAM_STR);
        $stmt->bindValue(':genere', $lib->getgGenere(), PDO::PARAM_STR);
    } 
    
    /**
    * Istanzia un oggetto e_libro a partire dai valori di una tupla ricevuta dal dbms
    * @param array $ennupla la tupla ricevuta dal dbms
    * @return libro l'oggetto e_libro risultato dell'operazione
    */
    static function creaOggettoDaDB($ennupla)
    {
        // creazione dell'oggetto e_libro
        $libro = new e_libro();
        $libro->setId($ennupla['id']);
        $libro->setNumCopie($ennupla['num_copie']);
        $libro->setTitolo($ennupla['titolo']);
        $libro->setAutore($ennupla['autore']);
        $libro->setDurata($ennupla['durata']);
                    
        return $libro;
    }
      
}
?>