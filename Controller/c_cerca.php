<?php

//La classe c_cerca implementa la funzionalità di Ricerca all'interno del catalogo

class c_cerca

{
    //chiave di default
    const KEY_DEFAULT = 'Libro';
    //valore base: ricerca per titolo
    const VALUE_DEFAULT = 'Titolo';
    
    //chiave avanzata
    const KEY_ADVANCED = 'Libro';
    //valore avanzato: ricerca per autore
    const VALUE_ADVANCED = 'Autore';
   /** //chiave avanzata
    const KEY_ADVANCED = 'Libro';
    //valore avanzato: ricerca per genere
    const VALUE_ADVANCED = 'Genere';*/
    
    
    
   //Metodo implementa la ricerca di base che può essere effettuata da qualsiasi tipo di utente
    
    static function ricecaBase()
    
    {
        
        $v_cerca = new v_cerca();
        
        $utente = c_sessione::getUtenteDaSessione();
        
        
        $string = $v_cerca->getValoreRicerca();
        
        
        
        if($string)
        
        {   
            $oggetto = f_persistance::getInstance()->cerca(c_cerca::KEY_DEFAULT, c_cerca::VALUE_DEFAULT, $string);
            
            $v_cerca->mostraRisultatoRicerca($utente, $oggetto, c_cerca::KEY_DEFAULT, c_cerca::VALUE_DEFAULT, $string);
            
        }
        
        else
            header('Location:/BiblioLibro/indice');
    }
    
    
    
 
    
    //Questo metodo implementa la ricerca avanzata che può essere effettuata solo dal cliente e dal bibliotecario
    
    static function avanzata()
    
    {
        
        $v_cerca = new v_cerca();
        
        $utente = c_sessione::getUtenteDaSessione();
        
        
        
        if (get_class($utente) != e_visitatore::class)
        
        {   
            //stringa utente
            $string = $v_cerca->getValoreRicerca();
            
            
            
            if ($string)
            
            { // si ricavano chiave e valore di ricerca scelti dall'utente
                
                list($key, $value)=$v_cerca->getKeyAndValue();
                
                if(($key == c_cerca::KEY_DEFAULT || $key == c_cerca::KEY_ADVANCED) && ($value == c_cerca::VALUE_DEFAULT || $value == c_cerca::VALUE_ADVANCED))
                
                {   
                    $oggetto = f_peristance::getInstance()->cerca($key, $value, $string);
                    
                    $v_cerca->mostraRisultatoRicerca($utente, $oggetto, $key, $value, $string);
                    
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

