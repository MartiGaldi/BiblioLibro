<?php 

require_once'inc.php';

/**
 * La classe e_libro caratterizza i testi presenti nel catalogo della biblioteca.
 * Contiene le informazioni principali riguardanti quest'ultimi quali titolo, autore, genere e numero di copie presenti.
 * Ogni libro può essere preso un prestito per un periodo limitato(disponibile) che può corrispondere
 * a consultazione, periodo breve o periodo lungo
 * @author gruppo 11
 * @package Entity
 */

class e_libro
 {
    private $id;
    private $autore;
    private $titolo;
    private $num_copie;
    private $durata;
    private $genere;
    private $info_libro;
	private $isbn;
	private $descrizione;
	private $copertina;

    function __constructor(){}
    
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
	
    function setAutore(string $autore){
        $this->autore=$autore;
    }
    
    function getAutore() : string {
        return $this->autore;
    }
    
    function setTitolo(string $titolo){
        $this->titolo=$titolo;
    }
    
    function getTitolo() : string {
        return $this->titolo;
    }
    
    function setNumCopie(int $num_copie){
        $this->num_copie=$num_copie;
    }
    
    function getNumCopie() : int {
        return $this->num_copie;
    }
    
    function setDurata(string $durata){
        $this->durata=$durata;
    }
    
    function getDurata() : string {
        return $this->durata;
    }
    
    function setGenere(string $genere){
        $this->genere=$genere;
    }
    
    function getGenere() : string {
        return $this->genere;
    }
	
	function setIsbn(string $isbn)
    {
        $this->isbn=$isbn;
    }
    
    function getIsbn() : string
    {
        return $this->isbn;
    }
	
    function setDescrizione(string $descrizione)
    {
        $this->descrizione=$descrizione;
    }
    
    function getDescrizione()
    {
        return $this->descrizione;
    }
    
    /*function setCopertina(e_copertina $copertina = null)
    {
		if(!$copertina){
			$copertina=new e_copertina();
			$copertina->setStatic();
		}
        $copertina->setId($this->id);
		
		if(!f_persistance::getIstance()->carica(e_copertina::class, $this->id)
		{
			f_persistance::getIstance()->salva($copertina);
		}
		else
			f_persistance::getIstance()->aggiorna($copertina);
		
		$this->copertina=$copertina;
    }*/
	
	function setCopertina(e_copertina $copertina)
	{
		$this->copertina=$copertina;
	}
    
    function getCopertina()
    {
		$this->copertina = f_persistance::getIstance()->carica(e_copertina::class, $this->id);
        return $this->copertina;
    }
    
    /**
     * Funzione che verifica che il nome dell'autore sia valido. Il nome dell'autore si intende valido se
     * contiene solamente lettere e spazi
     * @return bool true se il nome e' corretto, false altrimenti
     */
    function validazioneAutore() : bool
    {
        if ($this->autore && preg_match("/^[a-zA-Z][a-zA-Z -]+$/", $this->autore)) // solo lettere e spazi
            return true;
        else
            return false;
    }
    
    /**
     * Funzione che verifica che il titolo sia valido. Il titolo si intende valido se
     * contiene solamente lettere, numeri e spazi
     * @return bool true se il nome e' corretto, false altrimenti
     */
    function validazioneTitolo() : bool
    {
        if ($this->titolo && preg_match("/^[a-zA-Z][a-zA-Z0-9 -]+$/", $this->titolo)) // solo lettere, numeri e spazi
            return true;
        else
            return false;
    }
    
    /**
     * Funzione che verifica che il numero copie sia valido. Si intende valido se
     * contiene solamente numeri
     * @return bool true se il nome e' corretto, false altrimenti
     */
    function validazioneNumCopie(): bool
    {
        if ($this->num_copie && preg_match("[1-9][0-9]*", $this->num_copie)) // sono consentiti solo numeri
            return true;
        else
            return false;
    }
    
    /**
     * Funzione che verifica che la durata associata al libro sia corretta. La durata si intende
     * corretta se è pari a consultazione o breve o lungo
     * @return bool true se il file e' valido, false altrimenti
     */
    function validazioneDurata() : bool 
    {
        if($this->durata=='consultazione' || $this->durata=='breve' || $this->durata=='lungo')
            return true;
        else
            return false;
    }
    
    function validazioneGenere() : bool
    {
        if ($this->genere && preg_match("/^[a-zA-Z][a-zA-Z -]+$/", $this->genere)) // solo lettere e spazi
            return true;
        else
            return false;
    }
	
	function validazioneIsbn() : bool
    {
        if($this->isbn && preg_match('/[0-9]+{13}/', $this->isbn))
            return true;
            else
                return false;
    }
	
	function validazioneDescrizione() : bool
    {
        if($this->descrizione && preg_match('/^[[:alnum:]]{10,150}$/', $this->descrizione))
            return true;
        else
            return false;
    }
    
        
}

?>