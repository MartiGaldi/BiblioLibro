<?php

/**
* La classe FTarget contiene stringhe da utilizzare come parametro per f_persistance
* per specificare, in funzionalita come carica o esiste, i tipi di query che si vogliono
* utilizzare per una data classe.
* @author gruppo11
* @package Foundation
*/

class f_target
{
    /** caricamento dei libri */
    const CARICA_LIBRO	= 'Libro';
    
    /** caricamento dei clienti */
    const CARICA_CLIENTE = 'Cliente';
    
    /** verifica che un nickname non sia utilizzato */
    const NICKNAME_ESISTENTE = 'Nickname';
    
    /** verifica che una mail non sia utilizzata */
    const MAIL_ESISTENTE = 'Mail';
	
	/** caricamento dei prestiti di un cliente (in corso) */
	const CARICA_PRESTITO = 'Prestito';
	
	/** caricamento dei presiti di un cliente (conclusi)*/
	const CARICA_STORICO = 'Storico';
}

?>