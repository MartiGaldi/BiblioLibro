<?php

require_once 'inc.php';


/**
 * La classe e_oggetto caratterizza un oggetto Entity a partire dal suo Id.
 * @author gruppo11
 * @package Entity
 */

class e_oggetto
{
    
    protected $id;
    
    
    protected function __construct (int $id=null)
    {
        $this->id= $id;
    }
    
    function getId() : int
    {
        if(!$this->id)
            return 0;
        else return $this->id;
    }
    
    function setId(int $id)
    {
        $this->id=$id;
    }
    
}