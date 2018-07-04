<?php

require_once'inc.php';

/**
* La classe e_infoLibro contiene tutte le informazioni più specifiche riguardanti
* i testi presenti in biblioteca.

* @author gruppo11
* @package Entity
*/

class e_infoLibro {
   
    private $isbn;
    private $descrizione;
    private $categoria;
    private $copertina;
    
    function __constructor(){}
    
    function setIsbn(string $isbn)
    {
        $this->isbn=$isbn;
    }
    
    function getIsbn() : string
    {
        return $this->isbn;
    }
    
    function setDescrizione(string $descrizione)
    {
        $this->descrizione=$descrizione;
    }
    
    function getDescrizione()
    {
        return $this->descrizione;
    }
    
    function setCategoria(string $categoria)
    {
        $this->categoria=$categoria;
    }
    
    function getCategoria()
    {
        return $this->categoria;
    }
    
    function setCopertina(e_copertina $copertina)
    {
        $this->copertina=$copertina;
    }
    
    function getCopertina()
    {
        return $this->copertina;
    }
    
    public $_commento = array();
    
    function addCommento(e_commento $commento)
    {
        array_push($this->_commento, $commento);
    }
 
}

?>