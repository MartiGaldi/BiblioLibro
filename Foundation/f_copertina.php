<?php

class f_copertina{
    static function salvaCopertina():blob
    {
        return "INSERT INTO copertina(id,mime_type,size,file_cop)
                VALUES(:id,:mime_type,:size,:file_cop)";
    }
    
    
    static function bindValues(PDOStatement &$stmt, e_libro &$lib){
        $stmt->bindValue(':id', $lib->getIsbnCop(), PDO::PARAM_INT);
        $stmt->bindValue(':mime_type', $lib->getMimeType(), PDO::PARAM_STR);
        $stmt->bindValue(':size', $lib->getSize(), PDO::PARAM_STR);
        $stmt->bindValue(':file_cop', $lib->getFileCop(), PDO::PARAM_BLOB);
    }
}
?>