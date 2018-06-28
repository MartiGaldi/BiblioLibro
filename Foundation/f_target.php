<?php

/**
* La classe FTarget contiene stringhe da utilizzare come parametro per f_persistance
* per specificare, in funzionalita come carica o esiste, i tipi di query che si vogliono
* utilizzare per una data classe. In particolare:
* e_utente supporta:
*  - NICKNAME_ESISTENTE
*  - MAIL_ESISTENTE

* e_libro supporta:
*  - CARICA_LIBRO

* e_utente supporta:
*  - CARICA_CLIENTE
*/

class f_target
{
    /** caricamento dei libri dal bibliotecario */
    const CARICA_LIBRI = 'Libri';
    
    /** caricamento dei clienti */
    const CARICA_CLIENTI = 'Clienti';
    
    /** verifica che un nickname non sia utilizzato */
    const NICKNAME_ESISTENTE = 'NickName';
    
    /** verifica che una mail non sia utilizzata */
    const MAIL_ESISTENTE = 'Mail';
}

?>