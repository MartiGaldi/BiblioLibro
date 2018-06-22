<?php

require_once'inc.php';
include_once 'Entity/e_oggetto';


class e_infoCliente extends e_oggetto
{
    
   private $nome;
   private $cognome;
   private $cod_fisc;
   private $telefono;
   private $sesso;
   private $dt_nasc;
   private $luogo_nascita;
   
    
    
    function __construct()
    {
        parent::__construct();
        
        $this->nome='';
        $this->cognome='';
        $this->cod_fisc='';
        $this->telefono='';
        $this->sesso='';
        $this->dt_nasc='';
        $this->luogo_nascita='';
    }
    
    
    function setNome (string $nome)
    {
        $this->nome=$nome;
    }
    
    function getNome() : string
    {
        return $this->nome;
    }
    
    
    function setCognome (string $cognome)
    {
    $this->cognome=$cognome;
    }

    function getCognome() : string
    {
    return $this->cognome;
    }
    
    
    function setCodFisc (string $cod_fisc)
    {
        $this->cod_fisc=$cod_fisc;
    }
    
    function getCodFisc () : string
    {
        return $this->cod_fisc;
    }
    
    
    function setTelefono (int $telefono)
    {
        $this->telefono=$telefono;
    }
    
    function getTelefono() : int
    {
        return $this->telefono;
    }
    
    
    function setSesso (string $sesso)
    {
        $this->sesso=$sesso;
    }
    
    function getSesso() : string
    {
        return $this->sesso;
    }
    
    
    function setDtNas(string $dt_nasc)
    {
            $this->dt_nasc=new DateTime($dt_nasc);
    }
        
     function getDtNasc() : DateTime
    {
            return $this->dt_nasc;
    }

    
     function setLuogoNascita(DateTime $luogo_nascita)
     {
            $this->luogo_nascita=$luogo_nascita;
     }

     function getLuogoNascita()
     {
            return $this->luogo_nascita;
     }
        
}
        
        
        
        
        