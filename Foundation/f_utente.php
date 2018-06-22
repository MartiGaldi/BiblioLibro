<?php

class f_utente
{
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
    
    static function salvataggioUtente() : string
    {
        return "INSERT INTO utente(nickname, mail, password, tipo)
                VALUES (:nickname, :mail, :password, :tipo);";
    }
    
    static function aggiornaUtente() : string
    {
        return "UPDATE utente
                SET nickname = :nickname, mail = :mail, password = :password, tipo = :tipo
                WHERE id = :id;";
    }
    
    static function caricaUtente() : string
    {
        return "SELECT *
                FROM utente
                WHERE id = :id;";
    }
    
    static function rimuoviUtente() : string
    {
        return "DELETE
                FROM utente
                WHERE id = :id;";
    }
    
    static function bindValues(PDOStatement &$stmt, e_utente &$utente){
        $stmt->bindValue(':nickname', $utente->getNickname(), PDO::PARAM_STR);
        $stmt->bindValue(':mail', $utente->getMail(), PDO::PARAM_STR);
        $stmt->bindValue(':password', $utente->getPassword(), PDO::PARAM_STR);
        $stmt->bindValue(':tipo', lcfirst(substr(get_class($utente),1)), PDO::PARAM_STR);
    }
    
    static function creaOggettoDaDB($ennupla) : e_Utente
    {
        $tipoUtente = 'E'.ucfirst($ennupla['tipo']);
        
        $utente = new $tipoUtente();
        
        $user->setId($ennupla['id']);
        $user->setNickname($ennupla['nickname']);
        $user->setMail($ennupla['mail']);
        $user->setPassword($ennupla['password']);
                                    
        return $utente;
    }
    
}

?>