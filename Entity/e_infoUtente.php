<?php

require_once'inc.php';

/**
* La classe e_infoUtente contiene le informazioni dettagliate sull'utente che non
* sono necessarie in fase di autenticazione.
* @author gruppo11
* @package Entity
*/

class e_infoUtente
{
   private $id;
   private $nome;
   private $cognome;
   private $cod_fisc;
   private $telefono;
   private $sesso;
   private $dt_nasc;
   private $luogo_nascita;
   
   
   function __construct(){}
	
    function setId (int $id)
	{
        $this->id = $id;
    }
	
     function getId() : int
	{
        if(!$this->id)
            return 0;
        else 
			return $this->id;
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
    
    
    function setDtNasc(string $dt_nasc)
    {
        $this->dt_nasc=new DateTime($dt_nasc);
    }
        
    function getDtNasc(bool $mostraFormato = null)
    {
        if($this->dt_nasc)
        {
            $formato="y-m-d";
            if($mostraFormato)
                $formato= "y/m/d";
            return $this->dt_nasc->format($formato);
        }
        else
            return NULL;
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
             
         if($this->cod_fisc && preg_match('/^[[:alnum:]]{16}$/', $this->cod_fisc))
             $cf=true;
         else
             $cf = false;
             
         if($this->telefono && preg_match('/[0-9]+{13}/', $this->telefono))
             $tel=true;
         else
             $tel = false;
         
         if($this->sesso=='maschio' || sesso=='femmina')
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
        
        
        