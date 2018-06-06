<?php

class e_copertina {
    
    private $id;
    private $mime_type; //formato
    private $size;
    private $file_cop;
    
    
    function __constructor(){}
    
    
    function setId(int $id){
        
        $this->isbn_cop=$id;
    }
    
    function getId() : int {
        
        return $this->id;
    }
    
    function setMimeType(string $mime_type) {
        
        $this->mime_type=$mime_type;
    }
    
    function getMimeType() : string {
        
        return $this->mime_type;
    }
    
    
    function setSize(int $size){
        
        $this->size=$size;
    }
    
    function getSize() : float {
        return $this->size;
    }
    
    function setFile(){
        $this->file=$file;
    }
    
    function getFile(){
        
        return $this->file;
    }
       
    }