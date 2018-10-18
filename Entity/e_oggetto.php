<?php
require_once 'inc.php';
/**
 * La classe EObject caratterizza un oggetto Entity a partire dal suo Id.
 * @author gruppo11
 * @package Entity
 */
class e_oggetto
{
    /** l'id che identifica l'oggetto */
    protected $id; 
    
    /**
     * Costruisce un oggetto vuoto
     * @param int $id (opzionale) l'identificativo dell'oggetto Entity
     */
    protected function __construct(int $id=null)
	{
        $this->id = $id;
    }
    
    /**
     * @return int l'identifier dell'oggetto
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
        $this->id = $id;
    }
    
}

