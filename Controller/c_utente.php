<?php
require_once 'inc.php';

/**
* La classe c_utente implementa la funzionalità 'Gestione Utenti'. I vari metodi permettono
* la creazione, autenticazione e visualizzazione di un profilo di un utente.
* @package Controller
*/

class c_utente
{  
    /**
    * Metodo che implementa il login. Se richiamato tramite GET, fornisce
    * la pagina di login, se richiamato tramite POST cerca di autenticare l'utente attraverso
    * i valori che quest'ultimo ha fornito
    */
    
    static function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') // se il metodo e' get...
        { 
			//carica la pagina del login, se l'utente e' effettivamente un guest
            $v_utente = new v_utente();
            $utente = c_sessione::getUtenteDaSessione();
            
            if(get_class($utente)!=e_visitatore::class) // se l'utente non è guest, non puo accedere al login
            {
                $v_utente->Errore($utente, 'Sei già connesso.');
            }
            else
                $v_utente->mostraLogin();  
        }
        else if ($_SERVER['REQUEST_METHOD'] == 'POST')
            c_utente::autenticazione();
            
            else
                header('Location: HTTP/1.1 Invalid HTTP method detected');
                
    }
    
    
    
    /**
    * Metodo che implementa la registrazione. Se richiamato a seguito di una richiesta
    * GET da parte del cliente, mostra la form di compilazione; altrimenti se richiamato tramite POST
    * riceve i dati forniti dall'utente e procede con la creazione di un nuovo utente. 
    */
    
    static function iscrizione()
    { 
        if ($_SERVER['REQUEST_METHOD'] == 'GET') //se il metodo http utilizzato e' GET...
        { 
		//visualizza la pagina Registra, controllando che l'utente sia effettivamente un guest
            $v_utente = new v_utente();
            $utente = c_sessione::getUtenteDaSessione();
            
            if (get_class($utente)!=e_visitatore::class) // se l'utente non è guest, non puo accedere al login
                $v_utente->Errore($utente, 'Sei gia connesso.');
                
                else
                    $v_utente->mostraIscrizione();         
        }
        elseif ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			c_utente::registra();
		}
        
            else
                header('Location: Invalid HTTP method detected');  
    }
    
    
    
    /**
    * La funzione mostra il profilo di un utente. A seconda del tipo di URL, saranno visualizzati contenuti differenti.
    * In particolare:
    *  - /BiblioLibro/utente/profilo/id mostra la pagina base;
    *  - /BiblioLibro/utente/profilo/id&libro mostra la lista dei libri presi in prestito dall'utente
    * @param $string l'argomento della url. Se non specificato, si viene reindirizzati ad una pagina di errore.
    */
    static function profilo ($id, $content = null)
    {
        $v_utente = new v_utente();
        $Utente = c_sessione::getUtenteDaSessione();
        
        if($_SERVER['REQUEST_METHOD']=='GET')
        {
            if ($id) // se l'url ha almeno l'id si procede
            {
                if (is_numeric($id)) // se effettivamente la variabile id corrisponde ad un numero
                {
                    // si effettua il caricamento dell'utente
                    $profiloUtente = f_persistance::getInstance()->carica(e_utente::class, $id);
                    
                    if ($profiloUtente) // se l'utente esiste...
                    {   
						/*$prenota = false;
						$prestito = new e_prestito();
						$prestito->setPrestito($Utente);
						if($prestito->valido())
						{
							$prestito = $prestito->exists();
						}
						
						$prestito = false;
						$storico = false;*/
						
                        $array = NULL; // array contenente i dati dell'utente da visualizzare
						
                        if ($content == 'prestito')  // se il parametro e' un libro preso in prestito
                        { 
							// si carica la lista dei libri presi in prestito dall'utente (in corso)
                            $array = f_peristance::getInstance()->carica(e_prestito::class, $profiloUtente->getId(), f_target::CARICA_PRESTITO);
                            $content = 'Prestito';
                        }
						
						elseif ($content == 'storico')
						{
							$array = f_peristance::getInstance()->carica(e_storico::class, $profiloUtente->getId(), f_target::CARICA_STORICO);
                            $content = 'Storico';
						}
						
						elseif ($content == 'prenota')
						{
							$array = f_peristance::getInstance()->carica(e_prenota::class, $profiloUtente->getId(), f_target::CARICA_PRENOTA);
                            $content = 'Prenota';
						}
						
                        else // se il contenuto non e' specificato (e' stato inserito solo l'id) si visualizza la pagina base
                                $content = 'None';   
                        
                               
                        $v_utente->mostraProfilo($profiloUtente, $Utente, $content, $array); // mostra il profilo   
                    }
                    else 
                        $v_utente->Errore($Utente, "L'id non corrisponde a nessun utente");
                }
                else
                    $v_utente->Errore($Utente, "L'URL non e' valido");  
            }
            else
                $v_utente->Errore($Utente, "L'URL non e valido!");    
        }
        else 
            $v_utente->Errore($Utente, "L'URL ha pochi argomenti");   
    }
    
    
    
    /**
    * La funzione esci effettua il logout.
    */
    static function logout()
    {
        c_sessione::terminaSessione();
        
        header('Location: /BiblioLibro/home');
    }
    
    
    
    /**
    * La funzione rimuovi permette la visualizzazione della form per la rimozione di un utente,
    * a seguito di una richiesta GET, o la conferma dell'operazione da parte di un utente a seguito
    * di una richiesta POST.
    * @param int $id l'identificativo del libro, prelevato dall'URL.
    */
    static function rimuovi($id = null)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET')
        { 
            c_utente::mostraFormRimuovi($id);
        }
        else if ($_SERVER['REQUEST_METHOD'] == 'POST')
        { 
            c_utente::rimuoviUtente($id); 
        }
        else
            header('Location: HTTP/1.1 405 Invalid HTTP method detected');
    }
    
    
    
    /**
    * La funzione Autenticazione verifica che le credenziali di accesso inserite da un utente
    * siano corrette: in tal caso, l'applicazione lo riporterà verso la sua pagina, altrimenti
    * restituirà la schermata di login, con un messaggio di errore.
    */
    
    private function autenticazione()
    {
        $v_utente = new v_utente();
        $Utente = $v_utente->creaUtente();
        
        if($v_utente->validazioneLogin($Utente))
        {
            $autenticato = false; // bool per l'autenticazione
            // si verifica che l'utente inserito matchi una entry nel db
            $idUtente = f_persistance::getInstance()->esiste(e_utente::class, f_target::NICKNAME_ESISTENTE, $Utente->getNick()); 
            
            if($idUtente) // se e' stato prelevato un id...
            {
                $Utente->setId($idUtente); // viene assegnato all'utente l'id utente
                
                if($Utente->validazionePassword()) // se la password e' corretta
                {
                    unset($Utente); // l'istanza utilizzata per il login viene rimossa
                    $utente = f_persistance::getInstance()->carica(e_utente::class, $idUtente); // viene caricato l'utente
                    $autenticato = true; // l'utente e' autenticato
                    c_sessione::inizioSessione($utente);
                    header('Location: /BiblioLibro/index');   
                } 
            }
            if(!$autenticato)
                $v_utente->mostraLogin(true);
        }
        else
            $v_utente->mostraLogin();      
    }
    
    
    
    /**
    * La funzione Registra permette di creare un nuovo utente se non sono presenti utenti con stessa mail e nickname inseriti nella form
    */
    function registra()
    {
        $v_utente = new v_utente();
        $Utente = $v_utente->creaUtente(); // viene creato un utente con i parametri della form
        if($v_utente->validazioneIscrizione($Utente))
        {
            if(!f_persistance::getInstance()->esiste(e_utente::class, f_target::NICKNAME_ESISTENTE, $Utente->getNick()) && !f_persistance::getInstance()->esiste(e_utente::class, f_target::MAIL_ESISTENTE, $Utente->getMail()))
            {
                // se la mail e il nickname non sono stati ancora usati, si puo salvare l'utente
                $Utente->hashPassword(); // si cripta la password
                f_persistance::getInstance()->salva($Utente); // si salva l'utente
				c_sessione::inizioSessione($Utente);
				
                header('Location: /BiblioLibro');
            }
            else
                $v_utente->mostraIscrizione(true);
        }
        else
            $v_utente->mostraIscrizione();
    }
    
    
    
    /**
    * Mostra la form per la rimozione di un utente. Reindirizza ad un messaggio di errore
    * se l'utente che accede alla risorsa non e' un utente registrato.
    * @param int $id l'identificativo dell'utente da rimuovere. Tale identificativo puo' essere
    * specificato SOLO da un bibliotecario.
    */
    
    private function mostraFormRimuovi($id = null)
    { 
        $v_utente = new v_utente();
        $utente = c_sessione::getUtenteDaSessione();
        
        if(is_numeric($id)) // verifica che nell'url sia stato inserito un id
        { // verifica che l'utente che ha richiesto l'url sia un bibliotecario
            if(is_a($utente, e_bibiotecario::class))
            {
                $rimuoviUtente = f_persistance::getInstance()->carica(e_utente::class, $id); // ricava l'utente da rimuovere
                if($rimuoviUtente)
                    $v_utente->mostraFormRimuovi($utente, $rimuoviUtente);
                else
                    $v_utente->Errore($utente, "L'id non corrisponde a nessun utente");
            }
            else
                $v_utente->Errore($utente, 'Non puoi eliminare altri utenti'); 
        }
        else
        {
            if(get_class($utente)!=e_visitatore::class)
                $v_utente->mostraFormRimuovi($utente);
            else
                $v_utente->Errore($utente, 'Non si può rimuovere un  visitatore');       
        }
    }
    
    
    
    /**
    * Rimuove un utente dall'applicazione
    * @param int $id l'identificativo dell'utente da rimuovere, specificato SOLO se l'utente
    * che sta effettuando l'operazione di rimozione sia un bibliotecario
    */
    
    private function rimuoviUtente($id = null)
    {
        $v_utente= new v_utente();
        $utente = c_sessione::getUtenteDaSessione();
        
        if(is_numeric($id)) // verifica che nell'url sia stato inserito un id
        { // verifica che l'utente che ha richiesto l'url sia un bibliotecario
            if(is_a($utente, e_bibliotecario::class))
            { 
				// ricava l'id del profilo da rimuovere
                $rimuoviUtente = f_persistance::getInstance()->carica(e_utente::class, $id); // ricava l'utente da rimuovere
                if($rimuoviUtente)
                {
                    f_persistance::getInstance()->rimuovi(e_utente::class, $rimuoviUtente->getId());
                    header('Location: /BiblioLibro/indice');
                }
                else
                    $v_utente->Errore($utente, "L'id non corrisponde a nessun utente"); 
            }
            else
                $v_utente->Errore($utente, 'Non puoi eliminare altri utenti');     
        }
        else
        { // altrimenti e' l'utente della sessione che chiede di essere rimosso
            if(get_class($utente)!=e_visitatore::class)
            {
                f_persistance::getInstance()->rimuovi(e_utente::class, $utente->getId());
                c_sessione::terminaSessione(); // viene rimossa la sessione
                header('Location: /BiblioLibro/index');
            }
            else
                $v_utente->Errore($utente, 'Non puoi eliminare un visitatore');
                
        }  
    } 
}
