<?php

class f_cliente{
    static function salvaCliente():string
    {
        return "INSERT INTO libro(nickname,mail)
                VALUES(:nickname,:mail)";
    }
    
    
    static function bindValues(PDOStatement &$stmt, e_cliente &$cliente){
        $stmt->bindValue(':nickname', $lib->getNickname(), PDO::PARAM_STR);
        $stmt->bindValue(':mail', $lib->getMail(), PDO::PARAM_STR);
    }
}
?>