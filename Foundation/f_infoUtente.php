<?php

class f_infoUtente{
    
    static function salvaInfoUtente() : string
    {
        return "INSERT INTO info_utente (id, nome, cognome, cod_fisc, telefono, sesso, dt_nascita,luogo_nascita)
                VALUES(:id, :nome, :cognome, :cod_fisc, :telefono, :sesso, :dt_nascita, :luogo_nascita)";
    }
    
    static function aggiornaInfoUtente() : string 
    {
        return "UPDATE info_utente
                SET nome = :nome,
                    cognome = :cognome,
                    cod_fisc = :cod_fisc,
                    telefono = :telefono,
                    sessp = :sesso,
                    dt_nasc = :dt_nasc,
                    luogo_nascita = :luogo_nascita
                WHERE id = :id;";
    }
    
    static function caricaInfoUtente() : string
    {
        return "SELECT *
                FROM info_utente
                WHERE id = :id;";
    }
    
    static function bindValues(PDOStatement &$stmt, e_infoUtente &$infu)
    {
        $stmt->bindValue(':id', $infu->getId(), PDO::PARAM_INT);
        if($infu->getNome())
            $stmt->bindValue(':nome', $infu->getNome, PDO::PARAM_STR);
        else
            $stmt->bindValue(':nome', 'NULL', PDO::PARAM_STR);
        if($infu->getCognome())
            $stmt->bindValue(':cognome', $infu->getCognome(), PDO::PARAM_STR);
        else
            $stmt->bindValue(':cognome', 'NULL', PDO::PARAM_STR);
        if($infu->getCodFisc())
            $stmt->bindValue(':cod_fisc', $infu->getCodFisc(), PDO::PARAM_STR);
        else
            $stmt->bindValue(':cod_fisc', 'NULL', PDO::PARAM_STR);
        if($infu->getTelefono())
            $stmt->bindValue(':telefono', $infu->getTelefono(), PDO::PARAM_STR);
        else
            $stmt->bindValue(':telefono', 'NULL', PDO::PARAM_STR);
        if($infu->getSesso())
            $stmt->bindValue(':sesso', $infu->getSesso(), PDO::PARAM_STR);
        else
            $stmt->bindValue(':sesso', 'NULL', PDO::PARAM_STR);
        if($infu->getDtNasc())
            $stmt->bindValue(':dt_nasc', $infu->getDtNasc(), PDO::PARAM_LOB);
        else
            $stmt->bindValue(':dt_nasc', 'NULL', PDO::PARAM_LOB);
        if($infu->getLuogoNascita())
            $stmt->bindValue(':luogo_nascita', $infu->getLuogoNascita(), PDO::PARAM_STR);
        else
            $stmt->bindValue(':luogo_nascita', 'NULL', PDO::PARAM_STR);
        
    }
    
    static function creaOggettoDaDB($ennupla) : e_infoUtente
    {
        $utente = new e_infoUtente();
        
        if($ennupla['nome']!='NULL')
            $utente->setNome($ennupla['nome']);
        if($ennupla['cognome']!='NULL')
            $utente->setCognome($ennupla['cognome']);
        if($ennupla['cod_fisc']!='NULL')
            $utente->setCodFisc($ennupla['cod_fisc']);                    
        if($ennupla['telefono']!='NULL')
            $utente->setTelefono($ennupla['telefono']);
        if($ennupla['sesso']!='NULL')             
            $utente->setSesso($ennupla['sesso']);
        if($ennupla['dt_nasc']!='NULL')
            $utente->setDtNasc($ennupla['dt_nasc']);
        if($ennupla['luogo_nascita']!='NULL')
            $utente->setLuogoNascita($ennupla['luogo_nascita']);
        
            return $utente;
    }
}

?>