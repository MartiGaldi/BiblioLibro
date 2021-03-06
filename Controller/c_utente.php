<?php
require_once 'inc.php';
	/**
		* La classe c_utente implementa la funzionalit� 'Gestione Utenti'. I vari metodi permettono
		* la creazione, autenticazione e visualizzazione di un profilo di un utente.
		* @author gruppo 11
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
            
            if(get_class($utente)!=e_visitatore::class) // se l'utente non � guest, non puo accedere al login
                $v_utente->Errore($utente, 'Sei gi� connesso.');
            
            else
                $v_utente->mostraLogin();  
        }
        elseif ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
            c_utente::autenticazione();
		}  
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
			
            if (get_class($utente)!=e_visitatore::class) // se l'utente non � guest, non puo accedere al login
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
     * @param $id id dell'utente. Se non specificato, si viene reindirizzati ad una pagina di errore.
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
							$array = (f_persistance::getInstance()->carica(e_prenotazione::class, $profiloUtente->getId(), f_target::CARICA_PRENOTAZIONI));
                            $content = 'Prenotazione';
							
							$array2 = (f_persistance::getInstance()->carica(e_prestito::class, $profiloUtente->getId(), f_target::CARICA_PRESTITI));
							$content = 'Prestito';
							
							$array3 = (f_persistance::getInstance()->carica(e_storico::class, $profiloUtente->getId(), f_target::CARICA_STORICI));
							$content = 'Storico';
							
						  
                        $v_utente->mostraProfilo($profiloUtente, $Utente, $content, $array, $array2, $array3); // mostra il profilo   
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
     * Logout dell'utente
     */
    static function logout()
    {
        c_sessione::terminaSessione();
        
        header('Location: /BiblioLibro');
    }
    
    
    
    /**
     * La funzione rimuovi permette la visualizzazione della form per la rimozione di un utente,
     * a seguito di una richiesta GET, o la conferma dell'operazione da parte di un utente a seguito
     * di una richiesta POST.
     * @param int $id l'identificativo dell'utente, prelevato dall'URL.
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
     * siano corrette: in tal caso, l'applicazione lo riporter� verso la sua pagina, altrimenti
     * restituir� la schermata di login, con un messaggio di errore.
     */
    
    private function autenticazione()
    {
        $v_utente = new v_utente();
        $Utente = $v_utente->creaUtente();
        if($v_utente->validazioneLogin($Utente))
        {
            $autenticato = false; // bool per l'autenticazione
            // si verifica che l'utente inserito matchi una entry nel db
            $idUtente = f_persistance::getInstance()->esiste(e_utente::class, f_target::ESISTE_NICK, $Utente->getNick()); 
            if($idUtente) // se e' stato prelevato un id...
            {
                $Utente->setId($idUtente); // viene assegnato all'utente l'id utente
                
                if($Utente->checkPassword()) // se la password e' corretta
                {
                    unset($Utente); // l'istanza utilizzata per il login viene rimossa
                    $utente = f_persistance::getInstance()->carica(e_utente::class, $idUtente); // viene caricato l'utente
                    $autenticato = true; // l'utente e' autenticato
                    c_sessione::inizioSessione($utente);
                    header('Location: /BiblioLibro/');   
                } 
            }
            if(!$autenticato)
                $v_utente->mostraLogin(true);
        }
        else
            $v_utente->mostraLogin();      
    }
    
    
    /**
     * La funzione Registra permette di creare un nuovo utente se non sono presenti utenti con stesso nickname inseriti nella form
     */
    function registra()
    {
        $v_utente = new v_utente();
        $Utente = $v_utente->creaUtente(); // viene creato un utente con i parametri della form
        if($v_utente->validazioneIscrizione($Utente))
        {
            if(!f_persistance::getInstance()->esiste(e_utente::class, f_target::ESISTE_NICK, $Utente->getNick()) && !f_persistance::getInstance()->esiste(e_utente::class, f_target::ESISTE_MAIL, $Utente->getMail()))
            {
                // se la mail e il nickname non sono stati ancora usati, si puo salvare l'utente
                $Utente->hashPassword(); // si cripta la password
                f_persistance::getInstance()->salva($Utente);
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
     * specificato SOLO dall'utente della sessione.
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
                $v_utente->Errore($utente, 'Non si pu� rimuovere un  visitatore');       
        }
    }
    
    
    
    /**
     * Rimuove un utente dall'applicazione
     * @param int $id l'identificativo dell'utente da rimuovere, specificato SOLO se l'utente
     * che sta effettuando l'operazione di rimozione sia l'utente della sessione
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
                    header('Location: /BiblioLibro/');
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
                header('Location: /BiblioLibro/');
            }
            else
                $v_utente->Errore($utente, 'Non puoi eliminare un visitatore'); 
        }  
    } 
	
	 /**
      *  la funzione mostra permette la visualizzazione degli utenti da parte del bibliotecario
      */
    static function mostra($id)
    {
        if(is_numeric($id))
        {
            $v_utente = new v_utente();
            $utente=c_sessione::getUtenteDaSessione();
            $Utente=f_persistance::getInstance()->carica(e_utente::class, $id);
            if($Utente)
            {
			if(is_a($utente, e_bibliotecario::class))
			{
				$content = "Utente";
				$v_utente->mostraProfilo($Utente, $utente, $content);
            }
			else 
				$v_utente->Errore($utente, "Non puoi accedere a questa funzionalita'");
			}
            else
                $v_utente->Errore($utente, 'id non corrisponde a nessun utente');
        }
        else
            header('Location: HTTP/1.1 405 Invalid URL detected');
    }
}
