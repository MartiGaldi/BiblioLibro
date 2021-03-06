<?php
require_once 'inc.php';
/**
	* La classe c_ricerca implementa la funzionalitą di Ricerca all'interno del catalogo. Al suo interno presenta inoltre delle 
	* costanti che definiscono chiavi (ovvero risorse da ricercare) e valori (ovvero indici rispetto a cui cercare)
	* di default e avanzati.
	* @author gruppo 11
	* @package Controller
*/
class c_ricerca
{
    /** chiave di default */
    const KEY_DEFAULT = 'Libro';
    /** valore base: ricerca per titolo */
    const VALUE_DEFAULT = 'Titolo';
    
    /** chiave avanzata */
    const KEY_ADVANCED = 'Libro';
    /** valore avanzato: ricerca per autore */
    const VALUE_ADVANCED = 'Autore';
	
    /** chiave avanzata2 */
    const KEY_ADVANCED2 = 'Utente';
    /** valore avanzato: ricerca per nome */
    const VALUE_ADVANCED2 = 'Nome';
	
	const VALUE_DEFAULT2 = 'Catalogo';
    
    
    
   /**
    * Metodo che implementa la ricerca di base
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
            header('Location: /BiblioLibro/');
    }
    
	
	/**
     * Metodo che implementa il catalogo
     */
    static function catalogo()
    {
        $v_ricerca = new v_ricerca();
        $utente = c_sessione::getUtenteDaSessione();
        $string = '*';
        
        if($string)
        {   
            $oggetti = f_persistance::getInstance()->ricerca(c_ricerca::KEY_DEFAULT, c_ricerca::VALUE_DEFAULT2, $string);
            $v_ricerca->mostraRisultatoRicerca($utente, $oggetti, c_ricerca::KEY_DEFAULT, c_ricerca::VALUE_DEFAULT2, $string);
        }
        else
            header('Location: /BiblioLibro/index');
    }
    
    
 
    
    /**
	 * Metodo che implementa la ricerca avanzata 
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
                if(($key == c_ricerca::KEY_DEFAULT || $key == c_ricerca::KEY_ADVANCED || $key == c_ricerca::KEY_ADVANCED2) && 
					($value == c_ricerca::VALUE_DEFAULT || $value == c_ricerca::VALUE_ADVANCED || $value == c_ricerca::VALUE_ADVANCED2))
                {   
					// si prelevano gli oggetti
                    $oggetti = f_persistance::getInstance()->ricerca($key, $value, $string);
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
            $v_ricerca->Errore($utente, 'Devi essere registrato per accedere a questa funzionalitą');   
    }
}
?>
