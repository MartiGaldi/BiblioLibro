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
		var_dump($utente);
        
        if (! is_a($utente, e_visitatore::class)) 
        { // se l'utente non e' un visitatore
            if (is_numeric($id)) 
            { // se l'url contiene un id
               // $utentePrenotazione = f_persistance::getInstance()->carica(e_utente::class, $id); // si carica l'utente
                if ($utente) // se l'utente esiste
                {
                    if ($v_prenotazione->validaScelta()) // se l'utente ha scelto di prenotare il testo
                    { // si costruisce l'oggetto prenotazione
                        $prenotazione = new e_prenotazione();
                        $prenotazione->setUtentePrenotazione($utente);
                        if ($prenotazione->isValid()) { // se l'associazione e' valida
                            if (! $prenotazione->esiste())
                            { // salva l'associazione nel database
                                //$supInfo = $supportUser->getSupportInfo();
                                
                                $prenotazione->creaDataScadenza($supInfo->getPeriod());
                                
                                f_persistance::getInstance()->salva($prenotazione);
                                
                                header('Location: /Bibliolibro/utente/profilo/' . $utentePrenotazione->getId()); // redirect al profilo
                            } 
                            else
                                $v_prenotazione->Errore($utente, 'Hai gia effettuato la prenotazione ');
                       // } 
                      //  else
                        //    $vSupporter->showErrorPage($user, 'You can\'t support yourself!');
                    } 
                    else
                        header('Location: /Bibliolibro/utente/profilo/' . $utentePrenotazione->getId() ); // redirect al profilo
                }
            } 
            else
                $vSupporter->Errore($utente, 'URL invalido');
        } 
        else
            $vSupporter->Errore($utente, 'Devi essere registrato per utilizzare questa funzionalità!');
    }
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