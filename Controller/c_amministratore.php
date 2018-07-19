<?php


if(file_exists('config.inc.php'))
    
    require_once 'config.inc.php';
    
    require_once 'inc.php';
    
    //La classe CAdmin fornisceaccesso all'amministratore per effettuare alcune operazioni basiche attraverso l'applicazione
    
    class c_amministratore
    
    {
        //Metodo che implementa il login.
        
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

                $utnte = c_sessione::getUtenteDaSessione();
                
                if(c_sessione::trovaPrivilegiAmminitratore())
                    
                    $v_amministratore->mostraPannello($utente);
                    
                    else
                        
                        $v_amministratore->Errore($utente, 'Non hai i privilegi da amministratore');         
            }
            
            else
                header('Location: HTTP/1.1 Invalid HTTP method detected');  
        }
        
        
        
       //Metodo che implementa la registrazione.
        
        static function Iscriviti()
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
            
            header('Location: /biblilibro/indice');
        }
        
        
        
        //La funzione verifica che le credenziali di accesso al pannello di amministrazione siano valide.
        
        private function autenticazione()
        
        {
            $v_amministratore = new v_amministratore();
            
            $utente = c_sessione::getUtenteDaSessione();
            
            list($amministratoreUtente, $passwordUtente) = $v_amministratore->getMailEPassword();
            
            global $amministratore, $pass;
            
            if($amministratoreUtente == $amministratore && $passwordUtente == $pass)
            
           { 
                c_sessione::setPrivilegiAmministratore();
                
                header('Location: /BiblioLibro/amministratore/pannello');   
            }
            else
                
                $v_amministratore->mostraLogin(true);      
        }
        
        
        // La funzione permette di creare un nuovo utente
     
        private function registra()
        {
            $v_amministratore = new v_amministratore();
            
            $Utente = c_sessione::getUtenteDaSessione();
            
            $creaUtente = $v_amministratore->creaUtente();
            
            if($v_amministratore->validazioneIscrizione($creaUtente))
            
            {
                
                if(!f_persistance::getInstance()->esiste(e_utente::class, f_target::NICKNAME_ESISTENTE, $creaUtente->getNickName())
                    && !f_persistance::getInstance()->esiste(e_utente::class, f_target::MAIL_ESISTENTE, $creaUtente->getMail()))
                    
                {
                    
                    $creaUtente->hashPassword();
                    f_persistance::getInstance()->salva($creaUtente);
                    
                    $creaUtente->setInfoUtente();
                    
                    header('Location: /BiblioLibro/avanzato/pannello/');   
                }
                
                else
                    $v_amministratore->mostraIscrizione(true);    
            }
            
            else
                $v_amministratore->mostraIscrizione();      
        }
        
    }