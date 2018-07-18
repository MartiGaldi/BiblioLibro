<?php

if(file_exists('config.inc.php'))
    require_once'config.inc.php';

require_once'inc.php';

class f_persistance {
    private static $instance = null;  //maniglia della classe
    private $database;                //oggetto che instanza la connessione
    
    /**
    * Inizializza un oggetto f_persisatnce. Metodo privato per evitare duplicazioni dell'oggetto.
    */
    
    private function __construct()
    {
        try
        {
            global $address,$user,$password,$database;
            $this->database = new PDO ("mysql:host=$address;dbname=$database", $user,$password);
        }
        catch (PDOException $e){
            echo "Errore : ". $e->getMessage();
            die;
        }
    }
    /**
     * chiusura della connessione al database 
     */
    function closeDBConnection()
    {
        $this->database = null;
    }

    /**
     * metodo privato e vuoto per evitare la clonazione dell'oggetto
     */ 
    private function __clone(){}
    
    static function getInstance() : f_persistance
    {
        if(static::$instance == null)
        {
            static::$instance = new f_persistance();
        }
        return static::$instance;
    }
    
    /**
    * Metodo che carica dal dbms informazioni in un corrispettivo oggetto Entity.
    * @param string $classe il nome della classe (ottenibile tramite e_class::name )
    * @param string $target opzionale, sono accettabili solo valori di f_target
    * $target puo essere specificato per le seguenti classi:
    *  - e_libro ( f_target::CARICA_LIBRO )
    *  - e_cliente ( f_target::CARICA_CLIENTE )
    * @return object un oggetto Entity.
    */
    
    function carica(string $classe, int $id, string $target=NULL)
    {
        $sql='';
          
        if ( class_exists( $classe ) ) // si verifica che l'oggetto Entity esista
        {
            $risorsa = substr($classe,1); // si ricava il nome della risorsa corrispondente all'oggetto Entity
            $classeFound = 'f_'.$risorsa; // si ricava il nome della corrispettiva classe Foundation
            
            if($target) // se il target e' specificato
                $metodo = 'carica'.$target; // i
            else
                $metodo = 'carica'.$risorsa;
                    
            if(method_exists($classeFound, $metodo))
                $sql = $classeFound::$metodo();      
        }
        
        if($sql)     
            return $this->eseguiCarica($classe, $id, $sql, $target);
        else 
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
            $stmt = $this->database->prepare($sql); // creo PDOStatement
            $stmt->bindValue(":id", $id, PDO::PARAM_INT); //si associa l'id al campo della query
            $stmt->execute();   //viene eseguita la query
            $stmt->setFetchMode(PDO::FETCH_ASSOC); // i risultati del database verranno salvati in un array con indici le colonne della table
            
            $oggetto=NULL;
            
            while($riga = $stmt->fetch())
            { // per ogni tupla restituita dal database viene istanziato un oggetto
                if($target == f_target::CARICA_LIBRO || $target == f_target::CARICA_CLIENTE)
                    //inserire qui target che richiedono un array come ritorno
                    $oggetto[] = f_persistance::creaOggettoDaDB($classe, $ennupla);
                else 
                    $oggetto = f_persistance::creaOggettoDaDB($classe, $ennupla);        
            }
            $this->closeDBConnection(); // chiude la connessione
            return $oggetto;
        }
        
