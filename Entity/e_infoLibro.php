<?php

require_once'inc.php';
include_once 'Entity/e_oggetto';

/**
* La classe e_infoLibro contiene tutte le informazioni più specifiche riguardanti
* i testi presenti in biblioteca.
* @author gruppo11
* @package Entity
*/

class e_infoLibro extends e_oggetto{
   
    private $isbn;
    private $descrizione;
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
    
    function validazioneIsbn() : bool
    {
        if($this->isbn && preg_match('/[0-9]{16}/', $this->isbn))
            return true;
            else
                return false;
    }
    
    function setDescrizione(string $descrizione)
    {
        $this->descrizione=$descrizione;
    }
    
    function getDescrizione()
    {
        return $this->descrizione;
    }
    
    function validazioneDescrizione() : bool
    {
        if($this->descrizione && preg_match('/^[[:alpha:]]{10,150}$/', $this->descrizione))
            return true;
        else
            return false;
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
    
    /**
     * Restituisce un array di commenti relativi al libro
     * @access public
     * @return array
     * @ReturnType array
     */
    public function getCommenti() 
    {
        return ($this->_commento);
    }
 
}

?>