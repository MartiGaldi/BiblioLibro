<?php

class f_infoLibro{
    static function salvaInfoLibro():string
    {
        return "INSERT INTO infoLibro(id,descrizione,categoria,copertina)
                VALUES(:id,:descrizione,:categoria,:copertina)";
    }
    
    
    static function bindValues(PDOStatement &$stmt, e_infoLibro &$lib){
        $stmt->bindValue(':id', $lib->getIsbn(), PDO::PARAM_STR);
        $stmt->bindValue(':descrizione', $lib->getDescrizione(), PDO::PARAM_STR);
        $stmt->bindValue(':categoria', $lib->getCategoria(), PDO::PARAM_STR);
        $stmt->bindValue(':copertina', $lib->getCopertina(), PDO::PARAM_STR);
    }
}

?>