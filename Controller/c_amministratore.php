<?php
if(file_exists('config.inc.php'))
require_once 'config.inc.php';
require_once 'inc.php';
    
    /**La classe c_amministratore fornisce accesso all'amministratore per effettuare alcune operazioni basiche attraverso l'applicazione**/
    
    class c_amministratore
    {
	/**
    * Metodo che implementa il login. Se richiamato tramite GET, fornisce
    * la pagina di login, se richiamato tramite POST cerca di autenticare l'amministratore attraverso
    * i valori che quest'ultimo ha fornito
    */
	static function login()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'GET')
		{   
			$v_amministratore = new v_amministratore();
			$utente = c_sessione::getUtenteDaSessione();
                
            if(!c_sessione::trovaPrivilegiAmministratore())
                $v_amministratore-> mostraLogin();
			else     
				header('Location: /Bibliolibro/amministratore/pannello');        
        }
            
        else if ($_SERVER['REQUEST_METHOD'] == 'POST')
            c_amministratore::autenticazione();
                
        else 
            header('Location: HTTP/1.1 Invalid HTTP method detected');           
        }
        

        
        // Mostra il pannello di amministrazione.
        
        static function pannello()
        {
            if ($_SERVER['REQUEST_METHOD'] == 'GET')
            {
                $v_amministratore = new v_amministratore();
                $utente = c_sessione::getUtenteDaSessione();
                
                if(c_sessione::trovaPrivilegiAmministratore())
                    $v_amministratore->mostraPannello($utente);
                    
				else
                    $v_amministratore->Errore($utente, 'Non hai i privilegi da amministratore');         
            }
            else
                header('Location: HTTP/1.1 Invalid HTTP method detected');  
        }
        
        
        
    /**
    * Metodo che implementa la registrazione. Se richiamato a seguito di una richiesta
    * GET da parte dell'amministratore, mostra la form di compilazione; altrimenti se richiamato tramite POST
    * riceve i dati forniti dall'amministratore e procede con la creazione di un nuovo amministratore. 
    */
        
    static function iscrizione()
        {
         if ($_SERVER['REQUEST_METHOD'] == 'GET') 
            { 
                $v_amministratore = new v_amministratore();
                $utente = c_sessione::getUtenteDaSessione();
                                
                if (c_sessione::trovaPrivilegiAmministratore())
                    $v_amministratore->mostraIscrizione();  
            }
            else if ($_SERVER['REQUEST_METHOD'] == 'POST')
                c_amministratore::registra();
                
			else
				header('Location: Invalid HTTP method detected');    
        }
        
        
        
        //Logout dalla sessione di amministrazione.
        static function logout()
        {
            c_sessione::rimuoviPrivilegiAmministratore();
            
            header('Location: /BiblioLibro/');
        }
        
        
        
	/**
    * La funzione Autenticazione verifica che le credenziali di accesso inserite
    * siano corrette: in tal caso, l'applicazione lo riporterà verso la sua pagina, altrimenti
    * restituirà la schermata di login, con un messaggio di errore.
    */        
        private function autenticazione()
        {
            $v_amministratore = new v_amministratore();
            $utente = c_sessione::getUtenteDaSessione();
            
            list($amministratoreUtente, $passwordUtente) = $v_amministratore->getNickEPassword();
            global $admin, $pass;
            
            if($amministratoreUtente == $admin && $passwordUtente == $pass)
           { 
                c_sessione::setPrivilegiAmministratore();
                header('Location: /BiblioLibro/amministratore/pannello');   
            }
            else
                $v_amministratore->mostraLogin(true);      
        }
        
        
        /**
		* La funzione Registra permette di creare un nuovo utente se non sono presenti utenti con stesso nickname inseriti nella form
		*/
     
        public function registra()
        {
            $v_amministratore = new v_amministratore();
            $Utente = c_sessione::getUtenteDaSessione();
            $creaUtente = $v_amministratore->creaUtente1();
            if($v_amministratore->validazioneIscrizione($creaUtente))
            {
                if(!f_persistance::getInstance()->esiste(e_utente::class, f_target::ESISTE_NICK, $creaUtente->getNick())
                    && !f_persistance::getInstance()->esiste(e_utente::class, f_target::ESISTE_MAIL, $creaUtente->getMail()))   
                {
                    $creaUtente->hashPassword();
                    f_persistance::getInstance()->salva($creaUtente);
                    
                    header('Location: /BiblioLibro/amministratore/pannello/');   
                }
                else
                    $v_amministratore->mostraIscrizione(true);    
            }
            else
                $v_amministratore->mostraIscrizione();      
        }
    }