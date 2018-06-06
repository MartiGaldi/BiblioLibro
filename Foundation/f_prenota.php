<?php

class f_prenota{
    static function salvaPrenota():string
    {
        return "INSERT INTO prenota(nick_cliente,id_libro,priorita)
                VALUES(:nick_cliente,:id_cliente,:priorita)";
    }
    
    
    static function bindValues(PDOStatement &$stmt, e_prenota &$pren){
        $stmt->bindValue(':nick_cliente', $pren->getNickCliente(), PDO::PARAM_STR);
        $stmt->bindValue(':id_cliente', $pren->getIdliente(), PDO::PARAM_INT);
        $stmt->bindValue(':priorita', $pren->getPriorita(), PDO::PARAM_STR);
    }
}

?>