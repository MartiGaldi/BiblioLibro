<?php

/**
 * Lo scopo di questa classe e' quello di fornire un accesso unico al DBMS, incapsulando
 * al proprio interno i metodi statici di tutte le altre classi Foundation, cosi che l'accesso
 * ai dati persistenti da parte degli strati superiore dell'applicazione sia piu' intuitivo.
 * @author gruppo 11
 * @package Foundation
 */
 
if(file_exists('config.inc.php'))
    require_once'config.inc.php';

require_once'inc.php';

class f_persistance
{
    private static $instance = null;  //maniglia della classe
    private $db;                      //oggetto che instanza la connessione
    
    /**
     * Inizializza un oggetto f_persistance. Metodo privato per evitare duplicazioni dell'oggetto.
     */
    
    private function __construct()
    {
        try
        {
            global $address,$admin,$pass,$database;
            $this->db = new PDO ("mysql:host=$address;dbname=$database", $admin, $pass);
        }
        catch (PDOException $e){
            echo "Errore : ". $e->getMessage();
            die;
        }
    }
	
	/**
     * Metodo che chiude la connessione al dbms.
     */
    function __destruct()
    {
        $this->db = null;
        static::$instance = null;
    }
	
    /**
     * metodo privato per evitare la clonazione dell'oggetto
     */ 
    private function __clone(){}
    
	/**
     * Metodo che restituisce l'unica istanza dell'oggetto.
     * @return f_persistance l'istanza dell'oggetto.
     */
    static function getInstance() : f_persistance
    {
        if (static::$instance == null)
        {
            static::$instance = new f_persistance();
        }
        return static::$instance;
    }
    
    /**
     * Metodo che carica dal dbms informazioni in un corrispettivo oggetto Entity.
     * @param string $classe il nome della classe (ottenibile tramite e_class::name )
     * @param string $target opzionale, sono accettabili solo valori di f_target
     * $target puo essere specificato ad esempio per le seguenti classi:
     *  - e_libro ( f_target::CARICA_LIBRO )
     *  - e_cliente ( f_target::CARICA_CLIENTE )
     * @return object un oggetto Entity.
     */
    
    function carica(string $classe, int $id, string $target=NULL)
    {
        $sql='';
          
        if ( class_exists( $classe ) ) // si verifica che l'oggetto Entity esista
        {
            $risorsa = substr($classe,2); // si ricava il nome della risorsa corrispondente all'oggetto Entity
            $classeFound = 'f_'.$risorsa; // si ricava il nome della corrispettiva classe Foundation
            
            if($target) // se il target e' specificato
                $method = 'carica'.$target;
            else
                $method = 'carica'.$risorsa;
                    
            if(method_exists($classeFound, $method))
                $sql = $classeFound::$method();      
        }
        
        if($sql) {
            return $this->eseguiCarica($classe, $id, $sql, $target);
        }else 
            return NULL;
    }
    
    /**
     * Esegue una SELECT sul database
     * @param string $classe il nome della classe (ottenibile tramite e_class::name )
     * @param string $target opzionale, sono accettabili solo valori di f_target
     * @param string $sql la stringa contenente il comando SQL
     * @return boolean l'esito della transazione
     */
    
    private function eseguiCarica(string $classe, int $id, string $sql, string $target=null) 
    {   
        try   
        {
            $stmt = $this->db->prepare($sql); // creo PDOStatement
            $stmt->bindValue(":id", $id, PDO::PARAM_INT); //si associa l'id al campo della query
            $stmt->execute();   //viene eseguita la query
            $stmt->setFetchMode(PDO::FETCH_ASSOC); // i risultati del database verranno salvati in un array con indici le colonne della table
            
            $oggetto=NULL;
            
            while($riga = $stmt->fetch())
            { // per ogni tupla restituita dal database viene istanziato un oggetto
                if($target == f_target::CARICA_LIBRO || $target == f_target::CARICA_CLIENTE || $target == f_target::CARICA_PRENOTAZIONI || $target == f_target::CARICA_PRESTITI || $target == f_target::CARICA_STORICI)
                    //inserire qui target che richiedono un array come ritorno
                    $oggetto[] = f_persistance::creaOggettoDaRiga($classe, $riga);
                else 
                    $oggetto = f_persistance::creaOggettoDaRiga($classe, $riga);        
            }
            $this->__destruct(); // chiude la connessione
            return $oggetto;
        }
        
        catch (PDOException $e)
        {
            $this->__destruct(); // chiude la connessione   
            return null; //ritorna null se ci sono errori
        }
    }
    
