<?php
class f_prestito{
    
    static function salvaPrestito():string
    {
        return "INSERT INTO prestito(nick_cliente,isbn,attesa,data_inizio)
                VALUES(:nick_cliente,:isbn,:attesa,:data_inizio)";
    }
    
    
    static function bindValues(PDOStatement &$stmt, e_prestito &$pres){
        $stmt->bindValue(':nick_cliente', $pres->getNickCliente(), PDO::PARAM_STR);
        $stmt->bindValue(':isbn', $pres->getIsbn(), PDO::PARAM_STR);
        $stmt->bindValue(':attesa', $pres->getAttesa(), PDO::PARAM_BOOL);
        $stmt->bindValue(':data_inizio', $pres->getDataInizio(), PDO::PARAM_DATE);
    }
    
}