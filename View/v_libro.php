<?php
require_once 'inc.php';
include_once 'View/v_oggetto.php';


/**
* La classe v_libro si occupa dell'input-output per quanto riguarda i dati riguardanti i libri.
*  Ovvero:
* - dai dati inseriti dal bibliotecario costruiscono un oggetto e_libro
* - predispone e visualizza le varie pagine HTML per la creazione/modifica/rimozione/visualizzazione di un testo.
* @package View
*/
class v_libro extends v_oggetto
{
    
    /**
    * Costruttore che inizializza il componente view e definisce l'array contenente gli errori
    * che possono essere commessi nella form di caricamento/modifica testi
    */
    
    function __construct()
    {
        parent::__construct();
        
        // l'array è istanziato con indici i campi delle varie form, i cui valori sono di default a false (no errori)
        $this->check = array(
            'autore' => true,
            'titolo' => true,
            'num_copie' => true,
            'durata' => true,
            'genere' => true,
        ); 
    }
    
    

    /**
    * Funzione che crea un testo a partire dagli input della form.
    * @return e_libro
    */
    
    function creaLibro() : e_libro
    {
        $libro = new e_libro();
        if (isset($_POST['autore']) && isset($_POST['titolo']) && isset($_POST['num_copie']) && isset($_POST['durata'])&& isset($_POST['genere']))
        {
            // impostazione di autore,titolo,numero copie, durata e genere
            $libro->setAutore(ucfirst($_POST['autore']));
            $libro->setTitolo(ucfirst($_POST['titolo']));
            $libro->setNumCopie(ucfirst($_POST['num_copie']));
            $libro->setDurata(ucfirst($_POST['durata']));
            $libro->setGenere(ucfirst($_POST['genere']));                
        }        
        return $libro;
        
    }
    
    
    
    /**
    * Mostra la pagina che consente l'inserimento di un libro da parte di un bibliootecario
    * @param e_utente $utente l'utente della sessione
    * @param bool $errore facoltativo, da impostare a true se il biblitecario ha inserito
    * un titolo di un testo gia' inserita da lui
    */
    
    function mostraFormCarica (e_utente &$utente, bool $errore = NULL)
    {
        if (! $errore) 
           $errore = false;
            
            $this->smarty->registerObject('utente', $utente);
            $this->smarty->assign('uTipo', lcfirst(substr(get_class($utente), 2)));
            
            $this->smarty->assign('errore', $errore);
            $this->smarty->assign('check', $this->check);
            
            $this->smarty->display('libro/caricaLibro.tpl');   
    }
    
    
    
    /**
    
    * Mostra la pagina che consente la modifica di un testo da parte di un bibliotecario
    * @param e_utente $utente l'utente della sessione
    * @param e_libro $libro il testo da modificare
    * @param bool $error facoltativo, da impostare a true se l'utente ha inserito un titolo di una libro
    * gia' inserito
    */
    
    function mostraFormModifica (e_utente &$utente, e_libro &$libro, bool $errore= NULL)
    {
        if (! $errore)
        { $errore = false;}
            
            $this->smarty->registerObject('utente', $utente);
            $this->smarty->assign('libro', $libro);
                    
            $this->smarty->assign('uTipo', lcfirst(substr(get_class($utente), 2)));
            $this->smarty->assign('errore', $errore);  
                     
            $this->smarty->display('libro/modificaLibro.tpl');      
    }
    
    
    
    /**
    * Mostra la pagina che consente la rimozione di un testo da parte di un bibliotecario
    * @param e_utente $utente: l'utente della sessione
    * @param e_libro $libro: il testo da rimuovere
    */
    
    function mostraFormRimuovi(e_utente &$utente, e_libro &$libro)
    {
        $this->smarty->registerObject('utente', $utente);
        $this->smarty->assign('libro', $libro);
        
        $this->smarty->assign('uTipo', lcfirst(substr(get_class($utente), 2)));
        $this->smarty->display('libro/rimuoviLibro.tpl');
        
    }
    
    
    
    
    /**
    * Mostra il contenuto di un libro.
    * @param e_utente $utente l'utente che sta visualizzando la pagina
    * @param e_libro $libro il libro da visualizzare
    */
    
    function mostraLibro(e_utente &$utente, e_libro &$libro)
    {
        $this->smarty->registerObject('utente', $utente);
        $this->smarty->assign('libro', $libro);

        $this->smarty->assign('uTipo', lcfirst(substr(get_class($utente), 2)));
        
        $this->smarty->display('libro/libro.tpl');  
    }
    
    
    
    /**
    * Funzione che controlla i campi della form per l'inserimento di un libro
    * @return bool true se gli input sono corretti, false altrimenti
    */
    
    function validazioneCarica(e_libro &$libro) : bool
    {
        if($this->check['autore']=$libro->validazioneAutore() && $this->check['titolo']=$libro->validazioneTitolo() && $this->check['num_copie']=$libro->validazioneNumCopie() && $this->check['durata']=$libro->validazioneDurata() && this->check['genere']=$libro->validazioneGenere())
            return true;
        else
            return false;  
    }
    
    
    
    /**
    * Funzione che controlla i campi della form per la modifica di un testo
    * @return bool true se gli input sono corretti, false altrimenti
    */
    function validazioneModifica(e_libro &$libro) : bool
    {
        if($this->check['autore']=$libro->validazioneAutore() && $this->check['titolo']=$libro->validazioneTitolo() && $this->check['num_copie']=$libro->validazioneNumCopie() && $this->check['durata']=$libro->validazioneDurata() && this->check['genere']=$libro->validazioneGenere())
            return true;
        
        else 
            return false;      
    }
    
    
    
    /**
    * Funzione che verifica se l'utente ha effettivamente richiesto la rimozione di una canzone
    * @return bool true se l'utente vuole rimuovere il brano, false altrimenti
    */
    function validazioneRimuovi() : bool
    {
        if(isset($_POST['action']))
        {
            if($_POST['action']=='si')
                return true;
            else
                return false;       
        }
        else
            return false;   
    }
}
