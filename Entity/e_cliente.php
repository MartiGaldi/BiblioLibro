<?php

require_once 'inc.php';
include_once 'Entity/e_utente.php';

/**
* La classe e_cliente estende la classe e_utente e rappresenta 
* l'utente base dell'applicazione.
* 
* @package Entity
* @author gruppo 11
*/

class e_cliente extends e_utente
{
    /**
    * Metodo costruttore che istanzia un oggetto e_cliente
    */
    
    function __construct()
    {
        parent::__construct();
    }
    
}