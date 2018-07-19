<?php

require_once 'inc.php';


/**
 * La classe e_oggetto caratterizza un oggetto Entity a partire dal suo Id.
 * @author gruppo11
 * @package Entity
 */

class e_oggetto
{
    /**
     * id che identifica l'oggetto
     */
    protected $id;
    
    /**
     * costruisce un oggetto vuoto
     * @param int $id(opzionale) identificativo dell'oggetto Entity
     */
    protected function __construct (int $id=null)
    {
        $this->id= $id;
    }
    
    /**
     * @return int l'identificativo dell'oggetto
     */
    function getId() : int
    {
        if(!$this->id)
            return 0;
        else return $this->id;
    }
    
    /**
     * @param int $id l'identificativo dell'oggetto Entity
     */
    function setId(int $id)
    {
        $this->id=$id;
    }
    
}