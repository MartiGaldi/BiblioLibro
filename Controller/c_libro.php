<?php
require_once 'inc.php';

/**
* Il Controller c_libro implementa le funzionalità 'Gestione Libro'.
* Il bibliotecario può caricare, modificare e rimuovere un testo.
* @package Controller
*/

class c_libro
{ 
    /**
    * La funzione carica permette la visualizzazione della form per il caricamento di un testo,
    *  a seguito di una richiesta GET, o l'inserimento di un libro da parte del bibliotecario a seguito
    * di una richiesta POST.
    */
    
    static function carica()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET')
            c_libro::mostraFormCarica();
        
            else if ($_SERVER['REQUEST_METHOD'] == 'POST')
                c_libro::aggiungiLibro();
                
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
            
            c_libro::mostraFormModifica($id);
            
            else if ($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                if(is_numeric($id))
                    c_libro::modificaLibro($id);
                    
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
            c_libro::mostraFormRimuovi($id);
            
            else if ($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                if(is_numeric($id))
                    c_libro::rimuoviLibro($id);
                    
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
            $v_libro=new v_libro();
            $utente=c_sessione::getUtenteDaSessione();
            $libro=f_persistance::getIstance()->carica(e_libro::class, $id);
            if($libro)
            {
               $v_libro->mostraLibro($utente, $libro);
            }
            else
                $v_libro->Errore($utente, 'id del libro non corrisponde a nessun libro del sistema');
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
        $v_libro = new v_libro();
        $Utente = c_sessione::getUtenteDaSessione();
        
        if(get_class($Utente)!=e_bibliotecario::class) // se l'utente non e' un bibliotecario
            $v_libro->Errore($Utente, 'Devi essere un bibiotecario per accedere a questa funzionalità');
        else 
            $v_libro->mostraFormCarica($Utente); //mostra form               
    }
    
    
    
    /**
    
    * Mostra la form per la modifica di un libro. Reindirizza ad un messaggio di errore
    * se l'utente che accede alla risorsa non e' un bibliotecario.
    * @param int $id l'identificativo del libro.
    */
    
    private function mostraFormModifica($id)
    {
        $v_libro = new v_libro();
        $utente = c_sessione::getUtenteDaSessione();
        
           if(is_numeric($id)) // verifica che nell'url sia stato inserito un id
             {  
               $libro = f_persistance::getInstance()->carica(e_libro::class, $id); // carica il testo dal db
            
                if($libro) // se il libro esiste
                  {
                      if(is_a($utente, e_bibliotecario::class))
                    
                           $v_libro->mostraFormModifica($utente, $libro);
                    
                       else
                        
                           $v_libro->Errore($utente, 'Non hai il permesso per modificare il libro');
                        
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
        $v_libro = new v_libro();
        $utente = c_sessione::getUtenteDaSessione();
        if(is_numeric($id)) // verifica che nell'url sia stato inserito un id
        {
            $libro= f_persistance::getInstance()->carica(e_libro::class, $id); // carica il libro dal db
            if($libro) // se il libro esiste
            { // verifica che l'utente puo' effettivamente rimuoverla
                if(is_a($utente, e_bibliotecario::class))
                    $v_libro->mostraFormRimuovi($utente, $libro); // mostra la pagina di rimozione
                    
                    else
                        $v_libro->Errore($utente, 'NON puoi rimuovere questo libro');    
            }
            
            else
                // altrimenti mostra una pagina d'errore.
                $v_libro->Errore($utente, "L'id non corrisponde a nessun libro.");   
        }
        else
            $v_libro->Errore($utente, 'la URL non e valida.');   
    }
    
    
    
    /**
    * Metodo che consente l'associazione di una canzone all'utente che l'ha caricata. Se l'associazione va a buon
    * fine, la canzone viene salvata nel database.
    */
    
    private function aggiungiLibro()
    {
        $v_libro = new v_libro(); // crea la view
        $utente = c_sessione::getUtenteDaSessione(); // ottiene l'utente della sessione
        
        if (get_class($utente) == e_bibliotecario::class)
        {
            $libro = $v_libro->creaLibro(); // la view restituisce una e_libro costruita a partire dalla form
            
            if ($v_libro->caricamentoValido($libro)) // se l'oggetto e' valido  
               f_persistane::getInstance()->salva($libro);
                    
            else
            { 
                f_persistance::getInstance()->rimuovi(e_libro::class, $libro->getId());
                $v_libro->Errore($utente, 'Errore');
                $v_libro->mostraFormCarica($utente, false);
            }
        }
        
        else
            $v_libro->Errore($utente, 'NON sei un bibliotecario, non puoi modificare il libro!');
    }
    
    
    
    /**
    * Mostra il form per la modifica di un libro. Reindirizza ad un messaggio di errore
    * se l'utente che accede alla risorsa non e' un bibliotecario.
    * @param int $id l'identificativo del libro.
    */
    
    private function modificaLibro ($id)
    {
        $v_libro = new v_libro();
        $utente = c_sessione::getUtenteDaSessione();
        
        $nuovoLibro = $v_libro->creaLibro(); // la view restituisce una e_libro costruito a partire dalla form
        $vecchioLibro = f_persistance::getInstance()->carica(e_libro::class, $id); // carica il vecchio libro dal db
        
        if($vecchioLibro) // se il libro esiste
        {
            // verifica che l'utente puo' effettivamente modificarlo
            if(is_a($utente, e_bibliotecario::class))
            {
                if($v_libro->validaModifica($nuovoLibro)) // verifica che le modifiche siano corrette
                {
                    $nuovoLibro->setId($vecchioLibro->getId());
                    f_persistance::getInstance()->aggiorna($nuovoLibro);
                        
                        header('Location: /BilioLibro/libro/mostra/'.$nuovoLibro->getId());   
                }
                
                else 
                    $v_libro->mostraFormModifica($utente, $vecchioLibro, false);        
            }
            
            else
                $vLibro->Errore($utente, "Non hai l'autorizzaione di modificare il libro.");        
        }
        
        else
            $v_libro->Errore($utente, "L'id non corrisponde a nessun libro.");
    }
    
    
    
    /**
    * Effettua la rimozione di un libro. Reindirizza ad un messaggio di errore
    * se l'utente che vuole rimuovere il brano non è il bibliotecario.
    * @param int $id l'identificativo del libro.
    */
    
    private function rimuoviLibro ($id)
    {
        $v_libro= new v_libro();
        $utente = c_sessione::getUtenteDaSessione();
        $libro = f_persistance::getInstance()->carica(e_libro::class, $id); // carica il libro dell'url
        
        if($libro) // se il libro esiste
        {
            if(is_a($utente, e_bibliotecario::class)) // verifica che l'utente puo' effettivamente rimuoverla
            {
                if($v_libro->validaRimuovi()) // se il bibliotecario ha deciso di rimuoverla
                
                    f_persistance::getInstance()->rimuovi(e_libro::class, $libro->getId()); // rimuove il libro
                
                else // altrimenti si viene reindirizzati ad una pagina di errore
                    
                    header('Location: /BiblioLibro/libro/mostra/'.$libro->getId());
            }
            else
                $v_libro->Errore($utente, "Non hai l'autorizzazione per rimuovere il libro"); 
        }
        
        else
            $v_libro->Errore($utente, "L'id non corrisponde a nessun libro."); 
    }
}