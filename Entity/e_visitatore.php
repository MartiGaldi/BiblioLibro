<?php

require_once 'inc.php';
include_once 'Entity/e_oggetto.php';

class e_visitatore extends e_utente
{
    function __construct()
    {
        parent::__construct();
        $this->id=0;
        $this->nickname='Visitatore';
    }
}

?>