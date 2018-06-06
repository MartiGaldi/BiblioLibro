<?php

require_once'inc.php';
require_once'config.inc.php';

class f_persistance {
    private static $instance = null;  //maniglia della classe
    private $database;                //oggetto che instanza la connessione
    
    private function __construct(){
        try{
            global $address,$user,$password,$database;
            $this->database = new PDO ("mysql:host=$address;dbname=$database", $user,$password);
        }
        catch (PDOException $e){
            echo "Errore : ". $e->getMessage();
            die;
        }
    }
    // chiusura della connessione al database 
    function closeDBConnection()
    {
        $this->database = null;
    }
    // metodo privato e vuoto per evitare la clonazione dell'oggetto
    private function __clone(){}
    
    static function getInstance() : f_persistance
    {
        if(static::$instance == null){
            static::$instance = new f_persistance();
        }
        return static::$instance;
    }
    
    function contaRighe (&$oggetto) : bool {
        $risultato=false;
        switch($oggetto){
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