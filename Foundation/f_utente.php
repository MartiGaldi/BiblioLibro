<?php

class f_utente {
    static function nomeEsistente() : string
    {
        return "SELECT *
                FROM utente
                WHERE nome = :value ;";
    }
    
    static function mailEsistente() : string
    {
        return "SELECT *
                FROM users
                WHERE mail = :value ;";
    }
    
    /**
     * Query che effettua il salvataggio di un utente nella tabella utente
     * @return string contenente la query sql
     */
    static function salvataggioUtente() : string
    {
        return "INSERT INTO utente(id,nickname,mail,password,tipo)
                VALUES (:id,:nickname,:mail,:password,:tipo);";
    }
    
    /**
     * Query che effettua l'aggiornamento di un utente nella tabella utente
     * @return string contenente la query sql
     */
    static function aggiornaUtente() : string
    {
        return "UPDATE utente
                SET nickname = :nickname, mail = :mail, password = :password, tipo = :tipo
                WHERE id = :id;";
    }
    
    /**
     * Query per il caricamento di un utente
     * @return string sql rappresentante la SELECT.
     */    
    static function caricaUtente() : string
    {
        return "SELECT *
                FROM utente
                WHERE id = :id;";
    }
    
    /**
     * Query che rimuove un utente dalla tabella utente.
     * @return string contenente la query sql
     */
    static function rimuoviUtente() : string
    {
        return "DELETE
                FROM utente
                WHERE id = :id;";
    }
    
    /**
     * Cancella tutte le entry di una query. Usata a scopo di debug.
     * @param PDO $db
     */
    static function tabellaVuota (PDO &$database)
    {
        $database->beginTransaction();                         //inizio transazione
        $stmt = $database->prepare("TRUNCATE TABLE utente;");    //prepara lo statement
        $stmt->execute();
        $database->commit();
    }
    
    /**
     * Associazione di un oggetto e_utente ai campi di una query sql per la tabella prenota.
     * @param PDOStatement $stmt lo statement contenente i campi da riempire
     * @param e_utente $utente l'utente da cui prelevare i dati
     */
    static function bindValues(PDOStatement &$stmt, e_utente &$utente)
    {
        $stmt->bindValue('id', $utente->getId(), PDO::PARAM_INT);
        $stmt->bindValue(':nickname', $utente->getNickname(), PDO::PARAM_STR);
        $stmt->bindValue(':mail', $utente->getMail(), PDO::PARAM_STR);
        $stmt->bindValue(':password', $utente->getPassword(), PDO::PARAM_STR);
        $stmt->bindValue(':tipo', lcfirst(substr(get_class($utente),1)), PDO::PARAM_STR);
    }
    
    /**
     * Istanzia un oggetto e_utente a partire dai valori di una tupla ricevuta dal dbms
     * @param array $ennupla la tupla ricevuta dal dbms
     * @return utente l'oggetto e_utente risultato dell'operazione
     */
    static function creaOggettoDaDB($ennupla) : e_Utente
    {
        $tipoUtente = 'e_'.ucfirst($ennupla['tipo']);
        
        $utente = new $tipoUtente();
        
        $utente->setId($ennupla['id']);
        $utente->setNickname($ennupla['nickname']);
        $utente->setMail($ennupla['mail']);
        $utente->setPassword($ennupla['password']);
                                    
        return $utente;
    }
    
}

?>