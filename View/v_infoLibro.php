<?php

require_once 'inc.php';
include_once 'View/v_oggetto.php';

class v_infoLibro extends v_oggetto
{
    function __construct()
    {
        parent::__construct();
        
        $this->check = array(
            'isbn' => true,
            'descrizione' => true,
            'categoria' => true,
            'copertina' => true,
        );
    }
    
    /**
     * Funzione che permette la creazione delle info libro con i valori prelevati da una form
     * @return e_infoLibro ottenuta dai campi della form
     */
    
    function creaInfoLibro() : e_infoLibro
    {
        $infoLibro = new e_infoLibro();
        
        if(isset($_POST['isbn']))
            $infoLibro->setIsbn($_POST['isbn']);
            
            if(isset($_POST['descrizione']))
                $InfoLibro->setDescrizione($_POST['descrizione']);
                
                if(isset($_POST['categoria']))
                    $infoUtente->setCategoria($_POST['categoria']);
                    
                    if(isset($_POST['copertina']))
                        $infoLibro->setCopertina ($_POST['copertina']);
                                    
                                    return $infoLibro;
    }
    
    
    /**
     * Controlla se l'oggetto e_infoLibro sia valido
     * @param e_infoLibro $e_info di norma e' un oggetto ottenuto dal metodo creaInfoUtente()
     * @return true se l'oggetto e' valido, false altrimenti
     */
    
    function validazioneInfoLibro (e_infoLibro &$e_info) : bool
    {
        $e_info->validate($this->check['isbn'], $this->check['descrizione'], $this->check['categoria'], $this->check['copertina']);
        
        if($this->check['isbn'] && $this->check['descrizione'] && $this->check['categoria'] && $this->check['copertina'])
            return true;
        
            else
                return false;
    }
    
    
    
    /**
     * Mostra la form di modifica delle info libro
     * @param bool $error (facoltativo se presente un errore)
     */
    
    function mostraFormInfoLibro(e_libro &$libro, bool $errore = NULL)
    {
        if (! $errore)
            
            $errore = false;
            
            $infoLibro = $libro->getInfoLibro();
            
            
            $this->smarty->registerObject('libro', $liibro);
            
            $this->smarty->assign('info', $infoLibro);
            
            
            $this->smarty->assign('errore', $errore);
            
            $this->smarty->assign('check', $this->check);
            
            
            $this->smarty->display('catalogo/registrazioneInfoLibro.tpl');
    }
}

?>