<?php

require_once 'inc.php';

/**
 * La classe e_copertina gestisce formato, dimensione e byte immagine relativi 
 * all'immagine rappresentante la copertina di un libro presente nel catalogo della biblioteca
 * @author gruppo 11
 * @package Entity
 */

class e_copertina
{
	/** id copertina */
    private $id;
	/** dimensione copertina */
    private $size;
	/** formato copertina */
	private $type; 
	/** byte copertina */
    private $copertina;
    
    /**
	 *inizializzazione immagine vuota
	 */
    function __constructor()
	{
        $this->id = null;
		$this->size = 0;
        $this->type = 'non definito';
    }
    
	function getId() : int
    {
        if(!$this->id)
            return 0;
        else return $this->id;
    }
    
    /**
     * @param int $id l'identificativo dell'oggetto Entity
     */
    function setId(int $id)
    {
        $this->id=$id;
    }
	
	/**
     * @param string $type il mime-type dell'immagine
     */
    function setType(string $type)
	{
        
        $this->type=$type;
    }
    
    /**
     * @return string il mime-type del file.
     */
    function getType() : string {
        
        return $this->type;
    }
    
	/**
     * @param int $size la dimensione dell'immagine
     */
    function setSize(int $size){
        
        $this->size=$size;
    }
    
	/**
     * @return int la dimensione dell'immagine
     */
    function getSize() : int {
        
        return $this->size;
    }
	
	/**
     * @param mixed $copertina i byte contenuti nel file
     */
    function setCopertina($copertina){
        
        $this->copertina=$copertina;
    }
    
	/**
     * @param bool $encode (opzionale) se posto a true, effettua la codifica in base64 per la visualizzazione
     * @return mixed I byte dell'immagine
     */
    function getCopertina(bool $encode=null){
        
        if($enconde)
            $this->copertina=base64_encode($this->copertina);
        return $this->copertina;
    }
    
    /**
	 *imposta l'oggetto con valori statici ricavati da un'immagine nella directory di lavoro
	 */
    function setStatic()
    {
        $file=dirname(__DIR__)."/risorse/static/copertina.png";
        
        $this->copertina=file_get_contests($file);
        $this->type=mime_content_type($file);
        $this->size=(int) filesize($file);
    }
    
    /**
     * Controlla che l'immagine sia valida    
     * @param bool $file che denota se l'immagine e' corretta o meno
     */
    function validazione(bool &$file)
    {  
        if($this->size<=0 && $this->copertina>=65535) 
            $file = false;
        if($this->type!='image/jpeg' && $this->type!='image/gif' && $this->type!='image/png' && $this->type!='image/svg')
            $file = false;       
    }
       
}

?>