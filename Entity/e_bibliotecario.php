<?php

require_once 'inc.php';
include_once 'Entity/e_utente.php';

/**
 * La classe e_bibliotecario estende la classe e_utente ed implementa la tipologia di utente9 Bibliotecario.
 * @author gruppo11
 * @package Entity
 */

class e_bibliotecario extends e_utente {
    
    function __construct()
    {
       parent::__construct(); 
    }
    

}
?>