    /**
     * Effettua una ricerca sul database secondo vari parametri. Tale metodo e' scaturito a seguito
     * di una ricerca da parte del cliente, puo' essere relativa ai libri secondo diversi
     * parametri come titolo e autore.
     * @param string $key la tabella da cui prelevare i dati
     * @param string $value il valore per cui cercare i valori
     * @param string $str il dato richiesto dall'utente
     * @return array|NULL i risultati ottenuti dalla ricerca. Se la richiesta non ha match, ritorna NULL.
     */
    
    function ricerca(string $key, string $value, string $str)
    {
        $sql = '';   
        $nomeClasse = 'f_'.$key;
        
        if(class_exists($nomeClasse))
        {
            $method = 'ricerca'.$key.'Da'.$value;
            
            if(method_exists($nomeClasse, $method))
                $sql = $nomeClasse::$method();     
        }
        
        if($sql)
            return $this->eseguiRicerca('f_'.$key, $value, $str, $sql);
        else 
            return NULL;
            
    }
    
    private function eseguiRicerca(string $nomeClasse, string $value, string $str, string $sql)
    {
        try   
        {
            $stmt = $this->db->prepare($sql); // creo PDOStatement 
            $stmt->bindValue(":".$value, $str, PDO::PARAM_STR); //si associa l'id al campo della query
            $stmt->execute();   //viene eseguita la query
            $stmt->setFetchMode(PDO::FETCH_ASSOC); // i risultati del database verranno salvati in un array con indici le colonne della table
            
            $oggetto = NULL; // l'oggetto di ritorno viene definito come NULL
            
            while($riga = $stmt->fetch())
            { // per ogni tupla restituita dal database...
                $oggetto[] = f_persistance::creaOggettoDaRiga($nomeClasse, $riga); //...istanzio l'oggetto
            }
            
            $this->__destruct(); // chiude la connessione
             
            return $oggetto;
        }
        
        catch (PDOException $e)
        {
            $this->__destruct(); // chiude la connessione
            return null; // ritorna null se ci sono errori
        }
    }
 
    /**
     * Metodo che permette di salvare informazioni contenute in un oggetto Entity sul database.
     * @param object $oggetto l'oggetto da salvare
     * @return bool $risultato il risultato dell'elaborazione
     */
    
    function salva(&$oggetto) : bool
    {
        $risultato = false;
        $sql = '';
        $classe = '';
        
        if(is_a($oggetto, e_bibliotecario::class) || is_a($oggetto, e_cliente::class)) // se l'oggetto e' una tipologia di utente
            $classe = get_parent_class($oggetto); // si considera la classe padre, e_utente
			
        else
            $classe = get_class($oggetto); // restituisce il nome della classe dall'oggetto
                
        $risorsa = substr($classe,2); // nome della risorsa (Utente, Libro, ...)
        $classeFound = 'f_'.$risorsa; // nome della rispettiva classe Foundation
                
        $method = 'salva'.$risorsa; // nome del metodo salva+nome_risorsa
                
        if(class_exists($classeFound) && method_exists($classeFound, $method))  // se la classe esiste e il metodo pure...
            $sql = $classeFound::$method(); //ottieni la stringa sql
        
        if($sql) //se la stringa sql esiste...
            $risultato = $this->eseguiSalva($oggetto, $sql); // ... esegui la query
                        
        return $risultato;
    }
    
    /**
     * Esegue una INSERT sul database
     * @param mixed $oggetto l'oggetto da salvare
     * @param string $sql la stringa contenente il comando SQL
     * @return boolean l'esito della transazione
     */
    
    private function eseguiSalva(&$oggetto, string $sql)
    {
        $this->db->beginTransaction(); // inizio della transazione
        $stmt = $this->db->prepare($sql);
        // si prepara la query facendo un bind tra parametri e variabili dell'oggetto
        
        try
        { 
            f_persistance::bindValues($stmt, $oggetto); // si associano i valori dell'oggetto alle entry della query
            $stmt->execute();
            
            if ($stmt->rowCount()) // si esegue la query
            {
                
                if (method_exists($oggetto, 'getId') && $oggetto->getId() == 0){ // ...se il valore e' non nullo, si assegna l'id
                    $oggetto->setId($this->db->lastInsertId()); // assegna all'oggetto l'ultimo id dato dal dbms
                }
                
                $commit = $this->db->commit(); // effettua il commit
                
                $this->__destruct(); // chiude la connessione
                
                return $commit; // ritorna il risultato del commit
            }
            else
            {
                // ...altrimenti si effettua il rollback e si ritorna false   
                $this->db->rollBack();
                $this->__destruct(); // chiude la connessione
                
                return false;
            }
        }
        
        catch (PDOException $e)
        {  // errore: rollback e return false
            
            $this->db->rollBack();
            $this->__destruct(); // chiude la connessione
            
            return false;
        }
    }

