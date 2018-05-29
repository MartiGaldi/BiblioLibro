<?php

require_once'inc.php';

class e_infoCliente {
    
   private $nickname;
   private $nome;
   private $cognome;
   private $cod_fisc;
   private $telefono;
   private $sesso;
   private $dt_nascita;
   private $luogo_nascita;
   
    
    
    function __constructor(){}
    
    
    function setNickname (string $nickname) {
        $this->nickname=$nickname;
    }
    
    function getNickname(){
        return $this->nickname;
    }
    
    function setNome (string $nome){
        $this->nome=$nome;
    }
    
    function getNome(){
        return $this->nome;
    }
    
    function setCognome (string $cognome){
    $this->cognome=$cognome;
    }

    function getCognome(){
    return $this->cognome;
    }
    
    function setCodFisc (string $cod_fisc) {
        $this->cod_fisc=$cod_fisc;
    }
    
    function getCodFisc (){
        return $this->cod_fisc;
    }
    
    function setTelefono (int $telefono){
        $this->telefono=$telefono;
    }
    
    function getTelefono(){
        return $this->telefono;
    }
    
    function setSesso (string $sesso){
        $this->sesso=$sesso;
    }
    
    function getSesso(){
        return $this->sesso;
    }
    
    function setDtNas(DateTime $dt_nascita){
            $this->dt_nascita=$dt_nascita;
        }
        
     function getDtNasc(){
            return $this->dt_nasc;
    }

     function setLuogoNascita(DateTime $luogo_nascita){
            $this->luogo_nascita=$luogo_nascita;
     }

     function getLuogoNascita(){
            return $this->luogo_nascita;
        }