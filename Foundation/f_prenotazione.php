<?php
require_once 'inc.php';
/**
 * @author gruppo11
 */
class f_prenotazione
{
    /**
    * Query che effettua il salvataggio di una prenotazione nella tabella prenota
    * @return string contenente la query sql
    */
    static function salvaPrenotazione() : string
    {
        return "INSERT INTO prenotazione(id_utente, id_libro , data_scadenza)
                VALUES(:id, :id2, :dataScadenza)";
    }

    /**
    * Query che effettua l'aggiornamento di una prenotazione nella tabella prenota
    * @return string contenente la query sql 
    */
    static function aggiornaPrenotazione() : string
    {
        return "UPDATE prenotazione
                SET id_utente= :id, id_libro = :id2, data_scadenza = :dataScadenza
                WHERE id_utente = :id1 AND id_libro = :id2 ;";
    }
    
    /**
    * Query per il caricamento di una prenotazione
    * @return string sql rappresentante la SELECT.
    */    
    static function caricaPrenotazione() : string 
    {
        return "SELECT *
                FROM prenotazione
                WHERE id_utente = :utentePrenotazione";
    }
    
    /**
    * Query che rimuove una prenotazione dalla tabella prenota.
    * @return string contenente la query sql
    */
    static function rimuoviPrenotazione() : string
    {
        return "DELETE
                FROM prenotazione
                WHERE id = :id AND id_libro = :id2 ; ";
    }
	
	/**
     * Controlla se la prenotazione è già presente
     * @return string la stringa sql pe l'EXISTS
     */
    /*static function prenotazioneEsistente() : string
    {
        return        "SELECT *
                       FROM prenotazione
                       WHERE id = :value; ";
    }*/
    
    
    /**
     * Associazione di un oggetto e_prenota ai campi di una query sql per la tabella prenota.
     * @param PDOStatement $stmt lo statement contenente i campi da riempire
     * @param e_prenota $pren la prenotazione da cui prelevare i dati
     */
    static function bindValues(PDOStatement &$stmt, e_prenotazione &$prenotazione)
    {
        $stmt->bindValue(':id', $prenotazione->getUtentePrenotazione(), PDO::PARAM_INT);
		$stmt->bindValue(':id2', $prenotazione->getLibroPrenotazione(), PDO::PARAM_INT);
        $stmt->bindValue(':dataScadenza', $prenotazione->getDataScadenza(), PDO::PARAM_STR);
      
       // $stmt->bindValue(':id', $prenotazione->getId(), PDO::PARAM_INT);
       // $stmt->bindValue(':data_fine', $prenotazione->getDataFine(), PDO::PARAM_STR);
       // $stmt->bindValue('acquisito', $prenotazione->getAcquisito(), PDO::PARAM_BOOL);
       // $stmt->bindValue('disp', $prenotazione->getDisp(), PDO::PARAM_BOOL);
    }
    
    /**
     * Istanzia un oggetto e_prenota a partire dai valori di una tupla ricevuta dal dbms
     * @param array $ennupla la tupla ricevuta dal dbms
     * @return prenota l'oggetto e_prenota risultato dell'operazione
     */
   /* static function creaOggettoDaRiga($riga) : e_prenotazione
    {
        $prenotazione = new e_prenotazione();
        $prenotazione->setIdPrenotazione($riga['id_prenotazione']);
        $prenotazione->setData($riga['data']);
        $prenotazione->setNickUtente($riga['nick_utente']);
        $prenotazione->setId($riga['id_libro']);
        $prenotazione->setDataFine($riga['data_fine']);
        $prenotazione->setAcquisito($riga['acquisito']);
        $prenotazione->setDisp($riga['disp']);
        
        return $prenotazione;
    }
    
    static function contaNumero() : int
    {
        return "SELECT count (*)
                FROM prenotazione INNER JOIN prestito
                WHERE id_libro = :id_libro AND prenotazione.id_libro = prestito.id_libro;";
    }*/
}

?>