    /**    
     * Metodo che permette di aggiornare informazioni sul database, relative ad una singola ennupla.
     * @param $oggetto l'oggetto da aggiornare
     * @bool true se l'update ha avuto successo, false altrimenti
     */
     
    function aggiorna($oggetto) : bool
    {   
        $sql=''; 
        $classe = '';
        
        if(is_a($oggetto, e_bibliotecario::class) || is_a($oggetto, e_cliente::class))
            $classe = get_parent_class($oggetto);
        else
            $classe = get_class($oggetto); // restituisce il nome della classe dall'oggetto
                
        $risorsa = substr($classe,2); // nome della risorsa (Utente, Libro, ...)
        $classeFound = 'f_'.$risorsa; // nome della rispettiva classe Foundation
        
        $method = 'aggiorna'.$risorsa; // nome del metodo aggiorna+nome_risorsa

        $sql = $classeFound::$method();
                
        $risultato = $this->eseguiAggiorna($oggetto, $sql); // ... esegui la query
                
        return $risultato;           
    }
    
    /**
     * Esegue una UPDATE sul database
     * @param mixed $oggetto l'oggetto da salvare
     * @param string $sql la stringa contenente il comando SQL
     * @return bool l'esito della transazione
     */
    
    private function eseguiAggiorna(&$oggetto, string $sql) : bool
    {
        $this->db->beginTransaction(); //inizio della transazione
        
        $stmt = $this->db->prepare($sql);
        
        //si prepara la query facendo un bind tra parametri e variabili dell'oggetto
        
        try
        { 
           f_persistance::bindValues($stmt, $oggetto); //si associano i valori dell'oggetto alle entry della query            
            $stmt->bindValue(':id', $oggetto->getId(), PDO::PARAM_INT); // associa l'id dell'oggetto alla query
            
            if($stmt->execute()) //se la tupla e' alterata...
            {
                $commit = $this->db->commit(); // effettua il commit

                $this->__destruct(); // chiude la connessione
                
                return $commit; //...ritorna il risultato del commit
            }
            else //altrimenti l'update non ha avuto successo...
            {   
                $this->db->rollBack();
                $this->__destruct(); // chiude la connessione
                
                return false; //...annulla la transazione e ritorna false
            }
        }
        catch (PDOException $e)
        {
            echo('Errore: '.$e->getMessage());
               
            $this->db->rollBack();
            
            $this->__destruct(); // chiude la connessione
            
            return false;
        }
    }
 
    /**
     * Metodo che cancella dal database una entry di un particolare oggetto Entity.
     * @param string $classe il nome della classe (ottenibile tramite e_class::name )
     * @param int $id l'identificatore della entry da eliminare.
     * @param int $id2 opzionale se l'entry nel database ha due primary key
     * @return bool se l'operazione ha avuto successo o meno.
     */
    
    function rimuovi(string $classe, int $id, int $id2=null) : bool
    {
        $sql = '';
        
        if (class_exists($classe))
        {
            $risorsa = substr($classe, 2);
            $classeFound = 'f_' . $risorsa;
            
            $method	= 'rimuovi' . $risorsa;
            
            $sql = $classeFound::$method();
        }
        
        if ($sql)
        {
            if($id2 && ($classe==e_bibliotecario::class || $classe==e_cliente::class)) 
                return $this->eseguiRimuovi($sql, $id, $id2);
            else
                return $this->eseguiRimuovi($sql, $id);
        }
        else   
            return NULL;
    }
    
    /**
     * Rimuove una entry dal database.
     * @param int $id della entry da eliminare
     * @param int $id2 opzionale se l'entry ha due primary key
     * @return bool l'esito dell'operazione
     */
    
    private function eseguiRimuovi(string $sql, int $id, int $id2 = NULL) : bool 
    {
        try
        {
            $stmt = $this->db->prepare($sql); //a partire dalla stringa sql viene creato uno statement
            $stmt->bindValue(":id", $id, PDO::PARAM_INT); //si associa l'id al campo della query
            
            if($id2) // se id2 e' stato inserito...
                $stmt->bindValue(":id2", $id2, PDO::PARAM_INT); //...si associa id2 al campo della query
                
                $risultato = $stmt->execute(); //esegue lo statement
                
                $this->__destruct(); // chiude la connessione
                
                return $risultato; //ritorna il risultato   
        }
        catch (PDOException $e)
        {
            $this->__destruct(); // chiude la connessione
            
            return FALSE; //ritorna false se ci sono errori
        }
    }
    
