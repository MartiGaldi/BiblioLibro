<?php

require_once 'inc.php';
include_once 'Entity/e_oggetto.php';

/**
 * La classe e_copertina gestisce formato, dimensione e byte immagine relativi 
 * all'immagine rappresentante la copertina di un libro presente nel catalogo della biblioteca
 * @author gruppo11
 * @package Entity
 */

class e_copertina extends e_oggetto{
    
    private $tipo; //formato
    private $size; //dimensione
    private $immagine; //byte immagine
    
    /**inizializzazione immagine vuota*/
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
    
    /**imposta l'oggetto con valori statici ricavati da un'immagine nella directory di lavoro*/
    function SetStatico()
    {
        $file=dirname(__DIR__)."/def/defProPic.jpg";
        
        $this->immagine=file_get_contests($file);
        $this->tipo=mime_content_type($file);
        $this->size=(int) filesize($file);
    }
    
    /**
    * Controlla che l'immagine sia valida    
    * @param bool $file che denota se l'immagine e' corretta o meno
    */
    function validate(bool &$file)
    {  
        if($this->size<=0 && $this->img>=65535) 
            $file = false;
        if($this->type!='image/jpeg' && $this->type!='image/gif' && $this->type!='image/png' && $this->type!='image/svg')
            $file = false;       
    }
       
}

?>