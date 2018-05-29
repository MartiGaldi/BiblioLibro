<?php

require_once'inc.php';

class e_copertina extends e_id{
    private $isbn_cop;
    private $mime_type;
    private $size;
    private $file;
    
    
    function __constructor(){}
    
    function setIsbnCop(string $isbn_cop){
        $this->isbn_cop=$isbn_cop;
    }
    
    function getIsbnCop(){
        return $this->isbn_cop;
    }
    
    function setMimeType(string $mime_type){
        $this->mime_type=$mime_type;
    }
    
    function getMimeType(){
        return $this->mime_type;
    }
    
    function setSize(int $size){
        $this->size=$size;
    }
    
    function getSize(){
        return $this->size;
    }
    
    function setFile(...){
        $this->file=$file;
    }
    
    function getFile() {
        return $this->file;
    }
        ;
    }