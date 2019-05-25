<?php
require_once 'inc.php';

/**
* Il Controller c_libro implementa le funzionalità 'Gestione Libro'.
* Il bibliotecario può caricare, modificare e rimuovere un testo.
* @package Controller
*/

class c_prestito
{ 
    /**
    * La funzione carica permette la visualizzazione della form per il caricamento di un testo,
    *  a seguito di una richiesta GET, o l'inserimento di un libro da parte del bibliotecario a seguito
    * di una richiesta POST.
    */
    
    static function carica()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET')
            c_prestito::mostraFormCarica();
        
            else if ($_SERVER['REQUEST_METHOD'] == 'POST')
                c_prestito::aggiungiPrestito();
                
                else
                    header('Location: HTTP/1.1 405 Invalid HTTP method detected');              
    }
    
    
    
    /**
    * La funzione modifica permette la visualizzazione della form per la modifica di un testo, 
    * a seguito di una richiesta GET,
    * o l'inserimento delle modifiche di un libro da parte del bibliotecario a seguito di una richiesta POST.
    * @param int $id l'identificativo del libro, specificato nell'URL.
    */
    
    static function modifica ($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET')
            
            c_prestito::mostraFormModifica($id);
            
            else if ($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                if(is_numeric($id))
                    c_prestito::modificaPrestito($id);
                    
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
                    c_prestito::rimuoviPrestito($id);
                    
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
            $v_prestito=new v_prestito();
            $utente=c_sessione::getUtenteDaSessione();
            $prestito=f_persistance::getInstance()->carica(e_prestito::class, $id);
            if($prestito)
            {
			   $mostra = false; //prenota
			   
			    if(is_a($utente, e_bibliotecario::class) || is_a($utente, e_cliente::class))
				{
					$mostra = true;
				}
		   $v_prestito->mostraPrestito($utente, $prestito, $mostra);
            }
            else
                $v_prestito->Errore($utente, "L'id non corrisponde a nessuna prenotazione");
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
        $v_prestito = new v_prestito();
        $Utente = c_sessione::getUtenteDaSessione();
        
        if(get_class($Utente)!=e_bibliotecario::class) // se l'utente non e' un bibliotecario
            $v_prestito->Errore($Utente, 'Devi essere un bibiotecario per accedere a questa funzionalità');
        else 
            $v_prestito->mostraFormCarica($Utente); //mostra form               
    }
    
    
    
    /**
    
    * Mostra la form per la modifica di un libro. Reindirizza ad un messaggio di errore
    * se l'utente che accede alla risorsa non e' un bibliotecario.
    * @param int $id l'identificativo del libro.
    */
    
    private function mostraFormModifica($id)
    {
        $v_prestito = new v_prestito();
        $utente = c_sessione::getUtenteDaSessione();
        
           if(is_numeric($id)) // verifica che nell'url sia stato inserito un id
             {  
               $prestito = f_persistance::getInstance()->carica(e_prestito::class, $id); // carica il prestito dal db
            
                if($prestito) // se la prenotazione esiste
                  {
                      if(is_a($utente, e_bibliotecario::class))
                    
                           $v_prestito->mostraFormModifica($utente, $libro);
                    
                       else
                        
                           $v_prestito->Errore($utente, 'Non hai il permesso per modificare il prestito');
                        
                    }
            
                  else // altrimenti mostra una pagina d'errore. 
                         $v_libro->Errore($utente, 'ID non valido');  
        }
        else
            $v_libro->Errore($utente, 'La URL non e valida');
    }
    
    
    
    /**
    
    * Mostra la form per la rimozione di un testo. Reindirizza ad un messaggio di errore
    * se l'utente che accede alla risorsa non e' un bibliotecario.
    * @param int $id l'identificativo del libro.
    */
    
    private function mostraFormRimuovi ($id)
    {
        $v_prestito = new v_prestito();
        $utente = c_sessione::getUtenteDaSessione();
        if(is_numeric($id)) // verifica che nell'url sia stato inserito un id
        {
            $prestito= f_persistance::getInstance()->carica(e_prestito::class, $id); // carica il libro dal db
            if($prestito) // se il libro esiste
            { // verifica che l'utente puo' effettivamente rimuoverla
                if(is_a($utente, e_bibliotecario::class))
                    $v_prestito->mostraFormRimuovi($utente, $prestito); // mostra la pagina di rimozione
                    
                    else
                        $v_prestito->Errore($utente, 'NON puoi rimuovere questo libro');    
            }
            
            else
                // altrimenti mostra una pagina d'errore.
                $v_prestito->Errore($utente, "L'id non corrisponde a nessun libro.");   
        }
        else
            $v_prestito->Errore($utente, 'la URL non e valida.');   
    }
    
    
	
    private function aggiungiPrestito()
    {
        $v_prestito = new v_prestito(); // crea la view
        $utente = c_sessione::getUtenteDaSessione(); // ottiene l'utente della sessione
        
        if (get_class($utente) == e_bibliotecario::class)
        {
            $prestito = $v_prestito->creaPrestito(); // la view restituisce una e_libro costruita a partire dalla form
			f_persistance::getInstance()->salva($prestito);
			$v_libro->Avviso($utente, 'PRESTITO AGGIUNTO CON SUCCESSO');
		}
            else
            { 
                f_persistance::getInstance()->rimuovi(e_prestito::class, $prestito->getId());
                $v_prestito->Errore($utente, 'Errore');
                $v_prestito->mostraFormCarica($utente, false);
            }
        }
        else
            $v_prestito->Errore($utente, 'NON sei un bibliotecario, non puoi inserire un prestito');
    }
    
    
    
    /**
    * Mostra il form per la modifica di un libro. Reindirizza ad un messaggio di errore
    * se l'utente che accede alla risorsa non e' un bibliotecario.
    * @param int $id l'identificativo del libro.
    */
    
    private function modificaPrestito ($id)
    {
        $v_prestito = new v_prestito();
        $utente = c_sessione::getUtenteDaSessione();
        
        $nuovoPrestito = $v_prestito->creaPrestito(); // la view restituisce una e_libro costruito a partire dalla form
        $vecchioPrestito = f_persistance::getInstance()->carica(e_prestito::class, $id); // carica il vecchio libro dal db
        
        if($vecchioPrestito) // se il libro esiste
        {
            // verifica che l'utente puo' effettivamente modificarlo
            if(is_a($utente, e_bibliotecario::class))
            {
                if($v_prestito->validazioneModifica($nuovoPrestito)) // verifica che le modifiche siano corrette
                {
                    $nuovoPrestito->setId($vecchioPrestito->getId());
                    f_persistance::getInstance()->aggiorna($nuovoPrestito);
					header('Location: /BilioLibro/prestito/mostra/'.$nuovoPrestito->getId());   
                }
                
                else 
                    $v_prestito->mostraFormModifica($utente, $vecchioPrestito, false);        
            }
            
            else
                $v_prestito->Errore($utente, "Non hai l'autorizzaione per modificare il prestito.");        
        }
        
        else
            $v_prestito->Errore($utente, "L'id non corrisponde a nessun prestito.");
    }
    
    
    
    /**
    * Effettua la rimozione di un libro. Reindirizza ad un messaggio di errore
    * se l'utente che vuole rimuovere il brano non è il bibliotecario.
    * @param int $id l'identificativo del libro.
    */
    
    private function rimuoviPrestito ($id)
    {
        $v_prestito= new v_prestito();
        $utente = c_sessione::getUtenteDaSessione();
        $prestito = f_persistance::getInstance()->carica(e_prestito::class, $id); // carica il prestito dell'url
        
        if($prestito) // se il libro esiste
        {
            if(is_a($utente, e_bibliotecario::class)) // verifica che l'utente puo' effettivamente rimuoverlo
            {
                if($v_libro->validazioneRimuovi()) // se il bibliotecario ha deciso di rimuoverlo
                
                    f_persistance::getInstance()->rimuovi(e_prestito::class, $prestito->getId()); // rimuove il libro
                
                else // altrimenti si viene reindirizzati ad una pagina di errore
                    
                    header('Location: /BiblioLibro/prestito/mostra/'.$prestito->getId());
            }
            else
                $v_prestito->Errore($utente, "Non hai l'autorizzazione per rimuovere il prestito"); 
        }
        
        else
            $v_prestito->Errore($utente, "L'id non corrisponde a nessun prestito."); 
    }
}