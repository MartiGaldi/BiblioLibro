<?php

require_once 'inc.php';
include_once 'Entity/e_oggetto.php';

/**
 * La classe e_visitatore estende la classe padre e_utente e implementa la tipologia di utente Visitatore.
 * @author gruppo11
 * @package Entity
 */

class e_visitatore extends e_utente
{
    /**
     * Costruisce un utente Visitatore. L'id viene posto a 0 e il suo nickname e' semplicemente
     * 'Visitatore' (quest'ultimo e' un valore simbolico e non incide a livello di procedure).
     */
    function __construct()
    {
        parent::__construct();
        $this->id=0;
        $this->nickname='Visitatore';
    }
}

?>