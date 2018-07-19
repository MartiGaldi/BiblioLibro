<?php

require_once 'inc.php';
include_once 'Entity/e_utente.php';

/**
 * La classe e_bibliotecario estende la classe e_utente e implementa la tipologia di utenti Bibliotecario.
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