<?php 

require_once'inc.php';

/**
* @author gruppo 11
* @package Entity
* La classe e_libro caratterizza i testi presenti nel catalogo della biblioteca.
* Contiene le informazioni principali riguardanti quest'ultimi quali titolo, autore e numero di copie presenti.
*/

class e_libro extends e_oggetto {
    
    private $autore;
    private $titolo;
    private $num_copie;
    private $durata;
    private $genere;
    private $info_libro;
    
    
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
    
    function validazioneDurata() : bool {
        if($this->durata=='consultazione' || durata=='breve' || durata=='lungo')
            return true;
        else
            return false;
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
    
}

?>