    /**
     * Metodo che verifica l'esistenza di un valore in una entry di una tabella
     * @param string $classe il nome della classe (ottenibile tramite e_class::name )
     * @param string $target opzionale, sono accettabili solo valori di f_target.  
     * @param string | int $valore il valore di cui controllare l'unicita'
     * @param string | int $valore2 opzionale, se presente una doppia chiave nella tabella da interrogare
     * @return bool | int true se il dato esiste, false altrimenti. Un int se si richiede l'esistenza di un utente.
     */
    
    function esiste(string $classe, string $target, $value, $value2 = null)
    {
        $sql = '';   
        
        if (class_exists($classe))
        {
            $risorsa = substr($classe, 2);
            $classeFound = 'f_' . $risorsa;
            
            $method = 'esiste' . $target;
            
            if(method_exists($classeFound, $method))
                $sql = $classeFound::$method();
        }
        if ($sql)
        {
            if($value2 && ($target==f_target::ESISTE_UTENTE))
            {
                return $this->eseguiEsiste($sql, $value, $value2);
            }
            else
                return $this->eseguiEsiste($sql, $value);
        }
        else   
            return NULL;
    }
    
    /**
     * Esegue l'operazione di controllo di esistenza
     * @param string $sql la query da inviare al dbms
     * @param string | int $valore il valore di cui controllare l'unicita'
     * @param string | int $valore2 opzionale se presente una doppia chiave nella tabella da interrogare
     * @return bool | id true se la entry esiste, false altrimenti
     */
    
    private function eseguiEsiste(string $sql, $value, $value2 = NULL)
    {
        try   
        { 
            $stmt = $this->db->prepare($sql); // a partire dalla stringa sql viene creato uno statement
            if (is_int($value))
                $stmt->bindValue(":value", (int) $value, PDO::PARAM_INT); // si associa l'intero al campo della query
            if (is_string($value))
                $stmt->bindValue(":value", $value, PDO::PARAM_STR); // si associa la stringa al campo della query
            if ($value2) // se il secondo valore e' stato inserito
            {            
                if (is_int($value2))
                    $stmt->bindValue(":value2", (int) $value2, PDO::PARAM_INT); // si associa l'intero al campo della query
                if (is_string($value2))
                    $stmt->bindValue(":value2", $value2, PDO::PARAM_STR); // si associa la stringa al campo della query
            }
            $risultato = $stmt->execute(); // esegue lo statement
                    
            $stmt->setFetchMode(PDO::FETCH_ASSOC); // i risultati del database verranno salvati in un array con indici le colonne della tabella
                    
            if ($stmt->rowCount()) 
            {
                $riga = $stmt->fetch();
                
                $this->__destruct(); // chiude la connessione
                        
                return $riga['id'];
            }
            else
            {
                $this->__destruct(); // chiude la connessione
                
                return false;
            }        
        }
        catch (PDOException $e)
        {
            $this->__destruct(); // chiude la connessione
            
            return FALSE; // ritorna false se ci sono errori
        }
    }
    
    /** 
     * Associa ai campi della query i corrispondenti valori dell'oggetto
     * @param PDOStatement $stmt lo statement contenente i campi da riempire
     */
    
    private function bindValues(PDOStatement &$stmt, &$oggetto)
    {
        $classe = '';
   
        if(is_a($oggetto, e_bibliotecario::class) || is_a($oggetto, e_cliente::class))
            $classe = get_parent_class($oggetto);
        else
            $classe = get_class($oggetto); // restituisce il nome della classe dall'oggetto

            $risorsa = substr($classe,2); // nome della risorsa (utente, libro, ...)
            $classeFound = 'f_'.$risorsa; // nome della rispettiva classe Foundation
            $classeFound::bindValues($stmt, $oggetto); // associazione statement - e_oggetto
    }
    
    /**
     * Da una tupla ricevuta da una query istanzia l'oggetto corrispondente
     * @param string $classe il nome della classe (ottenibile tramite e_classe::name )
     * @param $ennupla array la tupla restituita dal dbms
     * @return mixed l'oggetto risultato dell'elaborazione
     */
    
    private function creaOggettoDaRiga(string $classe, $riga)
    {
        $oggetto = NULL; //oggetto che conterra' l'istanza dell'elaborazione
        if ( class_exists( $classe ) )
        {
			$classeFound = 'f_'.substr($classe,2);
			$oggetto = $classeFound::creaOggettoDaRiga($riga);
        }
        return $oggetto;
    }
    
}

?>