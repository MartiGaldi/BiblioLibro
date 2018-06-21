<?php

require_once 'inc.php';
include_once 'Entity/e_oggetto.php';

class e_copertina extends e_oggetto{
    
    private $tipo; //formato
    private $size; //dimensione
    private $immagine; //byte immagine
    
    //inizializzazione immagine vuota
    function __constructor(){
        $this->size=0;
        $this->tipo='non definito';
    }
    
    function setTipo(string $tipo) {
        
        $this->tipo=$tipo;
    }
    
    function getTipo() : string {
        
        return $this->tipo;
    }
    
    
    function setSize(int $size){
        
        $this->size=$size;
    }
    
    function getSize() : int {
        
        return $this->size;
    }
    
    function setImmagine($immagine){
        
        $this->immagine=$immagine;
    }
    
    function getImmagine(bool $encode=null){
        
        if($enconde)
            $this->immagine=base64_encode($this->immagine);
        return $this->immagine;
    }
    
    function SetStatico()
    {
        $file=dirname(__DIR__)."/def/defProPic.jpg";
        
        $this->immagine=file_get_contests($file);
        $this->tipo=mime_content_type($file);
        $this->size=(int) filesize($file);
    }
       
    }