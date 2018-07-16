<?php

//La classe c_cerca implementa la funzionalità di Ricerca all'interno del catalogo

class c_cerca

{
    //default
    const KEY_DEFAULT = 'Titolo';

    //avanzata
    const KEY_ADVANCED = 'Autore';
    const KEY_ADVANCED = 'Genere';
    const KEY_ADVANCED = 'Isbn';
    
    
    
   //Metodo implementa la ricerca di base che può essere effettuata da qualsiasi tipo di utente
    
    static function ricecaBase()
    
    {
        
        $v_ricerca = new v_ricerca();
        
        $utente = c_sessione::getUtenteDaSessione();
        
        
        $string = $v_cerca->getValoreRicerca();
        
        
        
        if($string)
        
        {   
            $oggetto = f_persistance::getInstance()->cerca(c_cerca::KEY_DEFAULT, $string);
            
            $v_cerca->mostraRisultato($utente, $oggetto, c_cerca::KEY_DEFAULT, $string);
            
        }
        
        else
            $v_cerca->Errore($user, 'La ricerca non ha prodotto risultati');
    }
    
    
    
 
    
    //Questo metodo implementa la ricerca avanzata che può essere effettuata solo dal cliente e dal bibliotecario
    
    static function avanzata()
    
    {
        
        $v_cerca = new v_cerca();
        
        $utente = c_sessione::getUserDaSessione();
        
        
        
        if (get_classe($utente) != e_visitatore::class)
        
        {   
            //stringa utente
            $string = $v_cerca->getValoreRicerca();
            
            
            
            if ($string)
            
            { // si ricavano chiave e valore di ricerca scelti dall'utente
                
                list($key)=$v_cerca->getKey();
                
                if(($key == c_cerca::KEY_DEFAULT || $key == c_cerca::KEY_ADVANCED)
                
                {   
                    $oggetti = f_peristance::getInstance()->cerca($key, $string);
                    
                    $v_cerca->mostraRisultato ($utente, $oggetti, $key, $string);
                    
                }
                
                else
                    $v_cerca-> Errore($utente, 'I valori inseriti non sono corretti');
                    
            }
            
            else
            
            {
                //se la stringa non e' stata inserita, l'utente si reindirizza alla pagina della ricerca avanzata
                $v_cerca->mostraRicercaAvanzata($utente);
                
            }
            
        }
        
        else
        // se l'utente e' un visitatore, si reindirizza ad una pagina di errore
            
            $v_cerca->Errore($utente, 'Devi essere registrato per accedere a questa funzionalità');
            
    }
    
}

