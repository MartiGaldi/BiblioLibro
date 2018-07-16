<?php

class f_infoUtente{
    
    /**
     * Salva una e_infoUtente nel database
     * @param PDO $database la connessione verso il dbms
     * @return string la query sql per la INSERT
     */
    static function salvaInfoUtente() : string
    {
        return "INSERT INTO info_utente (id, nome, cognome, cod_fisc, telefono, sesso, dt_nascita,luogo_nascita)
                VALUES(:id, :nome, :cognome, :cod_fisc, :telefono, :sesso, :dt_nascita, :luogo_nascita)";
    }
    
    /**
     * Query che effettua l'aggiornamento delle info di un utente nella tabella infoUtente
     * @return string contenente la query sql
     */
    static function aggiornaInfoUtente() : string 
    {
        return "UPDATE info_utente
                SET nome = :nome,
                    cognome = :cognome,
                    cod_fisc = :cod_fisc,
                    telefono = :telefono,
                    sessp = :sesso,
                    dt_nasc = :dt_nasc,
                    luogo_nascita = :luogo_nascita
                WHERE id = :id;";
    }
    
    /**
     * Carica info_utente dal database.
     * @return string la query sql per la SELECT
     */
    static function caricaInfoUtente() : string
    {
        return "SELECT *
                FROM info_utente
                WHERE id = :id;";
    }
    
    /**
     * Elimina le info di un utente dal database .
     * @param PDO $database la connessione al dbms
     * @param int $id l'utente da eliminare
     */
    static function eliminaInfoUtente() : string
    {
        return "DELETE
                FROM infoUtente
                WHERE id = :id;";
    }
    
    /**
     * Cancella tutte le entry di una query. Usata a scopo di debug.
     * @param PDO $db
     */
    static function tabellaVuota (PDO &$database)
    {
        $database->beginTransaction();                         //inizio transazione
        $stmt = $database->prepare("TRUNCATE TABLE infoUtente;");    //prepara lo statement
        $stmt->execute();
        $database->commit();
    }
    
    /**
     * Associa ai campi della query i corrispondenti attributi dell'oggetto e_infoUtente.
     * @param PDOStatement $stmt da cui prelevare i campi
     * @param e_infoUtente $infu da cui prelevare gli attributi
     */
    static function bindValues(PDOStatement &$stmt, e_infoUtente &$infu)
    {
        $stmt->bindValue(':id', $infu->getId(), PDO::PARAM_INT);
        if($infu->getNome())
            $stmt->bindValue(':nome', $infu->getNome, PDO::PARAM_STR);
        else
            $stmt->bindValue(':nome', 'NULL', PDO::PARAM_STR);
        if($infu->getCognome())
            $stmt->bindValue(':cognome', $infu->getCognome(), PDO::PARAM_STR);
        else
            $stmt->bindValue(':cognome', 'NULL', PDO::PARAM_STR);
        if($infu->getCodFisc())
            $stmt->bindValue(':cod_fisc', $infu->getCodFisc(), PDO::PARAM_STR);
        else
            $stmt->bindValue(':cod_fisc', 'NULL', PDO::PARAM_STR);
        if($infu->getTelefono())
            $stmt->bindValue(':telefono', $infu->getTelefono(), PDO::PARAM_STR);
        else
            $stmt->bindValue(':telefono', 'NULL', PDO::PARAM_STR);
        if($infu->getSesso())
            $stmt->bindValue(':sesso', $infu->getSesso(), PDO::PARAM_STR);
        else
            $stmt->bindValue(':sesso', 'NULL', PDO::PARAM_STR);
        if($infu->getDtNasc())
            $stmt->bindValue(':dt_nasc', $infu->getDtNasc(), PDO::PARAM_LOB);
        else
            $stmt->bindValue(':dt_nasc', 'NULL', PDO::PARAM_LOB);
        if($infu->getLuogoNascita())
            $stmt->bindValue(':luogo_nascita', $infu->getLuogoNascita(), PDO::PARAM_STR);
        else
            $stmt->bindValue(':luogo_nascita', 'NULL', PDO::PARAM_STR);
        
    }
    
    /**
     * Istanzia un oggetto e_infoUtente a partire dai valori di una tupla ricevuta dal dbms
     * @param array $ennupla la tupla ricevuta dal dbms
     * @return infoUtente l'oggetto e_infoUtente risultato dell'operazione
     */
    static function creaOggettoDaDB($ennupla) : e_infoUtente
    {
        $utente = new e_infoUtente();
        
        if($ennupla['nome']!='NULL')
            $utente->setNome($ennupla['nome']);
        if($ennupla['cognome']!='NULL')
            $utente->setCognome($ennupla['cognome']);
        if($ennupla['cod_fisc']!='NULL')
            $utente->setCodFisc($ennupla['cod_fisc']);                    
        if($ennupla['telefono']!='NULL')
            $utente->setTelefono($ennupla['telefono']);
        if($ennupla['sesso']!='NULL')             
            $utente->setSesso($ennupla['sesso']);
        if($ennupla['dt_nasc']!='NULL')
            $utente->setDtNasc($ennupla['dt_nasc']);
        if($ennupla['luogo_nascita']!='NULL')
            $utente->setLuogoNascita($ennupla['luogo_nascita']);
        
            return $utente;
    }
}

?>