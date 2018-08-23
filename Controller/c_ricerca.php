<?php

/**
 * La classe c_cerca implementa la funzionalit� di Ricerca all'interno del catalogo. Al suo interno presenta inoltre delle 
 * costanti che definiscono chiavi (ovvero risorse da ricercare) e valori (ovvero indici rispetto a cui cercare)
 * di default e avanzati.
 * @author gruppo11
 * @package Controller
 */

class c_ricerca
{
    //chiave di default
    const KEY_DEFAULT = 'Libro';
    //valore base: ricerca per titolo
    const VALUE_DEFAULT = 'Titolo';
    
    //chiave avanzata
    const KEY_ADVANCED = 'Libro';
    //valore avanzato: ricerca per autore
    const VALUE_ADVANCED = 'Autore';
   /** //chiave avanzata
    const KEY_ADVANCED = 'Libro';
    //valore avanzato: ricerca per genere
    const VALUE_ADVANCED = 'Genere';*/
    
    
    
   /**
    * Metodo implementa la ricerca di base che pu� essere effettuata da qualsiasi tipo di utente
    */
    static function semplice()
    {
        $v_ricerca = new v_ricerca();
        $utente = c_sessione::getUtenteDaSessione();
        $string = $v_ricerca->getValoreRicerca();
        
        if($string)
        {   
            $oggetti = f_persistance::getInstance()->ricerca(c_ricerca::KEY_DEFAULT, c_ricerca::VALUE_DEFAULT, $string);
            $v_ricerca->mostraRisultatoRicerca($utente, $oggetti, c_ricerca::KEY_DEFAULT, c_ricerca::VALUE_DEFAULT, $string);
        }
        else
            header('Location: /BiblioLibro/index');
    }
    
    
    
 
    
    /**
	* Questo metodo implementa la ricerca avanzata che pu� essere effettuata solo dagli utenti registrati
    */
	
    static function avanzata()
    {
        $v_ricerca = new v_ricerca();
        $utente = c_sessione::getUtenteDaSessione();
        
        if (get_class($utente) != e_visitatore::class)
        {   
            // si ricava la stringa inserita dall'utente per la ricerca
            $string = $v_ricerca->getValoreRicerca();
            
            if ($string)
            { 
				// si ricavano chiave e valore di ricerca scelti dall'utente
                list($key, $value)=$v_ricerca->getKeyAndValue();
                // se le chiavi corrispondono alle costanti
                if(($key == c_ricerca::KEY_DEFAULT || $key == c_ricerca::KEY_ADVANCED) && ($value == c_ricerca::VALUE_DEFAULT || $value == c_ricerca::VALUE_ADVANCED))
                {   
					// si prelevano gli oggetti
                    $oggetti = f_peristance::getInstance()->cerca($key, $value, $string);
                    $v_ricerca->mostraRisultatoRicerca($utente, $oggetti, $key, $value, $string);
                } 
                else
                    $v_ricerca-> Errore($utente, 'I valori inseriti non sono corretti');
            }
            else
            {
                //se la stringa non e' stata inserita, l'utente si reindirizza alla pagina della ricerca avanzata
                $v_ricerca->mostraRicercaAvanzata($utente);
            } 
        }
        else
        // se l'utente e' un visitatore, si reindirizza ad una pagina di errore
            $v_ricerca->Errore($utente, 'Devi essere registrato per accedere a questa funzionalit�');   
    }
}
?>