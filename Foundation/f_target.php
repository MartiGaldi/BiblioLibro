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
	
	 /** caricamento degli utenti */
    const CARICA_UTENE = 'Utente';
	
    /** verifica che un nickname non sia utilizzato */
    const ESISTE_NICK = 'Nick';
    
    /** verifica che una mail non sia utilizzata */
    const ESISTE_MAIL= 'Mail';
	
	/** caricamento dei prestiti di un cliente (in corso) */
	const CARICA_PRESTITO = 'Prestito';
	
	/** caricamento dei presiti di un cliente (conclusi)*/
	const CARICA_STORICO = 'Storico';
	
	/** caricamento delle prenotazioni di un cliente */
	const CARICA_PRENOTA = 'Prenota';
}

?>