        catch (PDOException $e)
        {
            $this->closeDBConnection(); // chiude la connessione   
            return null; //ritorna null se ci sono errori
        }
    }
    
    /**
    * Effettua una ricerca sul database secondo vari parametri. Tale metodo e' scaturito a seguito
    * di una ricerca da parte del cliente, puo' essere relativa ai libri secondo diversi
    * parametri, come titolo, autore o casa editrice.
    * @param string $chiave la tabella da cui prelevare i dati
    * @param string $valore il valore per cui cercare i valori
    * @param string $stringa il dato richiesto dall'utente
    * @return array|NULL i risultati ottenuti dalla ricerca. Se la richiesta non ha match, ritorna NULL.
    */
    
    function ricerca(string $chiave, string $valore, string $stringa)
    {
        $sql = '';   
        $nomeClasse = 'f_'.$chiave;
        
        if(class_exists($nomeClasse))
        {
            $metodo = 'ricerca'.$chiave.'Da'.$valore;
            
            if(method_exists($nomeClasse, $metodo))
                $sql = $nomeClasse::$metodo();     
        }
        
        if($sql)
            return $this->eseguiRicerca('f_'.$chiave, $valore, $stringa, $sql);
        else 
            return NULL;
            
    }
    
    private function eseguiRicerca(string $nomeClasse, string $valore, string $stringa, string $sql)
    {
        try   
        {
            
            $stmt = $this->database->prepare($sql); // creo PDOStatement 
            $stmt->bindValue(":".$value, $str, PDO::PARAM_STR); //si associa l'id al campo della query
            $stmt->execute();   //viene eseguita la query
            $stmt->setFetchMode(PDO::FETCH_ASSOC); // i risultati del database verranno salvati in un array con indici le colonne della table
            
            $oggetto = NULL; // l'oggetto di ritorno viene definito come NULL
            
            while($riga = $stmt->fetch())
            { // per ogni tupla restituita dal database...
                $oggetto[] = f_persistance::creaOggettoDaDB($nomeClasse, $ennupla); //...istanzio l'oggetto
            }
            
            $this->closeDBConnection(); // chiude la connessione
             
            return $oggetto;
        }
        
        catch (PDOException $e)
        {
            $this->closeDBConnection(); // chiude la connessione
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
                
        $risorsa = substr($classe,1); // nome della risorsa (Utente, Libro, ...)
        $classeFound = 'f_'.$risorsa; // nome della rispettiva classe Foundation
                
        $metodo = 'salva'.$risorsa; // nome del metodo salva+nome_risorsa
                
        if(class_exists($classeFound) && method_exists($classeFound, $metodo))  // se la classe esiste e il metodo pure...
            $sql = $classeFound::$metodo(); //ottieni la stringa sql
        
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
        $this->database->beginTransaction(); // inizio della transazione
           
        $stmt = $this->database->prepare($sql);
        
        // si prepara la query facendo un bind tra parametri e variabili dell'oggetto
        
        try
        { 
            f_persistance::bindValues($stmt, $oggetto); // si associano i valori dell'oggetto alle entry della query
            
            $stmt->execute();
            
            if ($stmt->rowCount()) // si esegue la query
            {
                
                if (method_exists($oggetto, 'getId') && $oggetto->getId() == 0){ // ...se il valore e' non nullo, si assegna l'id
                    $oggetto->setId($this->database->lastInsertId()); // assegna all'oggetto l'ultimo id dato dal dbms
                }
                
                $commit = $this->database->commit(); // effettua il commit
                
                $this->closeDBConnection(); // chiude la connessione
                
                return $commit; // ritorna il risultato del commit
            }
            else
            {
                // ...altrimenti si effettua il rollback e si ritorna false   
                $this->database->rollBack();
                $this->closeDBConnection(); // chiude la connessione
                
                return false;
            }
        }
        
        catch (PDOException $e)
        {  // errore: rollback e return false
            
            $this->database->rollBack();
            $this->closeDBConnection(); // chiude la connessione
            
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
                
        $risorsa = substr($classe,1); // nome della risorsa (User, Song, UserInfo, ...)
        $classeFound = 'f_'.$risorsa; // nome della rispettiva classe Foundation
        
        $metodo = 'aggiorna'.$risorsa; // nome del metodo aggiorna+nome_risorsa

        $sql = $classeFound::$metodo();
                
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
        $this->database->beginTransaction(); //inizio della transazione
        
        $stmt = $this->database->prepare($sql);
        
        //si prepara la query facendo un bind tra parametri e variabili dell'oggetto
        
        try
        { 
           f_persistance::bindValues($stmt, $oggetto); //si associano i valori dell'oggetto alle entry della query            
            $stmt->bindValue(':id', $oggetto->getId(), PDO::PARAM_INT); // associa l'id dell'oggetto alla query
            
            if($stmt->execute()) //se la tupla e' alterata...
            {
                $commit = $this->database->commit(); // effettua il commit

                $this->closeDBConnection(); // chiude la connessione
                
                return $commit; //...ritorna il risultato del commit
            }
            else //altrimenti l'update non ha avuto successo...
            {   
                $this->database->rollBack();
                $this->closeDBConnection(); // chiude la connessione
                
                return false; //...annulla la transazione e ritorna false
            }
        }
        catch (PDOException $e)
        {
            echo('Errore: '.$e->getMessage());
               
            $this->database->rollBack();
            
            $this->closeDBConnection(); // chiude la connessione
            
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
            $risorsa = substr($classe, 1);
            $classeFound = 'f_' . $risorsa;
            
            $metodo = 'rimuovi' . $risorsa;
            
            $sql = $classeFound::$metodo();
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
            $stmt = $this->database->prepare($sql); //a partire dalla stringa sql viene creato uno statement
            $stmt->bindValue(":id", $id, PDO::PARAM_INT); //si associa l'id al campo della query
            
            if($id2) // se id2 e' stato inserito...
                $stmt->bindValue(":id2", $id2, PDO::PARAM_INT); //...si associa id2 al campo della query
                
                $risultato = $stmt->execute(); //esegue lo statement
                
                $this->closeDBConnection(); // chiude la connessione
                
                return $risultato; //ritorna il risultato   
        }
        catch (PDOException $e)
        {
            $this->closeDBConnection(); // chiude la connessione
            
            return FALSE; //ritorna false se ci sono errori
        }
    }
    
    /**
    * Metodo che verifica l'esistenza di un valore in una entry di una tabella
    * @param string $classe il nome della classe (ottenibile tramite e_class::name )
    * @param string $target opzionale, sono accettabili solo valori di f_target.
    * Associazioni class - target è la seguente:
    *  - e_utente ( f_target::MAIL_ESISTENTE )    
    * @param string | int $valore il valore di cui controllare l'unicita'
    * @param string | int $valore2 opzionale, se presente una doppia chiave nella table da interrogare
    * @return bool | int true se il dato esiste, false altrimenti. un int se si richiede l'esistenza di un utente.
    */
    
    function esiste(string $classe, string $target, $valore, $valore2 = null)
    {
        $sql = '';   
        
        if (class_exists($classe))
        {
            $risorsa = substr($classe, 1);
            $classeFound = 'f_' . $risorsa;
            
            $metodo = 'esiste' . $target;
            
            if(method_exists($classeFound, $metodo))
                $sql = $classeFound::$metodo();
        }
        if ($sql)
        {
            if($valore2 && ($target==f_target::MAIL_ESISTENTE))
            {
                return $this->eseguiEsiste($sql, $valore, $valore2);
            }
            else
                return $this->eseguiEsiste($sql, $valore);
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
    
    private function eseguiEsiste(string $sql, $valore, $valore2 = NULL)
    {
        try   
        { 
            $stmt = $this->database->prepare($sql); // a partire dalla stringa sql viene creato uno statement
            if (is_int($value))
                $stmt->bindValue(":valore", (int) $valore, PDO::PARAM_INT); // si associa l'intero al campo della query
            if (is_string($value))
                $stmt->bindValue(":valore", $valore, PDO::PARAM_STR); // si associa la stringa al campo della query
            if ($valore2) // se il secondo valore e' stato inserito
            {            
                if (is_int($value2))
                    $stmt->bindValue(":valore2", (int) $valore2, PDO::PARAM_INT); // si associa l'intero al campo della query
                if (is_string($value2))
                    $stmt->bindValue(":valore2", $valore2, PDO::PARAM_STR); // si associa la stringa al campo della query
            }
            $risultato = $stmt->execute(); // esegue lo statement
                    
            $stmt->setFetchMode(PDO::FETCH_ASSOC); // i risultati del database verranno salvati in un array con indici le colonne della tabella
                    
            if ($stmt->rowCount()) 
            {
                $riga = $stmt->fetch();
                
                $this->closeDBConnection(); // chiude la connessione
                        
                return $riga['id'];
            }
            else
            {
                $this->closeDBConnection(); // chiude la connessione
                
                return false;
            }        
        }
        catch (PDOException $e)
        {
            $this->closeDBConnection(); // chiude la connessione
            
            return FALSE; // ritorna false se ci sono errori
        }
    }
    
    /** 
    * Associa ai campi della query i corrispondenti valori dell'oggetto
    * @param PDOStatement $stmt lo statement contenente i campi da riempire
    */
    
    private function bindValues(PDOStatement &$stmt, &$oggetto)
    {
        $class = '';
   
        if(is_a($oggetto, e_bibliotecario::class) || is_a($oggetto, e_cliente::class))
            $classe = get_parent_class($oggetto);
        else
            $classe = get_class($oggetto); // restituisce il nome della classe dall'oggetto

            $risorsa = substr($classe,1); // nome della risorsa (utente, libro, ...)
            $classeFound = 'f_'.$risorsa; // nome della rispettiva classe Foundation
            $classeFound::bindValues($stmt, $oggetto); // associazione statement - e_oggetto
    }
    
    /**
    * Da una tupla ricevuta da una query istanzia l'oggetto corrispondente
    * @param string $classe il nome della classe (ottenibile tramite e_classe::name )
    * @param $ennupla array la tupla restituita dal dbms
    * @return mixed l'oggetto risultato dell'elaborazione
    */
    
    private function creaOggettoDaDB(string $classe, $ennupla)
    {
        $oggetto = NULL; //oggetto che conterra' l'istanza dell'elaborazione
        if ( class_exists( $classe ) )
        {
            $classeFound = 'f_'.substr($classe,1);
            $oggetto = $classeFound::creaOggettoDaDB($ennupla);
        }
        return $oggetto;
    }
    
    function contaRighe (&$oggetto) : bool 
    {
        $risultato=false;
        switch($oggetto)
        {
            case(is_a($oggetto, e_prestito::class)):
               // $sql =  f_prestito::      
        }
    }
    
    function salva (&$oggetto) : bool {
        $risultato=false;
        switch ($oggetto) {
            case (is_a($oggetto, e_libro::class)):
                $sql=f_libro::salvaLibro();
                $risultato=$this->eseguiSalvataggio($oggetto,$sql);
                break;
            
            default:
                $sql=null;
                break;
        }
        return $risultato;
    }
    
    private function eseguiSalvataggio($oggetto,string $sql) {
        $this->database->beginTransaction();
        $stmt=$this->database->prepare($sql);
        try {
            f_persistance::bindValues($stmt,$oggetto);
            $stmt->execute();
            if($stmt->rowCount())
            {
                return $this->database->commit();
            }
            else
            {
                $this->database->rollBack();
                return false;
            }
                
            
        } catch (PDOException $e) {
            echo ('Errore: '.$e->getMessage());
            $this->database->rollBack();
            return false;
        }
    }
    
    private function bindValues(PDOStatement &$stmt, &$oggetto)
    {
        switch ($oggetto) {
            case(is_a($oggetto, e_libro::class)):
                f_libro::bindValues($stmt, $oggetto);
                break;
            default:
                break;
        }
    }
    
    
}

?>