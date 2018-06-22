<?php 

require_once'inc.php';

class e_libro {
    private $autore;
    private $titolo;
    private $num_copie;
    private $isbn;
    
    
    function __constructor(){}
    
    function setAutore(string $autore){
        $this->autore=$autore;
    }
    
    function getAutore(){
        return $this->autore;
    }
    
    function setTitolo(string $titolo){
        $this->titolo=$titolo;
    }
    
    function getTitolo(){
        return $this->titolo;
    }
    
    function setNumCopie(int $num_copie){
        $this->num_copie=$num_copie;
    }
    
    function getNumCopie(){
        return $this->num_copie;
    }
    
    function setIsbn(string $isbn){
        $this->isbn=$isbn;
    }
    
    function getIsbn() : string {
        return $this->isbn;
    }
  
}

?>