<?php

require_once'inc.php';
include_once 'Entity/e_oggetto';

/**
* La classe e_infoUtente contiene le informazioni dettagliate sull'utente che non
* sono necessarie in fase di autenticazione. Proprio per questo, estende
* la classe e_oggetto avendo come id lo stesso identificativo dell'utente a cui appartengono.
* @author gruppo11
* @package Entity

*/

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
    
    function validazioneCodFisc() : bool
    {
        if($this->cod_fisc && preg_match('/^[[:alnum:]]{16}$/', $this->cod_fisc))
            return true;
        else
            return false;
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
    
    
    function setDtNasc(string $dt_nasc)
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
     
     
     function validazione(bool &$n, bool &$cog, bool &$cf, bool &$tel, bool &$ses, bool &$data_nasc, bool &$lg_nasc)
     {
         if (ctype_alpha($this->nome))
         {
             strtolower($this->nome);   
             ucfirst($this->nome);
             $n=true;
         } 
         else 
             $n = false;
         
         if (ctype_alpha($this->cognome))
         {
             strtolower($this->cognome);
             ucwords($this->cognome);
             $cog=true;
         } 
         else 
             $cog = false;
         
             if (condition) {
                 ;
             }
             
         if($this->telefono && preg_match('/[0-9]+{13}/', $this->telefono))
             $tel=true;
         else
             $tel = false;
         
         if($this->sesso=='maschio' || this->sesso=='femmina')
             $ses=true;
         else
             $ses = false;
         
         if(ctype_digit($this->dt_nasc))
         {
             date_format($this->dt_nasc, 'DD/MM/YYYY');
             if($this->dt_nasc <= mktime(0,0,0,1,1,2000))
             {
                 $data_nasc = true;
             } 
             else 
                 $data_nasc = false;
         }
         else 
             $data_nasc = false;
         
         if (ctype_alpha($this->luogo_nascita))
         {
             strtolower($this->luogo_nascita);
             ucwords($this->luogo_nascita);
             $lg_nasc=true;
         }
         else
             $lg_nasc = false;
                 
     }
        
}
        
?>       
        
        
        