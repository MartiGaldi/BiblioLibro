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
        return "INSERT INTO utente(id,nickname,mail,password,tipo)
                VALUES (:id,:nickname,:mail,:password,:tipo);";
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
    
    static function bindValues(PDOStatement &$stmt, e_utente &$utente)
    {
        $stmt->bindValue('id', $utente->getId(), PDO::PARAM_INT);
        $stmt->bindValue(':nickname', $utente->getNickname(), PDO::PARAM_STR);
        $stmt->bindValue(':mail', $utente->getMail(), PDO::PARAM_STR);
        $stmt->bindValue(':password', $utente->getPassword(), PDO::PARAM_STR);
        $stmt->bindValue(':tipo', lcfirst(substr(get_class($utente),1)), PDO::PARAM_STR);
    }
    
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