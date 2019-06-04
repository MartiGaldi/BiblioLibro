<?php
require_once 'inc.php';

/**
* Il Controller c_storico implementa le funzionalità 'Gestione Storico'.
* Il bibliotecario può caricare, modificare e rimuovere un prestito storico.
* @package Controller
*/
class c_storico
{ 
    /**
    * La funzione carica permette la visualizzazione della form per il rientro di un testo,
    *  a seguito di una richiesta GET, o l'inserimento di un libro da parte del bibliotecario a seguito
    * di una richiesta POST.
    */
    
    static function carica()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET')
            c_storico::mostraFormCarica();
        
            else if ($_SERVER['REQUEST_METHOD'] == 'POST')
                c_storico::aggiungiStorico();
                
                else
                    header('Location: HTTP/1.1 405 Invalid HTTP method detected');              
    }
    
    
    
    /**
    * La funzione modifica permette la visualizzazione della form per la modifica di uno storico, 
    * a seguito di una richiesta GET o l'inserimento delle modifiche da parte del bibliotecario a seguito di una richiesta POST.
    * @param int $id l'identificativo del prestito storico, specificato nell'URL.
    */
    
    static function modifica ($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET')
            
            c_storico::mostraFormModifica($id);
            
            else if ($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                if(is_numeric($id))
                    c_storico::modificaStorico($id);
                    
                    else  
                        header('Location: /BiblioLibro/indice');      
            }
            else
                header('Location: HTTP/1.1 405 Invalid HTTP method detected');   
    }
    
    
    
    /**
    
    * La funzione rimuovi permette la visualizzazione della form per la rimozione di un testo,
    * a seguito di una richiesta GET, o la conferma
    * dell'operazione da parte del bibliotecario a seguito di una richiesta POST.
    * @param int $id l'identificativo del libro, prelevato dall'URL.
    */
    
    static function rimuovi ($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET')
            c_prestito::mostraFormRimuovi($id);
            
            else if ($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                if(is_numeric($id))
                    c_storico::rimuoviStorico($id);
                else
					header('Location: /BiblioLibro/indice');   
            }
            else 
                header('Location: HTTP/1.1 405 Invalid HTTP method detected');      
    }

    /**
     *  la funzione mostra permette la visualizzazione del libro da parte degli utenti
     */
    static function mostra($id)
    {
        if(is_numeric($id))
        {
            $v_storico=new v_storico();
            $utente=c_sessione::getUtenteDaSessione();
            $storico=f_persistance::getInstance()->carica(e_storico::class, $id);
            if($storico)
            {
			   $mostra = false; //prenota
			   
			    if(is_a($utente, e_bibliotecario::class))
				{
					$mostra = true;
				}
		   $v_storico->mostraStorico($utente, $storico, $mostra);
            }
            else
                $v_storico->Errore($utente, "L'id non corrisponde a nessun prestito");
        }
        else
            header('Location: HTTP/1.1 405 Invalid URL detected');
    }
    
    
    
    /**
    * Mostra la form per il caricamento di un libro. Reindirizza ad un messaggio di errore
    * se l'utente che accede alla risorsa non e' un bibliotecario.
    */
    
    private function mostraFormCarica()
    {
        $v_storico = new v_storico();
        $Utente = c_sessione::getUtenteDaSessione();
        
        if(get_class($Utente)!=e_bibliotecario::class) // se l'utente non e' un bibliotecario
            $v_storico->Errore($Utente, 'Devi essere un bibiotecario per accedere a questa funzionalità');
        else 
            $v_storico->mostraFormCarica($Utente); //mostra form               
    }
    
    
    
    /**
    
    * Mostra la form per la modifica di un libro. Reindirizza ad un messaggio di errore
    * se l'utente che accede alla risorsa non e' un bibliotecario.
    * @param int $id l'identificativo del libro.
    */
    
    private function mostraFormModifica($id)
    {
        $v_storico = new v_storico();
        $utente = c_sessione::getUtenteDaSessione();
        
           if(is_numeric($id)) // verifica che nell'url sia stato inserito un id
             {  
               $storico = f_persistance::getInstance()->carica(e_storico::class, $id); // carica il prestito dal db
                if($storico) // se la prenotazione esiste
                  {
                      if(is_a($utente, e_bibliotecario::class))
                           $v_storico->mostraFormModifica($utente, $storico);
                       else
                           $v_storico->Errore($utente, 'Non hai il permesso per modificare il prestito storico');
                    }
                  else // altrimenti mostra una pagina d'errore. 
                         $v_storico->Errore($utente, 'ID non valido');  
        }
        else
            $v_storico->Errore($utente, 'La URL non e valida');
    }
    
    
    
    /**
    
    * Mostra la form per la rimozione di un testo. Reindirizza ad un messaggio di errore
    * se l'utente che accede alla risorsa non e' un bibliotecario.
    * @param int $id l'identificativo del libro.
    */
    
    private function mostraFormRimuovi ($id)
    {
        $v_storico = new v_storico();
        $utente = c_sessione::getUtenteDaSessione();
        if(is_numeric($id)) // verifica che nell'url sia stato inserito un id
        {
            $storico= f_persistance::getInstance()->carica(e_storico::class, $id); // carica il libro dal db
            if($storico) // se il libro esiste
            { // verifica che l'utente puo' effettivamente rimuoverla
                if(is_a($utente, e_bibliotecario::class))
                    $v_storico->mostraFormRimuovi($utente, $storico); // mostra la pagina di rimozione
                    else
                        $v_storico->Errore($utente, 'NON puoi rimuovere questo storico');    
            }
            else
                // altrimenti mostra una pagina d'errore.
                $v_storico->Errore($utente, "L'id non corrisponde a nessun prestito.");   
        }
        else
            $v_storico->Errore($utente, 'la URL non e valida.');   
    }
    
    
	
    private function aggiungiStorico()
    {
        $v_storico = new v_storico(); // crea la view
		
        $utente = c_sessione::getUtenteDaSessione(); // ottiene l'utente della sessione
        if (get_class($utente) == e_bibliotecario::class)
        {
            $storico = $v_storico->creaStorico(); // la view restituisce una e_storico costruita a partire dalla form
			
			$idPrestito = $storico->getIdPrestito(); //id prestito
			$pres = f_persistance::getInstance()->carica(e_prestito::class, $idPrestito); // si caricano i dati del prestito
			if($pres)
			{
			$utentePrestito = $pres->getUtentePrestito();
			$libroPrestito = $pres->getLibroPrestito();
			$dataScadenza = $pres->getDataScadenza();
			
			$nuovoStorico = new e_storico();
			$nuovoStorico->setUtenteStorico($utentePrestito);
			$nuovoStorico->setLibroStorico($libroPrestito);
			$nuovoStorico->setDataScadenza($dataScadenza);
			$nuovoStorico->setIdPrestito($idPrestito);
			f_persistance::getInstance()->salva($nuovoStorico);
			
			$lib = f_persistance::getInstance()->carica(e_libro::class, $libroPrestito); // si caricano i dati del libro
			$copie = $lib->getCopieDisponibili();
			$copie ++;
			$autore= $lib->getAutore();
			$titolo= $lib->getTitolo();
			$num= $lib->getNumCopie();
			$durata= $lib->getDurata();
			$genere= $lib->getGenere();
			$isbn= $lib->getIsbn();
			$descrizione= $lib->getDescrizione();
			
			if($copie <= $num)
			{
			$libro = new e_libro();
			$libro->setId($lib->getId());
			$libro->setAutore($autore);
			$libro->setTitolo($titolo);
			$libro->setNumCopie($num);
			$libro->setDurata($durata);
			$libro->setGenere($genere);
			$libro->setIsbn($isbn);
			$libro->setDescrizione($descrizione);
			$libro->setCopieDisponibili($copie);
			f_persistance::getInstance()->aggiorna($libro);
			
			//RIMUOVI PRENOTAZIONE
			f_persistance::getInstance()->rimuovi(e_prestito::class, $idPrestito);
			$v_storico->Avviso($utente, 'PRESTITO STORICO AGGIUNTO CON SUCCESSO');
			}
			else
			$v_storico->Errore($utente, "RIENTRO PRESTITO NON VALIDO");	
			}
			else 
			$v_storico->Errore($utente, "PRESTITO NON VALIDO"); 	
		}
        else
            $v_storico->Errore($utente, 'UTENTE NON AUTORIZZATO');
    }
    
    
    
    /**
    * Mostra il form per la modifica di un libro. Reindirizza ad un messaggio di errore
    * se l'utente che accede alla risorsa non e' un bibliotecario.
    * @param int $id l'identificativo del libro.
    */
    
    private function modificaStorico ($id)
    {
        $v_storico = new v_storico();
        $utente = c_sessione::getUtenteDaSessione();
        
        $nuovoStorico = $v_storico->creaStorico(); // la view restituisce una e_libro costruito a partire dalla form
        $vecchioStorico = f_persistance::getInstance()->carica(e_storico::class, $id); // carica il vecchio libro dal db
        
        if($vecchioStorico) // se il libro esiste
        {
            // verifica che l'utente puo' effettivamente modificarlo
            if(is_a($utente, e_bibliotecario::class))
            {
                if($v_storico->validazioneModifica($nuovoStorico)) // verifica che le modifiche siano corrette
                {
                    $nuovoStorico->setId($vecchioStorico->getId());
                    f_persistance::getInstance()->aggiorna($nuovoStorico);
					header('Location: /BilioLibro/storico/mostra/'.$nuovoStorico->getId());   
                }
                else 
                    $v_storico->mostraFormModifica($utente, $vecchioStorico, false);        
            }
            else
                $v_storico->Errore($utente, "Non hai l'autorizzaione per modificare lo storico.");        
        }
        else
            $v_prestito->Errore($utente, "L'id non corrisponde a nessun prestito storico.");
    }
    
    
    
    /**
    * Effettua la rimozione di un libro. Reindirizza ad un messaggio di errore
    * se l'utente che vuole rimuovere il brano non è il bibliotecario.
    * @param int $id l'identificativo del libro.
    */
    
    private function rimuoviStorico ($id)
    {
        $v_storico= new v_storico();
        $utente = c_sessione::getUtenteDaSessione();
        $storico = f_persistance::getInstance()->carica(e_storico::class, $id); // carica il prestito dell'url
        
        if($storico) // se il libro esiste
        {
            if(is_a($utente, e_bibliotecario::class)) // verifica che l'utente puo' effettivamente rimuoverlo
            {
                if($v_storico->validazioneRimuovi()) // se il bibliotecario ha deciso di rimuoverlo
                
                    f_persistance::getInstance()->rimuovi(e_storico::class, $storico->getId()); // rimuove il libro
                
                else // altrimenti si viene reindirizzati ad una pagina di errore
                    
                    header('Location: /BiblioLibro/storico/mostra/'.$storico->getId());
            }
            else
                $v_storico->Errore($utente, "Non hai l'autorizzazione per rimuovere il prestito storico"); 
        }
        else
            $v_storico->Errore($utente, "L'id non corrisponde a nessuno storico."); 
    }
}
?>