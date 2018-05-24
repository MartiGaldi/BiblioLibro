<?php 

class f_libro{
    static function salvaLibro():string
    {
        return "INSERT INTO libro(id,n_copie,titolo,autore)
                VALUES(:id,:n_copie,:titolo,:autore)";
    }
    
    
    static function bindValues(PDOStatement &$stmt, e_libro &$lib){
        $stmt->bindValue(':id', $lib->getIsbn(), PDO::PARAM_STR);   
        $stmt->bindValue(':n_copie', $lib->getNumCopie(), PDO::PARAM_INT);
        $stmt->bindValue(':titolo', $lib->getTitolo(), PDO::PARAM_STR);
        $stmt->bindValue(':autore', $lib->getAutore(), PDO::PARAM_STR);
    }   
}
?>