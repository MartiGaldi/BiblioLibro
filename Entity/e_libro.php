<?php 

require_once'inc.php';

/**
 * La classe e_libro caratterizza i testi presenti nel catalogo della biblioteca.
 * Contiene le informazioni principali riguardanti quest'ultimi quali titolo, autore, genere, isbn e numero di copie presenti.
 * Ogni libro può essere preso in prestito per un periodo limitato(disponibile) che può corrispondere
 * a consultazione, periodo breve o periodo lungo
 * @author gruppo 11
 * @package Entity
 */

class e_libro
 {
	/** id libro */
    private $id;
	/** autore libro */
    private $autore;
	/** titolo libro*/
    private $titolo;
	/** numero copie esistenti del libro */
    private $num_copie;
	/** durata libro */
    private $durata;
	/** genere libro */
    private $genere;
	/** isbn libro */
	private $isbn;
	/** descrizione libro */
	private $descrizione;
	/** numero copie disponibili alla prenotazione */
	private $copieDisponibili;
	/**copertina libro */
	private $copertina;
	
	private $prenota;

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
	
	/**
	 * metodo che imposta l'autore del libro 
	 * @param string $autore l'autore del libro
	 */
    function setAutore(string $autore){
        $this->autore=$autore;
    }
    
	/**
     * Metodo che fornisce il nome dell'autore del libro
     * @return string l'autore del libro 
     */
    function getAutore() : string {
        return $this->autore;
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
	 * metodo che imposta il titolo del libro 
	 * @param string $titolo il titolo del libro
	 */
    function setTitolo(string $titolo){
        $this->titolo=$titolo;
    }
    
	/**
     * Metodo che fornisce il titolo del libro
     * @return string il titolo del libro 
     */
    function getTitolo() : string {
        return $this->titolo;
    }
	
	/**
     * Funzione che verifica che il titolo sia valido. Il titolo si intende valido se
     * contiene solamente lettere, numeri e spazi
     * @return bool true se il titolo e' corretto, false altrimenti
     */
    function validazioneTitolo() : bool
    {
        if ($this->titolo && preg_match("/^[a-zA-Z][a-zA-Z0-9 -]+$/", $this->titolo)) // solo lettere, numeri e spazi
            return true;
        else
            return false;
    }    
	
	/**
	 * metodo che imposta il numero copie totali del libro 
	 * @param int $num_copie il numero copie del libro
	 */
    function setNumCopie(int $num_copie){
        $this->num_copie=$num_copie;
    }
    
	/**
     * Metodo che fornisce il numero copie del libro
     * @return int il numero copie del libro 
     */
    function getNumCopie() : int {
        return $this->num_copie;
    }
    
	/**
     * Funzione che verifica che il numero copie sia valido. Si intende valido se
     * contiene solamente numeri
     * @return bool true se il numero copie e' corretto, false altrimenti
     */
    function validazioneNumCopie(): bool
    {
        if ($this->num_copie && preg_match("/^[1-9][0-9]+$/", $this->num_copie)) // sono consentiti solo numeri
            return true;
        else
            return false;
    }
	
	/**
	 * metodo che imposta la durata di un prestito del libro 
	 * @param string $durata la durata del libro
	 */
    function setDurata(string $durata){
        $this->durata=$durata;
    }
    
	/**
     * Metodo che fornisce la durata del libro
     * @return string la durata del libro 
     */
    function getDurata() : string {
        return $this->durata;
    }
	
	/**
     * Funzione che verifica che la durata associata al libro sia corretta. La durata si intende
     * corretta se è pari a consultazione o breve o lungo
     * @return bool true se la durata inseita e' valida, false altrimenti
     */
    function validazioneDurata() : bool 
    {
        if($this->durata && preg_match("/^[a-zA-Z][a-zA-Z0-9 -]+$/", $this->durata))
            return true;
        else
            return false;
    }
    
	/**
	 * metodo che imposta il genere del libro 
	 * @param string $genere il genere del libro
	 */
    function setGenere(string $genere){
        $this->genere=$genere;
    }
    
	/**
     * Metodo che fornisce il genere del libro
     * @return string il genere del libro 
     */
    function getGenere() : string {
        return $this->genere;
    }
	
	/**
     * Funzione che verifica che il genere del libro sia valido. Il genere del libro si intende valido se
     * contiene solamente lettere e spazi
     * @return bool true se il genere e' corretto, false altrimenti
     */
    function validazioneGenere() : bool
    {
        if ($this->genere && preg_match("/^[a-zA-Z][a-zA-Z -]+$/", $this->genere)) // solo lettere e spazi
            return true;
        else
            return false;
    }
	
	/**
	 * metodo che imposta il codice isbn del libro 
	 * @param string $isbn il codice isbn del libro
	 */
	function setIsbn(string $isbn)
    {
        $this->isbn=$isbn;
    }
    
	/**
     * Metodo che fornisce il codice isbn del libro
     * @return string il codice isbn del libro 
     */
    function getIsbn() : string
    {
        return $this->isbn;
    }
	
	/**
     * Funzione che verifica che l'isbn sia valido. Si intende valido se
     * contiene solamente numeri
     * @return bool true se l'isbn e' corretto, false altrimenti
     */
	function validazioneIsbn() : bool
    {
        if($this->isbn && preg_match('/[0-9]+{13}/', $this->isbn))
            return true;
            else
                return false;
    }
	
	/**
	 * metodo che imposta una descrizione del libro 
	 * @param string $descrizione la descrizione del libro
	 */
    function setDescrizione(string $descrizione)
    {
        $this->descrizione=$descrizione;
    }
    
	/**
     * Metodo che fornisce una descrizione del libro
     * @return string la descrizione del libro 
     */
    function getDescrizione()
    {
        return $this->descrizione;
    }
	
	/**
     * Funzione che verifica che la descrizione sia valida. Il titolo si intende valido se
     * contiene solamente lettere, numeri e spazi
     * @return bool true se la descrizione e' corretta, false altrimenti
     */
	function validazioneDescrizione() : bool
    {
        if($this->descrizione && preg_match('/^[[:alnum:]]{10,150}$/', $this->descrizione))
            return true;
        else
            return false;
    }   
    

	function setPrenota(e_prenota &$prenota)
    {
        $this->prenota = $prenota;
    }
    
    function getPrenota() : e_prenota
    {
		if($this->prenota) // se la prenotazione e' gia presente, la restituisce
            return $this->prenota;
        else
		{
		$this->prenota = f_persistance::getInstance()->carica('prenota', $this->id);
        return $this->prenota;
		}
    } 
	
	/**
	 * metodo che imposta le copie disponiobili per la prenotazione del libro 
	 * @param int $copieDisponibili le copie disponiobili per la prenotazione del libro
	 */
	function setCopieDisponibili (int $copieDisponibili){
        $this->copieDisponibili=$copieDisponibili;
    }
    
	/**
     * Metodo che fornisce le copie disponibili per la prenotazione del libro
     * @return int le copie disponibili per la prenotazione del libro 
     */
    function getCopieDisponibili() : int {
        return $this->copieDisponibili;
    }
	
	/**
     * Funzione che verifica che il numero copie disponibili sia valido. Si intende valido se
     * contiene solamente numeri
     * @return bool true se il numero copie disponibili e' corretto, false altrimenti
     */
    function validazioneCopieDisponibili(): bool
    {
        if ($this->copieDisponibili && preg_match("/^[1-9][0-9]+$/", $this->copieDisponibili)) // sono consentiti solo numeri
            return true;
        else
            return false;
    }
   
	/**
     * Restituisce la copertina del libro
     * @return e_copertina | NULL
     */
    function getCopertina()
    {
        $this->copertina = f_persistance::getInstance()->carica(e_copertina::class, $this->id);
        return $this->copertina;
    }
    
    /**
     * Imposta la copertina del libro
     * @param e_copertina $copertina
     */
    function setCopertina(e_copertina $copertina = null)
    {
        if(!$copertina)
        {
            $copertina = new e_copertina();
            $copertina->setStatic();
        }
        
        $copertina->setId($this->id);
        
        if(!f_persistance::getInstance()->carica(e_copertina::class, $this->id)) // se le informazioni non sono presenti...
        { // vengono salvate nel db
            f_persistance::getInstance()->salva($copertina); 
        }
        else
        { // altrimenti vengono aggiornate
            f_persistance::getInstance()->aggiorna($copertina);
        }
        
        $this->copertina = $copertina;
    }	
}

?>