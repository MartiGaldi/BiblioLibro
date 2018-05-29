<?php

class f_infoCliente{
    
    static function salvaInfoCliente():string
    {
        return "INSERT INTO info_cliente (nickname,nome, cognome, cod_fisc, telefono, sesso, dt_nascita,luogo_nascita)
                VALUES(:nickname, :nome, :cognome, :cod_fisc, :telefono, :sesso, :dt_nascita, :luogo_nascita)";
    }
    
    
    static function bindValues(PDOStatement &$stmt, e_infoCliente &$infc){
        $stmt->bindValue(':nickname', $infc->getNickname(), PDO::PARAM_STR);
        $stmt->bindValue(':nome', $infc->getNome(), PDO::PARAM_INT);
        $stmt->bindValue(':cognome', $infc->getCognome(), PDO::PARAM_STR);
        $stmt->bindValue(':cod_fisc', $infc->getCodFisc(), PDO::PARAM_STR);
        $stmt->bindValue(':telefono', $infc->getTelefono(), PDO::PARAM_STR);
        $stmt->bindValue(':sesso', $infc->getSesso(), PDO::PARAM_STR);
        $stmt->bindValue(':dt_nasc', $infc->getDtNasc(), PDO::PARAM_STR);
        $stmt->bindValue(':luogo_nascita', $infc->getLuogoNascita(), PDO::PARAM_STR);
        
    }
}

?>