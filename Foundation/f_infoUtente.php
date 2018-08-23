<?php

/**
 * La classe f_infoUtente fornisce query per gli oggetti e_infoUtente
 * @author gruppo11
 * @package Foundation
 */
 
class f_infoUtente{
    
    /**
     * Salva una e_infoUtente nel database
     * @return string la query sql per la INSERT
     */
    static function salvaInfoUtente() : string
    {
        return "INSERT INTO info_utente (id, nome, cognome, cod_fisc, telefono, sesso, dt_nasc,luogo_nascita)
                VALUES(:id, :nome, :cognome, :cod_fisc, :telefono, :sesso, :dt_nasc, :luogo_nascita)";
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
     * Carica un oggetto e_infoUtente dal database.
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
    static function creaOggettoDaRiga($riga) : e_infoUtente
    {
        $info_utente = new e_infoUtente();
        
        $info_utente->setId($riga['id']);
        
        if($riga['nome']!='NULL')
            $info_utente->setNome($riga['nome']);
        if($riga['cognome']!='NULL')
            $info_utente->setCognome($riga['cognome']);
        if($riga['cod_fisc']!='NULL')
            $info_utente->setCodFisc($riga['cod_fisc']);                    
        if($riga['telefono']!='NULL')
            $info_utente->setTelefono($riga['telefono']);
        if($riga['sesso']!='NULL')             
            $info_utente->setSesso($riga['sesso']);
        if($riga['dt_nasc']!='NULL')
            $info_utente->setDtNasc($riga['dt_nasc']);
        if($riga['luogo_nascita']!='NULL')
            $info_utente->setLuogoNascita($tiga['luogo_nascita']);
        
            return $info_utente;
    }
}

?>