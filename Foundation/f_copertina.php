<?php

class f_copertina{
    static function salvaCopertina():blob
    {
        return "INSERT INTO copertina(id,tipo,size,immagine)
                VALUES(:id,:tipo,:size,:immagine)";
    }
    
    static function recuperaCopertina() : string
    {
        return "SELECT *
                FROM copertina
                WHERE id = :id;";
    }
    
    static function aggiornaCopertina() : string
    {
        return "UPDATE copertina
                SET tipo = :tipo, size = :size, immagine = :immagine
                WHERE id = :id;";
    }
    
    static function rimuoviImmagine() : string
    {
        return "DELETE 
                FROM copertina
                WHERE id = :id;";
    }
    
    static function bindValues(PDOStatement &$stmt, e_copertina &$cop){
        $stmt->bindValue(':id', $cop->getId(), PDO::PARAM_INT);
        $stmt->bindValue(':tipo', $cop->getTipo(), PDO::PARAM_STR);
        $stmt->bindValue(':size', $cop->getSize(), PDO::PARAM_INT);
        $stmt->bindParam(':immagine', $cop->getImmagine(), PDO::PARAM_LOB);
    }
    
    static function creaOggettoDaDB($ennupla) : e_copertina
    {
        $copertina = new e_copertina();
        $copertina->setId($ennupla['id']);
        $copertina->setTipo($ennupla['tipo']);
        $copertina->setSize($ennupla['size']);
        $copertina->setImmagine($ennupla['immagine']);
        
        return $copertina;
    }
}
?>