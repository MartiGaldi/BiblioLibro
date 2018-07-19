<?php 

require_once'inc.php';
include_once 'Entity/e_oggetto.php';

/**
 * La classe e_libro caratterizza i testi presenti nel catalogo della biblioteca.
 * Contiene le informazioni principali riguardanti quest'ultimi quali titolo, autore, genere e numero di copie presenti.
 * Ogni libro può essere preso un prestito per un periodo limitato(disponibile) che può corrispondere
 * a consultazione, periodo breve o periodo lungo
 * @author gruppo 11
 * @package Entity
 */

class e_libro extends e_oggetto {
    
    private $autore;
    private $titolo;
    private $num_copie;
    private $durata;
    private $genere;
    private $info_libro;
    
    /**
     * istanzia un oggetto e_libro vuoto
     */
    function __constructor(){}
    
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
    
    /**
     * Imposta le informazioni del libro
     */
    
    function setInfoLibro(e_infoLibro $info=null) {
        if(!$info)
            $info = new e_infoLibro();
        
        $info->setId($this->id);
        $this->info_libro=$info;
        
        if(!f_persistance::getIstance()->carica(e_infoLIbro::class, $this->id))
        {  //se le info non sono presenti vengono aggiunte nel db
            f_persistance::getIstance()->salva($this->info_libro);
        }
        
        else
            
        {  //altrimenti vengono aggiornate
            f_persistance::getIstance()->aggiorna($this->infoLibro);
        }
    }
    
    /**
     * restituisce le informazioni relative al libro o null
     */
    
    function getInfoLibro() {
        $info_libro = f_persistance::getIstance()->carica(e_infoLibro::class, $this->id);
        if(info_libro)
            $this->info_libro = $info_libro;
        else
            $this->info_libro = new e_infoLibro();
        return $this->info_libro;
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
        
}

?>