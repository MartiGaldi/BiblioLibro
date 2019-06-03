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
    
    
    private function prenotazione($id) //id libro
    {
        $v_prenotazione = new v_prenotazione();
        $utente = c_sessione::getUtenteDaSessione();
		$user = $utente->getId();
		
        if (! is_a($utente, e_visitatore::class)) 
        { // se l'utente non e' un visitatore
            if (is_numeric($id)) 
            { // se l'url contiene un id
                $libroPrenotazione = f_persistance::getInstance()->carica(e_libro::class, $id); // si carica il libro
				if ($libroPrenotazione) // se il libro esiste
                {
					$book= $libroPrenotazione->getId();
					$copieDisp = $libroPrenotazione->getCopieDisponibili();
					
					$autore= $libroPrenotazione->getAutore();
					$titolo= $libroPrenotazione->getTitolo();
					$num= $libroPrenotazione->getNumCopie();
					$durata= $libroPrenotazione->getDurata();
					$genere= $libroPrenotazione->getGenere();
					$isbn= $libroPrenotazione->getIsbn();
					$descrizione= $libroPrenotazione->getDescrizione();
					
                    if ($v_prenotazione->validaScelta()) // se l'utente ha scelto di prenotare il testo
                    {
						if ($copieDisp != 0)
						{
						// si costruisce l'oggetto prenotazione
                        $prenotazione = new e_prenotazione();
                        $prenotazione->setUtentePrenotazione($user);
						$prenotazione->setLibroPrenotazione($book);
						$prenotazione->creaDataScadenza();
						f_persistance::getInstance()->salva($prenotazione);
						
						$copieDisp --;
						$libro = new e_libro();
						$libro->setId($libroPrenotazione->getId());
						$libro->setAutore($autore);
						$libro->setTitolo($titolo);
						$libro->setNumCopie($num);
						$libro->setDurata($durata);
						$libro->setGenere($genere);
						$libro->setIsbn($isbn);
						$libro->setDescrizione($descrizione);
						$libro->setCopieDisponibili($copieDisp);
                        f_persistance::getInstance()->aggiorna($libro);
						
						$v_prenotazione->Avviso($utente, 'PRENOTAZIONE EFFETTUATA CON SUCCESSO.');
						//header('Location: /Bibliolibro/utente/profilo/' . $utente->getId()); // redirect al profilo
						}
						else
						$v_prenotazione->Errore($utente, 'Siamo spiacenti. Attualmente non ci sono copie disponibili per la prenotazione.');
                    } 
                    else
                        header('Location: /Bibliolibro/libro/mostra/' . $libroPrenotazione->getId()); // redirect alla schermata precedente
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