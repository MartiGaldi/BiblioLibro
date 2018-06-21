<?php

class f_commento{
    static function salvaCommento():string
    {
        return "INSERT INTO commento(id,isbn,contenuto,nick_cliente)
                VALUES(:id,:isbn,:contenuto,:nick_cliente)";
    }
    
    
    static function bindValues(PDOStatement &$stmt, e_commento &$commento){
        $stmt->bindValue(':id', $lib->getId(), PDO::PARAM_INT);
        $stmt->bindValue(':isbn', $lib->getIsbn(), PDO::PARAM_STR);
        $stmt->bindValue(':contenuto', $lib->getContenuto(), PDO::PARAM_STR);
        $stmt->bindValue(':nick_cliente', $lib->getNickcliente(), PDO::PARAM_STR);
    }
}
?>