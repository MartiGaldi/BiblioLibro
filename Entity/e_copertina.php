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
    private $copertina; //byte immagine
    
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
    
    function setCopertina($copertina){
        
        $this->copertina=$copertina;
    }
    
    function getCopertina(bool $encode=null){
        
        if($enconde)
            $this->copertina=base64_encode($this->copertina);
        return $this->copertina;
    }
    
    /**imposta l'oggetto con valori statici ricavati da un'immagine nella directory di lavoro*/
    function SetStatico()
    {
        $file=dirname(__DIR__)."/risorse/static/copertina.png";
        
        $this->copertina=file_get_contests($file);
        $this->tipo=mime_content_type($file);
        $this->size=(int) filesize($file);
    }
    
    /**
    * Controlla che l'immagine sia valida    
    * @param bool $file che denota se l'immagine e' corretta o meno
    */
    function validazione(bool &$file)
    {  
        if($this->size<=0 && $this->copertina>=65535) 
            $file = false;
        if($this->tipo!='image/jpeg' && $this->tipo!='image/gif' && $this->tipo!='image/png' && $this->tipo!='image/svg')
            $file = false;       
    }
       
}

?>