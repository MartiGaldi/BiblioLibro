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
class v_prestito extends v_oggetto
{
    
    /**
    * Costruttore che inizializza il componente view e definisce l'array contenente gli errori
    * che possono essere commessi nella form di caricamento/modifica testi
    */
    
    function __construct()
    {
        parent::__construct();
        
       /* // l'array è istanziato con indici i campi delle varie form, i cui valori sono di default a false (no errori)
        $this->check = array(
            'titolo' => true,
			'genere' => true,
			'autore' => true,
            'num_copie' => true,
			'isbn' => true,
			'descrizione' => true,
			'durata' => true
        ); */
    }
    
    

    /**
    * Funzione che crea un testo a partire dagli input della form.
    * @return e_libro
    */
    
    function creaPrestito() : e_prestito
    {
        $prestito = new e_prestito();
		
		if(isset($_POST['utentePrestito']))
            $prestito->setUtentePrestito(ucfirst($_POST['utentePrestito']));
		
        if(isset($_POST['libroPrestito']))
            $prestito->setLibroPrestito(ucfirst($_POST['libroPrestito']));
		
		if(isset($_POST['dataScadenza']))
            $prestito->setDataScadenza(ucfirst($_POST['dataScadenza']));
                    
        if ( isset($_POST['utentePrestito']) && isset($_POST['libroPrestito']) && isset($_POST['dataScadenza']))
        {
            $prestito->setUtentePrestito(ucfirst($_POST['utentePrestito']));
			$prestito->setLibroPrestito(ucfirst($_POST['libroPrestito']));
			$prestito->setDataScadenza(ucfirst($_POST['dataScadenza']));
        }     
        return $prestito;
    }
    
    
    
    /**
    * Mostra la pagina che consente l'inserimento di un libro da parte di un bibliotecario
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
            
            $this->smarty->display('prestito/caricaPrestito.tpl');   
    }
    
    
    
    /**
    
    * Mostra la pagina che consente la modifica di un testo da parte di un bibliotecario
    * @param e_utente $utente l'utente della sessione
    * @param e_libro $libro il testo da modificare
    * @param bool $error facoltativo, da impostare a true se l'utente ha inserito un titolo di una libro
    * gia' inserito
    */
    
    function mostraFormModifica (e_utente &$utente, e_prestito &$prestito, bool $errore= NULL)
    {
        if (! $errore)
        { $errore = false;}
            
            $this->smarty->registerObject('utente', $utente);
            $this->smarty->assign('prestito', $prestito);
                    
            $this->smarty->assign('uTipo', lcfirst(substr(get_class($utente), 2)));
            $this->smarty->assign('errore', $errore);
			$this->smarty->assign('check', $this->check);
                     
            $this->smarty->display('prestito/modificaPrestito.tpl');      
    }
    
    
    
    /**
    * Mostra la pagina che consente la rimozione di un testo da parte di un bibliotecario
    * @param e_utente $utente: l'utente della sessione
    * @param e_libro $libro: il testo da rimuovere
    */
    
    function mostraFormRimuovi(e_utente &$utente, e_prestito &$prestito)
    {
        $this->smarty->registerObject('utente', $utente);
        $this->smarty->assign('prestito', $prestito);
        
        $this->smarty->assign('uTipo', lcfirst(substr(get_class($utente), 2)));
        $this->smarty->display('prestito/rimuoviPrestito.tpl');
        
    }
    
    
    
    
    /**
    * Mostra il contenuto di un libro.
    * @param e_utente $utente l'utente che sta visualizzando la pagina
    * @param e_libro $libro il libro da visualizzare
    */
    
    function mostraPrestito(e_utente &$utente, e_prestito &$prestito, bool $mostra)
    {
        $this->smarty->registerObject('utente', $utente);
        $this->smarty->assign('prestito', $prestito);

        $this->smarty->assign('uTipo', lcfirst(substr(get_class($utente), 2)));
		$this->smarty->assign('mostra', $mostra);
        $this->smarty->display('prestito/prestito.tpl');  
    }
    
    
    
    /**
    * Funzione che controlla i campi della form per l'inserimento di un libro
    * @return bool true se gli input sono corretti, false altrimenti
    */
    
    function validazioneCarica(e_prestito &$prestito) : bool
    {
        if($this->check['titolo']=$libro->validazioneTitolo() &&
		$this->check['genere']=$libro->validazioneGenere() &&
		$this->check['autore']=$libro->validazioneAutore() &&
		$this->check['num_copie']=$libro->validazioneNumCopie() &&
		$this->check['isbn']=$libro->validazioneIsbn() && 
		$this->check['durata']=$libro->validazioneDurata() &&
		$this->check['descrizione']=$libro->validazioneDescrizione())
		{   
			return true;
		}
        else
            return false;  
    }
    
    
    
    /**
    * Funzione che controlla i campi della form per la modifica di un testo
    * @return bool true se gli input sono corretti, false altrimenti
    */
    function validazioneModifica(e_libro &$libro) : bool
    {
        if( $this->check['titolo']=$libro->validazioneTitolo() &&
			$this->check['genere']=$libro->validazioneGenere() && 			
			$this->check['autore']=$libro->validazioneAutore() && 
			$this->check['num_copie']=$libro->validazioneNumCopie() && 
			$this->check['isbn']=$libro->validazioneIsbn() && 
			$this->check['durata']=$libro->validazioneDurata() && 
			$this->check['descrizione']=$libro->validazioneDescrizione() )
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
