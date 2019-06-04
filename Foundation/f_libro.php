<?php 

class f_libro{
    
    /**
    * Salva una e_libro nel database
    * @param PDO $database la connessione verso il dbms
    * @return string la query sql per la INSERT
    */
    static function salvaLibro() : string
    {
        return "INSERT INTO libro(num_copie,titolo,autore,durata,genere, isbn, descrizione, copieDisponibili)
                VALUES(:num_copie,:titolo,:autore,:durata,:genere, :isbn, :descrizione, :copieDisponibili)";
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
                SET num_copie = :num_copie,
					titolo = :titolo,
					autore = :autore, 
					durata = :durata, 
					genere = :genere,
					isbn = :isbn,
					descrizione = :descrizione,
					copieDisponibili = :copieDisponibili
                WHERE id = :id ;";
    }
        
    /**
    * Elimina un libro dal database .
    * @param PDO $database la connessione al dbms
    * @param int $id il libro da eliminare
    */
    static function rimuoviLibro() : string
    {
        return "DELETE
                FROM libro
                WHERE id = :id ;"; //query sql
    }
        
        
    static function ricercaLibroDaTitolo() : string
    {
        return "SELECT libro.*
                FROM libro
                WHERE LOCATE( :Titolo , libro.titolo) > 0;";
    }
        
        
    static function ricercaLibroDaAutore() : string
    {
        return "SELECT libro.*
                FROM libro
                WHERE LOCATE( :Autore , libro.autore) > 0;";
    }
	
	 /*static function ricercaLibroDaGenere() : string
    {
        return "SELECT libro.*
                FROM libro
                WHERE LOCATE( :Genere , libro.genere) > 0;";
    }*/
    
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
        $stmt->bindValue(':genere', $lib->getGenere(), PDO::PARAM_STR);
		$stmt->bindValue(':isbn', $lib->getIsbn(), PDO::PARAM_STR);
		$stmt->bindValue(':descrizione', $lib->getDescrizione(), PDO::PARAM_STR);
		$stmt->bindValue(':copieDisponibili', $lib->getCopieDisponibili(), PDO::PARAM_INT);
    } 
    
    /**
    * Istanzia un oggetto e_libro a partire dai valori di una tupla ricevuta dal dbms
    * @param array $ennupla la tupla ricevuta dal dbms
    * @return libro l'oggetto e_libro risultato dell'operazione
    */
    static function creaOggettoDaRiga($riga)
    {
        // creazione dell'oggetto e_libro
        $libro = new e_libro();
        $libro->setId($riga['id']);
        $libro->setNumCopie($riga['num_copie']);
        $libro->setTitolo($riga['titolo']);
        $libro->setAutore($riga['autore']);
        $libro->setDurata($riga['durata']);
        $libro->setGenere($riga['genere']);
		$libro->setIsbn($riga['isbn']);
		$libro->setDescrizione($riga['descrizione']);
		$libro->setCopieDisponibili($riga['copieDisponibili']);
                    
        return $libro;
    }
      
}
?>