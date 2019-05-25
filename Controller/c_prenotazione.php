<?php
require_once 'inc.php';

/**
 * La classe c_prenotazione implementa la funzionalità 'Prenota'.
 * @author gruppo11
 * @package Controller
 */
class c_prenotazione
{
    /**
     * La funzione prenotazione permette la prenotazione di un testo.
     * @param int $id l'identificativo dell'utente
     */
    static function prenota($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET')
        {
            c_prenotazione::mostraConfermaPrenotazione($id);
        }
        else 
		{
			if ($_SERVER['REQUEST_METHOD'] == 'POST')
			c_prenotazione::prenotazione($id);
			else
            header('Location: HTTP/1.1 Invalid HTTP method detected');
		}
	}
    
    
    private function prenotazione($id)
    {
        $v_prenotazione = new v_prenotazione();
        $utente = c_sessione::getUtenteDaSessione();
		$user = $utente->getId();
		
        if (! is_a($utente, e_visitatore::class)) 
        { // se l'utente non e' un visitatore
            if (is_numeric($id)) 
            { // se l'url contiene un id
                $libroPrenotazione = f_persistance::getInstance()->carica(e_libro::class, $id); // si carica il libro
				$book= $libroPrenotazione->getId();
				if ($libroPrenotazione) // se il libro esiste
                {
                    if ($v_prenotazione->validaScelta()) // se l'utente ha scelto di prenotare il testo
                    {
						// si costruisce l'oggetto prenotazione
                        $prenotazione = new e_prenotazione();
                        $prenotazione->setUtentePrenotazione($user);
						$prenotazione->setLibroPrenotazione($book);
						$prenotazione->creaDataScadenza();
						f_persistance::getInstance()->salva($prenotazione);
						//$v_prenotazione->Avviso($utente, 'PRENOTAZIONE EFFETTUATA CON SUCCESSO.');
						header('Location: /Bibliolibro/utente/profilo/' . $utente->getId()); // redirect al profilo
                    } 
                    else
                        header('Location: /Bibliolibro/libro/mostra/' . $libroPrenotazione->getId()); // redirect alla home
				} 
			} 
			else
					$v_prenotazione->Errore($utente, 'URL invalido');
		}
        else
            $v_prenotazione->Errore($utente, 'Devi essere registrato per utilizzare questa funzionalità!');
    }
	
    private function mostraConfermaPrenotazione($id)
    {
        $v_prenotazione = new v_prenotazione();
        $utente = c_sessione::getUtentedaSessione();
        if(get_class($utente)!= e_visitatore::class)
        {
            if(is_numeric($id))
            {
                $libro= f_persistance::getInstance()->carica(e_libro::class, $id);
                if(is_a($libro, e_libro::class))
                    $v_prenotazione->mostraConfermaPrenotazione($utente, $libro);
                else 
                   $v_prenotazione->Errore($utente, '');   
            }
            else 
                $v_prenotazione->Errore($utente, '');
        }
        else 
            $v_prenotazione->Errore($utente, '');
    }
}