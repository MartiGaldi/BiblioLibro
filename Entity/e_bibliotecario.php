<?php

include_once 'Entity/e_utente.php';

/**
 * La classe e_bibliotecario estende la classe e_utente e implementa la tipologia di utenti Bibliotecario.
 * @author gruppo11
 * @package Entity
 */

class e_bibliotecario extends e_utente {
    
    /** le informazioni riguardanti i libri */
    private $infoLibro;
    
    function __construct()
    {
       parent::__construct(); 
    }
    
    /**
    * Restituisce le informazioni sui libri
    * @return e_Infolibro | NULL
    */
    
    function getInfoLibro()
    {
        $this->infoLibro = f_persistance::getInstance()->load(e_infoLibro::class, $this->id);
        return $this->infoLibro;  
    }
    
    
    
    /**
    * Imposta le informazioni sui libri
    * @param e_infoLibro $infoLibro
    */
    
    function setInfoLibro (e_infoLibro $infoLibro = null)
    {
        if(!$infoLibro)
            $infoLibro = new e_infoLibro();
            $infoLibro->setIsbn($this->isbn);            
            
            if(!f_persistance::getInstance()->carica(e_infoLibro::class, $this->isbn))
            {
                f_persistance::getInstance()->salva($infoLibro);
            }
            
            else
            {
                f_persistance::getInstance()->aggiorna($infoLibro); 
            }
            
            $this->infoLibro = $infoLibro;   
    }
}
?>