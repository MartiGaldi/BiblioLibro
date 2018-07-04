<?php 

require_once'inc.php';

/**
* @author gruppo 11
* @package Entity
* La classe e_libro caratterizza i testi presenti nel catalogo della biblioteca.
* Contiene le informazioni principali riguardanti quest'ultimi quali titolo, autore e numero di copie presenti.
*/

class e_libro extends e_oggetto {
    
    private $autore;
    private $titolo;
    private $num_copie;
    
    
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
}

?>