<?php

require_once 'inc.php';
include_once 'Entity/e_prestito.php';

/**
 * La classe e_storicoPrestito estende la classe e_prestito e rappresenta
 * i prestiti storici(conclusi) associati ad un determinato libro.
 * @package Entity
 * @author gruppo 11
 */

class e_storicoPrestito extends e_prestito
{
    private $prestito;
  
    /**
     * Metodo costruttore che istanzia un oggetto e_storicoPrestito
     */
    function __construct()
    {
        parent::__construct();
    }
    
    function setPrestito () {
        $this->prestito=$prestito;
    }
    
    /**
     * Metodo che sposta le informazioni del prestito in storicoPrestito.
     */
    function getPrestito(bool $rientro) : bool
    {
        $rientro = f_persistance::getIstance()->carica(e_prestito::class, $this->id)->getRientro;
        if($rientro==true)
        {
            $prestito = f_persistance::getIstance()->carica(e_prestito::class, $this->id);
            if($prestito)
                $this->prestito = $prestito;
            else
                $this->prestito = new e_prestito();
            return $storico=true;
        }
    }
}

?>