<?php

require_once 'inc.php';
include_once 'Entity/e_utente.php';

/**
 * La classe e_bibliotecario estende la classe e_utente ed implementa la tipologia di utente Bibliotecario.
 * @author gruppo 11
 * @package Entity
 */

class e_bibliotecario extends e_utente
{
    /**
	*Metodo costruttore che istanzia un oggetto e_bibliotecario
	*/
	
    function __construct()
    {
       parent::__construct(); 
    }
	
}

?>